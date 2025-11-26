# GNU Multiple Precision

# Introducción

Estas funciones permiten trabajar con números de tamaño arbitrario,
utilizando la biblioteca GNU MP.

**Nota**:

    La mayoría de las funciones GMP aceptan números GMP como argumentos.
    Estos son mostrados en la documentación como objetos [GMP](#class.gmp).
    La mayoría de estas funciones aceptan también argumentos
    en forma numérica y de string, siempre que sea posible convertirlos
    posteriormente a número. Así, si existe una función más
    performante que pueda funcionar sobre los argumentos (enteros solamente),
    entonces será utilizada en su lugar (esto se hace de manera transparente).
    Ver también la función [gmp_init()](#function.gmp-init).

**Nota**:

    Operadores
    [aritméticos](#language.operators.arithmetic),
    [a nivel de bits](#language.operators.bitwise), y
    [de comparación](#language.operators.comparison)
    pueden ser utilizados con los objetos [GMP](#class.gmp) devueltos
    desde [gmp_init()](#function.gmp-init) y las otras funciones GMP.

**Advertencia**

    Si se desea especificar explícitamente un entero de gran tamaño,
    debe especificarse en forma de string. Si no se hace, PHP interpretará
    el entero y lo transformará en una representación interna, lo que
    seguramente hará perder precisión, antes de que GMP
    entre en juego.

    Los enteros voluminosos deben especificarse como strings - de lo contrario,
    PHP los fuerza a [float](#language.types.float), lo que provoca una pérdida de precisión.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#gmp.requirements)
- [Instalación](#gmp.installation)

    ## Requerimientos

    La biblioteca GMP puede ser descargada desde el sitio web de
    [» http://gmplib.org/#DOWNLOAD](http://gmplib.org/#DOWNLOAD). Este sitio web también proporciona un manual
    GMP.

    Al menos la versión 4.2 de GMP es requerida, con ciertas
    funciones que necesitan una versión más reciente de la biblioteca
    GMP.

    En Windows, MPIR es requerido en lugar de GMP.

## Instalación

Para poder utilizar estas funciones, es necesario compilar
PHP con GMP utilizando la opción
**--with-gmp**.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[GMP_ROUND_ZERO](#constant.gmp-round-zero)**
    ([int](#language.types.integer))









    **[GMP_ROUND_PLUSINF](#constant.gmp-round-plusinf)**
    ([int](#language.types.integer))









    **[GMP_ROUND_MINUSINF](#constant.gmp-round-minusinf)**
    ([int](#language.types.integer))









    **[GMP_MSW_FIRST](#constant.gmp-msw-first)**
    ([int](#language.types.integer))









    **[GMP_LSW_FIRST](#constant.gmp-lsw-first)**
    ([int](#language.types.integer))









    **[GMP_LITTLE_ENDIAN](#constant.gmp-little-endian)**
    ([int](#language.types.integer))









    **[GMP_BIG_ENDIAN](#constant.gmp-big-endian)**
    ([int](#language.types.integer))









    **[GMP_NATIVE_ENDIAN](#constant.gmp-native-endian)**
    ([int](#language.types.integer))









    **[GMP_VERSION](#constant.gmp-version)**
    ([string](#language.types.string))



     La versión de la biblioteca GMP





    **[GMP_MPIR_VERSION](#constant.gmp-mpir-version)**
    ([string](#language.types.string))



     La versión de la biblioteca MPIR.

# Ejemplos

**Ejemplo #1 Función factorial usando GMP**

&lt;?php
function fact($x)
{
    $return = 1;
    for ($i=2; $i &lt;= $x; $i++) {
        $return = gmp_mul($return, $i);
}
return $return;
}

echo gmp_strval(fact(1000)) . "\n";
?&gt;

Esto va a calcular el factorial de 1000 (Un bonito gran número)
muy rápido.

# Funciones de GMP

## Ver también

    Más funciones matemáticas pueden ser encontradas en la
    [Extensiones matemáticas](#refs.math) sección

# gmp_abs

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_abs — Valor absoluto

### Descripción

**gmp_abs**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Obtiene el valor absoluto de un número.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve el valor absoluto num, como un número GMP.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_abs()**

&lt;?php
$abs1 = gmp_abs("274982683358");
$abs2 = gmp_abs("-274982683358");

echo gmp_strval($abs1) . "\n";
echo gmp_strval($abs2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

274982683358
274982683358

# gmp_add

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_add — Adición de 2 números GMP

### Descripción

**gmp_add**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Adición de 2 números GMP.

### Parámetros

     num1


       El primer operando (augend).





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El segundo operando (augend).





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un número GMP que representa la suma de los argumentos.

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_add()**

&lt;?php
$sum = gmp_add("123456789012345", "76543210987655");
echo gmp_strval($sum) . "\n";
?&gt;

    El ejemplo anterior mostrará:

200000000000000

# gmp_and

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_and — AND a nivel de bit

### Descripción

**gmp_and**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Calcula el AND a nivel de bit de dos números GMP.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un número represetando la comparación del nivel de bit AND.

### Ejemplos

**Ejemplo #1 Ejemplo de gmp_and()**

&lt;?php
$and1 = gmp_and("0xfffffffff4", "0x4");
$and2 = gmp_and("0xfffffffff4", "0x8");
echo gmp_strval($and1) . "\n";
echo gmp_strval($and2) . "\n";
?&gt;

El ejemplo anterior mostrará:

4
0

# gmp_binomial

(PHP 7 &gt;= 7.3.0, PHP 8)

gmp_binomial — Calcula el coeficiente binomial

### Descripción

**gmp_binomial**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $n, [int](#language.types.integer) $k): [GMP](#class.gmp)

Calcula el coeficiente binomial C(n, k).

### Parámetros

     n



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     k








### Valores devueltos

Retorna el coeficiente binomial C(n, k).

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror) si k es negativo.
Anterior a PHP 8.0.0, se emitía **[E_WARNING](#constant.e-warning)** en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no retorna **[false](#constant.false)** en caso de fallo.



# gmp_clrbit

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_clrbit — Anula un byte

### Descripción

**gmp_clrbit**([GMP](#class.gmp) $num, [int](#language.types.integer) $index): [void](language.types.void.html)

Establece a 0 el byte index
en el número GMP num. El índice comienza
en cero.

### Parámetros

     num


       Un objeto [GMP](#class.gmp)






     index


       El índice del byte a anular. El índice 0 representa
       el último byte significativo.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo con gmp_clrbit()**

&lt;?php
$a = gmp_init("0xff");
gmp_clrbit($a, 0); // el índice comienza en cero
echo gmp_strval($a) . "\n";
?&gt;

El ejemplo anterior mostrará:

254

### Notas

**Nota**:

    A diferencia de la mayoría de las otras funciones GMP,
    **gmp_clrbit()** debe ser llamada con un objeto
    GMP ya existente (usando [gmp_init()](#function.gmp-init) por ejemplo). No será creada automáticamente.

### Ver también

    - [gmp_setbit()](#function.gmp-setbit) - Modifica un bit

    - [gmp_testbit()](#function.gmp-testbit) - Prueba si un bit está definido

# gmp_cmp

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_cmp — Compara los números

### Descripción

**gmp_cmp**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [int](#language.types.integer)

Compara dos números.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuleve un valor positivo si a &gt; b, el cero si
a = b y el valor negativo de a si a &lt;
b.

### Ejemplos

**Ejemplo #1 gmp_cmp()** example

&lt;?php
$cmp1 = gmp_cmp("1234", "1000"); // greater than
$cmp2 = gmp_cmp("1000", "1234"); // less than
$cmp3 = gmp_cmp("1234", "1234"); // equal to

echo "$cmp1 $cmp2 $cmp3\n";
?&gt;

El ejemplo anterior mostrará:

1 -1 0

# gmp_com

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_com — Calcula uno de los complementos

### Descripción

**gmp_com**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Devuelve uno de los complementos de num.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve uno de los complementos de num, como un número GMP.

### Ejemplos

**Ejemplo #1 Ejemplo de gmp_com()**

&lt;?php
$com = gmp_com("1234");
echo gmp_strval($com) . "\n";
?&gt;

El ejemplo anterior mostrará:

-1235

# gmp_div

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_div — Alias de [gmp_div_q()](#function.gmp-div-q)

### Descripción

Esta función es un alias de:
[gmp_div_q()](#function.gmp-div-q).

# gmp_div_q

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_div_q — Divide los números

### Descripción

**gmp_div_q**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2, [int](#language.types.integer) $rounding_mode = **[GMP_ROUND_ZERO](#constant.gmp-round-zero)**): [GMP](#class.gmp)

Divide num1 con num2 y
devuelve el entero resultante.

### Parámetros

     num1


       El número que sera dividido.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El número que num1 esta siendo dividido.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     rounding_mode


       El redondeo resultante es definido por el
       rounding_mode, el cual puede tener uno de los siguientes
       valores:



        -

          **[GMP_ROUND_ZERO](#constant.gmp-round-zero)**: El resultante es truncado
          hacia o.



        -

          **[GMP_ROUND_PLUSINF](#constant.gmp-round-plusinf)**:El resultado es
          redondeado hacia +infinity.



        -

          **[GMP_ROUND_MINUSINF](#constant.gmp-round-minusinf)**: El resultado es
          redondeado hacia -infinity.







Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_div_q()**

&lt;?php
$div1 = gmp_div_q("100", "5");
echo gmp_strval($div1) . "\n";

$div2 = gmp_div_q("1", "3");
echo gmp_strval($div2) . "\n";

$div3 = gmp_div_q("1", "3", GMP_ROUND_PLUSINF);
echo gmp_strval($div3) . "\n";

$div4 = gmp_div_q("-1", "4", GMP_ROUND_PLUSINF);
echo gmp_strval($div4) . "\n";

$div5 = gmp_div_q("-1", "4", GMP_ROUND_MINUSINF);
echo gmp_strval($div5) . "\n";
?&gt;

    El ejemplo anterior mostrará:

20
0
1
0
-1

### Notas

**Nota**:

    This function can also be called as [gmp_div()](#function.gmp-div).

### Ver también

    - [gmp_div_r()](#function.gmp-div-r) - El resto de la división de los números

    - [gmp_div_qr()](#function.gmp-div-qr) - Divide los números y obtiene el cociente y resto

# gmp_div_qr

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_div_qr — Divide los números y obtiene el cociente y resto

### Descripción

**gmp_div_qr**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2, [int](#language.types.integer) $rounding_mode = **[GMP_ROUND_ZERO](#constant.gmp-round-zero)**): [array](#language.types.array)

La función divide a num1 por num2.

### Parámetros

     num1


       El número que es dividido.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El número que es dividio por num1.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     rounding_mode


       Ver la función [gmp_div_q()](#function.gmp-div-q) para la descripción
       del argumento rounding_mode.





### Valores devueltos

Devuelve un [array](#language.types.array), con el primer
elemento siendo [n/d] (el entero resultante de la
división) y el segundo siendo (n - [n/d] \* d)
(el resto de la división).

### Ejemplos

    **Ejemplo #1 División  de números GMP**

&lt;?php
$a = gmp_init("0x41682179fbf5");
$res = gmp_div_qr($a, "0xDEFE75");
printf("El resultado es: q - %s, r - %s",
       gmp_strval($res[0]), gmp_strval($res[1]));
?&gt;

### Ver también

    - [gmp_div_q()](#function.gmp-div-q) - Divide los números

    - [gmp_div_r()](#function.gmp-div-r) - El resto de la división de los números

# gmp_div_r

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_div_r — El resto de la división de los números

### Descripción

**gmp_div_r**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2, [int](#language.types.integer) $rounding_mode = **[GMP_ROUND_ZERO](#constant.gmp-round-zero)**): [GMP](#class.gmp)

Calcula el resto de la división entera de
num1 por num2. El
tiene el signo del argumento num1,
si no es cero.

### Parámetros

     num1


       El número que es dividido.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El número que es dividio por num1.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     rounding_mode


       Ver la función [gmp_div_q()](#function.gmp-div-q) para la descripción
       del argumento rounding_mode.





### Valores devueltos

The remainder, as a GMP number.

### Ejemplos

    **Ejemplo #1 gmp_div_r()** example

&lt;?php
$div = gmp_div_r("105", "20");
echo gmp_strval($div) . "\n";
?&gt;

    El ejemplo anterior mostrará:

5

### Ver también

    - [gmp_div_q()](#function.gmp-div-q) - Divide los números

    - [gmp_div_qr()](#function.gmp-div-qr) - Divide los números y obtiene el cociente y resto

# gmp_divexact

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_divexact — División exacta de números GMP

### Descripción

**gmp_divexact**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Divide num1 entre num2,
utilizando los algoritmos de "división
exacta". Esta función solo proporciona resultados coherentes
cuando se sabe de antemano que num2 divide
num1.

### Parámetros

     num1


       El número a dividir.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El divisor.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_divexact()**

&lt;?php
$div1 = gmp_divexact("10", "2");
echo gmp_strval($div1) . "\n";

$div2 = gmp_divexact("10", "3"); // resultado incoherente
echo gmp_strval($div2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

5
2863311534

# gmp_export

(PHP 5 &gt;= 5.6.1, PHP 7, PHP 8)

gmp_export — Exportación hacia un string binario

### Descripción

**gmp_export**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $word_size = 1, [int](#language.types.integer) $flags = GMP_MSW_FIRST | GMP_NATIVE_ENDIAN): [string](#language.types.string)

Exporta un número GMP hacia un string binario.

### Parámetros

     num


       El número GMP a exportar.






     word_size


       El valor por omisión es 1. El número de bytes en cada
       parte de datos binarios. Principalmente utilizado con
       el argumento options.






     flags


       El valor por omisión es **[GMP_MSW_FIRST](#constant.gmp-msw-first)** | **[GMP_NATIVE_ENDIAN](#constant.gmp-native-endian)**.





### Valores devueltos

Retorna un string.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no retorna **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_export()**

&lt;?php
$number = gmp_init(16705);
echo gmp_export($number) . "\n";
?&gt;

    El ejemplo anterior mostrará:

AA

### Ver también

    - [gmp_import()](#function.gmp-import) - Importación desde una cadena binaria

# gmp_fact

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_fact — Factorielle GMP

### Descripción

**gmp_fact**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Calcula la factorielle (num!) de num.

### Parámetros

     num


       El número factoriel.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_fact()**

&lt;?php
$fact1 = gmp_fact(5); // 5 * 4 * 3 * 2 * 1
echo gmp_strval($fact1) . "\n";

$fact2 = gmp_fact(50); // 50 * 49 * 48, ... etc
echo gmp_strval($fact2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

120
30414093201713378043612608166064768844377641568960512000000000000

# gmp_gcd

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_gcd — Calcula el máximo común divisor

### Descripción

**gmp_gcd**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Calcula el máximo común divisor de num1 y
num2. El resultado es siempre positivo aun si
cualquiera de, o ambos, operadores fueran negativos.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un número positivo GMP que divide dentro a ambos
num1 y num2.

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_gcd()**

&lt;?php
$gcd = gmp_gcd("12", "21");
echo gmp_strval($gcd) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3

### Ver también

- [gmp_lcm()](#function.gmp-lcm) - Calcula el Mínimo Común Múltiplo (MCM)

# gmp_gcdext

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_gcdext — Calcula el máximo común divisor y multiplicadores

### Descripción

**gmp_gcdext**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [array](#language.types.array)

Calcula g, s, y t, tal que a*s + b*t = g =
gcd(a,b), donde gcd es el máximo común divisor. Devuelve
un arreglo con los elementos respectivos g, s y t.

Ésta función puede ser usada para resolver ecuaciones de diofántica lineal equations en dos
variables. Estas son ecuaciones que permiten solo soluciones enteras y tienen la forma:
a*x + b*y = c.
Para más información, vaya a [» "Diophantine
Equation" en la página MathWorld](http://mathworld.wolfram.com/DiophantineEquation.html)

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un [array](#language.types.array) de números GMP.

### Ejemplos

    **Ejemplo #1 Resolver ecuaciones de diofántica lineal**

&lt;?php
// Resolver la ecuación a*s + b*t = g
// donde a = 12, b = 21, g = gcd(12, 21) = 3
$a = gmp_init(12);
$b = gmp_init(21);
$g = gmp_gcd($a, $b);
$r = gmp_gcdext($a, $b);

$check_gcd = (gmp_strval($g) == gmp_strval($r['g']));
$eq_res = gmp_add(gmp_mul($a, $r['s']), gmp_mul($b, $r['t']));
$check_res = (gmp_strval($g) == gmp_strval($eq_res));

if ($check_gcd &amp;&amp; $check_res) {
    $fmt = "Solution: %d*%d + %d*%d = %d\n";
    printf($fmt, gmp_strval($a), gmp_strval($r['s']), gmp_strval($b),
    gmp_strval($r['t']), gmp_strval($r['g']));
} else {
echo "Error mientras se resolvia la ecuación\n";
}

// output: Solución: 12*2 + 21*-1 = 3
?&gt;

# gmp_hamdist

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_hamdist — Distancia Hamming

### Descripción

**gmp_hamdist**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [int](#language.types.integer)

Devuelve la distancia hamming entre num1 y
num2. Ambos operadores deberían ser no negativos.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

       Debería ser positivo.






     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

       Debería ser positivo.





### Valores devueltos

La distancia de Hamming entre num1 y num2, como un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_hamdist()**

&lt;?php
$ham1 = gmp_init("1001010011", 2);
$ham2 = gmp_init("1011111100", 2);
echo gmp_hamdist($ham1, $ham2) . "\n";

/_ la distancia hamming es equivalente a: _/
echo gmp_popcount(gmp_xor($ham1, $ham2)) . "\n";
?&gt;

    El ejemplo anterior mostrará:

6
6

### Ver también

    - [gmp_popcount()](#function.gmp-popcount) - Cuenta la población

    - [gmp_xor()](#function.gmp-xor) - Nivel de bit XOR

# gmp_import

(PHP 5 &gt;= 5.6.1, PHP 7, PHP 8)

gmp_import — Importación desde una cadena binaria

### Descripción

**gmp_import**([string](#language.types.string) $data, [int](#language.types.integer) $word_size = 1, [int](#language.types.integer) $flags = GMP_MSW_FIRST | GMP_NATIVE_ENDIAN): [GMP](#class.gmp)

Importa un número GMP desde una cadena binaria.

### Parámetros

     data


       La cadena binaria a importar.






     word_size


       El valor por omisión es 1. El número de bytes en cada parte
       de datos binarios. Principalmente utilizado con el argumento options.






     flags


       El valor por omisión es **[GMP_MSW_FIRST](#constant.gmp-msw-first)** | **[GMP_NATIVE_ENDIAN](#constant.gmp-native-endian)**.





### Valores devueltos

Devuelve un número GMP.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_import()**

&lt;?php
$number = gmp_import("\0");
echo gmp_strval($number) . "\n";

$number = gmp_import("\0\1\2");
echo gmp_strval($number) . "\n";
?&gt;

    El ejemplo anterior mostrará:

0
258

### Ver también

    - [gmp_export()](#function.gmp-export) - Exportación hacia un string binario

# gmp_init

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_init — Crea un número GMP

### Descripción

**gmp_init**([int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $base = 0): [GMP](#class.gmp)

Crea un número GMP, a partir de un entero o de un string.

### Parámetros

    num


      Un entero o un string. El string puede ser una representación decimal,
      hexadecimal, octal o binaria.




    base


      La base a utilizar para convertir una representación en forma de [string](#language.types.string).


      Una base explícita puede estar comprendida entre 2 y 62.
      Para las bases hasta 36, la casilla es ignorada:
      las letras mayúsculas y minúsculas tienen el mismo valor.
      Para las bases de 37 a 62,
      las letras mayúsculas representan los valores de 10 a
      35 y las letras minúsculas representan los valores de
      36 a 61.


      Si base vale 0, entonces la base real
      es determinada a partir de los caracteres iniciales de num.
      Si los dos primeros caracteres son 0x o 0X,
      el string es interpretado como un entero hexadecimal.
      Si los dos primeros caracteres son 0b o 0B,
      el string es interpretado como un entero binario.
      Si los dos primeros caracteres son 0o o 0O,
      el string es interpretado como un entero octal.
      Además, si el primer carácter es 0, el string
      es igualmente interpretado como un entero octal.
      En todos los demás casos, el string es interpretado como un entero decimal.


### Valores devueltos

Un objeto [GMP](#class.gmp).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El soporte para los prefijos octales explícitos 0o y
       0O ha sido añadido para los strings
       num. La interpretación de estos prefijos cuando
       base vale 0 ha sido igualmente añadida.



### Ejemplos

    **Ejemplo #1 Creación de un número GMP**

&lt;?php
$a = gmp_init(123456);
$b = gmp_init("0xFFFFDEBACDFEDF7200");
?&gt;

### Notas

**Nota**:

    No es necesario llamar a esta función para utilizar enteros
    o strings en lugar de números GMP en las funciones GMP, como
    [gmp_add()](#function.gmp-add). Los argumentos de estas funciones son
    automáticamente convertidos en números GMP, si esta conversión es posible
    y necesaria, utilizando las mismas reglas que **gmp_init()**.

### Ver también

- [GMP::\_\_construct()](#gmp.construct) - Crea un número GMP

# gmp_intval

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_intval — Convertir un número GMP a entero

### Descripción

**gmp_intval**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [int](#language.types.integer)

Esta función convierte un número GMP an un [int](#language.types.integer) nativo de PHP.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

El valor [int](#language.types.integer) de num.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_intval()**

&lt;?php
// muestra el valor correcto
echo gmp_intval("2147483647") . "\n";

//muestra el valor correcto
echo gmp_intval("2147483648") . "\n";

// muestra el valor correcto
echo gmp_strval("2147483648") . "\n";
?&gt;

    El ejemplo anterior mostrará:

2147483647
2147483647
2147483648

### Notas

**Advertencia**

    Ésta función retorna un resultado satisfactorio solo si el numero actualmente
    encaja con el PHP entero (ej., símbolo de tipo largo).
    Para imprimir simplemente el número GMP, use [gmp_strval()](#function.gmp-strval).

# gmp_invert

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_invert — Inverso del modulo

### Descripción

**gmp_invert**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)|[false](#language.types.singleton)

Computa el inverso del modulo de num1
num2.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un número GMO en éxito o **[false](#constant.false)** Si el inverso.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_invert()**

&lt;?php
echo gmp_invert("5", "10"); // sin inverso no inverse, ninguna salida, el resultado es falso
$invert = gmp_invert("5", "11");
echo gmp_strval($invert) . "\n";
?&gt;

    El ejemplo anterior mostrará:

9

# gmp_jacobi

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_jacobi — Símbolo Jacobi

### Descripción

**gmp_jacobi**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [int](#language.types.integer)

Computa el
[» símbolo Jacobi](http://primes.utm.edu/glossary/page.php?sort=JacobiSymbol) de num1 y
num2. num2 debería ser impar
y tiene que ser positivo.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

       Debería ser impar y tiene que ser positivo.





### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_jacobi()**

&lt;?php
echo gmp_jacobi("1", "3") . "\n";
echo gmp_jacobi("2", "3") . "\n";
?&gt;

    El ejemplo anterior mostrará:

1
0

### Ver también

- [gmp_kronecker()](#function.gmp-kronecker) - Símbolo Kronecker

- [gmp_legendre()](#function.gmp-legendre) - Símbolo Legendre

# gmp_kronecker

(PHP 7 &gt;= 7.3.0, PHP 8)

gmp_kronecker — Símbolo Kronecker

### Descripción

**gmp_kronecker**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [int](#language.types.integer)

Esta función calcula el símbolo Kronecker de num1 y
num2.

### Parámetros

    num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

    num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve el símbolo Kronecker de num1 y
num2.

### Ver también

- [gmp_jacobi()](#function.gmp-jacobi) - Símbolo Jacobi

- [gmp_legendre()](#function.gmp-legendre) - Símbolo Legendre

# gmp_lcm

(PHP 7 &gt;= 7.3.0, PHP 8)

gmp_lcm — Calcula el Mínimo Común Múltiplo (MCM)

### Descripción

**gmp_lcm**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Esta función calcula el mínimo común múltiplo (MCM) de
num1 y num2.

### Parámetros

    num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

    num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ver también

- [gmp_gcd()](#function.gmp-gcd) - Calcula el máximo común divisor

# gmp_legendre

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_legendre — Símbolo Legendre

### Descripción

**gmp_legendre**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [int](#language.types.integer)

Computa el
[» 
Símbolo Legendre](http://primes.utm.edu/glossary/page.php?sort=LegendreSymbol) de num1 y
num2. num2 debería ser impar
y tiene que ser positivo.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

       debería ser impar y tiene que ser positivo.





### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_legendre()**

&lt;?php
echo gmp_legendre("1", "3") . "\n";
echo gmp_legendre("2", "3") . "\n";
?&gt;

    El ejemplo anterior mostrará:

1
0

### Ver también

- [gmp_jacobi()](#function.gmp-jacobi) - Símbolo Jacobi

- [gmp_kronecker()](#function.gmp-kronecker) - Símbolo Kronecker

# gmp_mod

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_mod — Modulo de operación

### Descripción

**gmp_mod**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Calcula el modulo de num1
num2. El resultado es siempre no negativo, el
símbolo de num2 es ignorado.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El modulo que es evaluado.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_mod()**

&lt;?php
$mod = gmp_mod("8", "3");
echo gmp_strval($mod) . "\n";
?&gt;

    El ejemplo anterior mostrará:

2

# gmp_mul

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_mul — Multiplicación de números

### Descripción

**gmp_mul**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Multiplicación de num1 por num2
y devuelve el resultado.

### Parámetros

     num1


       Un número que va a ser multiplicado por num2.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       Un número que va a ser multiplicado por num1.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_mul()**

&lt;?php
$mul = gmp_mul("12345678", "2000");
echo gmp_strval($mul) . "\n";
?&gt;

    El ejemplo anterior mostrará:

24691356000

# gmp_neg

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_neg — Número negativo

### Descripción

**gmp_neg**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Devuelve el valor negativo de un número.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve -num, como un número GMP.

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_neg()**

&lt;?php
$neg1 = gmp_neg("1");
echo gmp_strval($neg1) . "\n";
$neg2 = gmp_neg("-1");
echo gmp_strval($neg2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

-1
1

# gmp_nextprime

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

gmp_nextprime — Encuentra el siguiente número primo

### Descripción

**gmp_nextprime**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Encuentra el siguiente número primo

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve el siguiente número primo o mayor num,
como un número GMP.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_nextprime()**

&lt;?php
$prime1 = gmp_nextprime(10); // el siguiente número primo o superior que 10
$prime2 = gmp_nextprime(-1000); // el siguiente número primo o superior que -1000

echo gmp_strval($prime1) . "\n";
echo gmp_strval($prime2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

11
2

### Notas

**Nota**:

    Ésta función  usa un algoritmo probabilístico para identificar el número primo y
    posibilita la obtención de un número compuesto que sea extremadamente pequeño.

# gmp_or

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_or — Nivel de bit OR

### Descripción

**gmp_or**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Calcula el nivel de bit OR de dos números GMP.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_or()**

&lt;?php
$or1 = gmp_or("0xfffffff2", "4");
echo gmp_strval($or1, 16) . "\n";
$or2 = gmp_or("0xfffffff2", "2");
echo gmp_strval($or2, 16) . "\n";
?&gt;

    El ejemplo anterior mostrará:

fffffff6
fffffff2

# gmp_perfect_power

(PHP 7 &gt;= 7.3.0, PHP 8)

gmp_perfect_power — Verifica si un número es una potencia perfecta

### Descripción

**gmp_perfect_power**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [bool](#language.types.boolean)

Verifica si num es una potencia perfecta.

### Parámetros

    num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve **[true](#constant.true)** si num es una potencia perfecta, **[false](#constant.false)** en caso contrario.

### Ver también

- [gmp_perfect_square()](#function.gmp-perfect-square) - Comprueba el cuadrado perfecto

# gmp_perfect_square

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_perfect_square — Comprueba el cuadrado perfecto

### Descripción

**gmp_perfect_square**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [bool](#language.types.boolean)

Revisa si un número es cuadrado perfecto.

### Parámetros

     num


       El número a ser revisado como un cuadrado perfecto.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devielve **[true](#constant.true)** si num es un cuadrado perfecto, sino
**[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_perfect_square()**

&lt;?php
// 3 \* 3, cuadrado perfecto
var_dump(gmp_perfect_square("9"));

// no es un cuadrado perfecto
var_dump(gmp_perfect_square("7"));

// 1234567890 \* 1234567890, cuadrado perfecto
var_dump(gmp_perfect_square("1524157875019052100"));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(true)

### Ver también

    - [gmp_perfect_power()](#function.gmp-perfect-power) - Verifica si un número es una potencia perfecta

    - [gmp_sqrt()](#function.gmp-sqrt) - Calcula la raíz cuadrada

    - [gmp_sqrtrem()](#function.gmp-sqrtrem) - Raíz cuadrada con resto

# gmp_popcount

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_popcount — Cuenta la población

### Descripción

**gmp_popcount**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [int](#language.types.integer)

Obtiene el conteo de la población.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

El conteo de la población de num, como un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_popcount()**

&lt;?php
$pop1 = gmp_init("10000101", 2); // 3 1's
echo gmp_popcount($pop1) . "\n";
$pop2 = gmp_init("11111110", 2); // 7 1's
echo gmp_popcount($pop2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3
7

# gmp_pow

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_pow — Aumenta el número a la potencia

### Descripción

**gmp_pow**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $exponent): [GMP](#class.gmp)

Aumenta la num a la potencia exponent.

### Parámetros

     num


       La base del número.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     exponent


       La potencia positiva a elevar la num.





### Valores devueltos

El nuevo (elevado) número, como un número GMP. El caso de
0^0 produce 1.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_pow()**

&lt;?php
$pow1 = gmp_pow("2", 31);
echo gmp_strval($pow1) . "\n";
$pow2 = gmp_pow("0", 0);
echo gmp_strval($pow2) . "\n";
$pow3 = gmp_pow("2", -1); // exponente negativo, genera peligro
echo gmp_strval($pow3) . "\n";
?&gt;

    El ejemplo anterior mostrará:

2147483648
1

# gmp_powm

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_powm — Eleva un número a la potencia con modulo

### Descripción

**gmp_powm**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $exponent, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $modulus): [GMP](#class.gmp)

Calcula la (num elevada a la potencia
exponent) con modulo modulus. Si
exponent es negativo, el resultado es indefinido.

### Parámetros

     num


       La base del número.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     exponent


       La potencia positiva a elevar la num.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     modulus


       El modulo.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

El nuevo (elevado) número, como un número GMP.

### Ejemplos

    **Ejemplo #1 gmp_powm()** example

&lt;?php
$pow1 = gmp_powm("2", "31", "2147483649");
echo gmp_strval($pow1) . "\n";
?&gt;

    El ejemplo anterior mostrará:

2147483648

# gmp_prob_prime

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_prob_prime — Revisa si el número es "probablemente primo"

### Descripción

**gmp_prob_prime**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $repetitions = 10): [int](#language.types.integer)

La función usa la prueba probabilística de Miller-Rabin para revisar si un número es primo.

### Parámetros

     num


       El número a ser revisado como primo.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     repetitions


       Valores rasonables
       de repetitions varían de 5 a 10 (por defecto siendo
       10); un valor superior disminuye la probabilidad para un número no primo a
       pasar como un "probable" primo.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Si ésta función devolvier 0, num es
definitivamente no primo. Si devuelve 1, entonces
num es "probablemente" primo. si devolviera 2,
entonces num es seguramente primo.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_prob_prime()**

&lt;?php
// definitivamente no primo
echo gmp_prob_prime("6") . "\n";

// probablemente primo
echo gmp_prob_prime("1111111111111111111") . "\n";

// definitivamente primo
echo gmp_prob_prime("11") . "\n";
?&gt;

    El ejemplo anterior mostrará:

0
1
2

# gmp_random

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7)

gmp_random — Número GMP aleatorio

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**gmp_random**([int](#language.types.integer) $limiter = 20): [GMP](#class.gmp)

Genera un número aleatorio. Este número estará comprendido entre cero y (2 \*\* n) -1,
donde n es el número de bits por limb multiplicado por limiter.
Si limiter es negativo, se genera un número negativo.

Un limb es un mecanismo interno de GMP. El número de bits en un limb
no es estático, y puede variar entre los sistemas. En general, el número
de bits por limb es 32 o 64, pero esto no está garantizado.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     limiter


       El limitador.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un número GMP aleatorio.

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_random()**

&lt;?php
$rand1 = gmp_random(1); // número aleatorio de 0 a 1 * bits por limb
$rand2 = gmp_random(2); // número aleatorio de 0 a 2 \* bits por limb

echo gmp_strval($rand1) . "\n";
echo gmp_strval($rand2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

1915834968
8642564075890328087

# gmp_random_bits

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

gmp_random_bits — Genera un número aleatorio

### Descripción

**gmp_random_bits**([int](#language.types.integer) $bits): [GMP](#class.gmp)

Genera un número aleatorio. El número estará en el intervalo
0 y
2$bits - 1.

El argumento bits debe ser mayor que 0,
y el valor máximo estará restringido por la memoria disponible.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     bits


       El número de bits a generar.





### Valores devueltos

Un número GMP aleatorio.

### Errores/Excepciones

Si bits es menor que 1,
se lanzará una [ValueError](#class.valueerror).

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_random_bits()**

&lt;?php
$rand1 = gmp_random_bits(3); // número aleatorio entre 0 y 7
$rand2 = gmp_random_bits(5); // número aleatorio entre 0 y 31

echo gmp_strval($rand1) . "\n";
echo gmp_strval($rand2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3
15

# gmp_random_range

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

gmp_random_range — Obtener un entero seleccionado uniformemente

### Descripción

**gmp_random_range**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $min, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $max): [GMP](#class.gmp)

Genera un número aleatorio. El número estará en el intervalo
min y max.

min y max pueden ser ambos negativos,
pero min debe ser siempre inferior a max.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     min


       Un número GMP que representa el límite inferior para el número aleatorio.






     max


       Un número GMP que representa el límite superior para el número aleatorio.





### Valores devueltos

Un número GMP aleatorio.
Devuelve un objeto GMP que contiene un entero seleccionado uniformemente
en el intervalo cerrado
[min, max].
min y max son
ambos valores de retorno posibles.

### Errores/Excepciones

Si max es inferior a min,
se lanzará una [ValueError](#class.valueerror).

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_random_range()**

&lt;?php
$rand1 = gmp_random_range(0, 100);    // número aleatorio entre 0 y 100
$rand2 = gmp_random_range(-100, -10); // número aleatorio entre -100 y -10

echo gmp_strval($rand1) . "\n";
echo gmp_strval($rand2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

42
-67

# gmp_random_seed

(PHP 7, PHP 8)

gmp_random_seed — Define la semilla RNG (Generador de Números Aleatorios)

### Descripción

**gmp_random_seed**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $seed): [void](language.types.void.html)

### Parámetros

     seed


       La semilla a definir para las funciones [gmp_random()](#function.gmp-random),
       [gmp_random_bits()](#function.gmp-random-bits), y
       [gmp_random_range()](#function.gmp-random-range).






Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) si el
argumento seed es inválido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si el argumento seed es inválido, **gmp_random_seed()**
       levanta una excepción [ValueError](#class.valueerror) a partir de ahora.
       Anteriormente se emitía una advertencia **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_random_seed()**

&lt;?php
// set the seed
gmp_random_seed(100);

var_dump(gmp_strval(gmp_random(1)));

// set the seed to something else
gmp_random_seed(gmp_init(-100));

var_dump(gmp_strval(gmp_random_bits(10)));

// set the seed to something invalid
var_dump(gmp_random_seed('not a number'));

    El ejemplo anterior mostrará:

string(20) "15370156633245019617"
string(3) "683"

Warning: gmp_random_seed(): Unable to convert variable to GMP - string is not an integer in %s on line %d
bool(false)

### Ver también

- [gmp_init()](#function.gmp-init) - Crea un número GMP

- [gmp_random()](#function.gmp-random) - Número GMP aleatorio

- [gmp_random_bits()](#function.gmp-random-bits) - Genera un número aleatorio

- [gmp_random_range()](#function.gmp-random-range) - Obtener un entero seleccionado uniformemente

# gmp_root

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

gmp_root — Tomar la parte entera de una raíz enésima

### Descripción

**gmp_root**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $nth): [GMP](#class.gmp)

Toma la raíz enésima dada por nth de num y
devuelve el componente entero del resultado.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     nth


       La raíz positiva a tomar de num.





### Valores devueltos

El componente entero de la raíz resultante, como número GMP.

# gmp_rootrem

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

gmp_rootrem — Tomar la parte entera y el resto de una raíz enésima

### Descripción

**gmp_rootrem**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $nth): [array](#language.types.array)

Toma la raíz enésima dada por nth de num y
devuelve el componente entero y el resto del resultado.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     nth


       La raíz positiva a tomar de num.





### Valores devueltos

Un array de dos elementos, donde el primero es el componente entero de
la raíz, y el segundo es el resto, ambos representados como números
GMP.

# gmp_scan0

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_scan0 — Escanear para 0

### Descripción

**gmp_scan0**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [int](#language.types.integer) $start): [int](#language.types.integer)

Escanea num1, empezando con el bit de
start, hacia los bits mas significantes,
hasta que el primero bit establecido es encontrado.

### Parámetros

     num1


       El número a escanear.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     start


       El inicio del bit.





### Valores devueltos

Devuelve el índice del bit encontrado, como un [int](#language.types.integer). El
índice inicia desde 0.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_scan0()**

&lt;?php
// "0" el bit se encuentra en la posición 3. El índice inica en 0
$s1 = gmp_init("10111", 2);
echo gmp_scan0($s1, 0) . "\n";

// "0" el bit se encuentra en la posición 7. El índice inica en 5
$s2 = gmp_init("101110000", 2);
echo gmp_scan0($s2, 5) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3
7

# gmp_scan1

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_scan1 — Escanear para 1

### Descripción

**gmp_scan1**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [int](#language.types.integer) $start): [int](#language.types.integer)

Escanea num1, empezando con el bit de
start, hacia los bits mas significantes,
hasta que el primero bit establecido es encontrado.

### Parámetros

     num1


       El número a escanear.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     start


       El inicio del bit.





### Valores devueltos

Devuelve el índice del bit encontrado, como un [int](#language.types.integer).
Si el bit establecido no es encontrado, -1 se devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_scan1()**

&lt;?php
// "1" el bit se encuentra en la posición 3. El índice inica en 0
$s1 = gmp_init("01000", 2);
echo gmp_scan1($s1, 0) . "\n";

// "1" el bit se encuentra en la posición 9. El índice inica en 5
$s2 = gmp_init("01000001111", 2);
echo gmp_scan1($s2, 5) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3
9

# gmp_setbit

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_setbit — Modifica un bit

### Descripción

**gmp_setbit**([GMP](#class.gmp) $num, [int](#language.types.integer) $index, [bool](#language.types.boolean) $value = **[true](#constant.true)**): [void](language.types.void.html)

Modifica el bit index
en num.

### Parámetros

     num


       Un objeto [GMP](#class.gmp)






     index


       El índice del byte a definir.
       El índice 0 representa el byte menos significativo.






     value


       **[true](#constant.true)** para definir el byte (definido a 1/on); **[false](#constant.false)**
       para reinicializarlo (definido a 0/off).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_setbit()** - índice 0

&lt;?php
$a = gmp_init("2"); //
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
gmp_setbit($a, 0); // 0b10 ahora es 0b11
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
?&gt;

    El ejemplo anterior mostrará:

2 -&gt; 0b10
3 -&gt; 0b11

    **Ejemplo #2 Ejemplo con gmp_setbit()** - índice 1

&lt;?php
$a = gmp_init("0xfd");
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
gmp_setbit($a, 1); // el índice comienza en 0
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
?&gt;

    El ejemplo anterior mostrará:

253 -&gt; 0b11111101
255 -&gt; 0b11111111

    **Ejemplo #3 Ejemplo con gmp_setbit()** - borra un byte

&lt;?php
$a = gmp_init("0xff");
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
gmp_setbit($a, 0, false); // clear bit at index 0
echo gmp_strval($a), ' -&gt; 0b', gmp_strval($a, 2), "\n";
?&gt;

    El ejemplo anterior mostrará:

255 -&gt; 0b11111111
254 -&gt; 0b11111110

### Notas

**Nota**:

    A diferencia de la mayoría de las otras funciones GMP,
    **gmp_setbit()** debe ser llamada con un objeto
    GMP ya existente (utilizando [gmp_init()](#function.gmp-init) por
    ejemplo). No será creada automáticamente.

### Ver también

    - [gmp_clrbit()](#function.gmp-clrbit) - Anula un byte

    - [gmp_testbit()](#function.gmp-testbit) - Prueba si un bit está definido

# gmp_sign

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_sign — Signo del número GMP

### Descripción

**gmp_sign**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [int](#language.types.integer)

Verifica el signo de un número.

### Parámetros

     num


       Puede ser un objeto [GMP](#class.gmp) o una cadena numérica,
       siempre que sea posible convertir esta última en un [int](#language.types.integer).





### Valores devueltos

Devuelve el signo de num:
1 si num es positivo, -1 si es negativo y 0 si
num es igual a cero.

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_sign()**

&lt;?php
// positivo
echo gmp_sign("500") . "\n";

// negativo
echo gmp_sign("-500") . "\n";

// cero
echo gmp_sign("0") . "\n";
?&gt;

    El ejemplo anterior mostrará:

1
-1
0

### Ver también

    - [gmp_abs()](#function.gmp-abs) - Valor absoluto

    - [abs()](#function.abs) - Valor absoluto

# gmp_sqrt

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_sqrt — Calcula la raíz cuadrada

### Descripción

**gmp_sqrt**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [GMP](#class.gmp)

Calcula la raíz cuadrada de num.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

La porción entera de la raíz cuadrada, como un número GMP.

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_sqrt()**

&lt;?php
$sqrt1 = gmp_sqrt("9");
$sqrt2 = gmp_sqrt("7");
$sqrt3 = gmp_sqrt("1524157875019052100");

echo gmp_strval($sqrt1) . "\n";
echo gmp_strval($sqrt2) . "\n";
echo gmp_strval($sqrt3) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3
2
1234567890

# gmp_sqrtrem

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_sqrtrem — Raíz cuadrada con resto

### Descripción

**gmp_sqrtrem**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num): [array](#language.types.array)

Calcula la raíz cuadrada de un número, con resto.

### Parámetros

     num


       El número a ser la raíz cuadrada.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Devuelve un arreglo donde el primer elemento es el entero de la raíz cuadrada de
num y el segundo es el resto
(ej., La diferencia entre num y el primer elemento
de la raíz cuadrada).

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_sqrtrem()**

&lt;?php
list($sqrt1, $sqrt1rem) = gmp_sqrtrem("9");
list($sqrt2, $sqrt2rem) = gmp_sqrtrem("7");
list($sqrt3, $sqrt3rem) = gmp_sqrtrem("1048576");

echo gmp_strval($sqrt1) . ", " . gmp_strval($sqrt1rem) . "\n";
echo gmp_strval($sqrt2) . ", " . gmp_strval($sqrt2rem) . "\n";
echo gmp_strval($sqrt3) . ", " . gmp_strval($sqrt3rem) . "\n";
?&gt;

    El ejemplo anterior mostrará:

3, 0
2, 3
1024, 0

# gmp_strval

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_strval — Convierte un número GMP en string

### Descripción

**gmp_strval**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $base = 10): [string](#language.types.string)

Convierte un número GMP en string, en la base
base. La base por omisión es 10.

### Parámetros

     num


       El número GMP que debe ser convertido.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     base


       La base del número devuelto. Por omisión, vale 10.
       Los valores posibles van de 2 a 62 y de -2 a -36.





### Valores devueltos

El número, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Convertir un número GMP en [string](#language.types.string)**

&lt;?php
$a = gmp_init("0x41682179fbf5");
printf("Decimal : %s, 36-based : %s", gmp_strval($a), gmp_strval($a,36));
?&gt;

# gmp_sub

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_sub — Resta los números

### Descripción

**gmp_sub**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Resta num2 con num1
y devuelve el resultado.

### Parámetros

     num1


       El número a ser restado.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2


       El número restado con num1.





Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo de gmp_sub()**

&lt;?php
$sub = gmp_sub("281474976710656", "4294967296"); // 2^48 - 2^32
echo gmp_strval($sub) . "\n";
?&gt;

    El ejemplo anterior mostrará:

281470681743360

# gmp_testbit

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

gmp_testbit — Prueba si un bit está definido

### Descripción

**gmp_testbit**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num, [int](#language.types.integer) $index): [bool](#language.types.boolean)

Prueba si un bit está definido.

### Parámetros

     num



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     index


       El bit a probar





### Valores devueltos

Devuelve **[true](#constant.true)** si el bit está definido en el recurso
num, **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

Se emite una advertencia de nivel **[E_WARNING](#constant.e-warning)** cuando el argumento
index es menor que 0 ; **[false](#constant.false)** será devuelto
en este caso.

### Ejemplos

    **Ejemplo #1 Ejemplo con gmp_testbit()**

&lt;?php
$n = gmp_init("1000000");
var_dump(gmp_testbit($n, 1));
gmp_setbit($n, 1);
var_dump(gmp_testbit($n, 1));
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [gmp_setbit()](#function.gmp-setbit) - Modifica un bit

    - [gmp_clrbit()](#function.gmp-clrbit) - Anula un byte

# gmp_xor

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gmp_xor — Nivel de bit XOR

### Descripción

**gmp_xor**([GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num1, [GMP](#class.gmp)|[int](#language.types.integer)|[string](#language.types.string) $num2): [GMP](#class.gmp)

Calcula el nivel de bit exclusivo OR (XOR) de dos números GMP.

### Parámetros

     num1



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

     num2



Un objeto [GMP](#class.gmp), un [int](#language.types.integer),
o un [string](#language.types.string) que puede ser interpretado como un número siguiendo la misma lógica
que si la cadena fuera usada en [gmp_init()](#function.gmp-init) con detección automática de la base (es decir cuando base es igual a 0).

### Valores devueltos

Un objeto [GMP](#class.gmp).

### Ejemplos

    **Ejemplo #1 Ejemplo degmp_xor()**

&lt;?php
$xor1 = gmp_init("1101101110011101", 2);
$xor2 = gmp_init("0110011001011001", 2);

$xor3 = gmp_xor($xor1, $xor2);

echo gmp_strval($xor3, 2) . "\n";
?&gt;

    El ejemplo anterior mostrará:

1011110111000100

## Tabla de contenidos

- [gmp_abs](#function.gmp-abs) — Valor absoluto
- [gmp_add](#function.gmp-add) — Adición de 2 números GMP
- [gmp_and](#function.gmp-and) — AND a nivel de bit
- [gmp_binomial](#function.gmp-binomial) — Calcula el coeficiente binomial
- [gmp_clrbit](#function.gmp-clrbit) — Anula un byte
- [gmp_cmp](#function.gmp-cmp) — Compara los números
- [gmp_com](#function.gmp-com) — Calcula uno de los complementos
- [gmp_div](#function.gmp-div) — Alias de gmp_div_q
- [gmp_div_q](#function.gmp-div-q) — Divide los números
- [gmp_div_qr](#function.gmp-div-qr) — Divide los números y obtiene el cociente y resto
- [gmp_div_r](#function.gmp-div-r) — El resto de la división de los números
- [gmp_divexact](#function.gmp-divexact) — División exacta de números GMP
- [gmp_export](#function.gmp-export) — Exportación hacia un string binario
- [gmp_fact](#function.gmp-fact) — Factorielle GMP
- [gmp_gcd](#function.gmp-gcd) — Calcula el máximo común divisor
- [gmp_gcdext](#function.gmp-gcdext) — Calcula el máximo común divisor y multiplicadores
- [gmp_hamdist](#function.gmp-hamdist) — Distancia Hamming
- [gmp_import](#function.gmp-import) — Importación desde una cadena binaria
- [gmp_init](#function.gmp-init) — Crea un número GMP
- [gmp_intval](#function.gmp-intval) — Convertir un número GMP a entero
- [gmp_invert](#function.gmp-invert) — Inverso del modulo
- [gmp_jacobi](#function.gmp-jacobi) — Símbolo Jacobi
- [gmp_kronecker](#function.gmp-kronecker) — Símbolo Kronecker
- [gmp_lcm](#function.gmp-lcm) — Calcula el Mínimo Común Múltiplo (MCM)
- [gmp_legendre](#function.gmp-legendre) — Símbolo Legendre
- [gmp_mod](#function.gmp-mod) — Modulo de operación
- [gmp_mul](#function.gmp-mul) — Multiplicación de números
- [gmp_neg](#function.gmp-neg) — Número negativo
- [gmp_nextprime](#function.gmp-nextprime) — Encuentra el siguiente número primo
- [gmp_or](#function.gmp-or) — Nivel de bit OR
- [gmp_perfect_power](#function.gmp-perfect-power) — Verifica si un número es una potencia perfecta
- [gmp_perfect_square](#function.gmp-perfect-square) — Comprueba el cuadrado perfecto
- [gmp_popcount](#function.gmp-popcount) — Cuenta la población
- [gmp_pow](#function.gmp-pow) — Aumenta el número a la potencia
- [gmp_powm](#function.gmp-powm) — Eleva un número a la potencia con modulo
- [gmp_prob_prime](#function.gmp-prob-prime) — Revisa si el número es "probablemente primo"
- [gmp_random](#function.gmp-random) — Número GMP aleatorio
- [gmp_random_bits](#function.gmp-random-bits) — Genera un número aleatorio
- [gmp_random_range](#function.gmp-random-range) — Obtener un entero seleccionado uniformemente
- [gmp_random_seed](#function.gmp-random-seed) — Define la semilla RNG (Generador de Números Aleatorios)
- [gmp_root](#function.gmp-root) — Tomar la parte entera de una raíz enésima
- [gmp_rootrem](#function.gmp-rootrem) — Tomar la parte entera y el resto de una raíz enésima
- [gmp_scan0](#function.gmp-scan0) — Escanear para 0
- [gmp_scan1](#function.gmp-scan1) — Escanear para 1
- [gmp_setbit](#function.gmp-setbit) — Modifica un bit
- [gmp_sign](#function.gmp-sign) — Signo del número GMP
- [gmp_sqrt](#function.gmp-sqrt) — Calcula la raíz cuadrada
- [gmp_sqrtrem](#function.gmp-sqrtrem) — Raíz cuadrada con resto
- [gmp_strval](#function.gmp-strval) — Convierte un número GMP en string
- [gmp_sub](#function.gmp-sub) — Resta los números
- [gmp_testbit](#function.gmp-testbit) — Prueba si un bit está definido
- [gmp_xor](#function.gmp-xor) — Nivel de bit XOR

# La clase GMP

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

## Introducción

    Un número GMP. Estos objetos admiten los operadores
    [aritméticos](#language.operators.arithmetic),
    [a nivel de bit](#language.operators.bitwise) y
    [de comparación](#language.operators.comparison) sobrecargados.

**Nota**:

     No se proporciona ninguna interfaz orientada a objetos para manipular
     objetos **GMP**. Use la
     [API de GMP procedimental](#book.gmp).

## Sinopsis de la Clase

     final
     class **GMP**
     {

    /* Métodos */

public [\_\_construct](#gmp.construct)([int](#language.types.integer)|[string](#language.types.string) $num = 0, [int](#language.types.integer) $base = 0)

    public [__serialize](#gmp.serialize)(): [array](#language.types.array)

public [\_\_unserialize](#gmp.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

## Historial de cambios

       Versión
       Descripción






       8.4.0

        **GMP** ahora está marcado como final.





# GMP::\_\_construct

(PHP 8 &gt;= 8.2.4)

GMP::\_\_construct — Crea un número GMP

### Descripción

public **GMP::\_\_construct**([int](#language.types.integer)|[string](#language.types.string) $num = 0, [int](#language.types.integer) $base = 0)

Crea un número GMP, a partir de un integer o de un string.

### Parámetros

    num


      Un entero o un string. El string puede ser una representación decimal,
      hexadecimal, octal o binaria.




    base


      La base a utilizar para convertir una representación en forma de [string](#language.types.string).


      Una base explícita puede estar comprendida entre 2 y 62.
      Para las bases hasta 36, la casilla es ignorada:
      las letras mayúsculas y minúsculas tienen el mismo valor.
      Para las bases de 37 a 62,
      las letras mayúsculas representan los valores de 10 a
      35 y las letras minúsculas representan los valores de
      36 a 61.


      Si base vale 0, entonces la base real
      es determinada a partir de los caracteres iniciales de num.
      Si los dos primeros caracteres son 0x o 0X,
      el string es interpretado como un entero hexadecimal.
      Si los dos primeros caracteres son 0b o 0B,
      el string es interpretado como un entero binario.
      Si los dos primeros caracteres son 0o o 0O,
      el string es interpretado como un entero octal.
      Además, si el primer carácter es 0, el string
      es igualmente interpretado como un entero octal.
      En todos los demás casos, el string es interpretado como un entero decimal.


### Ver también

- [gmp_init()](#function.gmp-init) - Crea un número GMP

# GMP::\_\_serialize

(PHP 8 &gt;= 8.1.0)

GMP::\_\_serialize — Serializa el objeto GMP

### Descripción

public **GMP::\_\_serialize**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# GMP::\_\_unserialize

(PHP 8 &gt;= 8.1.0)

GMP::\_\_unserialize — Deserializa el argumento data en un objeto GMP

### Descripción

public **GMP::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      El valor en curso de deserialización.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [GMP::\_\_construct](#gmp.construct) — Crea un número GMP
- [GMP::\_\_serialize](#gmp.serialize) — Serializa el objeto GMP
- [GMP::\_\_unserialize](#gmp.unserialize) — Deserializa el argumento data en un objeto GMP

- [Introducción](#intro.gmp)
- [Instalación/Configuración](#gmp.setup)<li>[Requerimientos](#gmp.requirements)
- [Instalación](#gmp.installation)
  </li>- [Constantes predefinidas](#gmp.constants)
- [Ejemplos](#gmp.examples)
- [Funciones de GMP](#ref.gmp)<li>[gmp_abs](#function.gmp-abs) — Valor absoluto
- [gmp_add](#function.gmp-add) — Adición de 2 números GMP
- [gmp_and](#function.gmp-and) — AND a nivel de bit
- [gmp_binomial](#function.gmp-binomial) — Calcula el coeficiente binomial
- [gmp_clrbit](#function.gmp-clrbit) — Anula un byte
- [gmp_cmp](#function.gmp-cmp) — Compara los números
- [gmp_com](#function.gmp-com) — Calcula uno de los complementos
- [gmp_div](#function.gmp-div) — Alias de gmp_div_q
- [gmp_div_q](#function.gmp-div-q) — Divide los números
- [gmp_div_qr](#function.gmp-div-qr) — Divide los números y obtiene el cociente y resto
- [gmp_div_r](#function.gmp-div-r) — El resto de la división de los números
- [gmp_divexact](#function.gmp-divexact) — División exacta de números GMP
- [gmp_export](#function.gmp-export) — Exportación hacia un string binario
- [gmp_fact](#function.gmp-fact) — Factorielle GMP
- [gmp_gcd](#function.gmp-gcd) — Calcula el máximo común divisor
- [gmp_gcdext](#function.gmp-gcdext) — Calcula el máximo común divisor y multiplicadores
- [gmp_hamdist](#function.gmp-hamdist) — Distancia Hamming
- [gmp_import](#function.gmp-import) — Importación desde una cadena binaria
- [gmp_init](#function.gmp-init) — Crea un número GMP
- [gmp_intval](#function.gmp-intval) — Convertir un número GMP a entero
- [gmp_invert](#function.gmp-invert) — Inverso del modulo
- [gmp_jacobi](#function.gmp-jacobi) — Símbolo Jacobi
- [gmp_kronecker](#function.gmp-kronecker) — Símbolo Kronecker
- [gmp_lcm](#function.gmp-lcm) — Calcula el Mínimo Común Múltiplo (MCM)
- [gmp_legendre](#function.gmp-legendre) — Símbolo Legendre
- [gmp_mod](#function.gmp-mod) — Modulo de operación
- [gmp_mul](#function.gmp-mul) — Multiplicación de números
- [gmp_neg](#function.gmp-neg) — Número negativo
- [gmp_nextprime](#function.gmp-nextprime) — Encuentra el siguiente número primo
- [gmp_or](#function.gmp-or) — Nivel de bit OR
- [gmp_perfect_power](#function.gmp-perfect-power) — Verifica si un número es una potencia perfecta
- [gmp_perfect_square](#function.gmp-perfect-square) — Comprueba el cuadrado perfecto
- [gmp_popcount](#function.gmp-popcount) — Cuenta la población
- [gmp_pow](#function.gmp-pow) — Aumenta el número a la potencia
- [gmp_powm](#function.gmp-powm) — Eleva un número a la potencia con modulo
- [gmp_prob_prime](#function.gmp-prob-prime) — Revisa si el número es "probablemente primo"
- [gmp_random](#function.gmp-random) — Número GMP aleatorio
- [gmp_random_bits](#function.gmp-random-bits) — Genera un número aleatorio
- [gmp_random_range](#function.gmp-random-range) — Obtener un entero seleccionado uniformemente
- [gmp_random_seed](#function.gmp-random-seed) — Define la semilla RNG (Generador de Números Aleatorios)
- [gmp_root](#function.gmp-root) — Tomar la parte entera de una raíz enésima
- [gmp_rootrem](#function.gmp-rootrem) — Tomar la parte entera y el resto de una raíz enésima
- [gmp_scan0](#function.gmp-scan0) — Escanear para 0
- [gmp_scan1](#function.gmp-scan1) — Escanear para 1
- [gmp_setbit](#function.gmp-setbit) — Modifica un bit
- [gmp_sign](#function.gmp-sign) — Signo del número GMP
- [gmp_sqrt](#function.gmp-sqrt) — Calcula la raíz cuadrada
- [gmp_sqrtrem](#function.gmp-sqrtrem) — Raíz cuadrada con resto
- [gmp_strval](#function.gmp-strval) — Convierte un número GMP en string
- [gmp_sub](#function.gmp-sub) — Resta los números
- [gmp_testbit](#function.gmp-testbit) — Prueba si un bit está definido
- [gmp_xor](#function.gmp-xor) — Nivel de bit XOR
  </li>- [GMP](#class.gmp) — La clase GMP<li>[GMP::__construct](#gmp.construct) — Crea un número GMP
- [GMP::\_\_serialize](#gmp.serialize) — Serializa el objeto GMP
- [GMP::\_\_unserialize](#gmp.unserialize) — Deserializa el argumento data en un objeto GMP
  </li>
