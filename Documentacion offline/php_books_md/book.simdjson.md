# Simdjson

# Introducción

Proporciona un decodificado JSON más rápido gracias a las ligaduras simdjson para PHP (Single Instruction, Multiple Data)

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#simdjson.installation)

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/simdjson](https://pecl.php.net/package/simdjson).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SIMDJSON_ERR_CAPACITY](#constant.simdjson-err-capacity)**
     ([int](#language.types.integer))



      Este analizador no puede manejar un documento tan voluminoso.
      Se lanza al analizar una cadena JSON de más de 4 Gio.





     **[SIMDJSON_ERR_TAPE_ERROR](#constant.simdjson-err-tape-error)**
     ([int](#language.types.integer))



      El documento JSON tiene una estructura incorrecta: comas faltantes o superfluas, llaves, claves faltantes, etc.





     **[SIMDJSON_ERR_DEPTH_ERROR](#constant.simdjson-err-depth-error)**
     ([int](#language.types.integer))



      El documento JSON era demasiado profundo (demasiados objetos y arrays anidados)





     **[SIMDJSON_ERR_STRING_ERROR](#constant.simdjson-err-string-error)**
     ([int](#language.types.integer))


     Problema al analizar una cadena





     **[SIMDJSON_ERR_T_ATOM_ERROR](#constant.simdjson-err-t-atom-error)**
     ([int](#language.types.integer))


     Problema al analizar un átomo que comienza con la letra 't'





     **[SIMDJSON_ERR_F_ATOM_ERROR](#constant.simdjson-err-f-atom-error)**
     ([int](#language.types.integer))



      Problema al analizar un átomo que comienza con la letra 'f'





     **[SIMDJSON_ERR_N_ATOM_ERROR](#constant.simdjson-err-n-atom-error)**
     ([int](#language.types.integer))



      Problema al analizar un átomo que comienza con la letra 'n'





     **[SIMDJSON_ERR_NUMBER_ERROR](#constant.simdjson-err-number-error)**
     ([int](#language.types.integer))



      Problema al analizar un número





     **[SIMDJSON_ERR_UTF8_ERROR](#constant.simdjson-err-utf8-error)**
     ([int](#language.types.integer))



      La entrada no es un UTF-8 válido





     **[SIMDJSON_ERR_UNINITIALIZED](#constant.simdjson-err-uninitialized)**
     ([int](#language.types.integer))



      El analizador utilizado por simdjson no está inicializado. No debería ocurrir.





     **[SIMDJSON_ERR_EMPTY](#constant.simdjson-err-empty)**
     ([int](#language.types.integer))


     Vacío: no se encontró JSON





     **[SIMDJSON_ERR_UNESCAPED_CHARS](#constant.simdjson-err-unescaped-chars)**
     ([int](#language.types.integer))


     Con las cadenas, algunos caracteres deben ser escapados, se encontraron caracteres no escapados





     **[SIMDJSON_ERR_UNCLOSED_STRING](#constant.simdjson-err-unclosed-string)**
     ([int](#language.types.integer))



      Una cadena está abierta, pero nunca cerrada.





     **[SIMDJSON_ERR_UNSUPPORTED_ARCHITECTURE](#constant.simdjson-err-unsupported-architecture)**
     ([int](#language.types.integer))



      simdjson no tiene una implementación compatible con esta arquitectura CPU (¿tal vez un CPU no-SIMD?).





     **[SIMDJSON_ERR_INCORRECT_TYPE](#constant.simdjson-err-incorrect-type)**
     ([int](#language.types.integer))



      No debería ocurrir.





     **[SIMDJSON_ERR_NUMBER_OUT_OF_RANGE](#constant.simdjson-err-number-out-of-range)**
     ([int](#language.types.integer))



      El número JSON es demasiado grande o demasiado pequeño para caber en el tipo solicitado.
      Es importante señalar que la biblioteca C simdjson es un fork y que este error es ignorado para coincidir con la gestión de PHP
      de los números JSON que son demasiado grandes o demasiado pequeños.





     **[SIMDJSON_ERR_INDEX_OUT_OF_BOUNDS](#constant.simdjson-err-index-out-of-bounds)**
     ([int](#language.types.integer))



      No debería ocurrir.





     **[SIMDJSON_ERR_NO_SUCH_FIELD](#constant.simdjson-err-no-such-field)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_IO_ERROR](#constant.simdjson-err-io-error)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_INVALID_JSON_POINTER](#constant.simdjson-err-invalid-json-pointer)**
     ([int](#language.types.integer))



      Sintaxis de puntero JSON inválida en [simdjson_key_value()](#function.simdjson-key-value)
      y otras funciones que aceptan un puntero JSON $key.





     **[SIMDJSON_ERR_INVALID_URI_FRAGMENT](#constant.simdjson-err-invalid-uri-fragment)**
     ([int](#language.types.integer))


     Sintaxis de fragmento URI inválida.





     **[SIMDJSON_ERR_UNEXPECTED_ERROR](#constant.simdjson-err-unexpected-error)**
     ([int](#language.types.integer))


     Error inesperado, considere reportar este problema ya que puede haber encontrado un bug en el PECL simdjson





     **[SIMDJSON_ERR_PARSER_IN_USE](#constant.simdjson-err-parser-in-use)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_OUT_OF_ORDER_ITERATION](#constant.simdjson-err-out-of-order-iteration)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_INSUFFICIENT_PADDING](#constant.simdjson-err-insufficient-padding)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_INCOMPLETE_ARRAY_OR_OBJECT](#constant.simdjson-err-incomplete-array-or-object)**
     ([int](#language.types.integer))


     El documento JSON terminó prematuramente en medio de un objeto o un array.





     **[SIMDJSON_ERR_SCALAR_DOCUMENT_AS_VALUE](#constant.simdjson-err-scalar-document-as-value)**
     ([int](#language.types.integer))


     No debería ocurrir.





     **[SIMDJSON_ERR_OUT_OF_BOUNDS](#constant.simdjson-err-out-of-bounds)**
     ([int](#language.types.integer))


     Intento de acceder a una ubicación fuera del documento.





     **[SIMDJSON_ERR_TRAILING_CONTENT](#constant.simdjson-err-trailing-content)**
     ([int](#language.types.integer))








     **[SIMDJSON_ERR_KEY_COUNT_NOT_COUNTABLE](#constant.simdjson-err-key-count-not-countable)**
     ([int](#language.types.integer))








     **[SIMDJSON_ERR_INVALID_PROPERTY](#constant.simdjson-err-invalid-property)**
     ([int](#language.types.integer))


     Nombre de propiedad inválido para un [stdClass](#class.stdclass) al decodificar un valor
     con [simdjson_decode()](#function.simdjson-decode) o [simdjson_key_value()](#function.simdjson-key-value)


# Funciones de Simdjson

# simdjson_decode

(PECL simdjson &gt;= 2.0.0)

simdjson_decode — Decodifica una cadena JSON

### Descripción

**simdjson_decode**([string](#language.types.string) $json, [bool](#language.types.boolean) $associative = **[false](#constant.false)**, [int](#language.types.integer) $depth = 512): [mixed](#language.types.mixed)

Toma una cadena codificada en JSON y la convierte en un valor PHP.
Esto utiliza una Instrucción Simultánea más Rápida, Datos Múltiples (Simultaneous Instruction, Multiple Data - SIMD)
que [json_decode()](#function.json-decode) cuando es soportada por la arquitectura del ordenador.

### Parámetros

    json


      El [string](#language.types.string) json a decodificar.




      Esta función solo funciona con cadenas codificadas en UTF-8.




      Esta función analiza las entradas válidas que
      [json_decode()](#function.json-decode) puede decodificar,
      siempre que sean inferiores a 4 Go de longitud.






    associative


      Cuando **[true](#constant.true)**, los objetos JSON serán devueltos como
      [array](#language.types.array) asociativos; cuando sean **[false](#constant.false)**, los objetos JSON serán devueltos como [object](#language.types.object)s.






    depth


      La profundidad máxima de la estructura a decodificar.
      El valor debe ser superior a 0,
      e inferior o igual a 2147483647.

      Aquellos que llamen a esta función deberían utilizar valores razonablemente pequeños,
      ya que profundidades mayores requieren más espacio de búfer y aumentarán
      la profundidad de recursión, a diferencia de la implementación actual de [json_decode()](#function.json-decode).


### Valores devueltos

Devuelve el valor codificado en json en el
tipo PHP apropiado. Los valores true, false y
null son devueltos respectivamente como **[true](#constant.true)**, **[false](#constant.false)** y **[null](#constant.null)**.

### Errores/Excepciones

Si json es inválido, una [SimdJsonException](#class.simdjsonexception) es lanzada a partir de PECL simdjson 2.1.0,
mientras que anteriormente, una [RuntimeException](#class.runtimeexception) era lanzada.

Si depth está fuera del rango permitido,
una [SimdJsonValueError](#class.simdjsonvalueerror) es lanzada a partir de PECL simdjson 3.0.0,
mientras que anteriormente, un error de nivel **[E_WARNING](#constant.e-warning)** era lanzado.

### Ejemplos

    **Ejemplo #1 Ejemplos de simdjson_decode()**

&lt;?php
$json = '{"a":1,"b":2,"c":3}';

var_dump(simdjson_decode($json));
var_dump(simdjson_decode($json, true));

?&gt;

    El ejemplo anterior mostrará:

object(stdClass)#1 (3) {
["a"]=&gt;
int(1)
["b"]=&gt;
int(2)
["c"]=&gt;
int(3)
}
array(3) {
["a"]=&gt;
int(1)
["b"]=&gt;
int(2)
["c"]=&gt;
int(3)
}

    **Ejemplo #2 Acceder a propiedades de objeto no válidas**



     Acceder a elementos en un objeto que contienen caracteres no
     permitidos por la convención de nomenclatura de PHP (por ejemplo, el guion) puede ser
     logrado encapsulando el nombre del elemento entre llaves y comillas.

&lt;?php

$json = '{"foo-bar": 12345}';

$obj = simdjson_decode($json);
print $obj-&gt;{'foo-bar'}; // 12345

?&gt;

    **Ejemplo #3 Errores comunes al usar simdjson_decode()**

&lt;?php

// las siguientes cadenas son válidas en JavaScript pero no en JSON

// el nombre y el valor deben estar encerrados entre comillas dobles
// las comillas simples no son válidas
$bad_json = "{ 'bar': 'baz' }";
simdjson_decode($bad_json); // Lanza SimdJsonException

// el nombre debe estar encerrado entre comillas dobles
$bad_json = '{ bar: "baz" }';
simdjson_decode($bad_json); // Lanza SimdJsonException

// las comas finales no están permitidas
$bad_json = '{ bar: "baz", }';
simdjson_decode($bad_json); // Lanza SimdJsonException

?&gt;

    **Ejemplo #4 Errores de depth**

&lt;?php
// Codificar datos con una profundidad máxima de 4
// (array -&gt; array -&gt; array -&gt; string)
$json = json_encode(
[
1 =&gt; [
'English' =&gt; [
'One',
'January'
],
'French' =&gt; [
'Une',
'Janvier'
]
]
]
);

// Mostrar errores para diferentes profundidades.
var_dump(simdjson_decode($json, true, 4));
try {
    var_dump(simdjson_decode($json, true, 3));
} catch (SimdJsonException $e) {
echo "Capturado: ", $e-&gt;getMessage(), "\n";
}
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
Capturado: El documento JSON era demasiado profundo (demasiados objetos y arrays anidados)

    **Ejemplo #5 simdjson_decode()** de grandes enteros

&lt;?php
$json = '{"number": 12345678901234567890}';

var_dump(simdjson_decode($json));

?&gt;

    El ejemplo anterior mostrará:

object(stdClass)#1 (1) {
["number"]=&gt;
float(1.2345678901235E+19)
}

### Notas

**Nota**:

    La especificación JSON no es JavaScript, sino un subconjunto de JavaScript.

**Nota**:

    En el caso de que la decodificación falle,
    una [SimdJsonException](#class.simdjsonexception) es lanzada
    y **SimdJsonException::getCode()** y
    **SimdJsonException::getMessage()** pueden ser utilizados
    para determinar la naturaleza exacta del error.

### Ver también

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

# simdjson_is_valid

(PECL simdjson &gt;= 2.0.0)

simdjson_is_valid — Verifica si un string JSON es válido

### Descripción

**simdjson_is_valid**([string](#language.types.string) $json, [int](#language.types.integer) $depth = 512): [bool](#language.types.boolean)

Toma un string codificado en JSON y devuelve true si es válido.

### Parámetros

    json


       El [string](#language.types.string) json a validar.




       Esta función solo funciona con strings codificados en UTF-8.




       Esta función valida las entradas que
       [json_decode()](#function.json-decode) puede decodificar,
       siempre que sean inferiores a 4 Go de longitud.






    depth


      La profundidad máxima de la estructura a decodificar.
      El valor debe ser superior a 0,
      e inferior o igual a 2147483647.

      Quienes llamen a esta función deberían utilizar valores razonablemente pequeños,
      ya que profundidades mayores requieren más espacio de búfer y aumentarán
      la profundidad de recursión, a diferencia de la implementación actual de [json_decode()](#function.json-decode).


### Valores devueltos

Devuelve **[true](#constant.true)** si json es un string JSON
válido, de lo contrario **[false](#constant.false)**.

### Errores/Excepciones

Si json es inválido, se lanza una [SimdJsonException](#class.simdjsonexception) a partir de PECL simdjson 2.1.0,
mientras que anteriormente se lanzaba una [RuntimeException](#class.runtimeexception).

Si depth está fuera del rango permitido,
se lanza una [SimdJsonValueError](#class.simdjsonvalueerror) a partir de PECL simdjson 3.0.0,
mientras que anteriormente se lanzaba un error de nivel **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplos de [simdjson_decode()](#function.simdjson-decode)**

&lt;?php
$json = '{"a":1,"b":2,"c":3}';
$invalidJson = '{"a":1,"b":2,"c":';

var_dump(simdjson_is_valid($json));
var_dump(simdjson_is_valid($invalidJson));

?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

    **Ejemplo #2 Errores de depth**

&lt;?php
// Codificar datos con una profundidad máxima de 4
// (array -&gt; array -&gt; array -&gt; string)
$json = json_encode(
[
1 =&gt; [
'English' =&gt; [
'One',
'January'
],
'French' =&gt; [
'Une',
'Janvier'
]
]
]
);

// Mostrar errores para diferentes profundidades.
var_dump(simdjson_is_valid($json, 4));
var_dump(simdjson_is_valid($json, 3));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Notas

**Nota**:

    La especificación JSON no es JavaScript, sino un subconjunto de JavaScript.

**Nota**:

    En caso de que la decodificación falle,
    se lanza una [SimdJsonException](#class.simdjsonexception)
    y **SimdJsonException::getCode()** y
    **SimdJsonException::getMessage()** pueden ser utilizados
    para determinar la naturaleza exacta del error.

### Ver también

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [json_decode()](#function.json-decode) - Decodifica una cadena JSON

# simdjson_key_count

(PECL simdjson &gt;= 2.0.0)

simdjson_key_count — Devuelve el valor a un puntero JSON.

### Descripción

**simdjson_key_count**(
    [string](#language.types.string) $json,
    [string](#language.types.string) $key,
    [int](#language.types.integer) $depth = 512,
    [bool](#language.types.boolean) $throw_if_uncountable = **[false](#constant.false)**
): [int](#language.types.integer)

Cuenta el número de elementos del objeto/array encontrado en el puntero JSON solicitado.

### Parámetros

    json


      El [string](#language.types.string) json a consultar.






    key


      El [string](#language.types.string) del puntero JSON.






    depth


      La profundidad máxima de la estructura a decodificar.
      El valor debe ser superior a 0,
      e inferior o igual a 2147483647.

      Aquellos que llamen a esta función deberían utilizar valores razonablemente pequeños,
      ya que profundidades mayores requieren más espacio de búfer y aumentarán
      la profundidad de recursión, a diferencia de la implementación actual de [json_decode()](#function.json-decode).






    throw_if_uncountable


      Cuando es verdadero, se lanzará una [SimdJsonException](#class.simdjsonexception)
      en lugar de devolver 0 cuando el valor apuntado por el JSON no es ni
      un objeto ni un array.


### Valores devueltos

Devuelve un [int](#language.types.integer) con el número de elementos del valor en el puntero JSON dado.

# simdjson_key_exists

(PECL simdjson &gt;= 2.0.0)

simdjson_key_exists — Verifica si el JSON contiene el valor referenciado por un puntero JSON.

### Descripción

**simdjson_key_exists**([string](#language.types.string) $json, [string](#language.types.string) $key, [int](#language.types.integer) $depth = ?): [bool](#language.types.boolean)

Cuenta el número de elementos del objeto/array encontrado en el puntero JSON solicitado.

### Parámetros

    json


      El [string](#language.types.string) json a consultar.






    key


      El [string](#language.types.string) del puntero JSON.






    depth


      La profundidad máxima de la estructura a decodificar.
      El valor debe ser superior a 0,
      e inferior o igual a 2147483647.

      Los que llamen a esta función deberían utilizar valores razonablemente pequeños,
      ya que profundidades mayores requieren más espacio de búfer y aumentarán
      la profundidad de recursión, a diferencia de la implementación actual de [json_decode()](#function.json-decode).






    throw_if_uncountable


      Cuando es verdadero, se lanzará una [SimdJsonException](#class.simdjsonexception)
      en lugar de devolver 0 cuando el valor apuntado por el JSON no es ni
      un objeto ni un array.


### Valores devueltos

Devuelve **[true](#constant.true)** si el puntero JSON es válido y referencia un valor encontrado en una cadena JSON válida.
Devuelve **[false](#constant.false)** si el JSON es válido pero no contiene el puntero JSON.

# simdjson_key_value

(PECL simdjson &gt;= 2.0.0)

simdjson_key_value — Decodifica el valor de una cadena JSON situada en el indicador JSON solicitado.

### Descripción

**simdjson_key_value**(
    [string](#language.types.string) $json,
    [string](#language.types.string) $key,
    [bool](#language.types.boolean) $associative = **[false](#constant.false)**,
    [int](#language.types.integer) $depth = 512
): [mixed](#language.types.mixed)

Decodifica y devuelve el valor encontrado en el indicador JSON solicitado.

### Parámetros

    json


      El json [string](#language.types.string) a interrogar y decodificar.




       Esta función solo funciona con cadenas codificadas en UTF-8.




       Esta función analiza las entradas válidas que
       [json_decode()](#function.json-decode) puede decodificar,
       siempre que sean inferiores a 4 Go de longitud.






    key


      El [string](#language.types.string) del puntero JSON.






    associative


      Cuando **[true](#constant.true)** los objetos JSON serán devueltos en forma
      de [array](#language.types.array) asociativos; cuando son **[false](#constant.false)**, los objetos JSON serán devueltos en forma de [object](#language.types.object)s.






    depth


      La profundidad máxima de la estructura a decodificar.
      El valor debe ser superior a 0,
      e inferior o igual a 2147483647.

      Quienes llamen a esta función deberían utilizar valores razonablemente pequeños,
      ya que profundidades mayores requieren más espacio de búfer y aumentarán
      la profundidad de recursión, a diferencia de la implementación actual de [json_decode()](#function.json-decode).


### Valores devueltos

Devuelve la parte del valor codificado en json
que key referencia en el tipo PHP apropiado.
Los valores true, false y
null son devueltos respectivamente como **[true](#constant.true)**, **[false](#constant.false)** y **[null](#constant.null)**.

### Errores/Excepciones

Si json es inválido, una [SimdJsonException](#class.simdjsonexception) es lanzada a partir de PECL simdjson 2.1.0,
mientras que anteriormente, una [RuntimeException](#class.runtimeexception) era lanzada.

Si depth está fuera del rango permitido,
una [SimdJsonValueError](#class.simdjsonvalueerror) es lanzada a partir de PECL simdjson 3.0.0,
mientras que anteriormente, un error de nivel **[E_WARNING](#constant.e-warning)** era lanzado.

### Ver también

    - [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

    - [simdjson_decode()](#function.simdjson-decode) - Decodifica una cadena JSON

## Tabla de contenidos

- [simdjson_decode](#function.simdjson-decode) — Decodifica una cadena JSON
- [simdjson_is_valid](#function.simdjson-is-valid) — Verifica si un string JSON es válido
- [simdjson_key_count](#function.simdjson-key-count) — Devuelve el valor a un puntero JSON.
- [simdjson_key_exists](#function.simdjson-key-exists) — Verifica si el JSON contiene el valor referenciado por un puntero JSON.
- [simdjson_key_value](#function.simdjson-key-value) — Decodifica el valor de una cadena JSON situada en el indicador JSON solicitado.

# La clase SimdJsonException

(PECL simdjson &gt;= 2.1.0)

## Introducción

    Excepción lanzada si [simdjson_decode()](#function.simdjson-decode),
    [simdjson_key_count()](#function.simdjson-key-count),
    [simdjson_key_exists()](#function.simdjson-key-exists),
    o [simdjson_key_value()](#function.simdjson-key-value).

    Para obtener los valores posibles, ver las [constantes de error simdjson](#simdjson.constants).

## Sinopsis de la Clase

    ****




      class **SimdJsonException**



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

}

# La clase SimdJsonValueError

(PECL simdjson &gt;= 3.0.0)

## Introducción

    Una excepción **SimdJsonValueError** es lanzada cuando el
    tipo de un argumento de una función de simdjson es correcto pero el valor
    de éste es incorrecto.
    Por ejemplo, cuando la decodificación JSON $depth no es positiva o cuando $depth es demasiado grande.

## Sinopsis de la Clase

    ****




      class **SimdJsonValueError**



      extends
       [ValueError](#class.valueerror)

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

## Historial de cambios

       Versión
       Descripción






       PHP 8.0.0

        **SimdJsonValueError** extiende ahora [ValueError](#class.valueerror)
        en lugar de [Error](#class.error).





- [Introducción](#intro.simdjson)
- [Instalación/Configuración](#simdjson.setup)<li>[Instalación](#simdjson.installation)
  </li>- [Constantes predefinidas](#simdjson.constants)
- [Funciones de Simdjson](#ref.simdjson)<li>[simdjson_decode](#function.simdjson-decode) — Decodifica una cadena JSON
- [simdjson_is_valid](#function.simdjson-is-valid) — Verifica si un string JSON es válido
- [simdjson_key_count](#function.simdjson-key-count) — Devuelve el valor a un puntero JSON.
- [simdjson_key_exists](#function.simdjson-key-exists) — Verifica si el JSON contiene el valor referenciado por un puntero JSON.
- [simdjson_key_value](#function.simdjson-key-value) — Decodifica el valor de una cadena JSON situada en el indicador JSON solicitado.
  </li>- [SimdJsonException](#class.simdjsonexception) — La clase SimdJsonException
- [SimdJsonValueError](#class.simdjsonvalueerror) — La clase SimdJsonValueError
