# Gestión de variables

# Introducción

Para obtener más detalles sobre el comportamiento de las variables, consulte
la sección [Variables](#language.variables)
del capítulo [Referencia del lenguaje](#langref).

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#var.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de variables**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [unserialize_callback_func](#ini.unserialize-callback-func)
     **[null](#constant.null)**
     **[INI_ALL](#constant.ini-all)**
      



     [unserialize_max_depth](#ini.unserialize-max-depth)
     "4096"
     **[INI_ALL](#constant.ini-all)**
     Disponible desde PHP 7.4.0.

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     unserialize_callback_func
     [string](#language.types.string)



      La función indicada es llamada cuando [unserialize()](#function.unserialize)
      intenta utilizar una clase no definida. Aparece una advertencia si la
      función indicada no está definida o si la función no logra definir
      la clase faltante.




      Véase también [unserialize()](#function.unserialize) y [Autocarga de clases](#language.oop5.autoload).







     unserialize_max_depth
     [int](#language.types.integer)



      La profundidad máxima de estructuras permitida durante la deserialización
      cuando se utiliza [unserialize()](#function.unserialize), y está destinada a
      evitar desbordamientos de pila. Esto se puede desactivar estableciendo
      unserialize_max_depth=0.




      Véase también [unserialize()](#function.unserialize) y [Autocarga de clases](#language.oop5.autoload).


# Funciones de manejo de variables

# boolval

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

boolval — Obtiene el valor booleano de una variable

### Descripción

**boolval**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Devuelve el valor [bool](#language.types.boolean) de la variable proporcionada en el
argumento value.

### Parámetros

    value


      El valor escalar que será convertido a [bool](#language.types.boolean).


### Valores devueltos

El valor [bool](#language.types.boolean) del argumento value.

### Ejemplos

    **Ejemplo #1 Ejemplo con boolval()**

&lt;?php
echo '0: '.(boolval(0) ? 'true' : 'false')."\n";
echo '42: '.(boolval(42) ? 'true' : 'false')."\n";
echo '0.0: '.(boolval(0.0) ? 'true' : 'false')."\n";
echo '4.2: '.(boolval(4.2) ? 'true' : 'false')."\n";
echo '"": '.(boolval("") ? 'true' : 'false')."\n";
echo '"string": '.(boolval("string") ? 'true' : 'false')."\n";
echo '"0": '.(boolval("0") ? 'true' : 'false')."\n";
echo '"1": '.(boolval("1") ? 'true' : 'false')."\n";
echo '[1, 2]: '.(boolval([1, 2]) ? 'true' : 'false')."\n";
echo '[]: '.(boolval([]) ? 'true' : 'false')."\n";
echo 'stdClass: '.(boolval(new stdClass) ? 'true' : 'false')."\n";
?&gt;

    El ejemplo anterior mostrará:

0: false
42: true
0.0: false
4.2: true
"": false
"string": true
"0": false
"1": true
[1, 2]: true
[]: false
stdClass: true

### Ver también

    - [floatval()](#function.floatval) - Convierte una cadena en un número de punto flotante

    - [intval()](#function.intval) - Devuelve el valor entero equivalente de una variable

    - [strval()](#function.strval) - Obtiene el valor de una variable en formato string

    - [settype()](#function.settype) - Asigna un tipo a una variable

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - El [manipulación de tipos](#language.types.type-juggling)

# debug_zval_dump

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

debug_zval_dump — Extrae una representación en forma de string de la estructura interna de una zval para su visualización

### Descripción

**debug_zval_dump**([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

Extrae una representación en forma de string de una estructura interna de una zval (Zend value) para su visualización. Esto es generalmente útil para comprender o depurar los detalles de implementación del motor Zend o de extensiones PHP.

### Parámetros

     value


       La variable o valor a extraer.






     values


       Variables o valores adicionales a extraer.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con debug_zval_dump()**

&lt;?php
$var1 = 'Hello';
$var1 .= ' World';
$var2 = $var1;

debug_zval_dump($var1);
?&gt;

    El ejemplo anterior mostrará:

string(11) "Hello World" refcount(3)

**Nota**:
**Comprender el refcount**

    El valor refcount mostrado por esta función puede resultar sorprendente sin una comprensión detallada de la implementación del motor.




    El motor Zend utiliza el conteo de referencias por dos razones diferentes:







     -
      Optimizar el uso de memoria utilizando una técnica llamada "copy on write", donde múltiples variables que contienen el mismo valor apuntan a la misma copia en memoria. Cuando una de estas variables es modificada, apunta a una nueva copia en memoria, y el conteo de referencias del original se reduce en 1.


     -
      El seguimiento de variables que han sido asignadas o pasadas por referencia (ver [Referencias explicadas](#language.references)). Este refcount se almacena en una zval de referencia separada, apuntando a la zval para el valor actual. Esta zval adicional no se muestra actualmente por **debug_zval_dump()**.





    Como **debug_zval_dump()** toma su entrada como un parámetro normal, pasado por valor, la técnica de copy on write será utilizada para el paso: en lugar de copiar los datos, el refcount será incrementado en 1 durante la vida del llamado a la función. Si la función modifica el parámetro después de haberlo recibido, entonces se realizará una copia; como no lo hace, mostrará un refcount 1 más alto que en el ámbito de llamada.




    El paso de parámetros también impide que **debug_zval_dump()** muestre variables que han sido asignadas por referencia. Para ilustrar esto, considere una versión ligeramente modificada del ejemplo anterior:





&lt;?php
$var1 = 'Hello';
$var1 .= ' World';
// Apunta tres variables como referencia al mismo valor
$var2 =&amp; $var1;
$var3 =&amp; $var1;

debug_zval_dump($var1);
?&gt;

     El ejemplo anterior mostrará:




string(11) "Hello World" refcount(2)

    Aunque $var1, $var2 y $var3 están vinculadas como referencia, solo el *valor* es pasado a **debug_zval_dump()**. Este valor es utilizado una sola vez por el conjunto de referencias, y una vez dentro de **debug_zval_dump()**, por lo que muestra un refcount de 2.




    Complicaciones adicionales emergen debido a las optimizaciones realizadas por el motor para diferentes tipos de datos. Algunos tipos como los enteros no utilizan "copy on write", y por lo tanto no muestran ningún refcount. En otros casos, el refcount muestra otras copias utilizadas internamente, como cuando una cadena literal o un array es almacenado como parte de una instrucción de código.

### Ver también

    - [var_dump()](#function.var-dump) - Muestra información sobre una variable

    - [debug_backtrace()](#function.debug-backtrace) - Genera el contexto de depuración

    - [Explicaciones sobre referencias](#language.references)

    - [» Explicaciones sobre referencias (por Derick Rethans)](http://derickrethans.nl/php_references_article.php)

# doubleval

(PHP 4, PHP 5, PHP 7, PHP 8)

doubleval — Alias de [floatval()](#function.floatval)

### Descripción

Esta función es un alias de:
[floatval()](#function.floatval).

# empty

(PHP 4, PHP 5, PHP 7, PHP 8)

empty — Determina si una variable está vacía

### Descripción

**empty**([mixed](#language.types.mixed) $var): [bool](#language.types.boolean)

Determina si una variable es considerada vacía.
Una variable es considerada vacía si no existe,
o si su valor equivale a **[false](#constant.false)**. La función **empty()**
no genera ninguna alerta si la variable no existe.

### Parámetros

     var


       Variable a verificar.




       Ninguna alerta es generada si la variable no existe. Esto significa que
       **empty()** es estrictamente equivalente a
       **!isset($var) || $var == false**.
       Esto se aplica asimismo a las estructuras anidadas, tales como un array multidimensional o propiedades encadenadas.





### Valores devueltos

Retorna **[true](#constant.true)** si var no existe o tiene un
valor vacío o igual a cero, es decir, que es considerada "false", ver
[conversión en bool](#language.types.boolean.casting).
De lo contrario retorna **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1
     Una comparación simple empty()** / [isset()](#function.isset).

&lt;?php
$var = 0;

// Evaluada como verdadera ya que $var está vacía
if (empty($var)) {
echo '$var vale 0, está vacía, o no está definida en absoluto';
}

// Evaluada como verdadera ya que $var está definida
if (isset($var)) {
echo '$var está definida incluso si está vacía';
}
?&gt;

**Ejemplo #2 empty()** sobre posiciones en un string

&lt;?php
$expected_array_got_string = 'somestring';
var_dump(empty($expected_array_got_string['some_key']));
var_dump(empty($expected_array_got_string[0]));
var_dump(empty($expected_array_got_string['0']));
var_dump(empty($expected_array_got_string['0.5']));
var_dump(empty($expected_array_got_string['0 Mostel']));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)
bool(true)
bool(true)

**Ejemplo #3 empty()** sobre arrays multidimensionales

&lt;?php
$multidimensional = [
'some' =&gt; [
'deep' =&gt; [
'nested' =&gt; 'value'
]
]
];

if (!empty($multidimensional['some']['some']['nested'])) {
$someVariable = $multidimensional['some']['deep']['nested'];
}

var_dump(empty($multidimensional['some-undefined-key']));
var_dump(empty($multidimensional['some']['deep']['unknown']));
var_dump(empty($multidimensional['some']['deep']['nested']));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(true)
bool(false)

### Notas

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

**Nota**:

    Al utilizar esta función sobre propiedades de objeto
    inaccesibles, el método mágico
    [__isset()](#object.isset)
    será llamado, si existe.

### Ver también

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [__isset()](#object.isset)

    - [unset()](#function.unset) - unset destruye una variable

    - [array_key_exists()](#function.array-key-exists) - Verifica si una clave existe en un array

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

    - [Las tablas de comparación de tipos](#types.comparisons)

# floatval

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

floatval — Convierte una cadena en un número de punto flotante

### Descripción

**floatval**([mixed](#language.types.mixed) $value): [float](#language.types.float)

**floatval()** devuelve el valor de tipo [float](#language.types.float)
(número de punto flotante), extraído del
argumento value.

### Parámetros

     value


       Puede ser de cualquier tipo escalar.
       **floatval()** no debe ser
       utilizado en objetos; en caso de que así sea, se emitirá
       una alerta de nivel **[E_WARNING](#constant.e-warning)** y la función devolverá 1.





### Valores devueltos

El valor flotante de la variable dada.
Un array vacío devuelve 0, mientras que un array
no vacío devuelve 1.

Las cadenas de caracteres devolverán la mayoría de las veces 0, pero esto depende
del carácter más a la izquierda de la cadena. Las reglas clásicas
de [conversión de un
número de punto flotante](#language.types.float.casting) son aplicadas.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El nivel de error al convertir un objeto ha sido modificado de **[E_NOTICE](#constant.e-notice)**
       a **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con floatval()**

&lt;?php
$var = '122.34343The';
$float_value_of_var = floatval($var);
echo $float_value_of_var; // 122.34343
?&gt;

    **Ejemplo #2 Ejemplo con floatval()** con caracteres no numéricos a la izquierda

&lt;?php
$var = 'The122.34343';
$float_value_of_var = floatval($var);
echo $float_value_of_var; // 0
?&gt;

### Ver también

    - [boolval()](#function.boolval) - Obtiene el valor booleano de una variable

    - [intval()](#function.intval) - Devuelve el valor entero equivalente de una variable

    - [strval()](#function.strval) - Obtiene el valor de una variable en formato string

    - [settype()](#function.settype) - Asigna un tipo a una variable

    - [Manipulación de tipos](#language.types.type-juggling)

# get_debug_type

(PHP 8)

get_debug_type — Devuelve el nombre del tipo de la variable de una manera adecuada para el depurado

### Descripción

**get_debug_type**([mixed](#language.types.mixed) $value): [string](#language.types.string)

Devuelve el nombre resuelto de la variable PHP value.
Esta función resolverá los objetos a su nombre de clase, los recursos a su
nombre de tipo de recurso, y los valores escalares a su nombre común tal como se utilizaría en las declaraciones
de tipo.

Esta función difiere de [gettype()](#function.gettype) en que devuelve nombres de tipo
que son más coherentes con el uso real, en lugar de aquellos presentes por razones históricas.

### Parámetros

     value


       La variable cuyo tipo debe ser verificado.





### Valores devueltos

     Los tipos posibles de retorno [string](#language.types.string) son :







         Tipo + Estado
         Valor de retorno
         Notas






         null

          "null"

         -



         Booleans (**[true](#constant.true)** or **[false](#constant.false)**)

          "bool"

         -



         Números enteros

          "int"

         -



         Números de coma flotante

          "float"

         -



         String

          "string"

         -



         Arrays

          "array"

         -



         Recursos

          "resource (resourcename)"

         -



         Recursos (Cerrados)

          "resource (closed)"

         Ejemplo: Un flujo de archivo después de ser cerrado con [fclose()](#function.fclose).



         Objetos desde Clases Nombradas

          El nombre completo de la clase incluyendo el namespace por ejemplo Foo\Bar

         -



         Objetos desde Clases Anónimas

          "class@anonymous" o el nombre de la clase padre/el nombre de la interfaz si la clase extiende otra clase o
          implementa una interfaz, por ejemplo "Foo\Bar@anonymous"


          Las clases anónimas se crean mediante la sintaxis \$x = new class { ... }







### Ejemplos

    **Ejemplo #1 Ejemplo de get_debug_type()**

&lt;?php

namespace Foo;

echo get_debug_type(null), PHP_EOL;
echo get_debug_type(true), PHP_EOL;
echo get_debug_type(1), PHP_EOL;
echo get_debug_type(0.1), PHP_EOL;
echo get_debug_type("foo"), PHP_EOL;
echo get_debug_type([]), PHP_EOL;

$fp = fopen('/examples/book.xml', 'rb');
echo get_debug_type(\$fp), PHP_EOL;

fclose(\$fp);
echo get_debug_type(\$fp), PHP_EOL;

echo get_debug_type(new stdClass), PHP_EOL;
echo get_debug_type(new class {}), PHP_EOL;

interface A {}
interface B {}
class C {}

echo get_debug_type(new class implements A {}), PHP_EOL;
echo get_debug_type(new class implements A,B {}), PHP_EOL;
echo get_debug_type(new class extends C {}), PHP_EOL;
echo get_debug_type(new class extends C implements A {}), PHP_EOL;

?&gt;

    Resultado del ejemplo anterior es similar a:

null
bool
int
float
string
array
resource (stream)
resource (closed)
stdClass
class@anonymous
Foo\A@anonymous
Foo\A@anonymous
Foo\C@anonymous
Foo\C@anonymous

### Ver también

    - [gettype()](#function.gettype) - Devuelve el tipo de la variable

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

# get_defined_vars

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

get_defined_vars —
Lista todas las variables definidas

### Descripción

**get_defined_vars**(): [array](#language.types.array)

**get_defined_vars()** devuelve un array multidimensional
que contiene la lista de todas las variables definidas, ya sean
variables de entorno, de servidor o definidas por el usuario en
el ámbito de llamada de la función **get_defined_vars()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array multidimensional que contiene todas las variables.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_defined_vars()**

&lt;?php
$b = array(1, 1, 2, 3, 5, 8);

$arr = get_defined_vars();

// Muestra $b
print_r($arr["b"]);

/\* Muestra la ruta hacia el intérprete PHP (si se usa como CGI)

- p. ej. /usr/local/bin/php \*/
  echo $arr["_"];

// Muestra los argumentos de la línea de comandos si los hay
print_r($arr["argv"]);

// Muestra todas las variables de servidor
print_r($arr["_SERVER"]);

// Muestra todas las claves disponibles del array de variables
print_r(array_keys(get_defined_vars()));
?&gt;

### Ver también

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [get_defined_functions()](#function.get-defined-functions) - Lista todas las funciones definidas

    - [get_defined_constants()](#function.get-defined-constants) - Devuelve la lista de constantes y sus valores

# get_resource_id

(PHP 8)

get_resource_id —
Devuelve un entero que identifica un recurso

### Descripción

**get_resource_id**([resource](#language.types.resource) $resource): [int](#language.types.integer)

Esta función proporciona un método seguro para generar un entero que identifica un recurso.

### Parámetros

     resource


       El gestor del recurso a identificar.





### Valores devueltos

El [int](#language.types.integer) que identifica el resource pasado como argumento.

Esta función es una conversión de tipo de resource
a un [int](#language.types.integer) para facilitar la recuperación del ID de un recurso.

### Ejemplos

    **Ejemplo #1 get_resource_id()** produce el mismo resultado que una conversión a [int](#language.types.integer)

&lt;?php

$handle = fopen("php://stdout", "w");

echo (int) $handle . "\n";

echo get_resource_id($handle);

?&gt;

    Resultado del ejemplo anterior es similar a:

698
698

### Ver también

    - [get_resource_type()](#function.get-resource-type) - Devuelve el tipo de recurso

# get_resource_type

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

get_resource_type — Devuelve el tipo de recurso

### Descripción

**get_resource_type**([resource](#language.types.resource) $resource): [string](#language.types.string)

Esta función devuelve el tipo del recurso dado.

### Parámetros

     resource


       El gestor de recursos a evaluar.





### Valores devueltos

Si el argumento resource es un recurso, esta
función devolverá un string que representa su tipo.
Si el tipo no es identificado por esta función, el valor de retorno
será el string Unknown.

Esta función devolverá **[null](#constant.null)** y generará un error si
resource no es una [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con get_resource_type()**

&lt;?php

$fp = fopen("foo", "w");
echo get_resource_type($fp) . "\n";
?&gt;

    Resultado del ejemplo anterior en PHP 7:

stream

### Ver también

    - [get_resource_id()](#function.get-resource-id) - Devuelve un entero que identifica un recurso

# gettype

(PHP 4, PHP 5, PHP 7, PHP 8)

gettype — Devuelve el tipo de la variable

### Descripción

**gettype**([mixed](#language.types.mixed) $value): [string](#language.types.string)

Devuelve el tipo de la variable value.
Para verificar el tipo de la variable, se pueden
utilizar las funciones is\_\*.

### Parámetros

     value


       La variable a analizar.





### Valores devueltos

Las cadenas de caracteres que puede devolver la función
son las siguientes:

    -
     "boolean"


    -
     "integer"


    -
     "double" (por razones históricas,
     "double" es devuelto cuando un valor de tipo
     [float](#language.types.float) es proporcionado, y no "float")


    -
     "string"


    -
     "array"


    -
     "object"


    -
     "resource"


    -
     "resource (closed)" a partir de PHP 7.2.0


    -
     "NULL"


    -
     "unknown type"

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Los recursos cerrados son ahora reportados como 'resource (closed)'.
        Anteriormente, el valor devuelto para recursos cerrados era 'unknown type'.





### Ejemplos

    **Ejemplo #1 Ejemplo con gettype()**

&lt;?php

$data = array(1, 1., NULL, new stdClass, 'foo');

foreach ($data as $value) {
    echo gettype($value), "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

integer
double
NULL
object
string

### Ver también

    - [get_debug_type()](#function.get-debug-type) - Devuelve el nombre del tipo de la variable de una manera adecuada para el depurado

    - [settype()](#function.settype) - Asigna un tipo a una variable

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_null()](#function.is-null) - Indica si una variable es null

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_resource()](#function.is-resource) - Determina si una variable es un recurso

    - [is_scalar()](#function.is-scalar) - Indica si una variable es un escalar

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [method_exists()](#function.method-exists) - Verifica si el método existe en una clase

# intval

(PHP 4, PHP 5, PHP 7, PHP 8)

intval —
Devuelve el valor entero equivalente de una variable

### Descripción

**intval**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $base = 10): [int](#language.types.integer)

Devuelve el valor [int](#language.types.integer) de value utilizando
la base proporcionada para la conversión (por omisión
en base 10). **intval()** no debería ser utilizada
con objetos; en estos casos, se emitirá un error de nivel **[E_WARNING](#constant.e-warning)**
y la función devolverá 1.

### Parámetros

     value


       El valor escalar a ser convertido en entero






     base


       La base para la conversión



      **Nota**:



        Si base es 0, la base utilizada
        se determina por el formato del parámetro value:



         -

           si la cadena incluye un prefijo "0x" (o "0X"), la base tomada
           será 16 (hex); de lo contrario,



         -

           si la cadena comienza por "0b" (o "0B"), la base tomada
           será 2 (binario); de lo contrario,



         -

           si la cadena comienza por "0", la base tomada será 8 (octal);
           de lo contrario,



         -

           la base tomada será 10 (decimal).








### Valores devueltos

Un valor de tipo [int](#language.types.integer) de value en caso de
éxito o 0 en caso de fallo. Los arrays vacíos devuelven 0,
los arrays no vacíos devuelven 1.

El valor máximo depende del sistema. Los sistemas de 32 bits tienen un valor
entero signado máximo de -2147483648 a 2147483647. Por lo tanto, por ejemplo, en
un sistema similar, intval('1000000000000') devolverá 2147483647. El valor entero signado máximo para un sistema de 64 bits es 9223372036854775807.

Las cadenas de caracteres devuelven la mayoría de las veces 0, esto depende de los
caracteres en el extremo izquierdo de la cadena. La regla
común del
[moldeado de enteros](#language.types.integer.casting)
se aplica.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El nivel de error al convertir desde un objeto ha sido modificado de **[E_NOTICE](#constant.e-notice)**
       a **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplos con intval()**



     Los ejemplos siguientes están basados en un sistema de 64 bits.

&lt;?php
echo intval(42), PHP_EOL; // 42
echo intval(4.7), PHP_EOL; // 4
echo intval('42'), PHP_EOL; // 42
echo intval('+42'), PHP_EOL; // 42
echo intval('-42'), PHP_EOL; // -42
echo intval(042), PHP_EOL; // 34
echo intval('042'), PHP_EOL; // 42
echo intval(1e10), PHP_EOL; // 10000000000
echo intval('1e10'), PHP_EOL; // 10000000000
echo intval(0x1A), PHP_EOL; // 26
echo intval('0x1A'), PHP_EOL; // 0
echo intval('0x1A', 0), PHP_EOL; // 26
echo intval(42000000), PHP_EOL; // 42000000
echo intval(420000000000000000000), PHP_EOL; // -4275113695319687168
echo intval('420000000000000000000'), PHP_EOL; // 9223372036854775807
echo intval(42, 8), PHP_EOL; // 42
echo intval('42', 8), PHP_EOL; // 34
echo intval(array()), PHP_EOL; // 0
echo intval(array('foo', 'bar')), PHP_EOL; // 1
echo intval(false), PHP_EOL; // 0
echo intval(true), PHP_EOL; // 1
?&gt;

### Notas

**Nota**:

    El parámetro base no tiene ningún efecto a menos que el
    parámetro value sea una [string](#language.types.string).

### Ver también

    - [boolval()](#function.boolval) - Obtiene el valor booleano de una variable

    - [floatval()](#function.floatval) - Convierte una cadena en un número de punto flotante

    - [strval()](#function.strval) - Obtiene el valor de una variable en formato string

    - [settype()](#function.settype) - Asigna un tipo a una variable

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [Definición del tipo](#language.types.type-juggling)

    - [Números grandes BCMath](#ref.bc)

# is_array

(PHP 4, PHP 5, PHP 7, PHP 8)

is_array — Determina si una variable es un array

### Descripción

**is_array**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

**is_array()** determina si la variable dada es un array.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Devuelve **[true](#constant.true)** si value es un [array](#language.types.array),
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_array()**

&lt;?php
$yes = array('esto', 'es', 'un array');

echo is_array($yes) ? 'Array' : 'no es un array';
echo "\n";

$no = 'esto es un string';

echo is_array($no) ? 'Array' : 'no es un array';
?&gt;

    El ejemplo anterior mostrará:

Array
no es un array

### Ver también

    - [array_is_list()](#function.array-is-list) - Verifica si un array dado es una lista

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

# is_bool

(PHP 4, PHP 5, PHP 7, PHP 8)

is_bool —
Determina si una variable es un bool

### Descripción

**is_bool**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

**is_bool()** determina si la variable dada es un bool.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un [bool](#language.types.boolean),
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_bool()**

&lt;?php
$a = false;
$b = 0;

// Si $a es un bool, is_bool retornará true
if (is_bool($a) === true) {
echo "Sí, es un bool.\n";
}

// Si $b no es un bool, is_bool retornará false
if (is_bool($b) === false) {
echo "No, no es un bool.\n";
}
?&gt;

### Ver también

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

# is_callable

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

is_callable —
Determina si un valor puede ser llamado como una función
en el ámbito actual

### Descripción

**is_callable**([mixed](#language.types.mixed) $value, [bool](#language.types.boolean) $syntax_only = **[false](#constant.false)**, [string](#language.types.string) &amp;$callable_name = **[null](#constant.null)**): [bool](#language.types.boolean)

Verifica que value es un [callable](#language.types.callable),
o que puede ser llamado utilizando la función
[call_user_func()](#function.call-user-func).

### Parámetros

     value


       El valor a verificar.






     syntax_only


       Si el argumento syntax_only vale **[true](#constant.true)**, la
       función solo verificará si value puede ser
       una función o un método. Rechazará todos los valores
       que no sean objetos [invocables](#object.invoke),
       [Closure](#class.closure), [string](#language.types.string)s, o [array](#language.types.array)s que no tengan
       una estructura válida para ser utilizados como un callback. Un array invocable válido
       contiene 2 entradas: la primera debe ser un objeto
       o un string, y la segunda un string.






     callable_name


       Recibe el "nombre de la función invocable", por ejemplo
       "SomeClass::someMethod". Tenga en cuenta, sin embargo, que,
       a pesar de la implicación de que SomeClass::someMethod()
       es un método estático invocable, no es el caso.





### Valores devueltos

Retorna **[true](#constant.true)** si value puede ser llamado como
una función, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Verificación si un string puede ser llamado como una función**

&lt;?php

function someFunction() {}

$functionVariable = 'someFunction';

var_dump(is_callable($functionVariable, false, $callable_name));

var_dump($callable_name);

?&gt;

    El ejemplo anterior mostrará:

bool(true)
string(12) "someFunction"

    **Ejemplo #2 Verificación si un array puede ser llamado como una función**

&lt;?php

class someClass
{
public function someMethod() {}
}

$anObject = new SomeClass();

$methodVariable = [$anObject, 'someMethod'];

var_dump(is_callable($methodVariable, true, $callable_name));

var_dump($callable_name);

?&gt;

    El ejemplo anterior mostrará:

bool(true)
string(21) "SomeClass::someMethod"

    **Ejemplo #3 is_callable()** y los constructores



     A pesar de que los constructores son los métodos que se llaman cuando un objeto es creado,
     no son métodos estáticos y
     **is_callable()** retornará **[false](#constant.false)** para ellos. No es
     posible utilizar **is_callable()** para verificar si una clase puede
     ser instanciada desde el ámbito actual.

&lt;?php

class Foo
{
public function \_\_construct() {}

    public function foo() {}

}

var_dump(
is_callable(['Foo', '__construct']),
is_callable(['Foo', 'foo'])
);

$foo = new Foo();
var_dump(is_callable([$foo, '\_\_construct']));

?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(false)
bool(true)

### Notas

- Un objeto es siempre invocable si implementa
  [\_\_invoke()](#object.invoke), y que el método es visible
  en el ámbito actual.

- Un nombre de clase es invocable si implementa
  [\_\_callStatic()](#object.callstatic)

- Si un objeto implementa [\_\_call()](#object.call), entonces esta función
  retornará **[true](#constant.true)** para cualquier método en ese objeto, incluso si
  el método no está definido.

- Esta función puede desencadenar el autoload si es llamada con el nombre
  de una clase.

### Ver también

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [method_exists()](#function.method-exists) - Verifica si el método existe en una clase

# is_countable

(PHP 7 &gt;= 7.3.0, PHP 8)

is_countable —
Verifica si el contenido de la variable es un valor contable

### Descripción

**is_countable**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Verifica si el contenido de la variable es un array [array](#language.types.array)
o un objeto que implementa [Countable](#class.countable)

### Parámetros

     value


       La variable a verificar





### Valores devueltos

Retorna **[true](#constant.true)** si value es contable, **[false](#constant.false)**
en caso contrario.

### Historial de cambios

      Versión
      Descripción






      7.3.0

       **is_countable()** fue añadido.



### Ejemplos

    **Ejemplo #1 Ejemplos con is_countable()**

&lt;?php
var_dump(is_countable([1, 2, 3])); // bool(true)
var_dump(is_countable(new ArrayIterator(['foo', 'bar', 'baz']))); // bool(true)
var_dump(is_countable(new ArrayIterator())); // bool(true)
var_dump(is_countable(new stdClass())); // bool(false)
?&gt;

### Ver también

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_iterable()](#function.is-iterable) - Determina si el contenido de la variable es iterable.

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

# is_double

(PHP 4, PHP 5, PHP 7, PHP 8)

is_double — Alias de [is_float()](#function.is-float)

### Descripción

Esta función es un alias de:
[is_float()](#function.is-float).

# is_float

(PHP 4, PHP 5, PHP 7, PHP 8)

is_float — Determina si una variable es de tipo float

### Descripción

**is_float**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si la variable dada es de tipo float.

**Nota**:

    Para comprobar si una variable es un número o una cadena numérica
    (como las entradas de formulario, que siempre son strings), se debe
    utilizar la función [is_numeric()](#function.is-numeric).

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un [float](#language.types.float),
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_float()**

&lt;?php

var_dump(is_float(27.25));
var_dump(is_float('abc'));
var_dump(is_float(23));
var_dump(is_float(23.5));
var_dump(is_float(1e7)); //Notación científica
var_dump(is_float(true));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)
bool(true)
bool(true)
bool(false)

### Ver también

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

# is_int

(PHP 4, PHP 5, PHP 7, PHP 8)

is_int — Determina si una variable es de tipo integer

### Descripción

**is_int**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si la variable dada es de tipo integer.

**Nota**:

    Para comprobar si una variable es un número o una cadena numérica
    (como las entradas de formulario, que siempre son strings),
    se debe utilizar la función [is_numeric()](#function.is-numeric).

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un [int](#language.types.integer),
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_int()**

&lt;?php
$values = array(23, "23", 23.5, "23.5", null, true, false);
foreach ($values as $value) {
    echo "is_int(";
    var_export($value);
echo ") = ";
var_dump(is_int($value));
}
?&gt;

    El ejemplo anterior mostrará:

is_int(23) = bool(true)
is_int('23') = bool(false)
is_int(23.5) = bool(false)
is_int('23.5') = bool(false)
is_int(NULL) = bool(false)
is_int(true) = bool(false)
is_int(false) = bool(false)

### Ver también

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

# is_integer

(PHP 4, PHP 5, PHP 7, PHP 8)

is_integer — Alias de [is_int()](#function.is-int)

### Descripción

Esta función es un alias de:
[is_int()](#function.is-int).

# is_iterable

(PHP 7 &gt;= 7.1.0, PHP 8)

is_iterable —
Determina si el contenido de la variable es iterable.

### Descripción

**is_iterable**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Verifica que el contenido de la variable es aceptado por el pseudo-tipo
[iterable](#language.types.iterable), es decir, que se trata de un [array](#language.types.array) o
un objeto que implementa la interfaz [Traversable](#class.traversable).

### Parámetros

     value


       El valor a verificar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es iterable, **[false](#constant.false)**
en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplos con is_iterable()**

&lt;?php

var_dump(is_iterable([1, 2, 3])); // bool(true)
var_dump(is_iterable(new ArrayIterator([1, 2, 3]))); // bool(true)
var_dump(is_iterable((function () { yield 1; })())); // bool(true)
var_dump(is_iterable(1)); // bool(false)
var_dump(is_iterable(new stdClass())); // bool(false)

?&gt;

### Ver también

    - [is_array()](#function.is-array) - Determina si una variable es un array

# is_long

(PHP 4, PHP 5, PHP 7, PHP 8)

is_long — Alias de [is_int()](#function.is-int)

### Descripción

Esta función es un alias de:
[is_int()](#function.is-int).

# is_null

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

is_null — Indica si una variable es **[null](#constant.null)**

### Descripción

**is_null**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Indica si la variable dada es **[null](#constant.null)**.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Devuelve **[true](#constant.true)** si value es **[null](#constant.null)**, **[false](#constant.false)**
en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_null()**

&lt;?php

error_reporting(E_ALL);

$foo = NULL;
var_dump(is_null($inexistent), is_null($foo));

?&gt;

### Ver también

    - El tipo [**<a href="#constant.null">null](#language.types.null.syntax)**</a>

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

# is_numeric

(PHP 4, PHP 5, PHP 7, PHP 8)

is_numeric —
Determina si una variable es un número o una cadena numérica

### Descripción

**is_numeric**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si la variable dada es un número o una
[cadena numérica](#language.types.numeric-strings).

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un número o una
[cadena numérica](#language.types.numeric-strings),
**[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Las cadenas numéricas que terminan con caracteres de espaciado en blanco
       ("42 ") retornarán ahora **[true](#constant.true)**.
       Anteriormente, se retornaba **[false](#constant.false)** en su lugar.



### Ejemplos

    **Ejemplo #1 Ejemplo con is_numeric()**

&lt;?php
$tests = array(
"42",
1337,
0x539,
02471,
0b10100111001,
1337e0,
"0x539",
"02471",
"0b10100111001",
"1337e0",
"not numeric",
array(),
9.1,
null,
'',
);

foreach ($tests as $element) {
    if (is_numeric($element)) {
echo var_export($element, true) . " es numérico", PHP_EOL;
    } else {
        echo var_export($element, true) . " NO es numérico", PHP_EOL;
}
}
?&gt;

    El ejemplo anterior mostrará:

'42' es numérico
1337 es numérico
1337 es numérico
1337 es numérico
1337 es numérico
1337.0 es numérico
'0x539' NO es numérico
'02471' es numérico
'0b10100111001' NO es numérico
'1337e0' es numérico
'not numeric' NO es numérico
array (
) NO es numérico
9.1 es numérico
NULL NO es numérico
'' NO es numérico

    **Ejemplo #2 is_numeric()** con caracteres de espaciado en blanco

&lt;?php
$tests = [
" 42",
"42 ",
"\u{A0}9001", // non-breaking space
"9001\u{A0}", // non-breaking space
];

foreach ($tests as $element) {
    if (is_numeric($element)) {
echo var_export($element, true) . " is numeric", PHP_EOL;
    } else {
        echo var_export($element, true) . " is NOT numeric", PHP_EOL;
}
}
?&gt;

    Resultado del ejemplo anterior en PHP 8:

' 42' is numeric
'42 ' is numeric
' 9001' is NOT numeric
'9001 ' is NOT numeric

    Resultado del ejemplo anterior en PHP 7:

' 42' is numeric
'42 ' is NOT numeric
' 9001' is NOT numeric
'9001 ' is NOT numeric

### Ver también

    - [Las cadenas numéricas](#language.types.numeric-strings)

    - [ctype_digit()](#function.ctype-digit) - Chequear posibles caracteres numéricos

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_null()](#function.is-null) - Indica si una variable es null

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [filter_var()](#function.filter-var) - Filtra una variable con el filtro que se indique

# is_object

(PHP 4, PHP 5, PHP 7, PHP 8)

is_object — Determina si una variable es de tipo objeto

### Descripción

**is_object**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si la variable dada es de tipo objeto.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un [object](#language.types.object),
**[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        **is_object()** retorna ahora **[true](#constant.true)** para un objeto
        deserializado sin una definición de clase
        (clase de [__PHP_Incomplete_Class](#class.php-incomplete-class)).
        Anteriormente se retornaba **[false](#constant.false)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con is_object()**

&lt;?php
// Declara una función simple para retornar un array
// de nuestro objeto
function get_students($obj)
{
    if (!is_object($obj)) {
return false;
}

    return $obj-&gt;students;

}

// Declara una nueva instancia y
// la rellena
$obj = new stdClass();
$obj-&gt;students = array('Kalle', 'Ross', 'Felipe');

var_dump(get_students(null));
var_dump(get_students($obj));;
?&gt;

### Ver también

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_array()](#function.is-array) - Determina si una variable es un array

# is_real

(PHP 4, PHP 5, PHP 7, PHP 8)

is_real — Alias de [is_float()](#function.is-float)

### Descripción

Esta función es un alias de:
[is_float()](#function.is-float).

**Advertencia**Este alias está
_OBSOLETO_ en PHP 7.4.0, y _ELIMINADO_ a partir de PHP 8.0.0.

# is_resource

(PHP 4, PHP 5, PHP 7, PHP 8)

is_resource —
Determina si una variable es un recurso

### Descripción

**is_resource**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si una variable es un [resource](#language.types.resource).

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Retorna **[true](#constant.true)** si value es un [resource](#language.types.resource), **[false](#constant.false)**
de lo contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_resource()**

&lt;?php

$handle = fopen("php://stdout", "w");
if (is_resource($handle)) {
echo '$handle es un recurso';
}
?&gt;

    El ejemplo anterior mostrará:

$handle es un recurso

### Notas

**Nota**:

    La función **is_resource()** no es un método de
    verificación estricta de tipo: retornará **[false](#constant.false)** si el argumento
    value es un recurso que ha sido cerrado.

### Ver también

    - [La
    documentación sobre los recursos](#language.types.resource)

    - [get_resource_type()](#function.get-resource-type) - Devuelve el tipo de recurso

# is_scalar

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

is_scalar —
Indica si una variable es un escalar

### Descripción

**is_scalar**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Indica si una [expresión](#language.expressions) es
evaluada como un valor escalar.

Consulte [tipos escalares](#language.types.type-system.atomic.scalar) para más información.

**Nota**:

    **is_scalar()** no considera los valores de tipo [resource](#language.types.resource)
    como escalares, dado que los recursos son tipos abstractos,
    basados en enteros. Esto es susceptible de cambiar.

**Nota**:

    La función **is_scalar()** no considera
    el valor NULL como un escalar.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Devuelve **[true](#constant.true)** si value es un escalar, **[false](#constant.false)**
en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_scalar()**

&lt;?php
function show_var($var)
{
    if (is_scalar($var)) {
echo $var, PHP_EOL;
    } else {
        var_dump($var);
}
}

$pi = 3.1416;
$proteines = array("hemoglobina", "citocromo c oxidasa", "ferredoxina");

show_var($pi);

show_var($proteines)
?&gt;

    El ejemplo anterior mostrará:

3.1416
array(3) {
[0]=&gt;
string(11) "hemoglobina"
[1]=&gt;
string(20) "citocromo c oxidasa"
[2]=&gt;
string(11) "ferredoxina"
}

### Ver también

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_real()](#function.is-real) - Alias de is_float

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

# is_string

(PHP 4, PHP 5, PHP 7, PHP 8)

is_string — Determina si una variable es de tipo string

### Descripción

**is_string**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Determina si la variable dada es de tipo string.

### Parámetros

     value


       La variable a evaluar.





### Valores devueltos

Devuelve **[true](#constant.true)** si value es un [string](#language.types.string),
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_string()**

&lt;?php
$values = array(false, true, null, 'abc', '23', 23, '23.5', 23.5, '', ' ', '0', 0);
foreach ($values as $value) {
    echo "is_string(";
    var_export($value);
echo ") = ";
echo var_dump(is_string($value));
}
?&gt;

    El ejemplo anterior mostrará:

is_string(false) = bool(false)
is_string(true) = bool(false)
is_string(NULL) = bool(false)
is_string('abc') = bool(true)
is_string('23') = bool(true)
is_string(23) = bool(false)
is_string('23.5') = bool(true)
is_string(23.5) = bool(false)
is_string('') = bool(true)
is_string(' ') = bool(true)
is_string('0') = bool(true)
is_string(0) = bool(false)

### Ver también

    - [is_float()](#function.is-float) - Determina si una variable es de tipo float

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_bool()](#function.is-bool) - Determina si una variable es un bool

    - [is_object()](#function.is-object) - Determina si una variable es de tipo objeto

    - [is_array()](#function.is-array) - Determina si una variable es un array

# isset

(PHP 4, PHP 5, PHP 7, PHP 8)

isset — Determina si una variable está declarada y es diferente de **[null](#constant.null)**

### Descripción

**isset**([mixed](#language.types.mixed) $var, [mixed](#language.types.mixed) ...$vars): [bool](#language.types.boolean)

Determina si una variable es considerada definida,
lo que significa que está declarada y es diferente de **[null](#constant.null)**.

Si una variable ha sido destruida con la función
[unset()](#function.unset), ya no se considera como definida.

**isset()** devolverá **[false](#constant.false)** al verificar
una variable con valor **[null](#constant.null)**.
Asimismo, cabe señalar que el carácter nulo ("\0") no
es equivalente a la constante PHP **[null](#constant.null)**.

Si se proporcionan varios argumentos, entonces **isset()**
devolverá **[true](#constant.true)** solo si todos los argumentos están definidos.
La evaluación se realiza de izquierda a derecha y se detiene en cuanto
se encuentra una variable no definida.

### Parámetros

     var


       La variable a analizar.






     vars


       Variables adicionales.





### Valores devueltos

Devuelve **[true](#constant.true)** si var existe y tiene un valor
distinto de **[null](#constant.null)**. **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con isset()**

&lt;?php

$var = '';

// Esto es verdadero, por lo que el texto se muestra
if (isset($var)) {
echo 'Esta variable existe, por lo que puede ser mostrada.', PHP_EOL;
}

// En los siguientes ejemplos, utilizamos var_dump() para mostrar
// el retorno de la función isset().

$a = 'test';
$b = 'anothertest';

var_dump(isset($a));      // TRUE
var_dump(isset($a, $b)); // TRUE

unset($a);

var_dump(isset($a));     // FALSE
var_dump(isset($a, $b)); // FALSE

$foo = NULL;
var_dump(isset($foo)); // FALSE

?&gt;

     También funciona con arrays:



    **Ejemplo #2 Ejemplo de isset()** con elementos de array

&lt;?php

$a = array('test' =&gt; 1, 'bonjour' =&gt; NULL, 'pie' =&gt; array('a' =&gt; 'apple'));

var_dump(isset($a['test']));            // TRUE
var_dump(isset($a['foo'])); // FALSE
var_dump(isset($a['bonjour'])); // FALSE

// La clave 'bonjour' vale NULL y es considerada como no existente
// Si se desea verificar la existencia de esta clave, utilice esta función
var_dump(array_key_exists('bonjour', $a)); // TRUE

// Verificación de valores en profundidad
var_dump(isset($a['pie']['a']));        // TRUE
var_dump(isset($a['pie']['b'])); // FALSE
var_dump(isset($a['cake']['a']['b'])); // FALSE
?&gt;

**Ejemplo #3 isset()** sobre posiciones en un string

&lt;?php
$expected_array_got_string = 'somestring';
var_dump(isset($expected_array_got_string['some_key']));
var_dump(isset($expected_array_got_string[0]));
var_dump(isset($expected_array_got_string['0']));
var_dump(isset($expected_array_got_string[0.5]));
var_dump(isset($expected_array_got_string['0.5']));
var_dump(isset($expected_array_got_string['0 Mostel']));
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)

### Notas

**Advertencia**

    **isset()** funciona únicamente con variables, ya que el uso
    de cualquier otra cosa resultará en un error de análisis.
    Para verificar si una [constante](#language.constants) está definida,
    utilice la función [defined()](#function.defined).

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

**Nota**:

    Al utilizar esta función sobre propiedades de objeto
    inaccesibles, se llamará al método mágico
    [__isset()](#object.isset)
    si existe.

### Ver también

    - [empty()](#function.empty) - Determina si una variable está vacía

    - [__isset()](#object.isset)

    - [unset()](#function.unset) - unset destruye una variable

    - [defined()](#function.defined) - Verifica si una constante con el nombre dado existe

    - [la tabla de comparación de tipos](#types.comparisons)

    - [array_key_exists()](#function.array-key-exists) - Verifica si una clave existe en un array

    - [is_null()](#function.is-null) - Indica si una variable es null

    - el operador de control de informe de errores [@](#language.operators.errorcontrol)

# print_r

(PHP 4, PHP 5, PHP 7, PHP 8)

print_r — Muestra información legible para una variable

### Descripción

**print_r**([mixed](#language.types.mixed) $value, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)|[true](#language.types.singleton)

**print_r()** muestra información sobre una
variable, de manera que sea legible.

**print_r()**, [var_dump()](#function.var-dump) y
[var_export()](#function.var-export) muestran
asimismo las propiedades protegidas y privadas de un objeto.
Los miembros de clases estáticas no serán mostrados.

### Parámetros

     value


       La expresión a mostrar.






     return


       Si se desea obtener el resultado de **print_r()** en una cadena,
       se debe utilizar el parámetro return. Cuando este parámetro vale
       **[true](#constant.true)**, **print_r()** retornará la información en lugar de mostrarla.





### Valores devueltos

Si se proporciona una [string](#language.types.string), un [int](#language.types.integer) o un [float](#language.types.float), se mostrará su valor. Si se proporciona
un [array](#language.types.array), los valores se mostrarán en un formato que permite ver las claves y los elementos. Un formato
similar se utilizará asimismo para los objetos.

Cuando el parámetro return vale **[true](#constant.true)**, esta función
retornará una [string](#language.types.string). De lo contrario, el valor de retorno será **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        El tipo de retorno ha cambiado de [string](#language.types.string)|[bool](#language.types.boolean) a [string](#language.types.string)|[true](#language.types.singleton).





### Ejemplos

    **Ejemplo #1 Ejemplo con print_r()**

&lt;pre&gt;
&lt;?php
$a = array ('a' =&gt; 'apple', 'b' =&gt; 'banana', 'c' =&gt; array ('x', 'y', 'z'));
print_r($a);
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

&lt;pre&gt;
Array
(
[a] =&gt; apple
[b] =&gt; banana
[c] =&gt; Array
(
[0] =&gt; x
[1] =&gt; y
[2] =&gt; z
)
)
&lt;/pre&gt;

    **Ejemplo #2 Ejemplo con el parámetro return**

&lt;?php
$b = array ('m' =&gt; 'monkey', 'foo' =&gt; 'bar', 'x' =&gt; array ('x', 'y', 'z'));
$results = print_r($b, true); // $results contiene la salida de print_r

print_r($results);
?&gt;

### Notas

**Nota**:

Cuando el parámetro return es utilizado, esta función
utilizaba el buffer interno de salida anterior a PHP 7.1.0, y por lo tanto no puede ser
utilizado en la función de devolución de llamada de [ob_start()](#function.ob-start).

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [var_dump()](#function.var-dump) - Muestra información sobre una variable

    - [var_export()](#function.var-export) - Devuelve el código PHP utilizado para generar una variable

# serialize

(PHP 4, PHP 5, PHP 7, PHP 8)

serialize — Genera una representación almacenable de un valor

### Descripción

    **serialize**([mixed](#language.types.mixed) $value): [string](#language.types.string)

Devuelve un array en forma de string.

Es una técnica útil para almacenar o pasar valores PHP entre scripts sin perder su estructura ni su tipo.

Para recuperar una variable serializada y obtener un valor PHP, se debe utilizar [unserialize()](#function.unserialize).

### Parámetros

     value


       El valor a serializar. **serialize()** acepta todos los tipos excepto los recursos [resource](#language.types.resource) y ciertos [object](#language.types.object)s (ver nota a continuación). Asimismo, es posible serializar un array que contenga referencias a sí mismo. Las referencias cíclicas en arrays/objetos también serán almacenadas. Todas las demás referencias se perderán.




       Al serializar un objeto, PHP intentará llamar a las funciones miembro [__serialize()](#object.serialize) o [__sleep()](#object.sleep) antes de serializar. Esto permite al objeto realizar una última limpieza, etc. antes de ser serializado. De manera similar, cuando el objeto es restaurado utilizando [unserialize()](#function.unserialize), se llama a la función miembro [__unserialize()](#object.unserialize) o [__wakeup()](#object.wakeup).



      **Nota**:



        Los atributos privados de un objeto tendrán el nombre de la clase prefijado al nombre del atributo; los atributos protegidos serán prefijados con un asterisco '*'. Estos valores prefijados tienen caracteres nulos a ambos lados.






### Valores devueltos

Devuelve un string que contiene una representación en forma de flujo de bytes que puede ser almacenada en cualquier lugar.

Cabe señalar que se trata de una cadena binaria que puede incluir bytes nulos, y por lo tanto debe ser almacenada y gestionada como tal. Por ejemplo, la salida de **serialize()** generalmente debe ser almacenada en un campo de tipo BLOB de una base de datos, en lugar de en un campo de tipo CHAR o TEXT.

### Ejemplos

    **Ejemplo #1 Ejemplo con serialize()**

&lt;?php
// $session_data contiene un array multidimensional, con la información de sesión del usuario actual. Se utiliza serialize() para almacenarlos en una base de datos

$conn = odbc_connect("webdb", "php", "chicken");
$stmt = odbc_prepare($conn,
      "UPDATE sessions SET data = ? WHERE id = ?");
$sqldata = array (serialize($session_data), $_SERVER['PHP_AUTH_USER']);
if (!odbc_execute($stmt, $sqldata)) {
    $stmt = odbc_prepare($conn,
"INSERT INTO sessions (id, data) VALUES(?, ?)");
if (!odbc_execute($stmt, array_reverse($sqldata))) {
/_ ¡Ha ocurrido un problema! _/
}
}
?&gt;

### Notas

**Nota**:

    Cabe señalar que muchos objetos internos de PHP no pueden ser serializados. Sin embargo, aquellos que pueden implementan ya sea la interfaz [Serializable](#class.serializable) o los métodos mágicos [__serialize()](#object.serialize)/[__unserialize()](#object.unserialize) o [__sleep()](#object.sleep)/[__wakeup()](#object.wakeup). Si una clase interna no cumple ninguna de estas condiciones, no puede ser serializada de manera confiable.




    Existen excepciones históricas a esta regla, donde los objetos internos pueden ser serializados aunque no implementen la interfaz o expongan los métodos mágicos previstos para este efecto.

**Advertencia**

    Cuando la función **serialize()** serializa objetos, la barra invertida final no está incluida en el espacio de nombres del nombre de la clase, y esto es para una máxima compatibilidad.

### Ver también

    - [unserialize()](#function.unserialize) - Crea una variable PHP a partir de un valor serializado

    - [var_export()](#function.var-export) - Devuelve el código PHP utilizado para generar una variable

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [Serializing Objects](#language.oop5.serialization)

    - [__sleep()](#object.sleep)

    - [__wakeup()](#object.wakeup)

    - [__serialize()](#object.serialize)

    - [__unserialize()](#object.unserialize)

# settype

(PHP 4, PHP 5, PHP 7, PHP 8)

settype — Asigna un tipo a una variable

### Descripción

**settype**([mixed](#language.types.mixed) &amp;$var, [string](#language.types.string) $type): [bool](#language.types.boolean)

Fuerza el tipo de la variable var a
type.

### Parámetros

     var


       La variable a convertir.






     type


       Los valores posibles para el argumento
       type son:



        -

          "boolean" o "bool"



        -

          "integer" o "int"



        -

          "float" o "double"



        -

          "string"



        -

          "array"



        -

          "object"



        -

          "**[null](#constant.null)**"







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con settype()**

&lt;?php
$foo = "5bar"; // string
$bar = true; // bool

settype($foo, "integer"); // $foo vale ahora 5   (integer)
settype($bar, "string"); // $bar vale ahora "1" (string)

var_dump($foo, $bar);
?&gt;

### Notas

**Nota**:

    El valor máximo de los enteros es el valor
    contenido en la variable **[PHP_INT_MAX](#constant.php-int-max)**.

### Ver también

    - [gettype()](#function.gettype) - Devuelve el tipo de la variable

    - [conversión de tipo](#language.types.typecasting)

    - [manipulación de tipos](#language.types.type-juggling)

# strval

(PHP 4, PHP 5, PHP 7, PHP 8)

strval — Obtiene el valor de una variable en formato string

### Descripción

**strval**([mixed](#language.types.mixed) $value): [string](#language.types.string)

Obtiene el valor de la variable value,
en formato string. Consulte la documentación sobre strings para obtener más información sobre la conversión a string.

Esta función no realiza ningún formateo en el valor devuelto.
Si se busca una forma de formatear un valor numérico como string, consulte la función
[sprintf()](#function.sprintf) o la función [number_format()](#function.number-format).

### Parámetros

     value


       La variable a convertir en [string](#language.types.string).




       value puede ser un escalar, [null](#language.types.null),
       o un objeto que implemente el método mágico [__toString()](#object.tostring).
       No se puede utilizar la función **strval()** con arrays
       o objetos que no implementen el método mágico
       [__toString()](#object.tostring).





### Valores devueltos

El valor de la variable value en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo para strval()** utilizando el método mágico PHP
     [__toString()](#object.tostring).

&lt;?php
class StrValTest
{
public function **toString()
{
return **CLASS\_\_;
}
}

// Muestra 'StrValTest'
echo strval(new StrValTest);
?&gt;

### Ver también

    - [boolval()](#function.boolval) - Obtiene el valor booleano de una variable

    - [floatval()](#function.floatval) - Convierte una cadena en un número de punto flotante

    - [intval()](#function.intval) - Devuelve el valor entero equivalente de una variable

    - [settype()](#function.settype) - Asigna un tipo a una variable

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [La manipulación de tipos](#language.types.type-juggling)

    - [__toString()](#object.tostring)

# unserialize

(PHP 4, PHP 5, PHP 7, PHP 8)

unserialize — Crea una variable PHP a partir de un valor serializado

### Descripción

**unserialize**([string](#language.types.string) $data, [array](#language.types.array) $options = []): [mixed](#language.types.mixed)

**unserialize()** toma una variable serializada
(ver [serialize()](#function.serialize)) y la convierte en una variable PHP.

**Advertencia**

    No se debe pasar una entrada de usuario no confiable a la función
    **unserialize()** independientemente del valor de
    allowed_classes en options.
    La deserialización puede resultar
    en la ejecución de código cargado y ejecutado durante la instanciación
    y la autocarga de objetos, y así, un usuario malintencionado
    podría ser capaz de explotar este comportamiento. Utilice un estándar de intercambio
    seguro, como JSON (a través de las funciones [json_decode()](#function.json-decode)
    y [json_encode()](#function.json-encode)) si necesita pasar datos serializados
    al usuario.




    Si necesita deserializar datos serializados almacenados externamente,
    considere el uso de [hash_hmac()](#function.hash-hmac) para validar los
    datos. Asegúrese de que los datos no hayan sido modificados por nadie más
    que usted.

### Parámetros

     data


       La cadena serializada.




       Si la variable deserializada es un objeto, después de reconstruirlo con éxito, PHP intentará automáticamente llamar a los métodos
       [__unserialize()](#object.unserialize) o
       [__wakeup](#object.wakeup) (si alguno de ellos existe).






**Nota**:
**Directiva [unserialize_callback_func](#ini.unserialize-callback-func)**

         La retrollamada especificada en la directiva
         [unserialize_callback_func](#ini.unserialize-callback-func)
         es llamada cuando una clase no definida es deserializada.
         Si no se especifica ninguna retrollamada, el objeto será instanciado como
         [__PHP_Incomplete_Class](#class.php-incomplete-class).








     options


       Cualquier opción a proporcionar a **unserialize()**, en forma de un
       array asociativo.




       <caption>**Opciones válidas**</caption>



          Nombre
          Tipo
          Descripción






          allowed_classes
          [array](#language.types.array)|[bool](#language.types.boolean)


            Puede ser un array de nombres de clases que deben ser aceptados, **[false](#constant.false)**
            para no aceptar ninguna clase, o **[true](#constant.true)** para aceptar todas las
            clases. Si esta opción está definida, y
            **unserialize()** encuentra un objeto de una clase
            que no está aceptada, entonces el objeto será instanciado como
            [__PHP_Incomplete_Class](#class.php-incomplete-class).


            Omitir esta opción equivale a definirla como **[true](#constant.true)**:
            PHP intentará instanciar objetos de cualquier clase.





          max_depth
          [int](#language.types.integer)


            La profundidad máxima permitida de las estructuras durante la deserialización,
            que está destinada a prevenir desbordamientos de pila. El límite de profundidad
            por defecto es de 4096 y puede ser desactivado definiendo
            max_depth a 0.










### Valores devueltos

El valor convertido es retornado por la función, y puede ser de
tipo [bool](#language.types.boolean), [int](#language.types.integer), [float](#language.types.float), [string](#language.types.string), [array](#language.types.array) o [object](#language.types.object).

Si la cadena pasada no puede ser deserializada, esta función retorna
**[false](#constant.false)** y se emite un error **[E_WARNING](#constant.e-warning)**.

### Errores/Excepciones

Los objetos pueden lanzar [Throwable](#class.throwable)s en su gestor
de deserialización.

A partir de PHP 8.4.0, si el elemento allowed_classes de
options no es un [array](#language.types.array) de nombres de clases,
**unserialize()** lanza [TypeError](#class.typeerror)
y [ValueError](#class.valueerror).

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Ahora lanza [TypeError](#class.typeerror) y
        [ValueError](#class.valueerror) si el elemento allowed_classes
        de options no es un [array](#language.types.array) de nombres de clases.




       8.3.0

        Ahora emite un **[E_WARNING](#constant.e-warning)** cuando la cadena de entrada contiene datos no consumidos.




       8.3.0

        Ahora emite un **[E_WARNING](#constant.e-warning)** cuando la cadena proporcionada no es deserializable;
        previamente, se emitía un **[E_NOTICE](#constant.e-notice)**.




       7.4.0

        Se agregó el elemento max_depth a
        options para definir la profundidad
        máxima permitida de las estructuras durante la deserialización.




       7.1.0

        El elemento allowed_classes de
        options ahora está estrictamente tipado, es decir, si
        se proporciona algo que no sea un array [array](#language.types.array) o un [bool](#language.types.boolean)
        **unserialize()** retorna **[false](#constant.false)** y emite una
        **[E_WARNING](#constant.e-warning)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con unserialize()**

&lt;?php
// Aquí, se utiliza &lt;function&gt;unserialize&lt;/function&gt; para cargar los datos de sesión
// desde la base de datos, en $session_data. Este ejemplo complementa
// el proporcionado con &lt;function&gt;serialize&lt;/function&gt;.

$conn = odbc_connect("webdb", "php", "chicken");
$stmt = odbc_prepare($conn, "SELECT data FROM sessions WHERE id = ?");
$sqldata = array($_SERVER['PHP_AUTH_USER']);
if (!odbc_execute($stmt, $sqldata) || !odbc_fetch_into($stmt, $tmp)) {
    // si la preparación o la lectura fallan, se crea un array vacío
    $session_data = array();
} else {
    // los datos guardados están en $tmp[0].
    $session_data = unserialize($tmp[0]);
if (!is_array($session_data)) {
// Error... inicialización de un array vacío
$session_data = array();
}
}
?&gt;

    **Ejemplo #2 Ejemplo con la directiva unserialize_callback_func**

&lt;?php
$serialized_object='O:1:"a":1:{s:5:"value";s:3:"100";}';

ini_set('unserialize_callback_func', 'mycallback');

function mycallback($classname)
{
    // Simplemente incluya un archivo que contenga su definición de clase
    // sabrá qué clase gracias a $classname
    var_dump($classname);
}

unserialize($serialized_object);
?&gt;

### Notas

**Advertencia**

    **[false](#constant.false)** es retornado en los casos donde ocurre un error y si se
    intenta deserializar un valor serializado igual a **[false](#constant.false)**. Es
    posible interceptar este caso especial comparando
    data con serialize(false)
    o atrapando el error **[E_NOTICE](#constant.e-notice)** emitido.

### Ver también

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

    - [hash_hmac()](#function.hash-hmac) - Genera un valor de clave de hash utilizando el método HMAC

    - [serialize()](#function.serialize) - Genera una representación almacenable de un valor

    - [Autoloading Classes](#language.oop5.autoload)

    - [unserialize_callback_func](#ini.unserialize-callback-func)

    - [unserialize_max_depth](#ini.unserialize-max-depth)

    - [__wakeup()](#object.wakeup)

    - [__serialize()](#object.serialize)

    - [__unserialize()](#object.unserialize)

# unset

(PHP 4, PHP 5, PHP 7, PHP 8)

unset — **unset()** destruye una variable

### Descripción

**unset**([mixed](#language.types.mixed) $var, [mixed](#language.types.mixed) ...$vars): [void](language.types.void.html)

**unset()** destruye la o las variables cuyo
nombre ha sido pasado como argumento var.

El comportamiento de **unset()** dentro de una
función puede variar según el tipo de variable que se desee
destruir.

Si una variable global es destruida con **unset()**
desde una función, solo la variable local será destruida. La
variable global mantendrá el valor adquirido antes de la llamada a
**unset()**.

    **Ejemplo #1 Utilización de unset()**

&lt;?php
function destroy_foo()
{
global $foo;
    unset($foo);
}

$foo = 'bar';
destroy_foo();
echo $foo;
?&gt;

Para destruir una variable global dentro de una
función, se puede utilizar el array
[$GLOBALS](#reserved.variables.globals):

    **Ejemplo #2 unset()** una variable global

&lt;?php
function foo()
{
unset($GLOBALS['bar']);
}

$bar = "truc";
foo();
?&gt;

Si una variable que es pasada por referencia es destruida dentro
de una función, solo la variable local será
destruida. La variable global conservará el mismo valor
que tenía antes de la llamada a **unset()**.

    **Ejemplo #3 unset()** con referencia

&lt;?php
function foo(&amp;$bar)
{
    unset($bar);
$bar = "blah";
}

$bar = 'truc';
echo "$bar\n";

foo($bar);
echo "$bar\n";
?&gt;

Si una variable estática es destruida dentro de una función,
**unset()** destruirá la variable solo en el
contexto del resto de la función. Las llamadas siguientes restaurarán
el valor anterior de la variable.

    **Ejemplo #4 unset()** con variable estática

&lt;?php
function foo()
{
static $bar;
    $bar++;
    echo "Antes de unset: $bar, ";
    unset($bar);
$bar = 23;
echo "después de unset: $bar\n";
}

foo();
foo();
foo();
?&gt;

### Parámetros

     var


       La variable a destruir.






     vars


       Variables adicionales.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #5 Ejemplo con unset()**

&lt;?php
// Destrucción de una sola variable
unset($foo);

// Destrucción de un elemento de array
unset($bar['quux']);

// Destrucción de múltiples variables
unset($foo1, $foo2, $foo3);
?&gt;

### Notas

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

**Nota**:

    Es posible destruir cualquier propiedad
    visible en el contexto actual.




     Si está declarado,
     [__get()](#object.get)
     es llamado al acceder a una propiedad no definida, y
     [__set()](#object.set)
     es llamado al definir una propiedad no definida.

**Nota**:

    No es posible destruir la variable especial
    $this dentro de un método de un
    objeto.

**Nota**:

    Al utilizar esta función en propiedades de objeto
    inaccesibles, el método mágico
    [__unset](#object.unset)
    será llamado, si existe.

### Ver también

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [__unset()](#object.unset)

    - [empty()](#function.empty) - Determina si una variable está vacía

    - [array_splice()](#function.array-splice) - Elimina y reemplaza una porción de array

    - [(unset) casting](#language.types.null.casting)

# var_dump

(PHP 4, PHP 5, PHP 7, PHP 8)

var_dump — Muestra información sobre una variable

### Descripción

**var_dump**([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

**var_dump()** muestra información estructurada sobre una variable,
incluyendo su tipo y valor. Los arrays y objetos son explorados
recursivamente, con indentaciones, para resaltar su estructura.

Todas las propiedades públicas, privadas y protegidas de los objetos
serán mostradas en la salida a menos que el objeto implemente un
método [\_\_debugInfo()](#language.oop5.magic.debuginfo).

**Sugerencia**
Al igual que con todas las funciones que muestran directamente resultados al navegador, las
[funciones de gestión de salida](#book.outcontrol) pueden ser utilizadas para capturar la salida
de esta función y almacenarla en un string (por ejemplo).

### Parámetros

     value


       La expresión a mostrar.






     values


       Expresión adicional a mostrar.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con var_dump()**

&lt;?php
$a = array(1, 2, array("a", "b", "c"));
var_dump($a);
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
array(3) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[2]=&gt;
string(1) "c"
}
}

&lt;?php

$b = 3.1;
$c = true;
var_dump($b, $c);

?&gt;

    El ejemplo anterior mostrará:

float(3.1)
bool(true)

### Ver también

    - [print_r()](#function.print-r) - Muestra información legible para una variable

    - [debug_zval_dump()](#function.debug-zval-dump) - Extrae una representación en forma de string de la estructura interna de una zval para su visualización

    - [var_export()](#function.var-export) - Devuelve el código PHP utilizado para generar una variable

    - [__debugInfo()](#language.oop5.magic.debuginfo)

# var_export

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

var_export — Devuelve el código PHP utilizado para generar una variable

### Descripción

**var_export**([mixed](#language.types.mixed) $value, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [?](#language.types.null)[string](#language.types.string)

**var_export()** devuelve datos estructurados
sobre la variable dada. Es el mismo principio que
[var_dump()](#function.var-dump) pero con una excepción:
el resultado devuelto es código PHP válido.

### Parámetros

     value


       La variable que se desea exportar.






     return


       Si se utiliza y se establece a **[true](#constant.true)**, **var_export()** devolverá
       la representación de la variable en lugar de mostrarla.





### Valores devueltos

Devuelve la representación de la variable cuando el parámetro
return se utiliza y se evalúa a **[true](#constant.true)**. De lo contrario,
esta función devolverá **[null](#constant.null)**.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Los nombres de clase exportados son ahora completamente calificados.
        Anteriormente, la barra invertida inicial era omitida.




       7.3.0

        Exporta ahora los objetos [stdClass](#class.stdclass) como
        un [array](#language.types.array) convertido a un objeto ((object) array( ... )),
        en lugar de utilizar el método no existente
        **stdClass::__set_state()**.
        El efecto práctico es que ahora [stdClass](#class.stdclass) es
        exportable, y que el código resultante funcionará incluso en versiones
        anteriores de PHP.





### Ejemplos

    **Ejemplo #1 Ejemplo con var_export()**

&lt;?php

$a = array (1, 2, array ("a", "b", "c"));
var_export($a);

?&gt;

    El ejemplo anterior mostrará:

array (
0 =&gt; 1,
1 =&gt; 2,
2 =&gt;
array (
0 =&gt; 'a',
1 =&gt; 'b',
2 =&gt; 'c',
),
)

&lt;?php

$b = 3.1;
$v = var_export($b, true);
echo $v; // 3.1

?&gt;

    El ejemplo anterior mostrará:

3.1

    **Ejemplo #2 Exportar stdClass (a partir de PHP 7.3.0)**

&lt;?php
$person = new stdClass;
$person-&gt;name = 'ElePHPant ElePHPantsdotter';
$person-&gt;website = 'https://php.net/elephpant.php';

var_export($person);

    El ejemplo anterior mostrará:

(object) array(
'name' =&gt; 'ElePHPant ElePHPantsdotter',
'website' =&gt; 'https://php.net/elephpant.php',
)

    **Ejemplo #3 Exportar clases**

&lt;?php
class A { public $var; }
$a = new A;
$a-&gt;var = 5;
var_export($a);
?&gt;

    El ejemplo anterior mostrará:

\A::\_\_set_state(array(
'var' =&gt; 5,
))

    **Ejemplo #4 Uso de [__set_state](#object.set-state)**

&lt;?php
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

eval('$b = ' . var_export($a, true) . ';'); // $b = A::__set_state(array(
                                     //    'var1' =&gt; 5,
                                     //    'var2' =&gt; 'foo',
                                     // ));
var_dump($b);
?&gt;

    El ejemplo anterior mostrará:

object(A)#2 (2) {
["var1"]=&gt;
int(5)
["var2"]=&gt;
string(3) "foo"
}

### Notas

**Nota**:

    Las variables de tipo [resource](#language.types.resource) no pueden ser exportadas por esta
    función.

**Nota**:

    **var_export()** no maneja referencias circulares ya que sería
    imposible generar código PHP analizable para este tipo de datos.
    Si se desea hacer algo con la representación completa de un array
    o un objeto, se debe utilizar la función [serialize()](#function.serialize).

**Advertencia**

    Anterior a PHP 8.2.0, cuando **var_export()** exportaba objetos,
    la barra invertida inicial no era incluida en el espacio de nombres de la clase
    y esto, para un máximo de compatibilidad.

**Nota**:

    Para poder evaluar el PHP generado por **var_export()**,
    todos los objetos analizados deben implementar el método mágico [__set_state](#object.set-state). La única excepción es
    [stdClass](#class.stdclass); que es exportada utilizando un cast de un
    [array](#language.types.array) a un objeto.

### Ver también

    - [print_r()](#function.print-r) - Muestra información legible para una variable

    - [serialize()](#function.serialize) - Genera una representación almacenable de un valor

    - [var_dump()](#function.var-dump) - Muestra información sobre una variable

## Tabla de contenidos

- [boolval](#function.boolval) — Obtiene el valor booleano de una variable
- [debug_zval_dump](#function.debug-zval-dump) — Extrae una representación en forma de string de la estructura interna de una zval para su visualización
- [doubleval](#function.doubleval) — Alias de floatval
- [empty](#function.empty) — Determina si una variable está vacía
- [floatval](#function.floatval) — Convierte una cadena en un número de punto flotante
- [get_debug_type](#function.get-debug-type) — Devuelve el nombre del tipo de la variable de una manera adecuada para el depurado
- [get_defined_vars](#function.get-defined-vars) — Lista todas las variables definidas
- [get_resource_id](#function.get-resource-id) — Devuelve un entero que identifica un recurso
- [get_resource_type](#function.get-resource-type) — Devuelve el tipo de recurso
- [gettype](#function.gettype) — Devuelve el tipo de la variable
- [intval](#function.intval) — Devuelve el valor entero equivalente de una variable
- [is_array](#function.is-array) — Determina si una variable es un array
- [is_bool](#function.is-bool) — Determina si una variable es un bool
- [is_callable](#function.is-callable) — Determina si un valor puede ser llamado como una función
  en el ámbito actual
- [is_countable](#function.is-countable) — Verifica si el contenido de la variable es un valor contable
- [is_double](#function.is-double) — Alias de is_float
- [is_float](#function.is-float) — Determina si una variable es de tipo float
- [is_int](#function.is-int) — Determina si una variable es de tipo integer
- [is_integer](#function.is-integer) — Alias de is_int
- [is_iterable](#function.is-iterable) — Determina si el contenido de la variable es iterable.
- [is_long](#function.is-long) — Alias de is_int
- [is_null](#function.is-null) — Indica si una variable es null
- [is_numeric](#function.is-numeric) — Determina si una variable es un número o una cadena numérica
- [is_object](#function.is-object) — Determina si una variable es de tipo objeto
- [is_real](#function.is-real) — Alias de is_float
- [is_resource](#function.is-resource) — Determina si una variable es un recurso
- [is_scalar](#function.is-scalar) — Indica si una variable es un escalar
- [is_string](#function.is-string) — Determina si una variable es de tipo string
- [isset](#function.isset) — Determina si una variable está declarada y es diferente de null
- [print_r](#function.print-r) — Muestra información legible para una variable
- [serialize](#function.serialize) — Genera una representación almacenable de un valor
- [settype](#function.settype) — Asigna un tipo a una variable
- [strval](#function.strval) — Obtiene el valor de una variable en formato string
- [unserialize](#function.unserialize) — Crea una variable PHP a partir de un valor serializado
- [unset](#function.unset) — unset destruye una variable
- [var_dump](#function.var-dump) — Muestra información sobre una variable
- [var_export](#function.var-export) — Devuelve el código PHP utilizado para generar una variable

- [Introducción](#intro.var)
- [Instalación/Configuración](#var.setup)<li>[Configuración en tiempo de ejecución](#var.configuration)
  </li>- [Funciones de manejo de variables](#ref.var)<li>[boolval](#function.boolval) — Obtiene el valor booleano de una variable
- [debug_zval_dump](#function.debug-zval-dump) — Extrae una representación en forma de string de la estructura interna de una zval para su visualización
- [doubleval](#function.doubleval) — Alias de floatval
- [empty](#function.empty) — Determina si una variable está vacía
- [floatval](#function.floatval) — Convierte una cadena en un número de punto flotante
- [get_debug_type](#function.get-debug-type) — Devuelve el nombre del tipo de la variable de una manera adecuada para el depurado
- [get_defined_vars](#function.get-defined-vars) — Lista todas las variables definidas
- [get_resource_id](#function.get-resource-id) — Devuelve un entero que identifica un recurso
- [get_resource_type](#function.get-resource-type) — Devuelve el tipo de recurso
- [gettype](#function.gettype) — Devuelve el tipo de la variable
- [intval](#function.intval) — Devuelve el valor entero equivalente de una variable
- [is_array](#function.is-array) — Determina si una variable es un array
- [is_bool](#function.is-bool) — Determina si una variable es un bool
- [is_callable](#function.is-callable) — Determina si un valor puede ser llamado como una función
  en el ámbito actual
- [is_countable](#function.is-countable) — Verifica si el contenido de la variable es un valor contable
- [is_double](#function.is-double) — Alias de is_float
- [is_float](#function.is-float) — Determina si una variable es de tipo float
- [is_int](#function.is-int) — Determina si una variable es de tipo integer
- [is_integer](#function.is-integer) — Alias de is_int
- [is_iterable](#function.is-iterable) — Determina si el contenido de la variable es iterable.
- [is_long](#function.is-long) — Alias de is_int
- [is_null](#function.is-null) — Indica si una variable es null
- [is_numeric](#function.is-numeric) — Determina si una variable es un número o una cadena numérica
- [is_object](#function.is-object) — Determina si una variable es de tipo objeto
- [is_real](#function.is-real) — Alias de is_float
- [is_resource](#function.is-resource) — Determina si una variable es un recurso
- [is_scalar](#function.is-scalar) — Indica si una variable es un escalar
- [is_string](#function.is-string) — Determina si una variable es de tipo string
- [isset](#function.isset) — Determina si una variable está declarada y es diferente de null
- [print_r](#function.print-r) — Muestra información legible para una variable
- [serialize](#function.serialize) — Genera una representación almacenable de un valor
- [settype](#function.settype) — Asigna un tipo a una variable
- [strval](#function.strval) — Obtiene el valor de una variable en formato string
- [unserialize](#function.unserialize) — Crea una variable PHP a partir de un valor serializado
- [unset](#function.unset) — unset destruye una variable
- [var_dump](#function.var-dump) — Muestra información sobre una variable
- [var_export](#function.var-export) — Devuelve el código PHP utilizado para generar una variable
  </li>
