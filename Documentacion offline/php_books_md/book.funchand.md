# Manejo de Funciones

# Introducción

Todas estas funciones tratan varias operaciones involucradas al trabajar
con funciones.

# Funciones de Manejo de Funciones

# call_user_func

(PHP 4, PHP 5, PHP 7, PHP 8)

call_user_func — Llama a una función de retorno proporcionada por el primer argumento

### Descripción

**call_user_func**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

Llama a una función de retorno callback
proporcionada por el parámetro callback
donde los otros argumentos serán pasados como argumentos.

### Parámetros

     callback


       La función de retorno a llamar.






     args


       0 o más argumentos a pasar a la función de retorno.



      **Nota**:



        Tenga en cuenta que los argumentos para **call_user_func()** no son pasados por referencia.



         **Ejemplo #1 Ejemplo con call_user_func()** por referencia




&lt;?php
function increment(&amp;$var)
{
$var++;
}

$a = 0;
call_user_func('increment', $a);
echo $a."\n";

// es posible utilizar esto en su lugar
call_user_func_array('increment', array(&amp;$a));
echo $a."\n";

// también es posible utilizar funciones variables
$increment = 'increment';
$increment($a);
echo $a."\n";
?&gt;

         El ejemplo anterior mostrará:




Warning: Parameter 1 to increment() expected to be a reference, value given in …
0
1
2

### Valores devueltos

Retorna el valor retornado por la función de retorno.

### Ejemplos

    **Ejemplo #2 Ejemplo con call_user_func()**

&lt;?php
function barber($type)
{
echo "Usted quiere un corte $type, ningún problema";
}
call_user_func('barber', "al tazón");
call_user_func('barber', "con navaja");
?&gt;

    El ejemplo anterior mostrará:

Usted quiere un corte al tazón, ningún problema
Usted quiere un corte con navaja, ningún problema

    **Ejemplo #3 Ejemplo con call_user_func()** utilizando un espacio de nombres

&lt;?php

namespace Foobar;

class Foo {
static public function test() {
print "¡Hola mundo!\n";
}
}

call_user_func(**NAMESPACE** .'\Foo::test');
call_user_func(array(**NAMESPACE** .'\Foo', 'test'));
?&gt;

    El ejemplo anterior mostrará:

¡Hola mundo!
¡Hola mundo!

    **Ejemplo #4 Uso de un método de clase con call_user_func()**

&lt;?php

class maclasse {
static function dit_bonjour()
{
echo "¡Hola!\n";
}
}

$classname = "maclasse";

call_user_func(array($classname, 'dit_bonjour'));
call_user_func($classname .'::dit_bonjour');

$monobjet = new maclasse();

call_user_func(array($monobjet, 'dit_bonjour'));

?&gt;

    El ejemplo anterior mostrará:

¡Hola!
¡Hola!
¡Hola!

    **Ejemplo #5 Uso de una función lambda con call_user_func()**

&lt;?php
call_user_func(function($arg) { print "[$arg]\n"; }, 'test');
?&gt;

    El ejemplo anterior mostrará:

[test]

### Notas

**Nota**:

Las devoluciónes de llamada registradas
con funciones como **call_user_func()** y [call_user_func_array()](#function.call-user-func-array) no serán
llamadas si una excepción no es interceptada cuando ha sido lanzada en una función de devolución de llamada anterior.

### Ver también

    - [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

    - [Funciones variables](#functions.variable-functions)

    - [ReflectionFunction::invoke()](#reflectionfunction.invoke) - Invoca una función

    - [ReflectionMethod::invoke()](#reflectionmethod.invoke) - Invoca

# call_user_func_array

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

call_user_func_array — Llama a una función de retorno con los argumentos agrupados en un array

### Descripción

**call_user_func_array**([callable](#language.types.callable) $callback, [array](#language.types.array) $args): [mixed](#language.types.mixed)

Llama a la función de retorno callback
proporcionada con los argumentos args,
agrupados en un array.

### Parámetros

     callback


       La función de retorno a llamar.






     args


       Los argumentos a pasar a la función de retorno,
       en forma de array.




        Si las claves de args son todas numéricas,
        las claves son ignoradas y cada elemento será transmitido a
        callback como argumento posicional, en el orden.




        Si algunas claves de args son strings,
        estos elementos serán transmitidos a callback
        como argumentos nombrados, con el nombre dado por la clave.




        No es permitido tener una clave numérica en args
        que aparezca después de una clave de string, o tener una clave de string
        que no corresponda al nombre de algún parámetro de callback





### Valores devueltos

Retorna el valor retornado por la función
de retorno, o **[false](#constant.false)** si ocurre un error.

    ### Historial de cambios








              Versión
              Descripción






              8.0.0

                Las claves args serán interpretadas como nombres de parámetros,
                en lugar de ser ignoradas silenciosamente.







### Ejemplos

    **Ejemplo #1 Ejemplo con call_user_func_array()**

&lt;?php
function foobar($arg, $arg2) {
    echo __FUNCTION__, " recibió $arg y $arg2\n";
}
class foo {
    function bar($arg, $arg2) {
echo **METHOD**, " recibió $arg y $arg2\n";
}
}

// Llamar a la función foobar() con 2 argumentos
call_user_func_array("foobar", array("one", "two"));

// Llamar al método $foo-&gt;bar() con 2 argumentos
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));
?&gt;

    Resultado del ejemplo anterior es similar a:

foobar recibió one y two
foo::bar recibió three y four

    **Ejemplo #2 Ejemplo con call_user_func_array()** utilizando un espacio de nombres

&lt;?php

namespace Foobar;

class Foo {
static public function test($name) {
        print "¡Hola {$name}!\n";
}
}

call_user_func_array(**NAMESPACE** .'\Foo::test', array('Hannes'));

call_user_func_array(array(**NAMESPACE** .'\Foo', 'test'), array('Philip'));

?&gt;

    El ejemplo anterior mostrará:

¡Hola Hannes!
¡Hola Philip!

    **Ejemplo #3 Uso de una función lambda**

&lt;?php

$func = function($arg1, $arg2) {
return $arg1 \* $arg2;
};

var_dump(call_user_func_array($func, array(2, 4)));

?&gt;

    El ejemplo anterior mostrará:

int(8)

    **Ejemplo #4 Pasando un valor por referencia**

&lt;?php

function mega(&amp;$a){
    $a = 55;
    echo "function mega \$a=$a\n";
}
$bar = 77;
call_user_func_array('mega',array(&amp;$bar));
echo "global \$bar=$bar\n";

?&gt;

    El ejemplo anterior mostrará:

function mega $a=55
global $bar=55

    **Ejemplo #5 call_user_func_array()** utilizando argumentos nombrados

&lt;?php
function foobar($first, $second) {
echo **FUNCTION**, " recibió $first y $second\n";
}

// Llamar a la función foobar() con argumentos nombrados en orden no posicional
call_user_func_array("foobar", array("second" =&gt; "two", "first" =&gt; "one"));

// Llamar a la función foobar() con un argumento nombrado
call_user_func_array("foobar", array("foo", "second" =&gt; "bar"));

// Error fatal: No se puede usar un argumento posicional después de un argumento nombrado
call_user_func_array("foobar", array("first" =&gt; "one", "bar"));

?&gt;

    Resultado del ejemplo anterior es similar a:

foobar recibió one y two
foobar recibió foo y bar

Fatal error: Uncaught Error: Cannot use positional argument after named argument

### Notas

**Nota**:

Las devoluciónes de llamada registradas
con funciones como [call_user_func()](#function.call-user-func) y **call_user_func_array()** no serán
llamadas si una excepción no es interceptada cuando ha sido lanzada en una función de devolución de llamada anterior.

### Ver también

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

    - [ReflectionFunction::invokeArgs()](#reflectionfunction.invokeargs) - Invoca los argumentos de una función

    - [ReflectionMethod::invokeArgs()](#reflectionmethod.invokeargs) - Invoca los argumentos

# create_function

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7)

create_function — Crea una función anónima

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**create_function**([string](#language.types.string) $args, [string](#language.types.string) $code): [string](#language.types.string)

**create_function()** crea una función anónima,
a partir de los argumentos pasados, y devuelve un nombre de función único.

**Precaución**

    Esta función, internamente, utiliza la función
    [eval()](#function.eval) y por lo tanto los requisitos
    de seguridad son idénticos a los de la función [eval()](#function.eval).
    Además, el rendimiento no es óptimo y el uso de memoria
    es significativo.




    Una [función anónima](#functions.anonymous) nativa
    debería ser utilizada en su lugar.

### Parámetros

Generalmente, los argumentos args son
presentados en forma de una cadena entre comillas simples, y la misma
recomendación aplica para code.
La razón de usar comillas simples es proteger
los nombres de variables del reemplazo por su valor. Si se usan
comillas dobles, no se olvide de escapar
los nombres de variables (i.e. \$avar).

     args


       Los argumentos de la función.






     code


       El código de la función.





### Valores devueltos

Devuelve un nombre de función único, en forma de una [string](#language.types.string),
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1
     Creación de una función anónima con create_function()**




     Esta función puede ser utilizada para (por ejemplo) crear
     una función a partir de información recolectada
     durante la ejecución:

&lt;?php
$newfunc = create_function('$a,$b', 'return "ln($a) + ln($b) = " . log($a \* $b);');
echo "Nueva función anónima: $newfunc\n";
echo $newfunc(2, M_E) . "\n";
// mostrará:
// Nueva función anónima: lambda_1
// ln(2) + ln(2.718281828459) = 1.6931471805599
?&gt;

O, para poder aplicar una función genérica
a una lista de argumentos.

    **Ejemplo #2
     Procesamiento genérico por función con create_function()**

&lt;?php
function process($var1, $var2, $farr)
{
    foreach ($farr as $f) {
        echo $f($var1, $var2) . "\n";
}
}

// Creación de una serie de funciones matemáticas
$f1 = 'if ($a &gt;=0) {return "b*a^2 = ".$b*sqrt($a);} else {return false;}';
$f2 = "return \"min(b^2+a, a^2,b) = \".min(\$a*\$a+\$b,\$b*\$b+\$a);";
$f3 = 'if ($a &gt; 0 &amp;&amp; $b != 0) {return "ln(a)/b = ".log($a)/$b; } else { return false; }';
$farr = array(
create_function('$x,$y', 'return "un poco de trigonometría: ".(sin($x) + $x*cos($y));'),
create_function('$x,$y', 'return "una hipotenusa: ".sqrt($x*$x + $y*$y);'),
create_function('$a,$b', $f1),
    create_function('$a,$b', $f2),
    create_function('$a,$b', $f3)
);

echo "\nUso de la primera lista de funciones anónimas\n";
echo "parámetros: 2.3445, M_PI\n";
process(2.3445, M_PI, $farr);

// Ahora una lista de funciones sobre cadenas de caracteres
$garr = array(
    create_function('$b,$a', 'if (strncmp($a, $b, 3) == 0) return "** \"$a\" '.
'and \"$b\"\n** Look the same to me! (looking at the first 3 chars)";'),
    create_function('$a,$b', '; return "CRCs: " . crc32($a) . ", ".crc32($b);'),
    create_function('$a,$b', '; return "similaridad (a,b) = " . similar_text($a, $b, &amp;$p) . "($p%)";')
);
echo "\nUso de la segunda lista de funciones anónimas\n";
process("Twas brilling and the slithy toves", "Twas the night", $garr);
?&gt;

    El ejemplo anterior mostrará:

Uso de la primera lista de funciones anónimas
parámetros: 2.3445, M_PI
un poco de trigonometría: -1.6291725057799
una hipotenusa: 3.9199852871011
b\*a^2 = 4.8103313314525
min(b^2+a, a^2,b) = 8.6382729035898
ln(a)/b = 0.27122299212594

Uso de la segunda lista de funciones anónimas
** "Twas the night" and "Twas brilling and the slithy toves"
** Estas cadenas se parecen! (mirando los tres primeros caracteres)
CRCs: -725381282, 342550513
similaridad (a,b) = 11(45.833333333333%)

Pero el uso más común de las funciones lambda es la
función de devolución de llamada, por ejemplo, al utilizar
[array_walk()](#function.array-walk) o [usort()](#function.usort)

    **Ejemplo #3 Uso de funciones anónimas como función de devolución de llamada**

&lt;?php
$av = array("la ", "una ", "cette ", "une certaine ");
array_walk($av, create_function('&amp;$v,$k', '$v = $v . "maison";'));
print_r($av);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; la maison
[1] =&gt; une maison
[2] =&gt; cette maison
[3] =&gt; une certaine maison
)

     un array de cadenas de caracteres ordenadas de la más corta a la más larga

&lt;?php

$sv = array("petite", "longue", "une très longue chaîne", "une phrase toute entière");
print_r($sv);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; petite
[1] =&gt; longue
[2] =&gt; une très longue chaîne
[3] =&gt; une phrase toute entière
)

     ordenadas de la más larga a la más corta

&lt;?php

usort($sv, create_function('$a,$b','return strlen($b) - strlen($a);'));
print_r($sv);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; une phrase toute entière
[1] =&gt; une très longue chaîne
[2] =&gt; longue
[3] =&gt; petite
)

### Ver también

    - [Funciones anónimas](#functions.anonymous)

# forward_static_call

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

forward_static_call — Llamar a un método estático

### Descripción

**forward_static_call**([callable](#language.types.callable) $function, [mixed](#language.types.mixed) $parameter = ?, [mixed](#language.types.mixed) $... = ?): [mixed](#language.types.mixed)

Llama a una función o método definido por el usuario, dado por el parámetro
function, con los siguientes argumentos. Esta función debe ser llamada dentro
del contexto de un método, no se puede usar fuera de una clase.
Usa el [Enlace estático
en tiempo de ejecución](#language.oop5.late-static-bindings).

### Parámetros

     function


       La función o método a ser llamado. Este parámetro puede ser una matriz,
       con el nombre de la clase y del método, o una cadena, con el nombre una
       función.






     parameter


       Cero o más parámetros a ser pasados a la función.





### Valores devueltos

Devuelve el resultado de la función, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de forward_static_call()**

&lt;?php

class A
{
const NOMBRE = 'A';
public static function prueba() {
$args = func_get_args();
echo static::NOMBRE, " ".join(',', $args)." \n";
}
}

class B extends A
{
const NOMBRE = 'B';

    public static function prueba() {
        echo self::NOMBRE, "\n";
        forward_static_call(array('A', 'prueba'), 'más', 'args');
        forward_static_call( 'prueba', 'otro', 'args');
    }

}

B::prueba('foo');

function prueba() {
$args = func_get_args();
echo "C ".join(',', $args)." \n";
}

?&gt;

    El ejemplo anterior mostrará:

B
B más,args
C otro,args

### Ver también

    - [forward_static_call_array()](#function.forward-static-call-array) - Llamar a un método estático y pasar los argumentos como matriz

    - [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

# forward_static_call_array

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

forward_static_call_array — Llamar a un método estático y pasar los argumentos como matriz

### Descripción

**forward_static_call_array**([callable](#language.types.callable) $function, [array](#language.types.array) $parameters): [mixed](#language.types.mixed)

Llama a una función o método definido por el usuario, dado por el parámetro
function. Esta función debe ser llamada dentro del contexto de un método, no
se puede usar fuera de una clase.
Usa el [Enlace estático
en tiempo de ejecución](#language.oop5.late-static-bindings).
Todos los argumentos del método a llamar se pasan como valores,
y como matriz, similar a [call_user_func_array()](#function.call-user-func-array).

### Parámetros

     function


       La función o método a ser llamado. Este parámetro puede ser un [array](#language.types.array),
       con el nombre de la clase y del método, o un [string](#language.types.string), con el nombre de una
       función.






     parameter


       Un parámetro, reuniendo todos los parámetros del método en una matriz.



      **Nota**:



        Observe que los parámetros para **forward_static_call_array()** no
        son pasados por referencia.






### Valores devueltos

Devuelve el resultado de la función, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de forward_static_call_array()**

&lt;?php

class A
{
const NOMBRE = 'A';
public static function prueba() {
$args = func_get_args();
echo static::NOMBRE, " ".join(',', $args)." \n";
}
}

class B extends A
{
const NOMBRE = 'B';

    public static function prueba() {
        echo self::NOMBRE, "\n";
        forward_static_call_array(array('A', 'prueba'), array('más', 'args'));
        forward_static_call_array( 'prueba', array('otro', 'args'));
    }

}

B::prueba('foo');

function prueba() {
$args = func_get_args();
echo "C ".join(',', $args)." \n";
}

?&gt;

    El ejemplo anterior mostrará:

B
B más,args
C otro,args

### Ver también

    - [forward_static_call()](#function.forward-static-call) - Llamar a un método estático

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

    - [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

# func_get_arg

(PHP 4, PHP 5, PHP 7, PHP 8)

func_get_arg — Devuelve un elemento de la lista de argumentos

### Descripción

**func_get_arg**([int](#language.types.integer) $position): [mixed](#language.types.mixed)

Recupera un elemento de la lista de argumentos de una función de usuario.

**func_get_arg()** puede ser utilizado
conjuntamente con [func_num_args()](#function.func-num-args) y
[func_get_args()](#function.func-get-args) para permitir que las funciones
de usuario acepten un número variable de argumentos.

### Parámetros

     position


       La posición del argumento. Los argumentos de la función son
       contados comenzando desde 0.





### Valores devueltos

Devuelve el argumento especificado, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Generará una advertencia si es llamada fuera de una función de usuario, o si
position es mayor que el número de argumentos pasados.

### Ejemplos

    **Ejemplo #1 Ejemplo con func_get_arg()**

&lt;?php
function foo()
{
$numargs = func_num_args();
     echo "Número de argumentos : $numargs\n";
     if ($numargs &gt;= 2) {
echo "El segundo argumento es : " . func_get_arg(1) . "\n";
}
}

foo(1, 2, 3);
?&gt;

    El ejemplo anterior mostrará:

Número de argumentos : 3
El segundo argumento es : 2

    **Ejemplo #2 Ejemplo func_get_arg()** con argumentos por referencia y por valor

&lt;?php
function byVal($arg) {
echo 'Tal como se pasó : ', var_export(func_get_arg(0)), PHP_EOL;
$arg = 'baz';
echo 'Después del cambio : ', var_export(func_get_arg(0)), PHP_EOL;
}

function byRef(&amp;$arg) {
echo 'Tal como se pasó : ', var_export(func_get_arg(0)), PHP_EOL;
$arg = 'baz';
echo 'Después del cambio : ', var_export(func_get_arg(0)), PHP_EOL;
}

$arg = 'bar';
byVal($arg);
byRef($arg);
?&gt;

    El ejemplo anterior mostrará:

Tal como se pasó : 'bar'
Después del cambio : 'baz'
Tal como se pasó : 'bar'
Después del cambio : 'baz'

### Notas

**Nota**:

A partir de PHP 8.0.0, la familia de funciones func\_\*() está diseñada para ser esencialmente
transparente con respecto a los argumentos nombrados, tratando los argumentos como si fueran todos pasados
de manera posicional, y los argumentos faltantes son reemplazados con sus valores por defecto.
Esta función ignora la colección de argumentos variádicos nombrados desconocidos.
Los argumentos nombrados que son recolectados solo son accesibles a través del parámetro variádico.

**Nota**:

Si los argumentos son pasados por referencia,
todas sus modificaciones serán reflejadas en los valores devueltos por esta función. A partir de PHP 7,
los valores actuales también serán devueltos si los argumentos son pasados por su valor.

**Nota**:

    Esta función devuelve únicamente una copia de los argumentos pasados, y no cuenta
    como argumentos por defecto (no pasados).

### Ver también

    - La sintaxis [...](#functions.variable-arg-list)

    - [func_get_args()](#function.func-get-args) - Devuelve los argumentos de una función en forma de array

    - [func_num_args()](#function.func-num-args) - Devuelve el número de argumentos pasados a la función

# func_get_args

(PHP 4, PHP 5, PHP 7, PHP 8)

func_get_args — Devuelve los argumentos de una función en forma de array

### Descripción

**func_get_args**(): [array](#language.types.array)

Recupera los argumentos de una función en forma de array.

[func_get_arg()](#function.func-get-arg) puede ser utilizado conjuntamente con
[func_num_args()](#function.func-num-args) y **func_get_args()**
para permitir que las funciones de usuario acepten un número variable de argumentos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array donde cada elemento es una copia del miembro correspondiente de la lista
de argumentos de la función.

### Errores/Excepciones

Generará una advertencia si es llamada fuera de una función.

### Ejemplos

    **Ejemplo #1 Ejemplo con func_get_args()**

&lt;?php
function foo()
{
$numargs = func_num_args();
    echo "Número de argumentos : $numargs \n";
    if ($numargs &gt;= 2) {
echo "El segundo argumento es : " . func_get_arg(1) . "\n";
}
$arg_list = func_get_args();
    for ($i = 0; $i &lt; $numargs; $i++) {
        echo "El argumento $i es : " . $arg_list[$i] . "\n";
}
}

foo(1, 2, 3);
?&gt;

    El ejemplo anterior mostrará:

Número de argumentos : 3
El segundo argumento es : 2
El argumento 0 es : 1
El argumento 1 es : 2
El argumento 2 es : 3

    **Ejemplo #2 Ejemplo func_get_args()** con argumentos por referencia y por valor

&lt;?php
function byVal($arg) {
echo 'Tal como se pasó : ', var_export(func_get_args()), PHP_EOL;
$arg = 'baz';
echo 'Después del cambio : ', var_export(func_get_args()), PHP_EOL;
}

function byRef(&amp;$arg) {
echo 'Tal como se pasó : ', var_export(func_get_args()), PHP_EOL;
$arg = 'baz';
echo 'Después del cambio : ', var_export(func_get_args()), PHP_EOL;
}

$arg = 'bar';
byVal($arg);
byRef($arg);
?&gt;

    El ejemplo anterior mostrará:

Tel que passé : array (
0 =&gt; 'bar',
)
Après changement : array (
0 =&gt; 'baz',
)
Tel que passé : array (
0 =&gt; 'bar',
)
Après changement : array (
0 =&gt; 'baz',
)

### Notas

**Nota**:

A partir de PHP 8.0.0, la familia de funciones func\_\*() está diseñada para ser esencialmente
transparente con respecto a los argumentos nombrados, tratando los argumentos como si fueran todos pasados
de manera posicional, y los argumentos faltantes son reemplazados con sus valores por defecto.
Esta función ignora la colección de argumentos variádicos nombrados desconocidos.
Los argumentos nombrados que son recolectados solo son accesibles a través del parámetro variádico.

**Nota**:

Si los argumentos son pasados por referencia,
todas sus modificaciones serán reflejadas en los valores devueltos por esta función. A partir de PHP 7,
los valores actuales también serán devueltos si los argumentos son pasados por su valor.

**Nota**:

    Esta función devuelve únicamente una copia de los argumentos pasados, y no cuenta
    ni trata los argumentos por defecto (no pasados).

### Ver también

    - La sintaxis [...](#functions.variable-arg-list)

    - [func_get_arg()](#function.func-get-arg) - Devuelve un elemento de la lista de argumentos

    - [func_num_args()](#function.func-num-args) - Devuelve el número de argumentos pasados a la función

    - [ReflectionFunctionAbstract::getParameters()](#reflectionfunctionabstract.getparameters) - Obtiene los parámetros

# func_num_args

(PHP 4, PHP 5, PHP 7, PHP 8)

func_num_args — Devuelve el número de argumentos pasados a la función

### Descripción

**func_num_args**(): [int](#language.types.integer)

Obtiene el número de argumentos pasados a la función.

[func_get_arg()](#function.func-get-arg) puede ser utilizado
conjuntamente con **func_num_args()** y
[func_get_args()](#function.func-get-args) para permitir que las funciones
de usuario acepten un número variable de argumentos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de argumentos pasados a la función de usuario actual.

### Errores/Excepciones

Genera una advertencia si es llamada fuera de una función de usuario.

### Ejemplos

    **Ejemplo #1 Ejemplo con func_num_args()**

&lt;?php

function foo()
{
echo "Número de argumentos: ", func_num_args(), PHP_EOL;
}

foo(1, 2, 3); // muestra ''
?&gt;

    El ejemplo anterior mostrará:

Número de argumentos: 3

### Notas

**Nota**:

A partir de PHP 8.0.0, la familia de funciones func\_\*() está diseñada para ser esencialmente
transparente con respecto a los argumentos nombrados, tratando los argumentos como si fueran todos pasados
de manera posicional, y los argumentos faltantes son reemplazados con sus valores por defecto.
Esta función ignora la colección de argumentos variádicos nombrados desconocidos.
Los argumentos nombrados que son recolectados solo son accesibles a través del parámetro variádico.

### Ver también

    - La sintaxis [...](#functions.variable-arg-list)

    - [func_get_arg()](#function.func-get-arg) - Devuelve un elemento de la lista de argumentos

    - [func_get_args()](#function.func-get-args) - Devuelve los argumentos de una función en forma de array

    - [ReflectionFunctionAbstract::getNumberOfParameters()](#reflectionfunctionabstract.getnumberofparameters) - Obtiene el número de argumentos

# function_exists

(PHP 4, PHP 5, PHP 7, PHP 8)

function_exists — Indica si una función está definida

### Descripción

**function_exists**([string](#language.types.string) $function): [bool](#language.types.boolean)

Verifica la lista de funciones definidas por el usuario así como las
internas a PHP para encontrar function.

### Parámetros

     function


       El nombre de la función, en forma de [string](#language.types.string).





### Valores devueltos

Devuelve **[true](#constant.true)** si la función function
existe y es una función, **[false](#constant.false)** en caso contrario.

**Nota**:

    Tenga en cuenta que **function_exists()** devolverá
    **[false](#constant.false)** para las sentencias como
    [include_once](#function.include-once) y
    [echo](#function.echo).

### Ejemplos

    **Ejemplo #1 Ejemplo con function_exists()**

&lt;?php
if (function_exists('imap_open')) {
echo "Las funciones IMAP están disponibles.&lt;br /&gt;\n";
} else {
echo "Las funciones IMAP no están disponibles.&lt;br /&gt;\n";
}
?&gt;

### Notas

**Nota**:

    Un nombre de función puede existir incluso si la función misma no es
    utilizable debido a una configuración o a una opción de compilación
    (como con las funciones [image](#ref.image) por ejemplo).

### Ver también

    - [method_exists()](#function.method-exists) - Verifica si el método existe en una clase

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

    - [get_defined_functions()](#function.get-defined-functions) - Lista todas las funciones definidas

    - [class_exists()](#function.class-exists) - Verifica si una clase ha sido definida

    - [extension_loaded()](#function.extension-loaded) - Determina si una extensión está cargada o no

# get_defined_functions

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

get_defined_functions — Lista todas las funciones definidas

### Descripción

**get_defined_functions**([bool](#language.types.boolean) $exclude_disabled = **[true](#constant.true)**): [array](#language.types.array)

Lista todas las funciones definidas.

### Parámetros

    exclude_disabled


      Si las funciones deshabilitadas deben ser excluidas del valor de retorno. Este parámetro no tiene efecto
      a partir de PHP 8.0.0.



     **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta característica
está altamente desaconsejado.

### Valores devueltos

Retorna un array multidimensional, que contiene la lista de todas las funciones definidas,
tanto las funciones internas de PHP como las definidas por el usuario. Los nombres
de las funciones internas son accesibles mediante $arr["internal"], y las
funciones de usuario son accesibles mediante $arr["user"].

### Historial de cambios

      Versión
      Descripción






      8.5.0

       El parámetro exclude_disabled ha sido marcado como obsoleto,
       ya que no tiene ningún efecto.




      8.0.0

       El valor por omisión del argumento exclude_disabled
       ha sido cambiado de **[false](#constant.false)** a **[true](#constant.true)**. Sin embargo, no tendrá
       ningún efecto ya que las funciones deshabilitadas se eliminan de la tabla de funciones
       en tiempo de compilación.




      7.0.15, 7.1.1

       El argumento exclude_disabled ha sido añadido.



### Ejemplos

    **Ejemplo #1 Ejemplo con get_defined_functions()**

&lt;?php
function myrow($id, $data)
{
    return "&lt;tr&gt;&lt;th&gt;$id&lt;/th&gt;&lt;td&gt;$data&lt;/td&gt;&lt;/tr&gt;\n";
}

$arr = get_defined_functions();

print_r($arr);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[internal] =&gt; Array
(
[0] =&gt; zend_version
[1] =&gt; func_num_args
[2] =&gt; func_get_arg
[3] =&gt; func_get_args
[4] =&gt; strlen
[5] =&gt; strcmp
[6] =&gt; strncmp
...
[750] =&gt; bcscale
[751] =&gt; bccomp
)

    [user] =&gt; Array
        (
            [0] =&gt; myrow
        )

)

### Ver también

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [get_defined_vars()](#function.get-defined-vars) - Lista todas las variables definidas

    - [get_defined_constants()](#function.get-defined-constants) - Devuelve la lista de constantes y sus valores

    - [get_declared_classes()](#function.get-declared-classes) - Lista todas las clases definidas en PHP

# register_shutdown_function

(PHP 4, PHP 5, PHP 7, PHP 8)

register_shutdown_function — Registra una función de retrollamada para ejecución al cierre

### Descripción

**register_shutdown_function**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) ...$args): [void](language.types.void.html)

Registra una función de retrollamada callback
para ejecución al cierre o cuando
[exit()](#function.exit) es llamado.

Varios llamados a **register_shutdown_function()** son
posibles en el mismo script, y las funciones serán llamadas en el
mismo orden en que son registradas. Si se llama
[exit()](#function.exit)
durante una de las funciones de cierre, el proceso será definitivamente
detenido, sin que las otras funciones sean llamadas.

Las funciones de cierre pueden también llamar a la función
**register_shutdown_function()** ellas mismas para añadir una
función de cierre al final de la cola.

### Parámetros

     callback


       La función de retrollamada a registrar.




       La función de retrollamada es ejecutada como parte de la
       petición, por lo tanto, es posible enviar algo a la salida
       desde esta última, así como acceder a los buffers de salida.






     args


       Es posible pasar argumentos a las funciones de cierre configurando estos argumentos adicionales.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con register_shutdown_function()**

&lt;?php
function shutdown()
{
// Aquí está nuestra función shutdown
// en la cual podemos realizar
// todas las últimas operaciones
// antes del fin del script.

    echo 'Script ejecutado con éxito', PHP_EOL;

}

register_shutdown_function('shutdown');
?&gt;

### Notas

**Nota**:

    El directorio de trabajo del script puede cambiar en la función de cierre
    bajo algunos servidores web, por ejemplo Apache.

**Nota**:

    Las funciones de cierre no serán ejecutadas si el proceso es terminado
    con un señal SIGTERM o SIGKILL. Aunque no se puede interceptar
    un SIGKILL, se puede usar la función [pcntl_signal()](#function.pcntl-signal)
    para instalar un manejador para un SIGTERM que utilice la función
    [exit()](#function.exit) para terminar correctamente.

**Nota**:

    Las funciones de cierre se ejecutan por separado del tiempo seguido por
    [max_execution_time](#ini.max-execution-time). Esto significa
    que incluso si un proceso es terminado por haber funcionado demasiado tiempo, las
    funciones de cierre serán siempre llamadas. Además, si el
    max_execution_time alcanza su límite mientras una función
    de cierre está en ejecución, no será interrumpida.

### Ver también

    - [auto_append_file](#ini.auto-append-file)

    - [exit()](#function.exit) - Terminar el script en curso con un código de estado o un mensaje

    - [fastcgi_finish_request()](#function.fastcgi-finish-request) - Descarga todos los datos de la respuesta al cliente

    - La sección sobre la [gestión de conexiones](#features.connection-handling)

# register_tick_function

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

register_tick_function — Registra una función ejecutada en cada tick

### Descripción

**register_tick_function**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) ...$args): [bool](#language.types.boolean)

**register_tick_function()** registra la
función callback para ser ejecutada
cada vez que ocurre un
[tick](#control-structures.declare.ticks).

### Parámetros

     callback


       La función a registrar.






     args







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con register_tick_function()**

&lt;?php
declare(ticks=1);

function my_tick_function($param) {
echo "Tick callback function called with param: $param\n";
}

register_tick_function('my_tick_function', true);
?&gt;

### Ver también

    - [declare](#control-structures.declare)

    - [unregister_tick_function()](#function.unregister-tick-function) - Anula la función ejecutada en cada tick

# unregister_tick_function

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

unregister_tick_function — Anula la función ejecutada en cada tick

### Descripción

**unregister_tick_function**([callable](#language.types.callable) $callback): [void](language.types.void.html)

Anula la ejecución automática de callback en cada
[tick](#control-structures.declare).

### Parámetros

     callback


       La función a anular.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [register_tick_function()](#function.register-tick-function) - Registra una función ejecutada en cada tick

## Tabla de contenidos

- [call_user_func](#function.call-user-func) — Llama a una función de retorno proporcionada por el primer argumento
- [call_user_func_array](#function.call-user-func-array) — Llama a una función de retorno con los argumentos agrupados en un array
- [create_function](#function.create-function) — Crea una función anónima
- [forward_static_call](#function.forward-static-call) — Llamar a un método estático
- [forward_static_call_array](#function.forward-static-call-array) — Llamar a un método estático y pasar los argumentos como matriz
- [func_get_arg](#function.func-get-arg) — Devuelve un elemento de la lista de argumentos
- [func_get_args](#function.func-get-args) — Devuelve los argumentos de una función en forma de array
- [func_num_args](#function.func-num-args) — Devuelve el número de argumentos pasados a la función
- [function_exists](#function.function-exists) — Indica si una función está definida
- [get_defined_functions](#function.get-defined-functions) — Lista todas las funciones definidas
- [register_shutdown_function](#function.register-shutdown-function) — Registra una función de retrollamada para ejecución al cierre
- [register_tick_function](#function.register-tick-function) — Registra una función ejecutada en cada tick
- [unregister_tick_function](#function.unregister-tick-function) — Anula la función ejecutada en cada tick

- [Introducción](#intro.funchand)
- [Funciones de Manejo de Funciones](#ref.funchand)<li>[call_user_func](#function.call-user-func) — Llama a una función de retorno proporcionada por el primer argumento
- [call_user_func_array](#function.call-user-func-array) — Llama a una función de retorno con los argumentos agrupados en un array
- [create_function](#function.create-function) — Crea una función anónima
- [forward_static_call](#function.forward-static-call) — Llamar a un método estático
- [forward_static_call_array](#function.forward-static-call-array) — Llamar a un método estático y pasar los argumentos como matriz
- [func_get_arg](#function.func-get-arg) — Devuelve un elemento de la lista de argumentos
- [func_get_args](#function.func-get-args) — Devuelve los argumentos de una función en forma de array
- [func_num_args](#function.func-num-args) — Devuelve el número de argumentos pasados a la función
- [function_exists](#function.function-exists) — Indica si una función está definida
- [get_defined_functions](#function.get-defined-functions) — Lista todas las funciones definidas
- [register_shutdown_function](#function.register-shutdown-function) — Registra una función de retrollamada para ejecución al cierre
- [register_tick_function](#function.register-tick-function) — Registra una función ejecutada en cada tick
- [unregister_tick_function](#function.unregister-tick-function) — Anula la función ejecutada en cada tick
  </li>
