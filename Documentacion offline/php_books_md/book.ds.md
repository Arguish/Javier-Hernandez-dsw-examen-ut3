# Estructuras de datos

# Introducción

    Estructuras de datos eficientes para PHP 7, proporcionadas como alternativa a los [array](#language.types.array).




    Ver [» este post de blog](https://medium.com/p/9dda7af674cd)
    para benchmarks, discusiones y preguntas frecuentes.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ds.requirements)
- [Instalación](#ds.installation)

    ## Requerimientos

    PHP 7 es requerido por la extensión y el polyfill de compatibilidad.

    ## Instalación

    La forma más sencilla de instalar la extensión es a través de [» PECL](https://pecl.php.net/package/ds)

pecl install ds

     Asimismo, se puede construir directamente a partir de la fuente:

# Dependencias que podrían ser necesarias instalar

# sudo apt-get install git build-essential php7.0-dev

git clone https://github.com/php-ds/extension "php-ds"
cd php-ds

# Compilar e instalar la extensión

phpize
./configure
make
make install

# Limpiar los ficheros de compilación

make clean
phpize --clean

**Nota**:

        Si se utiliza Composer, se recomienda encarecidamente incluir
        [» php-ds/php-ds](https://packagist.org/packages/php-ds/php-ds)
        en el proyecto para que el código sea siempre funcional en un entorno donde la extensión
        no esté instalada. La extensión tendrá prioridad si está instalada.

# Ejemplos

**Ejemplo #1 Vector**

&lt;?php

$vector = new \Ds\Vector();

$vector-&gt;push('a');
$vector-&gt;push('b', 'c');

$vector[] = 'd';

print_r($vector);

?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
)

**Ejemplo #2 Map**

&lt;?php

$map = new \Ds\Map();

$map-&gt;put('a', 1);
$map-&gt;put('b', 2);

$map['c'] = 3;

print_r($map);

?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

# La interfaz Collection

(PECL ds &gt;= 1.0.0)

## Introducción

    **Ds\Collection** es la interfaz base que cubre las funcionalidades
    comunes a todas las estructuras de datos de esta biblioteca. Garantiza que todas las estructuras
    son recorribles, contables y pueden ser convertidas en json utilizando [json_encode()](#function.json-encode).

## Sinopsis de la Interfaz

    interface **Ds\Collection**

    extends
      [Countable](#class.countable),
     [IteratorAggregate](#class.iteratoraggregate),
     [JsonSerializable](#class.jsonserializable) {

    /* Métodos */

public [clear](#ds-collection.clear)(): [void](language.types.void.html)
public [copy](#ds-collection.copy)(): [Ds\Collection](#class.ds-collection)
public [isEmpty](#ds-collection.isempty)(): [bool](#language.types.boolean)
public [toArray](#ds-collection.toarray)(): [array](#language.types.array)

    /* Métodos heredados */
    public [Countable::count](#countable.count)(): [int](#language.types.integer)

    public [IteratorAggregate::getIterator](#iteratoraggregate.getiterator)(): [Traversable](#class.traversable)

    public [JsonSerializable::jsonSerialize](#jsonserializable.jsonserialize)(): [mixed](#language.types.mixed)

}

## Historial de cambios

       Versión
       Descripción






       PECL ds 1.4.0

        **Collection** implementa
        [JsonSerializable](#class.jsonserializable) en lugar de [Serializable](#class.serializable). (Este cambio fue añadido al polyfill en la versión 1.4.1.)





# Ds\Collection::clear

(PECL ds &gt;= 1.0.0)

Ds\Collection::clear — Eliminar todos los valores

### Descripción

public **Ds\Collection::clear**(): [void](language.types.void.html)

    Eliminar todos los valores de la colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ds\Collection::clear()** example

&lt;?php
$collection = new \Ds\Vector([1, 2, 3]);
print_r($collection);

$collection-&gt;clear();
print_r($collection);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Vector Object
(
)

# Ds\Collection::copy

(PECL ds &gt;= 1.0.0)

Ds\Collection::copy — Devuelve una copia superficial de la colección

### Descripción

public **Ds\Collection::copy**(): [Ds\Collection](#class.ds-collection)

    Devuelve una copia superficial de la colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial de la colección.

### Ejemplos

**Ejemplo #1 Ds\Collection::copy()** ejemplo

&lt;?php
$a = new \Ds\Vector([1, 2, 3]);
$b = $a-&gt;copy();

$b-&gt;push(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
)

# Ds\Collection::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Collection::isEmpty — Indica si la colección está vacía

### Descripción

public **Ds\Collection::isEmpty**(): [bool](#language.types.boolean)

    Indica si la colección está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la colección está vacía, **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ds\Collection::isEmpty()** ejemplo

&lt;?php
$a = new \Ds\Vector([1, 2, 3]);
$b = new \Ds\Vector();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Collection::toArray

(PECL ds &gt;= 1.0.0)

Ds\Collection::toArray —
Convierte la colección en un [array](#language.types.array)

### Descripción

public **Ds\Collection::toArray**(): [array](#language.types.array)

    Convierte la colección en un [array](#language.types.array).

**Nota**:

        La conversión a un [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que la colección.

### Ejemplos

**Ejemplo #1 Ds\Collection::toArray()** ejemplo

&lt;?php
$collection = new \Ds\Vector([1, 2, 3]);

var_dump($collection-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

## Tabla de contenidos

- [Ds\Collection::clear](#ds-collection.clear) — Eliminar todos los valores
- [Ds\Collection::copy](#ds-collection.copy) — Devuelve una copia superficial de la colección
- [Ds\Collection::isEmpty](#ds-collection.isempty) — Indica si la colección está vacía
- [Ds\Collection::toArray](#ds-collection.toarray) — Convierte la colección en un array

# La interface Hashable

(PECL ds &gt;= 1.0.0)

## Introducción

        Hashable es una interface que permite a los objetos ser usados como claves.
        Esta es una alternativa a [spl_object_hash()](#function.spl-object-hash),
        la cual determina el hash de un objeto basado en su gestor:
        estos significa que dos objetos que son considerados iguales por una implícita
        definición no serán tratados como iguales debido a que no son la misma instancia.




        [hash()](#function.hash) es utilizada para devolver un valor escalar para ser usado como
        el valor hash del objeto, el cual determina donde este va en la tabla hash.
        Aunque este valor no tiene que ser único, los objetos los cuales son iguales deben
        tener el mismo valor hash.




        **equals()** es utilizada para determinar si dos objetos son iguales.
        Está garantizado que el objeto de comparación será una instancia de la misma clase
        que el sujeto.

## Sinopsis de la Interfaz

    interface **Ds\Hashable** {

    /* Métodos */

abstract public [equals](#ds-hashable.equals)([object](#language.types.object) $obj): [bool](#language.types.boolean)
abstract public [hash](#ds-hashable.hash)(): [mixed](#language.types.mixed)

}

# Ds\Hashable::equals

(PECL ds &gt;= 1.0.0)

Ds\Hashable::equals — Determina si un objeto es igual a la instancia actual

### Descripción

abstract public **Ds\Hashable::equals**([object](#language.types.object) $obj): [bool](#language.types.boolean)

    Determina si otro objeto es igual a la instancia actual.





    Este método permite utilizar objetos como claves en estructuras tales como
    [Ds\Map](#class.ds-map) y [Ds\Set](#class.ds-set), o cualquier otra
    estructura de búsqueda que respete esta interfaz.

**Nota**:

        Se garantiza que obj es una instancia de la misma clase.

**Precaución**

        Es importante que los objetos que son iguales tengan también el mismo valor de hash.
        Ver [Ds\Hashable::hash()](#ds-hashable.hash).

### Parámetros

    obj


        El objeto a comparar con la instancia actual, que siempre es una instancia de
        la misma clase.


### Valores devueltos

    **[true](#constant.true)** si los objetos son iguales, de lo contrario **[false](#constant.false)**.

# Ds\Hashable::hash

(PECL ds &gt;= 1.0.0)

Ds\Hashable::hash — Devuelve un valor escalar para usar como valor de hash

### Descripción

abstract public **Ds\Hashable::hash**(): [mixed](#language.types.mixed)

    Devuelve un valor escalar para usar como valor de hash de los objetos.




    Mientras que el valor de hash no defina la igualdad, todos los objetos que son iguales según [Ds\Hashable::equals()](#ds-hashable.equals)
    deben tener el mismo valor de hash. Los valores de hash de los objetos iguales no tienen que ser únicos, por ejemplo
    se podría simplemente devolver **[true](#constant.true)** para todos los objetos y nada se rompería - la única
    implicación sería que las tablas de hash se convertirían en listas enlazadas porque todos
    los objetos serían hasheados en el mismo cubo. Es por lo tanto muy importante
    que se elija un buen valor de hash, como un ID o una dirección de correo electrónico.





    Este método permite usar objetos como claves en estructuras tales como
    [Ds\Map](#class.ds-map) y [Ds\Set](#class.ds-set), o cualquier otra
    estructura de búsqueda que respete esta interfaz.

**Precaución**

        No elija un valor que podría cambiar en el objeto, como una propiedad pública.
        Las búsquedas en las tablas de hash fallarían porque el hash ha cambiado.

**Precaución**

        Todos los objetos que son iguales deben tener el mismo valor de hash.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un valor escalar para usar como valor de hash de este objeto.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Hashable::hash()**

&lt;?php
class HashableObject implements \Ds\Hashable
{
private $name;
private $email;

    public function __construct($name, $email)
    {
        $this-&gt;name  = $name;
        $this-&gt;email = $email;
    }

    /**
     * Debe devolver el mismo valor para todos los objetos iguales, pero no tiene que
     * ser único. Este valor no será utilizado para determinar la igualdad.
     */
    public function hash()
    {
        return $this-&gt;email;
    }

    /**
     * Determina la igualdad, generalmente durante una búsqueda en una tabla de hash para determinar
     * si la clave del cubo coincide con la clave de búsqueda. El hash debe ser igual si
     * los objetos son iguales, de lo contrario esta determinación no se alcanzaría.
     */
    public function equals($obj): bool
    {
        return $this-&gt;name  === $obj-&gt;name
            &amp;&amp; $this-&gt;email === $obj-&gt;email;
    }

}
?&gt;

## Tabla de contenidos

- [Ds\Hashable::equals](#ds-hashable.equals) — Determina si un objeto es igual a la instancia actual
- [Ds\Hashable::hash](#ds-hashable.hash) — Devuelve un valor escalar para usar como valor de hash

# La interfaz Sequence

(PECL ds &gt;= 1.0.0)

## Introducción

        Una Sequence describe el comportamiento de los valores dispuestos en una sola dimensión lineal.
        Algunos lenguajes se refieren a esto como una "Lista". Es similar a un array que utiliza
        claves enteras incrementales, con la excepción de algunas características:



            - Los valores siempre serán indexados como [0, 1, 2, …, size - 1].

            - Solo los valores por índice en el rango [0, size - 1] están permitidos.




        Casos de uso:



            - En cualquier lugar donde se utilizaría un array como lista (sin preocuparse por las claves).

            - Una alternativa más eficiente a
                [SplDoublyLinkedList](#class.spldoublylinkedlist) y
                [SplFixedArray](#class.splfixedarray).




## Sinopsis de la Interfaz

    interface **Ds\Sequence**

    extends
      [Ds\Collection](#class.ds-collection),
     [ArrayAccess](#class.arrayaccess) {

    /* Métodos */

abstract public [allocate](#ds-sequence.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
abstract public [apply](#ds-sequence.apply)([callable](#language.types.callable) $callback): [void](language.types.void.html)
abstract public [capacity](#ds-sequence.capacity)(): [int](#language.types.integer)
abstract public [contains](#ds-sequence.contains)([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)
abstract public [filter](#ds-sequence.filter)([callable](#language.types.callable) $callback = ?): [Ds\Sequence](#class.ds-sequence)
abstract public [find](#ds-sequence.find)([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)
abstract public [first](#ds-sequence.first)(): [mixed](#language.types.mixed)
abstract public [get](#ds-sequence.get)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
abstract public [insert](#ds-sequence.insert)([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
abstract public [join](#ds-sequence.join)([string](#language.types.string) $glue = ?): [string](#language.types.string)
abstract public [last](#ds-sequence.last)(): [mixed](#language.types.mixed)
abstract public [map](#ds-sequence.map)([callable](#language.types.callable) $callback): [Ds\Sequence](#class.ds-sequence)
abstract public [merge](#ds-sequence.merge)([mixed](#language.types.mixed) $values): [Ds\Sequence](#class.ds-sequence)
abstract public [pop](#ds-sequence.pop)(): [mixed](#language.types.mixed)
abstract public [push](#ds-sequence.push)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
abstract public [reduce](#ds-sequence.reduce)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)
abstract public [remove](#ds-sequence.remove)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
abstract public [reverse](#ds-sequence.reverse)(): [void](language.types.void.html)
abstract public [reversed](#ds-sequence.reversed)(): [Ds\Sequence](#class.ds-sequence)
abstract public [rotate](#ds-sequence.rotate)([int](#language.types.integer) $rotations): [void](language.types.void.html)
abstract public [set](#ds-sequence.set)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
abstract public [shift](#ds-sequence.shift)(): [mixed](#language.types.mixed)
abstract public [slice](#ds-sequence.slice)([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Sequence](#class.ds-sequence)
abstract public [sort](#ds-sequence.sort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
abstract public [sorted](#ds-sequence.sorted)([callable](#language.types.callable) $comparator = ?): [Ds\Sequence](#class.ds-sequence)
abstract public [sum](#ds-sequence.sum)(): [int](#language.types.integer)|[float](#language.types.float)
abstract public [unshift](#ds-sequence.unshift)([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

    /* Métodos heredados */
    public [Ds\Collection::clear](#ds-collection.clear)(): [void](language.types.void.html)

public [Ds\Collection::copy](#ds-collection.copy)(): [Ds\Collection](#class.ds-collection)
public [Ds\Collection::isEmpty](#ds-collection.isempty)(): [bool](#language.types.boolean)
public [Ds\Collection::toArray](#ds-collection.toarray)(): [array](#language.types.array)

    public [Countable::count](#countable.count)(): [int](#language.types.integer)

    public [IteratorAggregate::getIterator](#iteratoraggregate.getiterator)(): [Traversable](#class.traversable)

    public [JsonSerializable::jsonSerialize](#jsonserializable.jsonserialize)(): [mixed](#language.types.mixed)

    public [ArrayAccess::offsetExists](#arrayaccess.offsetexists)([mixed](#language.types.mixed) $offset): [bool](#language.types.boolean)

public [ArrayAccess::offsetGet](#arrayaccess.offsetget)([mixed](#language.types.mixed) $offset): [mixed](#language.types.mixed)
public [ArrayAccess::offsetSet](#arrayaccess.offsetset)([mixed](#language.types.mixed) $offset, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [ArrayAccess::offsetUnset](#arrayaccess.offsetunset)([mixed](#language.types.mixed) $offset): [void](language.types.void.html)

}

## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         Esta interfaz ahora extiende [ArrayAccess](#class.arrayaccess).






# Ds\Sequence::allocate

(PECL ds &gt;= 1.0.0)

Ds\Sequence::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

abstract public **Ds\Sequence::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::allocate()**

&lt;?php
$sequence = new \Ds\Vector();
var_dump($sequence-&gt;capacity());

$vector-&gt;allocate(100);
var_dump($sequence-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(100)

# Ds\Sequence::apply

(PECL ds &gt;= 1.0.0)

Ds\Sequence::apply — Actualiza todos los valores aplicando una retrollamada a cada valor

### Descripción

abstract public **Ds\Sequence::apply**([callable](#language.types.callable) $callback): [void](language.types.void.html)

    Actualiza todos los valores aplicando una callback a
    cada valor en la secuencia.

### Parámetros

    callback






                callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



            Un [callable](#language.types.callable) a aplicar a cada valor del mapa.





            La retrollamada debe devolver el valor por el cual debe ser reemplazado.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::apply()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);
$sequence-&gt;apply(function($value) { return $value \* 2; });

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)

# Ds\Sequence::capacity

(PECL ds &gt;= 1.0.0)

Ds\Sequence::capacity — Devuelve la capacidad actual

### Descripción

abstract public **Ds\Sequence::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::capacity()**

&lt;?php
$sequence = new \Ds\Vector();
var_dump($sequence-&gt;capacity());

$sequence-&gt;push(...range(1, 50));
var_dump($sequence-&gt;capacity());

$sequence[] = "a";
var_dump($sequence-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(50)
int(75)

# Ds\Sequence::contains

(PECL ds &gt;= 1.0.0)

Ds\Sequence::contains — Determina si la secuencia contiene valores dados

### Descripción

abstract public **Ds\Sequence::contains**([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)

    Determina si la secuencia contiene todos los valores.

### Parámetros

    values


        Los valores a verificar.


### Valores devueltos

    **[false](#constant.false)** si uno de los values proporcionados no está en la
    secuencia, **[true](#constant.true)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::contains()**

&lt;?php
$sequence = new \Ds\Vector(['a', 'b', 'c', 1, 2, 3]);

var_dump($sequence-&gt;contains('a'));                // true
var_dump($sequence-&gt;contains('a', 'b')); // true
var_dump($sequence-&gt;contains('c', 'd')); // false

var_dump($sequence-&gt;contains(...['c', 'b', 'a'])); // true

// Siempre estricto
var_dump($sequence-&gt;contains(1));                  // true
var_dump($sequence-&gt;contains('1')); // false

var_dump($sequence-&gt;contains(...[])); // true
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(false)
bool(true)

# Ds\Sequence::filter

(PECL ds &gt;= 1.0.0)

Ds\Sequence::filter —
Crear una nueva secuencia utilizando un [callable](#language.types.callable) para
determinar qué valores incluir

### Descripción

abstract public **Ds\Sequence::filter**([callable](#language.types.callable) $callback = ?): [Ds\Sequence](#class.ds-sequence)

    Crear una nueva secuencia utilizando un [callable](#language.types.callable) para
    determinar qué valores incluir.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

            Un [callable](#language.types.callable) opcional que devuelve **[true](#constant.true)** si el par debe ser incluido, **[false](#constant.false)** en caso contrario.




            Si no se proporciona ninguna función de retrollamada, solo se incluirán los valores que son **[true](#constant.true)**
            (ver [conversión en booléen](#language.types.boolean.casting)).


### Valores devueltos

    Una nueva secuencia que contiene todos los pares para los cuales
    el callback ha devuelto **[true](#constant.true)**, o todos los valores que
    se convierten en **[true](#constant.true)** si no se ha proporcionado un callback.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::filter()** utilizando una función de retrollamada

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3, 4, 5]);

var_dump($sequence-&gt;filter(function($value) {
return $value % 2 == 0;
}));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#3 (2) {
[0]=&gt;
int(2)
[1]=&gt;
int(4)
}

**Ejemplo #2 Ejemplo de Ds\Sequence::filter()** sin función de retrollamada

&lt;?php
$sequence = new \Ds\Vector([0, 1, 'a', true, false]);

var_dump($sequence-&gt;filter());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
string(1) "a"
[2]=&gt;
bool(true)
}

# Ds\Sequence::find

(PECL ds &gt;= 1.0.0)

Ds\Sequence::find —
Intenta encontrar el índice de un valor.

### Descripción

abstract public **Ds\Sequence::find**([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

    Devuelve el índice del valor, o **[false](#constant.false)** si no se encuentra.

### Parámetros

    value


        El valor a encontrar.


### Valores devueltos

    El índice del valor, o **[false](#constant.false)** si no se encuentra.

**Nota**:

            Los valores serán comparados por valor y por tipo.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::find()**

&lt;?php
$sequence = new \Ds\Vector(["a", 1, true]);

var_dump($sequence-&gt;find("a")); // 0
var_dump($sequence-&gt;find("b")); // false
var_dump($sequence-&gt;find("1")); // false
var_dump($sequence-&gt;find(1)); // 1
?&gt;

Resultado del ejemplo anterior es similar a:

int(0)
bool(false)
bool(false)
int(1)

# Ds\Sequence::first

(PECL ds &gt;= 1.0.0)

Ds\Sequence::first — Devuelve el primer valor de la secuencia

### Descripción

abstract public **Ds\Sequence::first**(): [mixed](#language.types.mixed)

    Devuelve el primer valor de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el primer valor de la secuencia.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::first()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);
var_dump($sequence-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

# Ds\Sequence::get

(PECL ds &gt;= 1.0.0)

Ds\Sequence::get — Devuelve el valor en un índice dado

### Descripción

abstract public **Ds\Sequence::get**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Devuelve el valor en un índice dado.

### Parámetros

    index


        El índice al que se desea acceder, comenzando en 0.


### Valores devueltos

    El valor en el índice solicitado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::get()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

var_dump($sequence-&gt;get(0));
var_dump($sequence-&gt;get(1));
var_dump($sequence-&gt;get(2));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

**Ejemplo #2 Ejemplo de Ds\Sequence::get()** utilizando la sintaxis de array

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

var_dump($sequence[0]);
var_dump($sequence[1]);
var_dump($sequence[2]);
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Sequence::insert

(PECL ds &gt;= 1.0.0)

Ds\Sequence::insert — Inserta valores en un índice dado

### Descripción

abstract public **Ds\Sequence::insert**([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Inserta valores en la secuencia en un índice dado.

### Parámetros

    index


        El índice en el cual insertar. 0 &lt;= index &lt;= count



     **Nota**:



            Es posible insertar en el índice igual al número de valores.







    values


        El o los valores a insertar.


### Valores devueltos

    No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::insert()**

&lt;?php
$sequence = new \Ds\Vector();

$sequence-&gt;insert(0, "e");             // [e]
$sequence-&gt;insert(1, "f"); // [e, f]
$sequence-&gt;insert(2, "g");             // [e, f, g]
$sequence-&gt;insert(0, "a", "b"); // [a, b, e, f, g]
$sequence-&gt;insert(2, ...["c", "d"]); // [a, b, c, d, e, f, g]

var_dump($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#1 (7) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[2]=&gt;
string(1) "c"
[3]=&gt;
string(1) "d"
[4]=&gt;
string(1) "e"
[5]=&gt;
string(1) "f"
[6]=&gt;
string(1) "g"
}

# Ds\Sequence::join

(PECL ds &gt;= 1.0.0)

Ds\Sequence::join — Reúne todos los valores en un string

### Descripción

abstract public **Ds\Sequence::join**([string](#language.types.string) $glue = ?): [string](#language.types.string)

    Reúne todos los valores en un string utilizando un separador opcional entre cada valor.

### Parámetros

    glue


        Un string opcional para separar cada valor.


### Valores devueltos

    Todos los valores de la secuencia reunidos en un string.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::join()** con un string separador

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c", 1, 2, 3]);

var_dump($sequence-&gt;join("|"));
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "a|b|c|1|2|3"

**Ejemplo #2 Ejemplo de Ds\Sequence::join()** sin string separador

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c", 1, 2, 3]);

var_dump($sequence-&gt;join());
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "abc123"

# Ds\Sequence::last

(PECL ds &gt;= 1.0.0)

Ds\Sequence::last — Devuelve el último valor

### Descripción

abstract public **Ds\Sequence::last**(): [mixed](#language.types.mixed)

    Devuelve el último valor de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor de la secuencia.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::last()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);
var_dump($sequence-&gt;last());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)

# Ds\Sequence::map

(PECL ds &gt;= 1.0.0)

Ds\Sequence::map — Devuelve el resultado de la aplicación de una retrollamada a cada valor

### Descripción

abstract public **Ds\Sequence::map**([callable](#language.types.callable) $callback): [Ds\Sequence](#class.ds-sequence)

    Devuelve el resultado de la aplicación de callback a
    cada valor de la deque.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

            Una retrollamada a aplicar a cada valor de la deque.





            La retrollamada debe tomar un argumento y devolver el nuevo valor.


### Valores devueltos

    El resultado de la aplicación de callback a cada valor
    de la deque.

**Nota**:

        Los valores de la instancia actual no se verán afectados.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::map()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

print_r($sequence-&gt;map(function($value) { return $value * 2; }));
print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)
Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)

# Ds\Sequence::merge

(PECL ds &gt;= 1.0.0)

Ds\Sequence::merge — Devuelve el resultado de la adición de todos los valores de la secuencia

### Descripción

abstract public **Ds\Sequence::merge**([mixed](#language.types.mixed) $values): [Ds\Sequence](#class.ds-sequence)

    Devuelve el resultado de la adición de todos los valores de la secuencia.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array).


### Valores devueltos

    El resultado de la adición de todos los valores dados a la secuencia,
    efectivamente el mismo que añadir los valores a una copia, y luego devolver esta copia.

**Nota**:

        La instancia actual no será afectada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::merge()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

var_dump($sequence-&gt;merge([4, 5, 6]));
var_dump($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (6) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
int(4)
[4]=&gt;
int(5)
[5]=&gt;
int(6)
}
object(Ds\Vector)#1 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Sequence::pop

(PECL ds &gt;= 1.0.0)

Ds\Sequence::pop — Elimina y devuelve el último valor

### Descripción

abstract public **Ds\Sequence::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el último valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::pop()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

var_dump($sequence-&gt;pop());
var_dump($sequence-&gt;pop());
var_dump($sequence-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(2)
int(1)

# Ds\Sequence::push

(PECL ds &gt;= 1.0.0)

Ds\Sequence::push — Añade valores al final de la secuencia

### Descripción

abstract public **Ds\Sequence::push**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade valores al final de la secuencia.

### Parámetros

    values


        Los valores a añadir.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::push()**

&lt;?php
$sequence = new \Ds\Vector();

$sequence-&gt;push("a");
$sequence-&gt;push("b");
$sequence-&gt;push("c", "d");
$sequence-&gt;push(...["e", "f"]);

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
[4] =&gt; e
[5] =&gt; f
)

# Ds\Sequence::reduce

(PECL ds &gt;= 1.0.0)

Ds\Sequence::reduce — Reduce la secuencia a un solo valor utilizando una función de retrollamada

### Descripción

abstract public **Ds\Sequence::reduce**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)

    Reduce la secuencia a un solo valor utilizando una función de retrollamada.

### Parámetros

    callback


      callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



        carry


          El valor de retorno de la retrollamada anterior, o initial si
          es la primera iteración.






        value


          El valor de la iteración actual.










    initial


        El valor inicial del valor de retorno. Puede ser **[null](#constant.null)**.


### Valores devueltos

    El valor de retorno de la retrollamada final.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::reduce()** con un valor inicial

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

$callback = function($carry, $value) {
return $carry \* $value;
};

var_dump($sequence-&gt;reduce($callback, 5));

// Iteraciones:
//
// $carry = $initial = 5
//
// $carry = $carry _ 1 = 5
// $carry = $carry _ 2 = 10
// $carry = $carry \* 3 = 30
?&gt;

Resultado del ejemplo anterior es similar a:

int(30)

**Ejemplo #2 Ejemplo de Ds\Sequence::reduce()** sin valor inicial

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

var_dump($sequence-&gt;reduce(function($carry, $value) {
return $carry + $value + 5;
}));

// Iteraciones:
//
// $carry = $initial = null
//
// $carry = $carry + 1 + 5 = 6
// $carry = $carry + 2 + 5 = 13
// $carry = $carry + 3 + 5 = 21
?&gt;

Resultado del ejemplo anterior es similar a:

int(21)

# Ds\Sequence::remove

(PECL ds &gt;= 1.0.0)

Ds\Sequence::remove — Elimina y devuelve un valor por índice

### Descripción

abstract public **Ds\Sequence::remove**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Elimina y devuelve un valor por índice.

### Parámetros

    index


        El índice del valor a eliminar.


### Valores devueltos

    El valor que ha sido eliminado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::remove()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

var_dump($sequence-&gt;remove(1));
var_dump($sequence-&gt;remove(0));
var_dump($sequence-&gt;remove(0));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "b"
string(1) "a"
string(1) "c"

# Ds\Sequence::reverse

(PECL ds &gt;= 1.0.0)

Ds\Sequence::reverse —
Invierte la secuencia en el lugar

### Descripción

abstract public **Ds\Sequence::reverse**(): [void](language.types.void.html)

    Invierte la secuencia en el lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::reverse()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);
$sequence-&gt;reverse();

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)

# Ds\Sequence::reversed

(PECL ds &gt;= 1.0.0)

Ds\Sequence::reversed — Devuelve una copia invertida

### Descripción

abstract public **Ds\Sequence::reversed**(): [Ds\Sequence](#class.ds-sequence)

    Devuelve una copia invertida de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una copia invertida de la secuencia.

**Nota**:

            La instancia actual no se ve afectada.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::reversed()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

print_r($sequence-&gt;reversed());
print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)
Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
)

# Ds\Sequence::rotate

(PECL ds &gt;= 1.0.0)

Ds\Sequence::rotate — Rota la secuencia un número dado de rotaciones

### Descripción

abstract public **Ds\Sequence::rotate**([int](#language.types.integer) $rotations): [void](language.types.void.html)

    Rota la secuencia un cierto número de rotaciones, lo que equivale a llamar sucesivamente
    $deque-&gt;push($deque-&gt;shift()) si el número de rotaciones es positivo, o
    $deque-&gt;unshift($deque-&gt;pop()) si es negativo.

### Parámetros

    rotations


        El número de veces que la secuencia debe ser rotada.


### Valores devueltos

    No se retorna ningún valor.. La secuencia de la instancia actual será rotada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::rotate()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c", "d"]);

$sequence-&gt;rotate(1);  // "a" es desplazado, luego empujado.
print_r($sequence);

$sequence-&gt;rotate(2);  // "b" y "c" son ambos desplazados, luego empujados.
print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; a
)
Ds\Vector Object
(
[0] =&gt; d
[1] =&gt; a
[2] =&gt; b
[3] =&gt; c
)

# Ds\Sequence::set

(PECL ds &gt;= 1.0.0)

Ds\Sequence::set — Actualiza un valor en un índice dado

### Descripción

abstract public **Ds\Sequence::set**([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    Actualiza un valor en un índice dado.

### Parámetros

    index


        El índice del valor a actualizar.






    value


        El nuevo valor.










    ### Valores devueltos


        No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::set()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

$sequence-&gt;set(1, "_");
print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

**Ejemplo #2 Ejemplo de Ds\Sequence::set()** utilizando la sintaxis de array

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

$sequence[1] = "_";
print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

# Ds\Sequence::shift

(PECL ds &gt;= 1.0.0)

Ds\Sequence::shift — Elimina y devuelve el primer valor

### Descripción

abstract public **Ds\Sequence::shift**(): [mixed](#language.types.mixed)

    Elimina y devuelve el primer valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El primer valor, que ha sido eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::shift()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c"]);

var_dump($sequence-&gt;shift());
var_dump($sequence-&gt;shift());
var_dump($sequence-&gt;shift());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Sequence::slice

(PECL ds &gt;= 1.0.0)

Ds\Sequence::slice —
Devuelve una subsecuencia de un rango dado

### Descripción

abstract public **Ds\Sequence::slice**([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Sequence](#class.ds-sequence)

    Crear una subsecuencia de un rango dado.

### Parámetros

    index


            El índice en el que comienza la subsecuencia.




            Si es positivo, el sub-deque comenzará en este índice en el deque.
            Si es negativo, el sub-deque comenzará a esta distancia del final.






    length


        Si se da una longitud y es positiva, el sub-deque resultante
        tendrá hasta tantos valores.

        Si la longitud causa un desbordamiento, solo
        los valores hasta el final del deque serán incluidos.

        Si se da una longitud y es negativa, el sub-deque
        se detendrá a tantos valores del final.

        Si no se proporciona una longitud, el sub-deque
        contendrá todos los valores entre el índice y el
        final de la secuencia.


### Valores devueltos

    Una subsecuencia del rango dado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::slice()**

&lt;?php
$sequence = new \Ds\Vector(["a", "b", "c", "d", "e"]);

// Recorte a partir de 2
print_r($sequence-&gt;slice(2));

// Recorte a partir de 1, para una longitud de 3
print_r($sequence-&gt;slice(1, 3));

// Recorte a partir de 1 en adelante
print_r($sequence-&gt;slice(1));

// Recorte a partir de 2 hacia atrás
print_r($sequence-&gt;slice(-2));

// Recorte de 1 a 1 del final
print_r($sequence-&gt;slice(1, -1));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; d
[2] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; d
[1] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)

# Ds\Sequence::sort

(PECL ds &gt;= 1.0.0)

Ds\Sequence::sort —
Ordena la secuencia en su lugar

### Descripción

abstract public **Ds\Sequence::sort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena la secuencia en su lugar, utilizando una función de comparación opcional comparator.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::sort()**

&lt;?php
$sequence = new \Ds\Vector([4, 5, 1, 3, 2]);
$sequence-&gt;sort();

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Sequence::sort()** utilizando un comparador

&lt;?php
$sequence = new \Ds\Vector([4, 5, 1, 3, 2]);

$sequence-&gt;sort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Sequence::sorted

(PECL ds &gt;= 1.0.0)

Ds\Sequence::sorted — Devuelve una copia ordenada

### Descripción

abstract public **Ds\Sequence::sorted**([callable](#language.types.callable) $comparator = ?): [Ds\Sequence](#class.ds-sequence)

    Devuelve una copia ordenada de la secuencia, utilizando una función de comparación opcional comparator.

### Parámetros

     comparator



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

    Devuelve una copia ordenada de la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::sorted()**

&lt;?php
$sequence = new \Ds\Vector([4, 5, 1, 3, 2]);

print_r($sequence-&gt;sorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Sequence::sorted()** utilizando un comparador

&lt;?php
$sequence = new \Ds\Vector([4, 5, 1, 3, 2]);

$sorted = $sequence-&gt;sorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Sequence::sum

(PECL ds &gt;= 1.0.0)

Ds\Sequence::sum — Devuelve la suma de todos los valores de la secuencia

### Descripción

abstract public **Ds\Sequence::sum**(): [int](#language.types.integer)|[float](#language.types.float)

    Devuelve la suma de todos los valores de la secuencia.

**Nota**:

        Los arrays y los objetos se consideran iguales a cero en el cálculo de la suma.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La suma de todos los valores de la secuencia como [float](#language.types.float) o [int](#language.types.integer)
    dependiendo de los valores de la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::sum()** con un entero

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);
var_dump($sequence-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

int(6)

**Ejemplo #2 Ejemplo de Ds\Sequence::sum()** con un número de punto flotante

&lt;?php
$sequence = new \Ds\Vector([1, 2.5, 3]);
var_dump($sequence-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

float(6.5)

# Ds\Sequence::unshift

(PECL ds &gt;= 1.0.0)

Ds\Sequence::unshift — Añade valores al inicio de la secuencia

### Descripción

abstract public **Ds\Sequence::unshift**([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

    Añade valores al inicio de la secuencia, desplazando todos los valores actuales
    hacia adelante para hacer espacio para los nuevos valores.

### Parámetros

    values


        Los valores a añadir al inicio de la secuencia.


**Nota**:

                Varios valores serán añadidos en el mismo orden en que son
                pasados.






### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Sequence::unshift()**

&lt;?php
$sequence = new \Ds\Vector([1, 2, 3]);

$sequence-&gt;unshift("a");
$sequence-&gt;unshift("b", "c");

print_r($sequence);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; a
[3] =&gt; 1
[4] =&gt; 2
[5] =&gt; 3
)

## Tabla de contenidos

- [Ds\Sequence::allocate](#ds-sequence.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Sequence::apply](#ds-sequence.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Sequence::capacity](#ds-sequence.capacity) — Devuelve la capacidad actual
- [Ds\Sequence::contains](#ds-sequence.contains) — Determina si la secuencia contiene valores dados
- [Ds\Sequence::filter](#ds-sequence.filter) — Crear una nueva secuencia utilizando un callable para
  determinar qué valores incluir
- [Ds\Sequence::find](#ds-sequence.find) — Intenta encontrar el índice de un valor.
- [Ds\Sequence::first](#ds-sequence.first) — Devuelve el primer valor de la secuencia
- [Ds\Sequence::get](#ds-sequence.get) — Devuelve el valor en un índice dado
- [Ds\Sequence::insert](#ds-sequence.insert) — Inserta valores en un índice dado
- [Ds\Sequence::join](#ds-sequence.join) — Reúne todos los valores en un string
- [Ds\Sequence::last](#ds-sequence.last) — Devuelve el último valor
- [Ds\Sequence::map](#ds-sequence.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Sequence::merge](#ds-sequence.merge) — Devuelve el resultado de la adición de todos los valores de la secuencia
- [Ds\Sequence::pop](#ds-sequence.pop) — Elimina y devuelve el último valor
- [Ds\Sequence::push](#ds-sequence.push) — Añade valores al final de la secuencia
- [Ds\Sequence::reduce](#ds-sequence.reduce) — Reduce la secuencia a un solo valor utilizando una función de retrollamada
- [Ds\Sequence::remove](#ds-sequence.remove) — Elimina y devuelve un valor por índice
- [Ds\Sequence::reverse](#ds-sequence.reverse) — Invierte la secuencia en el lugar
- [Ds\Sequence::reversed](#ds-sequence.reversed) — Devuelve una copia invertida
- [Ds\Sequence::rotate](#ds-sequence.rotate) — Rota la secuencia un número dado de rotaciones
- [Ds\Sequence::set](#ds-sequence.set) — Actualiza un valor en un índice dado
- [Ds\Sequence::shift](#ds-sequence.shift) — Elimina y devuelve el primer valor
- [Ds\Sequence::slice](#ds-sequence.slice) — Devuelve una subsecuencia de un rango dado
- [Ds\Sequence::sort](#ds-sequence.sort) — Ordena la secuencia en su lugar
- [Ds\Sequence::sorted](#ds-sequence.sorted) — Devuelve una copia ordenada
- [Ds\Sequence::sum](#ds-sequence.sum) — Devuelve la suma de todos los valores de la secuencia
- [Ds\Sequence::unshift](#ds-sequence.unshift) — Añade valores al inicio de la secuencia

# La clase Vector

(PECL ds &gt;= 1.0.0)

## Introducción

    Un Vector es una secuencia de valores en un buffer que crece y se encoge automáticamente. Esta es la más eficiente estructura secuencial debido a que el índice de un valor es un mapeo directo a su índice en el buffer, y el factor de crecimiento no está ligado a un multiplo o exponente específico.








    ## Fortalezas





            - Soporta la sintaxis array (corchetes).

            - Usa menos memoria general que un [array](#language.types.array) para el mismo número de valores.

            - Automáticamente libera la memoria asignada cuando su tamaño cae lo suficientemente bajo.

            - La capacidad no tiene que ser una potencia de 2.

            -
                **get()**,
                **set()**,
                **push()**,
                **pop()** son todos O(1).







    ## Debilidades





            -
                **shift()**,
                **unshift()**,
                **insert()** y
                **remove()** son todos O(n).




## Sinopsis de la Clase

     ****





     class **Ds\Vector**
     implements  [Ds\Sequence](#class.ds-sequence),  [ArrayAccess](#class.arrayaccess) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-vector.constants.min-capacity) = 10;


    /* Métodos */

public [allocate](#ds-vector.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [apply](#ds-vector.apply)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [capacity](#ds-vector.capacity)(): [int](#language.types.integer)
public [clear](#ds-vector.clear)(): [void](language.types.void.html)
public [contains](#ds-vector.contains)([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)
public [copy](#ds-vector.copy)(): [Ds\Vector](#class.ds-vector)
public [filter](#ds-vector.filter)([callable](#language.types.callable) $callback = ?): [Ds\Vector](#class.ds-vector)
public [find](#ds-vector.find)([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)
public [first](#ds-vector.first)(): [mixed](#language.types.mixed)
public [get](#ds-vector.get)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [insert](#ds-vector.insert)([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [isEmpty](#ds-vector.isempty)(): [bool](#language.types.boolean)
public [join](#ds-vector.join)([string](#language.types.string) $glue = ?): [string](#language.types.string)
public [last](#ds-vector.last)(): [mixed](#language.types.mixed)
public [map](#ds-vector.map)([callable](#language.types.callable) $callback): [Ds\Vector](#class.ds-vector)
public [merge](#ds-vector.merge)([mixed](#language.types.mixed) $values): [Ds\Vector](#class.ds-vector)
public [pop](#ds-vector.pop)(): [mixed](#language.types.mixed)
public [push](#ds-vector.push)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [reduce](#ds-vector.reduce)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)
public [remove](#ds-vector.remove)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [reverse](#ds-vector.reverse)(): [void](language.types.void.html)
public [reversed](#ds-vector.reversed)(): [Ds\Vector](#class.ds-vector)
public [rotate](#ds-vector.rotate)([int](#language.types.integer) $rotations): [void](language.types.void.html)
public [set](#ds-vector.set)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [shift](#ds-vector.shift)(): [mixed](#language.types.mixed)
public [slice](#ds-vector.slice)([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Vector](#class.ds-vector)
public [sort](#ds-vector.sort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
public [sorted](#ds-vector.sorted)([callable](#language.types.callable) $comparator = ?): [Ds\Vector](#class.ds-vector)
public [sum](#ds-vector.sum)(): [int](#language.types.integer)|[float](#language.types.float)
public [toArray](#ds-vector.toarray)(): [array](#language.types.array)
public [unshift](#ds-vector.unshift)([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

}

## Constantes predefinidas

     **[Ds\Vector::MIN_CAPACITY](#ds-vector.constants.min-capacity)**






## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         La clase ahora implementa [ArrayAccess](#class.arrayaccess).






# Ds\Vector::allocate

(PECL ds &gt;= 1.0.0)

Ds\Vector::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Vector::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::allocate()**

&lt;?php
$vector = new \Ds\Vector();
var_dump($vector-&gt;capacity());

$vector-&gt;allocate(100);
var_dump($vector-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(100)

# Ds\Vector::apply

(PECL ds &gt;= 1.0.0)

Ds\Vector::apply — Cambia todos los valores aplicando una función de retrollamada a cada valor

### Descripción

public **Ds\Vector::apply**([callable](#language.types.callable) $callback): [void](language.types.void.html)

    Cambia todos los valores aplicando un callback a
    cada valor en el vector.

### Parámetros

    callback






                callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



            Un [callable](#language.types.callable) a aplicar a cada valor del vector.





            La función de retrollamada debe devolver el valor por el cual debe ser reemplazado.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::apply()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);
$vector-&gt;apply(function($value) { return $value \* 2; });

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)

# Ds\Vector::capacity

(PECL ds &gt;= 1.0.0)

Ds\Vector::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Vector::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::capacity()**

&lt;?php
$vector = new \Ds\Vector();
var_dump($vector-&gt;capacity());

$vector-&gt;push(...range(1, 50));
var_dump($vector-&gt;capacity());

$vector[] = "a";
var_dump($vector-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(50)
int(75)

# Ds\Vector::clear

(PECL ds &gt;= 1.0.0)

Ds\Vector::clear — Elimina todos los valores

### Descripción

public **Ds\Vector::clear**(): [void](language.types.void.html)

    Elimina todos los valores del vector.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::clear()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);
print_r($vector);

$vector-&gt;clear();
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Vector Object
(
)

# Ds\Vector::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Vector::\_\_construct — Crea una nueva instancia

### Descripción

public **Ds\Vector::\_\_construct**([mixed](#language.types.mixed) $values = ?)

    Crea una nueva instancia, utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los valores iniciales.

### Parámetros

    values


      Un objeto [traversable](#class.traversable) o un [array](#language.types.array) a utilizar para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::\_\_construct()**

&lt;?php
$vector = new \Ds\Vector();
var_dump($vector);

$vector = new \Ds\Vector([1, 2, 3]);
var_dump($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (0) {
}
object(Ds\Vector)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Vector::contains

(PECL ds &gt;= 1.0.0)

Ds\Vector::contains — Determina si el vector contiene valores dados

### Descripción

public **Ds\Vector::contains**([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)

    Determina si el vector contiene todos los valores.

### Parámetros

    values


        Los valores a verificar.


### Valores devueltos

    **[false](#constant.false)** si uno de los valores proporcionados no está en el
    vector, de lo contrario **[true](#constant.true)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::contains()**

&lt;?php
$vector = new \Ds\Vector(['a', 'b', 'c', 1, 2, 3]);

var_dump($vector-&gt;contains('a'));                // true
var_dump($vector-&gt;contains('a', 'b')); // true
var_dump($vector-&gt;contains('c', 'd')); // false

var_dump($vector-&gt;contains(...['c', 'b', 'a'])); // true

// Always strict
var_dump($vector-&gt;contains(1));                  // true
var_dump($vector-&gt;contains('1')); // false

var_dump($sequece-&gt;contains(...[])); // true
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(false)
bool(true)

# Ds\Vector::copy

(PECL ds &gt;= 1.0.0)

Ds\Vector::copy — Devuelve una copia superficial del vector

### Descripción

public **Ds\Vector::copy**(): [Ds\Vector](#class.ds-vector)

    Devuelve una copia superficial del vector.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial del vector.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::copy()**

&lt;?php
$a = new \Ds\Vector([1, 2, 3]);
$b = $a-&gt;copy();

// Cambiar la copia no afecta al original
$b-&gt;push(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
)

# Ds\Vector::count

(PECL ds &gt;= 1.0.0)

Ds\Vector::count — Devuelve el número de valores en la colección

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Vector::filter

(PECL ds &gt;= 1.0.0)

Ds\Vector::filter —
Crear un nuevo vector utilizando un [callable](#language.types.callable) para
determinar qué valores incluir

### Descripción

public **Ds\Vector::filter**([callable](#language.types.callable) $callback = ?): [Ds\Vector](#class.ds-vector)

    Crear una nueva secuencia utilizando un [callable](#language.types.callable) para
    determinar qué valores incluir.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

            Un [callable](#language.types.callable) opcional que devuelve **[true](#constant.true)** si el par debe ser incluido, **[false](#constant.false)** en caso contrario.




            Si no se proporciona ninguna función de retrollamada, solo se incluirán los valores que son **[true](#constant.true)**
            (ver [conversión en booléen](#language.types.boolean.casting)).


### Valores devueltos

    Un nuevo vector que contiene todos los pares para los cuales
    el callback ha devuelto **[true](#constant.true)**, o todos los valores que
    se convierten en **[true](#constant.true)** si no se ha proporcionado un callback.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::filter()** con una función de retrollamada

&lt;?php
$vector = new \Ds\Vector([1, 2, 3, 4, 5]);

var_dump($vector-&gt;filter(function($value) {
return $value % 2 == 0;
}));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#3 (2) {
[0]=&gt;
int(2)
[1]=&gt;
int(4)
}

**Ejemplo #2 Ejemplo de Ds\Vector::filter()** sin función de retrollamada

&lt;?php
$vector = new \Ds\Vector([0, 1, 'a', true, false]);

var_dump($vector-&gt;filter());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
string(1) "a"
[2]=&gt;
bool(true)
}

# Ds\Vector::find

(PECL ds &gt;= 1.0.0)

Ds\Vector::find —
Intenta encontrar el índice de un valor.

### Descripción

public **Ds\Vector::find**([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

    Devuelve el índice del valor, o **[false](#constant.false)** si no se encuentra.

### Parámetros

    value


        El valor a encontrar.


### Valores devueltos

    El índice del valor, o **[false](#constant.false)** si no se encuentra.

**Nota**:

            Los valores serán comparados por valor y por tipo.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::find()**

&lt;?php
$vector = new \Ds\Vector(["a", 1, true]);

var_dump($vector-&gt;find("a")); // 0
var_dump($vector-&gt;find("b")); // false
var_dump($vector-&gt;find("1")); // false
var_dump($vector-&gt;find(1)); // 1
?&gt;

Resultado del ejemplo anterior es similar a:

int(0)
bool(false)
bool(false)
int(1)

# Ds\Vector::first

(PECL ds &gt;= 1.0.0)

Ds\Vector::first — Devuelve el primer valor en el vector

### Descripción

public **Ds\Vector::first**(): [mixed](#language.types.mixed)

    Devuelve el primer valor en el vector.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El primer valor en el vector.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::first()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);
var_dump($vector-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

# Ds\Vector::get

(PECL ds &gt;= 1.0.0)

Ds\Vector::get — Devuelve el valor en un índice dado

### Descripción

public **Ds\Vector::get**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Devuelve el valor en un índice dado.

### Parámetros

    index


        El índice al que se accede, comenzando en 0.


### Valores devueltos

    El valor en el índice solicitado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::get()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

var_dump($vector-&gt;get(0));
var_dump($vector-&gt;get(1));
var_dump($vector-&gt;get(2));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

**Ejemplo #2 Ejemplo de Ds\Vector::get()** utilizando la sintaxis de array

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

var_dump($vector[0]);
var_dump($vector[1]);
var_dump($vector[2]);
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Vector::insert

(PECL ds &gt;= 1.0.0)

Ds\Vector::insert — Inserta valores en un índice dado

### Descripción

public **Ds\Vector::insert**([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Inserta valores en el vector en un índice dado.

### Parámetros

    index


        El índice en el cual insertar. 0 &lt;= index &lt;= count



     **Nota**:



            Es posible insertar en el índice igual al número de valores.







    values


        El o los valores a insertar.


### Valores devueltos

    No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::insert()**

&lt;?php
$vector = new \Ds\Vector();

$vector-&gt;insert(0, "e");             // [e]
$vector-&gt;insert(1, "f"); // [e, f]
$vector-&gt;insert(2, "g");             // [e, f, g]
$vector-&gt;insert(0, "a", "b"); // [a, b, e, f, g]
$vector-&gt;insert(2, ...["c", "d"]); // [a, b, c, d, e, f, g]

var_dump($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#1 (7) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[2]=&gt;
string(1) "c"
[3]=&gt;
string(1) "d"
[4]=&gt;
string(1) "e"
[5]=&gt;
string(1) "f"
[6]=&gt;
string(1) "g"
}

# Ds\Vector::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Vector::isEmpty — Indica si el vector está vacío

### Descripción

public **Ds\Vector::isEmpty**(): [bool](#language.types.boolean)

    Indica si el vector está vacío.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si el vector está vacío, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::isEmpty()**

&lt;?php
$a = new \Ds\Vector([1, 2, 3]);
$b = new \Ds\Vector();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Vector::join

(PECL ds &gt;= 1.0.0)

Ds\Vector::join — Reúne todos los valores en un string

### Descripción

public **Ds\Vector::join**([string](#language.types.string) $glue = ?): [string](#language.types.string)

    Reúne todos los valores en un string utilizando un separador opcional entre cada valor.

### Parámetros

    glue


        Un string opcional para separar cada valor.


### Valores devueltos

    Todos los valores de la secuencia reunidos en un string.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::join()** con un string separador

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c", 1, 2, 3]);

var_dump($vector-&gt;join("|"));
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "a|b|c|1|2|3"

**Ejemplo #2 Ejemplo de Ds\Vector::join()** sin string separador

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c", 1, 2, 3]);

var_dump($vector-&gt;join());
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "abc123"

# Ds\Vector::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Vector::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    Nunca debería ser necesario llamar a esto directamente.

# Ds\Vector::last

(PECL ds &gt;= 1.0.0)

Ds\Vector::last — Devuelve el último valor

### Descripción

public **Ds\Vector::last**(): [mixed](#language.types.mixed)

    Devuelve el último valor en el vector.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor en el vector.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::last()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);
var_dump($vector-&gt;last());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)

# Ds\Vector::map

(PECL ds &gt;= 1.0.0)

Ds\Vector::map — Devuelve el resultado de la aplicación de una retrollamada a cada valor

### Descripción

public **Ds\Vector::map**([callable](#language.types.callable) $callback): [Ds\Vector](#class.ds-vector)

    Devuelve el resultado de la aplicación de una callback a
    cada valor del vector.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

            Una retrollamada a aplicar a cada valor de la deque.





            La retrollamada debe tomar un argumento y devolver el nuevo valor.


### Valores devueltos

    El resultado de la aplicación de callback a cada valor
    del vector.

**Nota**:

        Los valores de la instancia actual no se verán afectados.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::map()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

print_r($vector-&gt;map(function($value) { return $value * 2; }));
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)
Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)

# Ds\Vector::merge

(PECL ds &gt;= 1.0.0)

Ds\Vector::merge — Devuelve el resultado de la adición de todos los valores dados al vector

### Descripción

public **Ds\Vector::merge**([mixed](#language.types.mixed) $values): [Ds\Vector](#class.ds-vector)

    Devuelve el resultado de la adición de todos los valores dados al vector.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array).


### Valores devueltos

    El resultado de la adición de todos los valores dados al vector,
    efectivamente el mismo que añadir los valores a una copia, y luego devolver esta copia.

**Nota**:

        La instancia actual no será afectada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::merge()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

var_dump($vector-&gt;merge([4, 5, 6]));
var_dump($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (6) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
int(4)
[4]=&gt;
int(5)
[5]=&gt;
int(6)
}
object(Ds\Vector)#1 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Vector::pop

(PECL ds &gt;= 1.0.0)

Ds\Vector::pop — Elimina y devuelve el último valor

### Descripción

public **Ds\Vector::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el último valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último elemento eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::pop()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

var_dump($vector-&gt;pop());
var_dump($vector-&gt;pop());
var_dump($vector-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(2)
int(1)

# Ds\Vector::push

(PECL ds &gt;= 1.0.0)

Ds\Vector::push — Añade valores al final del vector

### Descripción

public **Ds\Vector::push**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade valores al final del vector.

### Parámetros

    values


        Los valores a añadir.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::push()**

&lt;?php
$vector = new \Ds\Vector();

$vector-&gt;push("a");
$vector-&gt;push("b");
$vector-&gt;push("c", "d");
$vector-&gt;push(...["e", "f"]);

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
[4] =&gt; e
[5] =&gt; f
)

# Ds\Vector::reduce

(PECL ds &gt;= 1.0.0)

Ds\Vector::reduce — Reduce el vector a un solo valor utilizando una retrollamada

### Descripción

public **Ds\Vector::reduce**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)

    Reduce el vector a un solo valor utilizando una retrollamada.

### Parámetros

    callback


      callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



        carry


          El valor de retorno de la retrollamada anterior, o initial si
          es la primera iteración.






        value


          El valor de la iteración actual.










    initial


        El valor inicial del valor de retorno. Puede ser **[null](#constant.null)**.


### Valores devueltos

    El valor de retorno de la retrollamada final.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::reduce()** con valor inicial

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

$callback = function($carry, $value) {
return $carry \* $value;
};

var_dump($vector-&gt;reduce($callback, 5));

// Iteraciones:
//
// $carry = $initial = 5
//
// $carry = $carry _ 1 = 5
// $carry = $carry _ 2 = 10
// $carry = $carry \* 3 = 30
?&gt;

Resultado del ejemplo anterior es similar a:

int(30)

**Ejemplo #2 Ejemplo de Ds\Vector::reduce()** sin valor inicial

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

var_dump($vector-&gt;reduce(function($carry, $value) {
return $carry + $value + 5;
}));

// Iteraciones:
//
// $carry = $initial = null
//
// $carry = $carry + 1 + 5 = 6
// $carry = $carry + 2 + 5 = 13
// $carry = $carry + 3 + 5 = 21
?&gt;

Resultado del ejemplo anterior es similar a:

int(21)

# Ds\Vector::remove

(PECL ds &gt;= 1.0.0)

Ds\Vector::remove — Elimina y devuelve un valor por índice

### Descripción

public **Ds\Vector::remove**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Elimina y devuelve un valor por índice.

### Parámetros

    index


        El índice del valor a eliminar.


### Valores devueltos

    El valor que ha sido eliminado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::remove()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

var_dump($vector-&gt;remove(1));
var_dump($vector-&gt;remove(0));
var_dump($vector-&gt;remove(0));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "b"
string(1) "a"
string(1) "c"

# Ds\Vector::reverse

(PECL ds &gt;= 1.0.0)

Ds\Vector::reverse —
Invertir el vector en su lugar

### Descripción

public **Ds\Vector::reverse**(): [void](language.types.void.html)

    Invierte el vector en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::reverse()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);
$vector-&gt;reverse();

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)

# Ds\Vector::reversed

(PECL ds &gt;= 1.0.0)

Ds\Vector::reversed — Devuelve una copia invertida

### Descripción

public **Ds\Vector::reversed**(): [Ds\Vector](#class.ds-vector)

    Devuelve una copia invertida del vector.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una copia invertida del vector.

**Nota**:

            La instancia actual no se ve afectada.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::reversed()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

print_r($vector-&gt;reversed());
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)
Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
)

# Ds\Vector::rotate

(PECL ds &gt;= 1.0.0)

Ds\Vector::rotate — Rota el vector un cierto número de rotaciones

### Descripción

public **Ds\Vector::rotate**([int](#language.types.integer) $rotations): [void](language.types.void.html)

    Rota el vector un cierto número de rotaciones, lo que equivale a llamar sucesivamente
    $vector-&gt;push($vector-&gt;shift()) si el número de rotaciones es positivo, o
    $vector-&gt;unshift($vector-&gt;pop()) si es negativo.

### Parámetros

    rotations


        El número de veces que el vector debe ser rotado.


### Valores devueltos

    No se retorna ningún valor.. El vector de la instancia actual será rotado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::rotate()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c", "d"]);

$vector-&gt;rotate(1);  // "a" es desplazado, luego empujado.
print_r($vector);

$vector-&gt;rotate(2);  // ambos son desplazados, luego empujados.
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; a
)
Ds\Vector Object
(
[0] =&gt; d
[1] =&gt; a
[2] =&gt; b
[3] =&gt; c
)

# Ds\Vector::set

(PECL ds &gt;= 1.0.0)

Ds\Vector::set — Cambia un valor en un índice dado

### Descripción

public **Ds\Vector::set**([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    Cambia un valor en un índice dado.

### Parámetros

    index


        El índice del valor a actualizar.






    value


        El nuevo valor.










    ### Valores devueltos


        No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::set()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

$vector-&gt;set(1, "_");
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

**Ejemplo #2 Ejemplo de Ds\Vector::set()** utilizando la sintaxis de array

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

$vector[1] = "_";
print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

# Ds\Vector::shift

(PECL ds &gt;= 1.0.0)

Ds\Vector::shift — Elimina y devuelve el primer valor

### Descripción

public **Ds\Vector::shift**(): [mixed](#language.types.mixed)

    Elimina y devuelve el primer valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El primer valor, que ha sido eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::shift()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c"]);

var_dump($vector-&gt;shift());
var_dump($vector-&gt;shift());
var_dump($vector-&gt;shift());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Vector::slice

(PECL ds &gt;= 1.0.0)

Ds\Vector::slice —
Devuelve un sub-vector de un rango dado

### Descripción

public **Ds\Vector::slice**([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Vector](#class.ds-vector)

    Crea un sub-vector de un rango dado.

### Parámetros

    index


            El índice en el que comienza el sub-vector.




            Si es positivo, el sub-vector comenzará en este índice en el vector.
            Si es negativo, el sub-vector comenzará a esta distancia del final.






    length


        Si se proporciona una longitud y es positiva, el sub-vector resultante
        tendrá hasta ese número de valores.

        Si la longitud provoca un desbordamiento, solo
        los valores hasta el final del vector serán incluidos.

        Si se proporciona una longitud y es negativa, el sub-vector
        se detendrá a ese número de valores del final.

        Si no se proporciona una longitud, el sub-vector
        contendrá todos los valores entre el índice y el
        final del vector.


### Valores devueltos

    Un sub-vector del rango dado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::slice()**

&lt;?php
$vector = new \Ds\Vector(["a", "b", "c", "d", "e"]);

// Recorte a partir de 2
print_r($vector-&gt;slice(2));

// Recorte a partir de 1, para una longitud de 3
print_r($vector-&gt;slice(1, 3));

// Recorte a partir de 1 en adelante
print_r($vector-&gt;slice(1));

// Recorte a partir de 2 hacia atrás
print_r($vector-&gt;slice(-2));

// Recorte de 1 a 1 del final
print_r($vector-&gt;slice(1, -1));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; c
[1] =&gt; d
[2] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; d
[1] =&gt; e
)
Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)

# Ds\Vector::sort

(PECL ds &gt;= 1.0.0)

Ds\Vector::sort —
Ordena el vector en su lugar

### Descripción

public **Ds\Vector::sort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena el vector en su lugar, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::sort()**

&lt;?php
$vector = new \Ds\Vector([4, 5, 1, 3, 2]);
$vector-&gt;sort();

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Vector::sort()** utilizando un comparador

&lt;?php
$vector = new \Ds\Vector([4, 5, 1, 3, 2]);

$vector-&gt;sort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Vector::sorted

(PECL ds &gt;= 1.0.0)

Ds\Vector::sorted — Devuelve una copia ordenada

### Descripción

public **Ds\Vector::sorted**([callable](#language.types.callable) $comparator = ?): [Ds\Vector](#class.ds-vector)

    Devuelve una copia ordenada del vector, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    Devuelve una copia ordenada del vector.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::sorted()**

&lt;?php
$vector = new \Ds\Vector([4, 5, 1, 3, 2]);

print_r($vector-&gt;sorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Vector::sorted()** utilizando un comparador

&lt;?php
$vector = new \Ds\Vector([4, 5, 1, 3, 2]);

$sorted = $vector-&gt;sorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Vector::sum

(PECL ds &gt;= 1.0.0)

Ds\Vector::sum — Devuelve la suma de todos los valores del vector

### Descripción

public **Ds\Vector::sum**(): [int](#language.types.integer)|[float](#language.types.float)

    Devuelve la suma de todos los valores del vector.

**Nota**:

        Los arrays y los objetos se consideran iguales a cero durante el cálculo de la suma.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La suma de todos los valores del vector como [float](#language.types.float) o [int](#language.types.integer)
    dependiendo de los valores del vector.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::sum()** con un entero

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);
var_dump($vector-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

int(6)

**Ejemplo #2 Ejemplo de Ds\Vector::sum()** con un número de punto flotante

&lt;?php
$vector = new \Ds\Vector([1, 2.5, 3]);
var_dump($vector-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

float(6.5)

# Ds\Vector::toArray

(PECL ds &gt;= 1.0.0)

Ds\Vector::toArray —
Convierte el vector en [array](#language.types.array)

### Descripción

public **Ds\Vector::toArray**(): [array](#language.types.array)

    Convierte el vector en un [array](#language.types.array).

**Nota**:

        La conversión en [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que el vector.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::toArray()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

var_dump($vector-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Vector::unshift

(PECL ds &gt;= 1.0.0)

Ds\Vector::unshift — Añade valores al inicio del vector

### Descripción

public **Ds\Vector::unshift**([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

    Añade valores al inicio del vector, desplazando todos los valores actuales
    hacia adelante para hacer espacio para los nuevos valores.

### Parámetros

    values


        Los valores a añadir al inicio del vector.


**Nota**:

                Múltiples valores pueden ser añadidos en el mismo orden en que son
                pasados.






### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Vector::unshift()**

&lt;?php
$vector = new \Ds\Vector([1, 2, 3]);

$vector-&gt;unshift("a");
$vector-&gt;unshift("b", "c");

print_r($vector);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Vector Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; a
[3] =&gt; 1
[4] =&gt; 2
[5] =&gt; 3
)

## Tabla de contenidos

- [Ds\Vector::allocate](#ds-vector.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Vector::apply](#ds-vector.apply) — Cambia todos los valores aplicando una función de retrollamada a cada valor
- [Ds\Vector::capacity](#ds-vector.capacity) — Devuelve la capacidad actual
- [Ds\Vector::clear](#ds-vector.clear) — Elimina todos los valores
- [Ds\Vector::\_\_construct](#ds-vector.construct) — Crea una nueva instancia
- [Ds\Vector::contains](#ds-vector.contains) — Determina si el vector contiene valores dados
- [Ds\Vector::copy](#ds-vector.copy) — Devuelve una copia superficial del vector
- [Ds\Vector::count](#ds-vector.count) — Devuelve el número de valores en la colección
- [Ds\Vector::filter](#ds-vector.filter) — Crear un nuevo vector utilizando un callable para
  determinar qué valores incluir
- [Ds\Vector::find](#ds-vector.find) — Intenta encontrar el índice de un valor.
- [Ds\Vector::first](#ds-vector.first) — Devuelve el primer valor en el vector
- [Ds\Vector::get](#ds-vector.get) — Devuelve el valor en un índice dado
- [Ds\Vector::insert](#ds-vector.insert) — Inserta valores en un índice dado
- [Ds\Vector::isEmpty](#ds-vector.isempty) — Indica si el vector está vacío
- [Ds\Vector::join](#ds-vector.join) — Reúne todos los valores en un string
- [Ds\Vector::jsonSerialize](#ds-vector.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Vector::last](#ds-vector.last) — Devuelve el último valor
- [Ds\Vector::map](#ds-vector.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Vector::merge](#ds-vector.merge) — Devuelve el resultado de la adición de todos los valores dados al vector
- [Ds\Vector::pop](#ds-vector.pop) — Elimina y devuelve el último valor
- [Ds\Vector::push](#ds-vector.push) — Añade valores al final del vector
- [Ds\Vector::reduce](#ds-vector.reduce) — Reduce el vector a un solo valor utilizando una retrollamada
- [Ds\Vector::remove](#ds-vector.remove) — Elimina y devuelve un valor por índice
- [Ds\Vector::reverse](#ds-vector.reverse) — Invertir el vector en su lugar
- [Ds\Vector::reversed](#ds-vector.reversed) — Devuelve una copia invertida
- [Ds\Vector::rotate](#ds-vector.rotate) — Rota el vector un cierto número de rotaciones
- [Ds\Vector::set](#ds-vector.set) — Cambia un valor en un índice dado
- [Ds\Vector::shift](#ds-vector.shift) — Elimina y devuelve el primer valor
- [Ds\Vector::slice](#ds-vector.slice) — Devuelve un sub-vector de un rango dado
- [Ds\Vector::sort](#ds-vector.sort) — Ordena el vector en su lugar
- [Ds\Vector::sorted](#ds-vector.sorted) — Devuelve una copia ordenada
- [Ds\Vector::sum](#ds-vector.sum) — Devuelve la suma de todos los valores del vector
- [Ds\Vector::toArray](#ds-vector.toarray) — Convierte el vector en array
- [Ds\Vector::unshift](#ds-vector.unshift) — Añade valores al inicio del vector

# La clase Deque

(PECL ds &gt;= 1.0.0)

## Introducción

    Un Deque (pronunciado “deck”) es una secuencia de valores
    en un búfer contiguo que crece y se contrae automáticamente.
    El nombre es una abreviación inglesa común de “double-ended queue” (cola de doble final) y es usado
    internamente por [Ds\Queue](#class.ds-queue).




    Dos punteros son usados para mantener el seguimiento de una cabecera y una cola. Los punteros pueden
    “envolver alrededor” el final del búfer, lo cual evita la necesidad de mover otros
    valores alrededor para hacer un espacio. Esto permite que hacer cambios y deshacer cambios sean muy rápidos — 
    algo en que [Ds\Vector](#class.ds-vector) no puede competir.




    Accediendo a un valor por el índice requiere una traducción entre el índice y su
    posición correspondiente en el búfer: ((cabecera + posición) % capacidad).

## Fortalezas

     - Soporta la sintaxis array (corchetes).

     - Utiliza menos memoria total que un [array](#language.types.array) para el mismo número de valores.

     - Automáticamente libera la memoria asignada cuando su tamaño cae lo suficientemente bajo.

     -
      **get()**,
      **set()**,
      **push()**,
      **pop()**,
      **shift()**, y
      **unshift()** son todos O(1).


## Debilidades

     - La capacidad debe ser una potencia de 2.

     -
      **insert()** y
      **remove()** son O(n).


## Sinopsis de la Clase

    ****




      class **Ds\Deque**


     implements
       [Ds\Sequence](#class.ds-sequence),  [ArrayAccess](#class.arrayaccess) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-deque.constants.min-capacity) = 8;


    /* Métodos */

public [allocate](#ds-deque.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [apply](#ds-deque.apply)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [capacity](#ds-deque.capacity)(): [int](#language.types.integer)
public [clear](#ds-deque.clear)(): [void](language.types.void.html)
public [contains](#ds-deque.contains)([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)
public [copy](#ds-deque.copy)(): [Ds\Deque](#class.ds-deque)
public [filter](#ds-deque.filter)([callable](#language.types.callable) $callback = ?): [Ds\Deque](#class.ds-deque)
public [find](#ds-deque.find)([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)
public [first](#ds-deque.first)(): [mixed](#language.types.mixed)
public [get](#ds-deque.get)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [insert](#ds-deque.insert)([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [isEmpty](#ds-deque.isempty)(): [bool](#language.types.boolean)
public [join](#ds-deque.join)([string](#language.types.string) $glue = ?): [string](#language.types.string)
public [last](#ds-deque.last)(): [mixed](#language.types.mixed)
public [map](#ds-deque.map)([callable](#language.types.callable) $callback): [Ds\Deque](#class.ds-deque)
public [merge](#ds-deque.merge)([mixed](#language.types.mixed) $values): [Ds\Deque](#class.ds-deque)
public [pop](#ds-deque.pop)(): [mixed](#language.types.mixed)
public [push](#ds-deque.push)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [reduce](#ds-deque.reduce)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)
public [remove](#ds-deque.remove)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [reverse](#ds-deque.reverse)(): [void](language.types.void.html)
public [reversed](#ds-deque.reversed)(): [Ds\Deque](#class.ds-deque)
public [rotate](#ds-deque.rotate)([int](#language.types.integer) $rotations): [void](language.types.void.html)
public [set](#ds-deque.set)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [shift](#ds-deque.shift)(): [mixed](#language.types.mixed)
public [slice](#ds-deque.slice)([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Deque](#class.ds-deque)
public [sort](#ds-deque.sort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
public [sorted](#ds-deque.sorted)([callable](#language.types.callable) $comparator = ?): [Ds\Deque](#class.ds-deque)
public [sum](#ds-deque.sum)(): [int](#language.types.integer)|[float](#language.types.float)
public [toArray](#ds-deque.toarray)(): [array](#language.types.array)
public [unshift](#ds-deque.unshift)([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

}

## Constantes predefinidas

     **[Ds\Deque::MIN_CAPACITY](#ds-deque.constants.min-capacity)**






## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         La clase ahora implementa [ArrayAccess](#class.arrayaccess).






# Ds\Deque::allocate

(PECL ds &gt;= 1.0.0)

Ds\Deque::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Deque::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.




    **Nota**:



            La capacidad siempre se redondeará a la potencia de 2 más cercana.





### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::allocate()**

&lt;?php
$deque = new \Ds\Deque();
var_dump($deque-&gt;capacity());

$deque-&gt;allocate(100);
var_dump($deque-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)
int(128)

# Ds\Deque::apply

(PECL ds &gt;= 1.0.0)

Ds\Deque::apply — Actualiza todos los valores aplicando una retrollamada a cada valor

### Descripción

public **Ds\Deque::apply**([callable](#language.types.callable) $callback): [void](language.types.void.html)

    Actualiza todos los valores aplicando un callback
    a cada valor en la deque.

### Parámetros

    callback






                callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



            Un [callable](#language.types.callable) a aplicar a cada valor en la deque.





            La retrollamada debe aceptar un valor y devolver lo que el valor debe ser reemplazado por.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::apply()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);
$deque-&gt;apply(function($value) { return $value \* 2; });

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)

# Ds\Deque::capacity

(PECL ds &gt;= 1.0.0)

Ds\Deque::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Deque::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::capacity()**

&lt;?php
$deque = new \Ds\Deque();
var_dump($deque-&gt;capacity());

$deque-&gt;push(...range(1, 50));
var_dump($deque-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)
int(64)

# Ds\Deque::clear

(PECL ds &gt;= 1.0.0)

Ds\Deque::clear — Elimina todos los valores del deque

### Descripción

public **Ds\Deque::clear**(): [void](language.types.void.html)

    Elimina todos los valores del deque.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::clear()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);
print_r($deque);

$deque-&gt;clear();
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Deque Object
(
)

# Ds\Deque::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Deque::\_\_construct — Crea una nueva instancia

### Descripción

public **Ds\Deque::\_\_construct**([mixed](#language.types.mixed) $values = ?)

    Crea una nueva instancia, utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los valores iniciales.

### Parámetros

    values


      Un objeto traversable o un [array](#language.types.array) a utilizar para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::\_\_construct()**

&lt;?php
$deque = new \Ds\Deque();
var_dump($deque);

$deque = new \Ds\Deque([1, 2, 3]);
var_dump($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Deque)#2 (0) {
}
object(Ds\Deque)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Deque::contains

(PECL ds &gt;= 1.0.0)

Ds\Deque::contains — Determina si el deque contiene valores dados

### Descripción

public **Ds\Deque::contains**([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)

    Determina si el deque contiene todos los valores.

### Parámetros

    values


        Los valores a verificar.


### Valores devueltos

    **[false](#constant.false)** si uno de los valores proporcionados no está en el deque,
    **[true](#constant.true)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::contains()**

&lt;?php
$deque = new \Ds\Deque(['a', 'b', 'c', 1, 2, 3]);

var_dump($deque-&gt;contains('a'));                // true
var_dump($deque-&gt;contains('a', 'b')); // true
var_dump($deque-&gt;contains('c', 'd')); // false

var_dump($deque-&gt;contains(...['c', 'b', 'a'])); // true

// Siempre estricto
var_dump($deque-&gt;contains(1));                  // true
var_dump($deque-&gt;contains('1')); // false

var_dump($deque-&gt;contains(...[])); // true
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(false)
bool(true)

# Ds\Deque::copy

(PECL ds &gt;= 1.0.0)

Ds\Deque::copy — Devuelve una copia superficial de la deque

### Descripción

public **Ds\Deque::copy**(): [Ds\Deque](#class.ds-deque)

    Devuelve una copia superficial de la deque.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una copia superficial de la deque.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::copy()**

&lt;?php
$a = new \Ds\Deque([1, 2, 3]);
$b = $a-&gt;copy();

$b-&gt;push(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
)

# Ds\Deque::count

(PECL ds &gt;= 1.0.0)

Ds\Deque::count — Devuelve el número de valores en la colección

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Deque::filter

(PECL ds &gt;= 1.0.0)

Ds\Deque::filter —
Crear un nuevo deque utilizando un [callable](#language.types.callable) para
determinar qué valores incluir

### Descripción

public **Ds\Deque::filter**([callable](#language.types.callable) $callback = ?): [Ds\Deque](#class.ds-deque)

    Crear un nuevo deque utilizando un [callable](#language.types.callable) para
    determinar qué valores incluir.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

            Un [callable](#language.types.callable) opcional que devuelve **[true](#constant.true)** si el valor debe ser incluido, **[false](#constant.false)** en caso contrario.




            Si no se proporciona ninguna función de retrollamada, solo se incluirán los valores que sean **[true](#constant.true)**
            (ver [conversión en booléen](#language.types.boolean.casting)).


### Valores devueltos

    Un nuevo deque que contiene todos los valores para los cuales
    el callback ha devuelto **[true](#constant.true)**, o todos los valores que
    se convierten en **[true](#constant.true)** si no se ha proporcionado un callback.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::filter()** con una función de retrollamada

&lt;?php
$deque = new \Ds\Deque([1, 2, 3, 4, 5]);

var_dump($deque-&gt;filter(function($value) {
return $value % 2 == 0;
}));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Deque)#3 (2) {
[0]=&gt;
int(2)
[1]=&gt;
int(4)
}

**Ejemplo #2 Ejemplo de Ds\Deque::filter()** sin una función de retrollamada

&lt;?php
$deque = new \Ds\Deque([0, 1, 'a', true, false]);

var_dump($deque-&gt;filter());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Deque)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
string(1) "a"
[2]=&gt;
bool(true)
}

# Ds\Deque::find

(PECL ds &gt;= 1.0.0)

Ds\Deque::find —
Intenta encontrar el índice de un valor.

### Descripción

public **Ds\Deque::find**([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

    Devuelve el índice del valor, o **[false](#constant.false)** si no se encuentra.

### Parámetros

    value


        El valor a encontrar.


### Valores devueltos

    El índice del valor, o **[false](#constant.false)** si no se encuentra.

**Nota**:

            Los valores serán comparados por valor y por tipo.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::find()**

&lt;?php
$deque = new \Ds\Deque(["a", 1, true]);

var_dump($deque-&gt;find("a")); // 0
var_dump($deque-&gt;find("b")); // false
var_dump($deque-&gt;find("1")); // false
var_dump($deque-&gt;find(1)); // 1
?&gt;

Resultado del ejemplo anterior es similar a:

int(0)
bool(false)
bool(false)
int(1)

# Ds\Deque::first

(PECL ds &gt;= 1.0.0)

Ds\Deque::first — Devuelve el primer valor de la deque

### Descripción

public **Ds\Deque::first**(): [mixed](#language.types.mixed)

    Devuelve el primer valor de la deque.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el primer valor de la deque.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacía.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::first()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);
var_dump($deque-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

# Ds\Deque::get

(PECL ds &gt;= 1.0.0)

Ds\Deque::get — Devuelve el valor en un índice dado

### Descripción

public **Ds\Deque::get**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Devuelve el valor en un índice dado.

### Parámetros

    index


        El índice al que se desea acceder, comenzando en 0.


### Valores devueltos

    El valor en el índice solicitado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::get()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

var_dump($deque-&gt;get(0));
var_dump($deque-&gt;get(1));
var_dump($deque-&gt;get(2));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

**Ejemplo #2 Ejemplo de Ds\Deque::get()** utilizando la sintaxis de array

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

var_dump($deque[0]);
var_dump($deque[1]);
var_dump($deque[2]);
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Deque::insert

(PECL ds &gt;= 1.0.0)

Ds\Deque::insert — Inserta valores en un índice dado

### Descripción

public **Ds\Deque::insert**([int](#language.types.integer) $index, [mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Inserta valores en el deque en un índice dado.

### Parámetros

    index


        Inserta en el índice dado. 0 &lt;= index &lt;= count



     **Nota**:



            Se puede insertar en el índice igual al número de valores.







    values


        El o los valores a insertar.


### Valores devueltos

    No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::insert()**

&lt;?php
$deque = new \Ds\Deque();

$deque-&gt;insert(0, "e");             // [e]
$deque-&gt;insert(1, "f"); // [e, f]
$deque-&gt;insert(2, "g");             // [e, f, g]
$deque-&gt;insert(0, "a", "b"); // [a, b, e, f, g]
$deque-&gt;insert(2, ...["c", "d"]); // [a, b, c, d, e, f, g]

var_dump($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Deque)#1 (7) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[2]=&gt;
string(1) "c"
[3]=&gt;
string(1) "d"
[4]=&gt;
string(1) "e"
[5]=&gt;
string(1) "f"
[6]=&gt;
string(1) "g"
}

# Ds\Deque::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Deque::isEmpty — Indica si la deque está vacía

### Descripción

public **Ds\Deque::isEmpty**(): [bool](#language.types.boolean)

    Indica si la deque está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la deque está vacía, **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::isEmpty()**

&lt;?php
$a = new \Ds\Deque([1, 2, 3]);
$b = new \Ds\Deque();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Deque::join

(PECL ds &gt;= 1.0.0)

Ds\Deque::join — Reúne todos los valores en un string

### Descripción

public **Ds\Deque::join**([string](#language.types.string) $glue = ?): [string](#language.types.string)

    Reúne todos los valores en un string utilizando un separador opcional entre cada valor.

### Parámetros

    glue


        Un string opcional para separar cada valor.


### Valores devueltos

    Todos los valores del deque reunidos en un string.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::join()** utilizando un string separador

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c", 1, 2, 3]);

var_dump($deque-&gt;join("|"));
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "a|b|c|1|2|3"

**Ejemplo #2 Ejemplo de Ds\Deque::join()** sin string separador

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c", 1, 2, 3]);

var_dump($deque-&gt;join());
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "abc123"

# Ds\Deque::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Deque::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    No debería ser necesario llamar a esto directamente.

# Ds\Deque::last

(PECL ds &gt;= 1.0.0)

Ds\Deque::last — Devuelve el último valor

### Descripción

public **Ds\Deque::last**(): [mixed](#language.types.mixed)

    Devuelve el último valor del deque.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor del deque.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::last()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);
var_dump($deque-&gt;last());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)

# Ds\Deque::map

(PECL ds &gt;= 1.0.0)

Ds\Deque::map — Devuelve el resultado de la aplicación de una retrollamada a cada valor

### Descripción

public **Ds\Deque::map**([callable](#language.types.callable) $callback): [Ds\Deque](#class.ds-deque)

    Devuelve el resultado de la aplicación de callback a
    cada valor de la deque.

### Parámetros

    callback





callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

            Una retrollamada a aplicar a cada valor de la deque.





            La retrollamada debe tomar un argumento y devolver el nuevo valor.


### Valores devueltos

    El resultado de la aplicación de callback a cada valor
    de la deque.

**Nota**:

        Los valores de la instancia actual no serán afectados.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::map()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

print_r($deque-&gt;map(function($value) { return $value * 2; }));
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 2
[1] =&gt; 4
[2] =&gt; 6
)
Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)

# Ds\Deque::merge

(PECL ds &gt;= 1.0.0)

Ds\Deque::merge — Devuelve el resultado de la adición de todos los valores dados al deque

### Descripción

public **Ds\Deque::merge**([mixed](#language.types.mixed) $values): [Ds\Deque](#class.ds-deque)

    Devuelve el resultado de la adición de todos los valores dados al deque.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array).


### Valores devueltos

    El resultado de la adición de todos los valores dados al deque,
    efectivamente el mismo que añadir los valores a una copia, y luego devolver esta copia.

**Nota**:

        La instancia actual no será afectada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::merge()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

var_dump($deque-&gt;merge([4, 5, 6]));
var_dump($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Deque)#2 (6) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
int(4)
[4]=&gt;
int(5)
[5]=&gt;
int(6)
}
object(Ds\Deque)#1 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Deque::pop

(PECL ds &gt;= 1.0.0)

Ds\Deque::pop — Elimina y devuelve el último valor

### Descripción

public **Ds\Deque::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el último valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::pop()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

var_dump($deque-&gt;pop());
var_dump($deque-&gt;pop());
var_dump($deque-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(2)
int(1)

# Ds\Deque::push

(PECL ds &gt;= 1.0.0)

Ds\Deque::push — Añade valores al final del deque

### Descripción

public **Ds\Deque::push**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade los valores al final del deque.

### Parámetros

    values


        Los valores a añadir.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::push()**

&lt;?php
$deque = new \Ds\Deque();

$deque-&gt;push("a");
$deque-&gt;push("b");
$deque-&gt;push("c", "d");
$deque-&gt;push(...["e", "f"]);

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
[4] =&gt; e
[5] =&gt; f
)

# Ds\Deque::reduce

(PECL ds &gt;= 1.0.0)

Ds\Deque::reduce — Reduce el deque a un solo valor utilizando una función de retrollamada

### Descripción

public **Ds\Deque::reduce**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)

    Reduce el deque a un solo valor utilizando una función de retrollamada.

### Parámetros

    callback


      callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



        carry


          El valor de retorno de la retrollamada anterior, o initial si
          es la primera iteración.






        value


          El valor de la iteración actual.










    initial


        El valor inicial del valor de retorno. Puede ser **[null](#constant.null)**.


### Valores devueltos

    El valor de retorno de la retrollamada final.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::reduce()** con un valor inicial

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

$callback = function($carry, $value) {
return $carry \* $value;
};

var_dump($deque-&gt;reduce($callback, 5));

// Iteraciones:
//
// $carry = $initial = 5
//
// $carry = $carry _ 1 = 5
// $carry = $carry _ 2 = 10
// $carry = $carry \* 3 = 30
?&gt;

Resultado del ejemplo anterior es similar a:

int(30)

**Ejemplo #2 Ejemplo de Ds\Deque::reduce()** sin valor inicial

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

var_dump($deque-&gt;reduce(function($carry, $value) {
return $carry + $value + 5;
}));

// Iteraciones:
//
// $carry = $initial = null
//
// $carry = $carry + 1 + 5 = 6
// $carry = $carry + 2 + 5 = 13
// $carry = $carry + 3 + 5 = 21
?&gt;

Resultado del ejemplo anterior es similar a:

int(21)

# Ds\Deque::remove

(PECL ds &gt;= 1.0.0)

Ds\Deque::remove — Elimina y devuelve un valor por índice

### Descripción

public **Ds\Deque::remove**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Elimina y devuelve un valor por índice.

### Parámetros

    index


        El índice del valor a eliminar.


### Valores devueltos

    El valor que ha sido eliminado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::remove()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

var_dump($deque-&gt;remove(1));
var_dump($deque-&gt;remove(0));
var_dump($deque-&gt;remove(0));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "b"
string(1) "a"
string(1) "c"

# Ds\Deque::reverse

(PECL ds &gt;= 1.0.0)

Ds\Deque::reverse —
Invierte el deque en su lugar

### Descripción

public **Ds\Deque::reverse**(): [void](language.types.void.html)

    Invierte el deque en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::reverse()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);
$deque-&gt;reverse();

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)

# Ds\Deque::reversed

(PECL ds &gt;= 1.0.0)

Ds\Deque::reversed — Devuelve una copia invertida

### Descripción

public **Ds\Deque::reversed**(): [Ds\Deque](#class.ds-deque)

    Devuelve una copia invertida del deque.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una copia invertida del deque.

**Nota**:

            La instancia actual no se ve afectada.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::reversed()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

print_r($deque-&gt;reversed());
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)
Ds\Deque Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
)

# Ds\Deque::rotate

(PECL ds &gt;= 1.0.0)

Ds\Deque::rotate — Rota el deque un cierto número de rotaciones

### Descripción

public **Ds\Deque::rotate**([int](#language.types.integer) $rotations): [void](language.types.void.html)

    Rota el deque un cierto número de rotaciones, lo que equivale a llamar sucesivamente
    $deque-&gt;push($deque-&gt;shift()) si el número de rotaciones es positivo, o
    $deque-&gt;unshift($deque-&gt;pop()) si es negativo.

### Parámetros

    rotations


        El número de veces que el deque debe ser rotado.


### Valores devueltos

    No se retorna ningún valor.. El deque de la instancia actual será rotado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::rotate()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c", "d"]);

$deque-&gt;rotate(1);  // "a" es desplazado, luego empujado.
print_r($deque);

$deque-&gt;rotate(2);  // "b" y "c" son ambos desplazados, luego empujados.
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; a
)
Ds\Deque Object
(
[0] =&gt; d
[1] =&gt; a
[2] =&gt; b
[3] =&gt; c
)

# Ds\Deque::set

(PECL ds &gt;= 1.0.0)

Ds\Deque::set — Actualiza un valor en un índice dado

### Descripción

public **Ds\Deque::set**([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    Actualiza un valor en un índice dado.

### Parámetros

    index


        El índice del valor a actualizar.






    value


        El nuevo valor.










    ### Valores devueltos


        No se retorna ningún valor.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice no es válido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::set()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

$deque-&gt;set(1, "_");
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

**Ejemplo #2 Ejemplo de Ds\Deque::set()** utilizando la sintaxis de array

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

$deque[1] = "_";
print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; a
[1] =&gt; \_
[2] =&gt; c
)

# Ds\Deque::shift

(PECL ds &gt;= 1.0.0)

Ds\Deque::shift — Elimina y devuelve el primer valor

### Descripción

public **Ds\Deque::shift**(): [mixed](#language.types.mixed)

    Elimina y devuelve el primer valor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El primer valor, que ha sido eliminado.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::shift()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c"]);

var_dump($deque-&gt;shift());
var_dump($deque-&gt;shift());
var_dump($deque-&gt;shift());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Deque::slice

(PECL ds &gt;= 1.0.0)

Ds\Deque::slice —
Devuelve un sub-deque de un rango dado

### Descripción

public **Ds\Deque::slice**([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Deque](#class.ds-deque)

    Crear un sub-deque de un rango dado.

### Parámetros

    index


            El índice en el que comienza el sub-deque.




            Si es positivo, el sub-deque comenzará en este índice en el deque.
            Si es negativo, el sub-deque comenzará a esta distancia del final.






    length


        Si se proporciona una longitud y es positiva, el sub-deque resultante
        tendrá hasta ese número de valores.

        Si la longitud provoca un desbordamiento, solo se incluirán
        los valores hasta el final del deque.

        Si se proporciona una longitud y es negativa, el sub-deque
        se detendrá a esa cantidad de valores del final.

        Si no se proporciona una longitud, el sub-deque
        contendrá todos los valores entre el índice y el
        final del deque.


### Valores devueltos

    Un sub-deque del rango dado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::slice()**

&lt;?php
$deque = new \Ds\Deque(["a", "b", "c", "d", "e"]);

// Recorte a partir de 2
print_r($deque-&gt;slice(2));

// Recorte a partir de 1, para una longitud de 3
print_r($deque-&gt;slice(1, 3));

// Recorte a partir de 1 en adelante
print_r($deque-&gt;slice(1));

// Recorte a partir de 2 hacia atrás
print_r($deque-&gt;slice(-2));

// Recorte de 1 a 1 del final
print_r($deque-&gt;slice(1, -1));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; c
[1] =&gt; d
[2] =&gt; e
)
Ds\Deque Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)
Ds\Deque Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; e
)
Ds\Deque Object
(
[0] =&gt; d
[1] =&gt; e
)
Ds\Deque Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)

# Ds\Deque::sort

(PECL ds &gt;= 1.0.0)

Ds\Deque::sort —
Ordena el deque en su lugar

### Descripción

public **Ds\Deque::sort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena el deque en su lugar, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::sort()**

&lt;?php
$deque = new \Ds\Deque([4, 5, 1, 3, 2]);
$deque-&gt;sort();

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Deque::sort()** utilizando un comparador

&lt;?php
$deque = new \Ds\Deque([4, 5, 1, 3, 2]);

$deque-&gt;sort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Deque::sorted

(PECL ds &gt;= 1.0.0)

Ds\Deque::sorted — Devuelve una copia ordenada

### Descripción

public **Ds\Deque::sorted**([callable](#language.types.callable) $comparator = ?): [Ds\Deque](#class.ds-deque)

    Devuelve una copia ordenada del deque, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    Devuelve una copia ordenada del deque.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::sorted()**

&lt;?php
$deque = new \Ds\Deque([4, 5, 1, 3, 2]);

print_r($deque-&gt;sorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Deque::sorted()** utilizando un comparador

&lt;?php
$deque = new \Ds\Deque([4, 5, 1, 3, 2]);

$sorted = $deque-&gt;sorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Deque::sum

(PECL ds &gt;= 1.0.0)

Ds\Deque::sum — Devuelve la suma de todos los valores del deque

### Descripción

public **Ds\Deque::sum**(): [int](#language.types.integer)|[float](#language.types.float)

    Devuelve la suma de todos los valores del deque.

**Nota**:

        Los arrays y los objetos se consideran iguales a cero durante el cálculo de la suma.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La suma de todos los valores del deque como [float](#language.types.float) o [int](#language.types.integer)
    dependiendo de los valores del deque.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::sum()** con un entero

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);
var_dump($deque-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

int(6)

**Ejemplo #2 Ejemplo de Ds\Deque::sum()** con un número de punto flotante

&lt;?php
$deque = new \Ds\Deque([1, 2.5, 3]);
var_dump($deque-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

float(6.5)

# Ds\Deque::toArray

(PECL ds &gt;= 1.0.0)

Ds\Deque::toArray —
Convierte el deque en un [array](#language.types.array)

### Descripción

public **Ds\Deque::toArray**(): [array](#language.types.array)

    Convierte el deque en un [array](#language.types.array).

**Nota**:

        La conversión en un [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todas las valores en el mismo orden que el deque.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::toArray()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

var_dump($deque-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Deque::unshift

(PECL ds &gt;= 1.0.0)

Ds\Deque::unshift — Añade valores al inicio del deque

### Descripción

public **Ds\Deque::unshift**([mixed](#language.types.mixed) $values = ?): [void](language.types.void.html)

    Añade los valores al inicio del deque, desplazando todos los valores actuales
    hacia adelante para hacer espacio para los nuevos valores.

### Parámetros

    values


        Los valores a añadir al inicio del deque.


**Nota**:

                Los valores serán añadidos en el mismo orden en que son
                pasados.






### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Deque::unshift()**

&lt;?php
$deque = new \Ds\Deque([1, 2, 3]);

$deque-&gt;unshift("a");
$deque-&gt;unshift("b", "c");

print_r($deque);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Deque Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; a
[3] =&gt; 1
[4] =&gt; 2
[5] =&gt; 3
)

## Tabla de contenidos

- [Ds\Deque::allocate](#ds-deque.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Deque::apply](#ds-deque.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Deque::capacity](#ds-deque.capacity) — Devuelve la capacidad actual
- [Ds\Deque::clear](#ds-deque.clear) — Elimina todos los valores del deque
- [Ds\Deque::\_\_construct](#ds-deque.construct) — Crea una nueva instancia
- [Ds\Deque::contains](#ds-deque.contains) — Determina si el deque contiene valores dados
- [Ds\Deque::copy](#ds-deque.copy) — Devuelve una copia superficial de la deque
- [Ds\Deque::count](#ds-deque.count) — Devuelve el número de valores en la colección
- [Ds\Deque::filter](#ds-deque.filter) — Crear un nuevo deque utilizando un callable para
  determinar qué valores incluir
- [Ds\Deque::find](#ds-deque.find) — Intenta encontrar el índice de un valor.
- [Ds\Deque::first](#ds-deque.first) — Devuelve el primer valor de la deque
- [Ds\Deque::get](#ds-deque.get) — Devuelve el valor en un índice dado
- [Ds\Deque::insert](#ds-deque.insert) — Inserta valores en un índice dado
- [Ds\Deque::isEmpty](#ds-deque.isempty) — Indica si la deque está vacía
- [Ds\Deque::join](#ds-deque.join) — Reúne todos los valores en un string
- [Ds\Deque::jsonSerialize](#ds-deque.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Deque::last](#ds-deque.last) — Devuelve el último valor
- [Ds\Deque::map](#ds-deque.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Deque::merge](#ds-deque.merge) — Devuelve el resultado de la adición de todos los valores dados al deque
- [Ds\Deque::pop](#ds-deque.pop) — Elimina y devuelve el último valor
- [Ds\Deque::push](#ds-deque.push) — Añade valores al final del deque
- [Ds\Deque::reduce](#ds-deque.reduce) — Reduce el deque a un solo valor utilizando una función de retrollamada
- [Ds\Deque::remove](#ds-deque.remove) — Elimina y devuelve un valor por índice
- [Ds\Deque::reverse](#ds-deque.reverse) — Invierte el deque en su lugar
- [Ds\Deque::reversed](#ds-deque.reversed) — Devuelve una copia invertida
- [Ds\Deque::rotate](#ds-deque.rotate) — Rota el deque un cierto número de rotaciones
- [Ds\Deque::set](#ds-deque.set) — Actualiza un valor en un índice dado
- [Ds\Deque::shift](#ds-deque.shift) — Elimina y devuelve el primer valor
- [Ds\Deque::slice](#ds-deque.slice) — Devuelve un sub-deque de un rango dado
- [Ds\Deque::sort](#ds-deque.sort) — Ordena el deque en su lugar
- [Ds\Deque::sorted](#ds-deque.sorted) — Devuelve una copia ordenada
- [Ds\Deque::sum](#ds-deque.sum) — Devuelve la suma de todos los valores del deque
- [Ds\Deque::toArray](#ds-deque.toarray) — Convierte el deque en un array
- [Ds\Deque::unshift](#ds-deque.unshift) — Añade valores al inicio del deque

# La clase Map

(PECL ds &gt;= 1.0.0)

## Introducción

    Un Map es una colección secuencial de pares clave-valor, casi identico a un
    [array](#language.types.array) usado en un contexto similar. Las claves pueden ser de cualquier tipo, pero deben ser únicos.
    Los valores se reemplazan si se agregan al mapa usando la misma clave.








    ## Fortalezas





            - Las claves y valores pueden ser de cualquer tipo, incluyendo objetos.

            - Soporta la sintaxis array (corchetes).

            - Se mantiene el orden de inserción.

            - El rendimiento y la eficiencia de memoria son muy similares al de un [array](#language.types.array).

            - Automáticamente libera la memoria asignada cuando su tamaño cae lo suficientemente bajo.






    ## Debilidades





            - No puede ser convertido a un array cuando los objetos son usados como claves.



## Sinopsis de la Clase

    ****




      class **Ds\Map**


     implements
       [Ds\Collection](#class.ds-collection),  [ArrayAccess](#class.arrayaccess) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-map.constants.min-capacity) = 16;


    /* Métodos */

public [allocate](#ds-map.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [apply](#ds-map.apply)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [capacity](#ds-map.capacity)(): [int](#language.types.integer)
public [clear](#ds-map.clear)(): [void](language.types.void.html)
public [copy](#ds-map.copy)(): [Ds\Map](#class.ds-map)
public [diff](#ds-map.diff)([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)
public [filter](#ds-map.filter)([callable](#language.types.callable) $callback = ?): [Ds\Map](#class.ds-map)
public [first](#ds-map.first)(): [Ds\Pair](#class.ds-pair)
public [get](#ds-map.get)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $default = ?): [mixed](#language.types.mixed)
public [hasKey](#ds-map.haskey)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
public [hasValue](#ds-map.hasvalue)([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)
public [intersect](#ds-map.intersect)([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)
public [isEmpty](#ds-map.isempty)(): [bool](#language.types.boolean)
public [keys](#ds-map.keys)(): [Ds\Set](#class.ds-set)
public [ksort](#ds-map.ksort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
public [ksorted](#ds-map.ksorted)([callable](#language.types.callable) $comparator = ?): [Ds\Map](#class.ds-map)
public [last](#ds-map.last)(): [Ds\Pair](#class.ds-pair)
public [map](#ds-map.map)([callable](#language.types.callable) $callback): [Ds\Map](#class.ds-map)
public [merge](#ds-map.merge)([mixed](#language.types.mixed) $values): [Ds\Map](#class.ds-map)
public [pairs](#ds-map.pairs)(): [Ds\Sequence](#class.ds-sequence)
public [put](#ds-map.put)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [putAll](#ds-map.putall)([mixed](#language.types.mixed) $pairs): [void](language.types.void.html)
public [reduce](#ds-map.reduce)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)
public [remove](#ds-map.remove)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $default = ?): [mixed](#language.types.mixed)
public [reverse](#ds-map.reverse)(): [void](language.types.void.html)
public [reversed](#ds-map.reversed)(): [Ds\Map](#class.ds-map)
public [skip](#ds-map.skip)([int](#language.types.integer) $position): [Ds\Pair](#class.ds-pair)
public [slice](#ds-map.slice)([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Map](#class.ds-map)
public [sort](#ds-map.sort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
public [sorted](#ds-map.sorted)([callable](#language.types.callable) $comparator = ?): [Ds\Map](#class.ds-map)
public [sum](#ds-map.sum)(): [int](#language.types.integer)|[float](#language.types.float)
public [toArray](#ds-map.toarray)(): [array](#language.types.array)
public [union](#ds-map.union)([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)
public [values](#ds-map.values)(): [Ds\Sequence](#class.ds-sequence)
public [xor](#ds-map.xor)([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)

}

## Constantes predefinidas

     **[Ds\Map::MIN_CAPACITY](#ds-map.constants.min-capacity)**






## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         La clase ahora implementa [ArrayAccess](#class.arrayaccess).






# Ds\Map::allocate

(PECL ds &gt;= 1.0.0)

Ds\Map::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Map::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asigna suficiente memoria para una capacidad requerida.

### Parámetros

    capacity


        El número de valores para los cuales la capacidad debe ser asignada.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.




     **Nota**:



            La capacidad será siempre redondeada a la potencia de 2 más cercana.





### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::allocate()**

&lt;?php
$map = new \Ds\Map();
var_dump($map-&gt;capacity());

$map-&gt;allocate(100);
var_dump($map-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(16)
int(128)

# Ds\Map::apply

(PECL ds &gt;= 1.0.0)

Ds\Map::apply — Actualiza todos los valores aplicando una retrollamada a cada valor

### Descripción

public **Ds\Map::apply**([callable](#language.types.callable) $callback): [void](language.types.void.html)

    Actualiza todos los valores aplicando una callback a
    cada valor del mapa.

### Parámetros

    callback






                callback([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



            Un [callable](#language.types.callable) a aplicar a cada valor del mapa.





            La retrollamada debe devolver lo que el valor debe ser reemplazado por.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::apply()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$map-&gt;apply(function($key, $value) { return $value \* 2; });

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 2
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 4
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 6
        )

)

# Ds\Map::capacity

(PECL ds &gt;= 1.0.0)

Ds\Map::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Map::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::capacity()**

&lt;?php
$map = new \Ds\Map();
var_dump($map-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(16)

# Ds\Map::clear

(PECL ds &gt;= 1.0.0)

Ds\Map::clear — Elimina todos los valores

### Descripción

public **Ds\Map::clear**(): [void](language.types.void.html)

    Elimina todos los valores del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::clear()**

&lt;?php
$map = new \Ds\Map([
    "a" =&gt; 1,
    "b" =&gt; 2,
    "c" =&gt; 3,
]);
print_r($map);

$map-&gt;clear();
print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)
Ds\Map Object
(
)

# Ds\Map::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Map::\_\_construct — Crear una nueva instancia

### Descripción

public **Ds\Map::\_\_construct**([mixed](#language.types.mixed) ...$values)

    Crear una nueva instancia, utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los values iniciales.

### Parámetros

    values


        Un objeto traversable o un [array](#language.types.array) a utilizar para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::\_\_construct()**

&lt;?php
$map = new \Ds\Map();
var_dump($map);

$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#1 (0) {
}
object(Ds\Map)#2 (3) {
[0]=&gt;
object(Ds\Pair)#1 (2) {
["key"]=&gt;
string(1) "a"
["value"]=&gt;
int(1)
}
[1]=&gt;
object(Ds\Pair)#3 (2) {
["key"]=&gt;
string(1) "b"
["value"]=&gt;
int(2)
}
[2]=&gt;
object(Ds\Pair)#4 (2) {
["key"]=&gt;
string(1) "c"
["value"]=&gt;
int(3)
}
}

# Ds\Map::copy

(PECL ds &gt;= 1.0.0)

Ds\Map::copy — Devuelve una copia superficial del mapa

### Descripción

public **Ds\Map::copy**(): [Ds\Map](#class.ds-map)

    Devuelve una copia superficial del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial del mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::copy()**

&lt;?php
$map = new \Ds\Map([
"a" =&gt; 1,
"b" =&gt; 2,
"c" =&gt; 3,
]);

print_r($map-&gt;copy());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

# Ds\Map::count

(PECL ds &gt;= 1.0.0)

Ds\Map::count — Devuelve el número de valores en el mapa

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Map::diff

(PECL ds &gt;= 1.0.0)

Ds\Map::diff — Crear un nuevo map utilizando claves que no están en otro map

### Descripción

public **Ds\Map::diff**([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)

    Devuelve el resultado de la eliminación de todas las claves de la instancia actual que están
    presentes en un map dado.




    A \ B = {x ∈ A | x ∉ B}

### Parámetros

    map


        El map que contiene las claves a excluir del map resultante.


### Valores devueltos

    El resultado de la eliminación de todas las claves de la instancia actual que están
    presentes en un map dado.

### Ver también

    - [» Complement](https://en.wikipedia.org/wiki/Complement_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::diff()**

&lt;?php
$a = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$b = new \Ds\Map(["b" =&gt; 4, "c" =&gt; 5, "d" =&gt; 6]);

var_dump($a-&gt;diff($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#3 (1) {
[0]=&gt;
object(Ds\Pair)#4 (2) {
["key"]=&gt;
string(1) "a"
["value"]=&gt;
int(1)
}
}

# Ds\Map::filter

(PECL ds &gt;= 1.0.0)

Ds\Map::filter —
Crear un nuevo mapa utilizando un [callable](#language.types.callable) para determinar qué pares incluir

### Descripción

public **Ds\Map::filter**([callable](#language.types.callable) $callback = ?): [Ds\Map](#class.ds-map)

    Crear un nuevo mapa utilizando un [callable](#language.types.callable) para determinar qué pares incluir.

### Parámetros

    callback




callback([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

            Un [callable](#language.types.callable) opcional que devuelve **[true](#constant.true)** si el par debe ser incluido, **[false](#constant.false)** en caso contrario.




            Si no se proporciona ninguna función de retrollamada, solo se incluirán los valores que sean **[true](#constant.true)**
            (ver [conversión en booléen](#language.types.boolean.casting)).


### Valores devueltos

    Un nuevo mapa que contiene todos los pares para los cuales
    el callback ha devuelto **[true](#constant.true)**, o todas las claves que
    se convierten en **[true](#constant.true)** si no se proporciona un callback.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::filter()** utilizando una función de retrollamada

&lt;?php
$map = new \Ds\Map(["a", "b", "c", "d", "e"]);

var_dump($map-&gt;filter(function($key, $value) {
return $key % 2 == 0;
}));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#3 (3) {
[0]=&gt;
object(Ds\Pair)#2 (2) {
["key"]=&gt;
int(0)
["value"]=&gt;
string(1) "a"
}
[1]=&gt;
object(Ds\Pair)#4 (2) {
["key"]=&gt;
int(2)
["value"]=&gt;
string(1) "c"
}
[2]=&gt;
object(Ds\Pair)#5 (2) {
["key"]=&gt;
int(4)
["value"]=&gt;
string(1) "e"
}
}

**Ejemplo #2 Ejemplo de Ds\Map::filter()** sin función de retrollamada

&lt;?php
$map = new \Ds\Map(["a" =&gt; 0, "b" =&gt; 1, "c" =&gt; true, "d" =&gt; false]);

var_dump($map-&gt;filter());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
string(1) "a"
[2]=&gt;
bool(true)
}

# Ds\Map::first

(PECL ds &gt;= 1.0.0)

Ds\Map::first — Devuelve la primera pareja del mapa

### Descripción

public **Ds\Map::first**(): [Ds\Pair](#class.ds-pair)

    Devuelve la primera pareja del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La primera pareja del mapa.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::first()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Pair)#2 (2) {
["key"]=&gt;
string(1) "a"
["value"]=&gt;
int(1)
}

# Ds\Map::get

(PECL ds &gt;= 1.0.0)

Ds\Map::get — Devuelve el valor para una clave dada

### Descripción

public **Ds\Map::get**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $default = ?): [mixed](#language.types.mixed)

    Devuelve el valor para una clave dada, o un valor por defecto opcional si la clave
    no ha podido ser encontrada.

**Nota**:

        Las claves de tipo [object](#language.types.object) son soportadas.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

**Nota**:

        Asimismo, se puede utilizar la sintaxis de array para acceder a los valores por clave, por ejemplo $map["clé"].

**Precaución**

        Atención al uso de la sintaxis de array. Las claves escalares serán coercionadas a
        enteros por el motor. Por ejemplo, $map["1"] intentará acceder a int(1),
        mientras que $map-&gt;get("1") buscará correctamente la clave de string.




        Ver [array](#language.types.array).

### Parámetros

    key


        La clave a buscar.






    default


        El valor por defecto opcional, devuelto si la clave no ha podido ser encontrada.


### Valores devueltos

    El valor mapeado a la clave dada, o el valor por defecto
    si se proporciona y la clave no ha podido ser encontrada en el mapa.

### Errores/Excepciones

[OutOfBoundsException](#class.outofboundsexception) si la clave no ha podido ser encontrada
y ningún valor por defecto ha sido proporcionado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::get()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;get("a"));       // 1
var_dump($map-&gt;get("d", 10)); // 10 (usar por defecto)
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)
int(10)

**Ejemplo #2 Ejemplo de Ds\Map::get()** utilizando la sintaxis de array

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map["a"]); // 1
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

# Ds\Map::hasKey

(PECL ds &gt;= 1.0.0)

Ds\Map::hasKey — Determina si el mapa contiene una clave dada

### Descripción

public **Ds\Map::hasKey**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

    Determina si el mapa contiene una clave dada.

### Parámetros

    key


        La clave a buscar.


### Valores devueltos

    Devuelve **[true](#constant.true)** si la clave ha sido encontrada, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ds\Map::hasKey()** example

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;hasKey("a")); // true
var_dump($map-&gt;hasKey("e")); // false
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

# Ds\Map::hasValue

(PECL ds &gt;= 1.0.0)

Ds\Map::hasValue — Determina si el mapa contiene un valor dado

### Descripción

public **Ds\Map::hasValue**([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

    Determina si el mapa contiene un valor dado.

### Parámetros

    value


        El valor a buscar.


### Valores devueltos

    Devuelve **[true](#constant.true)** si el valor ha sido encontrado, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::hasValue()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;hasValue(1)); // true
var_dump($map-&gt;hasValue(4)); // false
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

# Ds\Map::intersect

(PECL ds &gt;= 1.0.0)

Ds\Map::intersect — Crear un nuevo mapa intersectando las claves con otro mapa

### Descripción

public **Ds\Map::intersect**([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)

    Crear un nuevo mapa que contiene las parejas de la instancia actual cuyas claves
    están también presentes en el map dado.

    En otras palabras, devuelve una copia de la instancia actual con todas las claves eliminadas que
    no están también en el otro map.




    A ∩ B = {x : x ∈ A ∧ x ∈ B}

**Nota**:

        Los valores de la instancia actual serán conservados.

### Parámetros

    map


        El otro mapa, que contiene las claves a intersectar.


### Valores devueltos

     La intersección de las claves de la instancia actual y de otro map.

### Ver también

    - [» Intersection](https://en.wikipedia.org/wiki/Intersection_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::intersect()**

&lt;?php
$a = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$b = new \Ds\Map(["b" =&gt; 4, "c" =&gt; 5, "d" =&gt; 6]);

var_dump($a-&gt;intersect($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#3 (2) {
[0]=&gt;
object(Ds\Pair)#4 (2) {
["key"]=&gt;
string(1) "b"
["value"]=&gt;
int(2)
}
[1]=&gt;
object(Ds\Pair)#5 (2) {
["key"]=&gt;
string(1) "c"
["value"]=&gt;
int(3)
}
}

# Ds\Map::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Map::isEmpty — Indica si el mapa está vacío

### Descripción

public **Ds\Map::isEmpty**(): [bool](#language.types.boolean)

    Indica si el mapa está vacío.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si el mapa está vacío, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::isEmpty()**

&lt;?php
$a = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$b = new \Ds\Map();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Map::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Map::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    Nunca debería ser necesario llamar a esto directamente.

# Ds\Map::keys

(PECL ds &gt;= 1.0.0)

Ds\Map::keys — Devuelve un conjunto de las claves del mapa

### Descripción

public **Ds\Map::keys**(): [Ds\Set](#class.ds-set)

    Devuelve un conjunto que contiene todas las claves del mapa, en el mismo orden.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un conjunto [Ds\Set](#class.ds-set) que contiene todas las claves del mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::keys()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map-&gt;keys());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#2 (3) {
[0]=&gt;
string(1) "a"
[1]=&gt;
string(1) "b"
[2]=&gt;
string(1) "c"
}

# Ds\Map::ksort

(PECL ds &gt;= 1.0.0)

Ds\Map::ksort —
Ordena el mapa en el lugar por clave

### Descripción

public **Ds\Map::ksort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena el mapa en el lugar por clave, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::ksort()**

&lt;?php
$map = new \Ds\Map(["b" =&gt; 2, "c" =&gt; 3, "a" =&gt; 1]);
$map-&gt;ksort();

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

**Ejemplo #2 Ejemplo de Ds\Map::ksort()** utilizando un comparador

&lt;?php
$map = new \Ds\Map([1 =&gt; "x", 2 =&gt; "y", 0 =&gt; "z"]);

// Reverse
$map-&gt;ksort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; 2
[value] =&gt; y
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; 1
            [value] =&gt; x
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; 0
            [value] =&gt; z
        )

)

# Ds\Map::ksorted

(No version information available, might only be in Git)

Ds\Map::ksorted — Devuelve una copia, ordenada por clave

### Descripción

public **Ds\Map::ksorted**([callable](#language.types.callable) $comparator = ?): [Ds\Map](#class.ds-map)

    Devuelve una copia ordenada por clave, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    Devuelve una copia del mapa, ordenada por clave.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::ksorted()**

&lt;?php
$map = new \Ds\Map(["b" =&gt; 2, "c" =&gt; 3, "a" =&gt; 1]);

print_r($map-&gt;ksorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

**Ejemplo #2 Ejemplo de Ds\Map::ksorted()** utilizando un comparador

&lt;?php
$map = new \Ds\Map([1 =&gt; "x", 2 =&gt; "y", 0 =&gt; "z"]);

// Invertir
$sorted = $map-&gt;ksorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; 2
[value] =&gt; y
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; 1
            [value] =&gt; x
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; 0
            [value] =&gt; z
        )

)

# Ds\Map::last

(PECL ds &gt;= 1.0.0)

Ds\Map::last — Devuelve el último par del mapa

### Descripción

public **Ds\Map::last**(): [Ds\Pair](#class.ds-pair)

    Devuelve el último par del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el último par del mapa.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::last()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map-&gt;last());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Pair)#2 (2) {
["key"]=&gt;
string(1) "c"
["value"]=&gt;
int(3)
}

# Ds\Map::map

(PECL ds &gt;= 1.0.0)

Ds\Map::map — Devuelve el resultado de la aplicación de una retrollamada a cada valor

### Descripción

public **Ds\Map::map**([callable](#language.types.callable) $callback): [Ds\Map](#class.ds-map)

    Devuelve el resultado de la aplicación de un callback a
    cada valor del mapa.

### Parámetros

    callback





                callback([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



            Un [callable](#language.types.callable) a aplicar a cada valor del mapa.





            La retrollamada debe devolver aquello a lo que la clave será mappada
            en el mapa resultante.


### Valores devueltos

    El resultado de la aplicación de un callback a cada valor del
    mapa.

**Nota**:

        Las claves y los valores de la instancia actual no serán afectados.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::map()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

print_r($map-&gt;map(function($key, $value) { return $value * 2; }));
print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 2
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 4
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 6
        )

)
Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

# Ds\Map::merge

(PECL ds &gt;= 1.0.0)

Ds\Map::merge — Devuelve el resultado de la adición de todas las asociaciones dadas

### Descripción

public **Ds\Map::merge**([mixed](#language.types.mixed) $values): [Ds\Map](#class.ds-map)

    Devuelve el resultado de la adición de todas las asociaciones de un objeto [traversable](#class.traversable)
    dado o de un [array](#language.types.array) con sus valores correspondientes, combinados con la instancia actual.

**Nota**:

        Los valores de la instancia actual serán sobrescritos por los proporcionados cuando las claves sean iguales.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array).


### Valores devueltos

    El resultado de la asociación de todas las claves de un objeto [traversable](#class.traversable)
    dado o de un [array](#language.types.array) con sus valores correspondientes, combinados con la instancia actual.

**Nota**:

        La instancia actual no será afectada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::merge()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

print_r($map-&gt;merge(["a" =&gt; 10, "e" =&gt; 50]));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 10
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

    [3] =&gt; Ds\Pair Object
        (
            [key] =&gt; e
            [value] =&gt; 50
        )

)

# Ds\Map::pairs

(PECL ds &gt;= 1.0.0)

Ds\Map::pairs — Devuelve una secuencia que contiene todas las parejas del mapa

### Descripción

public **Ds\Map::pairs**(): [Ds\Sequence](#class.ds-sequence)

    Devuelve una [Ds\Sequence](#class.ds-sequence) que contiene todas las parejas del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    [Ds\Sequence](#class.ds-sequence) que contiene todas las parejas del mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::pairs()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;pairs());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#8 (3) {
[0]=&gt;
object(Ds\Pair)#5 (2) {
["key"]=&gt;
string(1) "a"
["value"]=&gt;
int(1)
}
[1]=&gt;
object(Ds\Pair)#6 (2) {
["key"]=&gt;
string(1) "b"
["value"]=&gt;
int(2)
}
[2]=&gt;
object(Ds\Pair)#7 (2) {
["key"]=&gt;
string(1) "c"
["value"]=&gt;
int(3)
}
}
p

# Ds\Map::put

(PECL ds &gt;= 1.0.0)

Ds\Map::put — Asocia una clave a un valor

### Descripción

public **Ds\Map::put**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    Asocia una clave a un valor,
    sobrescribiendo una asociación previa si existe.

**Nota**:

        Las claves de tipo [object](#language.types.object) son soportadas.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

**Nota**:

        Asimismo, se puede utilizar la sintaxis de array para asociar valores por clave, por ejemplo $map["clave"] = $valor.

**Precaución**

        Atención al uso de la sintaxis de array. Las claves escalares serán coercionadas a
        enteros por el motor. Por ejemplo, $map["1"] intentará acceder a
        int(1), mientras que $map-&gt;get("1")
        buscará correctamente la clave de string.




        Ver [arrays](#language.types.array).

### Parámetros

    key


        La clave a asociar al valor.






    value


        El valor a asociar a la clave.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::put()**

&lt;?php
$map = new \Ds\Map();

$map-&gt;put("a", 1);
$map-&gt;put("b", 2);
$map-&gt;put("c", 3);

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

**Ejemplo #2 Ejemplo de Ds\Map::put()** utilizando objetos como clave

&lt;?php
class HashableObject implements \Ds\Hashable
{
/\*\*
_ Un valor arbitrario a utilizar como valor de hash. No define la igualdad.
_/
private $value;

    public function __construct($value)
    {
        $this-&gt;value = $value;
    }

    public function hash()
    {
        return $this-&gt;value;
    }

    public function equals($obj): bool
    {
        return $this-&gt;value === $obj-&gt;value;
    }

}

$map = new \Ds\Map();

$obj = new \ArrayIterator([]);

// Utilizar la misma instancia varias veces sobrescribirá el valor anterior.
$map-&gt;put($obj, 1);
$map-&gt;put($obj, 2);

// Utilizar varias instancias del mismo objeto creará nuevas asociaciones.
$map-&gt;put(new \stdClass(), 3);
$map-&gt;put(new \stdClass(), 4);

// Utilizar varias instancias de objetos iguales sobrescribirá los valores anteriores.
$map-&gt;put(new \HashableObject(1), 5);
$map-&gt;put(new \HashableObject(1), 6);
$map-&gt;put(new \HashableObject(2), 7);
$map-&gt;put(new \HashableObject(2), 8);

var_dump($map);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Map)#1 (5) {
[0]=&gt;
object(Ds\Pair)#7 (2) {
["key"]=&gt;
object(ArrayIterator)#2 (1) {
["storage":"ArrayIterator":private]=&gt;
array(0) {
}
}
["value"]=&gt;
int(2)
}
[1]=&gt;
object(Ds\Pair)#8 (2) {
["key"]=&gt;
object(stdClass)#3 (0) {
}
["value"]=&gt;
int(3)
}
[2]=&gt;
object(Ds\Pair)#9 (2) {
["key"]=&gt;
object(stdClass)#4 (0) {
}
["value"]=&gt;
int(4)
}
[3]=&gt;
object(Ds\Pair)#10 (2) {
["key"]=&gt;
object(HashableObject)#5 (1) {
["value":"HashableObject":private]=&gt;
int(1)
}
["value"]=&gt;
int(6)
}
[4]=&gt;
object(Ds\Pair)#11 (2) {
["key"]=&gt;
object(HashableObject)#6 (1) {
["value":"HashableObject":private]=&gt;
int(2)
}
["value"]=&gt;
int(8)
}
}

# Ds\Map::putAll

(PECL ds &gt;= 1.0.2)

Ds\Map::putAll — Asocia todas las parejas clave-valor de un objeto traversable o de un array

### Descripción

public **Ds\Map::putAll**([mixed](#language.types.mixed) $pairs): [void](language.types.void.html)

    Asocia todas las parejas clave-valor de un objeto [traversable](#class.traversable) o de un [array](#language.types.array).

**Nota**:

        Las claves de tipo [object](#language.types.object) son soportadas.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

### Parámetros

    pairs


        Un objeto [traversable](#class.traversable) o [array](#language.types.array).


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::putAll()**

&lt;?php
$map = new \Ds\Map();

$map-&gt;putAll([
"a" =&gt; 1,
"b" =&gt; 2,
"c" =&gt; 3,
]);

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 3
        )

)

# Ds\Map::reduce

(PECL ds &gt;= 1.0.0)

Ds\Map::reduce — Reduce el mapa a un solo valor utilizando una retrollamada

### Descripción

public **Ds\Map::reduce**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)

    Reduce el mapa a un solo valor utilizando una retrollamada.

### Parámetros

    callback


      callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



        carry


          El valor de retorno de la retrollamada anterior, o initial si
          es la primera iteración.






        key


          La clave de la iteración actual.






        value


          El valor de la iteración actual.










    initial


        El valor inicial del valor de retorno. Puede ser **[null](#constant.null)**.


### Valores devueltos

    El valor de retorno de la retrollamada final.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::reduce()** con valor inicial

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

$callback = function($carry, $key, $value) {
return $carry \* $value;
};

var_dump($map-&gt;reduce($callback, 5));

// Iteraciones:
//
// $carry = $initial = 5
//
// $carry = $carry _ 1 = 5
// $carry = $carry _ 2 = 10
// $carry = $carry \* 3 = 30
?&gt;

Resultado del ejemplo anterior es similar a:

int(30)

**Ejemplo #2 Ejemplo de Ds\Map::reduce()** sin valor inicial

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;reduce(function($carry, $key, $value) {
return $carry + $value + 5;
}));

// Iteraciones:
//
// $carry = $initial = null
//
// $carry = $carry + 1 + 5 = 6
// $carry = $carry + 2 + 5 = 13
// $carry = $carry + 3 + 5 = 21
?&gt;

Resultado del ejemplo anterior es similar a:

int(21)

# Ds\Map::remove

(PECL ds &gt;= 1.0.0)

Ds\Map::remove — Elimina y devuelve un valor por clave

### Descripción

public **Ds\Map::remove**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $default = ?): [mixed](#language.types.mixed)

    Elimina y devuelve un valor por clave, o devuelve un valor por defecto opcional si la clave
    no ha podido ser encontrada.

**Nota**:

        Las claves de tipo [object](#language.types.object) son soportadas.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

**Nota**:

        Asimismo, se puede utilizar la sintaxis de array para acceder a los valores por clave, por ejemplo $map["clé"].

**Precaución**

        Atención al uso de la sintaxis de array. Las claves escalares serán forzadas a
        enteros por el motor. Por ejemplo, $map["1"] intentará acceder a
        int(1), mientras que $map-&gt;get("1")
        buscará correctamente la clave de string.




        Ver [arrays](#language.types.array).

### Parámetros

    key


        La clave a eliminar.






    default


        El valor por defecto opcional, devuelto si la clave no ha podido ser encontrada.


### Valores devueltos

    El valor que ha sido eliminado, o el default
    valor si ha sido proporcionado y la key no ha podido ser encontrada en el mapa.

### Errores/Excepciones

[OutOfBoundsException](#class.outofboundsexception) si la clave no ha sido encontrada
y ningún valor por defecto ha sido proporcionado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::remove()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;remove("a"));      //  1
var_dump($map-&gt;remove("e", 10)); // 10 (uso del valor por defecto)
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)
int(10)

# Ds\Map::reverse

(PECL ds &gt;= 1.0.0)

Ds\Map::reverse —
Invierte el mapa en su lugar

### Descripción

public **Ds\Map::reverse**(): [void](language.types.void.html)

    Invierte el mapa en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::reverse()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$map-&gt;reverse();

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; c
[value] =&gt; 3
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 1
        )

)

# Ds\Map::reversed

(PECL ds &gt;= 1.0.0)

Ds\Map::reversed — Devuelve una copia invertida

### Descripción

public **Ds\Map::reversed**(): [Ds\Map](#class.ds-map)

    Devuelve una copia invertida del mapa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una copia invertida del mapa.

**Nota**:

            La instancia actual no se ve afectada.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::reversed()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

print_r($map-&gt;reversed());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; c
[value] =&gt; 3
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 1
        )

)

# Ds\Map::skip

(PECL ds &gt;= 1.0.0)

Ds\Map::skip — Devuelve el par a un índice de posición dado

### Descripción

public **Ds\Map::skip**([int](#language.types.integer) $position): [Ds\Pair](#class.ds-pair)

    Devuelve el par a un índice dado basado en cero position.

### Parámetros

    position


        El índice de posición basado en cero a devolver.


### Valores devueltos

    Devuelve el [Ds\Pair](#class.ds-pair) a la position dada.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si la posición no es válida.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::skip()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);

var_dump($map-&gt;skip(1));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Pair)#2 (2) {
["key"]=&gt;
string(1) "b"
["value"]=&gt;
int(2)
}

# Ds\Map::slice

(PECL ds &gt;= 1.0.0)

Ds\Map::slice —
Devuelve un subconjunto del mapa definido por un índice de inicio y una longitud

### Descripción

public **Ds\Map::slice**([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Map](#class.ds-map)

    Devuelve un subconjunto del mapa definido por un index de inicio y una longitud length.

### Parámetros

    index


            El índice desde el cual comienza el rango.




            Si es positivo, el rango comenzará en este índice en el mapa.
            Si es negativo, el rango comenzará a esta distancia del final.






    length


        Si se da una longitud y es positiva, el mapa resultante
        tendrá hasta tantas parejas.

        Si se da una longitud y es negativa, el rango
        terminará a tantas parejas del final.

        Si la longitud provoca un desbordamiento, solo
        las parejas hasta el final del mapa serán incluidas.

        Si no se proporciona una longitud, el mapa resultante
        contendrá todas las parejas entre el índice y el final del mapa.


### Valores devueltos

    Un subconjunto del mapa definido por un índice de inicio y una longitud.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::slice()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3, "d" =&gt; 4, "e" =&gt; 5]);

// Slice desde 2 en adelante
print_r($map-&gt;slice(2)-&gt;toArray());

// Slice desde 1, con una longitud de 3
print_r($map-&gt;slice(1, 3)-&gt;toArray());

// Slice desde 1 en adelante
print_r($map-&gt;slice(1)-&gt;toArray());

// Slice desde 2 desde el final en adelante
print_r($map-&gt;slice(-2)-&gt;toArray());

// Slice desde 1 hasta 1 desde el final
print_r($map-&gt;slice(1, -1)-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[c] =&gt; 3
[d] =&gt; 4
[e] =&gt; 5
)
Array
(
[b] =&gt; 2
[c] =&gt; 3
[d] =&gt; 4
)
Array
(
[b] =&gt; 2
[c] =&gt; 3
[d] =&gt; 4
[e] =&gt; 5
)
Array
(
[d] =&gt; 4
[e] =&gt; 5
)
Array
(
[b] =&gt; 2
[c] =&gt; 3
[d] =&gt; 4
)

# Ds\Map::sort

(PECL ds &gt;= 1.0.0)

Ds\Map::sort —
Ordena el mapa en el lugar por valor

### Descripción

public **Ds\Map::sort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena el mapa en el lugar por valor, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::sort()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 2, "b" =&gt; 3, "c" =&gt; 1]);
$map-&gt;sort();

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; c
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 3
        )

)

**Ejemplo #2 Ejemplo de Ds\Map::sort()** utilizando un comparador

&lt;?php
$map = new \Ds\Map(["a" =&gt; 2, "b" =&gt; 3, "c" =&gt; 1]);

$map-&gt;sort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($map);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; b
[value] =&gt; 3
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 1
        )

)

# Ds\Map::sorted

(PECL ds &gt;= 1.0.0)

Ds\Map::sorted — Devuelve una copia, ordenada por valor

### Descripción

public **Ds\Map::sorted**([callable](#language.types.callable) $comparator = ?): [Ds\Map](#class.ds-map)

    Devuelve una copia, ordenada por valor utilizando una función comparator opcional.

### Parámetros

     comparator



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

    Devuelve una copia del mapa, ordenada por valor.

### Ejemplos

**Ejemplo #1 Ejemplo de [Ds\Map::sort()](#ds-map.sort)**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 2, "b" =&gt; 3, "c" =&gt; 1]);

print_r($map-&gt;sorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; c
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 3
        )

)

**Ejemplo #2 Ejemplo de [Ds\Map::sort()](#ds-map.sort) utilizando un comparador**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 2, "b" =&gt; 3, "c" =&gt; 1]);

// Invertir
$sorted = $map-&gt;sorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; b
[value] =&gt; 3
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; a
            [value] =&gt; 2
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 1
        )

)

# Ds\Map::sum

(No version information available, might only be in Git)

Ds\Map::sum — Devuelve la suma de todos los valores del mapa

### Descripción

public **Ds\Map::sum**(): [int](#language.types.integer)|[float](#language.types.float)

    Devuelve la suma de todos los valores del mapa.

**Nota**:

        Los arrays y los objetos se consideran iguales a cero en el cálculo de la suma.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La suma de todos los valores del mapa como [float](#language.types.float) o [int](#language.types.integer)
    dependiendo de los valores del mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::sum()** con enteros

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

int(6)

**Ejemplo #2 Ejemplo de Ds\Map::sum()** con números de punto flotante

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2.5, "c" =&gt; 3]);
var_dump($map-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

float(6.5)

# Ds\Map::toArray

(PECL ds &gt;= 1.0.0)

Ds\Map::toArray —
Convierte el mapa en un [array](#language.types.array)

### Descripción

public **Ds\Map::toArray**(): [array](#language.types.array)

    Convierte el mapa en un [array](#language.types.array).

**Precaución**

            Los mapas donde las claves no son escalares no pueden ser convertidos en [array](#language.types.array).




    **Precaución**

            Un [array](#language.types.array) tratará todas las claves numéricas como enteros,
            por ejemplo "1" y 1 como claves en el mapa
            resultará solo en 1 siendo incluido en el array.


**Nota**:

        La conversión en [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) conteniendo todos los valores en el mismo orden que el mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::toArray()**

&lt;?php
$map = new \Ds\Map([
"a" =&gt; 1,
"b" =&gt; 2,
"c" =&gt; 3,
]);

var_dump($map-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
["a"]=&gt;
int(1)
["b"]=&gt;
int(2)
["c"]=&gt;
int(3)
}

# Ds\Map::union

(PECL ds &gt;= 1.0.0)

Ds\Map::union — Crear un nuevo mapa utilizando los valores de la instancia actual y de otro mapa

### Descripción

public **Ds\Map::union**([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)

    Crear un nuevo mapa que contiene los pares de la instancia actual así como los pares de otro map.




    A ∪ B = {x: x ∈ A ∨ x ∈ B}

**Nota**:

        Los valores de la instancia actual serán sobrescritos por aquellos proporcionados cuando las claves sean iguales.

### Parámetros

    map


        El otro mapa, a combinar con la instancia actual.


### Valores devueltos

     Un nuevo mapa que contiene todos los pares de la instancia actual así como de otro map.

### Ver también

    - [» &gt;Union](https://en.wikipedia.org/wiki/Union_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::union()**

&lt;?php
$a = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$b = new \Ds\Map(["b" =&gt; 3, "c" =&gt; 4, "d" =&gt; 5]);

print_r($a-&gt;union($b));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; b
            [value] =&gt; 3
        )

    [2] =&gt; Ds\Pair Object
        (
            [key] =&gt; c
            [value] =&gt; 4
        )

    [3] =&gt; Ds\Pair Object
        (
            [key] =&gt; d
            [value] =&gt; 5
        )

)

# Ds\Map::values

(PECL ds &gt;= 1.0.0)

Ds\Map::values — Devuelve una secuencia de los valores del mapa

### Descripción

public **Ds\Map::values**(): [Ds\Sequence](#class.ds-sequence)

    Devuelve una secuencia que contiene todos los valores del mapa, en el mismo orden.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una [Ds\Sequence](#class.ds-sequence) que contiene todos los valores del mapa.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::values()**

&lt;?php
$map = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
var_dump($map-&gt;values());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Vector)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Map::xor

(PECL ds &gt;= 1.0.0)

Ds\Map::xor — Crear un nuevo mapa utilizando las claves de la instancia actual o de otro mapa, pero no de ambos

### Descripción

public **Ds\Map::xor**([Ds\Map](#class.ds-map) $map): [Ds\Map](#class.ds-map)

    Crear un nuevo mapa que contiene las claves de la instancia actual así como de otro map,
    pero no de ambos.




    A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

### Parámetros

    map


        El otro mapa.


### Valores devueltos

        Un nuevo mapa que contiene las claves de la instancia actual así como de otro map,
        pero no de ambos.

### Ver también

    - [» Diferencia simétrica](https://en.wikipedia.org/wiki/Symmetric_difference) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Map::xor()**

&lt;?php
$a = new \Ds\Map(["a" =&gt; 1, "b" =&gt; 2, "c" =&gt; 3]);
$b = new \Ds\Map(["b" =&gt; 4, "c" =&gt; 5, "d" =&gt; 6]);

print_r($a-&gt;xor($b));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Map Object
(
[0] =&gt; Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

    [1] =&gt; Ds\Pair Object
        (
            [key] =&gt; d
            [value] =&gt; 6
        )

)

## Tabla de contenidos

- [Ds\Map::allocate](#ds-map.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Map::apply](#ds-map.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Map::capacity](#ds-map.capacity) — Devuelve la capacidad actual
- [Ds\Map::clear](#ds-map.clear) — Elimina todos los valores
- [Ds\Map::\_\_construct](#ds-map.construct) — Crear una nueva instancia
- [Ds\Map::copy](#ds-map.copy) — Devuelve una copia superficial del mapa
- [Ds\Map::count](#ds-map.count) — Devuelve el número de valores en el mapa
- [Ds\Map::diff](#ds-map.diff) — Crear un nuevo map utilizando claves que no están en otro map
- [Ds\Map::filter](#ds-map.filter) — Crear un nuevo mapa utilizando un callable para determinar qué pares incluir
- [Ds\Map::first](#ds-map.first) — Devuelve la primera pareja del mapa
- [Ds\Map::get](#ds-map.get) — Devuelve el valor para una clave dada
- [Ds\Map::hasKey](#ds-map.haskey) — Determina si el mapa contiene una clave dada
- [Ds\Map::hasValue](#ds-map.hasvalue) — Determina si el mapa contiene un valor dado
- [Ds\Map::intersect](#ds-map.intersect) — Crear un nuevo mapa intersectando las claves con otro mapa
- [Ds\Map::isEmpty](#ds-map.isempty) — Indica si el mapa está vacío
- [Ds\Map::jsonSerialize](#ds-map.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Map::keys](#ds-map.keys) — Devuelve un conjunto de las claves del mapa
- [Ds\Map::ksort](#ds-map.ksort) — Ordena el mapa en el lugar por clave
- [Ds\Map::ksorted](#ds-map.ksorted) — Devuelve una copia, ordenada por clave
- [Ds\Map::last](#ds-map.last) — Devuelve el último par del mapa
- [Ds\Map::map](#ds-map.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Map::merge](#ds-map.merge) — Devuelve el resultado de la adición de todas las asociaciones dadas
- [Ds\Map::pairs](#ds-map.pairs) — Devuelve una secuencia que contiene todas las parejas del mapa
- [Ds\Map::put](#ds-map.put) — Asocia una clave a un valor
- [Ds\Map::putAll](#ds-map.putall) — Asocia todas las parejas clave-valor de un objeto traversable o de un array
- [Ds\Map::reduce](#ds-map.reduce) — Reduce el mapa a un solo valor utilizando una retrollamada
- [Ds\Map::remove](#ds-map.remove) — Elimina y devuelve un valor por clave
- [Ds\Map::reverse](#ds-map.reverse) — Invierte el mapa en su lugar
- [Ds\Map::reversed](#ds-map.reversed) — Devuelve una copia invertida
- [Ds\Map::skip](#ds-map.skip) — Devuelve el par a un índice de posición dado
- [Ds\Map::slice](#ds-map.slice) — Devuelve un subconjunto del mapa definido por un índice de inicio y una longitud
- [Ds\Map::sort](#ds-map.sort) — Ordena el mapa en el lugar por valor
- [Ds\Map::sorted](#ds-map.sorted) — Devuelve una copia, ordenada por valor
- [Ds\Map::sum](#ds-map.sum) — Devuelve la suma de todos los valores del mapa
- [Ds\Map::toArray](#ds-map.toarray) — Convierte el mapa en un array
- [Ds\Map::union](#ds-map.union) — Crear un nuevo mapa utilizando los valores de la instancia actual y de otro mapa
- [Ds\Map::values](#ds-map.values) — Devuelve una secuencia de los valores del mapa
- [Ds\Map::xor](#ds-map.xor) — Crear un nuevo mapa utilizando las claves de la instancia actual o de otro mapa, pero no de ambos

# La clase Pair

(PECL ds &gt;= 1.0.0)

## Introducción

    Un par es usado por [Ds\Map](#class.ds-map) para emparejar las claves con valores.

## Sinopsis de la Clase

    ****




      class **Ds\Pair**


     implements
       [JsonSerializable](#class.jsonserializable) {


    /* Métodos */

public [\_\_construct](#ds-pair.construct)([mixed](#language.types.mixed) $key = ?, [mixed](#language.types.mixed) $value = ?)

    public [clear](#ds-pair.clear)(): [void](language.types.void.html)

public [copy](#ds-pair.copy)(): [Ds\Pair](#class.ds-pair)
public [isEmpty](#ds-pair.isempty)(): [bool](#language.types.boolean)
public [toArray](#ds-pair.toarray)(): [array](#language.types.array)

}

# Ds\Pair::clear

(No version information available, might only be in Git)

Ds\Pair::clear — Elimina todos los valores

### Descripción

public **Ds\Pair::clear**(): [void](language.types.void.html)

    Elimina todos los valores del par.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Pair::clear()**

&lt;?php
$pair = new \Ds\Pair("a", 1);
print_r($pair);

$pair-&gt;clear();
print_r($pair);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Pair Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Pair Object
(
)

# Ds\Pair::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Pair::\_\_construct — Crear una nueva instancia

### Descripción

public **Ds\Pair::\_\_construct**([mixed](#language.types.mixed) $key = ?, [mixed](#language.types.mixed) $value = ?)

    Crear una nueva instancia utilizando una clave y un valor dados.

### Parámetros

    key


        La clave.






    value


        El valor.


# Ds\Pair::copy

(No version information available, might only be in Git)

Ds\Pair::copy — Devuelve una copia superficial del par

### Descripción

public **Ds\Pair::copy**(): [Ds\Pair](#class.ds-pair)

    Devuelve una copia superficial del par.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial del par.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Pair::copy()**

&lt;?php
$a = new \Ds\Pair("a", 1);
$b = $a-&gt;copy();

$a-&gt;key = "x";

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Pair Object
(
[key] =&gt; x
[value] =&gt; 1
)
Ds\Pair Object
(
[key] =&gt; a
[value] =&gt; 1
)

# Ds\Pair::isEmpty

(No version information available, might only be in Git)

Ds\Pair::isEmpty — Indica si la pareja está vacía

### Descripción

public **Ds\Pair::isEmpty**(): [bool](#language.types.boolean)

    Indica si la pareja está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la pareja está vacía, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Pair::isEmpty()**

&lt;?php
$a = new \Ds\Pair("a", 1);
$b = new \Ds\Pair();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Pair::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Pair::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    No debería ser necesario llamar a esto directamente.

# Ds\Pair::toArray

(PECL ds &gt;= 1.0.0)

Ds\Pair::toArray —
Convierte la pareja en un [array](#language.types.array)

### Descripción

public **Ds\Pair::toArray**(): [array](#language.types.array)

    Convierte la pareja en un [array](#language.types.array).

**Nota**:

        La conversión en [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que la pareja.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Pair::toArray()**

&lt;?php
$pair = new \Ds\Pair("a", 1);

var_dump($pair-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
["key"]=&gt;
string(1) "a"
["value"]=&gt;
int(1)
}

## Tabla de contenidos

- [Ds\Pair::clear](#ds-pair.clear) — Elimina todos los valores
- [Ds\Pair::\_\_construct](#ds-pair.construct) — Crear una nueva instancia
- [Ds\Pair::copy](#ds-pair.copy) — Devuelve una copia superficial del par
- [Ds\Pair::isEmpty](#ds-pair.isempty) — Indica si la pareja está vacía
- [Ds\Pair::jsonSerialize](#ds-pair.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Pair::toArray](#ds-pair.toarray) — Convierte la pareja en un array

# La clase Set

(PECL ds &gt;= 1.0.0)

## Introducción

    Un Set es una secuencia de valores únicos. Esta implementación utiliza la misma tabla de hash que
    [Ds\Map](#class.ds-map), donde los valores se utilizan como claves y el valor mapeado se ignora.







    ## Fortalezas





            - Los valores pueden ser de cualquier tipo, incluyendo objetos.

            - Soporte de la sintaxis de array (corchetes).

            - El orden de inserción se preserva.

            - Libera automáticamente la memoria asignada cuando su tamaño se vuelve suficientemente pequeño.

            -
                **add()**,
                **remove()** y
                **contains()** son todos de complejidad O(1).







    ## Debilidades





            - No soporta:
                **push()**,
                **pop()**,
                **insert()**,
                **shift()**, o
                **unshift()**.


            -
                **get()** es de complejidad O(n) si hay valores eliminados
                en el búfer antes del índice accedido, O(1) en caso contrario.




## Sinopsis de la Clase

    ****




      class **Ds\Set**


     implements
       [Ds\Collection](#class.ds-collection),  [ArrayAccess](#class.arrayaccess) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-set.constants.min-capacity) = 16;


    /* Métodos */

public [add](#ds-set.add)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [allocate](#ds-set.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [capacity](#ds-set.capacity)(): [int](#language.types.integer)
public [clear](#ds-set.clear)(): [void](language.types.void.html)
public [contains](#ds-set.contains)([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)
public [copy](#ds-set.copy)(): [Ds\Set](#class.ds-set)
public [diff](#ds-set.diff)([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)
public [filter](#ds-set.filter)([callable](#language.types.callable) $callback = ?): [Ds\Set](#class.ds-set)
public [first](#ds-set.first)(): [mixed](#language.types.mixed)
public [get](#ds-set.get)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [intersect](#ds-set.intersect)([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)
public [isEmpty](#ds-set.isempty)(): [bool](#language.types.boolean)
public [join](#ds-set.join)([string](#language.types.string) $glue = ?): [string](#language.types.string)
public [last](#ds-set.last)(): [mixed](#language.types.mixed)
public [map](#ds-set.map)([callable](#language.types.callable) $callback): [Ds\Set](#class.ds-set)
public [merge](#ds-set.merge)([mixed](#language.types.mixed) $values): [Ds\Set](#class.ds-set)
public [reduce](#ds-set.reduce)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)
public [remove](#ds-set.remove)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [reverse](#ds-set.reverse)(): [void](language.types.void.html)
public [reversed](#ds-set.reversed)(): [Ds\Set](#class.ds-set)
public [slice](#ds-set.slice)([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Set](#class.ds-set)
public [sort](#ds-set.sort)([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)
public [sorted](#ds-set.sorted)([callable](#language.types.callable) $comparator = ?): [Ds\Set](#class.ds-set)
public [sum](#ds-set.sum)(): [int](#language.types.integer)|[float](#language.types.float)
public [toArray](#ds-set.toarray)(): [array](#language.types.array)
public [union](#ds-set.union)([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)
public [xor](#ds-set.xor)([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)

}

## Constantes predefinidas

     **[Ds\Set::MIN_CAPACITY](#ds-set.constants.min-capacity)**






## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         Esta clase implementa ahora [ArrayAccess](#class.arrayaccess).




        PECL ds 1.2.7

         Se añadió el método [Ds\Set::map()](#ds-set.map).






# Ds\Set::add

(PECL ds &gt;= 1.0.0)

Ds\Set::add — Añade valores a la secuencia

### Descripción

public **Ds\Set::add**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade todos los valores dados al conjunto que no hayan sido ya añadidos.

**Nota**:

        Los valores de tipo [object](#language.types.object) son soportados.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

**Precaución**

        Todas las comparaciones son estrictas (tipo y valor).

### Parámetros

    values


        Los valores a añadir a la secuencia.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::add()** utilizando enteros

&lt;?php
$set = new \Ds\Set();

$set-&gt;add(1);
$set-&gt;add(1);
$set-&gt;add(2);
$set-&gt;add(3);

// Las comparaciones estrictas no tratarían estos valores de la misma manera que int(1)
$set-&gt;add("1");
$set-&gt;add(true);

var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#1 (5) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
string(1) "1"
[4]=&gt;
bool(true)
}

**Ejemplo #2 Ejemplo de Ds\Set::add()** utilizando objetos

&lt;?php
class HashableObject implements \Ds\Hashable
{
/\*\*
_ Un valor arbitrario a utilizar como valor de hash. No define la igualdad.
_/
private $value;

    public function __construct($value)
    {
        $this-&gt;value = $value;
    }

    public function hash()
    {
        return $this-&gt;value;
    }

    public function equals($obj): bool
    {
        return $this-&gt;value === $obj-&gt;value;
    }

}

$set = new \Ds\Set();

$obj = new \ArrayIterator([]);

// Añadir la misma instancia varias veces solo añadirá la primera.
$set-&gt;add($obj);
$set-&gt;add($obj);

// Añadir varias instancias del mismo objeto añadirá todas las instancias.
$set-&gt;add(new \stdClass());
$set-&gt;add(new \stdClass());

// Añadir varias instancias de objetos hashables iguales solo añadirá la primera.
$set-&gt;add(new \HashableObject(1));
$set-&gt;add(new \HashableObject(1));
$set-&gt;add(new \HashableObject(2));
$set-&gt;add(new \HashableObject(2));

var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#1 (5) {
[0]=&gt;
object(ArrayIterator)#2 (1) {
["storage":"ArrayIterator":private]=&gt;
array(0) {
}
}
[1]=&gt;
object(stdClass)#3 (0) {
}
[2]=&gt;
object(stdClass)#4 (0) {
}
[3]=&gt;
object(HashableObject)#5 (1) {
["value":"HashableObject":private]=&gt;
int(1)
}
[4]=&gt;
object(HashableObject)#6 (1) {
["value":"HashableObject":private]=&gt;
int(2)
}
}

# Ds\Set::allocate

(PECL ds &gt;= 1.0.0)

Ds\Set::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Set::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asigna suficiente memoria para una capacidad requerida.

### Parámetros

    capacity


        El número de valores para los cuales la capacidad debe ser asignada.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.




     **Nota**:



            La capacidad siempre será redondeada a la potencia de 2 más cercana.





### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::allocate()**

&lt;?php
$set = new \Ds\Set();
var_dump($set-&gt;capacity());

$set-&gt;allocate(100);
var_dump($set-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(16)
int(128)

# Ds\Set::capacity

(PECL ds &gt;= 1.0.0)

Ds\Set::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Set::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::capacity()**

&lt;?php
$set = new \Ds\Set();
var_dump($set-&gt;capacity());

$set-&gt;add(...range(1, 50));
var_dump($set-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(16)
int(64)

# Ds\Set::clear

(PECL ds &gt;= 1.0.0)

Ds\Set::clear — Elimina todos los valores

### Descripción

public **Ds\Set::clear**(): [void](language.types.void.html)

    Elimina todos los valores de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::clear()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);
print_r($set);

$set-&gt;clear();
print_r($set);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Set Object
(
)

# Ds\Set::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Set::\_\_construct — Crea una nueva instancia

### Descripción

public **Ds\Set::\_\_construct**([mixed](#language.types.mixed) $values = [])

    Crea una nueva instancia, utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los valores iniciales.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array) a utilizar para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::\_\_construct()**

&lt;?php
$set = new \Ds\Set();
var_dump($set);

$set = new \Ds\Set([1, 2, 3]);
var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#1 (0) {
}
object(Ds\Set)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Set::contains

(PECL ds &gt;= 1.0.0)

Ds\Set::contains — Determina si el conjunto contiene todos los valores

### Descripción

public **Ds\Set::contains**([mixed](#language.types.mixed) ...$values): [bool](#language.types.boolean)

    Determina si el conjunto contiene todos los valores.

**Nota**:

        Los valores de tipo [object](#language.types.object) son soportados.

        Si un objeto implementa [Ds\Hashable](#class.ds-hashable),
        la igualdad será determinada por la función equals del objeto.

        Si un objeto no implementa [Ds\Hashable](#class.ds-hashable),
        los objetos deben ser referencias a la misma instancia para ser considerados iguales.

**Precaución**

        Todas las comparaciones son estrictas (tipo y valor).

### Parámetros

    values


        Los valores a verificar.


### Valores devueltos

    **[false](#constant.false)** si uno de los valores proporcionados no está en
    la secuencia, de lo contrario **[true](#constant.true)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::contains()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

var_dump($set-&gt;contains(1));                // true
var_dump($set-&gt;contains(1, 2)); // true
var_dump($set-&gt;contains(...[1, 2])); // true

var_dump($set-&gt;contains("1"));              // false
var_dump($set-&gt;contains(...[1, 2, 3, 4])); // false

var_dump($set-&gt;contains(...[])); // true
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
bool(true)

# Ds\Set::copy

(PECL ds &gt;= 1.0.0)

Ds\Set::copy — Devuelve una copia superficial de la secuencia

### Descripción

public **Ds\Set::copy**(): [Ds\Set](#class.ds-set)

    Devuelve una copia superficial de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial de la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::copy()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = $a-&gt;copy();

// Cambiar la copia no afecta al original
$b-&gt;add(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Set Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
)

# Ds\Set::count

(PECL ds &gt;= 1.0.0)

Ds\Set::count — Devuelve el número de valores en la secuencia

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Set::diff

(PECL ds &gt;= 1.0.0)

Ds\Set::diff — Crear un nuevo conjunto utilizando valores que no están en otra secuencia

### Descripción

public **Ds\Set::diff**([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)

    Crear un nuevo conjunto utilizando valores que no están en otra secuencia.




    A \ B = {x ∈ A | x ∉ B}

### Parámetros

    set


        El conjunto que contiene los valores a excluir.


### Valores devueltos

    Un nuevo conjunto que contiene todos los valores que no estaban en el otro set.

### Ver también

    - [» Complemento](https://en.wikipedia.org/wiki/Complement_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::diff()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = new \Ds\Set([3, 4, 5]);

var_dump($a-&gt;diff($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (2) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
}

# Ds\Set::filter

(PECL ds &gt;= 1.0.0)

Ds\Set::filter —
Crear un nuevo conjunto utilizando un [callable](#language.types.callable)
para determinar qué valores incluir

### Descripción

public **Ds\Set::filter**([callable](#language.types.callable) $callback = ?): [Ds\Set](#class.ds-set)

    Crear un nuevo conjunto utilizando un [callable](#language.types.callable) para
    determinar qué valores incluir.

### Parámetros

    callback





                callback([mixed](#language.types.mixed) $value): [bool](#language.types.boolean)



            Un [callable](#language.types.callable) opcional que devuelve **[true](#constant.true)** si el par debe ser incluido, **[false](#constant.false)** en caso contrario.




            Si no se proporciona ninguna función de retrollamada, solo se incluirán los valores que son **[true](#constant.true)**
            (ver [conversión en booléen](#language.types.boolean.casting)).


### Valores devueltos

    Un nuevo conjunto que contiene todos los pares para los cuales
    el callback ha devuelto **[true](#constant.true)**, o todos los valores que
    se convierten en **[true](#constant.true)** si no se ha proporcionado un callback.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::filter()** utilizando una función de retrollamada

&lt;?php
$set = new \Ds\Set([1, 2, 3, 4, 5]);

var_dump($set-&gt;filter(function($value) {
return $value % 2 == 0;
}));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (2) {
[0]=&gt;
int(2)
[1]=&gt;
int(4)
}

**Ejemplo #2 Ejemplo de Ds\Set::filter()** sin función de retrollamada

&lt;?php
$set = new \Ds\Set([0, 1, 'a', true, false]);

var_dump($set-&gt;filter());
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
string(1) "a"
[2]=&gt;
bool(true)
}

# Ds\Set::first

(PECL ds &gt;= 1.0.0)

Ds\Set::first — Devuelve el primer valor de la secuencia

### Descripción

public **Ds\Set::first**(): [mixed](#language.types.mixed)

    Devuelve el primer valor de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El primer valor de la secuencia.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::first()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);
var_dump($set-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

# Ds\Set::get

(PECL ds &gt;= 1.0.0)

Ds\Set::get — Devuelve el valor en un índice dado

### Descripción

public **Ds\Set::get**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

    Devuelve el valor en un índice dado.

### Parámetros

    index


        El índice al que se accede, comenzando en 0.


### Valores devueltos

    El valor en el índice solicitado.

### Errores/Excepciones

[OutOfRangeException](#class.outofrangeexception) si el índice es inválido.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::get()**

&lt;?php
$set = new \Ds\Set(["a", "b", "c"]);

var_dump($set-&gt;get(0));
var_dump($set-&gt;get(1));
var_dump($set-&gt;get(2));
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

**Ejemplo #2 Ejemplo de Ds\Set::get()** utilizando la sintaxis de array

&lt;?php
$set = new \Ds\Set(["a", "b", "c"]);

var_dump($set[0]);
var_dump($set[1]);
var_dump($set[2]);
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Set::intersect

(PECL ds &gt;= 1.0.0)

Ds\Set::intersect — Crear un nuevo conjunto utilizando valores comunes con otra secuencia

### Descripción

public **Ds\Set::intersect**([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)

    Crear un nuevo conjunto utilizando valores comunes con otro set.

    En otras palabras, devuelve una copia de la instancia actual con todos los valores eliminados
    que no están en el otro set.




    A ∩ B = {x : x ∈ A ∧ x ∈ B}

### Parámetros

    set


        La otra secuencia.


### Valores devueltos

     La intersección de la instancia actual y otro set.

### Ver también

    - [» Intersection](https://en.wikipedia.org/wiki/Intersection_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::intersect()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = new \Ds\Set([3, 4, 5]);

var_dump($a-&gt;intersect($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (1) {
[0]=&gt;
int(3)
}

# Ds\Set::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Set::isEmpty — Indica si el conjunto está vacío

### Descripción

public **Ds\Set::isEmpty**(): [bool](#language.types.boolean)

    Indica si el conjunto está vacío.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si el conjunto está vacío, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::isEmpty()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = new \Ds\Set();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Set::join

(PECL ds &gt;= 1.0.0)

Ds\Set::join — Reúne todos los valores en un string

### Descripción

public **Ds\Set::join**([string](#language.types.string) $glue = ?): [string](#language.types.string)

    Reúne todos los valores en un string utilizando un separador opcional entre cada valor.

### Parámetros

    glue


        Un string opcional para separar cada valor.


### Valores devueltos

    Todos los valores del conjunto reunidos en un string.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::join()** con un string separador

&lt;?php
$set = new \Ds\Set(["a", "b", "c", 1, 2, 3]);

var_dump($set-&gt;join("|"));
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "a|b|c|1|2|3"

**Ejemplo #2 Ejemplo de Ds\Set::join()** sin un string separador

&lt;?php
$set = new \Ds\Set(["a", "b", "c", 1, 2, 3]);

var_dump($set-&gt;join());
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "abc123"

# Ds\Set::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Set::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    No debería ser necesario llamar a esto directamente.

# Ds\Set::last

(PECL ds &gt;= 1.0.0)

Ds\Set::last — Devuelve el último valor de la secuencia

### Descripción

public **Ds\Set::last**(): [mixed](#language.types.mixed)

    Devuelve el último valor de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El último valor de la secuencia.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::last()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);
var_dump($set-&gt;last());
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)

# Ds\Set::map

(PECL ds &gt;= 1.2.7)

Ds\Set::map — Devuelve el resultado de la aplicación de una retrollamada a cada valor

### Descripción

public **Ds\Set::map**([callable](#language.types.callable) $callback): [Ds\Set](#class.ds-set)

Devuelve el resultado de la aplicación de una retrollamada a
cada valor del conjunto.

### Parámetros

    callback


      La retrollamada a aplicar a cada valor del conjunto debe tener la siguiente firma:


callback([mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

### Valores devueltos

Devuelve un nuevo objeto [Ds\Set](#class.ds-set) donde cada valor
es el resultado de la aplicación de la retrollamada a cada valor
del conjunto.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::map()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

var_dump($set-&gt;map(function($value) { return $value * 2; }));
var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (3) {
[0]=&gt;
int(2)
[1]=&gt;
int(4)
[2]=&gt;
int(6)
}
object(Ds\Set)#1 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Set::merge

(PECL ds &gt;= 1.0.3)

Ds\Set::merge — Devuelve el resultado de la adición de todos los valores de la secuencia

### Descripción

public **Ds\Set::merge**([mixed](#language.types.mixed) $values): [Ds\Set](#class.ds-set)

    Devuelve el resultado de la adición de todos los valores de la secuencia.

### Parámetros

    values


        Un objeto [traversable](#class.traversable) o un [array](#language.types.array).


### Valores devueltos

    El resultado de la adición de todos los valores dados a la secuencia,
    efectivamente el mismo que añadir los valores a una copia, y luego devolver esta copia.

**Nota**:

        La instancia actual no será afectada.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::merge()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

var_dump($set-&gt;merge([3, 4, 5]));
var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#2 (6) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
int(4)
[4]=&gt;
int(5)
}
object(Ds\Set)#1 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Set::reduce

(PECL ds &gt;= 1.0.0)

Ds\Set::reduce — Reduce el conjunto a un solo valor utilizando una función de retrollamada

### Descripción

public **Ds\Set::reduce**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $initial = ?): [mixed](#language.types.mixed)

    Reduce el conjunto a un solo valor utilizando una función de retrollamada.

### Parámetros

    callback


      callback([mixed](#language.types.mixed) $carry, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)



        carry


          El valor de retorno de la retrollamada anterior, o initial si
          es la primera iteración.






        value


          El valor de la iteración actual.










    initial


        El valor inicial del valor de retorno. Puede ser **[null](#constant.null)**.


### Valores devueltos

    El valor de retorno de la retrollamada final.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::reduce()** con valor inicial

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

$callback = function($carry, $value) {
return $carry \* $value;
};

var_dump($set-&gt;reduce($callback, 5));

// Iteraciones:
//
// $carry = $initial = 5
//
// $carry = $carry _ 1 = 5
// $carry = $carry _ 2 = 10
// $carry = $carry \* 3 = 30
?&gt;

Resultado del ejemplo anterior es similar a:

int(30)

**Ejemplo #2 Ejemplo de Ds\Set::reduce()** sin valor inicial

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

var_dump($set-&gt;reduce(function($carry, $value) {
return $carry + $value + 5;
}));

// Iteraciones:
//
// $carry = $initial = null
//
// $carry = $carry + 1 + 5 = 6
// $carry = $carry + 2 + 5 = 13
// $carry = $carry + 3 + 5 = 21
?&gt;

Resultado del ejemplo anterior es similar a:

int(21)

# Ds\Set::remove

(PECL ds &gt;= 1.0.0)

Ds\Set::remove — Elimina todos los valores dados de la secuencia

### Descripción

public **Ds\Set::remove**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Elimina todos los values dados de la secuencia, ignorando aquellos que no están en la secuencia.

### Parámetros

    values


        Los valores a eliminar.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::remove()**

&lt;?php
$set = new \Ds\Set([1, 2, 3, 4, 5]);

$set-&gt;remove(1);            // Elimina 1
$set-&gt;remove(1, 2); // No encuentra 1, pero elimina 2
$set-&gt;remove(...[3, 4]); // Elimina 3 y 4

var_dump($set);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#1 (1) {
[0]=&gt;
int(5)
}

# Ds\Set::reverse

(PECL ds &gt;= 1.0.0)

Ds\Set::reverse —
Invierte el conjunto en su lugar

### Descripción

public **Ds\Set::reverse**(): [void](language.types.void.html)

    Invierte el conjunto en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::reverse()**

&lt;?php
$set = new \Ds\Set(["a", "b", "c"]);
$set-&gt;reverse();

print_r($set);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)

# Ds\Set::reversed

(PECL ds &gt;= 1.0.0)

Ds\Set::reversed — Devuelve una copia invertida

### Descripción

public **Ds\Set::reversed**(): [Ds\Set](#class.ds-set)

    Devuelve una copia invertida de la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Una copia invertida de la secuencia.

**Nota**:

            La instancia actual no se ve afectada.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::reversed()**

&lt;?php
$set = new \Ds\Set(["a", "b", "c"]);

print_r($set-&gt;reversed());
print_r($set);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; c
[1] =&gt; b
[2] =&gt; a
)
Ds\Set Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
)

# Ds\Set::slice

(PECL ds &gt;= 1.0.0)

Ds\Set::slice —
Devuelve un subconjunto de un rango dado

### Descripción

public **Ds\Set::slice**([int](#language.types.integer) $index, [int](#language.types.integer) $length = ?): [Ds\Set](#class.ds-set)

    Crea un subconjunto de un rango dado.

### Parámetros

    index


            El índice en el que comienza la subsecuencia.




            Si es positivo, la subsecuencia comenzará en este índice en la secuencia.
            Si es negativo, la subsecuencia comenzará a esta distancia del final.






    length


        Si se proporciona una longitud y es positiva, la subsecuencia resultante
        tendrá hasta tantos valores.

        Si la longitud provoca un desbordamiento, solo
        los valores hasta el final del conjunto serán incluidos.

        Si se proporciona una longitud y es negativa, la subsecuencia
        se detendrá a tantos valores del final.

        Si no se proporciona una longitud, la subsecuencia
        contendrá todos los valores entre el índice y el
        final de la secuencia.


### Valores devueltos

    Un subconjunto del conjunto dado.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::slice()**

&lt;?php
$set = new \Ds\Set(["a", "b", "c", "d", "e"]);

// Corte a partir de 2
print_r($set-&gt;slice(2));

// Corte a partir de 1, para una longitud de 3
print_r($set-&gt;slice(1, 3));

// Corte a partir de 1 en adelante
print_r($set-&gt;slice(1));

// Corte a partir de 2 hacia atrás
print_r($set-&gt;slice(-2));

// Corte de 1 a 1 del final
print_r($set-&gt;slice(1, -1));
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; c
[1] =&gt; d
[2] =&gt; e
)
Ds\Set Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)
Ds\Set Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
[3] =&gt; e
)
Ds\Set Object
(
[0] =&gt; d
[1] =&gt; e
)
Ds\Set Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; d
)

# Ds\Set::sort

(PECL ds &gt;= 1.0.0)

Ds\Set::sort —
Ordena el conjunto en el lugar

### Descripción

public **Ds\Set::sort**([callable](#language.types.callable) $comparator = ?): [void](language.types.void.html)

    Ordena el conjunto en el lugar, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::sort()**

&lt;?php
$set = new \Ds\Set([4, 5, 1, 3, 2]);
$set-&gt;sort();

print_r($set);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Set::sort()**

&lt;?php
$set = new \Ds\Set([4, 5, 1, 3, 2]);

$set-&gt;sort(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($set);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Set::sorted

(PECL ds &gt;= 1.0.0)

Ds\Set::sorted — Devuelve una copia ordenada

### Descripción

public **Ds\Set::sorted**([callable](#language.types.callable) $comparator = ?): [Ds\Set](#class.ds-set)

    Devuelve una copia ordenada de la secuencia, utilizando una función comparator opcional.

### Parámetros

     comparator



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

    Devuelve una copia ordenada de la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::sorted()**

&lt;?php
$set = new \Ds\Set([4, 5, 1, 3, 2]);

print_r($set-&gt;sorted());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
)

**Ejemplo #2 Ejemplo de Ds\Set::sorted()** utilizando un comparador

&lt;?php
$set = new \Ds\Set([4, 5, 1, 3, 2]);

$sorted = $set-&gt;sorted(function($a, $b) {
return $b &lt;=&gt; $a;
});

print_r($sorted);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Set Object
(
[0] =&gt; 5
[1] =&gt; 4
[2] =&gt; 3
[3] =&gt; 2
[4] =&gt; 1
)

# Ds\Set::sum

(PECL ds &gt;= 1.0.0)

Ds\Set::sum — Devuelve la suma de todos los valores de la secuencia

### Descripción

public **Ds\Set::sum**(): [int](#language.types.integer)|[float](#language.types.float)

    Devuelve la suma de todos los valores de la secuencia.

**Nota**:

        Los arrays y los objetos se consideran iguales a cero durante el cálculo de la suma.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La suma de todos los valores del conjunto como [float](#language.types.float) o [int](#language.types.integer)
    dependiendo de los valores de la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::sum()** con un entero

&lt;?php
$set = new \Ds\Set([1, 2, 3]);
var_dump($set-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

int(6)

**Ejemplo #2 Ejemplo de Ds\Set::sum()** con un número de punto flotante

&lt;?php
$set = new \Ds\Set([1, 2.5, 3]);
var_dump($set-&gt;sum());
?&gt;

Resultado del ejemplo anterior es similar a:

float(6.5)

# Ds\Set::toArray

(PECL ds &gt;= 1.0.0)

Ds\Set::toArray —
Convierte el conjunto en un [array](#language.types.array)

### Descripción

public **Ds\Set::toArray**(): [array](#language.types.array)

    Convierte el conjunto en un [array](#language.types.array).

**Nota**:

        La conversión en un [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que la secuencia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::toArray()**

&lt;?php
$set = new \Ds\Set([1, 2, 3]);

var_dump($set-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Set::union

(PECL ds &gt;= 1.0.0)

Ds\Set::union — Crear un nuevo conjunto utilizando los valores de la instancia actual y de otro conjunto

### Descripción

public **Ds\Set::union**([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)

    Crear un nuevo conjunto que contiene los valores de la instancia actual así
    como los valores de otro set.




    A ∪ B = {x: x ∈ A ∨ x ∈ B}

### Parámetros

    set


        El otro conjunto, a combinar con la instancia actual.


### Valores devueltos

     Un nuevo conjunto que contiene todos los valores de la instancia actual así como de otro set.

### Ver también

    - [» Union](https://en.wikipedia.org/wiki/Union_(set_theory)) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::union()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = new \Ds\Set([3, 4, 5]);

var_dump($a-&gt;union($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (5) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
[3]=&gt;
int(4)
[4]=&gt;
int(5)
}

# Ds\Set::xor

(PECL ds &gt;= 1.0.0)

Ds\Set::xor — Crear un nuevo conjunto utilizando los valores de la instancia actual o de otro conjunto, pero no de ambos

### Descripción

public **Ds\Set::xor**([Ds\Set](#class.ds-set) $set): [Ds\Set](#class.ds-set)

    Crear un nuevo conjunto que contiene los valores de la instancia actual
    o de otro set,




    A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

### Parámetros

    set


        El otro conjunto.


### Valores devueltos

        Un nuevo conjunto que contiene los valores de la instancia actual o de otro set,
        pero no de ambos.

### Ver también

    - [» Diferencia simétrica](https://en.wikipedia.org/wiki/Symmetric_difference) en Wikipedia

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Set::xor()**

&lt;?php
$a = new \Ds\Set([1, 2, 3]);
$b = new \Ds\Set([3, 4, 5]);

var_dump($a-&gt;xor($b));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Set)#3 (4) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(4)
[3]=&gt;
int(5)
}

## Tabla de contenidos

- [Ds\Set::add](#ds-set.add) — Añade valores a la secuencia
- [Ds\Set::allocate](#ds-set.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Set::capacity](#ds-set.capacity) — Devuelve la capacidad actual
- [Ds\Set::clear](#ds-set.clear) — Elimina todos los valores
- [Ds\Set::\_\_construct](#ds-set.construct) — Crea una nueva instancia
- [Ds\Set::contains](#ds-set.contains) — Determina si el conjunto contiene todos los valores
- [Ds\Set::copy](#ds-set.copy) — Devuelve una copia superficial de la secuencia
- [Ds\Set::count](#ds-set.count) — Devuelve el número de valores en la secuencia
- [Ds\Set::diff](#ds-set.diff) — Crear un nuevo conjunto utilizando valores que no están en otra secuencia
- [Ds\Set::filter](#ds-set.filter) — Crear un nuevo conjunto utilizando un callable
  para determinar qué valores incluir
- [Ds\Set::first](#ds-set.first) — Devuelve el primer valor de la secuencia
- [Ds\Set::get](#ds-set.get) — Devuelve el valor en un índice dado
- [Ds\Set::intersect](#ds-set.intersect) — Crear un nuevo conjunto utilizando valores comunes con otra secuencia
- [Ds\Set::isEmpty](#ds-set.isempty) — Indica si el conjunto está vacío
- [Ds\Set::join](#ds-set.join) — Reúne todos los valores en un string
- [Ds\Set::jsonSerialize](#ds-set.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Set::last](#ds-set.last) — Devuelve el último valor de la secuencia
- [Ds\Set::map](#ds-set.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Set::merge](#ds-set.merge) — Devuelve el resultado de la adición de todos los valores de la secuencia
- [Ds\Set::reduce](#ds-set.reduce) — Reduce el conjunto a un solo valor utilizando una función de retrollamada
- [Ds\Set::remove](#ds-set.remove) — Elimina todos los valores dados de la secuencia
- [Ds\Set::reverse](#ds-set.reverse) — Invierte el conjunto en su lugar
- [Ds\Set::reversed](#ds-set.reversed) — Devuelve una copia invertida
- [Ds\Set::slice](#ds-set.slice) — Devuelve un subconjunto de un rango dado
- [Ds\Set::sort](#ds-set.sort) — Ordena el conjunto en el lugar
- [Ds\Set::sorted](#ds-set.sorted) — Devuelve una copia ordenada
- [Ds\Set::sum](#ds-set.sum) — Devuelve la suma de todos los valores de la secuencia
- [Ds\Set::toArray](#ds-set.toarray) — Convierte el conjunto en un array
- [Ds\Set::union](#ds-set.union) — Crear un nuevo conjunto utilizando los valores de la instancia actual y de otro conjunto
- [Ds\Set::xor](#ds-set.xor) — Crear un nuevo conjunto utilizando los valores de la instancia actual o de otro conjunto, pero no de ambos

# La clase Stack

(PECL ds &gt;= 1.0.0)

## Introducción

    Una Stack es una colección "último en entrar, primero en salir" o "LIFO" que
    solo permite el acceso al valor en la parte superior de la estructura e itera en este
    orden, de manera destructiva.




    Utiliza un [Ds\Vector](#class.ds-vector) internamente.

## Sinopsis de la Clase

    ****




      class **Ds\Stack**


     implements
       [Ds\Collection](#class.ds-collection),  [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [allocate](#ds-stack.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [capacity](#ds-stack.capacity)(): [int](#language.types.integer)
public [clear](#ds-stack.clear)(): [void](language.types.void.html)
public [copy](#ds-stack.copy)(): [Ds\Stack](#class.ds-stack)
public [isEmpty](#ds-stack.isempty)(): [bool](#language.types.boolean)
public [peek](#ds-stack.peek)(): [mixed](#language.types.mixed)
public [pop](#ds-stack.pop)(): [mixed](#language.types.mixed)
public [push](#ds-stack.push)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [toArray](#ds-stack.toarray)(): [array](#language.types.array)

}

## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         Esta clase ahora implementa [ArrayAccess](#class.arrayaccess).






# Ds\Stack::allocate

(PECL ds &gt;= 1.0.0)

Ds\Stack::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Stack::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.


### Valores devueltos

    No se retorna ningún valor.

# Ds\Stack::capacity

(PECL ds &gt;= 1.0.0)

Ds\Stack::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Stack::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

# Ds\Stack::clear

(PECL ds &gt;= 1.0.0)

Ds\Stack::clear — Elimina todos los valores

### Descripción

public **Ds\Stack::clear**(): [void](language.types.void.html)

    Elimina todos los valores de la pila.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::clear()**

&lt;?php
$stack = new \Ds\Stack([1, 2, 3]);
print_r($stack);

$stack-&gt;clear();
print_r($stack);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Stack Object
(
[0] =&gt; 3
[1] =&gt; 2
[2] =&gt; 1
)
Ds\Stack Object
(
)

# Ds\Stack::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Stack::\_\_construct — Crear una nueva instancia

### Descripción

public **Ds\Stack::\_\_construct**([mixed](#language.types.mixed) $values = ?)

    Crear una nueva instancia, utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los values iniciales.

### Parámetros

    values


      Un objeto [traversable](#class.traversable) o un [array](#language.types.array) a utilizar para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::\_\_construct()**

&lt;?php
$stack = new \Ds\Stack();
print_r($stack);

$stack = new \Ds\Stack([1, 2, 3]);
print_r($stack);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Stack Object
(
)
Ds\Stack Object
(
[0] =&gt; 3
[1] =&gt; 2
[2] =&gt; 1
)

# Ds\Stack::copy

(PECL ds &gt;= 1.0.0)

Ds\Stack::copy — Devuelve una copia superficial de la pila

### Descripción

public **Ds\Stack::copy**(): [Ds\Stack](#class.ds-stack)

    Devuelve una copia superficial de la pila.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial de la pila.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::copy()**

&lt;?php
$a = new \Ds\Stack([1, 2, 3]);
$b = $a-&gt;copy();

// Cambiar la copia no afecta al original
$b-&gt;push(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Stack Object
(
[0] =&gt; 3
[1] =&gt; 2
[2] =&gt; 1
)
Ds\Stack Object
(
[0] =&gt; 4
[1] =&gt; 3
[2] =&gt; 2
[3] =&gt; 1
)

# Ds\Stack::count

(PECL ds &gt;= 1.0.0)

Ds\Stack::count — Devuelve el número de valores en la pila

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Stack::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Stack::isEmpty — Indica si la pila está vacía

### Descripción

public **Ds\Stack::isEmpty**(): [bool](#language.types.boolean)

    Indica si la pila está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la pila está vacía, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::isEmpty()**

&lt;?php
$a = new \Ds\Stack([1, 2, 3]);
$b = new \Ds\Stack();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Stack::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Stack::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    No debería ser necesario llamar a esto directamente.

# Ds\Stack::peek

(PECL ds &gt;= 1.0.0)

Ds\Stack::peek — Devuelve el valor en la parte superior de la pila

### Descripción

public **Ds\Stack::peek**(): [mixed](#language.types.mixed)

    Devuelve el valor en la parte superior de la pila, pero no lo elimina.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El valor en la parte superior de la pila.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacía.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::peek()**

&lt;?php
$stack = new \Ds\Stack();

$stack-&gt;push("a");
$stack-&gt;push("b");
$stack-&gt;push("c");

var_dump($stack-&gt;peek());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "c"

# Ds\Stack::pop

(PECL ds &gt;= 1.0.0)

Ds\Stack::pop — Elimina y devuelve el valor en la parte superior de la pila

### Descripción

public **Ds\Stack::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el valor en la parte superior de la pila.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El valor eliminado que estaba en la parte superior de la pila.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::pop()**

&lt;?php
$stack = new \Ds\Stack();

$stack-&gt;push("a");
$stack-&gt;push("b");
$stack-&gt;push("c");

var_dump($stack-&gt;pop());
var_dump($stack-&gt;pop());
var_dump($stack-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "c"
string(1) "b"
string(1) "a"

# Ds\Stack::push

(PECL ds &gt;= 1.0.0)

Ds\Stack::push — Añade valores a la pila

### Descripción

public **Ds\Stack::push**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade los values a la pila.

### Parámetros

    values


        Los valores a añadir a la pila.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::push()**

&lt;?php
$stack = new \Ds\Stack();

$stack-&gt;push("a");
$stack-&gt;push("b");
$stack-&gt;push("c", "d");
$stack-&gt;push(...["e", "f"]);

print_r($stack);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Stack Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
[4] =&gt; e
[5] =&gt; f
)

# Ds\Stack::toArray

(PECL ds &gt;= 1.0.0)

Ds\Stack::toArray —
Convierte la pila en un [array](#language.types.array)

### Descripción

public **Ds\Stack::toArray**(): [array](#language.types.array)

    Convierte la pila en un [array](#language.types.array).

**Nota**:

        La conversión en [array](#language.types.array) no está aún soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que la pila.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Stack::toArray()**

&lt;?php
$stack = new \Ds\Stack([1, 2, 3]);

var_dump($stack-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(3)
[1]=&gt;
int(2)
[2]=&gt;
int(1)
}

## Tabla de contenidos

- [Ds\Stack::allocate](#ds-stack.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Stack::capacity](#ds-stack.capacity) — Devuelve la capacidad actual
- [Ds\Stack::clear](#ds-stack.clear) — Elimina todos los valores
- [Ds\Stack::\_\_construct](#ds-stack.construct) — Crear una nueva instancia
- [Ds\Stack::copy](#ds-stack.copy) — Devuelve una copia superficial de la pila
- [Ds\Stack::count](#ds-stack.count) — Devuelve el número de valores en la pila
- [Ds\Stack::isEmpty](#ds-stack.isempty) — Indica si la pila está vacía
- [Ds\Stack::jsonSerialize](#ds-stack.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Stack::peek](#ds-stack.peek) — Devuelve el valor en la parte superior de la pila
- [Ds\Stack::pop](#ds-stack.pop) — Elimina y devuelve el valor en la parte superior de la pila
- [Ds\Stack::push](#ds-stack.push) — Añade valores a la pila
- [Ds\Stack::toArray](#ds-stack.toarray) — Convierte la pila en un array

# La clase Queue

(PECL ds &gt;= 1.0.0)

## Introducción

    Una Queue es una colección "primero en entrar, primero en salir" o "FIFO" que
    solo permite el acceso al valor en la cabeza de la cola e itera en este orden,
    de manera destructiva.

## Sinopsis de la Clase

    ****




      class **Ds\Queue**


     implements
       [Ds\Collection](#class.ds-collection),  [ArrayAccess](#class.arrayaccess) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-queue.constants.min-capacity) = 8;


    /* Métodos */

public [allocate](#ds-queue.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [capacity](#ds-queue.capacity)(): [int](#language.types.integer)
public [clear](#ds-queue.clear)(): [void](language.types.void.html)
public [copy](#ds-queue.copy)(): [Ds\Queue](#class.ds-queue)
public [isEmpty](#ds-queue.isempty)(): [bool](#language.types.boolean)
public [peek](#ds-queue.peek)(): [mixed](#language.types.mixed)
public [pop](#ds-queue.pop)(): [mixed](#language.types.mixed)
public [push](#ds-queue.push)([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)
public [toArray](#ds-queue.toarray)(): [array](#language.types.array)

}

## Constantes predefinidas

     **[Ds\Queue::MIN_CAPACITY](#ds-queue.constants.min-capacity)**






## Historial de cambios

        Versión
        Descripción






        PECL ds 1.3.0

         Esta clase implementa ahora [ArrayAccess](#class.arrayaccess).






# Ds\Queue::allocate

(PECL ds &gt;= 1.0.0)

Ds\Queue::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\Queue::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

**Nota**:

        La capacidad siempre se redondeará a la potencia de 2 más cercana.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.




    **Nota**:



            La capacidad siempre se redondeará a la potencia de 2 más cercana.





### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::allocate()**

&lt;?php
$queue = new \Ds\Queue();
var_dump($queue-&gt;capacity());

$queue-&gt;allocate(100);
var_dump($queue-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)
int(128)

# Ds\Queue::capacity

(PECL ds &gt;= 1.0.0)

Ds\Queue::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\Queue::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::capacity()**

&lt;?php
$queue = new \Ds\Queue();
var_dump($queue-&gt;capacity());

$queue-&gt;push(...range(1, 50));
var_dump($queue-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)
int(64)

# Ds\Queue::clear

(PECL ds &gt;= 1.0.0)

Ds\Queue::clear — Elimina todos los valores

### Descripción

public **Ds\Queue::clear**(): [void](language.types.void.html)

    Elimina todos los valores de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::clear()**

&lt;?php
$queue = new \Ds\Queue([1, 2, 3]);
print_r($queue);

$queue-&gt;clear();
print_r($queue);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Queue Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Queue Object
(
)

# Ds\Queue::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\Queue::\_\_construct — Crear una nueva instancia

### Descripción

public **Ds\Queue::\_\_construct**([mixed](#language.types.mixed) $values = ?)

    Crear una nueva instancia utilizando un objeto [traversable](#class.traversable)
    o un [array](#language.types.array) para los values iniciales.

### Parámetros

    values


      Un objeto [traversable](#class.traversable) o un [array](#language.types.array) para los valores iniciales.


### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::\_\_construct()**

&lt;?php
$queue = new \Ds\Queue();
var_dump($queue);

$queue = new \Ds\Queue([1, 2, 3]);
var_dump($queue);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\Queue)#2 (0) {
}
object(Ds\Queue)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# Ds\Queue::copy

(PECL ds &gt;= 1.0.0)

Ds\Queue::copy — Devuelve una copia superficial de la cola

### Descripción

public **Ds\Queue::copy**(): [Ds\Queue](#class.ds-queue)

    Devuelve una copia superficial de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial de la cola.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::copy()**

&lt;?php
$a = new \Ds\Queue([1, 2, 3]);
$b = $a-&gt;copy();

// Cambiar la copia no afecta al original
$b-&gt;push(4);

print_r($a);
print_r($b);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Queue Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
)
Ds\Queue Object
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
)

# Ds\Queue::count

(PECL ds &gt;= 1.0.0)

Ds\Queue::count — Devuelve el número de valores en la cola

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\Queue::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\Queue::isEmpty — Indica si la cola está vacía

### Descripción

public **Ds\Queue::isEmpty**(): [bool](#language.types.boolean)

    Indica si la cola está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la cola está vacía, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::isEmpty()**

&lt;?php
$a = new \Ds\Queue([1, 2, 3]);
$b = new \Ds\Queue();

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\Queue::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\Queue::jsonSerialize — Regresa una representacion que puede ser convertida a JSON

### Descripción

Veáse [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    Nunca debería necesitar llamar esta función directamente.

# Ds\Queue::peek

(PECL ds &gt;= 1.0.0)

Ds\Queue::peek — Devuelve el valor al frente de la cola

### Descripción

public **Ds\Queue::peek**(): [mixed](#language.types.mixed)

    Devuelve el valor al frente de la cola, pero no lo elimina.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el valor al frente de la cola.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacía.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::peek()**

&lt;?php
$queue = new \Ds\Queue();

$queue-&gt;push("a");
$queue-&gt;push("b");
$queue-&gt;push("c");

var_dump($queue-&gt;peek());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"

# Ds\Queue::pop

(PECL ds &gt;= 1.0.0)

Ds\Queue::pop — Elimina y devuelve el valor al frente de la cola

### Descripción

public **Ds\Queue::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el valor al frente de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El valor eliminado que estaba al frente de la cola.

### Errores/Excepciones

[UnderflowException](#class.underflowexception).

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::pop()**

&lt;?php
$queue = new \Ds\Queue();

$queue-&gt;push("a");
$queue-&gt;push("b");
$queue-&gt;push("c");

var_dump($queue-&gt;pop());
var_dump($queue-&gt;pop());
var_dump($queue-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\Queue::push

(PECL ds &gt;= 1.0.0)

Ds\Queue::push — Añade un elemento a la cola

### Descripción

public **Ds\Queue::push**([mixed](#language.types.mixed) ...$values): [void](language.types.void.html)

    Añade valores en la cola.

### Parámetros

    values


        Los valores a añadir a la cola.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::push()**

&lt;?php
$queue = new \Ds\Queue();

$queue-&gt;push("a");
$queue-&gt;push("b");
$queue-&gt;push("c", "d");
$queue-&gt;push(...["e", "f"]);

print_r($queue);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\Queue Object
(
[0] =&gt; a
[1] =&gt; b
[2] =&gt; c
[3] =&gt; d
[4] =&gt; e
[5] =&gt; f
)

# Ds\Queue::toArray

(PECL ds &gt;= 1.0.0)

Ds\Queue::toArray —
Convierte la cola en un [array](#language.types.array)

### Descripción

public **Ds\Queue::toArray**(): [array](#language.types.array)

    Convierte la cola en un [array](#language.types.array).

**Nota**:

     Un casting a un [array](#language.types.array) no se soporta todavía.

**Nota**:

        Este método no es destructivo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) conteniendo todos los elementos en el mismo orden que la cola.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\Queue::toArray()**

&lt;?php
$queue = new \Ds\Queue([1, 2, 3]);

var_dump($queue-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

## Tabla de contenidos

- [Ds\Queue::allocate](#ds-queue.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Queue::capacity](#ds-queue.capacity) — Devuelve la capacidad actual
- [Ds\Queue::clear](#ds-queue.clear) — Elimina todos los valores
- [Ds\Queue::\_\_construct](#ds-queue.construct) — Crear una nueva instancia
- [Ds\Queue::copy](#ds-queue.copy) — Devuelve una copia superficial de la cola
- [Ds\Queue::count](#ds-queue.count) — Devuelve el número de valores en la cola
- [Ds\Queue::isEmpty](#ds-queue.isempty) — Indica si la cola está vacía
- [Ds\Queue::jsonSerialize](#ds-queue.jsonserialize) — Regresa una representacion que puede ser convertida a JSON
- [Ds\Queue::peek](#ds-queue.peek) — Devuelve el valor al frente de la cola
- [Ds\Queue::pop](#ds-queue.pop) — Elimina y devuelve el valor al frente de la cola
- [Ds\Queue::push](#ds-queue.push) — Añade un elemento a la cola
- [Ds\Queue::toArray](#ds-queue.toarray) — Convierte la cola en un array

# La clase PriorityQueue

(PECL ds &gt;= 1.0.0)

## Introducción

    Una PriorityQueue es muy similar a una Queue. Los valores son empujados en la cola
    con una prioridad asignada, y el valor con la prioridad más alta estará
    siempre en la cabeza de la cola.




     Implementado utilizando un montículo máximo.

**Nota**:

            "Primero en entrar, primero en salir" se preserva para los valores con la misma prioridad.


**Nota**:

            Iterar sobre una PriorityQueue es destructivo, equivalente a operaciones de desapilamiento sucesivas hasta que la cola esté vacía.


## Sinopsis de la Clase

    ****




      class **Ds\PriorityQueue**


     implements
       [Ds\Collection](#class.ds-collection) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MIN_CAPACITY](#ds-priorityqueue.constants.min-capacity) = 8;


    /* Métodos */

public [allocate](#ds-priorityqueue.allocate)([int](#language.types.integer) $capacity): [void](language.types.void.html)
public [capacity](#ds-priorityqueue.capacity)(): [int](#language.types.integer)
public [clear](#ds-priorityqueue.clear)(): [void](language.types.void.html)
public [copy](#ds-priorityqueue.copy)(): [Ds\PriorityQueue](#class.ds-priorityqueue)
public [isEmpty](#ds-priorityqueue.isempty)(): [bool](#language.types.boolean)
public [peek](#ds-priorityqueue.peek)(): [mixed](#language.types.mixed)
public [pop](#ds-priorityqueue.pop)(): [mixed](#language.types.mixed)
public [push](#ds-priorityqueue.push)([mixed](#language.types.mixed) $value, [int](#language.types.integer) $priority): [void](language.types.void.html)
public [toArray](#ds-priorityqueue.toarray)(): [array](#language.types.array)

}

## Constantes predefinidas

     **[Ds\PriorityQueue::MIN_CAPACITY](#ds-priorityqueue.constants.min-capacity)**






# Ds\PriorityQueue::allocate

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::allocate — Asigna suficiente memoria para una capacidad requerida

### Descripción

public **Ds\PriorityQueue::allocate**([int](#language.types.integer) $capacity): [void](language.types.void.html)

    Asegura que se asigne suficiente memoria para una capacidad requerida.
    Esto elimina la necesidad de reasignar la memoria interna a medida que se añaden valores.

### Parámetros

    capacity


        El número de valores para los cuales se debe asignar la capacidad.



     **Nota**:



            La capacidad permanecerá igual si este valor es inferior o igual a la
            capacidad actual.




    **Nota**:



            La capacidad siempre se redondeará a la potencia de 2 más cercana.





### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::allocate()**

&lt;?php
$queue = new \Ds\PriorityQueue();
var_dump($queue-&gt;capacity());

$queue-&gt;allocate(100);
var_dump($queue-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)
int(128)

# Ds\PriorityQueue::capacity

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::capacity — Devuelve la capacidad actual

### Descripción

public **Ds\PriorityQueue::capacity**(): [int](#language.types.integer)

    Devuelve la capacidad actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    La capacidad actual.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::capacity()**

&lt;?php
$queue = new \Ds\PriorityQueue();
var_dump($queue-&gt;capacity());
?&gt;

Resultado del ejemplo anterior es similar a:

int(8)

# Ds\PriorityQueue::clear

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::clear — Elimina todos los valores

### Descripción

public **Ds\PriorityQueue::clear**(): [void](language.types.void.html)

    Elimina todos los valores de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::clear()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

$queue-&gt;clear();
print_r($queue);
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\PriorityQueue Object
(
)

# Ds\PriorityQueue::\_\_construct

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::\_\_construct — Crear una nueva instancia

### Descripción

public **Ds\PriorityQueue::\_\_construct**()

    Crear una nueva instancia.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::\_\_construct()**

&lt;?php
$queue = new \Ds\PriorityQueue();
var_dump($queue);
?&gt;

Resultado del ejemplo anterior es similar a:

object(Ds\PriorityQueue)#1 (0) {
}

# Ds\PriorityQueue::copy

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::copy — Devuelve una copia superficial de la cola

### Descripción

public **Ds\PriorityQueue::copy**(): [Ds\PriorityQueue](#class.ds-priorityqueue)

    Devuelve una copia superficial de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia superficial de la cola.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::copy()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

print_r($queue-&gt;copy());
?&gt;

Resultado del ejemplo anterior es similar a:

Ds\PriorityQueue Object
(
[0] =&gt; b
[1] =&gt; c
[2] =&gt; a
)

# Ds\PriorityQueue::count

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::count — Devuelve el número de valores en la cola

### Descripción

Ver [Countable::count()](#countable.count)

# Ds\PriorityQueue::isEmpty

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::isEmpty — Indica si la cola está vacía

### Descripción

public **Ds\PriorityQueue::isEmpty**(): [bool](#language.types.boolean)

    Indica si la cola está vacía.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve **[true](#constant.true)** si la cola está vacía, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::isEmpty()**

&lt;?php
$a = new \Ds\PriorityQueue();
$b = new \Ds\PriorityQueue();

$a-&gt;push("a",  5);
$a-&gt;push("b", 15);
$a-&gt;push("c", 10);

var_dump($a-&gt;isEmpty());
var_dump($b-&gt;isEmpty());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# Ds\PriorityQueue::jsonSerialize

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

Ver [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize)

**Nota**:

    Nunca debería ser necesario llamar a esto directamente.

# Ds\PriorityQueue::peek

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::peek — Devuelve el valor al frente de la cola

### Descripción

public **Ds\PriorityQueue::peek**(): [mixed](#language.types.mixed)

    Devuelve el valor al frente de la cola, pero no lo elimina.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el valor al frente de la cola.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacía.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::peek()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

var_dump($queue-&gt;peek());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "b"

# Ds\PriorityQueue::pop

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::pop — Elimina y devuelve el valor con la prioridad más alta

### Descripción

public **Ds\PriorityQueue::pop**(): [mixed](#language.types.mixed)

    Elimina y devuelve el valor al frente de la cola, es decir, el valor
    con la prioridad más alta.

**Nota**:

        Los valores con prioridad igual se tratan en FIFO (primero en entrar, primero en salir).


### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El valor eliminado que estaba al frente de la cola.

### Errores/Excepciones

[UnderflowException](#class.underflowexception) si está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::pop()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

print_r($queue-&gt;pop());
print_r($queue-&gt;pop());
print_r($queue-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "a"
string(1) "b"
string(1) "c"

# Ds\PriorityQueue::push

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::push — Añade valores a la cola

### Descripción

public **Ds\PriorityQueue::push**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $priority): [void](language.types.void.html)

    Añade un value con una priority dada a la cola.

### Parámetros

    value


        El valor a añadir a la cola.






    priority


        La prioridad asociada al valor.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::push()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

print_r($queue-&gt;pop());
print_r($queue-&gt;pop());
print_r($queue-&gt;pop());
?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "b"
string(1) "c"
string(1) "a"

# Ds\PriorityQueue::toArray

(PECL ds &gt;= 1.0.0)

Ds\PriorityQueue::toArray —
Convierte la cola en un [array](#language.types.array).

### Descripción

public **Ds\PriorityQueue::toArray**(): [array](#language.types.array)

    Convierte la cola en un [array](#language.types.array).

**Nota**:

        Este método no es destructivo.

**Nota**:

        La conversión en un [array](#language.types.array) aún no es soportada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un [array](#language.types.array) que contiene todos los valores en el mismo orden que la cola.

### Ejemplos

**Ejemplo #1 Ejemplo de Ds\PriorityQueue::toArray()**

&lt;?php
$queue = new \Ds\PriorityQueue();

$queue-&gt;push("a",  5);
$queue-&gt;push("b", 15);
$queue-&gt;push("c", 10);

var_dump($queue-&gt;toArray());
?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
string(1) "b"
[1]=&gt;
string(1) "c"
[2]=&gt;
string(1) "a"
}

## Tabla de contenidos

- [Ds\PriorityQueue::allocate](#ds-priorityqueue.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\PriorityQueue::capacity](#ds-priorityqueue.capacity) — Devuelve la capacidad actual
- [Ds\PriorityQueue::clear](#ds-priorityqueue.clear) — Elimina todos los valores
- [Ds\PriorityQueue::\_\_construct](#ds-priorityqueue.construct) — Crear una nueva instancia
- [Ds\PriorityQueue::copy](#ds-priorityqueue.copy) — Devuelve una copia superficial de la cola
- [Ds\PriorityQueue::count](#ds-priorityqueue.count) — Devuelve el número de valores en la cola
- [Ds\PriorityQueue::isEmpty](#ds-priorityqueue.isempty) — Indica si la cola está vacía
- [Ds\PriorityQueue::jsonSerialize](#ds-priorityqueue.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\PriorityQueue::peek](#ds-priorityqueue.peek) — Devuelve el valor al frente de la cola
- [Ds\PriorityQueue::pop](#ds-priorityqueue.pop) — Elimina y devuelve el valor con la prioridad más alta
- [Ds\PriorityQueue::push](#ds-priorityqueue.push) — Añade valores a la cola
- [Ds\PriorityQueue::toArray](#ds-priorityqueue.toarray) — Convierte la cola en un array.

- [Introducción](#intro.ds)
- [Instalación/Configuración](#ds.setup)<li>[Requerimientos](#ds.requirements)
- [Instalación](#ds.installation)
  </li>- [Ejemplos](#ds.examples)
- [Ds\Collection](#class.ds-collection) — La interfaz Collection<li>[Ds\Collection::clear](#ds-collection.clear) — Eliminar todos los valores
- [Ds\Collection::copy](#ds-collection.copy) — Devuelve una copia superficial de la colección
- [Ds\Collection::isEmpty](#ds-collection.isempty) — Indica si la colección está vacía
- [Ds\Collection::toArray](#ds-collection.toarray) — Convierte la colección en un array
  </li>- [Ds\Hashable](#class.ds-hashable) — La interface Hashable<li>[Ds\Hashable::equals](#ds-hashable.equals) — Determina si un objeto es igual a la instancia actual
- [Ds\Hashable::hash](#ds-hashable.hash) — Devuelve un valor escalar para usar como valor de hash
  </li>- [Ds\Sequence](#class.ds-sequence) — La interfaz Sequence<li>[Ds\Sequence::allocate](#ds-sequence.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Sequence::apply](#ds-sequence.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Sequence::capacity](#ds-sequence.capacity) — Devuelve la capacidad actual
- [Ds\Sequence::contains](#ds-sequence.contains) — Determina si la secuencia contiene valores dados
- [Ds\Sequence::filter](#ds-sequence.filter) — Crear una nueva secuencia utilizando un callable para
  determinar qué valores incluir
- [Ds\Sequence::find](#ds-sequence.find) — Intenta encontrar el índice de un valor.
- [Ds\Sequence::first](#ds-sequence.first) — Devuelve el primer valor de la secuencia
- [Ds\Sequence::get](#ds-sequence.get) — Devuelve el valor en un índice dado
- [Ds\Sequence::insert](#ds-sequence.insert) — Inserta valores en un índice dado
- [Ds\Sequence::join](#ds-sequence.join) — Reúne todos los valores en un string
- [Ds\Sequence::last](#ds-sequence.last) — Devuelve el último valor
- [Ds\Sequence::map](#ds-sequence.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Sequence::merge](#ds-sequence.merge) — Devuelve el resultado de la adición de todos los valores de la secuencia
- [Ds\Sequence::pop](#ds-sequence.pop) — Elimina y devuelve el último valor
- [Ds\Sequence::push](#ds-sequence.push) — Añade valores al final de la secuencia
- [Ds\Sequence::reduce](#ds-sequence.reduce) — Reduce la secuencia a un solo valor utilizando una función de retrollamada
- [Ds\Sequence::remove](#ds-sequence.remove) — Elimina y devuelve un valor por índice
- [Ds\Sequence::reverse](#ds-sequence.reverse) — Invierte la secuencia en el lugar
- [Ds\Sequence::reversed](#ds-sequence.reversed) — Devuelve una copia invertida
- [Ds\Sequence::rotate](#ds-sequence.rotate) — Rota la secuencia un número dado de rotaciones
- [Ds\Sequence::set](#ds-sequence.set) — Actualiza un valor en un índice dado
- [Ds\Sequence::shift](#ds-sequence.shift) — Elimina y devuelve el primer valor
- [Ds\Sequence::slice](#ds-sequence.slice) — Devuelve una subsecuencia de un rango dado
- [Ds\Sequence::sort](#ds-sequence.sort) — Ordena la secuencia en su lugar
- [Ds\Sequence::sorted](#ds-sequence.sorted) — Devuelve una copia ordenada
- [Ds\Sequence::sum](#ds-sequence.sum) — Devuelve la suma de todos los valores de la secuencia
- [Ds\Sequence::unshift](#ds-sequence.unshift) — Añade valores al inicio de la secuencia
  </li>- [Ds\Vector](#class.ds-vector) — La clase Vector<li>[Ds\Vector::allocate](#ds-vector.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Vector::apply](#ds-vector.apply) — Cambia todos los valores aplicando una función de retrollamada a cada valor
- [Ds\Vector::capacity](#ds-vector.capacity) — Devuelve la capacidad actual
- [Ds\Vector::clear](#ds-vector.clear) — Elimina todos los valores
- [Ds\Vector::\_\_construct](#ds-vector.construct) — Crea una nueva instancia
- [Ds\Vector::contains](#ds-vector.contains) — Determina si el vector contiene valores dados
- [Ds\Vector::copy](#ds-vector.copy) — Devuelve una copia superficial del vector
- [Ds\Vector::count](#ds-vector.count) — Devuelve el número de valores en la colección
- [Ds\Vector::filter](#ds-vector.filter) — Crear un nuevo vector utilizando un callable para
  determinar qué valores incluir
- [Ds\Vector::find](#ds-vector.find) — Intenta encontrar el índice de un valor.
- [Ds\Vector::first](#ds-vector.first) — Devuelve el primer valor en el vector
- [Ds\Vector::get](#ds-vector.get) — Devuelve el valor en un índice dado
- [Ds\Vector::insert](#ds-vector.insert) — Inserta valores en un índice dado
- [Ds\Vector::isEmpty](#ds-vector.isempty) — Indica si el vector está vacío
- [Ds\Vector::join](#ds-vector.join) — Reúne todos los valores en un string
- [Ds\Vector::jsonSerialize](#ds-vector.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Vector::last](#ds-vector.last) — Devuelve el último valor
- [Ds\Vector::map](#ds-vector.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Vector::merge](#ds-vector.merge) — Devuelve el resultado de la adición de todos los valores dados al vector
- [Ds\Vector::pop](#ds-vector.pop) — Elimina y devuelve el último valor
- [Ds\Vector::push](#ds-vector.push) — Añade valores al final del vector
- [Ds\Vector::reduce](#ds-vector.reduce) — Reduce el vector a un solo valor utilizando una retrollamada
- [Ds\Vector::remove](#ds-vector.remove) — Elimina y devuelve un valor por índice
- [Ds\Vector::reverse](#ds-vector.reverse) — Invertir el vector en su lugar
- [Ds\Vector::reversed](#ds-vector.reversed) — Devuelve una copia invertida
- [Ds\Vector::rotate](#ds-vector.rotate) — Rota el vector un cierto número de rotaciones
- [Ds\Vector::set](#ds-vector.set) — Cambia un valor en un índice dado
- [Ds\Vector::shift](#ds-vector.shift) — Elimina y devuelve el primer valor
- [Ds\Vector::slice](#ds-vector.slice) — Devuelve un sub-vector de un rango dado
- [Ds\Vector::sort](#ds-vector.sort) — Ordena el vector en su lugar
- [Ds\Vector::sorted](#ds-vector.sorted) — Devuelve una copia ordenada
- [Ds\Vector::sum](#ds-vector.sum) — Devuelve la suma de todos los valores del vector
- [Ds\Vector::toArray](#ds-vector.toarray) — Convierte el vector en array
- [Ds\Vector::unshift](#ds-vector.unshift) — Añade valores al inicio del vector
  </li>- [Ds\Deque](#class.ds-deque) — La clase Deque<li>[Ds\Deque::allocate](#ds-deque.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Deque::apply](#ds-deque.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Deque::capacity](#ds-deque.capacity) — Devuelve la capacidad actual
- [Ds\Deque::clear](#ds-deque.clear) — Elimina todos los valores del deque
- [Ds\Deque::\_\_construct](#ds-deque.construct) — Crea una nueva instancia
- [Ds\Deque::contains](#ds-deque.contains) — Determina si el deque contiene valores dados
- [Ds\Deque::copy](#ds-deque.copy) — Devuelve una copia superficial de la deque
- [Ds\Deque::count](#ds-deque.count) — Devuelve el número de valores en la colección
- [Ds\Deque::filter](#ds-deque.filter) — Crear un nuevo deque utilizando un callable para
  determinar qué valores incluir
- [Ds\Deque::find](#ds-deque.find) — Intenta encontrar el índice de un valor.
- [Ds\Deque::first](#ds-deque.first) — Devuelve el primer valor de la deque
- [Ds\Deque::get](#ds-deque.get) — Devuelve el valor en un índice dado
- [Ds\Deque::insert](#ds-deque.insert) — Inserta valores en un índice dado
- [Ds\Deque::isEmpty](#ds-deque.isempty) — Indica si la deque está vacía
- [Ds\Deque::join](#ds-deque.join) — Reúne todos los valores en un string
- [Ds\Deque::jsonSerialize](#ds-deque.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Deque::last](#ds-deque.last) — Devuelve el último valor
- [Ds\Deque::map](#ds-deque.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Deque::merge](#ds-deque.merge) — Devuelve el resultado de la adición de todos los valores dados al deque
- [Ds\Deque::pop](#ds-deque.pop) — Elimina y devuelve el último valor
- [Ds\Deque::push](#ds-deque.push) — Añade valores al final del deque
- [Ds\Deque::reduce](#ds-deque.reduce) — Reduce el deque a un solo valor utilizando una función de retrollamada
- [Ds\Deque::remove](#ds-deque.remove) — Elimina y devuelve un valor por índice
- [Ds\Deque::reverse](#ds-deque.reverse) — Invierte el deque en su lugar
- [Ds\Deque::reversed](#ds-deque.reversed) — Devuelve una copia invertida
- [Ds\Deque::rotate](#ds-deque.rotate) — Rota el deque un cierto número de rotaciones
- [Ds\Deque::set](#ds-deque.set) — Actualiza un valor en un índice dado
- [Ds\Deque::shift](#ds-deque.shift) — Elimina y devuelve el primer valor
- [Ds\Deque::slice](#ds-deque.slice) — Devuelve un sub-deque de un rango dado
- [Ds\Deque::sort](#ds-deque.sort) — Ordena el deque en su lugar
- [Ds\Deque::sorted](#ds-deque.sorted) — Devuelve una copia ordenada
- [Ds\Deque::sum](#ds-deque.sum) — Devuelve la suma de todos los valores del deque
- [Ds\Deque::toArray](#ds-deque.toarray) — Convierte el deque en un array
- [Ds\Deque::unshift](#ds-deque.unshift) — Añade valores al inicio del deque
  </li>- [Ds\Map](#class.ds-map) — La clase Map<li>[Ds\Map::allocate](#ds-map.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Map::apply](#ds-map.apply) — Actualiza todos los valores aplicando una retrollamada a cada valor
- [Ds\Map::capacity](#ds-map.capacity) — Devuelve la capacidad actual
- [Ds\Map::clear](#ds-map.clear) — Elimina todos los valores
- [Ds\Map::\_\_construct](#ds-map.construct) — Crear una nueva instancia
- [Ds\Map::copy](#ds-map.copy) — Devuelve una copia superficial del mapa
- [Ds\Map::count](#ds-map.count) — Devuelve el número de valores en el mapa
- [Ds\Map::diff](#ds-map.diff) — Crear un nuevo map utilizando claves que no están en otro map
- [Ds\Map::filter](#ds-map.filter) — Crear un nuevo mapa utilizando un callable para determinar qué pares incluir
- [Ds\Map::first](#ds-map.first) — Devuelve la primera pareja del mapa
- [Ds\Map::get](#ds-map.get) — Devuelve el valor para una clave dada
- [Ds\Map::hasKey](#ds-map.haskey) — Determina si el mapa contiene una clave dada
- [Ds\Map::hasValue](#ds-map.hasvalue) — Determina si el mapa contiene un valor dado
- [Ds\Map::intersect](#ds-map.intersect) — Crear un nuevo mapa intersectando las claves con otro mapa
- [Ds\Map::isEmpty](#ds-map.isempty) — Indica si el mapa está vacío
- [Ds\Map::jsonSerialize](#ds-map.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Map::keys](#ds-map.keys) — Devuelve un conjunto de las claves del mapa
- [Ds\Map::ksort](#ds-map.ksort) — Ordena el mapa en el lugar por clave
- [Ds\Map::ksorted](#ds-map.ksorted) — Devuelve una copia, ordenada por clave
- [Ds\Map::last](#ds-map.last) — Devuelve el último par del mapa
- [Ds\Map::map](#ds-map.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Map::merge](#ds-map.merge) — Devuelve el resultado de la adición de todas las asociaciones dadas
- [Ds\Map::pairs](#ds-map.pairs) — Devuelve una secuencia que contiene todas las parejas del mapa
- [Ds\Map::put](#ds-map.put) — Asocia una clave a un valor
- [Ds\Map::putAll](#ds-map.putall) — Asocia todas las parejas clave-valor de un objeto traversable o de un array
- [Ds\Map::reduce](#ds-map.reduce) — Reduce el mapa a un solo valor utilizando una retrollamada
- [Ds\Map::remove](#ds-map.remove) — Elimina y devuelve un valor por clave
- [Ds\Map::reverse](#ds-map.reverse) — Invierte el mapa en su lugar
- [Ds\Map::reversed](#ds-map.reversed) — Devuelve una copia invertida
- [Ds\Map::skip](#ds-map.skip) — Devuelve el par a un índice de posición dado
- [Ds\Map::slice](#ds-map.slice) — Devuelve un subconjunto del mapa definido por un índice de inicio y una longitud
- [Ds\Map::sort](#ds-map.sort) — Ordena el mapa en el lugar por valor
- [Ds\Map::sorted](#ds-map.sorted) — Devuelve una copia, ordenada por valor
- [Ds\Map::sum](#ds-map.sum) — Devuelve la suma de todos los valores del mapa
- [Ds\Map::toArray](#ds-map.toarray) — Convierte el mapa en un array
- [Ds\Map::union](#ds-map.union) — Crear un nuevo mapa utilizando los valores de la instancia actual y de otro mapa
- [Ds\Map::values](#ds-map.values) — Devuelve una secuencia de los valores del mapa
- [Ds\Map::xor](#ds-map.xor) — Crear un nuevo mapa utilizando las claves de la instancia actual o de otro mapa, pero no de ambos
  </li>- [Ds\Pair](#class.ds-pair) — La clase Pair<li>[Ds\Pair::clear](#ds-pair.clear) — Elimina todos los valores
- [Ds\Pair::\_\_construct](#ds-pair.construct) — Crear una nueva instancia
- [Ds\Pair::copy](#ds-pair.copy) — Devuelve una copia superficial del par
- [Ds\Pair::isEmpty](#ds-pair.isempty) — Indica si la pareja está vacía
- [Ds\Pair::jsonSerialize](#ds-pair.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Pair::toArray](#ds-pair.toarray) — Convierte la pareja en un array
  </li>- [Ds\Set](#class.ds-set) — La clase Set<li>[Ds\Set::add](#ds-set.add) — Añade valores a la secuencia
- [Ds\Set::allocate](#ds-set.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Set::capacity](#ds-set.capacity) — Devuelve la capacidad actual
- [Ds\Set::clear](#ds-set.clear) — Elimina todos los valores
- [Ds\Set::\_\_construct](#ds-set.construct) — Crea una nueva instancia
- [Ds\Set::contains](#ds-set.contains) — Determina si el conjunto contiene todos los valores
- [Ds\Set::copy](#ds-set.copy) — Devuelve una copia superficial de la secuencia
- [Ds\Set::count](#ds-set.count) — Devuelve el número de valores en la secuencia
- [Ds\Set::diff](#ds-set.diff) — Crear un nuevo conjunto utilizando valores que no están en otra secuencia
- [Ds\Set::filter](#ds-set.filter) — Crear un nuevo conjunto utilizando un callable
  para determinar qué valores incluir
- [Ds\Set::first](#ds-set.first) — Devuelve el primer valor de la secuencia
- [Ds\Set::get](#ds-set.get) — Devuelve el valor en un índice dado
- [Ds\Set::intersect](#ds-set.intersect) — Crear un nuevo conjunto utilizando valores comunes con otra secuencia
- [Ds\Set::isEmpty](#ds-set.isempty) — Indica si el conjunto está vacío
- [Ds\Set::join](#ds-set.join) — Reúne todos los valores en un string
- [Ds\Set::jsonSerialize](#ds-set.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Set::last](#ds-set.last) — Devuelve el último valor de la secuencia
- [Ds\Set::map](#ds-set.map) — Devuelve el resultado de la aplicación de una retrollamada a cada valor
- [Ds\Set::merge](#ds-set.merge) — Devuelve el resultado de la adición de todos los valores de la secuencia
- [Ds\Set::reduce](#ds-set.reduce) — Reduce el conjunto a un solo valor utilizando una función de retrollamada
- [Ds\Set::remove](#ds-set.remove) — Elimina todos los valores dados de la secuencia
- [Ds\Set::reverse](#ds-set.reverse) — Invierte el conjunto en su lugar
- [Ds\Set::reversed](#ds-set.reversed) — Devuelve una copia invertida
- [Ds\Set::slice](#ds-set.slice) — Devuelve un subconjunto de un rango dado
- [Ds\Set::sort](#ds-set.sort) — Ordena el conjunto en el lugar
- [Ds\Set::sorted](#ds-set.sorted) — Devuelve una copia ordenada
- [Ds\Set::sum](#ds-set.sum) — Devuelve la suma de todos los valores de la secuencia
- [Ds\Set::toArray](#ds-set.toarray) — Convierte el conjunto en un array
- [Ds\Set::union](#ds-set.union) — Crear un nuevo conjunto utilizando los valores de la instancia actual y de otro conjunto
- [Ds\Set::xor](#ds-set.xor) — Crear un nuevo conjunto utilizando los valores de la instancia actual o de otro conjunto, pero no de ambos
  </li>- [Ds\Stack](#class.ds-stack) — La clase Stack<li>[Ds\Stack::allocate](#ds-stack.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Stack::capacity](#ds-stack.capacity) — Devuelve la capacidad actual
- [Ds\Stack::clear](#ds-stack.clear) — Elimina todos los valores
- [Ds\Stack::\_\_construct](#ds-stack.construct) — Crear una nueva instancia
- [Ds\Stack::copy](#ds-stack.copy) — Devuelve una copia superficial de la pila
- [Ds\Stack::count](#ds-stack.count) — Devuelve el número de valores en la pila
- [Ds\Stack::isEmpty](#ds-stack.isempty) — Indica si la pila está vacía
- [Ds\Stack::jsonSerialize](#ds-stack.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\Stack::peek](#ds-stack.peek) — Devuelve el valor en la parte superior de la pila
- [Ds\Stack::pop](#ds-stack.pop) — Elimina y devuelve el valor en la parte superior de la pila
- [Ds\Stack::push](#ds-stack.push) — Añade valores a la pila
- [Ds\Stack::toArray](#ds-stack.toarray) — Convierte la pila en un array
  </li>- [Ds\Queue](#class.ds-queue) — La clase Queue<li>[Ds\Queue::allocate](#ds-queue.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\Queue::capacity](#ds-queue.capacity) — Devuelve la capacidad actual
- [Ds\Queue::clear](#ds-queue.clear) — Elimina todos los valores
- [Ds\Queue::\_\_construct](#ds-queue.construct) — Crear una nueva instancia
- [Ds\Queue::copy](#ds-queue.copy) — Devuelve una copia superficial de la cola
- [Ds\Queue::count](#ds-queue.count) — Devuelve el número de valores en la cola
- [Ds\Queue::isEmpty](#ds-queue.isempty) — Indica si la cola está vacía
- [Ds\Queue::jsonSerialize](#ds-queue.jsonserialize) — Regresa una representacion que puede ser convertida a JSON
- [Ds\Queue::peek](#ds-queue.peek) — Devuelve el valor al frente de la cola
- [Ds\Queue::pop](#ds-queue.pop) — Elimina y devuelve el valor al frente de la cola
- [Ds\Queue::push](#ds-queue.push) — Añade un elemento a la cola
- [Ds\Queue::toArray](#ds-queue.toarray) — Convierte la cola en un array
  </li>- [Ds\PriorityQueue](#class.ds-priorityqueue) — La clase PriorityQueue<li>[Ds\PriorityQueue::allocate](#ds-priorityqueue.allocate) — Asigna suficiente memoria para una capacidad requerida
- [Ds\PriorityQueue::capacity](#ds-priorityqueue.capacity) — Devuelve la capacidad actual
- [Ds\PriorityQueue::clear](#ds-priorityqueue.clear) — Elimina todos los valores
- [Ds\PriorityQueue::\_\_construct](#ds-priorityqueue.construct) — Crear una nueva instancia
- [Ds\PriorityQueue::copy](#ds-priorityqueue.copy) — Devuelve una copia superficial de la cola
- [Ds\PriorityQueue::count](#ds-priorityqueue.count) — Devuelve el número de valores en la cola
- [Ds\PriorityQueue::isEmpty](#ds-priorityqueue.isempty) — Indica si la cola está vacía
- [Ds\PriorityQueue::jsonSerialize](#ds-priorityqueue.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [Ds\PriorityQueue::peek](#ds-priorityqueue.peek) — Devuelve el valor al frente de la cola
- [Ds\PriorityQueue::pop](#ds-priorityqueue.pop) — Elimina y devuelve el valor con la prioridad más alta
- [Ds\PriorityQueue::push](#ds-priorityqueue.push) — Añade valores a la cola
- [Ds\PriorityQueue::toArray](#ds-priorityqueue.toarray) — Convierte la cola en un array.
  </li>
