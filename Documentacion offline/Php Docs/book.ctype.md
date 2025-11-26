# Comprobación del tipo de carácter

# Introducción

Las funciones proporcionadas con esta extensión comprueban si un carácter
o string caen dentro de una cierta clase de caracteres según la
configuración regional en uso (véase también [setlocale()](#function.setlocale)).

Cuando estas funciones se invocan con un argumento de tipo integer,
se comportan exactamente como sus homólogas en C de
ctype.h.
Esto significa que si se pasa un valor de tipo integer menor que 256 se usará el
valor ASCII del mismo para ver si encaja en el rango especificado (los dígitos están en
el rango 0x30-0x39). Si el número está entre -128 y -1 inclusive, se añadirá 256
y la comprobación se hará sobre el resultado.

Cuando se invocan con un argumento de tipo string, comprobarán
cada carácter de la cadena y sólo devolverá
**[true](#constant.true)** si cada carácter de la cadena coincide con el
criterio solicitado. Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

Pasar cualquier cosa que no sea un valor de tipo string o integer
devolverá inmediatamente **[false](#constant.false)**.

Se debería observar que siempre son preferibles las funciones de ctype a las
expresiones regulares, e incluso a algunas funciones str*\* y is*\* equivalentes.
Esto es así por el hecho de que ctype usa una biblioteca nativa de C y
por lo tanto procesa significativamente más rápido.

**Nota**:

    Estas funciones no están relacionadas con la biblioteca "ctypes" de Python de ningún modo.
    El nombre de la extensión proviene del fichero de cabecera ctype.h
    de C donde están definidas sus equivalentes.




    Esta extensión también es anterior a 'ctypes' de Python, por lo que cualquier confusión
    causada por este nombre difícilmente es culpa de PHP

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ctype.requirements)
- [Instalación](#ctype.installation)

    ## Requerimientos

    Nada excepto las funciones de la biblioteca C estándar que están
    siempre disponibles.

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-ctype**

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

# Funciones de Ctype

# ctype_alnum

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_alnum — Chequear posibles caracteres alfanuméricos

### Descripción

**ctype_alnum**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Chequea si todos los caracteres en la [string](#language.types.string) entregada,
texto, son alfanuméricos.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter de texto es
o bien uno letra o un dígito, **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_alnum()** (usando la
    localización predeterminada)

&lt;?php
$cadenas = array('AbCd1zyZ9', 'foo!#$bar');
foreach ($cadenas as $caso_prueba) {
    if (ctype_alnum($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de letras o dígitos.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de letras o dígitos.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena AbCd1zyZ9 consiste completamente de letras o dígitos.
La cadena foo!#$bar no consiste completamente de letras o dígitos.

### Ver también

    - [ctype_alpha()](#function.ctype-alpha) - Chequear posibles caracteres alfabéticos

    - [ctype_digit()](#function.ctype-digit) - Chequear posibles caracteres numéricos

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [IntlChar::isalnum()](#intlchar.isalnum) - Verifica si un punto de código es un carácter alfanumérico

# ctype_alpha

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_alpha — Chequear posibles caracteres alfabéticos

### Descripción

**ctype_alpha**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string)
entregada,texto, son alfabéticos. En la
localización C estándar las letras se limitan a
[A-Za-z] y **ctype_alpha()** es
equivalente a (ctype_upper($texto) ||
   ctype_lower($texto)) si $texto es un caracter sencillo, aunque
otros idiomas usan letras que no son consideradas como mayúsculas ni
minúsculas.

### Parámetros

     text


       El string de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter de texto es una
letra de la localización actual, **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_alpha()** (usando la
     localización predeterminada)

&lt;?php
$cadenas = array('KjgWZC', 'arf12');
foreach ($cadenas as $caso_prueba) {
    if (ctype_alpha($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de letras.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de letras.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena KjgWZC consiste completamente de letras.
La cadena arf12 no consiste completamente de letras.

### Ver también

    - [ctype_upper()](#function.ctype-upper) - Chequear posibles caracteres en mayúscula

    - [ctype_lower()](#function.ctype-lower) - Chequear posibles caracteres en minúscula

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [IntlChar::isalpha()](#intlchar.isalpha) - Verifica si un punto de código es un carácter alfabético

# ctype_cntrl

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_cntrl — Chequear posibles caracteres de control

### Descripción

**ctype_cntrl**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son caracteres de control. Los caracteres
de control son, por ejemplo, la alimentación de línea, el tabulador,
escape.

### Parámetros

     text


       El string de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter de texto es un
caracter de control de la localización actual, **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_cntrl()**

&lt;?php
$cadenas = array('cadena1' =&gt; "\n\r\t", 'cadena2' =&gt; 'arf12');
foreach ($cadenas as $nombre =&gt; $caso_prueba) {
    if (ctype_cntrl($caso_prueba)) {
echo "La cadena '$nombre' consiste completamente de caracteres de control.\n";
    } else {
        echo "La cadena '$nombre' no consiste completamente de caracteres de control.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena 'cadena1' consiste completamente de caracteres de control.
La cadena 'cadena2' no consiste completamente de caracteres de control.

### Ver también

    - [ctype_print()](#function.ctype-print) - Chequear posibles caracteres imprimibles

    - [IntlChar::iscntrl()](#intlchar.iscntrl) - Verifica si un punto de código es un carácter de control

# ctype_digit

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_digit — Chequear posibles caracteres numéricos

### Descripción

**ctype_digit**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son numéricos.

### Parámetros

     text


       La cadena probada.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del texto es un
dígito decimal, o **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_digit()**

&lt;?php
$cadenas = array('1820.20', '10002', 'wsl!12');
foreach ($cadenas as $caso_prueba) {
    if (ctype_digit($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de dígitos.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de dígitos.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena 1820.20 no consiste completamente de dígitos.
La cadena 10002 consiste completamente de dígitos.
La cadena wsl!12 no consiste completamente de dígitos.

    **Ejemplo #2 Un ejemplo de ctype_digit()** comparando strings con integers

&lt;?php

$numeric_string = '42';
$integer = 42;

ctype_digit($numeric_string);  // true
ctype_digit($integer); // false (ASCII 42 es el caracter \*)

is_numeric($numeric_string);   // true
is_numeric($integer); // true
?&gt;

### Ver también

    - [ctype_alnum()](#function.ctype-alnum) - Chequear posibles caracteres alfanuméricos

    - [ctype_xdigit()](#function.ctype-xdigit) - Chequear posibles caracteres que representen un dígito hexadecimal

    - [is_numeric()](#function.is-numeric) - Determina si una variable es un número o una cadena numérica

    - [is_int()](#function.is-int) - Determina si una variable es de tipo integer

    - [is_string()](#function.is-string) - Determina si una variable es de tipo string

    - [IntlChar::isdigit()](#intlchar.isdigit) - Verifica si un punto de código es un dígito

# ctype_graph

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_graph — Chequear posibles caracteres imprimibles, con
excepción de los espacios

### Descripción

**ctype_graph**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, generan una salida visible.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del texto
es imprimible y genera alguna salida visible (no incluye los
espacios), o **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_graph()**

&lt;?php
$cadenas = array('cadena1' =&gt; "asdf\n\r\t", 'cadena2' =&gt; 'arf12', 'cadena3' =&gt; 'LKA#@%.54');
foreach ($cadenas as $nombre =&gt; $caso_prueba) {
    if (ctype_graph($caso_prueba)) {
echo "La cadena '$nombre' consiste completamente de caracteres (visiblemente) imprimibles.\n";
    } else {
        echo "La cadena '$nombre' no consiste completamente de caracteres (visiblemente) imprimibles.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena 'cadena1' no consiste completamente de caracteres (visiblemente) imprimibles.
La cadena 'cadena2' consiste completamente de caracteres (visiblemente) imprimibles.
La cadena 'cadena3' consiste completamente de caracteres (visiblemente) imprimibles.

### Ver también

    - [ctype_alnum()](#function.ctype-alnum) - Chequear posibles caracteres alfanuméricos

    - [ctype_print()](#function.ctype-print) - Chequear posibles caracteres imprimibles

    - [ctype_punct()](#function.ctype-punct) - Chequear posibles caracteres imprimibles que no son ni espacios en

blanco ni caracteres alfanuméricos

    - [IntlChar::isgraph()](#intlchar.isgraph) - Verifica si un punto de código es un carácter gráfico

# ctype_lower

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_lower — Chequear posibles caracteres en minúscula

### Descripción

**ctype_lower**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son letras minúsculas.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del texto
es una letra minúscula en la localidad actual.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_lower()** (usando la
    localidad predeterminada)

&lt;?php
$cadenas = array('aac123', 'qiutoas', 'QASsdks');
foreach ($cadenas as $caso_prueba) {
    if (ctype_lower($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de letras minúsculas.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de letras minúsculas.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena aac123 no consiste completamente de letras minúsculas.
La cadena qiutoas consiste completamente de letras minúsculas.
La cadena QASsdks no consiste completamente de letras minúsculas.

### Ver también

    - [ctype_alpha()](#function.ctype-alpha) - Chequear posibles caracteres alfabéticos

    - [ctype_upper()](#function.ctype-upper) - Chequear posibles caracteres en mayúscula

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [IntlChar::islower()](#intlchar.islower) - Verifica si un punto de código es una letra minúscula

# ctype_print

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_print — Chequear posibles caracteres imprimibles

### Descripción

**ctype_print**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son imprimibles.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del texto
genera realmente alguna salida (incluyendo los espacios). Devuelve
**[false](#constant.false)** si el texto incluye caracteres de
control o caracteres que no producen ninguna salida ni realizan
función de control alguna después de todo.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_print()**

&lt;?php
$cadenas = array('cadena1' =&gt; "asdf\n\r\t", 'cadena2' =&gt; 'arf12', 'cadena3' =&gt; 'LKA#@%.54');
foreach ($cadenas as $nombre =&gt; $caso_prueba) {
    if (ctype_print($caso_prueba)) {
echo "La cadena '$nombre' consiste completamente de caracteres imprimibles.\n";
    } else {
        echo "La cadena '$nombre' no consiste completamente de caracteres imprimibles.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena 'cadena1' no consiste completamente de caracteres imprimibles.
La cadena 'cadena2' consiste completamente de caracteres imprimibles.
La cadena 'cadena3' consiste completamente de caracteres imprimibles.

### Ver también

    - [ctype_cntrl()](#function.ctype-cntrl) - Chequear posibles caracteres de control

    - [ctype_graph()](#function.ctype-graph) - Chequear posibles caracteres imprimibles, con

excepción de los espacios

    - [ctype_punct()](#function.ctype-punct) - Chequear posibles caracteres imprimibles que no son ni espacios en

blanco ni caracteres alfanuméricos

    - [IntlChar::isprint()](#intlchar.isprint) - Verifica si un punto de código es un carácter imprimible

# ctype_punct

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_punct —
Chequear posibles caracteres imprimibles que no son ni espacios en
blanco ni caracteres alfanuméricos

### Descripción

**ctype_punct**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son caracteres de puntuación.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del text
es imprimible, pero no es una letra, dígito o espacio en
blanco; o **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_punct()**

&lt;?php
$cadenas = array('ABasdk!@!$#', '!@ # $', '*&amp;$()');
foreach ($cadenas as $caso_prueba) {
    if (ctype_punct($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de signos de puntuación.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de signos de puntuación.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena ABasdk!@!$# no consiste completamente de signos de puntuación.
La cadena !@ # $ no consiste completamente de signos de puntuación.
La cadena *&amp;$() consiste completamente de signos de puntuación.

### Ver también

    - [ctype_cntrl()](#function.ctype-cntrl) - Chequear posibles caracteres de control

    - [ctype_graph()](#function.ctype-graph) - Chequear posibles caracteres imprimibles, con

excepción de los espacios

    - [IntlChar::ispunct()](#intlchar.ispunct) - Verifica si un punto de código es un carácter de puntuación

# ctype_space

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_space — Chequear posibles caracteres de espacio en blanco

### Descripción

**ctype_space**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, crean espacios en blanco.

### Parámetros

     text


       El string de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del text
genera cierto tipo de espacio en blanco, o **[false](#constant.false)** de lo
contrario. Junto con el caracter regular de espacio en blanco,
también se consideran espacios a los caracteres de
tabulación, tabulación vertical, avance
de línea, retorno de carro y avance de
formulario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_space()**

&lt;?php
$strings = array(
    'string1' =&gt; "\n\r\t",
    'string2' =&gt; "\narf12",
    'string3' =&gt; '\n\r\t' // note las comillas simples
);
foreach ($strings as $name =&gt; $testcase) {
    if (ctype_space($testcase)) {
echo "The string '$name' consists of whitespace characters only.\n";
    } else {
        echo "The string '$name' contains non-whitespace characters.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

The string 'string1' consists of whitespace characters only.
The string 'string2' contains non-whitespace characters.
The string 'string3' contains non-whitespace characters.

### Ver también

    - [ctype_cntrl()](#function.ctype-cntrl) - Chequear posibles caracteres de control

    - [ctype_graph()](#function.ctype-graph) - Chequear posibles caracteres imprimibles, con

excepción de los espacios

    - [ctype_punct()](#function.ctype-punct) - Chequear posibles caracteres imprimibles que no son ni espacios en

blanco ni caracteres alfanuméricos

    - [IntlChar::isspace()](#intlchar.isspace) - Verifica si un punto de código es un carácter de espacio

# ctype_upper

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_upper — Chequear posibles caracteres en mayúscula

### Descripción

**ctype_upper**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres en la [string](#language.types.string) entregada,
text, son caracteres en mayúsculas.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del text
es una letra mayúscula en la localidad actual.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_upper()** (usando la
    localidad predeterminada)

&lt;?php
$cadenas = array('AKLWC139', 'LMNSDO', 'akwSKWsm');
foreach ($cadenas as $caso_prueba) {
    if (ctype_upper($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de letras mayúsculas.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de letras mayúsculas.\n";
}
}
?&gt;

     El ejemplo anterior mostrará:

La cadena AKLWC139 no consiste completamente de signos de letras mayúsculas.
La cadena LMNSDO consiste completamente de signos de letras mayúsculas.
La cadena akwSKWsm no consiste completamente de signos de letras mayúsculas.

### Ver también

    - [ctype_alpha()](#function.ctype-alpha) - Chequear posibles caracteres alfabéticos

    - [ctype_lower()](#function.ctype-lower) - Chequear posibles caracteres en minúscula

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [IntlChar::isupper()](#intlchar.isupper) - Verifica si un punto de código tiene la categoría general "Lu" (letra mayúscula)

# ctype_xdigit

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ctype_xdigit —
Chequear posibles caracteres que representen un dígito hexadecimal

### Descripción

**ctype_xdigit**([mixed](#language.types.mixed) $text): [bool](#language.types.boolean)

Verifica si todos los caracteres de la [string](#language.types.string) entregada,
text, son 'dígitos' hexadecimales.

### Parámetros

     text


       La cadena de prueba.


**Nota**:

    Si se proporciona un entero en el rango -128 y 255 inclusive, será interpretado como
    el valor ASCII de un solo carácter (los valores negativos se verán añadir 256 para permitir
    caracteres en el rango ASCII extendido). Cualquier otro entero será interpretado como
    una cadena de caracteres que contiene los dígitos decimales del entero.


       **Advertencia**

Desde PHP 8.1.0, pasar un argumento diferente de una cadena está obsoleto.
En el futuro, el argumento será interpretado como una cadena de caracteres en lugar de un punto de código ASCII.
Según el comportamiento deseado, el argumento debe ser convertido a [string](#language.types.string) o debe realizarse una llamada explícita a [chr()](#function.chr).

### Valores devueltos

Devuelve **[true](#constant.true)** si cada caracter del text
es un 'dígito' hexadecimal, lo que quiere decir un
dígito decimal o un caracter del rango
[A-Fa-f]; **[false](#constant.false)** de lo contrario.
Cuando se llama con una cadena vacía, el resultado será siempre **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ctype_xdigit()**

&lt;?php
$cadenas = array('AB10BC99', 'AR1012', 'ab12bc99');
foreach ($cadenas as $caso_prueba) {
    if (ctype_xdigit($caso_prueba)) {
echo "La cadena $caso_prueba consiste completamente de dígitos hexadecimales.\n";
} else {
echo "La cadena $caso_prueba no consiste completamente de dígitos hexadecimales.\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

La cadena AB10BC99 consiste completamente de dígitos hexadecimales.
La cadena AR1012 no consiste completamente de dígitos hexadecimales.
La cadena ab12bc99 consiste completamente de dígitos hexadecimales.

### Ver también

    - [ctype_digit()](#function.ctype-digit) - Chequear posibles caracteres numéricos

    - [IntlChar::isxdigit()](#intlchar.isxdigit) - Verifica si un punto de código es un dígito hexadecimal

## Tabla de contenidos

- [ctype_alnum](#function.ctype-alnum) — Chequear posibles caracteres alfanuméricos
- [ctype_alpha](#function.ctype-alpha) — Chequear posibles caracteres alfabéticos
- [ctype_cntrl](#function.ctype-cntrl) — Chequear posibles caracteres de control
- [ctype_digit](#function.ctype-digit) — Chequear posibles caracteres numéricos
- [ctype_graph](#function.ctype-graph) — Chequear posibles caracteres imprimibles, con
  excepción de los espacios
- [ctype_lower](#function.ctype-lower) — Chequear posibles caracteres en minúscula
- [ctype_print](#function.ctype-print) — Chequear posibles caracteres imprimibles
- [ctype_punct](#function.ctype-punct) — Chequear posibles caracteres imprimibles que no son ni espacios en
  blanco ni caracteres alfanuméricos
- [ctype_space](#function.ctype-space) — Chequear posibles caracteres de espacio en blanco
- [ctype_upper](#function.ctype-upper) — Chequear posibles caracteres en mayúscula
- [ctype_xdigit](#function.ctype-xdigit) — Chequear posibles caracteres que representen un dígito hexadecimal

- [Introducción](#intro.ctype)
- [Instalación/Configuración](#ctype.setup)<li>[Requerimientos](#ctype.requirements)
- [Instalación](#ctype.installation)
  </li>- [Funciones de Ctype](#ref.ctype)<li>[ctype_alnum](#function.ctype-alnum) — Chequear posibles caracteres alfanuméricos
- [ctype_alpha](#function.ctype-alpha) — Chequear posibles caracteres alfabéticos
- [ctype_cntrl](#function.ctype-cntrl) — Chequear posibles caracteres de control
- [ctype_digit](#function.ctype-digit) — Chequear posibles caracteres numéricos
- [ctype_graph](#function.ctype-graph) — Chequear posibles caracteres imprimibles, con
  excepción de los espacios
- [ctype_lower](#function.ctype-lower) — Chequear posibles caracteres en minúscula
- [ctype_print](#function.ctype-print) — Chequear posibles caracteres imprimibles
- [ctype_punct](#function.ctype-punct) — Chequear posibles caracteres imprimibles que no son ni espacios en
  blanco ni caracteres alfanuméricos
- [ctype_space](#function.ctype-space) — Chequear posibles caracteres de espacio en blanco
- [ctype_upper](#function.ctype-upper) — Chequear posibles caracteres en mayúscula
- [ctype_xdigit](#function.ctype-xdigit) — Chequear posibles caracteres que representen un dígito hexadecimal
  </li>
