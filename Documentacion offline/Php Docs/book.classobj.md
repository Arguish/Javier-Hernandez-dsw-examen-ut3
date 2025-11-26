# Información de Clases/Objetos

# Introducción

Estas funciones permiten obtener información sobre clases
y objetos. Se puede obtener el nombre de la clase a la
que pertenece un objeto, así como sus propiedades y métodos
miembro. Al usar estas funciones no sólo se puede averiguar la
pertenencia a una clase de un objeto, sino también su vínculo parental (esto es,
qué clase es la que extiende la clase del objeto).

Por favor, vea la sección de [Objetos](#language.types.object)
del manual para una explicación detallada de cómo están las clases y
objetos implementados y de cómo son usados en PHP.

# Ejemplos

En este ejemplo, se comienza por definir una clase base así como una extensión de esta clase. La clase base describe un vegetal, si puede ser consumido y cuál es su color. La subclase Spinach añade un método para cocinarlo, y otro para determinar si está cocido.

**Ejemplo #1 Definiciones de las Clases**

Vegetable

&lt;?php
class Vegetable {
public $edible;
    public $color;
    public function __construct($edible, $color = "green")
{
$this-&gt;edible = $edible;
$this-&gt;color = $color;
}
public function isEdible()
{
return $this-&gt;edible;
}
public function getColor()
{
return $this-&gt;color;
}
}
?&gt;

Spinach

&lt;?php
class Spinach extends Vegetable {
public $cooked = false;
public function **construct()
{
parent::**construct(true, "green");
}
public function cook()
{
$this-&gt;cooked = true;
}
public function isCooked()
{
return $this-&gt;cooked;
}
}
?&gt;

A continuación, se crean dos objetos a partir de estas clases y se muestran información sobre ellos, incluyendo su clase padre. Asimismo, se definen funciones utilitarias, principalmente para obtener una presentación más agradable de las variables.

**Ejemplo #2 test_script.php**

&lt;?php
// register autoloader to load classes
spl_autoload_register();
function printProperties($obj)
{
    foreach (get_object_vars($obj) as $prop =&gt; $val) {
        echo "\t$prop = $val\n";
    }
}
function printMethods($obj)
{
$arr = get_class_methods(get_class($obj));
foreach ($arr as $method) {
        echo "\tfunction $method()\n";
    }
}
function objectBelongsTo($obj, $class)
{
    if (is_subclass_of($obj, $class)) {
        echo "Object belongs to class " . get_class($obj);
echo ", a subclass of $class\n";
    } else {
        echo "Object does not belong to a subclass of $class\n";
    }
}
// instantiate 2 objects
$veggie = new Vegetable(true, "blue");
$leafy = new Spinach();
// print out information about objects
echo "veggie: CLASS " . get_class($veggie) . "\n";
echo "leafy: CLASS " . get_class($leafy);
echo ", PARENT " . get_parent_class($leafy) . "\n";
// show veggie properties
echo "\nveggie: Properties\n";
printProperties($veggie);
// and leafy methods
echo "\nleafy: Methods\n";
printMethods($leafy);
echo "\nParentage:\n";
objectBelongsTo($leafy, Spinach::class);
objectBelongsTo($leafy, Vegetable::class);
?&gt;

Los ejemplos anteriores mostrarán:

veggie: CLASS Vegetable
leafy: CLASS Spinach, PARENT Vegetable
veggie: Properties
edible = 1
color = blue
leafy: Methods
function \_\_construct()
function cook()
function isCooked()
function isEdible()
function getColor()
Parentage:
Object does not belong to a subclass of Spinach
Object belongs to class Spinach, a subclass of Vegetable

    Un aspecto importante a notar en el ejemplo anterior es que el objeto $leafy es una instancia de la clase **Spinach** que es una subclase de **Vegetable**.

# Funciones de Clases/Objetos

# \_\_autoload

(PHP 5, PHP 7)

\_\_autoload — Intenta cargar una clase sin definir

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**\_\_autoload**([string](#language.types.string) $class): [void](language.types.void.html)

Puede definir esta función para habilitar la [carga de clases](#language.oop5.autoload).

### Parámetros

    class


      Nombre de la clase a cargar


### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [spl_autoload_register()](#function.spl-autoload-register) - Registra una función como implementación de __autoload()

# class_alias

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

class_alias — Crea un alias de clase

### Descripción

**class_alias**([string](#language.types.string) $class, [string](#language.types.string) $alias, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [bool](#language.types.boolean)

Crea un alias llamado alias
basado en una clase class definida
por el usuario. El alias es en todos los puntos
similar a la clase original.

**Nota**:

    A partir de PHP 8.3.0, **class_alias()** también soporta
    la creación de un alias de una clase interna de PHP.

### Parámetros

     class


       La clase original.






     alias


       El nombre del alias de la clase.






     autoload


       Si debe [cargarse automáticamente](#language.oop5.autoload)
       si la clase original no es encontrada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       **class_alias()** ahora soporta la creación de un alias de una clase interna.



### Ejemplos

    **Ejemplo #1 Ejemplo con class_alias()**

&lt;?php

class Foo { }

class_alias('Foo', 'Bar');

$a = new Foo;
$b = new Bar;

// los objetos son los mismos
var_dump($a == $b, $a === $b);
var_dump($a instanceof $b);

// las clases son las mismas
var_dump($a instanceof Foo);
var_dump($a instanceof Bar);

var_dump($b instanceof Foo);
var_dump($b instanceof Bar);

?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)

### Notas

**Nota**:

    Los nombres de clases no son sensibles a mayúsculas/minúsculas en PHP, y esto se refleja en esta
    función. Los alias creados por **class_alias()** son declarados
    en minúsculas. Esto significa que para una clase
    MyClass, la llamada class_alias('MyClass', 'MyClassAlias')
    declarará un nuevo alias de clase llamado myclassalias.

### Ver también

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

# class_exists

(PHP 4, PHP 5, PHP 7, PHP 8)

class_exists — Verifica si una clase ha sido definida

### Descripción

**class_exists**([string](#language.types.string) $class, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [bool](#language.types.boolean)

Esta función verifica si una clase dada ha sido definida.

### Parámetros

     class


       El nombre de la clase. Se busca de manera insensible a la casse.






     autoload


       Si se debe llamar a [autoload](#language.oop5.autoload) por omisión.





### Valores devueltos

Devuelve **[true](#constant.true)** si class es una clase definida,
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con class_exists()**

&lt;?php
// Verifica que la clase existe antes de usarla
if (class_exists('MyClass')) {
$myclass = new MyClass();
}

?&gt;

    **Ejemplo #2 Ejemplo con el argumento autoload**

&lt;?php
spl_autoload_register(function ($class_name) {
include $class_name . '.php'

    // Verifica si el include ha declarado la clase
    if (!class_exists($class_name, false)) {
        throw new LogicException("Unable to load class: $class_name");
    }

});

if (class_exists(MyClass::class)) {
$myclass = new MyClass();
}

?&gt;

### Ver también

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [enum_exists()](#function.enum-exists) - Verifica si la enumeración está definida

    - [interface_exists()](#function.interface-exists) - Verifica si una interfaz ha sido definida

    - [get_declared_classes()](#function.get-declared-classes) - Lista todas las clases definidas en PHP

# enum_exists

(PHP 8 &gt;= 8.1.0)

enum_exists — Verifica si la enumeración está definida

### Descripción

**enum_exists**([string](#language.types.string) $enum, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [bool](#language.types.boolean)

Esta función verifica si la [enum](#language.enumerations) dada ha sido definida o no.

### Parámetros

     enum


       El nombre de la enum. El nombre se toma en cuenta sin tener en cuenta las mayúsculas y minúsculas.






     autoload


       Si se debe llamar [autoload](#language.oop5.autoload) por omisión.





### Valores devueltos

Retorna **[true](#constant.true)** si enum es una enum definida,
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de enum_exists()**

&lt;?php
// Verifica que la enum exista antes de intentar usarla
if (enum_exists(Suit::class)) {
$myclass = Suit::Hearts;
}
?&gt;

### Ver también

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [class_exists()](#function.class-exists) - Verifica si una clase ha sido definida

    - [interface_exists()](#function.interface-exists) - Verifica si una interfaz ha sido definida

    - [get_declared_classes()](#function.get-declared-classes) - Lista todas las clases definidas en PHP

# get_called_class

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

get_called_class — El nombre de la clase en "Late Static Binding"

### Descripción

**get_called_class**(): [string](#language.types.string)

Devuelve el nombre de la clase desde la cual se ha llamado a un método estático,
tal como lo determina el Late Static Binding.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la clase.

### Errores/Excepciones

Si **get_called_class()** se invoca desde fuera de una clase,
se lanza una [Error](#class.error). Anteriormente a PHP 8.0.0,
se generaba un error de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Invocar esta función desde fuera de una clase
        lanza ahora una [Error](#class.error).
        Anteriormente, se generaba un **[E_WARNING](#constant.e-warning)** y la función
        devolvía **[false](#constant.false)**.
        **[false](#constant.false)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con get_called_class()**

&lt;?php

class foo {
static public function test() {
var_dump(get_called_class());
}
}

class bar extends foo {
}

foo::test();
bar::test();

?&gt;

    El ejemplo anterior mostrará:

string(3) "foo"
string(3) "bar"

### Ver también

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

# get_class

(PHP 4, PHP 5, PHP 7, PHP 8)

get_class — Devuelve el nombre de la clase de un objeto

### Descripción

**get_class**([object](#language.types.object) $object = ?): [string](#language.types.string)

Devuelve el nombre de la clase del objeto obj.

### Parámetros

     object


       El objeto probado.



      **Nota**:

        Pasar explícitamente **[null](#constant.null)** en object ya no es
        permitido desde PHP 7.2.0 y emite una **[E_WARNING](#constant.e-warning)**.
        A partir de PHP 8.0.0, se emite una [TypeError](#class.typeerror)
        cuando **[null](#constant.null)** es utilizado.






### Valores devueltos

Devuelve el nombre de la clase de la cual object
es una instancia.

Si object es una instancia de una clase que existe
en un espacio de nombres, el nombre con el espacio de nombres de la clase será devuelto.

### Errores/Excepciones

Si **get_class()** es llamada con algo que no sea un objeto,
se levanta una [TypeError](#class.typeerror). Anteriormente a PHP 8.0.0,
se emitía una advertencia de nivel **[E_WARNING](#constant.e-warning)**.

Si **get_class()** es llamado sin argumento fuera de una
clase, se levanta una [Error](#class.error). Anteriormente a PHP 8.0.0,
se emitía una advertencia de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Llamar a **get_class()** sin argumento ahora desencadena una advertencia
        **[E_DEPRECATED](#constant.e-deprecated)**; previamente, llamar a esta función dentro de una clase devolvía el nombre de esa clase.




       8.0.0

        Llamar a esta función desde fuera de una clase ahora lanza una [Error](#class.error).
        Anteriormente, se generaba un **[E_WARNING](#constant.e-warning)** y la función devolvía **[false](#constant.false)**.




       7.2.0

        Anteriormente a esta versión, el valor por omisión para
        object era **[null](#constant.null)** y tenía el mismo efecto que
        no pasar ningún valor. Ahora **[null](#constant.null)** ya no es el valor por omisión
        para object, y ya no es una entrada válida.





### Ejemplos

    **Ejemplo #1 Ejemplo con get_class()**

&lt;?php

class foo {
function name()
{
echo "Mi nombre es " , get_class($this) , "\n";
}
}

// creación de un objeto
$bar = new foo();

// Llamada externa
echo "Su nombre es " , get_class($bar) , "\n";

// Llamada interna
$bar-&gt;name();

?&gt;

    El ejemplo anterior mostrará:

Su nombre es foo
Mi nombre es foo

    **Ejemplo #2 Uso de get_class()** en una superclase

&lt;?php

abstract class bar {
public function \_\_construct()
{
var_dump(get_class($this));
var_dump(get_class());
}
}

class foo extends bar {
}

new foo;

?&gt;

    El ejemplo anterior mostrará:

string(3) "foo"
string(3) "bar"

    **Ejemplo #3 Uso de get_class()** con espacios de nombres de clase

&lt;?php

namespace Foo\Bar;

class Baz {
public function \_\_construct()
{

    }

}

$baz = new \Foo\Bar\Baz;

var_dump(get_class($baz));
?&gt;

    El ejemplo anterior mostrará:

string(11) "Foo\Bar\Baz"

### Ver también

    - [get_called_class()](#function.get-called-class) - El nombre de la clase en "Late Static Binding"

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

    - [gettype()](#function.gettype) - Devuelve el tipo de la variable

    - [get_debug_type()](#function.get-debug-type) - Devuelve el nombre del tipo de la variable de una manera adecuada para el depurado

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

# get_class_methods

(PHP 4, PHP 5, PHP 7, PHP 8)

get_class_methods — Devuelve los nombres de los métodos de una clase

### Descripción

**get_class_methods**([object](#language.types.object)|[string](#language.types.string) $object_or_class): [array](#language.types.array)

Devuelve los nombres de los métodos de una clase.

### Parámetros

     object_or_class


       El nombre de la clase o una instancia de objeto





### Valores devueltos

Devuelve un array que contiene los nombres de los métodos de la clase
object_or_class. En caso de error, se devuelve **[null](#constant.null)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El argumento object_or_class solo acepta ahora
       objetos o nombres de clase válidos.



### Ejemplos

    **Ejemplo #1 Ejemplo con get_class_methods()**

&lt;?php

class myclass {
// constructor
function \_\_construct()
{
return(true);
}

    // método 1
    function myfunc1()
    {
        return(true);
    }

    // método 2
    function myfunc2()
    {
        return(true);
    }

}

$class_methods = get_class_methods('myclass');
// o
$class_methods = get_class_methods(new myclass());

foreach ($class_methods as $method_name) {
    echo "$method_name\n";
}

?&gt;

    El ejemplo anterior mostrará:

\_\_construct
myfunc1
myfunc2

### Ver también

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [get_class_vars()](#function.get-class-vars) - Devuelve los valores por defecto de las propiedades de una clase

    - [get_object_vars()](#function.get-object-vars) - Devuelve las propiedades de un objeto

# get_class_vars

(PHP 4, PHP 5, PHP 7, PHP 8)

get_class_vars — Devuelve los valores por defecto de las propiedades de una clase

### Descripción

**get_class_vars**([string](#language.types.string) $class): [array](#language.types.array)

Devuelve los valores por defecto de las propiedades de una clase.

### Parámetros

     class


       El nombre de la clase





### Valores devueltos

Devuelve un array asociativo que contiene los nombres/valores de
las propiedades visibles en el ámbito actual, con sus
valores por defecto. Los elementos del array resultante están
en la forma varname =&gt; value.
En caso de error, la función devolverá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_class_vars()**

&lt;?php

class MyClass
{
public $var1; // Esto no tiene un valor por defecto explícito (técnicamente tiene NULL como valor por defecto)...
public $var2 = "xyz";
public $var3 = 100;

    // constructor
    function __construct()
    {
        // cambio de algunas propiedades
        $this-&gt;var1 = "foo";
        $this-&gt;var2 = "bar";
        return true;
    }

}

$my_class = new MyClass();

$class_vars = get_class_vars(get_class($my_class));

foreach ($class_vars as $name =&gt; $value) {
     echo "{$name}: ", var_export($value, true), "\n";
}

?&gt;

    El ejemplo anterior mostrará:

var1: NULL
var2: 'xyz'
var3: 100

    **Ejemplo #2 Ejemplo con get_class_vars()** y los contextos

&lt;?php

function format($array)
{
    return implode('|', array_keys($array)) . "\r\n";
}

class TestCase
{
public $a = 1;
protected $b = 2;
private $c = 3;

    public static function expose()
    {
        echo format(get_class_vars(__CLASS__));
    }

}

TestCase::expose();
echo format(get_class_vars('TestCase'));

?&gt;

    El ejemplo anterior mostrará:

// 5.0.0
a| _ b| TestCase c
a| _ b| TestCase c

// 5.0.1 - 5.0.2
a|b|c
a|b|c

// 5.0.3 +
a|b|c
a

### Ver también

    - [get_class_methods()](#function.get-class-methods) - Devuelve los nombres de los métodos de una clase

    - [get_object_vars()](#function.get-object-vars) - Devuelve las propiedades de un objeto

# get_declared_classes

(PHP 4, PHP 5, PHP 7, PHP 8)

get_declared_classes — Lista todas las clases definidas en PHP

### Descripción

**get_declared_classes**(): [array](#language.types.array)

Lista todas las clases definidas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene la lista de nombres de las clases declaradas
en el script actual.

**Nota**:

    Se debe tener en cuenta que, dependiendo de las extensiones que estén compiladas o cargadas
    en PHP, pueden estar presentes otras clases. Esto significa
    que no se podrán utilizar estos nombres de clases para definir
    sus propias clases. A continuación se muestra una lista de las
    [clases predefinidas](#reserved.classes).

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Anteriormente **get_declared_classes()** siempre
       retornaba las clases padres antes que las clases hijas. Esto ya no es así.
       No se garantiza ningún orden particular para el valor de retorno de
       **get_declared_classes()**.



### Ejemplos

    **Ejemplo #1 Ejemplo con get_declared_classes()**

&lt;?php
print_r(get_declared_classes());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; stdClass
[1] =&gt; \_\_PHP_Incomplete_Class
[2] =&gt; Directory
)

### Ver también

    - [class_exists()](#function.class-exists) - Verifica si una clase ha sido definida

    - [get_declared_interfaces()](#function.get-declared-interfaces) - Devuelve un array con todas las interfaces declaradas

    - [get_defined_functions()](#function.get-defined-functions) - Lista todas las funciones definidas

# get_declared_interfaces

(PHP 5, PHP 7, PHP 8)

get_declared_interfaces — Devuelve un array con todas las interfaces declaradas

### Descripción

**get_declared_interfaces**(): [array](#language.types.array)

Devuelve un array con todas las interfaces declaradas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene los nombres de las interfaces declaradas en
el script actual.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_declared_interfaces()**

&lt;?php
print_r(get_declared_interfaces());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Traversable
[1] =&gt; IteratorAggregate
[2] =&gt; Iterator
[3] =&gt; ArrayAccess
[4] =&gt; reflector
[5] =&gt; RecursiveIterator
[6] =&gt; SeekableIterator
)

### Ver también

    - [interface_exists()](#function.interface-exists) - Verifica si una interfaz ha sido definida

    - [get_declared_classes()](#function.get-declared-classes) - Lista todas las clases definidas en PHP

    - [class_implements()](#function.class-implements) - Devuelve las interfaces implementadas por una clase o interfaz dada

# get_declared_traits

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

get_declared_traits — Devuelve un array que contiene todos los traits declarados

### Descripción

**get_declared_traits**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene como valores los nombres de todos los traits declarados.

### Ver también

    - [class_uses()](#function.class-uses) - Devuelve los traits utilizados por una clase dada.

    - [trait_exists()](#function.trait-exists) - Verifica si un trait existe

# get_mangled_object_vars

(PHP 7 &gt;= 7.4.0, PHP 8)

get_mangled_object_vars — Devuelve un array de propiedades del objeto manipulado

### Descripción

**get_mangled_object_vars**([object](#language.types.object) $object): [array](#language.types.array)

Devuelve un [array](#language.types.array) cuyos elementos son las propiedades del object.
Las claves son los nombres de las variables miembro, con algunas excepciones notables:
las variables privadas tienen el nombre de la clase precedido del nombre de la variable,
y las variables protegidas están precedidas de un \*.
Estos valores precedidos tienen bytes NUL a ambos lados.
Las [propiedades tipadas](#language.oop5.properties.typed-properties) no inicializadas
son rechazadas silenciosamente.

### Parámetros

     object


       Una instancia de objeto.





### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todas las propiedades de object, independientemente de su visibilidad.

### Ejemplos

    **Ejemplo #1 Ejemplo de get_mangled_object_vars()**

&lt;?php

class A
{
public $public = 1;

    protected $protected = 2;

    private $private = 3;

}

class B extends A
{
private $private = 4;
}

$object = new B;
$object-&gt;dynamic = 5;
$object-&gt;{'6'} = 6;

var_dump(get_mangled_object_vars($object));

class AO extends ArrayObject
{
private $private = 1;
}

$arrayObject = new AO(['x' =&gt; 'y']);
$arrayObject-&gt;dynamic = 2;

var_dump(get_mangled_object_vars($arrayObject));

    El ejemplo anterior mostrará:

array(6) {
["Bprivate"]=&gt;
int(4)
["public"]=&gt;
int(1)
["*protected"]=&gt;
int(2)
["Aprivate"]=&gt;
int(3)
["dynamic"]=&gt;
int(5)
[6]=&gt;
int(6)
}
array(2) {
["AOprivate"]=&gt;
int(1)
["dynamic"]=&gt;
int(2)
}

### Ver también

    - [get_class_vars()](#function.get-class-vars) - Devuelve los valores por defecto de las propiedades de una clase

    - [get_object_vars()](#function.get-object-vars) - Devuelve las propiedades de un objeto

# get_object_vars

(PHP 4, PHP 5, PHP 7, PHP 8)

get_object_vars — Devuelve las propiedades de un objeto

### Descripción

**get_object_vars**([object](#language.types.object) $object): [array](#language.types.array)

Recupera las propiedades no estáticas del objeto
object, accesibles desde el contexto.

### Parámetros

     object


       Una instancia de un objeto.





### Valores devueltos

Devuelve un [array](#language.types.array) asociativo que contiene las propiedades no estáticas,
accesibles desde el contexto actual, del objeto
object.

### Ejemplos

    **Ejemplo #1 Ejemplo con get_object_vars()**

&lt;?php

class foo {
private $a;
public $b = 1;
public $c;
private $d;
static $e;

    public function test() {
        var_dump(get_object_vars($this));
    }

}

$test = new foo;
var_dump(get_object_vars($test));

$test-&gt;test();

?&gt;

    El ejemplo anterior mostrará:

array(2) {
["b"]=&gt;
int(1)
["c"]=&gt;
NULL
}
array(4) {
["a"]=&gt;
NULL
["b"]=&gt;
int(1)
["c"]=&gt;
NULL
["d"]=&gt;
NULL
}

**Nota**:

    Las propiedades no inicializadas son consideradas inaccesibles, y por lo tanto
    no serán incluidas en el array.

### Ver también

    - [get_class_methods()](#function.get-class-methods) - Devuelve los nombres de los métodos de una clase

    - [get_class_vars()](#function.get-class-vars) - Devuelve los valores por defecto de las propiedades de una clase

# get_parent_class

(PHP 4, PHP 5, PHP 7, PHP 8)

get_parent_class — Devuelve el nombre de la clase padre de un objeto

### Descripción

**get_parent_class**([object](#language.types.object)|[string](#language.types.string) $object_or_class = ?): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre de la clase padre para un objeto o una clase.

### Parámetros

     object_or_class


       El objeto o el nombre de la clase probado.





### Valores devueltos

Devuelve el nombre de la clase padre de la cual
object_or_class es una instancia o el nombre.

Si el objeto no tiene padre o si la clase proporcionada
no existe, **[false](#constant.false)** será devuelto.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a **get_parent_class()** sin argumento genera ahora un aviso
       **[E_DEPRECATED](#constant.e-deprecated)** ;
       previamente, llamar a esta función dentro de una clase devolvía el nombre de esta clase.




      8.0.0

       El parámetro object_or_class acepta ahora
       solo objetos o nombres de clase válidos.



### Ejemplos

    **Ejemplo #1 Ejemplo con get_parent_class()**

&lt;?php

class Papa {
function \_\_construct()
{
// un poco de código
}
}

class Enfant extends Papa {
function \_\_construct()
{
echo "Soy el hijo de " , get_parent_class($this) , "\n";
}
}

class Enfant2 extends papa {
function \_\_construct()
{
echo "Yo también soy el hijo de " , get_parent_class('enfant2') , "\n";
}
}

$foo = new Enfant();
$bar = new Enfant2();

?&gt;

    El ejemplo anterior mostrará:

Soy el hijo de Papa
Yo también soy el hijo de Papa

### Ver también

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

    - [class_parents()](#function.class-parents) - Devuelve las clases padres de una clase

# interface_exists

(PHP 5 &gt;= 5.0.2, PHP 7, PHP 8)

interface_exists — Verifica si una interfaz ha sido definida

### Descripción

**interface_exists**([string](#language.types.string) $interface, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [bool](#language.types.boolean)

Verifica si una interfaz ha sido definida.

### Parámetros

     interface


       El nombre de la interfaz






     autoload


       Si se debe llamar a [autoload](#language.oop5.autoload) o no por omisión.





### Valores devueltos

Devuelve **[true](#constant.true)** si la interfaz proporcionada por el argumento
interface ha sido definida,
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con interface_exists()**

&lt;?php
// Verifica si la interfaz existe antes de usarla
if (interface_exists('MyInterface')) {
class MyClass implements MyInterface
{
// Métodos
}
}

?&gt;

### Ver también

    - [get_declared_interfaces()](#function.get-declared-interfaces) - Devuelve un array con todas las interfaces declaradas

    - [class_implements()](#function.class-implements) - Devuelve las interfaces implementadas por una clase o interfaz dada

    - [class_exists()](#function.class-exists) - Verifica si una clase ha sido definida

    - [enum_exists()](#function.enum-exists) - Verifica si la enumeración está definida

# is_a

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

is_a — Verifica si el objeto es de un cierto tipo o subtipo.

### Descripción

**is_a**([mixed](#language.types.mixed) $object_or_class, [string](#language.types.string) $class, [bool](#language.types.boolean) $allow_string = **[false](#constant.false)**): [bool](#language.types.boolean)

Determina si el object_or_class dado es del
tipo de objeto clase,
o tiene clase como uno de sus supertipos.

### Parámetros

     object_or_class


       Un nombre de clase o una instancia de un objeto.






     class


       El nombre de la clase o de la interfaz.






     allow_string


       Si este argumento vale **[false](#constant.false)**, el nombre de la clase en forma de string
       en el argumento object_or_class no está permitido. Esto permite
       evitar la llamada al autoloader si la clase no existe.





### Valores devueltos

Retorna **[true](#constant.true)** si object_or_class es del
tipo de objeto clase,
o tiene clase como uno de sus supertipos, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_a()**

&lt;?php
// Define una clase
class WidgetFactory
{
var $oink = 'moo';
}

// Crea un nuevo objeto
$WF = new WidgetFactory();

if (is_a($WF, 'WidgetFactory')) {
echo "sí, \$WF es siempre un objeto WidgetFactory\n";
}
?&gt;

    **Ejemplo #2 Uso del operador *instanceof***

&lt;?php

// definir una clase
class WidgetFactory
{
var $oink = 'moo';
}

// crear un nuevo objeto
$WF = new WidgetFactory();

if ($WF instanceof WidgetFactory) {
echo 'Sí, $WF es un WidgetFactory';
}
?&gt;

### Ver también

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

    - [is_subclass_of()](#function.is-subclass-of) - Determina si un objeto es una subclase de una clase dada o la implementa

# is_subclass_of

(PHP 4, PHP 5, PHP 7, PHP 8)

is_subclass_of — Determina si un objeto es una subclase de una clase dada o la implementa

### Descripción

**is_subclass_of**([mixed](#language.types.mixed) $object_or_class, [string](#language.types.string) $class, [bool](#language.types.boolean) $allow_string = **[true](#constant.true)**): [bool](#language.types.boolean)

Verifica si el objeto object_or_class tiene la clase
class entre sus padres o la implementa.

### Parámetros

     object_or_class


       Un nombre de clase o una instancia de un objeto.
       No se genera ningún error si la clase no existe.






     class


       El nombre de la clase






     allow_string


       Si este argumento es establecido a **[false](#constant.false)**, un nombre de clase en forma
       de string en el argumento object_or_class
       no es permitido. Esto permite evitar llamar al autoloader si la clase
       no existe.





### Valores devueltos

Esta función retorna **[true](#constant.true)** si el objeto object_or_class
es una instancia de una clase que es una subclase de
class, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_subclass_of()**

&lt;?php
// Define una clase
class WidgetFactory
{
var $oink = 'moo';
}

// Define una subclase
class WidgetFactory_Child extends WidgetFactory
{
var $oink = 'oink';
}

// Creación de un nuevo objeto
$WF = new WidgetFactory();
$WFC = new WidgetFactory_Child();

if (is_subclass_of($WFC, 'WidgetFactory')) {
echo "sí, \$WFC es una subclase de la clase WidgetFactory\n";
} else {
echo "no, \$WFC no es una subclase de la clase WidgetFactory\n";
}

if (is_subclass_of($WF, 'WidgetFactory')) {
echo "sí, \$WF es una subclase de la clase WidgetFactory\n";
} else {
echo "no, \$WF no es una subclase de la clase WidgetFactory\n";
}

if (is_subclass_of('WidgetFactory_Child', 'WidgetFactory')) {
echo "sí, WidgetFactory_Child es una subclase de la clase WidgetFactory\n";
} else {
echo "no, WidgetFactory_Child no es una subclase de la clase WidgetFactory\n";
}
?&gt;

    El ejemplo anterior mostrará:

sí, $WFC es una subclase de la clase WidgetFactory
no, $WF no es una subclase de la clase WidgetFactory
sí, WidgetFactory_Child es una subclase de la clase WidgetFactory

    **Ejemplo #2 Ejemplo con is_subclass_of()** utilizando una interfaz

&lt;?php
// Definición de la interfaz
interface MyInterface
{
public function MyFunction();
}

// Definición de la implementación de la clase de la interfaz
class MyClass implements MyInterface
{
public function MyFunction()
{
return "MyClass implementa MyInterface!";
}
}

// Instanciación del objeto
$my_object = new MyClass;

// Funciona desde PHP 5.3.7

// Prueba utilizando el objeto de la instancia de la clase
if (is_subclass_of($my_object, 'MyInterface')) {
echo "Sí, \$my_object es una subclase de MyInterface\n";
} else {
echo "No, \$my_object no es una subclase de MyInterface\n";
}

// Prueba utilizando el nombre de la clase en forma de string
if (is_subclass_of('MyClass', 'MyInterface')) {
echo "Sí, MyClass es una subclase de MyInterface\n";
} else {
echo "No, MyClass no es una subclase de MyInterface\n";
}
?&gt;

    El ejemplo anterior mostrará:

Sí, $my_object es una subclase de MyInterface
Sí, MyClass es una subclase de MyInterface

### Notas

**Nota**:

El uso de esta función utilizará todos los [autoloaders](#language.oop5.autoload)
registrados si la clase no es conocida aún.

### Ver también

    - [get_class()](#function.get-class) - Devuelve el nombre de la clase de un objeto

    - [get_parent_class()](#function.get-parent-class) - Devuelve el nombre de la clase padre de un objeto

    - [is_a()](#function.is-a) - Verifica si el objeto es de un cierto tipo o subtipo.

    - [class_parents()](#function.class-parents) - Devuelve las clases padres de una clase

# method_exists

(PHP 4, PHP 5, PHP 7, PHP 8)

method_exists — Verifica si el método existe en una clase

### Descripción

**method_exists**([object](#language.types.object)|[string](#language.types.string) $object_or_class, [string](#language.types.string) $method): [bool](#language.types.boolean)

Verifica si el método existe en el objeto
object_or_class proporcionado.

### Parámetros

     object_or_class


       Una instancia de un objeto o el nombre de una clase






     method


       El nombre del método





### Valores devueltos

Devuelve **[true](#constant.true)** si el método proporcionado por el argumento method
ha sido definido en el objeto object_or_class, **[false](#constant.false)**
en caso contrario.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Las verificaciones de clase contra métodos privados heredados devuelven ahora **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con method_exists()**

&lt;?php
$directory = new Directory('.');
var_dump(method_exists($directory,'read'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

    **Ejemplo #2 Ejemplo con method_exists()** en llamada estática

&lt;?php
var_dump(method_exists('Directory','read'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Notas

**Nota**:

El uso de esta función utilizará todos los [autoloaders](#language.oop5.autoload)
registrados si la clase no es conocida aún.

**Nota**:

    La función **method_exists()** no puede detectar los métodos
    que son mágicamente accesibles utilizando el método mágico
    [__call](#language.oop5.overloading.methods).

### Ver también

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - [is_callable()](#function.is-callable) - Determina si un valor puede ser llamado como una función

en el ámbito actual

    - [class_exists()](#function.class-exists) - Verifica si una clase ha sido definida

# property_exists

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

property_exists —
Verifica si un objeto o una clase posee una propiedad

### Descripción

**property_exists**([object](#language.types.object)|[string](#language.types.string) $object_or_class, [string](#language.types.string) $property): [bool](#language.types.boolean)

Esta función verifica si la propiedad property
existe en la clase especificada.

**Nota**:

    **property_exists()** devuelve **[true](#constant.true)**
    incluso si la propiedad tiene un valor **[null](#constant.null)**,
    a diferencia de la función [isset()](#function.isset).

### Parámetros

     object_or_class


       El nombre de la clase o un objeto de la clase a probar






     property


       El nombre de la propiedad





### Valores devueltos

Devuelve **[true](#constant.true)** si la propiedad existe, **[false](#constant.false)** si no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con property_exists()**

&lt;?php

class myClass {
public $mine;
private $xpto;
static protected $test;

    static function test() {
        var_dump(property_exists('myClass', 'xpto')); //true
    }

}

var_dump(property_exists('myClass', 'mine')); //true
var_dump(property_exists(new myClass, 'mine')); //true
var_dump(property_exists('myClass', 'xpto')); //true
var_dump(property_exists('myClass', 'bar')); //false
var_dump(property_exists('myClass', 'test')); //true
myClass::test();

?&gt;

### Notas

**Nota**:

El uso de esta función utilizará todos los [autoloaders](#language.oop5.autoload)
registrados si la clase no es conocida aún.

**Nota**:

    La función **property_exists()** no puede detectar
    las propiedades que son accesibles utilizando el método mágico
    [__get](#language.oop5.overloading.members).

### Ver también

    - [method_exists()](#function.method-exists) - Verifica si el método existe en una clase

# trait_exists

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

trait_exists — Verifica si un trait existe

### Descripción

**trait_exists**([string](#language.types.string) $trait, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [bool](#language.types.boolean)

### Parámetros

    trait


      Nombre del trait a verificar






    autoload


      Si debe o no [cargar automáticamente](#language.oop5.autoload)
      si no ha sido ya cargado.


### Valores devueltos

Retorna **[true](#constant.true)** si el trait existe, y **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [\_\_autoload](#function.autoload) — Intenta cargar una clase sin definir
- [class_alias](#function.class-alias) — Crea un alias de clase
- [class_exists](#function.class-exists) — Verifica si una clase ha sido definida
- [enum_exists](#function.enum-exists) — Verifica si la enumeración está definida
- [get_called_class](#function.get-called-class) — El nombre de la clase en "Late Static Binding"
- [get_class](#function.get-class) — Devuelve el nombre de la clase de un objeto
- [get_class_methods](#function.get-class-methods) — Devuelve los nombres de los métodos de una clase
- [get_class_vars](#function.get-class-vars) — Devuelve los valores por defecto de las propiedades de una clase
- [get_declared_classes](#function.get-declared-classes) — Lista todas las clases definidas en PHP
- [get_declared_interfaces](#function.get-declared-interfaces) — Devuelve un array con todas las interfaces declaradas
- [get_declared_traits](#function.get-declared-traits) — Devuelve un array que contiene todos los traits declarados
- [get_mangled_object_vars](#function.get-mangled-object-vars) — Devuelve un array de propiedades del objeto manipulado
- [get_object_vars](#function.get-object-vars) — Devuelve las propiedades de un objeto
- [get_parent_class](#function.get-parent-class) — Devuelve el nombre de la clase padre de un objeto
- [interface_exists](#function.interface-exists) — Verifica si una interfaz ha sido definida
- [is_a](#function.is-a) — Verifica si el objeto es de un cierto tipo o subtipo.
- [is_subclass_of](#function.is-subclass-of) — Determina si un objeto es una subclase de una clase dada o la implementa
- [method_exists](#function.method-exists) — Verifica si el método existe en una clase
- [property_exists](#function.property-exists) — Verifica si un objeto o una clase posee una propiedad
- [trait_exists](#function.trait-exists) — Verifica si un trait existe

- [Introducción](#intro.classobj)
- [Ejemplos](#classobj.examples)
- [Funciones de Clases/Objetos](#ref.classobj)<li>[\_\_autoload](#function.autoload) — Intenta cargar una clase sin definir
- [class_alias](#function.class-alias) — Crea un alias de clase
- [class_exists](#function.class-exists) — Verifica si una clase ha sido definida
- [enum_exists](#function.enum-exists) — Verifica si la enumeración está definida
- [get_called_class](#function.get-called-class) — El nombre de la clase en "Late Static Binding"
- [get_class](#function.get-class) — Devuelve el nombre de la clase de un objeto
- [get_class_methods](#function.get-class-methods) — Devuelve los nombres de los métodos de una clase
- [get_class_vars](#function.get-class-vars) — Devuelve los valores por defecto de las propiedades de una clase
- [get_declared_classes](#function.get-declared-classes) — Lista todas las clases definidas en PHP
- [get_declared_interfaces](#function.get-declared-interfaces) — Devuelve un array con todas las interfaces declaradas
- [get_declared_traits](#function.get-declared-traits) — Devuelve un array que contiene todos los traits declarados
- [get_mangled_object_vars](#function.get-mangled-object-vars) — Devuelve un array de propiedades del objeto manipulado
- [get_object_vars](#function.get-object-vars) — Devuelve las propiedades de un objeto
- [get_parent_class](#function.get-parent-class) — Devuelve el nombre de la clase padre de un objeto
- [interface_exists](#function.interface-exists) — Verifica si una interfaz ha sido definida
- [is_a](#function.is-a) — Verifica si el objeto es de un cierto tipo o subtipo.
- [is_subclass_of](#function.is-subclass-of) — Determina si un objeto es una subclase de una clase dada o la implementa
- [method_exists](#function.method-exists) — Verifica si el método existe en una clase
- [property_exists](#function.property-exists) — Verifica si un objeto o una clase posee una propiedad
- [trait_exists](#function.trait-exists) — Verifica si un trait existe
  </li>
