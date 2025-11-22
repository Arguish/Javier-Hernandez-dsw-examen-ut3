# Generadores de Números Aleatorios y Funciones Relacionadas con la Aleatoriedad

# Introducción

# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

     **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**
     ([int](#language.types.integer))



      Indica que la implementación correcta de [» Mt19937](http://www.math.sci.hiroshima-u.ac.jp/m-mat/MT/ARTICLES/mt.pdf) (Mersenne Twister)
      será utilizada por el algoritmo al crear una instancia de [Random\Engine\Mt19937](#class.random-engine-mt19937)
      utilizando [Random\Engine\Mt19937::__construct()](#random-engine-mt19937.construct) o al inicializar el Mersenne Twister global
      con [mt_srand()](#function.mt-srand).





     **[MT_RAND_PHP](#constant.mt-rand-php)**
     ([int](#language.types.integer))



      Indica que una implementación incorrecta de Mersenne Twister será utilizada por el algoritmo, al
      crear una instancia de [Random\Engine\Mt19937](#class.random-engine-mt19937) utilizando
      [Random\Engine\Mt19937::__construct()](#random-engine-mt19937.construct) o al inicializar el Mersenne Twister global
      con [mt_srand()](#function.mt-srand).


      La implementación incorrecta está disponible para garantizar la compatibilidad ascendente con
      [mt_srand()](#function.mt-srand) anterior a PHP 7.1.0.

     **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

# Ejemplos

**Ejemplo #1 Ejemplo de aleatoriedad**

&lt;?php
$r = new \Random\Randomizer();

// Generar un nombre de dominio aleatorio
printf(
"%s.example.com\n",
$r-&gt;getBytesFromString('abcdefghijklmnopqrstuvwxyz0123456789', 16)
);

// Mezclar array:
$fruits = [ 'red' =&gt; '🍎', 'green' =&gt; '🥝', 'yellow' =&gt; '🍌', 'pink' =&gt; '🍑', 'purple' =&gt; '🍇' ];
echo "Ensalada: ", implode(', ', $r-&gt;shuffleArray($fruits)), "\n";

// Mezclar claves de array
$fruits = [ 'red' =&gt; '🍎', 'green' =&gt; '🥝', 'yellow' =&gt; '🍌', 'pink' =&gt; '🍑', 'purple' =&gt; '🍇' ];

$keys = $r-&gt;pickArrayKeys($fruits, 2);
// Buscar los valores para las claves seleccionadas
$selection = array_map(
    static fn ($key) =&gt; $fruits[$key],
$keys
);

echo "Valores: ", implode(', ', $selection), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

j87fzv1p0daiwmlo.example.com
Ensalada: 🥝, 🍇, 🍎, 🍌, 🍑
Valores: 🍌, 🍑

# Funciones de números aleatorios

# getrandmax

(PHP 4, PHP 5, PHP 7, PHP 8)

getrandmax — Valor aleatorio máximo posible

### Descripción

    **getrandmax**(): [int](#language.types.integer)

Devuelve el valor aleatorio máximo posible
retornado por [rand()](#function.rand).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor aleatorio máximo posible retornado por [rand()](#function.rand).

### Ver también

    - [rand()](#function.rand) - Genera un valor aleatorio

    - [srand()](#function.srand) - Inicializa el generador de números aleatorios

    - [mt_getrandmax()](#function.mt-getrandmax) - El valor aleatorio más grande posible

# lcg_value

(PHP 4, PHP 5, PHP 7, PHP 8)

lcg_value — Generador de congruencia lineal combinada

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

    [#[\Deprecated]](class.deprecated.html)
    **lcg_value**(): [float](#language.types.float)

**lcg_value()** devuelve un número pseudoaleatorio,
comprendido entre 0 y 1. **lcg_value()** combina dos
generadores de congruencia, con períodos respectivos de
2^31 - 85 y 2^31 - 249.
El período de esta función es el producto de estos dos
números primos (es decir, (2^31 - 85)\*(2^31 - 249)).

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

**Precaución**

    Escalar el valor de retorno a un intervalo diferente utilizando la multiplicación
    o la adición (una transformación afín) puede provocar un sesgo
    en el valor resultante, ya que los números de punto flotante no están distribuidos uniformemente
    en la línea numérica.
    Como no todos los valores pueden ser representados exactamente por un número de punto flotante, el
    resultado de la transformación afín también puede dar valores fuera
    del intervalo solicitado.




    Utilice [Random\Randomizer::getFloat()](#random-randomizer.getfloat) para generar un
    número de punto flotante aleatorio en un intervalo arbitrario. Utilice [Random\Randomizer::getInt()](#random-randomizer.getint)
    para generar un entero aleatorio en un intervalo arbitrario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor pseudoaleatorio, en el intervalo de 0.0 a 1.0 inclusive.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Esta función ha sido deprecada.



### Ver también

    - [Random\Randomizer::getFloat()](#random-randomizer.getfloat) - Devuelve un float seleccionado uniformemente

    - [Random\Randomizer::getInt()](#random-randomizer.getint) - Obtener un entero seleccionado uniformemente

    - [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

# mt_getrandmax

(PHP 4, PHP 5, PHP 7, PHP 8)

mt_getrandmax — El valor aleatorio más grande posible

### Descripción

    **mt_getrandmax**(): [int](#language.types.integer)

Devuelve el valor aleatorio más grande posible que puede
devolver la función [mt_rand()](#function.mt-rand) sin argumento, lo que
corresponde al valor máximo que puede ser utilizado para su parámetro
max sin que el resultado sea ampliado (y por lo tanto menos
aleatorio).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor aleatorio más grande posible devuelto por
la función [mt_rand()](#function.mt-rand)

### Ver también

    - [mt_rand()](#function.mt-rand) - Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister

    - [mt_srand()](#function.mt-srand) - Inicializa el generador de números aleatorios Mersenne Twister

    - [getrandmax()](#function.getrandmax) - Valor aleatorio máximo posible

# mt_rand

(PHP 4, PHP 5, PHP 7, PHP 8)

mt_rand — Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister

### Descripción

**mt_rand**(): [int](#language.types.integer)

**mt_rand**([int](#language.types.integer) $min, [int](#language.types.integer) $max): [int](#language.types.integer)

Muchos generadores de números aleatorios
provenientes de viejas bibliotecas libcs tienen comportamientos
dudosos y son muy lentos. **mt_rand()** es una
función de reemplazo para [rand()](#function.rand). Utiliza un
generador de números aleatorios de característica
conocida, el " [» Mersenne Twister](http://www.math.sci.hiroshima-u.ac.jp/~m-mat/MT/emt.html) " que
es 4 veces más rápido que la función estándar libc.

Llamada sin los argumentos opcionales min y
max, **mt_rand()** devuelve un número
pseudoaleatorio, entre 0 y [mt_getrandmax()](#function.mt-getrandmax).
Para obtener un número entre 5 y 15 inclusive, se debe utilizar
mt_rand(5,15).

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     min


       Valor más bajo que puede ser devuelto (por omisión: 0)






     max


       Valor más alto que puede ser devuelto (por omisión: [mt_getrandmax()](#function.mt-getrandmax)).





### Valores devueltos

Un [int](#language.types.integer) aleatorio comprendido entre min (o 0)
y max (o [mt_getrandmax()](#function.mt-getrandmax), inclusivo).

### Errores/Excepciones

- Si max es inferior a min,
  se lanzará una excepción [ValueError](#class.valueerror).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Se lanzará una excepción [ValueError](#class.valueerror) si max es inferior a min;
        anteriormente, se emitía un **[E_WARNING](#constant.e-warning)** y la función devolvía **[false](#constant.false)**.




       7.2.0

        **mt_rand()** [recibió una corrección de error](#migration72.incompatible.rand-mt_rand-output) para un bug de polarización módulo. Esto significa que las secuencias generadas con un valor de inicialización específico pueden diferir de PHP 7.1 en máquinas de 64 bits.




       7.1.0

        [rand()](#function.rand) [se convirtió](#migration71.incompatible.rand-srand-aliases) en un alias de **mt_rand()**.




       7.1.0

        **mt_rand()**
        [fue actualizado](#migration71.incompatible.fixes-to-mt_rand-algorithm)
        para utilizar la versión corregida, correcta, del algoritmo Twister
        Mersenne. Para volver al comportamiento anterior, utilice
        [mt_srand()](#function.mt-srand) con **[MT_RAND_PHP](#constant.mt-rand-php)**
        como segundo parámetro.





### Ejemplos

    **Ejemplo #1 Ejemplo con mt_rand()**

&lt;?php
echo mt_rand(), "\n";
echo mt_rand(), "\n";

echo mt_rand(5, 15), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

1604716014
1478613278
6

### Notas

**Advertencia**

    El rango min max debe estar
    dentro del rango [mt_getrandmax()](#function.mt-getrandmax). es decir,
    (max - min) &lt;=
    [mt_getrandmax()](#function.mt-getrandmax) de lo contrario, **mt_rand()** puede
    devolver números aleatorios de menor calidad de lo que debería.

### Ver también

    - [mt_srand()](#function.mt-srand) - Inicializa el generador de números aleatorios Mersenne Twister

    - [mt_getrandmax()](#function.mt-getrandmax) - El valor aleatorio más grande posible

    - [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# mt_srand

(PHP 4, PHP 5, PHP 7, PHP 8)

mt_srand — Inicializa el generador de números aleatorios Mersenne Twister

### Descripción

**mt_srand**([?](#language.types.null)[int](#language.types.integer) $seed
= **[null](#constant.null)**, [int](#language.types.integer) $mode = **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**): [void](language.types.void.html)

**mt_srand()** inicializa el generador de
valores aleatorios con seed o con
un valor aleatorio si ningún parámetro
seed es proporcionado.

**Nota**:
No es necesario inicializar el generador de números aleatorios con
[srand()](#function.srand) o **mt_srand()**, esto se hace automáticamente.

**Precaución**

Dado que el motor Mt19937 ("Mersenne Twister") toma un solo entero de 32 bits como
semilla, el número de secuencias aleatorias posibles está limitado a solo 232
(por ejemplo 4 294 967 296), a pesar de la enorme período de Mt19937 de 219937-1.

Cuando se confía en una semilla aleatoria implícita o explícita, las duplicaciones aparecerán
mucho antes. Las semillas duplicadas son esperadas con una probabilidad del 50% después de menos de
80 000 semillas generadas aleatoriamente según el problema del cumpleaños. Una probabilidad del 10%
de una semilla duplicada ocurre después de haber generado aproximadamente 30 000 semillas de manera aleatoria.

Esto hace que Mt19937 sea inadecuado para aplicaciones donde las secuencias duplicadas no deben ocurrir con
más que una probabilidad despreciable. Si se requiere una semilla reproducible, tanto el
motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) como [Random\Engine\PcgOneseq128XslRr64](#class.random-engine-pcgoneseq128xslrr64)
soportan semillas mucho más grandes que son poco propensas a colisionar aleatoriamente. Si la reproductibilidad
no es requerida, el motor [Random\Engine\Secure](#class.random-engine-secure) proporciona datos aleatorios criptográficamente
seguros.

### Parámetros

     seed


       Rellena el estado con valores generados por un generador congruencial lineal
       que ha sido inicializado con seed interpretado como un entero sin signo
       de 32 bits.




       Si seed es omitido o **[null](#constant.null)**, un entero sin signo
       de 32 bits será utilizado de manera aleatoria.






     mode


       Utilice una de las constantes siguientes para especificar la implementación del algoritmo a utilizar.



        -
         **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**:
         La implementación correcta de Mt19937, disponible a partir de PHP 7.1.0.


        -
         **[MT_RAND_PHP](#constant.mt-rand-php)**
         Utiliza una implementación incorrecta de Mersenne Twister que era el valor por omisión antes de PHP 7.1.0.
         Este modo está disponible para asegurar la compatibilidad ascendente.




      **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        seed es ahora nullable.




       7.1.0

        [srand()](#function.srand) [ha sido cambiado](#migration71.incompatible.rand-srand-aliases) para ser un alias de **mt_srand()**.




       7.1.0

        [mt_rand()](#function.mt-rand) [ha sido actualizado](#migration71.incompatible.fixes-to-mt_rand-algorithm) para utilizar la versión corregida, correcta
        del algoritmo de Mersenne Twister. Para volver al comportamiento anterior,
        utilice **mt_srand()** con **[MT_RAND_PHP](#constant.mt-rand-php)** como segundo parámetro.





### Ver también

    - [mt_rand()](#function.mt-rand) - Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister

    - [mt_getrandmax()](#function.mt-getrandmax) - El valor aleatorio más grande posible

    - [srand()](#function.srand) - Inicializa el generador de números aleatorios

# rand

(PHP 4, PHP 5, PHP 7, PHP 8)

rand — Genera un valor aleatorio

### Descripción

**rand**(): [int](#language.types.integer)

**rand**([int](#language.types.integer) $min, [int](#language.types.integer) $max): [int](#language.types.integer)

Llamada sin los argumentos min y
max, **rand()** devuelve un
número pseudoaleatorio entre 0 y [getrandmax()](#function.getrandmax).
Si se desea un número aleatorio entre 5 y 15
(inclusive), por ejemplo, se puede utilizar rand (5, 15).

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

**Nota**:

    Antes de PHP 7.1.0, [getrandmax()](#function.getrandmax) valía solo 32767 en ciertas plataformas
    (como Windows). Si se necesita un rango superior a 32767, se recomienda especificar
    un valor límite superior a 32767, al especificar min y
    max, se permitirá utilizar un intervalo
    más grande que [mt_getrandmax()](#function.mt-getrandmax), o bien, utilizar la función
    [mt_rand()](#function.mt-rand) en su lugar.

**Nota**: A partir de PHP 7.1.0, **rand()** utiliza el mismo
generador de números aleatorios que [mt_rand()](#function.mt-rand). Para
preservar la compatibilidad ascendente, **rand()** permite que
max sea más pequeño que min
en oposición al retorno **[false](#constant.false)** de [mt_rand()](#function.mt-rand)

### Parámetros

     min


       El valor más pequeño a devolver (por omisión, 0)






     max


       El valor más grande a devolver (por omisión, [mt_getrandmax()](#function.mt-getrandmax))





### Valores devueltos

Un valor pseudoaleatorio, comprendido entre
min (o 0) y
max (o [mt_getrandmax()](#function.mt-getrandmax), inclusive).

### Historial de cambios

       Versión
       Descripción






       7.2.0

        **rand()**
        [recibió una corrección de error](#migration72.incompatible.rand-mt_rand-output)
        para un bug de polarización módulo. Esto significa que las secuencias
        generadas en ciertos casos específicos pueden diferir de PHP 7.1 en
        las máquinas de 64 bits.




       7.1.0

        **rand()** [fue hecho](#migration71.incompatible.rand-srand-aliases) un alias de [mt_rand()](#function.mt-rand).





### Ejemplos

    **Ejemplo #1 Ejemplo con rand()**

&lt;?php
echo rand(), "\n";
echo rand(), "\n";

echo rand(5, 15), "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

7771
22264
11

### Notas

**Advertencia**

    El rango min max debe situarse
    dentro del rango [getrandmax()](#function.getrandmax). es decir, (max
    - min) &lt;= [getrandmax()](#function.getrandmax) de lo contrario,
    **rand()** puede devolver números aleatorios de mala
    calidad.

### Ver también

    - [srand()](#function.srand) - Inicializa el generador de números aleatorios

    - [getrandmax()](#function.getrandmax) - Valor aleatorio máximo posible

    - [mt_rand()](#function.mt-rand) - Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister

    - [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

    - [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# random_bytes

(PHP 7, PHP 8)

random_bytes — Obtiene bytes aleatorios criptográficamente seguros

### Descripción

**random_bytes**([int](#language.types.integer) $length): [string](#language.types.string)

Genera una cadena que contiene bytes seleccionados uniformemente de manera aleatoria con el valor de length.

Dado que los bytes devueltos se eligen completamente al azar, la cadena resultante probablemente contendrá
caracteres no imprimibles o secuencias UTF-8 inválidas. Puede ser necesario
codificarlos antes de la transmisión o visualización.

La aleatorización generada por esta función es adecuada para todas las aplicaciones, incluyendo
la generación de secretos a largo plazo, como claves de cifrado.

Las fuentes de aleatoriedad por orden de prioridad son las siguientes:

- Linux: [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- FreeBSD &gt;= 12 (PHP &gt;= 7.3): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Windows (PHP &gt;= 7.2): [» CNG-API](https://docs.microsoft.com/en-us/windows/desktop/SecCNG/cng-portal)

    Windows: [» CryptGenRandom](<https://msdn.microsoft.com/en-us/library/windows/desktop/aa379942(v=vs.85).aspx>)

- macOS (PHP &gt;= 8.2; &gt;= 8.1.9; &gt;= 8.0.22 si CCRandomGenerateBytes está disponible en el momento de la compilación): CCRandomGenerateBytes()

    macOS (PHP &gt;= 8.1; &gt;= 8.0.2): arc4random_buf(), /dev/urandom

- NetBSD &gt;= 7 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- OpenBSD &gt;= 5.5 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- DragonflyBSD (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Solaris (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

-     Cualquier combinación de un sistema operativo y una versión de PHP no mencionada anteriormente:
      /dev/urandom.

-     Si ninguna de las fuentes de aleatoriedad está disponible o todas fallan al generar
      aleatoriedad, se lanzará una excepción de tipo [Random\RandomException](#class.random-randomexception).

**Nota**:

    Aunque esta función fue añadida en PHP 7.0, una
    [» implementación en espacio de usuario](https://github.com/paragonie/random_compat)
    está disponible para PHP 5.2 hasta 5.6, inclusive.

### Parámetros

    length


      La longitud de la [string](#language.types.string) aleatoria que debe ser devuelta en bytes; debe ser mayor o igual a 1.


### Valores devueltos

Devuelve una [string](#language.types.string) que contiene el número solicitado de bytes criptográficamente seguros.

### Errores/Excepciones

- Si no se encuentra ninguna fuente de datos aleatorios, se lanzará una
  [Random\RandomException](#class.random-randomexception).
    - Si el valor de length es menor que 1,
      se lanzará una [ValueError](#class.valueerror).

    ### Historial de cambios

        Versión
        Descripción






        8.2.0

         En caso de fallo CSPRNG, esta función lanzará
         ahora una [Random\RandomException](#class.random-randomexception).
         Anteriormente se lanzaba una [Exception](#class.exception) básica.

    ### Ejemplos

    **Ejemplo #1 Ejemplo con random_bytes()**

&lt;?php
$bytes = random_bytes(5);
var_dump(bin2hex($bytes));
?&gt;

Resultado del ejemplo anterior es similar a:

string(10) "385e33f741"

### Ver también

- [Random\Randomizer::getBytes()](#random-randomizer.getbytes) - Devuelve bytes aleatorios

- [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

- [bin2hex()](#function.bin2hex) - Convierte datos binarios en representación hexadecimal

- [base64_encode()](#function.base64-encode) - Codifica datos con MIME base64

# random_int

(PHP 7, PHP 8)

random_int — Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

### Descripción

**random_int**([int](#language.types.integer) $min, [int](#language.types.integer) $max): [int](#language.types.integer)

Genera un integer seleccionado uniformemente entre los valores mínimo y máximo proporcionados.

La aleatorización generada por esta función es adecuada para todas las aplicaciones, incluyendo
la generación de secretos a largo plazo, como claves de cifrado.

Las fuentes de aleatoriedad por orden de prioridad son las siguientes:

- Linux: [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- FreeBSD &gt;= 12 (PHP &gt;= 7.3): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Windows (PHP &gt;= 7.2): [» CNG-API](https://docs.microsoft.com/en-us/windows/desktop/SecCNG/cng-portal)

    Windows: [» CryptGenRandom](<https://msdn.microsoft.com/en-us/library/windows/desktop/aa379942(v=vs.85).aspx>)

- macOS (PHP &gt;= 8.2; &gt;= 8.1.9; &gt;= 8.0.22 si CCRandomGenerateBytes está disponible en el momento de la compilación): CCRandomGenerateBytes()

    macOS (PHP &gt;= 8.1; &gt;= 8.0.2): arc4random_buf(), /dev/urandom

- NetBSD &gt;= 7 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- OpenBSD &gt;= 5.5 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- DragonflyBSD (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Solaris (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

-     Cualquier combinación de un sistema operativo y una versión de PHP no mencionada anteriormente:
      /dev/urandom.

-     Si ninguna de las fuentes de aleatoriedad está disponible o todas fallan al generar
      aleatoriedad, se lanzará una excepción de tipo [Random\RandomException](#class.random-randomexception).

**Nota**:

    Aunque esta función fue añadida en PHP 7.0, una
    [» implementación en espacio de usuario](https://github.com/paragonie/random_compat)
    está disponible para PHP 5.2 hasta 5.6, inclusive.

### Parámetros

    min


      El valor mínimo a retornar.






    max


      El valor máximo a retornar.


### Valores devueltos

Un integer seleccionado de manera uniforme y criptográficamente segura desde
el intervalo cerrado [min, max].
Ambos valores min y max pueden ser retornados.

### Errores/Excepciones

- Si no se encuentra ninguna fuente de datos aleatorios, se lanzará una
  [Random\RandomException](#class.random-randomexception).
    - Si max es menor que min,
      se lanzará una [ValueError](#class.valueerror).

    ### Historial de cambios

        Versión
        Descripción






        8.2.0

         En caso de fallo CSPRNG, esta función lanzará
         ahora una [Random\RandomException](#class.random-randomexception).
         Anteriormente se lanzaba una [Exception](#class.exception) básica.

    ### Ejemplos

    **Ejemplo #1 Ejemplo con random_int()**

&lt;?php
var_dump(random_int(100, 999));
var_dump(random_int(-1000, 0));
?&gt;

Resultado del ejemplo anterior es similar a:

int(248)
int(-898)

### Ver también

- [Random\Randomizer::getInt()](#random-randomizer.getint) - Obtener un entero seleccionado uniformemente

- [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# srand

(PHP 4, PHP 5, PHP 7, PHP 8)

srand — Inicializa el generador de números aleatorios

### Descripción

**srand**([?](#language.types.null)[int](#language.types.integer) $seed = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**): [void](language.types.void.html)

Inicializa el generador de números aleatorios con
seed, o con un valor aleatorio
si no se proporciona un seed.

**Nota**:
No es necesario inicializar el generador de números aleatorios con
**srand()** o [mt_srand()](#function.mt-srand), esto se hace automáticamente.

**Precaución**

Dado que el motor Mt19937 ("Mersenne Twister") toma un solo entero de 32 bits como
semilla, el número de secuencias aleatorias posibles está limitado a solo 232
(por ejemplo 4 294 967 296), a pesar de la enorme período de Mt19937 de 219937-1.

Cuando se confía en una semilla aleatoria implícita o explícita, las duplicaciones aparecerán
mucho antes. Las semillas duplicadas son esperadas con una probabilidad del 50% después de menos de
80 000 semillas generadas aleatoriamente según el problema del cumpleaños. Una probabilidad del 10%
de una semilla duplicada ocurre después de haber generado aproximadamente 30 000 semillas de manera aleatoria.

Esto hace que Mt19937 sea inadecuado para aplicaciones donde las secuencias duplicadas no deben ocurrir con
más que una probabilidad despreciable. Si se requiere una semilla reproducible, tanto el
motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) como [Random\Engine\PcgOneseq128XslRr64](#class.random-engine-pcgoneseq128xslrr64)
soportan semillas mucho más grandes que son poco propensas a colisionar aleatoriamente. Si la reproductibilidad
no es requerida, el motor [Random\Engine\Secure](#class.random-engine-secure) proporciona datos aleatorios criptográficamente
seguros.

**Nota**:
Desde PHP 7.1.0, **srand()** es un alias de [mt_srand()](#function.mt-srand).

### Parámetros

     seed


       Rellena el estado con valores generados por un generador congruencial lineal
       que ha sido inicializado con seed interpretado como un entero sin signo
       de 32 bits.




       Si seed es omitido o **[null](#constant.null)**, se utilizará un entero sin signo
       de 32 bits de manera aleatoria.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        seed es ahora nullable.




       7.1.0

        **srand()** [se ha convertido](#migration71.incompatible.rand-srand-aliases) en un alias de [mt_srand()](#function.mt-srand).





### Ver también

    - [rand()](#function.rand) - Genera un valor aleatorio

    - [getrandmax()](#function.getrandmax) - Valor aleatorio máximo posible

    - [mt_srand()](#function.mt-srand) - Inicializa el generador de números aleatorios Mersenne Twister

## Tabla de contenidos

- [getrandmax](#function.getrandmax) — Valor aleatorio máximo posible
- [lcg_value](#function.lcg-value) — Generador de congruencia lineal combinada
- [mt_getrandmax](#function.mt-getrandmax) — El valor aleatorio más grande posible
- [mt_rand](#function.mt-rand) — Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister
- [mt_srand](#function.mt-srand) — Inicializa el generador de números aleatorios Mersenne Twister
- [rand](#function.rand) — Genera un valor aleatorio
- [random_bytes](#function.random-bytes) — Obtiene bytes aleatorios criptográficamente seguros
- [random_int](#function.random-int) — Obtiene un integer seleccionado de manera uniforme y criptográficamente segura
- [srand](#function.srand) — Inicializa el generador de números aleatorios

# La clase Random\Randomizer

(PHP 8 &gt;= 8.2.0)

## Introducción

    Proporciona una API de alto nivel para la aleatoriedad proporcionada por [Random\Engine](#class.random-engine).

## Sinopsis de la Clase

     final
     class **Random\Randomizer**
     {

    /* Propiedades */

     public
     readonly
     [Random\Engine](#class.random-engine)
      [$engine](#random-randomizer.props.engine);


    /* Métodos */

public [\_\_construct](#random-randomizer.construct)([?](#language.types.null)[Random\Engine](#class.random-engine) $engine = **[null](#constant.null)**)

    public [getBytes](#random-randomizer.getbytes)([int](#language.types.integer) $length): [string](#language.types.string)

public [getBytesFromString](#random-randomizer.getbytesfromstring)([string](#language.types.string) $string, [int](#language.types.integer) $length): [string](#language.types.string)
public [getFloat](#random-randomizer.getfloat)([float](#language.types.float) $min, [float](#language.types.float) $max, [Random\IntervalBoundary](#enum.random-intervalboundary) $boundary = Random\IntervalBoundary::ClosedOpen): [float](#language.types.float)
public [getInt](#random-randomizer.getint)([int](#language.types.integer) $min, [int](#language.types.integer) $max): [int](#language.types.integer)
public [nextFloat](#random-randomizer.nextfloat)(): [float](#language.types.float)
public [nextInt](#random-randomizer.nextint)(): [int](#language.types.integer)
public [pickArrayKeys](#random-randomizer.pickarraykeys)([array](#language.types.array) $array, [int](#language.types.integer) $num): [array](#language.types.array)
public [\_\_serialize](#random-randomizer.serialize)(): [array](#language.types.array)
public [shuffleArray](#random-randomizer.shufflearray)([array](#language.types.array) $array): [array](#language.types.array)
public [shuffleBytes](#random-randomizer.shufflebytes)([string](#language.types.string) $bytes): [string](#language.types.string)
public [\_\_unserialize](#random-randomizer.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

## Propiedades

     engine


       Fuente de aleatoriedad de bajo nivel para los métodos de [Random\Randomizer](#class.random-randomizer).





# Random\Randomizer::\_\_construct

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::\_\_construct — Construye un nuevo Randomizer

### Descripción

public **Random\Randomizer::\_\_construct**([?](#language.types.null)[Random\Engine](#class.random-engine) $engine = **[null](#constant.null)**)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    engine


      El [Random\Engine](#class.random-engine) a usar para generar aleatoriedad.





      Si engine se omite o es **[null](#constant.null)**, se usará un nuevo objeto [Random\Engine\Secure](#class.random-engine-secure).


### Ejemplos

**Ejemplo #1 Random\Randomizer::\_\_construct()** ejemplo

&lt;?php
$r = new \Random\Randomizer();
$r = new \Random\Randomizer(new \Random\Engine\Mt19937());
?&gt;

# Random\Randomizer::getBytes

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::getBytes — Devuelve bytes aleatorios

### Descripción

public **Random\Randomizer::getBytes**([int](#language.types.integer) $length): [string](#language.types.string)

Genera una cadena que contiene bytes aleatorios seleccionados uniformemente de la length solicitada.

Dado que los bytes devueltos se seleccionan de manera completamente aleatoria, la cadena resultante puede contener
caracteres no imprimibles o secuencias UTF-8 no válidas. Puede ser necesario codificarla antes de transmitirla o mostrarla.

### Parámetros

    length


      La longitud de la cadena aleatoria [string](#language.types.string) que debe ser devuelta en bytes; debe ser 1 o más.


### Valores devueltos

Una [string](#language.types.string) que contiene el número solicitado de bytes aleatorios.

### Errores/Excepciones

- Si el valor de length es inferior a 1,
  se lanzará una [ValueError](#class.valueerror).

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::getBytes()**

&lt;?php
$r = new \Random\Randomizer();

echo bin2hex($r-&gt;getBytes(8)), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

ebdbe93cd56682c2

### Ver también

- [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

- [bin2hex()](#function.bin2hex) - Convierte datos binarios en representación hexadecimal

- [base64_encode()](#function.base64-encode) - Codifica datos con MIME base64

- [Random\Randomizer::getBytesFromString()](#random-randomizer.getbytesfromstring) - Devuelve bytes aleatorios a partir de una cadena

# Random\Randomizer::getBytesFromString

(PHP 8 &gt;= 8.3.0)

Random\Randomizer::getBytesFromString — Devuelve bytes aleatorios a partir de una cadena

### Descripción

public **Random\Randomizer::getBytesFromString**([string](#language.types.string) $string, [int](#language.types.integer) $length): [string](#language.types.string)

Genera una cadena que contiene bytes aleatorios seleccionados uniformemente de la
string de entrada con la length solicitada.

La probabilidad de que un byte sea seleccionado es proporcional a su parte
de la string de entrada. Si cada byte ocurre
el mismo número de veces, cada byte tiene la misma probabilidad de ser seleccionado.

### Parámetros

     string


       La [string](#language.types.string) de entrada a partir de la cual se seleccionan los bytes devueltos.






     length


       La longitud de la cadena aleatoria [string](#language.types.string) que debe ser devuelta en bytes; debe ser 1 o más.





### Valores devueltos

Una [string](#language.types.string) que contiene el número solicitado de bytes aleatorios tomados de la entrada string.

### Errores/Excepciones

- Si string está vacía,
  se lanzará una [ValueError](#class.valueerror).

- Si el valor de length es inferior a 1,
  se lanzará una [ValueError](#class.valueerror).

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::getBytesFromString()**

&lt;?php
$randomizer = new \Random\Randomizer();

printf(
"%s.example.com",
$randomizer-&gt;getBytesFromString('abcdefghijklmnopqrstuvwxyz0123456789', 16)
);
?&gt;

Resultado del ejemplo anterior es similar a:

3zsw04eiubcf82jd.example.com

**Ejemplo #2 Generar un código aleatorio para la autenticación multi-factor**

&lt;?php
// El motor Secure es el motor por omisión, pero se hace explícito, ya que
// los códigos multi-factor son sensibles a la seguridad.
$randomizer = new \Random\Randomizer(new \Random\Engine\Secure());

echo implode('-', str_split($randomizer-&gt;getBytesFromString('0123456789', 20), 5));
?&gt;

Resultado del ejemplo anterior es similar a:

11551-80418-27047-42075

**Ejemplo #3 Seleccionar a partir de una cadena con una distribución no uniforme**

&lt;?php
$randomizer = new \Random\Randomizer();

echo $randomizer-&gt;getBytesFromString('aaaaabcdef', 20);
?&gt;

Resultado del ejemplo anterior es similar a:

fddacbeaaeaaacaaaaca

### Ver también

- [Random\Randomizer::getBytes()](#random-randomizer.getbytes) - Devuelve bytes aleatorios

# Random\Randomizer::getFloat

(PHP 8 &gt;= 8.3.0)

Random\Randomizer::getFloat — Devuelve un float seleccionado uniformemente

### Descripción

public **Random\Randomizer::getFloat**([float](#language.types.float) $min, [float](#language.types.float) $max, [Random\IntervalBoundary](#enum.random-intervalboundary) $boundary = Random\IntervalBoundary::ClosedOpen): [float](#language.types.float)

Devuelve un float seleccionado uniformemente y equidistribuido de un intervalo solicitado.

Debido a la precisión limitada, no todos los números reales pueden ser
representados exactamente como floats.

Si un número no puede ser representado exactamente, se redondea al número
exactamente representable más cercano.

Además, los floats no son igualmente densos en toda la línea de números.

Debido a que los floats utilizan un exponente binario, la distancia entre dos
floats vecinos se duplica en cada potencia de dos.

En otras palabras: Hay el mismo número de floats representables entre
1.0 y 2.0
que entre
2.0 y 4.0,
4.0 y 8.0,
8.0 y 16.0,
y así sucesivamente.

Seleccionar un número aleatorio en un intervalo arbitrario, por ejemplo
dividiendo dos enteros, podría resultar en una distribución sesgada por esta razón.

El redondeo necesario hará que algunos floats sean devueltos con más frecuencia que
otros, en particular alrededor de las potencias de dos cuando la densidad de los floats
cambia.

**Random\Randomizer::getFloat()** implementa un algoritmo que
devolverá un float seleccionado uniformemente del conjunto más grande posible
de floats exactamente representables y equidistribuidos en el intervalo solicitado.

La distancia entre los floats seleccionables (« paso ») corresponde a la distancia
entre los floats con la densidad más baja, es decir, la distancia entre los
floats en los límites del intervalo con el valor absoluto más grande.

Esto significa que no todos los floats representables en un intervalo dado pueden
ser devueltos si el intervalo cruza una o más potencias de dos.

El paso comenzará en el límite del intervalo con el valor absoluto más grande
para garantizar que los pasos se alineen con los floats exactamente representables.

Los límites de intervalo cerrados siempre estarán incluidos en el conjunto de floats
seleccionables.

Por lo tanto, si el tamaño del intervalo no es un múltiplo exacto del paso y el límite
con el valor absoluto más pequeño es un límite cerrado, la distancia entre este límite
y su float más cercano será más pequeña que el paso.

**Precaución**

    El postprocesamiento de los floats devueltos corre el riesgo de romper la equidistribución uniforme,
    ya que los floats intermedios en una operación matemática sufren un redondeo implícito.

    El intervalo solicitado debe corresponder lo más estrechamente posible al intervalo deseado
    y el redondeo solo debe realizarse como una operación explícita justo antes
    de mostrar el número seleccionado a un usuario.

#### Explicaciones del algoritmo utilizando valores de ejemplo

    Para dar un ejemplo del funcionamiento del algoritmo, consideremos una representación
    en coma flotante que utiliza una mantisa de 3 bits.

    Esto es capaz de representar 8 valores float
    diferentes entre las potencias de dos consecutivas.

    Esto significa que entre
    1.0 y 2.0 todos los pasos de tamaño 0.125
    son exactamente representables y entre 2.0 y 4.0
    todos los pasos de tamaño 0.25 son exactamente representables.

    En realidad, los floats de PHP utilizan una mantisa de 52 bits y pueden representar
    252 valores diferentes entre cada potencia de dos.

    Esto significa que



     - 1.0

     - 1.125

     - 1.25

     - 1.375

     - 1.5

     - 1.625

     - 1.75

     - 1.875

     - 2.0

     - 2.25

     - 2.5

     - 2.75

     - 3.0

     - 3.25

     - 3.5

     - 3.75

     - 4.0


    son los floats exactamente representables entre
    1.0 y 4.0.


    Ahora consideremos que $randomizer-&gt;getFloat(1.625, 2.5, IntervalBoundary::ClosedOpen)
    es llamado, es decir, que se solicita un float aleatorio comenzando en 1.625 hasta,
    pero sin incluir, 2.5.

    El algoritmo determina primero el paso en el límite con el valor absoluto más grande
    (2.5). El paso en este límite es 0.25.




    Es de notar que el tamaño del intervalo solicitado es 0.875, que no es
    un múltiplo exacto de 0.25.

    Si el algoritmo comenzara a caminar en el límite inferior 1.625, encontraría
    2.125, que no es exactamente representable y sufriría
    un redondeo implícito.

    Por lo tanto, el algoritmo comienza a caminar en el límite superior 2.5.

    Los valores seleccionables son:



     - 2.25

     - 2.0

     - 1.75

     - 1.625



    2.5 no está incluido, ya que el límite superior del intervalo solicitado
    es un límite abierto.

    1.625 está incluido, incluso si su distancia al valor más cercano
    1.75 es 0.125, que es más pequeña que el paso
    determinado previamente de 0.25.

    La razón por la que es así es que el intervalo solicitado está cerrado en el límite
    inferior (1.625) y los límites cerrados siempre están incluidos.


    Finalmente, el algoritmo selecciona uniformemente uno de los cuatro valores seleccionables
    al azar y lo devuelve.




    ##### Por qué dividir dos enteros no funciona


     En el ejemplo anterior, hay ocho números float representables
     entre cada subintervalo delimitado por una potencia de dos.

     Para dar un ejemplo de por qué dividir dos enteros no funcionaría bien
     para generar un float aleatorio, consideremos que hay 16 números float
     uniformemente distribuidos en el intervalo abierto a la derecha de 0.0
     hasta, pero sin incluir, 1.0. La mitad de ellos son los
     ocho valores exactamente representables entre 0.5 y 1.0,
     la otra mitad son los valores entre 0.0 y 1.0
     con un paso de 0.0625.

     Estos valores pueden generarse fácilmente dividiendo un entero aleatorio entre
     0 y 15 por 16 para obtener
     uno de los siguientes valores:




      - 0.0

      - 0.0625

      - 0.125

      - 0.1875

      - 0.25

      - 0.3125

      - 0.375

      - 0.4375

      - 0.5

      - 0.5625

      - 0.625

      - 0.6875

      - 0.75

      - 0.8125

      - 0.875

      - 0.9375




     Este float aleatorio podría escalarse al intervalo abierto a la derecha
     de 1.625 hasta, pero sin incluir, 2.75 multiplicándolo por el tamaño
     del intervalo (0.875) y añadiendo el mínimo 1.625.
     Esta transformación afín daría los siguientes valores:




      - 1.625 redondeado a 1.625

      - 1.679 redondeado a 1.625

      - 1.734 redondeado a 1.75

      - 1.789 redondeado a 1.75

      - 1.843 redondeado a 1.875

      - 1.898 redondeado a 1.875

      - 1.953 redondeado a 2.0

      - 2.007 redondeado a 2.0

      - 2.062 redondeado a 2.0

      - 2.117 redondeado a 2.0

      - 2.171 redondeado a 2.25

      - 2.226 redondeado a 2.25

      - 2.281 redondeado a 2.25

      - 2.335 redondeado a 2.25

      - 2.390 redondeado a 2.5

      - 2.445 redondeado a 2.5



     Es de notar cómo el límite superior de 2.5 sería devuelto,
     a pesar del hecho de que sea un límite abierto y por lo tanto excluido.

     También es de notar cómo 2.0 y 2.25 tienen el doble de
     probabilidades de ser devueltos en comparación con los otros valores.

### Parámetros

     min


       El límite inferior del intervalo.






     max


       El límite superior del intervalo.






     boundary


       Especifica si los límites del intervalo son valores de retorno posibles.





### Valores devueltos

Un valor float seleccionado uniformemente y equidistribuido del intervalo especificado por
min, max y boundary.

Si boundary es **[Random\IntervalBoundary::ClosedClosed](#random-intervalboundary.constants.closedclosed)**,
min y max son valores de retorno posibles.

### Errores/Excepciones

- Si el valor de min no es finito ([is_finite()](#function.is-finite)),
  se lanzará una [ValueError](#class.valueerror).

- Si el valor de max no es finito ([is_finite()](#function.is-finite)),
  se lanzará una [ValueError](#class.valueerror).

- Si el intervalo solicitado no contiene ningún valor,
  se lanzará una [ValueError](#class.valueerror).

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::getFloat()**

&lt;?php
$randomizer = new \Random\Randomizer();

// Es de notar que la granularidad de la latitud es el doble
// de la granularidad de la longitud.
//
// Para la latitud, el valor puede ser tanto -90 como 90.
// Para la longitud, el valor puede ser 180, pero no -180, ya que
// -180 y 180 se refieren a la misma longitud.
printf(
"Lat: %+.6f Lng: %+.6f",
$randomizer-&gt;getFloat(-90, 90, \Random\IntervalBoundary::ClosedClosed),
$randomizer-&gt;getFloat(-180, 180, \Random\IntervalBoundary::OpenClosed),
);
?&gt;

Resultado del ejemplo anterior es similar a:

Lat: +69.244304 Lng: -53.548951

### Notas

**Nota**:

    Este método implementa el algoritmo de la sección γ tal como se publicó en
    [» 
     Dibujar números float aleatorios de un intervalo.
     Frédéric Goual
    ](https://dl.acm.org/doi/10.1145/3503512)
    para obtener las propiedades de comportamiento deseadas.

### Ver también

- [Random\Randomizer::nextFloat()](#random-randomizer.nextfloat) - Devuelve un float seleccionado del intervalo abierto a la derecha [0.0, 1.0)

- [Random\Randomizer::getInt()](#random-randomizer.getint) - Obtener un entero seleccionado uniformemente

# Random\Randomizer::getInt

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::getInt — Obtener un entero seleccionado uniformemente

### Descripción

public **Random\Randomizer::getInt**([int](#language.types.integer) $min, [int](#language.types.integer) $max): [int](#language.types.integer)

### Parámetros

    min


      El valor más bajo que se devolverá.






    max


      El valor más alto que se devolverá.


### Valores devueltos

Un entero seleccionado uniformemente del intervalo cerrado
[min, max]. Tanto
min como max son
valores de retorno posibles.

### Errores/Excepciones

- Si max es menor que min, se lanzará
  un [ValueError](#class.valueerror).

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Random\Randomizer::getInt()** ejemplo

&lt;?php
$r = new \Random\Randomizer();

// Entero aleatorio en el rango:
echo $r-&gt;getInt(1, 100), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

42

### Ver también

- [random_int()](#function.random-int) - Obtiene un integer seleccionado de manera uniforme y criptográficamente segura

- [Random\Randomizer::getFloat()](#random-randomizer.getfloat) - Devuelve un float seleccionado uniformemente

# Random\Randomizer::nextFloat

(PHP 8 &gt;= 8.3.0)

Random\Randomizer::nextFloat — Devuelve un float seleccionado del intervalo abierto a la derecha [0.0, 1.0)

### Descripción

public **Random\Randomizer::nextFloat**(): [float](#language.types.float)

Devuelve un float seleccionado de manera uniforme y equidistribuida del intervalo abierto a la derecha
de 0.0 hasta, pero sin incluir, 1.0.

La probabilidad de que un float devuelto esté en un subintervalo dado abierto a la derecha
es proporcional al tamaño del subintervalo.

Esto significa que la probabilidad de que un float sea _menor que_ 0.5
es del 50 %, lo cual es igual a la probabilidad de que un float sea _al menos_ 0.5.

Del mismo modo, la probabilidad de que un float esté en el intervalo abierto a la derecha de
0.2 hasta, pero sin incluir, 0.25
es exactamente del 5 %.

Esta propiedad permite utilizar fácilmente **Random\Randomizer::nextFloat()**
para generar un bool aleatorio con una probabilidad dada verificando si el float devuelto es
_menor que_ una probabilidad dada.

**Nota**:

    El dominio de los floats devueltos por **Random\Randomizer::nextFloat()**
    es idéntico al de Randomizer::getFloat(0.0, 1.0, IntervalBoundary::ClosedOpen).





    La implementación interna de **Random\Randomizer::nextFloat()** es más
    eficiente.

**Precaución**

    Escalar el valor devuelto a un intervalo diferente utilizando la multiplicación
    o la adición (una transformación afín) podría resultar en un sesgo
    en el valor resultante, ya que los floats no son igualmente densos a lo largo de la línea
    de los números. Como no todos los valores pueden ser representados exactamente por un float, el
    resultado de la transformación afín podría también resultar en valores fuera
    del intervalo solicitado debido a redondeos implícitos.

    Una [explicación detallada](#random-randomizer.getfloat.affine-transformation)
    de los problemas con la transformación afín se proporciona en la documentación
    para [Random\Randomizer::getFloat()](#random-randomizer.getfloat).




    Utilizar [Random\Randomizer::getFloat()](#random-randomizer.getfloat) para generar un
    float aleatorio en un intervalo arbitrario. Utilizar [Random\Randomizer::getInt()](#random-randomizer.getint)
    para generar un integer aleatorio en un intervalo arbitrario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un float seleccionado de manera uniforme en el intervalo abierto a la derecha
(IntervalBoundary::ClosedOpen) [0.0, 1.0).

0.0 es un valor de retorno posible, 1.0 no lo es.

### Errores/Excepciones

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::nextFloat()**

&lt;?php
$r = new \Random\Randomizer();

// El resultado del bool será verdadero con la probabilidad dada.
$chance = 0.5;

$bool = $r-&gt;nextFloat() &lt; $chance;

echo ($bool ? "You won" : "You lost"), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

You won

**Ejemplo #2 Escalado incorrecto utilizando una transformación afín**

&lt;?php
final class MaxEngine implements Random\Engine {
public function generate(): string {
return "\xff";
}
}

$randomizer = new \Random\Randomizer(new MaxEngine);

$min = 3.5;
$max = 4.5;

// NO HACER ESTO:
//
// Esto mostrará 4.5, a pesar de que nextFloat() muestree
// desde un intervalo abierto a la derecha, que nunca devolverá 1.
printf("Wrong scaling: %.17g", $randomizer-&gt;nextFloat() * ($max - $min) + $min);

// Correcto:
// $randomizer-&gt;getFloat($min, $max, \Random\IntervalBoundary::ClosedOpen);
?&gt;

El ejemplo anterior mostrará:

Wrong scaling: 4.5

### Ver también

- [Random\Randomizer::getFloat()](#random-randomizer.getfloat) - Devuelve un float seleccionado uniformemente

# Random\Randomizer::nextInt

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::nextInt — Obtener un entero positivo

### Descripción

public **Random\Randomizer::nextInt**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Un entero positivo entre 0 y un valor máximo que depende del número de bytes
    devueltos por [Random\Engine::generate()](#random-engine.generate).
    El valor máximo exacto puede calcularse como 2$engine_bytes * 8 - 1 - 1.

### Errores/Excepciones

- Para evitar inconsistencias, PHP de 32 bits lanzará [Random\RandomException](#class.random-randomexception)
  si el tamaño de salida de [Random\Engine::generate()](#random-engine.generate) excede 32 bits,
  ya que el entero seleccionado no puede devolverse sin pérdida.
  Esto afecta a los motores nativos de 64 bits [Random\Engine\PcgOneseq128XslRr64](#class.random-engine-pcgoneseq128xslrr64) y
  [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar). Cualquier motor de usuario
  que devuelva más de 4 bytes de aleatoriedad también se ve afectado.

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Random\Randomizer::nextInt()** ejemplo

&lt;?php
$r = new \Random\Randomizer();

// Entero "next" aleatorio:
echo $r-&gt;nextInt(), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

8041689838856078718

# Random\Randomizer::pickArrayKeys

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::pickArrayKeys — Selecciona claves de array aleatorias

### Descripción

public **Random\Randomizer::pickArrayKeys**([array](#language.types.array) $array, [int](#language.types.integer) $num): [array](#language.types.array)

Selecciona de manera uniforme num claves de array distintas del array de entrada.

Cada clave del array de entrada tiene la misma posibilidad de ser retornada.

**Precaución**

    La selección de las claves de array depende de la estructura interna del
    array de entrada. Las claves de array retornadas pueden ser diferentes para
    dos arrays de entrada iguales y dos [Random\Engine](#class.random-engine)s con
    un estado idéntico, en función de la manera en que los arrays de entrada hayan sido creados.

### Parámetros

    array


      El array cuyas claves de array son seleccionadas.






    num


      El número de claves de array a retornar; debe estar comprendido entre 1
      y el número de elementos en array.


### Valores devueltos

Un [array](#language.types.array) que contiene num claves de array distintas de array.

El [array](#language.types.array) retornado será una lista ([array_is_list()](#function.array-is-list)). Será un subconjunto
del [array](#language.types.array) retornado por [array_keys()](#function.array-keys).

### Errores/Excepciones

- Si num es inferior a 1 o
  superior al número de elementos en array, se
  lanzará una [ValueError](#class.valueerror).

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::pickArrayKeys()**

&lt;?php
$r = new \Random\Randomizer();

$fruits = [ 'red' =&gt; '🍎', 'green' =&gt; '🥝', 'yellow' =&gt; '🍌', 'pink' =&gt; '🍑', 'purple' =&gt; '🍇' ];

// Toma 2 claves de array aleatorias:
echo "Keys: ", implode(', ', $r-&gt;pickArrayKeys($fruits, 2)), "\n";

// Toma 3 otras claves:
echo "Keys: ", implode(', ', $r-&gt;pickArrayKeys($fruits, 3)), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

Keys: yellow, purple
Keys: red, green, yellow

**Ejemplo #2 Tomar valores aleatorios**

&lt;?php
$r = new \Random\Randomizer();

$fruits = [ 'red' =&gt; '🍎', 'green' =&gt; '🥝', 'yellow' =&gt; '🍌', 'pink' =&gt; '🍑', 'purple' =&gt; '🍇' ];

$keys = $r-&gt;pickArrayKeys($fruits, 2);
// Ver los valores para las claves seleccionadas.
$selection = array_map(
    static fn ($key) =&gt; $fruits[$key],
$keys
);

echo "Values: ", implode(', ', $selection), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

Values: 🍎, 🍇

### Ver también

- [array_keys()](#function.array-keys) - Devuelve todas las claves o un conjunto de las claves de un array

# Random\Randomizer::\_\_serialize

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::\_\_serialize — Serializa el objeto Randomizer

### Descripción

public **Random\Randomizer::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::\_\_serialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Randomizer::shuffleArray

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::shuffleArray — Devuelve una permutación de un array

### Descripción

public **Random\Randomizer::shuffleArray**([array](#language.types.array) $array): [array](#language.types.array)

Devuelve una permutación seleccionada uniformemente del array de entrada.

Cada permutación posible del array de entrada tiene la misma probabilidad de ser devuelta.

### Parámetros

    array


      El [array](#language.types.array) cuyos valores se mezclan.




      El [array](#language.types.array) de entrada no será modificado.


### Valores devueltos

Una permutación de los valores de array.

Las claves del array de entrada no serán preservadas;
el [array](#language.types.array) devuelto será una lista ([array_is_list()](#function.array-is-list)).

### Errores/Excepciones

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::shuffleArray()**

&lt;?php
$r = new \Random\Randomizer();

$fruits = [ 'red' =&gt; '🍎', 'green' =&gt; '🥝', 'yellow' =&gt; '🍌', 'pink' =&gt; '🍑', 'purple' =&gt; '🍇' ];

// Mezclar el array:
echo "Ensalada: ", implode(', ', $r-&gt;shuffleArray($fruits)), "\n";

// Mezclar nuevamente:
echo "Otra Ensalada: ", implode(', ', $r-&gt;shuffleArray($fruits)), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

Ensalada: 🍎, 🥝, 🍇, 🍌, 🍑
Otra Ensalada: 🍑, 🍇, 🥝, 🍎, 🍌

# Random\Randomizer::shuffleBytes

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::shuffleBytes — Devuelve una permutación por octeto de una cadena de caracteres

### Descripción

public **Random\Randomizer::shuffleBytes**([string](#language.types.string) $bytes): [string](#language.types.string)

Devuelve una permutación seleccionada uniformemente de los bytes de entrada.

Cada permutación posible de los bytes de entrada tiene la misma probabilidad de ser devuelta.

### Parámetros

    bytes


      La [string](#language.types.string) cuyos octetos se mezclan.




      La [string](#language.types.string) de entrada no será modificada.


### Valores devueltos

Una permutación de los octetos de bytes.

### Errores/Excepciones

- Cualquier [Throwable](#class.throwable) lanzado por el método [Random\Engine::generate()](#random-engine.generate)
  del [Random\Randomizer::$engine](#random-randomizer.props.engine) subyacente.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::shuffleBytes()**

&lt;?php
$r = new \Random\Randomizer();

// Mezclar los octetos en una cadena:
echo "«", $r-&gt;shuffleBytes("PHP is great!"), "»\n";
?&gt;

Resultado del ejemplo anterior es similar a:

« ga rHs!PPiet»

**Ejemplo #2 Mezcla por octeto de caracteres Unicode**

&lt;?php
$r = new \Random\Randomizer();

$unicode = "🍎, 🥝, 🍌, 🍑, 🍇";
$shuffled = $r-&gt;shuffleBytes( $unicode );

// La mezcla por octeto de caracteres no-ASCII los destruye,
// lo que resulta en secuencias inválidas (indicadas por el carácter
// de reemplazo Unicode) o incluso la aparición de caracteres
// completamente diferentes en la salida.
echo "Original: ", $unicode, "\n";
echo "Shuffled: «", $shuffled, "»\n";
echo "Shuffled Bytes: ", bin2hex($shuffled), "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

Original: 🍎, 🥝, 🍌, 🍑, 🍇
Shuffled: «� ��,�����🍟,� �� �, �,��»
Shuffled Bytes: 87208e912c8d9fa5f0f0f09f8d9f2cf09f208c9d20f02c209f2c8d8d

# Random\Randomizer::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

Random\Randomizer::\_\_unserialize — Deserializa el parámetro data en un objeto Randomizer

### Descripción

public **Random\Randomizer::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Randomizer::\_\_unserialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

## Tabla de contenidos

- [Random\Randomizer::\_\_construct](#random-randomizer.construct) — Construye un nuevo Randomizer
- [Random\Randomizer::getBytes](#random-randomizer.getbytes) — Devuelve bytes aleatorios
- [Random\Randomizer::getBytesFromString](#random-randomizer.getbytesfromstring) — Devuelve bytes aleatorios a partir de una cadena
- [Random\Randomizer::getFloat](#random-randomizer.getfloat) — Devuelve un float seleccionado uniformemente
- [Random\Randomizer::getInt](#random-randomizer.getint) — Obtener un entero seleccionado uniformemente
- [Random\Randomizer::nextFloat](#random-randomizer.nextfloat) — Devuelve un float seleccionado del intervalo abierto a la derecha [0.0, 1.0)
- [Random\Randomizer::nextInt](#random-randomizer.nextint) — Obtener un entero positivo
- [Random\Randomizer::pickArrayKeys](#random-randomizer.pickarraykeys) — Selecciona claves de array aleatorias
- [Random\Randomizer::\_\_serialize](#random-randomizer.serialize) — Serializa el objeto Randomizer
- [Random\Randomizer::shuffleArray](#random-randomizer.shufflearray) — Devuelve una permutación de un array
- [Random\Randomizer::shuffleBytes](#random-randomizer.shufflebytes) — Devuelve una permutación por octeto de una cadena de caracteres
- [Random\Randomizer::\_\_unserialize](#random-randomizer.unserialize) — Deserializa el parámetro data en un objeto Randomizer

# La enumeración Random\IntervalBoundary

(PHP 8 &gt;= 8.3.0)

## Introducción

    La enumeración **Random\IntervalBoundary** especifica
    si un intervalo incluye los valores límite en el conjunto de valores
    que se encuentran en el intervalo.

## Enum synopsis

    enum **Random\IntervalBoundary**

{

         case  ClosedOpen
     ; //
      Un intervalo cerrado a la derecha.
      El límite inferior está incluido en el intervalo,
      el límite superior no lo está.





         case  ClosedClosed
     ; //
      Un intervalo cerrado.
      Ambos valores límite están incluidos en el intervalo.





         case  OpenClosed
     ; //
      Un intervalo cerrado a la izquierda.
      El límite superior está incluido en el intervalo,
      el límite inferior no lo está.





         case  OpenOpen
     ; //
      Un intervalo abierto.
      Ninguno de los valores límite está incluido en el intervalo.


}

# La interfaz Random\Engine

(PHP 8 &gt;= 8.2.0)

## Introducción

    Un **Random\Engine** constituye una fuente de aleatoriedad de bajo nivel al
    devolver bytes aleatorios que son consumidos por las API de alto nivel para realizar sus operaciones.
    La interfaz **Random\Engine** permite intercambiar el algoritmo
    utilizado para generar aleatoriedad, ya que cada algoritmo realiza compromisos diferentes
    para responder a casos de uso específicos. Algunos algoritmos son muy rápidos,
    pero generan aleatoriedad de menor calidad, mientras que otros algoritmos son más lentos,
    pero generan mejor aleatoriedad, hasta aleatoriedad criptográficamente segura
    como la proporcionada por el motor [Random\Engine\Secure](#class.random-engine-secure).





    PHP proporciona varios motores **Random\Engine** para responder a
    diferentes casos de uso. El motor [Random\Engine\Secure](#class.random-engine-secure) que está
    respaldado por un CSPRNG es la opción por omisión recomendada, a menos que
    la aplicación requiera secuencias reproducibles o un rendimiento muy elevado.

## Sinopsis de la Interfaz

     interface **Random\Engine** {

    /* Métodos */

public [generate](#random-engine.generate)(): [string](#language.types.string)

}

# Random\Engine::generate

(PHP 8 &gt;= 8.2.0)

Random\Engine::generate — Genera aleatoriedad

### Descripción

public **Random\Engine::generate**(): [string](#language.types.string)

Retorna aleatoriedad y avanza el estado del algoritmo en un paso.

La aleatoriedad está representada por una cadena binaria que contiene octetos aleatorios. Esta representación
permite interpretar sin ambigüedad los bits aleatorios generados por el algoritmo, por ejemplo para
tener en cuenta los diferentes tamaños de salida utilizados por los distintos algoritmos.

Los algoritmos que operan nativamente sobre valores enteros deben retornar el entero con los octetos en orden
little-endian, por ejemplo utilizando la función [pack()](#function.pack) con el código de formato
P. La interfaz de alto nivel proporcionada por el
[Random\Randomizer](#class.random-randomizer) interpretará los octetos aleatorios retornados como enteros no signados
little-endian si se requiere una representación numérica.

Se recomienda encarecidamente que cada bit de la cadena retornada sea seleccionado de manera uniforme e independiente,
ya que ciertas aplicaciones requieren aleatoriedad a nivel de bits para funcionar correctamente.
Por ejemplo, los generadores congruenciales lineales generan a menudo aleatoriedad de menor calidad para los bits
de menor peso del valor entero retornado y por lo tanto no serían adecuados para aplicaciones
que requieren aleatoriedad a nivel de bits.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena no vacía que contiene octetos aleatorios.

**Nota**:

    El [Random\Randomizer](#class.random-randomizer) utiliza internamente enteros no signados de 64 bits.
    Si la cadena retornada contiene más de 64 bits (8 octetos) de aleatoriedad, los octetos excedentes
    serán ignorados. Otras aplicaciones pueden ser capaces de procesar más de 64 bits a la vez.

### Errores/Excepciones

- Si la generación de aleatoriedad falla, una [Random\RandomException](#class.random-randomexception)
  debe ser emitida. Cualquier otra [Exception](#class.exception) emitida durante la generación debería ser
  capturada y envuelta en una [Random\RandomException](#class.random-randomexception).

- Si la cadena retornada está vacía, una [Random\BrokenRandomEngineError](#class.random-brokenrandomengineerror)
  será emitida por el [Random\Randomizer](#class.random-randomizer).

- Si el algoritmo implementado está fuertemente sesgado, una [Random\BrokenRandomEngineError](#class.random-brokenrandomengineerror)
  puede ser emitida por el [Random\Randomizer](#class.random-randomizer) para evitar bucles infinitos
  si un muestreo por rechazo es necesario para retornar resultados no sesgados.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine::generate()**

&lt;?php
/\*\*

- Implementa un Generador Congruencial Lineal con módulo 65536,
- un multiplicador de 61 y un incremento de 17, retornando un entero de 8 bits.
-
- Nota: Este motor solo puede ser utilizado con fines de demostración.
-       Los generadores congruenciales lineales generalmente
-       generan aleatoriedad de baja calidad y esta implementación específica tiene
-       un período muy corto de 16 bits que no es adecuado para
-       casi todos los casos de uso en el mundo real.

    \*/
    final class LinearCongruentialGenerator implements \Random\Engine
    {
    private int $state;

        public function __construct(?int $seed = null)
        {
            if ($seed === null) {
                $seed = random_int(0, 0xffff);
            }

            $this-&gt;state = $seed &amp; 0xffff;
        }

        public function generate(): string
        {
            $this-&gt;state = (61 * $this-&gt;state + 17) &amp; 0xffff;

            return pack('C', $this-&gt;state &gt;&gt; 8);
        }

    }

$r = new \Random\Randomizer(
new LinearCongruentialGenerator(seed: 1)
);

echo "Número afortunado: ", $r-&gt;getInt(0, 99), "\n";
?&gt;

El ejemplo anterior mostrará:

Número afortunado: 4

## Tabla de contenidos

- [Random\Engine::generate](#random-engine.generate) — Genera aleatoriedad

# La interfaz Random\CryptoSafeEngine

(PHP 8 &gt;= 8.2.0)

## Introducción

    Interfaz de marcado que indica que el [Random\Engine](#class.random-engine) devuelve datos aleatorios seguros desde el punto de vista criptográfico.

## Sinopsis de la Interfaz

     interface **Random\CryptoSafeEngine**

    extends
      [Random\Engine](#class.random-engine) {

    /* Métodos heredados */

public [Random\Engine::generate](#random-engine.generate)(): [string](#language.types.string)

}

# La clase Random\Engine\Secure

(PHP 8 &gt;= 8.2.0)

## Introducción

    Genera un valor aleatorio criptográficamente seguro utilizando el CSPRNG del sistema operativo.




    El valor aleatorio generado por esta [Random\Engine](#class.random-engine) es adecuado
    para todas las aplicaciones, incluyendo la generación de secretos a largo plazo, tales como
    las claves de cifrado.




    El motor **Random\Engine\Secure** es la opción predeterminada recomendada y segura,
    a menos que la aplicación requiera secuencias reproducibles o un rendimiento muy elevado.

## Sinopsis de la Clase

     final
     class **Random\Engine\Secure**



     implements
      [Random\CryptoSafeEngine](#class.random-cryptosafeengine) {

    /* Métodos */

public [generate](#random-engine-secure.generate)(): [string](#language.types.string)

}

# Random\Engine\Secure::generate

(PHP 8 &gt;= 8.2.0)

Random\Engine\Secure::generate — Genera datos aleatorios de manera criptográficamente segura

### Descripción

public **Random\Engine\Secure::generate**(): [string](#language.types.string)

Devuelve datos aleatorios de manera criptográficamente segura.

Las fuentes de aleatoriedad por orden de prioridad son las siguientes:

- Linux: [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- FreeBSD &gt;= 12 (PHP &gt;= 7.3): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Windows (PHP &gt;= 7.2): [» CNG-API](https://docs.microsoft.com/en-us/windows/desktop/SecCNG/cng-portal)

    Windows: [» CryptGenRandom](<https://msdn.microsoft.com/en-us/library/windows/desktop/aa379942(v=vs.85).aspx>)

- macOS (PHP &gt;= 8.2; &gt;= 8.1.9; &gt;= 8.0.22 si CCRandomGenerateBytes está disponible en el momento de la compilación): CCRandomGenerateBytes()

    macOS (PHP &gt;= 8.1; &gt;= 8.0.2): arc4random_buf(), /dev/urandom

- NetBSD &gt;= 7 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- OpenBSD &gt;= 5.5 (PHP &gt;= 7.1; &gt;= 7.0.1): arc4random_buf(), /dev/urandom

- DragonflyBSD (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

- Solaris (PHP &gt;= 8.1): [» getrandom()](http://man7.org/linux/man-pages/man2/getrandom.2.html), /dev/urandom

-     Cualquier combinación de un sistema operativo y una versión de PHP no mencionada anteriormente:
      /dev/urandom.

-     Si ninguna de las fuentes de aleatoriedad está disponible o todas fallan al generar
      aleatoriedad, se lanzará una excepción de tipo [Random\RandomException](#class.random-randomexception).

    ### Parámetros

    Esta función no contiene ningún parámetro.

    ### Valores devueltos

    Una string que contiene **[PHP_INT_SIZE](#constant.php-int-size)** bytes de aleatoriedad criptográficamente segura.

    ### Errores/Excepciones

- Si no se encuentra ninguna fuente de datos aleatorios, se lanzará una
  [Random\RandomException](#class.random-randomexception).

## Tabla de contenidos

- [Random\Engine\Secure::generate](#random-engine-secure.generate) — Genera datos aleatorios de manera criptográficamente segura

# La clase Random\Engine\Mt19937

(PHP 8 &gt;= 8.2.0)

## Introducción

    Implementa el algoritmo [» Mt19937](http://www.math.sci.hiroshima-u.ac.jp/m-mat/MT/ARTICLES/mt.pdf) ("Mersenne Twister").

## Sinopsis de la Clase

     final
     class **Random\Engine\Mt19937**



     implements
      [Random\Engine](#class.random-engine) {

    /* Métodos */

public [\_\_construct](#random-engine-mt19937.construct)([?](#language.types.null)[int](#language.types.integer) $seed = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**)

    public [__debugInfo](#random-engine-mt19937.debuginfo)(): [array](#language.types.array)

public [generate](#random-engine-mt19937.generate)(): [string](#language.types.string)
public [\_\_serialize](#random-engine-mt19937.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#random-engine-mt19937.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

# Random\Engine\Mt19937::\_\_construct

(PHP 8 &gt;= 8.2.0)

Random\Engine\Mt19937::\_\_construct — Construye un nuevo motor Mt19937

### Descripción

public **Random\Engine\Mt19937::\_\_construct**([?](#language.types.null)[int](#language.types.integer) $seed = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**)

**Precaución**

Dado que el motor Mt19937 ("Mersenne Twister") toma un solo entero de 32 bits como
semilla, el número de secuencias aleatorias posibles está limitado a solo 232
(por ejemplo 4 294 967 296), a pesar de la enorme período de Mt19937 de 219937-1.

Cuando se confía en una semilla aleatoria implícita o explícita, las duplicaciones aparecerán
mucho antes. Las semillas duplicadas son esperadas con una probabilidad del 50% después de menos de
80 000 semillas generadas aleatoriamente según el problema del cumpleaños. Una probabilidad del 10%
de una semilla duplicada ocurre después de haber generado aproximadamente 30 000 semillas de manera aleatoria.

Esto hace que Mt19937 sea inadecuado para aplicaciones donde las secuencias duplicadas no deben ocurrir con
más que una probabilidad despreciable. Si se requiere una semilla reproducible, tanto el
motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) como [Random\Engine\PcgOneseq128XslRr64](#class.random-engine-pcgoneseq128xslrr64)
soportan semillas mucho más grandes que son poco propensas a colisionar aleatoriamente. Si la reproductibilidad
no es requerida, el motor [Random\Engine\Secure](#class.random-engine-secure) proporciona datos aleatorios criptográficamente
seguros.

### Parámetros

    seed


      Rellena el estado con valores generados con un generador congruencial lineal
      que fue inicializado con seed interpretado como un
      entero sin signo de 32 bits.





      Si seed se omite o es **[null](#constant.null)**, se utilizará un entero
      sin signo de 32 bits aleatorio.






    mode


      Utilice una de las siguientes constantes para especificar la implementación
      del algoritmo a usar.



       -
        **[MT_RAND_MT19937](#constant.mt-rand-mt19937)**:
        La implementación correcta de Mt19937.


       -
        **[MT_RAND_PHP](#constant.mt-rand-php)**:
        Una implementación incorrecta para compatibilidad con versiones anteriores
        de [mt_srand()](#function.mt-srand) anterior a PHP 7.1.0.




     **Advertencia**Esta característica está

_OBSOLETA_ a partir de PHP 8.3.0. Depender de esta característica
está altamente desaconsejado.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Mt19937::\_\_construct()**

&lt;?php
// Usa una semilla aleatoria de 32 bits.
$e = new \Random\Engine\Mt19937();

$r = new \Random\Randomizer($e);
?&gt;

# Random\Engine\Mt19937::\_\_debugInfo

(PHP 8 &gt;= 8.2.0)

Random\Engine\Mt19937::\_\_debugInfo — Devuelve el estado interno del motor

### Descripción

public **Random\Engine\Mt19937::\_\_debugInfo**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Mt19937::\_\_debugInfo()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\Mt19937::generate

(PHP 8 &gt;= 8.2.0)

Random\Engine\Mt19937::generate — Generar 32 bits de datos aleatorios

### Descripción

public **Random\Engine\Mt19937::generate**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que representa un entero sin signo de 32 bits en orden little-endian.

# Random\Engine\Mt19937::\_\_serialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\Mt19937::\_\_serialize — Serializa el objeto Mt19937

### Descripción

public **Random\Engine\Mt19937::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Mt19937::\_\_serialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\Mt19937::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\Mt19937::\_\_unserialize — Deserializa el argumento data en un objeto Mt19937

### Descripción

public **Random\Engine\Mt19937::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Mt19937::\_\_unserialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

## Tabla de contenidos

- [Random\Engine\Mt19937::\_\_construct](#random-engine-mt19937.construct) — Construye un nuevo motor Mt19937
- [Random\Engine\Mt19937::\_\_debugInfo](#random-engine-mt19937.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\Mt19937::generate](#random-engine-mt19937.generate) — Generar 32 bits de datos aleatorios
- [Random\Engine\Mt19937::\_\_serialize](#random-engine-mt19937.serialize) — Serializa el objeto Mt19937
- [Random\Engine\Mt19937::\_\_unserialize](#random-engine-mt19937.unserialize) — Deserializa el argumento data en un objeto Mt19937

# La clase Random\Engine\PcgOneseq128XslRr64

(PHP 8 &gt;= 8.2.0)

## Introducción

    Implementa un [» generador congruencial permutado (PCG)](https://www.pcg-random.org/) con
    128 bits de estado, transformaciones de salida XSL y RR, y 64 bits de salida.

## Sinopsis de la Clase

     final
     class **Random\Engine\PcgOneseq128XslRr64**



     implements
      [Random\Engine](#class.random-engine) {

    /* Métodos */

public [\_\_construct](#random-engine-pcgoneseq128xslrr64.construct)([string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $seed = **[null](#constant.null)**)

    public [__debugInfo](#random-engine-pcgoneseq128xslrr64.debuginfo)(): [array](#language.types.array)

public [generate](#random-engine-pcgoneseq128xslrr64.generate)(): [string](#language.types.string)
public [jump](#random-engine-pcgoneseq128xslrr64.jump)([int](#language.types.integer) $advance): [void](language.types.void.html)
public [\_\_serialize](#random-engine-pcgoneseq128xslrr64.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#random-engine-pcgoneseq128xslrr64.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

# Random\Engine\PcgOneseq128XslRr64::\_\_construct

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::\_\_construct — Construye un nuevo motor PCG Oneseq 128 XSL RR 64

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::\_\_construct**([string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $seed = **[null](#constant.null)**)

### Parámetros

    seed


      La forma en que se inicializa el estado interno de 128 bits (16 bytes) que consiste en un entero sin signo de 128 bits
      depende del tipo utilizado como seed.






          Tipo
          Descripción






          [null](#language.types.null)

           Rellena el estado con 16 bytes aleatorios generados usando el CSPRNG.




          [int](#language.types.integer)

           Rellena el estado estableciendo el estado a 0, avanzando el motor un paso,
           añadiendo el valor de seed interpretado como un entero sin signo de 64 bits,
           y avanzando el motor otro paso.




          [string](#language.types.string)

           Rellena el estado interpretando un [string](#language.types.string) de 16 bytes como un entero sin signo de 128 bits
           en orden little-endian.









### Errores/Excepciones

- Si la longitud de un [string](#language.types.string) seed no es
  de 16 bytes, se lanzará un [ValueError](#class.valueerror).

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\PcgOneseq128XslRr64::\_\_construct()**

&lt;?php
// Usa una semilla aleatoria de 128 bits.
$e = new \Random\Engine\PcgOneseq128XslRr64();

$r = new \Random\Randomizer($e);
?&gt;

**Ejemplo #2 Derivar una semilla a partir de un [string](#language.types.string)**

&lt;?php
$string = "Mi semilla de string";

// Aplica hash a la cadena con SHA-256 truncado usando salida binaria
// para convertir el $string en una semilla de 128 bits. Usar la misma
// cadena resultará en la misma secuencia de aleatoriedad.
$e = new \Random\Engine\PcgOneseq128XslRr64(
substr(hash('sha256', $string, binary: true), 0, 16)
);

echo bin2hex($e-&gt;generate()), "\n";
?&gt;

El ejemplo anterior mostrará:

8333ef59315b16d8

# Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo — Devuelve el estado interno del motor

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\PcgOneseq128XslRr64::generate

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::generate — Generar 64 bits de datos aleatorios

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::generate**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que representa un entero sin signo de 64 bits en little-endian.

# Random\Engine\PcgOneseq128XslRr64::jump

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::jump — Avanza el motor varios pasos

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::jump**([int](#language.types.integer) $advance): [void](language.types.void.html)

Avanza el estado del algoritmo el número de pasos indicado por advance, como si
[Random\Engine\PcgOneseq128XslRr64::generate()](#random-engine-pcgoneseq128xslrr64.generate) fuera llamado tantas veces.

### Parámetros

    advance


      El número de pasos a avanzar; debe ser 0 o más.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Si advance es inferior a 0,
  se lanzará una [ValueError](#class.valueerror).

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\PcgOneseq128XslRr64::jump()**

&lt;?php
$a = new \Random\Engine\PcgOneseq128XslRr64(0);
$b = clone $a;

for ($i = 0; $i &lt; 1_000; $i++) {
    $a-&gt;generate();
}
$b-&gt;jump(1_000);

echo "A: ", bin2hex($a-&gt;generate()), "\n";
echo "B: ", bin2hex($b-&gt;generate()), "\n";
?&gt;

El ejemplo anterior mostrará:

A: e6d0d5813913a424
B: e6d0d5813913a424

**Ejemplo #2 Los métodos de Randomizer pueden llamar al motor más de una vez**

&lt;?php
$a = new \Random\Randomizer(new \Random\Engine\PcgOneseq128XslRr64(42659));
$b = new \Random\Randomizer(clone $a-&gt;engine);

$a-&gt;getInt(1, 1572864); // Realiza dos llamadas a generate().
$a-&gt;getInt(1, 1572864);

$b-&gt;engine-&gt;jump(2);

// Como la primera llamada a -&gt;getInt() llamó a -&gt;generate() dos veces
// los motores no coinciden después de realizar un -&gt;jump(2).
echo "A: ", bin2hex($a-&gt;engine-&gt;generate()), "\n";
echo "B: ", bin2hex($b-&gt;engine-&gt;generate()), "\n";

// Ahora el motor B coincide con el motor A.
echo "B: ", bin2hex($b-&gt;engine-&gt;generate()), "\n";
?&gt;

El ejemplo anterior mostrará:

A: 1e9f3107d56653d0
B: a156c0086dd79d44
B: 1e9f3107d56653d0

# Random\Engine\PcgOneseq128XslRr64::\_\_serialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::\_\_serialize — Serializa el objeto PcgOneseq128XslRr64

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\PcgOneseq128XslRr64::\_\_serialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\PcgOneseq128XslRr64::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\PcgOneseq128XslRr64::\_\_unserialize — Deserializa el parámetro data en un objeto PcgOneseq128XslRr64

### Descripción

public **Random\Engine\PcgOneseq128XslRr64::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\PcgOneseq128XslRr64::\_\_unserialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

## Tabla de contenidos

- [Random\Engine\PcgOneseq128XslRr64::\_\_construct](#random-engine-pcgoneseq128xslrr64.construct) — Construye un nuevo motor PCG Oneseq 128 XSL RR 64
- [Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo](#random-engine-pcgoneseq128xslrr64.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\PcgOneseq128XslRr64::generate](#random-engine-pcgoneseq128xslrr64.generate) — Generar 64 bits de datos aleatorios
- [Random\Engine\PcgOneseq128XslRr64::jump](#random-engine-pcgoneseq128xslrr64.jump) — Avanza el motor varios pasos
- [Random\Engine\PcgOneseq128XslRr64::\_\_serialize](#random-engine-pcgoneseq128xslrr64.serialize) — Serializa el objeto PcgOneseq128XslRr64
- [Random\Engine\PcgOneseq128XslRr64::\_\_unserialize](#random-engine-pcgoneseq128xslrr64.unserialize) — Deserializa el parámetro data en un objeto PcgOneseq128XslRr64

# La clase Random\Engine\Xoshiro256StarStar

(PHP 8 &gt;= 8.2.0)

## Introducción

    Implementa el algoritmo [» xoshiro256**](https://prng.di.unimi.it/).

## Sinopsis de la Clase

     final
     class **Random\Engine\Xoshiro256StarStar**



     implements
      [Random\Engine](#class.random-engine) {

    /* Métodos */

public [\_\_construct](#random-engine-xoshiro256starstar.construct)([string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $seed = **[null](#constant.null)**)

    public [__debugInfo](#random-engine-xoshiro256starstar.debuginfo)(): [array](#language.types.array)

public [generate](#random-engine-xoshiro256starstar.generate)(): [string](#language.types.string)
public [jump](#random-engine-xoshiro256starstar.jump)(): [void](language.types.void.html)
public [jumpLong](#random-engine-xoshiro256starstar.jumplong)(): [void](language.types.void.html)
public [\_\_serialize](#random-engine-xoshiro256starstar.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#random-engine-xoshiro256starstar.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

# Random\Engine\Xoshiro256StarStar::\_\_construct

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::\_\_construct — Crea un nuevo motor xoshiro256\*\*

### Descripción

public **Random\Engine\Xoshiro256StarStar::\_\_construct**([string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $seed = **[null](#constant.null)**)

### Parámetros

    seed


      Cómo se inicializa el estado interno de 256 bits (32 bytes) compuesto por cuatro enteros sin signo de 64 bits
      depende del tipo utilizado como seed.






          Tipo
          Descripción






          [null](#language.types.null)

           Rellena el estado con 32 bytes aleatorios generados usando el CSPRNG.




          [int](#language.types.integer)

           Rellena el estado con cuatro valores consecutivos generados con el algoritmo SplitMix64
           que se inicializó con seed interpretado como un entero sin signo de 64 bits.




          [string](#language.types.string)

           Rellena el estado interpretando un [string](#language.types.string) de 32 bytes como cuatro enteros sin signo de 64 bits en little-endian.









### Errores/Excepciones

- Si la longitud de un [string](#language.types.string) seed
  no es de 32 bytes, se lanzará un [ValueError](#class.valueerror).

- Si un [string](#language.types.string) seed consiste en
  32 bytes NUL ("\x00"), se lanzará un [ValueError](#class.valueerror).

### Ejemplos

**Ejemplo #1 Random\Engine\Xoshiro256StarStar::\_\_construct()** ejemplo

&lt;?php
// Usa una semilla aleatoria de 256 bits.
$e = new \Random\Engine\Xoshiro256StarStar();

$r = new \Random\Randomizer($e);
?&gt;

**Ejemplo #2 Derivando una semilla de un [string](#language.types.string)**

&lt;?php
$string = "Mi semilla de string";

// Hashea el string con SHA-256 usando salida binaria para convertir el
// $string en una semilla de 256 bits. Usar el mismo string resultará
// en la misma secuencia de aleatoriedad.
$e = new \Random\Engine\Xoshiro256StarStar(
hash('sha256', $string, binary: true)
);

echo bin2hex($e-&gt;generate()), "\n";
?&gt;

El ejemplo anterior mostrará:

6e013453678388c2

# Random\Engine\Xoshiro256StarStar::\_\_debugInfo

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::\_\_debugInfo — Devuelve el estado interno del motor

### Descripción

public **Random\Engine\Xoshiro256StarStar::\_\_debugInfo**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Xoshiro256StarStar::\_\_debugInfo()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\Xoshiro256StarStar::generate

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::generate — Generar 64 bits de datos aleatorios

### Descripción

public **Random\Engine\Xoshiro256StarStar::generate**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que representa un entero sin signo de 64 bits en little-endian.

# Random\Engine\Xoshiro256StarStar::jump

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::jump — Avanza el motor de manera eficiente 2^128 pasos

### Descripción

public **Random\Engine\Xoshiro256StarStar::jump**(): [void](language.types.void.html)

Avanza el estado del algoritmo 2128 pasos, como si
[Random\Engine\Xoshiro256StarStar::generate()](#random-engine-xoshiro256starstar.generate) fuera llamado
2128 veces.

El objetivo de un salto es facilitar la creación de un nuevo motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar)
a partir de un motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) existente inicializado.
El motor inicializado actúa como un modelo, que puede ser [clonado](#language.oop5.cloning)
y saltado varias veces para crear 2128 secuencias no superpuestas con
2128 valores cada una.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Xoshiro256StarStar::jump()**

&lt;?php
use Random\Engine\Xoshiro256StarStar;
use Random\Randomizer;

$blueprintRng = new Xoshiro256StarStar(0);

$fibers = [];
for ($i = 0; $i &lt; 8; $i++) {
$fiberRng = clone $blueprintRng;
$blueprintRng-&gt;jump();

    $fiber = new Fiber(static function () use ($fiberRng, $i): void {
        $randomizer = new Randomizer($fiberRng);

        while (true) {
            Fiber::suspend();

            echo "{$i}: ", $randomizer-&gt;getInt(0, 100), "\n";
        }
    });
    $fiber-&gt;start();

    $fibers[] = $fiber;

}

// Aunque las fibras se ejecuten en un orden aleatorio, imprimirán el mismo valor
// cada vez, ya que cada una tiene su propia instancia única del RNG.
$randomizer = new Randomizer();

$fibers = $randomizer-&gt;shuffleArray($fibers);
foreach ($fibers as $fiber) {
$fiber-&gt;resume();
}

$fibers = $randomizer-&gt;shuffleArray($fibers);
foreach ($fibers as $fiber) {
$fiber-&gt;resume();
}
?&gt;

Resultado del ejemplo anterior es similar a:

4: 89
3: 10
2: 63
1: 75
6: 41
5: 56
0: 16
7: 60
7: 34
6: 58
1: 74
4: 63
3: 3
5: 42
2: 45
0: 86

### Ver también

- [Random\Engine\Xoshiro256StarStar::jumpLong()](#random-engine-xoshiro256starstar.jumplong) - Avanza de manera eficiente el motor 2^192 pasos

# Random\Engine\Xoshiro256StarStar::jumpLong

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::jumpLong — Avanza de manera eficiente el motor 2^192 pasos

### Descripción

public **Random\Engine\Xoshiro256StarStar::jumpLong**(): [void](language.types.void.html)

Avanza el estado del algoritmo 2192 pasos, como si
[Random\Engine\Xoshiro256StarStar::generate()](#random-engine-xoshiro256starstar.generate) fuera llamado
2192 veces.

El objetivo de un salto largo es facilitar la creación de un nuevo [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar)
a partir de un motor [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) inicializado existente.
El motor inicializado actúa como una plantilla, que puede ser [clonada](#language.oop5.cloning)
y saltada repetidamente para crear 264 secuencias no superpuestas con
2192 valores cada una.

Los saltos largos pueden combinarse con [Random\Engine\Xoshiro256StarStar::jump()](#random-engine-xoshiro256starstar.jump)
para dividir aún más cada una de las 264 secuencias generadas por un salto largo,
en 264 secuencias de 2128 valores cada una.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Xoshiro256StarStar::jumpLong()**

&lt;?php
$blueprintRng = new \Random\Engine\Xoshiro256StarStar(0);

// Cada motor padre tendrá su propio trozo de 2\*\*192 valores.
$parent1 = clone $blueprintRng;
$blueprintRng-&gt;jumpLong();

$parent2 = clone $blueprintRng;
$blueprintRng-&gt;jumpLong();

// Cada uno de los motores hijos tendrá su propio trozo de 2**128 valores
// tomados del trozo de 2**192 valores de su motor padre.
$child1a = clone $parent1;
$parent1-&gt;jump();
$child1b = clone $parent1;
$parent1-&gt;jump();

$child2a = clone $parent2;
$parent2-&gt;jump();
$child2b = clone $parent2;
$parent2-&gt;jump();

echo "Child 1A: ", bin2hex($child1a-&gt;generate()), "\n";
echo "Child 1B: ", bin2hex($child1b-&gt;generate()), "\n";
echo "Child 2A: ", bin2hex($child2a-&gt;generate()), "\n";
echo "Child 2B: ", bin2hex($child2b-&gt;generate()), "\n";
?&gt;

El ejemplo anterior mostrará:

Child 1A: b4f275cb365fec99
Child 1B: 2cd646c8ed156237
Child 2A: eb3729a722a504e7
Child 2B: d4208dc85bdd6dc3

### Ver también

- [Random\Engine\Xoshiro256StarStar::jump()](#random-engine-xoshiro256starstar.jump) - Avanza el motor de manera eficiente 2^128 pasos

# Random\Engine\Xoshiro256StarStar::\_\_serialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::\_\_serialize — Serializa el objeto Xoshiro256StarStar

### Descripción

public **Random\Engine\Xoshiro256StarStar::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Xoshiro256StarStar::\_\_serialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

# Random\Engine\Xoshiro256StarStar::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

Random\Engine\Xoshiro256StarStar::\_\_unserialize — Deserializa el argumento data en un objeto Xoshiro256StarStar

### Descripción

public **Random\Engine\Xoshiro256StarStar::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Random\Engine\Xoshiro256StarStar::\_\_unserialize()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

## Tabla de contenidos

- [Random\Engine\Xoshiro256StarStar::\_\_construct](#random-engine-xoshiro256starstar.construct) — Crea un nuevo motor xoshiro256\*\*
- [Random\Engine\Xoshiro256StarStar::\_\_debugInfo](#random-engine-xoshiro256starstar.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\Xoshiro256StarStar::generate](#random-engine-xoshiro256starstar.generate) — Generar 64 bits de datos aleatorios
- [Random\Engine\Xoshiro256StarStar::jump](#random-engine-xoshiro256starstar.jump) — Avanza el motor de manera eficiente 2^128 pasos
- [Random\Engine\Xoshiro256StarStar::jumpLong](#random-engine-xoshiro256starstar.jumplong) — Avanza de manera eficiente el motor 2^192 pasos
- [Random\Engine\Xoshiro256StarStar::\_\_serialize](#random-engine-xoshiro256starstar.serialize) — Serializa el objeto Xoshiro256StarStar
- [Random\Engine\Xoshiro256StarStar::\_\_unserialize](#random-engine-xoshiro256starstar.unserialize) — Deserializa el argumento data en un objeto Xoshiro256StarStar

# La clase Random\RandomError

(PHP 8 &gt;= 8.2.0)

## Introducción

    Clase base para los [Error](#class.error)es que se producen durante la generación o el uso de aleatoriedad.

## Sinopsis de la Clase

     class **Random\RandomError**



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

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

# La clase Random\BrokenRandomEngineError

(PHP 8 &gt;= 8.2.0)

## Introducción

    Indica que el [Random\Engine](#class.random-engine) utilizado está roto, por ejemplo porque está fuertemente sesgado.

## Sinopsis de la Clase

     class **Random\BrokenRandomEngineError**



     extends
      [Random\RandomError](#class.random-randomerror)
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

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

# La clase Random\RandomException

(PHP 8 &gt;= 8.2.0)

## Introducción

    Clase base para las [Exception](#class.exception)es que se producen durante la generación o el uso de aleatoriedad.

## Sinopsis de la Clase

     class **Random\RandomException**



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

- [Introducción](#intro.random)
- [Constantes predefinidas](#random.constants)
- [Ejemplos](#random.examples)
- [Funciones de números aleatorios](#ref.random)<li>[getrandmax](#function.getrandmax) — Valor aleatorio máximo posible
- [lcg_value](#function.lcg-value) — Generador de congruencia lineal combinada
- [mt_getrandmax](#function.mt-getrandmax) — El valor aleatorio más grande posible
- [mt_rand](#function.mt-rand) — Genera un valor aleatorio mediante el generador de números aleatorios Mersenne Twister
- [mt_srand](#function.mt-srand) — Inicializa el generador de números aleatorios Mersenne Twister
- [rand](#function.rand) — Genera un valor aleatorio
- [random_bytes](#function.random-bytes) — Obtiene bytes aleatorios criptográficamente seguros
- [random_int](#function.random-int) — Obtiene un integer seleccionado de manera uniforme y criptográficamente segura
- [srand](#function.srand) — Inicializa el generador de números aleatorios
  </li>- [Random\Randomizer](#class.random-randomizer) — La clase Random\Randomizer<li>[Random\Randomizer::__construct](#random-randomizer.construct) — Construye un nuevo Randomizer
- [Random\Randomizer::getBytes](#random-randomizer.getbytes) — Devuelve bytes aleatorios
- [Random\Randomizer::getBytesFromString](#random-randomizer.getbytesfromstring) — Devuelve bytes aleatorios a partir de una cadena
- [Random\Randomizer::getFloat](#random-randomizer.getfloat) — Devuelve un float seleccionado uniformemente
- [Random\Randomizer::getInt](#random-randomizer.getint) — Obtener un entero seleccionado uniformemente
- [Random\Randomizer::nextFloat](#random-randomizer.nextfloat) — Devuelve un float seleccionado del intervalo abierto a la derecha [0.0, 1.0)
- [Random\Randomizer::nextInt](#random-randomizer.nextint) — Obtener un entero positivo
- [Random\Randomizer::pickArrayKeys](#random-randomizer.pickarraykeys) — Selecciona claves de array aleatorias
- [Random\Randomizer::\_\_serialize](#random-randomizer.serialize) — Serializa el objeto Randomizer
- [Random\Randomizer::shuffleArray](#random-randomizer.shufflearray) — Devuelve una permutación de un array
- [Random\Randomizer::shuffleBytes](#random-randomizer.shufflebytes) — Devuelve una permutación por octeto de una cadena de caracteres
- [Random\Randomizer::\_\_unserialize](#random-randomizer.unserialize) — Deserializa el parámetro data en un objeto Randomizer
  </li>- [Random\IntervalBoundary](#enum.random-intervalboundary) — La enumeración Random\IntervalBoundary
- [Random\Engine](#class.random-engine) — La interfaz Random\Engine<li>[Random\Engine::generate](#random-engine.generate) — Genera aleatoriedad
  </li>- [Random\CryptoSafeEngine](#class.random-cryptosafeengine) — La interfaz Random\CryptoSafeEngine
- [Random\Engine\Secure](#class.random-engine-secure) — La clase Random\Engine\Secure<li>[Random\Engine\Secure::generate](#random-engine-secure.generate) — Genera datos aleatorios de manera criptográficamente segura
  </li>- [Random\Engine\Mt19937](#class.random-engine-mt19937) — La clase Random\Engine\Mt19937<li>[Random\Engine\Mt19937::__construct](#random-engine-mt19937.construct) — Construye un nuevo motor Mt19937
- [Random\Engine\Mt19937::\_\_debugInfo](#random-engine-mt19937.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\Mt19937::generate](#random-engine-mt19937.generate) — Generar 32 bits de datos aleatorios
- [Random\Engine\Mt19937::\_\_serialize](#random-engine-mt19937.serialize) — Serializa el objeto Mt19937
- [Random\Engine\Mt19937::\_\_unserialize](#random-engine-mt19937.unserialize) — Deserializa el argumento data en un objeto Mt19937
  </li>- [Random\Engine\PcgOneseq128XslRr64](#class.random-engine-pcgoneseq128xslrr64) — La clase Random\Engine\PcgOneseq128XslRr64<li>[Random\Engine\PcgOneseq128XslRr64::__construct](#random-engine-pcgoneseq128xslrr64.construct) — Construye un nuevo motor PCG Oneseq 128 XSL RR 64
- [Random\Engine\PcgOneseq128XslRr64::\_\_debugInfo](#random-engine-pcgoneseq128xslrr64.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\PcgOneseq128XslRr64::generate](#random-engine-pcgoneseq128xslrr64.generate) — Generar 64 bits de datos aleatorios
- [Random\Engine\PcgOneseq128XslRr64::jump](#random-engine-pcgoneseq128xslrr64.jump) — Avanza el motor varios pasos
- [Random\Engine\PcgOneseq128XslRr64::\_\_serialize](#random-engine-pcgoneseq128xslrr64.serialize) — Serializa el objeto PcgOneseq128XslRr64
- [Random\Engine\PcgOneseq128XslRr64::\_\_unserialize](#random-engine-pcgoneseq128xslrr64.unserialize) — Deserializa el parámetro data en un objeto PcgOneseq128XslRr64
  </li>- [Random\Engine\Xoshiro256StarStar](#class.random-engine-xoshiro256starstar) — La clase Random\Engine\Xoshiro256StarStar<li>[Random\Engine\Xoshiro256StarStar::__construct](#random-engine-xoshiro256starstar.construct) — Crea un nuevo motor xoshiro256**
- [Random\Engine\Xoshiro256StarStar::\_\_debugInfo](#random-engine-xoshiro256starstar.debuginfo) — Devuelve el estado interno del motor
- [Random\Engine\Xoshiro256StarStar::generate](#random-engine-xoshiro256starstar.generate) — Generar 64 bits de datos aleatorios
- [Random\Engine\Xoshiro256StarStar::jump](#random-engine-xoshiro256starstar.jump) — Avanza el motor de manera eficiente 2^128 pasos
- [Random\Engine\Xoshiro256StarStar::jumpLong](#random-engine-xoshiro256starstar.jumplong) — Avanza de manera eficiente el motor 2^192 pasos
- [Random\Engine\Xoshiro256StarStar::\_\_serialize](#random-engine-xoshiro256starstar.serialize) — Serializa el objeto Xoshiro256StarStar
- [Random\Engine\Xoshiro256StarStar::\_\_unserialize](#random-engine-xoshiro256starstar.unserialize) — Deserializa el argumento data en un objeto Xoshiro256StarStar
  </li>- [Random\RandomError](#class.random-randomerror) — La clase Random\RandomError
- [Random\BrokenRandomEngineError](#class.random-brokenrandomengineerror) — La clase Random\BrokenRandomEngineError
- [Random\RandomException](#class.random-randomexception) — La clase Random\RandomException
