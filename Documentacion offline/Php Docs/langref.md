# Referencia del lenguaje

# La sintaxis básica

## Tabla de contenidos

- [Etiquetas PHP](#language.basic-syntax.phptags)
- [Escape desde HTML](#language.basic-syntax.phpmode)
- [Separación de instrucciones](#language.basic-syntax.instruction-separation)
- [Comentarios](#language.basic-syntax.comments)

    ## Etiquetas PHP

    Cuando PHP procesa un fichero, reconoce las etiquetas de apertura y
    de cierre, &lt;?php y ?&gt;, para
    definir los límites de la ejecución del código PHP. El contenido fuera de
    las etiquetas es ignorado por el analizador PHP, permitiendo a PHP integrarse
    de manera transparente en diversos tipos de documentos.

    Un carácter de espacio (espacio, tabulación, o nueva línea) debe seguir
    &lt;?php para asegurar una separación correcta de los tokens.
    Omitir este espacio en blanco resultará en un error de sintaxis.

    PHP incluye también la etiqueta corta echo &lt;?=,
    que es un atajo para &lt;?php echo.

    **Ejemplo #1 Etiquetas de apertura y cierre PHP**
    1.  &lt;?php echo 'Si se desea integrar código PHP en documentos XHTML o XML, utilice estas etiquetas'; ?&gt;

2.  Se puede utilizar la etiqueta corta para &lt;?= 'escribir este texto' ?&gt;.
    Es equivalente a &lt;?php echo 'escribir este texto' ?&gt;.

3.  &lt;? echo 'este código está entre etiquetas cortas'; ?&gt;
    El siguiente código &lt;?= 'texto' ?&gt; es un atajo para &lt;? echo 'texto' ?&gt;

Las etiquetas cortas (tercer ejemplo) están disponibles por omisión,
pero pueden ser desactivadas a través de la opción
[short_open_tag](#ini.short-open-tag)
del fichero de configuración php.ini, o están desactivadas por omisión si PHP
es compilado con la opción **--disable-short-tags**.

**Nota**:

     Como las etiquetas cortas pueden ser desactivadas, se recomienda utilizar
     solo las etiquetas normales (&lt;?php ?&gt; y
     &lt;?= ?&gt;) para maximizar la compatibilidad.

Si un fichero termina con código PHP, es preferible no colocar
la etiqueta de cierre al final del fichero. Esto permite evitar olvidar
un espacio o una nueva línea después de la etiqueta de cierre de PHP, lo cual
causaría efectos no deseados ya que PHP comenzará a mostrar la salida,
lo cual no es a menudo el caso deseado.

    **Ejemplo #2 Fichero que contiene solo código PHP**

&lt;?php
echo "Hola mundo\n";

// ... más código

echo "Última instrucción\n";

// el script termina aquí, sin la etiqueta de cierre PHP

## Escape desde HTML

Todo lo que se encuentra fuera de un par de etiquetas de apertura/cierre
es ignorado por el analizador PHP, lo que permite tener ficheros PHP
mezclando contenidos. Esto permite a PHP estar contenido en documentos
HTML, para crear por ejemplo plantillas.

    **Ejemplo #1 Integrar PHP en HTML**

&lt;p&gt;Esto será ignorado por PHP y mostrado en el navegador.&lt;/p&gt;
&lt;?php echo 'Mientras que esto será analizado por PHP.'; ?&gt;
&lt;p&gt;Esto también será ignorado por PHP y mostrado en el navegador.&lt;/p&gt;

Esto funciona como se espera porque cuando el intérprete PHP encuentra
la etiqueta de cierre ?&gt;, simplemente comienza a mostrar lo que encuentra (a excepción de la nueva línea que es inmediatamente seguida: ver
la [instrucción
de separación](#language.basic-syntax.instruction-separation)) hasta que encuentre otra etiqueta de apertura
incluso si PHP se encuentra en medio de una instrucción condicional, en cuyo caso,
el intérprete determinará la condición a tener en cuenta antes de tomar una decisión sobre lo que debe ser mostrado.
Ver el siguiente ejemplo.

Uso de estructuras con condiciones

    **Ejemplo #2 Escape avanzado usando condiciones**

&lt;?php if ($expression == true): ?&gt;
Esto será mostrado si la expresión es verdadera.
&lt;?php else: ?&gt;
De lo contrario, esto será mostrado.
&lt;?php endif; ?&gt;

En este ejemplo, PHP ignorará los bloques donde la condición no se cumpla,
incluso si están fuera de las etiquetas de apertura/cierre de PHP. PHP
los ignorará según la condición ya que el intérprete PHP pasará
los bloques que contienen lo que no se cumple por la condición.

Para mostrar grandes bloques de texto, es más eficiente salir
del modo de análisis de PHP en lugar de enviar el texto a través de la función
[echo](#function.echo) o
[print](#function.print).

**Nota**:

     Si PHP está integrado en un documento XML o XHTML, la etiqueta PHP
     estándar &lt;?php ?&gt; debe ser utilizada para mantener la conformidad con los estándares.

## Separación de instrucciones

Al igual que en C o en Perl, PHP requiere que las instrucciones sean terminadas
por un punto y coma al final de cada instrucción. La etiqueta
de cierre de un bloque de código PHP implica automáticamente un punto y coma;
por lo tanto, no es necesario utilizar un punto y coma
para terminar la última línea de un bloque PHP. La etiqueta de cierre
de un bloque incluye el carácter de nueva línea seguido inmediatamente si uno
está presente.

    **Ejemplo #1 Ejemplo que muestra que la etiqueta de cierre incluye la nueva línea que sigue**

&lt;?php echo "Algún texto"; ?&gt;
Sin nueva línea
&lt;?= "Pero nueva línea ahora" ?&gt;

    El ejemplo anterior mostrará:

Algún textoSin nueva línea
Pero nueva línea ahora

    **Ejemplo #2 Ejemplos de entrada y salida del analizador PHP**

&lt;?php
echo 'Esto es una prueba\n';
?&gt;

&lt;?php echo 'Esto es una prueba\n' ?&gt;

&lt;?php echo 'Omitimos la última etiqueta de cierre\n';

**Nota**:

     La etiqueta de cierre de un bloque PHP al final de un fichero es opcional,
     y a veces es útil omitirla cuando se utiliza la función
     [include](#function.include) o
     la función [require](#function.require),
     ya que los espacios no deseados no aparecerán al final de los ficheros, y así,
     siempre se podrán agregar encabezados a la respuesta más tarde. Esto es útil
     también si se desea utilizar la visualización del búfer y no se desea ver espacios en blanco añadidos al final de las partes generadas por los ficheros
     incluidos.

## Comentarios

PHP soporta los comentarios de tipo C, C++ y Shell Unix (también
llamado estilo Perl). Por ejemplo :

    **Ejemplo #1 Comentarios**

&lt;?php
echo 'Esto es una prueba\n'; // Esto es un comentario de una sola línea, estilo c++
/_ Esto es un comentario de
varias líneas _/
echo 'Esto es otra prueba\n';
echo 'Y una prueba final\n'; # Esto es un comentario de una sola línea estilo shell
?&gt;

Los comentarios de una sola línea solo comentan hasta el final
de la línea del bloque PHP actual.
Esto significa que el código HTML después de // ... ?&gt;
o después de # ... ?&gt; SERÁ mostrado:
?&gt; terminará el modo PHP y volverá al modo HTML, y
// o # no influirá en ello.

    **Ejemplo #2 Los comentarios van hasta el final de la línea**

&lt;h1&gt;Esto es un ejemplo &lt;?php # echo 'simple';?&gt;&lt;/h1&gt;
&lt;p&gt;La línea anterior mostrará 'Esto es un ejemplo'.&lt;/p&gt;

Los comentarios estilo 'C' comentan hasta que se encuentre el primer \*/.
Se debe tener cuidado con los comentarios estilo 'C' anidados en grandes bloques cuando se comentan.

    **Ejemplo #3 Los comentarios de tipo C**

&lt;?php
/_
echo 'Esto es una prueba'; /_ Este comentario causará un problema _/
_/
?&gt;

# Los tipos

## Tabla de contenidos

- [Introducción](#language.types.intro)
- [Sistema de tipos](#language.types.type-system)
- [NULL](#language.types.null)
- [Booleano](#language.types.boolean)
- [Los enteros](#language.types.integer)
- [Números de punto flotante](#language.types.float)
- [Cadenas](#language.types.string)
- [Strings numéricos](#language.types.numeric-strings)
- [Arrays](#language.types.array)
- [Los objetos](#language.types.object)
- [Las enumeraciones](#language.types.enumerations)
- [Recursos](#language.types.resource)
- [Callables](#language.types.callable)
- [Mixed](#language.types.mixed)
- [Void](#language.types.void)
- [Never](#language.types.never)
- [Tipos de clases relativas](#language.types.relative-class-types)
- [Tipo singleton](#language.types.singleton)
- [Itérables](#language.types.iterable)
- [Declaraciones de tipo](#language.types.declarations)
- [Manipulación de tipos](#language.types.type-juggling)

    ## Introducción

    En PHP, cada expresión tiene uno de los siguientes tipos integrados según su valor:
    - [null](#language.types.null)

    - [bool](#language.types.boolean)

    - [int](#language.types.integer)

    - [float](#language.types.float) (número de punto flotante)

    - [string](#language.types.string)

    - [array](#language.types.array)

    - [object](#language.types.object)

    - [callable](#language.types.callable)

    - [resource](#language.types.resource)

    PHP es un lenguaje de tipado dinámico, lo que significa que, por omisión, no es necesario especificar el tipo de una variable, ya que esto se determinará en tiempo de ejecución. Sin embargo, es posible tipar estáticamente ciertos aspectos del lenguaje utilizando las
    [declaraciones de tipo](#language.types.declarations).
    Los diferentes tipos soportados por el sistema de tipos de PHP están disponibles en la
    [página del sistema de tipos](#language.types.type-system).

    Los tipos limitan el tipo de operaciones que pueden realizarse sobre ellos.
    Sin embargo, si una expresión/variable se utiliza en una operación que su tipo no soporta, PHP intentará
    [manipular el tipo](#language.types.type-juggling) en un tipo compatible con la operación.
    Este proceso depende del contexto en el que se utiliza el valor.
    Para más información, consulte la sección sobre la
    [manipulación de tipos](#language.types.type-juggling).

    **Sugerencia**

    [Las tablas de comparación de tipos](#types.comparisons)
    pueden ser también útiles, ya que se presentan diversos ejemplos de comparación entre valores de diferentes tipos.

    **Nota**:

    Es posible forzar la evaluación de una expresión a un cierto tipo utilizando un
    [type casting](#language.types.typecasting).
    Una variable también puede ser convertida en el lugar utilizando la función
    [settype()](#function.settype).

    Para verificar el tipo y el valor de una
    [expresión](#language.expressions), utilice la función
    [var_dump()](#function.var-dump).

    Para recuperar el tipo de una
    [expresión](#language.expressions),
    utilice la función [get_debug_type()](#function.get-debug-type).
    Sin embargo, para verificar si una expresión es de un cierto tipo, utilice mejor las funciones

    is_type.

    **Ejemplo #1 Tipos Diferentes**

&lt;?php
$a_bool = TRUE;   // un booleano
$a_str = "foo"; // un string
$a_str2 = 'foo';  // un string
$an_int = 12; // un integer

echo gettype($a_bool); // muestra:  boolean
echo gettype($a_str); // muestra: string

// Si es un integer, incrementa en 4
if (is_int($an_int)) {
$an_int += 4;
}

// Si $a_bool es un string, se muestra
if (is_string($a_bool)) {
echo "String: $a_bool";
}
?&gt;

    Resultado del ejemplo anterior en PHP 8:

bool
string
int(16)

**Nota**:

Anterior a PHP 8.0.0, cuando la función [get_debug_type()](#function.get-debug-type) no está
disponible, la función [gettype()](#function.gettype) puede ser utilizada en su lugar.
Sin embargo, no utiliza los nombres de tipo canónicos.

## Sistema de tipos

PHP utiliza un sistema de tipos nominal con una fuerte relación de subtipado comportamental.
La relación de subtipado se verifica en la compilación, mientras que la verificación de tipos
se verifica dinámicamente en el momento de la ejecución.

El sistema de tipos de PHP soporta varios tipos atómicos que pueden ser compuestos juntos
para crear tipos más complejos. Algunos de estos tipos pueden ser escritos en forma de
[declaración de tipo](#language.types.declarations).

### Tipos atómicos

Algunos tipos atómicos son tipos que están estrechamente integrados en el lenguaje
y no pueden ser reproducidos con tipos definidos por el usuario.

La lista de tipos básicos es la siguiente:

    -
     Tipos integrados

      <li class="listitem">

        Tipos escalares:


        <li class="listitem">
         tipo [bool](#language.types.boolean)


        -
         tipo [int](#language.types.integer)


        -
         tipo [float](#language.types.float)


        -
         tipo [string](#language.types.string)



      </li>
      -
       tipo [array](#language.types.array)


      -
       tipo [object](#language.types.object)


      -
       tipo [resource](#language.types.resource)


      -
       tipo [never](#language.types.never)


      -
       tipo [void](language.types.void.html)


      -

       [Tipos de clases relativas](#language.types.relative-class-types):
       self, parent, y static




    </li>
    -

      [Tipos singleton](#language.types.singleton)


      <li class="listitem">
       [false](#language.types.singleton)


      -
       [true](#language.types.singleton)



    </li>
    -

      Tipos unitarios


      <li class="listitem">
       [null](#language.types.null)



    </li>
    -

      Tipos definidos por el usuario (generalmente llamados clases-tipos)


      <li class="listitem">
       [Interfaces](#language.oop5.interfaces)


      -
       [Clases](#language.oop5.basic.class)


      -
       [Enumeraciones](#language.types.enumerations)



    </li>
    -
     tipo [callable](#language.types.callable)

#### Tipos escalares

    Un valor se considera escalar si es de tipo [int](#language.types.integer),
    [float](#language.types.float), [string](#language.types.string) o [bool](#language.types.boolean).

#### Tipos definidos por el usuario

    Es posible definir tipos personalizados con
    [interfaces](#language.oop5.interfaces),
    [clases](#language.oop5.basic.class) y
    [enumeraciones](#language.types.enumerations).
    Estos se consideran tipos definidos por el usuario, o tipos de clase.
    Por ejemplo, una clase llamada Elephant puede ser definida,
    luego objetos de tipo Elephant pueden ser instanciados,
    y una función puede requerir un argumento de tipo Elephant.

### Tipos compuestos

    Es posible combinar varios tipos atómicos en tipos compuestos.
    PHP permite combinar los tipos de la siguiente manera:

- Intersección de clases-tipos (interfaces y nombres de clases).

- Unión de tipos.

#### Intersección de tipos

    Un tipo de intersección acepta valores que satisfacen varias
    declaraciones de tipo de clase, en lugar de una sola.
    Los tipos individuales que forman el tipo de intersección están unidos por el símbolo
    &amp;. Por lo tanto, un tipo de intersección compuesto
    por los tipos T, U y
    V se escribe T&amp;U&amp;V.

#### Tipos de unión

    Un tipo de unión acepta valores de varios tipos diferentes,
    en lugar de uno solo.
    Los tipos individuales que forman el tipo de unión están unidos por el símbolo
    |. Por lo tanto, un tipo de unión compuesto
    por los tipos T, U y
    V se escribe T|U|V.
    Si uno de los tipos es un tipo de intersección, debe ser puesto entre
    paréntesis para ser escrito en DNF.
    T|(X&amp;Y).

### Alias de tipo

PHP soporta dos alias de tipo: [mixed](#language.types.mixed) y
[iterable](#language.types.iterable) que corresponde al tipo
[tipo de unión](#language.types.type-system.composite.union)
de object|resource|array|string|float|int|bool|null
y Traversable|array respectivamente.

**Nota**:

    PHP no soporta alias de tipo definidos por el usuario.

## NULL

El tipo [null](#language.types.null) es el tipo unidad de PHP, es decir, que solo tiene un valor:
**[null](#constant.null)**.

Las variables no definidas y [unset()](#function.unset) tendrán el
valor **[null](#constant.null)**.

### Sintaxis

Solo hay un valor de tipo [null](#language.types.null), y es la constante
insensible a mayúsculas y minúsculas **[null](#constant.null)**.

&lt;?php
$var = NULL;
?&gt;

### Conversión a **[null](#constant.null)**

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0,
y _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta funcionalidad está altamente desaconsejado.

Convertir una variable a [null](#language.types.null) utilizando la sintaxis (unset) $var
_no borrará_ la variable, ni sobrescribirá su valor.
Solo devolverá el valor **[null](#constant.null)**.

### Ver también

    - [is_null()](#function.is-null)

    - [unset()](#function.unset)

## Booleano

El tipo [bool](#language.types.boolean) solo posee dos valores y se utiliza para expresar un valor de verdad. Puede ser **[true](#constant.true)** o **[false](#constant.false)**.

### Sintaxis

Para especificar un [bool](#language.types.boolean) literal, utilice la constante **[true](#constant.true)** o **[false](#constant.false)**. Ambas son insensibles a mayúsculas y minúsculas.

&lt;?php
$foo = true; // asigna el valor TRUE a $foo
?&gt;

Típicamente, el resultado de un [operador](#language.operators) que devuelve un [bool](#language.types.boolean), pasado luego a una [estructura de control](#language.control-structures).

&lt;?php
$action = "show_version";
$show_separators = true;

// == es un operador que prueba
// la igualdad y devuelve un booleano
if ($action == "show_version") {
echo "La versión es 1.23";
}

// esto no es necesario...
if ($show_separators == TRUE) {
echo "&lt;hr&gt;\n";
}

// ...en su lugar, se puede utilizar, con el mismo significado:
if ($show_separators) {
echo "&lt;hr&gt;\n";
}
?&gt;

### Conversión en booleano

Para convertir explícitamente un valor en [bool](#language.types.boolean), utilice el cast (bool). Generalmente, esto no es necesario porque cuando un valor se utiliza en un contexto lógico, se interpretará automáticamente como un valor de tipo [bool](#language.types.boolean). Para más información, ver la página [Type Juggling](#language.types.type-juggling).

Al convertir en [bool](#language.types.boolean), los siguientes valores son considerados como **[false](#constant.false)**:

- el [booleano](#language.types.boolean) **[false](#constant.false)**, en sí mismo

- el [entero](#language.types.integer) 0 (cero)

- los [números de punto flotante](#language.types.float) 0.0 y -0.0 (cero)

- la [cadena](#language.types.string) vacía "", y la [cadena](#language.types.string) "0"

- un [array](#language.types.array) sin elementos

- el tipo unidad [NULL](#language.types.null) (incluyendo variables no definidas)

- los objetos internos que sobrecargan su comportamiento de casting en booleano. Por ejemplo: los [objetos SimpleXML](#ref.simplexml) creados a partir de elementos vacíos sin atributos.

Todos los demás valores son considerados como **[true](#constant.true)** (incluyendo los [recursos](#language.types.resource) y **[NAN](#constant.nan)**).

**Advertencia**

    -1 es considerado como **[true](#constant.true)**, como todos los números diferentes de cero (negativos o positivos) !

**Ejemplo #1 Conversión en booleano**

&lt;?php
var_dump((bool) ""); // bool(false)
var_dump((bool) "0"); // bool(false)
var_dump((bool) 1); // bool(true)
var_dump((bool) -2); // bool(true)
var_dump((bool) "foo"); // bool(true)
var_dump((bool) 2.3e5); // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array()); // bool(false)
var_dump((bool) "false"); // bool(true)
?&gt;

## Los enteros

Un [int](#language.types.integer) es un número perteneciente al conjunto
ℤ = {..., -2, -1, 0, 1, 2, ...}.

### Ver también

    - [Los números de coma flotante](#language.types.float)

    - [Las precisiones arbitrarias / BCMath](#book.bc)

    - [Los enteros de longitud arbitraria / GMP](#book.gmp)

### Sintaxis

Los [int](#language.types.integer)s pueden ser especificados en notación decimal (base 10), hexadecimal
(base 16), octal (base 8), o binaria (base 2).
El [operador de negación](#language.operators.arithmetic)
puede ser utilizado para designar un [int](#language.types.integer) negativo.

Para utilizar la notación octal, preceda el número de un 0 (cero).
A partir de PHP 8.1.0, la notación octal puede ser precedida con 0o o 0O.
Para utilizar la notación hexadecimal, preceda el número de 0x.
Para utilizar la notación binaria, preceda el número de 0b.

A partir de PHP 7.4.0, los enteros literales pueden contener underscores
(\_) entre los dígitos, para una mejor legibilidad
de los literales. Estos underscores son eliminados por el escáner de PHP.

**Ejemplo #1 Los enteros literales**

&lt;?php
$a = 1234; // un número decimal
$a = 0123; // un número octal (equivalente a 83 en decimal)
$a = 0o123; // un número octal (a partir de PHP 8.1.0)
$a = 0x1A; // un número hexadecimal (equivalente a 26 en decimal)
$a = 0b11111111; // un número binario (equivalente a 255 en decimal)
$a = 1_234_567; // un número decimal (a partir de PHP 7.4.0)
?&gt;

Formalmente, la estructura de un entero literal es a partir de PHP 8.1.0
(anteriormente, los prefijos octales 0o o 0O
no estaban permitidos, y antes de PHP 7.4.0, los underscores no estaban permitidos.

decimal : [1-9][0-9]_(\_[0-9]+)_
| 0

hexadecimal : 0[xX][0-9a-fA-F]+(\_[0-9a-fA-F]+)\*

octal : 0[oO]?[0-7]+(\_[0-7]+)\*

binary : 0[bB][01]+(\_[01]+)\*

integer : decimal
| hexadecimal
| octal
| binary

El tamaño de un [int](#language.types.integer) es dependiente de la plataforma, sin embargo,
un valor máximo de aproximadamente 2 mil millones es habitual (esto corresponde
a 32 bits con signo). Las plataformas de 64 bits tienen habitualmente un valor
máximo de aproximadamente 9E18.
PHP no soporta los [int](#language.types.integer)s sin signo.
El tamaño de un [int](#language.types.integer) puede ser determinado utilizando la constante
**[PHP_INT_SIZE](#constant.php-int-size)**, el valor máximo, utilizando
la constante **[PHP_INT_MAX](#constant.php-int-max)**,
y el valor mínimo utilizando la constante
**[PHP_INT_MIN](#constant.php-int-min)**.

### Desbordamiento de entero

Si PHP encuentra un número superior al máximo de un [int](#language.types.integer), será
interpretado como un [float](#language.types.float). De la misma manera, una operación que resulte en
un número fuera del rango del tipo [int](#language.types.integer) devolverá un [float](#language.types.float).

**Ejemplo #2 Desbordamiento de entero en un sistema de 32 bits**

&lt;?php

$large_number = 50000000000000000000;
var_dump($large_number); // float(5.0E+19)
var_dump(PHP_INT_MAX + 1); // sistema de 32 bits: float(2147483648)
// sistema de 64 bits: float(9.2233720368548E+18)
?&gt;

### División de entero

No hay operador de división de [int](#language.types.integer) en PHP, para lograr esto
utilizar la función [intdiv()](#function.intdiv).
1/2 produce el [float](#language.types.float) (0.5).
El valor puede ser convertido en un [int](#language.types.integer) para redondear hacia cero, o
utilizando la función [round()](#function.round) para tener un control
más fino sobre cómo se realiza el redondeo.

**Ejemplo #3 División**

&lt;?php
var_dump(25/7); // float(3.5714285714286)
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7)); // float(4)
?&gt;

### Conversión en entero

Para convertir explícitamente un valor en un [int](#language.types.integer), utilizar la palabra clave (int), o (integer).
Sin embargo, en la mayoría de los casos, esta palabra clave no es necesaria
ya que un valor será automáticamente convertido si un operador, una
función o una estructura de control requiere un [int](#language.types.integer) como argumento. Un valor puede también ser convertido en un [int](#language.types.integer)
utilizando la función [intval()](#function.intval).

Si un [resource](#language.types.resource) es convertido a un [int](#language.types.integer), entonces
el resultado será el identificador único del [resource](#language.types.resource) asignado
por PHP en la ejecución.

Ver también [el transtipado](#language.types.type-juggling).

#### Desde un [booléen](#language.types.boolean)

    **[false](#constant.false)** corresponde a 0 (cero), y **[true](#constant.true)** corresponde a
    1 (uno).

####

    Desde [un número de coma flotante](#language.types.float)




    Al convertir un [float](#language.types.float) en [int](#language.types.integer), el número es redondeado
    *hacia cero*.
    A partir de PHP 8.1.0, se emite una notificación de deprecación al realizar la
    conversión implícita de un [float](#language.types.float) no integral en [int](#language.types.integer) perdiendo precisión.




    **Ejemplo #4 Conversión desde números flotantes**

&lt;?php

function foo($value): int {
return $value;
}

var_dump(foo(8.1)); // "Deprecated: Implicit conversion from float 8.1 to int loses precision" a partir de PHP 8.1.0
var_dump(foo(8.1)); // Antes de PHP 8.1.0
var_dump(foo(8.0)); // 8 en ambos casos

var_dump((int) 8.1); // 8 en ambos casos
var_dump(intval(8.1)); // 8 en ambos casos
?&gt;

    Si el número de coma flotante está más allá de los límites de los [int](#language.types.integer)s (habitualmente,
    +/- 2.15e+9 = 2^31 en plataformas de 32 bits y
    +/- 9.22e+18 = 2^63 en plataformas de 64 bits),
    el resultado será indefinido, ya que el [float](#language.types.float) no tiene suficiente precisión para dar un resultado [int](#language.types.integer) exacto.
    ¡No se emite ninguna alerta cuando ocurre este comportamiento!

**Nota**:

     NaN, Infinity y -Inf son siempre igual a cero al convertir en
     [int](#language.types.integer).

**Advertencia**

     Nunca convierta una fracción desconocida en un [int](#language.types.integer), esto puede
     generar resultados inesperados.







&lt;?php
echo (int) ( (0.1+0.7) \* 10 ); // Muestra 7 !
?&gt;

     Ver también la sección sobre [las alertas
     concernientes a la precisión de los números de coma flotante](#warn.float-precision).

#### Desde cadenas de caracteres

    Si una cadena es
    [numérica](#language.types.numeric-strings)
    o numérica de cabeza entonces será transformada en su valor entero
    correspondiente, de lo contrario será convertida a cero (0).

#### Desde [NULL](#language.types.null)

    **[null](#constant.null)** es siempre convertido en cero (0).

#### Desde otros tipos

**Precaución**

     El comportamiento de la conversión en [int](#language.types.integer) es indefinido desde otros tipos.
     No reportar *ningún* comportamiento observado, sabiendo que pueden
     cambiar sin previo aviso.

## Números de punto flotante

Los números de punto flotante (también conocidos como "floats",
"doubles", o "números reales")
pueden ser especificados utilizando las siguientes sintaxis:

&lt;?php
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567; // a partir de PHP 7.4.0
?&gt;

Formalmente a partir de PHP 7.4.0 (anteriormente, los guiones bajos no estaban permitidos):

LNUM [0-9]+(\_[0-9]+)\*
DNUM ({LNUM}?"."{LNUM}) | ({LNUM}"."{LNUM}?)
EXPONENT_DNUM (({LNUM} | {DNUM}) [eE][+-]? {LNUM})

El tamaño de un [float](#language.types.float) depende de la plataforma, sin embargo,
un número máximo de aproximadamente 1.8e308 con una precisión de 14 dígitos es
un valor común (formato de 64 bits IEEE).

**Advertencia**

# Precisión de los números de punto flotante

Los números de punto flotante tienen una precisión limitada. Aunque dependen del sistema,
PHP utiliza el formato de precisión decimal IEEE 754, que dará un error relativo máximo del orden de 1.11e-16 (debido a los redondeos). Las operaciones
aritméticas no elementales pueden dar errores más grandes y, por supuesto, los errores deben ser tenidos en cuenta cuando se realizan múltiples operaciones.

Asimismo, los números racionales exactamente representables como números de punto flotante en base 10, como 0.1 o 0.7, no tienen
una representación exacta como números de punto flotante en base 2, utilizada internamente, y esto independientemente del tamaño de la mantisa. Por lo tanto, no pueden
ser convertidos sin una pequeña pérdida de precisión. Esto puede llevar a resultados confusos: por ejemplo, floor((0.1+0.7)\*10) normalmente devolverá
7 en lugar del 8 esperado, ya que la representación interna será algo como 7.9999999999999991118....

Por lo tanto, nunca se debe confiar en los últimos dígitos de un número
de punto flotante, y tampoco se debe comparar la igualdad de 2 números de punto flotante
directamente. Si se necesita una mayor precisión, las
[funciones matemáticas de precisión arbitraria](#ref.bc)
y las funciones [gmp](#ref.gmp) están disponibles.

Para una explicación "simple", ver el
[» guía relativa a los números
de punto flotante](http://floating-point-gui.de/).

### Convertir a un número de punto flotante

#### Desde cadenas de caracteres

    Si una cadena es
    [numérica](#language.types.numeric-strings)
    o numérica de cabeza entonces será transformada en su valor de punto flotante
    correspondiente, de lo contrario será convertida a cero(0).

#### Desde otros tipos

    Para los valores de otros tipos, la conversión se realiza convirtiendo
    el valor primero en [int](#language.types.integer) y luego en [float](#language.types.float). Ver
    [conversión a entero](#language.types.integer.casting)
    para más información.

**Nota**:

     Como algunos tipos tienen un comportamiento indefinido al convertirse
     en [int](#language.types.integer), esto también es el caso al convertirse en
     [float](#language.types.float).

### Comparación de números de punto flotante

Como se mencionó anteriormente, la prueba de igualdad de valores de
números de punto flotante es problemática, debido a la forma en que se representan internamente. Sin embargo, existen formas de
realizar esta comparación.

Para probar la igualdad de valores de números de punto flotante, se utiliza un límite superior del error relativo al redondeo. Este valor es conocido
como el epsilon de la máquina, o el unit roundoff,
y es la diferencia más pequeña aceptable en los cálculos.

$a y $b son iguales en 5 números
después de la coma.

**Ejemplo #1 Comparación de números de punto flotante**

&lt;?php
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if( abs($a - $b) &lt; $epsilon) {
echo "true";
}
?&gt;

### NaN

Algunas operaciones numéricas pueden dar como resultado un valor
representado por la constante **[NAN](#constant.nan)**. Este resultado representa
un valor indefinido o no representable en cálculos con números de punto flotante. Cualquier comparación, incluso estricta de este valor con
otro valor, incluyendo esta constante misma, excepto si es igual a **[true](#constant.true)**, dará un valor de **[false](#constant.false)**.

Debido a que **[NAN](#constant.nan)** representa cualquier número de valores
diferentes, **[NAN](#constant.nan)** no debe ser comparado con otros valores,
incluyendo esta constante misma, y en su lugar, debe ser verificado
utilizando la función [is_nan()](#function.is-nan).

## Cadenas

Un [string](#language.types.string) es una serie de caracteres, donde un caracter
es lo mismo que un octeto. Esto significa que PHP solo admite un conjunto
de 256 caracteres, y por lo tanto no ofrece soporte nativo para Unicode. Ver
[los detalles del tipo string](#language.types.string.details).

**Nota**:

En las versiones de 32 bits, un [string](#language.types.string) puede ser tan grande como 2 Go
(2147483647 octetos maximo)

### Sintaxis

Un [string](#language.types.string) literal puede especificarse de cuatro maneras diferentes:

- [entre comillas simples](#language.types.string.syntax.single)

- [entre comillas dobles](#language.types.string.syntax.double)

- [sintaxis heredoc](#language.types.string.syntax.heredoc)

- [sintaxis nowdoc](#language.types.string.syntax.nowdoc)

#### Entre comillas simples

    La manera más simple de especificar un [string](#language.types.string) es encerrarlo entre
    comillas simples (el caracter ').





    Para especificar una comilla simple literal, escápela con un antislash
    (\). Para especificar un antislash literal, duplícalo
    (\\). Todas las demás ocurrencias del antislash serán tratadas
    como un antislash literal: esto significa que otras secuencias de escape que usted
    podría conocer, tales como \r o \n,
    serán salidas literalmente como se especifica en lugar de tener un significado especial.

**Nota**:

     A diferencia de las [comillas dobles](#language.types.string.syntax.double)
     y [sintaxis heredoc](#language.types.string.syntax.heredoc),
     las [variables](#language.variables) y las secuencias de escape
     para caracteres especiales *no* serán *extendidas*
     cuando se encuentren en strings entre comillas simples.






    **Ejemplo #1 Variantes de sintaxis**

&lt;?php
echo 'esto es un string simple', PHP_EOL;

echo 'Usted puede también tener nuevas líneas integradas
en los strings de esta manera, ya que
es aceptable hacerlo.', PHP_EOL;

// Muestra: Arnold dijo una vez: "Volveré"
echo 'Arnold dijo una vez: "Volveré"', PHP_EOL;

// Muestra: ¿Usted ha borrado C:\*._?
echo '¿Usted ha borrado C:\\_.\* ?', PHP_EOL;

// Muestra: ¿Usted ha borrado C:\*._?
echo '¿Usted ha borrado C:\*._ ?', PHP_EOL;

// Muestra: Esto no se extenderá: \n una nueva línea
echo 'Esto no se\'extenderá: \n una nueva línea', PHP_EOL;

// Muestra: Las variables no $se\'extienden $tampoco
echo 'Las variables no $se\'extienden $tampoco', PHP_EOL;
?&gt;

#### Entre comillas dobles

    Si el [string](#language.types.string) está encerrado entre comillas dobles ("), PHP interpretará
    las siguientes secuencias de escape para caracteres especiales:





    <caption>**Caracteres escapados**</caption>




       Secuencia
       Significado







       \n
       retorno de carro (LF o 0x0A (10) en ASCII)



       \r
       retorno de carro (CR o 0x0D (13) en ASCII)



       \t
       tabulación horizontal (HT o 0x09 (9) en ASCII)



       \v
       tabulación vertical (VT o 0x0B (11) en ASCII)



       \e
       escape (ESC o 0x1B (27) en ASCII)



       \f
       avance de formulario (FF o 0x0C (12) en ASCII)



       \\
       antislash



       \$
       signo de dólar



       \"
       comilla doble



       \[0-7]{1,3}

        Octal: la secuencia de caracteres correspondiente a la expresión regular [0-7]{1,3}
        es un caracter en notación octal (por ejemplo, "\101" === "A"),
        que desborda silenciosamente para adaptarse a un octeto (por ejemplo, "\400" === "\000")




       \x[0-9A-Fa-f]{1,2}

        Hexadecimal: la secuencia de caracteres correspondiente a la expresión regular
        [0-9A-Fa-f]{1,2} es un caracter en notación hexadecimal
        (por ejemplo, "\x41" === "A")




       \u{[0-9A-Fa-f]+}

        Unicode: la secuencia de caracteres correspondiente a la expresión regular [0-9A-Fa-f]+
        es un punto de código Unicode, que será salido en el string bajo la representación UTF-8 de este punto de código.
        Las llaves son requeridas en la secuencia. Por ejemplo, "\u{41}" === "A"








    Como para los strings entre comillas simples, escapar cualquier otro caracter
    también resultará en la impresión del antislash.





    La característica más importante de los strings entre comillas dobles es el hecho
    de que los nombres de variables serán extendidos. Ver
    [la interpolación de strings](#language.types.string.parsing) para
    más detalles.

#### Heredoc

    Una tercera manera de delimitar los strings es la sintaxis heredoc:
    &lt;&lt;&lt;. Después de este operador, se
    proporciona un identificador, luego una nueva línea. El [string](#language.types.string) mismo sigue, luego
    el mismo identificador nuevamente para cerrar la cita.





    El identificador de cierre puede estar indentado con espacios o tabulaciones, en cuyo caso
    la indentación será eliminada de todas las líneas en el string doc.
    Antes de PHP 7.3.0, el identificador de cierre *debe*
    comenzar en la primera columna de la línea.





    Además, el identificador de cierre debe seguir las mismas reglas de nombramiento que cualquier
    otro etiqueta en PHP: debe contener solo caracteres alfanuméricos y guiones bajos,
    y debe comenzar con un carácter no numérico o un guión bajo.





    **Ejemplo #2 Ejemplo básico de Heredoc a partir de PHP 7.3.0**

&lt;?php
// sin indentación
echo &lt;&lt;&lt;END
a
b
c
\n
END;

// 4 espacios de indentación
echo &lt;&lt;&lt;END
a
b
c
END;

    Resultado del ejemplo anterior en PHP 7.3:




      a
     b
    c

a
b
c

    Si el identificador de cierre está indentado más que cualquier línea del cuerpo, entonces se levantará un [ParseError](#class.parseerror):





    **Ejemplo #3 El identificador de cierre no debe estar indentado más que cualquier línea del cuerpo**

&lt;?php
echo &lt;&lt;&lt;END
a
b
c
END;

    Resultado del ejemplo anterior en PHP 7.3:

Parse error: Invalid body indentation level (expecting an indentation level of at least 3) in example.php on line 4

    Si el identificador de cierre está indentado, las tabulaciones también pueden ser utilizadas, sin embargo,
    las tabulaciones y los espacios *no deben* mezclarse en cuanto a
    la indentación del identificador de cierre y la indentación del cuerpo
    (hasta el identificador de cierre). En cualquiera de estos casos, se levantará un [ParseError](#class.parseerror).

    Estas restricciones de espacio han sido incluidas porque mezclar espacios y tabulaciones para la indentación perjudica la legibilidad.





    **Ejemplo #4 Indentación diferente para el cuerpo (espacios) identificador de cierre**

&lt;?php
// Todo el código siguiente no funciona.

// indentación diferente para el cuerpo (espacios) marcador de fin (tabulaciones)
{
echo &lt;&lt;&lt;END
a
END;
}

// mezcla de espacios y tabulaciones en el cuerpo
{
echo &lt;&lt;&lt;END
a
END;
}

// mezcla de espacios y tabulaciones en el marcador de fin
{
echo &lt;&lt;&lt;END
a
END;
}

    Resultado del ejemplo anterior en PHP 7.3:

Parse error: Invalid indentation - tabs and spaces cannot be mixed in example.php line 8

    El identificador de cierre para el string del cuerpo no es requerido para ser
    seguido de un punto y coma o un salto de línea. Por ejemplo, el siguiente
    código es permitido a partir de PHP 7.3.0:





    **Ejemplo #5 Continuación de una expresión después de un identificador de cierre**

&lt;?php
$values = [&lt;&lt;&lt;END
a
  b
    c
END, 'd e f'];
var_dump($values);

    Resultado del ejemplo anterior en PHP 7.3:

array(2) {
[0] =&gt;
string(11) "a
b
c"
[1] =&gt;
string(5) "d e f"
}

**Advertencia**

     Si el identificador de cierre ha sido encontrado al principio de una línea, entonces
     no importa si formaba parte de otra palabra, puede ser considerado
     como el identificador de cierre y provocar un [ParseError](#class.parseerror).





     **Ejemplo #6 El identificador de cierre en el cuerpo del string tiende a provocar un ParseError**




&lt;?php
$values = [&lt;&lt;&lt;END
a
b
END ING
END, 'd e f'];

     Resultado del ejemplo anterior en PHP 7.3:

Parse error: syntax error, unexpected identifier "ING", expecting "]" in example.php on line 5

     Para evitar este problema, es seguro seguir la regla simple:
     *no elegir una palabra que aparezca en el cuerpo del texto
     como identificador de cierre*.

**Advertencia**

     Antes de PHP 7.3.0, es muy importante señalar que la línea que contiene el
     identificador de cierre no debe contener ningún otro carácter, excepto un punto y coma
     (;).
     Esto significa principalmente que el identificador
     *no puede estar indentado*, y no debe haber espacios
     o tabulaciones antes o después del punto y coma. También es importante darse cuenta de que
     el primer carácter antes del identificador de cierre debe ser un salto de línea tal como
     se define en el sistema operativo local. Es \n en
     los sistemas UNIX, incluyendo macOS. El delimitador de cierre también debe ser
     seguido de un salto de línea.





     Si esta regla se viola y el identificador de cierre no está "limpio", no será
     considerado como un identificador de cierre, y PHP continuará buscando uno. Si un
     identificador de cierre adecuado no se encuentra antes del final del archivo
     actual, se producirá un error de análisis en la última línea.





     **Ejemplo #7 Ejemplo inválido, antes de PHP 7.3.0**





&lt;?php
class foo {
public $bar = &lt;&lt;&lt;EOT
bar
EOT;
}
// El identificador no debe estar indentado
?&gt;

     **Ejemplo #8 Ejemplo válido, incluso antes de PHP 7.3.0**





&lt;?php
class foo {
public $bar = &lt;&lt;&lt;EOT
bar
EOT;
}
?&gt;

     Los heredocs que contienen variables no pueden ser utilizados para inicializar propiedades de clase.







    El texto heredoc se comporta exactamente como un [string](#language.types.string) entre comillas dobles, sin las comillas. Esto significa que las comillas en un heredoc no necesitan ser escapadas, pero los códigos de escape mencionados anteriormente pueden seguir siendo utilizados. Las variables son desarrolladas, pero debe tenerse el mismo cuidado al expresar variables complejas dentro de un heredoc que para los strings.





    **Ejemplo #9 Ejemplo de cita de string heredoc**

&lt;?php
$str = &lt;&lt;&lt;EOD
Ejemplo de string
que se extiende sobre múltiples líneas
usando la sintaxis heredoc.
EOD;

/_ Ejemplo más complejo, con variables. _/
class foo
{
var $foo;
var $bar;

    function __construct()
    {
        $this-&gt;foo = 'Foo';
        $this-&gt;bar = array('Bar1', 'Bar2', 'Bar3');
    }

}

$foo = new foo();
$name = 'MyName';

echo &lt;&lt;&lt;EOT
Mi nombre es "$name". Estoy imprimiendo $foo-&gt;foo.
Ahora, estoy imprimiendo {$foo-&gt;bar[1]}.
Esto debería imprimir una 'A' mayúscula: \x41
EOT;
?&gt;

    El ejemplo anterior mostrará:

Mi nombre es "MyName". Estoy imprimiendo Foo.
Ahora, estoy imprimiendo Bar2.
Esto debería imprimir una 'A' mayúscula: A

    También es posible utilizar la sintaxis heredoc para pasar datos a los argumentos de función:





    **Ejemplo #10 Heredoc en ejemplos de argumentos**

&lt;?php
var_dump(array(&lt;&lt;&lt;EOD
foobar!
EOD
));
?&gt;

    Es posible inicializar variables estáticas y propiedades/constantes de clase utilizando la sintaxis heredoc:





    **Ejemplo #11 Uso de Heredoc para inicializar valores estáticos**

&lt;?php
// Variables estáticas
function foo()
{
static $bar = &lt;&lt;&lt;LABEL
Nada aquí...
LABEL;
}

// Propiedades/constantes de clase
class foo
{
const BAR = &lt;&lt;&lt;FOOBAR
Ejemplo de constante
FOOBAR;

    public $baz = &lt;&lt;&lt;FOOBAR

Ejemplo de propiedad
FOOBAR;
}
?&gt;

    El identificador de apertura del Heredoc puede eventualmente ser
    encerrado entre comillas dobles:





    **Ejemplo #12 Uso de comillas dobles en el Heredoc**

&lt;?php
echo &lt;&lt;&lt;"FOOBAR"
¡Hola mundo!
FOOBAR;
?&gt;

#### Nowdoc

    Los nowdocs son para los strings entre comillas simples lo que los heredocs son para los strings entre comillas dobles. Un nowdoc se especifica de manera similar a un heredoc, pero *ninguna interpolación de string es realizada* dentro de un nowdoc. La construcción es ideal para integrar código PHP o otros bloques de texto voluminosos sin necesidad de escapar. Comparte algunas características con la construcción SGML
    &lt;![CDATA[ ]]&gt;, en el sentido de que declara
    un bloque de texto que no está destinado a ser analizado.





    Un nowdoc es identificado por la misma secuencia &lt;&lt;&lt;
    utilizada para los heredocs, pero el identificador que sigue está encerrado entre comillas simples, por ejemplo &lt;&lt;&lt;'EOT'. Todas las reglas para los identificadores heredoc se aplican también a los identificadores nowdoc, en particular aquellas concernientes a la apariencia del identificador de cierre.





    **Ejemplo #13 Ejemplo de cita de string nowdoc**

&lt;?php
echo &lt;&lt;&lt;'EOD'
Ejemplo de string que se extiende sobre múltiples líneas
usando la sintaxis nowdoc. Las barras invertidas son siempre tratadas literalmente,
es decir \\ y \'.
EOD;

    El ejemplo anterior mostrará:

Ejemplo de string que se extiende sobre múltiples líneas
usando la sintaxis nowdoc. Las barras invertidas son siempre tratadas literalmente,
es decir \\ y \'.

    **Ejemplo #14 Ejemplo de cita de string nowdoc con variables**

&lt;?php
class foo
{
public $foo;
public $bar;

    function __construct()
    {
        $this-&gt;foo = 'Foo';
        $this-&gt;bar = array('Bar1', 'Bar2', 'Bar3');
    }

}

$foo = new foo();
$name = 'MyName';

echo &lt;&lt;&lt;'EOT'
Mi nombre es "$name". Estoy imprimiendo $foo-&gt;foo.
Ahora, estoy imprimiendo {$foo-&gt;bar[1]}.
Esto no debería imprimir una 'A' mayúscula: \x41
EOT;
?&gt;

    El ejemplo anterior mostrará:

Mi nombre es "$name". Estoy imprimiendo $foo-&gt;foo.
Ahora, estoy imprimiendo {$foo-&gt;bar[1]}.
Esto no debería imprimir una 'A' mayúscula: \x41

    **Ejemplo #15 Ejemplo de datos estáticos**

&lt;?php
class foo {
public $bar = &lt;&lt;&lt;'EOT'
bar
EOT;
}
?&gt;

#### Interpolación de strings

    Cuando un [string](#language.types.string) es especificado entre comillas dobles o con heredoc,
    las [variables](#language.variables) pueden ser sustituidas dentro.





    Existen dos tipos de sintaxis: una
    [básica](#language.types.string.parsing.basic) y una
    [avanzada](#language.types.string.parsing.advanced).
    La sintaxis básica es la más común y práctica. Ofrece un medio para incorporar una variable,
    un valor [array](#language.types.array) o una propiedad objeto en un [string](#language.types.string) con un mínimo de esfuerzo.





    ##### Sintaxis básica


     Si un signo de dólar ($) es encontrado, los caracteres que lo siguen y que pueden ser utilizados en un nombre de variable serán interpretados como tales y sustituidos.






&lt;?php
$juice = "manzana";

echo "Él bebió un poco de $juice jugo." . PHP_EOL;

?&gt;

     El ejemplo anterior mostrará:




Él bebió un poco de manzana jugo.

     Formalmente, la estructura para la sintaxis de sustitución de variable básica es la siguiente:




     **Ejemplo #16 Interpolación de strings**




string-variable::
variable-name (offset-or-property)?
| ${ expression }

offset-or-property::
offset-in-string
| property-in-string

offset-in-string::
[ name ]
| [ variable-name ]
| [ integer-literal ]

property-in-string::
-&gt; name

variable-name::
$ name

name::
[a-zA-Z\_\x80-\xff][a-zA-Z0-9_\x80-\xff]\*

    **Advertencia**

      La sintaxis ${ expression } está deprecada desde
      PHP 8.2.0, ya que puede ser interpretada como
      [variables de variables](#language.variables.variable):





&lt;?php
const foo = 'bar';
$foo = 'foo';
$bar = 'bar';
var_dump("${foo}");
var_dump("${(foo)}");
?&gt;

       Resultado del ejemplo anterior en PHP 8.2:




Deprecated: Usar ${var} en strings está deprecado, use {$var} en su lugar en el archivo en la línea 6

Deprecated: Usar ${expr} (variables de variables) en strings está deprecado, use {${expr}} en su lugar en el archivo en la línea 9
string(3) "foo"
string(3) "bar"

       El ejemplo anterior mostrará:




string(3) "foo"
string(3) "bar"

      La sintaxis de interpolación de string [avanzada](#language.types.string.parsing.advanced) debería ser utilizada en su lugar.



    **Nota**:

      Si no es posible formar un nombre válido, el signo de dólar
      tal cual en el string:






&lt;?php
echo "Ninguna interpolación $ ha ocurrido\n";
echo "Ninguna interpolación $\n ha ocurrido\n";
echo "Ninguna interpolación $2 ha ocurrido\n";
?&gt;

      El ejemplo anterior mostrará:




Ninguna interpolación $ ha ocurrido
Ninguna interpolación $
ha ocurrido
Ninguna interpolación $2 ha ocurrido

     **Ejemplo #17 Interpolación del valor de la primera dimensión de un array o propiedad**




&lt;?php
$juices = array("manzana", "naranja", "string_key" =&gt; "violet");

echo "Él bebió un poco de $juices[0] jugo.";
echo PHP_EOL;
echo "Él bebió un poco de $juices[1] jugo.";
echo PHP_EOL;
echo "Él bebió un poco de $juices[string_key] jugo.";
echo PHP_EOL;

class A {
public $s = "string";
}

$o = new A();

echo "Valor del objeto: $o-&gt;s.";
?&gt;

     El ejemplo anterior mostrará:




Él bebió un poco de manzana jugo.
Él bebió un poco de naranja jugo.
Él bebió un poco de violet jugo.
Valor del objeto: string.

    **Nota**:

      La clave del array debe ser no citada, y por lo tanto no es posible
      referenciar una constante como clave con la sintaxis básica. Utilice la
      sintaxis [avanzada](#language.types.string.parsing.advanced)
      en su lugar.






     Desde PHP 7.1.0, los índices numéricos *negativos* también
     son soportados.




    **Ejemplo #18 Índices numéricos negativos**




&lt;?php
$string = 'string';
echo "El carácter en el índice -2 es $string[-2].", PHP_EOL;
$string[-3] = 'o';
echo "Cambiar el carácter en el índice -3 a o da $string.", PHP_EOL;
?&gt;

     El ejemplo anterior mostrará:




El carácter en el índice -2 es n.
Cambiar el carácter en el índice -3 a o da strong.

     Para todo lo que es más complejo, la
     [sintaxis avanzada](#language.types.string.parsing.advanced)
     debe ser utilizada.






    ##### Sintaxis avanzada (sintaxis de llaves)



     La sintaxis avanzada permite la interpolación de
     *variables* con accesorios arbitrarios.





     Cualquier variable escalar, elemento de array o propiedad de objeto
     (estática o no) con una representación
     [string](#language.types.string) puede ser incluida mediante esta sintaxis.
     La expresión es escrita de la misma manera que aparecería fuera de la
     [string](#language.types.string), luego encerrada entre { y
     }. Dado que { no puede ser escapado, esta
     sintaxis solo será reconocida cuando el $ siga inmediatamente al
     {. Utilice {\$ para obtener un
     {$. Aquí hay algunos ejemplos para aclarar:





     **Ejemplo #19 Sintaxis con llaves**




&lt;?php
const DATA_KEY = 'const-key';
$great = 'fantástico';
$arr = [
'1',
'2',
'3',
[41, 42, 43],
'key' =&gt; 'Valor indexado',
'const-key' =&gt; 'Clave con un signo menos',
'foo' =&gt; ['foo1', 'foo2', 'foo3']
];

// No funcionará, mostrará: Esto es { fantástico}
echo "Esto es { $great}";

// Funciona, mostrará: Esto es fantástico
echo "Esto es {$great}";

class Square {
public $width;

    public function __construct(int $width) { $this-&gt;width = $width; }

}

$square = new Square(5);

// Funciona
echo "Este cuadrado mide {$square-&gt;width}00 centímetros de ancho.";

// Funciona, las claves entre comillas solo funcionan con la sintaxis de llaves
echo "Esto funciona: {$arr['key']}";

// Funciona
echo "Esto funciona: {$arr[3][2]}";

echo "Esto funciona: {$arr[DATA_KEY]}";

// Al utilizar arrays multidimensionales, siempre use llaves alrededor de los arrays
// cuando estén dentro de strings
echo "Esto funciona: {$arr['foo'][2]}";

echo "Esto funciona: {$obj-&gt;values[3]-&gt;name}";

echo "Esto funciona: {$obj-&gt;$staticProp}";

// No funcionará, mostrará: C:\directory\{fantástico}.txt
echo "C:\directory\{$great}.txt";

// Funciona, mostrará: C:\directory\fantástico.txt
echo "C:\\directory\\{$great}.txt";
?&gt;

    **Nota**:

      Como esta sintaxis permite expresiones arbitrarias, es posible utilizar
      [variables de variables](#language.variables.variable)
      en la sintaxis avanzada.


#### Acceso y modificación de string por carácter

    Los caracteres en los strings pueden ser accedidos y modificados especificando
    el offset basado en cero del carácter deseado después del
    [string](#language.types.string) utilizando corchetes [array](#language.types.array), como en
    $str[42]. Piense en un [string](#language.types.string) como un
    [array](#language.types.array) de caracteres para este propósito. Las funciones
    [substr()](#function.substr) y [substr_replace()](#function.substr-replace)
    pueden ser utilizadas cuando se desea extraer o reemplazar más de un carácter.

**Nota**:

     Desde PHP 7.1.0, los offsets de string negativos también son soportados. Estos especifican
     el offset desde el final del string.
     Anteriormente, los offsets negativos emitían **[E_NOTICE](#constant.e-notice)** para la lectura
     (produciendo un string vacío) y **[E_WARNING](#constant.e-warning)** para la escritura
     (dejando el string intacto).

**Nota**:

     Antes de PHP 8.0.0, los strings también podían ser accedidos utilizando llaves, como en
     $str{42}, para el mismo propósito.
     Esta sintaxis de llaves fue deprecada desde PHP 7.4.0 y ya no es soportada desde PHP 8.0.0.

**Advertencia**

     Escribir en un offset fuera de alcance llena el string con espacios.
     Los tipos no enteros son convertidos a entero.
     Un tipo de offset ilegal emite **[E_WARNING](#constant.e-warning)**.
     Solo el primer carácter de un string asignado es utilizado.
     Desde PHP 7.1.0, asignar un string vacío genera un error fatal. Anteriormente,
     esto asignaba un octeto NULL.

**Advertencia**

     Internamente, los strings PHP son arrays de octetos. En consecuencia, acceder o
     modificar un string utilizando corchetes de array no es seguro para multi-octetos, y
     solo debe hacerse con strings en codificación de un solo octeto como ISO-8859-1.

**Nota**:

     Desde PHP 7.1.0, aplicar el operador de índice vacío a un string vacío genera un error fatal.
     Anteriormente, el string vacío era silenciosamente convertido a array.






    **Ejemplo #20 Algunos ejemplos de strings**

&lt;?php
// Obtener el primer carácter de un string
$str = 'Esto es una prueba.';
$first = $str[0];
var_dump($first);

// Obtener el tercer carácter de un string
$third = $str[2];
var_dump($third);

// Obtener el último carácter de un string.
$str = 'Esto sigue siendo una prueba.';
$last = $str[strlen($str)-1];
var_dump($last);

// Modificar el último carácter de un string
$str = 'Mire el mar';
$str[strlen($str)-1] = 'e';
var_dump($str);
?&gt;

    Los offsets de string deben ser enteros o strings que parezcan enteros,
    de lo contrario se emitirá una advertencia.





    **Ejemplo #21 Ejemplo de offsets de string ilegales**

&lt;?php
$str = 'abc';

foreach ($keys as $keyToTry) {
    var_dump(isset($str[$keyToTry]));

    try {
        var_dump($str[$keyToTry]);
    } catch (TypeError $e) {
        echo $e-&gt;getMessage(), PHP_EOL;
    }

    echo PHP_EOL;

}
?&gt;

    El ejemplo anterior mostrará:

bool(true)
string(1) "b"

bool(false)
Cannot access offset of type string on string

bool(false)
Cannot access offset of type string on string

bool(false)

Warning: Illegal string offset "1x" in Standard input code on line 10
string(1) "b"

**Nota**:

     Acceder a variables de otros tipos (excepto arrays u objetos
     que implementen las interfaces apropiadas) utilizando [] o
     {} devuelve silenciosamente **[null](#constant.null)**.

**Nota**:

     Los caracteres en literales de string pueden ser accedidos
     utilizando [] o {}.

**Nota**:

     Acceder a caracteres en literales de string utilizando la
     sintaxis {} fue deprecada en PHP 7.4.
     Esto fue eliminado en PHP 8.0.

### Funciones y operadores útiles

Los strings pueden ser concatenados utilizando el operador '.' (punto). Tenga en cuenta
que el operador '+' (suma) _no_ funcionará para esto.
Consulte [los operadores de string](#language.operators.string) para
más información.

Existen varias funciones útiles para la manipulación de strings.

Consulte la [sección de funciones de string](#ref.strings) para
funciones generales, y la [sección de funciones de expresiones regulares compatibles con Perl](#ref.pcre) para
funcionalidades avanzadas de búsqueda y reemplazo.

También existen [funciones para strings de URL](#ref.url), y
funciones para cifrar/descifrar strings
([Sodium](#ref.sodium) y
[Hash](#ref.hash)).

Finalmente, consulte también las [funciones de tipo de carácter](#ref.ctype).

### Conversión a string

Un valor puede ser convertido a [string](#language.types.string) utilizando el
cast (string) o la función [strval()](#function.strval).
La conversión a [string](#language.types.string) es realizada automáticamente en el contexto de una
expresión donde un [string](#language.types.string) es necesario. Esto ocurre al utilizar las
funciones [echo](#function.echo) o [print](#function.print), o cuando
una variable es comparada con un [string](#language.types.string). Las secciones sobre
[Tipos](#language.types) y
[Type Juggling](#language.types.type-juggling) aclararán
lo siguiente. Ver también la función [settype()](#function.settype).

Un valor [bool](#language.types.boolean) **[true](#constant.true)** es convertido al [string](#language.types.string)
"1". El [bool](#language.types.boolean) **[false](#constant.false)** es convertido a
"" (el string vacío). Esto permite una conversión de ida y vuelta entre
los valores [bool](#language.types.boolean) y [string](#language.types.string).

Un [int](#language.types.integer) o [float](#language.types.float) es convertido a un
[string](#language.types.string) representando el número textualmente (incluyendo la
parte exponencial para los [float](#language.types.float)). Los números de punto flotante pueden ser
convertidos utilizando la notación exponencial (4.1E+6).

**Nota**:

    A partir de PHP 8.0.0, el carácter de la coma decimal es siempre
    un punto ("."). Antes de PHP 8.0.0,
    el carácter de la coma decimal está definido en la localización del script (categoría
    LC_NUMERIC). Consulte la función [setlocale()](#function.setlocale).

Los arrays siempre son convertidos al [string](#language.types.string)
"Array"; por lo tanto, [echo](#function.echo) y
[print](#function.print) no pueden por sí solos mostrar el contenido de un
[array](#language.types.array). Para mostrar un solo elemento, utilice una construcción como
echo $arr['foo']. Consulte a continuación consejos para visualizar todo el contenido.

Para convertir objetos a strings, el método mágico
[\_\_toString](#language.oop5.magic) debe ser utilizado.

Los recursos siempre son convertidos a strings con la
estructura "Resource id #1", donde 1
es el número de recurso asignado al recurso por PHP en
tiempo de ejecución. Aunque la estructura exacta de este string no debe ser considerada como
confiable y está sujeta a cambios, siempre será única para un recurso dado
durante la duración de ejecución de un script (es decir, una solicitud web o un proceso CLI)
y no será reutilizada. Para obtener el tipo de un recurso, utilice
la función [get_resource_type()](#function.get-resource-type).

**[null](#constant.null)** siempre es convertido a un string vacío.

Como se indicó anteriormente, convertir directamente un [array](#language.types.array),
un objeto o un recurso a [string](#language.types.string) no proporciona
información útil sobre el valor más allá de su tipo. Consulte las funciones
[print_r()](#function.print-r) y [var_dump()](#function.var-dump) para
medios más eficaces de inspeccionar el contenido de estos tipos.

La mayoría de los valores PHP también pueden ser convertidos a strings para un almacenamiento permanente.
Este método se denomina serialización y es realizado por la función
[serialize()](#function.serialize).

### Detalles del tipo string

El [string](#language.types.string) en PHP está implementado como un array de octetos y un
entero indicando la longitud del búfer. No tiene ninguna información sobre cómo
estos octetos se traducen en caracteres, dejando esta tarea al programador.
No hay limitaciones sobre los valores de los que el string puede estar compuesto; en
particular, los octetos de valor 0 («octetos NUL») son permitidos
en cualquier parte del string (aunque algunas funciones, dichas en este manual de no
ser «seguras para binarios», pueden pasar los strings a bibliotecas
que ignoran los datos después de un octeto NUL.)

Esta naturaleza del tipo string explica por qué no hay un tipo «octeto» distinto
en PHP - los strings toman este rol. Las funciones que no devuelven datos
textuales - por ejemplo, datos arbitrarios leídos desde un socket de red -
devolverán strings de todos modos.

Dado que PHP no dicta una codificación específica para los strings, uno podría
preguntarse cómo los literales de string están codificados. Por ejemplo, el string
"á" ¿es equivalente a "\xE1" (ISO-8859-1),
"\xC3\xA1" (UTF-8, forma C),
"\x61\xCC\x81" (UTF-8, forma D) o cualquier otra representación
posible? La respuesta es que el string será codificado de la manera en que está
codificado en el archivo de script. Por lo tanto, si el script está escrito en ISO-8859-1, el
string será codificado en ISO-8859-1 y viceversa. Sin embargo, esto no se aplica
si Zend Multibyte está activado; en este caso, el script puede estar escrito en una
codificación arbitraria (que es explícitamente declarada o detectada) y luego convertido
a una cierta codificación interna, que luego será la codificación utilizada para los
literales de string.
Tenga en cuenta que hay ciertas restricciones sobre la codificación del script (o sobre la codificación
interna, si Zend Multibyte está activado) - esto significa casi siempre que esta
codificación debe ser un superconjunto compatible con ASCII, como UTF-8 o ISO-8859-1.
Tenga en cuenta, sin embargo, que las codificaciones dependientes del estado donde las mismas
valores de octeto pueden ser utilizados en estados de desplazamiento iniciales y no iniciales
pueden causar problemas.

Por supuesto, para ser útiles, las funciones que operan sobre texto pueden necesitar
hacer ciertas suposiciones sobre cómo el string está codificado. Desafortunadamente,
hay muchas variaciones en este sentido en las funciones de PHP:

- Algunas funciones asumen que el string está codificado en un (todo) conjunto de codificación de un octeto, pero no necesitan interpretar estos octetos como caracteres específicos. Este es el caso, por ejemplo, de [substr()](#function.substr),
  [strpos()](#function.strpos), [strlen()](#function.strlen) o
  [strcmp()](#function.strcmp). Otra forma de pensar en estas funciones es que operan sobre búferes de memoria, es decir, que trabajan con octetos y desplazamientos de octetos.

- Otras funciones reciben la codificación del string, asumiendo posiblemente un valor predeterminado si no se proporciona información de este tipo. Este es el caso de
  [htmlentities()](#function.htmlentities) y la mayoría de las funciones en
  la [extensión mbstring](#book.mbstring).

- Otras utilizan la localización actual (ver [setlocale()](#function.setlocale)),
  pero funcionan octeto por octeto.

- Finalmente, pueden simplemente asumir que el string utiliza una codificación
  específica, generalmente UTF-8. Este es el caso de la mayoría de las funciones en
  la [extensión intl](#book.intl) y en
  la [extensión PCRE](#book.pcre)
  (en este último caso, solo cuando se utiliza el modificador u).

En última instancia, esto significa que escribir programas correctos que utilicen
Unicode depende de evitar cuidadosamente las funciones que no funcionarán y
que probablemente corromperán los datos, y de utilizar en su lugar las
funciones que se comportan correctamente, generalmente provenientes de las extensiones
[intl](#book.intl) y [mbstring](#book.mbstring).
Sin embargo, utilizar funciones capaces de manejar codificaciones Unicode es solo el comienzo. Independientemente de las funciones que el lenguaje proporciona, es esencial conocer la especificación Unicode. Por ejemplo, un programa que asume que solo hay mayúsculas y minúsculas hace una suposición errónea.

## Strings numéricos

Un [string](#language.types.string) PHP se considera numérico si puede ser interpretado como
un [int](#language.types.integer) o un [float](#language.types.float).

Formalmente a partir de PHP 8.0.0:

WHITESPACES \s*
LNUM [0-9]+
DNUM ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]\*)
EXPONENT_DNUM (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
INT_NUM_STRING {WHITESPACES} [+-]? {LNUM} {WHITESPACES}
FLOAT_NUM_STRING {WHITESPACES} [+-]? ({DNUM} | {EXPONENT_DNUM}) {WHITESPACES}
NUM_STRING ({INT_NUM_STRING} | {FLOAT_NUM_STRING})

PHP también dispone de un concepto de strings _iniciando_ numéricamente.
Se trata simplemente de un string que comienza como un string numérico seguido de
cualquier carácter.

**Nota**:

Cualquier string que contenga la letra E (insensible a mayúsculas y minúsculas)
delimitada por números será considerada como un número expresado en notación científica.
Esto puede producir resultados inesperados.

**Ejemplo #1 Scientific Notation Comparisons**

&lt;?php
var_dump("0D1" == "000"); // false, "0D1" no es notación científica
var_dump("0E1" == "000"); // true, "0E1" es 0 _ (10 ^ 1), o 0
var_dump("2E1" == "020"); // true, "2E1" es 2 _ (10 ^ 1), o 20
?&gt;

### Strings utilizados en contextos numéricos

Cuando una [string](#language.types.string) debe ser evaluada como un número (por ejemplo, operaciones
aritméticas, declaración de tipo [int](#language.types.integer), etc.),
se siguen los siguientes pasos para determinar el resultado:

    -

      Si el [string](#language.types.string) es numérico, se resuelve en [int](#language.types.integer) si
      el [string](#language.types.string) es un string numérico entero y entra dentro de los
      límites del tipo [int](#language.types.integer) (tales como definidas por
      **[PHP_INT_MAX](#constant.php-int-max)**), de lo contrario se resuelve en un
      [float](#language.types.float).



    -

      Si el contexto permite los strings iniciando numéricamente y el [string](#language.types.string)
      es uno de ellos, se resuelve en [int](#language.types.integer) si la parte inicial del
      [string](#language.types.string) es un string numérico entero y entra dentro de los
      límites del tipo [int](#language.types.integer) (tales como definidas por
      **[PHP_INT_MAX](#constant.php-int-max)**), de lo contrario se resuelve en un
      [float](#language.types.float).
      Además, se genera un error de nivel **[E_WARNING](#constant.e-warning)**.



    -

      Si la [string](#language.types.string) no es numérica, se lanza una [TypeError](#class.typeerror).


### Comportamiento anterior a PHP 8.0.0

Antes de PHP 8.0.0, un [string](#language.types.string) se consideraba numérico solo si tenía espacios en blanco al
_inicio_ del string, si tenía espacios en blanco al
_final_ del string, el string se consideraba como un string iniciando numéricamente.

Antes de PHP 8.0.0, cuando un string se utilizaba en un contexto numérico,
seguía los mismos pasos que los anteriores, con las siguientes diferencias:

    -

      El uso de un string iniciando numéricamente generaba un error de tipo
      **[E_NOTICE](#constant.e-notice)** en lugar de **[E_WARNING](#constant.e-warning)**.



    -

      Si el string no era numérico, se generaba un **[E_WARNING](#constant.e-warning)**
      y se devolvía el valor 0.


Anterior a PHP 7.1.0, ni **[E_NOTICE](#constant.e-notice)**
ni **[E_WARNING](#constant.e-warning)** se generaban.

&lt;?php
$foo = 1 + "10.5";                // $foo es float (11.5)
$foo = 1 + "-1.3e3"; // $foo es float (-1299)
$foo = 1 + "bob-1.3e3"; // TypeError a partir de PHP 8.0.0, $foo era integer (1) anteriormente
$foo = 1 + "bob3"; // TypeError a partir de PHP 8.0.0, $foo era integer (1) anteriormente
$foo = 1 + "10 Small Pigs"; // $foo es integer (11) y se genera un E_WARNING en PHP 8.0.0, E_NOTICE anteriormente
$foo = 4 + "10.2 Little Piggies"; // $foo es float (14.2) y se genera un E_WARNING en PHP 8.0.0, E_NOTICE anteriormente
$foo = "10.0 pigs " + 1; // $foo es float (11) y se genera un E_WARNING en PHP 8.0.0, E_NOTICE anteriormente
$foo = "10.0 pigs " + 1.0; // $foo es float (11) y se genera un E_WARNING en PHP 8.0.0, E_NOTICE anteriormente
?&gt;

## Arrays

Un [array](#language.types.array) en PHP es en realidad un mapa ordenado. Un mapa es un tipo que
asocia _valores_ a _claves_. Este tipo
está optimizado para varios usos diferentes; puede ser tratado como un array,
lista (vector), tabla hash (una implementación de un mapa), diccionario,
colección, pila, cola, y probablemente más. Como los valores [array](#language.types.array) pueden
ser otros [array](#language.types.array)s, también son posibles árboles y [array](#language.types.array)s
multidimensionales.

La explicación de esas estructuras de datos está fuera del alcance de este manual, pero
al menos se proporciona un ejemplo para cada una de ellas. Para más información, consulte
la considerable literatura que existe sobre este amplio tema.

### Sintaxis

#### Especificación con [array()](#function.array)

    Un [array](#language.types.array) puede ser creado usando la construcción del lenguaje [array()](#function.array).
    Acepta cualquier número de pares clave =&gt; valor
    separados por comas como argumentos.

array(
clave =&gt; valor,
clave2 =&gt; valor2,
clave3 =&gt; valor3,
...
)

    La coma después del último elemento del array es opcional y puede ser omitida. Esto se suele hacer
    para arrays de una sola línea, es decir, array(1, 2) es preferido sobre
    array(1, 2, ). Para arrays de múltiples líneas, por otro lado, la coma final
    es comúnmente usada, ya que permite una adición más fácil de nuevos elementos al final.

**Nota**:

     Existe una sintaxis corta para arrays que reemplaza
     array() con [].






    **Ejemplo #1 Un array simple**

&lt;?php
$array1 = array(
"foo" =&gt; "bar",
"bar" =&gt; "foo",
);

// Usando la sintaxis corta de array
$array2 = [
"foo" =&gt; "bar",
"bar" =&gt; "foo",
];

var_dump($array1, $array2);
?&gt;

    La clave puede ser un [int](#language.types.integer)
    o un [string](#language.types.string). El valor puede ser
    de cualquier tipo.





    Además, se producirán las siguientes conversiones de clave:



     -

       [String](#language.types.string)s que contienen [int](#language.types.integer)s decimales válidos, a menos que el número esté precedido por un signo +, serán convertidos al
       tipo [int](#language.types.integer). Por ejemplo, la clave "8" se almacenará realmente bajo 8. Por otro lado, "08" no
       será convertido, ya que no es un entero decimal válido.



     -

       Los [float](#language.types.float)s también se convierten a [int](#language.types.integer)s, lo que significa que la
       parte fraccionaria será truncada. Por ejemplo, la clave 8.7 se almacenará realmente bajo
       8.



     -

       Los [bool](#language.types.boolean)s se convierten a [int](#language.types.integer)s también, es decir, la clave
       **[true](#constant.true)** se almacenará realmente bajo 1
       y la clave **[false](#constant.false)** bajo 0.



     -

       [Null](#language.types.null) se convertirá en una cadena vacía, es decir, la clave
       null se almacenará realmente bajo "".



     -

       Los [array](#language.types.array)s y [object](#language.types.object)s *no pueden* ser usados como claves.
       Hacerlo resultará en una advertencia: Illegal offset type.







    Si múltiples elementos en la declaración del array usan la misma clave, solo el último
    será usado, ya que todos los demás son sobrescritos.





    **Ejemplo #2 Ejemplo de conversión de tipos y sobrescritura**

&lt;?php
$array = array(
    1    =&gt; "a",
    "1"  =&gt; "b",
    1.5  =&gt; "c",
    true =&gt; "d",
);
var_dump($array);
?&gt;

    El ejemplo anterior mostrará:

array(1) {
[1]=&gt;
string(1) "d"
}

     Como todas las claves en el ejemplo anterior se convierten a 1, el valor será sobrescrito
     en cada nuevo elemento y el último valor asignado "d" es el único que queda.






    Los arrays de PHP pueden contener claves [int](#language.types.integer) y [string](#language.types.string) al mismo tiempo
    ya que PHP no distingue entre arrays indexados y asociativos.





    **Ejemplo #3 Claves [int](#language.types.integer) y [string](#language.types.string) mezcladas**

&lt;?php
$array = array(
    "foo" =&gt; "bar",
    "bar" =&gt; "foo",
    100   =&gt; -100,
    -100  =&gt; 100,
);
var_dump($array);
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["foo"]=&gt;
string(3) "bar"
["bar"]=&gt;
string(3) "foo"
[100]=&gt;
int(-100)
[-100]=&gt;
int(100)
}

    La clave es opcional. Si no se especifica, PHP usará
    el incremento de la clave [int](#language.types.integer) más grande usada previamente.





    **Ejemplo #4 Arrays indexados sin clave**

&lt;?php
$array = array("foo", "bar", "hello", "world");
var_dump($array);
?&gt;

    El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(3) "foo"
[1]=&gt;
string(3) "bar"
[2]=&gt;
string(5) "hello"
[3]=&gt;
string(5) "world"
}

    Es posible especificar la clave solo para algunos elementos y omitirla para otros:





    **Ejemplo #5 Claves no en todos los elementos**

&lt;?php
$array = array(
         "a",
         "b",
    6 =&gt; "c",
         "d",
);
var_dump($array);
?&gt;

    El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[6]=&gt;
string(1) "c"
[7]=&gt;
string(1) "d"
}

     Como puede ver, el último valor "d" fue asignado a la clave
     7. Esto es porque la clave entera más grande antes de eso
     era 6.






    **Ejemplo #6 Ejemplo complejo de conversión de tipos y sobrescritura**



     Este ejemplo incluye todas las variaciones de conversión de tipos de claves y sobrescritura
     de elementos.

&lt;?php
$array = array(
1 =&gt; 'a',
'1' =&gt; 'b', // el valor "a" será sobrescrito por "b"
1.5 =&gt; 'c', // el valor "b" será sobrescrito por "c"
-1 =&gt; 'd',
'01' =&gt; 'e', // como esto no es una cadena entera no sobrescribirá la clave para 1
'1.5' =&gt; 'f', // como esto no es una cadena entera no sobrescribirá la clave para 1
true =&gt; 'g', // el valor "c" será sobrescrito por "g"
false =&gt; 'h',
'' =&gt; 'i',
null =&gt; 'j', // el valor "i" será sobrescrito por "j"
'k', // el valor "k" se asigna a la clave 2. Esto es porque la clave entera más grande antes de eso era 1
2 =&gt; 'l', // el valor "k" será sobrescrito por "l"
);

var_dump($array);
?&gt;

    El ejemplo anterior mostrará:

array(7) {
[1]=&gt;
string(1) "g"
[-1]=&gt;
string(1) "d"
["01"]=&gt;
string(1) "e"
["1.5"]=&gt;
string(1) "f"
[0]=&gt;
string(1) "h"
[""]=&gt;
string(1) "j"
[2]=&gt;
string(1) "l"
}

    **Ejemplo #7 Ejemplo de índice negativo**



     Al asignar una clave entera negativa n, PHP se asegurará de
     asignar la siguiente clave a n+1.




     &lt;?php

$array = [];

$array[-5] = 1;
$array[] = 2;

var_dump($array);
?&gt;

    El ejemplo anterior mostrará:





array(2) {
[-5]=&gt;
int(1)
[-4]=&gt;
int(2)
}

    **Advertencia**

      Antes de PHP 8.3.0, asignar una clave entera negativa n asignaría
      la siguiente clave a 0, el ejemplo anterior produciría por lo tanto:






array(2) {
[-5]=&gt;
int(1)
[0]=&gt;
int(2)
}

#### Acceso a elementos de array con sintaxis de corchetes

    Los elementos de array pueden ser accedidos usando la sintaxis array[clave].





    **Ejemplo #8 Acceso a elementos de array**

&lt;?php
$array = array(
"foo" =&gt; "bar",
42 =&gt; 24,
"multi" =&gt; array(
"dimensional" =&gt; array(
"array" =&gt; "foo"
)
)
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
?&gt;

    El ejemplo anterior mostrará:

string(3) "bar"
int(24)
string(3) "foo"

**Nota**:

     Antes de PHP 8.0.0, los corchetes y las llaves podían usarse indistintamente
     para acceder a elementos de array (por ejemplo, $array[42] y $array{42}
     harían lo mismo en el ejemplo anterior).
     La sintaxis de llaves fue deprecada a partir de PHP 7.4.0 y ya no es soportada a partir de PHP 8.0.0.






    **Ejemplo #9 Desreferenciación de array**

&lt;?php
function getArray() {
return array(1, 2, 3);
}

$secondElement = getArray()[1];

var_dump($secondElement);
?&gt;

**Nota**:

      Intentar acceder a una clave de array que no ha sido definida es
      lo mismo que acceder a cualquier otra variable no definida:
      se emitirá un mensaje de error de nivel **[E_WARNING](#constant.e-warning)**
      (nivel **[E_NOTICE](#constant.e-notice)** antes de PHP 8.0.0) y el
      resultado será **[null](#constant.null)**.

**Nota**:

     Desreferenciar un valor escalar que no es un [string](#language.types.string)
     produce **[null](#constant.null)**. Antes de PHP 7.4.0, esto no emitía un mensaje de error.
     A partir de PHP 7.4.0, esto emite **[E_NOTICE](#constant.e-notice)**;
     a partir de PHP 8.0.0, esto emite **[E_WARNING](#constant.e-warning)**.

#### Creación/modificación con sintaxis de corchetes

    Un [array](#language.types.array) existente puede ser modificado asignando valores
    explícitamente en él.





    Esto se hace asignando valores al [array](#language.types.array), especificando la
    clave entre corchetes. La clave también puede ser omitida, resultando en un par de
    corchetes vacíos ([]).

$arr[clave] = valor;
$arr[] = valor;
// clave puede ser un [int](#language.types.integer) o [string](#language.types.string)
// valor puede ser cualquier valor de cualquier tipo

    Si $arr no existe aún o está establecido a **[null](#constant.null)** o **[false](#constant.false)**, será creado, por lo que esto es
    también una forma alternativa de crear un [array](#language.types.array). Sin embargo, esta práctica
    está desaconsejada porque si $arr ya contiene
    algún valor (por ejemplo, [string](#language.types.string) de una variable de petición) entonces este
    valor permanecerá en su lugar y [] podría en realidad representar
    el [operador de acceso a string](#language.types.string.substr). Siempre es mejor inicializar una variable mediante una
    asignación directa.

**Nota**:

     A partir de PHP 7.1.0, aplicar el operador de índice vacío en un string lanza un error fatal.
     Anteriormente, el string se convertía silenciosamente a un array.

**Nota**:

     A partir de PHP 8.1.0, crear un nuevo array a partir de un valor **[false](#constant.false)** está deprecado.
     Crear un nuevo array a partir de **[null](#constant.null)** y valores no definidos sigue estando permitido.






    Para cambiar un cierto
    valor, asigne un nuevo valor a ese elemento usando su clave. Para eliminar un
    par clave/valor, llame a la función [unset()](#function.unset) sobre él.





    **Ejemplo #10 Uso de corchetes con arrays**

&lt;?php
$arr = array(5 =&gt; 1, 12 =&gt; 2);

$arr[] = 56; // Esto es lo mismo que $arr[13] = 56;
// en este punto del script

$arr["x"] = 42; // Esto añade un nuevo elemento al
// array con clave "x"

unset($arr[5]); // Esto elimina el elemento del array

var_dump($arr);

unset($arr); // Esto elimina todo el array

var_dump($arr);
?&gt;

**Nota**:

     Como se mencionó anteriormente, si no se especifica ninguna clave, se toma el máximo de los
     índices [int](#language.types.integer) existentes, y la nueva clave será ese valor máximo
     más 1 (pero al menos 0). Si no existen índices [int](#language.types.integer) aún, la clave será
     0 (cero).





     Tenga en cuenta que el índice entero máximo usado para esto *no
     necesita existir actualmente en el [array](#language.types.array)*. Solo necesita haber
     existido en el [array](#language.types.array) en algún momento desde la última vez que el
     [array](#language.types.array) fue reindexado. El siguiente ejemplo lo ilustra:







&lt;?php
// Crear un array simple.
$array = array(1, 2, 3, 4, 5);
print_r($array);

// Ahora eliminar cada elemento, pero dejar el array en sí intacto:
foreach ($array as $i =&gt; $value) {
    unset($array[$i]);
}
print_r($array);

// Añadir un elemento (note que la nueva clave es 5, en lugar de 0).
$array[] = 6;
print_r($array);

// Reindexar:
$array = array_values($array);
$array[] = 7;
print_r($array);
?&gt;

     El ejemplo anterior mostrará:




Array
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)
Array
(
)
Array
(
[5] =&gt; 6
)
Array
(
[0] =&gt; 6
[1] =&gt; 7
)

#### Desestructuración de arrays

    Los arrays pueden ser desestructurados usando la construcción de lenguaje [] (a partir de PHP 7.1.0) o
    [list()](#function.list). Estas
    construcciones pueden ser usadas para desestructurar un array en variables distintas.





    **Ejemplo #11 Desestructuración de array**

&lt;?php
$source_array = ['foo', 'bar', 'baz'];

[$foo, $bar, $baz] = $source_array;

echo $foo, PHP_EOL; // imprime "foo"
echo $bar, PHP_EOL; // imprime "bar"
echo $baz, PHP_EOL; // imprime "baz"
?&gt;

    La desestructuración de arrays puede ser usada en [foreach](#control-structures.foreach) para desestructurar
    un array multidimensional mientras se itera sobre él.





    **Ejemplo #12 Desestructuración de array en foreach**

&lt;?php
$source_array = [
[1, 'John'],
[2, 'Jane'],
];

foreach ($source_array as [$id, $name]) {
    echo "{$id}: '{$name}'\n";
}
?&gt;

    Los elementos del array serán ignorados si la variable no está proporcionada. La
    desestructuración de array siempre comienza en el índice 0.





    **Ejemplo #13 Ignorar elementos**

&lt;?php
$source_array = ['foo', 'bar', 'baz'];

// Asignar el elemento en el índice 2 a la variable $baz
[, , $baz] = $source_array;

echo $baz; // imprime "baz"
?&gt;

    A partir de PHP 7.1.0, los arrays asociativos también pueden ser desestructurados. Esto también
    permite una selección más fácil del elemento correcto en arrays indexados numéricamente, ya que el índice puede ser especificado explícitamente.





    **Ejemplo #14 Desestructuración de arrays asociativos**

&lt;?php
$source_array = ['foo' =&gt; 1, 'bar' =&gt; 2, 'baz' =&gt; 3];

// Asignar el elemento en el índice 'baz' a la variable $three
['baz' =&gt; $three] = $source_array;

echo $three, PHP_EOL; // imprime 3

$source_array = ['foo', 'bar', 'baz'];

// Asignar el elemento en el índice 2 a la variable $baz
[2 =&gt; $baz] = $source_array;

echo $baz, PHP_EOL; // imprime "baz"
?&gt;

    La desestructuración de arrays puede ser usada para intercambiar fácilmente dos variables.





    **Ejemplo #15 Intercambio de dos variables**

&lt;?php
$a = 1;
$b = 2;

[$b, $a] = [$a, $b];

echo $a, PHP_EOL; // imprime 2
echo $b, PHP_EOL; // imprime 1
?&gt;

**Nota**:

      El operador de propagación (...) no está soportado en asignaciones.

**Nota**:

      Intentar acceder a una clave de array que no ha sido definida es
      lo mismo que acceder a cualquier otra variable no definida:
      se emitirá un mensaje de error de nivel **[E_WARNING](#constant.e-warning)**
      (nivel **[E_NOTICE](#constant.e-notice)** antes de PHP 8.0.0) y el
      resultado será **[null](#constant.null)**.

**Nota**:

      Desestructurar un valor escalar asigna **[null](#constant.null)** a todas las variables.

### Funciones útiles

Hay bastantes funciones útiles para trabajar con arrays. Vea la
sección de [funciones de array](#ref.array).

**Nota**:

    La función [unset()](#function.unset) permite eliminar claves de un
    [array](#language.types.array). Tenga en cuenta que el array *no* será
    reindexado. Si se desea un comportamiento de "eliminar y desplazar", el
    [array](#language.types.array) puede ser reindexado usando la
    función [array_values()](#function.array-values).





    **Ejemplo #16 Eliminación de elementos intermedios**

&lt;?php
$a = array(1 =&gt; 'one', 2 =&gt; 'two', 3 =&gt; 'three');

/_ producirá un array que habría sido definido como
$a = array(1 =&gt; 'one', 3 =&gt; 'three');
y NO
$a = array(1 =&gt; 'one', 2 =&gt;'three');
_/
unset($a[2]);
var_dump($a);

$b = array_values($a);
// Ahora $b es array(0 =&gt; 'one', 1 =&gt;'three')
var_dump($b);
?&gt;

La estructura de control [foreach](#control-structures.foreach)
existe específicamente para [array](#language.types.array)s. Proporciona una forma fácil
de recorrer un [array](#language.types.array).

### Lo que se debe y no se debe hacer con arrays

#### ¿Por qué $foo[bar] está mal?

    Siempre use comillas alrededor de un índice de array literal de cadena. Por ejemplo,
    $foo['bar'] es correcto, mientras que
    $foo[bar] no lo es. Pero ¿por qué? Es común encontrar este
    tipo de sintaxis en scripts antiguos:

&lt;?php
$foo[bar] = 'enemy';
echo $foo[bar];
// etc
?&gt;

    Esto está mal, pero funciona. La razón es que este código tiene una constante no definida (bar)
    en lugar de un [string](#language.types.string) ('bar' - note las
    comillas). Funciona porque PHP convierte automáticamente una
    *cadena desnuda* (una [string](#language.types.string) sin comillas que no
    corresponde a ningún símbolo conocido) en un [string](#language.types.string) que
    contiene la [string](#language.types.string) desnuda. Por ejemplo, si no hay una constante
    definida llamada **[bar](#constant.bar)**, entonces PHP sustituirá la
    [string](#language.types.string) 'bar' y la usará.

**Advertencia**

     La retrocompatibilidad para tratar una constante no definida como cadena desnuda emite un error
     de nivel **[E_NOTICE](#constant.e-notice)**.
     Esto ha sido deprecado a partir de PHP 7.2.0, y emite un error
     de nivel **[E_WARNING](#constant.e-warning)**.
     A partir de PHP 8.0.0, ha sido eliminado y lanza una
     excepción [Error](#class.error).






    Esto no significa que *siempre* deba poner comillas a la clave. No
    ponga comillas a claves que son [constantes](#language.constants) o
    [variables](#language.variables), ya que esto evitará
    que PHP las interprete.





    **Ejemplo #17 Comillas en claves**

&lt;?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

// Array simple:
$array = array(1, 2);
$count = count($array);

for ($i = 0; $i &lt; $count; $i++) {
    echo "\nComprobando $i: \n";
    echo "Incorrecto: " . $array['$i'] . "\n";
echo "Correcto: " . $array[$i] . "\n";
echo "Incorrecto: {$array['$i']}\n";
echo "Correcto: {$array[$i]}\n";
}
?&gt;

    El ejemplo anterior mostrará:

Comprobando 0:
Notice: Undefined index: $i in /path/to/script.html on line 9
Incorrecto:
Correcto: 1
Notice: Undefined index: $i in /path/to/script.html on line 11
Incorrecto:
Correcto: 1

Comprobando 1:
Notice: Undefined index: $i in /path/to/script.html on line 9
Incorrecto:
Correcto: 2
Notice: Undefined index: $i in /path/to/script.html on line 11
Incorrecto:
Correcto: 2

    Más ejemplos para demostrar este comportamiento:





    **Ejemplo #18 Más ejemplos**

&lt;?php
// Mostrar todos los errores
error_reporting(E_ALL);

$arr = array('fruit' =&gt; 'apple', 'veggie' =&gt; 'carrot');

// Correcto
echo $arr['fruit'], PHP_EOL; // apple
echo $arr['veggie'], PHP_EOL; // carrot

// Incorrecto. Esto no funciona y lanza un error de PHP debido a
// una constante no definida llamada fruit
//
// Error: Undefined constant "fruit"
try {
echo $arr[fruit];
} catch (Error $e) {
    echo get_class($e), ': ', $e-&gt;getMessage(), PHP_EOL;
}

// Esto define una constante para demostrar lo que está pasando. El valor 'veggie'
// es asignado a una constante llamada fruit.
define('fruit', 'veggie');

// Note la diferencia ahora
echo $arr['fruit'], PHP_EOL; // apple
echo $arr[fruit], PHP_EOL; // carrot

// Lo siguiente está bien, ya que está dentro de una cadena. Las constantes no se buscan
// dentro de cadenas, por lo que no ocurre ningún error aquí
echo "Hello $arr[fruit]", PHP_EOL; // Hello apple

// Con una excepción: las llaves que rodean arrays dentro de cadenas permiten que las constantes
// sean interpretadas
echo "Hello {$arr[fruit]}", PHP_EOL;    // Hello carrot
echo "Hello {$arr['fruit']}", PHP_EOL; // Hello apple

// La concatenación es otra opción
echo "Hello " . $arr['fruit'], PHP_EOL; // Hello apple
?&gt;

&lt;?php
// Esto no funcionará, y resultará en un error de análisis, como:
// Parse error: parse error, expecting T_STRING' or T_VARIABLE' or T_NUM_STRING'
// Esto, por supuesto, también se aplica al usar superglobals en cadenas
print "Hello $arr['fruit']";
print "Hello $\_GET['foo']";
?&gt;

    Como se indica en la sección de [sintaxis](#language.types.array.syntax),
    lo que está dentro de los corchetes ('[' y
    ']') debe ser una expresión. Esto significa que el código como
    este funciona:

&lt;?php
echo $arr[somefunc($bar)];
?&gt;

    Este es un ejemplo de uso del valor de retorno de una función como índice del array. PHP
    también conoce las constantes:

&lt;?php
$error_descriptions[E_ERROR]   = "Ha ocurrido un error fatal";
$error_descriptions[E_WARNING] = "PHP emitió una advertencia";
$error_descriptions[E_NOTICE] = "Esto es solo un aviso informal";
?&gt;

    Tenga en cuenta que **[E_ERROR](#constant.e-error)** también es un identificador válido, al igual que
    bar en el primer ejemplo. Pero el último ejemplo es en realidad
    lo mismo que escribir:

&lt;?php
$error_descriptions[1] = "Ha ocurrido un error fatal";
$error_descriptions[2] = "PHP emitió una advertencia";
$error_descriptions[8] = "Esto es solo un aviso informal";
?&gt;

    porque **[E_ERROR](#constant.e-error)** es igual a 1, etc.





    ##### Entonces, ¿por qué está mal?



     En algún momento en el futuro, el equipo de PHP podría querer añadir otra
     constante o palabra clave, o una constante en otro código podría interferir. Por
     ejemplo, ya está mal usar las palabras empty y
     default de esta manera, ya que son
     [palabras clave reservadas](#reserved).




    **Nota**:

      Para reiterar, dentro de una [string](#language.types.string) entre comillas dobles, es válido no
      rodear los índices de array con comillas, por lo que "$foo[bar]"
      es válido. Consulte los ejemplos anteriores para más detalles, así como la sección
      sobre [análisis de variables en
      cadenas](#language.types.string.parsing).


### Conversión a array

Para cualquiera de los tipos [int](#language.types.integer), [float](#language.types.float),
[string](#language.types.string), [bool](#language.types.boolean) y [resource](#language.types.resource),
convertir un valor a un [array](#language.types.array) resulta en un array con un solo
elemento con índice cero y el valor del escalar que fue convertido. En
otras palabras, (array) $scalarValue es exactamente lo mismo que
   array($scalarValue).

Si un [object](#language.types.object) es convertido a un [array](#language.types.array), el resultado
es un [array](#language.types.array) cuyos elementos son las
propiedades del [object](#language.types.object).
Las claves son los nombres de las variables miembro, con algunas excepciones notables: las propiedades enteras son inaccesibles;
las variables privadas tienen el nombre de la clase antepuesto al nombre de la
variable; las variables protegidas tienen un '\*' antepuesto al nombre de la variable. Estos
valores antepuestos tienen bytes NUL a ambos lados.
Las [propiedades tipadas](#language.oop5.properties.typed-properties)
no inicializadas se descartan silenciosamente.

**Ejemplo #19 Conversión a un array**

    &lt;?php

class A {
private $B;
protected $C;
public $D;
function \_\_construct()
{
$this-&gt;{1} = null;
}
}

var_export((array) new A());
?&gt;

El ejemplo anterior mostrará:

array (
'' . "\0" . 'A' . "\0" . 'B' =&gt; NULL,
'' . "\0" . '\*' . "\0" . 'C' =&gt; NULL,
'D' =&gt; NULL,
1 =&gt; NULL,
)

Estos NUL pueden resultar en algún comportamiento inesperado:

**Ejemplo #20 Conversión de un objeto a un array**

&lt;?php

class A {
private $A; // Esto se convertirá en '\0A\0A'
}

class B extends A {
private $A; // Esto se convertirá en '\0B\0A'
public $AA; // Esto se convertirá en 'AA'
}

var_dump((array) new B());
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["BA"]=&gt;
NULL
["AA"]=&gt;
NULL
["AA"]=&gt;
NULL
}

Lo anterior parecerá tener dos claves llamadas 'AA', aunque una de ellas
en realidad se llama '\0A\0A'.

Convertir **[null](#constant.null)** a un [array](#language.types.array) resulta en un
[array](#language.types.array) vacío.

### Comparación

Es posible comparar arrays con la función [array_diff()](#function.array-diff)
y con
[operadores de array](#language.operators.array).

### Desempaquetado de arrays

Un array precedido por ... será expandido en su lugar durante la definición del array.
Solo arrays y objetos que implementan [Traversable](#class.traversable) pueden ser expandidos.
El desempaquetado de arrays con ... está disponible a partir de PHP 7.4.0. Esto también se llama
el operador de propagación.

Es posible expandir múltiples veces, y añadir elementos normales antes o después del operador ...:

    **Ejemplo #21 Desempaquetado de array simple**

&lt;?php
// Usando sintaxis corta de array.
// También funciona con la sintaxis array().
$arr1 = [1, 2, 3];
$arr2 = [...$arr1]; // [1, 2, 3]
$arr3 = [0, ...$arr1]; // [0, 1, 2, 3]
$arr4 = [...$arr1, ...$arr2, 111]; // [1, 2, 3, 1, 2, 3, 111]
$arr5 = [...$arr1, ...$arr1]; // [1, 2, 3, 1, 2, 3]

function getArr() {
return ['a', 'b'];
}
$arr6 = [...getArr(), 'c' =&gt; 'd']; // ['a', 'b', 'c' =&gt; 'd']

var_dump($arr1, $arr2, $arr3, $arr4, $arr5, $arr6);
?&gt;

Desempaquetar un array con el operador ... sigue la semántica de la función [array_merge()](#function.array-merge).
Es decir, las claves de cadena posteriores sobrescriben las anteriores y las claves enteras se renumeran:

    **Ejemplo #22 Desempaquetado de array con clave duplicada**

&lt;?php
// clave de cadena
$arr1 = ["a" =&gt; 1];
$arr2 = ["a" =&gt; 2];
$arr3 = ["a" =&gt; 0, ...$arr1, ...$arr2];
var_dump($arr3); // ["a" =&gt; 2]

// clave entera
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6); // [1, 2, 3, 4, 5, 6]
// Que es [0 =&gt; 1, 1 =&gt; 2, 2 =&gt; 3, 3 =&gt; 4, 4 =&gt; 5, 5 =&gt; 6]
// donde las claves enteras originales no se han conservado.
?&gt;

**Nota**:

    Las claves que no son ni enteros ni cadenas lanzan un [TypeError](#class.typeerror).
    Tales claves solo pueden ser generadas por un objeto [Traversable](#class.traversable).

**Nota**:

    Antes de PHP 8.1, el desempaquetado de un array que tiene una clave de cadena no está soportado:

&lt;?php

$arr1 = [1, 2, 3];
$arr2 = ['a' =&gt; 4];
$arr3 = [...$arr1, ...$arr2];
// Fatal error: Uncaught Error: Cannot unpack array with string keys in example.php:5

$arr4 = [1, 2, 3];
$arr5 = [4, 5];
$arr6 = [...$arr4, ...$arr5]; // funciona. [1, 2, 3, 4, 5]
?&gt;

### Ejemplos

El tipo array en PHP es muy versátil. Aquí hay algunos ejemplos:

**Ejemplo #23 Versatilidad de los arrays**

&lt;?php
// Esto:
$a = array( 'color' =&gt; 'red',
'taste' =&gt; 'sweet',
'shape' =&gt; 'round',
'name' =&gt; 'apple',
4 // la clave será 0
);

$b = array('a', 'b', 'c');

var_dump($a, $b);

// ...es completamente equivalente a esto:
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[] = 4; // la clave será 0

$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';

// Después de que el código anterior se ejecute, $a será el array
// array('color' =&gt; 'red', 'taste' =&gt; 'sweet', 'shape' =&gt; 'round',
// 'name' =&gt; 'apple', 0 =&gt; 4), y $b será el array
// array(0 =&gt; 'a', 1 =&gt; 'b', 2 =&gt; 'c'), o simplemente array('a', 'b', 'c').

var_dump($a, $b);
?&gt;

**Ejemplo #24 Uso de array()**

&lt;?php
// Array como (propiedad-)mapa
$map = array( 'version'    =&gt; 4,
              'OS'         =&gt; 'Linux',
              'lang'       =&gt; 'english',
              'short_tags' =&gt; true
            );
var_dump($map);

// claves estrictamente numéricas
// esto es lo mismo que array(0 =&gt; 7, 1 =&gt; 8, ...)
$array = array( 7,
                8,
                0,
                156,
                -10
              );
var_dump($array);

$switching = array(         10, // clave = 0
                    5    =&gt;  6,
                    3    =&gt;  7,
                    'a'  =&gt;  4,
                            11, // clave = 6 (el máximo de los índices enteros era 5)
                    '8'  =&gt;  2, // clave = 8 (¡entero!)
                    '02' =&gt; 77, // clave = '02'
                    0    =&gt; 12  // el valor 10 será sobrescrito por 12
                  );
var_dump($switching);

// array vacío
$empty = array();
var_dump($empty);
?&gt;

**Ejemplo #25 Colección**

&lt;?php
$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as $color) {
echo "¿Te gusta $color?\n";
}

?&gt;

El ejemplo anterior mostrará:

¿Te gusta red?
¿Te gusta blue?
¿Te gusta green?
¿Te gusta yellow?

Cambiar los valores del [array](#language.types.array) directamente es posible
pasándolos por referencia.

**Ejemplo #26 Cambiar elemento en el bucle**

&lt;?php
$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as &amp;$color) {
$color = mb_strtoupper($color);
}
unset($color); /* asegúrese de que las escrituras siguientes a
$color no modificarán el último elemento del array \*/

print_r($colors);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; RED
[1] =&gt; BLUE
[2] =&gt; GREEN
[3] =&gt; YELLOW
)

Este ejemplo crea un array basado en uno.

**Ejemplo #27 Índice basado en uno**

&lt;?php
$firstquarter = array(1 =&gt; 'January', 'February', 'March');
print_r($firstquarter);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[1] =&gt; January
[2] =&gt; February
[3] =&gt; March
)

**Ejemplo #28 Llenar un array**

&lt;?php
// llenar un array con todos los elementos de un directorio
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle);

var_dump($files);
?&gt;

Los [array](#language.types.array)s están ordenados. El orden puede ser cambiado usando varias
funciones de ordenación. Vea la sección de [funciones de array](#ref.array)
para más información. La función [count()](#function.count) puede ser
usada para contar el número de elementos en un [array](#language.types.array).

**Ejemplo #29 Ordenar un array**

&lt;?php
sort($files);
print_r($files);
?&gt;

Debido a que el valor de un [array](#language.types.array) puede ser cualquier cosa, también puede ser
otro [array](#language.types.array). Esto permite la creación de arrays recursivos y
multidimensionales.

**Ejemplo #30 Arrays recursivos y multidimensionales**

&lt;?php
$fruits = array ( "fruits"  =&gt; array ( "a" =&gt; "orange",
                                       "b" =&gt; "banana",
                                       "c" =&gt; "apple"
                                     ),
                  "numbers" =&gt; array ( 1,
                                       2,
                                       3,
                                       4,
                                       5,
                                       6
                                     ),
                  "holes"   =&gt; array (      "first",
                                       5 =&gt; "second",
                                            "third"
                                     )
                );
var_dump($fruits);

// Algunos ejemplos para direccionar valores en el array anterior
echo $fruits["holes"][5];    // imprime "second"
echo $fruits["fruits"]["a"]; // imprime "orange"
unset($fruits["holes"][0]); // elimina "first"

// Crear un nuevo array multidimensional
$juices["apple"]["green"] = "good";
var_dump($juices);
?&gt;

La asignación de [array](#language.types.array) siempre implica una copia de valores. Use el
[operador de referencia](#language.operators) para copiar un
[array](#language.types.array) por referencia.

**Ejemplo #31 Copiado de arrays**

&lt;?php
$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4; // $arr2 es cambiado,
// $arr1 sigue siendo array(2, 3)

$arr3 = &amp;$arr1;
$arr3[] = 4; // ahora $arr1 y $arr3 son iguales

var_dump($arr1, $arr2, $arr3);
?&gt;

## Los objetos

### Inicialización de los objetos

Para crear un nuevo objeto, utilice la palabra clave new
para instanciar una clase:

**Ejemplo #1 Construcción de objeto**

&lt;?php
class foo
{
function do_foo()
{
echo "Doing foo.";
}
}

$bar = new foo;
$bar-&gt;do_foo();
?&gt;

Para una discusión completa, ver el capítulo sobre
[las clases y los objetos](#language.oop5).

### Conversión en un objeto

Si un objeto es convertido en un objeto, no será modificado.
Si un valor de cualquier tipo es convertido en un objeto,
se creará una nueva instancia de la clase interna [stdClass](#class.stdclass).
Si el valor es **[null](#constant.null)**, la nueva instancia estará vacía.
Un [array](#language.types.array) se convierte en [object](#language.types.object) con las propiedades
nombradas en relación con las claves con sus valores correspondientes. Note que
en este caso, antes de PHP 7.2.0 las claves numéricas fueron inaccesibles a menos que fueran iteradas.

**Ejemplo #2 Conversión en un objeto**

&lt;?php
$obj = (object) array('1' =&gt; 'foo');
var_dump(isset($obj-&gt;{'1'})); // muestra 'bool(true)'

// Deprecado desde PHP 8.1
var_dump(key($obj)); // muestra 'string(1) "1"'
?&gt;

Para cualquier otro tipo, un miembro llamado scalar
contendrá el valor.

**Ejemplo #3 Conversión (object)**

&lt;?php
$obj = (object) 'ciao';
echo $obj-&gt;scalar; // Muestra: 'ciao'
?&gt;

## Las enumeraciones

(PHP 8 &gt;= 8.1.0)

### Las enumeraciones básicas

Las enumeraciones constituyen una capa restrictiva sobre las clases y las constantes de clase.
Permiten definir un conjunto cerrado de valores posibles para un tipo.

&lt;?php
enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

function do_stuff(Suit $s)
{
// ...
}

do_stuff(Suit::Spades);
?&gt;

Para una descripción completa, ver el capítulo
sobre [las enumeraciones](#language.enumerations).

### Conversión

Si una enum es convertida en [object](#language.types.object), no es
modificada. Si una enum es convertida en [array](#language.types.array),
un array con una sola clave name (para las Pure enums) o
un array con las claves name y value
(para las Backed enums) es creado. Todos los otros tipos de conversión resultarán en un error.

## Recursos

Un valor tipo [resource](#language.types.resource) es una variable especial, que contiene
una referencia a un recurso externo. Los recursos son creados y usados por
funciones especiales. Vea el [apéndice](#resource) para
un listado de todas estas funciones y los tipos [resource](#language.types.resource)
correspondientes.

Vea también la función [get_resource_type()](#function.get-resource-type).

### Conversión a recurso

Dado que las variables [resource](#language.types.resource) contienen gestores
especiales a archivos abiertos, conexiones con bases de datos, áreas de
pintura de imágenes y cosas por el estilo, la conversión a tipo
[resource](#language.types.resource) carece de sentido.

### Liberación de recursos

Gracias al sistema de conteo de referencias introducido con el Motor
Zend, un recurso que ya no es referenciado es detectado
automáticamente, y es liberado por el recolector de basura. Por esta
razón, rara vez se necesita liberar la memoria manualmente.

**Nota**:

    Los enlaces persistentes con bases de datos son una excepción a esta
    regla. Ellos *no* son destruidos por el recolector de
    basura. Vea también la sección sobre [conexiones persistentes](#features.persistent-connections)
    para más información.

## Callables

Un callable es una referencia a una función o método que se pasa a
otra función como argumento.
Se representa con la declaración de tipo [callable](#language.types.callable).

&lt;?php
function foo(callable $callback) {
$callback();
}
?&gt;

Algunas funciones aceptan funciones de retrollamada como parámetro, por ejemplo
[array_map()](#function.array-map), [usort()](#function.usort), o
[preg_replace_callback()](#function.preg-replace-callback).

### Creación de callables

Un callable es un tipo que representa algo que se puede invocar.
Los callables se pueden pasar como argumentos a funciones o métodos que
esperan un parámetro de retrollamada o se pueden invocar directamente.
El tipo [callable](#language.types.callable) no se puede usar como declaración de tipo para propiedades
de clase. En su lugar, use una declaración de tipo [Closure](#class.closure).

Los callables se pueden crear de varias maneras diferentes:

- Un objeto [Closure](#class.closure)

- Un [string](#language.types.string) conteniendo el nombre de una función o método

- Un [array](#language.types.array) conteniendo un nombre de clase o un [object](#language.types.object)
  en el índice 0 y el nombre del método en el índice 1

- Un [object](#language.types.object) implementando el método mágico
  [\_\_invoke()](#object.invoke)

Un objeto [Closure](#class.closure) puede ser creado usando la sintaxis de
[funciones anónimas](#functions.anonymous), sintaxis de
[funciones de flecha](#functions.arrow),
[sintaxis callable de primera
clase](#functions.first_class_callable_syntax), o el método [Closure::fromCallable()](#closure.fromcallable).

**Nota**:

    La [sintaxis callable de primera

clase](#functions.first_class_callable_syntax) solo está disponible a partir de PHP 8.1.0.

**Ejemplo #1
Ejemplo de callback usando una [Closure](#class.closure)
**

&lt;?php
// Usando sintaxis de función anónima
$double1 = function ($a) {
return $a \* 2;
};

// Usando sintaxis de callable de primera clase
function double_function($a) {
    return $a * 2;
}
$double2 = double_function(...);

// Usando sintaxis de función de flecha
$double3 = fn($a) =&gt; $a \* 2;

// Usando Closure::fromCallable
$double4 = Closure::fromCallable('double_function');

// Utilizar clousure como función de devolución de retrollamada
// para duplicar el tamaño de cada elemento en nuestro rango
$new_numbers = array_map($double1, range(1, 5));
print implode(' ', $new_numbers) . PHP_EOL;

$new_numbers = array_map($double2, range(1, 5));
print implode(' ', $new_numbers) . PHP_EOL;

$new_numbers = array_map($double3, range(1, 5));
print implode(' ', $new_numbers) . PHP_EOL;

$new_numbers = array_map($double4, range(1, 5));
print implode(' ', $new_numbers);

?&gt;

Resultado del ejemplo anterior en PHP 8.1:

2 4 6 8 10
2 4 6 8 10
2 4 6 8 10
2 4 6 8 10

Un callable también puede ser un string que contenga el nombre de una función o
método estático.
Cualquier función interna o definida por el usuario puede ser usada, excepto las construcciones del lenguaje
como: [array()](#function.array), [echo](#function.echo),
[empty()](#function.empty), [eval()](#function.eval),
[isset()](#function.isset),
[list()](#function.list), [print](#function.print), o
[unset()](#function.unset).

Un método de clase estático puede ser usado sin instanciar un
[object](#language.types.object) de esa clase, ya sea creando un array con
el nombre de la clase en el índice 0 y el nombre del método en el índice 1, o usando
la sintaxis especial con el operador de resolución de ámbito
::, como en 'ClassName::methodName'.

Un método de un [object](#language.types.object) instanciado puede ser un callable
cuando se pasa como un array con el [object](#language.types.object) en el índice 0
y el nombre del método en el índice 1.

La principal diferencia entre un objeto [Closure](#class.closure) y el
tipo [callable](#language.types.callable) es que un objeto [Closure](#class.closure) es
independiente del ámbito y siempre se puede invocar, mientras que un tipo
callable puede depender del ámbito y puede que no se pueda invocar directamente.
[Closure](#class.closure) es la forma preferida de crear callables.

**Nota**:

    Mientras que los objetos [Closure](#class.closure) están vinculados al ámbito
    donde se crean, los callables que hacen referencia a métodos de clase como strings
    o arrays se resuelven en el ámbito donde se llaman.
    Para crear un callable a partir de un método privado o protegido, que luego se pueda
    invocar desde fuera del ámbito de la clase, use
    [Closure::fromCallable()](#closure.fromcallable) o la
    [sintaxis callable de primera
    clase](#functions.first_class_callable_syntax).

PHP permite la creación de callables que pueden ser usados como argumento de retrollamada
pero que no pueden ser llamados directamente.
Estos son callables dependientes del contexto que hacen referencia a un método de clase en la
jerarquía de herencia de una clase, por ejemplo
'parent::method' o ["static", "method"].

**Nota**:

    A partir de PHP 8.2.0, los callables dependientes del contexto
    están obsoletos. Elimine la dependencia del contexto reemplazando
    'parent::method' con
    parent::class . '::method' o use la
    [sintaxis callable de primera
    clase](#functions.first_class_callable_syntax).

**Ejemplo #2
Invocando varios tipos de callables con [call_user_func()](#function.call-user-func)
**

&lt;?php

// Un ejemplo de función de retrollamada
function my_callback_function() {
echo '¡hola mundo!', PHP_EOL;
}

// Un ejemplo de método de retrollamada
class MyClass {
static function myCallbackMethod() {
echo '¡Hola Mundo!', PHP_EOL;
}
}

// Tipo 1: Función de retrollamada simple
call_user_func('my_callback_function');

// Tipo 2: Llamada a un método estático de clase
call_user_func(['MyClass', 'myCallbackMethod']);

// Tipo 3: Llamada a un método de objeto
$obj = new MyClass();
call_user_func([$obj, 'myCallbackMethod']);

// Tipo 4: Llamada a un método estático de clase
call_user_func('MyClass::myCallbackMethod');

// Type 5: Llamada a un método estático de clase usando la palabla clave ::class
call_user_func([MyClass::class, 'myCallbackMethod']);

// Tipo 6: Llamada a un método estático de clase relativo
class A {
public static function who() {
echo 'A', PHP_EOL;
}
}

class B extends A {
public static function who() {
echo 'B', PHP_EOL;
}
}

call_user_func(['B', 'parent::who']); // obsoleto a partir de PHP 8.2.0

// Tipo 7: Los objetos que implementan **invoke pueden ser utilizados como callables
class C {
public function **invoke($name) {
echo 'Hola ', $name;
}
}

$c = new C();
call_user_func($c, 'PHP!');
?&gt;

El ejemplo anterior mostrará:

¡hola mundo!
¡Hola Mundo!
¡Hola Mundo!
¡Hola Mundo!
¡Hola Mundo!

Deprecated: Callables of the form ["B", "parent::who"] are deprecated in script on line 41
A
Hola PHP!

**Nota**:

Las devoluciónes de llamada registradas
con funciones como [call_user_func()](#function.call-user-func) y [call_user_func_array()](#function.call-user-func-array) no serán
llamadas si una excepción no es interceptada cuando ha sido lanzada en una función de devolución de llamada anterior.

## Mixed

El tipo [mixed](#language.types.mixed) acepta todos los valores. Es equivalente al
[tipo union](#language.types.type-system.composite.union)

object|resource|array|string|float|int|bool|null.
Disponible a partir de PHP 8.0.0.

[mixed](#language.types.mixed) es, en el lenguaje de la teoría de tipos, el tipo superior.
Esto significa que todos los demás tipos son subtipos de este tipo.

## Void

[void](language.types.void.html) es una declaración de tipo de retorno únicamente, indicando que la función
no devuelve ningún valor, pero que la función puede terminar de todos modos.
Por lo tanto, no puede formar parte de una declaración de
[tipo de unión](#language.types.type-system.composite.union)
Disponible a partir de PHP 7.1.0.

**Nota**:

Aunque una función tenga un tipo de retorno [void](language.types.void.html), siempre
devolverá un valor, este valor siempre es **[null](#constant.null)**.

## Never

[never](#language.types.never) es únicamente un tipo de retorno que indica que la función
no se termina. Esto significa que llama a [exit()](#function.exit),
lanza una excepción, o es un bucle infinito.
Por lo tanto, no puede formar parte de una declaración de
[type union](#language.types.type-system.composite.union)
Disponible a partir de PHP 8.1.0.

[never](#language.types.never) es, en el lenguaje de la teoría de tipos, el tipo vacío.
Esto significa que es el subtipo de todos los otros tipos y que puede reemplazar cualquier otro
tipo de retorno durante la herencia.

## Tipos de clases relativas

Estas declaraciones de tipos solo pueden ser utilizadas dentro de las clases.

### self

El valor debe ser un [instanceof](#language.operators.type) de la misma clase en la
que se utiliza la declaración de tipo.

### parent

El valor debe ser un [instanceof](#language.operators.type) de un padre de la clase
en la que se utiliza la declaración de tipo.

### static

static es un tipo de retorno únicamente que exige que el
valor devuelto sea un [instanceof](#language.operators.type) de la misma clase en la que
se llama el método.

## Tipo singleton

Los tipos singleton son aquellos que solo aceptan un único valor.
PHP soporta dos tipos singleton:
[false](#language.types.singleton) desde PHP 8.0.0 y [true](#language.types.singleton)
desde PHP 8.2.0.

**Advertencia**

Antes de PHP 8.2.0, el tipo [false](#language.types.singleton) solo podía ser utilizado
en el contexto de un
[tipo union](#language.types.type-system.composite.union).

**Nota**:

No es posible definir tipos singleton personalizados. Considere
el uso de una [enumeración](#language.types.enumerations) en su lugar.

## Itérables

Un [Iterable](#language.types.iterable) es un alias de tipo integrado durante la compilación para

array|Traversable.
Desde su introducción en PHP 7.1.0 y antes de PHP 8.2.0,
[iterable](#language.types.iterable) era un pseudo-tipo integrado que actuaba como
el alias de tipo mencionado anteriormente y puede ser utilizado como una declaración de tipo.
[iterable](#language.types.iterable) puede ser utilizado en un ciclo [foreach](#control-structures.foreach) y con
**yield from** en un [generador](#language.generators).

**Nota**:

Las funciones que declaran un tipo de retorno iterable también pueden ser
[generadores](#language.generators).

    **Ejemplo #1
     Ejemplo de tipo de retorno iterable de un generador
    **

&lt;?php

function gen(): iterable {
yield 1;
yield 2;
yield 3;
}

foreach(gen() as $value) {
echo $value, "\n";
}
?&gt;

## Declaraciones de tipo

Las declaraciones de tipos pueden ser añadidas a los argumentos de las funciones,
valores de retorno, a partir de PHP 7.4.0, las propiedades de clase,
y a partir de PHP 8.3.0, las constantes de clase.
Aseguran que el valor es del tipo especificado en el momento de la llamada,
de lo contrario se lanza un [TypeError](#class.typeerror).

Cada tipo soportado por PHP, con la excepción del tipo
[resource](#language.types.resource), puede ser utilizado en una declaración de tipo
por el usuario.
Esta página contiene un registro de cambios de la disponibilidad de
los diferentes tipos y la documentación sobre su uso en las
declaraciones de tipo.

**Nota**:

Cuando una clase implementa un método de interfaz o reimplementa un método
que ya ha sido definido por una clase padre, debe ser compatible con la
definición mencionada.
Un método es compatible si sigue las reglas de
[variance](#language.oop5.variance).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Añadido soporte para las constantes tipadas de clase, interfaz, trait y enum.




      8.2.0

       Añadido soporte de tipo DNF (Forma Normal Disyuntiva).




      8.2.0

       Añadido soporte del tipo [true](#language.types.singleton).




      8.2.0

       Los tipos [null](#language.types.null) y [false](#language.types.singleton) pueden ahora ser utilizados de manera autónoma.




      8.1.0

       Se ha añadido soporte para los tipos de intersección.




      8.1.0

       El retorno por referencia desde una función [void](language.types.void.html) ahora está desaconsejado.




      8.1.0

       Se ha añadido soporte para el tipo de retorno únicamente [never](#language.types.never).




      8.0.0

       Añadido soporte de [mixed](#language.types.mixed)




      8.0.0

       Se ha añadido soporte para el tipo de retorno únicamente static.




      8.0.0

       Se ha añadido soporte para los tipos de unión.




      7.4.0

       Añadido soporte para el tipado de propiedades de clase.




      7.2.0

       Añadido soporte para [object](#language.types.object).




      7.1.0

       Añadido soporte para [iterable](#language.types.iterable).




      7.1.0

       Añadido soporte para [void](language.types.void.html).




      7.1.0

       Se ha añadido soporte para los tipos nullable.



### Notas de uso de los tipos atómicos

Los tipos atómicos tienen un comportamiento directo con algunas advertencias
menores que se describen en esta sección.

#### Tipos escalares

**Advertencia**

    Los alias para los tipos escalares ([bool](#language.types.boolean), [int](#language.types.integer),
    [float](#language.types.float), [string](#language.types.string)) no son soportados.
    En su lugar, son tratados como nombres de clase o interfaz.
    Por ejemplo, utilizar boolean como una declaración de
    tipo requiere que el valor sea una [instanceof](#language.operators.type) de la clase o
    interfaz boolean, en lugar de tipo
    [bool](#language.types.boolean):






&lt;?php
function test(boolean $param) {}
test(true);
?&gt;

     Resultado del ejemplo anterior en PHP 8:




Warning: "boolean" will be interpreted as a class name. Did you mean "bool"? Write "\boolean" to suppress this warning in /in/9YrUX on line 2

Fatal error: Uncaught TypeError: test(): Argument #1 ($param) must be of type boolean, bool given, called in - on line 3 and defined in -:2
Stack trace:
#0 -(3): test(true)
#1 {main}
thrown in - on line 2

#### void

**Nota**:

     El retorno por referencia desde una función [void](language.types.void.html) está obsoleto a partir
     de PHP 8.1.0, ya que tal función es contradictoria.
     Anteriormente, ya emitía los siguientes **[E_NOTICE](#constant.e-notice)** cuando se llamaba:
     Only variable references should be returned by reference.






&lt;?php
function &amp;test(): void {}
?&gt;

#### Tipos Callable

    Este tipo no puede ser utilizado como declaración de tipo de propiedad de
    clase.

**Nota**:

     No es posible especificar la firma de la función.

#### Declaraciones de tipo sobre los parámetros de referencia

    Si un parámetro pasado por referencia a una declaración de tipo, el tipo
    de la variable *solo se verifica* a la entrada de
    la función, al inicio de la llamada, pero no cuando la función es llamada
    nuevamente.
    Esto significa que una función puede modificar el tipo de la variable pasada
    por referencia.




    **Ejemplo #1 Parámetro tipado pasado por referencia**

&lt;?php
function array_baz(array &amp;$param)
{
    $param = 1;
}
$var = [];
array_baz($var);
var_dump($var);
array_baz($var);
?&gt;

    Resultado del ejemplo anterior es similar a:

int(1)

Fatal error: Uncaught TypeError: array_baz(): Argument #1 ($param) must be of type array, int given, called in - on line 9 and defined in -:2
Stack trace:
#0 -(9): array_baz(1)
#1 {main}
thrown in - on line 2

### Notas de uso de los tipos compuestos

Las declaraciones de tipo compuesto están sujetas a algunas restricciones y
realizarán un control de redundancia en el momento de la compilación para
evitar errores simples.

**Precaución**

    Anterior a PHP 8.2.0 y la introducción de los tipos DNF, no
    era posible combinar las intersecciones de tipo con las uniones de tipo.

#### Tipos de uniones

**Advertencia**

     No es posible combinar los dos tipos de singleton
     false y true juntos en una
     unión de tipo.
     Utilice en su lugar [bool](#language.types.boolean).

**Precaución**

     Anterior a PHP 8.2.0, como [false](#language.types.singleton) y [null](#language.types.null) no
     podían ser utilizados como tipos autónomos, una unión de tipo
     compuesta únicamente de estos tipos no estaba permitida. Esto incluye los
     tipos siguientes: [false](#language.types.singleton), false|null
     y ?false.






    ##### Azúcar sintáctico de tipo nullable



     Una declaración de tipo de base única puede ser marcada como valor NULL
     anteponiendo el tipo de un signo de interrogación (?).
     Así ?T y T|null son idénticos.




    **Nota**:

      Esta sintaxis es soportada a partir de PHP 7.1.0, y es anterior
      a la soporte generalizado de los tipos de unión.





    **Nota**:



      También es posible obtener argumentos nullable haciendo de
      null el valor por defecto.
      Esto no es recomendado, ya que si el valor por defecto es modificado en
      una clase hija, se desencadenará una violación de compatibilidad de tipo ya que el tipo [null](#language.types.null) deberá ser añadido a la declaración de tipo.
      Este comportamiento también está obsoleto a partir de PHP 8.4.




      **Ejemplo #2 Forma antigua de hacer los argumentos nullable**




&lt;?php
class C {}

function f(C $c = null) {
    var_dump($c);
}

f(new C);
f(null);
?&gt;

      El ejemplo anterior mostrará:




object(C)#1 (0) {
}
NULL

#### Tipos duplicados y redundantes

    Para detectar errores simples en las declaraciones de tipo compuesto,
    los tipos redundantes que pueden ser detectados sin realizar una carga de clase resultarán en un error de compilación. Esto incluye:




     -

       Cada tipo resuelto por nombre solo puede ocurrir una vez.
       Los tipos como int|string|INT o
       Countable&amp;Traversable&amp;COUNTABLE
       generan un error.



     -

       El uso de [mixed](#language.types.mixed) o [never](#language.types.never) resulta en un error.



     -
      Para los tipos de uniones:

       <li class="listitem">

         Si [bool](#language.types.boolean) es utilizado, [false](#language.types.singleton) o
         [true](#language.types.singleton) no puede ser utilizado adicionalmente.



       -

         Si [object](#language.types.object) es utilizado, los tipos de clase no pueden
         ser utilizados adicionalmente.



       -

         Si [iterable](#language.types.iterable) es utilizado, [array](#language.types.array)
         y [Traversable](#class.traversable) no pueden ser utilizados
         adicionalmente.




     </li>
     -
      Para los tipos de intersecciones:

       <li class="listitem">

         El uso de un tipo que no es un tipo de clase genera un error.



       -

         El uso de self, parent o
         static resulta en un error.




     </li>
     -
      Para los tipos DNF:

       <li class="listitem">

         Si un tipo más genérico es utilizado, el más restrictivo es redundante.



       -

         Uso de dos tipos de intersección idénticos.




     </li>

**Nota**:

     Esto no garantiza que el tipo sea « mínimo », ya que esto requeriría
     cargar todos los tipos de clase utilizados.






    Por ejemplo, si A y B son
    alias de clase, entonces A|B sigue siendo una unión de tipo
    legal, aunque sea posible reducir a A o
    B.
    Asimismo, si la clase B extends A {}, entonces
    A|B también es una unión de tipo legal, aunque podría ser
    reducida al tipo A únicamente.





&lt;?php
function foo(): int|INT {} // No autorizado
function foo(): bool|false {} // No autorizado
function foo(): int&amp;Traversable {} // No autorizado
function foo(): self&amp;Traversable {} // No autorizado

use A as B;
function foo(): A|B {} // No autorizado ("use" forma parte de la resolución de nombres)
function foo(): A&amp;B {} // No autorizado ("use" forma parte de la resolución de nombres)

class_alias('X', 'Y');
function foo(): X|Y {} // Autorizado (la redundancia solo se conoce en tiempo de ejecución)
function foo(): X&amp;Y {} // Autorizado (la redundancia solo se conoce en tiempo de ejecución)
?&gt;

### Ejemplos

**Ejemplo #3 Declaración de tipo de clase de base**

&lt;?php
class C {}
class D extends C {}

// Esta no extiende C.
class E {}

function f(C $c) {
    echo get_class($c)."\n";
}

f(new C);
f(new D);
f(new E);
?&gt;

Resultado del ejemplo anterior en PHP 8:

C
D

Fatal error: Uncaught TypeError: f(): Argument #1 ($c) must be of type C, E given, called in /in/gLonb on line 14 and defined in /in/gLonb:8
Stack trace:
#0 -(14): f(Object(E))
#1 {main}
thrown in - on line 8

**Ejemplo #4 Declaración de tipo de interfaz de base**

&lt;?php
interface I { public function f(); }
class C implements I { public function f() {} }

// Esta no implementa I.
class E {}

function f(I $i) {
    echo get_class($i)."\n";
}

f(new C);
f(new E);
?&gt;

Resultado del ejemplo anterior en PHP 8:

C

Fatal error: Uncaught TypeError: f(): Argument #1 ($i) must be of type I, E given, called in - on line 13 and defined in -:8
Stack trace:
#0 -(13): f(Object(E))
#1 {main}
thrown in - on line 8

**Ejemplo #5 Declaración de tipo de retorno de base**

&lt;?php
function sum($a, $b): float {
return $a + $b;
}

// Note que un float será devuelto.
var_dump(sum(1, 2));
?&gt;

El ejemplo anterior mostrará:

float(3)

**Ejemplo #6 Retorno de un objeto**

&lt;?php
class C {}

function getC(): C {
return new C;
}

var_dump(getC());
?&gt;

El ejemplo anterior mostrará:

object(C)#1 (0) {
}

**Ejemplo #7 Declaración de tipo de argumento nullable**

    &lt;?php

class C {}

function f(?C $c) {
    var_dump($c);
}

f(new C);
f(null);
?&gt;

El ejemplo anterior mostrará:

object(C)#1 (0) {
}
NULL

**Ejemplo #8 Declaración de tipo de retorno nullable**

    &lt;?php

function get_item(): ?string {
if (isset($\_GET['item'])) {
return $\_GET['item'];
} else {
return null;
}
}
?&gt;

**Ejemplo #9 Declaración de tipo para las propiedades de clase**

&lt;?php
class User {
public static string $foo = 'foo';

    public int $id;
    public string $username;

    public function __construct(int $id, string $username) {
        $this-&gt;id = $id;
        $this-&gt;username = $username;
    }

}
?&gt;

### Tipado estricto

Por defecto, PHP convertirá los valores de un tipo incorrecto al tipo
escalar esperado siempre que sea posible. Por ejemplo, una función, que espera
como parámetro una [string](#language.types.string), a la que se pasa un
[int](#language.types.integer) recibirá una variable de tipo [string](#language.types.string).

Es posible activar el modo de tipado estricto archivo por archivo.
En el modo estricto, solo una variable que coincida exactamente con el
tipo esperado en la declaración será aceptada, de lo contrario se lanzará un
[TypeError](#class.typeerror).
La única excepción a esta regla es que un valor de tipo [int](#language.types.integer)
puede pasar una declaración de tipo [float](#language.types.float).

**Advertencia**

    Las llamadas a funciones desde funciones internas no serán
    afectadas por la declaración strict_types.

Para activar el modo estricto, se utiliza la expresión [declare](#control-structures.declare) con la
declaración strict_types:

**Nota**:

    El tipado estricto se aplica a las llamadas de función realizadas desde
    *dentro* de un archivo cuyo tipado estricto está activo, y no a las funciones declaradas en ese archivo. Si un archivo cuyo tipado estricto no está activado realiza una llamada a una función que ha sido definida en un archivo cuyo tipo estricto está activo, la preferencia del llamante (modo coercitivo) será respetada y el valor será forzado.

**Nota**:

    El tipado estricto solo está definido para las declaraciones de tipo escalar.

**Ejemplo #10 Tipado estricto para los valores de argumentos**

&lt;?php
declare(strict_types=1);

function sum(int $a, int $b) {
return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1.5, 2.5));
?&gt;

Resultado del ejemplo anterior en PHP 8:

int(3)

Fatal error: Uncaught TypeError: sum(): Argument #1 ($a) must be of type int, float given, called in - on line 9 and defined in -:4
Stack trace:
#0 -(9): sum(1.5, 2.5)
#1 {main}
thrown in - on line 4

**Ejemplo #11 Tipado coercitivo para los valores de argumentos**

&lt;?php
function sum(int $a, int $b) {
return $a + $b;
}

var_dump(sum(1, 2));

// Estos serán forzados a enteros: ¡note la salida a continuación!
var_dump(sum(1.5, 2.5));
?&gt;

El ejemplo anterior mostrará:

int(3)
int(3)

**Ejemplo #12 Tipado estricto para los valores de retorno**

&lt;?php
declare(strict_types=1);

function sum($a, $b): int {
return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1, 2.5));
?&gt;

El ejemplo anterior mostrará:

int(3)

Fatal error: Uncaught TypeError: sum(): Return value must be of type int, float returned in -:5
Stack trace:
#0 -(9): sum(1, 2.5)
#1 {main}
thrown in - on line 5

## Manipulación de tipos

PHP no requiere una definición de tipo explícita en las declaraciones de variables.
En este caso, el tipo de una variable se determina en función del valor que tiene almacenado.
Es decir, si una [string](#language.types.string) se asigna a la variable
$var, entonces $var es de tipo
[string](#language.types.string). Si después se asigna un valor [int](#language.types.integer) a
$var, será de tipo [int](#language.types.integer).

PHP puede intentar convertir el tipo de un valor en otro automáticamente
en ciertos contextos. Los diferentes contextos que existen son:

- Numérico

- String

- Lógico

- Integral y string

- Comparativo

- Función

**Nota**:

Cuando un valor necesita ser interpretado como un tipo diferente,
el valor en sí _no cambia_ de tipo.

Para forzar una variable a ser evaluada como un tipo particular, ver la
sección sobre [casting de tipo](#language.types.typecasting).
Para cambiar el tipo de una variable, ver la función [settype()](#function.settype).

### Contextos numéricos

Este es el contexto al utilizar un
[operador aritmético](#language.operators.arithmetic).

En este contexto, si uno de los operandos es un [float](#language.types.float) (o
no interpretable como [int](#language.types.integer)), ambos operandos se interpretan
como [float](#language.types.float)s, y el resultado será un [float](#language.types.float).
De lo contrario, los operandos se interpretan como [int](#language.types.integer)s,
y el resultado será también un [int](#language.types.integer).
A partir de PHP 8.0.0, si uno de los operandos no puede ser interpretado como
[TypeError](#class.typeerror) se lanza.

### Contextos string

Este es el contexto al utilizar [echo](#function.echo),
[print](#function.print), [la interpolación de cadenas de caracteres](#language.types.string.parsing), o el
[operador de concatenación](#language.operators.string)
para las cadenas de caracteres.

En este contexto, el valor se interpretará como una [string](#language.types.string).
Si el valor no puede ser interpretado, se levanta una
[TypeError](#class.typeerror).
Anterior a PHP 7.4.0, se generaba una **[E_RECOVERABLE_ERROR](#constant.e-recoverable-error)**.

### Contextos lógicos

Este es el contexto al utilizar declaraciones condicionales,
el [operador ternario](#language.operators.comparison.ternary),
o un [operador lógico](#language.operators.logical).

En este contexto, el valor se interpretará como un [bool](#language.types.boolean).

### Contextos integrales y string

Este es el contexto al utilizar un
[operador bit a bit](#language.operators.bitwise).

En este contexto, si todos los operandos son de tipo [string](#language.types.string)
entonces el resultado será también una [string](#language.types.string).
De lo contrario, los operandos se interpretarán como [int](#language.types.integer)s,
y el resultado será también un [int](#language.types.integer).
A partir de PHP 8.0.0, si uno de los operandos no puede ser interpretado,
se lanza una [TypeError](#class.typeerror).

### Contextos comparativos

Este es el contexto al utilizar un
[operador de comparación](#language.operators.comparison).

Las conversiones de tipos que se producen en este contexto se explican
en el [tabla](#language.operators.comparison.types)
Comparación con varios tipos.

### Contextos de funciones

Este es el contexto cuando un valor se pasa a un parámetro o propiedad
tipada o se devuelve desde una función que declara un tipo de retorno.

En este contexto, el valor debe ser una valor del tipo.
Existen dos excepciones, la primera es la siguiente: si el valor es de
tipo [int](#language.types.integer) y el tipo declarado es [float](#language.types.float), entonces
el entero se convierte en número de coma flotante.
La segunda es: si el tipo declarado es un tipo _escalar_

, el valor es convertible en un tipo escalar, y el modo de tipado coercitivo
está activo (por omisión), el valor puede ser convertido en un valor escalar aceptado.
Ver a continuación para una descripción de este comportamiento.

**Advertencia**

    [Las funciones internas](#functions.internal)
    fuerzan automáticamente **[null](#constant.null)** a los tipos escalares,
    este comportamiento está *OBSOLETO* a partir de PHP 8.1.0.

#### Tipado coercitivo con declaraciones de tipo simples

    -

      Tipo de declaración [bool](#language.types.boolean): valor se interpreta como [bool](#language.types.boolean).



    -

      Tipo de declaración [int](#language.types.integer): valor se interpreta como [int](#language.types.integer)
      si la conversión está bien definida. Por ejemplo, la cadena es
      [numérica](#language.types.numeric-strings).



    -

      Tipo de declaración [float](#language.types.float): valor se interpreta como [float](#language.types.float)
      si la conversión está bien definida. Por ejemplo, la cadena es
      [numérica](#language.types.numeric-strings).



    -

      Tipo de declaración [string](#language.types.string): valor se interpreta como [string](#language.types.string).


#### Tipado coercitivo con uniones de tipo

    Cuando strict_types no está activado, las
    declaraciones de tipo escalar están sujetas a restricciones de tipo
    implícitas limitadas.
    Si el tipo exacto del valor no forma parte de la unión, el tipo objetivo
    se elige en el siguiente orden de preferencia:




     -

       [int](#language.types.integer)



     -

       [float](#language.types.float)



     -

       [string](#language.types.string)



     -

       [bool](#language.types.boolean)





    Si el tipo existe en la unión y el valor puede ser forzado a
    este tipo utilizando la semántica de verificación de tipo existente de PHP, entonces el tipo es elegido.

**Precaución**

     A título de excepción, si el valor es una cadena y [int](#language.types.integer) y [float](#language.types.float) forman
     ambos parte de la unión, el tipo preferido se determina por la
     semántica de [cadena numérica](#language.types.numeric-strings).
     Por ejemplo, para "42" [int](#language.types.integer) es elegido,
     mientras que para "42.0" [float](#language.types.float) es elegido.

**Nota**:

     Los tipos que no forman parte de la lista de preferencias anterior no
     son objetivos admisibles para la coerción implícita. En particular,
     ninguna restricción implícita a los tipos null y
     false se produce.






    **Ejemplo #1 Ejemplo de tipos restringidos a una parte del tipo de la unión**

&lt;?php
// int|string
42 --&gt; 42 // tipo exacto
"42" --&gt; "42" // tipo exacto
new ObjectWithToString --&gt; "Result of \_\_toString()"
// objeto nunca compatible con int, recurrir a string
42.0 --&gt; 42 // float compatible con int
42.1 --&gt; 42 // float compatible con int
1e100 --&gt; "1.0E+100" // float demasiado grande para el tipo int, recurrir a string
INF --&gt; "INF" // float demasiado grande para el tipo int, recurrir a string
true --&gt; 1 // bool compatible con int
[] --&gt; TypeError // array no compatible con int o string

// int|float|bool
"45" --&gt; 45 // int string numérico
"45.0" --&gt; 45.0 // float string numérico

"45X" --&gt; true // no string numérico, recurrir a bool
"" --&gt; false // no string numérico, recurrir a bool
"X" --&gt; true // no string numérico, recurrir a bool
[] --&gt; TypeError // array no compatible con int, float o bool
?&gt;

### Cast de tipo

El casting de tipo convierte el valor a un tipo dado escribiendo el tipo
entre paréntesis antes del valor a convertir.

**Ejemplo #2 Conversión de tipo**

&lt;?php
$foo = 10;          // $foo es un integer
$bar = (bool) $foo; // $bar es un bool

var_dump($bar);
?&gt;

Los casts permitidos son:

- (int) - cast en [int](#language.types.integer)

- (bool) - cast en [bool](#language.types.boolean)

- (float) - cast en [float](#language.types.float)

- (string) - cast en [string](#language.types.string)

- (array) - cast en [array](#language.types.array)

- (object) - cast en [object](#language.types.object)

- (unset) - cast en [NULL](#language.types.null)

**Nota**:

    (integer) es un alias del cast (int).
    (boolean) es un alias del cast (bool).
    (binary) es un alias del cast (string).
    (double) y (real) son alias del
    cast (float).
    Estos casts no utilizan el nombre de tipo canónico y no son recomendados.

**Advertencia**

    El alias de cast (real) está obsoleto a partir de PHP 7.4.0
    y eliminado a partir de PHP 8.0.0.

**Advertencia**

    El cast (unset) fue declarado obsoleto a partir de PHP 7.2.0.
    A notar que el cast (unset) es idéntico a asignar el
    valor [NULL](#language.types.null) a una variable o una llamada.
    El cast (unset) es eliminado a partir de PHP 8.0.0.

**Precaución**

    El cast (binary) y el prefijo b
    existen únicamente para la compatibilidad ascendente. Actualmente
    (binary) y (string) son idénticos,
    pero esto puede cambiar: no se debe contar con ello.

**Nota**:

    Los espacios en blanco se ignoran dentro de los paréntesis de un cast.
    Así, los dos casts siguientes son equivalentes:





&lt;?php
$foo = (int) $bar;
$foo = ( int ) $bar;
?&gt;

    Cast de [string](#language.types.string)s literales y variables en
    [string](#language.types.string)s binarios:

&lt;?php
$binary = (binary) $string;
$binary = b"binary string";
?&gt;

En lugar de transtypar una variable en una [string](#language.types.string), también es posible
rodear la variable con comillas dobles.

**Ejemplo #3 Diferentes mecanismos de conversión**

&lt;?php
$foo = 10;            // $foo es un integer
$str = "$foo";        // $str es una cadena
$fst = (string) $foo; // $fst es también una cadena

// Esto muestra "Son iguales"
if ($fst === $str) {
echo "Son iguales", PHP_EOL;
}
?&gt;

Lo que ocurrirá exactamente al transtypar entre ciertos tipos
no es necesariamente evidente. Para más información, ver estas secciones:

    - [Convertir en boolean](#language.types.boolean.casting)

    - [Convertir en integer](#language.types.integer.casting)

    - [Convertir en float](#language.types.float.casting)

    - [Convertir en string](#language.types.string.casting)

    - [Convertir en array](#language.types.array.casting)

    - [Convertir en object](#language.types.object.casting)

    - [Convertir en resource](#language.types.resource.casting)

    - [Convertir en NULL](#language.types.null.casting)

    - [Las tablas de comparación de tipo](#types.comparisons)

**Nota**:

    Como PHP soporta la indexación en las [string](#language.types.string)s
    mediante posiciones utilizando la misma sintaxis que la indexación de [array](#language.types.array),
    el siguiente ejemplo es válido para todas las versiones de PHP:





    **Ejemplo #4 Uso de un índice de array con una cadena**

&lt;?php
$a    = 'car'; // $a es una cadena de caracteres
$a[0] = 'b'; // $a sigue siendo una cadena de caracteres
echo $a; // bar
?&gt;

    Ver la sección sobre el [acceso
    a las cadenas por caracter](#language.types.string.substr) para más información.

# Variables

## Tabla de contenidos

- [Conceptos básicos](#language.variables.basics)
- [Variables Predefinidas](#language.variables.predefined)
- [Ámbito de las variables](#language.variables.scope)
- [Variables variables](#language.variables.variable)
- [Variables desde fuentes externas](#language.variables.external)

    ## Conceptos básicos

    En PHP las variables se representan con un signo de dólar seguido por el
    nombre de la variable. El nombre de la variable es sensible a minúsculas y mayúsculas.

    Un nombre de variable válido tiene que empezar con una letra
    (A-Z, a-z, o los bytes del 128 al 255)
    o un carácter de subrayado (underscore), seguido
    de cualquier número de letras, números y caracteres de subrayado. Como
    expresión regular se podría expresar como:
    ^[a-zA-Z\_\x80-\xff][a-zA-Z0-9_\x80-\xff]\*$

    **Nota**:

        PHP no soporta Unicode en el nombre de las variables, sin embargo, algunas codificaciones
        de caracteres (como UTF-8) codifican caracteres de tal manera que todos los bytes
        de un carácter multibyte están dentro del rango permitido, convirtiéndolo así
        en un nombre de variable válido.

    **Nota**:

        $this es una variable especial que no puede ser
        asignada.
        Antes de PHP 7.1.0, era posible la asignación indirecta (por ejemplo,
        mediante el uso de [variables variables](#language.variables.variable)).

    **Sugerencia**
    Eche un vistazo a [Guía de entorno de usuario para nombres](#userlandnaming).

    **Ejemplo #1 Valid variable names**

&lt;?php
$var = 'Roberto';
$Var = 'Juan';
echo "$var, $Var"; // Imprime "Roberto, Juan"

$_4site = 'aún no';     // Válido; comienza con un carácter de subrayado
$täyte = 'mansikka'; // Válido; 'ä' es ASCII (Extendido) 228
?&gt;

    **Ejemplo #2 Invalid variable names**

&lt;?php
$4site = 'aún no'; // Inválido; comienza con un número

    PHP acepta una secuencia de bytes como nombre de variable. Los nombres de
    variables que no siguen las reglas de nombres mencionadas anteriormente
    solo pueden accederse de forma dinámica en tiempo de ejecución. Consulte
    [variables variables](#language.variables.variable)
    para obtener información sobre cómo acceder a ellas.





    **Ejemplo #3 Cómo acceder a nombres de variables con caracteres no válidos**

&lt;?php
${'invalid-name'} = 'bar';
$name = 'invalid-name';
echo ${'invalid-name'}, " ", $$name;
?&gt;

    El ejemplo anterior mostrará:

bar bar

    Por omisión, las variables siempre se asignan por valor. Esto
    significa que cuando se asigna una expresión a una variable, el valor
    completo de la expresión original se copia en la variable de destino.
    Esto quiere decir que, por ejemplo, después de asignar el valor de una
    variable a otra, los cambios que se efectúen a una de esas variables no
    afectará a la otra. Para más información sobre este tipo de asignación,
    vea  el capítulo sobre [Expresiones](#language.expressions).




    PHP también ofrece otra forma de asignar valores a las variables:
    [asignar por referencia](#language.references). Esto
    significa que la nueva variable simplemente referencia (en otras
    palabras, "se convierte en un alias de" ó "apunta a") la variable
    original. Los cambios a la nueva variable afectan a la original, y
    viceversa.




    Para asignar por referencia, simplemente se antepone un signo ampersand
    (&amp;) al comienzo de la variable cuyo valor se está asignando (la
    variable fuente). Por ejemplo, el siguiente segmento de código produce la
    salida 'Mi nombre es Bob' dos veces:






&lt;?php
$foo = 'Bob';                // Asigna el valor 'Bob' a $foo
$bar = &amp;$foo;                // Referenciar $foo vía $bar.
$bar = "Mi nombre es $bar"; // Modifica $bar...
echo $bar;
echo $foo; // $foo también se modifica.
?&gt;

    Algo importante a tener en cuenta es que sólo las variables con nombre
    pueden ser asignadas por referencia.





&lt;?php
$foo = 25;
$bar = &amp;$foo;      // Esta es una asignación válida.
$bar = &amp;(24 \* 7); // Inválida; referencia una expresión sin nombre.

function test()
{
return 25;
}

$bar = &amp;test(); // Inválido porque test() no devuelve una variable por referencia.
?&gt;

    No es necesario inicializar variables en PHP, sin embargo, es una muy buena práctica.
    El acceso a una variable no definida generará un **[E_WARNING](#constant.e-warning)**
    (en versiones anteriores a PHP 8.0.0, **[E_NOTICE](#constant.e-notice)**).
    Una variable no definida tiene un valor predeterminado de **[null](#constant.null)**.
    Se puede utilizar la construcción del lenguaje [isset()](#function.isset)
    para detectar si una variable ya se ha inicializado.







     **Ejemplo #4 Valores predeterminados en variables sin inicializar**




&lt;?php
// Una variable no definida Y no referenciada (sin contexto de uso).
var_dump($variable_indefinida);
?&gt;

     El ejemplo anterior mostrará:




Warning: Undefined variable $unset_var in ...
NULL

    PHP permite la autovivificación de array (creación automática de un nuevo array)
    a partir de una variable no definida.
    Añadidiendo un elemento a una variable no definida creará un nuevo array y
    no producirá ninguna advertencia.




    **Ejemplo #5 Autovivification de un array a partir de una variable no definida**

&lt;?php
$unset_array[] = 'valor'; // No producirá ninguna advertencia.
?&gt;

**Advertencia**

     Depender del valor predeterminado de una variable sin inicializar
     es problemático al incluir un archivo en otro que use el mismo
     nombre de variable.






    Una variable puede ser destruida, utilizando la construcción del lenguaje
    [unset()](#function.unset).





    Para información con funciones relativas a variables, mira la
    [Referencia de funciones de variables](#ref.var).

## Variables Predefinidas

    PHP proporciona una gran cantidad de
    [variables predefinidas](#reserved.variables).
    PHP ofrece un conjunto adicional de arrays predefinidas que contienen
    variables del servidor web (cuando es aplicable), el entorno y entradas del
    usuario. Estos arrays están automáticamente disponibles en cualquier
    entorno. Por esa razón, a veces son conocidas como "superglobales".
    (No existe mecanismo en PHP para crear superglobales definidas por el
    usuario). Referencia de la
    [lista de superglobales](#language.variables.superglobals)
    para más detalles.

**Nota**:
**Variables variables**

     Las superglobales no pueden ser usadas como [variables variables](#language.variables.variable)
     en el interior de funciones o métodos de clase.






    Si ciertas variables no son definidas en [variables_order](#ini.variables-order), los arrays de PHP
    predefinidos asociados a estas, estarán vacíos.

## Ámbito de las variables

    El ámbito de una variable es el contexto en el cual la variable está
    definida.
    PHP tiene un ámbito de función y un ámbito global.
    Cualquier variable difinida fuera de una función está limitada al ámbito global.
    Cuando se incluye un archivo, el código contenido hereda el ámbito de la
    variable de la línea en la cual se incluye el archivo.




    **Ejemplo #1 Ejemplo de una variable de ámbito global**

&lt;?php
$a = 1;
include 'b.inc'; // La variable $a estará disponible en el interior de b.inc
?&gt;

    Cualquier variable declarada dentro de una función o una
    [funcíón anónima](#functions.anonymous)
    está limitada al ámbito del cuerpo de dicha función.
    Sin embargo, las [funciones de flecha](#functions.arrow)
    vinculan las variables desde el ámbito padre haciendo que
    estén disponibles dentro de la función.
    Si se incluye un archivo dentro de una función, las variables
    contenidas en el archivo llamado estarán disponibles como si
    se hubieran definido dentro de la función que realiza la llamada.





    **Ejemplo #2 Ejemplo de una variable de ámbito local**

&lt;?php
$a = 1; // ámbito global

function test()
{
echo $a; // La variable $a no está definida ya que se refiere a una versión local de $a
}
?&gt;

El ejemplo anterior producirá un **[E_WARNING](#constant.e-warning)** por una
variable no definida (o un **[E_NOTICE](#constant.e-notice)** antes de PHP 8.0.0).
Esto se debe a la expresión echo hace referencia a una versión local de
la variable $a, a la cual no se le ha asignado un valor
dentro de su ámbito.
Puede que usted note que hay una pequeña diferencia con el lenguaje C,
en el que las variables globales están disponibles automáticamente dentro
de la función a menos que sean expresamente sobreescritas por una
definición local. Esto puede causar algunos problemas, ya que la gente
podría cambiar variables globales sin darse cuenta.
En PHP, las variables globales deben ser declaradas globales dentro de la
función si van a ser utilizadas dentro de dicha función.

### La palabra clave global

    La palabra clave global se usa para vincular una
    variable desde el ámbito global a un ámbito local. La palabra clave
    puede ser usada con una lista de variables o con una sola variable.
    Una variable local será creada haciendo referendia a una variable global
    con el mismo nombre. Si no existe la variable global, la variable será
    creada en el ámbito global y asignado el valor **[null](#constant.null)**.







     **Ejemplo #3 Uso de global**




&lt;?php
$a = 1;
$b = 2;

function Suma()
{
global $a, $b;

    $b = $a + $b;

}

Suma();
echo $b;
?&gt;

      El ejemplo anterior mostrará:




3

    Al declarar las variables
    $a y $b globales dentro de la
    función, todas las referencias a tales variables se referirán a la
    versión global. No hay límite al número de variables globales que se
    pueden manipular dentro de una función.





    Un segundo método para acceder a las variables desde un ámbito global es
    usando el array especial definido por PHP [$GLOBALS](#reserved.variables.globals).
    El ejemplo anterior se puede reescribir así:







     **Ejemplo #4 Uso de [$GLOBALS](#reserved.variables.globals) en lugar de global**




&lt;?php
$a = 1;
$b = 2;

function Suma()
{
$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Suma();
echo $b;
?&gt;

    El array [$GLOBALS](#reserved.variables.globals) es un array asociativo con el
    nombre de la variable global como clave y los contenidos de dicha
    variable como el valor del elemento del array.
    [$GLOBALS](#reserved.variables.globals) existe en cualquier ámbito, esto ocurre ya
    que [$GLOBALS](#reserved.variables.globals) es una [superglobal](#language.variables.superglobals). Aquí hay un
    ejemplo que demuestra el poder de las superglobales:







     **Ejemplo #5 Ejemplo que demuestra las superglobales y el ámbito**




&lt;?php
function test_superglobal()
{
echo $\_POST['name'];
}
?&gt;

**Nota**:

     Utilizar una clave global fuera de una función no es un
     error. Esta puede ser utilizada aún si el fichero está incluido desde el interior de una función.

### Uso de variables static

    Otra característica importante del ámbito de las variables es la variable
    *estática*. Una variable estática existe sólo en el
    ámbito local de la función, pero no pierde su valor cuando la ejecución
    del programa abandona este ámbito. Consideremos el siguiente ejemplo:







     **Ejemplo #6 Ejemplo que demuestra la necesidad de variables
      estáticas**




&lt;?php
function test()
{
$a = 0;
echo $a;
$a++;
}
?&gt;

    Esta función tiene poca utilidad ya que cada vez que es llamada asigna a
    $a el valor 0 e imprime un
    0.  La sentencia $a++, que incrementa la
    variable, no sirve para nada, ya que en cuanto la función finaliza, la
    variable $a desaparece.  Para hacer una función útil
    para contar, que no pierda la pista del valor actual del conteo, la
    variable $a debe declararse como estática:







     **Ejemplo #7 Ejemplo del uso de variables estáticas**




&lt;?php
function test()
{
static $a = 0;
echo $a;
$a++;
}
?&gt;

    Ahora, $a se inicializa únicamente en la primera
    llamada a la función, y cada vez que la función test() es llamada,
    imprimirá el valor de $a y lo incrementa.





    Las variables estáticas también proporcionan una forma de manejar
    funciones recursivas. La siguiente función cuenta recursivamente
    hasta 10, usando la variable estática $count
    para saber cuándo parar:







     **Ejemplo #8 Variables estáticas con funciones recursivas**




&lt;?php
function test()
{
static $count = 0;

    $count++;
    echo $count;
    if ($count &lt; 10) {
        test();
    }
    $count--;

}
?&gt;

    Antes de PHP 8.3.0, las variables estáticas solo podían ser inicializadas
    usando expresiones constantes. A partir de PHP 8.3.0, expresiones dinámicas
    (por ejemplo, llamadas a funciones) también están permitidas:







     **Ejemplo #9 Declarando variables estáticas**




&lt;?php
function foo(){
static $int = 0; // correcto
static $int = 1+2; // correcto
static $int = sqrt(121); // correcto a partir de PHP 8.3.0

    $int++;
    echo $int;

}
?&gt;

    Las variables estáticas dentro de funiones anónimas también persisten
    solo dentro de esa instancia específica de la función. Si la función
    anónima es recreada en cada llamada, la variable estática será
    reinicializada.




    **Ejemplo #10 Variables estáticas en funciones anónimas**

&lt;?php
function exampleFunction($input) {
    $result = (static function () use ($input) {
static $counter = 0;
$counter++;
return "Entrada: $input, Contador: $counter\n";
});

    return $result();

}

// Las llamadas a exampleFunction recrearán la función anónima, por tanto
// la variable estática no retendrá su valor.
echo exampleFunction('A'); // Devolverá: Entrada: A, Contador: 1
echo exampleFunction('B'); // Devolverá: Entrada: B, Contador: 1
?&gt;

    A partir de PHP 8.1.0, cuando un método que usa variables estáticas es
    heredado (pero no sobrescrito), el método heredado compartirá ahora las
    variables estáticas con el método padre. Esto significa que las variables
    estáticas en los métodos ahora se comportan de la misma manera que las
    propiedades estáticas.





    A partir de PHP 8.3.0, las variables estáticas pueden ser inicializadas con
    expresiones arbitrarias. Esto significa que las llamadas a métodos, por
    ejemplo, pueden ser usadas para inicializar variables estáticas.





    **Ejemplo #11 Uso de variables estáticas en métodos heredados**

&lt;?php
class Foo {
public static function counter() {
static $counter = 0;
$counter++;
return $counter;
}
}
class Bar extends Foo {}
var_dump(Foo::counter()); // int(1)
var_dump(Foo::counter()); // int(2)
var_dump(Bar::counter()); // int(3), antes de PHP 8.1.0 int(1)
var_dump(Bar::counter()); // int(4), antes de PHP 8.1.0 int(2)
?&gt;

### Referencias con variables global y static

    PHP implementa los modificadores
    [static](#language.variables.scope.static) y [global](#language.variables.scope.global) para variables
    en términos de [referencias](#language.references).
    Por ejemplo, una variable global verdadera importada dentro del ámbito
    de una función con global crea una referencia a la
    variable global. Esto puede ser causa de un comportamiento inesperado,
    tal y como podemos comprobar en el siguiente ejemplo:

&lt;?php
function test_global_ref() {
global $obj;
    $new = new stdClass;
    $obj = &amp;$new;
}

function test_global_noref() {
global $obj;
$new = new stdClass;
$obj = $new;
}

test_global_ref();
var_dump($obj);
test_global_noref();
var_dump($obj);
?&gt;

El ejemplo anterior mostrará:

NULL
object(stdClass)#1 (0) {
}

    Un comportamiento similar se aplica a static. Las
    referencias no son almacenadas estáticamente.

&lt;?php
function &amp;get_instance_ref() {
static $obj;

    echo 'Objeto estático: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdClass;
        // Asignar una referencia a la variable estática
        $obj = &amp;$new;
    }
    if (!isset($obj-&gt;property)) {
        $obj-&gt;property = 1;
    } else {
        $obj-&gt;property++;
    }
    return $obj;

}

function &amp;get_instance_noref() {
static $obj;

    echo 'Objeto estático: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdClass;
        // Asignar el objeto a la variable estática
        $obj = $new;
    }
    if (!isset($obj-&gt;property)) {
        $obj-&gt;property = 1;
    } else {
        $obj-&gt;property++;
    }
    return $obj;

}

$obj1 = get_instance_ref();
$aun_obj1 = get_instance_ref();
echo "\n";
$obj2 = get_instance_noref();
$aun_obj2 = get_instance_noref();
?&gt;

El ejemplo anterior mostrará:

Objeto estático: NULL
Objeto estático: NULL

Objeto estático: NULL
Objeto estático: object(stdClass)#3 (1) {
["property"]=&gt;
int(1)
}

    Este ejemplo demuestra que al asignar una referencia a una variable
    estática, esta no es *recordada* cuando se invoca la
    funcion &amp;obtener_instancia_ref() por segunda vez.

## Variables variables

A veces es conveniente tener nombres de variables variables. Dicho de
otro modo, son nombres de variables que se pueden definir y usar
dinámicamente. Una variable normal se establece con una sentencia como:

&lt;?php
$a = 'hola';
?&gt;

Una variable variable toma el valor de una variable y lo trata como el
nombre de una variable. En el ejemplo anterior,
_hola_, se puede usar como el nombre de una variable
utilizando dos signos de dólar. Es decir:

&lt;?php

$$
a = 'mundo';
?&gt;





   En este momento se han definido y almacenado dos variables en el árbol de
   símbolos de PHP: $a, que contiene "hola", y
   $hola, que contiene "mundo". Es más, esta
   sentencia:






&lt;?php
echo "$a ${$a}";
?&gt;





   produce el mismo resultado que:






&lt;?php
echo "$a $hola";
?&gt;





   esto quiere decir que ambas producen el resultado: hola mundo.





   Para usar variables variables con arrays hay que
   resolver un problema de ambigüedad. Si se escribe
   $$a[1], el intérprete necesita saber si nos
   referimos a utilizar $a[1] como una variable, o si
   se pretendía utilizar $$a como variable y el índice [1]
   como índice de dicha variable. La sintaxis para resolver esta ambigüedad
   es: ${$a[1]} para el primer caso y
   ${$a}[1] para el segundo.





   También se puede acceder a las propiedades de una clase usando el nombre de propiedad variable.
   Este será resuelto dentro del ámbito del cual se hizo
   la llamada. Por ejemplo, en la expresión
   $foo-&gt;$bar, se buscará $bar en el ámibto
   local y se empleará su valor será como el nombre de la propiedad
   de $foo. Esto también es cierto
   si $bar es un acceso a un array.





   También se pueden usar llaves para delimitar de forma clara el nombre de la
   propiedad. Son muy útila al acceder a valores dentro una propiedad que
   contiene un array, cuando el nombre de la propiedad está compuesto de múltiples partes,
   o cuando el nombre de la propiedad contiene caracteres que de otro modo no son
   válidos (p.ej. desde [json_decode()](#function.json-decode)
   o [SimpleXML](#book.simplexml)).








    **Ejemplo #1 Ejemplo de propiedad variable**



&lt;?php
class foo {
    var $bar = 'Soy bar.';
    var $arr = array('Soy A.', 'Soy B.', 'Soy C.');
    var $r   = 'Soy r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo-&gt;$bar . "\n";
echo $foo-&gt;{$baz[1]} . "\n";

$start = 'b';
$end   = 'ar';
echo $foo-&gt;{$start . $end} . "\n";

$arr = 'arr';
echo $foo-&gt;{$arr[1]} . "\n";
echo $foo-&gt;{$arr}[1] . "\n";

?&gt;


    El ejemplo anterior mostrará:



Soy bar.
Soy bar.
Soy bar.
Soy r.
Soy B.




  **Advertencia**

    Por favor tenga en cuenta que las variables variables no pueden usarse
    con los [Arrays
    superglobales](#language.variables.superglobals) de PHP al interior de funciones o métodos de
    clase. La variable $this es también una variable
    especial que no puede ser referenciada dinámicamente.










  ## Variables desde fuentes externas



   ### Formularios HTML (GET y POST)



    Cuando se envía un formulario a un script de PHP, la información de dicho
    formulario pasa a estar automáticamente disponible en el script. Existen
    algunas formas de acceder a esta información, por ejemplo:








     **Ejemplo #1 Un formulario HTML sencillo**



&lt;form action="foo.php" method="post"&gt;
    Nombre usuario: &lt;input type="text" name="username" /&gt;&lt;br /&gt;
    Email:  &lt;input type="text" name="email" /&gt;&lt;br /&gt;
    &lt;input type="submit" name="submit" value="¡Enviarme!" /&gt;
&lt;/form&gt;






    Solamente existen dos maneras de acceder a datos desde formularios HTML.
    Los métodos disponibles actualmente se enumeran a continuación:








     **Ejemplo #2 Acceso a datos de un formulario HTML sencillo con POST**



&lt;?php
echo $_POST['username'];
echo $_REQUEST['username'];
?&gt;







    Usar un formulario con GET es similar excepto en el uso de variables
    predefinidas, que en este caso serán del tipo GET. GET también se usa
    con QUERY_STRING (la información despues del símbolo '?' en una URL).
    Por ejemplo http://www.example.com/test.php?id=3
    contiene datos GET que son accesibles con
    [$_GET['id']](#reserved.variables.get).
    Véase también [$_REQUEST](#reserved.variables.request).




   **Nota**:



     Puntos y espacios en nombres de variables son convertidos a guiones bajos.
     Por ejemplo &lt;input name="a.b" /&gt; se convierte en
     $_REQUEST["a_b"].






    PHP también entiende arrays en el contexto de variables de
    formularios (vea la [faq relacionada](#faq.html)).
    Se puede, por ejemplo, agrupar juntas variables relacionadas o usar esta
    característica para obtener valores de una entrada "select" múltiple.
    Por ejemplo, vamos a mandar un formulario a sí mismo y a presentar los
    datos cuando se reciban:







     **Ejemplo #3 Variables de formulario más complejas**



&lt;?php
if ($_POST) {
    echo '&lt;pre&gt;';
    echo htmlspecialchars(print_r($_POST, true));
    echo '&lt;/pre&gt;';
}
?&gt;
&lt;form action="" method="post"&gt;
    Nombre:  &lt;input type="text" name="personal[nombre]" /&gt;&lt;br /&gt;
    Email:   &lt;input type="text" name="personal[email]" /&gt;&lt;br /&gt;
    Cerveza: &lt;br /&gt;
    &lt;select multiple name="cerveza[]"&gt;
        &lt;option value="warthog"&gt;Warthog&lt;/option&gt;
        &lt;option value="guinness"&gt;Guinness&lt;/option&gt;
        &lt;option value="stuttgarter"&gt;Stuttgarter Schwabenbräu&lt;/option&gt;
    &lt;/select&gt;&lt;br /&gt;
    &lt;input type="submit" value="¡enviarme!" /&gt;
&lt;/form&gt;





    **Nota**:

      Si una variable externa comienza con una sintaxis de array válida,
      Los caracteres finales se ignoran en silencio. Por ejemplo,
      &lt;input name="foo[bar]baz"&gt;
      se convierte en $_REQUEST['foo']['bar'].






     #### Nombres de variables tipo IMAGE SUBMIT



      Cuando se envía un formulario, es posible usar una imagen en vez
      del botón estándar "submit":






&lt;input type="image" src="image.gif" name="sub" /&gt;






      Cuando el usuario hace click en cualquier parte de la imagen, el
      formulario que la acompaña se transmitirá al servidor con dos variables
      adicionales, sub_x y sub_y. Éstas contienen las coordenadas del  clic
      del usuario dentro de la imagen.  Los más experimentados puede notar
      que los nombres de variable enviados por el navegador contienen un
      guión en vez de un subrayado (guión bajo), pero PHP convierte el guión
      en subrayado automáticamente.








    ### Cookies HTTP



     PHP soporta cookies de HTTP de forma transparente tal y como están
     definidas en [» RFC 6265](https://datatracker.ietf.org/doc/html/rfc6265). Las cookies son un
     mecanismo para almacenar datos en el navegador y así
     rastrear o identificar a usuarios que vuelven. Se pueden
     crear cookies usando la función [setcookie()](#function.setcookie). Las
     cookies son parte de la cabecera HTTP, así que se debe llamar a la
     función SetCookie antes de que se envíe cualquier salida al navegador.
     Es la misma restricción que para la función [header()](#function.header).
     Los datos de una cookie están disponibles en el array de datos de la
     cookies apropiada, tal como [$_COOKIE](#reserved.variables.cookies) y [$_REQUEST](#reserved.variables.request).
     Véase la página de [setcookie()](#function.setcookie) del manual para más
     detalles y ejemplos.




    **Nota**:

      A partir de PHP 7.2.34, 7.3.23 y 7.4.11, respectivamente, los
      *nombres* de las cookies entrantes ya no son con url-decoded
      por razones de seguridad.






    Si se quieren asignar múltiples valores a una sola cookie, basta con
    asignarlo como un array. Por ejemplo:






&lt;?php
  setcookie("MiCookie[foo]", 'Prueba 1', time()+3600);
  setcookie("MiCookie[bar]", 'Prueba 2', time()+3600);
?&gt;





     Esto creará dos cookies separadas aunque MiCookie será un array simple
     en el script. Si se quiere definir una sola cookie con valores
     múltiples, considere el uso de la función [serialize()](#function.serialize)
     o [explode()](#function.explode) primero en el valor.





     Nótese que una cookie reemplazará a una cookie anterior que tuviese el
     mismo nombre en el navegador a menos que la ruta o el dominio
     fuesen diferentes. Así, para una aplicación de carrito de compras se
     podría querer mantener un contador e ir pasándolo. Es decir:





     **Ejemplo #4 Un ejemplo de [setcookie()](#function.setcookie)**



&lt;?php
if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'] + 1;
} else {
    $count = 1;
}
setcookie('conteo', $count, time()+3600);
setcookie("Carrito[$count]", $item, time()+3600);
?&gt;







    ### Puntos en los nombres de variables de entrada



     Típicamente, PHP no altera los nombres de las variables cuando se pasan
     a un script. Sin embargo, hay que notar que el punto no es un
     carácter válido en el nombre de una variable PHP. Para conocer la razón,
     considere el siguiente ejemplo:



&lt;?php
$varname.ext;  /* nombre de variable inválido */
?&gt;


     Lo que el intérprete vé es el nombre de una variable $varname, seguido
     por el operador de concatenación, y seguido por la cadena pura (es
     decir, una cadena sin entrecomillar que no coincide con ninguna palabra
     clave o reservada conocida) 'ext'. Obviamente, no se pretendía que fuese
     éste el resultado.



     Por esta razón, es importante hacer notar que PHP reemplazará
     automáticamente cualquier punto en los nombres de variables de entrada
     por guiones bajos (subrayados).







    ### Determinación de los tipos de variables



     Dado que PHP determina los tipos de las variables y los convierte
     (generalmente) según lo que necesita, no siempre resulta obvio de qué tipo
     es una variable dada en un momento concreto. PHP incluye varias
     funciones que descubren de qué tipo es una variable:
     [gettype()](#function.gettype), [is_array()](#function.is-array),
     [is_float()](#function.is-float), [is_int()](#function.is-int),
     [is_object()](#function.is-object), y [is_string()](#function.is-string).  Vea
     también el capítulo sobre [Tipos](#language.types).




     HTTP being a text protocol, most, if not all, content that comes in
     [Superglobal arrays](#language.variables.superglobals),
     like [$_POST](#reserved.variables.post) and [$_GET](#reserved.variables.get) will remain
     as strings. PHP will not try to convert values to a specific type.
     In the example below, [$_GET["var1"]](#reserved.variables.get) will contain the
     string "null" and [$_GET["var2"]](#reserved.variables.get), the string "123".




/index.php?var1=null&amp;var2=123







    ### Historial de cambios









         Versión
         Descripción






         7.2.34, 7.3.23, 7.4.11

          Los *nombres* de las cookies entrantes ya no son con url-decoded
          por razones de seguridad.

























  # Constants

## Tabla de contenidos
- [Syntax](#language.constants.syntax)
- [Predefined constants](#language.constants.predefined)
- [Magic constants](#language.constants.magic)




   A constant is an identifier (name) for a simple value. As the name
   suggests, that value cannot change during the execution of the
   script (except for [
   magic constants](#language.constants.magic), which aren't actually constants).
   Constants are case-sensitive. By convention, constant
   identifiers are always uppercase.




  **Nota**:



    Prior to PHP 8.0.0, constants defined using the [define()](#function.define)
    function may be case-insensitive.






   The name of a constant follows the same rules as any label in PHP. A
   valid constant name starts with a letter or underscore, followed
   by any number of letters, numbers, or underscores. As a regular
   expression, it would be expressed thusly:
   ^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$




   It is possible to [define()](#function.define) constants with reserved or even
   invalid names, whose value can only be retrieved with the
   [constant()](#function.constant) function. However, doing so is not recommended.



  **Sugerencia**
 Eche un vistazo a [Guía de entorno de usuario para nombres](#userlandnaming).








    **Ejemplo #1 Valid and invalid constant names**



&lt;?php

// Valid constant names
define("FOO",     "something");
define("FOO2",    "something else");
define("FOO_BAR", "something more");

// Invalid constant names
define("2FOO",    "something");

// This is valid, but should be avoided:
// PHP may one day provide a magical constant
// that will break your script
define("__FOO__", "something");

?&gt;




  **Nota**:

    For our purposes here, a letter is a-z, A-Z, and the ASCII
    characters from 128 through 255 (0x80-0xff).






   Like [superglobals](#language.variables.predefined), the scope of a constant is global.
   Constants can be accessed from anywhere in a script without regard to scope.
   For more information on scope, read the manual section on
   [variable scope](#language.variables.scope).




  **Nota**:

    As of PHP 7.1.0, class constant may declare a visibility of protected
    or private, making them only available in the hierarchical scope of the
    class in which it is defined.






   ## Syntax


    Constants can be defined using the const keyword,
    or by using the [define()](#function.define)-function.
    While [define()](#function.define) allows a constant to be
    defined to an arbitrary expression, the const keyword has
    restrictions as outlined in the next paragraph.
    Once a constant is defined, it can never be
    changed or undefined.




    When using the const keyword,
    only scalar ([bool](#language.types.boolean), [int](#language.types.integer),
    [float](#language.types.float) and [string](#language.types.string)) expressions and constant
    [array](#language.types.array)s containing only scalar expressions are accepted.
    It is possible to define constants as a [resource](#language.types.resource),
    but it should be avoided, as it can cause unexpected results.




    The value of a constant is accessed simply by specifying its name.
    Unlike variables, a constant is *not* prepended
    with a $.
    It is also possible to use the [constant()](#function.constant) function to
    read a constant's value if the constant's name is obtained dynamically.
    Use [get_defined_constants()](#function.get-defined-constants) to get a list of
    all defined constants.




   **Nota**:

     Constants and (global) variables are in a different namespace.
     This implies that for example **[true](#constant.true)** and
     $TRUE are generally different.






    If an undefined constant is used an [Error](#class.error) is thrown.
    Prior to PHP 8.0.0, undefined constants would be interpreted as a bare
    word [string](#language.types.string), i.e. (CONSTANT vs "CONSTANT").
    This fallback is deprecated as of PHP 7.2.0, and an error of level
    **[E_WARNING](#constant.e-warning)** is issued when it happens.
    Prior to PHP 7.2.0, an error of level
    [E_NOTICE](#ref.errorfunc) has been issued instead.
    See also the manual entry on why
    [$foo[bar]](#language.types.array.foo-bar) is
    wrong (unless bar is a constant).
    This does not apply to [(fully) qualified constants](#language.namespaces.rules),
    which will always raise a [Error](#class.error) if undefined.




   **Nota**:

     To check if a constant is set, use the [defined()](#function.defined) function.






    These are the differences between constants and variables:



     -

       Constants do not have a dollar sign ($)
       before them;



     -

       Constants may be defined and accessed anywhere without regard
       to variable scoping rules;



     -

       Constants may not be redefined or undefined once they have been
       set; and



     -

       Constants may only evaluate to scalar values or arrays.










     **Ejemplo #1 Defining Constants**



&lt;?php
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // Emits an Error: Undefined constant "Constant"
               // Prior to PHP 8.0.0, outputs "Constant" and issues a warning.
?&gt;









     **Ejemplo #2 Defining Constants using the const keyword**



&lt;?php
// Simple scalar value
const CONSTANT = 'Hello World';

echo CONSTANT;

// Scalar expression
const ANOTHER_CONST = CONSTANT.'; Goodbye World';
echo ANOTHER_CONST;

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1]; // outputs "cat"

// Constant arrays
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // outputs "cat"
?&gt;





   **Nota**:



     As opposed to defining constants using [define()](#function.define),
     constants defined using the const keyword must be
     declared at the top-level scope because they are defined at compile-time.
     This means that they cannot be declared inside functions, loops,
     if statements or
     try/catch blocks.






    ### Ver también





      - [Class Constants](#language.oop5.constants)









   ## Predefined constants



    PHP provides a large number of [predefined constants](#reserved.constants) to any script
    which it runs. Many of these constants, however, are created by
    various extensions, and will only be present when those extensions
    are available, either via dynamic loading or because they have
    been compiled in.








   ## Magic constants


    There are nine magical constants that change depending on
    where they are used.  For example, the value of
    **[__LINE__](#constant.line)** depends on the line that it's
    used on in your script. All these "magical" constants are resolved
    at compile time, unlike regular constants, which are resolved at runtime.
    These special constants are case-insensitive and are as follows:







     <caption>**PHP's magic constants**</caption>



        Nombre
        Descripción






        **[__LINE__](#constant.line)**

         The current line number of the file.




        **[__FILE__](#constant.file)**

         The full path and filename of the file with symlinks resolved. If used inside an include,
         the name of the included file is returned.




        **[__DIR__](#constant.dir)**

         The directory of the file.  If used inside an include,
         the directory of the included file is returned. This is equivalent
         to dirname(__FILE__). This directory name
         does not have a trailing slash unless it is the root directory.




        **[__FUNCTION__](#constant.function)**

         The function name, or {closure} for anonymous functions.




        **[__CLASS__](#constant.class)**

         The class name. The class name includes the namespace
         it was declared in (e.g. Foo\Bar).
         When used
         in a trait method, __CLASS__ is the name of the class the trait
         is used in.




        **[__TRAIT__](#constant.trait)**

         The trait name. The trait name includes the namespace
         it was declared in (e.g. Foo\Bar).




        **[__METHOD__](#constant.method)**

         The class method name.




        **[__PROPERTY__](#constant.property)**

         Only valid inside a [property hook](#language.oop5.property-hooks).  It is equal to the name of the property.




        **[__NAMESPACE__](#constant.namespace)**

         The name of the current namespace.




        **ClassName::class**

         The fully qualified class name.










    ### Ver también





      - [::class](#language.oop5.basic.class.class)

      - [get_class()](#function.get-class)

      - [get_object_vars()](#function.get-object-vars)

      - [file_exists()](#function.file-exists)

      - [function_exists()](#function.function-exists)




















   # Expresiones



    La expresiones son los bloques de construcción más importantes de PHP. En PHP
    casi todo lo que se escribe es una expresión. La manera más simple
    y acertada de definir lo que es una expresión es «cualquier cosa que tiene
    un valor».




    Las formas más básicas de expresiones son las constantes y las variables.
    Cuando se escribe "$a = 5", se está asignando '5' a
    $a. '5', obviamente,
    tiene el valor 5, o en otras palabras, '5' es una expresión con el
    valor de 5 (en este caso, '5' es una constante entera).




    Después de esta asignación, se espera que el valor de $a sea 5
    también, por lo que si se escribe $b = $a, se espera que esto
    se comporte tal como si se escribiera $b = 5. En otras palabras,
    $a es también una expresión con el valor 5. Si todo funciona bien,
    esto es exactamente lo que sucederá.




    Un ejemplo de expresiones algo más complejo son las funciones. Por
    ejemplo, considere la siguiente función:




&lt;?php

function foo ()
{
    return 5;
}

?&gt;





    Asumiendo que está familiarizado con el concepto de función (si no lo está,
    échele una ojeada al capítulo sobre [funciones](#language.functions)), asumirá
    que escribir $c = foo() es esencialmente igual que
    escribir $c = 5. Y está en lo cierto. Las funciones
    son expresiones con el valor de sus valores devueltos. Ya que foo()
    devuelve 5, el valor de la expresión 'foo()' es 5. Normalmente
    las funciones no sólo devuelven un valor estático, sino que computan algo.




    Por supuesto, los valores en PHP no tienen que ser enteros, y con frecuencia
    no lo son. PHP soporta cuatro tipos de valores escalares: valores enteros ([integer](#language.types.integer)),
    valores de coma (punto) flotante ([float](#language.types.float)), valores de cadena ([string](#language.types.string))
    y valores booleanos ([boolean](#language.types.boolean)) - (valores escalares son aquellos que no se
    pueden descomponer en piezas más pequeñas, a diferencia de las matrices, por ejemplo). PHP también
    soporta dos tipos compuestos (no escalares): matrices (arrays) y objetos. Cada uno
    de estos tipos de valores pueden ser asignados a variables o devueltos desde funciones.




    PHP lleva las expresiones mucho más allá, de la misma manera que lo hacen otros
    lenguajes. PHP es un lenguaje orientado a expresiones, en el
    sentido de que casi todo es una expresión. Considere el
    ejemplo que ya hemos tratado, $a = 5. Es fácil de ver que
    aquí hay dos valores involucrados, el valor de la constante
    entera 5, y el valor de $a que ha sido actualizado a 5
    también. Aunque la verdad es que existe aquí un valor adicional
    involucrado, que es el valor de la asignación misma. La
    asignación evalúa al valor asignado, en este caso 5.
    En la práctica, esto significa que $a = 5, sin importar lo que haga,
    es una expresión con el valor 5. De este modo, escribir algo como
    $b = ($a = 5) es igual que escribir
    $a = 5; $b = 5; (el punto y coma
    marca el final de una sentencia). Ya que las asignaciones se analizan de
    derecha a izquierda, también se puede escribir $b = $a = 5.




    Otro buen ejemplo de orientación a expresiones es el pre- y
    post-incremento y decremento. Los usuarios de PHP y de otros muchos
    lenguajes pueden estar familiarizados con la notación variable++ y
    variable--. Éstos son los [
    operadores de incremento y decremento](#language.operators.increment). En PHP, al igual que en C, hay
    dos tipos de incrementos - pre-incremento y post-incremento.
    Ambos esencialmente incrementan la
    variable, y el efecto sobre la variable es idéntico. La
    diferencia está con el valor de la expresión de incremento.
    Pre-incremento, que se escribre ++$variable, evalúa al
    valor incrementado (PHP incrementa la variable antes de leer su
    valor, de ahí el nombre de 'pre-incremento'). Post-incremento, que se
    escribe $variable++ evalúa el valor original de
   $variable, antes de que sea incrementado (PHP incrementa la variable
    después de leer su valor, de ahí el nombre de 'post-incremento').




    Un tipo de expresiones muy comunes son las expresiones de [comparación](#language.operators.comparison).
    Estas expresiones evalúan si algo es **[false](#constant.false)** (falso) o **[true](#constant.true)** (verdadero). PHP
    soporta &gt; (mayor que), &gt;= (mayor o igual que), == (igual),
    != (distinto), &lt; (menor que) y &lt;= (menor o igual que).
    El lenguaje también soporta un conjunto de operadores de equivalencia estricta: ===
    (igual y del mismo tipo) y !== (diferente o de distinto tipo).
    Estas expresiones se usan mayormente dentro de ejecuciones condicionales,
    tales como la sentencia if.




    El último ejemplo de expresiones que trataremos aquí es una combinación
    de expresiones operador-asignación. Ya sabe que si
    quiere incrementar $a en 1, puede simplemente escribir
    $a++ o ++$a.
    Pero si lo que quiere es añadirle más de uno, por ejemplo 3,
    podría escribir $a++ varias veces, pero esto,
    obviamente, no es una manera muy eficiente o cómoda. Una práctica
    mucho más común es escribir $a =
    $a + 3. $a + 3 evalúa
    al valor de $a más 3, y se vuelve a asignar
    a $a, lo que resulta en incrementar $a
    en 3. En PHP, como en otros lenguajes como C, se puede escribir esto
    de una manera más abreviada, lo que con el tiempo se podría convertir en una forma más clara y rápida
    de entenderlo. Añadir 3 al valor actual de $a
    puede ser escrito $a += 3. Esto significa exactamente
    "toma el valor de $a, añádele 3 y asígnalo
    de nuevo a $a". Además de ser más corto y
    claro, también resulta en una ejecución más rápida. El valor de
    $a += 3, al igual que el valor de una asignación normal, es
    el valor asignado. Observe que NO es 3, sino el valor combinado
    de $a más 3 (éste es el valor que es
    asignado a $a). Se puede usar cualquier operador compuesto de dos partes
    en este modo de operador-asignación, por ejemplo $a -= 5
    (restar 5 del valor de $a), $b *= 7
    (multiplicar el valor de $b por 7), etc.




    Existe una expresión más que le puede parecer rara si no la ha visto
    en otros lenguajes, el operador condicional ternario:








&lt;?php
$primero ? $segundo : $tercero
?&gt;





    Si el valor de la primera subexpresión es **[true](#constant.true)** (no es cero),
    se evalúa la segunda subexpresión, y ése será el resultado de
    la expresión condicional. Si no, se evalúa la tercera
    subexpresión, y ése será el valor.




    El siguiente ejemplo debería ayudarle a comprender un poco mejor el pre- y
    post-incremento y las expresiones en general:








&lt;?php
function double($i)
{
    return $i*2;
}
$b = $a = 5;        /* asignar el valor cinco a la variable $a y $b */
$c = $a++;          /* post-incremento, asignar el valor original de $a
                       (5) a $c */
$e = $d = ++$b;     /* pre-incremento, asignar el valor incrementado de
                       $b (6) a $d y $e */

/* en este punto, $d y $e son iguales a 6 */

$f = double($d++);  /* asignar el doble del valor de $d antes
                       del incremento, 2*6 = 12, a $f */
$g = double(++$e);  /* asignar el doble del valor de $e después
                       del incremento, 2*7 = 14, a $g */
$h = $g += 10;      /* primero, $g es incrementado en 10 y finaliza con el
                       valor 24. El valor de la asignación (24) es
                       asignado después a $h, y $h finaliza también con el
                       valor 24. */
?&gt;





    Algunas expresiones pueden considerarse como sentencias. En
    este caso, una sentencia tiene la forma 'expr ;', es decir, una
    expresión seguida de un punto y coma. En $b = $a = 5;,
    $a = 5 es una expresión válida, pero no es una sentencia
    en sí. Sin embargo, $b = $a = 5; es una sentencia válida.




    Lo último que vale la pena mencionar es el valor verdadero de las expresiones.
    En muchos casos, principalmente en ejecuciones condicionales y bucles, no
    interesa saber el valor específico de la expresión, sino sólo
    si el valor significa **[true](#constant.true)** o **[false](#constant.false)**.



    Las constantes **[true](#constant.true)** y **[false](#constant.false)** (insensible a mayúsculas-minúsculas) son los
    dos valores booleanos posibles. Cuando es necesario, una expresión es
    convertida automáticamente al tipo boolean. Véase la
    [sección sobre
    conversión de tipos](#language.types.typecasting) para más detalles.




    PHP proporciona una implementación completa y potente de expresiones, y
    documentarla por completo va más allá del ámbito de este manual. Los
    ejemplos de arriba deberían darle una buena idea de lo que son las expresiones
    y cómo construir expresiones útiles. Durante el
    resto de este manual se escribirá expr
    para indicar cualquier expresión de PHP válida.














 # Los operadores

## Tabla de contenidos
- [Prioridad de los operadores](#language.operators.precedence)
- [Aritmética](#language.operators.arithmetic)
- [Incremento y decremento](#language.operators.increment)
- [Asignación](#language.operators.assignment)
- [Bitwise](#language.operators.bitwise)
- [Comparación](#language.operators.comparison)
- [Control de errores](#language.operators.errorcontrol)
- [Ejecución](#language.operators.execution)
- [Lógica](#language.operators.logical)
- [String](#language.operators.string)
- [Arrays](#language.operators.array)
- [Tipo](#language.operators.type)
- [Funcional](#language.operators.functional)



  Un operador es algo que toma uno o más valores (o
  expresiones, en la jerga de la programación) y que produce otro valor (por lo tanto,
  la construcción misma se convierte en una expresión).




  Los operadores pueden ser agrupados según el número de valores que aceptan. El operador unario
  opera solo sobre un valor, por ejemplo ! (el
  [operador de negación](#language.operators.logical)) o
  ++ (el
  [operador de incremento](#language.operators.increment)).
  Los operadores binarios toman dos valores, como los tan conocidos
  [operadores aritméticos](#language.operators.arithmetic)
  + (más) y - (menos), y la
  mayoría de los operadores PHP entran en esta categoría. Finalmente, hay un
  único [operador
  ternario](#language.operators.comparison.ternary), ? :, que acepta tres valores; Esto se
  suele denominar simplemente "operador ternario" (aunque quizá podría
  llamarse más apropiadamente "operador condicional").




  Una lista completa de los operadores de PHP se encuentra en la sección
  [precedencia de los operadores](#language.operators.precedence).
  Esta sección también explica la precedencia de los operadores y la asociatividad,
  que indican exactamente cómo se evalúan las expresiones que contienen varios
  operadores diferentes.








 ## La prioridad de los operadores



  La prioridad de los operadores especifica el orden en el que deben ser analizadas las valores.
  Por ejemplo, en la expresión 1 + 5 * 3, el resultado es
  16 y no 18, ya que la multiplicación ("*") tiene una prioridad superior a la suma ("+").
  Las parentesis pueden ser utilizados para forzar la prioridad, si es necesario. Por ejemplo: (1 + 5) * 3 dará
  18.




  Cuando los operadores tienen una prioridad igual, su asociatividad decide la forma en que los operadores son agrupados. Por ejemplo,
  "-" es una asociatividad por la izquierda, así 1 - 2 - 3 es agrupado de esta manera (1 - 2) - 3 y será evaluado
  a -4. Por otro lado, "=" es una asociatividad por la derecha, así, $a = $b = $c es agrupado de esta manera
  $a = ($b = $c).





  Los operadores, cuya prioridad es igual, que no son asociativos, no pueden ser utilizados entre ellos, por ejemplo,
  1 &lt; 2 &gt; 1 está prohibido en PHP. La expresión
  1 &lt;= 1 == 1 por el contrario, está permitida, ya que el operador
  == tiene una precedencia inferior al operador
  &lt;=.




  La asociatividad tiene sentido únicamente para los operadores binarios (y ternarios).
  Los operadores unitarios son prefijos o sufijos, por lo que esta noción no es aplicable. Por ejemplo !!$a puede ser agrupado únicamente de la siguiente manera !(!$a).




  El uso de parentesis, incluso cuando no son necesarios, permite mejorar la legibilidad del código realizando agrupamientos explícitos en lugar de imaginar la prioridad de los operadores y sus asociatividades.




  La tabla siguiente lista los operadores por orden de prioridad, con la prioridad más alta en la parte superior. Los operadores en la misma línea tienen una prioridad equivalente (por lo tanto, la asociatividad decide el agrupamiento).



   <caption>**Prioridad de los operadores**</caption>



      Asociatividad
      Operadores
      Información adicional






      (n/a)

       clone
       new

      [clone](#language.oop5.cloning) y [new](#language.oop5.basic.new)



      derecha
      **
      [aritmética](#language.operators.arithmetic)



      (n/a)

       +
       -
       ++
       --
       ~
       (int)
       (float)
       (string)
       (array)
       (object)
       (bool)
       @


       [aritmética](#language.operators.arithmetic) (unario + y -),
       [incremento/decremento](#language.operators.increment)
       [a nivel de bits](#language.operators.bitwise),
       [conversión de tipo](#language.types.typecasting) y
       [control de errores](#language.operators.errorcontrol)




      izquierda
      instanceof

       [tipo](#language.operators.type)




      (n/a)
      !

       [lógico](#language.operators.logical)




      izquierda

       *
       /
       %


       [aritmética](#language.operators.arithmetic)




      izquierda

       +
       -
       .


       [aritmética](#language.operators.arithmetic)
       (binario + y -),
       [array](#language.operators.array) y
       [string](#language.operators.string)
       (. anterior a PHP 8.0.0)




      izquierda

       &lt;&lt;
       &gt;&gt;


       [bitwise](#language.operators.bitwise)




      izquierda
      .

       [string](#language.operators.string) (a partir de PHP 8.0.0)




      no asociativo

       &lt;
       &lt;=
       &gt;
       &gt;=


       [comparación](#language.operators.comparison)




      no asociativo

       ==
       !=
       ===
       !==
       &lt;&gt;
       &lt;=&gt;


       [comparación](#language.operators.comparison)




      izquierda
      &amp;

       [bitwise](#language.operators.bitwise) y
       [referencias](#language.references)



      izquierda
      ^

       [bitwise](#language.operators.bitwise)




      izquierda
      |

       [bitwise](#language.operators.bitwise)




      izquierda
      &amp;&amp;

       [lógico](#language.operators.logical)




      izquierda
      ||

       [lógico](#language.operators.logical)




      derecha
      ??

       [coalescencia nula](#language.operators.comparison.coalesce)




      no asociativo
      ? :

       [ternario](#language.operators.comparison.ternary)
       (izquierda--asociativo anterior a PHP 8.0.0)




      derecha

       =
       +=
       -=
       *=
       **=
       /=
       .=
       %=
       &amp;=
       |=
       ^=
       &lt;&lt;=
       &gt;&gt;=
       ??=


       [asignación](#language.operators.assignment)




      (n/a)
      yield from

       [yield from](#control-structures.yield.from)




      (n/a)
      yield

       [yield](#control-structures.yield)




      (n/a)
      print
      [print](#function.print)



      izquierda
      and

       [lógico](#language.operators.logical)




      izquierda
      xor

       [lógico](#language.operators.logical)




      izquierda
      or

       [lógico](#language.operators.logical)












   **Ejemplo #1 Asociatividad**



    &lt;?php
$a = 3 * 3 % 5; // (3 * 3) % 5 = 4
// La asociatividad de los operadores ternarios difiere de C/C++
var_dump($a);

$a = 1;
$b = 2;
$a = $b += 3; // $a = ($b += 3) -&gt; $a = 5, $b = 5
var_dump($a, $b);
?&gt;





  El operador ternario requiere específicamente el uso de parentesis para levantar la ambigüedad de la prioridad.







   **Ejemplo #2 Precedencia explícita**



&lt;?php
$a = true ? 0 : (true ? 1 : 2);
var_dump($a);

// Esto ya no está permitido a partir de PHP 8
// $a = true ? 0 : true ? 1 : 2;
?&gt;





  La prioridad y la asociatividad del operador determinan únicamente la forma en que las expresiones son agrupadas; no especifican el orden de la evaluación. PHP no especifica (de manera general) el orden en que una expresión es evaluada y el código que asume un orden específico de evaluación no debería existir, ya que el comportamiento puede cambiar entre las diferentes versiones de PHP o según el código circundante.



   **Ejemplo #3 Orden de evaluación indefinido**



    &lt;?php
$a = 1;
echo $a + $a++; // puede mostrar 2 o 3

$i = 1;
$array[$i] = $i++; // puede definir el índice 1 o 2
?&gt;




   **Ejemplo #4 Precedencia de +, - y .**



&lt;?php
$x = 4;

// Esta línea puede causar una salida inesperada :
echo "x menos uno es igual a" . $x-1 . ", en todo caso espero\n";

// la precedencia deseada puede ser reforzada utilizando parentesis. :
echo "x menos uno es igual a" . ($x-1) . ", en todo caso espero\n";

// Esto no está permitido, y levanta una TypeError :
echo ("x menos uno es igual a" . $x) - 1 . ", en todo caso espero\n";
?&gt;


   El ejemplo anterior mostrará:




-1, en todo caso espero
-1, en todo caso espero
Fatal error: Uncaught TypeError: Unsupported operand types: string - int




   **Ejemplo #5 Antes de PHP 8, +, - y . tenían la misma precedencia**



&lt;?php
$x = 4;
// Esta línea puede causar una salida inesperada :
echo "x menos uno es igual a" . $x-1 . ", en todo caso espero\n";

// porque es evaluada como la línea siguiente (anterior a PHP 8.0.0) :
echo (("x menos uno es igual a" . $x) - 1) . ", en todo caso espero\n";

// la precedencia deseada puede ser reforzada utilizando parentesis. :
echo "x menos uno es igual a" . ($x-1) . ", en todo caso espero\n";

?&gt;


   El ejemplo anterior mostrará:




-1, en todo caso espero
-1, en todo caso espero
x menos uno es igual 3, en todo caso espero




 **Nota**:



   Aunque = tiene prioridad sobre la mayoría de los operadores, PHP ejecutará expresiones como: if (!$a = foo()).
   En esta situación, el resultado de foo() será colocado en la variable $a.





  ### Historial de cambios





      Versión
      Descripción






      8.0.0

       La concatenación de strings (.) ahora tiene una precedencia más baja que la suma/resta aritmética
       (+ y -) y los desplazamientos bit a bit izquierda/derecha (&lt;&lt; y &gt;&gt;);
       anteriormente, esto tenía la misma precedencia que + y -, y una precedencia más alta que &lt;&lt; y &gt;&gt;.




      8.0.0

       El operador ternario (? :) ahora es no asociativo; anteriormente, era asociativo por la izquierda.




      7.4.0

       Dependencia de la precedencia de la concatenación de strings
       (.) relativo a la suma/resta aritmética
       (+ o -) o los desplazamientos bit a bit izquierda/derecha (&lt;&lt; o &gt;&gt;),
       es decir, su uso conjunto en una expresión sin parentesis, está obsoleto.




      7.4.0

       Dependencia de la asociatividad por la izquierda del operador ternario (? :),
       es decir, la imbricación de múltiples operadores ternarios que no están entre parentesis, está obsoleta.
















 ## Los operadores aritméticos



  ¿Recuerda las operaciones elementales aprendidas en la escuela? Los operadores aritméticos funcionan de la misma manera.




  <caption>**Operaciones elementales**</caption>



     Ejemplo
     Nombre
     Resultado






     +$a
     Identidad
     Conversión de $a a [int](#language.types.integer) o [float](#language.types.float),
      según lo más apropiado.




     -$a
     Negación
     Opuesto de $a.



     $a + $b
     Adición
     Suma de $a y $b.



     $a - $b
     Sustracción

      Diferencia de $a y $b.




     $a * $b
     Multiplicación
     Producto de $a y $b.



     $a / $b
     División

      Cociente de $a y $b.




     $a % $b
     Módulo

      Resto de $a dividido por $b.




     $a ** $b
     Exponenciación
     Resultado de elevar $a a la potencia
      $b.







  El operador de división / devuelve un valor [float](#language.types.float)
  a menos que ambos operandos sean de tipo [int](#language.types.integer) (o
  [strings numéricos](#language.types.numeric-strings)
  que se convierten en [int](#language.types.integer)) y que el numerador sea un múltiplo
  del divisor, en cuyo caso se devolverá un valor entero.
  Para la división entera, ver [intdiv()](#function.intdiv).
  [intdiv()](#function.intdiv).




  Los operandos del módulo se convierten en [int](#language.types.integer) antes de la ejecución.
  Para el módulo en números decimales, ver [fmod()](#function.fmod).




  El resultado de la operación módulo % tiene el mismo signo que
  el primer operando, por lo que el resultado de $a % $b tendrá el signo de
  $a. Por ejemplo:



   **Ejemplo #1 El Operador Módulo**



&lt;?php

var_dump(5 % 3);
var_dump(5 % -3);
var_dump(-5 % 3);
var_dump(-5 % -3);

?&gt;


   El ejemplo anterior mostrará:




int(2)
int(2)
int(-2)
int(-2)





  ### Ver también





    - [Las funciones matemáticas](#ref.math)












 ## Operadores de incremento y decremento



  PHP soporta los operadores de pre- y post- incremento y decremento.
  Estos operadores unaires permiten aumentar o disminuir la valor de un.




  <caption>**Operadores de incremento y decremento**</caption>



     Ejemplo
     Nombre
     Resultado






     ++$a
     Pre-incrementa

      Incrementa $a en 1, luego retorna
      $a.




     $a++
     Post-incrementa
     Retorna $a, luego incrementa $a en 1.



     --$a
     Pre-decrementa

      Decrementa $a en 1, luego retorna
      $a.




     $a--
     Post-decrementa

      Retorna $a, luego decrementa
      $a en 1.









  A continuación, se presenta un ejemplo simple:



   **Ejemplo #1 Ejemplos de incremento/decremento**



&lt;?php
echo 'Post-incremento:', PHP_EOL;
$a = 5;
var_dump($a++);
var_dump($a);
echo 'Pre-incremento:', PHP_EOL;
$a = 5;
var_dump(++$a);
var_dump($a);
echo 'Post-decremento:', PHP_EOL;
$a = 5;
var_dump($a--);
var_dump($a);
echo 'Pre-decremento:';
$a = 5;
var_dump(--$a);
var_dump($a);
?&gt;


   El ejemplo anterior mostrará:




Post-incremento:
int(5)
int(6)
Pre-incremento:
int(6)
int(6)
Post-decremento:
int(5)
int(4)
Pre-decremento:
int(4)
int(4)



  **Advertencia**

    Los operadores de incremento y decremento no tienen ningún efecto sobre los valores
    de tipo [bool](#language.types.boolean).
    Un **[E_WARNING](#constant.e-warning)** es emitido a partir de PHP 8.3.0,
    ya que esto convertirá implícitamente el valor en [int](#language.types.integer) en el futuro.




    El operador de decremento no tiene ningún efecto sobre los valores
    de tipo [null](#language.types.null).
    Un **[E_WARNING](#constant.e-warning)** es emitido a partir de PHP 8.3.0,
    ya que esto convertirá implícitamente el valor en [int](#language.types.integer) en el futuro.




    El operador de decremento no tiene ningún efecto sobre los strings no numéricos.
    Un **[E_WARNING](#constant.e-warning)** es emitido a partir de PHP 8.3.0,
    ya que una [TypeError](#class.typeerror) será levantada en el futuro.




  **Nota**:



    Los objetos internos que soportan la sobrecarga de la adición y/o la sustracción
    pueden ser incrementados y/o decrementados asimismo.
    Un objeto interno de este tipo es [GMP](#class.gmp).







  ### Funcionalidad de incremento de strings PERL

  **Advertencia**

    Esta funcionalidad es deprecada de manera suave a partir de PHP 8.3.0.
    La función [str_increment()](#function.str-increment) debe ser utilizada en su lugar.






   Es posible incrementar un
   [string no numérico](#language.types.numeric-strings)
   en PHP. El string debe ser un string ASCII alfanumérico.
   Esto incrementa las letras hasta la siguiente letra, y cuando se alcanza la letra
   Z, el incremento se reporta al valor a la izquierda.
   Por ejemplo, $a = 'Z'; $a++; transforma $a
   en 'AA'.





   **Ejemplo #2 Ejemplo de incremento de string PERL**



&lt;?php
echo '== Strings alfabéticos ==' . PHP_EOL;
$s = 'W';
for ($n=0; $n&lt;6; $n++) {
    echo ++$s . PHP_EOL;
}
// Los strings alfanuméricos se comportan de manera diferente
echo '== Caracteres digitales ==' . PHP_EOL;
$d = 'A8';
for ($n=0; $n&lt;6; $n++) {
    echo ++$d . PHP_EOL;
}
$d = 'A08';
for ($n=0; $n&lt;6; $n++) {
    echo ++$d . PHP_EOL;
}
?&gt;


   El ejemplo anterior mostrará:




== Strings alfabéticos ==
X
Y
Z
AA
AB
AC
== Strings alfanuméricos ==
A9
B0
B1
B2
B3
B4
A09
A10
A11
A12
A13
A14



  **Advertencia**

    Si el string alfanumérico puede ser interpretado como un
    [string numérico](#language.types.numeric-strings),
    será convertido en [int](#language.types.integer) o en [float](#language.types.float).
    Esto es particularmente problemático con los strings que se asemejan a números de punto flotante
    escritos en notación exponencial.
    La función [str_increment()](#function.str-increment) no sufre de
    estas conversiones de tipo implícitas.




    **Ejemplo #3 Conversión de string alfanumérico a flotante**



&lt;?php
$s = "5d9";
var_dump(++$s);
var_dump(++$s);
?&gt;


    El ejemplo anterior mostrará:




string(3) "5e0"
float(6)



     Esto se debe a que el valor "5e0" es interpretado
     como un [float](#language.types.float) y convertido en el valor 5.0
     antes de ser incrementado.














 ## Los operadores de asignación



  El operador de asignación más simple es el signo "=".
  El primer reflejo es pensar que este signo significa
  "igual a". No es el caso. Significa que
  el operando de la izquierda se ve asignado el valor de
  la expresión que está a la derecha del signo igual.




  El valor de una expresión de asignación es el valor
  asignado. Por ejemplo, el valor de la expresión
  '$a = 3' es el valor 3. Esto permite utilizar
  trucos tales como:



   **Ejemplo #1 Asignaciones anidadas**



&lt;?php
$a = ($b = 4) + 5;
// $a ahora es igual a 9, y $b vale 4.
var_dump($a);
?&gt;





  Además del simple operador de asignación, existen
  "operadores combinados" para todos los operadores
  [aritméticos](#language.operators),
  la unión de arrays y para los operadores sobre los strings.
  Esto permite utilizar el valor de una variable en una expresión y
  asignar el resultado de esta expresión a esta variable.
  Por ejemplo:



   **Ejemplo #2 Asignaciones Combinadas**



&lt;?php
$a = 3;
$a += 5; // asigna el valor 8 a la variable $a corresponde a la instrucción '$a = $a + 5';
$b = "Hola ";
$b .= " a todos!";  // asigna el valor "Hola a todos!" a
                          //  la variable $b
                          //  idéntico a $b = $b." a todos!";

var_dump($a, $b);
?&gt;





  Se puede observar que la asignación copia el contenido de la variable original
  en la nueva variable (asignación por valor), lo que hace que los
  cambios de valor de una variable no modificarán el valor de
  la otra. Esto puede ser importante al copiar un gran array
  durante un bucle.




  Una excepción al comportamiento de asignación por valor en PHP es el tipo
  [object](#language.types.object), estos son asignados por referencia.
  La copia de objeto debe ser explícitamente solicitada gracias al mot-clé
  [clone](#language.oop5.cloning).





  ### Asignación por referencia


   La asignación por referencia también es soportada, mediante la sintaxis
   "$var = &amp;$othervar;". La asignación por
   referencia significa que las dos variables apuntan al mismo contenedor de
   datos, nada es copiado en ningún lugar.







    **Ejemplo #3 Asignación por referencia**



&lt;?php
$a = 3;
$b = &amp;$a; // $b es una referencia a $a

print "$a\n"; // muestra 3
print "$b\n"; // muestra 3

$a = 4; // cambia $a

print "$a\n"; // muestra 4
print "$b\n"; // muestra 4 también, porque $b es una referencia a $a, que ha sido
              // cambiada
?&gt;





   El operador [new](#language.oop5.basic.new)
   devuelve una referencia automáticamente, por lo tanto, asignar el resultado de
   [new](#language.oop5.basic.new) por referencia es un error







    **Ejemplo #4 Nuevo operador por referencia**



&lt;?php
class C {}

$o = &amp;new C;
?&gt;


    El ejemplo anterior mostrará:




Parse error: syntax error, unexpected token ";", expecting "("





   Más información sobre las referencias y sus usos posibles pueden ser
   encontrados en la sección del manual [Las referencias
   explicadas](#language.references).






  ### Los operadores de asignación aritméticos





      Ejemplo
      Equivalente
      Operación






      $a += $b
      $a = $a + $b
      Adición



      $a -= $b
      $a = $a - $b
      Sustracción



      $a *= $b
      $a = $a * $b
      Multiplicación



      $a /= $b
      $a = $a / $b
      División



      $a %= $b
      $a = $a % $b
      Módulo



      $a **= $b
      $a = $a ** $b
      Exponenciación









  ### Operadores de asignación bits a bits





      Ejemplo
      Equivalente
      Operación






      $a &amp;= $b
      $a = $a &amp; $b
      Operador And



      $a |= $b
      $a = $a | $b
      Operador Or



      $a ^= $b
      $a = $a ^ $b
      Operador Xor



      $a &lt;&lt;= $b
      $a = $a &lt;&lt; $b
      Desplazamiento a la izquierda



      $a &gt;&gt;= $b
      $a = $a &gt;&gt; $b
      Desplazamiento a la derecha









  ### Otros operadores de asignación





      Ejemplo
      Equivalente
      Operación






      $a .= $b
      $a = $a . $b
      Concatenación de un string



      $a ??= $b
      $a = $a ?? $b
      Operador de coalescencia nul









  ### Ver también





    - [los operadores aritméticos](#language.operators.arithmetic)

    - [los operadores bits a bits](#language.operators.bitwise)

    - [los operadores de coalescencia nul](#language.operators.comparison.coalesce)












 ## Operadores a nivel de bits



  Los operadores a nivel de bits permiten manipular los bits en un entero.




  <caption>**Los operadores a nivel de bits**</caption>



     Ejemplo
     Nombre
     Resultado






     **$a &amp; $b**
     And (Y)

      Los bits posicionados a 1 en $a Y en
      $b son posicionados a 1.




     **$a | $b**
     Or (O)

      Los bits posicionados a 1 en $a O $b
      son posicionados a 1.




     **$a ^ $b**
     Xor (o exclusivo)

      Los bits posicionados a 1 en $a O en
      $b pero no en los dos son posicionados a 1.




     **~ $a**
     Not (No)

      Los bits que están posicionados a 1 en $a
      son posicionados a 0, y viceversa.




     **$a &lt;&lt; $b**
     Desplazamiento a la izquierda

      Desplaza los bits de $a, $b veces
      a la izquierda (cada desplazamiento equivale a una multiplicación por 2).




     **$a &gt;&gt; $b**
     Desplazamiento a la derecha

      Desplaza los bits de $a, $b veces
      a la derecha (cada desplazamiento equivale a una división por 2).








  El desplazamiento de bits en PHP es aritmético.
  Los bits que son desplazados fuera del entero se pierden.
  Los desplazamientos a la izquierda hacen aparecer ceros a la derecha,
  mientras que el bit de signo es desplazado a la izquierda, lo que significa
  que el signo del entero no es preservado.
  Los desplazamientos a la derecha desplazan también el bit de signo a la
  derecha, lo que significa que el signo es preservado.





  Utilícense paréntesis para asegurarse de que la
  [precedencia](#language.operators.precedence)
  deseada sea aplicada correctamente. Por ejemplo,
  $a &amp; $b == true aplica primero
  la igualdad, y luego el AND lógico, mientras que
  ($a &amp; $b) == true aplica primero el
  AND lógico, y luego la igualdad.





  Si los dos operandos para los operadores &amp;,
  | y ^ son strings,
  entonces la operación será realizada sobre los valores ASCII de los caracteres y el
  resultado será un string. En todos los otros casos, los dos operandos serán
  [convertidos en entero](#language.types.integer.casting)
  y el resultado será un entero.




  Si el operando para el operador ~ es un string,
  la operación será realizada sobre los caracteres ASCII que componen el string y el
  resultado será un string. De lo contrario, el operando y el resultado serán tratados como enteros.




  Los operandos y el resultado de los operadores &lt;&lt; y
  &gt;&gt; son tratados como enteros.




  El informe de errores de PHP utiliza campos de bits,
  que son una ilustración de la extinción de bits.
  Para mostrar los errores, excepto las notificaciones, las
  instrucciones del php.ini son :
  **E_ALL &amp; ~E_NOTICE**












     Esto se comprende comparando con E_ALL :
     00000000000000000111011111111111
     Luego, apagando el valor de E_NOTICE...
     00000000000000000000000000001000
     ... y invirtiéndolo a través de ~:
     11111111111111111111111111110111
     Finalmente, se utiliza el AND lógico (&amp;) para leer los bits activados
     en las dos valores :
     00000000000000000111011111110111









  Otro medio de llegar a este resultado es utilizar
  el OU exclusivo (^), que busca
  los bits que están activados solo en una de las
  dos valores, exclusivamente :
  **E_ALL ^ E_NOTICE**




  error_reporting también puede ser utilizado para
  ilustrar la activación de bits. Para mostrar
  únicamente los errores y los errores recuperables,
  se utiliza :
  **E_ERROR | E_RECOVERABLE_ERROR**











     Este enfoque combina E_ERROR
     00000000000000000000000000000001
     y E_RECOVERABLE_ERROR
     00000000000000000001000000000000
     Con el operador OR (|) para asegurarse de
     que los bits están activados en una de las dos valores :
     00000000000000000001000000000001








   **Ejemplo #1 Operaciones sobre bits y enteros**



&lt;?php
/*
 * Ignórese esta parte,
 * es solo formato para clarificar los resultados
 */

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";

echo &lt;&lt;&lt;EOH
 ---------     ---------  -- ---------
 resultado       valor        prueba
 ---------     ---------  -- ---------
EOH;


/*
 * Aquí están los ejemplos
 */

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n AND a nivel de bits \n";
foreach ($values as $value) {
    $result = $value &amp; $test;
    printf($format, $result, $value, '&amp;', $test);
}

echo "\n OR inclusivo a nivel de bits \n";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}

echo "\n OR exclusivo a nivel de bits (XOR) \n";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}
?&gt;


   El ejemplo anterior mostrará:




---------     ---------  -- ---------
 resultado       valor        prueba
 ---------     ---------  -- ---------
 AND a nivel de bits
( 0 = 0000) = ( 0 = 0000) &amp; ( 5 = 0101)
( 1 = 0001) = ( 1 = 0001) &amp; ( 5 = 0101)
( 0 = 0000) = ( 2 = 0010) &amp; ( 5 = 0101)
( 4 = 0100) = ( 4 = 0100) &amp; ( 5 = 0101)
( 0 = 0000) = ( 8 = 1000) &amp; ( 5 = 0101)

 OR inclusivo a nivel de bits
( 5 = 0101) = ( 0 = 0000) | ( 5 = 0101)
( 5 = 0101) = ( 1 = 0001) | ( 5 = 0101)
( 7 = 0111) = ( 2 = 0010) | ( 5 = 0101)
( 5 = 0101) = ( 4 = 0100) | ( 5 = 0101)
(13 = 1101) = ( 8 = 1000) | ( 5 = 0101)

 OR exclusivo a nivel de bits (XOR)
( 5 = 0101) = ( 0 = 0000) ^ ( 5 = 0101)
( 4 = 0100) = ( 1 = 0001) ^ ( 5 = 0101)
( 7 = 0111) = ( 2 = 0010) ^ ( 5 = 0101)
( 1 = 0001) = ( 4 = 0100) ^ ( 5 = 0101)
(13 = 1101) = ( 8 = 1000) ^ ( 5 = 0101)








   **Ejemplo #2 Operación sobre bits y strings**



&lt;?php
echo 12 ^ 9, PHP_EOL; // Muestra '5'

echo "12" ^ "9", PHP_EOL; // Muestra el carácter de borrado (ascii 8)
                 // ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8

echo "hallo" ^ "hello", PHP_EOL; // Muestra los valores ASCII #0 #4 #0 #0 #0
                        // 'a' ^ 'e' = #4

echo 2 ^ "3", PHP_EOL; // Muestra 1
              // 2 ^ ((int) "3") == 1

echo "2" ^ 3, PHP_EOL; // Muestra 1
              // ((int) "2") ^ 3 == 1
?&gt;








   **Ejemplo #3 Desplazamiento de bits sobre enteros**



&lt;?php
/*
 * Aquí están algunos ejemplos
 */

echo "\n--- Desplazamientos a la derecha sobre enteros positivos ---\n";

$val = 4;
$places = 1;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'copia del bit de signo ahora a la izquierda');

$val = 4;
$places = 2;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places);

$val = 4;
$places = 3;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'bits salieron por la derecha');

$val = 4;
$places = 4;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'mismo resultado que arriba: no hay desplazamiento más allá de 0');


echo "\n--- Desplazamientos a la derecha sobre enteros negativos ---\n";

$val = -4;
$places = 1;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'copia del bit de signo ahora a la izquierda');

$val = -4;
$places = 2;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'bits salieron por la derecha');

$val = -4;
$places = 3;
$res = $val &gt;&gt; $places;
p($res, $val, '&gt;&gt;', $places, 'mismo resultado que arriba: no hay desplazamiento más allá de -1');


echo "\n--- Desplazamientos a la izquierda sobre enteros positivos ---\n";

$val = 4;
$places = 1;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places, 'complemento de ceros a la derecha');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 4;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places);

$val = 4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places, 'el bit de signo salió');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places, 'bits salieron a la izquierda');


echo "\n--- Desplazamientos a la izquierda sobre enteros negativos ---\n";

$val = -4;
$places = 1;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places, 'complemento de ceros a la derecha');

$val = -4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places);

$val = -4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val &lt;&lt; $places;
p($res, $val, '&lt;&lt;', $places, 'bits salieron a la izquierda, incluyendo el bit de signo');


/*
 * Ignórese esta sección
 * Contiene código para el formato de este ejemplo
 */

function p($res, $val, $op, $places, $note = '') {
    $format = '%0' . (PHP_INT_SIZE * 8) . "b\n";

    printf("Expresión : %d = %d %s %d\n", $res, $val, $op, $places);

    echo " Decimal :\n";
    printf("  val=%d\n", $val);
    printf("  res=%d\n", $res);

    echo " Binario :\n";
    printf('  val=' . $format, $val);
    printf('  res=' . $format, $res);

    if ($note) {
        echo " Nota : $note\n";
    }

    echo "\n\n";
}
?&gt;


   Resultado del ejemplo anterior en una máquina de 32 bits:





--- Desplazamientos a la derecha sobre enteros positivos ---
Expresión : 2 = 4 &gt;&gt; 1
 Decimal :
  val=4
  res=2
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000000010
 Nota : copia del bit de signo ahora a la izquierda

Expresión : 1 = 4 &gt;&gt; 2
 Decimal :
  val=4
  res=1
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000000001

Expresión : 0 = 4 &gt;&gt; 3
 Decimal :
  val=4
  res=0
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000000000
 Nota : bits salieron por la derecha

Expresión : 0 = 4 &gt;&gt; 4
 Decimal :
  val=4
  res=0
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000000000
 Nota : mismo resultado que arriba: no hay desplazamiento más allá de 0


--- Desplazamientos a la derecha sobre enteros negativos ---
Expresión : -2 = -4 &gt;&gt; 1
 Decimal :
  val=-4
  res=-2
 Binario :
  val=11111111111111111111111111111100
  res=11111111111111111111111111111110
 Nota : copia del bit de signo a la izquierda

Expresión : -1 = -4 &gt;&gt; 2
 Decimal :
  val=-4
  res=-1
 Binario :
  val=11111111111111111111111111111100
  res=11111111111111111111111111111111
 Nota : bits salieron por la derecha

Expresión : -1 = -4 &gt;&gt; 3
 Decimal :
  val=-4
  res=-1
 Binario :
  val=11111111111111111111111111111100
  res=11111111111111111111111111111111
 Nota : mismo resultado que arriba: no hay desplazamiento más allá de -1


--- Desplazamientos a la izquierda sobre enteros positivos ---
Expresión : 8 = 4 &lt;&lt; 1
 Decimal :
  val=4
  res=8
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000001000
 Nota : complemento de ceros a la derecha

Expresión : 1073741824 = 4 &lt;&lt; 28
 Decimal :
  val=4
  res=1073741824
 Binario :
  val=00000000000000000000000000000100
  res=01000000000000000000000000000000

Expresión : -2147483648 = 4 &lt;&lt; 29
 Decimal :
  val=4
  res=-2147483648
 Binario :
  val=00000000000000000000000000000100
  res=10000000000000000000000000000000
 Nota : el bit de signo salió

Expresión : 0 = 4 &lt;&lt; 30
 Decimal :
  val=4
  res=0
 Binario :
  val=00000000000000000000000000000100
  res=00000000000000000000000000000000
 Nota : bits salieron a la izquierda


--- Desplazamientos a la izquierda sobre enteros negativos ---
Expresión : -8 = -4 &lt;&lt; 1
 Decimal :
  val=-4
  res=-8
 Binario :
  val=11111111111111111111111111111100
  res=11111111111111111111111111111000
 Nota : complemento de ceros a la derecha

Expresión : -2147483648 = -4 &lt;&lt; 29
 Decimal :
  val=-4
  res=-2147483648
 Binario :
  val=11111111111111111111111111111100
  res=10000000000000000000000000000000

Expresión : 0 = -4 &lt;&lt; 30
 Decimal :
  val=-4
  res=0
 Binario :
  val=11111111111111111111111111111100
  res=00000000000000000000000000000000
 Nota : bits salieron a la izquierda, incluyendo el bit de signo


   Resultado del ejemplo anterior en una máquina de 64 bits:





--- Desplazamientos a la derecha sobre enteros positivos ---
Expresión : 2 = 4 &gt;&gt; 1
 Decimal :
  val=4
  res=2
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000000010
 Nota : copia del bit de signo ahora a la izquierda

Expresión : 1 = 4 &gt;&gt; 2
 Decimal :
  val=4
  res=1
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000000001

Expresión : 0 = 4 &gt;&gt; 3
 Decimal :
  val=4
  res=0
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000000000
 Nota : bits salieron por la derecha

Expresión : 0 = 4 &gt;&gt; 4
 Decimal :
  val=4
  res=0
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000000000
 Nota : mismo resultado que arriba: no hay desplazamiento más allá de 0


--- Desplazamientos a la derecha sobre enteros negativos ---
Expresión : -2 = -4 &gt;&gt; 1
 Decimal :
  val=-4
  res=-2
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=1111111111111111111111111111111111111111111111111111111111111110
 Nota : copia del bit de signo ahora a la izquierda

Expresión : -1 = -4 &gt;&gt; 2
 Decimal :
  val=-4
  res=-1
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=1111111111111111111111111111111111111111111111111111111111111111
 Nota : bits salieron por la derecha

Expresión : -1 = -4 &gt;&gt; 3
 Decimal :
  val=-4
  res=-1
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=1111111111111111111111111111111111111111111111111111111111111111
 Nota : mismo resultado que arriba: no hay desplazamiento más allá de -1


--- Desplazamiento a la izquierda sobre enteros negativos ---
Expresión : 8 = 4 &lt;&lt; 1
 Decimal :
  val=4
  res=8
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000001000
 Nota : complemento de ceros a la derecha

Expresión : 4611686018427387904 = 4 &lt;&lt; 60
 Decimal :
  val=4
  res=4611686018427387904
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0100000000000000000000000000000000000000000000000000000000000000

Expresión : -9223372036854775808 = 4 &lt;&lt; 61
 Decimal :
  val=4
  res=-9223372036854775808
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=1000000000000000000000000000000000000000000000000000000000000000
 Nota : el bit de signo salió

Expresión : 0 = 4 &lt;&lt; 62
 Decimal :
  val=4
  res=0
 Binario :
  val=0000000000000000000000000000000000000000000000000000000000000100
  res=0000000000000000000000000000000000000000000000000000000000000000
 Nota : bits salieron a la izquierda


--- Desplazamiento a la izquierda sobre enteros negativos ---
Expresión : -8 = -4 &lt;&lt; 1
 Decimal :
  val=-4
  res=-8
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=1111111111111111111111111111111111111111111111111111111111111000
 Nota : complemento de ceros a la derecha

Expresión : -9223372036854775808 = -4 &lt;&lt; 61
 Decimal :
  val=-4
  res=-9223372036854775808
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=1000000000000000000000000000000000000000000000000000000000000000

Expresión : 0 = -4 &lt;&lt; 62
 Decimal :
  val=-4
  res=0
 Binario :
  val=1111111111111111111111111111111111111111111111111111111111111100
  res=0000000000000000000000000000000000000000000000000000000000000000
 Nota : bits salieron a la izquierda, incluyendo el bit de signo




 **Advertencia**

   Úsense las funciones de la extensión [gmp](#book.gmp)
   para las manipulaciones sobre bits, cuando los enteros exceden
   **[PHP_INT_MAX](#constant.php-int-max)**.






  ### Ver también





    - [pack()](#function.pack)

    - [unpack()](#function.unpack)

    - [gmp_and()](#function.gmp-and)

    - [gmp_or()](#function.gmp-or)

    - [gmp_xor()](#function.gmp-xor)

    - [gmp_testbit()](#function.gmp-testbit)

    - [gmp_clrbit()](#function.gmp-clrbit)












 ## Operadores de comparación



  Los operadores de comparación, como su nombre indica,
  permiten comparar dos valores. También se debe estar interesado por las
  [tablas de comparaciones de tipos](#types.comparisons),
  ya que muestran ejemplos de muchos tipos de comparaciones.




  <caption>**Operadores de comparación**</caption>



     Ejemplo
     Nombre
     Resultado






     $a == $b
     Igual
     **[true](#constant.true)** si $a es igual a
      $b después del transtipado.



     $a === $b
     Idéntico

      **[true](#constant.true)** si $a es igual a $b y
      son del mismo tipo.




     $a != $b
     Diferente
     **[true](#constant.true)** si $a es diferente de
      $b después del transtipado.



     $a &lt;&gt; $b
     Diferente
     **[true](#constant.true)** si $a es diferente de
      $b después del transtipado.



     $a !== $b
     Diferente

      **[true](#constant.true)** si $a es diferente de $b
      o bien si no son del mismo tipo.




     $a &lt; $b
     Menor que
     **[true](#constant.true)** si $a es estrictamente menor que
      $b.



     $a &gt; $b
     Mayor
     **[true](#constant.true)** si $a es estrictamente mayor que
      $b.



     $a &lt;= $b
     Menor o igual
     **[true](#constant.true)** si $a es menor o igual a
      $b.



     $a &gt;= $b
     Mayor o igual
     **[true](#constant.true)** si $a es mayor o igual a
      $b.



     $a &lt;=&gt; $b
     Combinado

      Un [int](#language.types.integer) menor, igual o mayor a cero cuando
      $a es menor, igual, o mayor a
      $b respectivamente.








  Si los dos operandos son
  [strings numéricos](#language.types.numeric-strings),
  o si un operando es un número y el otro es un
  [string numérico](#language.types.numeric-strings),
  entonces la comparación se efectuará numéricamente.
  Estas reglas también se aplican a la instrucción
  [switch](#control-structures.switch).
  La conversión de tipo no interviene cuando la comparación es
  === o !==
  ya que esto implica tanto una comparación de tipo como de valor.




 **Advertencia**

   Antes de PHP 8.0.0, si un [string](#language.types.string) es comparado a un número
   o a un string numérico, entonces el [string](#language.types.string) será convertido en un
   número antes de efectuar la comparación. Esto puede llevar a resultados
   sorprendentes como se puede ver en el siguiente ejemplo:




&lt;?php
var_dump(0 == "a");
var_dump("1" == "01");
var_dump("10" == "1e1");
var_dump(100 == "1e2");

switch ("a") {
case 0:
    echo "0";
    break;
case "a":
    echo "a";
    break;
}
?&gt;


    Resultado del ejemplo anterior en PHP 7:




bool(true)
bool(true)
bool(true)
bool(true)
0


    Resultado del ejemplo anterior en PHP 8:




bool(false)
bool(true)
bool(true)
bool(true)
a










   **Ejemplo #1 Operadores de comparación**



&lt;?php
// Enteros
echo 1 &lt;=&gt; 1, ' '; // 0
echo 1 &lt;=&gt; 2, ' '; // -1
echo 2 &lt;=&gt; 1, ' '; // 1

// Números flotantes
echo 1.5 &lt;=&gt; 1.5, ' '; // 0
echo 1.5 &lt;=&gt; 2.5, ' '; // -1
echo 2.5 &lt;=&gt; 1.5, ' '; // 1

// Strings
echo "a" &lt;=&gt; "a", ' '; // 0
echo "a" &lt;=&gt; "b", ' '; // -1
echo "b" &lt;=&gt; "a", ' '; // 1

echo "a" &lt;=&gt; "aa", ' '; // -1
echo "zz" &lt;=&gt; "aa", ' '; // 1

// Arrays
echo [] &lt;=&gt; [], ' '; // 0
echo [1, 2, 3] &lt;=&gt; [1, 2, 3], ' '; // 0
echo [1, 2, 3] &lt;=&gt; [], ' '; // 1
echo [1, 2, 3] &lt;=&gt; [1, 2, 1], ' '; // 1
echo [1, 2, 3] &lt;=&gt; [1, 2, 4], ' '; // -1

// Objetos
$a = (object) ["a" =&gt; "b"];
$b = (object) ["a" =&gt; "b"];
echo $a &lt;=&gt; $b, ' '; // 0

$a = (object) ["a" =&gt; "b"];
$b = (object) ["a" =&gt; "c"];
echo $a &lt;=&gt; $b, ' '; // -1

$a = (object) ["a" =&gt; "c"];
$b = (object) ["a" =&gt; "b"];
echo $a &lt;=&gt; $b, ' '; // 1

// No solo las valores son comparados; las claves deben coincidir
$a = (object) ["a" =&gt; "b"];
$b = (object) ["b" =&gt; "b"];
echo $a &lt;=&gt; $b, ' '; // 1

?&gt;






  Para los diferentes tipos, la comparación se realiza siguiendo
  la tabla siguiente (en orden).




  <caption>**Comparación con múltiples tipos**</caption>



     Tipo del operando 1
     Tipo del operando 2
     Resultado






     [null](#language.types.null) o [string](#language.types.string)
     [string](#language.types.string)
     Convierte **[null](#constant.null)** en "", comparación numérica o léxica



     [bool](#language.types.boolean) o [null](#language.types.null)
     Cualquier cosa
     Convierte en [bool](#language.types.boolean), **[false](#constant.false)** &lt; **[true](#constant.true)**



     [object](#language.types.object)
     [object](#language.types.object)
     Las clases internas pueden definir su propio método de
      comparación; diferentes clases son incomparables; entre objetos
      de la misma clase ver [Comparación de objetos](#language.oop5.object-comparison)




      [string](#language.types.string), [resource](#language.types.resource), [int](#language.types.integer) o [float](#language.types.float)


      [string](#language.types.string), [resource](#language.types.resource), [int](#language.types.integer) o [float](#language.types.float)


      Transforma los strings y los recursos en números




     [array](#language.types.array)
     [array](#language.types.array)
     El array con menos miembros es menor, si la clave del operando 1 no es encontrada en el operando 2, entonces los arrays son incomparables, de lo contrario la comparación se realiza valor por valor (ver el siguiente ejemplo)




     [object](#language.types.object)
     Cualquier cosa
     El objeto es siempre mayor



     [array](#language.types.array)
     Cualquier cosa
     El [array](#language.types.array) es siempre mayor











   **Ejemplo #2 Comparación Booléen/null**



&lt;?php
// Booléen y null siempre son comparados como booléans
var_dump(1 == TRUE);  // TRUE - idéntico a (bool) 1 == TRUE
var_dump(0 == FALSE); // TRUE - idéntico a (bool) 0 == FALSE
var_dump(100 &lt; TRUE); // FALSE - idéntico a (bool) 100 &lt; TRUE
var_dump(-10 &lt; FALSE);// FALSE - idéntico a (bool) -10 &lt; FALSE
var_dump(min(-100, -10, NULL, 10, 100)); // NULL - (bool) NULL &lt; (bool) -100 es idéntico a FALSE &lt; TRUE
?&gt;









   **Ejemplo #3 Transcripción de las comparaciones estándar de arrays**



&lt;?php
// Los arrays son comparados de esta manera con los operadores estándar de comparación y el operador combinado
function standard_array_compare($op1, $op2)
{
   if (count($op1) &lt; count($op2)) {
      return -1; // $op1 &lt; $op2
   } elseif (count($op1) &gt; count($op2)) {
      return 1; // $op1 &gt; $op2
   }
   foreach ($op1 as $key =&gt; $val) {
      if (!array_key_exists($key, $op2)) {
         return 1;
      } elseif ($val &lt; $op2[$key]) {
         return -1;
      } elseif ($val &gt; $op2[$key]) {
         return 1;
      }
   }
   return 0; // $op1 == $op2
}
?&gt;





 **Advertencia**
  # Comparación de números de punto flotante



   Debido a la forma en que los números de punto flotante son representados
   internamente, no se debe probar la igualdad entre dos números de tipo
   [float](#language.types.float).





   Ver la documentación de [float](#language.types.float) para más información.





 **Nota**:

   Tenga en cuenta que la manipulación de tipos no siempre es evidente al comparar
   valores de diferentes tipos, en particular al comparar [int](#language.types.integer)s con [bool](#language.types.boolean)s o
   [int](#language.types.integer)s con [string](#language.types.string)s. Por lo tanto, generalmente se recomienda utilizar los
   operadores de comparación === y !== en lugar de
   == y != en la mayoría de los casos.






  ### Valores incomparables


   Mientras que las comparaciones de identidad (=== y !==)
   pueden ser aplicadas a valores arbitrarios, los otros operadores de
   comparación solo deben ser aplicados a valores comparables.
   El resultado de la comparación de valores incomparables es indefinido,
   y no debe ser utilizado.






  ### Ver también





    - [strcasecmp()](#function.strcasecmp)

    - [strcmp()](#function.strcmp)

    - [operador de arrays](#language.operators.array)

    - [Tipos](#language.types)






  ### El operador ternario


   Otro operador condicional es el operador
   ternario ("?:").



    **Ejemplo #4 Asignación de un valor por defecto**



&lt;?php
// Ejemplo de uso para el operador ternario
$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];

// La línea anterior es idéntica a la siguiente condición:
if (empty($_POST['action'])) {
   $action = 'default';
} else {
   $action = $_POST['action'];
}
?&gt;



   La expresión (expr1) ? (expr2) : (expr3)
   se evalúa a expr2 si
   expr1 se evalúa a **[true](#constant.true)**, y
   expr3 si
   expr1 se evalúa a **[false](#constant.false)**.


   Es posible omitir la parte central del operador ternario.
   La expresión expr1 ?: expr3 evalúa el resultado de
   expr1 si expr1
   vale **[true](#constant.true)**, y expr3 en caso contrario.
   expr1 solo se evalúa una vez en este caso.



  **Nota**:

    Tenga en cuenta que el operador ternario es una expresión, y no
    se evalúa como una variable, sino como el resultado de la expresión.
    Es importante saberlo si se desea devolver una variable
    por referencia. La instrucción
    return $var == 42 ? $a : $b;
    en una función devuelta por referencia no funcionará y se emitirá una alerta.




  **Nota**:



    Se recomienda no "apilar" las expresiones ternarias.
    El comportamiento de PHP al utilizar varios operadores
    ternarios que no están entre paréntesis en una única expresión es
    no evidente en comparación con otros lenguajes.
    Anteriormente a PHP 8.0.0, el operador ternario se evaluaba
    de izquierda a derecha, en lugar de derecha a izquierda como la mayoría de
    los otros lenguajes de programación.
    Dependiendo de la asociatividad a la izquierda es obsoleto a partir de PHP 7.4.0.
    A partir de PHP 8.0.0, el operador ternario no es asociativo.



     **Ejemplo #5 Comportamiento de PHP**



&lt;?php
// A primera vista, lo siguiente debería devolver 'true'
echo (true ? 'true' : false ? 't' : 'f');

// sin embargo, la expresión anterior devolverá 't' antes de PHP 8.0.0
// porque el operador ternario es de izquierda a derecha

// la siguiente expresión es una versión más evidente del mismo código
echo ((true ? 'true' : false) ? 't' : 'f');

// aquí, se puede observar que la primera expresión se evalúa a 'true',
// lo que hace que se evalúe a (bool)true, lo que devuelve la rama
// 'verdadera' de la segunda expresión ternaria.
?&gt;





  **Nota**:



    La combinación de ternario corto (?:), sin embargo, es estable y se comporta de manera razonable.
    Esto evaluará el primer argumento que evalúa a un valor no-falsy.
    Tenga en cuenta que los valores indefinidos siempre emitirán un aviso.



     **Ejemplo #6 Combinación de ternario corto**



&lt;?php
echo 0 ?: 1 ?: 2 ?: 3, PHP_EOL; //1
echo 0 ?: 0 ?: 2 ?: 3, PHP_EOL; //2
echo 0 ?: 0 ?: 0 ?: 3, PHP_EOL; //3
?&gt;








  ### Operador de fusión Null


   Otro operador corto útil es el operador "??" (o fusión null).



    **Ejemplo #7 Asignar un valor por defecto**



&lt;?php
// Ejemplo de uso para: Operador de fusión Null
$action = $_POST['action'] ?? 'default';

// el código anterior es equivalente a la siguiente estructura if/else
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}
?&gt;



   La expresión (expr1) ?? (expr2) devuelve
   expr2 si expr1 es
   **[null](#constant.null)**, y expr1 en los otros casos.


   En particular, este operador no emite una notificación o advertencia si
   la parte izquierda no existe, exactamente como [isset()](#function.isset).
   Esto es especialmente útil para las claves de los arrays.



  **Nota**:

    Tenga en cuenta que el operador de fusión null es una expresión, y que
    no se evalúa como una variable, sino como el resultado de una expresión.
    Es importante saberlo si se desea devolver una variable
    por referencia.
    La expresión return $foo ?? $bar; es un retorno por
    referencia que no funciona y emite una advertencia.




  **Nota**:



    El operador de fusión null tiene una precedencia baja. Esto significa que al mezclarlo
    con otros operadores (como la concatenación de strings o los operadores
    aritméticos) se requerirán paréntesis.




&lt;?php
// Emite una advertencia de que $name es indefinida.
print 'Mr. ' . $name ?? 'Anonymous';

// Imprime "Mr. Anonymous"
print 'Mr. ' . ($name ?? 'Anonymous');
?&gt;



  **Nota**:



    Tenga en cuenta que el operador de fusión null permite una imbricación simple:



     **Ejemplo #8 Imbricación de la operación de fusión null**



&lt;?php

$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo $foo ?? $bar ?? $baz ?? $qux; // salida 1

?&gt;















 ## Operador de control de errores



  PHP soporta un operador de control de errores: el arroba (@).
  Cuando este operador se añade como prefijo a una expresión PHP, los diagnósticos de errores que pueden ser generados por esta expresión serán ignorados.





  Si un gestor de errores personalizado es definido con [set_error_handler()](#function.set-error-handler), será llamado aún si el diagnóstico ha sido ignorado.




 **Advertencia**

   Anterior a PHP 8.0.0, la función [error_reporting()](#function.error-reporting) llamada en el gestor de errores personalizado siempre retornaba 0 si el error fue ignorado con el operador @.
   A partir de 8.0.0, retorna el valor de esta expresión (bit a bit): E_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_RECOVERABLE_ERROR | E_PARSE.






  Todos los mensajes de error generados por la expresión están disponibles en el elemento "message" del array retornado por la función [error_get_last()](#function.error-get-last). El resultado de la función cambiará con cada error, por lo tanto, es conveniente verificarlo frecuentemente.







   **Ejemplo #1 Error de fichero intencional**



    &lt;?php
$mon_fichier = @file ('non_persistent_file') or
    die ("Imposible abrir el fichero: El error es: '" . error_get_last()['message'] . "'");
?&gt;








   **Ejemplo #2 La expresión de eliminación**



&lt;?php
// Esto funciona con cualquier expresión, no solo con funciones
  $value = @$cache[$key];
// la línea anterior no mostrará una alerta si la clave $key del array no existe
?&gt;




 **Nota**:

   El operador @ solo funciona con las [expresiones](#language.expressions).
   La regla general es: si es posible tomar el valor de algo, entonces se puede preponer el operador @ a este.
   Por ejemplo, puede ser prepuesto a variables, llamadas de funciones, ciertas llamadas a construcciones de lenguaje (por ejemplo, [include](#function.include)), etc.
   No puede ser prepuesto a definiciones de funciones o clases o estructuras condicionales como if y foreach, etc.




 **Advertencia**

   Anterior a PHP 8.0.0, era posible que el operador @ desactivara los errores críticos que terminaban la ejecución del script.
   Por ejemplo, preponer @ a una llamada de una función que no existe, que esté indisponible o mal escrita, causaba que el script terminara sin ninguna indicación de por qué.






  ### Ver también





    - [error_reporting()](#function.error-reporting)

    - [Gestión de Errores y Funciones de Logging](#ref.errorfunc)












 ## Operador de ejecución



  PHP soporta un operador de ejecución: comillas invertidas
  (``). Téngase en cuenta que no se trata de comillas simples. PHP
  intenta ejecutar el contenido de estas comillas invertidas como un comando
  shell. El resultado será devuelto (es decir: no será simplemente
  enviado a la salida estándar, puede ser asignado a una variable).
  Utilizar las comillas invertidas equivale a utilizar la función
  [shell_exec()](#function.shell-exec).







   **Ejemplo #1 Operador de comillas invertidas**



&lt;?php
$output = `ls -al`;
echo "&lt;pre&gt;$output&lt;/pre&gt;";
?&gt;




 **Nota**:



   Este operador está desactivado cuando la función
   [shell_exec()](#function.shell-exec) está desactivada.




 **Nota**:



   A diferencia de otros lenguajes, las comillas invertidas
   no tienen un significado especial en una cadena rodeada
   de comillas dobles.






  ### Ver también





    - [Las funciones de ejecución del sistema](#ref.exec)

    - [popen()](#function.popen)

    - [proc_open()](#function.proc-open)

    - [Utilizar PHP desde la línea de comandos](#features.commandline)












 ## Los operadores lógicos




  <caption>**Los operadores lógicos**</caption>



     Ejemplo
     Nombre
     Resultado






     $a and $b
     And (Y)
     **[true](#constant.true)** si $a Y $b valen **[true](#constant.true)**.



     $a or $b
     Or (O)
     **[true](#constant.true)** si $a O $b valen **[true](#constant.true)**.



     $a xor $b
     XOR

      **[true](#constant.true)** si $a O $b es **[true](#constant.true)**,
      pero no ambos a la vez.




     ! $a
     Not (No)
     **[true](#constant.true)** si $a no es **[true](#constant.true)**.



     $a &amp;&amp; $b
     And (Y)
     **[true](#constant.true)** si $a Y $b son **[true](#constant.true)**.



     $a || $b
     Or (O)
     **[true](#constant.true)** si $a O $b es **[true](#constant.true)**.







  La razón por la cual existen dos tipos de "Y" y de "O"
  es que tienen diferentes prioridades. Ver el
  párrafo
  [precedencia de operadores](#language.operators.precedence).




  **Ejemplo #1 Ilustración de los operadores lógicos**



&lt;?php

// --------------------
// foo() nunca será llamada, ya que estos operadores se anulan

$a = (false &amp;&amp; foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" tiene una precedencia superior a "or"

// El resultado de la expresión (false || true) es asignado a $e
// Actúa como: ($e = (false || true))
$e = false || true;

// La constante false es asignada a $f antes de que aparezca la operación "or"
// Actúa como: (($f = false) or true)
$f = false or true;

var_dump($e, $f);

// --------------------
// "&amp;&amp;" tiene una precedencia superior a "and"

// El resultado de la expresión (true &amp;&amp; false) es asignado a $g
// Actúa como: ($g = (true &amp;&amp; false))
$g = true &amp;&amp; false;

// La constante true es asignada a $h antes de que aparezca la operación "and"
// Actúa como: (($h = true) and false)
$h = true and false;

var_dump($g, $h);
?&gt;


  Resultado del ejemplo anterior es similar a:




bool(true)
bool(false)
bool(false)
bool(true)











 ## Operadores de string



  Existen dos operadores de string [string](#language.types.string).
  El primero es el operador de concatenación ('.'), que
  devuelve la concatenación de sus dos argumentos.
  El segundo es el operador de asignación
  concatenante (.=). Ver
  [operadores de asignación](#language.operators.assignment)
  para más detalles.








   **Ejemplo #1 Concatenación de string**



&lt;?php
$a = "Hello ";
$b = $a . "World!"; // $b contiene ahora "Hello World!"
var_dump($b);

$a = "Hello ";
$a .= "World!";     // $a contiene ahora "Hello World!"
var_dump($a);
?&gt;






  ### Ver también





    - [El tipo string](#language.types.string)

    - [Las funciones de string](#ref.strings)












 ## Operadores de arrays


  <caption>**Operadores de arrays**</caption>




     Ejemplo
     Nombre
     Resultado






     $a + $b
     Unión
     Unión de $a y $b.



     $a == $b
     Igualdad
     **[true](#constant.true)** si $a y $b contienen las mismas pares clave/valor.



     $a === $b
     Idéntico
     **[true](#constant.true)** si $a y $b contienen las mismas pares clave/valor en el mismo orden y del mismo tipo.



     $a != $b
     Desigualdad
     **[true](#constant.true)** si $a no es igual a $b.



     $a &lt;&gt; $b
     Desigualdad
     **[true](#constant.true)** si $a no es igual a $b.



     $a !== $b
     No idéntico
     **[true](#constant.true)** si $a no es idéntico a $b.







  El operador + devuelve el array de la izquierda al cual se
  añaden los elementos del array de la derecha. Para las claves presentes en los
  2 arrays, los elementos del array de la izquierda serán utilizados mientras que los
  elementos correspondientes en el array de la derecha serán ignorados.







   **Ejemplo #1 El operador de adición a un array**



&lt;?php
$a = array("a" =&gt; "manzana", "b" =&gt; "plátano");
$b = array("a" =&gt;"pera", "b" =&gt; "fresa", "c" =&gt; "cereza");

$c = $a + $b; // Unión de $a y $b
echo "Unión de \$a y \$b : \n";
var_dump($c);

$c = $b + $a; // Unión de $b y $a
echo "Unión de \$b y \$a : \n";
var_dump($c);

$a += $b; // Unión de $a += $b es $a y $b
echo "Unión de \$a += \$b: \n";
var_dump($a);
?&gt;


   El ejemplo anterior mostrará:




Unión de $a y $b :
array(3) {
  ["a"]=&gt;
  string(7) "manzana"
  ["b"]=&gt;
  string(7) "plátano"
  ["c"]=&gt;
  string(6) "cereza"
}
Unión de $b y $a :
array(3) {
  ["a"]=&gt;
  string(4) "pera"
  ["b"]=&gt;
  string(5) "fresa"
  ["c"]=&gt;
  string(6) "cereza"
}
Unión de $a += $b:
array(3) {
  ["a"]=&gt;
  string(7) "manzana"
  ["b"]=&gt;
  string(7) "plátano"
  ["c"]=&gt;
  string(6) "cereza"
}





  Los elementos de un array son iguales en términos de comparación si tienen la
  misma clave y el mismo valor.







   **Ejemplo #2 Comparar arrays**



&lt;?php
$a = array("manzana", "plátano");
$b = array(1 =&gt; "plátano", "0" =&gt; "manzana");

var_dump($a == $b); // bool(true)
var_dump($a === $b); // bool(false)
?&gt;






  ### Ver también





    - [El tipo array](#language.types.array)

    - [Las Funciones de Arrays](#ref.array)












 ## Operadores de tipos



  instanceof se utiliza para determinar si una variable PHP
  es un objeto instanciado de una cierta
  [clase](#language.oop5.basic.class):



   **Ejemplo #1 Uso de instanceof con clases**



&lt;?php
class MiClase
{
}
class NoMiClase
{
}
$a = new MiClase;

var_dump($a instanceof MiClase);
var_dump($a instanceof NoMiClase);
?&gt;


   El ejemplo anterior mostrará:




bool(true)
bool(false)





  instanceof también puede ser utilizado para determinar
  si una variable es un objeto instanciado de una clase que hereda de una clase padre:



   **Ejemplo #2 Uso de instanceof con clases heredadas**



&lt;?php
class ClasePadre
{
}
class MiClase extends ClasePadre
{
}
$a = new MiClase;

var_dump($a instanceof MiClase);
var_dump($a instanceof ClasePadre);
?&gt;


   El ejemplo anterior mostrará:




bool(true)
bool(true)





  Para verificar si un objeto *no es* una instancia de una clase,
  el [operador lógico not](#language.operators.logical)
  puede ser utilizado.



   **Ejemplo #3 Uso de instanceof para verificar que el objeto
    *no es* una instancia de la clase**



&lt;?php
class MiClase
{
}
$a = new MiClase;
var_dump(!($a instanceof stdClass));
?&gt;


   El ejemplo anterior mostrará:




bool(true)





  Y finalmente, instanceof puede ser utilizado para determinar
  si una variable es un objeto instanciado de una clase que implementa una
  [interface](#language.oop5.interfaces):



   **Ejemplo #4 Uso de instanceof para una interface**



&lt;?php
interface MiInterface
{
}
class MiClase implements MiInterface
{
}
$a = new MiClase;

var_dump($a instanceof MiClase);
var_dump($a instanceof MiInterface);
?&gt;


   El ejemplo anterior mostrará:




bool(true)
bool(true)





  Aunque instanceof se utiliza habitualmente con un nombre
  de clase literal, también puede ser utilizado con otro objeto o una cadena
  representando una variable:



   **Ejemplo #5 Uso de instanceof con otras variables**



&lt;?php
interface MiInterface
{
}
class MiClase implements MiInterface
{
}
$a = new MiClase;
$b = new MiClase;
$c = 'MiClase';
$d = 'NoMiClase';
var_dump($a instanceof $b); // $b es un objeto de la clase MiClase
var_dump($a instanceof $c); // $c es una cadena 'MiClase'
var_dump($a instanceof $d); // $d es una cadena 'NoMiClase'
?&gt;


   El ejemplo anterior mostrará:




bool(true)
bool(true)
bool(false)





  instanceof no lanza ningún error si la variable probada no es
  un objeto, simplemente devolverá **[false](#constant.false)**. Sin embargo, las constantes
  no están permitidas.



   **Ejemplo #6 Uso de instanceof para probar otras variables**



&lt;?php
$a = 1;
$b = NULL;
$c = fopen('/tmp/', 'r');
var_dump($a instanceof stdClass); // $a es un entero
var_dump($b instanceof stdClass); // $b vale NULL
var_dump($c instanceof stdClass); // $c es un recurso
var_dump(FALSE instanceof stdClass);
?&gt;


   El ejemplo anterior mostrará:




bool(false)
bool(false)
bool(false)
PHP Fatal error:  instanceof espera una instancia de objeto, constante dada





  A partir de PHP 7.3.0, las constantes están permitidas en el lado izquierdo
  del operador instanceof.



   **Ejemplo #7 Uso de instanceof para probar constantes**



&lt;?php
var_dump(FALSE instanceof stdClass);
?&gt;


   Resultado del ejemplo anterior en PHP 7.3:




bool(false)





  A partir de PHP 8.0.0, instanceof puede ahora ser
  utilizado con expresiones arbitrarias.
  La expresión debe estar entre paréntesis y producir una [string](#language.types.string).




   **Ejemplo #8 Uso de instanceof con una expresión arbitraria**



&lt;?php

class ClaseA extends \stdClass {}
class ClaseB extends \stdClass {}
class ClaseC extends ClaseB {}
class ClaseD extends ClaseA {}

function obtenerAlgunaClase(): string
{
    return ClaseA::class;
}

var_dump(new ClaseA instanceof ('std' . 'Class'));
var_dump(new ClaseB instanceof ('Class' . 'B'));
var_dump(new ClaseC instanceof ('Class' . 'A'));
var_dump(new ClaseD instanceof (obtenerAlgunaClase()));
?&gt;


   Resultado del ejemplo anterior en PHP 8:




bool(true)
bool(true)
bool(false)
bool(true)





  El operador instanceof tiene una variante funcional
  con la función [is_a()](#function.is-a).





  ### Ver también





    - [get_class()](#function.get-class)

    - [is_a()](#function.is-a)












 ## Operadores funcionales



  PHP 8.5 y versiones posteriores admiten un operador que funciona directamente con callables. El operador |&gt;,
  o “pipe”, acepta un callable de un solo parámetro en el lado derecho y le pasa
  el valor del lado izquierdo, evaluando el resultado del callable. El callable
  en el lado derecho puede ser cualquier callable válido en PHP: una [Closure](#class.closure),
  un [callable de primera clase](#functions.first_class_callable_syntax),
  un objeto que implemente [__invoke()](#object.invoke), etc.




  Esto significa que las siguientes dos líneas son lógicamente equivalentes.



   **Ejemplo #1 Usando |&gt;**



&lt;?php
$result = "Hola Mundo" |&gt; strlen(...);
echo $result, PHP_EOL;

$result = strlen("Hola Mundo");
echo $result, PHP_EOL;
?&gt;


   El ejemplo anterior mostrará:




10
10





  Para una única llamada, no resulta especialmente útil. Se vuelve útil cuando se encadenan múltiples llamadas.
  Es decir, los siguientes dos fragmentos de código son lógicamente equivalentes:



   **Ejemplo #2 Encadenando llamadas |&gt;**



&lt;?php
$result = "PHP Rocks"
    |&gt; htmlentities(...)
    |&gt; str_split(...)
    |&gt; (fn($x) =&gt; array_map(strtoupper(...), $x))
    |&gt; (fn($x) =&gt; array_filter($x, fn($v) =&gt; $v != 'O'))
;
echo $result, PHP_EOL;

$temp = "PHP Rocks";
$temp = htmlentities($temp);
$temp = str_split($temp);
$temp = array_map(strtoupper(...), $temp);
$temp = array_filter($temp, fn($v) =&gt; $v != 'O');
$result = $temp;
echo $result, PHP_EOL;
?&gt;


   El ejemplo anterior mostrará:




Array
(
    [0] =&gt; P
    [1] =&gt; H
    [2] =&gt; P
    [3] =&gt;
    [4] =&gt; R
    [6] =&gt; C
    [7] =&gt; K
    [8] =&gt; S
)
Array
(
    [0] =&gt; P
    [1] =&gt; H
    [2] =&gt; P
    [3] =&gt;
    [4] =&gt; R
    [6] =&gt; C
    [7] =&gt; K
    [8] =&gt; S
)





  El lado izquierdo del operador pipe puede ser cualquier valor o expresión. El lado derecho
  puede ser cualquier callable válido en PHP que acepte un solo parámetro, o cualquier expresión
  que se evalúe como tal. Las funciones que requieren más de un parámetro
  no están permitidas y fallarán como si se llamaran normalmente
  con argumentos insuficientes. Las funciones que reciben variables por referencia tampoco están permitidas.
  Si el lado derecho no se evalúa como un callable válido, se lanzará un error.



 **Nota**:



   Tenga en cuenta que, para evitar ambigüedades de sintaxis, las [funciones de flecha](#functions.arrow)
   DEBEN estar entre paréntesis cuando se utilicen con el operador pipe, como en los ejemplos anteriores.
   No hacerlo provocará un error fatal.






  ### Ver también





    - [Closure](#class.closure)




















 # Estructuras de Control

## Tabla de contenidos
- [Introducción](#control-structures.intro)
- [if](#control-structures.if)
- [else](#control-structures.else)
- [elseif/else if](#control-structures.elseif)
- [Sintaxis alternativa](#control-structures.alternative-syntax)
- [while](#control-structures.while)
- [do-while](#control-structures.do.while)
- [for](#control-structures.for)
- [foreach](#control-structures.foreach)
- [break](#control-structures.break)
- [continue](#control-structures.continue)
- [switch](#control-structures.switch)
- [match](#control-structures.match)
- [declare](#control-structures.declare)
- [return](#function.return)
- [require](#function.require)
- [include](#function.include)
- [require_once](#function.require-once)
- [include_once](#function.include-once)
- [goto](#control-structures.goto)




  ## Introducción


   Todo script PHP está construido según una serie de sentencias. Una
   sentencia puede ser una asignación, una llamada de función, un ciclo, una
   sentencia condicional o incluso una sentencia que no hace nada (una
   sentencia vacía). Las sentencias generalmente finalizan con un
   punto y coma. Adicionalmente, las sentencias pueden agruparse en un
   conjunto de sentencias, encapsulándolas entre corchetes. Un grupo de
   sentencias es una sentencia por sí misma también. Los diferentes tipos de
   sentencias son descritos en este capítulo.





   ### Ver también


    Lo siguiente también se considera como construcciones de lenguaje, aunque se hace
    referencia a ellas bajo funciones en el manual.







     - [list()](#function.list)

     - [array()](#function.array)

     - [echo](#function.echo)

     - [eval()](#function.eval)

     - [print](#function.print)















 ## if

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La instrucción if es una de las más importantes
  instrucciones de todos los lenguajes, PHP incluido. Permite
  la ejecución condicional de una parte de código. Las
  funcionalidades de la instrucción if
  son las mismas en PHP que en C :





if (expression)
  commandes






  Como se ha visto en el párrafo dedicado a las
  [expressions](#language.expressions),
  expression es convertida en su valor
  booléen. Si la expression vale
  **[true](#constant.true)**, PHP ejecutará la instruction y
  si vale **[false](#constant.false)**, la instrucción será ignorada. Más detalles sobre los valores
  que valen **[false](#constant.false)** están disponibles en la sección
  [Conversión en booléen](#language.types.boolean.casting).




  El siguiente ejemplo muestra la frase a es más grande
  que b si $a es más grande
  que $b :




&lt;?php
if ($a &gt; $b)
  echo "a es más grande que b";
?&gt;





  A menudo, se desea que varias instrucciones sean ejecutadas después de un
  desvío condicional. Por supuesto, no es obligatorio repetir
  la instrucción condicional if tantas veces como instrucciones
  se tengan que ejecutar. En su lugar, se pueden agrupar todas las
  instrucciones en un bloque. El siguiente ejemplo muestra a
  es más grande que b, si $a es más grande
  que $b, y luego asigna el valor de $a
  a la variable $b :




&lt;?php
if ($a &gt; $b) {
  echo "a es más grande que b";
  $b = $a;
}
?&gt;





  Se pueden anidar indefinidamente instrucciones
  if dentro de otras instrucciones if, lo que
  permite una gran flexibilidad en la ejecución de una
  parte de código según un gran número de condiciones.














 ## else

 (PHP 4, PHP 5, PHP 7, PHP 8)



  A menudo, se desea ejecutar una sentencia si una
  condición se cumple y otra sentencia si esta condición
  no se cumple. Para esto se utiliza else.
  else funciona después de un
  if y ejecuta las sentencias
  correspondientes en caso de que la expresión del if
  sea **[false](#constant.false)**. En el siguiente ejemplo, este fragmento de código
  muestra a es más grande que b si la
  variable $a es más grande que la variable
  $b, y a es más pequeño que b
  en caso contrario:




&lt;?php
if ($a &gt; $b) {
  echo "a es más grande que b";
} else {
  echo "a es más pequeño que b";
}
?&gt;



  Las sentencias después del else solo se
  ejecutan si la expresión del if
  es **[false](#constant.false)**, y si existen expresiones elseif
  - solo si también se evalúan como **[false](#constant.false)** (ver [elseif](#control-structures.elseif)).

 **Nota**:
  **Dangling else**



   En el caso de sentencias if-else
   anidadas, un else siempre se asocia con el
   if más cercano.




&lt;?php
$a = false;
$b = true;
if ($a)
    if ($b)
        echo "b";
else
    echo "c";
?&gt;



   A pesar de la indentación (que no tiene importancia en PHP), el
   else se asocia con el if ($b),
   por lo que este ejemplo no produce ninguna salida.
   Aunque apoyarse en este comportamiento es válido, se recomienda evitarlo utilizando llaves para resolver cualquier posible ambigüedad.













 ## elseif/else if

 (PHP 4, PHP 5, PHP 7, PHP 8)



  elseif, como su nombre indica, es una combinación
  de if y de else. Como la expresión
  else, permite ejecutar una instrucción
  después de un if en el caso de que el "primer"
  if sea evaluado como **[false](#constant.false)**. Sin embargo,
  a diferencia de la expresión else,
  solo ejecutará la instrucción si la expresión condicional
  elseif es evaluada como
  **[true](#constant.true)**. El siguiente ejemplo mostrará
  a es más grande que b,
  a es igual a b o
  a es más pequeño que b :




&lt;?php
if ($a &gt; $b) {
    echo "a es más grande que b";
} elseif ($a == $b) {
    echo "a es igual a b";
} else {
    echo "a es más pequeño que b";
}
?&gt;





  Es posible tener varios elseif que se sigan
  unos a otros, después de un if inicial.
  El primer elseif que sea evaluado
  como **[true](#constant.true)** será ejecutado. En PHP, es posible escribir
  else if en dos palabras y su comportamiento será idéntico
  al de elseif (en una sola palabra). La semántica
  de las dos expresiones es ligeramente diferente (al igual que en C), pero al final,
  el resultado será exactamente el mismo.




  La expresión elseif es ejecutada
  solo si el if anterior y cualquier otro
  elseif anterior son
  evaluados como **[false](#constant.false)**, y que
  su elseif es evaluado como
  **[true](#constant.true)**.



 **Nota**:

   Téngase en cuenta que elseif y else if
   son tratados de la misma manera solo cuando se utilizan llaves,
   como en el ejemplo anterior. Cuando se utiliza ":" para definir
   sus condiciones if/elseif, el uso
   de elseif en una sola palabra se vuelve necesario. PHP
   fallará con un error de análisis si se utiliza else if.









&lt;?php

/* Mala práctica: */
if ($a &gt; $b):
    echo $a." es más grande que ".$b;
else if ($a == $b): // no compilará
    echo "La línea anterior provoca un error de interpretación";
endif;






&lt;?php

/* Buena práctica: */
if ($a &gt; $b):
    echo $a." es más grande que ".$b;
elseif ($a == $b): // Las dos palabras están unidas
    echo $a." igual ".$b;
else:
    echo $a." es más grande o igual a ".$b;
endif;

?&gt;















 ## Sintaxis alternativa

 (PHP 4, PHP 5, PHP 7, PHP 8)



  PHP ofrece otra manera de agrupar instrucciones dentro de un bloque, para las funciones de control if,
  while, for, foreach y switch.
  En cada caso, el principio es reemplazar la llave de apertura por dos puntos (:) y la llave de cierre por, respectivamente,
  endif;, endwhile;, endfor;, endforeach;, o
  endswitch;.




&lt;?php if ($a == 5): ?&gt;
A igual 5
&lt;?php endif; ?&gt;





  En el ejemplo anterior, el bloque HTML "A igual 5" se incluye dentro de un if utilizando esta nueva sintaxis. Este código HTML solo se mostrará si la variable $a es igual a 5.




  Esta otra sintaxis también funciona con else y elseif. El siguiente ejemplo muestra una estructura con un if, un elseif y un else utilizando esta otra sintaxis:




&lt;?php
if ($a == 5):
    echo "a igual 5";
    echo "...";
elseif ($a == 6):
    echo "a igual 6";
    echo "!!!";
else:
    echo "a no vale ni 5 ni 6";
endif;
?&gt;




 **Nota**:



   No se puede utilizar diferentes sintaxis en el mismo bloque de control.




 **Advertencia**

   Cualquier visualización (incluyendo espacios) entre una estructura switch y el primer case producirá un error de sintaxis. Por ejemplo, esto no es válido:





&lt;?php switch ($foo): ?&gt;
    &lt;?php case 1: ?&gt;
    // ...
&lt;?php endswitch; ?&gt;




   Mientras que esto es válido, ya que la última nueva línea después de la estructura switch se considera parte de la etiqueta de cierre ?&gt; y, por lo tanto, no se muestra nada entre switch y case:





&lt;?php switch ($foo): ?&gt;
&lt;?php case 1: ?&gt;
    ...
&lt;?php endswitch; ?&gt;





  Ver también [while](#control-structures.while), [for](#control-structures.for), y [if](#control-structures.if) para otros ejemplos.















 ## while

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La estructura de control while es la forma más
  simple de implementar un bucle en PHP. Esta estructura
  se comporta de la misma manera que en C.
  El ejemplo más simple de un bucle while
  es el siguiente :





while (expression)
    comandos






  El significado de un bucle while es
  muy simple. PHP ejecuta la instrucción mientras
  que la expresión del bucle while es
  evaluada como **[true](#constant.true)**. El valor
  de la expresión es verificado al inicio de cada
  bucle, y, si el valor cambia durante
  la ejecución de la instrucción, la ejecución no
  se detendrá hasta el final de la iteración
  (cada vez que PHP ejecuta la instrucción, se llama
  una iteración). Si la expresión del
  while es **[false](#constant.false)** antes de la
  primera iteración, la instrucción nunca será
  ejecutada.




  Al igual que con el if, se pueden agrupar
  varias instrucciones en el mismo bucle
  while agrupándolas dentro de
  llaves o utilizando la siguiente sintaxis :





while (expression):
    comandos
    ...
endwhile;






  Los siguientes ejemplos son idénticos y muestran todos los números
  de 1 hasta 10 :




&lt;?php
/* ejemplo 1 */

$i = 1;
while ($i &lt;= 10) {
    echo $i++;  /* El valor mostrado es $i antes del incremento
                   (post-incremento)  */
}

/* ejemplo 2 */

$i = 1;
while ($i &lt;= 10):
    echo $i;
    $i++;
endwhile;
?&gt;
















 ## do-while

 (PHP 4, PHP 5, PHP 7, PHP 8)



  Las bucles do-while se parecen mucho
  a las bucles while, pero la expresión es
  evaluada al final de cada iteración en lugar
  de al principio. La principal diferencia con respecto
  a la bucle while es que la
  primera iteración de la bucle
  do-while siempre se ejecuta
  (la expresión solo se evalúa al final de
  la iteración), lo cual no ocurre cuando se utiliza una bucle while (la condición
  se verifica al inicio de cada iteración, y si resulta **[false](#constant.false)** desde el principio, la bucle se detendrá de inmediato).




  Solo existe una sintaxis posible para las bucles do-while:





&lt;?php
$i = 0;
do {
    echo $i;
} while ($i &gt; 0);
?&gt;





  La bucle anterior solo se ejecutará
  una vez, ya que cuando la expresión es
  evaluada, resulta **[false](#constant.false)** (ya que
  la variable $i no es mayor que 0) y la ejecución
  de la bucle se detiene.




  Los usuarios familiarizados con C están acostumbrados a
  un uso diferente de las bucles
  do-while, que permite detener
  la ejecución de la bucle en medio de las instrucciones, encapsulando en un do-while(0) la
  función [break](#control-structures.break).
  El siguiente código muestra un uso posible:




&lt;?php
do {
    if ($i &lt; 5) {
        echo "i no es suficientemente grande";
        break;
    }
    $i *= $factor;
    if ($i &lt; $minimum_limit) {
        break;
    }
   echo "i es bueno";

    /* ...procesamiento de i... */

} while (0);
?&gt;





  Es posible utilizar el operador
  [goto](#control-structures.goto)
  en lugar de este truco.















 ## for

 (PHP 4, PHP 5, PHP 7, PHP 8)



  Las bucles for son las más complejas en PHP.
  Funcionan como las bucles for del lenguaje C(C++).
  La sintaxis de las bucles for es la siguiente :





for (expr1; expr2; expr3)
    comandos






  La primera expresión (expr1) es
  evaluada (ejecutada), en cualquier caso al
  inicio de la bucle.




  Al inicio de cada iteración, la expresión
  expr2 es evaluada.
  Si la evaluación es **[true](#constant.true)**, la bucle
  continúa y los comandos son ejecutados. Si
  la evaluación es **[false](#constant.false)**,
  la ejecución de la bucle se detiene.




  Al final de cada iteración, la expresión
  expr3 es evaluada
  (ejecutada).




  Las expresiones pueden eventualmente ser
  dejadas vacías o pueden contener varias expresiones separadas por comas.
  En expr2, todas las expresiones separadas por una coma
  son evaluadas pero el resultado se obtiene desde la última parte.
  Si la expresión expr2
  es dejada vacía, esto significa que es una bucle infinita
  (PHP considera implícitamente que vale **[true](#constant.true)**,
  como en C). Esto no es realmente muy útil, a menos que se desee terminar la bucle con la
  instrucción condicional
  [break](#control-structures.break).




  Considérese los siguientes ejemplos. Todos muestran los números enteros de
  1 a 10 :




&lt;?php
/* ejemplo 1 */

for ($i = 1; $i &lt;= 10; $i++) {
    echo $i;
}

/* ejemplo 2 */

for ($i = 1; ; $i++) {
    if ($i &gt; 10) {
        break;
    }
    echo $i;
}

/* ejemplo 3 */

$i = 1;
for (; ; ) {
    if ($i &gt; 10) {
        break;
    }
    echo $i;
    $i++;
}

/* ejemplo 4 */

for ($i = 1, $j = 0; $i &lt;= 10; $j += $i, print $i, $i++);
?&gt;





  Por supuesto, el primer ejemplo es el más simple
  de todos (o quizás el cuarto), pero también se puede pensar que usar una expresión vacía en una
  bucle for puede ser útil a veces.




  PHP también soporta la siguiente sintaxis alternativa para las bucles
  for :





for (expr1; expr2; expr3):
    comandos
    ...
endfor;






  Muchas personas tienen la costumbre de iterar a través de arrays, como en
  el ejemplo a continuación.








&lt;?php
/*
 * Este es un array con datos que queremos modificar
 * a lo largo de la bucle
 */
$people = array(
    array('name' =&gt; 'Kalle', 'salt' =&gt; 856412),
    array('name' =&gt; 'Pierre', 'salt' =&gt; 215863)
);

for($i = 0; $i &lt; count($people); ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
?&gt;





  Este código puede ser lento porque debe calcular el tamaño del array en cada
  iteración. Dado que el tamaño nunca cambia, puede ser fácilmente optimizado utilizando una variable intermedia para almacenar el tamaño en lugar de
  llamar repetidamente a la función [count()](#function.count) :









&lt;?php
$people = array(
    array('name' =&gt; 'Kalle', 'salt' =&gt; 856412),
    array('name' =&gt; 'Pierre', 'salt' =&gt; 215863)
);

for($i = 0, $size = count($people); $i &lt; $size; ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
?&gt;














 ## foreach

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La estructura foreach proporciona una forma sencilla de
  iterar sobre [array](#language.types.array)s y objetos [Traversable](#class.traversable).
  foreach generará un error cuando se utilice con
  una variable que contenga un tipo de dato diferente o con una variable no inicializada.




    foreach puede obtener opcionalmente la key de cada elemento:





foreach (iterable_expression as $value) {
    statement_list
}

foreach (iterable_expression as $key =&gt; $value) {
    statement_list
}






  La primera forma recorre el iterable dado por
  iterable_expression. En cada iteración, el valor del
  elemento actual se asigna a $value.




  La segunda forma asignará adicionalmente la clave del elemento actual a
  la variable $key en cada iteración.




  Tenga en cuenta que foreach no modifica el puntero interno del array,
  que es utilizado por funciones como [current()](#function.current)
  y [key()](#function.key).




  Es posible
  [personalizar la iteración de objetos](#language.oop5.iterations).





  **Ejemplo #1 Usos comunes de foreach**



&lt;?php

/* Ejemplo: solo valor */
$array = [1, 2, 3, 17];

foreach ($array as $value) {
    echo "Elemento actual de \$array: $value.\n";
}

/* Ejemplo: clave y valor */
$array = [
    "one" =&gt; 1,
    "two" =&gt; 2,
    "three" =&gt; 3,
    "seventeen" =&gt; 17
];

foreach ($array as $key =&gt; $value) {
    echo "Clave: $key =&gt; Valor: $value\n";
}

/* Ejemplo: arrays multidimensionales clave-valor */
$grid = [];
$grid[0][0] = "a";
$grid[0][1] = "b";
$grid[1][0] = "y";
$grid[1][1] = "z";

foreach ($grid as $y =&gt; $row) {
    foreach ($row as $x =&gt; $value) {
        echo "Valor en posición x=$x y y=$y: $value\n";
    }
}

/* Ejemplo: arrays dinámicos */
foreach (range(1, 5) as $value) {
    echo "$value\n";
}
?&gt;



 **Nota**:



   foreach no admite la capacidad de
   suprimir mensajes de error utilizando
   [@](#language.operators.errorcontrol).






  ### Desempaquetar arrays anidados

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)



   Es posible iterar sobre un array de arrays y desempaquetar el array anidado
   en variables de bucle utilizando ya sea
   [destructuración de arrays](#language.types.array.syntax.destructuring)
   mediante [] o utilizando la estructura de lenguaje
   [list()](#function.list) como valor.



**Nota**:

     Tenga en cuenta que
     [destructuración de arrays](#language.types.array.syntax.destructuring)
     mediante [] solo es posible a partir de PHP 7.1.0











     En ambos ejemplos siguientes, $a se establecerá con
     el primer elemento del array anidado y $b contendrá
     el segundo elemento:




&lt;?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as [$a, $b]) {
    echo "A: $a; B: $b\n";
}

foreach ($array as list($a, $b)) {
    echo "A: $a; B: $b\n";
}
?&gt;


    El ejemplo anterior mostrará:




A: 1; B: 2
A: 3; B: 4






   Cuando se proporcionan menos variables que elementos en el array,
   los elementos restantes serán ignorados.
   De manera similar, los elementos pueden omitirse utilizando una coma:




&lt;?php
$array = [
    [1, 2, 5],
    [3, 4, 6],
];

foreach ($array as [$a, $b]) {
    // Note que no hay $c aquí.
    echo "$a $b\n";
}

foreach ($array as [, , $c]) {
    // Omitiendo $a y $b
    echo "$c\n";
}
?&gt;


    El ejemplo anterior mostrará:




1 2
3 4
5
6






   Se generará un aviso si no hay suficientes elementos en el array para llenar
   el [list()](#function.list):





&lt;?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as [$a, $b, $c]) {
    echo "A: $a; B: $b; C: $c\n";
}
?&gt;


    El ejemplo anterior mostrará:




Notice: Undefined offset: 2 in example.php on line 7
A: 1; B: 2; C:

Notice: Undefined offset: 2 in example.php on line 7
A: 3; B: 4; C:







  ### foreach y referencias


   Es posible modificar directamente elementos de array dentro de un bucle precediendo
   $value con &amp;.
   En ese caso el valor será asignado por
   [referencia](#language.references).




&lt;?php
$arr = [1, 2, 3, 4];
foreach ($arr as &amp;$value) {
    $value = $value * 2;
}
// $arr es ahora [2, 4, 6, 8]
unset($value); // romper la referencia con el último elemento
?&gt;




  **Advertencia**

    La referencia a un $value del último elemento del array
    permanece incluso después del bucle foreach. Se recomienda
    destruir estas referencias utilizando [unset()](#function.unset).
    De lo contrario, ocurrirá el siguiente comportamiento:





&lt;?php
$arr = [1, 2, 3, 4];
foreach ($arr as &amp;$value) {
    $value = $value * 2;
}
// $arr es ahora [2, 4, 6, 8]

// sin un unset($value), $value sigue siendo una referencia al último elemento: $arr[3]

foreach ($arr as $key =&gt; $value) {
    // $arr[3] se actualizará con cada valor de $arr...
    echo "{$key} =&gt; {$value} ";
    print_r($arr);
}
// ...hasta que finalmente el penúltimo valor se copie sobre el último valor
?&gt;


    El ejemplo anterior mostrará:




0 =&gt; 2 Array ( [0] =&gt; 2, [1] =&gt; 4, [2] =&gt; 6, [3] =&gt; 2 )
1 =&gt; 4 Array ( [0] =&gt; 2, [1] =&gt; 4, [2] =&gt; 6, [3] =&gt; 4 )
2 =&gt; 6 Array ( [0] =&gt; 2, [1] =&gt; 4, [2] =&gt; 6, [3] =&gt; 6 )
3 =&gt; 6 Array ( [0] =&gt; 2, [1] =&gt; 4, [2] =&gt; 6, [3] =&gt; 6 )





  **Ejemplo #2 Iterar los valores de un array constante por referencia**



&lt;?php
foreach ([1, 2, 3, 4] as &amp;$value) {
    $value = $value * 2;
}
?&gt;






  ### Ver también


   - [array](#language.types.array)

   - [Traversable](#class.traversable)

   - [iterable](#language.types.iterable)

   - [list()](#function.list)
















 ## break

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La instrucción break permite salir de una estructura
  for, foreach,
  while, do-while
  o switch.




  break acepta un argumento numérico opcional
  que indicará cuántas estructuras anidadas deben ser
  interrumpidas. El valor por omisión es  1, solo la
  estructura anidada inmediata es interrumpida.








&lt;?php
$arr = array('un', 'dos', 'tres', 'cuatro', 'stop', 'cinco');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;    /* También podría utilizarse 'break 1;' aquí. */
    }
    echo "$val&lt;br /&gt;\n";
}

/* Uso del argumento opcional. */

$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "At 5&lt;br /&gt;\n";
            break 1;  /* Termina únicamente el switch. */
        case 10:
            echo "At 10; quitting&lt;br /&gt;\n";
            break 2;  /* Termina el switch y el ciclo while. */
        default:
            break;
    }
}
?&gt;
















 ## continue

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La instrucción continue se utiliza
  en un bucle para eludir las instrucciones de
  la iteración actual y continuar la ejecución en la condición de
  evaluación y, por lo tanto, comenzar la siguiente iteración.



 **Nota**:

   En PHP, la estructura
   [switch](#control-structures.switch)
   se considera un bucle por continue.
   continue se comporta como break
   (cuando no se pasa ningún argumento) pero emitirá una advertencia, ya que es probable que esto sea un error. Si un switch se encuentra dentro de un bucle, continue 2 continuará en la siguiente iteración del bucle externo.





  continue acepta un argumento numérico
  opcional que indicará cuántas estructuras
  anidadas deben ser eludidas. El valor por omisión
  es 1, lo que equivale a ir directamente
  al final del bucle actual.








&lt;?php
$arr = ['zero', 'one', 'two', 'three', 'four', 'five', 'six'];
foreach ($arr as $key =&gt; $value) {
    if (0 === ($key % 2)) { // elude los miembros pares
        continue;
    }
    echo $value . "\n";
}
?&gt;


   Los ejemplos anteriores mostrarán:




one
three
five



&lt;?php
$i = 0;
while ($i++ &lt; 5) {
    echo "Outer\n";
    while (1) {
        echo "Middle\n";
        while (1) {
            echo "Inner\n";
            continue 3;
        }
        echo "This never gets output.\n";
    }
    echo "Neither does this.\n";
}
?&gt;


   Los ejemplos anteriores mostrarán:




Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner





  Olvidar el punto y coma después de continue puede llevar a confusión. Aquí hay un ejemplo de lo que no se debe hacer:








&lt;?php
for ($i = 0; $i &lt; 5; ++$i) {
    if ($i == 2)
        continue
    print "$i\n";
}
?&gt;



    Se puede esperar que el resultado sea:





0
1
3
4








   <caption>**Historial para continue**</caption>



      Versión
      Descripción






      7.3.0

       continue dentro de un switch
       que intenta actuar como una declaración break para
       switch emitirá **[E_WARNING](#constant.e-warning)**.




















 ## switch

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La instrucción switch equivale a una serie de instrucciones
  if. En numerosas ocasiones, se necesitará comparar la misma variable (o expresión) con un gran número de valores
  diferentes, y ejecutar diferentes partes de código según el valor
  al que sea igual. Esto es exactamente para lo que sirve la instrucción
  switch.



 **Nota**:

   Téngase en cuenta que, a diferencia de otros lenguajes, la estructura
   [continue](#control-structures.continue) se aplica
   a las estructuras switch y se comporta de la misma manera
   que break.
   Si se tiene un switch dentro de un bucle, y se desea continuar hasta la siguiente iteración del bucle externo,
   se debe utilizar continue 2.




 **Nota**:



   Téngase en cuenta que switch/case provoca una
   [comparación amplia](#types.comparisions-loose).






  En el siguiente ejemplo, cada bloque de código es equivalente.
  Uno utiliza una serie de instrucciones if y
  elseif, y el otro una instrucción de tipo
  switch. En cada caso, la salida es la misma.



   **Ejemplo #1 Instrucción switch**



&lt;?php
// Este switch:

switch ($i) {
    case 0:
        echo "i igual 0";
        break;
    case 1:
        echo "i igual 1";
        break;
    case 2:
        echo "i igual 2";
        break;
}

// Equivale a:

if ($i == 0) {
    echo "i igual 0";
} elseif ($i == 1) {
    echo "i igual 1";
} elseif ($i == 2) {
    echo "i igual 2";
}
?&gt;





  Es importante entender que la instrucción
  switch ejecuta cada una de las
  cláusulas en orden. La instrucción switch
  se ejecuta línea por línea. Al principio,
  no se ejecuta ningún código. Solo cuando se encuentra una instrucción
  case cuya
  expresión se evalúa a un valor que coincide con el valor de la
  expresión switch, PHP ejecuta entonces las instrucciones correspondientes.
  PHP continúa ejecutando las instrucciones hasta
  el final del bloque de instrucciones del switch,
  o bien hasta que encuentra la instrucción break.
  Si no se puede utilizar la instrucción
  break al final de la instrucción
  case, PHP continuará ejecutando
  todas las instrucciones que siguen. Por ejemplo :




&lt;?php
switch ($i) {
    case 0:
        echo "i igual 0";
    case 1:
        echo "i igual 1";
    case 2:
        echo "i igual 2";
}
?&gt;





  En este ejemplo, si $i es igual a 0, PHP ejecutará
  todas las instrucciones que
  siguen ! Si $i es igual a 1, PHP ejecutará
  las dos últimas instrucciones. Y solo si $i es
  igual a 2, se obtendrá el resultado
  esperado, es decir, la visualización de
  "i igual 2". Por lo tanto, es importante no olvidar
  la instrucción break (aunque es posible que se omita en ciertas circunstancias).




  En un comando switch, una condición se evalúa solo una vez, y el resultado se
  compara con cada case.
  En una estructura elseif, las condiciones se evalúan en cada comparación. Si la
  condición es más complicada que una simple
  comparación, o bien forma parte de un bucle,
  switch será más rápido.




  La lista de comandos de un case puede
  estar vacía, en cuyo caso PHP utilizará la lista de
  comandos del caso siguiente.




&lt;?php
switch ($i) {
    case 0:
    case 1:
    case 2:
        echo "i es menor que 3 pero no es negativo";
        break;
    case 3:
        echo "i igual 3";
}
?&gt;





  Un caso especial es default. Este caso se utiliza cuando todos
  los otros casos han fallado. Por ejemplo :




&lt;?php
switch ($i) {
    case 0:
        echo "i igual 0";
        break;
    case 1:
        echo "i igual 1";
        break;
    case 2:
        echo "i igual 2";
        break;
    default:
       echo "i no es igual a 2, ni a 1, ni a 0.";
}
?&gt;



  **Nota**:

    Varios casos default generarán un error de nivel
    **[E_COMPILE_ERROR](#constant.e-compile-error)**.




  **Nota**:

    Técnicamente, el caso default puede ser colocado
    en cualquier posición. Solo se utilizará si ningún otro caso coincide.
    Sin embargo, por convención, es preferible colocarlo al final.






  Si ningún case coincide, y no hay un default, entonces no se ejecutará ningún código, al igual que si ninguna instrucción if fuera verdadera.




    Un valor de case puede ser dado en forma de expresión. Sin embargo, esta expresión será
  evaluada sola, y luego comparada de manera aproximada con el valor del switch. Esto significa
  que no puede ser utilizada para evaluaciones complejas del valor del switch. Por ejemplo :




&lt;?php
$target = 1;
$start = 3;

switch ($target) {
    case $start - 1:
        print "A";
        break;
    case $start - 2:
        print "B";
        break;
    case $start - 3:
        print "C";
        break;
    case $start - 4:
        print "D";
        break;
}

// Muestra "B"
?&gt;





  Para comparaciones más complejas, el valor **[true](#constant.true)** puede ser utilizado como valor de switch.
  O, alternativamente, bloques if-else en lugar de switch.




&lt;?php
$offset = 1;
$start = 3;

switch (true) {
    case $start - $offset === 1:
        print "A";
        break;
    case $start - $offset === 2:
        print "B";
        break;
    case $start - $offset === 3:
        print "C";
        break;
    case $start - $offset === 4:
        print "D";
        break;
}

// Muestra "B"
?&gt;





  La sintaxis alternativa para esta estructura de control es
  la siguiente : (para más información, ver
  [sintaxis
  alternativas](#control-structures.alternative-syntax)).




&lt;?php
switch ($i):
    case 0:
        echo "i igual 0";
        break;
    case 1:
        echo "i igual 1";
        break;
    case 2:
        echo "i igual 2";
        break;
    default:
        echo "i no es igual a 2, ni a 1, ni a 0";
endswitch;
?&gt;





  Es posible utilizar un punto y coma en lugar de dos puntos después
  de un case, como sigue :




&lt;?php
switch($beer)
{
    case 'leffe';
    case 'grimbergen';
    case 'guinness';
        echo 'Buena elección';
        break;
    default;
        echo 'Por favor, haga una elección...';
        break;
}
?&gt;






  ### Ver también





    - [match](#control-structures.match)















 ## match

 (PHP 8)



  La expresión match permite realizar una evaluación basada en el
  control de identidad de un valor.
  De manera similar a una instrucción switch, una expresión
  match tiene una expresión sujeto que es
  comparada con varias alternativas. A diferencia de switch,
  se evalúa a un valor, como las expresiones ternarias.
  A diferencia de switch, la comparación es una verificación de identidad
  (===) en lugar de un control de igualdad débil (==).
  Las expresiones Match están disponibles a partir de PHP 8.0.0.





  **Ejemplo #1 Estructura de una expresión match**



&lt;?php
$return_value = match (subject_expression) {
    single_conditional_expression =&gt; return_expression,
    conditional_expression1, conditional_expression2 =&gt; return_expression,
};
?&gt;




  **Ejemplo #2 Uso básico de las expresiones match**



&lt;?php
$food = 'cake';

$return_value = match ($food) {
    'apple' =&gt; 'This food is an apple',
    'bar' =&gt; 'This food is a bar',
    'cake' =&gt; 'This food is a cake',
};

var_dump($return_value);
?&gt;


  El ejemplo anterior mostrará:




string(19) "This food is a cake"





   **Ejemplo #3 Ejemplo de uso de match con operadores de comparación**



&lt;?php
$age = 18;

$output = match (true) {
    $age &lt; 2 =&gt; "Bébé",
    $age &lt; 13 =&gt; "Enfant",
    $age &lt;= 19 =&gt; "Adolescent",
    $age &gt;= 40 =&gt; "Adulte âgé",
    $age &gt; 19 =&gt; "Jeune adulte",
};

var_dump($output);
?&gt;


  El ejemplo anterior mostrará:




string(9) "Adolescent"




  **Nota**:

    El resultado de una expresión match no necesita ser utilizado.




  **Nota**:

    Cuando una expresión match se utiliza como una expresión autónoma,
    *debe* ser terminada
    por un punto y coma ;.







  La expresión match es similar a una instrucción
  switch pero presenta algunas diferencias esenciales:




   -

     Una expresión match compara los valores de manera estricta (===)
     y no de manera débil como lo hace la instrucción switch.



   -

     Una expresión match devuelve un valor.



   -

     Las expresiones match no pasan a los casos siguientes como lo hacen las
     instrucciones switch.



   -

     Una expresión match debe ser exhaustiva.







  Al igual que las instrucciones switch, las expresiones match
  se ejecutan brazo por brazo. Al principio, ningún código se ejecuta.
  Las expresiones condicionales solo se evalúan si todas las expresiones condicionales
  anteriores no coinciden con la expresión del sujeto.
  Solo la expresión de retorno correspondiente a la expresión condicional correspondiente será evaluada.
  Por ejemplo:




&lt;?php
$result = match ($x) {
    foo() =&gt; 'value',
    $this-&gt;bar() =&gt; 'value', // $this-&gt;bar() no es llamado si foo() === $x
    $this-&gt;baz =&gt; beep(), // beep() no es llamado a menos que $x === $this-&gt;baz
    // etc.
};
?&gt;






  Los brazos de la expresión de match pueden contener múltiples expresiones
  separadas por una coma. Se trata de un OU lógico y de una abreviación para múltiples brazos
  que utilizan la misma expresión como resultado.








&lt;?php
$result = match ($x) {
    // Este brazo
    $a, $b, $c =&gt; 5,
    // Es equivalente a estos tres brazos:
    $a =&gt; 5,
    $b =&gt; 5,
    $c =&gt; 5,
};
?&gt;





  El patrón default es un caso particular.
  Este patrón coincide con todo lo que no ha sido buscado previamente.
  Por ejemplo:




&lt;?php
$expressionResult = match ($condition) {
    1, 2 =&gt; foo(),
    3, 4 =&gt; bar(),
    default =&gt; baz(),
};
?&gt;



  **Nota**:

    El uso de múltiples patrones por defecto provocará un error
   **[E_FATAL_ERROR](#constant.e-fatal-error)**.







  Una expresión match debe ser exhaustiva. Si la expresión
  no es tratada por ningún brazo de match, se lanza un error
 [UnhandledMatchError](#class.unhandledmatcherror).





 **Ejemplo #4 Ejemplo de una expresión match no manejada**



&lt;?php
$condition = 5;

try {
    match ($condition) {
        1, 2 =&gt; foo(),
        3, 4 =&gt; bar(),
    };
} catch (\UnhandledMatchError $e) {
    var_dump($e);
}
?&gt;


  El ejemplo anterior mostrará:




object(UnhandledMatchError)#1 (7) {
  ["message":protected]=&gt;
  string(33) "Unhandled match value of type int"
  ["string":"Error":private]=&gt;
  string(0) ""
  ["code":protected]=&gt;
  int(0)
  ["file":protected]=&gt;
  string(9) "/in/ICgGK"
  ["line":protected]=&gt;
  int(6)
  ["trace":"Error":private]=&gt;
  array(0) {
  }
  ["previous":"Error":private]=&gt;
  NULL
}





  ### Uso de expresiones match para manejar controles de no identidad


   Es posible utilizar una expresión match para tratar
   los casos condicionales de no identidad utilizando true como expresión sujeto.





  **Ejemplo #5 Uso de una expresión match generalizada para realizar ramificaciones sobre rangos de enteros**



&lt;?php

$age = 23;

$result = match (true) {
    $age &gt;= 65 =&gt; 'senior',
    $age &gt;= 25 =&gt; 'adult',
    $age &gt;= 18 =&gt; 'young adult',
    default =&gt; 'kid',
};

var_dump($result);
?&gt;


   El ejemplo anterior mostrará:




string(11) "young adult"





  **Ejemplo #6 Uso de una expresión match generalizada para realizar ramificaciones sobre el contenido de una cadena de caracteres**



&lt;?php

$text = 'Bienvenue chez nous';

$result = match (true) {
    str_contains($text, 'Welcome'), str_contains($text, 'Hello') =&gt; 'en',
    str_contains($text, 'Bienvenue'), str_contains($text, 'Bonjour') =&gt; 'fr',
    // ...
};

var_dump($result);
?&gt;


   El ejemplo anterior mostrará:




string(2) "fr"
















 ## declare

 (PHP 4, PHP 5, PHP 7, PHP 8)



  El elemento de lenguaje declare se utiliza para añadir directivas de ejecución en un bloque de código. La sintaxis de
  declare es similar a la sintaxis de otras funciones de control:





declare (directive)
    comandos






  La expresión directive permite controlar la intervención del bloque declare.
  Actualmente, solo tres directivas son reconocidas:



   - [ticks](#control-structures.declare.ticks)

   - [encoding](#control-structures.declare.encoding)

   - [strict_types](#language.types.declarations.strict)





  Como las directivas son gestionadas durante la compilación del fichero, solo
  los literales pueden ser utilizados como valor de estas directivas. Las variables
  y constantes no pueden ser utilizadas. Para ilustrar:




&lt;?php
// Esto es correcto:
declare(ticks=1);

// Esto es incorrecto:
const TICK_VALUE = 1;
declare(ticks=TICK_VALUE);
?&gt;





  La expresión comandos del bloque de
  declare será ejecutada. Cómo será ejecutada,
  y qué efectos tendrá, depende de la directiva utilizada en el bloque
  directive.




  La estructura declare puede también ser utilizada
  en el contexto global. Afecta entonces a todo el código que la
  sigue (incluso si el fichero con declare ha sido
  incluido después, no afecta al fichero padre).




&lt;?php
// Estas declaraciones son idénticas.

// Se puede utilizar esto
declare(ticks=1) {
    // script entero aquí
}

// o esto
declare(ticks=1);
// script entero aquí
?&gt;






  ### Ticks


   Un tick es un evento que interviene cada N
   comandos de bajo nivel tickables, ejecutados por el analizador en el bloque de
   declare. El valor de N es especificado
   por la sintaxis ticks=N en el bloque de
   directiva declare.




   No todos los comandos son tickables. Típicamente,
   las expresiones de condición y las expresiones de argumentos
   no son tickables.




   Un evento que interviene en cada tick es especificado con la función
   [register_tick_function()](#function.register-tick-function). Consulte el ejemplo
   a continuación para más detalles. Tenga en cuenta que más de un evento puede
   intervenir por tick.







   **Ejemplo #1 Ejemplo de uso de ticks**



&lt;?php

declare(ticks=1);

// Una función llamada en cada evento tick
function tick_handler()
{
    echo "tick_handler() llamado\n";
}

register_tick_function('tick_handler'); // causa un evento tick

$a = 1; // causa un evento tick

if ($a &gt; 0) {
    $a += 2; // causa un evento tick
    print $a; // causa un evento tick
}

?&gt;





  Ver también [register_tick_function()](#function.register-tick-function) y
  [unregister_tick_function()](#function.unregister-tick-function).





  ### La codificación


   La codificación de un script puede ser especificada por script utilizando la
   directiva encoding.



   **Ejemplo #2 Declaración de una codificación para un script**



&lt;?php
declare(encoding='ISO-8859-1');
// el código
?&gt;





  **Precaución**

    Combinada con los espacios de nombres, la única sintaxis válida para declare
    es declare(encoding='...'); donde ...
    es el valor de la codificación.  declare(encoding='...') {}
    generará un error de interpretación en el caso de los espacios de nombres.





   Ver también
   [zend.script_encoding](#ini.zend.script-encoding).














 ## return

 (PHP 4, PHP 5, PHP 7, PHP 8)



  return devuelve el control del programa al módulo llamante.
  La ejecución se reanuda entonces en la instrucción siguiente a la invocación del módulo.




  Si se llama desde una función, el comando return
  termina inmediatamente la función y devuelve el argumento que se le pasa.
  return también interrumpe la ejecución del comando
  [eval()](#function.eval) o de scripts.




  Si se llama desde el entorno global, la ejecución del script se
  interrumpe. Si el script actual fue incluido con la estructura
  [include](#function.include) o
  [require](#function.require),
  entonces el control se devuelve al script llamante. Además, si el fichero
  del script actual ha sido incluido a través de la instrucción
  [include](#function.include),
  entonces el valor devuelto será utilizado como resultado de la instrucción
  [include](#function.include).
  Si return es llamada desde el script principal,
  entonces la ejecución del script se detiene. Si el script actual es
  [**auto_prepend_file**](#ini.auto-prepend-file)
  o
  [**auto_append_file**](#ini.auto-append-file)
  en el fichero php.ini, entonces la ejecución del script se detiene.




  Para más información, véase
  [devolver valores](#functions.returning-values).






**Nota**:

    Tenga en cuenta que ya que return es una estructura de lenguaje,
    y no una función, los paréntesis que rodean los argumentos no son
    necesarios y su uso está desaconsejado.




  **Nota**:

    Si no se proporciona ningún parámetro, entonces los paréntesis deben ser
    omitidos y **[null](#constant.null)** será devuelto. La llamada de
    return con paréntesis pero sin argumento
    resultará en una alerta de análisis.







  A partir de PHP 7.1.0, las declaraciones de retorno sin argumento en la
  función generan un **[E_COMPILE_ERROR](#constant.e-compile-error)**, excepto si el
  tipo de retorno es [void](language.types.void.html), en cuyo caso las declaraciones de retorno
  con un argumento generan este error.















 ## require

 (PHP 4, PHP 5, PHP 7, PHP 8)




  require es idéntico a
  [include](#function.include)
  excepto por el hecho de que cuando ocurre un error, produce también
  una excepción [Error](#class.error) (error de nivel **[E_COMPILE_ERROR](#constant.e-compile-error)**
  antes de PHP 8.0.0), mientras que [include](#function.include) solo producirá una advertencia
  (error de nivel **[E_WARNING](#constant.e-warning)**).




  Consulte la documentación de la instrucción
  [include](#function.include)
  para conocer su funcionamiento.
















 ## include

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La expresión de lenguaje include incluye y ejecuta
  el fichero especificado en argumento.




  Esta documentación también se aplica a la instrucción de lenguaje
  [require](#function.require).




  Los ficheros se incluyen siguiendo la ruta del fichero proporcionada; si no se proporciona ninguna,
  se verificará el [include_path](#ini.include-path). Si el fichero no se encuentra en el
  [include_path](#ini.include-path),
  include verificará en el directorio del script llamador
  y en el directorio de trabajo actual antes de fallar. La instrucción
  include emitirá **[E_WARNING](#constant.e-warning)** si no puede encontrar el fichero; este comportamiento es diferente de
  [require](#function.require), que emitirá **[E_ERROR](#constant.e-error)**.




  Tenga en cuenta que include y require
  lanzarán errores de tipo **[E_WARNING](#constant.e-warning)**, si el
  fichero no es accesible, antes de lanzar un error de tipo
  **[E_WARNING](#constant.e-warning)** o **[E_ERROR](#constant.e-error)**, respectivamente.




  Si se define una ruta, absoluta (comenzando con una letra de unidad seguida
  de \ para Windows, o / para Unix/Linux)
  o relativa (comenzando con . o ..), el [include_path](#ini.include-path)
  será ignorado. Por ejemplo, si un nombre de fichero comienza con ../,
  PHP buscará en el directorio padre para encontrar el fichero especificado.




  Para más información sobre cómo PHP maneja los ficheros incluidos así
  como la ruta de inclusión, consulte la documentación relativa
  al [include_path](#ini.include-path).




  Cuando un fichero es incluido, el código que lo compone hereda el
  [ámbito de las variables](#language.variables.scope)
  de la línea donde aparece la inclusión. Todas las variables disponibles en esa
  línea en el fichero llamador estarán disponibles en el fichero llamado, a partir de ese punto. Sin embargo, todas las funciones y clases definidas en
  el fichero incluido tienen un ámbito global.







   **Ejemplo #1 Ejemplo con include**



vars.php
&lt;?php

$color = 'verde';
$fruit = 'manzana';

?&gt;

test.php
&lt;?php

echo "Una $fruit $color"; // Una

include 'vars.php';

echo "Una $fruit $color"; // Una manzana verde

?&gt;





  Si la inclusión ocurre dentro de una función,
  el código incluido será considerado como parte de la
  función. Esto modifica el contexto de las variables accesibles.
  Una excepción a esta regla: las [constantes mágicas](#language.constants.magic) son analizadas
  por el analizador antes de que la inclusión ocurra.







   **Ejemplo #2 Inclusión de ficheros dentro de una función**



&lt;?php

function foo()
{
    global $couleur;

    include 'vars.php';

    echo "Una $fruit $couleur";
}

/* vars.php está en el contexto de foo()
 * por lo tanto $fruit no está disponible fuera de
 * esta función. $couleur sí lo está, ya que es
 * una variable global */

foo();                      // Una pomme verte
echo "Una $fruit $couleur"; // Una  verte

?&gt;





  Es importante señalar que cuando un fichero es
  **include** o [require](#function.require),
  los errores de análisis aparecerán en HTML al
  principio del fichero, y el análisis del fichero
  padre no será interrumpido. Por esta razón, el código
  que está en el fichero debe ser colocado entre
  [las etiquetas
  habituales de PHP](#language.basic-syntax.phpmode).




  Si los [gestores de inclusión de URL](#ini.allow-url-include)
  están activados en PHP,
  puede localizar el fichero con una URL (vía HTTP o
  bien con un gestor adecuado: ver [Protocolos y Envolturas soportados](#wrappers)
  para una lista de protocolos), en lugar de una simple ruta
  local. Si el servidor remoto interpreta el fichero como código
  PHP, variables pueden ser transmitidas al servidor remoto
  vía la URL y el método GET. Esto no es, estrictamente hablando,
  lo mismo que heredar el contexto de variable.
  El fichero incluido es en realidad un script ejecutado a distancia,
  y su resultado es incluido en el código actual.







   **Ejemplo #3 Utilizar la instrucción include vía HTTP**



&lt;?php

/* Este ejemplo supone que www.example.com está configurado para tratar
 * los ficheros .php y no los ficheros .txt. Además,
 * 'Work' significa aquí que las variables
 * $foo y $bar están disponibles en el fichero incluido
 */

// No funciona: file.txt no ha sido tratado por www.example.com como PHP
include 'http://www.example.com/file.txt?foo=1&amp;bar=2';

// No funciona: el script busca un fichero llamado
// 'file.php?foo=1&amp;bar=2' en el sistema local
include 'file.php?foo=1&amp;bar=2';

// Funciona
include 'http://www.example.com/file.php?foo=1&amp;bar=2';
?&gt;




 **Advertencia**
  # Alerta de seguridad


   Un fichero remoto puede ser tratado en el servidor remoto
   (dependiendo de la extensión del fichero y si el servidor remoto
   ejecuta PHP o no) pero debe producir siempre un script PHP válido
   porque será tratado en el servidor local. Si el fichero del servidor
   remoto debe ser tratado en el lugar y mostrado solamente,
   [readfile()](#function.readfile) es una función mucho más apropiada.
   De otra manera, debería tener cuidado de asegurar el script remoto
   para que produzca un código válido y deseado.





  Ver también
  [trabajar con ficheros remotos](#features.remote-files),
  [fopen()](#function.fopen) y
  [file()](#function.file) para información relacionada.




  Manejo del retorno: include devuelve **[false](#constant.false)** en caso
  de error y emite un aviso. Las inclusiones exitosas, incluyendo si
  son sobrescritas por el fichero incluido, devuelven
  1. Es posible ejecutar la estructura de lenguaje
  [return](#function.return) dentro de un fichero
  incluido para determinar el proceso en ese fichero, y volver
  al script que lo llamó. Además, es posible devolver valores desde ficheros incluidos. Puede tomar el valor
  desde la llamada al fichero incluido como desee desde una
  función normal. Esto no es posible, sin embargo, al incluir ficheros remotos, y esto, mientras la salida del fichero remoto no tenga
  [etiquetas PHP de inicio
  y fin válidas](#language.basic-syntax.phpmode) (al igual que para los ficheros locales).
  Puede declarar las variables necesarias dentro de estas etiquetas
  y serán introducidas en el lugar donde el fichero fue incluido.




  Como include es una estructura de lenguaje particular,
  los paréntesis no son necesarios alrededor del argumento. Tenga cuidado
  al comparar el valor devuelto.



   **Ejemplo #4 Comparación del valor devuelto de una inclusión**



&lt;?php
// No funciona, evaluado como include(('vars.php') == TRUE), es decir include('1')
if (include('vars.php') == TRUE) {
    echo 'OK';
}

// Funciona
if ((include 'vars.php') == TRUE) {
    echo 'OK';
}
?&gt;








   **Ejemplo #5 include y [return](#function.return)**



return.php
&lt;?php

$var = 'PHP';

return $var;

?&gt;

noreturn.php
&lt;?php

$var = 'PHP';

?&gt;

testreturns.php
&lt;?php

$foo = include 'return.php';

echo $foo; // muestra 'PHP'

$bar = include 'noreturn.php';

echo $bar; // muestra 1

?&gt;





  $bar tiene el valor de 1 ya que
  la inclusión fue exitosa. Tenga en cuenta la diferencia entre los dos
  ejemplos anteriores. El primero utiliza el comando
  [return](#function.return)
  en el fichero incluido, mientras que el segundo no lo hace.
  Si el fichero no puede ser incluido, **[false](#constant.false)** es devuelto y un error
  de nivel **[E_WARNING](#constant.e-warning)** es enviado.




  Si hay funciones definidas en el fichero incluido, pueden ser
  utilizadas en el fichero principal si están antes del
  [return](#function.return) o después.
  Si el fichero es incluido dos veces, PHP emitirá un error fatal ya que las
  funciones ya han sido declaradas.
  Se recomienda utilizar [include_once](#function.include-once)
  en lugar de verificar si el fichero ya ha sido incluido y por lo tanto devolver
  condicionalmente la inclusión del fichero.




  Otra forma de incluir un fichero PHP en una variable es capturar
  la salida utilizando las funciones de
  [control de salida](#ref.outcontrol) con
  include. Por ejemplo:







   **Ejemplo #6 Uso del buffer de salida para incluir un fichero PHP en
   una cadena**



&lt;?php
$string = get_include_contents('somefile.php');

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

?&gt;





  Para incluir automáticamente ficheros en sus scripts, vea también
  las opciones de configuración
  [auto_prepend_file](#ini.auto-prepend-file) y
  [auto_append_file](#ini.auto-append-file)
  del php.ini.




 **Nota**: Como esto es una estructura
    del lenguaje, y no una función, no es posible llamarla
    con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).





  Ver también
  [require](#function.require),
  [require_once](#function.require-once),
  [include_once](#function.include-once),
  [get_included_files()](#function.get-included-files),
  [readfile()](#function.readfile), [virtual()](#function.virtual), y
  [include_path](#ini.include-path).















 ## require_once

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La expresión require_once es idéntica a
  [require](#function.require)
  salvo que PHP verifica si el fichero ya ha sido incluido, y si
  es el caso, no lo incluye una segunda vez.




  Ver la documentación de [include_once](#function.include-once)
  para más información sobre el comportamiento de _once,
  y lo que lo diferencia de las instrucciones sin _once.
















 ## include_once

 (PHP 4, PHP 5, PHP 7, PHP 8)



  La expresión include_once incluye y
  evalúa el fichero especificado durante la ejecución del script.
  El comportamiento es similar a
  [include](#function.include),
  pero la diferencia es que si el código ya ha sido incluido, no lo será una segunda vez, y include_once devuelve **[true](#constant.true)**. Como su nombre indica, el fichero será incluido solo una vez.




  La estructura include_once se utiliza
  preferentemente cuando el fichero va a ser
  incluido o evaluado varias veces en un script,
  o bien cuando se desea asegurar que solo se incluirá
  una vez, para evitar redefiniciones
  de funciones o clases.




  Véase la estructura [include](#function.include)
  para más detalles sobre su funcionamiento.















 ## goto

 (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)








    ![¿Cuál es la cosa más extraña al usar goto?](php-bigxhtml-data/images/0baa1b9fae6aec55bbb73037f3016001-xkcd-goto.png)



     Imagen proporcionada por [» xkcd](http://xkcd.com/292)







  El operador goto puede ser utilizado para continuar
  la ejecución del script en otro punto del programa.
  El destino es especificado por una etiqueta *sensible a mayúsculas y minúsculas*,
  seguida de dos puntos, y la instrucción goto es luego
  seguida de esta etiqueta. goto no está totalmente sin limitaciones.
  La etiqueta de destino debe estar en el mismo contexto y fichero, lo que significa
  que no es posible cambiar de método o función,
  ni ir a otra función. Asimismo, es imposible entrar
  en una estructura de bucle o un switch.
  Sin embargo, es posible salir de ellas, y el uso común es entonces utilizar
  goto como un break.







   **Ejemplo #1 Ejemplo con goto**



&lt;?php

goto a;
echo 'Foo';

a:
echo 'Bar';

?&gt;


   El ejemplo anterior mostrará:




Bar








   **Ejemplo #2 Ejemplo de bucle con goto**



&lt;?php
for ($i = 0, $j = 50; $i &lt; 100; $i++) {
    while ($j--) {
        if ($j == 17) {
            goto end;
        }
    }
}
echo "i = $i";
end:
echo 'j hit 17';

?&gt;


   El ejemplo anterior mostrará:




j hit 17








   **Ejemplo #3 Este goto no funciona**



&lt;?php
goto loop;
for ($i = 0, $j = 50; $i &lt; 100; $i++) {
    while ($j--) {
        loop:
    }
}
echo "$i = $i";

?&gt;


   El ejemplo anterior mostrará:




Fatal error: 'goto' into loop or switch statement is disallowed in
script on line 2























 # Las funciones

## Tabla de contenidos
- [Las funciones definidas por el usuario](#functions.user-defined)
- [Parámetros y argumentos de función](#functions.arguments)
- [Los valores de retorno](#functions.returning-values)
- [Funciones variables](#functions.variable-functions)
- [Funciones internas](#functions.internal)
- [Funciones anónimas](#functions.anonymous)
- [Función Flecha](#functions.arrow)
- [Sintaxis callable de primera clase](#functions.first_class_callable_syntax)




  ## Las funciones definidas por el usuario



   Una función se define utilizando el operador function,
   un nombre, una lista de argumentos (que pueden estar vacíos) separados por comas
   (,) entre paréntesis, seguidos del cuerpo de
   la función entre llaves, como sigue:




   **Ejemplo #1 Declaración de una nueva función llamada foo**



&lt;?php
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Ejemplo de función.\n";
    return $retval;
}
?&gt;



  **Nota**:



    A partir de PHP 8.0.0, la lista de argumentos puede tener una coma final:




&lt;?php
function foo($arg_1, $arg_2,) { }
?&gt;







   Todo código PHP válido puede aparecer dentro del cuerpo de una función, incluso otras
   funciones y definiciones de
   [clase](#language.oop5.basic.class).




   Los nombres de funciones siguen las mismas reglas que otros identificadores en PHP.
   Un nombre de función válido comienza con una letra o un subrayado, seguido
   por cualquier número de letras, números o subrayados.
   Estas reglas pueden representarse mediante la expresión regular siguiente:
   ^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$



  **Sugerencia**
 Eche un vistazo a [Guía de entorno de usuario para nombres](#userlandnaming).




   Las funciones no necesitan ser definidas antes de ser utilizadas,
   *SALVO* cuando una función es definida
   condicionalmente, como se muestra en los dos ejemplos siguientes.




   Cuando una función es definida de manera condicional, como en
   los ejemplos siguientes, su definición debe *preceder*
   su utilización.







    **Ejemplo #2 Funciones condicionales**



&lt;?php

$makefoo = true;

/* No es posible llamar a foo() aquí,
   ya que esta función no existe.
   Pero podemos utilizar bar() */

bar();

if ($makefoo) {
  function foo()
  {
    echo "No existo hasta que el programa pase por aquí.\n";
  }
}

/* Ahora podemos llamar a foo()
   ya que $makefoo se evalúa como verdadero */

if ($makefoo) foo();

function bar()
{
  echo "Existo desde el principio del programa.\n";
}

?&gt;








    **Ejemplo #3 Funciones dentro de otra función**



&lt;?php
function foo()
{
  function bar()
  {
    echo "No existo hasta que foo() sea llamado.\n";
  }
}

/* No es posible llamar a bar() aquí
   ya que no existe. */

foo();

/* Ahora podemos llamar a bar(),
   ya que la utilización de foo() la ha hecho
   accesible. */

bar();

?&gt;





   Todas las funciones y clases en PHP tienen un ámbito global - pueden ser llamadas
   fuera de una función si han sido definidas dentro y viceversa.




   PHP no soporta la sobrecarga, la destrucción y la redefinición de
   funciones ya declaradas.



  **Nota**:

    Los nombres de funciones son insensibles a mayúsculas/minúsculas para los caracteres ASCII
    A a Z,
    y es generalmente aceptado que las funciones deben
    ser llamadas con el nombre utilizado en su declaración,
    incluyendo la mayúscula/minúscula.





   Las [
   listas de argumentos de función variables](#functions.variable-arg-list) y los
   [valores por defecto
    de argumentos](#functions.arguments.default) son soportados: ver
   las funciones de referencia que son
   [func_num_args()](#function.func-num-args),
   [func_get_arg()](#function.func-get-arg), y
   [func_get_args()](#function.func-get-args) para más información.




   Es posible llamar a funciones recursivas en PHP.



    **Ejemplo #4 Funciones recursivas**



&lt;?php
function recursion($a)
{
    if ($a &lt; 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}
?&gt;



   **Nota**:

     Las llamadas de métodos/funciones recursivas con 100-200 niveles de
     recursividad pueden llenar la pila y así, terminar el script actual.
     Se debe notar que una recursión infinita es considerada un error de
     programación.











  ## Parámetros y argumentos de función


   Los parámetros de la función se declaran en la firma de la función.
   Información puede ser pasada a
   una función utilizando una lista de argumentos, donde cada
   expresión está separada por una coma. Los argumentos serán
   evaluados de izquierda a derecha, y el resultado es asignado a los parámetros de
   la función, antes de que la función sea efectivamente llamada
   (evaluación *inmediata*).





   PHP soporta el paso de argumentos por valor (comportamiento por defecto), [el paso por referencia](#functions.arguments.by-reference), y [valores por defecto de argumentos](#functions.arguments.default).
   Una [lista de argumentos variable](#functions.variable-arg-list),
   así como los [Argumentos Nombrados](#functions.named-arguments)
   también son soportados.



  **Nota**:



    A partir de PHP 7.3.0, es posible tener una coma final en la lista de argumentos
    para las llamadas de función:




&lt;?php
$v = foo(
    $arg_1,
    $arg_2,
);
?&gt;







    A partir de PHP 8.0.0, la lista de argumentos de función puede incluir una
    coma final, que será ignorada. Esto es particularmente útil en
    los casos donde la lista de argumentos es larga o contiene nombres de variables
    largos, haciendo práctico listar los argumentos verticalmente.




    **Ejemplo #1 Lista de parámetros de función con una coma final**



&lt;?php
function takes_many_args(
    $first_arg,
    $second_arg,
    $a_very_long_argument_name,
    $arg_with_default = 5,
    $again = 'a default string', // Esta coma final no era permitida antes de 8.0.0.
)
{
    // ...
}
?&gt;





   ### Paso de argumentos por referencia



    Por defecto, los argumentos son pasados
    a la función por valor (también, cambiar el valor de un argumento en la función no
    cambia su valor fuera de la función). Si se desea que las funciones
    puedan cambiar los valores de los argumentos, estos argumentos deben ser pasados por referencia.




    Si se desea que un argumento sea siempre pasado
    por referencia, se puede añadir un '&amp;'
    delante del parámetro en la declaración de la función:







     **Ejemplo #2 Paso de argumentos de función por referencia**



&lt;?php
function add_some_extra(&amp;$string)
{
    $string .= ', y un poco más.';
}
$str = 'Esto es un string';
add_some_extra($str);
echo $str; // Muestra: 'Esto es un string, y un poco más.'
?&gt;





    Es incorrecto pasar una expresión constante como argumento a un parámetro
    que espera ser pasado por referencia.






   ### Valores por defecto de parámetros



    Una función puede definir valores por defecto para los parámetros utilizando una sintaxis similar
    a la de la asignación de una variable. El valor por defecto es utilizado únicamente cuando el argumento del parámetro no es
    pasado. Tenga en cuenta que pasar **[null](#constant.null)** no *define*
    el valor por defecto.







     **Ejemplo #3 Valor por defecto de argumentos de funciones**



&lt;?php
function servir_cafe ($type = "cappuccino")
{
    return "Servir un $type.\n";
}
echo servir_cafe();
echo servir_cafe(null);
echo servir_cafe("espresso");
?&gt;


     El ejemplo anterior mostrará:




Servir un cappuccino.
Servir un .
Servir un espresso.





    Los valores por defecto de parámetros pueden ser valores escalares,
    [array](#language.types.array)s, el tipo especial **[null](#constant.null)**, y a partir de PHP 8.1.0,
    objetos utilizando la sintaxis [new ClassName()](#language.oop5.basic.new).







     **Ejemplo #4 Uso de tipo no escalar como valor por defecto**



&lt;?php
function servir_cafe($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "las manos" : $coffeeMaker;
    return "Preparación de una taza de ".join(", ", $types)." con $device.\n";
}
echo servir_cafe();
echo servir_cafe(array("cappuccino", "lavazza"), "una cafetera");
?&gt;


     El ejemplo anterior mostrará:




Preparación de una taza de cappuccino con las manos.
Preparación de una taza de cappuccino, lavazza con una cafetera.








        **Ejemplo #5 Uso de objetos como valores por defecto (a partir de PHP 8.1.0)**



&lt;?php
class DefaultCoffeeMaker {
    public function brew() {
        return 'Hacer café.\n';
    }
}
class FancyCoffeeMaker {
    public function brew() {
        return 'Crear un café bonito solo para usted.\n';
    }
}
function makecoffee($coffeeMaker = new DefaultCoffeeMaker)
{
    return $coffeeMaker-&gt;brew();
}
echo makecoffee();
echo makecoffee(new FancyCoffeeMaker);
?&gt;



      El ejemplo anterior mostrará:




Hacer café.
Crear un café bonito solo para usted.





    El valor por defecto de un argumento debe
    ser obligatoriamente una constante, y no puede ser
    ni una variable, ni un miembro de clase, ni una llamada de función.




    Tenga en cuenta que todos los parámetros opcionales deben ser especificados después de los
    parámetros obligatorios, de lo contrario no pueden ser omitidos en las llamadas.
    Considere el siguiente código:







     **Ejemplo #6 Uso incorrecto de parámetros de función por defecto**



&lt;?php
function hacerunyaourt ($container = "bol", $flavour)
{
    return "Preparar un $container de yogur a la $flavour.\n";
}

echo hacerunyaourt("framboise");   // "framboise" es $container, no $flavour
?&gt;


     El ejemplo anterior mostrará:




Fatal error: Uncaught ArgumentCountError: Too few arguments
 to function hacerunyaourt(), 1 passed in example.php on line 42





    Ahora comparemos el ejemplo anterior con el siguiente:







     **Ejemplo #7 Uso correcto de parámetros de función por defecto**



&lt;?php
function hacerunyaourt ($flavour, $container = "bol")
{
    return "Preparar un $container de yogur a la $flavour.\n";
}

echo hacerunyaourt ("framboise");   // "framboise" es $flavour
?&gt;


     El ejemplo anterior mostrará:




Preparar un bol de yogur a la framboise.





      A partir de PHP 8.0.0, los [argumentos nombrados](#functions.named-arguments)
      pueden ser utilizados para pasar por alto varios parámetros opcionales.







      **Ejemplo #8 Uso correcto de parámetros de función por defecto**



&lt;?php
function hacerunyaourt($container = "bol", $flavour = "framboise", $style = "Grec")
{
    return "Preparar un $container de yogur $style a la $flavour.\n";
}
echo hacerunyaourt(style: "natural");
?&gt;


      El ejemplo anterior mostrará:




Preparar un bol de yogur natural a la framboise.





      A partir de PHP 8.0.0, declarar parámetros obligatorios después de argumentos opcionales es *obsoleto*.
      Este problema puede generalmente resolverse abandonando el valor por defecto, ya que nunca será utilizado.
      Una excepción a esta regla concierne a los parámetros de la forma Type $param = null,
      donde el **[null](#constant.null)** por defecto hace el tipo implicitamente nullable.
      Este uso está deprecado desde PHP 8.4.0, y un
      [tipo nullable](#language.types.declarations.nullable)
      explícito debe ser utilizado en su lugar.



       **Ejemplo #9 Declaración de parámetros opcionales después de parámetros obligatorios**



&lt;?php

function foo($a = [], $b) {}     // Valor por defecto no utilizado; desaconsejado a partir de PHP 8.0.0
function foo($a, $b) {}          // Funcionalmente equivalente, sin advertencia de deprecación

function bar(A $a = null, $b) {} // A partir de PHP 8.1.0, $a es implicitamente requerido
                                 // (ya que precede a un parámetro requerido),
                                 // pero implicitamente nullable (desaconsejado a partir de PHP 8.4.0),
                                 // ya que el valor por defecto del parámetro es null
function bar(?A $a, $b) {}       // Recomendado

?&gt;




    **Nota**:

        A partir de PHP 7.1.0, la omisión de un parámetro que no especifica un valor por defecto lanza
        un [ArgumentCountError](#class.argumentcounterror);
        en versiones anteriores, esto generaba una advertencia.




   **Nota**:

     Los argumentos pasados por referencia pueden tener
     un valor por defecto.







   ### Lista de argumentos de número variable



    PHP soporta argumentos de número variable en las
    funciones definidas por el usuario utilizando el token
    ....





    La lista de argumentos puede incluir el
    token ... para indicar que esta función acepta
    un número variable de argumentos. Los argumentos serán pasados a la variable
    proporcionada en forma de un [array](#language.types.array):




     **Ejemplo #10 Uso de ... para acceder a argumentos variables**



&lt;?php
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
?&gt;


     El ejemplo anterior mostrará:




10






    ... también puede ser utilizado durante las llamadas de
    funciones para extraer el [array](#language.types.array) o la variable
    [Traversable](#class.traversable) o el literal en la lista de argumentos:




     **Ejemplo #11 Uso de ... para proporcionar argumentos**



&lt;?php
function add($a, $b) {
    return $a + $b;
}

echo add(...[1, 2])."\n";

$a = [1, 2];
echo add(...$a);
?&gt;


     El ejemplo anterior mostrará:




3
3






    Se pueden especificar parámetros clásicos antes de la palabra clave
    .... En este caso, solo los argumentos finales
    que no coincidan con un argumento clásico serán añadidos
    al array generado por ....





    También es posible añadir una
    [declaración de tipo](#language.types.declarations)
    antes del token .... Si esto está presente,
    entonces todos los argumentos capturados por ...
    deben coincidir con el tipo de parámetro.




     **Ejemplo #12 Conversión de argumentos variables**



&lt;?php
function total_intervals($unit, DateInterval ...$intervals) {
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval-&gt;$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).' días';

// Esto fallará, ya que null no es un objeto DateInterval.
echo total_intervals('d', null);
?&gt;


     El ejemplo anterior mostrará:




3 días
Catchable fatal error: Argument 2 passed to total_intervals() must be an instance of DateInterval, null given, called in - on line 14 and defined in - on line 2






    Finalmente, se pueden pasar argumentos variables
    [por referencia](#functions.arguments.by-reference)
    prefijando la palabra clave ... con un comercial
    (&amp;).







   ### Argumentos Nombrados



    PHP 8.0.0 introduce los argumentos nombrados como extensión a los parámetros
    posicionales existentes. Los argumentos nombrados permiten pasar los
    argumentos a una función basándose en el nombre del parámetro, en lugar de
    la posición del parámetro. Esto documenta automáticamente el significado
    del argumento, hace que el orden de los argumentos sea independiente y permite
    omitir valores por defecto arbitrariamente.





    Los argumentos nombrados se pasan prefijando el valor con el nombre del
    parámetro seguido de dos puntos. Utilizar palabras clave reservadas como
    nombre de parámetro está permitido. El nombre del parámetro debe ser un identificador,
    no se permite especificarlo de forma dinámica.





    **Ejemplo #13 Sintaxis de argumentos nombrados**



&lt;?php
myFunction(paramName: $value);
array_foobar(array: $value);

// NO soportado.
function_name($variableStoringParamName: $value);
?&gt;





    **Ejemplo #14 Argumentos posicionales comparados con argumentos nombrados**



&lt;?php
// Utilizando argumentos posicionales:
array_fill(0, 100, 50);

// Utilizando argumentos nombrados:
array_fill(start_index: 0, count: 100, value: 50);
?&gt;





    El orden en el que se pasan los argumentos nombrados no importa.





    **Ejemplo #15 Mismo ejemplo que arriba, pero con un orden de parámetro diferente**



&lt;?php
array_fill(value: 50, count: 100, start_index: 0);
?&gt;





    Los argumentos nombrados pueden ser combinados con los argumentos posicionales.
    En este caso, los argumentos nombrados deben venir después de los argumentos posicionales.
    También es posible especificar solo algunos de los argumentos opcionales
    de una función, independientemente de su orden.





    **Ejemplo #16 Combinar argumentos nombrados con argumentos posicionales**



&lt;?php
htmlspecialchars($string, double_encode: false);
// Igual que
htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8', false);
?&gt;





    Pasar el mismo argumento varias veces resulta en una
    [Error](#class.error) excepción.





    **Ejemplo #17 Error lanzado cuando un argumento es pasado varias veces al mismo parámetro nombrado**



&lt;?php
function foo($param) { ... }

foo(param: 1, param: 2);
// Error: Named parameter $param overwrites previous argument

foo(1, param: 2);
// Error: Named parameter $param overwrites previous argument

?&gt;





      A partir de PHP 8.1.0, es posible utilizar argumentos nombrados después de descomponer los argumentos.
      Un argumento nombrado *no debe* sobrescribir un argumento ya descompuesto.





      **Ejemplo #18 Utilizar argumentos nombrados después de la descomposición**



&lt;?php
function foo($a, $b, $c = 3, $d = 4) {
  return $a + $b + $c + $d;
}
var_dump(foo(...[1, 2], d: 40)); // 46
var_dump(foo(...['b' =&gt; 2, 'a' =&gt; 1], d: 40)); // 46
var_dump(foo(...[1, 2], b: 20)); // Error fatal. El parámetro nombrado $b sobrescribe el argumento anterior.
?&gt;










  ## Los valores de retorno



   Los valores son devueltos utilizando una
   instrucción de retorno opcional. Todos los tipos de variables
   pueden ser devueltos, incluyendo arrays y objetos. Esto hace
   que la función termine su ejecución inmediatamente y pase
   el control a la línea llamante. Ver
   [return](#function.return)
   para más información.



  **Nota**:



    Si [return](#function.return)
    es omitido, el valor **[null](#constant.null)** será devuelto.






   ### Uso de return





     **Ejemplo #1 Uso de [return](#function.return)**



&lt;?php
function cuadrado($num)
{
    return $num * $num;
}
echo cuadrado(4); // Muestra '16'
?&gt;






    Una función no puede devolver varios valores a la vez, pero
    puede obtenerse el mismo resultado devolviendo un array.







     **Ejemplo #2 Devolver un array de una función**



&lt;?php
function pequeño_numero()
{
    return [0, 1, 2];
}
// La descomposición de un array recolectará cada miembro del array individualmente
[$zero, $one, $two] = pequeño_numero();

// Anterior a PHP 7.1, la única alternativa equivalente es utilizando la estructura de lenguaje list()
list ($zero, $un, $deux) = pequeño_numero();
?&gt;





    Para devolver una referencia de una función, utilice
    el operador &amp; tanto en la declaración de la función como en
    la asignación del valor de retorno.







     **Ejemplo #3 Devolver una referencia de una función**



&lt;?php
function &amp;devolver_referencia()
{
    return $uneref;
}

$newref =&amp; devolver_referencia();
?&gt;





    Para más información sobre referencias, véase [la explicación sobre referencias](#language.references).









  ## Funciones variables



   PHP soporta el concepto de funciones variables.
   Esto significa que si el nombre de una variable es seguido de paréntesis,
   PHP buscará una función de mismo nombre y intentará ejecutarla.
   Esto puede servir, entre otras cosas, para hacer funciones de devolución de llamada, tablas de funciones...




   Las funciones variables no pueden funcionar con los
   elementos de lenguaje como los
   [echo](#function.echo), [print](#function.print),
   [unset()](#function.unset), [isset()](#function.isset),
   [empty()](#function.empty), [include](#function.include),
   [require](#function.require) etc. Se debe utilizar
   su propia gestión de funciones para utilizar uno de estos elementos
   de lenguaje como funciones variables.







    **Ejemplo #1 Ejemplo de función variable**



&lt;?php
function foo() {
    echo "en foo()&lt;br /&gt;\n";
}

function bar($arg = '')
{
    echo "En bar(); el argumento era '$arg'.&lt;br /&gt;\n";
}

// Esto es una función desviada de echo
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // Llama a foo()

$func = 'bar';
$func('test');  // Llama a bar()

$func = 'echoit';
$func('test');  // Llama a echoit()
?&gt;





   También se pueden llamar los métodos de un objeto utilizando el sistema de
   funciones variables.



    **Ejemplo #2 Ejemplo de método variable**



&lt;?php
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this-&gt;$name(); // Llama al método Bar()
    }

    function Bar()
    {
        echo "Es Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo-&gt;$funcname();  // Llama a $foo-&gt;Variable()

?&gt;





   Al llamar a métodos estáticos, la llamada de función es mejor que
   el operador de propiedad estática:



    **Ejemplo #3 Ejemplo de método variable con propiedades estáticas**



&lt;?php
class Foo
{
    static $variable = 'propiedad estática';
    static function Variable()
    {
        echo 'Método Variable llamado';
    }
}

echo Foo::$variable; // Esto muestra 'propiedad estática'. Es necesario tener una $variable en el contexto.
$variable = "Variable";
Foo::$variable();  // Esto llama a $foo-&gt;Variable(), leyendo así la $variable desde el contexto.

?&gt;








    **Ejemplo #4 callables complejo**



&lt;?php
class Foo
{
    static function bar()
    {
        echo "bar\n";
    }
    function baz()
    {
        echo "baz\n";
    }
}

$func = array("Foo", "bar");
$func(); // Muestra "bar"
$func = array(new Foo, "baz");
$func(); // Muestra "baz"
$func = "Foo::bar";
$func(); // Muestra "bar"






   ### Ver también





     - [is_callable()](#function.is-callable)

     - [call_user_func()](#function.call-user-func)

     - [function_exists()](#function.function-exists)

     - [Las variables variables](#language.variables.variable)









  ## Funciones internas



   PHP dispone de numerosas funciones y estructuras estándar. También
   hay funciones que requieren extensiones específicas de PHP, sin
   las cuales se obtendrá el error fatal
   undefined function. Por ejemplo, para utilizar las
   funciones [de imágenes](#ref.image),
   tales como [imagecreatetruecolor()](#function.imagecreatetruecolor), se necesitará el
   soporte de GD en PHP. O bien, para utilizar
   [mysqli_connect()](#function.mysqli-connect), se necesitará la extensión
   [MySQLi](#book.mysqli). Hay funciones básicas que
   están incluidas en todas las versiones de PHP, tales como las funciones de
   [strings](#ref.strings) y las funciones de [variables](#ref.var). Utilice
   [phpinfo()](#function.phpinfo) o
   [get_loaded_extensions()](#function.get-loaded-extensions) para saber qué extensiones están
   compiladas con su PHP. Tenga en cuenta también que
   numerosas extensiones están activadas por defecto, y que el manual de PHP está
   compartimentado por extensión. Véase los capítulos de
   [configuración](#configuration),
   [instalación](#install) así como los
   detalles particulares de cada extensión, para saber cómo ponerlas en marcha.




   Leer y comprender el prototipo de una función se describe en el apéndice
   [Cómo leer la definición de una
    función (prototipo)](#about.prototypes).
   Es importante comprender qué devuelve una función, o si una
   función trabaja directamente sobre el valor de los parámetros proporcionados. Por
   ejemplo, [str_replace()](#function.str-replace) devolverá una string modificada,
   mientras que [usort()](#function.usort) trabaja directamente sobre la variable
   pasada como parámetro. Cada página del manual tiene información específica
   sobre cada función, como el número de parámetros, las evoluciones de
   especificaciones, los valores devueltos en caso de éxito o fracaso, y la
   disponibilidad según las versiones. Conocer bien estas diferencias,
   a veces sutiles, es crucial para programar bien en PHP.



  **Nota**:

    Si los parámetros dados a una función no son correctos, como pasar un [array](#language.types.array) cuando se espera un [string](#language.types.string), el valor devuelto
    de la función es indefinido. En este caso, la función devolverá la mayoría de las veces un valor **[null](#constant.null)** pero esto es solo una convención y
    no puede ser considerado como una certeza.
    A partir de PHP 8.0.0, normalmente se lanza una excepción [TypeError](#class.typeerror)
    en este caso.




  **Nota**:



    En modo coercitivo, los tipos escalares de las funciones internas son nullables por defecto.
    A partir de PHP 8.1.0, pasar **[null](#constant.null)** a un parámetro de función interna que no está declarado
    como nullable está deprecado y emite una advertencia de deprecación en modo coercitivo para alinearse
    con el comportamiento de las funciones definidas por el usuario, donde los tipos escalares deben
    ser marcados como nullables explícitamente.




    Por ejemplo, la función [strlen()](#function.strlen) espera que el parámetro $string
    sea de tipo [string](#language.types.string) y no **[null](#constant.null)**.
    Por razones históricas, PHP permite pasar **[null](#constant.null)** para este parámetro en modo coercitivo.
    El parámetro es entonces convertido implícitamente a [string](#language.types.string), resultando en un valor "".
    Tenga en cuenta que una [TypeError](#class.typeerror) es emitida en modo estricto.





&lt;?php
var_dump(strlen(null));
// "Deprecated: Passing null to parameter #1 ($string) of type string is deprecated" a partir de PHP 8.1.0
// int(0)

var_dump(str_contains("foobar", null));
// "Deprecated: Passing null to parameter #2 ($needle) of type string is deprecated" a partir de PHP 8.1.0
// bool(true)
?&gt;





   ### Ver también





     - [function_exists()](#function.function-exists)

     - [el índice de funciones](#funcref)

     - [get_extension_funcs()](#function.get-extension-funcs)

     - [dl()](#function.dl)









  ## Funciones anónimas


   Las funciones anónimas, también llamadas closures o closures
   permiten la creación de funciones sin especificar su nombre.
   Son particularmente útiles como funciones de devolución de llamada [callable](#language.types.callable),
   pero su utilización no se limita a este único uso.




   Las funciones anónimas están implementadas utilizando la clase
   [<a href="#class.closure" class="classname">Closure](#class.closure)</a>.





   **Ejemplo #1 Ejemplos con funciones anónimas**



&lt;?php
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hola-mundo');
?&gt;





   Las funciones anónimas también pueden ser utilizadas como valores de
   variables. PHP convertirá automáticamente estas expresiones
   en objetos [Closure](#class.closure). Asignar un closure
   a una variable es lo mismo que una asignación clásica,
   incluyendo el punto y coma final.





   **Ejemplo #2 Asignación de función anónima a una variable**



&lt;?php
$saludo = function($name) {
    printf("Hola %s\r\n", $name);
};

$saludo('Mundo');
$saludo('PHP');
?&gt;





   Las funciones anónimas pueden heredar variables del contexto de su
   padre. Estas variables deben entonces ser pasadas en la construcción
   de lenguaje use.
   A partir de PHP 7.1, estas variables no deben incluir [superglobals](#language.variables.predefined),
   $this, o variables con el mismo nombre que un
   parámetro. Una declaración de tipo de retorno para la función debe ser colocada
   *después* de la cláusula use.





   **Ejemplo #3 Herencia de variable desde el contexto padre**



&lt;?php
$message = 'hola';

// Sin "use"
$example = function () {
    var_dump($message);
};
$example();

// Hereda $message
$example = function () use ($message) {
    var_dump($message);
};
$example();

// El valor de la variable heredada es definido cuando la función es
// definida no cuando es llamada
$message = 'mundo';
$example();

// Reinicialización de la variable message
$message = 'hola';

// Herencia por referencia
$example = function () use (&amp;$message) {
    var_dump($message);
};
$example();

// El cambio de valor en el contexto padre es reflejado al
// llamar a la función.
$message = 'mundo';
$example();

// Las funciones anónimas también aceptan argumentos clásicos
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hola");

// Declaración de tipo de retorno viene después de la cláusula use
$example = function () use ($message): string {
    return "hola $message";
};
var_dump($example());
?&gt;


   Resultado del ejemplo anterior es similar a:




Notice: Undefined variable: message in /example.php on line 6
NULL
string(5) "hola"
string(5) "hola"
string(5) "hola"
string(5) "mundo"
string(11) "hola mundo"
string(11) "hola mundo"





   A partir de PHP 8.0.0, la lista de variables heredadas del contexto puede
   incluir una coma final, que será ignorada.




   La herencia del contexto padre
   *no es* lo mismo que las variables
   del entorno global. Las variables globales existen en el
   contexto global, que es el mismo, independientemente de la función que
   se esté ejecutando. El contexto padre de una función anónima es la función
   en la que la función fue declarada (no necesariamente la que llama). Véase el ejemplo siguiente:





   **Ejemplo #4 Funciones anónimas y contexto**



&lt;?php
// Un carrito de compra simple, que contiene una lista de productos
// seleccionados y la cantidad deseada de cada producto. Incluye
// un método que calcula el precio total de los elementos en el carrito
// utilizando una función de devolución de llamada anónima.
class Carrito
{
    const PRECIO_MANTEQUILLA  = 1.00;
    const PRECIO_LECHE    = 3.00;
    const PRECIO_HUEVO    = 6.95;

    protected $products = array();

    public function add($product, $quantity)
    {
        $this-&gt;products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this-&gt;products[$product]) ? $this-&gt;products[$product] :
               FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &amp;$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRECIO_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };

        array_walk($this-&gt;products, $callback);
        return round($total, 2);
    }
}

$mi_carrito = new Carrito;

// Añadir elementos al carrito
$mi_carrito-&gt;add('mantequilla', 1);
$mi_carrito-&gt;add('leche', 3);
$mi_carrito-&gt;add('huevo', 6);

// Mostrar el precio con 5.5% de IVA
print $mi_carrito-&gt;getTotal(0.055) . "\n";
// El resultado será 54.29
?&gt;





   **Ejemplo #5 Vinculación automática de $this**



&lt;?php

class Test
{
    public function testing()
    {
        return function() {
            var_dump($this);
        };
    }
}

$object = new Test;
$function = $object-&gt;testing();
$function();

?&gt;


   El ejemplo anterior mostrará:




object(Test)#1 (0) {
}





   Cuando se declara en el contexto de una clase, la clase
   actual es automáticamente vinculada, haciéndola $this
   disponible en el contexto de la función. Si este vínculo automático de
   la clase actual no es deseado, entonces las
   [funciones anónimas
    estáticas](#functions.anonymous-functions.static) pueden ser utilizadas en su lugar.





   ### Las funciones anónimas estáticas


    Las funciones anónimas pueden ser declaradas estáticamente.
    Esto permite no vincular automáticamente la clase actual a la función.
    Los objetos también pueden no ser vinculados durante la ejecución.







     **Ejemplo #6 Intento de uso de $this en una función anónima estática**



&lt;?php

class Foo
{
    function __construct()
    {
        $func = static function() {
            var_dump($this);
        };
        $func();
    }
};
new Foo();

?&gt;


      El ejemplo anterior mostrará:




Notice: Undefined variable: this in %s on line %d
NULL









      **Ejemplo #7 Intento de vinculación de un objeto a una función anónima estática**



&lt;?php

$func = static function() {
    // cuerpo de la función
};
$func = $func-&gt;bindTo(new stdClass);
$func();

?&gt;


      El ejemplo anterior mostrará:




Warning: Cannot bind an instance to a static closure in %s on line %d







   ### Historial de cambios








        Versión
        Descripción






        8.3.0

         Los closures creados a partir de las [métodos
         mágicos](#language.oop5.magic) pueden aceptar argumentos nombrados.




        7.1.0

         Las funciones anónimas no pueden cerrarse sobre [superglobals](#language.variables.predefined),
         $this, o cualquier variable con el mismo nombre que un
         parámetro.











   ### Notas

   **Nota**:

     Es posible utilizar las funciones [func_num_args()](#function.func-num-args),
     [func_get_arg()](#function.func-get-arg) y [func_get_args()](#function.func-get-args)
     en una función anónima.










   ## Función Flecha



    Las funciones flecha fueron introducidas en PHP 7.4 como sintaxis
    más concisa para las
    [funciones anónimas](#functions.anonymous).




    Las funciones anónimas como las funciones flecha están implementadas utilizando la clase
    [<a href="#class.closure" class="classname">Closure](#class.closure)</a>.





    Las funciones flecha tienen la forma básica
    fn (argument_list) =&gt; expr.





    Las funciones flecha soportan las mismas características que las
    [funciones anónimas](#functions.anonymous),
    excepto que el uso de variables del ámbito padre es automático.





    Cuando una variable utilizada en la expresión está definida en el ámbito
    padre, será capturada implícitamente por valor.
    En el siguiente ejemplo, las funciones $fn1 y
    $fn2 se comportan de manera idéntica.








     **Ejemplo #1 Las funciones flecha capturan variables por valor automáticamente**



&lt;?php

$y = 1;

$fn1 = fn($x) =&gt; $x + $y;
// equivalente a usar $y por valor:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
?&gt;


     El ejemplo anterior mostrará:




4





    Esto también funciona si las funciones flecha están anidadas:







     **Ejemplo #2 Las funciones flecha capturan variables por valor automáticamente, incluso anidadas**



&lt;?php

$z = 1;
$fn = fn($x) =&gt; fn($y) =&gt; $x * $y + $z;
// Muestra 51
var_export($fn(5)(10));
?&gt;





    Similar a las funciones anónimas,
    la sintaxis de las funciones flecha permite firmas de función arbitrarias,
    esto incluye tipos de parámetros y de retorno, valor por defecto, variable,
    así como el paso y retorno por referencia.
    Todos los siguientes ejemplos son funciones flecha válidas:







     **Ejemplo #3 Ejemplos de funciones flecha**



&lt;?php

fn(array $x) =&gt; $x;
static fn($x): int =&gt; $x;
fn($x = 42) =&gt; $x;
fn(&amp;$x) =&gt; $x;
fn&amp;($x) =&gt; $x;
fn($x, ...$rest) =&gt; $rest;

?&gt;





    Las funciones flecha vinculan variables por valor.
    Esto es aproximadamente equivalente a hacer un use($x) para
    cada variable $x utilizada dentro de la función
    flecha.
    Un vínculo por valor significa que no es posible modificar un
    valor del ámbito exterior.
    [Las funciones anónimas](#functions.anonymous)
    pueden ser utilizadas en su lugar para vínculos por referencia.







     **Ejemplo #4
      Valores del ámbito exterior no pueden ser modificados por funciones flecha
     **



&lt;?php

$x = 1;
$fn = fn() =&gt; $x++; // No tiene efecto
$fn();
var_export($x);  // Muestra 1

?&gt;






    ### Historial de cambios








         Versión
         Descripción






         7.4.0

          Las funciones flecha están ahora disponibles.











    ### Notas

    **Nota**:

      Es posible utilizar [func_num_args()](#function.func-num-args),
      [func_get_arg()](#function.func-get-arg), y [func_get_args()](#function.func-get-args)
      desde dentro de una función flecha.










  ## Sintaxis callable de primera clase



   La sintaxis de callable de primera clase se introduce a partir de PHP 8.1.0,
   como una manera de crear [funciones anónimas](#functions.anonymous)
   desde [callables](#language.types.callable).
   Reemplaza la sintaxis de callables existente que utiliza cadenas y arrays.
   La ventaja de esta sintaxis es que es accesible al análisis estático
   y utiliza el ámbito del punto donde el callable es adquirido.





   La sintaxis CallableExpr(...) se utiliza para crear un objeto
   [Closure](#class.closure) desde el callable.
   CallableExpr acepta cualquier expresión que pueda ser directamente
   llamada en la gramática de PHP:



    **Ejemplo #1 Sintaxis callable de primera clase básica**



     &lt;?php
class Foo {
   public function method() {}
   public static function staticmethod() {}
   public function __invoke() {}
}
$obj = new Foo();
$classStr = 'Foo';
$methodStr = 'method';
$staticmethodStr = 'staticmethod';
$f1 = strlen(...);
$f2 = $obj(...);  // objeto invocable
$f3 = $obj-&gt;method(...);
$f4 = $obj-&gt;$methodStr(...);
$f5 = Foo::staticmethod(...);
$f6 = $classStr::$staticmethodStr(...);
// callable tradicional usando string, array
$f7 = 'strlen'(...);
$f8 = [$obj, 'method'](...);
$f9 = [Foo::class, 'staticmethod'](...);
?&gt;





  **Nota**:



    Los ... forman parte de la sintaxis y no son una omisión.






   CallableExpr(...) tiene las mismas semánticas que [Closure::fromCallable()](#closure.fromcallable).
   Es decir, a diferencia de los callables que utilizan cadenas y arrays,
   CallableExpr(...) respeta el ámbito del punto donde es creado:



    **Ejemplo #2 Comparación de ámbito de CallableExpr(...) y callables tradicionales**



&lt;?php
class Foo {
    public function getPrivateMethod() {
        return [$this, 'privateMethod'];
    }
    private function privateMethod() {
        echo __METHOD__, "\n";
    }
}
$foo = new Foo;
$privateMethod = $foo-&gt;getPrivateMethod();
$privateMethod();
// Fatal error: Call to private method Foo::privateMethod() from global scope
// Esto es porque la llamada se realiza fuera de Foo y la visibilidad será verificada desde este punto.
class Foo1 {
    public function getPrivateMethod() {
        // Usa el ámbito donde el callable es adquirido.
        return $this-&gt;privateMethod(...); // idéntico a Closure::fromCallable([$this, 'privateMethod']);
    }
    private function privateMethod() {
        echo __METHOD__, "\n";
    }
}
$foo1 = new Foo1;
$privateMethod = $foo1-&gt;getPrivateMethod();
$privateMethod();  // Foo1::privateMethod
?&gt;






  **Nota**:



    La creación de objetos con esta sintaxis (por ejemplo new Foo(...)) no es soportada,
    ya que la sintaxis new Foo() no es considerada una llamada.





  **Nota**:



    La sintaxis de callable de primera clase no puede ser combinada con
    el [operador nullsafe](#language.oop5.basic.nullsafe).
    Los dos casos siguientes resultan en un error de compilación:




&lt;?php
$obj?-&gt;method(...);
$obj?-&gt;prop-&gt;method(...);
?&gt;





















 # Clases y objetos

## Tabla de contenidos
- [Introducción](#oop5.intro)
- [Sintaxis básica](#language.oop5.basic)
- [Propiedades](#language.oop5.properties)
- [Hooks de propiedad](#language.oop5.property-hooks)
- [Constantes de clase](#language.oop5.constants)
- [Autocarga de clases](#language.oop5.autoload)
- [Constructores y destructores](#language.oop5.decon)
- [Visibilidad](#language.oop5.visibility)
- [Herencia](#language.oop5.inheritance)
- [El operador de resolución de ámbito (::)](#language.oop5.paamayim-nekudotayim)
- [Estático](#language.oop5.static)
- [Abstracción de clases](#language.oop5.abstract)
- [Interfaces](#language.oop5.interfaces)
- [Traits](#language.oop5.traits)
- [Clases anónimas](#language.oop5.anonymous)
- [Sobrecarga mágica](#language.oop5.overloading)
- [Recorrido de objetos](#language.oop5.iterations)
- [Métodos mágicos](#language.oop5.magic)
- [Palabra clave "final"](#language.oop5.final)
- [Clonación de objetos](#language.oop5.cloning)
- [Comparación de objetos](#language.oop5.object-comparison)
- [Late Static Bindings (Résolution statique a la volée)](#language.oop5.late-static-bindings)
- [Objetos y referencias](#language.oop5.references)
- [Serialización de objetos](#language.oop5.serialization)
- [Covarianza y Contravarianza](#language.oop5.variance)
- [Objetos perezosos](#language.oop5.lazy-objects)
- [Modificaciones en POO (Programación orientada a objetos)](#language.oop5.changelog)



  ## Introducción


   PHP incluye un modelo de objetos completo.
   Algunas de sus características son:
   [visibilidad](#language.oop5.visibility),
   clases y métodos [abstractos](#language.oop5.abstract) y
   [finales](#language.oop5.final),
   [métodos mágicos](#language.oop5.magic) adicionales,
   [interfaces](#language.oop5.interfaces), y
   [clonación](#language.oop5.cloning).




   PHP trata los objetos de la misma manera que las referencias o manejadores, lo que significa que
   cada variable contiene una referencia a un objeto en lugar de una copia de todo el objeto. Véanse los
   [Objetos y referencias](#language.oop5.references)



  **Sugerencia**
 Eche un vistazo a [Guía de entorno de usuario para nombres](#userlandnaming).











  ## Sintaxis básica


   ### class


    Una definición de clase básica comienza con la palabra clave
    class, seguida del nombre de la clase.
    Sigue un par de llaves que contienen la definición de las propiedades y los
    métodos que pertenecen a la clase.




    El nombre de la clase puede ser cualquiera siempre que no sea una
    [palabra reservada](#reserved) en PHP.
    A partir de PHP 8.4.0, el uso de un solo guion bajo _ como nombre de clase es obsoleto.
    Un nombre de clase válido comienza con una letra o un guion bajo,
    seguido de cualquier número de letras, dígitos o guiones bajos.
    En términos de expresión regular, esto se expresaría así:
    ^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$.




    Una clase puede contener sus propias [constantes](#language.oop5.constants),
    [variables](#language.oop5.properties)
    (llamadas "propiedades"), y funciones (llamadas "métodos").




    **Ejemplo #1 Definición típica de una clase**



&lt;?php
class SimpleClass
{
    // declaración de una propiedad
    public $var = 'un valor por omisión';

    // declaración de los métodos
    public function displayVar() {
        echo $this-&gt;var;
    }
}
?&gt;




    La pseudo-variable $this está disponible
    cuando un método es llamado desde un contexto de objeto.
    $this es el valor del objeto que llama.



   **Advertencia**

     Llamar a un método no estático estáticamente lanza una
     [Error](#class.error).
     Antes de PHP 8.0.0, esto generaba una notificación de obsolescencia,
     y $this no estaba definido.




     **Ejemplo #2 Algunos ejemplos de la pseudo-variable $this**



&lt;?php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this está definido (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this no está definido.\n";
        }
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

$a = new A();
$a-&gt;foo();

A::foo();

$b = new B();
$b-&gt;bar();

B::bar();
?&gt;


     Resultado del ejemplo anterior en PHP 7:




$this está definido (A)

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 27
$this no está definido.

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 20
$this no está definido.

Deprecated: Non-static method B::bar() should not be called statically in %s  on line 32

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 20
$this no está definido.


     Resultado del ejemplo anterior en PHP 8:




$this está definido (A)

Fatal error: Uncaught Error: Non-static method A::foo() cannot be called statically in %s :27
Stack trace:
#0 {main}
  thrown in %s  on line 27






      #### Clases de solo lectura (readonly)


        A partir de PHP 8.2.0, una clase puede ser marcada
        con el modificador readonly.
        Marcar una clase como readonly añadirá
        el [modificador readonly](#language.oop5.properties.readonly-properties)
        a cada propiedad declarada, y evitará la creación
        de [propiedades dinámicas](#language.oop5.properties.dynamic-properties).
        Además, no es posible añadir su soporte utilizando
        el atributo [AllowDynamicProperties](#class.allowdynamicproperties).
        Cualquier intento de hacerlo desencadenará un error de compilación.





&lt;?php
#[\AllowDynamicProperties]
readonly class Foo {
}

// Fatal error: Cannot apply #[AllowDynamicProperties] to readonly class Foo
?&gt;





        Como ni las propiedades no tipadas ni las propiedades estáticas
        pueden ser marcadas con el modificador readonly,
        las clases readonly no pueden declararlas:





&lt;?php
readonly class Foo
{
    public $bar;
}

// Fatal error: Readonly property Foo::$bar must have type
?&gt;



&lt;?php
readonly class Foo
{
    public static int $bar;
}

// Fatal error: Readonly class Foo cannot declare static properties
?&gt;




        Una clase readonly puede ser
        [extendida](#language.oop5.basic.extends) si,
        y solo si, la clase hija es también
        una clase readonly.








   ### La palabra clave new


    Para crear una instancia de una clase, la palabra clave new debe ser
    utilizada. Un objeto será entonces sistemáticamente creado, a menos que tenga un
    [constructor](#language.oop5.decon)
    definido que lance una [excepción](#language.exceptions)
    en caso de error. Las clases deben ser definidas antes de la instanciación (en
    algunos casos, esto es imprescindible).




    Si una variable [string](#language.types.string) que contiene un nombre de clase es utilizada con
    new, una nueva instancia de esa clase será creada.
    Si la clase está en un espacio de nombres, su nombre completamente calificado debe ser utilizado.




   **Nota**:



     Si no hay argumentos para pasar al constructor de la clase,
     los paréntesis después del nombre de la clase pueden ser omitidos.






    **Ejemplo #3 Creación de una instancia**



&lt;?php

class SimpleClass {
}

$instance = new SimpleClass();
var_dump($instance);

// Esto también puede realizarse con una variable:
$className = 'SimpleClass';
$instance = new $className(); // new SimpleClass()
var_dump($instance);
?&gt;





    A partir de PHP 8.0.0, el uso de new con expresiones arbitrarias es soportado.
    Esto permite instanciaciones más complejas si la expresión produce un
    [string](#language.types.string). La expresión debe estar rodeada de paréntesis.




    **Ejemplo #4 Crear una instancia utilizando una expresión arbitraria**



     En el ejemplo dado, se muestran varios ejemplos de expresiones
     arbitrarias válidas que producen un nombre de clase.
     Esto muestra una llamada de función, una concatenación de cadenas
     y la constante **[::class](#.constants.class)**.




&lt;?php

class ClassA extends \stdClass {}
class ClassB extends \stdClass {}
class ClassC extends ClassB {}
class ClassD extends ClassA {}

function getSomeClass(): string
{
    return 'ClassA';
}

var_dump(new (getSomeClass()));
var_dump(new ('Class' . 'B'));
var_dump(new ('Class' . 'C'));
var_dump(new (ClassD::class));
?&gt;


    Resultado del ejemplo anterior en PHP 8:




object(ClassA)#1 (0) {
}
object(ClassB)#1 (0) {
}
object(ClassC)#1 (0) {
}
object(ClassD)#1 (0) {
}





    En el contexto de la clase, es posible crear un nuevo objeto
    con new self y new parent.




    Al asignar una instancia ya creada de una clase a una variable,
    la nueva variable accederá a la misma instancia que el objeto que fue asignado.
    Este comportamiento es el mismo al pasar una instancia a una función.
    Una copia de un objeto ya creado puede ser realizada por
    [clonación](#language.oop5.cloning).




    **Ejemplo #5 Asignación de un objeto**



&lt;?php
class SimpleClass {
    public string $var;
}

$instance = new SimpleClass();

$assigned   =  $instance;
$reference  =&amp; $instance;

$instance-&gt;var = '$assigned tendrá este valor';

$instance = null; // $instance y $reference se vuelven null

var_dump($instance);
var_dump($reference);
var_dump($assigned);
?&gt;


    El ejemplo anterior mostrará:




NULL
NULL
object(SimpleClass)#1 (1) {
   ["var"]=&gt;
     string(30) "$assigned tendrá este valor"
}




    Es posible crear una instancia de un objeto de varias maneras diferentes:




    **Ejemplo #6 Crear nuevos objetos**



&lt;?php

class Test
{
    public static function getNew()
    {
        return new static();
    }
}

class Child extends Test {}

$obj1 = new Test(); // Por el nombre de la clase
$obj2 = new $obj1; // A través de la variable que contiene un objeto
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew(); // Por el método de clase
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew(); // A través de un método de clase hija
var_dump($obj4 instanceof Child);

?&gt;


    El ejemplo anterior mostrará:




bool(true)
bool(true)
bool(true)





    Es posible acceder a un miembro de un objeto recién
    creado en una sola expresión:




    **Ejemplo #7 Acceder a un miembro de un objeto recién creado**



&lt;?php
echo (new DateTime())-&gt;format('Y'), PHP_EOL;

// los paréntesis alrededor son opcionales desde PHP 8.4.0
echo new DateTime()-&gt;format('Y'), PHP_EOL;
?&gt;


    Resultado del ejemplo anterior es similar a:




2025
2025




   **Nota**:

     Anterior a PHP 7.1, los argumentos no son evaluados si no hay
     función constructora definida.







   ### Propiedades y métodos


    Las propiedades y métodos de clase viven en "espacios de nombres" separados,
    por lo que es posible tener una propiedad y un método con el mismo nombre.
    Hacer referencia tanto a una propiedad como a un método tienen la misma
    notación, y el hecho de que una propiedad será accedida o que un método será llamado,
    depende solo del contexto, es decir, si el uso es un acceso variable
    o una llamada de función.




    **Ejemplo #8 Acceso a propiedad contra llamada de método**



&lt;?php
class Foo
{
    public $bar = 'propiedad';

    public function bar() {
        return 'método';
    }
}

$obj = new Foo();
echo $obj-&gt;bar, PHP_EOL, $obj-&gt;bar(), PHP_EOL;


    El ejemplo anterior mostrará:




propiedad
método




    Esto significa que llamar a una [función
    anónima](#functions.anonymous) que ha sido asignada a una propiedad no es posible directamente.
    En su lugar, la propiedad debe ser primero asignada a una variable.
    Es posible llamar a este tipo de propiedad directamente
    poniéndola entre paréntesis.




    **Ejemplo #9 Llamar a una función anónima almacenada en una propiedad**



&lt;?php
class Foo
{
    public $bar;

    public function __construct() {
        $this-&gt;bar = function() {
            return 42;
        };
    }
}

$obj = new Foo();

echo ($obj-&gt;bar)(), PHP_EOL;


    El ejemplo anterior mostrará:




42






   ### La palabra clave extends


    Una clase puede heredar las constantes, métodos y propiedades de otra clase utilizando la palabra clave extends en la declaración.
    No es posible extender múltiples clases: una clase puede
    heredar solo de una clase base.




    Las constantes, métodos y propiedades heredadas pueden ser redefinidas redeclarándolas con el
    mismo nombre que en la clase padre. Sin embargo, si la clase padre ha definido
    un método o constante como [final](#language.oop5.final),
    entonces estos no pueden ser redefinidos. Es posible acceder a los
    métodos o propiedades estáticas redefinidas haciendo referencia a ellos con el operador
    [parent::](#language.oop5.paamayim-nekudotayim).



   **Nota**:

     A partir de PHP 8.1.0, las constantes pueden ser declaradas como finales.





    **Ejemplo #10 Herencia simple de una clase**



&lt;?php
class SimpleClass
{
    function displayVar()
    {
        echo "Clase padre\n";
    }
}

class ExtendClass extends SimpleClass
{
  // Redefinición del método padre
  function displayVar()
  {
    echo "Clase extendida\n";
    parent::displayVar();
  }
}

$extended = new ExtendClass();
$extended-&gt;displayVar();
?&gt;


    El ejemplo anterior mostrará:




Clase extendida
Clase padre




    #### Reglas de compatibilidad de firma


     Al sobrecargar un método, su firma debe ser compatible con
     el método padre. De lo contrario, se emite un error fatal, o, anterior a
     PHP 8.0.0, se genera un error de nivel **[E_WARNING](#constant.e-warning)**.
     Una firma es compatible si respeta las reglas de
     [varianza](#language.oop5.variance), hace un parámetro
     obligatorio opcional, y solo si todos los nuevos parámetros son
     opcionales y suavizan las reglas de visibilidad.
     Esto es conocido como el Principio de Sustitución de Liskov
     (Liskov Substitution Principle), o simplemente LSP.
     El [constructor](#language.oop5.decon.constructor),
     y los métodos private están excluidos de estas reglas de
     compatibilidad de firmas, y por lo tanto no emitirán un error fatal en caso de firma incompatible.




     **Ejemplo #11 Métodos hijos compatibles**



&lt;?php
class Base
{
    public function foo(int $a) {
        echo "Válido\n";
    }
}
class Extend1 extends Base
{
    function foo(int $a = 5)
    {
        parent::foo($a);
    }
}
class Extend2 extends Base
{
    function foo(int $a, $b = 5)
    {
        parent::foo($a);
    }
}
$extended1 = new Extend1();
$extended1-&gt;foo();
$extended2 = new Extend2();
$extended2-&gt;foo(1);


     El ejemplo anterior mostrará:




Válido
Válido





     Los siguientes ejemplos demuestran que un método hijo que elimina un parámetro,
     o hace un parámetro opcional obligatorio, no es compatible con el método padre.




     **Ejemplo #12 Error fatal cuando un método hijo elimina un parámetro**



&lt;?php
class Base
{
    public function foo(int $a = 5) {
        echo "Válido\n";
    }
}
class Extend extends Base
{
    function foo()
    {
        parent::foo(1);
    }
}


     Resultado del ejemplo anterior en PHP 8 es similar a:




Fatal error: Declaration of Extend::foo() must be compatible with Base::foo(int $a = 5) in /in/evtlq on line 13




     **Ejemplo #13 Error fatal cuando un método hijo hace un parámetro opcional obligatorio**



&lt;?php
class Base
{
    public function foo(int $a = 5) {
        echo "Válido\n";
    }
}
class Extend extends Base
{
    function foo(int $a)
    {
        parent::foo($a);
    }
}


     Resultado del ejemplo anterior en PHP 8 es similar a:




Fatal error: Declaration of Extend::foo(int $a) must be compatible with Base::foo(int $a = 5) in /in/qJXVC on line 13




    **Advertencia**

      Renombrar un parámetro de un método en una clase hija no es
      una incompatibilidad de firma. Sin embargo, esto es desaconsejado ya que resultará en una [Error](#class.error) en tiempo de ejecución si los
      [argumentos nombrados](#functions.named-arguments)
      son utilizados.




      **Ejemplo #14 Error al usar argumentos nombrados y cuando los parámetros han sido renombrados en una clase hija**



&lt;?php
class A {
    public function test($foo, $bar) {}
}
class B extends A {
    public function test($a, $b) {}
}
$obj = new B;
// Pasar parámetros según el contrato A::test()
$obj-&gt;test(foo: "foo", bar: "bar"); // ERROR!


      Resultado del ejemplo anterior es similar a:




Fatal error: Uncaught Error: Unknown named parameter $foo in /in/XaaeN:14
Stack trace:
#0 {main}
  thrown in /in/XaaeN on line 14








   ### ::class



    La palabra clave class también se utiliza
    para la resolución de nombres de clases.
    Es posible obtener el nombre completamente calificado de una clase
    ClassName utilizando ClassName::class.
    Esto es particularmente útil con las clases que utilizan
    [espacios de nombres](#language.namespaces).







     **Ejemplo #15 Resolución de nombre de clase**



&lt;?php
namespace NS {
    class ClassName {
    }

    echo ClassName::class;
}
?&gt;


     El ejemplo anterior mostrará:




NS\ClassName




   **Nota**:



     La resolución del nombre de clase utilizando ::class es una
     transformación durante la compilación. Es decir, en el instante en que se crea la cadena del
     nombre de la clase, aún no se ha producido ninguna carga automática. Por lo tanto,
     los nombres de clases se extienden incluso si la clase no existe. No se emite ningún error
     en este caso.




     **Ejemplo #16 Resolución de nombre de clase faltante**



&lt;?php
print Does\Not\Exist::class;
?&gt;


     El ejemplo anterior mostrará:




Does\Not\Exist





    A partir de PHP 8.0.0, ::class puede ser utilizado
    en los objetos. Esta resolución ocurre durante la ejecución, y no durante la compilación. Sus efectos son los mismos que llamar
    [get_class()](#function.get-class) en el objeto.




    **Ejemplo #17 Resolución del nombre de un objeto**



&lt;?php
namespace NS {
    class ClassName {
    }

    $c = new ClassName();
    print $c::class;
}
?&gt;


    El ejemplo anterior mostrará:




NS\ClassName





  ### Métodos y propiedades nullsafe


   A partir de PHP 8.0.0, los métodos y propiedades también pueden ser accedidos
   con el operador "nullsafe": ?-&gt;. El operador nullsafe
   funciona de manera idéntica al acceso de propiedades o métodos como si fuera arriba,
   con la excepción de que si el objeto que se está desreferenciando es **[null](#constant.null)** entonces **[null](#constant.null)** será
   devuelto en lugar de lanzar una excepción. Si la desreferencia se hace por una cadena, el resto de la cadena es ignorado.




   El efecto es similar a rodear cada acceso con una verificación con
   [is_null()](#function.is-null) primero, pero más compacto.







    **Ejemplo #18 Operador nullsafe**



&lt;?php

// A partir de PHP 8.0.0, esta línea:
$result = $repository?-&gt;getUser(5)?-&gt;name;

// Es equivalente al siguiente bloque de código:
if (is_null($repository)) {
    $result = null;
} else {
    $user = $repository-&gt;getUser(5);
    if (is_null($user)) {
        $result = null;
    } else {
        $result = $user-&gt;name;
    }
}
?&gt;




  **Nota**:



    El operador nullsafe es mejor utilizado cuando null es considerado un valor válido
    y potencialmente esperado para una propiedad o valor de retorno de un método.
    Para indicar un error, lanzar una excepción es preferible.














 ## Propiedades



  Las variables dentro de una clase se denominan *propiedades*.
  También pueden encontrarse bajo otros nombres como
  *campos*, pero para esta documentación
  se utilizará *propiedad*.
  Se definen utilizando al menos un modificador (como
  [Visibilidad](#language.oop5.visibility),
  [Estático](#language.oop5.static), o, a partir de PHP 8.1.0,
  [readonly](#language.oop5.properties.readonly-properties)),
  seguido opcionalmente (excepto para las propiedades readonly),
  a partir de PHP 7.4, de una declaración de tipo,
  seguida de una declaración clásica de variable.
  Esta declaración puede incluir una inicialización, pero esta debe
  ser un valor [constante](#language.constants)



 **Nota**:



   Una manera obsoleta de declarar una propiedad de clase es utilizar
   la palabra clave var en lugar de un modificador.




 **Nota**:

   Una propiedad declarada sin modificador de [Visibilidad](#language.oop5.visibility)
   será declarada como public.





  Dentro de los métodos de clases, las propiedades no estáticas pueden ser
  llamadas utilizando la sintaxis -&gt; (operador de objeto) :
  $this-&gt;property (donde property es el
  nombre de la propiedad). Las propiedades estáticas pueden ser llamadas utilizando la sintaxis :: (dos puntos) :
  self::$property. Consulte la documentación sobre
  [Estático](#language.oop5.static) para más información
  sobre la diferencia entre las propiedades estáticas y no estáticas.




  La pseudo-variable $this está disponible dentro de cualquier
  método, cuando este método es llamado dentro de un objeto.
  $this es el valor del objeto que llama.








   **Ejemplo #1 Declaraciones de propiedades**



&lt;?php
class SimpleClass
{
   public $var1 = 'hello ' . 'world';
   public $var2 = &lt;&lt;&lt;EOD
hello world
EOD;
   public $var3 = 1+2;
   // declaración de propiedad no válida :
   public $var4 = self::myStaticMethod();
   public $var5 = $myVar;

   // Declaraciones válidas de propiedades :
   public $var6 = myConstant;
   public $var7 = [true, false];
   public $var8 = &lt;&lt;&lt;'EOD'
hello world
EOD;

   // Sin modificador de visibilidad :
   static $var9;
   readonly int $var10;
}
?&gt;





 **Nota**:



   Existen diversas funciones que permiten gestionar clases y objetos.
   Ver la referencia sobre las [Funciones Clases/Objetos](#ref.classobj).






   ### Declaraciones de tipos



   A partir de PHP 7.4.0, las definiciones de propiedades pueden incluir una
   [Declaraciones de tipo](#language.types.declarations),
   con la excepción del tipo callable.



    **Ejemplo #2 Ejemplo de propiedades tipadas**



&lt;?php

class User
{
    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name)
    {
        $this-&gt;id = $id;
        $this-&gt;name = $name;
    }
}

$user = new User(1234, null);

var_dump($user-&gt;id);
var_dump($user-&gt;name);

?&gt;


    El ejemplo anterior mostrará:




int(1234)
NULL





    Las propiedades tipadas deben ser inicializadas antes de acceder a ellas, de lo contrario,
    se emitirá un [Error](#class.error).



     **Ejemplo #3 Acceso a propiedades**



&lt;?php

class Shape
{
    public int $numberOfSides;
    public string $name;

    public function setNumberOfSides(int $numberOfSides): void
    {
        $this-&gt;numberOfSides = $numberOfSides;
    }

    public function setName(string $name): void
    {
        $this-&gt;name = $name;
    }

    public function getNumberOfSides(): int
    {
        return $this-&gt;numberOfSides;
    }

    public function getName(): string
    {
        return $this-&gt;name;
    }
}

$triangle = new Shape();
$triangle-&gt;setName("triangle");
$triangle-&gt;setNumberofSides(3);
var_dump($triangle-&gt;getName());
var_dump($triangle-&gt;getNumberOfSides());

$circle = new Shape();
$circle-&gt;setName("circle");
var_dump($circle-&gt;getName());
var_dump($circle-&gt;getNumberOfSides());
?&gt;


     El ejemplo anterior mostrará:




string(8) "triangle"
int(3)
string(6) "circle"

Fatal error: Uncaught Error: Typed property Shape::$numberOfSides must not be accessed before initialization







  ### Propiedades de solo lectura (readonly)


   A partir de PHP 8.1.0, una propiedad puede ser declarada con el modificador readonly,
   lo que impide la modificación de la propiedad después de la inicialización.   Antes de PHP 8.4.0
    una propiedad readonly es implícitamente privada-modificable, y solo puede ser escrita
    desde la misma clase. A partir de PHP 8.4.0, las propiedades readonly son implícitamente
    [protected(set)](#language.oop5.visibility-members-aviz),
    por lo que pueden ser definidas desde clases hijas. Esto puede ser reemplazado
    explícitamente si se desea.



    **Ejemplo #4 Ejemplo de propiedades de solo lectura**



&lt;?php

class Test {
   public readonly string $prop;

   public function __construct(string $prop) {
       // Inicialización legal.
       $this-&gt;prop = $prop;
   }
}

$test = new Test("foobar");
// Lectura legal.
var_dump($test-&gt;prop); // string(6) "foobar"

// Reasignación ilegal. No importa que el valor asignado sea idéntico.
$test-&gt;prop = "foobar";
// Error: Cannot modify readonly property Test::$prop
?&gt;



   **Nota**:



     El modificador de solo lectura solo puede ser aplicado a
     [propiedades tipadas](#language.oop5.properties.typed-properties).
     Una propiedad de solo lectura sin restricción de tipo puede ser creada utilizando el tipo [Mixed](#language.types.mixed).




   **Nota**:



     Las propiedades estáticas de solo lectura no son soportadas.






   Una propiedad de solo lectura solo puede ser inicializada una vez,
   y solo desde el ámbito en el que fue declarada. Cualquier otra asignación o modificación de la propiedad resultará en una
   excepción [Error](#class.error).



    **Ejemplo #5 Inicialización ilegal de propiedades de solo lectura**



&lt;?php
class Test1 {
    public readonly string $prop;
}

$test1 = new Test1;
// Inicialización ilegal fuera del ámbito privado.
$test1-&gt;prop = "foobar";
// Error: Cannot initialize readonly property Test1::$prop from global scope
?&gt;




  **Nota**:



    Especificar un valor por defecto explícito a una propiedad de solo lectura
    no está permitido, ya que una propiedad de solo lectura con un valor por defecto es esencialmente idéntica a una constante, y por lo tanto
    no particularmente útil.




&lt;?php

class Test {
    // Fatal error: Readonly property Test::$prop cannot have default value
    public readonly int $prop = 42;
}
?&gt;





  **Nota**:



    Las propiedades de solo lectura no pueden ser
    [unset()](#function.unset) una vez que han sido inicializadas.
    Sin embargo, es posible unset una propiedad de solo lectura antes
    de su inicialización, desde el ámbito donde la propiedad fue declarada.





   Las modificaciones no son necesariamente asignaciones simples,
   todos los ejemplos siguientes resultarán en una excepción [Error](#class.error) :




&lt;?php

class Test {
    public function __construct(
        public readonly int $i = 0,
        public readonly array $ary = [],
    ) {}
}

$test = new Test;
$test-&gt;i += 1;
$test-&gt;i++;
++$test-&gt;i;
$test-&gt;ary[] = 1;
$test-&gt;ary[0][] = 1;
unset($test-&gt;ary[0]);
$ref =&amp; $test-&gt;i;
$test-&gt;i =&amp; $ref;
byRef($test-&gt;i);
foreach ($test as &amp;$prop);
?&gt;





   Sin embargo, las propiedades de solo lectura no excluyen la mutabilidad interna.
   Los objetos (o recursos) almacenados en las propiedades de solo lectura
   pueden ser modificados internamente :




&lt;?php

class Test {
    public function __construct(public readonly object $obj) {}
}

$test = new Test(new stdClass);
// Mutación interna legal.
$test-&gt;obj-&gt;foo = 1;
// Reasignación ilegal.
$test-&gt;obj = new stdClass;
?&gt;





   A partir de PHP 8.3.0, las propiedades de solo lectura pueden ser reinicializadas al clonar un objeto
   utilizando el método [__clone()](#object.clone).



    **Ejemplo #6 Propiedades de solo lectura y clonación**



&lt;?php
class Test1 {
    public readonly ?string $prop;

    public function __clone() {
        $this-&gt;prop = null;
    }

    public function setProp(string $prop): void {
        $this-&gt;prop = $prop;
    }
}

$test1 = new Test1;
$test1-&gt;setProp('foobar');

$test2 = clone $test1;
var_dump($test2-&gt;prop); // NULL
?&gt;







  ### Propiedades Dinámicas


   Al intentar asignar a una propiedad no existente en un
   [object](#language.types.object), PHP creará automáticamente una propiedad correspondiente.
   Esta propiedad creada dinámicamente estará *únicamente*
   disponible en esta instancia de clase.




  **Advertencia**

    Las propiedades dinámicas están obsoletas a partir de PHP 8.2.0.
    Se recomienda declarar la propiedad en su lugar.
    Para manejar nombres de propiedades arbitrarios, la clase debería implementar
    los métodos mágicos [__get()](#object.get) y
    [__set()](#object.set).
    Como último recurso, la clase puede ser marcada con el atributo
    #[\AllowDynamicProperties].















 ## Hooks de propiedad



  Los hooks de propiedad, también conocidos como "métodos de acceso de propiedad" en otros lenguajes,
  son una forma de interceptar y reemplazar el comportamiento de lectura y escritura de una propiedad.
  Esta funcionalidad sirve a dos fines:




  -

    Permite utilizar propiedades directamente, sin necesidad de métodos get y set,
    dejando la posibilidad de añadir un comportamiento adicional en el futuro.
    Esto hace que la mayoría de los métodos get/set sean innecesarios,
    incluso sin usar hooks.



  -

    Permite definir propiedades que describen un objeto sin almacenar
    directamente un valor.





  Existen dos hooks disponibles en las propiedades no estáticas: get y set.
  Permiten reemplazar el comportamiento de lectura y escritura de una propiedad, respectivamente.
  Los hooks están disponibles para propiedades tipadas y no tipadas.




  Un objeto puede ser "backed" o "virtual".
  Una propiedad "backed" es una propiedad que almacena efectivamente un valor.
  Cualquier propiedad que no tenga hooks es "backed".
  Una propiedad virtual es una propiedad que tiene hooks y estos hooks no interactúan con la propiedad misma.
  En este caso, los hooks son efectivamente los mismos que los métodos,
  y el objeto no utiliza espacio para almacenar un valor para esta propiedad.




  Los hooks de propiedad son incompatibles con las propiedades readonly.
  Si es necesario restringir el acceso a una operación get o set
  además de modificar su comportamiento, utilice
  [la visibilidad asimétrica de propiedad](#language.oop5.visibility-members-aviz).




 **Nota**:
  **Información de versión**

   Los hooks de propiedad fueron introducidos en PHP 8.4.






  ### Sintaxis básica de los hooks


   La sintaxis general para declarar un hook es la siguiente.




   **Ejemplo #1 Hooks de propiedad (versión completa)**



&lt;?php
class Example
{
    private bool $modified = false;

    public string $foo = 'valor por omisión' {
        get {
            if ($this-&gt;modified) {
                return $this-&gt;foo . ' (modificado)';
            }
            return $this-&gt;foo;
        }
        set(string $value) {
            $this-&gt;foo = strtolower($value);
            $this-&gt;modified = true;
        }
    }
}

$example = new Example();
$example-&gt;foo = 'cambiado';
print $example-&gt;foo;
?&gt;




   La propiedad $foo termina con {}, en lugar de un punto y coma.
   Esto indica la presencia de hooks.
   Se definen un hook get y un hook set,
   aunque es posible definir solo uno.
   Ambos hooks tienen un cuerpo, indicado por {}, que puede contener código arbitrario.




   El hook set también permite especificar el tipo y el nombre de un valor entrante,
   utilizando la misma sintaxis que una método.
   El tipo debe ser el mismo que el tipo de la propiedad,
   o [contravariante](#language.oop5.variance.contravariance) (más amplio) que este.
   Por ejemplo, una propiedad de tipo [string](#language.types.string) podría tener
   un hook set que acepte un [string](#language.types.string)|[Stringable](#class.stringable),
   pero no uno que acepte solo [array](#language.types.array).




   Al menos uno de los hooks hace referencia a $this-&gt;foo, la propiedad misma.
   Esto significa que la propiedad será "backed".
   Cuando se llama a $example-&gt;foo = 'cambiado',
   la cadena proporcionada se convertirá primero en minúsculas y luego se guardará en el valor de respaldo.
   Al leer la propiedad, el valor previamente guardado puede ser condicionalmente complementado
   con texto adicional.




   Hay varias variantes de sintaxis abreviada para manejar los casos comunes.




   Si el hook get es una simple expresión,
   entonces los {} pueden ser omitidos y reemplazados por una expresión flecha.




   **Ejemplo #2 Expresión de propiedad get**



    Este ejemplo es equivalente al ejemplo anterior.




&lt;?php
class Example
{
    private bool $modified = false;

    public string $foo = 'valor por omisión' {
        get =&gt; $this-&gt;foo . ($this-&gt;modified ? ' (modificado)' : '');

        set(string $value) {
            $this-&gt;foo = strtolower($value);
            $this-&gt;modified = true;
        }
    }
}
?&gt;




   Si el tipo del parámetro del hook set es el mismo que el tipo de la propiedad (lo cual es típico),
   puede ser omitido. En este caso, el valor a definir se nombra automáticamente $value.




   **Ejemplo #3 Parámetros por omisión de propiedad**



    Este ejemplo es equivalente al ejemplo anterior.




&lt;?php
class Example
{
    private bool $modified = false;

    public string $foo = 'valor por omisión' {
        get =&gt; $this-&gt;foo . ($this-&gt;modified ? ' (modificado)' : '');

        set {
            $this-&gt;foo = strtolower($value);
            $this-&gt;modified = true;
        }
    }
}
?&gt;




   Si el hook set solo define una versión modificada del valor pasado,
   también puede simplificarse en una expresión flecha.
   El valor al que se evalúa la expresión se definirá en el valor de respaldo.




   **Ejemplo #4 Expresión de propiedad set**



&lt;?php
class Example
{
    public string $foo = 'valor por omisión' {
        get =&gt; $this-&gt;foo . ($this-&gt;modified ? ' (modificado)' : '');
        set =&gt; strtolower($value);
    }
}
?&gt;




   Este ejemplo no es completamente equivalente al anterior,
   ya que tampoco modifica $this-&gt;modified.
   Si se necesitan múltiples instrucciones en el cuerpo del hook, utilice la versión con llaves.




   Una propiedad puede implementar cero, uno o ambos hooks según la situación.
   Todas las versiones abreviadas son mutuamente independientes.
   Es decir, utilizar un atajo para obtener una definición larga,
   o un atajo para definir un tipo explícito, etc., es válido.




   En una propiedad "backed", omitir un hook get o set
   significa que se utilizará el comportamiento de lectura o escritura por omisión.



  **Nota**:

    Los hooks pueden ser definidos al utilizar la
    [promoción de propiedades en el constructor](#language.oop5.decon.constructor.promotion).
    Sin embargo, en este caso, los valores proporcionados
    al constructor deben coincidir con el tipo asociado a la propiedad,
    independientemente de lo que el hook set podría permitir.


    Considere el siguiente ejemplo:




&lt;?php
class Example
{
    public function __construct(
        public private(set) DateTimeInterface $created {
            set (string|DateTimeInterface $value) {
                if (is_string($value)) {
                    $value = new DateTimeImmutable($value);
                }
                $this-&gt;created = $value;
            }
        },
    ) {
    }
}



    Internamente, el motor descompone esto de la siguiente manera:


&lt;?php
class Example
{
    public private(set) DateTimeInterface $created {
        set (string|DateTimeInterface $value) {
            if (is_string($value)) {
                $value = new DateTimeImmutable($value);
            }
            $this-&gt;created = $value;
        }
    }

    public function __construct(
        DateTimeInterface $created,
    ) {
        $this-&gt;created = $created;
    }
}



    Cualquier intento de definir la propiedad fuera del constructor
    permitirá un [string](#language.types.string) o un valor de tipo [DateTimeInterface](#class.datetimeinterface),
    pero el constructor solo permitirá [DateTimeInterface](#class.datetimeinterface).
    Esto se debe a que el tipo definido para la propiedad ([DateTimeInterface](#class.datetimeinterface))
    se utiliza como tipo de parámetro en la firma del constructor, independientemente de lo que
    el hook set permita.


    Si este tipo de comportamiento es necesario desde el constructor, la promoción
    de propiedades en el constructor no puede ser utilizada.




  ### Propiedades virtuales


   Las propiedades virtuales son propiedades que no tienen un valor de respaldo.
   Una propiedad es virtual si ni su hook get ni su hook set
   hace referencia a la propiedad misma utilizando una sintaxis exacta.
   Es decir, una propiedad nombrada $foo cuyo hook contiene $this-&gt;foo será respaldada.
   Pero la siguiente propiedad no es una propiedad respaldada, y generará un error:




   **Ejemplo #5 Propiedad virtual inválida**



&lt;?php
class Example
{
    public string $foo {
        get {
            $temp = __PROPERTY__;
            return $this-&gt;$temp; // No se refiere a $this-&gt;foo, por lo que no cuenta.
        }
    }
}
?&gt;




   Para las propiedades virtuales, si se omite un hook, entonces esa operación
   no existe y tratar de utilizarla producirá un error.
   Las propiedades virtuales no ocupan espacio de memoria en un objeto.
   Las propiedades virtuales son adecuadas para las propiedades "derivadas",
   tales como las que son la combinación de dos otras propiedades.




   **Ejemplo #6 Propiedad virtual**



&lt;?php
class Rectangle
{
    // Una propiedad virtual.
    public int $area {
        get =&gt; $this-&gt;h * $this-&gt;w;
    }

    public function __construct(public int $h, public int $w) {}
}

$s = new Rectangle(4, 5);
print $s-&gt;area; // muestra 20
$s-&gt;area = 30; // Error, ya que no hay operación de definición.
?&gt;




   Definir tanto un hook get como un hook set en una propiedad virtual también está permitido.





  ### Alcance


   Todos los hooks funcionan en el alcance del objeto modificado.
   Esto significa que tienen acceso a todos los métodos públicos, privados o protegidos del objeto,
   así como a todas las propiedades públicas, privadas o protegidas,
   incluyendo las propiedades que pueden tener sus propios hooks de propiedad.
   Acceder a otra propiedad desde un hook no elude los hooks definidos en esa propiedad.




   La consecuencia más notable de esto es que los hooks no triviales pueden
   llamar a un método arbitrariamente complejo si lo desean.




   **Ejemplo #7 Llamada a un método desde un hook**



&lt;?php
class Person {
    public string $phone {
        set =&gt; $this-&gt;sanitizePhone($value);
    }

    private function sanitizePhone(string $value): string {
        $value = ltrim($value, '+');
        $value = ltrim($value, '1');

        if (!preg_match('/\d\d\d\-\d\d\d\-\d\d\d\d/', $value)) {
            throw new \InvalidArgumentException();
        }
        return $value;
    }
}
?&gt;





  ### Referencias


   Debido a que la presencia de hooks intercepta el proceso de lectura y escritura de las propiedades,
   plantean problemas al adquirir una referencia a una propiedad o con una modificación indirecta,
   tal como $this-&gt;arrayProp['key'] = 'value';.
   Esto se debe a que cualquier intento de modificar el valor por referencia eludiría un hook de definición
   si existiera uno.




   En el caso raro en que sea necesario obtener una referencia a una propiedad para la cual se definen hooks,
   el hook get puede ser prefijado por &amp;
   para que devuelva por referencia.
   Definir tanto get como &amp;get en la
   misma propiedad es un error de sintaxis.




   Definir tanto los hooks &amp;get como set en una propiedad "backed" no está permitido.
   Como se indicó anteriormente, escribir en el valor devuelto por referencia eludiría el hook set.
   En las propiedades virtuales, no hay un valor común necesario compartido entre los dos hooks, por lo que definir ambos está permitido.




   Escribir en un índice de una propiedad de array implica también una referencia implícita.
   Por esta razón, escribir en una propiedad de array "backed" con hooks definidos está permitido si y solo si
   define solo un hook &amp;get.
   En una propiedad virtual, escribir en el array devuelto por
   get o &amp;get es legal,
   pero si esto tiene un impacto en el objeto depende de la implementación del hook.




   Sobrecargar la propiedad de array completa está permitido, y se comporta de la misma manera que cualquier otra propiedad.
   Trabajar solo con elementos del array requiere atención especial.





  ### Herencia


   #### Hooks finales


    Los hooks también pueden ser declarados [final](#language.oop5.final),
    en cuyo caso no pueden ser reemplazados.




   **Ejemplo #8 Hooks finales**



&lt;?php
class Utiliser
{
    public string $Utilisername {
        final set =&gt; strtolower($value);
    }
}

class Manager extends Utiliser
{
    public string $Utilisername {
        // Esto está permitido
        get =&gt; strtoupper($this-&gt;Utilisername);

        // Esto NO está permitido, ya que set es final en el padre.
        set =&gt; strtoupper($value);
    }
}
?&gt;




    Una propiedad también puede ser declarada [final](#language.oop5.final).
    Una propiedad final no puede ser redeclarada por una clase hija de ninguna manera,
    lo que excluye la modificación de los hooks o la ampliación de su acceso.




    Declarar hooks finales en una propiedad que es declarada final es redundante,
    y será silenciosamente ignorado.
    Es el mismo comportamiento que para los métodos finales.




    Una clase hija puede declarar o cambiar hooks individuales en una propiedad
    redefiniendo la propiedad y solo los hooks que desea reemplazar.
    Una clase hija también puede añadir hooks a una propiedad que no los tenía.
    Esto es esencialmente lo mismo que si los hooks fueran métodos.




    **Ejemplo #9 Herencia de hook**



&lt;?php
class Point
{
    public int $x;
    public int $y;
}

class PositivePoint extends Point
{
    public int $x {
        set {
            if ($value &lt; 0) {
                throw new \InvalidArgumentException('Too small');
            }
            $this-&gt;x = $value;
        }
    }
}
?&gt;




    Cada hook reemplaza las implementaciones parentales de manera independiente.
    Si una clase hija añade hooks, cualquier valor por omisión definido en la propiedad es eliminado, y debe ser redeclarado.
    Es la misma coherencia con el funcionamiento de la herencia en las propiedades sin hooks.





   #### Acceso a los hooks parentales


    Un hook en una clase hija puede acceder a la propiedad de la clase padre utilizando la palabra clave
    parent::$prop, seguida del hook deseado.
    Por ejemplo, parent::$propName::get().
    Esto puede ser leído como "acceder a la prop definida en la clase padre,
    luego ejecutar su operación get" (o set, según el caso).




    Si no se accede de esta manera, el hook de la clase padre es ignorado.
    Este comportamiento es coherente con el funcionamiento de todos los métodos.
    Esto también proporciona una manera de acceder al almacenamiento de la clase padre, si es necesario.
    Si no hay un hook en la propiedad padre,
    su comportamiento por omisión get/set será utilizado.
    Los hooks no pueden acceder a otro hook que no sea su propio padre en su propia propiedad.




    El ejemplo anterior podría ser reescrito de la siguiente manera, lo que permitiría a la
    clase Point añadir su propio hook set
    en el futuro sin problemas (en el ejemplo anterior, un hook añadido a la
    clase padre sería ignorado en la clase hija).




    **Ejemplo #10 Acceso a los hooks parentales (set)**



&lt;?php
class Point
{
    public int $x;
    public int $y;
}

class PositivePoint extends Point
{
    public int $x {
        set {
            if ($value &lt; 0) {
                throw new \InvalidArgumentException('Too small');
            }
            parent::$x::set($value);
        }
    }
}
?&gt;




    Un ejemplo de reemplazo de solo un hook get podría ser:




    **Ejemplo #11 Acceso a los hooks parentales (get)**



&lt;?php
class Strings
{
    public string $val;
}

class CaseFoldingStrings extends Strings
{
    public bool $uppercase = true;

    public string $val {
        get =&gt; $this-&gt;uppercase
            ? strtoupper(parent::$val::get())
            : strtolower(parent::$val::get());
    }
}
?&gt;






  ### Serialización


   PHP tiene varias formas diferentes de serializar un objeto,
   ya sea para consumo público o para fines de depuración.
   El comportamiento de los hooks varía según el uso.
   En algunos casos, el valor bruto de respaldo de una propiedad será utilizado,
   eludiendo cualquier hook.
   En otros, la propiedad será leída o escrita "a través" del hook,
   como cualquier otra acción de lectura/escritura normal.




   - [var_dump()](#function.var-dump): Utiliza el valor bruto

   - [serialize()](#function.serialize): Utiliza el valor bruto

   - [unserialize()](#function.unserialize): Utiliza el valor bruto

   - [__serialize()](#object.serialize)/[__unserialize()](#object.unserialize): Lógica propia, utiliza los hooks de recuperación/definición

   - Array casting: Utiliza el valor bruto

   - [var_export()](#function.var-export): Utiliza el hook de recuperación

   - [json_encode()](#function.json-encode): Utiliza el hook de recuperación

   - [JsonSerializable](#class.jsonserializable): Lógica propia, utiliza el hook de recuperación

   - [get_object_vars()](#function.get-object-vars): Utiliza el hook de recuperación

   - [get_mangled_object_vars()](#function.get-mangled-object-vars): Utiliza el valor bruto












 ## Constantes de clase


  Es posible definir [constantes](#language.constants)
  por clases que permanecen idénticas y no modificables.
  La visibilidad por omisión de las constantes de clase es public.



 **Nota**:



   Las constantes de clases pueden ser redefinidas por una clase hija.
   A partir de PHP 8.1.0, las constantes de clases no pueden ser
   redefinidas por una clase hija si ha sido definida como
   [final](#language.oop5.final).





  También es posible para las interfaces tener constantes.
  Ver la [documentación de las interfaces](#language.oop5.interfaces)
  para ejemplos.




  Es posible referenciar la clase utilizando una variable.
  El valor de la variable no puede ser una palabra clave (por ejemplo, self,
  parent y static).




  Tenga en cuenta que las constantes de clase son asignadas una vez por clase, y no
  para cada instancia de clase.




  A partir de PHP 8.3.0, las constantes de clase pueden tener un tipo escalar como
  bool, int, float, string,
  o incluso array. Al utilizar array, su contenido
  solo puede contener otros tipos escalares.





  **Ejemplo #1 Definición y uso de una constante de clase**



&lt;?php
class MyClass
{
  const CONSTANT = 'valor constante';

  function showConstant() {
    echo  self::CONSTANT . "\n";
  }
}

echo MyClass::CONSTANT . "\n";

$classname = "MyClass";
echo $classname::CONSTANT . "\n";

$class = new MyClass();
$class-&gt;showConstant();

echo $class::CONSTANT."\n";
?&gt;




  La constante especial **[::class](#.constants.class)** permite
  una resolución de nombre de clase completamente cualificado en el momento de la compilación,
  esto es útil para las clases en un espacio de nombres:




  **Ejemplo #2 Ejemplo de uso de ::class**



&lt;?php
namespace foo {
    class bar {
    }

    echo bar::class; // foo\bar
}
?&gt;





  **Ejemplo #3 Ejemplo de expresiones para una constante de clase**



&lt;?php
const ONE = 1;
class foo {
    const TWO = ONE * 2;
    const THREE = ONE + self::TWO;
    const SENTENCE = 'El valor de THREE es '.self::THREE;
}
?&gt;





  **Ejemplo #4 Modificador de visibilidad de las constantes de clase, a partir de PHP 7.1**



&lt;?php
class Foo {
    public const BAR = 'bar';
    private const BAZ = 'baz';
}
echo Foo::BAR, PHP_EOL;
echo Foo::BAZ, PHP_EOL;
?&gt;


  Resultado del ejemplo anterior en PHP 7.1:




bar

Fatal error: Uncaught Error: Cannot access private const Foo::BAZ in …


  **Nota**:



    A partir de PHP 7.1.0, los modificadores de visibilidad son permitidos
    en las constantes de clase.






  **Ejemplo #5 Verificación de varianza de visibilidad de las constantes de clase, a partir de PHP 8.3.0**



&lt;?php

interface MyInterface
{
    public const VALUE = 42;
}

class MyClass implements MyInterface
{
    protected const VALUE = 42;
}
?&gt;


  Resultado del ejemplo anterior en PHP 8.3:




Fatal error: Access level to MyClass::VALUE must be public (as in interface MyInterface) …



 **Nota**:

   A partir de PHP 8.3.0, la varianza de visibilidad es verificada de manera más estricta.
   Antes de esta versión, la visibilidad de una constante de clase podía diferir de la de la constante
   en la interfaz implementada.





  **Ejemplo #6 Sintaxis de acceso dinámico a las constantes de clase, a partir de PHP 8.3.0**



&lt;?php
class Foo {
    public const BAR = 'bar';
    private const BAZ = 'baz';
}

$name = 'BAR';
echo Foo::{$name}, PHP_EOL; // bar
?&gt;



 **Nota**:



   A partir de PHP 8.3.0, las constantes de clase pueden ser recuperadas dinámicamente utilizando una
   variable.





    **Ejemplo #7 Asignación de tipos a las constantes de clase, a partir de PHP 8.3.0**



&lt;?php

class MyClass {
    public const bool MY_BOOL = true;
    public const int MY_INT = 1;
    public const float MY_FLOAT = 1.01;
    public const string MY_STRING = 'one';
    public const array MY_ARRAY = [self::MY_BOOL, self::MY_INT, self::MY_FLOAT, self::MY_STRING];
}

var_dump(MyClass::MY_BOOL);
var_dump(MyClass::MY_INT);
var_dump(MyClass::MY_FLOAT);
var_dump(MyClass::MY_STRING);
var_dump(MyClass::MY_ARRAY);
?&gt;


    Resultado del ejemplo anterior en PHP 8.3:




bool(true)
int(1)
float(1.01)
string(3) "one"
array(4) {
  [0]=&gt;
  bool(true)
  [1]=&gt;
  int(1)
  [2]=&gt;
  float(1.01)
  [3]=&gt;
  string(3) "one"
}












 ## Autocarga de clases


  Muchos desarrolladores que escriben aplicaciones orientadas a objetos
  crean un fichero fuente por definición de clase. Uno de los mayores inconvenientes
  de este método es tener que escribir una larga lista de inclusiones de
  ficheros de clases al inicio de cada script: una inclusión por clase.




  La función [spl_autoload_register()](#function.spl-autoload-register) registra un número cualquiera de
  cargadores automáticos, lo que permite a las clases y a las interfaces ser
  automáticamente cargadas si no están definidas actualmente.
  Al registrar autocargadores, PHP da una última oportunidad de incluir una
  definición de clase o interfaz, antes de que PHP falle con un error.




  Cualquier construcción similar a las clases puede ser autocargada de la
  misma manera. Esto incluye las clases, interfaces, traits y enumeraciones.



 **Precaución**

   Anterior a PHP 8.0.0, era posible utilizar [__autoload()](#function.autoload)
   para autocargar las clases y las interfaces. Sin embargo, es una alternativa
   menos flexible a [spl_autoload_register()](#function.spl-autoload-register) y
   [__autoload()](#function.autoload) está obsoleto a partir de PHP 7.2.0,
   y eliminado a partir de PHP 8.0.0.




 **Nota**:



   [spl_autoload_register()](#function.spl-autoload-register) puede ser llamada varias veces
   para registrar varios autocargadores. Lanzar una excepción desde una
   función de autocarga, interrumpirá este proceso y no permitirá que las
   funciones de autocarga siguientes sean ejecutadas. Por esta razón,
   lanzar excepciones desde una función de autocarga es fuertemente
   desaconsejado.








   **Ejemplo #1 Ejemplo de autocarga**



    Este ejemplo intenta cargar las clases MiClase1
    y MiClase2, respectivamente desde los ficheros
    MiClase1.php y
    MiClase2.php.




&lt;?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new MiClase1();
$obj2 = new MiClase2();
?&gt;




   **Ejemplo #2 Otro ejemplo de autocarga**



    Este ejemplo intenta cargar la interfaz ITest.




&lt;?php

spl_autoload_register(function ($name) {
    var_dump($name);
});

class Foo implements ITest {
}

/*
string(5) "ITest"

Fatal error: Interface 'ITest' not found in ...
*/
?&gt;




    **Ejemplo #3 Uso del autoloader de Composer**



     [» Composer](https://getcomposer.org/) genera un fichero vendor/autoload.php
     configurado para cargar automáticamente los paquetes gestionados por Composer.
     Al incluir este fichero, estos paquetes pueden ser utilizados sin trabajo
     adicional.




&lt;?php
require __DIR__ . '/vendor/autoload.php';

$uuid = Ramsey\Uuid\Uuid::uuid7();

echo "Nuevo UUID generado -&gt; ", $uuid-&gt;toString(), "\n";
?&gt;






  ### Ver también





     - [unserialize()](#function.unserialize)

     - [unserialize_callback_func](#ini.unserialize-callback-func)

     - [unserialize_max_depth](#ini.unserialize-max-depth)

     - [spl_autoload_register()](#function.spl-autoload-register)

     - [spl_autoload()](#function.spl-autoload)

     - [__autoload()](#function.autoload)














  ## Constructores y destructores



   ### Constructor


    **__construct**([mixed](#language.types.mixed) ...$values = ""): [void](language.types.void.html)


    PHP permite a los desarrolladores declarar constructores para
    las clases. Las clases que poseen un método constructor
    llaman a este método cada vez que se crea una nueva instancia
    del objeto, lo cual es interesante para todas las inicializaciones
    de las que el objeto necesita antes de ser utilizado.



   **Nota**:

     Los constructores padres no son llamados implícitamente
     si la clase hija define un constructor. Si se
     desea utilizar un constructor padre, será necesario hacer
     llamada a parent::__construct() desde el constructor hijo.
     Si el hijo no define un constructor entonces, puede ser heredado
     de la clase padre, exactamente de la misma forma que una método lo sería
     (si no ha sido declarado como privado).





    **Ejemplo #1 Constructor durante la herencia**



&lt;?php
class BaseClass {
    function __construct() {
        print "En el constructor de BaseClass\n";
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();
        print "En el constructor de SubClass\n";
    }
}

class OtherSubClass extends BaseClass {
    // Constructor heredado de BaseClass
}

// En el constructor de BaseClass
$obj = new BaseClass();

// En el constructor de BaseClass
// En el constructor de SubClass
$obj = new SubClass();

// En el constructor de BaseClass
$obj = new OtherSubClass();
?&gt;




    A diferencia de otros métodos, [__construct()](#object.construct)
    está excluido de las [reglas de compatibilidad de firmas](#language.oop.lsp)
    usuales cuando se extiende.




    Los constructores son métodos ordinarios que son llamados durante
    la instanciación de su objeto correspondiente. Por lo tanto, pueden
    definir un número arbitrario de argumentos, que pueden ser requeridos, tener un tipo,
    y pueden tener un valor por defecto. Los argumentos de un constructor son llamados
    colocando los argumentos dentro de paréntesis después del nombre de la clase.




    **Ejemplo #2 Utilizar los argumentos de un constructor**



&lt;?php
class Point {
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y = 0) {
        $this-&gt;x = $x;
        $this-&gt;y = $y;
    }
}

// Pasar ambos parámetros.
$p1 = new Point(4, 5);
// Pasar solo el parámetro requerido. $y tomará su valor por defecto de 0.
$p2 = new Point(4);
// Con parámetros nombrados (a partir de PHP 8.0):
$p3 = new Point(y: 5, x: 4);
?&gt;




    Si una clase no tiene un constructor, o si el constructor no tiene argumentos requeridos,
    los paréntesis pueden ser omitidos.




    #### Estilo antiguo de los constructores


     Anterior a PHP 8.0.0, las clases en el espacio de nombres global interpretarán un
     método que tenga el mismo nombre que la clase como un constructor de estilo antiguo.
     Esta sintaxis está obsoleta, y resultará en un error **[E_DEPRECATED](#constant.e-deprecated)**
     pero llamará a esta función como un constructor.
     Si [__construct()](#object.construct) y un método con el mismo nombre
     están definidos, [__construct()](#object.construct) será llamado.




     Las clases en espacios de nombres, o cualquier clase a partir de PHP 8.0.0,
     un método con el mismo nombre que la clase nunca tiene un significado particular.




     Siempre utilizar [__construct()](#object.construct) en nuevo código.





    #### Promoción del Constructor


     A partir de PHP 8.0.0, los parámetros del constructor pueden ser promovidos para
     corresponder a una propiedad del objeto. Es muy común que los parámetros
     de un constructor sean asignados a una propiedad sin realizar operaciones sobre ellos.
     La promoción del constructor proporciona un atajo para este caso de uso.
     El ejemplo anterior puede ser reescrito de la siguiente manera.




     **Ejemplo #3 Utilizando la promoción de propiedad de constructor**



&lt;?php
class Point {
    public function __construct(protected int $x, protected int $y = 0) {
    }
}




     Cuando un argumento de constructor incluye un modificador, PHP lo interpretará
     como una propiedad de objeto y un argumento del constructor, y asignará el valor del argumento
     a la propiedad. El cuerpo del constructor puede estar entonces vacío o puede contener otras
     declaraciones. Todas las declaraciones adicionales serán ejecutadas después de que el valor del
     argumento haya sido asignado a su propiedad correspondiente.




     Todos los argumentos no necesitan ser promovidos. Es posible mezclar y combinar los
     argumentos promovidos y no promovidos, en cualquier orden. Los argumentos promovidos no tienen ningún impacto
     en el código que llama al constructor.



    **Nota**:



      Utilizar un [modificador de visibilidad](#language.oop5.visibility)
      (public, protected o private) es
      la manera más probable de aplicar la promoción de propiedad, pero cualquier otro modificador
      único (como readonly) tendrá el mismo efecto.




    **Nota**:



      Las propiedades de objeto no pueden ser tipadas [callable](#language.types.callable) debido a las ambigüedades del motor
      que esto introduciría. Por lo tanto, los argumentos promovidos, tampoco pueden ser tipados
      [callable](#language.types.callable). Sin embargo, cualquier otra
      [declaración de tipo](#language.types.declarations) está permitida.




    **Nota**:



      Como las propiedades promovidas son a la vez desucradas a una propiedad
      y también como el parámetro de una función, todas las restricciones de
      nombramiento para las propiedades y los parámetros se aplican.




    **Nota**:



      Los [atributos](#language.attributes) colocados sobre un
      argumento de constructor promovido serán replicados tanto en la
      propiedad como en el argumento. Los valores por defecto en un argumento de
      constructor promovido solo serán replicados en el argumento y no en la propiedad.







    #### Novedades en inicializadores


     A partir de PHP 8.1.0, los objetos pueden ser utilizados como valor por defecto para los parámetros,
     variables estáticas, constantes globales y los argumentos de atributos.
     Los objetos pueden ser ahora pasados a [define()](#function.define).



    **Nota**:



      El uso de un nombre de clase dinámico o no-string o una clase anónima no está permitido.
      El uso del desempacado de argumentos no está permitido.
      El uso de expresiones no soportadas como argumento no está permitido.





     **Ejemplo #4 Uso de new en inicializadores**



&lt;?php

// Todos permitidos:
static $x = new Foo;

const C = new Foo;

function test($param = new Foo) {}

#[AnAttribute(new Foo)]
class Test {
    public function __construct(
        public $prop = new Foo,
    ) {}
}

// Todos no permitidos (error de compilación):
function test(
    $a = new (CLASS_NAME_CONSTANT)(), // nombre de clase dinámico
    $b = new class {}, // clase anónima
    $c = new A(...[]), // desempacado de argumentos
    $d = new B($abc), // expresión de constante no soportada
) {}
?&gt;






    #### Método de creación estático


     PHP soporta únicamente un constructor por clase. Sin embargo, en
     ciertos casos puede ser deseable permitir que un objeto sea construido
     de manera diferente con entradas diferentes.
     La forma recomendada de hacer esto es utilizando métodos estáticos
     como una envolvente del constructor.




     **Ejemplo #5 Utilizando la creación mediante un método estático**



&lt;?php
$some_json_string = '{ "id": 1004, "name": "Elephpant" }';
$some_xml_string = "&lt;animal&gt;&lt;id&gt;1005&lt;/id&gt;&lt;name&gt;Elephpant&lt;/name&gt;&lt;/animal&gt;";

class Product {

    private ?int $id;
    private ?string $name;

    private function __construct(?int $id = null, ?string $name = null) {
        $this-&gt;id = $id;
        $this-&gt;name = $name;
    }

    public static function fromBasicData(int $id, string $name): static {
        $new = new static($id, $name);
        return $new;
    }

    public static function fromJson(string $json): static {
        $data = json_decode($json, true);
        return new static($data['id'], $data['name']);
    }

    public static function fromXml(string $xml): static {
        $data = simplexml_load_string($xml);
        $new = new static();
        $new-&gt;id = (int) $data-&gt;id;
        $new-&gt;name = $data-&gt;name;
        return $new;
    }
}

$p1 = Product::fromBasicData(5, 'Widget');
$p2 = Product::fromJson($some_json_string);
$p3 = Product::fromXml($some_xml_string);

var_dump($p1, $p2, $p3);




     El constructor puede ser hecho privado o protegido para evitar su llamada
     desde el exterior. En este caso, solo un método estático será capaz
     de instanciar la clase. Puesto que están en la misma definición de clase,
     tienen acceso a los métodos privados, incluso en una instancia diferente
     del objeto. Un constructor privado es opcional y puede o no tener sentido
     dependiendo del caso de uso.




     Los tres métodos estáticos públicos demuestran entonces diferentes
     maneras de instanciar el objeto.




     - fromBasicData() toma los parámetros exactos que son necesarios,
      luego crea el objeto llamando al constructor y retornando el resultado.

     - fromJson() acepta una cadena de caracteres JSON y realiza
      un preprocesamiento sobre sí mismo para convertirse en el formato deseado por
      el constructor. Luego retorna el nuevo objeto.

     -
      fromXml() acepta una cadena de caracteres XML, realiza un preprocesamiento,
      luego crea un objeto bruto. El constructor es llamado, pero como todos los
      parámetros son opcionales el método los ignora. Luego asigna los
      valores a las propiedades del objeto directamente antes de retornar el resultado.




     En los tres casos, la palabra clave static es traducida al nombre de
     la clase de la cual el código se encuentra. En este caso, Product.







   ### Destructor


    **__destruct**(): [void](language.types.void.html)


    PHP posee un concepto de destructor similar al de otros lenguajes
    orientados a objeto, como el C++. El método destructor es llamado
    tan pronto como ya no hay referencias a un objeto dado, o en cualquier orden durante la secuencia de parada.




    **Ejemplo #6 Ejemplo con un Destructor**



&lt;?php

class MyDestructableClass
{
    function __construct() {
        print "In constructor\n";
    }

    function __destruct() {
        print "Destroying " . __CLASS__ . "\n";
    }
}

$obj = new MyDestructableClass();




    Al igual que el constructor, el destructor padre no será llamado
    implícitamente por el motor. Para ejecutar el destructor padre, se
    debe llamar explícitamente a la función
    parent::__destruct en el cuerpo del destructor.
    Al igual que los constructores, una clase hija puede heredar el
    destructor del padre si no lo implementa ella misma.




    El destructor será llamado incluso si la ejecución del script es detenida
    utilizando la función [exit()](#function.exit).
    Llamar a la función [exit()](#function.exit)
    en un destructor evitará la ejecución de las rutinas de parada restantes.




    Si un destructor crea nuevas referencias a su objeto, no será
    llamado una segunda vez cuando el contador de referencias alcance
    nuevamente cero o durante la secuencia de parada.




    A partir de PHP 8.4.0, cuando la
    [colección de ciclos](#features.gc.collecting-cycles)
    ocurre durante la ejecución de una
    [fibra](#language.fibers), los destructores de los objetos
    programados para la colección son ejecutados en una fibra distinta, llamada
    gc_destructor_fiber.
    Si esta fibra es suspendida, una nueva fibra será creada para ejecutar
    los destructores restantes.
    La anterior gc_destructor_fiber ya no será referenciada
    por el recolector de basura y podrá ser colectada si no es referenciada
    en otro lugar.
    Los objetos cuyo destructor está suspendido no serán colectados hasta
    que el destructor haya terminado o que la fibra misma sea colectada.



   **Nota**:



     Los destructores llamados durante la parada del script están en una situación
     donde los encabezados HTTP ya han sido enviados.
     La carpeta de trabajo en la fase de parada del script
     puede ser diferente con ciertas APIs (ej. Apache).




   **Nota**:



     Intentar lanzar una excepción desde un destructor (llamado al final del script)
     resulta en un error fatal.














  ## Visibilidad


    La visibilidad de una propiedad, un método o (a partir de PHP 7.1.0) una constante puede
    ser definida prefijando su declaración con una palabra clave: public,
    protected, o
    private. Los elementos declarados como públicos son
    accesibles en cualquier lugar. El acceso a los elementos protegidos está limitado
    a la clase misma, y mediante clases heredadas y a las
    clases padre. A los miembros declarados como privados solo puede acceder la
    clase que los ha definido.





    ### Visibilidad de las propiedades


      Las propiedades de las clases pueden ser definidas como públicas, privadas
      o protegidas. Las propiedades declaradas sin utilizar explícitamente una
      palabra clave de visibilidad serán automáticamente definidas como públicas.




      **Ejemplo #1 Declaración de propiedades**



&lt;?php
/**
 * Definición de MyClass
 */
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this-&gt;public;
        echo $this-&gt;protected;
        echo $this-&gt;private;
    }
}

$obj = new MyClass();
echo $obj-&gt;public; // Funciona
echo $obj-&gt;protected; // Error fatal
echo $obj-&gt;private; // Error fatal
$obj-&gt;printHello(); // Muestra Public, Protected y Private

/**
 * Definición de MyClass2
 */
class MyClass2 extends MyClass
{
    // Se pueden redeclarar las propiedades públicas o protegidas, pero no las privadas
    public $public = 'Public2';
    protected $protected = 'Protected2';

    function printHello()
    {
      echo $this-&gt;public;
      echo $this-&gt;protected;
      echo $this-&gt;private;
    }
}

$obj2 = new MyClass2();
echo $obj2-&gt;public; // Funciona
echo $obj2-&gt;protected; // Error fatal
echo $obj2-&gt;private; // Indefinido
$obj2-&gt;printHello(); // Muestra Public2, Protected2 y Undefined (Indefinido)

?&gt;




      #### Visibilidad Asimétrica de las Propiedades


        A partir de PHP 8.4, las propiedades pueden también tener su
        visibilidad definida de manera asimétrica, con un campo diferente para
        la lectura (get) y la escritura (set).
        Más precisamente, la visibilidad set puede ser
        especificada separadamente, siempre que no sea más permisiva que la
        visibilidad por defecto.




        **Ejemplo #2 Visibilidad Asimétrica de las Propiedades**



&lt;?php
class Book
{
    public function __construct(
        public private(set) string $title,
        public protected(set) string $author,
        protected private(set) int $pubYear,
    ) {}
}

class SpecialBook extends Book
{
    public function update(string $author, int $year): void
    {
        $this-&gt;author = $author; // OK
        $this-&gt;pubYear = $year; // Error Fatal
    }
}

$b = new Book('Cómo usar PHP', 'Peter H. Peterson', 2024);

echo $b-&gt;title; // Funciona
echo $b-&gt;author; // Funciona
echo $b-&gt;pubYear; // Error Fatal

$b-&gt;title = 'Cómo no usar PHP'; // Error Fatal
$b-&gt;author = 'Pedro H. Peterson'; // Error Fatal
$b-&gt;pubYear = 2023; // Error Fatal
?&gt;



      Hay algunas reservas concernientes a la visibilidad asimétrica:



        -

            Solo las propiedades tipadas pueden tener una visibilidad set separada.



        -

            La visibilidad set debe ser la misma
            que get o más restrictiva. Es decir,
            public protected(set) y protected protected(set)
            están permitidos, pero protected public(set) provocará un error de sintaxis.



        -

            Si una propiedad es public, entonces la visibilidad principal puede ser
            omitida. Es decir, public private(set) y private(set)
            tendrán el mismo resultado.



        -

            Una propiedad con una visibilidad private(set)
            es automáticamente final, y no puede ser redefinida en una clase hija.



        -

            Obtener una referencia a una propiedad sigue la visibilidad set, no get.
            Esto se debe a que una referencia puede ser utilizada para modificar el valor de la propiedad.



        -

            De igual manera, intentar escribir en una propiedad de array implica tanto una operación get como
            una operación set internamente, y seguirá por lo tanto la visibilidad set,
            ya que es siempre la más restrictiva.




      **Nota**:

          Los espacios no están permitidos en la declaración de visibilidad para la modificación.
          private(set) es correcto.
          private( set ) no es correcto y resultará en un error de análisis.





        Cuando una clase extiende a otra, la clase hija puede redefinir
        cualquier propiedad que no sea final. Al hacerlo,
        puede ampliar tanto la visibilidad principal como la visibilidad set,
        siempre que la nueva visibilidad sea la misma o más amplia
        que la de la clase padre. Sin embargo, tenga en cuenta que si una propiedad private
        es reemplazada, esto no cambia realmente la propiedad de la clase padre,
        sino que crea una nueva propiedad con un nombre interno diferente.




        **Ejemplo #3 Herencia de Propiedades Asimétricas**



&lt;?php
class Book
{
    protected string $title;
    public protected(set) string $author;
    protected private(set) int $pubYear;
}

class SpecialBook extends Book
{
    public protected(set) string $title; // OK, ya que la lectura es más amplia y la escritura es la misma.
    public string $author; // OK, ya que la lectura es la misma y la escritura es más amplia.
    public protected(set) int $pubYear; // Error Fatal. Las propiedades private(set) son finales.
}
?&gt;







    ### Visibilidad de los métodos


      Los métodos de las clases pueden ser definidos como públicos, privados
      o protegidos. Los métodos declarados sin utilizar explícitamente una
      palabra clave de visibilidad serán automáticamente definidos como públicos.







        **Ejemplo #4 Declaración de métodos**



&lt;?php
/**
 * Definición de MyClass
 */
class MyClass
{
    // Declara un constructor público
    public function __construct() { }

    // Declara un método público
    public function MyPublic() { }

    // Declara un método protegido
    protected function MyProtected() { }

    // Declara un método privado
    private function MyPrivate() { }

    // Este será público
    function Foo()
    {
        $this-&gt;MyPublic();
        $this-&gt;MyProtected();
        $this-&gt;MyPrivate();
    }
}

$myclass = new MyClass;
$myclass-&gt;MyPublic(); // Funciona
$myclass-&gt;MyProtected(); // Error fatal
$myclass-&gt;MyPrivate(); // Error fatal
$myclass-&gt;Foo(); // Public, Protected y Private funcionan

/**
 * Definición de MyClass2
 */
class MyClass2 extends MyClass
{
    // Este será público
    function Foo2()
    {
        $this-&gt;MyPublic();
        $this-&gt;MyProtected();
        $this-&gt;MyPrivate(); // Error fatal
    }
}

$myclass2 = new MyClass2;
$myclass2-&gt;MyPublic(); // Funciona
$myclass2-&gt;Foo2(); // Public y Protected funcionan, no Private

class Bar
{
    public function test() {
        $this-&gt;testPrivate();
        $this-&gt;testPublic();
    }

    public function testPublic() {
        echo "Bar::testPublic\n";
    }

    private function testPrivate() {
        echo "Bar::testPrivate\n";
    }
}

class Foo extends Bar
{
    public function testPublic() {
        echo "Foo::testPublic\n";
    }

    private function testPrivate() {
        echo "Foo::testPrivate\n";
    }
}

$myFoo = new Foo();
$myFoo-&gt;test(); // Bar::testPrivate
                // Foo::testPublic
?&gt;







    ### Visibilidad de las constantes


      A partir de PHP 7.1.0, las constantes de clases pueden ser definidas
      como públicas, privadas o protegidas. Las constantes declaradas sin una palabra clave
      de visibilidad explícita son definidas como públicas.




      **Ejemplo #5 Declaración de constantes a partir de PHP 7.1.0**



&lt;?php
/**
 * Declaremos MyClass
 */
class MyClass
{
    // Declaremos una constante pública
    public const MY_PUBLIC = 'public';

    // Declaremos una constante protegida
    protected const MY_PROTECTED = 'protected';

    // Declaremos una constante privada
    private const MY_PRIVATE = 'private';

    public function foo()
    {
        echo self::MY_PUBLIC;
        echo self::MY_PROTECTED;
        echo self::MY_PRIVATE;
    }
}

$myclass = new MyClass();
MyClass::MY_PUBLIC; // Funciona
MyClass::MY_PROTECTED; // Error fatal
MyClass::MY_PRIVATE; // Error fatal
$myclass-&gt;foo(); // Public, Protegida y Privada funcionan

/**
 * Definir MyClass2
 */
class MyClass2 extends MyClass
{
    // Esto es público
    function foo2()
    {
        echo self::MY_PUBLIC;
        echo self::MY_PROTECTED;
        echo self::MY_PRIVATE; // Error fatal
    }
}

$myclass2 = new MyClass2;
echo MyClass2::MY_PUBLIC; // Funciona
$myclass2-&gt;foo2(); // Public y Protegida funcionan, pero no Privada
?&gt;






    ### Visibilidad desde otros objetos


      Los objetos de mismos tipos tienen acceso a los miembros privados y protegidos de los otros,
      incluso si no son la misma instancia. Esto se debe a que
      los detalles específicos de la implementación ya son conocidos internamente
      por estos objetos.




      **Ejemplo #6 Acceso a los miembros privados de un objeto del mismo tipo**



&lt;?php
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this-&gt;foo = $foo;
    }

    private function bar()
    {
        echo 'Acceso al método privado.';
    }

    public function baz(Test $other)
    {
        // Podemos modificar la propiedad privada:
        $other-&gt;foo = 'Hola';
        var_dump($other-&gt;foo);

        // También podemos llamar al método privado:
        $other-&gt;bar();
    }
}

$test = new Test('test');

$test-&gt;baz(new Test('other'));
?&gt;


      El ejemplo anterior mostrará:




string(5) "Hola"
Acceso al método privado.













 ## Herencia


  La herencia es uno de los grandes principios de la programación orientada a objetos (POO), y
  PHP la implementa en su modelo de objetos. Este principio afectará la manera en que
  muchas clases están relacionadas entre sí.




  Por ejemplo, cuando una clase es extendida, la clase hija hereda todas
  las métodos públicos y protegidos, propiedades y constantes de la clase padre. Mientras una clase no sobrescriba
  estos métodos, conservan su funcionalidad original.




  La herencia es muy útil para definir y abstraer ciertas funcionalidades
  comunes a varias clases, permitiendo al mismo tiempo la implementación de
  funcionalidades adicionales en las clases hijas, sin tener que reimplementar
  en su interior todas las funcionalidades comunes.




  Los métodos privados de una clase padre no son accesibles para la clase hija.
  Por consiguiente, las clases hijas pueden reimplementar un método privado por sí mismas
  sin preocuparse por las reglas normales de herencia.
  Anterior a PHP 8.0.0, sin embargo, las restricciones final
  y static se aplicaban a los métodos privados.
  A partir de PHP 8.0.0, la única restricción de método privado que se impone
  es private final en los constructores, ya que es una
  manera común para "desactivar" el constructor cuando se utilizan métodos de fábrica estáticos en su lugar.




  La [visibilidad](#language.oop5.visibility)
  de los métodos, propiedades y constantes puede ser relajada, es decir, un
  método protected puede ser marcado como
  public, pero no pueden ser restringidos, por ejemplo,
  marcar una propiedad public como private.
  Una excepción son los constructores, para los cuales la visibilidad puede ser restringida,
  por ejemplo, un constructor public puede ser anotado
  como private en la clase hija.




 **Nota**:



   A menos que se utilice la autocarga, las clases deben ser conocidas antes de ser
   utilizadas. Las clases padres deben ser definidas antes de escribir una herencia. Esta
   regla general se aplica también en el caso de herencia o implementación de interfaces.





 **Nota**:



   No está permitido redefinir una propiedad de lectura-escritura con una
   [propiedad de solo lectura](#language.oop5.properties.readonly-properties) o viceversa.




&lt;?php

class A {
    public int $prop;
}
class B extends A {
    // Ilegal: read-write -&gt; readonly
    public readonly int $prop;
}
?&gt;







  **Ejemplo #1 Ejemplo de herencia**



&lt;?php

class Foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }

    public function printPHP()
    {
        echo 'PHP es genial' . PHP_EOL;
    }
}

class Bar extends Foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();
$foo-&gt;printItem('baz'); // Muestra: 'Foo: baz'
$foo-&gt;printPHP();       // Muestra: 'PHP es genial'
$bar-&gt;printItem('baz'); // Muestra: 'Bar: baz'
$bar-&gt;printPHP();       // Muestra: 'PHP es genial'

?&gt;





  ### Compatibilidad de los tipos de retorno con las clases internas



   Anterior a PHP 8.1, la mayoría de las clases o métodos internos no declaraban su
   tipo de retorno, y cualquier tipo de retorno estaba permitido al heredarlos.





   A partir de PHP 8.1.0, la mayoría de los métodos internos comenzaron a declarar "provisionalmente"
   su tipo de retorno, en este caso, el tipo de retorno de los métodos debe ser compatible con la clase
   padre; en caso contrario, se emite una notificación de deprecación.
   Tenga en cuenta que la ausencia de una declaración de retorno explícita también se considera un error de firma, y por lo tanto provoca el aviso de deprecación.





   Si el tipo de retorno no puede ser declarado para un método de sobrecarga debido a problemas de
   compatibilidad entre versiones de PHP, un atributo [ReturnTypeWillChange](#class.returntypewillchange) puede ser
   añadido para silenciar el aviso de deprecación.





   **Ejemplo #2 El método sobrecargado no declara tipo de retorno.**



&lt;?php

class MyDateTime extends DateTime
{
    public function modify(string $modifier) { return false; }
}

// "Deprecated: Return type of MyDateTime::modify(string $modifier) should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice" A partir de PHP 8.1.0





   **Ejemplo #3 El método sobrecargado declara un tipo de retorno incorrecto.**



&lt;?php

class MyDateTime extends DateTime
{
    public function modify(string $modifier): ?DateTime { return null; }
}

// "Deprecated: Return type of MyDateTime::modify(string $modifier): ?DateTime should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice" A partir de PHP 8.1.0





   **Ejemplo #4 El método sobrecargado declara un tipo de retorno incorrecto sin aviso de deprecación.**



&lt;?php

class MyDateTime extends DateTime
{
    /**
     * @return DateTime|false
     */
    #[\ReturnTypeWillChange]
    public function modify(string $modifier) { return false; }
}

// No se emite ningún aviso














 ## El operador de resolución de ámbito (::)



  El operador de resolución de ámbito (también llamado Paamayim Nekudotayim) o,
  en términos más simples, el símbolo "doble dos puntos" (::),
  proporciona un medio para acceder a los miembros
  una [constante](#language.oop5.constants),
  una propiedad [estática](#language.oop5.static),
  o un método [estático](#language.oop5.static)
  de una clase o de una de sus clases padre.
  Además, las propiedades o métodos estáticos pueden ser sobrecargados vía
  la [ligadura estática tardía](#language.oop5.late-static-bindings).






  Cuando se hace referencia a estos elementos fuera de la definición de
  la clase, se utiliza el nombre de la clase.





  Es posible referenciar una clase utilizando
  una variable. El valor de la variable no puede ser una palabra clave (e.g. self,
  parent y static).





  Paamayim Nekudotayim podría parecer al principio una elección extraña
  para nombrar un doble dos puntos.
  Sin embargo, en el momento de la escritura del Zend Engine 0.5
  (que hacía funcionar PHP 3), fue el nombre elegido por el equipo Zend.
  De hecho, esto significa un doble dos puntos... ¡en hebreo!





  **Ejemplo #1 :: fuera de la definición de la clase**



&lt;?php
class MyClass {
    const CONST_VALUE = 'Un valor constante';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;
?&gt;





  Tres palabras clave especiales, self, parent,
  y static son utilizadas para acceder a las propiedades o a
  los métodos desde la definición de la clase.





  **Ejemplo #2 :: desde la definición de la clase**



&lt;?php
class MyClass {
    const CONST_VALUE = 'Un valor constante';
}

class OtherClass extends MyClass
{
    public static $my_static = 'variable estática';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
$classname::doubleColon();

OtherClass::doubleColon();
?&gt;





  Cuando una clase que hereda de otra redefine un método de su clase padre,
  PHP no llamará al método de la clase padre. Es responsabilidad del método derivado
  llamar al método original en caso de necesidad. Esto también es válido
  para las definiciones de los [constructores y destructores](#language.oop5.decon),
  la [sobrecarga](#language.oop5.overloading), y las
  definiciones de [métodos mágicos](#language.oop5.magic).





  **Ejemplo #3 Llamada a un método padre**



&lt;?php
class MyClass
{
    protected function myFunc() {
        echo "MyClass::myFunc()\n";
  }
}

class OtherClass extends MyClass
{
    // Sobrecarga de la definición padre
    public function myFunc() {

      // Pero llamada al método padre
      parent::myFunc();
      echo "OtherClass::myFunc()\n";
  }
}

$class = new OtherClass();
$class-&gt;myFunc();
?&gt;




   Ver también [algunos
   ejemplos de llamadas estáticas](#language.oop5.basic.class.this).














  ## Estático


  **Sugerencia**

      Esta página describe el uso de la palabra clave static
      que permite definir métodos y propiedades estáticas.
      static también puede ser utilizado para
      [definir variables estáticas](#language.variables.scope.static),
      [definir funciones anónimas estáticas](#functions.anonymous-functions.static)
      y para [Resoluciones estáticas a la volada](#language.oop5.late-static-bindings).
      Consulte estas páginas para obtener más información sobre el significado de
      static.






    Declarar propiedades o métodos como estáticos permite acceder a ellos sin necesidad de instanciar la clase.
    Estos pueden ser accedidos estáticamente desde una instancia de objeto.





    ### Métodos estáticos



      Dado que los métodos estáticos pueden ser llamados sin que una instancia de objeto haya sido creada, la pseudo-variable $this no está disponible en los métodos declarados como estáticos.




    **Advertencia**

        Llamar a un método no estático estáticamente lanzará una [Error](#class.error).




        Anterior a PHP 8.0.0, llamar a un método no estático estáticamente era obsoleto,
        y generaba un aviso **[E_DEPRECATED](#constant.e-deprecated)**.






      **Ejemplo #1 Ejemplo con un método estático**



&lt;?php
class Foo
{
    public static function aStaticMethod() {
        // ...
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod();
?&gt;






    ### Propiedades estáticas


      Las propiedades estáticas son accedidas utilizando el
      [operador de resolución de ámbito](#language.oop5.paamayim-nekudotayim)
      (::) y no pueden ser accedidas a través del operador
      objeto (-&gt;).





      Es posible referenciar la clase utilizando una variable.
      El valor de la variable no puede ser una palabra clave (por ejemplo self,
      parent y static).





      **Ejemplo #2 Ejemplo con una propiedad estática**



&lt;?php
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}

print Foo::$my_static . "\n";

$foo = new Foo();
print $foo-&gt;staticValue() . "\n";
print $foo-&gt;my_static . "\n";      // "Propiedad" my_static no definida

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n";

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar-&gt;fooStatic() . "\n";
?&gt;


      Resultado del ejemplo anterior en PHP 8 es similar a:




foo
foo
Notice: Accessing static property Foo::$my_static as non static in /in/V0Rvv on line 23
Warning: Undefined property: Foo::$my_static in /in/V0Rvv on line 23
foo
foo
foo
foo













 ## Abstracción de clases



  PHP tiene clases, métodos y propiedades abstractas.
  Las clases definidas como abstractas no pueden ser
  instanciadas, y cualquier clase que contenga al menos un
  método abstracto debe ser también abstracta.
  Los métodos definidos como abstractos se contentan con declarar la firma del método y con indicar si es público o protegido;
  no pueden definir la implementación. Las propiedades definidas como abstractas
  pueden declarar un requisito para el comportamiento de get o de set,
  y pueden proporcionar una implementación para una de estas operaciones, pero no para ambas.





  Al heredar de una clase abstracta, todos los métodos
  marcados como abstractos en la declaración de la clase padre
  deben ser definidos por la clase hija y seguir las reglas habituales
  de [herencia](#language.oop5.inheritance) y de
  [compatibilidad de firma](#language.oop.lsp).





  A partir de PHP 8.4, una clase abstracta puede declarar una propiedad abstracta, pública o protegida.
  Una propiedad abstracta protegida puede ser satisfecha por una propiedad accesible en lectura/escritura
  desde un contexto protegido o público.




  Una propiedad abstracta puede ser satisfecha ya sea por una propiedad
  estándar, ya sea por una propiedad
  con [hooks](#language.oop5.property-hooks) definidos, correspondiente a la operación requerida.





  **Ejemplo #1 Ejemplo de método abstracto**



&lt;?php

abstract class AbstractClass
{
    // Fuerza a las clases hijas a definir este método
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // método común
   public function printOut()
   {
        print $this-&gt;getValue() . "\n";
   }
}

class ConcreteClass1 extends AbstractClass
{
     protected function getValue()
     {
       return "ConcreteClass1";
     }

     public function prefixValue($prefix)
     {
       return "{$prefix}ConcreteClass1";
     }
}

class ConcreteClass2 extends AbstractClass
{
     public function getValue()
     {
       return "ConcreteClass2";
     }

     public function prefixValue($prefix)
     {
       return "{$prefix}ConcreteClass2";
     }
}

$class1 = new ConcreteClass1();
$class1-&gt;printOut();
echo $class1-&gt;prefixValue('FOO_'), "\n";

$class2 = new ConcreteClass2();
$class2-&gt;printOut();
echo $class2-&gt;prefixValue('FOO_'), "\n";

?&gt;


  El ejemplo anterior mostrará:




ConcreteClass1
FOO_ConcreteClass1
ConcreteClass2
FOO_ConcreteClass2





   **Ejemplo #2 Ejemplo de método abstracto**



&lt;?php

abstract class AbstractClass
{
    // Un método abstracto solo debe definir los argumentos requeridos
    abstract protected function prefixName($name);

}

class ConcreteClass extends AbstractClass
{

    // Una clase hija puede definir argumentos opcionales que no están presentes en la firma del padre
     public function prefixName($name, $separator = ".")
     {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }

        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreteClass();
echo $class-&gt;prefixName("Pacman"), "\n";
echo $class-&gt;prefixName("Pacwoman"), "\n";

?&gt;


   El ejemplo anterior mostrará:




Mr. Pacman
Mrs. Pacwoman




   **Ejemplo #3 Ejemplo de propiedad abstracta**



&lt;?php

abstract class A
{
    // Las clases derivadas deben tener una propiedad públicamente accesible en lectura.
    abstract public string $readable {
        get;
    }

    // Las clases derivadas deben tener una propiedad modificable en escritura, protegida o pública.
     abstract protected string $writeable {
         set;
    }

    // Las clases derivadas deben tener una propiedad simétrica protegida o pública.
     abstract protected string $both {
         get;
         set;
     }
}

class C extends A
{
    // Esto satisface el requisito y también hace que la propiedad sea modificable, lo cual es válido.
    public string $readable;

    // Esto NO satisfaría el requisito, ya que la propiedad no es públicamente accesible en lectura.
    protected string $readable;

    // Esto satisface exactamente el requisito, por lo que es suficiente.
    // La propiedad solo puede ser modificada desde un contexto protegido.
    protected string $writeable {
        set =&gt; $value;
    }

    // Esto amplía la visibilidad de protegido a público, lo cual es aceptable.
    public string $both;
}
?&gt;




   Una propiedad abstracta en una clase abstracta puede proporcionar implementaciones para cualquier punto de anclaje,
   pero debe tener get o set declarados pero no definidos (como en el ejemplo anterior).




   **Ejemplo #4 Ejemplo de propiedad abstracta con hooks**



&lt;?php

abstract class A
{
    // Esto proporciona una implementación por defecto (pero sustituible) para set,
    // y exige que las clases derivadas proporcionen una implementación para get.
    abstract public string $foo {
        get;

        set {
            $this-&gt;foo = $value
        };
    }
}

?&gt;












  ## Interfaces


   Las interfaces de objetos permiten crear código que especifica qué métodos y propiedades una
   clase debe implementar, sin tener que definir cómo se implementan estos métodos o propiedades. Las interfaces comparten un espacio de nombres con las clases, traits y enumeraciones, de modo que no pueden
   utilizar el mismo nombre.




   Las interfaces se definen de la misma manera que una clase, pero utilizando la palabra clave interface en lugar de
   class, y sin que ninguno de los métodos tenga su contenido
   especificado.




   Por la naturaleza misma de una interfaz, todos los métodos declarados en una
   interfaz deben ser públicos.




   En la práctica, las interfaces sirven dos roles complementarios:




   -
    Permitir a los desarrolladores crear objetos de clases diferentes
    que pueden ser utilizados de manera intercambiable, ya que implementan
    la o las mismas interfaces. Un ejemplo común son varios servicios
    de acceso a bases de datos, varios gestores de pago o
    diferentes estrategias de caché. Diferentes implementaciones pueden ser
    intercambiadas sin necesitar cambios en el código que las utiliza.


   -
    Para permitir que una función o método acepte y opere sobre un
    argumento que se ajuste a una interfaz, sin preocuparse de qué más
    puede hacer el objeto o cómo está implementado. Estas interfaces suelen
    llamarse Iterable, Cacheable, Renderable,
    etc. para describir el significado de su comportamiento.




   Las interfaces pueden definir
   [métodos mágicos](#language.oop5.magic) para obligar
   a las clases que las implementan a implementar estos métodos.



  **Nota**:



    Aunque esto es soportado, incluir los
    [constructores](#language.oop5.decon.constructor)
    en las interfaces está fuertemente desaconsejado. Hacerlo reduce
    radicalmente la flexibilidad de los objetos que implementan la interfaz.
    Además, los constructores no están sujetos a las reglas de herencia,
    lo que puede causar incoherencias y comportamientos inesperados.






   ### implements


    Para implementar una interfaz, se utiliza el operador implements.
    Todos los métodos de la interfaz deben ser implementados en una
    clase; si no es así, se emitirá un error fatal. Las clases pueden
    implementar más de una interfaz, separando cada interfaz por una coma.



   **Advertencia**

     Una clase que implementa una interfaz puede utilizar nombres diferentes
     para sus argumentos que la interfaz. Sin embargo, a partir de PHP 8.0, el
     lenguaje soporta los
     [argumentos nombrados](#functions.named-arguments), lo que
     significa que el llamador puede depender del nombre del argumento en la interfaz.
     Por esta razón, se recomienda encarecidamente que los desarrolladores
     utilicen el mismo nombre de argumento que en la interfaz que se implementa.




   **Nota**:



     Las interfaces pueden ser extendidas como clases, utilizando el operador
     [extends](#language.oop5.inheritance)




   **Nota**:



     La clase que implementa la interfaz debe declarar todos los métodos en
     la interfaz con una [firma compatible](#language.oop.lsp).
     Una clase puede implementar dos interfaces que definan un método
     con el mismo nombre. En este caso, la implementación debe seguir las
     [reglas de compatibilidad de firmas](#language.oop.lsp)
     para todas las interfaces. Así,
     [la covarianza y la contravarianza](#language.oop5.variance)
     pueden ser aplicadas.






   ### Las constantes


    Las interfaces pueden contener constantes. Las constantes de interfaces
    funcionan exactamente como las
    [constantes de clase](#language.oop5.constants).
    Anterior a PHP 8.1.0, no pueden ser redefinidas por una
    clase/interfaz que las hereda.





   ### Propiedades


    A partir de PHP 8.4.0, las interfaces también pueden declarar propiedades.
    Si lo hacen, la declaración debe especificar si la propiedad es legible,
    modificable, o ambas.
    La declaración de la interfaz se aplica únicamente al acceso en lectura y escritura públicos.




    Una clase puede satisfacer una propiedad de interfaz de varias maneras.
    Puede definir una propiedad pública.
    Puede definir una propiedad pública
    [virtual](#language.oop5.property-hooks.virtual)
    que implemente únicamente el crochet correspondiente.
    O una propiedad de lectura puede ser satisfecha por una propiedad readonly.
    Sin embargo, una propiedad de interfaz que es modificable no puede ser readonly.




    **Ejemplo #1 Ejemplo de propiedades de interfaz**



&lt;?php
interface I
{
    // Una clase que implementa esta interfaz DEBE tener una propiedad públicamente legible,
    // pero que esta sea o no modificable públicamente no está restringido.
    public string $readable { get; }

    // Una clase que implementa esta interfaz DEBE tener una propiedad públicamente modificable,
    // pero que esta sea o no legible públicamente no está restringido.
    public string $writeable { set; }

    // Una clase que implementa esta interfaz DEBE tener una propiedad que sea a la vez públicamente
    // legible y públicamente modificable.
    public string $both { get; set; }
}

// Esta clase implementa las tres propiedades como propiedades tradicionales, sin crochets.
// Esto es completamente válido.
class C1 implements I
{
    public string $readable;

    public string $writeable;

    public string $both;
}

// Esta clase implementa las tres propiedades utilizando únicamente los crochets
// solicitados. Esto también es completamente válido.
class C2 implements I
{
    private string $written = '';
    private string $all = '';

    // Utiliza únicamente un crochet get para crear una propiedad virtual.
    // Esto satisface el requisito "get public".
    // No es modificable, pero esto no es requerido por la interfaz.
    public string $readable { get =&gt; strtoupper($this-&gt;writeable); }

    // La interfaz requiere únicamente que la propiedad sea modificable,
    // pero incluir operaciones get también es completamente válido.
    // Este ejemplo crea una propiedad virtual, lo cual es aceptable.
    public string $writeable {
        get =&gt; $this-&gt;written;
        set {
            $this-&gt;written = $value;
        }
    }

    // Esta propiedad requiere que la lectura y la escritura sean posibles,
    // por lo que debemos implementar ambas o permitir el comportamiento por defecto.
    public string $both {
        get =&gt; $this-&gt;all;
        set {
            $this-&gt;all = strtoupper($value);
        }
    }
}
?&gt;





   ### Ejemplos


   **Ejemplo #2 Ejemplo de interfaz**



&lt;?php

// Declaración de la interfaz 'Template'
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implementación de la interfaz
// Esto funcionará
class WorkingTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this-&gt;vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this-&gt;vars as $name =&gt; $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// Esto no funcionará
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (Template::getHtml)
class BadTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this-&gt;vars[$name] = $var;
    }
}
?&gt;




    **Ejemplo #3 Las interfaces extensibles**



&lt;?php
interface A
{
    public function foo();
}

interface B extends A
{
    public function baz(Baz $baz);
}

// Esto funcionará
class C implements B
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

// Esto no funcionará y resultará en un error fatal
class D implements B
{
    public function foo()
    {
    }

    public function baz(Foo $foo)
    {
    }
}
?&gt;




    **Ejemplo #4 Compatibilidad de la varianza con múltiples interfaces**



&lt;?php
class Foo {}
class Bar extends Foo {}

interface A {
    public function myfunc(Foo $arg): Foo;
}

interface B {
    public function myfunc(Bar $arg): Bar;
}

class MyClass implements A, B
{
    public function myfunc(Foo $arg): Bar
    {
        return new Bar();
    }
}
?&gt;




    **Ejemplo #5 Herencia de múltiples interfaces**



&lt;?php
interface A
{
    public function foo();
}

interface B
{
    public function bar();
}

interface C extends A, B
{
    public function baz();
}

class D implements C
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}
?&gt;




    **Ejemplo #6 Interfaces con constantes**



&lt;?php
interface A
{
    const B = 'Constante de la interfaz';
}

// Muestra: Constante de la interfaz
echo A::B;

// Sin embargo, esto no funcionará, ya que no está permitido
// sobrescribir constantes.
class B implements A
{
    const B = 'Constante de clase';
}

// Muestra: Constante de clase
// Anterior a PHP 8.1.0, esto no funcionaría, ya que no estaba permitido
// redefinir constantes.
echo B::B;
?&gt;




    **Ejemplo #7 Las interfaces con las clases abstractas**



&lt;?php
interface A
{
    public function foo(string $s): string;

    public function bar(int $i): int;
}

// Una clase abstracta puede implementar solo una parte de una interfaz.
// Las clases que extienden la clase abstracta deben implementar el resto.
abstract class B implements A
{
    public function foo(string $s): string
    {
        return $s . PHP_EOL;
    }
}

class C extends B
{
    public function bar(int $i): int
    {
        return $i * 2;
    }
}
?&gt;




    **Ejemplo #8 Extendiendo e implementando simultáneamente**



&lt;?php

class One
{
    /* ... */
}

interface Usable
{
    /* ... */
}

interface Updatable
{
    /* ... */
}

// El orden de las palabras clave aquí es importante. 'extends' debe ir primero.
class Two extends One implements Usable, Updatable
{
    /* ... */
}
?&gt;




    Una interfaz, con las declaraciones de tipos, proporciona una buena manera
    de asegurarse de que un objeto particular contiene métodos particulares.
    Ver el operador [instanceof](#language.operators.type) y
    las [declaraciones de tipo](#language.types.declarations).














 ## Traits


  PHP implementa una manera de reutilizar código llamada Traits.




  Los traits son un mecanismo de reutilización de código en un lenguaje de herencia simple
  como PHP. Un trait intenta reducir ciertas limitaciones de la herencia simple, permitiendo
  al desarrollador reutilizar un cierto número de métodos en clases independientes. La sémantica entre las clases y los traits reduce la complejidad y evita los problemas
  típicos de la herencia múltiple y los Mixins.




  Un trait es similar a una clase, pero solo sirve para agrupar funcionalidades de una
  manera interesante. No es posible instanciar un Trait en sí mismo. Es un
  añadido a la herencia tradicional, que permite la composición horizontal de comportamientos,
  es decir, el uso de métodos de clase sin necesidad de herencia.





  **Ejemplo #1 Ejemplo de uso de Trait**



&lt;?php

trait TraitA {
    public function sayHello() {
        echo 'Hello';
    }
}

trait TraitB {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld
{
    use TraitA, TraitB; // Una clase puede usar múltiples traits

    public function sayHelloWorld() {
        $this-&gt;sayHello();
        echo ' ';
        $this-&gt;sayWorld();
        echo "!\n";
    }
}

$myHelloWorld = new MyHelloWorld();
$myHelloWorld-&gt;sayHelloWorld();

?&gt;


  El ejemplo anterior mostrará:




Hello World!





  ### Precedencia


   Un método heredado desde una clase madre es sobrescrito por un método proveniente de un Trait.
   El orden de precedencia hace que los métodos de la clase actual
   sobrescriban los métodos provenientes de un Trait, ellos mismos sobrecargando los métodos heredados.




   **Ejemplo #2 Ejemplo con el orden de precedencia**



    Un método heredado desde la clase base es sobrescrito por el que proviene
    del Trait. No es el caso de los métodos reales, escritos en la clase base.




&lt;?php
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o-&gt;sayHello();
?&gt;


   El ejemplo anterior mostrará:




Hello World!




   **Ejemplo #3 Otro ejemplo de orden de precedencia**



&lt;?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o-&gt;sayHello();
?&gt;


   El ejemplo anterior mostrará:




Hello Universe!






  ### Múltiples Traits


   Una clase puede usar múltiples Traits declarándolos con la
   palabra clave use, separados por comas.




   **Ejemplo #4 Uso de varios Traits**



&lt;?php
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o-&gt;sayHello();
$o-&gt;sayWorld();
$o-&gt;sayExclamationMark();
?&gt;


   El ejemplo anterior mostrará:




Hello World!






  ### Resolución de conflictos


   Si dos Traits insertan un método con el mismo nombre, se produce un error fatal si el conflicto no es
   explícitamente resuelto.




   Para resolver un conflicto de nombres entre Traits usados en la misma clase, se debe usar el operador
   insteadof para elegir uno de los métodos en conflicto.




   Dado que este principio solo permite excluir métodos,
   el operador as puede ser usado para permitir
   la inclusión de uno de los métodos conflictivos bajo otro nombre. Se debe tener en cuenta que
   el operador as no renombra el método y no afecta
   a otros métodos tampoco.




   **Ejemplo #5 Resolución de conflictos**



    En este ejemplo, la clase Talker usa los traits A y B.
    Como A y B tienen métodos conflictivos, se indica que se desea usar
    la variante de smallTalk desde el trait B, y la variante de bigTalk desde el
    trait A.




    La clase Aliased_Talker usa el operador as
    para poder usar la implementación bigTalk de B bajo un alias
    adicional talk.




&lt;?php
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}
?&gt;






  ### Cambiar la visibilidad de los métodos


   Usando la sintaxis as, también se puede ajustar
   la visibilidad del método en la clase que lo usa.




   **Ejemplo #6 Cambiar la visibilidad de los métodos**



&lt;?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// Modificación de la visibilidad del método sayHello
class MyClass1 {
    use HelloWorld { sayHello as protected; }
}

// Uso de un alias al modificar la visibilidad
// La visibilidad del método sayHello no es modificada
class MyClass2 {
    use HelloWorld { sayHello as private myPrivateHello; }
}
?&gt;






  ### Traits Compuestos desde otros Traits


   Al igual que las clases pueden usar traits, otros traits también pueden hacerlo. Un trait puede, por lo tanto, usar otros traits y heredar
   todo o parte de ellos.




   **Ejemplo #7 Traits Compuestos desde otros Traits**



&lt;?php
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World!';
    }
}

trait HelloWorld {
    use Hello, World;
}

class MyHelloWorld {
    use HelloWorld;
}

$o = new MyHelloWorld();
$o-&gt;sayHello();
$o-&gt;sayWorld();
?&gt;


   El ejemplo anterior mostrará:




Hello World!






  ### Métodos abstractos en los Traits


   Los traits soportan el uso de métodos abstractos para imponer
   restricciones a las clases subyacentes. Se soportan los métodos públicos, protegidos,
   y privados.
   Anterior a PHP 8.0.0, solo se soportaban los métodos públicos y protegidos abstractos.



  **Precaución**

     A partir de PHP 8.0.0, la firma de un método concreto debe seguir las
     [reglas de compatibilidad de firmas](#language.oop.lsp).
     Anteriormente, su firma podía ser diferente.





   **Ejemplo #8 Obligaciones requeridas por los métodos abstractos**



&lt;?php
trait Hello {
    public function sayHelloWorld() {
        echo 'Hello'.$this-&gt;getWorld();
    }
    abstract public function getWorld();
}

class MyHelloWorld {
    private $world;
    use Hello;
    public function getWorld() {
        return $this-&gt;world;
    }
    public function setWorld($val) {
        $this-&gt;world = $val;
    }
}
?&gt;






  ### Atributos estáticos en los Traits


   Los traits pueden definir variables estáticas, métodos estáticos
   y propiedades estáticas.



  **Nota**:



    A partir de PHP 8.1.0, llamar a un método estático o acceder a una
    propiedad estática directamente en un trait es obsoleto.
    Los métodos y propiedades estáticas deberían ser accedidos solo en una clase que use el trait.





   **Ejemplo #9 Variables estáticas**



&lt;?php

trait Counter
{
    public function inc()
    {
        static $c = 0;
        $c = $c + 1;
        echo "$c\n";
    }
}

class C1
{
    use Counter;
}

class C2
{
    use Counter;
}

$o = new C1();
$o-&gt;inc();
$p = new C2();
$p-&gt;inc();

?&gt;


   El ejemplo anterior mostrará:




1
1




   **Ejemplo #10 Métodos estáticos**



&lt;?php

trait StaticExample
{
    public static function doSomething()
    {
        return 'Doing something';
    }
}

class Example
{
    use StaticExample;
}

echo Example::doSomething();

?&gt;


   El ejemplo anterior mostrará:




Doing something




   **Ejemplo #11 Propiedades estáticas**


   **Precaución**

      Antes de PHP 8.3.0, las propiedades estáticas definidas en un trait eran compartidas
      entre todas las clases de la misma jerarquía de herencia que usaban ese trait.
      A partir de PHP 8.3.0, si una clase hija usa un trait con una propiedad estática,
      esta será considerada como distinta de la definida en la clase padre.





&lt;?php

trait StaticExample
{
    public static $counter = 1;
}

class A
{
    use T;

    public static function incrementCounter()
    {
        static::$counter++;
    }
}

class B extends A
{
    use T;
}

A::incrementCounter();

echo A::$counter, "\n";
echo B::$counter, "\n";

?&gt;


   Resultado del ejemplo anterior en PHP 8.3:




2
1





   ### Propiedades


    Los traits también pueden definir propiedades.




    **Ejemplo #12 Definir propiedades**



&lt;?php

trait PropertiesTrait
{
    public $x = 1;
}

class PropertiesExample
{
    use PropertiesTrait;
}

$example = new PropertiesExample();
$example-&gt;x;

?&gt;




     Si un trait define una propiedad, entonces la clase no puede definir una
     propiedad con el mismo nombre a menos que sea compatible (misma visibilidad, tipo,
     modificador readonly, valor inicial), de lo contrario se produce un error fatal.




    **Ejemplo #13 Resolución de conflictos**



&lt;?php
trait PropertiesTrait {
    public $same = true;
    public $different1 = false;
    public bool $different2;
    public bool $different3;
}

class PropertiesExample {
    use PropertiesTrait;
    public $same = true;
    public $different1 = true; // Fatal error
    public string $different2; // Fatal error
    readonly protected bool $different3; // Fatal error
}
?&gt;






  ### Constantes


   Los traits pueden, a partir de PHP 8.2.0, también definir constantes.




   **Ejemplo #14 Trait definiendo una constante**



&lt;?php
trait ConstantsTrait {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUTABLE = 5;
}

class ConstantsExample {
    use ConstantsTrait;
}

$example = new ConstantsExample;
echo $example::FLAG_MUTABLE;
?&gt;


   El ejemplo anterior mostrará:




1




   Si un trait define una constante, entonces una clase no puede definir una
   constante con el mismo nombre, a menos que sea compatible (misma
   visibilidad, mismo valor, etc.), de lo contrario se produce un error fatal.




   **Ejemplo #15 Resolución de conflicto**



&lt;?php
trait ConstantsTrait {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUTABLE = 5;
}

class ConstantsExample {
    use ConstantsTrait;
    public const FLAG_IMMUTABLE = 5; // Fatal error
}
?&gt;





   ### Métodos finales


    A partir de PHP 8.3.0, el modificador [final](#language.oop5.final)
    puede ser aplicado usando el operador as
    a los métodos importados desde los traits. Esto puede ser usado para impedir
    que las clases hijas sobrecarguen el método. Sin embargo, la clase que usa
    el trait puede seguir sobrecargando el método.




    **Ejemplo #16 Definir un método proveniente de un trait como final**



    &lt;?php

trait CommonTrait
{
    public function method()
    {
        echo 'Hello';
    }
}

class FinalExampleA
{
    use CommonTrait {
        CommonTrait::method as final; // El 'final' impide que las clases hijas sobrecarguen el método
    }
}

class FinalExampleB extends FinalExampleA
{
    public function method() {}
}

?&gt;


    Resultado del ejemplo anterior es similar a:




Fatal error: Cannot override final method FinalExampleA::method() in ...














 ## Clases anónimas



  Las clases anónimas son útiles cuando se necesita crear objetos únicos simples.






&lt;?php

// Utilizando una clase explícita
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util-&gt;setLogger(new Logger());

// Utilizando una clase anónima
$util-&gt;setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});





  Se les pueden pasar argumentos a través del constructor, pueden extender otras clases, implementar interfaces o utilizar traits como con una clase normal.






&lt;?php

class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump(new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this-&gt;num = $num;
    }

    use SomeTrait;
});


  El ejemplo anterior mostrará:




object(class@anonymous)#1 (1) {
  ["Command line code0x104c5b612":"class@anonymous":private]=&gt;
  int(10)
}





  Anidar una clase anónima dentro de otra clase no da acceso a los métodos o propiedades privadas o protegidas de la clase contenedora. Para utilizar métodos o propiedades protegidas de la clase contenedora, la clase anónima debe extenderla. Para utilizar las propiedades privadas de la clase contenedora en la clase anónima, estas deben ser pasadas a través del constructor.






&lt;?php

class Outer
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        return new class($this-&gt;prop) extends Outer {
            private $prop3;

            public function __construct($prop)
            {
                $this-&gt;prop3 = $prop;
            }

            public function func3()
            {
                return $this-&gt;prop2 + $this-&gt;prop3 + $this-&gt;func1();
            }
        };
    }
}

echo (new Outer)-&gt;func2()-&gt;func3();


  El ejemplo anterior mostrará:




6





  Todos los objetos creados por la misma declaración de clase anónima son instancias de la misma clase.






&lt;?php
function anonymous_class()
{
    return new class {};
}

if (get_class(anonymous_class()) === get_class(anonymous_class())) {
    echo 'same class';
} else {
    echo 'different class';
}


 El ejemplo anterior mostrará:




same class




 **Nota**:



   Tenga en cuenta que las clases anónimas son asignadas un nombre por el motor, como se ilustra en el siguiente ejemplo. Este nombre debe considerarse como un detalle de implementación, que no debe ser invocado.





&lt;?php
echo get_class(new class {});


  Resultado del ejemplo anterior es similar a:




class@anonymous/in/oNi1A0x7f8636ad2021





  ### Clases anónimas de solo lectura


   A partir de PHP 8.3.0, el modificador readonly puede ser aplicado a las clases anónimas.




   **Ejemplo #1 Definir una clase anónima de solo lectura**



    &lt;?php
// Utilización de una clase anónima
var_dump(new readonly class('[DEBUG]') {
    public function __construct(private string $prefix)
    {
    }

    public function log($msg)
    {
        echo $this-&gt;prefix . ' ' . $msg;
    }
});













  ## Sobrecarga mágica



   La sobrecarga mágica en PHP permite "crear" dinámicamente propiedades y métodos. Estas entidades dinámicas son
   tratadas a través de métodos mágicos establecidos que se pueden posicionar
   en una clase para diversos tipos de acciones.





   Los métodos mágicos de sobrecarga son llamados durante la interacción
   con propiedades o métodos que no han sido declarados
   o no son [visibles](#language.oop5.visibility)
   en el contexto actual. El resto de esta sección utiliza
   los términos de propiedades inaccesibles y de
   métodos inaccesibles para referirse a esta
   combinación de declaración y visibilidad.





   Todos los métodos mágicos de sobrecarga deben ser definidos como
   public.




  **Nota**:



    Ninguno de los argumentos de estos métodos mágicos puede ser
    [pasado por
    referencia](#functions.arguments.by-reference).





  **Nota**:



    La interpretación PHP de la sobrecarga es
    diferente de la de la mayoría de los lenguajes orientados a objetos. La sobrecarga, habitualmente, proporciona la posibilidad de tener
    varios métodos con el mismo nombre pero con una cantidad
    y tipos diferentes de argumentos.






   ### Sobrecarga de propiedades



    public **__set**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

   public **__get**([string](#language.types.string) $name): [mixed](#language.types.mixed)

   public **__isset**([string](#language.types.string) $name): [bool](#language.types.boolean)

   public **__unset**([string](#language.types.string) $name): [void](language.types.void.html)



    [__set()](#object.set) es solicitada al escribir datos
    hacia propiedades inaccesibles (protegidas o privadas) o no existentes.





    [__get()](#object.get) es llamada para leer datos desde
    propiedades inaccesibles (protegidas o privadas) o no existentes.





    [__isset()](#object.isset) es solicitada cuando
    [isset()](#function.isset) o [empty()](#function.empty) son llamadas sobre
    propiedades inaccesibles (protegidas o privadas) o no existentes.





    [__unset()](#object.unset) es invocada cuando
    [unset()](#function.unset) es llamada sobre propiedades inaccesibles
    (protegidas o privadas) o no existentes.





    El argumento $name es el nombre de la propiedad con la que se interactúa.
    El argumento $value del método [__set()](#object.set)
    especifica el valor al que la propiedad $name debería ser definida.





    La sobrecarga de propiedades solo funciona en contextos de objeto.
    Estos métodos mágicos no serán lanzados en contexto estático.
    Por consiguiente, estos métodos no deberían ser declarados como
    [estáticos](#language.oop5.static).
    Se lanza un aviso si alguno de los métodos mágicos es declarado como estático.




   **Nota**:



     El valor devuelto por [__set()](#object.set)
     es ignorado debido a la forma en que PHP trata el operador de asignación.
     De la misma manera, [__get()](#object.get) nunca es llamada durante
     una asignación encadenada, como esta:
      $a = $obj-&gt;b = 8;





   **Nota**:



     PHP no llamará a un método sobrecargado desde el mismo método sobrecargado.
     Esto significa, por ejemplo, que escribir return $this-&gt;foo dentro
     de [__get()](#object.get) devolverá null
     y lanzará un **[E_WARNING](#constant.e-warning)** si no hay una propiedad foo definida,
     en lugar de llamar a [__get()](#object.get) una segunda vez.
     Sin embargo, los métodos de sobrecarga pueden invocar otros métodos de sobrecarga de manera implícita
     (por ejemplo, [__set()](#object.set) desencadenando [__get()](#object.get)).






    **Ejemplo #1 Ejemplo de sobrecarga de propiedades con los métodos
     [__get()](#object.get),
     [__set()](#object.set),
     [__isset()](#object.isset) y
     [__unset()](#object.unset)
    **



&lt;?php
class PropertyTest
{
    /**  Variable para los datos sobrecargados.  */
    private $data = array();

    /**  La sobrecarga no es utilizada en las propiedades declaradas.  */
    public $declared = 1;

    /**  La sobrecarga solo es lanzada cuando se accede a esta propiedad desde fuera de la clase.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Definición de '$name' al valor '$value'\n";
        $this-&gt;data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Recuperación de '$name'\n";
        if (array_key_exists($name, $this-&gt;data)) {
            return $this-&gt;data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Propiedad no definida vía __get() : ' . $name .
            ' en ' . $trace[0]['file'] .
            ' en la línea ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        echo "¿Está '$name' definido?\n";
        return isset($this-&gt;data[$name]);
    }

    public function __unset($name)
    {
        echo "Borrado de '$name'\n";
        unset($this-&gt;data[$name]);
    }

    /**  Este no es un método mágico, necesario aquí solo para el ejemplo.  */
    public function getHidden()
    {
        return $this-&gt;hidden;
    }
}

$obj = new PropertyTest;

$obj-&gt;a = 1;
echo $obj-&gt;a . "\n\n";

var_dump(isset($obj-&gt;a));
unset($obj-&gt;a);
var_dump(isset($obj-&gt;a));
echo "\n";

echo $obj-&gt;declared . "\n\n";

echo "Manipulemos ahora la propiedad privada llamada 'hidden' :\n";
echo "'hidden' es visible desde la clase, por lo que __get() no es utilizado...\n";
echo $obj-&gt;getHidden() . "\n";
echo "'hidden' no es visible fuera de la clase, por lo que __get() es utilizado...\n";
echo $obj-&gt;hidden . "\n";
?&gt;


    El ejemplo anterior mostrará:




Definición de 'a' a '1'
Recuperación de 'a'
1

¿Está 'a' definido?
bool(true)
Borrado de 'a'
¿Está 'a' definido?
bool(false)

1

Manipulemos ahora la propiedad privada llamada 'hidden' :
'hidden' es visible desde la clase, por lo que __get() no es utilizado...
2
'hidden' no es visible fuera de la clase, por lo que __get() es utilizado...
Recuperación de 'hidden'


Notice: Propiedad no definida vía __get() : hidden en &lt;file&gt; en la línea 64 en &lt;file&gt; en la línea 28







   ### Sobrecarga de métodos



    public **__call**([string](#language.types.string) $name, [array](#language.types.array) $arguments): [mixed](#language.types.mixed)

   public static **__callStatic**([string](#language.types.string) $name, [array](#language.types.array) $arguments): [mixed](#language.types.mixed)



    [__call()](#object.call) es llamada cuando se invoca
    métodos inaccesibles en un contexto de objeto.





    [__callStatic()](#object.callstatic) es lanzada cuando se invoca
    métodos inaccesibles en un contexto estático.





    El argumento $name es el nombre del método llamado.
    El argumento $arguments es un array que contiene
    los parámetros pasados al método $name.





    **Ejemplo #2 Sobrecarga de métodos con
     [__call()](#object.call) y
     [__callStatic()](#object.callstatic)**



  &lt;?php
class MethodTest
{
    public function __call($name, $arguments)
    {
        // Nota: el valor de $name es sensible a mayúsculas y minúsculas.
        echo "Llamada al método '$name' "
             . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        // Nota: el valor de $name es sensible a mayúsculas y minúsculas.
        echo "Llamada al método estático '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj-&gt;runTest('en un contexto de objeto');

MethodTest::runTest('en un contexto static');
?&gt;


    El ejemplo anterior mostrará:




Llamada al método 'runTest' en un contexto de objeto
Llamada al método estático 'runTest' en un contexto static
















  ## Recorrido de objetos


    PHP proporciona una manera de definir los objetos de manera que se pueda
    recorrer una lista de miembros, por ejemplo con una estructura
    [foreach](#control-structures.foreach). Por omisión, todas
    las propiedades [visibles](#language.oop5.visibility)
    serán utilizadas para el recorrido.





    **Ejemplo #1 Recorrido de objeto simple**



&lt;?php
class MyClass
{
  public $var1 = 'valor 1';
  public $var2 = 'valor 2';
  public $var3 = 'valor 3';

  protected $protected = 'variable protegida';
  private   $private   = 'variable privada';

  function iterateVisible() {
     echo "MyClass::iterateVisible:\n";
     foreach ($this as $key =&gt; $value) {
         print "$key =&gt; $value\n";
     }
  }
}

$class = new MyClass();

foreach($class as $key =&gt; $value) {
    print "$key =&gt; $value\n";
}
echo "\n";

$class-&gt;iterateVisible();


    El ejemplo anterior mostrará:




var1 =&gt; valor 1
var2 =&gt; valor 2
var3 =&gt; valor 3

MyClass::iterateVisible:
var1 =&gt; valor 1
var2 =&gt; valor 2
var3 =&gt; valor 3
protected =&gt; variable protegida
private =&gt; variable privada





    Como muestra la salida, la iteración [foreach](#control-structures.foreach) recorrió todas las
    propiedades [visibles](#language.oop5.visibility)
    que pudieron ser accedidas.





    ### Ver también





        - [Generators](#language.generators)

        - [Iterator](#class.iterator)

        - [IteratorAggregate](#class.iteratoraggregate)

        - [SPL Iterators](#spl.iterators)













  ## Métodos mágicos


   Los métodos mágicos son métodos especiales que sobrescriben la acción
   por omisión de PHP cuando se realizan ciertas acciones sobre un objeto.



 **Precaución**

   Todos los métodos que comienzan por __ están reservados por PHP.
   Por lo tanto, no se recomienda utilizar un nombre de método de este tipo, excepto cuando
   se sobrescribe el comportamiento de PHP.





  Los siguientes métodos se consideran mágicos:

  [__construct()](#object.construct),
  [__destruct()](#object.destruct),
  [__call()](#object.call),
  [__callStatic()](#object.callstatic),
  [__get()](#object.get),
  [__set()](#object.set),
  [__isset()](#object.isset),
  [__unset()](#object.unset),
  [__sleep()](#object.sleep),
  [__wakeup()](#object.wakeup),
  [__serialize()](#object.serialize),
  [__unserialize()](#object.unserialize),
  [__toString()](#object.tostring),
  [__invoke()](#object.invoke),
  [__set_state()](#object.set-state)
  [__clone()](#object.clone), y
  [__debugInfo()](#object.debuginfo).




  **Advertencia**

    Todos los métodos mágicos, excepto
    [__construct()](#object.construct),
    [__destruct()](#object.destruct), y
    [__clone()](#object.clone),
    *deben* ser declarados como public,
    de lo contrario se emitirá una **[E_WARNING](#constant.e-warning)**.
    Anterior a PHP 8.0.0, no se emitía ningún diagnóstico para los métodos mágicos
    [__sleep()](#object.sleep),
    [__wakeup()](#object.wakeup),
    [__serialize()](#object.serialize),
    [__unserialize()](#object.unserialize), y
    [__set_state()](#object.set-state).




 **Advertencia**

   Si se utilizan declaraciones de tipos en la definición de un método
   mágico, deben ser idénticas a la firma descrita en este documento.
   De lo contrario, se emitirá un error fatal.
   Anterior a PHP 8.0.0, no se emitía ningún diagnóstico.
   Sin embargo, [__construct()](#object.construct) y
   [__destruct()](#object.destruct) no deben declarar
   un tipo de retorno; de lo contrario, se emitirá un error fatal.






   ###
    [__sleep()](#object.sleep) y
    [__wakeup()](#object.wakeup)




    public **__sleep**(): [array](#language.types.array)

   public **__wakeup**(): [void](language.types.void.html)



    [serialize()](#function.serialize) verifica si la clase tiene un método con el
    nombre mágico [__sleep()](#object.sleep).
    Si es así, este método será ejecutado antes de cualquier serialización. Puede
    limpiar el objeto, y se supone que devuelve un array con los nombres de todas
    las variables del objeto que deben ser serializadas.
    Si el método no devuelve nada, entonces **[null](#constant.null)** será serializado, y se emitirá una alerta de tipo
    **[E_NOTICE](#constant.e-notice)**.



   **Nota**:



     No es posible para [__sleep()](#object.sleep) devolver
     nombres de propiedades privadas de las clases padres. Hacerlo
     resultará en un error de nivel **[E_NOTICE](#constant.e-notice)**.
     Utilice [__serialize()](#object.serialize) en su lugar.




   **Nota**:



     A partir de PHP 8.0.0, devolver un valor que no sea un array desde
     [__sleep()](#object.sleep) emite una advertencia.
     Anteriormente se emitía una notificación.





    El propósito declarado de [__sleep()](#object.sleep) es validar datos pendientes
    o realizar operaciones de limpieza.
    Además, esta función es útil si un objeto muy grande no necesita
    ser guardado en su totalidad.




    Reciprocamente, la función [unserialize()](#function.unserialize) verifica
    la presencia de un método cuyo nombre es el nombre mágico
    [__wakeup()](#object.wakeup). Si está presente, esta función
    puede reconstruir cualquier recurso que el objeto pudiera poseer.




    El propósito declarado de [__wakeup()](#object.wakeup) es restablecer
    cualquier conexión de base de datos que se haya perdido
    durante la serialización y realizar tareas de reinicialización.




    **Ejemplo #1 Uso de sleep() y wakeup()**



&lt;?php
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this-&gt;dsn = $dsn;
        $this-&gt;username = $username;
        $this-&gt;password = $password;
        $this-&gt;connect();
    }

    private function connect()
    {
        $this-&gt;link = new PDO($this-&gt;dsn, $this-&gt;username, $this-&gt;password);
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this-&gt;connect();
    }
}
?&gt;






   ###
    [__serialize()](#object.serialize) y
    [__unserialize()](#object.unserialize)




    public **__serialize**(): [array](#language.types.array)

   public **__unserialize**([array](#language.types.array) $data): [void](language.types.void.html)



    [serialize()](#function.serialize) verifica si la clase tiene un método con el
    nombre mágico [__serialize()](#object.serialize).
    Si es así, este método será ejecutado antes de cualquier serialización.
    Debe construir y devolver un [array](#language.types.array) asociativo de pares clave/valor
    que represente la forma serializada del objeto. Si no se devuelve ningún array, se lanzará una [TypeError](#class.typeerror).



   **Nota**:



     Si [__serialize()](#object.serialize) y
     [__sleep()](#object.sleep) están ambas definidas
     en el mismo objeto, entonces solo [__serialize()](#object.serialize)
     será llamada.
     [__sleep()](#object.sleep) será ignorada. Si el objeto
     implementa la interfaz [Serializable](#class.serializable),
     el método serialize() de la interfaz será ignorado y
     [__serialize()](#object.serialize) será utilizada en su lugar.





    El uso previsto de [__serialize()](#object.serialize)
    es definir una representación arbitraria del objeto para serializarlo
    fácilmente. Los elementos del array pueden corresponder a las propiedades
    del objeto, pero esto no es requerido.




    Inversamente, [unserialize()](#function.unserialize) verifica la presencia de
    una función con el nombre mágico
    [__unserialize()](#object.unserialize).
    Si está presente, esta función recibirá el array restaurado devuelto
    por [__serialize()](#object.serialize). Puede entonces
    restaurar las propiedades del objeto desde este array como sea apropiado.



   **Nota**:



     Si [__unserialize()](#object.unserialize) y
     [__wakeup()](#object.wakeup) están ambas definidas
     en el mismo objeto, entonces solo [__unserialize()](#object.unserialize)
     será llamada.
     [__wakeup()](#object.wakeup) será ignorada.




   **Nota**:



     Esta funcionalidad está disponible a partir de PHP 7.4.0.





    **Ejemplo #2 Serialize y unserialize**



&lt;?php
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this-&gt;dsn = $dsn;
        $this-&gt;username = $username;
        $this-&gt;password = $password;
        $this-&gt;connect();
    }

    private function connect()
    {
        $this-&gt;link = new PDO($this-&gt;dsn, $this-&gt;username, $this-&gt;password);
    }

    public function __serialize(): array
    {
        return [
          'dsn' =&gt; $this-&gt;dsn,
          'user' =&gt; $this-&gt;username,
          'pass' =&gt; $this-&gt;password,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this-&gt;dsn = $data['dsn'];
        $this-&gt;username = $data['user'];
        $this-&gt;password = $data['pass'];

        $this-&gt;connect();
    }
}?&gt;






   ### [__toString()](#object.tostring)


    public **__toString**(): [string](#language.types.string)



    El método [__toString()](#object.tostring) determina cómo el objeto
    debe reaccionar cuando se trata como una cadena de caracteres.
    Por ejemplo, lo que echo $obj; mostrará.



   **Advertencia**

     Un objeto [Stringable](#class.stringable)
     *no* será aceptado por una declaración de tipo [string](#language.types.string) si la
     [declaración de tipo estricta](#language.types.declarations.strict) está activada.
     Si se desea tal comportamiento, la declaración de tipo debe aceptar
     tanto [Stringable](#class.stringable) como [string](#language.types.string) a través de un tipo de unión.




     A partir de PHP 8.0.0, el valor de retorno sigue las semánticas estándar
     de PHP, lo que significa que el valor será convertido en una [string](#language.types.string)
     si es posible y si el
     [typing stricte](#language.types.declarations.strict)
     está desactivado.




     A partir de PHP 8.0.0, cualquier clase que contenga un método
     [__toString()](#object.tostring) implementa también
     implícitamente la interfaz [Stringable](#class.stringable),
     y por lo tanto pasará las verificaciones de tipos para esta interfaz.
     Se recomienda implementar explícitamente la interfaz de todos modos.




     En PHP 7.4, el valor de retorno *debe* ser una
     [string](#language.types.string), de lo contrario se lanzará un [Error](#class.error).




     Anterior a PHP 7.4.0, el valor de retorno *debe*
     ser una [string](#language.types.string), de lo contrario se emitirá una **[E_RECOVERABLE_ERROR](#constant.e-recoverable-error)**
     fatal.




   **Advertencia**

     Era imposible lanzar una excepción desde el método
     [__toString()](#object.tostring) anterior a PHP 7.4.0.
     Esto resultaría en un error fatal.





    **Ejemplo #3 Ejemplo simple**



&lt;?php
// Declaración de una clase simple
class ClasseTest
{
    public $foo;

    public function __construct($foo)
    {
        $this-&gt;foo = $foo;
    }

    public function __toString()
    {
        return $this-&gt;foo;
    }
}

$class = new ClasseTest('Bonjour');
echo $class;
?&gt;


    El ejemplo anterior mostrará:




Bonjour






   ### [__invoke()](#object.invoke)


    **__invoke**( ...$values): [mixed](#language.types.mixed)



    El método [__invoke()](#object.invoke) es llamado cuando un script intenta
    llamar a un objeto como una función.




    **Ejemplo #4 Ejemplo con [__invoke()](#object.invoke)**



&lt;?php
class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));
?&gt;


    El ejemplo anterior mostrará:




int(5)
bool(true)




    **Ejemplo #5 Ejemplo con [__invoke()](#object.invoke)**



&lt;?php
class Sort
{
    private $key;

    public function __construct(string $key)
    {
        $this-&gt;key = $key;
    }

    public function __invoke(array $a, array $b): int
    {
        return $a[$this-&gt;key] &lt;=&gt; $b[$this-&gt;key];
    }
}

$customers = [
    ['id' =&gt; 1, 'first_name' =&gt; 'John', 'last_name' =&gt; 'Do'],
    ['id' =&gt; 3, 'first_name' =&gt; 'Alice', 'last_name' =&gt; 'Gustav'],
    ['id' =&gt; 2, 'first_name' =&gt; 'Bob', 'last_name' =&gt; 'Filipe']
];

// ordenar los clientes por nombre
usort($customers, new Sort('first_name'));
print_r($customers);

// ordenar los clientes por apellido
usort($customers, new Sort('last_name'));
print_r($customers);
?&gt;


    El ejemplo anterior mostrará:




Array
(
    [0] =&gt; Array
        (
            [id] =&gt; 3
            [first_name] =&gt; Alice
            [last_name] =&gt; Gustav
        )

    [1] =&gt; Array
        (
            [id] =&gt; 2
            [first_name] =&gt; Bob
            [last_name] =&gt; Filipe
        )

    [2] =&gt; Array
        (
            [id] =&gt; 1
            [first_name] =&gt; John
            [last_name] =&gt; Do
        )

)
Array
(
    [0] =&gt; Array
        (
            [id] =&gt; 1
            [first_name] =&gt; John
            [last_name] =&gt; Do
        )

    [1] =&gt; Array
        (
            [id] =&gt; 2
            [first_name] =&gt; Bob
            [last_name] =&gt; Filipe
        )

    [2] =&gt; Array
        (
            [id] =&gt; 3
            [first_name] =&gt; Alice
            [last_name] =&gt; Gustav
        )

)






   ### [__set_state()](#object.set-state)


    static **__set_state**([array](#language.types.array) $properties): [object](#language.types.object)



    Este método [estático](#language.oop5.static) es llamado
    para las clases exportadas por la función [var_export()](#function.var-export).




    El único parámetro de este método es un array que contiene las propiedades
    exportadas en la forma ['property' =&gt; value, ...].




    **Ejemplo #6 Uso de [__set_state()](#object.set-state)**



class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array)
    {
        $obj = new A;
        $obj-&gt;var1 = $an_array['var1'];
        $obj-&gt;var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a-&gt;var1 = 5;
$a-&gt;var2 = 'foo';

$b = var_export($a, true);
var_dump($b);
eval('$c = ' . $b . ';');
var_dump($c);
?&gt;


    El ejemplo anterior mostrará:




string(60) "A::__set_state(array(
   'var1' =&gt; 5,
   'var2' =&gt; 'foo',
))"
object(A)#2 (2) {
  ["var1"]=&gt;
  int(5)
  ["var2"]=&gt;
  string(3) "foo"
}



   **Nota**:

     Al exportar un objeto, [var_export()](#function.var-export) no
     verifica si [__set_state()](#object.set-state) está
     implementada por la clase del objeto, por lo que la reimportación de objetos
     resultará en una excepción [Error](#class.error),
     si __set_state() no está implementada.
     En particular, esto afecta a ciertas clases internas.


     Es responsabilidad del programador verificar que solo los objetos cuya clase implementa __set_state() serán re-importados.







   ### [__debugInfo()](#object.debuginfo)


    **__debugInfo**(): [array](#language.types.array)


    Este método es llamado por [var_dump()](#function.var-dump) al
    procesar un objeto para recuperar las propiedades que
    deben ser mostradas. Si el método no está definido en un objeto,
    entonces todas las propiedades públicas, protegidas y privadas serán
    mostradas.




    **Ejemplo #7 Uso de [__debugInfo()](#object.debuginfo)**



&lt;?php
class C {
    private $prop;

    public function __construct($val) {
        $this-&gt;prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' =&gt; $this-&gt;prop ** 2,
        ];
    }
}

var_dump(new C(42));
?&gt;


    El ejemplo anterior mostrará:




object(C)#1 (1) {
  ["propSquared"]=&gt;
  int(1764)
}














  ## Palabra clave "final"


   La palabra clave final impide que las clases hijas redefinan
   un método, una propiedad o constante prefijando la definición con
   final. Si la clase misma es
   definida como final, no podrá ser extendida.








    **Ejemplo #1 Ejemplo de método final**



&lt;?php
class BaseClass {
   public function test() {
       echo "BaseClass::test() llamada\n";
   }

   final public function moreTesting() {
       echo "BaseClass::moreTesting() llamada\n";
   }
}

class ChildClass extends BaseClass {
   public function moreTesting() {
       echo "ChildClass::moreTesting() llamada\n";
   }
}
// Resultado: Fatal error: Cannot override final method BaseClass::moreTesting()
?&gt;









    **Ejemplo #2 Ejemplo de clase final**



&lt;?php
final class BaseClass {
   public function test() {
       echo "BaseClass::test() llamada\n";
   }

   // Como la clase ya es final, la palabra clave final es redundante
   final public function moreTesting() {
       echo "BaseClass::moreTesting() llamada\n";
   }
}

class ChildClass extends BaseClass {
}
// Resultado: Fatal error: Class ChildClass may not inherit from final class (BaseClass)
?&gt;





   **Ejemplo #3 Ejemplo de propiedad final a partir de PHP 8.4.0**



&lt;?php
class BaseClass {
   final protected string $test;
}

class ChildClass extends BaseClass {
    public string $test;
}
// Resultado: Error fatal: Imposible redefinir la propiedad final BaseClass::$test
?&gt;




   **Ejemplo #4 Ejemplo de constantes finales a partir de PHP 8.1.0**



&lt;?php
class Foo
{
    final public const X = "foo";
}

class Bar extends Foo
{
    public const X = "bar";
}

// Fatal error: Bar::X cannot override final constant Foo::X
?&gt;




  **Nota**:

    A partir de PHP 8.0.0, los métodos privados no pueden ser declarados finales, con la excepción del [constructor](#language.oop5.decon.constructor).


    Una propiedad declarada [private(set)](#language.oop5.visibility-members-aviz) es
    implícitamente final.













  ## Clonación de objetos



   La creación de una copia de un objeto con exactamente las mismas
   propiedades no siempre es el comportamiento deseado.
   Un buen ejemplo para ilustrar la necesidad de un constructor de copia:
   si se tiene un objeto que representa una ventana GTK y el objeto
   contiene el recurso que representa esa ventana GTK, al crear una copia,
   se puede desear crear una nueva ventana con las mismas propiedades,
   pero que el nuevo objeto contenga un recurso que represente la nueva ventana.





   Una copia de objeto se crea utilizando la palabra clave clone
   (que invoca al método [__clone()](#object.clone)
   del objeto, si ha sido definido).






&lt;?php
$copy_of_object = clone $object;
?&gt;





   Cuando un objeto es clonado, PHP realiza una copia superficial de todas
   las propiedades del objeto. Todas las propiedades que son referencias a otras
   variables permanecerán como referencias.





   **__clone**(): [void](language.types.void.html)



   Una vez realizada la clonación, si se ha definido un método [__clone()](#object.clone),
   el método [__clone()](#object.clone)
   del nuevo objeto será llamado, para permitir que cada propiedad que deba ser modificada lo sea.





   **Ejemplo #1 Ejemplo de duplicación de objetos**



&lt;?php
class SubObject
{
  static $instances = 0;
  public $instance;

  public function __construct() {
    $this-&gt;instance = ++self::$instances;
  }

  public function __clone() {
    $this-&gt;instance = ++self::$instances;
  }
}

class MyCloneable
{
  public $objet1;
  public $objet2;

  function __clone()
  {
    // Fuerza la copia de this-&gt;object, de lo contrario
    // apuntará al mismo objeto.
    $this-&gt;object1 = clone $this-&gt;object1;
  }
}

$obj = new MyCloneable();

$obj-&gt;object1 = new SubObject();
$obj-&gt;object2 = new SubObject();

$obj2 = clone $obj;

print "Objeto original :\n";
print_r($obj);

print "Objeto clonado :\n";
print_r($obj2);

?&gt;


   El ejemplo anterior mostrará:




Objeto original :
MyCloneable Object
(
    [object1] =&gt; SubObject Object
        (
            [instance] =&gt; 1
        )

    [object2] =&gt; SubObject Object
        (
            [instance] =&gt; 2
        )

)
Objeto clonado :
MyCloneable Object
(
    [object1] =&gt; SubObject Object
        (
            [instance] =&gt; 3
        )

    [object2] =&gt; SubObject Object
        (
            [instance] =&gt; 2
        )

)







   Es posible acceder a un miembro de un objeto
   recién clonado en una sola expresión:




   **Ejemplo #2 Acceso a un miembro de un objeto recién clonado**



&lt;?php
$dateTime = new DateTime();
echo (clone $dateTime)-&gt;format('Y');
?&gt;


   Resultado del ejemplo anterior es similar a:




2016













   ## Comparación de objetos


    Al utilizar el operador de comparación (==),
    los objetos se comparan de manera simple, es decir:
    dos objetos son iguales si tienen los mismos atributos y valores (los valores
    se comparan con el operador ==), y si
    son instancias de la misma clase.




    Al utilizar el operador de identidad
    (===), los objetos son idénticos únicamente si
    hacen referencia a la misma instancia de la misma clase.




    Un ejemplo ilustrará estas reglas.



     **Ejemplo #1 Ejemplo de comparación de objetos en PHP**



&lt;?php
function bool2str($bool)
{
    if ($bool === false) {
            return 'FALSE';
    } else {
            return 'TRUE';
    }
}

function compareObjects(&amp;$o1, &amp;$o2)
{
    echo 'o1 == o2 : '.bool2str($o1 == $o2)."\n";
    echo 'o1 != o2 : '.bool2str($o1 != $o2)."\n";
    echo 'o1 === o2 : '.bool2str($o1 === $o2)."\n";
    echo 'o1 !== o2 : '.bool2str($o1 !== $o2)."\n";
}

class Flag
{
    public $flag;

    function __construct($flag = true) {
        $this-&gt;flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function __construct($flag = true) {
        $this-&gt;flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Dos instancias de la misma clase\n";
compareObjects($o, $p);

echo "\nDos referencias al mismo objeto\n";
compareObjects($o, $q);

echo "\nInstancias de clases diferentes\n";
compareObjects($o, $r);
?&gt;


     El ejemplo anterior mostrará:




Dos instancias de la misma clase
o1 == o2 : TRUE
o1 != o2 : FALSE
o1 === o2 : FALSE
o1 !== o2 : TRUE

Dos referencias al mismo objeto
o1 == o2 : TRUE
o1 != o2 : FALSE
o1 === o2 : TRUE
o1 !== o2 : FALSE

Instancias de clases diferentes
o1 == o2 : FALSE
o1 != o2 : TRUE
o1 === o2 : FALSE
o1 !== o2 : TRUE




   **Nota**:



     Las extensiones pueden definir sus propias reglas para sus
     comparaciones de objetos (==).














  ## Late Static Bindings (Résolution statique a la volée)


   PHP implementa una funcionalidad llamada
   late static binding, en español la resolución
   estática a la volée, que puede ser utilizada para referenciar la clase llamada
   en un contexto de herencia estática.





   Más precisamente, las resoluciones estáticas a la volée funcionan registrando
   el nombre de la clase en el último "llamado no transmitido". En el caso de los llamados de
   métodos estáticos, se trata de la clase explícitamente nombrada (generalmente, la que está a
   la izquierda del operador
   [::](#language.oop5.paamayim-nekudotayim)) ;
   en el caso de métodos no estáticos, se trata de la clase del objeto. Un "llamado
   transmitido" es un llamado estático desencadenado por self::,
   parent::, static::, o, en la parte superior de la
   jerarquía de clases, [forward_static_call()](#function.forward-static-call).


   La función [get_called_class()](#function.get-called-class) puede ser utilizada para recuperar
   una cadena que contiene el nombre de la clase llamada, y static::
   introduce su espacio.





   Esta funcionalidad ha sido bautizada como "late static bindings",
   con un punto de vista interno. "Late binding", literalmente
   resolución tardía, proviene del hecho de que los elementos static::
   no serán resueltos utilizando la clase donde el método ha sido definido, sino
   la que está activa durante la ejecución. El adjetivo estático ha sido
   añadido porque este problema se aplica (sin estar limitado a) a los métodos estáticos.





   ### Limitaciones de self::


    Las referencias estáticas a la clase actual, con self:: o
    __CLASS__, son resueltas utilizando la clase a la que
    pertenecen las funciones, es decir, donde fueron definidas:




    **Ejemplo #1 Uso de self::**



&lt;?php

class A
{
    public static function qui()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        self::qui();
    }
}

class B extends A
{
    public static function qui()
    {
         echo __CLASS__;
    }
}

B::test();

?&gt;


    El ejemplo anterior mostrará:




A







   ### Uso de la resolución estática a la volée



    La resolución estática a la volée intenta superar esta limitación
    introduciendo una palabra clave que hace referencia a la clase
    que ha sido llamada durante la ejecución. Para simplificar, esta palabra clave
    permite la referencia a B desde
    test(), en el ejemplo anterior.
    Se decidió no introducir una nueva palabra clave, sino más bien
    utilizar la palabra static que ya estaba
    reservada.





    **Ejemplo #2 Uso simple de static::**



&lt;?php

class A
{
    public static function qui()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        static::qui(); // Aquí, resolución a la volée
    }
}

class B extends A
{
    public static function qui()
    {
         echo __CLASS__;
    }
}

B::test();

?&gt;


    El ejemplo anterior mostrará:




B



   **Nota**:



     En contextos no estáticos, la clase llamada será la del objeto.
     Como $this-&gt; intentará llamar
     a métodos privados desde el mismo contexto, utilizar static::
     podría dar resultados diferentes. Tenga en cuenta también que
     static:: solo puede hacer referencia a atributos/métodos
     estáticos.





    **Ejemplo #3 Uso de static:: en un contexto no estático**



&lt;?php

class A
{
    private function foo()
    {
        echo "success!\n";
    }
    public function test()
    {
        $this-&gt;foo();
        static::foo();
    }
}

class B extends A
{
   /* foo() será copiada en B, por lo tanto su contexto será siempre A
    * y la llamada se realizará sin problemas */
}

class C extends A
{
    private function foo()
    {
        /* El método original es reemplazado; el contexto es el de C */
    }
}

$b = new B();
$b-&gt;test();

$c = new C();
try {
    $c-&gt;test();
} catch (Error $e) {
    echo $e-&gt;getMessage();
}

?&gt;


    El ejemplo anterior mostrará:




Success!
Success!
Success!
Call to private method C::foo() from scope A



   **Nota**:



     La resolución de estáticos a la volée se detendrá en un llamado estático
     completamente resuelto. Por otro lado, los llamados estáticos utilizando
     una palabra clave como parent:: o self::
     transmitirán la información de llamada.




     **Ejemplo #4 Llamada con o sin transmisión**



&lt;?php

class A
{
    public static function foo()
    {
        static::qui();
    }

    public static function qui()
    {
        echo __CLASS__."\n";
    }
}

class B extends A
{
    public static function test()
    {
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function qui()
    {
        echo __CLASS__."\n";
    }
}
class C extends B
{
    public static function qui()
    {
        echo __CLASS__."\n";
    }
}

C::test();

?&gt;


     El ejemplo anterior mostrará:




A
C
C















  ## Objetos y referencias


   Uno de los pilares de la POO de PHP es el hecho de que los
   "objetos son pasados por referencia por omisión". Esto no es completamente cierto.
   Esta sección corrige esta generalización con algunos ejemplos.





   Una referencia PHP es un alias, que permite a dos variables diferentes
   representar el mismo valor. En PHP, una variable objeto
   no contiene más el objeto en sí mismo como valor. Contiene solo un identificador
   de objeto, que permite a los métodos de acceso de objetos encontrar dicho objeto.
   Cuando el objeto es utilizado como argumento, devuelto por una función,
   o asignado a otra variable, las diferentes variables no son
   alias: contienen copias del identificador, que apuntan al
   mismo objeto.





   **Ejemplo #1 Referencias y Objetos**



&lt;?php
class A {
    public $foo = 1;
}

$a = new A;
$b = $a;     // $a y $b son copias del mismo identificador
             // ($a) = ($b) = &lt;id&gt;
$b-&gt;foo = 2;
echo $a-&gt;foo."\n";

$c = new A;
$d = &amp;$c;    // $c y $d son referencias
             // ($c,$d) = &lt;id&gt;

$d-&gt;foo = 2;
echo $c-&gt;foo."\n";

$e = new A;

function foo($obj) {
    // ($obj) = ($e) = &lt;id&gt;
    $obj-&gt;foo = 2;
}

foo($e);
echo $e-&gt;foo."\n";

?&gt;


   El ejemplo anterior mostrará:




2
2
2














 ## Serializar objetos - objetos en sesión




  [serialize()](#function.serialize) devuelve un string que contiene
  una representación lineal de cualquier valor que
  puede ser almacenado en PHP. [unserialize()](#function.unserialize) puede utilizar este
  string para recrear el valor original de la variable a partir de su representación lineal. Utilizar [serialize()](#function.serialize)
  para guardar un objeto conservará todas sus variables. Sus métodos no serán conservados, solo el nombre de la clase lo será.





  Para poder deserializar ([unserialize()](#function.unserialize)) un objeto,
  la clase del objeto debe estar definida, para permitir su reconstrucción.
  En otras palabras, si se tiene un objeto de la clase A y se serializa,
  la representación lineal obtenida hará referencia a la clase A y contendrá todas
  sus variables. Si se desea poder deserializar esta representación lineal en un
  lugar donde la clase A no esté definida (en otro fichero, por ejemplo),
  entonces se deberá redclarar la clase A antes de proceder a la deserialización
  de su representación lineal. Esto puede hacerse, por ejemplo, incluyendo el
  fichero de definición de la clase, o utilizando la función
  [spl_autoload_register()](#function.spl-autoload-register).






&lt;?php
// A.php :

  class A {
      public $one = 1;

      public function show_one() {
          echo $this-&gt;one;
      }
  }

// page1.php :

  include "A.php";

  $a = new A;
  $s = serialize($a);
  // guarda $s en algún lugar donde page2.php pueda encontrarlo
  file_put_contents('store', $s);

// page2.php :

  // se necesita la definición de la clase
  // para que unserialize() funcione
  include "A.php";

  $s = file_get_contents('store');
  $a = unserialize($s);

  // llamada a show_one() en el objeto $a, muestra 1
  $a-&gt;show_one();
?&gt;





  Si una aplicación serializa objetos, se recomienda encarecidamente, para su uso
  futuro, que la aplicación incluya las definiciones de las clases de los objetos serializados
  en cada página. No hacerlo podría resultar en un objeto deserializado sin su definición
  de clase. PHP asignaría entonces a este objeto una clase de tipo
  **__PHP_Incomplete_Class_Name**, que no tiene métodos, y
  produciría un objeto inútil.





  Así, en el ejemplo anterior, si $a se registra en la sesión
  añadiendo una clave a la variable superglobal [$_SESSION](#reserved.variables.session), se debería incluir el fichero
  A.php en todas las páginas, y no solo en
  page1.php y page2.php.





  Tenga en cuenta que también se pueden utilizar los eventos de serialización y deserialización
  en un objeto utilizando los métodos [__sleep()](#object.sleep) y
  [__wakeup()](#object.wakeup). El uso de
  [__sleep()](#object.sleep) permite también serializar solo una parte de las propiedades del objeto.














 ## Covarianza y Contravarianza



  A partir de PHP 7.2.0, se introdujo la contravarianza parcial eliminando las restricciones de tipo
  en los parámetros de un método hijo. A partir de PHP 7.4.0, se añadieron la covarianza y la contravarianza completas.




  La covarianza permite a un método hijo devolver un tipo más específico que el tipo de retorno
  de su método padre. La contravarianza permite que un tipo de parámetro sea menos específico
  en un método hijo que en el de la clase padre.




  Una declaración de tipo se considera más específica en el siguiente caso:



   -

     Un tipo es retirado de un
    [tipo union](#language.types.type-system.composite.union)



   -

     Un tipo es añadido a un
    [tipo de intersección](#language.types.type-system.composite.intersection)



   -

     Un tipo de clase es transformado en un tipo de clase hijo



   -

    [iterable](#language.types.iterable) es reemplazado por [array](#language.types.array) o [Traversable](#class.traversable)





  Un tipo de clase se considera menos específico si lo contrario es cierto.



  ### Covarianza



   Para ilustrar el funcionamiento de la covarianza, se crea una simple clase padre abstracta, Animal
   que será extendida por clases hijas,
  Cat y Dog.






&lt;?php

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this-&gt;name = $name;
    }

    abstract public function speak();
}

class Dog extends Animal
{
    public function speak()
    {
        echo $this-&gt;name . " barks";
    }
}

class Cat extends Animal
{
    public function speak()
    {
        echo $this-&gt;name . " meows";
    }
}





   Téngase en cuenta que no hay métodos que devuelvan valores en este ejemplo. Se añadirán algunas fábricas
   y devolverán un nuevo objeto de clase de tipo Animal,
  Cat, o Dog.






&lt;?php

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat // en lugar de devolver el tipo de clase Animal, puede devolver el tipo de clase Cat
    {
        return new Cat($name);
    }
}

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog // en lugar de devolver el tipo de clase Animal, puede devolver el tipo de clase Dog
    {
        return new Dog($name);
    }
}

$kitty = (new CatShelter)-&gt;adopt("Ricky");
$kitty-&gt;speak();
echo "\n";

$doggy = (new DogShelter)-&gt;adopt("Mavrick");
$doggy-&gt;speak();


   El ejemplo anterior mostrará:




Ricky meows
Mavrick barks






  ### Contravarianza



   Retomando el ejemplo anterior con las clases Animal,
   Cat y Dog, se incluyen dos clases llamadas
   Food y AnimalFood, y
   se añade un método eat(AnimalFood $food) a la clase abstracta
   Animal.






&lt;?php

class Food {}

class AnimalFood extends Food {}

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this-&gt;name = $name;
    }

    public function eat(AnimalFood $food)
    {
        echo $this-&gt;name . " eats " . get_class($food);
    }
}





   Para ver el comportamiento de la contravarianza, el método
   método eat es sobrecargado en la clase Dog para permitir
   cualquier objeto de tipo Food. La clase Cat permanece sin cambios.






&lt;?php

class Dog extends Animal
{
    public function eat(Food $food) {
        echo $this-&gt;name . " eats " . get_class($food);
    }
}





   El siguiente ejemplo muestra el comportamiento de la contravarianza.






&lt;?php

$kitty = (new CatShelter)-&gt;adopt("Ricky");
$catFood = new AnimalFood();
$kitty-&gt;eat($catFood);
echo "\n";

$doggy = (new DogShelter)-&gt;adopt("Mavrick");
$banana = new Food();
$doggy-&gt;eat($banana);


   El ejemplo anterior mostrará:




Ricky eats AnimalFood
Mavrick eats Food




   Pero, ¿qué sucede si $kitty intenta comer (**eat()**) la
   banana ($banana) ?





$kitty-&gt;eat($banana);


   El ejemplo anterior mostrará:




Fatal error: Uncaught TypeError: Argument 1 passed to Animal::eat() must be an instance of AnimalFood, instance of Food given





  ### Variación de tipo de las propiedades


   Por defecto, las propiedades no son ni covariantes ni contravariantes, por lo tanto, son invariantes.
   En otras palabras, su tipo no puede cambiar en absoluto en una clase hija.
   La razón es que las operaciones "get" deben ser covariantes,
   y las operaciones "set" deben ser contravariantes.
   La única manera para que una propiedad cumpla con estos dos requisitos es ser invariante.




   A partir de PHP 8.4.0, con la adición de las propiedades abstractas (en una interfaz o una clase abstracta) y
   [propiedades virtuales](#language.oop5.property-hooks.virtual),
   es posible declarar una propiedad que solo tenga una operación "get" o "set".
   En consecuencia, las propiedades abstractas o las propiedades virtuales que solo requieren la operación "get" pueden ser covariantes.
   De manera similar, una propiedad abstracta o una propiedad virtual que solo requiere la operación "set" puede ser contravariante.




   Sin embargo, una vez que una propiedad tiene tanto una operación "get" como "set",
   ya no es covariante ni contravariante para una extensión futura.
   En otras palabras, se vuelve invariante.




   **Ejemplo #1 Variación del tipo de las propiedades**



&lt;?php
class Animal {}
class Dog extends Animal {}
class Poodle extends Dog {}

interface PetOwner
{
    // Solo se requiere la operación "get", por lo tanto, puede ser covariante.
    public Animal $pet { get; }
}

class DogOwner implements PetOwner
{
    // Puede ser un tipo más restrictivo, ya que el lado "get"
    // siempre devuelve un Animal. Sin embargo, como propiedad nativa,
    // los hijos de esta clase ya no pueden cambiar el tipo.
    public Dog $pet;
}

class PoodleOwner extends DogOwner
{
    // ESTO NO ESTÁ PERMITIDO, ya que DogOwner::$pet tiene tanto
    // las operaciones "get" como "set" definidas y requeridas.
    public Poodle $pet;
}
?&gt;













 ## Objetos perezosos



  Un objeto perezoso es un objeto cuya inicialización se retrasa hasta que su estado sea observado o modificado. Algunos ejemplos de uso incluyen componentes de inyección de dependencias que proporcionan servicios perezosos completamente inicializados solo si es necesario, ORMs que proporcionan entidades perezosas que se hidratan desde la base de datos solo cuando se accede a ellas, o un analizador JSON que retrasa el análisis hasta que se accede a los elementos.





  Se admiten dos estrategias de objetos perezosos: los objetos fantasma (Ghost) y los proxys virtuales (Virtual Proxies), a continuación denominados "fantasmas perezosos" y "proxys perezosos". En ambas estrategias, el objeto perezoso se adjunta a un inicializador o a una fábrica que se llama automáticamente cuando su estado es observado o modificado por primera vez. Desde el punto de vista de la abstracción, los objetos perezosos son indiscernibles de los no perezosos: pueden ser utilizados sin saber que son perezosos, lo que permite pasarlos y utilizarlos en código que no es consciente de la pereza. Los proxys perezosos también son transparentes, pero hay que tener cuidado cuando se utiliza su identidad, ya que el proxy y su instancia real tienen identidades diferentes.




 **Nota**:
  **Información de versión**

   Los objetos perezosos fueron introducidos en PHP 8.4.






  ### Creación de objetos perezosos



   Es posible crear una instancia perezosa de cualquier clase definida por el usuario o de la clase [stdClass](#class.stdclass) (otras clases internas no son admitidas), o reinicializar una instancia de estas clases para que sea perezosa. Los puntos de entrada para crear un objeto perezoso son los métodos [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) y [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy).





   Ambos métodos aceptan una función que se llama cuando el objeto necesita inicialización. El comportamiento esperado de la función varía en función de la estrategia utilizada, como se describe en la documentación de referencia de cada método.





   **Ejemplo #1 Creación de un fantasma perezoso**



&lt;?php
class Example
{
    public function __construct(public int $prop)
    {
        echo __METHOD__, "\n";
    }
}

$reflector = new ReflectionClass(Example::class);
$lazyObject = $reflector-&gt;newLazyGhost(function (Example $object) {
    // Inicializa el objeto en el lugar
    $object-&gt;__construct(1);
});

var_dump($lazyObject);
var_dump(get_class($lazyObject));

// Desencadena la inicialización
var_dump($lazyObject-&gt;prop);
?&gt;


   El ejemplo anterior mostrará:




lazy ghost object(Example)#3 (0) {
["prop"]=&gt;
uninitialized(int)
}
string(7) "Example"
Example::__construct
int(1)





   **Ejemplo #2 Creación de un proxy perezoso**



&lt;?php
class Example
{
    public function __construct(public int $prop)
    {
        echo __METHOD__, "\n";
    }
}

$reflector = new ReflectionClass(Example::class);
$lazyObject = $reflector-&gt;newLazyProxy(function (Example $object) {
    // Crea y devuelve la instancia real
    return new Example(1);
});

var_dump($lazyObject);
var_dump(get_class($lazyObject));

// Desencadena la inicialización
var_dump($lazyObject-&gt;prop);
?&gt;


   El ejemplo anterior mostrará:




lazy proxy object(Example)#3 (0) {
  ["prop"]=&gt;
  uninitialized(int)
}
string(7) "Example"
Example::__construct
int(1)





   Cualquier acceso a las propiedades de un objeto perezoso desencadena su inicialización (incluyendo a través de [ReflectionProperty](#class.reflectionproperty)). Sin embargo, algunas propiedades pueden ser conocidas de antemano y no deberían desencadenar la inicialización cuando se accede a ellas:





   **Ejemplo #3 Inicialización de las propiedades de manera impaciente**



&lt;?php
class BlogPost
{
    public function __construct(
       public int $id,
       public string $title,
       public string $content,
    ) { }
}

$reflector = new ReflectionClass(BlogPost::class);

$post = $reflector-&gt;newLazyGhost(function ($post) {
    $data = fetch_from_store($post-&gt;id);
    $post-&gt;__construct($data['id'], $data['title'], $data['content']);
});

// Sin esta línea, la siguiente llamada a ReflectionProperty::setValue() desencadenaría la inicialización.
$reflector-&gt;getProperty('id')-&gt;skipLazyInitialization($post);
$reflector-&gt;getProperty('id')-&gt;setValue($post, 123);

// Asimismo, se puede utilizar esto directamente:
$reflector-&gt;getProperty('id')-&gt;setRawValueWithoutLazyInitialization($post, 123);

// El identificador puede ser accedido sin desencadenar la inicialización
var_dump($post-&gt;id);
?&gt;





   Los métodos [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) y [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization) ofrecen formas de evitar la inicialización perezosa al acceder a una propiedad.






  ### Acerca de las estrategias de objetos perezosos



   Los *fantasmas perezosos* son objetos que se inicializan en el lugar y, una vez inicializados, son indiscernibles de un objeto que nunca fue perezoso. Esta estrategia es adecuada cuando se controla tanto la instanciación como la inicialización del objeto y es inadecuada si alguna de estas operaciones es gestionada por otra parte.





   Los *proxys perezosos*, una vez inicializados, actúan como proxys hacia una instancia real: cualquier operación en un proxy perezoso inicializado es transmitida a la instancia real. La creación de la instancia real puede ser delegada a otra parte, lo que hace que esta estrategia sea útil en los casos en que los fantasmas perezosos son inadecuados. Aunque los proxys perezosos son casi tan transparentes como los fantasmas perezosos, hay que tener cuidado cuando se utiliza su identidad, ya que el proxy y su instancia real tienen identidades distintas.






  ### Ciclo de vida de los objetos perezosos



   Los objetos pueden ser hechos perezosos durante la instanciación utilizando [ReflectionClass::newLazyGhost()](#reflectionclass.newlazyghost) o [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy), o después de la instanciación utilizando [ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost) o [ReflectionClass::resetAsLazyProxy()](#reflectionclass.resetaslazyproxy). Luego, un objeto perezoso puede ser inicializado por una de las siguientes operaciones:





   -
    Interactuar con el objeto de una manera que desencadene la inicialización automática. Ver [desencadenantes de inicialización](#language.oop5.lazy-objects.initialization-triggers).


   -
    Marcar todas sus propiedades como no perezosas utilizando [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) o [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization).


   -
    Llamar explícitamente a [ReflectionClass::initializeLazyObject()](#reflectionclass.initializelazyobject) o [ReflectionClass::markLazyObjectAsInitialized()](#reflectionclass.marklazyobjectasinitialized).





   Como los objetos perezosos se inicializan cuando todas sus propiedades son marcadas como no perezosas, los métodos anteriores no marcarán un objeto como perezoso si ninguna propiedad puede ser marcada como perezosa.






  ### Desencadenantes de inicialización



   Los objetos perezosos están diseñados para ser completamente transparentes para sus consumidores, de modo que las operaciones normales que observan o modifican el estado del objeto desencadenarán automáticamente la inicialización antes de que se realice la operación. Esto incluye, pero no se limita a, las siguientes operaciones:





   -
    Leer o escribir una propiedad


   -
    Probar si una propiedad está definida o definirla.


   -
    Acceder o modificar una propiedad a través de [ReflectionProperty::getValue()](#reflectionproperty.getvalue), [ReflectionProperty::getRawValue()](#reflectionproperty.getrawvalue), [ReflectionProperty::setValue()](#reflectionproperty.setvalue), o [ReflectionProperty::setRawValue()](#reflectionproperty.setrawvalue).


   -
    Listar las propiedades con **ReflectionObject::getProperties()**, **ReflectionObject::getProperty()**, [get_object_vars()](#function.get-object-vars).


   -
    Iterar sobre las propiedades de un objeto que no implementa [Iterator](#class.iterator) o [IteratorAggregate](#class.iteratoraggregate) utilizando [foreach](#control-structures.foreach).


   -
    Serializar el objeto con [serialize()](#function.serialize), [json_encode()](#function.json-encode), etc.


   -
    [Clonar](#language.oop5.lazy-objects.cloning) el objeto.





   Las llamadas a métodos que no acceden al estado del objeto no desencadenarán la inicialización. Asimismo, las interacciones con el objeto que invocan métodos mágicos o funciones de gancho no desencadenarán la inicialización si estos métodos o funciones no acceden al estado del objeto.





   #### Operaciones no desencadenantes



    Las siguientes operaciones o métodos específicos permiten acceder o modificar objetos perezosos sin desencadenar la inicialización:





    -
     Marcar las propiedades como no perezosas con [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) o [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization).


    -
     Recuperar la representación interna de las propiedades utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) o [convirtiendo el objeto en un array](#language.types.array.casting).


    -
     Utilizando [serialize()](#function.serialize) cuando **[ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE](#reflectionclass.constants.skip-initialization-on-serialize)** está definido, a menos que [__serialize()](#object.serialize) o [__sleep()](#object.sleep) desencadenen la inicialización.


    -
     Llamar a **ReflectionObject::__toString()**.


    -
     Utilizar [var_dump()](#function.var-dump) o [debug_zval_dump()](#function.debug-zval-dump), a menos que [__debugInfo()](#object.debuginfo) desencadene la inicialización







  ### Secuencia de inicialización



   Esta sección describe la secuencia de operaciones realizadas cuando se desencadena una inicialización, en función de la estrategia utilizada.





   #### Objetos fantasma


    -
     El objeto es marcado como no perezoso.


    -
     Las propiedades no inicializadas con [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) o [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization) se establecen en sus valores por defecto, si corresponde. En este punto, el objeto se asemeja a un objeto creado con [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor), excepto por las propiedades ya inicializadas.


    -
     La función de inicialización es llamada luego con el objeto como primer parámetro. La función debe, pero no está obligada, inicializar el estado del objeto, y debe devolver **[null](#constant.null)** o ningún valor. El objeto ya no es perezoso en este punto, por lo que la función puede acceder directamente a sus propiedades.




    Después de la inicialización, el objeto es indiscernible de un objeto que nunca fue perezoso.






   #### Objetos proxy


    -
     El objeto es marcado como no perezoso.


    -
     A diferencia de los objetos fantasma, las propiedades del objeto no se modifican en esta etapa.


    -
     La función fabrica es llamada con el objeto como primer parámetro y debe devolver una instancia no perezosa de una clase compatible (ver [ReflectionClass::newLazyProxy()](#reflectionclass.newlazyproxy)).


    -
     La instancia devuelta es llamada *instancia real* y se adjunta al proxy.


    -
     Los valores de las propiedades del proxy son descartados como si [unset()](#function.unset) es llamado.




    Después de la inicialización, el acceso a cualquier propiedad en el proxy dará el mismo resultado que el acceso a la propiedad correspondiente en la instancia real; todos los accesos a las propiedades en el proxy son transmitidos a la instancia real, incluyendo las propiedades declaradas, dinámicas, inexistentes, o las propiedades marcadas con [ReflectionProperty::skipLazyInitialization()](#reflectionproperty.skiplazyinitialization) o [ReflectionProperty::setRawValueWithoutLazyInitialization()](#reflectionproperty.setrawvaluewithoutlazyinitialization).




    El objeto proxy en sí mismo *no* es reemplazado o sustituido por la instancia real.




    Aunque la fabrica recibe el proxy como primer parámetro, no se espera que lo modifique (las modificaciones están permitidas pero serán perdidas en la etapa final de inicialización). Sin embargo, el proxy puede ser utilizado para decisiones basadas en los valores de las propiedades inicializadas, la clase, el objeto mismo, o su identidad. Por ejemplo, el inicializador podría utilizar el valor de una propiedad inicializada durante la creación de la instancia real.






   #### Comportamiento común



    El alcance y el contexto $this de la función de inicialización o de la fabrica permanecen sin cambios, y se aplican las restricciones de visibilidad habituales.





    Después de una inicialización exitosa, la función de inicialización o la fabrica ya no es referenciada por el objeto y puede ser liberada si no tiene otras referencias.





    Si la inicialización lanza una excepción, el estado del objeto se restaura a su estado pre-inicialización y el objeto es marcado nuevamente como perezoso. En otras palabras, todos los efectos en el objeto mismo son anulados. Otros efectos secundarios, como los efectos en otros objetos, no son anulados. Esto evita la exposición de una instancia parcialmente inicializada en caso de fallo.







  ### Clonación



   [Clonar](#language.oop5.cloning) un objeto perezoso desencadena su inicialización antes de que el clon sea creado, resultando en un objeto inicializado.





   Para los objetos proxy, el proxy y su instancia real son clonados, y el clon del proxy es devuelto. La método [__clone](#object.clone) es llamada en la instancia real, no en el proxy. El proxy clonado y la instancia real clonada están enlazados como lo están durante la inicialización, por lo que los accesos al clon del proxy son transmitidos al clon de la instancia real.





   Este comportamiento garantiza que el clon y el objeto original mantengan estados separados. Las modificaciones realizadas en el objeto original o en el estado de su inicializador después de la clonación no afectan al clon. Clonar tanto el proxy como su instancia real, en lugar de devolver un clon de la instancia real solamente, garantiza que la operación de clonación devuelva sistemáticamente un objeto de la misma clase.






  ### Destructores



   Para los objetos perezosos, el destructor solo es llamado si el objeto ha sido inicializado. Para los proxys, el destructor solo es llamado en la instancia real, si existe.





   Los métodos [ReflectionClass::resetAsLazyGhost()](#reflectionclass.resetaslazyghost) y [ReflectionClass::resetAsLazyProxy()](#reflectionclass.resetaslazyproxy) pueden invocar el destructor del objeto reinicializado.












 ## Modificaciones en POO (Programación orientada a objetos)


  Los cambios del modelo de objetos de PHP se recogen aquí. Más información
  y otras notas pueden encontrarse en la documentación sobre POO en PHP.










      Versión
      Descripción






      8.4.0

       Adición: Soporte para los [hooks de propiedad](#language.oop5.property-hooks).




      8.4.0

       Adición: Soporte de los [objetos perezosos](#language.oop5.lazy-objects).




      8.1.0

       Adición: Soporte para el modificador final para las constantes de clase.
       Además, las constantes de interfaces pueden ser redefinidas por omisión.




      8.0.0

       Adición: Soporte del operador [nullsafe](#language.oop5.basic.nullsafe) *?-&gt;*
       para acceder a las propiedades y métodos sobre objetos que pueden ser null.




      7.4.0

       Cambio: Es ahora posible lanzar excepciones dentro de **__toString()**.




      7.4.0

       Adición: Soporte limitado para la covarianza del tipo de retorno y
       contravarianza para el tipo de argumento. Soporte completo de varianza está
       únicamente disponible si el autocargado es utilizado. Dentro
       de un fichero único solo las referencias no-cíclicas de tipo son
       posibles.




      7.4.0

       Adición: Es ahora posible tipar las propiedades de clase.




      7.3.0

       Incompatibilidad: El desempaquetado de argumento de
       [Traversable](#class.traversable)s con claves no-[int](#language.types.integer)es ya no es soportado. Este comportamiento no estaba previsto y por consiguiente
       fue eliminado.




      7.3.0

       Incompatibilidad: En versiones anteriores era posible separar las propiedades estáticas asignando una referencia.
       Esto ha sido eliminado.




      7.3.0

       Cambio: El operador [
       instanceof](#language.operators.type) permite ahora literales como primer
       operando, en este caso el resultado es siempre **[false](#constant.false)**.




      7.2.0

       Obsoleto: El método [__autoload()](#function.autoload) ha sido declarado
       obsoleto en favor de [spl_autoload_register()](#function.spl-autoload-register).




      7.2.0

       Cambio: El siguiente nombre no puede ser utilizado para nombrar
       clases, interfaces o traits: object.




      7.2.0

       Cambio: Una coma colgante puede ahora ser añadida a la
       sintaxis use agrupada para los espacios de nombres.




      7.2.0

       Cambio: Ampliación del tipo de los parámetros. El tipo de los
       parámetros de los métodos reescritos y de implementación de interfaz
       puede ahora ser omitido.




      7.2.0

       Cambio: Los métodos abstractos pueden ahora ser reescritos cuando una clase abstracta extiende otra clase abstracta.




      7.1.0

       Cambio: Los siguientes nombres no pueden ser utilizados para nombrar
       clases, interfaces o traits: void
       y iterable.




      7.1.0

       Adición: Es ahora posible definir la
       [visibilidad de las
        constantes de clase](#language.oop5.visiblity-constants).




      7.0.0

       Obsoleto: Llamada [estática](#language.oop5.static)
       a métodos que no están declarados como estáticos.




      7.0.0

       Obsoleto: [Constructor](#language.oop5.decon)
       estilo PHP 4. Es decir, los métodos que tienen el mismo nombre que la clase
       en la que están definidos.




      7.0.0

       Adición: Declaración *use* agrupada: las clases,
       funciones y constantes que son importadas desde un mismo espacio de nombres
       pueden ahora ser agrupadas juntas en una sola declaración use.




      7.0.0

       Adición: Soporte para las
       [clases anónimas](#language.oop5.anonymous)
       ha sido añadido gracias a new class.




      7.0.0

       Incompatibilidad: Iterar sobre un [object](#language.types.object) no-
       [Traversable](#class.traversable) tendrá ahora el mismo comportamiento
       que iterar sobre los [array](#language.types.array)s por referencia.




      7.0.0

       Cambio: La definición de propiedades (compatibles) en dos
       [traits](#language.oop5.traits)
       utilizados ya no provoca un error.




      5.6.0

       Adición: El método [__debugInfo()](#object.debuginfo).




      5.5.0

       Adición: La constante mágica [::class](#language.oop5.basic.class.class).




      5.5.0

       Adición: [finally](#language.exceptions) para manejar
       las excepciones.




      5.4.0

       Adición: [traits](#language.oop5.traits).




      5.4.0

       Cambio: Si una clase
       [abstracta](#language.oop5.abstract) define
       una firma para el [constructor
       ](#language.oop5.decon), esta será ahora aplicada.




      5.3.3

       Cambio: Los métodos con el mismo nombre que el último elemento en un
       [espacio de nombres](#language.namespaces)
       ya no son considerados como un [constructor](#language.oop5.decon). Este cambio
       no afecta a las clases sin espacio de nombres.




      5.3.0

       Cambio: Las clases que implementan una interfaz con métodos que tienen valores por omisión definidos en sus prototipos ya no están obligadas a respetar los valores por omisión definidos en la interfaz.




      5.3.0

       Cambio: Es ahora posible referenciar una clase utilizando una variable (e.g. :
       echo $classname::constant;).
       El valor de la variable no puede ser una palabra clave (e.g. :
       self,
       parent o static).




      5.3.0

       Cambio: Un error de nivel **[E_WARNING](#constant.e-warning)** es emitido si los métodos mágicos de
       [sobrecarga](#language.oop5.overloading) son
       declarados como [estáticos](#language.oop5.static).
       La visibilidad pública también es requerida.




      5.3.0

       Cambio: Anteriormente a 5.3.0, las excepciones lanzadas en la función
       [__autoload()](#function.autoload) no podían ser tratadas en un bloque
       [catch](#language.exceptions) y resultaban en un error fatal. Ahora, las excepciones lanzadas en la función
       __autoload pueden ser capturadas en un bloque
       [catch](#language.exceptions) y tratadas.
       Si una excepción personalizada es lanzada, entonces su clase debe estar disponible. La función __autoload puede ser utilizada recursivamente para
       autocargar la clase de excepción personalizada.




      5.3.0

       Adición: El método [__callStatic](#language.oop5.overloading).




      5.3.0

       Adición: [heredoc](#language.types.string.syntax.heredoc)
       y [nowdoc](#language.types.string.syntax.nowdoc)
       son soportadas para definir las *constantes* de
       clases y las propiedades.
       Nota: Los valores heredoc deben seguir las mismas reglas que los
       [string](#language.types.string) rodeados de comillas dobles (e.g. sin variables dentro).




      5.3.0

       Adición: [Resolución
       Estática Tardía](#language.oop5.late-static-bindings).




      5.3.0

       Adición: El método [__invoke()](#object.invoke).




      5.2.0

       Cambio: El método [__toString()](#object.tostring)
       solo era llamado en llamadas a [echo](#function.echo) o
       [print](#function.print).
       Ahora, es llamado en cualquier contexto de [string](#language.types.string)
       (e.g. en [printf()](#function.printf) con el modificador
       %s) pero no en otros contextos (e.g. con
       el modificador %d).
       A partir de PHP 5.2.0, convertir un [object](#language.types.object) sin método
       [__toString](#object.tostring) en [string](#language.types.string)
       emite un error **[E_RECOVERABLE_ERROR](#constant.e-recoverable-error)**.




      5.1.3

       Cambio: En versiones anteriores de PHP 5, el uso de
       var era considerado obsoleto y emitía un error **[E_STRICT](#constant.e-strict)**. Ya no es el caso.




      5.1.0

       Cambio: El método estático
       [__set_state()](#object.set-state) es ahora
       llamado para las clases exportadas vía [var_export()](#function.var-export).




      5.1.0

       Adición: Métodos [__isset()](#object.isset)
       y [__unset()](#object.unset).


























 # Los espacios de nombres

## Tabla de contenidos
- [Introducción](#language.namespaces.rationale)
- [Definición de espacios de nombres](#language.namespaces.definition)
- [Subespacio de nombres](#language.namespaces.nested)
- [Definición de varios espacios de nombres en el mismo archivo](#language.namespaces.definitionmultiple)
- [Introducción](#language.namespaces.basics)
- [Espacios de nombres y lenguaje dinámico](#language.namespaces.dynamic)
- [Comando namespace y __NAMESPACE__](#language.namespaces.nsconstants)
- [Importación y alias](#language.namespaces.importing)
- [Global](#language.namespaces.global)
- [Retorno al espacio global](#language.namespaces.fallback)
- [Reglas de resolución de nombres](#language.namespaces.rules)
- [Preguntas frecuentes](#language.namespaces.faq)




  ## Introducción a los espacios de nombres


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   ¿Qué son los espacios de nombres? En su definición más amplia, representan
   un medio para encapsular elementos. Esto puede concebirse como un concepto
   abstracto, por varias razones. Por ejemplo, en un sistema de archivos, los
   directorios representan un grupo de archivos asociados y sirven como espacio de nombres
   para los archivos que contienen. Un ejemplo concreto es que el archivo
   foo.txt puede existir en ambos directorios
   /home/greg y /home/other, pero que
   las dos copias de foo.txt no pueden coexistir
   en el mismo directorio. Además, para acceder al archivo foo.txt
   desde fuera del directorio /home/greg, es necesario especificar
   el nombre del directorio utilizando un separador de directorios, como
   /home/greg/foo.txt. El mismo principio se aplica a los
   espacios de nombres en el mundo de la programación.





   En el mundo de PHP, los espacios de nombres están diseñados para resolver dos problemas
   que enfrentan los autores de bibliotecas y aplicaciones al reutilizar elementos
   como clases o bibliotecas de funciones:







    -

      Colisiones de nombres entre el código que se crea, las clases, funciones
      o constantes internas de PHP, o las de bibliotecas de terceros.



    -

      La capacidad de crear alias o acortar nombres como Nombres_Extremadamente_Largos
      para ayudar a resolver el primer problema y mejorar la legibilidad
      del código.






   Los espacios de nombres de PHP proporcionan un medio para agrupar clases, interfaces,
   funciones o constantes. Aquí hay un ejemplo de sintaxis de los espacios de nombres de PHP:




   **Ejemplo #1 Ejemplo de sintaxis de espacios de nombres**




   &lt;?php
namespace mon\nom; // Ver la sección "Definición de espacios de nombres"

class MaClasse {}
function mafonction() {}
const MACONSTANTE = 1;

$a = new MaClasse;
$c = new \mon\nom\MaClasse; // Ver la sección "Espacio global"

$a = strlen('bonjour'); // Ver "Uso de espacios de nombres: retorno al espacio global

$d = namespace\MACONSTANTE; // Ver "El operador namespace y la constante __NAMESPACE__

$d = __NAMESPACE__ . '\MACONSTANTE';
echo constant($d); // Ver "Espacios de nombres y características dinámicas"
?&gt;



   **Nota**:

     Los nombres de espacios de nombres no son sensibles a mayúsculas/minúsculas.




  **Nota**:



    Los espacios de nombres PHP, así como los nombres compuestos
    que comienzan con estos nombres (como PHP\Classes)
    están reservados para el uso interno del lenguaje y no deben usarse
    en el código del espacio de usuario.









  ## Definición de espacios de nombres

  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   Aunque el código PHP válido puede contenerse en un espacio de nombres,
   solo los siguientes tipos de código pueden verse afectados por los espacios de nombres:
   las clases (incluyendo las abstractas, los traits y los enums), las interfaces,
   las funciones y las constantes.




   Los espacios de nombres se declaran con la palabra clave namespace.
   Un archivo que contiene un espacio de nombres debe declarar el espacio al principio
   del archivo, antes de cualquier otro código, con una sola excepción: la palabra
   clave [declare](#control-structures.declare).



    **Ejemplo #1 Declaración de un espacio de nombres**



     &lt;?php
namespace MonProjet;

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */ }

?&gt;



   **Nota**:

     Los nombres completamente calificados (es decir, los nombres que comienzan con un antislash)
     no están autorizados en las declaraciones de espacios de nombres, ya que tales
     construcciones se interpretan como expresiones de espacio de nombres relativo.




   El único elemento autorizado antes de la declaración de espacio de nombres es la instrucción
   declare, para definir la codificación del archivo fuente. Además,
   ningún código no-PHP puede preceder a la declaración de espacio de nombres, incluyendo
   espacios:

    **Ejemplo #2 Error de declaración de un espacio de nombres**



     &lt;html&gt;
&lt;?php
namespace MonProjet; // error fatal: el espacio de nombres debe ser el primer elemento del script
?&gt;





   Además, a diferencia de otras estructuras de PHP, el mismo espacio de nombres puede
   definirse en varios archivos, lo que permite dividir el contenido de un
   espacio de nombres en varios archivos.







  ## Declaración de un subespacio de nombres


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   Al igual que con los archivos y los directorios, los espacios de nombres también
   son capaces de especificar una jerarquía de espacios de nombres. Por lo tanto,
   un nombre de espacio de nombres puede definirse con sus subniveles:



    **Ejemplo #1 Declaración de un espacio de nombres con jerarquía**



     &lt;?php
namespace MonProjet\Sous\Niveau;

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }

?&gt;



   En el ejemplo anterior, se crean la constante MonProjet\Sous\Niveau\CONNEXION_OK,
   la clase MonProjet\Sous\Niveau\Connexion y la función
   MonProjet\Sous\Niveau\connecte.





  ## Definición de varios espacios de nombres en el mismo archivo


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   También pueden declararse varios espacios de nombres en el mismo archivo.
   Hay dos sintaxis autorizadas.







    **Ejemplo #1 Declaración de varios espacios de nombres, sintaxis de combinación simple**



     &lt;?php
namespace MonProjet;

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }

namespace AutreProjet;

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }
?&gt;





   Esta sintaxis no se recomienda para combinar espacios de nombres
   en un solo archivo. En su lugar, se recomienda utilizar
   la sintaxis de llaves.







    **Ejemplo #2 Declaración de varios espacios de nombres, sintaxis de llaves**



     &lt;?php
namespace MonProjet {

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }
}

namespace AutreProjet {

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }
}
?&gt;





   Se recomienda encarecidamente, como práctica de codificación, no mezclar
   varios espacios de nombres en el mismo archivo. El uso recomendado es combinar
   varios scripts PHP en el mismo archivo.




   Para combinar varios códigos sin espacios de nombres en código con espacio de nombres,
   solo se admite la sintaxis de llaves. El código global debe estar encerrado por un
   espacio de nombres sin nombre, como este:



    **Ejemplo #3 Declaración de varios espacios de nombres con un espacio sin nombre**



     &lt;?php
namespace MonProjet {

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }
}

namespace { // código global
session_start();
$a = MonProjet\connecte();
echo MonProjet\Connexion::start();
}
?&gt;





   No puede existir ningún código PHP fuera de las llaves del espacio de nombres,
   excepto para abrir una nueva instrucción declare.



    **Ejemplo #4 Declaración de varios espacios de nombres con un espacio sin nombre (2)**



     &lt;?php
declare(encoding='UTF-8');
namespace MonProjet {

const CONNEXION_OK = 1;
class Connexion { /* ... */ }
function connecte() { /* ... */  }
}

namespace { // código global
session_start();
$a = MonProjet\connecte();
echo MonProjet\Connexion::start();
}
?&gt;








  ## Uso de espacios de nombres: introducción


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   Antes de discutir el uso de espacios de nombres, es importante comprender
   cómo PHP deduce qué espacio de nombres está utilizando su código. Puede hacerse
   una analogía simple entre los espacios de nombres de PHP y un sistema de archivos.
   Hay tres formas de acceder a un archivo en un sistema de archivos:



    -

      Un nombre de archivo relativo, como foo.txt. Esto se resuelve
      en dossiercourant/foo.txt donde dossiercourant es el
      directorio de trabajo. Si el directorio actual es /home/foo,
      este nombre se resuelve en /home/foo/foo.txt.



    -

      Una ruta relativa, como sub-dossier/foo.txt. Esto se
      resuelve en dossiercourant/sub-dossier/foo.txt.



    -

      Una ruta absoluta, como /main/foo.txt. Esto se resuelve
      en /main/foo.txt.




   El mismo principio puede aplicarse a los espacios de nombres de PHP.
   Por ejemplo, puede hacer referencia a una clase de tres maneras:

    -

      Un nombre sin calificador, o una clase sin prefijo, como
      $a = new foo(); o
      foo::methodestatique();. Si el espacio de nombres actual
      es espacedenomscourant, esto se resuelve en
      espacedenomscourant\foo. Si el espacio de nombres es
      global, es decir, el espacio de nombres sin nombre, esto se convierte en foo.


      Una advertencia: los nombres sin calificador para funciones y constantes
      se tomarán del espacio de nombres global, si la función
      no está definida en el espacio de nombres actual. Ver
      [Uso de espacios de nombres:
      retorno al espacio de nombres global para funciones y constantes](#language.namespaces.fallback) para
      más detalles.



    -

      Un nombre calificado, o una clase con prefijo como
      $a = new sousespacedenoms\foo(); o
      sousespacedenoms\foo::methodestatique();. Si el espacio de nombres actual
      es espacedenomscourant, esto se convierte
      en espacedenomscourant\sousespacedenoms\foo. Si
      el código es global, es decir, el espacio de nombres sin nombre,
      esto se convierte en sousespacedenoms\foo.



    -

      Un nombre absoluto, o un nombre con prefijo con un operador global como
      $a = new \espacedenomscourant\foo(); o
      \espacedenomscourant\foo::methodestatique();. Esto siempre
      hace referencia al nombre literal especificado en el código: espacedenomscourant\foo.






   Aquí hay un ejemplo de las tres sintaxis, en código real:



    file1.php



     &lt;?php
namespace Foo\Bar\sousespacedenoms;

const FOO = 1;
function foo() {}
class foo
{
    static function methodestatique() {}
}
?&gt;


    file2.php



     &lt;?php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function methodestatique() {}
}

/* nombre no calificado */
foo(); // Se convierte en Foo\Bar\foo
foo::methodestatique(); // Se convierte en Foo\Bar\foo, método methodestatique
echo FOO; // Se convierte en la constante Foo\Bar\FOO

/* nombre calificado */
sousespacedenoms\foo(); // Se convierte en la función Foo\Bar\sousespacedenoms\foo
sousespacedenoms\foo::methodestatique(); // se convierte en la clase Foo\Bar\sousespacedenoms\foo,
                                  // método methodestatique
echo sousespacedenoms\FOO; // Se convierte en la constante Foo\Bar\sousespacedenoms\FOO

/* nombre absoluto */
\Foo\Bar\foo(); // Se convierte en la función Foo\Bar\foo
\Foo\Bar\foo::methodestatique(); // Se convierte en la clase Foo\Bar\foo, método methodestatique
echo \Foo\Bar\FOO; // Se convierte en la constante Foo\Bar\FOO
?&gt;





   Tenga en cuenta que para acceder a cualquier clase, función o constante
   global, puede utilizarse un nombre absoluto, como
   [\strlen()](#function.strlen) o [\Exception](#class.exception) o
   \**[INI_ALL](#constant.ini-all)**.



    **Ejemplo #1 Acceso a clases, funciones y constantes globales desde un espacio de nombres**



     &lt;?php
namespace Foo;

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi'); // llama a la función global strlen
$b = \INI_ALL; // acceso a una constante INI_ALL
$c = new \Exception('error'); // instancia la clase global Exception
?&gt;








  ## Espacios de nombres y lenguaje dinámico


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   La implementación de espacios de nombres de PHP está influenciada por su naturaleza
   dinámica como lenguaje de programación. Por lo tanto, para convertir código como el
   del siguiente ejemplo en un espacio de nombres:



    **Ejemplo #1 Acceso dinámico a elementos**


    example1.php:



     &lt;?php
class classname
{
    function __construct()
    {
        echo __METHOD__,"\n";
    }
}
function funcname()
{
    echo __FUNCTION__,"\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // muestra classname::__construct
$b = 'funcname';
$b(); // muestra funcname
echo constant('constname'), "\n"; // muestra global
?&gt;



   Es necesario utilizar un nombre absoluto (el nombre de la clase, con su prefijo de espacio de nombres).
   Tenga en cuenta que no hay diferencia entre un nombre absoluto y un nombre calificado
   en un nombre de clase, función o constante dinámica, lo que hace que el antislash
   inicial no sea necesario.

    **Ejemplo #2 Acceso dinámico a espacios de nombres**



     &lt;?php
namespace nomdelespacedenoms;
class classname
{
    function __construct()
    {
        echo __METHOD__,"\n";
    }
}
function funcname()
{
    echo __FUNCTION__,"\n";
}
const constname = "namespaced";

/* Tenga en cuenta que si utiliza comillas dobles, "\\nomdelespacedenoms\\classname" debe usarse */
$a = '\nomdelespacedenoms\classname';
$obj = new $a; // muestra nomdelespacedenoms\classname::__construct
$a = 'nomdelespacedenoms\classname';
$obj = new $a; // también muestra nomdelespacedenoms\classname::__construct
$b = 'nomdelespacedenoms\funcname';
$b(); // muestra nomdelespacedenoms\funcname
$b = '\nomdelespacedenoms\funcname';
$b(); // también muestra nomdelespacedenoms\funcname
echo constant('\nomdelespacedenoms\constname'), "\n"; // muestra namespaced
echo constant('nomdelespacedenoms\constname'), "\n"; // también muestra namespaced
?&gt;





   Se recomienda leer la [nota sobre la protección de espacios de nombres en cadenas](#language.namespaces.faq.quote).







  ## El comando namespace y la constante __NAMESPACE__


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   PHP admite dos medios para acceder de manera abstracta a los elementos
   en el espacio de nombres actual, a saber, la constante mágica
   **[__NAMESPACE__](#constant.namespace)** y el comando namespace.




   El valor de **[__NAMESPACE__](#constant.namespace)** es una cadena que contiene el nombre
   del espacio de nombres actual. En el espacio global, sin nombre, contiene
   una cadena vacía.



    **Ejemplo #1 Ejemplo con __NAMESPACE__, en un código con espacio de nombres**



     &lt;?php
namespace MonProjet;

echo '"', __NAMESPACE__, '"'; // muestra "MonProjet"
?&gt;




    **Ejemplo #2 Ejemplo con __NAMESPACE__, en un código con espacio de nombres global**



     &lt;?php

echo '"', __NAMESPACE__, '"'; // muestra ""
?&gt;



   La constante **[__NAMESPACE__](#constant.namespace)** es útil para construir
   dinámicamente nombres, como:

    **Ejemplo #3 Uso de __NAMESPACE__ para una construcción dinámica de nombres**



     &lt;?php
namespace MonProjet;

function get($classname)
{
    $a = __NAMESPACE__ . '\\' . $classname;
    return new $a;
}
?&gt;





   El comando namespace también puede usarse para
   solicitar explícitamente un elemento del espacio de nombres actual, o de un
   subespacio. Es el equivalente para los espacios de nombres del operador
   self de las clases.



    **Ejemplo #4 El operador namespace, en un espacio de nombres**



     &lt;?php
namespace MonProjet;

use blah\blah as mine; // Ver "Uso de espacios de nombres: alias e importación"

blah\mine(); // llama a la función MonProjet\blah\mine()
namespace\blah\mine(); // llama a la función MonProjet\blah\mine()

namespace\func(); // llama a la función MonProjet\func()
namespace\sub\func(); // llama a la función MonProjet\sub\func()
namespace\cname::method(); // llama al método estático "method" de la clase MonProjet\cname
$a = new namespace\sub\cname(); // instancia un objeto de la clase MonProjet\sub\cname
$b = namespace\CONSTANT; // asigna el valor de la constante MonProjet\CONSTANT a $b
?&gt;




    **Ejemplo #5 El operador namespace, en el espacio de nombres global**



     &lt;?php

namespace\func(); // llama a la función func()
namespace\sub\func(); // llama a la función sub\func()
namespace\cname::method(); // llama al método estático "method" de la clase cname
$a = new namespace\sub\cname(); // instancia un objeto de la clase sub\cname
$b = namespace\CONSTANT; // asigna el valor de la constante CONSTANT a $b
?&gt;








  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)


  ## Uso de espacios de nombres: importación y alias



   La capacidad de hacer referencia a un nombre absoluto con un alias o importando
   un espacio de nombres es estratégica. Es un beneficio similar a los enlaces
   simbólicos en un sistema de archivos.




   PHP puede crear alias(/importar) constantes, funciones, clases, interfaces,
   traits, enumeraciones y espacios de nombres.




   Un alias se crea con el operador use.
   Aquí hay un ejemplo que presenta los cinco tipos de importación:



    **Ejemplo #1 Importación y alias con el operador use**



     &lt;?php
namespace foo;
use My\Full\Classname as Another;

// Esto es lo mismo que use My\Full\NSname as NSname
use My\Full\NSname;

// importación de una clase global
use ArrayObject;

// importación de una función
use function My\Full\functionName;

// alias de una función
use function My\Full\functionName as func;

// importación de una constante
use const My\Full\CONSTANT;

$obj = new namespace\Another; // instancia un objeto de la clase foo\Another
$obj = new Another; // instancia un objeto de la clase My\Full\Classname
NSname\subns\func(); // llama a la función My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // instancia un objeto de la clase ArrayObject
// Sin la instrucción "use ArrayObject" habríamos instanciado un objeto de la clase foo\ArrayObject
func(); // Llama a la función My\Full\functionName
echo CONSTANT; // muestra el valor de My\Full\CONSTANT
?&gt;



   Tenga en cuenta que para los nombres con ruta (los nombres absolutos que contienen
   separadores de espacios, como Foo\Bar, en comparación con
   los nombres globales, como FooBar, que no los contienen),
   el antislash inicial no es necesario y no se recomienda, ya que los nombres importados
   deben ser absolutos y no se resuelven relativamente al espacio de nombres actual.


   Además, PHP admite atajos prácticos, como las instrucciones use múltiples.



    **Ejemplo #2 Importación y alias múltiples con el operador use**



     &lt;?php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instancia un objeto de la clase My\Full\Classname
NSname\subns\func(); // llama a la función My\Full\NSname\subns\func
?&gt;





   La importación se realiza durante la compilación, por lo que no afecta
   a las clases, funciones y constantes dinámicas.



    **Ejemplo #3 Importación y nombres de espacios dinámicos**



     &lt;?php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instancia un objeto de la clase My\Full\Classname
$a = 'Another';
$obj = new $a;      // instancia un objeto de la clase Another
?&gt;





   Además, la importación solo afecta a los nombres sin calificación. Los nombres
   absolutos siguen siendo absolutos y no se modifican por una importación.



    **Ejemplo #4 Importación y nombres de espacios absolutos**



     &lt;?php
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instancia un objeto de la clase My\Full\Classname
$obj = new \Another; // instancia un objeto de la clase Another
$obj = new Another\untruc; // instancia un objeto de la clase My\Full\Classname\untruc
$obj = new \Another\untruc; // instancia un objeto de la clase Another\untruc
?&gt;





   ### Reglas de contexto para la importación


    La palabra clave use debe declararse en el contexto más
    externo de un archivo (el contexto global) o en las declaraciones de espacio
    de nombres. Esto se debe a que la importación se realiza durante la compilación
    y no durante la ejecución, por lo que no se pueden apilar los contextos. El ejemplo
    siguiente muestra usos incorrectos de la palabra clave use:







     **Ejemplo #5 Reglas de importación incorrectas**



&lt;?php
namespace Languages;

function toGreenlandic
{
    use Languages\Danish;
    // ...
}
?&gt;




   **Nota**:



     Las reglas de importación se basan en archivos, lo que significa que los archivos
     incluidos no heredarán *PAS* las reglas de importación del archivo padre.






   ### Declaración del grupo use


    Las clases, funciones y constantes importadas desde
    el mismo [namespace](#language.namespaces.definition) pueden agruparse en una
    sola instrucción [use](#language.namespaces.importing).





&lt;?php

use some\namespace\ClassA;
use some\namespace\ClassB;
use some\namespace\ClassC as C;

use function some\namespace\fn_a;
use function some\namespace\fn_b;
use function some\namespace\fn_c;

use const some\namespace\ConstA;
use const some\namespace\ConstB;
use const some\namespace\ConstC;

// es equivalente a la siguiente declaración de grupo use
use some\namespace\{ClassA, ClassB, ClassC as C};
use function some\namespace\{fn_a, fn_b, fn_c};
use const some\namespace\{ConstA, ConstB, ConstC};









  ## Espacio de nombres global


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   Sin ninguna definición de espacio de nombres, todas las clases y las funciones
   se colocan en el espacio de nombres global: como en PHP antes de que los espacios
   de nombres fueran introducidos. Al prefijar un nombre con un antislash
   \, se puede solicitar el uso del espacio de nombres
   global, incluso en un contexto de espacio de nombres específico.



    **Ejemplo #1 Especificación de espacio de nombres global**



     &lt;?php
namespace A\B\C;

/* Esta función es A\B\C\fopen */
function fopen() {
     /* ... */
     $f = \fopen(...); // llamada a fopen global
     return $f;
}
?&gt;








  ## Uso de espacios de nombres: retorno al espacio global para funciones y constantes


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   En un espacio de nombres, cuando PHP encuentra un nombre sin calificación,
   ya sea una clase, una función o una constante, lo resuelve con diferentes
   prioridades. Los nombres de clases siempre se resuelven con el espacio de nombres actual.
   Para acceder a clases internas o a clases que no están en
   un espacio de nombres, es necesario representarlas con su nombre absoluto, como:



    **Ejemplo #1 Acceso a clases globales desde un espacio de nombres**



     &lt;?php
namespace A\B\C;
class Exception extends \Exception {}

$a = new Exception('hi'); // $a es un objeto de la clase A\B\C\Exception
$b = new \Exception('hi'); // $b es un objeto de la clase Exception

$c = new ArrayObject; // error fatal, clase A\B\C\ArrayObject no encontrada
?&gt;





   Para las funciones y constantes, PHP las buscará en el espacio
   global si no puede encontrarlas en el espacio de nombres actual.



    **Ejemplo #2 Acceso a funciones y constantes globales en un espacio de nombres**



     &lt;?php
namespace A\B\C;

const E_ERROR = 45;
function strlen($str)
{
    return \strlen($str) - 1;
}

echo E_ERROR, "\n"; // muestra "45"
echo INI_ALL, "\n"; // muestra "7": acceso al espacio de nombres global INI_ALL

echo strlen('hi'), "\n"; // muestra "1"
if (is_array('hi')) { // muestra "no es un array"
    echo "es un array\n";
} else {
    echo "no es un array\n";
}
?&gt;









  ## Reglas de resolución de nombres


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   En el contexto de las reglas de resolución, hay varias definiciones importantes:



    **Definiciones para espacios de nombres**

     nombre no calificado


       Esto es un identificador que no contiene un separador de espacio de nombres.
       Por ejemplo: Foo






     nombre calificado


       Esto es un identificador que contiene un separador de espacio de nombres.
       Por ejemplo: Foo\Bar






     Nombre absoluto


       Esto es un identificador que comienza con un separador de espacio de nombres.
       Por ejemplo: \Foo\Bar. El espacio de nombres Foo
       también es un nombre absoluto.






     Nombre Relativo


       Es un identificador que comienza con namespace, como
       namespace\Foo\Bar.








   Los nombres se resuelven siguiendo las siguientes reglas:



    -

      Los nombres absolutos siempre se traducen a nombres sin el separador de namespace.
      Por ejemplo, \A\B se traduce a A\B.



    -

      Todos los nombres que no son absolutos se traducen con
      namespace reemplazado por el namespace actual.
      Si el nombre aparece en el namespace global, el prefijo
      namespace\ se elimina. Por ejemplo namespace\A
      en el namespace X\Y se traduce a X\Y\A.
      El mismo nombre en el namespace global se traduce a A.



    -

      Para los nombres absolutos, el primer segmento se traduce
      de acuerdo con la clase/namespace de la tabla de importación.
      Por ejemplo, si el namespace A\B\C se importa como C, el nombre C\D\E se traduce a A\B\C\D\E.



    -

      Para los nombres absolutos, si ninguna regla de importación
      se aplica, el namespace actual se prefiere al nombre.
      Por ejemplo, el nombre C\D\E en el namespace A\B,
      se traduce a A\B\C\D\E.



    -

      Para los nombres absolutos, el nombre se traduce en relación con la tabla actual de importación para el tipo de símbolo respectivo.
      Esto significa que un nombre que se asemeja a una clase se traduce de acuerdo con la tabla de importación de
      class/namespace, los nombres de funciones utilizando la
      tabla de importación de funciones, y las constantes utilizando la tabla de importación de constantes.
      Por ejemplo, después
      use A\B\C; un uso como new C() corresponde al nombre
      A\B\C(). De manera similar, después de use function A\B\foo; un uso
      como foo() corresponde al nombre A\B\foo.



    -

      Para los nombres relativos, si ninguna regla se aplica, y el nombre
      hace referencia a una clase, el namespace actual sirve como prefijo.
      Por ejemplo new C() en el namespace
      A\B corresponde al nombre A\B\C.



    -

      Para los nombres relativos, si ninguna regla se aplica, y el nombre
      hace referencia a una función o constante, y el código está
      fuera del namespace global, el nombre se resuelve durante la ejecución.
      Supongamos que el código está en el namespace
      A\B, aquí es cómo se resuelve una llamada a la función foo():


     <ol type="1">
      <li class="listitem">

        Busca una función en el espacio de nombres actual:
        A\B\foo().



      -

        Intenta encontrar y llamar a la función *global*
        foo().




    </li>
   </ol>


   **Ejemplo #1 Ejemplos de resolución de espacios de nombres**



&lt;?php
namespace A;
use B\D, C\E as F;

// llamadas de funciones

foo();      // intenta llamar a la función "foo" en el espacio de nombres "A"
            // luego llama a la función global "foo"

\foo();     // llama a la función "foo" definida en el espacio de nombres global

my\foo();   // llama a la función "foo" definida en el espacio de nombres "A\my"

F();        // intenta llamar a la función "F" definida en el espacio "A"
            // luego intenta llamar a la función global "F"

// referencias de clases

new B();    // crea un objeto de la clase "B" definida en el espacio de nombres  "A"
            // si no se encuentra, intenta el autocargado en la clase "A\B"

new D();    // crea un objeto de la clase "D" definida en el espacio de nombres  "B"
            // si no se encuentra, intenta el autocargado en la clase "B\D"

new F();    // crea un objeto de la clase "E" definida en el espacio de nombres  "C"
            // si no se encuentra, intenta el autocargado en la clase "C\E"

new \B();   // crea un objeto de la clase "B" definida en el espacio de nombres global
            // si no se encuentra, intenta el autocargado en la clase "B"

new \D();   // crea un objeto de la clase "D" definida en el espacio de nombres global
            // si no se encuentra, intenta el autocargado en la clase "D"

new \F();   // crea un objeto de la clase "F" definida en el espacio de nombres global
            // si no se encuentra, intenta el autocargado en la clase "F"

// métodos estáticos y funciones de espacio de nombres de otro espacio

B\foo();    // llama a la función "foo" del espacio de nombres "A\B"

B::foo();   // llama al método "foo" de la clase "B" definida en el espacio de nombres  "A"
            // si la clase "A\B" no se encuentra, intenta el autocargado en la clase "A\B"

D::foo();   // llama al método "foo" de la clase "D" definida en el espacio de nombres  "B"
            // si la clase "B\D" no se encuentra, intenta el autocargado en la clase "B\D"

\B\foo();   // llama a la función "foo" del espacio de nombres "B"

\B::foo();  // llama al método "foo" de la clase "B" ubicada en el espacio de nombres global
            // si la clase "B" no se encuentra, intenta el autocargado en la clase "B"

// métodos estáticos y funciones de espacio de nombres del espacio actual

A\B::foo();   // llama al método "foo" de la clase "B" del espacio de nombres "A\A"
              // si la clase "A\A\B" no se encuentra, intenta el autocargado en la clase "A\A\B"

\A\B::foo();  // llama al método "foo" de la clase "B" del espacio de nombres "A"
              // si la clase "A\B" no se encuentra, intenta el autocargado en la clase "A\B"
?&gt;







  ## Preguntas frecuentes: lo que debe saber sobre espacios de nombres


  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)



   Esta FAQ se divide en dos secciones: las preguntas comunes,
   y los puntos particulares de la implementación, que pueden ser
   útiles para la comprensión global.




   Primero, las preguntas comunes.



    -

      [Si no utilizo espacios
      de nombres, ¿debo preocuparme por ellos?](#language.namespaces.faq.shouldicare)



    -

      [¿Cómo utilizar una clase
      global o interna desde un espacio de nombres?](#language.namespaces.faq.globalclass)



    -

      [¿Cómo utilizar las clases
      de espacios de nombres, las funciones o las constantes en su propio espacio?](#language.namespaces.faq.innamespace)



    -

      [
       ¿Cómo se resuelve un nombre como \mon\nom o
       \nom?
      ](#language.namespaces.faq.full)



    -

      [¿Cómo se resuelve un nombre
      como mon\nom?](#language.namespaces.faq.qualified)



    -

      [¿Cómo se resuelve un nombre de clase
      sin calificación, como nom?](#language.namespaces.faq.shortname1)



    -

      [¿Cómo se resuelve una función sin
      calificación o una constante de nombre nom?](#language.namespaces.faq.shortname2)






   Aquí están los puntos particulares de la implementación, que pueden ser
   útiles para la comprensión global.



    -

      [Los nombres importados no deben
      entrar en conflicto con las clases definidas en el mismo archivo](#language.namespaces.faq.conflict)



    -

      [Los espacios de nombres anidados
      están prohibidos](#language.namespaces.faq.nested)



    -

      [Los nombres de espacios de nombres
      dinámicos deben proteger el antislash](#language.namespaces.faq.quote)



    -

      [Las constantes no definidas
      referenciadas con un antislash producen un error fatal](#language.namespaces.faq.constants)



    -

      [Imposible reemplazar
      constantes especiales como **<a href="#constant.null">null](#language.namespaces.faq.builtinconst)**, **[true](#constant.true)** o **[false](#constant.false)**</a>






   ### Si no utilizo espacios de nombres, ¿debo preocuparme por ellos?


    No, los espacios de nombres no afectan el código existente, de una
    manera u otra, ni el código que se producirá y que no utiliza
    espacios de nombres. Puede escribir esto si lo desea:







     **Ejemplo #1 Acceso a una clase global desde fuera de un espacio de nombres**



&lt;?php
$a = new \stdClass;
?&gt;





    Es una funcionalidad equivalente a:







     **Ejemplo #2 Acceder a clases globales fuera de un espacio de nombres**



&lt;?php
$a = new stdClass;
?&gt;






   ### ¿Cómo utilizar una clase global o interna desde un espacio de nombres?





     **Ejemplo #3 Acceso a clases internas desde un espacio de nombres**



&lt;?php
namespace foo;
$a = new \stdClass;

function test(\ArrayObject $parameter_type_example = null) {}

$a = \DirectoryIterator::CURRENT_AS_FILEINFO;

// extensión de una clase interna o global
class MyException extends \Exception {}
?&gt;






   ###
    ¿Cómo utilizar las clases de espacios de nombres, las funciones o
    las constantes en su propio espacio?






     **Ejemplo #4 Acceso a clases, funciones y constantes internas en un espacio de nombres**



&lt;?php
namespace foo;

class MaClasse {}

// uso de una clase en el espacio de nombres actual, como tipo de parámetro
function test(MaClasse $parameter_type_example = null) {}

// otra manera de usar una clase en el espacio de nombres actual como tipo de parámetro
function test(\foo\MaClasse $parameter_type_example = null) {}

// extensión de una clase en el espacio de nombres actual
class Extended extends MaClasse {}

// acceso a una función global
$a = \globalfunc();

// acceso a una constante global
$b = \INI_ALL;
?&gt;






   ###
     ¿Cómo se resuelve un nombre como \mon\nom o
       \nom?



    Los nombres que comienzan con \ siempre se resuelven como son,
    por lo que \mon\nom es en realidad
    mon\nom, y \Exception es
    Exception.



     **Ejemplo #5 Nombres de espacios absolutos**



&lt;?php
namespace foo;
$a = new \mon\nom(); // instancia la clase "mon\nom"
echo \strlen('hi'); // llama a la función "strlen"
$a = \INI_ALL; // $a recibe el valor de la constante "INI_ALL"
?&gt;






   ### ¿Cómo se resuelve un nombre como mon\nom?


    Los nombres que contienen un antislash pero no comienzan con un
    antislash, como mon\nom pueden resolverse de dos maneras
    diferentes.




    Si ha habido una instrucción de importación que hace un alias de
    mon, entonces el alias importado se aplica en lugar
    de mon, y el espacio de nombres se convierte en mon\nom.




    De lo contrario, el espacio de nombres actual se agrega antes del camino de la clase
    mon\nom.







     **Ejemplo #6 Nombres calificados**



&lt;?php
namespace foo;
use blah\blah as foo;

$a = new mon\nom(); // instancia la clase "foo\mon\nom"
foo\bar::name(); // llama al método estático "name" en la clase "blah\blah\bar"
mon\bar(); // llama a la función "foo\mon\bar"
$a = mon\BAR; // asigna a $a el valor de la constante "foo\mon\BAR"
?&gt;






   ### ¿Cómo se resuelve un nombre de clase
    sin calificación, como nom?


    Los nombres de clases que no contienen antislash como
    nom pueden resolverse de dos maneras diferentes.




    Si hay una instrucción de importación que define un alias para nom,
    entonces se aplica el alias.




    De lo contrario, se utiliza el espacio de nombres actual y se prefiere a
    nom.







     **Ejemplo #7 Clases sin calificación**



&lt;?php
namespace foo;
use blah\blah as foo;

$a = new nom(); // instancia la clase "foo\nom"
foo::nom(); // llama al método estático "nom" en la clase "blah\blah"
?&gt;






   ###
    ¿Cómo se resuelve una función sin calificación o una constante
    de nombre nom?



    Las funciones y constantes que no tienen antislash en su nombre
    como nom se resuelven de dos maneras diferentes:




    Primero, se prefiere el espacio de nombres actual a nom.




    Luego, si la constante o función nom no existe
    en el espacio de nombres actual, se utiliza la versión global de la constante o la
    función nom.







     **Ejemplo #8 Funciones y constantes sin espacio de nombres**



&lt;?php
namespace foo;
use blah\blah as foo;

const FOO = 1;

function mon() {}
function foo() {}
function sort(&amp;$a)
{
    \sort($a); // Llamada a la función global "sort"
    $a = array_flip($a);
    return $a;
}

mon(); // llama "foo\mon"
$a = strlen('hi'); // llama a la función global "strlen" ya que "foo\strlen" no existe
$arr = array(1,3,2);
$b = sort($arr); // llama a la función "foo\sort"
$c = foo(); // llama a la función "foo\foo": la importación no se aplica

$a = FOO; // asigna a $a el valor de la constante "foo\FOO": la importación no se aplica
$b = INI_ALL; // asigna a $b el valor de la constante "INI_ALL"
?&gt;






   ### Los nombres importados no deben
    entrar en conflicto con las clases definidas en el mismo archivo


    La siguiente combinación de scripts es válida:



     file1.php



     &lt;?php
namespace mes\trucs;
class MaClasse {}
?&gt;


     another.php



     &lt;?php
namespace another;
class untruc {}
?&gt;


     file2.php



     &lt;?php
namespace mes\trucs;
include 'file1.php';
include 'another.php';

use another\untruc as MaClasse;
$a = new MaClasse; // instancia la clase "untruc" del espacio de nombres another
?&gt;





    No hay conflicto de nombres, incluso si la clase MaClasse existe
    en el espacio de nombres mes\trucs, ya que la definición de
    MaClasse está en un archivo separado. Sin embargo, el siguiente
    ejemplo produce un error fatal debido a un conflicto de nombres, ya que
    MaClasse se define en el mismo archivo que la instrucción
    use.




     &lt;?php
namespace mes\trucs;
use another\untruc as MaClasse;
class MaClasse {} // error fatal: MaClasse está en conflicto con la instrucción de importación
$a = new MaClasse;
?&gt;






   ### Los espacios de nombres anidados están prohibidos


    PHP no permite anidar espacios de nombres.




     &lt;?php
namespace mes\trucs {
    namespace nested {
        class foo {}
    }
}
?&gt;



    Sin embargo, es fácil simular espacios de nombres anidados,
    como esto:


     &lt;?php
namespace mes\trucs\nested {
    class foo {}
}
?&gt;







   ### Los nombres de espacios de nombres dinámicos deben proteger el antislash


    Es muy importante darse cuenta de que, como los antislash se utilizan como
    caracteres de escape en las cadenas, siempre deben duplicarse
    para poder usarlos en una cadena. De lo contrario, existe el riesgo de uso
    inesperado:



     **Ejemplo #9 Peligros de usar espacios de nombres en una cadena**



      &lt;?php
$a = "dangereux\nom"; // \n es una nueva línea en una cadena!
$obj = new $a;

$a = 'pas\vraiment\dangereux'; // ningún problema aquí
$obj = new $a;
?&gt;



    En una cadena de comillas dobles, la secuencia de escape es mucho más
    segura de usar, pero aún se recomienda proteger siempre los antislashs en una cadena que contiene un espacio de nombres.



   ### Constantes no definidas referenciadas con un antislash producen un error fatal


    Cualquier constante no definida que no tenga calificador como
    FOO producirá una advertencia: PHP asumía que
    FOO era el valor de la constante. Cualquier constante,
    calificada parcialmente o totalmente, que contenga un antislash, producirá
    un error fatal si no está definida.



     **Ejemplo #10 Constantes no definidas**



      &lt;?php
namespace bar;
$a = FOO; // produce una advertencia: constante no definida "FOO", que toma el valor de "FOO";
$a = \FOO; // error fatal, constante de espacio de nombres no definida FOO
$a = Bar\FOO; // error fatal, constante de espacio de nombres no definida bar\Bar\FOO
$a = \Bar\FOO; // error fatal, constante de espacio de nombres no definida Bar\FOO
?&gt;






   ### Imposible reemplazar constantes especiales como **[null](#constant.null)**, **[true](#constant.true)** o **[false](#constant.false)**


    Cualquier intento en un espacio de nombres de reemplazar las constantes
    nativas o especiales, produce un error fatal.



     **Ejemplo #11 Constantes que no pueden ser redefinidas**



      &lt;?php
namespace bar;
const NULL = 0; // error fatal;
const true = 'stupid'; // aún otro error fatal;
// etc.
?&gt;



















  # Enumeraciones

## Tabla de contenidos
- [Visión general de las enumeraciones](#language.enumerations.overview)
- [Enumeraciones básicas](#language.enumerations.basics)
- [Enumeraciones respaldadas](#language.enumerations.backed)
- [Métodos de enumeración](#language.enumerations.methods)
- [Métodos estáticos de enumeración](#language.enumerations.static-methods)
- [Constantes de enumeración](#language.enumerations.constants)
- [Traits](#language.enumerations.traits)
- [Valores de enumeración en expresiones constantes](#language.enumerations.expressions)
- [Diferencias con los objetos](#language.enumerations.object-differences)
- [Listado de valores](#language.enumerations.listing)
- [Serialización](#language.enumerations.serialization)
- [Por qué las enumeraciones no son extensibles](#language.enumerations.object-differences.inheritance)
- [Ejemplos](#language.enumerations.examples)



   ## Visión general de las enumeraciones

   (PHP 8 &gt;= 8.1.0)




    Las enumeraciones, o "Enums", permiten a un desarrollador definir un tipo personalizado que se limita a uno
    de un número discreto de valores posibles. Esto puede ser especialmente útil al definir un
    modelo de dominio, ya que permite "hacer que los estados no válidos sean irrepresentables".





    Las enumeraciones aparecen en muchos lenguajes con una variedad de características diferentes. En PHP,
    las enumeraciones son un tipo especial de objeto. La enumeración en sí es una clase, y sus posibles
    casos son todos objetos de instancia única de esa clase. Eso significa que los casos de enumeración son
    objetos válidos y pueden usarse dondequiera que se pueda usar un objeto, incluyendo comprobaciones de tipo.





    El ejemplo más popular de enumeraciones es el tipo booleano integrado, que es un
    tipo enumerado con valores legales **[true](#constant.true)** y **[false](#constant.false)**.
    Las enumeraciones permiten a los desarrolladores definir sus propias enumeraciones arbitrariamente robustas.







   ## Enumeraciones básicas



    Las enumeraciones son similares a las clases y comparten los mismos espacios de nombres que las clases,
    interfaces y traits. También son autocargables de la misma manera. Una enumeración define un nuevo tipo,
    que tiene un número fijo y limitado de valores legales posibles.





&lt;?php

enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}
?&gt;




    Esta declaración crea un nuevo tipo enumerado llamado Suit, que tiene
    cuatro y solo cuatro valores legales: Suit::Hearts, Suit::Diamonds,
    Suit::Clubs, y Suit::Spades. Las variables pueden ser asignadas
    a uno de esos valores legales. Una función puede ser comprobada de tipo contra un tipo enumerado,
    en cuyo caso solo se pueden pasar valores de ese tipo.





&lt;?php

function pick_a_card(Suit $suit)
{
    /* ... */
}

$val = Suit::Diamonds;

// OK
pick_a_card($val);

// OK
pick_a_card(Suit::Clubs);

// TypeError: pick_a_card(): Argument #1 ($suit) must be of type Suit, string given
pick_a_card('Spades');
?&gt;




    Una enumeración puede tener cero o más definiciones de case, sin máximo.
    Una enumeración sin casos es sintácticamente válida, aunque bastante inútil.





    Para los casos de enumeración, se aplican las mismas reglas sintácticas que a cualquier etiqueta en PHP, ver
    [Constantes](#language.constants).





    Por omisión, los casos no están respaldados intrínsecamente por un valor escalar. Es decir, Suit::Hearts
    no es igual a "0". En su lugar, cada caso está respaldado por un objeto singleton de ese nombre. Eso significa que:





&lt;?php

$a = Suit::Spades;
$b = Suit::Spades;

$a === $b; // true

$a instanceof Suit;  // true
?&gt;




    También significa que los valores de enumeración nunca son &lt; o &gt; entre sí,
    ya que esas comparaciones no tienen significado en los objetos. Esas comparaciones siempre devolverán
    **[false](#constant.false)** al trabajar con valores de enumeración.





    Este tipo de caso, sin datos relacionados, se denomina "Caso Puro". Una enumeración que contiene
    solo Casos Puros se denomina Enumeración Pura.





    Todos los Casos Puros se implementan como instancias de su tipo de enumeración. El tipo de enumeración está representado internamente como una clase.





    Todos los Casos tienen una propiedad de solo lectura, name, que es el nombre sensible a mayúsculas y minúsculas
    del caso en sí.





&lt;?php

print Suit::Spades-&gt;name;
// imprime "Spades"
?&gt;




    También es posible usar las funciones [defined()](#function.defined) y [constant()](#function.constant)
    para verificar la existencia o leer un caso de enumeración si el nombre se obtiene dinámicamente.
    Sin embargo, esto se desaconseja ya que el uso de [Enumeraciones respaldadas](#language.enumerations.backed)
    debería funcionar para la mayoría de los casos de uso.









  ## Enumeraciones respaldadas



   Por omisión, los Casos Enumerados no tienen equivalente escalar. Son simplemente objetos singleton. Sin embargo,
   hay amplios casos en los que un Caso Enumerado necesita poder hacer un viaje de ida y vuelta a una base de datos o
   un almacén de datos similar, por lo que tener un equivalente escalar integrado (y por lo tanto trivialmente serializable) definido
   intrínsecamente es útil.




  Para definir un equivalente escalar para una Enumeración, la sintaxis es la siguiente:




&lt;?php

enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}
?&gt;




   Un caso que tiene un equivalente escalar se denomina Caso Respaldado, ya que está "respaldado"
   por un valor más simple. Una enumeración que contiene todos los Casos Respaldados se denomina "Enumeración Respaldada".
   Una Enumeración Respaldada solo puede contener Casos Respaldados. Una Enumeración Pura solo puede contener Casos Puros.





   Una Enumeración Respaldada puede estar respaldada por tipos de int o string,
   y una enumeración dada admite solo un tipo a la vez (es decir, no hay unión de int|string).
   Si una enumeración está marcada como que tiene un equivalente escalar, entonces todos los casos deben tener un equivalente
   escalar único definido explícitamente. No hay equivalentes escalares generados automáticamente
   (por ejemplo, enteros secuenciales). Los casos respaldados deben ser únicos; dos casos de enumeración respaldados no pueden
   tener el mismo equivalente escalar. Sin embargo, una constante puede referirse a un caso, creando efectivamente
   un alias. Ver [Constantes de enumeración](#language.enumerations.constants).





   Los valores equivalentes pueden ser una expresión escalar constante.
   Antes de PHP 8.2.0, los valores equivalentes debían ser literales o expresiones literales.
   Esto significa que las constantes y expresiones constantes no estaban admitidas.
   Es decir, 1 + 1 estaba permitido, pero 1 + SOME_CONST no.





   Los Casos Respaldados tienen una propiedad adicional de solo lectura, value, que es el valor
   especificado en la definición.





&lt;?php

print Suit::Clubs-&gt;value;
// Imprime "C"
?&gt;




   Para hacer cumplir la propiedad value como de solo lectura, una variable no puede
   ser asignada como referencia a ella. Es decir, lo siguiente genera un error:





&lt;?php

$suit = Suit::Clubs;
$ref = &amp;$suit-&gt;value;
// Error: No se puede obtener una referencia a la propiedad Suit::$value
?&gt;




   Las enumeraciones respaldadas implementan una interfaz interna [BackedEnum](#class.backedenum),
   que expone dos métodos adicionales:





   -
    from(int|string): self tomará un escalar y devolverá el Caso de Enumeración correspondiente.
    Si no se encuentra ninguno, lanzará un [ValueError](#class.valueerror). Esto es principalmente
    útil en casos donde el escalar de entrada es confiable y un valor de enumeración faltante debería ser
    considerado un error que detiene la aplicación.


   -
    tryFrom(int|string): ?self tomará un escalar y devolverá el
    Caso de Enumeración correspondiente. Si no se encuentra ninguno, devolverá null.
    Esto es principalmente útil en casos donde el escalar de entrada no es confiable y el llamador quiere
    implementar su propia lógica de manejo de errores o valores por omisión.





   Los métodos from() y tryFrom() siguen las reglas estándar
   de tipado débil/fuerte. En modo de tipado débil, pasar un entero o string es admisible
   y el sistema coercionará el valor en consecuencia. Pasar un float también funcionará y será
   coercionado. En modo de tipado estricto, pasar un entero a from() en una
   enumeración respaldada por string (o viceversa) resultará en un [TypeError](#class.typeerror),
   al igual que un float en todas las circunstancias. Todos los demás tipos de parámetros lanzarán un TypeError
   en ambos modos.





&lt;?php

$record = get_stuff_from_database($id);
print $record['suit'];

$suit =  Suit::from($record['suit']);
// Datos no válidos lanzan un ValueError: "X" no es un valor escalar válido para la enumeración "Suit"
print $suit-&gt;value;

$suit = Suit::tryFrom('A') ?? Suit::Spades;
// Datos no válidos devuelven null, por lo que se usa Suit::Spades en su lugar.
print $suit-&gt;value;
?&gt;



  Definir manualmente un método from() o tryFrom() en una Enumeración Respaldada resultará en un error fatal.








  ## Métodos de enumeración



   Las enumeraciones (tanto Enumeraciones Puras como Enumeraciones Respaldadas) pueden contener métodos y pueden implementar interfaces.
   Si una enumeración implementa una interfaz, entonces cualquier comprobación de tipo para esa interfaz también aceptará
   todos los casos de esa enumeración.





&lt;?php

interface Colorful
{
    public function color(): string;
}

enum Suit implements Colorful
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    // Cumple con el contrato de la interfaz.
    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds =&gt; 'Red',
            Suit::Clubs, Suit::Spades =&gt; 'Black',
        };
    }

    // No forma parte de una interfaz; eso está bien.
    public function shape(): string
    {
        return "Rectangle";
    }
}

function paint(Colorful $c)
{
   /* ... */
}

paint(Suit::Clubs);  // Funciona

print Suit::Diamonds-&gt;shape(); // imprime "Rectangle"
?&gt;




   En este ejemplo, las cuatro instancias de Suit tienen dos métodos,
   color() y shape(). En cuanto al código de llamada
   y las comprobaciones de tipo, se comportan exactamente igual que cualquier otra instancia de objeto.





   En una Enumeración Respaldada, la declaración de interfaz va después de la declaración del tipo de respaldo.





   &lt;?php

interface Colorful
{
    public function color(): string;
}

enum Suit: string implements Colorful
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';

    // Cumple con el contrato de la interfaz.
    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds =&gt; 'Red',
            Suit::Clubs, Suit::Spades =&gt; 'Black',
        };
    }
}
?&gt;




   Dentro de un método, la variable $this está definida y se refiere a la instancia del Caso.





   Los métodos pueden ser arbitrariamente complejos, pero en la práctica suelen devolver un valor estático o
   [match](#control-structures.match) en $this para proporcionar
   diferentes resultados para diferentes casos.





   Tenga en cuenta que en este caso sería una mejor práctica de modelado de datos también definir un
   tipo de enumeración SuitColor con valores Red y Black y devolver eso en su lugar.
   Sin embargo, eso complicaría este ejemplo.





   La jerarquía anterior es lógicamente similar a la siguiente estructura de clase
   (aunque este no es el código real que se ejecuta):





&lt;?php

interface Colorful
{
    public function color(): string;
}

final class Suit implements UnitEnum, Colorful
{
    public const Hearts = new self('Hearts');
    public const Diamonds = new self('Diamonds');
    public const Clubs = new self('Clubs');
    public const Spades = new self('Spades');

    private function __construct(public readonly string $name) {}

    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds =&gt; 'Red',
            Suit::Clubs, Suit::Spades =&gt; 'Black',
        };
    }

    public function shape(): string
    {
        return "Rectangle";
    }

    public static function cases(): array
    {
        // Método ilegal, porque definir manualmente un método cases() en una Enumeración no está permitido.
        // Ver también la sección "Listado de valores".
    }
}
?&gt;




   Los métodos pueden ser públicos, privados o protegidos, aunque en la práctica privado y
   protegido son equivalentes ya que la herencia no está permitida.









  ## Métodos estáticos de enumeración



   Las enumeraciones también pueden tener métodos estáticos. El uso de métodos estáticos en la
   enumeración en sí es principalmente para constructores alternativos. Por ejemplo:





&lt;?php

enum Size
{
    case Small;
    case Medium;
    case Large;

    public static function fromLength(int $cm): self
    {
        return match(true) {
            $cm &lt; 50 =&gt; self::Small,
            $cm &lt; 100 =&gt; self::Medium,
            default =&gt; self::Large,
        };
    }
}
?&gt;




   Los métodos estáticos pueden ser públicos, privados o protegidos, aunque en la práctica privado
   y protegido son equivalentes ya que la herencia no está permitida.









  ## Constantes de enumeración



   Las enumeraciones pueden incluir constantes, que pueden ser públicas, privadas o protegidas,
   aunque en la práctica privada y protegida son equivalentes ya que la herencia no está permitida.




  Una constante de enumeración puede referirse a un caso de enumeración:




&lt;?php

enum Size
{
    case Small;
    case Medium;
    case Large;

    public const Huge = self::Large;
}
?&gt;







  ## Traits


  Las enumeraciones pueden aprovechar los traits, que se comportarán igual que en las clases.
   La salvedad es que los traits useados en una enumeración no deben contener propiedades.
   Solo pueden incluir métodos, métodos estáticos y constantes. Un trait con propiedades resultará en un error fatal.





&lt;?php

interface Colorful
{
    public function color(): string;
}

trait Rectangle
{
    public function shape(): string {
        return "Rectangle";
    }
}

enum Suit implements Colorful
{
    use Rectangle;

    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds =&gt; 'Red',
            Suit::Clubs, Suit::Spades =&gt; 'Black',
        };
    }
}
?&gt;







  ## Valores de enumeración en expresiones constantes



   Debido a que los casos están representados como constantes en la enumeración en sí, pueden usarse como valores estáticos
   en la mayoría de las expresiones constantes: valores por omisión de propiedades, valores por omisión de variables estáticas,
   valores por omisión de parámetros, valores de constantes globales y de clase. No pueden usarse en otros valores de casos de enumeración,
   pero las constantes normales pueden referirse a un caso de enumeración.





   Sin embargo, las llamadas implícitas a métodos mágicos como [ArrayAccess](#class.arrayaccess) en enumeraciones no están permitidas
   en definiciones estáticas o constantes, ya que no podemos garantizar absolutamente que el valor resultante sea determinista
   o que la invocación del método esté libre de efectos secundarios. Las llamadas a funciones, llamadas a métodos y
   el acceso a propiedades continúan siendo operaciones no válidas en expresiones constantes.





&lt;?php

// Esta es una definición de Enumeración completamente legal.
enum Direction implements ArrayAccess
{
    case Up;
    case Down;

    public function offsetExists($offset): bool
    {
        return false;
    }

    public function offsetGet($offset): mixed
    {
        return null;
    }

    public function offsetSet($offset, $value): void
    {
        throw new Exception();
    }

    public function offsetUnset($offset): void
    {
        throw new Exception();
    }
}

class Foo
{
    // Esto está permitido.
    const DOWN = Direction::Down;

    // Esto no está permitido, ya que puede no ser determinista.
    const UP = Direction::Up['short'];
    // Error fatal: No se puede usar [] en enumeraciones en expresión constante
}

// Esto es completamente legal, porque no es una expresión constante.
$x = Direction::Up['short'];
var_dump("\$x is " . var_export($x, true));

$foo = new Foo();
?&gt;







  ## Diferencias con los objetos



   Aunque las enumeraciones están construidas sobre clases y objetos, no admiten toda la funcionalidad relacionada con objetos.
   En particular, los casos de enumeración tienen prohibido tener estado.





   - Los constructores y destructores están prohibidos.

   - La herencia no está admitida. Las enumeraciones no pueden extender ni ser extendidas.

   - No se permiten propiedades estáticas u objetuales.

   - Clonar un caso de enumeración no está admitido, ya que los casos deben ser instancias singleton.

   - [Métodos mágicos](#language.oop5.magic), excepto los listados a continuación, no están permitidos.

   - Las enumeraciones siempre deben declararse antes de ser usadas.



  La siguiente funcionalidad de objetos está disponible y se comporta igual que en cualquier otro objeto:




   - Métodos públicos, privados y protegidos.

   - Métodos estáticos públicos, privados y protegidos.

   - Constantes públicas, privadas y protegidas.

   - Las enumeraciones pueden implementar cualquier número de interfaces.

   -
    Las enumeraciones y los casos pueden tener [atributos](#language.attributes)
    adjuntos a ellos. El filtro de destino **[TARGET_CLASS](#constant.target-class)**
    incluye las enumeraciones en sí. El filtro de destino **[TARGET_CLASS_CONST](#constant.target-class-const)**
    incluye los Casos de Enumeración.


   -
    [__call](#object.call), [__callStatic](#object.callstatic),
    y [__invoke](#object.invoke) métodos mágicos


   - Las constantes **[__CLASS__](#constant.class)** y **[__FUNCTION__](#constant.function)** se comportan normalmente




   La constante mágica ::class en un tipo de enumeración se evalúa al nombre
   del tipo incluyendo cualquier espacio de nombres, exactamente igual que un objeto. La constante mágica ::class
   en una instancia de Caso también se evalúa al tipo de enumeración, ya que es una
   instancia de ese tipo.





   Además, los casos de enumeración no pueden ser instanciados directamente con new, ni con
   [ReflectionClass::newInstanceWithoutConstructor()](#reflectionclass.newinstancewithoutconstructor) en reflexión. Ambos resultarán en un error.





&lt;?php

$clovers = new Suit();
// Error: No se puede instanciar la enumeración Suit

$horseshoes = (new ReflectionClass(Suit::class))-&gt;newInstanceWithoutConstructor()
// Error: No se puede instanciar la enumeración Suit
?&gt;







  ## Listado de valores



   Tanto las Enumeraciones Puras como las Enumeraciones Respaldadas implementan una interfaz interna llamada
   [UnitEnum](#class.unitenum). UnitEnum incluye un método estático
   cases(). cases() devuelve un array compacto de
   todos los Casos definidos en el orden de declaración.





&lt;?php

Suit::cases();
// Produce: [Suit::Hearts, Suit::Diamonds, Suit::Clubs, Suit::Spades]
?&gt;



  Definir manualmente un método cases() en una Enumeración resultará en un error fatal.







  ## Serialización



   Las enumeraciones se serializan de manera diferente a los objetos. Específicamente, tienen un nuevo código de serialización,
   "E", que especifica el nombre del caso de enumeración. La rutina de deserialización puede entonces
   usar eso para establecer una variable al valor singleton existente. Eso asegura que:





&lt;?php

Suit::Hearts === unserialize(serialize(Suit::Hearts));

print serialize(Suit::Hearts);
// E:11:"Suit:Hearts";
?&gt;




   Al deserializar, si no se puede encontrar una enumeración y un caso para coincidir con un valor serializado,
   se emitirá una advertencia y se devolverá **[false](#constant.false)**.





   Si una Enumeración Pura se serializa a JSON, se lanzará un error. Si una Enumeración Respaldada
   se serializa a JSON, estará representada solo por su valor escalar, en el
   tipo apropiado. El comportamiento de ambas puede ser sobrescrito implementando
   [JsonSerializable](#class.jsonserializable).




  Para [print_r()](#function.print-r), la salida de un caso de enumeración es ligeramente diferente
   de los objetos para minimizar la confusión.





&lt;?php

enum Foo {
    case Bar;
}

enum Baz: int {
    case Beep = 5;
}

print_r(Foo::Bar);
print_r(Baz::Beep);

/* Produce

Foo Enum (
    [name] =&gt; Bar
)
Baz Enum:int {
    [name] =&gt; Beep
    [value] =&gt; 5
}
*/
?&gt;








  ## Por qué las enumeraciones no son extensibles



   Las clases tienen contratos en sus métodos:





&lt;?php

class A {}
class B extends A {}

function foo(A $a) {}

function bar(B $b) {
    foo($b);
}
?&gt;




   Este código es seguro en cuanto a tipos, ya que B sigue el contrato de A, y a través de la magia de
   la co/contravariancia, cualquier expectativa que uno pueda tener de los métodos será
   preservada, exceptuando las excepciones.





   Las enumeraciones tienen contratos en sus casos, no en sus métodos:





&lt;?php

enum ErrorCode {
    case SOMETHING_BROKE;
}

function quux(ErrorCode $errorCode)
{
    // Cuando se escribe, este código parece cubrir todos los casos
    match ($errorCode) {
        ErrorCode::SOMETHING_BROKE =&gt; true,
    };
}

?&gt;




   La sentencia [match](#control-structures.match) en la función quux puede ser analizada estáticamente para cubrir
   todos los casos en ErrorCode.





   Pero imagina que estuviera permitido extender enumeraciones:





&lt;?php

// Código de experimento mental donde las enumeraciones no son finales.
// Nota: esto no funcionará realmente en PHP.
enum MoreErrorCode extends ErrorCode {
    case PEBKAC;
}

function fot(MoreErrorCode $errorCode) {
    quux($errorCode);
}

fot(MoreErrorCode::PEBKAC);

?&gt;




   Bajo las reglas normales de herencia, una clase que extiende a otra pasará
   la comprobación de tipo.





   El problema sería que la sentencia [match](#control-structures.match) en quux() ya no cubriría todos
   los casos. Debido a que no sabe acerca de MoreErrorCode::PEBKAC, el match lanzará una excepción.





   Debido a esto, las enumeraciones son finales y no pueden ser extendidas.








  ## Ejemplos






    **Ejemplo #1 Valores limitados básicos**



&lt;?php

enum SortOrder
{
    case Asc;
    case Desc;
}

function query($fields, $filter, SortOrder $order = SortOrder::Asc)
{
     /* ... */
}
?&gt;



     La función query() ahora puede proceder con la seguridad de que
     $order está garantizado que sea SortOrder::Asc
     o SortOrder::Desc. Cualquier otro valor habría resultado en un
     [TypeError](#class.typeerror), por lo que no se necesita ninguna comprobación o prueba de errores adicional.











    **Ejemplo #2 Valores exclusivos avanzados**




&lt;?php

enum UserStatus: string
{
    case Pending = 'P';
    case Active = 'A';
    case Suspended = 'S';
    case CanceledByUser = 'C';

    public function label(): string
    {
        return match($this) {
            self::Pending =&gt; 'Pending',
            self::Active =&gt; 'Active',
            self::Suspended =&gt; 'Suspended',
            self::CanceledByUser =&gt; 'Canceled by user',
        };
    }
}
?&gt;




     En este ejemplo, el estado de un usuario puede ser uno de, y exclusivamente, UserStatus::Pending,
     UserStatus::Active, UserStatus::Suspended, o
     UserStatus::CanceledByUser. Una función puede tipar un parámetro contra
     UserStatus y luego solo aceptar esos cuatro valores, punto.





     Los cuatro valores tienen un método label(), que devuelve un string legible por humanos.
     Ese string es independiente del string equivalente escalar de "nombre de máquina", que puede usarse en,
     por ejemplo, un campo de base de datos o un cuadro de selección HTML.





&lt;?php

foreach (UserStatus::cases() as $case) {
    printf('&lt;option value="%s"&gt;%s&lt;/option&gt;\n', $case-&gt;value, $case-&gt;label());
}
?&gt;





















 # Errores

## Tabla de contenidos
- [Lo básico](#language.errors.basics)
- [Errores en PHP 7](#language.errors.php7)




  ## Introducción



   Desarfortunadamente, no importa lo cuidadoso que uno sea escribiendo código; los errores
   son un hecho de la vida. PHP notificará errores, advertencias y avisos para muchos problemas
   comunes de codificación y de tiempo de ejecución, por lo que saber cómo detectar y manejar estos
   errores hará la depuración mucho más sencilla.











 ## Lo básico



  PHP notifica errores en respuesta a varias condiciones de error internas.
  Estas se pueden utilizar para señalar varias condiciones diferentes,
  mostrándose y/o registrándose si fuera necesario.





  Cada error que genera PHP incluye un tipo. Existe una
  [lista de dichos tipos de error](#errorfunc.constants),
  junto con una breve descripción de su comportamiento y sus posibles
  causas.





  ### Manejo de errores con PHP



   Si no se establece un manejador de errores, PHP manejará cada error que ocurra
   según su configuración. Los errores que se notifican y los que se
   ignoran se controla mediante la directiva
   [error_reporting](#ini.error-reporting)
   de php.ini, o durante la ejecución llamando a
   [error_reporting()](#function.error-reporting). Sin embargo, se recomienda encarecidamente
   establecer la directiva de configuración, ya que algunos errores pueden ocurrir
   antes de comenzar la ejecución de un script.





   En un entorno de desarrollo debería establecerse siempre
   [error_reporting](#ini.error-reporting)
   a **[E_ALL](#constant.e-all)**, debido a que es necesario reconocer y corregir los
   problemas generados por PHP. En producción, se podría establecer esta directiva a
   un nivel de menor verbosidad como
   E_ALL &amp; ~E_NOTICE &amp; ~E_DEPRECATED, aunque
   en muchos casos **[E_ALL](#constant.e-all)** también es apropiado, ya que puede
   proporcionar advertencias precoces de problemas potenciales.





   Lo que PHP hace con estos errores depende de dos directivas más de php.ini.
   [display_errors](#ini.display-errors)
   controla si el error es mostrado como parte de la salida del script. Esta
   debería estar siempre deshabilitada en un entorno de producción, ya que puede incluir
   información confidencial tal como contraseñas de bases de datos, aunque a menudo es útil
   habilitarla en desarrollo debido a que asegura la notificación inmediata de problemas.





   Además de mostrar errores, PHP puede registrarlos cuando la directiva
   [log_errors](#ini.log-errors)
   está habilitada. Esta registrará cualquier error en el fichero o registro del sistema
   definido por
   [error_log](#ini.error-log). Esta directiva
   puede ser extremadamente útil en un entorno de producción debido a que se pueden registrar
   los errores que ocurran y generar informes basados en ellos.






  ### Manejadores de errores de usuario



   Si el manejo de errores predeterminado de PHP es inadecuado, también se pueden manejar muchos
   tipos de error con un manejador de errores propio mediante
   [set_error_handler()](#function.set-error-handler). Mientras que algunos tipos de error no se pueden
   manejar de esta forma, aquellos que sí se pueden lo hacen de la manera
   en que su script vea apropiada: por ejemplo, se puede emplear para mostrar al usuario
   una página de error personalizada y luego notificar más directamente mediante un registro,
   tal como el envío de un correo electrónico.
















 ## Errores en PHP 7



  PHP 7 cambia la mayoría de los errores notificados por PHP. En lugar de notificar
  errores a través del mecanismo de notificación de errores tradicional de PHP 5, la mayoría
  de los errores ahora son notificados lanzando excepciones [Error](#class.error).





  Al igual que las excepciones normales, las excepciones [Error](#class.error)
  se propagarán hasta alcanzar el primer bloque
  [catch](#language.exceptions.catch)
  coincidente. Si no hay bloques coincidentes, será invocado cualquier manejador de
  excepciones predeterminado instalado con [set_exception_handler()](#function.set-exception-handler),
  y si no hubiera ningún manejador de excepciones predeterminado, la excepción será
  convertida en un error fatal y será manejada como un error tradicional.





  Debido a que la jerarquía de [Error](#class.error) no hereda de
  [Exception](#class.exception), el código que emplee bloques
  catch (Exception $e) { ... } para manejar excepciones no
  capturadas en PHP 5 encontrará que estos [Error](#class.error)es no
  son capturados por dichos bloques. Se requiere, por tanto, un bloque catch (Error $e) { ... }
  o un manejador [set_exception_handler()](#function.set-exception-handler).





  ### Jerarquía de [Error](#class.error)



   -
    [Throwable](#class.throwable)

     <li class="listitem">
      [Error](#class.error)

       <li class="listitem">
        [ArithmeticError](#class.arithmeticerror)

         <li class="listitem">
          [DivisionByZeroError](#class.divisionbyzeroerror)



       </li>
       -
        [AssertionError](#class.assertionerror)


       -
        [CompileError](#class.compileerror)

         <li class="listitem">
          [ParseError](#class.parseerror)



       </li>
       -
        [TypeError](#class.typeerror)

         <li class="listitem">
          [ArgumentCountError](#class.argumentcounterror)



       </li>
       -
        [ValueError](#class.valueerror)


       -
        [UnhandledMatchError](#class.unhandledmatcherror)


       -
        [FiberError](#class.fibererror)


       -
        [RequestParseBodyException](#class.requestparsebodyexception)



     </li>
     -
      [Exception](#class.exception)

       <li class="listitem">
        ...



     </li>

   </li>





















 # Las excepciones

## Tabla de contenidos
- [Extender las Excepciones](#language.exceptions.extending)



  PHP tiene un manejo de excepciones similar al que ofrecen otros
  lenguajes de programación.
  Una excepción puede ser lanzada ("[throw](#language.exceptions)") y capturada
  ("[catch](#language.exceptions.catch)") en PHP. El código deberá estar rodeado
  de un bloque [try](#language.exceptions) para facilitar la captura de una excepción
  potencial. Cada [try](#language.exceptions) debe tener al menos
  un bloque [catch](#language.exceptions.catch) o [finally](#language.exceptions.finally) correspondiente.




  Si una excepción es lanzada y el ámbito actual de la función no tiene
  un bloque [catch](#language.exceptions.catch), la excepción "subirá" la pila de llamadas de la función llamadora
  hasta encontrar un bloque [catch](#language.exceptions.catch) correspondiente. Todos los bloques [finally](#language.exceptions.finally) encontrados
  serán ejecutados. Si la pila de llamadas se desenrolla hasta el ámbito global sin
  encontrar un bloque [catch](#language.exceptions.catch) correspondiente, el programa será terminado con
  un error fatal a menos que se haya definido un manejador global de excepciones.




  El objeto lanzado debe ser una [instanceof](#language.operators.type) [Throwable](#class.throwable).
  Intentar lanzar un objeto que no lo es resultará en un error fatal emitido por PHP.




  A partir de PHP 8.0.0, la palabra clave [throw](#language.exceptions) es una expresión y puede ser
  utilizada en cualquier contexto de expresiones. En versiones anteriores era una declaración que debía estar en su propia línea.





   ## catch


    Un bloque [catch](#language.exceptions.catch) define cómo reaccionar ante una excepción que ha sido lanzada.
    Un bloque [catch](#language.exceptions.catch) define uno o más tipos de excepciones o errores que puede
    manejar, y opcionalmente una variable en la que asignar la excepción.
    (Esta variable era requerida en versiones anteriores a PHP 8.0.0)
    El primer bloque [catch](#language.exceptions.catch) que una excepción o error lanzado encuentre y que corresponda al
    tipo del objeto lanzado manejará el objeto.




    Varios bloques [catch](#language.exceptions.catch) pueden ser utilizados para atrapar diferentes
    clases de excepciones. La ejecución normal (cuando ninguna excepción es lanzada
    en el bloque [try](#language.exceptions)) continúa después del último
    bloque [catch](#language.exceptions.catch) definido en la secuencia. Las excepciones
    pueden ser lanzadas ([throw](#language.exceptions)) o relanzadas en un bloque [catch](#language.exceptions.catch). De lo contrario,
    la ejecución continuará después del bloque [catch](#language.exceptions.catch) que haya sido activado.




    Cuando una excepción es lanzada, el código siguiente al tratamiento no será
    ejecutado y PHP intentará encontrar el primer bloque [catch](#language.exceptions.catch) correspondiente.
    Si una excepción no es capturada, un error fatal de PHP será
    enviado con un mensaje "Uncaught Exception ..."
    indicando que la excepción no pudo ser capturada a menos que un manejador
    de excepciones sea definido con la función
    [set_exception_handler()](#function.set-exception-handler).




    A partir de PHP 7.1, un bloque [catch](#language.exceptions.catch) puede especificar múltiples excepciones a
    través del carácter pipe (|). Esto es útil cuando
    diferentes excepciones de diferentes jerarquías de clases son tratadas
    de la misma manera.




    A partir de PHP 8.0.0, el nombre de variable para la excepción capturada es
    opcional. Si no se especifica, el bloque [catch](#language.exceptions.catch) será siempre ejecutado pero
    no tendrá acceso al objeto lanzado.






   ## finally


    Un bloque [finally](#language.exceptions.finally) también puede ser
    especificado después de bloques [catch](#language.exceptions.catch). El código dentro
    del bloque [finally](#language.exceptions.finally) será siempre ejecutado después de los bloques
    [try](#language.exceptions) y [catch](#language.exceptions.catch), independientemente de si
    una excepción ha sido lanzada, antes de continuar con la ejecución normal.




    Una interacción notable es entre un bloque [finally](#language.exceptions.finally) y una declaración
    [return](#function.return).
    Si una declaración [return](#function.return) es encontrada dentro de los bloques [try](#language.exceptions)
    o [catch](#language.exceptions.catch), el bloque [finally](#language.exceptions.finally) será igualmente ejecutado. Además,
    la declaración [return](#function.return) es evaluada cuando es encontrada, pero el
    resultado será retornado después de que el bloque [finally](#language.exceptions.finally) sea ejecutado.
    Adicionalmente, si el bloque [finally](#language.exceptions.finally) contiene también una declaración
    [return](#function.return) el valor del bloque [finally](#language.exceptions.finally) es retornado.




    Otra interacción notable es entre una excepción lanzada en un bloque [try](#language.exceptions),
    y una excepción lanzada en un bloque [finally](#language.exceptions.finally). Si una excepción es lanzada en ambos bloques,
    entonces, la excepción lanzada en el bloque [finally](#language.exceptions.finally) será la que se propagará,
    y la excepción lanzada en el bloque [try](#language.exceptions) será utilizada como excepción previa.






  ## Manejador global de excepciones


   Si una excepción es permitida para subir hasta el ámbito global, puede
   ser capturada por un manejador de excepciones global si ha sido definido. La función
   [set_exception_handler()](#function.set-exception-handler) puede definir una función que será
   llamada en lugar de un bloque [catch](#language.exceptions.catch) si ningún otro bloque es invocado.
   El efecto es esencialmente idéntico a envolver el programa entero en un
   bloque [try](#language.exceptions)-[catch](#language.exceptions.catch) con esta función como [catch](#language.exceptions.catch).






   ## Notas


   **Nota**:



     Las funciones internas de PHP utilizan principalmente el
     [Error reporting](#ini.error-reporting), solo las extensiones
     [orientadas a objetos](#language.oop5)
     utilizan excepciones. Sin embargo, los errores pueden ser fácilmente convertidos en
     excepciones con [ErrorException](#class.errorexception).
     Sin embargo, esta técnica solo funciona para errores no fatales.




     **Ejemplo #1 Convertir el error reporting en excepciones**



&lt;?php
function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler');
?&gt;




   **Sugerencia**

     La [biblioteca estándar PHP (SPL)](#intro.spl) proporciona
     un buen número [de excepciones adicionales](#spl.exceptions).







   ## Ejemplos



    **Ejemplo #2 Lanzar una excepción**



&lt;?php
function inverse($x) {
    if (!$x) {
        throw new Exception('División por cero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Excepción recibida: ',  $e-&gt;getMessage(), "\n";
}

// Continuar la ejecución
echo "¡Hola mundo!\n";
?&gt;


    El ejemplo anterior mostrará:




0.2
Excepción recibida: División por cero.
¡Hola mundo!




    **Ejemplo #3 Manejo de la excepción con un bloque [finally](#language.exceptions.finally)**



&lt;?php
function inverse($x) {
    if (!$x) {
        throw new Exception('División por cero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Excepción recibida: ',  $e-&gt;getMessage(), "\n";
} finally {
    echo "Primer fin.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Excepción recibida: ',  $e-&gt;getMessage(), "\n";
} finally {
    echo "Segundo fin.\n";
}

// Continuar la ejecución
echo "¡Hola mundo!\n";
?&gt;


    El ejemplo anterior mostrará:




0.2
Primer fin.
Excepción recibida: División por cero.
Segundo fin.
¡Hola mundo!




    **Ejemplo #4 Interacción entre el bloque [finally](#language.exceptions.finally) y [return](#function.return)**



&lt;?php

function test() {
    try {
        throw new Exception('foo');
    } catch (Exception $e) {
        return 'catch';
    } finally {
        return 'finally';
    }
}

echo test();
?&gt;


    El ejemplo anterior mostrará:




finally




    **Ejemplo #5 Herencia de una excepción**



&lt;?php

class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // se relanza
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e-&gt;getMessage());
        }
    }
}

$foo = new Test;
$foo-&gt;testing();

?&gt;


    El ejemplo anterior mostrará:




string(4) "foo!"




    **Ejemplo #6 Manejo de excepciones de captura múltiple**



&lt;?php

class MyException extends Exception { }

class MyOtherException extends Exception { }

class Test {
    public function testing() {
        try {
            throw new MyException();
        } catch (MyException | MyOtherException $e) {
            var_dump(get_class($e));
        }
    }
}

$foo = new Test;
$foo-&gt;testing();

?&gt;


    El ejemplo anterior mostrará:




string(11) "MyException"




    **Ejemplo #7 Omitir la variable capturada**


    Solo permitido en PHP 8.0.0 y versiones posteriores.



&lt;?php

function test() {
    throw new SpecificException('Oopsie');
}

try {
    test();
} catch (SpecificException) {
    print "Se lanzó una SpecificException, pero no nos importa con los detalles.";
}
?&gt;


    El ejemplo anterior mostrará:




Se lanzó una SpecificException, pero no nos importa con los detalles.




    **Ejemplo #8 Throw como expresión**


    Solo permitido en PHP 8.0.0 y versiones posteriores.



&lt;?php

class SpecificException extends Exception {}

function test() {
    do_something_risky() or throw new Exception('No funcionó');
}

function do_something_risky() {
    return false; // Simular un fallo
}

try {
    test();
} catch (Exception $e) {
    print $e-&gt;getMessage();
}
?&gt;


    El ejemplo anterior mostrará:




No funcionó




    **Ejemplo #9 Excepción en try y en finally**



&lt;?php

try {
    try {
        throw new Exception(message: 'Third', previous: new Exception('Fourth'));
    } finally {
        throw new Exception(message: 'First', previous: new Exception('Second'));
    }
} catch (Exception $e) {
    var_dump(
        $e-&gt;getMessage(),
        $e-&gt;getPrevious()-&gt;getMessage(),
        $e-&gt;getPrevious()-&gt;getPrevious()-&gt;getMessage(),
        $e-&gt;getPrevious()-&gt;getPrevious()-&gt;getPrevious()-&gt;getMessage(),
    );
}


    El ejemplo anterior mostrará:




string(5) "First"
string(6) "Second"
string(5) "Third"
string(6) "Fourth"






  ## Extender las Excepciones


   Una clase de excepción definida por el usuario puede ser definida extendiendo
   la clase Exception integrada. Los miembros y las propiedades a continuación muestran
   lo que está accesible en la clase hija que deriva de la clase Exception
   integrada.




   **Ejemplo #1 La clase de excepción integrada**



&lt;?php
class Exception implements Throwable
{
    protected $message = 'Unknown exception';   // Mensaje de excepción
    private   $string;                          // caché de __toString
    protected $code = 0;                        // código de excepción definido por el usuario
    protected $file;                            // nombre de archivo fuente de la excepción
    protected $line;                            // línea fuente de la excepción
    private   $trace;                           // rastro de la pila de ejecución
    private   $previous;                        // excepción previa si excepción anidada

    public function __construct($message = '', $code = 0, ?Throwable $previous = null);

    final private function __clone();           // Inhibe la duplicación de excepciones.

    final public  function getMessage();        // mensaje de la excepción
    final public  function getCode();           // código de la excepción
    final public  function getFile();           // nombre del archivo fuente
    final public  function getLine();           // línea fuente
    final public  function getTrace();          // array de la pila de ejecución
    final public  function getPrevious();       // la excepción previa
    final public  function getTraceAsString();  // rastro en forma de string

    // Puede ser redefinido
    public function __toString();               // string formateado para la visualización
}
?&gt;




   Si una clase extiende la clase Exception integrada y redefine el [constructor](#language.oop5.decon), se recomienda fuertemente
   que también llame a [parent::__construct()](#language.oop5.paamayim-nekudotayim)
   para asegurarse de que todos los datos disponibles han sido correctamente asignados.
   El método [__toString()](#language.oop5.magic) puede ser
   redefinido para proporcionar una salida personalizada cuando el objeto es presentado
   en forma de string.



  **Nota**:



    Las excepciones no pueden ser clonadas. Intentar [clonar](#language.oop5.cloning) una Exception resultará en un
    error fatal **[E_ERROR](#constant.e-error)**.





   **Ejemplo #2 Extender la clase Exception**



&lt;?php
/**
 * Define una clase de excepción personalizada.
 */
class MyException extends Exception
{
    // Redefinir la excepción para que el mensaje no sea opcional.
    public function __construct($message, $code = 0, ?Throwable $previous = null) {
        // código

        // asegurarse de que todo está correctamente asignado
        parent::__construct($message, $code, $previous);
    }

    // Representación personalizada del objeto en forma de string.
    public function __toString() {
        return __CLASS__ . ": [{$this-&gt;code}]: {$this-&gt;message}\n";
    }

    public function customFunction() {
        echo "Una función personalizada para este tipo de excepción\n";
    }
}

/**
 * Crear una clase para probar la excepción
 */
class TestException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // Lanzar una excepción personalizada
                throw new MyException('1 no es un parámetro válido', 5);
                break;

            case self::THROW_DEFAULT:
                // Lanzar la por defecto.
                throw new Exception('2 no está permitido como parámetro', 6);
                break;

            default:
                // Ninguna excepción, el objeto será creado.
                $this-&gt;var = $avalue;
                break;
        }
    }
}

// Ejemplo 1
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) {      // Será capturada
    echo "MyException capturada\n", $e;
    $e-&gt;customFunction();
} catch (Exception $e) {        // Ignorado
    echo "Exception por defecto capturada\n", $e;
}

// Continuar la ejecución
var_dump($o); // Null
echo "\n\n";

// Ejemplo 2
try {
    $o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) {      // No coincide con este tipo
    echo "MyException capturada\n", $e;
    $e-&gt;customFunction();
} catch (Exception $e) {        // Será capturada
    echo "Exception por defecto capturada\n", $e;
}

// Continuar la ejecución
var_dump($o); // Null
echo "\n\n";

// Ejemplo 3
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) {        // Será capturada
    echo "Exception por defecto capturada\n", $e;
}

// Continuar la ejecución
var_dump($o); // Null
echo "\n\n";

// Ejemplo 4
try {
    $o = new TestException();
} catch (Exception $e) {        // Saltado, ninguna excepción
    echo "Exception por defecto capturada\n", $e;
}

// Continuar la ejecución
var_dump($o); // TestException
echo "\n\n";
?&gt;



















 # Fibers




  ### Descripción general de Fibers

  (PHP 8 &gt;= 8.1.0)



   Los Fibers representan funciones de pila completa e interrumpibles. Los Fibers pueden suspenderse desde cualquier lugar en la pila de llamadas,
   pausando su ejecución dentro del Fiber hasta que se reanude más tarde.




   Los Fibers pausan toda la pila de ejecución, por lo que el llamador directo de la función no necesita cambiar la forma
   en que invoca la función




   La ejecución puede interrumpirse en cualquier lugar de la pila de llamadas utilizando [Fiber::suspend()](#fiber.suspend)
   (es decir, la llamada a [Fiber::suspend()](#fiber.suspend) puede estar en una función profundamente anidada o incluso no
   existir en absoluto)




   A diferencia de los [Generator](#class.generator)s sin pila, cada [Fiber](#class.fiber) tiene su propia pila de llamadas,
   lo que permite que se pausen dentro de llamadas a funciones profundamente anidadas. Una función que declara un punto de interrupción
   (es decir, que llama a [Fiber::suspend()](#fiber.suspend)) no necesita cambiar su tipo de retorno, a diferencia de una función que utiliza
   [yield](#control-structures.yield) y debe devolver una instancia de [Generator](#class.generator).




   Los Fibers pueden suspenderse en cualquier llamada a función, incluidas aquellas realizadas desde la Máquina Virtual de PHP, como las funciones
   proporcionadas a [array_map()](#function.array-map) o los métodos llamados por [foreach](#control-structures.foreach) en un
   objeto [Iterator](#class.iterator).




   Una vez suspendido, la ejecución del Fiber puede reanudarse con cualquier valor utilizando [Fiber::resume()](#fiber.resume) o lanzando una excepción en el Fiber utilizando [Fiber::throw()](#fiber.throw). El valor se devuelve (o la excepción se lanza) desde [Fiber::suspend()](#fiber.suspend)
   Once suspended, execution of the fiber may be resumed with any value using [Fiber::resume()](#fiber.resume)
   or by throwing an exception into the fiber using [Fiber::throw()](#fiber.throw). The value is returned
   (or exception thrown) from [Fiber::suspend()](#fiber.suspend).



  **Nota**:

    Antes de PHP 8.4.0, no se permitía cambiar Fibers durante la ejecución de un
    [destructor](#language.oop5.decon.destructor)
    de objeto.






   **Ejemplo #1 Uso básico**



    &lt;?php
$fiber = new Fiber(function (): void {
   $value = Fiber::suspend('fiber');
   echo "Valor utilizado para reanudar el Fiber: ", $value, PHP_EOL;
});

$value = $fiber-&gt;start();

echo "Valor del Fiber al suspenderse: ", $value, PHP_EOL;

$fiber-&gt;resume('test');
?&gt;


   El ejemplo anterior mostrará:




Valor del Fiber al suspenderse: fiber
Valor utilizado para reanudar el Fiber: test




















 # Generators

## Tabla de contenidos
- [Resumen sobre los generadores](#language.generators.overview)
- [Sintaxis de un Generador](#language.generators.syntax)
- [Comparación de los generadores con los objetos Iterator](#language.generators.comparison)




  ## Resumen sobre los generadores

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)




   Los generadores proporcionan una manera sencilla de implementar
   [iteradores](#language.oop5.iterations)
   sin el costo ni la complejidad de desarrollar una clase que implemente
   la interfaz [Iterator](#class.iterator).





   Un generador ofrece un medio conveniente para proporcionar datos a las bucles [foreach](#control-structures.foreach) sin
   tener que construir un array en memoria de antemano, lo cual podría llevar al programa
   a exceder un límite de memoria o requerir un tiempo de procesamiento considerable para generarlos.
   En su lugar, se puede utilizar una función generadora,
   que es idéntica a una
   [función](#functions.user-defined) normal,
   excepto que en lugar de [devolver](#functions.returning-values)
   una sola vez, un generador puede utilizar [yield](#control-structures.yield) tantas veces como sea necesario, para
   proporcionar los valores a recorrer.
   Al igual que con los iteradores, el acceso aleatorio a los datos no es posible.





   Un ejemplo sencillo de este mecanismo es la reimplementación
   de la función [range()](#function.range) en forma de generador.
   La función estándar [range()](#function.range) debe generar un array
   que contenga cada valor y devolverlo, lo cual puede llevar
   a arrays de gran tamaño: por ejemplo, la llamada al código
   **range(0, 1000000)** puede consumir significativamente más de
   100 MB de memoria.





   Como alternativa, se puede implementar un generador
   xrange(), que solo necesitará memoria para la creación de un objeto [Iterator](#class.iterator), y deberá mantener internamente el estado actual del generador, lo cual resulta en un consumo de memoria inferior a 1 KB.





   **Ejemplo #1 Implementación de la función [range()](#function.range) en forma de generador**



&lt;?php
function xrange($start, $limit, $step = 1) {
    if ($start &lt;= $limit) {
        if ($step &lt;= 0) {
            throw new LogicException('El paso debe ser positivo');
        }

        for ($i = $start; $i &lt;= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step &gt;= 0) {
            throw new LogicException('El paso debe ser negativo');
        }

        for ($i = $start; $i &gt;= $limit; $i += $step) {
            yield $i;
        }
    }
}

/*
 * Es de notar que las funciones range() y xrange() producen el
 * mismo resultado, a continuación.
 */

echo 'Números impares de un solo dígito desde range():  ';
foreach (range(1, 9, 2) as $number) {
    echo "$number ";
}
echo "\n";

echo 'Números impares de un solo dígito desde xrange(): ';
foreach (xrange(1, 9, 2) as $number) {
    echo "$number ";
}
?&gt;


   El ejemplo anterior mostrará:




Números impares de un solo dígito desde range():  1 3 5 7 9
Números impares de un solo dígito desde xrange(): 1 3 5 7 9





   ### Los objetos [Generator](#class.generator)


    Cuando se llama a una función generadora,
    se devuelve un objeto de la clase interna [Generator](#class.generator). Este objeto implementa la interfaz [Iterator](#class.iterator)
    de la misma manera que lo haría un objeto iterador que solo avanza, y proporciona los métodos que pueden ser llamados para manipular el estado
    del generador, incluyendo el envío de valores y sus retornos.









  ## Sintaxis de un Generador



   Una función generadora se asemeja a una función normal, excepto que en lugar de
   devolver un valor, un generador [yield](#control-structures.yield) devuelve tantos valores como sea necesario.
   Todas las funciones que contienen [yield](#control-structures.yield) son funciones generadoras.





   Cuando se llama a una función generadora, devuelve un objeto
   que se puede recorrer. Cuando se recorre este objeto (por ejemplo, a través de una
   bucle [foreach](#control-structures.foreach)), PHP llamará a los métodos de iteración del objeto cada
   vez que necesite un valor, luego guardará el estado del generador
   cuando genere un valor, para que pueda ser reanudado cuando
   se requiera el siguiente valor.





   Cuando no haya más valores para proporcionar, la función generadora puede simplemente
   devolver, y el código de llamada continuará como si un array no tuviera más valores.




  **Nota**:



    Un generador puede devolver valores,
    que pueden ser recuperados utilizando [Generator::getReturn()](#generator.getreturn).






   ### La palabra clave **yield**



    La palabra clave **yield** es el núcleo de una función generadora.
    En su forma más simple, una instrucción yield se asemeja a una instrucción
    return, excepto que en lugar de detener la ejecución de la función
    y devolver, yield proporciona un valor al código que recorre el generador,
    y pausa la ejecución de la función generadora.





    **Ejemplo #1 Un ejemplo sencillo de producción de valores**



&lt;?php
function gen_one_to_three() {
    for ($i = 1; $i &lt;= 3; $i++) {
        // Note que $i se preserva entre cada producción de valor.
        yield $i;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $value) {
    echo "$value\n";
}
?&gt;


    El ejemplo anterior mostrará:




1
2
3




   **Nota**:



     Internamente, se asociarán claves enteras secuenciales
     con los valores producidos, de la misma manera que para un
     array no asociativo.






    #### Provisión de valores con claves



     PHP también soporta arrays asociativos, y los generadores
     no son diferentes. Además de proporcionar valores simples, como hemos visto anteriormente, también se pueden
     proporcionar claves simultáneamente.





     La sintaxis para producir un par clave/valor es similar a la utilizada
     para definir un array asociativo; así:





     **Ejemplo #2 Producción de un par clave/valor**



&lt;?php
/*
 * La entrada está compuesta de campos separados por un punto y coma,
 * y el primer campo es un ID para usar como clave.
 */

$input = &lt;&lt;&lt;'EOF'
1;PHP;Le gustan los signos de dólar
2;Python;Le gustan los espacios en blanco
3;Ruby;Le gustan los bloques
EOF;

function input_parser($input) {
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        yield $id =&gt; $fields;
    }
}

foreach (input_parser($input) as $id =&gt; $fields) {
    echo "$id:\n";
    echo "    $fields[0]\n";
    echo "    $fields[1]\n";
}
?&gt;


     El ejemplo anterior mostrará:




1:
    PHP
    Le gustan los signos de dólar
2:
    Python
    Le gustan los espacios en blanco
3:
    Ruby
    Le gustan los bloques






    #### Producción de valores nulos



     Yield puede ser llamado sin argumento para proporcionar un valor nulo
     con una clave automática.





     **Ejemplo #3 Producción de valores nulos**



&lt;?php
function gen_three_nulls() {
    foreach (range(1, 3) as $i) {
        yield;
    }
}

var_dump(iterator_to_array(gen_three_nulls()));
?&gt;


     El ejemplo anterior mostrará:




array(3) {
  [0]=&gt;
  NULL
  [1]=&gt;
  NULL
  [2]=&gt;
  NULL
}






    #### Producción de valores por referencia



     Las funciones generadoras pueden producir valores por referencia.
     Esto se hace de la misma manera que el
     [retorno por referencia
      desde funciones](#functions.returning-values) : añadiendo un ET comercial (&amp;) al nombre
     de la función.





     **Ejemplo #4 Producción de valores por referencia**



&lt;?php
function &amp;gen_reference() {
    $value = 3;

    while ($value &gt; 0) {
        yield $value;
    }
}

/*
 * Note que es posible cambiar $number en el bucle,
 * y, dado que el generador proporciona referencias, $value
 * en gen_reference() también cambia.
 */
foreach (gen_reference() as &amp;$number) {
    echo (--$number).'... ';
}
?&gt;


     El ejemplo anterior mostrará:




2... 1... 0...






    #### Delegación del generador vía **yield from**



     La delegación del generador permite obtener los valores de otro generador, de un objeto [Traversable](#class.traversable), o
     de un [array](#language.types.array) utilizando la palabra clave **yield from**. El generador externo obtendrá así todos los valores del generador
     interno, del objeto, o del array mientras no sea inválido, después de lo cual, la ejecución continuará en el generador externo.





     Si un generador se utiliza con la expresión **yield from**,
     la expresión **yield from** también devolverá cualquier valor
     devuelto por el generador interno.




    **Precaución**
     # Almacenamiento en un array (e.g. con [iterator_to_array()](#function.iterator-to-array))



       **yield from** no reinicia las
       claves. Preserva las claves devueltas por el objeto
       [Traversable](#class.traversable), o [array](#language.types.array).
       Por lo tanto, algunos valores pueden compartir una clave común con otros **yield** o
       **yield from**, que, al insertarse
       en un array, sobrescribirá los valores anteriores con esa clave.





       Un caso frecuente en el que esto es importante es [iterator_to_array()](#function.iterator-to-array)
       devolviendo un array con clave por defecto, lo que puede llevar a
       resultados potencialmente inesperados.
       [iterator_to_array()](#function.iterator-to-array) tiene un segundo parámetro
       preserve_keys que puede ser definido en **[false](#constant.false)**
       para recolectar todos los valores ignorando las claves
       devueltas por el [Generator](#class.generator).





       **Ejemplo #5 yield from** con [iterator_to_array()](#function.iterator-to-array)



&lt;?php
function inner() {
    yield 1; // clave 0
    yield 2; // clave 1
    yield 3; // clave 2
}
function gen() {
    yield 0; // clave 0
    yield from inner(); // claves 0-2
    yield 4; // clave 1
}
// establece en false el segundo parámetro para obtener un array [0, 1, 2, 3, 4]
var_dump(iterator_to_array(gen()));
?&gt;


       El ejemplo anterior mostrará:




array(3) {
  [0]=&gt;
  int(1)
  [1]=&gt;
  int(4)
  [2]=&gt;
  int(3)
}






     **Ejemplo #6 Uso básico de yield from**



&lt;?php
function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    yield 9;
    yield 10;
}

function seven_eight() {
    yield 7;
    yield from eight();
}

function eight() {
    yield 8;
}

foreach (count_to_ten() as $num) {
    echo "$num ";
}
?&gt;


     El ejemplo anterior mostrará:




1 2 3 4 5 6 7 8 9 10





     **Ejemplo #7 yield from** y los valores devueltos



&lt;?php
function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    return yield from nine_ten();
}

function seven_eight() {
    yield 7;
    yield from eight();
}

function eight() {
    yield 8;
}

function nine_ten() {
    yield 9;
    return 10;
}

$gen = count_to_ten();
foreach ($gen as $num) {
    echo "$num ";
}
echo $gen-&gt;getReturn();
?&gt;


     El ejemplo anterior mostrará:




1 2 3 4 5 6 7 8 9 10










  ## Comparación de los generadores con los objetos [Iterator](#class.iterator)



   La principal ventaja de los generadores es su simplicidad. Menos código
   debe ser escrito que cuando se trata de implementar una clase
   [Iterator](#class.iterator), y generalmente es más legible.
   Por ejemplo, la función y la clase siguientes son equivalentes:






&lt;?php
function getLinesFromFile($fileName) {
    if (!$fileHandle = fopen($fileName, 'r')) {
        return;
    }

    while (false !== $line = fgets($fileHandle)) {
        yield $line;
    }

    fclose($fileHandle);
}

// versus...

class LineIterator implements Iterator {
    protected $fileHandle;

    protected $line;
    protected $i;

    public function __construct($fileName) {
        if (!$this-&gt;fileHandle = fopen($fileName, 'r')) {
            throw new RuntimeException('Imposible abrir el fichero: "' . $fileName . '"');
        }
    }

    public function rewind() {
        fseek($this-&gt;fileHandle, 0);
        $this-&gt;line = fgets($this-&gt;fileHandle);
        $this-&gt;i = 0;
    }

    public function valid() {
        return false !== $this-&gt;line;
    }

    public function current() {
        return $this-&gt;line;
    }

    public function key() {
        return $this-&gt;i;
    }

    public function next() {
        if (false !== $this-&gt;line) {
            $this-&gt;line = fgets($this-&gt;fileHandle);
            $this-&gt;i++;
        }
    }

    public function __destruct() {
        fclose($this-&gt;fileHandle);
    }
}
?&gt;





   Sin embargo, esta flexibilidad tiene un costo: los generadores son iteradores
   que solo avanzan, y no pueden ser reinicializados una vez
   que su recorrido haya comenzado. Esto también significa que el mismo generador no puede
   ser utilizado varias veces: el generador deberá ser reconstruido
   llamando nuevamente a la función generadora.





   ### Ver también





     - [Iteración de Objeto](#language.oop5.iterations)




















  # Atributos

## Tabla de contenidos
- [Descripción general de atributos](#language.attributes.overview)
- [Sintaxis de atributos](#language.attributes.syntax)
- [Lectura de atributos con la API de Reflection](#language.attributes.reflection)
- [Declaración de clases de atributos](#language.attributes.classes)



   ## Descripción general de atributos

   (PHP 8)




    Los atributos de PHP ofrecen metadatos estructurados y legibles por máquinas para clases, métodos,
    funciones, parámetros, propiedades y constantes. Pueden ser inspeccionados en tiempo de ejecución
    a través de la [API de Reflection](#book.reflection), lo que permite un
    comportamiento dinámico sin modificar el código. Los atributos proporcionan una forma declarativa de anotar
    el código con metadatos.




    Los atributos permiten desacoplar la implementación de una funcionalidad de su uso. Mientras que
    las interfaces definen la estructura mediante la imposición de métodos, los atributos proporcionan metadatos en
    varios elementos, incluidos métodos, funciones, propiedades y constantes. A diferencia de las interfaces,
    que obligan a implementar métodos, los atributos anotan el código sin alterar su estructura.




    Los atributos pueden complementar o reemplazar métodos opcionales de una interfaz al proporcionar metadatos en lugar de
    una estructura impuesta. Considera una interfaz ActionHandler que representa una
    operación en una aplicación. Algunas implementaciones pueden necesitar un paso de configuración, mientras que otras no.
    En lugar de obligar a todas las clases que implementan ActionHandler a definir un
    método setUp(), un atributo puede indicar los requisitos de configuración. Este enfoque
    aumenta la flexibilidad, permitiendo que los atributos se apliquen varias veces cuando sea necesario.





    **Ejemplo #1 Implementación de métodos opcionales de una interfaz mediante atributos**



&lt;?php
interface ActionHandler
{
    public function execute();
}

#[Attribute]
class SetUp {}

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    #[SetUp]
    public function fileExists()
    {
        if (!file_exists($this-&gt;fileName)) {
            throw new RuntimeException("El archivo no existe");
        }
    }

    #[SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this-&gt;targetDirectory)) {
            mkdir($this-&gt;targetDirectory);
        } elseif (!is_dir($this-&gt;targetDirectory)) {
            throw new RuntimeException("El directorio de destino $this-&gt;targetDirectory no es un directorio");
        }
    }

    public function execute()
    {
        copy($this-&gt;fileName, $this-&gt;targetDirectory . '/' . basename($this-&gt;fileName));
    }
}

function executeAction(ActionHandler $actionHandler)
{
    $reflection = new ReflectionObject($actionHandler);

    foreach ($reflection-&gt;getMethods() as $method) {
        $attributes = $method-&gt;getAttributes(SetUp::class);

        if (count($attributes) &gt; 0) {
            $methodName = $method-&gt;getName();

            $actionHandler-&gt;$methodName();
        }
    }

    $actionHandler-&gt;execute();
}

$copyAction = new CopyFile();
$copyAction-&gt;fileName = "/tmp/foo.jpg";
$copyAction-&gt;targetDirectory = "/home/user";

executeAction($copyAction);








   ## Sintaxis de atributos



    La sintaxis de atributos consta de varios componentes clave. Una declaración
    de atributo comienza con #[ y termina con
    ]. Dentro de esta, se pueden listar uno o más atributos,
    separados por comas. El nombre del atributo puede ser no cualificado, cualificado
    o totalmente cualificado, como se describe en [Uso de los espacios de nombres: lo básico](#language.namespaces.basics).
    Los argumentos para el atributo son opcionales y se encierran entre paréntesis
    (). Los argumentos solo pueden ser valores literales o expresiones
    constantes. Se admite la sintaxis de argumentos posicionales y nombrados.





    Los nombres de los atributos y sus argumentos se resuelven en una clase, y los argumentos
    se pasan a su constructor cuando se solicita una instancia del atributo
    a través de la API de Reflection. Por lo tanto, se recomienda crear una clase
    para cada atributo.





    **Ejemplo #1 Sintaxis de atributos**




&lt;?php
// a.php
namespace MyExample;

use Attribute;

#[Attribute]
class MyAttribute
{
    const VALUE = 'value';

    private $value;

    public function __construct($value = null)
    {
        $this-&gt;value = $value;
    }
}

// b.php

namespace Another;

use MyExample\MyAttribute;

#[MyAttribute]
#[\MyExample\MyAttribute]
#[MyAttribute(1234)]
#[MyAttribute(value: 1234)]
#[MyAttribute(MyAttribute::VALUE)]
#[MyAttribute(array("key" =&gt; "value"))]
#[MyAttribute(100 + 200)]
class Thing
{
}

#[MyAttribute(1234), MyAttribute(5678)]
class AnotherThing
{
}









   ## Lectura de atributos con la API de Reflection



    Para acceder a los atributos de clases, métodos, funciones, parámetros, propiedades
    y constantes de clase, utiliza el método **getAttributes()** proporcionado
    por la API de Reflection. Este método devuelve un array de instancias de [ReflectionAttribute](#class.reflectionattribute).
    Estas instancias pueden consultarse para obtener el nombre del atributo, los argumentos, y
    también pueden usarse para instanciar una instancia del atributo representado.





    Separar la representación reflejada del atributo de su instancia real proporciona un mayor
    control sobre la gestión de errores, como clases de atributos faltantes, argumentos mal escritos,
    o valores ausentes. Los objetos de la clase de atributo se instancian solo después de llamar a
    [ReflectionAttribute::newInstance()](#reflectionattribute.newinstance), lo que garantiza que la validación de los argumentos
    se realice en ese momento.





    **Ejemplo #1 Lectura de atributos con la API de Reflection**




&lt;?php

#[Attribute]
class MyAttribute
{
    public $value;

    public function __construct($value)
    {
        $this-&gt;value = $value;
    }
}

#[MyAttribute(value: 1234)]
class Thing
{
}

function dumpAttributeData($reflection) {
    $attributes = $reflection-&gt;getAttributes();

    foreach ($attributes as $attribute) {
       var_dump($attribute-&gt;getName());
       var_dump($attribute-&gt;getArguments());
       var_dump($attribute-&gt;newInstance());
    }
}

dumpAttributeData(new ReflectionClass(Thing::class));
/*
string(11) "MyAttribute"
array(1) {
  ["value"]=&gt;
  int(1234)
}
object(MyAttribute)#3 (1) {
  ["value"]=&gt;
  int(1234)
}
*/





    En lugar de iterar sobre todos los atributos en la instancia de reflexión,
    puedes recuperar solo aquellos de una clase de atributo específica pasando
    el nombre de la clase de atributo como argumento.





    **Ejemplo #2 Lectura de atributos específicos utilizando la API de Reflection**




&lt;?php

function dumpMyAttributeData($reflection) {
    $attributes = $reflection-&gt;getAttributes(MyAttribute::class);

    foreach ($attributes as $attribute) {
       var_dump($attribute-&gt;getName());
       var_dump($attribute-&gt;getArguments());
       var_dump($attribute-&gt;newInstance());
    }
}

dumpMyAttributeData(new ReflectionClass(Thing::class));








   ## Declaración de clases de atributos



    Se recomienda definir una clase separada para cada atributo. En el caso más simple,
    una clase vacía con la declaración #[Attribute] es suficiente.
    El atributo puede ser importado desde el espacio de nombres global utilizando una declaración
    use.





   **Ejemplo #1 Clase de atributo simple**




&lt;?php

namespace Example;

use Attribute;

#[Attribute]
class MyAttribute
{
}





   Para restringir los tipos de declaraciones a los que se puede aplicar un atributo,
   pasa una máscara de bits como primer argumento en la declaración
   #[Attribute]





   **Ejemplo #2 Usar la especificación de destino para restringir dónde se pueden usar los atributos**




&lt;?php

namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
class MyAttribute
{
}




     Declarar **MyAttribute** en otro tipo ahora generará una excepción durante
     la llamada a [ReflectionAttribute::newInstance()](#reflectionattribute.newinstance)





   Los siguientes destinos se pueden especificar:




    - **[Attribute::TARGET_CLASS](#attribute.constants.target-class)**

    - **[Attribute::TARGET_FUNCTION](#attribute.constants.target-function)**

    - **[Attribute::TARGET_METHOD](#attribute.constants.target-method)**

    - **[Attribute::TARGET_PROPERTY](#attribute.constants.target-property)**

    - **[Attribute::TARGET_CLASS_CONSTANT](#attribute.constants.target-class-constant)**

    - **[Attribute::TARGET_PARAMETER](#attribute.constants.target-parameter)**

    - **[Attribute::TARGET_ALL](#attribute.constants.target-all)**




    Por defecto, un atributo solo se puede usar una vez por declaración. Para permitir
    que un atributo sea repetible, especifícalo en la máscara de bits de la
    declaración #[Attribute] utilizando el
    flag **[Attribute::IS_REPEATABLE](#attribute.constants.is-repeatable)**





    **Ejemplo #3 Usar IS_REPEATABLE para permitir que un atributo se use varias veces en una declaración**




&lt;?php

namespace Example;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class MyAttribute
{
}





















 # Las referencias

## Tabla de contenidos
- [¿Qué es una referencia?](#language.references.whatare)
- [¿Qué hacen las referencias?](#language.references.whatdo)
- [Lo que las referencias no son](#language.references.arent)
- [Paso por referencia](#language.references.pass)
- [Devolver referencias](#language.references.return)
- [Destruir una referencia](#language.references.unset)
- [Identificar una referencia](#language.references.spot)



  ## ¿Qué es una referencia?


   En PHP, las referencias son una forma de acceder al contenido de una misma
   variable utilizando varios nombres. Las referencias no son como los
   punteros en C: no se pueden realizar operaciones aritméticas de punteros
   sobre ellas, no son direcciones de memoria, etc.
   Se puede consultar
   [Lo que las referencias no son](#language.references.arent) para más información.
   De hecho, las referencias son alias en la
   [tabla de símbolos](#features.gc.refcounting-basics).
   Tenga en cuenta que en PHP, el nombre de una variable y su contenido son dos
   nociones distintas, lo que hace que se puedan dar
   varios nombres al mismo contenido.
   Se puede hacer la analogía con los ficheros bajo Unix, y sus nombres:
   los nombres de las variables son las entradas en un directorio, mientras
   que el contenido de la variable es el fichero en sí mismo.
   Las referencias en PHP pueden entonces ser consideradas similares
   a los enlaces bajo Unix.








  ## ¿Qué hacen las referencias?


   Existen tres principales usos de las referencias:
   la [asignación por
   referencia](#language.references.whatdo.assign), el [paso
   por referencia](#language.references.whatdo.pass)
   y el [retorno por
   referencia](#language.references.whatdo.return). Esta sección introducirá estas operaciones, con enlaces
   a más detalles.




   ### Asignación por referencia


    En este primer caso, las referencias PHP permiten que dos variables referencien el mismo contenido.
    Por ejemplo:




&lt;?php

$a =&amp; $b;

?&gt;



    Esta escritura indica que $a y $b
    apuntan al mismo contenido.
    **Nota**:



      $a y $b son completamente
      iguales aquí: no es $a quien apunta a
      $b, o viceversa. Son $a
      y $b quienes apuntan al mismo contenido.





   **Nota**:



     Si se asigna, pasa o devuelve una variable indefinida por referencia,
     se creará automáticamente.



      **Ejemplo #1 Uso de referencias con variables indefinidas**



&lt;?php

function foo(&amp;$var) {}

foo($a); // $a es "creada" y asignada a NULL

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b)); // bool(true)

$c = new stdClass();
foo($c-&gt;d);
var_dump(property_exists($c, 'd')); // bool(true)

?&gt;






    La misma sintaxis puede ser utilizada con las funciones que
    devuelven referencias:




&lt;?php

$foo =&amp; find_var($bar);

?&gt;





    Utilizar la misma sintaxis con una función que *no*
    devuelve por referencia generará un error, al igual que utilizarla con el
    resultado del operador [new](#language.oop5.basic.new).
    Aunque los objetos se pasan como punteros, esto no es idéntico a las referencias como se explica en la sección los
    [Objetos y referencias](#language.oop5.references).



   **Advertencia**

     Si se asigna una referencia a una variable declarada como global
     en una función, la referencia solo será visible dentro de la función.
     Se puede evitar esto utilizando el array [$GLOBALS](#reserved.variables.globals).



      **Ejemplo #2 Referenciar variables globales desde funciones**



&lt;?php

$var1 = "Variable Ejemplo";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;

    if (!$use_globals) {
        $var2 =&amp; $var1; // visible solo en la función
    } else {
        $GLOBALS["var2"] =&amp; $var1; // visible también en el contexto global
    }
}

global_references(false);
echo "var2 está definido como '$var2'\n"; // var2 está definido como ''

global_references(true);
echo "var2 está definido como '$var2'\n"; // var2 está definido como 'Variable Ejemplo'

?&gt;



     Vea global $var; como un atajo para $var
     =&amp; $GLOBALS['var'];. Por lo tanto, asignar otra referencia a
     $var solo modifica la referencia local de la variable.


   **Nota**:



     Si se asigna un valor a una variable que tiene referencias en una estructura
     [foreach](#control-structures.foreach), las referencias también serán modificadas.



      **Ejemplo #3 Referencias y estructura foreach**



&lt;?php

$ref = 0;
$row =&amp; $ref;

foreach (array(1, 2, 3) as $row) {
    // hacer algo
}

echo $ref; // 3 - el último elemento del array iterado

?&gt;






    Aunque no es estrictamente una asignación por referencia, las expresiones
    creadas con la estructura de lenguaje
    [array()](#function.array) pueden también
    comportarse como tales, prefijando con &amp; el elemento del array.
    Aquí hay un ejemplo:




&lt;?php

$a = 1;
$b = array(2, 3);
$arr = array(&amp;$a, &amp;$b[0], &amp;$b[1]);
$arr[0]++;
$arr[1]++;
$arr[2]++;
/* $a == 2, $b == array(3, 4); */

?&gt;





    Note que las referencias dentro de los arrays pueden resultar
    peligrosas. Utilizar una asignación normal (no por referencia) con una
    referencia a la derecha del operador no transforma la parte izquierda de la asignación
    en referencia, pero las referencias dentro de los arrays son preservadas. Esto
    se aplica también a las llamadas de funciones con un array pasado por valor. Ejemplo:




&lt;?php

/* Asignación de variables escalares */
$a = 1;
$b =&amp; $a;
$c = $b;
$c = 7; // $c no es una referencia; no hay cambio en $a o $b

/* Asignación de variables de tipo array */
$arr = array(1);
$a =&amp; $arr[0]; // $a y $arr[0] son referencias al mismo valor
$arr2 = $arr; // NO es una asignación por referencia!
$arr2[0]++;
/* $a == 2, $arr == array(2) */
/* ¡Los contenidos de $arr son cambiados aunque no fuera una referencia! */

?&gt;



    En otras palabras, desde el punto de vista de las referencias, el comportamiento de los arrays
    está definido elemento por elemento; el comportamiento
    de cada elemento
    es independiente del estado de referencia del array que los contiene.



   ### Paso por referencia


    El segundo interés de las referencias es
    permitir pasar variables por referencia. Esto se realiza haciendo
    referenciar el mismo contenido por una variable local a una función y por una
    variable del contexto llamante.
    Por ejemplo:




&lt;?php

function foo(&amp;$var) {
  $var++;
}
$a=5;
foo($a);

?&gt;



    Después de la ejecución de esta porción de código, $a vale 6.
    Esto se debe a que, en la función foo, la
    variable $var apunta al mismo contenido que
    $a.
    Para más información sobre este tema, se puede consultar la sección
    [paso por referencia](#language.references.pass).



   ### Retorno por referencia


    El tercer interés de las referencias es permitir el
    [retorno de valores por
     referencia](#language.references.return).









  ## Lo que las referencias no son


   Como se ha visto anteriormente, las referencias no
   son punteros. Esto significa que el script siguiente no hará
   lo que se espera:




&lt;?php

function foo(&amp;$var) {
  $var =&amp; $GLOBALS["baz"];
}

foo($bar);

?&gt;





   Aquí, la variable $var en la función foo estará ligada
   a $bar en el llamante, pero luego estará ligada a
   [$GLOBALS["baz"]](#reserved.variables.globals).
   No es posible ligar $bar a otra cosa utilizando
   el mecanismo de referencias, ya que $bar no es accesible en la
   función foo (aunque está representada por $var,
   $var solo hace referencia al valor, y no tiene una ligadura en la
   [tabla de símbolos](#features.gc.refcounting-basics) del llamante).
   Se puede utilizar el [retorno por
   referencia](#language.references.return) para referenciar variables seleccionadas por la función.








  ## Paso por referencia


   Se puede pasar una variable por referencia a una función, de
   manera que esta pueda modificarla.
   La sintaxis es la siguiente:




&lt;?php

function foo(&amp;$var) {
  $var++;
}
$a=5;

foo ($a);
// $a vale 6 ahora

?&gt;



   **Nota**:

     No hay signo de referencia en la llamada de la
     función, solo en su definición. La definición de la
     función en sí misma es suficiente para pasar correctamente
     argumentos por referencia.






   Los siguientes datos pueden ser pasados por referencia:



    -

      Una variable, como en foo($a)



    -

      Una referencia devuelta por una función:




&lt;?php

function foo(&amp;$var)
{
    $var++;
}

function &amp;bar()
{
 $a = 5;
 return $a;
}

foo(bar());

?&gt;



      Para más información, ver los detalles en
      [retorno por
       referencia](#language.references.return).






   Todas las otras expresiones no deben ser pasadas por
   referencia, ya que el resultado será indefinido. Por ejemplo,
   los siguientes pasos por referencia son inválidos:




&lt;?php

function foo(&amp;$var)
{
    $var++;
}

function bar() // Note la ausencia de &amp;
{
   $a = 5;
   return $a;
}

foo(bar());    // Produce una notificación

foo($a = 5);    // Expresión, no una variable
foo(5);         // Produce un error fatal

class Foobar{}

foo(new Foobar()) // Produce una notificación desde PHP 7.0.7
                  // Notificación: Solo las variables deben ser pasadas por referencia.
?&gt;










  ## Devolver referencias


   Devolver referencias es útil cuando se
   quiere utilizar una función para determinar a qué variable
   debe estar ligada una referencia.
   No utilice *no*
   el retorno por referencia para mejorar el rendimiento,
   el motor es suficientemente robusto para optimizar esto
   internamente. Devuelva referencias solo
   cuando haya buenas razones técnicas
   para hacerlo. Para devolver referencias, utilice esta sintaxis:




&lt;?php

class Foo
{
    public $value = 42;

    public function &amp;getValue()
    {
        return $this-&gt;value;
    }
}

$obj = new Foo();
$myValue = &amp;$obj-&gt;getValue(); // $myValue es una referencia de $obj-&gt;value, que vale 42.
$obj-&gt;value = 2;
echo $myValue;                // muestra el nuevo valor de $obj-&gt;value, es decir, 2.

?&gt;



   En este ejemplo, se asigna un valor a la propiedad del objeto
   devuelta por la función getValue, y no a su copia,
   como sería el caso si no se hubiera utilizado la sintaxis de referencia.

  **Nota**:

    A diferencia del paso de parámetro, aquí, se debe utilizar
    &amp; en ambos lugares, tanto para
    indicar que se devuelve por referencia (no por copia), como
    para indicar que también se asigna por referencia (no por copia
    tampoco) para la variable $myValue.




  **Nota**:

    Si se intenta devolver una referencia desde una función
    con la sintaxis: return ($this-&gt;value);,
    esto no funcionará *no* como
    se espera, y devolverá el resultado de la *expresión*,
    y no de la variable, por referencia. Solo se pueden devolver
    variables por referencia desde una función, y nada más.





   Para utilizar la referencia devuelta, se debe utilizar la asignación
   por referencia:




&lt;?php

function &amp;collector()
{
    static $collection = array();
    return $collection;
}

$collection = &amp;collector();
// Ahora, la variable $collection es una variable por referencia que referencia el array static dentro de la función

$collection[] = 'foo';

print_r(collector());
// Array
// (
//    [0] =&gt; foo
// )

?&gt;



   **Nota**:

        Si la asignación se realiza sin el símbolo &amp;,
        por ejemplo $collection = collector();,
        la variable $collection recibirá una copia del valor,
        y no la referencia devuelta por la función.




   Para pasar la referencia devuelta a otra función que espera una referencia,
   se puede utilizar la siguiente sintaxis:


&lt;?php

function &amp;collector()
{
  static $collection = array();
  return $collection;
}

array_push(collector(), 'foo');

?&gt;




  **Nota**:

    Note que array_push(&amp;collector(), 'foo');
    *no funcionará*, y resultará en un error
    fatal.









  ## Destruir una referencia


   Cuando se destruye una referencia, solo se rompe el enlace entre el nombre de la variable y su contenido.
   Esto no significa que el contenido de la variable sea destruido. Por ejemplo:




&lt;?php

$a = 1;
$b =&amp; $a;
unset($a);

?&gt;



   Este ejemplo no destruirá $b, solo
   $a.


   Una vez más, se puede comparar esta acción con la llamada
   **unlink** de Unix.








  ## Identificar una referencia


   Muchas sintaxis de PHP están implementadas a través del
   mecanismo de referencia, y todo lo que se ha visto en cuanto a las ligaduras entre variables
   se aplica a estas sintaxis. Algunas construcciones, como el paso
   de argumentos y el retorno por referencia, han sido mencionadas anteriormente.
   Otras construcciones que utilizan referencias son las siguientes:





   ### Referencias globales


    Cuando se declara una variable como **global $var**,
    se crea en realidad una referencia a una variable
    global. En otras palabras, esto es lo mismo que:




&lt;?php

$var =&amp; $GLOBALS["var"];

?&gt;





    Esto también significa que destruir la variable $var no resultará
    en la destrucción de la variable global.





















 # Variables predefinidas





   PHP proporciona variables predefinidas que representan
   [variables externas](#language.variables.external),
   variables de entorno integradas y otra información sobre el entorno
   de ejecución, tales como el número y los valores de los argumentos pasados al
   script en el entorno CLI.











  # Las Superglobales

  Las Superglobales — Variables internas siempre disponibles, independientemente del contexto






  ### Descripción


   Varios arrays predefinidos en PHP son "superglobales", lo que significa
   que están disponibles independientemente del contexto del script.
   No es necesario utilizar **global $variable;** antes de acceder
   a ellas en funciones o métodos.




   Las variables superglobales son:



    - [$GLOBALS](#reserved.variables.globals)

    - [$_SERVER](#reserved.variables.server)

    - [$_GET](#reserved.variables.get)

    - [$_POST](#reserved.variables.post)

    - [$_FILES](#reserved.variables.files)

    - [$_COOKIE](#reserved.variables.cookies)

    - [$_SESSION](#reserved.variables.session)

    - [$_REQUEST](#reserved.variables.request)

    - [$_ENV](#reserved.variables.environment)







  ### Notas

  **Nota**:
   **Disponibilidad de las variables**



    Por omisión, todas las superglobales están disponibles, y solo
    las directivas de configuración pueden hacerlas no disponibles.
    Para más información, consulte la documentación sobre
    el [orden de las variables](#ini.variables-order).




  **Nota**:
   **Variables variables**



    Las superglobales no pueden ser utilizadas como
    [variables dinámicas](#language.variables.variable)
    en una función o método de una clase.








  ### Ver también





    - El [ámbito de las variables](#language.variables.scope)

    - La directiva [variables_order](#ini.variables-order)

    - [La extensión sobre los filtros](#book.filter)


















  # $GLOBALS

  (PHP 4, PHP 5, PHP 7, PHP 8)

$GLOBALS — Hace referencia a todas las variables disponibles en un contexto global






  ### Descripción


   Un array asociativo que contiene referencias a todas las variables
   globales actualmente definidas en el contexto de ejecución global del
   script. Los nombres de las variables son los índices del array.







  ### Ejemplos





    **Ejemplo #1 Ejemplo con $GLOBALS**



&lt;?php

function test()
{
    $foo = "variable local";

    echo '$foo en el contexto global : ' . $GLOBALS["foo"] . "\n";
    echo '$foo en el contexto actual : ' . $foo . "\n";
}

$foo = "Contenido de ejemplo";
test();

?&gt;


    Resultado del ejemplo anterior es similar a:



$foo en el contexto global : Contenido de ejemplo
$foo en el contexto actual : variable local




  **Advertencia**

    A partir de PHP 8.1.0, el acceso en escritura al array entero
    $GLOBALS ya no es soportado:



     **Ejemplo #2 Escribir en el array entero $GLOBALS resultará en un error.**



&lt;?php

// Genera un error durante la compilación:
$GLOBALS = [];
$GLOBALS += [];
$GLOBALS =&amp; $x;
$x =&amp; $GLOBALS;
unset($GLOBALS);
array_pop($GLOBALS);
// ...y cualquier otra operación de escritura/lectura-escritura en $GLOBALS

?&gt;









  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.



  **Nota**:
   **Disponibilidad de las variables**



    A diferencia de todas las demás
    [superglobales](#language.variables.superglobals),
    $GLOBALS siempre ha estado disponible en PHP.




  **Nota**:



    A partir de PHP 8.1.0, $GLOBALS es ahora una
    copia de solo lectura del [array de símbolos](#features.gc.refcounting-basics)
    global.
    Es decir, las variables globales no pueden ser modificadas a través de su copia.
    Anteriormente, el array $GLOBALS estaba excluido del
    comportamiento habitual por valor de los arrays de PHP y las variables globales
    podían ser modificadas a través de su copia.




&lt;?php

// Antes de PHP 8.1.0
$a = 1;

$globals = $GLOBALS; // Copia ostensiblemente por valor
$globals['a'] = 2;
var_dump($a); // int(2)

// A partir de PHP 8.1.0
// esto ya no modifica $a. El comportamiento anterior violaba la semántica por valor.
$globals = $GLOBALS;
$globals['a'] = 1;

// Para restaurar el comportamiento anterior, iterar su copia y asignar cada propiedad de vuelta a $GLOBALS.
foreach ($globals as $key =&gt; $value) {
    $GLOBALS[$key] = $value;
}

?&gt;





















  # $_SERVER

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_SERVER — Variables de servidor y de ejecución






  ### Descripción


   $_SERVER es un [array](#language.types.array) que contiene información
   como encabezados, rutas y ubicaciones de script.
   Las entradas de este array son creadas por el servidor web, por lo que no hay
   garantía de que cada servidor web proporcione toda esta información;
   los servidores pueden omitir algunas o proporcionar otras no listadas aquí.
   Sin embargo, la mayoría de estas variables están contempladas en la especificación
   [» CGI/1.1](https://datatracker.ietf.org/doc/html/rfc3875) y es probable que estén definidas.



  **Nota**:

     Cuando PHP se ejecuta en línea de comandos [command line](#features.commandline),
     la mayoría de estas entradas no estarán disponibles o no tendrán sentido.





   Además de los elementos enumerados a continuación, PHP creará elementos adicionales
   con valores provenientes de los encabezados de la petición. Estas entradas se nombrarán
   HTTP_ seguido del nombre del encabezado,
   en mayúsculas y con guiones bajos en lugar de guiones.
   Por ejemplo, el encabezado Accept-Language estará
   disponible como $_SERVER['HTTP_ACCEPT_LANGUAGE'].







  ### Índices







     'PHP_SELF'


       El nombre del archivo del script en ejecución, relativo
       a la raíz web.
       Por ejemplo, $_SERVER['PHP_SELF'] en el script
       ubicado en http://example.com/foo/bar.php
       será /foo/bar.php.
       La constante [__FILE__](#language.constants.magic)
       contiene la ruta completa y el nombre del archivo (incluido) actual.


       Si PHP funciona en línea de comandos,
       esta variable contiene el nombre del script.





     '[argv](#reserved.variables.argv)'


       Array de argumentos pasados al script. Cuando el script
       es llamado en línea de comandos, esto da acceso
       a los argumentos, como en lenguaje C. Cuando el script es
       llamado con el método GET, este array contendrá la cadena de consulta.





     '[argc](#reserved.variables.argc)'


       Contiene el número de parámetros de línea de comandos
       pasados al script (si el script funciona en línea de comandos).





     'GATEWAY_INTERFACE'


       Número de revisión de la interfaz CGI del servidor.
       Por ejemplo 'CGI/1.1'.





     'SERVER_ADDR'


       La dirección IP del servidor bajo el cual el script actual está siendo ejecutado.





     'SERVER_NAME'


       El nombre del servidor host que ejecuta el script siguiente.
       Si el script es ejecutado en un host virtual, esto será
       el valor definido para ese host virtual.

      **Nota**:

        En Apache 2, UseCanonicalName = On y
        ServerName deben ser definidos.
        De lo contrario, este valor refleja el nombre de host proporcionado por el cliente, que puede ser falsificado.








     'SERVER_SOFTWARE'


       Cadena de identificación del servidor, que es dada en
       los encabezados al responder a las peticiones.





     'SERVER_PROTOCOL'


       Nombre y revisión del protocolo de comunicación; por ejemplo HTTP/1.0;





     'REQUEST_METHOD'


       Método de petición utilizado para acceder a la página;
       por ejemplo GET, HEAD,
       POST, PUT.

      **Nota**:



        El script PHP termina después de enviar los encabezados (es decir, después
        de producir cualquier salida sin bufferización de salida) si
        el método de la petición era HEAD.








     'REQUEST_TIME'


       El timestamp Unix del inicio de la petición.





     'REQUEST_TIME_FLOAT'


       El timestamp del inicio de la petición, con precisión a microsegundos.





     'QUERY_STRING'


       La cadena de consulta, si existe, que es
       utilizada para acceder a la página.





     'DOCUMENT_ROOT'


       La raíz bajo la cual el script actual está siendo ejecutado,
       como se define en la configuración del servidor.





     'HTTPS'


       Definido a un valor no vacío si el script fue llamado vía el protocolo HTTPS.





     'REMOTE_ADDR'


       La dirección IP del cliente que solicita la página actual.





     'REMOTE_HOST'


       El nombre del host que lee el script actual. La resolución
       DNS inversa se basa en el valor de REMOTE_ADDR.

      **Nota**:

        El servidor web debe estar configurado para crear esta variable.
        Por ejemplo, en Apache, HostnameLookups On debe ser definido
        dentro de httpd.conf para que exista. Ver también
        [gethostbyaddr()](#function.gethostbyaddr).








     'REMOTE_PORT'


       El puerto utilizado por la máquina cliente para comunicarse
       con el servidor web.





     'REMOTE_USER'


       El usuario autenticado.





     'REDIRECT_REMOTE_USER'


       El usuario autenticado si la petición fue redirigida internamente.





     'SCRIPT_FILENAME'


       La ruta absoluta hacia el archivo que contiene el script en ejecución.


**Nota**:



         Si un script es ejecutado con el CLI, con una ruta relativa,
         como file.php o
         ../file.php,
         $_SERVER['SCRIPT_FILENAME']
         contendrá la ruta relativa especificada por el usuario.









     'SERVER_ADMIN'


       El valor dado a la directiva SERVER_ADMIN
       (para Apache), en el archivo de configuración. Si el script
       es ejecutado por un host virtual, esto será la
       valor definido por el host virtual.





     'SERVER_PORT'


       El puerto de la máquina servidor utilizado para las
       comunicaciones. Por defecto, es '80'. Usando
       SSL, por ejemplo, será reemplazado por el número
       de puerto HTTP seguro.

      **Nota**:

        En Apache 2, UseCanonicalName = On, así como
        UseCanonicalPhysicalPort = On deben ser definidos
        para obtener el puerto físico real, de lo contrario este valor puede ser
        falsificado y puede o no devolver el valor del puerto físico.








     'SERVER_SIGNATURE'


       Cadena que contiene el número de versión del servidor
       y el nombre de host virtual, que son añadidos a
       las páginas generadas por el servidor, si esta
       opción está activada.





     'PATH_TRANSLATED'


       Ruta en el sistema de archivos (no el document-root)
       hasta el script actual, una vez que el servidor ha hecho
       una traducción de ruta virtual a real.

      **Nota**:

        Los usuarios de Apache 2 deben usar AcceptPathInfo = On
        en su httpd.conf para definir PATH_INFO.








     'SCRIPT_NAME'


       Contiene el nombre del script actual. Esto sirve cuando
       las páginas deben llamarse a sí mismas.
       La constante [__FILE__](#language.constants.magic)
       contiene la ruta completa y el nombre del archivo (incluido) actual.





     'REQUEST_URI'


       El URI que fue proporcionado para acceder
       a esta página. Por ejemplo: '/index.html'.





     'PHP_AUTH_DIGEST'


       Cuando se utiliza la autenticación HTTP Digest,
       esta variable es definida en el encabezado "Authorization"
       enviado por el cliente (que debe ser utilizado para
       realizar la validación apropiada).





     'PHP_AUTH_USER'


       Cuando se utiliza la autenticación HTTP,
       esta variable es definida al usuario proporcionado por el usuario.





     'PHP_AUTH_PW'


       Cuando se utiliza la autenticación HTTP,
       esta variable es definida a la contraseña proporcionada por el usuario.





     'AUTH_TYPE'


       Cuando se utiliza la autenticación HTTP,
       esta variable es definida al tipo de identificación.





     'PATH_INFO'


       Contiene la información sobre el nombre de la ruta proporcionada por el cliente
       respecto al nombre del archivo que ejecuta el script actual, sin
       la cadena relativa a la consulta si existe. Actualmente,
       si el script actual es ejecutado vía el URI
       http://www.example.com/php/path_info.php/some/stuff?foo=bar,
       entonces la variable $_SERVER['PATH_INFO'] contendrá
       /some/stuff.





     'ORIG_PATH_INFO'


       Versión original de 'PATH_INFO' antes de ser analizada
       por PHP.











  ### Ejemplos





    **Ejemplo #1 Ejemplo con $_SERVER**



&lt;?php
echo $_SERVER['SERVER_NAME'];
?&gt;


    Resultado del ejemplo anterior es similar a:



www.example.com








  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.







  ### Ver también





    - [La extensión sobre filtros](#book.filter)


















  # $_GET

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_GET — Variables la cadena de consulta






  ### Descripción


   Un array asociativo de variables pasado al script actual
   vía parámetros URL (también conocida como cadena de consulta).
   Tenga en cuenta que el array no solo se rellena para las solicitudes GET,
   sino para todas las solicitudes con una cadena de consulta.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de $_GET**



&lt;?php
echo '¡Hola ' . htmlspecialchars($_GET["name"]) . '!';
?&gt;



     Asumiendo que el usuario introdujo http://example.com/?name=Hannes



    Resultado del ejemplo anterior es similar a:



¡Hola Hannes!








  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.



  **Nota**:



    Las valores en $_GET son pasados automáticamente vía [urldecode()](#function.urldecode).








  ### Ver también





    - [Manejo de variables externas](#language.variables.external)

    - [La extensión filter](#book.filter)



















  # $_POST

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_POST — Datos de formulario de solicitudes HTTP POST






  ### Descripción


   Un array asociativo de variables pasadas al script actual
   a través del método POST de HTTP cuando se emplea application/x-www-form-urlencoded
   o multipart/form-data como Content-Type de HTTP en la petición.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de $_POST**



&lt;?php
echo '¡Hola ' . htmlspecialchars($_POST["name"]) . '!';
?&gt;



     Asumiendo que el usuario envió una solicitud POST con name=Hannes en el cuerpo.



    Resultado del ejemplo anterior es similar a:



¡Hola Hannes!








  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.



  **Nota**:

    Para leer datos enviados mediante POST con otros tipos de contenido (por ejemplo,
    application/json o application/xml),
    se debe utilizar [php://input](#wrappers.php.input).
    A diferencia de $_POST, que solo funciona con
    application/x-www-form-urlencoded y
    multipart/form-data, php://input
    proporciona acceso directo a los datos sin procesar del cuerpo de la solicitud.








  ### Ver también





    - [Manejo de variables externas](#language.variables.external)

    - [La extensión filter](#book.filter)




















  # $_FILES

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_FILES — Variables de subida de ficheros HTTP






  ### Descripción


   Un [array](#language.types.array) asociativo de elementos subidos al script en curso
   a través del método POST. La estructura de este array se resume en la
   sección
   [Subidas con el método POST](#features.file-upload.post-method).







  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.







  ### Ver también





    - [move_uploaded_file()](#function.move-uploaded-file) - Mueve un archivo subido a una nueva ubicación

    - [Manejo de subida de ficheros](#features.file-upload)




















  # $_REQUEST

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_REQUEST — Variables HTTP Request






  ### Descripción


   Un [array](#language.types.array) asociativo que por defecto contiene el contenido de
   [$_GET](#reserved.variables.get),
   [$_POST](#reserved.variables.post) y
   [$_COOKIE](#reserved.variables.cookies).







  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.



  **Nota**:



    Cuando se ejecuta en la [línea de comandos
    ](#features.commandline), *no* se incluirán las entradas
    [argv](#reserved.variables.argv) y
    [argc](#reserved.variables.argc); ya que están
    presentes en el [array](#language.types.array)
    [$_SERVER](#reserved.variables.server)




  **Nota**:



    Las variables en $_REQUEST se proporcionan al
    script a través de los mecanismos de entrada GET, POST, y COOKIE y
    por lo tanto pueden ser manipulados por el usuario remoto y no debe
    confiar en el contenido. La presencia y el orden de las variables listadas
    en este array se definen según la directiva de configuración
    PHP [request_order](#ini.request-order), y
    [variables_order](#ini.variables-order).








  ### Ver también


   - [Tratando con variables externas](#language.variables.external)

   - [La extensión filter](#book.filter)


















  # $_SESSION

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_SESSION — Variables de sesión






  ### Descripción


   Es un array asociativo que contiene variables de sesión disponibles para
   el script actual. Ver la documentación de [Funciones de sesión](#ref.session)
   para más información sobre su uso.







  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.







  ### Ver también





    - [session_start()](#function.session-start) - Inicia una nueva sesión o reanuda una sesión existente



















  # $_ENV

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_ENV — Variables de entorno






  ### Descripción


   Una variable tipo [array](#language.types.array) asociativo de variables pasadas al
   script actual a través del método del entorno.





   Estas variables son importadas en el espacio de nombres global de PHP
   desde el entorno bajo el que está siendo ejecutado el intérprete PHP.
   Muchas son entregadas por el intérprete de comandos bajo el que PHP está
   corriendo y diferentes sistemas suelen tener diferentes tipos de
   intérpretes de comandos, una lista definitiva es imposible. Por favor
   consulte la documentación de su intérprete de comandos para una lista de
   las variables de entorno que se definen.





   Otras variables de entorno incluyen las variables CGI, colocadas allí
   independientemente de que PHP esté siendo ejecutado como módulo del
   servidor o procesador CGI.








  ### Ejemplos





    **Ejemplo #1 Ejemplo de $_ENV**



&lt;?php
echo '¡Mi nombre de usuario es ' . $_ENV["USER"] . '!';
?&gt;



     Asumiendo que "bjori" ejecuta este script



    Resultado del ejemplo anterior es similar a:



¡Mi nombre de usuario es bjori!








  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.







  ### Ver también





    - [getenv()](#function.getenv) - Retorna el valor de una o todas las variables de entorno

    - [La extensión filter](#book.filter)




















  # $_COOKIE

  (PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

$_COOKIE — Cookies HTTP






  ### Descripción


   Una variable tipo [array](#language.types.array) asociativo de variables pasadas al
   script actual a través de Cookies HTTP.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de $_COOKIE**



&lt;?php
echo '¡Hola ' . htmlspecialchars($_COOKIE["nombre"]) . '!';
?&gt;



     Asumiendo que la cookie "nombre" ha sido definida anteriormente



    Resultado del ejemplo anterior es similar a:



¡Hola Juan!








  ### Notas

  **Nota**:


 Esto es una 'superglobal', o variable global automática. Esto significa simplemente que esta variable
 está disponible en todos los contextos del script. No es necesario hacer **global $variable;**
 para acceder a ella en las funciones o los métodos.







  ### Ver también





    - [setcookie()](#function.setcookie) - Envía una cookie

    - [Gestión de variables
    externas](#language.variables.external)

    - [La extensión filter](#book.filter)



















  # $php_errormsg

  (PHP 4, PHP 5, PHP 7)

$php_errormsg — El último mensaje de error






  **Advertencia**
 Esta funcionalidad está *OBSOLETA* a partir de PHP 7.2.0,
 y *ELIMINADA* a partir de PHP 8.0.0.
 Depender de esta funcionalidad está altamente desaconsejado.




   Utilice [error_get_last()](#function.error-get-last) en su lugar.






  ### Descripción


   $php_errormsg es una variable que contiene el texto
   del último error generado por PHP. Esta variable será únicamente
   accesible en el mismo contexto de ejecución que el de la línea
   que generó el error, y únicamente si la directiva de configuración
   [track_errors](#ini.track-errors) está activada (se encuentra
   desactivada por omisión).



  **Advertencia**

    Si un gestor de errores definido por el usuario está activo
    ([set_error_handler()](#function.set-error-handler)), $php_errormsg solo será
    definido si el gestor de errores devuelve **[false](#constant.false)**.








  ### Historial de cambios








       Versión
       Descripción






       8.0.0

        La directiva [track_errors](#ini.track-errors) que
        hace que $php_errormsg esté disponible ha sido eliminada.




       7.2.0

        La directiva [track_errors](#ini.track-errors) que
        hace que $php_errormsg esté disponible ha sido
        marcada como obsoleta.












  ### Ejemplos





    **Ejemplo #1 Ejemplo con $php_errormsg**



&lt;?php
@strpos();
echo $php_errormsg;
?&gt;


    Resultado del ejemplo anterior es similar a:



Wrong parameter count for strpos()








  ### Ver también





    - [error_get_last()](#function.error-get-last) - Obtener el último error que ocurrió



















  # $http_response_header

  (PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

$http_response_header — Cabeceras de respuesta HTTP






  **Advertencia**Esta característica está
*OBSOLETA* a partir de PHP 8.5.0. Depender de esta característica
está altamente desaconsejado.



   Utilice [http_get_last_response_headers()](#function.http-get-last-response-headers) en su lugar.






  ### Descripción


   El array $http_response_header es similar a la función
   [get_headers()](#function.get-headers). Al utilizar el
   [gestor HTTP](#wrappers.http),
   $http_response_header será rellenado con las cabeceras
   de respuesta HTTP.
   $http_response_header será creado con un [
   ámbito local](#language.variables.scope).







  ### Ejemplos





    **Ejemplo #1 Ejemplo con $http_response_header**



&lt;?php
function get_contents() {
  file_get_contents("http://example.com");
  var_dump($http_response_header); // La variable es rellenada en el ámbito local
}
get_contents();
var_dump($http_response_header); // Una llamada a get_contents() no rellena la variable fuera del ámbito de la función
?&gt;


    Resultado del ejemplo anterior es similar a:



array(9) {
  [0]=&gt;
  string(15) "HTTP/1.1 200 OK"
  [1]=&gt;
  string(35) "Date: Sat, 12 Apr 2008 17:30:38 GMT"
  [2]=&gt;
  string(29) "Server: Apache/2.2.3 (CentOS)"
  [3]=&gt;
  string(44) "Last-Modified: Tue, 15 Nov 2005 13:24:10 GMT"
  [4]=&gt;
  string(27) "ETag: "280100-1b6-80bfd280""
  [5]=&gt;
  string(20) "Accept-Ranges: bytes"
  [6]=&gt;
  string(19) "Content-Length: 438"
  [7]=&gt;
  string(17) "Connection: close"
  [8]=&gt;
  string(38) "Content-Type: text/html; charset=UTF-8"
}

Warning: Undefined variable $http_response_header
NULL








  ### Ver también


   - [http_get_last_response_headers()](#function.http-get-last-response-headers) - Obtiene los últimos encabezados de respuesta HTTP

   - [http_clear_last_response_headers()](#function.http-clear-last-response-headers) - Borra los encabezados de respuesta HTTP almacenados
















  # $argc

  (PHP 4, PHP 5, PHP 7, PHP 8)

$argc — El número de argumentos pasados a un script






  ### Descripción


   Contiene el número de argumentos pasados al script actual cuando se ejecuta
   desde la [línea de comandos](#features.commandline).



  **Nota**:

    El nombre del script es pasado siempre como argumento del script, por lo tanto,
    el valor mínimo de $argc es 1.




  **Nota**:

    Esta variable sólo está disponible cuando [register_argc_argv](#ini.register-argc-argv)
    está activado.








  ### Ejemplos





    **Ejemplo #1 Ejemplo de $argc**



&lt;?php
var_dump($argc);
?&gt;



     Cuando se ejecuta el ejemplo con: php script.php arg1 arg2 arg3



    Resultado del ejemplo anterior es similar a:



int(4)








  ### Notas

  **Nota**:



    Esto también está disponible como [$_SERVER['argc']](#reserved.variables.server).








  ### Ver también





    - [getopt()](#function.getopt) - Lee las opciones pasadas en la línea de comandos

    - [<a href="#reserved.variables.argv" class="classname">$argv](#reserved.variables.argv)</a>




















  # $argv

  (PHP 4, PHP 5, PHP 7, PHP 8)

$argv — Array de argumentos pasados al script






  ### Descripción


   Contiene un [array](#language.types.array) de todos los argumentos pasados al script cuando es llamado
   desde la [línea de comandos](#features.commandline).



  **Nota**:

    El primer argumento $argv[0] siempre es el nombre
    que se ha utilizado para ejecutar el script.




  **Nota**:

    Esta variable no está disponible cuando
    [register_argc_argv](#ini.register-argc-argv)
    está desactivado.




  **Advertencia**

    Para verificar si un script es ejecutado desde la línea
    de comandos, se recomienda utilizar [php_sapi_name()](#function.php-sapi-name)
    en lugar de verificar si $argv o
    [$_SERVER['argv']](#reserved.variables.server) está definido.








  ### Ejemplos





    **Ejemplo #1 Ejemplo con $argv**



&lt;?php
var_dump($argv);
?&gt;



     Cuando se ejecuta el ejemplo con el comando: php script.php arg1 arg2 arg3



    Resultado del ejemplo anterior es similar a:



array(4) {
  [0]=&gt;
  string(10) "script.php"
  [1]=&gt;
  string(4) "arg1"
  [2]=&gt;
  string(4) "arg2"
  [3]=&gt;
  string(4) "arg3"
}








  ### Notas

  **Nota**:



    También disponible en [$_SERVER['argv']](#reserved.variables.server).








  ### Ver también





    - [getopt()](#function.getopt) - Lee las opciones pasadas en la línea de comandos

    - [<a href="#reserved.variables.argc" class="classname">$argc](#reserved.variables.argc)</a>













## Tabla de contenidos
- [Las Superglobales](#language.variables.superglobals) — Variables internas siempre disponibles, independientemente del contexto
- [$GLOBALS](#reserved.variables.globals) — Hace referencia a todas las variables disponibles en un contexto global
- [$_SERVER](#reserved.variables.server) — Variables de servidor y de ejecución
- [$_GET](#reserved.variables.get) — Variables la cadena de consulta
- [$_POST](#reserved.variables.post) — Datos de formulario de solicitudes HTTP POST
- [$_FILES](#reserved.variables.files) — Variables de subida de ficheros HTTP
- [$_REQUEST](#reserved.variables.request) — Variables HTTP Request
- [$_SESSION](#reserved.variables.session) — Variables de sesión
- [$_ENV](#reserved.variables.environment) — Variables de entorno
- [$_COOKIE](#reserved.variables.cookies) — Cookies HTTP
- [$php_errormsg](#reserved.variables.phperrormsg) — El último mensaje de error
- [$http_response_header](#reserved.variables.httpresponseheader) — Cabeceras de respuesta HTTP
- [$argc](#reserved.variables.argc) — El número de argumentos pasados a un script
- [$argv](#reserved.variables.argv) — Array de argumentos pasados al script













 # Excepciones predefinidas

## Tabla de contenidos
- [Exception](#class.exception)
- [ErrorException](#class.errorexception)
- [ClosedGeneratorException](#class.closedgeneratorexception)
- [Error](#class.error)
- [ArgumentCountError](#class.argumentcounterror)
- [ArithmeticError](#class.arithmeticerror)
- [AssertionError](#class.assertionerror)
- [DivisionByZeroError](#class.divisionbyzeroerror)
- [CompileError](#class.compileerror)
- [ParseError](#class.parseerror)
- [TypeError](#class.typeerror)
- [ValueError](#class.valueerror)
- [UnhandledMatchError](#class.unhandledmatcherror)
- [FiberError](#class.fibererror)
- [RequestParseBodyException](#class.requestparsebodyexception)





   Véase también las [excepciones SPL](#spl.exceptions).









 # Exception



 (PHP 5, PHP 7, PHP 8)





   ## Introducción


    **Exception** es la clase base
    para todas las excepciones de usuario.







   ## Sinopsis de la Clase





     class **Exception**



     implements
      [Throwable](#class.throwable) {

    /* Propiedades */

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

   public [__construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [getMessage](#exception.getmessage)(): [string](#language.types.string)
final public [getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [getCode](#exception.getcode)(): [int](#language.types.integer)
final public [getFile](#exception.getfile)(): [string](#language.types.string)
final public [getLine](#exception.getline)(): [int](#language.types.integer)
final public [getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [__toString](#exception.tostring)(): [string](#language.types.string)
private [__clone](#exception.clone)(): [void](language.types.void.html)

   }







   ## Propiedades



     message

      El mensaje de la excepción





     code

      El código de la excepción





     file

      El nombre del fichero en el cual la excepción ha sido creada





     line

      La línea donde la excepción ha sido creada





     previous

      La excepción lanzada previamente





     string

      La representación en forma de string de la traza de la pila





     trace

      La traza de la pila en forma de array















  # Exception::__construct

  (PHP 5, PHP 7, PHP 8)

Exception::__construct — Constructor de la excepción






  ### Descripción


   public **Exception::__construct**([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)


   Construye el objeto Exception.







  ### Parámetros






     message


       Mensaje de la excepción a lanzar.






     code


       El código de la excepción.






     previous


       La excepción previa utilizada por la serie de excepciones.







   **Nota**:

    Llamar al constructor de la clase Exception de una subclase ignora los
    argumentos por omisión, si las propiedades $code y $message ya están establecidas.








  ### Notas

  **Nota**:



    message *NO*
    es seguro binariamente.

















  # Exception::getMessage

  (PHP 5, PHP 7, PHP 8)

Exception::getMessage — Obtiene el mensaje de Excepción






  ### Descripción


   final public **Exception::getMessage**(): [string](#language.types.string)


   Devuelve el mensaje de Excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el mensaje de Excepción en formato cadena.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getMessage()**



&lt;?php
try {
    throw new Exception("Algún mensaje de error");
} catch(Exception $e) {
    echo $e-&gt;getMessage();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



Algún mensaje de error








  ### Ver también





    - [Throwable::getMessage()](#throwable.getmessage) - Obtiene el mensaje















  # Exception::getPrevious

  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

Exception::getPrevious — Devuelve la Throwable anterior






  ### Descripción


   final public **Exception::getPrevious**(): [?](#language.types.null)[Throwable](#class.throwable)


   Devuelve la [Throwable](#class.throwable) anterior
   (el tercer parámetro de [Exception::__construct()](#exception.construct)).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la [Throwable](#class.throwable) anterior si está disponible
   o **[null](#constant.null)** si no.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getPrevious()**



     Recorrer, e imprimir la traza de una excepción.




&lt;?php
class MiPropiaExcepción extends Exception {}

function hacerCosas() {
    try {
        throw new InvalidArgumentException("¡Lo está haciendo mal!", 112);
    } catch(Exception $e) {
        throw new MiPropiaExcepción("Ocurrió algo", 911, $e);
    }
}


try {
    hacerCosas();
} catch(Exception $e) {
    do {
        printf("%s:%d %s (%d) [%s]\n", $e-&gt;getFile(), $e-&gt;getLine(), $e-&gt;getMessage(), $e-&gt;getCode(), get_class($e));
    } while($e = $e-&gt;getPrevious());
}
?&gt;


    Resultado del ejemplo anterior es similar a:



/home/bjori/ex.php:8 Ocurrió algo (911) [MiPropiaExcepción]
/home/bjori/ex.php:6 ¡Lo está haciendo mal! (112) [InvalidArgumentException]








  ### Ver también





     - [Throwable::getPrevious()](#throwable.getprevious) - Devuelve el objeto Throwable previo















  # Exception::getCode

  (PHP 5, PHP 7, PHP 8)

Exception::getCode — Obtiene el código de una excepción






  ### Descripción


   final public **Exception::getCode**(): [int](#language.types.integer)


   Devuelve el código de una excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el código de Excepción en forma de [int](#language.types.integer) en
   [Exception](#class.exception) pero posiblemente en forma de otros tipos en
   [Exception](#class.exception) descendientes (por ejemplo como
   [string](#language.types.string) en [PDOException](#class.pdoexception)).







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getCode()**



&lt;?php
try {
    throw new Exception("Un mensaje de error", 30);
} catch(Exception $e) {
    echo "El código de excepción es: " . $e-&gt;getCode();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



El código de excepción es: 30








  ### Ver también





    - [Throwable::getCode()](#throwable.getcode) - Obtener el código de la excepción















  # Exception::getFile

  (PHP 5, PHP 7, PHP 8)

Exception::getFile — Obtiene el fichero en el que se creó la excepción






  ### Descripción


   final public **Exception::getFile**(): [string](#language.types.string)


   Obtiene el nombre del fichero en el que fue creada la excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el nombre del fichero en donde fue creada la excepción.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getFile()**



&lt;?php
try {
    throw new Exception;
} catch(Exception $e) {
    echo $e-&gt;getFile();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



/home/bjori/tmp/ex.php








  ### Ver también





     - [Throwable::getFile()](#throwable.getfile) - Obtiene el fichero en el que se creó el objeto















  # Exception::getLine

  (PHP 5, PHP 7, PHP 8)

Exception::getLine — Obtiene la línea en el que se creó la excepción






  ### Descripción


   final public **Exception::getLine**(): [int](#language.types.integer)


   Devuelve el número de la línea donde se creó la excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el número de la línea donde se creó la excepción.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getLine()**



&lt;?php
try {
    throw new Exception("Algún mensaje de error");
} catch(Exception $e) {
    echo "La excepción se creó en la línea: " . $e-&gt;getLine();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



La excepción se creó en la línea: 3








  ### Ver también





    - [Throwable::getLine()](#throwable.getline) - Obtiene la línea en la que el objeto fue instanciado















  # Exception::getTrace

  (PHP 5, PHP 7, PHP 8)

Exception::getTrace — Obtiene la traza de la pila






  ### Descripción


   final public **Exception::getTrace**(): [array](#language.types.array)


   Devuelve la traza de pila de una excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el seguimiento de pila de una excepción como un [array](#language.types.array).








  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getTrace()**



&lt;?php
function test() {
 throw new Exception;
}

try {
 test();
} catch(Exception $e) {
 var_dump($e-&gt;getTrace());
}
?&gt;


    Resultado del ejemplo anterior es similar a:



array(1) {
  [0]=&gt;
  array(4) {
    ["file"]=&gt;
    string(22) "/home/bjori/tmp/ex.php"
    ["line"]=&gt;
    int(7)
    ["function"]=&gt;
    string(4) "test"
    ["args"]=&gt;
    array(0) {
    }
  }
}








  ### Ver también





    - [Throwable::getTrace()](#throwable.gettrace) - Obtener la traza de la pila















  # Exception::getTraceAsString

  (PHP 5, PHP 7, PHP 8)

Exception::getTraceAsString — Obtiene la traza de la pila como una cadena de caracteres






  ### Descripción


   final public **Exception::getTraceAsString**(): [string](#language.types.string)


   Devuelve la traza de la pila de una excepción como una cadena de caracteres.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Returns the Exception stack trace as a string.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::getTraceAsString()**



&lt;?php
function test() {
    throw new Exception;
}

try {
    test();
} catch(Exception $e) {
    echo $e-&gt;getTraceAsString();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



#0 /home/bjori/tmp/ex.php(7): test()
#1 {main}








  ### Ver también





    - [Throwable::getTraceAsString()](#throwable.gettraceasstring) - Obtener la traza de la pila como un string















  # Exception::__toString

  (PHP 5, PHP 7, PHP 8)

Exception::__toString — Representación de la excepción en formato cadena






  ### Descripción


   public **Exception::__toString**(): [string](#language.types.string)


   Devuelve la representación de la excepción en formato [string](#language.types.string).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la representación de la excepción en formato [string](#language.types.string).







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Exception::__toString()**



&lt;?php
try {
    throw new Exception("Some error message");
} catch(Exception $e) {
    echo $e;
}
?&gt;


    Resultado del ejemplo anterior es similar a:



exception 'Exception' with message 'Some error message' in /home/bjori/tmp/ex.php:3
Stack trace:
#0 {main}








  ### Ver también





    - [Throwable::__toString()](#throwable.tostring) - Obtiene un representación de string del objeto lanzado















  # Exception::__clone

  (PHP 5, PHP 7, PHP 8)

Exception::__clone — Clona la excepción






  ### Descripción


   private **Exception::__clone**(): [void](language.types.void.html)


   [Exception](#class.exception)s no se pueden clonar,
   y el intento de hacerlo lanzará un [Error](#class.error).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.







  ### Errores/Excepciones


   Las Excepciones *no* se pueden clonar.







  ### Historial de cambios





      Versión
      Descripción






      8.1.0

       [Error::__clone()](#error.clone) ya no es final.















## Tabla de contenidos
- [Exception::__construct](#exception.construct) — Constructor de la excepción
- [Exception::getMessage](#exception.getmessage) — Obtiene el mensaje de Excepción
- [Exception::getPrevious](#exception.getprevious) — Devuelve la Throwable anterior
- [Exception::getCode](#exception.getcode) — Obtiene el código de una excepción
- [Exception::getFile](#exception.getfile) — Obtiene el fichero en el que se creó la excepción
- [Exception::getLine](#exception.getline) — Obtiene la línea en el que se creó la excepción
- [Exception::getTrace](#exception.gettrace) — Obtiene la traza de la pila
- [Exception::getTraceAsString](#exception.gettraceasstring) — Obtiene la traza de la pila como una cadena de caracteres
- [Exception::__toString](#exception.tostring) — Representación de la excepción en formato cadena
- [Exception::__clone](#exception.clone) — Clona la excepción











 # ErrorException



 (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)





   ## Introducción


    Una excepción para los errores.







   ## Sinopsis de la Clase





     class **ErrorException**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades */

     protected
     [int](#language.types.integer)
      [$severity](#errorexception.props.severity) = E_ERROR;


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

   public [__construct](#errorexception.construct)(
    [string](#language.types.string) $message = "",
    [int](#language.types.integer) $code = 0,
    [int](#language.types.integer) $severity = **[E_ERROR](#constant.e-error)**,
    [?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $line = **[null](#constant.null)**,
    [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**
)

    final public [getSeverity](#errorexception.getseverity)(): [int](#language.types.integer)


    /* Métodos heredados */
    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)
final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::__toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::__clone](#exception.clone)(): [void](language.types.void.html)

   }






   ## Propiedades



     severity

      La severidad de la excepción









   ## Ejemplos





    **Ejemplo #1 Uso de [set_error_handler()](#function.set-error-handler) para cambiar todos los mensajes de error en ErrorException**



 &lt;?php

set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) {
    if (!(error_reporting() &amp; $errno)) {
        // Este código de error no está incluido en error_reporting.
        return;
    }

    if ($errno === E_DEPRECATED || $errno === E_USER_DEPRECATED) {
        // No lanzar excepción para advertencias de obsolescencia, ya que nuevas o inesperadas
        // obsolescencias podrían romper la aplicación.
        return;
    }

    throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
});

// Deserializar datos corruptos desencadena una advertencia que será convertida en
// ErrorException por el manejador de errores.
unserialize('broken data');

?&gt;


     Resultado del ejemplo anterior es similar a:




Fatal error: Uncaught ErrorException: unserialize(): Error at offset 0 of 11 bytes in test.php:16
Stack trace:
#0 [internal function]: {closure}(2, 'unserialize(): ...', 'test.php', 16)
#1 test.php(16): unserialize('broken data')
#2 {main}
  thrown in test.php on line 16












  # ErrorException::__construct

  (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ErrorException::__construct — Constructor de la excepción






  ### Descripción


   public **ErrorException::__construct**(
    [string](#language.types.string) $message = "",
    [int](#language.types.integer) $code = 0,
    [int](#language.types.integer) $severity = **[E_ERROR](#constant.e-error)**,
    [?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $line = **[null](#constant.null)**,
    [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**
)


   Construye el objeto Exception.







  ### Parámetros






     message


       Mensaje de la excepción a lanzar.






     code


       El código de la excepción.






     severity


       Nivel de la severidad de la excepción.



      **Nota**:



        Aunque la severidad puede ser cuaquier valor de tipo [int](#language.types.integer), se pretende que
        se empleen las [constantes de error](#errorfunc.constants).







     filename


       Nombre del fichero donde se lanzó la excepción.






     line


       Número de la línea donde se produjo la excepción.






     previous


       La anterior excepción utilizada para la excepción de encadenamiento.











  ### Historial de cambios





      Versión
      Descripción






      8.0.0

       filename y line ahora son anulables.
       Anteriormente, sus valores predeterminados eran **[__FILE__](#constant.file)** y
       **[__LINE__](#constant.line)**, respectivamente.




















  # ErrorException::getSeverity

  (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ErrorException::getSeverity — Obtiene la severidad de la excepción






  ### Descripción


   final public **ErrorException::getSeverity**(): [int](#language.types.integer)


   Devuelve la severidad de la excepción.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el nivel de la severidad de la excepción.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de ErrorException::getSeverity()**



&lt;?php
try {
    throw new ErrorException("Mensaje de la excepción", 0, E_USER_ERROR);
} catch(ErrorException $e) {
    echo "La severidad de la excepción es: " . $e-&gt;getSeverity();
    var_dump($e-&gt;getSeverity() === E_USER_ERROR);
}
?&gt;


    Resultado del ejemplo anterior es similar a:



La severidad de la excepción es: 256
bool(true)












## Tabla de contenidos
- [ErrorException::__construct](#errorexception.construct) — Constructor de la excepción
- [ErrorException::getSeverity](#errorexception.getseverity) — Obtiene la severidad de la excepción











 # La clase ClosedGeneratorException



 (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)





   ## Introducción


    Una **ClosedGeneratorException** es lanzada cuando se intenta recuperar un valor de un [Generator](#class.generator) cerrado.







   ## Sinopsis de la Clase





     class **ClosedGeneratorException**



     extends
      [Exception](#class.exception)
     {

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

   public [Exception::__construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)
final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::__toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::__clone](#exception.clone)(): [void](language.types.void.html)

   }


















 # Error



 (PHP 7, PHP 8)





   ## Introducción


    **Error** es la clase base para todos
    los errores de PHP internos.







   ## Sinopsis de la Clase





     class **Error**



     implements
      [Throwable](#class.throwable) {

    /* Propiedades */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";

    private
     [string](#language.types.string)
      [$string](#error.props.string) = "";

    protected
     [int](#language.types.integer)
      [$code](#error.props.code);

    protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";

    protected
     [int](#language.types.integer)
      [$line](#error.props.line);

    private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];

    private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos */

   public [__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [getMessage](#error.getmessage)(): [string](#language.types.string)
final public [getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [getCode](#error.getcode)(): [int](#language.types.integer)
final public [getFile](#error.getfile)(): [string](#language.types.string)
final public [getLine](#error.getline)(): [int](#language.types.integer)
final public [getTrace](#error.gettrace)(): [array](#language.types.array)
final public [getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [__toString](#error.tostring)(): [string](#language.types.string)
private [__clone](#error.clone)(): [void](language.types.void.html)

   }






   ## Propiedades



     message

      El mensaje de error





     code

      El código de error





     file

      El nombre del fichero donde ocurrió el error





     line

      La línea donde ocurrió el error





     previous

      La excepción lanzada previamente





     string

      La representación en cadena del seguimiento de la pila





     trace

      El seguimiento de la pila como array















  # Error::__construct

  (PHP 7, PHP 8)

Error::__construct — Construir el objeto error






  ### Descripción


   public **Error::__construct**([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)


   Construye el Error.







  ### Parámetros






     message


       El mensaje de error.






     code


       El código de error.






     previous


       El objeto Throwable anterior empleado para la cadena de excepciones.











  ### Notas

  **Nota**:



    El parámetro message *NO* es
    seguro a nivel binario.

















  # Error::getMessage

  (PHP 7, PHP 8)

Error::getMessage — Obtener el mensaje de error






  ### Descripción


   final public **Error::getMessage**(): [string](#language.types.string)


   Devuelve el mensaje de error.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el mensaje de error como una cadena.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getMessage()**



&lt;?php
try {
    throw new Error("Un mensaje de error");
} catch(Error $e) {
    echo $e-&gt;getMessage();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



Un mensaje de error








  ### Ver también





    - [Throwable::getMessage()](#throwable.getmessage) - Obtiene el mensaje















  # Error::getPrevious

  (PHP 7, PHP 8)

Error::getPrevious — Devuelve el objeto Throwable anterior






  ### Descripción


   final public **Error::getPrevious**(): [?](#language.types.null)[Throwable](#class.throwable)


   Devuelve el objeto Throwable anterior (el tercer parámetro de [Error::__construct()](#error.construct)).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el objeto [Throwable](#class.throwable) anterior si está disponible,
   o **[null](#constant.null)** en caso contrario.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getPrevious()**



     Recorrer e imprimir la traza de errores.




&lt;?php
class MiErrorPersonalizado extends Error {}

function hacerCosas() {
    try {
        throw new InvalidArgumentError("¡Lo está haciendo mal!", 112);
    } catch(Error $e) {
        throw new MiErrorPersonalizado("Ocurrió algo", 911, $e);
    }
}


try {
    hacerCosas();
} catch(Error $e) {
    do {
        printf("%s:%d %s (%d) [%s]\n", $e-&gt;getFile(), $e-&gt;getLine(), $e-&gt;getMessage(), $e-&gt;getCode(), get_class($e));
    } while($e = $e-&gt;getPrevious());
}
?&gt;


    Resultado del ejemplo anterior es similar a:



/home/bjori/ex.php:8 Ocurrió algo (911) [MiErrorPersonalizado]
/home/bjori/ex.php:6 ¡Lo está haciendo mal! (112) [InvalidArgumentError]








  ### Ver también





    - [Throwable::getPrevious()](#throwable.getprevious) - Devuelve el objeto Throwable previo















  # Error::getCode

  (PHP 7, PHP 8)

Error::getCode — Obtener el código de error






  ### Descripción


   final public **Error::getCode**(): [int](#language.types.integer)


   Devuelve el código de error.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el código de error como un [int](#language.types.integer)







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getCode()**



&lt;?php
try {
    throw new Error("Un mensaje de error", 30);
} catch(Error $e) {
    echo "El código del Error es: " . $e-&gt;getCode();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



El código del Error es: 30








  ### Ver también





    - [Throwable::getCode()](#throwable.getcode) - Obtener el código de la excepción















  # Error::getFile

  (PHP 7, PHP 8)

Error::getFile — Obtener el fichero en el que ocurrío el error






  ### Descripción


   final public **Error::getFile**(): [string](#language.types.string)


   Obtiene el nombre del fichero donde ocurrió el error.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el nombre del fichero el en cual ocurrió el error.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getFile()**



&lt;?php
try {
    throw new Error;
} catch(Error $e) {
    echo $e-&gt;getFile();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



/home/bjori/tmp/ex.php








  ### Ver también





    - [Throwable::getFile()](#throwable.getfile) - Obtiene el fichero en el que se creó el objeto















  # Error::getLine

  (PHP 7, PHP 8)

Error::getLine — Obtener la línea en la que ocurrió el error






  ### Descripción


   final public **Error::getLine**(): [int](#language.types.integer)


   Obtiene el número de línea donde ocurrió el error.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el número de línea en la que ocurrió el error.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getLine()**



&lt;?php
try {
    throw new Error("Un mensaje de error");
} catch(Error $e) {
    echo "El error se ocasionó en la línea: " . $e-&gt;getLine();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



El error se ocasionó en la línea: 3








  ### Ver también





    - [Throwable::getLine()](#throwable.getline) - Obtiene la línea en la que el objeto fue instanciado















  # Error::getTrace

  (PHP 7, PHP 8)

Error::getTrace — Obtener la traza de la pila






  ### Descripción


   final public **Error::getTrace**(): [array](#language.types.array)


   Devuelve la traza de la pila.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la traza de la pila como un [array](#language.types.array).







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getTrace()**



&lt;?php
function prueba() {
 throw new Error;
}

try {
 prueba();
} catch(Error $e) {
 var_dump($e-&gt;getTrace());
}
?&gt;


    Resultado del ejemplo anterior es similar a:



array(1) {
  [0]=&gt;
  array(4) {
    ["file"]=&gt;
    string(22) "/home/bjori/tmp/ex.php"
    ["line"]=&gt;
    int(7)
    ["function"]=&gt;
    string(6) "prueba"
    ["args"]=&gt;
    array(0) {
    }
  }
}








  ### Ver también





    - [Throwable::getTrace()](#throwable.gettrace) - Obtener la traza de la pila















  # Error::getTraceAsString

  (PHP 7, PHP 8)

Error::getTraceAsString — Obtener la traza de la pila como un string






  ### Descripción


   final public **Error::getTraceAsString**(): [string](#language.types.string)


   Devuelve la traza de la pila como un string.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la traza de la pila como un string.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::getTraceAsString()**



&lt;?php
function prueba() {
    throw new Error;
}

try {
    prueba();
} catch(Error $e) {
    echo $e-&gt;getTraceAsString();
}
?&gt;


    Resultado del ejemplo anterior es similar a:



#0 /home/bjori/tmp/ex.php(7): prueba()
#1 {main}








  ### Ver también





    - [Throwable::getTraceAsString()](#throwable.gettraceasstring) - Obtener la traza de la pila como un string















  # Error::__toString

  (PHP 7, PHP 8)

Error::__toString — Representación de string del error






  ### Descripción


   public **Error::__toString**(): [string](#language.types.string)


   Devuelve la representación de [string](#language.types.string) del error.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la representación de [string](#language.types.string) del error.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Error::__toString()**



&lt;?php
try {
    throw new Error("Un mensaje de error");
} catch(Error $e) {
    echo $e;
}
?&gt;


    Resultado del ejemplo anterior es similar a:



Error: Un mensaje de error in /home/bjori/tmp/ex.php:3
Stack trace:
#0 {main}








  ### Ver también





    - [Throwable::__toString()](#throwable.tostring) - Obtiene un representación de string del objeto lanzado















  # Error::__clone

  (PHP 7, PHP 8)

Error::__clone — Clonar el error






  ### Descripción


   private **Error::__clone**(): [void](language.types.void.html)


   Un error no se pueden clonar, por lo que este método resulta en un error fatal.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.







  ### Errores/Excepciones


   Los errores *no* son clonabes.







  ### Historial de cambios





      Versión
      Descripción






      8.1.0

       **Error::__clone()** ya no es final.














## Tabla de contenidos
- [Error::__construct](#error.construct) — Construir el objeto error
- [Error::getMessage](#error.getmessage) — Obtener el mensaje de error
- [Error::getPrevious](#error.getprevious) — Devuelve el objeto Throwable anterior
- [Error::getCode](#error.getcode) — Obtener el código de error
- [Error::getFile](#error.getfile) — Obtener el fichero en el que ocurrío el error
- [Error::getLine](#error.getline) — Obtener la línea en la que ocurrió el error
- [Error::getTrace](#error.gettrace) — Obtener la traza de la pila
- [Error::getTraceAsString](#error.gettraceasstring) — Obtener la traza de la pila como un string
- [Error::__toString](#error.tostring) — Representación de string del error
- [Error::__clone](#error.clone) — Clonar el error












 # ArgumentCountError



 (PHP 7 &gt;= PHP 7.1.0, PHP 8)





   ## Introducción


    **ArgumentCountError** es lanzado
    cuando muy pocos argumentos son pasados a una funcion o método definido por el usuario.




    Este error también se produce cuando se pasan demasiados argumentos a una función incorporada función incorporada no variable.







   ## Sinopsis de la Clase





     class **ArgumentCountError**



     extends
      [TypeError](#class.typeerror)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # ArithmeticError



 (PHP 7, PHP 8)





   ## Introducción


    Un **ArithmeticError** es lanzado cuando
    ocurre un error durante la realización de operaciones matemáticas.
    Estos errores incluyen el intento de realizar un desplazamiento de bit mediante una
    cantidad negativa, y cualquier llamada a [intdiv()](#function.intdiv) que resulte en un
    valor fuera de los límites posibles de un [int](#language.types.integer).







   ## Sinopsis de la Clase





     class **ArithmeticError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # AssertionError



 (PHP 7, PHP 8)





   ## Introducción


    Un **AssertionError** se lanza cuando
    falla una afirmación realizada mediante [assert()](#function.assert).







   ## Sinopsis de la Clase





     class **AssertionError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # DivisionByZeroError



 (PHP 7, PHP 8)





   ## Introducción


    Un **DivisionByZeroError** se lanza
    al intentar dividir un número por cero.







   ## Sinopsis de la Clase





     class **DivisionByZeroError**



     extends
      [ArithmeticError](#class.arithmeticerror)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }
















 # CompileError



 (PHP 7 &gt; 7.3.0, PHP 8)





   ## Introducción


    **CompileError** es lanzado por algunos
    errores de compilación, que anteriormente emitió un error fatal.







   ## Sinopsis de la Clase





     class **CompileError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # ParseError



 (PHP 7, PHP 8)





   ## Introducción


    Un **ParseError** se lanza cuando
    ocurre un error al analizar código de PHP, tal como cuando
    se llama a [eval()](#function.eval).



   **Nota**:

     **ParseError** extiende [CompileError](#class.compileerror)
     a partir de PHP 7.3.0. Anteriormente, extendía [Error](#class.error).








   ## Sinopsis de la Clase





     class **ParseError**



     extends
      [CompileError](#class.compileerror)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # TypeError



 (PHP 7, PHP 8)





   ## Introducción


    Una **TypeError** puede ser lanzada cuando:



     -
      El valor que se define para una propiedad de clase no
      corresponde al tipo declarado de la propiedad correspondiente.


     -
      El tipo del argumento que se pasa a la función no corresponde
      a la declaración del tipo del parámetro correspondiente.


     -
      Un valor que es devuelto por una función no corresponde
      al tipo de retorno declarado por la función.








   ## Sinopsis de la Clase





     class **TypeError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }






   ## Historial de cambios





       Versión
       Descripción






       7.1.0

        En modo estricto, pasar un número incorrecto de argumentos a una función interna
        de PHP ya no lanza una **TypeError** genérica.
        En su lugar, se lanza una [ArgumentCountError](#class.argumentcounterror) más específica,
        que extiende **TypeError**.





















 # ValueError



 (PHP 8)





   ## Introducción


    Una **ValueError** se lanza cuando el tipo de un argumento es correcto
    pero su valor es incorrecto.
    Por ejemplo, si se pasa un entero negativo cuando la función espera un entero positivo,
    o si se pasa una cadena o un array vacío cuando la función espera que no esté vacío.







   ## Sinopsis de la Clase





     class **ValueError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }














 # UnhandledMatchError



 (PHP 8)





   ## Introducción


    Una **UnhandledMatchError** es lanzada
    cuando el sujeto transmitido a una expresión [match](#control-structures.match) no es tratado por ningún brazo
    de esta misma expresión.







   ## Sinopsis de la Clase





     class **UnhandledMatchError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos heredados */

   public [Error::__construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }















 # FiberError



 (PHP 8 &gt;= 8.1.0)





   ## Introducción


    El error **FiberError** se lanza
    cuando se realiza una operación no válida en una fibra ([Fiber](#class.fiber)).







   ## Sinopsis de la Clase





     final
     class **FiberError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";
private
     [string](#language.types.string)
      [$string](#error.props.string) = "";
protected
     [int](#language.types.integer)
      [$code](#error.props.code);
protected
     [string](#language.types.string)
      [$file](#error.props.file) = "";
protected
     [int](#language.types.integer)
      [$line](#error.props.line);
private
     [array](#language.types.array)
      [$trace](#error.props.trace) = [];
private
     ?[Throwable](#class.throwable)
      [$previous](#error.props.previous) = null;


    /* Métodos */

   public [__construct](#fibererror.construct)()


    /* Métodos heredados */
    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)
final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::__toString](#error.tostring)(): [string](#language.types.string)
private [Error::__clone](#error.clone)(): [void](language.types.void.html)

   }











  # FiberError::__construct

  (PHP 8 &gt;= 8.1.0)

FiberError::__construct — Constructor para evitar la instanciación directa






  ### Descripción


   public **FiberError::__construct**()





  ### Parámetros

  Esta función no contiene ningún parámetro.





  ### Errores/Excepciones


   Lanza una excepción [Error](#class.error) cuando es llamada.











## Tabla de contenidos
- [FiberError::__construct](#fibererror.construct) — Constructor para evitar la instanciación directa











 # RequestParseBodyException



 (PHP 8 &gt;= 8.4.0)





   ## Introducción


    Una **RequestParseBodyException** es lanzada en
    [request_parse_body()](#function.request-parse-body) cuando el cuerpo de la petición es inválido,
    según la cabecera Content-Type.







   ## Sinopsis de la Clase





     class **RequestParseBodyException**



     extends
      [Exception](#class.exception)
     {

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

   public [Exception::__construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)
final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::__toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::__clone](#exception.clone)(): [void](language.types.void.html)

   }























 # Interfaces y clases predefinidas

## Tabla de contenidos
- [Traversable](#class.traversable)
- [Iterator](#class.iterator)
- [IteratorAggregate](#class.iteratoraggregate)
- [InternalIterator](#class.internaliterator)
- [Throwable](#class.throwable)
- [Countable](#class.countable)
- [ArrayAccess](#class.arrayaccess)
- [Serializable](#class.serializable)
- [Closure](#class.closure)
- [stdClass](#class.stdclass)
- [Generator](#class.generator)
- [Fiber](#class.fiber)
- [WeakReference](#class.weakreference)
- [WeakMap](#class.weakmap)
- [Stringable](#class.stringable)
- [UnitEnum](#class.unitenum)
- [BackedEnum](#class.backedenum)
- [SensitiveParameterValue](#class.sensitiveparametervalue)
- [__PHP_Incomplete_Class](#class.php-incomplete-class)





   Véanse también las [interfaces de la SPL](#spl.interfaces) y las [clases reservadas](#reserved.classes).










 # La interfaz [Traversable](#class.traversable)



 (PHP 5, PHP 7, PHP 8)





   ## Introducción


    Interfaz para detectar si una clase puede recorrerse mediante [foreach](#control-structures.foreach).




    Una interfaz abstracta base no puede ser implementada sola. En su lugar, debe ser
    implementada con [IteratorAggregate](#class.iteratoraggregate) o con
    [Iterator](#class.iterator).







   ## Sinopsis de la Interfaz





     interface **Traversable** {
   }



    Esta interfaz no tiene métodos, su único propósito es ser la base
    para todas las clases atravesables.







   ## Historial de cambios





       Versión
       Descripción






       7.4.0

        La interfaz **Traversable** ahora puede ser implementada
        por clases abstractas. Las clases que la extiendan deben implementar
        [Iterator](#class.iterator) o
        [IteratorAggregate](#class.iteratoraggregate).










   ## Notas

   **Nota**:



     Las clases internas que implementan esta interfaz pueden ser usadas en
     una construcción [foreach](#control-structures.foreach) y no necesitan implementar
     [IteratorAggregate](#class.iteratoraggregate) o
     [Iterator](#class.iterator).




   **Nota**:



     Antes de PHP 7.4.0, esta interfaz interna del motor no podía ser implementada
     en scripts PHP. Se debe usar [IteratorAggregate](#class.iteratoraggregate)
     o [Iterator](#class.iterator) deben usarse en su lugar.



















 # La interfaz Iterator



 (PHP 5, PHP 7, PHP 8)





   ## Introducción


    Interfaz para iteradores externos u objetos que pueden ser
    iterados internamente por sí mismos.







   ## Sinopsis de la Interfaz




    interface **Iterator**

    extends
      [Traversable](#class.traversable) {

    /* Métodos */

   public [current](#iterator.current)(): [mixed](#language.types.mixed)
public [key](#iterator.key)(): [mixed](#language.types.mixed)
public [next](#iterator.next)(): [void](language.types.void.html)
public [rewind](#iterator.rewind)(): [void](language.types.void.html)
public [valid](#iterator.valid)(): [bool](#language.types.boolean)

   }





   ## Iteradores Predefinidos


    PHP ya ofrece un número de iteradores para muchas de las tareas del día a día.
    Véase la lista de [iteradores SPL](#spl.iterators).






   ## Ejemplos


    **Ejemplo #1 Uso básico**



     Este ejemplo muestra el orden en el que se llaman a los métodos cuando
     se emplea un [foreach](#control-structures.foreach) con un iterator.




&lt;?php
class myIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this-&gt;position = 0;
    }

    public function rewind(): void {
        var_dump(__METHOD__);
        $this-&gt;position = 0;
    }

    #[\ReturnTypeWillChange]
    public function current() {
        var_dump(__METHOD__);
        return $this-&gt;array[$this-&gt;position];
    }

    #[\ReturnTypeWillChange]
    public function key() {
        var_dump(__METHOD__);
        return $this-&gt;position;
    }

    public function next(): void {
        var_dump(__METHOD__);
        ++$this-&gt;position;
    }

    public function valid(): bool {
        var_dump(__METHOD__);
        return isset($this-&gt;array[$this-&gt;position]);
    }
}

$it = new myIterator;

foreach($it as $key =&gt; $value) {
    var_dump($key, $value);
    echo "\n";
}
?&gt;


    Resultado del ejemplo anterior es similar a:




string(18) "myIterator::rewind"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(0)
string(12) "firstelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(1)
string(13) "secondelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(2)
string(11) "lastelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"






   ## Ver también

   Véase también [iteración de objetos](#language.oop5.iterations).











  # Iterator::current

  (PHP 5, PHP 7, PHP 8)

Iterator::current — Devuelve el elemento actual






  ### Descripción


   public **Iterator::current**(): [mixed](#language.types.mixed)


   Devuelve el elemento actual.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Puede devolver cualquier tipo.
















  # Iterator::key

  (PHP 5, PHP 7, PHP 8)

Iterator::key — Devuelve la clave del elemento actual






  ### Descripción

  public **Iterator::key**(): [mixed](#language.types.mixed)


   Devuelve la clave del elemento actual.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve scalar en caso de éxito, o **[null](#constant.null)** en caso de error.







  ### Errores/Excepciones


   Muestra un **[E_NOTICE](#constant.e-notice)** en caso de error.
















  # Iterator::next

  (PHP 5, PHP 7, PHP 8)

Iterator::next — Avanza al siguiente elemento






  ### Descripción


   public **Iterator::next**(): [void](language.types.void.html)


   Avanza la posición actual al siguiente elemento.



  **Nota**:



    El método es llamado *después* de cada
    [foreach](#control-structures.foreach) loop.








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   El valor devuelto es ignorado.
















  # Iterator::rewind

  (PHP 5, PHP 7, PHP 8)

Iterator::rewind — Rebobine la Iterator al primer elemento






  ### Descripción


   public **Iterator::rewind**(): [void](language.types.void.html)


   Rebobina de nuevo al primer elemento de la Iterator.



  **Nota**:



    Este es el *primer* método llamado cuando se inicia un
    [foreach](#control-structures.foreach) bucle. *No* va a ser
    ejecutado *despues* [foreach](#control-structures.foreach) bucle.








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Cualquier valor devuelto se pasa por alto.
















  # Iterator::valid

  (PHP 5, PHP 7, PHP 8)

Iterator::valid — Comprueba si la posición actual es válido






  ### Descripción


   public **Iterator::valid**(): [bool](#language.types.boolean)


   Este método se llama después de [Iterator::rewind()](#iterator.rewind) y
   [Iterator::next()](#iterator.next) para comprobar si la posición actual es
   válido.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   El valor de retorno se debe fundir a [bool](#language.types.boolean) y luego evaluar.
   Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.












## Tabla de contenidos
- [Iterator::current](#iterator.current) — Devuelve el elemento actual
- [Iterator::key](#iterator.key) — Devuelve la clave del elemento actual
- [Iterator::next](#iterator.next) — Avanza al siguiente elemento
- [Iterator::rewind](#iterator.rewind) — Rebobine la Iterator al primer elemento
- [Iterator::valid](#iterator.valid) — Comprueba si la posición actual es válido












 # La interfaz IteratorAggregate



 (PHP 5, PHP 7, PHP 8)





   ## Introducción


    Interfaz para crear un iterador externo.







   ## Sinopsis de la Interfaz





     interface **IteratorAggregate**

    extends
      [Traversable](#class.traversable) {

    /* Métodos */

   public [getIterator](#iteratoraggregate.getiterator)(): [Traversable](#class.traversable)

   }





   ## Ejemplos


    **Ejemplo #1 Ejemplo simple**



&lt;?php

class myData implements IteratorAggregate
{
    public $property1 = "Propiedad pública número uno";
    public $property2 = "Propiedad pública número dos";
    public $property3 = "Propiedad pública número tres";
    public $property4 = "";

    public function __construct()
    {
        $this-&gt;property4 = "última propiedad";
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }
}

$obj = new myData();

foreach($obj as $key =&gt; $value) {
    var_dump($key, $value);
    echo "\n";
}

?&gt;


    Resultado del ejemplo anterior es similar a:




string(9) "property1"
string(27) "Propiedad pública número uno"

string(9) "property2"
string(27) "Propiedad pública número dos"

string(9) "property3"
string(29) "Propiedad pública número tres"

string(9) "property4"
string(17) "última propiedad"













  # IteratorAggregate::getIterator

  (PHP 5, PHP 7, PHP 8)

IteratorAggregate::getIterator — Recuperar un Iterator o traversable externo






  ### Descripción


   public **IteratorAggregate::getIterator**(): [Traversable](#class.traversable)


   Devuelve un iterador o traversable externo.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Una instancia de un objeto que implementa [Iterator](#class.iterator) o
   [Traversable](#class.traversable)







  ### Errores/Excepciones


   Lanza una [Exception](#class.exception) en caso de fallo.












## Tabla de contenidos
- [IteratorAggregate::getIterator](#iteratoraggregate.getiterator) — Recuperar un Iterator o traversable externo











 # La clase InternalIterator



 (PHP 8)





   ## Introducción


    Clase que facilita la implementación de [IteratorAggregate](#class.iteratoraggregate)
    para las clases *internas*.







   ## Sinopsis de la Clase





     final
     class **InternalIterator**



     implements
      [Iterator](#class.iterator) {

    /* Métodos */

   private [__construct](#internaliterator.construct)()

    public [current](#internaliterator.current)(): [mixed](#language.types.mixed)
public [key](#internaliterator.key)(): [mixed](#language.types.mixed)
public [next](#internaliterator.next)(): [void](language.types.void.html)
public [rewind](#internaliterator.rewind)(): [void](language.types.void.html)
public [valid](#internaliterator.valid)(): [bool](#language.types.boolean)

   }











  # InternalIterator::__construct

  (PHP 8)

InternalIterator::__construct — Constructor privado para evitar la instanciación directa






  ### Descripción


   private **InternalIterator::__construct**()





  ### Parámetros

  Esta función no contiene ningún parámetro.














  # InternalIterator::current

  (PHP 8)

InternalIterator::current — Devuelve el elemento actual






  ### Descripción

  public **InternalIterator::current**(): [mixed](#language.types.mixed)


   Devuelve el elemento actual.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el elemento actual.















  # InternalIterator::key

  (PHP 8)

InternalIterator::key — Devuelve la clave del elemento actual






  ### Descripción

  public **InternalIterator::key**(): [mixed](#language.types.mixed)


   Devuelve la clave del elemento actual.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la clave del elemento actual.















  # InternalIterator::next

  (PHP 8)

InternalIterator::next — Pasa al elemento siguiente






  ### Descripción

  public **InternalIterator::next**(): [void](language.types.void.html)


   Desplaza la posición actual hacia el elemento siguiente.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.















  # InternalIterator::rewind

  (PHP 8)

InternalIterator::rewind — Reemplaza el iterador en el primer elemento






  ### Descripción

  public **InternalIterator::rewind**(): [void](language.types.void.html)


   Reemplaza el iterador en el primer elemento.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.















  # InternalIterator::valid

  (PHP 8)

InternalIterator::valid — Verifica si la posición actual es válida






  ### Descripción

  public **InternalIterator::valid**(): [bool](#language.types.boolean)


   Verifica que la posición actual es válida.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve si la posición actual es válida.











## Tabla de contenidos
- [InternalIterator::__construct](#internaliterator.construct) — Constructor privado para evitar la instanciación directa
- [InternalIterator::current](#internaliterator.current) — Devuelve el elemento actual
- [InternalIterator::key](#internaliterator.key) — Devuelve la clave del elemento actual
- [InternalIterator::next](#internaliterator.next) — Pasa al elemento siguiente
- [InternalIterator::rewind](#internaliterator.rewind) — Reemplaza el iterador en el primer elemento
- [InternalIterator::valid](#internaliterator.valid) — Verifica si la posición actual es válida












 # Throwable



 (PHP 7, PHP 8)





   ## Introducción


    **Throwable** es la interfaz base para cualquier objeto que
    pueda ser lanzado mediante una sentencia [throw](#language.exceptions), incluyendo
    [Error](#class.error) y [Exception](#class.exception).



   **Nota**:



     Las clases de PHP no pueden implementar la interfaz **Throwable**
     directamente, por lo que deben extender en su lugar
     [Exception](#class.exception).








   ## Sinopsis de la Interfaz





     interface **Throwable**

    extends
      [Stringable](#class.stringable) {

    /* Métodos */

   public [getMessage](#throwable.getmessage)(): [string](#language.types.string)
public [getCode](#throwable.getcode)(): [int](#language.types.integer)
public [getFile](#throwable.getfile)(): [string](#language.types.string)
public [getLine](#throwable.getline)(): [int](#language.types.integer)
public [getTrace](#throwable.gettrace)(): [array](#language.types.array)
public [getTraceAsString](#throwable.gettraceasstring)(): [string](#language.types.string)
public [getPrevious](#throwable.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
public [__toString](#throwable.tostring)(): [string](#language.types.string)


    /* Métodos heredados */
    public [Stringable::__toString](#stringable.tostring)(): [string](#language.types.string)

   }





   ## Historial de cambios





       Versión
       Descripción






       8.0.0

        **Throwable** implementa
        [Stringable](#class.stringable) ahora.
















  # Throwable::getMessage

  (PHP 7, PHP 8)

Throwable::getMessage — Obtiene el mensaje






  ### Descripción


   public **Throwable::getMessage**(): [string](#language.types.string)


   Devuelve el mensaje asociado al objeto lanzado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el mensaje asociado al objeto lanzado.







  ### Ver también





    - [Exception::getMessage()](#exception.getmessage) - Obtiene el mensaje de Excepción















  # Throwable::getCode

  (PHP 7, PHP 8)

Throwable::getCode — Obtener el código de la excepción






  ### Descripción


   public **Throwable::getCode**(): [int](#language.types.integer)


   Devuelve el código de error asociado al objeto lanzado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el código de la excepción como un [int](#language.types.integer) en
   [Exception](#class.exception), aunque posiblemente como otro tipo en
   los descendientes de [Exception](#class.exception) (por ejemplo, como
   [string](#language.types.string) en [PDOException](#class.pdoexception)).







  ### Ver también





    - [Exception::getCode()](#exception.getcode) - Obtiene el código de una excepción















  # Throwable::getFile

  (PHP 7, PHP 8)

Throwable::getFile — Obtiene el fichero en el que se creó el objeto






  ### Descripción


   public **Throwable::getFile**(): [string](#language.types.string)


   Obtiene el nombre del fichero en el que se creó el objeto lanzado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el nombre del fichero en el que se creó la el objeto lanzado.







  ### Ver también





    - [Exception::getFile()](#exception.getfile) - Obtiene el fichero en el que se creó la excepción















  # Throwable::getLine

  (PHP 7, PHP 8)

Throwable::getLine — Obtiene la línea en la que el objeto fue instanciado






  ### Descripción


   public **Throwable::getLine**(): [int](#language.types.integer)


   Devuelve el número de línea en la que el objeto fue instanciado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el número de línea en la que el objeto fue instanciado.







  ### Ver también





    - [Exception::getLine()](#exception.getline) - Obtiene la línea en el que se creó la excepción















  # Throwable::getTrace

  (PHP 7, PHP 8)

Throwable::getTrace — Obtener la traza de la pila






  ### Descripción


   public **Throwable::getTrace**(): [array](#language.types.array)


   Devuelve la traza de la pila como un [array](#language.types.array).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la traza de la pila como un [array](#language.types.array) con el mismo formato que en
   [debug_backtrace()](#function.debug-backtrace).







  ### Ver también





    - [Exception::getTrace()](#exception.gettrace) - Obtiene la traza de la pila















  # Throwable::getTraceAsString

  (PHP 7, PHP 8)

Throwable::getTraceAsString — Obtener la traza de la pila como un string






  ### Descripción


   public **Throwable::getTraceAsString**(): [string](#language.types.string)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la traza de la pila como un string.







  ### Ver también





    - [Exception::getTraceAsString()](#exception.gettraceasstring) - Obtiene la traza de la pila como una cadena de caracteres















  # Throwable::getPrevious

  (PHP 7, PHP 8)

Throwable::getPrevious — Devuelve el objeto Throwable previo






  ### Descripción


   public **Throwable::getPrevious**(): [?](#language.types.null)[Throwable](#class.throwable)


   Devuelve el objeto Throwable previo (por ejemplo, uno proporcionado como tercer
   parámetro de [Exception::__construct()](#exception.construct)).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el objeto [Throwable](#class.throwable) anterior si está disponible, o
   **[null](#constant.null)** si no lo está.







  ### Ver también





    - [Exception::getPrevious()](#exception.getprevious) - Devuelve la Throwable anterior















  # Throwable::__toString

  (PHP 7, PHP 8)

Throwable::__toString — Obtiene un representación de string del objeto lanzado






  ### Descripción


   public **Throwable::__toString**(): [string](#language.types.string)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la representación de [string](#language.types.string) del objeto lanzado.







  ### Ver también





    - [Exception::__toString()](#exception.tostring) - Representación de la excepción en formato cadena










## Tabla de contenidos
- [Throwable::getMessage](#throwable.getmessage) — Obtiene el mensaje
- [Throwable::getCode](#throwable.getcode) — Obtener el código de la excepción
- [Throwable::getFile](#throwable.getfile) — Obtiene el fichero en el que se creó el objeto
- [Throwable::getLine](#throwable.getline) — Obtiene la línea en la que el objeto fue instanciado
- [Throwable::getTrace](#throwable.gettrace) — Obtener la traza de la pila
- [Throwable::getTraceAsString](#throwable.gettraceasstring) — Obtener la traza de la pila como un string
- [Throwable::getPrevious](#throwable.getprevious) — Devuelve el objeto Throwable previo
- [Throwable::__toString](#throwable.tostring) — Obtiene un representación de string del objeto lanzado













 # La interfaz Countable



 (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)





   ## Introducción


    Las clases que implementan la interfaz **Countable** pueden
    ser utilizadas con la función [count()](#function.count).







   ## Sinopsis de la Interfaz





     interface **Countable** {

    /* Métodos */

   public [count](#countable.count)(): [int](#language.types.integer)

   }












  # Countable::count

  (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

Countable::count — Cuenta el número de elementos de un objeto






  ### Descripción


   public **Countable::count**(): [int](#language.types.integer)


   Este método se ejecuta cuando el value para
   [count()](#function.count) es un objeto que implementa
   [Countable](#class.countable).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   El número contado, en forma [int](#language.types.integer).







  ### Ejemplos


   **Ejemplo #1 Ejemplo con Countable::count()**



&lt;?php

class Counter implements Countable
{
    private $count = 0;

    public function count(): int
    {
        return ++$this-&gt;count;
    }
}

$counter = new Counter;

for ($i = 0; $i &lt; 10; ++$i) {
    echo "He sido contado " . count($counter) . " veces\n";
}

?&gt;


   Resultado del ejemplo anterior es similar a:



He sido contado 1 veces
He sido contado 2 veces
He sido contado 3 veces
He sido contado 4 veces
He sido contado 5 veces
He sido contado 6 veces
He sido contado 7 veces
He sido contado 8 veces
He sido contado 9 veces
He sido contado 10 veces












## Tabla de contenidos
- [Countable::count](#countable.count) — Cuenta el número de elementos de un objeto












 # La interfaz ArrayAccess



 (PHP 5, PHP 7, PHP 8)





   ## Introducción


    Interfaz que permite acceder a los objetos de la misma manera que a los arrays.







   ## Sinopsis de la Interfaz





     interface **ArrayAccess** {

    /* Métodos */

   public [offsetExists](#arrayaccess.offsetexists)([mixed](#language.types.mixed) $offset): [bool](#language.types.boolean)
public [offsetGet](#arrayaccess.offsetget)([mixed](#language.types.mixed) $offset): [mixed](#language.types.mixed)
public [offsetSet](#arrayaccess.offsetset)([mixed](#language.types.mixed) $offset, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#arrayaccess.offsetunset)([mixed](#language.types.mixed) $offset): [void](language.types.void.html)

   }





   ## Ejemplos


    **Ejemplo #1 Ejemplo básico**



&lt;?php
class Obj implements ArrayAccess {
    public $container = [
        "one"   =&gt; 1,
        "two"   =&gt; 2,
        "three" =&gt; 3,
    ];

    public function offsetSet($offset, $value): void {
        if (is_null($offset)) {
            $this-&gt;container[] = $value;
        } else {
            $this-&gt;container[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool {
        return isset($this-&gt;container[$offset]);
    }

    public function offsetUnset($offset): void {
        unset($this-&gt;container[$offset]);
    }

    public function offsetGet($offset): mixed {
        return isset($this-&gt;container[$offset]) ? $this-&gt;container[$offset] : null;
    }
}

$obj = new Obj;

var_dump(isset($obj["dos"]));
var_dump($obj["dos"]);
unset($obj["dos"]);
var_dump(isset($obj["dos"]));
$obj["dos"] = "Un valor";
var_dump($obj["dos"]);
$obj[] = 'Añadido 1';
$obj[] = 'Añadido 2';
$obj[] = 'Añadido 3';
print_r($obj);
?&gt;


    Resultado del ejemplo anterior es similar a:




bool(true)
int(2)
bool(false)
string(9) "Un valor"
obj Object
(
    [container:obj:private] =&gt; Array
        (
            [uno] =&gt; 1
            [tres] =&gt; 3
            [dos] =&gt; Un valor
            [0] =&gt; Añadido 1
            [1] =&gt; Añadido 2
            [2] =&gt; Añadido 3
        )

)













  # ArrayAccess::offsetExists

  (PHP 5, PHP 7, PHP 8)

ArrayAccess::offsetExists — Comprobar si existe un índice






  ### Descripción


   public **ArrayAccess::offsetExists**([mixed](#language.types.mixed) $offset): [bool](#language.types.boolean)


   Comprueba si existe o no un índice.




   Este método se ejecuta cuando se utilizan las funciones [isset()](#function.isset) o
   [empty()](#function.empty) sobre los objetos que implementan [ArrayAccess](#class.arrayaccess).



  **Nota**:



    Cuando se utiliza [empty()](#function.empty), [ArrayAccess::offsetGet()](#arrayaccess.offsetget) será
    invocada para comprobar si está vacío solamente si **ArrayAccess::offsetExists()**
    devuelve **[true](#constant.true)**.








  ### Parámetros





    offset


       El índice a comprobar.












  ### Valores devueltos


   Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.



  **Nota**:



    El valor de retorno se debe convertir a [bool](#language.types.boolean) si no devuelve un valor boleano.








  ### Ejemplos





    **Ejemplo #1 Ejemplo de ArrayAccess::offsetExists()**



&lt;?php
class obj implements ArrayAccess {
    public function offsetSet($offset, $value): void {
        var_dump(__METHOD__);
    }
    public function offsetExists($var): bool {
        var_dump(__METHOD__);
        if ($var == "foobar") {
            return true;
        }
        return false;
    }
    public function offsetUnset($var): void {
        var_dump(__METHOD__);
    }
    #[\ReturnTypeWillChange]
    public function offsetGet($var) {
        var_dump(__METHOD__);
        return "value";
    }
}

$obj = new obj;

echo "Runs obj::offsetExists()\n";
var_dump(isset($obj["foobar"]));

echo "\nRuns obj::offsetExists() and obj::offsetGet()\n";
var_dump(empty($obj["foobar"]));

echo "\nRuns obj::offsetExists(), *not* obj:offsetGet() as there is nothing to get\n";
var_dump(empty($obj["foobaz"]));
?&gt;


    Resultado del ejemplo anterior es similar a:



Runs obj::offsetExists()
string(17) "obj::offsetExists"
bool(true)

Runs obj::offsetExists() and obj::offsetGet()
string(17) "obj::offsetExists"
string(14) "obj::offsetGet"
bool(false)

Runs obj::offsetExists(), *not* obj:offsetGet() as there is nothing to get
string(17) "obj::offsetExists"
bool(true)




















  # ArrayAccess::offsetGet

  (PHP 5, PHP 7, PHP 8)

ArrayAccess::offsetGet — Offset para recuperar






  ### Descripción


   public **ArrayAccess::offsetGet**([mixed](#language.types.mixed) $offset): [mixed](#language.types.mixed)


   Devuelve el valor correspondiente a desplazamiento especificado.




   Este método se ejecuta para comprobar si el desplazamiento es [empty()](#function.empty).







  ### Parámetros






     offset


       El desplazamiento va a recuperar.












  ### Valores devueltos


   Puede devolver todos los tipos de valor.







  ### Notas

  **Nota**:



    Es posible para las implementaciones de este método para devolver por referencia.
    Esto hace que las modificaciones indirectas a las dimensiones de los arreglos sobrecargados de
    objetos [ArrayAccess](#class.arrayaccess) posibles.




    Una modificación directa es aquella que reemplaza completamente el valor de
    la dimensión de el arreglo, como en $obj[6] = 7. Una
    modificación indirecta, por el contrario, sólo una parte los cambios de la
    dimensión, o los intentos de asignar la dimensión en función de
    otra variable, como en $obj[6][7] = 7  o
    $var =&amp; $obj[6]. Con incrementos
    ++ y disminye con --
    también se aplican de una manera que requiere la modificación indirecta.




    Si bien la modificación directa desencadena una llamada a
    [ArrayAccess::offsetSet()](#arrayaccess.offsetset), modificación indirecta provoca
    una llamada  a **ArrayAccess::offsetGet()**.
    En ese caso, la aplicación de
    **ArrayAccess::offsetGet()** debe ser capaz de volver por la referencia,
    de lo contrario un **[E_NOTICE](#constant.e-notice)** mensaje es elevado..










  ### Ver también





    - [ArrayAccess::offsetExists()](#arrayaccess.offsetexists) - Comprobar si existe un índice
















  # ArrayAccess::offsetSet

  (PHP 5, PHP 7, PHP 8)

ArrayAccess::offsetSet — Asignar un valor al índice esepecificado






  ### Descripción


   public **ArrayAccess::offsetSet**([mixed](#language.types.mixed) $offset, [mixed](#language.types.mixed) $value): [void](language.types.void.html)


   Asigna un valor a un offset determinado.







  ### Parámetros






     offset


       El offset al que se asigna el valor.






     value


       El valor a asignar.












  ### Valores devueltos


   No se retorna ningún valor.







  ### Notas

  **Nota**:



    El parámetro offset será inicializado a **[null](#constant.null)** si
    otro valor no está disponible, como en el siguiente ejemplo.




&lt;?php
$arrayaccess[] = "primer valor";
$arrayaccess[] = "segundo valor";
print_r($arrayaccess);
?&gt;


     El ejemplo anterior mostrará:



Array
(
    [0] =&gt; primer valor
    [1] =&gt; segundo valor
)






  **Nota**:



    Esta función no es invocada al realizar asignaciones por referencias
    y por tanto en los cambios de dimensiones en arrays sobrecargados con
    [ArrayAccess](#class.arrayaccess) (indirecto en el sentido de que
    no se hace cambiando la dimensión directamente, sino cambiando una
    sub-dimensión o sub-propiedad o asignando la dimensión del array
    por referencia en otra variable).
    En su lugar, se llama a [ArrayAccess::offsetGet()](#arrayaccess.offsetget). La
    operación tendrá éxito si devuelve el valor por referencia.




















  # ArrayAccess::offsetUnset

  (PHP 5, PHP 7, PHP 8)

ArrayAccess::offsetUnset — Destruye un offset






  ### Descripción


   public **ArrayAccess::offsetUnset**([mixed](#language.types.mixed) $offset): [void](language.types.void.html)


   Destruye un offset.



  **Nota**:



    Este método *no* será llamado cuando se fuerza un tipo mediante
    [(unset)](#language.types.typecasting)








  ### Parámetros






     offset


       El offset a destruir.












  ### Valores devueltos


   No se retorna ningún valor.














## Tabla de contenidos
- [ArrayAccess::offsetExists](#arrayaccess.offsetexists) — Comprobar si existe un índice
- [ArrayAccess::offsetGet](#arrayaccess.offsetget) — Offset para recuperar
- [ArrayAccess::offsetSet](#arrayaccess.offsetset) — Asignar un valor al índice esepecificado
- [ArrayAccess::offsetUnset](#arrayaccess.offsetunset) — Destruye un offset












 # La interfaz Serializable



 (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)





   ## Introducción


    Interfaz que permite personalizar la serialización.





    Las clases que implementan esta interfaz ya no soportan
    [__sleep()](#object.sleep) y
    [__wakeup()](#object.wakeup).
    El método de serialización es llamado cada vez que una
    instancia debe ser serializada. No llama al método
    __destruct() y no tiene ningún efecto sobre el contenido de este método.
    Cuando los datos son serializados, la clase es conocida y
    el método unserialize() apropiado es llamado como constructor
    en lugar de llamar a __construct(). Si es necesario llamar al constructor
    estándar, se puede hacer en el método.




   **Advertencia**

     A partir de PHP 8.1.0, una clase que implemente **Serializable**
     sin también implementar [__serialize()](#object.serialize)
     y [__unserialize()](#object.unserialize) generará
     una advertencia de deprecación.








   ## Sinopsis de la Interfaz





     interface **Serializable** {

    /* Métodos */

   public [serialize](#serializable.serialize)(): [?](#language.types.null)[string](#language.types.string)
public [unserialize](#serializable.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)

   }





   ## Ejemplos


    **Ejemplo #1 Ejemplo simple**



&lt;?php
class obj implements Serializable {
    private $data;
    public function __construct() {
        $this-&gt;data = "Mis datos privados";
    }
    public function serialize() {
        return serialize($this-&gt;data);
    }
    public function unserialize($data) {
        $this-&gt;data = unserialize($data);
    }
    public function getData() {
        return $this-&gt;data;
    }
}

$obj = new obj;
$ser = serialize($obj);

var_dump($ser);

$newobj = unserialize($ser);

var_dump($newobj-&gt;getData());
?&gt;


    Resultado del ejemplo anterior es similar a:




string(38) "C:3:"obj":23:{s:19:"Mis datos privados";}"
string(19) "Mis datos privados"












  # Serializable::serialize

  (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

Serializable::serialize — Representación en formato cadena de un objeto






  ### Descripción


   public **Serializable::serialize**(): [?](#language.types.null)[string](#language.types.string)


   Devuelve la representación de un objeto en formato string.








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la representación de un objeto o **[null](#constant.null)**







  ### Errores/Excepciones


   Lanza una [Exception](#class.exception) cuando de devuelen otros tipos aparte de string y
   **[null](#constant.null)**







  ### Ver también





    - [__sleep()](#object.sleep)

    - [__serialize()](#object.serialize)
















  # Serializable::unserialize

  (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

Serializable::unserialize — Construye el objeto






  ### Descripción


   public **Serializable::unserialize**([string](#language.types.string) $data): [void](language.types.void.html)


   Es llamado durante la unserialización del objeto.



  **Nota**:



    Este método actua como el
    [constructor](#language.oop5.decon.constructor) del objeto. El método
    [__construct()](#object.construct) *no* será llamado después de este
    método.








  ### Parámetros






     data


       La representación en formato string de un objeto.












  ### Valores devueltos


   El valor devuelto por este método es ignorado.







  ### Ver también





    - [__wakeup()](#object.wakeup)

    - [__unserialize()](#object.unserialize)












## Tabla de contenidos
- [Serializable::serialize](#serializable.serialize) — Representación en formato cadena de un objeto
- [Serializable::unserialize](#serializable.unserialize) — Construye el objeto












 # La clase Closure



 (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)





   ## Introducción


    Clase utilizada para representar las [funciones anónimas](#functions.anonymous).





    Las funciones anónimas producen objetos de este tipo.
    Esta clase tiene métodos que permiten un control adicional
    de la función anónima después de su creación.





    Además de los métodos especificados aquí, esta clase también posee un método
    __invoke. Esto es por razones de lógica con la implementación de
    [el método mágico de llamada](#language.oop5.magic.invoke).








   ## Sinopsis de la Clase





     final
     class **Closure**
     {

    /* Métodos */

   private [__construct](#closure.construct)()

    public static [bind](#closure.bind)([Closure](#class.closure) $closure, [?](#language.types.null)[object](#language.types.object) $newThis, [object](#language.types.object)|[string](#language.types.string)|[null](#language.types.null) $newScope = "static"): [?](#language.types.null)[Closure](#class.closure)
public [bindTo](#closure.bindto)([?](#language.types.null)[object](#language.types.object) $newThis, [object](#language.types.object)|[string](#language.types.string)|[null](#language.types.null) $newScope = "static"): [?](#language.types.null)[Closure](#class.closure)
public [call](#closure.call)([object](#language.types.object) $newThis, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public static [fromCallable](#closure.fromcallable)([callable](#language.types.callable) $callback): [Closure](#class.closure)

   }





   ## Historial de cambios





       Versión
       Descripción






       8.4.0

        La salida de **Closure::__debugInfo()** incluye ahora el nombre, la línea y el fichero del cierre.
















  # Closure::__construct

  (PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

Closure::__construct — Constructor que anula la instanciación






  ### Descripción


   private **Closure::__construct**()


   Este método sólo existe para anular la instanciación de la clase
   [Closure](#class.closure). Los objetos de esta clase se crean
   del modo descrito en la página
   [funciones anónimas](#functions.anonymous).








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Ver también


   -
    [Funciones anónimas](#functions.anonymous)
















  # Closure::bind

  (PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

Closure::bind —
   Duplicar un cierre con un objeto vinculado y ámbito de clase especificados







  ### Descripción


   public static **Closure::bind**([Closure](#class.closure) $closure, [?](#language.types.null)[object](#language.types.object) $newThis, [object](#language.types.object)|[string](#language.types.string)|[null](#language.types.null) $newScope = "static"): [?](#language.types.null)[Closure](#class.closure)


   Este método es una versión estática de [Closure::bindTo()](#closure.bindto).
   Véase la documentación de ese método para más información.








  ### Parámetros



    closure


      La función anónima a vincular.






    newThis


      El objeto al que la función anónima dada debería ser vinculado, o
      **[null](#constant.null)** para que el cierre sea desvinculado.






    newScope


      El ámbito de clase a la que asociar el cierre, o
      'static' para mantener el actual. Si se proporciona un objeto, el tipo del
      mismo se usará en su lugar. Esto determina la visibilidad de métodos
      protegidos y privados del objeto vinculado.
      No se permite pasar (un objeto de) una clase interna a este parámetro.










  ### Valores devueltos


   Devuelve un nuevo objeto [Closure](#class.closure) object, o **[null](#constant.null)** en caso de error.







  ### Ejemplos


   **Ejemplo #1 Ejemplo de Closure::bind()**



&lt;?php
class A {
    private static $sfoo = 1;
    private $ifoo = 2;
}
$cl1 = static function() {
    return A::$sfoo;
};
$cl2 = function() {
    return $this-&gt;ifoo;
};

$bcl1 = Closure::bind($cl1, null, 'A');
$bcl2 = Closure::bind($cl2, new A(), 'A');
echo $bcl1(), "\n";
echo $bcl2(), "\n";
?&gt;


   Resultado del ejemplo anterior es similar a:



1
2








  ### Ver también


   - [Funciones anónimas](#functions.anonymous)

   - [Closure::bindTo()](#closure.bindto) - Duplica la cierre con un nuevo objeto vinculado y un nuevo contexto de clase.















  # Closure::bindTo

  (PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

Closure::bindTo —
   Duplica la cierre con un nuevo objeto vinculado y un nuevo contexto de clase.







  ### Descripción


   public **Closure::bindTo**([?](#language.types.null)[object](#language.types.object) $newThis, [object](#language.types.object)|[string](#language.types.string)|[null](#language.types.null) $newScope = "static"): [?](#language.types.null)[Closure](#class.closure)


   Crea y devuelve una nueva [función anónima
   ](#functions.anonymous) con el mismo cuerpo y las mismas variables vinculadas que la original, pero con un objeto vinculado
   que puede ser diferente, y un nuevo contexto de clase.





   El objeto vinculado determina el valor que $this tendrá en el cuerpo de la función,
   y el contexto de clase representa una clase que determina a qué miembros privados y protegidos
   la función anónima tendrá acceso. En otras palabras, las propiedades que serán visibles serán las
   mismas que si la función anónima fuera un método de la clase pasada a través del argumento
   newScope.





   Las cierres estáticas no pueden tener un objeto vinculado (el valor del argumento
   newThis debería ser **[null](#constant.null)**), pero este método puede
   utilizarse para cambiar su ámbito de clase.





   Este método verificará que una cierre no estática a la que se le pase
   un contexto de objeto se vincule a este objeto (y ya no sea no estática),
   y viceversa. Con este fin, las cierres no estáticas a las que se les pase un
   contexto de clase pero **[null](#constant.null)** como contexto de objeto serán convertidas en estáticas, y viceversa.




  **Nota**:



    Si solo se desea duplicar la función anónima, puede utilizarse
    [el clonado](#language.oop5.cloning) en su lugar.









  ### Parámetros



    newThis


      El objeto al que vincular la función anónima, o **[null](#constant.null)** para una cierre estática.






    newScope


      El contexto de clase a asociar con la cierre, o 'static' para conservar el
      contexto actual. Si se pasa un objeto, su tipo será utilizado.
      Esto determina la visibilidad de los métodos protegidos y privados del objeto vinculado.
      No está permitido pasar (un objeto de) una clase interna para
      este argumento.










  ### Valores devueltos


   Devuelve la nueva cierre en forma de objeto [Closure](#class.closure),
   o **[null](#constant.null)** en caso de error.







  ### Ejemplos


   **Ejemplo #1 Ejemplo Closure::bindTo()**



&lt;?php

class A
{
    private $val;

    public function __construct($val)
    {
        $this-&gt;val = $val;
    }

    public function getClosure()
    {
        //Retorna una cierre vinculada a este objeto y contexto
        return function() {
            return $this-&gt;val;
        };
    }
}

$ob1 = new A(1);
$ob2 = new A(2);

$cl = $ob1-&gt;getClosure();
echo $cl(), "\n";
$cl = $cl-&gt;bindTo($ob2);
echo $cl(), "\n";
?&gt;


   Resultado del ejemplo anterior es similar a:



1
2







  ### Ver también


   - [Funciones anónimas](#functions.anonymous)

   - [Closure::bind()](#closure.bind) - Duplicar un cierre con un objeto vinculado y ámbito de clase especificados















  # Closure::call

  (PHP 7, PHP 8)

Closure::call — Vincula y llama al cierre





  ### Descripción


   public **Closure::call**([object](#language.types.object) $newThis, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)


   Vincula temporalmente el cierre a newThis, y lo
   llama con cualquier parámetro dado.






  ### Parámetros



    newThis


      El [object](#language.types.object) a vincular al cierre mientras dure la
      llamada.






    args


      Cero o más parámetros, que serán dados como parámetros al
      cierre.









  ### Valores devueltos


   Devuelve el valor devuelto por el cierre.






  ### Ejemplos


   **Ejemplo #1 Ejemplo de Closure::call()**



&lt;?php
class Valor {
    protected $valor;

    public function __construct($valor) {
        $this-&gt;valor = $valor;
    }

    public function getValor() {
        return $this-&gt;valor;
    }
}

$tres = new Valor(3);
$cuatro = new Valor(4);

$cierre = function ($delta) { var_dump($this-&gt;getValor() + $delta); };
$cierre-&gt;call($tres, 4);
$cierre-&gt;call($cuatro, 4);
?&gt;


   El ejemplo anterior mostrará:



int(7)
int(8)















  # Closure::fromCallable

  (PHP 7 &gt;= 7.1.0)

Closure::fromCallable — Convierte un 'callable' en un cierre






  ### Descripción


   public static **Closure::fromCallable**([callable](#language.types.callable) $callback): [Closure](#class.closure)


   Crea y devuelve una nueva [función
   anónima](#functions.anonymous) desde el callback dado empleando el
   ámbito actual. Este método comprueba si callback es
   llamable en el ámbito actual, lanzando un [TypeError](#class.typeerror)
   si no lo es.



  **Nota**:



    A partir de PHP 8.1.0,
    [Sintaxis de llamada de primera clase](#functions.first_class_callable_syntax)
    tiene la misma semántica que este método.








  ### Parámetros



    callback


      El «callable» a convertir.










  ### Valores devueltos


   Devuelve el recién creado [Closure](#class.closure) o lanza un
   [TypeError](#class.typeerror) si callback no
   es llamable en el ámbito actual.







  ### Ver también


   - [Funciones anónimas](#functions.anonymous)

   - [Sintaxis de las llamadas de primera clase](#functions.first_class_callable_syntax)











## Tabla de contenidos
- [Closure::__construct](#closure.construct) — Constructor que anula la instanciación
- [Closure::bind](#closure.bind) — Duplicar un cierre con un objeto vinculado y ámbito de clase especificados
- [Closure::bindTo](#closure.bindto) — Duplica la cierre con un nuevo objeto vinculado y un nuevo contexto de clase.
- [Closure::call](#closure.call) — Vincula y llama al cierre
- [Closure::fromCallable](#closure.fromcallable) — Convierte un 'callable' en un cierre













 # La clase stdClass



 (PHP 4, PHP 5, PHP 7, PHP 8)




   ## Introducción


    Una clase genérica vacía con propiedades dinámicas.





    Los objetos de esta clase pueden ser instanciados con el operador
    [new](#language.oop5.basic.new) o creados utilizando la
    [conversión en objeto](#language.types.object.casting).
    Varias funciones PHP crean asimismo instancias de esta clase, por ejemplo
    [json_decode()](#function.json-decode), [mysqli_fetch_object()](#mysqli-result.fetch-object)
    o [PDOStatement::fetchObject()](#pdostatement.fetchobject).





    Aunque no implementa
    [__get()](#object.get)/[__set()](#object.set)
    esta clase permite propiedades dinámicas y no requiere el atributo
    #[\AllowDynamicProperties].





    No es una clase base porque PHP no tiene un concepto de clase base
    universal. Sin embargo, es posible crear una clase personalizada que extienda
    **stdClass** y que herede así la funcionalidad
    de las propiedades dinámicas.






   ## Sinopsis de la Clase




     class **stdClass**
     {
   }


    Esta clase no tiene métodos ni propiedades por omisión.






   ## Ejemplos


    **Ejemplo #1 Creado a partir de una conversión de tipo en objeto**



&lt;?php
$obj = (object) array('foo' =&gt; 'bar');
var_dump($obj);


    El ejemplo anterior mostrará:




object(stdClass)#1 (1) {
  ["foo"]=&gt;
  string(3) "bar"
}




    **Ejemplo #2 Creado como resultado de [json_decode()](#function.json-decode)**



&lt;?php
$json = '{"foo":"bar"}';
var_dump(json_decode($json));


    El ejemplo anterior mostrará:




object(stdClass)#1 (1) {
  ["foo"]=&gt;
  string(3) "bar"
}




    **Ejemplo #3 Declaración de propiedades dinámicas**



&lt;?php
$obj = new stdClass();
$obj-&gt;foo = 42;
$obj-&gt;{1} = 42;
var_dump($obj);


    El ejemplo anterior mostrará:




object(stdClass)#1 (2) {
  ["foo"]=&gt;
  int(42)
  ["1"]=&gt;
  int(42)
}


















 # La clase Generator



 (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)





   ## Introducción


    Los objetos **Generator** son devueltos desde
    [generadores](#language.generators).




   **Precaución**

     Los objetos **Generator** no pueden ser instanciados mediante
     [new](#language.oop5.basic.new).









   ## Sinopsis de la Clase





     final
     class **Generator**



     implements
      [Iterator](#class.iterator) {

    /* Métodos */

   public [current](#generator.current)(): [mixed](#language.types.mixed)
public [getReturn](#generator.getreturn)(): [mixed](#language.types.mixed)
public [key](#generator.key)(): [mixed](#language.types.mixed)
public [next](#generator.next)(): [void](language.types.void.html)
public [rewind](#generator.rewind)(): [void](language.types.void.html)
public [send](#generator.send)([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)
public [throw](#generator.throw)([Throwable](#class.throwable) $exception): [mixed](#language.types.mixed)
public [valid](#generator.valid)(): [bool](#language.types.boolean)
public [__wakeup](#generator.wakeup)(): [void](language.types.void.html)

   }





   ## Ver también

   Véase también [iteración de objetos](#language.oop5.iterations).











  # Generator::current

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::current — Obtener el valor producido






  ### Descripción


   public **Generator::current**(): [mixed](#language.types.mixed)





  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el valor producido.

















  # Generator::getReturn

  (PHP 7, PHP 8)

Generator::getReturn — Obtener el valor devuelto de un generador






  ### Descripción

  public **Generator::getReturn**(): [mixed](#language.types.mixed)





  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el valor devuelto del generador una vez ha finalizado su ejecución.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Generator::getReturn()**



&lt;?php

$gen = (function() {
    yield 1;
    yield 2;

    return 3;
})();

foreach ($gen as $val) {
    echo $val, PHP_EOL;
}

echo $gen-&gt;getReturn(), PHP_EOL;


    El ejemplo anterior mostrará:



1
2
3
















  # Generator::key

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::key — Obtener la clave generada






  ### Descripción


   public **Generator::key**(): [mixed](#language.types.mixed)


   Obtiene la clave del valor generado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la clave generada.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Generator::key()**



&lt;?php

function Gen()
{
    yield 'key' =&gt; 'value';
}

$gen = Gen();

echo "{$gen-&gt;key()} =&gt; {$gen-&gt;current()}";


    El ejemplo anterior mostrará:



key =&gt; value
















  # Generator::next

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::next — Continua la ejecución del generador






  ### Descripción


   public **Generator::next**(): [void](language.types.void.html)


   Llamar a **Generator::next()** tiene el mismo efecto que llamar a
   [Generator::send()](#generator.send) con **[null](#constant.null)** como argumento.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.

















  # Generator::rewind

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::rewind — Reinicia el iterador al primer yield






  ### Descripción


   public **Generator::rewind**(): [void](language.types.void.html)


   El método devuelve el generador al punto anterior al primer [yield](#control-structures.yield).
   Si el generador no está en el primer [yield](#control-structures.yield) cuando se llama a este método,
   se avanzará primero hasta la primera expresión [yield](#control-structures.yield) antes de retroceder.
   Si el generador ya está al inicio del segundo [yield](#control-structures.yield),
   se lanzará una [Exception](#class.exception).



  **Nota**:



    Se trata del método *primero* llamado al inicio de
    un ciclo [foreach](#control-structures.foreach). *No* se *ejecutará*
    *después* de los ciclos [foreach](#control-structures.foreach).








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de Generator::rewind()**



&lt;?php

function generator(): Generator
{
    echo "¡Soy un generador!\n";

    for ($i = 1; $i &lt;= 3; $i++) {
        yield $i;
    }
}

// Inicializar el generador
$generator = generator();

// Devolver el generador al inicio de la primera expresión yield,
// si no lo está ya
$generator-&gt;rewind(); // ¡Soy un generador!

// No ocurre nada aquí; el generador ya está reiniciado
$generator-&gt;rewind(); // Sin salida (NULL)

// Esto devuelve el generador al inicio de la primera expresión yield,
// si no lo está ya, e itera sobre el generador
foreach ($generator as $value) {
    // Después de devolver el primer valor, el generador permanece en
    // la primera expresión yield hasta que se reanude la ejecución y avance a la siguiente yield
    echo $value, PHP_EOL; // 1

    break;
}

// Reanudar y reiniciar nuevamente. No se produce ningún error ya que el generador no ha avanzado más allá del primer yield
$generator-&gt;rewind();

echo $generator-&gt;current(), PHP_EOL; // 1

// No se produce ningún error, el generador sigue en la primera yield
$generator-&gt;rewind();

// Esto hace avanzar el generador a la segunda expresión yield
$generator-&gt;next();

try {
    // Esto lanzará una excepción,
    // ya que el generador ya ha avanzado a la segunda yield
    $generator-&gt;rewind(); // Error fatal: Exception no capturada: No se puede devolver un generador que ya ha sido ejecutado
} catch (Exception $e) {
    echo $e-&gt;getMessage();
}

?&gt;


    El ejemplo anterior mostrará:



¡Soy un generador!
1
1
No se puede devolver un generador que ya ha sido ejecutado

















  # Generator::send

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::send — Enviar un valor al generador






  ### Descripción


   public **Generator::send**([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)


   Envía el valor dado al generador como resultado de la expresión [yield](#control-structures.yield)
   actual y reanuda la ejecución del generador.




   Si el generador no es una expresión [yield](#control-structures.yield) en el momento de invocar a este método,
   se permitirá avanzar a la primera expresión [yield](#control-structures.yield) antes de enviar el
   valor. Por tanto, no es necesario «preparar» generadores de PHP con una
   llamada a [Generator::next()](#generator.next) (como se hace en Python).







  ### Parámetros



    value


      El valor a enviar al generador. Este valor será el valor devuelto de la
      expresión [yield](#control-structures.yield) en la que está actualmente el generador.










  ### Valores devueltos


   Devuelve el valor producido.







  ### Ejemplos





    **Ejemplo #1 Empleo de Generator::send()** para inyectar valores



&lt;?php
function printer() {
    echo "¡Soy una impresora!".PHP_EOL;
    while (true) {
        $string = yield;
        echo $string;
    }
}

$printer = printer();
$printer-&gt;send('¡Hola mundo!');
$printer-&gt;send('¡Adiós mundo!');
?&gt;


    El ejemplo anterior mostrará:



¡Soy una impresora!
¡Hola mundo!
¡Adiós mundo!
















  # Generator::throw

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::throw — Lanzar una excepción dentro generador






  ### Descripción


   public **Generator::throw**([Throwable](#class.throwable) $exception): [mixed](#language.types.mixed)


   Lanza una excepción dentro del generador y reanuda su ejecución.
   El comportamiento será el mismo que si la expresión [yield](#control-structures.yield) actual fuera reemplazada con
   una sentencia throw $exception.




   Si el generador ya está cerrado al invocar a este método, la excepción
   será lanzada en su lugar en el contexto del invocador.







  ### Parámetros



    exception


      La excepción a lanzar dentro del generador.










  ### Valores devueltos


   Devuelve el valor generado.







  ### Ejemplos





    **Ejemplo #1 Lanzar una ecepión dentro de un generador**



&lt;?php
function gen() {
    echo "Foo\n";
    try {
        yield;
    } catch (Exception $e) {
        echo "Excepción: {$e-&gt;getMessage()}\n";
    }
    echo "Bar\n";
}

$gen = gen();
$gen-&gt;rewind();
$gen-&gt;throw(new Exception('Prueba'));
?&gt;


    El ejemplo anterior mostrará:



Foo
Excepción: Prueba
Bar
















  # Generator::valid

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::valid — Verificar si el iterador ha sido cerrado






  ### Descripción


   public **Generator::valid**(): [bool](#language.types.boolean)





  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve **[false](#constant.false)** si el iterador ha sido cerrado. De lo contrario devuelve **[true](#constant.true)**.

















  # Generator::__wakeup

  (PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

Generator::__wakeup — Serialize callback






  ### Descripción


   public **Generator::__wakeup**(): [void](language.types.void.html)


   Lanza una excepción indicando que el generador no puede ser presentado.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   No se retorna ningún valor.













## Tabla de contenidos
- [Generator::current](#generator.current) — Obtener el valor producido
- [Generator::getReturn](#generator.getreturn) — Obtener el valor devuelto de un generador
- [Generator::key](#generator.key) — Obtener la clave generada
- [Generator::next](#generator.next) — Continua la ejecución del generador
- [Generator::rewind](#generator.rewind) — Reinicia el iterador al primer yield
- [Generator::send](#generator.send) — Enviar un valor al generador
- [Generator::throw](#generator.throw) — Lanzar una excepción dentro generador
- [Generator::valid](#generator.valid) — Verificar si el iterador ha sido cerrado
- [Generator::__wakeup](#generator.wakeup) — Serialize callback











 # La clase Fiber



 (PHP 8 &gt;= 8.1.0)





   ## Introducción


    Las fibras representan funciones interrumpibles en toda la pila. Las fibras pueden ser suspendidas en cualquier punto de la pila de llamadas,
    interrumpiendo la ejecución dentro de la fibra hasta que la fibra sea reanudada posteriormente.







   ## Sinopsis de la Clase





     final
     class **Fiber**
     {

    /* Métodos */

   public [__construct](#fiber.construct)([callable](#language.types.callable) $callback)

    public [start](#fiber.start)([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [resume](#fiber.resume)([mixed](#language.types.mixed) $value = **[null](#constant.null)**): [mixed](#language.types.mixed)
public [throw](#fiber.throw)([Throwable](#class.throwable) $exception): [mixed](#language.types.mixed)
public [getReturn](#fiber.getreturn)(): [mixed](#language.types.mixed)
public [isStarted](#fiber.isstarted)(): [bool](#language.types.boolean)
public [isSuspended](#fiber.issuspended)(): [bool](#language.types.boolean)
public [isRunning](#fiber.isrunning)(): [bool](#language.types.boolean)
public [isTerminated](#fiber.isterminated)(): [bool](#language.types.boolean)
public static [suspend](#fiber.suspend)([mixed](#language.types.mixed) $value = **[null](#constant.null)**): [mixed](#language.types.mixed)
public static [getCurrent](#fiber.getcurrent)(): [?](#language.types.null)[Fiber](#class.fiber)

   }





   ## Ver también

   [Visión general de las fibras](#language.fibers)











  # Fiber::__construct

  (PHP 8 &gt;= 8.1.0)

Fiber::__construct — Crea una nueva instancia de Fibra






  ### Descripción


   public **Fiber::__construct**([callable](#language.types.callable) $callback)





  ### Parámetros



    callback


      El [callable](#language.types.callable) a invocar al iniciar la fibra.
      Los argumentos dados a [Fiber::start()](#fiber.start) serán
      proporcionados como argumentos a la función dada.



















  # Fiber::start

  (PHP 8 &gt;= 8.1.0)

Fiber::start — Inicia la ejecución de la fibra






  ### Descripción


   public **Fiber::start**([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)


   Una lista variádica de argumentos a proporcionar a la función utilizada durante la construcción de la fibra.




   Si la fibra ya ha sido iniciada cuando se llama a este método, se emitirá un error [FiberError](#class.fibererror).







  ### Parámetros



    args


      Los argumentos a utilizar durante la invocación de la función dada al constructor de la fibra.










  ### Valores devueltos


   El valor proporcionado a la primera llamada a [Fiber::suspend()](#fiber.suspend) o **[null](#constant.null)** si la fibra retorna.
   Si la fibra lanza una excepción antes de suspenderse, será emitida durante la llamada a este método.
















  # Fiber::resume

  (PHP 8 &gt;= 8.1.0)

Fiber::resume — Reanuda la ejecución de la fibra con un valor






  ### Descripción


   public **Fiber::resume**([mixed](#language.types.mixed) $value = **[null](#constant.null)**): [mixed](#language.types.mixed)


   Reanuda la fibra utilizando el valor dado como resultado de la llamada actual a [Fiber::suspend()](#fiber.suspend).




   Si la fibra no está suspendida al llamar a este método, se lanzará un [FiberError](#class.fibererror).







  ### Parámetros



    value


      El valor para reanudar la fibra. Este valor será el valor de retorno de la llamada
      [Fiber::suspend()](#fiber.suspend) en curso.










  ### Valores devueltos


   El valor proporcionado a la próxima llamada a [Fiber::suspend()](#fiber.suspend) o **[null](#constant.null)** si la fibra retorna.
   Si la fibra lanza una excepción antes de suspenderse, será lanzada al llamar a este método.
















  # Fiber::throw

  (PHP 8 &gt;= 8.1.0)

Fiber::throw — Reanuda la ejecución de la fibra con una excepción






  ### Descripción


   public **Fiber::throw**([Throwable](#class.throwable) $exception): [mixed](#language.types.mixed)


   Reanuda la fibra lanzando la excepción dada desde la llamada [Fiber::suspend()](#fiber.suspend) en curso.




   Si la fibra no está suspendida cuando se llama a este método, se emitirá una excepción [FiberError](#class.fibererror).







  ### Parámetros



    exception


      La excepción a lanzar en la fibra desde la llamada [Fiber::suspend()](#fiber.suspend) en curso.










  ### Valores devueltos


   El valor proporcionado en la próxima llamada a [Fiber::suspend()](#fiber.suspend) o **[null](#constant.null)** si la fibra retorna.
   Si la fibra lanza una excepción antes de suspenderse, será emitida al llamar a este método.
















  # Fiber::getReturn

  (PHP 8 &gt;= 8.1.0)

Fiber::getReturn — Obtiene el valor devuelto por la fibra






  ### Descripción


   public **Fiber::getReturn**(): [mixed](#language.types.mixed)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el valor devuelto por la fibra [callable](#language.types.callable) proporcionada a [Fiber::__construct()](#fiber.construct).
   Si la fibra no ha devuelto un valor, ya sea porque no ha sido lanzada, porque no ha terminado,
   o porque ha lanzado una excepción, se emitirá un [FiberError](#class.fibererror).
















  # Fiber::isStarted

  (PHP 8 &gt;= 8.1.0)

Fiber::isStarted — Determina si la fibra ha iniciado






  ### Descripción


   public **Fiber::isStarted**(): [bool](#language.types.boolean)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve **[true](#constant.true)** solo después de que la fibra haya sido iniciada; de lo contrario, se devuelve **[false](#constant.false)**.
















  # Fiber::isSuspended

  (PHP 8 &gt;= 8.1.0)

Fiber::isSuspended — Determina si la fibra está suspendida






  ### Descripción


   public **Fiber::isSuspended**(): [bool](#language.types.boolean)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve **[true](#constant.true)** si la fibra está actualmente suspendida; de lo contrario, devuelve **[false](#constant.false)**.
















  # Fiber::isRunning

  (PHP 8 &gt;= 8.1.0)

Fiber::isRunning — Determina si la fibra está en ejecución






  ### Descripción


   public **Fiber::isRunning**(): [bool](#language.types.boolean)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve **[true](#constant.true)** solo si la fibra está en ejecución. Una fibra se considera en ejecución después de una llamada a
   [Fiber::start()](#fiber.start), [Fiber::resume()](#fiber.resume), o
   [Fiber::throw()](#fiber.throw) que aún no ha retornado.
   Devuelve **[false](#constant.false)** si la fibra no está en ejecución.
















  # Fiber::isTerminated

  (PHP 8 &gt;= 8.1.0)

Fiber::isTerminated — Determina si la fibra ha terminado






  ### Descripción


   public **Fiber::isTerminated**(): [bool](#language.types.boolean)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve **[true](#constant.true)** solo después de que la fibra haya terminado, ya sea devolviendo o lanzando una excepción; de lo contrario, se devuelve **[false](#constant.false)**.
















  # Fiber::suspend

  (PHP 8 &gt;= 8.1.0)

Fiber::suspend — Suspende la ejecución de la fibra actual






  ### Descripción


   public static **Fiber::suspend**([mixed](#language.types.mixed) $value = **[null](#constant.null)**): [mixed](#language.types.mixed)


   Suspende la ejecución de la fibra actual. El valor proporcionado a este método será devuelto por la llamada a
   [Fiber::start()](#fiber.start), [Fiber::resume()](#fiber.resume), o
   [Fiber::throw()](#fiber.throw) que hizo cambiar la ejecución a la fibra actual.




   Cuando la fibra se reanuda, este método devuelve el valor proporcionado a [Fiber::resume()](#fiber.resume).
   Si la fibra se reanuda utilizando [Fiber::throw()](#fiber.throw), la excepción dada a este método será
   emitida al llamar a este método.




   Si este método es llamado desde fuera de una fibra, una [FiberError](#class.fibererror) será emitida.







  ### Parámetros



    value


      El valor a devolver de la llamada a [Fiber::start()](#fiber.start),
      [Fiber::resume()](#fiber.resume), o [Fiber::throw()](#fiber.throw) que hizo cambiar la ejecución a
      la fibra actual.










  ### Valores devueltos


   El valor proporcionado a [Fiber::resume()](#fiber.resume).
















  # Fiber::getCurrent

  (PHP 8 &gt;= 8.1.0)

Fiber::getCurrent — Obtiene la instancia de Fibra en ejecución






  ### Descripción

  public static **Fiber::getCurrent**(): [?](#language.types.null)[Fiber](#class.fiber)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la instancia [Fiber](#class.fiber) en ejecución o **[null](#constant.null)** si este método es llamado desde fuera de una fibra.












## Tabla de contenidos
- [Fiber::__construct](#fiber.construct) — Crea una nueva instancia de Fibra
- [Fiber::start](#fiber.start) — Inicia la ejecución de la fibra
- [Fiber::resume](#fiber.resume) — Reanuda la ejecución de la fibra con un valor
- [Fiber::throw](#fiber.throw) — Reanuda la ejecución de la fibra con una excepción
- [Fiber::getReturn](#fiber.getreturn) — Obtiene el valor devuelto por la fibra
- [Fiber::isStarted](#fiber.isstarted) — Determina si la fibra ha iniciado
- [Fiber::isSuspended](#fiber.issuspended) — Determina si la fibra está suspendida
- [Fiber::isRunning](#fiber.isrunning) — Determina si la fibra está en ejecución
- [Fiber::isTerminated](#fiber.isterminated) — Determina si la fibra ha terminado
- [Fiber::suspend](#fiber.suspend) — Suspende la ejecución de la fibra actual
- [Fiber::getCurrent](#fiber.getcurrent) — Obtiene la instancia de Fibra en ejecución












 # La clase WeakReference



 (PHP 7 &gt;= 7.4.0, PHP 8)





   ## Introducción


    Las referencias débiles permiten al programador mantener una referencia a un objeto sin impedir su destrucción.
    Son útiles para implementar estructuras como cachés.
    Si el objeto original ha sido destruido, **[null](#constant.null)** será devuelto
    al llamar al método [WeakReference::get()](#weakreference.get).
    El objeto original será destruido cuando el
    [contador de referencias](#features.gc.refcounting-basics) llegue a cero;
    la creación de referencias débiles no incrementa el contador de referencias del objeto referenciado.




    Las **WeakReference**s no pueden ser serializadas.







   ## Sinopsis de la Clase





     final
     class **WeakReference**
     {

    /* Métodos */

   public [__construct](#weakreference.construct)()

    public static [create](#weakreference.create)([object](#language.types.object) $object): [WeakReference](#class.weakreference)
public [get](#weakreference.get)(): [?](#language.types.null)[object](#language.types.object)

   }





   ## Ejemplo con WeakReference





     **Ejemplo #1 Uso Simple de WeakReference**



&lt;?php

$obj = new stdClass();
$weakref = WeakReference::create($obj);

var_dump($weakref-&gt;get());

unset($obj);

var_dump($weakref-&gt;get());

?&gt;


     Resultado del ejemplo anterior es similar a:




object(stdClass)#1 (0) {
}
NULL







   ## Historial de cambios





       Versión
       Descripción






       8.4.0

        La salida de **WeakReference::__debugInfo()** incluye ahora el objeto referenciado, o NULL si la referencia ya no es válida.
















  # WeakReference::__construct

  (PHP 7 &gt;= 7.4.0, PHP 8)

WeakReference::__construct — Constructor que no permite la instanciación






  ### Descripción


   public **WeakReference::__construct**()


   Este método existe sólo para no permitir la instanciación de la clase [WeakReference](#class.weakreference).
   Las referencias débiles deben ser instanciadas con el método factory [WeakReference::create()](#weakreference.create).







  ### Parámetros

  Esta función no contiene ningún parámetro.








  ### Ver también


   - [WeakReference::create()](#weakreference.create) - Crea una nueva referencia débil















  # WeakReference::create

  (PHP 7 &gt;= 7.4.0, PHP 8)

WeakReference::create — Crea una nueva referencia débil






  ### Descripción


   public static **WeakReference::create**([object](#language.types.object) $object): [WeakReference](#class.weakreference)


   Crea una nueva [WeakReference](#class.weakreference).







  ### Parámetros



    object


      El objeto a ser referenciado débilmente.










  ### Valores devueltos


   Devuelve una nueva [WeakReference](#class.weakreference), o la instancia existente si ya había una [WeakReference](#class.weakreference) al mismo objeto.
















  # WeakReference::get

  (PHP 7 &gt;= 7.4.0, PHP 8)

WeakReference::get — Obtiene un objeto débilmente referenciado






  ### Descripción


   public **WeakReference::get**(): [?](#language.types.null)[object](#language.types.object)


   Se obtiene un objeto débilmente referenciado.
   Si el objeto ya ha sido destruido, devuelve **[null](#constant.null)**.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el referenciado [object](#language.types.object), o **[null](#constant.null)** si el objeto ha sido destruido.












## Tabla de contenidos
- [WeakReference::__construct](#weakreference.construct) — Constructor que no permite la instanciación
- [WeakReference::create](#weakreference.create) — Crea una nueva referencia débil
- [WeakReference::get](#weakreference.get) — Obtiene un objeto débilmente referenciado













 # La clase WeakMap



 (PHP 8)





   ## Introducción


    Un **WeakMap** es un array asociativo (o diccionario) que acepta objetos como claves. Sin embargo, a diferencia
    del similar [SplObjectStorage](#class.splobjectstorage), un objeto en una clave de **WeakMap**
    no contribuye al número de referencias del objeto. En otras palabras, si, en un momento dado, la única referencia restante
    a un objeto es la clave de un **WeakMap**, el objeto será recolectado y eliminado del **WeakMap**.
    Su principal caso de uso es la construcción de cachés de datos derivados de un objeto que no necesitan ser conservados
    más tiempo que el objeto.




    **WeakMap** implementa [ArrayAccess](#class.arrayaccess),
    [Traversable](#class.traversable) (vía [IteratorAggregate](#class.iteratoraggregate)),
    y [Countable](#class.countable), de modo que, en la mayoría de los casos, puede ser utilizado de la misma manera que un array asociativo.







   ## Sinopsis de la Clase





     final
     class **WeakMap**



     implements
      [ArrayAccess](#class.arrayaccess),

     [Countable](#class.countable),

     [IteratorAggregate](#class.iteratoraggregate) {

    /* Métodos */

   public [count](#weakmap.count)(): [int](#language.types.integer)
public [getIterator](#weakmap.getiterator)(): [Iterator](#class.iterator)
public [offsetExists](#weakmap.offsetexists)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [offsetGet](#weakmap.offsetget)([object](#language.types.object) $object): [mixed](#language.types.mixed)
public [offsetSet](#weakmap.offsetset)([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#weakmap.offsetunset)([object](#language.types.object) $object): [void](language.types.void.html)

   }





   ## Ejemplos





     **Ejemplo #1 Ejemplo de uso de un Weakmap**



      &lt;?php
$wm = new WeakMap();

$o = new stdClass;

class A {
    public function __destruct() {
        echo "Dead!\n";
    }
}

$wm[$o] = new A;

var_dump(count($wm));
echo "Unsetting...\n";
unset($o);
echo "Done\n";
var_dump(count($wm));


     El ejemplo anterior mostrará:




int(1)
Unsetting...
Dead!
Done
int(0)















  # WeakMap::count

  (PHP 8)

WeakMap::count — Cuenta el número de entradas activas en el diccionario






  ### Descripción


   public **WeakMap::count**(): [int](#language.types.integer)


   Cuenta el número de entradas activas en el diccionario.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve el número de entradas activas en el diccionario.
















  # WeakMap::getIterator

  (PHP 8)

WeakMap::getIterator — Recupera un iterador externo






  ### Descripción

  public **WeakMap::getIterator**(): [Iterator](#class.iterator)


   Devuelve un iterador externo.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Una instancia de un objeto que implementa [Iterator](#class.iterator) o
  [Traversable](#class.traversable)







  ### Errores/Excepciones


   Lanza un [Exception](#class.exception) en caso de error.

















  # WeakMap::offsetExists

  (PHP 8)

WeakMap::offsetExists — Verifica si un cierto objeto se encuentra en el diccionario






  ### Descripción


   public **WeakMap::offsetExists**([object](#language.types.object) $object): [bool](#language.types.boolean)


   Verifica si el objeto transmitido está referenciado en el diccionario.








  ### Parámetros



    object


      Objeto a verificar.










  ### Valores devueltos


   Devuelve **[true](#constant.true)** si el objeto está contenido en el diccionario, **[false](#constant.false)** en caso contrario.
















  # WeakMap::offsetGet

  (PHP 8)

WeakMap::offsetGet — Devuelve el valor indicado por un cierto objeto






  ### Descripción


   public **WeakMap::offsetGet**([object](#language.types.object) $object): [mixed](#language.types.mixed)


   Devuelve el valor indicado por un cierto objeto.







  ### Parámetros



    object


      Un objeto contenido como clave en el diccionario.










  ### Valores devueltos


   Devuelve el valor asociado al objeto pasado como argumento.







  ### Errores/Excepciones


   Lanza una [Error](#class.error) en caso de fallo.

















  # WeakMap::offsetSet

  (PHP 8)

WeakMap::offsetSet — Actualiza el diccionario con una nueva pareja clave-valor






  ### Descripción


   public **WeakMap::offsetSet**([object](#language.types.object) $object, [mixed](#language.types.mixed) $value): [void](language.types.void.html)


   Actualiza el diccionario con una nueva pareja clave-valor. Si la clave ya existía,
   el valor antiguo es reemplazado por el nuevo.







  ### Parámetros



    object


       El objeto que sirve de clave a la pareja clave-valor.






    value


       Los datos arbitrarios que sirven de valor a la pareja clave-valor.










  ### Valores devueltos


   No se retorna ningún valor.

















  # WeakMap::offsetUnset

  (PHP 8)

WeakMap::offsetUnset — Elimina una entrada del diccionario






  ### Descripción


   public **WeakMap::offsetUnset**([object](#language.types.object) $object): [void](language.types.void.html)


   Elimina una entrada del diccionario.







  ### Parámetros



    object


      El objeto clave a eliminar del diccionario.










  ### Valores devueltos


   No se retorna ningún valor.












## Tabla de contenidos
- [WeakMap::count](#weakmap.count) — Cuenta el número de entradas activas en el diccionario
- [WeakMap::getIterator](#weakmap.getiterator) — Recupera un iterador externo
- [WeakMap::offsetExists](#weakmap.offsetexists) — Verifica si un cierto objeto se encuentra en el diccionario
- [WeakMap::offsetGet](#weakmap.offsetget) — Devuelve el valor indicado por un cierto objeto
- [WeakMap::offsetSet](#weakmap.offsetset) — Actualiza el diccionario con una nueva pareja clave-valor
- [WeakMap::offsetUnset](#weakmap.offsetunset) — Elimina una entrada del diccionario












 # La interfaz Stringable



 (PHP 8)





   ## Introducción


    La interfaz **Stringable** designa una clase que posee
    un método [__toString()](#object.tostring). A diferencia de la mayoría de las interfaces,
    **Stringable** está implícitamente presente en cualquier clase para la cual el método mágico
    [__toString()](#object.tostring) está definido, aunque puede y debe ser declarada explícitamente.




    Su valor principal es permitir a las funciones verificar el tipo en comparación
    con el tipo de unión string|Stringable para aceptar ya sea un string primitivo,
    ya sea un objeto que pueda ser convertido a string.







   ## Sinopsis de la Interfaz





     interface **Stringable** {

    /* Métodos */

   public [__toString](#stringable.tostring)(): [string](#language.types.string)

   }





   ## Ejemplos





     **Ejemplo #1 Ejemplo simple**


     Esto utiliza la [promoción de propiedades del constructor](#language.oop5.decon.constructor.promotion).



&lt;?php
class IPv4Address implements Stringable {
    public function __construct(
        private string $oct1,
        private string $oct2,
        private string $oct3,
        private string $oct4,
    ) {}

    public function __toString(): string {
        return "$this-&gt;oct1.$this-&gt;oct2.$this-&gt;oct3.$this-&gt;oct4";
    }
}

function showStuff(string|Stringable $value) {
    // Para un Stringable, esto llamará implícitamente a __toString().
    print $value;
}

$ip = new IPv4Address('123', '234', '42', '9');

showStuff($ip);
?&gt;


     Resultado del ejemplo anterior es similar a:




123.234.42.9













  # Stringable::__toString

  (PHP 8)

Stringable::__toString — Devuelve la representación del objeto en forma de string






  ### Descripción


   public **Stringable::__toString**(): [string](#language.types.string)









  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Devuelve la representación de un objeto en forma de string.







  ### Ver también





    - [__toString()](#object.tostring)










## Tabla de contenidos
- [Stringable::__toString](#stringable.tostring) — Devuelve la representación del objeto en forma de string











 # La interfaz UnitEnum



 (PHP 8 &gt;= 8.1.0)





   ## Introducción


    La interfaz **UnitEnum** es automáticamente aplicada a todas las enumeraciones por el motor. No puede ser implementada por clases definidas por el usuario. Las enumeraciones no pueden sobrescribir sus métodos, ya que las implementaciones por omisión son proporcionadas por el motor. Solo está disponible para las verificaciones de tipo.







   ## Sinopsis de la Interfaz





     interface **UnitEnum** {

    /* Métodos */

   public static [cases](#unitenum.cases)(): [array](#language.types.array)

   }











  # UnitEnum::cases

  (PHP 8 &gt;= 8.1.0)

UnitEnum::cases — Genera una lista de casos sobre una enumeración






  ### Descripción


   public static **UnitEnum::cases**(): [array](#language.types.array)


   Este método devuelve un array de todos los casos de una enumeración, en el orden de su declaración.








  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Un array de todos los casos definidos de esta enumeración, en el orden de la declaración.







  ### Ejemplos


   **Ejemplo #1 Uso básico**



    El siguiente ejemplo ilustra la forma en que los casos de enumeración son devueltos.




&lt;?php
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

var_dump(Suit::cases());
?&gt;


   El ejemplo anterior mostrará:



array(4) {
    [0]=&gt;
    enum(Suit::Hearts)
    [1]=&gt;
    enum(Suit::Diamonds)
    [2]=&gt;
    enum(Suit::Clubs)
    [3]=&gt;
    enum(Suit::Spades)
}












## Tabla de contenidos
- [UnitEnum::cases](#unitenum.cases) — Genera una lista de casos sobre una enumeración











 # La interfaz BackedEnum



 (PHP 8 &gt;= 8.1.0)





   ## Introducción


    La interfaz **BackedEnum** es automáticamente aplicada a las enumeraciones con valor de base
    por el motor. No puede ser implementada por clases definidas por el usuario.
    Las enumeraciones no pueden sobreescribir sus métodos, ya que las implementaciones por omisión
    son proporcionadas por el motor. Solo está disponible para las verificaciones de tipo.







   ## Sinopsis de la Interfaz





     interface **BackedEnum**

    extends
      [UnitEnum](#class.unitenum) {

    /* Métodos */

   public static [from](#backedenum.from)([int](#language.types.integer)|[string](#language.types.string) $value): static
public static [tryFrom](#backedenum.tryfrom)([int](#language.types.integer)|[string](#language.types.string) $value): [?](#language.types.null)static


    /* Métodos heredados */
    public static [UnitEnum::cases](#unitenum.cases)(): [array](#language.types.array)

   }











  # BackedEnum::from

  (PHP 8 &gt;= 8.1.0)

BackedEnum::from — Convierte un escalar en una instancia de enum






  ### Descripción


   public static **BackedEnum::from**([int](#language.types.integer)|[string](#language.types.string) $value): static


   El método **from()** traduce un [string](#language.types.string) o un [int](#language.types.integer)
   en un caso Enum correspondiente, si existe. Si no hay un caso correspondiente definido, lanzará
   un error [ValueError](#class.valueerror).








  ### Parámetros



    value


      El valor escalar a hacer coincidir con un caso de enumeración.










  ### Valores devueltos


   Una instancia de caso de esta enumeración.







  ### Ejemplos


   **Ejemplo #1 Uso básico**



    El siguiente ejemplo ilustra la forma en que se devuelven los casos de enumeración.




&lt;?php
enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

$h = Suit::from('H');

var_dump($h);

$b = Suit::from('B');
?&gt;


   El ejemplo anterior mostrará:



enum(Suit::Hearts)

Fatal error: Uncaught ValueError: "B" is not a valid backing value for enum "Suit" in /file.php:15







  ### Ver también





    - [UnitEnum::cases()](#unitenum.cases) - Genera una lista de casos sobre una enumeración

    - [BackedEnum::tryFrom()](#backedenum.tryfrom) - Asocia un escalar a una instancia de enum o a null
















  # BackedEnum::tryFrom

  (PHP 8 &gt;= 8.1.0)

BackedEnum::tryFrom — Asocia un escalar a una instancia de enum o a null






  ### Descripción


   public static **BackedEnum::tryFrom**([int](#language.types.integer)|[string](#language.types.string) $value): [?](#language.types.null)static


   El método **tryFrom()** traduce un [string](#language.types.string) o un [int](#language.types.integer)
   en el caso Enum correspondiente, si existe. Si no hay un caso correspondiente definido, devolverá null.








  ### Parámetros



    value


      El valor escalar a hacer corresponder con un caso de enumeración.










  ### Valores devueltos


   Una instancia de caso de esta enumeración, o [null](#language.types.null) si no se ha encontrado.







  ### Ejemplos


   **Ejemplo #1 Uso básico**



    El siguiente ejemplo ilustra la manera en que los casos de enumeración son devueltos.




&lt;?php
enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

$h = Suit::tryFrom('H');

var_dump($h);

$b = Suit::tryFrom('B') ?? Suit::Spades;

var_dump($b);
?&gt;


   El ejemplo anterior mostrará:



enum(Suit::Hearts)
enum(Suit::Spades)







  ### Ver también





    - [UnitEnum::cases()](#unitenum.cases) - Genera una lista de casos sobre una enumeración

    - [BackedEnum::from()](#backedenum.from) - Convierte un escalar en una instancia de enum












## Tabla de contenidos
- [BackedEnum::from](#backedenum.from) — Convierte un escalar en una instancia de enum
- [BackedEnum::tryFrom](#backedenum.tryfrom) — Asocia un escalar a una instancia de enum o a null











 # La clase SensitiveParameterValue



 (PHP 8 &gt;= 8.2.0)





   ## Introducción


    La clase **SensitiveParameterValue** permite envolver valores
    para protegerlos contra una exposición accidental.




    Los valores de los parámetros con el atributo [SensitiveParameter](#class.sensitiveparameter)
    serán automáticamente envueltos en un objeto **SensitiveParameterValue**
    en las trazas de pila.







   ## Sinopsis de la Clase





     final
     class **SensitiveParameterValue**
     {

    /* Propiedades */

     private
     readonly
     [mixed](#language.types.mixed)
      [$value](#sensitiveparametervalue.props.value);


    /* Métodos */

   public [__construct](#sensitiveparametervalue.construct)([mixed](#language.types.mixed) $value)

    public [__debugInfo](#sensitiveparametervalue.debuginfo)(): [array](#language.types.array)
public [getValue](#sensitiveparametervalue.getvalue)(): [mixed](#language.types.mixed)

   }






   ## Propiedades



     value


       Valor sensible a proteger contra una exposición accidental.
















  # SensitiveParameterValue::__construct

  (PHP 8 &gt;= 8.2.0)

SensitiveParameterValue::__construct — Construye un nuevo objeto SensitiveParameterValue






  ### Descripción


   public **SensitiveParameterValue::__construct**([mixed](#language.types.mixed) $value)


   Construye un objeto [SensitiveParameterValue](#class.sensitiveparametervalue) que contiene un valor sensible.







  ### Parámetros



    value


      Un valor arbitrario que debe ser almacenado en el objeto [SensitiveParameterValue](#class.sensitiveparametervalue).





















  # SensitiveParameterValue::__debugInfo

  (PHP 8 &gt;= 8.2.0)

SensitiveParameterValue::__debugInfo — Protege el valor sensible contra una exposición accidental






  ### Descripción


   public **SensitiveParameterValue::__debugInfo**(): [array](#language.types.array)


   Devuelve un [array](#language.types.array) vacío para proteger el valor sensible contra una exposición accidental al utilizar [var_dump()](#function.var-dump).







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   Un [array](#language.types.array) vacío.







  ### Ejemplos





    **Ejemplo #1 Pasar un objeto [SensitiveParameterValue](#class.sensitiveparametervalue) a [var_dump()](#function.var-dump)**



&lt;?php
$s = new \SensitiveParameterValue('secret');

var_dump($s);
?&gt;


    El ejemplo anterior mostrará:



object(SensitiveParameterValue)#1 (0) {
}

















  # SensitiveParameterValue::getValue

  (PHP 8 &gt;= 8.2.0)

SensitiveParameterValue::getValue — Devuelve el valor sensible






  ### Descripción


   public **SensitiveParameterValue::getValue**(): [mixed](#language.types.mixed)


   Devuelve el valor sensible.







  ### Parámetros

  Esta función no contiene ningún parámetro.






  ### Valores devueltos


   El valor sensible.







  ### Ejemplos





    **Ejemplo #1 Ejemplo de SensitiveParameterValue::getValue()**



&lt;?php
$s = new \SensitiveParameterValue('secret');

echo "El valor protegido es: ", $s-&gt;getValue(), "\n";
?&gt;


    El ejemplo anterior mostrará:



El valor protegido es: secret













## Tabla de contenidos
- [SensitiveParameterValue::__construct](#sensitiveparametervalue.construct) — Construye un nuevo objeto SensitiveParameterValue
- [SensitiveParameterValue::__debugInfo](#sensitiveparametervalue.debuginfo) — Protege el valor sensible contra una exposición accidental
- [SensitiveParameterValue::getValue](#sensitiveparametervalue.getvalue) — Devuelve el valor sensible












 # La clase __PHP_Incomplete_Class



 (PHP 4 &gt;=4.0.1, PHP 5, PHP 7, PHP 8)




   ## Introducción


    Creada por [unserialize()](#function.unserialize),
    cuando se intenta deserializar una clase no definida
    o una clase no listada en los allowed_classes
    del array options de [unserialize()](#function.unserialize).





    Antes de PHP 7.2.0, el uso de [is_object()](#function.is-object) en la
    clase **__PHP_Incomplete_Class** devolvía **[false](#constant.false)**.
    A partir de PHP 7.2.0, **[true](#constant.true)** será devuelto.






   ## Sinopsis de la Clase




     final
     class **__PHP_Incomplete_Class**
     {
   }


    Esta clase no tiene propiedades ni métodos por omisión.
    Cuando es creada por [unserialize()](#function.unserialize),
    además de todas las propiedades y valores deserializados
    el objeto tendrá una propiedad __PHP_Incomplete_Class_Name
    que contendrá el nombre de la clase deserializada.






   ## Historial de cambios





       Versión
       Descripción






       8.0.0

        Esta clase es ahora final.










   ## Ejemplos


    **Ejemplo #1 Creada por [unserialize()](#function.unserialize)**



&lt;?php

class MyClass
{
    public string $property = "myValue";
}

$myObject = new MyClass;

$foo = serialize($myObject);

// deserializa todos los objetos en objeto __PHP_Incomplete_Class
$disallowed = unserialize($foo, ["allowed_classes" =&gt; false]);

var_dump($disallowed);

// deserializa todos los objetos en objeto __PHP_Incomplete_Class excepto aquellos de las clases MyClass2 y MyClass3
$disallowed2 = unserialize($foo, ["allowed_classes" =&gt; ["MyClass2", "MyClass3"]]);

var_dump($disallowed2);

// deserializa una clase no definida en objeto __PHP_Incomplete_Class
$undefinedClass = unserialize('O:16:"MyUndefinedClass":0:{}');

var_dump($undefinedClass);


    El ejemplo anterior mostrará:





object(__PHP_Incomplete_Class)#2 (2) {
  ["__PHP_Incomplete_Class_Name"]=&gt;
  string(7) "MyClass"
  ["property"]=&gt;
  string(7) "myValue"
}
object(__PHP_Incomplete_Class)#3 (2) {
  ["__PHP_Incomplete_Class_Name"]=&gt;
  string(7) "MyClass"
  ["property"]=&gt;
  string(7) "myValue"
}
object(__PHP_Incomplete_Class)#4 (1) {
  ["__PHP_Incomplete_Class_Name"]=&gt;
  string(16) "MyUndefinedClass"
}



























 # Atributos predefinidos

## Tabla de contenidos
- [Attribute](#class.attribute)
- [AllowDynamicProperties](#class.allowdynamicproperties)
- [Deprecated](#class.deprecated)
- [Override](#class.override)
- [ReturnTypeWillChange](#class.returntypewillchange)
- [SensitiveParameter](#class.sensitiveparameter)





   PHP proporciona atributos predefinidos que pueden ser utilizados.









 # La clase Attribute



 (PHP 8)




   ## Introducción


    Los atributos permiten añadir información de metadatos estructurados y legibles por la máquina
    sobre las declaraciones en el código: las clases, los métodos, las funciones, los parámetros, las propiedades
    y las constantes de clase pueden ser el objetivo de un atributo. Los metadatos
    definidos por los atributos pueden luego ser inspeccionados en el momento de la ejecución utilizando
    la [API de Reflexión](#book.reflection).
    Los atributos pueden, por lo tanto, ser considerados como un lenguaje de configuración integrado directamente en el






   ## Sinopsis de la Clase




     final
     class **Attribute**
     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [TARGET_CLASS](#attribute.constants.target-class);

    const
     [int](#language.types.integer)
      [TARGET_FUNCTION](#attribute.constants.target-function);

    const
     [int](#language.types.integer)
      [TARGET_METHOD](#attribute.constants.target-method);

    const
     [int](#language.types.integer)
      [TARGET_PROPERTY](#attribute.constants.target-property);

    const
     [int](#language.types.integer)
      [TARGET_CLASS_CONSTANT](#attribute.constants.target-class-constant);

    const
     [int](#language.types.integer)
      [TARGET_PARAMETER](#attribute.constants.target-parameter);

    const
     [int](#language.types.integer)
      [TARGET_ALL](#attribute.constants.target-all);

    const
     [int](#language.types.integer)
      [IS_REPEATABLE](#attribute.constants.is-repeatable);


    /* Propiedades */
    public
     [int](#language.types.integer)
      [$flags](#attribute.props.flags);


    /* Métodos */

   public [__construct](#attribute.construct)([int](#language.types.integer) $flags = Attribute::TARGET_ALL)

   }



   ## Constantes predefinidas



     **[Attribute::TARGET_CLASS](#attribute.constants.target-class)**








     **[Attribute::TARGET_FUNCTION](#attribute.constants.target-function)**








     **[Attribute::TARGET_METHOD](#attribute.constants.target-method)**








     **[Attribute::TARGET_PROPERTY](#attribute.constants.target-property)**








     **[Attribute::TARGET_CLASS_CONSTANT](#attribute.constants.target-class-constant)**








     **[Attribute::TARGET_PARAMETER](#attribute.constants.target-parameter)**








     **[Attribute::TARGET_ALL](#attribute.constants.target-all)**








     **[Attribute::IS_REPEATABLE](#attribute.constants.is-repeatable)**










   ## Propiedades



     flags










   ## Ver también

   [Visión general de los atributos](#language.attributes)











  # Attribute::__construct

  (PHP 8)

Attribute::__construct — Construye una nueva instancia de Attribute






  ### Descripción


   public **Attribute::__construct**([int](#language.types.integer) $flags = Attribute::TARGET_ALL)


   Construye una nueva instancia de [Attribute](#class.attribute).







  ### Parámetros





    flags

















## Tabla de contenidos
- [Attribute::__construct](#attribute.construct) — Construye una nueva instancia de Attribute











 # La clase AllowDynamicProperties



 (PHP 8 &gt;= 8.2.0)




   ## Introducción


    Este atributo se utiliza para marcar las clases que permiten las
    [propiedades dinámicas](#language.oop5.properties.dynamic-properties).






   ## Sinopsis de la Clase




     final
     class **AllowDynamicProperties**
     {

    /* Métodos */

   public [__construct](#allowdynamicproperties.construct)()

   }




   ## Ejemplos


    Las propiedades dinámicas están deprecadas a partir de PHP 8.2.0,
    por lo que usarlas sin marcar la clase con este atributo emitirá
    un aviso de obsolescencia.





&lt;?php
class DefaultBehaviour { }

#[\AllowDynamicProperties]
class ClassAllowsDynamicProperties { }

$o1 = new DefaultBehaviour();
$o2 = new ClassAllowsDynamicProperties();

$o1-&gt;nonExistingProp = true;
$o2-&gt;nonExistingProp = true;
?&gt;


    Resultado del ejemplo anterior en PHP 8.2:




Deprecated: Creation of dynamic property DefaultBehaviour::$nonExistingProp is deprecated in file on line 10






   ## Ver también

   [Visión general de los atributos](#language.attributes)












  # AllowDynamicProperties::__construct

  (PHP 8 &gt;= 8.2.0)

AllowDynamicProperties::__construct — Construye una nueva instancia del atributo AllowDynamicProperties






  ### Descripción


   public **AllowDynamicProperties::__construct**()


   Construye una nueva instancia de [AllowDynamicProperties](#class.allowdynamicproperties).







  ### Parámetros

  Esta función no contiene ningún parámetro.










## Tabla de contenidos
- [AllowDynamicProperties::__construct](#allowdynamicproperties.construct) — Construye una nueva instancia del atributo AllowDynamicProperties











 # El atributo Deprecated



 (PHP 8 &gt;= 8.4.0)




   ## Introducción


    Este atributo se utiliza para marcar una funcionalidad como obsoleta.
    El uso de una funcionalidad obsoleta resultará en la emisión de un error **[E_USER_DEPRECATED](#constant.e-user-deprecated)**.






   ## Sinopsis de la Clase




     final
     class **Deprecated**
     {

    /* Propiedades */

     public
     readonly
     ?[string](#language.types.string)
      [$message](#deprecated.props.message);

    public
     readonly
     ?[string](#language.types.string)
      [$since](#deprecated.props.since);


    /* Métodos */

   public [__construct](#deprecated.construct)([?](#language.types.null)[string](#language.types.string) $message = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $since = **[null](#constant.null)**)

   }



   ## Propiedades



     message


       Un mensaje opcional que explica la razón de la obsolescencia y la funcionalidad de reemplazo posible.
       Será incluido en el mensaje de obsolescencia emitido.






     since


        Una cadena opcional que indica desde cuándo la funcionalidad es obsoleta.
        El contenido no es validado por PHP y puede contener un número de versión,
        una fecha o cualquier otro valor considerado apropiado.
        Será incluido en el mensaje de obsolescencia emitido.




        La funcionalidad que forma parte de PHP utilizará Major.Minor como valor de since,
        por ejemplo '8.4'.









   ## Ejemplos



&lt;?php

#[\Deprecated(message: "use safe_replacement() instead", since: "1.5")]
function unsafe_function()
{
   echo "This is unsafe", PHP_EOL;
}

unsafe_function();

?&gt;


    La salida del ejemplo anterior en PHP 8.4 es similar a:




Deprecated: Function unsafe_function() is deprecated since 1.5, use safe_replacement() instead in example.php on line 9
This is unsafe






   ## Ver también


    - [Visión general de los atributos](#language.attributes)

    - [ReflectionFunctionAbstract::isDeprecated()](#reflectionfunctionabstract.isdeprecated)

    - [ReflectionClassConstant::isDeprecated()](#reflectionclassconstant.isdeprecated)

    - **[E_USER_DEPRECATED](#constant.e-user-deprecated)**











  # Deprecated::__construct

  (PHP 8 &gt;= 8.4.0)

Deprecated::__construct — Construye una nueva instancia del atributo Deprecated






  ### Descripción


   public **Deprecated::__construct**([?](#language.types.null)[string](#language.types.string) $message = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $since = **[null](#constant.null)**)


   Construye una nueva instancia de [Deprecated](#class.deprecated).







  ### Parámetros



    message


      El valor de la propiedad message.






    since


      El valor de la propiedad since.














## Tabla de contenidos
- [Deprecated::__construct](#deprecated.construct) — Construye una nueva instancia del atributo Deprecated











 # La clase Override



 (PHP 8 &gt;= 8.3.0)




   ## Introducción


    Este atributo se utiliza para indicar que un método o una propiedad está destinado
    a sobrescribir un método o una propiedad de una clase padre o que implementa
    un método o una propiedad definido en una interfaz.




    Si no existe ningún método o propiedad con el mismo nombre en una clase padre
    o en una interfaz implementada, se emitirá un error de compilación.




    El atributo solo puede ser utilizado con el método
    [__construct()](#object.construct),
    que está excluido de las verificaciones de firma.






   ## Sinopsis de la Clase




     final
     class **Override**
     {

    /* Métodos */

   public [__construct](#override.construct)()

   }




   ## Historial de cambios





       Versión
       Descripción






       8.5.0

        **Override** puede ser aplicado a propiedades.










   ## Ejemplos


    **Ejemplo #1 Uso con métodos**



&lt;?php

class Base {
    protected function foo(): void {}
}

final class Extended extends Base {
    #[\Override]
    protected function boo(): void {}
}

?&gt;


    Resultado del ejemplo anterior en PHP 8.3 es similar a:




Fatal error: Extended::boo() has #[\Override] attribute, but no matching parent method exists




    **Ejemplo #2 Uso con propiedades**



&lt;?php

class Base {
    protected string $foo;
}

final class Extended extends Base {
    #[\Override]
    protected string $boo;
}

?&gt;


    La salida del ejemplo anterior en PHP 8.5 es similar a:




Fatal error: Extended::$boo has #[\Override] attribute, but no matching parent property exists






   ## Ver también


    - [Visión general de los atributos](#language.attributes)











  # Override::__construct

  (PHP 8 &gt;= 8.3.0)

Override::__construct — Construye una nueva instancia del atributo Override






  ### Descripción


   public **Override::__construct**()


   Construye una nueva instancia de [Override](#class.override).







  ### Parámetros

  Esta función no contiene ningún parámetro.










## Tabla de contenidos
- [Override::__construct](#override.construct) — Construye una nueva instancia del atributo Override











 # La clase ReturnTypeWillChange



 (PHP 8 &gt;= 8.1.0)




   ## Introducción


    La mayoría de los métodos internos no finales requieren ahora que los métodos de sobrecarga declaren
    un tipo de retorno compatible, de lo contrario se emite un aviso de obsolescencia durante la validación de la herencia.
    En el caso de que el tipo de retorno no pueda ser declarado para un método de sobrecarga debido a problemas de compatibilidad entre las versiones de PHP,
    se puede añadir un atributo #[\ReturnTypeWillChange] para silenciar
    el aviso de obsolescencia.






   ## Sinopsis de la Clase




     final
     class **ReturnTypeWillChange**
     {

    /* Métodos */

   public [__construct](#returntypewillchange.construct)()

   }




   ## Ver también

   [Visión general de los atributos](#language.attributes)












  # ReturnTypeWillChange::__construct

  (PHP 8 &gt;= 8.1.0)

ReturnTypeWillChange::__construct — Construye una nueva instancia del atributo ReturnTypeWillChange






  ### Descripción


   public **ReturnTypeWillChange::__construct**()


   Construye una nueva instancia de [ReturnTypeWillChange](#class.returntypewillchange).







  ### Parámetros

  Esta función no contiene ningún parámetro.










## Tabla de contenidos
- [ReturnTypeWillChange::__construct](#returntypewillchange.construct) — Construye una nueva instancia del atributo ReturnTypeWillChange











 # La clase SensitiveParameter



 (PHP 8 &gt;= 8.2.0)




   ## Introducción



    Este atributo se utiliza para indicar que un parámetro es sensible
    y que su valor debe ser expurgado si está presente en una traza de pila.






   ## Sinopsis de la Clase




     final
     class **SensitiveParameter**
     {

    /* Métodos */

   public [__construct](#sensitiveparameter.construct)()

   }




   ## Ejemplos



&lt;?php

function defaultBehavior(
    string $secret,
    string $normal
) {
    throw new Exception('Error!');
}

function sensitiveParametersWithAttribute(
    #[\SensitiveParameter]
    string $secret,
    string $normal
) {
    throw new Exception('Error!');
}

try {
    defaultBehavior('password', 'normal');
} catch (Exception $e) {
    echo $e, PHP_EOL, PHP_EOL;
}

try {
    sensitiveParametersWithAttribute('password', 'normal');
} catch (Exception $e) {
    echo $e, PHP_EOL, PHP_EOL;
}

?&gt;


    Resultado del ejemplo anterior en PHP 8.2 es similar a:




Exception: Error! in example.php:7
Stack trace:
#0 example.php(19): defaultBehavior('password', 'normal')
#1 {main}

Exception: Error! in example.php:15
Stack trace:
#0 example.php(25): sensitiveParametersWithAttribute(Object(SensitiveParameterValue), 'normal')
#1 {main}






   ## Ver también





     - [Visión general de los atributos](#language.attributes)

     - [SensitiveParameterValue](#class.sensitiveparametervalue)













  # SensitiveParameter::__construct

  (PHP 8 &gt;= 8.2.0)

SensitiveParameter::__construct — Construye una nueva instancia de atributo SensitiveParameter






  ### Descripción


   public **SensitiveParameter::__construct**()


   Construye una nueva instancia de [SensitiveParameter](#class.sensitiveparameter).







  ### Parámetros

  Esta función no contiene ningún parámetro.










## Tabla de contenidos
- [SensitiveParameter::__construct](#sensitiveparameter.construct) — Construye una nueva instancia de atributo SensitiveParameter


















 # Opciones y parámetros de contexto




   PHP ofrece varias opciones y parámetros de contexto que pueden utilizarse
   con todos los sistemas de ficheros y envolturas de flujos. Un contexto se crea con
   [stream_context_create()](#function.stream-context-create). Las opciones se establecen con
   [stream_context_set_option()](#function.stream-context-set-option), y los parámetros con
   [stream_context_set_params()](#function.stream-context-set-params).












  # Opciones de contexto de los sockets

  Opciones de contexto de los sockets — Lista de opciones de contexto de los sockets






  ### Descripción


   Las opciones de contexto de los sockets están disponibles para todos los gestores que funcionan a través de los sockets, como
   tcp, http y
   ftp.







  ### Opciones






     bindto


       Utilizado para especificar la dirección IP (ya sea IPv4 o IPv6), y/o
       el número del puerto que PHP utilizará para acceder a la red.
       La sintaxis es ip:puerto para las direcciones IPv4,
       y [ip]:puerto para las direcciones IPv6.
       El hecho de definir la IP o el puerto a 0 permitirá
       al sistema elegir el puerto y/o la IP por sí mismo.



      **Nota**:



        Dado que FTP crea 2 sockets de conexión durante una operación normal,
        el número del puerto no puede ser especificado utilizando esta opción.







     backlog


       Utilizado para limitar el número de conexiones activas
       en la lista de espera del socket.



      **Nota**:



        Esto solo es aplicable a la función
        [stream_socket_server()](#function.stream-socket-server).







     ipv6_v6only


       Sustituye el sistema operativo por defecto en cuanto al mapeo de IPv4 en IPv6.



      **Nota**:



        Esto es importante en particular cuando se intenta escuchar en
        las direcciones IPv4 por separado mientras existe una ligadura en [::].




        Esto solo es aplicable a la función  [stream_socket_server()](#function.stream-socket-server).







     so_reuseport


       Permite múltiples ligaduras de una misma pareja ip:puerto, incluso desde procesos distintos.



      **Nota**:



        Esto solo es aplicable a la función [stream_socket_server()](#function.stream-socket-server).







     so_broadcast


       Permite enviar y recibir datos hacia/desde direcciones de difusión.



      **Nota**:



        Esto solo es aplicable a la función  [stream_socket_server()](#function.stream-socket-server).







     tcp_nodelay


       Poner el valor a **[true](#constant.true)** definirá SOL_TCP,NO_DELAY=1
       correctamente, lo que desactivará el algoritmo TCP Nagle.











  ### Historial de cambios








       Versión
       Descripción






       7.1.0

        Adición del parámetro tcp_nodelay.




       7.0.1

        Adición del parámetro ipv6_v6only.












  ### Ejemplos





    **Ejemplo #1 Ejemplo de uso del parámetro bindto**



&lt;?php
// Conexión a Internet utilizando la IP '192.168.0.100'
$opts = array(
    'socket' =&gt; array(
        'bindto' =&gt; '192.168.0.100:0',
    ),
);

// Conexión a Internet utilizando la IP '192.168.0.100' y el puerto '7000'
$opts = array(
    'socket' =&gt; array(
        'bindto' =&gt; '192.168.0.100:7000',
    ),
);

// Conexión a Internet utilizando la dirección IPv6 '2001:db8::1'
// y el puerto '7000'
$opts = array(
    'socket' =&gt; array(
        'bindto' =&gt; '[2001:db8::1]:7000',
    ),
);

// Conexión a Internet utilizando el puerto '7000'
$opts = array(
    'socket' =&gt; array(
        'bindto' =&gt; '0:7000',
    ),
);

// Creación del contexto...
$context = stream_context_create($opts);

// ...y se utiliza para recuperar los datos
echo file_get_contents('http://www.example.com', false, $context);

?&gt;



















  # Opciones de contexto HTTP

  Opciones de contexto HTTP — Lista de opciones de contexto HTTP






  ### Descripción


  Opciones de contexto para los protocolos http://
  y https://.







  ### Opciones







      method
      [string](#language.types.string)



       **[GET](#constant.get)**, **[POST](#constant.post)**, o
       cualquier otro método HTTP soportado por el servidor remoto.




       Por omisión, vale **[GET](#constant.get)**.







      header
      [array](#language.types.array) o [string](#language.types.string)



       Encabezados adicionales a enviar durante la petición.
       Los valores de esta opción sobrescribirán otros valores
       (como User-agent:, Host:,
       y Authentication:),
       incluso al seguir redirecciones Location:.
       Por lo tanto, no se recomienda definir el encabezado
       Host:, si follow_location
       está activado.




       Una cadena debe contener pares Clave : valor
       delimitados por \r\n, por ejemplo :
       "Content-Type: application/json\r\nConnection: close".
       Un array debe contener una lista de pares Clave : valor, por ejemplo :
       ["Content-Type: application/json", "Connection: close"].







      user_agent
      [string](#language.types.string)



       Valor a enviar con el encabezado User-Agent:. Este valor
       solo debe ser utilizado si el agente de usuario no está
       especificado en la opción de contexto header anterior.




       Por omisión, se utilizará el valor de la opción de configuración
       [user_agent](#ini.user-agent) del archivo
       php.ini.







      content
      [string](#language.types.string)



       Los datos adicionales a enviar después de los encabezados. Típicamente utilizados
       durante las peticiones POST o PUT.







      proxy
      [string](#language.types.string)



       URI de la dirección del proxy (ej.
       tcp://proxy.example.com:5100).







      request_fulluri
      [bool](#language.types.boolean)



       Cuando se define como **[true](#constant.true)**, la URI completa será utilizada al
       construir la petición (ej.
       GET http://www.example.com/path/to/file.html HTTP/1.0).
       Aunque este formato de petición no es estándar, algunos servidores de
       proxy lo requieren.




       Por omisión, vale **[false](#constant.false)**.







      follow_location
      [int](#language.types.integer)



       Sigue las redirecciones Location.
       Debe definirse como 0 para desactivar.




       Por omisión, vale 1.







      max_redirects
      [int](#language.types.integer)



       El número máximo de redirecciones a seguir. El valor 1
       o inferior significa que ninguna redirección será seguida.




       Por omisión, vale 20.







      protocol_version
      [float](#language.types.float)



       Versión del protocolo HTTP.




       Por omisión, vale 1.1 a partir de PHP 8.0.0; antes
       de esta versión el valor por omisión era 1.0.







      timeout
      [float](#language.types.float)



       Tiempo máximo de espera para la lectura, en forma de [float](#language.types.float)
       (ej. 10.5).




       Por omisión, se utilizará el valor de la opción de configuración
       [default_socket_timeout](#ini.default-socket-timeout)
       del archivo php.ini.







      ignore_errors
      [bool](#language.types.boolean)



       Obtiene el contenido incluso al recibir un código de error.




       Por omisión, vale **[false](#constant.false)**.











  ### Ejemplos





    **Ejemplo #1 Obtención de una página y envío de datos POST**



&lt;?php

$postdata = http_build_query(
    [
        'var1' =&gt; 'du contenu',
        'var2' =&gt; 'doh',
    ]
);

$opts = ['http' =&gt;
    [
        'method'  =&gt; 'POST',
        'header'  =&gt; 'Content-type: application/x-www-form-urlencoded',
        'content' =&gt; $postdata,
    ]
];

$context = stream_context_create($opts);

$result = file_get_contents('http://example.com/submit.php', false, $context);

?&gt;








    **Ejemplo #2 Ignora las redirecciones pero obtiene los encabezados y el contenido**



&lt;?php

$url = "http://www.example.org/header.php";

$opts = ['http' =&gt;
    [
        'method' =&gt; 'GET',
        'max_redirects' =&gt; '0',
        'ignore_errors' =&gt; '1',
    ]
];

$context = stream_context_create($opts);
$stream = fopen($url, 'r', false, $context);

// información sobre los encabezados y metadatos del flujo
var_dump(stream_get_meta_data($stream));

// datos actuales de $url
var_dump(stream_get_contents($stream));
fclose($stream);
?&gt;








  ### Notas

  **Nota**:
   **Opciones de contexto del flujo subyacente**

    Opciones de contexto adicionales pueden ser
    soportadas por el
    [transporte subyacente](#transports.inet).
    Para los flujos http://, consulte las
    opciones de contexto del transporte tcp://.
    Para los flujos https://, consulte las
    opciones de contexto del transporte ssl://.




  **Nota**:
   **Línea de estado HTTP**

    Cuando este manejador de flujo sigue una redirección,
    wrapper_data, devuelto por la función
    [stream_get_meta_data()](#function.stream-get-meta-data) no debe contener
    necesariamente la línea de estado HTTP que se aplica a los
    datos de contenido en el índice 0.




array (
  'wrapper_data' =&gt;
  array (
    0 =&gt; 'HTTP/1.0 301 Moved Permanently',
    1 =&gt; 'Cache-Control: no-cache',
    2 =&gt; 'Connection: close',
    3 =&gt; 'Location: http://example.com/foo.jpg',
    4 =&gt; 'HTTP/1.1 200 OK',
    ...



    La primera petición devuelve una 301
    (redirección permanente), por lo tanto, el manejador de flujo
    sigue automáticamente la redirección para obtener una respuesta
    200 (índice = 4).






  ### Ver también





    - [http://](#wrappers.http)

    - [Opciones de contexto de los sockets](#context.socket)

    - [Opciones de contexto SSL](#context.ssl)



















  # Opciones de contexto FTP

  Opciones de contexto FTP — Lista de opciones de contexto FTP






  ### Descripción


   Opciones de contexto para los protocolos ftp:// y
   ftps://.







  ### Opciones







      overwrite
      [bool](#language.types.boolean)



       Permite sobrescribir los ficheros existentes en el servidor remoto.
       Solo se aplica en modo de escritura.




       Por omisión, **[false](#constant.false)**.







      resume_pos
      [int](#language.types.integer)



       Posición en el fichero a partir de la cual se inicia la transferencia.
       Solo se aplica en modo de escritura.




       Por omisión, vale 0 (Inicio del fichero).







      proxy
      [string](#language.types.string)



       URI de la dirección del proxy FTP. Solo se aplica a las operaciones
       de lectura de ficheros. Por ejemplo: tcp://squid.example.com:8000.











  ### Notas

  **Nota**:
   **Opciones de contexto del flujo subyacente**

    Opciones de contexto adicionales pueden ser
    soportadas por el
    [transporte subyacente](#transports.inet).
    Para los flujos ftp://, refiérase a las
    opciones de contexto del transporte tcp://.
    Para los flujos ftps://, refiérase a las
    opciones de contexto del transporte ssl://.








  ### Ver también





    - [ftp://](#wrappers.ftp)

    - [Opciones de contexto de los sockets](#context.socket)

    - [Opciones de contexto SSL](#context.ssl)



















  # Opciones de contexto SSL

  Opciones de contexto SSL — Lista de opciones de contexto SSL






  ### Descripción


   Opciones de contexto para los protocolos ssl://
   y tls://.







  ### Opciones







      peer_name
      [string](#language.types.string)



       Nombre de pares a utilizar. Si este valor no está definido, entonces el
       nombre será adivinado basándose en el nombre de host utilizado al abrir el flujo.







      verify_peer
      [bool](#language.types.boolean)



       Requiere una verificación del certificado SSL utilizado.




       Por omisión, vale **[true](#constant.true)**.







      verify_peer_name
      [bool](#language.types.boolean)



       Requiere la verificación del nombre de pares.




       Por omisión, vale **[true](#constant.true)**.







      allow_self_signed
      [bool](#language.types.boolean)



       Permite los certificados autofirmados. Requiere el
       parámetro [verify_peer](#context.ssl.verify-peer).




       Por omisión, vale **[false](#constant.false)**







      cafile
      [string](#language.types.string)



       Ubicación del fichero de la autoridad del certificado
       en el sistema de ficheros local que deberá ser utilizado
       con la opción de contexto verify_peer
       para identificar el par distante.







      capath
      [string](#language.types.string)



       Si cafile no está especificado o si el certificado
       no ha sido encontrado, se realizará una búsqueda en el directorio señalado por
       capath para encontrar un certificado válido. capath debe ser un directorio de certificados válido.







      local_cert
      [string](#language.types.string)



       Ruta al certificado local, en el sistema de ficheros.
       Debe ser un fichero codificado PEM que contiene su certificado
       y su clave privada. Puede, opcionalmente, contener la
       cadena de certificación del emisor.
       La clave privada también puede estar contenida en un fichero separado
       especificado por local_pk.







      local_pk
      [string](#language.types.string)



       Ruta de acceso al fichero de clave privada local en el sistema de
       ficheros en el caso de ficheros separados para el certificado
       (local_cert) y la clave privada.







      passphrase
      [string](#language.types.string)



       La frase de paso con la que su fichero
       local_cert ha sido codificado.







      verify_depth
      [int](#language.types.integer)



       Fallará si la cadena de certificación es demasiado profunda.




       Por omisión, no se realiza ninguna verificación.







      ciphers
      [string](#language.types.string)



       Define la lista de cifrados. El formato de la cadena está descrito
       en la página [» ciphers(1)](https://www.openssl.org/docs/manmaster/man1/ciphers.html#CIPHER-LIST-FORMAT).




       Por omisión, vale DEFAULT.







      capture_peer_cert
      [bool](#language.types.boolean)



       Si se define a **[true](#constant.true)**, se creará una opción de contexto peer_certificate
       que contendrá el certificado del emisor.







      capture_peer_cert_chain
      [bool](#language.types.boolean)



       Si se define a **[true](#constant.true)**, se creará una opción de contexto peer_certificate_chain
       que contendrá la cadena de certificación.







      SNI_enabled
      [bool](#language.types.boolean)



       Si vale **[true](#constant.true)**, la indicación sobre el nombre del servidor estará activada.
       Activar SNI permite utilizar múltiples certificados
       en la misma dirección IP.







      disable_compression
      [bool](#language.types.boolean)



       Si se define, la compresión TLS estará desactivada.
       Esto puede ayudar a mitigar el vector de ataque CRIME.







      peer_fingerprint
      [string](#language.types.string) | [array](#language.types.array)



       Se detiene cuando el digest del certificado distante no coincide con el hash especificado.




       Cuando se utiliza una [string](#language.types.string), la longitud determinará el algoritmo
       de hachaje utilizado, ya sea "md5" (32) o "sha1" (40).




       Cuando se utiliza un [array](#language.types.array), la clave indica el nombre del algoritmo de
       hachaje, y cada valor correspondiente representa el digest esperado.







      security_level
      [int](#language.types.integer)



       Define el nivel de seguridad. Si no se especifica, se utiliza el nivel de seguridad por
       omisión.
       Los niveles de seguridad están descritos en
       [» SSL_CTX_get_security_level(3)](https://www.openssl.org/docs/man1.1.1/man3/SSL_CTX_get_security_level.html).




       Disponible a partir de PHP 7.2.0 y OpenSSL 1.1.0.











  ### Historial de cambios








       Versión
       Descripción






       7.2.0

        Adición de security_level. Requiere OpenSSL &gt;= 1.1.0.












  ### Notas

  **Nota**:

    Dado que ssl:// es un protocolo subyacente para
    los gestores [https://](#wrappers.http) y
    [ftps://](#wrappers.ftp),
    todas las opciones de contexto aplicadas a ssl://
    también se aplicarán a https:// y ftps://.




  **Nota**:

    Para que SNI (Server Name Indication) esté disponible, PHP debe
    ser compilado con OpenSSL 0.9.8j o superior. Utilice la
    constante **[OPENSSL_TLSEXT_SERVER_NAME](#constant.openssl-tlsext-server-name)** para
    determinar si SNI es soportado o no.








  ### Ver también





    - [Opciones de contexto de los sockets](#context.socket)

















  # Opciones de contexto Phar

  Opciones de contexto Phar — Listado de opciones de contexto Phar






  ### Descripción


  Opciones de contexto para phar:// envoltura.







  ### Opciones







      comprimir
      [int](#language.types.integer)



       Uno de  [Constantes de compresión Phar](#phar.constants.compression).







      metadata
      [mixed](#language.types.mixed)



       Metadatos Phar. Ver [Phar::setMetadata()](#phar.setmetadata).











  ### Ver también





    - [phar://](#wrappers.phar)

    - [Envoltura de secuencias Phar](#phar.using.stream)



















  # Contexto parámetros

  Contexto parámetros — Listado de parámetros de contexto





  ### Descripción


   Estos parametros se pueden establecer en un contexto
   usando el la función [stream_context_set_params()](#function.stream-context-set-params).






  ### Parámetros







      notification
      [callable](#language.types.callable)



       Un valor de tipo [callable](#language.types.callable) que se llamará cuando se produce un evento en un flujo.




       Véase [
       stream_notification_callback](#function.stream-notification-callback) para más detalles.






















  # Opciones de contexto Zip

  Opciones de contexto Zip — Listado de opciones de contexto Zip






  ### Descripción


   Las opciones de contexto Zip están disponibles para las envolturas (wrappers)
   zip.







  ### Opciones






     password


       Utilizado para especificar una contraseña a utilizar para los archivos cifrados.











  ### Historial de cambios








       Versión
       Descripción






       7.2.0, PECL zip 1.14.0

        Adición del parámetro password.












  ### Ejemplos





    **Ejemplo #1 Ejemplo con una utilización simple del parámetro password**



&lt;?php
// Leer el archivo cifrado
$opts = array(
    'zip' =&gt; array(
        'password' =&gt; 'secret',
    ),
);
// crear el contexto...
$context = stream_context_create($opts);

// ...y utilizarlo para recuperar los datos
echo file_get_contents('zip://test.zip#test.txt', false, $context);

?&gt;




















  # Opciones de contexto Zlib

  Opciones de contexto Zlib — Lista de opciones de contexto Zlib






  ### Descripción


   Las opciones de contexto Zlib están disponibles para las envolturas zlib.







  ### Opciones






     level


       Permite especificar el nivel de compresión(0 - 9).











  ### Historial de cambios








       Versión
       Descripción






       7.3.0

        level ha sido añadido.


















## Tabla de contenidos
- [Opciones de contexto de los sockets](#context.socket) — Lista de opciones de contexto de los sockets
- [Opciones de contexto HTTP](#context.http) — Lista de opciones de contexto HTTP
- [Opciones de contexto FTP](#context.ftp) — Lista de opciones de contexto FTP
- [Opciones de contexto SSL](#context.ssl) — Lista de opciones de contexto SSL
- [Opciones de contexto Phar](#context.phar) — Listado de opciones de contexto Phar
- [Contexto parámetros](#context.params) — Listado de parámetros de contexto
- [Opciones de contexto Zip](#context.zip) — Listado de opciones de contexto Zip
- [Opciones de contexto Zlib](#context.zlib) — Lista de opciones de contexto Zlib















 # Protocolos y Envolturas soportados



   PHP incorpora de serie envolturas para distintos protocolos tipo URL
   para trabajar junto con funciones del sistema de ficheros, como [fopen()](#function.fopen),
   [copy()](#function.copy), [file_exists()](#function.file-exists) y
   [filesize()](#function.filesize).
   Además de estas envolturas, se pueden definir por el usuario utilizando
   la función [stream_wrapper_register()](#function.stream-wrapper-register).



  **Nota**:

    La sintaxis de URL que se utiliza para describir una envoltura solo puede ser
    scheme://.... Las sintaxis scheme:/
    y scheme: no están soportadas.












  # file://

  file:// — Acceso al sistema de ficheros local






  ### Descripción


   file:// es la envoltura por defecto utilizada con PHP y
   representa el sistema de ficheros local.
   Cuando se especifica una ruta relativa (una ruta que no comienza con
   /, \, \\, o una
   letra de unidad Windows), la ruta proporcionada se aplicará al
   directorio de trabajo actual. En muchos casos, se trata del directorio en el que se encuentra el script,
   a menos que haya sido modificado. Con el CLI
   SAPI, esto por defecto corresponde al directorio desde el cual se llamó al
   script.




   Con ciertas funciones como [fopen()](#function.fopen) y
   [file_get_contents()](#function.file-get-contents), **include_path()**
   puede eventualmente ser analizada para encontrar los ficheros, si se proporciona una ruta relativa.







  ### Uso


   - /ruta/al/fichero.ext

   - ruta/relativa/al/fichero.ext

   - ficheroEnCwd.ext

   - C:/ruta/al/ficheroWindows.ext

   - C:\ruta\al\ficheroWindows.ext

   - \\smbserver\compartido\ruta\al\ficheroWindows.ext

   - file:///ruta/al/fichero.ext






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Permite la lectura
       Sí



       Permite la escritura
       Sí



       Permite la adición
       Sí



       Permite simultáneamente la lectura y la escritura
       Sí



       Soporte de la función [stat()](#function.stat)
       Sí



       Soporte de la función [unlink()](#function.unlink)
       Sí



       Soporte de la función [rename()](#function.rename)
       Sí



       Soporte de la función [mkdir()](#function.mkdir)
       Sí



       Soporte de la función [rmdir()](#function.rmdir)
       Sí






















  # http://

  # https://

  http:// -- https:// — Acceso a URLs HTTP(s)






  ### Descripción


   Permite el acceso en modo solo lectura a ficheros accesibles mediante HTTP.
   Por omisión, se utiliza una solicitud HTTP 1.0 GET.
   Se envía un encabezado Host: con la solicitud,
   para gestionar los hosts virtuales basados en nombres.
   Si se ha configurado una versión de navegador con
   la opción [user_agent](#ini.user-agent) en su
   archivo php.ini o mediante el contexto de flujo, también será incluida en su solicitud.




   El flujo permite acceder al cuerpo (*body*)
   del recurso. Los encabezados se almacenan en la variable
   [$http_response_header](#reserved.variables.httpresponseheader).




   Si se necesita conocer la URL del recurso
   desde el cual proviene el documento (tras la ejecución
   de todas las redirecciones), deberá analizarse la serie
   de encabezados devueltos por el flujo.




   La directiva [from](#ini.from) será utilizada para
   el encabezado From: si ha sido definida, y no será sobrescrita
   por los [Opciones y parámetros de contexto](#context).







  ### Uso


   - http://example.com

   - http://example.com/fichero.php?var1=val1&amp;var2=val2

   - http://user:password@example.com

   - https://example.com

   - https://example.com/fichero.php?var1=val1&amp;var2=val2

   - https://user:password@example.com






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       Sí



       Permite la lectura
       Sí



       Permite la escritura
       No



       Permite la adición
       No



       Permite la lectura y escritura simultáneamente
       N/A



       Soporte de la función [stat()](#function.stat)
       No



       Soporte de la función [unlink()](#function.unlink)
       No



       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No











  ### Ejemplos


   **Ejemplo #1 Detecta la última URL tras redirecciones**



&lt;?php
$url = 'http://www.example.com/redirecting_page.php';

$fp = fopen($url, 'r');

$meta_data = stream_get_meta_data($fp);
foreach ($meta_data['wrapper_data'] as $response) {

    /* ¿Hemos sido redirigidos? */
    if (strtolower(substr($response, 0, 10)) == 'location: ') {

        /* actualización de $url con la ruta tras redirección */
        $url = substr($response, 10);
    }

}

?&gt;







  ### Notas

  **Nota**:

    HTTPS solo es soportado si la extensión
    [openssl](#book.openssl) está activa.





   Las conexiones HTTP son de solo lectura; la escritura de datos
   o la copia de ficheros a un recurso HTTP no son soportadas.




   El envío de solicitudes *POST* y *PUT*,
   por ejemplo, puede realizarse mediante los
   [contextos HTTP](#context.http).







  ### Ver también


   - [Opciones de contexto HTTP](#context.http)

   - [$http_response_header](#reserved.variables.httpresponseheader)

   - [stream_get_meta_data()](#function.stream-get-meta-data) - Lee los encabezados y metadatos de los flujos

















  # ftp://

  # ftps://

  ftp:// -- ftps:// — Acceso a URLs FTP(s)






  ### Descripción


   Permite el acceso en lectura a los ficheros existentes, y la creación de ficheros, mediante FTP.
   Si el servidor no soporta FTP en modo pasivo, la
   conexión fallará.




   Se pueden abrir ficheros en lectura o en escritura, pero
   no ambas a la vez. Si el fichero remoto ya existe en el servidor
   ftp y se intenta abrirlo en escritura sin haber especificado la opción overwrite en el contexto,
   la conexión fallará. Si se deben sobrescribir ficheros existentes
   utilizando ftp, se debe especificar la opción overwrite en el
   contexto y abrir el fichero en escritura. Alternativamente, se puede
   utilizar la [extensión FTP](#ref.ftp).




   Si se ha definido la directiva [from](#ini.from)
   en el fichero php.ini, entonces este valor será enviado como
   contraseña para los accesos FTP anónimos.







  ### Uso


   - ftp://example.com/pub/fichero.txt

   - ftp://user:password@example.com/pub/fichero.txt

   - ftps://example.com/pub/fichero.txt

   - ftps://user:password@example.com/pub/fichero.txt






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       Sí



       Permite la lectura
       Sí



       Permite la escritura
       Sí (nuevos ficheros/ficheros existentes con el parámetro overwrite)



       Permite el añadido
       Sí



       Permite la lectura y escritura simultáneamente
       No



       Soporte de la función [stat()](#function.stat)

        [filesize()](#function.filesize), [filetype()](#function.filetype),
        [file_exists()](#function.file-exists), [is_file()](#function.is-file),
        [is_dir()](#function.is-dir), y [filemtime()](#function.filemtime)
        únicamente.




       Soporte de la función [unlink()](#function.unlink)
       Sí



       Soporte de la función [rename()](#function.rename)
       Sí



       Soporte de la función [mkdir()](#function.mkdir)
       Sí



       Soporte de la función [rmdir()](#function.rmdir)
       Sí











  ### Notas

  **Nota**:



    FTPS solo es soportado cuando la extensión [openssl](#book.openssl)
    está activa.




    Si el servidor no soporta SSL, entonces la conexión pasará automáticamente
    a una conexión ftp no cifrada.


  **Nota**:
   **El añadido**

    El añadido de información a un fichero es posible con
    el gestor de URL ftp://.








  ### Ver también


   - [Opciones de contexto FTP](#context.ftp)

















  # php://

  php:// — Acceso a los diversos flujos I/O






  ### Descripción


   PHP proporciona un número importante de flujos I/O que permiten acceder
   a los flujos de entrada y salida de PHP mismo, a los descriptores de ficheros
   de entrada, salida y error estándar, a flujos que representan
   ficheros temporales en memoria viva o en disco, así como a filtros
   que pueden manipular otros recursos de ficheros durante la lectura o escritura.





   #### php://stdin, php://stdout y php://stderr


    php://stdin, php://stdout y
    php://stderr permiten acceso directo a los flujos de entrada
    o salida correspondientes del proceso PHP. El flujo hace referencia a una copia
    del descriptor de fichero, lo que significa que si se abre php://stdin
    y se cierra más tarde, solo se cierra la copia del descriptor; el
    flujo realmente referenciado por **[STDIN](#constant.stdin)** no se ve afectado.
    Se recomienda utilizar únicamente las constantes **[STDIN](#constant.stdin)**,
    **[STDOUT](#constant.stdout)** y **[STDERR](#constant.stderr)** en lugar
    de abrir manualmente los flujos utilizando estas envolturas.




    php://stdin es de solo lectura, mientras que
    php://stdout y php://stderr son
    de solo escritura.







   #### php://input


    php://input es un flujo de solo lectura que permite
    leer datos sin tratar desde el cuerpo de la petición.
    php://input no está disponible en las peticiones POST con
    enctype="multipart/form-data" si la opción
    [enable_post_data_reading](#ini.enable-post-data-reading)
    está activada.







   #### php://output


    php://output es un flujo de solo escritura, que permite escribir
    en el mecanismo de buffer de salida de la misma manera que las funciones
    [print](#function.print) y
    [echo](#function.echo).







   #### php://fd


    php://fd permite acceso directo al descriptor de fichero
    especificado. Por ejemplo, php://fd/3 corresponde al
    descriptor de fichero número 3.







   #### php://memory y php://temp


    php://memory y php://temp
    son flujos de lectura/escritura que permiten almacenar datos
    temporales en una envoltura de ficheros. Una diferencia entre
    estos dos flujos es que php://memory almacenará siempre
    sus datos en memoria, mientras que php://temp utilizará un
    fichero temporal una vez que la cantidad de datos almacenados haya superado
    un límite predefinido (por omisión, 2 Mo). La ubicación
    de este fichero temporal se determina de la misma manera que para
    la función [sys_get_temp_dir()](#function.sys-get-temp-dir).




    El límite de memoria de php://temp puede ser controlado
    añadiendo /maxmemory:NN, donde NN es
    la cantidad máxima de datos a conservar en memoria antes de utilizar
    un fichero temporal, en bytes.



   **Precaución**

     Algunas extensiones PHP pueden requerir un flujo IO estándar,
     y pueden intentar convertir un flujo dado a un flujo IO estándar.
     Esta conversión puede fallar para los flujos de memoria, ya que la función C
     **fopencookie()** debe estar disponible.
     Esta función C *no está* disponible en Windows.








   #### php://filter


    php://filter es una especie de envoltura prevista
    para permitir la aplicación de [filtros](#filters)
    sobre un flujo en el momento de su apertura. Esto es muy práctico con
    funciones sobre ficheros todas-en-una como las funciones
    [readfile()](#function.readfile), [file()](#function.file) y
    [file_get_contents()](#function.file-get-contents), donde no existe otro mecanismo
    que permita aplicar un filtro al flujo antes de que el contenido sea leído.




    La meta de php://filter toma los parámetros siguientes
    bajo la forma de componentes de su ruta. Varios filtros encadenados
    pueden ser especificados en una sola ruta. Consúltese los ejemplos
    para un uso correcto de estos parámetros.







     <caption>**Parámetros de php://filter**</caption>



        Nombre
        Descripción







         resource=&lt;flujo a filtrar&gt;


         Este parámetro es requerido. Especifica el flujo que se desea
         filtrar.





         read=&lt;lista de filtros a aplicar a la lectura&gt;


         Este parámetro es opcional. Uno o más nombres de filtros
         pueden ser proporcionados aquí, separados por un carácter pipe (|).





         write=&lt;lista de filtros a aplicar a la escritura&gt;


         Este parámetro es opcional. Uno o más nombres de filtros
         pueden ser proporcionados aquí, separados por un carácter pipe (|).





         &lt;lista de filtros a aplicar tanto a la lectura como a la escritura&gt;


         Todos los filtros proporcionados sin ser prefijados por read=
         o write= serán aplicados tanto a la
         lectura como a la escritura.














  ### Opciones





    <caption>**
     Resumen de la envoltura (para php://filter, consúltese
     el resumen de la envoltura a filtrar)
    **</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Restringido por [allow_url_include](#ini.allow-url-include)

        php://input,
        php://stdin,
        php://memory y
        php://temp únicamente.




       Permite la lectura

        php://stdin,
        php://input,
        php://fd,
        php://memory y
        php://temp únicamente.




       Permite la escritura

        php://stdout,
        php://stderr,
        php://output,
        php://fd,
        php://memory y
        php://temp únicamente.




       Permite la adición

        php://stdout,
        php://stderr,
        php://output,
        php://fd,
        php://memory y
        php://temp únicamente. (Equivalente a la escritura)




       Permite tanto la lectura como la escritura

        php://fd,
        php://memory y
        php://temp únicamente.




       Soporte de la función [stat()](#function.stat)

        No. Sin embargo, php://memory y
        php://temp soportan [fstat()](#function.fstat).




       Soporte de la función [unlink()](#function.unlink)
       No



       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No



       Soporte de la función [stream_select()](#function.stream-select)

        php://stdin,
        php://stdout,
        php://stderr,
        php://fd y
        php://temp únicamente.












  ### Ejemplos


   **Ejemplo #1 php://temp/maxmemory**



    Este parámetro opcional permite configurar el límite
    de memoria antes de que php://temp comience a utilizar
    un fichero temporal.




&lt;?php
// Define el límite a 5 Mo.
$fiveMBs = 5 * 1024 * 1024;
$fp = fopen("php://temp/maxmemory:$fiveMBs", 'r+');

fputs($fp, "hello\n");

// Lee lo que acabamos de escribir.
rewind($fp);
echo stream_get_contents($fp);
?&gt;




   **Ejemplo #2 php://filter/resource=&lt;flujo a filtrar&gt;**



    Este parámetro debe ser colocado al final de la especificación
    de php://filter y debe apuntar al flujo
    que se desea filtrar.




&lt;?php
/* Esto es equivalente a
  readfile("http://www.example.com");
  ya que no se especifica ningún filtro */

readfile("php://filter/resource=http://www.example.com");
?&gt;




   **Ejemplo #3 php://filter/read=&lt;lista de filtros a aplicar a la lectura&gt;**



    Este parámetro toma uno o más nombres de filtros separados por
    un carácter pipe |.




&lt;?php
/* Esto mostrará el contenido de
  www.example.com completamente en mayúsculas */
readfile("php://filter/read=string.toupper/resource=http://www.example.com");

/* Esto hará lo mismo que el anterior,
  pero codificará además el resultado en ROT13 */
readfile("php://filter/read=string.toupper|string.rot13/resource=http://www.example.com");
?&gt;




   **Ejemplo #4 php://filter/write=&lt;lista de filtros a aplicar a la escritura&gt;**



    Este parámetro toma uno o más nombres de filtros separados por
    un carácter pipe |.




&lt;?php
/* Esto filtrará la cadena "Hello World"
  a través del filtro rot13, y luego escribirá el resultado
  en el fichero example.txt del directorio actual */
file_put_contents("php://filter/write=string.rot13/resource=example.txt","Hello World");
?&gt;




   **Ejemplo #5 php://memory y php://temp no son reutilizables**



    php://memory y php://temp
    no son reutilizables, es decir, después de que los flujos hayan sido cerrados no hay manera de referenciarlos nuevamente.




&lt;?php
file_put_contents('php://memory', 'PHP');
echo file_get_contents('php://memory'); // no muestra nada




   **Ejemplo #6 php://input para leer datos JSON del cuerpo de la solicitud**



    Este ejemplo demuestra cómo leer datos JSON sin procesar de solicitudes POST, PUT y
    PATCH usando php://input.




&lt;?php
$input = file_get_contents("php://input");
$json_array = json_decode(
  json: $input,
  associative: true,
  flags: JSON_THROW_ON_ERROR
);

echo "Datos JSON recibidos: ";
print_r($json_array);
?&gt;

















  # zlib://

  # bzip2://

  # zip://

  zlib:// -- bzip2:// -- zip:// — Flujos de compresión






  ### Descripción

  compress.zlib:// y compress.bzip2://




   zlib: funciona como [gzopen()](#function.gzopen), excepto
   que el flujo puede ser utilizado directamente con [fread()](#function.fread)
   y otras funciones del sistema de archivos. Esta notación está obsoleta
   debido a ambigüedades con nombres de archivos
   que contienen dos puntos ':'. Utilice en su lugar compress.zlib://.





   compress.zlib:// y
   compress.bzip2:// son equivalentes respectivamente a
   [gzopen()](#function.gzopen) y [bzopen()](#function.bzopen),
   y funcionan incluso en sistemas que no soportan
   fopencookie.




   La [extensión ZIP](#book.zip) proporciona el envoltorio
   zip:. A partir de PHP 7.2.0 y libzip 1.2.0+,
   se ha añadido el soporte para contraseñas en archivos cifrados,
   permitiendo que las contraseñas sean proporcionadas por contextos de flujo.
   Las contraseñas pueden ser definidas en un flujo utilizando la opción de
   contexto 'password'.







  ### Uso


   - compress.zlib://file.gz

   - compress.bzip2://file.bz2

   - zip://archive.zip#dir/file.txt






  ### Opciones





    <caption>**Resumen de envolturas**</caption>



       Atributo
       Soportado






       Limitado por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Permite la lectura
       Sí



       Permite la escritura
       Sí (excepto zip://)



       Permite la adición
       Sí (excepto zip://)



       Permite la lectura y escritura simultáneamente
       No



       Soporte de la función [stat()](#function.stat)

        No, utilice el gestor file://
        para obtener información sobre archivos comprimidos.




       Soporte de la función [unlink()](#function.unlink)

        No, utilice el gestor file://
        para obtener información sobre archivos comprimidos.




       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No











  ### Ver también


   - [Opciones de contexto Zlib](#context.zlib)
















  # data://

  data:// — Datos (RFC 2397)






  ### Descripción


   La envoltura de flujo data:
   ([» RFC 2397](https://datatracker.ietf.org/doc/html/rfc2397)).







  ### Uso


   - data://text/plain;base64,






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       Sí



       Restringido por [allow_url_include](#ini.allow-url-include)
       Sí



       Permite la lectura
       Sí



       Permite la escritura
       No



       Permite la adición
       No



       Permite la lectura y escritura simultáneamente
       No



       Soporte de la función [stat()](#function.stat)
       No



       Soporte de la función [unlink()](#function.unlink)
       No



       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No











  ### Ejemplos


   **Ejemplo #1 Mostrar un contenido data://**



&lt;?php
// Muestra "I love PHP"
echo file_get_contents('data://text/plain;base64,SSBsb3ZlIFBIUAo=');
?&gt;





   **Ejemplo #2 Obtención del tipo de medio**



&lt;?php
$fp   = fopen('data://text/plain;base64,', 'r');
$meta = stream_get_meta_data($fp);

// Muestra "text/plain"
echo $meta['mediatype'];
?&gt;


















  # glob://

  glob:// — Encuentra nombres de ficheros que coinciden con un patrón dado






  ### Descripción


   La envoltura de flujo glob:.







  ### Uso


   - glob://






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Restringido por [allow_url_include](#ini.allow-url-include)
       No



       Permite la lectura
       No



       Permite la escritura
       No



       Permite la adición
       No



       Permite la lectura y escritura simultáneamente
       No



       Soporte de la función [stat()](#function.stat)
       No



       Soporte de la función [unlink()](#function.unlink)
       No



       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No











  ### Ejemplos


   **Ejemplo #1 Uso simple**



&lt;?php
// Recorre todos los ficheros *.php en el directorio ext/spl/examples/ y
// muestra el nombre del fichero así como su tamaño
$it = new DirectoryIterator("glob://ext/spl/examples/*.php");
foreach($it as $f) {
    printf("%s: %.1FK\n", $f-&gt;getFilename(), $f-&gt;getSize()/1024);
}
?&gt;



tree.php: 1.0K
findregex.php: 0.6K
findfile.php: 0.7K
dba_dump.php: 0.9K
nocvsdir.php: 1.1K
phar_from_dir.php: 1.0K
ini_groups.php: 0.9K
directorytree.php: 0.9K
dba_array.php: 1.1K
class_tree.php: 1.8K


















  # phar://

  phar:// — Archivo PHP






  ### Descripción


   La envoltura de flujo phar://.
   Véase [envoltura de flujo Phar](#phar.using.stream)
   para una descripción detallada.







  ### Uso


   - phar://






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Restringido por [allow_url_include](#ini.allow-url-include)
       No



       Permite la lectura
       Sí



       Permite la escritura
       Sí



       Permite la adición
       No



       Permite la lectura y escritura simultáneamente
       Sí



       Soporte de la función [stat()](#function.stat)
       Sí



       Soporte de la función [unlink()](#function.unlink)
       Sí



       Soporte de la función [rename()](#function.rename)
       Sí



       Soporte de la función [mkdir()](#function.mkdir)
       Sí



       Soporte de la función [rmdir()](#function.rmdir)
       Sí











  ### Ver también


   - [Opciones de contexto Phar](#context.phar)

















  # ssh2://

  ssh2:// — Shell seguro 2






  ### Descripción


   ssh2.shell://
   ssh2.exec://
   ssh2.tunnel://
   ssh2.sftp://
   ssh2.scp://
   (PECL)




  **Nota**:
   **Esta envoltura no está activada por omisión**

    Para utilizar la envoltura ssh2://,
    la extensión [» SSH2](https://pecl.php.net/package/ssh2)
    disponible en [» PECL](https://pecl.php.net/) debe ser instalada.






   Además de aceptar las identificaciones tradicionales mediante la URI,
   la envoltura ssh2 reutilizará las conexiones abiertas pasando la
   recurso de conexión en la parte host de la URL.







  ### Uso


   - ssh2.shell://user:pass@example.com:22/xterm

   - ssh2.exec://user:pass@example.com:22/usr/local/bin/somecmd

   - ssh2.tunnel://user:pass@example.com:22/192.168.0.1:14

   - ssh2.sftp://user:pass@example.com:22/path/to/filename






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       ssh2.shell
       ssh2.exec
       ssh2.tunnel
       ssh2.sftp
       ssh2.scp






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       Sí
       Sí
       Sí
       Sí
       Sí



       Permite la lectura
       Sí
       Sí
       Sí
       Sí
       Sí



       Permite la escritura
       Sí
       Sí
       Sí
       Sí
       No



       Permite el añadido
       No
       No
       No
       Sí (cuando sea soportado por el servidor)
       No



       Permite la lectura y escritura simultáneamente
       Sí
       Sí
       Sí
       Sí
       No



       Soporte de la función [stat()](#function.stat)
       No
       No
       No
       Sí
       No



       Soporte de la función [unlink()](#function.unlink)
       No
       No
       No
       Sí
       No



       Soporte de la función [rename()](#function.rename)
       No
       No
       No
       Sí
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No
       No
       No
       Sí
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No
       No
       No
       Sí
       No













    <caption>**Opciones de contexto**</caption>



       Nombre
       Uso
       Por omisión






       session
       recurso ssh2 pre-conectado para reutilizar
        



       sftp
       recurso sftp pre-asignado para reutilizar
        



       methods
       métodos de intercambio de claves, hostkey, cifrado, compresión y MAC a utilizar
        



       callbacks
        
        



       username
       Nombre de usuario para la conexión
        



       password
       Contraseña a utilizar durante la identificación por contraseña
        



       pubkey_file
       Nombre del archivo que contiene la clave pública a utilizar durante la identificación
        



       privkey_file
       Nombre del archivo que contiene la clave privada a utilizar durante la identificación
        



       env
       Array asociativo de variables de entorno a definir
        



       term
       Tipo de emulación de terminal a solicitar durante la asignación de un pty
        



       term_width
       Ancho del terminal a solicitar durante la asignación de un pty
        



       term_height
       Alto del terminal a solicitar durante la asignación de un pty
        



       term_units
       Unidades a utilizar con term_width y term_height
       **[SSH2_TERM_UNIT_CHARS](#constant.ssh2-term-unit-chars)**











  ### Ejemplos


   **Ejemplo #1 Apertura de un flujo desde una conexión activa**



&lt;?php
$session = ssh2_connect('example.com', 22);
ssh2_auth_pubkey_file($session, 'username', '/home/username/.ssh/id_rsa.pub',
                                            '/home/username/.ssh/id_rsa', 'secret');
$stream = fopen("ssh2.tunnel://$session/remote.example.com:1234", 'r');
?&gt;




   **Ejemplo #2 La variable $session debe permanecer disponible**



    Para utilizar la envoltura ssh2.*://$session,
    la variable de recurso $session debe ser conservada.
    El código a continuación no tendrá el efecto deseado:




&lt;?php
$session = ssh2_connect('example.com', 22);
ssh2_auth_pubkey_file($session, 'username', '/home/username/.ssh/id_rsa.pub',
                                            '/home/username/.ssh/id_rsa', 'secret');
$connection_string = "ssh2.sftp://$session/";
unset($session);
$stream = fopen($connection_string . "path/to/file", 'r');
?&gt;



    La función unset() cierra la sesión, ya que la variable $connection_string
    no contiene una referencia a la variable $session, sino solo
    una cadena derivada. Esto también ocurre cuando la función
    [unset()](#function.unset) es implícita, durante una salida del ámbito (como en una
    función).




















  # rar://

  rar:// — RAR






  ### Descripción


   Esta envoltura toma la ruta codificada URL hacia el archivo RAR (relativo o absoluto),
   luego, opcionalmente, un asterisco (*), opcionalmente seguido
   de un signo de número (#), y, siempre opcionalmente, un nombre de entrada
   codificado URL, tal como se almacena en el archivo. La especificación de un nombre de entrada
   requiere la presencia del signo de número; la presencia de una barra al inicio del nombre de
   la entrada es opcional.





   Esta envoltura puede abrir tanto ficheros como directorios. Al abrir directorios, el asterisco
   fuerza a que los nombres de los directorios sean devueltos sin codificar. Si no se especifica,
   serán devueltos en forma codificada URL - esto permite que la envoltura sea utilizada
   correctamente con funcionalidades internas como [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)
   en presencia de nombres de ficheros que parecen estar codificados URL.





   Si el signo de número y el nombre de la entrada no están incluidos, se mostrará la raíz del archivo.
   Esta visualización es diferente de los directorios regulares en el sentido de que el flujo resultante
   no contendrá información como la fecha y hora de modificación, ya que la raíz del directorio no se
   almacena como una entrada individual en el archivo. El uso de esta envoltura con
   [RecursiveDirectoryIterator](#class.recursivedirectoryiterator) requiere la presencia del signo de número en la URL al acceder
   a la raíz, para construir correctamente las URLs de los hijos.



  **Nota**:
   **Esta envoltura no está activada por defecto**

    Para utilizar la envoltura rar://,
    la extensión [» rar](https://pecl.php.net/package/rar)
    disponible en [» PECL](https://pecl.php.net/) debe estar instalada.





   rar:// está disponible a partir de PECL rar 3.0.0








  ### Uso


   - rar://&lt;nombre de archivo codificado URL&gt;[*][#&lt;nombre de entrada codificado URL&gt;]]






  ### Opciones





    <caption>**Resumen de la envoltura**</caption>



       Atributo
       Soportado






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Restringido por [allow_url_include](#ini.allow-url-include)
       No



       Permite la lectura
       Sí



       Permite la escritura
       No



       Permite la adición
       No



       Permite la lectura y escritura simultáneamente
       No



       Soporte de la función [stat()](#function.stat)
       Sí



       Soporte de la función [unlink()](#function.unlink)
       No



       Soporte de la función [rename()](#function.rename)
       No



       Soporte de la función [mkdir()](#function.mkdir)
       No



       Soporte de la función [rmdir()](#function.rmdir)
       No













    <caption>**Opciones de contexto**</caption>



       Nombre
       Uso
       Por omisión






       open_password

        La contraseña utilizada para cifrar los encabezados del archivo,
        si los hay. WinRAR cifrará todos los ficheros con la misma contraseña que los
        encabezados cuando esta esté presente, por lo tanto, para archivos con
        encabezados cifrados, file_password será ignorado.

        



       file_password

        La contraseña utilizada para cifrar un fichero, si la hay.
        Si los encabezados también están cifrados, esta opción será ignorada y se
        privilegiará la contraseña de la opción open_password.
        La razón por la que hay 2 opciones es el deseo de poder cubrir la posibilidad
        de soportar archivos con diferentes contraseñas para los encabezados y los ficheros.
        Tenga en cuenta que si el encabezado del archivo no está cifrado, la opción
        open_password será ignorada y esta opción debe ser utilizada en su lugar.

        



       volume_callback

        Una función de devolución de llamada para determinar la ruta de los volúmenes faltantes.
        Consulte el método [RarArchive::open()](#rararchive.open) para obtener más información.

        











  ### Ejemplos


   **Ejemplo #1 Recorrido de un archivo RAR**



&lt;?php

class MyRecDirIt extends RecursiveDirectoryIterator {
    function current() {
        return rawurldecode($this-&gt;getSubPathName()) .
            (is_dir(parent::current())?" [DIR]":"");
    }
}

$f = "rar://" . rawurlencode(dirname(__FILE__)) .
    DIRECTORY_SEPARATOR . 'dirs_and_extra_headers.rar#';

$it = new RecursiveTreeIterator(new MyRecDirIt($f));

foreach ($it as $s) {
    echo $s, "\n";
}
?&gt;


    Resultado del ejemplo anterior es similar a:



|-allow_everyone_ni [DIR]
|-file1.txt
|-file2_אּ.txt
|-with_streams.txt
\-אּ [DIR]
  |-אּ\%2Fempty%2E [DIR]
  | \-אּ\%2Fempty%2E\file7.txt
  |-אּ\empty [DIR]
  |-אּ\file3.txt
  |-אּ\file4_אּ.txt
  \-אּ\אּ_2 [DIR]
    |-אּ\אּ_2\file5.txt
    \-אּ\אּ_2\file6_אּ.txt




   **Ejemplo #2 Apertura de un fichero cifrado (encabezado cifrado)**



&lt;?php
$stream = fopen("rar://" .
    rawurlencode(dirname(__FILE__)) . DIRECTORY_SEPARATOR .
    'encrypted_headers.rar' . '#encfile1.txt', "r", false,
    stream_context_create(
        array(
            'rar' =&gt;
                array(
                    'open_password' =&gt; 'samplepassword'
                )
            )
        )
    );
var_dump(stream_get_contents($stream));
/* Las fechas de creación y último acceso son opcionales con WinRAR,
 * lo que explica que la mayoría de los ficheros no las tengan */
var_dump(fstat($stream));
?&gt;


    Resultado del ejemplo anterior es similar a:



string(26) "Encrypted file 1 contents."
Array
(
    [0] =&gt; 0
    [1] =&gt; 0
    [2] =&gt; 33206
    [3] =&gt; 1
    [4] =&gt; 0
    [5] =&gt; 0
    [6] =&gt; 0
    [7] =&gt; 26
    [8] =&gt; 0
    [9] =&gt; 1259550052
    [10] =&gt; 0
    [11] =&gt; -1
    [12] =&gt; -1
    [dev] =&gt; 0
    [ino] =&gt; 0
    [mode] =&gt; 33206
    [nlink] =&gt; 1
    [uid] =&gt; 0
    [gid] =&gt; 0
    [rdev] =&gt; 0
    [size] =&gt; 26
    [atime] =&gt; 0
    [mtime] =&gt; 1259550052
    [ctime] =&gt; 0
    [blksize] =&gt; -1
    [blocks] =&gt; -1
)



















  # ogg://

  ogg:// — Flujos de audio






  ### Descripción


   Los ficheros que se abran para lectura usando la envoltura ogg://
   se utilizan como codificaciones de audio comprimido usando el códec OGG/Vorbis.
   De forma similar, los ficheros abiertos para escritura o para añadir contenido usando
   la envoltura ogg:// se escriben como datos de audio comprimidos.
   Cuando se use la función [stream_get_meta_data()](#function.stream-get-meta-data) con un fichero
   OGG/Vorbis abierto para lectura, se devolverán diversos detalles del
   flujo, incluyendo la etiqueta vendor, cualquier
   comments que se haya añadido, el número de canales
   channels, el ratio de muestreo,
   y el rango del ratio de codificación descrito por:
   bitrate_lower, bitrate_upper,
   bitrate_nominal, y bitrate_window.




  ogg:// (PECL)


  **Nota**:
   **Esta envoltura no está habilitada por omisión**

    Para usar la envoltura ogg:// es necesario instalar
    la extensión [» OGG/Vorbis](https://pecl.php.net/package/oggvorbis)
    disponible en [» PECL](https://pecl.php.net/).








  ### Uso


   - ogg://soundfile.ogg

   - ogg:///path/to/soundfile.ogg

   - ogg://http://www.example.com/path/to/soundstream.ogg






  ### Opciones





    <caption>**Resumen de la Envoltura**</caption>



       Atributo
       Permitido






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Permite Lecturas
       Sí



       Permite Escrituras
       Sí



       Permite Añadir contenido
       Sí



       Permite Lecturas y Escrituras Simultánea
       No



       Permite usar la función [stat()](#function.stat)
       No



       Permite usar la función [unlink()](#function.unlink)
       No



       Permite usar la función [rename()](#function.rename)
       No



       Permite usar la función [mkdir()](#function.mkdir)
       No



       Permite usar la función [rmdir()](#function.rmdir)
       No












    <caption>**Opciones de contexto**</caption>



       Nombre
       Uso
       Valor por omisión
       Modo






       pcm_mode

        codificación PCM que se aplicará en las lecturas, de entre:
        **[OGGVORBIS_PCM_U8](#constant.oggvorbis-pcm-u8)**, **[OGGVORBIS_PCM_S8](#constant.oggvorbis-pcm-s8)**,
        **[OGGVORBIS_PCM_U16_BE](#constant.oggvorbis-pcm-u16-be)**, **[OGGVORBIS_PCM_S16_BE](#constant.oggvorbis-pcm-s16-be)**,
        **[OGGVORBIS_PCM_U16_LE](#constant.oggvorbis-pcm-u16-le)**, y **[OGGVORBIS_PCM_S16_LE](#constant.oggvorbis-pcm-s16-le)**.
        (8 o 16 bit, con o sin signo, big o little endian)

       OGGVORBIS_PCM_S16_LE
       Lectura



       rate

        Ratio de muestreo en datos de entradas, expresado en Hz

       44100
       Escritura/Adición



       bitrate

        Si es un entero, definirá el bitrate fijo al que se codificará. (de 16000 a 131072)
        Si es un real, definirá la calidad del bitrate variable a usar. (de -1.0 a 1.0)

       128000
       Escritura/Adición



       channels

        El número de canales de audio a codificar, normalmente 1 (mono), o 2 (estéreo).
        Puede llegar a 16.

       2
       Escritura/Adición



       comments

        Un array de strings a codificar en la cabecera de la pista.

        
       Escritura/Adición
























  # expect://

  expect:// — Flujos de Interacción de Procesos






  ### Descripción


   Los flujos que se hayan abierto con la envoltura expect://, darán
   acceso a stdio, stdout y stderr (entrada, salida y errores estándar respectivamente)
   de los procesos, vía PTY.



  **Nota**:
   **Esta envoltura no está habilitada por omisión**

    Para poder usar la envoltura expect:// se debe instalar
    la extensión [» Expect](https://pecl.php.net/package/expect)
    disponible en [» PECL](https://pecl.php.net/).




  expect:// (PECL)






  ### Uso


   - expect://command






  ### Opciones





    <caption>**Resumen de la Envoltura**</caption>



       Atributo
       Permitido






       Restringido por [allow_url_fopen](#ini.allow-url-fopen)
       No



       Permites Lecturas
       Sí



       Permite Escrituras
       No



       Permite Añadir contenido
       Sí



       Permite Lecturas y Escrituras Simultáneas
       No



       Permite usar la función [stat()](#function.stat)
       No



       Permite usar la función [unlink()](#function.unlink)
       No



       Permite usar la función [rename()](#function.rename)
       No



       Permite usar la función [mkdir()](#function.mkdir)
       No



       Permite usar la función [rmdir()](#function.rmdir)
       No


















## Tabla de contenidos
- [file://](#wrappers.file) — Acceso al sistema de ficheros local
- [http://](#wrappers.http) — Acceso a URLs HTTP(s)
- [ftp://](#wrappers.ftp) — Acceso a URLs FTP(s)
- [php://](#wrappers.php) — Acceso a los diversos flujos I/O
- [zlib://](#wrappers.compression) — Flujos de compresión
- [data://](#wrappers.data) — Datos (RFC 2397)
- [glob://](#wrappers.glob) — Encuentra nombres de ficheros que coinciden con un patrón dado
- [phar://](#wrappers.phar) — Archivo PHP
- [ssh2://](#wrappers.ssh2) — Shell seguro 2
- [rar://](#wrappers.rar) — RAR
- [ogg://](#wrappers.audio) — Flujos de audio
- [expect://](#wrappers.expect) — Flujos de Interacción de Procesos








 - [La sintaxis básica](#language.basic-syntax)<li>[Etiquetas PHP](#language.basic-syntax.phptags)
- [Escape desde HTML](#language.basic-syntax.phpmode)
- [Separación de instrucciones](#language.basic-syntax.instruction-separation)
- [Comentarios](#language.basic-syntax.comments)
</li>- [Los tipos](#language.types)<li>[Introducción](#language.types.intro)
- [Sistema de tipos](#language.types.type-system)
- [NULL](#language.types.null)
- [Booleano](#language.types.boolean)
- [Los enteros](#language.types.integer)
- [Números de punto flotante](#language.types.float)
- [Cadenas](#language.types.string)
- [Strings numéricos](#language.types.numeric-strings)
- [Arrays](#language.types.array)
- [Los objetos](#language.types.object)
- [Las enumeraciones](#language.types.enumerations)
- [Recursos](#language.types.resource)
- [Callables](#language.types.callable)
- [Mixed](#language.types.mixed)
- [Void](#language.types.void)
- [Never](#language.types.never)
- [Tipos de clases relativas](#language.types.relative-class-types)
- [Tipo singleton](#language.types.singleton)
- [Itérables](#language.types.iterable)
- [Declaraciones de tipo](#language.types.declarations)
- [Manipulación de tipos](#language.types.type-juggling)
</li>- [Variables](#language.variables)<li>[Conceptos básicos](#language.variables.basics)
- [Variables Predefinidas](#language.variables.predefined)
- [Ámbito de las variables](#language.variables.scope)
- [Variables variables](#language.variables.variable)
- [Variables desde fuentes externas](#language.variables.external)
</li>- [Constants](#language.constants)<li>[Syntax](#language.constants.syntax)
- [Predefined constants](#language.constants.predefined)
- [Magic constants](#language.constants.magic)
</li>- [Expresiones](#language.expressions)
- [Los operadores](#language.operators)<li>[Prioridad de los operadores](#language.operators.precedence) — La prioridad de los operadores
- [Aritmética](#language.operators.arithmetic) — Los operadores aritméticos
- [Incremento y decremento](#language.operators.increment) — Operadores de incremento y decremento
- [Asignación](#language.operators.assignment) — Los operadores de asignación
- [Bitwise](#language.operators.bitwise) — Operadores a nivel de bits
- [Comparación](#language.operators.comparison) — Operadores de comparación
- [Control de errores](#language.operators.errorcontrol) — Operador de control de errores
- [Ejecución](#language.operators.execution) — Operador de ejecución
- [Lógica](#language.operators.logical) — Los operadores lógicos
- [String](#language.operators.string) — Operadores de string
- [Arrays](#language.operators.array) — Operadores de arrays
- [Tipo](#language.operators.type) — Operadores de tipos
- [Funcional](#language.operators.functional) — Operadores funcionales
</li>- [Estructuras de Control](#language.control-structures)<li>[Introducción](#control-structures.intro)
- [if](#control-structures.if)
- [else](#control-structures.else)
- [elseif/else if](#control-structures.elseif)
- [Sintaxis alternativa](#control-structures.alternative-syntax)
- [while](#control-structures.while)
- [do-while](#control-structures.do.while)
- [for](#control-structures.for)
- [foreach](#control-structures.foreach)
- [break](#control-structures.break)
- [continue](#control-structures.continue)
- [switch](#control-structures.switch)
- [match](#control-structures.match)
- [declare](#control-structures.declare)
- [return](#function.return)
- [require](#function.require)
- [include](#function.include)
- [require_once](#function.require-once)
- [include_once](#function.include-once)
- [goto](#control-structures.goto)
</li>- [Las funciones](#language.functions)<li>[Las funciones definidas por el usuario](#functions.user-defined)
- [Parámetros y argumentos de función](#functions.arguments)
- [Los valores de retorno](#functions.returning-values)
- [Funciones variables](#functions.variable-functions)
- [Funciones internas](#functions.internal)
- [Funciones anónimas](#functions.anonymous)
- [Función Flecha](#functions.arrow)
- [Sintaxis callable de primera clase](#functions.first_class_callable_syntax)
</li>- [Clases y objetos](#language.oop5)<li>[Introducción](#oop5.intro)
- [Sintaxis básica](#language.oop5.basic)
- [Propiedades](#language.oop5.properties)
- [Hooks de propiedad](#language.oop5.property-hooks)
- [Constantes de clase](#language.oop5.constants)
- [Autocarga de clases](#language.oop5.autoload)
- [Constructores y destructores](#language.oop5.decon)
- [Visibilidad](#language.oop5.visibility)
- [Herencia](#language.oop5.inheritance)
- [El operador de resolución de ámbito (::)](#language.oop5.paamayim-nekudotayim)
- [Estático](#language.oop5.static)
- [Abstracción de clases](#language.oop5.abstract)
- [Interfaces](#language.oop5.interfaces)
- [Traits](#language.oop5.traits)
- [Clases anónimas](#language.oop5.anonymous)
- [Sobrecarga mágica](#language.oop5.overloading)
- [Recorrido de objetos](#language.oop5.iterations)
- [Métodos mágicos](#language.oop5.magic)
- [Palabra clave "final"](#language.oop5.final)
- [Clonación de objetos](#language.oop5.cloning)
- [Comparación de objetos](#language.oop5.object-comparison)
- [Late Static Bindings (Résolution statique a la volée)](#language.oop5.late-static-bindings)
- [Objetos y referencias](#language.oop5.references)
- [Serialización de objetos](#language.oop5.serialization) — Serializar objetos - objetos en sesión
- [Covarianza y Contravarianza](#language.oop5.variance)
- [Objetos perezosos](#language.oop5.lazy-objects)
- [Modificaciones en POO (Programación orientada a objetos)](#language.oop5.changelog)
</li>- [Los espacios de nombres](#language.namespaces)<li>[Introducción](#language.namespaces.rationale) — Introducción a los espacios de nombres
- [Definición de espacios de nombres](#language.namespaces.definition)
- [Subespacio de nombres](#language.namespaces.nested) — Declaración de un subespacio de nombres
- [Definición de varios espacios de nombres en el mismo archivo](#language.namespaces.definitionmultiple)
- [Introducción](#language.namespaces.basics) — Uso de espacios de nombres: introducción
- [Espacios de nombres y lenguaje dinámico](#language.namespaces.dynamic)
- [Comando namespace y __NAMESPACE__](#language.namespaces.nsconstants) — El comando namespace y la constante __NAMESPACE__
- [Importación y alias](#language.namespaces.importing) — Uso de espacios de nombres: importación y alias
- [Global](#language.namespaces.global) — Espacio de nombres global
- [Retorno al espacio global](#language.namespaces.fallback) — Uso de espacios de nombres: retorno al espacio global para funciones y constantes
- [Reglas de resolución de nombres](#language.namespaces.rules)
- [Preguntas frecuentes](#language.namespaces.faq) — Preguntas frecuentes: lo que debe saber sobre espacios de nombres
</li>- [Enumeraciones](#language.enumerations)<li>[Visión general de las enumeraciones](#language.enumerations.overview)
- [Enumeraciones básicas](#language.enumerations.basics)
- [Enumeraciones respaldadas](#language.enumerations.backed)
- [Métodos de enumeración](#language.enumerations.methods)
- [Métodos estáticos de enumeración](#language.enumerations.static-methods)
- [Constantes de enumeración](#language.enumerations.constants)
- [Traits](#language.enumerations.traits)
- [Valores de enumeración en expresiones constantes](#language.enumerations.expressions)
- [Diferencias con los objetos](#language.enumerations.object-differences)
- [Listado de valores](#language.enumerations.listing)
- [Serialización](#language.enumerations.serialization)
- [Por qué las enumeraciones no son extensibles](#language.enumerations.object-differences.inheritance)
- [Ejemplos](#language.enumerations.examples)
</li>- [Errores](#language.errors)<li>[Lo básico](#language.errors.basics)
- [Errores en PHP 7](#language.errors.php7)
</li>- [Las excepciones](#language.exceptions)<li>[Extender las Excepciones](#language.exceptions.extending)
</li>- [Fibers](#language.fibers)
- [Generators](#language.generators)<li>[Resumen sobre los generadores](#language.generators.overview)
- [Sintaxis de un Generador](#language.generators.syntax)
- [Comparación de los generadores con los objetos Iterator](#language.generators.comparison)
</li>- [Atributos](#language.attributes)<li>[Descripción general de atributos](#language.attributes.overview)
- [Sintaxis de atributos](#language.attributes.syntax)
- [Lectura de atributos con la API de Reflection](#language.attributes.reflection)
- [Declaración de clases de atributos](#language.attributes.classes)
</li>- [Las referencias](#language.references)<li>[¿Qué es una referencia?](#language.references.whatare)
- [¿Qué hacen las referencias?](#language.references.whatdo)
- [Lo que las referencias no son](#language.references.arent)
- [Paso por referencia](#language.references.pass)
- [Devolver referencias](#language.references.return)
- [Destruir una referencia](#language.references.unset)
- [Identificar una referencia](#language.references.spot)
</li>- [Variables predefinidas](#reserved.variables)<li>[Las Superglobales](#language.variables.superglobals) — Variables internas siempre disponibles, independientemente del contexto
- [$GLOBALS](#reserved.variables.globals) — Hace referencia a todas las variables disponibles en un contexto global
- [$_SERVER](#reserved.variables.server) — Variables de servidor y de ejecución
- [$_GET](#reserved.variables.get) — Variables la cadena de consulta
- [$_POST](#reserved.variables.post) — Datos de formulario de solicitudes HTTP POST
- [$_FILES](#reserved.variables.files) — Variables de subida de ficheros HTTP
- [$_REQUEST](#reserved.variables.request) — Variables HTTP Request
- [$_SESSION](#reserved.variables.session) — Variables de sesión
- [$_ENV](#reserved.variables.environment) — Variables de entorno
- [$_COOKIE](#reserved.variables.cookies) — Cookies HTTP
- [$php_errormsg](#reserved.variables.phperrormsg) — El último mensaje de error
- [$http_response_header](#reserved.variables.httpresponseheader) — Cabeceras de respuesta HTTP
- [$argc](#reserved.variables.argc) — El número de argumentos pasados a un script
- [$argv](#reserved.variables.argv) — Array de argumentos pasados al script
</li>- [Excepciones predefinidas](#reserved.exceptions)<li>[Exception](#class.exception)
- [ErrorException](#class.errorexception)
- [ClosedGeneratorException](#class.closedgeneratorexception) — La clase ClosedGeneratorException
- [Error](#class.error)
- [ArgumentCountError](#class.argumentcounterror)
- [ArithmeticError](#class.arithmeticerror)
- [AssertionError](#class.assertionerror)
- [DivisionByZeroError](#class.divisionbyzeroerror)
- [CompileError](#class.compileerror)
- [ParseError](#class.parseerror)
- [TypeError](#class.typeerror)
- [ValueError](#class.valueerror)
- [UnhandledMatchError](#class.unhandledmatcherror)
- [FiberError](#class.fibererror)
- [RequestParseBodyException](#class.requestparsebodyexception)
</li>- [Interfaces y clases predefinidas](#reserved.interfaces)<li>[Traversable](#class.traversable) — La interfaz Traversable
- [Iterator](#class.iterator) — La interfaz Iterator
- [IteratorAggregate](#class.iteratoraggregate) — La interfaz IteratorAggregate
- [InternalIterator](#class.internaliterator) — La clase InternalIterator
- [Throwable](#class.throwable)
- [Countable](#class.countable) — La interfaz Countable
- [ArrayAccess](#class.arrayaccess) — La interfaz ArrayAccess
- [Serializable](#class.serializable) — La interfaz Serializable
- [Closure](#class.closure) — La clase Closure
- [stdClass](#class.stdclass) — La clase stdClass
- [Generator](#class.generator) — La clase Generator
- [Fiber](#class.fiber) — La clase Fiber
- [WeakReference](#class.weakreference) — La clase WeakReference
- [WeakMap](#class.weakmap) — La clase WeakMap
- [Stringable](#class.stringable) — La interfaz Stringable
- [UnitEnum](#class.unitenum) — La interfaz UnitEnum
- [BackedEnum](#class.backedenum) — La interfaz BackedEnum
- [SensitiveParameterValue](#class.sensitiveparametervalue) — La clase SensitiveParameterValue
- [__PHP_Incomplete_Class](#class.php-incomplete-class) — La clase __PHP_Incomplete_Class
</li>- [Atributos predefinidos](#reserved.attributes)<li>[Attribute](#class.attribute) — La clase Attribute
- [AllowDynamicProperties](#class.allowdynamicproperties) — La clase AllowDynamicProperties
- [Deprecated](#class.deprecated) — El atributo Deprecated
- [Override](#class.override) — La clase Override
- [ReturnTypeWillChange](#class.returntypewillchange) — La clase ReturnTypeWillChange
- [SensitiveParameter](#class.sensitiveparameter) — La clase SensitiveParameter
</li>- [Opciones y parámetros de contexto](#context)<li>[Opciones de contexto de los sockets](#context.socket) — Lista de opciones de contexto de los sockets
- [Opciones de contexto HTTP](#context.http) — Lista de opciones de contexto HTTP
- [Opciones de contexto FTP](#context.ftp) — Lista de opciones de contexto FTP
- [Opciones de contexto SSL](#context.ssl) — Lista de opciones de contexto SSL
- [Opciones de contexto Phar](#context.phar) — Listado de opciones de contexto Phar
- [Contexto parámetros](#context.params) — Listado de parámetros de contexto
- [Opciones de contexto Zip](#context.zip) — Listado de opciones de contexto Zip
- [Opciones de contexto Zlib](#context.zlib) — Lista de opciones de contexto Zlib
</li>- [Protocolos y Envolturas soportados](#wrappers)<li>[file://](#wrappers.file) — Acceso al sistema de ficheros local
- [http://](#wrappers.http) — Acceso a URLs HTTP(s)
- [ftp://](#wrappers.ftp) — Acceso a URLs FTP(s)
- [php://](#wrappers.php) — Acceso a los diversos flujos I/O
- [zlib://](#wrappers.compression) — Flujos de compresión
- [data://](#wrappers.data) — Datos (RFC 2397)
- [glob://](#wrappers.glob) — Encuentra nombres de ficheros que coinciden con un patrón dado
- [phar://](#wrappers.phar) — Archivo PHP
- [ssh2://](#wrappers.ssh2) — Shell seguro 2
- [rar://](#wrappers.rar) — RAR
- [ogg://](#wrappers.audio) — Flujos de audio
- [expect://](#wrappers.expect) — Flujos de Interacción de Procesos
</li>
$$
