# Matemáticas de precisión arbitraria BCMath

# Introducción

Para matemáticas de precisión arbitraria, PHP ofrece BCMath,
que admite números de cualquier tamaño y precisión de hasta 2147483647 (o 0x7FFFFFFF) dígitos decimales,
si hay suficiente memoria, representados como cadenas.

Números válidos (también conocidos como bien formados) en BCMath son cadenas que coinciden con la expresión regular
/^[+-]?[0-9]_(\.[0-9]_)?$/.

**Precaución**

    Pasar valores de tipo [float](#language.types.float) a una función de BCMath que espera
    un [string](#language.types.string) como operando puede no tener el efecto deseado debido a
    la forma en que PHP convierte valores de tipo [float](#language.types.float) a [string](#language.types.string), es decir,
    que el [string](#language.types.string) puede estar en notación exponencial (que no es
    compatible con BCMath), y que, antes de PHP 8.0.0, el separador decimal dependía
    de la configuración regional (mientras que BCMath siempre espera un punto decimal).

&lt;?php
$num1 = 0; // (string) 0 =&gt; '0'
$num2 = -0.000005; // (string) -0.000005 =&gt; '-5.05E-6'
echo bcadd($num1, $num2, 6); // =&gt; '0.000000'

setlocale(LC_NUMERIC, 'de_DE'); // Utiliza una coma decimal
$num2 = 1.2; // (string) 1.2 =&gt; '1,2'
echo bcsub($num1, $num2, 1); // =&gt; '0.0'
?&gt;

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#bc.installation)
- [Configuración en tiempo de ejecución](#bc.configuration)

## Instalación

Esta función solamente está disponible si PHP está configurado con **--enable-bcmath**.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

  <caption>**BCmath Opciones de Configuración**</caption>
  
   
    
     Nombre
     Por defecto
     Cambiable
     Historial de cambios


     [bcmath.scale](#ini.bcmath.scale)
     "0"
     **[INI_ALL](#constant.ini-all)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     bcmath.scale
     [integer](#language.types.integer)



      Número de dígitos decimales para todas las funciones bcmath. Ver también
      [bcscale()](#function.bcscale).



     **Nota**:
      [BcMath\Number](#class.bcmath-number) no se ve afectado por esta configuración.


# Funciones de BC Math

# bcadd

(PHP 4, PHP 5, PHP 7, PHP 8)

bcadd — Suma dos números de precisión arbitrária

### Descripción

**bcadd**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Suma num1 y
num2.

### Parámetros

     num1


       El operador izquierdo, como una cadena.






     num2


       El operador derecho, como una cadena






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

La suma de dos operandos, como una cadena.

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo bcadd()**

&lt;?php

$a = '1.234';
$b = '5';

echo bcadd($a, $b);     // 6
echo bcadd($a, $b, 4); // 6.2340

?&gt;

### Ver también

    - [bcsub()](#function.bcsub) - Resta un número de precisión arbitraria de otro

    - [BcMath\Number::add()](#bcmath-number.add) - Añadir un número de precisión arbitraria

# bcceil

(PHP 8 &gt;= 8.4.0)

bcceil — Redondea al alza un número de precisión arbitraria

### Descripción

**bcceil**([string](#language.types.string) $num): [string](#language.types.string)

Devuelve el valor entero superior redondeando
num si es necesario.

### Parámetros

    num


      El valor a redondear.


### Valores devueltos

Devuelve un string numérico representando num redondeado al alza al entero más cercano.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) si
num no es un string numérico BCMath bien formado.

### Ejemplos

**Ejemplo #1 Ejemplo de bcceil()**

&lt;?php
var_dump(bcceil('4.3'));
var_dump(bcceil('9.999'));
var_dump(bcceil('-3.14'));
?&gt;

El ejemplo anterior mostrará:

string(1) "5"
string(2) "10"
string(2) "-3"

### Ver también

- [bcfloor()](#function.bcfloor) - Redondea hacia abajo un número de precisión arbitraria

- [bcround()](#function.bcround) - Redondea un número de precisión arbitraria

- [BcMath\Number::ceil()](#bcmath-number.ceil) - Redondea al alza un número de precisión arbitraria

# bccomp

(PHP 4, PHP 5, PHP 7, PHP 8)

bccomp — Comparar dos números de gran tamaño

### Descripción

**bccomp**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [int](#language.types.integer)

Compara el operando num1
con num2 y devuelve el
resultado en forma de un [int](#language.types.integer).

### Parámetros

     num1


       El operador izquierdo, como una cadena.






     num2


       El operador derecho, como una cadena






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve 0 si los dos operandos son iguales,
1 si num1 es superior a
num2, o -1 en caso contrario.

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con bccomp()**

&lt;?php

echo bccomp('1', '2') . "\n"; // -1
echo bccomp('1.00001', '1', 3); // 0
echo bccomp('1.00001', '1', 5); // 1

?&gt;

### Ver también

- [BcMath\Number::compare()](#bcmath-number.compare) - Comparar dos números de precisión arbitraria

# bcdiv

(PHP 4, PHP 5, PHP 7, PHP 8)

bcdiv — Divide dos números de precisión arbitraria

### Descripción

**bcdiv**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Divide el num1 entre el num2.

### Parámetros

     num1


       El dividendo, como una cadena.






     num2


       El divisor, como una cadena.






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve el resultado de la división como una cadena.

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

Esta función lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror)
si num2 es 0.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.




      8.0.0

       Dividir entre 0 ahora lanza una excepción
       [DivisionByZeroError](#class.divisionbyzeroerror)
       en vez de devolver **[null](#constant.null)**.



### Ejemplos

**Ejemplo #1 bcdiv()** example

&lt;?php

echo bcdiv('105', '6.55957', 3); // 16.007

?&gt;

### Ver también

    - [bcdivmod()](#function.bcdivmod) - Devuelve el cociente y el resto de un número de precisión arbitraria

    - [bcmod()](#function.bcmod) - Devuelve el resto de una división entre números de gran tamaño

    - [bcmul()](#function.bcmul) - Multiplica dos números de precisión arbitraria

    - [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

# bcdivmod

(PHP 8 &gt;= 8.4.0)

bcdivmod — Devuelve el cociente y el resto de un número de precisión arbitraria

### Descripción

    **bcdivmod**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [array](#language.types.array)

Devuelve el cociente y el resto de la división de num1 por
num2.

### Parámetros

     num1


       El dividendo, como una cadena.






     num2


       El divisor, como una cadena.






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve un [array](#language.types.array) indexado donde el primer elemento es el cociente en forma de [string](#language.types.string)
y el segundo elemento es el resto en forma de [string](#language.types.string).

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

Esta función lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror)
si num2 es 0.

### Ejemplos

**Ejemplo #1 Ejemplo de bcdivmod()**

&lt;?php
bcscale(0);

[$quot, $rem] = bcdivmod('5', '3');
echo $quot; // 1
echo $rem; // 2

[$quot, $rem] = bcdivmod('5', '-3');
echo $quot; // -1
echo $rem; // 2

[$quot, $rem] = bcdivmod('-5', '3');
echo $quot; // -1
echo $rem; // -2

[$quot, $rem] = bcdivmod('-5', '-3');
echo $quot; // 1
echo $rem; // -2
?&gt;

**Ejemplo #2 bcdivmod()** con decimales

&lt;?php
[$quot, $rem] = bcdivmod('5.7', '1.3', 1);
echo $quot; // 4
echo $rem; // 0.5
?&gt;

### Ver también

- [bcdiv()](#function.bcdiv) - Divide dos números de precisión arbitraria

- [bcmod()](#function.bcmod) - Devuelve el resto de una división entre números de gran tamaño

- [BcMath\Number::divmod()](#bcmath-number.divmod) - Devuelve el cociente y el módulo de un número de precisión arbitraria

# bcfloor

(PHP 8 &gt;= 8.4.0)

bcfloor — Redondea hacia abajo un número de precisión arbitraria

### Descripción

**bcfloor**([string](#language.types.string) $num): [string](#language.types.string)

Devuelve el valor entero inferior siguiente redondeando
num si es necesario.

### Parámetros

    num


      El valor a redondear.


### Valores devueltos

Devuelve una cadena numérica representando num redondeado hacia abajo al entero más cercano.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) si
num no es un string numérico BCMath bien formado.

### Ejemplos

**Ejemplo #1 Ejemplo de bcfloor()**

&lt;?php
var_dump(bcfloor('4.3'));
var_dump(bcfloor('9.999'));
var_dump(bcfloor('-3.14'));
?&gt;

El ejemplo anterior mostrará:

string(1) "4"
string(1) "9"
string(2) "-4"

### Ver también

- [bcceil()](#function.bcceil) - Redondea al alza un número de precisión arbitraria

- [bcround()](#function.bcround) - Redondea un número de precisión arbitraria

- [BcMath\Number::floor()](#bcmath-number.floor) - Redondea hacia abajo un número de precisión arbitraria

# bcmod

(PHP 4, PHP 5, PHP 7, PHP 8)

bcmod — Devuelve el resto de una división entre números de gran tamaño

### Descripción

**bcmod**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Devuelve el resto de la división entre num1
utilizando num2.
El resultado tiene el mismo signo que num1.

### Parámetros

     num1


       El operador izquierdo, como una cadena.






     num2


       El operador derecho, como una cadena






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve el módulo, en forma de [string](#language.types.string).

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

Esta función lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror)
si num2 es 0.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.




      8.0.0

       La división por 0 ahora lanza una excepción
       [DivisionByZeroError](#class.divisionbyzeroerror) en lugar de devolver null.




      7.2.0

       num1 y num2 ya no se truncan a enteros. El comportamiento de **bcmod()**
       sigue a [fmod()](#function.fmod) en lugar del operador %.




      7.2.0

       Se ha añadido el parámetro scale.



### Ejemplos

**Ejemplo #1 Ejemplo con bcmod()**

&lt;?php
bcscale(0);
echo bcmod( '5', '3'); // 2
echo bcmod( '5', '-3'); // 2
echo bcmod('-5', '3'); // -2
echo bcmod('-5', '-3'); // -2
?&gt;

**Ejemplo #2 bcmod()** con decimales

&lt;?php
bcscale(1);
echo bcmod('5.7', '1.3'); // 0.5 desde PHP 7.2.0; 0 anteriormente
?&gt;

### Ver también

    - [bcdiv()](#function.bcdiv) - Divide dos números de precisión arbitraria

    - [bcdivmod()](#function.bcdivmod) - Devuelve el cociente y el resto de un número de precisión arbitraria

    - [BcMath\Number::mod()](#bcmath-number.mod) - Devuelve el módulo de un número de precisión arbitraria

# bcmul

(PHP 4, PHP 5, PHP 7, PHP 8)

bcmul — Multiplica dos números de precisión arbitraria

### Descripción

**bcmul**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Multiplica num1 por num2.

### Parámetros

     num1


       El operador izquierdo, como una cadena.






     num2


       El operador derecho, como una cadena






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve el resultado como un string.

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.




      7.3.0

       **bcmul()** ahora devuelve números con la escala solicitada.
       Anteriormente, los números devueltos podían omitir los ceros decimales finales.



### Ejemplos

**Ejemplo #1 Ejemplo de bcmul()**

&lt;?php
echo bcmul('1.34747474747', '35', 3); // 47.161
echo bcmul('2', '4'); // 8
?&gt;

### Notas

**Nota**:

    Antes de PHP 7.3.0, **bcmul()** podría devolver un resultado con menos dígitos después del
    punto decimal que el parámetro scale
    indicaría. Esto solo ocurre cuando el resultado no requiere toda la
    precisión permitida por scale. Por ejemplo:



     **Ejemplo #2 Ejemplo de scale en bcmul()**




&lt;?php
echo bcmul('5', '2', 2); // Imprime "10", no "10.00"
?&gt;

### Ver también

    - [bcdiv()](#function.bcdiv) - Divide dos números de precisión arbitraria

    - [BcMath\Number::mul()](#bcmath-number.mul) - Multiplica un número de precisión arbitraria

# bcpow

(PHP 4, PHP 5, PHP 7, PHP 8)

bcpow — Elevar un número de precisión arbitraria a otro

### Descripción

**bcpow**([string](#language.types.string) $num, [string](#language.types.string) $exponent, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Eleva num a la potencia
exponent.

### Parámetros

     num


       La base, como un string.






     exponent


       El exponente, como un string. Debe ser un valor sin parte fraccionaria.
       El rango válido del exponente es específico de la plataforma, pero es al menos de
       -2147483648 a 2147483647.






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve el resultado como un string.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num o exponent no es un string numérico con formato válido de BCMath

    - exponent tiene una parte fraccionaria

    - exponent o scale están fuera del rango válido

Esta función lanza una [DivisionByZeroError](#class.divisionbyzeroerror) si num
es 0 y exponent es un valor negativo.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Las potencias negativas de 0 anteriormente devolvían 0, pero ahora lanzan una
       excepción [DivisionByZeroError](#class.divisionbyzeroerror).




      8.0.0

       Cuando exponent tiene una parte fraccionaria, ahora lanza un [ValueError](#class.valueerror)
       en lugar de truncar.




      7.3.0

       **bcpow()** ahora devuelve números con la escala solicitada.
       Anteriormente, los números devueltos podían omitir los ceros decimales finales.



### Ejemplos

**Ejemplo #1 Ejemplo de bcpow()**

&lt;?php

echo bcpow('4.2', '3', 2); // 74.08

?&gt;

### Notas

**Nota**:

    Antes de PHP 7.3.0, **bcpow()** podría devolver un resultado con menos dígitos después del punto
    decimal que los indicados en el parámetro scale.
    Esto sucede únicamente cuando el resultado no necesita toda la precisión
    disponible por scale. Por ejemplo:



     **Ejemplo #2 Ejemplo de escalado de bcpow()**




&lt;?php
echo bcpow('5', '2', 2); // Imprime "25", no "25.00"
?&gt;

### Ver también

    - [bcpowmod()](#function.bcpowmod) - Eleva un número de precisión arbitraria a otro, reducido por un módulo especificado

    - [bcsqrt()](#function.bcsqrt) - Obtiene la raiz cuadrada de un número de precisión arbitraria

    - [BcMath\Number::pow()](#bcmath-number.pow) - Eleva un número de precisión arbitraria

# bcpowmod

(PHP 5, PHP 7, PHP 8)

bcpowmod — Eleva un número de precisión arbitraria a otro, reducido por un módulo especificado

### Descripción

**bcpowmod**(
    [string](#language.types.string) $num,
    [string](#language.types.string) $exponent,
    [string](#language.types.string) $modulus,
    [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**
): [string](#language.types.string)

Usa el método de exponenciación rápida para aumentar
num a la potencia
exponent con respecto al módulo
modulus.

### Parámetros

     num


       La base, como un string integral (es decir, la escala tiene que ser cero).






     exponent


       El exponente, como un string integral no negativo (es decir, la escala tiene que ser cero).






     modulus


       El módulo, como un string integral (es decir, la escala tiene que ser cero).






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve el resultado como un string.

### Errores/Excepciones

Esta función lanza un [ValueError](#class.valueerror) en los siguientes casos:

    - num, exponent o modulus no es un string numérico con formato válido de BCMath

    - num, exponent o modulus tiene una parte fraccionaria

    - exponent es un valor negativo

    - scale está fuera del rango válido

Esta función lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror) si modulus
es 0.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.




      8.0.0

       Ahora lanza un [ValueError](#class.valueerror) en vez de devolver **[false](#constant.false)** si exponent es un valor negativo.




      8.0.0

       Dividiendo por 0 ahora lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror) en vez de devolver **[false](#constant.false)**.



### Ejemplos

Los siguientes dos comandos son funcionalmente idénticos. La version
**bcpowmod()** sin embargo, se ejecuta
en menos tiempo y admite mas parametros.

&lt;?php
$a = bcpowmod($x, $y, $mod);

$b = bcmod(bcpow($x, $y), $mod);

// $a y $b son iguales el uno al otro.

?&gt;

### Notas

**Nota**:

    Debido a que este método utiliza la operación módulo, podrían obtenerse resultados
    inesperados en números enteros no positivos.

### Ver también

    - [bcpow()](#function.bcpow) - Elevar un número de precisión arbitraria a otro

    - [bcmod()](#function.bcmod) - Devuelve el resto de una división entre números de gran tamaño

- [BcMath\Number::powmod()](#bcmath-number.powmod) - Eleva un número de precisión arbitraria, reducido por un módulo especificado

# bcround

(PHP 8 &gt;= 8.4.0)

bcround — Redondea un número de precisión arbitraria

### Descripción

**bcround**([string](#language.types.string) $num, [int](#language.types.integer) $precision = 0, [RoundingMode](#enum.roundingmode) $mode = RoundingMode::HalfAwayFromZero): [string](#language.types.string)

Devuelve el valor redondeado de num a
la precisión especificada precision
(número de dígitos después del punto decimal).
precision puede ser también negativo o nulo (por omisión).

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


      Especifica el método de redondeo. Para más información sobre los métodos, ver [RoundingMode](#enum.roundingmode).


### Valores devueltos

Devuelve una cadena numérica representando num redondeado a la precisión dada.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num no es una cadena numérica BCMath bien formada.

    - Un mode inválido es especificado.

### Ejemplos

**Ejemplo #1 Ejemplos de bcround()**

&lt;?php
var_dump(bcround('3.4'));
var_dump(bcround('3.5'));
var_dump(bcround('3.6'));
var_dump(bcround('3.6', 0));
var_dump(bcround('5.045', 2));
var_dump(bcround('5.055', 2));
var_dump(bcround('345', -2));
var_dump(bcround('345', -3));
var_dump(bcround('678', -2));
var_dump(bcround('678', -3));
?&gt;

El ejemplo anterior mostrará:

string(1) "3"
string(1) "4"
string(1) "4"
string(1) "4"
string(4) "5.05"
string(4) "5.06"
string(3) "300"
string(1) "0"
string(3) "700"
string(4) "1000"

**Ejemplo #2
Ejemplo de la utilización de bcround()** con diferentes valores de precision

&lt;?php
$number = '123.45';

var_dump(bcround($number, 3));
var_dump(bcround($number, 2));
var_dump(bcround($number, 1));
var_dump(bcround($number, 0));
var_dump(bcround($number, -1));
var_dump(bcround($number, -2));
var_dump(bcround($number, -3));
?&gt;

El ejemplo anterior mostrará:

string(7) "123.450"
string(6) "123.45"
string(5) "123.5"
string(3) "123"
string(3) "120"
string(3) "100"
string(1) "0"

**Ejemplo #3
Ejemplo de la utilización de bcround()** con diferentes valores de mode

&lt;?php
echo 'Modos de redondeo con 9.5' . PHP_EOL;
var_dump(bcround('9.5', 0, RoundingMode::HalfAwayFromZero));
var_dump(bcround('9.5', 0, RoundingMode::HalfTowardsZero));
var_dump(bcround('9.5', 0, RoundingMode::HalfEven));
var_dump(bcround('9.5', 0, RoundingMode::HalfOdd));
var_dump(bcround('9.5', 0, RoundingMode::TowardsZero));
var_dump(bcround('9.5', 0, RoundingMode::AwayFromZero));
var_dump(bcround('9.5', 0, RoundingMode::NegativeInfinity));
var_dump(bcround('9.5', 0, RoundingMode::PositiveInfinity));

echo PHP_EOL;
echo 'Modos de redondeo con 8.5' . PHP_EOL;
var_dump(bcround('8.5', 0, RoundingMode::HalfAwayFromZero));
var_dump(bcround('8.5', 0, RoundingMode::HalfTowardsZero));
var_dump(bcround('8.5', 0, RoundingMode::HalfEven));
var_dump(bcround('8.5', 0, RoundingMode::HalfOdd));
var_dump(bcround('8.5', 0, RoundingMode::TowardsZero));
var_dump(bcround('8.5', 0, RoundingMode::AwayFromZero));
var_dump(bcround('8.5', 0, RoundingMode::NegativeInfinity));
var_dump(bcround('8.5', 0, RoundingMode::PositiveInfinity));
?&gt;

El ejemplo anterior mostrará:

Modos de redondeo con 9.5
string(2) "10"
string(1) "9"
string(2) "10"
string(1) "9"
string(1) "9"
string(2) "10"
string(1) "9"
string(2) "10"

Modos de redondeo con 8.5
string(1) "9"
string(1) "8"
string(1) "8"
string(1) "9"
string(1) "8"
string(1) "9"
string(1) "8"
string(1) "9"

**Ejemplo #4
Ejemplo de la utilización de bcround()** con diferentes valores de mode
al especificar precision

&lt;?php
echo 'Utilización de RoundingMode::HalfAwayFromZero con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::HalfAwayFromZero));
var_dump(bcround(-1.55, 1, RoundingMode::HalfAwayFromZero));

echo PHP_EOL;
echo 'Utilización de RoundingMode::HalfTowardsZero con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::HalfTowardsZero));
var_dump(bcround(-1.55, 1, RoundingMode::HalfTowardsZero));

echo PHP_EOL;
echo 'Utilización de RoundingMode::HalfEven con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::HalfEven));
var_dump(bcround(-1.55, 1, RoundingMode::HalfEven));

echo PHP_EOL;
echo 'Utilización de RoundingMode::HalfOdd con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::HalfOdd));
var_dump(bcround(-1.55, 1, RoundingMode::HalfOdd));

echo PHP_EOL;
echo 'Utilización de RoundingMode::TowardsZero con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::TowardsZero));
var_dump(bcround(-1.55, 1, RoundingMode::TowardsZero));

echo PHP_EOL;
echo 'Utilización de RoundingMode::AwayFromZero con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::AwayFromZero));
var_dump(bcround(-1.55, 1, RoundingMode::AwayFromZero));

echo PHP_EOL;
echo 'Utilización de RoundingMode::NegativeInfinity con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::NegativeInfinity));
var_dump(bcround(-1.55, 1, RoundingMode::NegativeInfinity));

echo PHP_EOL;
echo 'Utilización de RoundingMode::PositiveInfinity con una precisión decimal de 1' . PHP_EOL;
var_dump(bcround( 1.55, 1, RoundingMode::PositiveInfinity));
var_dump(bcround(-1.55, 1, RoundingMode::PositiveInfinity));
?&gt;

El ejemplo anterior mostrará:

Utilización de RoundingMode::HalfAwayFromZero con una precisión decimal de 1
string(3) "1.6"
string(4) "-1.6"

Utilización de RoundingMode::HalfTowardsZero con una precisión decimal de 1
string(3) "1.5"
string(4) "-1.5"

Utilización de RoundingMode::HalfEven con una precisión decimal de 1
string(3) "1.6"
string(4) "-1.6"

Utilización de RoundingMode::HalfOdd con una precisión decimal de 1
string(3) "1.5"
string(4) "-1.5"

Utilización de RoundingMode::TowardsZero con una precisión decimal de 1
string(3) "1.5"
string(4) "-1.5"

Utilización de RoundingMode::AwayFromZero con una precisión decimal de 1
string(3) "1.6"
string(4) "-1.6"

Utilización de RoundingMode::NegativeInfinity con una precisión decimal de 1
string(3) "1.5"
string(4) "-1.6"

Utilización de RoundingMode::PositiveInfinity con una precisión decimal de 1
string(3) "1.6"
string(4) "-1.5"

### Ver también

- [bcceil()](#function.bcceil) - Redondea al alza un número de precisión arbitraria

- [bcfloor()](#function.bcfloor) - Redondea hacia abajo un número de precisión arbitraria

- [BcMath\Number::round()](#bcmath-number.round) - Redondea un número de precisión arbitraria

# bcscale

(PHP 4, PHP 5, PHP 7, PHP 8)

bcscale — Define o recupera la precisión por defecto para todas las funciones bc math

### Descripción

**bcscale**([int](#language.types.integer) $scale): [int](#language.types.integer)

Define la precisión por defecto para todas las llamadas posteriores a las funciones
bc math que omiten el argumento de precisión.

**bcscale**([null](#language.types.null) $scale = **[null](#constant.null)**): [int](#language.types.integer)

Recupera el factor de precisión actual.

### Parámetros

     scale


       El factor de precisión.





### Valores devueltos

Retorna la precisión anterior cuando se utiliza como definidor.
De lo contrario, se retorna la precisión actual.

### Errores/Excepciones

Esta función levanta una excepción [ValueError](#class.valueerror) si scale
está fuera del rango válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.




      7.3.0

       **bcscale()** ahora puede ser utilizada para recuperar
       la precisión actual; cuando se utiliza para definir una nueva
       precisión, ahora retorna la precisión anterior.
       Anteriormente, scale era obligatorio,
       y **bcscale()** siempre retornaba **[true](#constant.true)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con bcscale()**

&lt;?php

// precisión por defecto: 3
bcscale(3);
echo bcdiv('105', '6.55957'); // 16.007

// lo mismo sin utilizar bcscale()
echo bcdiv('105', '6.55957', 3); // 16.007

?&gt;

# bcsqrt

(PHP 4, PHP 5, PHP 7, PHP 8)

bcsqrt — Obtiene la raiz cuadrada de un número de precisión arbitraria

### Descripción

**bcsqrt**([string](#language.types.string) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Devuelve la raiz cudrada de num.

### Parámetros

     num


       El operando, como un string numérico con formato válido de BCMath.






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

Devuelve la raiz cuadrada como un string numérico con formato válido de BCMath.

### Errores/Excepciones

Esta función lanza un [ValueError](#class.valueerror) en los siguientes casos:

    - num no es un string numérico con formato válido de BCMath

    - num es menor que 0

    - scale está fuera del rango válido

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si num no es un string numérico con formato válido de BCMath,
       o es menor que 0, se lanza un [ValueError](#class.valueerror).
       Anteriormente, se emitía **[E_WARNING](#constant.e-warning)** en su lugar.




      8.0.0

       scale ahora necesita ser entre 0
       y 2147483647; anteriormente, las escalas negativas se trataban
       silenciosamente como 0.




      8.0.0

       scale ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo de bcsqrt()**

&lt;?php

echo bcsqrt('2', 3); // 1.414

?&gt;

### Ver también

    - [bcpow()](#function.bcpow) - Elevar un número de precisión arbitraria a otro

    - [BcMath\Number::sqrt()](#bcmath-number.sqrt) - Devuelve la raíz cuadrada de un número de precisión arbitraria

# bcsub

(PHP 4, PHP 5, PHP 7, PHP 8)

bcsub — Resta un número de precisión arbitraria de otro

### Descripción

**bcsub**([string](#language.types.string) $num1, [string](#language.types.string) $num2, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [string](#language.types.string)

Resta num2 de num1.

### Parámetros

     num1


       El operador izquierdo, como una cadena.






     num2


       El operador derecho, como una cadena






     scale


       Este parámetro se utiliza para establecer el número de dígitos después del punto decimal en el resultado.
       Si es **[null](#constant.null)**, se establecerá por defecto en la escala predeterminada establecida con [bcscale()](#function.bcscale),
       o se utilizará el valor de la directiva INI
       [bcmath.scale](#ini.bcmath.scale).



### Valores devueltos

El resultado de la resta, como un string.

### Errores/Excepciones

Esta función lanza una excepción [ValueError](#class.valueerror) en los siguientes casos:

    -
     num1 o num2
     no es una cadena numérica bien formada de BCMath.


    -
     scale está fuera del rango válido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       scale ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo de bcsub()**

&lt;?php

$a = '1.234';
$b = '5';

echo bcsub($a, $b);     // -3
echo bcsub($a, $b, 4); // -3.7660

?&gt;

### Ver también

    - [bcadd()](#function.bcadd) - Suma dos números de precisión arbitrária

    - [BcMath\Number::sub()](#bcmath-number.sub) - Sustrae un número de precisión arbitraria

## Tabla de contenidos

- [bcadd](#function.bcadd) — Suma dos números de precisión arbitrária
- [bcceil](#function.bcceil) — Redondea al alza un número de precisión arbitraria
- [bccomp](#function.bccomp) — Comparar dos números de gran tamaño
- [bcdiv](#function.bcdiv) — Divide dos números de precisión arbitraria
- [bcdivmod](#function.bcdivmod) — Devuelve el cociente y el resto de un número de precisión arbitraria
- [bcfloor](#function.bcfloor) — Redondea hacia abajo un número de precisión arbitraria
- [bcmod](#function.bcmod) — Devuelve el resto de una división entre números de gran tamaño
- [bcmul](#function.bcmul) — Multiplica dos números de precisión arbitraria
- [bcpow](#function.bcpow) — Elevar un número de precisión arbitraria a otro
- [bcpowmod](#function.bcpowmod) — Eleva un número de precisión arbitraria a otro, reducido por un módulo especificado
- [bcround](#function.bcround) — Redondea un número de precisión arbitraria
- [bcscale](#function.bcscale) — Define o recupera la precisión por defecto para todas las funciones bc math
- [bcsqrt](#function.bcsqrt) — Obtiene la raiz cuadrada de un número de precisión arbitraria
- [bcsub](#function.bcsub) — Resta un número de precisión arbitraria de otro

# La clase BcMath\Number

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una clase para un número de precisión arbitraria.
    Estos objetos soportan los operadores
    [aritméticos](#language.operators.arithmetic) y
    [de comparación](#language.operators.comparison).

**Nota**:

     Esta clase no se ve afectada por la directiva INI
     [bcmath.scale](#ini.bcmath.scale)
     definida en el php.ini.

**Nota**:

     El comportamiento de un operador sobrecargado es el mismo que especificar **[null](#constant.null)** para el
     argumento scale en el método correspondiente.

## Sinopsis de la Clase

     final
     readonly
     class **BcMath\Number**



     implements
      [Stringable](#class.stringable) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$value](#bcmath-number.props.value);

    public
     [int](#language.types.integer)
      [$scale](#bcmath-number.props.scale);


    /* Métodos */

public [\_\_construct](#bcmath-number.construct)([string](#language.types.string)|[int](#language.types.integer) $num)

    public [add](#bcmath-number.add)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

public [ceil](#bcmath-number.ceil)(): [BcMath\Number](#class.bcmath-number)
public [compare](#bcmath-number.compare)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [int](#language.types.integer)
public [div](#bcmath-number.div)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [divmod](#bcmath-number.divmod)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [array](#language.types.array)
public [floor](#bcmath-number.floor)(): [BcMath\Number](#class.bcmath-number)
public [mod](#bcmath-number.mod)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [mul](#bcmath-number.mul)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [pow](#bcmath-number.pow)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $exponent, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [powmod](#bcmath-number.powmod)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $exponent, [BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $modulus, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [round](#bcmath-number.round)([int](#language.types.integer) $precision = 0, [RoundingMode](#enum.roundingmode) $mode = RoundingMode::HalfAwayFromZero): [BcMath\Number](#class.bcmath-number)
public [\_\_serialize](#bcmath-number.serialize)(): [array](#language.types.array)
public [sqrt](#bcmath-number.sqrt)([?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [sub](#bcmath-number.sub)([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)
public [\_\_toString](#bcmath-number.tostring)(): [string](#language.types.string)
public [\_\_unserialize](#bcmath-number.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

## Propiedades

     value


       Una representación en string de un número de precisión arbitraria.




     scale


       El valor de la escala actualmente definida en el objeto.
       Para los objetos resultantes de cálculos, este valor se calcula y define automáticamente,
       a menos que el argumento scale haya sido definido en el método de cálculo.



# BcMath\Number::add

(PHP 8 &gt;= 8.4.0)

BcMath\Number::add — Añadir un número de precisión arbitraria

### Descripción

public **BcMath\Number::add**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Añade $this y num.

### Parámetros

    num


      El valor a añadir.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el resultado de la adición en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado es definido automáticamente,
el mayor [BcMath\Number::scale](#bcmath-number.props.scale) de los dos números utilizados para la adición es utilizado.

Es decir, si los [BcMath\Number::scale](#bcmath-number.props.scale) de dos valores son 2
y 5 respectivamente, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado
será 5.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::add()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;add(new BcMath\Number('2.34567'));
$ret2 = $number-&gt;add('-3.456');
$ret3 = $number-&gt;add(7);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(7) "3.57967"
["scale"]=&gt;
int(5)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(6) "-2.222"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(5) "8.234"
["scale"]=&gt;
int(3)
}

**Ejemplo #2 Ejemplo de BcMath\Number::add()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;add(new BcMath\Number('2.34567'), 1);
$ret2 = $number-&gt;add('-3.456', 10);
$ret3 = $number-&gt;add(7, 0);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(3) "3.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(13) "-2.2220000000"
["scale"]=&gt;
int(10)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcadd()](#function.bcadd) - Suma dos números de precisión arbitrária

- [BcMath\Number::sub()](#bcmath-number.sub) - Sustrae un número de precisión arbitraria

# BcMath\Number::ceil

(PHP 8 &gt;= 8.4.0)

BcMath\Number::ceil — Redondea al alza un número de precisión arbitraria

### Descripción

public **BcMath\Number::ceil**(): [BcMath\Number](#class.bcmath-number)

Devuelve el valor entero superior redondeando al alza
$this si es necesario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el resultado como un nuevo objeto [BcMath\Number](#class.bcmath-number).
La [BcMath\Number::scale](#bcmath-number.props.scale) del resultado es siempre 0.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::ceil()**

&lt;?php
$num1 = new BcMath\Number('4.3')-&gt;ceil();
$num2 = new BcMath\Number('9.999')-&gt;ceil();
$num3 = new BcMath\Number('-3.14')-&gt;ceil();

var_dump($num1, $num2, $num3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "5"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(2) "10"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(2) "-3"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcceil()](#function.bcceil) - Redondea al alza un número de precisión arbitraria

- [BcMath\Number::floor()](#bcmath-number.floor) - Redondea hacia abajo un número de precisión arbitraria

- [BcMath\Number::round()](#bcmath-number.round) - Redondea un número de precisión arbitraria

# BcMath\Number::compare

(PHP 8 &gt;= 8.4.0)

BcMath\Number::compare — Comparar dos números de precisión arbitraria

### Descripción

public **BcMath\Number::compare**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [int](#language.types.integer)

Comparar dos números de precisión arbitraria.
Este método se comporta de manera similar al [operador spaceship](#language.operators.comparison).

### Parámetros

    num


      El valor al que comparar.




     scale


       Especifica el scale a utilizar para la comparación.
       Si **[null](#constant.null)**, todos los dígitos son utilizados en la comparación.



### Valores devueltos

Devuelve 0 si los dos números son iguales,
1 si $this es mayor que num,
de lo contrario -1.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::compare()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('1.234');

var_dump(
$number-&gt;compare(new BcMath\Number('1.234')),
$number-&gt;compare('1.23400'),
$number-&gt;compare('1.23401'),
$number-&gt;compare(1),
);
?&gt;

El ejemplo anterior mostrará:

int(0)
int(0)
int(-1)
int(1)

**Ejemplo #2 Ejemplo de BcMath\Number::compare()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('1.234');

var_dump(
$number-&gt;compare(new BcMath\Number('1.299'), 1),
$number-&gt;compare('1.24', 2),
$number-&gt;compare('1.22', 2),
$number-&gt;compare(1, 0),
);
?&gt;

El ejemplo anterior mostrará:

int(0)
int(-1)
int(1)
int(0)

### Ver también

- [bccomp()](#function.bccomp) - Comparar dos números de gran tamaño

# BcMath\Number::\_\_construct

(PHP 8 &gt;= 8.4.0)

BcMath\Number::\_\_construct — Crear un objeto BcMath\Number

### Descripción

public **BcMath\Number::\_\_construct**([string](#language.types.string)|[int](#language.types.integer) $num)

Crear un objeto [BcMath\Number](#class.bcmath-number) a partir de un valor [int](#language.types.integer) o [string](#language.types.string).

### Parámetros

    num


      Un valor [int](#language.types.integer) o [string](#language.types.string).
      Si num es un [int](#language.types.integer),
      la [BcMath\Number::scale](#bcmath-number.props.scale) se define siempre a 0.
      Si num es un [string](#language.types.string), debe ser un número válido,
      y la [BcMath\Number::scale](#bcmath-number.props.scale) se define automáticamente analizando el string.


### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) si num
es un [string](#language.types.string) y no es un string numérico BCMath bien formado.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::\_\_construct()**

&lt;?php
$num1 = new BcMath\Number(100);
$num2 = new BcMath\Number('-200');
$num3 = new BcMath\Number('300.00');

var_dump($num1, $num2, $num3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(3) "100"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(4) "-200"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(6) "300.00"
["scale"]=&gt;
int(2)
}

### Ver también

- [BcMath\Number::\_\_serialize()](#bcmath-number.serialize) - Serializa un objeto BcMath\Number

- [BcMath\Number::\_\_unserialize()](#bcmath-number.unserialize) - Deserializa un argumento de datos en un objeto BcMath\Number

# BcMath\Number::div

(PHP 8 &gt;= 8.4.0)

BcMath\Number::div — Divide por un número de precisión arbitraria

### Descripción

public **BcMath\Number::div**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Divide $this por num.

### Parámetros

    num


      El divisor.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el resultado de una división en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se define automáticamente,
se utiliza el [BcMath\Number::scale](#bcmath-number.props.scale) del dividendo. Sin embargo, en casos
como la división indivisible, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se extiende.
La extensión se realiza solo si es necesario, hasta un máximo de +10.

Es decir, si el [BcMath\Number::scale](#bcmath-number.props.scale) del dividendo es 5,
el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está entre 5 y 15.

Incluso en cálculos indivisibles, el [BcMath\Number::scale](#bcmath-number.props.scale) no siempre
será +10.
Un 0 al final del resultado se considera que no necesita extensión, por lo que
el [BcMath\Number::scale](#bcmath-number.props.scale) se reduce en esa cantidad. El [BcMath\Number::scale](#bcmath-number.props.scale) nunca será inferior al
[BcMath\Number::scale](#bcmath-number.props.scale) antes de la extensión. Véase también los [ejemplos de código](#bcmath-number.div.example.expansion-scale).

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

    - [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está fuera del rango válido

Este método lanza una [DivisionByZeroError](#class.divisionbyzeroerror) si
num es 0.

### Ejemplos

**Ejemplo #1 Ejemplo BcMath\Number::div()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('0.002');

$ret1 = $number-&gt;div(new BcMath\Number('2.000'));
$ret2 = $number-&gt;div('-3');
$ret3 = $number-&gt;div(32);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "0.002"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(5) "0.001"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(16) "-0.0006666666666"
["scale"]=&gt;
int(13)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(9) "0.0000625"
["scale"]=&gt;
int(7)
}

**Ejemplo #2 Ejemplo de BcMath\Number::div()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('0.002');

$ret1 = $number-&gt;div(new BcMath\Number('2.000'), 15);
$ret2 = $number-&gt;div('-3', 5);
$ret3 = $number-&gt;div(32, 2);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "0.002"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(17) "0.001000000000000"
["scale"]=&gt;
int(15)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(8) "-0.00066"
["scale"]=&gt;
int(5)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(4) "0.00"
["scale"]=&gt;
int(2)
}

**Ejemplo #3 Ejemplo de BcMath\Number::div()** expandiendo [BcMath\Number::scale](#bcmath-number.props.scale) del objeto resultado

&lt;?php
var_dump(
new BcMath\Number('0.001')-&gt;div('10001'),
new BcMath\Number('0.001')-&gt;div('10001', 13),
new BcMath\Number('0.001')-&gt;div('100000000000001'),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(13) "0.00000009999"
["scale"]=&gt;
int(11)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(15) "0.0000000999900"
["scale"]=&gt;
int(13)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(5) "0.000"
["scale"]=&gt;
int(3)
}

### Ver también

- [bcdiv()](#function.bcdiv) - Divide dos números de precisión arbitraria

- [BcMath\Number::divmod()](#bcmath-number.divmod) - Devuelve el cociente y el módulo de un número de precisión arbitraria

- [BcMath\Number::mod()](#bcmath-number.mod) - Devuelve el módulo de un número de precisión arbitraria

- [BcMath\Number::sqrt()](#bcmath-number.sqrt) - Devuelve la raíz cuadrada de un número de precisión arbitraria

- [BcMath\Number::pow()](#bcmath-number.pow) - Eleva un número de precisión arbitraria

- [BcMath\Number::mul()](#bcmath-number.mul) - Multiplica un número de precisión arbitraria

# BcMath\Number::divmod

(PHP 8 &gt;= 8.4.0)

BcMath\Number::divmod — Devuelve el cociente y el módulo de un número de precisión arbitraria

### Descripción

public **BcMath\Number::divmod**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [array](#language.types.array)

Devuelve el cociente y el módulo de la división de $this por num.

### Parámetros

    num


      El divisor.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve un [array](#language.types.array) indexado donde el primer elemento es el cociente en forma de un nuevo objeto
[BcMath\Number](#class.bcmath-number) y el segundo elemento es el módulo en forma de un nuevo objeto
[BcMath\Number](#class.bcmath-number).

El cociente es siempre un valor entero, por lo que [BcMath\Number::scale](#bcmath-number.props.scale) del cociente será
siempre 0, independientemente de si scale es explícitamente especificado.

Si scale es explícitamente especificado, [BcMath\Number::scale](#bcmath-number.props.scale) del
módulo será el valor especificado.
Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del objeto de módulo del resultado es definido automáticamente,
el mayor [BcMath\Number::scale](#bcmath-number.props.scale) de los dos números utilizados para la operación de módulo es utilizado.

Es decir, si los [BcMath\Number::scale](#bcmath-number.props.scale)s de dos valores son 2
y 5 respectivamente, el [BcMath\Number::scale](#bcmath-number.props.scale) del módulo
será 5.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

Este método lanza una [DivisionByZeroError](#class.divisionbyzeroerror) si
num es 0.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::divmod()** cuando scale no es especificado

&lt;?php
echo '8.3 / 2.22' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('8')-&gt;divmod(new BcMath\Number('2.22'));
var_dump($quot, $rem);

echo PHP_EOL . '8.3 / 8.3' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('8.3')-&gt;divmod('8.3');
var_dump($quot, $rem);

echo PHP_EOL . '10 / -3' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('10')-&gt;divmod(-3);
var_dump($quot, $rem);
?&gt;

El ejemplo anterior mostrará:

8.3 / 2.22
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "3"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(4) "1.34"
["scale"]=&gt;
int(2)
}

8.3 / 8.3
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "1"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(3) "0.0"
["scale"]=&gt;
int(1)
}

10 / -3
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(2) "-3"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(1) "1"
["scale"]=&gt;
int(0)
}

**Ejemplo #2 Ejemplo de BcMath\Number::divmod()** especificando scale explícitamente

&lt;?php
echo '8.3 / 2.22' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('8')-&gt;divmod(new BcMath\Number('2.22'), 1);
var_dump($quot, $rem);

echo PHP_EOL . '8.3 / 8.3' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('8.3')-&gt;divmod('8.3', 4);
var_dump($quot, $rem);

echo PHP_EOL . '10 / -3' . PHP_EOL;
[$quot, $rem] = new BcMath\Number('10')-&gt;divmod(-3, 5);
var_dump($quot, $rem);
?&gt;

El ejemplo anterior mostrará:

8.3 / 2.22
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "3"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.3"
["scale"]=&gt;
int(1)
}

8.3 / 8.3
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "1"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(6) "0.0000"
["scale"]=&gt;
int(4)
}

10 / -3
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(2) "-3"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(7) "1.00000"
["scale"]=&gt;
int(5)
}

### Ver también

- [bcdivmod()](#function.bcdivmod) - Devuelve el cociente y el resto de un número de precisión arbitraria

- [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

- [BcMath\Number::mod()](#bcmath-number.mod) - Devuelve el módulo de un número de precisión arbitraria

# BcMath\Number::floor

(PHP 8 &gt;= 8.4.0)

BcMath\Number::floor — Redondea hacia abajo un número de precisión arbitraria

### Descripción

public **BcMath\Number::floor**(): [BcMath\Number](#class.bcmath-number)

Devuelve el valor entero inferior siguiente redondeando hacia abajo
$this si es necesario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el resultado como un nuevo objeto [BcMath\Number](#class.bcmath-number).
La [BcMath\Number::scale](#bcmath-number.props.scale) del resultado es siempre 0.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::floor()**

&lt;?php
$num1 = new BcMath\Number('4.3')-&gt;floor();
$num2 = new BcMath\Number('9.999')-&gt;floor();
$num3 = new BcMath\Number('-3.14')-&gt;floor();

var_dump($num1, $num2, $num3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "4"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(2) "-4"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcfloor()](#function.bcfloor) - Redondea hacia abajo un número de precisión arbitraria

- [BcMath\Number::ceil()](#bcmath-number.ceil) - Redondea al alza un número de precisión arbitraria

- [BcMath\Number::round()](#bcmath-number.round) - Redondea un número de precisión arbitraria

# BcMath\Number::mod

(PHP 8 &gt;= 8.4.0)

BcMath\Number::mod — Devuelve el módulo de un número de precisión arbitraria

### Descripción

public **BcMath\Number::mod**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Devuelve el resto de la división de $this por num.
Excepto si num es 0, el resultado tiene el mismo signo
que $this.

### Parámetros

    num


      El divisor.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el módulo en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se define automáticamente,
se utiliza el mayor [BcMath\Number::scale](#bcmath-number.props.scale) de los dos números utilizados para la operación de módulo.

Es decir, si los [BcMath\Number::scale](#bcmath-number.props.scale) de dos valores son 2
y 5 respectivamente, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado
será 5.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

Este método lanza una [DivisionByZeroError](#class.divisionbyzeroerror) si
num es 0.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::mod()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('8.3');

$ret1 = $number-&gt;mod(new BcMath\Number('2.22'));
$ret2 = $number-&gt;mod('8.3');
$ret3 = $number-&gt;mod(-5);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(3) "8.3"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(4) "1.64"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(3) "0.0"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "3.3"
["scale"]=&gt;
int(1)
}

**Ejemplo #2 Ejemplo de BcMath\Number::mod()** definiendo scale explícitamente

&lt;?php
$number = new BcMath\Number('8.3');

$ret1 = $number-&gt;mod(new BcMath\Number('2.22'), 1);
$ret2 = $number-&gt;mod('8.3', 3);
$ret3 = $number-&gt;mod(-5, 0);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(3) "8.3"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(3) "1.6"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(5) "0.000"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "3"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcmod()](#function.bcmod) - Devuelve el resto de una división entre números de gran tamaño

- [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

- [BcMath\Number::divmod()](#bcmath-number.divmod) - Devuelve el cociente y el módulo de un número de precisión arbitraria

- [BcMath\Number::powmod()](#bcmath-number.powmod) - Eleva un número de precisión arbitraria, reducido por un módulo especificado

# BcMath\Number::mul

(PHP 8 &gt;= 8.4.0)

BcMath\Number::mul — Multiplica un número de precisión arbitraria

### Descripción

public **BcMath\Number::mul**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Multiplica $this por num.

### Parámetros

    num


      El multiplicador.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el resultado de la multiplicación como un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando la [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se establece automáticamente,
se utiliza la suma de las [BcMath\Number::scale](#bcmath-number.props.scale)s de los dos valores utilizados para la multiplicación.

Es decir, si las [BcMath\Number::scale](#bcmath-number.props.scale)s de dos valores son 2
y 5 respectivamente, la [BcMath\Number::scale](#bcmath-number.props.scale) del resultado
será 7.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

    - [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está fuera del rango válido

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::mul()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;mul(new BcMath\Number('2.3456'));
$ret2 = $number-&gt;mul('-3.4');
$ret3 = $number-&gt;mul(7);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(9) "2.8944704"
["scale"]=&gt;
int(7)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(7) "-4.1956"
["scale"]=&gt;
int(4)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(5) "8.638"
["scale"]=&gt;
int(3)
}

**Ejemplo #2 Ejemplo de BcMath\Number::mul()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;mul(new BcMath\Number('2.3456'), 1);
$ret2 = $number-&gt;mul('-3.4', 10);
$ret3 = $number-&gt;mul(7, 0);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(3) "2.8"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(13) "-4.1956000000"
["scale"]=&gt;
int(10)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcmul()](#function.bcmul) - Multiplica dos números de precisión arbitraria

- [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

- [BcMath\Number::pow()](#bcmath-number.pow) - Eleva un número de precisión arbitraria

- [BcMath\Number::powmod()](#bcmath-number.powmod) - Eleva un número de precisión arbitraria, reducido por un módulo especificado

# BcMath\Number::pow

(PHP 8 &gt;= 8.4.0)

BcMath\Number::pow — Eleva un número de precisión arbitraria

### Descripción

public **BcMath\Number::pow**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $exponent, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Eleva $this a la potencia exponent.

### Parámetros

    exponent


       El exponente. Debe ser un valor sin parte fraccionaria.
       El rango válido del exponent es específico de la plataforma,
       pero es al menos de -2147483648 a 2147483647.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el valor de la potencia como un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se establece automáticamente,
según el valor de exponent, el [BcMath\Number::scale
](#bcmath-number.props.scale%0A%20%20%20) del resultado será como sigue:

       exponent
       [BcMath\Number::scale](#bcmath-number.props.scale) del resultado






       positive
       ([BcMath\Number::scale](#bcmath-number.props.scale) de la potencia base) * (el valor del exponent)



       0
       0



       negative
       Entre ([BcMath\Number::scale](#bcmath-number.props.scale) de la potencia base) y ([BcMath\Number::scale
       ](#bcmath-number.props.scale%0A%20%20%20%20%20%20%20) de la potencia base + 10)




Si se produce una división indivisible debido a un exponent negativo, el [
BcMath\Number::scale](#%0A%20%20%20bcmath-number.props.scale) del resultado se extiende. La extensión se realiza solo si es necesario, hasta
un máximo de +10.
Este comportamiento es el mismo que [BcMath\Number::div()](#bcmath-number.div), por lo que se debe consultar esto para más detalles.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - exponent es un [string](#language.types.string) no es una cadena BCMath bien formada

    - exponent tiene una parte fraccionaria

    - exponent o scale está fuera del rango válido

    - El [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está fuera del rango válido

Este método lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror) si el valor de $this
es 0 y exponent es un valor negativo.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::pow()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('3.0');

$ret1 = $number-&gt;pow(new BcMath\Number('5'));
$ret2 = $number-&gt;pow('-1');
$ret3 = $number-&gt;pow(0);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(3) "3.0"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(9) "243.00000"
["scale"]=&gt;
int(5)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(13) "0.33333333333"
["scale"]=&gt;
int(11)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "1"
["scale"]=&gt;
int(0)
}

**Ejemplo #2 Ejemplo de BcMath\Number::pow()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('3.0');

$ret1 = $number-&gt;pow(new BcMath\Number('5'), 0);
$ret2 = $number-&gt;pow('-1', 2);
$ret3 = $number-&gt;pow(0, 10);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(3) "3.0"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(3) "243"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(4) "0.33"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(12) "1.0000000000"
["scale"]=&gt;
int(10)
}

### Ver también

- [bcpow()](#function.bcpow) - Elevar un número de precisión arbitraria a otro

- [BcMath\Number::powmod()](#bcmath-number.powmod) - Eleva un número de precisión arbitraria, reducido por un módulo especificado

- [BcMath\Number::mul()](#bcmath-number.mul) - Multiplica un número de precisión arbitraria

- [BcMath\Number::sqrt()](#bcmath-number.sqrt) - Devuelve la raíz cuadrada de un número de precisión arbitraria

- [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

# BcMath\Number::powmod

(PHP 8 &gt;= 8.4.0)

BcMath\Number::powmod — Eleva un número de precisión arbitraria, reducido por un módulo especificado

### Descripción

public **BcMath\Number::powmod**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $exponent, [BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $modulus, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Utiliza el método rápido de exponentiación para elevar $this a la potencia
exponent en relación con el módulo modulus.

### Parámetros

    exponent


       El exponente, como no negativo e integral (es decir, la escala debe ser cero).




    modulus


       El módulo, como integral (es decir, la escala debe ser cero).




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el resultado en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando la propiedad [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se establece automáticamente,
se utiliza la mayor [BcMath\Number::scale](#bcmath-number.props.scale) de los tres números utilizados para la operación de módulo.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - exponent o modulus es un [string](#language.types.string) y no es
    una cadena numérica BCMath bien formada

    - $this, exponent o modulus tiene una parte fraccionaria

    - exponent es un valor negativo

    - scale está fuera del rango válido

Este método lanza una excepción [DivisionByZeroError](#class.divisionbyzeroerror) si modulus
es 0.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::powmod()** cuando scale no está especificado

&lt;?php
var_dump(
new BcMath\Number('8')-&gt;powmod(new BcMath\Number('3'), 5),
new BcMath\Number('-8')-&gt;powmod(new BcMath\Number('3'), 5),
new BcMath\Number('8')-&gt;powmod('2', -3),
new BcMath\Number('-8')-&gt;powmod(5, 7),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "2"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(2) "-2"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "1"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(2) "-1"
["scale"]=&gt;
int(0)
}

**Ejemplo #2 Ejemplo de BcMath\Number::powmod()** especificando scale explícitamente

&lt;?php
var_dump(
new BcMath\Number('8')-&gt;powmod(new BcMath\Number('3'), 5, 1),
new BcMath\Number('-8')-&gt;powmod(new BcMath\Number('3'), 5, 2),
new BcMath\Number('8')-&gt;powmod('2', -3, 3),
new BcMath\Number('-8')-&gt;powmod(5, 7, 4),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(3) "2.0"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(5) "-2.00"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(5) "1.000"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(7) "-1.0000"
["scale"]=&gt;
int(4)
}

### Ver también

- [bcpowmod()](#function.bcpowmod) - Eleva un número de precisión arbitraria a otro, reducido por un módulo especificado

- [BcMath\Number::pow()](#bcmath-number.pow) - Eleva un número de precisión arbitraria

- [BcMath\Number::mod()](#bcmath-number.mod) - Devuelve el módulo de un número de precisión arbitraria

# BcMath\Number::round

(PHP 8 &gt;= 8.4.0)

BcMath\Number::round — Redondea un número de precisión arbitraria

### Descripción

public **BcMath\Number::round**([int](#language.types.integer) $precision = 0, [RoundingMode](#enum.roundingmode) $mode = RoundingMode::HalfAwayFromZero): [BcMath\Number](#class.bcmath-number)

Devuelve el valor redondeado de $this
a la precisión especificada
(el número de dígitos después del punto decimal).
precisión puede ser también negativo o nulo (por omisión).

### Parámetros

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


      Especifica el método de redondeo. Para más información sobre los métodos, ver [RoundingMode](#enum.roundingmode).


### Valores devueltos

Devuelve el resultado en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) si se especifica un mode inválido.

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::round()**

&lt;?php
var_dump(
new BcMath\Number('3.4')-&gt;round(),
new BcMath\Number('3.5')-&gt;round(),
new BcMath\Number('3.6')-&gt;round(),
new BcMath\Number('3.6')-&gt;round(0),
new BcMath\Number('5.045')-&gt;round(2),
new BcMath\Number('5.055')-&gt;round(2),
new BcMath\Number('345')-&gt;round(-2),
new BcMath\Number('345')-&gt;round(-3),
new BcMath\Number('678')-&gt;round(-2),
new BcMath\Number('678')-&gt;round(-3),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(1) "3"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "4"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "4"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(1) "4"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#6 (2) {
["value"]=&gt;
string(4) "5.05"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#7 (2) {
["value"]=&gt;
string(4) "5.06"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#8 (2) {
["value"]=&gt;
string(3) "300"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#9 (2) {
["value"]=&gt;
string(1) "0"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#10 (2) {
["value"]=&gt;
string(3) "700"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#11 (2) {
["value"]=&gt;
string(4) "1000"
["scale"]=&gt;
int(0)
}

**Ejemplo #2
Ejemplo de uso de BcMath\Number::round()** con diferentes valores de precisión

&lt;?php
$number = new BcMath\Number('123.45');

var_dump(
$number-&gt;round(3),
$number-&gt;round(2),
$number-&gt;round(1),
$number-&gt;round(0),
$number-&gt;round(-1),
$number-&gt;round(-2),
$number-&gt;round(-3),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(7) "123.450"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(6) "123.45"
["scale"]=&gt;
int(2)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(5) "123.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(3) "123"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#6 (2) {
["value"]=&gt;
string(3) "120"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#7 (2) {
["value"]=&gt;
string(3) "100"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#8 (2) {
["value"]=&gt;
string(1) "0"
["scale"]=&gt;
int(0)
}

**Ejemplo #3
Ejemplo de uso de BcMath\Number::round()** con diferentes valores de mode

&lt;?php
echo 'Rounding modes with 9.5' . PHP_EOL;
$number = new BcMath\Number('9.5');
var_dump(
$number-&gt;round(0, RoundingMode::HalfAwayFromZero),
$number-&gt;round(0, RoundingMode::HalfTowardsZero),
$number-&gt;round(0, RoundingMode::HalfEven),
$number-&gt;round(0, RoundingMode::HalfOdd),
$number-&gt;round(0, RoundingMode::TowardsZero),
$number-&gt;round(0, RoundingMode::AwayFromZero),
$number-&gt;round(0, RoundingMode::NegativeInfinity),
$number-&gt;round(0, RoundingMode::PositiveInfinity),
);

echo PHP_EOL;
echo 'Rounding modes with 8.5' . PHP_EOL;
$number = new BcMath\Number('8.5');
var_dump(
$number-&gt;round(0, RoundingMode::HalfAwayFromZero),
$number-&gt;round(0, RoundingMode::HalfTowardsZero),
$number-&gt;round(0, RoundingMode::HalfEven),
$number-&gt;round(0, RoundingMode::HalfOdd),
$number-&gt;round(0, RoundingMode::TowardsZero),
$number-&gt;round(0, RoundingMode::AwayFromZero),
$number-&gt;round(0, RoundingMode::NegativeInfinity),
$number-&gt;round(0, RoundingMode::PositiveInfinity),
);
?&gt;

El ejemplo anterior mostrará:

Rounding modes with 9.5
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(2) "10"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#7 (2) {
["value"]=&gt;
string(2) "10"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#9 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#11 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#13 (2) {
["value"]=&gt;
string(2) "10"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#15 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#17 (2) {
["value"]=&gt;
string(2) "10"
["scale"]=&gt;
int(0)
}

Rounding modes with 8.5
object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#15 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#13 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#11 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#9 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#7 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(1) "8"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(1) "9"
["scale"]=&gt;
int(0)
}

**Ejemplo #4
Ejemplo de uso de BcMath\Number::round()** con diferentes valores de mode
especificando precisión

&lt;?php
$positive = new BcMath\Number('1.55');
$negative = new BcMath\Number('-1.55');

echo 'Using RoundingMode::HalfAwayFromZero with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::HalfAwayFromZero),
$negative-&gt;round(1, RoundingMode::HalfAwayFromZero),
);

echo PHP_EOL;
echo 'Using RoundingMode::HalfTowardsZero with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::HalfTowardsZero),
$negative-&gt;round(1, RoundingMode::HalfTowardsZero),
);

echo PHP_EOL;
echo 'Using RoundingMode::HalfEven with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::HalfEven),
$negative-&gt;round(1, RoundingMode::HalfEven),
);

echo PHP_EOL;
echo 'Using RoundingMode::HalfOdd with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::HalfOdd),
$negative-&gt;round(1, RoundingMode::HalfOdd),
);

echo PHP_EOL;
echo 'Using RoundingMode::TowardsZero with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::TowardsZero),
$negative-&gt;round(1, RoundingMode::TowardsZero),
);

echo PHP_EOL;
echo 'Using RoundingMode::AwayFromZero with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::AwayFromZero),
$negative-&gt;round(1, RoundingMode::AwayFromZero),
);

echo PHP_EOL;
echo 'Using RoundingMode::NegativeInfinity with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::NegativeInfinity),
$negative-&gt;round(1, RoundingMode::NegativeInfinity),
);

echo PHP_EOL;
echo 'Using RoundingMode::PositiveInfinity with 1 decimal digit precision' . PHP_EOL;
var_dump(
$positive-&gt;round(1, RoundingMode::PositiveInfinity),
$negative-&gt;round(1, RoundingMode::PositiveInfinity),
);
?&gt;

El ejemplo anterior mostrará:

Using RoundingMode::HalfAwayFromZero with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.6"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(4) "-1.6"
["scale"]=&gt;
int(1)
}

Using RoundingMode::HalfTowardsZero with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#6 (2) {
["value"]=&gt;
string(4) "-1.5"
["scale"]=&gt;
int(1)
}

Using RoundingMode::HalfEven with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.6"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#7 (2) {
["value"]=&gt;
string(4) "-1.6"
["scale"]=&gt;
int(1)
}

Using RoundingMode::HalfOdd with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#8 (2) {
["value"]=&gt;
string(4) "-1.5"
["scale"]=&gt;
int(1)
}

Using RoundingMode::TowardsZero with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#9 (2) {
["value"]=&gt;
string(4) "-1.5"
["scale"]=&gt;
int(1)
}

Using RoundingMode::AwayFromZero with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.6"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#10 (2) {
["value"]=&gt;
string(4) "-1.6"
["scale"]=&gt;
int(1)
}

Using RoundingMode::NegativeInfinity with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.5"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#11 (2) {
["value"]=&gt;
string(4) "-1.6"
["scale"]=&gt;
int(1)
}

Using RoundingMode::PositiveInfinity with 1 decimal digit precision
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(3) "1.6"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#12 (2) {
["value"]=&gt;
string(4) "-1.5"
["scale"]=&gt;
int(1)
}

### Ver también

- [bcround()](#function.bcround) - Redondea un número de precisión arbitraria

- [BcMath\Number::ceil()](#bcmath-number.ceil) - Redondea al alza un número de precisión arbitraria

- [BcMath\Number::floor()](#bcmath-number.floor) - Redondea hacia abajo un número de precisión arbitraria

# BcMath\Number::\_\_serialize

(PHP 8 &gt;= 8.4.0)

BcMath\Number::\_\_serialize — Serializa un objeto BcMath\Number

### Descripción

public **BcMath\Number::\_\_serialize**(): [array](#language.types.array)

Serializa $this.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [BcMath\Number::\_\_construct()](#bcmath-number.construct) - Crear un objeto BcMath\Number

- [BcMath\Number::\_\_unserialize()](#bcmath-number.unserialize) - Deserializa un argumento de datos en un objeto BcMath\Number

# BcMath\Number::sqrt

(PHP 8 &gt;= 8.4.0)

BcMath\Number::sqrt — Devuelve la raíz cuadrada de un número de precisión arbitraria

### Descripción

public **BcMath\Number::sqrt**([?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Devuelve la raíz cuadrada de $this.

### Parámetros

    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve la raíz cuadrada en forma de un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se define automáticamente,
el [BcMath\Number::scale](#bcmath-number.props.scale) de $this es utilizado. Sin embargo, en casos
tales como la división indivisible, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se extiende.
La expansión se realiza únicamente si es necesario, hasta un máximo de +10.
Este comportamiento es similar al de [BcMath\Number::div()](#bcmath-number.div), consulte esto para más detalles.

Es decir, si el [BcMath\Number::scale](#bcmath-number.props.scale) de este objeto es 5,
el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está entre 5 y 15.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - $this es un valor negativo

    - scale está fuera del rango válido

    - El [BcMath\Number::scale](#bcmath-number.props.scale) del resultado está fuera del rango válido

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::sqrt()**

&lt;?php
var_dump(
new BcMath\Number('2')-&gt;sqrt(),
new BcMath\Number('2')-&gt;sqrt(3),
new BcMath\Number('4')-&gt;sqrt(),
new BcMath\Number('4')-&gt;sqrt(3),
);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(12) "1.4142135623"
["scale"]=&gt;
int(10)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(5) "1.414"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(1) "2"
["scale"]=&gt;
int(0)
}
object(BcMath\Number)#5 (2) {
["value"]=&gt;
string(5) "2.000"
["scale"]=&gt;
int(3)
}

### Ver también

- [bcsqrt()](#function.bcsqrt) - Obtiene la raiz cuadrada de un número de precisión arbitraria

- [BcMath\Number::div()](#bcmath-number.div) - Divide por un número de precisión arbitraria

- [BcMath\Number::pow()](#bcmath-number.pow) - Eleva un número de precisión arbitraria

# BcMath\Number::sub

(PHP 8 &gt;= 8.4.0)

BcMath\Number::sub — Sustrae un número de precisión arbitraria

### Descripción

public **BcMath\Number::sub**([BcMath\Number](#class.bcmath-number)|[string](#language.types.string)|[int](#language.types.integer) $num, [?](#language.types.null)[int](#language.types.integer) $scale = **[null](#constant.null)**): [BcMath\Number](#class.bcmath-number)

Sustrae num de $this.

### Parámetros

    num


      El valor a sustraer.




    scale


      [BcMath\Number::scale](#bcmath-number.props.scale) especificado explícitamente para los resultados del cálculo.
      Si **[null](#constant.null)**, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado del cálculo será definido automáticamente.


### Valores devueltos

Devuelve el resultado de la sustracción como un nuevo objeto [BcMath\Number](#class.bcmath-number).

Cuando el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado se define automáticamente,
se utiliza el mayor [BcMath\Number::scale](#bcmath-number.props.scale) de los dos números utilizados para la sustracción.

Es decir, si los [BcMath\Number::scale](#bcmath-number.props.scale) de dos valores son 2
y 5 respectivamente, el [BcMath\Number::scale](#bcmath-number.props.scale) del resultado
será 5.

### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) en los siguientes casos:

    - num es un [string](#language.types.string) y no es una cadena numérica BCMath bien formada

    - scale está fuera del rango válido

### Ejemplos

**Ejemplo #1 Ejemplo de BcMath\Number::sub()** cuando scale no está especificado

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;sub(new BcMath\Number('2.34567'));
$ret2 = $number-&gt;sub('-3.456');
$ret3 = $number-&gt;sub(7);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(8) "-1.11167"
["scale"]=&gt;
int(5)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(5) "4.690"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(6) "-5.766"
["scale"]=&gt;
int(3)
}

**Ejemplo #2 Ejemplo de BcMath\Number::sub()** especificando scale explícitamente

&lt;?php
$number = new BcMath\Number('1.234');

$ret1 = $number-&gt;sub(new BcMath\Number('2.34567'), 1);
$ret2 = $number-&gt;sub('-3.456', 10);
$ret3 = $number-&gt;sub(7, 0);

var_dump($number, $ret1, $ret2, $ret3);
?&gt;

El ejemplo anterior mostrará:

object(BcMath\Number)#1 (2) {
["value"]=&gt;
string(5) "1.234"
["scale"]=&gt;
int(3)
}
object(BcMath\Number)#3 (2) {
["value"]=&gt;
string(4) "-1.1"
["scale"]=&gt;
int(1)
}
object(BcMath\Number)#2 (2) {
["value"]=&gt;
string(12) "4.6900000000"
["scale"]=&gt;
int(10)
}
object(BcMath\Number)#4 (2) {
["value"]=&gt;
string(2) "-5"
["scale"]=&gt;
int(0)
}

### Ver también

- [bcsub()](#function.bcsub) - Resta un número de precisión arbitraria de otro

- [BcMath\Number::add()](#bcmath-number.add) - Añadir un número de precisión arbitraria

# BcMath\Number::\_\_toString

(PHP 8 &gt;= 8.4.0)

BcMath\Number::\_\_toString — Convierte un BcMath\Number en string

### Descripción

public **BcMath\Number::\_\_toString**(): [string](#language.types.string)

Convierte un [BcMath\Number](#class.bcmath-number) en [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve [BcMath\Number::value](#bcmath-number.props.value) en forma de [string](#language.types.string).

# BcMath\Number::\_\_unserialize

(PHP 8 &gt;= 8.4.0)

BcMath\Number::\_\_unserialize — Deserializa un argumento de datos en un objeto BcMath\Number

### Descripción

public **BcMath\Number::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

Deserializa un argumento de datos en un objeto [BcMath\Number](#class.bcmath-number).

### Parámetros

    data


      El argumento de datos serializado como un [array](#language.types.array) asociativo.


### Errores/Excepciones

Este método lanza una [ValueError](#class.valueerror) si se pasan datos serializados inválidos.

### Ver también

- [BcMath\Number::\_\_construct()](#bcmath-number.construct) - Crear un objeto BcMath\Number

- **BcMath\Number::serialize()**

## Tabla de contenidos

- [BcMath\Number::add](#bcmath-number.add) — Añadir un número de precisión arbitraria
- [BcMath\Number::ceil](#bcmath-number.ceil) — Redondea al alza un número de precisión arbitraria
- [BcMath\Number::compare](#bcmath-number.compare) — Comparar dos números de precisión arbitraria
- [BcMath\Number::\_\_construct](#bcmath-number.construct) — Crear un objeto BcMath\Number
- [BcMath\Number::div](#bcmath-number.div) — Divide por un número de precisión arbitraria
- [BcMath\Number::divmod](#bcmath-number.divmod) — Devuelve el cociente y el módulo de un número de precisión arbitraria
- [BcMath\Number::floor](#bcmath-number.floor) — Redondea hacia abajo un número de precisión arbitraria
- [BcMath\Number::mod](#bcmath-number.mod) — Devuelve el módulo de un número de precisión arbitraria
- [BcMath\Number::mul](#bcmath-number.mul) — Multiplica un número de precisión arbitraria
- [BcMath\Number::pow](#bcmath-number.pow) — Eleva un número de precisión arbitraria
- [BcMath\Number::powmod](#bcmath-number.powmod) — Eleva un número de precisión arbitraria, reducido por un módulo especificado
- [BcMath\Number::round](#bcmath-number.round) — Redondea un número de precisión arbitraria
- [BcMath\Number::\_\_serialize](#bcmath-number.serialize) — Serializa un objeto BcMath\Number
- [BcMath\Number::sqrt](#bcmath-number.sqrt) — Devuelve la raíz cuadrada de un número de precisión arbitraria
- [BcMath\Number::sub](#bcmath-number.sub) — Sustrae un número de precisión arbitraria
- [BcMath\Number::\_\_toString](#bcmath-number.tostring) — Convierte un BcMath\Number en string
- [BcMath\Number::\_\_unserialize](#bcmath-number.unserialize) — Deserializa un argumento de datos en un objeto BcMath\Number

- [Introducción](#intro.bc)
- [Instalación/Configuración](#bc.setup)<li>[Instalación](#bc.installation)
- [Configuración en tiempo de ejecución](#bc.configuration)
  </li>- [Funciones de BC Math](#ref.bc)<li>[bcadd](#function.bcadd) — Suma dos números de precisión arbitrária
- [bcceil](#function.bcceil) — Redondea al alza un número de precisión arbitraria
- [bccomp](#function.bccomp) — Comparar dos números de gran tamaño
- [bcdiv](#function.bcdiv) — Divide dos números de precisión arbitraria
- [bcdivmod](#function.bcdivmod) — Devuelve el cociente y el resto de un número de precisión arbitraria
- [bcfloor](#function.bcfloor) — Redondea hacia abajo un número de precisión arbitraria
- [bcmod](#function.bcmod) — Devuelve el resto de una división entre números de gran tamaño
- [bcmul](#function.bcmul) — Multiplica dos números de precisión arbitraria
- [bcpow](#function.bcpow) — Elevar un número de precisión arbitraria a otro
- [bcpowmod](#function.bcpowmod) — Eleva un número de precisión arbitraria a otro, reducido por un módulo especificado
- [bcround](#function.bcround) — Redondea un número de precisión arbitraria
- [bcscale](#function.bcscale) — Define o recupera la precisión por defecto para todas las funciones bc math
- [bcsqrt](#function.bcsqrt) — Obtiene la raiz cuadrada de un número de precisión arbitraria
- [bcsub](#function.bcsub) — Resta un número de precisión arbitraria de otro
  </li>- [BcMath\Number](#class.bcmath-number) — La clase BcMath\Number<li>[BcMath\Number::add](#bcmath-number.add) — Añadir un número de precisión arbitraria
- [BcMath\Number::ceil](#bcmath-number.ceil) — Redondea al alza un número de precisión arbitraria
- [BcMath\Number::compare](#bcmath-number.compare) — Comparar dos números de precisión arbitraria
- [BcMath\Number::\_\_construct](#bcmath-number.construct) — Crear un objeto BcMath\Number
- [BcMath\Number::div](#bcmath-number.div) — Divide por un número de precisión arbitraria
- [BcMath\Number::divmod](#bcmath-number.divmod) — Devuelve el cociente y el módulo de un número de precisión arbitraria
- [BcMath\Number::floor](#bcmath-number.floor) — Redondea hacia abajo un número de precisión arbitraria
- [BcMath\Number::mod](#bcmath-number.mod) — Devuelve el módulo de un número de precisión arbitraria
- [BcMath\Number::mul](#bcmath-number.mul) — Multiplica un número de precisión arbitraria
- [BcMath\Number::pow](#bcmath-number.pow) — Eleva un número de precisión arbitraria
- [BcMath\Number::powmod](#bcmath-number.powmod) — Eleva un número de precisión arbitraria, reducido por un módulo especificado
- [BcMath\Number::round](#bcmath-number.round) — Redondea un número de precisión arbitraria
- [BcMath\Number::\_\_serialize](#bcmath-number.serialize) — Serializa un objeto BcMath\Number
- [BcMath\Number::sqrt](#bcmath-number.sqrt) — Devuelve la raíz cuadrada de un número de precisión arbitraria
- [BcMath\Number::sub](#bcmath-number.sub) — Sustrae un número de precisión arbitraria
- [BcMath\Number::\_\_toString](#bcmath-number.tostring) — Convierte un BcMath\Number en string
- [BcMath\Number::\_\_unserialize](#bcmath-number.unserialize) — Deserializa un argumento de datos en un objeto BcMath\Number
  </li>
