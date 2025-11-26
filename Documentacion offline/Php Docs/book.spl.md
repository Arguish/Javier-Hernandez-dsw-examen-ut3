# SPL - Biblioteca estándar de PHP

# Introducción

La extensión Biblioteca Estándar de PHP (SPL por las siglas de Standard PHP Library en inglés) es una colección de interfaces y clases
que están pensadas para solucionar problemas comunes.

La extensión proporciona un conjunto de estructuras de datos estándar, excepciones genéricas,
iteradores, clases para trabajar con ficheros usando una API
orientada a objetos, y funciones de utilidad.

# Interfaces

## Tabla de contenidos

- [OuterIterator](#class.outeriterator)
- [RecursiveIterator](#class.recursiveiterator)
- [SeekableIterator](#class.seekableiterator)
- [SplObserver](#class.splobserver)
- [SplSubject](#class.splsubject)

    SPL proporciona un conjunto de interfaces para mejorar los iteradores,
    y un par de interfaces para implementar el Patrón de Diseño Observador.

    ## Ver también
    - [Interfaces y clases predefinidas](#reserved.interfaces)

# La interfaz OuterIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Las clases que implementan la clase **OuterIterator**
    pueden ser utilizadas para iterar sobre iteradores.

## Sinopsis de la Interfaz

     interface **OuterIterator**

    extends
      [Iterator](#class.iterator) {

    /* Métodos */

public [getInnerIterator](#outeriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)

    /* Métodos heredados */
    public [Iterator::current](#iterator.current)(): [mixed](#language.types.mixed)

public [Iterator::key](#iterator.key)(): [mixed](#language.types.mixed)
public [Iterator::next](#iterator.next)(): [void](language.types.void.html)
public [Iterator::rewind](#iterator.rewind)(): [void](language.types.void.html)
public [Iterator::valid](#iterator.valid)(): [bool](#language.types.boolean)

}

# OuterIterator::getInnerIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

OuterIterator::getInnerIterator — Devuelve el iterador interno para la entrada actual

### Descripción

public **OuterIterator::getInnerIterator**(): [?](#language.types.null)[Iterator](#class.iterator)

Devuelve el iterador interno para la entrada actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el iterador interno para la entrada actual si existe, **[null](#constant.null)** en caso contrario.

## Tabla de contenidos

- [OuterIterator::getInnerIterator](#outeriterator.getinneriterator) — Devuelve el iterador interno para la entrada actual

# La interfaz [RecursiveIterator](#class.recursiveiterator)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Las clases que implementan **RecursiveIterator**
    pueden ser utilizadas para iterar sobre otros iteradores de forma recursiva.

## Sinopsis de la Interfaz

     interface **RecursiveIterator**

    extends
      [Iterator](#class.iterator) {

    /* Métodos */

public [getChildren](#recursiveiterator.getchildren)(): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)
public [hasChildren](#recursiveiterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [Iterator::current](#iterator.current)(): [mixed](#language.types.mixed)

public [Iterator::key](#iterator.key)(): [mixed](#language.types.mixed)
public [Iterator::next](#iterator.next)(): [void](language.types.void.html)
public [Iterator::rewind](#iterator.rewind)(): [void](language.types.void.html)
public [Iterator::valid](#iterator.valid)(): [bool](#language.types.boolean)

}

# RecursiveIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIterator::getChildren — Obtiene el iterador de la entrada actual

### Descripción

public **RecursiveIterator::getChildren**(): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)

Devuelve el iterador para la entrada actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un iterador para la entrada actual si existe, **[null](#constant.null)** en caso contrario.

### Ver también

    - [RecursiveIterator::hasChildren()](#recursiveiterator.haschildren) - Verifica si un iterador puede ser creado desde la entrada actual

# RecursiveIterator::hasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIterator::hasChildren — Verifica si un iterador puede ser creado desde la entrada actual

### Descripción

public **RecursiveIterator::hasChildren**(): [bool](#language.types.boolean)

Verifica si un iterador puede ser creado desde la entrada actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si la entrada actual puede ser recorrid, **[false](#constant.false)** en caso contrario.

### Ver también

    - [RecursiveIterator::getChildren()](#recursiveiterator.getchildren) - Obtiene el iterador de la entrada actual

## Tabla de contenidos

- [RecursiveIterator::getChildren](#recursiveiterator.getchildren) — Obtiene el iterador de la entrada actual
- [RecursiveIterator::hasChildren](#recursiveiterator.haschildren) — Verifica si un iterador puede ser creado desde la entrada actual

# The SeekableIterator interface

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    El iterador Seekable.

## Sinopsis de la Interfaz

     interface **SeekableIterator**

    extends
      [Iterator](#class.iterator) {

    /* Métodos */

public [seek](#seekableiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)

    /* Métodos heredados */
    public [Iterator::current](#iterator.current)(): [mixed](#language.types.mixed)

public [Iterator::key](#iterator.key)(): [mixed](#language.types.mixed)
public [Iterator::next](#iterator.next)(): [void](language.types.void.html)
public [Iterator::rewind](#iterator.rewind)(): [void](language.types.void.html)
public [Iterator::valid](#iterator.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

    **Ejemplo #1 Uso básico**



     Este ejemplo muestra cómo crear un **SeekableIterator** personalizado,
     buscar una posición y manejar una posición inválida.

&lt;?php
class MySeekableIterator implements SeekableIterator {

    private $position;

    private $array = array(
        "first element",
        "second element",
        "third element",
        "fourth element"
    );

    /* Métodos requeridos para la interfaz SeekableIterator */

    public function seek($position) {
      if (!isset($this-&gt;array[$position])) {
          throw new OutOfBoundsException("invalid seek position ($position)");
      }

      $this-&gt;position = $position;
    }

    /* Métodos requeridos para la interfaz Iterador */

    public function rewind() {
        $this-&gt;position = 0;
    }

    public function current() {
        return $this-&gt;array[$this-&gt;position];
    }

    public function key() {
        return $this-&gt;position;
    }

    public function next() {
        ++$this-&gt;position;
    }

    public function valid() {
        return isset($this-&gt;array[$this-&gt;position]);
    }

}

try {

    $it = new MySeekableIterator;
    echo $it-&gt;current(), "\n";

    $it-&gt;seek(2);
    echo $it-&gt;current(), "\n";

    $it-&gt;seek(1);
    echo $it-&gt;current(), "\n";

    $it-&gt;seek(10);

} catch (OutOfBoundsException $e) {
echo $e-&gt;getMessage();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

first element
third element
second element
invalid seek position (10)

# SeekableIterator::seek

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SeekableIterator::seek — Busca una posición

### Descripción

public **SeekableIterator::seek**([int](#language.types.integer) $offset): [void](language.types.void.html)

Busca la posición dada en el iterador.

### Parámetros

     offset


       La posición a alcanzar.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

La implementación debe emitir una excepción [OutOfBoundsException](#class.outofboundsexception)
si la posición offset no es alcanzable.

### Ejemplos

    **Ejemplo #1 Ejemplo con SeekableIterator::seek()**



     Mueve el iterador a la posición 3
     ([ArrayIterator](#class.arrayiterator) implementa [SeekableIterator](#class.seekableiterator)).

&lt;?php
$array = array("apple", "banana", "cherry", "damson", "elderberry");
$iterator = new ArrayIterator($array);
$iterator-&gt;seek(3);
echo $iterator-&gt;current();
?&gt;

    Resultado del ejemplo anterior es similar a:

damson

### Ver también

    - [SeekableIterator](#class.seekableiterator)

    - [Iterator](#class.iterator)

## Tabla de contenidos

- [SeekableIterator::seek](#seekableiterator.seek) — Busca una posición

# La interfaz SplObserver

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La interfaz **SplObserver** se utiliza junto con
    [SplSubject](#class.splsubject) para implementar el patrón de diseño observador.

## Sinopsis de la Interfaz

     interface **SplObserver** {

    /* Métodos */

public [update](#splobserver.update)([SplSubject](#class.splsubject) $subject): [void](language.types.void.html)

}

# SplObserver::update

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObserver::update — Recibe actualizaciones de sujeto

### Descripción

public **SplObserver::update**([SplSubject](#class.splsubject) $subject): [void](language.types.void.html)

Este método es llamado cuando cualquier [SplSubject](#class.splsubject) se use
para llamar llamadas adjuntas [SplSubject::notify()](#splsubject.notify).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     subject


       El objeto [SplSubject](#class.splsubject) notificando al observador de una actualización.





### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [SplObserver::update](#splobserver.update) — Recibe actualizaciones de sujeto

# El interfaz SplSubject

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    El interfaz **SplSubject** es usado en conjunto con
    [SplObserver](#class.splobserver) para implementar el patrón de diseño Observer.

## Sinopsis de la Interfaz

     interface **SplSubject** {

    /* Métodos */

public [attach](#splsubject.attach)([SplObserver](#class.splobserver) $observer): [void](language.types.void.html)
public [detach](#splsubject.detach)([SplObserver](#class.splobserver) $observer): [void](language.types.void.html)
public [notify](#splsubject.notify)(): [void](language.types.void.html)

}

# SplSubject::attach

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplSubject::attach — Adjuntar un SplObserver

### Descripción

public **SplSubject::attach**([SplObserver](#class.splobserver) $observer): [void](language.types.void.html)

Adjunta un [SplObserver](#class.splobserver) de esta forma puede ser notificado cuando hayan actualizaciones.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     observer


       El [SplObserver](#class.splobserver) a adjuntar.





### Valores devueltos

No se retorna ningún valor.

# SplSubject::detach

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplSubject::detach — Separa un observador

### Descripción

public **SplSubject::detach**([SplObserver](#class.splobserver) $observer): [void](language.types.void.html)

Separa un observador del sujeto para dejar de notificarlo cuando hayan actualizaciones.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     observer


       El [SplObserver](#class.splobserver) a separar.





### Valores devueltos

No se retorna ningún valor.

# SplSubject::notify

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplSubject::notify — Notificar un observador

### Descripción

public **SplSubject::notify**(): [void](language.types.void.html)

    Notifica todos los observadores adjuntos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [SplSubject::attach](#splsubject.attach) — Adjuntar un SplObserver
- [SplSubject::detach](#splsubject.detach) — Separa un observador
- [SplSubject::notify](#splsubject.notify) — Notificar un observador

# Estructuras de datos

## Tabla de contenidos

- [SplDoublyLinkedList](#class.spldoublylinkedlist)
- [SplStack](#class.splstack)
- [SplQueue](#class.splqueue)
- [SplHeap](#class.splheap)
- [SplMaxHeap](#class.splmaxheap)
- [SplMinHeap](#class.splminheap)
- [SplPriorityQueue](#class.splpriorityqueue)
- [SplFixedArray](#class.splfixedarray)
- [ArrayObject](#class.arrayobject)
- [SplObjectStorage](#class.splobjectstorage)

    SPL proporciona un conjunto de estructuras de datos estándar. Estas están agrupadas por su
    implementación subyacente la cual usualmente define su campo de aplicación
    general.

    ## Listas doblemente enlazadas

    Una Lista Doblemente Enlazada (DLL en inglés) es una lista de nodos enlazados entre ellos
    en ambas direcciones. Las operaciones de iteración, acceso a ambos extremos, adición o
    remoción de nodos tienen un costo de O(1) cuando la estructura subyacente es una DLL.
    Por lo tanto, proporciona una implementación decente para pilas y colas.
    - [SplDoublyLinkedList](#class.spldoublylinkedlist)

         <li class="listitem">[SplStack](#class.splstack)
        - [SplQueue](#class.splqueue)

      </li>


    ## Montículos

    Los montículos son estructuras de árboles que siguen la propiedad de los montículos: cada nodo
    es mayor o igual que sus hijos, cuando son comparados utilizando el
    método de comparación implementado, el cual es global al montículo.
    - [SplHeap](#class.splheap)

         <li class="listitem">[SplMaxHeap](#class.splmaxheap)
        - [SplMinHeap](#class.splminheap)

      </li>
      - 
       [SplPriorityQueue](#class.splpriorityqueue)


    ## Arrays

    Los array son estructuras que almacenan datos de una forma continua y accesible
    mediante índices.

    **Nota**:

    No deben confundirse con los [array](#language.types.array)s nativos de PHP.
    Los array de PHP son en realidad tablas hash ordenadas.
    Mientras que, SPL proporciona la clase [ArrayObject](#class.arrayobject)
    que envuelven los arrays de PHP en un objeto.
    - [SplFixedArray](#class.splfixedarray)

    ## Mapa

    Un mapa es una estructura de datos que contiene parejas de clave-valor. Los array de PHP pueden ser vistos como correspondencias (mapas) de enteros/string a valores. SPL proporciona una correspondencia de objetos a datos. Este mapa puede ser utilizado además como un conjunto de objetos.
    - [SplObjectStorage](#class.splobjectstorage)

# La clase SplDoublyLinkedList

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplDoublyLinkedList proporciona las principales funcionalidades de una lista doblemente enlazada.

## Sinopsis de la Clase

     class **SplDoublyLinkedList**



     implements
      [Iterator](#class.iterator),

     [Countable](#class.countable),

     [ArrayAccess](#class.arrayaccess),

     [Serializable](#class.serializable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo);

    public
     const
     [int](#language.types.integer)
      [IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo);

    public
     const
     [int](#language.types.integer)
      [IT_MODE_DELETE](#spldoublylinkedlist.constants.it-mode-delete);

    public
     const
     [int](#language.types.integer)
      [IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep);


    /* Métodos */

public [add](#spldoublylinkedlist.add)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [bottom](#spldoublylinkedlist.bottom)(): [mixed](#language.types.mixed)
public [count](#spldoublylinkedlist.count)(): [int](#language.types.integer)
public [current](#spldoublylinkedlist.current)(): [mixed](#language.types.mixed)
public [getIteratorMode](#spldoublylinkedlist.getiteratormode)(): [int](#language.types.integer)
public [isEmpty](#spldoublylinkedlist.isempty)(): [bool](#language.types.boolean)
public [key](#spldoublylinkedlist.key)(): [int](#language.types.integer)
public [next](#spldoublylinkedlist.next)(): [void](language.types.void.html)
public [offsetExists](#spldoublylinkedlist.offsetexists)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [offsetGet](#spldoublylinkedlist.offsetget)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [offsetSet](#spldoublylinkedlist.offsetset)([?](#language.types.null)[int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#spldoublylinkedlist.offsetunset)([int](#language.types.integer) $index): [void](language.types.void.html)
public [pop](#spldoublylinkedlist.pop)(): [mixed](#language.types.mixed)
public [prev](#spldoublylinkedlist.prev)(): [void](language.types.void.html)
public [push](#spldoublylinkedlist.push)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [rewind](#spldoublylinkedlist.rewind)(): [void](language.types.void.html)
public [serialize](#spldoublylinkedlist.serialize)(): [string](#language.types.string)
public [setIteratorMode](#spldoublylinkedlist.setiteratormode)([int](#language.types.integer) $mode): [int](#language.types.integer)
public [shift](#spldoublylinkedlist.shift)(): [mixed](#language.types.mixed)
public [top](#spldoublylinkedlist.top)(): [mixed](#language.types.mixed)
public [unserialize](#spldoublylinkedlist.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [unshift](#spldoublylinkedlist.unshift)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [valid](#spldoublylinkedlist.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Dirección de Iteración




      **[SplDoublyLinkedList::IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo)**


        La lista será iterada en un orden de última entrada, primera salida, como una pila.







      **[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo)**


        La lista será iterada en un orden de entrada y salida, como una cola.










    ## Comportamiento de Iteración




      **[SplDoublyLinkedList::IT_MODE_DELETE](#spldoublylinkedlist.constants.it-mode-delete)**


        La iteración eliminará los elementos iterados.







      **[SplDoublyLinkedList::IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep)**


        La iteración no eliminará los elementos iterados.






# SplDoublyLinkedList::add

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

SplDoublyLinkedList::add — Añadir/insertar un nuevo valor en el índice especificado

### Descripción

public **SplDoublyLinkedList::add**([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Inserta el valor dado por value en el índice
especificado por index, reorganizando el
valor anterior a ese índice (y todos los valores subsiguientes)
a través de la lista.

### Parámetros

     index


       El índice donde insertar el nuevo valor.






     value


       El nuevo valor para index.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [OutOfRangeException](#class.outofrangeexception) cuando
index está fuera de los límites o cuando
index no puede ser analizado como un integer.

# SplDoublyLinkedList::bottom

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::bottom — Examinar el nodo del comienzo de la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::bottom**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de el primer nodo.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplDoublyLinkedList::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::count — Cuenta el número de elementos de la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::count**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de elementos de la lista doblemente enlazada.

# SplDoublyLinkedList::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::current — Devuelve la entrada actual del array

### Descripción

public **SplDoublyLinkedList::current**(): [mixed](#language.types.mixed)

Obtiene el nodo actual de la lista doblemente enlazada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del nodo actual.

# SplDoublyLinkedList::getIteratorMode

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::getIteratorMode — Devuelve el modo de iteración

### Descripción

public **SplDoublyLinkedList::getIteratorMode**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los diferentes modos y banderas que afectan la iteración.

# SplDoublyLinkedList::isEmpty

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::isEmpty — Comprueba si la lista doblemente enlazada está vacía

### Descripción

public **SplDoublyLinkedList::isEmpty**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si la lista doblemente enlazada está vacía.

# SplDoublyLinkedList::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::key — Devuelve el índice del nodo actual

### Descripción

public **SplDoublyLinkedList::key**(): [int](#language.types.integer)

Esta función devuelve el índice del nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El índice del nodo actual.

# SplDoublyLinkedList::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::next — Avanza a la siguiente entrada

### Descripción

public **SplDoublyLinkedList::next**(): [void](language.types.void.html)

Mueve el iterador al siguiente nodo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplDoublyLinkedList::offsetExists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::offsetExists — Devuelve si el índice solicitado existe

### Descripción

public **SplDoublyLinkedList::offsetExists**([int](#language.types.integer) $index): [bool](#language.types.boolean)

### Parámetros

     index


       El índice a comprobar.





### Valores devueltos

**[true](#constant.true)** si el índice index solicitado existe, **[false](#constant.false)** en caso contrario.

# SplDoublyLinkedList::offsetGet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::offsetGet — Devuelve el valor del índice específicado

### Descripción

public **SplDoublyLinkedList::offsetGet**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

### Parámetros

     index


       El índice con el valor.





### Valores devueltos

El valor específicado en index.

### Errores/Excepciones

Lanza una [OutOfRangeException](#class.outofrangeexception) cuando index está fuera de los límites
o cuando index no se puede analizar como un entero.

# SplDoublyLinkedList::offsetSet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::offsetSet — Establece el valor del índice específicado

### Descripción

public **SplDoublyLinkedList::offsetSet**([?](#language.types.null)[int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Establece el valor del índice dado por index al valor especificado por value.

### Parámetros

     index


       El índice a establer.
       Si **[null](#constant.null)**, el siguiente valor se añadirá después del último elemento.






     value


       El nuevo valor para index.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [OutOfRangeException](#class.outofrangeexception) cuando index está fuera de los límites o cuando index no se puede analizar como un entero.

# SplDoublyLinkedList::offsetUnset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::offsetUnset — Borra el valor de el índice específicado

### Descripción

public **SplDoublyLinkedList::offsetUnset**([int](#language.types.integer) $index): [void](language.types.void.html)

Borra el valor del índice específicado.

### Parámetros

     index


       El índice a borrar.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [OutOfRangeException](#class.outofrangeexception) cuando index está fuera de los límites
o cuando index no se puede analizar como un entero.

# SplDoublyLinkedList::pop

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::pop — Extrae un nodo del final de la lista doblementa enlazada

### Descripción

public **SplDoublyLinkedList::pop**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del nodo a extraer.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplDoublyLinkedList::prev

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::prev — Retrocede a la entrada anterior

### Descripción

public **SplDoublyLinkedList::prev**(): [void](language.types.void.html)

Mueve el iterador al nodo anterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplDoublyLinkedList::push

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::push — Inserta un elemento al final de la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::push**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Inserta el valor dado por value al final de la lista doblemente enlazada.

### Parámetros

     value


       El valor a insertar.





### Valores devueltos

No se retorna ningún valor.

# SplDoublyLinkedList::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::rewind — Rebobina el iterador hasta el inicio

### Descripción

public **SplDoublyLinkedList::rewind**(): [void](language.types.void.html)

Rebobina el iterador hasta el inicio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplDoublyLinkedList::serialize

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SplDoublyLinkedList::serialize — Serializa el almacenamiento

### Descripción

public **SplDoublyLinkedList::serialize**(): [string](#language.types.string)

Serializa el almacenamiento.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El string serializado.

### Ver también

    - [SplDoublyLinkedList::unserialize()](#spldoublylinkedlist.unserialize) - Deserializa el almacenamiento

# SplDoublyLinkedList::setIteratorMode

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::setIteratorMode — Establece el modo de iteración

### Descripción

public **SplDoublyLinkedList::setIteratorMode**([int](#language.types.integer) $mode): [int](#language.types.integer)

### Parámetros

     mode


       Hay dos conjuntos ortogonales de los modos que se pueden establecer:




       -
        La dirección de la iteración (ya sea uno o el otro):

         <li class="listitem">**[SplDoublyLinkedList::IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo)** (Estilo de pila)

         - **[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo)** (Estilo de cola)


       </li>
       -
        El comportamiento del iterador (ya sea uno o el otro):

         <li class="listitem">**[SplDoublyLinkedList::IT_MODE_DELETE](#spldoublylinkedlist.constants.it-mode-delete)** (Los elementos son eliminados por el iterador)

         - **[SplDoublyLinkedList::IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep)** (Los elementos son recorridos por el iterador)


       </li>



       El modo predeterminado es: **[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo)** | **[SplDoublyLinkedList::IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep)**




      **Advertencia**

        La dirección de iteración no se puede cambiar para las clases [SplStack](#class.splstack) y
        [SplQueue](#class.splqueue), siempre es **[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo)**.
        Si se intenta modificar, se producirá una [RuntimeException](#class.runtimeexception).






### Valores devueltos

Devuelve los diferentes modos y banderas que afectan a la iteración.

# SplDoublyLinkedList::shift

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::shift — Quita un nodo del inicio de la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::shift**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del nodo a quitar.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplDoublyLinkedList::top

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::top — Examina el nodo del final de la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::top**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del último nodo.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplDoublyLinkedList::unserialize

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SplDoublyLinkedList::unserialize — Deserializa el almacenamiento

### Descripción

public **SplDoublyLinkedList::unserialize**([string](#language.types.string) $data): [void](language.types.void.html)

Deserializa el almacenamiento, desde [SplDoublyLinkedList::serialize()](#spldoublylinkedlist.serialize).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      Es string serializada.


### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [SplDoublyLinkedList::serialize()](#spldoublylinkedlist.serialize) - Serializa el almacenamiento

# SplDoublyLinkedList::unshift

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::unshift — Antepone un elemento a la lista doblemente enlazada

### Descripción

public **SplDoublyLinkedList::unshift**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Antepone el valor dado por value al inicio de la lista doblemente enlazada.

### Parámetros

     value


       El valor a anteponer.





### Valores devueltos

No se retorna ningún valor.

# SplDoublyLinkedList::valid

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplDoublyLinkedList::valid — Comprueba si la lista doblemente enlazada contiene más nodos

### Descripción

public **SplDoublyLinkedList::valid**(): [bool](#language.types.boolean)

Comprueba si la lista doblemente enlazada contiene más nodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la lista doblemente enlazada contiene más nodos, o **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [SplDoublyLinkedList::add](#spldoublylinkedlist.add) — Añadir/insertar un nuevo valor en el índice especificado
- [SplDoublyLinkedList::bottom](#spldoublylinkedlist.bottom) — Examinar el nodo del comienzo de la lista doblemente enlazada
- [SplDoublyLinkedList::count](#spldoublylinkedlist.count) — Cuenta el número de elementos de la lista doblemente enlazada
- [SplDoublyLinkedList::current](#spldoublylinkedlist.current) — Devuelve la entrada actual del array
- [SplDoublyLinkedList::getIteratorMode](#spldoublylinkedlist.getiteratormode) — Devuelve el modo de iteración
- [SplDoublyLinkedList::isEmpty](#spldoublylinkedlist.isempty) — Comprueba si la lista doblemente enlazada está vacía
- [SplDoublyLinkedList::key](#spldoublylinkedlist.key) — Devuelve el índice del nodo actual
- [SplDoublyLinkedList::next](#spldoublylinkedlist.next) — Avanza a la siguiente entrada
- [SplDoublyLinkedList::offsetExists](#spldoublylinkedlist.offsetexists) — Devuelve si el índice solicitado existe
- [SplDoublyLinkedList::offsetGet](#spldoublylinkedlist.offsetget) — Devuelve el valor del índice específicado
- [SplDoublyLinkedList::offsetSet](#spldoublylinkedlist.offsetset) — Establece el valor del índice específicado
- [SplDoublyLinkedList::offsetUnset](#spldoublylinkedlist.offsetunset) — Borra el valor de el índice específicado
- [SplDoublyLinkedList::pop](#spldoublylinkedlist.pop) — Extrae un nodo del final de la lista doblementa enlazada
- [SplDoublyLinkedList::prev](#spldoublylinkedlist.prev) — Retrocede a la entrada anterior
- [SplDoublyLinkedList::push](#spldoublylinkedlist.push) — Inserta un elemento al final de la lista doblemente enlazada
- [SplDoublyLinkedList::rewind](#spldoublylinkedlist.rewind) — Rebobina el iterador hasta el inicio
- [SplDoublyLinkedList::serialize](#spldoublylinkedlist.serialize) — Serializa el almacenamiento
- [SplDoublyLinkedList::setIteratorMode](#spldoublylinkedlist.setiteratormode) — Establece el modo de iteración
- [SplDoublyLinkedList::shift](#spldoublylinkedlist.shift) — Quita un nodo del inicio de la lista doblemente enlazada
- [SplDoublyLinkedList::top](#spldoublylinkedlist.top) — Examina el nodo del final de la lista doblemente enlazada
- [SplDoublyLinkedList::unserialize](#spldoublylinkedlist.unserialize) — Deserializa el almacenamiento
- [SplDoublyLinkedList::unshift](#spldoublylinkedlist.unshift) — Antepone un elemento a la lista doblemente enlazada
- [SplDoublyLinkedList::valid](#spldoublylinkedlist.valid) — Comprueba si la lista doblemente enlazada contiene más nodos

# La clase SplStack

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplStack proporciona la funcionalidad principal de una pila implementada mediante una
    lista doblemente enlazada estableciendo el modo iterador a **[SplDoublyLinkedList::IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo)**.

## Sinopsis de la Clase

     class **SplStack**



     extends
      [SplDoublyLinkedList](#class.spldoublylinkedlist)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [SplDoublyLinkedList::IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo);

public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo);
public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_DELETE](#spldoublylinkedlist.constants.it-mode-delete);
public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep);

    /* Métodos heredados */

public [SplDoublyLinkedList::add](#spldoublylinkedlist.add)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::bottom](#spldoublylinkedlist.bottom)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::count](#spldoublylinkedlist.count)(): [int](#language.types.integer)
public [SplDoublyLinkedList::current](#spldoublylinkedlist.current)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::getIteratorMode](#spldoublylinkedlist.getiteratormode)(): [int](#language.types.integer)
public [SplDoublyLinkedList::isEmpty](#spldoublylinkedlist.isempty)(): [bool](#language.types.boolean)
public [SplDoublyLinkedList::key](#spldoublylinkedlist.key)(): [int](#language.types.integer)
public [SplDoublyLinkedList::next](#spldoublylinkedlist.next)(): [void](language.types.void.html)
public [SplDoublyLinkedList::offsetExists](#spldoublylinkedlist.offsetexists)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [SplDoublyLinkedList::offsetGet](#spldoublylinkedlist.offsetget)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::offsetSet](#spldoublylinkedlist.offsetset)([?](#language.types.null)[int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::offsetUnset](#spldoublylinkedlist.offsetunset)([int](#language.types.integer) $index): [void](language.types.void.html)
public [SplDoublyLinkedList::pop](#spldoublylinkedlist.pop)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::prev](#spldoublylinkedlist.prev)(): [void](language.types.void.html)
public [SplDoublyLinkedList::push](#spldoublylinkedlist.push)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::rewind](#spldoublylinkedlist.rewind)(): [void](language.types.void.html)
public [SplDoublyLinkedList::serialize](#spldoublylinkedlist.serialize)(): [string](#language.types.string)
public [SplDoublyLinkedList::setIteratorMode](#spldoublylinkedlist.setiteratormode)([int](#language.types.integer) $mode): [int](#language.types.integer)
public [SplDoublyLinkedList::shift](#spldoublylinkedlist.shift)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::top](#spldoublylinkedlist.top)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::unserialize](#spldoublylinkedlist.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [SplDoublyLinkedList::unshift](#spldoublylinkedlist.unshift)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::valid](#spldoublylinkedlist.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

     **Ejemplo #1 Ejemplo de SplStack**




&lt;?php
$q = new SplStack();
$q[] = 1;
$q[] = 2;
$q[] = 3;
foreach ($q as $elem) {
echo $elem."\n";
}
?&gt;

     El ejemplo anterior mostrará:




3
2
1

# La clase SplQueue

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplQueue proporciona las principales funcionalidades de una cola implementada usando una lista doblemente enlazada al
    estableciendo el modo del iterador a **[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo)**.

## Sinopsis de la Clase

     class **SplQueue**



     extends
      [SplDoublyLinkedList](#class.spldoublylinkedlist)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [SplDoublyLinkedList::IT_MODE_LIFO](#spldoublylinkedlist.constants.it-mode-lifo);

public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_FIFO](#spldoublylinkedlist.constants.it-mode-fifo);
public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_DELETE](#spldoublylinkedlist.constants.it-mode-delete);
public
const
[int](#language.types.integer)
[SplDoublyLinkedList::IT_MODE_KEEP](#spldoublylinkedlist.constants.it-mode-keep);

    /* Métodos */

public [dequeue](#splqueue.dequeue)(): [mixed](#language.types.mixed)
public [enqueue](#splqueue.enqueue)([mixed](#language.types.mixed) $value): [void](language.types.void.html)

    /* Métodos heredados */
    public [SplDoublyLinkedList::add](#spldoublylinkedlist.add)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

public [SplDoublyLinkedList::bottom](#spldoublylinkedlist.bottom)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::count](#spldoublylinkedlist.count)(): [int](#language.types.integer)
public [SplDoublyLinkedList::current](#spldoublylinkedlist.current)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::getIteratorMode](#spldoublylinkedlist.getiteratormode)(): [int](#language.types.integer)
public [SplDoublyLinkedList::isEmpty](#spldoublylinkedlist.isempty)(): [bool](#language.types.boolean)
public [SplDoublyLinkedList::key](#spldoublylinkedlist.key)(): [int](#language.types.integer)
public [SplDoublyLinkedList::next](#spldoublylinkedlist.next)(): [void](language.types.void.html)
public [SplDoublyLinkedList::offsetExists](#spldoublylinkedlist.offsetexists)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [SplDoublyLinkedList::offsetGet](#spldoublylinkedlist.offsetget)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::offsetSet](#spldoublylinkedlist.offsetset)([?](#language.types.null)[int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::offsetUnset](#spldoublylinkedlist.offsetunset)([int](#language.types.integer) $index): [void](language.types.void.html)
public [SplDoublyLinkedList::pop](#spldoublylinkedlist.pop)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::prev](#spldoublylinkedlist.prev)(): [void](language.types.void.html)
public [SplDoublyLinkedList::push](#spldoublylinkedlist.push)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::rewind](#spldoublylinkedlist.rewind)(): [void](language.types.void.html)
public [SplDoublyLinkedList::serialize](#spldoublylinkedlist.serialize)(): [string](#language.types.string)
public [SplDoublyLinkedList::setIteratorMode](#spldoublylinkedlist.setiteratormode)([int](#language.types.integer) $mode): [int](#language.types.integer)
public [SplDoublyLinkedList::shift](#spldoublylinkedlist.shift)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::top](#spldoublylinkedlist.top)(): [mixed](#language.types.mixed)
public [SplDoublyLinkedList::unserialize](#spldoublylinkedlist.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [SplDoublyLinkedList::unshift](#spldoublylinkedlist.unshift)([mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [SplDoublyLinkedList::valid](#spldoublylinkedlist.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

     **Ejemplo #1 SplQueue** ejemplo




&lt;?php
$q = new SplQueue();
$q[] = 1;
$q[] = 2;
$q[] = 3;
foreach ($q as $elem) {
echo $elem."\n";
}
?&gt;

     El ejemplo anterior mostrará:





1
2
3

     **Ejemplo #2 Gestión eficiente de tareas con SplQueue**




&lt;?php
$q = new SplQueue();
$q-&gt;setIteratorMode(SplQueue::IT_MODE_DELETE);
// ... enqueue some tasks on the queue ...
// process them
foreach ($q as $task) {
// ... process $task ...
// add new tasks on the queue
$q[] = $newTask;
// ...
}
?&gt;

# SplQueue::dequeue

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplQueue::dequeue — Quita un nodo de la cola

### Descripción

public **SplQueue::dequeue**(): [mixed](#language.types.mixed)

Quita un value en la parte superior de la cola.

**Nota**:

    **SplQueue::dequeue()** es un alias de [SplDoublyLinkedList::shift()](#spldoublylinkedlist.shift).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de el nodo a quitar de la cola.

# SplQueue::enqueue

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplQueue::enqueue — Añade un elemento a la cola

### Descripción

public **SplQueue::enqueue**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Añadir un value al final de la cola.

**Nota**:

    **SplQueue::enqueue()** es un alias de [SplDoublyLinkedList::push()](#spldoublylinkedlist.push).

### Parámetros

     value


       El valor que se va a añadir.





### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [SplQueue::dequeue](#splqueue.dequeue) — Quita un nodo de la cola
- [SplQueue::enqueue](#splqueue.enqueue) — Añade un elemento a la cola

# La clase SplHeap

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplHeap proporciona la funcionalidad principal de un montículo.

## Sinopsis de la Clase

     abstract
     class **SplHeap**



     implements
      [Iterator](#class.iterator),

     [Countable](#class.countable) {

    /* Métodos */

protected [compare](#splheap.compare)([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)
public [count](#splheap.count)(): [int](#language.types.integer)
public [current](#splheap.current)(): [mixed](#language.types.mixed)
public [extract](#splheap.extract)(): [mixed](#language.types.mixed)
public [insert](#splheap.insert)([mixed](#language.types.mixed) $value): [true](#language.types.singleton)
public [isCorrupted](#splheap.iscorrupted)(): [bool](#language.types.boolean)
public [isEmpty](#splheap.isempty)(): [bool](#language.types.boolean)
public [key](#splheap.key)(): [int](#language.types.integer)
public [next](#splheap.next)(): [void](language.types.void.html)
public [recoverFromCorruption](#splheap.recoverfromcorruption)(): [true](#language.types.singleton)
public [rewind](#splheap.rewind)(): [void](language.types.void.html)
public [top](#splheap.top)(): [mixed](#language.types.mixed)
public [valid](#splheap.valid)(): [bool](#language.types.boolean)

}

# SplHeap::compare

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::compare — Compara elementos con el fin de colocarlos correctamente en el montón en la parte de arriba

### Descripción

protected **SplHeap::compare**([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

Comparar value1 con value2.

**Advertencia**

    Lanza una excepción en **SplHeap::compare()** que puede
    dañar el montón y colocarlo en un estado bloqueado. Se puede desbloquear llamando a
    [SplHeap::recoverFromCorruption()](#splheap.recoverfromcorruption).
    Sin embargo, algunos elementos podrían no ser colocados correctamente y por lo tanto pueden
    romper la propiedad del montón.

### Parámetros

     value1


       El valor de el primer nodo a ser comparado.






     value2


       El valor de el segundo nodo a ser comparado.





### Valores devueltos

El resultado de la comparación, integer positivo si value1 es mayor que value2, 0 si son iguales, en caso contrario integer negativo.

**Nota**:

    No es recomendado tener múltiples elementos con el mismo valor en el montón. Estos terminarán con una posición arbitraria relativa.

# SplHeap::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::count — Cuenta el número de elementos en el montón

### Descripción

public **SplHeap::count**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de elementos en el montón.

# SplHeap::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::current — Devuelve el nodo actual señalado por el iterador

### Descripción

public **SplHeap::current**(): [mixed](#language.types.mixed)

Obtiene el nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de el nodo actual.

# SplHeap::extract

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::extract — Extrae un nodo de la parte superior del montón

### Descripción

public **SplHeap::extract**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del nodo a ser extraído.

### Errores/Excepciones

Lanza una excepción [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplHeap::insert

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::insert — Inserta un elemento en el montón

### Descripción

public **SplHeap::insert**([mixed](#language.types.mixed) $value): [true](#language.types.singleton)

Inserta el valor value en el montón.

### Parámetros

     value


       El valor a insertar.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **SplHeap::insert()**
       ahora tiene un tipo de retorno provisional de tipo [true](#language.types.singleton).



# SplHeap::isCorrupted

(PHP 7, PHP 8)

SplHeap::isCorrupted — Indica si el montículo está en un estado corrompido

### Descripción

public **SplHeap::isCorrupted**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el montículo está corrompido, **[false](#constant.false)** en caso contrario.

# SplHeap::isEmpty

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::isEmpty — Comprueba si el montón actual está vacío

### Descripción

public **SplHeap::isEmpty**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si el montón está vacío.

# SplHeap::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::key — Devuelve el índice de el nodo actual

### Descripción

public **SplHeap::key**(): [int](#language.types.integer)

Esta función devuelve el índice de el nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El índice de el nodo actual.

# SplHeap::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::next — Avanzar al siguiente nodo

### Descripción

public **SplHeap::next**(): [void](language.types.void.html)

Avanzar al siguiente nodo. Borrará el nodo superior del montón.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplHeap::recoverFromCorruption

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::recoverFromCorruption — Repara un montón

### Descripción

public **SplHeap::recoverFromCorruption**(): [true](#language.types.singleton)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       [SplHeap::insert()](#splheap.insert)
       posee ahora un tipo de retorno provisional de tipo [true](#language.types.singleton).



# SplHeap::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::rewind — Rebobina el iterador al comienzo

### Descripción

public **SplHeap::rewind**(): [void](language.types.void.html)

Esto rebobina el iterador hasta el inicio. Esto es un no-op para los montones
ya que el iterador es virtual y, de hecho, nunca se mueve desde la parte superior de la pila.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplHeap::top

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::top — Observar el nodo desde el comienzo del montón

### Descripción

public **SplHeap::top**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de el nodo del comienzo.

### Errores/Excepciones

Lanza una excepción [RuntimeException](#class.runtimeexception) cuando la estructura de datos está vacía.

# SplHeap::valid

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplHeap::valid — Comprueba si el montón contiene más nodos

### Descripción

public **SplHeap::valid**(): [bool](#language.types.boolean)

Comprueba si el montón contiene más nodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el montón contiene más nodos, en caso contrario **[false](#constant.false)**.

## Tabla de contenidos

- [SplHeap::compare](#splheap.compare) — Compara elementos con el fin de colocarlos correctamente en el montón en la parte de arriba
- [SplHeap::count](#splheap.count) — Cuenta el número de elementos en el montón
- [SplHeap::current](#splheap.current) — Devuelve el nodo actual señalado por el iterador
- [SplHeap::extract](#splheap.extract) — Extrae un nodo de la parte superior del montón
- [SplHeap::insert](#splheap.insert) — Inserta un elemento en el montón
- [SplHeap::isCorrupted](#splheap.iscorrupted) — Indica si el montículo está en un estado corrompido
- [SplHeap::isEmpty](#splheap.isempty) — Comprueba si el montón actual está vacío
- [SplHeap::key](#splheap.key) — Devuelve el índice de el nodo actual
- [SplHeap::next](#splheap.next) — Avanzar al siguiente nodo
- [SplHeap::recoverFromCorruption](#splheap.recoverfromcorruption) — Repara un montón
- [SplHeap::rewind](#splheap.rewind) — Rebobina el iterador al comienzo
- [SplHeap::top](#splheap.top) — Observar el nodo desde el comienzo del montón
- [SplHeap::valid](#splheap.valid) — Comprueba si el montón contiene más nodos

# La clase SplMaxHeap

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplMaxHeap proporciona la funcionalidad principal de un montículo, manteniendo el máximo en la parte superior.

## Sinopsis de la Clase

     class **SplMaxHeap**



     extends
      [SplHeap](#class.splheap)
     {

    /* Métodos */

protected [compare](#splmaxheap.compare)([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

    /* Métodos heredados */
    protected [SplHeap::compare](#splheap.compare)([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

public [SplHeap::count](#splheap.count)(): [int](#language.types.integer)
public [SplHeap::current](#splheap.current)(): [mixed](#language.types.mixed)
public [SplHeap::extract](#splheap.extract)(): [mixed](#language.types.mixed)
public [SplHeap::insert](#splheap.insert)([mixed](#language.types.mixed) $value): [true](#language.types.singleton)
public [SplHeap::isCorrupted](#splheap.iscorrupted)(): [bool](#language.types.boolean)
public [SplHeap::isEmpty](#splheap.isempty)(): [bool](#language.types.boolean)
public [SplHeap::key](#splheap.key)(): [int](#language.types.integer)
public [SplHeap::next](#splheap.next)(): [void](language.types.void.html)
public [SplHeap::recoverFromCorruption](#splheap.recoverfromcorruption)(): [true](#language.types.singleton)
public [SplHeap::rewind](#splheap.rewind)(): [void](language.types.void.html)
public [SplHeap::top](#splheap.top)(): [mixed](#language.types.mixed)
public [SplHeap::valid](#splheap.valid)(): [bool](#language.types.boolean)

}

# SplMaxHeap::compare

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplMaxHeap::compare — Compara elementos con el fin de colocarlos correctamente en el montón en la parte de arriba

### Descripción

protected **SplMaxHeap::compare**([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

Comparar value1 con value2.

### Parámetros

     value1


       El valor de el primer nodo a ser comparado.






     value2


       El valor de el segundo nodo a ser comparado.





### Valores devueltos

El resultado de la comparación, un integer positivo si value1 es mayor que value2, 0 si son iguales, en caso contrario un integer negativo.

**Nota**:

    No es recomendado tener múltiples elementos con el mismo valor en el montón. Estos terminarán con una posición arbitraria relativa.

## Tabla de contenidos

- [SplMaxHeap::compare](#splmaxheap.compare) — Compara elementos con el fin de colocarlos correctamente en el montón en la parte de arriba

# La clase SplMinHeap

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplMinHeap proporciona la funcionalidad principal de un montículo, manteniendo el mínimo en la parte superior.

## Sinopsis de la Clase

     class **SplMinHeap**



     extends
      [SplHeap](#class.splheap)
     {

    /* Métodos */

protected [compare](#splminheap.compare)([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

    /* Métodos heredados */
    protected [SplHeap::compare](#splheap.compare)([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

public [SplHeap::count](#splheap.count)(): [int](#language.types.integer)
public [SplHeap::current](#splheap.current)(): [mixed](#language.types.mixed)
public [SplHeap::extract](#splheap.extract)(): [mixed](#language.types.mixed)
public [SplHeap::insert](#splheap.insert)([mixed](#language.types.mixed) $value): [true](#language.types.singleton)
public [SplHeap::isCorrupted](#splheap.iscorrupted)(): [bool](#language.types.boolean)
public [SplHeap::isEmpty](#splheap.isempty)(): [bool](#language.types.boolean)
public [SplHeap::key](#splheap.key)(): [int](#language.types.integer)
public [SplHeap::next](#splheap.next)(): [void](language.types.void.html)
public [SplHeap::recoverFromCorruption](#splheap.recoverfromcorruption)(): [true](#language.types.singleton)
public [SplHeap::rewind](#splheap.rewind)(): [void](language.types.void.html)
public [SplHeap::top](#splheap.top)(): [mixed](#language.types.mixed)
public [SplHeap::valid](#splheap.valid)(): [bool](#language.types.boolean)

}

# SplMinHeap::compare

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplMinHeap::compare — Comparar elementos con el fin de colocarlos correctamente en el montón em la parte de arriba

### Descripción

protected **SplMinHeap::compare**([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)

Compara value1 con value2.

### Parámetros

     value1


       El valor de el primer nodo a ser comparado.






     value2


       El valor de el segundo nodo a ser comparado.





### Valores devueltos

El resultado de la comparación, un integer positivo si value1 es menor que value2, 0 si son iguales, en caso contrario integer negativo.

**Nota**:

    No es recomendable tener múltiples elementos con el mismo valor en el montón.
    Having multiple elements with the same value in a Heap is not recommended. Estos terminarán en una por sición arbitraria relativa.

## Tabla de contenidos

- [SplMinHeap::compare](#splminheap.compare) — Comparar elementos con el fin de colocarlos correctamente en el montón em la parte de arriba

# La clasa SplPriorityQueue

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase SplPriorityQueue proporciona la funcionalidad principal de una
    cola de prioridad, implementada mediante un montículo máximo.

**Nota**:

     El orden de los elementos con idéntica prioridad es *indefinido*.
     Puede diferir del orden en que se han insertado.

## Sinopsis de la Clase

     class **SplPriorityQueue**



     implements
      [Iterator](#class.iterator),

     [Countable](#class.countable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [EXTR_BOTH](#splpriorityqueue.constants.extr-both);

    public
     const
     [int](#language.types.integer)
      [EXTR_PRIORITY](#splpriorityqueue.constants.extr-priority);

    public
     const
     [int](#language.types.integer)
      [EXTR_DATA](#splpriorityqueue.constants.extr-data);


    /* Métodos */

public [compare](#splpriorityqueue.compare)([mixed](#language.types.mixed) $priority1, [mixed](#language.types.mixed) $priority2): [int](#language.types.integer)
public [count](#splpriorityqueue.count)(): [int](#language.types.integer)
public [current](#splpriorityqueue.current)(): [mixed](#language.types.mixed)
public [extract](#splpriorityqueue.extract)(): [mixed](#language.types.mixed)
public [getExtractFlags](#splpriorityqueue.getextractflags)(): [int](#language.types.integer)
public [insert](#splpriorityqueue.insert)([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $priority): [true](#language.types.singleton)
public [isCorrupted](#splpriorityqueue.iscorrupted)(): [bool](#language.types.boolean)
public [isEmpty](#splpriorityqueue.isempty)(): [bool](#language.types.boolean)
public [key](#splpriorityqueue.key)(): [int](#language.types.integer)
public [next](#splpriorityqueue.next)(): [void](language.types.void.html)
public [recoverFromCorruption](#splpriorityqueue.recoverfromcorruption)(): [true](#language.types.singleton)
public [rewind](#splpriorityqueue.rewind)(): [void](language.types.void.html)
public [setExtractFlags](#splpriorityqueue.setextractflags)([int](#language.types.integer) $flags): [int](#language.types.integer)
public [top](#splpriorityqueue.top)(): [mixed](#language.types.mixed)
public [valid](#splpriorityqueue.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[SplPriorityQueue::EXTR_BOTH](#splpriorityqueue.constants.extr-both)**







     **[SplPriorityQueue::EXTR_PRIORITY](#splpriorityqueue.constants.extr-priority)**







     **[SplPriorityQueue::EXTR_DATA](#splpriorityqueue.constants.extr-data)**






# SplPriorityQueue::compare

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::compare — Comparar las prioridades con el fin de colocar los elementos correctamente en el montón, mientras que tamizar arriba

### Descripción

public **SplPriorityQueue::compare**([mixed](#language.types.mixed) $priority1, [mixed](#language.types.mixed) $priority2): [int](#language.types.integer)

Compare priority1 con priority2.

### Parámetros

     priority1


       La prioridad del primer nodo que se compara.






     priority2


       La prioridad del segundo nodo que se compara.





### Valores devueltos

Resultados de la comparación, entero positivo si priority1es mayor que priority2 , O si son iguales, entero negativo lo contrario.

**Nota**:

    Varios elementos con la misma prioridad que se quita de la cola sin ningún orden en particular.

# SplPriorityQueue::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::count — Cuenta el número de elementos en la cola

### Descripción

public **SplPriorityQueue::count**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de elementos en la cola.

# SplPriorityQueue::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::current — Volver nodo actual que apunta el iterador

### Descripción

public **SplPriorityQueue::current**(): [mixed](#language.types.mixed)

Obtener el nodo de estructura de datos actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de prioridad (o ambos) del nodo actual, dependiendo de la bandera extracto.

# SplPriorityQueue::extract

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::extract — Extrae un nodo de la parte superior del montículo y desplaza hacia arriba

### Descripción

public **SplPriorityQueue::extract**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor o prioridad (o ambos) del nodo extraído, dependiendo de la bandera de extracción.

# SplPriorityQueue::getExtractFlags

(PHP 7, PHP 8)

SplPriorityQueue::getExtractFlags — Obtiene los flag de extracción

### Descripción

public **SplPriorityQueue::getExtractFlags**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los flag de extracción.

# SplPriorityQueue::insert

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::insert — Inserta un elemento en la cola

### Descripción

public **SplPriorityQueue::insert**([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) $priority): [true](#language.types.singleton)

Inserta el valor value con la prioridad
priority en la cola.

### Parámetros

     value


       El valor a insertar.






     priority


       La prioridad asociada.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **SplPriorityQueue::insert()**
       posee ahora un retorno provisional de tipo [true](#language.types.singleton).



# SplPriorityQueue::isCorrupted

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::isCorrupted — Indica si la cola de prioridad está en un estado corrompido

### Descripción

public **SplPriorityQueue::isCorrupted**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la cola de prioridad está corrompida, **[false](#constant.false)** en caso contrario.

# SplPriorityQueue::isEmpty

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::isEmpty — Comprueba si la cola está vacía

### Descripción

public **SplPriorityQueue::isEmpty**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Indica si la cola está vacía.

# SplPriorityQueue::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::key — Devuelve el índice del nodo actual

### Descripción

public **SplPriorityQueue::key**(): [int](#language.types.integer)

Este método devuelve el índice del nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El índice el nodo actual.

# SplPriorityQueue::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::next — Pasar a la siguiente nodo

### Descripción

public **SplPriorityQueue::next**(): [void](language.types.void.html)

Extrae el nodo superior de la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplPriorityQueue::recoverFromCorruption

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::recoverFromCorruption — Repara una cola

### Descripción

public **SplPriorityQueue::recoverFromCorruption**(): [true](#language.types.singleton)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **SplPriorityQueue::recoverFromCorruption()**
       posee ahora un tipo de retorno provisional de tipo [true](#language.types.singleton).



# SplPriorityQueue::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::rewind — Rebobinar iterador de vuelta al inicio (no-op)

### Descripción

public **SplPriorityQueue::rewind**(): [void](language.types.void.html)

Este rebobina el iterador al comienzo. Se trata de un no-op de montones
como el iterador es virtual y de hecho nunca se mueve de arriba del montón.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplPriorityQueue::setExtractFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::setExtractFlags — Establece el modo de extracción

### Descripción

public **SplPriorityQueue::setExtractFlags**([int](#language.types.integer) $flags): [int](#language.types.integer)

### Parámetros

     flags


       Define lo que se extrae por [SplPriorityQueue::current()](#splpriorityqueue.current),
       [SplPriorityQueue::top()](#splpriorityqueue.top) y
       [SplPriorityQueue::extract()](#splpriorityqueue.extract).




       - **[SplPriorityQueue::EXTR_DATA](#splpriorityqueue.constants.extr-data)** (0x00000001): Extraer los datos

       - **[SplPriorityQueue::EXTR_PRIORITY](#splpriorityqueue.constants.extr-priority)** (0x00000002): Extraer la prioridad

       - **[SplPriorityQueue::EXTR_BOTH](#splpriorityqueue.constants.extr-both)** (0x00000003): Extraer un array con ambos



       El modo por omisión es **[SplPriorityQueue::EXTR_DATA](#splpriorityqueue.constants.extr-data)**.





### Valores devueltos

Devuelve las banderas de extracción.

# SplPriorityQueue::top

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::top — Mira en el nodo de la parte superior de la cola

### Descripción

public **SplPriorityQueue::top**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor o prioridad (o ambas) del nodo superior, dependiendo de las flags.

# SplPriorityQueue::valid

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplPriorityQueue::valid — Comprobar si la cola contiene más nodos

### Descripción

public **SplPriorityQueue::valid**(): [bool](#language.types.boolean)

Comprueba si la cola contiene más nodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la cola los contiene y mas nodos, **[false](#constant.false)** de lo contrario.

## Tabla de contenidos

- [SplPriorityQueue::compare](#splpriorityqueue.compare) — Comparar las prioridades con el fin de colocar los elementos correctamente en el montón, mientras que tamizar arriba
- [SplPriorityQueue::count](#splpriorityqueue.count) — Cuenta el número de elementos en la cola
- [SplPriorityQueue::current](#splpriorityqueue.current) — Volver nodo actual que apunta el iterador
- [SplPriorityQueue::extract](#splpriorityqueue.extract) — Extrae un nodo de la parte superior del montículo y desplaza hacia arriba
- [SplPriorityQueue::getExtractFlags](#splpriorityqueue.getextractflags) — Obtiene los flag de extracción
- [SplPriorityQueue::insert](#splpriorityqueue.insert) — Inserta un elemento en la cola
- [SplPriorityQueue::isCorrupted](#splpriorityqueue.iscorrupted) — Indica si la cola de prioridad está en un estado corrompido
- [SplPriorityQueue::isEmpty](#splpriorityqueue.isempty) — Comprueba si la cola está vacía
- [SplPriorityQueue::key](#splpriorityqueue.key) — Devuelve el índice del nodo actual
- [SplPriorityQueue::next](#splpriorityqueue.next) — Pasar a la siguiente nodo
- [SplPriorityQueue::recoverFromCorruption](#splpriorityqueue.recoverfromcorruption) — Repara una cola
- [SplPriorityQueue::rewind](#splpriorityqueue.rewind) — Rebobinar iterador de vuelta al inicio (no-op)
- [SplPriorityQueue::setExtractFlags](#splpriorityqueue.setextractflags) — Establece el modo de extracción
- [SplPriorityQueue::top](#splpriorityqueue.top) — Mira en el nodo de la parte superior de la cola
- [SplPriorityQueue::valid](#splpriorityqueue.valid) — Comprobar si la cola contiene más nodos

# La clase SplFixedArray

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    la clase SplFixedArray proporciona la funcionalidad principal de un array. La
    principal diferencia entre SplFixedArray y un array normal de PHP es que
    la clase SplFixedArray es de longitud fija y sólo permite enteros dentro del
    rango de índices. La ventaja es que usa menos memoría que un
    [array](#language.types.array) estándar.

## Sinopsis de la Clase

     class **SplFixedArray**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [ArrayAccess](#class.arrayaccess),

     [Countable](#class.countable),

     [JsonSerializable](#class.jsonserializable) {

    /* Métodos */

public [\_\_construct](#splfixedarray.construct)([int](#language.types.integer) $size = 0)

    public [count](#splfixedarray.count)(): [int](#language.types.integer)

public [current](#splfixedarray.current)(): [mixed](#language.types.mixed)
public static [fromArray](#splfixedarray.fromarray)([array](#language.types.array) $array, [bool](#language.types.boolean) $preserveKeys = **[true](#constant.true)**): [SplFixedArray](#class.splfixedarray)
public [getIterator](#splfixedarray.getiterator)(): [Iterator](#class.iterator)
public [getSize](#splfixedarray.getsize)(): [int](#language.types.integer)
public [jsonSerialize](#splfixedarray.jsonserialize)(): [array](#language.types.array)
public [key](#splfixedarray.key)(): [int](#language.types.integer)
public [next](#splfixedarray.next)(): [void](language.types.void.html)
public [offsetExists](#splfixedarray.offsetexists)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [offsetGet](#splfixedarray.offsetget)([int](#language.types.integer) $index): [mixed](#language.types.mixed)
public [offsetSet](#splfixedarray.offsetset)([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#splfixedarray.offsetunset)([int](#language.types.integer) $index): [void](language.types.void.html)
public [rewind](#splfixedarray.rewind)(): [void](language.types.void.html)
public [\_\_serialize](#splfixedarray.serialize)(): [array](#language.types.array)
public [setSize](#splfixedarray.setsize)([int](#language.types.integer) $size): [true](#language.types.singleton)
public [toArray](#splfixedarray.toarray)(): [array](#language.types.array)
public [\_\_unserialize](#splfixedarray.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)
public [valid](#splfixedarray.valid)(): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [\_\_wakeup](#splfixedarray.wakeup)(): [void](language.types.void.html)

}

## Historial de cambios

       Versión
       Descripción






       8.2.0

        The [SplFixedArray::__serialize()](#splfixedarray.serialize) and
        [SplFixedArray::__unserialize()](#splfixedarray.unserialize)
        magic methods have been added to **SplFixedArray**.




       8.1.0

        **SplFixedArray** implements
        [JsonSerializable](#class.jsonserializable) now.




       8.0.0

        **SplFixedArray** implements
        [IteratorAggregate](#class.iteratoraggregate) now.
        Previously, [Iterator](#class.iterator) was implemented instead.





## Ejemplos

     **Ejemplo #1 Ejemplo de uso SplFixedArray**




&lt;?php
// Inicializar el array con una longitud fija
$array = new SplFixedArray(5);

$array[1] = 2;
$array[4] = "foo";

var_dump($array[0]); // NULL
var_dump($array[1]); // int(2)

var_dump($array["4"]); // string(3) "foo"

// Aumentar el tamaño del array a 10
$array-&gt;setSize(10);

$array[9] = "asdf";

// Reducir el tamaño de un array a 2
$array-&gt;setSize(2);

// Las siguientes líneas lanzan una RuntimeException: Index invalid or out of range (Índice inválido o fuera de rango)
try {
var_dump($array["non-numeric"]);
} catch(RuntimeException $re) {
    echo "RuntimeException: ".$re-&gt;getMessage()."\n";
}

try {
var_dump($array[-1]);
} catch(RuntimeException $re) {
    echo "RuntimeException: ".$re-&gt;getMessage()."\n";
}

try {
var_dump($array[5]);
} catch(RuntimeException $re) {
    echo "RuntimeException: ".$re-&gt;getMessage()."\n";
}
?&gt;

     El ejemplo anterior mostrará:




NULL
int(2)
string(3) "foo"
RuntimeException: Index invalid or out of range
RuntimeException: Index invalid or out of range
RuntimeException: Index invalid or out of range

# SplFixedArray::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::\_\_construct — Construye un nuevo [SplFixedArray](#class.splfixedarray)

### Descripción

public **SplFixedArray::\_\_construct**([int](#language.types.integer) $size = 0)

Inicializa un array fijo con un número de valores **[null](#constant.null)**
iguales al argumento size.

### Parámetros

     size


       El tamaño del array de tamaño fijo.
       Espera un número comprendido entre 0 y
       **[PHP_INT_MAX](#constant.php-int-max)**.





### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror)
cuando size es negativo.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora lanza una excepción [ValueError](#class.valueerror) cuando size es negativo.
        Anteriormente, se lanzaba una [InvalidArgumentException](#class.invalidargumentexception).





### Ejemplos

    **Ejemplo #1 Ejemplo con SplFixedArray::__construct()**

&lt;?php
$array = new SplFixedArray(5);

$array[1] = 2;
$array[4] = "foo";

foreach($array as $v) {
  var_dump($v);
}
?&gt;

    El ejemplo anterior mostrará:

NULL
int(2)
NULL
NULL
string(3) "foo"

# SplFixedArray::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::count — Devuelve el tamaño del array

### Descripción

public **SplFixedArray::count**(): [int](#language.types.integer)

Devuelve el tamaño del array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño del array.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFixedArray::count()**

&lt;?php
$array = new SplFixedArray(5);
echo $array-&gt;count() . "\n";
echo count($array) . "\n";
?&gt;

    El ejemplo anterior mostrará:

5
5

### Notas

**Nota**:

    Este método es funcionalmente equivalente al método [SplFixedArray::getSize()](#splfixedarray.getsize).

**Nota**:

    El cómputo de elementos es siempre igual al tamaño del conjunto ya que todos los valores son inicialmente
    inicializados con **[null](#constant.null)**.

### Ver también

- [SplFixedArray::getSize()](#splfixedarray.getsize) - Obtiene el tamaño de el array

# SplFixedArray::current

(PHP 5 &gt;= 5.3.0, PHP 7)

SplFixedArray::current — Devuelve la entrada del array actual

### Descripción

public **SplFixedArray::current**(): [mixed](#language.types.mixed)

Obtiene la entrada del elemento array actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del elemento actual.

### Errores/Excepciones

Lanza una excepción de tipo [RuntimeException](#class.runtimeexception) cuando el puntero interno del array apunta a un
índice no válido o está fuera de los límites.

# SplFixedArray::fromArray

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::fromArray — Importa un array PHP en una instancia [SplFixedArray](#class.splfixedarray)

### Descripción

public static **SplFixedArray::fromArray**([array](#language.types.array) $array, [bool](#language.types.boolean) $preserveKeys = **[true](#constant.true)**): [SplFixedArray](#class.splfixedarray)

Importa un array PHP
en una nueva instancia [SplFixedArray](#class.splfixedarray).

### Parámetros

     array


       El array a importar.






     preserveKeys


       Intenta guardar los índices numéricos usados en el array original.





### Valores devueltos

Devuelve una instancia de [SplFixedArray](#class.splfixedarray)
conteniendo el contenido de el array.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFixedArray::fromArray()**

&lt;?php
$fa = SplFixedArray::fromArray(array(1 =&gt; 1, 0 =&gt; 2, 3 =&gt; 3));

var_dump($fa);

$fa = SplFixedArray::fromArray(array(1 =&gt; 1, 0 =&gt; 2, 3 =&gt; 3), false);

var_dump($fa);
?&gt;

    El ejemplo anterior mostrará:

object(SplFixedArray)#1 (4) {
[0]=&gt;
int(2)
[1]=&gt;
int(1)
[2]=&gt;
NULL
[3]=&gt;
int(3)
}
object(SplFixedArray)#2 (3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# SplFixedArray::getIterator

(PHP 8)

SplFixedArray::getIterator — Devuelve el iterador para recorrer el array

### Descripción

public **SplFixedArray::getIterator**(): [Iterator](#class.iterator)

Devuelve el iterador para recorrer el array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de un objeto que implementa [Iterator](#class.iterator) para recorrer el array.

# SplFixedArray::getSize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::getSize — Obtiene el tamaño de el array

### Descripción

public **SplFixedArray::getSize**(): [int](#language.types.integer)

Obtiener el tamaño del array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño del array, como un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFixedArray::getSize()**

&lt;?php
$array = new SplFixedArray(5);
echo $array-&gt;getSize()."\n";
$array-&gt;setSize(10);
echo $array-&gt;getSize()."\n";
?&gt;

    El ejemplo anterior mostrará:

5
10

### Notas

**Nota**:

    Este método es funcionalmente equivalente al método [SplFixedArray::count()](#splfixedarray.count)

### Ver también

- [SplFixedArray::count()](#splfixedarray.count) - Devuelve el tamaño del array

# SplFixedArray::jsonSerialize

(PHP 8 &gt;= 8.1.0)

SplFixedArray::jsonSerialize — Devuelve una representación que puede ser convertida a JSON

### Descripción

public **SplFixedArray::jsonSerialize**(): [array](#language.types.array)

Serializa el array en un valor que puede ser serializado de forma nativa por
[json_encode()](#function.json-encode).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de datos que puede ser serializado por [json_encode()](#function.json-encode),
que es un valor de cualquier tipo excepto una [resource](#language.types.resource).

# SplFixedArray::key

(PHP 5 &gt;= 5.3.0, PHP 7)

SplFixedArray::key — Devuelve los índices del array actual

### Descripción

public **SplFixedArray::key**(): [int](#language.types.integer)

Devuelve los índice del array actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los índices del array actual.

# SplFixedArray::next

(PHP 5 &gt;= 5.3.0, PHP 7)

SplFixedArray::next — Mover a la siguiente entrada

### Descripción

public **SplFixedArray::next**(): [void](language.types.void.html)

Mover el iterador a la siguiente entrada en el array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplFixedArray::offsetExists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::offsetExists — Devuelve si el índice solicitado existe

### Descripción

public **SplFixedArray::offsetExists**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Comprueba si el índice index solicitado
existe.

### Parámetros

     index


       El índice a ser comprobado.





### Valores devueltos

**[true](#constant.true)** si el indice index existe, en caso contrario **[false](#constant.false)**.

# SplFixedArray::offsetGet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::offsetGet — Devuelve el valor en el índice específicado

### Descripción

public **SplFixedArray::offsetGet**([int](#language.types.integer) $index): [mixed](#language.types.mixed)

Devuelve el valor en el índice index específicado.

### Parámetros

     index


       El índice con el valor.





### Valores devueltos

El valor específicado en index.

### Errores/Excepciones

Lanza una excepción de tipo [RuntimeException](#class.runtimeexception) cuando index está fuera
del tamaño definido del array o cuando index no se puede procesar como un entero.

# SplFixedArray::offsetSet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::offsetSet — Establece un nuevo valor para el índice específicado

### Descripción

public **SplFixedArray::offsetSet**([int](#language.types.integer) $index, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Establece el valor en el index específicado en value.

### Parámetros

     index


       El índice a ser establecido.






     value


       El nuevo valor para index.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una excepción de tipo [RuntimeException](#class.runtimeexception) cuando index está fuera
del tamaño definido del array o cuando index no se puede procesar como un entero.

# SplFixedArray::offsetUnset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::offsetUnset — Destruye el valor en el índice específicado

### Descripción

public **SplFixedArray::offsetUnset**([int](#language.types.integer) $index): [void](language.types.void.html)

Destruye el valor en el índice específicado.

### Parámetros

     index


       El índice a ser destruido.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una excepción de tipo [RuntimeException](#class.runtimeexception) cuando index está fuera
del tamaño definido del array o cuando index no se puede procesar como un entero.

# SplFixedArray::rewind

(PHP 5 &gt;= 5.3.0, PHP 7)

SplFixedArray::rewind — Rebobina el iterador hasta el inicio

### Descripción

public **SplFixedArray::rewind**(): [void](language.types.void.html)

Rebobina el iterador hasta el inicio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplFixedArray::\_\_serialize

(PHP 8 &gt;= 8.2.0)

SplFixedArray::\_\_serialize — Serializa el objeto SplFixedArray

### Descripción

public **SplFixedArray::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# SplFixedArray::setSize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::setSize — Cambia el tamaño de un array de tamaño fijo

### Descripción

public **SplFixedArray::setSize**([int](#language.types.integer) $size): [true](#language.types.singleton)

Cambia el tamaño de un array a un tamaño fijo size.
Si size es inferior al tamaño actual
del array, todos los valores después del nuevo tamaño serán ignorados.
Si size es mayor que el tamaño actual del array,
el array será completado con valores de tipo **[null](#constant.null)**.

### Parámetros

     size


       El nuevo tamaño del array.
       Debe ser un valor entre 0 y **[PHP_INT_MAX](#constant.php-int-max)**.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) cuando
size es inferior a cero.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **SplFixedArray::setSize()**
       ahora tiene un retorno provisional de [true](#language.types.singleton).



### Ejemplos

    **Ejemplo #1 Ejemplo con SplFixedArray::setSize()**

&lt;?php
$array = new SplFixedArray(5);
echo $array-&gt;getSize()."\n";
$array-&gt;setSize(10);
echo $array-&gt;getSize()."\n";
?&gt;

    El ejemplo anterior mostrará:

5
10

# SplFixedArray::toArray

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplFixedArray::toArray — Devuelve un array PHP de un array fijo

### Descripción

public **SplFixedArray::toArray**(): [array](#language.types.array)

Devuelve un array PHP de un array fijo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) PHP, similar al array fijo.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFixedArray::toArray()**

&lt;?php
$fa = new SplFixedArray(3);
$fa[0] = 0;
$fa[2] = 2;
var_dump($fa-&gt;toArray());
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
int(0)
[1]=&gt;
NULL
[2]=&gt;
int(2)
}

# SplFixedArray::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

SplFixedArray::\_\_unserialize — Deserializa el argumento data en un objeto SplFixedArray

### Descripción

public **SplFixedArray::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      El valor a deserializar.


### Valores devueltos

No se retorna ningún valor.

# SplFixedArray::valid

(PHP 5 &gt;= 5.3.0, PHP 7)

SplFixedArray::valid — Comprueba si el array contiene más elementos

### Descripción

public **SplFixedArray::valid**(): [bool](#language.types.boolean)

Comprueba si el array contiene más elementos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el array contiene más elementos, en caso contrario **[false](#constant.false)**.

# SplFixedArray::\_\_wakeup

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

SplFixedArray::\_\_wakeup — Reinicializa el array después de su deserialización

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **SplFixedArray::\_\_wakeup**(): [void](language.types.void.html)

Reinicializa el array después de su deserialización.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Este método es ahora obsoleto, utilice
       [SplFixedArray::__unserialize()](#splfixedarray.unserialize)
       en su lugar.



## Tabla de contenidos

- [SplFixedArray::\_\_construct](#splfixedarray.construct) — Construye un nuevo SplFixedArray
- [SplFixedArray::count](#splfixedarray.count) — Devuelve el tamaño del array
- [SplFixedArray::current](#splfixedarray.current) — Devuelve la entrada del array actual
- [SplFixedArray::fromArray](#splfixedarray.fromarray) — Importa un array PHP en una instancia SplFixedArray
- [SplFixedArray::getIterator](#splfixedarray.getiterator) — Devuelve el iterador para recorrer el array
- [SplFixedArray::getSize](#splfixedarray.getsize) — Obtiene el tamaño de el array
- [SplFixedArray::jsonSerialize](#splfixedarray.jsonserialize) — Devuelve una representación que puede ser convertida a JSON
- [SplFixedArray::key](#splfixedarray.key) — Devuelve los índices del array actual
- [SplFixedArray::next](#splfixedarray.next) — Mover a la siguiente entrada
- [SplFixedArray::offsetExists](#splfixedarray.offsetexists) — Devuelve si el índice solicitado existe
- [SplFixedArray::offsetGet](#splfixedarray.offsetget) — Devuelve el valor en el índice específicado
- [SplFixedArray::offsetSet](#splfixedarray.offsetset) — Establece un nuevo valor para el índice específicado
- [SplFixedArray::offsetUnset](#splfixedarray.offsetunset) — Destruye el valor en el índice específicado
- [SplFixedArray::rewind](#splfixedarray.rewind) — Rebobina el iterador hasta el inicio
- [SplFixedArray::\_\_serialize](#splfixedarray.serialize) — Serializa el objeto SplFixedArray
- [SplFixedArray::setSize](#splfixedarray.setsize) — Cambia el tamaño de un array de tamaño fijo
- [SplFixedArray::toArray](#splfixedarray.toarray) — Devuelve un array PHP de un array fijo
- [SplFixedArray::\_\_unserialize](#splfixedarray.unserialize) — Deserializa el argumento data en un objeto SplFixedArray
- [SplFixedArray::valid](#splfixedarray.valid) — Comprueba si el array contiene más elementos
- [SplFixedArray::\_\_wakeup](#splfixedarray.wakeup) — Reinicializa el array después de su deserialización

# La clase [ArrayObject](#class.arrayobject)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Esta clase permite que los objetos funcionen como arrays.

**Nota**:

     Envolver objetos con esta clase es fundamentalmente defectuoso, y su utilización con objetos es por lo tanto desaconsejada.

## Sinopsis de la Clase

     class **ArrayObject**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [ArrayAccess](#class.arrayaccess),

     [Serializable](#class.serializable),

     [Countable](#class.countable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [STD_PROP_LIST](#arrayobject.constants.std-prop-list);

    public
     const
     [int](#language.types.integer)
      [ARRAY_AS_PROPS](#arrayobject.constants.array-as-props);


    /* Métodos */

public [\_\_construct](#arrayobject.construct)([array](#language.types.array)|[object](#language.types.object) $array = [], [int](#language.types.integer) $flags = 0, [string](#language.types.string) $iteratorClass = ArrayIterator::class)

    public [append](#arrayobject.append)([mixed](#language.types.mixed) $value): [void](language.types.void.html)

public [asort](#arrayobject.asort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [count](#arrayobject.count)(): [int](#language.types.integer)
public [exchangeArray](#arrayobject.exchangearray)([array](#language.types.array)|[object](#language.types.object) $array): [array](#language.types.array)
public [getArrayCopy](#arrayobject.getarraycopy)(): [array](#language.types.array)
public [getFlags](#arrayobject.getflags)(): [int](#language.types.integer)
public [getIterator](#arrayobject.getiterator)(): [Iterator](#class.iterator)
public [getIteratorClass](#arrayobject.getiteratorclass)(): [string](#language.types.string)
public [ksort](#arrayobject.ksort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [natcasesort](#arrayobject.natcasesort)(): [true](#language.types.singleton)
public [natsort](#arrayobject.natsort)(): [true](#language.types.singleton)
public [offsetExists](#arrayobject.offsetexists)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
public [offsetGet](#arrayobject.offsetget)([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)
public [offsetSet](#arrayobject.offsetset)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#arrayobject.offsetunset)([mixed](#language.types.mixed) $key): [void](language.types.void.html)
public [serialize](#arrayobject.serialize)(): [string](#language.types.string)
public [setFlags](#arrayobject.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [setIteratorClass](#arrayobject.setiteratorclass)([string](#language.types.string) $iteratorClass): [void](language.types.void.html)
public [uasort](#arrayobject.uasort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [uksort](#arrayobject.uksort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [unserialize](#arrayobject.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)

}

## Constantes predefinidas

    ## Opciones de **ArrayObject**




      **[ArrayObject::STD_PROP_LIST](#arrayobject.constants.std-prop-list)**


        Las propiedades del objeto tienen su funcionamiento normal cuando
        se accede a ellas desde la lista ([var_dump()](#function.var-dump), [foreach](#control-structures.foreach), etc.).







      **[ArrayObject::ARRAY_AS_PROPS](#arrayobject.constants.array-as-props)**


        Los elementos pueden ser accedidos como propiedades (lectura y escritura).
        La clase **ArrayObject** utiliza su propia lógica
        para acceder a las propiedades, por lo que no se emite ningún aviso o error
        al intentar leer o escribir propiedades dinámicas.






# ArrayObject::append

(PHP 5, PHP 7, PHP 8)

ArrayObject::append — Añade el valor al final de un array

### Descripción

public **ArrayObject::append**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Añade un elemento al final del array.

**Nota**:

    Este método no puede ser llamado cuando el objeto
    [ArrayObject](#class.arrayobject) ha sido construido a partir
    de otro objeto. En ese caso, utilice el método
    [ArrayObject::offsetSet()](#arrayobject.offsetset).

### Parámetros

     value


       El valor añadido.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::append()**

&lt;?php
$arrayobj = new ArrayObject(array('first','second','third'));
$arrayobj-&gt;append('fourth');
$arrayobj-&gt;append(array('five', 'six'));
var_dump($arrayobj);
?&gt;

    El ejemplo anterior mostrará:

object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(5) {
[0]=&gt;
string(5) "first"
[1]=&gt;
string(6) "second"
[2]=&gt;
string(5) "third"
[3]=&gt;
string(6) "fourth"
[4]=&gt;
array(2) {
[0]=&gt;
string(4) "five"
[1]=&gt;
string(3) "six"
}
}
}

### Ver también

    - [ArrayObject::offsetSet()](#arrayobject.offsetset) - Define $newval como valor en el $index especificado

# ArrayObject::asort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::asort — Ordena los elementos por valor

### Descripción

public **ArrayObject::asort**([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena las entradas en orden ascendente,
de tal manera que la correlación entre las claves y las
valores sea conservada.

El uso principal es durante el ordenamiento de arrays
asociativos donde el orden de los elementos es importante.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

    **Ejemplo #1 Ejemplo con ArrayObject::asort()**

&lt;?php
$fruits = array("d" =&gt; "limón", "a" =&gt; "naranja", "b" =&gt; "plátano", "c" =&gt; "manzana");
$fruitArrayObject = new ArrayObject($fruits);
$fruitArrayObject-&gt;asort();

foreach ($fruitArrayObject as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

b = plátano
d = limón
a = naranja
c = manzana

     Las frutas han sido ordenadas en orden alfabético, y su
     clave asociada ha sido conservada.

### Ver también

    - [ArrayObject::ksort()](#arrayobject.ksort) - Ordena un array por clave

    - [ArrayObject::natsort()](#arrayobject.natsort) - Ordena los elementos con un tri natural

    - [ArrayObject::natcasesort()](#arrayobject.natcasesort) - Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

    - [ArrayObject::uasort()](#arrayobject.uasort) - Ordena los elementos con una función de usuario

    - [ArrayObject::uksort()](#arrayobject.uksort) - Ordena los elementos por clave con una función utilitaria

    - [asort()](#function.asort) - Ordena un array en orden ascendente y conserva la asociación de los índices

# ArrayObject::\_\_construct

(PHP 5, PHP 7, PHP 8)

ArrayObject::\_\_construct — Construye un nuevo objeto array

### Descripción

public **ArrayObject::\_\_construct**([array](#language.types.array)|[object](#language.types.object) $array = [], [int](#language.types.integer) $flags = 0, [string](#language.types.string) $iteratorClass = ArrayIterator::class)

Construye un nuevo objeto array.

### Parámetros

     array


       El parámetro array acepta
       un [array](#language.types.array) o un [object](#language.types.object).






     flags


       Opción de control del comportamiento del
       objeto [ArrayObject](#class.arrayobject).
       Ver el método [ArrayObject::setFlags()](#arrayobject.setflags).






     iteratorClass


       Especifica la clase que será utilizada para las iteraciones
       del objeto [ArrayObject](#class.arrayobject).
       La clase debe ser un subtipo de la clase [ArrayIterator](#class.arrayiterator).





### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::__construct()**

&lt;?php

$array = [
'1' =&gt; 'one',
'2' =&gt; 'two',
'3' =&gt; 'three'
];

$arrayobject = new ArrayObject($array);

var_dump($arrayobject);

?&gt;

El ejemplo anterior mostrará:

object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(3) {
[1]=&gt;
string(3) "one"
[2]=&gt;
string(3) "two"
[3]=&gt;
string(5) "three"
}
}

### Ver también

    - [ArrayObject::setflags()](#arrayobject.setflags) - Configura las opciones de comportamiento

# ArrayObject::count

(PHP 5, PHP 7, PHP 8)

ArrayObject::count — Retorna el número de propiedades públicas en el objeto [ArrayObject](#class.arrayobject)

### Descripción

public **ArrayObject::count**(): [int](#language.types.integer)

Lee el número de propiedades públicas en el objeto
[ArrayObject](#class.arrayobject)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el número de propiedades públicas en el objeto
[ArrayObject](#class.arrayobject).

**Nota**:

    Cuando el objeto [ArrayObject](#class.arrayobject) es construido
    a partir de un [array](#language.types.array), todas las propiedades son públicas.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::count()**

&lt;?php
class Example {
public $public = 'prop:public';
private $prv = 'prop:private';
protected $prt = 'prop:protected';
}

$arrayobj = new ArrayObject(new Example());
var_dump($arrayobj-&gt;count());

$arrayobj = new ArrayObject(array('premier','second','troisième'));
var_dump($arrayobj-&gt;count());
?&gt;

    El ejemplo anterior mostrará:

int(1)
int(3)

# ArrayObject::exchangeArray

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayObject::exchangeArray — Sustituye un array por otro

### Descripción

public **ArrayObject::exchangeArray**([array](#language.types.array)|[object](#language.types.object) $array): [array](#language.types.array)

Sustituye el [array](#language.types.array) actual por otro [array](#language.types.array) o un
[object](#language.types.object).

### Parámetros

     array


       El nuevo [array](#language.types.array) o [object](#language.types.object) a utilizar.





### Valores devueltos

Devuelve el antiguo [array](#language.types.array).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::exchangeArray()**

&lt;?php
// Arrays de frutas
$fruits = array("limones" =&gt; 1, "naranjas" =&gt; 4, "plátanos" =&gt; 5, "manzanas" =&gt; 10);
// Array de ciudades en Europa
$locations = array('Ámsterdam', 'París', 'Londres');

$fruitsArrayObject = new ArrayObject($fruits);

// Intercambio de frutas por ciudades
$old = $fruitsArrayObject-&gt;exchangeArray($locations);
var_dump($old);
var_dump($fruitsArrayObject);

?&gt;

    El ejemplo anterior mostrará:

array(4) {
["limones"]=&gt;
int(1)
["naranjas"]=&gt;
int(4)
["plátanos"]=&gt;
int(5)
["manzanas"]=&gt;
int(10)
}
object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(3) {
[0]=&gt;
string(9) "Ámsterdam"
[1]=&gt;
string(5) "París"
[2]=&gt;
string(7) "Londres"
}
}

# ArrayObject::getArrayCopy

(PHP 5, PHP 7, PHP 8)

ArrayObject::getArrayCopy — Crea una copia del objeto [ArrayObject](#class.arrayobject)

### Descripción

public **ArrayObject::getArrayCopy**(): [array](#language.types.array)

Exporta el objeto [ArrayObject](#class.arrayobject) a un array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una copia del [array](#language.types.array). Cuando el objeto
[ArrayObject](#class.arrayobject) es un objeto, el array
devuelto contiene las propiedades de dicho objeto.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::getArrayCopy()**

&lt;?php
// Lista de frutas
$fruits = array("limones" =&gt; 1, "naranjas" =&gt; 4, "plátanos" =&gt; 5, "manzanas" =&gt; 10);

$fruitsArrayObject = new ArrayObject($fruits);
$fruitsArrayObject['peras'] = 4;

// Crea una copia de los arrays
$copy = $fruitsArrayObject-&gt;getArrayCopy();
var_dump($copy);

?&gt;

    El ejemplo anterior mostrará:

array(5) {
["limones"]=&gt;
int(1)
["naranjas"]=&gt;
int(4)
["plátanos"]=&gt;
int(5)
["manzanas"]=&gt;
int(10)
["peras"]=&gt;
int(4)
}

# ArrayObject::getFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayObject::getFlags — Obtiene las opciones de comportamiento

### Descripción

public **ArrayObject::getFlags**(): [int](#language.types.integer)

Obtiene las opciones de comportamiento del objeto [ArrayObject](#class.arrayobject).
Consúltese el método [ArrayObject::setFlags](#arrayobject.setflags)
para obtener una lista de opciones disponibles.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las opciones de comportamiento del objeto [ArrayObject](#class.arrayobject).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::getFlags()**

&lt;?php
// Lista de frutas
$fruits = array("limones" =&gt; 1, "naranjas" =&gt; 4, "plátanos" =&gt; 5, "manzanas" =&gt; 10);

$fruitsArrayObject = new ArrayObject($fruits);

// Lista las opciones actuales
$flags = $fruitsArrayObject-&gt;getFlags();
var_dump($flags);

// Configura nuevas opciones
$fruitsArrayObject-&gt;setFlags(ArrayObject::ARRAY_AS_PROPS);

// Obtiene las nuevas opciones
$flags = $fruitsArrayObject-&gt;getFlags();
var_dump($flags);
?&gt;

    El ejemplo anterior mostrará:

int(0)
int(2)

### Ver también

    - [ArrayObject::setFlags()](#arrayobject.setflags) - Configura las opciones de comportamiento

# ArrayObject::getIterator

(PHP 5, PHP 7, PHP 8)

ArrayObject::getIterator — Crea un nuevo iterador a partir de un objeto [ArrayObject](#class.arrayobject)

### Descripción

public **ArrayObject::getIterator**(): [Iterator](#class.iterator)

Crea un nuevo [Iterator](#class.iterator) (por omisión
[ArrayIterator](#class.arrayiterator)) a partir de una instancia de [ArrayObject](#class.arrayobject).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un iterador desde un [ArrayObject](#class.arrayobject).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::getIterator()**

&lt;?php

$array = [
'1' =&gt; 'one',
'2' =&gt; 'two',
'3' =&gt; 'three',
];

$arrayobject = new ArrayObject($array);

$iterator = $arrayobject-&gt;getIterator();

while ($iterator-&gt;valid()) {
echo $iterator-&gt;key() . ' =&gt; ' . $iterator-&gt;current() . "\n";

    $iterator-&gt;next();

}

?&gt;

    El ejemplo anterior mostrará:

1 =&gt; one
2 =&gt; two
3 =&gt; three

# ArrayObject::getIteratorClass

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayObject::getIteratorClass — Lee el nombre de la clase de [ArrayObject](#class.arrayobject)

### Descripción

public **ArrayObject::getIteratorClass**(): [string](#language.types.string)

Lee el nombre de la clase utilizado por el iterador de array utilizado por
[ArrayObject::getIterator()](#arrayobject.getiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la clase de iterador utilizado por este objeto.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::getIteratorClass()**

&lt;?php
// ArrayIterator personalizado (hereda de ArrayIterator)
class MonArrayIterator extends ArrayIterator {
// implementación personalizada
}

// Array de frutas
$fruits = array("citrons" =&gt; 1, "oranges" =&gt; 4, "bananes" =&gt; 5, "pommes" =&gt; 10);

$fruitsArrayObject = new ArrayObject($fruits);

// Lee el nombre de la clase actual
$className = $fruitsArrayObject-&gt;getIteratorClass();
var_dump($className);

// Configura el nombre de la nueva clase
$fruitsArrayObject-&gt;setIteratorClass('MyArrayIterator');

// Lee el nombre de la clase del nuevo iterador
$className = $fruitsArrayObject-&gt;getIteratorClass();
var_dump($className);
?&gt;

    El ejemplo anterior mostrará:

string(13) "ArrayIterator"
string(15) "MonArrayIterator"

### Ver también

    - El método [ArrayObject::setIteratorClass](#arrayobject.setiteratorclass)

# ArrayObject::ksort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::ksort — Ordena un array por clave

### Descripción

public **ArrayObject::ksort**([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena los elementos por clave, manteniendo la relación con los elementos.
Es el ordenamiento clásico sobre arrays asociativos.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

    **Ejemplo #1 Ejemplo con ArrayObject::ksort()**

&lt;?php
$fruits = array("d" =&gt; "limón", "a" =&gt; "naranja", "b" =&gt; "plátano", "c" =&gt; "manzana");
$fruitArrayObject = new ArrayObject($fruits);
$fruitArrayObject-&gt;ksort();

foreach ($fruitArrayObject as $key =&gt; $val) {
    echo "$key = $val\n";
}
?&gt;

    El ejemplo anterior mostrará:

a = naranja
b = plátano
c = manzana
d = limón

### Ver también

    - [ArrayObject::asort()](#arrayobject.asort) - Ordena los elementos por valor

    - [ArrayObject::natsort()](#arrayobject.natsort) - Ordena los elementos con un tri natural

    - [ArrayObject::natcasesort()](#arrayobject.natcasesort) - Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

    - [ArrayObject::uasort()](#arrayobject.uasort) - Ordena los elementos con una función de usuario

    - [ArrayObject::uksort()](#arrayobject.uksort) - Ordena los elementos por clave con una función utilitaria

    - [ksort()](#function.ksort) - Ordena un array según las claves en orden ascendente

# ArrayObject::natcasesort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::natcasesort — Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

### Descripción

public **ArrayObject::natcasesort**(): [true](#language.types.singleton)

Este método es la versión insensible a la casilla de
[ArrayObject::natsort](#arrayobject.natsort).

Este método implementa un algoritmo de ordenamiento que ordena
las cadenas alfanuméricas de la misma forma en que lo haría un humano.
Esto se describe como un ordenamiento natural.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::natcasesort()**

&lt;?php
$array = array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');

$arr1 = new ArrayObject($array);
$arr2 = clone $arr1;

$arr1-&gt;asort();
echo "Ordenamiento estándar\n";
var_dump($arr1);

$arr2-&gt;natcasesort();
echo "\nOrdenamiento natural\n";
var_dump($arr2);
?&gt;

    El ejemplo anterior mostrará:

Ordenamiento estándar
object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(6) {
[0]=&gt;
string(8) "IMG0.png"
[5]=&gt;
string(8) "IMG3.png"
[4]=&gt;
string(8) "img1.png"
[2]=&gt;
string(9) "img10.png"
[1]=&gt;
string(9) "img12.png"
[3]=&gt;
string(8) "img2.png"
}
}

Ordenamiento natural
object(ArrayObject)#2 (1) {
["storage":"ArrayObject":private]=&gt;
array(6) {
[0]=&gt;
string(8) "IMG0.png"
[4]=&gt;
string(8) "img1.png"
[3]=&gt;
string(8) "img2.png"
[5]=&gt;
string(8) "IMG3.png"
[2]=&gt;
string(9) "img10.png"
[1]=&gt;
string(9) "img12.png"
}
}

     Para más información, ver la página de
     [» comparación de strings en orden natural](https://github.com/sourcefrog/natsort)
     de Martin Pool.

### Ver también

    - [ArrayObject::asort()](#arrayobject.asort) - Ordena los elementos por valor

    - [ArrayObject::ksort()](#arrayobject.ksort) - Ordena un array por clave

    - [ArrayObject::natsort()](#arrayobject.natsort) - Ordena los elementos con un tri natural

    - [ArrayObject::uasort()](#arrayobject.uasort) - Ordena los elementos con una función de usuario

    - [ArrayObject::uksort()](#arrayobject.uksort) - Ordena los elementos por clave con una función utilitaria

    - [natcasesort()](#function.natcasesort) - Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas

# ArrayObject::natsort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::natsort — Ordena los elementos con un tri natural

### Descripción

public **ArrayObject::natsort**(): [true](#language.types.singleton)

Este método implementa un algoritmo de ordenación que coloca las
strings alfanuméricas en el mismo orden que un humano utilizaría,
manteniendo la correlación entre las claves y los valores. Esto se
denomina tri natural. Por ejemplo, el tri natural se distingue del
tri informático, tal como se utiliza en
[ArrayObject::asort](#arrayobject.asort), como
se ilustra a continuación.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::natsort()**

&lt;?php
$array = array("img12.png", "img10.png", "img2.png", "img1.png");

$arr1 = new ArrayObject($array);
$arr2 = clone $arr1;

$arr1-&gt;asort();
echo "Tri estándar\n";
var_dump($arr1);

$arr2-&gt;natsort();
echo "\nTri en orden natural\n";
var_dump($arr2);
?&gt;

    El ejemplo anterior mostrará:

Tri estándar
object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(4) {
[3]=&gt;
string(8) "img1.png"
[1]=&gt;
string(9) "img10.png"
[0]=&gt;
string(9) "img12.png"
[2]=&gt;
string(8) "img2.png"
}
}

Tri en orden natural
object(ArrayObject)#2 (1) {
["storage":"ArrayObject":private]=&gt;
array(4) {
[3]=&gt;
string(8) "img1.png"
[2]=&gt;
string(8) "img2.png"
[1]=&gt;
string(9) "img10.png"
[0]=&gt;
string(9) "img12.png"
}
}

     Para más información, véase el sitio de Martin Pool
     [» Natural Order String Comparison](https://github.com/sourcefrog/natsort).

### Ver también

    - [ArrayObject::asort()](#arrayobject.asort) - Ordena los elementos por valor

    - [ArrayObject::ksort()](#arrayobject.ksort) - Ordena un array por clave

    - [ArrayObject::natcasesort()](#arrayobject.natcasesort) - Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

    - [ArrayObject::uasort()](#arrayobject.uasort) - Ordena los elementos con una función de usuario

    - [ArrayObject::uksort()](#arrayobject.uksort) - Ordena los elementos por clave con una función utilitaria

    - [natsort()](#function.natsort) - Ordena un array con el algoritmo de "orden natural"

# ArrayObject::offsetExists

(PHP 5, PHP 7, PHP 8)

ArrayObject::offsetExists — Verifica si un índice existe

### Descripción

public **ArrayObject::offsetExists**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

### Parámetros

     key


       El índice a verificar.





### Valores devueltos

**[true](#constant.true)** si el índice solicitado existe, de lo contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::offsetExists()**

&lt;?php
$arrayobj = new ArrayObject(array('zero', 'one', 'example'=&gt;'e.g.'));
var_dump($arrayobj-&gt;offsetExists(1));
var_dump($arrayobj-&gt;offsetExists('example'));
var_dump($arrayobj-&gt;offsetExists('notfound'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(true)
bool(false)

# ArrayObject::offsetGet

(PHP 5, PHP 7, PHP 8)

ArrayObject::offsetGet — Devuelve el valor del índice especificado

### Descripción

public **ArrayObject::offsetGet**([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)

### Parámetros

     key


       El índice solicitado.





### Valores devueltos

El valor en el índice o **[null](#constant.null)**.

### Errores/Excepciones

Genera una advertencia de nivel **[E_NOTICE](#constant.e-notice)** cuando
el índice especificado no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::offsetGet()**

&lt;?php
$arrayobj = new ArrayObject(array('zero', 7, 'example'=&gt;'e.g.'));
var_dump($arrayobj-&gt;offsetGet(1));
var_dump($arrayobj-&gt;offsetGet('example'));
var_dump($arrayobj-&gt;offsetExists('notfound'));
?&gt;

    El ejemplo anterior mostrará:

int(7)
string(4) "e.g."
bool(false)

# ArrayObject::offsetSet

(PHP 5, PHP 7, PHP 8)

ArrayObject::offsetSet — Define $newval como valor en el $index especificado

### Descripción

public **ArrayObject::offsetSet**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Define value como valor en el índice
key especificado.

### Parámetros

     key


       El índice a definir.






     value


       El nuevo valor del índice key.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::offsetSet()**

&lt;?php
class Example {
public $property = 'prop:public';
}
$arrayobj = new ArrayObject(new Example());
$arrayobj-&gt;offsetSet(4, 'four');
$arrayobj-&gt;offsetSet('group', array('g1', 'g2'));
var_dump($arrayobj);

$arrayobj = new ArrayObject(array('zero','one'));
$arrayobj-&gt;offsetSet(null, 'last');
var_dump($arrayobj);
?&gt;

    El ejemplo anterior mostrará:

object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
object(Example)#2 (3) {
["property"]=&gt;
string(11) "prop:public"
["4"]=&gt;
string(4) "four"
["group"]=&gt;
array(2) {
[0]=&gt;
string(2) "g1"
[1]=&gt;
string(2) "g2"
}
}
}
object(ArrayObject)#3 (1) {
["storage":"ArrayObject":private]=&gt;
array(3) {
[0]=&gt;
string(4) "zero"
[1]=&gt;
string(3) "one"
[2]=&gt;
string(4) "last"
}
}

### Ver también

    - [ArrayObject::append()](#arrayobject.append) - Añade el valor al final de un array

# ArrayObject::offsetUnset

(PHP 5, PHP 7, PHP 8)

ArrayObject::offsetUnset — Elimina el valor en el '$index especificado

### Descripción

public **ArrayObject::offsetUnset**([mixed](#language.types.mixed) $key): [void](language.types.void.html)

Elimina el valor en el '$index especificado.

### Parámetros

     key


       El índice a eliminar.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::offsetUnset()**

&lt;?php
$arrayobj = new ArrayObject(array(0=&gt;'zero',2=&gt;'two'));
$arrayobj-&gt;offsetUnset(2);
var_dump($arrayobj);
?&gt;

    El ejemplo anterior mostrará:

object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(1) {
[0]=&gt;
string(4) "zero"
}
}

# ArrayObject::serialize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ArrayObject::serialize — Serializa un ArrayObject

### Descripción

public **ArrayObject::serialize**(): [string](#language.types.string)

Serializa un [ArrayObject](#class.arrayobject).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La representación serializada de un objeto [ArrayObject](#class.arrayobject).

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::serialize()**

&lt;?php
$o = new ArrayObject();

$s1 = serialize($o);
$s2 = $o-&gt;serialize();

var_dump($s1);
var_dump($s2);
?&gt;

    El ejemplo anterior mostrará:

string(45) "C:11:"ArrayObject":21:{x:i:0;a:0:{};m:a:0:{}}"
string(21) "x:i:0;a:0:{};m:a:0:{}"

### Ver también

    - [ArrayObject::unserialize()](#arrayobject.unserialize) - Deserialización de un ArrayObject

    - [serialize()](#function.serialize) - Genera una representación almacenable de un valor

    - [Serialización de objetos](#language.oop5.serialization)

# ArrayObject::setFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayObject::setFlags — Configura las opciones de comportamiento

### Descripción

public **ArrayObject::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Configura las opciones que modifican el comportamiento de los objetos
[ArrayObject](#class.arrayobject).

### Parámetros

     flags


       El nuevo comportamiento de [ArrayObject](#class.arrayobject).
       Esto puede ser un campo de bits o constantes nombradas. El uso
       de las constantes es altamente recomendado, para asegurar la compatibilidad
       con futuras versiones.




       Las opciones de comportamiento disponibles se listan a continuación. Su
       significado se describe en las
       [constantes predefinidas](#arrayobject.constants).



        <caption>**Opciones de comportamiento de [ArrayObject](#class.arrayobject)**</caption>



           Valor
           Constante






           1

            [ArrayObject::STD_PROP_LIST](#arrayobject.constants.std-prop-list)




           2

            [ArrayObject::ARRAY_AS_PROPS](#arrayobject.constants.array-as-props)










### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::setFlags()**

&lt;?php
// Lista de frutas
$fruits = array("citrons" =&gt; 1, "oranges" =&gt; 4, "bananes" =&gt; 5, "pommes" =&gt; 10);

$fruitsArrayObject = new ArrayObject($fruits);

// Uso de las claves del array como propiedades
var_dump($fruitsArrayObject-&gt;citrons);
// Configura el array para que las claves puedan usarse como propiedades
$fruitsArrayObject-&gt;setFlags(ArrayObject::ARRAY_AS_PROPS);
// Intento nuevamente
var_dump($fruitsArrayObject-&gt;citrons);

?&gt;

    Resultado del ejemplo anterior es similar a:

Warning: Undefined property: ArrayObject::$lemons in ...
NULL
int(1)

# ArrayObject::setIteratorClass

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayObject::setIteratorClass — Define el nombre de la clase del iterador para el objeto ArrayObject

### Descripción

public **ArrayObject::setIteratorClass**([string](#language.types.string) $iteratorClass): [void](language.types.void.html)

Define el nombre de la clase del iterador del array, utilizado por
[ArrayObject::getIterator()](#arrayobject.getiterator).

### Parámetros

     iteratorClass


       El nombre de la clase del iterador a utilizar para iterar sobre este
       objeto.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::setIteratorClass()**

&lt;?php
// ArrayIterator personalizado (hereda de ArrayIterator)
class MonArrayIterator extends ArrayIterator {
// implementación personal
}

// Lista de frutas
$fruits = array("citrons" =&gt; 1, "oranges" =&gt; 4, "bananes" =&gt; 5, "pommes" =&gt; 10);

$fruitsArrayObject = new ArrayObject($fruits);

// Asigna el nuevo nombre de clase de iteración
$fruitsArrayObject-&gt;setIteratorClass('MonArrayIterator');
var_dump($fruitsArrayObject-&gt;getIterator());

?&gt;

    El ejemplo anterior mostrará:

object(MonArrayIterator)#2 (1) {
["storage":"ArrayIterator":private]=&gt;
object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(4) {
["citrons"]=&gt;
int(1)
["oranges"]=&gt;
int(4)
["bananes"]=&gt;
int(5)
["pommes"]=&gt;
int(10)
}
}
}

# ArrayObject::uasort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::uasort — Ordena los elementos con una función de usuario

### Descripción

public **ArrayObject::uasort**([callable](#language.types.callable) $callback): [true](#language.types.singleton)

Esta función ordena los elementos manteniendo su
correlación con la clave asociada, utilizando una función
de comparación de usuario.

Esta función se utiliza al ordenar arrays asociativos, donde
el orden de los elementos es importante.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::uasort()**

&lt;?php
// Función de comparación
function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a &lt; $b) ? -1 : 1;
}

// Los arrays a ordenar
$array = array('a' =&gt; 4, 'b' =&gt; 8, 'c' =&gt; -1, 'd' =&gt; -9, 'e' =&gt; 2, 'f' =&gt; 5, 'g' =&gt; 3, 'h' =&gt; -4);
$arrayObject = new ArrayObject($array);
var_dump($arrayObject);

// Ordena y muestra el array
$arrayObject-&gt;uasort('cmp');
var_dump($arrayObject);
?&gt;

    El ejemplo anterior mostrará:

object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(8) {
["a"]=&gt;
int(4)
["b"]=&gt;
int(8)
["c"]=&gt;
int(-1)
["d"]=&gt;
int(-9)
["e"]=&gt;
int(2)
["f"]=&gt;
int(5)
["g"]=&gt;
int(3)
["h"]=&gt;
int(-4)
}
}
object(ArrayObject)#1 (1) {
["storage":"ArrayObject":private]=&gt;
array(8) {
["d"]=&gt;
int(-9)
["h"]=&gt;
int(-4)
["c"]=&gt;
int(-1)
["e"]=&gt;
int(2)
["g"]=&gt;
int(3)
["a"]=&gt;
int(4)
["f"]=&gt;
int(5)
["b"]=&gt;
int(8)
}
}

### Ver también

    - [ArrayObject::asort()](#arrayobject.asort) - Ordena los elementos por valor

    - [ArrayObject::ksort()](#arrayobject.ksort) - Ordena un array por clave

    - [ArrayObject::natsort()](#arrayobject.natsort) - Ordena los elementos con un tri natural

    - [ArrayObject::natcasesort()](#arrayobject.natcasesort) - Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

    - [ArrayObject::uksort()](#arrayobject.uksort) - Ordena los elementos por clave con una función utilitaria

    - [uasort()](#function.uasort) - Ordena un array utilizando una función de retrollamada

# ArrayObject::uksort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayObject::uksort — Ordena los elementos por clave con una función utilitaria

### Descripción

public **ArrayObject::uksort**([callable](#language.types.callable) $callback): [true](#language.types.singleton)

Esta función ordena las claves de los elementos utilizando una función
utilitaria de comparación. La correlación entre las claves y los
elementos se conserva.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ejemplos

    **Ejemplo #1 Ejemplo con ArrayObject::uksort()**

&lt;?php
function cmp($a, $b) {
    $a = preg_replace('@^(le|la|les|un|une|des) @', '', $a);
    $b = preg_replace('@^(le|la|les|un|une|des) @', '', $b);
    return strcasecmp($a, $b);
}

$array = array("Jean" =&gt; 1, "la Terre" =&gt; 2, "une pomme" =&gt; 3, "une banane" =&gt; 4);
$arrayObject = new ArrayObject($array);
$arrayObject-&gt;uksort('cmp');

foreach ($arrayObject as $key =&gt; $value) {
    echo "$key: $value\n";
}
?&gt;

    El ejemplo anterior mostrará:

une banane: 4
Jean: 1
une pomme: 3
la Terre: 2

### Ver también

    - [ArrayObject::asort()](#arrayobject.asort) - Ordena los elementos por valor

    - [ArrayObject::ksort()](#arrayobject.ksort) - Ordena un array por clave

    - [ArrayObject::natsort()](#arrayobject.natsort) - Ordena los elementos con un tri natural

    - [ArrayObject::natcasesort()](#arrayobject.natcasesort) - Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas

    - [ArrayObject::uasort()](#arrayobject.uasort) - Ordena los elementos con una función de usuario

    - [uksort()](#function.uksort) - Ordena un array por sus claves utilizando una función de retrollamada

# ArrayObject::unserialize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ArrayObject::unserialize — Deserialización de un ArrayObject

### Descripción

public **ArrayObject::unserialize**([string](#language.types.string) $data): [void](language.types.void.html)

Deserializa un objeto [ArrayObject](#class.arrayobject) serializado.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     data


       El objeto [ArrayObject](#class.arrayobject) serializado.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ArrayIterator::serialize()](#arrayiterator.serialize) - Serializar

    - [unserialize()](#function.unserialize) - Crea una variable PHP a partir de un valor serializado

    - [Serialización de objetos](#language.oop5.serialization)

## Tabla de contenidos

- [ArrayObject::append](#arrayobject.append) — Añade el valor al final de un array
- [ArrayObject::asort](#arrayobject.asort) — Ordena los elementos por valor
- [ArrayObject::\_\_construct](#arrayobject.construct) — Construye un nuevo objeto array
- [ArrayObject::count](#arrayobject.count) — Retorna el número de propiedades públicas en el objeto ArrayObject
- [ArrayObject::exchangeArray](#arrayobject.exchangearray) — Sustituye un array por otro
- [ArrayObject::getArrayCopy](#arrayobject.getarraycopy) — Crea una copia del objeto ArrayObject
- [ArrayObject::getFlags](#arrayobject.getflags) — Obtiene las opciones de comportamiento
- [ArrayObject::getIterator](#arrayobject.getiterator) — Crea un nuevo iterador a partir de un objeto ArrayObject
- [ArrayObject::getIteratorClass](#arrayobject.getiteratorclass) — Lee el nombre de la clase de ArrayObject
- [ArrayObject::ksort](#arrayobject.ksort) — Ordena un array por clave
- [ArrayObject::natcasesort](#arrayobject.natcasesort) — Ordena un array utilizando el ordenamiento natural sin distinción de mayúsculas y minúsculas
- [ArrayObject::natsort](#arrayobject.natsort) — Ordena los elementos con un tri natural
- [ArrayObject::offsetExists](#arrayobject.offsetexists) — Verifica si un índice existe
- [ArrayObject::offsetGet](#arrayobject.offsetget) — Devuelve el valor del índice especificado
- [ArrayObject::offsetSet](#arrayobject.offsetset) — Define $newval como valor en el $index especificado
- [ArrayObject::offsetUnset](#arrayobject.offsetunset) — Elimina el valor en el '$index especificado
- [ArrayObject::serialize](#arrayobject.serialize) — Serializa un ArrayObject
- [ArrayObject::setFlags](#arrayobject.setflags) — Configura las opciones de comportamiento
- [ArrayObject::setIteratorClass](#arrayobject.setiteratorclass) — Define el nombre de la clase del iterador para el objeto ArrayObject
- [ArrayObject::uasort](#arrayobject.uasort) — Ordena los elementos con una función de usuario
- [ArrayObject::uksort](#arrayobject.uksort) — Ordena los elementos por clave con una función utilitaria
- [ArrayObject::unserialize](#arrayobject.unserialize) — Deserialización de un ArrayObject

# La clase [SplObjectStorage](#class.splobjectstorage)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La clase **SplObjectStorage** proporciona un mapa
    de objetos o de datos, o bien, ignorando los índices, un conjunto
    de objetos. Este doble propósito es útil en numerosas situaciones,
    donde es necesario identificar de manera única objetos.

## Sinopsis de la Clase

     class **SeekableSplObjectStorage**



     implements
      [Countable](#class.countable),

     [Iterator](#class.iterator),

     [Serializable](#class.serializable),

     [ArrayAccess](#class.arrayaccess) {

    /* Métodos */

public [SplObjectStorage::addAll](#splobjectstorage.addall)([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)
[#[\Deprecated]](class.deprecated.html)
public [SplObjectStorage::attach](#splobjectstorage.attach)([object](#language.types.object) $object, [mixed](#language.types.mixed) $info = **[null](#constant.null)**): [void](language.types.void.html)
[#[\Deprecated]](class.deprecated.html)
public [SplObjectStorage::contains](#splobjectstorage.contains)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [SplObjectStorage::count](#splobjectstorage.count)([int](#language.types.integer) $mode = **[COUNT_NORMAL](#constant.count-normal)**): [int](#language.types.integer)
public [SplObjectStorage::current](#splobjectstorage.current)(): [object](#language.types.object)
[#[\Deprecated]](class.deprecated.html)
public [SplObjectStorage::detach](#splobjectstorage.detach)([object](#language.types.object) $object): [void](language.types.void.html)
public [SplObjectStorage::getHash](#splobjectstorage.gethash)([object](#language.types.object) $object): [string](#language.types.string)
public [SplObjectStorage::getInfo](#splobjectstorage.getinfo)(): [mixed](#language.types.mixed)
public [SplObjectStorage::key](#splobjectstorage.key)(): [int](#language.types.integer)
public [SplObjectStorage::next](#splobjectstorage.next)(): [void](language.types.void.html)
public [SplObjectStorage::offsetExists](#splobjectstorage.offsetexists)([object](#language.types.object) $object): [bool](#language.types.boolean)
public [SplObjectStorage::offsetGet](#splobjectstorage.offsetget)([object](#language.types.object) $object): [mixed](#language.types.mixed)
public [SplObjectStorage::offsetSet](#splobjectstorage.offsetset)([object](#language.types.object) $object, [mixed](#language.types.mixed) $info = **[null](#constant.null)**): [void](language.types.void.html)
public [SplObjectStorage::offsetUnset](#splobjectstorage.offsetunset)([object](#language.types.object) $object): [void](language.types.void.html)
public [SplObjectStorage::removeAll](#splobjectstorage.removeall)([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)
public [SplObjectStorage::removeAllExcept](#splobjectstorage.removeallexcept)([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)
public [SplObjectStorage::rewind](#splobjectstorage.rewind)(): [void](language.types.void.html)
public [SplObjectStorage::seek](#splobjectstorage.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [SplObjectStorage::serialize](#splobjectstorage.serialize)(): [string](#language.types.string)
public [SplObjectStorage::setInfo](#splobjectstorage.setinfo)([mixed](#language.types.mixed) $info): [void](language.types.void.html)
public [SplObjectStorage::unserialize](#splobjectstorage.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [SplObjectStorage::valid](#splobjectstorage.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

     **Ejemplo #1 Ejemplo con SplObjectStorage**, en forma de conjunto de objetos




&lt;?php
// Un conjunto de objetos
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;
$o3 = new stdClass;

$s-&gt;attach($o1);
$s-&gt;attach($o2);

var_dump($s-&gt;contains($o1));
var_dump($s-&gt;contains($o2));
var_dump($s-&gt;contains($o3));

$s-&gt;detach($o2);

var_dump($s-&gt;contains($o1));
var_dump($s-&gt;contains($o2));
var_dump($s-&gt;contains($o3));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(true)
bool(false)
bool(true)
bool(false)
bool(false)

     **Ejemplo #2 Ejemplo con SplObjectStorage**, en forma de mapa




&lt;?php
// Un mapa de objetos
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;
$o3 = new stdClass;

$s[$o1] = "data for object 1";
$s[$o2] = array(1,2,3);

if (isset($s[$o2])) {
var_dump($s[$o2]);
}
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

## Historial de cambios

       Versión
       Descripción






       8.4.0

        Implementa [SeekableIterator](#class.seekableiterator), anteriormente
        solo se implementaba la interfaz [Iterator](#class.iterator).





# SplObjectStorage::addAll

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::addAll — Agrega todos los objetos de otro almacenamiento

### Descripción

public **SplObjectStorage::addAll**([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)

Agrega todos los pares de objetos de datos de un diferente almacenamiento en el almacenamiento actual.

### Parámetros

     storage


       El almacenamiento que se quiere importar.





### Valores devueltos

El número de objetos en el almacén.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::addAll()**

&lt;?php
$o = new stdClass;
$a = new SplObjectStorage();
$a[$o] = "hola";

$b = new SplObjectStorage();
$b-&gt;addAll($a);
echo $b[$o]."\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

hola

### Ver también

    - [SplObjectStorage::removeAll()](#splobjectstorage.removeall) - Remover objetos contenidos en otro almacenamiento de el almacenamiento actual

# SplObjectStorage::attach

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::attach — Agrega un objeto en el almacenamiento

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **SplObjectStorage::attach**([object](#language.types.object) $object, [mixed](#language.types.mixed) $info = **[null](#constant.null)**): [void](language.types.void.html)

Añade un [object](#language.types.object) dentro del almacenamiento, y opcionalmente se asocian a algunos datos.

### Parámetros

     object


       El [object](#language.types.object) a ser añadido.






     info


       Los datos asociados con el [object](#language.types.object).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::attach()**

&lt;?php
$o1 = new stdClass;
$o2 = new stdClass;
$s = new SplObjectStorage();
$s-&gt;attach($o1); // similar a $s[$o1] = NULL;
$s-&gt;attach($o2, "hola"); // similar a $s[$o2] = "hola";

var_dump($s[$o1]);
var_dump($s[$o2]);

?&gt;

    Resultado del ejemplo anterior es similar a:

NULL
string(4) "hola"

### Ver también

    - [SplObjectStorage::detach()](#splobjectstorage.detach) - Quita un object del almacenamiento

    - [SplObjectStorage::offsetSet()](#splobjectstorage.offsetset) - Asocia datos a un objeto en el almacenamiento

# SplObjectStorage::contains

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::contains — Comprueba si el almacenamiento contiene un objeto específico

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **SplObjectStorage::contains**([object](#language.types.object) $object): [bool](#language.types.boolean)

Comprueba si el almacenamiento contiene al [object](#language.types.object) proporcionado.

### Parámetros

     object


       El [object](#language.types.object) a ser comprobado.





### Valores devueltos

Devuelve **[true](#constant.true)** si el [object](#language.types.object) está en el almacenamiento, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::contains()**

&lt;?php
$o1 = new stdClass;
$o2 = new stdClass;

$s = new SplObjectStorage();

$s[$o1] = "hola";
var_dump($s-&gt;contains($o1));
var_dump($s-&gt;contains($o2));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

### Ver también

    - [SplObjectStorage::offsetExists()](#splobjectstorage.offsetexists) - Comprueba si un objeto existe en el almacenamiento

# SplObjectStorage::count

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::count — Devuelve el número de objetos en el almacenamiento

### Descripción

public **SplObjectStorage::count**([int](#language.types.integer) $mode = **[COUNT_NORMAL](#constant.count-normal)**): [int](#language.types.integer)

Cuenta el número de objetos en el almacenamiento.

### Parámetros

     mode


       Si el parámetro opcional mode se establece en
       **[COUNT_RECURSIVE](#constant.count-recursive)** (o 1), **SplObjectStorage::count()**
       contará recursivamente el número de objetos en el almacenamiento.





### Valores devueltos

El número de objetos en el almacenamiento.

### Ejemplos

    **Ejemplo #1 Ejemplo con SplObjectStorage::count()**

&lt;?php
$s = new SplObjectStorage();
$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1);
$s-&gt;attach($o2);
$s-&gt;attach($o1);
var_dump($s-&gt;count());
var_dump(count($s));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(2)
int(2)

### Ver también

    - [SplObjectStorage::attach()](#splobjectstorage.attach) - Agrega un objeto en el almacenamiento

    - [SplObjectStorage::detach()](#splobjectstorage.detach) - Quita un object del almacenamiento

# SplObjectStorage::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::current — Devuelve el objeto actual

### Descripción

public **SplObjectStorage::current**(): [object](#language.types.object)

Devuelve el objeto actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [object](#language.types.object) en la posición actual del iterador.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       **SplObjectStorage::current()** ahora lanza una
       excepción [Error](#class.error) si la posición actual es
       inválida. Anteriormente, **[false](#constant.false)** era devuelto.



### Ejemplos

    **Ejemplo #1 Ejemplo con SplObjectStorage::current()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$index  = $s-&gt;key();
    $object = $s-&gt;current(); // similar to current($s)
$data = $s-&gt;getInfo();

    var_dump($object);
    var_dump($data);
    $s-&gt;next();

}
?&gt;

    Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (0) {
}
string(2) "d1"
object(stdClass)#3 (0) {
}
string(2) "d2"

### Ver también

    - [SplObjectStorage::rewind()](#splobjectstorage.rewind) - Rebobina el iterador a el primer elemento de el almacenamiento

    - [SplObjectStorage::key()](#splobjectstorage.key) - Devuelve el índice en el que se encuentra el iterador actualmente

    - [SplObjectStorage::next()](#splobjectstorage.next) - Mover a la siguiente entrada

    - [SplObjectStorage::valid()](#splobjectstorage.valid) - Comprobar si la entrada actual del iterador es válida

    - [SplObjectStorage::getInfo()](#splobjectstorage.getinfo) - Devuelve los datos asociados con la entrada del iterador actual

# SplObjectStorage::detach

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::detach — Quita un [object](#language.types.object) del almacenamiento

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **SplObjectStorage::detach**([object](#language.types.object) $object): [void](language.types.void.html)

Quita un [object](#language.types.object) de el almacenamiento.

### Parámetros

     object


       El [object](#language.types.object) a ser eliminado.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::detach()**

&lt;?php
$o = new stdClass;
$s = new SplObjectStorage();
$s-&gt;attach($o);
var_dump(count($s));
$s-&gt;detach($o);
var_dump(count($s));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(1)
int(0)

### Ver también

    - [SplObjectStorage::attach()](#splobjectstorage.attach) - Agrega un objeto en el almacenamiento

    - [SplObjectStorage::removeAll()](#splobjectstorage.removeall) - Remover objetos contenidos en otro almacenamiento de el almacenamiento actual

# SplObjectStorage::getHash

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SplObjectStorage::getHash —
Calcular un identificador único (hash) para los objetos contenidos

### Descripción

public **SplObjectStorage::getHash**([object](#language.types.object) $object): [string](#language.types.string)

Este método calcula un identificador para los objetos añadidos a un
objeto [SplObjectStorage](#class.splobjectstorage).

La implementación en la clase [SplObjectStorage](#class.splobjectstorage) devuelve
el mismo valor que la función [spl_object_hash()](#function.spl-object-hash).

El objeto de almacenamiento nunca contendrá más de un objeto con el mismo identificador.
Por lo tanto, se puede usar para implementar un conjunto (una colección de valores únicos)
donde la cualidad de un objeto de ser único está determinada por el valor
devuelto por esta función.

### Parámetros

    object


      El objeto cuyo identificador va a ser calculado.


### Valores devueltos

Un [string](#language.types.string) con el identificador calculado.

### Errores/Excepciones

Se lanza una excepción de tipo [RuntimeException](#class.runtimeexception) cuando el valor
devuelto no es un [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::getHash()**

&lt;?php
class OneSpecimenPerClassStorage extends SplObjectStorage {
public function getHash($o) {
        return get_class($o);
}
}
class A {}

$s = new OneSpecimenPerClassStorage;
$o1 = new stdClass;
$o2 = new stdClass;
$o3 = new A;

$s[$o1] = 1;
//$o2 es considerado igual a $o1, por lo que el valor es reemplazado
$s[$o2] = 2;
$s[$o3] = 3;

//estos objetos son considerados iguales a los objetos anteriores
//por lo que se pueden usar para acceder a los valores almacenados en ellos
$p1 = new stdClass;
$p2 = new A;
echo $s[$p1], "\n";
echo $s[$p2], "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

2
3

### Ver también

    - [spl_object_hash()](#function.spl-object-hash) - Devuelve el identificador de hash para un objeto dado

# SplObjectStorage::getInfo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::getInfo — Devuelve los datos asociados con la entrada del iterador actual

### Descripción

public **SplObjectStorage::getInfo**(): [mixed](#language.types.mixed)

Devuelve los datos o información, asociada al objeto señalado por la posición actual del iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los datos asociados con la posición actual del iterador.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::getInfo()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$index  = $s-&gt;key();
    $object = $s-&gt;current(); // similar a current($s)
$data = $s-&gt;getInfo();

    var_dump($object);
    var_dump($data);
    $s-&gt;next();

}
?&gt;

    Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (0) {
}
string(2) "d1"
object(stdClass)#3 (0) {
}
string(2) "d2"

### Ver también

    - [SplObjectStorage::current()](#splobjectstorage.current) - Devuelve el objeto actual

    - [SplObjectStorage::rewind()](#splobjectstorage.rewind) - Rebobina el iterador a el primer elemento de el almacenamiento

    - [SplObjectStorage::key()](#splobjectstorage.key) - Devuelve el índice en el que se encuentra el iterador actualmente

    - [SplObjectStorage::next()](#splobjectstorage.next) - Mover a la siguiente entrada

    - [SplObjectStorage::valid()](#splobjectstorage.valid) - Comprobar si la entrada actual del iterador es válida

    - [SplObjectStorage::setInfo()](#splobjectstorage.setinfo) - Establece los datos asociados con el iterador de la entrada actual

# SplObjectStorage::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::key — Devuelve el índice en el que se encuentra el iterador actualmente

### Descripción

public **SplObjectStorage::key**(): [int](#language.types.integer)

Devuelve el índice en el que se encuentra el iterador actualmente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El índice correspondiente a la posición del iterador.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::key()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$index  = $s-&gt;key();
    $object = $s-&gt;current(); // similar a current($s)

    var_dump($index);
    var_dump($object);
    $s-&gt;next();

}
?&gt;

    Resultado del ejemplo anterior es similar a:

int(0)
object(stdClass)#2 (0) {
}
int(1)
object(stdClass)#3 (0) {
}

### Ver también

    - [SplObjectStorage::rewind()](#splobjectstorage.rewind) - Rebobina el iterador a el primer elemento de el almacenamiento

    - [SplObjectStorage::current()](#splobjectstorage.current) - Devuelve el objeto actual

    - [SplObjectStorage::next()](#splobjectstorage.next) - Mover a la siguiente entrada

    - [SplObjectStorage::valid()](#splobjectstorage.valid) - Comprobar si la entrada actual del iterador es válida

# SplObjectStorage::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::next — Mover a la siguiente entrada

### Descripción

public **SplObjectStorage::next**(): [void](language.types.void.html)

Mover el iterador al siguiente [object](#language.types.object) en el almacenamiento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::next()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$index  = $s-&gt;key();
    $object = $s-&gt;current(); // similar a current($s)

    var_dump($index);
    var_dump($object);
    $s-&gt;next();

}
?&gt;

    Resultado del ejemplo anterior es similar a:

int(0)
object(stdClass)#2 (0) {
}
int(1)
object(stdClass)#3 (0) {
}

### Ver también

    - [SPLObjectStorage::rewind()](#splobjectstorage.rewind) - Rebobina el iterador a el primer elemento de el almacenamiento

# SplObjectStorage::offsetExists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::offsetExists — Comprueba si un objeto existe en el almacenamiento

### Descripción

public **SplObjectStorage::offsetExists**([object](#language.types.object) $object): [bool](#language.types.boolean)

Comprueba si un [object](#language.types.object) existe en el almacenamiento.

**Nota**:

    **SplObjectStorage::offsetExists()** es un alias de [SplObjectStorage::contains()](#splobjectstorage.contains).

### Parámetros

     object


       El [object](#language.types.object) a ser comprobado.





### Valores devueltos

Devuelve **[true](#constant.true)** si el [object](#language.types.object) existe en el almacenamiento,
y **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::offsetExists()**

&lt;?php
$s = new SplObjectStorage;
$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1);

var_dump($s-&gt;offsetExists($o1)); // Similar a isset($s[$o1])
var_dump($s-&gt;offsetExists($o2)); // Similar a isset($s[$o2])
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

### Ver también

    - [SplObjectStorage::offsetSet()](#splobjectstorage.offsetset) - Asocia datos a un objeto en el almacenamiento

    - [SplObjectStorage::offsetGet()](#splobjectstorage.offsetget) - Devuelve los datos asociados con un object

    - [SplObjectStorage::offsetUnset()](#splobjectstorage.offsetunset) - Quita un objeto de el almacenamiento

# SplObjectStorage::offsetGet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::offsetGet — Devuelve los datos asociados con un [object](#language.types.object)

### Descripción

public **SplObjectStorage::offsetGet**([object](#language.types.object) $object): [mixed](#language.types.mixed)

Devuelve los datos asociados con un [object](#language.types.object) en el almacenamiento.

### Parámetros

     object


       El [object](#language.types.object) a ser comprobado.





### Valores devueltos

Los datos previamente asociados con el [object](#language.types.object) en el almacenamiento.

### Errores/Excepciones

Lanza una excepción de tipo [UnexpectedValueException](#class.unexpectedvalueexception) cuando no se pudo encontrar object.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::offsetGet()**

&lt;?php
$s = new SplObjectStorage;

$o1 = new stdClass;
$o2 = new stdClass;

$s[$o1] = "hola";
$s-&gt;attach($o2);

var_dump($s-&gt;offsetGet($o1)); // Similar a $s[$o1]
var_dump($s-&gt;offsetGet($o2)); // Similar a $s[$o2]
?&gt;

    Resultado del ejemplo anterior es similar a:

string(4) "hola"
NULL

### Ver también

    - [SplObjectStorage::offsetSet()](#splobjectstorage.offsetset) - Asocia datos a un objeto en el almacenamiento

    - [SplObjectStorage::offsetExists()](#splobjectstorage.offsetexists) - Comprueba si un objeto existe en el almacenamiento

    - [SplObjectStorage::offsetUnset()](#splobjectstorage.offsetunset) - Quita un objeto de el almacenamiento

# SplObjectStorage::offsetSet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::offsetSet — Asocia datos a un objeto en el almacenamiento

### Descripción

public **SplObjectStorage::offsetSet**([object](#language.types.object) $object, [mixed](#language.types.mixed) $info = **[null](#constant.null)**): [void](language.types.void.html)

Asocia datos a un [object](#language.types.object) en el almacenamiento.

**Nota**:

    **SplObjectStorage::offsetSet()** es un alias de [SplObjectStorage::attach()](#splobjectstorage.attach).

### Parámetros

     object


       El [object](#language.types.object) al que se le van a asociar datos.






     info


       Los datos asociados con el [object](#language.types.object).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::offsetSet()**

&lt;?php
$s = new SplObjectStorage;

$o1 = new stdClass;

$s-&gt;offsetSet($o1, "hola"); // Similar a $s[$o1] = "hola";

var_dump($s[$o1]);
?&gt;

    Resultado del ejemplo anterior es similar a:

string(4) "hola"

### Ver también

    - [SplObjectStorage::attach()](#splobjectstorage.attach) - Agrega un objeto en el almacenamiento

    - [SplObjectStorage::offsetGet()](#splobjectstorage.offsetget) - Devuelve los datos asociados con un object

    - [SplObjectStorage::offsetExists()](#splobjectstorage.offsetexists) - Comprueba si un objeto existe en el almacenamiento

    - [SplObjectStorage::offsetUnset()](#splobjectstorage.offsetunset) - Quita un objeto de el almacenamiento

# SplObjectStorage::offsetUnset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::offsetUnset — Quita un objeto de el almacenamiento

### Descripción

public **SplObjectStorage::offsetUnset**([object](#language.types.object) $object): [void](language.types.void.html)

Quitar un [object](#language.types.object) de el almacenamiento.

**Nota**:

    **SplObjectStorage::offsetUnset()** es un alias de [SplObjectStorage::detach()](#splobjectstorage.detach).

### Parámetros

     object


       El [object](#language.types.object) a ser removido.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::offsetUnset()**

&lt;?php
$o = new stdClass;
$s = new SplObjectStorage();
$s-&gt;attach($o);
var_dump(count($s));
$s-&gt;offsetUnset($o); // Similar a unset($s[$o])
var_dump(count($s));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(1)
int(0)

### Ver también

    - [SplObjectStorage::offsetGet()](#splobjectstorage.offsetget) - Devuelve los datos asociados con un object

    - [SplObjectStorage::offsetSet()](#splobjectstorage.offsetset) - Asocia datos a un objeto en el almacenamiento

    - [SplObjectStorage::offsetExists()](#splobjectstorage.offsetexists) - Comprueba si un objeto existe en el almacenamiento

# SplObjectStorage::removeAll

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::removeAll — Remover objetos contenidos en otro almacenamiento de el almacenamiento actual

### Descripción

public **SplObjectStorage::removeAll**([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)

Remover objetos contenidos en otro almacenamiento de el almacenamiento actual.

### Parámetros

     storage


       El almacenamiento que contiene los elementos a remover.





### Valores devueltos

Devuelve el número de objetos restantes.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::removeAll()**

&lt;?php
$o1 = new stdClass;
$o2 = new stdClass;
$a = new SplObjectStorage();
$a[$o1] = "foo";

$b = new SplObjectStorage();
$b[$o1] = "bar";
$b[$o2] = "gee";

var_dump(count($b));
$b-&gt;removeAll($a);
var_dump(count($b));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(2)
int(1)

### Ver también

    - [SplObjectStorage::addAll()](#splobjectstorage.addall) - Agrega todos los objetos de otro almacenamiento

# SplObjectStorage::removeAllExcept

(PHP 5 &gt;= 5.3.6, PHP 7, PHP 8)

SplObjectStorage::removeAllExcept — Remover objetos excepto los contenidos en otro almacenamiento del almacenamiento actual

### Descripción

public **SplObjectStorage::removeAllExcept**([SplObjectStorage](#class.splobjectstorage) $storage): [int](#language.types.integer)

Remover todos los objetos excepto los contenidos en otro almacenamiento del almacenamiento actual.

### Parámetros

     storage


       El almacenamiento que contiene los elementos a mantener en el almacenamiento actual.





### Valores devueltos

Devuelve el número de objetos restantes.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::removeAllExcept()**

&lt;?php
$a = (object) 'a';
$b = (object) 'b';
$c = (object) 'c';

$foo = new SplObjectStorage;
$foo-&gt;attach($a);
$foo-&gt;attach($b);

$bar = new SplObjectStorage;
$bar-&gt;attach($b);
$bar-&gt;attach($c);

$foo-&gt;removeAllExcept($bar);
var_dump($foo-&gt;contains($a));
var_dump($foo-&gt;contains($b));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# SplObjectStorage::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::rewind — Rebobina el iterador a el primer elemento de el almacenamiento

### Descripción

public **SplObjectStorage::rewind**(): [void](language.types.void.html)

Rebobina el iterador al primer elemento del almacenamiento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::rewind()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$index  = $s-&gt;key();
    $object = $s-&gt;current(); // similar a current($s)
$data = $s-&gt;getInfo();

    var_dump($object);
    var_dump($data);
    $s-&gt;next();

}
?&gt;

    Resultado del ejemplo anterior es similar a:

int(1)
int(0)

### Ver también

    - [SplObjectStorage::next()](#splobjectstorage.next) - Mover a la siguiente entrada

# SplObjectStorage::seek

(PHP 8 &gt;= 8.4.0)

SplObjectStorage::seek — Busca un iterador en una posición

### Descripción

public **SplObjectStorage::seek**([int](#language.types.integer) $offset): [void](language.types.void.html)

Busca en una posición dada en el iterador.

### Parámetros

    offset


      La posición a buscar.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [OutOfBoundsException](#class.outofboundsexception)
si el offset no es accesible.

### Ejemplos

**Ejemplo #1 Ejemplo de SplObjectStorage::seek()**

    Busca la posición 2 en el iterador.

&lt;?php
class Test {
public function \_\_construct(public string $marker) {}
}

$a = new Test("a");
$b = new Test("b");
$c = new Test("c");

$storage = new SplObjectStorage();
$storage[$a] = "first";
$storage[$b] = "second";
$storage[$c] = "third";

$storage-&gt;seek(2);
var_dump($storage-&gt;key());
var_dump($storage-&gt;current());
?&gt;

El ejemplo anterior mostrará:

int(2)
object(Test)#3 (1) {
["marker"]=&gt;
string(1) "c"
}

### Ver también

- [SeekableIterator](#class.seekableiterator)

# SplObjectStorage::serialize

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

SplObjectStorage::serialize — Serializa el almacenamiento

### Descripción

public **SplObjectStorage::serialize**(): [string](#language.types.string)

Devuelve un string que representa el almacenamiento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un string que representa el almacenamiento.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::serialize()**

&lt;?php
$s = new SplObjectStorage;
$o = new stdClass;
$s[$o] = "datos";

echo $s-&gt;serialize()."\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

x:i:1;O:8:"stdClass":0:{},s:4:"datos";;m:a:0:{}

### Ver también

    - [SplObjectStorage::unserialize()](#splobjectstorage.unserialize) - Deserializa un almacenamiento desde su representación string

# SplObjectStorage::setInfo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SplObjectStorage::setInfo — Establece los datos asociados con el iterador de la entrada actual

### Descripción

public **SplObjectStorage::setInfo**([mixed](#language.types.mixed) $info): [void](language.types.void.html)

Asocia datos o información, con el objeto actualmente señalado por el iterador.

### Parámetros

     info


       Los datos a ser asociados con la entrada del iterador actual.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::setInfo()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
$s-&gt;setInfo("new");
    $s-&gt;next();
}
var_dump($s[$o1]);
var_dump($s[$o2]);
?&gt;

    Resultado del ejemplo anterior es similar a:

string(3) "new"
string(3) "new"

### Ver también

    - [SplObjectStorage::current()](#splobjectstorage.current) - Devuelve el objeto actual

    - [SplObjectStorage::rewind()](#splobjectstorage.rewind) - Rebobina el iterador a el primer elemento de el almacenamiento

    - [SplObjectStorage::key()](#splobjectstorage.key) - Devuelve el índice en el que se encuentra el iterador actualmente

    - [SplObjectStorage::next()](#splobjectstorage.next) - Mover a la siguiente entrada

    - [SplObjectStorage::valid()](#splobjectstorage.valid) - Comprobar si la entrada actual del iterador es válida

    - [SplObjectStorage::getInfo()](#splobjectstorage.getinfo) - Devuelve los datos asociados con la entrada del iterador actual

# SplObjectStorage::unserialize

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

SplObjectStorage::unserialize — Deserializa un almacenamiento desde su representación string

### Descripción

public **SplObjectStorage::unserialize**([string](#language.types.string) $data): [void](language.types.void.html)

Deserializa las entradas del almacenamiento y los añade al almacenamiento actual.

### Parámetros

     data


       La representación serializada del almacenamiento.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::unserialize()**

&lt;?php
$s1 = new SplObjectStorage;
$s2 = new SplObjectStorage;
$o = new stdClass;
$s1[$o] = "datos";

$s2-&gt;unserialize($s1-&gt;serialize());

var_dump(count($s2));
?&gt;

    Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

    - [SplObjectStorage::serialize()](#splobjectstorage.serialize) - Serializa el almacenamiento

# SplObjectStorage::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplObjectStorage::valid — Comprobar si la entrada actual del iterador es válida

### Descripción

public **SplObjectStorage::valid**(): [bool](#language.types.boolean)

Devuelve si la entrada actual del iterador es válida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la entrada actual del iterador es válida, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplObjectStorage::valid()**

&lt;?php
$s = new SplObjectStorage();

$o1 = new stdClass;
$o2 = new stdClass;

$s-&gt;attach($o1, "d1");
$s-&gt;attach($o2, "d2");

$s-&gt;rewind();
while($s-&gt;valid()) {
echo $s-&gt;key()."\n";
$s-&gt;next();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

0
1

### Ver también

    - [SplObjectStorage::current()](#splobjectstorage.current) - Devuelve el objeto actual

    - [SplObjectStorage::getInfo()](#splobjectstorage.getinfo) - Devuelve los datos asociados con la entrada del iterador actual

## Tabla de contenidos

- [SplObjectStorage::addAll](#splobjectstorage.addall) — Agrega todos los objetos de otro almacenamiento
- [SplObjectStorage::attach](#splobjectstorage.attach) — Agrega un objeto en el almacenamiento
- [SplObjectStorage::contains](#splobjectstorage.contains) — Comprueba si el almacenamiento contiene un objeto específico
- [SplObjectStorage::count](#splobjectstorage.count) — Devuelve el número de objetos en el almacenamiento
- [SplObjectStorage::current](#splobjectstorage.current) — Devuelve el objeto actual
- [SplObjectStorage::detach](#splobjectstorage.detach) — Quita un object del almacenamiento
- [SplObjectStorage::getHash](#splobjectstorage.gethash) — Calcular un identificador único (hash) para los objetos contenidos
- [SplObjectStorage::getInfo](#splobjectstorage.getinfo) — Devuelve los datos asociados con la entrada del iterador actual
- [SplObjectStorage::key](#splobjectstorage.key) — Devuelve el índice en el que se encuentra el iterador actualmente
- [SplObjectStorage::next](#splobjectstorage.next) — Mover a la siguiente entrada
- [SplObjectStorage::offsetExists](#splobjectstorage.offsetexists) — Comprueba si un objeto existe en el almacenamiento
- [SplObjectStorage::offsetGet](#splobjectstorage.offsetget) — Devuelve los datos asociados con un object
- [SplObjectStorage::offsetSet](#splobjectstorage.offsetset) — Asocia datos a un objeto en el almacenamiento
- [SplObjectStorage::offsetUnset](#splobjectstorage.offsetunset) — Quita un objeto de el almacenamiento
- [SplObjectStorage::removeAll](#splobjectstorage.removeall) — Remover objetos contenidos en otro almacenamiento de el almacenamiento actual
- [SplObjectStorage::removeAllExcept](#splobjectstorage.removeallexcept) — Remover objetos excepto los contenidos en otro almacenamiento del almacenamiento actual
- [SplObjectStorage::rewind](#splobjectstorage.rewind) — Rebobina el iterador a el primer elemento de el almacenamiento
- [SplObjectStorage::seek](#splobjectstorage.seek) — Busca un iterador en una posición
- [SplObjectStorage::serialize](#splobjectstorage.serialize) — Serializa el almacenamiento
- [SplObjectStorage::setInfo](#splobjectstorage.setinfo) — Establece los datos asociados con el iterador de la entrada actual
- [SplObjectStorage::unserialize](#splobjectstorage.unserialize) — Deserializa un almacenamiento desde su representación string
- [SplObjectStorage::valid](#splobjectstorage.valid) — Comprobar si la entrada actual del iterador es válida

# Excepciones

## Tabla de contenidos

- [BadFunctionCallException](#class.badfunctioncallexception)
- [BadMethodCallException](#class.badmethodcallexception)
- [DomainException](#class.domainexception)
- [InvalidArgumentException](#class.invalidargumentexception)
- [LengthException](#class.lengthexception)
- [LogicException](#class.logicexception)
- [OutOfBoundsException](#class.outofboundsexception)
- [OutOfRangeException](#class.outofrangeexception)
- [OverflowException](#class.overflowexception)
- [RangeException](#class.rangeexception)
- [RuntimeException](#class.runtimeexception)
- [UnderflowException](#class.underflowexception)
- [UnexpectedValueException](#class.unexpectedvalueexception)

    SPL provee un conjunto de Excepciones estándar.

    ## Árbol de Clases de Excepciones de SPL
    - [LogicException](#class.logicexception) (extends [Exception](#class.exception))

         <li class="listitem">
          [BadFunctionCallException](#class.badfunctioncallexception)
          
           <li class="listitem">[BadMethodCallException](#class.badmethodcallexception)

         </li>
         - [DomainException](#class.domainexception)
        - [InvalidArgumentException](#class.invalidargumentexception)

        - [LengthException](#class.lengthexception)

        - [OutOfRangeException](#class.outofrangeexception)

      </li>
      - 
       [RuntimeException](#class.runtimeexception) (extends [Exception](#class.exception))
       
        <li class="listitem">[OutOfBoundsException](#class.outofboundsexception)

        - [OverflowException](#class.overflowexception)

        - [RangeException](#class.rangeexception)

        - [UnderflowException](#class.underflowexception)

        - [UnexpectedValueException](#class.unexpectedvalueexception)

      </li>


    ## Ver también
    - [Excepciones predefinidas](#reserved.exceptions)

# La clase BadFunctionCallException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si la llamada de retorno hace referencia a una función no definida
    o faltan algunos de los argumentos.

## Sinopsis de la Clase

     class **BadFunctionCallException**



     extends
      [LogicException](#class.logicexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase BadMethodCallException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si la llamada de retorno hace referencia a una función no definida
    o faltan algunos de los argumentos.

## Sinopsis de la Clase

     class **BadMethodCallException**



     extends
      [BadFunctionCallException](#class.badfunctioncallexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase DomainException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Excepción lanzada si un valor no se adhiere a un dominio definido de datos válidos.

## Sinopsis de la Clase

     class **DomainException**



     extends
      [LogicException](#class.logicexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# The InvalidArgumentException class

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Excepción lanzada si un argumento no es del tipo previsto.

## Sinopsis de la Clase

     class **InvalidArgumentException**



     extends
      [LogicException](#class.logicexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase LengthException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si el valor longitud no es válido.

## Sinopsis de la Clase

     class **LengthException**



     extends
      [LogicException](#class.logicexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase LogicException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Excepción que representa un error en la lógica del programa. Este tipo
    de excepciones debería conducir directamente a una reparación del código.

## Sinopsis de la Clase

     class **LogicException**



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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase OutOfBoundsException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si el valor no es una clave válida. Representa los
    errores que no pueden ser detectados en tiempo de ejecucción.

## Sinopsis de la Clase

     class **OutOfBoundsException**



     extends
      [RuntimeException](#class.runtimeexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase OutOfRangeException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción cuando se solicita un índice ilegal. Esto representa
    un error que debe ser detectado en tiempo de compilación.

## Sinopsis de la Clase

     class **OutOfRangeException**



     extends
      [LogicException](#class.logicexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase OverflowException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción cuando se agrega un elemento en un contenedor lleno.

## Sinopsis de la Clase

     class **OverflowException**



     extends
      [RuntimeException](#class.runtimeexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase RangeException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Excepción que se produce para indicar los errores de rango durante la ejecución del programa.
    Normalmente, esto significa que hubo un error aritmético
    distinto a bajo/sobre flujo. Esta es la versión en tiempo de ejecución de
    [DomainException](#class.domainexception).

## Sinopsis de la Clase

     class **RangeException**



     extends
      [RuntimeException](#class.runtimeexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase RuntimeException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si hay un error que sólo se puede encontrar en tiempo de ejecución.

## Sinopsis de la Clase

     class **RuntimeException**



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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase UnderflowException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción cuando se lleva a cabo una operación no válida o un contenedor
    vacío, tal como eliminar un elemento.

## Sinopsis de la Clase

     class **UnderflowException**



     extends
      [RuntimeException](#class.runtimeexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# La clase UnexpectedValueException

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Lanza una excepción si un valor no coincide con un grupo de valores. Generalmente,
    esto sucede cuando una función llama a otra función y espera que el valor de retorno
    sea de cierto tipo o un valor aritmético no incluido o un errores relacionados con el
    buffer.

## Sinopsis de la Clase

     class **UnexpectedValueException**



     extends
      [RuntimeException](#class.runtimeexception)
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

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

# Iteradores

## Tabla de contenidos

- [AppendIterator](#class.appenditerator)
- [ArrayIterator](#class.arrayiterator)
- [CachingIterator](#class.cachingiterator)
- [CallbackFilterIterator](#class.callbackfilteriterator)
- [DirectoryIterator](#class.directoryiterator)
- [EmptyIterator](#class.emptyiterator)
- [FilesystemIterator](#class.filesystemiterator)
- [FilterIterator](#class.filteriterator)
- [GlobIterator](#class.globiterator)
- [InfiniteIterator](#class.infiniteiterator)
- [IteratorIterator](#class.iteratoriterator)
- [LimitIterator](#class.limititerator)
- [MultipleIterator](#class.multipleiterator)
- [NoRewindIterator](#class.norewinditerator)
- [ParentIterator](#class.parentiterator)
- [RecursiveArrayIterator](#class.recursivearrayiterator)
- [RecursiveCachingIterator](#class.recursivecachingiterator)
- [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator)
- [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)
- [RecursiveFilterIterator](#class.recursivefilteriterator)
- [RecursiveIteratorIterator](#class.recursiveiteratoriterator)
- [RecursiveRegexIterator](#class.recursiveregexiterator)
- [RecursiveTreeIterator](#class.recursivetreeiterator)
- [RegexIterator](#class.regexiterator)

    SPL provee un conjunto de iteradores para recorrer objetos.

    ## Árbol de las Clases de Iteradores de SPL
    - [ArrayIterator](#class.arrayiterator)

         <li class="listitem">
          [RecursiveArrayIterator](#class.recursivearrayiterator)


      </li>
      
      - 
       [EmptyIterator](#class.emptyiterator)

    - [IteratorIterator](#class.iteratoriterator)

         <li class="listitem">
          [AppendIterator](#class.appenditerator)

        - [CachingIterator](#class.cachingiterator)

             <li class="listitem">
              [RecursiveCachingIterator](#class.recursivecachingiterator)


         </li>
         - 
          [FilterIterator](#class.filteriterator)
          
           <li class="listitem">
            [CallbackFilterIterator](#class.callbackfilteriterator)
            
             <li class="listitem">
              [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator)


           </li>
           - 
            [RecursiveFilterIterator](#class.recursivefilteriterator)
            
             <li class="listitem">
              [ParentIterator](#class.parentiterator)


           </li>
           - 
            [RegexIterator](#class.regexiterator)
            
             <li class="listitem">
              [RecursiveRegexIterator](#class.recursiveregexiterator)


           </li>
          
         </li>
         - 
          [InfiniteIterator](#class.infiniteiterator)

        - [LimitIterator](#class.limititerator)
        - [NoRewindIterator](#class.norewinditerator)

      </li>
      
      - 
       [MultipleIterator](#class.multipleiterator)

    - [RecursiveIteratorIterator](#class.recursiveiteratoriterator)

         <li class="listitem">
          [RecursiveTreeIterator](#class.recursivetreeiterator)


      </li>
      
      - 
       [DirectoryIterator](#class.directoryiterator) (extends [SplFileInfo](#class.splfileinfo))
       
        <li class="listitem">
         [FilesystemIterator](#class.filesystemiterator)
         
          <li class="listitem">
           [GlobIterator](#class.globiterator)


          -
           [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)



        </li>

      </li>


# La clase AppendIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Iterador que recorre varios iteradores uno tras otro.

## Sinopsis de la Clase

     class **AppendIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)
     {

    /* Métodos */

public [\_\_construct](#appenditerator.construct)()

    public [append](#appenditerator.append)([Iterator](#class.iterator) $iterator): [void](language.types.void.html)

public [current](#appenditerator.current)(): [mixed](#language.types.mixed)
public [getArrayIterator](#appenditerator.getarrayiterator)(): [ArrayIterator](#class.arrayiterator)
public [getIteratorIndex](#appenditerator.getiteratorindex)(): [?](#language.types.null)[int](#language.types.integer)
public [key](#appenditerator.key)(): scalar
public [next](#appenditerator.next)(): [void](language.types.void.html)
public [rewind](#appenditerator.rewind)(): [void](language.types.void.html)
public [valid](#appenditerator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# AppendIterator::append

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::append — Añade un iterador

### Descripción

public **AppendIterator::append**([Iterator](#class.iterator) $iterator): [void](language.types.void.html)

Añade un iterador.

### Parámetros

     iterator


       El iterador a añadir.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de AppendIterator::append()**

&lt;?php
$array_a = new ArrayIterator(array('a', 'b', 'c'));
$array_b = new ArrayIterator(array('d', 'e', 'f'));

$iterator = new AppendIterator;
$iterator-&gt;append($array_a);
$iterator-&gt;append($array_b);

foreach ($iterator as $current) {
echo $current;
}
?&gt;

    El ejemplo anterior mostrará:

abcdef

### Ver también

    - [AppendIterator::__construct()](#appenditerator.construct) - Construye un AppendIterator

# AppendIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::\_\_construct — Construye un AppendIterator

### Descripción

public **AppendIterator::\_\_construct**()

Construye un AppendIterator.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

    **Ejemplo #1 Recorriendo AppendIterator con foreach**

&lt;?php
$pizzas   = new ArrayIterator(array('Margarita', 'Siciliana', 'Hawaii'));
$ingredientes = new ArrayIterator(array('Cheese', 'Anchovies', 'Olives', 'Pineapple', 'Ham'));

$appendIterator = new AppendIterator;
$appendIterator-&gt;append($pizzas);
$appendIterator-&gt;append($ingredientes);

foreach ($appendIterator as $key =&gt; $item) {
echo $key . ' =&gt; ' . $item . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

0 =&gt; Margarita
1 =&gt; Siciliana
2 =&gt; Hawaii
0 =&gt; Cheese
1 =&gt; Anchovies
2 =&gt; Olives
3 =&gt; Pineapple
4 =&gt; Ham

    **Ejemplo #2 Recorriendo AppendIterator con la API de AppendIterator**

&lt;?php
$pizzas   = new ArrayIterator(array('Margarita', 'Siciliana', 'Hawaii'));
$ingredientes = new ArrayIterator(array('Cheese', 'Anchovies', 'Olives', 'Pineapple', 'Ham'));

$appendIterator = new AppendIterator;
$appendIterator-&gt;append($pizzas);
$appendIterator-&gt;append($ingredientes);

while ($appendIterator-&gt;valid()) {
printf(
'%s =&gt; %s =&gt; %s%s',
$appendIterator-&gt;getIteratorIndex(),
$appendIterator-&gt;key(),
$appendIterator-&gt;current(),
PHP_EOL
);
$appendIterator-&gt;next();
}
?&gt;

    El ejemplo anterior mostrará:

0 =&gt; 0 =&gt; Margarita
0 =&gt; 1 =&gt; Siciliana
0 =&gt; 2 =&gt; Hawaii
1 =&gt; 0 =&gt; Cheese
1 =&gt; 1 =&gt; Anchovies
1 =&gt; 2 =&gt; Olives
1 =&gt; 3 =&gt; Pineapple
1 =&gt; 4 =&gt; Ham

### Notas

**Precaución**

    Al usar [iterator_to_array()](#function.iterator-to-array) para copiar los valores de AppendIterator
    a un array, debe asignarse al parámetro opcional use_key el valor
    **[false](#constant.false)**. Si use_key no es **[false](#constant.false)**, las claves que se repitan en los
    iteradores internos se sobrescribirán en el array final. No existe ninguna forma para preservar las claves originales.

### Ver también

    - [AppendIterator::append()](#appenditerator.append) - Añade un iterador

# AppendIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::current — Obtiene el valor actual

### Descripción

public **AppendIterator::current**(): [mixed](#language.types.mixed)

Obtiene el valor actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Si el valor actual es válido o **[null](#constant.null)** en caso contrario.

### Ver también

    - [Iterator::current()](#iterator.current) - Devuelve el elemento actual

    - [AppendIterator::key()](#appenditerator.key) - Obtiene la clave actual

    - [AppendIterator::valid()](#appenditerator.valid) - Comprueba la validación del elemento actual

    - [AppendIterator::next()](#appenditerator.next) - Desplazarse al siguiente elemento

    - [AppendIterator::rewind()](#appenditerator.rewind) - Rebobina el iterador

# AppendIterator::getArrayIterator

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

AppendIterator::getArrayIterator — Obtiene el getArrayIterator

### Descripción

public **AppendIterator::getArrayIterator**(): [ArrayIterator](#class.arrayiterator)

Este método obtiene el objeto [ArrayIterator](#class.arrayiterator) empleado para
almacenar los iteradores añadidos con [AppendIterator::append()](#appenditerator.append).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [ArrayIterator](#class.arrayiterator) que contiene
los iteradores añadidos.

### Ver también

    - **AppendIterator::getInnerIterator()**

# AppendIterator::getIteratorIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

AppendIterator::getIteratorIndex — Lee el índice de un iterador

### Descripción

public **AppendIterator::getIteratorIndex**(): [?](#language.types.null)[int](#language.types.integer)

Lee el índice del iterador interno actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el índice entero, comenzando desde 0, del iterador interno si existe,
**[null](#constant.null)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con AppendIterator.getIteratorIndex()**

&lt;?php
$array_a = new ArrayIterator(array('a' =&gt; 'aardwolf', 'b' =&gt; 'bear', 'c' =&gt; 'capybara'));
$array_b = new ArrayIterator(array('apple', 'orange', 'lemon'));

$iterator = new AppendIterator;
$iterator-&gt;append($array_a);
$iterator-&gt;append($array_b);

foreach ($iterator as $key =&gt; $current) {
echo $iterator-&gt;getIteratorIndex() . ' ' . $key . ' ' . $current . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

0 a aardwolf
0 b bear
0 c capybara
1 0 apple
1 1 orange
1 2 lemon

### Ver también

    - **AppendIterator::getInnerIterator()**

    - [AppendIterator::getArrayIterator()](#appenditerator.getarrayiterator) - Obtiene el getArrayIterator

# AppendIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::key — Obtiene la clave actual

### Descripción

public **AppendIterator::key**(): scalar

Obtener la clave actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave actual si es válida o **[null](#constant.null)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo básico de AppendIterator::key()**

&lt;?php
$array_a = new ArrayIterator(array('a' =&gt; 'aardwolf', 'b' =&gt; 'bear', 'c' =&gt; 'capybara'));
$array_b = new ArrayIterator(array('apple', 'orange', 'lemon'));

$iterator = new AppendIterator;
$iterator-&gt;append($array_a);
$iterator-&gt;append($array_b);

// Manual iteration
$iterator-&gt;rewind();
while ($iterator-&gt;valid()) {
echo $iterator-&gt;key() . ' ' . $iterator-&gt;current() . PHP_EOL;
$iterator-&gt;next();
}

echo PHP_EOL;

// With foreach
foreach ($iterator as $key =&gt; $current) {
echo $key . ' ' . $current . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

a aardwolf
b bear
c capybara
0 apple
1 orange
2 lemon

a aardwolf
b bear
c capybara
0 apple
1 orange
2 lemon

### Ver también

    - [Iterator::key()](#iterator.key) - Devuelve la clave del elemento actual

    - [AppendIterator::current()](#appenditerator.current) - Obtiene el valor actual

    - [AppendIterator::valid()](#appenditerator.valid) - Comprueba la validación del elemento actual

    - [AppendIterator::next()](#appenditerator.next) - Desplazarse al siguiente elemento

    - [AppendIterator::rewind()](#appenditerator.rewind) - Rebobina el iterador

# AppendIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::next — Desplazarse al siguiente elemento

### Descripción

public **AppendIterator::next**(): [void](language.types.void.html)

Se desplaza al siguiente elemento. Esto significa a otro iterador
por lo que rebobina ese iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

    - [AppendIterator::current()](#appenditerator.current) - Obtiene el valor actual

    - [AppendIterator::key()](#appenditerator.key) - Obtiene la clave actual

    - [AppendIterator::valid()](#appenditerator.valid) - Comprueba la validación del elemento actual

    - [AppendIterator::rewind()](#appenditerator.rewind) - Rebobina el iterador

# AppendIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::rewind — Rebobina el iterador

### Descripción

public **AppendIterator::rewind**(): [void](language.types.void.html)

Rebobina al primer elemento del primer iterador interno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [Iterator::rewind()](#iterator.rewind) - Rebobine la Iterator al primer elemento

    - [AppendIterator::current()](#appenditerator.current) - Obtiene el valor actual

    - [AppendIterator::key()](#appenditerator.key) - Obtiene la clave actual

    - [AppendIterator::next()](#appenditerator.next) - Desplazarse al siguiente elemento

    - [AppendIterator::valid()](#appenditerator.valid) - Comprueba la validación del elemento actual

# AppendIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

AppendIterator::valid — Comprueba la validación del elemento actual

### Descripción

public **AppendIterator::valid**(): [bool](#language.types.boolean)

Comprueba la validación del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la iteración actual es válida, **[false](#constant.false)** en caso contrario.

### Ver también

    - [AppendIterator::current()](#appenditerator.current) - Obtiene el valor actual

    - [AppendIterator::key()](#appenditerator.key) - Obtiene la clave actual

    - [AppendIterator::next()](#appenditerator.next) - Desplazarse al siguiente elemento

    - [AppendIterator::rewind()](#appenditerator.rewind) - Rebobina el iterador

## Tabla de contenidos

- [AppendIterator::append](#appenditerator.append) — Añade un iterador
- [AppendIterator::\_\_construct](#appenditerator.construct) — Construye un AppendIterator
- [AppendIterator::current](#appenditerator.current) — Obtiene el valor actual
- [AppendIterator::getArrayIterator](#appenditerator.getarrayiterator) — Obtiene el getArrayIterator
- [AppendIterator::getIteratorIndex](#appenditerator.getiteratorindex) — Lee el índice de un iterador
- [AppendIterator::key](#appenditerator.key) — Obtiene la clave actual
- [AppendIterator::next](#appenditerator.next) — Desplazarse al siguiente elemento
- [AppendIterator::rewind](#appenditerator.rewind) — Rebobina el iterador
- [AppendIterator::valid](#appenditerator.valid) — Comprueba la validación del elemento actual

# La clase [ArrayIterator](#class.arrayiterator)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Permite la eliminación de elementos y la modificación de
    claves o valores durante la iteración de [array](#language.types.array)s o de [object](#language.types.object)s.




    Para recorrer el mismo array varias veces, se recomienda
    instanciar [ArrayObject](#class.arrayobject) y utilizar la instancia de
    **ArrayIterator** ya sea creada implícitamente
    utilizando [foreach](#control-structures.foreach) para iterar sobre el array almacenado internamente, o creando una
    llamando manualmente al método [ArrayObject::getIterator()](#arrayobject.getiterator).

## Sinopsis de la Clase

     class **ArrayIterator**



     implements
      [SeekableIterator](#class.seekableiterator),

     [ArrayAccess](#class.arrayaccess),

     [Serializable](#class.serializable),

     [Countable](#class.countable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [STD_PROP_LIST](#arrayiterator.constants.std-prop-list);

    public
     const
     [int](#language.types.integer)
      [ARRAY_AS_PROPS](#arrayiterator.constants.array-as-props);


    /* Métodos */

public [\_\_construct](#arrayiterator.construct)([array](#language.types.array)|[object](#language.types.object) $array = [], [int](#language.types.integer) $flags = 0)

    public [append](#arrayiterator.append)([mixed](#language.types.mixed) $value): [void](language.types.void.html)

public [asort](#arrayiterator.asort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [count](#arrayiterator.count)(): [int](#language.types.integer)
public [current](#arrayiterator.current)(): [mixed](#language.types.mixed)
public [getArrayCopy](#arrayiterator.getarraycopy)(): [array](#language.types.array)
public [getFlags](#arrayiterator.getflags)(): [int](#language.types.integer)
public [key](#arrayiterator.key)(): [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)
public [ksort](#arrayiterator.ksort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [natcasesort](#arrayiterator.natcasesort)(): [true](#language.types.singleton)
public [natsort](#arrayiterator.natsort)(): [true](#language.types.singleton)
public [next](#arrayiterator.next)(): [void](language.types.void.html)
public [offsetExists](#arrayiterator.offsetexists)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
public [offsetGet](#arrayiterator.offsetget)([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)
public [offsetSet](#arrayiterator.offsetset)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#arrayiterator.offsetunset)([mixed](#language.types.mixed) $key): [void](language.types.void.html)
public [rewind](#arrayiterator.rewind)(): [void](language.types.void.html)
public [seek](#arrayiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [serialize](#arrayiterator.serialize)(): [string](#language.types.string)
public [setFlags](#arrayiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [uasort](#arrayiterator.uasort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [uksort](#arrayiterator.uksort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [unserialize](#arrayiterator.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [valid](#arrayiterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Flags de ArrayIterator




      **[ArrayIterator::STD_PROP_LIST](#arrayiterator.constants.std-prop-list)**


        Las propiedades del objeto conservan sus funcionalidades normales
        cuando son accedidas como lista ([var_dump()](#function.var-dump), [foreach](#control-structures.foreach), etc.).







      **[ArrayIterator::ARRAY_AS_PROPS](#arrayiterator.constants.array-as-props)**


        Las entradas pueden ser accedidas como propiedades (lectura y escritura).






# ArrayIterator::append

(PHP 5, PHP 7, PHP 8)

ArrayIterator::append — Añade un elemento

### Descripción

public **ArrayIterator::append**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Añade el valor cómo el último elemento.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     value


       El valor a añadir.





### Valores devueltos

No se retorna ningún valor.

### Notas

**Nota**:

    Este método no puede ser llamado cuando [ArrayIterator](#class.arrayiterator)
    hace referencia a un objeto.

### Ver también

    - [ArrayIterator::next()](#arrayiterator.next) - Desplaza a la siguiente entrada

# ArrayIterator::asort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::asort — Ordena las entradas por los valores

### Descripción

public **ArrayIterator::asort**([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena las entradas por los valores.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ver también

    - [ArrayIterator::ksort()](#arrayiterator.ksort) - Ordena las entradas por las claves

    - [ArrayIterator::natcasesort()](#arrayiterator.natcasesort) - Ordena naturalmente las entradas, sin tener en cuenta la casilla

    - [ArrayIterator::natsort()](#arrayiterator.natsort) - Ordena naturalmente las entradas

    - [ArrayIterator::uasort()](#arrayiterator.uasort) - Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

    - [ArrayIterator::uksort()](#arrayiterator.uksort) - Ordenar por claves utilizando una función de comparación definida por el usuario

    - [asort()](#function.asort) - Ordena un array en orden ascendente y conserva la asociación de los índices

# ArrayIterator::\_\_construct

(PHP 5, PHP 7, PHP 8)

ArrayIterator::\_\_construct — Construye un ArrayIterator

### Descripción

public **ArrayIterator::\_\_construct**([array](#language.types.array)|[object](#language.types.object) $array = [], [int](#language.types.integer) $flags = 0)

Construye un objeto [ArrayIterator](#class.arrayiterator).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     array


       El array o objecto a ser iterado.






     flags


       Banderas para controlar el comportamiento del objeto [ArrayIterator](#class.arrayiterator).
       Véase [ArrayIterator::setFlags()](#arrayiterator.setflags).





### Ver también

    - [ArrayIterator::getArrayCopy()](#arrayiterator.getarraycopy) - Obtener copia de un array

# ArrayIterator::count

(PHP 5, PHP 7, PHP 8)

ArrayIterator::count — Cuenta elementos

### Descripción

public **ArrayIterator::count**(): [int](#language.types.integer)

Obtiene el número de elementos de un [array](#language.types.array), o el número de
propiedades públicas en un objeto.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número.

### Ver también

    - [ArrayIterator::getFlags()](#arrayiterator.getflags) - Recupera los flags de comportamiento

# ArrayIterator::current

(PHP 5, PHP 7, PHP 8)

ArrayIterator::current — Devuelve la entrada actual del array

### Descripción

public **ArrayIterator::current**(): [mixed](#language.types.mixed)

Obtiene la entrada actual del [array](#language.types.array).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La entrada actual del [array](#language.types.array).

### Ejemplos

    **Ejemplo #1 Ejemplo de ArrayIterator::current()**

&lt;?php
$array = array('1' =&gt; 'uno',
'2' =&gt; 'dos',
'3' =&gt; 'tres');

$arrayobject = new ArrayObject($array);

for($iterator = $arrayobject-&gt;getIterator();
$iterator-&gt;valid();
$iterator-&gt;next()) {

    echo $iterator-&gt;key() . ' =&gt; ' . $iterator-&gt;current() . "\n";

}
?&gt;

    El ejemplo anterior mostrará:

1 =&gt; uno
2 =&gt; dos
3 =&gt; tres

# ArrayIterator::getArrayCopy

(PHP 5, PHP 7, PHP 8)

ArrayIterator::getArrayCopy — Obtener copia de un array

### Descripción

public **ArrayIterator::getArrayCopy**(): [array](#language.types.array)

Obtiene una copia de un array.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una copia de un [array](#language.types.array), o un array de las propiedades públicas
si ArrayIterator hace referencia a un objeto.

### Ver también

    - [ArrayIterator::valid()](#arrayiterator.valid) - Comprueba si un array contiene más entradas

# ArrayIterator::getFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayIterator::getFlags — Recupera los flags de comportamiento

### Descripción

public **ArrayIterator::getFlags**(): [int](#language.types.integer)

Recupera los flags de comportamiento de [ArrayIterator](#class.arrayiterator). Ver la función
[ArrayIterator::setFlags](#arrayiterator.setflags)
para una lista de los flags disponibles.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los flags de comportamiento de ArrayIterator.

### Ver también

    - [ArrayIterator::setFlags()](#arrayiterator.setflags) - Define los flags de comportamientos

    - [ArrayIterator::valid()](#arrayiterator.valid) - Comprueba si un array contiene más entradas

# ArrayIterator::key

(PHP 5, PHP 7, PHP 8)

ArrayIterator::key — Devuelve la clave actual del array

### Descripción

public **ArrayIterator::key**(): [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)

Esta función devuelve la clave actual del array

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave actual del [array](#language.types.array).

### Ejemplos

    **Ejemplo #1 Ejemplo de ArrayIterator::key()**

&lt;?php
$array = array('key' =&gt; 'value');

$arrayobject = new ArrayObject($array);
$iterator = $arrayobject-&gt;getIterator();

echo $iterator-&gt;key(); //key
?&gt;

# ArrayIterator::ksort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::ksort — Ordena las entradas por las claves

### Descripción

public **ArrayIterator::ksort**([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)

Ordena las entradas por las claves.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ver también

    - [ArrayIterator::asort()](#arrayiterator.asort) - Ordena las entradas por los valores

    - [ArrayIterator::natcasesort()](#arrayiterator.natcasesort) - Ordena naturalmente las entradas, sin tener en cuenta la casilla

    - [ArrayIterator::natsort()](#arrayiterator.natsort) - Ordena naturalmente las entradas

    - [ArrayIterator::uasort()](#arrayiterator.uasort) - Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

    - [ArrayIterator::uksort()](#arrayiterator.uksort) - Ordenar por claves utilizando una función de comparación definida por el usuario

    - [ksort()](#function.ksort) - Ordena un array según las claves en orden ascendente

# ArrayIterator::natcasesort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::natcasesort — Ordena naturalmente las entradas, sin tener en cuenta la casilla

### Descripción

public **ArrayIterator::natcasesort**(): [true](#language.types.singleton)

Ordena las entradas por los valores, utilizando un algoritmo insensible a la casilla
de orden natural.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ver también

    - [ArrayIterator::asort()](#arrayiterator.asort) - Ordena las entradas por los valores

    - [ArrayIterator::ksort()](#arrayiterator.ksort) - Ordena las entradas por las claves

    - [ArrayIterator::natsort()](#arrayiterator.natsort) - Ordena naturalmente las entradas

    - [ArrayIterator::uasort()](#arrayiterator.uasort) - Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

    - [ArrayIterator::uksort()](#arrayiterator.uksort) - Ordenar por claves utilizando una función de comparación definida por el usuario

    - [natcasesort()](#function.natcasesort) - Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas

# ArrayIterator::natsort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::natsort — Ordena naturalmente las entradas

### Descripción

public **ArrayIterator::natsort**(): [true](#language.types.singleton)

Ordena las entradas por los valores, utilizando el algoritmo de orden natural.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ver también

    - [ArrayIterator::asort()](#arrayiterator.asort) - Ordena las entradas por los valores

    - [ArrayIterator::ksort()](#arrayiterator.ksort) - Ordena las entradas por las claves

    - [ArrayIterator::natcasesort()](#arrayiterator.natcasesort) - Ordena naturalmente las entradas, sin tener en cuenta la casilla

    - [ArrayIterator::uasort()](#arrayiterator.uasort) - Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

    - [ArrayIterator::uksort()](#arrayiterator.uksort) - Ordenar por claves utilizando una función de comparación definida por el usuario

    - [natsort()](#function.natsort) - Ordena un array con el algoritmo de "orden natural"

# ArrayIterator::next

(PHP 5, PHP 7, PHP 8)

ArrayIterator::next — Desplaza a la siguiente entrada

### Descripción

public **ArrayIterator::next**(): [void](language.types.void.html)

El iterador a la siguiente entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de ArrayIterator::next()**

&lt;?php
$arrayobject = new ArrayObject();

$arrayobject[] = 'cero';
$arrayobject[] = 'uno';

$iterator = $arrayobject-&gt;getIterator();

while($iterator-&gt;valid()) {
echo $iterator-&gt;key() . ' =&gt; ' . $iterator-&gt;current() . "\n";

    $iterator-&gt;next();

}
?&gt;

    El ejemplo anterior mostrará:

0 =&gt; cero
1 =&gt; uno

# ArrayIterator::offsetExists

(PHP 5, PHP 7, PHP 8)

ArrayIterator::offsetExists — Compruebar si el índice existe

### Descripción

public **ArrayIterator::offsetExists**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

Comprueba si el índice existe.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice a ser comprobado.





### Valores devueltos

**[true](#constant.true)** si el índice existe, en caso contrario **[false](#constant.false)**

### Ver también

    - [ArrayIterator::valid()](#arrayiterator.valid) - Comprueba si un array contiene más entradas

# ArrayIterator::offsetGet

(PHP 5, PHP 7, PHP 8)

ArrayIterator::offsetGet — Obtener el valor de un índice

### Descripción

public **ArrayIterator::offsetGet**([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)

Obtiene el valor del índice proporcionado.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice para obtener el valor.





### Valores devueltos

El valor del índice key.

### Ver también

    - [ArrayIterator::offsetSet()](#arrayiterator.offsetset) - Establece el valor para un índice

    - [ArrayIterator::offsetUnset()](#arrayiterator.offsetunset) - Borra el valor de una posición

# ArrayIterator::offsetSet

(PHP 5, PHP 7, PHP 8)

ArrayIterator::offsetSet — Establece el valor para un índice

### Descripción

public **ArrayIterator::offsetSet**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Establecer el valor para el índice dado.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice a ser establecido.






     value


       El nuevo valor para almacenar en el índice.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ArrayIterator::offsetGet()](#arrayiterator.offsetget) - Obtener el valor de un índice

    - [ArrayIterator::offsetUnset()](#arrayiterator.offsetunset) - Borra el valor de una posición

# ArrayIterator::offsetUnset

(PHP 5, PHP 7, PHP 8)

ArrayIterator::offsetUnset — Borra el valor de una posición

### Descripción

public **ArrayIterator::offsetUnset**([mixed](#language.types.mixed) $key): [void](language.types.void.html)

Borra el valor de una posición.

Si una iteración está en curso, y
**ArrayIterator::offsetUnset()** se utiliza para unset
el índice actual de la iteración, la posición de la iteración será avanzada
al próximo índice.
Como la posición de la iteración también se avanza al final de la declaración
de bucle [foreach](#control-structures.foreach), el uso de
**ArrayIterator::offsetUnset()** dentro de un bucle
[foreach](#control-structures.foreach)
puede resultar en índices que serán omitidos.

### Parámetros

     key


       La posición a borrar.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ArrayIterator::offsetGet()](#arrayiterator.offsetget) - Obtener el valor de un índice

    - [ArrayIterator::offsetSet()](#arrayiterator.offsetset) - Establece el valor para un índice

# ArrayIterator::rewind

(PHP 5, PHP 7, PHP 8)

ArrayIterator::rewind — Rebobinar array al inicio

### Descripción

public **ArrayIterator::rewind**(): [void](language.types.void.html)

Rebobina el iterador al inicio del array.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de ArrayIterator::rewind()**

&lt;?php
$arrayobject = new ArrayObject();

$arrayobject[] = 'zero';
$arrayobject[] = 'one';
$arrayobject[] = 'two';

$iterator = $arrayobject-&gt;getIterator();

$iterator-&gt;next();
echo $iterator-&gt;key(); //1

$iterator-&gt;rewind(); //rebobinar al inicio
echo $iterator-&gt;key(); //0
?&gt;

# ArrayIterator::seek

(PHP 5, PHP 7, PHP 8)

ArrayIterator::seek — Avance a una posición dada

### Descripción

public **ArrayIterator::seek**([int](#language.types.integer) $offset): [void](language.types.void.html)

Avance a una posición dada en el iterador.

### Parámetros

     offset


       La posición deseada.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Levanta una excepción [OutOfBoundsException](#class.outofboundsexception)
si el offset no es accesible.

# ArrayIterator::serialize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ArrayIterator::serialize — Serializar

### Descripción

public **ArrayIterator::serialize**(): [string](#language.types.string)

Serializa.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [ArrayIterator](#class.arrayiterator) serializado.

### Ver también

    - [ArrayIterator::unserialize()](#arrayiterator.unserialize) - Deserializar

# ArrayIterator::setFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ArrayIterator::setFlags — Define los flags de comportamientos

### Descripción

public **ArrayIterator::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Define los flags que modifican el comportamiento de ArrayIterator.

### Parámetros

     flags


       El nuevo comportamiento de ArrayIterator.
       Puede ser un bit-mask o constantes nombradas.
       Se recomienda encarecidamente el uso de constantes nombradas para asegurar la compatibilidad con futuras versiones.




       Los flags de comportamiento disponibles se enumeran a continuación.
       El comportamiento real de estos flags se describe en las constantes predefinidas
       [predefined constants](#arrayiterator.constants).



        <caption>**Los flags de comportamiento ArrayIterator**</caption>



           value
           constant






           1

            [ArrayIterator::STD_PROP_LIST](#arrayiterator.constants.std-prop-list)




           2

            [ArrayIterator::ARRAY_AS_PROPS](#arrayiterator.constants.array-as-props)










### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ArrayIterator::getFlags()](#arrayiterator.getflags) - Recupera los flags de comportamiento

# ArrayIterator::uasort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::uasort — Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

### Descripción

public **ArrayIterator::uasort**([callable](#language.types.callable) $callback): [true](#language.types.singleton)

Este método ordena los elementos de tal manera que los índices mantienen
su correlación con los valores a los que están asociados, utilizando una
función de comparación definida por el usuario.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ver también

    - [ArrayIterator::asort()](#arrayiterator.asort) - Ordena las entradas por los valores

    - [ArrayIterator::ksort()](#arrayiterator.ksort) - Ordena las entradas por las claves

    - [ArrayIterator::natcasesort()](#arrayiterator.natcasesort) - Ordena naturalmente las entradas, sin tener en cuenta la casilla

    - [ArrayIterator::natsort()](#arrayiterator.natsort) - Ordena naturalmente las entradas

    - [ArrayIterator::uksort()](#arrayiterator.uksort) - Ordenar por claves utilizando una función de comparación definida por el usuario

    - [uasort()](#function.uasort) - Ordena un array utilizando una función de retrollamada

# ArrayIterator::uksort

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

ArrayIterator::uksort — Ordenar por claves utilizando una función de comparación definida por el usuario

### Descripción

public **ArrayIterator::uksort**([callable](#language.types.callable) $callback): [true](#language.types.singleton)

Este método ordena los elementos por claves utilizando una función de comparación proporcionada por el usuario.

**Nota**:

Si dos miembros se comparan como iguales, mantienen su orden original.
Anterior a PHP 8.0.0, su orden relativo en el array ordenado no está definido.

### Parámetros

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

### Ver también

    - [ArrayIterator::asort()](#arrayiterator.asort) - Ordena las entradas por los valores

    - [ArrayIterator::ksort()](#arrayiterator.ksort) - Ordena las entradas por las claves

    - [ArrayIterator::natcasesort()](#arrayiterator.natcasesort) - Ordena naturalmente las entradas, sin tener en cuenta la casilla

    - [ArrayIterator::natsort()](#arrayiterator.natsort) - Ordena naturalmente las entradas

    - [ArrayIterator::uasort()](#arrayiterator.uasort) - Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice

    - [uksort()](#function.uksort) - Ordena un array por sus claves utilizando una función de retrollamada

# ArrayIterator::unserialize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

ArrayIterator::unserialize — Deserializar

### Descripción

public **ArrayIterator::unserialize**([string](#language.types.string) $data): [void](language.types.void.html)

Deserializa.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     data


       El objecto serializado ArrayIterator para deserializar.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ArrayIterator::serialize()](#arrayiterator.serialize) - Serializar

# ArrayIterator::valid

(PHP 5, PHP 7, PHP 8)

ArrayIterator::valid — Comprueba si un array contiene más entradas

### Descripción

public **ArrayIterator::valid**(): [bool](#language.types.boolean)

Comprueba si un [array](#language.types.array) contiene más entradas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el iterador es válido, **[false](#constant.false)** si no.

### Ejemplos

    **Ejemplo #1 Ejemplo de ArrayIterator::valid()**

&lt;?php
$array = array('1' =&gt; 'uno');

$arrayobject = new ArrayObject($array);
$iterator = $arrayobject-&gt;getIterator();

var_dump($iterator-&gt;valid()); //bool(true)

$iterator-&gt;next(); // avanza al siguiente ítem

//bool(false) porque solo hay un elemento array
var_dump($iterator-&gt;valid());
?&gt;

## Tabla de contenidos

- [ArrayIterator::append](#arrayiterator.append) — Añade un elemento
- [ArrayIterator::asort](#arrayiterator.asort) — Ordena las entradas por los valores
- [ArrayIterator::\_\_construct](#arrayiterator.construct) — Construye un ArrayIterator
- [ArrayIterator::count](#arrayiterator.count) — Cuenta elementos
- [ArrayIterator::current](#arrayiterator.current) — Devuelve la entrada actual del array
- [ArrayIterator::getArrayCopy](#arrayiterator.getarraycopy) — Obtener copia de un array
- [ArrayIterator::getFlags](#arrayiterator.getflags) — Recupera los flags de comportamiento
- [ArrayIterator::key](#arrayiterator.key) — Devuelve la clave actual del array
- [ArrayIterator::ksort](#arrayiterator.ksort) — Ordena las entradas por las claves
- [ArrayIterator::natcasesort](#arrayiterator.natcasesort) — Ordena naturalmente las entradas, sin tener en cuenta la casilla
- [ArrayIterator::natsort](#arrayiterator.natsort) — Ordena naturalmente las entradas
- [ArrayIterator::next](#arrayiterator.next) — Desplaza a la siguiente entrada
- [ArrayIterator::offsetExists](#arrayiterator.offsetexists) — Compruebar si el índice existe
- [ArrayIterator::offsetGet](#arrayiterator.offsetget) — Obtener el valor de un índice
- [ArrayIterator::offsetSet](#arrayiterator.offsetset) — Establece el valor para un índice
- [ArrayIterator::offsetUnset](#arrayiterator.offsetunset) — Borra el valor de una posición
- [ArrayIterator::rewind](#arrayiterator.rewind) — Rebobinar array al inicio
- [ArrayIterator::seek](#arrayiterator.seek) — Avance a una posición dada
- [ArrayIterator::serialize](#arrayiterator.serialize) — Serializar
- [ArrayIterator::setFlags](#arrayiterator.setflags) — Define los flags de comportamientos
- [ArrayIterator::uasort](#arrayiterator.uasort) — Ordenar con una función de comparación definida por el usuario y mantener la asociación del índice
- [ArrayIterator::uksort](#arrayiterator.uksort) — Ordenar por claves utilizando una función de comparación definida por el usuario
- [ArrayIterator::unserialize](#arrayiterator.unserialize) — Deserializar
- [ArrayIterator::valid](#arrayiterator.valid) — Comprueba si un array contiene más entradas

# La clase CachingIterator

(PHP 5, PHP 7, PHP 8)

## Introducción

    Este objeto soporta las iteraciones en caché sobre otro iterador.

## Sinopsis de la Clase

     class **CachingIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)



     implements
      [ArrayAccess](#class.arrayaccess),

     [Countable](#class.countable),

     [Stringable](#class.stringable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [CALL_TOSTRING](#cachingiterator.constants.call-tostring);

    public
     const
     [int](#language.types.integer)
      [CATCH_GET_CHILD](#cachingiterator.constants.catch-get-child);

    public
     const
     [int](#language.types.integer)
      [TOSTRING_USE_KEY](#cachingiterator.constants.tostring-use-key);

    public
     const
     [int](#language.types.integer)
      [TOSTRING_USE_CURRENT](#cachingiterator.constants.tostring-use-current);

    public
     const
     [int](#language.types.integer)
      [TOSTRING_USE_INNER](#cachingiterator.constants.tostring-use-inner);

    public
     const
     [int](#language.types.integer)
      [FULL_CACHE](#cachingiterator.constants.full-cache);


    /* Métodos */

public [\_\_construct](#cachingiterator.construct)([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $flags = CachingIterator::CALL_TOSTRING)

    public [count](#cachingiterator.count)(): [int](#language.types.integer)

public [current](#cachingiterator.current)(): [mixed](#language.types.mixed)
public [getCache](#cachingiterator.getcache)(): [array](#language.types.array)
public [getFlags](#cachingiterator.getflags)(): [int](#language.types.integer)
public [hasNext](#cachingiterator.hasnext)(): [bool](#language.types.boolean)
public [key](#cachingiterator.key)(): scalar
public [next](#cachingiterator.next)(): [void](language.types.void.html)
public [offsetExists](#cachingiterator.offsetexists)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [offsetGet](#cachingiterator.offsetget)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [offsetSet](#cachingiterator.offsetset)([string](#language.types.string) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [offsetUnset](#cachingiterator.offsetunset)([string](#language.types.string) $key): [void](language.types.void.html)
public [rewind](#cachingiterator.rewind)(): [void](language.types.void.html)
public [setFlags](#cachingiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [\_\_toString](#cachingiterator.tostring)(): [string](#language.types.string)
public [valid](#cachingiterator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[CachingIterator::CALL_TOSTRING](#cachingiterator.constants.call-tostring)**

      Convierte todos los elementos en strings.






     **[CachingIterator::CATCH_GET_CHILD](#cachingiterator.constants.catch-get-child)**

      No lanza ninguna excepción al intentar acceder a un hijo.






     **[CachingIterator::TOSTRING_USE_KEY](#cachingiterator.constants.tostring-use-key)**

      Utiliza [key](#cachingiterator.key) durante la
      conversión en string.






     **[CachingIterator::TOSTRING_USE_CURRENT](#cachingiterator.constants.tostring-use-current)**

      Utiliza [current](#cachingiterator.current) durante la
      conversión en string.






     **[CachingIterator::TOSTRING_USE_INNER](#cachingiterator.constants.tostring-use-inner)**

      Utiliza [inner](#iteratoriterator.getinneriterator) durante la
      conversión en string.






     **[CachingIterator::FULL_CACHE](#cachingiterator.constants.full-cache)**


       Almacena en caché todos los datos leídos.





## Historial de cambios

       Versión
       Descripción






       8.0.0

        La clase **CachingIterator** implementa ahora [Stringable](#class.stringable).





# CachingIterator::\_\_construct

(PHP 5, PHP 7, PHP 8)

CachingIterator::\_\_construct — Construir un nuevo objeto CachingIterator para el iterador

### Descripción

public **CachingIterator::\_\_construct**([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $flags = CachingIterator::CALL_TOSTRING)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       Iterador a usar en caché






     flags


       Máscara de bits de las opciones.





# CachingIterator::count

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

CachingIterator::count — El número de elementos en el iterador

### Descripción

public **CachingIterator::count**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el número de elementos en el iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La cuenta del número de elementos que han sido iterados.

# CachingIterator::current

(PHP 5, PHP 7, PHP 8)

CachingIterator::current — Devuelve el elemento actual

### Descripción

public **CachingIterator::current**(): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el elemento actual en el iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Mixed

### Ver también

    - [Iterator::current()](#iterator.current) - Devuelve el elemento actual

# CachingIterator::getCache

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::getCache — Recuperar el contenido de la caché

### Descripción

public **CachingIterator::getCache**(): [array](#language.types.array)

Recupera el contenido de la caché.

**Nota**:

    Se debe utilizar el indicador
    **[CachingIterator::FULL_CACHE](#cachingiterator.constants.full-cache)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) que contiene los elementos de la caché.

### Errores/Excepciones

Lanza una [BadMethodCallException](#class.badmethodcallexception) cuando no se está utilizando
el indicador **[CachingIterator::FULL_CACHE](#cachingiterator.constants.full-cache)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de CachingIterator::getCache()**.

&lt;?php
$iterador = new ArrayIterator(array(1, 2, 3));
$caché = new CachingIterator($iterador, CachingIterator::FULL_CACHE);

$caché-&gt;next();
$caché-&gt;next();
var_dump($caché-&gt;getCache());

$caché-&gt;next();
var_dump($caché-&gt;getCache());
?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
}
array(3) {
[0]=&gt;
int(1)
[1]=&gt;
int(2)
[2]=&gt;
int(3)
}

# CachingIterator::getFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::getFlags — Obtener las banderas utilizadas

### Descripción

public **CachingIterator::getFlags**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Obtiene la máscara de bits usada para esta instancia de ChachingIterator.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Descripción...

# CachingIterator::hasNext

(PHP 5, PHP 7, PHP 8)

CachingIterator::hasNext — Comprueba que el iterador interno tenga un elemento siguiente válido

### Descripción

public **CachingIterator::hasNext**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# CachingIterator::key

(PHP 5, PHP 7, PHP 8)

CachingIterator::key — Devuelve la clave del elemento actual

### Descripción

public **CachingIterator::key**(): scalar

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Este método devuelve la clave del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

# CachingIterator::next

(PHP 5, PHP 7, PHP 8)

CachingIterator::next — Desplaza el iterador adelante

### Descripción

public **CachingIterator::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Desplaza el iterador adelante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# CachingIterator::offsetExists

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::offsetExists — Comprobar existencia de un índice

### Descripción

public **CachingIterator::offsetExists**([string](#language.types.string) $key): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice a ser comprobado.





### Valores devueltos

Devuelve **[true](#constant.true)** si la entrada a la que hace referencia el índice existe, en caso contrario **[false](#constant.false)**.

# CachingIterator::offsetGet

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::offsetGet — El propósito offsetGet

### Descripción

public **CachingIterator::offsetGet**([string](#language.types.string) $key): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       Descripción...





### Valores devueltos

Descripción...

# CachingIterator::offsetSet

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::offsetSet — El propósito offsetSet

### Descripción

public **CachingIterator::offsetSet**([string](#language.types.string) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice del elemento a ser establecido.






     value


       El nuevo valor para el key.





### Valores devueltos

No se retorna ningún valor.

# CachingIterator::offsetUnset

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::offsetUnset — El propósito offsetUnset

### Descripción

public **CachingIterator::offsetUnset**([string](#language.types.string) $key): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     key


       El índice de el elemento a ser destruido.





### Valores devueltos

No se retorna ningún valor.

# CachingIterator::rewind

(PHP 5, PHP 7, PHP 8)

CachingIterator::rewind — Rebobina el iterador

### Descripción

public **CachingIterator::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Rebobinar el iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# CachingIterator::setFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

CachingIterator::setFlags — El propósito de setFlags

### Descripción

public **CachingIterator::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece las flags para el objeto CachingIterator.

### Parámetros

     flags


       Máscara de flags a establecer.





### Valores devueltos

No se retorna ningún valor.

# CachingIterator::\_\_toString

(PHP 5, PHP 7, PHP 8)

CachingIterator::\_\_toString — Devolver la representación en formato cadena del elemento actual

### Descripción

public **CachingIterator::\_\_toString**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Obtiene la representación en formato cadena del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La representación en formato cadena del elemento actual.

# CachingIterator::valid

(PHP 5, PHP 7, PHP 8)

CachingIterator::valid — Comprueba que el elemento actual sea válido

### Descripción

public **CachingIterator::valid**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Comprueba que el elemento actual sea válido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [CachingIterator::\_\_construct](#cachingiterator.construct) — Construir un nuevo objeto CachingIterator para el iterador
- [CachingIterator::count](#cachingiterator.count) — El número de elementos en el iterador
- [CachingIterator::current](#cachingiterator.current) — Devuelve el elemento actual
- [CachingIterator::getCache](#cachingiterator.getcache) — Recuperar el contenido de la caché
- [CachingIterator::getFlags](#cachingiterator.getflags) — Obtener las banderas utilizadas
- [CachingIterator::hasNext](#cachingiterator.hasnext) — Comprueba que el iterador interno tenga un elemento siguiente válido
- [CachingIterator::key](#cachingiterator.key) — Devuelve la clave del elemento actual
- [CachingIterator::next](#cachingiterator.next) — Desplaza el iterador adelante
- [CachingIterator::offsetExists](#cachingiterator.offsetexists) — Comprobar existencia de un índice
- [CachingIterator::offsetGet](#cachingiterator.offsetget) — El propósito offsetGet
- [CachingIterator::offsetSet](#cachingiterator.offsetset) — El propósito offsetSet
- [CachingIterator::offsetUnset](#cachingiterator.offsetunset) — El propósito offsetUnset
- [CachingIterator::rewind](#cachingiterator.rewind) — Rebobina el iterador
- [CachingIterator::setFlags](#cachingiterator.setflags) — El propósito de setFlags
- [CachingIterator::\_\_toString](#cachingiterator.tostring) — Devolver la representación en formato cadena del elemento actual
- [CachingIterator::valid](#cachingiterator.valid) — Comprueba que el elemento actual sea válido

# La clase CallbackFilterIterator

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

## Sinopsis de la Clase

     class **CallbackFilterIterator**



     extends
      [FilterIterator](#class.filteriterator)
     {

    /* Métodos */

public [\_\_construct](#callbackfilteriterator.construct)([Iterator](#class.iterator) $iterator, [callable](#language.types.callable) $callback)

    public [accept](#callbackfilteriterator.accept)(): [bool](#language.types.boolean)


    /* Métodos heredados */
    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

    La llamada de retorno debería aceptar hasta tres argumentos:
    el elemento actual, la clave actual y el iterador, respectivamente.




    **Ejemplo #1 Argumentos disponibles de la llamada de retorno**

&lt;?php

/\*\*

- Llamada de retorno para CallbackFilterIterator
-
- @param $current Valor del elemento actual
- @param $key Clave del elemento actual
- @param $iterator Iterador a filtrar
- @return boolean TRUE para aceptar el elemento actual, de lo contrario FALSE
  \*/
  function my_callback($current, $key, $iterator) {
  // Aquí el código de filtrado
  }

?&gt;

    Se posría usar algún [callable](#language.types.callable),como un string que contenga
    nombre de función, un array para un método, o una función anónima.




    **Ejemplo #2 Ejemplos básicos de llamada de retorno**

&lt;?php

$dir = new FilesystemIterator(**DIR**);

// Filtrar ficheros de gran tamaño ( &gt; 100MB)
function is_large_file($current) {
    return $current-&gt;isFile() &amp;&amp; $current-&gt;getSize() &gt; 104857600;
}
$large_files = new CallbackFilterIterator($dir, 'is_large_file');

// Filtrar directorios
$files = new CallbackFilterIterator($dir, function ($current, $key, $iterator) {
return $current-&gt;isDir() &amp;&amp; ! $iterator-&gt;isDot();
});

?&gt;

# CallbackFilterIterator::accept

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

CallbackFilterIterator::accept — Llama la llamada de retorno con el valor actual, la clave actual y el iterador interior como argumentos

### Descripción

public **CallbackFilterIterator::accept**(): [bool](#language.types.boolean)

Este método llama a la llamada de retorno con el valor actual, la clave
actual y el iterador interno.

La llamada de retorno se espera que devuelva **[true](#constant.true)** si el elemento actual
es aceptado, o en caso contrario **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** para aceptar el elemento actual, o en caso contrario **[false](#constant.false)**.

### Ver también

    - [Ejemplos de CallbackFilterIterator](#callbackfilteriterator.examples)

    - [CallbackFilterIterator::__construct()](#callbackfilteriterator.construct) - Crear un iterador filtrado desde otro iterador

# CallbackFilterIterator::\_\_construct

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

CallbackFilterIterator::\_\_construct — Crear un iterador filtrado desde otro iterador

### Descripción

public **CallbackFilterIterator::\_\_construct**([Iterator](#class.iterator) $iterator, [callable](#language.types.callable) $callback)

Crea un iterador filtrado usando callback (llamada de retorno)
Creates a filtered iterator using the callback para determinar
que elementos van a ser aceptados o rechazados.

### Parámetros

    iterator


      El iterador a ser filtrado.






    callback


      La llamada de retorno, debe devolver **[true](#constant.true)** para aceptar el elemento
      actual o en caso contrario **[false](#constant.false)**.
      Véase los [Ejemplos](#callbackfilteriterator.examples).




      Puede ser cualquier valor válido de callback.


### Ver también

    - [Ejemplos de CallbackFilterIterator](#callbackfilteriterator.examples)

    - [CallbackFilterIterator::accept()](#callbackfilteriterator.accept) - Llama la llamada de retorno con el valor actual, la clave actual y el iterador interior como argumentos

## Tabla de contenidos

- [CallbackFilterIterator::accept](#callbackfilteriterator.accept) — Llama la llamada de retorno con el valor actual, la clave actual y el iterador interior como argumentos
- [CallbackFilterIterator::\_\_construct](#callbackfilteriterator.construct) — Crear un iterador filtrado desde otro iterador

# La clase DirectoryIterator

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase DirectoryIterator proporciona un sencilla interfaz para ver
    el contenido de los directorios del sistema de ficheros.

## Sinopsis de la Clase

     class **DirectoryIterator**



     extends
      [SplFileInfo](#class.splfileinfo)



     implements
      [SeekableIterator](#class.seekableiterator) {

    /* Métodos */

public [\_\_construct](#directoryiterator.construct)([string](#language.types.string) $directory)

    public [current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [next](#directoryiterator.next)(): [void](language.types.void.html)
public [rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# DirectoryIterator::\_\_construct

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::\_\_construct — Construye un nuevo iterador de directorio a partir de una ruta

### Descripción

public **DirectoryIterator::\_\_construct**([string](#language.types.string) $directory)

Construye un nuevo iterador de directorio a partir de una ruta.

### Parámetros

     directory


       La ruta del directorio a recorrer.





### Errores/Excepciones

Lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el directorio no existe.

Lanza una excepción [ValueError](#class.valueerror)
si directory es una string vacía.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Lanza ahora una excepción [ValueError](#class.valueerror)
        cuando directory es una string vacía;
        Anteriormente, se lanzaba una [RuntimeException](#class.runtimeexception).





### Ejemplos

    **Ejemplo #1 Ejemplo con DirectoryIterator::__construct()**



      Este ejemplo listará el contenido del directorio que contiene el script.





&lt;?php
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if (!$fileinfo-&gt;isDot()) {
var_dump($fileinfo-&gt;getFilename());
}
}
?&gt;

### Ver también

    - [SplFileInfo](#class.splfileinfo)

    - [Iterator](#class.iterator)

# DirectoryIterator::current

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::current — Devuelve el elemento actual del DirectoryIterator

### Descripción

public **DirectoryIterator::current**(): [mixed](#language.types.mixed)

Obtiene el elemento actual del [DirectoryIterator](#class.directoryiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El elemento actual del [DirectoryIterator](#class.directoryiterator).

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::current()**



     Este ejemplo mostrará el contenido del directorio que contiene al script.

&lt;?php
$iterador = new DirectoryIterator(__DIR__);
while($iterador-&gt;valid()) {
$fichero = $iterador-&gt;current();
echo $iterador-&gt;key() . " =&gt; " . $fichero-&gt;getFilename() . "\n";
$iterador-&gt;next();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

0 =&gt; .
1 =&gt; ..
2 =&gt; manzana.jpg
3 =&gt; banana.jpg
4 =&gt; index.php
5 =&gt; pera.jpg

### Ver también

    - [DirectoryIterator::key()](#directoryiterator.key) - Devuelve la entrada actual del directorio

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

    - [DirectoryIterator::valid()](#directoryiterator.valid) - Comprueba si la actual posición de DirectoryIterator es un fichero válido

    - [Iterator::current()](#iterator.current) - Devuelve el elemento actual

# DirectoryIterator::getBasename

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

DirectoryIterator::getBasename — Obtener el nombre base del elemento actual DirectoryIterator

### Descripción

public **DirectoryIterator::getBasename**([string](#language.types.string) $suffix = ""): [string](#language.types.string)

Obtiene el nombre base del elemento actual [DirectoryIterator](#class.directoryiterator).

### Parámetros

     suffix


       Si el nombre base termina en suffix,
       este será cortado.





### Valores devueltos

El nombre base del elemento actual [DirectoryIterator](#class.directoryiterator).

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::getBasename()**



     Este ejemplo mostrará una lista completa de los nombres base y los nombres base con
     sufijo .jpg eliminado de los ficheros del directorio que contiene
     el script.

&lt;?php
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if ($fileinfo-&gt;isFile()) {
echo $fileinfo-&gt;getBasename() . "\n";
echo $fileinfo-&gt;getBasename('.jpg') . "\n";
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

manzana.jpg
manzana
banana.jpg
banana
index.php
index.php
pera.jpg
pera

### Ver también

    - [DirectoryIterator::getFilename()](#directoryiterator.getfilename) - Devuelve el nombre del fichero del elemento actual DirectoryIterator

    - **DirectoryIterator::getPath()**

    - **DirectoryIterator::getPathname()**

    - [basename()](#function.basename) - Devuelve el nombre del componente final de una ruta

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

# DirectoryIterator::getExtension

(PHP 5 &gt;= 5.3.6, PHP 7, PHP 8)

DirectoryIterator::getExtension — Obtiene la extensión de un fichero

### Descripción

public **DirectoryIterator::getExtension**(): [string](#language.types.string)

Recupera la extensión de un fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que contiene la extensión del ficher, o un
[string](#language.types.string) vacío si el fichoer no tiene extensión.

### Ejemplos

**Ejemplo #1 Ejemplo de DirectoryIterator::getExtension()**

&lt;?php

$directory = new DirectoryIterator(__DIR__);
foreach ($directory as $fileinfo) {
    if ($fileinfo-&gt;isFile()) {
echo $fileinfo-&gt;getExtension() . "\n";
}
}

?&gt;

Resultado del ejemplo anterior es similar a:

php
txt
jpg
gz

### Notas

**Nota**:

    Otra manera de obtener la extensión es usar la
    función [pathinfo()](#function.pathinfo).

&lt;?php
$extension = pathinfo($fileinfo-&gt;getFilename(), PATHINFO_EXTENSION);
?&gt;

### Ver también

- [DirectoryIterator::getFilename()](#directoryiterator.getfilename) - Devuelve el nombre del fichero del elemento actual DirectoryIterator

- [DirectoryIterator::getBasename()](#directoryiterator.getbasename) - Obtener el nombre base del elemento actual DirectoryIterator

- [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

# DirectoryIterator::getFilename

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::getFilename — Devuelve el nombre del fichero del elemento actual DirectoryIterator

### Descripción

public **DirectoryIterator::getFilename**(): [string](#language.types.string)

Obtiene el nombre del elemento actual [DirectoryIterator](#class.directoryiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero del elemento actual [DirectoryIterator](#class.directoryiterator).

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::getFilename()**



     Este ejemplo mostrará el contenido de el directorio que contiene al script.

&lt;?php
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
echo $fileinfo-&gt;getFilename() . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

.
..
manzana.jpg
banana.jpg
index.php
pera.jpg

### Ver también

    - [DirectoryIterator::getBasename()](#directoryiterator.getbasename) - Obtener el nombre base del elemento actual DirectoryIterator

    - **DirectoryIterator::getPath()**

    - **DirectoryIterator::getPathname()**

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

# DirectoryIterator::isDot

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::isDot — Determina si el elemento actual DirectoryIterator es '.' o '..'

### Descripción

public **DirectoryIterator::isDot**(): [bool](#language.types.boolean)

Determina si el elemento actual [DirectoryIterator](#class.directoryiterator)
es un directorio y es . o ..

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la entrada es . o ..,
en caso contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::isDot()**



     Este ejemplo mostrará todos los ficheros, omitiendo las entradas .
     y .. e.j.

&lt;?php
$iterator = new DirectoryIterator(dirname(__FILE__));
foreach ($iterator as $fileinfo) {
    if (!$fileinfo-&gt;isDot()) {
echo $fileinfo-&gt;getFilename() . "\n";
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

manzana.jpg
banana.jpg
ejemplo.php
pera.jpg

### Ver también

    - **DirectoryIterator::getType()**

    - **DirectoryIterator::isDir()**

    - **DirectoryIterator::isFile()**

    - **DirectoryIterator::isLink()**

# DirectoryIterator::key

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::key — Devuelve la entrada actual del directorio

### Descripción

public **DirectoryIterator::key**(): [mixed](#language.types.mixed)

Devuelve la entrada actual del objeto [DirectoryIterator](#class.directoryiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave para la entrada actual de [DirectoryIterator](#class.directoryiterator) como [int](#language.types.integer).

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Cuando el iterador no está inicializado, ahora se lanza una [Error](#class.error).
        Anteriormente, el método devolvía **[false](#constant.false)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con DirectoryIterator::key()**

&lt;?php
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if (!$fileinfo-&gt;isDot()) {
echo $fileinfo-&gt;key() . " =&gt; " . $fileinfo-&gt;getFilename() . "\n";
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

0 =&gt; apple.jpg
1 =&gt; banana.jpg
2 =&gt; index.php
3 =&gt; pear.jpg

### Ver también

    - [DirectoryIterator::current()](#directoryiterator.current) - Devuelve el elemento actual del DirectoryIterator

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

    - [DirectoryIterator::valid()](#directoryiterator.valid) - Comprueba si la actual posición de DirectoryIterator es un fichero válido

    - [Iterator::key()](#iterator.key) - Devuelve la clave del elemento actual

# DirectoryIterator::next

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::next — Avanza al siguiente elemento DirectoryIterator

### Descripción

public **DirectoryIterator::next**(): [void](language.types.void.html)

Avanzar al siguiente elemento [DirectoryIterator](#class.directoryiterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::next()**



     List the contents of a directory using a while loop.

&lt;?php
$iterator = new DirectoryIterator(dirname(__FILE__));
while($iterator-&gt;valid()) {
echo $iterator-&gt;getFilename() . "\n";
$iterator-&gt;next();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

.
..
manzana.jpg
banana.jpg
index.php
pera.jpg

### Ver también

    - [DirectoryIterator::current()](#directoryiterator.current) - Devuelve el elemento actual del DirectoryIterator

    - [DirectoryIterator::key()](#directoryiterator.key) - Devuelve la entrada actual del directorio

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

    - [DirectoryIterator::valid()](#directoryiterator.valid) - Comprueba si la actual posición de DirectoryIterator es un fichero válido

    - [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

# DirectoryIterator::rewind

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::rewind — Robobina DirectoryIterator hasta volver al inicio

### Descripción

public **DirectoryIterator::rewind**(): [void](language.types.void.html)

Robobinar [DirectoryIterator](#class.directoryiterator) hasta volver al inicio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::rewind()**

&lt;?php
$iterator = new DirectoryIterator(dirname(**FILE**));

$iterator-&gt;next();
echo $iterator-&gt;key(); //1

$iterator-&gt;rewind(); //Rebobinándose al inicio
echo $iterator-&gt;key(); //0
?&gt;

### Ver también

    - [DirectoryIterator::current()](#directoryiterator.current) - Devuelve el elemento actual del DirectoryIterator

    - [DirectoryIterator::key()](#directoryiterator.key) - Devuelve la entrada actual del directorio

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

    - [DirectoryIterator::valid()](#directoryiterator.valid) - Comprueba si la actual posición de DirectoryIterator es un fichero válido

    - [Iterator::rewind()](#iterator.rewind) - Rebobine la Iterator al primer elemento

# DirectoryIterator::seek

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DirectoryIterator::seek — Mueve el apuntador interno del elemento DirectoryIterator

### Descripción

public **DirectoryIterator::seek**([int](#language.types.integer) $offset): [void](language.types.void.html)

Mueve el apuntador interno a la posición dada en el elemento [DirectoryIterator](#class.directoryiterator).

### Parámetros

     offset


       La base cero de la posición numérica a mover el apuntador interno.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::seek()**



     Mueve el apuntador interno al cuarto elemento en el directorio que contiene al script.
     Los primeros dos son generalmente . y ..

&lt;?php
$iterator = new DirectoryIterator(dirname(__FILE__));
$iterator-&gt;seek(3);
if ($iterator-&gt;valid()) {
echo $iterator-&gt;getFilename();
} else {
echo 'No hay fichero en la posición 3';
}
?&gt;

### Ver también

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

    - [SeekableIterator::seek()](#seekableiterator.seek) - Busca una posición

# DirectoryIterator::\_\_toString

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::\_\_toString — Lee el nombre del fichero

### Descripción

public **DirectoryIterator::\_\_toString**(): [string](#language.types.string)

Lee el nombre del fichero del elemento [DirectoryIterator](#class.directoryiterator) actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero actual del elemento [DirectoryIterator](#class.directoryiterator).

### Ejemplos

    **Ejemplo #1 Ejemplo con DirectoryIterator::__toString()**



     Este ejemplo va a listar los elementos del directorio actual.

&lt;?php
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
echo $fileinfo;
}
?&gt;

    Resultado del ejemplo anterior es similar a:

.
..
apple.jpg
banana.jpg
index.php
pear.jpg

### Ver también

    - [DirectoryIterator::getFilename()](#directoryiterator.getfilename) - Devuelve el nombre del fichero del elemento actual DirectoryIterator

    - el método mágico [__toString](#object.tostring)

# DirectoryIterator::valid

(PHP 5, PHP 7, PHP 8)

DirectoryIterator::valid — Comprueba si la actual posición de DirectoryIterator es un fichero válido

### Descripción

public **DirectoryIterator::valid**(): [bool](#language.types.boolean)

Comprobar si la posición actual de [DirectoryIterator](#class.directoryiterator) es un fichero válido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la posición es válida, en caso contrario **[false](#constant.false)**

### Ejemplos

    **Ejemplo #1 Ejemplo de DirectoryIterator::valid()**

&lt;?php
$iterator = new DirectoryIterator(dirname(**FILE**));

// Bucle hasta el final del iterador
while($iterator-&gt;valid()) {
$iterator-&gt;next();
}

$iterator-&gt;valid(); // FALSE
$iterator-&gt;rewind();
$iterator-&gt;valid(); // TRUE

?&gt;

### Ver también

    - [DirectoryIterator::current()](#directoryiterator.current) - Devuelve el elemento actual del DirectoryIterator

    - [DirectoryIterator::key()](#directoryiterator.key) - Devuelve la entrada actual del directorio

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

    - [Iterator::valid()](#iterator.valid) - Comprueba si la posición actual es válido

## Tabla de contenidos

- [DirectoryIterator::\_\_construct](#directoryiterator.construct) — Construye un nuevo iterador de directorio a partir de una ruta
- [DirectoryIterator::current](#directoryiterator.current) — Devuelve el elemento actual del DirectoryIterator
- [DirectoryIterator::getBasename](#directoryiterator.getbasename) — Obtener el nombre base del elemento actual DirectoryIterator
- [DirectoryIterator::getExtension](#directoryiterator.getextension) — Obtiene la extensión de un fichero
- [DirectoryIterator::getFilename](#directoryiterator.getfilename) — Devuelve el nombre del fichero del elemento actual DirectoryIterator
- [DirectoryIterator::isDot](#directoryiterator.isdot) — Determina si el elemento actual DirectoryIterator es '.' o '..'
- [DirectoryIterator::key](#directoryiterator.key) — Devuelve la entrada actual del directorio
- [DirectoryIterator::next](#directoryiterator.next) — Avanza al siguiente elemento DirectoryIterator
- [DirectoryIterator::rewind](#directoryiterator.rewind) — Robobina DirectoryIterator hasta volver al inicio
- [DirectoryIterator::seek](#directoryiterator.seek) — Mueve el apuntador interno del elemento DirectoryIterator
- [DirectoryIterator::\_\_toString](#directoryiterator.tostring) — Lee el nombre del fichero
- [DirectoryIterator::valid](#directoryiterator.valid) — Comprueba si la actual posición de DirectoryIterator es un fichero válido

# La clase EmptyIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La clase EmptyIterator para un iterador vacío.

## Sinopsis de la Clase

     class **EmptyIterator**



     implements
      [Iterator](#class.iterator) {

    /* Métodos */

public [current](#emptyiterator.current)(): [never](#language.types.never)
public [key](#emptyiterator.key)(): [never](#language.types.never)
public [next](#emptyiterator.next)(): [void](language.types.void.html)
public [rewind](#emptyiterator.rewind)(): [void](language.types.void.html)
public [valid](#emptyiterator.valid)(): [false](#language.types.singleton)

}

# EmptyIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

EmptyIterator::current — El método current()

### Descripción

public **EmptyIterator::current**(): [never](#language.types.never)

Esta función no debe ser llamada. Lanza una excepción en su acceso.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Errores/Excepciones

Lanza una [Exception](#class.exception) si es llamada.

### Valores devueltos

No se retorna ningún valor.

# EmptyIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

EmptyIterator::key — El método key()

### Descripción

public **EmptyIterator::key**(): [never](#language.types.never)

Esta función no debe ser llamada. Lanza una excepción en su acceso.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Errores/Excepciones

Lanza una [Exception](#class.exception) si es llamada.

### Valores devueltos

No se retorna ningún valor.

# EmptyIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

EmptyIterator::next — El método next()

### Descripción

public **EmptyIterator::next**(): [void](language.types.void.html)

No opera, nada a hacer.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EmptyIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

EmptyIterator::rewind — El método rewind()

### Descripción

public **EmptyIterator::rewind**(): [void](language.types.void.html)

No opera, nada a hacer.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EmptyIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

EmptyIterator::valid — Verifica si el elemento actual es válido

### Descripción

public **EmptyIterator::valid**(): [false](#language.types.singleton)

Verifica si el elemento actual es válido.

**Nota**:

    El [EmptyIterator](#class.emptyiterator) siempre está vacío y nunca tendrá un valor válido.
    El valor de retorno siempre es **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[false](#constant.false)**

## Tabla de contenidos

- [EmptyIterator::current](#emptyiterator.current) — El método current()
- [EmptyIterator::key](#emptyiterator.key) — El método key()
- [EmptyIterator::next](#emptyiterator.next) — El método next()
- [EmptyIterator::rewind](#emptyiterator.rewind) — El método rewind()
- [EmptyIterator::valid](#emptyiterator.valid) — Verifica si el elemento actual es válido

# La clase [FilesystemIterator](#class.filesystemiterator)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    El iterador **FilesystemIterator**.

## Sinopsis de la Clase

     class **FilesystemIterator**



     extends
      [DirectoryIterator](#class.directoryiterator)
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask);

    public
     const
     [int](#language.types.integer)
      [CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname);

    public
     const
     [int](#language.types.integer)
      [CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo);

    public
     const
     [int](#language.types.integer)
      [CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self);

    public
     const
     [int](#language.types.integer)
      [KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask);

    public
     const
     [int](#language.types.integer)
      [KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname);

    public
     const
     [int](#language.types.integer)
      [FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks);

    public
     const
     [int](#language.types.integer)
      [KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename);

    public
     const
     [int](#language.types.integer)
      [NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key);

    public
     const
     [int](#language.types.integer)
      [OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask);

    public
     const
     [int](#language.types.integer)
      [SKIP_DOTS](#filesystemiterator.constants.skip-dots);

    public
     const
     [int](#language.types.integer)
      [UNIX_PATHS](#filesystemiterator.constants.unix-paths);


    /* Métodos */

public [\_\_construct](#filesystemiterator.construct)([string](#language.types.string) $directory, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS)

    public [current](#filesystemiterator.current)(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

public [getFlags](#filesystemiterator.getflags)(): [int](#language.types.integer)
public [key](#filesystemiterator.key)(): [string](#language.types.string)
public [next](#filesystemiterator.next)(): [void](language.types.void.html)
public [rewind](#filesystemiterator.rewind)(): [void](language.types.void.html)
public [setFlags](#filesystemiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)

    /* Métodos heredados */
    public [DirectoryIterator::current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [DirectoryIterator::getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [DirectoryIterator::getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [DirectoryIterator::getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [DirectoryIterator::isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [DirectoryIterator::key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [DirectoryIterator::next](#directoryiterator.next)(): [void](language.types.void.html)
public [DirectoryIterator::rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [DirectoryIterator::seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [DirectoryIterator::\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [DirectoryIterator::valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[FilesystemIterator::CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname)**


       [FilesystemIterator::current()](#filesystemiterator.current) devuelve el nombre del camino.






     **[FilesystemIterator::CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo)**


       [FilesystemIterator::current()](#filesystemiterator.current) devuelve un objeto [SplFileInfo](#class.splfileinfo).






     **[FilesystemIterator::CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self)**


       [FilesystemIterator::current()](#filesystemiterator.current) devuelve $this (el **FilesystemIterator**).






     **[FilesystemIterator::CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask)**


       Máscara [FilesystemIterator::current()](#filesystemiterator.current).






     **[FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname)**


       [FilesystemIterator::key()](#filesystemiterator.key) devuelve el nombre del camino.






     **[FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename)**


       [FilesystemIterator::key()](#filesystemiterator.key) devuelve el nombre del fichero.






     **[FilesystemIterator::FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks)**

      Hace que [RecursiveDirectoryIterator::hasChildren()](#recursivedirectoryiterator.haschildren) siga los enlaces simbólicos.





     **[FilesystemIterator::KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask)**


       Máscara [FilesystemIterator::key()](#filesystemiterator.key).






     **[FilesystemIterator::NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key)**


       Idéntico a FilesystemIterator::KEY_AS_FILENAME | FilesystemIterator::CURRENT_AS_FILEINFO.






     **[FilesystemIterator::OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask)**


       Máscara utilizada para [FilesystemIterator::getFlags()](#filesystemiterator.getflags) y [FilesystemIterator::setFlags()](#filesystemiterator.setflags).






     **[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots)**

      Ignora los ficheros puntos (. y ..).





     **[FilesystemIterator::UNIX_PATHS](#filesystemiterator.constants.unix-paths)**


       Los caminos utilizan el separador de directorio de tipo Unix, es decir, la barra, independientemente del sistema operativo.
       Tenga en cuenta que el camino que se pasa al constructor no se modifica.





# FilesystemIterator::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::\_\_construct — Construye un objeto FilesystemIterator

### Descripción

public **FilesystemIterator::\_\_construct**([string](#language.types.string) $directory, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS)

Construye un objeto FilesystemIterator, configurado con
la ruta directory.

### Parámetros

     directory


       La ruta del directorio en el que se va a trabajar.






     flags


       Las opciones que afectan el comportamiento de los métodos.
       La lista de opciones está disponible en
       [las constantes de <a href="#class.filesystemiterator" class="classname">FilesystemIterator](#filesystemiterator.constants)</a>.
       También pueden ser activadas posteriormente con
       [FilesystemIterator::setFlags()](#filesystemiterator.setflags).





### Errores/Excepciones

Lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el directorio no existe.

Lanza una excepción [ValueError](#class.valueerror)
si directory es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Antes de PHP 8.2.0, **[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots)**
        estaba siempre activado y no podía ser desactivado.




       8.0.0

        Ahora lanza una excepción [ValueError](#class.valueerror)
        cuando directory es una cadena vacía;
        Anteriormente, se lanzaba una [RuntimeException](#class.runtimeexception).





### Ejemplos

    **Ejemplo #1 Ejemplo con FilesystemIterator::__construct()**

&lt;?php
$it = new FilesystemIterator(dirname(__FILE__), FilesystemIterator::CURRENT_AS_FILEINFO);
foreach ($it as $fileinfo) {
echo $fileinfo-&gt;getFilename() . "\n";
}
?&gt;

    Resultado del ejemplo anterior en PHP 8.2 es similar a:

.
..
apples.jpg
banana.jpg
example.php

    El resultado del ejemplo anterior, antes de PHP 8.2.0, es similar a:

apples.jpg
banana.jpg
example.php

### Ver también

    - [FilesystemIterator::setFlags()](#filesystemiterator.setflags) - Configura las opciones

    - [DirectoryIterator::__construct()](#directoryiterator.construct) - Construye un nuevo iterador de directorio a partir de una ruta

# FilesystemIterator::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::current — Lee el fichero actual

### Descripción

public **FilesystemIterator::current**(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

Lee las informaciones sobre el fichero actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del fichero, las informaciones del fichero, o bien
$this, en función de las opciones utilizadas.
Véase la [lista de constantes <a href="#class.filesystemiterator" class="classname">FilesystemIterator](#filesystemiterator.constants)</a>.

### Ejemplos

    **Ejemplo #1 Ejemplo con FilesystemIterator::current()**



     Este ejemplo va a probar la lista de ficheros en el script
     actual.

&lt;?php
$iterator = new FilesystemIterator(__DIR__, FilesystemIterator::CURRENT_AS_PATHNAME);
foreach ($iterator as $fileinfo) {
echo $iterator-&gt;current() . "\n";
}
?&gt;

    Resultado del ejemplo anterior en PHP 8.2 es similar a:

/www/examples/.
/www/examples/..
/www/examples/apple.jpg
/www/examples/banana.jpg
/www/examples/example.php

### Ver también

    - Las [constantes FilesystemIterator](#filesystemiterator.constants)

    - [DirectoryIterator::current()](#directoryiterator.current) - Devuelve el elemento actual del DirectoryIterator

    - [DirectoryIterator::getFileName()](#directoryiterator.getfilename) - Devuelve el nombre del fichero del elemento actual DirectoryIterator

# FilesystemIterator::getFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::getFlags — Lee las opciones activadas

### Descripción

public **FilesystemIterator::getFlags**(): [int](#language.types.integer)

Lee las opciones activadas, tal como fueron
configuradas con [FilesystemIterator::\_\_construct()](#filesystemiterator.construct)
o [FilesystemIterator::setFlags()](#filesystemiterator.setflags).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de las opciones configuradas.

### Ver también

    - [FilesystemIterator::__construct()](#filesystemiterator.construct) - Construye un objeto FilesystemIterator

    - [FilesystemIterator::setFlags()](#filesystemiterator.setflags) - Configura las opciones

# FilesystemIterator::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::key — Lee el nombre del fichero

### Descripción

public **FilesystemIterator::key**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta o el nombre del fichero, según las opciones
activadas. Véase las
[Constantes de <a href="#class.filesystemiterator" class="classname">FilesystemIterator](#filesystemiterator.constants)</a>.

### Ejemplos

    **Ejemplo #1 Ejemplo con FilesystemIterator::key()**



     Este ejemplo mostrará el contenido del directorio que
     contiene el script en curso.

&lt;?php
$iterator = new FilesystemIterator(dirname(__FILE__), FilesystemIterator::KEY_AS_FILENAME);
foreach ($iterator as $fileinfo) {
echo $iterator-&gt;key() . "\n";
}
?&gt;

    Resultado del ejemplo anterior en PHP 8.2 es similar a:

.
..
apple.jpg
banana.jpg
example.php

### Ver también

    - [Constantes de <a href="#class.filesystemiterator" class="classname">FilesystemIterator](#filesystemiterator.constants)</a>

    - [DirectoryIterator::key()](#directoryiterator.key) - Devuelve la entrada actual del directorio

    - [DirectoryIterator::getFilename()](#directoryiterator.getfilename) - Devuelve el nombre del fichero del elemento actual DirectoryIterator

    - **DirectoryIterator::getPathname()**

# FilesystemIterator::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::next — Moverse al siguiente fichero

### Descripción

public **FilesystemIterator::next**(): [void](language.types.void.html)

Moverse al siguiente fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de FilesystemIterator::next()**



     Lista el contenido de un directorio usando un bucle while.

&lt;?php
$iterator = new FilesystemIterator(dirname(__FILE__));
while($iterator-&gt;valid()) {
echo $iterator-&gt;getFilename() . "\n";
$iterator-&gt;next();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

manzana.jpg
banana.jpg
ejemplo.php

### Ver también

    - [DirectoryIterator::next()](#directoryiterator.next) - Avanza al siguiente elemento DirectoryIterator

# FilesystemIterator::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::rewind — Reinicia la lectura del directorio

### Descripción

public **FilesystemIterator::rewind**(): [void](language.types.void.html)

Reinicia la lectura del directorio desde el principio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con FilesystemIterator::rewind()**

&lt;?php
$iterator = new FilesystemIterator(dirname(**FILE**), FilesystemIterator::KEY_AS_FILENAME);

echo $iterator-&gt;key() . "\n";

$iterator-&gt;next();
echo $iterator-&gt;key() . "\n";

$iterator-&gt;rewind();
echo $iterator-&gt;key() . "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

apple.jpg
banana.jpg
apple.jpg

### Ver también

    - [DirectoryIterator::rewind()](#directoryiterator.rewind) - Robobina DirectoryIterator hasta volver al inicio

# FilesystemIterator::setFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

FilesystemIterator::setFlags — Configura las opciones

### Descripción

public **FilesystemIterator::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Configura las opciones.

### Parámetros

     flags


       Las opciones a configurar.
       Ver la lista de [constantes de <a href="#class.filesystemiterator" class="classname">FilesystemIterator](#filesystemiterator.constants)</a>.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con [FilesystemIterator::key()](#filesystemiterator.key)**



     Este ejemplo ilustra la diferencia entre las opciones
     [FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname) y
     [FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename).

&lt;?php
$iterator = new FilesystemIterator(dirname(__FILE__), FilesystemIterator::KEY_AS_PATHNAME);
echo "Clave como nombre de ruta : \n";
foreach ($iterator as $key =&gt; $fileinfo) {
echo $key . "\n";
}

$iterator-&gt;setFlags(FilesystemIterator::KEY_AS_FILENAME);
echo "\nClave como nombre de archivo : \n";
foreach ($iterator as $key =&gt; $fileinfo) {
echo $key . "\n";
}
?&gt;

    Resultado del ejemplo anterior en PHP 8.2 es similar a:

Clave como nombre de ruta :
/www/examples/.
/www/examples/.. /www/examples/apple.jpg
/www/examples/banana.jpg
/www/examples/example.php

Clave como nombre de archivo :
.
..
apple.jpg
banana.jpg
example.php

### Ver también

    - [FilesystemIterator::__construct()](#filesystemiterator.construct) - Construye un objeto FilesystemIterator

    - [FilesystemIterator::getFlags()](#filesystemiterator.getflags) - Lee las opciones activadas

## Tabla de contenidos

- [FilesystemIterator::\_\_construct](#filesystemiterator.construct) — Construye un objeto FilesystemIterator
- [FilesystemIterator::current](#filesystemiterator.current) — Lee el fichero actual
- [FilesystemIterator::getFlags](#filesystemiterator.getflags) — Lee las opciones activadas
- [FilesystemIterator::key](#filesystemiterator.key) — Lee el nombre del fichero
- [FilesystemIterator::next](#filesystemiterator.next) — Moverse al siguiente fichero
- [FilesystemIterator::rewind](#filesystemiterator.rewind) — Reinicia la lectura del directorio
- [FilesystemIterator::setFlags](#filesystemiterator.setflags) — Configura las opciones

# La clase FilterIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Este iterador abstracto filtra valores no deseados. Esta clase debería ser ampliada para
    implementar filtros personalizados. [FilterIterator::accept()](#filteriterator.accept)
    debe ser implementado en la subclase.

## Sinopsis de la Clase

     abstract
     class **FilterIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)
     {

    /* Métodos */

public [\_\_construct](#filteriterator.construct)([Iterator](#class.iterator) $iterator)

    public [accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [next](#filteriterator.next)(): [void](language.types.void.html)
public [rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# FilterIterator::accept

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::accept — Comprueba si el elemento actual del iterador es aceptable

### Descripción

public **FilterIterator::accept**(): [bool](#language.types.boolean)

Devuelve si el elemento actual del iterador es aceptable a través de este filtro.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el elemento actual es aceptable, o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de FilterIterator::accept()**

&lt;?php
// Este iterador filtra los valores con menos de 10 caracteres
class LengthFilterIterator extends FilterIterator {

    public function accept() {
        // Sólo acepta string con una longitud de 10 o mayor
        return strlen(parent::current()) &gt;= 10;
    }

}

$arrayIterator = new ArrayIterator(array('test1', 'más de 10 caracteres'));
$lengthFilter = new LengthFilterIterator($arrayIterator);

foreach ($lengthFilter as $value) {
echo $value . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

más de 10 caracteres

# FilterIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::\_\_construct — Construye un filterIterator

### Descripción

public **FilterIterator::\_\_construct**([Iterator](#class.iterator) $iterator)

Construir un nuevo [FilterIterator](#class.filteriterator), que consiste en
pasar un iterator y aplicar varios filtros a este.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El iterador que va a ser filtrado.





### Ver también

    - [LimitIterator::__construct()](#limititerator.construct) - Construye un nuevo objeto LimitIterator

# FilterIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::current — Obtiene el valor del elemento actual

### Descripción

public **FilterIterator::current**(): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

obtiene el valor del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del elemento actual.

### Ver también

    - [FilterIterator::key()](#filteriterator.key) - Obtiene la clave actual

    - [FilterIterator::next()](#filteriterator.next) - Mueve el iterador a la siguiente posición

# FilterIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::key — Obtiene la clave actual

### Descripción

public **FilterIterator::key**(): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Obtiene la clave actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave actual.

### Ver también

    - [FilterIterator::next()](#filteriterator.next) - Mueve el iterador a la siguiente posición

    - [FilterIterator::current()](#filteriterator.current) - Obtiene el valor del elemento actual

# FilterIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::next — Mueve el iterador a la siguiente posición

### Descripción

public **FilterIterator::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Mover el iterador a la siguiente posición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [FilterIterator::current()](#filteriterator.current) - Obtiene el valor del elemento actual

    - [FilterIterator::key()](#filteriterator.key) - Obtiene la clave actual

# FilterIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::rewind — Rebobina el iterador

### Descripción

public **FilterIterator::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Rebobinar el iterador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [FilterIterator::current()](#filteriterator.current) - Obtiene el valor del elemento actual

    - [FilterIterator::key()](#filteriterator.key) - Obtiene la clave actual

    - [FilterIterator::next()](#filteriterator.next) - Mueve el iterador a la siguiente posición

# FilterIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

FilterIterator::valid — Verifica si el elemento actual es válido

### Descripción

public **FilterIterator::valid**(): [bool](#language.types.boolean)

Verifica si el elemento actual es válido.

**Nota**:

    La implementación estándar de esta función retornará inicialmente **[false](#constant.false)**
    hasta que el iterador interno se avance al primer elemento aceptado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el elemento actual es válido, **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [FilterIterator::accept](#filteriterator.accept) — Comprueba si el elemento actual del iterador es aceptable
- [FilterIterator::\_\_construct](#filteriterator.construct) — Construye un filterIterator
- [FilterIterator::current](#filteriterator.current) — Obtiene el valor del elemento actual
- [FilterIterator::key](#filteriterator.key) — Obtiene la clave actual
- [FilterIterator::next](#filteriterator.next) — Mueve el iterador a la siguiente posición
- [FilterIterator::rewind](#filteriterator.rewind) — Rebobina el iterador
- [FilterIterator::valid](#filteriterator.valid) — Verifica si el elemento actual es válido

# La clase [GlobIterator](#class.globiterator)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Recorre un sistema de ficheros, de manera similar
    a la función [glob()](#function.glob).

## Sinopsis de la Clase

     class **GlobIterator**



     extends
      [FilesystemIterator](#class.filesystemiterator)



     implements
      [Countable](#class.countable) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [FilesystemIterator::CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask);

public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename);
public
const
[int](#language.types.integer)
[FilesystemIterator::NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key);
public
const
[int](#language.types.integer)
[FilesystemIterator::OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots);
public
const
[int](#language.types.integer)
[FilesystemIterator::UNIX_PATHS](#filesystemiterator.constants.unix-paths);

    /* Métodos */

public [\_\_construct](#globiterator.construct)([string](#language.types.string) $pattern, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO)

    public [count](#globiterator.count)(): [int](#language.types.integer)


    /* Métodos heredados */
    public [FilesystemIterator::current](#filesystemiterator.current)(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

public [FilesystemIterator::getFlags](#filesystemiterator.getflags)(): [int](#language.types.integer)
public [FilesystemIterator::key](#filesystemiterator.key)(): [string](#language.types.string)
public [FilesystemIterator::next](#filesystemiterator.next)(): [void](language.types.void.html)
public [FilesystemIterator::rewind](#filesystemiterator.rewind)(): [void](language.types.void.html)
public [FilesystemIterator::setFlags](#filesystemiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)

    public [DirectoryIterator::current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [DirectoryIterator::getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [DirectoryIterator::getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [DirectoryIterator::getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [DirectoryIterator::isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [DirectoryIterator::key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [DirectoryIterator::next](#directoryiterator.next)(): [void](language.types.void.html)
public [DirectoryIterator::rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [DirectoryIterator::seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [DirectoryIterator::\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [DirectoryIterator::valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# GlobIterator::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

GlobIterator::\_\_construct — Construye un iterador de tipo glob

### Descripción

public **GlobIterator::\_\_construct**([string](#language.types.string) $pattern, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO)

Construye un iterador de tipo glob.

### Parámetros

     pattern


       Un patrón [glob()](#function.glob).






     flags


       Las opciones, que pueden ser un campo de bits
       de constantes de clase [FilesystemIterator](#class.filesystemiterator).





### Errores/Excepciones

Se lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el directorio no existe.

Se lanza una excepción [ValueError](#class.valueerror)
si directory es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora se lanza una excepción [ValueError](#class.valueerror)
        cuando directory es una cadena vacía;
        Anteriormente, se lanzaba una [RuntimeException](#class.runtimeexception).





### Ejemplos

    **Ejemplo #1 Ejemplo con [GlobIterator](#class.globiterator)**

&lt;?php
$iterator = new GlobIterator('\*.dll', FilesystemIterator::KEY_AS_FILENAME);

if (!$iterator-&gt;count()) {
echo 'No matches';
} else {
$n = 0;

    printf("Matched  %d item(s)\r\n", $iterator-&gt;count());

    foreach ($iterator as $item) {
        printf("[%d] %s\r\n", ++$n, $iterator-&gt;key());
    }

}
?&gt;

    Resultado del ejemplo anterior es similar a:

Matched 2 item(s)
[1] php5ts.dll
[2] php_gd2.dll

### Ver también

    - [DirectoryIterator::__construct()](#directoryiterator.construct) - Construye un nuevo iterador de directorio a partir de una ruta

    - [GlobIterator::count()](#globiterator.count) - Lee el número de directorios y ficheros

    - [glob()](#function.glob) - Búsqueda de rutas que coinciden con un patrón

# GlobIterator::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

GlobIterator::count — Lee el número de directorios y ficheros

### Descripción

public **GlobIterator::count**(): [int](#language.types.integer)

Lee el número de directorios y ficheros encontrados por
la expresión Glob.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de directorios y ficheros se devuelve como un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con GlobIterator::count()**

&lt;?php
$iterator = new GlobIterator('\*.xml');

printf("Encontrados %d elemento(s)\r\n", $iterator-&gt;count());
?&gt;

    Resultado del ejemplo anterior es similar a:

Matched 8 item(s)

### Ver también

    - [GlobIterator::__construct()](#globiterator.construct) - Construye un iterador de tipo glob

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

    - [glob()](#function.glob) - Búsqueda de rutas que coinciden con un patrón

## Tabla de contenidos

- [GlobIterator::\_\_construct](#globiterator.construct) — Construye un iterador de tipo glob
- [GlobIterator::count](#globiterator.count) — Lee el número de directorios y ficheros

# La clase InfiniteIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La clase **InfiniteIterator** permite recorrer
    un iterador de forma infinita sin tener que rebobinar manualmente
    el iterador al llegar a su final.

## Sinopsis de la Clase

     class **InfiniteIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)
     {

    /* Métodos */

public [\_\_construct](#infiniteiterator.construct)([Iterator](#class.iterator) $iterator)

    public [next](#infiniteiterator.next)(): [void](language.types.void.html)


    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# InfiniteIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

InfiniteIterator::\_\_construct — Construye un InfiniteIterator

### Descripción

public **InfiniteIterator::\_\_construct**([Iterator](#class.iterator) $iterator)

Construye un [InfiniteIterator](#class.infiniteiterator)
de un [Iterator](#class.iterator).

### Parámetros

     iterator


       El iterador a iterar infinitamente.





### Ejemplos

    **Ejemplo #1 Ejemplo de InfiniteIterator::__construct()**

&lt;?php
$arrayit  = new ArrayIterator(array('gato','perro'));
$infinite = new InfiniteIterator($arrayit);
$limit = new LimitIterator($infinite, 0, 7);
foreach($limit as $value)
{
    echo "$value\n";
}
?&gt;

    El ejemplo anterior mostrará:

gato
perro
gato
perro
gato
perro
gato

### Ver también

    - [InfiniteIterator::next()](#infiniteiterator.next) - Mueve el iterador interno hacía adelante o se rebobina

# InfiniteIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

InfiniteIterator::next — Mueve el iterador interno hacía adelante o se rebobina

### Descripción

public **InfiniteIterator::next**(): [void](language.types.void.html)

Mueve el elemento del [Iterator](#class.iterator) interno al siguiente elemento si hay alguno,
en caso contrario rebobina el [Iterator](#class.iterator) interno hasta el inicio.

**Nota**:

    Incluso un [InfiniteIterator](#class.infiniteiterator) se detiene si
    un [Iterator](#class.iterator) está vacío.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [InfiniteIterator::__construct()](#infiniteiterator.construct) - Construye un InfiniteIterator

## Tabla de contenidos

- [InfiniteIterator::\_\_construct](#infiniteiterator.construct) — Construye un InfiniteIterator
- [InfiniteIterator::next](#infiniteiterator.next) — Mueve el iterador interno hacía adelante o se rebobina

# La clase IteratorIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Esta envoltura de iteradores permite la conversión de todo aquello que es
    [Traversable](#class.traversable) a un iterador.
    Es importante comprender que la mayoría de las clases que no implementan
    iteradores, lo más probable es que no permitan todas las características
    del iterador. Si es así, deberían proporcionarse técnicas para evitar un uso
    indebido, de lo contrario se pueden esperar excepciones o errores fatales.

## Sinopsis de la Clase

     class **IteratorIterator**



     implements
      [OuterIterator](#class.outeriterator) {

    /* Métodos */

public [\_\_construct](#iteratoriterator.construct)([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**)

    public [current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [next](#iteratoriterator.next)(): [void](language.types.void.html)
public [rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Notas

**Nota**:

     Esta clase permite el acceso a métodos del iterador interno mediante el método mágico __call.

# IteratorIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::\_\_construct — Crea un iterador a partir de un objeto traversable

### Descripción

public **IteratorIterator::\_\_construct**([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**)

Crea un iterador a partir de un objeto traversable.

### Parámetros

     iterator


       El iterador traversable.






     class


       El nombre de clase a utilizar para el iterador interno. Esto permite especificar una clase de iterador diferente para envolver el iterador proporcionado. Por omisión, la clase IteratorIterator misma será utilizada.





### Ver también

    - [Traversable](#class.traversable)

# IteratorIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::current — Obtener el valor actual

### Descripción

public **IteratorIterator::current**(): [mixed](#language.types.mixed)

Obtiene el valor actual del elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del elemento actual.

### Ver también

    - [IteratorIterator::key()](#iteratoriterator.key) - Obtener la clave del elemento actual

# IteratorIterator::getInnerIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::getInnerIterator — Devuelve el iterador interno

### Descripción

public **IteratorIterator::getInnerIterator**(): [?](#language.types.null)[Iterator](#class.iterator)

Devuelve el iterador interno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El iterador interno, proporcionado al constructor
[IteratorIterator::\_\_construct()](#iteratoriterator.construct),
o **[null](#constant.null)** si no hay iterador interno.

### Ver también

    - [Iterator](#class.iterator)

    - [OuterIterator](#class.outeriterator)

# IteratorIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::key — Obtener la clave del elemento actual

### Descripción

public **IteratorIterator::key**(): [mixed](#language.types.mixed)

Obtiene la clave del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave del elemento actual.

### Ver también

    - [IteratorIterator::current()](#iteratoriterator.current) - Obtener el valor actual

# IteratorIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::next — Avanzar al siguiente elemento

### Descripción

public **IteratorIterator::next**(): [void](language.types.void.html)

Avanza al siguiente elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [IteratorIterator::rewind()](#iteratoriterator.rewind) - Rebobinar al primer elemento

    - [IteratorIterator::valid()](#iteratoriterator.valid) - Verifica si el elemento actual es válido

# IteratorIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::rewind — Rebobinar al primer elemento

### Descripción

public **IteratorIterator::rewind**(): [void](language.types.void.html)

Rebobinar al primer elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [IteratorIterator::next()](#iteratoriterator.next) - Avanzar al siguiente elemento

    - [IteratorIterator::valid()](#iteratoriterator.valid) - Verifica si el elemento actual es válido

# IteratorIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

IteratorIterator::valid — Verifica si el elemento actual es válido

### Descripción

public **IteratorIterator::valid**(): [bool](#language.types.boolean)

Verifica si el elemento actual es válido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el elemento actual es válido, de lo contrario **[false](#constant.false)**

### Ver también

    - [iterator_count()](#function.iterator-count) - Cuenta el número de elementos en un iterador

    - [IteratorIterator::current()](#iteratoriterator.current) - Obtener el valor actual

## Tabla de contenidos

- [IteratorIterator::\_\_construct](#iteratoriterator.construct) — Crea un iterador a partir de un objeto traversable
- [IteratorIterator::current](#iteratoriterator.current) — Obtener el valor actual
- [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator) — Devuelve el iterador interno
- [IteratorIterator::key](#iteratoriterator.key) — Obtener la clave del elemento actual
- [IteratorIterator::next](#iteratoriterator.next) — Avanzar al siguiente elemento
- [IteratorIterator::rewind](#iteratoriterator.rewind) — Rebobinar al primer elemento
- [IteratorIterator::valid](#iteratoriterator.valid) — Verifica si el elemento actual es válido

# La clase [LimitIterator](#class.limititerator)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La clase **LimitIterator** permite iterar sobre una parte
    limitada de entidades desde un [Iterator](#class.iterator).

## Sinopsis de la Clase

     class **LimitIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)
     {

    /* Métodos */

public [\_\_construct](#limititerator.construct)([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $offset = 0, [int](#language.types.integer) $limit = -1)

    public [current](#limititerator.current)(): [mixed](#language.types.mixed)

public [getPosition](#limititerator.getposition)(): [int](#language.types.integer)
public [key](#limititerator.key)(): [mixed](#language.types.mixed)
public [next](#limititerator.next)(): [void](language.types.void.html)
public [rewind](#limititerator.rewind)(): [void](language.types.void.html)
public [seek](#limititerator.seek)([int](#language.types.integer) $offset): [int](#language.types.integer)
public [valid](#limititerator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

     **Ejemplo #1 Ejemplo de uso de LimitIterator**




&lt;?php

// Crear un iterador a limitar
$fruits = new ArrayIterator(array(
'apple',
'banana',
'cherry',
'damson',
'elderberry'
));

// Bucle sobre los 3 primeros frutos únicamente
foreach (new LimitIterator($fruits, 0, 3) as $fruit) {
    var_dump($fruit);
}

echo "\n";

// Bucle desde el 3º fruto hasta el último
// Nota: la clave comienza en cero para apple
foreach (new LimitIterator($fruits, 2) as $fruit) {
    var_dump($fruit);
}

?&gt;

    El ejemplo anterior mostrará:

string(5) "apple"
string(6) "banana"
string(6) "cherry"

string(6) "cherry"
string(6) "damson"
string(10) "elderberry"

# LimitIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::\_\_construct — Construye un nuevo objeto LimitIterator

### Descripción

public **LimitIterator::\_\_construct**([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $offset = 0, [int](#language.types.integer) $limit = -1)

Construye un nuevo objeto [LimitIterator](#class.limititerator) desde iterator con
un offset y un límite máximo limit

### Parámetros

     iterator


       El [Iterator](#class.iterator) a limitar.






     offset


       Posición opcional del límite.






     limit


       Número opcional del límite.





### Errores/Excepciones

Lanza una [ValueError](#class.valueerror)
si offset es inferior a 0
o si limit es inferior a -1.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora lanza una excepción [ValueError](#class.valueerror)
        cuando offset es inferior a 0 ;
        Anteriormente, se lanzaba una [RuntimeException](#class.runtimeexception).




       8.0.0

        Ahora lanza una excepción [ValueError](#class.valueerror)
        cuando limit es inferior a -1 ;
        Anteriormente, se lanzaba una [RuntimeException](#class.runtimeexception).





### Ejemplos

    **Ejemplo #1 Ejemplo LimitIterator::__construct()**

&lt;?php
$ait = new ArrayIterator(array('a', 'b', 'c', 'd', 'e'));
$lit = new LimitIterator($ait, 1, 3);
foreach ($lit as $value) {
echo $value . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

b
c
d

### Ver también

    - [Ejemplos LimitIterator](#limititerator.examples)

# LimitIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::current — Obtiene el elemento actual

### Descripción

public **LimitIterator::current**(): [mixed](#language.types.mixed)

Obtener el elemento actual del [Iterator](#class.iterator) interno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el elemento actual o **[null](#constant.null)** si no hay ninguno.

### Ver también

    - [LimitIterator::key()](#limititerator.key) - Obtiene la clave actual

    - [LimitIterator::next()](#limititerator.next) - Desplaza el iterador a la posición siguiente

    - [LimitIterator::rewind()](#limititerator.rewind) - Reemplazar el iterador al inicio

    - [LimitIterator::seek()](#limititerator.seek) - Coloca el iterador en una posición dada

    - [LimitIterator::valid()](#limititerator.valid) - Verifica si el elemento actual es válido

# LimitIterator::getPosition

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::getPosition — Devuelve la posición actual

### Descripción

public **LimitIterator::getPosition**(): [int](#language.types.integer)

Devuelve la posición (partiendo de cero) del iterador interno [Iterator](#class.iterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La posición actual.

### Ejemplos

    **Ejemplo #1 Ejemplo LimitIterator::getPosition()**

&lt;?php
$fruits = array(
    'a' =&gt; 'apple',
    'b' =&gt; 'banana',
    'c' =&gt; 'cherry',
    'd' =&gt; 'damson',
    'e' =&gt; 'elderberry'
);
$array_it = new ArrayIterator($fruits);
$limit_it = new LimitIterator($array_it, 2, 3);
foreach ($limit_it as $item) {
echo $limit_it-&gt;getPosition() . ' ' . $item . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

2 cherry
3 damson
4 elderberry

### Ver también

    - [FilterIterator::key()](#filteriterator.key) - Obtiene la clave actual

# LimitIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::key — Obtiene la clave actual

### Descripción

public **LimitIterator::key**(): [mixed](#language.types.mixed)

Obtiene la clave para el elemento actual en el [Iterator](#class.iterator) interno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la clave de el elemento actual.

### Ver también

    - [LimitIterator::getPosition()](#limititerator.getposition) - Devuelve la posición actual

    - [LimitIterator::current()](#limititerator.current) - Obtiene el elemento actual

    - [LimitIterator::next()](#limititerator.next) - Desplaza el iterador a la posición siguiente

    - [LimitIterator::rewind()](#limititerator.rewind) - Reemplazar el iterador al inicio

    - [LimitIterator::seek()](#limititerator.seek) - Coloca el iterador en una posición dada

    - [LimitIterator::valid()](#limititerator.valid) - Verifica si el elemento actual es válido

# LimitIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::next — Desplaza el iterador a la posición siguiente

### Descripción

public **LimitIterator::next**(): [void](language.types.void.html)

Desplaza el iterador a la posición siguiente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [LimitIterator::current()](#limititerator.current) - Obtiene el elemento actual

    - [LimitIterator::key()](#limititerator.key) - Obtiene la clave actual

    - [LimitIterator::rewind()](#limititerator.rewind) - Reemplazar el iterador al inicio

    - [LimitIterator::seek()](#limititerator.seek) - Coloca el iterador en una posición dada

    - [LimitIterator::valid()](#limititerator.valid) - Verifica si el elemento actual es válido

# LimitIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::rewind — Reemplazar el iterador al inicio

### Descripción

public **LimitIterator::rewind**(): [void](language.types.void.html)

Reemplaza el iterador en la posición especificada en [LimitIterator::\_\_construct()](#limititerator.construct).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [LimitIterator::current()](#limititerator.current) - Obtiene el elemento actual

    - [LimitIterator::key()](#limititerator.key) - Obtiene la clave actual

    - [LimitIterator::next()](#limititerator.next) - Desplaza el iterador a la posición siguiente

    - [LimitIterator::seek()](#limititerator.seek) - Coloca el iterador en una posición dada

    - [LimitIterator::valid()](#limititerator.valid) - Verifica si el elemento actual es válido

# LimitIterator::seek

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::seek — Coloca el iterador en una posición dada

### Descripción

public **LimitIterator::seek**([int](#language.types.integer) $offset): [int](#language.types.integer)

Mueve el iterador interno a la posición offset.

### Parámetros

     offset


       La posición en la que se desea situar.





### Valores devueltos

Devuelve la posición después del desplazamiento.

### Errores/Excepciones

Envía una [OutOfBoundsException](#class.outofboundsexception) si la posición está fuera de
los límites indicados en [LimitIterator::\_\_construct()](#limititerator.construct).

### Ver también

    - [LimitIterator::current()](#limititerator.current) - Obtiene el elemento actual

    - [LimitIterator::key()](#limititerator.key) - Obtiene la clave actual

    - [LimitIterator::rewind()](#limititerator.rewind) - Reemplazar el iterador al inicio

    - [LimitIterator::next()](#limititerator.next) - Desplaza el iterador a la posición siguiente

    - [LimitIterator::valid()](#limititerator.valid) - Verifica si el elemento actual es válido

# LimitIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

LimitIterator::valid — Verifica si el elemento actual es válido

### Descripción

public **LimitIterator::valid**(): [bool](#language.types.boolean)

Verifica si el elemento actual es válido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [LimitIterator::current()](#limititerator.current) - Obtiene el elemento actual

    - [LimitIterator::key()](#limititerator.key) - Obtiene la clave actual

    - [LimitIterator::rewind()](#limititerator.rewind) - Reemplazar el iterador al inicio

    - [LimitIterator::next()](#limititerator.next) - Desplaza el iterador a la posición siguiente

    - [LimitIterator::seek()](#limititerator.seek) - Coloca el iterador en una posición dada

## Tabla de contenidos

- [LimitIterator::\_\_construct](#limititerator.construct) — Construye un nuevo objeto LimitIterator
- [LimitIterator::current](#limititerator.current) — Obtiene el elemento actual
- [LimitIterator::getPosition](#limititerator.getposition) — Devuelve la posición actual
- [LimitIterator::key](#limititerator.key) — Obtiene la clave actual
- [LimitIterator::next](#limititerator.next) — Desplaza el iterador a la posición siguiente
- [LimitIterator::rewind](#limititerator.rewind) — Reemplazar el iterador al inicio
- [LimitIterator::seek](#limititerator.seek) — Coloca el iterador en una posición dada
- [LimitIterator::valid](#limititerator.valid) — Verifica si el elemento actual es válido

# La clase [MultipleIterator](#class.multipleiterator)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Un iterador que itera secuencialmente sobre varios iteradores.

## Sinopsis de la Clase

     class **MultipleIterator**



     implements
      [Iterator](#class.iterator) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [MIT_NEED_ANY](#multipleiterator.constants.mit-need-any);

    public
     const
     [int](#language.types.integer)
      [MIT_NEED_ALL](#multipleiterator.constants.mit-need-all);

    public
     const
     [int](#language.types.integer)
      [MIT_KEYS_NUMERIC](#multipleiterator.constants.mit-keys-numeric);

    public
     const
     [int](#language.types.integer)
      [MIT_KEYS_ASSOC](#multipleiterator.constants.mit-keys-assoc);


    /* Métodos */

public [\_\_construct](#multipleiterator.construct)([int](#language.types.integer) $flags = MultipleIterator::MIT_NEED_ALL | MultipleIterator::MIT_KEYS_NUMERIC)

    public [attachIterator](#multipleiterator.attachiterator)([Iterator](#class.iterator) $iterator, [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $info = **[null](#constant.null)**): [void](language.types.void.html)

public [containsIterator](#multipleiterator.containsiterator)([Iterator](#class.iterator) $iterator): [bool](#language.types.boolean)
public [countIterators](#multipleiterator.countiterators)(): [int](#language.types.integer)
public [current](#multipleiterator.current)(): [array](#language.types.array)
public [detachIterator](#multipleiterator.detachiterator)([Iterator](#class.iterator) $iterator): [void](language.types.void.html)
public [getFlags](#multipleiterator.getflags)(): [int](#language.types.integer)
public [key](#multipleiterator.key)(): [array](#language.types.array)
public [next](#multipleiterator.next)(): [void](language.types.void.html)
public [rewind](#multipleiterator.rewind)(): [void](language.types.void.html)
public [setFlags](#multipleiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [valid](#multipleiterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[MultipleIterator::MIT_NEED_ANY](#multipleiterator.constants.mit-need-any)**


       No exige que los iteradores sean todos válidos
       en una iteración.







     **[MultipleIterator::MIT_NEED_ALL](#multipleiterator.constants.mit-need-all)**


       Exige que los iteradores sean todos válidos
       en una iteración.







     **[MultipleIterator::MIT_KEYS_NUMERIC](#multipleiterator.constants.mit-keys-numeric)**


       Las claves se crean a partir de las posiciones de los iteradores.







     **[MultipleIterator::MIT_KEYS_ASSOC](#multipleiterator.constants.mit-keys-assoc)**


       Las claves se crean a partir de las informaciones asociadas de los iteradores.





# MultipleIterator::attachIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::attachIterator — Adjunta un iterador

### Descripción

public **MultipleIterator::attachIterator**([Iterator](#class.iterator) $iterator, [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $info = **[null](#constant.null)**): [void](language.types.void.html)

Adjunta un iterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El nuevo iterador a adjuntar.






     info


       Las informaciones del iterador, que deben ser un [int](#language.types.integer),
       un [string](#language.types.string) o **[null](#constant.null)**.





### Valores devueltos

### Errores/Excepciones

Se lanza una excepción **IllegalValueException** si el argumento iterator
es inválido, o si info es una información ya asociada.

### Ver también

    - [MultipleIterator::__construct()](#multipleiterator.construct) - Construye un nuevo objeto MultipleIterator

# MultipleIterator::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::\_\_construct — Construye un nuevo objeto MultipleIterator

### Descripción

public **MultipleIterator::\_\_construct**([int](#language.types.integer) $flags = MultipleIterator::MIT_NEED_ALL | MultipleIterator::MIT_KEYS_NUMERIC)

Construye un nuevo objeto MultipleIterator.

### Parámetros

     flags


       La bandera a definir, según las
       [constantes](#multipleiterator.constants).



        -
         **[MultipleIterator::MIT_NEED_ALL](#multipleiterator.constants.mit-need-all)** o
         **[MultipleIterator::MIT_NEED_ANY](#multipleiterator.constants.mit-need-any)**


        -
         **[MultipleIterator::MIT_KEYS_NUMERIC](#multipleiterator.constants.mit-keys-numeric)** o
         **[MultipleIterator::MIT_KEYS_ASSOC](#multipleiterator.constants.mit-keys-assoc)**





       Por omisión, vale **[MultipleIterator::MIT_NEED_ALL](#multipleiterator.constants.mit-need-all)**|**[MultipleIterator::MIT_KEYS_NUMERIC](#multipleiterator.constants.mit-keys-numeric)**.





### Ejemplos

    **Ejemplo #1 Iterar un MultipleIterator**

&lt;?php
$people = new ArrayIterator(array('John', 'Jane', 'Jack', 'Judy'));
$roles = new ArrayIterator(array('Developer', 'Scrum Master', 'Project Owner'));

$team = new MultipleIterator($flags);
$team-&gt;attachIterator($people, 'person');
$team-&gt;attachIterator($roles, 'role');

foreach ($team as $member) {
    print_r($member);
}
?&gt;

    Mostrado con $flags = MIT_NEED_ALL|MIT_KEYS_NUMERIC

Array
(
[0] =&gt; John
[1] =&gt; Developer
)
Array
(
[0] =&gt; Jane
[1] =&gt; Scrum Master
)
Array
(
[0] =&gt; Jack
[1] =&gt; Project Owner
)

    Mostrado con $flags = MIT_NEED_ANY|MIT_KEYS_NUMERIC

Array
(
[0] =&gt; John
[1] =&gt; Developer
)
Array
(
[0] =&gt; Jane
[1] =&gt; Scrum Master
)
Array
(
[0] =&gt; Jack
[1] =&gt; Project Owner
)
Array
(
[0] =&gt; Judy
[1] =&gt;
)

    Mostrado con $flags = MIT_NEED_ALL|MIT_KEYS_ASSOC

Array
(
[person] =&gt; John
[role] =&gt; Developer
)
Array
(
[person] =&gt; Jane
[role] =&gt; Scrum Master
)
Array
(
[person] =&gt; Jack
[role] =&gt; Project Owner
)

    Mostrado con $flags = MIT_NEED_ANY|MIT_KEYS_ASSOC

Array
(
[person] =&gt; John
[role] =&gt; Developer
)
Array
(
[person] =&gt; Jane
[role] =&gt; Scrum Master
)
Array
(
[person] =&gt; Jack
[role] =&gt; Project Owner
)
Array
(
[person] =&gt; Judy
[role] =&gt;
)

### Ver también

    - [Las constantes](#multipleiterator.constants)

    - [MultipleIterator::valid()](#multipleiterator.valid) - Verifica la validez de un subiterador

# MultipleIterator::containsIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::containsIterator — Verifica si un iterador está adjunto

### Descripción

public **MultipleIterator::containsIterator**([Iterator](#class.iterator) $iterator): [bool](#language.types.boolean)

Verifica si un iterador está adjunto.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El iterador a verificar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [MultipleIterator::valid()](#multipleiterator.valid) - Verifica la validez de un subiterador

# MultipleIterator::countIterators

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::countIterators — Obtiene el número de instancias de iteradores adjuntos

### Descripción

public **MultipleIterator::countIterators**(): [int](#language.types.integer)

Obtiene el número de instancias de iteradores adjuntos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de instancias de iteradores adjuntos (en forma de
[int](#language.types.integer)).

### Ver también

    - [MultipleIterator::containsIterator()](#multipleiterator.containsiterator) - Verifica si un iterador está adjunto

# MultipleIterator::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::current — Recupera las instancias de los iteradores adjuntos

### Descripción

public **MultipleIterator::current**(): [array](#language.types.array)

Recupera las instancias actuales de los iteradores adjuntos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que contiene los valores actuales de cada iterador adjunto.

### Errores/Excepciones

Una excepción [RuntimeException](#class.runtimeexception) si el iterador es
inválido (a partir de PHP 8.1.0), o el modo
**[MIT_NEED_ALL](#constant.mit-need-all)** está definido y al menos un iterador inválido.
O una excepción **IllegalValueException** si una clave es **[null](#constant.null)** y
el modo **[MIT_KEYS_ASSOC](#constant.mit-keys-assoc)** está definido.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Una [RuntimeException](#class.runtimeexception) es ahora lanzada cuando
       **MultipleIterator::current()** es llamado sobre un
       iterador inválido. Anteriormente, **[false](#constant.false)** era devuelto.



### Ver también

    - [MultipleIterator::valid()](#multipleiterator.valid) - Verifica la validez de un subiterador

# MultipleIterator::detachIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::detachIterator — Desanexa un iterador

### Descripción

public **MultipleIterator::detachIterator**([Iterator](#class.iterator) $iterator): [void](language.types.void.html)

Desanexa un iterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El iterador a desanexar.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [MultipleIterator::attachIterator()](#multipleiterator.attachiterator) - Adjunta un iterador

# MultipleIterator::getFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::getFlags — Obtiene información de un flag

### Descripción

public **MultipleIterator::getFlags**(): [int](#language.types.integer)

Obtiene información de un flag.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La información de un flag, en forma de un [int](#language.types.integer).

### Ver también

    - [Las constantes](#multipleiterator.constants)

    - [MultipleIterator::__construct()](#multipleiterator.construct) - Construye un nuevo objeto MultipleIterator

    - [MultipleIterator::setFlags()](#multipleiterator.setflags) - Define flags

# MultipleIterator::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::key — Recupera las instancias de los iteradores registrados

### Descripción

public **MultipleIterator::key**(): [array](#language.types.array)

Recupera las claves de las instancias de los iteradores registrados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de todos los iteradores registrados.

### Errores/Excepciones

Una excepción [RuntimeException](#class.runtimeexception) si el iterador es
inválido (a partir de PHP 8.1.0), o el modo
**[MIT_NEED_ALL](#constant.mit-need-all)** está definido y al menos un iterador inválido.

La llamada a este método desde [foreach](#control-structures.foreach)
provoca una advertencia de tipo "Illegal type returned".

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Una [RuntimeException](#class.runtimeexception) es lanzada cuando
       **MultipleIterator::key()** es llamado sobre un
       iterador inválido. Anteriormente, **[false](#constant.false)** era devuelto.



### Ver también

    - [MultipleIterator::current()](#multipleiterator.current) - Recupera las instancias de los iteradores adjuntos

# MultipleIterator::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::next — Desplaza hacia adelante todas las instancias de los iteradores adjuntos

### Descripción

public **MultipleIterator::next**(): [void](language.types.void.html)

Desplaza hacia adelante todas las instancias de los iteradores adjuntos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [MultipleIterator::rewind()](#multipleiterator.rewind) - Reinicia todas las instancias de iteradores adjuntos

# MultipleIterator::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::rewind — Reinicia todas las instancias de iteradores adjuntos

### Descripción

public **MultipleIterator::rewind**(): [void](language.types.void.html)

Reinicia todas las instancias de iteradores adjuntos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [MultipleIterator::next()](#multipleiterator.next) - Desplaza hacia adelante todas las instancias de los iteradores adjuntos

# MultipleIterator::setFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::setFlags — Define flags

### Descripción

public **MultipleIterator::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Define flags.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     flags


       El flag a definir, según las
       [constantes disponibles](#multipleiterator.constants)





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [Las constantes](#multipleiterator.constants)

    - [MultipleIterator::__construct()](#multipleiterator.construct) - Construye un nuevo objeto MultipleIterator

    - [MultipleIterator::getFlags()](#multipleiterator.getflags) - Obtiene información de un flag

# MultipleIterator::valid

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

MultipleIterator::valid — Verifica la validez de un subiterador

### Descripción

public **MultipleIterator::valid**(): [bool](#language.types.boolean)

Verifica la validez de un subiterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si uno o todos los subiteradores son válidos, según los flags,
**[false](#constant.false)** en caso contrario.

### Ver también

    - [MultipleIterator::__construct()](#multipleiterator.construct) - Construye un nuevo objeto MultipleIterator

## Tabla de contenidos

- [MultipleIterator::attachIterator](#multipleiterator.attachiterator) — Adjunta un iterador
- [MultipleIterator::\_\_construct](#multipleiterator.construct) — Construye un nuevo objeto MultipleIterator
- [MultipleIterator::containsIterator](#multipleiterator.containsiterator) — Verifica si un iterador está adjunto
- [MultipleIterator::countIterators](#multipleiterator.countiterators) — Obtiene el número de instancias de iteradores adjuntos
- [MultipleIterator::current](#multipleiterator.current) — Recupera las instancias de los iteradores adjuntos
- [MultipleIterator::detachIterator](#multipleiterator.detachiterator) — Desanexa un iterador
- [MultipleIterator::getFlags](#multipleiterator.getflags) — Obtiene información de un flag
- [MultipleIterator::key](#multipleiterator.key) — Recupera las instancias de los iteradores registrados
- [MultipleIterator::next](#multipleiterator.next) — Desplaza hacia adelante todas las instancias de los iteradores adjuntos
- [MultipleIterator::rewind](#multipleiterator.rewind) — Reinicia todas las instancias de iteradores adjuntos
- [MultipleIterator::setFlags](#multipleiterator.setflags) — Define flags
- [MultipleIterator::valid](#multipleiterator.valid) — Verifica la validez de un subiterador

# La clase [NoRewindIterator](#class.norewinditerator)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Este iterador ignora las operaciones de reinicio.
    Esto permite procesar un iterador en varios ciclos [foreach](#control-structures.foreach) parciales.

## Sinopsis de la Clase

     class **NoRewindIterator**



     extends
      [IteratorIterator](#class.iteratoriterator)
     {

    /* Métodos */

public [\_\_construct](#norewinditerator.construct)([Iterator](#class.iterator) $iterator)

    public [current](#norewinditerator.current)(): [mixed](#language.types.mixed)

public [key](#norewinditerator.key)(): [mixed](#language.types.mixed)
public [next](#norewinditerator.next)(): [void](language.types.void.html)
public [rewind](#norewinditerator.rewind)(): [void](language.types.void.html)
public [valid](#norewinditerator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# NoRewindIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::\_\_construct — Construye un NoRewindIterator

### Descripción

public **NoRewindIterator::\_\_construct**([Iterator](#class.iterator) $iterator)

Construye un NoRewindIterator.

### Parámetros

     iterator


       El iterador a ser usado.





### Ejemplos

    **Ejemplo #1 Ejemplo de NoRewindIterator::__construct()**



     El segundo bucle no imprime nada porque el iterador solo puede usarse una vez,
     no se puede rebobinar.

&lt;?php
$fruit = array('manzana', 'banano', 'arándano');

$arr = new ArrayObject($fruit);
$it  = new NoRewindIterator($arr-&gt;getIterator());

echo "Fruit A:\n";
foreach( $it as $item ) {
echo $item . "\n";
}

echo "Fruit B:\n";
foreach( $it as $item ) {
echo $item . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Fruit A:
manzana
banano
arándano
Fruit B:

### Ver también

    - [NoRewindIterator::valid()](#norewinditerator.valid) - Valida el iterador

# NoRewindIterator::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::current — Obtener el valor actual

### Descripción

public **NoRewindIterator::current**(): [mixed](#language.types.mixed)

Obtiene el valor actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor actual.

### Ver también

    - [NoRewindIterator::key()](#norewinditerator.key) - Obtiene la clave actual

# NoRewindIterator::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::key — Obtiene la clave actual

### Descripción

public **NoRewindIterator::key**(): [mixed](#language.types.mixed)

Obtener la clave actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave actual.

### Ver también

    - [NoRewindIterator::next()](#norewinditerator.next) - Avanza al siguiente elemento

# NoRewindIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::next — Avanza al siguiente elemento

### Descripción

public **NoRewindIterator::next**(): [void](language.types.void.html)

Avanzar al siguiente elemento.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [NoRewindIterator::rewind()](#norewinditerator.rewind) - Evita la operación de rebobinado en el iterador interno

# NoRewindIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::rewind — Evita la operación de rebobinado en el iterador interno

### Descripción

public **NoRewindIterator::rewind**(): [void](language.types.void.html)

Evita la operación de rebobinado en el iterador interno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de NoRewindIterator::rewind()**



     Este ejemplo demuestra que, si se llama a rewind en un objeto NoRewindIterator no tiene ningún efecto.

&lt;?php
$fruits = array("limon", "naranja", "manzana", "pera");

$noRewindIterator = new NoRewindIterator(new ArrayIterator($fruits));

echo $noRewindIterator-&gt;current() . "\n";
$noRewindIterator-&gt;next();
// ahora rebobine el iterador (nada debería suceder)
$noRewindIterator-&gt;rewind();
echo $noRewindIterator-&gt;current() . "\n";
?&gt;

    El ejemplo anterior mostrará:

limon
naranja

# NoRewindIterator::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

NoRewindIterator::valid — Valida el iterador

### Descripción

public **NoRewindIterator::valid**(): [bool](#language.types.boolean)

Comprueba si el iterador es válido.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - **NoRewindIterator::getInnerIterator()**

## Tabla de contenidos

- [NoRewindIterator::\_\_construct](#norewinditerator.construct) — Construye un NoRewindIterator
- [NoRewindIterator::current](#norewinditerator.current) — Obtener el valor actual
- [NoRewindIterator::key](#norewinditerator.key) — Obtiene la clave actual
- [NoRewindIterator::next](#norewinditerator.next) — Avanza al siguiente elemento
- [NoRewindIterator::rewind](#norewinditerator.rewind) — Evita la operación de rebobinado en el iterador interno
- [NoRewindIterator::valid](#norewinditerator.valid) — Valida el iterador

# La clase ParentIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Esta [FilterIterator](#class.filteriterator) ampliada permite una iteración
    recursiva usando [RecursiveIteratorIterator](#class.recursiveiteratoriterator), que solamente
    muestra los elementos que tienen hijos.

## Sinopsis de la Clase

     class **ParentIterator**



     extends
      [RecursiveFilterIterator](#class.recursivefilteriterator)
     {

    /* Métodos */

public [\_\_construct](#parentiterator.construct)([RecursiveIterator](#class.recursiveiterator) $iterator)

    public [accept](#parentiterator.accept)(): [bool](#language.types.boolean)

public [getChildren](#parentiterator.getchildren)(): [ParentIterator](#class.parentiterator)
public [hasChildren](#parentiterator.haschildren)(): [bool](#language.types.boolean)
public [next](#parentiterator.next)(): [void](language.types.void.html)
public [rewind](#parentiterator.rewind)(): [void](language.types.void.html)

    /* Métodos heredados */
    public [RecursiveFilterIterator::getChildren](#recursivefilteriterator.getchildren)(): [?](#language.types.null)[RecursiveFilterIterator](#class.recursivefilteriterator)

public [RecursiveFilterIterator::hasChildren](#recursivefilteriterator.haschildren)(): [bool](#language.types.boolean)

    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# ParentIterator::accept

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::accept — Determina aceptabilidad

### Descripción

public **ParentIterator::accept**(): [bool](#language.types.boolean)

Determina si el elemento actual tiene un hijo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el elemento actual es aceptable, en caso contrario **[false](#constant.false)**.

### Ver también

    - [ParentIterator::hasChildren()](#parentiterator.haschildren) - Comprueba si los iteradores internos del elemento actual tiene un hijos

    - [FilterIterator::accept()](#filteriterator.accept) - Comprueba si el elemento actual del iterador es aceptable

# ParentIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::\_\_construct — Construye un ParentIterator

### Descripción

public **ParentIterator::\_\_construct**([RecursiveIterator](#class.recursiveiterator) $iterator)

Construye un [ParentIterator](#class.parentiterator) en un iterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El iterador a ser construido.





# ParentIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::getChildren — Devuelve los iteradores hijo contenidos en un ParentIterator

### Descripción

public **ParentIterator::getChildren**(): [ParentIterator](#class.parentiterator)

Obtiene los iteradores hijo contenidos en un ParentIterator.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [object](#language.types.object).

# ParentIterator::hasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::hasChildren — Comprueba si los iteradores internos del elemento actual tiene un hijos

### Descripción

public **ParentIterator::hasChildren**(): [bool](#language.types.boolean)

Comprueba si los iteradores internos del elemento actual tiene un hijos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ParentIterator::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::next — Mueve el iterador a la siguiente posición

### Descripción

public **ParentIterator::next**(): [void](language.types.void.html)

Mueve el iterador a la siguiente posición.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# ParentIterator::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

ParentIterator::rewind — Rebobina el iterador

### Descripción

public **ParentIterator::rewind**(): [void](language.types.void.html)

Rebobinar el iterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [ParentIterator::accept](#parentiterator.accept) — Determina aceptabilidad
- [ParentIterator::\_\_construct](#parentiterator.construct) — Construye un ParentIterator
- [ParentIterator::getChildren](#parentiterator.getchildren) — Devuelve los iteradores hijo contenidos en un ParentIterator
- [ParentIterator::hasChildren](#parentiterator.haschildren) — Comprueba si los iteradores internos del elemento actual tiene un hijos
- [ParentIterator::next](#parentiterator.next) — Mueve el iterador a la siguiente posición
- [ParentIterator::rewind](#parentiterator.rewind) — Rebobina el iterador

# La clase RecursiveArrayIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Este iterador permite destruir y modificar valores y claves mientras se iteran arrays y objetos
    de la misma manera que con [ArrayIterator](#class.arrayiterator). Adicionalmente es posible iterar la entrada
    del iterador actual.

## Sinopsis de la Clase

     class **RecursiveArrayIterator**



     extends
      [ArrayIterator](#class.arrayiterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [ArrayIterator::STD_PROP_LIST](#arrayiterator.constants.std-prop-list);

public
const
[int](#language.types.integer)
[ArrayIterator::ARRAY_AS_PROPS](#arrayiterator.constants.array-as-props);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [CHILD_ARRAYS_ONLY](#recursivearrayiterator.constants.child-arrays-only);


    /* Métodos */

public [getChildren](#recursivearrayiterator.getchildren)(): [?](#language.types.null)[RecursiveArrayIterator](#class.recursivearrayiterator)
public [hasChildren](#recursivearrayiterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [ArrayIterator::__construct](#arrayiterator.construct)([array](#language.types.array)|[object](#language.types.object) $array = [], [int](#language.types.integer) $flags = 0)

    public [ArrayIterator::append](#arrayiterator.append)([mixed](#language.types.mixed) $value): [void](language.types.void.html)

public [ArrayIterator::asort](#arrayiterator.asort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [ArrayIterator::count](#arrayiterator.count)(): [int](#language.types.integer)
public [ArrayIterator::current](#arrayiterator.current)(): [mixed](#language.types.mixed)
public [ArrayIterator::getArrayCopy](#arrayiterator.getarraycopy)(): [array](#language.types.array)
public [ArrayIterator::getFlags](#arrayiterator.getflags)(): [int](#language.types.integer)
public [ArrayIterator::key](#arrayiterator.key)(): [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)
public [ArrayIterator::ksort](#arrayiterator.ksort)([int](#language.types.integer) $flags = **[SORT_REGULAR](#constant.sort-regular)**): [true](#language.types.singleton)
public [ArrayIterator::natcasesort](#arrayiterator.natcasesort)(): [true](#language.types.singleton)
public [ArrayIterator::natsort](#arrayiterator.natsort)(): [true](#language.types.singleton)
public [ArrayIterator::next](#arrayiterator.next)(): [void](language.types.void.html)
public [ArrayIterator::offsetExists](#arrayiterator.offsetexists)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
public [ArrayIterator::offsetGet](#arrayiterator.offsetget)([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)
public [ArrayIterator::offsetSet](#arrayiterator.offsetset)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [ArrayIterator::offsetUnset](#arrayiterator.offsetunset)([mixed](#language.types.mixed) $key): [void](language.types.void.html)
public [ArrayIterator::rewind](#arrayiterator.rewind)(): [void](language.types.void.html)
public [ArrayIterator::seek](#arrayiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [ArrayIterator::serialize](#arrayiterator.serialize)(): [string](#language.types.string)
public [ArrayIterator::setFlags](#arrayiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [ArrayIterator::uasort](#arrayiterator.uasort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [ArrayIterator::uksort](#arrayiterator.uksort)([callable](#language.types.callable) $callback): [true](#language.types.singleton)
public [ArrayIterator::unserialize](#arrayiterator.unserialize)([string](#language.types.string) $data): [void](language.types.void.html)
public [ArrayIterator::valid](#arrayiterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## RecursiveArrayIterator Flags



      **[RecursiveArrayIterator::CHILD_ARRAYS_ONLY](#recursivearrayiterator.constants.child-arrays-only)**

       Trata sólo los array (no objetos) como si tuvieran hijos para la itaración recursiva.





# RecursiveArrayIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveArrayIterator::getChildren — Devuelve un iterador para la entrada actual

### Descripción

public **RecursiveArrayIterator::getChildren**(): [?](#language.types.null)[RecursiveArrayIterator](#class.recursivearrayiterator)

Devuelve un iterador para la entrada del iterador actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un iterador para la entrada actual, si es un [array](#language.types.array) o un [object](#language.types.object); o **[null](#constant.null)** si ocurre un error.

### Errores/Excepciones

Se lanzará una excepción [InvalidArgumentException](#class.invalidargumentexception)
si la entrada actual no contiene un [array](#language.types.array) o un [object](#language.types.object).

### Ejemplos

    **Ejemplo #1 Ejemplo con RecursiveArrayIterator::getChildren()**

&lt;?php
$fruits = array("a" =&gt; "lemon", "b" =&gt; "orange", array("a" =&gt; "apple", "p" =&gt; "pear"));

$iterator = new RecursiveArrayIterator($fruits);

while ($iterator-&gt;valid()) {

    if ($iterator-&gt;hasChildren()) {
        // Muestra todos los hijos
        foreach ($iterator-&gt;getChildren() as $key =&gt; $value) {
            echo $key . ' : ' . $value . "\n";
        }
    } else {
        echo "Sin hijos.\n";
    }

    $iterator-&gt;next();

}
?&gt;

    El ejemplo anterior mostrará:

Sin hijos.
Sin hijos.
a : apple
p : pear

### Ver también

    - [RecursiveArrayIterator::hasChildren()](#recursivearrayiterator.haschildren) - Devuelve si la entrada actual es un array o un objeto

# RecursiveArrayIterator::hasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveArrayIterator::hasChildren — Devuelve si la entrada actual es un array o un objeto

### Descripción

public **RecursiveArrayIterator::hasChildren**(): [bool](#language.types.boolean)

Devuelve si la entrada actual es un [array](#language.types.array) o un [object](#language.types.object)
para que un iterador puede ser obtenido a través de
[RecursiveArrayIterator::getChildren()](#recursivearrayiterator.getchildren).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la entrada actual es un [array](#language.types.array) o un [object](#language.types.object),
en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de RecursiveArrayIterator::hasChildren()**

&lt;?php
$fruits = array("a" =&gt; "limon", "b" =&gt; "naranja", array("a" =&gt; "manzana", "p" =&gt; "pera"));

$iterator = new RecursiveArrayIterator($fruits);

while ($iterator-&gt;valid()) {

    // Comprueba si hay hijos
    if ($iterator-&gt;hasChildren()) {
        // imprime todos los hijos
        foreach ($iterator-&gt;getChildren() as $key =&gt; $value) {
            echo $key . ' : ' . $value . "\n";
        }
    } else {
        echo "No hijos.\n";
    }

    $iterator-&gt;next();

}
?&gt;

    El ejemplo anterior mostrará:

No hijos.
No hijos.
a : manzana
p : pera

### Ver también

    - [RecursiveArrayIterator::getChildren()](#recursivearrayiterator.getchildren) - Devuelve un iterador para la entrada actual

## Tabla de contenidos

- [RecursiveArrayIterator::getChildren](#recursivearrayiterator.getchildren) — Devuelve un iterador para la entrada actual
- [RecursiveArrayIterator::hasChildren](#recursivearrayiterator.haschildren) — Devuelve si la entrada actual es un array o un objeto

# La clase [RecursiveCachingIterator](#class.recursivecachingiterator)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    ...

## Sinopsis de la Clase

     class **RecursiveCachingIterator**



     extends
      [CachingIterator](#class.cachingiterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [CachingIterator::CALL_TOSTRING](#cachingiterator.constants.call-tostring);

public
const
[int](#language.types.integer)
[CachingIterator::CATCH_GET_CHILD](#cachingiterator.constants.catch-get-child);
public
const
[int](#language.types.integer)
[CachingIterator::TOSTRING_USE_KEY](#cachingiterator.constants.tostring-use-key);
public
const
[int](#language.types.integer)
[CachingIterator::TOSTRING_USE_CURRENT](#cachingiterator.constants.tostring-use-current);
public
const
[int](#language.types.integer)
[CachingIterator::TOSTRING_USE_INNER](#cachingiterator.constants.tostring-use-inner);
public
const
[int](#language.types.integer)
[CachingIterator::FULL_CACHE](#cachingiterator.constants.full-cache);

    /* Métodos */

public [\_\_construct](#recursivecachingiterator.construct)([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $flags = RecursiveCachingIterator::CALL_TOSTRING)

    public [getChildren](#recursivecachingiterator.getchildren)(): [?](#language.types.null)[RecursiveCachingIterator](#class.recursivecachingiterator)

public [hasChildren](#recursivecachingiterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [CachingIterator::count](#cachingiterator.count)(): [int](#language.types.integer)

public [CachingIterator::current](#cachingiterator.current)(): [mixed](#language.types.mixed)
public [CachingIterator::getCache](#cachingiterator.getcache)(): [array](#language.types.array)
public [CachingIterator::getFlags](#cachingiterator.getflags)(): [int](#language.types.integer)
public [CachingIterator::hasNext](#cachingiterator.hasnext)(): [bool](#language.types.boolean)
public [CachingIterator::key](#cachingiterator.key)(): scalar
public [CachingIterator::next](#cachingiterator.next)(): [void](language.types.void.html)
public [CachingIterator::offsetExists](#cachingiterator.offsetexists)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [CachingIterator::offsetGet](#cachingiterator.offsetget)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [CachingIterator::offsetSet](#cachingiterator.offsetset)([string](#language.types.string) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [CachingIterator::offsetUnset](#cachingiterator.offsetunset)([string](#language.types.string) $key): [void](language.types.void.html)
public [CachingIterator::rewind](#cachingiterator.rewind)(): [void](language.types.void.html)
public [CachingIterator::setFlags](#cachingiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [CachingIterator::\_\_toString](#cachingiterator.tostring)(): [string](#language.types.string)
public [CachingIterator::valid](#cachingiterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# RecursiveCachingIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveCachingIterator::\_\_construct — Constructor

### Descripción

public **RecursiveCachingIterator::\_\_construct**([Iterator](#class.iterator) $iterator, [int](#language.types.integer) $flags = RecursiveCachingIterator::CALL_TOSTRING)

Construye un nuevo objeto [RecursiveCachingIterator](#class.recursivecachingiterator),
que posteriormente podrá ser pasado como iterador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El iterador a utilizar.






     flags


       El flag. Utilice la constante **[CALL_TOSTRING](#constant.call-tostring)** para llamar
       a **RecursiveCachingIterator::__toString()** sobre todos los elementos
       (por omisión), y/o la constante **[CATCH_GET_CHILD](#constant.catch-get-child)**
       para atrapar todas las excepciones emitidas al intentar recuperar hijos.





### Ver también

    - [CachingIterator::__construct()](#cachingiterator.construct) - Construir un nuevo objeto CachingIterator para el iterador

# RecursiveCachingIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveCachingIterator::getChildren — Devuelve el hijo del iterador interno como un CachingRecursiveIterator

### Descripción

public **RecursiveCachingIterator::getChildren**(): [?](#language.types.null)[RecursiveCachingIterator](#class.recursivecachingiterator)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El iterador interior del hijo, en forma de
[RecursiveCachingIterator](#class.recursivecachingiterator) o **[null](#constant.null)** si no hay hijos.

# RecursiveCachingIterator::hasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveCachingIterator::hasChildren — Verifica si el elemento actual del iterador interno tiene un hijo

### Descripción

public **RecursiveCachingIterator::hasChildren**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el elemento actual tiene un hijo, **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [RecursiveCachingIterator::\_\_construct](#recursivecachingiterator.construct) — Constructor
- [RecursiveCachingIterator::getChildren](#recursivecachingiterator.getchildren) — Devuelve el hijo del iterador interno como un CachingRecursiveIterator
- [RecursiveCachingIterator::hasChildren](#recursivecachingiterator.haschildren) — Verifica si el elemento actual del iterador interno tiene un hijo

# La clase RecursiveCallbackFilterIterator

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

## Sinopsis de la Clase

     class **RecursiveCallbackFilterIterator**



     extends
      [CallbackFilterIterator](#class.callbackfilteriterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Métodos */

public [\_\_construct](#recursivecallbackfilteriterator.construct)([RecursiveIterator](#class.recursiveiterator) $iterator, [callable](#language.types.callable) $callback)

    public [getChildren](#recursivecallbackfilteriterator.getchildren)(): [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator)

public [hasChildren](#recursivecallbackfilteriterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [CallbackFilterIterator::accept](#callbackfilteriterator.accept)(): [bool](#language.types.boolean)

    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Ejemplos

    La función de devolución de llamada debe aceptar hasta 3 argumentos:
    el elemento actual, la clave actual, y el iterador actual,
    respectivamente.




    **Ejemplo #1 Argumentos disponibles para la función de devolución de llamada**

&lt;?php

/\*\*

- Función de devolución de llamada para RecursiveCallbackFilterIterator
-
- @param $current El valor del elemento actual
- @param $key La clave del elemento actual
- @param $iterator Iterador a filtrar
- @return boolean TRUE para aceptar el elemento actual, FALSE en caso contrario
  \*/
  function my_callback($current, $key, $iterator) {
  // Su filtro aquí
  }

?&gt;

    El filtrado de un iterador recursivo implica generalmente 2 condiciones.
    La primera es que, para permitir la recursión, la función
    de devolución de llamada debe devolver **[true](#constant.true)** si el elemento del iterador actual
    tiene un hijo. La segunda es una condición de filtrado normal, como
    la verificación del tamaño de fichero o la verificación de la extensión
    como en el ejemplo siguiente.




    **Ejemplo #2 Ejemplo simple de una función de devolución de llamada recursiva**

&lt;?php

$dir = new RecursiveDirectoryIterator(**DIR**);

// Filtro de ficheros grandes ( &gt; 100MB)
$files = new RecursiveCallbackFilterIterator($dir, function ($current, $key, $iterator) {
    // Permite la recursión
    if ($iterator-&gt;hasChildren()) {
return TRUE;
}
// Verifica ficheros grandes
if ($current-&gt;isFile() &amp;&amp; $current-&gt;getSize() &gt; 104857600) {
return TRUE;
}
return FALSE;
});

foreach (new RecursiveIteratorIterator($files) as $file) {
echo $file-&gt;getPathname() . PHP_EOL;
}

?&gt;

# RecursiveCallbackFilterIterator::\_\_construct

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

RecursiveCallbackFilterIterator::\_\_construct — Crea un objeto RecursiveCallbackFilterIterator a partir de una interfaz RecursiveIterator

### Descripción

public **RecursiveCallbackFilterIterator::\_\_construct**([RecursiveIterator](#class.recursiveiterator) $iterator, [callable](#language.types.callable) $callback)

Crea un iterador filtrado a partir de una interfaz
[RecursiveIterator](#class.recursiveiterator) utilizando la función
de devolución de llamada callback para determinar los elementos aceptados
o rechazados.

### Parámetros

    iterator


      El iterador recursivo a filtrar.






    callback


      La función de devolución de llamada, que debe devolver **[true](#constant.true)** para aceptar
      el elemento actual, **[false](#constant.false)** en caso contrario.
      Véase también los [ejemplos](#recursivecallbackfilteriterator.examples).




      Puede ser cualquier valor de tipo
      [callable](#language.types.callable).


### Ver también

    - [Ejemplos RecursiveCallbackFilterIterator](#recursivecallbackfilteriterator.examples)

    - [RecursiveCallbackFilterIterator::getChildren()](#recursivecallbackfilteriterator.getchildren) - Devuelve el iterador hijo interno contenido en un RecursiveCallbackFilterIterator

    - [RecursiveCallbackFilteriterator::hasChildren()](#recursivecallbackfilteriterator.haschildren) - Verifica si el elemento actual del iterador interno tiene un hijo

# RecursiveCallbackFilterIterator::getChildren

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

RecursiveCallbackFilterIterator::getChildren — Devuelve el iterador hijo interno contenido en un RecursiveCallbackFilterIterator

### Descripción

public **RecursiveCallbackFilterIterator::getChildren**(): [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator)

Obtiene el hijo filtrado del iterador interno.

[RecursiveCallbackFilterIterator::hasChildren()](#recursivecallbackfilteriterator.haschildren)
debe ser utilizado para determinar si existen hijos que puedan ser recuperados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator)
que contiene el hijo.

### Ver también

    - [Ejemplos con RecursiveCallbackFilterIterator](#recursivecallbackfilteriterator.examples)

    - [RecursiveCallbackFilterIterator::__construct()](#recursivecallbackfilteriterator.construct) - Crea un objeto RecursiveCallbackFilterIterator a partir de una interfaz RecursiveIterator

    - [RecursiveCallbackFilteriterator::hasChildren()](#recursivecallbackfilteriterator.haschildren) - Verifica si el elemento actual del iterador interno tiene un hijo

# RecursiveCallbackFilterIterator::hasChildren

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

RecursiveCallbackFilterIterator::hasChildren — Verifica si el elemento actual del iterador interno tiene un hijo

### Descripción

public **RecursiveCallbackFilterIterator::hasChildren**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el elemento actual tiene un hijo, **[false](#constant.false)** en caso contrario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el elemento actual tiene hijos, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con RecursiveCallbackFilterIterator::hasChildren()**

&lt;?php

$dir = new RecursiveDirectoryIterator(**DIR**);

// Iteración recursiva sobre ficheros XML
$files = new RecursiveCallbackFilterIterator($dir, function ($current, $key, $iterator) {
    // Permite la recursión en los directorios
    if ($iterator-&gt;hasChildren()) {
return TRUE;
}
// Verifica el fichero XML
if (!strcasecmp($current-&gt;getExtension(), 'xml')) {
return TRUE;
}
return FALSE;
});

?&gt;

### Ver también

    - [Ejemplos con RecursiveCallbackFilterIterator](#recursivecallbackfilteriterator.examples)

    - [RecursiveCallbackFilterIterator::__construct()](#recursivecallbackfilteriterator.construct) - Crea un objeto RecursiveCallbackFilterIterator a partir de una interfaz RecursiveIterator

    - [RecursiveCallbackFilteriterator::getChildren()](#recursivecallbackfilteriterator.getchildren) - Devuelve el iterador hijo interno contenido en un RecursiveCallbackFilterIterator

## Tabla de contenidos

- [RecursiveCallbackFilterIterator::\_\_construct](#recursivecallbackfilteriterator.construct) — Crea un objeto RecursiveCallbackFilterIterator a partir de una interfaz RecursiveIterator
- [RecursiveCallbackFilterIterator::getChildren](#recursivecallbackfilteriterator.getchildren) — Devuelve el iterador hijo interno contenido en un RecursiveCallbackFilterIterator
- [RecursiveCallbackFilterIterator::hasChildren](#recursivecallbackfilteriterator.haschildren) — Verifica si el elemento actual del iterador interno tiene un hijo

# La clase [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **RecursiveDirectoryIterator** proporciona un medio
    para iterar recursivamente sobre directorios de un sistema de archivos.

## Sinopsis de la Clase

     class **RecursiveDirectoryIterator**



     extends
      [FilesystemIterator](#class.filesystemiterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [FilesystemIterator::CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask);

public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename);
public
const
[int](#language.types.integer)
[FilesystemIterator::NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key);
public
const
[int](#language.types.integer)
[FilesystemIterator::OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots);
public
const
[int](#language.types.integer)
[FilesystemIterator::UNIX_PATHS](#filesystemiterator.constants.unix-paths);

    /* Métodos */

public [\_\_construct](#recursivedirectoryiterator.construct)([string](#language.types.string) $directory, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO)

    public [getChildren](#recursivedirectoryiterator.getchildren)(): [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)

public [getSubPath](#recursivedirectoryiterator.getsubpath)(): [string](#language.types.string)
public [getSubPathname](#recursivedirectoryiterator.getsubpathname)(): [string](#language.types.string)
public [hasChildren](#recursivedirectoryiterator.haschildren)([bool](#language.types.boolean) $allowLinks = **[false](#constant.false)**): [bool](#language.types.boolean)
public [key](#recursivedirectoryiterator.key)(): [string](#language.types.string)
public [next](#recursivedirectoryiterator.next)(): [void](language.types.void.html)
public [rewind](#recursivedirectoryiterator.rewind)(): [void](language.types.void.html)

    /* Métodos heredados */
    public [FilesystemIterator::current](#filesystemiterator.current)(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

public [FilesystemIterator::getFlags](#filesystemiterator.getflags)(): [int](#language.types.integer)
public [FilesystemIterator::key](#filesystemiterator.key)(): [string](#language.types.string)
public [FilesystemIterator::next](#filesystemiterator.next)(): [void](language.types.void.html)
public [FilesystemIterator::rewind](#filesystemiterator.rewind)(): [void](language.types.void.html)
public [FilesystemIterator::setFlags](#filesystemiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)

    public [DirectoryIterator::current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [DirectoryIterator::getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [DirectoryIterator::getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [DirectoryIterator::getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [DirectoryIterator::isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [DirectoryIterator::key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [DirectoryIterator::next](#directoryiterator.next)(): [void](language.types.void.html)
public [DirectoryIterator::rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [DirectoryIterator::seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [DirectoryIterator::\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [DirectoryIterator::valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# RecursiveDirectoryIterator::\_\_construct

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

RecursiveDirectoryIterator::\_\_construct — Construye un objeto RecursiveDirectoryIterator

### Descripción

public **RecursiveDirectoryIterator::\_\_construct**([string](#language.types.string) $directory, [int](#language.types.integer) $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO)

Construye un objeto **RecursiveDirectoryIterator()** para el directorio deseado.

### Parámetros

     directory


       Ruta del directorio sobre el cual iterar.






     flags


       Banderas a pasar para modificar el comportamiento del iterador. Una lista
       de banderas puede encontrarse en [
       la lista de constantes de FilesystemIterator](#filesystemiterator.constants). También pueden ser
       especificadas más tarde mediante [FilesystemIterator::setFlags()](#filesystemiterator.setflags)





### Errores/Excepciones

Se lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el directorio no existe.

Se lanza una excepción [ValueError](#class.valueerror)
si directory es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora se lanza una excepción [ValueError](#class.valueerror)
        cuando directory es una cadena vacía;
        Anteriormente se lanzaba una [RuntimeException](#class.runtimeexception).





### Ejemplos

    **Ejemplo #1 Ejemplo con [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)**

&lt;?php

$directory = '/tmp';

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

$it-&gt;rewind();
while($it-&gt;valid()) {

    if (!$it-&gt;isDot()) {
        echo 'SubPathName: ' . $it-&gt;getSubPathName() . "\n";
        echo 'SubPath:     ' . $it-&gt;getSubPath() . "\n";
        echo 'Key:         ' . $it-&gt;key() . "\n\n";
    }

    $it-&gt;next();

}

?&gt;

    Resultado del ejemplo anterior es similar a:

SubPathName: fruit/apple.xml
SubPath: fruit
Key: /tmp/fruit/apple.xml

SubPathName: stuff.xml
SubPath:
Key: /tmp/stuff.xml

SubPathName: veggies/carrot.xml
SubPath: veggies
Key: /tmp/veggies/carrot.xml

### Ver también

    - [FilesystemIterator::__construct()](#filesystemiterator.construct) - Construye un objeto FilesystemIterator

    - [RecursiveIteratorIterator::__construct()](#recursiveiteratoriterator.construct) - Crea una instancia de RecursiveIteratorIterator

    - [Constantes de FilesystemIterator](#filesystemiterator.constants)

# RecursiveDirectoryIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveDirectoryIterator::getChildren — Devuelve un iterador para la entrada actual si es un directorio

### Descripción

public **RecursiveDirectoryIterator::getChildren**(): [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del fichero, información sobre el fichero
o $this según el flag utilizado.
Ver las [constantes
FilesystemIterator](#filesystemiterator.constants).

# RecursiveDirectoryIterator::getSubPath

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveDirectoryIterator::getSubPath — Obtiene el subcamino

### Descripción

public **RecursiveDirectoryIterator::getSubPath**(): [string](#language.types.string)

Devuelve el subcamino relativo al directorio especificado en el constructor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El subcamino.

### Ejemplos

    **Ejemplo #1 Ejemplo getSubPath()**








    $directory = '/tmp';

      $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

      foreach ($it as $file) {
          echo 'SubPathName: ' . $it-&gt;getSubPathName() . "\n";
          echo 'SubPath:     ' . $it-&gt;getSubPath() . "\n\n";
      }


    Resultado del ejemplo anterior es similar a:



    SubPathName: fruit/apple.xml
     SubPath:     fruit

     SubPathName: stuff.xml
     SubPath:

     SubPathName: veggies/carrot.xml
     SubPath:     veggies

### Ver también

    - [RecursiveDirectoryIterator::getSubPathName()](#recursivedirectoryiterator.getsubpathname) - Obtiene el subcamino y el nombre del fichero

    - [RecursiveDirectoryIterator::key()](#recursivedirectoryiterator.key) - Devuelve la ruta y nombre de fichero del directorio

# RecursiveDirectoryIterator::getSubPathname

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveDirectoryIterator::getSubPathname — Obtiene el subcamino y el nombre del fichero

### Descripción

public **RecursiveDirectoryIterator::getSubPathname**(): [string](#language.types.string)

Obtiene el subcamino y el nombre del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El subcamino (subdirectorio) y el nombre del fichero.

### Ejemplos

    **Ejemplo #1 Ejemplo getSubPathname()**








    $directory = '/tmp';

      $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

      foreach ($it as $file) {
          echo 'SubPathName: ' . $it-&gt;getSubPathname() . "\n";
          echo 'SubPath:     ' . $it-&gt;getSubPath() . "\n\n";
      }


    Resultado del ejemplo anterior es similar a:



    SubPathName: fruit/apple.xml
     SubPath:     fruit

     SubPathName: stuff.xml
     SubPath:

     SubPathName: veggies/carrot.xml
     SubPath:     veggies

### Ver también

    - [RecursiveDirectoryIterator::getSubPath()](#recursivedirectoryiterator.getsubpath) - Obtiene el subcamino

    - [RecursiveDirectoryIterator::key()](#recursivedirectoryiterator.key) - Devuelve la ruta y nombre de fichero del directorio

# RecursiveDirectoryIterator::hasChildren

(PHP 5, PHP 7, PHP 8)

RecursiveDirectoryIterator::hasChildren — Verifica si la entrada actual es un directorio y no es '.' o '..'

### Descripción

public **RecursiveDirectoryIterator::hasChildren**([bool](#language.types.boolean) $allowLinks = **[false](#constant.false)**): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     allowLinks








### Valores devueltos

Verifica si la entrada actual es un directorio y no es '.' o '..'.

# RecursiveDirectoryIterator::key

(PHP 5, PHP 7, PHP 8)

RecursiveDirectoryIterator::key — Devuelve la ruta y nombre de fichero del directorio

### Descripción

public **RecursiveDirectoryIterator::key**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta y nombre de fichero del directorio.

# RecursiveDirectoryIterator::next

(PHP 5, PHP 7, PHP 8)

RecursiveDirectoryIterator::next — Mover a la siguiente entrada

### Descripción

public **RecursiveDirectoryIterator::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveDirectoryIterator::rewind

(PHP 5, PHP 7, PHP 8)

RecursiveDirectoryIterator::rewind — Rebobina el directorio hasta el inicio

### Descripción

public **RecursiveDirectoryIterator::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [RecursiveDirectoryIterator::\_\_construct](#recursivedirectoryiterator.construct) — Construye un objeto RecursiveDirectoryIterator
- [RecursiveDirectoryIterator::getChildren](#recursivedirectoryiterator.getchildren) — Devuelve un iterador para la entrada actual si es un directorio
- [RecursiveDirectoryIterator::getSubPath](#recursivedirectoryiterator.getsubpath) — Obtiene el subcamino
- [RecursiveDirectoryIterator::getSubPathname](#recursivedirectoryiterator.getsubpathname) — Obtiene el subcamino y el nombre del fichero
- [RecursiveDirectoryIterator::hasChildren](#recursivedirectoryiterator.haschildren) — Verifica si la entrada actual es un directorio y no es '.' o '..'
- [RecursiveDirectoryIterator::key](#recursivedirectoryiterator.key) — Devuelve la ruta y nombre de fichero del directorio
- [RecursiveDirectoryIterator::next](#recursivedirectoryiterator.next) — Mover a la siguiente entrada
- [RecursiveDirectoryIterator::rewind](#recursivedirectoryiterator.rewind) — Rebobina el directorio hasta el inicio

# La clase RecursiveFilterIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Este iterador abstracto filtra valores no deseados de [RecursiveIterator](#class.recursiveiterator).
    Esta clase debería ampliarse para implementar filtros personalizados.
    El método **RecursiveFilterIterator::accept()** debe ser implementado en la subclase.

## Sinopsis de la Clase

     abstract
     class **RecursiveFilterIterator**



     extends
      [FilterIterator](#class.filteriterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Métodos */

public [\_\_construct](#recursivefilteriterator.construct)([RecursiveIterator](#class.recursiveiterator) $iterator)

    public [getChildren](#recursivefilteriterator.getchildren)(): [?](#language.types.null)[RecursiveFilterIterator](#class.recursivefilteriterator)

public [hasChildren](#recursivefilteriterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# RecursiveFilterIterator::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveFilterIterator::\_\_construct — Crea un RecursiveFilterIterator a partir de un RecursiveIterator

### Descripción

public **RecursiveFilterIterator::\_\_construct**([RecursiveIterator](#class.recursiveiterator) $iterator)

Crea un [RecursiveFilterIterator](#class.recursivefilteriterator) a partir de un [RecursiveIterator](#class.recursiveiterator).

### Parámetros

     iterator


       El [RecursiveIterator](#class.recursiveiterator) a ser filtrado.





### Ejemplos

    **Ejemplo #1 Ejemplo básico de RecursiveFilterIterator()**

&lt;?php
class TestsOnlyFilter extends RecursiveFilterIterator {
public function accept() {
// Aceptar el elemento actual si podemos utilizar la recursión en este
// o este valor empieza con "test"
return $this-&gt;hasChildren() || (strpos($this-&gt;current(), "test") !== FALSE);
}
}

$array    = array("test1", array("taste2", "test3", "test4"), "test5");
$iterator = new RecursiveArrayIterator($array);
$filter = new TestsOnlyFilter($iterator);

foreach(new RecursiveIteratorIterator($filter) as $key =&gt; $value)
{
echo $value . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

test1
test3
test4
test5

    **Ejemplo #2 Ejemplo de RecursiveFilterIterator()**

&lt;?php
class StartsWithFilter extends RecursiveFilterIterator {

    protected $word;

    public function __construct(RecursiveIterator $rit, $word) {
        $this-&gt;word = $word;
        parent::__construct($rit);
    }

    public function accept() {
        return $this-&gt;hasChildren() OR strpos($this-&gt;current(), $this-&gt;word) === 0;
    }

    public function getChildren() {
        return new self($this-&gt;getInnerIterator()-&gt;getChildren(), $this-&gt;word);
    }

}

$array    = array("test1", array("taste2", "test3", "test4"), "test5");
$iterator = new RecursiveArrayIterator($array);
$filter = new StartsWithFilter($iterator, "test");

foreach(new RecursiveIteratorIterator($filter) as $key =&gt; $value)
{
echo $value . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

test1
test3
test4
test5

### Ver también

    - [RecursiveFilterIterator::getChildren()](#recursivefilteriterator.getchildren) - Devuelve los hijos del iterador interno contenidos en un RecursiveFilterIterator

    - [RecursiveFilterIterator::hasChildren()](#recursivefilteriterator.haschildren) - Comprueba si el elemento actual del iterador interno tiene hijos

    - [FilterIterator::accept()](#filteriterator.accept) - Comprueba si el elemento actual del iterador es aceptable

# RecursiveFilterIterator::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveFilterIterator::getChildren — Devuelve los hijos del iterador interno contenidos en un RecursiveFilterIterator

### Descripción

public **RecursiveFilterIterator::getChildren**(): [?](#language.types.null)[RecursiveFilterIterator](#class.recursivefilteriterator)

Devuelve los hijos del iterador interno contenidos en un [RecursiveFilterIterator](#class.recursivefilteriterator).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [RecursiveFilterIterator](#class.recursivefilteriterator) que contiene los hijos del iterador interno.

### Ver también

    - [RecursiveFilterIterator::hasChildren()](#recursivefilteriterator.haschildren) - Comprueba si el elemento actual del iterador interno tiene hijos

    - [RecursiveIterator::getChildren()](#recursiveiterator.getchildren) - Obtiene el iterador de la entrada actual

# RecursiveFilterIterator::hasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveFilterIterator::hasChildren — Comprueba si el elemento actual del iterador interno tiene hijos

### Descripción

public **RecursiveFilterIterator::hasChildren**(): [bool](#language.types.boolean)

Comprueba si el elemento actual del iterador interno tiene hijos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el iterador interno tiene hijos, en caso contrario **[false](#constant.false)**;

### Ver también

    - [RecursiveFilterIterator::getChildren()](#recursivefilteriterator.getchildren) - Devuelve los hijos del iterador interno contenidos en un RecursiveFilterIterator

    - [RecursiveIterator::hasChildren()](#recursiveiterator.haschildren) - Verifica si un iterador puede ser creado desde la entrada actual

## Tabla de contenidos

- [RecursiveFilterIterator::\_\_construct](#recursivefilteriterator.construct) — Crea un RecursiveFilterIterator a partir de un RecursiveIterator
- [RecursiveFilterIterator::getChildren](#recursivefilteriterator.getchildren) — Devuelve los hijos del iterador interno contenidos en un RecursiveFilterIterator
- [RecursiveFilterIterator::hasChildren](#recursivefilteriterator.haschildren) — Comprueba si el elemento actual del iterador interno tiene hijos

# La clase RecursiveIteratorIterator

(PHP 5, PHP 7, PHP 8)

## Introducción

    Se puede usar para recorrer iteradores recursivos.

## Sinopsis de la Clase

     class **RecursiveIteratorIterator**



     implements
      [OuterIterator](#class.outeriterator) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [LEAVES_ONLY](#recursiveiteratoriterator.constants.leaves-only);

    public
     const
     [int](#language.types.integer)
      [SELF_FIRST](#recursiveiteratoriterator.constants.self-first);

    public
     const
     [int](#language.types.integer)
      [CHILD_FIRST](#recursiveiteratoriterator.constants.child-first);

    public
     const
     [int](#language.types.integer)
      [CATCH_GET_CHILD](#recursiveiteratoriterator.constants.catch-get-child);


    /* Métodos */

public [\_\_construct](#recursiveiteratoriterator.construct)([Traversable](#class.traversable) $iterator, [int](#language.types.integer) $mode = RecursiveIteratorIterator::LEAVES_ONLY, [int](#language.types.integer) $flags = 0)

    public [beginChildren](#recursiveiteratoriterator.beginchildren)(): [void](language.types.void.html)

public [beginIteration](#recursiveiteratoriterator.beginiteration)(): [void](language.types.void.html)
public [callGetChildren](#recursiveiteratoriterator.callgetchildren)(): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)
public [callHasChildren](#recursiveiteratoriterator.callhaschildren)(): [bool](#language.types.boolean)
public [current](#recursiveiteratoriterator.current)(): [mixed](#language.types.mixed)
public [endChildren](#recursiveiteratoriterator.endchildren)(): [void](language.types.void.html)
public [endIteration](#recursiveiteratoriterator.enditeration)(): [void](language.types.void.html)
public [getDepth](#recursiveiteratoriterator.getdepth)(): [int](#language.types.integer)
public [getInnerIterator](#recursiveiteratoriterator.getinneriterator)(): [RecursiveIterator](#class.recursiveiterator)
public [getMaxDepth](#recursiveiteratoriterator.getmaxdepth)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getSubIterator](#recursiveiteratoriterator.getsubiterator)([?](#language.types.null)[int](#language.types.integer) $level = **[null](#constant.null)**): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)
public [key](#recursiveiteratoriterator.key)(): [mixed](#language.types.mixed)
public [next](#recursiveiteratoriterator.next)(): [void](language.types.void.html)
public [nextElement](#recursiveiteratoriterator.nextelement)(): [void](language.types.void.html)
public [rewind](#recursiveiteratoriterator.rewind)(): [void](language.types.void.html)
public [setMaxDepth](#recursiveiteratoriterator.setmaxdepth)([int](#language.types.integer) $maxDepth = -1): [void](language.types.void.html)
public [valid](#recursiveiteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[RecursiveIteratorIterator::LEAVES_ONLY](#recursiveiteratoriterator.constants.leaves-only)**








     **[RecursiveIteratorIterator::SELF_FIRST](#recursiveiteratoriterator.constants.self-first)**








     **[RecursiveIteratorIterator::CHILD_FIRST](#recursiveiteratoriterator.constants.child-first)**








     **[RecursiveIteratorIterator::CATCH_GET_CHILD](#recursiveiteratoriterator.constants.catch-get-child)**






# RecursiveIteratorIterator::beginChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::beginChildren — Inicio del hijo

### Descripción

public **RecursiveIteratorIterator::beginChildren**(): [void](language.types.void.html)

Se llama después de llamar a **RecursiveIteratorIterator::getChildren()**,
y está asociada con [RecursiveIteratorIterator::rewind()](#recursiveiteratoriterator.rewind).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::beginIteration

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::beginIteration — Inicia una iteración

### Descripción

public **RecursiveIteratorIterator::beginIteration**(): [void](language.types.void.html)

Se invoca cuando comienza la iteración (después del primer llamado al método
[RecursiveIteratorIterator::rewind()](#recursiveiteratoriterator.rewind)).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::callGetChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::callGetChildren — Obtiene un hijo

### Descripción

public **RecursiveIteratorIterator::callGetChildren**(): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)

Obtiene el hijo del elemento actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto **RecursiveIterator()** en caso de éxito o **[null](#constant.null)** si ocurre un error.

# RecursiveIteratorIterator::callHasChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::callHasChildren — Verifica si un hijo existe

### Descripción

public **RecursiveIteratorIterator::callHasChildren**(): [bool](#language.types.boolean)

Se invoca para cada elemento para comprobar si un hijo está disponible.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si el elemento tiene un hijo.

# RecursiveIteratorIterator::\_\_construct

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

RecursiveIteratorIterator::\_\_construct — Crea una instancia de RecursiveIteratorIterator

### Descripción

public **RecursiveIteratorIterator::\_\_construct**([Traversable](#class.traversable) $iterator, [int](#language.types.integer) $mode = RecursiveIteratorIterator::LEAVES_ONLY, [int](#language.types.integer) $flags = 0)

Crea un [RecursiveIteratorIterator](#class.recursiveiteratoriterator) a partir de un [RecursiveIterator](#class.recursiveiterator).

### Parámetros

     iterator


       El iterador a partir del cual va a ser creado. Puede ser tanto un
       [RecursiveIterator](#class.recursiveiterator) o un [IteratorAggregate](#class.iteratoraggregate).






     mode


       Opcional. Los valores posibles son



        -
         **[RecursiveIteratorIterator::LEAVES_ONLY](#recursiveiteratoriterator.constants.leaves-only)**
         - El predeterminado. Lista sólo las hojas en la iteración.


        -
         **[RecursiveIteratorIterator::SELF_FIRST](#recursiveiteratoriterator.constants.self-first)**
         - Lista las hojas y los padres en la iteración con los padres primero.


        -
         **[RecursiveIteratorIterator::CHILD_FIRST](#recursiveiteratoriterator.constants.child-first)**
         - Lista las hojas y los padres en la iteración con las hojas primero.







     flags


       Opcional. Los valores posibles son **[RecursiveIteratorIterator::CATCH_GET_CHILD](#recursiveiteratoriterator.constants.catch-get-child)**
       el cual ignorará las excepciones lanzadas en llamadas a **RecursiveIteratorIterator::getChildren()**.





### Ejemplos

    **Ejemplo #1 Iterando un RecursiveIteratorIterator**

&lt;?php
$array = array(
array(
array(
array(
'leaf-0-0-0-0',
'leaf-0-0-0-1'
),
'leaf-0-0-0'
),
array(
array(
'leaf-0-1-0-0',
'leaf-0-1-0-1'
),
'leaf-0-1-0'
),
'leaf-0-0'
)
);

$iterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($array),
$mode
);
foreach ($iterator as $key =&gt; $leaf) {
    echo "$key =&gt; $leaf", PHP_EOL;
}
?&gt;

     Salida con $mode = RecursiveIteratorIterator::LEAVES_ONLY

0 =&gt; leaf-0-0-0-0
1 =&gt; leaf-0-0-0-1
0 =&gt; leaf-0-0-0
0 =&gt; leaf-0-1-0-0
1 =&gt; leaf-0-1-0-1
0 =&gt; leaf-0-1-0
0 =&gt; leaf-0-0

     Salida con $mode = RecursiveIteratorIterator::SELF_FIRST

0 =&gt; Array
0 =&gt; Array
0 =&gt; Array
0 =&gt; leaf-0-0-0-0
1 =&gt; leaf-0-0-0-1
1 =&gt; leaf-0-0-0
1 =&gt; Array
0 =&gt; Array
0 =&gt; leaf-0-1-0-0
1 =&gt; leaf-0-1-0-1
1 =&gt; leaf-0-1-0
2 =&gt; leaf-0-0

     Salida con $mode = RecursiveIteratorIterator::CHILD_FIRST

0 =&gt; leaf-0-0-0-0
1 =&gt; leaf-0-0-0-1
0 =&gt; Array
1 =&gt; leaf-0-0-0
0 =&gt; Array
0 =&gt; leaf-0-1-0-0
1 =&gt; leaf-0-1-0-1
0 =&gt; Array
1 =&gt; leaf-0-1-0
1 =&gt; Array
2 =&gt; leaf-0-0
0 =&gt; Array

# RecursiveIteratorIterator::current

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::current — Accede al valor del elemento actual

### Descripción

public **RecursiveIteratorIterator::current**(): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor del elemento actual.

# RecursiveIteratorIterator::endChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::endChildren — Finaliza un hijo

### Descripción

public **RecursiveIteratorIterator::endChildren**(): [void](language.types.void.html)

Se invoca al finalizar el bucle de un nivel.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::endIteration

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::endIteration — Termina un iterador

### Descripción

public **RecursiveIteratorIterator::endIteration**(): [void](language.types.void.html)

Se invoca cuando un iterador finaliza (cuando la función
[RecursiveIteratorIterator::valid()](#recursiveiteratoriterator.valid) devuelve **[false](#constant.false)**
por primera vez).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::getDepth

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::getDepth — Obtiene la profundidad actual de la recursividad del iterador

### Descripción

public **RecursiveIteratorIterator::getDepth**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La profundidad actual de la recursividad del iterador.

# RecursiveIteratorIterator::getInnerIterator

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::getInnerIterator — Obtiene el iterador interno

### Descripción

public **RecursiveIteratorIterator::getInnerIterator**(): [RecursiveIterator](#class.recursiveiterator)

Se obtiene el subiterador actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El subiterador actual.

# RecursiveIteratorIterator::getMaxDepth

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::getMaxDepth — Obtiene la profundidad máxima

### Descripción

public **RecursiveIteratorIterator::getMaxDepth**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene la profundidad máxima permitida.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La profundidad máxima permitida o **[false](#constant.false)** si se permite una profundidad infinita.

### Ver también

    - [RecursiveIteratorIterator::setMaxDepth()](#recursiveiteratoriterator.setmaxdepth) - Define la profundidad máxima

# RecursiveIteratorIterator::getSubIterator

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::getSubIterator — El iterador secundario activo actual

### Descripción

public **RecursiveIteratorIterator::getSubIterator**([?](#language.types.null)[int](#language.types.integer) $level = **[null](#constant.null)**): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     level








### Valores devueltos

El iterador secundario activo actual en caso de éxito o **[null](#constant.null)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        level ahora es nullable.





# RecursiveIteratorIterator::key

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::key — Accede a la clave actual

### Descripción

public **RecursiveIteratorIterator::key**(): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave actual.

# RecursiveIteratorIterator::next

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::next — Mueve el iterador a la posición siguiente

### Descripción

public **RecursiveIteratorIterator::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::nextElement

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::nextElement — Elemento siguiente

### Descripción

public **RecursiveIteratorIterator::nextElement**(): [void](language.types.void.html)

Se invoca cuando el elemento siguiente está disponible.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::rewind

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::rewind — Reemplazar el iterador al inicio

### Descripción

public **RecursiveIteratorIterator::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveIteratorIterator::setMaxDepth

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

RecursiveIteratorIterator::setMaxDepth — Define la profundidad máxima

### Descripción

public **RecursiveIteratorIterator::setMaxDepth**([int](#language.types.integer) $maxDepth = -1): [void](language.types.void.html)

Define la profundidad máxima permitida.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     maxDepth


       La profundidad máxima permitida. -1
       será utilizado para una profundidad infinita.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite una [Exception](#class.exception) si maxDepth es inferior a -1.

# RecursiveIteratorIterator::valid

(PHP 5, PHP 7, PHP 8)

RecursiveIteratorIterator::valid — Verifica si la posición actual es válida

### Descripción

public **RecursiveIteratorIterator::valid**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la posición actual es válida, **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [RecursiveIteratorIterator::beginChildren](#recursiveiteratoriterator.beginchildren) — Inicio del hijo
- [RecursiveIteratorIterator::beginIteration](#recursiveiteratoriterator.beginiteration) — Inicia una iteración
- [RecursiveIteratorIterator::callGetChildren](#recursiveiteratoriterator.callgetchildren) — Obtiene un hijo
- [RecursiveIteratorIterator::callHasChildren](#recursiveiteratoriterator.callhaschildren) — Verifica si un hijo existe
- [RecursiveIteratorIterator::\_\_construct](#recursiveiteratoriterator.construct) — Crea una instancia de RecursiveIteratorIterator
- [RecursiveIteratorIterator::current](#recursiveiteratoriterator.current) — Accede al valor del elemento actual
- [RecursiveIteratorIterator::endChildren](#recursiveiteratoriterator.endchildren) — Finaliza un hijo
- [RecursiveIteratorIterator::endIteration](#recursiveiteratoriterator.enditeration) — Termina un iterador
- [RecursiveIteratorIterator::getDepth](#recursiveiteratoriterator.getdepth) — Obtiene la profundidad actual de la recursividad del iterador
- [RecursiveIteratorIterator::getInnerIterator](#recursiveiteratoriterator.getinneriterator) — Obtiene el iterador interno
- [RecursiveIteratorIterator::getMaxDepth](#recursiveiteratoriterator.getmaxdepth) — Obtiene la profundidad máxima
- [RecursiveIteratorIterator::getSubIterator](#recursiveiteratoriterator.getsubiterator) — El iterador secundario activo actual
- [RecursiveIteratorIterator::key](#recursiveiteratoriterator.key) — Accede a la clave actual
- [RecursiveIteratorIterator::next](#recursiveiteratoriterator.next) — Mueve el iterador a la posición siguiente
- [RecursiveIteratorIterator::nextElement](#recursiveiteratoriterator.nextelement) — Elemento siguiente
- [RecursiveIteratorIterator::rewind](#recursiveiteratoriterator.rewind) — Reemplazar el iterador al inicio
- [RecursiveIteratorIterator::setMaxDepth](#recursiveiteratoriterator.setmaxdepth) — Define la profundidad máxima
- [RecursiveIteratorIterator::valid](#recursiveiteratoriterator.valid) — Verifica si la posición actual es válida

# La clase RecursiveRegexIterator

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

## Introducción

    Este iterador recursivo puede filtrar otro iterador recursivo mediante una expresión regular.

## Sinopsis de la Clase

     class **RecursiveRegexIterator**



     extends
      [RegexIterator](#class.regexiterator)



     implements
      [RecursiveIterator](#class.recursiveiterator) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [RegexIterator::USE_KEY](#regexiterator.constants.use-key);

public
const
[int](#language.types.integer)
[RegexIterator::INVERT_MATCH](#regexiterator.constants.invert-match);
public
const
[int](#language.types.integer)
[RegexIterator::MATCH](#regexiterator.constants.match);
public
const
[int](#language.types.integer)
[RegexIterator::GET_MATCH](#regexiterator.constants.get-match);
public
const
[int](#language.types.integer)
[RegexIterator::ALL_MATCHES](#regexiterator.constants.all-matches);
public
const
[int](#language.types.integer)
[RegexIterator::SPLIT](#regexiterator.constants.split);
public
const
[int](#language.types.integer)
[RegexIterator::REPLACE](#regexiterator.constants.replace);

    /* Propiedades heredadas */
    public
     ?[string](#language.types.string)
      [$replacement](#regexiterator.props.replacement) = null;


    /* Métodos */

public [\_\_construct](#recursiveregexiterator.construct)(
    [RecursiveIterator](#class.recursiveiterator) $iterator,
    [string](#language.types.string) $pattern,
    [int](#language.types.integer) $mode = RecursiveRegexIterator::MATCH,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $pregFlags = 0
)

    public [getChildren](#recursiveregexiterator.getchildren)(): [RecursiveRegexIterator](#class.recursiveregexiterator)

public [hasChildren](#recursiveregexiterator.haschildren)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [RegexIterator::accept](#regexiterator.accept)(): [bool](#language.types.boolean)

public [RegexIterator::getFlags](#regexiterator.getflags)(): [int](#language.types.integer)
public [RegexIterator::getMode](#regexiterator.getmode)(): [int](#language.types.integer)
public [RegexIterator::getPregFlags](#regexiterator.getpregflags)(): [int](#language.types.integer)
public [RegexIterator::getRegex](#regexiterator.getregex)(): [string](#language.types.string)
public [RegexIterator::setFlags](#regexiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [RegexIterator::setMode](#regexiterator.setmode)([int](#language.types.integer) $mode): [void](language.types.void.html)
public [RegexIterator::setPregFlags](#regexiterator.setpregflags)([int](#language.types.integer) $pregFlags): [void](language.types.void.html)

    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

# RecursiveRegexIterator::\_\_construct

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RecursiveRegexIterator::\_\_construct — Crea un nuevo RecursiveRegexIterator

### Descripción

public **RecursiveRegexIterator::\_\_construct**(
    [RecursiveIterator](#class.recursiveiterator) $iterator,
    [string](#language.types.string) $pattern,
    [int](#language.types.integer) $mode = RecursiveRegexIterator::MATCH,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $pregFlags = 0
)

Crea un nuevo iterador de expresión regular.

### Parámetros

     iterator


       El iterador recursivo al que se le va a aplicar el filtro regex.






     pattern


       La expresión regular a coincidir.






     mode


       Modo de operación, véase [RegexIterator::setMode()](#regexiterator.setmode) para una
       lista de todos los modos.






     flags


       Flags especiales, véase [RegexIterator::setFlags()](#regexiterator.setflags) para una lista
       de todas las flags disponibles.






     pregFlags


       Las flags de expresión regular. De estas flags depende el parámetro de modo de funcionamiento.







        <caption>**[RegexIterator](#class.regexiterator) preg_flags**</caption>



           Modo de operación
           flags disponibles






           RecursiveRegexIterator::ALL_MATCHES

            Véase [preg_match_all()](#function.preg-match-all).




           RecursiveRegexIterator::GET_MATCH

            Véase [preg_match()](#function.preg-match).




           RecursiveRegexIterator::MATCH

            Véase [preg_match()](#function.preg-match).




           RecursiveRegexIterator::REPLACE

            nada.




           RecursiveRegexIterator::SPLIT

            Véase [preg_split()](#function.preg-split).










### Ejemplos

    **Ejemplo #1 Ejemplo de RecursiveRegexIterator::__construct()**



     Crear un nuevo RegexIterator que filtre todos los string que empiezan con 'test'

&lt;?php
$rArrayIterator = new RecursiveArrayIterator(array('test1', array('tet3', 'test4', 'test5')));
$rRegexIterator = new RecursiveRegexIterator($rArrayIterator, '/^test/',
RecursiveRegexIterator::ALL_MATCHES);

foreach ($rRegexIterator as $key1 =&gt; $value1) {

    if ($rRegexIterator-&gt;hasChildren()) {

        // print all children
        echo "Hijos: ";
        foreach ($rRegexIterator-&gt;getChildren() as $key =&gt; $value) {
            echo $value . " ";
        }
        echo "\n";
    } else {
        echo "No tiene hijos\n";
    }

}
?&gt;

    Resultado del ejemplo anterior es similar a:

No tiene hijos
Hijos: test4 test5

### Ver también

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [preg_match_all()](#function.preg-match-all) - Expresión regular global

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

# RecursiveRegexIterator::getChildren

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RecursiveRegexIterator::getChildren — Devuelve un iterador para la entrada actual

### Descripción

public **RecursiveRegexIterator::getChildren**(): [RecursiveRegexIterator](#class.recursiveregexiterator)

Devuelve un iterador para la entrada actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un iterador para la entrada actual, si este puede se puede iterar sobre el iterador interno.

### Errores/Excepciones

Se lanza una [InvalidArgumentException](#class.invalidargumentexception)
si la entrada actual no contiene un valor que pueda ser iterado sobre el iterador
interno.

### Ejemplos

    **Ejemplo #1 Ejemplo de RecursiveRegexIterator::getChildren()**

&lt;?php
$rArrayIterator = new RecursiveArrayIterator(array('test1', array('tet3', 'test4', 'test5')));
$rRegexIterator = new RecursiveRegexIterator($rArrayIterator, '/^test/',
RecursiveRegexIterator::ALL_MATCHES);

foreach ($rRegexIterator as $key1 =&gt; $value1) {

    if ($rRegexIterator-&gt;hasChildren()) {

        // imprime todos los hijos
        echo "Hijos: ";
        foreach ($rRegexIterator-&gt;getChildren() as $key =&gt; $value) {
            echo $value . " ";
        }
        echo "\n";
    } else {
        echo "No tiene hijos\n";
    }

}
?&gt;

    El ejemplo anterior mostrará:

No tiene hijos
Hijos: test4 test5

### Ver también

    - [RecursiveRegexIterator::hasChildren()](#recursiveregexiterator.haschildren) - Retorna si un iterador puede ser obtenido de la entrada actual

# RecursiveRegexIterator::hasChildren

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RecursiveRegexIterator::hasChildren — Retorna si un iterador puede ser obtenido de la entrada actual

### Descripción

public **RecursiveRegexIterator::hasChildren**(): [bool](#language.types.boolean)

Retorna si un iterador puede ser obtenido de la entrada actual. Este iterador
puede ser obtenido mediante [RecursiveRegexIterator::getChildren()](#recursiveregexiterator.getchildren).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si un iterador puede ser obtenido de la entrada actual, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de RecursiveRegexIterator::hasChildren()**

&lt;?php
$rArrayIterator = new RecursiveArrayIterator(array('test1', array('tet3', 'test4', 'test5')));
$rRegexIterator = new RecursiveRegexIterator($rArrayIterator, '/^test/',
RecursiveRegexIterator::ALL_MATCHES);

foreach ($rRegexIterator as $value) {
    var_dump($rRegexIterator-&gt;hasChildren());
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [RecursiveRegexIterator::getChildren()](#recursiveregexiterator.getchildren) - Devuelve un iterador para la entrada actual

## Tabla de contenidos

- [RecursiveRegexIterator::\_\_construct](#recursiveregexiterator.construct) — Crea un nuevo RecursiveRegexIterator
- [RecursiveRegexIterator::getChildren](#recursiveregexiterator.getchildren) — Devuelve un iterador para la entrada actual
- [RecursiveRegexIterator::hasChildren](#recursiveregexiterator.haschildren) — Retorna si un iterador puede ser obtenido de la entrada actual

# La clase RecursiveTreeIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Permite recorrer un [RecursiveIterator](#class.recursiveiterator) para generar un árbol gráfico ASCII.

## Sinopsis de la Clase

     class **RecursiveTreeIterator**



     extends
      [RecursiveIteratorIterator](#class.recursiveiteratoriterator)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [RecursiveIteratorIterator::LEAVES_ONLY](#recursiveiteratoriterator.constants.leaves-only);

public
const
[int](#language.types.integer)
[RecursiveIteratorIterator::SELF_FIRST](#recursiveiteratoriterator.constants.self-first);
public
const
[int](#language.types.integer)
[RecursiveIteratorIterator::CHILD_FIRST](#recursiveiteratoriterator.constants.child-first);
public
const
[int](#language.types.integer)
[RecursiveIteratorIterator::CATCH_GET_CHILD](#recursiveiteratoriterator.constants.catch-get-child);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [BYPASS_CURRENT](#recursivetreeiterator.constants.bypass-current);

    public
     const
     [int](#language.types.integer)
      [BYPASS_KEY](#recursivetreeiterator.constants.bypass-key);

    public
     const
     [int](#language.types.integer)
      [PREFIX_LEFT](#recursivetreeiterator.constants.prefix-left);

    public
     const
     [int](#language.types.integer)
      [PREFIX_MID_HAS_NEXT](#recursivetreeiterator.constants.prefix-mid-has-next) = 1;

    public
     const
     [int](#language.types.integer)
      [PREFIX_MID_LAST](#recursivetreeiterator.constants.prefix-mid-last) = 2;

    public
     const
     [int](#language.types.integer)
      [PREFIX_END_HAS_NEXT](#recursivetreeiterator.constants.prefix-end-has-next) = 3;

    public
     const
     [int](#language.types.integer)
      [PREFIX_END_LAST](#recursivetreeiterator.constants.prefix-end-last) = 4;

    public
     const
     [int](#language.types.integer)
      [PREFIX_RIGHT](#recursivetreeiterator.constants.prefix-right) = 5;


    /* Métodos */

public [\_\_construct](#recursivetreeiterator.construct)(
    [RecursiveIterator](#class.recursiveiterator)|[IteratorAggregate](#class.iteratoraggregate) $iterator,
    [int](#language.types.integer) $flags = RecursiveTreeIterator::BYPASS_KEY,
    [int](#language.types.integer) $cachingIteratorFlags = CachingIterator::CATCH_GET_CHILD,
    [int](#language.types.integer) $mode = RecursiveTreeIterator::SELF_FIRST
)

    public [beginChildren](#recursivetreeiterator.beginchildren)(): [void](language.types.void.html)

public [beginIteration](#recursivetreeiterator.beginiteration)(): [RecursiveIterator](#class.recursiveiterator)
public [callGetChildren](#recursivetreeiterator.callgetchildren)(): [RecursiveIterator](#class.recursiveiterator)
public [callHasChildren](#recursivetreeiterator.callhaschildren)(): [bool](#language.types.boolean)
public [current](#recursivetreeiterator.current)(): [mixed](#language.types.mixed)
public [endChildren](#recursivetreeiterator.endchildren)(): [void](language.types.void.html)
public [endIteration](#recursivetreeiterator.enditeration)(): [void](language.types.void.html)
public [getEntry](#recursivetreeiterator.getentry)(): [string](#language.types.string)
public [getPostfix](#recursivetreeiterator.getpostfix)(): [string](#language.types.string)
public [getPrefix](#recursivetreeiterator.getprefix)(): [string](#language.types.string)
public [key](#recursivetreeiterator.key)(): [mixed](#language.types.mixed)
public [next](#recursivetreeiterator.next)(): [void](language.types.void.html)
public [nextElement](#recursivetreeiterator.nextelement)(): [void](language.types.void.html)
public [rewind](#recursivetreeiterator.rewind)(): [void](language.types.void.html)
public [setPostfix](#recursivetreeiterator.setpostfix)([string](#language.types.string) $postfix): [void](language.types.void.html)
public [setPrefixPart](#recursivetreeiterator.setprefixpart)([int](#language.types.integer) $part, [string](#language.types.string) $value): [void](language.types.void.html)
public [valid](#recursivetreeiterator.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [RecursiveIteratorIterator::beginChildren](#recursiveiteratoriterator.beginchildren)(): [void](language.types.void.html)

public [RecursiveIteratorIterator::beginIteration](#recursiveiteratoriterator.beginiteration)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::callGetChildren](#recursiveiteratoriterator.callgetchildren)(): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)
public [RecursiveIteratorIterator::callHasChildren](#recursiveiteratoriterator.callhaschildren)(): [bool](#language.types.boolean)
public [RecursiveIteratorIterator::current](#recursiveiteratoriterator.current)(): [mixed](#language.types.mixed)
public [RecursiveIteratorIterator::endChildren](#recursiveiteratoriterator.endchildren)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::endIteration](#recursiveiteratoriterator.enditeration)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::getDepth](#recursiveiteratoriterator.getdepth)(): [int](#language.types.integer)
public [RecursiveIteratorIterator::getInnerIterator](#recursiveiteratoriterator.getinneriterator)(): [RecursiveIterator](#class.recursiveiterator)
public [RecursiveIteratorIterator::getMaxDepth](#recursiveiteratoriterator.getmaxdepth)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [RecursiveIteratorIterator::getSubIterator](#recursiveiteratoriterator.getsubiterator)([?](#language.types.null)[int](#language.types.integer) $level = **[null](#constant.null)**): [?](#language.types.null)[RecursiveIterator](#class.recursiveiterator)
public [RecursiveIteratorIterator::key](#recursiveiteratoriterator.key)(): [mixed](#language.types.mixed)
public [RecursiveIteratorIterator::next](#recursiveiteratoriterator.next)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::nextElement](#recursiveiteratoriterator.nextelement)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::rewind](#recursiveiteratoriterator.rewind)(): [void](language.types.void.html)
public [RecursiveIteratorIterator::setMaxDepth](#recursiveiteratoriterator.setmaxdepth)([int](#language.types.integer) $maxDepth = -1): [void](language.types.void.html)
public [RecursiveIteratorIterator::valid](#recursiveiteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[RecursiveTreeIterator::BYPASS_CURRENT](#recursivetreeiterator.constants.bypass-current)**








     **[RecursiveTreeIterator::BYPASS_KEY](#recursivetreeiterator.constants.bypass-key)**








     **[RecursiveTreeIterator::PREFIX_LEFT](#recursivetreeiterator.constants.prefix-left)**








     **[RecursiveTreeIterator::PREFIX_MID_HAS_NEXT](#recursivetreeiterator.constants.prefix-mid-has-next)**








     **[RecursiveTreeIterator::PREFIX_MID_LAST](#recursivetreeiterator.constants.prefix-mid-last)**








     **[RecursiveTreeIterator::PREFIX_END_HAS_NEXT](#recursivetreeiterator.constants.prefix-end-has-next)**








     **[RecursiveTreeIterator::PREFIX_END_LAST](#recursivetreeiterator.constants.prefix-end-last)**








     **[RecursiveTreeIterator::PREFIX_RIGHT](#recursivetreeiterator.constants.prefix-right)**






# RecursiveTreeIterator::beginChildren

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::beginChildren — Inicio de los hijos

### Descripción

public **RecursiveTreeIterator::beginChildren**(): [void](language.types.void.html)

Se le llama cuando recursiva está en un nivel inferior.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::beginIteration

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::beginIteration — Inicio de la iteración

### Descripción

public **RecursiveTreeIterator::beginIteration**(): [RecursiveIterator](#class.recursiveiterator)

Se llama cuando comienza la iteración (después de llamar a [RecursiveTreeIterator::rewind()](#recursivetreeiterator.rewind)).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [RecursiveIterator](#class.recursiveiterator).

# RecursiveTreeIterator::callGetChildren

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::callGetChildren — Obtener los hijos

### Descripción

public **RecursiveTreeIterator::callGetChildren**(): [RecursiveIterator](#class.recursiveiterator)

Obtiene los hijos del elemento actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [RecursiveIterator](#class.recursiveiterator).

# RecursiveTreeIterator::callHasChildren

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::callHasChildren — Comprobar si tiene hijos

### Descripción

public **RecursiveTreeIterator::callHasChildren**(): [bool](#language.types.boolean)

Se llama para cada elemento para comprobar si tiene hijos o no.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si tiene hijos, en caso contrario **[false](#constant.false)**.

# RecursiveTreeIterator::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::\_\_construct — Construye un nuevo RecursiveTreeIterator

### Descripción

public **RecursiveTreeIterator::\_\_construct**(
    [RecursiveIterator](#class.recursiveiterator)|[IteratorAggregate](#class.iteratoraggregate) $iterator,
    [int](#language.types.integer) $flags = RecursiveTreeIterator::BYPASS_KEY,
    [int](#language.types.integer) $cachingIteratorFlags = CachingIterator::CATCH_GET_CHILD,
    [int](#language.types.integer) $mode = RecursiveTreeIterator::SELF_FIRST
)

Construye un nuevo [RecursiveTreeIterator](#class.recursivetreeiterator) desde un iterador recursivo suministrado.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     iterator


       El [RecursiveIterator](#class.recursiveiterator) o [IteratorAggregate](#class.iteratoraggregate) a iterar.






     flags


       Se pueden proporcionar flags que afectarán el comportamiento de algunos métodos.
       Una lista de flags puede verse en [Constantes predefinidas RecursiveTreeIterator](#recursivetreeiterator.constants).






     caching_it_flags


       Flags que afectan el comportamiento interno de [RecursiveCachingIterator](#class.recursivecachingiterator).






     mode


       Flags que afectan el comportamiento interno de [RecursiveIteratorIterator](#class.recursiveiteratoriterator).





# RecursiveTreeIterator::current

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::current — Obtener el elemento actual

### Descripción

public **RecursiveTreeIterator::current**(): [mixed](#language.types.mixed)

Obtiene el elemento actual prefijo y postfijo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el elemento actual prefijo y postfijo.

# RecursiveTreeIterator::endChildren

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::endChildren — Final de los hijos

### Descripción

public **RecursiveTreeIterator::endChildren**(): [void](language.types.void.html)

Se llama cuando se llega recursivamente al final de un nivel.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::endIteration

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::endIteration — Fin de la iteración

### Descripción

public **RecursiveTreeIterator::endIteration**(): [void](language.types.void.html)

Se llama cuando la iteración termina (o cuando [RecursiveTreeIterator::valid()](#recursivetreeiterator.valid)
retorne **[false](#constant.false)**)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::getEntry

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::getEntry — obtener la entrada actual

### Descripción

public **RecursiveTreeIterator::getEntry**(): [string](#language.types.string)

Obtiene la parte de el árbol de el elemento actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la parte de el árbol de el elemento actual.

# RecursiveTreeIterator::getPostfix

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::getPostfix — Obtiener el postfijo

### Descripción

public **RecursiveTreeIterator::getPostfix**(): [string](#language.types.string)

Obtiene el string a colocar después del elemento actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el string a colocar después del elemento actual.

# RecursiveTreeIterator::getPrefix

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::getPrefix — Obtener el prefijo

### Descripción

public **RecursiveTreeIterator::getPrefix**(): [string](#language.types.string)

Obtiene el string a colocar antes del elemento actual.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el string a colocar antes del elemento actual.

# RecursiveTreeIterator::key

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::key — Obtiene la clave del elemento actual

### Descripción

public **RecursiveTreeIterator::key**(): [mixed](#language.types.mixed)

Obtiene la clave con prefiro y postfijo.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la clave actual con prefijo y postfijo.

# RecursiveTreeIterator::next

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::next — Mover al siguiente elemento

### Descripción

public **RecursiveTreeIterator::next**(): [void](language.types.void.html)

Mover la posición al siguiente elemento.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::nextElement

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::nextElement — Comprueba si hay un siguiente elemento

### Descripción

public **RecursiveTreeIterator::nextElement**(): [void](language.types.void.html)

Se llama cuando hay un siguiente elemento disponible.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::rewind

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::rewind — Rebobina el iterador

### Descripción

public **RecursiveTreeIterator::rewind**(): [void](language.types.void.html)

Rebobina el iterador hasta el primer elemento de el iterador interno superior.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::setPostfix

(PHP 5 &gt;= 5.5.3, PHP 7, PHP 8)

RecursiveTreeIterator::setPostfix — Establece el sufijo

### Descripción

public **RecursiveTreeIterator::setPostfix**([string](#language.types.string) $postfix): [void](language.types.void.html)

Establece el sufijo tal como se utiliza en [RecursiveTreeIterator::getPostfix()](#recursivetreeiterator.getpostfix).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     postfix








### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::setPrefixPart

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::setPrefixPart — Establece la parte de el prefijo

### Descripción

public **RecursiveTreeIterator::setPrefixPart**([int](#language.types.integer) $part, [string](#language.types.string) $value): [void](language.types.void.html)

Establece la parte del prefijo usada en el árbol gráfico.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     part


       Una de las constantes [RecursiveTreeIterator::PREFIX_*](#recursivetreeiterator.constants).






     value


       El valor a ser asignado a la parte del prefijo especificado en part.





### Valores devueltos

No se retorna ningún valor.

# RecursiveTreeIterator::valid

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

RecursiveTreeIterator::valid — Comprueba la validez

### Descripción

public **RecursiveTreeIterator::valid**(): [bool](#language.types.boolean)

Comprueba si la posición actual es válida.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la posición actual es válida, en caso contrario **[false](#constant.false)**

## Tabla de contenidos

- [RecursiveTreeIterator::beginChildren](#recursivetreeiterator.beginchildren) — Inicio de los hijos
- [RecursiveTreeIterator::beginIteration](#recursivetreeiterator.beginiteration) — Inicio de la iteración
- [RecursiveTreeIterator::callGetChildren](#recursivetreeiterator.callgetchildren) — Obtener los hijos
- [RecursiveTreeIterator::callHasChildren](#recursivetreeiterator.callhaschildren) — Comprobar si tiene hijos
- [RecursiveTreeIterator::\_\_construct](#recursivetreeiterator.construct) — Construye un nuevo RecursiveTreeIterator
- [RecursiveTreeIterator::current](#recursivetreeiterator.current) — Obtener el elemento actual
- [RecursiveTreeIterator::endChildren](#recursivetreeiterator.endchildren) — Final de los hijos
- [RecursiveTreeIterator::endIteration](#recursivetreeiterator.enditeration) — Fin de la iteración
- [RecursiveTreeIterator::getEntry](#recursivetreeiterator.getentry) — obtener la entrada actual
- [RecursiveTreeIterator::getPostfix](#recursivetreeiterator.getpostfix) — Obtiener el postfijo
- [RecursiveTreeIterator::getPrefix](#recursivetreeiterator.getprefix) — Obtener el prefijo
- [RecursiveTreeIterator::key](#recursivetreeiterator.key) — Obtiene la clave del elemento actual
- [RecursiveTreeIterator::next](#recursivetreeiterator.next) — Mover al siguiente elemento
- [RecursiveTreeIterator::nextElement](#recursivetreeiterator.nextelement) — Comprueba si hay un siguiente elemento
- [RecursiveTreeIterator::rewind](#recursivetreeiterator.rewind) — Rebobina el iterador
- [RecursiveTreeIterator::setPostfix](#recursivetreeiterator.setpostfix) — Establece el sufijo
- [RecursiveTreeIterator::setPrefixPart](#recursivetreeiterator.setprefixpart) — Establece la parte de el prefijo
- [RecursiveTreeIterator::valid](#recursivetreeiterator.valid) — Comprueba la validez

# La clase RegexIterator

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

## Introducción

    Este iterador puede ser usado para filtrar otro iterador basado en una expresión regular.

## Sinopsis de la Clase

     class **RegexIterator**



     extends
      [FilterIterator](#class.filteriterator)
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [USE_KEY](#regexiterator.constants.use-key);

    public
     const
     [int](#language.types.integer)
      [INVERT_MATCH](#regexiterator.constants.invert-match);

    public
     const
     [int](#language.types.integer)
      [MATCH](#regexiterator.constants.match);

    public
     const
     [int](#language.types.integer)
      [GET_MATCH](#regexiterator.constants.get-match);

    public
     const
     [int](#language.types.integer)
      [ALL_MATCHES](#regexiterator.constants.all-matches);

    public
     const
     [int](#language.types.integer)
      [SPLIT](#regexiterator.constants.split);

    public
     const
     [int](#language.types.integer)
      [REPLACE](#regexiterator.constants.replace);


    /* Propiedades */
    public
     ?[string](#language.types.string)
      [$replacement](#regexiterator.props.replacement) = null;


    /* Métodos */

public [\_\_construct](#regexiterator.construct)(
    [Iterator](#class.iterator) $iterator,
    [string](#language.types.string) $pattern,
    [int](#language.types.integer) $mode = RegexIterator::MATCH,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $pregFlags = 0
)

    public [accept](#regexiterator.accept)(): [bool](#language.types.boolean)

public [getFlags](#regexiterator.getflags)(): [int](#language.types.integer)
public [getMode](#regexiterator.getmode)(): [int](#language.types.integer)
public [getPregFlags](#regexiterator.getpregflags)(): [int](#language.types.integer)
public [getRegex](#regexiterator.getregex)(): [string](#language.types.string)
public [setFlags](#regexiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [setMode](#regexiterator.setmode)([int](#language.types.integer) $mode): [void](language.types.void.html)
public [setPregFlags](#regexiterator.setpregflags)([int](#language.types.integer) $pregFlags): [void](language.types.void.html)

    /* Métodos heredados */
    public [FilterIterator::accept](#filteriterator.accept)(): [bool](#language.types.boolean)

public [FilterIterator::current](#filteriterator.current)(): [mixed](#language.types.mixed)
public [FilterIterator::key](#filteriterator.key)(): [mixed](#language.types.mixed)
public [FilterIterator::next](#filteriterator.next)(): [void](language.types.void.html)
public [FilterIterator::rewind](#filteriterator.rewind)(): [void](language.types.void.html)
public [FilterIterator::valid](#filteriterator.valid)(): [bool](#language.types.boolean)

    public [IteratorIterator::current](#iteratoriterator.current)(): [mixed](#language.types.mixed)

public [IteratorIterator::getInnerIterator](#iteratoriterator.getinneriterator)(): [?](#language.types.null)[Iterator](#class.iterator)
public [IteratorIterator::key](#iteratoriterator.key)(): [mixed](#language.types.mixed)
public [IteratorIterator::next](#iteratoriterator.next)(): [void](language.types.void.html)
public [IteratorIterator::rewind](#iteratoriterator.rewind)(): [void](language.types.void.html)
public [IteratorIterator::valid](#iteratoriterator.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

    ## Modos de operación RegexIterator




      **[RegexIterator::ALL_MATCHES](#regexiterator.constants.all-matches)**


        Devuelve todas las coincidencias de la entrada actual.
        (véase [preg_match_all()](#function.preg-match-all)).







      **[RegexIterator::GET_MATCH](#regexiterator.constants.get-match)**


        Devuelve la primera coincidencia de la entrada actual.
        (véase [preg_match()](#function.preg-match)).







      **[RegexIterator::MATCH](#regexiterator.constants.match)**


        Sólo ejecuta la coincidencia (filtro) para la entrada actual
        (véase [preg_match()](#function.preg-match)).







      **[RegexIterator::REPLACE](#regexiterator.constants.replace)**


        Reemplaza la entrada actual
        (véase [preg_replace()](#function.preg-replace); No está completamente implementado)







      **[RegexIterator::SPLIT](#regexiterator.constants.split)**


        Returns the split values for the current entry (see [preg_split()](#function.preg-split)).








    ## Flags RegexIterator



      **[RegexIterator::USE_KEY](#regexiterator.constants.use-key)**


        Flag especial: Coincidir con la clave de entrada en lugar del valor de la entrada.







      **[RegexIterator::INVERT_MATCH](#regexiterator.constants.invert-match)**


        Inverts the return value of [RegexIterator::accept()](#regexiterator.accept).






## Propiedades

      replacement







# RegexIterator::accept

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::accept — Obtener el estado de aceptación

### Descripción

public **RegexIterator::accept**(): [bool](#language.types.boolean)

Coincidir (string) **RegexIterator::current()**
(o **RegexIterator::key()** si la flag
[RegexIterator::USE_KEY](#regexiterator.constants.use-key) está establecida)
con la expresión regular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si coincide, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 RegexIterator::accept()** example



     Este ejemplo muestra sólo los elementos aceptados que coinciden con la expresión regular.

&lt;?php
$names = new ArrayIterator(array('Ann', 'Bob', 'Charlie', 'David'));
$filter = new RegexIterator($names, '/^[B-D]/');
foreach ($filter as $name) {
echo $name . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Bob
Charlie
David

### Ver también

    - [RegexIterator constants](#regexiterator.constants)

    - [RegexIterator::setFlags()](#regexiterator.setflags) - Establece las flags

# RegexIterator::\_\_construct

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::\_\_construct — Crea un nuevo RegexIterator

### Descripción

public **RegexIterator::\_\_construct**(
    [Iterator](#class.iterator) $iterator,
    [string](#language.types.string) $pattern,
    [int](#language.types.integer) $mode = RegexIterator::MATCH,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $pregFlags = 0
)

Crea un nuevo [RegexIterator](#class.regexiterator) que filtra un
[Iterator](#class.iterator) usando una expresión regular.

### Parámetros

     iterator


       El iterador al que se le va a aplicar el filtro regex.






     pattern


       la expresión regular a coincidir.






     mode


       Modo de operación, véase [RegexIterator::setMode()](#regexiterator.setmode) para una lista
       de todos los modos.






     flags


       Flags especiales, véase [RegexIterator::setFlags()](#regexiterator.setflags) para una lista
       de todas las flags disponibles.






     pregFlags


       Las flags de expresión regular. Estas flags dependen de el parámetro de modo de operación.







        <caption>**[RegexIterator](#class.regexiterator) preg_flags**</caption>



           operation mode
           available flags






           RegexIterator::ALL_MATCHES

            Véase [preg_match_all()](#function.preg-match-all).




           RegexIterator::GET_MATCH

            Véase [preg_match()](#function.preg-match).




           RegexIterator::MATCH

            Véase [preg_match()](#function.preg-match).




           RegexIterator::REPLACE

            Nada.




           RegexIterator::SPLIT

            Véase [preg_split()](#function.preg-split).










### Errores/Excepciones

Lanza una [InvalidArgumentException](#class.invalidargumentexception) si el argumento pattern es inválido.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::__construct()**



     Crea un nuevo RegexIterator que filtra todos los string que empiezan con 'test'.

&lt;?php
$arrayIterator = new ArrayIterator(array('test 1', 'another test', 'test 123'));
$regexIterator = new RegexIterator($arrayIterator, '/^test/');

foreach ($regexIterator as $value) {
echo $value . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

test 1
test 123

### Ver también

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [preg_match_all()](#function.preg-match-all) - Expresión regular global

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

# RegexIterator::getFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::getFlags — Obtener flags

### Descripción

public **RegexIterator::getFlags**(): [int](#language.types.integer)

Devuelve las flags, véase [RegexIterator::setFlags()](#regexiterator.setflags)
para una lista de todas las flags disponibles.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las flags establecidas.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::getFlags()**

&lt;?php

$test = array ('str1' =&gt; 'test 1', 'teststr2' =&gt; 'another test', 'str3' =&gt; 'test 123');

$arrayIterator = new ArrayIterator($test);
$regexIterator = new RegexIterator($arrayIterator, '/^test/');
$regexIterator-&gt;setFlags(RegexIterator::USE_KEY);

if ($regexIterator-&gt;getFlags() &amp; RegexIterator::USE_KEY) {
echo 'Filtrado basado en las claves del array.';
} else {
echo 'Filtrado basado en los valores del array.';
}
?&gt;

    El ejemplo anterior mostrará:

Filtrado basado en las claves del array.

### Ver también

    - [RegexIterator::setFlags()](#regexiterator.setflags) - Establece las flags

# RegexIterator::getMode

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::getMode — Devuelve el modo de operación

### Descripción

public **RegexIterator::getMode**(): [int](#language.types.integer)

Devuelve el modo de operación, véase [RegexIterator::setMode()](#regexiterator.setmode)
para una lista de todos los modos de operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los modos de operación.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::getMode()**

&lt;?php

$test = array ('str1' =&gt; 'test 1', 'teststr2' =&gt; 'otro test', 'str3' =&gt; 'test 123');

$arrayIterator = new ArrayIterator($test);
$regexIterator = new RegexIterator($arrayIterator, '/^[a-z]+/', RegexIterator::GET_MATCH);

$mode = $regexIterator-&gt;getMode();
if ($mode &amp; RegexIterator::GET_MATCH) {
echo 'Obteniendo la coincidencia para cada elemento.';
} elseif ($mode &amp; RegexIterator::ALL_MATCHES) {
    echo 'Obteniendo las coincidencias para cada elemento.';
} elseif ($mode &amp; RegexIterator::MATCH) {
echo 'Obteniendo cada elemento si este coincide.';
} elseif ($mode &amp; RegexIterator::SPLIT) {
echo 'Obteniendo las piezas de cada elemento.';
}
?&gt;

    El ejemplo anterior mostrará:

Obteniendo la coincidencia para cada elemento.

### Ver también

    - [RegexIterator::setMode()](#regexiterator.setmode) - Establece el modo de operación

# RegexIterator::getPregFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::getPregFlags — Devuelve las flags de expresión regular

### Descripción

public **RegexIterator::getPregFlags**(): [int](#language.types.integer)

Devuelve las flags de expresión regular, véase [RegexIterator::\_\_construct()](#regexiterator.construct)
para una lista de todas las flags.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un bitmask de las flags de expresión regular.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::getPregFlags()**

&lt;?php

$test = array ('str1' =&gt; 'test 1', 'teststr2' =&gt; 'otro test', 'str3' =&gt; 'test 123');

$arrayIterator = new ArrayIterator($test);
$regexIterator = new RegexIterator($arrayIterator, '/\s/', RegexIterator::SPLIT);
$regexIterator-&gt;setPregFlags(PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE);

if ($regexIterator-&gt;getPregFlags() &amp; PREG_SPLIT_NO_EMPTY) {
echo 'Ignorando las piezas vacías';
} else {
echo 'No ignora piezas vacías';
}

?&gt;

    El ejemplo anterior mostrará:

Ignorando las piezas vacías

### Ver también

    - [RegexIterator::setPregFlags()](#regexiterator.setpregflags) - Define los flags de la expresión regular

# RegexIterator::getRegex

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

RegexIterator::getRegex — Devuelve la expresión regular actual

### Descripción

public **RegexIterator::getRegex**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# RegexIterator::setFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::setFlags — Establece las flags

### Descripción

public **RegexIterator::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Establece las flags.

### Parámetros

     flags


       Las flags a ser establecidas,
       The flags to set, un bitmask de constantes de la clase.




       Las flags disponibles se enumeran a continuación. El verdadero
       significado de estas flags se describe en las
       [Constantes predefinidas](#regexiterator.constants).



        <caption>**Flags [RegexIterator](#class.regexiterator)**</caption>



           value
           constant






           1

            [RegexIterator::USE_KEY](#regexiterator.constants.use-key)










### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::setFlags()**



     Crear un nuevo RegexIterator que filtre todas las entradas que empiecen con la palabra clave 'test'.

&lt;?php
$test = array ('str1' =&gt; 'test 1', 'teststr2' =&gt; 'otro test', 'str3' =&gt; 'test 123');

$arrayIterator = new ArrayIterator($test);
$regexIterator = new RegexIterator($arrayIterator, '/^test/');
$regexIterator-&gt;setFlags(RegexIterator::USE_KEY);

foreach ($regexIterator as $clave =&gt; $valor) {
echo $clave . ' =&gt; ' . $valor . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

teststr2 =&gt; otro test

### Ver también

    - [RegexIterator::getFlags()](#regexiterator.getflags) - Obtener flags

# RegexIterator::setMode

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::setMode — Establece el modo de operación

### Descripción

public **RegexIterator::setMode**([int](#language.types.integer) $mode): [void](language.types.void.html)

Establecer el modo de operación.

### Parámetros

     mode


       El modo de operación.




       Los modos disponibles se enumeran a continuación. El verdadero
       significado de estos modos se describe en las
       [constantes predefinidas](#regexiterator.constants).



        <caption>**Modos [RegexIterator](#class.regexiterator)**</caption>



           value
           constant






           0

            [RegexIterator::MATCH](#regexiterator.constants.match)




           1

            [RegexIterator::GET_MATCH](#regexiterator.constants.get-match)




           2

            [RegexIterator::ALL_MATCHES](#regexiterator.constants.all-matches)




           3

            [RegexIterator::SPLIT](#regexiterator.constants.split)




           4

            [RegexIterator::REPLACE](#regexiterator.constants.replace)










### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de RegexIterator::setMode()**

&lt;?php
$test = array ('str1' =&gt; 'test 1', 'test str2' =&gt; 'otro test', 'str3' =&gt; 'test 123');

$arrayIterator = new ArrayIterator($test);
// Filtra todo lo que empiece con 'test ' seguido por uno o más números.
$regexIterator = new RegexIterator($arrayIterator, '/^test (\d+)/');
// Modo de operación: Reemplaza el valor actual con las coincidencias
$regexIterator-&gt;setMode(RegexIterator::GET_MATCH);

foreach ($regexIterator as $clave =&gt; $valor) {
// imprime el o los números que coincidan
echo $key . ' =&gt; ' . $value[1] . PHP_EOL;
}
?&gt;

    Resultado del ejemplo anterior es similar a:

str1 =&gt; 1
str3 =&gt; 123

### Ver también

    - [RegexIterator::getMode()](#regexiterator.getmode) - Devuelve el modo de operación

# RegexIterator::setPregFlags

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

RegexIterator::setPregFlags — Define los flags de la expresión regular

### Descripción

public **RegexIterator::setPregFlags**([int](#language.types.integer) $pregFlags): [void](language.types.void.html)

Define los flags de la expresión regular.

### Parámetros

     pregFlags


       Los flags de la expresión regular. Ver el método
       [RegexIterator::__construct()](#regexiterator.construct) para una lista de
       todos los flags disponibles.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con RegexIterator::setPregFlags()**



     Crea un nuevo objeto RegexIterator que filtra todas las entradas cuyos claves comienzan por
     'test'.

&lt;?php
$test = array ('test 1', 'another test', 'test 123');

$arrayIterator = new ArrayIterator($test);
$regexIterator = new RegexIterator($arrayIterator, '/^test/', RegexIterator::GET_MATCH);

$regexIterator-&gt;setPregFlags(PREG_OFFSET_CAPTURE);

foreach ($regexIterator as $key =&gt; $value) {
    var_dump($value);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(2) {
[0]=&gt;
string(4) "test"
[1]=&gt;
int(0)
}
}
array(1) {
[0]=&gt;
array(2) {
[0]=&gt;
string(4) "test"
[1]=&gt;
int(0)
}
}

### Ver también

    - [RegexIterator::getPregFlags()](#regexiterator.getpregflags) - Devuelve las flags de expresión regular

## Tabla de contenidos

- [RegexIterator::accept](#regexiterator.accept) — Obtener el estado de aceptación
- [RegexIterator::\_\_construct](#regexiterator.construct) — Crea un nuevo RegexIterator
- [RegexIterator::getFlags](#regexiterator.getflags) — Obtener flags
- [RegexIterator::getMode](#regexiterator.getmode) — Devuelve el modo de operación
- [RegexIterator::getPregFlags](#regexiterator.getpregflags) — Devuelve las flags de expresión regular
- [RegexIterator::getRegex](#regexiterator.getregex) — Devuelve la expresión regular actual
- [RegexIterator::setFlags](#regexiterator.setflags) — Establece las flags
- [RegexIterator::setMode](#regexiterator.setmode) — Establece el modo de operación
- [RegexIterator::setPregFlags](#regexiterator.setpregflags) — Define los flags de la expresión regular

# File Handling

## Tabla de contenidos

- [SplFileInfo](#class.splfileinfo)
- [SplFileObject](#class.splfileobject)
- [SplTempFileObject](#class.spltempfileobject)

    SPL provee un conjunto de clases para trabajar con archivos.

# La clase SplFileInfo

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

## Introducción

    La clase SplFileInfo ofrece un interfaz de alto nivel orientado a objetos
    para la información de un fichero individual.

## Sinopsis de la Clase

     class **SplFileInfo**



     implements
      [Stringable](#class.stringable) {

    /* Métodos */

public [\_\_construct](#splfileinfo.construct)([string](#language.types.string) $filename)

    public [getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        **SplFileInfo** implementado
        [Stringable](#class.stringable) ahora.





# SplFileInfo::\_\_construct

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::\_\_construct — Construir un objeto nuevo SplFileInfo

### Descripción

public **SplFileInfo::\_\_construct**([string](#language.types.string) $filename)

Crea un nuevo objeto para el SplFileInfo nombre_archivo especificado. El fichero
no tiene por qué existir, o ser de lectura.

### Parámetros

     filename


        Ruta del fichero.





### Ejemplos

    **Ejemplo #1 SplFileInfo::__construct()** ejemplo

&lt;?php
$info = new SplFileInfo('example.php');
if ($info-&gt;isFile()) {
echo $info-&gt;getRealPath();
}
?&gt;

# SplFileInfo::getATime

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getATime — Obtiene la hora del último acceso al fichero

### Descripción

public **SplFileInfo::getATime**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene la hora del último acceso al fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo del ultimo acceso al fichero en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getATime()**

&lt;?php
$info = new SplFileInfo('example.jpg');
echo 'Last accessed at ' . date('g:i a', $info-&gt;getATime());
?&gt;

    Resultado del ejemplo anterior es similar a:

Last accessed at 1:49 pm

### Ver también

    - [fileatime()](#function.fileatime) - Devuelve la fecha en la que el fichero fue accedido por última vez

    - [SplFileInfo::getCTime()](#splfileinfo.getctime) - Obtiene el i-nodo de el cambio de tiempo

    - [SplFileInfo::getMTime()](#splfileinfo.getmtime) - Obtiene la fecha de la última modificación

# SplFileInfo::getBasename

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

SplFileInfo::getBasename — Obtiene el nombre base del fichero

### Descripción

public **SplFileInfo::getBasename**([string](#language.types.string) $suffix = ""): [string](#language.types.string)

Este método devuelve el nombre base del fichero, directorio o enlace sin
informacion de la ruta de acceso.

**Precaución**

    **SplFileInfo::getBasename()** es consciente de la configuración regional,
    por lo que para que vea el nombre base correcto con rutas de caracteres multibyte,
    la configuración regional correspondiente debe con la función [setlocale()](#function.setlocale).

### Parámetros

     suffix


      Sufijo opcional para omitir el nombre de la base devuelta.





### Valores devueltos

Devuelve el nombre de la base, sin información de la ruta de acceso.

### Ejemplos

    **Ejemplo #1 SplFileInfo::getBasename()**ejemplo

&lt;?php
$info = new SplFileInfo('file.txt');
var_dump($info-&gt;getBasename());

$info = new SplFileInfo('/path/to/file.txt');
var_dump($info-&gt;getBasename());

$info = new SplFileInfo('/path/to/file.txt');
var_dump($info-&gt;getBasename('.txt'));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(8) "file.txt"
string(8) "file.txt"
string(4) "file"

### Ver también

    - [SplFileInfo::getFilename()](#splfileinfo.getfilename) - Obtiene el nombre del fichero

# SplFileInfo::getCTime

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getCTime — Obtiene el i-nodo de el cambio de tiempo

### Descripción

public **SplFileInfo::getCTime**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el i-nodo de el cambio de tiempo para el fichero. El tiempo es retornado en formato Unix timestamp.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El último cambio del tiempo, en formato Unix timestamp en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getCTime()**

&lt;?php
$info = new SplFileInfo('example.jpg');
echo 'El último cambio ' . date('g:i a', $info-&gt;getCTime());
?&gt;

    Resultado del ejemplo anterior es similar a:

El último cambio 1:49 pm

### Ver también

    - [filectime()](#function.filectime) - Devuelve la fecha de última modificación del inodo de un fichero

    - [SplFileInfo::getATime()](#splfileinfo.getatime) - Obtiene la hora del último acceso al fichero

    - [SplFileInfo::getMTime()](#splfileinfo.getmtime) - Obtiene la fecha de la última modificación

# SplFileInfo::getExtension

(PHP 5 &gt;= 5.3.6, PHP 7, PHP 8)

SplFileInfo::getExtension — Obtiene la extensión del fichero

### Descripción

public **SplFileInfo::getExtension**(): [string](#language.types.string)

Devuelve la extensión del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que contiene la extensión del fichero, o un
vacío [string](#language.types.string) si el archivo no tiene extensión.

### Ejemplos

**Ejemplo #1 SplFileInfo::getExtension()** ejemplo

&lt;?php

$info = new SplFileInfo('foo.txt');
var_dump($info-&gt;getExtension());

$info = new SplFileInfo('photo.jpg');
var_dump($info-&gt;getExtension());

$info = new SplFileInfo('something.tar.gz');
var_dump($info-&gt;getExtension());

?&gt;

El ejemplo anterior mostrará:

string(3) "txt"
string(3) "jpg"
string(2) "gz"

### Notas

**Nota**:

    Otra forma de obtener la extensión es usar la función
    [pathinfo()](#function.pathinfo).

&lt;?php
$extension = pathinfo($info-&gt;getFilename(), PATHINFO_EXTENSION);
?&gt;

### Ver también

- [SplFileInfo::getFilename()](#splfileinfo.getfilename) - Obtiene el nombre del fichero

- [SplFileInfo::getBasename()](#splfileinfo.getbasename) - Obtiene el nombre base del fichero

- [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

# SplFileInfo::getFileInfo

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getFileInfo — Obtiene un objeto SplFileInfo para el fichero

### Descripción

public **SplFileInfo::getFileInfo**([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)

Este método obtiene un objeto [SplFileInfo](#class.splfileinfo) para el fichero de referencia.

### Parámetros

     class


       Nombre de una clase [SplFileInfo](#class.splfileinfo) derivada de su uso.





### Valores devueltos

Un objeto [SplFileInfo](#class.splfileinfo) creado para el fichero.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        class es ahora anulable.





### Ver también

    - [SplFileInfo::setInfoClass()](#splfileinfo.setinfoclass) - Establece la clase empleada con SplFileInfo::getFileInfo y SplFileInfo::getPathInfo

# SplFileInfo::getFilename

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getFilename — Obtiene el nombre del fichero

### Descripción

public **SplFileInfo::getFilename**(): [string](#language.types.string)

Obtiene el nombre del fichero sin ningún tipo de información de la ruta de acceso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del fichero.

### Ejemplos

    **Ejemplo #1 SplFileInfo::getFilename()** ejemplo

&lt;?php
$info = new SplFileInfo('foo.txt');
var_dump($info-&gt;getFilename());

$info = new SplFileInfo('/path/to/foo.txt');
var_dump($info-&gt;getFilename());

$info = new SplFileInfo('http://www.php.net/');
var_dump($info-&gt;getFilename());

$info = new SplFileInfo('http://www.php.net/svn.php');
var_dump($info-&gt;getFilename());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(7) "foo.txt"
string(7) "foo.txt"
string(0) ""
string(7) "svn.php"

### Ver también

    - [SplFileInfo::getBasename()](#splfileinfo.getbasename) - Obtiene el nombre base del fichero

# SplFileInfo::getGroup

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getGroup — Obtiene el grupo de el fichero

### Descripción

public **SplFileInfo::getGroup**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el grupo del fichero. El ID del grupo es retornado en formato numérico.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El ID del grupo en formato numérico en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getGroup()**

&lt;?php
$info = new SplFileInfo('example.jpg');
echo info-&gt;getFilename() . ' belongs to group id ' . $info-&gt;getGroup() . "\n";
print_r(posix_getgrgid($info-&gt;getGroup()));
?&gt;

    Resultado del ejemplo anterior es similar a:

example.jpg belongs to group id 42
Array
(
[name] =&gt; toons
[passwd] =&gt; x
[members] =&gt; Array
(
[0] =&gt; tom
[1] =&gt; jerry
)
[gid] =&gt; 42
)

### Ver también

    - [filegroup()](#function.filegroup) - Leer el nombre del grupo

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

# SplFileInfo::getInode

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getInode — Obtiene el i-nodo de el fichero

### Descripción

public **SplFileInfo::getInode**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de i-nodo de el objeto filesystem.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de i-nodo de el objeto filesystem en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ver también

    - [fileinode()](#function.fileinode) - Lee el número de inodo del fichero

# SplFileInfo::getLinkTarget

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

SplFileInfo::getLinkTarget — Obtiene el destino de un enlace del sistema de ficheros

### Descripción

public **SplFileInfo::getLinkTarget**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el destino de un enlace del sistema de ficheros.

**Nota**:

    El destino no puede ser una ruta real en el sistema de ficheros. Use [SplFileInfo::getRealPath()](#splfileinfo.getrealpath)
    para determinar la ruta verdadera en el sistema de fucheros.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el destino de el enlace del sistema de ficheros en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getLinkTarget()**

&lt;?php
$info = new SplFileInfo('/Users/bbieber/workspace');
if ($info-&gt;isLink()) {
var_dump($info-&gt;getLinkTarget());
    var_dump($info-&gt;getRealPath());
}
?&gt;

    Resultado del ejemplo anterior es similar a:

string(19) "Documents/workspace"
string(34) "/Users/bbieber/Documents/workspace"

### Ver también

    - [SplFileInfo::isLink()](#splfileinfo.islink) - Comprueba si el fichero es un link

    - [SplFileInfo::getRealPath()](#splfileinfo.getrealpath) - Obtiene la ruta absoluta al fichero

# SplFileInfo::getMTime

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getMTime — Obtiene la fecha de la última modificación

### Descripción

public **SplFileInfo::getMTime**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tiempo cuando el contenido de el fichero ha sido cambiado. El tiempo retornado en formato Unix timestamp.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la fecha de modificación de el fichero, en formato Unix timestamp en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getMTime()**

&lt;?php
$info = new SplFileInfo('example.jpg');
echo 'Last modified at ' . date('g:i a', $info-&gt;getMTime());
?&gt;

    Resultado del ejemplo anterior es similar a:

Last modified at 1:49 pm

### Ver también

    - [filemtime()](#function.filemtime) - Lee la fecha de última modificación del fichero

    - [SplFileInfo::getATime()](#splfileinfo.getatime) - Obtiene la hora del último acceso al fichero

    - [SplFileInfo::getCTime()](#splfileinfo.getctime) - Obtiene el i-nodo de el cambio de tiempo

# SplFileInfo::getOwner

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getOwner — Obtiene el dueño de el fichero

### Descripción

public **SplFileInfo::getOwner**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el dueño de el fichero. El ID del dueño retornado en formato numérico.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El id del dueño en formato numérico en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getOwner()**

&lt;?php
$info = new SplFileInfo('example.jpg');
echo info-&gt;getFilename() . ' belongs to owner id ' . $info-&gt;getOwner() . "\n";
print_r(posix_getpwuid($info-&gt;getOwner()));
?&gt;

    Resultado del ejemplo anterior es similar a:

example.jpg belongs to user id 501
Array
(
[name] =&gt; tom
[passwd] =&gt; x
[uid] =&gt; 501
[gid] =&gt; 42
[gecos] =&gt; Tom Cat
[dir] =&gt; /home/tom
[shell] =&gt; /bin/bash
)

### Ver también

    - [posix_getpwuid()](#function.posix-getpwuid) - Devolver información sobre un usuario mediante su id de usuario

    - [SplFileInfo::getGroup()](#splfileinfo.getgroup) - Obtiene el grupo de el fichero

# SplFileInfo::getPath

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getPath — Obtiene la ruta sin el nombre de fichero

### Descripción

public **SplFileInfo::getPath**(): [string](#language.types.string)

Devuelve la ruta de el fichero, omitiendo el nombre del fichero y cualquier barra.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta a el fichero.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getPath()**

&lt;?php
$info = new SplFileInfo('/usr/bin/php');
var_dump($info-&gt;getPath());

$info = new SplFileInfo('/usr/');
var_dump($info-&gt;getPath());?&gt;

    Resultado del ejemplo anterior es similar a:

string(8) "/usr/bin"
string(4) "/usr"

### Ver también

    - [SplFileInfo::getRealPath()](#splfileinfo.getrealpath) - Obtiene la ruta absoluta al fichero

    - [SplFileInfo::getFilename()](#splfileinfo.getfilename) - Obtiene el nombre del fichero

    - [SplFileInfo::getPathInfo()](#splfileinfo.getpathinfo) - Obtiene un objeto SplFileInfo para la ruta

# SplFileInfo::getPathInfo

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getPathInfo — Obtiene un objeto SplFileInfo para la ruta

### Descripción

public **SplFileInfo::getPathInfo**([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)

Obtiene un objeto [SplFileInfo](#class.splfileinfo) para el padre de el fichero actual.

### Parámetros

     class


       Nombre de una clase [SplFileInfo](#class.splfileinfo) derivada a usar, o ella misma si **[null](#constant.null)**.





### Valores devueltos

Devuelve un objeto [SplFileInfo](#class.splfileinfo) para la ruta padre de el fichero en caso de éxito, o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        class es ahora anulable.





### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getPathInfo()**

&lt;?php
$info = new SplFileInfo('/usr/bin/php');
$parent_info = $info-&gt;getPathInfo();
var_dump($parent_info-&gt;getRealPath());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(8) "/usr/bin"

### Ver también

    - [SplFileInfo::setInfoClass()](#splfileinfo.setinfoclass) - Establece la clase empleada con SplFileInfo::getFileInfo y SplFileInfo::getPathInfo

# SplFileInfo::getPathname

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getPathname — Obtiene la ruta de un fichero

### Descripción

public **SplFileInfo::getPathname**(): [string](#language.types.string)

Devuelve la ruta de el fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

la ruta de el fichero.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getPathname()**

&lt;?php
$info = new SplFileInfo('/usr/bin/php');
var_dump($info-&gt;getPathname());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(12) "/usr/bin/php"

### Ver también

    - [SplFileInfo::getRealPath()](#splfileinfo.getrealpath) - Obtiene la ruta absoluta al fichero

# SplFileInfo::getPerms

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getPerms — Obtiene los permisos del fichero

### Descripción

public **SplFileInfo::getPerms**(): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene los permisos del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los permisos de el fichero en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getPerms()**

&lt;?php
$info = new SplFileInfo('/tmp');
echo substr(sprintf('%o', $info-&gt;getPerms()), -4);

$info = new SplFileInfo(**FILE**);
echo substr(sprintf('%o', $info-&gt;getPerms()), -4);
?&gt;

    Resultado del ejemplo anterior es similar a:

1777
0644

# SplFileInfo::getRealPath

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

SplFileInfo::getRealPath — Obtiene la ruta absoluta al fichero

### Descripción

public **SplFileInfo::getRealPath**(): [string](#language.types.string)|[false](#language.types.singleton)

Este método expande todos los enlaces simbólicos, resuelve las referencias relativas y retorna la ruta real al fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta al fichero, o **[false](#constant.false)** si el fichero no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getRealPath()**

&lt;?php
$info = new SplFileInfo('/..//./../../'.__FILE__);
var_dump($info-&gt;getRealPath());

$info = new SplFileInfo('/tmp');
var_dump($info-&gt;getRealPath());

$info = new SplFileInfo('/I/Do/Not/Exist');
var_dump($info-&gt;getRealPath());

$info = new SplFileInfo('php://output');
var_dump($info-&gt;getRealPath());

$info = new SplFileInfo("");
var_dump($info-&gt;getRealPath());
?&gt;

    Resultado del ejemplo anterior es similar a:

string(28) "/private/tmp/phptempfile.php"
string(12) "/private/tmp"
bool(false)
bool(false)
string(12) "/private/tmp"

### Ver también

    - [SplFileInfo::isLink()](#splfileinfo.islink) - Comprueba si el fichero es un link

    - [realpath()](#function.realpath) - Retorna la ruta de acceso canónica absoluta

# SplFileInfo::getSize

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getSize — Obtiene el tamaño de el fichero

### Descripción

public **SplFileInfo::getSize**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño de el fichero en bytes para el fichero referenciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tamaño del fichero en bytes en caso de éxito, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si el fichero no existe o en caso de error.

### Ejemplos

    **Ejemplo #1 SplFileInfo::getSize()** example



     &lt;?php

$info = new SplFileInfo('example.jpg');
echo $fileinfo-&gt;getFilename() . " " . $fileinfo-&gt;getSize();
?&gt;

    Resultado del ejemplo anterior es similar a:



     example.jpg 15385

### Ver también

    - [filesize()](#function.filesize) - Obtiene el tamaño de un fichero

# SplFileInfo::getType

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::getType — Obtiene el tipo del fichero

### Descripción

public **SplFileInfo::getType**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el tipo de el fichero referenciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [string](#language.types.string) representando el tipo de la entrada.
Puede ser file, link,
dir, block, fifo,
char, socket, o unknown, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::getType()**

&lt;?php

$info = new SplFileInfo(**FILE**);
echo $info-&gt;getType().PHP_EOL;

$info = new SplFileInfo(dirname(**FILE**));
echo $info-&gt;getType();

?&gt;

    Resultado del ejemplo anterior es similar a:

file
dir

# SplFileInfo::isDir

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isDir — Dice si el fichero es un directorio

### Descripción

public **SplFileInfo::isDir**(): [bool](#language.types.boolean)

Este método puede ser usado para determinar si el fichero es un directorio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es un directorio, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isDir()**

&lt;?php
$d = new SplFileInfo(dirname(__FILE__));
var_dump($d-&gt;isDir());

$d = new SplFileInfo(__FILE__);
var_dump($d-&gt;isDir());
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

# SplFileInfo::isExecutable

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isExecutable — Comprueba si el fichero es ejecutable

### Descripción

public **SplFileInfo::isExecutable**(): [bool](#language.types.boolean)

Comprueba si el fichero es ejecutable.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es ejecutable, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isExecutable()**

&lt;?php
$info = new SplFileInfo('/usr/bin/php');
var_dump($info-&gt;isExecutable());

$info = new SplFileInfo('/usr/bin');
var_dump($info-&gt;isExecutable());

$info = new SplFileInfo('foo');
var_dump($info-&gt;isExecutable());
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
bool(false)

# SplFileInfo::isFile

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isFile — Dice is el objeto hace referencia a un fichero normal

### Descripción

public **SplFileInfo::isFile**(): [bool](#language.types.boolean)

Comprueba si el fichero que el objecto SplFileInfo hace referencia existe es un fichero regular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero existe y si es un fichero normal (no un enlace), **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isFile()**

&lt;?php
$info = new SplFileInfo(__FILE__);
var_dump($info-&gt;isFile());

$info = new SplFileInfo(dirname(__FILE__));
var_dump($info-&gt;isFile());
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

# SplFileInfo::isLink

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isLink — Comprueba si el fichero es un link

### Descripción

public **SplFileInfo::isLink**(): [bool](#language.types.boolean)

Use este método para comprobar si el fichero referenciado por el objeto SplFileInfo
es un link.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero es un link, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isLink()**

&lt;?php
$info = new SplFileInfo('/path/to/symlink');
if ($info-&gt;isLink()) {
echo 'The real path is '.$info-&gt;getRealPath();
}
?&gt;

### Ver también

    - [SplFileInfo::getRealPath()](#splfileinfo.getrealpath) - Obtiene la ruta absoluta al fichero

# SplFileInfo::isReadable

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isReadable — Comprueba si el fichero se puede leer

### Descripción

public **SplFileInfo::isReadable**(): [bool](#language.types.boolean)

Comprueba si el fichero se puede leer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se puede leer, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isReadable()**

&lt;?php
$info = new SplFileInfo('readable.jpg');
if ($info-&gt;isReadable()) {
echo $info-&gt;getFilename() . ' is readable';
}
?&gt;

    Resultado del ejemplo anterior es similar a:

readable.jpg is readable

# SplFileInfo::isWritable

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::isWritable — Comprueba si se puede escribir en el fichero

### Descripción

public **SplFileInfo::isWritable**(): [bool](#language.types.boolean)

Comprueba si se puede escribir en el fichero actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se puede escribir, en caso contrario **[false](#constant.false)**;

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::isWriteable()**

&lt;?php
$info = new SplFileInfo('locked.jpg');
if (!$info-&gt;isWriteable()) {
echo $info-&gt;getFilename() . ' is not writeable';
}
?&gt;

    Resultado del ejemplo anterior es similar a:

locked.jpg is not writeable

# SplFileInfo::openFile

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::openFile — Obtiene un objeto SplFileObject para el fichero

### Descripción

public **SplFileInfo::openFile**([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)

Crea un [object](#language.types.object) [SplFileObject](#class.splfileobject) de
el fichero. Esto es útil porque [SplFileObject](#class.splfileobject)
contiene otros métodos para manipular el fichero mientras que
[SplFileInfo](#class.splfileinfo) sólo es útil para obtener información,
por ejemplo si el fichero tiene permisos de escritura.

### Parámetros

     mode


       El modo para abrir el fichero. Véase la documentación de
       [fopen()](#function.fopen) para una descripción de los posibles
       modos. Por omisión es de sólo lectura.






     useIncludePath


       Cuando está definido como **[true](#constant.true)**, el nombre del archivo también es

buscado en [include_path](#ini.include-path)

     context


       Consulte la sección [contexto](#context)

de este manual para una descripción de los contextos.

### Valores devueltos

El fichero abierto como un objeto [SplFileObject](#class.splfileobject).

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si el fichero no se puede abrir
(p.ej. permisos insuficientes).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        context es ahora anulable.





### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::openFile()**

&lt;?php
$fileinfo = new SplFileInfo('/tmp/foo.txt');

if ($fileinfo-&gt;isWritable()) {

    $fileobj = $fileinfo-&gt;openFile('a');

    $fileobj-&gt;fwrite("Añadiendo este texto de prueba");

}
?&gt;

### Ver también

    - [SplFileObject](#class.splfileobject)

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [fopen()](#function.fopen) - Abre un fichero o un URL

# SplFileInfo::setFileClass

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::setFileClass — Establece la clase empleada con [SplFileInfo::openFile()](#splfileinfo.openfile)

### Descripción

public **SplFileInfo::setFileClass**([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)

Este método se emplea para establecer una clase propia que será utilizada cuando
se invoque a [SplFileInfo::openFile()](#splfileinfo.openfile). El nombre de la clase
pasado a este método debe ser [SplFileObject](#class.splfileobject) o una clase
derivada de [SplFileObject](#class.splfileobject).

### Parámetros

     class


       El nombre de la clase a emplear cuando se invoca a
       [SplFileInfo::openFile()](#splfileinfo.openfile).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::setFileClass()**

&lt;?php
// Crear una clase que extiende a SplFileObject
class MiFoo extends SplFileObject {}

$info = new SplFileInfo(__FILE__);
// Establecer la clase a usar
$info-&gt;setFileClass('MiFoo');
var_dump($info-&gt;openFile());
?&gt;

    Resultado del ejemplo anterior es similar a:

object(MiFoo)#2 (0) { }

### Ver también

    - [SplFileInfo::openFile()](#splfileinfo.openfile) - Obtiene un objeto SplFileObject para el fichero

# SplFileInfo::setInfoClass

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::setInfoClass — Establece la clase empleada con [SplFileInfo::getFileInfo()](#splfileinfo.getfileinfo) y [SplFileInfo::getPathInfo()](#splfileinfo.getpathinfo)

### Descripción

public **SplFileInfo::setInfoClass**([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)

Este método se emplea para establecer una clase propia que será utilizada cuando
se invoque a [SplFileInfo::getFileInfo()](#splfileinfo.getfileinfo) y
[SplFileInfo::getPathInfo()](#splfileinfo.getpathinfo). El nombre de la clase
pasado a este método debe ser [SplFileInfo](#class.splfileinfo) o una clase
derivada de [SplFileInfo](#class.splfileinfo).

### Parámetros

     class


       El nombre de la clase a emplear cuando se invoca a
       [SplFileInfo::getFileInfo()](#splfileinfo.getfileinfo) y
       [SplFileInfo::getPathInfo()](#splfileinfo.getpathinfo).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de [SplFileInfo::setFileClass()](#splfileinfo.setfileclass)**

&lt;?php
// Crear una clase que extiende a SplFileInfo
class MiFoo extends SplFileInfo {}

$info = new SplFileInfo('foo');
// Establecer el nombre de clase a usar
$info-&gt;setInfoClass('MiFoo');
var_dump($info-&gt;getFileInfo());
?&gt;

    Resultado del ejemplo anterior es similar a:

object(MiFoo)#2 (0) { }

### Ver también

    - [SplFileInfo::getFileInfo()](#splfileinfo.getfileinfo) - Obtiene un objeto SplFileInfo para el fichero

# SplFileInfo::\_\_toString

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileInfo::\_\_toString — Devuelve la ruta de el fichero como un string

### Descripción

public **SplFileInfo::\_\_toString**(): [string](#language.types.string)

Este método retornará el nombre de fichero de el fichero referenciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la ruta a el fichero.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileInfo::__toString()**

&lt;?php
$info = new SplFileInfo('foo');
var_dump($info-&gt;\_\_toString());
echo $info.PHP_EOL;

$info = new SplFileInfo('/usr/bin/php');
var_dump($info-&gt;\_\_toString());
echo $info.PHP_EOL;
?&gt;

    Resultado del ejemplo anterior es similar a:

string(3) "foo"
foo
string(12) "/usr/bin/php"
/usr/bin/php

## Tabla de contenidos

- [SplFileInfo::\_\_construct](#splfileinfo.construct) — Construir un objeto nuevo SplFileInfo
- [SplFileInfo::getATime](#splfileinfo.getatime) — Obtiene la hora del último acceso al fichero
- [SplFileInfo::getBasename](#splfileinfo.getbasename) — Obtiene el nombre base del fichero
- [SplFileInfo::getCTime](#splfileinfo.getctime) — Obtiene el i-nodo de el cambio de tiempo
- [SplFileInfo::getExtension](#splfileinfo.getextension) — Obtiene la extensión del fichero
- [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo) — Obtiene un objeto SplFileInfo para el fichero
- [SplFileInfo::getFilename](#splfileinfo.getfilename) — Obtiene el nombre del fichero
- [SplFileInfo::getGroup](#splfileinfo.getgroup) — Obtiene el grupo de el fichero
- [SplFileInfo::getInode](#splfileinfo.getinode) — Obtiene el i-nodo de el fichero
- [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget) — Obtiene el destino de un enlace del sistema de ficheros
- [SplFileInfo::getMTime](#splfileinfo.getmtime) — Obtiene la fecha de la última modificación
- [SplFileInfo::getOwner](#splfileinfo.getowner) — Obtiene el dueño de el fichero
- [SplFileInfo::getPath](#splfileinfo.getpath) — Obtiene la ruta sin el nombre de fichero
- [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo) — Obtiene un objeto SplFileInfo para la ruta
- [SplFileInfo::getPathname](#splfileinfo.getpathname) — Obtiene la ruta de un fichero
- [SplFileInfo::getPerms](#splfileinfo.getperms) — Obtiene los permisos del fichero
- [SplFileInfo::getRealPath](#splfileinfo.getrealpath) — Obtiene la ruta absoluta al fichero
- [SplFileInfo::getSize](#splfileinfo.getsize) — Obtiene el tamaño de el fichero
- [SplFileInfo::getType](#splfileinfo.gettype) — Obtiene el tipo del fichero
- [SplFileInfo::isDir](#splfileinfo.isdir) — Dice si el fichero es un directorio
- [SplFileInfo::isExecutable](#splfileinfo.isexecutable) — Comprueba si el fichero es ejecutable
- [SplFileInfo::isFile](#splfileinfo.isfile) — Dice is el objeto hace referencia a un fichero normal
- [SplFileInfo::isLink](#splfileinfo.islink) — Comprueba si el fichero es un link
- [SplFileInfo::isReadable](#splfileinfo.isreadable) — Comprueba si el fichero se puede leer
- [SplFileInfo::isWritable](#splfileinfo.iswritable) — Comprueba si se puede escribir en el fichero
- [SplFileInfo::openFile](#splfileinfo.openfile) — Obtiene un objeto SplFileObject para el fichero
- [SplFileInfo::setFileClass](#splfileinfo.setfileclass) — Establece la clase empleada con SplFileInfo::openFile
- [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass) — Establece la clase empleada con SplFileInfo::getFileInfo y SplFileInfo::getPathInfo
- [SplFileInfo::\_\_toString](#splfileinfo.tostring) — Devuelve la ruta de el fichero como un string

# La clase SplFileObject

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La clase SplFileObject ofrece una interfaz orientada a objetos para un fichero.

## Sinopsis de la Clase

     class **SplFileObject**



     extends
      [SplFileInfo](#class.splfileinfo)



     implements
      [RecursiveIterator](#class.recursiveiterator),

     [SeekableIterator](#class.seekableiterator) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [DROP_NEW_LINE](#splfileobject.constants.drop-new-line);

    public
     const
     [int](#language.types.integer)
      [READ_AHEAD](#splfileobject.constants.read-ahead);

    public
     const
     [int](#language.types.integer)
      [SKIP_EMPTY](#splfileobject.constants.skip-empty);

    public
     const
     [int](#language.types.integer)
      [READ_CSV](#splfileobject.constants.read-csv);


    /* Métodos */

public [\_\_construct](#splfileobject.construct)(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $mode = "r",
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
)

    public [current](#splfileobject.current)(): [string](#language.types.string)|[array](#language.types.array)|[false](#language.types.singleton)

public [eof](#splfileobject.eof)(): [bool](#language.types.boolean)
public [fflush](#splfileobject.fflush)(): [bool](#language.types.boolean)
public [fgetc](#splfileobject.fgetc)(): [string](#language.types.string)|[false](#language.types.singleton)
public [fgetcsv](#splfileobject.fgetcsv)([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [array](#language.types.array)|[false](#language.types.singleton)
public [fgets](#splfileobject.fgets)(): [string](#language.types.string)
public [fgetss](#splfileobject.fgetss)([string](#language.types.string) $allowable_tags = ?): [string](#language.types.string)
public [flock](#splfileobject.flock)([int](#language.types.integer) $operation, [int](#language.types.integer) &amp;$wouldBlock = **[null](#constant.null)**): [bool](#language.types.boolean)
public [fpassthru](#splfileobject.fpassthru)(): [int](#language.types.integer)
public [fputcsv](#splfileobject.fputcsv)(
    [array](#language.types.array) $fields,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\",
    [string](#language.types.string) $eol = "\n"
): [int](#language.types.integer)|[false](#language.types.singleton)
public [fread](#splfileobject.fread)([int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)
public [fscanf](#splfileobject.fscanf)([string](#language.types.string) $format, [mixed](#language.types.mixed) &amp;...$vars): [array](#language.types.array)|[int](#language.types.integer)|[null](#language.types.null)
public [fseek](#splfileobject.fseek)([int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_SET](#constant.seek-set)**): [int](#language.types.integer)
public [fstat](#splfileobject.fstat)(): [array](#language.types.array)
public [ftell](#splfileobject.ftell)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [ftruncate](#splfileobject.ftruncate)([int](#language.types.integer) $size): [bool](#language.types.boolean)
public [fwrite](#splfileobject.fwrite)([string](#language.types.string) $data, [int](#language.types.integer) $length = 0): [int](#language.types.integer)|[false](#language.types.singleton)
public [getChildren](#splfileobject.getchildren)(): [null](#language.types.null)
public [getCsvControl](#splfileobject.getcsvcontrol)(): [array](#language.types.array)
public [getFlags](#splfileobject.getflags)(): [int](#language.types.integer)
public [getMaxLineLen](#splfileobject.getmaxlinelen)(): [int](#language.types.integer)
public [hasChildren](#splfileobject.haschildren)(): [false](#language.types.singleton)
public [key](#splfileobject.key)(): [int](#language.types.integer)
public [next](#splfileobject.next)(): [void](language.types.void.html)
public [rewind](#splfileobject.rewind)(): [void](language.types.void.html)
public [seek](#splfileobject.seek)([int](#language.types.integer) $line): [void](language.types.void.html)
public [setCsvControl](#splfileobject.setcsvcontrol)([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [void](language.types.void.html)
public [setFlags](#splfileobject.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [setMaxLineLen](#splfileobject.setmaxlinelen)([int](#language.types.integer) $maxLength): [void](language.types.void.html)
public [\_\_toString](#splfileobject.tostring)(): [string](#language.types.string)
public [valid](#splfileobject.valid)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[SplFileObject::DROP_NEW_LINE](#splfileobject.constants.drop-new-line)**

      Colocar nuevas líneas al final de una línea.





     **[SplFileObject::READ_AHEAD](#splfileobject.constants.read-ahead)**

      Leer sobre rewind/next.





     **[SplFileObject::SKIP_EMPTY](#splfileobject.constants.skip-empty)**

      Saltar líneas vacías en el fichero. Esto requiere que la bandera **[READ_AHEAD](#constant.read-ahead)** esté activada para que funcione como se tenía previsto.





     **[SplFileObject::READ_CSV](#splfileobject.constants.read-csv)**

      Leer líneas como filas CSV.




# SplFileObject::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::\_\_construct — Construye un nuevo objeto de fichero

### Descripción

public **SplFileObject::\_\_construct**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $mode = "r",
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
)

Construye un nuevo objeto de fichero.

### Parámetros

     filename


       El fichero a leer.



      **Sugerencia**

Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

     mode


       El modo en el que abrir el fichero. Véase [fopen()](#function.fopen) para una lista de los modos permitidos.






     useIncludePath


       Si se va a buscar filename en el [include_path](#ini.include-path).






     context


       Un contexto válido creado con [stream_context_create()](#function.stream-context-create).





### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si filename no se puede abrir.

Lanza una [LogicException](#class.logicexception) si filename es un directorio.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::__construct()**



     Este ejemplo abre el fichero actual y recorre su contenido, línea por línea.

&lt;?php
$fichero = new SplFileObject(__FILE__);
foreach ($fichero as $num_línea =&gt; $línea) {
echo "La línea $num_línea es $línea";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

La línea 0 es &lt;?php
La línea 1 es $fichero = new SplFileObject(__FILE__);
La línea 2 es foreach ($fichero as $num_línea =&gt; $línea) {
La línea 3 es echo "La línea $num_línea es $línea";
La línea 4 es }
La línea 5 es ?&gt;

### Ver también

    - [SplFileInfo::openFile()](#splfileinfo.openfile) - Obtiene un objeto SplFileObject para el fichero

    - [fopen()](#function.fopen) - Abre un fichero o un URL

# SplFileObject::current

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::current — Recupera la línea actual del fichero

### Descripción

public **SplFileObject::current**(): [string](#language.types.string)|[array](#language.types.array)|[false](#language.types.singleton)

Recupera la línea actual del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Recupera la línea actual del fichero. Si la flag **[SplFileObject::READ_CSV](#splfileobject.constants.read-csv)** está establecida, este método devuelve un array conteniendo la línea actual analizada como datos CSV.
Si se alcanza el final del archivo, se devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::current()**

&lt;?php
$fichero = new SplFileObject(__FILE__);
foreach ($fichero as $k =&gt; $linea) {
   echo ($fichero-&gt;key() + 1) . ': ' . $fichero-&gt;current();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

1: &lt;?php
2: $fichero = new SplFileObject(__FILE__);
3: foreach ($fichero as $linea) {
4:     echo ($fichero-&gt;key() + 1) . ': ' . $fichero-&gt;current();
5: }
6: ?&gt;

### Ver también

    - [SplFileObject::key()](#splfileobject.key) - Obtiene el número de línea

    - [SplFileObject::seek()](#splfileobject.seek) - Mueve el apuntador interno a la línea específicada

    - [SplFileObject::next()](#splfileobject.next) - Leer la siguiente línea

    - [SplFileObject::rewind()](#splfileobject.rewind) - Rebobina el fichero hasta la primera línea

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

# SplFileObject::eof

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::eof — Comprueba si es el final del fichero

### Descripción

public **SplFileObject::eof**(): [bool](#language.types.boolean)

Determina si el final de el fichero ha sido alcanzado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es el final de el fichero, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::eof()**

&lt;?php
$fichero = new SplFileObject("frutas.txt");
while ( ! $fichero-&gt;eof()) {
echo $fichero-&gt;fgets();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

manzana
banana
cereza
naranja
baya

### Ver también

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

    - [feof()](#function.feof) - Prueba el final del archivo

# SplFileObject::fflush

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fflush — Vuelca el resultado en el fichero

### Descripción

public **SplFileObject::fflush**(): [bool](#language.types.boolean)

Fuerza a escribir en todo el búfer de salida al fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fflush()**

&lt;?php
$file = new SplFileObject('variado.txt', 'r+');
$file-&gt;rewind();
$file-&gt;fwrite("Foo");
$file-&gt;fflush();
$file-&gt;ftruncate($file-&gt;ftell());
?&gt;

### Ver también

    - [SplFileObject::fwrite()](#splfileobject.fwrite) - Escribe en el fichero

# SplFileObject::fgetc

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fgetc — Obtiene un caracter del fichero

### Descripción

public **SplFileObject::fgetc**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene un caracter del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string conteniendo un solo caracter leído de el fichero o **[false](#constant.false)** si es el final del fichero.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fgetc()**

&lt;?php
$fichero = new SplFileObject('texto.txt');
while (false !== ($char = $fichero-&gt;fgetc())) {
    echo "$char\n";
}
?&gt;

### Ver también

    - [SplFileObject::fgets()](#splfileobject.fgets) - Obtener la línea de el fichero

# SplFileObject::fgetcsv

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fgetcsv — Recupera una línea del archivo y la analiza como datos CSV

### Descripción

public **SplFileObject::fgetcsv**([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [array](#language.types.array)|[false](#language.types.singleton)

Recupera una línea del archivo y la analiza como datos CSV
y devuelve un array que contiene todos los campos leídos.

**Nota**:

    Los parámetros de configuración local son tenidos en cuenta por esta función.
    Por ejemplo, los datos codificados en ciertos juegos de caracteres de un byte pueden ser analizados
    incorrectamente si **[LC_CTYPE](#constant.lc-ctype)** es
    en_US.UTF-8.

### Parámetros

     separator


       El delimitador de campo (un solo carácter de un byte).
       Por omisión, , o el valor definido por una llamada previa a
       [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).






     enclosure


       El carácter utilizado para encerrar el valor de un campo (un carácter de un solo byte).
       Por omisión, será una comilla doble o bien el valor definido utilizando
       el método [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).






     escape


       El carácter de escape de campo (un solo carácter de un byte).
       Por omisión, " o el valor definido por una llamada previa a
       [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).
       Un [string](#language.types.string) vacío ("") desactiva el mecanismo de escape propietario.



      **Nota**:

        Normalmente, un carácter enclosure se escapa
        dentro de un campo duplicándolo; Sin embargo, el carácter
        escape puede ser utilizado como alternativa.
        Así, para los valores de parámetro por omisión "" y
        \" tienen el mismo significado. Además de permitir
        escapar el carácter enclosure el carácter
        escape no tiene un significado particular; ni siquiera
        está destinado a escapar.




      **Advertencia**

        A partir de PHP 8.4.0, depender del valor por omisión de
        escape está deprecado.
        Debe ser proporcionado explícitamente ya sea por posición, ya sea mediante
        el uso de los [argumentos nombrados](#functions.named-arguments),
        o mediante una llamada a [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).






**Advertencia**
When escape is set to anything other than an empty string
("") it can result in CSV that is not compliant with
[» RFC 4180](https://datatracker.ietf.org/doc/html/rfc4180) or unable to survive a roundtrip
through the PHP CSV functions. The default for escape is
"\\" so it is recommended to set it to the empty string explicitly.
The default value will change in a future version of PHP, no earlier than PHP 9.0.

### Valores devueltos

Devuelve un array indexado que contiene todos los campos leídos, o **[false](#constant.false)**
si ocurre un error.

**Nota**:

    Una línea vacía de un archivo CSV será devuelta en forma de un array
    contenido un solo campo **[null](#constant.null)** a menos que se utilice
    **[SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE](#splfileobject.constants.skip-empty%20%7C%20splfileobject)**,
    en cuyo caso, las líneas vacías serán ignoradas.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si
separator o enclosure
no tiene una longitud de un byte.

Genera una [ValueError](#class.valueerror) si
escape no tiene una longitud de un byte o es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Confiar en el valor por omisión de escape está ahora
        deprecado.




       7.4.0

        El parámetro escape ahora acepta una cadena de
        caracteres vacía para desactivar el mecanismo de escape propietario.





### Ejemplos

    **Ejemplo #1 Ejemplo con SplFileObject::fgetcsv()**

&lt;?php
$file = new SplFileObject("data.csv");
while (!$file-&gt;eof()) {
var_dump($file-&gt;fgetcsv());
}
?&gt;

    **Ejemplo #2 Ejemplo con [SplFileObject::READ_CSV](#splfileobject.constants.read-csv)**

&lt;?php
$file = new SplFileObject("animals.csv");
$file-&gt;setFlags(SplFileObject::READ_CSV);
foreach ($file as $row) {
    list($animal, $class, $legs) = $row;
printf("Un %s es un %s con %d patas\n", $animal, $class, $legs);
}
?&gt;

    Contenido de animals.csv

crocodile,reptile,4
dauphin,mammifère,0
canard,oiseau,2
koala,mammifère,4
saumon,poisson,0

    Resultado del ejemplo anterior es similar a:

Un crocodile es un reptile con 4 patas
Un dauphin es un mammifère con 0 patas
Un canard es un oiseau con 2 patas
Un koala es un mammifère con 4 patas
Un saumon es un poisson con 0 patas

### Ver también

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

- [SplFileObject::setFlags()](#splfileobject.setflags) - Establece flags para el SplFileObject

- **[SplFileObject::READ_CSV](#splfileobject.constants.read-csv)**

- [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

# SplFileObject::fgets

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fgets — Obtener la línea de el fichero

### Descripción

public **SplFileObject::fgets**(): [string](#language.types.string)

Obtener la línea de el fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string conteniendo la siguiente línea de el fichero.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si el fichero no puede ser leído.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fgets()**


    Este ejemplo simplemente imprime el contenido de texto.txt línea por línea.

&lt;?php
$fichero = new SplFileObject("texto.txt");
while (!$fichero-&gt;eof()) {
echo $fichero-&gt;fgets();
}
?&gt;

### Ver también

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [SplFileObject::fgetss()](#splfileobject.fgetss) - Obtiene la línea de el fichero y elimina etiquetas HTML

    - [SplFileObject::fgetc()](#splfileobject.fgetc) - Obtiene un caracter del fichero

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

# SplFileObject::fgetss

(PHP 5 &gt;= 5.1.0, PHP 7)

SplFileObject::fgetss — Obtiene la línea de el fichero y elimina etiquetas HTML

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.3.0,
y ha sido _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta función está altamente desaconsejado.

### Descripción

public **SplFileObject::fgetss**([string](#language.types.string) $allowable_tags = ?): [string](#language.types.string)

Idéntico a [SplFileObject::fgets()](#splfileobject.fgets), excepto que
**SplFileObject::fgetss()** intenta eliminar las etiquetas HTML y PHP de
el texto que se lee.
La función mantiene el estado de análisis sintáctico de llamada a llamada,
y como tal no es equivalente a la llamada [strip_tags()](#function.strip-tags) sobre el valor de retorno de
[SplFileObject::fgets()](#splfileobject.fgets).

### Parámetros

     allowable_tags


       Parámetro opcional para especificar etiquetas que no deben ser eliminadas.





### Valores devueltos

Devuelve un string conteniendo la siguiente línea de el fichero con el código HTML y PHP
eliminado, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fgetss()**

&lt;?php
$str = &lt;&lt;&lt;EOD
&lt;html&gt;&lt;body&gt;
&lt;p&gt;Bienvenid@! Hoy es el &lt;?php echo(date('jS')); ?&gt; de &lt;?= date('F'); ?&gt;.&lt;/p&gt;
&lt;/body&gt;&lt;/html&gt;
Texto fuera del bloque HTML.
EOD;
file_put_contents("ejemplo.php", $str);

$fichero = new SplFileObject("ejemplo.php");
while (!$fichero-&gt;eof()) {
echo $fichero-&gt;fgetss();
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Bienvenid@! Hoy es el de .

Texto fuera del bloque HTML.

### Ver también

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [SplFileObject::fgets()](#splfileobject.fgets) - Obtener la línea de el fichero

    - [SplFileObject::fgetc()](#splfileobject.fgetc) - Obtiene un caracter del fichero

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - El filtro [string.strip_tags](#filters.string.strip_tags)

# SplFileObject::flock

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::flock — Bloqueo de ficheros portable

### Descripción

public **SplFileObject::flock**([int](#language.types.integer) $operation, [int](#language.types.integer) &amp;$wouldBlock = **[null](#constant.null)**): [bool](#language.types.boolean)

Bloquea o desbloquea el fichero de la misma manera portable que [flock()](#function.flock).

### Parámetros

     operation


       operation es una operación de las siguientes:



        -

          **[LOCK_SH](#constant.lock-sh)** para adquirir un bloqueo compartido (lectura).



        -

          **[LOCK_EX](#constant.lock-ex)** para adquirir un bloqueo exclusivo (escritura).



        -

          **[LOCK_UN](#constant.lock-un)** para liberar un bloqueo (compartido o exclusivo).






       También es posible añadir **[LOCK_NB](#constant.lock-nb)** como máscara de bits
       a una de las operaciones anteriores, si [flock()](#function.flock) no
       debe bloquearse durante el intento de bloqueo.






     wouldBlock


       Establecer a **[true](#constant.true)** si el bloqueo hará que la función quede esperando (condición de errno EWOULDBLOCK).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::flock()**

&lt;?php
$file = new SplFileObject("/tmp/bloqueado.txt", "w");
if ($file-&gt;flock(LOCK_EX)) { // adquirir un bloqueo exclusivo
$file-&gt;ftruncate(0); // truncar el fichero
$file-&gt;fwrite("Escribir alguna cosa\n");
$file-&gt;flock(LOCK_UN); // liberar el bloqueo
} else {
echo "¡No se pudo obtener el bloqueo!";
}
?&gt;

### Ver también

    - [flock()](#function.flock) - Bloquea el fichero

# SplFileObject::fpassthru

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fpassthru — Imprimir todos los datos restantes en un apuntador de fichero

### Descripción

public **SplFileObject::fpassthru**(): [int](#language.types.integer)

Lee hasta el final en el puntero de el fichero dado de la posición actual y
escribe el resultado a el búfer de salida.

Puede que se necesite llamar a [SplFileObject::rewind()](#splfileobject.rewind)
You may need to call [SplFileObject::rewind()](#splfileobject.rewind) para reiniciar el
puntero del fichero al inicio de el fichero si se tiene datos escritos en el fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de caracteres leídos del handle
y pasados a través de la salida.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fpassthru()**

&lt;?php

// Abrir el fichero en modo binario
$file = new SplFileObject("./img/ok.png", "rb");

// Enviar las cabeceras de permisos
header("Content-Type: image/png");
header("Content-Length: " . $file-&gt;getSize());

// Volcar la imagen y fin del script
$file-&gt;fpassthru();
exit;

?&gt;

### Ver también

    - [fpassthru()](#function.fpassthru) - Muestra el resto del fichero

# SplFileObject::fputcsv

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

SplFileObject::fputcsv — Escribe un array en forma de línea CSV

### Descripción

public **SplFileObject::fputcsv**(
    [array](#language.types.array) $fields,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\",
    [string](#language.types.string) $eol = "\n"
): [int](#language.types.integer)|[false](#language.types.singleton)

Escribe un array fields en forma de línea CSV.

### Parámetros

    fields


      Un array de valores.






     separator


       El delimitador de campo (un solo carácter de un byte).
       Por omisión, , o el valor definido por una llamada previa a
       [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).






     enclosure


       El carácter utilizado para encerrar el valor de un campo (un carácter de un solo byte).
       Por omisión, será una comilla doble o bien el valor definido utilizando
       el método [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).






     escape


       El carácter de escape de campo (un solo carácter de un byte).
       Por omisión, " o el valor definido por una llamada previa a
       [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).
       Un [string](#language.types.string) vacío ("") desactiva el mecanismo de escape propietario.



      **Nota**:

        Normalmente, un carácter enclosure se escapa
        dentro de un campo duplicándolo; Sin embargo, el carácter
        escape puede ser utilizado como alternativa.
        Así, para los valores de parámetro por omisión "" y
        \" tienen el mismo significado. Además de permitir
        escapar el carácter enclosure el carácter
        escape no tiene un significado particular; ni siquiera
        está destinado a escapar.




      **Advertencia**

        A partir de PHP 8.4.0, depender del valor por omisión de
        escape está deprecado.
        Debe ser proporcionado explícitamente ya sea por posición, ya sea mediante
        el uso de los [argumentos nombrados](#functions.named-arguments),
        o mediante una llamada a [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol).







    eol


      El parámetro opcional eol define una secuencia de fin de línea personalizada.


**Advertencia**
When escape is set to anything other than an empty string
("") it can result in CSV that is not compliant with
[» RFC 4180](https://datatracker.ietf.org/doc/html/rfc4180) or unable to survive a roundtrip
through the PHP CSV functions. The default for escape is
"\\" so it is recommended to set it to the empty string explicitly.
The default value will change in a future version of PHP, no earlier than PHP 9.0.

**Nota**:

    Si un carácter enclosure está contenido en un campo,
    será escapado duplicándolo, a menos que esté inmediatamente precedido
    por un escape.

### Valores devueltos

Devuelve la longitud de la cadena escrita o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si
separator o enclosure
no tiene una longitud de un byte.

Genera una [ValueError](#class.valueerror) si
escape no tiene una longitud de un byte o es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Confiar en el valor por omisión de escape está ahora
        deprecado.




       8.1.0

        Se añadió el parámetro opcional eol.




       7.4.0

        El parámetro escape ahora acepta una cadena vacía para desactivar el mecanismo de escape propietario.





### Ejemplos

    **Ejemplo #1 Ejemplo con SplFileObject::fputcsv()**

&lt;?php

$list = array (
array('aaa', 'bbb', 'ccc', 'dddd'),
array('123', '456', '789'),
array('"aaa"', '"bbb"')
);

$file = new SplFileObject('file.csv', 'w');

foreach ($list as $fields) {
    $file-&gt;fputcsv($fields);
}

?&gt;

     El siguiente ejemplo escribirá la línea siguiente en el fichero
     file.csv:

aaa,bbb,ccc,dddd
123,456,789
"""aaa""","""bbb"""

### Ver también

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

# SplFileObject::fread

(PHP 5 &gt;= 5.5.11, PHP 7, PHP 8)

SplFileObject::fread — Leer un fichero

### Descripción

public **SplFileObject::fread**([int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)

Lee de un fichero el número de bytes dado.

### Parámetros

    length


      El número de bytes a leer.


### Valores devueltos

Devuelve el string léido desde el fichero o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fread()**

&lt;?php
// Pasar el contenido de un fichero a un string
$nombre_fichero = "/usr/local/something.txt";
$fichero = new SplFileObject($nombre_fichero, "r");
$contenido = $fichero-&gt;fread($fichero-&gt;getSize());
?&gt;

### Notas

**Nota**:

    Observe que **SplFileObject::fread()** lee desde la posición
    actual del puntero del fichero. Use [SplFileObject::ftell()](#splfileobject.ftell)
    para conocer la posición actual del puntero, y [SplFileObject::rewind()](#splfileobject.rewind)
    (o [SplFileObject::fseek()](#splfileobject.fseek)) para posicionar el puntero al inicio.

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

# SplFileObject::fscanf

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fscanf — Analiza la entrada de un fichero de acuerdo a un formato

### Descripción

public **SplFileObject::fscanf**([string](#language.types.string) $format, [mixed](#language.types.mixed) &amp;...$vars): [array](#language.types.array)|[int](#language.types.integer)|[null](#language.types.null)

Lee una línea de el fichero e interpreta este de acuerdo a el format.

Cualquier espacio en blanco en el format string coincide con cualquier espacio en blanco en la línea de
el fichero. Esto significa que incluso un (\t) en el formato string puede coincidir con un sólo caracter de
espacio en la secuencia de entrada.

### Parámetros

     format


       El formato interpretado para string se describe
       en la documentación de la [sprintf()](#function.sprintf) con las siguientes diferencias:



        -
         La función no tiene en cuenta el contexto local.


        -
         F, g, G y
         b no son soportados.


        -
         D representa un número decimal.


        -
         i representa un número entero con detección de base.


        -
         n representa el número de caracteres tratados hasta este punto.


        -
         s detiene la lectura en cada carácter de espacio.


        -
         * en lugar de argnum$ elimina
         la asignación de esta especificación de conversión.








     vars


       Los valores opcionales asignados.





### Valores devueltos

Si sólo se pasa un parámetro a este método, los valores analizados serán devueltos
como un array. De lo contrario, si se paran los parámetros opcionales, la función
devolverá el número de valores asignados. Los parámetros opcionales deben ser pasados
por referencia.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fscanf()**

&lt;?php
$file = new SplFileObject("usuarios.txt");
while ($usuarioinfo = $file-&gt;fscanf("%s %s %s")) {
    list ($nombre, $profesion, $codigopais) = $usuarioinfo;
// Operar con $name $profession $countrycode
}
?&gt;

    Contenido de usuarios.txt

javier argonaut pe
hiroshi sculptor jp
robert slacker us
luigi florist it

### Ver también

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

# SplFileObject::fseek

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fseek — Busca una posiciónn

### Descripción

public **SplFileObject::fseek**([int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_SET](#constant.seek-set)**): [int](#language.types.integer)

Mueve el puntero interno a una posición en el fichero medido en bytes
desde el principio de el fichero obtenido, añadiendo
offset a la posición especificada por
whence.

### Parámetros

     offset


       El índice. Un valor negativo puede ser utilizado para mover hacía atrás por el fichero que
       será útil cuando SEEK_END es usado como un valor de whence.






     whence


       Los valores de whence son:



        - **[SEEK_SET](#constant.seek-set)** - Establece la posición igual a offset bytes.

        - **[SEEK_CUR](#constant.seek-cur)** - Establece la posición a la ubicación actual más offset.

        - **[SEEK_END](#constant.seek-end)** - Establece la posición al final de el fichero más offset.




       Si no se especifica whence, se supone que es **[SEEK_SET](#constant.seek-set)**.





### Valores devueltos

Devuelve 0 si la búsqueda fué exitosa, -1 en caso contrario. Tenga en cuenta que
buscando un EOF pasado no se considera como un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fseek()**

&lt;?php
$file = new SplFileObject("algunfichero.txt");

// Leer la primera línea
$data = $file-&gt;fgets();

// Mover atrás a el principio de el fichero
// Igual que $file-&gt;rewind();
$file-&gt;fseek(0);
?&gt;

### Ver también

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

# SplFileObject::fstat

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fstat — Obtiene información de el fichero

### Descripción

public **SplFileObject::fstat**(): [array](#language.types.array)

Obtiene estadísticas de el fichero. Se comporta de forma idéntica a [fstat()](#function.fstat).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con las estadísticas de el fichero; el formato de el array
es descrito en detalle en la página del manual de [stat()](#function.stat).

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::fstat()**

&lt;?php
$file = new SplFileObject("/etc/passwd");
$stat = $file-&gt;fstat();

// Imprimir sólo la parte asociada
print_r(array_slice($stat, 13));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[dev] =&gt; 771
[ino] =&gt; 488704
[mode] =&gt; 33188
[nlink] =&gt; 1
[uid] =&gt; 0
[gid] =&gt; 0
[rdev] =&gt; 0
[size] =&gt; 1114
[atime] =&gt; 1061067181
[mtime] =&gt; 1056136526
[ctime] =&gt; 1056136526
[blksize] =&gt; 4096
[blocks] =&gt; 8
)

### Ver también

    - [fstat()](#function.fstat) - Lee las informaciones sobre un fichero a partir de un puntero de fichero

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# SplFileObject::ftell

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::ftell — Devuelve la posición del fichero actual

### Descripción

public **SplFileObject::ftell**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la posición de el puntero de fichero que representa el índice actual en el flujo del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la posición de el puntero de fichero como un integer, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::ftell()**

&lt;?php
$file = new SplFileObject("/etc/passwd");

// Lee la primera línea
$data = $file-&gt;fgets();

// ¿Dónde estamos?
echo $file-&gt;ftell();
?&gt;

### Ver también

    - [ftell()](#function.ftell) - Devuelve la posición actual del puntero de archivo

# SplFileObject::ftruncate

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::ftruncate — Trunca el archivo a una longitud dada

### Descripción

public **SplFileObject::ftruncate**([int](#language.types.integer) $size): [bool](#language.types.boolean)

Trunca el archivo a size bytes.

### Parámetros

     size


       El tamaño a truncar.



      **Nota**:



        Si size es más grande que el fichero este es extendido con bytes null.




        Si size es más pequeño que el archivo, los datos extra se perderán.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::ftruncate()**

&lt;?php
// Crea un fichero conteniendo "Hola Mundo!"
$file = new SplFileObject("/tmp/ftruncate", "w+");
$file-&gt;fwrite("Hola Mundo!");

// Truncar a 4 bytes
$file-&gt;ftruncate(4);

// Rebobina y leer los datos
$file-&gt;rewind();
echo $file-&gt;fgets();
?&gt;

    Resultado del ejemplo anterior es similar a:

Hola

### Ver también

    - [ftruncate()](#function.ftruncate) - Tronca un fichero

# SplFileObject::fwrite

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::fwrite — Escribe en el fichero

### Descripción

public **SplFileObject::fwrite**([string](#language.types.string) $data, [int](#language.types.integer) $length = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Escribe el contenido del argumento data
en el fichero.

### Parámetros

     data


       El [string](#language.types.string) a escribir en el fichero.






     length


       Si se proporciona el argumento length,
       la escritura se detendrá después de escribir length
       bytes o bien cuando se alcance el final de data; según
       lo que ocurra primero.





### Valores devueltos

Devuelve el número de bytes escritos, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Esta función devuelve ahora **[false](#constant.false)** en lugar de cero en caso de fallo.



### Ejemplos

    **Ejemplo #1 Ejemplo con SplFileObject::fwrite()**

&lt;?php
$file = new SplFileObject("fwrite.txt", "w");
$written = $file-&gt;fwrite("12345");
echo "$written bytes han sido escritos en el fichero";
?&gt;

    Resultado del ejemplo anterior es similar a:

5 bytes han sido escritos en el fichero

### Ver también

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# SplFileObject::getChildren

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::getChildren — Ningún propósito

### Descripción

public **SplFileObject::getChildren**(): [null](#language.types.null)

Una clase [SplFileObject](#class.splfileobject) no tiene hijos así que este método devolverá **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[null](#constant.null)**.

### Ver también

    - [RecursiveIterator::getChildren()](#recursiveiterator.getchildren) - Obtiene el iterador de la entrada actual

# SplFileObject::getCsvControl

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

SplFileObject::getCsvControl — Recupera las opciones para CSV

### Descripción

public **SplFileObject::getCsvControl**(): [array](#language.types.array)

Recupera el separador, carácter de escape así como el carácter
utilizado para rodear los campos durante un análisis CSV de los datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado que contiene el carácter utilizado para delimitar los
campos así como el utilizado para rodearlos y el carácter de escape.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        El carácter de espaciado puede ser ahora una cadena vacía.




       7.0.10

        Se añade el carácter de escape al array devuelto.





### Ejemplos

    **Ejemplo #1 Ejemplo con SplFileObject::getCsvControl()**

&lt;?php
$file = new SplFileObject("data.txt");
print_r($file-&gt;getCsvControl());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; ,
[1] =&gt; "
[2] =&gt; \
)

### Ver también

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

# SplFileObject::getCurrentLine

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileObject::getCurrentLine — Alias de [SplFileObject::fgets()](#splfileobject.fgets)

### Descripción

Este método es un alias de: [SplFileObject::fgets()](#splfileobject.fgets).

# SplFileObject::getFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::getFlags — Obtener las flags de SplFileObject

### Descripción

public **SplFileObject::getFlags**(): [int](#language.types.integer)

Obtiene las flags establecidas en una instancia de SplFileObject como un [int](#language.types.integer).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que representa las flags.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::getFlags()**

&lt;?php
$file = new SplFileObject(**FILE**, "r");

if ($file-&gt;getFlags() &amp; SplFileObject::SKIP_EMPTY) {
echo "Saltando líneas vacías\n";
} else {
echo "Sin saltar líneas vacías\n";
}

$file-&gt;setFlags(SplFileObject::SKIP_EMPTY);

if ($file-&gt;getFlags() &amp; SplFileObject::SKIP_EMPTY) {
echo "Saltando líneas vacías\n";
} else {
echo "Sin saltar líneas vacías\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Sin saltar líneas vacías
Saltando líneas vacías

### Ver también

    - [SplFileObject::setFlags()](#splfileobject.setflags) - Establece flags para el SplFileObject

# SplFileObject::getMaxLineLen

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::getMaxLineLen — Obtener la longitud máxima de línea

### Descripción

public **SplFileObject::getMaxLineLen**(): [int](#language.types.integer)

Obtiene la longitud máxima de línea establecida por [SplFileObject::setMaxLineLen()](#splfileobject.setmaxlinelen).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la longitud máxima de línea si ha sido establecido con
[SplFileObject::setMaxLineLen()](#splfileobject.setmaxlinelen), por omisión es 0.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::getMaxLineLen()**

&lt;?php
$file = new SplFileObject("fichero.txt");
var_dump($file-&gt;getMaxLineLen());

$file-&gt;setMaxLineLen(20);
var_dump($file-&gt;getMaxLineLen());
?&gt;

    Resultado del ejemplo anterior es similar a:

int(0)
int(20)

### Ver también

    - [SplFileObject::setMaxLineLen()](#splfileobject.setmaxlinelen) - Establecer la longitud máxima de una línea

# SplFileObject::hasChildren

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplFileObject::hasChildren — SplFileObject no tiene hijos

### Descripción

public **SplFileObject::hasChildren**(): [false](#language.types.singleton)

Una clase [SplFileObject](#class.splfileobject) no tiene hijos. Este método siempre devuelve **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[false](#constant.false)**

### Ver también

    - [RecursiveIterator::hasChildren()](#recursiveiterator.haschildren) - Verifica si un iterador puede ser creado desde la entrada actual

# SplFileObject::key

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::key — Obtiene el número de línea

### Descripción

public **SplFileObject::key**(): [int](#language.types.integer)

Obtener el número de línea.

**Nota**:

    Este nñumero puede no ser reflejado en la línea actual en el fichero
    si el método [SplFileObject::setMaxLineLen()](#splfileobject.setmaxlinelen) es usado para
    leer posiciones fijas de el fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de línea actual.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::key()**

&lt;?php
$file = new SplFileObject("lipsum.txt");
foreach ($file as $line) {
echo $file-&gt;key() . ". " . $line;
}
?&gt;

    Resultado del ejemplo anterior es similar a:

0. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
1. Duis nec sapien felis, ac sodales nisl.
2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

    **Ejemplo #2 SplFileObject::key()** ejemplo con [SplFileObject::setMaxLineLen()](#splfileobject.setmaxlinelen)

&lt;?php
$file = new SplFileObject("lipsum.txt");
$file-&gt;setMaxLineLen(20);
foreach ($file as $line) {
echo $file-&gt;key() . ". " . $line . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

0. Lorem ipsum dolor s
1. it amet, consectetu
2. r adipiscing elit.
3.

4. Duis nec sapien fel
5. is, ac sodales nisl
6. .

7. Lorem ipsum dolor s
8. it amet, consectetu
9. r adipiscing elit.

### Ver también

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - [SplFileObject::seek()](#splfileobject.seek) - Mueve el apuntador interno a la línea específicada

    - [SplFileObject::next()](#splfileobject.next) - Leer la siguiente línea

    - [SplFileObject::rewind()](#splfileobject.rewind) - Rebobina el fichero hasta la primera línea

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

# SplFileObject::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::next — Leer la siguiente línea

### Descripción

public **SplFileObject::next**(): [void](language.types.void.html)

Mover a la siguiente línea en el fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::next()**

&lt;?php
// Leer el fichero línea por línea
$file = new SplFileObject("variado.txt");
while (!$file-&gt;eof()) {
echo $file-&gt;current();
$file-&gt;next();
}
?&gt;

### Ver también

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - [SplFileObject::key()](#splfileobject.key) - Obtiene el número de línea

    - [SplFileObject::seek()](#splfileobject.seek) - Mueve el apuntador interno a la línea específicada

    - [SplFileObject::rewind()](#splfileobject.rewind) - Rebobina el fichero hasta la primera línea

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

# SplFileObject::rewind

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::rewind — Rebobina el fichero hasta la primera línea

### Descripción

public **SplFileObject::rewind**(): [void](language.types.void.html)

Rebobina el fichero hasta la primera línea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si no se puede rebobinar.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::rewind()**

&lt;?php
$file = new SplFileObject("variado.txt");

// Recorrer todo el fichero
foreach ($file as $line) { }

// Rebobinar hasta la primera línea
$file-&gt;rewind();

// Imprime la primera línea
echo $file-&gt;current();
?&gt;

### Ver también

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - [SplFileObject::key()](#splfileobject.key) - Obtiene el número de línea

    - [SplFileObject::seek()](#splfileobject.seek) - Mueve el apuntador interno a la línea específicada

    - [SplFileObject::next()](#splfileobject.next) - Leer la siguiente línea

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

# SplFileObject::seek

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::seek — Mueve el apuntador interno a la línea específicada

### Descripción

public **SplFileObject::seek**([int](#language.types.integer) $line): [void](language.types.void.html)

Mueve el apuntador interno a la línea específicada en el fichero.

### Parámetros

     line


       El número base cero a mover el apuntador interno.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [LogicException](#class.logicexception) si el parámetro
line_pos es negativo.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::seek()**


    Este ejemplo imprime la tercera línea de el script que se encuentra en la posición 2.

&lt;?php
$file = new SplFileObject(__FILE__);
$file-&gt;seek(2);
echo $file-&gt;current();
?&gt;

    Resultado del ejemplo anterior es similar a:

$file-&gt;seek(2);

### Ver también

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - [SplFileObject::key()](#splfileobject.key) - Obtiene el número de línea

    - [SplFileObject::next()](#splfileobject.next) - Leer la siguiente línea

    - [SplFileObject::rewind()](#splfileobject.rewind) - Rebobina el fichero hasta la primera línea

    - [SplFileObject::valid()](#splfileobject.valid) - Comprueba si el final del finchero ha sido alcanzado

# SplFileObject::setCsvControl

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

SplFileObject::setCsvControl — Define las opciones CSV

### Descripción

public **SplFileObject::setCsvControl**([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [void](language.types.void.html)

Define el delimitador, el carácter de escape y el carácter utilizado para encerrar
los campos CSV analizados.

### Parámetros

     separator


       El parámetro separator define el separador de campo.
       Debe tratarse de un carácter de un solo byte.






     enclosure


       El parámetro enclosure define el carácter de encierro de los campos.
       Debe tratarse de un carácter de un solo byte.






     escape


       El parámetro escape define el carácter de escape.
       Debe tratarse de un carácter de un solo byte o una cadena vacía.
       La cadena vacía ("") desactiva el mecanismo de escape propietario.



      **Nota**:

        Generalmente un carácter de encierro enclosure es
        escapado dentro de un campo duplicándolo;
        Sin embargo, el carácter de escape escape puede ser utilizado como alternativa.
        Por lo tanto, para los valores por omisión "" y \"
        tienen el mismo significado. Además de escapar el carácter de encierro enclosure
        el carácter de escape escape no tiene
        significado especial; ni siquiera para escapar a sí mismo.




      **Advertencia**

        A partir de PHP 8.4.0, el uso del valor por omisión de
        escape está deprecado.
        Debe ser proporcionado explícitamente ya sea por posición o mediante el uso
        de los [argumentos nombrados](#functions.named-arguments).






**Advertencia**
When escape is set to anything other than an empty string
("") it can result in CSV that is not compliant with
[» RFC 4180](https://datatracker.ietf.org/doc/html/rfc4180) or unable to survive a roundtrip
through the PHP CSV functions. The default for escape is
"\\" so it is recommended to set it to the empty string explicitly.
The default value will change in a future version of PHP, no earlier than PHP 9.0.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si
separator o enclosure
no tiene una longitud de un byte.

Genera una [ValueError](#class.valueerror) si
escape no tiene una longitud de un byte o es una cadena vacía.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Confiar en el valor por omisión de escape está ahora
        deprecado.




       7.4.0

        El argumento escape acepta ahora una cadena de
        caracteres vacía para desactivar el mecanismo de escape propietario.





### Ejemplos

    **Ejemplo #1 Ejemplo con SplFileObject::setCsvControl()**

&lt;?php
$file = new SplFileObject("data.csv");
$file-&gt;setFlags(SplFileObject::READ_CSV);
$file-&gt;setCsvControl('|');
foreach ($file as $row) {
    list ($fruit, $quantity) = $row;
// Operación sobre los datos
}
?&gt;

    Contenido de data.csv

&lt;?php
apples|20
bananas|14
cherries|87
?&gt;

### Ver también

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

# SplFileObject::setFlags

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::setFlags — Establece flags para el SplFileObject

### Descripción

public **SplFileObject::setFlags**([int](#language.types.integer) $flags): [void](language.types.void.html)

Establece las flags a ser usadas por el [SplFileObject](#class.splfileobject).

### Parámetros

     flags


       Bitmask de las flags a establecer. Véase las
       [Constantes SplFileObject](#splfileobject.constants)
       para una lista de flags disponibles.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::setFlags()**

&lt;?php
$file = new SplFileObject("datos.csv");
$file-&gt;setFlags(SplFileObject::READ_CSV);
foreach ($file as $fields) {
    var_dump($fields);
}
?&gt;

### Ver también

    - [SplFileObject::getFlags()](#splfileobject.getflags) - Obtener las flags de SplFileObject

# SplFileObject::setMaxLineLen

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::setMaxLineLen — Establecer la longitud máxima de una línea

### Descripción

public **SplFileObject::setMaxLineLen**([int](#language.types.integer) $maxLength): [void](language.types.void.html)

Establece la longitud máxima de una línea a ser leída.

### Parámetros

     maxLength


       La longitud de una línea.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una excepción [DomainException](#class.domainexception) cuando
maxLength es menor que cero.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::setMaxLineLen()**

&lt;?php
$file = new SplFileObject("lipsum.txt");
$file-&gt;setMaxLineLen(20);
foreach ($file as $line) {
echo $line . "\n";
}
?&gt;

    Contenido de lipsum.txt

Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Duis nec sapien felis, ac sodales nisl.
Nulla vitae magna vitae purus aliquet consequat.

    Resultado del ejemplo anterior es similar a:

Lorem ipsum dolor s
it amet, consectetu
r adipiscing elit.

Duis nec sapien fel
is, ac sodales nisl
.

Nulla vitae magna v
itae purus aliquet
consequat.

### Ver también

    - [SplFileObject::getMaxLineLen()](#splfileobject.getmaxlinelen) - Obtener la longitud máxima de línea

# SplFileObject::\_\_toString

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::\_\_toString — Retorna la línea actual como un string

### Descripción

public **SplFileObject::\_\_toString**(): [string](#language.types.string)

Este método retorna la línea actual como un string.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna la línea actual como un string.

### Historial de cambios

       Versión
       Descripción






       8.1.14, 8.2.1

        Cambiada de un alias de [SplFileObject::fgets()](#splfileobject.fgets)
        a una implementación de [SplFileObject::current()](#splfileobject.current)
        que retorna un string CSV cuando la opción
        **[SplFileObject::READ_CSV](#splfileobject.constants.read-csv)** está definida.




       7.2.19, 7.3.6

        Modificada de un alias de [SplFileObject::current()](#splfileobject.current)
        a un alias de [SplFileObject::fgets()](#splfileobject.fgets).





# SplFileObject::valid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SplFileObject::valid — Comprueba si el final del finchero ha sido alcanzado

### Descripción

public **SplFileObject::valid**(): [bool](#language.types.boolean)

Comprueba si el final del finchero ha sido alcanzado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el final no ha sido alcanzado, en caso contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplFileObject::valid()**

&lt;?php
// Recorrer el fichero, línea por línea
$file = new SplFileObject("fichero.txt");
while ($file-&gt;valid()) {
echo $file-&gt;fgets();
}
?&gt;

### Ver también

    - [SplFileObject::current()](#splfileobject.current) - Recupera la línea actual del fichero

    - [SplFileObject::key()](#splfileobject.key) - Obtiene el número de línea

    - [SplFileObject::seek()](#splfileobject.seek) - Mueve el apuntador interno a la línea específicada

    - [SplFileObject::next()](#splfileobject.next) - Leer la siguiente línea

    - [SplFileObject::rewind()](#splfileobject.rewind) - Rebobina el fichero hasta la primera línea

## Tabla de contenidos

- [SplFileObject::\_\_construct](#splfileobject.construct) — Construye un nuevo objeto de fichero
- [SplFileObject::current](#splfileobject.current) — Recupera la línea actual del fichero
- [SplFileObject::eof](#splfileobject.eof) — Comprueba si es el final del fichero
- [SplFileObject::fflush](#splfileobject.fflush) — Vuelca el resultado en el fichero
- [SplFileObject::fgetc](#splfileobject.fgetc) — Obtiene un caracter del fichero
- [SplFileObject::fgetcsv](#splfileobject.fgetcsv) — Recupera una línea del archivo y la analiza como datos CSV
- [SplFileObject::fgets](#splfileobject.fgets) — Obtener la línea de el fichero
- [SplFileObject::fgetss](#splfileobject.fgetss) — Obtiene la línea de el fichero y elimina etiquetas HTML
- [SplFileObject::flock](#splfileobject.flock) — Bloqueo de ficheros portable
- [SplFileObject::fpassthru](#splfileobject.fpassthru) — Imprimir todos los datos restantes en un apuntador de fichero
- [SplFileObject::fputcsv](#splfileobject.fputcsv) — Escribe un array en forma de línea CSV
- [SplFileObject::fread](#splfileobject.fread) — Leer un fichero
- [SplFileObject::fscanf](#splfileobject.fscanf) — Analiza la entrada de un fichero de acuerdo a un formato
- [SplFileObject::fseek](#splfileobject.fseek) — Busca una posiciónn
- [SplFileObject::fstat](#splfileobject.fstat) — Obtiene información de el fichero
- [SplFileObject::ftell](#splfileobject.ftell) — Devuelve la posición del fichero actual
- [SplFileObject::ftruncate](#splfileobject.ftruncate) — Trunca el archivo a una longitud dada
- [SplFileObject::fwrite](#splfileobject.fwrite) — Escribe en el fichero
- [SplFileObject::getChildren](#splfileobject.getchildren) — Ningún propósito
- [SplFileObject::getCsvControl](#splfileobject.getcsvcontrol) — Recupera las opciones para CSV
- [SplFileObject::getCurrentLine](#splfileobject.getcurrentline) — Alias de SplFileObject::fgets
- [SplFileObject::getFlags](#splfileobject.getflags) — Obtener las flags de SplFileObject
- [SplFileObject::getMaxLineLen](#splfileobject.getmaxlinelen) — Obtener la longitud máxima de línea
- [SplFileObject::hasChildren](#splfileobject.haschildren) — SplFileObject no tiene hijos
- [SplFileObject::key](#splfileobject.key) — Obtiene el número de línea
- [SplFileObject::next](#splfileobject.next) — Leer la siguiente línea
- [SplFileObject::rewind](#splfileobject.rewind) — Rebobina el fichero hasta la primera línea
- [SplFileObject::seek](#splfileobject.seek) — Mueve el apuntador interno a la línea específicada
- [SplFileObject::setCsvControl](#splfileobject.setcsvcontrol) — Define las opciones CSV
- [SplFileObject::setFlags](#splfileobject.setflags) — Establece flags para el SplFileObject
- [SplFileObject::setMaxLineLen](#splfileobject.setmaxlinelen) — Establecer la longitud máxima de una línea
- [SplFileObject::\_\_toString](#splfileobject.tostring) — Retorna la línea actual como un string
- [SplFileObject::valid](#splfileobject.valid) — Comprueba si el final del finchero ha sido alcanzado

# La clase SplTempFileObject

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

## Introducción

    La clase SplTempFileObject ofrece una interfaz orientada a objectos para ficheros temporales.

## Sinopsis de la Clase

     class **SplTempFileObject**



     extends
      [SplFileObject](#class.splfileobject)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [SplFileObject::DROP_NEW_LINE](#splfileobject.constants.drop-new-line);

public
const
[int](#language.types.integer)
[SplFileObject::READ_AHEAD](#splfileobject.constants.read-ahead);
public
const
[int](#language.types.integer)
[SplFileObject::SKIP_EMPTY](#splfileobject.constants.skip-empty);
public
const
[int](#language.types.integer)
[SplFileObject::READ_CSV](#splfileobject.constants.read-csv);

    /* Métodos */

public [\_\_construct](#spltempfileobject.construct)([int](#language.types.integer) $maxMemory = 2 _ 1024 _ 1024)

    /* Métodos heredados */
    public [SplFileObject::current](#splfileobject.current)(): [string](#language.types.string)|[array](#language.types.array)|[false](#language.types.singleton)

public [SplFileObject::eof](#splfileobject.eof)(): [bool](#language.types.boolean)
public [SplFileObject::fflush](#splfileobject.fflush)(): [bool](#language.types.boolean)
public [SplFileObject::fgetc](#splfileobject.fgetc)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileObject::fgetcsv](#splfileobject.fgetcsv)([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [array](#language.types.array)|[false](#language.types.singleton)
public [SplFileObject::fgets](#splfileobject.fgets)(): [string](#language.types.string)
public [SplFileObject::fgetss](#splfileobject.fgetss)([string](#language.types.string) $allowable_tags = ?): [string](#language.types.string)
public [SplFileObject::flock](#splfileobject.flock)([int](#language.types.integer) $operation, [int](#language.types.integer) &amp;$wouldBlock = **[null](#constant.null)**): [bool](#language.types.boolean)
public [SplFileObject::fpassthru](#splfileobject.fpassthru)(): [int](#language.types.integer)
public [SplFileObject::fputcsv](#splfileobject.fputcsv)(
    [array](#language.types.array) $fields,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\",
    [string](#language.types.string) $eol = "\n"
): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileObject::fread](#splfileobject.fread)([int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileObject::fscanf](#splfileobject.fscanf)([string](#language.types.string) $format, [mixed](#language.types.mixed) &amp;...$vars): [array](#language.types.array)|[int](#language.types.integer)|[null](#language.types.null)
public [SplFileObject::fseek](#splfileobject.fseek)([int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_SET](#constant.seek-set)**): [int](#language.types.integer)
public [SplFileObject::fstat](#splfileobject.fstat)(): [array](#language.types.array)
public [SplFileObject::ftell](#splfileobject.ftell)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileObject::ftruncate](#splfileobject.ftruncate)([int](#language.types.integer) $size): [bool](#language.types.boolean)
public [SplFileObject::fwrite](#splfileobject.fwrite)([string](#language.types.string) $data, [int](#language.types.integer) $length = 0): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileObject::getChildren](#splfileobject.getchildren)(): [null](#language.types.null)
public [SplFileObject::getCsvControl](#splfileobject.getcsvcontrol)(): [array](#language.types.array)
public [SplFileObject::getFlags](#splfileobject.getflags)(): [int](#language.types.integer)
public [SplFileObject::getMaxLineLen](#splfileobject.getmaxlinelen)(): [int](#language.types.integer)
public [SplFileObject::hasChildren](#splfileobject.haschildren)(): [false](#language.types.singleton)
public [SplFileObject::key](#splfileobject.key)(): [int](#language.types.integer)
public [SplFileObject::next](#splfileobject.next)(): [void](language.types.void.html)
public [SplFileObject::rewind](#splfileobject.rewind)(): [void](language.types.void.html)
public [SplFileObject::seek](#splfileobject.seek)([int](#language.types.integer) $line): [void](language.types.void.html)
public [SplFileObject::setCsvControl](#splfileobject.setcsvcontrol)([string](#language.types.string) $separator = ",", [string](#language.types.string) $enclosure = "\"", [string](#language.types.string) $escape = "\\"): [void](language.types.void.html)
public [SplFileObject::setFlags](#splfileobject.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)
public [SplFileObject::setMaxLineLen](#splfileobject.setmaxlinelen)([int](#language.types.integer) $maxLength): [void](language.types.void.html)
public [SplFileObject::\_\_toString](#splfileobject.tostring)(): [string](#language.types.string)
public [SplFileObject::valid](#splfileobject.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# SplTempFileObject::\_\_construct

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SplTempFileObject::\_\_construct — Construir un nuevo objeto de fichero temporal

### Descripción

public **SplTempFileObject::\_\_construct**([int](#language.types.integer) $maxMemory = 2 _ 1024 _ 1024)

Construir un nuevo objeto de fichero temporal.

### Parámetros

     maxMemory


       La cantidad máxima de memoria (en bytes, por omisión es 2 MB) para
       el fichero temporal a usar. Su el fichero temporal supera este tamaño,
       Este será movido a un archivo en el directorio temporal del sistema.




       Si maxMemory es negativo, se usará memoria.
       Si maxMemory es cero, no se usará memoria.





### Errores/Excepciones

Lanza una [RuntimeException](#class.runtimeexception) si un error ocurre.

### Ejemplos

    **Ejemplo #1 Ejemplo de SplTempFileObject()**


    Este ejemplo escribe un fichero temporal en la memoria mientras se puede escribir y leer en este.

&lt;?php
$temp = new SplTempFileObject();
$temp-&gt;fwrite("Esta es la primera línea\n");
$temp-&gt;fwrite("Y esta es la segunda.\n");
echo "Escrito " . $temp-&gt;ftell() . " bytes al fichero temporal.\n\n";

// Rebobina y lee lo que fué escrito
$temp-&gt;rewind();
foreach ($temp as $line) {
echo $line;
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Escrito 47 bytes al fichero temporal.

Esta es la primera línea
Y esta es la segunda.

### Ver también

    - [SplFileObject](#class.splfileobject)

    -
     [PHP input/output streams](#wrappers.php)
     (para php://temp y php://memory)

## Tabla de contenidos

- [SplTempFileObject::\_\_construct](#spltempfileobject.construct) — Construir un nuevo objeto de fichero temporal

# Funciones SPL

# class_implements

(PHP 5, PHP 7, PHP 8)

class_implements —
Devuelve las interfaces implementadas por una clase o interfaz dada

### Descripción

**class_implements**([object](#language.types.object)|[string](#language.types.string) $object_or_class, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve un array con los nombres de las
interfaces que la clase object_or_class
así como sus padres implementan.

### Parámetros

     object_or_class


       Un objeto (instancia) o una cadena de caracteres (nombre de la clase o de
       la interfaz).






     autoload


       Define si debe [autocargarse](#language.oop5.autoload)
       si no está ya autocargado.





### Valores devueltos

Un array en caso de éxito, o **[false](#constant.false)** cuando la clase dada no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con class_implements()**

&lt;?php

interface foo { }
class bar implements foo {}

print_r(class_implements(new bar));

// También se puede especificar el argumento como una cadena de caracteres
print_r(class_implements('bar'));

spl_autoload_register();

// Uso del autoloading para cargar la clase 'not_loaded'
print_r(class_implements('not_loaded', true));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[foo] =&gt; foo
)
Array
(
[foo] =&gt; foo
)
Array
(
[interface_de_non_chargée] =&gt; interface_de_non_chargée
)

### Notas

**Nota**:

    Es preferible utilizar [instanceof](#language.operators.type) o la función [is_a()](#function.is-a)
    para verificar que un objeto implementa una interfaz.

### Ver también

    - [class_parents()](#function.class-parents) - Devuelve las clases padres de una clase

    - [get_declared_interfaces()](#function.get-declared-interfaces) - Devuelve un array con todas las interfaces declaradas

    - [is_a()](#function.is-a) - Verifica si el objeto es de un cierto tipo o subtipo.

    - [instanceof](#language.operators.type)

# class_parents

(PHP 5, PHP 7, PHP 8)

class_parents —
Devuelve las clases padres de una clase

### Descripción

**class_parents**([object](#language.types.object)|[string](#language.types.string) $object_or_class, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

**class_parents()** devuelve un array con el
nombre de las clases padres de la clase object_or_class.

### Parámetros

     object_or_class


       Un objeto (instancia) o un string (nombre de la clase).






     autoload


       Define si debe [autocargarse](#language.oop5.autoload)
       si no está ya autocargado.





### Valores devueltos

Un array en caso de éxito, o **[false](#constant.false)** cuando la clase dada no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con class_parents()**

&lt;?php

class foo { }
class bar extends foo {}

print_r(class_parents(new bar));

// También puede especificarse el argumento como un string
print_r(class_parents('bar'));

spl_autoload_register();

// Uso del autoloading para cargar la clase 'not_loaded'
print_r(class_parents('not_loaded', true));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[foo] =&gt; foo
)
Array
(
[foo] =&gt; foo
)
Array
(
[parent_de_not_loaded] =&gt; parent_de_not_loaded
)

### Notas

**Nota**:

    Es preferible utilizar [instanceof](#language.operators.type) o la función [is_a()](#function.is-a)
    para verificar que un objeto implementa una interfaz.

### Ver también

    - [class_implements()](#function.class-implements) - Devuelve las interfaces implementadas por una clase o interfaz dada

    - [is_a()](#function.is-a) - Verifica si el objeto es de un cierto tipo o subtipo.

    - [instanceof](#language.operators.type)

# class_uses

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

class_uses —
Devuelve los traits utilizados por una clase dada.

### Descripción

**class_uses**([object](#language.types.object)|[string](#language.types.string) $object_or_class, [bool](#language.types.boolean) $autoload = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve un array representando los nombres de los traits que la clase dada
utiliza. Los traits de las clases padres no son representados.

### Parámetros

     object_or_class


       Un objeto o un nombre de clase en forma de string.






     autoload


       Define si debe [autocargarse](#language.oop5.autoload)
       si no está ya autocargado.





### Valores devueltos

Un array en caso de éxito, o **[false](#constant.false)** cuando la clase dada no existe.

### Ejemplos

    **Ejemplo #1 Ejemplos para class_uses()**

&lt;?php

trait foo { }
class bar {
use foo;
}

print_r(class_uses(new bar));

print_r(class_uses('bar'));

spl_autoload_register();

// Utilización del autoloading para cargar la clase 'not_loaded'
print_r(class_uses('not_loaded', true));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[foo] =&gt; foo
)
Array
(
[foo] =&gt; foo
)
Array
(
[trait_of_not_loaded] =&gt; trait_of_not_loaded
)

### Ver también

    - [class_parents()](#function.class-parents) - Devuelve las clases padres de una clase

    - [get_declared_traits()](#function.get-declared-traits) - Devuelve un array que contiene todos los traits declarados

# iterator_apply

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

iterator_apply — Llama a una función para todos los elementos de un iterador

### Descripción

**iterator_apply**([Traversable](#class.traversable) $iterator, [callable](#language.types.callable) $callback, [?](#language.types.null)[array](#language.types.array) $args = **[null](#constant.null)**): [int](#language.types.integer)

Llama a una función para todos los elementos de un iterador.

### Parámetros

     iterator


       El objeto iterador a iterar.






     callback


       La función de devolución de llamada a invocar para cada elemento.
       Esta función solo recibe los argumentos args proporcionados, por lo que es nullaria por defecto.
       Si count($args) === 3, por ejemplo, la función es ternaria.


**Nota**:

         La función debe devolver **[true](#constant.true)** para continuar
         iterando a través del iterador nombrado por el parámetro
         iterator.








     args


       Un array [array](#language.types.array) de argumentos; cada elemento de
       args se pasa a la función de devolución de llamada
       callback como argumento separado.





### Valores devueltos

Devuelve el número de iteraciones.

### Ejemplos

    **Ejemplo #1 Ejemplo con iterator_apply()**

&lt;?php
function print_caps(Iterator $iterator) {
    echo strtoupper($iterator-&gt;current()) . "\n";
return TRUE;
}

$it = new ArrayIterator(array("Apples", "Bananas", "Cherries"));
iterator_apply($it, "print_caps", array($it));
?&gt;

    El ejemplo anterior mostrará:

APPLES
BANANAS
CHERRIES

### Ver también

    - [array_walk()](#function.array-walk) - Ejecuta una función proporcionada por el usuario en cada uno de los elementos de un array

# iterator_count

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

iterator_count —
Cuenta el número de elementos en un iterador

### Descripción

**iterator_count**([Traversable](#class.traversable)|[array](#language.types.array) $iterator): [int](#language.types.integer)

Cuenta los elementos en un iterador.
No se garantiza que la función **iterator_count()**
conserve la posición actual del iterador iterator.

### Parámetros

     iterator


       El iterador del cual contar los elementos.





### Valores devueltos

El número de elementos en el iterador iterator.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       El tipo de iterator ha sido ampliado de
       [Traversable](#class.traversable) a
       [Traversable](#class.traversable)|[array](#language.types.array).



### Ejemplos

    **Ejemplo #1 Ejemplo con iterator_count()**

&lt;?php
$iterator = new ArrayIterator(array('recipe'=&gt;'crêpes', 'oeufs', 'lait', 'farine'));
var_dump(iterator_count($iterator));
?&gt;

    El ejemplo anterior mostrará:

int(4)

    **Ejemplo #2 Ejemplo con iterator_count()** que modifica la posición

&lt;?php
$iterator = new ArrayIterator(['one', 'two', 'three']);
var_dump($iterator-&gt;current());
var_dump(iterator_count($iterator));
var_dump($iterator-&gt;current());
?&gt;

    El ejemplo anterior mostrará:

string(3) "one"
int(3)
NULL

    **Ejemplo #3 Ejemplo con iterator_count()** en un ciclo [foreach](#control-structures.foreach)

&lt;?php
$iterator = new ArrayIterator(['one', 'two', 'three']);
foreach ($iterator as $key =&gt; $value) {
    echo "$key: $value (", iterator_count($iterator), ")\n";
}?&gt;

    El ejemplo anterior mostrará:

0: one (3)

# iterator_to_array

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

iterator_to_array —
Copia un iterador en un array

### Descripción

**iterator_to_array**([Traversable](#class.traversable)|[array](#language.types.array) $iterator, [bool](#language.types.boolean) $preserve_keys = **[true](#constant.true)**): [array](#language.types.array)

Copia los elementos de un iterador en un [array](#language.types.array).

### Parámetros

     iterator


       El iterador a copiar.






     preserve_keys


       Si se deben utilizar los elementos del iterador como clave.




       Si una clave es un [array](#language.types.array) o un
       [object](#language.types.object), se generará una advertencia. Las claves **[null](#constant.null)** serán
       convertidas en una cadena vacía, las claves de tipo [float](#language.types.float)
       serán truncadas a sus partes [int](#language.types.integer), las claves
       de tipo [resource](#language.types.resource) generarán una advertencia y serán convertidas
       en identificador de la recurso, y las claves de tipo [bool](#language.types.boolean)
       serán convertidas en enteros.



      **Nota**:



        Si este argumento no está definido o está definido en **[true](#constant.true)**, las claves duplicadas
        serán sobrescritas. El último valor con una clave dada estará en el
        [array](#language.types.array) devuelto. Definir este argumento en **[false](#constant.false)** para obtener
        todas las valores en todo caso.






### Valores devueltos

Un [array](#language.types.array) que contiene los elementos del iterador
iterator.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       El tipo de iterator ha sido ampliado de
       [Traversable](#class.traversable) a
       [Traversable](#class.traversable)|[array](#language.types.array).



### Ejemplos

    **Ejemplo #1 Ejemplo con iterator_to_array()**

&lt;?php
$iterator = new ArrayIterator(array('recipe'=&gt;'crêpes', 'oeufs', 'lait', 'farine'));
var_dump(iterator_to_array($iterator, true));
var_dump(iterator_to_array($iterator, false));
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["recipe"]=&gt;
string(7) "crêpes"
[0]=&gt;
string(5) "oeufs"
[1]=&gt;
string(4) "lait"
[2]=&gt;
string(6) "farine"
}
array(4) {
[0]=&gt;
string(7) "crêpes"
[1]=&gt;
string(5) "oeufs"
[2]=&gt;
string(4) "lait"
[3]=&gt;
string(6) "farine"
}

# spl_autoload

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload —
Implementación por defecto de \_\_autoload()

### Descripción

**spl_autoload**([string](#language.types.string) $class, [?](#language.types.null)[string](#language.types.string) $file_extensions = **[null](#constant.null)**): [void](language.types.void.html)

Esta función está prevista para ser utilizada como implementación por defecto
para [\_\_autoload()](#function.autoload). Si no se especifica nada más y que
[spl_autoload_register()](#function.spl-autoload-register) es llamado sin ningún parámetro,
entonces **spl_autoload()** será utilizada para todas las
futuras llamadas a [\_\_autoload()](#function.autoload).

### Parámetros

     class


       El nombre de la clase instanciada.
       Al llamar a la función, el nombre de la clase con su espacio de nombres es pasado al parámetro.
       El class no contendrá el carácter antislash inicial de un identificador completamente calificado.






     file_extensions


       Por omisión, la función verifica todos los [include_path](#ini.include-path) que
       podrían contener nombres de fichero añadidos por el
       nombre de clase, utilizando las extensiones .inc y .php.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una [LogicException](#class.logicexception) cuando la clase no es
encontrada, y no hay ningún otro autochargeur registrado.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        file_extensions ahora es nullable.





# spl_autoload_call

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload_call —
Intenta todas las funciones \_\_autoload() registradas para cargar la clase solicitada

### Descripción

**spl_autoload_call**([string](#language.types.string) $class): [void](language.types.void.html)

Esta función puede ser utilizada para buscar manualmente una clase,
una interfaz, un trait o una enumeración utilizando las funciones registradas \_\_autoload.

### Parámetros

     class


       El nombre de la clase buscada.





### Valores devueltos

No se retorna ningún valor.

# spl_autoload_extensions

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload_extensions —
Registra y devuelve la extensión de archivo por defecto para spl_autoload

### Descripción

**spl_autoload_extensions**([?](#language.types.null)[string](#language.types.string) $file_extensions = **[null](#constant.null)**): [string](#language.types.string)

Esta función puede modificar y verificar las extensiones de archivo para
[\_\_autoload()](#function.autoload) la función interna de respaldo que
[spl_autoload()](#function.spl-autoload) utilizará.

**Nota**:

      No debería haber espacios entre las extensiones de archivo definidas.

### Parámetros

     file_extensions


       Si **[null](#constant.null)**, simplemente devuelve la lista
       actual de extensiones, separadas por comas. Para modificar
       esta lista, llame simplemente a la función con la nueva lista
       de extensiones a utilizar en un [string](#language.types.string), donde cada extensión
       estará separada por comas.





### Valores devueltos

Una lista de extensiones de archivo, delimitadas por comas,
para [spl_autoload()](#function.spl-autoload).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        file_extensions ahora es nullable.





### Ejemplos

**Ejemplo #1 Ejemplo con spl_autoload_extensions()**

&lt;?php
spl_autoload_extensions(".php,.inc");
?&gt;

# spl_autoload_functions

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload_functions —
Devuelve todas las funciones \_\_autoload() registradas

### Descripción

**spl_autoload_functions**(): [array](#language.types.array)

Obtiene todas las funciones \_\_autoload() registradas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) que contiene todas las funciones \_\_autoload registradas.
Si no hay funciones registradas, o si la pila de autoload no está
activa, entonces el valor de retorno será un array vacío.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El valor de retorno ha sido actualizado para siempre ser un [array](#language.types.array);
       anteriormente, esta función devolvía **[false](#constant.false)** si la pila de autoload
       no estaba activa.



# spl_autoload_register

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload_register — Registra una función como implementación de \_\_autoload()

### Descripción

**spl_autoload_register**([?](#language.types.null)[callable](#language.types.callable) $callback = **[null](#constant.null)**, [bool](#language.types.boolean) $throw = **[true](#constant.true)**, [bool](#language.types.boolean) $prepend = **[false](#constant.false)**): [bool](#language.types.boolean)

**spl_autoload_register()** registra una función
en la pila [\_\_autoload()](#function.autoload) proporcionada. Si la pila
no está activa, se activa.

Si el código ya dispone de una función [\_\_autoload()](#function.autoload),
entonces esta función debe registrar explícitamente la pila **autoload.
Esto se debe a que **spl_autoload_register()**
reemplaza la caché del motor para la función
[**autoload()](#function.autoload) por [spl_autoload()](#function.spl-autoload) o
[spl_autoload_call()](#function.spl-autoload-call).

Si se deben utilizar múltiples funciones de autocarga,
la función **spl_autoload_register()** está diseñada para ello.
Crea una cola de funciones de autocarga y las ejecuta
una tras otra, en el orden en que fueron definidas.
A diferencia, la función [\_\_autoload()](#function.autoload) solo puede definirse una vez.

### Parámetros

     callback


       La función de autoload a registrar.
       Si es **[null](#constant.null)**, entonces se registrará la implementación
       por defecto de la función [spl_autoload()](#function.spl-autoload).




       callback([string](#language.types.string) $class): [void](language.types.void.html)


       El class no contendrá el backslash inicial
       de un identificador completamente cualificado.






     throw


       Este parámetro especifica si
       **spl_autoload_register()** debe lanzar
       excepciones cuando el callback
       no ha podido ser registrado.



      **Advertencia**

          Este parámetro es ignorado a partir de PHP 8.0.0, y se emitirá
          un aviso si se define como **[false](#constant.false)**. **spl_autoload_register()**
          siempre lanzará una [TypeError](#class.typeerror) con argumentos
          no válidos.







     prepend


       Si este parámetro vale **[true](#constant.true)**, **spl_autoload_register()**
       añadirá la función al principio de la pila del autoloader
       en lugar de añadirla al final de la pila.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        callback ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con spl_autoload_register()** como reemplazo de una función [__autoload()](#function.autoload)

&lt;?php

// function \_\_autoload($class) {
// include 'classes/' . $class . '.class.php';
// }

function my_autoloader($class) {
include 'classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

// O, utilizando una función anónima
spl_autoload_register(function ($class) {
include 'classes/' . $class . '.class.php';
});

?&gt;

    **Ejemplo #2 Ejemplo con spl_autoload_register()** donde la clase no es cargada

&lt;?php

namespace Foobar;

class Foo {
static public function test($class) {
print '[['. $class .']]';
}
}

spl_autoload_register(**NAMESPACE** .'\Foo::test');

new InexistentClass;

?&gt;

    Resultado del ejemplo anterior es similar a:

[[Foobar\InexistentClass]]
Fatal error: Class 'Foobar\InexistentClass' not found in ...

    **Ejemplo #3 El identificador será proporcionado sin el backslash inicial.**

&lt;?php

spl_autoload_register(static function ($class) {
    var_dump($class);
});

class_exists('RelativeName');
class_exists('RelativeName\\WithNamespace');
class_exists('\\AbsoluteName');
class_exists('\\AbsoluteName\\WithNamespace');

?&gt;

    El ejemplo anterior mostrará:

string(12) "RelativeName"
string(26) "RelativeName\WithNamespace"
string(12) "AbsoluteName"
string(26) "AbsoluteName\WithNamespace"

### Ver también

    - [__autoload()](#function.autoload) - Intenta cargar una clase sin definir

# spl_autoload_unregister

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

spl_autoload_unregister —
Elimina una función dada de la implementación \_\_autoload()

### Descripción

**spl_autoload_unregister**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Elimina una función de la pila autoload.
Si la pila está activa y vacía después de eliminar la función dada,
entonces será desactivada.

Cuando esta función activa una pila autoload,
todas las funciones \_\_autoload existentes no serán reactivadas.

### Parámetros

     callback


       La función autoload a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# spl_classes

(PHP 5, PHP 7, PHP 8)

spl_classes — Devuelve las clases SPL disponibles

### Descripción

**spl_classes**(): [array](#language.types.array)

Esta función devuelve un array con las clases SPL actualmente disponibles.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene las clases SPL actualmente disponibles.

### Ejemplos

    **Ejemplo #1 Ejemplo de spl_classes()**

&lt;?php

print_r(spl_classes());

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[ArrayObject] =&gt; ArrayObject
[ArrayIterator] =&gt; ArrayIterator
[CachingIterator] =&gt; CachingIterator
[RecursiveCachingIterator] =&gt; RecursiveCachingIterator
[DirectoryIterator] =&gt; DirectoryIterator
[FilterIterator] =&gt; FilterIterator
[LimitIterator] =&gt; LimitIterator
[ParentIterator] =&gt; ParentIterator
[RecursiveDirectoryIterator] =&gt; RecursiveDirectoryIterator
[RecursiveIterator] =&gt; RecursiveIterator
[RecursiveIteratorIterator] =&gt; RecursiveIteratorIterator
[SeekableIterator] =&gt; SeekableIterator
[SimpleXMLIterator] =&gt; SimpleXMLIterator
)

# spl_object_hash

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

spl_object_hash —
Devuelve el identificador de hash para un objeto dado

### Descripción

**spl_object_hash**([object](#language.types.object) $object): [string](#language.types.string)

Esta función devuelve un identificador único para el objeto. Este identificador
puede ser utilizado como clave de hash para almacenar los objetos o para identificarlos,
mientras el objeto no sea destruido. Una vez destruido el objeto,
el identificador puede ser reutilizado para otros objetos. Este comportamiento es similar al de la [spl_object_id()](#function.spl-object-id).

### Parámetros

     object


       Cualquier objeto.





### Valores devueltos

Un [string](#language.types.string) único para cada objeto existente y que
será siempre idéntico para cada objeto.

### Ejemplos

    **Ejemplo #1 Ejemplo con spl_object_hash()**

&lt;?php
$id = spl_object_hash($object);
$storage[$id] = $object;
?&gt;

### Notas

**Nota**:

    Cuando un objeto es destruido, su identificador de hash
    podrá ser reutilizado para otros objetos.

**Nota**:

    Los hash de objeto deben ser comparados por su identidad con ===
    y !==, ya que el hash devuelto podría ser
    una [cadena numérica](#language.types.numeric-strings).
    Por ejemplo: 0000000000000e600000000000000000.

### Ver también

    - [spl_object_id()](#function.spl-object-id) - Devuelve el gestor de objeto entero para un objeto dado

# spl_object_id

(PHP 7 &gt;= 7.2.0, PHP 8)

spl_object_id —
Devuelve el gestor de objeto entero para un objeto dado

### Descripción

**spl_object_id**([object](#language.types.object) $object): [int](#language.types.integer)

Esta función devuelve un identificador único para el objeto. El id del objeto
es único durante la vida del objeto. Una vez que el objeto es destruido,
su id puede ser reutilizado para otros objetos. Este comportamiento es similar a
[spl_object_hash()](#function.spl-object-hash).

### Parámetros

      object


        Cualquier objeto.






### Valores devueltos

Un identificador entero que es único para cada objeto actualmente existente
y siempre el mismo para cada objeto.

### Ejemplos

    **Ejemplo #1 Un ejemplo de spl_object_id()**

&lt;?php
$id = spl_object_id($object);
$storage[$id] = $object;
?&gt;

### Notas

**Nota**:

    Cuando un objeto es destruido, su id puede ser reutilizado para otros objetos.

## Tabla de contenidos

- [class_implements](#function.class-implements) — Devuelve las interfaces implementadas por una clase o interfaz dada
- [class_parents](#function.class-parents) — Devuelve las clases padres de una clase
- [class_uses](#function.class-uses) — Devuelve los traits utilizados por una clase dada.
- [iterator_apply](#function.iterator-apply) — Llama a una función para todos los elementos de un iterador
- [iterator_count](#function.iterator-count) — Cuenta el número de elementos en un iterador
- [iterator_to_array](#function.iterator-to-array) — Copia un iterador en un array
- [spl_autoload](#function.spl-autoload) — Implementación por defecto de \_\_autoload()
- [spl_autoload_call](#function.spl-autoload-call) — Intenta todas las funciones \_\_autoload() registradas para cargar la clase solicitada
- [spl_autoload_extensions](#function.spl-autoload-extensions) — Registra y devuelve la extensión de archivo por defecto para spl_autoload
- [spl_autoload_functions](#function.spl-autoload-functions) — Devuelve todas las funciones \_\_autoload() registradas
- [spl_autoload_register](#function.spl-autoload-register) — Registra una función como implementación de \_\_autoload()
- [spl_autoload_unregister](#function.spl-autoload-unregister) — Elimina una función dada de la implementación \_\_autoload()
- [spl_classes](#function.spl-classes) — Devuelve las clases SPL disponibles
- [spl_object_hash](#function.spl-object-hash) — Devuelve el identificador de hash para un objeto dado
- [spl_object_id](#function.spl-object-id) — Devuelve el gestor de objeto entero para un objeto dado

- [Interfaces](#spl.interfaces)<li>[OuterIterator](#class.outeriterator) — La interfaz OuterIterator
- [RecursiveIterator](#class.recursiveiterator) — La interfaz RecursiveIterator
- [SeekableIterator](#class.seekableiterator) — The SeekableIterator interface
- [SplObserver](#class.splobserver) — La interfaz SplObserver
- [SplSubject](#class.splsubject) — El interfaz SplSubject
  </li>- [Estructuras de datos](#spl.datastructures)<li>[SplDoublyLinkedList](#class.spldoublylinkedlist) — La clase SplDoublyLinkedList
- [SplStack](#class.splstack) — La clase SplStack
- [SplQueue](#class.splqueue) — La clase SplQueue
- [SplHeap](#class.splheap) — La clase SplHeap
- [SplMaxHeap](#class.splmaxheap) — La clase SplMaxHeap
- [SplMinHeap](#class.splminheap) — La clase SplMinHeap
- [SplPriorityQueue](#class.splpriorityqueue) — La clasa SplPriorityQueue
- [SplFixedArray](#class.splfixedarray) — La clase SplFixedArray
- [ArrayObject](#class.arrayobject) — La clase ArrayObject
- [SplObjectStorage](#class.splobjectstorage) — La clase SplObjectStorage
  </li>- [Excepciones](#spl.exceptions)<li>[BadFunctionCallException](#class.badfunctioncallexception) — La clase BadFunctionCallException
- [BadMethodCallException](#class.badmethodcallexception) — La clase BadMethodCallException
- [DomainException](#class.domainexception) — La clase DomainException
- [InvalidArgumentException](#class.invalidargumentexception) — The InvalidArgumentException class
- [LengthException](#class.lengthexception) — La clase LengthException
- [LogicException](#class.logicexception) — La clase LogicException
- [OutOfBoundsException](#class.outofboundsexception) — La clase OutOfBoundsException
- [OutOfRangeException](#class.outofrangeexception) — La clase OutOfRangeException
- [OverflowException](#class.overflowexception) — La clase OverflowException
- [RangeException](#class.rangeexception) — La clase RangeException
- [RuntimeException](#class.runtimeexception) — La clase RuntimeException
- [UnderflowException](#class.underflowexception) — La clase UnderflowException
- [UnexpectedValueException](#class.unexpectedvalueexception) — La clase UnexpectedValueException
  </li>- [Iteradores](#spl.iterators)<li>[AppendIterator](#class.appenditerator) — La clase AppendIterator
- [ArrayIterator](#class.arrayiterator) — La clase ArrayIterator
- [CachingIterator](#class.cachingiterator) — La clase CachingIterator
- [CallbackFilterIterator](#class.callbackfilteriterator) — La clase CallbackFilterIterator
- [DirectoryIterator](#class.directoryiterator) — La clase DirectoryIterator
- [EmptyIterator](#class.emptyiterator) — La clase EmptyIterator
- [FilesystemIterator](#class.filesystemiterator) — La clase FilesystemIterator
- [FilterIterator](#class.filteriterator) — La clase FilterIterator
- [GlobIterator](#class.globiterator) — La clase GlobIterator
- [InfiniteIterator](#class.infiniteiterator) — La clase InfiniteIterator
- [IteratorIterator](#class.iteratoriterator) — La clase IteratorIterator
- [LimitIterator](#class.limititerator) — La clase LimitIterator
- [MultipleIterator](#class.multipleiterator) — La clase MultipleIterator
- [NoRewindIterator](#class.norewinditerator) — La clase NoRewindIterator
- [ParentIterator](#class.parentiterator) — La clase ParentIterator
- [RecursiveArrayIterator](#class.recursivearrayiterator) — La clase RecursiveArrayIterator
- [RecursiveCachingIterator](#class.recursivecachingiterator) — La clase RecursiveCachingIterator
- [RecursiveCallbackFilterIterator](#class.recursivecallbackfilteriterator) — La clase RecursiveCallbackFilterIterator
- [RecursiveDirectoryIterator](#class.recursivedirectoryiterator) — La clase RecursiveDirectoryIterator
- [RecursiveFilterIterator](#class.recursivefilteriterator) — La clase RecursiveFilterIterator
- [RecursiveIteratorIterator](#class.recursiveiteratoriterator) — La clase RecursiveIteratorIterator
- [RecursiveRegexIterator](#class.recursiveregexiterator) — La clase RecursiveRegexIterator
- [RecursiveTreeIterator](#class.recursivetreeiterator) — La clase RecursiveTreeIterator
- [RegexIterator](#class.regexiterator) — La clase RegexIterator
  </li>- [File Handling](#spl.files)<li>[SplFileInfo](#class.splfileinfo) — La clase SplFileInfo
- [SplFileObject](#class.splfileobject) — La clase SplFileObject
- [SplTempFileObject](#class.spltempfileobject) — La clase SplTempFileObject
  </li>- [Funciones SPL](#ref.spl)<li>[class_implements](#function.class-implements) — Devuelve las interfaces implementadas por una clase o interfaz dada
- [class_parents](#function.class-parents) — Devuelve las clases padres de una clase
- [class_uses](#function.class-uses) — Devuelve los traits utilizados por una clase dada.
- [iterator_apply](#function.iterator-apply) — Llama a una función para todos los elementos de un iterador
- [iterator_count](#function.iterator-count) — Cuenta el número de elementos en un iterador
- [iterator_to_array](#function.iterator-to-array) — Copia un iterador en un array
- [spl_autoload](#function.spl-autoload) — Implementación por defecto de \_\_autoload()
- [spl_autoload_call](#function.spl-autoload-call) — Intenta todas las funciones \_\_autoload() registradas para cargar la clase solicitada
- [spl_autoload_extensions](#function.spl-autoload-extensions) — Registra y devuelve la extensión de archivo por defecto para spl_autoload
- [spl_autoload_functions](#function.spl-autoload-functions) — Devuelve todas las funciones \_\_autoload() registradas
- [spl_autoload_register](#function.spl-autoload-register) — Registra una función como implementación de \_\_autoload()
- [spl_autoload_unregister](#function.spl-autoload-unregister) — Elimina una función dada de la implementación \_\_autoload()
- [spl_classes](#function.spl-classes) — Devuelve las clases SPL disponibles
- [spl_object_hash](#function.spl-object-hash) — Devuelve el identificador de hash para un objeto dado
- [spl_object_id](#function.spl-object-id) — Devuelve el gestor de objeto entero para un objeto dado
  </li>
