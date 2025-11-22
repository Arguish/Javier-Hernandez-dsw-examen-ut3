# Funciones matemáticas

# Introducción

Estas funciones matemáticas son únicamente capaces de manipular valores
que se encuentran dentro del rango de los tipos [int](#language.types.integer) y [float](#language.types.float).
Para manipular números más grandes, véase las funciones
[precisión matemática arbitraria](#book.bc) o
[funciones de precisión múltiple de GNU](#book.gmp).

## Ver también

     -
      [operadores aritméticos](#language.operators.arithmetic)


     -
      [Funciones de precisión matemática arbitraria](#book.bc)


     -
      [Funciones de precisión múltiple de GNU](#book.gmp)


# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

**Constantes Matemáticas**

    **[M_PI](#constant.m-pi)**
    ([float](#language.types.float))



     Aproximación del número π (pi).
     (3.14159265358979323846).





    **[M_E](#constant.m-e)**
    ([float](#language.types.float))



     Aproximación del número de Euler e
     (2.7182818284590452354).





    **[M_LOG2E](#constant.m-log2e)**
    ([float](#language.types.float))



     Aproximación de log2(e)
     (1.4426950408889634074).





    **[M_LOG10E](#constant.m-log10e)**
    ([float](#language.types.float))



     Aproximación de log10(e)
     (0.43429448190325182765).





    **[M_LN2](#constant.m-ln2)**
    ([float](#language.types.float))



     Aproximación de ln(2)
     (0.69314718055994530942).





    **[M_LN10](#constant.m-ln10)**
    ([float](#language.types.float))



     Aproximación de ln(10)
     (2.30258509299404568402).





    **[M_PI_2](#constant.m-pi-2)**
    ([float](#language.types.float))



     Aproximación de π/2
     (1.57079632679489661923).





    **[M_PI_4](#constant.m-pi-4)**
    ([float](#language.types.float))



     Aproximación de π/4
     (0.78539816339744830962).





    **[M_1_PI](#constant.m-1-pi)**
    ([float](#language.types.float))



     Aproximación de 1/π
     (0.31830988618379067154).





    **[M_2_PI](#constant.m-2-pi)**
    ([float](#language.types.float))



     Aproximación de 2/π
     (0.63661977236758134308).





    **[M_SQRTPI](#constant.m-sqrtpi)**
    ([float](#language.types.float))



     Aproximación de sqrt(π)
     (1.77245385090551602729).





    **[M_2_SQRTPI](#constant.m-2-sqrtpi)**
    ([float](#language.types.float))



     Aproximación de 2/sqrt(π)
     (1.12837916709551257390).





    **[M_SQRT2](#constant.m-sqrt2)**
    ([float](#language.types.float))



     Aproximación de sqrt(2)
     (1.41421356237309504880).





    **[M_SQRT3](#constant.m-sqrt3)**
    ([float](#language.types.float))



     Aproximación de sqrt(3)
     (1.73205080756887729352).





    **[M_SQRT1_2](#constant.m-sqrt1-2)**
    ([float](#language.types.float))



     Aproximación de 1/sqrt(2)
     (0.70710678118654752440).





    **[M_LNPI](#constant.m-lnpi)**
    ([float](#language.types.float))



     Aproximación de ln(π)
     (1.14472988584940017414).





    **[M_EULER](#constant.m-euler)**
    ([float](#language.types.float))



     Aproximación de la constante de Euler γ
     (0.57721566490153286061).

**Constantes IEEE 754 de punto flotante**

    **[NAN](#constant.nan)**
    ([float](#language.types.float))



     No es un número





    **[INF](#constant.inf)**
    ([float](#language.types.float))



     Infinitud

**Constantes de redondeo**
**Nota**:

    A partir de PHP 8.4.0, se recomienda utilizar
    la enumeración RoundingMode en su lugar.






    **[PHP_ROUND_HALF_UP](#constant.php-round-half-up)**
    ([int](#language.types.integer))



     Redondear a la mitad hacia el infinito.





    **[PHP_ROUND_HALF_DOWN](#constant.php-round-half-down)**
    ([int](#language.types.integer))



     Redondear a la mitad hacia cero.





    **[PHP_ROUND_HALF_EVEN](#constant.php-round-half-even)**
    ([int](#language.types.integer))



     Redondear a la mitad al par.





    **[PHP_ROUND_HALF_ODD](#constant.php-round-half-odd)**
    ([int](#language.types.integer))



     Redondear a la mitad al impar.

# La enumeración RoundingMode

(PHP 8 &gt;= 8.4.0)

## Introducción

    La enumeración **RoundingMode** se utiliza para especificar cómo debe realizarse el redondeo
    para [round()](#function.round),
    [bcround()](#function.bcround) y [BCMath\Number::round()](#bcmath-number.round).

## Enum synopsis

    enum **RoundingMode**

{

         case  HalfAwayFromZero
     ; //
      Redondear al integer más cercano.
      Si la parte decimal es 5,
      redondea al integer con el valor absoluto más grande.





         case  HalfTowardsZero
     ; //
      Redondear al integer más cercano.
      Si la parte decimal es 5,
      redondea al integer con el valor absoluto más pequeño.





         case  HalfEven
     ; //
      Redondear al integer más cercano.
      Si la parte decimal es 5,
      redondea al integer par.





         case  HalfOdd
     ; //
      Redondear al integer más cercano.
      Si la parte decimal es 5,
      redondea al integer impar.





         case  TowardsZero
     ; //
      Redondear al integer más cercano con un valor absoluto más pequeño o igual.





         case  AwayFromZero
     ; //
      Redondear al integer más cercano con un valor absoluto más grande o igual.





         case  NegativeInfinity
     ; //
      Redondear al integer más grande más pequeño o igual.





         case  PositiveInfinity
     ; //
      Redondear al integer más pequeño más grande o igual.


}

# Funciones Matemáticas

# abs

(PHP 4, PHP 5, PHP 7, PHP 8)

abs — Valor absoluto

### Descripción

    **abs**([int](#language.types.integer)|[float](#language.types.float) $num): [int](#language.types.integer)|[float](#language.types.float)

Devuelve el valor absoluto del número num.

### Parámetros

     num


       El valor numérico a tratar





### Valores devueltos

El valor absoluto del número num. Si el número
es un [float](#language.types.float), entonces el tipo de retorno es también [float](#language.types.float),
de lo contrario es [int](#language.types.integer) (ya que [float](#language.types.float) generalmente tiene un intervalo de valores
más amplio que [int](#language.types.integer)).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       num ya no acepta objetos internos que soportan
       conversiones numéricas.



### Ejemplos

    **Ejemplo #1 Ejemplo con abs()**

&lt;?php
var_dump(abs(-4.2));
var_dump(abs(5));
var_dump(abs(-5));
?&gt;

    El ejemplo anterior mostrará:

float(4.2)
int(5)
int(5)

### Ver también

    - [gmp_abs()](#function.gmp-abs) - Valor absoluto

    - [gmp_sign()](#function.gmp-sign) - Signo del número GMP

# acos

(PHP 4, PHP 5, PHP 7, PHP 8)

acos — Arc coseno

### Descripción

**acos**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve el arc coseno de num.
**acos()** es la función inversa de
[cos()](#function.cos), lo que significa que
$num == cos(acos($num)) para cada valor de
num que se encuentra
en el dominio de la función **acos()**.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El arc coseno de num, en radianes.

### Ver también

    - [cos()](#function.cos) - Coseno

    - [acosh()](#function.acosh) - Arco coseno hiperbólico

    - [asin()](#function.asin) - Arc sinus

    - [atan()](#function.atan) - Arc tangente

# acosh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

acosh — Arco coseno hiperbólico

### Descripción

**acosh**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve el arco coseno hiperbólico de
num, es decir, el valor cuyo
coseno hiperbólico es num.

### Parámetros

     num


       El argumento a procesar





### Valores devueltos

El arco coseno hiperbólico de num

### Ver también

    - [cosh()](#function.cosh) - Coseno hiperbólico

    - [acos()](#function.acos) - Arc coseno

    - [asinh()](#function.asinh) - Arco seno hiperbólico

    - [atanh()](#function.atanh) - Arco tangente hiperbólica

# asin

(PHP 4, PHP 5, PHP 7, PHP 8)

asin — Arc sinus

### Descripción

**asin**([float](#language.types.float) $num): [float](#language.types.float)

Se devuelve el arc sinus de num
(num en radianes).
**asin()** es la función inversa de
[sin()](#function.sin), lo que significa que
$num == sin(asin($num)) para cada valor de
num que se encuentra
en el dominio de la función **asin()**.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El arc sinus de num, en radianes.

### Ver también

    - [sin()](#function.sin) - Seno

    - [asinh()](#function.asinh) - Arco seno hiperbólico

    - [acos()](#function.acos) - Arc coseno

    - [atan()](#function.atan) - Arc tangente

# asinh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

asinh — Arco seno hiperbólico

### Descripción

**asinh**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve el arco seno hiperbólico de
num, es decir, el valor cuyo
seno hiperbólico es num.

### Parámetros

     num


       El argumento a procesar





### Valores devueltos

El arco seno hiperbólico de num

### Ver también

    - [sinh()](#function.sinh) - Seno hiperbólico

    - [asin()](#function.asin) - Arc sinus

    - [acosh()](#function.acosh) - Arco coseno hiperbólico

    - [atanh()](#function.atanh) - Arco tangente hiperbólica

# atan

(PHP 4, PHP 5, PHP 7, PHP 8)

atan — Arc tangente

### Descripción

**atan**([float](#language.types.float) $num): [float](#language.types.float)

Se devuelve el arcotangente de num, en radianes.
**atan()** es la función inversa de
[tan()](#function.tan), lo que significa que
$num == tan(atan($num)) para cada valor de
num que se encuentra
en el dominio de la función **atan()**.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El arcotangente de num, en radianes.

### Ver también

    - [tan()](#function.tan) - Tangente

    - [atanh()](#function.atanh) - Arco tangente hiperbólica

    - [asin()](#function.asin) - Arc sinus

    - [acos()](#function.acos) - Arc coseno

# atan2

(PHP 4, PHP 5, PHP 7, PHP 8)

atan2 — Arco tangente de dos variables

### Descripción

**atan2**([float](#language.types.float) $y, [float](#language.types.float) $x): [float](#language.types.float)

Esta función calcula el arco tangente de las dos variables
x y y. Es similar a
calcular el arco tangente de y /
x, excepto que los signos de ambos argumentos son
usados para determinar el cuadrante del resultado.

La función devuelve el resultado en radianes, que se encuentra entre -PI
y PI (inclusive).

### Parámetros

     y


       Parámetro dividendo






     x


       Parámetro divisor





### Valores devueltos

El arco tangente de y/x en
radianes.

### Ver también

    - [atan()](#function.atan) - Arc tangente

# atanh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

atanh — Arco tangente hiperbólica

### Descripción

**atanh**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve el arco tangente hiperbólico de
num, es decir, el valor cuya
tangente hiperbólica es num.

### Parámetros

     num


       El argumento a procesar





### Valores devueltos

El arco tangente hiperbólico de num

### Ver también

    - [tanh()](#function.tanh) - Tangente hiperbólica

    - [atan()](#function.atan) - Arc tangente

    - [asinh()](#function.asinh) - Arco seno hiperbólico

    - [acosh()](#function.acosh) - Arco coseno hiperbólico

# base_convert

(PHP 4, PHP 5, PHP 7, PHP 8)

base_convert — Convierte un número entre bases arbitrarias

### Descripción

**base_convert**([string](#language.types.string) $num, [int](#language.types.integer) $from_base, [int](#language.types.integer) $to_base): [string](#language.types.string)

Devuelve un string que contiene el argumento num
representado en la base to_base. La base de
representación de number es dada por
from_base. from_base y
to_base deben estar comprendidos entre 2 y 36 inclusive.
Los dígitos superiores a 10 de las bases superiores a 10 serán representados
por las letras de A a Z, con A = 10 y Z = 35.
El caso de las letras no tiene importancia, es decir
num es interpretado de forma insensible al caso.

**Advertencia**

    **base_convert()** perderá la precisión sobre los grandes números,
    debido a las propiedades internas del tipo [float](#language.types.float) utilizado.
    Leer la sección sobre los
    [números decimales](#language.types.float) de
    este manual para más información.

### Parámetros

     num


       El número a convertir.
       Cualquier carácter inválido en num es
       ignorado silenciosamente.
       A partir de PHP 7.4.0 proporcionar caracteres inválidos es obsoleto.






     from_base


       La base num en la que está






     to_base


       La base en la que se debe convertir el número
       num





### Valores devueltos

El número num convertido en la base to_base

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Pasar caracteres inválidos generará ahora una advertencia obsoleta.
       El resultado siempre será calculado como si los caracteres inválidos
       no existieran.



### Ejemplos

    **Ejemplo #1 Ejemplo con base_convert()**

&lt;?php
$hexadecimal = 'a37334';
echo base_convert($hexadecimal, 16, 2);
?&gt;

    El ejemplo anterior mostrará:

101000110111001100110100

### Ver también

    - [intval()](#function.intval) - Devuelve el valor entero equivalente de una variable

# bindec

(PHP 4, PHP 5, PHP 7, PHP 8)

bindec — Convierte de binario a decimal

### Descripción

    **bindec**([string](#language.types.string) $binary_string): [int](#language.types.integer)|[float](#language.types.float)

Devuelve la conversión de un número binario representado por la cadena
binary_string a decimal.

**bindec()** convierte un número binario en un [int](#language.types.integer),
o, si es necesario por razones de tamaño, en un [float](#language.types.float).

**bindec()** interpreta todos los valores
binary_string como enteros no firmados.
Esto se debe a que la función **bindec()** ve
el primer bit como otro orden de magnitud en lugar de como el
bit de signo.

### Parámetros

     binary_string


       La cadena binaria a convertir.
       Cualquier carácter inválido en binary_string
       es ignorado silenciosamente.
       A partir de PHP 7.4.0, proporcionar caracteres inválidos está deprecado.





**Advertencia**

    Este parámetro debe ser un [string](#language.types.string).
    El uso de otro tipo de datos produce resultados inesperados.

### Valores devueltos

El valor decimal de binary_string

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Proporcionar caracteres inválidos generará ahora una advertencia deprecada.
       El resultado se calculará siempre como si los caracteres inválidos
       no existieran.



### Ejemplos

    **Ejemplo #1 Ejemplo con bindec()**

&lt;?php
echo bindec('110011') . "\n";
echo bindec('000110011') . "\n";

echo bindec('111');
?&gt;

    El ejemplo anterior mostrará:

51
51
7

    **Ejemplo #2 bindec()** interpreta la entrada
     como un entero no firmado

&lt;?php
/\*

- Lo más importante en este ejemplo está en la salida
- más que en el código PHP en sí.
  \*/

$magnitude_lower = pow(2, (PHP_INT_SIZE * 8) - 2);
p($magnitude_lower - 1);
p($magnitude_lower, '¿Ha visto el cambio? Esté atento la próxima vez...');

p(PHP_INT_MAX, 'PHP_INT_MAX');
p(~PHP_INT_MAX, 'interpretado como superior a PHP_INT_MAX');

if (PHP_INT_SIZE == 4) {
$note = 'interpretado como el mayor entero no firmado';
} else {
$note = 'interpretado como el mayor entero no firmado
(18446744073709551615) pero distorsionado por la precisión de los flotantes';
}
p(-1, $note);

function p($input, $note = '') {
echo "entrada : $input\n";

    $format = '%0' . (PHP_INT_SIZE * 8) . 'b';
    $bin = sprintf($format, $input);
    echo "binario :       $bin\n";

    ini_set('precision', 20);  // Para mayor legibilidad en PC de 64 bits.
    $dec = bindec($bin);
    echo 'bindec() :     ' . $dec . "\n";

    if ($note) {
        echo "Nota :         $note\n";
    }

    echo "\n";

}
?&gt;

    Resultado del ejemplo anterior en una máquina de 32 bits:

entrada : 1073741823
binario : 00111111111111111111111111111111
bindec() : 1073741823

entrada : 1073741824
binario : 01000000000000000000000000000000
bindec(): 1073741824
Nota : ¿Ha visto el cambio? Esté atento la próxima vez...

entrada : 2147483647
binario : 01111111111111111111111111111111
bindec(): 2147483647
Nota : PHP_INT_MAX

entrada : -2147483648
binario : 10000000000000000000000000000000
bindec(): 2147483648
Nota : interpretado como superior a PHP_INT_MAX

entrada : -1
binario : 11111111111111111111111111111111
bindec(): 4294967295
Nota : interpretado como el mayor entero no firmado

    Resultado del ejemplo anterior en una máquina de 64 bits:

entrada : 4611686018427387903
binario : 0011111111111111111111111111111111111111111111111111111111111111
bindec() : 4611686018427387903

entrada : 4611686018427387904
binario : 0100000000000000000000000000000000000000000000000000000000000000
bindec() : 4611686018427387904
Nota : ¿Ha visto el cambio? Esté atento la próxima vez...

entrada : 9223372036854775807
binario : 0111111111111111111111111111111111111111111111111111111111111111
bindec() : 9223372036854775807
Nota : PHP_INT_MAX

entrada : -9223372036854775808
binario : 1000000000000000000000000000000000000000000000000000000000000000
bindec() : 9223372036854775808
Nota : interpretado como superior a PHP_INT_MAX

entrada : -1
binario : 1111111111111111111111111111111111111111111111111111111111111111
bindec() : 18446744073709551616
Nota : interpretado como el mayor entero no firmado
(18446744073709551615) pero distorsionado por la precisión de los flotantes

### Notas

**Nota**:

    La función puede convertir números que son demasiado grandes para
    caber en un tipo [int](#language.types.integer), en cuyo caso estos valores se devuelven
    como [float](#language.types.float).

### Ver también

    - [decbin()](#function.decbin) - Convierte de decimal a binario

    - [octdec()](#function.octdec) - Conversión de octal a decimal

    - [hexdec()](#function.hexdec) - Convierte de hexadecimal a decimal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

# ceil

(PHP 4, PHP 5, PHP 7, PHP 8)

ceil — Redondea al número superior

### Descripción

**ceil**([int](#language.types.integer)|[float](#language.types.float) $num): [float](#language.types.float)

Devuelve el entero superior del número num.

### Parámetros

     num


       El valor a redondear





### Valores devueltos

El valor num redondeado al entero superior.
El valor devuelto es un número de punto flotante
([float](#language.types.float)), ya que el intervalo de valores de un [float](#language.types.float) es generalmente
más amplio que el de un [int](#language.types.integer).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       num ya no acepta objetos internos que soportan
       las conversiones numéricas.



### Ejemplos

    **Ejemplo #1 Ejemplo con ceil()**

&lt;?php
echo ceil(4.3), PHP_EOL; // 5
echo ceil(9.999), PHP_EOL; // 10
echo ceil(-3.14), PHP_EOL; // -3
?&gt;

### Ver también

    - [floor()](#function.floor) - Redondea hacia el entero inferior

    - [round()](#function.round) - Redondea un número de punto flotante

# cos

(PHP 4, PHP 5, PHP 7, PHP 8)

cos — Coseno

### Descripción

**cos**([float](#language.types.float) $num): [float](#language.types.float)

**cos()** devuelve el coseno de num
(num en radianes).

### Parámetros

     num


       El ángulo, en radianes





### Valores devueltos

El coseno de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con cos()**

&lt;?php

echo cos(M_PI); // -1

?&gt;

### Ver también

    - [acos()](#function.acos) - Arc coseno

    - [sin()](#function.sin) - Seno

    - [tan()](#function.tan) - Tangente

    - [deg2rad()](#function.deg2rad) - Convierte un número de grados en radianes

# cosh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

cosh — Coseno hiperbólico

### Descripción

**cosh**([float](#language.types.float) $num): [float](#language.types.float)

Se devuelve el coseno hiperbólico de num,
definido como (exp($num) + exp(-$num))/2.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El coseno hiperbólico de num.

### Ver también

    - [cos()](#function.cos) - Coseno

    - [acosh()](#function.acosh) - Arco coseno hiperbólico

    - [sinh()](#function.sinh) - Seno hiperbólico

    - [tanh()](#function.tanh) - Tangente hiperbólica

# decbin

(PHP 4, PHP 5, PHP 7, PHP 8)

decbin — Convierte de decimal a binario

### Descripción

**decbin**([int](#language.types.integer) $num): [string](#language.types.string)

Devuelve un string que contiene la representación binaria del
entero num proporcionado como argumento.

### Parámetros

     num


       Valor decimal a convertir





       <caption>**Intervalo de entrada en máquinas de 32-bit**</caption>

        <col>
        <col>
        <col>


          Parámetro num positivo
          Parámetro num negativo
          Valor devuelto






          0
           
          0



          1
           
          1



          2
           
          10



          ... progresión normal ...



          2147483646
           
          1111111111111111111111111111110



          2147483647 (mayor entero firmado)
           
          1111111111111111111111111111111 (31 unos)



          2147483648
          -2147483648
          10000000000000000000000000000000



          ... progresión normal ...



          4294967294
          -2
          11111111111111111111111111111110



          4294967295 (mayor entero no firmado)
          -1
          11111111111111111111111111111111 (32 unos)








       <caption>**Intervalo de entrada en máquinas de 64-bit**</caption>

        <col>
        <col>
        <col>


          Parámetro num positivo
          Parámetro num negativo
          Valor devuelto






          0
           
          0



          1
           
          1



          2
           
          10



          ... progresión normal ...



          9223372036854775806
           
          111111111111111111111111111111111111111111111111111111111111110



          9223372036854775807 (mayor entero firmado)
           
          111111111111111111111111111111111111111111111111111111111111111 (63 unos)



           
          -9223372036854775808
          1000000000000000000000000000000000000000000000000000000000000000



          ... progresión normal ...



           
          -2
          1111111111111111111111111111111111111111111111111111111111111110



           
          -1
          1111111111111111111111111111111111111111111111111111111111111111 (64 unos)








### Valores devueltos

Una representación binaria de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con decbin()**

&lt;?php
echo decbin(12) . "\n";
echo decbin(26);
?&gt;

    El ejemplo anterior mostrará:

1100
11010

### Ver también

    - [bindec()](#function.bindec) - Convierte de binario a decimal

    - [decoct()](#function.decoct) - Convierte de decimal a octal

    - [dechex()](#function.dechex) - Convierte de decimal a hexadecimal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

    -
     [printf()](#function.printf) - Muestra una string formateada, utilizando %b,
     %032b o %064b como formato


    -
     [sprintf()](#function.sprintf) - Devuelve una string formateada, utilizando %b,
     %032b o %064b como formato

# dechex

(PHP 4, PHP 5, PHP 7, PHP 8)

dechex — Convierte de decimal a hexadecimal

### Descripción

**dechex**([int](#language.types.integer) $num): [string](#language.types.string)

Retorna un string que contiene la representación hexadecimal del argumento
num sin signo.

El número más grande que puede ser convertido es
**[PHP_INT_MAX](#constant.php-int-max)** \* 2 + 1 (o
-1) : en plataformas de 32-bit, será
4294967295 en decimal, lo que hará que la función
**dechex()** retorne ffffffff.

### Parámetros

     num


       El valor decimal a convertir.




       Dado que el tipo [int](#language.types.integer) de PHP es firmado, pero que la función
       **dechex()** solo funciona con enteros sin signo, los enteros negativos serán tratados como si fueran sin signo.





### Valores devueltos

Una representación hexadecimal de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con dechex()**

&lt;?php
echo dechex(10) . "\n";
echo dechex(47);
?&gt;

    El ejemplo anterior mostrará:

a
2f

    **Ejemplo #2 Ejemplo con la función dechex()**
     con enteros grandes

&lt;?php
// La salida a continuación asume que estamos en una plataforma de 32-bit.
// Note que la salida es idéntica para todos los valores.
echo dechex(-1)."\n";
echo dechex(PHP_INT_MAX \* 2 + 1)."\n";
echo dechex(pow(2, 32) - 1)."\n";
?&gt;

    El ejemplo anterior mostrará:

ffffffff
ffffffff
ffffffff

### Ver también

    - [hexdec()](#function.hexdec) - Convierte de hexadecimal a decimal

    - [decbin()](#function.decbin) - Convierte de decimal a binario

    - [decoct()](#function.decoct) - Convierte de decimal a octal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

# decoct

(PHP 4, PHP 5, PHP 7, PHP 8)

decoct — Convierte de decimal a octal

### Descripción

**decoct**([int](#language.types.integer) $num): [string](#language.types.string)

Devuelve una cadena que contiene la representación octal del número dado
num. El número más grande que puede ser convertido es
4294967295 en decimal, lo que dará 37777777777. Para las plataformas de 64 bits, se trata
generalmente de 9223372036854775807 en decimal resultando
en 777777777777777777777.

### Parámetros

     num


       Valor decimal a convertir





### Valores devueltos

Una representación octal de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con decoct()**

&lt;?php
echo decoct(15) . "\n";
echo decoct(264);
?&gt;

    El ejemplo anterior mostrará:

17
410

### Ver también

    - [octdec()](#function.octdec) - Conversión de octal a decimal

    - [decbin()](#function.decbin) - Convierte de decimal a binario

    - [dechex()](#function.dechex) - Convierte de decimal a hexadecimal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

# deg2rad

(PHP 4, PHP 5, PHP 7, PHP 8)

deg2rad — Convierte un número de grados en radianes

### Descripción

**deg2rad**([float](#language.types.float) $num): [float](#language.types.float)

**deg2rad()** convierte num de
grados a radianes.

### Parámetros

     num


       El ángulo, en grados





### Valores devueltos

El equivalente, en radianes, de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con deg2rad()**

&lt;?php

echo deg2rad(45), PHP_EOL; // 0.785398163397
var_dump(deg2rad(45) === M_PI_4); // bool(true)

?&gt;

### Ver también

    - [rad2deg()](#function.rad2deg) - Conversión de radianes a grados

# exp

(PHP 4, PHP 5, PHP 7, PHP 8)

exp — Calcula la exponencial de **[e](#constant.e)**

### Descripción

**exp**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve **[e](#constant.e)**, elevado a la potencia num.

**Nota**:

    '**[e](#constant.e)**' es el logaritmo natural, o aproximadamente 2.718282.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

'e', elevado a la potencia num.

### Ejemplos

    **Ejemplo #1 Ejemplo con exp()**

&lt;?php
echo exp(12), PHP_EOL;
echo exp(5.7);
?&gt;

    El ejemplo anterior mostrará:

162754.791419
298.86740096706

### Ver también

    - [log()](#function.log) - Logaritmo natural (neperiano)

    - [pow()](#function.pow) - Expresión exponencial

# expm1

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

expm1 —
Devuelve exp($num) - 1, calculado de manera precisa incluso
cuando el valor del número es cercano a cero

### Descripción

**expm1**([float](#language.types.float) $num): [float](#language.types.float)

**expm1()** devuelve el equivalente de
exp($num) - 1 calculado de tal manera que
   será preciso, incluso si el valor del argumento num
   es cercano a 0, un caso donde la expresión exp($num) - 1
no es precisa, debido a la sustracción de dos números casi iguales.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

e elevado a la potencia num, menos uno.

### Ver también

    - [log1p()](#function.log1p) - Calcula con precisión log(1 + número)

    - [exp()](#function.exp) - Calcula la exponencial de e

# fdiv

(PHP 8)

fdiv — Divide dos números, según la norma IEEE 754

### Descripción

**fdiv**([float](#language.types.float) $num1, [float](#language.types.float) $num2): [float](#language.types.float)

Devuelve el resultado en coma flotante de la división de
num1 por num2.
Si num2 es cero, entonces uno de los valores **[INF](#constant.inf)**, -**[INF](#constant.inf)**, o **[NAN](#constant.nan)** será devuelto.

Cabe señalar que en las comparaciones, **[NAN](#constant.nan)** nunca será igual (==) o idéntico (===) a
ningún valor, incluyendo a sí mismo.

### Parámetros

     num1


       El dividendo (numerador)






     num2


       El divisor





### Valores devueltos

El resultado en coma flotante de
num1/num2

### Ejemplos

    **Ejemplo #1 Uso de fdiv()**

&lt;?php
var_dump(fdiv(5.7, 1.3)); // float(4.384615384615385)
var_dump(fdiv(4, 2)); // float(2)
var_dump(fdiv(1.0, 0.0)); // float(INF)
var_dump(fdiv(-1.0, 0.0)); // float(-INF)
var_dump(fdiv(0.0, 0.0)); // float(NAN)
?&gt;

### Ver también

    -
     Operador de división
     [/](#language.operators.arithmetic)


    - [fmod()](#function.fmod) - Devuelve el resto de la división

    - [fpow()](#function.fpow) - Eleva un número a la potencia de otro, según la norma IEEE 754

# floor

(PHP 4, PHP 5, PHP 7, PHP 8)

floor — Redondea hacia el entero inferior

### Descripción

**floor**([int](#language.types.integer)|[float](#language.types.float) $num): [float](#language.types.float)

Devuelve el valor entero siguiente más bajo (como float) al
redondear el valor num si es necesario.

### Parámetros

     num


       El valor numérico a redondear





### Valores devueltos

**floor()** devuelve el entero inferior
del número num.
El valor devuelto es un número de punto flotante
([float](#language.types.float)).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       num ya no acepta objetos internos que soportan
       conversiones numéricas.



### Ejemplos

    **Ejemplo #1 Ejemplo con floor()**

&lt;?php
echo floor(4.3), PHP_EOL; // 4
echo floor(9.999), PHP_EOL; // 9
echo floor(-3.14), PHP_EOL; // -4
?&gt;

### Ver también

    - [ceil()](#function.ceil) - Redondea al número superior

    - [round()](#function.round) - Redondea un número de punto flotante

# fmod

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

fmod — Devuelve el resto de la división

### Descripción

**fmod**([float](#language.types.float) $num1, [float](#language.types.float) $num2): [float](#language.types.float)

Devuelve el resto de la división de num1
por num2. Este resto es un número de punto flotante. El resto (r) se define por: num1 = i \* num2 + r,
para un entero i. Si num2 no es nulo,
r tiene el mismo signo que num1
y un valor absoluto menor que num2.

### Parámetros

     num1


       El dividendo






     num2


       El divisor





### Valores devueltos

El resto de la división de num1
por num2.

### Ejemplos

    **Ejemplo #1 Ejemplo con fmod()**

&lt;?php
$x = 5.7;
$y = 1.3;
$r = fmod($x, $y);
// $r vale 0.5, porque 4 \* 1.3 + 0.5 = 5.7

var_dump($x, $y, $r);
?&gt;

### Ver también

    - [/](#language.operators.arithmetic) - División de punto flotante

    - [%](#language.operators.arithmetic) - Módulo de enteros

    - [intdiv()](#function.intdiv) - División de Enteros - División de enteros

# fpow

(PHP 8 &gt;= 8.4.0)

fpow — Eleva un número a la potencia de otro, según la norma IEEE 754

### Descripción

**fpow**([float](#language.types.float) $num, [float](#language.types.float) $exponent): [float](#language.types.float)

Devuelve el resultado en coma flotante de la elevación de
num a la potencia exponent.
Si num es cero y exponent
es menor que cero, entonces **[INF](#constant.inf)** es devuelto.

### Parámetros

    num


      La base a utilizar.




    exponent


      El exponente.


### Valores devueltos

Devuelve un [float](#language.types.float) correspondiente a
$num$exponent.

### Ejemplos

**Ejemplo #1 Ejemplo de fpow()**

&lt;?php
var_dump(fpow(10, 2));
var_dump(fpow(0, -3));
var_dump(fpow(-1, 5.5));
?&gt;

El ejemplo anterior mostrará:

float(100)
float(INF)
float(NAN)

### Ver también

- El operador de exponenciación
  [\*\*](#language.operators.arithmetic)

- [pow()](#function.pow) - Expresión exponencial

- [fdiv()](#function.fdiv) - Divide dos números, según la norma IEEE 754

- [fmod()](#function.fmod) - Devuelve el resto de la división

# hexdec

(PHP 4, PHP 5, PHP 7, PHP 8)

hexdec — Convierte de hexadecimal a decimal

### Descripción

    **hexdec**([string](#language.types.string) $hex_string): [int](#language.types.integer)|[float](#language.types.float)

Devuelve el valor decimal equivalente a la [string](#language.types.string) hexadecimal representada
por el argumento hex_string.
**hexdec()** convierte una [string](#language.types.string) hexadecimal en un
número decimal.

**hexdec()** ignorará cualquier carácter no hexadecimal
que encuentre.
A partir de PHP 7.4.0, proporcionar caracteres inválidos está deprecado.

### Parámetros

     hex_string


       La cadena hexadecimal a convertir





### Valores devueltos

La representación decimal de hex_string

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Pasar caracteres inválidos generará ahora una advertencia deprecada.
       El resultado siempre será calculado como si los caracteres inválidos
       no existieran.



### Ejemplos

    **Ejemplo #1 Ejemplo con hexdec()**

&lt;?php

var_dump(hexdec("ee")); // muestra "int(238)"
var_dump(hexdec("a0")); // muestra "int(160)"
?&gt;

        **Ejemplo #2 hexdec()** con caracteres inválidos




&lt;?php
var_dump(hexdec("See")); // muestra "int(238)"
var_dump(hexdec("that")); // muestra "int(10)"
?&gt;

### Notas

**Nota**:

    La función puede convertir números que son demasiado grandes para
    caber en un tipo [int](#language.types.integer), en cuyo caso estos valores son devueltos
    como [float](#language.types.float).

### Ver también

    - [dechex()](#function.dechex) - Convierte de decimal a hexadecimal

    - [bindec()](#function.bindec) - Convierte de binario a decimal

    - [octdec()](#function.octdec) - Conversión de octal a decimal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

# hypot

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

hypot — Calcula la longitud de la hipotenusa de un triángulo rectángulo

### Descripción

**hypot**([float](#language.types.float) $x, [float](#language.types.float) $y): [float](#language.types.float)

**hypot()** devuelve la longitud de la hipotenusa
de un triángulo rectángulo que tiene lados de longitud x y
y o bien la distancia del punto
(x, y)
desde el origen. Esto es equivalente a sqrt($x*$x + $y*$y).

### Parámetros

     x


       Longitud del primer lado






     y


       Longitud del segundo lado





### Valores devueltos

La longitud calculada de la hipotenusa

# intdiv

(PHP 7, PHP 8)

intdiv — División de Enteros

### Descripción

**intdiv**([int](#language.types.integer) $num1, [int](#language.types.integer) $num2): [int](#language.types.integer)

Devuelve el cociente entero de la división de num1 por num2.

### Parámetros

    num1


      Número a dividir.






    num2


      Número que divide num1.


### Valores devueltos

El cociente entero de la división de num1 por num2.

### Errores/Excepciones

    Si num2 es 0, se emitirá una excepción [DivisionByZeroError](#class.divisionbyzeroerror).
    Si num1 es **[PHP_INT_MIN](#constant.php-int-min)** y num2 es -1,
    en este caso se emite una excepción [ArithmeticError](#class.arithmeticerror).

### Ejemplos

    **Ejemplo #1 Ejemplo de intdiv()**

&lt;?php
var_dump(intdiv(3, 2));
var_dump(intdiv(-3, 2));
var_dump(intdiv(3, -2));
var_dump(intdiv(-3, -2));
var_dump(intdiv(PHP_INT_MAX, PHP_INT_MAX));
var_dump(intdiv(PHP_INT_MIN, PHP_INT_MIN));
?&gt;

    El ejemplo anterior mostrará:

int(1)
int(-1)
int(-1)
int(1)
int(1)
int(1)

**Ejemplo #2 Ejemplo de intdiv()** con un divisor inválido

&lt;?php
try {
intdiv(PHP_INT_MIN, -1);
} catch (Error $e) {
    echo get_class($e), ': ', $e-&gt;getMessage(), PHP_EOL;
}

try {
intdiv(1, 0);
} catch (Error $e) {
    echo get_class($e), ': ', $e-&gt;getMessage(), PHP_EOL;
}
?&gt;

El ejemplo anterior mostrará:

ArithmeticError: Division of PHP_INT_MIN by -1 is not an integer
DivisionByZeroError: Division by zero

### Ver también

    - [/](#language.operators.arithmetic) - División de número flotante

    - [%](#language.operators.arithmetic) - Módulo entero

    - [fmod()](#function.fmod) - Devuelve el resto de la división - Módulo de número flotante

# is_finite

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

is_finite — Verifica si un número flotante es finito

### Descripción

**is_finite**([float](#language.types.float) $num): [bool](#language.types.boolean)

Retorna si el num dado es un número flotante finito.

Un número flotante finito no es ni **[NAN](#constant.nan)** ([is_nan()](#function.is-nan)),
ni infinito ([is_infinite()](#function.is-infinite)).

### Parámetros

     num


       El [float](#language.types.float) a verificar





### Valores devueltos

**[true](#constant.true)** si num no es ninguno de **[NAN](#constant.nan)**,
**[INF](#constant.inf)**, -**[INF](#constant.inf)**, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de is_finite()**

&lt;?php
$float = 1.2345;
var_dump($float, is_finite($float));

$nan = sqrt(-1);
var_dump($nan, is_finite($nan));

$inf = 1e308 * 2;
var_dump($inf, is_finite($inf));
?&gt;

    El ejemplo anterior mostrará:

float(1.2345)
bool(true)
float(NAN)
bool(false)
float(INF)
bool(false)

### Ver también

    - [is_infinite()](#function.is-infinite) - Verifica si un número de tipo float es infinito

    - [is_nan()](#function.is-nan) - Verifica si un número flotante es NAN

# is_infinite

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

is_infinite — Verifica si un número de tipo float es infinito

### Descripción

**is_infinite**([float](#language.types.float) $num): [bool](#language.types.boolean)

Indica si el num proporcionado es **[INF](#constant.inf)**
o -**[INF](#constant.inf)**.

### Parámetros

     num


       El [float](#language.types.float) a verificar





### Valores devueltos

Indica si el num proporcionado es **[INF](#constant.inf)**
o -**[INF](#constant.inf)**, en caso contrario, **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de is_infinite()**

&lt;?php
$inf = 1e308 \* 2;

var_dump($inf, is_infinite($inf));

$negative_inf = -$inf;

var_dump($negative_inf, is_infinite($negative_inf));
?&gt;

    El ejemplo anterior mostrará:

float(INF)
bool(true)
float(-INF)
bool(true)

### Ver también

    - [is_finite()](#function.is-finite) - Verifica si un número flotante es finito

    - [is_nan()](#function.is-nan) - Verifica si un número flotante es NAN

# is_nan

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

is_nan — Verifica si un número flotante es NAN

### Descripción

**is_nan**([float](#language.types.float) $num): [bool](#language.types.boolean)

Devuelve si el num dado es **[NAN](#constant.nan)** (Not A Number).

**[NAN](#constant.nan)** es devuelto por las operaciones matemáticas que no están definidas,
por ejemplo al pasar argumentos fuera del dominio de entrada de la función.
La raíz cuadrada ([sqrt()](#function.sqrt)) solo está definida para números positivos,
el paso de un número negativo resultará en un **[NAN](#constant.nan)**.
Otros ejemplos de operaciones que devuelven **[NAN](#constant.nan)** son la división de
**[INF](#constant.inf)** por **[INF](#constant.inf)** y cualquier operación que involucre
un valor **[NAN](#constant.nan)** existente.

**Nota**:

    A pesar de su nombre Not A Number, **[NAN](#constant.nan)** es un valor válido de tipo [float](#language.types.float).

**Precaución**

    **[NAN](#constant.nan)** no se compara igual a **[NAN](#constant.nan)**.
    Para verificar si un número flotante es **[NAN](#constant.nan)**,
    **is_nan()** debe ser utilizado. La verificación de
    $float === NAN no funcionará.

### Parámetros

     num


       El [float](#language.types.float) a verificar





### Valores devueltos

**[true](#constant.true)** si num es **[NAN](#constant.nan)**, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_nan()**

&lt;?php
$nan = sqrt(-1);

var_dump($nan, is_nan($nan));
?&gt;

    El ejemplo anterior mostrará:

float(NAN)
bool(true)

### Ver también

    - [is_finite()](#function.is-finite) - Verifica si un número flotante es finito

    - [is_infinite()](#function.is-infinite) - Verifica si un número de tipo float es infinito

# log

(PHP 4, PHP 5, PHP 7, PHP 8)

log — Logaritmo natural (neperiano)

### Descripción

**log**([float](#language.types.float) $num, [float](#language.types.float) $base = **[M_E](#constant.m-e)**): [float](#language.types.float)

Si el argumento opcional base es
especificado, **log()** devuelve entonces el
logaritmo en base base, de lo contrario
**log()** devuelve el logaritmo natural
(o neperiano) de num.

### Parámetros

     num


       El valor para el cual se calcula el logaritmo






     base


       La base logarítmica opcional a utilizar
       (por omisión, 'e' y por lo tanto, el logaritmo natural).





### Valores devueltos

El logaritmo de num en base
base, si se proporciona, o el logaritmo
natural.

### Ver también

    - [log10()](#function.log10) - Logaritmo en base 10

    - [exp()](#function.exp) - Calcula la exponencial de e

    - [pow()](#function.pow) - Expresión exponencial

    - [error_log()](#function.error-log) - Envía un mensaje de error al gestor de errores definido

# log10

(PHP 4, PHP 5, PHP 7, PHP 8)

log10 — Logaritmo en base 10

### Descripción

**log10**([float](#language.types.float) $num): [float](#language.types.float)

Se devuelve el logaritmo en base 10 de num.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El logaritmo en base 10 de num.

### Ver también

    - [log()](#function.log) - Logaritmo natural (neperiano)

# log1p

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

log1p —
Calcula con precisión log(1 + número)

### Descripción

**log1p**([float](#language.types.float) $num): [float](#language.types.float)

**log1p()** devuelve log(1 +
num) calculado de tal manera que será preciso
incluso si el valor de num está próximo a 0.
[log()](#function.log) solo puede devolver log(1) en este caso por falta
de precisión.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

log(1 + num)

### Ver también

    - [expm1()](#function.expm1) - Devuelve exp($num) - 1, calculado de manera precisa incluso

cuando el valor del número es cercano a cero

    - [log()](#function.log) - Logaritmo natural (neperiano)

    - [log10()](#function.log10) - Logaritmo en base 10

# max

(PHP 4, PHP 5, PHP 7, PHP 8)

max — El valor más grande

### Descripción

**max**([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [mixed](#language.types.mixed)

Firma alternativa (no soportada con argumentos nombrados):

**max**([array](#language.types.array) $value_array): [mixed](#language.types.mixed)

Si el primer y único parámetro es un array, **max()**
devuelve el valor más alto del array. Si se proporcionan al menos dos parámetros,
**max()** devuelve el más grande de estos valores.

**Nota**:

    Los valores de diferentes tipos serán comparados utilizando
    las [reglas de
    comparación estándar](#language.operators.comparison). Actualmente, un string no numérico
    será comparado con un [int](#language.types.integer) como si fuera el valor
    0, pero varios [string](#language.types.string) no numéricos serán comparados de forma
    alfanumérica. El valor actual devuelto será del mismo tipo que el original y no se aplicará ninguna conversión de tipo.

**Precaución**

    Tenga cuidado al pasar argumentos con tipos diferentes,
    ya que **max()** puede producir resultados impredecibles.

### Parámetros

     value


       Cualquier valor [comparable](#language.operators.comparison).






     values


       Cualquier valor [comparable](#language.operators.comparison).






     value_array


       Un array que contiene los valores.





### Valores devueltos

La función **max()** devuelve el valor del parámetro
considerado como "superior" según la comparación estándar.
Si varias valores de tipos diferentes son evaluados como iguales
(i.e. 0 y 'abc'), el primero proporcionado
a la función será devuelto.

### Errores/Excepciones

Si se pasa un array vacío, la función **max()** lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **max()** ahora lanza una [ValueError](#class.valueerror) en caso de fallo;
       previamente, **[false](#constant.false)** era devuelto y se emitía un error **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Como las [
       comparaciones entre strings y números](#migration80.incompatible.core.string-number-comparision) han sido cambiadas,
       **max()** ya no devuelve un valor diferente
       basado en el orden de los argumentos en estos casos.



### Ejemplos

    **Ejemplo #1 Ejemplo con max()**

&lt;?php
echo max(2, 3, 1, 6, 7), PHP_EOL; // 7
echo max(array(2, 4, 5)), PHP_EOL; // 5

// Aquí, comparamos -1 &lt; 0, por lo que 'hello' es el valor más grande
echo max('hello', -1), PHP_EOL; // hello

// Con varios arrays de diferentes tamaños, max devuelve
// el más largo
$val = max(array(2, 2, 2), array(1, 1, 1, 1)); // array(1, 1, 1, 1)
var_dump($val);

// Varios arrays de la misma longitud son comparados de izquierda a derecha
// también, en nuestro ejemplo: 2 == 2, pero 5 &gt; 4
$val = max(array(2, 4, 8), array(2, 5, 1)); // array(2, 5, 1)
var_dump($val);

// Si se proporciona un array y un no-array, el array será siempre
// devuelto, sabiendo que las comparaciones tratan los arrays como
// más grandes que cualquier valor
$val = max('string', array(2, 5, 7), 42);   // array(2, 5, 7)
var_dump($val);

// Si un argumento es NULL o un booleano, será comparado con otros
// valores utilizando la regla FALSE &lt; TRUE según los otros tipos concernidos
// En el ejemplo de abajo, -10 es tratado como TRUE en la comparación
$val = max(-10, FALSE); // -10
var_dump($val);

// Por otro lado, 0 es tratado como FALSE, por lo que es "más pequeño que" TRUE
$val = max(0, TRUE); // TRUE
var_dump($val);
?&gt;

### Ver también

    - [min()](#function.min) - El valor más pequeño

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

# min

(PHP 4, PHP 5, PHP 7, PHP 8)

min — El valor más pequeño

### Descripción

**min**([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [mixed](#language.types.mixed)

Firma alternativa (no soportada con argumentos nombrados):

**min**([array](#language.types.array) $value_array): [mixed](#language.types.mixed)

Si el primer y único parámetro es un array, **min()**
retornará el valor más pequeño contenido en el array. Si el
primer parámetro es un entero, una cadena o un número decimal,
deben proporcionarse al menos dos parámetros y **min()**
retornará el más pequeño de estos valores.

**Nota**:

    Los valores de diferentes tipos serán comparados utilizando
    las [reglas de
    comparación estándar](#language.operators.comparison). Actualmente, una cadena no numérica
    será comparada con un [int](#language.types.integer), como si fuera la valor
    0, pero varias [string](#language.types.string) no numéricas serán comparadas de forma
    alfanumérica. El valor actual retornado será del mismo tipo que
    el original y ninguna conversión de tipo será aplicada.

**Precaución**

    Tenga cuidado al pasar argumentos con tipos diferentes,
    ya que **min()** puede producir resultados impredecibles.

### Parámetros

     value


       Cualquier valor [comparable](#language.operators.comparison).






     values


       Cualquier valor [comparable](#language.operators.comparison).






     value_array


       Un array que contiene los valores.





### Valores devueltos

La función **min()** retorna el valor del parámetro
considerado como "inferior" según la comparación estándar.
Si varios valores de tipos diferentes son evaluados como iguales
(i.e. 0 y 'abc'), el primero proporcionado
a la función será retornado.

### Errores/Excepciones

Si se pasa un array vacío, la función **min()** lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **min()** ahora lanza una [ValueError](#class.valueerror) en caso de fallo;
       previamente, **[false](#constant.false)** era retornado y un error **[E_WARNING](#constant.e-warning)** era emitido.




      8.0.0

       Como las [
       comparaciones entre las cadenas y los números](#migration80.incompatible.core.string-number-comparision) han sido cambiadas,
       **min()** ya no retorna un valor diferente
       basado en el orden de los argumentos en estos casos.



### Ejemplos

    **Ejemplo #1 Ejemplo con min()**

&lt;?php
echo min(2, 3, 1, 6, 7), PHP_EOL; // 1
echo min(array(2, 4, 5)), PHP_EOL; // 2

// Aquí, comparamos -1 &lt; 0, por lo tanto, -1 es el valor más bajo
echo min('hello', -1), PHP_EOL; // -1

// Con varios arrays de diferentes tamaños, min retorna el más corto
$val = min(array(2, 2, 2), array(1, 1, 1, 1)); // array(2, 2, 2)
var_dump($val);

// Varios arrays del mismo tamaño son comparados desde la izquierda hacia la derecha,
// por lo tanto, en nuestro ejemplo: 2 == 2, pero 4 &lt; 5
$val = min(array(2, 4, 8), array(2, 5, 1)); // array(2, 4, 8)
var_dump($val);

// Si se proporciona un array y un no-array, el array nunca será retornado
// ya que las comparaciones tratan los arrays como mayores que cualquier valor
$val = min('string', array(2, 5, 7), 42);   // string
var_dump($val);

// Si un argumento es NULL o un booleano, será comparado con
// otras valores utilizando la regla FALSE &lt; TRUE según los otros
// tipos proporcionados. En el ejemplo de abajo, tanto -10 como 10 son tratados
// como valiendo TRUE en la comparación
$val = min(-10, FALSE, 10); // FALSE
var_dump($val);

$val = min(-10, NULL, 10);  // NULL
var_dump($val);

// Por otro lado, 0 es tratado como valiendo FALSE, por lo tanto, es "más pequeño que" TRUE
$val = min(0, TRUE); // 0
var_dump($val);
?&gt;

### Ver también

    - [max()](#function.max) - El valor más grande

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

# octdec

(PHP 4, PHP 5, PHP 7, PHP 8)

octdec — Conversión de octal a decimal

### Descripción

    **octdec**([string](#language.types.string) $octal_string): [int](#language.types.integer)|[float](#language.types.float)

Devuelve un string que contiene la representación decimal del número
octal_string.

### Parámetros

     octal_string


       El string octal a convertir.
       Cualquier carácter inválido en octal_string
       es ignorado silenciosamente.
       A partir de PHP 7.4.0, proporcionar caracteres inválidos está deprecado.
       El número a convertir.





### Valores devueltos

La representación decimal de octal_string

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Proporcionar caracteres inválidos generará ahora una advertencia deprecada.
       El resultado siempre será calculado como si los caracteres inválidos
       no existieran.



### Ejemplos

    **Ejemplo #1 Ejemplo con octdec()**

&lt;?php
echo octdec('77') . "\n";
echo octdec(decoct(45));
?&gt;

    El ejemplo anterior mostrará:

63
45

### Notas

**Nota**:

    La función puede convertir números que son demasiado grandes para
    caber en un tipo [int](#language.types.integer), en cuyo caso, estos valores son devueltos
    como [float](#language.types.float).

### Ver también

    - [decoct()](#function.decoct) - Convierte de decimal a octal

    - [bindec()](#function.bindec) - Convierte de binario a decimal

    - [hexdec()](#function.hexdec) - Convierte de hexadecimal a decimal

    - [base_convert()](#function.base-convert) - Convierte un número entre bases arbitrarias

# pi

(PHP 4, PHP 5, PHP 7, PHP 8)

pi — Devuelve el valor de pi

### Descripción

**pi**(): [float](#language.types.float)

Devuelve una aproximación de pi.
Asimismo, puede utilizarse la constante **[M_PI](#constant.m-pi)**,
que devuelve un resultado idéntico a la función
**pi()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de pi como [float](#language.types.float).

### Ejemplos

    **Ejemplo #1 Ejemplo con pi()**

&lt;?php
echo pi(), PHP_EOL; // 3.1415926535898
echo M_PI, PHP_EOL; // 3.1415926535898
?&gt;

# pow

(PHP 4, PHP 5, PHP 7, PHP 8)

pow — Expresión exponencial

### Descripción

**pow**([mixed](#language.types.mixed) $num, [mixed](#language.types.mixed) $exponent): [int](#language.types.integer)|[float](#language.types.float)|[object](#language.types.object)

Devuelve num elevado a la potencia
exponent.

**Nota**:

    Es posible utilizar el operador
    [**](#language.operators.arithmetic) en su lugar.

### Parámetros

     num


       La base a utilizar






     exponent


       El exponente





### Valores devueltos

num elevado a la potencia exponent.
Si los argumentos no son enteros negativos, y el resultado
puede ser representado como un entero, el resultado será
[int](#language.types.integer), de lo contrario será devuelto como [float](#language.types.float).

Las extensiones PHP pueden reemplazar el comportamiento de esta operación y hacer que devuelva un objeto.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Elevar 0 a un
       exponente negativo es ahora obsoleto.



### Ejemplos

    **Ejemplo #1 Ejemplo con pow()**

&lt;?php

var_dump(pow(2, 8)); // int(256)
echo pow(-1, 20), PHP_EOL; // 1
echo pow(0, 0), PHP_EOL; // 1
echo pow(10, -1), PHP_EOL; // 0.1

echo pow(-1, 5.5), PHP_EOL; // NAN
?&gt;

        **Ejemplo #2 Ejemplos de pow()** con un objeto de la extensión GMP




&lt;?php
var_dump(pow(new GMP("3"), new GMP("2"))); // object(GMP)
?&gt;

### Notas

**Nota**:

    Esta función convertirá todas las entradas en un número,
    incluyendo valores no escalares, lo que puede
    llevar a resultados *impredecibles*.

### Ver también

    -
     Operador de exponenciación
     [**](#language.operators.arithmetic)


    - [fpow()](#function.fpow) - Eleva un número a la potencia de otro, según la norma IEEE 754

    - [exp()](#function.exp) - Calcula la exponencial de e

    - [sqrt()](#function.sqrt) - Raíz cuadrada

    - [bcpow()](#function.bcpow) - Elevar un número de precisión arbitraria a otro

    - [gmp_pow()](#function.gmp-pow) - Aumenta el número a la potencia

# rad2deg

(PHP 4, PHP 5, PHP 7, PHP 8)

rad2deg — Conversión de radianes a grados

### Descripción

**rad2deg**([float](#language.types.float) $num): [float](#language.types.float)

Convierte num (supuesto en radianes) a grados.

### Parámetros

     num


       Un valor, en radianes





### Valores devueltos

El equivalente de num, en grados.

### Ejemplos

    **Ejemplo #1 Ejemplo con rad2deg()**

&lt;?php

echo rad2deg(M_PI_4); // 45

?&gt;

### Ver también

    - [deg2rad()](#function.deg2rad) - Convierte un número de grados en radianes

# round

(PHP 4, PHP 5, PHP 7, PHP 8)

round — Redondea un número de punto flotante

### Descripción

**round**([int](#language.types.integer)|[float](#language.types.float) $num, [int](#language.types.integer) $precision = 0, [int](#language.types.integer)|[RoundingMode](#enum.roundingmode) $mode = RoundingMode::HalfAwayFromZero): [float](#language.types.float)

Devuelve el valor redondeado de num
a la precisión precision (número de
dígitos después del punto decimal). El argumento precision
puede ser negativo o **[null](#constant.null)** : es su valor por omisión.

### Parámetros

     num


       El valor a redondear.






     precision


       El número opcional de decimales a redondear.




       Si el argumento precision es positivo,
       num será redondeado utilizando el argumento
       precision para definir el número significativo
       de dígitos después del punto decimal.




       Si el argumento precision es negativo,
       num será redondeado utilizando el argumento
       precision para definir el número significativo
       de dígitos antes del punto decimal, i.e. el múltiplo más cercano
       de pow(10, -$precision), i.e. para una
       precision de -1, num
       será redondeado a 10, para una precision de -2 a 100, etc.






     mode


       Utilice [RoundingMode](#enum.roundingmode) o una de las constantes siguientes para especificar el método de redondeo.






           Constantes
           Descripción






           **[PHP_ROUND_HALF_UP](#constant.php-round-half-up)**

            Redondea num alejándose de cero cuando
            está a mitad de camino, redondeando así 1.5 a 2, y -1.5 a -2.




           **[PHP_ROUND_HALF_DOWN](#constant.php-round-half-down)**

            Redondea num acercándose a cero cuando
            está a mitad de camino, redondeando así 1.5 a 1, y -1.5 a -1.




           **[PHP_ROUND_HALF_EVEN](#constant.php-round-half-even)**

            Redondea num al valor par más cercano
            cuando está a mitad de camino, redondeando así 1.5 y 2.5 a 2.




           **[PHP_ROUND_HALF_ODD](#constant.php-round-half-odd)**

            Redondea num al valor impar más cercano
            cuando está a mitad de camino, redondeando así 1.5 a 1 y 2.5 a 3.







       Sin embargo, tenga en cuenta que algunos métodos recién añadidos solo existen en [RoundingMode](#enum.roundingmode).



### Valores devueltos

El valor redondeado a la precision dada como [float](#language.types.float).

### Errores/Excepciones

La función lanza una [ValueError](#class.valueerror) si mode es inválido.
Anterior a PHP 8.4.0, un modo inválido era silenciosamente convertido en **[PHP_ROUND_HALF_UP](#constant.php-round-half-up)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Cuatro nuevos métodos de redondeo han sido añadidos.




      8.4.0

       Ahora lanza una [ValueError](#class.valueerror) si
       mode es inválido.




      8.0.0

       num ya no acepta objetos internos que soporten
       las conversiones numéricas.



### Ejemplos

    **Ejemplo #1 Ejemplo con round()**

&lt;?php
var_dump(round(3.4));
var_dump(round(3.5));
var_dump(round(3.6));
var_dump(round(3.6, 0));
var_dump(round(5.045, 2));
var_dump(round(5.055, 2));
var_dump(round(345, -2));
var_dump(round(345, -3));
var_dump(round(678, -2));
var_dump(round(678, -3));
?&gt;

    El ejemplo anterior mostrará:

float(3)
float(4)
float(4)
float(4)
float(5.05)
float(5.06)
float(300)
float(0)
float(700)
float(1000)

    **Ejemplo #2 Cómo precision afecta un flotante**

&lt;?php
$number = 135.79;

var_dump(round($number, 3));
var_dump(round($number, 2));
var_dump(round($number, 1));
var_dump(round($number, 0));
var_dump(round($number, -1));
var_dump(round($number, -2));
var_dump(round($number, -3));
?&gt;

    El ejemplo anterior mostrará:

float(135.79)
float(135.79)
float(135.8)
float(136)
float(140)
float(100)
float(0)

    **Ejemplo #3 Ejemplo con mode**

&lt;?php
echo "Método de redondeo con 9.5" . PHP_EOL;
var_dump(round(9.5, 0, PHP_ROUND_HALF_UP));
var_dump(round(9.5, 0, PHP_ROUND_HALF_DOWN));
var_dump(round(9.5, 0, PHP_ROUND_HALF_EVEN));
var_dump(round(9.5, 0, PHP_ROUND_HALF_ODD));

echo PHP_EOL;
echo "Método de redondeo con 8.5" . PHP_EOL;
var_dump(round(8.5, 0, PHP_ROUND_HALF_UP));
var_dump(round(8.5, 0, PHP_ROUND_HALF_DOWN));
var_dump(round(8.5, 0, PHP_ROUND_HALF_EVEN));
var_dump(round(8.5, 0, PHP_ROUND_HALF_ODD));
?&gt;

    El ejemplo anterior mostrará:

Método de redondeo con 9.5
float(10)
float(9)
float(10)
float(9)

Método de redondeo con 8.5
float(9)
float(8)
float(8)
float(9)

    **Ejemplo #4 Ejemplo con mode y precision**

&lt;?php
echo "Uso de PHP_ROUND_HALF_UP con una precisión de una decimal" . PHP_EOL;
var_dump(round( 1.55, 1, PHP_ROUND_HALF_UP));
var_dump(round(-1.55, 1, PHP_ROUND_HALF_UP));

echo PHP_EOL;
echo "Uso de PHP_ROUND_HALF_DOWN con una precisión de una decimal" . PHP_EOL;
var_dump(round( 1.55, 1, PHP_ROUND_HALF_DOWN));
var_dump(round(-1.55, 1, PHP_ROUND_HALF_DOWN));

echo PHP_EOL;
echo "Uso de PHP_ROUND_HALF_EVEN con una precisión de una decimal" . PHP_EOL;
var_dump(round( 1.55, 1, PHP_ROUND_HALF_EVEN));
var_dump(round(-1.55, 1, PHP_ROUND_HALF_EVEN));

echo PHP_EOL;
echo "Uso de PHP_ROUND_HALF_ODD con una precisión de una decimal" . PHP_EOL;
var_dump(round( 1.55, 1, PHP_ROUND_HALF_ODD));
var_dump(round(-1.55, 1, PHP_ROUND_HALF_ODD));
?&gt;

    El ejemplo anterior mostrará:

Uso de PHP_ROUND_HALF_UP con una precisión de una decimal
float(1.6)
float(-1.6)

Uso de PHP_ROUND_HALF_DOWN con una precisión de una decimal
float(1.5)
float(-1.5)

Uso de PHP_ROUND_HALF_EVEN con una precisión de una decimal
float(1.6)
float(-1.6)

Uso de PHP_ROUND_HALF_ODD con una precisión de una decimal
float(1.5)
float(-1.5)

**Ejemplo #5 Ejemplo de uso de [RoundingMode](#enum.roundingmode)**

&lt;?php
foreach (RoundingMode::cases() as $mode) {
    foreach ([
        8.5,
        9.5,
        -3.5,
    ] as $number) {
        printf("%-17s: %+.17g -&gt; %+.17g\n", $mode-&gt;name, $number, round($number, 0, $mode));
}
echo "\n";
}
?&gt;

El ejemplo anterior mostrará:

HalfAwayFromZero : +8.5 -&gt; +9
HalfAwayFromZero : +9.5 -&gt; +10
HalfAwayFromZero : -3.5 -&gt; -4

HalfTowardsZero : +8.5 -&gt; +8
HalfTowardsZero : +9.5 -&gt; +9
HalfTowardsZero : -3.5 -&gt; -3

HalfEven : +8.5 -&gt; +8
HalfEven : +9.5 -&gt; +10
HalfEven : -3.5 -&gt; -4

HalfOdd : +8.5 -&gt; +9
HalfOdd : +9.5 -&gt; +9
HalfOdd : -3.5 -&gt; -3

TowardsZero : +8.5 -&gt; +8
TowardsZero : +9.5 -&gt; +9
TowardsZero : -3.5 -&gt; -3

AwayFromZero : +8.5 -&gt; +9
AwayFromZero : +9.5 -&gt; +10
AwayFromZero : -3.5 -&gt; -4

NegativeInfinity : +8.5 -&gt; +8
NegativeInfinity : +9.5 -&gt; +9
NegativeInfinity : -3.5 -&gt; -4

PositiveInfinity : +8.5 -&gt; +9
PositiveInfinity : +9.5 -&gt; +10
PositiveInfinity : -3.5 -&gt; -3

### Ver también

    - [ceil()](#function.ceil) - Redondea al número superior

    - [floor()](#function.floor) - Redondea hacia el entero inferior

    - [number_format()](#function.number-format) - Formatea un número para su visualización

# sin

(PHP 4, PHP 5, PHP 7, PHP 8)

sin — Seno

### Descripción

**sin**([float](#language.types.float) $num): [float](#language.types.float)

**sin()** devuelve el seno de num
(num en radianes).

### Parámetros

     num


       Un valor, en radianes





### Valores devueltos

El seno de num.

### Ejemplos

    **Ejemplo #1 Ejemplo con sin()**

&lt;?php
// La precisión depende de la directiva precision
echo sin(deg2rad(60)), PHP_EOL; // 0.866025403 ...
echo sin(60), PHP_EOL; // -0.304810621 ...
?&gt;

### Ver también

    - [asin()](#function.asin) - Arc sinus

    - [sinh()](#function.sinh) - Seno hiperbólico

    - [cos()](#function.cos) - Coseno

    - [tan()](#function.tan) - Tangente

    - [deg2rad()](#function.deg2rad) - Convierte un número de grados en radianes

# sinh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

sinh — Seno hiperbólico

### Descripción

**sinh**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve el seno hiperbólico de num,
definido como (exp($num) - exp(-$num))/2.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

El seno hiperbólico de num.

### Ver también

    - [sin()](#function.sin) - Seno

    - [asinh()](#function.asinh) - Arco seno hiperbólico

    - [cosh()](#function.cosh) - Coseno hiperbólico

    - [tanh()](#function.tanh) - Tangente hiperbólica

# sqrt

(PHP 4, PHP 5, PHP 7, PHP 8)

sqrt — Raíz cuadrada

### Descripción

**sqrt**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve la raíz cuadrada de num.

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

La raíz cuadrada de num
o el valor especial **[NAN](#constant.nan)** para los números negativos.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqrt()**

&lt;?php
// La precisión depende de su directiva precision
echo sqrt(9), PHP_EOL; // 3
echo sqrt(10), PHP_EOL; // 3.16227766 ...
?&gt;

### Ver también

    - [pow()](#function.pow) - Expresión exponencial

    - **[M_SQRTPI](#constant.m-sqrtpi)** - sqrt(pi)

    - **[M_2_SQRTPI](#constant.m-2-sqrtpi)** - 2/sqrt(pi)

    - **[M_SQRT2](#constant.m-sqrt2)** - sqrt(2)

    - **[M_SQRT3](#constant.m-sqrt3)** - sqrt(3)

    - **[M_SQRT1_2](#constant.m-sqrt1-2)** - 1/sqrt(2)

# tan

(PHP 4, PHP 5, PHP 7, PHP 8)

tan — Tangente

### Descripción

**tan**([float](#language.types.float) $num): [float](#language.types.float)

Devuelve la tangente de num
(num en radianes).

### Parámetros

     num


       El argumento a tratar, en radianes





### Valores devueltos

La tangente de num

### Ejemplos

    **Ejemplo #1 Ejemplo con tan()**

&lt;?php

echo tan(M_PI_4); // 1

?&gt;

### Ver también

    - [atan()](#function.atan) - Arc tangente

    - [atan2()](#function.atan2) - Arco tangente de dos variables

    - [sin()](#function.sin) - Seno

    - [cos()](#function.cos) - Coseno

    - [tanh()](#function.tanh) - Tangente hiperbólica

    - [deg2rad()](#function.deg2rad) - Convierte un número de grados en radianes

# tanh

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

tanh — Tangente hiperbólica

### Descripción

**tanh**([float](#language.types.float) $num): [float](#language.types.float)

Se devuelve la tangente hiperbólica de
num, definida como
sinh($num)/cosh($num).

### Parámetros

     num


       El argumento a tratar





### Valores devueltos

La tangente hiperbólica de num.

### Ver también

    - [tan()](#function.tan) - Tangente

    - [atanh()](#function.atanh) - Arco tangente hiperbólica

    - [sinh()](#function.sinh) - Seno hiperbólico

    - [cosh()](#function.cosh) - Coseno hiperbólico

## Tabla de contenidos

- [abs](#function.abs) — Valor absoluto
- [acos](#function.acos) — Arc coseno
- [acosh](#function.acosh) — Arco coseno hiperbólico
- [asin](#function.asin) — Arc sinus
- [asinh](#function.asinh) — Arco seno hiperbólico
- [atan](#function.atan) — Arc tangente
- [atan2](#function.atan2) — Arco tangente de dos variables
- [atanh](#function.atanh) — Arco tangente hiperbólica
- [base_convert](#function.base-convert) — Convierte un número entre bases arbitrarias
- [bindec](#function.bindec) — Convierte de binario a decimal
- [ceil](#function.ceil) — Redondea al número superior
- [cos](#function.cos) — Coseno
- [cosh](#function.cosh) — Coseno hiperbólico
- [decbin](#function.decbin) — Convierte de decimal a binario
- [dechex](#function.dechex) — Convierte de decimal a hexadecimal
- [decoct](#function.decoct) — Convierte de decimal a octal
- [deg2rad](#function.deg2rad) — Convierte un número de grados en radianes
- [exp](#function.exp) — Calcula la exponencial de e
- [expm1](#function.expm1) — Devuelve exp($num) - 1, calculado de manera precisa incluso
  cuando el valor del número es cercano a cero
- [fdiv](#function.fdiv) — Divide dos números, según la norma IEEE 754
- [floor](#function.floor) — Redondea hacia el entero inferior
- [fmod](#function.fmod) — Devuelve el resto de la división
- [fpow](#function.fpow) — Eleva un número a la potencia de otro, según la norma IEEE 754
- [hexdec](#function.hexdec) — Convierte de hexadecimal a decimal
- [hypot](#function.hypot) — Calcula la longitud de la hipotenusa de un triángulo rectángulo
- [intdiv](#function.intdiv) — División de Enteros
- [is_finite](#function.is-finite) — Verifica si un número flotante es finito
- [is_infinite](#function.is-infinite) — Verifica si un número de tipo float es infinito
- [is_nan](#function.is-nan) — Verifica si un número flotante es NAN
- [log](#function.log) — Logaritmo natural (neperiano)
- [log10](#function.log10) — Logaritmo en base 10
- [log1p](#function.log1p) — Calcula con precisión log(1 + número)
- [max](#function.max) — El valor más grande
- [min](#function.min) — El valor más pequeño
- [octdec](#function.octdec) — Conversión de octal a decimal
- [pi](#function.pi) — Devuelve el valor de pi
- [pow](#function.pow) — Expresión exponencial
- [rad2deg](#function.rad2deg) — Conversión de radianes a grados
- [round](#function.round) — Redondea un número de punto flotante
- [sin](#function.sin) — Seno
- [sinh](#function.sinh) — Seno hiperbólico
- [sqrt](#function.sqrt) — Raíz cuadrada
- [tan](#function.tan) — Tangente
- [tanh](#function.tanh) — Tangente hiperbólica

- [Introducción](#intro.math)
- [Constantes predefinidas](#math.constants)
- [RoundingMode](#enum.roundingmode) — La enumeración RoundingMode
- [Funciones Matemáticas](#ref.math)<li>[abs](#function.abs) — Valor absoluto
- [acos](#function.acos) — Arc coseno
- [acosh](#function.acosh) — Arco coseno hiperbólico
- [asin](#function.asin) — Arc sinus
- [asinh](#function.asinh) — Arco seno hiperbólico
- [atan](#function.atan) — Arc tangente
- [atan2](#function.atan2) — Arco tangente de dos variables
- [atanh](#function.atanh) — Arco tangente hiperbólica
- [base_convert](#function.base-convert) — Convierte un número entre bases arbitrarias
- [bindec](#function.bindec) — Convierte de binario a decimal
- [ceil](#function.ceil) — Redondea al número superior
- [cos](#function.cos) — Coseno
- [cosh](#function.cosh) — Coseno hiperbólico
- [decbin](#function.decbin) — Convierte de decimal a binario
- [dechex](#function.dechex) — Convierte de decimal a hexadecimal
- [decoct](#function.decoct) — Convierte de decimal a octal
- [deg2rad](#function.deg2rad) — Convierte un número de grados en radianes
- [exp](#function.exp) — Calcula la exponencial de e
- [expm1](#function.expm1) — Devuelve exp($num) - 1, calculado de manera precisa incluso
  cuando el valor del número es cercano a cero
- [fdiv](#function.fdiv) — Divide dos números, según la norma IEEE 754
- [floor](#function.floor) — Redondea hacia el entero inferior
- [fmod](#function.fmod) — Devuelve el resto de la división
- [fpow](#function.fpow) — Eleva un número a la potencia de otro, según la norma IEEE 754
- [hexdec](#function.hexdec) — Convierte de hexadecimal a decimal
- [hypot](#function.hypot) — Calcula la longitud de la hipotenusa de un triángulo rectángulo
- [intdiv](#function.intdiv) — División de Enteros
- [is_finite](#function.is-finite) — Verifica si un número flotante es finito
- [is_infinite](#function.is-infinite) — Verifica si un número de tipo float es infinito
- [is_nan](#function.is-nan) — Verifica si un número flotante es NAN
- [log](#function.log) — Logaritmo natural (neperiano)
- [log10](#function.log10) — Logaritmo en base 10
- [log1p](#function.log1p) — Calcula con precisión log(1 + número)
- [max](#function.max) — El valor más grande
- [min](#function.min) — El valor más pequeño
- [octdec](#function.octdec) — Conversión de octal a decimal
- [pi](#function.pi) — Devuelve el valor de pi
- [pow](#function.pow) — Expresión exponencial
- [rad2deg](#function.rad2deg) — Conversión de radianes a grados
- [round](#function.round) — Redondea un número de punto flotante
- [sin](#function.sin) — Seno
- [sinh](#function.sinh) — Seno hiperbólico
- [sqrt](#function.sqrt) — Raíz cuadrada
- [tan](#function.tan) — Tangente
- [tanh](#function.tanh) — Tangente hiperbólica
  </li>
