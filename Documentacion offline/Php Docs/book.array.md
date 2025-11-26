# Los arrays

# Introducción

Estas funciones permiten trabajar y manipular los arrays de diversas formas. Los arrays son esenciales para el almacenamiento, la gestión y las operaciones sobre conjuntos de variables.

Se admiten arrays simples y multidimensionales, que pueden ser creados por el usuario o por una función. Existen funciones específicas para bases de datos que permiten llenar arrays desde consultas a la base de datos, así como funciones que devuelven arrays.

Consúltese la sección sobre los
[arrays](#language.types.array) de este manual para una explicación detallada sobre cómo los arrays son implementados y utilizados en PHP. Léanse también los
[operadores sobre arrays](#language.operators.array) para ver otras formas de manipular los arrays.

# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

    **[CASE_LOWER](#constant.case-lower)**
    ([int](#language.types.integer))



     **[CASE_LOWER](#constant.case-lower)** se utiliza con
     [array_change_key_case()](#function.array-change-key-case) y sirve para convertir
     todos los índices de un array en minúsculas. Este es también el comportamiento
     por omisión de [array_change_key_case()](#function.array-change-key-case).
     A partir de PHP 8.2.0, solo los caracteres ASCII serán convertidos.





    **[CASE_UPPER](#constant.case-upper)**
    ([int](#language.types.integer))



     **[CASE_UPPER](#constant.case-upper)** se utiliza con
     [array_change_key_case()](#function.array-change-key-case) y sirve para convertir
     todos los índices de un array en mayúsculas.
     A partir de PHP 8.2.0, solo los caracteres ASCII serán convertidos.

Constantes de ordenación:

    **[SORT_ASC](#constant.sort-asc)**
    ([int](#language.types.integer))



       **[SORT_ASC](#constant.sort-asc)** se utiliza con
       [array_multisort()](#function.array-multisort) para ordenar en orden ascendente.





    **[SORT_DESC](#constant.sort-desc)**
    ([int](#language.types.integer))



       **[SORT_DESC](#constant.sort-desc)** se utiliza con
       [array_multisort()](#function.array-multisort) para ordenar en orden descendente.



Otras constantes de ordenación:

    **[SORT_REGULAR](#constant.sort-regular)**
    ([int](#language.types.integer))



     **[SORT_REGULAR](#constant.sort-regular)** compara normalmente los valores de una ordenación.





    **[SORT_NUMERIC](#constant.sort-numeric)**
    ([int](#language.types.integer))



     **[SORT_NUMERIC](#constant.sort-numeric)** compara numéricamente los valores de una ordenación.





    **[SORT_STRING](#constant.sort-string)**
    ([int](#language.types.integer))



     **[SORT_STRING](#constant.sort-string)** compara alfabéticamente los valores de una ordenación.





    **[SORT_LOCALE_STRING](#constant.sort-locale-string)**
    ([int](#language.types.integer))



     **[SORT_LOCALE_STRING](#constant.sort-locale-string)** se utiliza para comparar
     alfabéticamente los valores de una ordenación, utilizando la configuración local actual.





    **[SORT_NATURAL](#constant.sort-natural)**
    ([int](#language.types.integer))



     **[SORT_NATURAL](#constant.sort-natural)** se utiliza para comparar
     los elementos como strings, utilizando un "orden natural"
     como lo hace la función [natsort()](#function.natsort).





    **[SORT_FLAG_CASE](#constant.sort-flag-case)**
    ([int](#language.types.integer))



     **[SORT_FLAG_CASE](#constant.sort-flag-case)** puede ser combinado
     (con el operador OR a nivel de bits) con
     **[SORT_STRING](#constant.sort-string)** o
     **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings
     sin tener en cuenta la casilla.
     A partir de PHP 8.2.0, solo la conversión ASCII
     en función de la casilla será realizada.

Banderas de filtro:

    **[ARRAY_FILTER_USE_KEY](#constant.array-filter-use-key)**
    ([int](#language.types.integer))



     **[ARRAY_FILTER_USE_KEY](#constant.array-filter-use-key)** se utiliza con
     [array_filter()](#function.array-filter) para pasar cada clave como primer
     argumento a la función de retrollamada proporcionada.





    **[ARRAY_FILTER_USE_BOTH](#constant.array-filter-use-both)**
    ([int](#language.types.integer))



     **[ARRAY_FILTER_USE_BOTH](#constant.array-filter-use-both)** se utiliza con
     [array_filter()](#function.array-filter) para pasar el valor y la clave a la
     función de retrollamada proporcionada.








    **[COUNT_NORMAL](#constant.count-normal)**
    ([int](#language.types.integer))









    **[COUNT_RECURSIVE](#constant.count-recursive)**
    ([int](#language.types.integer))









    **[EXTR_OVERWRITE](#constant.extr-overwrite)**
    ([int](#language.types.integer))









    **[EXTR_SKIP](#constant.extr-skip)**
    ([int](#language.types.integer))









    **[EXTR_PREFIX_SAME](#constant.extr-prefix-same)**
    ([int](#language.types.integer))









    **[EXTR_PREFIX_ALL](#constant.extr-prefix-all)**
    ([int](#language.types.integer))









    **[EXTR_PREFIX_INVALID](#constant.extr-prefix-invalid)**
    ([int](#language.types.integer))









    **[EXTR_PREFIX_IF_EXISTS](#constant.extr-prefix-if-exists)**
    ([int](#language.types.integer))









    **[EXTR_IF_EXISTS](#constant.extr-if-exists)**
    ([int](#language.types.integer))









    **[EXTR_REFS](#constant.extr-refs)**
    ([int](#language.types.integer))

# Ordenación de arrays

PHP dispone de numerosas funciones para ordenar arrays,
y esta sección del manual va a ayudar a comprenderlas.

Las diferencias principales son:

- Algunos de los ordenamientos de array están basados en las claves, mientras que
  otros están basados en los valores:
  $array['clave'] = 'valor';

- Algunos ordenamientos mantienen la correlación entre las claves
  y los valores, y otros no, lo que significa que las claves
  suelen ser reasignadas numéricamente (0,1,2 ...)

- El orden de la ordenación puede ser: alfabético, ascendente, descendente,
  numérico, natural, aleatorio, o definido por el usuario.

- Nota: todas estas funciones de ordenación trabajan sobre el array
  mismo, a diferencia de la práctica normal que sería devolver el array ordenado.

- Si una de estas funciones de ordenación evalúa 2 miembros como iguales,
  entonces conservan el orden original.
  Anterior a PHP 8.0.0, su orden era indefinido (la ordenación no era estable).

   <caption>**Atributos de funciones de ordenación**</caption>
   
    
     
      Nombre de la función
      Ordenación por
      Asociación clave-valor
      Orden de ordenación
      Funciones asociadas


      [array_multisort()](#function.array-multisort)
      valor
      claves [string](#language.types.string) sí, claves [int](#language.types.integer) no
      primer array, o bien opciones de ordenación
      [array_walk()](#function.array-walk)



      [asort()](#function.asort)
      valor
      sí
      ascendente
      [arsort()](#function.arsort)



      [arsort()](#function.arsort)
      valor
      sí
      descendente
      [asort()](#function.asort)



      [krsort()](#function.krsort)
      clave
      sí
      descendente
      [ksort()](#function.ksort)



      [ksort()](#function.ksort)
      clave
      sí
      ascendente
      [asort()](#function.asort)



      [natcasesort()](#function.natcasesort)
      valor
      sí
      natural, insensible a la casilla
      [natsort()](#function.natsort)



      [natsort()](#function.natsort)
      valor
      sí
      natural
      [natcasesort()](#function.natcasesort)



      [rsort()](#function.rsort)
      valor
      no
      descendente
      [sort()](#function.sort)



      [shuffle()](#function.shuffle)
      valor
      no
      aleatorio
      [array_rand()](#function.array-rand)



      [sort()](#function.sort)
      valor
      no
      ascendente
      [rsort()](#function.rsort)



      [uasort()](#function.uasort)
      valor
      sí
      Definido por una función de usuario
      [uksort()](#function.uksort)



      [uksort()](#function.uksort)
      clave
      sí
      Definido por una función de usuario
      [uasort()](#function.uasort)



      [usort()](#function.usort)
      valor
      no
      Definido por una función de usuario
      [uasort()](#function.uasort)


# Funciones de Arrays

# Ver también

    Ver también [is_array()](#function.is-array), [explode()](#function.explode),
    [implode()](#function.implode),
    [preg_split()](#function.preg-split), and [unset()](#function.unset).

# array

(PHP 4, PHP 5, PHP 7, PHP 8)

array — Crea un array

### Descripción

**array**([mixed](#language.types.mixed) ...$values): [array](#language.types.array)

Crea un array. Consulte la sección sobre los
[tipos array](#language.types.array) para obtener más información
sobre qué es un array, incluyendo los detalles sobre la sintaxis alternativa de corchetes ([]).

### Parámetros

     values


       La sintaxis "índice =&gt; valor", separada por comas,
       define los índices y sus valores. Un índice puede ser una
       cadena o un número. Si el índice se omite, se generará automáticamente un índice numérico
       (comenzando en 0). Si el índice es un entero, el siguiente índice generado tomará el valor del índice más grande + 1. Tenga en cuenta que si se definen dos índices idénticos, el último sobrescribirá al primero.




       Tener una coma después de definir la última entrada, aunque innecesario,
       es una sintaxis válida.





### Valores devueltos

Devuelve un array de los argumentos. Los argumentos pueden proporcionar
un índice utilizando el operador =&gt;.
Consulte la sección sobre los [tipos array](#language.types.array)
para obtener más información sobre qué es un array.

### Ejemplos

El siguiente ejemplo muestra cómo crear un array de dos dimensiones,
cómo especificar los índices de un array asociativo, y cómo
generar automáticamente índices numéricos.

    **Ejemplo #1 Ejemplo con array()**

&lt;?php
$fruits = array (
    "fruits"  =&gt; array("a" =&gt; "orange", "b" =&gt; "banana", "c" =&gt; "apple"),
    "numbers" =&gt; array(1, 2, 3, 4, 5, 6),
    "holes"   =&gt; array("first", 5 =&gt; "second", "third")
);
print_r($fruits);
?&gt;

    **Ejemplo #2 Índices automáticos con array()**

&lt;?php
$array = array(1, 1, 1, 1,  1, 8 =&gt; 1, 4 =&gt; 1, 19, 3 =&gt; 13);
print_r($array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 1
[1] =&gt; 1
[2] =&gt; 1
[3] =&gt; 13
[4] =&gt; 1
[8] =&gt; 1
[9] =&gt; 19
)

Observe que el índice '3' se define dos veces, y finalmente
conserva su último valor de 13. El índice '4' se define después
del índice '8', y el siguiente índice generado (valor 19) es
9, ya que el índice más grande es entonces 8.

Este ejemplo crea un array cuyos índices comienzan en 1.

    **Ejemplo #3 Índices comenzando en 1 con array()**

&lt;?php
$firstQuarter = array(1 =&gt; 'January', 'February', 'March');
print_r($firstQuarter);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[1] =&gt; January
[2] =&gt; February
[3] =&gt; March
)

Al igual que en Perl, puede acceder a un valor de un array
en comillas dobles. Sin embargo, con PHP, debe rodear su array con llaves.

    **Ejemplo #4 Acceder a un array en comillas dobles**

&lt;?php
$foo = array('bar' =&gt; 'baz');
echo "Hello {$foo['bar']}!"; // Hello baz!
?&gt;

### Notas

**Nota**:

     **array()** es un constructor de lenguaje utilizado
     para representar literalmente los arrays, pero en ningún caso es una función regular.

### Ver también

    - [array_pad()](#function.array-pad) - Completa un array con un valor hasta la longitud especificada

    - [list()](#function.list) - Asigna variables como si fueran un array

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

    - [range()](#function.range) - Crea un array que contiene un intervalo de elementos

    - [foreach](#control-structures.foreach)

    - El tipo [array](#language.types.array)

# array_all

(PHP 8 &gt;= 8.4.0)

array_all — Verifica si todos los elementos del [array](#language.types.array) validan la función de retrollamada

### Descripción

**array_all**([array](#language.types.array) $array, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

**array_all()** devuelve **[true](#constant.true)**, si la función de retrollamada
callback devuelve **[true](#constant.true)** para todos los elementos.
De lo contrario, la función devuelve **[false](#constant.false)**.

### Parámetros

    array


      El [array](#language.types.array) a recorrer.




    callback


      La función de retrollamada a utilizar para validar cada elemento, que debe
      respetar la siguiente firma



       callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

      Si esta función devuelve **[false](#constant.false)**, **[false](#constant.false)** será devuelto por
      **array_all()** y la función de retrollamada no será llamada
      para los otros elementos.


### Valores devueltos

La función devuelve **[true](#constant.true)**, si callback devuelve
**[true](#constant.true)** para cada elemento. De lo contrario, la función devuelve **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo con array_all()**

&lt;?php
$array = [
'a' =&gt; 'perro',
'b' =&gt; 'gato',
'c' =&gt; 'vaca',
'd' =&gt; 'pato',
'e' =&gt; 'ganso',
'f' =&gt; 'elefante'
];

// Verificar si todos los nombres de animales tienen menos de 12 letras.
var_dump(array_all($array, function (string $value) {
    return strlen($value) &lt; 12;
}));

// Verificar si todos los nombres de animales tienen más de 5 letras.
var_dump(array_all($array, function (string $value) {
    return strlen($value) &gt; 5;
}));

// Verificar si todas las claves del array son strings.
var_dump(array_all($array, function (string $value, $key) {
   return is_string($key);
}));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(true)

### Ver también

- [array_any()](#function.array-any) - Verifica que al menos un elemento del array valide la función de retrollamada

- [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

- [array_find()](#function.array-find) - Devuelve el primer elemento que valida la función de retrollamada

- [array_find_key()](#function.array-find-key) - Devuelve la clave del primer elemento que valida la función de retrollamada

# array_any

(PHP 8 &gt;= 8.4.0)

array_any — Verifica que al menos un elemento del [array](#language.types.array) valide la función de retrollamada

### Descripción

**array_any**([array](#language.types.array) $array, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

**array_any()** devuelve **[true](#constant.true)**, si la función de retrollamada
callback devuelve **[true](#constant.true)** para al menos un elemento.
De lo contrario, la función devuelve **[false](#constant.false)**.

### Parámetros

    array


      El [array](#language.types.array) a recorrer.




    callback


      La función de retrollamada a utilizar para verificar cada elemento, que debe
      respetar la siguiente firma


callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

      Si esta función devuelve **[true](#constant.true)**, **[true](#constant.true)** será devuelto por
      **array_any()** y la función de retrollamada no será llamada
      para los otros elementos.


### Valores devueltos

La función devuelve **[true](#constant.true)**, si hay al menos un elemento para el cual
la función de retrollamada callback devuelve **[true](#constant.true)**.
De lo contrario, la función devuelve **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo con array_any()**

&lt;?php
$array = [
'a' =&gt; 'perro',
'b' =&gt; 'gato',
'c' =&gt; 'vaca',
'd' =&gt; 'pato',
'e' =&gt; 'ganso',
'f' =&gt; 'elefante'
];

// Verificar si el nombre de un animal tiene más de 5 letras.
var_dump(array_any($array, function (string $value) {
    return strlen($value) &gt; 5;
}));

// Verificar si el nombre de un animal tiene menos de 3 letras.
var_dump(array_any($array, function (string $value) {
    return strlen($value) &lt; 3;
}));

// Verificar si una clave de array no es una cadena.
var_dump(array_any($array, function (string $value, $key) {
   return !is_string($key);
}));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)

### Ver también

- [array_all()](#function.array-all) - Verifica si todos los elementos del array validan la función de retrollamada

- [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

- [array_find()](#function.array-find) - Devuelve el primer elemento que valida la función de retrollamada

- [array_find_key()](#function.array-find-key) - Devuelve la clave del primer elemento que valida la función de retrollamada

# array_change_key_case

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

array_change_key_case — Cambia la casse de todas las claves de un array

### Descripción

**array_change_key_case**([array](#language.types.array) $array, [int](#language.types.integer) $case = **[CASE_LOWER](#constant.case-lower)**): [array](#language.types.array)

Modifica las claves del array array y fuerza su casse.
Esta función dejará las claves numéricas sin cambios.

### Parámetros

     array


       El array a tratar







     case


       O bien **[CASE_UPPER](#constant.case-upper)** (mayúsculas), o bien
       **[CASE_LOWER](#constant.case-lower)** (minúsculas, valor por omisión)





### Valores devueltos

Devuelve un array cuyas claves han sido transformadas en mayúsculas
o en minúsculas.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_change_key_case()**

&lt;?php
$input_array = array("FirSt" =&gt; 1, "SecOnd" =&gt; 4);
print_r(array_change_key_case($input_array, CASE_UPPER));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[FIRST] =&gt; 1
[SECOND] =&gt; 4
)

### Notas

**Nota**:

    Si un array posee claves que serán idénticas al ejecutar
    esta función (e.g. "clé" y "CLé"),
    el último valor en el array sobrescribirá los anteriores.

# array_chunk

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

array_chunk — Divide un array en arrays de menor tamaño

### Descripción

**array_chunk**([array](#language.types.array) $array, [int](#language.types.integer) $length, [bool](#language.types.boolean) $preserve_keys = **[false](#constant.false)**): [array](#language.types.array)

Divide el array array en varios arrays conteniendo
length elementos. Es posible que el último array contenga menos valores.

### Parámetros

     array


       El array a tratar







     length


       El tamaño de cada array







     preserve_keys


       Cuando se define como **[true](#constant.true)**, las claves serán preservadas.
       Por omisión, vale **[false](#constant.false)** lo que reindexará el array resultante numéricamente





### Valores devueltos

Devuelve un array multidimensional indexado numéricamente, comenzando en cero,
cuyas dimensiones contienen length elementos.

### Errores/Excepciones

Si length es menor que 1,
se lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si length es menor que 1,
       se lanza una [ValueError](#class.valueerror);
       anteriormente, se generaba un error de nivel **[E_WARNING](#constant.e-warning)**
       y la función devolvía **[null](#constant.null)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con array_chunk()**

&lt;?php
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[0] =&gt; a
[1] =&gt; b
)

    [1] =&gt; Array
        (
            [0] =&gt; c
            [1] =&gt; d
        )

    [2] =&gt; Array
        (
            [0] =&gt; e
        )

)
Array
(
[0] =&gt; Array
(
[0] =&gt; a
[1] =&gt; b
)

    [1] =&gt; Array
        (
            [2] =&gt; c
            [3] =&gt; d
        )

    [2] =&gt; Array
        (
            [4] =&gt; e
        )

)

### Ver también

    - [array_slice()](#function.array-slice) - Extrae una porción de array

# array_column

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

array_column — Devuelve los valores de una columna de un array de entrada

### Descripción

**array_column**([array](#language.types.array) $array, [int](#language.types.integer)|[string](#language.types.string)|[null](#language.types.null) $column_key, [int](#language.types.integer)|[string](#language.types.string)|[null](#language.types.null) $index_key = **[null](#constant.null)**): [array](#language.types.array)

**array_column()** devuelve los valores de una columna de array, identificada por la clave
column_key. Opcionalmente, se puede proporcionar
un argumento index_key para indexar los valores
en el array devuelto por los valores de la columna
index_key del array de entrada.

### Parámetros

     array


       Un array multidimensional o un array de objetos a partir del cual
       se extrae una columna de valor. Si se proporciona un array de objetos,
       entonces las propiedades públicas pueden ser directamente extraídas.
       Para que las propiedades protegidas o privadas sean extraídas,
       la clase debe implementar las dos métodos mágicos
       **__get()** y **__isset()**.






     column_key


       La columna de valores a devolver. Este valor puede ser la clave
       entera de la columna que se desea recuperar, o bien el
       nombre de la clave para un array asociativo o el nombre de la propiedad.
       También puede valer **[null](#constant.null)** para devolver el array completo o
       los objetos (esto puede ser útil en conjunción con el argumento
       index_key para reindexar el array).






     index_key


       La columna a utilizar como índice/clave para el array devuelto.
       Este valor puede ser la clave entera de la columna, o el nombre de la clave.
       El valor es [cast](#language.types.array.key-casts)
       como de costumbre para las claves del array (sin embargo, anterior a PHP 8.0.0,
       los objetos que soportan una conversión en string también eran permitidos).





### Valores devueltos

Devuelve un array de valores que representan una sola columna desde el
array de entrada.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Los objetos en las columnas indicadas por el argumento index_key
        ya no se convertirán en string y lanzarán ahora
        una [TypeError](#class.typeerror) en su lugar.





### Ejemplos

    **Ejemplo #1 Recupera la columna de los nombres**

&lt;?php

// Array que representa un conjunto de registros de una base de datos
$records = [
[
'id' =&gt; 2135,
'first_name' =&gt; 'John',
'last_name' =&gt; 'Doe',
],
[
'id' =&gt; 3245,
'first_name' =&gt; 'Sally',
'last_name' =&gt; 'Smith',
],
[
'id' =&gt; 5342,
'first_name' =&gt; 'Jane',
'last_name' =&gt; 'Jones',
],
[
'id' =&gt; 5623,
'first_name' =&gt; 'Peter',
'last_name' =&gt; 'Doe',
]
];

$first_names = array_column($records, 'first_name');
print_r($first_names);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; John
[1] =&gt; Sally
[2] =&gt; Jane
[3] =&gt; Peter
)

    **Ejemplo #2
     Recupera la columna de los apellidos, indexada por la columna "id"
    **

&lt;?php

// Utilizando el array del ejemplo #1
$records = [
[
'id' =&gt; 2135,
'first_name' =&gt; 'John',
'last_name' =&gt; 'Doe',
],
[
'id' =&gt; 3245,
'first_name' =&gt; 'Sally',
'last_name' =&gt; 'Smith',
],
[
'id' =&gt; 5342,
'first_name' =&gt; 'Jane',
'last_name' =&gt; 'Jones',
],
[
'id' =&gt; 5623,
'first_name' =&gt; 'Peter',
'last_name' =&gt; 'Doe',
]
];

$last_names = array_column($records, 'last_name', 'id');
print_r($last_names);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[2135] =&gt; Doe
[3245] =&gt; Smith
[5342] =&gt; Jones
[5623] =&gt; Doe
)

    **Ejemplo #3
     Recupera la columna de los nombres de usuario desde la propiedad pública
     "username" de un objeto
    **

&lt;?php

class User
{
public $username;

    public function __construct(string $username)
    {
        $this-&gt;username = $username;
    }

}

$users = [
new User('user 1'),
new User('user 2'),
new User('user 3'),
];

print_r(array_column($users, 'username'));

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; user 1
[1] =&gt; user 2
[2] =&gt; user 3
)

    **Ejemplo #4
     Recupera la columna de nombres desde la propiedad privada "name" de un
     objeto utilizando los métodos mágicos __isset()** y
     **__get()**

&lt;?php

class Person
{
private $name;

    public function __construct(string $name)
    {
        $this-&gt;name = $name;
    }

    public function __get($prop)
    {
        return $this-&gt;$prop;
    }

    public function __isset($prop) : bool
    {
        return isset($this-&gt;$prop);
    }

}

$people = [
new Person('Fred'),
new Person('Jane'),
new Person('John'),
];

print_r(array_column($people, 'name'));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Fred
[1] =&gt; Jane
[2] =&gt; John
)

Si **\_\_isset()** no está definido, entonces se devolverá un array
vacío.

# array_combine

(PHP 5, PHP 7, PHP 8)

array_combine — Crea un array a partir de dos otros arrays

### Descripción

**array_combine**([array](#language.types.array) $keys, [array](#language.types.array) $values): [array](#language.types.array)

Crea un array, donde las claves son los valores de
keys, y los valores son los valores
de values.

### Parámetros

     keys


       Array de claves a utilizar. Los valores ilegales para las claves serán
       convertidos en [string](#language.types.string).







     values


       [Array](#language.types.array) de valores a utilizar





### Valores devueltos

Devuelve el array combinado.

### Errores/Excepciones

A partir de PHP 8.0.0, lanza un error de tipo [ValueError](#class.valueerror) si el
número de elementos de keys
y de values no coinciden.
Anteriormente, lanzaba una advertencia de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **array_combine()** ahora lanza un error de tipo
       [ValueError](#class.valueerror) si el número de elementos
       para cada array es desigual;
       anteriormente se devolvía **[false](#constant.false)** en su lugar.



### Ejemplos

    **Ejemplo #1 Ejemplo con array_combine()**

&lt;?php
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[green] =&gt; avocado
[red] =&gt; apple
[yellow] =&gt; banana
)

### Ver también

    - [array_merge()](#function.array-merge) - Fusiona varios arrays en uno solo

    - [array_walk()](#function.array-walk) - Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

    - [array_map()](#function.array-map) - Aplica una función sobre los elementos de un array

# array_count_values

(PHP 4, PHP 5, PHP 7, PHP 8)

array_count_values — Cuenta las ocurrencias de cada valor distinto en un array

### Descripción

**array_count_values**([array](#language.types.array) $array): [array](#language.types.array)

Devuelve un array que contiene los valores del array
array (que deben ser [int](#language.types.integer)s o [string](#language.types.string)s)
como claves y su frecuencia como valores.

### Parámetros

     array


       El array de valores a contar





### Valores devueltos

Devuelve un array asociativo de valores con las claves correspondientes a
array y sus números como valores.

### Errores/Excepciones

Lanza una alerta de nivel **[E_WARNING](#constant.e-warning)** para cada elemento que
no es una [string](#language.types.string) o un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con array_count_values()**

&lt;?php
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[1] =&gt; 2
[hello] =&gt; 2
[world] =&gt; 1
)

### Ver también

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

    - [array_unique()](#function.array-unique) - Elimina los valores duplicados de un array

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

    - [count_chars()](#function.count-chars) - Devuelve estadísticas sobre los caracteres utilizados en un string

# array_diff

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

array_diff — Calcula la diferencia entre arrays

### Descripción

**array_diff**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_diff()** compara el array
array con uno o más arrays
y devuelve los valores del array array
que no están presentes en los otros arrays.

### Parámetros

     array


       El array desde el cual comparar







     arrays


       Arrays a comparar





### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todas las entidades del array
array que no están presentes en ninguno de
los otros arrays. Las claves del array array son
preservadas.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_diff()**

&lt;?php
$array1 = array("a" =&gt; "green", "red", "blue", "red");
$array2 = array("b" =&gt; "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);
?&gt;

     Los valores múltiples en array1 serán todos
     tratados de la misma forma. Esto mostrará:

Array
(
[1] =&gt; blue
)

Dos elementos son considerados iguales si y solo si
(string) $elem1 === (string) $elem2 ; es decir, cuando
la [representación de string
](#language.types.string.casting) es la misma.

    **Ejemplo #2 Ejemplo con la función array_diff()**
     con tipos que no coinciden



     &lt;?php

// Esto generará una advertencia ya que un array no puede ser convertido a string.
$source = [1, 2, 3, 4];
$filter = [3, 4, [5], 6];
$result = array_diff($source, $filter);

// Mientras que esto es correcto, ya que los objetos pueden ser convertidos a string.
class S {
private $v;

public function \_\_construct(string $v) {
$this-&gt;v = $v;
}

public function \_\_toString() {
return $this-&gt;v;
}
}

$source = [new S('a'), new S('b'), new S('c')];
$filter = [new S('b'), new S('c'), new S('d')];

$result = array_diff($source, $filter);

// $result ahora contiene una instancia de S('a');
var_dump($result);
?&gt;

Para utilizar una función de comparación alternativa, consulte
la función [array_udiff()](#function.array-udiff).

### Notas

**Nota**:

    Tenga en cuenta que esta función solo verifica una dimensión de un array
    multidimensional. Por supuesto, se pueden verificar dimensiones más profundas
    utilizando
    array_diff($array1[0], $array2[0]);.

### Ver también

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

# array_diff_assoc

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

array_diff_assoc — Calcula la diferencia de dos arrays, teniendo en cuenta las claves

### Descripción

**array_diff_assoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

Compara array con los arrays arrays
y devuelve la diferencia. A diferencia de la función [array_diff()](#function.array-diff),
las claves del array también se utilizan en la comparación.

### Parámetros

     array


       El array a comparar







     arrays


       Arrays a comparar contra





### Valores devueltos

Devuelve un array que contiene todos los valores del array
array que no están presentes en los
otros arrays.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_diff_assoc()**



     En este ejemplo, el par "a" =&gt; "green"
     está presente en ambos arrays, y por lo tanto, no está presente en el
     resultado de la función. Por el contrario, el par 0 =&gt; "red"
     está presente en el resultado, ya que la clave de "red" es
     automáticamente asignada a 0 en el primer array,
     mientras que es asignada a 1 en el segundo array,
     ya que la clave 0 ya está asignada a yellow.

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[b] =&gt; brown
[c] =&gt; blue
[0] =&gt; red
)

    **Ejemplo #2 Ejemplo con array_diff_assoc()**



     Dos valores de los pares *clave =&gt; valor* se
     consideran iguales solo si (string) $elem1 === (string)
     $elem2 . En otras palabras, se realiza una verificación estricta
     en la representación en strings.

&lt;?php
$array1 = array(0, 1, 2);
$array2 = array("00", "01", "2");
$result = array_diff_assoc($array1, $array2);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 0
[1] =&gt; 1
)

### Notas

**Nota**:

    Esta función solo verifica una dimensión de un array multidimensional.
    Es posible verificar subdimensiones utilizando, por ejemplo,
    array_diff_assoc($array1[0], $array2[0]);.

**Nota**:

    Es necesario asegurarse de que los argumentos se proporcionen en el orden correcto al comparar arrays similares con más claves. El nuevo array debe ser el primero de la lista.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

# array_diff_key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

array_diff_key — Calcula la diferencia de dos arrays utilizando las claves para la comparación

### Descripción

**array_diff_key**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

Compara las claves del array array con las claves
de los arrays arrays y devuelve la diferencia.
Esta función es idéntica a la función [array_diff()](#function.array-diff),
excepto en el hecho de que la comparación se realiza sobre las claves,
en lugar de sobre los valores.

### Parámetros

     array


       El array a comparar







     arrays


       Arrays a comparar contra





### Valores devueltos

Devuelve un array que contiene todas las entradas del array
array cuyas claves están ausentes en
todos los otros arrays.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_diff_key()**



     Las dos claves desde los pares clave =&gt; valor
     se consideran iguales únicamente si
     (string) $clave1 === (string) $clave2 . En otras palabras,
     se realiza un análisis de tipo estricto, por lo que el tipo debe ser
     exactamente el mismo.

&lt;?php
$array1 = array('blue' =&gt; 1, 'red' =&gt; 2, 'green' =&gt; 3, 'purple' =&gt; 4);
$array2 = array('green' =&gt; 5, 'yellow' =&gt; 7, 'cyan' =&gt; 8);

var_dump(array_diff_key($array1, $array2));
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["blue"]=&gt;
int(1)
["red"]=&gt;
int(2)
["purple"]=&gt;
int(4)
}

&lt;?php
$array1 = array('blue' =&gt; 1, 'red'  =&gt; 2, 'green' =&gt; 3, 'purple' =&gt; 4);
$array2 = array('green' =&gt; 5, 'yellow' =&gt; 7, 'cyan' =&gt; 8);
$array3 = array('blue' =&gt; 6, 'yellow' =&gt; 7, 'mauve' =&gt; 8);

var_dump(array_diff_key($array1, $array2, $array3));
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["red"]=&gt;
int(2)
["purple"]=&gt;
int(4)
}

### Notas

**Nota**:

    Tenga en cuenta que esta función verifica únicamente una dimensión de un array
    que posee n dimensiones. Por supuesto, se puede verificar una dimensión más profunda utilizando, por ejemplo,
    array_diff_key($array1[0], $array2[0]);.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_diff_ukey()](#function.array-diff-ukey) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_intersect_key()](#function.array-intersect-key) - Calcula la intersección de dos arrays utilizando las claves para la comparación

    - [array_intersect_ukey()](#function.array-intersect-ukey) - Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación

# array_diff_uassoc

(PHP 5, PHP 7, PHP 8)

array_diff_uassoc — Calcula la diferencia entre dos arrays asociativos,
utilizando una función de retrollamada

### Descripción

**array_diff_uassoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $key_compare_func): [array](#language.types.array)

Se compara el array array con los arrays
arrays y se devuelve la diferencia. A diferencia
de la función [array_diff()](#function.array-diff), las claves del array son
utilizadas en la comparación.

A diferencia de la función [array_diff_assoc()](#function.array-diff-assoc),
un usuario proporciona una función de retrollamada utilizada para la comparación
de los índices, y no una función interna.

### Parámetros

     array


       El array a comparar







     arrays


       Arrays a comparar contra







     key_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todas las entradas del array
array1 que no están presentes en
ningún otro array.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_diff_uassoc()**



     En este ejemplo, la pareja "a" =&gt; "green"
     está presente en los dos arrays, y por lo tanto, no está presente en el
     resultado de la función. Por el contrario, la pareja 0 =&gt; "red"
     está presente en el resultado, ya que la clave de "red" es
     automáticamente asignada a 0 en el primer array,
     mientras que es asignada a 1 en el segundo array,
     ya que la clave 0 ya está asignada a yellow.

&lt;?php
function key_compare_func($a, $b)
{
return $a &lt;=&gt; $b;
}

$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "green", "yellow", "red");
$result = array_diff_uassoc($array1, $array2, "key_compare_func");
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[b] =&gt; brown
[c] =&gt; blue
[0] =&gt; red
)

     La igualdad de dos índices es verificada por la función del usuario.

### Notas

**Nota**:

    Esta función solo verifica una dimensión de un array multidimensional.
    Es posible verificar subdimensiones utilizando, por ejemplo,
    array_diff_uassoc($array1[1], $array2[1], "key_compare_func");.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_diff_ukey

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

array_diff_ukey — Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación

### Descripción

**array_diff_ukey**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $key_compare_func): [array](#language.types.array)

Compara las claves del array array con las de los arrays arrays y devuelve la diferencia.
Esta función es idéntica a la función [array_diff()](#function.array-diff), excepto que la comparación se realiza sobre las claves, en lugar de sobre los valores.

A diferencia de la función [array_diff_key()](#function.array-diff-key), se proporciona una función de usuario para la comparación de índices, y no una función interna.

### Parámetros

     array


       El array a comparar







     arrays


       Arrays a comparar contra







     key_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Devuelve un array que contiene todas las entradas del array array que no están presentes en ningún otro array.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_diff_ukey()**

&lt;?php
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 &gt; $key2)
return 1;
else
return -1;
}

$array1 = array('blue'  =&gt; 1, 'red'  =&gt; 2, 'green'  =&gt; 3, 'purple' =&gt; 4);
$array2 = array('green' =&gt; 5, 'blue' =&gt; 6, 'yellow' =&gt; 7, 'cyan' =&gt; 8);

var_dump(array_diff_ukey($array1, $array2, 'key_compare_func'));
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["red"]=&gt;
int(2)
["purple"]=&gt;
int(4)
}

### Notas

**Nota**:

    Se debe tener en cuenta que esta función verifica únicamente una dimensión de un array que posee n dimensiones. Por supuesto, se puede verificar una dimensión más profunda utilizando, por ejemplo,
    array_diff_ukey($array1[0], $array2[0], 'callback_func');.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_diff_key()](#function.array-diff-key) - Calcula la diferencia de dos arrays utilizando las claves para la comparación

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_intersect_key()](#function.array-intersect-key) - Calcula la intersección de dos arrays utilizando las claves para la comparación

    - [array_intersect_ukey()](#function.array-intersect-ukey) - Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación

# array_fill

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

array_fill — Rellena un array con un mismo valor

### Descripción

**array_fill**([int](#language.types.integer) $start_index, [int](#language.types.integer) $count, [mixed](#language.types.mixed) $value): [array](#language.types.array)

Crea un array con count entradas, todas con el valor
value. Los índices comienzan con el valor
start_index.

### Parámetros

     start_index


       El primer índice del array devuelto.




       Si start_index es negativo,
       el primer índice del array devuelto será
       start_index, seguido por índices comenzando en
       cero en versiones anteriores a PHP 8.0.0 ;
       a partir de PHP 8.0.0, los índices negativos se incrementan normalmente.
       (ver el '[ejemplo](#function.array-fill.example.negative-start-index)).







     count


       Número de elementos a insertar.
       Debe ser superior o igual a cero, e inferior o igual a 2147483647.






     value


       Valor a utilizar para rellenar el array





### Valores devueltos

Devuelve el array rellenado.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si
count está fuera del rango permitido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       La función **array_fill()** lanza ahora una [ValueError](#class.valueerror)
       si count está fuera del rango permitido;
       anteriormente se emitía una advertencia de nivel **[E_WARNING](#constant.e-warning)** y la función devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con array_fill()**

&lt;?php
$a = array_fill(5, 6, 'banana');
print_r($a);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[5] =&gt; banana
[6] =&gt; banana
[7] =&gt; banana
[8] =&gt; banana
[9] =&gt; banana
[10] =&gt; banana
)

    **Ejemplo #2 Ejemplo de array_fill()** con un índice de inicio negativo

&lt;?php
$a = array_fill(-2, 4, 'pear');
print_r($a);
?&gt;

    Resultado del ejemplo anterior en PHP 8:

Array
(
[-2] =&gt; pear
[-1] =&gt; pear
[0] =&gt; pear
[1] =&gt; pear
)

    Resultado del ejemplo anterior en PHP 7:

Array
(
[-2] =&gt; pear
[0] =&gt; pear
[1] =&gt; pear
[2] =&gt; pear
)

Observe que el índice -1 no estaba presente antes de PHP 8.0.0.

### Notas

Ver también la sección del manual sobre los
[arrays](#language.types.array)
para más información sobre las claves negativas.

### Ver también

    - [array_fill_keys()](#function.array-fill-keys) - Rellena un array con valores, especificando las claves

    - [str_repeat()](#function.str-repeat) - Repite un string

    - [range()](#function.range) - Crea un array que contiene un intervalo de elementos

# array_fill_keys

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

array_fill_keys — Rellena un array con valores, especificando las claves

### Descripción

**array_fill_keys**([array](#language.types.array) $keys, [mixed](#language.types.mixed) $value): [array](#language.types.array)

Rellena un array con el valor del argumento
value, y utilizando los valores del array
keys como claves.

### Parámetros

     keys


       Array de valores que será utilizado como claves. Los valores
       ilegales para las claves serán convertidos en strings.






     value


       Valor a utilizar para rellenar el array.





### Valores devueltos

Devuelve el array relleno.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_fill_keys()**

&lt;?php
$keys = array('foo', 5, 10, 'bar');
$a = array_fill_keys($keys, 'banana');
print_r($a);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[foo] =&gt; banana
[5] =&gt; banana
[10] =&gt; banana
[bar] =&gt; banana
)

### Ver también

    - [array_fill()](#function.array-fill) - Rellena un array con un mismo valor

    - [array_combine()](#function.array-combine) - Crea un array a partir de dos otros arrays

# array_filter

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

array_filter — Filtra los elementos de un array mediante una función de retrollamada

### Descripción

**array_filter**([array](#language.types.array) $array, [?](#language.types.null)[callable](#language.types.callable) $callback = **[null](#constant.null)**, [int](#language.types.integer) $mode = 0): [array](#language.types.array)

Evalúa cada valor del array array pasándolos a la función de retrollamada callback.
Si la función de retrollamada callback devuelve **[true](#constant.true)**,
el valor actual del array array es devuelto en el [array](#language.types.array) resultante.

Las claves del array son preservadas, y puede causar anomalías si el array array estaba indexado. El array resultante
puede ser reindexado utilizando la función [array_values()](#function.array-values).

### Parámetros

     array


       El array a recorrer







     callback


       La función de retrollamada a utilizar




       Si no se proporciona ninguna función de retrollamada callback,
       todas las entradas vacías del array array serán eliminadas.
       Ver la función [empty()](#function.empty) para comprender cómo PHP maneja el vacío en este caso.







     mode


       Flag que indica cuáles son los argumentos a enviar
       a la función de retrollamada callback:



        -

          **[ARRAY_FILTER_USE_KEY](#constant.array-filter-use-key)** - pasar la clave como único
          argumento a callback en lugar del valor.



        -

          **[ARRAY_FILTER_USE_BOTH](#constant.array-filter-use-both)** - pasar tanto el
          valor como la clave como argumentos de callback
          en lugar del valor.




       Por omisión 0, que pasará el valor como único argumento de callback.



### Valores devueltos

Devuelve el array filtrado.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       callback es ahora nullable.





8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_filter()**

&lt;?php
function odd($var)
{
// devuelve si el entero de entrada es impar
return $var &amp; 1;
}

function even($var)
{
    // devuelve si el entero de entrada es par
    return !($var &amp; 1);
}

$array1 = ['a' =&gt; 1, 'b' =&gt; 2, 'c' =&gt; 3, 'd' =&gt; 4, 'e' =&gt; 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Impar :\n";
print_r(array_filter($array1, "odd"));
echo "Par :\n";
print_r(array_filter($array2, "even"));
?&gt;

    El ejemplo anterior mostrará:

Impar :
Array
(
[a] =&gt; 1
[c] =&gt; 3
[e] =&gt; 5
)
Par :
Array
(
[0] =&gt; 6
[2] =&gt; 8
[4] =&gt; 10
[6] =&gt; 12
)

    **Ejemplo #2 Ejemplo con array_filter()**
    callback

&lt;?php

$entry = [
0 =&gt; 'foo',
1 =&gt; false,
2 =&gt; -1,
3 =&gt; null,
4 =&gt; '',
5 =&gt; '0',
6 =&gt; 0,
];

print_r(array_filter($entry));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; foo
[2] =&gt; -1
)

    **Ejemplo #3 Ejemplo con array_filter()** y
    mode

&lt;?php

$arr = ['a' =&gt; 1, 'b' =&gt; 2, 'c' =&gt; 3, 'd' =&gt; 4];

var_dump(array_filter($arr, function($k) {
return $k == 'b';
}, ARRAY_FILTER_USE_KEY));

var_dump(array_filter($arr, function($v, $k) {
return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["b"]=&gt;
int(2)
}
array(2) {
["b"]=&gt;
int(2)
["d"]=&gt;
int(4)
}

### Notas

**Precaución**

    Si el array es modificado desde la función de retrollamada (por ejemplo
    se añaden o eliminan elementos), el comportamiento
    de esta función es indefinido.

### Ver también

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_find()](#function.array-find) - Devuelve el primer elemento que valida la función de retrollamada

    - [array_any()](#function.array-any) - Verifica que al menos un elemento del array valide la función de retrollamada

    - [array_map()](#function.array-map) - Aplica una función sobre los elementos de un array

    - [array_reduce()](#function.array-reduce) - Reduce itérativemente un array

# array_find

(PHP 8 &gt;= 8.4.0)

array_find — Devuelve el primer elemento que valida la función de retrollamada

### Descripción

**array_find**([array](#language.types.array) $array, [callable](#language.types.callable) $callback): [mixed](#language.types.mixed)

**array_find()** devuelve el valor del primer elemento del
[array](#language.types.array) para el cual la función de retrollamada callback
devuelve **[true](#constant.true)**. Si ningún elemento es encontrado, la función devuelve **[null](#constant.null)**.

### Parámetros

    array


      El [array](#language.types.array) a recorrer.




    callback


      La función de retrollamada a utilizar, que debe respetar la siguiente firma



       callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

      Si esta función devuelve **[true](#constant.true)**, el valor del elemento será devuelto por
      **array_find()** y la función de retrollamada no será llamada
      para los otros elementos.


### Valores devueltos

La función devuelve el valor del primer elemento para el cual el
callback devuelve **[true](#constant.true)**. Si ningún elemento es encontrado,
la función devuelve **[null](#constant.null)**.

### Ejemplos

**Ejemplo #1 Ejemplo con array_find()**

&lt;?php
$array = [
'a' =&gt; 'perro',
'b' =&gt; 'vaca',
'c' =&gt; 'gato',
'd' =&gt; 'pato',
'e' =&gt; 'ganso',
'f' =&gt; 'elefante'
];

// Encontrar el primer animal cuyo nombre tiene más de 5 caracteres.
var_dump(array_find($array, function (string $value) {
    return strlen($value) &gt; 5;
}));

// Encontrar el primer animal cuyo nombre comienza con f.
var_dump(array_find($array, function (string $value) {
    return str_starts_with($value, 'f');
}));

// Encontrar el primer animal cuya clave es la primera letra de su nombre.
var_dump(array_find($array, function (string $value, $key) {
return $value[0] === $key;
}));

// Encontrar el primer animal cuya clave valida una RegEx.
var_dump(array_find($array, function ($value, $key) {
   return preg_match('/^([a-f])$/', $key);
}));
?&gt;

El ejemplo anterior mostrará:

string(5) "pato"
NULL
string(3) "gato"
string(3) "perro"

### Ver también

- [array_find_key()](#function.array-find-key) - Devuelve la clave del primer elemento que valida la función de retrollamada

- [array_all()](#function.array-all) - Verifica si todos los elementos del array validan la función de retrollamada

- [array_any()](#function.array-any) - Verifica que al menos un elemento del array valide la función de retrollamada

- [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

- [array_reduce()](#function.array-reduce) - Reduce itérativemente un array

# array_find_key

(PHP 8 &gt;= 8.4.0)

array_find_key — Devuelve la clave del primer elemento que valida la función de retrollamada

### Descripción

**array_find_key**([array](#language.types.array) $array, [callable](#language.types.callable) $callback): [mixed](#language.types.mixed)

**array_find_key()** devuelve la clave del primer elemento de un
[array](#language.types.array) para el cual la función de retrollamada callback
devuelve **[true](#constant.true)**. Si no se encuentra ningún elemento, la función devuelve **[null](#constant.null)**.

### Parámetros

    array


      El [array](#language.types.array) a recorrer.




    callback


      La función de retrollamada a utilizar, que debe respetar la siguiente firma


callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

      Si esta función devuelve **[true](#constant.true)**, la clave del elemento será devuelta por
      **array_find_key()** y la función de retrollamada no será
      llamada para los otros elementos.


### Valores devueltos

La función devuelve la clave del primer elemento para el cual la función de
retrollamada callback devuelve **[true](#constant.true)**. Si no se
encuentra ningún elemento, la función devuelve **[null](#constant.null)**.

### Ejemplos

**Ejemplo #1 Ejemplo con array_find_key()**

&lt;?php
$array = [
'a' =&gt; 'perro',
'b' =&gt; 'vaca',
'c' =&gt; 'gato',
'd' =&gt; 'pato',
'e' =&gt; 'oie',
'f' =&gt; 'elefante'
];

// Encontrar la clave del primer animal cuyo nombre tiene más de 5 caracteres.
var_dump(array_find_key($array, function (string $value) {
    return strlen($value) &gt; 5;
}));

// Encontrar la clave del primer animal cuyo nombre comienza con f.
var_dump(array_find_key($array, function (string $value) {
    return str_starts_with($value, 'f');
}));

// Encontrar la clave del primer animal que es también la primera letra de su nombre.
var_dump(array_find_key($array, function (string $value, $key) {
return $value[0] === $key;
}));

// Encontrar la clave del primer animal que valida una RegEx.
var_dump(array_find_key($array, function ($value, $key) {
   return preg_match('/^([a-f])$/', $key);
}));
?&gt;

El ejemplo anterior mostrará:

string(1) "e"
NULL
string(1) "c"
string(1) "a"

### Ver también

- [array_find()](#function.array-find) - Devuelve el primer elemento que valida la función de retrollamada

- [array_all()](#function.array-all) - Verifica si todos los elementos del array validan la función de retrollamada

- [array_any()](#function.array-any) - Verifica que al menos un elemento del array valide la función de retrollamada

- [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

- [array_reduce()](#function.array-reduce) - Reduce itérativemente un array

# array_first

(PHP 8 &gt;= 8.5.0)

array_first — Obtiene el primer valor de un array

### Descripción

**array_first**([array](#language.types.array) $array): [mixed](#language.types.mixed)

Obtiene el primer valor del array dado.

### Parámetros

    array


      Un array.


### Valores devueltos

Devuelve el primer valor de array si el array no está vacío;
**[null](#constant.null)** en caso contrario.

### Ejemplos

**Ejemplo #1 Uso básico de array_first()**

&lt;?php
$array = [1 =&gt; 'a', 0 =&gt; 'b', 3 =&gt; 'c', 2 =&gt; 'd'];

$firstValue = array_first($array);

var_dump($firstValue);
?&gt;

El ejemplo anterior mostrará:

string(1) "a"

### Ver también

- [array_key_first()](#function.array-key-first) - Recupera la primera clave de un array

- [array_last()](#function.array-last) - Obtiene el último valor de un array

# array_flip

(PHP 4, PHP 5, PHP 7, PHP 8)

array_flip — Reemplaza las claves por los valores, y los valores por las claves

### Descripción

**array_flip**([array](#language.types.array) $array): [array](#language.types.array)

**array_flip()** devuelve un array cuyas
claves son los valores del array anterior array,
y los valores son las claves.

Téngase en cuenta que los valores de array deben
ser claves válidas, es decir, deben ser [int](#language.types.integer) o [string](#language.types.string).
Se emitirá una alerta si un valor es de un tipo que
no es adecuado y la pareja en cuestión _no será incluida en el resultado_.

Si un valor no es único, solo la última clave será
utilizada como valor, y todas las demás se perderán.

### Parámetros

     array


       Un array de pares clave/valor a invertir.





### Valores devueltos

Devuelve un array invertido.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_flip()**

&lt;?php
$input = array("oranges", "apples", "pears");
$flipped = array_flip($input);

print_r($flipped);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[oranges] =&gt; 0
[apples] =&gt; 1
[pears] =&gt; 2
)

    **Ejemplo #2 Ejemplo con array_flip()** : colisión

&lt;?php
$input = array("a" =&gt; 1, "b" =&gt; 1, "c" =&gt; 2);
$flipped = array_flip($input);

print_r($flipped);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[1] =&gt; b
[2] =&gt; c
)

### Ver también

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

    - [array_keys()](#function.array-keys) - Devuelve todas las claves o un conjunto de las claves de un array

    - [array_reverse()](#function.array-reverse) - Invierte el orden de los elementos de un array

# array_intersect

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

array_intersect — Calcula la intersección de arrays

### Descripción

**array_intersect**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_intersect()** devuelve un array
conteniendo todos los valores de array
que están presentes en todos los otros argumentos.
Téngase en cuenta que las claves son preservadas.

### Parámetros

     array


       El array conteniendo los valores maestros a verificar.







     arrays


       Arrays a comparar contra





### Valores devueltos

Devuelve un array conteniendo todos los valores del array
array cuyos valores existen en
todos los argumentos.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_intersect()**

&lt;?php
$array1 = array("a" =&gt; "green", "red", "blue");
$array2 = array("b" =&gt; "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
[0] =&gt; red
)

### Notas

**Nota**:

    Dos elementos son considerados iguales si y solo si
    (string) $elem1 === (string) $elem2. En claro:
    cuando la representación en string es idéntica.

### Ver también

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

# array_intersect_assoc

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

array_intersect_assoc — Calcula la intersección de dos arrays con pruebas sobre los índices

### Descripción

**array_intersect_assoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_intersect_assoc()** devuelve un array que contiene
todos los valores de array que también
están presentes en todos los otros argumentos.
Tenga en cuenta que las claves también se utilizan
durante la comparación, a diferencia de [array_intersect()](#function.array-intersect).

### Parámetros

     array


       El array con los valores maestros a verificar.







     arrays


       Arrays a comparar





### Valores devueltos

Devuelve un array asociativo que contiene todos los valores del
array array que están presentes en
todos los argumentos.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_intersect_assoc()**

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "green", "b" =&gt; "yellow", "blue", "red");
$result_array = array_intersect_assoc($array1, $array2);
print_r($result_array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
)

En nuestro ejemplo, se puede ver que el par
"a" =&gt; "green" está presente en ambos arrays,
y por lo tanto se coloca en el último array. El valor
red no se devuelve porque en
$array1 su índice es 0 mientras que
en el array $array2, su índice es 1,
y la clave "b" no se devuelve, porque su valor es
diferente en cada array.

Los dos valores del par clave =&gt; valor se consideran iguales solo si (string) $elem1 === (string) $elem2.
En otras palabras, se realiza una comparación estricta en las representaciones
de los índices, con el tipo string.

### Ver también

- [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

- [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,
  compara los datos utilizando una función de retrollamada

- [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,
  compara los índices utilizando una función de retrollamada

- [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,
  compara los datos y los índices de los dos arrays utilizando
  una función de retrollamada separada

- [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

- [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

# array_intersect_key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

array_intersect_key — Calcula la intersección de dos arrays utilizando las claves para la comparación

### Descripción

**array_intersect_key**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_intersect_key()** devuelve un array que contiene
todas las entradas del array array
que contienen claves presentes en todos los arrays pasados como argumentos.

### Parámetros

     array


       El array que contiene las claves maestras a verificar.







     arrays


       Arrays a comparar.





### Valores devueltos

Devuelve un array asociativo que contiene todas las entradas del
array array cuyas claves están presentes
en todos los argumentos.

### Historial de cambios

       Versión
       Descripción







8.0.0

Esta función puede ser llamada ahora con un solo parámetro.
Anteriormente, al menos dos parámetros eran necesarios.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_intersect_key()**

&lt;?php
$array1 = array('azul'  =&gt; 1, 'rojo'  =&gt; 2, 'verde'  =&gt; 3, 'violeta' =&gt; 4);
$array2 = array('verde' =&gt; 5, 'azul' =&gt; 6, 'amarillo' =&gt; 7, 'cian' =&gt; 8);

var_dump(array_intersect_key($array1, $array2));
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["azul"]=&gt;
int(1)
["verde"]=&gt;
int(3)
}

En este ejemplo, se puede ver que solo las claves 'azul'
y 'verde' están presentes en ambos arrays y por lo tanto,
son devueltas. Note también que los valores para las claves
'azul' y 'verde' difieren
entre los dos arrays. No obstante, aún corresponden porque
solo las claves son verificadas.
Los valores devueltos son los del array array1.

Las dos claves desde los pares clave =&gt; valor
son consideradas iguales solo si
(string) $clave1 === (string) $clave2 . En otras palabras,
se realiza un análisis estricto del tipo, por lo que la representación en forma de
string debe ser exactamente la misma.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_diff_key()](#function.array-diff-key) - Calcula la diferencia de dos arrays utilizando las claves para la comparación

    - [array_diff_ukey()](#function.array-diff-ukey) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_intersect_ukey()](#function.array-intersect-ukey) - Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación

# array_intersect_uassoc

(PHP 5, PHP 7, PHP 8)

array_intersect_uassoc — Calcula la intersección de dos arrays con pruebas en los índices,
compara los índices utilizando una función de retrollamada

### Descripción

**array_intersect_uassoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $key_compare_func): [array](#language.types.array)

**array_intersect_uassoc()** devuelve un array
conteniendo todos los valores del array array
que están presentes en todos los argumentos. Note que las claves son utilizadas
en la comparación en oposición a la función [array_intersect()](#function.array-intersect).

### Parámetros

     array


       Array inicial para la comparación de los otros arrays.







     arrays


       Arrays a comparar contra







     key_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Devuelve los valores del array
array cuyos valores existen
en todos los otros argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_intersect_uassoc()**

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "GREEN", "B" =&gt; "brown", "yellow", "red");

print_r(array_intersect_uassoc($array1, $array2, "strcasecmp"));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[b] =&gt; brown
)

### Ver también

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

    - [array_intersect_key()](#function.array-intersect-key) - Calcula la intersección de dos arrays utilizando las claves para la comparación

    - [array_intersect_ukey()](#function.array-intersect-ukey) - Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación

# array_intersect_ukey

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

array_intersect_ukey — Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación

### Descripción

**array_intersect_ukey**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $key_compare_func): [array](#language.types.array)

**array_intersect_ukey()** devuelve un array que contiene
todas las valores del array array
que contienen claves presentes en todos los argumentos.

### Parámetros

     array


       Array inicial para la comparación de arrays.







     arrays


       Arrays a comparar.







     key_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Devuelve los valores del array
array cuyas claves existen
en todos los argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_intersect_ukey()**

&lt;?php
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 &gt; $key2)
return 1;
else
return -1;
}

$array1 = array('blue'  =&gt; 1, 'red'  =&gt; 2, 'green'  =&gt; 3, 'purple' =&gt; 4);
$array2 = array('green' =&gt; 5, 'blue' =&gt; 6, 'yellow' =&gt; 7, 'cyan' =&gt; 8);

var_dump(array_intersect_ukey($array1, $array2, 'key_compare_func'));
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["blue"]=&gt;
int(1)
["green"]=&gt;
int(3)
}

En este ejemplo, se puede ver que solo las claves
'blue' y 'green' están presentes en
ambos arrays y, por lo tanto, son devueltas. Note también que los valores para las claves
'blue' y 'green' difieren
entre los dos arrays. No obstante, aún coinciden porque solo las claves son verificadas. Los valores devueltos son los del
array array.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_diff_key()](#function.array-diff-key) - Calcula la diferencia de dos arrays utilizando las claves para la comparación

    - [array_diff_ukey()](#function.array-diff-ukey) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_intersect_key()](#function.array-intersect-key) - Calcula la intersección de dos arrays utilizando las claves para la comparación

# array_is_list

(PHP 8 &gt;= 8.1.0)

array_is_list — Verifica si un array dado es una lista

### Descripción

**array_is_list**([array](#language.types.array) $array): [bool](#language.types.boolean)

Determina si el array dado es una lista.
Un [array](#language.types.array) se considera como una lista si sus claves están compuestas por números consecutivos
de 0 a count($array)-1.

### Parámetros

     array


       El [array](#language.types.array) en evaluación.





### Valores devueltos

Devuelve **[true](#constant.true)** si array es una lista, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de array_is_list()**

&lt;?php
var_dump(array_is_list([])); // true
var_dump(array_is_list(['apple', 2, 3])); // true
var_dump(array_is_list([0 =&gt; 'apple', 'orange'])); // true

// El array no comienza en 0
var_dump(array_is_list([1 =&gt; 'apple', 'orange'])); // false

// Las claves no están en el orden correcto
var_dump(array_is_list([1 =&gt; 'apple', 0 =&gt; 'orange'])); // false

// Claves no enteras
var_dump(array_is_list([0 =&gt; 'apple', 'foo' =&gt; 'bar'])); // false

// Claves no consecutivas
var_dump(array_is_list([0 =&gt; 'apple', 2 =&gt; 'bar'])); // false
?&gt;

### Notas

**Nota**:

    Esta función devuelve **[true](#constant.true)** para los arrays vacíos.

### Ver también

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

# array_key_exists

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

array_key_exists — Verifica si una clave existe en un array

### Descripción

**array_key_exists**([string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean)|[resource](#language.types.resource)|[null](#language.types.null) $key, [array](#language.types.array) $array): [bool](#language.types.boolean)

**array_key_exists()** devuelve **[true](#constant.true)** si existe una
clave con el nombre key en el array
array. key
puede ser cualquier valor válido de índice
de array.

### Parámetros

     key


       Valor a verificar.






     array


       Un array que contiene las claves a verificar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Nota**:

    **array_key_exists()** buscará, únicamente, en
    las claves de la primera dimensión. Las claves anidadas en los
    arrays multidimensionales no serán encontradas

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El parámetro key acepta ahora
       los argumentos de tipo [bool](#language.types.boolean), [float](#language.types.float), [int](#language.types.integer),
       [null](#language.types.null), [resource](#language.types.resource), y
       [string](#language.types.string).




      8.0.0

       Ya no es posible pasar un objeto al parámetro array.




      7.4.0

       Se desaconseja pasar un objeto al parámetro array. Utilizar en su lugar [property_exists()](#function.property-exists).



### Ejemplos

    **Ejemplo #1 Ejemplo con array_key_exists()**

&lt;?php
$searchArray = ['first' =&gt; 1, 'second' =&gt; 4];
var_dump(array_key_exists('first', $searchArray));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

**Ejemplo #2 array_key_exists()** y [isset()](#function.isset)

    [isset()](#function.isset) no devuelve **[true](#constant.true)** para las claves de
    arrays que corresponden a un valor **[null](#constant.null)** mientras que **array_key_exists()** sí lo hace.

&lt;?php
$searchArray = ['first' =&gt; null, 'second' =&gt; 4];

var_dump(isset($searchArray['first']));
var_dump(array_key_exists('first', $searchArray));
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [array_keys()](#function.array-keys) - Devuelve todas las claves o un conjunto de las claves de un array

    - [in_array()](#function.in-array) - Indica si un valor pertenece a un array

    - [property_exists()](#function.property-exists) - Verifica si un objeto o una clase posee una propiedad

# array_key_first

(PHP 7 &gt;= 7.3.0, PHP 8)

array_key_first — Recupera la primera clave de un array

### Descripción

**array_key_first**([array](#language.types.array) $array): [int](#language.types.integer)|[string](#language.types.string)|[null](#language.types.null)

Recupera la primera clave del array array dado sin
afectar el puntero interno del array.

### Parámetros

    array


      Un array.


### Valores devueltos

Devuelve la primera clave de array si el array no está
vacío; **[null](#constant.null)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Uso simple de array_key_first()**

&lt;?php
$array = ['a' =&gt; 1, 'b' =&gt; 2, 'c' =&gt; 3];

$firstKey = array_key_first($array);

var_dump($firstKey);
?&gt;

    El ejemplo anterior mostrará:

string(1) "a"

### Notas

**Sugerencia**

     Hay varias maneras de proporcionar esta funcionalidad para versiones anteriores a PHP 7.3.0.
     Es posible utilizar [array_keys()](#function.array-keys), pero esto es
     bastante ineficiente. También es posible utilizar
     [reset()](#function.reset) y [key()](#function.key),
     pero esto puede cambiar el puntero interno del array.
     Una solución eficiente, que no modifica el puntero interno del array,
     escrita como un polyfill:

&lt;?php
if (!function_exists('array_key_first')) {
function array_key_first(array $arr) {
        foreach($arr as $key =&gt; $unused) {
return $key;
}
return NULL;
}
}
?&gt;

### Ver también

- [array_first()](#function.array-first) - Obtiene el primer valor de un array

- [array_key_last()](#function.array-key-last) - Recupera la última clave de un array

- [reset()](#function.reset) - Reinicia el puntero interno del array al principio

# array_key_last

(PHP 7 &gt;= 7.3.0, PHP 8)

array_key_last — Recupera la última clave de un array

### Descripción

**array_key_last**([array](#language.types.array) $array): [int](#language.types.integer)|[string](#language.types.string)|[null](#language.types.null)

Recupera la última clave del array array dado sin
afectar el puntero interno del array.

### Parámetros

    array


      Un array.


### Valores devueltos

Devuelve la última clave de array si el array no está
vacío; **[null](#constant.null)** en caso contrario.

### Ver también

- [array_last()](#function.array-last) - Obtiene el último valor de un array

- [array_key_first()](#function.array-key-first) - Recupera la primera clave de un array

- [end()](#function.end) - Posiciona el puntero del array al final del array

# array_keys

(PHP 4, PHP 5, PHP 7, PHP 8)

array_keys — Devuelve todas las claves o un conjunto de las claves de un array

### Descripción

**array_keys**([array](#language.types.array) $array): [array](#language.types.array)

**array_keys**([array](#language.types.array) $array, [mixed](#language.types.mixed) $filter_value, [bool](#language.types.boolean) $strict = **[false](#constant.false)**): [array](#language.types.array)

**array_keys()** devuelve las claves numéricas
y literales del array array.

Si se especifica un valor de búsqueda filter_value,
solo se devolverán las claves que contengan este valor.
De lo contrario, se devolverán todas las claves de array.

### Parámetros

     array


       Un array que contiene las claves a devolver.






     filter_value


       Si se especifica, solo se devolverán las claves que contengan estos valores.






     strict


       El argumento strict fuerza la comparación
       en modo estricto, incluyendo el tipo, con el operador ===.





### Valores devueltos

Devuelve un array de todas las claves en array.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_keys()**

&lt;?php
$array = array(0 =&gt; 100, "color" =&gt; "red");
print_r(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));

$array = array("color" =&gt; array("blue", "red", "green"),
               "size"  =&gt; array("small", "medium", "large"));
print_r(array_keys($array));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 0
[1] =&gt; color
)
Array
(
[0] =&gt; 0
[1] =&gt; 3
[2] =&gt; 4
)
Array
(
[0] =&gt; color
[1] =&gt; size
)

### Ver también

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

    - [array_combine()](#function.array-combine) - Crea un array a partir de dos otros arrays

    - [array_key_exists()](#function.array-key-exists) - Verifica si una clave existe en un array

    - [array_search()](#function.array-search) - Busca en un array la primera clave asociada al valor

# array_last

(PHP 8 &gt;= 8.5.0)

array_last — Obtiene el último valor de un array

### Descripción

**array_last**([array](#language.types.array) $array): [mixed](#language.types.mixed)

Obtiene el último valor del array dado.

### Parámetros

    array


      Un array.


### Valores devueltos

Devuelve el último valor de array si el array no está vacío;
**[null](#constant.null)** en caso contrario.

### Ejemplos

**Ejemplo #1 Uso básico de array_last()**

&lt;?php
$array = [1 =&gt; 'a', 0 =&gt; 'b', 3 =&gt; 'c', 2 =&gt; 'd'];

$lastValue = array_last($array);

var_dump($lastValue);
?&gt;

El ejemplo anterior mostrará:

string(1) "d"

### Ver también

- [array_key_last()](#function.array-key-last) - Recupera la última clave de un array

- [array_first()](#function.array-first) - Obtiene el primer valor de un array

# array_map

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

array_map — Aplica una función sobre los elementos de un array

### Descripción

**array_map**([?](#language.types.null)[callable](#language.types.callable) $callback, [array](#language.types.array) $array, [array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_map()** devuelve un [array](#language.types.array) que contiene
los resultados de la aplicación de la función de devolución de llamada
callback al valor correspondiente de
array (y arrays si se proporcionan
más arrays) utilizados como argumentos para la función de devolución de llamada.
El número de argumentos que la función de devolución de llamada callback
acepta debe corresponder al número de arrays pasados a
**array_map()**.
Los arrays de entrada adicionales son ignorados.
Se lanza una [ArgumentCountError](#class.argumentcounterror) si se proporciona un número
insuficiente de argumentos.

### Parámetros

     callback


       La función de devolución de llamada de tipo [callable](#language.types.callable) a ejecutar
       para cada elemento de cada array.




       **[null](#constant.null)** puede ser pasado como valor a callback
       para ejecutar una operación zip sobre varios arrays y devolver un array
       donde cada elemento es un array que contiene los elementos de los arrays de entrada en la
       misma posición del puntero interno del array (ver ejemplo a continuación).
       Si solo array es proporcionado,
       **array_map()** devolverá el array de entrada.






     array


       Un array a ejecutar a través de la función de devolución de llamada callback.






     arrays


       Lista variable de argumentos de arrays adicionales a ejecutar a través
       de la función de devolución de llamada callback.





### Valores devueltos

Devuelve un [array](#language.types.array) que contiene los resultados de la aplicación de la función
de devolución de llamada callback al valor correspondiente de
array (y arrays si se proporcionan
más arrays) utilizados como argumentos para la función de devolución de llamada.

El [array](#language.types.array) devuelto conservará las claves del array pasado como argumento,
si y solo si, se pasa un solo array. Si se pasan varios arrays como argumento,
el [array](#language.types.array) devuelto tendrá claves secuenciales en forma de [int](#language.types.integer).

### Historial de cambios

      Versión
      Descripción







8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_map()**

&lt;?php
function cube($n)
{
    return ($n _ $n _ $n);
}

$a = [1, 2, 3, 4, 5];
$b = array_map('cube', $a);
print_r($b);
?&gt;

     El contenido de la variable $b será:

Array
(
[0] =&gt; 1
[1] =&gt; 8
[2] =&gt; 27
[3] =&gt; 64
[4] =&gt; 125
)

    **Ejemplo #2 array_map()** utilizando una función cualquiera

&lt;?php

$func = function(int $value): int {
return $value \* 2;
};

print_r(array_map($func, range(1, 5)));

// O a partir de PHP 7.4.0:

print_r(array_map(fn($value): int =&gt; $value \* 2, range(1, 5)));

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
[3] =&gt; 8
[4] =&gt; 10
)

    **Ejemplo #3 array_map()**: uso de varios arrays

&lt;?php
function show_Spanish(int $n, string $m): string
{
    return "El número {$n} se dice {$m} en Español";
}

function map_Spanish(int $n, string $m): array
{
    return [$n =&gt; $m];
}

$a = [1, 2, 3, 4, 5];
$b = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

$c = array_map('show_Spanish', $a, $b);
print_r($c);

$d = array_map('map_Spanish', $a , $b);
print_r($d);
?&gt;

    El ejemplo anterior mostrará:

// Contenido de $c
Array
(
[0] =&gt; El número 1 se dice uno en Español
[1] =&gt; El número 2 se dice dos en Español
[2] =&gt; El número 3 se dice tres en Español
[3] =&gt; El número 4 se dice cuatro en Español
[4] =&gt; El número 5 se dice cinco en Español
)

// Contenido de $d
Array
(
[0] =&gt; Array
(
[1] =&gt; uno
)

    [1] =&gt; Array
        (
            [2] =&gt; dos
        )

    [2] =&gt; Array
        (
            [3] =&gt; tres
        )

    [3] =&gt; Array
        (
            [4] =&gt; cuatro
        )

    [4] =&gt; Array
        (
            [5] =&gt; cinco
        )

)

Generalmente, al utilizar varios arrays, estos deben
tener la misma longitud, ya que la función de devolución de llamada se aplica de manera
similar a todos los arrays. Si los arrays tienen longitudes desiguales,
los más pequeños serán completados con elementos vacíos para alcanzar
la longitud del más grande.

Un uso interesante de esta función es la construcción
de arrays de arrays, fácilmente realizada pasando el valor
**[null](#constant.null)** como nombre de función de devolución de llamada.

    **Ejemplo #4 Ejecutar una operación zip de arrays**

&lt;?php
$a = [1, 2, 3, 4, 5];
$b = ['one', 'two', 'three', 'four', 'five'];
$c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

$d = array_map(null, $a, $b, $c);
print_r($d);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[0] =&gt; 1
[1] =&gt; one
[2] =&gt; uno
)

    [1] =&gt; Array
        (
            [0] =&gt; 2
            [1] =&gt; two
            [2] =&gt; dos
        )

    [2] =&gt; Array
        (
            [0] =&gt; 3
            [1] =&gt; three
            [2] =&gt; tres
        )

    [3] =&gt; Array
        (
            [0] =&gt; 4
            [1] =&gt; four
            [2] =&gt; cuatro
        )

    [4] =&gt; Array
        (
            [0] =&gt; 5
            [1] =&gt; five
            [2] =&gt; cinco
        )

)

    **Ejemplo #5
     [null](#constant.null)** callback con solo
     array

&lt;?php
$array = [1, 2, 3];
var_dump(array_map(null, $array));
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

    **Ejemplo #6
     array_map()** - con claves en forma de [string](#language.types.string)

&lt;?php
$arr = ['stringkey' =&gt; 'value'];
function cb1($a) {
return [$a];
}
function cb2($a, $b) {
    return [$a, $b];
}
var_dump(array_map('cb1', $arr));
var_dump(array_map('cb2', $arr, $arr));
var_dump(array_map(null, $arr));
var_dump(array_map(null, $arr, $arr));
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["stringkey"]=&gt;
array(1) {
[0]=&gt;
string(5) "value"
}
}
array(1) {
[0]=&gt;
array(2) {
[0]=&gt;
string(5) "value"
[1]=&gt;
string(5) "value"
}
}
array(1) {
["stringkey"]=&gt;
string(5) "value"
}
array(1) {
[0]=&gt;
array(2) {
[0]=&gt;
string(5) "value"
[1]=&gt;
string(5) "value"
}
}

    **Ejemplo #7 array_map()** - arrays asociativos



     Aunque **array_map()** no soporta directamente
     el uso de las claves de un array como entrada, esto puede ser simulado
     utilizando [array_keys()](#function.array-keys).

&lt;?php
$arr = [
    'v1' =&gt; 'First release',
    'v2' =&gt; 'Second release',
    'v3' =&gt; 'Third release',
];
// Nota: Anterior a 7.4.0, se debe utilizar la sintaxis más larga para las
// funciones anónimas en su lugar.
$callback = fn(string $k, string $v): string =&gt; "$k was the $v";
$result = array_map($callback, array_keys($arr), array_values($arr));
var_dump($result);
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(24) "v1 was the First release"
[1]=&gt;
string(25) "v2 was the Second release"
[2]=&gt;
string(24) "v3 was the Third release"
}

### Ver también

    - [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

    - [array_reduce()](#function.array-reduce) - Reduce itérativemente un array

    - [array_walk()](#function.array-walk) - Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

# array_merge

(PHP 4, PHP 5, PHP 7, PHP 8)

array_merge — Fusiona varios arrays en uno solo

### Descripción

**array_merge**([array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_merge()** combina los elementos
de uno o varios arrays añadiendo los valores
de uno al final del otro. El resultado es un array.

Si los arrays de entrada tienen claves comunes, entonces,
el valor final para esa clave sobrescribirá al anterior. Sin embargo,
si los arrays contienen claves numéricas, el valor
final **no sobrescribirá** el valor
original, sino que será añadido.

Las claves numéricas de los arrays de entrada serán
renumeradas en claves incrementadas partiendo de cero en el array fusionado.

### Parámetros

     arrays


       Lista de arrays variable para fusionar.





### Valores devueltos

Devuelve el array resultante.
Si se invoca sin argumentos, devuelve un [array](#language.types.array) vacío.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        Esta función puede ser ahora llamada sin parámetros.
        Anteriormente, al menos un parámetro era requerido.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_merge()**

&lt;?php
$array1 = array("color" =&gt; "red", 2, 4);
$array2 = array("a", "b", "color" =&gt; "green", "shape" =&gt; "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[color] =&gt; green
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; a
[3] =&gt; b
[shape] =&gt; trapezoid
[4] =&gt; 4
)

    **Ejemplo #2 Ejemplo simple con array_merge()**

&lt;?php
$array1 = array();
$array2 = array(1 =&gt; "data");
$result = array_merge($array1, $array2);
print_r($result);
?&gt;

     No se olvide de que los índices numéricos serán reindexados.

Array
(
[0] =&gt; data
)

     Si se desea añadir elementos del segundo array al primero
     sin sobrescribir o reindexar los elementos del primero,
     utilice el operador de unión +:

&lt;?php
$array1 = array(0 =&gt; 'zero_a', 2 =&gt; 'two_a', 3 =&gt; 'three_a');
$array2 = array(1 =&gt; 'one_b', 3 =&gt; 'three_b', 4 =&gt; 'four_b');
$result = $array1 + $array2;
var_dump($result);
?&gt;

     Las claves del primer array son preservadas. Si una clave existe
     en los 2 arrays, entonces el elemento del primero será utilizado
     y la clave correspondiente del segundo será ignorada.

array(5) {
[0]=&gt;
string(6) "zero_a"
[2]=&gt;
string(5) "two_a"
[3]=&gt;
string(7) "three_a"
[1]=&gt;
string(5) "one_b"
[4]=&gt;
string(6) "four_b"
}

    **Ejemplo #3 Ejemplo con array_merge()** con tipos no-array

&lt;?php
$beginning = 'foo';
$end = array(1 =&gt; 'bar');
$result = array_merge((array) $beginning, (array) $end);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; foo
[1] =&gt; bar
)

### Ver también

    - [array_merge_recursive()](#function.array-merge-recursive) - Combina uno o varios arrays juntos, de manera recursiva

    - [array_replace()](#function.array-replace) - Sustituye los elementos de un array por los de otros arrays

    - [array_combine()](#function.array-combine) - Crea un array a partir de dos otros arrays

    - los [operadores de array](#language.operators.array)

# array_merge_recursive

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

array_merge_recursive — Combina uno o varios arrays juntos, de manera recursiva

### Descripción

**array_merge_recursive**([array](#language.types.array) ...$arrays): [array](#language.types.array)

**array_merge_recursive()** reúne los
elementos de dos o más arrays juntos, añadiendo los
elementos de uno a continuación de los elementos del anterior.

Si los arrays pasados como argumentos tienen las mismas claves
(strings), los valores son entonces reunidos en un array, de manera recursiva,
de forma que, si uno de estos valores es un array
en sí mismo, la función lo reunirá con los valores de
la entrada actual. Sin embargo, si dos arrays tienen la misma
clave numérica, el último valor no sobrescribirá
el anterior, sino que será añadido al final
del array.

### Parámetros

     arrays


       Lista variable de arrays a reunir de manera recursiva.





### Valores devueltos

Un array de valores resultantes de la fusión de los argumentos.
Si es llamada sin argumentos, devuelve un [array](#language.types.array) vacío.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        Esta función puede ahora ser llamada sin parámetros.
        Anteriormente, al menos un parámetro era requerido.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_merge_recursive()**

&lt;?php
$ar1 = array("color" =&gt; array("favorite" =&gt; "red"), 5);
$ar2 = array(10, "color" =&gt; array("favorite" =&gt; "green", "blue"));
$result = array_merge_recursive($ar1, $ar2);
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[color] =&gt; Array
(
[favorite] =&gt; Array
(
[0] =&gt; red
[1] =&gt; green
)

            [0] =&gt; blue
        )

    [0] =&gt; 5
    [1] =&gt; 10

)

### Ver también

    - [array_merge()](#function.array-merge) - Fusiona varios arrays en uno solo

    - [array_replace_recursive()](#function.array-replace-recursive) - Sustituye recursivamente en el primer array los elementos de los otros arrays proporcionados

# array_multisort

(PHP 4, PHP 5, PHP 7, PHP 8)

array_multisort — Ordena los arrays multidimensionales

### Descripción

**array_multisort**(
    [array](#language.types.array) &amp;$array1,
    [mixed](#language.types.mixed) $array1_sort_order = SORT_ASC,
    [mixed](#language.types.mixed) $array1_sort_flags = SORT_REGULAR,
    [mixed](#language.types.mixed) ...$rest
): [bool](#language.types.boolean)

**array_multisort()** sirve para ordenar simultáneamente
varios arrays, o bien para ordenar un array multidimensional,
siguiendo una u otra de sus dimensiones.

Las claves asociativas ([string](#language.types.string)) serán mantenidas, pero
las claves numéricas serán reindexadas.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array1


       Un [array](#language.types.array) a ordenar.






     array1_sort_order


       El orden utilizado para ordenar el argumento anterior
       [array](#language.types.array). Puede ser la constante **[SORT_ASC](#constant.sort-asc)**
       para ordenar de forma ascendente, o la constante
       **[SORT_DESC](#constant.sort-desc)** para ordenar de forma descendente.




       Este argumento puede ser asociado con el parámetro
       array1_sort_flags o simplemente omitido,
       en cuyo caso, la constante **[SORT_ASC](#constant.sort-asc)** será utilizada.






     array1_sort_flags


       Opciones de ordenación del argumento [array](#language.types.array) anterior:




       Tipo de opciones de ordenación:



        -
         **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente (sin cambio de tipo)


        -
         **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


        -
         **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


        -

          **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como strings,
          basándose en la configuración local actual. La función utiliza las locales, y estas pueden ser modificadas
          utilizando la función [setlocale()](#function.setlocale)



        -

          **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings, utilizando
          el "orden natural", como lo hace la función [natsort()](#function.natsort)



        -

          **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado (con el operador OR) con
          **[SORT_STRING](#constant.sort-string)** o
          **[SORT_NATURAL](#constant.sort-natural)** para ordenar los strings sin tener en cuenta la casilla






       Este argumento puede ser asociado con el parámetro array1_sort_order
       o simplemente omitido, en cuyo caso, la constante **[SORT_REGULAR](#constant.sort-regular)** será utilizada.






     rest


       Más argumentos, opcionalmente seguidos por formas de ordenar y
       flags. Solo los elementos equivalentes en los arrays anteriores
       son comparados. En otras palabras, el ordenamiento es lexicográfico.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ordenar varios arrays**

&lt;?php
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);

var_dump($ar1);
var_dump($ar2);
?&gt;

     En este ejemplo, después del ordenamiento, el primer
     array contiene 0, 10, 100, 100. El segundo array
     contiene 4, 1, 2, 3. Las entradas del segundo array
     correspondientes a los valores duplicados del primer
     array (100 y 100), también son ordenadas.

array(4) {
[0]=&gt; int(0)
[1]=&gt; int(10)
[2]=&gt; int(100)
[3]=&gt; int(100)
}
array(4) {
[0]=&gt; int(4)
[1]=&gt; int(1)
[2]=&gt; int(2)
[3]=&gt; int(3)
}

    **Ejemplo #2 Ordenar un array multidimensional**

&lt;?php
$ar = array(
       array("10", 11, 100, 100, "a"),
       array(   1,  2, "2",   3,   1)
      );
array_multisort($ar[0], SORT_ASC, SORT_STRING,
$ar[1], SORT_NUMERIC, SORT_DESC);
var_dump($ar);
?&gt;

     En este ejemplo, después del ordenamiento, el primer array contiene
     "10", 100, 100, 11, "a" (orden alfabético, orden ascendente); El
     segundo array contiene 1, 3, "2", 2, 1 (orden
     numérico, orden descendente).

array(2) {
[0]=&gt; array(5) {
[0]=&gt; string(2) "10"
[1]=&gt; int(100)
[2]=&gt; int(100)
[3]=&gt; int(11)
[4]=&gt; string(1) "a"
}
[1]=&gt; array(5) {
[0]=&gt; int(1)
[1]=&gt; int(3)
[2]=&gt; string(1) "2"
[3]=&gt; int(2)
[4]=&gt; int(1)
}
}

    **Ejemplo #3 Ordenar los resultados de una base de datos**



     En este ejemplo, cada elemento del array data
     representa una fila de la tabla. Este tipo de datos es típico de un
     registro de base de datos.




     Ejemplo de datos:

volume | edition
-------+--------
67 | 2
86 | 1
85 | 6
98 | 2
86 | 6
67 | 7

     Los datos están en forma de array, llamado data.
     Esto es generalmente el resultado, por ejemplo, de la función
     [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc).




     En este ejemplo, vamos a ordenar la columna
     volume en orden descendente, y
     la columna edition en orden ascendente.




     Tenemos un array de filas, pero
     **array_multisort()** requiere un array de columnas,
     por lo tanto utilizamos el siguiente código para obtener las columnas y
     así realizar el ordenamiento.

&lt;?php
// Los datos son creados recorriendo mysqli_fetch_assoc:
$data[] = array('volume' =&gt; 67, 'edition' =&gt; 2);
$data[] = array('volume' =&gt; 86, 'edition' =&gt; 1);
$data[] = array('volume' =&gt; 85, 'edition' =&gt; 6);
$data[] = array('volume' =&gt; 98, 'edition' =&gt; 2);
$data[] = array('volume' =&gt; 86, 'edition' =&gt; 6);
$data[] = array('volume' =&gt; 67, 'edition' =&gt; 7);

// Obtiene una lista de columnas
foreach ($data as $key =&gt; $row) {
    $volume[$key] = $row['volume'];
    $edition[$key] = $row['edition'];
}

// Puede utilizarse array_column() en lugar del código anterior
$volume  = array_column($data, 'volume');
$edition = array_column($data, 'edition');

// Ordena los datos por volume descendente, edition ascendente
// Añade $data como último parámetro, para ordenar por la clave común
array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $data);

// Recorre los datos y muestra los valores ordenados para cada columna
echo 'volume | edition', PHP_EOL;
echo '-------+--------', PHP_EOL;
for ($i = 0; $i &lt; count($data); $i++) {
     printf("%6d | %7d\n", $volume[$i], $edition[$i]);
}
?&gt;

     El conjunto de registros ahora está ordenado y se ve así:

volume | edition
-------+--------
98 | 2
86 | 1
86 | 6
85 | 6
67 | 2
67 | 7

    **Ejemplo #4 Ordenamiento no sensible a la casilla**



     **[SORT_STRING](#constant.sort-string)** y
     **[SORT_REGULAR](#constant.sort-regular)** son sensibles a la casilla, los strings
     que comienzan con una letra mayúscula vendrán antes
     que los strings que comienzan con una letra minúscula.




     Para realizar un ordenamiento no sensible a la casilla, realice el ordenamiento
     sobre una copia en minúsculas de las columnas del array original.

&lt;?php
$array = array('Alpha', 'atomic', 'Beta', 'bank');
$array_lowercase = array_map('strtolower', $array);

array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $array);

print_r($array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Alpha
[1] =&gt; atomic
[2] =&gt; bank
[3] =&gt; Beta
)

### Ver también

    - [usort()](#function.usort) - Ordena un array utilizando una función de comparación

    - Las funciones de [ordenación de arrays](#array.sorting)

# array_pad

(PHP 4, PHP 5, PHP 7, PHP 8)

array_pad — Completa un array con un valor hasta la longitud especificada

### Descripción

**array_pad**([array](#language.types.array) $array, [int](#language.types.integer) $length, [mixed](#language.types.mixed) $value): [array](#language.types.array)

**array_pad()** devuelve una copia del array
array completado hasta el tamaño de
length con el valor
value. Si
length es positivo, entonces el array
se completa a la derecha, si es negativo, se completa a la izquierda.
Si el valor absoluto de length es más
pequeño que el tamaño del array array,
entonces el array no se completa.

### Parámetros

     array


       Array inicial de valores a completar.






     length


       Nueva longitud del array.






     value


       Valor a insertar si el argumento array
       es más pequeño que el argumento length.





### Valores devueltos

Devuelve una copia del array
array completado hasta el tamaño de
length con el valor
value. Si
length es positivo, entonces el array
se completa a la derecha, si es negativo, se completa a la izquierda.
Si el valor absoluto de length es más
pequeño que el tamaño del array array,
entonces el array no se completa.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Antes de la versión 8.3, solo podían añadirse 1048576 elementos a la vez.
        Ahora, esto está limitado únicamente por el tamaño máximo de un array.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_pad()**

&lt;?php
$input = array(12, 10, 9);

$result = array_pad($input, 5, 0);
// El resultado es : array(12, 10, 9, 0, 0)
echo join(', ', $result), PHP_EOL;

$result = array_pad($input, -7, -1);
// El resultado es : array(-1, -1, -1, -1, 12, 10, 9)
echo join(', ', $result), PHP_EOL;

$result = array_pad($input, 2, "noop");
// no se completa
echo join(', ', $result), PHP_EOL;
?&gt;

### Ver también

    - [array_fill()](#function.array-fill) - Rellena un array con un mismo valor

    - [range()](#function.range) - Crea un array que contiene un intervalo de elementos

# array_pop

(PHP 4, PHP 5, PHP 7, PHP 8)

array_pop — Desapila un elemento del final de un array

### Descripción

**array_pop**([array](#language.types.array) &amp;$array): [mixed](#language.types.mixed)

**array_pop()** desapila y devuelve el valor del último
elemento del array array,
acortándolo en un elemento.

**Nota**:
Esta función reinicia el puntero al inicio del array de entrada (equivalente a [reset()](#function.reset)).

### Parámetros

     array


       El array del cual se recupera el valor.





### Valores devueltos

Devuelve el valor del último elemento del array array.
Si array está vacío,
**[null](#constant.null)** será devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_pop()**

&lt;?php
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);
?&gt;

     Después de esto, $stack tendrá solo 3 elementos:

Array
(
[0] =&gt; orange
[1] =&gt; banana
[2] =&gt; apple
)

     y raspberry será asignado a
     $fruit.

### Ver también

    - [array_push()](#function.array-push) - Apila uno o más elementos al final de un array

    - [array_shift()](#function.array-shift) - Despila un elemento al principio de un array

    - [array_unshift()](#function.array-unshift) - Empila uno o más elementos al inicio de un array

# array_product

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

array_product — Calcula el producto de los valores del array

### Descripción

**array_product**([array](#language.types.array) $array): [int](#language.types.integer)|[float](#language.types.float)

**array_product()** devuelve el producto de los
valores del array array.

### Parámetros

     array


       El array.





### Valores devueltos

Devuelve el producto, en forma de [int](#language.types.integer) o de [float](#language.types.float).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Emite ahora un **[E_WARNING](#constant.e-warning)** cuando los valores de tipo array
        no pueden ser convertidos en [int](#language.types.integer) o [float](#language.types.float).
        Anteriormente, los arrays y los objetos eran ignorados mientras que todos los demás valores eran convertidos en [int](#language.types.integer).
        Además, los objetos que definen una conversión numérica (por ejemplo, [GMP](#class.gmp)) son ahora convertidos en lugar de ser ignorados.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_product()**

&lt;?php

$a = array(2, 4, 6, 8);
echo "producto(a) = " . array_product($a) . "\n";
echo "producto(array()) = " . array_product(array()) . "\n";

?&gt;

    El ejemplo anterior mostrará:

producto(a) = 384
producto(array()) = 1

# array_push

(PHP 4, PHP 5, PHP 7, PHP 8)

array_push — Apila uno o más elementos al final de un array

### Descripción

**array_push**([array](#language.types.array) &amp;$array, [mixed](#language.types.mixed) ...$values): [int](#language.types.integer)

**array_push()** considera array
como una pila, y apila las variables values al final de array.
La longitud del array array aumenta en consecuencia.
Esto tiene el mismo efecto que:

&lt;?php
$array[] = $var;
?&gt;

repetido para cada valor.

**Nota**:

    Si se utiliza la función **array_push()** para añadir un
    elemento a un array, es preferible reemplazarla por el operador
    $array[] =  que evita el paso por una función.

**Nota**:

    **array_push()** emitirá una alerta si el primer argumento
    no es un array. Esto difiere del comportamiento de
    $var[] donde un nuevo array era creado, anteriormente a PHP 7.1.0.

### Parámetros

     array


       El array de entrada.






     values


       El valor a insertar al final del array
       array.





### Valores devueltos

Devuelve el nuevo número de elementos en el array.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        Esta función puede ahora ser llamada con un solo parámetro.
        Anteriormente, se requerían al menos dos parámetros.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_push()**

&lt;?php
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; orange
[1] =&gt; banana
[2] =&gt; apple
[3] =&gt; raspberry
)

### Ver también

    - [array_pop()](#function.array-pop) - Desapila un elemento del final de un array

    - [array_shift()](#function.array-shift) - Despila un elemento al principio de un array

    - [array_unshift()](#function.array-unshift) - Empila uno o más elementos al inicio de un array

# array_rand

(PHP 4, PHP 5, PHP 7, PHP 8)

array_rand — Toma una o varias claves, al azar en un array

### Descripción

**array_rand**([array](#language.types.array) $array, [int](#language.types.integer) $num = 1): [int](#language.types.integer)|[string](#language.types.string)|[array](#language.types.array)

Selecciona uno o varios valores al azar en un array
y devuelve la o las claves de estos valores.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     array


       El array de entrada.
       No puede estar vacío.






     num


       Especifica el número de entradas que se desean recuperar.
       Debe ser mayor a cero e inferior o igual a la longitud de array.





### Valores devueltos

Cuando se recupera una sola entrada, la función
**array_rand()** devuelve la clave de una entrada elegida
al azar. De lo contrario, se devolverá un array de claves de entradas aleatorias. Esto permite hacer una selección al azar de claves,
o bien de valores. Si se devuelven varias claves, entonces lo serán en el orden en que estaban en el array original.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror) si array está vacío,
o si num está fuera de rango.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        **array_rand()** ahora lanza una [ValueError](#class.valueerror)
        si num está fuera de rango; anteriormente, se generaba un
        **[E_WARNING](#constant.e-warning)** y la función devolvía **[null](#constant.null)**.




       8.0.0

        **array_rand()** ahora lanza una [ValueError](#class.valueerror)
        si array está vacío; anteriormente, se generaba un
        **[E_WARNING](#constant.e-warning)** y la función devolvía **[null](#constant.null)**.




       7.1.0

        El algoritmo
         interno de generación aleatoria [ha sido modificado](#migration71.incompatible.rand-srand-aliases) para usar el
         generador de números aleatorios [» 
         Mersenne Twister](http://www.math.sci.hiroshima-u.ac.jp/~m-mat/MT/emt.html) en lugar de la función aleatoria libc





### Ejemplos

    **Ejemplo #1 Ejemplo con array_rand()**

&lt;?php
$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";
?&gt;

### Ver también

    - [Random\Randomizer::pickArrayKeys()](#random-randomizer.pickarraykeys) - Selecciona claves de array aleatorias

    - [Random\Randomizer::shuffleArray()](#random-randomizer.shufflearray) - Devuelve una permutación de un array

# array_reduce

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

array_reduce — Reduce itérativemente un array

### Descripción

**array_reduce**([array](#language.types.array) $array, [callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = **[null](#constant.null)**): [mixed](#language.types.mixed)

**array_reduce()** aplica itérativemente
la función callback a los elementos del
array array, de manera que se reduce el
array a un valor simple.

### Parámetros

     array


       El array de entrada.






     callback


       callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $item): [mixed](#language.types.mixed)



        carry


          Contiene el valor devuelto de la iteración previa; en el caso de
          la primera iteración, será el valor del parámetro
          initial.






        item


          Contiene el valor de la iteración actual.









     initial


       Si el argumento opcional initial
       está disponible, será utilizado para inicializar el proceso,
       o bien como valor final si el array está vacío.





### Valores devueltos

Devuelve el valor resultante.

Si el array está vacío y el parámetro initial
no es pasado, **array_reduce()** devuelve **[null](#constant.null)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_reduce()**

&lt;?php
function sum($carry, $item)
{
$carry += $item;
return $carry;
}

function product($carry, $item)
{
$carry \*= $item;
return $carry;
}

$a = array(1, 2, 3, 4, 5);
$x = array();

var_dump(array_reduce($a, "sum")); // int(15)
var_dump(array_reduce($a, "product", 10)); // int(1200), ya que: 10*1*2*3*4\*5
var_dump(array_reduce($x, "sum", "No data to reduce")); // string(17) "No data to reduce"
?&gt;

### Ver también

    - [array_filter()](#function.array-filter) - Filtra los elementos de un array mediante una función de retrollamada

    - [array_map()](#function.array-map) - Aplica una función sobre los elementos de un array

    - [array_unique()](#function.array-unique) - Elimina los valores duplicados de un array

    - [array_count_values()](#function.array-count-values) - Cuenta las ocurrencias de cada valor distinto en un array

# array_replace

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

array_replace — Sustituye los elementos de un array por los de otros arrays

### Descripción

**array_replace**([array](#language.types.array) $array, [array](#language.types.array) ...$replacements): [array](#language.types.array)

**array_replace()** crea un nuevo array y asigna elementos para cada clave en cada uno de los arrays proporcionados. Si una clave aparece en varios arrays de entrada, se utilizará el valor del array de entrada más a la derecha.

**array_replace()** no trata los elementos de manera recursiva, sustituye el valor entero para cada clave cuando realiza una sustitución.

### Parámetros

     array


       El array en el que se sustituyen los elementos.






     replacements


       Arrays desde los cuales se extraerán los elementos. Los valores de los arrays futuros sobrescribirán los valores anteriores.





### Valores devueltos

Devuelve un [array](#language.types.array).

### Ejemplos

    **Ejemplo #1 Ejemplo con array_replace()**

&lt;?php
$base = array("orange", "banana", "apple", "raspberry");
$replacements = array(0 =&gt; "pineapple", 4 =&gt; "cherry");
$replacements2 = array(0 =&gt; "grape");

$basket = array_replace($base, $replacements, $replacements2);
var_dump($basket);
?&gt;

    El ejemplo anterior mostrará:

array(5) {
[0]=&gt;
string(5) "grape"
[1]=&gt;
string(6) "banana"
[2]=&gt;
string(5) "apple"
[3]=&gt;
string(9) "raspberry"
[4]=&gt;
string(6) "cherry"
}

    **Ejemplo #2 Ejemplo de cómo se manejan los arrays anidados**

&lt;?php
$base = [ 'citrus' =&gt; [ 'orange', 'lemon' ], 'pome' =&gt; [ 'apple' ] ];
$replacements = [ 'citrus' =&gt; [ 'grapefruit' ] ];
$replacements2 = [ 'citrus' =&gt; [ 'kumquat', 'citron' ], 'pome' =&gt; [ 'loquat' ] ];

$basket = array_replace($base, $replacements, $replacements2);
var_dump($basket);
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["citrus"]=&gt;
array(2) {
[0]=&gt;
string(7) "kumquat"
[1]=&gt;
string(6) "citron"
}
["pome"]=&gt;
array(1) {
[0]=&gt;
string(6) "loquat"
}
}

### Ver también

    - [array_replace_recursive()](#function.array-replace-recursive) - Sustituye recursivamente en el primer array los elementos de los otros arrays proporcionados

    - [array_merge()](#function.array-merge) - Fusiona varios arrays en uno solo

# array_replace_recursive

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

array_replace_recursive — Sustituye recursivamente en el primer array los elementos de los otros arrays proporcionados

### Descripción

**array_replace_recursive**([array](#language.types.array) $array, [array](#language.types.array) ...$replacements): [array](#language.types.array)

**array_replace_recursive()** sustituye los valores del array
array con los valores de las mismas claves provenientes de los
arrays siguientes. Si una clave del primer array existe en uno de los
arrays siguientes, su valor será sustituido. Si la clave no existe
en el primer array, será creada. Si la clave solo existe en
el primer array, será dejada intacta. Si varios arrays
son pasados como argumentos de sustitución, serán tratados en orden.

**array_replace_recursive()** es recursiva: si un valor es
un array, la misma función de sustitución le será aplicada.

Si el valor en el primer array es escalar, será sustituido
por el valor del segundo array, ya sea un escalar o un
array. Si los valores del primer y segundo array
son ambos arrays, **array_replace_recursive()** sustituirá
los valores recursivamente.

### Parámetros

     array


       El array en el cual los elementos son sustituidos.






     replacements


       Arrays desde los cuales los elementos
       pueden ser extraídos.





### Valores devueltos

Devuelve un [array](#language.types.array).

### Ejemplos

    **Ejemplo #1 Ejemplo con array_replace_recursive()**

&lt;?php
$base = array('citrus' =&gt; array("orange"), 'berries' =&gt; array("blackberry", "raspberry"));
$replacements = array('citrus' =&gt; array('pineapple'), 'berries' =&gt; array('blueberry'));

$basket = array_replace_recursive($base, $replacements);
print_r($basket);

$basket = array_replace($base, $replacements);
print_r($basket);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[citrus] =&gt; Array
(
[0] =&gt; pineapple
)

    [berries] =&gt; Array
        (
            [0] =&gt; blueberry
            [1] =&gt; raspberry
        )

)
Array
(
[citrus] =&gt; Array
(
[0] =&gt; pineapple
)

    [berries] =&gt; Array
        (
            [0] =&gt; blueberry
        )

)

    **Ejemplo #2 Ejemplo con array_replace_recursive()** y la recursividad

&lt;?php
$base = array('citrus' =&gt; array("orange") , 'berries' =&gt; array("blackberry", "raspberry"), 'others' =&gt; 'banana' );
$replacements = array('citrus' =&gt; 'pineapple', 'berries' =&gt; array('blueberry'), 'others' =&gt; array('litchis'));
$replacements2 = array('citrus' =&gt; array('pineapple'), 'berries' =&gt; array('blueberry'), 'others' =&gt; 'litchis');

$basket = array_replace_recursive($base, $replacements, $replacements2);
print_r($basket);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[citrus] =&gt; Array
(
[0] =&gt; pineapple
)

    [berries] =&gt; Array
        (
            [0] =&gt; blueberry
            [1] =&gt; raspberry
        )

    [others] =&gt; litchis

)

### Ver también

    - [array_replace()](#function.array-replace) - Sustituye los elementos de un array por los de otros arrays

    - [array_merge_recursive()](#function.array-merge-recursive) - Combina uno o varios arrays juntos, de manera recursiva

# array_reverse

(PHP 4, PHP 5, PHP 7, PHP 8)

array_reverse — Invierte el orden de los elementos de un array

### Descripción

**array_reverse**([array](#language.types.array) $array, [bool](#language.types.boolean) $preserve_keys = **[false](#constant.false)**): [array](#language.types.array)

**array_reverse()** devuelve un nuevo array
que contiene los mismos elementos que array,
pero en orden inverso.

### Parámetros

     array


       El array de entrada.






     preserve_keys


       Si se establece en **[true](#constant.true)**, las claves numéricas serán preservadas.
       Las claves no numéricas no se verán afectadas por esta
       configuración y siempre serán preservadas.





### Valores devueltos

Devuelve el array en orden inverso.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_reverse()**

&lt;?php
$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
print_r($reversed);
print_r($preserved);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; php
[1] =&gt; 4
[2] =&gt; Array
(
[0] =&gt; green
[1] =&gt; red
)

)
Array
(
[0] =&gt; Array
(
[0] =&gt; green
[1] =&gt; red
)

    [1] =&gt; 4
    [2] =&gt; php

)
Array
(
[2] =&gt; Array
(
[0] =&gt; green
[1] =&gt; red
)

    [1] =&gt; 4
    [0] =&gt; php

)

### Ver también

    - [array_flip()](#function.array-flip) - Reemplaza las claves por los valores, y los valores por las claves

# array_search

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

array_search — Busca en un array la primera clave asociada al valor

### Descripción

**array_search**([mixed](#language.types.mixed) $needle, [array](#language.types.array) $haystack, [bool](#language.types.boolean) $strict = **[false](#constant.false)**): [int](#language.types.integer)|[string](#language.types.string)|[false](#language.types.singleton)

Busca needle
en haystack.

### Parámetros

     needle


       El valor a buscar.



      **Nota**:



        Si needle es un [string](#language.types.string), la
        comparación se realiza respetando la casilla.







     haystack


       El array.






     strict


       Si el tercer argumento strict es
       **[true](#constant.true)**, entonces **array_search()** buscará
       elementos *idénticos* en
       haystack. Esto significa que esta función
       realizará una [comparación estricta del tipo](#language.types)
       de needle en haystack,
       y que los objetos provienen de la misma instancia.





### Valores devueltos

Devuelve la clave para needle si es encontrada
en el array, **[false](#constant.false)** en caso contrario.

Si needle es encontrado más de una vez en
haystack, la primera clave coincidente es
devuelta. Para encontrar todas las claves correspondientes, utilice en su lugar
la función [array_keys()](#function.array-keys) con el argumento opcional
filter_value.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_search()**

&lt;?php
$array = array(0 =&gt; 'blue', 1 =&gt; 'red', 2 =&gt; 'green', 3 =&gt; 'red');

$key = array_search('green', $array); // $key = 2;
print_r($key);

$key = array_search('red', $array);   // $key = 1;
print_r($key);
?&gt;

### Ver también

    - [array_keys()](#function.array-keys) - Devuelve todas las claves o un conjunto de las claves de un array

    - [array_values()](#function.array-values) - Devuelve todos los valores de un array

    - [array_key_exists()](#function.array-key-exists) - Verifica si una clave existe en un array

    - [in_array()](#function.in-array) - Indica si un valor pertenece a un array

# array_shift

(PHP 4, PHP 5, PHP 7, PHP 8)

array_shift — Despila un elemento al principio de un array

### Descripción

**array_shift**([array](#language.types.array) &amp;$array): [mixed](#language.types.mixed)

**array_shift()** extrae el primer valor del [array](#language.types.array)
array y lo devuelve, acortando
array en un elemento, y desplazando todos los elementos
hacia abajo. Todas las claves numéricas serán modificadas para comenzar en
cero mientras que las claves literales no serán afectadas.

**Nota**:
Esta función reinicia el puntero al inicio del array de entrada (equivalente a [reset()](#function.reset)).

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Devuelve el valor despilado, o **[null](#constant.null)** si el array está vacío o si el valor de entrada no es un array.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_shift()**

&lt;?php
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; banana
[1] =&gt; apple
[2] =&gt; raspberry
)

     y orange ha sido colocado en
     $fruit.

### Ver también

    - [array_unshift()](#function.array-unshift) - Empila uno o más elementos al inicio de un array

    - [array_push()](#function.array-push) - Apila uno o más elementos al final de un array

    - [array_pop()](#function.array-pop) - Desapila un elemento del final de un array

# array_slice

(PHP 4, PHP 5, PHP 7, PHP 8)

array_slice — Extrae una porción de array

### Descripción

**array_slice**(
    [array](#language.types.array) $array,
    [int](#language.types.integer) $offset,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [bool](#language.types.boolean) $preserve_keys = **[false](#constant.false)**
): [array](#language.types.array)

**array_slice()** devuelve una serie de elementos
del array array comenzando en el
offset offset y representando
length elementos.

### Parámetros

     array


       El array de entrada.






     offset


       Si offset es no negativo, la secuencia
       comenzará en esta posición en el array array.




       Si offset es negativo, la secuencia
       comenzará en la posición offset, pero comenzando
       desde el final del array array.



      **Nota**:



        El parámetro offset indica la posición
        en el array, no la clave.







     length


       Si length es proporcionado y positivo, entonces
       la secuencia tendrá hasta ese número de elementos.




       Si el array es más corto que length,
       entonces solo los elementos del array disponibles estarán presentes.




       Si length es proporcionado y negativo, entonces
       la secuencia excluirá ese número de elementos del final del array.




       Si es omitido, la secuencia tendrá todo
       desde la posición offset hasta el final de
       array.






     preserve_keys

      **Nota**:



        Por omisión **array_slice()** reordenará y reinicializará
        los índices enteros del array.
        Este comportamiento puede ser modificado definiendo el parámetro
       preserve_keys a **[true](#constant.true)**.
       Las claves en forma de string son siempre conservadas,
        independientemente de este parámetro.






### Valores devueltos

Devuelve la porción del array. Si la posición es mayor
que el tamaño del array, un array vacío es devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_slice()**

&lt;?php
$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2); // devuelve "c", "d", y "e"
$output = array_slice($input, -2, 1); // devuelve "d"
$output = array_slice($input, 0, 3); // devuelve "a", "b", y "c"

// note las claves de índice diferentes
print_r(array_slice($input, 2, -1));
print_r(array_slice($input, 2, -1, true));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; c
[1] =&gt; d
)
Array
(
[2] =&gt; c
[3] =&gt; d
)

    **Ejemplo #2 array_slice()** y basado en un array

&lt;?php
$input = array(1 =&gt; "a", "b", "c", "d", "e");
print_r(array_slice($input, 1, 2));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; b
[1] =&gt; c
)

    **Ejemplo #3 array_slice()** y array con claves mixtas

&lt;?php
$ar = array('a'=&gt;'apple', 'b'=&gt;'banana', '42'=&gt;'pear', 'd'=&gt;'orange');
print_r(array_slice($ar, 0, 3));
print_r(array_slice($ar, 0, 3, true));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; apple
[b] =&gt; banana
[0] =&gt; pear
)
Array
(
[a] =&gt; apple
[b] =&gt; banana
[42] =&gt; pear
)

### Ver también

    - [array_chunk()](#function.array-chunk) - Divide un array en arrays de menor tamaño

    - [array_splice()](#function.array-splice) - Elimina y reemplaza una porción de array

    - [unset()](#function.unset) - unset destruye una variable

# array_splice

(PHP 4, PHP 5, PHP 7, PHP 8)

array_splice — Elimina y reemplaza una porción de array

### Descripción

**array_splice**(
    [array](#language.types.array) &amp;$array,
    [int](#language.types.integer) $offset,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [mixed](#language.types.mixed) $replacement = []
): [array](#language.types.array)

**array_splice()** elimina los elementos
designados por offset y
length del array array y
los reemplaza por los elementos del array
replacement, si este último es proporcionado.

**Nota**:

    Las claves numéricas en array no son preservadas.

**Nota**:

    Si replacement no es un array, se convertirá en uno por [conversión](#language.types.array.casting)
    (i.e. (array) $replacement). Esto puede producir resultados inesperados al utilizar un objeto o **[null](#constant.null)** como
    argumento replacement.

### Parámetros

     array


       El array de entrada.






     offset


       Si offset es positivo, el inicio de la sección
       a eliminar estará en esta posición partiendo del inicio del array
       array.




       Si offset es negativo, el inicio de la sección
       a eliminar estará en esta posición partiendo del final del array
       array.






     length


       Si length es omitido, todos los elementos del array
       desde la posición offset hasta el final del
       array serán eliminados.




       Si length es proporcionado y positivo,
       entonces tantos elementos serán eliminados.




       Si length es proporcionado y negativo,
       entonces tantos elementos serán eliminados del final del array.




       Si length es proporcionado y vale cero,
       entonces ningún elemento será eliminado.



      **Sugerencia**

        Para eliminar todo desde la posición offset
        hasta el final del array cuando replacement
        también es proporcionado, utilizar count($input) para length.







     replacement


       Si el [array](#language.types.array) replacement es proporcionado, entonces los
       elementos eliminados son reemplazados por los elementos de este [array](#language.types.array).




       Si el offset y length
       son tales que nada es eliminado, entonces los elementos del [array](#language.types.array)
       replacement son insertados en la posición
       offset.



      **Nota**:



        Las claves del [array](#language.types.array) replacement no son preservadas.





       Si replacement es solo un elemento no es necesario
       rodear el elemento con array() o corchetes,
       a menos que el elemento sea él mismo un array, un objeto o **[null](#constant.null)**.





### Valores devueltos

Retorna un [array](#language.types.array) conteniendo los elementos extraídos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplos con array_splice()**

&lt;?php
$input = array("red", "green", "blue", "yellow");
array_splice($input, 2);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, -1);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, count($input), "orange");
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, -1, 1, array("black", "maroon"));
var_dump($input);
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
string(3) "red"
[1]=&gt;
string(5) "green"
}
array(2) {
[0]=&gt;
string(3) "red"
[1]=&gt;
string(6) "yellow"
}
array(2) {
[0]=&gt;
string(3) "red"
[1]=&gt;
string(6) "orange"
}
array(5) {
[0]=&gt;
string(3) "red"
[1]=&gt;
string(5) "green"
[2]=&gt;
string(4) "blue"
[3]=&gt;
string(5) "black"
[4]=&gt;
string(6) "maroon"
}

    **Ejemplo #2 Declaraciones equivalentes a ejemplos de array_splice()** diversos



     Las declaraciones siguientes son equivalentes:

&lt;?php

// añadir dos elementos a $input
array_push($input, $x, $y);
array_splice($input, count($input), 0, array($x, $y));

// eliminar el último elemento de $input
array_pop($input);
array_splice($input, -1);

// eliminar el primer elemento de $input
array_shift($input);
array_splice($input, 0, 1);

// insertar dos elementos al inicio de $input
array_unshift($input, $x, $y);
array_splice($input, 0, 0, array($x, $y));

// reemplazar el valor en $input en el índice $x
$input[$x] = $y; // para arrays donde las claves son iguales al offset
array_splice($input, $x, 1, $y);

?&gt;

### Ver también

    - [array_merge()](#function.array-merge) - Fusiona varios arrays en uno solo

    - [array_slice()](#function.array-slice) - Extrae una porción de array

    - [unset()](#function.unset) - unset destruye una variable

# array_sum

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

array_sum — Calcula la suma de los valores del array

### Descripción

**array_sum**([array](#language.types.array) $array): [int](#language.types.integer)|[float](#language.types.float)

**array_sum()** devuelve la suma de los
valores del array array.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Devuelve la suma de los valores, en forma de un [int](#language.types.integer) o de un [float](#language.types.float) 0 si el array está vacío.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Emite ahora un **[E_WARNING](#constant.e-warning)** cuando los valores de tipo array
        no pueden ser convertidos en [int](#language.types.integer) o [float](#language.types.float).
        Anteriormente, los arrays y los objetos eran ignorados mientras que todos los demás valores eran convertidos en [int](#language.types.integer).
        Además, los objetos que definen una conversión numérica (por ejemplo, [GMP](#class.gmp)) son ahora convertidos en lugar de ser ignorados.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_sum()**

&lt;?php
$a = array(2, 4, 6, 8);
echo "sum(a) = " . array_sum($a) . "\n";

$b = array("a" =&gt; 1.2, "b" =&gt; 2.3, "c" =&gt; 3.4);
echo "sum(b) = " . array_sum($b) . "\n";
?&gt;

    El ejemplo anterior mostrará:

sum(a) = 20
sum(b) = 6.9

# array_udiff

(PHP 5, PHP 7, PHP 8)

array_udiff — Calcula la diferencia entre dos arrays utilizando una función de retrollamada

### Descripción

**array_udiff**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $value_compare_func): [array](#language.types.array)

Calcula la diferencia entre dos arrays utilizando una función de retrollamada.
Esta función actúa como la función [array_diff()](#function.array-diff)
que utiliza una función interna para comparar los datos.

### Parámetros

     array


       El primer array.







     arrays


       Arrays a comparar contra







     value_compare_func


       La función de comparación.





La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

### Valores devueltos

Retorna un array que contiene todas las valores del array
array que no están presentes en ningún
otro argumento.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_udiff()** utilizando objetos stdClass

&lt;?php
// Arrays a comparar
$array1 = array(new stdClass, new stdClass,
new stdClass, new stdClass,
);

$array2 = array(
new stdClass, new stdClass,
);

// Define algunas propiedades para cada objeto
$array1[0]-&gt;width = 11; $array1[0]-&gt;height = 3;
$array1[1]-&gt;width = 7; $array1[1]-&gt;height = 1;
$array1[2]-&gt;width = 2; $array1[2]-&gt;height = 9;
$array1[3]-&gt;width = 5; $array1[3]-&gt;height = 7;

$array2[0]-&gt;width = 7;  $array2[0]-&gt;height = 5;
$array2[1]-&gt;width = 9; $array2[1]-&gt;height = 2;

function compare_by_area($a, $b) {
$areaA = $a-&gt;width _ $a-&gt;height;
$areaB = $b-&gt;width _ $b-&gt;height;

    if ($areaA &lt; $areaB) {
        return -1;
    } elseif ($areaA &gt; $areaB) {
        return 1;
    } else {
        return 0;
    }

}

print_r(array_udiff($array1, $array2, 'compare_by_area'));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; stdClass Object
(
[width] =&gt; 11
[height] =&gt; 3
)

    [1] =&gt; stdClass Object
        (
            [width] =&gt; 7
            [height] =&gt; 1
        )

)

    **Ejemplo #2 Ejemplo con array_udiff()** utilizando objetos DateTime

&lt;?php
class MyCalendar {
public $free = array();
public $booked = array();

    public function __construct($week = 'now') {
        $start = new DateTime($week);
        $start-&gt;modify('Monday this week midnight');
        $end = clone $start;
        $end-&gt;modify('Friday this week midnight');
        $interval = new DateInterval('P1D');
        foreach (new DatePeriod($start, $interval, $end) as $freeTime) {
            $this-&gt;free[] = $freeTime;
        }
    }

    public function bookAppointment(DateTime $date, $note) {
        $this-&gt;booked[] = array('date' =&gt; $date-&gt;modify('midnight'), 'note' =&gt; $note);
    }

    public function checkAvailability() {
        return array_udiff($this-&gt;free, $this-&gt;booked, array($this, 'customCompare'));
    }

    public function customCompare($free, $booked) {
        if (is_array($free)) $a = $free['date'];
        else $a = $free;
        if (is_array($booked)) $b = $booked['date'];
        else $b = $booked;
        if ($a == $b) {
            return 0;
        } elseif ($a &gt; $b) {
            return 1;
        } else {
            return -1;
        }
    }

}

// Crea un calendario para las citas semanales
$myCalendar = new MyCalendar;

// Registra algunas citas para esta semana
$myCalendar-&gt;bookAppointment(new DateTime('Monday this week'), "Cleaning GoogleGuy's apartment.");
$myCalendar-&gt;bookAppointment(new DateTime('Wednesday this week'), "Going on a snowboarding trip.");
$myCalendar-&gt;bookAppointment(new DateTime('Friday this week'), "Fixing buggy code.");

// Verifica la disponibilidad en días, comparando las fechas $booked con las fechas $free
echo "Estoy disponible en los siguientes días esta semana...\n\n";
foreach ($myCalendar-&gt;checkAvailability() as $free) {
    echo $free-&gt;format('l'), "\n";
}
echo "\n\n";
echo "Estoy ocupado en los siguientes días esta semana...\n\n";
foreach ($myCalendar-&gt;booked as $booked) {
echo $booked['date']-&gt;format('l'), ": ", $booked['note'], "\n";
}
?&gt;

    El ejemplo anterior mostrará:

Estoy disponible en los siguientes días esta semana...

Tuesday
Thursday

Estoy ocupado en los siguientes días esta semana...

Monday: Cleaning GoogleGuy's apartment.
Wednesday: Going on a snowboarding trip.
Friday: Fixing buggy code.

### Notas

**Nota**:

    Tenga en cuenta que esta función solo verifica una dimensión de un array multidimensional. Por supuesto, se puede probar una dimensión particular utilizando, por ejemplo,
    array_udiff($array1[0], $array2[0],
    "data_compare_func");.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_udiff_assoc

(PHP 5, PHP 7, PHP 8)

array_udiff_assoc — Calcula la diferencia entre arrays con verificación de índices,
compara los datos con una función de retrollamada

### Descripción

**array_udiff_assoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $value_compare_func): [array](#language.types.array)

Calcula la diferencia entre arrays con verificación de índices,
compara los datos con una función de retrollamada.

**Nota**:

    Tenga en cuenta que esta función solo verifica una dimensión de un array
    multidimensional. Por supuesto, se puede probar una dimensión
    particular utilizando, por ejemplo,
    array_udiff_assoc($array1[1], $array2[1], "compare_func");.

### Parámetros

     array


       El primer array.







     arrays


       Arrays a comparar contra







     value_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

### Valores devueltos

**array_udiff_assoc()** devuelve un array que contiene
todos los valores de array que no están presentes
en ninguno de los otros argumentos.
Tenga en cuenta que las claves se utilizan en las comparaciones a diferencia de
[array_diff()](#function.array-diff) y [array_udiff()](#function.array-udiff).
La comparación de datos se realiza utilizando una función de retrollamada proporcionada por el usuario, data_compare_func.
Este comportamiento es diferente al de [array_diff_assoc()](#function.array-diff-assoc)
que utiliza una función de comparación interna.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_udiff_assoc()**

&lt;?php
class cr {
private $priv_member;
    function __construct($val)
{
$this-&gt;priv_member = $val;
}

    static function comp_func_cr($a, $b)
    {
        if ($a-&gt;priv_member === $b-&gt;priv_member) return 0;
        return ($a-&gt;priv_member &gt; $b-&gt;priv_member)? 1:-1;
    }

}

$a = array("0.1" =&gt; new cr(9), "0.5" =&gt; new cr(12), 0 =&gt; new cr(23), 1=&gt; new cr(4), 2 =&gt; new cr(-15),);
$b = array("0.2" =&gt; new cr(9), "0.5" =&gt; new cr(22), 0 =&gt; new cr(3), 1=&gt; new cr(4), 2 =&gt; new cr(-15),);

$result = array_udiff_assoc($a, $b, array("cr", "comp_func_cr"));
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0.1] =&gt; cr Object
(
[priv_member:private] =&gt; 9
)

    [0.5] =&gt; cr Object
        (
            [priv_member:private] =&gt; 12
        )

    [0] =&gt; cr Object
        (
            [priv_member:private] =&gt; 23
        )

)

En nuestro ejemplo, se puede ver que la pareja "1" =&gt; new cr(4)
está presente en ambos arrays y, por lo tanto, está ausente en el array resultante.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_diff_uassoc()](#function.array-diff-uassoc) - Calcula la diferencia entre dos arrays asociativos,
              utilizando una función de retrollamada

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_udiff_uassoc()](#function.array-udiff-uassoc) - Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_udiff_uassoc

(PHP 5, PHP 7, PHP 8)

array_udiff_uassoc — Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno

### Descripción

**array_udiff_uassoc**(
    [array](#language.types.array) $array,
    [array](#language.types.array) ...$arrays,
    [callable](#language.types.callable) $value_compare_func,
    [callable](#language.types.callable) $key_compare_func
): [array](#language.types.array)

Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno.

Se debe tener en cuenta que las claves se utilizan en las comparaciones, a diferencia de
[array_diff()](#function.array-diff) y [array_udiff()](#function.array-udiff).

### Parámetros

     array


       El primer array.







     arrays


       Arrays a comparar







     value_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

     key_compare_func


       La comparación de las claves (índices) se realiza mediante la función de retorno
       key_compare_func. Este comportamiento difiere del de
       [array_udiff_assoc()](#function.array-udiff-assoc), ya que esta última utiliza una función interna
       para comparar los índices.





### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todas las claves del array
array que no están presentes en
ningún otro argumento.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_udiff_uassoc()**

&lt;?php
class cr {
private $priv_member;
    function __construct($val)
{
$this-&gt;priv_member = $val;
}

    static function comp_func_cr($a, $b)
    {
        if ($a-&gt;priv_member === $b-&gt;priv_member) return 0;
        return ($a-&gt;priv_member &gt; $b-&gt;priv_member)? 1:-1;
    }

    static function comp_func_key($a, $b)
    {
        if ($a === $b) return 0;
        return ($a &gt; $b)? 1:-1;
    }

}
$a = array("0.1" =&gt; new cr(9), "0.5" =&gt; new cr(12), 0 =&gt; new cr(23), 1=&gt; new cr(4), 2 =&gt; new cr(-15),);
$b = array("0.2" =&gt; new cr(9), "0.5" =&gt; new cr(22), 0 =&gt; new cr(3), 1=&gt; new cr(4), 2 =&gt; new cr(-15),);

$result = array_udiff_uassoc($a, $b, array("cr", "comp_func_cr"), array("cr", "comp_func_key"));
print_r($result);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0.1] =&gt; cr Object
(
[priv_member:cr:private] =&gt; 9
)

    [0.5] =&gt; cr Object
        (
            [priv_member:cr:private] =&gt; 12
        )

    [0] =&gt; cr Object
        (
            [priv_member:cr:private] =&gt; 23
        )

)

En nuestro ejemplo, se observa que el par "1" =&gt; new cr(4)
está presente en ambos arrays y, por lo tanto, ausente del array resultante.
Se debe tener en cuenta que se deben proporcionar dos funciones de retorno.

### Notas

**Nota**:

    Se debe tener en cuenta que esta función solo verifica una dimensión de un array
    multidimensional. Por supuesto, se puede probar una dimensión
    particular utilizando, por ejemplo,
    array_udiff_uassoc($array1[0], $array2[0], "data_compare_func",
     "key_compare_func");.

### Ver también

    - [array_diff()](#function.array-diff) - Calcula la diferencia entre arrays

    - [array_diff_assoc()](#function.array-diff-assoc) - Calcula la diferencia de dos arrays, teniendo en cuenta las claves

    - [array_udiff()](#function.array-udiff) - Calcula la diferencia entre dos arrays utilizando una función de retrollamada

    - [array_udiff_assoc()](#function.array-udiff-assoc) - Calcula la diferencia entre arrays con verificación de índices,

compara los datos con una función de retrollamada

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_uintersect

(PHP 5, PHP 7, PHP 8)

array_uintersect — Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

### Descripción

**array_uintersect**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $value_compare_func): [array](#language.types.array)

Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada.

### Parámetros

     array


       El primer array.







     arrays


       Arrays a comparar contra







     value_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

### Valores devueltos

Retorna un array conteniendo todos los valores del array
array que están presentes en todos
los argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_uintersect()**

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "GREEN", "B" =&gt; "brown", "yellow", "red");

print_r(array_uintersect($array1, $array2, "strcasecmp"));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
[b] =&gt; brown
[0] =&gt; red
)

### Ver también

    - [array_intersect()](#function.array-intersect) - Calcula la intersección de arrays

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_uintersect_assoc

(PHP 5, PHP 7, PHP 8)

array_uintersect_assoc — Calcula la intersección de dos arrays con pruebas sobre el índice,
compara los datos utilizando una función de retrollamada

### Descripción

**array_uintersect_assoc**([array](#language.types.array) $array, [array](#language.types.array) ...$arrays, [callable](#language.types.callable) $value_compare_func): [array](#language.types.array)

Calcula la intersección de dos arrays con pruebas sobre el índice,
compara los datos utilizando una función de retrollamada.

Téngase en cuenta que las claves se utilizan en la comparación
en contraste con la función [array_uintersect()](#function.array-uintersect).
Los datos se comparan utilizando una función de retrollamada.

### Parámetros

     array


       El primer array.







     arrays


       Arrays a comparar contra







     value_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

### Valores devueltos

Devuelve un array que contiene todos los valores del array
array que están presentes en todos los
otros argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_uintersect_assoc()**

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "GREEN", "B" =&gt; "brown", "yellow", "red");

print_r(array_uintersect_assoc($array1, $array2, "strcasecmp"));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
)

### Ver también

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_uintersect_uassoc()](#function.array-uintersect-uassoc) - Calcula la intersección de dos arrays con pruebas en el índice,

compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

# array_uintersect_uassoc

(PHP 5, PHP 7, PHP 8)

array_uintersect_uassoc — Calcula la intersección de dos arrays con pruebas en el índice,
compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada

### Descripción

**array_uintersect_uassoc**(
    [array](#language.types.array) $array1,
    [array](#language.types.array) ...$arrays,
    [callable](#language.types.callable) $value_compare_func,
    [callable](#language.types.callable) $key_compare_func
): [array](#language.types.array)

Calcula la intersección de dos arrays con pruebas en el índice,
compara los datos y los índices de los dos arrays utilizando
una función de retrollamada separada.

### Parámetros

     array1


       El primer array.







     arrays


       Arrays adicionales







     value_compare_func



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

      **Precaución**

La función de callback de ordenación debe tratar cualquier valor de cualquier array en cualquier orden,
independientemente del orden en el que fueron proporcionados inicialmente.
Esto se debe a que cada array individual es ordenado primero antes de ser comparado con otros arrays.

Por ejemplo:

&lt;?php
$arrayA = ["cadena", 1];
$arrayB = [["value" =&gt; 1]];
// $item1 y $item2 pueden ser cualquiera de los siguientes valores : "cadena", 1 o ["value" =&gt; 1]
$compareFunc = static function ($item1, $item2) {
    $value1 = is_string($item1) ? strlen($item1) : (is_array($item1) ? $item1["value"] : $item1);
    $value2 = is_string($item2) ? strlen($item2) : (is_array($item2) ? $item2["value"] : $item2);
return $value1 &lt;=&gt; $value2;
};
?&gt;

     key_compare_func


       Función de retrollamada utilizada para la comparación de las claves.





### Valores devueltos

Devuelve un array que contiene todos los valores del array
array que están presentes en todos los
argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_uintersect_uassoc()**

&lt;?php
$array1 = array("a" =&gt; "green", "b" =&gt; "brown", "c" =&gt; "blue", "red");
$array2 = array("a" =&gt; "GREEN", "B" =&gt; "brown", "yellow", "red");

print_r(array_uintersect_uassoc($array1, $array2, "strcasecmp", "strcasecmp"));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
[b] =&gt; brown
)

### Ver también

    - [array_uintersect()](#function.array-uintersect) - Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada

    - [array_intersect_assoc()](#function.array-intersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre los índices

    - [array_intersect_uassoc()](#function.array-intersect-uassoc) - Calcula la intersección de dos arrays con pruebas en los índices,

compara los índices utilizando una función de retrollamada

    - [array_uintersect_assoc()](#function.array-uintersect-assoc) - Calcula la intersección de dos arrays con pruebas sobre el índice,

compara los datos utilizando una función de retrollamada

# array_unique

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

array_unique — Elimina los valores duplicados de un array

### Descripción

**array_unique**([array](#language.types.array) $array, [int](#language.types.integer) $flags = **[SORT_STRING](#constant.sort-string)**): [array](#language.types.array)

**array_unique()** extrae del array
array los valores distintos,
y elimina todos los duplicados.

Tenga en cuenta que las claves se preservan. Si varios elementos comparados
son iguales bajo el flags dado, entonces la clave
y el valor del primer elemento igual serán conservados.

**Nota**:

    Dos elementos se consideran iguales si y solo si
    (string) $elem1 === (string) $elem2, es decir,
    cuando la representación en string es idéntica.

### Parámetros

     array


       El array de entrada.






     flags


       El segundo parámetro opcional flags
       puede ser utilizado para modificar el comportamiento de comparación
       utilizando los siguientes valores:




       Flag de tipo de comparación:



        -
         **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente
         (no modifica los tipos)


        -
         **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos
         numéricamente


        -
         **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


        -
         **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
         strings, según la configuración local actual.







### Valores devueltos

Devuelve el array filtrado.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Si flags es **[SORT_STRING](#constant.sort-string)**,
        anteriormente array era copiado y los elementos
        no únicos eran eliminados (sin comprimir el array después), pero
        ahora se construye un nuevo array añadiendo los elementos únicos.
        Como consecuencia, el resultado final puede tener índices numéricos diferentes.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_unique()**

&lt;?php

$input = ["a" =&gt; "green", "red", "b" =&gt; "green", "blue", "red"];
$result = array_unique($input);
print_r($result);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; green
[0] =&gt; red
[1] =&gt; blue
)

    **Ejemplo #2 Ejemplo con array_unique()** y los tipos

&lt;?php

$input = [4, "4", "3", 4, 3, "3"];
$result = array_unique($input);
var_dump($result);

?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0] =&gt; int(4)
[2] =&gt; string(1) "3"
}

### Notas

**Nota**:

    Tenga en cuenta que **array_unique()** no funciona
    con arrays multidimensionales.

### Ver también

    - [array_count_values()](#function.array-count-values) - Cuenta las ocurrencias de cada valor distinto en un array

# array_unshift

(PHP 4, PHP 5, PHP 7, PHP 8)

array_unshift — Empila uno o más elementos al inicio de un array

### Descripción

**array_unshift**([array](#language.types.array) &amp;$array, [mixed](#language.types.mixed) ...$values): [int](#language.types.integer)

**array_unshift()** añade los elementos value1,
..., pasados
como argumento al inicio del array array. Se debe tener en cuenta que
los elementos se añaden como un todo, y que permanecen
en el mismo orden. Todas las claves numéricas se modificarán para comenzar desde cero, mientras que las claves literales no se verán afectadas.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.






     values


       Valor a empilar.





### Valores devueltos

Devuelve el nuevo número de elementos del array
array.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        Esta función puede ahora ser llamada con un solo parámetro.
        Anteriormente, se requerían al menos dos parámetros.





### Ejemplos

    **Ejemplo #1 Ejemplo con array_unshift()**

&lt;?php

$queue = [
"orange",
"banana"
];

array_unshift($queue, "apple", "raspberry");

var_dump($queue);

?&gt;

    El ejemplo anterior mostrará:

array(4) {
[0] =&gt;
string(5) "apple"
[1] =&gt;
string(9) "raspberry"
[2] =&gt;
string(6) "orange"
[3] =&gt;
string(6) "banana"
}

    **Ejemplo #2 Uso con arrays asociativos**



     Si un array asociativo es añadido como prefijo a otro array
     asociativo, el array añadido es indexado numéricamente en el array
     precedente.

&lt;?php

$foods = [
'apples' =&gt; [
'McIntosh' =&gt; 'red',
'Granny Smith' =&gt; 'green',
],
'oranges' =&gt; [
'Navel' =&gt; 'orange',
'Valencia' =&gt; 'orange',
],
];

$vegetables = [
'lettuce' =&gt; [
'Iceberg' =&gt; 'green',
'Butterhead' =&gt; 'green',
],
'carrots' =&gt; [
'Deep Purple Hybrid' =&gt; 'purple',
'Imperator' =&gt; 'orange',
],
'cucumber' =&gt; [
'Kirby' =&gt; 'green',
'Gherkin' =&gt; 'green',
],
];

array_unshift($foods, $vegetables);

var_dump($foods);

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
array(3) {
["lettuce"]=&gt;
array(2) {
["Iceberg"]=&gt;
string(5) "green"
["Butterhead"]=&gt;
string(5) "green"
}
["carrots"]=&gt;
array(2) {
["Deep Purple Hybrid"]=&gt;
string(6) "purple"
["Imperator"]=&gt;
string(6) "orange"
}
["cucumber"]=&gt;
array(2) {
["Kirby"]=&gt;
string(5) "green"
["Gherkin"]=&gt;
string(5) "green"
}
}
["apples"]=&gt;
array(2) {
["McIntosh"]=&gt;
string(3) "red"
["Granny Smith"]=&gt;
string(5) "green"
}
["oranges"]=&gt;
array(2) {
["Navel"]=&gt;
string(6) "orange"
["Valencia"]=&gt;
string(6) "orange"
}
}

### Ver también

    - [array_merge()](#function.array-merge) - Fusiona varios arrays en uno solo

    - [array_shift()](#function.array-shift) - Despila un elemento al principio de un array

    - [array_push()](#function.array-push) - Apila uno o más elementos al final de un array

    - [array_pop()](#function.array-pop) - Desapila un elemento del final de un array

# array_values

(PHP 4, PHP 5, PHP 7, PHP 8)

array_values — Devuelve todos los valores de un array

### Descripción

**array_values**([array](#language.types.array) $array): [array](#language.types.array)

**array_values()** devuelve los valores del array
array y los indexa de forma numérica.

### Parámetros

     array


       El array.





### Valores devueltos

Devuelve un array de valores indexado.

### Ejemplos

    **Ejemplo #1 Ejemplo con array_values()**

&lt;?php
$array = array("size" =&gt; "XL", "color" =&gt; "gold");
print_r(array_values($array));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; XL
[1] =&gt; gold
)

### Ver también

    - [array_keys()](#function.array-keys) - Devuelve todas las claves o un conjunto de las claves de un array

    - [array_combine()](#function.array-combine) - Crea un array a partir de dos otros arrays

# array_walk

(PHP 4, PHP 5, PHP 7, PHP 8)

array_walk — Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

### Descripción

**array_walk**([array](#language.types.array)|[object](#language.types.object) &amp;$array, [callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $arg = **[null](#constant.null)**): [true](#language.types.singleton)

Ejecuta la función callback definida por el usuario
en cada elemento del array array.

**array_walk()** no es afectado por el puntero interno
del array array.
**array_walk()** recorrerá el array en su totalidad
sin tener en cuenta la posición del puntero.

### Parámetros

     array


       El array de entrada.






     callback


       Típicamente, callback toma dos parámetros.
       El valor del parámetro array
       siendo el primero y la clave/índice, el segundo.



      **Nota**:



        Si callback debe trabajar con los verdaderos
        valores del array, especifique que el primer parámetro de
        callback debe ser pasado por
        [referencia](#language.references). Entonces, los
        elementos serán directamente modificados en el array.




      **Nota**:



        Varias funciones internas (por ejemplo, [strtolower()](#function.strtolower))
        emiten una alerta si más argumentos que los esperados son pasados
        a la función y no son utilizables directamente como
        callback.





       Solo los valores del array pueden ser modificados;
       su estructura no puede ser modificada, es decir, no se pueden añadir, eliminar
       o reordenar elementos. Si la función de callback no respeta esta
       regla, el comportamiento se volverá indefinido e impredecible.






     arg


       Si el parámetro opcional arg
       es proporcionado, será pasado como tercer parámetro a la
       función definida por el usuario callback.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

A partir de PHP 7.1.0, un [ArgumentCountError](#class.argumentcounterror)
será lanzado si la función callback requiere más
de 2 parámetros (el valor y la clave del elemento del array),
o más de 3 si arg también es proporcionado.
Anteriormente, en este caso un error de nivel
[E_WARNING](#errorfunc.constants)
habría sido generado cada vez que la función
**array_walk()** llama a callback.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

      8.0.0

       Si callback espera que el segundo o tercer
       parámetro sea pasado por referencia, esta función ahora emite
       una **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con array_walk()**

&lt;?php
$fruits = array("d" =&gt; "lemon", "a" =&gt; "orange", "b" =&gt; "banana", "c" =&gt; "apple");

function test_alter(&amp;$item1, $key, $prefix)
{
    $item1 = "$prefix: $item1";
}

function test_print($item2, $key)
{
    echo "$key. $item2\n";
}

echo "Antes ...:\n";
array_walk($fruits, 'test_print');

array_walk($fruits, 'test_alter', 'fruit');
echo "... y después :\n";

array_walk($fruits, 'test_print');
?&gt;

    El ejemplo anterior mostrará:

Antes ...:
d. lemon
a. orange
b. banana
c. apple
... y después :
d. fruit: lemon
a. fruit: orange
b. fruit: banana
c. fruit: apple

    **Ejemplo #2 Ejemplo de array_walk()** con el uso de una función anónima

&lt;?php
$elements = ['a', 'b', 'c'];

array_walk($elements, function ($value, $key) {
  echo "{$key} =&gt; {$value}\n";
});

?&gt;

    El ejemplo anterior mostrará:

0 =&gt; a
1 =&gt; b
2 =&gt; c

### Ver también

    - [array_walk_recursive()](#function.array-walk-recursive) - Aplica una función de retrollamada de manera recursiva a cada miembro de un array

    - [iterator_apply()](#function.iterator-apply) - Llama a una función para todos los elementos de un iterador

    - [list()](#function.list) - Asigna variables como si fueran un array

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

    - [call_user_func_array()](#function.call-user-func-array) - Llama a una función de retorno con los argumentos agrupados en un array

    - [array_map()](#function.array-map) - Aplica una función sobre los elementos de un array

    - [foreach](#control-structures.foreach)

# array_walk_recursive

(PHP 5, PHP 7, PHP 8)

array_walk_recursive — Aplica una función de retrollamada de manera recursiva a cada miembro de un array

### Descripción

**array_walk_recursive**([array](#language.types.array)|[object](#language.types.object) &amp;$array, [callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $arg = **[null](#constant.null)**): [true](#language.types.singleton)

Aplica la función de usuario callback
a cada elemento del array array. Esta
función se reproducirá en todas las profundidades del array.

### Parámetros

     array


       El array de entrada.






     callback


       Típicamente, callback toma 2 argumentos.
       El argumento array, representando el valor, es
       el primero, el índice/clave, el segundo.



      **Nota**:



        Si callback debe ser ejecutado con los valores
        actuales del array, especifique el primer argumento de
        callback por
        [referencia](#language.references).
        Entonces, cualquier cambio efectuado en los elementos de este array será
        también efectuado en el array original.







     arg


       Si el argumento opcional arg es proporcionado,
       será pasado como tercer argumento a la función de retrollamada
       callback.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con array_walk_recursive()**

&lt;?php
$sweet = array('a' =&gt; 'apple', 'b' =&gt; 'banana');
$fruits = array('sweet' =&gt; $sweet, 'sour' =&gt; 'lemon');

function test_print($item, $key)
{
echo "La clave $key contiene el elemento $item\n";
}

array_walk_recursive($fruits, 'test_print');
?&gt;

    El ejemplo anterior mostrará:

La clave a contiene el elemento apple
La clave b contiene el elemento banana
La clave sour contiene el elemento lemon

     Se habrá notado que la clave 'sweet'
     nunca es mostrada. Cualquier clave que esté asociada
     a un [array](#language.types.array) no es pasada a la función de retrollamada.

### Ver también

    - [array_walk()](#function.array-walk) - Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

# arsort

(PHP 4, PHP 5, PHP 7, PHP 8)

arsort — Ordena un array en orden descendente y conserva la asociación de los índices

### Descripción

**arsort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en el lugar en orden descendente,
de tal manera que la correlación entre las claves y
los valores se conserve.

El uso principal es cuando se ordenan arrays
asociativos donde el orden de los elementos es importante.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con arsort()**

&lt;?php
$fruits = array("d" =&gt; "lemon", "a" =&gt; "orange", "b" =&gt; "banana", "c" =&gt; "apple");
arsort($fruits);
foreach ($fruits as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

a = orange
d = lemon
b = banana
c = apple

     Las frutas han sido ordenadas en orden alfabético
     inverso, y sus índices respectivos han sido conservados.

### Ver también

- [sort()](#function.sort) - Ordena un array en orden creciente

- [asort()](#function.asort) - Ordena un array en orden ascendente y conserva la asociación de los índices

- Las funciones de [ordenación de arrays](#array.sorting)

# asort

(PHP 4, PHP 5, PHP 7, PHP 8)

asort — Ordena un array en orden ascendente y conserva la asociación de los índices

### Descripción

**asort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en el lugar en orden ascendente,
de tal manera que la correlación entre las claves y
los valores se conserve.

El uso principal es cuando se ordenan arrays
asociativos donde el orden de los elementos es importante.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con asort()**

&lt;?php
$fruits = array("d" =&gt; "lemon", "a" =&gt; "orange", "b" =&gt; "banana", "c" =&gt; "apple");
asort($fruits);
foreach ($fruits as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

c = apple
b = banana
d = lemon
a = orange

     Las frutas han sido ordenadas en orden alfabético,
     y sus índices respectivos han sido conservados.

### Ver también

- [sort()](#function.sort) - Ordena un array en orden creciente

- [arsort()](#function.arsort) - Ordena un array en orden descendente y conserva la asociación de los índices

- Las funciones de [ordenación de arrays](#array.sorting)

# compact

(PHP 4, PHP 5, PHP 7, PHP 8)

compact — Crea un array a partir de variables y su valor

### Descripción

**compact**([array](#language.types.array)|[string](#language.types.string) $var_name, [array](#language.types.array)|[string](#language.types.string) ...$var_names): [array](#language.types.array)

Crea un array a partir de variables y su valor.

Para cada uno de los argumentos varname, ...,
**compact()** busca una variable
con el mismo nombre en la
[tabla actual de símbolos](#features.gc.refcounting-basics), y
la añade al array, de manera que se tenga la relación nombre =&gt;
'valor de variable'. En resumen, es lo contrario de la función
[extract()](#function.extract).

**Nota**:

    Antes de PHP 7.3, todas las cadenas no definidas eran ignoradas en silencio.

### Parámetros

     var_name
     var_names


       **compact()** acepta diferentes parámetros varname.
       Los parámetros pueden ser variables que contienen cadenas,
       o un array de cadenas, que puede contener otros arrays de nombres de
       variables, que **compact()** tratará de manera recursiva.





### Valores devueltos

Devuelve el array de salida que contiene todas las variables añadidas.

### Errores/Excepciones

**compact()** emite un error de nivel **[E_WARNING](#constant.e-warning)** si una
cadena dada hace referencia a una variable no definida.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si una cadena dada hace referencia a una variable no definida, se emite un error de nivel **[E_WARNING](#constant.e-warning)**.




      7.3.0

       **compact()** emite ahora un error de nivel **[E_NOTICE](#constant.e-notice)**
       si una cadena dada hace referencia a una variable no definida. Anteriormente,
       estas cadenas eran ignoradas en silencio.



### Ejemplos

    **Ejemplo #1 Ejemplo con compact()**

&lt;?php

$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";

$location_vars = array("city", "state");

$result = compact("event", $location_vars);
print_r($result);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[event] =&gt; SIGGRAPH
[city] =&gt; San Francisco
[state] =&gt; CA
)

### Notas

**Nota**:
**Error común**

    Debido a que las [variables
    variables](#language.variables.variable) no deben ser utilizadas con los
    [arrays superglobales](#language.variables.superglobals)
    en funciones, los arrays Superglobales no deben ser pasados
    a la función **compact()**.

### Ver también

    - [extract()](#function.extract) - Importa variables al símbolo actual desde un array

# count

(PHP 4, PHP 5, PHP 7, PHP 8)

count — Cuenta todos los elementos de un array o en un objeto [Countable](#class.countable)

### Descripción

**count**([Countable](#class.countable)|[array](#language.types.array) $value, [int](#language.types.integer) $mode = **[COUNT_NORMAL](#constant.count-normal)**): [int](#language.types.integer)

Cuenta todos los elementos en un array cuando se utiliza con un [array](#language.types.array).
Cuando se utiliza con un objeto que implementa la interfaz
[Countable](#class.countable), esto devuelve el valor de la
método [Countable::count()](#countable.count).

### Parámetros

     value


       Un array o un objeto [Countable](#class.countable).






     mode


       Si el parámetro opcional mode vale
       **[COUNT_RECURSIVE](#constant.count-recursive)** (o 1), **count()**
       va contar recursivamente los arrays. Esto es particularmente útil
       para contar el número de elementos de un array.



      **Precaución**

        La función **count()** puede detectar las recursiones
        para evitar bucles infinitos, pero emitirá una advertencia de tipo
        **[E_WARNING](#constant.e-warning)** cada vez que ocurra un bucle infinito
        (en el caso de que un array contenga más de un bucle infinito)
        y devolverá un contador mayor que el esperado.






### Valores devueltos

Devuelve el número de elementos en value.
Anterior a PHP 8.0.0, si el parámetro no era ni un [array](#language.types.array), ni un [object](#language.types.object)
que implementara la interfaz [Countable](#class.countable),
1 era devuelto, excepto si value
era **[null](#constant.null)**, en cuyo caso 0 era devuelto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **count()** ahora lanza una [TypeError](#class.typeerror)
       para tipos contables inválidos pasados al parámetro
       value.




      7.2.0

       **count()** ahora genera una advertencia para
       tipos contables inválidos pasados al parámetro
       value.



### Ejemplos

    **Ejemplo #1 Ejemplo con count()**

&lt;?php
$a[0] = 1;
$a[1] = 3;
$a[2] = 5;
var_dump(count($a));

$b[0]  = 7;
$b[5] = 9;
$b[10] = 11;
var_dump(count($b));
?&gt;

    El ejemplo anterior mostrará:

int(3)
int(3)

    **Ejemplo #2 Ejemplo de count()** con un argumento no Countable|array (contraejemplo - no hacer esto)

&lt;?php
$b[0]  = 7;
$b[5] = 9;
$b[10] = 11;
var_dump(count($b));

var_dump(count(null));

var_dump(count(false));
?&gt;

    El ejemplo anterior mostrará:

int(3)

Fatal error: Uncaught TypeError: count(): Argument #1 ($var) must be of type Countable .. on line 12

    **Ejemplo #3 Ejemplo de recursividad con count()**

&lt;?php
$food = array('fruits' =&gt; array('orange', 'banana', 'apple'),
'veggie' =&gt; array('carrot', 'collard', 'pea'));

// count recursivo
var_dump(count($food, COUNT_RECURSIVE));

// count normal
var_dump(count($food));

?&gt;

    El ejemplo anterior mostrará:

int(8)
int(2)

    **Ejemplo #4 Objeto [Countable](#class.countable)**

&lt;?php
class CountOfMethods implements Countable
{
private function someMethod()
{
}
public function count(): int
{
return count(get_class_methods($this));
    }
}
$obj = new CountOfMethods();
var_dump(count($obj));
?&gt;

    El ejemplo anterior mostrará:

int(2)

### Ver también

    - [is_array()](#function.is-array) - Determina si una variable es un array

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [empty()](#function.empty) - Determina si una variable está vacía

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

    - [is_countable()](#function.is-countable) - Verifica si el contenido de la variable es un valor contable

    - [Los arrays](#language.types.array)

# current

(PHP 4, PHP 5, PHP 7, PHP 8)

current — Devuelve el elemento actual del array

### Descripción

**current**([array](#language.types.array)|[object](#language.types.object) $array): [mixed](#language.types.mixed)

Cada array mantiene un puntero interno, que se inicializa
cuando se inserta el primer elemento en el array.

### Parámetros

     array


       El array.





### Valores devueltos

**current()** solo devuelve
el elemento actual apuntado por el puntero interno del
array array.
**current()** no desplaza el puntero.
Si el puntero está más allá del último elemento de la lista,
**current()** devuelve **[false](#constant.false)**.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de current()**

&lt;?php
echo $mode = current($transport), PHP_EOL; // $mode = 'foot';
echo $mode = next($transport), PHP_EOL; // $mode = 'bike';
echo $mode = current($transport), PHP_EOL; // $mode = 'bike';
echo $mode = prev($transport), PHP_EOL; // $mode = 'foot';
echo $mode = end($transport), PHP_EOL; // $mode = 'plane';
echo $mode = current($transport), PHP_EOL; // $mode = 'plane';

$arr = array();
var_dump(current($arr)); // bool(false)

$arr = array(array());
var_dump(current($arr)); // array(0) { }
?&gt;

### Notas

**Nota**:

    No es posible distinguir el final de un array o el resultado
    de la llamada **current()** sobre un array vacío,
    a partir del elemento [bool](#language.types.boolean) **[false](#constant.false)**.
    Para recorrer correctamente un array que
    puede contener el elemento **[false](#constant.false)**, ver la estructura de control [foreach](#control-structures.foreach).


    Para seguir utilizando **current()** y verificar
    correctamente si el valor es realmente un elemento del array,
    la [key()](#function.key) del elemento **current()**
    debería compararse estrictamente diferente del elemento **[null](#constant.null)**.

### Ver también

    - [end()](#function.end) - Posiciona el puntero del array al final del array

    - [key()](#function.key) - Devuelve una clave de un array asociativo

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

    - [prev()](#function.prev) - Retrocede el puntero actual del array

    - [reset()](#function.reset) - Reinicia el puntero interno del array al principio

    - [next()](#function.next) - Avance el puntero interno de un array

    - [foreach](#control-structures.foreach)

# each

(PHP 4, PHP 5, PHP 7)

each — Devuelve cada par clave/valor de un array

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**each**([array](#language.types.array)|[object](#language.types.object) &amp;$array): [array](#language.types.array)

**each()** devuelve el par clave/valor actual del array
array y avanza el puntero del array.

Tras cada llamada a **each()**, el puntero del array se
desplaza al siguiente elemento, o más allá del último elemento, cuando se llega
al final. Debe utilizarse [reset()](#function.reset) si se desea recorrer
el array nuevamente con **each()**.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Devuelve el par clave/valor actual del array
array y avanza el puntero
del array. Este par se devuelve en un array
de 4 elementos, con las claves 0, 1,
key, y value. Los
elementos 0 y key
contienen el nombre de la clave y 1 y
value contienen el valor.

Si el puntero interno del array está más allá del final del array,
**each()** devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con each()**

&lt;?php
$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
$bar = each($foo);
print_r($bar);
?&gt;

     $bar contiene ahora las claves/valores siguientes :

Array
(
[1] =&gt; bob
[value] =&gt; bob
[0] =&gt; 0
[key] =&gt; 0
)

&lt;?php
$foo = array("Robert" =&gt; "Bob", "Seppo" =&gt; "Sepi");
$bar = each($foo);
print_r($bar);
?&gt;

     $bar contiene ahora las claves/valores siguientes :

Array
(
[1] =&gt; Bob
[value] =&gt; Bob
[0] =&gt; Robert
[key] =&gt; Robert
)

**each()** se utiliza típicamente en conjunción
con [list()](#function.list) para revisar un array.
Por ejemplo :

    **Ejemplo #2 Recorrer un array con each()**

&lt;?php
$fruit = array('a' =&gt; 'apple', 'b' =&gt; 'banana', 'c' =&gt; 'cranberry');

reset($fruit);
while (list($key, $val) = each($fruit)) {
echo "$key =&gt; $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

a =&gt; apple
b =&gt; banana
c =&gt; cranberry

**Precaución**

    Asignar un array a otra variable reinicia el puntero del array original
    a cero. Debido a este comportamiento, se podría haber provocado una
    iteración infinita en nuestro ejemplo si se hubiera asignado
    $fruit a otra variable dentro de nuestro ciclo.

**Advertencia**

    **each()** también acepta objetos, pero puede devolver
    un resultado no esperado. Por lo tanto, no se recomienda utilizar esta
    función con objetos.

### Ver también

    - [key()](#function.key) - Devuelve una clave de un array asociativo

    - [list()](#function.list) - Asigna variables como si fueran un array

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [reset()](#function.reset) - Reinicia el puntero interno del array al principio

    - [next()](#function.next) - Avance el puntero interno de un array

    - [prev()](#function.prev) - Retrocede el puntero actual del array

    - [foreach](#control-structures.foreach)

    - [Iteración de objetos](#language.oop5.iterations)

# end

(PHP 4, PHP 5, PHP 7, PHP 8)

end — Posiciona el puntero del array al final del array

### Descripción

**end**([array](#language.types.array)|[object](#language.types.object) &amp;$array): [mixed](#language.types.mixed)

**end()** desplaza el puntero interno del array
array hasta el último elemento y devuelve
su valor.

### Parámetros

     array


       El array. Este array es pasado por referencia ya que será
       modificado por la función. Esto significa que debe pasar
       una verdadera variable y no una función que devuelva un array,
       ya que actualmente, solo las variables pueden ser pasadas
       por referencia.





### Valores devueltos

Devuelve el valor del último elemento o **[false](#constant.false)** si el array está vacío.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con end()**

&lt;?php

$fruits = array('apple', 'banana', 'cranberry');
echo end($fruits); // cranberry

?&gt;

### Ver también

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

    - [prev()](#function.prev) - Retrocede el puntero actual del array

    - [reset()](#function.reset) - Reinicia el puntero interno del array al principio

    - [next()](#function.next) - Avance el puntero interno de un array

    - [array_key_last()](#function.array-key-last) - Recupera la última clave de un array

# extract

(PHP 4, PHP 5, PHP 7, PHP 8)

extract — Importa variables al símbolo actual desde un array

### Descripción

**extract**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[EXTR_OVERWRITE](#constant.extr-overwrite)**, [string](#language.types.string) $prefix = ""): [int](#language.types.integer)

Importa variables desde un array a la tabla de símbolos actual.

Verifica cada clave para determinar si tiene un nombre de variable válido.
También verifica colisiones con variables existentes en la tabla de símbolos.

**Advertencia**

    No utilice **extract()** con datos no confiables, como entrada de usuario
    (ej. [$_GET](#reserved.variables.get), [$_FILES](#reserved.variables.files)).

### Parámetros

     array


       Un array asociativo. Esta función trata las claves como nombres de variables y
       los valores como valores de variables. Para cada par clave/valor creará
       una variable en la tabla de símbolos actual, sujeto a los parámetros
       flags y prefix.




       Debe usar un array asociativo; un array indexado numéricamente
       no producirá resultados a menos que use **[EXTR_PREFIX_ALL](#constant.extr-prefix-all)** o
       **[EXTR_PREFIX_INVALID](#constant.extr-prefix-invalid)**.






     flags


       La forma en que se tratan las claves inválidas/numéricas y las colisiones se determina
       por los flags de extracción. Puede ser uno de los
       siguientes valores:




         **[EXTR_OVERWRITE](#constant.extr-overwrite)**


           Si hay una colisión, sobrescribe la variable existente.




         **[EXTR_SKIP](#constant.extr-skip)**


           Si hay una colisión, no sobrescribe la variable
           existente.




         **[EXTR_PREFIX_SAME](#constant.extr-prefix-same)**

          Si hay una colisión, antepone el nombre de la variable con
           prefix.




         **[EXTR_PREFIX_ALL](#constant.extr-prefix-all)**


           Antepone todos los nombres de variables con
           prefix.




         **[EXTR_PREFIX_INVALID](#constant.extr-prefix-invalid)**


           Solo antepone nombres de variables inválidas/numéricas con
           prefix.




         **[EXTR_IF_EXISTS](#constant.extr-if-exists)**


           Solo sobrescribe la variable si ya existe en la
           tabla de símbolos actual, de lo contrario no hace nada. Esto es útil
           para definir una lista de variables válidas y luego extraer
           solo esas variables que ha definido de
           [$_REQUEST](#reserved.variables.request), por ejemplo.




         **[EXTR_PREFIX_IF_EXISTS](#constant.extr-prefix-if-exists)**


           Solo crea nombres de variables con prefijo si la versión sin prefijo
           de la misma variable existe en la tabla de símbolos actual.




         **[EXTR_REFS](#constant.extr-refs)**


           Extrae variables como referencias. Esto significa efectivamente que
           los valores de las variables importadas aún hacen referencia a los valores del
           parámetro array. Puede usar este flag
           por sí solo o combinarlo con cualquier otro flag mediante OR con los
           flags.






       Si flags no está especificado, se
       asume que es **[EXTR_OVERWRITE](#constant.extr-overwrite)**.






     prefix


       Tenga en cuenta que prefix solo es requerido si
       flags es **[EXTR_PREFIX_SAME](#constant.extr-prefix-same)**,
       **[EXTR_PREFIX_ALL](#constant.extr-prefix-all)**, **[EXTR_PREFIX_INVALID](#constant.extr-prefix-invalid)**
       o **[EXTR_PREFIX_IF_EXISTS](#constant.extr-prefix-if-exists)**. Si
       el resultado con prefijo no es un nombre de variable válido, no se
       importará a la tabla de símbolos. Los prefijos se separan automáticamente de
       la clave del array por un carácter de guión bajo.





### Valores devueltos

Devuelve el número de variables importadas con éxito a la tabla de símbolos.

### Ejemplos

    **Ejemplo #1 Ejemplo de extract()**

&lt;?php
$size = "large";
$var_array = array(
"color" =&gt; "blue",
"size" =&gt; "medium",
"shape" =&gt; "sphere"
);

extract($var_array, EXTR_PREFIX_SAME, "wddx");

echo "$color, $size, $shape, $wddx_size\n";

?&gt;

    El ejemplo anterior mostrará:

blue, large, sphere, medium

     La variable $size no fue sobrescrita porque especificamos
     **[EXTR_PREFIX_SAME](#constant.extr-prefix-same)**, lo que resultó en la creación de
     $wddx_size. Si se hubiera especificado **[EXTR_SKIP](#constant.extr-skip)**,
     entonces $wddx_size ni siquiera se habría creado.
     **[EXTR_OVERWRITE](#constant.extr-overwrite)** habría hecho que $size tuviera
     el valor "medium", y **[EXTR_PREFIX_ALL](#constant.extr-prefix-all)** habría resultado en nuevas variables
     llamadas $wddx_color,
     $wddx_size, y
     $wddx_shape.

### Notas

**Advertencia**

    No utilice **extract()** con datos no confiables, como
    entrada de usuario
    (ej. [$_GET](#reserved.variables.get), [$_FILES](#reserved.variables.files), etc.).
    Si lo hace, asegúrese de usar uno de los valores de
    flags que no sobrescriban, como
    **[EXTR_SKIP](#constant.extr-skip)** y tenga en cuenta que debe extraer
    en el mismo orden que está definido en
    [variables_order](#ini.variables-order) dentro del
    [php.ini](#ini).

### Ver también

    - [compact()](#function.compact) - Crea un array a partir de variables y su valor

    - [list()](#function.list) - Asigna variables como si fueran un array

# in_array

(PHP 4, PHP 5, PHP 7, PHP 8)

in_array — Indica si un valor pertenece a un array

### Descripción

**in_array**([mixed](#language.types.mixed) $needle, [array](#language.types.array) $haystack, [bool](#language.types.boolean) $strict = **[false](#constant.false)**): [bool](#language.types.boolean)

Busca needle en haystack utilizando una comparación
flexible a menos que strict sea utilizado.

### Parámetros

     needle


       El valor buscado.



      **Nota**:



        Si needle es un [string](#language.types.string), la comparación
        se realiza teniendo en cuenta la casilla.







     haystack


       El array.






     strict


       Si el tercer argumento strict está definido
       a **[true](#constant.true)** entonces la función **in_array()** verificará también que el [tipo](#language.types)
       del argumento needle
       coincide con el tipo del valor encontrado en haystack.



      **Nota**:



        Antes de PHP 8.0.0, un string needle coincidirá
        con un valor de array de 0 en modo no estricto y viceversa.
        Esto puede llevar a resultados no deseados.
        Casos similares también existen para otros tipos.
        Si no se está absolutamente seguro de los tipos de valores involucrados,
        siempre se debe utilizar el flag strict para evitar cualquier comportamiento inesperado.






### Valores devueltos

Devuelve **[true](#constant.true)** si needle es encontrado en el array,
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con in_array()**

&lt;?php
$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
echo "Got Irix";
}
if (in_array("mac", $os)) {
echo "Got mac";
}
?&gt;

     La segunda condición falla, ya que **in_array()**
     es sensible a la casilla. El script devuelve:

Got Irix

    **Ejemplo #2 Ejemplo con in_array()** y modo estricto

&lt;?php
$a = array('1.10', 12.4, 1.13);

if (in_array('12.4', $a, true)) {
echo "'12.4' es encontrado con modo estricto\n";
}

if (in_array(1.13, $a, true)) {
echo "1.13 es encontrado con modo estricto\n";
}
?&gt;

    El ejemplo anterior mostrará:

1.13 es encontrado con modo estricto

    **Ejemplo #3 Ejemplo con in_array()** y un array como argumento

&lt;?php
$a = array(array('p', 'h'), array('p', 'r'), 'o');

if (in_array(array('p', 'h'), $a)) {
echo "'ph' ha sido encontrado\n";
}

if (in_array(array('f', 'i'), $a)) {
echo "'fi' was found\n";
}

if (in_array('o', $a)) {
echo "'o' ha sido encontrado\n";
}
?&gt;

    El ejemplo anterior mostrará:

'ph' ha sido encontrado
'o' ha sido encontrado

### Ver también

    - [array_search()](#function.array-search) - Busca en un array la primera clave asociada al valor

    - [isset()](#function.isset) - Determina si una variable está declarada y es diferente de null

    - [array_key_exists()](#function.array-key-exists) - Verifica si una clave existe en un array

# key

(PHP 4, PHP 5, PHP 7, PHP 8)

key — Devuelve una clave de un array asociativo

### Descripción

**key**([array](#language.types.array)|[object](#language.types.object) $array): [int](#language.types.integer)|[string](#language.types.string)|[null](#language.types.null)

**key()** devuelve la clave actual en el
array array.

### Parámetros

     array


       El array.





### Valores devueltos

La función **key()** devuelve simplemente la clave
del elemento del array que es actualmente apuntado por el puntero
interno. Esta función no modifica en ningún caso la posición de este puntero.
Si el puntero interno apunta un elemento situado después del final de la lista
de elementos, o bien si el array está vacío, la función
**key()** devolverá **[null](#constant.null)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con key()**

&lt;?php
$array = array(
'fruit1' =&gt; 'apple',
'fruit2' =&gt; 'orange',
'fruit3' =&gt; 'grape',
'fruit4' =&gt; 'apple',
'fruit5' =&gt; 'apple');

// Este ciclo muestra todas las claves
// cuyo valor es "apple"
while ($fruit_name = current($array)) {
if ($fruit_name == 'apple') {
        echo key($array), "\n";
}
next($array);
}
?&gt;

    El ejemplo anterior mostrará:

fruit1
fruit4
fruit5

### Ver también

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [next()](#function.next) - Avance el puntero interno de un array

    - [array_key_first()](#function.array-key-first) - Recupera la primera clave de un array

    - [foreach](#control-structures.foreach)

# key_exists

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

key_exists — Alias de [array_key_exists()](#function.array-key-exists)

### Descripción

Esta función es un alias de:
[array_key_exists()](#function.array-key-exists).

# krsort

(PHP 4, PHP 5, PHP 7, PHP 8)

krsort — Ordena un array según las claves en orden descendente

### Descripción

**krsort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en el lugar según las claves
en orden descendente.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

       8.2.0

        Esta función realiza ahora una comparación de strings numéricos bajo
        **[SORT_REGULAR](#constant.sort-regular)** utilizando las reglas estándar de PHP 8.





### Ejemplos

    **Ejemplo #1 Ejemplo con krsort()**

&lt;?php
$fruits = array("d"=&gt;"lemon", "a"=&gt;"orange", "b"=&gt;"banana", "c"=&gt;"apple");
krsort($fruits);
foreach ($fruits as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

d = lemon
c = apple
b = banana
a = orange

### Ver también

- [sort()](#function.sort) - Ordena un array en orden creciente

- [ksort()](#function.ksort) - Ordena un array según las claves en orden ascendente

- Las funciones de [ordenación de arrays](#array.sorting)

# ksort

(PHP 4, PHP 5, PHP 7, PHP 8)

ksort — Ordena un array según las claves en orden ascendente

### Descripción

**ksort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en su lugar según las claves
en orden ascendente.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

       8.2.0

        Esta función realiza ahora una comparación de strings numéricos bajo
        **[SORT_REGULAR](#constant.sort-regular)** utilizando las reglas estándar de PHP 8.





### Ejemplos

    **Ejemplo #1 Ejemplo con ksort()**

&lt;?php
$fruits = array("d"=&gt;"lemon", "a"=&gt;"orange", "b"=&gt;"banana", "c"=&gt;"apple");
ksort($fruits);
foreach ($fruits as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

a = orange
b = banana
c = apple
d = lemon

    **Ejemplo #2 ksort()** con claves [int](#language.types.integer)

&lt;?php
$a = [0 =&gt; 'First', 2 =&gt; 'Last', 1 =&gt; 'Middle'];
var_dump($a);
ksort($a);
var_dump($a);
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(5) "First"
[2]=&gt;
string(4) "Last"
[1]=&gt;
string(6) "Middle"
}
array(3) {
[0]=&gt;
string(5) "First"
[1]=&gt;
string(6) "Middle"
[2]=&gt;
string(4) "Last"
}

### Ver también

- [sort()](#function.sort) - Ordena un array en orden creciente

- [krsort()](#function.krsort) - Ordena un array según las claves en orden descendente

- Las funciones de [ordenación de arrays](#array.sorting)

# list

(PHP 4, PHP 5, PHP 7, PHP 8)

list — Asigna variables como si fueran un array

### Descripción

**list**([mixed](#language.types.mixed) $var, [mixed](#language.types.mixed) ...$vars = ?): [array](#language.types.array)

Al igual que [array()](#function.array), esto no es realmente una función,
sino una construcción del lenguaje. **list()** se utiliza para
asignar una lista de variables en una sola operación.
Solo se pueden desempaquetar arrays y objetos que implementen [ArrayAccess](#class.arrayaccess).
Las expresiones **list()** no pueden estar completamente vacías.

**Nota**:

    Antes de PHP 7.1.0, **list()** solo funcionaba con arrays numéricos y asumía
    que los índices numéricos comenzaban en 0.

A partir de PHP 7.1.0, **list()** también puede contener claves explícitas, permitiendo
la desestructuración de arrays con claves no enteras o no secuenciales. Para más detalles sobre
la desestructuración de arrays, consulte la [sección de desestructuración de arrays](#language.types.array.syntax.destructuring).

**Nota**:

    Intentar acceder a una clave de array que no ha sido definida es
    lo mismo que acceder a cualquier otra variable no definida:
    se emitirá un mensaje de error de nivel **[E_WARNING](#constant.e-warning)**
    (nivel **[E_NOTICE](#constant.e-notice)** antes de PHP 8.0.0) y
    el resultado será **[null](#constant.null)**.




    Intentar desempaquetar un escalar asigna **[null](#constant.null)** a todas las variables.
    Intentar desempaquetar un objeto que no implementa ArrayAccess es un error fatal.

### Parámetros

     var


       Una variable.








     vars


       Variables adicionales.





### Valores devueltos

Devuelve el array asignado.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        Se añadió soporte para asignaciones por referencia en la desestructuración de arrays.




       7.1.0

        Ahora es posible especificar claves en **list()**. Esto
        permite la desestructuración de arrays con claves no enteras o no secuenciales.





### Ejemplos

    **Ejemplo #1 Ejemplos de list()**

&lt;?php

$info = array('coffee', 'brown', 'caffeine');

// Listando todas las variables
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";

// Listando algunas de ellas
list($drink, , $power) = $info;
echo "$drink has $power.\n";

// O saltemos solo a la tercera
list( , , $power) = $info;
echo "I need $power!\n";

// list() no funciona con strings
list($bar) = "abcde";
var_dump($bar); // NULL
?&gt;

    **Ejemplo #2 Un ejemplo de uso de list()**

&lt;?php
$result = $pdo-&gt;query("SELECT id, name FROM employees");
while (list($id, $name) = $result-&gt;fetch(PDO::FETCH_NUM)) {
echo "id: $id, name: $name\n";
}
?&gt;

    **Ejemplo #3 Uso de list()** anidado

&lt;?php

list($a, list($b, $c)) = array(1, array(2, 3));

var_dump($a, $b, $c);

?&gt;

    El ejemplo anterior mostrará:

int(1)
int(2)
int(3)

El orden en el que se definen los índices del array a ser consumido por
**list()** es irrelevante.

    **Ejemplo #4 list()** y el orden de las definiciones de índices

&lt;?php
$foo = array(2 =&gt; 'a', 'foo' =&gt; 'b', 0 =&gt; 'c');
$foo[1] = 'd';
list($x, $y, $z) = $foo;
var_dump($foo, $x, $y, $z);

     Produce la siguiente salida (note el orden de los elementos comparado con
     el orden en que fueron escritos en la sintaxis **list()**):

array(4) {
[2]=&gt;
string(1) "a"
["foo"]=&gt;
string(1) "b"
[0]=&gt;
string(1) "c"
[1]=&gt;
string(1) "d"
}
string(1) "c"
string(1) "d"
string(1) "a"

    **Ejemplo #5 list()** con claves



     A partir de PHP 7.1.0 **list()** ahora también puede contener
     claves explícitas, que pueden ser dadas como expresiones arbitrarias.
     Se permite mezclar claves enteras y string; sin embargo, no se pueden mezclar
     elementos con y sin claves.

&lt;?php
$data = [
    ["id" =&gt; 1, "name" =&gt; 'Tom'],
    ["id" =&gt; 2, "name" =&gt; 'Fred'],
];
foreach ($data as ["id" =&gt; $id, "name" =&gt; $name]) {
echo "id: $id, name: $name\n";
}
echo PHP_EOL;
list(1 =&gt; $second, 3 =&gt; $fourth) = [1, 2, 3, 4];
echo "$second, $fourth\n";

    El ejemplo anterior mostrará:

id: 1, name: Tom
id: 2, name: Fred

2, 4

### Ver también

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

    - [array()](#function.array) - Crea un array

    - [extract()](#function.extract) - Importa variables al símbolo actual desde un array

# natcasesort

(PHP 4, PHP 5, PHP 7, PHP 8)

natcasesort — Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas

### Descripción

**natcasesort**([array](#language.types.array) &amp;$array): [true](#language.types.singleton)

**natcasesort()** es la versión insensible a mayúsculas y minúsculas de [natsort()](#function.natsort).

Esta función implementa un algoritmo de ordenación que trata las cadenas alfanuméricas del array array
como lo haría un ser humano, manteniendo la relación clave/valor. Esto se conoce como "orden natural".

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con natcasesort()**

&lt;?php
$array1 = $array2 = array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');

sort($array1);
echo "Ordenación estándar\n";
print_r($array1);

natcasesort($array2);
echo "\nOrdenación en orden natural (insensible a mayúsculas y minúsculas)\n";
print_r($array2);
?&gt;

    El ejemplo anterior mostrará:

Ordenación estándar
Array
(
[0] =&gt; IMG0.png
[1] =&gt; IMG3.png
[2] =&gt; img1.png
[3] =&gt; img10.png
[4] =&gt; img12.png
[5] =&gt; img2.png
)

Ordenación en orden natural (insensible a mayúsculas y minúsculas)
Array
(
[0] =&gt; IMG0.png
[4] =&gt; img1.png
[3] =&gt; img2.png
[5] =&gt; IMG3.png
[2] =&gt; img10.png
[1] =&gt; img12.png
)

     Para más detalles, visite el sitio de Martin Pool sobre
     [» la comparación de cadenas en orden natural](https://github.com/sourcefrog/natsort).

### Ver también

    - [natsort()](#function.natsort) - Ordena un array con el algoritmo de "orden natural"

    - Las funciones de [ordenación de arrays](#array.sorting)

    - [strnatcmp()](#function.strnatcmp) - Comparación de strings con el algoritmo de "orden natural"

    - [strnatcasecmp()](#function.strnatcasecmp) - Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)

# natsort

(PHP 4, PHP 5, PHP 7, PHP 8)

natsort — Ordena un array con el algoritmo de "orden natural"

### Descripción

**natsort**([array](#language.types.array) &amp;$array): [true](#language.types.singleton)

**natsort()** implementa un algoritmo
de ordenación que trata las cadenas alfanuméricas del array
array como lo haría un ser humano,
conservando la relación clave/valor. Esto se conoce como
"orden natural". Un ejemplo de la diferencia de tratamiento
entre tal algoritmo y un algoritmo de ordenación de cadenas
(como cuando se utiliza [sort()](#function.sort)) se ilustra a continuación.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo de uso básico con natsort()**

&lt;?php
$array1 = $array2 = array("img12.png", "img10.png", "img2.png", "img1.png");

asort($array1);
echo "Ordenación estándar\n";
print_r($array1);

natsort($array2);
echo "\nOrdenación en orden natural\n";
print_r($array2);
?&gt;

    El ejemplo anterior mostrará:

Ordenación estándar
Array
(
[3] =&gt; img1.png
[1] =&gt; img10.png
[0] =&gt; img12.png
[2] =&gt; img2.png
)

Ordenación en orden natural
Array
(
[3] =&gt; img1.png
[2] =&gt; img2.png
[1] =&gt; img10.png
[0] =&gt; img12.png
)

     Para más detalles, visite el sitio de
     Martin Pool sobre
     [» la comparación de cadenas en orden natural](https://github.com/sourcefrog/natsort).





    **Ejemplo #2 Ejemplos que muestran las trampas de natsort()**

&lt;?php
echo "Números negativos\n";
$negative = array('-5','3','-2','0','-1000','9','1');
print_r($negative);
natsort($negative);
print_r($negative);

echo "Alineación con ceros\n";
$zeros = array('09', '8', '10', '009', '011', '0');
print_r($zeros);
natsort($zeros);
print_r($zeros);
?&gt;

    El ejemplo anterior mostrará:

Números negativos
Array
(
[0] =&gt; -5
[1] =&gt; 3
[2] =&gt; -2
[3] =&gt; 0
[4] =&gt; -1000
[5] =&gt; 9
[6] =&gt; 1
)
Array
(
[2] =&gt; -2
[0] =&gt; -5
[4] =&gt; -1000
[3] =&gt; 0
[6] =&gt; 1
[1] =&gt; 3
[5] =&gt; 9
)

Alineación con ceros
Array
(
[0] =&gt; 09
[1] =&gt; 8
[2] =&gt; 10
[3] =&gt; 009
[4] =&gt; 011
[5] =&gt; 0
)
Array
(
[5] =&gt; 0
[1] =&gt; 8
[3] =&gt; 009
[0] =&gt; 09
[2] =&gt; 10
[4] =&gt; 011
)

### Ver también

    - [natcasesort()](#function.natcasesort) - Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas

    - Las funciones de [ordenación de arrays](#array.sorting)

    - [strnatcmp()](#function.strnatcmp) - Comparación de strings con el algoritmo de "orden natural"

    - [strnatcasecmp()](#function.strnatcasecmp) - Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)

# next

(PHP 4, PHP 5, PHP 7, PHP 8)

next — Avance el puntero interno de un array

### Descripción

**next**([array](#language.types.array)|[object](#language.types.object) &amp;$array): [mixed](#language.types.mixed)

**next()** se comporta como
[current()](#function.current), con una diferencia. Avance
el puntero interno del array un elemento, antes de devolver
el valor del elemento. Esto significa que devuelve el próximo
valor del array y avanza el puntero interno un elemento.

### Parámetros

     array


       El array a tratar.





### Valores devueltos

Devuelve el próximo valor del array siguiendo el puntero interno,
o **[false](#constant.false)** si no hay más elementos.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con next()**

&lt;?php
$transport = array('foot', 'bike', 'car', 'plane');
echo $mode = current($transport), PHP_EOL; // $mode = 'foot';
echo $mode = next($transport), PHP_EOL; // $mode = 'bike';
echo $mode = next($transport), PHP_EOL; // $mode = 'car';
echo $mode = prev($transport), PHP_EOL; // $mode = 'bike';
echo $mode = end($transport), PHP_EOL; // $mode = 'plane';
?&gt;

### Notas

**Nota**:

    No es posible distinguir el final de un array
     del elemento [bool](#language.types.boolean) **[false](#constant.false)**.
    Para recorrer correctamente un array que
    puede contener el elemento **[false](#constant.false)**, véase la función
    [foreach](#control-structures.foreach).


    Para continuar utilizando **next()** y detectar correctamente
    si se ha alcanzado el final del array, la [key()](#function.key) es **[null](#constant.null)**.

### Ver también

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [end()](#function.end) - Posiciona el puntero del array al final del array

    - [prev()](#function.prev) - Retrocede el puntero actual del array

    - [reset()](#function.reset) - Reinicia el puntero interno del array al principio

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

# pos

(PHP 4, PHP 5, PHP 7, PHP 8)

pos — Alias de [current()](#function.current)

### Descripción

Esta función es un alias de:
[current()](#function.current)

# prev

(PHP 4, PHP 5, PHP 7, PHP 8)

prev — Retrocede el puntero actual del array

### Descripción

**prev**([array](#language.types.array)|[object](#language.types.object) &amp;$array): [mixed](#language.types.mixed)

Retrocede el puntero actual del array.

**prev()** se comporta exactamente como
[next()](#function.next), pero retrocede el puntero
en lugar de avanzarlo.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Devuelve el valor anterior del array según el puntero interno
del array, o **[false](#constant.false)** si no hay más elementos.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con prev()**

&lt;?php
$transport = array('foot', 'bike', 'car', 'plane');
echo $mode = current($transport), PHP_EOL; // $mode = 'foot';
echo $mode = next($transport), PHP_EOL; // $mode = 'bike';
echo $mode = next($transport), PHP_EOL; // $mode = 'car';
echo $mode = prev($transport), PHP_EOL; // $mode = 'bike';
echo $mode = end($transport), PHP_EOL; // $mode = 'plane';
?&gt;

### Notas

**Nota**:

    No es posible distinguir el inicio de un array
     del elemento [bool](#language.types.boolean) **[false](#constant.false)**.
    Para hacer la distinción, verifique si la [key()](#function.key) del
    elemento **prev()** no es
    **[null](#constant.null)**.

### Ver también

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [end()](#function.end) - Posiciona el puntero del array al final del array

    - [next()](#function.next) - Avance el puntero interno de un array

    - [reset()](#function.reset) - Reinicia el puntero interno del array al principio

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

# range

(PHP 4, PHP 5, PHP 7, PHP 8)

range — Crea un array que contiene un intervalo de elementos

### Descripción

**range**([string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $start, [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float) $end, [int](#language.types.integer)|[float](#language.types.float) $step = 1): [array](#language.types.array)

Crea un array que contiene un intervalo de elementos.

Si tanto start como end son
[string](#language.types.string), y step es de tipo
[int](#language.types.integer), el array producido será una secuencia de bytes.
De lo contrario, el array producido será una secuencia de números.

La secuencia es creciente si start es menor o igual a
end.
De lo contrario, la secuencia es decreciente.

### Parámetros

     start


       Primer valor de la secuencia.






     end


       Último valor posible de la secuencia.






     step


       step indica de cuánto progresa la secuencia producida
       entre los valores de la secuencia.




       step puede ser negativo para las secuencias decrecientes.




       Si step es un [float](#language.types.float) sin parte
       fraccionaria, se interpreta como un [int](#language.types.integer).


### Valores devueltos

Devuelve una secuencia de elementos en forma de un array [array](#language.types.array) con el primer
elemento siendo start hasta
end, cada valor de la secuencia estando
separado por step valores.

El último elemento del array devuelto es end
o el elemento anterior de la secuencia,
dependiendo del valor de step.

Si tanto start como end son
[string](#language.types.string), y step es de tipo [int](#language.types.integer)
el array producido será una secuencia de bytes,
generalmente caracteres ASCII latinos.

Si al menos uno de start, end
o step es de tipo [float](#language.types.float),
el array producido será una secuencia de [float](#language.types.float).

De lo contrario, el array producido será una secuencia de [int](#language.types.integer).

### Errores/Excepciones

- Si step es igual a 0,
  se genera una [ValueError](#class.valueerror).

- Si start, end,
  o step no son [is_finite()](#function.is-finite),
  se genera una [ValueError](#class.valueerror).

- Si step es negativo,
  pero la plage producida es creciente
  (es decir, $start &lt;= $end),
  se genera una [ValueError](#class.valueerror).

- Si start o end
  es la cadena vacía '',
  se emite un **[E_WARNING](#constant.e-warning)** y
  la cadena vacía se interpretará como 0.

- Si start o end
  es una cadena no-[numérica](#language.types.numeric-strings)
  con más de un byte, se emite un **[E_WARNING](#constant.e-warning)**.

- Si start o end es una cadena
  que se convierte implícitamente en [int](#language.types.integer) porque el otro valor
  límite es un número, se emite un **[E_WARNING](#constant.e-warning)**.

- Si step es de tipo [float](#language.types.float),
  y start y end son
  cadenas no-[numéricas](#language.types.numeric-strings),
  se emite un **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Si tanto start como end
       son cadenas, entonces **range()** producirá ahora
       sistemáticamente un array de [string](#language.types.string).
       Anteriormente, si uno de los valores límite era una cadena numérica,
       el otro valor límite se convertía implícitamente en [int](#language.types.integer).




      8.3.0

       Ahora se emite un **[E_WARNING](#constant.e-warning)** si
       start o end
       es una cadena que se convierte implícitamente en [int](#language.types.integer)
       porque el otro valor límite es un número.




      8.3.0

       Ahora se emite un **[E_WARNING](#constant.e-warning)** si
       start o end
       es una cadena no-[numérica](#language.types.numeric-strings)
       con más de un byte.




      8.3.0

       Ahora se emite un **[E_WARNING](#constant.e-warning)** si
       start o end
       es la cadena vacía.




      8.3.0

       Si step es de tipo [float](#language.types.float) sin
       parte fraccionaria, se interpretará como un [int](#language.types.integer).




      8.3.0

       Ahora se genera una [ValueError](#class.valueerror) si
       step es negativo al producir una plage creciente.




      8.3.0

       Ahora se genera una [ValueError](#class.valueerror) si
       step no es finito.




      8.3.0

       Ahora se genera una [TypeError](#class.typeerror) si
       start o end
       es un array, un objeto, o un recurso.
       Anteriormente, se convertían implícitamente en [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Ejemplo con range()**

&lt;?php
echo implode(', ', range(0, 12)), PHP_EOL;

echo implode(', ', range(0, 100, 10)), PHP_EOL;

echo implode(', ', range('a', 'i')), PHP_EOL;

echo implode(', ', range('c', 'a')), PHP_EOL;

echo implode(', ', range('A', 'z')), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100
a, b, c, d, e, f, g, h, i
c, b, a
A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z, [, \, ], ^, \_, `, a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z

### Ver también

    - [shuffle()](#function.shuffle) - Mezcla los elementos de un array

    - [array_fill()](#function.array-fill) - Rellena un array con un mismo valor

    - [foreach](#control-structures.foreach)

# reset

(PHP 4, PHP 5, PHP 7, PHP 8)

reset — Reinicia el puntero interno del array al principio

### Descripción

**reset**([array](#language.types.array)|[object](#language.types.object) &amp;$array): [mixed](#language.types.mixed)

**reset()** reemplaza el puntero del array
array al primer elemento y devuelve el valor
del primer elemento.

### Parámetros

     array


       El array de entrada.





### Valores devueltos

Devuelve el valor del primer elemento del array, o **[false](#constant.false)** si el array
está vacío.

    **Advertencia**

Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.1.0

O bien convertir el [object](#language.types.object) en un [array](#language.types.array) utilizando [get_mangled_object_vars()](#function.get-mangled-object-vars) primero,
o utilizar los métodos proporcionados por una clase que implemente [Iterator](#class.iterator), tal como
[ArrayIterator](#class.arrayiterator).

7.4.0

A partir de PHP 7.4.0, las instancias de clases [SPL](#book.spl) son tratadas como
objetos vacíos sin propiedades en lugar de llamar al método [Iterator](#class.iterator) con
el mismo nombre que esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con reset()**

&lt;?php

$array = array('step one', 'step two', 'step three', 'step four');

// Por omisión, el puntero está en el primer elemento
echo current($array) . "&lt;br /&gt;\n"; // "step one"

// se saltan dos elementos
next($array);
next($array);
echo current($array) . "&lt;br /&gt;\n"; // "step three"

// se reinicia el puntero al principio
reset($array);
echo current($array) . "&lt;br /&gt;\n"; // "step one"

?&gt;

### Notas

**Nota**:

    El valor devuelto para un array vacío no es distinguible del
    valor devuelto para un array que contiene un valor
    [bool](#language.types.boolean) **[false](#constant.false)** como primer elemento.
    Para verificar correctamente el valor del primer elemento de un array,
    que puede contener un elemento **[false](#constant.false)**, se debe primero verificar el
    [count()](#function.count) del array, o verificar si la [key()](#function.key)
    no es **[null](#constant.null)**,
    después de haber llamado **reset()**.

### Ver también

    - [current()](#function.current) - Devuelve el elemento actual del array

    - [each()](#function.each) - Devuelve cada par clave/valor de un array

    - [end()](#function.end) - Posiciona el puntero del array al final del array

    - [next()](#function.next) - Avance el puntero interno de un array

    - [prev()](#function.prev) - Retrocede el puntero actual del array

    - [array_key_first()](#function.array-key-first) - Recupera la primera clave de un array

# rsort

(PHP 4, PHP 5, PHP 7, PHP 8)

rsort — Ordena un array en orden decreciente

### Descripción

**rsort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en el lugar según los valores
en orden decreciente.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:
Esta función asigna nuevas claves a los elementos en array.
Eliminará todas las claves existentes que hayan podido ser asignadas, en lugar de reordenar las claves.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con rsort()**

&lt;?php
$fruits = array("lemon", "orange", "banana", "apple");
rsort($fruits);
foreach ($fruits as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

0 = orange
1 = lemon
2 = banana
3 = apple

     Las frutas han sido clasificadas en orden alfabético
     inverso.

### Ver también

- [sort()](#function.sort) - Ordena un array en orden creciente

- [arsort()](#function.arsort) - Ordena un array en orden descendente y conserva la asociación de los índices

- [krsort()](#function.krsort) - Ordena un array según las claves en orden descendente

- Las funciones de [ordenación de arrays](#array.sorting)

# shuffle

(PHP 4, PHP 5, PHP 7, PHP 8)

shuffle — Mezcla los elementos de un array

### Descripción

**shuffle**([array](#language.types.array) &amp;$array): [true](#language.types.singleton)

Mezcla los elementos del array array.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     array


       El array.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        El algoritmo interno de generación aleatoria
        [ha sido modificado](#migration71.incompatible.rand-srand-aliases)
        para utilizar el generador de números aleatorios [» 
         Mersenne Twister](http://www.math.sci.hiroshima-u.ac.jp/~m-mat/MT/emt.html) en lugar de la función libc rand.





### Ejemplos

    **Ejemplo #1 Ejemplo con shuffle()**

&lt;?php
$numbers = range(1, 20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}
?&gt;

### Notas

**Nota**:
Esta función asigna nuevas claves a los elementos en array.
Eliminará todas las claves existentes que hayan podido ser asignadas, en lugar de reordenar las claves.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Ver también

    - [Random\Randomizer::shuffleArray()](#random-randomizer.shufflearray) - Devuelve una permutación de un array

    - [Random\Randomizer::shuffleBytes()](#random-randomizer.shufflebytes) - Devuelve una permutación por octeto de una cadena de caracteres

    - [Random\Randomizer::pickArrayKeys()](#random-randomizer.pickarraykeys) - Selecciona claves de array aleatorias

    - Las funciones de [ordenación de arrays](#array.sorting)

# sizeof

(PHP 4, PHP 5, PHP 7, PHP 8)

sizeof — Alias de [count()](#function.count)

### Descripción

Esta función es un alias de: [count()](#function.count).

# sort

(PHP 4, PHP 5, PHP 7, PHP 8)

sort — Ordena un array en orden creciente

### Descripción

**sort**([array](#language.types.array) &amp;$array, [int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena array en su lugar siguiendo los valores
en orden creciente.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:
Esta función asigna nuevas claves a los elementos en array.
Eliminará todas las claves existentes que hayan podido ser asignadas, en lugar de reordenar las claves.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.





flags

El segundo parámetro opcional flags
puede ser utilizado para modificar el comportamiento de ordenación utilizando estos valores:

Tipo de banderas de ordenación:

    -
     **[SORT_REGULAR](#constant.sort-regular)** - compara los elementos normalmente;
     los detalles son descritos en la sección de los [operadores de comparación](#language.operators.comparison)


    -
     **[SORT_NUMERIC](#constant.sort-numeric)** - compara los elementos numéricamente


    -
     **[SORT_STRING](#constant.sort-string)** - compara los elementos como strings


    -

      **[SORT_LOCALE_STRING](#constant.sort-locale-string)** - compara los elementos como
      strings, basado en la configuración regional actual. Esto utiliza la configuración regional,
      que puede ser cambiada utilizando [setlocale()](#function.setlocale)



    -

      **[SORT_NATURAL](#constant.sort-natural)** - compara los elementos como strings
      utilizando el "orden natural" como [natsort()](#function.natsort)



    -

      **[SORT_FLAG_CASE](#constant.sort-flag-case)** - puede ser combinado
      (OR a nivel de bits) con
      **[SORT_STRING](#constant.sort-string)** o
      **[SORT_NATURAL](#constant.sort-natural)** para ordenar strings sin tener en cuenta la mayúscula/minúscula


### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con sort()**

&lt;?php

$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
foreach ($fruits as $key =&gt; $val) {
echo "fruits[" . $key . "] = " . $val . "\n";
}

?&gt;

    El ejemplo anterior mostrará:

fruits[0] = apple
fruits[1] = banana
fruits[2] = lemon
fruits[3] = orange

Las frutas han sido ordenadas en orden alfabético.

    **Ejemplo #2 Ejemplo con sort()** utilizando
     el orden natural sin tener en cuenta la casilla

&lt;?php

$fruits = array(
    "Orange1", "orange2", "Orange3", "orange20"
);
sort($fruits, SORT_NATURAL | SORT_FLAG_CASE);
foreach ($fruits as $key =&gt; $val) {
echo "fruits[" . $key . "] = " . $val . "\n";
}

?&gt;

    El ejemplo anterior mostrará:

fruits[0] = Orange1
fruits[1] = orange2
fruits[2] = Orange3
fruits[3] = orange20

Las frutas han sido ordenadas como lo habrían sido con la función
[natcasesort()](#function.natcasesort).

### Notas

**Nota**:

    Al igual que la mayoría de las funciones de ordenación de PHP, **sort()**
    utiliza una implementación de [» Quicksort](http://en.wikipedia.org/wiki/Quicksort).
    El pivote es elegido en el medio de la partición, resultando así en una optimización
    del tiempo para los arrays ya ordenados. Pero esto no es más que un detalle de
    la implementación, sin tener ningún impacto.

**Advertencia**

    Prestar atención al ordenar arrays con valores de tipos
    diferentes ya que **sort()** puede producir resultados
    impredecibles cuando flags es
    **[SORT_REGULAR](#constant.sort-regular)**.

### Ver también

- [rsort()](#function.rsort) - Ordena un array en orden decreciente

- Las funciones de [ordenación de arrays](#array.sorting)

# uasort

(PHP 4, PHP 5, PHP 7, PHP 8)

uasort — Ordena un array utilizando una función de retrollamada

### Descripción

**uasort**([array](#language.types.array) &amp;$array, [callable](#language.types.callable) $callback): [true](#language.types.singleton)

Ordena array en el lugar de tal manera que la
correlación entre las claves y los valores sea conservada,
utilizando una función de comparación definida por el usuario.

Utilizado habitualmente al ordenar arrays asociativos donde
el orden actual de los elementos es significativo.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.






     callback



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con uasort()**

&lt;?php
// Función de comparación
function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a &lt; $b) ? -1 : 1;
}

// Array a ordenar
$array = array('a' =&gt; 4, 'b' =&gt; 8, 'c' =&gt; -1, 'd' =&gt; -9, 'e' =&gt; 2, 'f' =&gt; 5, 'g' =&gt; 3, 'h' =&gt; -4);
print_r($array);

// Ordena y muestra el array resultante
uasort($array, 'cmp');
print_r($array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[a] =&gt; 4
[b] =&gt; 8
[c] =&gt; -1
[d] =&gt; -9
[e] =&gt; 2
[f] =&gt; 5
[g] =&gt; 3
[h] =&gt; -4
)
Array
(
[d] =&gt; -9
[h] =&gt; -4
[c] =&gt; -1
[e] =&gt; 2
[g] =&gt; 3
[a] =&gt; 4
[f] =&gt; 5
[b] =&gt; 8
)

### Ver también

- [usort()](#function.usort) - Ordena un array utilizando una función de comparación

- [uksort()](#function.uksort) - Ordena un array por sus claves utilizando una función de retrollamada

- Las funciones de [ordenación de arrays](#array.sorting)

# uksort

(PHP 4, PHP 5, PHP 7, PHP 8)

uksort — Ordena un array por sus claves utilizando una función de retrollamada

### Descripción

**uksort**([array](#language.types.array) &amp;$array, [callable](#language.types.callable) $callback): [true](#language.types.singleton)

Ordena array en su lugar según las claves
utilizando una función de comparación definida por el usuario.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:

    Reinicia el puntero interno del array al primer elemento.

### Parámetros

     array


       El array de entrada.






     callback



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con uksort()**

&lt;?php
function cmp($a, $b)
{
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);
    return strcasecmp($a, $b);
}

$a = array("John" =&gt; 1, "the Earth" =&gt; 2, "an apple" =&gt; 3, "a banana" =&gt; 4);

uksort($a, "cmp");

foreach ($a as $key =&gt; $value) {
    echo "$key: $value\n";
}
?&gt;

    El ejemplo anterior mostrará:

an apple: 3
a banana: 4
the Earth: 2
John: 1

### Ver también

- [usort()](#function.usort) - Ordena un array utilizando una función de comparación

- [uasort()](#function.uasort) - Ordena un array utilizando una función de retrollamada

- Las funciones de [ordenación de arrays](#array.sorting)

# usort

(PHP 4, PHP 5, PHP 7, PHP 8)

usort — Ordena un array utilizando una función de comparación

### Descripción

**usort**([array](#language.types.array) &amp;$array, [callable](#language.types.callable) $callback): [true](#language.types.singleton)

Ordena array en su lugar según los valores
utilizando una función de comparación definida por el usuario.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

**Nota**:
Esta función asigna nuevas claves a los elementos en array.
Eliminará todas las claves existentes que hayan podido ser asignadas, en lugar de reordenar las claves.

### Parámetros

     array


       El array de entrada.






     callback



La función de comparación debe retornar un entero menor que, igual a, o mayor
que 0 si el primer argumento es considerado, respectivamente, menor que, igual a, o mayor que el segundo.

callback([mixed](#language.types.mixed) $a, [mixed](#language.types.mixed) $b): [int](#language.types.integer)

**Precaución**

Retornar valores _no-entero_ desde la función
de comparación, tales como [float](#language.types.float), resultará en una conversión interna
del valor de retorno del callback a [int](#language.types.integer). Así, valores tales como
0.99 y 0.1 serán convertidos ambos a un
valor entero de 0, lo que comparará tales valores como iguales.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

8.0.0

Si callback espera un parámetro a ser pasado por
referencia, esta función emite ahora una **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con usort()**

&lt;?php
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a &lt; $b) ? -1 : 1;
}

$a = array(3, 2, 5, 6, 1);

usort($a, "cmp");

foreach ($a as $key =&gt; $value) {
    echo "$key: $value\n";
}
?&gt;

    El ejemplo anterior mostrará:

0: 1
1: 2
2: 3
3: 5
4: 6

     El operador combinado puede ser utilizado para
     simplificar la comparación interna.

&lt;?php
function cmp($a, $b)
{
return $a &lt;=&gt; $b;
}

$a = array(3, 2, 5, 6, 1);

usort($a, "cmp");

foreach ($a as $key =&gt; $value) {
    echo "$key: $value\n";
}
?&gt;

**Nota**:

    Evidentemente en este caso trivial, [sort()](#function.sort) sería más
    apropiado.








    **Ejemplo #2
     Ordenación con usort()** sobre un array multidimensional

&lt;?php
function cmp($a, $b)
{
    return strcmp($a["fruit"], $b["fruit"]);
}

$fruits[0]["fruit"] = "lemons";
$fruits[1]["fruit"] = "apples";
$fruits[2]["fruit"] = "grapes";

usort($fruits, "cmp");

foreach ($fruits as $key =&gt; $value) {
    echo "\$fruits[$key]: " . $value["fruit"] . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

$fruits[0]: apples
$fruits[1]: grapes
$fruits[2]: lemons

     Al ordenar arrays multidimensionales, $a y
     $b contienen referencias al primer
     elemento del array.









    **Ejemplo #3
     Ordenación con usort()** sobre un objeto

&lt;?php
class TestObj {
public string $name;

    function __construct($name)
    {
        $this-&gt;name = $name;
    }

    /* Esta es una función de comparación estática */
    static function cmp_obj($a, $b)
    {
        return strtolower($a-&gt;name) &lt;=&gt; strtolower($b-&gt;name);
    }

}

$a[] = new TestObj("c");
$a[] = new TestObj("b");
$a[] = new TestObj("d");

usort($a, [TestObj::class, "cmp_obj"]);

foreach ($a as $item) {
echo $item-&gt;name . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

b
c
d

    **Ejemplo #4
     Ejemplo con usort()** utilizando
     una [closure](#functions.anonymous)
     para ordenar un array multidimensional

&lt;?php
$array[0] = array('key_a' =&gt; 'z', 'key_b' =&gt; 'c');
$array[1] = array('key_a' =&gt; 'x', 'key_b' =&gt; 'b');
$array[2] = array('key_a' =&gt; 'y', 'key_b' =&gt; 'a');

function build_sorter($key) {
    return function ($a, $b) use ($key) {
return strnatcmp($a[$key], $b[$key]);
};
}

usort($array, build_sorter('key_b'));

foreach ($array as $item) {
echo $item['key_a'] . ', ' . $item['key_b'] . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

y, a
x, b
z, c

    **Ejemplo #5
     Ejemplo de uso del operador combinado con usort()**.




     El operador combinado permite una comparación directa de valores compuestos sobre
     múltiples ejes.
     En el ejemplo siguiente, $people se ordena por apellido,
     luego por nombre si el apellido coincide.

&lt;?php
$people[0] = ['first' =&gt; 'Adam', 'last' =&gt; 'West'];
$people[1] = ['first' =&gt; 'Alec', 'last' =&gt; 'Baldwin'];
$people[2] = ['first' =&gt; 'Adam', 'last' =&gt; 'Baldwin'];

function sorter(array $a, array $b) {
    return [$a['last'], $a['first']] &lt;=&gt; [$b['last'], $b['first']];
}

usort($people, 'sorter');

foreach ($people as $person) {
print $person['last'] . ', ' . $person['first'] . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Baldwin, Adam
Baldwin, Alec
West, Adam

### Ver también

- [uasort()](#function.uasort) - Ordena un array utilizando una función de retrollamada

- [uksort()](#function.uksort) - Ordena un array por sus claves utilizando una función de retrollamada

- Las funciones de [ordenación de arrays](#array.sorting)

## Tabla de contenidos

- [array](#function.array) — Crea un array
- [array_all](#function.array-all) — Verifica si todos los elementos del array validan la función de retrollamada
- [array_any](#function.array-any) — Verifica que al menos un elemento del array valide la función de retrollamada
- [array_change_key_case](#function.array-change-key-case) — Cambia la casse de todas las claves de un array
- [array_chunk](#function.array-chunk) — Divide un array en arrays de menor tamaño
- [array_column](#function.array-column) — Devuelve los valores de una columna de un array de entrada
- [array_combine](#function.array-combine) — Crea un array a partir de dos otros arrays
- [array_count_values](#function.array-count-values) — Cuenta las ocurrencias de cada valor distinto en un array
- [array_diff](#function.array-diff) — Calcula la diferencia entre arrays
- [array_diff_assoc](#function.array-diff-assoc) — Calcula la diferencia de dos arrays, teniendo en cuenta las claves
- [array_diff_key](#function.array-diff-key) — Calcula la diferencia de dos arrays utilizando las claves para la comparación
- [array_diff_uassoc](#function.array-diff-uassoc) — Calcula la diferencia entre dos arrays asociativos,
  utilizando una función de retrollamada
- [array_diff_ukey](#function.array-diff-ukey) — Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación
- [array_fill](#function.array-fill) — Rellena un array con un mismo valor
- [array_fill_keys](#function.array-fill-keys) — Rellena un array con valores, especificando las claves
- [array_filter](#function.array-filter) — Filtra los elementos de un array mediante una función de retrollamada
- [array_find](#function.array-find) — Devuelve el primer elemento que valida la función de retrollamada
- [array_find_key](#function.array-find-key) — Devuelve la clave del primer elemento que valida la función de retrollamada
- [array_first](#function.array-first) — Obtiene el primer valor de un array
- [array_flip](#function.array-flip) — Reemplaza las claves por los valores, y los valores por las claves
- [array_intersect](#function.array-intersect) — Calcula la intersección de arrays
- [array_intersect_assoc](#function.array-intersect-assoc) — Calcula la intersección de dos arrays con pruebas sobre los índices
- [array_intersect_key](#function.array-intersect-key) — Calcula la intersección de dos arrays utilizando las claves para la comparación
- [array_intersect_uassoc](#function.array-intersect-uassoc) — Calcula la intersección de dos arrays con pruebas en los índices,
  compara los índices utilizando una función de retrollamada
- [array_intersect_ukey](#function.array-intersect-ukey) — Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación
- [array_is_list](#function.array-is-list) — Verifica si un array dado es una lista
- [array_key_exists](#function.array-key-exists) — Verifica si una clave existe en un array
- [array_key_first](#function.array-key-first) — Recupera la primera clave de un array
- [array_key_last](#function.array-key-last) — Recupera la última clave de un array
- [array_keys](#function.array-keys) — Devuelve todas las claves o un conjunto de las claves de un array
- [array_last](#function.array-last) — Obtiene el último valor de un array
- [array_map](#function.array-map) — Aplica una función sobre los elementos de un array
- [array_merge](#function.array-merge) — Fusiona varios arrays en uno solo
- [array_merge_recursive](#function.array-merge-recursive) — Combina uno o varios arrays juntos, de manera recursiva
- [array_multisort](#function.array-multisort) — Ordena los arrays multidimensionales
- [array_pad](#function.array-pad) — Completa un array con un valor hasta la longitud especificada
- [array_pop](#function.array-pop) — Desapila un elemento del final de un array
- [array_product](#function.array-product) — Calcula el producto de los valores del array
- [array_push](#function.array-push) — Apila uno o más elementos al final de un array
- [array_rand](#function.array-rand) — Toma una o varias claves, al azar en un array
- [array_reduce](#function.array-reduce) — Reduce itérativemente un array
- [array_replace](#function.array-replace) — Sustituye los elementos de un array por los de otros arrays
- [array_replace_recursive](#function.array-replace-recursive) — Sustituye recursivamente en el primer array los elementos de los otros arrays proporcionados
- [array_reverse](#function.array-reverse) — Invierte el orden de los elementos de un array
- [array_search](#function.array-search) — Busca en un array la primera clave asociada al valor
- [array_shift](#function.array-shift) — Despila un elemento al principio de un array
- [array_slice](#function.array-slice) — Extrae una porción de array
- [array_splice](#function.array-splice) — Elimina y reemplaza una porción de array
- [array_sum](#function.array-sum) — Calcula la suma de los valores del array
- [array_udiff](#function.array-udiff) — Calcula la diferencia entre dos arrays utilizando una función de retrollamada
- [array_udiff_assoc](#function.array-udiff-assoc) — Calcula la diferencia entre arrays con verificación de índices,
  compara los datos con una función de retrollamada
- [array_udiff_uassoc](#function.array-udiff-uassoc) — Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno
- [array_uintersect](#function.array-uintersect) — Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada
- [array_uintersect_assoc](#function.array-uintersect-assoc) — Calcula la intersección de dos arrays con pruebas sobre el índice,
  compara los datos utilizando una función de retrollamada
- [array_uintersect_uassoc](#function.array-uintersect-uassoc) — Calcula la intersección de dos arrays con pruebas en el índice,
  compara los datos y los índices de los dos arrays utilizando
  una función de retrollamada separada
- [array_unique](#function.array-unique) — Elimina los valores duplicados de un array
- [array_unshift](#function.array-unshift) — Empila uno o más elementos al inicio de un array
- [array_values](#function.array-values) — Devuelve todos los valores de un array
- [array_walk](#function.array-walk) — Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array
- [array_walk_recursive](#function.array-walk-recursive) — Aplica una función de retrollamada de manera recursiva a cada miembro de un array
- [arsort](#function.arsort) — Ordena un array en orden descendente y conserva la asociación de los índices
- [asort](#function.asort) — Ordena un array en orden ascendente y conserva la asociación de los índices
- [compact](#function.compact) — Crea un array a partir de variables y su valor
- [count](#function.count) — Cuenta todos los elementos de un array o en un objeto Countable
- [current](#function.current) — Devuelve el elemento actual del array
- [each](#function.each) — Devuelve cada par clave/valor de un array
- [end](#function.end) — Posiciona el puntero del array al final del array
- [extract](#function.extract) — Importa variables al símbolo actual desde un array
- [in_array](#function.in-array) — Indica si un valor pertenece a un array
- [key](#function.key) — Devuelve una clave de un array asociativo
- [key_exists](#function.key-exists) — Alias de array_key_exists
- [krsort](#function.krsort) — Ordena un array según las claves en orden descendente
- [ksort](#function.ksort) — Ordena un array según las claves en orden ascendente
- [list](#function.list) — Asigna variables como si fueran un array
- [natcasesort](#function.natcasesort) — Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas
- [natsort](#function.natsort) — Ordena un array con el algoritmo de "orden natural"
- [next](#function.next) — Avance el puntero interno de un array
- [pos](#function.pos) — Alias de current
- [prev](#function.prev) — Retrocede el puntero actual del array
- [range](#function.range) — Crea un array que contiene un intervalo de elementos
- [reset](#function.reset) — Reinicia el puntero interno del array al principio
- [rsort](#function.rsort) — Ordena un array en orden decreciente
- [shuffle](#function.shuffle) — Mezcla los elementos de un array
- [sizeof](#function.sizeof) — Alias de count
- [sort](#function.sort) — Ordena un array en orden creciente
- [uasort](#function.uasort) — Ordena un array utilizando una función de retrollamada
- [uksort](#function.uksort) — Ordena un array por sus claves utilizando una función de retrollamada
- [usort](#function.usort) — Ordena un array utilizando una función de comparación

- [Introducción](#intro.array)
- [Constantes predefinidas](#array.constants)
- [Ordenación de arrays](#array.sorting)
- [Funciones de Arrays](#ref.array)<li>[array](#function.array) — Crea un array
- [array_all](#function.array-all) — Verifica si todos los elementos del array validan la función de retrollamada
- [array_any](#function.array-any) — Verifica que al menos un elemento del array valide la función de retrollamada
- [array_change_key_case](#function.array-change-key-case) — Cambia la casse de todas las claves de un array
- [array_chunk](#function.array-chunk) — Divide un array en arrays de menor tamaño
- [array_column](#function.array-column) — Devuelve los valores de una columna de un array de entrada
- [array_combine](#function.array-combine) — Crea un array a partir de dos otros arrays
- [array_count_values](#function.array-count-values) — Cuenta las ocurrencias de cada valor distinto en un array
- [array_diff](#function.array-diff) — Calcula la diferencia entre arrays
- [array_diff_assoc](#function.array-diff-assoc) — Calcula la diferencia de dos arrays, teniendo en cuenta las claves
- [array_diff_key](#function.array-diff-key) — Calcula la diferencia de dos arrays utilizando las claves para la comparación
- [array_diff_uassoc](#function.array-diff-uassoc) — Calcula la diferencia entre dos arrays asociativos,
  utilizando una función de retrollamada
- [array_diff_ukey](#function.array-diff-ukey) — Calcula la diferencia entre dos arrays utilizando una función de retrollamada sobre las claves para comparación
- [array_fill](#function.array-fill) — Rellena un array con un mismo valor
- [array_fill_keys](#function.array-fill-keys) — Rellena un array con valores, especificando las claves
- [array_filter](#function.array-filter) — Filtra los elementos de un array mediante una función de retrollamada
- [array_find](#function.array-find) — Devuelve el primer elemento que valida la función de retrollamada
- [array_find_key](#function.array-find-key) — Devuelve la clave del primer elemento que valida la función de retrollamada
- [array_first](#function.array-first) — Obtiene el primer valor de un array
- [array_flip](#function.array-flip) — Reemplaza las claves por los valores, y los valores por las claves
- [array_intersect](#function.array-intersect) — Calcula la intersección de arrays
- [array_intersect_assoc](#function.array-intersect-assoc) — Calcula la intersección de dos arrays con pruebas sobre los índices
- [array_intersect_key](#function.array-intersect-key) — Calcula la intersección de dos arrays utilizando las claves para la comparación
- [array_intersect_uassoc](#function.array-intersect-uassoc) — Calcula la intersección de dos arrays con pruebas en los índices,
  compara los índices utilizando una función de retrollamada
- [array_intersect_ukey](#function.array-intersect-ukey) — Calcula la intersección de dos arrays utilizando una función de retrollamada sobre las claves para la comparación
- [array_is_list](#function.array-is-list) — Verifica si un array dado es una lista
- [array_key_exists](#function.array-key-exists) — Verifica si una clave existe en un array
- [array_key_first](#function.array-key-first) — Recupera la primera clave de un array
- [array_key_last](#function.array-key-last) — Recupera la última clave de un array
- [array_keys](#function.array-keys) — Devuelve todas las claves o un conjunto de las claves de un array
- [array_last](#function.array-last) — Obtiene el último valor de un array
- [array_map](#function.array-map) — Aplica una función sobre los elementos de un array
- [array_merge](#function.array-merge) — Fusiona varios arrays en uno solo
- [array_merge_recursive](#function.array-merge-recursive) — Combina uno o varios arrays juntos, de manera recursiva
- [array_multisort](#function.array-multisort) — Ordena los arrays multidimensionales
- [array_pad](#function.array-pad) — Completa un array con un valor hasta la longitud especificada
- [array_pop](#function.array-pop) — Desapila un elemento del final de un array
- [array_product](#function.array-product) — Calcula el producto de los valores del array
- [array_push](#function.array-push) — Apila uno o más elementos al final de un array
- [array_rand](#function.array-rand) — Toma una o varias claves, al azar en un array
- [array_reduce](#function.array-reduce) — Reduce itérativemente un array
- [array_replace](#function.array-replace) — Sustituye los elementos de un array por los de otros arrays
- [array_replace_recursive](#function.array-replace-recursive) — Sustituye recursivamente en el primer array los elementos de los otros arrays proporcionados
- [array_reverse](#function.array-reverse) — Invierte el orden de los elementos de un array
- [array_search](#function.array-search) — Busca en un array la primera clave asociada al valor
- [array_shift](#function.array-shift) — Despila un elemento al principio de un array
- [array_slice](#function.array-slice) — Extrae una porción de array
- [array_splice](#function.array-splice) — Elimina y reemplaza una porción de array
- [array_sum](#function.array-sum) — Calcula la suma de los valores del array
- [array_udiff](#function.array-udiff) — Calcula la diferencia entre dos arrays utilizando una función de retrollamada
- [array_udiff_assoc](#function.array-udiff-assoc) — Calcula la diferencia entre arrays con verificación de índices,
  compara los datos con una función de retrollamada
- [array_udiff_uassoc](#function.array-udiff-uassoc) — Calcula la diferencia entre dos arrays asociativos, compara los datos y los índices con una función de retorno
- [array_uintersect](#function.array-uintersect) — Calcula la intersección de dos arrays, compara los datos utilizando una función de retrollamada
- [array_uintersect_assoc](#function.array-uintersect-assoc) — Calcula la intersección de dos arrays con pruebas sobre el índice,
  compara los datos utilizando una función de retrollamada
- [array_uintersect_uassoc](#function.array-uintersect-uassoc) — Calcula la intersección de dos arrays con pruebas en el índice,
  compara los datos y los índices de los dos arrays utilizando
  una función de retrollamada separada
- [array_unique](#function.array-unique) — Elimina los valores duplicados de un array
- [array_unshift](#function.array-unshift) — Empila uno o más elementos al inicio de un array
- [array_values](#function.array-values) — Devuelve todos los valores de un array
- [array_walk](#function.array-walk) — Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array
- [array_walk_recursive](#function.array-walk-recursive) — Aplica una función de retrollamada de manera recursiva a cada miembro de un array
- [arsort](#function.arsort) — Ordena un array en orden descendente y conserva la asociación de los índices
- [asort](#function.asort) — Ordena un array en orden ascendente y conserva la asociación de los índices
- [compact](#function.compact) — Crea un array a partir de variables y su valor
- [count](#function.count) — Cuenta todos los elementos de un array o en un objeto Countable
- [current](#function.current) — Devuelve el elemento actual del array
- [each](#function.each) — Devuelve cada par clave/valor de un array
- [end](#function.end) — Posiciona el puntero del array al final del array
- [extract](#function.extract) — Importa variables al símbolo actual desde un array
- [in_array](#function.in-array) — Indica si un valor pertenece a un array
- [key](#function.key) — Devuelve una clave de un array asociativo
- [key_exists](#function.key-exists) — Alias de array_key_exists
- [krsort](#function.krsort) — Ordena un array según las claves en orden descendente
- [ksort](#function.ksort) — Ordena un array según las claves en orden ascendente
- [list](#function.list) — Asigna variables como si fueran un array
- [natcasesort](#function.natcasesort) — Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas
- [natsort](#function.natsort) — Ordena un array con el algoritmo de "orden natural"
- [next](#function.next) — Avance el puntero interno de un array
- [pos](#function.pos) — Alias de current
- [prev](#function.prev) — Retrocede el puntero actual del array
- [range](#function.range) — Crea un array que contiene un intervalo de elementos
- [reset](#function.reset) — Reinicia el puntero interno del array al principio
- [rsort](#function.rsort) — Ordena un array en orden decreciente
- [shuffle](#function.shuffle) — Mezcla los elementos de un array
- [sizeof](#function.sizeof) — Alias de count
- [sort](#function.sort) — Ordena un array en orden creciente
- [uasort](#function.uasort) — Ordena un array utilizando una función de retrollamada
- [uksort](#function.uksort) — Ordena un array por sus claves utilizando una función de retrollamada
- [usort](#function.usort) — Ordena un array utilizando una función de comparación
  </li>
