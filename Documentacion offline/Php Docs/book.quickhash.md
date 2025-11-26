# Quickhash

# Introducción

La extensión Quickhash contiene un conjunto de clases específicas fuertemente tipadas
para tratar implementaciones específicas de arrays y hashes.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#quickhash.requirements)
- [Instalación](#quickhash.installation)

    ## Requerimientos

    Esta extensión requiere PHP 5.2.0 o superior.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/quickhash](https://pecl.php.net/package/quickhash)

# Ejemplos

**Ejemplo #1 Ejemplo de Quickhash**

&lt;?php
$set = new QuickHashIntSet( 1024, QuickHashIntSet::CHECK_FOR_DUPES );
$set-&gt;add( 1 );
$set-&gt;add( 3 );

var_dump( $set-&gt;exists( 3 ) );
var_dump( $set-&gt;exists( 4 ) );

$set-&gt;saveToFile( "/tmp/test-set.set" );

$newSet = QuickHashIntSet::loadFromFile(
"/tmp/test-set.set"
);

var_dump( $newSet-&gt;exists( 3 ) );
var_dump( $newSet-&gt;exists( 4 ) );
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)
bool(true)
bool(false)

**Ejemplo #2 Ejemplo de ArrayAccess Quickhash**

&lt;?php
$hash = new QuickHashIntHash( 64 );

// Añade y actualiza las entradas de hash.
$hash[3] = 145926;
$hash[3] = 1415926;
$hash[2] = 72;

// Verifica si las claves existen
var_dump( isset( $hash[3] ) );

// Elimina las entradas de hash
unset( $hash[2] );

// Recupera el valor almacenado para un hash
echo $hash[3], "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
1415926

**Ejemplo #3 Ejemplo de Iterator Quickhash**

&lt;?php
$hash = new QuickHashIntHash( 64 );

// Añade entradas de hash.
$hash[1] = 145926;
$hash[2] = 1415926;
$hash[3] = 72;
$hash[4] = 712314;
$hash[5] = -4234;

foreach( $hash as $key =&gt; $value )
{
echo $key, ' =&gt; ', $value, "\n";
}
?&gt;

Resultado del ejemplo anterior es similar a:

5 =&gt; -4234
4 =&gt; 712314
1 =&gt; 145926
2 =&gt; 1415926
3 =&gt; 72

**Ejemplo #4 Ejemplo de valor de string Quickhash**

&lt;?php
$hash = new QuickHashIntStringHash( 64 );

// Añade entradas de hash.
$hash[1] = "one million four hundred fifteen thousand nine hundred twenty six";
$hash-&gt;add( 2, "one more" );

foreach( $hash as $key =&gt; $value )
{
echo $key, ' =&gt; ', $value, "\n";
}
?&gt;

Resultado del ejemplo anterior es similar a:

1 =&gt; one million four hundred fifteen thousand nine hundred twenty six
2 =&gt; one more

# La clase QuickHashIntSet

(PECL quickhash &gt;= Unknown)

## Introducción

    Esta clase envuelve un conjunto que contiene números enteros.




    Los conjuntos pueden ser utilizados para almacenar valores únicos con [foreach](#control-structures.foreach) ya que la interfaz [Iterator](#class.iterator) está
    implementada. El orden en el que los elementos son devueltos no está
    garantizado.

## Sinopsis de la Clase

    ****




      class **QuickHashIntSet**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [CHECK_FOR_DUPES](#quickhashintset.constants.check-for-dupes) = 1;

    const
     [int](#language.types.integer)
      [DO_NOT_USE_ZEND_ALLOC](#quickhashintset.constants.do-not-use-zend-alloc) = 2;

    const
     [int](#language.types.integer)
      [HASHER_NO_HASH](#quickhashintset.constants.hasher-no-hash) = 256;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS1](#quickhashintset.constants.hasher-jenkins1) = 512;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS2](#quickhashintset.constants.hasher-jenkins2) = 1024;


    /* Métodos */

public [add](#quickhashintset.add)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [\_\_construct](#quickhashintset.construct)([int](#language.types.integer) $size, [int](#language.types.integer) $options = ?)
public [delete](#quickhashintset.delete)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [exists](#quickhashintset.exists)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public[getSize](#quickhashintset.getsize)(): [int](#language.types.integer)
public static [loadFromFile](#quickhashintset.loadfromfile)([string](#language.types.string) $filename, [int](#language.types.integer) $size = ?, [int](#language.types.integer) $options = ?): [QuickHashIntSet](#class.quickhashintset)
public static [loadFromString](#quickhashintset.loadfromstring)([string](#language.types.string) $contents, [int](#language.types.integer) $size = ?, [int](#language.types.integer) $options = ?): [QuickHashIntSet](#class.quickhashintset)
public [saveToFile](#quickhashintset.savetofile)([string](#language.types.string) $filename): [void](language.types.void.html)
public [saveToString](#quickhashintset.savetostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[QuickHashIntSet::CHECK_FOR_DUPES](#quickhashintset.constants.check-for-dupes)**

      Si está activado, la adición de elementos duplicados a un conjunto (a través de [QuickHashIntSet::add()](#quickhashintset.add) o
      [QuickHashIntSet::loadFromFile()](#quickhashintset.loadfromfile)) resultará en la eliminación de estos elementos del conjunto.
      Esto tomará más tiempo, por lo que solo se debe utilizar esta opción si es necesario.






     **[QuickHashIntSet::DO_NOT_USE_ZEND_ALLOC](#quickhashintset.constants.do-not-use-zend-alloc)**

      Desactiva el uso del gestor de memoria interno de PHP
      para las estructuras de juego internas. Con esta opción activada, las asignaciones internas no
      contarán para los parámetros [memory_limit](#ini.memory-limit).






     **[QuickHashIntSet::HASHER_NO_HASH](#quickhashintset.constants.hasher-no-hash)**

      Selecciona no utilizar una función de hash, sino simplemente
      utilizar un módulo para encontrar el índice de la lista de cubos. Esto no es más rápido que el hash normal, y
      da más colisiones.






     **[QuickHashIntSet::HASHER_JENKINS1](#quickhashintset.constants.hasher-jenkins1)**

      Esta es la función de hash por omisión para transformar los hash enteros
      en índice de lista de cubos.






     **[QuickHashIntSet::HASHER_JENKINS2](#quickhashintset.constants.hasher-jenkins2)**

      Selecciona un algoritmo de hash de variante.




# QuickHashIntSet::add

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::add — Este método añade una nueva entrada al conjunto

### Descripción

public **QuickHashIntSet::add**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método añade una nueva entrada al conjunto y devuelve si la entrada
ha sido añadida. Las entradas se añaden por omisión siempre que
**[QuickHashIntSet::CHECK_FOR_DUPES](#quickhashintset.constants.check-for-dupes)** no haya sido pasado durante la creación del conjunto.

### Parámetros

     key


       La clave de la entrada a añadir.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido añadida, y **[false](#constant.false)** si la entrada no ha sido añadida.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::add()**

&lt;?php
echo "sin verificación de duplicados\n";
$set = new QuickHashIntSet( 1024 );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );

echo "\ncon verificación de duplicados\n";
$set = new QuickHashIntSet( 1024, QuickHashIntSet::CHECK_FOR_DUPES );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

sin verificación de duplicados
bool(false)
bool(true)
bool(true)
bool(true)

con verificación de duplicados
bool(false)
bool(true)
bool(true)
bool(false)

# QuickHashIntSet::\_\_construct

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::\_\_construct — Crear un nuevo objeto QuickHashIntSet

### Descripción

public **QuickHashIntSet::\_\_construct**([int](#language.types.integer) $size, [int](#language.types.integer) $options = ?)

Este constructor crea un nuevo [QuickHashIntSet](#class.quickhashintset). El tamaño es el número de
listas de cubos a crear. Cuantas más listas haya, menos colisiones habrá.
Las opciones también son soportadas.

### Parámetros

     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se limita
       automáticamente de 4 a 4194304.






     options


       Las opciones que se pueden pasar son: **[QuickHashIntSet::CHECK_FOR_DUPES](#quickhashintset.constants.check-for-dupes)**,
       que asegura que ninguna entrada duplicada sea añadida al conjunto;
       **[QuickHashIntSet::DO_NOT_USE_ZEND_ALLOC](#quickhashintset.constants.do-not-use-zend-alloc)** para no utilizar el gestor de memoria
       interno de PHP así como una de las **[QuickHashIntSet::HASHER_NO_HASH](#quickhashintset.constants.hasher-no-hash)**,
       **[QuickHashIntSet::HASHER_JENKINS1](#quickhashintset.constants.hasher-jenkins1)** o **[QuickHashIntSet::HASHER_JENKINS2](#quickhashintset.constants.hasher-jenkins2)**.
       Estas tres últimas configuran el algoritmo de hash a utilizar. Todas las opciones
       pueden ser combinadas utilizando máscaras de bits.





### Valores devueltos

Devuelve un nuevo objeto [QuickHashIntSet](#class.quickhashintset).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::__construct()**

&lt;?php
var_dump( new QuickHashIntSet( 1024 ) );
var_dump( new QuickHashIntSet( 1024, QuickHashIntSet::CHECK_FOR_DUPES ) );
var_dump(
new QuickHashIntSet(
1024,
QuickHashIntSet::DO_NOT_USE_ZEND_ALLOC | QuickHashIntSet::HASHER_JENKINS2
)
);
?&gt;

# QuickHashIntSet::delete

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::delete — Este método elimina una entrada del conjunto

### Descripción

public **QuickHashIntSet::delete**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método elimina una entrada del conjunto y devuelve si la entrada
ha sido eliminada. Las estructuras de memoria asociadas no se liberarán
inmediatamente, sino cuando el conjunto mismo sea liberado.

### Parámetros

     key


       La clave de la entrada a eliminar.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido eliminada, y **[false](#constant.false)** si la entrada no ha sido eliminada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::delete()**

&lt;?php
$set = new QuickHashIntSet( 1024 );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
var_dump( $set-&gt;delete( 4 ) );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;delete( 4 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
bool(true)
bool(false)
bool(false)

# QuickHashIntSet::exists

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::exists — Este método verifica si una clave forma parte del conjunto

### Descripción

public **QuickHashIntSet::exists**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método verifica si una entrada con la clave proporcionada existe en el conjunto.

### Parámetros

     key


       La clave de la entrada a verificar si existe en el conjunto.





### Valores devueltos

Devuelve **[true](#constant.true)** cuando la entrada es encontrada, o **[false](#constant.false)** cuando la entrada no es encontrada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::exists()**

&lt;?php
//genera 200000 elementos
$array = range( 0, 199999 );
$existingEntries = array_rand( array_flip( $array ), 180000 );
$testForEntries = array_rand( array_flip( $array ), 1000 );
$foundCount = 0;

echo "Creando conjunto: ", microtime( true ), "\n";
$set = new QuickHashIntSet( 100000 );
echo "Añadiendo elementos: ", microtime( true ), "\n";
foreach( $existingEntries as $key )
{
$set-&gt;add( $key );
}

echo "Realizando 1000 pruebas: ", microtime( true ), "\n";
foreach( $testForEntries as $key )
{
$foundCount += $set-&gt;exists( $key );
}
echo "Hecho, $foundCount encontrados: ", microtime( true ), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

Creando conjunto: 1263588703.0748
Añadiendo elementos: 1263588703.0757
Realizando 1000 pruebas: 1263588703.7851
Hecho, 898 encontrados: 1263588703.7897

# QuickHashIntSet::getSize

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::getSize — Devuelve el número de elementos en el conjunto

### Descripción

public**QuickHashIntSet::getSize**(): [int](#language.types.integer)

Devuelve el número de elementos en el conjunto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de elementos en el conjunto.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::getSize()**

&lt;?php
$set = new QuickHashIntSet( 8 );
var_dump( $set-&gt;add( 2 ) );
var_dump( $set-&gt;add( 3 ) );
var_dump( $set-&gt;getSize() );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
int(2)

# QuickHashIntSet::loadFromFile

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::loadFromFile — Este método de fábrica crea un conjunto a partir de un fichero

### Descripción

public static **QuickHashIntSet::loadFromFile**([string](#language.types.string) $filename, [int](#language.types.integer) $size = ?, [int](#language.types.integer) $options = ?): [QuickHashIntSet](#class.quickhashintset)

Este método de fábrica crea un nuevo conjunto a partir de un fichero en disco. El
formato del fichero consiste en enteros de 32 bits con signo empaquetados juntos en
el orden de bytes que el sistema en el que se ejecuta el código utiliza.

### Parámetros

     filename


       El nombre del fichero desde el cual leer el conjunto.






     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se limita
       automáticamente de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción de tamaño
       es ignorada. Se calcula automáticamente para ser la misma que el número de
       entradas en el conjunto, redondeada a la potencia de dos más cercana con un
       límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo [QuickHashIntSet](#class.quickhashintset).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::loadFromFile()**

&lt;?php
$file = dirname( __FILE__ ) . "/simple.set";
$set = QuickHashIntSet::loadFromFile(
$file,
QuickHashIntSet::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$set-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntSet::loadFromString

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::loadFromString — Este método de fábrica crea un conjunto a partir de una string

### Descripción

public static **QuickHashIntSet::loadFromString**([string](#language.types.string) $contents, [int](#language.types.integer) $size = ?, [int](#language.types.integer) $options = ?): [QuickHashIntSet](#class.quickhashintset)

Este método de fábrica crea un nuevo conjunto a partir de una string.
El formato del fichero consiste en enteros de 32 bits con signo empaquetados juntos en
el orden de bytes que el sistema en el que se ejecuta el código utiliza.

### Parámetros

     contents


       La string que contiene un formato serializado del conjunto.






     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También está
       automáticamente limitado de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción de tamaño
       es ignorada. Se calcula automáticamente para ser el mismo que el número de
       entradas en el conjunto, redondeado a la potencia de dos más cercana
       con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo [QuickHashIntSet](#class.quickhashintset).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::loadFromString()**

&lt;?php
$contents = file_get_contents( dirname( __FILE__ ) . "/simple.set" );
$set = QuickHashIntSet::loadFromString(
$contents,
QuickHashIntSet::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$set-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntSet::saveToFile

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::saveToFile — Este método almacena un conjunto en memoria en disco

### Descripción

public **QuickHashIntSet::saveToFile**([string](#language.types.string) $filename): [void](language.types.void.html)

Este método almacena un conjunto existente en un fichero en disco, en el mismo formato
que [QuickHashIntSet::loadFromFile()](#quickhashintset.loadfromfile) puede leer.

### Parámetros

     filename


       El nombre del fichero en el cual almacenar el conjunto.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::saveToFile()**

&lt;?php
$set = new QuickHashIntSet( 1024 );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );

$set-&gt;saveToFile( '/tmp/test.set' );
?&gt;

# QuickHashIntSet::saveToString

(PECL quickhash &gt;= Unknown)

QuickHashIntSet::saveToString — Este método devuelve una versión serializada del conjunto

### Descripción

public **QuickHashIntSet::saveToString**(): [string](#language.types.string)

Este método devuelve una versión serializada del conjunto en el mismo formato que
[QuickHashIntSet::loadFromString()](#quickhashintset.loadfromstring) puede leer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve una string que contiene una versión serializada del conjunto.
Cada elemento se almacena como un valor de cuatro bytes en el orden de bytes que el
sistema actual utiliza.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntSet::saveToString()**

&lt;?php
$set = new QuickHashIntSet( 1024 );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );
var_dump( $set-&gt;exists( 4 ) );
var_dump( $set-&gt;add( 4 ) );

var_dump( $set-&gt;saveToString() );
?&gt;

## Tabla de contenidos

- [QuickHashIntSet::add](#quickhashintset.add) — Este método añade una nueva entrada al conjunto
- [QuickHashIntSet::\_\_construct](#quickhashintset.construct) — Crear un nuevo objeto QuickHashIntSet
- [QuickHashIntSet::delete](#quickhashintset.delete) — Este método elimina una entrada del conjunto
- [QuickHashIntSet::exists](#quickhashintset.exists) — Este método verifica si una clave forma parte del conjunto
- [QuickHashIntSet::getSize](#quickhashintset.getsize) — Devuelve el número de elementos en el conjunto
- [QuickHashIntSet::loadFromFile](#quickhashintset.loadfromfile) — Este método de fábrica crea un conjunto a partir de un fichero
- [QuickHashIntSet::loadFromString](#quickhashintset.loadfromstring) — Este método de fábrica crea un conjunto a partir de una string
- [QuickHashIntSet::saveToFile](#quickhashintset.savetofile) — Este método almacena un conjunto en memoria en disco
- [QuickHashIntSet::saveToString](#quickhashintset.savetostring) — Este método devuelve una versión serializada del conjunto

# La clase QuickHashIntHash

(PECL quickhash &gt;= Unknown)

## Introducción

    Esta clase envuelve un hash que contiene números enteros, donde los
    valores son también números enteros. Los hashes están disponibles como
    implementación de la interfaz [ArrayAccess](#class.arrayaccess).




    Los hashes pueden ser iterados con [foreach](#control-structures.foreach) ya que la interfaz [Iterator](#class.iterator) está
    también implementada. El orden en el que los elementos son devueltos no está
    garantizado.

## Sinopsis de la Clase

    ****




      class **QuickHashIntHash**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes) = 1;

    const
     [int](#language.types.integer)
      [DO_NOT_USE_ZEND_ALLOC](#quickhashinthash.constants.do-not-use-zend-alloc) = 2;

    const
     [int](#language.types.integer)
      [HASHER_NO_HASH](#quickhashinthash.constants.hasher-no-hash) = 256;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS1](#quickhashinthash.constants.hasher-jenkins1) = 512;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS2](#quickhashinthash.constants.hasher-jenkins2) = 1024;


    /* Métodos */

public [add](#quickhashinthash.add)([int](#language.types.integer) $key, [int](#language.types.integer) $value = ?): [bool](#language.types.boolean)
public [\_\_construct](#quickhashinthash.construct)([int](#language.types.integer) $size, [int](#language.types.integer) $options = ?)
public [delete](#quickhashinthash.delete)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [exists](#quickhashinthash.exists)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [get](#quickhashinthash.get)([int](#language.types.integer) $key): [int](#language.types.integer)
public [getSize](#quickhashinthash.getsize)(): [int](#language.types.integer)
public static [loadFromFile](#quickhashinthash.loadfromfile)([string](#language.types.string) $filename, [int](#language.types.integer) $options = ?): [QuickHashIntHash](#class.quickhashinthash)
public static [loadFromString](#quickhashinthash.loadfromstring)([string](#language.types.string) $contents, [int](#language.types.integer) $options = ?): [QuickHashIntHash](#class.quickhashinthash)
public [saveToFile](#quickhashinthash.savetofile)([string](#language.types.string) $filename): [void](language.types.void.html)
public [saveToString](#quickhashinthash.savetostring)(): [string](#language.types.string)
public [set](#quickhashinthash.set)([int](#language.types.integer) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)
public [update](#quickhashinthash.update)([int](#language.types.integer) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[QuickHashIntHash::CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes)**

      Si está activado, la adición de elementos duplicados a un hash (vía [QuickHashIntHash::add()](#quickhashinthash.add) o
      [QuickHashIntHash::loadFromFile()](#quickhashinthash.loadfromfile)) resultará en la eliminación de estos elementos del
      hash. Esto tomará más tiempo, por lo que úselo solo si es necesario.






     **[QuickHashIntHash::DO_NOT_USE_ZEND_ALLOC](#quickhashinthash.constants.do-not-use-zend-alloc)**

      Desactiva el uso del gestor de memoria interno de PHP para las estructuras de juego internas.
      Con esta opción activada, las asignaciones internas no contarán en
      los parámetros [memory_limit](#ini.memory-limit).






     **[QuickHashIntHash::HASHER_NO_HASH](#quickhashinthash.constants.hasher-no-hash)**

      Selecciona no usar una función de hash, sino simplemente usar un módulo para encontrar el índice de la lista de cubos. Esto no es más rápido que el hash normal, y
      da más colisiones.






     **[QuickHashIntHash::HASHER_JENKINS1](#quickhashinthash.constants.hasher-jenkins1)**

      Esta es la función de hash por defecto para transformar los hashes enteros
      en índice de lista de cubos.






     **[QuickHashIntHash::HASHER_JENKINS2](#quickhashinthash.constants.hasher-jenkins2)**

      Selecciona un algoritmo de hash de variante.




# QuickHashIntHash::add

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::add — Este método añade una nueva entrada al hash

### Descripción

public **QuickHashIntHash::add**([int](#language.types.integer) $key, [int](#language.types.integer) $value = ?): [bool](#language.types.boolean)

Este método añade una nueva entrada al hash y devuelve si la entrada ha sido
añadida. Las entradas se añaden por omisión siempre que
**[QuickHashIntHash::CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes)** no haya sido pasado durante la creación del hash.

### Parámetros

     key


       La clave de la entrada a añadir.






     value


       El valor opcional de la entrada a añadir. Si no se especifica ningún valor,
       1 será utilizado.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido añadida, y **[false](#constant.false)** si la entrada no ha sido añadida.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::add()**

&lt;?php
echo "sin verificación de duplicados\n";
$hash = new QuickHashIntHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, 22 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, 12 ) );

echo "\ncon verificación de duplicados\n";
$hash = new QuickHashIntHash( 1024, QuickHashIntHash::CHECK_FOR_DUPES );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, 78 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, 9 ) );

echo "\nvalor por omisión\n";
var_dump( $hash-&gt;add( 5 ) );
var_dump( $hash-&gt;get( 5 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

sin verificación de duplicados
bool(false)
bool(false)
bool(true)
bool(true)
int(22)
bool(true)

con verificación de duplicados
bool(false)
bool(false)
bool(true)
bool(true)
int(78)
bool(false)

valor por omisión
bool(true)
int(1)

# QuickHashIntHash::\_\_construct

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::\_\_construct — Crear un nuevo objeto QuickHashIntHash

### Descripción

public **QuickHashIntHash::\_\_construct**([int](#language.types.integer) $size, [int](#language.types.integer) $options = ?)

Este constructor crea un nuevo objeto [QuickHashIntHash](#class.quickhashinthash). El tamaño es el número de
listas de cubos a crear. Cuantas más listas haya, menos colisiones se tendrán.
Las opciones también son soportadas.

### Parámetros

     size


       La cantidad de listas de cubos a configurar. El número que se pase será
       automáticamente redondeado a la siguiente potencia de dos. También se
       limita automáticamente de 64 a 4194304.






     options


       Las opciones que se pueden pasar son: **[QuickHashIntHash::CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes)**,
       que asegura que ninguna entrada duplicada sea añadida al hash;
       **[QuickHashIntHash::DO_NOT_USE_ZEND_ALLOC](#quickhashinthash.constants.do-not-use-zend-alloc)** para no utilizar el gestor de memoria interno de PHP
       así como una de las **[QuickHashIntHash::HASHER_NO_HASH](#quickhashinthash.constants.hasher-no-hash)**,
       **[QuickHashIntHash::HASHER_JENKINS1](#quickhashinthash.constants.hasher-jenkins1)** o **[QuickHashIntHash::HASHER_JENKINS2](#quickhashinthash.constants.hasher-jenkins2)**.
       Estas tres últimas configuran el algoritmo de hash a utilizar. Todas las opciones
       pueden ser combinadas utilizando máscaras de bits.





### Valores devueltos

Devuelve un nuevo objeto [QuickHashIntHash](#class.quickhashinthash).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::__construct()**

&lt;?php
var_dump( new QuickHashIntHash( 1024 ) );
var_dump( new QuickHashIntHash( 1024, QuickHashIntHash::CHECK_FOR_DUPES ) );
var_dump(
new QuickHashIntHash(
1024,
QuickHashIntHash::DO_NOT_USE_ZEND_ALLOC | QuickHashIntHash::HASHER_JENKINS2
)
);
?&gt;

# QuickHashIntHash::delete

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::delete — Este método elimina una entrada del hash

### Descripción

public **QuickHashIntHash::delete**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método elimina una entrada del hash y devuelve si la entrada ha sido
eliminada. Las estructuras de memoria asociadas no se liberarán inmediatamente,
sino cuando el hash mismo es liberado.

Los elementos no pueden ser eliminados cuando el hash está siendo utilizado en un iterador. El
método no lanzará una excepción, sino que simplemente devolverá **[false](#constant.false)** como ocurriría con cualquier otro fallo de eliminación.

### Parámetros

     key


       La clave de la entrada a eliminar.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido eliminada, y **[false](#constant.false)** si la entrada no ha sido eliminada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::delete()**

&lt;?php
$hash = new QuickHashIntHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, 5 ) );
var_dump( $hash-&gt;delete( 4 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;delete( 4 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
bool(true)
bool(false)
bool(false)

# QuickHashIntHash::exists

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::exists — Este método verifica si una clave forma parte del hash

### Descripción

public **QuickHashIntHash::exists**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método verifica si una entrada con la clave proporcionada existe en el
hash.

### Parámetros

     key


       La clave de la entrada a verificar si existe en el hash.





### Valores devueltos

Devuelve **[true](#constant.true)** cuando la entrada es encontrada, o **[false](#constant.false)** cuando la entrada no es
encontrada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::exists()**

&lt;?php
//genera 200000 elementos
$array = range( 0, 199999 );
$existingEntries = array_rand( array_flip( $array ), 180000 );
$testForEntries = array_rand( array_flip( $array ), 1000 );
$foundCount = 0;

echo "Creando hash: ", microtime( true ), "\n";
$hash = new QuickHashIntHash( 100000 );
echo "Añadiendo elementos: ", microtime( true ), "\n";
foreach( $existingEntries as $key )
{
$hash-&gt;add( $key, 56 );
}

echo "Realizando 1000 pruebas: ", microtime( true ), "\n";
foreach( $testForEntries as $key )
{
$foundCount += $hash-&gt;exists( $key );
}
echo "Hecho, $foundCount encontrados: ", microtime( true ), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

Creando hash: 1263588703.0748
Añadiendo elementos: 1263588703.0757
Realizando 1000 pruebas: 1263588703.7851
Hecho, 898 encontrados: 1263588703.7897

# QuickHashIntHash::get

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::get — Este método recupera un valor del hash por su clave

### Descripción

public **QuickHashIntHash::get**([int](#language.types.integer) $key): [int](#language.types.integer)

Este método recupera un valor del hash por su clave.

### Parámetros

     key


       La clave de la entrada a recuperar.





### Valores devueltos

El valor si la clave existe, o **[null](#constant.null)** si la clave no era parte del hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::get()**

&lt;?php
$hash = new QuickHashIntHash( 8 );
var_dump( $hash-&gt;get( 1 ) );

var_dump( $hash-&gt;add( 2 ) );
var_dump( $hash-&gt;get( 2 ) );

var_dump( $hash-&gt;add( 3, 5 ) );
var_dump( $hash-&gt;get( 3 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
int(1)
bool(true)
int(5)

# QuickHashIntHash::getSize

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::getSize — Devuelve el número de elementos en el hash

### Descripción

public **QuickHashIntHash::getSize**(): [int](#language.types.integer)

Devuelve el número de elementos en el hash.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de elementos en el hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::getSize()**

&lt;?php
$hash = new QuickHashIntHash( 8 );
var_dump( $hash-&gt;add( 2 ) );
var_dump( $hash-&gt;add( 3, 5 ) );
var_dump( $hash-&gt;getSize() );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
int(2)

# QuickHashIntHash::loadFromFile

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::loadFromFile — Este método de fábrica crea un hash a partir de un fichero

### Descripción

public static **QuickHashIntHash::loadFromFile**([string](#language.types.string) $filename, [int](#language.types.integer) $options = ?): [QuickHashIntHash](#class.quickhashinthash)

Este método de fábrica crea un nuevo hash a partir de un fichero de definición en disco. El
formato de fichero consiste en una firma 'QH\0x11\0', el número de elementos como
un entero de 32 bits con signo en Endianness de sistema, seguido de enteros de 32 bits con signo empaquetados juntos
en el Endianness que el sistema en el que se ejecuta el código utiliza. Para cada elemento de hash, hay dos enteros de 32 bits con signo
almacenados. El primero de cada elemento es la clave, y el segundo es el valor
perteneciente a la clave. Un ejemplo podría ser:

    **Ejemplo #1 Formato de fichero QuickHash IntHash**


    00000000  51 48 11 00 02 00 00 00  01 00 00 00 01 00 00 00  |QH..............|

00000010 03 00 00 00 09 00 00 00 |........|
00000018

    **Ejemplo #2 Formato de fichero QuickHash IntHash**


    firma de encabezado ('QH'; tipo de clave: 1; tipo de valor: 1; relleno: \0x00)

00000000 51 48 11 00

número de elementos:
00000004 02 00 00 00

cadena de datos:
00000000 01 00 00 00 01 00 00 00 03 00 00 00 09 00 00 00

clave/valor 1 (clave = 1, valor = 1)
01 00 00 00 01 00 00 00

clave/valor 2 (clave = 3, valor = 9)
03 00 00 00 09 00 00 00

### Parámetros

     filename


       El nombre del fichero desde el cual leer el hash.






     options


       Las mismas opciones que el constructor de la clase; con la excepción de la opción
       size que es ignorada. Se calcula automáticamente para ser la misma que el
       número de entradas en el hash, redondeada a la potencia de dos más cercana
       con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo [QuickHashIntHash](#class.quickhashinthash).

### Ejemplos

    **Ejemplo #3 Ejemplo de QuickHashIntHash::loadFromFile()**

&lt;?php
$file = dirname( __FILE__ ) . "/simple.hash";
$hash = QuickHashIntHash::loadFromFile(
$file,
QuickHashIntHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$hash-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntHash::loadFromString

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::loadFromString — Este método de fábrica crea un hash a partir de una string

### Descripción

public static **QuickHashIntHash::loadFromString**([string](#language.types.string) $contents, [int](#language.types.integer) $options = ?): [QuickHashIntHash](#class.quickhashinthash)

Este método de fábrica crea un nuevo hash a partir de una definición en una string. El
formato de fichero consiste en enteros de 32 bits con signo empaquetados juntos en el Endianness que el sistema
en el que se ejecuta el código utiliza. Para cada elemento de hash, hay dos enteros de 32 bits con signo
almacenados juntos. El primero de cada elemento es la clave, y el segundo es el valor perteneciente a la clave.

### Parámetros

     contents


       La string que contiene un formato serializado del hash.






     options


       Las mismas opciones que el constructor de la clase; con la excepción de la opción
       size que es ignorada. Se calcula automáticamente para ser la misma que el
       número de entradas en el hash, redondeada a la potencia de dos más cercana
       con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo [QuickHashIntHash](#class.quickhashinthash).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::loadFromString()**

&lt;?php
$contents = file_get_contents( dirname( __FILE__ ) . "/simple.hash" );
$hash = QuickHashIntHash::loadFromString(
$contents,
QuickHashIntHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$hash-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntHash::saveToFile

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::saveToFile — Este método almacena un hash en memoria en disco

### Descripción

public **QuickHashIntHash::saveToFile**([string](#language.types.string) $filename): [void](language.types.void.html)

Este método almacena un hash existente en un fichero en disco, en el mismo formato
que [QuickHashIntHash::loadFromFile()](#quickhashinthash.loadfromfile) puede leer.

### Parámetros

     filename


       El nombre del fichero en el cual almacenar el hash.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::saveToFile()**

&lt;?php
$hash = new QuickHashIntHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, 43 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, 52 ) );

$hash-&gt;saveToFile( '/tmp/test.hash' );
?&gt;

# QuickHashIntHash::saveToString

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::saveToString — Este método devuelve una versión serializada del hash

### Descripción

public **QuickHashIntHash::saveToString**(): [string](#language.types.string)

Este método devuelve una versión serializada del hash en el mismo formato que
[QuickHashIntHash::loadFromString()](#quickhashinthash.loadfromstring) puede leer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve una string que contiene una versión serializada del hash.
Cada elemento se almacena como un valor de cuatro bytes en el Endianness que
el sistema actual utiliza.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::saveToString()**

&lt;?php
$hash = new QuickHashIntHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, 34 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, 55 ) );

var_dump( $hash-&gt;saveToString() );
?&gt;

# QuickHashIntHash::set

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::set — Este método actualiza una entrada en el hash con un nuevo valor, o
añade una nueva entrada si la entrada no existe

### Descripción

public **QuickHashIntHash::set**([int](#language.types.integer) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Este método intenta actualizar una entrada con un nuevo valor. Si la entrada
no existía, añadirá una nueva entrada. Devuelve si la entrada ha sido
añadida o actualizada. Si hay claves duplicadas, solo el primer
elemento encontrado será actualizado. Utilice
**[QuickHashIntHash::CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes)** al crear el hash para evitar que las claves duplicadas
formen parte del hash.

### Parámetros

     key


       La clave de la entrada a añadir o actualizar.






     value


       El nuevo valor para actualizar la entrada.





### Valores devueltos

2 si la entrada ha sido encontrada y actualizada, 1 si la entrada ha sido nuevamente añadida o 0
si ha habido un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::set()**

&lt;?php
$hash = new QuickHashIntHash( 1024 );

echo "Set-&gt;Add\n";
var_dump( $hash-&gt;get( 46692 ) );
var_dump( $hash-&gt;set( 46692, 16091 ) );
var_dump( $hash-&gt;get( 46692 ) );

echo "Set-&gt;Update\n";
var_dump( $hash-&gt;set( 46692, 29906 ) );
var_dump( $hash-&gt;get( 46692 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
int(2)
int(16091)
Set-&gt;Update
int(1)
int(29906)

# QuickHashIntHash::update

(PECL quickhash &gt;= Unknown)

QuickHashIntHash::update — Este método actualiza una entrada en el hash con un nuevo valor

### Descripción

public **QuickHashIntHash::update**([int](#language.types.integer) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Este método actualiza una entrada con un nuevo valor y devuelve si la entrada ha sido actualizada. Si hay claves duplicadas, solo el primer elemento encontrado será actualizado. Utilice **[QuickHashIntHash::CHECK_FOR_DUPES](#quickhashinthash.constants.check-for-dupes)** al crear el hash para evitar que las claves duplicadas formen parte del hash.

### Parámetros

     key


       La clave de la entrada a actualizar.






     value


       El nuevo valor para actualizar la entrada.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido encontrada y actualizada, y **[false](#constant.false)** si la entrada no estaba ya presente en el hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntHash::update()**

&lt;?php
$hash = new QuickHashIntHash( 1024 );

var_dump( $hash-&gt;add( 141421, 173205 ) );
var_dump( $hash-&gt;update( 141421, 223606 ) );
var_dump( $hash-&gt;get( 141421 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
int(223606)

## Tabla de contenidos

- [QuickHashIntHash::add](#quickhashinthash.add) — Este método añade una nueva entrada al hash
- [QuickHashIntHash::\_\_construct](#quickhashinthash.construct) — Crear un nuevo objeto QuickHashIntHash
- [QuickHashIntHash::delete](#quickhashinthash.delete) — Este método elimina una entrada del hash
- [QuickHashIntHash::exists](#quickhashinthash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashIntHash::get](#quickhashinthash.get) — Este método recupera un valor del hash por su clave
- [QuickHashIntHash::getSize](#quickhashinthash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashIntHash::loadFromFile](#quickhashinthash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashIntHash::loadFromString](#quickhashinthash.loadfromstring) — Este método de fábrica crea un hash a partir de una string
- [QuickHashIntHash::saveToFile](#quickhashinthash.savetofile) — Este método almacena un hash en memoria en disco
- [QuickHashIntHash::saveToString](#quickhashinthash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashIntHash::set](#quickhashinthash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashIntHash::update](#quickhashinthash.update) — Este método actualiza una entrada en el hash con un nuevo valor

# La clase QuickHashStringIntHash

(No version information available, might only be in Git)

## Introducción

    Esta clase envuelve un hash que contiene strings, donde los valores son enteros. Los hashes también están disponibles como una implementación de la interfaz [ArrayAccess](#class.arrayaccess).




    Los hashes también pueden ser recorridos con [foreach](#control-structures.foreach) ya que la interfaz [Iterator](#class.iterator) está implementada. El orden en el que los elementos son devueltos no está garantizado.

## Sinopsis de la Clase

    ****




      class **QuickHashStringIntHash**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [CHECK_FOR_DUPES](#quickhashstringinthash.constants.check-for-dupes) = 1;

    const
     [int](#language.types.integer)
      [DO_NOT_USE_ZEND_ALLOC](#quickhashstringinthash.constants.do-not-use-zend-alloc) = 2;


    /* Métodos */

public [add](#quickhashstringinthash.add)([string](#language.types.string) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)
public [\_\_construct](#quickhashstringinthash.construct)([int](#language.types.integer) $size, [int](#language.types.integer) $options = 0)
public [delete](#quickhashstringinthash.delete)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [exists](#quickhashstringinthash.exists)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [get](#quickhashstringinthash.get)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [getSize](#quickhashstringinthash.getsize)(): [int](#language.types.integer)
public static [loadFromFile](#quickhashstringinthash.loadfromfile)([string](#language.types.string) $filename, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashStringIntHash](#class.quickhashstringinthash)
public static [loadFromString](#quickhashstringinthash.loadfromstring)([string](#language.types.string) $contents, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashStringIntHash](#class.quickhashstringinthash)
public [saveToFile](#quickhashstringinthash.savetofile)([string](#language.types.string) $filename): [void](language.types.void.html)
public [saveToString](#quickhashstringinthash.savetostring)(): [string](#language.types.string)
public [set](#quickhashstringinthash.set)([string](#language.types.string) $key, [int](#language.types.integer) $value): [int](#language.types.integer)
public [update](#quickhashstringinthash.update)([string](#language.types.string) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[QuickHashStringIntHash::CHECK_FOR_DUPES](#quickhashstringinthash.constants.check-for-dupes)**

      Si está activado, la adición de elementos duplicados a un hash (vía [QuickHashStringIntHash::add()](#quickhashstringinthash.add) o [QuickHashStringIntHash::loadFromFile()](#quickhashstringinthash.loadfromfile)) resultará en la eliminación de estos elementos del hash. Esto tomará tiempo adicional, por lo que solo se debe usar esta opción si es necesario.






     **[QuickHashStringIntHash::DO_NOT_USE_ZEND_ALLOC](#quickhashstringinthash.constants.do-not-use-zend-alloc)**

      Desactiva el uso del gestor de memoria interno de PHP para las estructuras de hash internas. Con esta opción activada, las asignaciones internas no serán consideradas en los parámetros [memory_limit](#ini.memory-limit).




# QuickHashStringIntHash::add

(No version information available, might only be in Git)

QuickHashStringIntHash::add — Este método añade una nueva entrada al hash

### Descripción

public **QuickHashStringIntHash::add**([string](#language.types.string) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Este método añade una nueva entrada al hash y devuelve si la entrada ha sido añadida. Por omisión, las entradas siempre se añaden a menos que **[QuickHashStringIntHash::CHECK_FOR_DUPES](#quickhashstringinthash.constants.check-for-dupes)** haya sido pasado durante la creación del hash.

### Parámetros

     key


       La clave de la entrada a añadir.






     value


       El valor de la entrada a añadir.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido añadida, y **[false](#constant.false)** si la entrada no ha sido añadida.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::add()**

&lt;?php
echo "sin verificación de duplicados\n";
$hash = new QuickHashStringIntHash( 1024 );
var_dump( $hash );
var_dump( $hash-&gt;exists( "four" ) );
var_dump( $hash-&gt;get( "four" ) );
var_dump( $hash-&gt;add( "four", 22 ) );
var_dump( $hash-&gt;exists( "four" ) );
var_dump( $hash-&gt;get( "four" ) );
var_dump( $hash-&gt;add( "four", 12 ) );

echo "\ncon verificación de duplicados\n";
$hash = new QuickHashStringIntHash( 1024, QuickHashStringIntHash::CHECK_FOR_DUPES );
var_dump( $hash );
var_dump( $hash-&gt;exists( "four" ) );
var_dump( $hash-&gt;get( "four" ) );
var_dump( $hash-&gt;add( "four", 78 ) );
var_dump( $hash-&gt;exists( "four" ) );
var_dump( $hash-&gt;get( "four" ) );
var_dump( $hash-&gt;add( "four", 9 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

sin verificación de duplicados
object(QuickHashStringIntHash)#1 (0) {
}
bool(false)
bool(false)
bool(true)
bool(true)
int(22)
bool(true)

con verificación de duplicados
object(QuickHashStringIntHash)#2 (0) {
}
bool(false)
bool(false)
bool(true)
bool(true)
int(78)
bool(false)

# QuickHashStringIntHash::\_\_construct

(No version information available, might only be in Git)

QuickHashStringIntHash::\_\_construct — Crear un nuevo objeto QuickHashStringIntHash

### Descripción

public **QuickHashStringIntHash::\_\_construct**([int](#language.types.integer) $size, [int](#language.types.integer) $options = 0)

Este constructor crea un nuevo objeto [QuickHashStringIntHash](#class.quickhashstringinthash). El tamaño es el número de
listas de cubos a crear. Cuantas más listas haya, menos colisiones habrá.
Las opciones también son soportadas.

### Parámetros

     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se limita
       automáticamente de 64 a 4194304.






     options


       Las opciones que se pueden pasar son:
       **[QuickHashStringIntHash::CHECK_FOR_DUPES](#quickhashstringinthash.constants.check-for-dupes)**, que verifica que ninguna entrada duplicada
       se añade al hash y
       **[QuickHashStringIntHash::DO_NOT_USE_ZEND_ALLOC](#quickhashstringinthash.constants.do-not-use-zend-alloc)** para no utilizar el gestor de memoria
       interno de PHP.





### Valores devueltos

Devuelve un nuevo objeto [QuickHashStringIntHash](#class.quickhashstringinthash).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::__construct()**

&lt;?php
var_dump( new QuickHashStringIntHash( 1024 ) );
var_dump( new QuickHashStringIntHash( 1024, QuickHashStringIntHash::CHECK_FOR_DUPES ) );
?&gt;

# QuickHashStringIntHash::delete

(No version information available, might only be in Git)

QuickHashStringIntHash::delete — Este método elimina una entrada del hash

### Descripción

public **QuickHashStringIntHash::delete**([string](#language.types.string) $key): [bool](#language.types.boolean)

Este método elimina una entrada del hash y devuelve si la entrada ha sido
eliminada o no. Las estructuras de memoria asociadas no serán liberadas inmediatamente,
sino cuando el hash mismo es liberado.

Los elementos no pueden ser eliminados cuando el hash está siendo utilizado en un iterador. La
método no lanzará una excepción, sino que simplemente devolverá **[false](#constant.false)** como ocurriría
con cualquier otro fallo de eliminación.

### Parámetros

     key


       La clave de la entrada a eliminar.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido eliminada, y **[false](#constant.false)** si la entrada no ha sido eliminada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::delete()**

&lt;?php
$hash = new QuickHashStringIntHash( 1024 );
var_dump( $hash-&gt;exists( 'four' ) );
var_dump( $hash-&gt;add( 'four', 5 ) );
var_dump( $hash-&gt;get( 'four' ) );
var_dump( $hash-&gt;delete( 'four' ) );
var_dump( $hash-&gt;exists( 'four' ) );
var_dump( $hash-&gt;get( 'four' ) );
var_dump( $hash-&gt;delete( 'four' ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
int(5)
bool(true)
bool(false)
bool(false)
bool(false)

# QuickHashStringIntHash::exists

(No version information available, might only be in Git)

QuickHashStringIntHash::exists — Este método verifica si una clave forma parte del hash

### Descripción

public **QuickHashStringIntHash::exists**([string](#language.types.string) $key): [bool](#language.types.boolean)

Este método verifica si una entrada con la clave proporcionada existe en el
hash.

### Parámetros

     key


       La clave de la entrada a verificar si existe en el hash.





### Valores devueltos

Devuelve **[true](#constant.true)** cuando la entrada es encontrada, o **[false](#constant.false)** cuando la entrada no es
encontrada.

# QuickHashStringIntHash::get

(No version information available, might only be in Git)

QuickHashStringIntHash::get — Este método recupera un valor del hash por su clave

### Descripción

public **QuickHashStringIntHash::get**([string](#language.types.string) $key): [mixed](#language.types.mixed)

Este método recupera un valor del hash por su clave.

### Parámetros

     key


       La clave de la entrada a recuperar.





### Valores devueltos

El valor si la clave existe, o **[null](#constant.null)** si la clave no era parte del hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::get()**

&lt;?php
$hash = new QuickHashStringIntHash( 8 );
var_dump( $hash-&gt;get( "one" ) );

var_dump( $hash-&gt;add( "two", 2 ) );
var_dump( $hash-&gt;get( "two" ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
int(2)

# QuickHashStringIntHash::getSize

(No version information available, might only be in Git)

QuickHashStringIntHash::getSize — Devuelve el número de elementos en el hash

### Descripción

public **QuickHashStringIntHash::getSize**(): [int](#language.types.integer)

Devuelve el número de elementos en el hash.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de elementos en el hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::getSize()**

&lt;?php
$hash = new QuickHashStringIntHash( 8 );
var_dump( $hash-&gt;add( "two", 2 ) );
var_dump( $hash-&gt;add( "three", 5 ) );
var_dump( $hash-&gt;getSize() );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
int(2)

# QuickHashStringIntHash::loadFromFile

(No version information available, might only be in Git)

QuickHashStringIntHash::loadFromFile — Este método de fábrica crea un hash a partir de un fichero

### Descripción

public static **QuickHashStringIntHash::loadFromFile**([string](#language.types.string) $filename, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashStringIntHash](#class.quickhashstringinthash)

Este método de fábrica crea un nuevo hash a partir de un fichero de definición en el disco. El
formato del fichero se compone de una firma 'QH\0x21\0', del número de elementos como
entero signado de 32 bits en Endianness del sistema, un entero no signado de 32 bits
conteniendo el número de datos de elementos a seguir en caracteres. Estos datos
de elementos contienen todas las strings. Sigue otro entero signado de 32 bits
conteniendo el número de listas de cubos. Después del encabezado y las strings,
los elementos siguen. Están ordenados por lista de cubos de manera que las claves no
deben ser hasheadas para restaurar el hash. Para cada lista de cubos, la siguiente información es almacenada (todas en enteros de 32 bits): el índice de la lista de cubos,
el número de elementos en esta lista, y luego por parejas de dos
enteros no signados de 32 bits los elementos, donde el primero es el índice
en la lista de strings conteniendo las claves, y el segundo el valor. Un
ejemplo podría ser:

    **Ejemplo #1 Formato de fichero QuickHash StringIntHash**


    00000000  51 48 21 00 02 00 00 00  09 00 00 00 40 00 00 00  |QH!.........@...|

00000010 4f 4e 45 00 4e 49 4e 45 00 07 00 00 00 01 00 00 |ONE.NINE........|
00000020 00 00 00 00 00 01 00 00 00 2f 00 00 00 01 00 00 |........./......|
00000030 00 04 00 00 00 03 00 00 00 |.........|
00000039

    **Ejemplo #2 Formato de fichero QuickHash IntHash**


    firma del encabezado ('QH'; tipo de clave: 2; tipo de valor: 1; relleno: \0x00)

00000000 51 48 21 00

número de elementos:
00000004 02 00 00 00

longitud de valores de string (9 caracteres):
00000008 09 00 00 00

número de listas de cubos de hash (esto se configura para hashes como argumento al
constructor normalmente, 64 en este caso):
0000000C 40 00 00 00

valores de string:
00000010 4f 4e 45 00 4e 49 4e 45 00

listas de cubos:
lista de cubos 1 (con clave 7, y 1 elemento):
encabezado:
07 00 00 00 01 00 00 00
elementos (índice de clave: 0 ('ONE'), valor = 0):
00 00 00 00 01 00 00 00
lista de cubos 2 (con clave 0x2f, y 1 elemento):
encabezado:
2f 00 00 00 01 00 00 00
elementos (índice de clave: 4 ('NINE'), valor = 3):
04 00 00 00 03 00 00 00

### Parámetros

     filename


       El nombre del fichero desde el cual leer el hash.






     size


       El número de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También es
       automáticamente limitado de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción
       size es ignorada. Se lee desde el formato de fichero (a diferencia de las
       clases [QuickHashIntHash](#class.quickhashinthash) y [QuickHashIntStringHash](#class.quickhashintstringhash), donde se
       calcula automáticamente a partir del número de entradas en el hash.)





### Valores devueltos

Devuelve un nuevo [QuickHashStringIntHash](#class.quickhashstringinthash).

### Ejemplos

    **Ejemplo #3 Ejemplo de QuickHashStringIntHash::loadFromFile()**

&lt;?php
$file = dirname( __FILE__ ) . "/simple.hash.string";
$hash = QuickHashStringIntHash::loadFromFile(
$file,
QuickHashStringIntHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
$i = 48712 + $key \* 1631;
$k = base_convert( $i, 10, 36 );
echo $k, ' =&gt; ', $hash-&gt;get( $k ), "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

11l4 =&gt; 48712
12uf =&gt; 50343
143q =&gt; 51974
15d1 =&gt; 53605
16mc =&gt; 55236
17vn =&gt; 56867
194y =&gt; 58498
1ae9 =&gt; 60129
1bnk =&gt; 61760
1cwv =&gt; 63391
1e66 =&gt; 65022
1ffh =&gt; 66653
1gos =&gt; 68284
1hy3 =&gt; 69915
1j7e =&gt; 71546
1kgp =&gt; 73177

# QuickHashStringIntHash::loadFromString

(No version information available, might only be in Git)

QuickHashStringIntHash::loadFromString — Este método de fábrica crea un hash a partir de una cadena

### Descripción

public static **QuickHashStringIntHash::loadFromString**([string](#language.types.string) $contents, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashStringIntHash](#class.quickhashstringinthash)

Este método de fábrica crea un nuevo hash a partir de una definición en una cadena. El
formato es el mismo que el utilizado en "loadFromFile".

### Parámetros

     contents


       La cadena que contiene un formato serializado del hash.






     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se
       limita automáticamente de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción
       size es ignorada. Se calcula automáticamente para ser la misma que el
       número de entradas en el hash, redondeada a la potencia de dos más cercana
       con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo QuickHashStringIntHash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::loadFromString()**

&lt;?php
$contents = file_get_contents( dirname( __FILE__ ) . "/simple.hash.string" );
$hash = QuickHashStringIntHash::loadFromString(
$contents,
QuickHashStringIntHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
$i = 48712 + $key \* 1631;
$k = base_convert( $i, 10, 36 );
echo $k, ' =&gt; ', $hash-&gt;get( $k ), "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

11l4 =&gt; 48712
12uf =&gt; 50343
143q =&gt; 51974
15d1 =&gt; 53605
16mc =&gt; 55236
17vn =&gt; 56867
194y =&gt; 58498
1ae9 =&gt; 60129
1bnk =&gt; 61760
1cwv =&gt; 63391
1e66 =&gt; 65022
1ffh =&gt; 66653
1gos =&gt; 68284
1hy3 =&gt; 69915
1j7e =&gt; 71546
1kgp =&gt; 73177

# QuickHashStringIntHash::saveToFile

(No version information available, might only be in Git)

QuickHashStringIntHash::saveToFile — Este método almacena un hash en memoria en el disco

### Descripción

public **QuickHashStringIntHash::saveToFile**([string](#language.types.string) $filename): [void](language.types.void.html)

Este método almacena un hash existente en un fichero en el disco, en el mismo formato
que loadFromFile() puede leer.

### Parámetros

     filename


       El nombre del fichero donde almacenar el hash.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::saveToFile()**

&lt;?php
$hash = new QuickHashStringIntHash( 1024 );
var_dump( $hash-&gt;add( "forty three", 42 ) );
var_dump( $hash-&gt;add( "fifty two", 52 ) );

$hash-&gt;saveToFile( '/tmp/test.hash.string' );
?&gt;

# QuickHashStringIntHash::saveToString

(No version information available, might only be in Git)

QuickHashStringIntHash::saveToString — Este método devuelve una versión serializada del hash

### Descripción

public **QuickHashStringIntHash::saveToString**(): [string](#language.types.string)

Este método devuelve una versión serializada del hash en el mismo formato que
[QuickHashStringIntHash::loadFromString()](#quickhashstringinthash.loadfromstring) puede leer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve una versión serializada del hash, en el mismo formato que
[QuickHashStringIntHash::loadFromString()](#quickhashstringinthash.loadfromstring) puede leer.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::saveToString()**

&lt;?php
$hash = new QuickHashStringIntHash( 1024 );
var_dump( $hash-&gt;add( "forty three", 42 ) );
var_dump( $hash-&gt;add( "fifty two", 52 ) );

var_dump( $hash-&gt;saveToString() );
?&gt;

# QuickHashStringIntHash::set

(No version information available, might only be in Git)

QuickHashStringIntHash::set — Este método actualiza una entrada en el hash con un nuevo valor, o
añade una nueva entrada si la entrada no existe

### Descripción

public **QuickHashStringIntHash::set**([string](#language.types.string) $key, [int](#language.types.integer) $value): [int](#language.types.integer)

Este método actualiza una entrada con un nuevo valor. Si la entrada
no existía, añadirá una nueva entrada. Devuelve si la entrada
ha sido añadida o actualizada. Si hay claves duplicadas, solo el
primer elemento encontrado será actualizado. Utilice
QuickHashStringIntHash::CHECK_FOR_DUPES al crear el hash para evitar que las claves duplicadas
formen parte del hash.

### Parámetros

     key


       La clave de la entrada a añadir o actualizar.






     value


       El valor de la entrada a añadir. Si se pasa un valor no string, será
       convertido a string automáticamente si es posible.





### Valores devueltos

2 si la entrada ha sido encontrada y actualizada, 1 si la entrada ha sido nuevamente añadida o 0
si ha habido un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::set()**

&lt;?php
$hash = new QuickHashStringIntHash( 1024 );

echo "Set-&gt;Add\n";
var_dump( $hash-&gt;get( "forty six thousand six hundred ninety two" ) );
var_dump( $hash-&gt;set( "forty six thousand six hundred ninety two", 16091 ) );
var_dump( $hash-&gt;get( "forty six thousand six hundred ninety two" ) );

echo "Set-&gt;Update\n";
var_dump( $hash-&gt;set( "forty six thousand six hundred ninety two", 29906 ) );
var_dump( $hash-&gt;get( "forty six thousand six hundred ninety two" ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

Set-&gt;Add
bool(false)
int(2)
int(16091)
Set-&gt;Update
int(1)
int(29906)

# QuickHashStringIntHash::update

(No version information available, might only be in Git)

QuickHashStringIntHash::update — Este método actualiza una entrada en el hash con un nuevo valor

### Descripción

public **QuickHashStringIntHash::update**([string](#language.types.string) $key, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Este método actualiza una entrada con un nuevo valor y devuelve si
la entrada ha sido actualizada. Si hay claves duplicadas, solo
el primer elemento encontrado será actualizado. Utilice QuickHashStringIntHash::CHECK_FOR_DUPES al
crear el hash para evitar que las claves duplicadas formen parte del hash.

### Parámetros

     key


       La clave de la entrada a actualizar.






     value


       El nuevo valor de la entrada. Si se pasa un valor que no es una cadena, se convertirá automáticamente en una cadena si es posible.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido encontrada y actualizada, y **[false](#constant.false)** si la entrada no era
ya parte del hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashStringIntHash::update()**

&lt;?php
$hash = new QuickHashStringIntHash( 1024 );

$hash-&gt;add( 'six', 314159265 );
$hash-&gt;add( "a lot", 314159265 );

echo $hash-&gt;get( 'six' ), "\n";
echo $hash-&gt;get( 'a lot' ), "\n";

var_dump( $hash-&gt;update( 'a lot', 314159266 ) );
var_dump( $hash-&gt;update( "a lot plus one", 314159999 ) );

echo $hash-&gt;get( 'six' ), "\n";
echo $hash-&gt;get( 'a lot' ), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

314159265
314159265
bool(true)
bool(false)
314159265
314159266

## Tabla de contenidos

- [QuickHashStringIntHash::add](#quickhashstringinthash.add) — Este método añade una nueva entrada al hash
- [QuickHashStringIntHash::\_\_construct](#quickhashstringinthash.construct) — Crear un nuevo objeto QuickHashStringIntHash
- [QuickHashStringIntHash::delete](#quickhashstringinthash.delete) — Este método elimina una entrada del hash
- [QuickHashStringIntHash::exists](#quickhashstringinthash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashStringIntHash::get](#quickhashstringinthash.get) — Este método recupera un valor del hash por su clave
- [QuickHashStringIntHash::getSize](#quickhashstringinthash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashStringIntHash::loadFromFile](#quickhashstringinthash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashStringIntHash::loadFromString](#quickhashstringinthash.loadfromstring) — Este método de fábrica crea un hash a partir de una cadena
- [QuickHashStringIntHash::saveToFile](#quickhashstringinthash.savetofile) — Este método almacena un hash en memoria en el disco
- [QuickHashStringIntHash::saveToString](#quickhashstringinthash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashStringIntHash::set](#quickhashstringinthash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashStringIntHash::update](#quickhashstringinthash.update) — Este método actualiza una entrada en el hash con un nuevo valor

# La clase QuickHashIntStringHash

(PECL quickhash &gt;= Unknown)

## Introducción

    Esta clase envuelve un array que contiene números enteros, donde los valores son strings. Los arrays también están disponibles como una implementación de la interfaz [ArrayAccess](#class.arrayaccess).




    Los hashes también pueden ser recorridos con [foreach](#control-structures.foreach) ya que la interfaz [Iterator](#class.iterator) está implementada. El orden en el que los elementos son devueltos no está garantizado.

## Sinopsis de la Clase

    ****




      class **QuickHashIntStringHash**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [CHECK_FOR_DUPES](#quickhashintstringhash.constants.check-for-dupes) = 1;

    const
     [int](#language.types.integer)
      [DO_NOT_USE_ZEND_ALLOC](#quickhashintstringhash.constants.do-not-use-zend-alloc) = 2;

    const
     [int](#language.types.integer)
      [HASHER_NO_HASH](#quickhashintstringhash.constants.hasher-no-hash) = 256;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS1](#quickhashintstringhash.constants.hasher-jenkins1) = 512;

    const
     [int](#language.types.integer)
      [HASHER_JENKINS2](#quickhashintstringhash.constants.hasher-jenkins2) = 1024;


    /* Métodos */

public [add](#quickhashintstringhash.add)([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [\_\_construct](#quickhashintstringhash.construct)([int](#language.types.integer) $size, [int](#language.types.integer) $options = 0)
public [delete](#quickhashintstringhash.delete)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [exists](#quickhashintstringhash.exists)([int](#language.types.integer) $key): [bool](#language.types.boolean)
public [get](#quickhashintstringhash.get)([int](#language.types.integer) $key): [mixed](#language.types.mixed)
public [getSize](#quickhashintstringhash.getsize)(): [int](#language.types.integer)
public static [loadFromFile](#quickhashintstringhash.loadfromfile)([string](#language.types.string) $filename, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashIntStringHash](#class.quickhashintstringhash)
public static [loadFromString](#quickhashintstringhash.loadfromstring)([string](#language.types.string) $contents, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashIntStringHash](#class.quickhashintstringhash)
public [saveToFile](#quickhashintstringhash.savetofile)([string](#language.types.string) $filename): [void](language.types.void.html)
public [saveToString](#quickhashintstringhash.savetostring)(): [string](#language.types.string)
public [set](#quickhashintstringhash.set)([int](#language.types.integer) $key, [string](#language.types.string) $value): [int](#language.types.integer)
public [update](#quickhashintstringhash.update)([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[QuickHashIntStringHash::CHECK_FOR_DUPES](#quickhashintstringhash.constants.check-for-dupes)**

      Si está activado, añadir elementos duplicados a un conjunto (a través de [QuickHashIntStringHash::add()](#quickhashintstringhash.add) o
      [QuickHashIntStringHash::loadFromFile()](#quickhashintstringhash.loadfromfile)) resultará en la eliminación de estos elementos del conjunto.
      Esto tomará más tiempo, por lo que sólo debe usarse si es necesario.






     **[QuickHashIntStringHash::DO_NOT_USE_ZEND_ALLOC](#quickhashintstringhash.constants.do-not-use-zend-alloc)**

      Desactiva el uso del gestor de memoria interno de PHP para las estructuras de juego internas. Con esta opción activada, las asignaciones internas no contarán
      hacia los parámetros [memory_limit](#ini.memory-limit).






     **[QuickHashIntStringHash::HASHER_NO_HASH](#quickhashintstringhash.constants.hasher-no-hash)**

      Selecciona no usar una función de hash, sino simplemente usar un módulo para encontrar el índice de la lista de cubos. Esto no es más rápido que el hash normal, y
      da más colisiones.






     **[QuickHashIntStringHash::HASHER_JENKINS1](#quickhashintstringhash.constants.hasher-jenkins1)**

      Esta es la función de hash por defecto para transformar los hashes enteros en índices de lista de cubos.






     **[QuickHashIntStringHash::HASHER_JENKINS2](#quickhashintstringhash.constants.hasher-jenkins2)**

      Selecciona un algoritmo de hash de variantes.




# QuickHashIntStringHash::add

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::add — Este método añade una nueva entrada al hash

### Descripción

public **QuickHashIntStringHash::add**([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Este método añade una nueva entrada al hash y devuelve si la entrada ha sido
añadida. Las entradas se añaden por omisión siempre que
**[QuickHashIntStringHash::CHECK_FOR_DUPES](#quickhashintstringhash.constants.check-for-dupes)** no haya sido pasado durante la creación del hash.

### Parámetros

     key


       La clave de la entrada a añadir.






     value


       El valor de la entrada a añadir. Si se pasa un valor no-string, se convertirá automáticamente en string si es posible.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido añadida, y **[false](#constant.false)** si la entrada no ha sido añadida.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::add()**

&lt;?php
echo "sin verificación de duplicados\n";
$hash = new QuickHashIntStringHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, "twenty two" ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, "twelve" ) );

echo "\ncon verificación de duplicados\n";
$hash = new QuickHashIntStringHash( 1024, QuickHashIntStringHash::CHECK_FOR_DUPES );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, "seventy eight" ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;get( 4 ) );
var_dump( $hash-&gt;add( 4, "nine" ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

sin verificación de duplicados
bool(false)
bool(false)
bool(true)
bool(true)
string(10) "twenty two"
bool(true)

con verificación de duplicados
bool(false)
bool(false)
bool(true)
bool(true)
string(13) "seventy eight"
bool(false)

# QuickHashIntStringHash::\_\_construct

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::\_\_construct — Crear un nuevo objeto QuickHashIntStringHash

### Descripción

public **QuickHashIntStringHash::\_\_construct**([int](#language.types.integer) $size, [int](#language.types.integer) $options = 0)

Este constructor crea un nuevo objeto [QuickHashIntStringHash](#class.quickhashintstringhash). El tamaño es el número de
listas de cubos a crear. Cuantas más listas haya, menos colisiones habrá.
Las opciones también son compatibles.

### Parámetros

     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se
       limita automáticamente de 64 a 4194304.






     options


       Las opciones que se pueden pasar son: **[QuickHashIntStringHash::CHECK_FOR_DUPES](#quickhashintstringhash.constants.check-for-dupes)**,
       que asegura que ninguna entrada duplicada se añada al hash;
       **[QuickHashIntStringHash::DO_NOT_USE_ZEND_ALLOC](#quickhashintstringhash.constants.do-not-use-zend-alloc)** para no utilizar el gestor de memoria interno de PHP
       así como uno de los valores **[QuickHashIntStringHash::HASHER_NO_HASH](#quickhashintstringhash.constants.hasher-no-hash)**,
       **[QuickHashIntStringHash::HASHER_JENKINS1](#quickhashintstringhash.constants.hasher-jenkins1)** o **[QuickHashIntStringHash::HASHER_JENKINS2](#quickhashintstringhash.constants.hasher-jenkins2)**.
       Estas tres últimas configuran el algoritmo de hash a utilizar. Todas las opciones
       pueden ser combinadas utilizando máscaras de bits.





### Valores devueltos

Devuelve un nuevo objeto [QuickHashIntStringHash](#class.quickhashintstringhash).

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::__construct()**

&lt;?php
var_dump( new QuickHashIntStringHash( 1024 ) );
var_dump( new QuickHashIntStringHash( 1024, QuickHashIntStringHash::CHECK_FOR_DUPES ) );
var_dump(
new QuickHashIntStringHash(
1024,
QuickHashIntStringHash::DO_NOT_USE_ZEND_ALLOC | QuickHashIntStringHash::HASHER_JENKINS2
)
);
?&gt;

# QuickHashIntStringHash::delete

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::delete — Este método elimina una entrada del hash

### Descripción

public **QuickHashIntStringHash::delete**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método elimina una entrada del hash y devuelve si la entrada ha sido
eliminada. Las estructuras de memoria asociadas no se liberarán inmediatamente,
sino cuando el hash mismo es liberado.

Los elementos no pueden ser eliminados cuando el hash está siendo utilizado en un iterador. El
método no lanzará una excepción, sino que simplemente devolverá **[false](#constant.false)** como ocurriría con cualquier otro fallo de eliminación.

### Parámetros

     key


       La clave de la entrada a eliminar.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido eliminada, y **[false](#constant.false)** si la entrada no ha sido eliminada.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::delete()**

&lt;?php
$hash = new QuickHashIntStringHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, "five" ) );
var_dump( $hash-&gt;delete( 4 ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;delete( 4 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
bool(true)
bool(false)
bool(false)

# QuickHashIntStringHash::exists

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::exists — Este método verifica si una clave forma parte del hash

### Descripción

public **QuickHashIntStringHash::exists**([int](#language.types.integer) $key): [bool](#language.types.boolean)

Este método verifica si una entrada con la clave proporcionada existe en el hash.

### Parámetros

     key


       La clave de la entrada a verificar si existe en el hash.





### Valores devueltos

Devuelve **[true](#constant.true)** cuando la entrada ha sido encontrada, o **[false](#constant.false)** cuando la entrada no es encontrada.

# QuickHashIntStringHash::get

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::get — Este método recupera un valor del hash por su clave

### Descripción

public **QuickHashIntStringHash::get**([int](#language.types.integer) $key): [mixed](#language.types.mixed)

Este método recupera un valor del hash por su clave.

### Parámetros

     key


       La clave de la entrada a recuperar.





### Valores devueltos

El valor si la clave existe, o **[null](#constant.null)** si la clave no era parte del hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::get()**

&lt;?php
$hash = new QuickHashIntStringHash( 8 );
var_dump( $hash-&gt;get( 1 ) );

var_dump( $hash-&gt;add( 2, "two" ) );
var_dump( $hash-&gt;get( 2 ) );

var_dump( $hash-&gt;add( 3, 5 ) );
var_dump( $hash-&gt;get( 3 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)
string(3) "two"
bool(true)
string(1) "5"

# QuickHashIntStringHash::getSize

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::getSize — Devuelve el número de elementos en el hash

### Descripción

public **QuickHashIntStringHash::getSize**(): [int](#language.types.integer)

Devuelve el número de elementos en el hash.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de elementos en el hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::getSize()**

&lt;?php
$hash = new QuickHashIntStringHash( 8 );
var_dump( $hash-&gt;add( 2, "two" ) );
var_dump( $hash-&gt;add( 3, 5 ) );
var_dump( $hash-&gt;getSize() );
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(true)
bool(true)
int(2)

# QuickHashIntStringHash::loadFromFile

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::loadFromFile — Este método de fábrica crea un hash a partir de un fichero

### Descripción

public static **QuickHashIntStringHash::loadFromFile**([string](#language.types.string) $filename, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashIntStringHash](#class.quickhashintstringhash)

Este método de fábrica crea un nuevo hash a partir de un fichero de definición en el disco. El
formato del fichero consiste en una firma 'QH\0x12\0', el número de elementos como
un entero signado de 32 bits en Endianness del sistema, un entero no signado de 32 bits
conteniendo el número de datos de elementos a seguir en caracteres. Estos datos
de elementos contienen todas las strings. Después del encabezado y las strings, los
elementos siguen por pares de dos enteros no signados de 32 bits donde el primero
es la clave, y el segundo el índice en la string de datos de elementos.
Un ejemplo podría ser:

    **Ejemplo #1 Formato de fichero QuickHash IntString**


    00000000  51 48 12 00 02 00 00 00  09 00 00 00 4f 4e 45 00  |QH..........ONE.|

00000010 4e 49 4e 45 00 01 00 00 00 00 00 00 00 03 00 00 |NINE............|
00000020 00 04 00 00 00 |.....|
00000025

    **Ejemplo #2 Formato de fichero QuickHash IntString**


    firma del encabezado ('QH'; tipo de clave: 1; tipo de valor: 2; relleno: \0x00)

00000000 51 48 12 00

número de elementos:
00000004 02 00 00 00

longitud de valores de string (9 caracteres):
00000008 09 00 00 00

valores de string:
0000000C 4f 4e 45 00 4e 49 4e 45 00

string de datos:
00000015 01 00 00 00 00 00 00 00 03 00 00 00 04 00 00 00

clave/valor 1 (clave = 1, índice de string = 0 ("ONE")):
01 00 00 00 00 00 00 00

clave/valor 2 (clave = 3, índice de string = 4 ("NINE")):
03 00 00 00 04 00 00 00

### Parámetros

     filename


       El nombre del fichero desde el cual leer el hash.






     size


       La cantidad de listas de cubos a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También está
       automáticamente limitado de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción
       size es ignorada. Se calcula automáticamente para ser la misma que
       el número de entradas en el hash, redondeada a la potencia de dos más cercana
       con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo [QuickHashIntStringHash](#class.quickhashintstringhash).

### Ejemplos

    **Ejemplo #3 Ejemplo de QuickHashIntStringHash::loadFromFile()**

&lt;?php
$file = dirname( __FILE__ ) . "/simple.string.hash";
$hash = QuickHashIntStringHash::loadFromFile(
$file,
QuickHashIntStringHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$hash-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntStringHash::loadFromString

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::loadFromString — Este método de fábrica crea un hash a partir de una string

### Descripción

public static **QuickHashIntStringHash::loadFromString**([string](#language.types.string) $contents, [int](#language.types.integer) $size = 0, [int](#language.types.integer) $options = 0): [QuickHashIntStringHash](#class.quickhashintstringhash)

Este método de fábrica crea un nuevo hash a partir de una definición en una string. El
formato es el mismo que el utilizado en "loadFromFile".

### Parámetros

     contents


       La string que contiene un formato serializado del hash.






     size


       La cantidad de listas de buckets a configurar. El número que se pasa será
       automáticamente redondeado a la siguiente potencia de dos. También se limita
       automáticamente de 4 a 4194304.






     options


       Las mismas opciones que el constructor de la clase; excepto que la opción
       size es ignorada. Se calcula automáticamente para ser la misma que el número de
       entradas en el hash, redondeada a la potencia de dos más cercana con un límite máximo de 4194304.





### Valores devueltos

Devuelve un nuevo QuickHashIntStringHash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::loadFromString()**

&lt;?php
$contents = file_get_contents( dirname( __FILE__ ) . "/simple.hash" );
$hash = QuickHashIntStringHash::loadFromString(
$contents,
QuickHashIntStringHash::DO_NOT_USE_ZEND_ALLOC
);
foreach( range( 0, 0x0f ) as $key )
{
printf( "Key %3d (%2x) is %s\n",
$key, $key,
$hash-&gt;exists( $key ) ? 'set' : 'unset'
);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Key 0 ( 0) is unset
Key 1 ( 1) is set
Key 2 ( 2) is set
Key 3 ( 3) is set
Key 4 ( 4) is unset
Key 5 ( 5) is set
Key 6 ( 6) is unset
Key 7 ( 7) is set
Key 8 ( 8) is unset
Key 9 ( 9) is unset
Key 10 ( a) is unset
Key 11 ( b) is set
Key 12 ( c) is unset
Key 13 ( d) is set
Key 14 ( e) is unset
Key 15 ( f) is unset

# QuickHashIntStringHash::saveToFile

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::saveToFile — Este método almacena un hash en memoria en disco

### Descripción

public **QuickHashIntStringHash::saveToFile**([string](#language.types.string) $filename): [void](language.types.void.html)

Este método almacena un hash existente en un fichero en disco, en el mismo formato
que loadFromFile() puede leer.

### Parámetros

     filename


       El nombre del fichero donde almacenar el hash.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::saveToFile()**

&lt;?php
$hash = new QuickHashIntStringHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, "forty three" ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, "fifty two" ) );

$hash-&gt;saveToFile( '/tmp/test.string.hash' );
?&gt;

# QuickHashIntStringHash::saveToString

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::saveToString — Este método devuelve una versión serializada del hash

### Descripción

public **QuickHashIntStringHash::saveToString**(): [string](#language.types.string)

Este método devuelve una versión serializada del hash en el mismo formato que
[QuickHashIntStringHash::loadFromString()](#quickhashintstringhash.loadfromstring) puede leer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve una string que contiene una versión serializada del hash.
Cada elemento se almacena como un valor de cuatro bytes en el Endianness
que el sistema actual utiliza.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::saveToString()**

&lt;?php
$hash = new QuickHashIntStringHash( 1024 );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 4, "thirty four" ) );
var_dump( $hash-&gt;exists( 4 ) );
var_dump( $hash-&gt;add( 5, "fifty five" ) );

var_dump( $hash-&gt;saveToString() );
?&gt;

# QuickHashIntStringHash::set

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::set — Este método actualiza una entrada en el hash con un nuevo valor, o
añade una nueva entrada si la entrada no existe

### Descripción

public **QuickHashIntStringHash::set**([int](#language.types.integer) $key, [string](#language.types.string) $value): [int](#language.types.integer)

Este método intenta actualizar una entrada con un nuevo valor. Si
la entrada no existía, añadirá una nueva entrada. Devuelve si
la entrada ha sido añadida o actualizada. Si hay claves duplicadas,
solo el primer elemento encontrado será actualizado. Utilice
QuickHashIntStringHash::CHECK_FOR_DUPES al crear el hash para evitar que las claves duplicadas
formen parte del hash.

### Parámetros

     key


       La clave de la entrada a añadir o actualizar.






     value


       El valor de la entrada a añadir. Si se pasa un valor que no es una string, será
       convertido automáticamente a string si es posible.





### Valores devueltos

2 si la entrada ha sido encontrada y actualizada, 1 si la entrada ha sido nuevamente añadida o 0
si ha habido un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::set()**

&lt;?php
$hash = new QuickHashIntStringHash( 1024 );

echo "Set-&gt;Add\n";
var_dump( $hash-&gt;get( 46692 ) );
var_dump( $hash-&gt;set( 46692, "sixteen thousand ninety one" ) );
var_dump( $hash-&gt;get( 46692 ) );

echo "Set-&gt;Update\n";
var_dump( $hash-&gt;set( 46692, "twenty nine thousand nine hundred six" ) );
var_dump( $hash-&gt;get( 46692 ) );
?&gt;

    Resultado del ejemplo anterior es similar a:

Set-&gt;Add
bool(false)
int(2)
string(27) "sixteen thousand ninety one"
Set-&gt;Update
int(1)
string(37) "twenty nine thousand nine hundred six"

# QuickHashIntStringHash::update

(PECL quickhash &gt;= Unknown)

QuickHashIntStringHash::update — Este método actualiza una entrada en el hash con un nuevo valor

### Descripción

public **QuickHashIntStringHash::update**([int](#language.types.integer) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Este método actualiza una entrada con un nuevo valor y devuelve si
la entrada ha sido actualizada. Si hay claves duplicadas, solo el
primer elemento encontrado será actualizado. Utilice QuickHashIntStringHash::CHECK_FOR_DUPES
al crear el hash para evitar que las claves duplicadas formen parte del hash.

### Parámetros

     key


       La clave de la entrada a actualizar.






     value


       El nuevo valor para la entrada. Si se pasa un valor que no es una string, se
       convertirá automáticamente en una string si es posible.





### Valores devueltos

**[true](#constant.true)** cuando la entrada ha sido encontrada y actualizada, y **[false](#constant.false)** si la entrada no
era ya parte del hash.

### Ejemplos

    **Ejemplo #1 Ejemplo de QuickHashIntStringHash::update()**

&lt;?php
$hash-&gt;add( 161803398, "--" );
$hash-&gt;add( 314159265, "a lot" );

echo $hash-&gt;get( 161803398 ), "\n";
echo $hash-&gt;get( 314159265 ), "\n";

var_dump( $hash-&gt;update( 314159265, "a lot plus one" ) );
var_dump( $hash-&gt;update( 314159999, "a lot plus one" ) );

echo $hash-&gt;get( 161803398 ), "\n";
echo $hash-&gt;get( 314159265 ), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

--
a lot
bool(true)
bool(false)
--
a lot plus one

## Tabla de contenidos

- [QuickHashIntStringHash::add](#quickhashintstringhash.add) — Este método añade una nueva entrada al hash
- [QuickHashIntStringHash::\_\_construct](#quickhashintstringhash.construct) — Crear un nuevo objeto QuickHashIntStringHash
- [QuickHashIntStringHash::delete](#quickhashintstringhash.delete) — Este método elimina una entrada del hash
- [QuickHashIntStringHash::exists](#quickhashintstringhash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashIntStringHash::get](#quickhashintstringhash.get) — Este método recupera un valor del hash por su clave
- [QuickHashIntStringHash::getSize](#quickhashintstringhash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashIntStringHash::loadFromFile](#quickhashintstringhash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashIntStringHash::loadFromString](#quickhashintstringhash.loadfromstring) — Este método de fábrica crea un hash a partir de una string
- [QuickHashIntStringHash::saveToFile](#quickhashintstringhash.savetofile) — Este método almacena un hash en memoria en disco
- [QuickHashIntStringHash::saveToString](#quickhashintstringhash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashIntStringHash::set](#quickhashintstringhash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashIntStringHash::update](#quickhashintstringhash.update) — Este método actualiza una entrada en el hash con un nuevo valor

- [Introducción](#intro.quickhash)
- [Instalación/Configuración](#quickhash.setup)<li>[Requerimientos](#quickhash.requirements)
- [Instalación](#quickhash.installation)
  </li>- [Ejemplos](#quickhash.examples)
- [QuickHashIntSet](#class.quickhashintset) — La clase QuickHashIntSet<li>[QuickHashIntSet::add](#quickhashintset.add) — Este método añade una nueva entrada al conjunto
- [QuickHashIntSet::\_\_construct](#quickhashintset.construct) — Crear un nuevo objeto QuickHashIntSet
- [QuickHashIntSet::delete](#quickhashintset.delete) — Este método elimina una entrada del conjunto
- [QuickHashIntSet::exists](#quickhashintset.exists) — Este método verifica si una clave forma parte del conjunto
- [QuickHashIntSet::getSize](#quickhashintset.getsize) — Devuelve el número de elementos en el conjunto
- [QuickHashIntSet::loadFromFile](#quickhashintset.loadfromfile) — Este método de fábrica crea un conjunto a partir de un fichero
- [QuickHashIntSet::loadFromString](#quickhashintset.loadfromstring) — Este método de fábrica crea un conjunto a partir de una string
- [QuickHashIntSet::saveToFile](#quickhashintset.savetofile) — Este método almacena un conjunto en memoria en disco
- [QuickHashIntSet::saveToString](#quickhashintset.savetostring) — Este método devuelve una versión serializada del conjunto
  </li>- [QuickHashIntHash](#class.quickhashinthash) — La clase QuickHashIntHash<li>[QuickHashIntHash::add](#quickhashinthash.add) — Este método añade una nueva entrada al hash
- [QuickHashIntHash::\_\_construct](#quickhashinthash.construct) — Crear un nuevo objeto QuickHashIntHash
- [QuickHashIntHash::delete](#quickhashinthash.delete) — Este método elimina una entrada del hash
- [QuickHashIntHash::exists](#quickhashinthash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashIntHash::get](#quickhashinthash.get) — Este método recupera un valor del hash por su clave
- [QuickHashIntHash::getSize](#quickhashinthash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashIntHash::loadFromFile](#quickhashinthash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashIntHash::loadFromString](#quickhashinthash.loadfromstring) — Este método de fábrica crea un hash a partir de una string
- [QuickHashIntHash::saveToFile](#quickhashinthash.savetofile) — Este método almacena un hash en memoria en disco
- [QuickHashIntHash::saveToString](#quickhashinthash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashIntHash::set](#quickhashinthash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashIntHash::update](#quickhashinthash.update) — Este método actualiza una entrada en el hash con un nuevo valor
  </li>- [QuickHashStringIntHash](#class.quickhashstringinthash) — La clase QuickHashStringIntHash<li>[QuickHashStringIntHash::add](#quickhashstringinthash.add) — Este método añade una nueva entrada al hash
- [QuickHashStringIntHash::\_\_construct](#quickhashstringinthash.construct) — Crear un nuevo objeto QuickHashStringIntHash
- [QuickHashStringIntHash::delete](#quickhashstringinthash.delete) — Este método elimina una entrada del hash
- [QuickHashStringIntHash::exists](#quickhashstringinthash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashStringIntHash::get](#quickhashstringinthash.get) — Este método recupera un valor del hash por su clave
- [QuickHashStringIntHash::getSize](#quickhashstringinthash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashStringIntHash::loadFromFile](#quickhashstringinthash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashStringIntHash::loadFromString](#quickhashstringinthash.loadfromstring) — Este método de fábrica crea un hash a partir de una cadena
- [QuickHashStringIntHash::saveToFile](#quickhashstringinthash.savetofile) — Este método almacena un hash en memoria en el disco
- [QuickHashStringIntHash::saveToString](#quickhashstringinthash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashStringIntHash::set](#quickhashstringinthash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashStringIntHash::update](#quickhashstringinthash.update) — Este método actualiza una entrada en el hash con un nuevo valor
  </li>- [QuickHashIntStringHash](#class.quickhashintstringhash) — La clase QuickHashIntStringHash<li>[QuickHashIntStringHash::add](#quickhashintstringhash.add) — Este método añade una nueva entrada al hash
- [QuickHashIntStringHash::\_\_construct](#quickhashintstringhash.construct) — Crear un nuevo objeto QuickHashIntStringHash
- [QuickHashIntStringHash::delete](#quickhashintstringhash.delete) — Este método elimina una entrada del hash
- [QuickHashIntStringHash::exists](#quickhashintstringhash.exists) — Este método verifica si una clave forma parte del hash
- [QuickHashIntStringHash::get](#quickhashintstringhash.get) — Este método recupera un valor del hash por su clave
- [QuickHashIntStringHash::getSize](#quickhashintstringhash.getsize) — Devuelve el número de elementos en el hash
- [QuickHashIntStringHash::loadFromFile](#quickhashintstringhash.loadfromfile) — Este método de fábrica crea un hash a partir de un fichero
- [QuickHashIntStringHash::loadFromString](#quickhashintstringhash.loadfromstring) — Este método de fábrica crea un hash a partir de una string
- [QuickHashIntStringHash::saveToFile](#quickhashintstringhash.savetofile) — Este método almacena un hash en memoria en disco
- [QuickHashIntStringHash::saveToString](#quickhashintstringhash.savetostring) — Este método devuelve una versión serializada del hash
- [QuickHashIntStringHash::set](#quickhashintstringhash.set) — Este método actualiza una entrada en el hash con un nuevo valor, o
  añade una nueva entrada si la entrada no existe
- [QuickHashIntStringHash::update](#quickhashintstringhash.update) — Este método actualiza una entrada en el hash con un nuevo valor
  </li>
