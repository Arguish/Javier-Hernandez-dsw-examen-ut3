# Strings

# Introducción

Estas funciones manipulan strings de varias maneras. Existen algunas
secciones más especializadas, como la de [expresiones regulares](#book.pcre) y la de
[Manipulación de URLs](#book.url).

Para obtener información sobre cómo funcionan los strings, especialmente en
relación con el uso de comillas simples, comillas dobles, y secuencias de escape,
véase la entrada [Strings](#language.types.string)
en la sección [Tipos](#language.types)
del manual.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#strings.installation)

    ## Instalación

    No hay instalación necesaria para
    usar estas funciones, son parte del núcleo de PHP.

    A partir de PHP 8.1.0, [crypt()](#function.crypt) puede ser compilado contra
    la biblioteca crypt del sistema al especificar la opción de configuración
    **--with-external-libcrypt**.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[CRYPT_SALT_LENGTH](#constant.crypt-salt-length)**
    ([int](#language.types.integer))









    **[CRYPT_STD_DES](#constant.crypt-std-des)**
    ([int](#language.types.integer))



     Indica si los hash basados en DES estándar son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[CRYPT_EXT_DES](#constant.crypt-ext-des)**
    ([int](#language.types.integer))



     Indica si los hash extendidos basados en DES son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[CRYPT_MD5](#constant.crypt-md5)**
    ([int](#language.types.integer))



     Indica si los hash MD5 son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[CRYPT_BLOWFISH](#constant.crypt-blowfish)**
    ([int](#language.types.integer))



     Indica si los hash Blowfish son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[CRYPT_SHA256](#constant.crypt-sha256)**
    ([int](#language.types.integer))



     Indica si los hash SHA-256 son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[CRYPT_SHA512](#constant.crypt-sha512)**
    ([int](#language.types.integer))



     Indica si los hash SHA-512 son admitidos en [crypt()](#function.crypt). Siempre 1.





    **[HTML_SPECIALCHARS](#constant.html-specialchars)**
    ([int](#language.types.integer))









    **[HTML_ENTITIES](#constant.html-entities)**
    ([int](#language.types.integer))









    **[ENT_COMPAT](#constant.ent-compat)**
    ([int](#language.types.integer))









    **[ENT_QUOTES](#constant.ent-quotes)**
    ([int](#language.types.integer))









    **[ENT_NOQUOTES](#constant.ent-noquotes)**
    ([int](#language.types.integer))









    **[ENT_IGNORE](#constant.ent-ignore)**
    ([int](#language.types.integer))









    **[ENT_SUBSTITUTE](#constant.ent-substitute)**
    ([int](#language.types.integer))









    **[ENT_DISALLOWED](#constant.ent-disallowed)**
    ([int](#language.types.integer))









    **[ENT_HTML401](#constant.ent-html401)**
    ([int](#language.types.integer))









    **[ENT_XML1](#constant.ent-xml1)**
    ([int](#language.types.integer))









    **[ENT_XHTML](#constant.ent-xhtml)**
    ([int](#language.types.integer))









    **[ENT_HTML5](#constant.ent-html5)**
    ([int](#language.types.integer))









    **[CHAR_MAX](#constant.char-max)**
    ([int](#language.types.integer))









    **[LC_CTYPE](#constant.lc-ctype)**
    ([int](#language.types.integer))



     Clasificación de caracteres y conversión afectada por la configuración de locale.





    **[LC_NUMERIC](#constant.lc-numeric)**
    ([int](#language.types.integer))



     Separador decimal afectado por la configuración de locale.





    **[LC_TIME](#constant.lc-time)**
    ([int](#language.types.integer))



     Formato de fechas y horas afectado por la configuración de locale.





    **[LC_COLLATE](#constant.lc-collate)**
    ([int](#language.types.integer))



     Comparación de strings afectada por la configuración de locale.





    **[LC_MONETARY](#constant.lc-monetary)**
    ([int](#language.types.integer))



     Formato monetario afectado por la configuración de locale.





    **[LC_ALL](#constant.lc-all)**
    ([int](#language.types.integer))



     Afecta todas las funciones que una de las otras constantes **[LC_*](#constant.lc-ctype)** afecta.





    **[LC_MESSAGES](#constant.lc-messages)**
    ([int](#language.types.integer))



     Respuestas del sistema afectadas por la configuración de locale.
     Disponible si PHP ha sido compilado con libintl.





    **[STR_PAD_LEFT](#constant.str-pad-left)**
    ([int](#language.types.integer))









    **[STR_PAD_RIGHT](#constant.str-pad-right)**
    ([int](#language.types.integer))









    **[STR_PAD_BOTH](#constant.str-pad-both)**
    ([int](#language.types.integer))









    **[ALT_DIGITS](#constant.alt-digits)**
    ([int](#language.types.integer))



     Símbolos alternativos para los dígitos.






       Constantes
       Descripción


**Constantes de categoría [nl_langinfo()](#function.nl-langinfo) [LC_TIME](#constant.lc-time)**

    **[ABDAY_1](#constant.abday-1)**
    ([int](#language.types.integer))



     Nombre abreviado del primer día de la semana.





    **[ABDAY_2](#constant.abday-2)**
    ([int](#language.types.integer))



     Nombre abreviado del segundo día de la semana.





    **[ABDAY_3](#constant.abday-3)**
    ([int](#language.types.integer))



     Nombre abreviado del tercer día de la semana.





    **[ABDAY_4](#constant.abday-4)**
    ([int](#language.types.integer))



     Nombre abreviado del cuarto día de la semana.





    **[ABDAY_5](#constant.abday-5)**
    ([int](#language.types.integer))



     Nombre abreviado del quinto día de la semana.





    **[ABDAY_6](#constant.abday-6)**
    ([int](#language.types.integer))



     Nombre abreviado del sexto día de la semana.





    **[ABDAY_7](#constant.abday-7)**
    ([int](#language.types.integer))



     Nombre abreviado del séptimo día de la semana.





    **[DAY_1](#constant.day-1)**
    ([int](#language.types.integer))



     Nombre del primer día de la semana.





    **[DAY_2](#constant.day-2)**
    ([int](#language.types.integer))



     Nombre del segundo día de la semana.





    **[DAY_3](#constant.day-3)**
    ([int](#language.types.integer))



     Nombre del tercer día de la semana.





    **[DAY_4](#constant.day-4)**
    ([int](#language.types.integer))



     Nombre del cuarto día de la semana.





    **[DAY_5](#constant.day-5)**
    ([int](#language.types.integer))



     Nombre del quinto día de la semana.





    **[DAY_6](#constant.day-6)**
    ([int](#language.types.integer))



     Nombre del sexto día de la semana.





    **[DAY_7](#constant.day-7)**
    ([int](#language.types.integer))



     Nombre del séptimo día de la semana.





    **[ABMON_1](#constant.abmon-1)**
    ([int](#language.types.integer))



     Nombre abreviado del primer mes del año.





    **[ABMON_2](#constant.abmon-2)**
    ([int](#language.types.integer))



     Nombre abreviado del segundo mes del año.





    **[ABMON_3](#constant.abmon-3)**
    ([int](#language.types.integer))



     Nombre abreviado del tercer mes del año.





    **[ABMON_4](#constant.abmon-4)**
    ([int](#language.types.integer))



     Nombre abreviado del cuarto mes del año.





    **[ABMON_5](#constant.abmon-5)**
    ([int](#language.types.integer))



     Nombre abreviado del quinto mes del año.





    **[ABMON_6](#constant.abmon-6)**
    ([int](#language.types.integer))



     Nombre abreviado del sexto mes del año.





    **[ABMON_7](#constant.abmon-7)**
    ([int](#language.types.integer))



     Nombre abreviado del séptimo mes del año.





    **[ABMON_8](#constant.abmon-8)**
    ([int](#language.types.integer))



     Nombre abreviado del octavo mes del año.





    **[ABMON_9](#constant.abmon-9)**
    ([int](#language.types.integer))



     Nombre abreviado del noveno mes del año.





    **[ABMON_10](#constant.abmon-10)**
    ([int](#language.types.integer))



     Nombre abreviado del décimo mes del año.





    **[ABMON_11](#constant.abmon-11)**
    ([int](#language.types.integer))



     Nombre abreviado del undécimo mes del año.





    **[ABMON_12](#constant.abmon-12)**
    ([int](#language.types.integer))



     Nombre abreviado del duodécimo mes del año.





    **[MON_1](#constant.mon-1)**
    ([int](#language.types.integer))



     Nombre del primer mes del año.





    **[MON_2](#constant.mon-2)**
    ([int](#language.types.integer))



     Nombre del segundo mes del año.





    **[MON_3](#constant.mon-3)**
    ([int](#language.types.integer))



     Nombre del tercer mes del año.





    **[MON_4](#constant.mon-4)**
    ([int](#language.types.integer))



     Nombre del cuarto mes del año.





    **[MON_5](#constant.mon-5)**
    ([int](#language.types.integer))



     Nombre del quinto mes del año.





    **[MON_6](#constant.mon-6)**
    ([int](#language.types.integer))



     Nombre del sexto mes del año.





    **[MON_7](#constant.mon-7)**
    ([int](#language.types.integer))



     Nombre del séptimo mes del año.





    **[MON_8](#constant.mon-8)**
    ([int](#language.types.integer))



     Nombre del octavo mes del año.





    **[MON_9](#constant.mon-9)**
    ([int](#language.types.integer))



     Nombre del noveno mes del año.





    **[MON_10](#constant.mon-10)**
    ([int](#language.types.integer))



     Nombre del décimo mes del año.





    **[MON_11](#constant.mon-11)**
    ([int](#language.types.integer))



     Nombre del undécimo mes del año.





    **[MON_12](#constant.mon-12)**
    ([int](#language.types.integer))



     Nombre del duodécimo mes del año.





    **[AM_STR](#constant.am-str)**
    ([int](#language.types.integer))



     String para Ante meridiem.





    **[PM_STR](#constant.pm-str)**
    ([int](#language.types.integer))



     String para Post meridiem.





    **[D_T_FMT](#constant.d-t-fmt)**
    ([int](#language.types.integer))



     String que puede ser utilizada como string de formato para [strftime()](#function.strftime) para representar la hora y la fecha.





    **[D_FMT](#constant.d-fmt)**
    ([int](#language.types.integer))



     String que puede ser utilizada como string de formato para [strftime()](#function.strftime) para representar la fecha.





    **[T_FMT](#constant.t-fmt)**
    ([int](#language.types.integer))



     String que puede ser utilizada como string de formato para [strftime()](#function.strftime) para representar la hora.





    **[T_FMT_AMPM](#constant.t-fmt-ampm)**
    ([int](#language.types.integer))



     String que puede ser utilizada como string de formato para [strftime()](#function.strftime) para representar la hora en formato de 12 horas con ante/post meridiem.





    **[ERA](#constant.era)**
    ([int](#language.types.integer))



     Era alternativa.





    **[ERA_YEAR](#constant.era-year)**
    ([int](#language.types.integer))



     Año en formato de era alternativa.





    **[ERA_D_T_FMT](#constant.era-d-t-fmt)**
    ([int](#language.types.integer))



     Fecha y hora en formato de era alternativa (string que puede ser utilizada en [strftime()](#function.strftime)).





    **[ERA_D_FMT](#constant.era-d-fmt)**
    ([int](#language.types.integer))



     Fecha en formato de era alternativa (string que puede ser utilizada en [strftime()](#function.strftime)).





    **[ERA_T_FMT](#constant.era-t-fmt)**
    ([int](#language.types.integer))



     Hora en formato de era alternativa (string que puede ser utilizada en [strftime()](#function.strftime)).






       Constantes
       Descripción


**Constantes de categoría [nl_langinfo()](#function.nl-langinfo) [LC_MONETARY](#constant.lc-monetary)**

    **[INT_CURR_SYMBOL](#constant.int-curr-symbol)**
    ([int](#language.types.integer))



     Símbolo de moneda internacional.





    **[CURRENCY_SYMBOL](#constant.currency-symbol)**
    ([int](#language.types.integer))



     Símbolo de moneda local.





    **[CRNCYSTR](#constant.crncystr)**
    ([int](#language.types.integer))



     Mismo valor que **[CURRENCY_SYMBOL](#constant.currency-symbol)**.





    **[MON_DECIMAL_POINT](#constant.mon-decimal-point)**
    ([int](#language.types.integer))



     Carácter del punto decimal.





    **[MON_THOUSANDS_SEP](#constant.mon-thousands-sep)**
    ([int](#language.types.integer))



     Separador de miles (grupos de tres dígitos).





    **[MON_GROUPING](#constant.mon-grouping)**
    ([int](#language.types.integer))



     Como el elemento "grouping".





    **[POSITIVE_SIGN](#constant.positive-sign)**
    ([int](#language.types.integer))



     Signo para valores positivos.





    **[NEGATIVE_SIGN](#constant.negative-sign)**
    ([int](#language.types.integer))



     Signo para valores negativos.





    **[INT_FRAC_DIGITS](#constant.int-frac-digits)**
    ([int](#language.types.integer))



     Decimal internacional.





    **[FRAC_DIGITS](#constant.frac-digits)**
    ([int](#language.types.integer))



     Decimal local.





    **[P_CS_PRECEDES](#constant.p-cs-precedes)**
    ([int](#language.types.integer))



     Devuelve 1 si **[CURRENCY_SYMBOL](#constant.currency-symbol)** precede a un valor positivo.





    **[P_SEP_BY_SPACE](#constant.p-sep-by-space)**
    ([int](#language.types.integer))



     Devuelve 1 si un espacio separa **[CURRENCY_SYMBOL](#constant.currency-symbol)** de un valor positivo.





    **[N_CS_PRECEDES](#constant.n-cs-precedes)**
    ([int](#language.types.integer))



     Devuelve 1 si **[CURRENCY_SYMBOL](#constant.currency-symbol)** precede a un valor negativo.





    **[N_SEP_BY_SPACE](#constant.n-sep-by-space)**
    ([int](#language.types.integer))



     Devuelve 1 si un espacio separa **[CURRENCY_SYMBOL](#constant.currency-symbol)** de un valor negativo.





    **[P_SIGN_POSN](#constant.p-sign-posn)**
    ([int](#language.types.integer))






             -

                Devuelve 0 si los paréntesis rodean la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 1 si el string de signo precede a la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 2 si el string de signo sigue a la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 3 si el string de signo precede inmediatamente a **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 4 si el string de signo sigue inmediatamente a **[CURRENCY_SYMBOL](#constant.currency-symbol)**.









    **[N_SIGN_POSN](#constant.n-sign-posn)**
    ([int](#language.types.integer))



     Posición del signo para valores negativos.






       Constantes
       Descripción


**Constantes de categoría [nl_langinfo()](#function.nl-langinfo) [LC_NUMERIC](#constant.lc-numeric)**

    **[DECIMAL_POINT](#constant.decimal-point)**
    ([int](#language.types.integer))



     Carácter del punto decimal.





    **[RADIXCHAR](#constant.radixchar)**
    ([int](#language.types.integer))



     Mismo valor que **[DECIMAL_POINT](#constant.decimal-point)**.





    **[THOUSANDS_SEP](#constant.thousands-sep)**
    ([int](#language.types.integer))



     Carácter de separación para los miles (grupos de tres dígitos).





    **[THOUSEP](#constant.thousep)**
    ([int](#language.types.integer))



     Mismo valor que **[THOUSANDS_SEP](#constant.thousands-sep)**.





    **[GROUPING](#constant.grouping)**
    ([int](#language.types.integer))










       Constantes
       Descripción


**Constantes de categoría [nl_langinfo()](#function.nl-langinfo) [LC_MESSAGES](#constant.lc-messages)**

    **[YESEXPR](#constant.yesexpr)**
    ([int](#language.types.integer))



     String regex para coincidir con la entrada "yes".





    **[NOEXPR](#constant.noexpr)**
    ([int](#language.types.integer))



     String regex para coincidir con la entrada "no".





    **[YESSTR](#constant.yesstr)**
    ([int](#language.types.integer))



     String de salida para "yes".





    **[NOSTR](#constant.nostr)**
    ([int](#language.types.integer))



     String de salida para "no".






       Constantes
       Descripción


**Constantes de categoría [nl_langinfo()](#function.nl-langinfo) [LC_CTYPE](#constant.lc-ctype)**

    **[CODESET](#constant.codeset)**
    ([int](#language.types.integer))



     Devuelve un string con el nombre del juego de caracteres.

# Funciones de strings

# Ver también

Para funciones de manejo y manipulación de strings más poderosas, revise
las funciones de [expresiones regulares compatibles con Perl](#ref.pcre).
Para trabajar con la codificación de caracteres multibyte, revise las
[funciones de string multibyte](#ref.mbstring).

# addcslashes

(PHP 4, PHP 5, PHP 7, PHP 8)

addcslashes — Añade barras invertidas a un string, al estilo del lenguaje C

### Descripción

**addcslashes**([string](#language.types.string) $string, [string](#language.types.string) $characters): [string](#language.types.string)

Devuelve el string string, después de haber añadido
barras invertidas antes de todos los caracteres que están presentes
en la lista characters.

### Parámetros

     string


       El string a escapar.






     characters


       Una lista de caracteres a escapar. Si
       characters contiene los caracteres
       \n, \r etc., serán
       convertidos al estilo del lenguaje C, mientras que otros
       caracteres no alfanuméricos con un código ASCII inferior
       a 26 y superior a 126 son reemplazados por su representación
       octal.




       Al definir una secuencia de caracteres
       en el parámetro characters, asegúrese
       de que conoce bien todos los caracteres que se encuentran entre
       los límites de los intervalos.



       **Ejemplo #1 addcslashes()** con rangos




&lt;?php
echo addcslashes('foo[ ]', 'A..z');
// Muestra: \f\o\o\[ \]
// Todas las mayúsculas y minúsculas serán escapadas
// ... pero también los caracteres [\]^\_`
?&gt;

       Asimismo, si el primer carácter de un intervalo tiene un código ASCII
       mayor que el segundo, el intervalo no será creado.
       Solo los límites del intervalo y el carácter punto (.) serán
       escapados. Utilice la función [ord()](#function.ord) para
       encontrar el valor ASCII de un carácter.

       **Ejemplo #2 addcslashes()** con caracteres en el orden incorrecto




&lt;?php
echo addcslashes("zoo['.']", 'z..A');
// Muestra: \zoo['\.']
?&gt;

       Tenga cuidado con el uso de caracteres como 0, a, b, f, n, r,
       t y v. Serán convertidos en \0, \a, \b, \f, \n, \r, \t y \v,
       todos siendo secuencias de escape en C. La mayoría de estas secuencias
       también están definidas en otros lenguajes derivados de C, incluyendo PHP,
       lo que significa que no se obtendrá el resultado esperado si se
       utiliza la salida de la función **addcslashes()**
       para generar código para estos lenguajes con los caracteres definidos
       en el parámetro characters.





### Valores devueltos

Devuelve el string escapado.

### Ejemplos

characters puede escribirse "\0..\37", lo que
identifica todos los caracteres ASCII cuyo código está entre
0 y 37.

    **Ejemplo #3 Ejemplo con addcslashes()**

&lt;?php
$not_escaped = "PHP isThirty\nYears Old!\tYay to the Elephant!\n";
$escaped = addcslashes($not_escaped, "\0..\37!@\177..\377");
echo $escaped;
?&gt;

### Ver también

    - [stripcslashes()](#function.stripcslashes) - Decodifica un string codificado con addcslashes

    - [stripslashes()](#function.stripslashes) - Quita las barras de un string con comillas escapadas

    - [addslashes()](#function.addslashes) - Añade barras invertidas en un string

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [quotemeta()](#function.quotemeta) - Protege los metacaracteres

# addslashes

(PHP 4, PHP 5, PHP 7, PHP 8)

addslashes — Añade barras invertidas en un string

### Descripción

**addslashes**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve el string str después de haber escapado todos
los caracteres que deben serlo. Estos caracteres son:

    - comillas simples (')

    - comillas dobles (")

    - barra invertida (\)

    - NUL (el byte NUL)

Un caso de uso de **addslashes()** es escapar los
caracteres mencionados en un string que debe ser evaluada por PHP:

    **Ejemplo #1 Caracteres de escape**

&lt;?php
$str = "O'Reilly?";
eval("echo '" . addslashes($str) . "';");
?&gt;

**addslashes()** es a veces utilizado incorrectamente para prevenir
las [Inyecciones SQL](#security.database.sql-injection).
En su lugar, las funciones de escape específicas de la base de datos y/o
las declaraciones preparadas deberían ser utilizadas.

### Parámetros

     string


       El string a escapar.





### Valores devueltos

Devuelve el string escapada.

### Ejemplos

    **Ejemplo #2 Ejemplo con addslashes()**

&lt;?php
$str = "¿Su nombre es O'reilly?";

// Muestra: ¿Su nombre es O\'reilly?
echo addslashes($str);
?&gt;

### Ver también

    - [stripcslashes()](#function.stripcslashes) - Decodifica un string codificado con addcslashes

    - [stripslashes()](#function.stripslashes) - Quita las barras de un string con comillas escapadas

    - [addcslashes()](#function.addcslashes) - Añade barras invertidas a un string, al estilo del lenguaje C

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [quotemeta()](#function.quotemeta) - Protege los metacaracteres

    - [get_magic_quotes_gpc()](#function.get-magic-quotes-gpc) - Devuelve la configuración actual de la opción magic_quotes_gpc

# bin2hex

(PHP 4, PHP 5, PHP 7, PHP 8)

bin2hex — Convierte datos binarios en representación hexadecimal

### Descripción

**bin2hex**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve la cadena string cuyos todos los caracteres
están representados por su equivalente hexadecimal. La cadena devuelta
es una cadena ASCII. La conversión soporta caracteres binarios,
y utiliza los bits de mayor peso en primer lugar.

### Parámetros

     string


       Una [string](#language.types.string).





### Valores devueltos

Devuelve la representación hexadecimal de la cadena proporcionada.

### Ejemplos

    **Ejemplo #1 Ejemplo con bin2hex()**

&lt;?php

$hex = bin2hex('Hello world!');

var_dump($hex);
var_dump(hex2bin($hex));
?&gt;

    El ejemplo anterior mostrará:

string(24) "48656c6c6f20776f726c6421"
string(12) "Hello world!"

### Ver también

    - [hex2bin()](#function.hex2bin) - Convierte una string codificada en hexadecimal a binario

    - [pack()](#function.pack) - Compacta datos en una cadena binaria

# chop

(PHP 4, PHP 5, PHP 7, PHP 8)

chop — Alias de [rtrim()](#function.rtrim)

### Descripción

Esta función es un alias de: [rtrim()](#function.rtrim).

### Notas

**Nota**:

    El comportamiento de la función **chop()** no es el
    mismo que el de la función chop() de Perl, que elimina el
    último caracter de la cadena.

# chr

(PHP 4, PHP 5, PHP 7, PHP 8)

chr — Generar un string de un byte a partir de un número

### Descripción

**chr**([int](#language.types.integer) $codepoint): [string](#language.types.string)

Devuelve un [string](#language.types.string) de un solo carácter que contiene el carácter especificado al
interpretar codepoint como un [int](#language.types.integer) sin signo.

Esto puede ser utilizado para crear un [string](#language.types.string) de un solo carácter en una
codificación de un byte como ASCII, ISO-8859 o Windows 1252, pasando la
posición del carácter deseado en la tabla de correspondencia de la codificación.
Sin embargo, es importante tener en cuenta que esta función no es consciente de ninguna codificación
de [string](#language.types.string), y en particular no puede ser transmitido un valor de punto de código Unicode para generar un [string](#language.types.string) en una codificación multibyte como UTF-8
o UTF-16.

Esta función complementa [ord()](#function.ord).

### Parámetros

     codepoint


       Un [int](#language.types.integer) entre 0 y 255;




       Los valores fuera del rango válido (0..255) serán
       convertidos a valor positivo, y terminarán en 255, lo que es
       equivalente al siguiente algoritmo:


while ($bytevalue &lt; 0) {
    $bytevalue += 256;
}
$bytevalue %= 256;

### Valores devueltos

Devuelve un [string](#language.types.string) de un solo carácter que contiene el byte especificado.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Esta función ya no acepta silenciosamente los codepoints
       no soportados, y convierte estos valores a 0.



### Ejemplos

    **Ejemplo #1 Ejemplo con chr()**

&lt;?php
// Supone que el string será utilizado como ASCII o una codificación
// compatible con este

$str = "The string ends in escape: ";

// Añade un carácter de escape al final del string $str
$str .= chr(27);
echo $str, PHP_EOL;
// Esto es a menudo más práctico, y realiza lo mismo

$str = sprintf("The string ends in escape: %c", 27);
?&gt;

    **Ejemplo #2 Comportamiento de desbordamiento**

&lt;?php
echo chr(-159), chr(833), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

aA

    **Ejemplo #3 Construir un string UTF-8 a partir de bytes individuales**

&lt;?php
$str = chr(240) . chr(159) . chr(144) . chr(152);
echo $str, PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

🐘

### Ver también

    - [sprintf()](#function.sprintf) - Devuelve una string formateada con el carácter de formato %c

    - [ord()](#function.ord) - Convierte el primer byte de un string en un valor entre 0 y 255

    - [» Tabla ASCII](https://www.man7.org/linux/man-pages/man7/ascii.7.html)

    - [mb_chr()](#function.mb-chr) - Devuelve un carácter por su valor de punto de código Unicode

    - [IntlChar::chr()](#intlchar.chr) - Devuelve el carácter Unicode por valor de punto de código

# chunk_split

(PHP 4, PHP 5, PHP 7, PHP 8)

chunk_split — Divide un string

### Descripción

**chunk_split**([string](#language.types.string) $string, [int](#language.types.integer) $length = 76, [string](#language.types.string) $separator = "\r\n"): [string](#language.types.string)

Divide el string body en segmentos de
length bytes de longitud.
Esta función es muy útil para convertir los resultados
de [base64_encode()](#function.base64-encode) al formato
de la RFC 2045. Inserta el parámetro separator
cada length caracteres.

### Parámetros

     string


       El string a dividir.






     length


       El tamaño de la porción.






     separator


       El carácter de fin de la secuencia.





### Valores devueltos

Devuelve el string dividido.

### Ejemplos

    **Ejemplo #1 Ejemplo con chunk_split()**

&lt;?php
$data = 'This is quite a long string, which will get broken up because the line is going to be too long after base64 encoding it.';

// Formatear datos para seguir la norma RFC 2045
$new_string = chunk_split(base64_encode($data));
echo $new_string, PHP_EOL;
?&gt;

### Ver también

    - [str_split()](#function.str-split) - Convierte un string en un array

    - [explode()](#function.explode) - Divide una string en segmentos

    - [wordwrap()](#function.wordwrap) - Realiza el ajuste de línea de un string

    - [» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045)

# convert_cyr_string

(PHP 4, PHP 5, PHP 7)

convert_cyr_string — Convierte un string de un juego de caracteres cirílico a otro

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**convert_cyr_string**([string](#language.types.string) $str, [string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)

Convierte un string de un juego de caracteres cirílico a otro.

### Parámetros

     str


       El string a convertir.






     from


       El juego de caracteres cirílico, como un solo carácter.






     to


       El juego de caracteres cirílico de destino, como un solo carácter.





Los caracteres admitidos son:

    -

      k : koi8-r



    -

      w : windows-1251



    -

      i : iso8859-5



    -

      a : x-cp866



    -

      d : x-cp866



    -

      m : x-mac-cyrillic


### Valores devueltos

Devuelve el string convertido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.4.0

       Esta función está obsoleta.



### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [mb_convert_encoding()](#function.mb-convert-encoding) - Convertir una cadena de un codificación de caracteres a otra

    - [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

# convert_uudecode

(PHP 5, PHP 7, PHP 8)

convert_uudecode — Decodifica un string en formato uuencode

### Descripción

**convert_uudecode**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

**convert_uudecode()** decodifica un string en formato
uuencode.

**Nota**:

    **convert_uudecode()** no acepta ni la línea begin
    ni la línea end, que forman parte de los ficheros
    *files* codificados en uuencode.

### Parámetros

     string


       Los datos, en formato uuencode.





### Valores devueltos

Devuelve los datos decodificados, como un string, o false en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con convert_uudecode()**

&lt;?php
echo convert_uudecode("+22!L;W9E(%!(4\"$`\n`");
?&gt;

El ejemplo anterior mostrará:

I love PHP!

### Ver también

    - [convert_uuencode()](#function.convert-uuencode) - Codifica un string utilizando el algoritmo uuencode

# convert_uuencode

(PHP 5, PHP 7, PHP 8)

convert_uuencode — Codifica un string utilizando el algoritmo uuencode

### Descripción

**convert_uuencode**([string](#language.types.string) $string): [string](#language.types.string)

**convert_uuencode()** codifica un string
utilizando el algoritmo uuencode.

Uuencode traduce todos los strings (incluyendo datos binarios) en caracteres
imprimibles, para asegurar su transmisión por Internet.
Los datos en formato uuencode son aproximadamente un 35 % más grandes que los originales.

**Nota**:

    **convert_uuencode()** no produce ni la línea begin
    ni la línea end, que forman parte de los ficheros
    *files* codificados en uuencoded.

### Parámetros

     string


       Los datos a codificar.





### Valores devueltos

Devuelve los datos en formato uuencode.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Antes de esta versión, intentar convertir un string vacío
       devolvía **[false](#constant.false)** sin ninguna razón en particular.



### Ejemplos

    **Ejemplo #1 Ejemplo con convert_uuencode()**

&lt;?php
$some_string = "test\ntext text\r\n";

echo convert_uuencode($some_string);
?&gt;

El ejemplo anterior mostrará:

0=&amp;5S=`IT97AT('1E&gt;'0-"@``
`

### Ver también

    - [convert_uudecode()](#function.convert-uudecode) - Decodifica un string en formato uuencode

    - [base64_encode()](#function.base64-encode) - Codifica datos con MIME base64

# count_chars

(PHP 4, PHP 5, PHP 7, PHP 8)

count_chars — Devuelve estadísticas sobre los caracteres utilizados en un string

### Descripción

**count_chars**([string](#language.types.string) $string, [int](#language.types.integer) $mode = 0): [array](#language.types.array)|[string](#language.types.string)

**count_chars()** cuenta el número de ocurrencias de
todos los bytes presentes en el string string
y devuelve diferentes estadísticas.

### Parámetros

     string


       El string analizado.






     mode


       Ver los valores devueltos.





### Valores devueltos

Según el valor de mode, **count_chars()**
devuelve la siguiente información:

    -

      0: un array con el byte como índice y la frecuencia
      correspondiente para cada byte.



    -

      1: idéntico a 0, pero solo se listan las frecuencias mayores que
      cero.



    -

      2: idéntico a 0, pero solo se listan las frecuencias nulas.



    -

      3: un string que contiene todos los bytes utilizados es devuelto.



    -

      4: un string que contiene todos los bytes no utilizados es devuelto.


### Historial de cambios

      Versión
      Descripción






      8.0.0

       Anterior a esta versión, la función devolvía **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Ejemplo con count_chars()**

&lt;?php
$data = "Deux D et un F.";

foreach (count_chars($data, 1) as $i =&gt; $val) {
   echo "Hay $val ocurrencia(s) de \"" , chr($i) , "\" en la frase.\n";
}
?&gt;

    El ejemplo anterior mostrará:

Hay 4 ocurrencia(s) de " " en la frase.
Hay 1 ocurrencia(s) de "." en la frase.
Hay 2 ocurrencia(s) de "D" en la frase.
Hay 1 ocurrencia(s) de "F" en la frase.
Hay 2 ocurrencia(s) de "e" en la frase.
Hay 1 ocurrencia(s) de "n" en la frase.
Hay 1 ocurrencia(s) de "t" en la frase.
Hay 2 ocurrencia(s) de "u" en la frase.
Hay 1 ocurrencia(s) de "x" en la frase.

### Ver también

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [substr_count()](#function.substr-count) - Cuenta el número de ocurrencias de segmentos en un string

# crc32

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

crc32 — Calcula la suma de comprobación CRC32

### Descripción

**crc32**([string](#language.types.string) $string): [int](#language.types.integer)

Genera la suma de comprobación cíclica CRC32, calculada en 32 bits, y
aplicada a la cadena string. Esta función se
utiliza generalmente para validar la integridad de los datos durante una
transmisión.

**Advertencia**

    Debido a que el tipo entero de PHP es firmado,
    la mayoría de las sumas de comprobación crc32 resultan ser
    enteros negativos en plataformas de 32 bits. En instalaciones
    de 64 bits, todos los resultados de la función **crc32()**
    serán enteros positivos.




    Asimismo, se debe utilizar el formateador "%u" de la función
    [sprintf()](#function.sprintf) o de la función [printf()](#function.printf)
    para obtener una representación en cadena de caracteres de la suma
    de comprobación no firmada de la función **crc32()**
    en formato decimal.




    Para una representación hexadecimal de la suma de comprobación, se
    puede utilizar el formateador "%x" de la función [sprintf()](#function.sprintf)
    o de la función [printf()](#function.printf), o bien las funciones de
    conversión [dechex()](#function.dechex), ambas soluciones se encargan
    de convertir el resultado de la función **crc32()**
    en un entero no firmado.




    En instalaciones de 64 bits, la función también devolverá enteros
    negativos para valores devueltos muy grandes, pero esto romperá
    la conversión hexadecimal al tener una posición adicional 0xFFFFFFFF########.
    Sabiendo que la representación decimal parece ser el caso más ampliamente utilizado,
    se ha decidido no romperla incluso si esto rompe directamente la comparación decimal
    en el 50% de los casos al pasar de 32 a 64 bits.




    Con perspectiva, el hecho de que la función devuelva un entero quizá no
    fue la mejor idea, y devolver desde el principio una representación hexadecimal
    en forma de cadena de caracteres (tal como hace la función
    [md5()](#function.md5)), habría sido una mejor solución.




    Para una solución más duradera, se puede recurrir a la función
    genérica [hash()](#function.hash). hash("crc32b", $str)
    devolverá la misma cadena de caracteres que str_pad(dechex(crc32($str)), 8, '0', STR_PAD_LEFT).

### Parámetros

     string


       Los datos.





### Valores devueltos

Devuelve la suma de comprobación crc32 de la cadena
string, en forma de un entero.

### Ejemplos

    **Ejemplo #1 Mostrar una suma de comprobación CRC32**



     Este ejemplo ilustra cómo mostrar la suma de comprobación
     con la función [printf()](#function.printf):

&lt;?php
$checksum = crc32("Le vif zéphyr jubile sur les kumquats du clown gracieux.");
printf("%u\n", $checksum);
?&gt;

### Ver también

    - [hash()](#function.hash) - Genera un valor de hachado (huella digital)

    - [md5()](#function.md5) - Calcula el md5 de un string

    - [sha1()](#function.sha1) - Calcula el sha1 de un string

# crypt

(PHP 4, PHP 5, PHP 7, PHP 8)

crypt — Hash de un solo sentido (indescifrable)

**Advertencia**
Esta función no es capaz de manejar strings binarios !

### Descripción

**crypt**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $string, [string](#language.types.string) $salt): [string](#language.types.string)

**crypt()** devolverá una cadena con hash utilizando el algoritmo estándar de Unix basado en DES, o un algoritmo alternativo. La función [password_verify()](#function.password-verify) es compatible con la función **crypt()**. Así, una contraseña con hash de la función **crypt()** puede ser utilizada con la función [password_verify()](#function.password-verify).

Anterior a PHP 8.0.0, el parámetro salt era opcional. Sin embargo, **crypt()** crea un hash débil sin el salt, y genera un error **[E_NOTICE](#constant.e-notice)** sin este. Asegúrese de especificar un salt lo suficientemente fuerte para una mejor seguridad.

[password_hash()](#function.password-hash) utiliza un hash fuerte, genera un salt fuerte, y aplica todo automáticamente. [password_hash()](#function.password-hash) es solo un gestor de **crypt()** y es compatible con contraseñas con hash existentes. Se recomienda encarecidamente el uso de la función [password_hash()](#function.password-hash).

El tipo de hash es activado por el argumento salt. Si no se proporciona ningún salt, PHP generará dos caracteres (DES), a menos que el sistema predeterminado sea MD5, en cuyo caso se generará un salt compatible con MD5. PHP define una constante llamada **[CRYPT_SALT_LENGTH](#constant.crypt-salt-length)** que permite conocer la longitud del salt disponible para el sistema de hash utilizado.

**crypt()**, cuando se utiliza con el cifrado estándar DES, devuelve el salt en los dos primeros caracteres de la cadena devuelta. Solo utiliza los primeros 8 caracteres de string, lo que hace que todas las cadenas más largas, que tienen los mismos primeros 8 octetos, devuelvan el mismo resultado (siempre que el salt sea siempre el mismo).

Los siguientes tipos de hash son soportados:

- **[CRYPT_STD_DES](#constant.crypt-std-des)**: cifrado DES estándar de 2 caracteres desde la clase de caracteres "./0-9A-Za-z". El uso de caracteres inválidos en el salt hará fallar la función crypt().

- **[CRYPT_EXT_DES](#constant.crypt-ext-des)**: Hash DES extendido. El "salt" será una cadena de 9 caracteres compuesta de un guion bajo, seguido de 4 caracteres del contador de iteración y luego 4 caracteres del "salt". Cada una de estas cadenas de 4 caracteres codifica 24 bits, el carácter menos significativo primero. Los valores de 0 a 63 serán codificados como ./0-9A-Za-z. El uso de caracteres inválidos en el salt hará fallar la función crypt().

- **[CRYPT_MD5](#constant.crypt-md5)**: hash MD5 de 12 caracteres que comienza con $1$

- **[CRYPT_BLOWFISH](#constant.crypt-blowfish)**: hash Blowfish cuyo salt está compuesto de la siguiente manera: "$2a$", "$2x$" o "$2y$", un parámetro de 2 dígitos, $, y 22 caracteres del alfabeto "./0-9A-Za-z". El uso de caracteres fuera de esta clase en el salt hará que la función crypt() devuelva una cadena vacía (de longitud 0). El parámetro de 2 dígitos es el logaritmo base-2 del contador de iteración para el algoritmo de hash basado en Blowfish subyacente y debe estar en el rango 04-31. De manera similar, si se utiliza un valor fuera de este rango, la función crypt() fallará.

    Los hashes "$2x$" son potencialmente débiles; los hashes "$2a$" son compatibles y mitigan esta debilidad. Para nuevos hashes, "$2y$" debería ser utilizado.

- **[CRYPT_SHA256](#constant.crypt-sha256)** - Hash SHA-256 cuyo salt está compuesto de 16 caracteres prefijados por $5$. Si el salt comienza con 'rounds=&lt;N&gt;$', el valor numérico de N será utilizado para indicar cuántas veces el bucle de hash debe ser ejecutado, algo similar al parámetro en el algoritmo Blowfish. El valor predeterminado de rounds es 5000, el mínimo puede ser 1000 y el máximo, 999,999,999. Cualquier otra selección de N fuera de este rango será truncada al límite más cercano de los 2.

- **[CRYPT_SHA512](#constant.crypt-sha512)** - Hash SHA-512 cuyo salt está compuesto de 16 caracteres prefijados por $6$. Si el salt comienza con 'rounds=&lt;N&gt;$', el valor numérico de N será utilizado para indicar cuántas veces el bucle de hash debe ser ejecutado, algo similar al parámetro en el algoritmo Blowfish. El valor predeterminado de rounds es 5000, el mínimo puede ser 1000 y el máximo, 999,999,999. Cualquier otra selección de N fuera de este rango será truncada al límite más cercano de los 2.

### Parámetros

     string


       La cadena a hashear.



      **Precaución**

        Si se utiliza el algoritmo **[CRYPT_BLOWFISH](#constant.crypt-blowfish)**, el resultado del parámetro string será truncado a una longitud máxima de 72 octetos.







     salt


       Si el argumento salt no es proporcionado, el comportamiento está definido por la implementación del algoritmo y puede provocar resultados inesperados.





### Valores devueltos

Devuelve la cadena con hash o una cadena que será inferior a 13 caracteres y que está garantizada para diferir del salt en caso de error.

**Advertencia**

    Al validar contraseñas, debe utilizarse una función de comparación de cadenas que no sea vulnerable a ataques temporales para comparar la salida de la función **crypt()** con el hash conocido previamente. PHP proporciona [hash_equals()](#function.hash-equals) para esto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El salt ya no es opcional.



### Ejemplos

    **Ejemplo #1 Ejemplo con crypt()**

&lt;?php
$user_input = 'rasmuslerdorf';
$hashed_password = '$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/';

// Validar un hash crypt() existente de una manera compatible con software no-PHP
if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
echo "¡Contraseña correcta!";
}
?&gt;

### Notas

**Nota**:

    No existe una función de descifrado, ya que la función **crypt()** utiliza un algoritmo de un solo sentido (inyección).

### Ver también

    - [hash_equals()](#function.hash-equals) - Comparación de strings resistente a ataques temporales

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

    - La página del manual Unix de la función crypt para más información

# echo

(PHP 4, PHP 5, PHP 7, PHP 8)

echo — Muestra una string

### Descripción

**echo**([string](#language.types.string) ...$expressions): [void](language.types.void.html)

Muestra una o varias expresiones, sin espacios o nueva línea adicionales.

echo no es una función sino una construcción del lenguaje.
Sus argumentos son una lista de expresiones que siguen la palabra clave echo,
separados por comas, y no delimitados por paréntesis.
A diferencia de otras construcciones del lenguaje, echo
no tiene valor de retorno, por lo que no puede ser utilizada en
el contexto de una expresión.

echo también dispone de una sintaxis corta,
donde se puede hacer seguir inmediatamente la etiqueta PHP de apertura con un
signo igual (=).
Esta sintaxis está disponible incluso si la directiva de configuración
[**short_open_tag**](#ini.short-open-tag)
está desactivada.

Tengo &lt;?=$foo?&gt; foo.

La mayor diferencia con [print](#function.print) es que
echo acepta múltiples argumentos y no retorna
ningún valor.

### Parámetros

     expressions


       Una o varias expresiones de string a mostrar,
       separadas por comas.
       Los valores que no son strings serán convertidos
       a strings, incluso si la directiva
       [strict_types](#language.types.declarations.strict)
       está activada.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con echo**

&lt;?php
echo "echo no requiere paréntesis.";

// Las strings pueden ser pasadas individualmente como múltiples argumentos o
// concatenadas y pasadas como un solo argumento
echo 'Esta ', 'string ', 'fue ', 'creada ', 'con múltiples parámetros.', "\n";
echo 'Esta ' . 'string ' . 'fue ' . 'creada ' . 'con concatenación.' . "\n";

// Ninguna nueva línea o espacio es añadido; lo siguiente muestra "helloworld", todo en una línea
echo "hola";
echo "mundo";

// Igual que lo anterior
echo "hola", "mundo";

echo "Esta string abarca
múltiples líneas. Los saltos de línea serán
mostrados también";

echo "Esta string abarca\nmúltiples líneas. Los saltos de línea serán\nmostrados también.";

// El argumento puede ser cualquier expresión que produzca una string
$foo = "ejemplo";
echo "foo es $foo"; // foo es ejemplo

$frutas = ["limón", "naranja", "plátano"];
echo implode(" y ", $frutas); // limón y naranja y plátano

// Las expresiones que no son strings son convertidas a strings, incluso si declare(strict_types=1) es utilizado
echo 6 \* 7; // 42

// Sin embargo, los siguientes ejemplos funcionarán:
($some_var) ? print 'true' : print 'false'; // print también es una construcción, pero
// es una expresión válida, retornando 1.
// Por lo tanto puede ser utilizada en este contexto.

echo $some_var ? 'true': 'false'; // evaluando la expresión primero y luego pasándola a echo

    **Ejemplo #2 echo no es una expresión**

&lt;?php
// Debido a que echo no se comporta como una expresión, el siguiente código es inválido.
($some_var) ? echo 'true' : echo 'false';
?&gt;

### Notas

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

**Nota**:
**Uso con paréntesis**

    Rodear un solo argumento de echo con paréntesis
    no generará un error de sintaxis, y produce una sintaxis similar a una
    llamada normal de función. Sin embargo, esto puede ser engañoso, ya que los
    paréntesis son en realidad parte de la expresión que se está
    mostrando, y no parte de la sintaxis de echo
    en sí mismo.



    **Ejemplo #3 Uso de paréntesis**



      &lt;?php

echo "hola", PHP_EOL;
// muestra "hola"

echo("hola"), PHP_EOL;
// también muestra "hola", ya que ("hola") es una expresión válida

echo(1 + 2) * 3, PHP_EOL;
// muestra "9"; el paréntesis permite que 1+2 sea evaluado primero, luego 3*3
// echo ve el resultado de la expresión como un solo argumento

echo "hola", " mundo", PHP_EOL;
// muestra "hola mundo"

echo("hola"), (" mundo"), PHP_EOL;
// muestra "hola mundo"; los paréntesis son parte de cada expresión
?&gt;

     **Ejemplo #4 Expresión inválida**



     &lt;?php

echo("hola", " mundo"), PHP_EOL;
// Genera un error de análisis ya que ("hola", " mundo") no es una expresión válida
?&gt;

**Sugerencia**

    Pasar múltiples argumentos a echo permite evitar
    complicaciones que aparecen debido a la precedencia de la operación de
    concatenación en PHP. Por ejemplo, el operador de concatenación tiene una
    precedencia mayor que el operador ternario, y anteriormente a PHP 8.0.0,
    tenía la misma precedencia que la suma y la resta:

&lt;?php
// A continuación, la expresión 'Hola ' . isset($name) es evaluada primero,
// y siempre es verdadera, por lo que el argumento para echo siempre es $name
echo 'Hola ' . isset($name) ? $name : 'John Doe' . '!';

// El comportamiento deseado requiere paréntesis adicionales
echo 'Hola ' . (isset($name) ? $name : 'John Doe') . '!';

// En PHP anterior a 8.0.0, lo siguiente muestra "2", en lugar de "Suma: 3"
echo 'Suma: ' . 1 + 2;

// Nuevamente, añadir paréntesis asegura el orden de evaluación deseado
echo 'Suma: ' . (1 + 2);

    Si se proporcionan múltiples argumentos, entonces los paréntesis no serán
    necesarios para aumentar la precedencia, ya que cada expresión está separada:

&lt;?php
echo "Hola ", isset($name) ? $name : "John Doe", "!";

echo "Suma: ", 1 + 2;

### Ver también

    - [print](#function.print) - Muestra un string

    - [printf()](#function.printf) - Muestra una string formateada

    - [flush()](#function.flush) - Vacía los búferes de salida del sistema

    - [Forma de especificar strings literales](#language.types.string)

# explode

(PHP 4, PHP 5, PHP 7, PHP 8)

explode — Divide una string en segmentos

### Descripción

**explode**([string](#language.types.string) $separator, [string](#language.types.string) $string, [int](#language.types.integer) $limit = **[PHP_INT_MAX](#constant.php-int-max)**): [array](#language.types.array)

**explode()** retorna un array de strings, cada una de ellas siendo una substring del parámetro string extraída utilizando el separador separator.

### Parámetros

     separator


       El separador.






     string


       La string inicial.






     limit


       Si limit está definido y es positivo, el array retornado contiene, como máximo, limit elementos, y el último elemento contendrá el resto de la string.




       Si el parámetro limit es negativo, todos los elementos, excepto los últimos -limit elementos, son retornados.




       Si limit vale cero, es tratado como si valiera 1.





**Nota**:

    Antes de PHP 8.0, [implode()](#function.implode) aceptaba sus parámetros en cualquier orden. **explode()** nunca ha soportado esto: se debe asegurar que el parámetro separator esté colocado antes del parámetro string.

### Valores devueltos

Retorna un [array](#language.types.array) de strings creadas al dividir la string del parámetro string en varios trozos siguiendo el parámetro separator.

Si separator es una string vacía (""), **explode()** lanzará una [ValueError](#class.valueerror). Si separator contiene un valor que no está contenido en string así como un valor negativo para el parámetro limit, entonces **explode()** retornará un [array](#language.types.array) vacío, de lo contrario, un [array](#language.types.array) conteniendo la string string entera. Si los valores de separator aparecen al inicio o al final de string, estos valores serán añadidos como un valor de un [array](#language.types.array) vacío ya sea en la primera o última posición del [array](#language.types.array) retornado respectivamente.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **explode()** lanzará ahora una [ValueError](#class.valueerror) cuando el parámetro separator es una string vacía (""). Anteriormente, **explode()** retornaba **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con explode()**

&lt;?php
// Ejemplo 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0], PHP_EOL; // piece1
echo $pieces[1], PHP_EOL; // piece2

// Ejemplo 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user, PHP_EOL; // foo
echo $pass, PHP_EOL; // \*

?&gt;

    **Ejemplo #2 Ejemplo de valores retornados por la función explode()**

&lt;?php
/_ Una string que no contiene delimitador retornará un array
conteniendo solo un elemento representando la string original _/
$input1 = "hello";
$input2 = "hello,there";
$input3 = ',';
var_dump( explode( ',', $input1 ) );
var_dump( explode( ',', $input2 ) );
var_dump( explode( ',', $input3 ) );

?&gt;

    El ejemplo anterior mostrará:

array(1)
(
[0] =&gt; string(5) "hello"
)
array(2)
(
[0] =&gt; string(5) "hello"
[1] =&gt; string(5) "there"
)
array(2)
(
[0] =&gt; string(0) ""
[1] =&gt; string(0) ""
)

    **Ejemplo #3 Ejemplo con explode()** y el parámetro limit

&lt;?php
$str = 'one|two|three|four';

// limit positivo
print_r(explode('|', $str, 2));

// limit negativo
print_r(explode('|', $str, -1));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; one
[1] =&gt; two|three|four
)
Array
(
[0] =&gt; one
[1] =&gt; two
[2] =&gt; three
)

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [str_split()](#function.str-split) - Convierte un string en un array

    - [mb_split()](#function.mb-split) - Divide una string en un array utilizando una expresión regular multibyte

    - [str_word_count()](#function.str-word-count) - Cuenta el número de palabras utilizadas en un string

    - [strtok()](#function.strtok) - Divide una cadena en segmentos

    - [implode()](#function.implode) - Une elementos de un array en un string

# fprintf

(PHP 5, PHP 7, PHP 8)

fprintf — Escribe una cadena formateada en un flujo

### Descripción

**fprintf**([resource](#language.types.resource) $stream, [string](#language.types.string) $format, [mixed](#language.types.mixed) ...$values): [int](#language.types.integer)

Escribe la cadena producida con el formato format
en el flujo representado por stream.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve la longitud de la cadena escrita.

### Errores/Excepciones

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si el número de argumentos es nulo.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos.
Anterior a PHP 8.0.0, se devolvía **[false](#constant.false)** y se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 fprintf()**: Enteros con ceros iniciales

&lt;?php
if (!($fp = fopen('date.txt', 'w'))) {
return;
}

$year = 2005;
$month = 5;
$day = 6;

fprintf($fp, "%04d-%02d-%02d", $year, $month, $day);
// escribirá la fecha formateada ISO en el fichero date.txt
?&gt;

    **Ejemplo #2 fprintf()**: Formato monetario

&lt;?php
if (!($fp = fopen('currency.txt', 'w'))) {
return;
}

$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
// echo $money mostrará "123.1";
$len = fprintf($fp, '%01.2f', $money);
// escribirá "123.10" en el fichero currency.txt

echo "escritura de $len octetos en el fichero currency.txt";
// utilice el valor devuelto por fprintf para determinar el número de octetos escritos
?&gt;

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# get_html_translation_table

(PHP 4, PHP 5, PHP 7, PHP 8)

get_html_translation_table — Devuelve la tabla de traducción de entidades utilizada por [htmlspecialchars()](#function.htmlspecialchars) y [htmlentities()](#function.htmlentities)

### Descripción

**get_html_translation_table**([int](#language.types.integer) $table = **[HTML_SPECIALCHARS](#constant.html-specialchars)**, [int](#language.types.integer) $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, [string](#language.types.string) $encoding = "UTF-8"): [array](#language.types.array)

**get_html_translation_table()** devuelve la tabla
de traducción de entidades utilizada internamente por las funciones
[htmlspecialchars()](#function.htmlspecialchars) y
[htmlentities()](#function.htmlentities).

**Nota**:

    Los caracteres especiales pueden ser codificados de diferentes maneras. Por ejemplo,
    " puede ser codificado como &amp;quot;,
    &amp;#34; o &amp;#x22.
    **get_html_translation_table()** devuelve
    únicamente la forma utilizada por [htmlspecialchars()](#function.htmlspecialchars) y
    [htmlentities()](#function.htmlentities).

### Parámetros

     table


       La tabla a devolver. Puede ser **[HTML_ENTITIES](#constant.html-entities)** o
       **[HTML_SPECIALCHARS](#constant.html-specialchars)**.






     flags


       Una máscara de uno o varios flag siguientes, que especifican
       qué comillas contendrá la tabla, así como el tipo de documento
       previsto para la tabla. El valor por omisión es
       ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.



        <caption>**Constantes disponibles para el flag flags**</caption>



           Nombre de la constante
           Descripción






           **[ENT_COMPAT](#constant.ent-compat)**
           La tabla contiene entidades para las comillas dobles,
            pero no para las comillas simples.



           **[ENT_QUOTES](#constant.ent-quotes)**
           La tabla contiene entidades para las comillas dobles
            y simples.



           **[ENT_NOQUOTES](#constant.ent-noquotes)**
           La tabla no contiene entidades para las comillas
            dobles ni simples.



           **[ENT_SUBSTITUTE](#constant.ent-substitute)**

            Reemplaza las secuencias de código no válidas con un carácter de reemplazo
            Unicode U+FFFD (UTF-8) o &amp;#FFFD; (en otro caso) en lugar de devolver una
            string vacía.




           **[ENT_HTML401](#constant.ent-html401)**
           Tabla para HTML 4.01.



           **[ENT_XML1](#constant.ent-xml1)**
           Tabla para XML 1.



           **[ENT_XHTML](#constant.ent-xhtml)**
           Tabla para XHTML.



           **[ENT_HTML5](#constant.ent-html5)**
           Tabla para HTML 5.










     encoding


       Codificación a utilizar.
       Si se omite, el valor por omisión es UTF-8.





Están soportados los siguientes juegos de caracteres:

  <caption>**Juegos de caracteres soportados**</caption>
  
   
    
     Juego de caracteres
     Alias
     Descripción


     ISO-8859-1
     ISO8859-1

      Europeo occidental, Latin-1.




     ISO-8859-5
     ISO8859-5

      Juego de caracteres cirílicos poco usado (Latin/Cyrillic).




     ISO-8859-15
     ISO8859-15

      Europeo occidental, Latin-9. Añade el signo de euro, y letras del francés
      y finlandés ausentes en Latin-1 (ISO-8859-1).




     UTF-8
      

      Unicode de 8 bit multibyte compatible con ASCII.




     cp866
     ibm866, 866

      Juego de caracteres cirílico específico de DOS.




     cp1251
     Windows-1251, win-1251, 1251

      Juego de caracteres cirílico específico de Windows.




     cp1252
     Windows-1252, 1252

      Juego de caracteres específico de Windows para Europa occidental.




     KOI8-R
     koi8-ru, koi8r

      Ruso.




     BIG5
     950

      Chino tradicional, usado principalmente en Taiwán.




     GB2312
     936

      Chino simplificado, juego de caracteres estándar nacional.




     BIG5-HKSCS
      

      Big5 con extensiones de Hong Kong, chino tradicional.




     Shift_JIS
     SJIS, SJIS-win, cp932, 932

      Japonés




     EUC-JP
     EUCJP, eucJP-win

      Japonés




     MacRoman
      

      Juego de caracteres que fue utilizado por Mac OS.




     ''
      

      Un string vacío activa la detección desde la codificación del script (Zend multibyte),
      [default_charset](#ini.default-charset) y la actual
      configuración regional (véase [nl_langinfo()](#function.nl-langinfo) y
      [setlocale()](#function.setlocale)), en este orden. No se recomienda.


**Nota**:

No se reconoce cualquier otro juego de caracteres. Será utilizada en su lugar
la codificación por defecto y se emitirá una advertencia.

### Valores devueltos

Devuelve la tabla de traducción, en forma de array,
con las claves como caracteres originales y los valores como las entidades
correspondientes.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       flags cambió de **[ENT_COMPAT](#constant.ent-compat)** a
       **[ENT_QUOTES](#constant.ent-quotes)** | **[ENT_SUBSTITUTE](#constant.ent-substitute)** | **[ENT_HTML401](#constant.ent-html401)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con la tabla de traducción de caracteres a entidades HTML**

&lt;?php
var_dump(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES | ENT_HTML5));
?&gt;

    Resultado del ejemplo anterior es similar a:

array(1510) {
["
"]=&gt;
string(9) "&amp;NewLine;"
["!"]=&gt;
string(6) "&amp;excl;"
["""]=&gt;
string(6) "&amp;quot;"
["#"]=&gt;
string(5) "&amp;num;"
["$"]=&gt;
string(8) "&amp;dollar;"
["%"]=&gt;
string(8) "&amp;percnt;"
["&amp;"]=&gt;
string(5) "&amp;amp;"
["'"]=&gt;
string(6) "&amp;apos;"
// ...
}

### Ver también

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [html_entity_decode()](#function.html-entity-decode) - Convierte las entidades HTML a sus caracteres correspondientes

# hebrev

(PHP 4, PHP 5, PHP 7, PHP 8)

hebrev — Convierte un texto lógico hebreo en texto visual

### Descripción

**hebrev**([string](#language.types.string) $string, [int](#language.types.integer) $max_chars_per_line = 0): [string](#language.types.string)

Convierte un texto lógico hebreo en texto visual.

La función intenta evitar la división de palabras.

### Parámetros

     string


       Un string de entrada en hebreo.






     max_chars_per_line


       El argumento opcional max_chars_per_line
       indica el número máximo de caracteres por línea en el resultado.





### Valores devueltos

Devuelve el string visual.

### Ver también

    - [hebrevc()](#function.hebrevc) - Convierte un texto lógico hebreo en texto visual, con saltos de línea

# hebrevc

(PHP 4, PHP 5, PHP 7)

hebrevc — Convierte un texto lógico hebreo en texto visual, con saltos de línea

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**hebrevc**([string](#language.types.string) $hebrew_text, [int](#language.types.integer) $max_chars_per_line = 0): [string](#language.types.string)

**hebrevc()** es similar a [hebrev()](#function.hebrev)
con la diferencia de que convierte los saltos de línea (\n) en
"&lt;br&gt;\n".

La función intenta evitar la división de palabras.

### Parámetros

     hebrew_text


       Un string de entrada en hebreo.






     max_chars_per_line


       El argumento opcional max_chars_per_line
       indica el número máximo de caracteres por línea en el resultado.





### Valores devueltos

Devuelve el string visual.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido eliminada.




      7.4.0

       Esta función está obsoleta.



### Ver también

    - [hebrev()](#function.hebrev) - Convierte un texto lógico hebreo en texto visual

# hex2bin

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

hex2bin — Convierte una string codificada en hexadecimal a binario

### Descripción

**hex2bin**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Convierte una string binaria codificada en hexadecimal.

**Precaución**

    Esta función no convierte un número hexadecimal a un número binario. Esto puede realizarse utilizando la función [base_convert()](#function.base-convert).

### Parámetros

    string


      Representación hexadecimal de los datos.


### Valores devueltos

Devuelve la representación binaria de los datos o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la string de entrada en hexadecimal tiene una longitud impar o si la string en hexadecimal es inválida, se emitirá una alerta de nivel **[E_WARNING](#constant.e-warning)**.

### Ejemplos

**Ejemplo #1 Ejemplo con hex2bin()**

&lt;?php
$hex = hex2bin("6578616d706c65206865782064617461");
var_dump($hex);
?&gt;

Resultado del ejemplo anterior es similar a:

string(16) "example hex data"

### Ver también

    - [bin2hex()](#function.bin2hex) - Convierte datos binarios en representación hexadecimal

    - [unpack()](#function.unpack) - Desempaqueta datos desde una cadena binaria

# html_entity_decode

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

html_entity_decode — Convierte las entidades HTML a sus caracteres correspondientes

### Descripción

**html_entity_decode**([string](#language.types.string) $string, [int](#language.types.integer) $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

**html_entity_decode()** es la función contraria de
[htmlentities()](#function.htmlentities): convierte las entidades HTML de
la cadena string a sus caracteres correspondientes.

De manera más explícita, esta función decodifica todas las entidades (incluyendo
las entidades numéricas) que 1) son necesariamente válidas para el tipo
de documento seleccionado - es decir, para XML, esta función no decodifica las
entidades nombradas que pueden estar definidas en una DTD - y 2) cuyo carácter
o caracteres están en el juego de caracteres codificado con la codificación elegida y
están permitidos en el tipo de documento seleccionado. Todas las demás entidades
se dejan tal cual.

### Parámetros

     string


       La cadena de entrada.






     flags


       Una máscara de uno o varios flag siguientes, que especifican la forma
       en que deben ser gestionadas las comillas y qué tipo de documento debe ser utilizado.
       Por omisión, es ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.



        <caption>**Constantes disponibles para flags**</caption>



           Constante
           Descripción






           **[ENT_COMPAT](#constant.ent-compat)**
           Convierte las comillas dobles e ignora las comillas simples.



           **[ENT_QUOTES](#constant.ent-quotes)**
           Convierte las comillas dobles y las comillas simples.



           **[ENT_NOQUOTES](#constant.ent-noquotes)**
           No convierte ninguna comilla.



           **[ENT_SUBSTITUTE](#constant.ent-substitute)**

            Reemplaza las secuencias de código no válidas con un carácter de reemplazo
            Unicode U+FFFD (UTF-8) o &amp;#FFFD; (de lo contrario) en lugar de devolver una
            cadena vacía.




           **[ENT_HTML401](#constant.ent-html401)**

            Gestiona el código como HTML 4.01.




           **[ENT_XML1](#constant.ent-xml1)**

            Gestiona el código como XML 1.




           **[ENT_XHTML](#constant.ent-xhtml)**

            Gestiona el código como XHTML.




           **[ENT_HTML5](#constant.ent-html5)**

            Gestiona el código como HTML 5.











     encoding



Un argumento opcional que define el codificado utilizado durante
la conversión de caracteres.

Si se omite, el valor por omisión del parámetro encoding
es el valor de la opción de configuración
[default_charset](#ini.default-charset).

Aunque este argumento es técnicamente opcional, se recomienda encarecidamente
especificar el valor correcto para su código si la opción de configuración
[default_charset](#ini.default-charset)
ha sido definida incorrectamente para la entrada proporcionada.

Están soportados los siguientes juegos de caracteres:

  <caption>**Juegos de caracteres soportados**</caption>
  
   
    
     Juego de caracteres
     Alias
     Descripción


     ISO-8859-1
     ISO8859-1

      Europeo occidental, Latin-1.




     ISO-8859-5
     ISO8859-5

      Juego de caracteres cirílicos poco usado (Latin/Cyrillic).




     ISO-8859-15
     ISO8859-15

      Europeo occidental, Latin-9. Añade el signo de euro, y letras del francés
      y finlandés ausentes en Latin-1 (ISO-8859-1).




     UTF-8
      

      Unicode de 8 bit multibyte compatible con ASCII.




     cp866
     ibm866, 866

      Juego de caracteres cirílico específico de DOS.




     cp1251
     Windows-1251, win-1251, 1251

      Juego de caracteres cirílico específico de Windows.




     cp1252
     Windows-1252, 1252

      Juego de caracteres específico de Windows para Europa occidental.




     KOI8-R
     koi8-ru, koi8r

      Ruso.




     BIG5
     950

      Chino tradicional, usado principalmente en Taiwán.




     GB2312
     936

      Chino simplificado, juego de caracteres estándar nacional.




     BIG5-HKSCS
      

      Big5 con extensiones de Hong Kong, chino tradicional.




     Shift_JIS
     SJIS, SJIS-win, cp932, 932

      Japonés




     EUC-JP
     EUCJP, eucJP-win

      Japonés




     MacRoman
      

      Juego de caracteres que fue utilizado por Mac OS.




     ''
      

      Un string vacío activa la detección desde la codificación del script (Zend multibyte),
      [default_charset](#ini.default-charset) y la actual
      configuración regional (véase [nl_langinfo()](#function.nl-langinfo) y
      [setlocale()](#function.setlocale)), en este orden. No se recomienda.


**Nota**:

No se reconoce cualquier otro juego de caracteres. Será utilizada en su lugar
la codificación por defecto y se emitirá una advertencia.

### Valores devueltos

Devuelve la cadena decodificada.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       flags cambió de **[ENT_COMPAT](#constant.ent-compat)** a
       **[ENT_QUOTES](#constant.ent-quotes)** | **[ENT_SUBSTITUTE](#constant.ent-substitute)** | **[ENT_HTML401](#constant.ent-html401)**.




      8.0.0

       encoding ahora puede ser nullable.



### Ejemplos

    **Ejemplo #1 Decodificar entidades HTML**

&lt;?php
$orig = 'J\'ai "sorti" le &lt;strong&gt;chien&lt;/strong&gt; tout à l\'heure';
$a = htmlentities($orig);
$b = html_entity_decode($a);

echo $a, PHP_EOL; // J'ai &amp;quot;sorti&amp;quot; le &amp;lt;strong&amp;gt;chien&amp;lt;/strong&amp;gt; tout &amp;amp;agrave; l'heure
echo $b, PHP_EOL; // J'ai "sorti" le &lt;strong&gt;chien&lt;/strong&gt; tout à l'heure

?&gt;

### Notas

**Nota**:

    Podría preguntarse por qué
    trim(html_entity_decode('&amp;nbsp;'));
    no reduce la cadena a la cadena vacía. Esto se debe a que
    la entidad &amp;nbsp;
    no es un código ASCII 32 (que sería eliminado por
    [trim()](#function.trim)), sino un código ASCII 160 (0xa0)
    en la codificación por omisión ISO 8859-1.

### Ver también

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [get_html_translation_table()](#function.get-html-translation-table) - Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

# htmlentities

(PHP 4, PHP 5, PHP 7, PHP 8)

htmlentities — Convierte todos los caracteres elegibles en entidades HTML

### Descripción

**htmlentities**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $double_encode = **[true](#constant.true)**
): [string](#language.types.string)

**htmlentities()** es idéntica a la función
[htmlspecialchars()](#function.htmlspecialchars), salvo que todos los caracteres
que tienen equivalentes en entidades HTML son efectivamente
traducidos.
La función [get_html_translation_table()](#function.get-html-translation-table) puede ser utilizada
para retornar la tabla de traducción utilizada
en función de las constantes flags proporcionadas.

Si se desea realizar la operación inversa, se debe utilizar
la función [html_entity_decode()](#function.html-entity-decode).

### Parámetros

     string


       El string de entrada.






     flags


       Una máscara de uno o varios flags siguientes, que determinan la forma
       en que las comillas serán gestionadas, cómo las secuencias de código inválido serán
       gestionadas así como el tipo de documento utilizado. Por omisión, es
       ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.



        <caption>**Constantes disponibles para flags**</caption>



           Constante
           Descripción






           **[ENT_COMPAT](#constant.ent-compat)**
           Convierte las comillas dobles e ignora las comillas simples.



           **[ENT_QUOTES](#constant.ent-quotes)**
           Convierte las comillas dobles y las comillas simples.



           **[ENT_NOQUOTES](#constant.ent-noquotes)**
           Ignora las comillas dobles y las comillas simples.



           **[ENT_IGNORE](#constant.ent-ignore)**

            Ignora las secuencias de caracteres inválidas en lugar de retornar un
            string vacío. El uso de este flag es fuertemente
            desaconsejado por
            [» razones de seguridad](http://unicode.org/reports/tr36/#Deletion_of_Noncharacters).




           **[ENT_SUBSTITUTE](#constant.ent-substitute)**

            Reemplaza las secuencias de código inválido con un carácter de reemplazo
            Unicode U+FFFD (UTF-8) o &amp;#FFFD; (de lo contrario) en lugar de retornar un
            string vacío.




           **[ENT_DISALLOWED](#constant.ent-disallowed)**

            Reemplaza los puntos de código inválidos del documento proporcionado con
            un carácter de reemplazo Unicode U+FFFD (UTF-8) o &amp;#FFFD;
            (de lo contrario) en lugar de dejarlo tal cual. Esto puede ser útil para,
            por ejemplo, asegurar el correcto formato de documentos XML que contienen
            contenido externo.




           **[ENT_HTML401](#constant.ent-html401)**

            Gestiona el código como HTML 4.01.




           **[ENT_XML1](#constant.ent-xml1)**

            Gestiona el código como XML 1.




           **[ENT_XHTML](#constant.ent-xhtml)**

            Gestiona el código como XHTML.




           **[ENT_HTML5](#constant.ent-html5)**

            Gestiona el código como HTML 5.











     encoding



Un argumento opcional que define el codificado utilizado durante
la conversión de caracteres.

Si se omite, el valor por omisión del parámetro encoding
es el valor de la opción de configuración
[default_charset](#ini.default-charset).

Aunque este argumento es técnicamente opcional, se recomienda encarecidamente
especificar el valor correcto para su código si la opción de configuración
[default_charset](#ini.default-charset)
ha sido definida incorrectamente para la entrada proporcionada.

Están soportados los siguientes juegos de caracteres:

  <caption>**Juegos de caracteres soportados**</caption>
  
   
    
     Juego de caracteres
     Alias
     Descripción


     ISO-8859-1
     ISO8859-1

      Europeo occidental, Latin-1.




     ISO-8859-5
     ISO8859-5

      Juego de caracteres cirílicos poco usado (Latin/Cyrillic).




     ISO-8859-15
     ISO8859-15

      Europeo occidental, Latin-9. Añade el signo de euro, y letras del francés
      y finlandés ausentes en Latin-1 (ISO-8859-1).




     UTF-8
      

      Unicode de 8 bit multibyte compatible con ASCII.




     cp866
     ibm866, 866

      Juego de caracteres cirílico específico de DOS.




     cp1251
     Windows-1251, win-1251, 1251

      Juego de caracteres cirílico específico de Windows.




     cp1252
     Windows-1252, 1252

      Juego de caracteres específico de Windows para Europa occidental.




     KOI8-R
     koi8-ru, koi8r

      Ruso.




     BIG5
     950

      Chino tradicional, usado principalmente en Taiwán.




     GB2312
     936

      Chino simplificado, juego de caracteres estándar nacional.




     BIG5-HKSCS
      

      Big5 con extensiones de Hong Kong, chino tradicional.




     Shift_JIS
     SJIS, SJIS-win, cp932, 932

      Japonés




     EUC-JP
     EUCJP, eucJP-win

      Japonés




     MacRoman
      

      Juego de caracteres que fue utilizado por Mac OS.




     ''
      

      Un string vacío activa la detección desde la codificación del script (Zend multibyte),
      [default_charset](#ini.default-charset) y la actual
      configuración regional (véase [nl_langinfo()](#function.nl-langinfo) y
      [setlocale()](#function.setlocale)), en este orden. No se recomienda.


**Nota**:

No se reconoce cualquier otro juego de caracteres. Será utilizada en su lugar
la codificación por defecto y se emitirá una advertencia.

     double_encode


       Cuando double_encode está desactivado, PHP no codificará
       las entidades html existentes. Por omisión, todo es convertido.





### Valores devueltos

Retorna el string codificado.

Si la entrada string contiene una secuencia de
código inválido en el encoding encoding
proporcionado, un string vacío será retornado, a menos que el flag
**[ENT_IGNORE](#constant.ent-ignore)** o el flag
**[ENT_SUBSTITUTE](#constant.ent-substitute)** esté definido.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       flags cambió de **[ENT_COMPAT](#constant.ent-compat)** a
       **[ENT_QUOTES](#constant.ent-quotes)** | **[ENT_SUBSTITUTE](#constant.ent-substitute)** | **[ENT_HTML401](#constant.ent-html401)**.




      8.0.0

       encoding ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con htmlentities()**

&lt;?php
$str = 'Un \'apostrophe\' en &lt;strong&gt;gras&lt;/strong&gt;';

echo htmlentities($str);
echo "\n\n";
echo htmlentities($str, ENT_COMPAT);
?&gt;

    El ejemplo anterior mostrará:

Un &amp;#039;apostrophee&amp;#039; est &amp;lt;b&amp;gt;gras&amp;lt;/b&amp;gt;

Un 'apostrophe' est &amp;lt;b&amp;gt;gras&amp;lt;/b&amp;gt

    **Ejemplo #2 Utilización de [ENT_IGNORE](#constant.ent-ignore)**

&lt;?php
$str = "\x8F!!!";

// Muestra un string vacío
echo htmlentities($str, ENT_QUOTES, "UTF-8");

// Muestra "!!!"
echo htmlentities($str, ENT_QUOTES | ENT_IGNORE, "UTF-8");
?&gt;

### Ver también

    - [html_entity_decode()](#function.html-entity-decode) - Convierte las entidades HTML a sus caracteres correspondientes

    - [get_html_translation_table()](#function.get-html-translation-table) - Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [nl2br()](#function.nl2br) - Inserta un salto de línea HTML en cada nueva línea

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

# htmlspecialchars

(PHP 4, PHP 5, PHP 7, PHP 8)

htmlspecialchars — Convierte caracteres especiales en entidades HTML

### Descripción

**htmlspecialchars**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $double_encode = **[true](#constant.true)**
): [string](#language.types.string)

Algunos caracteres tienen significados especiales en HTML,
y deben ser reemplazados por entidades HTML para conservar
sus significados. Esta función retorna un string con estas modificaciones. Si se necesita que todas
las subcadenas de entrada que están asociadas a entidades
nombradas sean transformadas, se debe utilizar la función
[htmlentities()](#function.htmlentities).

Si el string de entrada pasado a esta función y el documento final
comparten el mismo juego de caracteres, esta función es suficiente para
preparar la entrada para una inclusión en la mayoría de los contextos
de un documento HTML. Sin embargo, si la entrada puede presentar caracteres
que no están codificados en el juego de caracteres del documento final,
y se desea preservar estos caracteres (como numéricos o
entidades nombradas), esta función y la función [htmlentities()](#function.htmlentities)
(que solo codifica las subcadenas que tienen entidades nombradas equivalentes)
no son suficientes. Se debe utilizar la función
[mb_encode_numericentity()](#function.mb-encode-numericentity) en su lugar.

    <caption>**Reemplazos realizados**</caption>



       Carácter
       Reemplazo






       &amp; (ampersand)
       &amp;amp;



       " (comillas dobles)
       &amp;quot; excepto si **[ENT_NOQUOTES](#constant.ent-noquotes)**



       ' (comilla simple)

        &amp;#039; (para **[ENT_HTML401](#constant.ent-html401)**) o
        &amp;apos; (para
        **[ENT_XML1](#constant.ent-xml1)**, **[ENT_XHTML](#constant.ent-xhtml)** o
        **[ENT_HTML5](#constant.ent-html5)**), pero solo cuando
        **[ENT_QUOTES](#constant.ent-quotes)** está definido




       &lt; (menor que)
       &amp;lt;



       &gt; (mayor que)
       &amp;gt;




### Parámetros

     string


       El string a convertir.






     flags


       Una máscara de bits de uno o más flags siguientes, que determinan la forma
       en que las comillas serán gestionadas, cómo se manejarán las secuencias de código inválido, así como el tipo de documento utilizado. Por omisión, es
       ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.



        <caption>**Constantes disponibles para flags**</caption>



           Constante
           Descripción






           **[ENT_COMPAT](#constant.ent-compat)**
           Convierte las comillas dobles e ignora las comillas simples.



           **[ENT_QUOTES](#constant.ent-quotes)**
           Convierte las comillas dobles y las comillas simples.



           **[ENT_NOQUOTES](#constant.ent-noquotes)**
           Ignora las comillas dobles y las comillas simples.



           **[ENT_IGNORE](#constant.ent-ignore)**

            Ignora las secuencias de caracteres inválidas en lugar de retornar un
            string vacío. El uso de este flag está fuertemente
            desaconsejado por
            [» razones de seguridad](http://unicode.org/reports/tr36/#Deletion_of_Noncharacters).




           **[ENT_SUBSTITUTE](#constant.ent-substitute)**

            Reemplaza las secuencias de código inválido con un carácter de reemplazo
            Unicode U+FFFD (UTF-8) o &amp;#xFFFD; (de lo contrario) en lugar de retornar un
            string vacío.




           **[ENT_DISALLOWED](#constant.ent-disallowed)**

            Reemplaza los puntos de código inválidos del documento proporcionado con
            un carácter de reemplazo Unicode U+FFFD (UTF-8) o &amp;#xFFFD;
            (de lo contrario) en lugar de dejarlo tal cual. Esto puede ser útil para,
            por ejemplo, asegurar el correcto formato de documentos XML que contienen
            contenido externo.




           **[ENT_HTML401](#constant.ent-html401)**

            Maneja el código como HTML 4.01.




           **[ENT_XML1](#constant.ent-xml1)**

            Maneja el código como XML 1.




           **[ENT_XHTML](#constant.ent-xhtml)**

            Maneja el código como XHTML.




           **[ENT_HTML5](#constant.ent-html5)**

            Maneja el código como HTML 5.











     encoding



Un argumento opcional que define el codificado utilizado durante
la conversión de caracteres.

Si se omite, el valor por omisión del parámetro encoding
es el valor de la opción de configuración
[default_charset](#ini.default-charset).

Aunque este argumento es técnicamente opcional, se recomienda encarecidamente
especificar el valor correcto para su código si la opción de configuración
[default_charset](#ini.default-charset)
ha sido definida incorrectamente para la entrada proporcionada.

       Para esta función, los encodings
       ISO-8859-1, ISO-8859-15,
       UTF-8, cp866,
       cp1251, cp1252, y
       KOI8-R son equivalentes, siempre que
       el parámetro string sea válido
       para el encoding, en el sentido de que los caracteres afectados por la función
       **htmlspecialchars()** ocupen la misma posición
       en todos estos encodings.





Están soportados los siguientes juegos de caracteres:

  <caption>**Juegos de caracteres soportados**</caption>
  
   
    
     Juego de caracteres
     Alias
     Descripción


     ISO-8859-1
     ISO8859-1

      Europeo occidental, Latin-1.




     ISO-8859-5
     ISO8859-5

      Juego de caracteres cirílicos poco usado (Latin/Cyrillic).




     ISO-8859-15
     ISO8859-15

      Europeo occidental, Latin-9. Añade el signo de euro, y letras del francés
      y finlandés ausentes en Latin-1 (ISO-8859-1).




     UTF-8
      

      Unicode de 8 bit multibyte compatible con ASCII.




     cp866
     ibm866, 866

      Juego de caracteres cirílico específico de DOS.




     cp1251
     Windows-1251, win-1251, 1251

      Juego de caracteres cirílico específico de Windows.




     cp1252
     Windows-1252, 1252

      Juego de caracteres específico de Windows para Europa occidental.




     KOI8-R
     koi8-ru, koi8r

      Ruso.




     BIG5
     950

      Chino tradicional, usado principalmente en Taiwán.




     GB2312
     936

      Chino simplificado, juego de caracteres estándar nacional.




     BIG5-HKSCS
      

      Big5 con extensiones de Hong Kong, chino tradicional.




     Shift_JIS
     SJIS, SJIS-win, cp932, 932

      Japonés




     EUC-JP
     EUCJP, eucJP-win

      Japonés




     MacRoman
      

      Juego de caracteres que fue utilizado por Mac OS.




     ''
      

      Un string vacío activa la detección desde la codificación del script (Zend multibyte),
      [default_charset](#ini.default-charset) y la actual
      configuración regional (véase [nl_langinfo()](#function.nl-langinfo) y
      [setlocale()](#function.setlocale)), en este orden. No se recomienda.


**Nota**:

No se reconoce cualquier otro juego de caracteres. Será utilizada en su lugar
la codificación por defecto y se emitirá una advertencia.

     double_encode


       Cuando el parámetro double_encode está desactivado,
       PHP no codificará las entidades html existentes; por omisión, todo es convertido.





### Valores devueltos

El string convertido.

Si el string de entrada string contiene una
secuencia de código inválida en el parámetro
encoding proporcionado, se retornará un string vacío
a menos que el flag **[ENT_IGNORE](#constant.ent-ignore)** o
**[ENT_SUBSTITUTE](#constant.ent-substitute)** esté definido.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       flags cambió de **[ENT_COMPAT](#constant.ent-compat)** a
       **[ENT_QUOTES](#constant.ent-quotes)** | **[ENT_SUBSTITUTE](#constant.ent-substitute)** | **[ENT_HTML401](#constant.ent-html401)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con htmlspecialchars()**

&lt;?php
$new = htmlspecialchars("&lt;a href='test'&gt;Test&lt;/a&gt;", ENT_QUOTES);
echo $new; // &amp;lt;a href=&amp;#039;test&amp;#039;&amp;gt;Test&amp;lt;/a&amp;gt;
?&gt;

### Notas

**Nota**:

    Tenga en cuenta que esta función no realiza ningún otro reemplazo que los
    que están listados anteriormente. Para realizar un reemplazo completo,
    consulte [htmlentities()](#function.htmlentities).

**Nota**:

    En el caso de un valor ambiguo para flags,
    se aplican las siguientes reglas:







     -

       Cuando ninguno de **[ENT_COMPAT](#constant.ent-compat)**,
       **[ENT_QUOTES](#constant.ent-quotes)**,
       **[ENT_NOQUOTES](#constant.ent-noquotes)** está presente,
       el valor por omisión es **[ENT_NOQUOTES](#constant.ent-noquotes)**.



     -

       Cuando más de uno de **[ENT_COMPAT](#constant.ent-compat)**,
       **[ENT_QUOTES](#constant.ent-quotes)**,
       **[ENT_NOQUOTES](#constant.ent-noquotes)** están presentes,
       **[ENT_QUOTES](#constant.ent-quotes)** tiene la mayor prioridad,
       seguido de **[ENT_COMPAT](#constant.ent-compat)**.



     -

       Cuando ninguno de **[ENT_HTML401](#constant.ent-html401)**,
       **[ENT_HTML5](#constant.ent-html5)**,
       **[ENT_XHTML](#constant.ent-xhtml)**, **[ENT_XML1](#constant.ent-xml1)** está presente,
       el valor por omisión es **[ENT_HTML401](#constant.ent-html401)**.



     -

       Cuando más de uno de **[ENT_HTML401](#constant.ent-html401)**,
       **[ENT_HTML5](#constant.ent-html5)**,
       **[ENT_XHTML](#constant.ent-xhtml)**, **[ENT_XML1](#constant.ent-xml1)** están presentes,
       **[ENT_HTML5](#constant.ent-html5)** tiene la mayor prioridad,
       seguido de **[ENT_XHTML](#constant.ent-xhtml)**, **[ENT_XML1](#constant.ent-xml1)** y
       **[ENT_HTML401](#constant.ent-html401)**.



     -

       Cuando más de uno de **[ENT_DISALLOWED](#constant.ent-disallowed)**,
       **[ENT_IGNORE](#constant.ent-ignore)**,
       **[ENT_SUBSTITUTE](#constant.ent-substitute)** están presentes,
       **[ENT_IGNORE](#constant.ent-ignore)** tiene la mayor prioridad,
       seguido de **[ENT_SUBSTITUTE](#constant.ent-substitute)**.



### Ver también

    - [get_html_translation_table()](#function.get-html-translation-table) - Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities

    - [htmlspecialchars_decode()](#function.htmlspecialchars-decode) - Convierte las entidades HTML especiales en caracteres

    - [strip_tags()](#function.strip-tags) - Elimina las etiquetas HTML y PHP de un string

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [nl2br()](#function.nl2br) - Inserta un salto de línea HTML en cada nueva línea

# htmlspecialchars_decode

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

htmlspecialchars_decode —
Convierte las entidades HTML especiales en caracteres

### Descripción

**htmlspecialchars_decode**([string](#language.types.string) $string, [int](#language.types.integer) $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): [string](#language.types.string)

Esta función es la opuesta a [htmlspecialchars()](#function.htmlspecialchars). Convierte las entidades HTML especiales en caracteres.

Las entidades convertidas son: &amp;amp;,
&amp;quot; (cuando **[ENT_NOQUOTES](#constant.ent-noquotes)** no está activado),
&amp;#039; (cuando **[ENT_QUOTES](#constant.ent-quotes)** está activado),
&amp;lt; y &amp;gt;.

### Parámetros

     string


       La [string](#language.types.string) a decodificar






     flags


       Una máscara de uno o varios flags siguientes,
       que especifican cómo deben ser gestionadas las comillas
       y qué tipo de documento utilizar. Por omisión, es
       ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.



        <caption>**Constantes disponibles para el parámetro flags**</caption>



           Nombre de la constante
           Descripción






           **[ENT_COMPAT](#constant.ent-compat)**
           Convertirá las comillas y dejará las apóstrofes.



           **[ENT_QUOTES](#constant.ent-quotes)**
           Convertirá las comillas y los apóstrofes.



           **[ENT_NOQUOTES](#constant.ent-noquotes)**
           Dejará las comillas y los apóstrofes sin convertir.



           **[ENT_SUBSTITUTE](#constant.ent-substitute)**

            Reemplaza las secuencias de código no válidas con un carácter de reemplazo
            Unicode U+FFFD (UTF-8) o &amp;#FFFD; (en otro caso) en lugar de devolver una
            cadena vacía.




           **[ENT_HTML401](#constant.ent-html401)**

            Gestiona el código como HTML 4.01.




           **[ENT_XML1](#constant.ent-xml1)**

            Gestiona el código como XML 1.




           **[ENT_XHTML](#constant.ent-xhtml)**

            Gestiona el código como XHTML.




           **[ENT_HTML5](#constant.ent-html5)**

            Gestiona el código como HTML 5.










### Valores devueltos

Devuelve la cadena de caracteres decodificada.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       flags cambió de **[ENT_COMPAT](#constant.ent-compat)** a
       **[ENT_QUOTES](#constant.ent-quotes)** | **[ENT_SUBSTITUTE](#constant.ent-substitute)** | **[ENT_HTML401](#constant.ent-html401)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con htmlspecialchars_decode()**

&lt;?php
$str = "&lt;p&gt;this -&amp;gt; &amp;quot;&lt;/p&gt;\n";

echo htmlspecialchars_decode($str);

// note aquí que las comillas no están convertidas
echo htmlspecialchars_decode($str, ENT_NOQUOTES);
?&gt;

    El ejemplo anterior mostrará:

&lt;p&gt;this -&gt; "&lt;/p&gt;
&lt;p&gt;this -&gt; &amp;quot;&lt;/p&gt;

### Ver también

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [html_entity_decode()](#function.html-entity-decode) - Convierte las entidades HTML a sus caracteres correspondientes

    - [get_html_translation_table()](#function.get-html-translation-table) - Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities

# implode

(PHP 4, PHP 5, PHP 7, PHP 8)

implode — Une elementos de un array en un string

### Descripción

**implode**([string](#language.types.string) $separator, [array](#language.types.array) $array): [string](#language.types.string)

Firma alternativa (no se admite argumentos con nombre):

**implode**([array](#language.types.array) $array): [string](#language.types.string)

Firma heredada (obsoleta a partir de PHP 7.4.0, eliminada a partir de PHP 8.0.0):

**implode**([array](#language.types.array) $array, [string](#language.types.string) $separator): [string](#language.types.string)

Une los elementos de un array con el string separator.

### Parámetros

     separator


       Opcional. Por defecto es un string vacío.






     array


       El array de strings a ser usados por implode.





### Valores devueltos

Devuelve un string que contiene la representación de todos los elementos
del array en el mismo orden, con el string 'glue' entre cada elemento.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Pasar el parámetro separator después del array
       ya no es compatible.




      7.4.0

       Pasar el parámetro separator después del array
       (es decir, sin utilizar el orden documentado de los parámetros) es obsoleto.



### Ejemplos

    **Ejemplo #1 Ejemplo de implode()**

&lt;?php

$array = ['lastname', 'email', 'phone'];
var_dump(implode(",", $array)); // string(20) "lastname,email,phone"

// Devuelve un string vacío si se usa un array vacío:
var_dump(implode('hello', [])); // string(0) ""

// El separador es opcional:
var_dump(implode(['a', 'b', 'c'])); // string(3) "abc"

?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [explode()](#function.explode) - Divide una string en segmentos

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [http_build_query()](#function.http-build-query) - Genera una string de consulta con codificación URL

# join

(PHP 4, PHP 5, PHP 7, PHP 8)

join — Alias de [implode()](#function.implode)

### Descripción

Esta función es un alias de:
[implode()](#function.implode).

# lcfirst

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

lcfirst — Pone el primer carácter en minúscula

### Descripción

**lcfirst**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve una cadena cuyo primer carácter de
string ha sido puesto en minúscula, si este carácter
es un carácter ASCII en el rango que va de "A" (0x41)
a "Z" (0x5a).

### Parámetros

     string


       La cadena de entrada.





### Valores devueltos

Devuelve la cadena resultante.

### Historial de cambios

      Versión
      Descripción







8.2.0

La conversión de la casilla ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se convertirán los caracteres ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo con lcfirst()**

&lt;?php
$foo = 'HelloWorld';
echo lcfirst($foo), PHP_EOL; // helloWorld

$bar = 'HELLO WORLD!';
echo lcfirst($bar), PHP_EOL; // hELLO WORLD!
echo lcfirst(strtoupper($bar)), PHP_EOL; // hELLO WORLD!
?&gt;

### Ver también

    - [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

    - [ucwords()](#function.ucwords) - Pone en mayúscula la primera letra de todas las palabras

# levenshtein

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

levenshtein — Calcula la distancia Levenshtein entre dos strings

### Descripción

**levenshtein**(
    [string](#language.types.string) $string1,
    [string](#language.types.string) $string2,
    [int](#language.types.integer) $insertion_cost = 1,
    [int](#language.types.integer) $replacement_cost = 1,
    [int](#language.types.integer) $deletion_cost = 1
): [int](#language.types.integer)

La distancia Levenshtein se define como el número
mínimo de caracteres que deben ser reemplazados, insertados o eliminados
para transformar el string string1 en
string2. La complejidad del algoritmo
es de O(m\*n),
donde n y m son los tamaños
respectivos de string1 y
string2: es bastante buena, en comparación
con [similar_text()](#function.similar-text), que es de
O(max(n,m)\*\*3), pero sigue siendo muy costosa.

Si insertion_cost, replacement_cost
y/o deletion_cost son diferentes de 1,
el algoritmo se adapta para elegir la transformación menos costosa.
Por ejemplo, si $insertion_cost + $deletion_cost &lt; $replacement_cost,
no se realizará ningún reemplazo, sino inserciones y eliminaciones.

### Parámetros

     string1


       Uno de los strings a evaluar.






     string2


       Uno de los strings a evaluar.






     insertion_cost


       Define el costo de la inserción.






     replacement_cost


       Define el costo del reemplazo.






     deletion_cost


       Define el costo de la eliminación.





### Valores devueltos

Esta función devuelve la distancia Levenshtein entre dos strings.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Antes de esta versión, **levenshtein()** debía ser llamada
       con dos o cinco argumentos.




      8.0.0

       Antes de esta versión, **levenshtein()** devolvía -1
       si alguno de los strings de los argumentos superaba los 255 caracteres.



### Ejemplos

    **Ejemplo #1 Ejemplo con levenshtein()**

&lt;?php
// palabra mal escrita
$input = 'carrrot';

// array de palabras a verificar
$words = array('apple','pineapple','banana','orange',
'radish','carrot','pea','bean','potato');

// ninguna distancia encontrada por el momento
$shortest = -1;

// bucle sobre las palabras para encontrar la más cercana
foreach ($words as $word) {

    // calcula la distancia con la palabra ingresada,
    // y la palabra actual
    $lev = levenshtein($input, $word);

    // busca una coincidencia exacta
    if ($lev == 0) {

        // la palabra más cercana es esta (coincidencia exacta)
        $closest = $word;
        $shortest = 0;

        // se sale del bucle; se ha encontrado una coincidencia exacta
        break;
    }

    // Si la distancia es más pequeña que la siguiente distancia encontrada
    // O, si la siguiente palabra más cercana aún no ha sido encontrada
    if ($lev &lt;= $shortest || $shortest &lt; 0) {
        // definición de la palabra más cercana y la distancia
        $closest  = $word;
        $shortest = $lev;
    }

}

echo "Palabra ingresada: $input\n";
if ($shortest == 0) {
echo "Coincidencia exacta encontrada: $closest\n";
} else {
echo "¿Quiso decir: $closest?\n";
}

?&gt;

    El ejemplo anterior mostrará:

Palabra ingresada: carrrot
¿Quiso decir: carrot?

### Ver también

    - [soundex()](#function.soundex) - Calcula la clave soundex

    - [similar_text()](#function.similar-text) - Calcula la similitud entre dos strings

    - [metaphone()](#function.metaphone) - Calcula la clave metaphone

# localeconv

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

localeconv — Lee la configuración local

### Descripción

**localeconv**(): [array](#language.types.array)

Devuelve un array asociativo que contiene la información de formatos localizados para números y moneda.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**localeconv()** devuelve los formatos según la configuración realizada con [setlocale()](#function.setlocale).
El array asociativo que se devuelve contiene los siguientes índices:

       Índice del array
       Descripción






       decimal_point
       Separador decimal



       thousands_sep
       Separador de miles



       grouping
       Array que contiene los agrupamientos numéricos



       int_curr_symbol
       Símbolo monetario internacional (p.ej. EUR)



       currency_symbol
       Símbolo monetario local (p.ej. ¤)



       mon_decimal_point
       Separador decimal monetario



       mon_thousands_sep
       Separador de miles monetario



       mon_grouping
       Array que contiene los agrupamientos numéricos monetarios



       positive_sign
       Signo para valores positivos



       negative_sign
       Signo para valores negativos



       int_frac_digits
       Número internacional de decimales



       frac_digits
       Número local de decimales



       p_cs_precedes

        **[true](#constant.true)** si currency_symbol precede a un valor positivo y **[false](#constant.false)** si le sigue.




       p_sep_by_space

        **[true](#constant.true)** si un espacio separa currency_symbol de un valor positivo, y **[false](#constant.false)** en caso contrario.




       n_cs_precedes

        **[true](#constant.true)** si currency_symbol precede a un valor negativo, y **[false](#constant.false)** si le sigue.




       n_sep_by_space

        **[true](#constant.true)** si un espacio separa currency_symbol de un valor negativo, y **[false](#constant.false)** en caso contrario.




       p_sign_posn


         - 0 - Paréntesis rodean el valor y el símbolo monetario

         - 1 - El signo precede al valor y al símbolo monetario

         - 2 - El signo sigue al valor y al símbolo monetario

         - 3 - El signo precede inmediatamente al valor y al símbolo monetario

         - 4 - El signo sigue inmediatamente al valor y al símbolo monetario






       n_sign_posn


         - 0 - Paréntesis rodean el valor y el símbolo monetario

         - 1 - El signo precede al valor y al símbolo monetario

         - 2 - El signo sigue al valor y al símbolo monetario

         - 3 - El signo precede inmediatamente al valor y al símbolo monetario

         - 4 - El signo sigue inmediatamente al valor y al símbolo monetario







Los campos p_sign_posn y n_sign_posn contienen una cadena formateada de opciones. Cada número representa una de las condiciones listadas anteriormente.

Los campos de agrupamiento contienen arrays que definen cómo deben agruparse los números. Por ejemplo, el campo de agrupamiento monetario para nl_NL (en modo UTF-8 con el símbolo euro), contendrá dos elementos, con los valores 3 y 3. Si un elemento de array contiene **[CHAR_MAX](#constant.char-max)**, no se realiza ningún otro agrupamiento. Si un elemento de array contiene 0, debe usarse el elemento anterior.

### Ejemplos

    **Ejemplo #1 Ejemplo con localeconv()**

&lt;?php
if (false !== setlocale(LC_ALL, 'nl_NL.UTF-8@euro')) {
$locale_info = localeconv();
    print_r($locale_info);
}
?&gt;

    El ejemplo anterior mostrará:

Array
(
[decimal_point] =&gt; .
[thousands_sep] =&gt;
[int_curr_symbol] =&gt; EUR
[currency_symbol] =&gt; ¤
[mon_decimal_point] =&gt; ,
[mon_thousands_sep] =&gt;
[positive_sign] =&gt;
[negative_sign] =&gt; -
[int_frac_digits] =&gt; 2
[frac_digits] =&gt; 2
[p_cs_precedes] =&gt; 1
[p_sep_by_space] =&gt; 1
[n_cs_precedes] =&gt; 1
[n_sep_by_space] =&gt; 1
[p_sign_posn] =&gt; 1
[n_sign_posn] =&gt; 2
[grouping] =&gt; Array
(
)

    [mon_grouping] =&gt; Array
        (
            [0] =&gt; 3
            [1] =&gt; 3
        )

)

### Ver también

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

# ltrim

(PHP 4, PHP 5, PHP 7, PHP 8)

ltrim — Elimina los espacios (u otros caracteres) del inicio de un string

### Descripción

**ltrim**([string](#language.types.string) $string, [string](#language.types.string) $characters = " \n\r\t\v\x00"): [string](#language.types.string)

Elimina los espacios (u otros caracteres) del inicio de un string.

### Parámetros

    string


      El string de entrada.




    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres que deben ser eliminados.
Con .., es posible especificar un rango creciente de caracteres.

### Valores devueltos

Esta función devuelve un string con los espacios eliminados al inicio del string.

### Ejemplos

    **Ejemplo #1 Ejemplo con ltrim()**

&lt;?php

$text = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = ltrim($text);
var_dump($trimmed);

$trimmed = ltrim($text, " \t.");
var_dump($trimmed);

$trimmed = ltrim($hello, "Hdle");
var_dump($trimmed);

// Elimina los caracteres de control ASCII del inicio de $binary
// (de 0 a 31, inclusive)
$clean = ltrim($binary, "\x00..\x1F");
var_dump($clean);

?&gt;

    El ejemplo anterior mostrará:

string(32) " These are a few words :) ... "
string(16) " Example string
"
string(11) "Hello World"

string(30) "These are a few words :) ... "
string(30) "These are a few words :) ... "
string(7) "o World"
string(15) "Example string
"

### Ver también

- [trim()](#function.trim) - Elimina los espacios (u otros caracteres) al inicio y al final de un string

- [rtrim()](#function.rtrim) - Elimina los espacios (u otros caracteres) al final de un string

# md5

(PHP 4, PHP 5, PHP 7, PHP 8)

md5 — Calcula el md5 de un string

**Advertencia**

No se recomienda utilizar esta función para asegurar contraseñas, debido a la naturaleza
rápida de este algoritmo de hash. Ver [F.A.Q del hash de
contraseñas](#faq.passwords.fasthash) para más detalles y las buenas prácticas.

### Descripción

**md5**([string](#language.types.string) $string, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)

Calcula el MD5 del string string utilizando el algoritmo
[» RSA Data Security, Inc. MD5 Message-Digest Algorithm](https://datatracker.ietf.org/doc/html/rfc1321),
y devuelve el resultado.

### Parámetros

     string


       El string.






     binary


       Si el argumento opcional binary está definido a **[true](#constant.true)**,
       entonces el md5 se devuelve en formato binario crudo con una longitud de 16.





### Valores devueltos

Devuelve el md5 del string, en forma de un número hexadecimal de 32 caracteres.

### Ejemplos

    **Ejemplo #1 Ejemplo con md5()**

&lt;?php
$str = 'apple';

if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
echo "¿Desea una golden o una spartan?";
}
?&gt;

### Ver también

    - [hash()](#function.hash) - Genera un valor de hachado (huella digital)

    - [password_hash()](#function.password-hash) - Crea una clave de hash para una contraseña

# md5_file

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

md5_file — Calcula el md5 de un fichero

### Descripción

**md5_file**([string](#language.types.string) $filename, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

**md5_file()** calcula el MD5 del fichero
filename utilizando el algoritmo
[» RSA Data Security, Inc.
MD5 Message-Digest Algorithm](https://datatracker.ietf.org/doc/html/rfc1321),
luego devuelve el
valor calculado. El resultado es un número de 32
caracteres hexadecimales.

### Parámetros

     filename


       El nombre del fichero.






     binary


       Cuando **[true](#constant.true)**, devuelve el preprocesamiento en formato binario sin tratar con
       un tamaño de 16.





### Valores devueltos

Devuelve un string en caso de éxito, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de md5_file()**

&lt;?php
$file = '/examples/book.xml';

echo 'La firma MD5 del fichero ' . $file . ' es ' . md5_file($file);
?&gt;

### Ver también

    - [hash_file()](#function.hash-file) - Genera un valor de hash utilizando el contenido de un fichero dado

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [md5()](#function.md5) - Calcula el md5 de un string

# metaphone

(PHP 4, PHP 5, PHP 7, PHP 8)

metaphone — Calcula la clave metaphone

### Descripción

**metaphone**([string](#language.types.string) $string, [int](#language.types.integer) $max_phonemes = 0): [string](#language.types.string)

Calcula la clave metaphone de string.

**metaphone()** es similar a la función
[soundex()](#function.soundex): crea una clave similar
para palabras cuya pronunciación es cercana. Es una
función más precisa que [soundex()](#function.soundex)
ya que tiene en cuenta la pronunciación inglesa. La clave
metaphone generada es de tamaño variable.

Metaphone fue desarrollado por Lawrence Philips
&lt;lphilips at verity dot com&gt;. Este método está descrito
en el libro ["Practical Algorithms for Programmers",
Binstock &amp; Rex, Addison Wesley, 1995].

### Parámetros

     string


       La cadena de entrada.






     max_phonemes


       Este parámetro restringe la clave metaphone devuelta a una longitud de
       max_phonemes *caracteres*.
       Sin embargo, los fonemas resultantes siempre se transcriben completamente,
       por lo que la longitud de la cadena resultante puede ser ligeramente más larga
       que max_phonemes.
       El valor por omisión es 0, lo que
       significa que no se aplicará ninguna limitación.





### Valores devueltos

Devuelve la clave metaphone, en forma de [string](#language.types.string).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devolvía **[false](#constant.false)** en caso de error.



### Ejemplos

    **Ejemplo #1 Ejemplo con metaphone()**

&lt;?php
var_dump(metaphone('programming'));
var_dump(metaphone('programmer'));
?&gt;

    El ejemplo anterior mostrará:

string(7) "PRKRMNK"
string(6) "PRKRMR"

    **Ejemplo #2 Utilización del parámetro max_phonemes**

&lt;?php
var_dump(metaphone('programming', 5));
var_dump(metaphone('programmer', 5));
?&gt;

    El ejemplo anterior mostrará:

string(5) "PRKRM"
string(5) "PRKRM"

    **Ejemplo #3 Utilizando el parámetro max_phonemes**



     En este ejemplo, **metaphone()** está configurado para producir
     una cadena de cinco caracteres, pero esto requeriría dividir el
     fonema final ('x' se supone que se transcribe como
     'KS'), por lo que la función devuelve una cadena de seis
     caracteres.




     &lt;?php

var_dump(metaphone('Asterix', 5));
?&gt;

    El ejemplo anterior mostrará:



     string(6) "ASTRKS"

### Ver también

    - [levenshtein()](#function.levenshtein) - Calcula la distancia Levenshtein entre dos strings

    - [similar_text()](#function.similar-text) - Calcula la similitud entre dos strings

    - [soundex()](#function.soundex) - Calcula la clave soundex

# money_format

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7)

money_format — Formatea un número como valor monetario

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 7.4.0, y ha sido _ELIMINADA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

**money_format**([string](#language.types.string) $format, [float](#language.types.float) $number): [string](#language.types.string)

**money_format()** devuelve una versión formateada del número
number. Esta función actúa como interfaz con
la función **strfmon()** de la biblioteca C, con la
diferencia de que esta implementación solo convierte un número a la vez.

### Parámetros

     format


       El parámetro de formato consta de la siguiente secuencia:



        - un carácter %



        - una configuración opcional



        - un tamaño de campo opcional



        - una precisión izquierda opcional



        - una precisión derecha opcional



        - un carácter de conversión obligatorio








##### Flags

        Se puede utilizar una o más de las siguientes configuraciones:




          =f


            El carácter = seguido de un byte único
            f que se utilizará como carácter
            de relleno. El carácter de relleno predeterminado es
            espacio.






          ^


            Desactiva el agrupamiento de caracteres (tal como se define en la
            configuración local).






          + o (


            Especifica el estilo de formato para números positivos y
            negativos. Si se utiliza +, se usarán los equivalentes
            en la configuración local de + y
            -. Si se utiliza
            (, las sumas negativas se colocarán entre paréntesis. Si no se proporciona
            ninguna especificación, el valor predeterminado es +.






          !


            Suprime el símbolo monetario en la cadena final.






          -


            Si se proporciona, esta configuración hace que los campos se justifiquen
            a la izquierda (rellenados a la derecha), en contraste con la configuración predeterminada
            que está justificada a la derecha y rellenada a la izquierda.











##### Tamaño del campo

          w


            Un número decimal que especifica el tamaño mínimo del campo.
            El campo se rellenará a la izquierda, a menos que se utilice la configuración
            -. Por defecto, este valor es 0.











##### Precisión izquierda

          #n


            El número máximo de dígitos (n) esperados
            a la izquierda del separador decimal (por ejemplo, la coma). Esta opción se
            utiliza generalmente para mantener el alineamiento de columnas de
            números, utilizando un carácter para rellenar el número si este tiene menos de
            n dígitos. Si el número real de dígitos es mayor que
            n, esta especificación se ignora.




            Si el agrupamiento no ha sido desactivado mediante la configuración
            ^, los separadores de agrupamiento se insertarán
            antes del carácter de relleno (si corresponde). Los separadores no se aplicarán
            a los caracteres de relleno, incluso si este carácter es un número.




            Para garantizar el alineamiento, todos los caracteres que aparecen
            antes y después del número formateado, como los símbolos monetarios
            o los signos negativo y positivo, se colocarán en el mismo lugar mediante
            espacios adicionales, de modo que todos los tamaños de los números sean iguales.











##### Precisión derecha

          .p


            Un punto seguido de un número de decimales (p).
            Si el valor de p es 0 (cero), el
            separador decimal y los decimales se eliminarán. Si no se especifica
            ninguna precisión derecha, el valor predeterminado se leerá en la configuración local.
            El número formateado se redondeará para satisfacer las restricciones de visualización.











##### Caracteres de conversión

          i


            El número se formatea según el formato monetario internacional
            de la configuración local (por ejemplo, para Francia: 1 234,56 F).






          n


            El número se formatea según el formato monetario nacional
            (por ejemplo, para la configuración de_DE:
            EU1.234,56).






          %


            Devuelve el carácter %.











     number


       El número a formatear.





### Valores devueltos

Devuelve la cadena formateada. Los caracteres antes y después de la cadena
formateada se devolverán sin cambios.
Un valor no numérico para number devuelve **[null](#constant.null)**
y emite una advertencia **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido eliminada.




       7.4.0

        Esta función está obsoleta. Utilizar
        [NumberFormatter::formatCurrency()](#numberformatter.formatcurrency) en su lugar.





### Ejemplos

    **Ejemplo #1 Ejemplo con money_format()**



     A continuación se muestran varios ejemplos de uso de la función
     **money_format()** con diferentes cadenas
     de formato y configuraciones locales.

&lt;?php

$number = 1234.56;

// Mostremos este número en formato internacional para en_US
setlocale(LC_MONETARY, 'en_US');
echo money_format('%i', $number) . "\n";
// USD 1,234.56

// Y en formato nacional italiano con 2 decimales
setlocale(LC_MONETARY, 'it_IT');
echo money_format('%.2n', $number) . "\n";
// L. 1.234,56

// Uso de un número negativo
$number = -1234.5672;

// Formato nacional de EE.UU., con paréntesis para números negativos
// y 10 dígitos de precisión a la izquierda
setlocale(LC_MONETARY, 'en_US');
echo money_format('%(#10n', $number) . "\n";
// ($ 1,234.57)

// Formato similar al anterior, añadiendo 2 decimales
// para la precisión derecha, y utilizando el carácter de relleno '_'
echo money_format('%=_(#10.2n', $number) . "\n";
// ($**\*\*\*\***1,234.57)

// Utilicemos ahora la justificación a la izquierda, con un campo de 14 caracteres
// de largo, sin agrupamiento de dígitos, y utilizando el formato internacional
// para de_DE
setlocale(LC_MONETARY, 'de_DE');
echo money_format('%=\*^-14#8.2i', 1234.56) . "\n";
// DEM 1234,56\*\*\*\*

// Añadamos aún más al ejemplo anterior
setlocale(LC_MONETARY, 'en_GB');
$fmt = 'El valor final es %i (tras un 10 %% de descuento)';
echo money_format($fmt, 1234.56) . "\n";
// El valor final es GBP 1,234.56 (tras un 10 % de descuento)

?&gt;

### Notas

**Nota**:

    La función **money_format()** solo está definida si
    el sistema tiene capacidades strfmon. Por ejemplo, Windows
    no las tiene, por lo tanto, **money_format()** no está definida
    en Windows.

**Nota**:

    La categoría **[LC_MONETARY](#constant.lc-monetary)** de la configuración local
    afecta el comportamiento de esta función. Utilice
    [setlocale()](#function.setlocale) para configurar correctamente PHP antes
    de usar esta función.

### Ver también

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [printf()](#function.printf) - Muestra una string formateada

    - [number_format()](#function.number-format) - Formatea un número para su visualización

# nl_langinfo

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

nl_langinfo — Recopila información sobre el idioma y la configuración local

### Descripción

**nl_langinfo**([int](#language.types.integer) $item): [string](#language.types.string)|[false](#language.types.singleton)

**nl_langinfo()** se utiliza para acceder a
cada elemento de la configuración local. A diferencia de
la función [localeconv()](#function.localeconv) que devuelve
todos los elementos, **nl_langinfo()** permite
seleccionar un elemento específico.

### Parámetros

     item


       item puede ser el valor entero de un
       elemento, o el nombre de su constante. A continuación se presenta una lista de los nombres
       de constantes para item que pueden
       ser utilizados y su descripción. Algunas constantes pueden
       no estar definidas, o no contener ningún valor para ciertas
       configuraciones locales.



        <caption>**Constantes nl_langinfo()**</caption>

         <col>
         <col>


           Constante
           Descripción






           *Constantes de la categoría **[LC_TIME](#constant.lc-time)***



           **[ABDAY_(1-7)](#constant.abday-1)**
           Nombre corto del día de la semana.



           **[DAY_(1-7)](#constant.day-1)**
           Nombre del día de la semana (DAY_1 = Domingo).



           **[ABMON_(1-12)](#constant.abmon-1)**
           Nombre abreviado del mes del año.



           **[MON_(1-12)](#constant.mon-1)**
           Nombre del mes del año.



           **[AM_STR](#constant.am-str)**
           String para Ante meridian.



           **[PM_STR](#constant.pm-str)**
           String para Post meridian.



           **[D_T_FMT](#constant.d-t-fmt)**

            String que puede ser utilizado como string de formato para la función
            [strftime()](#function.strftime) para representar la fecha y la hora.




           **[D_FMT](#constant.d-fmt)**

            String que puede ser utilizado como string de formato para la función
            [strftime()](#function.strftime) para representar la fecha.




           **[T_FMT](#constant.t-fmt)**

            String que puede ser utilizado como string de formato para la función
            [strftime()](#function.strftime) para representar la hora.




           **[T_FMT_AMPM](#constant.t-fmt-ampm)**

            String que puede ser utilizado como string de formato
            para la función [strftime()](#function.strftime) para representar
            la hora en formato de 12 horas, con ante/post meridian.




           **[ERA](#constant.era)**
           Era de sustitución.



           **[ERA_YEAR](#constant.era-year)**
           Año en el formato de era de sustitución.



           **[ERA_D_T_FMT](#constant.era-d-t-fmt)**
           Fecha y hora en el formato de era de sustitución
           (string que puede ser utilizado en la función [strftime()](#function.strftime)).



           **[ERA_D_FMT](#constant.era-d-fmt)**
           Fecha en el formato de era de sustitución
           (string que puede ser utilizado en la función [strftime()](#function.strftime)).



           **[ERA_T_FMT](#constant.era-t-fmt)**
           Hora en el formato de era de sustitución
           (string que puede ser utilizado en la función [strftime()](#function.strftime)).



           *Constantes de la categoría **[LC_MONETARY](#constant.lc-monetary)***



           **[INT_CURR_SYMBOL](#constant.int-curr-symbol)**
           Símbolo monetario internacional.



           **[CURRENCY_SYMBOL](#constant.currency-symbol)**
           Símbolo monetario local.



           **[CRNCYSTR](#constant.crncystr)**
           Mismo valor que **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



           **[MON_DECIMAL_POINT](#constant.mon-decimal-point)**
           Carácter de coma decimal.



           **[MON_THOUSANDS_SEP](#constant.mon-thousands-sep)**
           Separador de centenas (grupos de tres letras).



           **[MON_GROUPING](#constant.mon-grouping)**
           Como el elemento "grouping".



           **[POSITIVE_SIGN](#constant.positive-sign)**
           Signo para los valores positivos.



           **[NEGATIVE_SIGN](#constant.negative-sign)**
           Signo para los valores negativos.



           **[INT_FRAC_DIGITS](#constant.int-frac-digits)**
           Dígitos parciales internacionales.



           **[FRAC_DIGITS](#constant.frac-digits)**
           Dígitos parciales locales.



           **[P_CS_PRECEDES](#constant.p-cs-precedes)**
           Devuelve 1 si **[CURRENCY_SYMBOL](#constant.currency-symbol)** precede a un valor positivo.



           **[P_SEP_BY_SPACE](#constant.p-sep-by-space)**
           Devuelve 1 si un espacio separa **[CURRENCY_SYMBOL](#constant.currency-symbol)** de un valor positivo.



           **[N_CS_PRECEDES](#constant.n-cs-precedes)**
           Devuelve 1 si **[CURRENCY_SYMBOL](#constant.currency-symbol)** precede a un valor negativo.



           **[N_SEP_BY_SPACE](#constant.n-sep-by-space)**
           Devuelve 1 si un espacio separa **[CURRENCY_SYMBOL](#constant.currency-symbol)** de un valor negativo.



           **[P_SIGN_POSN](#constant.p-sign-posn)**


             -

               Devuelve 0 si paréntesis rodean la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 1 si la cadena de signos precede a la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 2 si la cadena de signos sigue a la cantidad y **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 3 si la cadena de signos precede inmediatamente al **[CURRENCY_SYMBOL](#constant.currency-symbol)**.



             -

               Devuelve 4 si la cadena de signos sigue inmediatamente al **[CURRENCY_SYMBOL](#constant.currency-symbol)**.








           **[N_SIGN_POSN](#constant.n-sign-posn)**



           *Constantes de la categoría **[LC_NUMERIC](#constant.lc-numeric)***



           **[DECIMAL_POINT](#constant.decimal-point)**
           Carácter de coma decimal.



           **[RADIXCHAR](#constant.radixchar)**
           Mismo valor que **[DECIMAL_POINT](#constant.decimal-point)**.



           **[THOUSANDS_SEP](#constant.thousands-sep)**
           Carácter de separación de centenas (grupo de tres letras).



           **[THOUSEP](#constant.thousep)**
           Mismo valor que **[THOUSANDS_SEP](#constant.thousands-sep)**.



           **[GROUPING](#constant.grouping)**
            



           *Constantes de la categoría **[LC_MESSAGES](#constant.lc-messages)***



           **[YESEXPR](#constant.yesexpr)**
           String de expresión regular para buscar la entrada "yes".



           **[NOEXPR](#constant.noexpr)**
           String de expresión regular para buscar la entrada "no".



           **[YESSTR](#constant.yesstr)**
           Visualización del string para "yes".



           **[NOSTR](#constant.nostr)**
           Visualización del string para "no".



           *Constantes de la categoría **[LC_CTYPE](#constant.lc-ctype)***



           **[CODESET](#constant.codeset)**
           Devuelve un string de caracteres con el nombre del juego de caracteres.









### Valores devueltos

Devuelve el elemento, en forma de [string](#language.types.string) o **[false](#constant.false)** si
el argumento item no es válido.

### Ejemplos

    **Ejemplo #1 Ejemplo con nl_langinfo()**

&lt;?php

var_dump(nl_langinfo(CODESET));
var_dump(nl_langinfo(YESEXPR));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(14) "ANSI_X3.4-1968"
string(5) "^[yY]"

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

### Ver también

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [localeconv()](#function.localeconv) - Lee la configuración local

# nl2br

(PHP 4, PHP 5, PHP 7, PHP 8)

nl2br — Inserta un salto de línea HTML en cada nueva línea

### Descripción

**nl2br**([string](#language.types.string) $string, [bool](#language.types.boolean) $use_xhtml = **[true](#constant.true)**): [string](#language.types.string)

Devuelve string después de insertar
&lt;br /&gt; o &lt;br&gt;
antes de todas las nuevas líneas (\r\n,
\n\r, \n y \r).

### Parámetros

     string


       El string de entrada.






     use_xhtml


       Produce saltos de línea compatibles con XHTML o no.





### Valores devueltos

Devuelve el string modificado.

### Ejemplos

    **Ejemplo #1 Ejemplo con nl2br()**

&lt;?php
echo nl2br("foo isn't\n bar");
?&gt;

    El ejemplo anterior mostrará:

foo isn't&lt;br /&gt;
bar

    **Ejemplo #2 Generación de código HTML válido con el argumento use_xhtml**

&lt;?php
echo nl2br("Welcome\r\nThis is my HTML document", false);
?&gt;

    El ejemplo anterior mostrará:

Welcome&lt;br&gt;
This is my HTML document

    **Ejemplo #3 Diversos separadores de nuevas líneas**

&lt;?php
$string = "Ceci\r\nest\n\rune\nchaîne\r";
echo nl2br($string);
?&gt;

    El ejemplo anterior mostrará:

Ceci&lt;br /&gt;
est&lt;br /&gt;
une&lt;br /&gt;
chaîne&lt;br /&gt;

### Ver también

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [wordwrap()](#function.wordwrap) - Realiza el ajuste de línea de un string

    - [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

# number_format

(PHP 4, PHP 5, PHP 7, PHP 8)

number_format — Formatea un número para su visualización

### Descripción

**number_format**(
    [float](#language.types.float) $num,
    [int](#language.types.integer) $decimals = 0,
    [?](#language.types.null)[string](#language.types.string) $decimal_separator = ".",
    [?](#language.types.null)[string](#language.types.string) $thousands_separator = ","
): [string](#language.types.string)

Formatea un número con los miles agrupados y opcionalmente con cifras decimales utilizando la regla de redondeo al más cercano.

### Parámetros

     num


       El número a formatear.






     decimals


       Define el número de cifras decimales.
       Si es 0, el decimal_separator es
       omitido del valor de retorno.
       A partir de PHP 8.3.0, cuando el valor es negativo, num
       es redondeado a decimals cifras significativas antes
       del punto decimal.
       Antes de PHP 8.3.0, los valores negativos eran ignorados y tratados de la
       misma manera que 0.






     decimal_separator


       Define el separador para el punto decimal.






     thousands_separator


       Define el separador de miles.





### Valores devueltos

Una versión formateada del número num.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Se añadió el manejo de valores negativos para decimals.




       8.0.0

        Antes de esta versión, **number_format()** aceptaba
        uno, dos o cuatro argumentos (pero no tres).




       7.2.0

        **number_format()** fue modificado para no permitir devolver -0, anteriormente -0 podía
        ser devuelto para casos donde num valía -0.01.





**Ejemplo #1 Un valor negativo para decimals**

    A partir de PHP 8.3.0, un valor negativo para decimals
    es utilizado para redondear el número de cifras significativas antes del punto
    decimal.

&lt;?php
$number = "1234.5678";
var_dump(number_format($number, -1));
var_dump(number_format($number, -2));
var_dump(number_format($number, -3));
?&gt;

El ejemplo anterior mostrará:

string(5) "1 230"
string(5) "1 200"
string(5) "1 000"

### Ejemplos

    **Ejemplo #2 Ejemplo con number_format()**



     En notación francesa, se utilizan generalmente dos cifras
     después de la coma, una coma como separador decimal y un
     espacio como separador de miles. El siguiente ejemplo muestra
     cómo formatear un número de diferentes maneras:

&lt;?php

$number = 1234.56;

// Notación inglesa (por omisión)
echo number_format($number), PHP_EOL;
// 1,235

// Notación francesa
echo number_format($number, 2, ',', ' '), PHP_EOL;
// 1 234,56

$number = 1234.5678;

// Notación inglesa sin separador de miles
echo number_format($number, 2, '.', ''), PHP_EOL;
// 1234.57

?&gt;

### Ver también

    - [money_format()](#function.money-format) - Formatea un número como valor monetario

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [printf()](#function.printf) - Muestra una string formateada

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

# ord

(PHP 4, PHP 5, PHP 7, PHP 8)

ord — Convierte el primer byte de un string en un valor entre 0 y 255

### Descripción

**ord**([string](#language.types.string) $character): [int](#language.types.integer)

Interpreta el valor binario del primer byte de character
como un [int](#language.types.integer) sin signo entre 0 y 255.

Si el [string](#language.types.string) está en una codificación de un byte como ASCII, ISO-8859 o
Windows 1252, esto es equivalente a devolver la posición de un carácter en la
tabla de correspondencia de la codificación. Sin embargo, cabe señalar que esta función
no es consciente de ninguna codificación de [string](#language.types.string), y en particular nunca identificará
un valor de punto de código Unicode en una codificación multibyte como
UTF-8 o UTF-16.

Esta función complementa [chr()](#function.chr).

### Parámetros

     character


       Un carácter.





### Valores devueltos

Un [int](#language.types.integer) entre 0 y 255.

### Ejemplos

    **Ejemplo #1 Ejemplo con ord()**

&lt;?php
$str = "\n";
if (ord($str) == 10) {
echo "El primer carácter de \$str es un salto de línea\n";
}
?&gt;

    **Ejemplo #2 Examinar los bytes individuales de un string UTF-8**

&lt;?php
$str = "🐘";
for ( $pos=0; $pos &lt; strlen($str); $pos ++ ) {
 $byte = substr($str, $pos);
 echo 'Byte ' . $pos . ' de $str tiene como valor ' . ord($byte) . PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Byte 0 de $str tiene como valor 240
Byte 1 de $str tiene como valor 159
Byte 2 de $str tiene como valor 144
Byte 3 de $str tiene como valor 152

### Ver también

    - [chr()](#function.chr) - Generar un string de un byte a partir de un número

    - [» Tabla ASCII](https://www.man7.org/linux/man-pages/man7/ascii.7.html)

    - [mb_ord()](#function.mb-ord) - Obtiene el punto de código Unicode de un carácter

    - [IntlChar::ord()](#intlchar.ord) - Devuelve el valor del punto de código Unicode de un carácter

# parse_str

(PHP 4, PHP 5, PHP 7, PHP 8)

parse_str — Analiza una string como una cadena de consulta URL

### Descripción

**parse_str**([string](#language.types.string) $string, [array](#language.types.array) &amp;$result): [void](language.types.void.html)

Analiza la string string como si se tratara de los parámetros pasados a través de la URL. Todas las variables que identifica son creadas con sus valores respectivos (o en el array si result es proporcionado).

### Parámetros

     string


       La string de entrada.






     result


       Una variable pasada por referencia, que será definida como un array conteniendo los pares clave-valor extraídos de string. Si el parámetro result no es pasado, una variable separada es definida en el ámbito local para cada clave.



      **Advertencia**

        El uso de esta función sin el parámetro result está muy fuertemente *desaconsejado* y *no recomendado* a partir de PHP 7.2. A partir de PHP 8.0.0, el parámetro result es *obligatorio*.






### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción






      8.0.0

       result ya no es opcional.




       7.2.0

        El uso de **parse_str()** sin el segundo argumento emite una nota **[E_DEPRECATED](#constant.e-deprecated)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con parse_str()**

&lt;?php
$str = "first=value&amp;arr[]=foo+bar&amp;arr[]=baz";

// Recomendado
parse_str($str, $output);
echo $output['first'], PHP_EOL; // value
echo $output['arr'][0], PHP_EOL; // foo bar
echo $output['arr'][1], PHP_EOL; // baz
?&gt;

Cualquier espacio o punto en los nombres de parámetros es convertido a guión bajo al crear claves de array o variables locales. Esto se debe a que los nombres de variables en PHP no pueden contener espacios o puntos, pero esto se aplica incluso cuando se utiliza esta función con el parámetro result.

    **Ejemplo #2 Deformación de nombres por parse_str()**

&lt;?php
parse_str("My Value=Something", $output);
echo $output['My_Value']; // Something
?&gt;

### Notas

**Nota**:

     La función **parse_str()** se ve afectada por la directiva [max_input_vars](#ini.max-input-vars). Exceder este límite genera una advertencia **[E_WARNING](#constant.e-warning)**, y cualquier variable más allá de este límite no es añadida al array de resultado. El valor por omisión es 1000; ajuste [max_input_vars](#ini.max-input-vars) según sus necesidades.

**Nota**:

    Todos los valores añadidos en el array result (o las variables creadas si el segundo parámetro no está definido) ya están decodificados con las mismas reglas que [urldecode()](#function.urldecode).

**Nota**:

    Para obtener la cadena de consulta de la petición actual, se puede utilizar la variable [$_SERVER['QUERY_STRING']](#reserved.variables.server). Asimismo, puede ser de interés leer la sección sobre las [variables de fuentes externas](#language.variables.external).

### Ver también

    - [parse_url()](#function.parse-url) - Analiza una URL y devuelve sus componentes

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

    - [http_build_query()](#function.http-build-query) - Genera una string de consulta con codificación URL

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

# print

(PHP 4, PHP 5, PHP 7, PHP 8)

print — Muestra un string

### Descripción

**print**([string](#language.types.string) $expression): [int](#language.types.integer)

Muestra expression.

print no es una función sino una construcción del lenguaje.
Su argumento es la expresión que sigue a la palabra clave print,
y no está delimitado por paréntesis.

La diferencia principal con echo es que
print solo acepta un argumento y siempre devuelve 1.

### Parámetros

     expression


       La expresión a mostrar. Los valores que no son strings serán convertidos a string,
       incluso si la [directiva
       strict_types](#language.types.declarations.strict) está activada.





### Valores devueltos

Devuelve 1, siempre.

### Ejemplos

    **Ejemplo #1 Ejemplo con print**

&lt;?php
print "print no requiere paréntesis.";
print PHP_EOL;

// No se añade salto de línea ni espacio; lo siguiente se muestra como "helloworld" en una sola línea
print "hello";
print "world";
print PHP_EOL;

print "Este string abarca
múltiples líneas. Los saltos de línea también
se mostrarán";
print PHP_EOL;

print "Este string abarca\nmúltiples líneas. Los saltos de línea\nse mostrarán también.";
print PHP_EOL;

// El argumento puede ser cualquier expresión que produzca un string
$foo = "example";
print "foo es $foo"; // foo es example
print PHP_EOL;

$fruits = ["lemon", "orange", "banana"];
print implode(" y ", $fruits); // lemon y orange y banana
print PHP_EOL;

// Las expresiones no-string son convertidas a string, incluso si se usa declare(strict_types=1)
print 6 \* 7; // 42
print PHP_EOL;

// Como print tiene un valor de retorno, puede ser usado en expresiones
// Lo siguiente muestra "hello world"
if ( print "hello" ) {
echo " world";
}
print PHP_EOL;

// Lo siguiente muestra "true"
( 1 === 1 ) ? print 'true' : print 'false';
print PHP_EOL;
?&gt;

### Notas

**Nota**:
**Uso con paréntesis**

    Rodear el argumento de print con paréntesis
    no generará un error de sintaxis, y produce una sintaxis similar a una
    llamada normal de función. No obstante, esto puede ser engañoso, ya que los
    paréntesis forman en realidad parte de la expresión que se está
    mostrando, y no parte de la sintaxis de print
    en sí mismo.





&lt;?php
print "hello";
// muestra "hello"

print("hello");
// también muestra "hello", porque ("hello") es una expresión válida

print(1 + 2) * 3;
// muestra "9"; los paréntesis hacen que 1+2 se evalúe primero, luego 3*3
// la sentencia print ve toda la expresión como un argumento

if ( print("hello") &amp;&amp; false ) {
print " - dentro de if";
}
else {
print " - dentro de else";
}
// muestra " - dentro de if"
// la expresión ("hello") &amp;&amp; false se evalúa primero, dando false
// esto se convierte al string vacío "" y se muestra
// la construcción print luego devuelve 1, por lo que se ejecuta el código en el bloque if
?&gt;

    Cuando print se usa en una expresión más grande,
    colocar tanto la palabra clave como su argumento entre paréntesis puede ser
    necesario para obtener el resultado esperado:





&lt;?php
if ( (print "hello") &amp;&amp; false ) {
print " - dentro de if";
}
else {
print " - dentro de else";
}
// muestra "hello - dentro de else"
// a diferencia del ejemplo anterior, la expresión (print "hello") se evalúa primero
// después de mostrar "hello", print devuelve 1
// como 1 &amp;&amp; false es false, se ejecuta el código en el bloque else

print "hello " &amp;&amp; print "world";
// muestra "world1"; print "world" se evalúa primero,
// luego la expresión "hello " &amp;&amp; 1 se pasa al print de la izquierda

(print "hello ") &amp;&amp; (print "world");
// muestra "hello world"; los paréntesis fuerzan a que las expresiones print
// se evalúen antes del &amp;&amp;
?&gt;

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

### Ver también

    - [echo](#function.echo) - Muestra una string

    - [printf()](#function.printf) - Muestra una string formateada

    - [flush()](#function.flush) - Vacía los búferes de salida del sistema

    - [Forma de especificar strings literales](#language.types.string)

# printf

(PHP 4, PHP 5, PHP 7, PHP 8)

printf — Muestra una string formateada

### Descripción

**printf**([string](#language.types.string) $format, [mixed](#language.types.mixed) ...$values): [int](#language.types.integer)

Muestra una string formateada.

### Parámetros

format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve la longitud de la string mostrada.

### Errores/Excepciones

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si el número de argumentos es nulo.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos.
Anterior a PHP 8.0.0, se devolvía **[false](#constant.false)** y se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 printf()**: varios ejemplos

&lt;?php
$n =  43951789;
$u = -43951789;
$c = 65; // ASCII 65 es 'A'

// note el doble %%, esto muestra un carácter '%' literal
printf("%%b = '%b'\n", $n); // representación binaria
printf("%%c = '%c'\n", $c); // muestra el carácter ascii, como la función chr()
printf("%%d = '%d'\n", $n); // representación estándar de un integer
printf("%%e = '%e'\n", $n); // notación científica
printf("%%u = '%u'\n", $n); // representación de integer sin signo de un integer positivo
printf("%%u = '%u'\n", $u); // representación de integer sin signo de un integer negativo
printf("%%f = '%f'\n", $n); // representación en coma flotante
printf("%%o = '%o'\n", $n); // representación octal
printf("%%s = '%s'\n", $n); // representación string
printf("%%x = '%x'\n", $n); // representación hexadecimal (minúscula)
printf("%%X = '%X'\n", $n); // representación hexadecimal (mayúscula)

printf("%%+d = '%+d'\n", $n); // indicación del signo para un integer positivo
printf("%%+d = '%+d'\n", $u); // indicación del signo para un integer negativo
?&gt;

    El ejemplo anterior mostrará:

%b = '10100111101010011010101101'
%c = 'A'
%d = '43951789'
%e = '4.39518e+7'
%u = '43951789'
%u = '4251015507'
%f = '43951789.000000'
%o = '247523255'
%s = '43951789'
%x = '29ea6ad'
%X = '29EA6AD'
%+d = '+43951789'
%+d = '-43951789'

    **Ejemplo #2 printf()**: especificadores de strings

&lt;?php
$s = 'monkey';
$t = 'many monkeys';

printf("[%s]\n", $s); // muestra de una string estándar
printf("[%10s]\n", $s); // alineación a la derecha con espacios
printf("[%-10s]\n", $s); // alineación a la izquierda con espacios
printf("[%010s]\n", $s); // el espaciado nulo funciona también en strings
printf("[%'#10s]\n", $s); // uso del carácter personalizado de separación '#'
printf("[%'#*s]\n", 10, $s); // Proporcionar el ancho de alineación como argumento adicional
printf("[%10.9s]\n", $t); // alineación a la derecha pero con corte a 8 caracteres
printf("[%-10.9s]\n", $t); // alineación a la izquierda pero con corte a 8 caracteres
?&gt;

    El ejemplo anterior mostrará:

[monkey]
[ monkey]
[monkey ]
[0000monkey]
[####monkey]
[####monkey]
[ many monk]
[many monk ]

### Ver también

    - [print](#function.print) - Muestra un string

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [flush()](#function.flush) - Vacía los búferes de salida del sistema

# quoted_printable_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

quoted_printable_decode — Convierte una string quoted-printable en una string de 8 bits

### Descripción

**quoted_printable_decode**([string](#language.types.string) $string): [string](#language.types.string)

**quoted_printable_decode()** devuelve la string
str, después de convertirla del formato
quoted printable binario de 8 bits (de acuerdo con la
[» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045), sección 6.7, y no la
[» RFC2821](https://datatracker.ietf.org/doc/html/rfc2821), sección 4.5.2, para que las
comas adicionales no sean eliminadas del inicio de la línea).

Esta función es similar a [imap_qprint()](#function.imap-qprint), excepto que
no requiere el módulo IMAP para funcionar.

### Parámetros

     string


       La string de entrada.





### Valores devueltos

Devuelve la string, convertida al formato de 8 bits.

### Ejemplos

    **Ejemplo #1 Ejemplo con quoted_printable_decode()**

&lt;?php

$encoded = quoted_printable_encode('Möchten Sie ein paar Äpfel?');

var_dump($encoded);
var_dump(quoted_printable_decode($encoded));
?&gt;

    El ejemplo anterior mostrará:

string(37) "M=C3=B6chten Sie ein paar =C3=84pfel?"
string(29) "Möchten Sie ein paar Äpfel?"

### Ver también

    - [quoted_printable_encode()](#function.quoted-printable-encode) - Convierte un string de 8 bits en un string quoted-printable

# quoted_printable_encode

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

quoted_printable_encode — Convierte un string de 8 bits en un string quoted-printable

### Descripción

**quoted_printable_encode**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve un string quoted printable creado siguiendo las reglas de
[» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045), sección 6.7.

Esta función es similar a [imap_8bit()](#function.imap-8bit), salvo que
no requiere de un módulo IMAP para funcionar.

### Parámetros

     string


       El string a procesar.





### Valores devueltos

El string codificado.

### Ejemplos

    **Ejemplo #1 Ejemplo con quoted_printable_encode()**

&lt;?php

$encoded = quoted_printable_encode('Möchten Sie ein paar Äpfel?');

var_dump($encoded);
var_dump(quoted_printable_decode($encoded));
?&gt;

    El ejemplo anterior mostrará:

string(37) "M=C3=B6chten Sie ein paar =C3=84pfel?"
string(29) "Möchten Sie ein paar Äpfel?"

### Ver también

    - [quoted_printable_decode()](#function.quoted-printable-decode) - Convierte una string quoted-printable en una string de 8 bits

    - [iconv_mime_encode()](#function.iconv-mime-encode) - Construye un encabezado MIME con los campos field_name y field_value

# quotemeta

(PHP 4, PHP 5, PHP 7, PHP 8)

quotemeta — Protege los metacaracteres

### Descripción

**quotemeta**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve la cadena str
después de haber introducido una barra invertida (\)
delante de todos los caracteres siguientes:

. \ + \* ? [ ^ ] ( $ )

### Parámetros

     string


       La cadena de entrada.





### Valores devueltos

Devuelve la cadena cuyos metacaracteres han sido protegidos o
**[false](#constant.false)** si una cadena vacía es proporcionada en el argumento
string.

### Ejemplos

    **Ejemplo #1 Ejemplo con quotemeta()**

&lt;?php

var_dump(quotemeta('PHP is a popular scripting language. Fast, flexible, and pragmatic.'));
?&gt;

    El ejemplo anterior mostrará:

string(69) "PHP is a popular scripting language\. Fast, flexible, and pragmatic\."

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [addslashes()](#function.addslashes) - Añade barras invertidas en un string

    - [addcslashes()](#function.addcslashes) - Añade barras invertidas a un string, al estilo del lenguaje C

    - [htmlentities()](#function.htmlentities) - Convierte todos los caracteres elegibles en entidades HTML

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

    - [nl2br()](#function.nl2br) - Inserta un salto de línea HTML en cada nueva línea

    - [stripslashes()](#function.stripslashes) - Quita las barras de un string con comillas escapadas

    - [stripcslashes()](#function.stripcslashes) - Decodifica un string codificado con addcslashes

    - [preg_quote()](#function.preg-quote) - Protección de caracteres especiales de expresiones regulares

# rtrim

(PHP 4, PHP 5, PHP 7, PHP 8)

rtrim — Elimina los espacios (u otros caracteres) al final de un string

### Descripción

**rtrim**([string](#language.types.string) $string, [string](#language.types.string) $characters = " \n\r\t\v\x00"): [string](#language.types.string)

Esta función devuelve un string con los espacios (u otros caracteres) eliminados
al final de string.

Sin el segundo parámetro,
**rtrim()** eliminará estos caracteres:

-

" ": carácter SP en ASCII
0x20, un espacio ordinario.

-

"\t": carácter HT en ASCII
0x09, una tabulación.

-

"\n": carácter LF en ASCII
0x0A, un salto de línea (line feed).

-

"\r": carácter CR en ASCII
0x0D, un retorno de carro.

-

"\0": carácter NUL en ASCII
0x00, el octeto NUL.

-

"\v": carácter VT en ASCII
0x0B, una tabulación vertical.

### Parámetros

    string


      El string de entrada.




    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres que deben ser eliminados.
Con .., es posible especificar un rango creciente de caracteres.

### Valores devueltos

Devuelve el string modificado.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de rtrim()**

&lt;?php

$text = "\t\tAquí hay algunas palabras :) ...  ";
$binary = "\x09String de ejemplo\x0A";
$hello  = "Hola Mundo";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = rtrim($text);
var_dump($trimmed);

$trimmed = rtrim($text, " \t.");
var_dump($trimmed);

$trimmed = rtrim($hello, "Hdlor");
var_dump($trimmed);

// elimina los caracteres de control ASCII al final de $binary
// (de 0 a 31 inclusive)
$clean = rtrim($binary, "\x00..\x1F");
var_dump($clean);

?&gt;

    El ejemplo anterior mostrará:

string(32) " Aquí hay algunas palabras :) ... "
string(16) " String de ejemplo
"
string(10) "Hola Mundo"

string(30) " Aquí hay algunas palabras :) ..."
string(26) " Aquí hay algunas palabras :)"
string(6) "Hola M"
string(15) " String de ejemplo"

### Ver también

- [trim()](#function.trim) - Elimina los espacios (u otros caracteres) al inicio y al final de un string

- [ltrim()](#function.ltrim) - Elimina los espacios (u otros caracteres) del inicio de un string

# setlocale

(PHP 4, PHP 5, PHP 7, PHP 8)

setlocale — Establece la información de configuración local

### Descripción

**setlocale**([int](#language.types.integer) $category, [?](#language.types.null)[string](#language.types.string) $locales, [string](#language.types.string) ...$rest): [string](#language.types.string)|[false](#language.types.singleton)

Firma alternativa (no soportada con argumentos nombrados):

**setlocale**([int](#language.types.integer) $category, [array](#language.types.array) $locale_array): [string](#language.types.string)|[false](#language.types.singleton)

Establece la información de configuración local.

**Advertencia**

    La información de configuración local se mantiene por proceso, no por hilo. Si está ejecutando PHP en una API de servidor multihilo,
    puede experimentar cambios repentinos en la configuración local mientras se ejecuta un script, aunque el script nunca haya llamado a
    **setlocale()**. Esto ocurre debido a otros scripts que se ejecutan en diferentes hilos del mismo proceso al mismo tiempo,
    cambiando la configuración local del proceso usando **setlocale()**.
    En Windows, la información de configuración local se mantiene por hilo a partir de PHP 7.0.5.

### Parámetros

     category


       category es una constante nombrada que especifica la
       categoría de las funciones afectadas por la configuración local:



        -

          **[LC_ALL](#constant.lc-all)** para todas las categorías siguientes



        -

          **[LC_COLLATE](#constant.lc-collate)** para comparación de strings, ver
          [strcoll()](#function.strcoll)



        -

          **[LC_CTYPE](#constant.lc-ctype)** para clasificación y conversión de caracteres, por ejemplo [ctype_alpha()](#function.ctype-alpha)



        -

          **[LC_MONETARY](#constant.lc-monetary)** para [localeconv()](#function.localeconv)



        -

          **[LC_NUMERIC](#constant.lc-numeric)** para el separador decimal (Ver también
          [localeconv()](#function.localeconv))



        -

          **[LC_TIME](#constant.lc-time)** para el formato de fecha y hora con
          [strftime()](#function.strftime)



        -

          **[LC_MESSAGES](#constant.lc-messages)** para respuestas del sistema (disponible si PHP fue compilado con
          libintl)








     locales


       Si locales es la cadena vacía
       "" o es **[null](#constant.null)**, los nombres de configuración local se establecerán a partir de los
       valores de las variables de entorno con los mismos nombres que las categorías anteriores, o de "LANG".




       Si locales es "0",
       la configuración local no se ve afectada, solo se devuelve la configuración actual.




       Si locales va seguido de parámetros adicionales, entonces cada parámetro se intenta establecer como
       nueva configuración local hasta que tenga éxito. Esto es útil si una configuración local es conocida bajo
       diferentes nombres en diferentes sistemas o para proporcionar una alternativa
       para una configuración local posiblemente no disponible.






     rest


       Parámetros opcionales de string para intentar como configuraciones locales hasta
       que tenga éxito.






     locale_array


       Cada elemento del array se intenta establecer como
       nueva configuración local hasta que tenga éxito. Esto es útil si una configuración local es conocida bajo
       diferentes nombres en diferentes sistemas o para proporcionar una alternativa
       para una configuración local posiblemente no disponible.





**Nota**:

     En Windows, setlocale(LC_ALL, '') establece los nombres de configuración local a partir de
     la configuración regional/idioma del sistema (accesible a través del Panel de Control).

### Valores devueltos

Devuelve la nueva configuración local actual, o **[false](#constant.false)** si la funcionalidad de configuración local no está
implementada en su plataforma, la configuración local especificada no existe o
el nombre de la categoría no es válido.

Un nombre de categoría no válido también causa un mensaje de advertencia. Los nombres de categoría/configuración local
se pueden encontrar en [» RFC 1766](https://datatracker.ietf.org/doc/html/rfc1766)
y [» ISO 639](http://www.loc.gov/standards/iso639-2/php/code_list.php).
Diferentes sistemas tienen diferentes esquemas de nombres para configuraciones locales.

**Nota**:

    El valor de retorno de **setlocale()** depende
    del sistema en el que se está ejecutando PHP. Devuelve exactamente
    lo que devuelve la función setlocale del sistema.

### Ejemplos

    **Ejemplo #1 Ejemplos de setlocale()**

&lt;?php
/_ Establecer configuración local a holandés _/
setlocale(LC_ALL, 'nl_NL');

/_ Salida: vrijdag 22 december 1978 _/
echo strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));

/_ probar diferentes nombres posibles de configuración local para alemán _/
$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
echo "Configuración local preferida para alemán en este sistema es '$loc_de'";
?&gt;

    **Ejemplo #2 Recuperar la configuración actual de setlocale()**

&lt;?php
/_ Recuperar la configuración actual _/
$current = setlocale(LC_ALL, null);

echo "Configuración local actual '$current'";
?&gt;

    **Ejemplo #3 Ejemplos de setlocale()** para Windows

&lt;?php
/_ Establecer configuración local a holandés _/
setlocale(LC_ALL, 'nld_nld');

/_ Salida: vrijdag 22 december 1978 _/
echo strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978));

/_ probar diferentes nombres posibles de configuración local para alemán _/
$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'deu_deu');
echo "Configuración local preferida para alemán en este sistema es '$loc_de'";
?&gt;

### Notas

**Sugerencia**

    Los usuarios de Windows encontrarán información útil sobre
    las cadenas locales en el sitio web de
    MSDN de Microsoft. Las cadenas de idioma soportadas se pueden encontrar en la
    [» documentación de cadenas de idioma](http://msdn.microsoft.com/en-us/library/39cwe7zf.aspx)
    y las cadenas de país/región soportadas en la
    [» documentación de cadenas de país/región](http://msdn.microsoft.com/en-us/library/cdax410z.aspx).

# sha1

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

sha1 — Calcula el sha1 de un string

**Advertencia**

No se recomienda utilizar esta función para asegurar contraseñas, debido a la naturaleza
rápida de este algoritmo de hash. Ver [F.A.Q del hash de
contraseñas](#faq.passwords.fasthash) para más detalles y las buenas prácticas.

### Descripción

**sha1**([string](#language.types.string) $string, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)

Calcula el sha1 del string string utilizando
[» US Secure Hash Algorithm 1](https://datatracker.ietf.org/doc/html/rfc3174).

### Parámetros

     string


       El string de entrada.






     binary


       Si el argumento opcional binary
       se establece a **[true](#constant.true)**, el sha1 se devuelve en formato binario crudo con
       un tamaño de 20 caracteres, de lo contrario, se devuelve como un número
       hexadecimal con un tamaño de 40 caracteres.





### Valores devueltos

Devuelve el sha1, en forma de un string.

### Ejemplos

    **Ejemplo #1 Ejemplo con sha1()**

&lt;?php
$str = 'pomme';

if (sha1($str) === '752c14ea195c460bac3c3b7896975ee9fd15eeb7') {
echo "¿Desea una golden o una spartan?";
}
?&gt;

### Ver también

    - [hash()](#function.hash) - Genera un valor de hachado (huella digital)

# sha1_file

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

sha1_file — Calcula el sha1 de un fichero

### Descripción

**sha1_file**([string](#language.types.string) $filename, [bool](#language.types.boolean) $binary = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Calcula el sha1 del fichero especificado por el argumento
filename utilizando
[» US Secure Hash Algorithm 1](https://datatracker.ietf.org/doc/html/rfc3174),
luego devuelve este sha1. El sha1 es un número hexadecimal de 40 caracteres.

### Parámetros

     filename


       El nombre del fichero a hachear.






     binary


       Cuando **[true](#constant.true)**, devuelve el pretratamiento en formato binario sin tratar con una
       longitud de 20.





### Valores devueltos

Devuelve un string en caso de éxito, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con sha1_file()**

&lt;?php
foreach (glob('/examples/\*.xml') as $ent)
{
    if (is_dir($ent)) {
continue;
}

    echo $ent . ' (SHA1: ' . sha1_file($ent) . ')', PHP_EOL;

}
?&gt;

### Ver también

    - [hash_file()](#function.hash-file) - Genera un valor de hash utilizando el contenido de un fichero dado

    - [hash_init()](#function.hash-init) - Inicializa un contexto de hachado incremental

    - [sha1()](#function.sha1) - Calcula el sha1 de un string

# similar_text

(PHP 4, PHP 5, PHP 7, PHP 8)

similar_text — Calcula la similitud entre dos strings

### Descripción

**similar_text**([string](#language.types.string) $string1, [string](#language.types.string) $string2, [float](#language.types.float) &amp;$percent = **[null](#constant.null)**): [int](#language.types.integer)

Calcula la similitud entre los dos strings string1
y string2, según el método descrito en
Programming Classics: Implementing the World's Best Algorithms by Oliver (ISBN 0-131-00413-1). Se debe tener en cuenta
que esta implementación no utiliza el método de pila como en el
pseudocódigo de Oliver, sino llamadas recursivas, lo que puede acelerar o no
el proceso. Se debe tener en cuenta que la complejidad del algoritmo es de O(N\*\*3) donde
N es el tamaño del string más grande.

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.



      **Nota**:



        Invertir string1 y
        string2 puede producir resultados diferentes;
        ver el ejemplo a continuación.







     percent


       Al pasar una referencia como tercer argumento,
       **similar_text()** calculará la similitud en
       porcentaje, dividiendo el resultado de **similar_text()**
       por la media de la longitud de los strings proporcionados multiplicado
       por 100.





### Valores devueltos

Devuelve el número de caracteres coincidentes en los dos strings.

El número de caracteres coincidentes se calcula encontrando la primera subcadena común más larga, y luego haciendo esto para los prefijos y sufijos,
de forma recursiva. Las longitudes de todas las subcadenas comunes se suman.

### Ejemplos

**Ejemplo #1 Ejemplo de similar_text()** invirtiendo los argumentos

    Este ejemplo muestra que invertir los argumentos string1 y
    string2 puede producir resultados diferentes.

&lt;?php
$sim = similar_text('bafoobar', 'barfoo', $perc);
echo "similaridad: $sim ($perc %)\n";
$sim = similar_text('barfoo', 'bafoobar', $perc);
echo "similaridad: $sim ($perc %)\n";

Resultado del ejemplo anterior es similar a:

similaridad: 5 (71.428571428571 %)
similaridad: 3 (42.857142857143 %)

### Ver también

    - [levenshtein()](#function.levenshtein) - Calcula la distancia Levenshtein entre dos strings

    - [metaphone()](#function.metaphone) - Calcula la clave metaphone

    - [soundex()](#function.soundex) - Calcula la clave soundex

# soundex

(PHP 4, PHP 5, PHP 7, PHP 8)

soundex — Calcula la clave soundex

### Descripción

**soundex**([string](#language.types.string) $string): [string](#language.types.string)

Calcula la clave soundex de la cadena string.

La clave soundex posee la propiedad de que dos palabras pronunciadas
de manera similar tendrán la misma clave soundex. Esta función se
utiliza, por lo tanto, para simplificar las búsquedas en las bases de datos, donde se
conoce la pronunciación de una palabra o nombre, pero no su ortografía
exacta.

La implementación de la función soundex de PHP ha sido descrita por
Donald Knuth en "The Art Of Computer Programming, vol. 3: Sorting And
Searching", Addison-Wesley (1973), pp. 391-392.

### Parámetros

     string


       La cadena de entrada.





### Valores devueltos

Retorna la clave soundex como [string](#language.types.string) con cuatro caracteres.
Si al menos una letra está contenida en string, la
cadena retornada comienza con una letra. De lo contrario, se retorna "0000".

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Antes de esta versión, llamar a la función con una cadena vacía
       retornaba **[false](#constant.false)** sin ninguna razón en particular.



### Ejemplos

    **Ejemplo #1 Ejemplos de Soundex**

&lt;?php
echo soundex("Euler"), PHP_EOL, soundex("Ellery"), PHP_EOL;

soundex("Euler") == soundex("Ellery"); // E460
soundex("Gauss") == soundex("Ghosh"); // G200
soundex("Hilbert") == soundex("Heilbronn"); // H416
soundex("Knuth") == soundex("Kant"); // K530
soundex("Lloyd") == soundex("Ladd"); // L300
soundex("Lukasiewicz") == soundex("Lissajous"); // L222
?&gt;

### Ver también

    - [levenshtein()](#function.levenshtein) - Calcula la distancia Levenshtein entre dos strings

    - [metaphone()](#function.metaphone) - Calcula la clave metaphone

    - [similar_text()](#function.similar-text) - Calcula la similitud entre dos strings

# sprintf

(PHP 4, PHP 5, PHP 7, PHP 8)

sprintf — Devuelve una string formateada

### Descripción

**sprintf**([string](#language.types.string) $format, [mixed](#language.types.mixed) ...$values): [string](#language.types.string)

Devuelve una string formateada, con el formato
format, utilizando los argumentos
args.

### Parámetros

format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve una [string](#language.types.string) creada siguiendo el formato
format.

### Errores/Excepciones

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si el número de argumentos es nulo.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**.
Anterior a PHP 8.0.0, se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

A partir de PHP 8.0.0, se lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos.
Anterior a PHP 8.0.0, se devolvía **[false](#constant.false)** y se emitía un **[E_WARNING](#constant.e-warning)** en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

**Ejemplo #1 Intercambio de argumentos**

    La string de formato soporta la numeración y el intercambio de argumentos.

&lt;?php
$num = 5;
$location = 'bananero';

$format = 'Hay %d monos en el %s';
echo sprintf($format, $num, $location);
?&gt;

El ejemplo anterior mostrará:

Hay 5 monos en el bananero

    Pero imagine que la string de formato sea creada en un script separado,
    como una biblioteca: esto ocurre cuando se debe internacionalizar una
    aplicación. Según el idioma, puede que sea necesario escribir:

**Ejemplo #2 Orden incorrecto de los argumentos**

    La string de formato soporta la numeración y el intercambio de argumentos.

&lt;?php
$num = 5;
$location = 'árbol';
$format = 'El %s tiene %d monos';

echo sprintf($format, $num, $location);
?&gt;

Ahora tenemos un problema. El orden de los argumentos ha sido cambiado,
y ya no corresponde al orden de los argumentos en el script PHP.
Se desea dejar el código PHP intacto, pero simplemente indicar
en la string de formato el orden en el que los argumentos deben
ser utilizados. La string de formato puede ser reescrita así:

**Ejemplo #3 Uso del marcador de orden**

&lt;?php
$num = 5;
$location = 'árbol';

$format = 'El %2$s tiene %1$d monos';
echo sprintf($format, $num, $location);
?&gt;

Una de las ventajas es que los parámetros ficticios pueden ser repetidos sin
añadir más argumentos en el código.

**Ejemplo #4 Repetición del marcador**

&lt;?php
$format = 'El %2$s tiene %1$d monos.
           Es un hermoso %2$s con %1$d monos.';
echo sprintf($format, $num, $location);
?&gt;

Al utilizar el mecanismo de intercambio de argumentos,
el _especificador de posición_
n$ debe ocurrir inmediatamente después del
signo de porcentaje(%), antes de cualquier otro
especificador, como en el siguiente ejemplo.

**Ejemplo #5 Especificación del carácter de relleno**

&lt;?php
echo sprintf("%'.9d\n", 123);
echo sprintf("%'.09d\n", 123);
?&gt;

El ejemplo anterior mostrará:

......123
000000123

**Ejemplo #6 Especificador de posición con otros especificadores**

&lt;?php
$format = 'El %2$s contiene %1$04d monos';
echo sprintf($format, $num, $location);
?&gt;

El ejemplo anterior mostrará:

El árbol contiene 0005 monos

**Ejemplo #7 sprintf()**: entero sin espacios

&lt;?php
$year = 2005;
$month = 5;
$day = 6;

$isodate = sprintf("%04d-%02d-%02d", $year, $month, $day);
echo $isodate;
?&gt;

**Ejemplo #8 sprintf()**: formateo de divisas

&lt;?php
$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
echo $money, PHP_EOL;

$formatted = sprintf("%01.2f", $money);
echo $formatted, PHP_EOL;
?&gt;

El ejemplo anterior mostrará:

123.1
123.10

**Ejemplo #9 sprintf()**: notación científica

&lt;?php
$number = 362525200;

echo sprintf("%.3e", $number), PHP_EOL;
?&gt;

El ejemplo anterior mostrará:

3.625e+8

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# sscanf

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

sscanf — Analiza una cadena utilizando un formato

### Descripción

**sscanf**([string](#language.types.string) $string, [string](#language.types.string) $format, [mixed](#language.types.mixed) &amp;...$vars): [array](#language.types.array)|[int](#language.types.integer)|[null](#language.types.null)

**sscanf()** es la función inversa de
[printf()](#function.printf). **sscanf()** lee
datos de la cadena string e
los interpreta según el formato format.

Todos los caracteres en blanco en la cadena format corresponden
a un carácter en blanco en la cadena string. Esto significa que
incluso una tabulación (\t) en la cadena de formato puede corresponder a
un simple espacio en la cadena str.

### Parámetros

     string


       La cadena a analizar.







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


       Opcionalmente, se pueden pasar variables en este parámetro,
       por referencia que contendrán los valores del análisis.





### Valores devueltos

Si solo se proporcionan dos parámetros, los valores encontrados
se devolverán como un array. De lo contrario, si se proporcionan los parámetros
opcionales, la función devolverá el número de
valores asignados. El parámetro opcional debe pasarse por
referencia.

Si hay más subcadenas esperadas en el parámetro
format que las disponibles en
string, entonces **[null](#constant.null)** será devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con sscanf()**

&lt;?php
// Lectura de un número de serie
list($serial) = sscanf("SN/2350001", "SN/%d");
// y la fecha de fabricación
$mandate = "January 01 2000";
list($month, $day, $year) = sscanf($mandate, "%s %d %d");
echo "El producto $serial fue fabricado el: $year-" . substr($month, 0, 3) . "-$day\n";
?&gt;

Si se pasan parámetros opcionales, **sscanf()** devolverá
el número de valores asignados.

    **Ejemplo #2 sscanf()** - uso de parámetros opcionales

&lt;?php
// lee la información del autor y genera una entrada DocBook
$auth = "24\tLewis Carroll";
$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
echo "&lt;author id='$id'&gt;
&lt;firstname&gt;$first&lt;/firstname&gt;
    &lt;surname&gt;$last&lt;/surname&gt;
&lt;/author&gt;\n";
?&gt;

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# str_contains

(PHP 8)

str_contains — Determina si una cadena contiene un substring dado

### Descripción

**str_contains**([string](#language.types.string) $haystack, [string](#language.types.string) $needle): [bool](#language.types.boolean)

Realiza una verificación sensible a mayúsculas y minúsculas para indicar si needle (aguja)
está contenida en haystack (pajar).

### Parámetros

     haystack


       El string en el que se realiza la búsqueda.






     needle


       El substring a buscar en haystack.





### Valores devueltos

Devuelve **[true](#constant.true)** si needle está en
haystack, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Con un string vacío ''**

&lt;?php
if (str_contains('abc', '')) {
echo "Verificar la existencia de la cadena vacía siempre devolverá true";
}
?&gt;

    El ejemplo anterior mostrará:

Verificar la existencia de la cadena vacía siempre devolverá true

    **Ejemplo #2 Demostración de la sensibilidad a mayúsculas y minúsculas**

&lt;?php
$string = 'The lazy fox jumped over the fence';

if (str_contains($string, 'lazy')) {
echo "La cadena 'lazy' fue encontrada en la cadena\n";
}

if (str_contains($string, 'Lazy')) {
echo 'La cadena "Lazy" fue encontrada en la cadena';
} else {
echo '"Lazy" no fue encontrada porque las mayúsculas y minúsculas no coinciden';
}

?&gt;

    El ejemplo anterior mostrará:

La cadena 'lazy' fue encontrada en la cadena
"Lazy" no fue encontrada porque las mayúsculas y minúsculas no coinciden

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [str_ends_with()](#function.str-ends-with) - Determina si una cadena termina con un substring dado

    - [str_starts_with()](#function.str-starts-with) - Determina si un string comienza con un substring dado

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# str_decrement

(PHP 8 &gt;= 8.3.0)

str_decrement — Decrementa un string alfanumérico

### Descripción

**str_decrement**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve el string alfanumérico ASCII decrementado
string.

### Parámetros

     string


       El string a decrementar.





### Valores devueltos

Devuelve el string alfanumérico ASCII decrementado.

### Errores/Excepciones

Se lanza una excepción [ValueError](#class.valueerror) si
string está vacío.

Se lanza una excepción [ValueError](#class.valueerror) si
string no es un string alfanumérico
ASCII.

Se lanza una excepción [ValueError](#class.valueerror) si
string no puede ser decrementado.
Por ejemplo, "A" o "0".

### Ejemplos

    **Ejemplo #1 Ejemplo básico de la función str_decrement()**

&lt;?php
$str = 'ABC';
var_dump(str_decrement($str));
?&gt;

    El ejemplo anterior mostrará:

string(3) "ABB"

    **Ejemplo #2 Ejemplo de la función str_decrement()** con una retención

&lt;?php
$str = 'ZA';
var_dump(str_decrement($str));

$str = 'AA';
var_dump(str_decrement($str));
?&gt;

    El ejemplo anterior mostrará:

string(2) "YZ"
string(1) "Z"

### Ver también

    - [str_increment()](#function.str-increment) - Incrementa un string alfanumérica

# str_ends_with

(PHP 8)

str_ends_with — Determina si una cadena termina con un substring dado

### Descripción

**str_ends_with**([string](#language.types.string) $haystack, [string](#language.types.string) $needle): [bool](#language.types.boolean)

Realiza una verificación sensible a mayúsculas y minúsculas que indica si
haystack (pajar) termina con needle (aguja).

### Parámetros

     haystack


       El string en la que se realiza la búsqueda.






     needle


       El substring a buscar en haystack.





### Valores devueltos

Devuelve **[true](#constant.true)** si haystack termina con
needle, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Con un string vacío ''**

&lt;?php
if (str_ends_with('abc', '')) {
echo "Todas las cadenas terminan con la cadena vacía";
}
?&gt;

    El ejemplo anterior mostrará:

Todas las cadenas terminan con la cadena vacía

    **Ejemplo #2 Demostración de la sensibilidad a mayúsculas y minúsculas**

&lt;?php
$string = 'The lazy fox jumped over the fence';

if (str_ends_with($string, 'fence')) {
echo "La cadena termina con 'fence'\n";
}

if (str_ends_with($string, 'Fence')) {
echo 'La cadena termina con "Fence"';
} else {
echo '"Fence" no fue encontrado porque las mayúsculas y minúsculas no coinciden';
}

?&gt;

    El ejemplo anterior mostrará:

La cadena termina con 'fence'
"Fence" no fue encontrado porque las mayúsculas y minúsculas no coinciden

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [str_contains()](#function.str-contains) - Determina si una cadena contiene un substring dado

    - [str_starts_with()](#function.str-starts-with) - Determina si un string comienza con un substring dado

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# str_getcsv

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

str_getcsv — Analiza una string CSV en un array

### Descripción

**str_getcsv**(
    [string](#language.types.string) $string,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\"
): [array](#language.types.array)

Analiza una cadena de caracteres que representa campos en formato CSV y devuelve un array que contiene todos los campos leídos.

**Nota**:

    Los parámetros de configuración local son tenidos en cuenta por esta función.
    Por ejemplo, los datos codificados en ciertos juegos de caracteres de un byte pueden ser analizados
    incorrectamente si **[LC_CTYPE](#constant.lc-ctype)** es
    en_US.UTF-8.

### Parámetros

     string


       La cadena a analizar.






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

Devuelve un array que contiene los campos leídos.

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




       8.4.0

        Ahora lanza una [ValueError](#class.valueerror) si
        separator, enclosure,
        o escape es inválido.
        Esto imita el comportamiento de [fgetcsv()](#function.fgetcsv) y
        [fputcsv()](#function.fputcsv).




       8.3.0

        Una cadena vacía es devuelta en lugar de una cadena que contiene un solo
        byte nulo para el último campo si este contiene únicamente un delimitador no terminado.




       7.4.0

        El argumento escape interpreta ahora una cadena
        vacía como señal para desactivar el mecanismo de escape propio.
        Anteriormente, una cadena vacía era tratada como el valor por defecto del argumento.





### Ejemplos

    **Ejemplo #1 Ejemplo con str_getcsv()**

&lt;?php

$string = 'PHP,Java,Python,Kotlin,Swift';
$data = str_getcsv($string, escape: '\\');

var_dump($data);
?&gt;

    El ejemplo anterior mostrará:

array(5) {
[0]=&gt;
string(3) "PHP"
[1]=&gt;
string(4) "Java"
[2]=&gt;
string(6) "Python"
[3]=&gt;
string(6) "Kotlin"
[4]=&gt;
string(5) "Swift"
}

    **Ejemplo #2 Ejemplo de str_getcsv()** con una cadena vacía


    **Precaución**

      Con una cadena vacía, esta función devuelve [null]
      en lugar de un array vacío.


&lt;?php

$string = '';
$data = str_getcsv($string, escape: '\\');

var_dump($data);
?&gt;

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
NULL
}

### Ver también

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

# str_increment

(PHP 8 &gt;= 8.3.0)

str_increment — Incrementa un string alfanumérica

### Descripción

**str_increment**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve el string alfanumérico ASCII incrementado
string.

### Parámetros

     string


       El string a incrementar.





### Valores devueltos

Devuelve el string alfanumérico ASCII incrementado.

### Errores/Excepciones

Se lanza una excepción [ValueError](#class.valueerror) si
string está vacío.

Se lanza una excepción [ValueError](#class.valueerror) si
string no es un string alfanumérico
ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo básico de la función str_increment()**

&lt;?php
$str = 'ABC';
var_dump(str_increment($str));
?&gt;

    El ejemplo anterior mostrará:

string(3) "ABD"

    **Ejemplo #2 Ejemplo de str_increment()** con acarreo

&lt;?php
$str = 'DZ';
var_dump(str_increment($str));

$str = 'ZZ';
var_dump(str_increment($str));
?&gt;

    El ejemplo anterior mostrará:

string(2) "EA"
string(3) "AAA"

### Ver también

    - [str_decrement()](#function.str-decrement) - Decrementa un string alfanumérico

# str_ireplace

(PHP 5, PHP 7, PHP 8)

str_ireplace — Versión insensible a mayúsculas y minúsculas de [str_replace()](#function.str-replace)

### Descripción

**str_ireplace**(
    [array](#language.types.array)|[string](#language.types.string) $search,
    [array](#language.types.array)|[string](#language.types.string) $replace,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**
): [string](#language.types.string)|[array](#language.types.array)

**str_ireplace()** devuelve una cadena de caracteres
o un array en el que todas las ocurrencias de search
en subject (ignorando mayúsculas y minúsculas), han sido
reemplazadas por el valor de replace.

Para reemplazar un texto según un patrón en lugar de una cadena fija,
utilice [preg_replace()](#function.preg-replace) con el modificador de patrón
i [.](#reference.pcre.pattern.modifiers).

### Parámetros

Si los parámetros search y replace
son arrays, entonces la función **str_ireplace()**
tomará un valor de cada array y los utilizará para la búsqueda y
el reemplazo en subject. Si el parámetro
replace tiene menos valores que el parámetro
search, entonces una [string](#language.types.string) vacía será utilizada
como valor para el resto de los valores de reemplazo. Si el parámetro
search es un array y el parámetro
replace es una [string](#language.types.string), entonces esta [string](#language.types.string)
de reemplazo será utilizada para cada valor de search.
Lo contrario no tiene sentido.

Si el parámetro search o el parámetro
replace son arrays, sus elementos son tratados
del primero al último.

     search


       El valor a buscar, conocido también como
       *needle*. Un array puede ser utilizado
       para designar múltiples needles.






     replace


       El valor de reemplazo utilizado para cada valor encontrado
       en search. Un array puede ser utilizado
       para designar múltiples reemplazos.






     subject


       Una [string](#language.types.string) o un [array](#language.types.array) en el que se realiza la búsqueda,
       también conocido como *haystack*.




       Si subject es un array, el reemplazo se
       realiza en cada uno de los elementos del sujeto
       subject, y el valor devuelto es también un
       array.






     count


       Si se proporciona, esta variable contendrá el número de reemplazos realizados.





### Valores devueltos

Devuelve una cadena o un array de reemplazo.

### Historial de cambios

      Versión
      Descripción







8.2.0

El case folding ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se realizará el case folding ASCII.
Los octetos no-ASCII serán comparados por su valor de octeto.

### Ejemplos

    **Ejemplo #1 Ejemplo con str_ireplace()**

&lt;?php
$bodytag = str_ireplace("%body%", "black", "&lt;body text=%BODY%&gt;");
echo $bodytag; // &lt;body text=black&gt;
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

**Precaución**

# Orden de reemplazo

    Dado que la función **str_ireplace()** realiza
    los reemplazos de izquierda a derecha, puede reemplazar
    un valor previamente insertado durante un reemplazo múltiple.
    El ejemplo #2 de la documentación de la función
    [str_replace()](#function.str-replace) sobre cómo tratar esta problemática.

### Ver también

    - [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [strtr()](#function.strtr) - Reemplaza caracteres en un string

# str_pad

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

str_pad — Completa un string hasta un tamaño dado

### Descripción

**str_pad**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $length,
    [string](#language.types.string) $pad_string = " ",
    [int](#language.types.integer) $pad_type = **[STR_PAD_RIGHT](#constant.str-pad-right)**
): [string](#language.types.string)

Retorna el string string,
completado a la derecha, a la izquierda o en ambos lados, con el
string pad_string hasta que alcance el tamaño de length.

### Parámetros

     string


       El string de entrada.






     length


       La longitud deseada del string final completado.
       Si el valor de length es negativo, menor que,
       o igual al tamaño actual del string string,
       string se retorna sin cambios.






     pad_string

      **Nota**:



        El argumento pad_string puede ser truncado si el
        número de caracteres de completado no es múltiplo del tamaño de
        pad_string.







     pad_type


       El argumento opcional pad_type puede ser
       una de las constantes siguientes: **[STR_PAD_RIGHT](#constant.str-pad-right)**,
       **[STR_PAD_LEFT](#constant.str-pad-left)**, o **[STR_PAD_BOTH](#constant.str-pad-both)**.
       Si pad_type no es especificado, toma
       el valor por omisión de **[STR_PAD_RIGHT](#constant.str-pad-right)**.





### Valores devueltos

Retorna el string completado.

### Ejemplos

    **Ejemplo #1 Ejemplo con str_pad()**

&lt;?php
$input = "Alien";
echo str_pad($input, 10), PHP*EOL; // produce "Alien "
echo str_pad($input, 10, "-=", STR_PAD_LEFT), PHP_EOL;  // produce "-=-=-Alien"
echo str_pad($input, 10, "*", STR_PAD_BOTH), PHP_EOL; // produce "**Alien\_**"
echo str_pad($input,  6, "___"), PHP_EOL;               // produce "Alien_"
echo str_pad($input, 3, "\*"), PHP_EOL; // produce "Alien"
?&gt;

### Ver también

    - [mb_str_pad()](#function.mb-str-pad) - Rellena una cadena multibyte hasta una cierta longitud con otra cadena multibyte

# str_repeat

(PHP 4, PHP 5, PHP 7, PHP 8)

str_repeat — Repite un string

### Descripción

**str_repeat**([string](#language.types.string) $string, [int](#language.types.integer) $times): [string](#language.types.string)

Retorna el string string repetido
times veces.

### Parámetros

     string


       El string a repetir.






     times


       Número de veces que el string string
       debe ser multiplicado.




       times debe ser positivo o nulo.
       Si times es 0, la función retorna
       el string vacío.





### Valores devueltos

Retorna el string, repetido times veces.

### Ejemplos

    **Ejemplo #1 Ejemplo con str_repeat()**

&lt;?php
echo str_repeat("-=", 10);
?&gt;

    El ejemplo anterior mostrará:

-=-=-=-=-=-=-=-=-=-=

### Ver también

    - [for](#control-structures.for)

    - [str_pad()](#function.str-pad) - Completa un string hasta un tamaño dado

    - [substr_count()](#function.substr-count) - Cuenta el número de ocurrencias de segmentos en un string

# str_replace

(PHP 4, PHP 5, PHP 7, PHP 8)

str_replace — Reemplaza todas las ocurrencias en una string

### Descripción

**str_replace**(
    [array](#language.types.array)|[string](#language.types.string) $search,
    [array](#language.types.array)|[string](#language.types.string) $replace,
    [string](#language.types.string)|[array](#language.types.array) $subject,
    [int](#language.types.integer) &amp;$count = **[null](#constant.null)**
): [string](#language.types.string)|[array](#language.types.array)

**str_replace()** devuelve una string o un array,
donde todas las ocurrencias de search en
subject han sido reemplazadas por
replace.

Para reemplazar un texto en función de un patrón en lugar de una string fija,
utilice [preg_replace()](#function.preg-replace).

### Parámetros

Si los argumentos search y replace
son arrays, entonces la función **str_replace()**
tomará un valor de cada array y los utilizará para la búsqueda y
el reemplazo en subject. Si el argumento
replace tiene menos valores que el argumento
search, entonces una string vacía será utilizada
como valor para el resto de los valores de reemplazo. Si el argumento
search es un array y el argumento
replace es una string, entonces esta string
de reemplazo será utilizada para cada valor de search.
Lo inverso no tiene sentido.

Si search o replace
son arrays, los elementos son procesados del primero al último.

     search


       El valor a buscar, también conocido como *patrón*.
       Un array puede ser utilizado para designar múltiples patrones.






     replace


       El valor de reemplazo a sustituir por los valores encontrados.
       Un array puede ser utilizado para designar múltiples valores
       de reemplazo.






     subject


       La string o el array sobre el cual se realizará la
       búsqueda y el reemplazo, también conocido como
       *pajar*.




       Si subject es un array, entonces el
       reemplazo se realizará en cada elemento del mismo, y
       el valor devuelto será también un array.






     count


       Si se proporciona, esta variable contendrá el número de reemplazos realizados.





### Valores devueltos

Esta función devuelve una string, o un array, conteniendo los valores
reemplazados.

### Ejemplos

    **Ejemplo #1 Ejemplo 1 con str_replace()**

&lt;?php
// Genera: &lt;body text='black'&gt;
$bodytag = str_replace("%body%", "black", "&lt;body text='%body%'&gt;");
echo $bodytag, PHP_EOL;

// Genera: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
echo $onlyconsonants, PHP_EOL;

// Genera: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);
echo $newphrase, PHP_EOL;

// Genera: good goy miss moy
$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $count, PHP_EOL;

?&gt;

    **Ejemplo #2 Ejemplo 2 con str_replace()**

&lt;?php
// Orden de los reemplazos
$str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
$order = array("\r\n", "\n", "\r");
$replace = '&lt;br /&gt;';

// Procesamiento del primer \r\n, no serán convertidos dos veces.
$newstr = str_replace($order, $replace, $str);
echo $newstr, PHP_EOL;

// Muestra F porque A es reemplazado por B, luego B es reemplazado por C, y así sucesivamente...
// Finalmente, E es reemplazado por F
$search  = array('A', 'B', 'C', 'D', 'E');
$replace = array('B', 'C', 'D', 'E', 'F');
$subject = 'A';
echo str_replace($search, $replace, $subject), PHP_EOL;

// Muestra: apearpearle pear
// Por las mismas razones que arriba
$letters = array('a', 'p');
$fruit = array('apple', 'pear');
$text    = 'a p';
$output = str_replace($letters, $fruit, $text);
echo $output, PHP_EOL;
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

**Precaución**

# Orden de reemplazo

    Debido a que la función **str_replace()**
    realiza los reemplazos de izquierda a derecha, puede
    reemplazar un valor previamente insertado durante múltiples
    reemplazos.

**Nota**:

    Esta función es sensible a mayúsculas y minúsculas. Utilice la función
    [str_ireplace()](#function.str-ireplace) para un reemplazo insensible a mayúsculas y minúsculas.

### Ver también

    - [str_ireplace()](#function.str-ireplace) - Versión insensible a mayúsculas y minúsculas de str_replace

    - [substr_replace()](#function.substr-replace) - Reemplaza un segmento en un string

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

    - [strtr()](#function.strtr) - Reemplaza caracteres en un string

# str_rot13

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

str_rot13 — Realiza una transformación ROT13

### Descripción

**str_rot13**([string](#language.types.string) $string): [string](#language.types.string)

Realiza una codificación ROT13 de la cadena string y
devuelve el resultado.

La codificación ROT13 desplaza todas las letras 13 posiciones en el alfabeto, y deja
todos los otros caracteres sin cambios. La codificación y el decodificado se realizan
mediante la misma función: pasar el resultado de **str_rot13()**
nuevamente como argumento devolverá la cadena original.

### Parámetros

     string


       La cadena de entrada.





### Valores devueltos

Devuelve la versión ROT13 de la cadena proporcionada.

### Ejemplos

    **Ejemplo #1 Ejemplo con str_rot13()**

&lt;?php

echo str_rot13('PHP 4.3.0'); // CUC 4.3.0

?&gt;

# str_shuffle

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

str_shuffle — Mezcla los caracteres de un string

### Descripción

**str_shuffle**([string](#language.types.string) $string): [string](#language.types.string)

**str_shuffle()** mezcla los caracteres de un string.
Se crea una permutación entre todas las posibles.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

### Parámetros

     string


       El string de entrada.





### Valores devueltos

Devuelve el string mezclado.

### Historial de cambios

       Versión
       Descripción






       7.1.0

        El algoritmo de aleatorización [ha sido modificado](#migration71.incompatible.rand-srand-aliases) para utilizar el Generador de Números Aleatorios
        [» Mersenne Twister](http://www.math.sci.hiroshima-u.ac.jp/~m-mat/MT/emt.html) en lugar de la función rand de libc.





### Ejemplos

    **Ejemplo #1 Ejemplo con str_shuffle()**

&lt;?php
$str = 'abcdef';
$shuffled = str_shuffle($str);

// Esto mostrará algo como: bfdaec
echo $shuffled;
?&gt;

### Ver también

    - [Random\Randomizer::shuffleBytes()](#random-randomizer.shufflebytes) - Devuelve una permutación por octeto de una cadena de caracteres

    - [Random\Randomizer::shuffleArray()](#random-randomizer.shufflearray) - Devuelve una permutación de un array

# str_split

(PHP 5, PHP 7, PHP 8)

str_split — Convierte un string en un array

### Descripción

**str_split**([string](#language.types.string) $string, [int](#language.types.integer) $length = 1): [array](#language.types.array)

Convierte un string en un array.

### Parámetros

     string


       El string de entrada.






     length


       Longitud máxima de cada elemento.





### Valores devueltos

Si el argumento opcional length
es especificado, el array devuelto será dividido en subpartes,
cada una de tamaño length, a excepción
de la última subparte que puede ser más corta si el string
no se divide de manera equitativa.
El valor por omisión de length es 1,
lo que significa que cada subparte tendrá un tamaño de un byte.

### Errores/Excepciones

Si length es menor que 1,
se lanzará un [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.2.0

       Si string está vacío, ahora se devuelve un array vacío.
       Anteriormente, se devolvía un array que contenía un único string vacío.




      8.0.0

       Si length es menor que 1,
       se lanzará un [ValueError](#class.valueerror);
       anteriormente, se emitía un error de tipo **[E_WARNING](#constant.e-warning)**
       y la función devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con str_split()**

&lt;?php

$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);

print_r($arr1);
print_r($arr2);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; H
[1] =&gt; e
[2] =&gt; l
[3] =&gt; l
[4] =&gt; o
[5] =&gt;
[6] =&gt; F
[7] =&gt; r
[8] =&gt; i
[9] =&gt; e
[10] =&gt; n
[11] =&gt; d
)

Array
(
[0] =&gt; Hel
[1] =&gt; lo
[2] =&gt; Fri
[3] =&gt; end
)

### Notas

**Nota**:

    **str_split()** realizará la división a nivel de bits,
    en lugar de a nivel de caracteres al utilizarse con un string codificado en multibytes.
    [mb_str_split()](#function.mb-str-split) puede ser utilizado para dividir el string en puntos de código.
    [grapheme_str_split()](#function.grapheme-str-split) puede ser utilizado para dividir el string en clusters de grafemas.

### Ver también

    - [mb_str_split()](#function.mb-str-split) - Para una cadena multibyte dada, devuelve un array de sus caracteres

    - [grapheme_str_split()](#function.grapheme-str-split) - Divide una string en un array

    - [chunk_split()](#function.chunk-split) - Divide un string

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [explode()](#function.explode) - Divide una string en segmentos

    - [count_chars()](#function.count-chars) - Devuelve estadísticas sobre los caracteres utilizados en un string

    - [str_word_count()](#function.str-word-count) - Cuenta el número de palabras utilizadas en un string

    - [for](#control-structures.for)

# str_starts_with

(PHP 8)

str_starts_with — Determina si un string comienza con un substring dado

### Descripción

**str_starts_with**([string](#language.types.string) $haystack, [string](#language.types.string) $needle): [bool](#language.types.boolean)

Realiza una verificación sensible a mayúsculas y minúsculas que indica si
haystack (pajar) comienza con needle (aguja).

### Parámetros

     haystack


       El string en la que se realiza la búsqueda.






     needle


       El substring a buscar en haystack.





### Valores devueltos

Devuelve **[true](#constant.true)** si haystack comienza con
needle, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Con un string vacío ''**

&lt;?php
if (str_starts_with('abc', '')) {
echo "Todas los strings comienzan con el string vacía";
}
?&gt;

    El ejemplo anterior mostrará:

Todas los strings comienzan con el string vacía

    **Ejemplo #2 Demostración de la sensibilidad a mayúsculas y minúsculas**

&lt;?php
$string = 'The lazy fox jumped over the fence';

if (str_starts_with($string, 'The')) {
echo "El string comienza con 'The'\n";
}

if (str_starts_with($string, 'the')) {
echo 'El string comienza con "the"';
} else {
echo '"the" no fue encontrado porque las mayúsculas y minúsculas no coinciden';
}

?&gt;

    El ejemplo anterior mostrará:

El string comienza con 'The'
"the" no fue encontrado porque las mayúsculas y minúsculas no coinciden

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [str_contains()](#function.str-contains) - Determina si una cadena contiene un substring dado

    - [str_ends_with()](#function.str-ends-with) - Determina si una cadena termina con un substring dado

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# str_word_count

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

str_word_count — Cuenta el número de palabras utilizadas en un string

### Descripción

**str_word_count**([string](#language.types.string) $string, [int](#language.types.integer) $format = 0, [?](#language.types.null)[string](#language.types.string) $characters = **[null](#constant.null)**): [array](#language.types.array)|[int](#language.types.integer)

**str_word_count()** cuenta el número de palabras en
el string string. Si el argumento opcional
format no está especificado, entonces el valor
devuelto será un integer, representando el número de palabras encontradas.
Si format está especificado, el valor devuelto
será un array, que depende del formato format.
Los valores posibles para format se listan a continuación.

En esta función, la noción de palabra depende de la configuración
de la configuración local. Es un string que contiene todos los caracteres
alfabéticos, y que puede contener, pero no comenzar por
"'" y "-".
Cabe señalar que las configuraciones locales multioctetos no están soportadas.

### Parámetros

     string


       El string






     format


       Especifica el valor de retorno de esta función. Los valores
       actualmente soportados son:



        -

          0: devuelve el número de palabras encontradas



        -

          1: devuelve un array que contiene todas las palabras encontradas dentro
          de string



        -

          2: devuelve un array asociativo, donde la clave indica la posición
          numérica de la palabra dentro de string y
          el valor es la palabra actual








     characters


       Una lista de caracteres adicionales que serán considerados como una
       palabra





### Valores devueltos

Devuelve un array o un integer, dependiendo del
format elegido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       characters ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con str_word_count()**

&lt;?php

$str = "Salut l'ami, vous
avez une b3lle mine !";

print_r(str_word_count($str, 1));
print_r(str_word_count($str, 2));
print_r(str_word_count($str, 1, 'àáãç3'));

echo str_word_count($str);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; Salut
[1] =&gt; l'ami
[2] =&gt; vous
[3] =&gt; avez
[4] =&gt; une
[5] =&gt; b
[6] =&gt; lle
[7] =&gt; mine
)

Array
(
[0] =&gt; Salut
[6] =&gt; l'ami
[13] =&gt; vous
[27] =&gt; avez
[41] =&gt; une
[45] =&gt; b
[47] =&gt; lle
[51] =&gt; mine
)

Array
(
[0] =&gt; Salut
[1] =&gt; l'ami
[2] =&gt; vous
[3] =&gt; avez
[4] =&gt; une
[5] =&gt; b3lle
[6] =&gt; mine
)

8

### Ver también

    - [explode()](#function.explode) - Divide una string en segmentos

    - [preg_split()](#function.preg-split) - Divide una cadena mediante expresión regular

    - [count_chars()](#function.count-chars) - Devuelve estadísticas sobre los caracteres utilizados en un string

    - [substr_count()](#function.substr-count) - Cuenta el número de ocurrencias de segmentos en un string

# strcasecmp

(PHP 4, PHP 5, PHP 7, PHP 8)

strcasecmp — Comparación insensible a mayúsculas/minúsculas de strings binarios

### Descripción

**strcasecmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)

Comparación insensible a mayúsculas/minúsculas de strings binarios.
La comparación no tiene en cuenta la configuración regional; solo las letras ASCII
se comparan de manera insensible a mayúsculas/minúsculas.

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

    **Ejemplo #1 Ejemplo con strcasecmp()**

&lt;?php
$var1 = "Hello";
$var2 = "hello";
if (strcasecmp($var1, $var2) == 0) {
   echo '$var1 es igual a $var2 (comparación insensible a mayúsculas/minúsculas)';
}
?&gt;

### Ver también

    - [strcmp()](#function.strcmp) - Comparación binaria de strings

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [substr_compare()](#function.substr-compare) - Comparar dos strings desde un offset hasta una longitud en caracteres

    - [strncasecmp()](#function.strncasecmp) - Comparación binaria de strings insensible a mayúsculas/minúsculas

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [substr()](#function.substr) - Devuelve un segmento de string

# strchr

(PHP 4, PHP 5, PHP 7, PHP 8)

strchr — Alias de [strstr()](#function.strstr)

### Descripción

Esta función es un alias de:
[strstr()](#function.strstr).

# strcmp

(PHP 4, PHP 5, PHP 7, PHP 8)

strcmp — Comparación binaria de strings

### Descripción

**strcmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)

Se debe tener en cuenta que esta comparación distingue entre mayúsculas y minúsculas. Para una comparación que no distinga entre mayúsculas y minúsculas,
vea [strcasecmp()](#function.strcasecmp).

Se debe tener en cuenta que esta comparación no tiene en cuenta la configuración regional. Para una comparación con la configuración regional, vea
[strcoll()](#function.strcoll) o [Collator::compare()](#collator.compare)

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de strcmp()**

&lt;?php
$var1 = "Bonjour";
$var2 = "bonjour";
if (strcmp($var1, $var2) !== 0) {
    echo "$var1 no es igual a $var2 en una comparación sensible a mayúsculas y minúsculas.";
}
?&gt;

### Ver también

    -
     Comparación completa de string

      <li>[strcasecmp()](#function.strcasecmp) - Comparación insensible a mayúsculas/minúsculas de strings binarios

      - [Collator::compare()](#collator.compare) - Comparar dos strings Unicode

      - [strcoll()](#function.strcoll) - Comparación de strings localizadas


    </li>
    -
     Comparación parcial de string

      <li>[substr_compare()](#function.substr-compare) - Comparar dos strings desde un offset hasta una longitud en caracteres

      - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

      - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string


    </li>
    -
     Comparación similar / otra de string

      <li>[preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

      - [levenshtein()](#function.levenshtein) - Calcula la distancia Levenshtein entre dos strings

      - [metaphone()](#function.metaphone) - Calcula la clave metaphone

      - [similar_text()](#function.similar-text) - Calcula la similitud entre dos strings

      - [soundex()](#function.soundex) - Calcula la clave soundex


    </li>

# strcoll

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

strcoll — Comparación de strings localizadas

### Descripción

**strcoll**([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)

Se debe tener en cuenta que esta comparación distingue entre mayúsculas y minúsculas, y que,
a diferencia de [strcmp()](#function.strcmp), no es
compatible con strings binarios.

**strcoll()** utiliza la configuración local/regional actual para
realizar la comparación. Si la configuración local/regional actual es
C o POSIX, esta función es entonces equivalente a la función
[strcmp()](#function.strcmp).

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.





### Valores devueltos

Devuelve &lt; 0 si string1
es menor que string2; &gt; 0 si string1
es mayor que string2, y 0 si los dos strings
son iguales.

### Ver también

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [strcmp()](#function.strcmp) - Comparación binaria de strings

    - [strcasecmp()](#function.strcasecmp) - Comparación insensible a mayúsculas/minúsculas de strings binarios

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strncasecmp()](#function.strncasecmp) - Comparación binaria de strings insensible a mayúsculas/minúsculas

    - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

# strcspn

(PHP 4, PHP 5, PHP 7, PHP 8)

strcspn — Encuentra un segmento de string que no contiene ciertos caracteres

### Descripción

**strcspn**(
    [string](#language.types.string) $string,
    [string](#language.types.string) $characters,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**
): [int](#language.types.integer)

Devuelve la longitud del primer segmento de string
que no contiene _ninguno_ de los caracteres de
characters.

Si offset y length
son omitidos, entonces se examinará la totalidad de string.
Si se incluyen, el efecto será idéntico a
llamar a strcspn(substr($string, $offset, $length),
$characters) (ver [substr](#function.substr) para más
información).

### Parámetros

     string


       El string a examinar.






     characters


       El string que contiene todos los caracteres desactivados.






     offset


       La posición en string desde la cual se comienza a buscar.




       Si offset es proporcionado y no es negativo,
       entonces **strcspn()** comenzará a examinar
       string en la
       posición offset. Por ejemplo, en
       el string 'abcdef', el carácter en la posición
       0 es 'a', el carácter
       en la posición 2 es
       'c', y así sucesivamente.




       Si offset es proporcionado y es negativo,
       entonces [strspn()](#function.strspn) comenzará a examinar
       string en la
       posición offset desde el final de
       string.






     length


       La longitud del segmento de string
       a examinar.




       Si length es proporcionado y no es negativo,
       entonces string será examinado
       desde length caracteres después de la posición de
       inicio.




       Si length es proporcionado y es negativo,
       entonces string será examinado desde la
       posición de inicio hasta length
       caracteres desde el final de string.





### Valores devueltos

Devuelve la longitud del segmento inicial de string
que contiene solo caracteres que no están _no_
en characters.

**Nota**:

    Cuando el parámetro offset está definido, la
    longitud devuelta se cuenta desde esta posición, y no desde
    el inicio de string.

### Historial de cambios

      Versión
      Descripción






      8.4.0


        Antes de PHP 8.4.0, cuando characters era un string vacío,
        la búsqueda se detenía incorrectamente en el primer byte nulo en string.





      8.0.0

       length ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con strcspn()**

&lt;?php
$a = strcspn('banana', 'a');
$b = strcspn('banana', 'abcd');
$c = strcspn('banana', 'z');
$d = strcspn('abcdhelloabcd', 'a', -9);
$e = strcspn('abcdhelloabcd', 'a', -9, -5);

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
?&gt;

El ejemplo anterior mostrará:

int(1)
int(0)
int(6)
int(5)
int(4)

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strspn()](#function.strspn) - Encuentra la longitud del segmento inicial de un string que contiene

todos los caracteres de una máscara dada

# strip_tags

(PHP 4, PHP 5, PHP 7, PHP 8)

strip_tags — Elimina las etiquetas HTML y PHP de un string

### Descripción

**strip_tags**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $allowed_tags = **[null](#constant.null)**): [string](#language.types.string)

**strip_tags()** intenta devolver el string string
después de eliminar todos los bytes nulos, todas las etiquetas PHP y HTML del código.
Genera alertas si las etiquetas están incompletas o son erróneas. Utiliza
el mismo motor de búsqueda que [fgetss()](#function.fgetss).

### Parámetros

     string


       El string de entrada.






     allowed_tags


       Puede utilizarse este argumento opcional para especificar las etiquetas
       que no deben ser eliminadas.
       Pueden ser proporcionadas como [string](#language.types.string) o, a partir de PHP 7.4.0, como
       [array](#language.types.array). Consúltese los ejemplos a continuación para el formato de
       este argumento.



      **Nota**:



        Los comentarios HTML y PHP también son eliminados. Este comportamiento
        no puede ser modificado con el argumento allowed_tags.




      **Nota**:



        Las etiquetas XHTML auto-cerradas son ignoradas y solo las etiquetas que
        no son auto-cerradas deben ser utilizadas en el string
        allowed_tags. Por ejemplo, para permitir tanto
        &lt;br&gt; como &lt;br/&gt;, se debe utilizar:






&lt;?php
strip_tags($input, '&lt;br&gt;');
?&gt;

### Valores devueltos

Devuelve el string escapado.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        allowed_tags ahora puede ser nullable.




       7.4.0

        allowed_tags ahora acepta un [array](#language.types.array).





### Ejemplos

    **Ejemplo #1 Ejemplo con strip_tags()**

&lt;?php
$text = '&lt;p&gt;Test paragraph.&lt;/p&gt;&lt;!-- Comment --&gt; &lt;a href="#fragment"&gt;Other text&lt;/a&gt;';
echo strip_tags($text);
echo "\n";

// Permite &lt;p&gt; y &lt;a&gt;
echo strip_tags($text, '&lt;p&gt;&lt;a&gt;');

// a partir de PHP 7.4.0 la línea anterior puede ser escrita como:
// echo strip_tags($text, ['p', 'a']);
?&gt;

    El ejemplo anterior mostrará:

Test paragraph. Other text
&lt;p&gt;Test paragraph.&lt;/p&gt; &lt;a href="#fragment"&gt;Other text&lt;/a&gt;

### Notas

**Advertencia**

    Esta función no debería ser utilizada para prevenir ataques XSS.
    Utilizar funciones más apropiadas como [htmlspecialchars()](#function.htmlspecialchars)
    u otros métodos según el contexto de la salida.

**Advertencia**

    Como **strip_tags()** no valida el HTML,
    las etiquetas parciales o rotas pueden conducir a la eliminación de
    más texto/datos de lo deseado.

**Advertencia**

    **strip_tags()** no modifica los atributos de las
    etiquetas que se autorizan mediante el argumento allowed_tags,
    incluyendo los atributos style y onmouseover, que usuarios malintencionados
    pueden utilizar.

**Nota**:

    Los nombres de las etiquetas en el HTML de entrada que son superiores a 1023 bytes
    de longitud serán tratados como inválidos, según el argumento
    allowed_tags.

### Ver también

    - [htmlspecialchars()](#function.htmlspecialchars) - Convierte caracteres especiales en entidades HTML

# stripcslashes

(PHP 4, PHP 5, PHP 7, PHP 8)

stripcslashes — Decodifica un string codificado con [addcslashes()](#function.addcslashes)

### Descripción

**stripcslashes**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve el string str
después de eliminar todas las barras invertidas. **stripcslashes()**
respeta las secuencias especiales de C, tales como \n,
\r..., los números octales y hexadecimales.

### Parámetros

     string


       El string a procesar.





### Valores devueltos

Devuelve el string modificado.

### Ejemplos

    **Ejemplo #1 Ejemplo con stripcslashes()**



     &lt;?php

var_dump(stripcslashes('I\'d have a coffee.\nNot a problem.') === "I'd have a coffee.
Not a problem."); // true
?&gt;

### Ver también

    - [addcslashes()](#function.addcslashes) - Añade barras invertidas a un string, al estilo del lenguaje C

# stripos

(PHP 5, PHP 7, PHP 8)

stripos — Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

### Descripción

**stripos**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [int](#language.types.integer) $offset = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Busca la posición numérica de la primera ocurrencia de
needle en el string haystack.

A diferencia de la función [strpos()](#function.strpos),
**stripos()** no distingue entre mayúsculas y minúsculas.

### Parámetros

     haystack


       El string en el que se realiza la búsqueda.






     needle


       El string a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     offset


       Si se especifica, la búsqueda comenzará a partir de este número
       de caracteres, contados desde el inicio del string. Si la posición
       es negativa, la búsqueda comenzará utilizando este número de caracteres
       pero comenzando desde el final del string.





### Valores devueltos

Devuelve la posición de la primera ocurrencia en el string
en relación con el inicio del string haystack
(independientemente del offset). Asimismo, se debe tener en cuenta que la posición
en el string comienza en 0, y no en 1.

Devuelve **[false](#constant.false)** si la ocurrencia no ha sido encontrada.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.2.0

El case folding ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se realizará el case folding ASCII.
Los octetos no-ASCII serán comparados por su valor de octeto.

8.0.0

needle acepta ahora una cadena vacía.

      8.0.0

       Pasar un [int](#language.types.integer) como needle ya no está soportado.




      7.3.0

       Pasar un [int](#language.types.integer) como before_needle ha sido
       declarado obsoleto.




      7.1.0

       Se ha añadido soporte para números negativos en el parámetro offset.



### Ejemplos

**Ejemplo #1 Ejemplo con stripos()**

&lt;?php
$findme    = 'a';
$mystring1 = 'xyz';
$mystring2 = 'ABC';

$pos1 = stripos($mystring1, $findme);
$pos2 = stripos($mystring2, $findme);

// No, 'a' no forma parte de 'xyz'
if ($pos1 === false) {
    echo "El string '$findme' no ha sido encontrado en el string '$mystring1'", PHP_EOL;
}

// Observe el uso de !==. Un simple != no daría el resultado esperado
// ya que la letra 'a' está en la posición 0 (la primera).
if ($pos2 !== false) {
    echo "El string '$findme' ha sido encontrado en el string '$mystring2'", PHP_EOL;
echo " en la posición $pos2";
}
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [mb_stripos()](#function.mb-stripos) - Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla

    - [str_contains()](#function.str-contains) - Determina si una cadena contiene un substring dado

    - [str_ends_with()](#function.str-ends-with) - Determina si una cadena termina con un substring dado

    - [str_starts_with()](#function.str-starts-with) - Determina si un string comienza con un substring dado

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [str_ireplace()](#function.str-ireplace) - Versión insensible a mayúsculas y minúsculas de str_replace

# stripslashes

(PHP 4, PHP 5, PHP 7, PHP 8)

stripslashes — Quita las barras de un string con comillas escapadas

### Descripción

**stripslashes**([string](#language.types.string) $str): [string](#language.types.string)

Quita las barras de un string con comillas escapadas.

**stripslashes()** se puede utilizar si no está insertando
estos datos en un lugar (como una base de datos) que requiere escapar.
Por ejemplo, si simplemente está imprimiendo datos directamente desde un formulario HTML.

### Parámetros

     str


       El string de entrada.





### Valores devueltos

Devuelve un string con las barras invertidas retiradas.
(\' se convierte en ' y así sucesivamente.)
Barras invertidas dobles (\\) se convierten en una
sencilla (\).

### Ejemplos

    **Ejemplo #1 Un ejemplo de stripslashes()**

&lt;?php
$str = "Is your name O\'reilly?";

// Salida: Is your name O'reilly?
echo stripslashes($str);
?&gt;

**Nota**:

    **stripslashes()** no es recursiva. Si se desea aplicar
    esta función a un array multi-dimensional, se necesita utilizar una función
    recursiva.








    **Ejemplo #2 Utilizando stripslashes()** en un array

&lt;?php
function stripslashes_deep($value)
{
    $value = is_array($value) ?
array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;

}

// Ejemplo
$array = array("f\\'oo", "b\\'ar", array("fo\\'o", "b\\'ar"));
$array = stripslashes_deep($array);

// Salida
print_r($array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; f'oo
[1] =&gt; b'ar
[2] =&gt; Array
(
[0] =&gt; fo'o
[1] =&gt; b'ar
)

)

### Ver también

    - [addslashes()](#function.addslashes) - Añade barras invertidas en un string

    - [get_magic_quotes_gpc()](#function.get-magic-quotes-gpc) - Devuelve la configuración actual de la opción magic_quotes_gpc

# stristr

(PHP 4, PHP 5, PHP 7, PHP 8)

stristr — Versión insensible a mayúsculas y minúsculas de [strstr()](#function.strstr)

### Descripción

**stristr**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una subcadena de haystack,
desde la primera ocurrencia de needle
(incluida) hasta el final de la cadena.

### Parámetros

     haystack


       La cadena en la que se debe buscar.






     needle


       La cadena a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     before_needle


       Si es **[true](#constant.true)**, **stristr()**
       devuelve la parte de haystack antes de la primera
       ocurrencia de needle (needle
       excluida).





needle y haystack
se tratan sin tener en cuenta mayúsculas y minúsculas.

### Valores devueltos

Devuelve la parte correspondiente de la cadena. Si
needle no se encuentra, la función
devuelve **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El case folding ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se realizará el case folding ASCII.
Los octetos no-ASCII serán comparados por su valor de octeto.

8.0.0

needle acepta ahora una cadena vacía.

       8.0.0

        Pasar un [int](#language.types.integer) como needle ya no está soportado.




       7.3.0

        Pasar un [int](#language.types.integer) como before_needle se ha
        marcado como obsoleto.





### Ejemplos

    **Ejemplo #1 Ejemplo con stristr()**

&lt;?php
$email = 'USER@EXAMPLE.com';
  echo stristr($email, 'e'), PHP_EOL; // muestra ER@EXAMPLE.com
echo stristr($email, 'e', true), PHP_EOL; // muestra US
?&gt;

    **Ejemplo #2 Comprueba si una cadena es encontrada o no**

&lt;?php
$string = 'Hello World!';
  if (stristr($string, 'earth') === FALSE) {
echo '"terre" no encontrado en la cadena';
}
// muestra: "terre" no encontrado en la cadena
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# strlen

(PHP 4, PHP 5, PHP 7, PHP 8)

strlen — Calcula el tamaño de un string

### Descripción

**strlen**([string](#language.types.string) $string): [int](#language.types.integer)

Devuelve el tamaño del string string.

### Parámetros

     string


       El [string](#language.types.string) a medir.





### Valores devueltos

El tamaño del string string en bytes.

### Ejemplos

    **Ejemplo #1 Ejemplo con strlen()**

&lt;?php
$str = 'abcdef';
echo strlen($str), PHP_EOL; // 6

$str = ' ab cd ';
echo strlen($str), PHP_EOL; // 7
?&gt;

### Notas

**Nota**:

    **strlen()** devuelve el número de bytes
    en lugar del número de caracteres en un string.

### Ver también

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

    - [grapheme_strlen()](#function.grapheme-strlen) - Lee la longitud de una cadena en número de grafemas

    - [iconv_strlen()](#function.iconv-strlen) - Devuelve el número de caracteres de una cadena

    - [mb_strlen()](#function.mb-strlen) - Devuelve la longitud de una cadena

# strnatcasecmp

(PHP 4, PHP 5, PHP 7, PHP 8)

strnatcasecmp — Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)

### Descripción

**strnatcasecmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)

**strnatcasecmp()** implementa el algoritmo de comparación
que ordena los strings como lo haría un ser humano. Esta función es
similar a la función [strnatcmp()](#function.strnatcmp), pero la comparación
no es sensible a mayúsculas/minúsculas. Para más detalles, consulte
[» Natural Order String
Comparison](https://github.com/sourcefrog/natsort) de Martin Pool (en inglés).

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

    **Ejemplo #1 Ejemplo con strnatcasecmp()**

&lt;?php

var_dump(strnatcasecmp('Apple', 'Banana'));
var_dump(strnatcasecmp('Banana', 'Apple'));
var_dump(strnatcasecmp('apple', 'Apple'));
?&gt;

    El ejemplo anterior mostrará:

int(-1)
int(1)
int(0)

### Ver también

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [strcmp()](#function.strcmp) - Comparación binaria de strings

    - [strcasecmp()](#function.strcasecmp) - Comparación insensible a mayúsculas/minúsculas de strings binarios

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strncasecmp()](#function.strncasecmp) - Comparación binaria de strings insensible a mayúsculas/minúsculas

    - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

# strnatcmp

(PHP 4, PHP 5, PHP 7, PHP 8)

strnatcmp — Comparación de strings con el algoritmo de "orden natural"

### Descripción

**strnatcmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)

Implementa el algoritmo de comparación que ordena los strings como lo haría un ser humano. Tenga en cuenta que esta comparación distingue entre mayúsculas y minúsculas.

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

Un ejemplo de la diferencia de tratamiento con el algoritmo estándar se presenta a continuación:

**Ejemplo #1 [strcmp()](#function.strcmp)**

&lt;?php
$arr1 = $arr2 = array("img12.png", "img10.png", "img2.png", "img1.png");
echo "Ordenación de strings estándar\n";
usort($arr1, "strcmp");
print_r($arr1);
echo "\nOrdenación de strings \"orden natural\"\n";
usort($arr2, "strnatcmp");
print_r($arr2);
?&gt;

    El ejemplo anterior mostrará:

Ordenación de strings estándar
Array
(
[0] =&gt; img1.png
[1] =&gt; img10.png
[2] =&gt; img12.png
[3] =&gt; img2.png
)

Ordenación de strings "orden natural"
Array
(
[0] =&gt; img1.png
[1] =&gt; img2.png
[2] =&gt; img10.png
[3] =&gt; img12.png
)

Para más detalles, consulte
[» Natural Order String
Comparison](https://github.com/sourcefrog/natsort) de Martin Pool (en inglés).

### Ver también

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [strcasecmp()](#function.strcasecmp) - Comparación insensible a mayúsculas/minúsculas de strings binarios

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strcmp()](#function.strcmp) - Comparación binaria de strings

    - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

    - [strncasecmp()](#function.strncasecmp) - Comparación binaria de strings insensible a mayúsculas/minúsculas

    - [strnatcasecmp()](#function.strnatcasecmp) - Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [natsort()](#function.natsort) - Ordena un array con el algoritmo de "orden natural"

    - [natcasesort()](#function.natcasesort) - Ordena un array con el algoritmo de "orden natural" insensible a mayúsculas y minúsculas

# strncasecmp

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

strncasecmp — Comparación binaria de strings insensible a mayúsculas/minúsculas

### Descripción

**strncasecmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2, [int](#language.types.integer) $length): [int](#language.types.integer)

**strncasecmp()** es similar a [strcasecmp()](#function.strcasecmp),
con la diferencia de que permite limitar el número de caracteres utilizados para
comparar string1 y string2,
mediante el argumento length.

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.






     length


       La longitud de los strings a utilizar en la comparación.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

    **Ejemplo #1 Ejemplo con strncasecmp()**

&lt;?php

$var1 = 'Hello John';
$var2 = 'hello Doe';
if (strncasecmp($var1, $var2, 5) === 0) {
echo 'Los 5 primeros caracteres de $var1 y $var2 son iguales en una comparación de strings insensible a mayúsculas/minúsculas.';
}
?&gt;

### Ver también

    - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [substr_compare()](#function.substr-compare) - Comparar dos strings desde un offset hasta una longitud en caracteres

    - [strcasecmp()](#function.strcasecmp) - Comparación insensible a mayúsculas/minúsculas de strings binarios

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [substr()](#function.substr) - Devuelve un segmento de string

# strncmp

(PHP 4, PHP 5, PHP 7, PHP 8)

strncmp — Comparación binaria de los n primeros caracteres

### Descripción

**strncmp**([string](#language.types.string) $string1, [string](#language.types.string) $string2, [int](#language.types.integer) $length): [int](#language.types.integer)

Idéntica a la función [strcmp()](#function.strcmp), con la diferencia
de que se puede especificar el número máximo de caracteres a utilizar para la
comparación de string1 con string2
mediante el parámetro length.

Tenga en cuenta que esta comparación es sensible a mayúsculas y minúsculas.

### Parámetros

     string1


       El primer string.






     string2


       El segundo string.






     length


       Número de caracteres a utilizar para la comparación.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

### Historial de cambios

      Versión
      Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

### Ejemplos

    **Ejemplo #1 Ejemplo con strncmp()**

&lt;?php

$var1 = 'Hello John';
$var2 = 'Hello Doe';
if (strncmp($var1, $var2, 5) === 0) {
echo 'Los 5 primeros caracteres de $var1 y $var2 son iguales en una comparación de strings sensibles a mayúsculas y minúsculas.';
}
?&gt;

### Ver también

    - [strncasecmp()](#function.strncasecmp) - Comparación binaria de strings insensible a mayúsculas/minúsculas

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [substr_compare()](#function.substr-compare) - Comparar dos strings desde un offset hasta una longitud en caracteres

    - [strcmp()](#function.strcmp) - Comparación binaria de strings

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

# strpbrk

(PHP 5, PHP 7, PHP 8)

strpbrk — Busca un conjunto de caracteres en un string

### Descripción

**strpbrk**([string](#language.types.string) $string, [string](#language.types.string) $characters): [string](#language.types.string)|[false](#language.types.singleton)

**strpbrk()** busca el conjunto de caracteres
characters en el string string.

### Parámetros

     string


       El string en el que se busca characters.






     characters


       Este argumento distingue entre mayúsculas y minúsculas.





### Valores devueltos

Devuelve un string, comenzando en el primer carácter encontrado,
o **[false](#constant.false)** si no se ha encontrado ninguno.

### Ejemplos

    **Ejemplo #1 Ejemplo con strpbrk()**

&lt;?php

$text = 'This is a Simple text.';

// Esto mostrará "is is a Simple text." porque 'i' coincide con el primero
echo strpbrk($text, 'mi'), PHP_EOL;

// Esto mostrará "Simple text." porque los caracteres distinguen mayúsculas y minúsculas
echo strpbrk($text, 'S'), PHP_EOL;
?&gt;

### Ver también

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# strpos

(PHP 4, PHP 5, PHP 7, PHP 8)

strpos — Busca la posición de la primera ocurrencia en un string

### Descripción

**strpos**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [int](#language.types.integer) $offset = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Busca la posición numérica de la primera ocurrencia de
needle en el [string](#language.types.string)
haystack.

### Parámetros

     haystack


       El string en el que se debe buscar.






     needle


       El string a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     offset


       Si se especifica, la búsqueda comenzará a partir de este
       número de caracteres contados desde el inicio del string.
       Si este número es negativo, la búsqueda comenzará utilizando
       este número de caracteres pero comenzando desde el final del string.





### Valores devueltos

Devuelve la posición numérica de la ocurrencia en relación
con el inicio del string haystack
(independientemente del offset).
Nótese también que la posición en el string comienza
en 0, y no en 1.

Devuelve **[false](#constant.false)** si la ocurrencia no ha sido encontrada.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle acepta ahora una cadena vacía.

      8.0.0

       Pasar un [int](#language.types.integer) como needle ya no está soportado.




      7.3.0

       Pasar un [int](#language.types.integer) como before_needle ha sido
       declarado obsoleto.




      7.1.0

       Se ha añadido soporte para números negativos en el parámetro offset.



### Ejemplos

    **Ejemplo #1 Con ===**

&lt;?php
$mystring = 'abc';
$findme = 'a';
$pos = strpos($mystring, $findme);

// Note nuestra utilización de ===. == no funcionaría como esperado
// ya que la posición de 'a' es el carácter 0 (primero).
if ($pos === false) {
    echo "El string '$findme' no se encuentra en el string '$mystring'";
} else {
    echo "El string '$findme' ha sido encontrado en el string '$mystring'";
echo " y comienza en la posición $pos";
}
?&gt;

    **Ejemplo #2 Con !==**

&lt;?php
$mystring = 'abc';
$findme = 'a';
$pos = strpos($mystring, $findme);

// Note nuestra utilización de !==. != no funcionaría como esperado
// ya que la posición de 'a' es el carácter 0 (primero).
if ($pos !== false) {
    echo "El string '$findme' ha sido encontrado en el string '$mystring'";
    echo " y comienza en la posición $pos";
} else {
    echo "El string '$findme' no se encuentra en el string '$mystring'";
}
?&gt;

    **Ejemplo #3 Utilizar un offset**

&lt;?php
// Podemos buscar el carácter, e ignorar todo lo que está antes del offset
$newstring = 'abcdef abcdef';
$pos = strpos($newstring, 'a', 1); // $pos = 7, no 0
echo $pos, PHP_EOL;
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [str_contains()](#function.str-contains) - Determina si una cadena contiene un substring dado

    - [str_ends_with()](#function.str-ends-with) - Determina si una cadena termina con un substring dado

    - [str_starts_with()](#function.str-starts-with) - Determina si un string comienza con un substring dado

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# strrchr

(PHP 4, PHP 5, PHP 7, PHP 8)

strrchr — Encuentra la última ocurrencia de un carácter en un string

### Descripción

**strrchr**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**
): [string](#language.types.string)|[false](#language.types.singleton)

Retorna el segmento del string
haystack que comienza con la
última ocurrencia de needle, hasta el final
del string haystack.

### Parámetros

     haystack


       El string en el que se debe buscar.






     needle


       Si needle contiene más de un carácter,
       solo se utilizará el primero. Este comportamiento es diferente al de
       [strchr()](#function.strchr).





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     before_needle


       Si **[true](#constant.true)**, **strrchr()**
       retorna la parte del haystack antes de la
       última ocurrencia de needle (excluyendo esta última).





### Valores devueltos

Retorna la porción del string, o **[false](#constant.false)** si
needle no es encontrado.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       El parámetro before_needle ha sido añadido.





8.0.0

needle acepta ahora una cadena vacía.

      8.0.0

       Pasar un [int](#language.types.integer) como needle ya no está soportado.




      7.3.0

       Pasar un [int](#language.types.integer) como before_needle ha sido
       declarado obsoleto.



### Ejemplos

    **Ejemplo #1 Ejemplo con strrchr()**

&lt;?php
$ext = strrchr('somefile.txt', '.');
echo "extensión de fichero: $ext \n";
$ext = $ext ? strtolower(substr($ext, 1)) : '';
echo "extensión de fichero: $ext";
?&gt;

    Resultado del ejemplo anterior es similar a:

extensión de fichero: .txt
extensión de fichero: txt

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

# strrev

(PHP 4, PHP 5, PHP 7, PHP 8)

strrev — Invierte un string

### Descripción

**strrev**([string](#language.types.string) $string): [string](#language.types.string)

devuelve el string, invertido.

### Parámetros

     string


       El [string](#language.types.string) que será invertido.





### Valores devueltos

Devuelve el [string](#language.types.string) invertido.

### Ejemplos

    **Ejemplo #1 Invertir un string con strrev()**

&lt;?php
echo strrev("Hola mundo!"); // Imprime "!odnum aloH"
?&gt;

# strripos

(PHP 5, PHP 7, PHP 8)

strripos — Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

### Descripción

**strripos**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [int](#language.types.integer) $offset = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Busca la posición numérica de la última ocurrencia de
needle en el string
haystack.

A diferencia de la función [strrpos()](#function.strrpos),
**strripos()** es insensible a mayúsculas y minúsculas.

### Parámetros

     haystack


       El string en el que se debe buscar.






     needle


       El string a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     offset


       Si es cero o positivo, la búsqueda se realiza de izquierda a derecha
       omitiendo los primeros offset bytes de
       haystack.




       Si es negativo, la búsqueda se realiza de derecha a izquierda
       omitiendo los últimos offset bytes de
       haystack y buscando la primera ocurrencia
       de needle.


**Nota**:

         Esto es efectivamente buscar la última ocurrencia de
         needle antes de los últimos
         offset bytes.







### Valores devueltos

Devuelve la posición donde existe needle en relación con el comienzo del
string haystack (independientemente de la dirección de búsqueda
o offset).

**Nota**:

     Las posiciones de los [string](#language.types.string) comienzan en 0, y no en 1.

Devuelve **[false](#constant.false)** si needle no ha sido encontrado.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.2.0

El case folding ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se realizará el case folding ASCII.
Los octetos no-ASCII serán comparados por su valor de octeto.

8.0.0

needle acepta ahora una cadena vacía.

      8.0.0

       Pasar un [int](#language.types.integer) como needle ya no está soportado.




      7.3.0

       Pasar un [int](#language.types.integer) como before_needle ha sido
       declarado obsoleto.



### Ejemplos

    **Ejemplo #1 Ejemplo con strripos()**

&lt;?php

$haystack = 'ababcd';
$needle = 'aB';

$pos      = strripos($haystack, $needle);

if ($pos === false) {
    echo "Lo sentimos, no se pudo encontrar `$needle`en`$haystack`";
} else {
    echo "¡Felicidades!\n";
    echo "Hemos encontrado el último `$needle`en`$haystack` en la posición `$pos`";
}

?&gt;

    El ejemplo anterior mostrará:

¡Felicidades!
Hemos encontrado el último `aB` en `ababcd` en la posición `2`

### Ver también

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [substr()](#function.substr) - Devuelve un segmento de string

# strrpos

(PHP 4, PHP 5, PHP 7, PHP 8)

strrpos — Busca la posición de la última ocurrencia de una subcadena en una cadena

### Descripción

**strrpos**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [int](#language.types.integer) $offset = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Busca la posición numérica de la última ocurrencia de
needle en la cadena haystack.

### Parámetros

     haystack


       La cadena en la que buscar.






     needle


       La cadena a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     offset


       Si es cero o positivo, la búsqueda se realiza de izquierda a derecha
       omitiendo los primeros offset bytes de
       haystack.




       Si es negativo, la búsqueda comienza a offset bytes de la derecha
       en lugar de desde el inicio de haystack.
       La búsqueda se realiza de derecha a izquierda, buscando la primera
       ocurrencia de needle desde el byte seleccionado.


**Nota**:

         Esto es efectivamente equivalente a buscar la última ocurrencia de
         needle en o antes de los últimos
         offset bytes.







### Valores devueltos

Devuelve la posición de la última ocurrencia de needle
en relación con el inicio de la cadena haystack
(independientemente de la dirección de búsqueda o del offset).

**Nota**:

     Las posiciones de los [string](#language.types.string) comienzan en 0, y no en 1.

Devuelve **[false](#constant.false)** si needle no ha sido encontrado.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle acepta ahora una cadena vacía.

      8.0.0

       Pasar un [int](#language.types.integer) como needle ya no está soportado.




      7.3.0

       Pasar un [int](#language.types.integer) como before_needle ha sido
       declarado obsoleto.



### Ejemplos

    **Ejemplo #1 Verifica si una ocurrencia es encontrada en una cadena**



     Es fácil cometer un error con respecto al valor devuelto
     entre "carácter encontrado en la posición 0" y "carácter no encontrado".
     A continuación se muestra cómo detectar esta diferencia:

&lt;?php
$mystring = 'Elephpant';

$pos = strrpos($mystring, "b");
if ($pos === false) { // nota: 3 signos "="
// no encontrado...
}

?&gt;

    **Ejemplo #2 Búsqueda con posiciones**

&lt;?php
$foo = "0123456789a123456789b123456789c";

// Buscar '0' desde el byte 0 (desde el inicio)
var_dump(strrpos($foo, '0', 0));

// Buscar '0' desde el primer byte (después del byte "0")
var_dump(strrpos($foo, '0', 1));

// Buscar '7' desde el byte 21 (después del byte 20)
var_dump(strrpos($foo, '7', 20));

// Buscar '7' desde el byte 29 (después del byte 28)
var_dump(strrpos($foo, '7', 28));

// Buscar '7' de derecha a izquierda desde el quinto byte desde el final
var_dump(strrpos($foo, '7', -5));

// Buscar 'c' de derecha a izquierda desde el segundo byte desde el final
var_dump(strrpos($foo, 'c', -2));

// Buscar '9c' de derecha a izquierda desde el segundo byte desde el final
var_dump(strrpos($foo, '9c', -2));
?&gt;

El ejemplo anterior mostrará:

int(0)
bool(false)
int(27)
bool(false)
int(17)
bool(false)
int(29)

### Ver también

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

# strspn

(PHP 4, PHP 5, PHP 7, PHP 8)

strspn —
Encuentra la longitud del segmento inicial de un string que contiene
todos los caracteres de una máscara dada

### Descripción

**strspn**(
    [string](#language.types.string) $string,
    [string](#language.types.string) $characters,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**
): [int](#language.types.integer)

Encuentra la longitud del segmento inicial de string
que contiene _únicamente_ los caracteres
desde la máscara characters.

Si los parámetros offset y length
son omitidos, entonces todo el string string será
analizado. Si son proporcionados, entonces los efectos serán idénticos a llamar
strspn(substr($string, $offset, $length), $characters)
(ver [substr](#function.substr) para más información).

El código siguiente:

&lt;?php
$var = strspn("42 es la respuesta, pero ¿cuál es la pregunta?", "1234567890");
?&gt;

asigna 2 a la variable $var,
ya que el string "42" es el segmento inicial del parámetro
string cuyos caracteres están contenidos en
"1234567890".

### Parámetros

     string


       El string a analizar.






     characters


       La lista de caracteres autorizados.






     offset


       La posición en el string string a
       partir de la cual se debe buscar.




       Si offset es proporcionado y no es negativo,
       entonces **strspn()** comenzará a analizar el string
       string en la posición offset.
       Por ejemplo, en el string 'abcdef', el carácter
       en la posición 0 es 'a', el carácter
       en la posición 2 es 'c', y así
       sucesivamente.




       Si offset es proporcionado y es negativo,
       entonces **strspn()** comenzará a analizar el string
       string en la posición offset
       desde el final del string string.






     length


       La longitud del string a analizar.




       Si length es proporcionado y no es negativo,
       entonces string será examinado sobre
       length caracteres después de la posición de inicio.




       Si length es proporcionado y es negativo,
       entonces string será examinado sobre
       length caracteres desde el final
       del string string.





### Valores devueltos

Retorna el tamaño del segmento inicial del string
string que está enteramente
constituido de caracteres contenidos en characters.

**Nota**:

    Cuando el parámetro offset está definido, la longitud
    retornada es contada a partir de esta posición, y no desde el inicio
    del parámetro string.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length es ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con strspn()**

&lt;?php
// El sujeto no comienza con uno de los caracteres desde la máscara
var_dump(strspn("foo", "o"));

// Examina 2 caracteres desde el inicio del sujeto, en la posición 1
var_dump(strspn("foo", "o", 1, 2));

// Examina un carácter desde el inicio del sujeto, en la posición 1
var_dump(strspn("foo", "o", 1, 1));
?&gt;

    El ejemplo anterior mostrará:

int(0)
int(2)
int(1)

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strcspn()](#function.strcspn) - Encuentra un segmento de string que no contiene ciertos caracteres

# strstr

(PHP 4, PHP 5, PHP 7, PHP 8)

strstr — Encuentra la primera ocurrencia en un string

### Descripción

**strstr**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una subcadena de haystack,
desde la primera ocurrencia de needle (incluida)
hasta el final del string.

**Nota**:

    **strstr()** es sensible a mayúsculas y minúsculas. Para una funcionalidad
    idéntica, pero insensible a mayúsculas y minúsculas, consulte
    [stristr()](#function.stristr).

**Nota**:

    Si el objetivo es únicamente determinar si un cierto valor de needle
    se encuentra en haystack, la función [str_contains()](#function.str-contains) que es más rápida
    y menos exigente en memoria debería ser utilizada en su lugar.

### Parámetros

     haystack


       El string de entrada.






     needle


       El string a buscar.





Anterior a PHP 8.0.0, si needle no es una cadena de caracteres,
se convierte en un entero y se aplica como valor ordinal de un carácter.
Este comportamiento está obsoleto a partir de PHP 7.3.0, y confiar en él
está fuertemente desaconsejado. Dependiendo del comportamiento esperado,
needle debe ser explícitamente convertido a una cadena de caracteres,
o debe realizarse una llamada explícita a [chr()](#function.chr).

     before_needle


       Si es **[true](#constant.true)**, **strstr()** devuelve
       la parte de haystack antes de la primera ocurrencia de
       needle (needle excluido).





### Valores devueltos

Devuelve la porción del string, o **[false](#constant.false)** si needle
no es encontrado.

### Historial de cambios

       Versión
       Descripción







8.0.0

needle acepta ahora una cadena vacía.

       8.0.0

        Pasar un [int](#language.types.integer) como needle ya no es soportado.




       7.3.0

        Pasar un [int](#language.types.integer) como before_needle ha sido
        declarado obsoleto.





### Ejemplos

    **Ejemplo #1 Ejemplo con strstr()**

&lt;?php
$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain, PHP_EOL; // Muestra: @example.com

$user = strstr($email, '@', true);
echo $user, PHP_EOL; // Muestra: name
?&gt;

### Ver también

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [strpbrk()](#function.strpbrk) - Busca un conjunto de caracteres en un string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

# strtok

(PHP 4, PHP 5, PHP 7, PHP 8)

strtok — Divide una cadena en segmentos

### Descripción

**strtok**([string](#language.types.string) $string, [string](#language.types.string) $token): [string](#language.types.string)|[false](#language.types.singleton)

Firma alternativa (no soportada con argumentos nombrados):

**strtok**([string](#language.types.string) $token): [string](#language.types.string)|[false](#language.types.singleton)

**strtok()** divide la cadena string
en segmentos, cada segmento está delimitado por token.
Por ejemplo, si se tiene una cadena como
"Este es un buen ejemplo", se pueden extraer
las diferentes palabras utilizando el espacio como token.

Tenga en cuenta que solo la primera llamada a **strtok()** utiliza
el argumento string.
Todas las llamadas posteriores a **strtok()** requieren únicamente
el token a utilizar, ya que sabe dónde se encuentra
en la cadena actual.
Para reiniciar o dividir una nueva cadena, simplemente se puede
llamar a **strtok()** con el parámetro string
nuevamente para inicializarlo. Cabe señalar que es posible incluir
varios tokens en el parámetro token.
La cadena string se dividirá tan pronto como se encuentre
uno de los caracteres del argumento token.

**Nota**:

    Esta función se comporta de manera ligeramente diferente a lo que se
    podría esperar al estar familiarizado con [explode()](#function.explode).
    En primer lugar, una secuencia de dos o más caracteres token
    contiguos en la cadena analizada se considera como un único
    delimitador.
    Además, un token situado al inicio o al final de la
    cadena es ignorado.
    Por ejemplo, si la cadena ";aaa;;bbb;" es utilizada,
    las llamadas sucesivas a **strtok()** con
    ";" como token devolverán
    las cadenas "aaa" y "bbb", y luego **[false](#constant.false)**.
    Por lo tanto, la cadena se dividirá simplemente en dos elementos, mientras que
    explode(";", $string) devolvería un array de 5 elementos.

### Parámetros

     string


       La cadena a dividir en varias cadenas de menor tamaño (tokens).






     token


       El delimitador utilizado para dividir string.





### Valores devueltos

Una [string](#language.types.string) dividida, o **[false](#constant.false)** si no hay más tokens disponibles.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Ahora emite un **[E_WARNING](#constant.e-warning)** cuando el token no es proporcionado.





### Ejemplos

    **Ejemplo #1 Ejemplo con strtok()**

&lt;?php
$string = "This is\tan example\nstring";
// Utilice también las nuevas líneas y las tabulaciones
// como separador de palabras
$tok = strtok($string, " \n\t");

while ($tok !== false) {
    echo "Word={$tok}\n";
$tok = strtok(" \n\t");
}
?&gt;

    **Ejemplo #2 Comportamiento de strtok()** al encontrar una parte vacía

&lt;?php
$first_token  = strtok('/something', '/');
$second_token = strtok('/');
var_dump($first_token, $second_token);
?&gt;

    El ejemplo anterior mostrará:

string(9) "something"
bool(false)

    **Ejemplo #3 La diferencia entre strtok()** y [explode()](#function.explode)

&lt;?php
$string = ";aaa;;bbb;";

$parts = [];
$tok = strtok($string, ";");
while ($tok !== false) {
$parts[] = $tok;
    $tok = strtok(";");
}
echo json_encode($parts),"\n";

$parts = explode(";", $string);
echo json_encode($parts),"\n";

    El ejemplo anterior mostrará:

["aaa","bbb"]
["","aaa","","bbb",""]

### Notas

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ver también

    - [explode()](#function.explode) - Divide una string en segmentos

# strtolower

(PHP 4, PHP 5, PHP 7, PHP 8)

strtolower — Devuelve una string en minúsculas

### Descripción

**strtolower**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve string, después de haber convertido todos los
caracteres alfabéticos ASCII a minúsculas.

Los octetos en el rango "A" (0x41) a "Z"
(0x5a) serán convertidos a su letra minúscula correspondiente sumando 32
a cada valor de octeto.

Esto puede ser utilizado para convertir caracteres ASCII en strings
codificadas con UTF-8, ya que los caracteres UTF-8 multioctetos serán ignorados.
Para convertir caracteres no ASCII multioctetos, utilice la función
[mb_strtolower()](#function.mb-strtolower).

### Parámetros

     string


       La string de entrada.





### Valores devueltos

Devuelve la string en minúsculas.

### Historial de cambios

      Versión
      Descripción







8.2.0

La conversión de la casilla ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se convertirán los caracteres ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo con strtolower()**

&lt;?php
$str = "Marie A un Petit Agneau, et l'aime TRès fORt.";
$str = strtolower($str);
echo $str; // marie a un petit agneau, et l'aime très fort.
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

    - [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

    - [ucwords()](#function.ucwords) - Pone en mayúscula la primera letra de todas las palabras

    - [mb_strtolower()](#function.mb-strtolower) - Convierte todos los caracteres a minúsculas

# strtoupper

(PHP 4, PHP 5, PHP 7, PHP 8)

strtoupper — Devuelve una string en mayúsculas

### Descripción

**strtoupper**([string](#language.types.string) $string): [string](#language.types.string)

**strtoupper()** devuelve string,
después de haber convertido todos los caracteres alfabéticos a mayúsculas.

Los bytes en el rango "a" (0x61) a "z"
(0x7a) serán convertidos a su letra mayúscula correspondiente restando
32 a cada valor de byte.

Esto puede ser utilizado para convertir caracteres ASCII en strings codificadas
con UTF-8, ya que los caracteres UTF-8 multibyte serán ignorados. Para convertir
caracteres no ASCII multibyte, utilice la función [mb_strtoupper()](#function.mb-strtoupper).

### Parámetros

     string


       La string de entrada.





### Valores devueltos

Devuelve la string en mayúsculas.

### Historial de cambios

      Versión
      Descripción







8.2.0

La conversión de la casilla ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se convertirán los caracteres ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo con strtoupper()**

&lt;?php
$str = "Marie A un Petit Agneau, et l'aime fORt.";
$str = strtoupper($str);
echo $str; // MARIE A UN PETIT AGNEAU, ET L'AIME FORT.

// Nota: Très habría sido convertido en TRÈS
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

    - [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

    - [ucwords()](#function.ucwords) - Pone en mayúscula la primera letra de todas las palabras

    - [mb_strtoupper()](#function.mb-strtoupper) - Convierte todos los caracteres a mayúsculas

# strtr

(PHP 4, PHP 5, PHP 7, PHP 8)

strtr — Reemplaza caracteres en un string

### Descripción

**strtr**([string](#language.types.string) $string, [string](#language.types.string) $from, [string](#language.types.string) $to): [string](#language.types.string)

Firma alternativa (no soportada con argumentos nombrados):

**strtr**([string](#language.types.string) $string, [array](#language.types.array) $replace_pairs): [string](#language.types.string)

Si se utilizan tres argumentos, **strtr()** devuelve el string
string después de haber reemplazado cada carácter (de un octeto)
del parámetro from por su equivalente en el parámetro
to, cada ocurrencia de $from[$n] es
reemplazada por $to[$n], donde $n es un valor
válido para cada argumento.

Si from y to son de
tamaños diferentes, los caracteres adicionales en uno u otro
serán ignorados. El tamaño de string será el mismo que el de
los valores devueltos.

Si solo se utilizan dos argumentos, el segundo debe ser un [array](#language.types.array)
de la forma array('from' =&gt; 'to', ...). El dato devuelto es
un [string](#language.types.string) en el que todas las ocurrencias de las claves del array han
sido reemplazadas por los valores correspondientes. Las claves más largas serán utilizadas primero.
Una vez que una subcadena es reemplazada, su nuevo valor no será buscado nuevamente.

En este caso, las claves y los valores pueden tener cualquier tamaño, asumiendo
que no hay una clave vacía; así, el tamaño del valor devuelto puede diferir del de
string. Sin embargo, esta función será más eficiente cuando todas
las claves tengan el mismo tamaño.

### Parámetros

     string


       El string a procesar.






     from


       Los caracteres de origen.






     to


       Los caracteres de reemplazo.






     replace_pairs


       El parámetro replace_pairs puede ser utilizado
       en lugar de to y from
       y en este caso, será un array en la forma
       array('from' =&gt; 'to', ...).




       Si replace_pairs contiene una clave que es un
       [string](#language.types.string) vacío (""), el elemento es ignorado;
       a partir de PHP 8.0.0 se genera una **[E_WARNING](#constant.e-warning)** en este caso.





### Valores devueltos

Devuelve el string modificado.

### Ejemplos

    **Ejemplo #1 Ejemplo con strtr()**

&lt;?php
$addr = "The river å";

// Aquí, strtr() reemplaza octeto por octeto, por lo tanto
// se asume aquí codificaciones de un solo octeto:
$addr = strtr($addr, "äåö", "aao");
echo $addr, PHP_EOL;
?&gt;

El siguiente ejemplo muestra el uso de **strtr()** con
dos argumentos. Observe la preferencia de los reemplazos (h no
es utilizado porque hay coincidencias más largas) y cómo el texto
reemplazado no es reutilizado posteriormente.

**Ejemplo #2 Ejemplo con strtr()** y 2 argumentos

&lt;?php
$trans = array("h" =&gt; "-", "hello" =&gt; "hi", "hi" =&gt; "hello");
echo strtr("hi all, I said hello", $trans);
?&gt;

    El ejemplo anterior mostrará:

hello all, I said hi

Los dos comportamientos son diferentes. Con tres argumentos,
**strtr()** reemplazará los octetos; con dos, puede
reemplazar subcadenas más largas.

**Ejemplo #3 Comparación de comportamiento de strtr()**

&lt;?php
echo strtr("baab", "ab", "01"),"\n";

$trans = array("ab" =&gt; "01");
echo strtr("baab", $trans);
?&gt;

    El ejemplo anterior mostrará:

1001
ba01

### Ver también

    - [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

    - [preg_replace()](#function.preg-replace) - Buscar y reemplazar mediante expresión regular estándar

# substr

(PHP 4, PHP 5, PHP 7, PHP 8)

substr — Devuelve un segmento de string

### Descripción

**substr**([string](#language.types.string) $string, [int](#language.types.integer) $offset, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [string](#language.types.string)

Devuelve el segmento de string definido por
offset y length.

### Parámetros

     string


       El string de entrada.






     offset


       Si offset es positivo, el string
       devuelto comenzará en el carácter número offset,
       en el string string. El primer carácter
       está numerado cero. En efecto, en el string 'abcdef',
       el carácter en la posición 0 es 'a',
       el carácter en la posición 2 es 'c',
       y así sucesivamente.




       Si offset es negativo, el string devuelto
       comenzará en el carácter número offset contando
       desde el final del string string.




       Si string es más pequeño que
       offset caracteres de largo, se devolverá un string vacío.







        **Ejemplo #1 Ejemplo con offset negativo**




&lt;?php
$rest = substr("abcdef", -1), PHP_EOL;    // devuelve "f"
$rest = substr("abcdef", -2), PHP_EOL; // devuelve "ef"
$rest = substr("abcdef", -3, 1), PHP_EOL; // devuelve "d"
?&gt;

     length


       Si length es proporcionado y es positivo,
       el string devuelto contendrá como máximo length
       caracteres, comenzando desde el carácter
       offset (dependiendo del tamaño del string
       string).




       Si se proporciona length y es negativo, se omitirá esa cantidad
       de caracteres al final de string.
       Si offset representa una posición de este truncamiento o
       fuera del string, se devolverá una cadena vacía.




       Si el parámetro length es proporcionado
       y vale 0, se devolverá un string vacío.




       Si length es omitido o **[null](#constant.null)**, el substring comenzando
       desde offset hasta el final será devuelto.




       **Ejemplo #2 Uso de un valor negativo para length**




&lt;?php
$rest = substr("abcdef", 0, -1), PHP_EOL;  // devuelve "abcde"
$rest = substr("abcdef", 2, -1), PHP_EOL; // devuelve "cde"
$rest = substr("abcdef", 4, -4), PHP_EOL;  // devuelve ""; anterior a PHP 8.0.0, false era devuelto
$rest = substr("abcdef", -3, -1), PHP_EOL; // devuelve "de"
?&gt;

### Valores devueltos

Devuelve la parte extraída del string string,
o un string vacío.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length es ahora nullable.
       Cuando length es explícitamente definido como **[null](#constant.null)**,
       la función devuelve un substring terminando al final del string,
       mientras que anteriormente devolvía un string vacío.




      8.0.0

       Esta función devuelve un string vacío donde anteriormente devolvía **[false](#constant.false)**



### Ejemplos

    **Ejemplo #3 Ejemplo con substr()**

&lt;?php
echo substr('abcdef', 1), PHP_EOL; // bcdef
echo substr("abcdef", 1, null), PHP_EOL; // bcdef; anterior a PHP 8.0.0, un string vacío era devuelto
echo substr('abcdef', 1, 3), PHP_EOL; // bcd
echo substr('abcdef', 0, 4), PHP_EOL; // abcd
echo substr('abcdef', 0, 8), PHP_EOL; // abcdef
echo substr('abcdef', -1, 1), PHP_EOL; // f

// Acceder a un simple carácter en un string
// también puede ser realizado usando corchetes
$string = 'abcdef';
echo $string[0], PHP_EOL;                 // a
echo $string[3], PHP_EOL;                 // d
echo $string[strlen($string)-1], PHP_EOL; // f

?&gt;

    **Ejemplo #4 Comportamiento del cast con substr()**

&lt;?php
class apple {
public function \_\_toString() {
return "green";
}
}

echo "1) ", var_export(substr("pear", 0, 2), true), PHP_EOL;
echo "2) ", var_export(substr(54321, 0, 2), true), PHP_EOL;
echo "3) ", var_export(substr(new apple(), 0, 2), true), PHP_EOL;
echo "4) ", var_export(substr(true, 0, 1), true), PHP_EOL;
echo "5) ", var_export(substr(false, 0, 1), true), PHP_EOL;
echo "6) ", var_export(substr("", 0, 1), true), PHP_EOL;
echo "7) ", var_export(substr(1.2e3, 0, 4), true), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

1. 'pe'
2. '54'
3. 'gr'
4. '1'
5. ''
6. ''
7. '1200'

    **Ejemplo #5 Intervalo de caracteres inválido**

    Si un intervalo de caracteres inválido es solicitado,
    **substr()** devuelve un string vacío a partir de PHP 8.0.0;
    anteriormente **[false](#constant.false)** era devuelto en su lugar.

&lt;?php
var_dump(substr('a', 2));
?&gt;

Resultado del ejemplo anterior en PHP 8:

string(0) ""

Resultado del ejemplo anterior en PHP 7:

bool(false)

### Ver también

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [substr_replace()](#function.substr-replace) - Reemplaza un segmento en un string

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [trim()](#function.trim) - Elimina los espacios (u otros caracteres) al inicio y al final de un string

    - [mb_substr()](#function.mb-substr) - Extrae una subcadena

    - [wordwrap()](#function.wordwrap) - Realiza el ajuste de línea de un string

    - [Acceso y modificación de un string, por carácter](#language.types.string.substr)

# substr_compare

(PHP 5, PHP 7, PHP 8)

substr_compare — Comparar dos strings desde un offset hasta una longitud en caracteres

### Descripción

**substr_compare**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [bool](#language.types.boolean) $case_insensitive = **[false](#constant.false)**
): [int](#language.types.integer)

**substr_compare()** compara haystack
desde la posición offset con needle
durante length caracteres.

### Parámetros

     haystack


       El string principal a comparar.






     needle


       El string secundario a comparar.






     offset


       La posición de inicio para la comparación. Si es un valor negativo,
       se comienza a contar desde el final del string.






     length


       La longitud de la comparación. El valor por omisión es el máximo
       entre la longitud de needle
       y la longitud de haystack menos el parámetro
       offset.






     case_insensitive


       Si case_insensitive vale **[true](#constant.true)**, la comparación
       no distingue entre mayúsculas y minúsculas.





### Valores devueltos

Devuelve un valor inferior a 0 si string1
es inferior a string2; un valor superior
a 0 si string1 es superior a
string2, y 0 si son
iguales.
No se puede deducir ningún significado particular de este valor,
excepto su signo.

Si length es igual (anterior a PHP 7.2.18, 7.3.5) o
mayor que el tamaño de haystack o que
length está definido y es inferior a 0,
**substr_compare()** muestra una alerta y retorna **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

Esta función ya no garantiza retornar
strlen($string1) - strlen($string2) cuando las longitudes
de las strings no son iguales, y puede retornar
-1 o 1 en su lugar.

       8.0.0

        length ahora es nullable.




       7.2.18, 7.3.5

        offset ahora puede ser igual al tamaño de haystack.





### Ejemplos

    **Ejemplo #1 Ejemplo con substr_compare()**

&lt;?php
echo substr_compare("abcde", "bc", 1, 2), PHP_EOL; // 0
echo substr_compare("abcde", "de", -2, 2), PHP_EOL; // 0
echo substr_compare("abcde", "bcg", 1, 2), PHP_EOL; // 0
echo substr_compare("abcde", "BC", 1, 2, true), PHP_EOL; // 0
echo substr_compare("abcde", "bc", 1, 3), PHP_EOL; // 1
echo substr_compare("abcde", "cd", 1, 2), PHP_EOL; // -1
echo substr_compare("abcde", "abc", 5, 1), PHP_EOL; // -1
?&gt;

### Ver también

    - [strncmp()](#function.strncmp) - Comparación binaria de los n primeros caracteres

# substr_count

(PHP 4, PHP 5, PHP 7, PHP 8)

substr_count — Cuenta el número de ocurrencias de segmentos en un string

### Descripción

**substr_count**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**
): [int](#language.types.integer)

**substr_count()** devuelve el número de ocurrencias
de needle en el string
haystack. Tenga en cuenta que needle
es sensible a mayúsculas y minúsculas.

**Nota**:

    Esta función no cuenta los strings que se solapan.
    Véase el ejemplo a continuación.

### Parámetros

     haystack


       El string en el que se busca






     needle


       El string que se busca






     offset


       El desplazamiento desde donde se comienza a contar. Si la posición es negativa,
       el conteo comienza desde el final del string.






     length


       La longitud máxima después del desplazamiento especificado para buscar el
       string. La función emite un error si el desplazamiento más la longitud es
       mayor que la longitud de haystack.
       Una longitud negativa hará que el conteo comience al final de
       haystack.





### Valores devueltos

Esta función devuelve un [int](#language.types.integer).

### Historial de cambios

       Versión
       Descripción






      8.0.0

       length ahora puede ser nullable.




       7.1.0

        Se agregó soporte para números negativos para offset
        y length.
        length también puede ser 0 ahora.





### Ejemplos

    **Ejemplo #1 Ejemplo con substr_count()**

&lt;?php
$text = 'Esto es una prueba';
echo strlen($text), PHP_EOL; // 16

echo substr_count($text, 'es'), PHP_EOL; // 2

// el string se reduce a 'st una prueba', por lo que muestra 1
echo substr_count($text, 'es', 6), PHP_EOL;

// el texto se reduce a 'st u', por lo que muestra 0
echo substr_count($text, 'is', 3, 3), PHP_EOL;

// muestra solo 1, porque no cuenta los strings
// que se solapan
$text2 = 'gcdgcdgcd';
echo substr_count($text2, 'gcdgcd'), PHP_EOL;

// lanza una excepción porque 5+10 &gt; 14
echo substr_count($text, 'is', 5, 10), PHP_EOL;
?&gt;

### Ver también

    - [count_chars()](#function.count-chars) - Devuelve estadísticas sobre los caracteres utilizados en un string

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

# substr_replace

(PHP 4, PHP 5, PHP 7, PHP 8)

substr_replace — Reemplaza un segmento en un string

### Descripción

**substr_replace**(
    [array](#language.types.array)|[string](#language.types.string) $string,
    [array](#language.types.array)|[string](#language.types.string) $replace,
    [array](#language.types.array)|[int](#language.types.integer) $offset,
    [array](#language.types.array)|[int](#language.types.integer)|[null](#language.types.null) $length = **[null](#constant.null)**
): [string](#language.types.string)|[array](#language.types.array)

**substr_replace()** reemplaza un segmento del string
string por el string replace.
El segmento está delimitado por offset y eventualmente
por length.

### Parámetros

     string


       El string de entrada.




       Puede proporcionarse un array de strings, y en este caso,
       los reemplazos se realizarán en cada uno de los strings. En esta situación,
       los parámetros replace, offset
       y length deben proporcionarse ya sea como valores escalares
       a aplicar a cada string, o como arrays donde el elemento
       correspondiente del array será utilizado para cada string de entrada.






     replace


       El string de reemplazo.






     offset


       Si offset no es negativo, el reemplazo
       se realizará a partir del carácter número offset
       en string.




       Si offset es negativo, el reemplazo
       se realizará a partir del offset-ésimo carácter
       contando desde el final del string string.






     length


       Si length es proporcionado y positivo, representará
       la longitud del segmento de código reemplazado en el
       string string. Si es negativo, representará
       el número de caracteres desde el final del string
       string donde detener el reemplazo. Si es omitido,
       tomará el valor por omisión del tamaño
       del string, y reemplazará todo hasta el final del string
       string. Por supuesto, si
       length vale 0, entonces, esta función
       tendrá como efecto insertar replace en
       string en la posición
       offset dada.





### Valores devueltos

El string resultante es retornado. Si el parámetro
string es un array, entonces un
array será retornado.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        length ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con substr_replace()**

&lt;?php
$var = 'ABCDEFGH:/MNRPQR/';
echo "Original : $var&lt;hr /&gt;\n";

// Reemplaza todo el string $var por 'bob'.
echo substr_replace($var, 'bob', 0) . "&lt;br /&gt;\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "&lt;br /&gt;\n";

// Inserta 'bob' al inicio del string
echo substr_replace($var, 'bob', 0, 0) . "&lt;br /&gt;\n";

// Reemplaza la secuencia 'MNRPQR' por 'bob'.
echo substr_replace($var, 'bob', 10, -1) . "&lt;br /&gt;\n";
echo substr_replace($var, 'bob', -7, -1) . "&lt;br /&gt;\n";

// Borra la secuencia 'MNRPQR' de $var.
echo substr_replace($var, '', 10, -1) . "&lt;br /&gt;\n";
?&gt;

    **Ejemplo #2
     Uso de substr_replace()** para reemplazar múltiples
     strings de una sola vez

&lt;?php
$input = array('A: XXX', 'B: XXX', 'C: XXX');

// Un caso simple: reemplazar XXX en cada string por YYY.
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n";

// Un caso más complejo donde cada reemplazo es diferente.
$replace = array('AAA', 'BBB', 'CCC');
echo implode('; ', substr_replace($input, $replace, 3, 3))."\n";

// Reemplaza un número diferente de caracteres cada vez.
$length = array(1, 2, 3);
echo implode('; ', substr_replace($input, $replace, 3, $length))."\n";
?&gt;

    El ejemplo anterior mostrará:

A: YYY; B: YYY; C: YYY
A: AAA; B: BBB; C: CCC
A: AAAXX; B: BBBX; C: CCC

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [Acceso y modificación de un string, por carácter](#language.types.string.substr)

# trim

(PHP 4, PHP 5, PHP 7, PHP 8)

trim —
Elimina los espacios (u otros caracteres) al inicio y al final de un string

### Descripción

**trim**([string](#language.types.string) $string, [string](#language.types.string) $characters = " \n\r\t\v\x00"): [string](#language.types.string)

**trim()** retorna el string string, después
de haber eliminado los caracteres invisibles al inicio y al final del string.
Si el segundo parámetro characters es omitido,
**trim()** eliminará los siguientes caracteres:

-

" ": carácter SP en ASCII
0x20, un espacio ordinario.

-

"\t": carácter HT en ASCII
0x09, una tabulación.

-

"\n": carácter LF en ASCII
0x0A, un salto de línea (line feed).

-

"\r": carácter CR en ASCII
0x0D, un retorno de carro.

-

"\0": carácter NUL en ASCII
0x00, el octeto NUL.

-

"\v": carácter VT en ASCII
0x0B, una tabulación vertical.

### Parámetros

    string


      El [string](#language.types.string) que será recortado.






    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres que deben ser eliminados.
Con .., es posible especificar un rango creciente de caracteres.

### Valores devueltos

El string recortado.

### Ejemplos

    **Ejemplo #1 Ejemplo con trim()**




&lt;?php

$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = trim($text);
var_dump($trimmed);

$trimmed = trim($text, " \t.");
var_dump($trimmed);

$trimmed = trim($hello, "Hdle");
var_dump($trimmed);

$trimmed = trim($hello, 'HdWr');
var_dump($trimmed);

// Elimina los caracteres de control ASCII al inicio y al final de $binary
// (de 0 a 31 inclusive)
$clean = trim($binary, "\x00..\x1F");
var_dump($clean);

?&gt;

    El ejemplo anterior mostrará:

string(32) " These are a few words :) ... "
string(16) " Example string
"
string(11) "Hello World"

string(28) "These are a few words :) ..."
string(24) "These are a few words :)"
string(5) "o Wor"
string(9) "ello Worl"
string(14) "Example string"

    **Ejemplo #2 Eliminación de caracteres en un array con trim()**

&lt;?php
function trim_value(&amp;$value)
{
    $value = trim($value);
}

$fruit = array('apple','banana ', ' cranberry ');
var_dump($fruit);

array_walk($fruit, 'trim_value');
var_dump($fruit);

?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(5) "apple"
[1]=&gt;
string(7) "banana "
[2]=&gt;
string(11) " cranberry "
}
array(3) {
[0]=&gt;
string(5) "apple"
[1]=&gt;
string(6) "banana"
[2]=&gt;
string(9) "cranberry"
}

### Notas

**Nota**:
**Posible uso: eliminación de caracteres en medio del string**

    Debido a que la función **trim()** elimina caracteres al inicio y al final del string,
    puede resultar confuso cuando los caracteres son (o no) eliminados desde el medio.
    trim('abc', 'bad') elimina tanto 'a' como 'b' porque la función elimina 'a',
    luego, mueve 'b' al inicio del string, que también será eliminado. Asimismo, es la razón por la cual
    la función "funciona" mientras que trim('abc', 'b') no funciona.

### Ver también

- [ltrim()](#function.ltrim) - Elimina los espacios (u otros caracteres) del inicio de un string

- [rtrim()](#function.rtrim) - Elimina los espacios (u otros caracteres) al final de un string

- [str_replace()](#function.str-replace) - Reemplaza todas las ocurrencias en una string

# ucfirst

(PHP 4, PHP 5, PHP 7, PHP 8)

ucfirst — Pone en mayúscula el primer carácter

### Descripción

**ucfirst**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve una cadena con el primer carácter de string
en mayúscula, si este carácter es un carácter ASCII en el rango de
"a" (0x61) a "z" (0x7a).

### Parámetros

     string


       La cadena de entrada.





### Valores devueltos

Devuelve la cadena después de la modificación.

### Historial de cambios

      Versión
      Descripción







8.2.0

La conversión de la casilla ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se convertirán los caracteres ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo con ucfirst()**

&lt;?php
$foo = 'bonjour tout le monde!';
echo ucfirst($foo), PHP_EOL; // Bonjour tout le monde!

$bar = 'BONJOUR TOUT LE MONDE!';
$bar = ucfirst($bar), PHP_EOL;             // BONJOUR TOUT LE MONDE!
$bar = ucfirst(strtolower($bar)), PHP_EOL; // Bonjour tout le monde!
?&gt;

### Ver también

    - [lcfirst()](#function.lcfirst) - Pone el primer carácter en minúscula

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

    - [ucwords()](#function.ucwords) - Pone en mayúscula la primera letra de todas las palabras

    - [mb_convert_case()](#function.mb-convert-case) - Realiza una conversión a mayúsculas/minúsculas de un string

# ucwords

(PHP 4, PHP 5, PHP 7, PHP 8)

ucwords — Pone en mayúscula la primera letra de todas las palabras

### Descripción

**ucwords**([string](#language.types.string) $string, [string](#language.types.string) $separators = " \t\r\n\f\v"): [string](#language.types.string)

Devuelve la cadena string después de poner en
mayúscula la primera letra de todas las palabras, si este carácter es
un carácter ASCII entre "a" (0x61) y
"z" (0x7a).

En el contexto de esta función, una palabra es cualquier secuencia de caracteres
que no están listados en el parámetro separators.
Por omisión, estos son: un espacio, un salto de línea, una nueva línea,
un retorno de carro, un salto de página, una tabulación horizontal y una tabulación vertical.

Para realizar una conversión similar en cadenas multiocteto, utilice
[mb_convert_case()](#function.mb-convert-case) con el modo
**[MB_CASE_TITLE](#constant.mb-case-title)**.

### Parámetros

     string


       La cadena de entrada.






     separators


       El parámetro opcional separators contiene el carácter
       de separación.





### Valores devueltos

Devuelve la cadena, después de la modificación.

### Historial de cambios

      Versión
      Descripción







8.2.0

La conversión de la casilla ya no depende de la configuración local definida con
[setlocale()](#function.setlocale). Solo se convertirán los caracteres ASCII.

### Ejemplos

    **Ejemplo #1 Ejemplo con ucwords()**

&lt;?php
$foo = 'bonjour tout le monde!';
echo ucwords($foo), PHP_EOL; // Bonjour Tout Le Monde!

$bar = 'BONJOUR TOUT LE MONDE!';
echo ucwords($bar), PHP_EOL; // BONJOUR TOUT LE MONDE!
echo ucwords(strtolower($bar)), PHP_EOL; // Bonjour Tout Le Monde!
?&gt;

    **Ejemplo #2 Ejemplo con ucwords()** y un separador personalizado

&lt;?php
$foo = 'hello|world!';
echo ucwords($foo), PHP_EOL; // Hello|world!

echo ucwords($foo, "|"), PHP_EOL; // Hello|World!
?&gt;

    **Ejemplo #3 Ejemplo de ucwords()** con separadores adicionales



     &lt;?php

$foo = "mike o'hara";
echo ucwords($foo), PHP_EOL; // Mike O'hara

echo ucwords($foo, " \t\r\n\f\v'"), PHP_EOL; // Mike O'Hara
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

    - [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

    - [mb_convert_case()](#function.mb-convert-case) - Realiza una conversión a mayúsculas/minúsculas de un string

# utf8_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

utf8_decode —
Convierte una string UTF-8 a ISO-8859-1, reemplazando los caracteres no válidos o no representables.

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.2.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**utf8_decode**([string](#language.types.string) $string): [string](#language.types.string)

**utf8_decode()** decodifica la string
string, asumiendo que está en formato
UTF-8, y la convierte al formato
ISO-8859-1. Los bytes en la string que no son
válidos en UTF-8 y los caracteres UTF-8
que no existen en ISO-8859-1 (que son, los caracteres
por encima de U+00FF) son reemplazados por ?.

**Nota**:

    Numerosas páginas web marcadas como utilizando la codificación de caracteres
    ISO-8859-1 utilizan efectivamente una codificación similar
    a Windows-1252, y los navegadores web interpretarán
    las páginas web ISO-8859-1 como
    Windows-1252. Las características adicionales
    de Windows-1252 son caracteres imprimibles,
    tales como el signo euro (€) y las comillas curvas
    (“ ”), en lugar de ciertos
    caracteres de control de ISO-8859-1. Esta función
    no convertirá correctamente estos caracteres Windows-1252.
    Utilice una función diferente si se requiere una conversión
    Windows-1252.

### Parámetros

     string


       La string codificada en UTF-8.





### Valores devueltos

Devuelve la string string convertida a ISO-8859-1.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Esta función ha sido declarada obsoleta.




       7.2.0

        Esta función fue movida al núcleo de PHP; anteriormente, era
        necesario instalar la extensión XML para utilizarla.





### Ejemplos

**Ejemplo #1 Ejemplo de uso**

&lt;?php
// Convierte la string 'Zoë' de UTF-8 a ISO 8859-1
$utf8_string = "\x5A\x6F\xC3\xAB";
$iso8859_1_string = utf8_decode($utf8_string);
echo bin2hex($iso8859_1_string), "\n";

// Las secuencias UTF-8 no válidas son reemplazadas por '?'
$invalid_utf8_string = "\xC3";
$iso8859_1_string = utf8_decode($invalid_utf8_string);
var_dump($iso8859_1_string);

// Los caracteres que no existen en la norma ISO 8859-1,
// tales como '€' (signo del euro) son igualmente reemplazados por '?'
$utf8_string = "\xE2\x82\xAC";
$iso8859_1_string = utf8_decode($utf8_string);
var_dump($iso8859_1_string);
?&gt;

El ejemplo anterior mostrará:

5a6feb
string(1) "?"
string(1) "?"

### Notas

**Nota**:
**Obsolescencia y alternativas**

      Esta función está *obsoleta* a partir de PHP 8.2.0
      y será eliminada en una versión futura. Los usos existentes deberían ser verificados
      y reemplazados por alternativas apropiadas.




      Una funcionalidad similar puede obtenerse con [mb_convert_encoding()](#function.mb-convert-encoding),
      que soporta ISO-8859-1 y numerosos otros juegos de caracteres.





&lt;?php
$utf8_string = "\xC3\xAB"; // 'ë' (e con diéresis) en UTF-8
$iso8859_1_string = mb_convert_encoding($utf8_string, 'ISO-8859-1', 'UTF-8');
echo bin2hex($iso8859_1_string), "\n";

$utf8_string = "\xCE\xBB"; // 'λ' (lambda minúscula griega) en UTF-8
$iso8859_7_string = mb_convert_encoding($utf8_string, 'ISO-8859-7', 'UTF-8');
echo bin2hex($iso8859_7_string), "\n";

$utf8_string = "\xE2\x82\xAC"; // '€' (signo del euro) en UTF-8 (no presente en ISO-8859-1)
$windows_1252_string = mb_convert_encoding($utf8_string, 'Windows-1252', 'UTF-8');
echo bin2hex($windows_1252_string), "\n";
?&gt;

        El ejemplo anterior mostrará:




eb
eb
80

      Otras opciones pueden estar disponibles dependiendo de las extensiones instaladas,
      tales como [UConverter::transcode()](#uconverter.transcode) y [iconv()](#function.iconv).




      Los siguientes ejemplos producen todos el mismo resultado:





&lt;?php
$utf8_string = "\x5A\x6F\xC3\xAB"; // 'Zoë' en UTF-8
$iso8859_1_string = utf8_decode($utf8_string);
echo bin2hex($iso8859_1_string), "\n";

$iso8859_1_string = mb_convert_encoding($utf8_string, 'ISO-8859-1', 'UTF-8');
echo bin2hex($iso8859_1_string), "\n";

$iso8859_1_string = iconv('UTF-8', 'ISO-8859-1', $utf8_string);
echo bin2hex($iso8859_1_string), "\n";

$iso8859_1_string = UConverter::transcode($utf8_string, 'ISO-8859-1', 'UTF8');
echo bin2hex($iso8859_1_string), "\n";
?&gt;

        El ejemplo anterior mostrará:




5a6feb
5a6feb
5a6feb
5a6feb

      Al especificar '?' como opción 'to_subst' para [UConverter::transcode()](#uconverter.transcode),
      se obtiene el mismo resultado que **utf8_decode()** para las strings que son inválidas o que no pueden ser representadas en ISO 8859-1.



&lt;?php
$utf8_string = "\xE2\x82\xAC"; // € (signo del euro) no existe en ISO 8859-1
$iso8859_1_string = UConverter::transcode(
$utf8_string, 'ISO-8859-1', 'UTF-8', ['to_subst' =&gt; '?']
);
var_dump($iso8859_1_string);
?&gt;

        El ejemplo anterior mostrará:




string(1) "?"

### Ver también

    - [utf8_encode()](#function.utf8-encode) - Convierte una cadena ISO-8859-1 a UTF-8

    - [mb_convert_encoding()](#function.mb-convert-encoding) - Convertir una cadena de un codificación de caracteres a otra

    - [UConverter::transcode()](#uconverter.transcode) - Convierte una cadena de un juego de caracteres a otro

    - [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

# utf8_encode

(PHP 4, PHP 5, PHP 7, PHP 8)

utf8_encode — Convierte una cadena ISO-8859-1 a UTF-8

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.2.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**utf8_encode**([string](#language.types.string) $string): [string](#language.types.string)

Esta función convierte la cadena string desde
la codificación ISO-8859-1 a UTF-8.

**Nota**:

    Esta función no intenta adivinar la codificación actual de la cadena de caracteres
    proporcionada, asume que está codificada en ISO-8859-1 (también conocido como
    "Latin 1") y la convierte a UTF-8. Dado que cada secuencia de bytes es una cadena
    de caracteres ISO-8859-1 válida, nunca habrá errores, pero no resultará
    en una cadena de caracteres útil si se esperaba una codificación diferente.




    Muchas páginas web marcadas como que utilizan la codificación de caracteres
    ISO-8859-1 utilizan efectivamente una codificación similar
    a Windows-1252, y los navegadores web interpretarán
    las páginas web ISO-8859-1 como
    Windows-1252. Las características adicionales
    de Windows-1252 son caracteres imprimibles,
    tales como el signo euro (€) y las comillas curvas
    (“ ”), en lugar de algunos
    caracteres de control de ISO-8859-1. Esta función
    no convertirá estos caracteres Windows-1252
    correctamente. Utilice una función diferente si se necesita una conversión
    Windows-1252.

### Parámetros

     string


       Una cadena ISO-8859-1.





### Valores devueltos

Devuelve la versión UTF-8 de string.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Esta función ha sido declarada obsoleta.




       7.2.0

        Esta función fue movida al núcleo de PHP,
        anteriormente, era necesario instalar la extensión XML
        para utilizarla.





### Ejemplos

**Ejemplo #1 Ejemplo de uso**

&lt;?php
// Convierte la cadena 'Zoë' de ISO 8859-1 a UTF-8
$iso8859_1_string = "\x5A\x6F\xEB";
$utf8_string = utf8_encode($iso8859_1_string);
echo bin2hex($utf8_string), "\n";
?&gt;

El ejemplo anterior mostrará:

5a6fc3ab

### Notas

**Nota**:
**Obsolescencia y alternativas**

      Esta función está *obsoleta* a partir de PHP 8.2.0
      y será eliminada en una versión futura. Los usos existentes deberían ser verificados
      y reemplazados por alternativas apropiadas.




      Una funcionalidad similar puede ser obtenida con [mb_convert_encoding()](#function.mb-convert-encoding),
      que soporta ISO-8859-1 y muchos otros juegos de caracteres.





&lt;?php
$iso8859_1_string = "\xEB"; // 'ë' (e con diéresis) en ISO-8859-1
$utf8_string = mb_convert_encoding($iso8859_1_string, 'UTF-8', 'ISO-8859-1');
echo bin2hex($utf8_string), "\n";

$iso8859_7_string = "\xEB"; // la misma cadena en ISO-8859-7 representa 'λ' (lambda minúscula griega)
$utf8_string = mb_convert_encoding($iso8859_7_string, 'UTF-8', 'ISO-8859-7');
echo bin2hex($utf8_string), "\n";

$windows_1252_string = "\x80"; // '€' (signo euro) en Windows-1252, pero no en ISO-8859-1
$utf8_string = mb_convert_encoding($windows_1252_string, 'UTF-8', 'Windows-1252');
echo bin2hex($utf8_string), "\n";
?&gt;

        El ejemplo anterior mostrará:




c3ab
cebb
e282ac

      Otras opciones pueden estar disponibles dependiendo de las extensiones instaladas,
      tales como [UConverter::transcode()](#uconverter.transcode) y [iconv()](#function.iconv).




      Los siguientes ejemplos dan todos el mismo resultado:





&lt;?php
$iso8859_1_string = "\x5A\x6F\xEB"; // 'Zoë' en ISO-8859-1

$utf8_string = utf8_encode($iso8859_1_string);
echo bin2hex($utf8_string), "\n";

$utf8_string = mb_convert_encoding($iso8859_1_string, 'UTF-8', 'ISO-8859-1');
echo bin2hex($utf8_string), "\n";

$utf8_string = UConverter::transcode($iso8859_1_string, 'UTF8', 'ISO-8859-1');
echo bin2hex($utf8_string), "\n";

$utf8_string = iconv('ISO-8859-1', 'UTF-8', $iso8859_1_string);
echo bin2hex($utf8_string), "\n";
?&gt;

        El ejemplo anterior mostrará:




5a6fc3ab
5a6fc3ab
5a6fc3ab
5a6fc3ab

### Ver también

    - [utf8_decode()](#function.utf8-decode) - Convierte una string UTF-8 a ISO-8859-1, reemplazando los caracteres no válidos o no representables.

    - [mb_convert_encoding()](#function.mb-convert-encoding) - Convertir una cadena de un codificación de caracteres a otra

    - [UConverter::transcode()](#uconverter.transcode) - Convierte una cadena de un juego de caracteres a otro

    - [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

# vfprintf

(PHP 5, PHP 7, PHP 8)

vfprintf — Escribe una cadena formateada en un flujo

### Descripción

**vfprintf**([resource](#language.types.resource) $stream, [string](#language.types.string) $format, [array](#language.types.array) $values): [int](#language.types.integer)

Escribe una cadena producida de acuerdo con el argumento
format en el flujo stream.

Actúa de la misma manera que [fprintf()](#function.fprintf) excepto que
**vfprintf()** acepta un array de argumentos, en lugar de un
número variable de argumentos.

### Parámetros

     stream







format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve la longitud de la cadena devuelta.

### Errores/Excepciones

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if the number of arguments is zero.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [width] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [precision] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown when less arguments are given than required.
Prior to PHP 8.0.0, **[false](#constant.false)** was returned and a **[E_WARNING](#constant.e-warning)** emitted instead.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 vfprintf()**: cero como caracteres de espaciado

&lt;?php
if (!($fp = fopen('date.txt', 'w')))
return;

$year = 2025;
$month = 5;
$day = 6;
vfprintf($fp, "%04d-%02d-%02d", array($year, $month, $day));
// escribirá la fecha formateada ISO en date.txt
?&gt;

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# vprintf

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

vprintf — Muestra una string formateada

### Descripción

**vprintf**([string](#language.types.string) $format, [array](#language.types.array) $values): [int](#language.types.integer)

**vprintf()** muestra el array args,
como una string formateada gracias a format.
El formato es el mismo que el utilizado por [sprintf()](#function.sprintf).

**vprintf()** funciona como [printf()](#function.printf),
pero acepta un array como argumento, en lugar de una lista de argumentos.

### Parámetros

format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve la longitud de la string devuelta.

### Errores/Excepciones

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if the number of arguments is zero.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [width] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [precision] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown when less arguments are given than required.
Prior to PHP 8.0.0, **[false](#constant.false)** was returned and a **[E_WARNING](#constant.e-warning)** emitted instead.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con vprintf()**: enteros completados con ceros

&lt;?php
vprintf("%04d-%02d-%02d", explode('-', '1988-8-1'));
?&gt;

    El ejemplo anterior mostrará:

1988-08-01

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vsprintf()](#function.vsprintf) - Devuelve una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# vsprintf

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

vsprintf — Devuelve una string formateada

### Descripción

**vsprintf**([string](#language.types.string) $format, [array](#language.types.array) $values): [string](#language.types.string)

**vsprintf()** funciona como [sprintf()](#function.sprintf),
pero acepta un array como argumento, en lugar de una lista de argumentos.

### Parámetros

format

La cadena de formato está compuesta por cero o más directivas:
caracteres ordinarios (excepto %)
que se copian directamente al resultado y
_especificaciones de conversión_,
cada una con su propio parámetro.

Una especificación de conversión que sigue este prototipo:
%[argnum$][flags][width][.precision]specifier.

##### Argnum

Un [int](#language.types.integer) seguido de un signo dólar $,
para especificar qué número de argumento tratar en la conversión.

##### Banderas

      Bandera
      Descripción






      -

       Justifica el texto a la izquierda dado el ancho del campo;
       la justificación a la derecha es el comportamiento por omisión.




      +

       Prefija los números positivos con un signo más
       +; por omisión solo los números
       negativos son prefijados con un signo negativo.




       (espacio)

       Rellena el resultado con espacios.
       Esto es por omisión.




      0

       Rellena solo los números a la izquierda con ceros.
       Con el especificador s esto también puede
       rellenar a la derecha con ceros.




      '(char)

       Rellena el resultado con el carácter (char).



##### Ancho

Sea un entero indicando el número de caracteres (mínimo)
que esta conversión debe producir, o _.
Si _ es utilizado, entonces el ancho es proporcionado
como un valor entero adicional precediendo al que se formatea
por el especificador.

##### Precisión

Un punto . seguido opcionalmente
sea de un entero, o de \*,
cuya significación depende del especificador:

- Para los especificadores e, E,
  f y F:
  esto es el número de dígitos a mostrar después
  de la coma (por omisión, esto es 6).

- Para los especificadores g, G,
  h y H:
  esto es el número máximo de dígitos significativos a mostrar.

- Para el especificador s: actúa como un punto de corte,
  definiendo un límite máximo de caracteres de la cadena.

**Nota**:

    Si el punto es especificado sin un valor explícito para la precisión,
    0 es asumido. Si * es utilizado, la precisión es
    proporcionada como un valor entero adicional precediendo al que se formatea
    por el especificador.

  <caption>**Especificadores**</caption>
  
   
    
     Especificador
     Descripción


     %

      Un carácter de porcentaje literal. No se necesita ningún argumento.




     b

      El argumento es tratado como un entero y presentado
      como un número binario.




     c

      El argumento es tratado como un entero y presentado
      como el carácter de código ASCII correspondiente.




     d

      El argumento es tratado como un entero y presentado
      como un número entero decimal (firmado).




     e

      El argumento es tratado como una notación científica
      (ej. 1.2e+2).




     E

      Como el especificador e pero utiliza
      una letra mayúscula (por ejemplo 1.2E+2).




     f

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (teniendo en cuenta la configuración local).




     F

      El argumento es tratado como un número de coma flotante
      (tipo [float](#language.types.float)) y presentado como un número de coma
      flotante (sin tener en cuenta la configuración local).




     g


       Formato general.




       Sea P igual a la precisión si diferente de 0, 6 si la precisión
       es omitida o 1 si la precisión es cero.
       Entonces, si la conversión con el estilo E tuviera como exponente X:




       Si P &gt; X ≥ −4, la conversión es con estilo f y precisión P − (X + 1).
       De lo contrario, la conversión es con el estilo e y precisión P - 1.







     G

      Como el especificador g pero utiliza
      E y f.




     h

      Como el especificador g pero utiliza F.
      Disponible a partir de PHP 8.0.0.




     H

      Como el especificador g pero utiliza
      E y F. Disponible a partir de PHP 8.0.0.




     o

      El argumento es tratado como un entero y presentado
      como un número octal.




     s

      El argumento es tratado y presentado como una cadena de caracteres.




     u

      El argumento es tratado como un entero y presentado
      como un número decimal no firmado.




     x

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en minúsculas).




     X

      El argumento es tratado como un entero y presentado
      como un número hexadecimal (las letras en mayúsculas).


**Advertencia**

El especificador de tipo c ignora el alineamiento y el tamaño.

**Advertencia**

Intentar utilizar una combinación de una cadena
y especificadores con juegos de caracteres que necesitan
más de un octeto por carácter dará un resultado inesperado.

Las variables serán forzadas a un tipo apropiado para el especificador:

  <caption>**Manejo de tipos**</caption>
  
   
    
     Tipo
     Especificadores


     [string](#language.types.string)
     s



     [int](#language.types.integer)

      d,
      u,
      c,
      o,
      x,
      X,
      b




     [float](#language.types.float)

      e,
      E,
      f,
      F,
      g,
      G,
      h,
      H












     values







### Valores devueltos

Devuelve una string formateada a partir del array de valores
values, y utilizando el formato
format.

### Errores/Excepciones

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if the number of arguments is zero.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [width] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown if [precision] is less than zero or bigger than **[PHP_INT_MAX](#constant.php-int-max)**.
Prior to PHP 8.0.0, a **[E_WARNING](#constant.e-warning)** was emitted instead.

As of PHP 8.0.0, a [ValueError](#class.valueerror) is thrown when less arguments are given than required.
Prior to PHP 8.0.0, **[false](#constant.false)** was returned and a **[E_WARNING](#constant.e-warning)** emitted instead.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si el número de argumentos es cero;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [width] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ValueError](#class.valueerror) si [precision] es inferior a cero o superior a **[PHP_INT_MAX](#constant.php-int-max)**;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.




      8.0.0

       Lanza una [ArgumentCountError](#class.argumentcounterror) cuando se proporcionan menos argumentos de los requeridos;
       anteriormente, esta función emitía un **[E_WARNING](#constant.e-warning)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con vsprintf()**: enteros con ceros iniciales

&lt;?php
print vsprintf("%04d-%02d-%02d", explode('-', '1988-8-1'));
?&gt;

    El ejemplo anterior mostrará:

1988-08-01

### Ver también

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

    - [fprintf()](#function.fprintf) - Escribe una cadena formateada en un flujo

    - [vprintf()](#function.vprintf) - Muestra una string formateada

    - [vfprintf()](#function.vfprintf) - Escribe una cadena formateada en un flujo

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [number_format()](#function.number-format) - Formatea un número para su visualización

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# wordwrap

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

wordwrap — Realiza el ajuste de línea de un string

### Descripción

**wordwrap**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $width = 75,
    [string](#language.types.string) $break = "\n",
    [bool](#language.types.boolean) $cut_long_words = **[false](#constant.false)**
): [string](#language.types.string)

Realiza el ajuste de línea de un string.
Los strings se cortan después de un carácter de espacio (U+0020) a menos que cut_long_words
esté definido como **[true](#constant.true)**.

### Parámetros

     string


       El string de entrada.






     width


       El número de caracteres a partir del cual el string será cortado.






     break


       La línea se rompe utilizando break, este parámetro opcional.
       No debe ser un string vacío.






     cut_long_words


       Si el parámetro cut_long_words vale **[true](#constant.true)**, el ajuste de línea del
       string se realizará siempre al tamaño width o antes.
       Si se tiene una palabra que es más larga que el tamaño de ajuste, será
       cortada en trozos: ver el segundo ejemplo. Cuando vale **[false](#constant.false)**,
       la función no cortará la palabra, incluso si el parámetro
       width es más pequeño que el tamaño de la palabra.





### Valores devueltos

Devuelve el string proporcionado cortado a la longitud especificada.

### Errores/Excepciones

Si break es un string vacío, se lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si break es un string vacío,
       se lanza una [ValueError](#class.valueerror);
       anteriormente, en este caso, se emitía un **[E_WARNING](#constant.e-warning)** y se devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con wordwrap()**

&lt;?php
$text = "Portez ce vieux whisky au juge blond qui fume.";
$newtext = wordwrap($text, 20, "&lt;br /&gt;\n");

echo $newtext;
?&gt;

    El ejemplo anterior mostrará:

Portez ce vieux&lt;br /&gt;
whisky au juge&lt;br /&gt;
blond qui fume.

    **Ejemplo #2 Ejemplo con wordwrap()**

&lt;?php
$text = "Un mot très très loooooooooooooooooong.";
$newtext = wordwrap($text, 8, "\n", true);

echo "$newtext\n";
?&gt;

    El ejemplo anterior mostrará:

Un mot
très
très
looooooo
oooooooo
ooong.

    **Ejemplo #3 Ejemplo con wordwrap()**

&lt;?php
$text = "A very long woooooooooooooooooord. and something";
$newtext = wordwrap($text, 8, "\n", false);

echo "$newtext\n";
?&gt;

    El ejemplo anterior mostrará:

A very
long
woooooooooooooooooord.
and
something

### Ver también

    - [nl2br()](#function.nl2br) - Inserta un salto de línea HTML en cada nueva línea

    - [chunk_split()](#function.chunk-split) - Divide un string

## Tabla de contenidos

- [addcslashes](#function.addcslashes) — Añade barras invertidas a un string, al estilo del lenguaje C
- [addslashes](#function.addslashes) — Añade barras invertidas en un string
- [bin2hex](#function.bin2hex) — Convierte datos binarios en representación hexadecimal
- [chop](#function.chop) — Alias de rtrim
- [chr](#function.chr) — Generar un string de un byte a partir de un número
- [chunk_split](#function.chunk-split) — Divide un string
- [convert_cyr_string](#function.convert-cyr-string) — Convierte un string de un juego de caracteres cirílico a otro
- [convert_uudecode](#function.convert-uudecode) — Decodifica un string en formato uuencode
- [convert_uuencode](#function.convert-uuencode) — Codifica un string utilizando el algoritmo uuencode
- [count_chars](#function.count-chars) — Devuelve estadísticas sobre los caracteres utilizados en un string
- [crc32](#function.crc32) — Calcula la suma de comprobación CRC32
- [crypt](#function.crypt) — Hash de un solo sentido (indescifrable)
- [echo](#function.echo) — Muestra una string
- [explode](#function.explode) — Divide una string en segmentos
- [fprintf](#function.fprintf) — Escribe una cadena formateada en un flujo
- [get_html_translation_table](#function.get-html-translation-table) — Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities
- [hebrev](#function.hebrev) — Convierte un texto lógico hebreo en texto visual
- [hebrevc](#function.hebrevc) — Convierte un texto lógico hebreo en texto visual, con saltos de línea
- [hex2bin](#function.hex2bin) — Convierte una string codificada en hexadecimal a binario
- [html_entity_decode](#function.html-entity-decode) — Convierte las entidades HTML a sus caracteres correspondientes
- [htmlentities](#function.htmlentities) — Convierte todos los caracteres elegibles en entidades HTML
- [htmlspecialchars](#function.htmlspecialchars) — Convierte caracteres especiales en entidades HTML
- [htmlspecialchars_decode](#function.htmlspecialchars-decode) — Convierte las entidades HTML especiales en caracteres
- [implode](#function.implode) — Une elementos de un array en un string
- [join](#function.join) — Alias de implode
- [lcfirst](#function.lcfirst) — Pone el primer carácter en minúscula
- [levenshtein](#function.levenshtein) — Calcula la distancia Levenshtein entre dos strings
- [localeconv](#function.localeconv) — Lee la configuración local
- [ltrim](#function.ltrim) — Elimina los espacios (u otros caracteres) del inicio de un string
- [md5](#function.md5) — Calcula el md5 de un string
- [md5_file](#function.md5-file) — Calcula el md5 de un fichero
- [metaphone](#function.metaphone) — Calcula la clave metaphone
- [money_format](#function.money-format) — Formatea un número como valor monetario
- [nl_langinfo](#function.nl-langinfo) — Recopila información sobre el idioma y la configuración local
- [nl2br](#function.nl2br) — Inserta un salto de línea HTML en cada nueva línea
- [number_format](#function.number-format) — Formatea un número para su visualización
- [ord](#function.ord) — Convierte el primer byte de un string en un valor entre 0 y 255
- [parse_str](#function.parse-str) — Analiza una string como una cadena de consulta URL
- [print](#function.print) — Muestra un string
- [printf](#function.printf) — Muestra una string formateada
- [quoted_printable_decode](#function.quoted-printable-decode) — Convierte una string quoted-printable en una string de 8 bits
- [quoted_printable_encode](#function.quoted-printable-encode) — Convierte un string de 8 bits en un string quoted-printable
- [quotemeta](#function.quotemeta) — Protege los metacaracteres
- [rtrim](#function.rtrim) — Elimina los espacios (u otros caracteres) al final de un string
- [setlocale](#function.setlocale) — Establece la información de configuración local
- [sha1](#function.sha1) — Calcula el sha1 de un string
- [sha1_file](#function.sha1-file) — Calcula el sha1 de un fichero
- [similar_text](#function.similar-text) — Calcula la similitud entre dos strings
- [soundex](#function.soundex) — Calcula la clave soundex
- [sprintf](#function.sprintf) — Devuelve una string formateada
- [sscanf](#function.sscanf) — Analiza una cadena utilizando un formato
- [str_contains](#function.str-contains) — Determina si una cadena contiene un substring dado
- [str_decrement](#function.str-decrement) — Decrementa un string alfanumérico
- [str_ends_with](#function.str-ends-with) — Determina si una cadena termina con un substring dado
- [str_getcsv](#function.str-getcsv) — Analiza una string CSV en un array
- [str_increment](#function.str-increment) — Incrementa un string alfanumérica
- [str_ireplace](#function.str-ireplace) — Versión insensible a mayúsculas y minúsculas de str_replace
- [str_pad](#function.str-pad) — Completa un string hasta un tamaño dado
- [str_repeat](#function.str-repeat) — Repite un string
- [str_replace](#function.str-replace) — Reemplaza todas las ocurrencias en una string
- [str_rot13](#function.str-rot13) — Realiza una transformación ROT13
- [str_shuffle](#function.str-shuffle) — Mezcla los caracteres de un string
- [str_split](#function.str-split) — Convierte un string en un array
- [str_starts_with](#function.str-starts-with) — Determina si un string comienza con un substring dado
- [str_word_count](#function.str-word-count) — Cuenta el número de palabras utilizadas en un string
- [strcasecmp](#function.strcasecmp) — Comparación insensible a mayúsculas/minúsculas de strings binarios
- [strchr](#function.strchr) — Alias de strstr
- [strcmp](#function.strcmp) — Comparación binaria de strings
- [strcoll](#function.strcoll) — Comparación de strings localizadas
- [strcspn](#function.strcspn) — Encuentra un segmento de string que no contiene ciertos caracteres
- [strip_tags](#function.strip-tags) — Elimina las etiquetas HTML y PHP de un string
- [stripcslashes](#function.stripcslashes) — Decodifica un string codificado con addcslashes
- [stripos](#function.stripos) — Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas
- [stripslashes](#function.stripslashes) — Quita las barras de un string con comillas escapadas
- [stristr](#function.stristr) — Versión insensible a mayúsculas y minúsculas de strstr
- [strlen](#function.strlen) — Calcula el tamaño de un string
- [strnatcasecmp](#function.strnatcasecmp) — Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)
- [strnatcmp](#function.strnatcmp) — Comparación de strings con el algoritmo de "orden natural"
- [strncasecmp](#function.strncasecmp) — Comparación binaria de strings insensible a mayúsculas/minúsculas
- [strncmp](#function.strncmp) — Comparación binaria de los n primeros caracteres
- [strpbrk](#function.strpbrk) — Busca un conjunto de caracteres en un string
- [strpos](#function.strpos) — Busca la posición de la primera ocurrencia en un string
- [strrchr](#function.strrchr) — Encuentra la última ocurrencia de un carácter en un string
- [strrev](#function.strrev) — Invierte un string
- [strripos](#function.strripos) — Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas
- [strrpos](#function.strrpos) — Busca la posición de la última ocurrencia de una subcadena en una cadena
- [strspn](#function.strspn) — Encuentra la longitud del segmento inicial de un string que contiene
  todos los caracteres de una máscara dada
- [strstr](#function.strstr) — Encuentra la primera ocurrencia en un string
- [strtok](#function.strtok) — Divide una cadena en segmentos
- [strtolower](#function.strtolower) — Devuelve una string en minúsculas
- [strtoupper](#function.strtoupper) — Devuelve una string en mayúsculas
- [strtr](#function.strtr) — Reemplaza caracteres en un string
- [substr](#function.substr) — Devuelve un segmento de string
- [substr_compare](#function.substr-compare) — Comparar dos strings desde un offset hasta una longitud en caracteres
- [substr_count](#function.substr-count) — Cuenta el número de ocurrencias de segmentos en un string
- [substr_replace](#function.substr-replace) — Reemplaza un segmento en un string
- [trim](#function.trim) — Elimina los espacios (u otros caracteres) al inicio y al final de un string
- [ucfirst](#function.ucfirst) — Pone en mayúscula el primer carácter
- [ucwords](#function.ucwords) — Pone en mayúscula la primera letra de todas las palabras
- [utf8_decode](#function.utf8-decode) — Convierte una string UTF-8 a ISO-8859-1, reemplazando los caracteres no válidos o no representables.
- [utf8_encode](#function.utf8-encode) — Convierte una cadena ISO-8859-1 a UTF-8
- [vfprintf](#function.vfprintf) — Escribe una cadena formateada en un flujo
- [vprintf](#function.vprintf) — Muestra una string formateada
- [vsprintf](#function.vsprintf) — Devuelve una string formateada
- [wordwrap](#function.wordwrap) — Realiza el ajuste de línea de un string

    # Registro de cambios

    A las clases/funciones/métodos de esta extensión se han realizado los siguientes cambios.

    VersionFunctionDescription8.4.0[str_getcsv](#function.str-getcsv)Confiar en el valor por omisión de escape está ahora
    deprecado. [str_getcsv](#function.str-getcsv)Ahora lanza una ValueError si
    separator, enclosure,
    o escape es inválido.
    Esto imita el comportamiento de fgetcsv y
    fputcsv. [strcspn](#function.strcspn)Antes de PHP 8.4.0, cuando characters era un string vacío,
    la búsqueda se detenía incorrectamente en el primer byte nulo en string.8.3.0[number_format](#function.number-format)Se añadió el manejo de valores negativos para decimals. [str_getcsv](#function.str-getcsv)Una cadena vacía es devuelta en lugar de una cadena que contiene un solo
    byte nulo para el último campo si este contiene únicamente un delimitador no terminado. [strrchr](#function.strrchr)El parámetro before_needle ha sido añadido. [strtok](#function.strtok)Ahora emite un E_WARNING cuando el token no es proporcionado.8.2.0[lcfirst](#function.lcfirst)La conversión de la casilla ya no depende de la configuración local definida con
    setlocale. Solo se convertirán los caracteres ASCII. [str_ireplace](#function.str-ireplace)El case folding ya no depende de la configuración local definida con
    setlocale. Solo se realizará el case folding ASCII.
    Los octetos no-ASCII serán comparados por su valor de octeto. [str_split](#function.str-split)Si string está vacío, ahora se devuelve un array vacío.
    Anteriormente, se devolvía un array que contenía un único string vacío. [strcasecmp](#function.strcasecmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [strcmp](#function.strcmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [stripos](#function.stripos)El case folding ya no depende de la configuración local definida con
    setlocale. Solo se realizará el case folding ASCII.
    Los octetos no-ASCII serán comparados por su valor de octeto. [stristr](#function.stristr)El case folding ya no depende de la configuración local definida con
    setlocale. Solo se realizará el case folding ASCII.
    Los octetos no-ASCII serán comparados por su valor de octeto. [strnatcasecmp](#function.strnatcasecmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [strnatcmp](#function.strnatcmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [strncasecmp](#function.strncasecmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [strncmp](#function.strncmp)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [strripos](#function.strripos)El case folding ya no depende de la configuración local definida con
    setlocale. Solo se realizará el case folding ASCII.
    Los octetos no-ASCII serán comparados por su valor de octeto. [strtolower](#function.strtolower)La conversión de la casilla ya no depende de la configuración local definida con
    setlocale. Solo se convertirán los caracteres ASCII. [strtoupper](#function.strtoupper)La conversión de la casilla ya no depende de la configuración local definida con
    setlocale. Solo se convertirán los caracteres ASCII. [substr_compare](#function.substr-compare)Esta función ya no garantiza retornar
    strlen($string1) - strlen($string2) cuando las longitudes
    de las strings no son iguales, y puede retornar
    -1 o 1 en su lugar. [ucfirst](#function.ucfirst)La conversión de la casilla ya no depende de la configuración local definida con
    setlocale. Solo se convertirán los caracteres ASCII. [ucwords](#function.ucwords)La conversión de la casilla ya no depende de la configuración local definida con
    setlocale. Solo se convertirán los caracteres ASCII. [utf8_decode](#function.utf8-decode)Esta función ha sido declarada obsoleta. [utf8_encode](#function.utf8-encode)Esta función ha sido declarada obsoleta.8.1.0[get_html_translation_table](#function.get-html-translation-table)flags cambió de ENT_COMPAT a
    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401. [html_entity_decode](#function.html-entity-decode)flags cambió de ENT_COMPAT a
    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401. [htmlentities](#function.htmlentities)flags cambió de ENT_COMPAT a
    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401. [htmlspecialchars](#function.htmlspecialchars)flags cambió de ENT_COMPAT a
    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401. [htmlspecialchars_decode](#function.htmlspecialchars-decode)flags cambió de ENT_COMPAT a
    ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.8.0.0[convert_cyr_string](#function.convert-cyr-string)Esta función ha sido eliminada. [convert_uuencode](#function.convert-uuencode)Antes de esta versión, intentar convertir un string vacío
    devolvía false sin ninguna razón en particular. [count_chars](#function.count-chars)Anterior a esta versión, la función devolvía false en caso de error. [crypt](#function.crypt)El salt ya no es opcional. [explode](#function.explode)explode lanzará ahora una ValueError cuando el parámetro separator es una string vacía (""). Anteriormente, explode retornaba false. [fprintf](#function.fprintf)Esta función ya no devuelve false en caso de fallo. [fprintf](#function.fprintf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [fprintf](#function.fprintf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [fprintf](#function.fprintf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [fprintf](#function.fprintf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [hebrevc](#function.hebrevc)Esta función ha sido eliminada. [html_entity_decode](#function.html-entity-decode)encoding ahora puede ser nullable. [htmlentities](#function.htmlentities)encoding ahora es nullable. [implode](#function.implode)Pasar el parámetro separator después del array
    ya no es compatible. [levenshtein](#function.levenshtein)Antes de esta versión, levenshtein debía ser llamada
    con dos o cinco argumentos. [levenshtein](#function.levenshtein)Antes de esta versión, levenshtein devolvía -1
    si alguno de los strings de los argumentos superaba los 255 caracteres. [metaphone](#function.metaphone)Esta función devolvía false en caso de error. [money_format](#function.money-format)Esta función ha sido eliminada. [number_format](#function.number-format)Antes de esta versión, number_format aceptaba
    uno, dos o cuatro argumentos (pero no tres). [parse_str](#function.parse-str)result ya no es opcional. [printf](#function.printf)Esta función ya no devuelve false en caso de fallo. [printf](#function.printf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [printf](#function.printf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [printf](#function.printf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [printf](#function.printf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [soundex](#function.soundex)Antes de esta versión, llamar a la función con una cadena vacía
    retornaba false sin ninguna razón en particular. [sprintf](#function.sprintf)Esta función ya no devuelve false en caso de fallo. [sprintf](#function.sprintf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [sprintf](#function.sprintf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [sprintf](#function.sprintf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [sprintf](#function.sprintf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [str_split](#function.str-split)Si length es menor que 1,
    se lanzará un ValueError;
    anteriormente, se emitía un error de tipo E_WARNING
    y la función devolvía false. [str_word_count](#function.str-word-count)characters ahora es nullable. [strcspn](#function.strcspn)length ahora es nullable. [strip_tags](#function.strip-tags)allowed_tags ahora puede ser nullable. [stripos](#function.stripos)needle acepta ahora una cadena vacía. [stripos](#function.stripos)Pasar un int como needle ya no está soportado. [stristr](#function.stristr)needle acepta ahora una cadena vacía. [stristr](#function.stristr)Pasar un int como needle ya no está soportado. [strpos](#function.strpos)needle acepta ahora una cadena vacía. [strpos](#function.strpos)Pasar un int como needle ya no está soportado. [strrchr](#function.strrchr)needle acepta ahora una cadena vacía. [strrchr](#function.strrchr)Pasar un int como needle ya no está soportado. [strripos](#function.strripos)needle acepta ahora una cadena vacía. [strripos](#function.strripos)Pasar un int como needle ya no está soportado. [strrpos](#function.strrpos)needle acepta ahora una cadena vacía. [strrpos](#function.strrpos)Pasar un int como needle ya no está soportado. [strspn](#function.strspn)length es ahora nullable. [strstr](#function.strstr)needle acepta ahora una cadena vacía. [strstr](#function.strstr)Pasar un int como needle ya no es soportado. [substr](#function.substr)length es ahora nullable.
    Cuando length es explícitamente definido como null,
    la función devuelve un substring terminando al final del string,
    mientras que anteriormente devolvía un string vacío. [substr](#function.substr)Esta función devuelve un string vacío donde anteriormente devolvía false [substr_compare](#function.substr-compare)length ahora es nullable. [substr_count](#function.substr-count)length ahora puede ser nullable. [substr_replace](#function.substr-replace)length ahora es nullable. [vfprintf](#function.vfprintf)Esta función ya no devuelve false en caso de fallo. [vfprintf](#function.vfprintf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [vfprintf](#function.vfprintf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vfprintf](#function.vfprintf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vfprintf](#function.vfprintf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [vprintf](#function.vprintf)Esta función ya no devuelve false en caso de fallo. [vprintf](#function.vprintf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [vprintf](#function.vprintf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vprintf](#function.vprintf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vprintf](#function.vprintf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [vsprintf](#function.vsprintf)Esta función ya no devuelve false en caso de fallo. [vsprintf](#function.vsprintf)Lanza una ValueError si el número de argumentos es cero;
    anteriormente, esta función emitía un E_WARNING. [vsprintf](#function.vsprintf)Lanza una ValueError si [width] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vsprintf](#function.vsprintf)Lanza una ValueError si [precision] es inferior a cero o superior a PHP_INT_MAX;
    anteriormente, esta función emitía un E_WARNING. [vsprintf](#function.vsprintf)Lanza una ArgumentCountError cuando se proporcionan menos argumentos de los requeridos;
    anteriormente, esta función emitía un E_WARNING. [wordwrap](#function.wordwrap)Si break es un string vacío,
    se lanza una ValueError;
    anteriormente, en este caso, se emitía un E_WARNING y se devolvía false.7.4.0[chr](#function.chr)Esta función ya no acepta silenciosamente los codepoints
    no soportados, y convierte estos valores a 0. [convert_cyr_string](#function.convert-cyr-string)Esta función está obsoleta. [hebrevc](#function.hebrevc)Esta función está obsoleta. [implode](#function.implode)Pasar el parámetro separator después del array
    (es decir, sin utilizar el orden documentado de los parámetros) es obsoleto. [money_format](#function.money-format)Esta función está obsoleta. Utilizar
    NumberFormatter::formatCurrency en su lugar. [str_getcsv](#function.str-getcsv)El argumento escape interpreta ahora una cadena
    vacía como señal para desactivar el mecanismo de escape propio.
    Anteriormente, una cadena vacía era tratada como el valor por defecto del argumento. [strip_tags](#function.strip-tags)allowed_tags ahora acepta un array.7.3.5[substr_compare](#function.substr-compare)offset ahora puede ser igual al tamaño de haystack.7.3.0[stripos](#function.stripos)Pasar un int como before_needle ha sido
    declarado obsoleto. [stristr](#function.stristr)Pasar un int como before_needle se ha
    marcado como obsoleto. [strpos](#function.strpos)Pasar un int como before_needle ha sido
    declarado obsoleto. [strrchr](#function.strrchr)Pasar un int como before_needle ha sido
    declarado obsoleto. [strripos](#function.strripos)Pasar un int como before_needle ha sido
    declarado obsoleto. [strrpos](#function.strrpos)Pasar un int como before_needle ha sido
    declarado obsoleto. [strstr](#function.strstr)Pasar un int como before_needle ha sido
    declarado obsoleto.7.2.18[substr_compare](#function.substr-compare)offset ahora puede ser igual al tamaño de haystack.7.2.0[number_format](#function.number-format)number_format fue modificado para no permitir devolver -0, anteriormente -0 podía
    ser devuelto para casos donde num valía -0.01. [parse_str](#function.parse-str)El uso de parse_str sin el segundo argumento emite una nota E_DEPRECATED. [utf8_decode](#function.utf8-decode)Esta función fue movida al núcleo de PHP; anteriormente, era
    necesario instalar la extensión XML para utilizarla. [utf8_encode](#function.utf8-encode)Esta función fue movida al núcleo de PHP,
    anteriormente, era necesario instalar la extensión XML
    para utilizarla.7.1.0[str_shuffle](#function.str-shuffle)El algoritmo de aleatorización ha sido modificado para utilizar el Generador de Números Aleatorios
    Mersenne Twister en lugar de la función rand de libc. [stripos](#function.stripos)Se ha añadido soporte para números negativos en el parámetro offset. [strpos](#function.strpos)Se ha añadido soporte para números negativos en el parámetro offset. [substr_count](#function.substr-count)Se agregó soporte para números negativos para offset
    y length.
    length también puede ser 0 ahora.

- [Introducción](#intro.strings)
- [Instalación/Configuración](#strings.setup)<li>[Instalación](#strings.installation)
  </li>- [Constantes predefinidas](#string.constants)
- [Funciones de strings](#ref.strings)<li>[addcslashes](#function.addcslashes) — Añade barras invertidas a un string, al estilo del lenguaje C
- [addslashes](#function.addslashes) — Añade barras invertidas en un string
- [bin2hex](#function.bin2hex) — Convierte datos binarios en representación hexadecimal
- [chop](#function.chop) — Alias de rtrim
- [chr](#function.chr) — Generar un string de un byte a partir de un número
- [chunk_split](#function.chunk-split) — Divide un string
- [convert_cyr_string](#function.convert-cyr-string) — Convierte un string de un juego de caracteres cirílico a otro
- [convert_uudecode](#function.convert-uudecode) — Decodifica un string en formato uuencode
- [convert_uuencode](#function.convert-uuencode) — Codifica un string utilizando el algoritmo uuencode
- [count_chars](#function.count-chars) — Devuelve estadísticas sobre los caracteres utilizados en un string
- [crc32](#function.crc32) — Calcula la suma de comprobación CRC32
- [crypt](#function.crypt) — Hash de un solo sentido (indescifrable)
- [echo](#function.echo) — Muestra una string
- [explode](#function.explode) — Divide una string en segmentos
- [fprintf](#function.fprintf) — Escribe una cadena formateada en un flujo
- [get_html_translation_table](#function.get-html-translation-table) — Devuelve la tabla de traducción de entidades utilizada por htmlspecialchars y htmlentities
- [hebrev](#function.hebrev) — Convierte un texto lógico hebreo en texto visual
- [hebrevc](#function.hebrevc) — Convierte un texto lógico hebreo en texto visual, con saltos de línea
- [hex2bin](#function.hex2bin) — Convierte una string codificada en hexadecimal a binario
- [html_entity_decode](#function.html-entity-decode) — Convierte las entidades HTML a sus caracteres correspondientes
- [htmlentities](#function.htmlentities) — Convierte todos los caracteres elegibles en entidades HTML
- [htmlspecialchars](#function.htmlspecialchars) — Convierte caracteres especiales en entidades HTML
- [htmlspecialchars_decode](#function.htmlspecialchars-decode) — Convierte las entidades HTML especiales en caracteres
- [implode](#function.implode) — Une elementos de un array en un string
- [join](#function.join) — Alias de implode
- [lcfirst](#function.lcfirst) — Pone el primer carácter en minúscula
- [levenshtein](#function.levenshtein) — Calcula la distancia Levenshtein entre dos strings
- [localeconv](#function.localeconv) — Lee la configuración local
- [ltrim](#function.ltrim) — Elimina los espacios (u otros caracteres) del inicio de un string
- [md5](#function.md5) — Calcula el md5 de un string
- [md5_file](#function.md5-file) — Calcula el md5 de un fichero
- [metaphone](#function.metaphone) — Calcula la clave metaphone
- [money_format](#function.money-format) — Formatea un número como valor monetario
- [nl_langinfo](#function.nl-langinfo) — Recopila información sobre el idioma y la configuración local
- [nl2br](#function.nl2br) — Inserta un salto de línea HTML en cada nueva línea
- [number_format](#function.number-format) — Formatea un número para su visualización
- [ord](#function.ord) — Convierte el primer byte de un string en un valor entre 0 y 255
- [parse_str](#function.parse-str) — Analiza una string como una cadena de consulta URL
- [print](#function.print) — Muestra un string
- [printf](#function.printf) — Muestra una string formateada
- [quoted_printable_decode](#function.quoted-printable-decode) — Convierte una string quoted-printable en una string de 8 bits
- [quoted_printable_encode](#function.quoted-printable-encode) — Convierte un string de 8 bits en un string quoted-printable
- [quotemeta](#function.quotemeta) — Protege los metacaracteres
- [rtrim](#function.rtrim) — Elimina los espacios (u otros caracteres) al final de un string
- [setlocale](#function.setlocale) — Establece la información de configuración local
- [sha1](#function.sha1) — Calcula el sha1 de un string
- [sha1_file](#function.sha1-file) — Calcula el sha1 de un fichero
- [similar_text](#function.similar-text) — Calcula la similitud entre dos strings
- [soundex](#function.soundex) — Calcula la clave soundex
- [sprintf](#function.sprintf) — Devuelve una string formateada
- [sscanf](#function.sscanf) — Analiza una cadena utilizando un formato
- [str_contains](#function.str-contains) — Determina si una cadena contiene un substring dado
- [str_decrement](#function.str-decrement) — Decrementa un string alfanumérico
- [str_ends_with](#function.str-ends-with) — Determina si una cadena termina con un substring dado
- [str_getcsv](#function.str-getcsv) — Analiza una string CSV en un array
- [str_increment](#function.str-increment) — Incrementa un string alfanumérica
- [str_ireplace](#function.str-ireplace) — Versión insensible a mayúsculas y minúsculas de str_replace
- [str_pad](#function.str-pad) — Completa un string hasta un tamaño dado
- [str_repeat](#function.str-repeat) — Repite un string
- [str_replace](#function.str-replace) — Reemplaza todas las ocurrencias en una string
- [str_rot13](#function.str-rot13) — Realiza una transformación ROT13
- [str_shuffle](#function.str-shuffle) — Mezcla los caracteres de un string
- [str_split](#function.str-split) — Convierte un string en un array
- [str_starts_with](#function.str-starts-with) — Determina si un string comienza con un substring dado
- [str_word_count](#function.str-word-count) — Cuenta el número de palabras utilizadas en un string
- [strcasecmp](#function.strcasecmp) — Comparación insensible a mayúsculas/minúsculas de strings binarios
- [strchr](#function.strchr) — Alias de strstr
- [strcmp](#function.strcmp) — Comparación binaria de strings
- [strcoll](#function.strcoll) — Comparación de strings localizadas
- [strcspn](#function.strcspn) — Encuentra un segmento de string que no contiene ciertos caracteres
- [strip_tags](#function.strip-tags) — Elimina las etiquetas HTML y PHP de un string
- [stripcslashes](#function.stripcslashes) — Decodifica un string codificado con addcslashes
- [stripos](#function.stripos) — Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas
- [stripslashes](#function.stripslashes) — Quita las barras de un string con comillas escapadas
- [stristr](#function.stristr) — Versión insensible a mayúsculas y minúsculas de strstr
- [strlen](#function.strlen) — Calcula el tamaño de un string
- [strnatcasecmp](#function.strnatcasecmp) — Comparación de strings con el algoritmo de "orden natural" (insensible a mayúsculas/minúsculas)
- [strnatcmp](#function.strnatcmp) — Comparación de strings con el algoritmo de "orden natural"
- [strncasecmp](#function.strncasecmp) — Comparación binaria de strings insensible a mayúsculas/minúsculas
- [strncmp](#function.strncmp) — Comparación binaria de los n primeros caracteres
- [strpbrk](#function.strpbrk) — Busca un conjunto de caracteres en un string
- [strpos](#function.strpos) — Busca la posición de la primera ocurrencia en un string
- [strrchr](#function.strrchr) — Encuentra la última ocurrencia de un carácter en un string
- [strrev](#function.strrev) — Invierte un string
- [strripos](#function.strripos) — Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas
- [strrpos](#function.strrpos) — Busca la posición de la última ocurrencia de una subcadena en una cadena
- [strspn](#function.strspn) — Encuentra la longitud del segmento inicial de un string que contiene
  todos los caracteres de una máscara dada
- [strstr](#function.strstr) — Encuentra la primera ocurrencia en un string
- [strtok](#function.strtok) — Divide una cadena en segmentos
- [strtolower](#function.strtolower) — Devuelve una string en minúsculas
- [strtoupper](#function.strtoupper) — Devuelve una string en mayúsculas
- [strtr](#function.strtr) — Reemplaza caracteres en un string
- [substr](#function.substr) — Devuelve un segmento de string
- [substr_compare](#function.substr-compare) — Comparar dos strings desde un offset hasta una longitud en caracteres
- [substr_count](#function.substr-count) — Cuenta el número de ocurrencias de segmentos en un string
- [substr_replace](#function.substr-replace) — Reemplaza un segmento en un string
- [trim](#function.trim) — Elimina los espacios (u otros caracteres) al inicio y al final de un string
- [ucfirst](#function.ucfirst) — Pone en mayúscula el primer carácter
- [ucwords](#function.ucwords) — Pone en mayúscula la primera letra de todas las palabras
- [utf8_decode](#function.utf8-decode) — Convierte una string UTF-8 a ISO-8859-1, reemplazando los caracteres no válidos o no representables.
- [utf8_encode](#function.utf8-encode) — Convierte una cadena ISO-8859-1 a UTF-8
- [vfprintf](#function.vfprintf) — Escribe una cadena formateada en un flujo
- [vprintf](#function.vprintf) — Muestra una string formateada
- [vsprintf](#function.vsprintf) — Devuelve una string formateada
- [wordwrap](#function.wordwrap) — Realiza el ajuste de línea de un string
  </li>- [Registro de cambios](#changelog.strings)
