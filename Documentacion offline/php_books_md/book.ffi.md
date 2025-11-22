# Interfaz de función externa (Foreign Function Interface)

# Introducción

Esta extensión permite cargar bibliotecas compartidas (.DLL o
.so), llamar a funciones C y acceder a estructuras de datos C desde PHP, sin necesidad de conocer la API de extensión Zend, y sin tener que aprender un tercer lenguaje "intermedio".
La API pública se implementa en forma de una clase única [FFI](#class.ffi) con
varios métodos estáticos (algunos de los cuales pueden ser llamados dinámicamente), y
métodos de objeto sobrecargados, que realizan la interacción real con los datos C.

**Precaución**

    La extensión FFI es peligrosa, ya que permite interfaces con el sistema a un nivel muy bajo.
    Solo debe ser utilizada por desarrolladores con conocimiento práctico del lenguaje C
    y de las API C utilizadas. Para minimizar los riesgos, el uso de la API FFI puede ser restringido
    con la directiva php.ini [ffi.enable](#ini.ffi.enable).

**Nota**:

    La extensión FFI no hace obsoleta la API de extensión clásica de PHP;
    simplemente se proporciona para la interfaz ad-hoc con funciones y estructuras de datos C.

**Sugerencia**

    Actualmente, el acceso a las estructuras de datos FFI es significativamente (aproximadamente 2 veces) más lento
    que el acceso a los arrays y objetos nativos de PHP. Por lo tanto, no es útil utilizar
    la extensión FFI para la velocidad; sin embargo, puede ser aconsejable utilizarla para reducir
    el uso de memoria.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ffi.requirements)
- [Instalación](#ffi.installation)
- [Configuración en tiempo de ejecución](#ffi.configuration)

    ## Requerimientos

    Esta extensión requiere que la [» biblioteca libffi](https://sourceware.org/libffi/)
    esté instalada.

## Instalación

Para activar la extensión FFI, PHP debe ser configurado con
**--with-ffi**.

Los usuarios de Windows deben incluir php_ffi.dll en php.ini
para activar la extensión FFI.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

    <caption>**FFI Opciones de configuración**</caption>



       Nombre
       Por defecto
       Cambiable
       Historial de cambios






       [ffi.enable](#ini.ffi.enable)
       "preload"
       **[INI_SYSTEM](#constant.ini-system)**
        



       [ffi.preload](#ini.ffi.preload)
       ""
       **[INI_SYSTEM](#constant.ini-system)**
        




Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      ffi.enable
      [string](#language.types.string)



       Permite activar ("true") o desactivar
       ("false") el uso de la API FFI, o restringirlo únicamente
       a la interfaz CLI SAPI y a los ficheros pre-cargados ("preload").




       Las restricciones de la API FFI afectan solo a la clase [FFI](#class.ffi),
       pero no a las funciones sobrecargadas de los objetos [FFI\CData](#class.ffi-cdata).
       Esto significa que es posible crear ciertos objetos [FFI\CData](#class.ffi-cdata)
       en ficheros pre-cargados y luego utilizarlos directamente en scripts PHP.







      ffi.preload
      [string](#language.types.string)



       Permite la pre-carga de las ligaduras FFI al inicio, lo cual no es posible con [FFI::load()](#ffi.load)
       si [opcache.preload_user](#ini.opcache.preload-user) está definido.
       Esta directiva acepta una lista de nombres de ficheros delimitada por **[DIRECTORY_SEPARATOR](#constant.directory-separator)**.
       Las ligaduras pre-cargadas son accesibles llamando a [FFI::scope()](#ffi.scope).





# Ejemplos

## Tabla de contenidos

- [Uso básico de FFI](#ffi.examples-basic)
- [Funciones de retrollamada](#ffi.examples-callback)
- [Un ejemplo completo de PHP/FFI/precarga](#ffi.examples-complete)

    ## Uso básico de FFI

    Antes de profundizar en los detalles de la API FFI, echemos un vistazo a algunos ejemplos
    que demuestran la simplicidad de uso de la API FFI para tareas comunes.

    **Nota**:

    Algunos de estos ejemplos requieren libc.so.6 y
    por lo tanto no funcionarán en sistemas donde esta biblioteca no esté disponible.

    **Ejemplo #1 Llamada a una función desde una biblioteca compartida**

&lt;?php
// crea un objeto FFI, cargando la libc y exportando la función printf()
$ffi = FFI::cdef(
    "int printf(const char *format, ...);", // Declaración C regular
    "libc.so.6");
// llama a la función printf() de C
$ffi-&gt;printf("Hello %s!\n", "world");
?&gt;

    El ejemplo anterior mostrará:

Hello world!

**Nota**:

    Tenga en cuenta que algunas funciones C requieren convenciones de llamada específicas, por ejemplo __fastcall,
    __stdcall o __vectorcall.








    **Ejemplo #2 Llamada a una función, devolviendo una estructura a través de un argumento**

&lt;?php
// crea la ligadura gettimeofday()
$ffi = FFI::cdef("
typedef unsigned int time_t;
typedef unsigned int suseconds_t;

    struct timeval {
        time_t      tv_sec;
        suseconds_t tv_usec;
    };

    struct timezone {
        int tz_minuteswest;
        int tz_dsttime;
    };

    int gettimeofday(struct timeval *tv, struct timezone *tz);

", "libc.so.6");
// crea las estructuras de datos C
$tv = $ffi-&gt;new("struct timeval");
$tz = $ffi-&gt;new("struct timezone");
// llama a la función gettimeofday() de C
var_dump($ffi-&gt;gettimeofday(FFI::addr($tv), FFI::addr($tz)));
// accede a los campos de la estructura de datos C
var_dump($tv-&gt;tv_sec);
// imprime toda la estructura de datos C
var_dump($tz);
?&gt;

    Resultado del ejemplo anterior es similar a:

int(0)
int(1555946835)
object(FFI\CData:struct timezone)#3 (2) {
["tz_minuteswest"]=&gt;
int(0)
["tz_dsttime"]=&gt;
int(0)
}

    **Ejemplo #3 Acceso a variables C existentes**

&lt;?php
// crea un objeto FFI, cargando la libc y exportando la variable errno
$ffi = FFI::cdef(
    "int errno;", // Declaración C regular
    "libc.so.6");
// imprime el valor errno de C
var_dump($ffi-&gt;errno);
?&gt;

    El ejemplo anterior mostrará:

int(0)

    **Ejemplo #4 Creación y modificación de variables C**

&lt;?php
// crea una nueva variable C de tipo int
$x = FFI::new("int");
var_dump($x-&gt;cdata);

// asignación simple
$x-&gt;cdata = 5;
var_dump($x-&gt;cdata);

// asignación compuesta
$x-&gt;cdata += 2;
var_dump($x-&gt;cdata);
?&gt;

    El ejemplo anterior mostrará:

int(0)
int(5)
int(7)

    **Ejemplo #5 Trabajar con arrays C**

&lt;?php
// crea una estructura de datos en C
$a = FFI::new("long[1024]");
// modificación de la estructura como con un array PHP normal
for ($i = 0; $i &lt; count($a); $i++) {
    $a[$i] = $i;
}
var_dump($a[25]);
$sum = 0;
foreach ($a as $n) {
    $sum += $n;
}
var_dump($sum);
var_dump(count($a));
var_dump(FFI::sizeof($a));
?&gt;

    El ejemplo anterior mostrará:

int(25)
int(523776)
int(1024)
int(8192)

    **Ejemplo #6 Trabajar con enums en C**

&lt;?php
$a = FFI::cdef('typedef enum _zend_ffi_symbol_kind {
    ZEND_FFI_SYM_TYPE,
    ZEND_FFI_SYM_CONST = 2,
    ZEND_FFI_SYM_VAR,
    ZEND_FFI_SYM_FUNC
} zend_ffi_symbol_kind;
');
var_dump($a-&gt;ZEND_FFI_SYM_TYPE);
var_dump($a-&gt;ZEND_FFI_SYM_CONST);
var_dump($a-&gt;ZEND_FFI_SYM_VAR);
?&gt;

    El ejemplo anterior mostrará:

int(0)
int(2)
int(3)

## Funciones de retrollamada

Es posible asignar una clausura PHP a una variable nativa de tipo puntero de función
o pasarla como argumento de función:

    **Ejemplo #1 Asignación de una [Closure](#class.closure) PHP a un puntero de función C**

&lt;?php
$zend = FFI::cdef("
typedef int (*zend_write_func_t)(const char *str, size_t str_length);
extern zend_write_func_t zend_write;
");

echo "Hello World 1!\n";

$orig_zend_write = clone $zend-&gt;zend_write;
$zend-&gt;zend_write = function($str, $len) {
    global $orig_zend_write;
    $orig_zend_write("{\n\t", 3);
    $ret = $orig_zend_write($str, $len);
    $orig_zend_write("}\n", 2);
    return $ret;
};
echo "Hello World 2!\n";
$zend-&gt;zend_write = $orig_zend_write;
echo "Hello World 3!\n";
?&gt;

    El ejemplo anterior mostrará:

Hello World 1!
{
Hello World 2!
}
Hello World 3!

Aunque esto funciona, esta funcionalidad no es soportada por todas las plataformas libffi, no es eficiente
y provoca fugas de recursos al final de la petición.
**Sugerencia**

     Por lo tanto, se recomienda minimizar el uso de las funciones de retrollamada PHP.

## Un ejemplo completo de PHP/FFI/precarga

php.ini

ffi.enable=preload
opcache.preload=preload.php

preload.php

&lt;?php
FFI::load(**DIR** . "/dummy.h");
opcache_compile_file(**DIR** . "/dummy.php");
?&gt;

dummy.h

#define FFI_SCOPE "DUMMY"
#define FFI_LIB "libc.so.6"

int printf(const char \*format, ...);

dummy.php

&lt;?php
final class Dummy {
private static $ffi = null;
    function __construct() {
        if (is_null(self::$ffi)) {
self::$ffi = FFI::scope("DUMMY");
        }
    }
    function printf($format, ...$args) {
       return (int) self::$ffi-&gt;printf($format, ...$args);
}
}
?&gt;

test.php

&lt;?php
$d = new Dummy();
$d-&gt;printf("Hello %s!\n", "world");
?&gt;

# Interfaz principal para el código C y los datos

(PHP 7 &gt;= 7.4.0, PHP 8)

## Introducción

    Los objetos de esta clase son creados por los métodos de fábrica [FFI::cdef()](#ffi.cdef),
    [FFI::load()](#ffi.load) o [FFI::scope()](#ffi.scope). Las variables C definidas
    están disponibles como propiedades de la instancia FFI, y las funciones C definidas están disponibles
    como métodos de la instancia FFI. Los tipos C declarados pueden ser utilizados para crear nuevas estructuras de datos C
    utilizando [FFI::new()](#ffi.new) y [FFI::type()](#ffi.type).




    El análisis de las definiciones FFI y la carga de las bibliotecas compartidas pueden llevar mucho tiempo. No es útil
    hacerlo en cada solicitud HTTP en un entorno Web. Sin embargo, es posible precargar las definiciones FFI
    y las bibliotecas al inicio de PHP, e instanciar los objetos FFI cuando sea necesario. Los archivos de encabezado
    pueden ser extendidos con definiciones FFI_SCOPE especiales (por ejemplo #define FFI_SCOPE "foo";
    el ámbito por omisión es "C") y luego cargados por [FFI::load()](#ffi.load) durante la precarga.
    Esto conduce a la creación de una ligadura persistente, que estará disponible para todas las solicitudes siguientes
    a través de [FFI::scope()](#ffi.scope).
    Consulte el [ejemplo completo PHP/FFI/preloading](#ffi.examples-complete)
    para más detalles.




    Es posible precargar más de un archivo de encabezado C en el mismo ámbito.

## Sinopsis de la Clase

     final
     class **FFI**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [__BIGGEST_ALIGNMENT__](#ffi.constants.biggest-alignment);


    /* Métodos */

public static [addr](#ffi.addr)([FFI\CData](#class.ffi-cdata) &amp;$ptr): [FFI\CData](#class.ffi-cdata)
public static [alignof](#ffi.alignof)([FFI\CData](#class.ffi-cdata)|[FFI\CType](#class.ffi-ctype) &amp;$ptr): [int](#language.types.integer)
public static [arrayType](#ffi.arraytype)([FFI\CType](#class.ffi-ctype) $type, [array](#language.types.array) $dimensions): [FFI\CType](#class.ffi-ctype)
public [cast](#ffi.cast)([FFI\CType](#class.ffi-ctype)|[string](#language.types.string) $type, [FFI\CData](#class.ffi-cdata)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean)|[null](#language.types.null) &amp;$ptr): [?](#language.types.null)[FFI\CData](#class.ffi-cdata)
public static [cdef](#ffi.cdef)([string](#language.types.string) $code = "", [?](#language.types.null)[string](#language.types.string) $lib = **[null](#constant.null)**): [FFI](#class.ffi)
public static [free](#ffi.free)([FFI\CData](#class.ffi-cdata) &amp;$ptr): [void](language.types.void.html)
public static [isNull](#ffi.isnull)([FFI\CData](#class.ffi-cdata) &amp;$ptr): [bool](#language.types.boolean)
public static [load](#ffi.load)([string](#language.types.string) $filename): [?](#language.types.null)[FFI](#class.ffi)
public static [memcmp](#ffi.memcmp)([string](#language.types.string)|[FFI\CData](#class.ffi-cdata) &amp;$ptr1, [string](#language.types.string)|[FFI\CData](#class.ffi-cdata) &amp;$ptr2, [int](#language.types.integer) $size): [int](#language.types.integer)
public static [memcpy](#ffi.memcpy)([FFI\CData](#class.ffi-cdata) &amp;$to, [FFI\CData](#class.ffi-cdata)|[string](#language.types.string) &amp;$from, [int](#language.types.integer) $size): [void](language.types.void.html)
public static [memset](#ffi.memset)([FFI\CData](#class.ffi-cdata) &amp;$ptr, [int](#language.types.integer) $value, [int](#language.types.integer) $size): [void](language.types.void.html)
public [new](#ffi.new)([FFI\CType](#class.ffi-ctype)|[string](#language.types.string) $type, [bool](#language.types.boolean) $owned = **[true](#constant.true)**, [bool](#language.types.boolean) $persistent = **[false](#constant.false)**): [?](#language.types.null)[FFI\CData](#class.ffi-cdata)
public static [scope](#ffi.scope)([string](#language.types.string) $name): [FFI](#class.ffi)
public static [sizeof](#ffi.sizeof)([FFI\CData](#class.ffi-cdata)|[FFI\CType](#class.ffi-ctype) &amp;$ptr): [int](#language.types.integer)
public static [string](#ffi.string)([FFI\CData](#class.ffi-cdata) &amp;$ptr, [?](#language.types.null)[int](#language.types.integer) $size = **[null](#constant.null)**): [string](#language.types.string)
public [type](#ffi.type)([string](#language.types.string) $type): [?](#language.types.null)[FFI\CType](#class.ffi-ctype)
public static [typeof](#ffi.typeof)([FFI\CData](#class.ffi-cdata) &amp;$ptr): [FFI\CType](#class.ffi-ctype)

}

## Constantes predefinidas

     **[FFI::__BIGGEST_ALIGNMENT__](#ffi.constants.biggest-alignment)**






# FFI::addr

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::addr — Crea un puntero no gestionado hacia datos C

### Descripción

public static **FFI::addr**([FFI\CData](#class.ffi-cdata) &amp;$ptr): [FFI\CData](#class.ffi-cdata)

Crea un puntero no gestionado hacia los datos C representados por el elemento
[FFI\CData](#class.ffi-cdata). La fuente ptr debe sobrevivir al
puntero resultante. Esta función es principalmente útil para transmitir argumentos a funciones C a través de un puntero.

### Parámetros

    ptr


      El gestor del puntero hacia una estructura de datos C.


### Valores devueltos

Devuelve el objeto [FFI\CData](#class.ffi-cdata) recién creado.

# FFI::alignof

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::alignof — Recupera el alineamiento

### Descripción

public static **FFI::alignof**([FFI\CData](#class.ffi-cdata)|[FFI\CType](#class.ffi-ctype) &amp;$ptr): [int](#language.types.integer)

Recupera el alineamiento del objeto [FFI\CData](#class.ffi-cdata) o
[FFI\CType](#class.ffi-ctype) dado.

### Parámetros

    ptr


      El identificador de la data o del tipo C.


### Valores devueltos

Devuelve el alineamiento del objeto [FFI\CData](#class.ffi-cdata) o
[FFI\CType](#class.ffi-ctype) dado.

# FFI::arrayType

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::arrayType — Construye dinámicamente un nuevo tipo de array C

### Descripción

public static **FFI::arrayType**([FFI\CType](#class.ffi-ctype) $type, [array](#language.types.array) $dimensions): [FFI\CType](#class.ffi-ctype)

Construye dinámicamente un nuevo tipo de array C con elementos de tipo definido por type,
y dimensiones especificadas por dimensions. En el siguiente ejemplo, $t1
y $t2 son tipos de array equivalentes:

&lt;?php
$t1 = FFI::type("int[2][3]");
$t2 = FFI::arrayType(FFI::type("int"), [2, 3]);
?&gt;

### Parámetros

    type


      Una declaración C válida como [string](#language.types.string), o una instancia de [FFI\CType](#class.ffi-ctype)
      que ya ha sido creada.






    dimensions


      Las dimensiones del tipo como [array](#language.types.array).


### Valores devueltos

Devuelve el objeto [FFI\CType](#class.ffi-ctype) recién creado.

# FFI::cast

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::cast — Realiza una conversión de tipo C

### Descripción

public **FFI::cast**([FFI\CType](#class.ffi-ctype)|[string](#language.types.string) $type, [FFI\CData](#class.ffi-cdata)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean)|[null](#language.types.null) &amp;$ptr): [?](#language.types.null)[FFI\CData](#class.ffi-cdata)

**FFI::cast()** crea un nuevo objeto [FFI\CData](#class.ffi-cdata)
que hace referencia a la misma estructura de datos C, pero que está asociada a un tipo diferente.
El objeto resultante no posee los datos C y la fuente ptr
debe sobrevivir al resultado. El tipo C puede ser especificado como [string](#language.types.string) con
cualquier declaración de tipo C válida o como objeto [FFI\CType](#class.ffi-ctype), creado previamente.
Cualquier tipo declarado para la instancia está permitido.

### Parámetros

    type


      Una declaración C válida como [string](#language.types.string), o una instancia de [FFI\CType](#class.ffi-ctype)
      que ya ha sido creada.






    ptr


      El gestor del puntero de una estructura de datos C.


### Valores devueltos

Devuelve el objeto [FFI\CData](#class.ffi-cdata) recién creado.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        La llamada estática a **FFI::cast()** ahora está obsoleta.





# FFI::cdef

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::cdef — Crea un nuevo objeto FFI

### Descripción

public static **FFI::cdef**([string](#language.types.string) $code = "", [?](#language.types.null)[string](#language.types.string) $lib = **[null](#constant.null)**): [FFI](#class.ffi)

Crea un nuevo objeto FFI.

### Parámetros

    code


      Un string que contiene una secuencia de declaraciones en lenguaje C ordinario
      (tipos, estructuras, funciones, variables, etc). De hecho, este string puede ser
      copiado y pegado desde ficheros de encabezado C.



     **Nota**:



       Las directivas del preprocesador C no son soportadas, es decir, #include,
       #define y las macros CPP no funcionan.







    lib


      El nombre de un fichero de biblioteca compartida, para cargar y enlazar con las
      definiciones.



     **Nota**:



       Si lib es omitido o **[null](#constant.null)**, las plataformas que soportan RTLD_DEFAULT
       intentan buscar los símbolos declarados en code en el ámbito global.
       Los otros sistemas no lograrán resolver estos símbolos.





### Valores devueltos

Devuelve el objeto [FFI](#class.ffi) recién creado.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Las funciones C que devuelven void devuelven un [null](#language.types.null) PHP
       en lugar de FFI\CType::TYPE_VOID.




      8.0.0

       lib es ahora nullable.



# FFI::free

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::free — Libera una estructura de datos no gestionada

### Descripción

public static **FFI::free**([FFI\CData](#class.ffi-cdata) &amp;$ptr): [void](language.types.void.html)

Libera manualmente una estructura de datos no gestionada creada previamente.

### Parámetros

    ptr


      El gestor del puntero no gestionado de una estructura de datos C.


### Valores devueltos

No se retorna ningún valor.

# FFI::isNull

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::isNull — Verifica si un objeto FFI\CData es un puntero nulo

### Descripción

public static **FFI::isNull**([FFI\CData](#class.ffi-cdata) &amp;$ptr): [bool](#language.types.boolean)

Verifica si un objeto FFI\CData es un puntero nulo.

### Parámetros

    ptr


      El gestor del puntero hacia una estructura de datos C.


### Valores devueltos

Devuelve si un objeto [FFI\CData](#class.ffi-cdata) es un puntero nulo.

# FFI::load

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::load — Carga las declaraciones C desde un archivo de encabezado C

### Descripción

public static **FFI::load**([string](#language.types.string) $filename): [?](#language.types.null)[FFI](#class.ffi)

Carga las declaraciones C desde un archivo de encabezado C. Es posible especificar las bibliotecas compartidas que deben ser cargadas,
utilizando definiciones especiales FFI_LIB en el archivo de encabezado C cargado.

### Parámetros

    filename


      El nombre de un archivo de encabezado C.




      Las directivas del preprocesador C no son soportadas, es decir, #include,
      #define y las macros CPP no funcionan, excepto en los casos particulares
      enumerados a continuación.




      El archivo de encabezado *debería* contener una declaración #define para la variable
      FFI_SCOPE, por ejemplo: #define FFI_SCOPE "MYLIB".
      Consulte la [introducción de la clase](#ffi.intro) para más detalles.




      El archivo de encabezado *puede* contener una declaración #define para la variable
      FFI_LIB para especificar la biblioteca que expone. Si se trata de una
      biblioteca del sistema, solo se requiere el nombre del archivo, por ejemplo: #define FFI_LIB
      "libc.so.6".  Si se trata de una biblioteca personalizada, se requiere una ruta relativa,
      por ejemplo: #define FFI_LIB "./mylib.so".


### Valores devueltos

Devuelve el objeto [FFI](#class.ffi) recién creado, o **[null](#constant.null)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       **FFI::load()** ahora está permitido en los
       [scripts de precarga](#opcache.preloading) cuando
       el usuario del sistema actual es el mismo que el definido en la directiva
       de configuración opcache.preload_user.



### Ver también

    - [FFI::scope()](#ffi.scope) - Instancia un objeto FFI con las declaraciones C analizadas durante la precarga

# FFI::memcmp

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::memcmp — Comparación de zonas de memoria

### Descripción

public static **FFI::memcmp**([string](#language.types.string)|[FFI\CData](#class.ffi-cdata) &amp;$ptr1, [string](#language.types.string)|[FFI\CData](#class.ffi-cdata) &amp;$ptr2, [int](#language.types.integer) $size): [int](#language.types.integer)

Compara los size bytes de las zonas de memoria ptr1 y
ptr2. ptr1 y ptr2
pueden ser estructuras de datos nativas ([FFI\CData](#class.ffi-cdata)) o [string](#language.types.string)s PHP.

### Parámetros

    ptr1


      Inicio de una zona de memoria.






    ptr2


      El inicio de otra zona de memoria.






    size


      El número de bytes a comparar.


### Valores devueltos

Devuelve un valor inferior a 0 si el contenido de la zona de memoria que comienza en ptr1
se considera menor que el contenido de la zona de memoria que comienza en ptr2,
un valor superior a 0 si el contenido de la primera zona de memoria se considera mayor que el de la segunda,
y 0 si son iguales.

# FFI::memcpy

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::memcpy — Copia de una zona de memoria en otra

### Descripción

public static **FFI::memcpy**([FFI\CData](#class.ffi-cdata) &amp;$to, [FFI\CData](#class.ffi-cdata)|[string](#language.types.string) &amp;$from, [int](#language.types.integer) $size): [void](language.types.void.html)

Copia size bytes de la zona de memoria from
hacia la zona de memoria to.

### Parámetros

    to


      Inicio de la zona de memoria a copiar.






    from


      El inicio de la zona de memoria donde la copia debe ser efectuada.






    size


      El número de bytes a copiar.


### Valores devueltos

No se retorna ningún valor.

# FFI::memset

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::memset — Rellena una zona de memoria

### Descripción

public static **FFI::memset**([FFI\CData](#class.ffi-cdata) &amp;$ptr, [int](#language.types.integer) $value, [int](#language.types.integer) $size): [void](language.types.void.html)

Rellena size bytes de la zona de memoria apuntada por
ptr con el byte dado value.

### Parámetros

    ptr


      Inicio de la zona de memoria a rellenar.






    value


      El byte a rellenar.






    size


      El número de bytes a rellenar.


### Valores devueltos

No se retorna ningún valor.

# FFI::new

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::new — Crea una estructura de datos C

### Descripción

public **FFI::new**([FFI\CType](#class.ffi-ctype)|[string](#language.types.string) $type, [bool](#language.types.boolean) $owned = **[true](#constant.true)**, [bool](#language.types.boolean) $persistent = **[false](#constant.false)**): [?](#language.types.null)[FFI\CData](#class.ffi-cdata)

Crea una estructura de datos nativa del tipo C dado.
Cualquier tipo declarado para la instancia está permitido.

### Parámetros

    type


      type es una declaración C válida como [string](#language.types.string), o una
      instancia de [FFI\CType](#class.ffi-ctype) que ya ha sido creada.






    owned


      Creación de datos gestionados o no gestionados. Los datos gestionados viven con
      el objeto [FFI\CData](#class.ffi-cdata) devuelto, y son liberados cuando la última referencia a este objeto
      es liberada por el conteo de referencias ordinario de PHP o el recolector de basura.
      Los datos no gestionados deben ser liberados llamando a [FFI::free()](#ffi.free),
      cuando ya no sean necesarios.






    persistent


      Asignar la estructura de datos C de manera permanente en el montón del sistema (utilizando
      **malloc()**), o en el montón de las peticiones PHP (utilizando **emalloc()**).


### Valores devueltos

Devuelve el objeto [FFI\CData](#class.ffi-cdata) recién creado,
o **[null](#constant.null)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        La llamada estática a **FFI::new()** ahora está obsoleta.





# FFI::scope

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::scope — Instancia un objeto FFI con las declaraciones C analizadas durante la precarga

### Descripción

public static **FFI::scope**([string](#language.types.string) $name): [FFI](#class.ffi)

Instancia un objeto FFI con las declaraciones C analizadas durante la precarga.

El método **FFI::scope()** puede ser llamado varias veces para el mismo ámbito. Varias referencias al mismo ámbito pueden ser cargadas al mismo tiempo.

### Parámetros

    name


      El nombre del ámbito definido por una definición especial FFI_SCOPE.


### Valores devueltos

Devuelve el objeto [FFI](#class.ffi) recién creado.

### Ver también

    - [FFI::load()](#ffi.load) - Carga las declaraciones C desde un archivo de encabezado C

# FFI::sizeof

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::sizeof — Recupera el tamaño de los datos o tipos C

### Descripción

public static **FFI::sizeof**([FFI\CData](#class.ffi-cdata)|[FFI\CType](#class.ffi-ctype) &amp;$ptr): [int](#language.types.integer)

Devuelve el tamaño del objeto [FFI\CData](#class.ffi-cdata) o
[FFI\CType](#class.ffi-ctype) objeto.

### Parámetros

    ptr


      El gestor de la data o del tipo C.


### Valores devueltos

Tamaño de la zona de memoria apuntada por ptr.

# FFI::string

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::string — Crea una string PHP a partir de una zona de memoria

### Descripción

public static **FFI::string**([FFI\CData](#class.ffi-cdata) &amp;$ptr, [?](#language.types.null)[int](#language.types.integer) $size = **[null](#constant.null)**): [string](#language.types.string)

Crea una [string](#language.types.string) PHP a partir de size bytes de la zona de memoria
apuntada por ptr.

### Parámetros

    ptr


      El inicio de la zona de memoria a partir de la cual crear una [string](#language.types.string).






    size


      El número de bytes a copiar en [string](#language.types.string).
      Si size es omitido o **[null](#constant.null)**, ptr debe ser un array de caracteres C
      de char C con terminación nula.


### Valores devueltos

La [string](#language.types.string) PHP recién creada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       size es ahora nullable; anteriormente, su valor por omisión era
       0.



# FFI::type

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::type — Crea un objeto FFI\CType a partir de una declaración C

### Descripción

public **FFI::type**([string](#language.types.string) $type): [?](#language.types.null)[FFI\CType](#class.ffi-ctype)

Esta función crea y devuelve un objeto [FFI\CType](#class.ffi-ctype) para el
[string](#language.types.string) dado que contiene una declaración de tipo C.
Cualquier tipo declarado para la instancia está permitido.

### Parámetros

    type


      Una declaración C válida como [string](#language.types.string).


### Valores devueltos

Devuelve el objeto [FFI\CType](#class.ffi-ctype) recién creado,
o **[null](#constant.null)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        La llamada estática de **FFI::type()** está ahora obsoleta.





# FFI::typeof

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI::typeof — Recupera el FFI\CType de FFI\CData

### Descripción

public static **FFI::typeof**([FFI\CData](#class.ffi-cdata) &amp;$ptr): [FFI\CType](#class.ffi-ctype)

Recupera el objeto [FFI\CType](#class.ffi-ctype) que representa el tipo del objeto
[FFI\CData](#class.ffi-cdata) dado.

### Parámetros

    ptr


      El gestor del puntero hacia una estructura de datos C.


### Valores devueltos

Devuelve el objeto [FFI\CType](#class.ffi-ctype) que representa el tipo del objeto
[FFI\CData](#class.ffi-cdata) dado.

## Tabla de contenidos

- [FFI::addr](#ffi.addr) — Crea un puntero no gestionado hacia datos C
- [FFI::alignof](#ffi.alignof) — Recupera el alineamiento
- [FFI::arrayType](#ffi.arraytype) — Construye dinámicamente un nuevo tipo de array C
- [FFI::cast](#ffi.cast) — Realiza una conversión de tipo C
- [FFI::cdef](#ffi.cdef) — Crea un nuevo objeto FFI
- [FFI::free](#ffi.free) — Libera una estructura de datos no gestionada
- [FFI::isNull](#ffi.isnull) — Verifica si un objeto FFI\CData es un puntero nulo
- [FFI::load](#ffi.load) — Carga las declaraciones C desde un archivo de encabezado C
- [FFI::memcmp](#ffi.memcmp) — Comparación de zonas de memoria
- [FFI::memcpy](#ffi.memcpy) — Copia de una zona de memoria en otra
- [FFI::memset](#ffi.memset) — Rellena una zona de memoria
- [FFI::new](#ffi.new) — Crea una estructura de datos C
- [FFI::scope](#ffi.scope) — Instancia un objeto FFI con las declaraciones C analizadas durante la precarga
- [FFI::sizeof](#ffi.sizeof) — Recupera el tamaño de los datos o tipos C
- [FFI::string](#ffi.string) — Crea una string PHP a partir de una zona de memoria
- [FFI::type](#ffi.type) — Crea un objeto FFI\CType a partir de una declaración C
- [FFI::typeof](#ffi.typeof) — Recupera el FFI\CType de FFI\CData

# Gestor de datos C

(PHP 7 &gt;= 7.4.0, PHP 8)

## Introducción

    Los objetos **FFI\CData** pueden ser utilizados de diferentes maneras, como datos PHP normales:



     -

       Los datos C de tipo escalar pueden ser leídos y asignados a través de la propiedad $cdata, por ejemplo.
       $x = FFI::new('int'); $x-&gt;cdata = 42;



     -

       Los campos de tipo struct y union pueden ser accedidos como propiedades de objetos PHP ordinarios, por ejemplo
       $cdata-&gt;field



     -

       Los elementos de un array C son accesibles como los elementos de un array PHP, por ejemplo.
       $cdata[$offset]



     -

       Los arrays C pueden ser iterados utilizando instrucciones [foreach](#control-structures.foreach).



     -

       Los arrays C pueden ser utilizados como argumentos de [count()](#function.count).



     -

       Los punteros C pueden ser desreferenciados como arrays, por ejemplo $cdata[0]



     -

       Los punteros C pueden ser comparados utilizando operadores de comparación ordinarios (&lt;,
       &lt;=, ==, !=, &gt;=, &gt;).



     -

       Los punteros C pueden ser incrementados y decrementados utilizando operaciones ordinarias ( +/-/ / ).
       ++/--, por ejemplo $cdata += 5



     -

       Los punteros C pueden ser sustraídos de otro utilizando operaciones ordinarias -.



     -

       Los punteros C hacia funciones pueden ser llamados como una clausura PHP clásica, por ejemplo $cdata()



     -

       Cualquier dato C puede ser duplicado utilizando el operador [clone](#language.oop5.cloning),
       por ejemplo $cdata2 = clone $cdata;



     -

       Todos los datos C pueden ser visualizados utilizando [var_dump()](#function.var-dump), [print_r()](#function.print-r), etc.



     -

       **FFI\CData** puede ahora ser atribuido a estructuras y campos a partir de PHP 8.3.0.




    **Nota**:

      Las limitaciones notables son que las instancias de **FFI\CData** no soportan las funciones
      [isset()](#function.isset), [empty()](#function.empty) y [unset()](#function.unset),
      y que las structs y unions C envueltas no implementan [Traversable](#class.traversable).


## Sinopsis de la Clase

     final
     class **FFI\CData**
     {

}

## Historial de cambios

       Versión
       Descripción






       8.3.0

        **FFI\CData** puede ahora ser atribuido a estructuras y campos.





# Gestor de tipo C

(PHP 7 &gt;= 7.4.0, PHP 8)

## Introducción

## Sinopsis de la Clase

     final
     class **FFI\CType**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [TYPE_VOID](#ffi-ctype.constants.type-void);

    public
     const
     [int](#language.types.integer)
      [TYPE_FLOAT](#ffi-ctype.constants.type-float);

    public
     const
     [int](#language.types.integer)
      [TYPE_DOUBLE](#ffi-ctype.constants.type-double);

    public
     const
     [int](#language.types.integer)
      [TYPE_LONGDOUBLE](#ffi-ctype.constants.type-longdouble);

    public
     const
     [int](#language.types.integer)
      [TYPE_UINT8](#ffi-ctype.constants.type-uint8);

    public
     const
     [int](#language.types.integer)
      [TYPE_SINT8](#ffi-ctype.constants.type-sint8);

    public
     const
     [int](#language.types.integer)
      [TYPE_UINT16](#ffi-ctype.constants.type-uint16);

    public
     const
     [int](#language.types.integer)
      [TYPE_SINT16](#ffi-ctype.constants.type-sint16);

    public
     const
     [int](#language.types.integer)
      [TYPE_UINT32](#ffi-ctype.constants.type-uint32);

    public
     const
     [int](#language.types.integer)
      [TYPE_SINT32](#ffi-ctype.constants.type-sint32);

    public
     const
     [int](#language.types.integer)
      [TYPE_UINT64](#ffi-ctype.constants.type-uint64);

    public
     const
     [int](#language.types.integer)
      [TYPE_SINT64](#ffi-ctype.constants.type-sint64);

    public
     const
     [int](#language.types.integer)
      [TYPE_ENUM](#ffi-ctype.constants.type-enum);

    public
     const
     [int](#language.types.integer)
      [TYPE_BOOL](#ffi-ctype.constants.type-bool);

    public
     const
     [int](#language.types.integer)
      [TYPE_CHAR](#ffi-ctype.constants.type-char);

    public
     const
     [int](#language.types.integer)
      [TYPE_POINTER](#ffi-ctype.constants.type-pointer);

    public
     const
     [int](#language.types.integer)
      [TYPE_FUNC](#ffi-ctype.constants.type-func);

    public
     const
     [int](#language.types.integer)
      [TYPE_ARRAY](#ffi-ctype.constants.type-array);

    public
     const
     [int](#language.types.integer)
      [TYPE_STRUCT](#ffi-ctype.constants.type-struct);

    public
     const
     [int](#language.types.integer)
      [ATTR_CONST](#ffi-ctype.constants.attr-const);

    public
     const
     [int](#language.types.integer)
      [ATTR_INCOMPLETE_TAG](#ffi-ctype.constants.attr-incomplete-tag);

    public
     const
     [int](#language.types.integer)
      [ATTR_VARIADIC](#ffi-ctype.constants.attr-variadic);

    public
     const
     [int](#language.types.integer)
      [ATTR_INCOMPLETE_ARRAY](#ffi-ctype.constants.attr-incomplete-array);

    public
     const
     [int](#language.types.integer)
      [ATTR_VLA](#ffi-ctype.constants.attr-vla);

    public
     const
     [int](#language.types.integer)
      [ATTR_UNION](#ffi-ctype.constants.attr-union);

    public
     const
     [int](#language.types.integer)
      [ATTR_PACKED](#ffi-ctype.constants.attr-packed);

    public
     const
     [int](#language.types.integer)
      [ATTR_MS_STRUCT](#ffi-ctype.constants.attr-ms-struct);

    public
     const
     [int](#language.types.integer)
      [ATTR_GCC_STRUCT](#ffi-ctype.constants.attr-gcc-struct);

    public
     const
     [int](#language.types.integer)
      [ABI_DEFAULT](#ffi-ctype.constants.abi-default);

    public
     const
     [int](#language.types.integer)
      [ABI_CDECL](#ffi-ctype.constants.abi-cdecl);

    public
     const
     [int](#language.types.integer)
      [ABI_FASTCALL](#ffi-ctype.constants.abi-fastcall);

    public
     const
     [int](#language.types.integer)
      [ABI_THISCALL](#ffi-ctype.constants.abi-thiscall);

    public
     const
     [int](#language.types.integer)
      [ABI_STDCALL](#ffi-ctype.constants.abi-stdcall);

    public
     const
     [int](#language.types.integer)
      [ABI_PASCAL](#ffi-ctype.constants.abi-pascal);

    public
     const
     [int](#language.types.integer)
      [ABI_REGISTER](#ffi-ctype.constants.abi-register);

    public
     const
     [int](#language.types.integer)
      [ABI_MS](#ffi-ctype.constants.abi-ms);

    public
     const
     [int](#language.types.integer)
      [ABI_SYSV](#ffi-ctype.constants.abi-sysv);

    public
     const
     [int](#language.types.integer)
      [ABI_VECTORCALL](#ffi-ctype.constants.abi-vectorcall);


    /* Métodos */

public [getAlignment](#ffi-ctype.getalignment)(): [int](#language.types.integer)
public [getArrayElementType](#ffi-ctype.getarrayelementtype)(): [FFI\CType](#class.ffi-ctype)
public [getArrayLength](#ffi-ctype.getarraylength)(): [int](#language.types.integer)
public [getAttributes](#ffi-ctype.getattributes)(): [int](#language.types.integer)
public [getEnumKind](#ffi-ctype.getenumkind)(): [int](#language.types.integer)
public [getFuncABI](#ffi-ctype.getfuncabi)(): [int](#language.types.integer)
public [getFuncParameterCount](#ffi-ctype.getfuncparametercount)(): [int](#language.types.integer)
public [getFuncParameterType](#ffi-ctype.getfuncparametertype)([int](#language.types.integer) $index): [FFI\CType](#class.ffi-ctype)
public [getFuncReturnType](#ffi-ctype.getfuncreturntype)(): [FFI\CType](#class.ffi-ctype)
public [getKind](#ffi-ctype.getkind)(): [int](#language.types.integer)
public [getName](#ffi-ctype.getname)(): [string](#language.types.string)
public [getPointerType](#ffi-ctype.getpointertype)(): [FFI\CType](#class.ffi-ctype)
public [getSize](#ffi-ctype.getsize)(): [int](#language.types.integer)
public [getStructFieldNames](#ffi-ctype.getstructfieldnames)(): [array](#language.types.array)
public [getStructFieldOffset](#ffi-ctype.getstructfieldoffset)([string](#language.types.string) $name): [int](#language.types.integer)
public [getStructFieldType](#ffi-ctype.getstructfieldtype)([string](#language.types.string) $name): [FFI\CType](#class.ffi-ctype)

}

## Constantes predefinidas

     **[FFI\CType::TYPE_VOID](#ffi-ctype.constants.type-void)**








     **[FFI\CType::TYPE_FLOAT](#ffi-ctype.constants.type-float)**








     **[FFI\CType::TYPE_DOUBLE](#ffi-ctype.constants.type-double)**








     **[FFI\CType::TYPE_LONGDOUBLE](#ffi-ctype.constants.type-longdouble)**








     **[FFI\CType::TYPE_UINT8](#ffi-ctype.constants.type-uint8)**








     **[FFI\CType::TYPE_SINT8](#ffi-ctype.constants.type-sint8)**








     **[FFI\CType::TYPE_UINT16](#ffi-ctype.constants.type-uint16)**








     **[FFI\CType::TYPE_SINT16](#ffi-ctype.constants.type-sint16)**








     **[FFI\CType::TYPE_UINT32](#ffi-ctype.constants.type-uint32)**








     **[FFI\CType::TYPE_SINT32](#ffi-ctype.constants.type-sint32)**








     **[FFI\CType::TYPE_UINT64](#ffi-ctype.constants.type-uint64)**








     **[FFI\CType::TYPE_SINT64](#ffi-ctype.constants.type-sint64)**








     **[FFI\CType::TYPE_ENUM](#ffi-ctype.constants.type-enum)**








     **[FFI\CType::TYPE_BOOL](#ffi-ctype.constants.type-bool)**








     **[FFI\CType::TYPE_CHAR](#ffi-ctype.constants.type-char)**








     **[FFI\CType::TYPE_POINTER](#ffi-ctype.constants.type-pointer)**








     **[FFI\CType::TYPE_FUNC](#ffi-ctype.constants.type-func)**








     **[FFI\CType::TYPE_ARRAY](#ffi-ctype.constants.type-array)**








     **[FFI\CType::TYPE_STRUCT](#ffi-ctype.constants.type-struct)**








     **[FFI\CType::ATTR_CONST](#ffi-ctype.constants.attr-const)**








     **[FFI\CType::ATTR_INCOMPLETE_TAG](#ffi-ctype.constants.attr-incomplete-tag)**








     **[FFI\CType::ATTR_VARIADIC](#ffi-ctype.constants.attr-variadic)**








     **[FFI\CType::ATTR_INCOMPLETE_ARRAY](#ffi-ctype.constants.attr-incomplete-array)**








     **[FFI\CType::ATTR_VLA](#ffi-ctype.constants.attr-vla)**








     **[FFI\CType::ATTR_UNION](#ffi-ctype.constants.attr-union)**








     **[FFI\CType::ATTR_PACKED](#ffi-ctype.constants.attr-packed)**








     **[FFI\CType::ATTR_MS_STRUCT](#ffi-ctype.constants.attr-ms-struct)**








     **[FFI\CType::ATTR_GCC_STRUCT](#ffi-ctype.constants.attr-gcc-struct)**








     **[FFI\CType::ABI_DEFAULT](#ffi-ctype.constants.abi-default)**








     **[FFI\CType::ABI_CDECL](#ffi-ctype.constants.abi-cdecl)**








     **[FFI\CType::ABI_FASTCALL](#ffi-ctype.constants.abi-fastcall)**








     **[FFI\CType::ABI_THISCALL](#ffi-ctype.constants.abi-thiscall)**








     **[FFI\CType::ABI_STDCALL](#ffi-ctype.constants.abi-stdcall)**








     **[FFI\CType::ABI_PASCAL](#ffi-ctype.constants.abi-pascal)**








     **[FFI\CType::ABI_REGISTER](#ffi-ctype.constants.abi-register)**








     **[FFI\CType::ABI_MS](#ffi-ctype.constants.abi-ms)**








     **[FFI\CType::ABI_SYSV](#ffi-ctype.constants.abi-sysv)**








     **[FFI\CType::ABI_VECTORCALL](#ffi-ctype.constants.abi-vectorcall)**






# FFI\CType::getAlignment

(PHP 8 &gt;= 8.1.0)

FFI\CType::getAlignment — Descripción

### Descripción

public **FFI\CType::getAlignment**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getArrayElementType

(PHP 8 &gt;= 8.1.0)

FFI\CType::getArrayElementType — Descripción

### Descripción

public **FFI\CType::getArrayElementType**(): [FFI\CType](#class.ffi-ctype)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getArrayLength

(PHP 8 &gt;= 8.1.0)

FFI\CType::getArrayLength — Descripción

### Descripción

public **FFI\CType::getArrayLength**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getAttributes

(PHP 8 &gt;= 8.1.0)

FFI\CType::getAttributes — Descripción

### Descripción

public **FFI\CType::getAttributes**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getEnumKind

(PHP 8 &gt;= 8.1.0)

FFI\CType::getEnumKind — Descripción

### Descripción

public **FFI\CType::getEnumKind**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getFuncABI

(PHP 8 &gt;= 8.1.0)

FFI\CType::getFuncABI — Descripción

### Descripción

public **FFI\CType::getFuncABI**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getFuncParameterCount

(PHP 8 &gt;= 8.1.0)

FFI\CType::getFuncParameterCount — Recuperar el número de argumentos de un tipo de función

### Descripción

public **FFI\CType::getFuncParameterCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de argumentos del tipo de función subyacente.
Si el tipo subyacente no es una función, se lanza una
**FFI\Exception**.

# FFI\CType::getFuncParameterType

(PHP 8 &gt;= 8.1.0)

FFI\CType::getFuncParameterType — Recuperar el tipo de un parámetro de función

### Descripción

public **FFI\CType::getFuncParameterType**([int](#language.types.integer) $index): [FFI\CType](#class.ffi-ctype)

Devuelve el tipo de un parámetro para el tipo de función subyacente.

### Parámetros

    index


      Índice del parámetro de la función, basado en cero.


### Valores devueltos

Devuelve el tipo de un parámetro para el tipo de función subyacente.
Si el tipo subyacente no es una función, o si el índice proporcionado está fuera
del rango de los parámetros de la función, se lanza una
**FFI\Exception**.

# FFI\CType::getFuncReturnType

(PHP 8 &gt;= 8.1.0)

FFI\CType::getFuncReturnType — Descripción

### Descripción

public **FFI\CType::getFuncReturnType**(): [FFI\CType](#class.ffi-ctype)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getKind

(PHP 8 &gt;= 8.1.0)

FFI\CType::getKind — Descripción

### Descripción

public **FFI\CType::getKind**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getName

(PHP 7 &gt;= 7.4.0, PHP 8)

FFI\CType::getName — Descripción

### Descripción

public **FFI\CType::getName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getPointerType

(PHP 8 &gt;= 8.1.0)

FFI\CType::getPointerType — Descripción

### Descripción

public **FFI\CType::getPointerType**(): [FFI\CType](#class.ffi-ctype)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getSize

(PHP 8 &gt;= 8.1.0)

FFI\CType::getSize — Descripción

### Descripción

public **FFI\CType::getSize**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getStructFieldNames

(PHP 8 &gt;= 8.1.0)

FFI\CType::getStructFieldNames — Descripción

### Descripción

public **FFI\CType::getStructFieldNames**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# FFI\CType::getStructFieldOffset

(PHP 8 &gt;= 8.1.0)

FFI\CType::getStructFieldOffset — Descripción

### Descripción

public **FFI\CType::getStructFieldOffset**([string](#language.types.string) $name): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# FFI\CType::getStructFieldType

(PHP 8 &gt;= 8.1.0)

FFI\CType::getStructFieldType — Descripción

### Descripción

public **FFI\CType::getStructFieldType**([string](#language.types.string) $name): [FFI\CType](#class.ffi-ctype)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

## Tabla de contenidos

- [FFI\CType::getAlignment](#ffi-ctype.getalignment) — Descripción
- [FFI\CType::getArrayElementType](#ffi-ctype.getarrayelementtype) — Descripción
- [FFI\CType::getArrayLength](#ffi-ctype.getarraylength) — Descripción
- [FFI\CType::getAttributes](#ffi-ctype.getattributes) — Descripción
- [FFI\CType::getEnumKind](#ffi-ctype.getenumkind) — Descripción
- [FFI\CType::getFuncABI](#ffi-ctype.getfuncabi) — Descripción
- [FFI\CType::getFuncParameterCount](#ffi-ctype.getfuncparametercount) — Recuperar el número de argumentos de un tipo de función
- [FFI\CType::getFuncParameterType](#ffi-ctype.getfuncparametertype) — Recuperar el tipo de un parámetro de función
- [FFI\CType::getFuncReturnType](#ffi-ctype.getfuncreturntype) — Descripción
- [FFI\CType::getKind](#ffi-ctype.getkind) — Descripción
- [FFI\CType::getName](#ffi-ctype.getname) — Descripción
- [FFI\CType::getPointerType](#ffi-ctype.getpointertype) — Descripción
- [FFI\CType::getSize](#ffi-ctype.getsize) — Descripción
- [FFI\CType::getStructFieldNames](#ffi-ctype.getstructfieldnames) — Descripción
- [FFI\CType::getStructFieldOffset](#ffi-ctype.getstructfieldoffset) — Descripción
- [FFI\CType::getStructFieldType](#ffi-ctype.getstructfieldtype) — Descripción

# Excepciones FFI

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

     class **FFI\Exception**



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

# Excepciones del analizador sintáctico FFI

(PHP 7 &gt;= 7.4.0, PHP 8)

## Introducción

## Sinopsis de la Clase

     final
     class **FFI\ParserException**



     extends
      **FFI\Exception**
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

- [Introducción](#intro.ffi)
- [Instalación/Configuración](#ffi.setup)<li>[Requerimientos](#ffi.requirements)
- [Instalación](#ffi.installation)
- [Configuración en tiempo de ejecución](#ffi.configuration)
  </li>- [Ejemplos](#ffi.examples)<li>[Uso básico de FFI](#ffi.examples-basic)
- [Funciones de retrollamada](#ffi.examples-callback)
- [Un ejemplo completo de PHP/FFI/precarga](#ffi.examples-complete)
  </li>- [FFI](#class.ffi) — Interfaz principal para el código C y los datos<li>[FFI::addr](#ffi.addr) — Crea un puntero no gestionado hacia datos C
- [FFI::alignof](#ffi.alignof) — Recupera el alineamiento
- [FFI::arrayType](#ffi.arraytype) — Construye dinámicamente un nuevo tipo de array C
- [FFI::cast](#ffi.cast) — Realiza una conversión de tipo C
- [FFI::cdef](#ffi.cdef) — Crea un nuevo objeto FFI
- [FFI::free](#ffi.free) — Libera una estructura de datos no gestionada
- [FFI::isNull](#ffi.isnull) — Verifica si un objeto FFI\CData es un puntero nulo
- [FFI::load](#ffi.load) — Carga las declaraciones C desde un archivo de encabezado C
- [FFI::memcmp](#ffi.memcmp) — Comparación de zonas de memoria
- [FFI::memcpy](#ffi.memcpy) — Copia de una zona de memoria en otra
- [FFI::memset](#ffi.memset) — Rellena una zona de memoria
- [FFI::new](#ffi.new) — Crea una estructura de datos C
- [FFI::scope](#ffi.scope) — Instancia un objeto FFI con las declaraciones C analizadas durante la precarga
- [FFI::sizeof](#ffi.sizeof) — Recupera el tamaño de los datos o tipos C
- [FFI::string](#ffi.string) — Crea una string PHP a partir de una zona de memoria
- [FFI::type](#ffi.type) — Crea un objeto FFI\CType a partir de una declaración C
- [FFI::typeof](#ffi.typeof) — Recupera el FFI\CType de FFI\CData
  </li>- [FFI\CData](#class.ffi-cdata) — Gestor de datos C
- [FFI\CType](#class.ffi-ctype) — Gestor de tipo C<li>[FFI\CType::getAlignment](#ffi-ctype.getalignment) — Descripción
- [FFI\CType::getArrayElementType](#ffi-ctype.getarrayelementtype) — Descripción
- [FFI\CType::getArrayLength](#ffi-ctype.getarraylength) — Descripción
- [FFI\CType::getAttributes](#ffi-ctype.getattributes) — Descripción
- [FFI\CType::getEnumKind](#ffi-ctype.getenumkind) — Descripción
- [FFI\CType::getFuncABI](#ffi-ctype.getfuncabi) — Descripción
- [FFI\CType::getFuncParameterCount](#ffi-ctype.getfuncparametercount) — Recuperar el número de argumentos de un tipo de función
- [FFI\CType::getFuncParameterType](#ffi-ctype.getfuncparametertype) — Recuperar el tipo de un parámetro de función
- [FFI\CType::getFuncReturnType](#ffi-ctype.getfuncreturntype) — Descripción
- [FFI\CType::getKind](#ffi-ctype.getkind) — Descripción
- [FFI\CType::getName](#ffi-ctype.getname) — Descripción
- [FFI\CType::getPointerType](#ffi-ctype.getpointertype) — Descripción
- [FFI\CType::getSize](#ffi-ctype.getsize) — Descripción
- [FFI\CType::getStructFieldNames](#ffi-ctype.getstructfieldnames) — Descripción
- [FFI\CType::getStructFieldOffset](#ffi-ctype.getstructfieldoffset) — Descripción
- [FFI\CType::getStructFieldType](#ffi-ctype.getstructfieldtype) — Descripción
  </li>- [Excepciones FFI](#class.ffi-exception)
- [FFI\ParserException](#class.ffi-parserexception) — Excepciones del analizador sintáctico FFI
