# Notación Objeto JavaScript

# Introducción

Esta extensión implementa el formato de intercambio de datos
[» JavaScript Object Notation (JSON)](http://www.json.org/).
PHP se proporciona con un motor de análisis que ha sido especialmente escrito
para PHP y que está licenciado bajo la licencia PHP.

**Nota**:

PHP implements a superset of JSON as specified in the original
[» RFC 7159](https://datatracker.ietf.org/doc/html/rfc7159).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#json.installation)

    ## Instalación

    La extensión JSON es una extensión del núcleo de PHP, por lo que siempre está habilitada.

    Antes de PHP 8.0.0, la extensión JSON estaba incluida y se compilaba en PHP por
    defecto, pero podía ser deshabilitada explícitamente usando **--disable-json**.

    Antes de 5.2.0, la extensión JSON se instalaba como un
    [» módulo PECL](https://pecl.php.net/package/json).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las constantes siguientes indican el tipo de error devuelto por
[json_last_error()](#function.json-last-error) o almacenado como code
de una [JsonException](#class.jsonexception).

    **[JSON_ERROR_NONE](#constant.json-error-none)**
    ([int](#language.types.integer))



     No se ha producido ningún error.





    **[JSON_ERROR_DEPTH](#constant.json-error-depth)**
    ([int](#language.types.integer))



     Se ha alcanzado la profundidad máxima de la pila.





    **[JSON_ERROR_STATE_MISMATCH](#constant.json-error-state-mismatch)**
    ([int](#language.types.integer))



     Ocurre con un underflow o con una inadaptación de los modos.





    **[JSON_ERROR_CTRL_CHAR](#constant.json-error-ctrl-char)**
    ([int](#language.types.integer))



     Error al controlar los caracteres, probablemente codificados incorrectamente.





    **[JSON_ERROR_SYNTAX](#constant.json-error-syntax)**
    ([int](#language.types.integer))



     Error de sintaxis.





    **[JSON_ERROR_UTF8](#constant.json-error-utf8)**
    ([int](#language.types.integer))



     Caracteres UTF-8 mal formados, probablemente codificados incorrectamente.





    **[JSON_ERROR_RECURSION](#constant.json-error-recursion)**
    ([int](#language.types.integer))



     El objeto o el array pasado a la función [json_encode()](#function.json-encode)
     incluye referencias recursivas y no pueden ser codificadas.
     Si se ha proporcionado la opción **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)**,
     **[null](#constant.null)** será codificado en lugar de la referencia recursiva.





    **[JSON_ERROR_INF_OR_NAN](#constant.json-error-inf-or-nan)**
    ([int](#language.types.integer))



     El valor pasado a la función [json_encode()](#function.json-encode) incluye
     [**<a href="#constant.nan">NAN](#language.types.float.nan)**</a>,
     o [**<a href="#constant.inf">INF](#function.is-infinite)**</a>.
     Si se ha proporcionado la opción **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)**,
     0 será codificado en lugar de estos números especiales.





    **[JSON_ERROR_UNSUPPORTED_TYPE](#constant.json-error-unsupported-type)**
    ([int](#language.types.integer))



     Se ha proporcionado un valor de un tipo no soportado a la función
     [json_encode()](#function.json-encode), como por ejemplo una [resource](#language.types.resource).
     Si se ha proporcionado la opción **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)**,
     **[null](#constant.null)** será codificado en lugar del valor no soportado.





    **[JSON_ERROR_INVALID_PROPERTY_NAME](#constant.json-error-invalid-property-name)**
    ([int](#language.types.integer))



     Una clave que comienza con el carácter \u0000 estaba presente en la
     cadena de caracteres pasada a [json_decode()](#function.json-decode)
     durante la decodificación de un objeto JSON en un objeto PHP.





    **[JSON_ERROR_UTF16](#constant.json-error-utf16)**
    ([int](#language.types.integer))



     Sustituto UTF-16 simple no apareado en el escape unicode contenido
     en la cadena de caracteres JSON pasada a [json_decode()](#function.json-decode).





    **[JSON_ERROR_NON_BACKED_ENUM](#constant.json-error-non-backed-enum)**
    ([int](#language.types.integer))



     El valor pasado a [json_encode()](#function.json-encode)
     incluye una enumeración no soportada que no puede ser serializada.
     Disponible a partir de PHP 8.1.0.

Las constantes siguientes pueden ser combinadas para formar las opciones de
[json_decode()](#function.json-decode).

    **[JSON_BIGINT_AS_STRING](#constant.json-bigint-as-string)**
    ([int](#language.types.integer))



     Decodifica los enteros grandes como una cadena de caracteres.





    **[JSON_OBJECT_AS_ARRAY](#constant.json-object-as-array)**
    ([int](#language.types.integer))



     Decodifica un objeto JSON en array PHP. Esta opción puede ser añadida
     automáticamente llamando a [json_decode()](#function.json-decode) con el
     segundo argumento igual a **[true](#constant.true)**.

Las constantes siguientes pueden ser combinadas para formar las opciones de
[json_encode()](#function.json-encode).

    **[JSON_HEX_TAG](#constant.json-hex-tag)**
    ([int](#language.types.integer))



     Todos los caracteres &lt; y &gt; son convertidos en secuencias
     \u003C y \u003E.





    **[JSON_HEX_AMP](#constant.json-hex-amp)**
    ([int](#language.types.integer))



     Todos los caracteres &amp; son convertidos en \u0026.





    **[JSON_HEX_APOS](#constant.json-hex-apos)**
    ([int](#language.types.integer))



     Todos los apóstrofes ' son convertidos en \u0027.





    **[JSON_HEX_QUOT](#constant.json-hex-quot)**
    ([int](#language.types.integer))



     Todas las comillas dobles " son convertidas en \u0022.





    **[JSON_FORCE_OBJECT](#constant.json-force-object)**
    ([int](#language.types.integer))



     Produce un objeto en lugar de un array, cuando se utiliza un array
     no asociativo. Esto es especialmente útil cuando el destinatario del resultado espera un objeto,
     y el array está vacío.





    **[JSON_NUMERIC_CHECK](#constant.json-numeric-check)**
    ([int](#language.types.integer))



     Codifica las cadenas numéricas como números.





    **[JSON_PRETTY_PRINT](#constant.json-pretty-print)**
    ([int](#language.types.integer))



     Utiliza espacios en los datos devueltos para
     formatearlos.





    **[JSON_UNESCAPED_SLASHES](#constant.json-unescaped-slashes)**
    ([int](#language.types.integer))



     No escapar los caracteres /.





    **[JSON_UNESCAPED_UNICODE](#constant.json-unescaped-unicode)**
    ([int](#language.types.integer))



     Codifica los caracteres multioctetos Unicode literalmente (el comportamiento
     por defecto es escaparles con \uXXXX).





    **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)**
    ([int](#language.types.integer))



     Sustituye ciertos valores no codificables en lugar de fallar.





    **[JSON_PRESERVE_ZERO_FRACTION](#constant.json-preserve-zero-fraction)**
    ([int](#language.types.integer))



    Asegura que los valores de tipo [float](#language.types.float) siempre sean codificados como
    valor flotante.





    **[JSON_UNESCAPED_LINE_TERMINATORS](#constant.json-unescaped-line-terminators)**
    ([int](#language.types.integer))



     Los terminadores de línea son conservados sin escapar cuando
     **[JSON_UNESCAPED_UNICODE](#constant.json-unescaped-unicode)** es proporcionado. Utiliza el mismo
     comportamiento como si fuera antes de PHP 7.1 sin esta constante.
     Disponible a partir de PHP 7.1.0.

Las constantes siguientes pueden ser combinadas para formar las opciones de
[json_decode()](#function.json-decode) y [json_encode()](#function.json-encode).

    **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)**
    ([int](#language.types.integer))



     Ignora los caracteres UTF-8 inválidos.
     Disponible a partir de PHP 7.2.0.





    **[JSON_INVALID_UTF8_SUBSTITUTE](#constant.json-invalid-utf8-substitute)**
    ([int](#language.types.integer))



     Convierte los caracteres UTF-8 inválidos en \0xfffd
     (Carácter Unicode 'REPLACEMENT CHARACTER').
     Disponible a partir de PHP 7.2.0.





    **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**
    ([int](#language.types.integer))



     Emite una [JsonException](#class.jsonexception) si ocurre un error
     en lugar de establecer el estado de error global que es recuperado mediante
     [json_last_error()](#function.json-last-error) y [json_last_error_msg()](#function.json-last-error-msg).
     **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)** tiene prioridad sobre
     **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**.
     Disponible a partir de PHP 7.3.0.

# La clase JsonException

(PHP 7 &gt;= 7.3.0, PHP 8)

## Introducción

    Excepción emitida si la opción **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**
    está definida para [json_encode()](#function.json-encode) o
    [json_decode()](#function.json-decode). code contiene el tipo
    de error, para los valores posibles ver [json_last_error()](#function.json-last-error).

## Sinopsis de la Clase

     class **JsonException**



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

# La interfaz JsonSerializable

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

## Introducción

    Los objetos que implementan la interfaz
    **JsonSerializable** pueden
    personalizar su representación JSON durante la codificación
    con la función [json_encode()](#function.json-encode).

## Sinopsis de la Interfaz

     interface **JsonSerializable** {

    /* Métodos */

public [jsonSerialize](#jsonserializable.jsonserialize)(): [mixed](#language.types.mixed)

}

# JsonSerializable::jsonSerialize

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

JsonSerializable::jsonSerialize — Especifica los datos que deben ser serializados en JSON

### Descripción

public **JsonSerializable::jsonSerialize**(): [mixed](#language.types.mixed)

Serializa el objeto en un valor que puede ser serializado nativamente por
la función [json_encode()](#function.json-encode).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los datos que pueden ser serializados por la función
[json_encode()](#function.json-encode), que pueden ser valores
de cualquier tipo excepto un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1
     Ejemplo con JsonSerializable::jsonSerialize()**
     devolviendo un [array](#language.types.array)

&lt;?php
class ArrayValue implements JsonSerializable {
private $array;
public function \_\_construct(array $array) {
$this-&gt;array = $array;
}

    public function jsonSerialize(): mixed {
        return $this-&gt;array;
    }

}

$array = [1, 2, 3];
echo json_encode(new ArrayValue($array), JSON_PRETTY_PRINT);
?&gt;

    El ejemplo anterior mostrará:

[
1,
2,
3
]

    **Ejemplo #2
     Ejemplo con JsonSerializable::jsonSerialize()**
     devolviendo un [array](#language.types.array) asociativo

&lt;?php
class ArrayValue implements JsonSerializable {
private $array;
public function \_\_construct(array $array) {
$this-&gt;array = $array;
}

    public function jsonSerialize() {
        return $this-&gt;array;
    }

}

$array = ['foo' =&gt; 'bar', 'quux' =&gt; 'baz'];
echo json_encode(new ArrayValue($array), JSON_PRETTY_PRINT);
?&gt;

    El ejemplo anterior mostrará:

{
"foo": "bar",
"quux": "baz"
}

    **Ejemplo #3
     Ejemplo con JsonSerializable::jsonSerialize()**
     devolviendo un [int](#language.types.integer)

&lt;?php
class IntegerValue implements JsonSerializable {
private $number;
    public function __construct($number) {
$this-&gt;number = (int) $number;
}

    public function jsonSerialize() {
        return $this-&gt;number;
    }

}

echo json_encode(new IntegerValue(1), JSON_PRETTY_PRINT);
?&gt;

    El ejemplo anterior mostrará:

1

    **Ejemplo #4
     Ejemplo con JsonSerializable::jsonSerialize()**
     devolviendo una [string](#language.types.string)

&lt;?php
class StringValue implements JsonSerializable {
private $string;
    public function __construct($string) {
$this-&gt;string = (string) $string;
}

    public function jsonSerialize() {
        return $this-&gt;string;
    }

}

echo json_encode(new StringValue('Hello!'), JSON_PRETTY_PRINT);
?&gt;

    El ejemplo anterior mostrará:

"Hello!"

## Tabla de contenidos

- [JsonSerializable::jsonSerialize](#jsonserializable.jsonserialize) — Especifica los datos que deben ser serializados en JSON

# Funciones de JSON

# json_decode

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL json &gt;= 1.2.0)

json_decode — Decodifica una cadena JSON

### Descripción

**json_decode**(
    [string](#language.types.string) $json,
    [?](#language.types.null)[bool](#language.types.boolean) $associative = **[null](#constant.null)**,
    [int](#language.types.integer) $depth = 512,
    [int](#language.types.integer) $flags = 0
): [mixed](#language.types.mixed)

Recupera una cadena codificada en JSON y la convierte en un valor de PHP.

### Parámetros

     json


       La [string](#language.types.string) json a decodificar.




       Esta función solo funciona con cadenas codificadas en UTF-8.





**Nota**:

PHP implements a superset of JSON as specified in the original
[» RFC 7159](https://datatracker.ietf.org/doc/html/rfc7159).

     associative


       Cuando este parámetro vale **[true](#constant.true)**, los objetos JSON serán devueltos como
       arrays asociativos; cuando este parámetro vale **[false](#constant.false)**, los objetos JSON
       serán devueltos como objetos. Cuando este parámetro vale **[null](#constant.null)**, los objetos
       JSON serán devueltos como arrays asociativos o como objetos, según si la constante
       **[JSON_OBJECT_AS_ARRAY](#constant.json-object-as-array)** ha sido definida en el parámetro flags.






     depth


       Profundidad máxima de anidamiento de la estructura en proceso de decodificación.
       El valor debe ser superior a 0,
       e inferior o igual a 2147483647.






     flags


       Máscara de bits compuesta por
       **[JSON_BIGINT_AS_STRING](#constant.json-bigint-as-string)**,
       **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)**,
       **[JSON_INVALID_UTF8_SUBSTITUTE](#constant.json-invalid-utf8-substitute)**,
       **[JSON_OBJECT_AS_ARRAY](#constant.json-object-as-array)**,
       **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**.
       El comportamiento de estas constantes se describe en la página
       de las [constantes JSON](#json.constants).





### Valores devueltos

Devuelve el valor codificado en el parámetro json
en el tipo PHP apropiado. Los valores sin comillas true,
false y null
son devueltos respectivamente como **[true](#constant.true)**, **[false](#constant.false)** y **[null](#constant.null)**.
**[null](#constant.null)** es devuelto si el parámetro json no ha podido
ser decodificado o si los datos codificados son más profundos que el límite
de anidamiento proporcionado.

### Errores/Excepciones

Si depth está fuera del rango permitido,
una [ValueError](#class.valueerror) es lanzada a partir de PHP 8.0.0,
mientras que anteriormente se generaba un error de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        El flags
        **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)** ha sido añadido.




       7.2.0

        El parámetro associative ahora es nullable.




       7.2.0

        Los flags
        **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)**, y
        **[JSON_INVALID_UTF8_SUBSTITUTE](#constant.json-invalid-utf8-substitute)** han sido añadidos.




       7.1.0

        Una clave JSON vacía ("") puede ser codificada en la propiedad de objeto
        vacía en lugar de usar una clave con el valor _empty_.





### Ejemplos

    **Ejemplo #1 Ejemplo con json_decode()**

&lt;?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
var_dump(json_decode($json, true));

?&gt;

    El ejemplo anterior mostrará:

object(stdClass)#1 (5) {
["a"] =&gt; int(1)
["b"] =&gt; int(2)
["c"] =&gt; int(3)
["d"] =&gt; int(4)
["e"] =&gt; int(5)
}

array(5) {
["a"] =&gt; int(1)
["b"] =&gt; int(2)
["c"] =&gt; int(3)
["d"] =&gt; int(4)
["e"] =&gt; int(5)
}

    **Ejemplo #2 Acceso a propiedades de objeto inválidas**



     Acceder a elementos de un objeto que contienen caracteres
     no permitidos por la convención de nombres de PHP (es decir, el guión)
     puede realizarse encapsulando el nombre del elemento con
     corchetes y comillas.

&lt;?php

$json = '{"foo-bar": 12345}';

$obj = json_decode($json);
print $obj-&gt;{'foo-bar'}; // 12345

?&gt;

    **Ejemplo #3 Errores comunes al usar la función json_decode()**

&lt;?php

// Las siguientes cadenas son válidas en JavaScript pero no en JSON

// El nombre y el valor deben estar rodeados de comillas dobles.
// Las comillas simples no son válidas.
$bad_json = "{ 'bar': 'baz' }";
json_decode($bad_json); // null

// El nombre debe estar rodeado de comillas dobles.
$bad_json = '{ bar: "baz" }';
json_decode($bad_json); // null

// La coma final no está permitida.
$bad_json = '{ bar: "baz", }';
json_decode($bad_json); // null

?&gt;

    **Ejemplo #4 Errores con el parámetro depth**

&lt;?php
// Codificación de datos con un nivel máximo de anidamiento de 4 (array -&gt; array -&gt; array -&gt; string)
$json = json_encode(
array(
1 =&gt; array(
'English' =&gt; array(
'One',
'January'
),
'French' =&gt; array(
'Une',
'Janvier'
)
)
)
);

// Definición de errores
$constants = get_defined_constants(true);
$json*errors = array();
foreach ($constants["json"] as $name =&gt; $value) {
 if (!strncmp($name, "JSON_ERROR*", 11)) {
$json_errors[$value] = $name;
}
}

$json = json_encode(
array(
1 =&gt; array(
'English' =&gt; array(
'One',
'January'
),
'French' =&gt; array(
'Une',
'Janvier'
)
)
)
);

// Mostrar errores para diferentes niveles de anidamiento.
var_dump(json_decode($json, true, 4));
echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;

var_dump(json_decode($json, true, 3));
echo 'Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

array(1) {
[1]=&gt;
array(2) {
["English"]=&gt;
array(2) {
[0]=&gt;
string(3) "One"
[1]=&gt;
string(7) "January"
}
["French"]=&gt;
array(2) {
[0]=&gt;
string(3) "Une"
[1]=&gt;
string(7) "Janvier"
}
}
}
Last error: No error

NULL
Last error: Maximum stack depth exceeded

    **Ejemplo #5 Ejemplo con json_decode()** y grandes enteros

&lt;?php
$json = '{"number": 12345678901234567890}';

var_dump(json_decode($json));
var_dump(json_decode($json, false, 512, JSON_BIGINT_AS_STRING));

?&gt;

    El ejemplo anterior mostrará:

object(stdClass)#1 (1) {
["number"]=&gt;
float(1.2345678901235E+19)
}
object(stdClass)#1 (1) {
["number"]=&gt;
string(20) "12345678901234567890"
}

### Notas

**Nota**:

    La especificación JSON no forma parte de Javascript
    sino de un subproyecto de Javascript.

**Nota**:

    Si ocurre un error durante la decodificación, la función
    [json_last_error()](#function.json-last-error)
    (o [json_last_error_msg()](#function.json-last-error-msg) con PHP5.5+)
    podrá ser utilizada para
    determinar la naturaleza exacta del error.

### Ver también

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [json_last_error()](#function.json-last-error) - Devuelve el último error JSON

    - [json_last_error_msg()](#function.json-last-error-msg) - Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()

# json_encode

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL json &gt;= 1.2.0)

json_encode — Retorna la representación JSON de un valor

### Descripción

**json_encode**([mixed](#language.types.mixed) $value, [int](#language.types.integer) $flags = 0, [int](#language.types.integer) $depth = 512): [string](#language.types.string)|[false](#language.types.singleton)

Retorna una cadena de caracteres que contiene la representación JSON del valor
value. Si el parámetro es un [array](#language.types.array) o un [object](#language.types.object), será
serializado de manera recursiva.

Si uno de los valores a serializar es un objeto, entonces por defecto solo las propiedades
visibles públicamente serán incluidas. Una clase puede implementar
[JsonSerializable](#class.jsonserializable) para controlar cómo sus valores
son serializados en JSON.

La codificación es afectada por los flags proporcionados.
Además, la codificación de valores flotantes depende del valor de
[serialize_precision](#ini.serialize-precision).

### Parámetros

     value


       El valor a codificar. Puede ser de cualquier tipo, excepto
       un [resource](#language.types.resource).




       Todas las cadenas deben estar codificadas en UTF-8.





**Nota**:

PHP implements a superset of JSON as specified in the original
[» RFC 7159](https://datatracker.ietf.org/doc/html/rfc7159).

     flags


       Máscara de bits compuesta por
       **[JSON_FORCE_OBJECT](#constant.json-force-object)**,
       **[JSON_HEX_QUOT](#constant.json-hex-quot)**,
       **[JSON_HEX_TAG](#constant.json-hex-tag)**,
       **[JSON_HEX_AMP](#constant.json-hex-amp)**,
       **[JSON_HEX_APOS](#constant.json-hex-apos)**,
       **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)**,
       **[JSON_INVALID_UTF8_SUBSTITUTE](#constant.json-invalid-utf8-substitute)**,
       **[JSON_NUMERIC_CHECK](#constant.json-numeric-check)**,
       **[JSON_PARTIAL_OUTPUT_ON_ERROR](#constant.json-partial-output-on-error)**,
       **[JSON_PRESERVE_ZERO_FRACTION](#constant.json-preserve-zero-fraction)**,
       **[JSON_PRETTY_PRINT](#constant.json-pretty-print)**,
       **[JSON_UNESCAPED_LINE_TERMINATORS](#constant.json-unescaped-line-terminators)**,
       **[JSON_UNESCAPED_SLASHES](#constant.json-unescaped-slashes)**,
       **[JSON_UNESCAPED_UNICODE](#constant.json-unescaped-unicode)**,
       **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**.
       El comportamiento de estas constantes se describe en la página
       de las [constantes JSON](#json.constants).






     depth


       Define la profundidad máxima. Debe ser superior a cero.





### Valores devueltos

Retorna un JSON codificado como [string](#language.types.string) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        El flags
        **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)** fue añadido.




       7.2.0

        Los flags
        **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)** y
        **[JSON_INVALID_UTF8_SUBSTITUTE](#constant.json-invalid-utf8-substitute)** fueron añadidos.




       7.1.0

        El flags
        **[JSON_UNESCAPED_LINE_TERMINATORS](#constant.json-unescaped-line-terminators)** fue añadido.




       7.1.0

        [serialize_precision](#ini.serialize-precision) es
        utilizado en lugar de [precision](#ini.precision)
        al codificar valores [float](#language.types.float).





### Ejemplos

    **Ejemplo #1 Ejemplo con json_encode()**

&lt;?php
$arr = array('a' =&gt; 1, 'b' =&gt; 2, 'c' =&gt; 3, 'd' =&gt; 4, 'e' =&gt; 5);

echo json_encode($arr);
?&gt;

    El ejemplo anterior mostrará:

{"a":1,"b":2,"c":3,"d":4,"e":5}

    **Ejemplo #2 Ejemplo con json_encode()** mostrando algunos flags en acción

&lt;?php
$a = array('&lt;foo&gt;',"'bar'",'"baz"','&amp;blong&amp;', "\xc3\xa9");

echo "Normal : ", json_encode($a), "\n";
echo "Tags : ",    json_encode($a, JSON_HEX_TAG), "\n";
echo "Apos : ", json_encode($a, JSON_HEX_APOS), "\n";
echo "Quot : ",    json_encode($a, JSON_HEX_QUOT), "\n";
echo "Amp : ", json_encode($a, JSON_HEX_AMP), "\n";
echo "Unicode : ", json_encode($a, JSON_UNESCAPED_UNICODE), "\n";
echo "Todas : ", json_encode($a, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE), "\n\n";

$b = array();

echo "Array vacío como array : ", json_encode($b), "\n";
echo "Array vacío como objeto : ", json_encode($b, JSON_FORCE_OBJECT), "\n\n";

$c = array(array(1,2,3));

echo "Array no asociativo como array : ", json_encode($c), "\n";
echo "Array no asociativo como objeto : ", json_encode($c, JSON_FORCE_OBJECT), "\n\n";

$d = array('foo' =&gt; 'bar', 'baz' =&gt; 'long');

echo "Array asociativo mostrado como objeto: ", json_encode($d), "\n";
echo "Array asociativo mostrado como objeto: ", json_encode($d, JSON_FORCE_OBJECT), "\n\n";
?&gt;

    El ejemplo anterior mostrará:

Normal : ["&lt;foo&gt;","'bar'","\"baz\"","&amp;blong&amp;","\u00e9"]
Tags : ["\u003Cfoo\u003E","'bar'","\"baz\"","&amp;blong&amp;","\u00e9"]
Apos : ["&lt;foo&gt;","\u0027bar\u0027","\"baz\"","&amp;blong&amp;","\u00e9"]
Quot : ["&lt;foo&gt;","'bar'","\u0022baz\u0022","&amp;blong&amp;","\u00e9"]
Amp : ["&lt;foo&gt;","'bar'","\"baz\"","\u0026blong\u0026","\u00e9"]
Unicode : ["&lt;foo&gt;","'bar'","\"baz\"","&amp;blong&amp;","é"]
Todas : ["\u003Cfoo\u003E","\u0027bar\u0027","\u0022baz\u0022","\u0026blong\u0026","é"]

Array vacío como array : []
Array vacío como objeto : {}

Array no asociativo como array : [[1,2,3]]
Array no asociativo como objeto : {"0":{"0":1,"1":2,"2":3}}

Array asociativo mostrado como objeto: {"foo":"bar","baz":"long"}
Array asociativo mostrado como objeto: {"foo":"bar","baz":"long"}

    **Ejemplo #3 Ejemplo con la opción JSON_NUMERIC_CHECK**

&lt;?php
echo "Las cadenas que representan números son convertidas automáticamente a números".PHP_EOL;
$numbers = array('+123123', '-123123', '1.2e3', '0.00001');
var_dump(
 $numbers,
 json_encode($numbers, JSON_NUMERIC_CHECK)
);
echo "Cadenas que contienen números no formateados correctamente".PHP_EOL;
$strings = array('+a33123456789', 'a123');
var_dump(
 $strings,
 json_encode($strings, JSON_NUMERIC_CHECK)
);
?&gt;

    Resultado del ejemplo anterior es similar a:

Las cadenas que representan números son convertidas automáticamente a números
array(4) {
[0]=&gt;
string(7) "+123123"
[1]=&gt;
string(7) "-123123"
[2]=&gt;
string(5) "1.2e3"
[3]=&gt;
string(7) "0.00001"
}
string(28) "[123123,-123123,1200,1.0e-5]"
Cadenas que contienen números no formateados correctamente
array(2) {
[0]=&gt;
string(13) "+a33123456789"
[1]=&gt;
string(4) "a123"
}
string(24) "["+a33123456789","a123"]"

    **Ejemplo #4 Ejemplo con un array secuencial y un array no secuencial**

&lt;?php
echo "Array secuencial".PHP_EOL;
$sequential = array("foo", "bar", "baz", "blong");
var_dump(
 $sequential,
 json_encode($sequential)
);

echo PHP_EOL."Array no secuencial".PHP_EOL;
$nonsequential = array(1=&gt;"foo", 2=&gt;"bar", 3=&gt;"baz", 4=&gt;"blong");
var_dump(
 $nonsequential,
 json_encode($nonsequential)
);

echo PHP_EOL."Array secuencial con una clave eliminada".PHP_EOL;
unset($sequential[1]);
var_dump(
 $sequential,
 json_encode($sequential)
);
?&gt;

    El ejemplo anterior mostrará:

Array secuencial
array(4) {
[0]=&gt;
string(3) "foo"
[1]=&gt;
string(3) "bar"
[2]=&gt;
string(3) "baz"
[3]=&gt;
string(5) "blong"
}
string(27) "["foo","bar","baz","blong"]"

Array no secuencial
array(4) {
[1]=&gt;
string(3) "foo"
[2]=&gt;
string(3) "bar"
[3]=&gt;
string(3) "baz"
[4]=&gt;
string(5) "blong"
}
string(43) "{"1":"foo","2":"bar","3":"baz","4":"blong"}"

Array secuencial con una clave eliminada
array(3) {
[0]=&gt;
string(3) "foo"
[2]=&gt;
string(3) "baz"
[3]=&gt;
string(5) "blong"
}
string(33) "{"0":"foo","2":"baz","3":"blong"}"

    **Ejemplo #5 Ejemplo con la opción [JSON_PRESERVE_ZERO_FRACTION](#constant.json-preserve-zero-fraction)**

&lt;?php
var_dump(json_encode(12.0, JSON_PRESERVE_ZERO_FRACTION));
var_dump(json_encode(12.0));
?&gt;

    El ejemplo anterior mostrará:

string(4) "12.0"
string(2) "12"

### Notas

**Nota**:

    Cuando ocurre un error durante la codificación, la función
    [json_last_error()](#function.json-last-error) puede ser utilizada para determinar
    la naturaleza exacta del error.

**Nota**:

    Al codificar un array, si las claves no están en forma de una secuencia numérica continua
    comenzando en 0, todas las claves serán codificadas como cadenas de caracteres,
    y especificadas explícitamente para cada par clave-valor.

**Nota**:

    Al igual que el codificador JSON de referencia, la función
    **json_encode()** generará un JSON que es un valor simple
    (ni un objeto, ni un array) si una [string](#language.types.string), un [int](#language.types.integer), un
    [float](#language.types.float), o un [bool](#language.types.boolean) es proporcionado como entrada para el parámetro
    value. Aunque algunos decodificadores
    aceptan estos valores como JSON válido, otros no los aceptan,
    sabiendo que la especificación es ambigua sobre este punto.




    Para resumir, siempre se debe probar que su decodificador JSON puede manejar
    la salida que se genera desde la función
    **json_encode()**.

### Ver también

    - [JsonSerializable](#class.jsonserializable)

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

    - [json_last_error()](#function.json-last-error) - Devuelve el último error JSON

    - [json_last_error_msg()](#function.json-last-error-msg) - Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()

    - [serialize()](#function.serialize) - Genera una representación almacenable de un valor

# json_last_error

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

json_last_error — Devuelve el último error JSON

### Descripción

**json_last_error**(): [int](#language.types.integer)

Devuelve el último error, si ha ocurrido, durante la última
operación de validación/codificación/decodificación JSON, que no haya especificado
**[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una de las siguientes constantes:

   <caption>**Códigos de error JSON**</caption>
   
    
     
      Constante
      Significado
      Disponibilidad


      **[JSON_ERROR_NONE](#constant.json-error-none)**
      No ha ocurrido ningún error
       



      **[JSON_ERROR_DEPTH](#constant.json-error-depth)**
      Se ha alcanzado la profundidad máxima de la pila
       



      **[JSON_ERROR_STATE_MISMATCH](#constant.json-error-state-mismatch)**
      JSON inválido o mal formado
       



      **[JSON_ERROR_CTRL_CHAR](#constant.json-error-ctrl-char)**
      Error durante el control de caracteres; probablemente un codificación incorrecta
       



      **[JSON_ERROR_SYNTAX](#constant.json-error-syntax)**
      Error de sintaxis
       



      **[JSON_ERROR_UTF8](#constant.json-error-utf8)**
      Caracteres UTF-8 malformados, posiblemente mal codificados
       



      **[JSON_ERROR_RECURSION](#constant.json-error-recursion)**
      Una o más referencias recursivas están presentes
       en el valor a codificar
       



      **[JSON_ERROR_INF_OR_NAN](#constant.json-error-inf-or-nan)**

       Una o más valores
       [**<a href="#constant.nan">NAN](#language.types.float.nan)**</a>
       o [**<a href="#constant.inf">INF](#function.is-infinite)**</a>
       están presentes en el valor a codificar.

       



      **[JSON_ERROR_UNSUPPORTED_TYPE](#constant.json-error-unsupported-type)**
      Se ha proporcionado un valor de un tipo que no puede ser codificado
       



      **[JSON_ERROR_INVALID_PROPERTY_NAME](#constant.json-error-invalid-property-name)**
      Se ha proporcionado un nombre de propiedad que no puede ser codificado
       



      **[JSON_ERROR_UTF16](#constant.json-error-utf16)**
      Caracteres UTF-16 mal formados, probablemente mal codificados
       


### Ejemplos

    **Ejemplo #1 Ejemplo con json_last_error()**

&lt;?php
// Una cadena JSON válida
$json[] = '{"Organisation": "Équipe de Documentation PHP"}';

// Una cadena json inválida que va a generar un error de sintaxis,
// aquí, uso de ' en lugar de "
$json[] = "{'Organisation': 'Équipe de Documentation PHP'}";

foreach ($json as $string) {
    echo 'Decodificación: ' . $string;
    json_decode($string);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - Sin errores';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Profundidad máxima alcanzada';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Inadecuación de modos o underflow';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Error durante el control de caracteres';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Error de sintaxis; JSON malformado';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Caracteres UTF-8 malformados, probablemente un error de codificación';
        break;
        default:
            echo ' - Error desconocido';
        break;
    }

    echo PHP_EOL;

}
?&gt;

    El ejemplo anterior mostrará:

Decodificación: {"Organisation": "Équipe de Documentation PHP"} - Sin errores
Decodificación: {'Organisation': 'Équipe de Documentation PHP'} - Error de sintaxis; JSON malformado

    **Ejemplo #2 json_last_error()** con [json_encode()](#function.json-encode)

&lt;?php
// Una secuencia UTF8 inválida
$text = "\xB1\x31";

$json  = json_encode($text);
$error = json_last_error();

var_dump($json, $error === JSON_ERROR_UTF8);
?&gt;

    El ejemplo anterior mostrará:

string(4) "null"
bool(true)

    **Ejemplo #3 json_last_error()** y **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**

&lt;?php
// Una secuencia UTF8 inválida que causa JSON_ERROR_UTF8
json_encode("\xB1\x31");

// Esto no produce un error JSON
json_encode('okay', JSON_THROW_ON_ERROR);

// El estado de error global no ha sido modificado por el json_encode() anterior
var_dump(json_last_error() === JSON_ERROR_UTF8);
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [json_last_error_msg()](#function.json-last-error-msg) - Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

# json_last_error_msg

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

json_last_error_msg — Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()

### Descripción

**json_last_error_msg**(): [string](#language.types.string)

**json_last_error_msg**(): [string](#language.types.string)

Devuelve el string de error del último llamado a [json_validate()](#function.json-validate), [json_encode()](#function.json-encode) o [json_decode()](#function.json-decode),
que no haya especificado **[JSON_THROW_ON_ERROR](#constant.json-throw-on-error)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error en caso de éxito, o
"No error" si no ha ocurrido ningún error,
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [json_last_error()](#function.json-last-error) - Devuelve el último error JSON

# json_validate

(PHP 8 &gt;= 8.3.0)

json_validate — Verifica si una string contiene JSON válido

### Descripción

**json_validate**([string](#language.types.string) $json, [int](#language.types.integer) $depth = 512, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Devuelve si la [string](#language.types.string) dada es sintácticamente JSON válido.
Si **json_validate()** devuelve **[true](#constant.true)**, [json_decode()](#function.json-decode)
decodificará con éxito la string dada utilizando los mismos
depth y flags.

Si **json_validate()** devuelve **[false](#constant.false)**, la causa
puede ser recuperada utilizando [json_last_error()](#function.json-last-error) y
[json_last_error_msg()](#function.json-last-error-msg).

**json_validate()** utiliza menos memoria que
[json_decode()](#function.json-decode) si el contenido JSON decodificado no es
utilizado, ya que no necesita construir la estructura de array
o de objeto que contiene el contenido.

**Precaución**

    Llamar a **json_validate()** inmediatamente antes
    de [json_decode()](#function.json-decode) analizará innecesariamente la string
    dos veces, ya que [json_decode()](#function.json-decode) realiza
    implícitamente una validación durante la decodificación.




    **json_validate()** no debe ser utilizado
    a menos que la decodificación del contenido JSON no sea inmediatamente utilizada
    y que sea necesario saber si la string contiene JSON válido.

### Parámetros

     json


       La string a validar.




       Esta función solo funciona con strings codificadas en UTF-8.





**Nota**:

PHP implements a superset of JSON as specified in the original
[» RFC 7159](https://datatracker.ietf.org/doc/html/rfc7159).

     depth


       El nivel máximo de profundidad de la estructura a decodificar.
       El valor debe ser mayor que 0,
       y menor o igual a 2147483647.






     flags


       Actualmente, solo
       **[JSON_INVALID_UTF8_IGNORE](#constant.json-invalid-utf8-ignore)**
       es aceptado.





### Valores devueltos

Devuelve **[true](#constant.true)** si la string dada es sintácticamente JSON válido, de lo contrario
devuelve **[false](#constant.false)**.

### Errores/Excepciones

Si depth está fuera del rango permitido,
se lanza una [ValueError](#class.valueerror).

Si flags no es un flag válido,
se lanza una [ValueError](#class.valueerror).

### Ejemplos

    **Ejemplo #1 Ejemplos de json_validate()**

&lt;?php
var_dump(json_validate('{ "test": { "foo": "bar" } }'));
var_dump(json_validate('{ "": "": "" } }'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

    - [json_last_error()](#function.json-last-error) - Devuelve el último error JSON

    - [json_last_error_msg()](#function.json-last-error-msg) - Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()

## Tabla de contenidos

- [json_decode](#function.json-decode) — Decodifica una cadena JSON
- [json_encode](#function.json-encode) — Retorna la representación JSON de un valor
- [json_last_error](#function.json-last-error) — Devuelve el último error JSON
- [json_last_error_msg](#function.json-last-error-msg) — Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()
- [json_validate](#function.json-validate) — Verifica si una string contiene JSON válido

- [Introducción](#intro.json)
- [Instalación/Configuración](#json.setup)<li>[Instalación](#json.installation)
  </li>- [Constantes predefinidas](#json.constants)
- [JsonException](#class.jsonexception) — La clase JsonException
- [JsonSerializable](#class.jsonserializable) — La interfaz JsonSerializable<li>[JsonSerializable::jsonSerialize](#jsonserializable.jsonserialize) — Especifica los datos que deben ser serializados en JSON
  </li>- [Funciones de JSON](#ref.json)<li>[json_decode](#function.json-decode) — Decodifica una cadena JSON
- [json_encode](#function.json-encode) — Retorna la representación JSON de un valor
- [json_last_error](#function.json-last-error) — Devuelve el último error JSON
- [json_last_error_msg](#function.json-last-error-msg) — Devuelve el mensaje del último error ocurrido durante la llamada a la función json_validate(), json_encode() o json_decode()
- [json_validate](#function.json-validate) — Verifica si una string contiene JSON válido
  </li>
