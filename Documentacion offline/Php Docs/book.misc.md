# Funciones varias

# Introducción

Estas funciones han sido colocadas aquí debido a que ninguna de ellas parece
encajar en las demás categorías.

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#misc.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración diversos**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [ignore_user_abort](#ini.ignore-user-abort)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [highlight.string](#ini.syntax-highlighting)
      "#DD0000"
      **[INI_ALL](#constant.ini-all)**
       



      [highlight.comment](#ini.syntax-highlighting)
      "#FF8000"
      **[INI_ALL](#constant.ini-all)**
       



      [highlight.keyword](#ini.syntax-highlighting)
      "#007700"
      **[INI_ALL](#constant.ini-all)**
       



      [highlight.default](#ini.syntax-highlighting)
      "#0000BB"
      **[INI_ALL](#constant.ini-all)**
       



      [highlight.html](#ini.syntax-highlighting)
      "#000000"
      **[INI_ALL](#constant.ini-all)**
       



      [browscap](#ini.browscap)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

    Aquí hay una aclaración sobre

el uso de las directivas de configuración.

     ignore_user_abort
     [bool](#language.types.boolean)



      **[false](#constant.false)** por omisión. Si se cambia a **[true](#constant.true)** los scripts no se
      terminarán después de que el cliente anule su conexión.




      Ver también [ignore_user_abort()](#function.ignore-user-abort).








      highlight.bg
      [string](#language.types.string)


      highlight.comment
      [string](#language.types.string)


      highlight.default
      [string](#language.types.string)


      highlight.html
      [string](#language.types.string)


      highlight.keyword
      [string](#language.types.string)


      highlight.string
      [string](#language.types.string)



       Colores utilizados para el modo de resaltado sintáctico.
       Estas opciones pueden tomar cualquier valor válido en
       &lt;font color="??????"&gt;.








     browscap
     [string](#language.types.string)



      Nombre del archivo de descripción de clientes HTML.
      (ej.: browscap.ini)
      Ver también
      [get_browser()](#function.get-browser).


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[CONNECTION_ABORTED](#constant.connection-aborted)**
    ([int](#language.types.integer))









    **[CONNECTION_NORMAL](#constant.connection-normal)**
    ([int](#language.types.integer))









    **[CONNECTION_TIMEOUT](#constant.connection-timeout)**
    ([int](#language.types.integer))









    **[__COMPILER_HALT_OFFSET__](#constant.compiler-halt-offset)**
    ([int](#language.types.integer))

# Funciones Varias

# connection_aborted

(PHP 4, PHP 5, PHP 7, PHP 8)

connection_aborted — Indica si el usuario ha abandonado la conexión HTTP

### Descripción

**connection_aborted**(): [int](#language.types.integer)

Indica si el usuario ha abandonado la conexión HTTP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve 1 si el cliente está desconectado, 0 en caso contrario.

### Ver también

    - [connection_status()](#function.connection-status) - Devuelve los bits de estado de la conexión HTTP

    - [ignore_user_abort()](#function.ignore-user-abort) - Activa la interrupción de script al desconectarse el visitante

    -
     [Gestor de conexión](#features.connection-handling)
     para una descripción completa del gestor de conexión en PHP.

# connection_status

(PHP 4, PHP 5, PHP 7, PHP 8)

connection_status — Devuelve los bits de estado de la conexión HTTP

### Descripción

**connection_status**(): [int](#language.types.integer)

Devuelve los bits de estado de la conexión HTTP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los bits de estado de la conexión, que pueden ser utilizados
con las constantes
[\*_<a href="#constant.connection-aborted">CONNECTION\__](#misc.constants)\*\*</a>
para determinar el estado de la conexión.

### Ver también

    - [connection_aborted()](#function.connection-aborted) - Indica si el usuario ha abandonado la conexión HTTP

    - [ignore_user_abort()](#function.ignore-user-abort) - Activa la interrupción de script al desconectarse el visitante

    -
     [Gestor de conexión](#features.connection-handling)
     para una descripción completa del gestor de conexión en PHP.

# constant

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

constant — Retorna el valor de una constante

### Descripción

**constant**([string](#language.types.string) $name): [mixed](#language.types.mixed)

Retorna el valor de la constante name.

**constant()** es útil cuando se debe leer el valor de una constante, pero su nombre solo se conoce durante la ejecución del script. Por ejemplo, este nombre puede ser el resultado de una función.

Esta función también funciona con las [constantes de clase](#language.oop5.constants) y [tipos enum](#language.types.enumerations).

### Parámetros

     name


       El nombre de la constante.





### Valores devueltos

Retorna el valor de la constante.

### Errores/Excepciones

Si la constante no está definida, se lanza una excepción [Error](#class.error). Anteriormente a PHP 8.0.0, se emitía un error de nivel **[E_WARNING](#constant.e-warning)** en este caso.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si la constante no está definida, **constant()** ahora lanza una excepción [Error](#class.error); anteriormente se emitía un **[E_WARNING](#constant.e-warning)** y se retornaba **[null](#constant.null)**.



### Ejemplos

    **Ejemplo #1 Uso de la función constant()** con constantes

&lt;?php

define("MAXSIZE", 100);

echo MAXSIZE;
echo constant("MAXSIZE"); // idéntico a la línea anterior

interface bar {
const test = 'foobar!';
}

class foo {
const test = 'foobar!';
}

$const = 'test';

var_dump(constant('bar::'. $const)); // string(7) "foobar!"
var_dump(constant('foo::'. $const)); // string(7) "foobar!"

?&gt;

    **Ejemplo #2 Uso de la función constant()** con tipos enum (a partir de PHP 8.1.0)

&lt;?php

enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

$case = 'Hearts';

var_dump(constant('Suit::'. $case)); // enum(Suit::Hearts)

?&gt;

### Ver también

    - [define()](#function.define) - Define una constante

    - [defined()](#function.defined) - Verifica si una constante con el nombre dado existe

    - [get_defined_constants()](#function.get-defined-constants) - Devuelve la lista de constantes y sus valores

    - La sección sobre las [constantes](#language.constants)

# define

(PHP 4, PHP 5, PHP 7, PHP 8)

define — Define una constante

### Descripción

**define**([string](#language.types.string) $constant_name, [mixed](#language.types.mixed) $value, [bool](#language.types.boolean) $case_insensitive = **[false](#constant.false)**): [bool](#language.types.boolean)

Define una constante durante la ejecución.

### Parámetros

     constant_name


       El nombre de la constante.



      **Nota**:



        Es posible definir con **define()** constantes
        con nombres reservados o incluso inválidos, donde sus valores pueden (solo)
        ser recuperados con la función [constant()](#function.constant).
        Sin embargo, hacer esto no se recomienda.







     value


       El valor de la constante.



      **Advertencia**

        Aunque es técnicamente posible definir constantes de tipo
        [resource](#language.types.resource), esto se desaconseja y puede causar comportamientos inesperados.







     case_insensitive


       Si es **[true](#constant.true)**, el nombre de la constante será insensible a mayúsculas/minúsculas:
       CONSTANT y Constant
       representan valores idénticos.



      **Advertencia**

        Definir constantes insensibles a mayúsculas/minúsculas está deprecado a partir de PHP 7.3.0.
        A partir de PHP 8.0.0, solo **[false](#constant.false)** es un valor aceptable,
        pasar **[true](#constant.true)** producirá una advertencia.




      **Nota**:



        Las constantes insensibles a mayúsculas/minúsculas se almacenan en minúsculas.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        value ahora puede ser un objeto.




       8.0.0

        Pasar **[true](#constant.true)** a case_insensitive ahora emite una **[E_WARNING](#constant.e-warning)**.
        Pasar **[false](#constant.false)** sigue siendo permitido.




       7.3.0

        case_insensitive está deprecado y será eliminado en la versión 8.0.0.





### Ejemplos

    **Ejemplo #1 Definición de una constante**

&lt;?php
define("CONSTANT", "Hola mundo.");
echo CONSTANT; // muestra "Hola mundo."
echo Constant; // muestra "Constant" y emite una advertencia

define("GREETING", "Hola tú.", true);
echo GREETING; // muestra "Hola tú."
echo Greeting; // muestra "Hola tú."

// Funciona desde PHP 7
define('ANIMALS', array(
'perro',
'gato',
'aves'
));
echo ANIMALS[1]; // muestra "gato"

?&gt;

    **Ejemplo #2 Constantes con Nombres Reservados**



     Este ejemplo ilustra la *posibilidad* de definir una
     constante con el mismo nombre que una
     [constante mágica](#language.constants.magic).
     Dado que el comportamiento resultante es confuso, esta práctica
     no se recomienda.

&lt;?php
var_dump(defined('**LINE**'));
var_dump(define('**LINE**', 'test'));
var_dump(constant('**LINE**'));
var_dump(**LINE**);
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(true)
string(4) "test"
int(5)

### Ver también

    - [defined()](#function.defined) - Verifica si una constante con el nombre dado existe

    - [constant()](#function.constant) - Retorna el valor de una constante

    - La sección sobre las [constantes](#language.constants)

# defined

(PHP 4, PHP 5, PHP 7, PHP 8)

defined — Verifica si una constante con el nombre dado existe

### Descripción

**defined**([string](#language.types.string) $constant_name): [bool](#language.types.boolean)

Verifica si una constante con el nombre constant_name existe.

Esta función también funciona con las [constantes de clase](#language.oop5.constants) y los [tipos enum](#language.types.enumerations).

**Nota**:

    Si se desea verificar si una variable existe,
    utilice [isset()](#function.isset) ya que **defined()**
    solo se aplica a las [constantes](#language.constants).
    Si se desea ver si una función existe, utilice
    [function_exists()](#function.function-exists).

### Parámetros

     constant_name


       El nombre de la constante.





### Valores devueltos

Retorna **[true](#constant.true)** si el nombre de la constante proporcionado por el argumento
constant_name ha sido definido, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Verificar la presencia de constantes con defined()**

&lt;?php
/\* Observe que el nombre de la constante está entre comillas. Este ejemplo verifica

- si la cadena 'TEST' es el nombre de la constante llamada TEST \*/
  if (defined('TEST')) {
  echo TEST;
  }

interface bar {
const test = 'foobar!';
}

class foo {
const test = 'foobar!';
}

var_dump(defined('bar::test')); // bool(true)
var_dump(defined('foo::test')); // bool(true)

?&gt;

    **Ejemplo #2 Verificación de tipos enum (a partir de PHP 8.1.0)**

&lt;?php

enum Suit
{
case Hearts;
case Diamonds;
case Clubs;
case Spades;
}

var_dump(defined('Suit::Hearts')); // bool(true)
?&gt;

### Ver también

    - [define()](#function.define) - Define una constante

    - [constant()](#function.constant) - Retorna el valor de una constante

    - [get_defined_constants()](#function.get-defined-constants) - Devuelve la lista de constantes y sus valores

    - [function_exists()](#function.function-exists) - Indica si una función está definida

    - La sección sobre las [constantes](#language.constants)

# die

(PHP 4, PHP 5, PHP 7, PHP 8)

die — Alias de la función exit

### Descripción

Esta función es un alias de:
[exit()](#function.exit).

# eval

(PHP 4, PHP 5, PHP 7, PHP 8)

eval — Ejecuta una cadena como un script PHP

### Descripción

**eval**([string](#language.types.string) $code): [mixed](#language.types.mixed)

Evalúa el code proporcionado como código PHP.

El código en evaluación hereda el
[ámbito de las variables](#language.variables.scope)
de la línea en la que se realiza la llamada a **eval()**.
Todas las variables disponibles en esa línea serán accesibles en lectura y
modificación en el código evaluado.
Sin embargo, todas las funciones y clases definidas se definirán en el espacio de nombres global.
En otras palabras, el compilador considera el código evaluado como si se tratara de
un [archivo incluido](#function.include) separado.

**Precaución**

    La construcción de lenguaje **eval()** es
    *muy peligrosa* ya que permite la ejecución
    de código PHP arbitrario. *Su uso se desaconseja
    encarecidamente.* Si se ha verificado cuidadosamente que
    no hay otras opciones que utilizarla, se debe prestar una atención
    especial *a no pasar datos provenientes de un usuario*
    sin haberlos validado previamente de manera minuciosa.

### Parámetros

     code


       Código PHP válido a evaluar.




       El código no debe estar rodeado de
       [etiquetas PHP](#language.basic-syntax.phpmode)
       de apertura y cierre, es decir, 'echo "Hi!";'
       debe ser pasado en lugar de
       '&lt;?php echo "Hi!"; &gt;'.
       Siempre es posible salir y volver al modo PHP
       utilizando las etiquetas PHP apropiadas, es decir,
       'echo "En modo PHP !"; ?&gt;En modo HTML !&lt;?php echo "Retorno al modo PHP !";'.




       Además de esto, el código PHP pasado debe ser válido. Esto incluye que todas las
       instrucciones deben terminar con un punto y coma.
       'echo "Hi!"' por ejemplo resultará en un error fatal, mientras que
       'echo "Hi!";' funcionará.




       Una instrucción return terminará inmediatamente la evaluación del código.




       El código se ejecutará en el ámbito del código que llama a la función
       **eval()**. Por lo tanto, todas las variables definidas o modificadas
       en la llamada a la función **eval()** seguirán siendo visibles después
       de la finalización de la ejecución de la función.





### Valores devueltos

**eval()** devuelve **[null](#constant.null)** a menos que
return sea llamado en el código evaluado,
en cuyo caso el valor pasado a return
es devuelto. A partir de PHP 7, si hay un error de sintaxis en
el código evaluado, **eval()** lanza una excepción [ParseError](#class.parseerror).
Antes de PHP 7, en este caso **eval()** devuelve **[false](#constant.false)**
y la ejecución del código siguiente continúa normalmente. No
es posible capturar el error de análisis de la
función **eval()** utilizando la función
[set_error_handler()](#function.set-error-handler).

### Ejemplos

    **Ejemplo #1 Ejemplo con eval()** - concatenación de texto

&lt;?php
$string = 'taza';
$name = 'café';
$str = 'Esto es un $string con mi $name dentro.&lt;br /&gt;';
echo $str;
eval( "\$str = \"$str\";" );
echo $str;
?&gt;

    El ejemplo anterior mostrará:

Esto es un $string con mi $name dentro.
Esto es una taza con mi café dentro.

### Notas

**Nota**: Como esto es una estructura
del lenguaje, y no una función, no es posible llamarla
con las [funciones variables](#functions.variable-functions) o [argumentos nombrados](#functions.named-arguments).

**Sugerencia**
Al igual que con todas las funciones que muestran directamente resultados al navegador, las
[funciones de gestión de salida](#book.outcontrol) pueden ser utilizadas para capturar la salida
de esta función y almacenarla en un string (por ejemplo).

**Nota**:

    En caso de un error fatal en el código evaluado, todo el script se
    terminará.

### Ver también

    - [call_user_func()](#function.call-user-func) - Llama a una función de retorno proporcionada por el primer argumento

# exit

(PHP 4, PHP 5, PHP 7, PHP 8)

exit — Terminar el script en curso con un código de estado o un mensaje

### Descripción

**exit**([string](#language.types.string)|[int](#language.types.integer) $status = 0): [never](#language.types.never)

Termina el script actual.
Las [funciones de cierre](#function.register-shutdown-function)
y los [destructores de objetos](#language.oop5.decon.destructor)
siempre se ejecutarán incluso si exit es llamado.
Sin embargo, los bloques [finally](#language.exceptions.finally) nunca se ejecutan.

    Un código de salida de 0 se utiliza para indicar que el programa ha
    completado sus tareas correctamente. Cualquier otro valor indica que ocurrió un error
    durante la ejecución.




    **exit()** es una función especial,
    ya que dispone de un token dedicado en el analizador sintáctico.
    Puede ser utilizada como una instrucción (es decir, sin paréntesis)
    para terminar el script con el código de estado por defecto.

**Precaución**

     No es posible desactivar o crear una función en un espacio de nombres
     que reemplace la función global **exit()**.

### Parámetros

     status


       Si status es un string,
       esta función muestra status justo antes de salir.
       El código de salida devuelto por PHP es 0.


       Si status es un [int](#language.types.integer),
       el código de salida devuelto por PHP será status.


**Nota**:

         Los códigos de salida deben estar comprendidos entre 0 y 254.
         El código de salida 255 está reservado por PHP y no debe ser utilizado.





      **Advertencia**

        Antes de PHP 8.4.0, **exit()** no respetaba la
        [lógica habitual de manipulación de tipos](#language.types.type-juggling.function)
        de PHP ni la declaración
        [strict_types](#language.types.declarations.strict).




        Cualquier valor no [int](#language.types.integer) era convertido a [string](#language.types.string),
        incluyendo los valores de tipo [resource](#language.types.resource) y [array](#language.types.array).
        A partir de PHP 8.4.0, la función sigue la gestión estándar de tipos y genera una
        [TypeError](#class.typeerror) para los valores no válidos.






### Valores devueltos

Como esta función termina el script PHP, ningún valor es devuelto.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **exit()** es ahora una verdadera función,
       por lo tanto sigue la lógica habitual de
       [manipulación de tipos](#language.types.type-juggling.function),
       es afectada por la declaración
       [strict_types](#language.types.declarations.strict),
       puede ser llamada con argumentos nombrados y ser utilizada
       como una [función variable](#functions.variable-functions).



### Ejemplos

**Ejemplo #1 Ejemplo básico de la función exit()**

&lt;?php

// salir del programa normalmente
exit();
exit(0);

// salir con un código de error
exit(1);

?&gt;

**Ejemplo #2 Ejemplo de exit()** con un [string](#language.types.string)

&lt;?php

$filename = '/path/to/data-file';
$file = fopen($filename, 'r')
    or exit("no se puede abrir el archivo ($filename)");
?&gt;

**Ejemplo #3 Ejemplo de ejecución de funciones de cierre y destructores de objetos**

&lt;?php
class Foo
{
public function **destruct()
{
echo 'Destructor : ' . **METHOD\_\_ . '()' . PHP_EOL;
}
}

function shutdown()
{
echo 'Cierre : ' . **FUNCTION** . '()' . PHP_EOL;
}

$foo = new Foo();
register_shutdown_function('shutdown');

exit();
echo 'Esto nunca será mostrado.';
?&gt;

El ejemplo anterior mostrará:

Cierre : shutdown()
Destrucción : Foo::\_\_destruct()

**Ejemplo #4 exit()** como instrucción

&lt;?php

// salir del programa normalmente con el código de salida 0
exit;

?&gt;

### Notas

**Advertencia**

    A partir de PHP 8.4.0, **exit()** era una construcción del lenguaje
    y no una función, por lo tanto no era posible llamarla utilizando
    [funciones variables](#functions.variable-functions),
    o [argumentos nombrados](#functions.named-arguments).

### Ver también

- [register_shutdown_function()](#function.register-shutdown-function) - Registra una función de retrollamada para ejecución al cierre

- [Funciones de cierre](#function.register-shutdown-function)

- [destructores de objetos](#language.oop5.decon.destructor)

# get_browser

(PHP 4, PHP 5, PHP 7, PHP 8)

get_browser — Indica las capacidades del navegador cliente

### Descripción

**get_browser**([?](#language.types.null)[string](#language.types.string) $user_agent = **[null](#constant.null)**, [bool](#language.types.boolean) $return_array = **[false](#constant.false)**): [object](#language.types.object)|[array](#language.types.array)|[false](#language.types.singleton)

**get_browser()** intenta determinar las capacidades
del navegador cliente. Esto se realiza leyendo las informaciones
en el archivo browscap.ini.

### Parámetros

     user_agent


       El encabezado user agent a analizar. Por omisión, se utiliza el valor
       del encabezado User-Agent; sin embargo,
       puede alterarse (es decir, buscar otras informaciones sobre
       el navegador) pasando este argumento.




       Puede anularse este parámetro pasando el valor **[null](#constant.null)**.






     return_array


       Si se define como **[true](#constant.true)**, esta función retornará un [array](#language.types.array)
       en lugar de un [object](#language.types.object).





### Valores devueltos

Las informaciones se retornan en forma de un objeto,
cuyos diferentes miembros contendrán informaciones,
tales como las versiones mayores y menores y cadenas
de identificación; booleanos para características
como frames, JavaScript, y cookies; y así sucesivamente.

El valor cookies indica simplemente que el
navegador es capaz de aceptar cookies, y no indica
si el usuario las ha activado en su navegador. El único medio
de probar la activación de cookies es establecer una
con la función [setcookie()](#function.setcookie), recargar la página
y verificar que el cookie aún existe.

Retorna **[false](#constant.false)** si no se puede recuperar ninguna información, tal como
cuando la opción de configuración [browscap](#ini.browscap)
en php.ini no ha sido definida.

### Ejemplos

    **Ejemplo #1
     Ejemplo con get_browser()**:
     lista de capacidades del navegador del cliente web

&lt;?php
echo $\_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);
print_r($browser);
?&gt;

    Resultado del ejemplo anterior es similar a:

Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7) Gecko/20040803 Firefox/0.9.3

Array
(
[browser_name_regex] =&gt; ^mozilla/5\.0 (windows; .; windows nt 5\.1; ._rv:._) gecko/._ firefox/0\.9._$
[browser_name_pattern] =&gt; Mozilla/5.0 (Windows; ?; Windows NT 5.1; _rv:_) Gecko/_ Firefox/0.9_
[parent] =&gt; Firefox 0.9
[platform] =&gt; WinXP
[browser] =&gt; Firefox
[version] =&gt; 0.9
[majorver] =&gt; 0
[minorver] =&gt; 9
[cssversion] =&gt; 2
[frames] =&gt; 1
[iframes] =&gt; 1
[tables] =&gt; 1
[cookies] =&gt; 1
[backgroundsounds] =&gt;
[vbscript] =&gt;
[javascript] =&gt; 1
[javaapplets] =&gt; 1
[activexcontrols] =&gt;
[cdf] =&gt;
[aol] =&gt;
[beta] =&gt; 1
[win16] =&gt;
[crawler] =&gt;
[stripper] =&gt;
[wap] =&gt;
[netclr] =&gt;
)

### Notas

**Nota**:

    Para poder funcionar, la directiva de configuración
    [browscap](#ini.browscap) en el archivo php.ini
    debe apuntar al archivo browscap.ini del sistema.




    browscap.ini no se distribuye con PHP, pero puede
    descargarse en
    [» php_browscap.ini](http://browscap.org/).




    Aunque browscap.ini contiene informaciones
    sobre un gran número de navegadores, corresponde al usuario
    mantener su base de datos actualizada. El formato del archivo
    es muy sencillo de comprender.

# \_\_halt_compiler

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

\_\_halt_compiler —
Detiene la ejecución del compilador

### Descripción

**\_\_halt_compiler**(): [void](language.types.void.html)

Detiene la ejecución del compilador. Esto puede ser muy útil
para incrustar datos en scripts PHP, como archivos
de instalación.

El byte de la posición del inicio de los datos puede ser determinado por la
constante **[**COMPILER_HALT_OFFSET**](#constant.compiler-halt-offset)** que solo se define
si existe una función **\_\_halt_compiler()** presente
en el archivo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con __halt_compiler()**

&lt;?php

// Apertura de un archivo
$fp = fopen(**FILE**, 'r');

// Mueve el puntero de archivo hacia los datos
fseek($fp, **COMPILER_HALT_OFFSET**);

// Luego, se muestra
var_dump(stream_get_contents($fp));

// Fin de la ejecución del script
\_\_halt_compiler(); los datos de instalación (ej. tar, gz, PHP, etc..)

### Notas

**Nota**:

    **__halt_compiler()** solo puede ser utilizado
    desde un ámbito exterior.

# highlight_file

(PHP 4, PHP 5, PHP 7, PHP 8)

highlight_file — Coloración sintáctica de un fichero

### Descripción

**highlight_file**([string](#language.types.string) $filename, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)|[bool](#language.types.boolean)

Muestra la sintaxis colorizada del fichero filename,
utilizando los colores definidos en el motor interno de PHP.

Muchos servidores están configurados para mostrar automáticamente
el código fuente colorizado, con la extensión
_phps_. Por ejemplo,
example.phps muestra el código del script.
Para activar esta funcionalidad, utilice esta línea en
httpd.conf :

AddType application/x-httpd-php-source .phps

### Parámetros

     filename


       La ruta hacia el fichero PHP a colorizar.






     return


       Al pasar este argumento a **[true](#constant.true)**, la función
       devuelve el código colorizado en lugar de mostrarlo.





### Valores devueltos

Si el segundo parámetro opcional return vale **[true](#constant.true)**
entonces **highlight_file()** devolverá el código generado,
en lugar de mostrarlo. Si el segundo parámetro no vale **[true](#constant.true)** entonces
**highlight_file()** devolverá **[true](#constant.true)** en caso de éxito, y
**[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        El HTML resultante ha cambiado.





### Notas

**Precaución**

    Se debe tener mucho cuidado al utilizar
    **highlight_file()** para asegurarse de que no
    se revelen información crítica como contraseñas u otra información que
    podría causar fugas de información.

**Nota**:

Cuando el parámetro return es utilizado, esta función utiliza el buffer
interno de salida, por lo tanto no puede ser utilizado en la función de devolución de llamada de [ob_start()](#function.ob-start).

### Ver también

    - [highlight_string()](#function.highlight-string) - Aplica la sintaxis colorizada a código PHP

    - [Las directivas INI de coloración](#ini.syntax-highlighting)

# highlight_string

(PHP 4, PHP 5, PHP 7, PHP 8)

highlight_string — Aplica la sintaxis colorizada a código PHP

### Descripción

**highlight_string**([string](#language.types.string) $string, [bool](#language.types.boolean) $return = **[false](#constant.false)**): [string](#language.types.string)|[true](#language.types.singleton)

Muestra o devuelve el código HTML de la versión colorizada del código PHP contenido
en el argumento str, utilizando los colores del
sistema interno de coloración de PHP.

### Parámetros

     string


       El código PHP a colorizar. Debe incluir también las etiquetas de apertura.






     return


       Definir este argumento a **[true](#constant.true)** para que esta función devuelva
       el código colorizado.





### Valores devueltos

Si el segundo argumento opcional return es proporcionado,
y vale **[true](#constant.true)** entonces **highlight_string()** devolverá
la cadena colorizada en lugar de mostrarla inmediatamente. Si el segundo
argumento no vale **[true](#constant.true)** entonces **highlight_string()**
devolverá **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        El tipo de retorno ha pasado de [string](#language.types.string)|[bool](#language.types.boolean) a [string](#language.types.string)|[true](#language.types.singleton).




       8.3.0

        El HTML resultante ha cambiado.





### Ejemplos

    **Ejemplo #1 Ejemplo con highlight_string()**

&lt;?php
highlight_string('&lt;?php phpinfo(); ?&gt;');
?&gt;

    El ejemplo anterior mostrará:

&lt;code&gt;&lt;span style="color: #000000"&gt;
&lt;span style="color: #0000BB"&gt;&amp;lt;?php phpinfo&lt;/span&gt;&lt;span style="color: #007700"&gt;(); &lt;/span&gt;&lt;span style="color: #0000BB"&gt;?&amp;gt;&lt;/span&gt;
&lt;/span&gt;
&lt;/code&gt;

    Resultado del ejemplo anterior en PHP 8.3:

&lt;pre&gt;&lt;code style="color: #000000"&gt;&lt;span style="color: #0000BB"&gt;&amp;lt;?php phpinfo&lt;/span&gt;&lt;span style="color: #007700"&gt;(); &lt;/span&gt;&lt;span style="color: #0000BB"&gt;?&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

### Notas

**Nota**:

Cuando el parámetro return es utilizado, esta función utiliza el buffer
interno de salida, por lo tanto no puede ser utilizado en la función de devolución de llamada de [ob_start()](#function.ob-start).

El código HTML generado está sujeto a cambios.

### Ver también

    - [highlight_file()](#function.highlight-file) - Coloración sintáctica de un fichero

    - [Las directivas INI de coloración](#ini.syntax-highlighting)

# hrtime

(PHP 7 &gt;= 7.3.0, PHP 8)

hrtime — Devuelve el tiempo de alta resolución del sistema

### Descripción

**hrtime**([bool](#language.types.boolean) $as_number = **[false](#constant.false)**): [array](#language.types.array)|[int](#language.types.integer)|[float](#language.types.float)|[false](#language.types.singleton)

Devuelve el tiempo de alta resolución del sistema, contado a partir de un punto arbitrario en el tiempo.
La marca de tiempo proporcionada es monótona y no puede ser ajustada.

### Parámetros

     as_number


       Si el tiempo de alta resolución debe ser devuelto como [array](#language.types.array)
       o como número.





### Valores devueltos

Devuelve un array de enteros en la forma [segundos, nanosegundos], si el
argumento as_number es falso. De lo contrario, los nanosegundos
son devueltos como [int](#language.types.integer) (plataformas de 64 bits) o como [float](#language.types.float)
(plataformas de 32 bits).
Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de hrtime()**

&lt;?php
echo hrtime(true), PHP_EOL;
print_r(hrtime());
?&gt;

    Resultado del ejemplo anterior es similar a:

10444739687370679
Array
(
[0] =&gt; 10444739
[1] =&gt; 687464812
)

### Ver también

- La extensión de [Gestión del tiempo de alta resolución](#book.hrtime)

- [microtime()](#function.microtime) - Devuelve el timestamp UNIX actual con microsegundos

# ignore_user_abort

(PHP 4, PHP 5, PHP 7, PHP 8)

ignore_user_abort — Activa la interrupción de script al desconectarse el visitante

### Descripción

**ignore_user_abort**([?](#language.types.null)[bool](#language.types.boolean) $enable = **[null](#constant.null)**): [int](#language.types.integer)

**ignore_user_abort()** activa la opción que permite que,
al desconectarse el cliente Web, el script continúe
su ejecución.

Cuando PHP se ejecuta como script en línea de comandos, y el tty del script
se cierra sin que el script haya terminado, entonces el script
se detendrá tan pronto como intente escribir algo, a menos que
enable sea **[true](#constant.true)**

### Parámetros

     enable


       Si está definido y no es **[null](#constant.null)**, la función asignará a la directiva
       [ignore_user_abort](#ini.ignore-user-abort)
       el valor de enable. Si se omite, esta
       función solo devuelve el valor de la configuración actual.





### Valores devueltos

Devuelve la configuración anterior, en forma de [int](#language.types.integer).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       enable ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con ignore_user_abort()**

&lt;?php
// Ignora la desconexión del usuario y permite
// que el script continúe ejecutándose
ignore_user_abort(true);
set_time_limit(0);

echo 'Prueba del gestor de conexión de PHP';

// Ejecución de un bucle infinito que monitorea
// la actividad del usuario. O bien hace clic fuera
// de la página, o bien hace clic en el botón "Stop".
while(1)
{
// ¿Ha fallado la conexión?
if(connection_status() != CONNECTION_NORMAL)
{
break;
}

    // Se espera 10 segundos
    sleep(10);

}

// Si se alcanza este punto, entonces la instrucción 'break'
// se ejecutará desde el bucle infinito

// Además, en este nivel se pueden ingresar datos en el historial,
// o ejecutar otras tareas necesarias, sin depender del navegador.
?&gt;

### Notas

PHP no detecta la desconexión del cliente Web hasta que
se intenta enviar algo. Simplemente usar un [echo](#function.echo) no garantiza
que la información se envíe, ver la función
[flush()](#function.flush).

### Ver también

    - [connection_aborted()](#function.connection-aborted) - Indica si el usuario ha abandonado la conexión HTTP

    - [connection_status()](#function.connection-status) - Devuelve los bits de estado de la conexión HTTP

    -
     [Gestor de conexión](#features.connection-handling)
     para una descripción completa del gestor de conexión en PHP.

# pack

(PHP 4, PHP 5, PHP 7, PHP 8)

pack — Compacta datos en una cadena binaria

### Descripción

**pack**([string](#language.types.string) $format, [mixed](#language.types.mixed) ...$values): [string](#language.types.string)

Compacta los argumentos args
en una cadena binaria, siguiendo el formato format.

El concepto proviene de Perl y todo el formato funciona
de la misma forma que en Perl, pero algunos formatos aún faltan
(como "u").

Tenga en cuenta que la distinción entre signado y no signado
solo afecta a la función [unpack()](#function.unpack), mientras que
la función **pack()** proporcionará el mismo
resultado para ambos formatos.

### Parámetros

     format


       La [string](#language.types.string) format consiste en códigos
       de formato seguidos por un argumento repetidor opcional. El repetidor
       puede ser un valor entero o * para una repetición hasta el final de los datos de entrada. Para a, A, h, H,
       el repetidor especifica cuántos caracteres de un dato se toman, para
       @, es la posición absoluta donde se insertan los próximos datos, para
       todo lo demás, el repetidor especifica cuántos argumentos de datos son
       consumidos y compactados en la cadena binaria resultante.




       Los formatos actualmente aceptados son:



        <caption>**Caracteres de formato para pack()**</caption>



           Código
           Descripción






           a
           NUL - Una cadena completada con **[null](#constant.null)**



           A
           SPACE - Una cadena completada con un espacio


           h
           Cadena hexadecimal h, bit de menor peso en primer lugar


           H
           Cadena hexadecimal H, bit de mayor peso en primer lugar


           c
           Carácter signado


           C
           Carácter no signado


           s
           entero corto signado (siempre 16 bits, orden de bytes dependiente de la máquina)



           S
           entero corto no signado (siempre 16 bits, orden de bytes dependiente de la máquina)



           n
           entero corto no signado (siempre 16 bits, orden de bytes big endian)



           v
           entero corto no signado (siempre 16 bits, orden de bytes little endian)



           i
           entero signado (tamaño y orden de bytes dependientes de la máquina)



           I
           entero no signado (tamaño y orden de bytes dependientes de la máquina)



           l
           entero largo signado (siempre 32 bits, orden de bytes dependiente de la máquina)



           L
           entero largo no signado (siempre 32 bits, orden de bytes dependiente de la máquina)



           N
           entero largo no signado (siempre 32 bits, orden de bytes big endian)



           V
           entero largo no signado (siempre 32 bits, orden de bytes little endian)



           q
           entero doblemente largo signado (siempre 64 bits, orden de bytes dependiente de la máquina)



           Q
           entero doblemente largo no signado (siempre 64 bits, orden de bytes dependiente de la máquina)



           J
           entero doblemente largo no signado (siempre 64 bits, orden de bytes big endian)



           P
           entero doblemente largo no signado (siempre 64 bits, orden de bytes little endian)



           f
           número de coma flotante (tamaño y representación dependientes de la máquina)



           g
           número de coma flotante (tamaño dependiente de la máquina, orden de bytes little endian)



           G
           número de coma flotante (tamaño dependiente de la máquina, orden de bytes big endian)



           d
           número de coma flotante doble (tamaño y representación dependientes de la máquina)



           e
           número de coma flotante doble (tamaño dependiente de la máquina, orden de bytes little endian)



           E
           número de coma flotante doble (tamaño dependiente de la máquina, orden de bytes big endian)



           x
           carácter NUL



           X
           Retrocede un carácter



           Z
           La cadena terminada por NUL (ASCIIZ) será completada con el valor NULL



           @
           Rellena con NUL hasta la posición absoluta










     values







### Valores devueltos

Devuelve una [string](#language.types.string) binaria que contiene los datos.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ya no devuelve **[false](#constant.false)** en caso de error.




       7.2.0

        Los tipos [float](#language.types.float) y [double](#language.types.float) admiten Big Endian y Little Endian.




       7.0.15, 7.1.1

        Se han añadido los códigos "e", "E", "g" y "G" para activar la
        compatibilidad con el orden de bytes para los números de coma flotante
        de simple y doble precisión.





### Ejemplos

    **Ejemplo #1 Ejemplo con pack()**

&lt;?php
$binarydata = pack("nvc\*", 0x1234, 0x5678, 65, 66);
?&gt;

     La cadena binaria resultante tendrá 6 bytes de longitud,
     y contendrá la secuencia 0x12, 0x34, 0x78, 0x56, 0x41, 0x42.

### Notas

**Precaución**

    Los códigos de formato q, Q, J y P no están disponibles
    en las versiones de PHP de 32 bits.

**Precaución**
Tenga en cuenta que PHP almacena internamente los valores [int](#language.types.integer) como valores
signados dependientes de la máquina.
Las operaciones sobre enteros que llevan a números fuera del espacio de
definición del [int](#language.types.integer) serán almacenados como [float](#language.types.float).
Al empaquetar estos flotantes en enteros, se convierten al tipo entero. Esto puede
llevar potencialmente a una representación inesperada de los bytes.

El caso más clásico es el empaquetado de números no signados que serían
representables en el tipo [int](#language.types.integer) si este fuera no signado.
En los sistemas con un [int](#language.types.integer) de 32 bits, la conversión
resulta en un byte idéntico al que si el tipo [int](#language.types.integer) fuera no signado
(aunque esto sigue dependiendo de la implementación no signada a signada, del estándar C).
En los sistemas con un [int](#language.types.integer) de 64 bits, el
[float](#language.types.float) no suele tener una mantisa lo suficientemente amplia para contener el valor
sin pérdida de precisión. Si estos sistemas también poseen un tipo C nativo
int de 64 bits (la mayoría de los \*NIX no lo tienen), la única forma
de usar el formato de empaquetado I en valores altos es crear
valores [int](#language.types.integer) negativos con la misma representación de bytes que la
valor no signado deseado correspondiente.

### Ver también

    - [unpack()](#function.unpack) - Desempaqueta datos desde una cadena binaria

# php_strip_whitespace

(PHP 5, PHP 7, PHP 8)

php_strip_whitespace — Devuelve la fuente sin comentarios ni espacios en blanco

### Descripción

**php_strip_whitespace**([string](#language.types.string) $filename): [string](#language.types.string)

Devuelve el código fuente PHP del argumento filename
habiendo eliminado los comentarios así como los espacios. Esto puede ser
útil para comparar la cantidad de código con la cantidad de comentarios en
su código. Esto equivale a utilizar el comando **php -w**
desde la [línea de comandos](#features.commandline).

### Parámetros

     filename


       Ruta hacia el fichero PHP.





### Valores devueltos

El código fuente limpiado será devuelto en caso de éxito o una cadena
vacía en caso de fallo.

**Nota**:

    Esta función respeta el valor de la directiva INI
    [short_open_tag](#ini.short-open-tag).

### Ejemplos

    **Ejemplo #1 Ejemplo con php_strip_whitespace()**

&lt;?php
// Comentario PHP aquí

/\*

- Otro comentario PHP
  \*/

echo php_strip_whitespace(**FILE**);
// Los saltos de línea son considerados como espacios y por lo tanto también son eliminados:
do_nothing();
?&gt;

    El ejemplo anterior mostrará:

&lt;?php
echo php_strip_whitespace(**FILE**); do_nothing(); ?&gt;

     Observe que los comentarios PHP ya no están presentes, al igual que los espacios y los
     saltos de línea después del primer echo.

# sapi_windows_cp_conv

(PHP 7 &gt;= 7.1.0, PHP 8)

sapi_windows_cp_conv — Convierte un string de una página de código a otra

### Descripción

**sapi_windows_cp_conv**([int](#language.types.integer)|[string](#language.types.string) $in_codepage, [int](#language.types.integer)|[string](#language.types.string) $out_codepage, [string](#language.types.string) $subject): [?](#language.types.null)[string](#language.types.string)

Convierte un string de una página de código a otra.

### Parámetros

    in_codepage


      La página de código del string subject.
      Puede ser el nombre o el identificador de la página de código.






    out_codepage


      La página de código a la que se convertirá el string subject.
      Puede ser el nombre o el identificador de la página de código.






    subject


      El string a convertir.


### Valores devueltos

El string subject convertido a
out_codepage, o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Esta función emite errores de nivel E_WARNING si se proporcionan páginas de código no válidas,
o si el sujeto no es válido para in_codepage.

### Ver también

- [sapi_windows_cp_get()](#function.sapi-windows-cp-get) - Devuelve la página de código actual

- [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

# sapi_windows_cp_get

(PHP 7 &gt;= 7.1.0, PHP 8)

sapi_windows_cp_get — Devuelve la página de código actual

### Descripción

**sapi_windows_cp_get**([string](#language.types.string) $kind = ""): [int](#language.types.integer)

Devuelve la página de código actual.

### Parámetros

    kind


      El tipo de página de código del sistema operativo a obtener,
      ya sea 'ansi' o 'oem'.
      Cualquier otro valor hace referencia a la página de código actual del proceso.


### Valores devueltos

Si kind es 'ansi',
se devuelve la página de código ANSI actual del sistema operativo.
Si kind es 'oem',
se devuelve la página de código OEM actual del sistema operativo.
En caso contrario, se devuelve la página de código actual del proceso.

### Ver también

- [sapi_windows_cp_set()](#function.sapi-windows-cp-set) - Establece la página de código del proceso

# sapi_windows_cp_is_utf8

(PHP 7 &gt;= 7.1.0, PHP 8)

sapi_windows_cp_is_utf8 — Indica si la página de código es compatible con UTF-8

### Descripción

**sapi_windows_cp_is_utf8**(): [bool](#language.types.boolean)

Indica si la página de código del proceso actual es compatible con UTF-8.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si la página de código del proceso actual es compatible con UTF-8.

### Ver también

- [sapi_windows_cp_get()](#function.sapi-windows-cp-get) - Devuelve la página de código actual

# sapi_windows_cp_set

(PHP 7 &gt;= 7.1.0, PHP 8)

sapi_windows_cp_set — Establece la página de código del proceso

### Descripción

**sapi_windows_cp_set**([int](#language.types.integer) $codepage): [bool](#language.types.boolean)

Establece la página de código del proceso actual.

### Parámetros

    codepage


      Un identificador de página de código.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [sapi_windows_cp_get()](#function.sapi-windows-cp-get) - Devuelve la página de código actual

# sapi_windows_generate_ctrl_event

(PHP 7 &gt;= 7.4.0, PHP 8)

sapi_windows_generate_ctrl_event — Envía un evento CTRL a otro proceso

### Descripción

**sapi_windows_generate_ctrl_event**([int](#language.types.integer) $event, [int](#language.types.integer) $pid = 0): [bool](#language.types.boolean)

Envía un evento CTRL a otro proceso en el mismo grupo de procesos.

### Parámetros

    event


      El evento CTRL a enviar;
      puede ser **[PHP_WINDOWS_EVENT_CTRL_C](#constant.php-windows-event-ctrl-c)**
      o **[PHP_WINDOWS_EVENT_CTRL_BREAK](#constant.php-windows-event-ctrl-break)**.






    pid


      El identificador del proceso al cual enviar el evento. Si se proporciona 0,
      el evento se envía a todos los procesos del grupo de procesos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Uso básico de sapi_windows_generate_ctrl_event()**

     Este ejemplo muestra cómo enviar un evento CTRL+BREAK a un
     proceso hijo. En este caso, el proceso hijo muestra I'm still alive
     cada segundo, hasta que el usuario presiona CTRL+BREAK, lo que provoca
     la detención del proceso hijo.

&lt;?php
// agregar el evento CTRL+BREAK al proceso hijo
sapi_windows_set_ctrl_handler('sapi_windows_generate_ctrl_event');

// crear un proceso hijo que muestra un mensaje cada segundo
$cmd = ['php', '-r', 'while (true) { echo "I\'m still alive\n"; sleep(1); }'];
$descspec = array(['pipe', 'r'], ['pipe', 'w'], ['pipe', 'w']);
$options = ['create_process_group' =&gt; true];
$proc = proc_open($cmd, $descspec, $pipes, null, null, $options);
while (true) {
    echo fgets($pipes[1]);
}
?&gt;

### Ver también

- [proc_open()](#function.proc-open) - Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas

- [sapi_windows_set_ctrl_handler()](#function.sapi-windows-set-ctrl-handler) - Establece o elimina un gestor de eventos CTRL

# sapi_windows_set_ctrl_handler

(PHP 7 &gt;= 7.4.0, PHP 8)

sapi_windows_set_ctrl_handler — Establece o elimina un gestor de eventos CTRL

### Descripción

**sapi_windows_set_ctrl_handler**([?](#language.types.null)[callable](#language.types.callable) $handler, [bool](#language.types.boolean) $add = **[true](#constant.true)**): [bool](#language.types.boolean)

Establece o elimina un gestor de eventos CTRL, que permite a los procesos CLI de Windows
interceptar o ignorar los eventos CTRL+C y
CTRL+BREAK. Tenga en cuenta que en entornos multihilo,
esto solo es posible cuando se llama desde el hilo principal.

### Parámetros

    handler


      Una función de retrollamada a establecer o eliminar. Si se establece, esta función será llamada
      cada vez que ocurra un evento

       CTRL
       +C

      o

       CTRL
       +BREAK
      .
      La función debe tener la siguiente firma:



       **handler**([int](#language.types.integer) $event): [void](language.types.void.html)



        event


          El evento CTRL que se ha recibido;
          ya sea **[PHP_WINDOWS_EVENT_CTRL_C](#constant.php-windows-event-ctrl-c)**
          o **[PHP_WINDOWS_EVENT_CTRL_BREAK](#constant.php-windows-event-ctrl-break)**.




      Establecer un **[null](#constant.null)** handler hace que el proceso ignore
      los eventos

       CTRL
       +C

      o

       CTRL
       +BREAK
      .




    add


      Si **[true](#constant.true)**, el gestor se establece. Si **[false](#constant.false)**, el gestor se elimina.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Uso básico de sapi_windows_set_ctrl_handler()**

     Este ejemplo muestra cómo interceptar los eventos CTRL.

&lt;?php
function ctrl_handler(int $event)
{
    switch ($event) {
case PHP_WINDOWS_EVENT_CTRL_C:
echo "Se ha presionado CTRL+C\n";
break;
case PHP_WINDOWS_EVENT_CTRL_BREAK:
echo "Se ha presionado CTRL+BREAK\n";
break;
}
}

sapi_windows_set_ctrl_handler('ctrl_handler');
while (true); // bucle infinito, para que el gestor pueda ser activado
?&gt;

### Ver también

- [sapi_windows_generate_ctrl_event()](#function.sapi-windows-generate-ctrl-event) - Envía un evento CTRL a otro proceso

# sapi_windows_vt100_support

(PHP 7 &gt;= 7.2.0, PHP 8)

sapi_windows_vt100_support — Obtiene o define el soporte VT100 para el flujo especificado asociado a un búfer de salida de una consola Windows.

### Descripción

**sapi_windows_vt100_support**([resource](#language.types.resource) $stream, [?](#language.types.null)[bool](#language.types.boolean) $enable = **[null](#constant.null)**): [bool](#language.types.boolean)

Si enable es **[null](#constant.null)**, la función retorna **[true](#constant.true)** si el flujo stream tiene los códigos de control VT100 activados, de lo contrario **[false](#constant.false)**.

Si enable es un [bool](#language.types.boolean), la función intentará activar o desactivar las funcionalidades VT100 del flujo stream.
Si la funcionalidad ha sido activada (o desactivada) con éxito, la función retornará **[true](#constant.true)**, o **[false](#constant.false)** en caso contrario.

Al inicio, PHP intenta activar la funcionalidad VT100 de los flujos **[STDOUT](#constant.stdout)**/**[STDERR](#constant.stderr)**. Por cierto, si estos flujos son redirigidos a un fichero, las funcionalidades VT100 pueden no ser activadas.

Si el soporte VT100 está activado, es posible utilizar secuencias de control tal como son conocidas por el terminal VT100.
Estas permiten la modificación de la salida del terminal. En Windows, estas secuencias son llamadas secuencias de terminal virtual de consola (Console Virtual Terminal Sequences).

**Advertencia**

    Esta función utiliza el flag **[ENABLE_VIRTUAL_TERMINAL_PROCESSING](#constant.enable-virtual-terminal-processing)** implementado en la API de Windows 10, por lo que la funcionalidad VT100 puede no estar disponible en versiones antiguas de Windows.

### Parámetros

    stream


      El flujo sobre el cual la función operará.






    enable


      Si es [bool](#language.types.boolean), la funcionalidad VT100 será activada (si es **[true](#constant.true)**) o desactivada (si es **[false](#constant.false)**).


### Valores devueltos

Si enable es **[null](#constant.null)**: retorna **[true](#constant.true)** si la funcionalidad VT100 está activada, de lo contrario **[false](#constant.false)**.

Si enable es un [bool](#language.types.boolean): Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       enable ahora es nullable.



### Ejemplos

**Ejemplo #1 Estado por defecto de sapi_windows_vt100_support()**

    Por omisión, **[STDOUT](#constant.stdout)** y **[STDERR](#constant.stderr)** tienen la funcionalidad VT100 activada.

php -r "var_export(sapi_windows_vt100_support(STDOUT));echo ' ';var_export(sapi_windows_vt100_support(STDERR));"

Resultado del ejemplo anterior es similar a:

true true

    Además, si un flujo es redirigido, la funcionalidad VT100 no será activada:

php -r "var_export(sapi_windows_vt100_support(STDOUT));echo ' ';var_export(sapi_windows_vt100_support(STDERR));" 2&gt;NUL

Resultado del ejemplo anterior es similar a:

    true false

**Ejemplo #2 sapi_windows_vt100_support()** cambiando el estado

    No será posible activar la funcionalidad VT100 de **[STDOUT](#constant.stdout)** o **[STDERR](#constant.stderr)** si el flujo es redirigido.

php -r "var_export(sapi_windows_vt100_support(STDOUT, true));echo ' ';var_export(sapi_windows_vt100_support(STDERR, true));" 2&gt;NUL

Resultado del ejemplo anterior es similar a:

true false

**Ejemplo #3 Ejemplo de uso con soporte VT100 activado**

&lt;?php
$out = fopen('php://stdout','w');
fwrite($out, 'Just forgot a lettr.');
// mueve el cursor dos caracteres hacia atrás
fwrite($out, "\033[2D");
// Inserta un espacio, desplazando el texto existente hacia la derecha -&gt; Just forgot a lett r.
fwrite($out, "\033[1@");
fwrite($out, 'e');
?&gt;

    El ejemplo anterior mostrará:

Just forgot a letter.

# show_source

(PHP 4, PHP 5, PHP 7, PHP 8)

show_source — Alias de [highlight_file()](#function.highlight-file)

### Descripción

Esta función es un alias de:
[highlight_file()](#function.highlight-file).

# sleep

(PHP 4, PHP 5, PHP 7, PHP 8)

sleep — Detiene la ejecución durante algunos segundos

### Descripción

**sleep**([int](#language.types.integer) $seconds): [int](#language.types.integer)

Detiene la ejecución del programa durante
seconds segundos.

**Nota**:

    Para retrasar la ejecución de un programa durante una fracción de segundo,
    utilice la función [usleep()](#function.usleep) ya que la función **sleep()** espera un [int](#language.types.integer).
    Por ejemplo, sleep(0.25) retrasará la ejecución del programa durante 0 segundos.

### Parámetros

     seconds


       El tiempo de detención, en número de segundos (debe ser superior o igual a 0).





### Valores devueltos

Retorna cero en caso de éxito.

Si la llamada es interrumpida por una señal, la función
**sleep()** retornará un valor diferente de
cero. En Windows, el valor será siempre
192 (el valor de la constante
**[WAIT_IO_COMPLETION](#constant.wait-io-completion)** de la API de Windows).
En otras plataformas, el valor retornado será el número
de segundos restantes para la función **sleep()**.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) si el número seconds especificado
es negativo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       La función lanza una [ValueError](#class.valueerror) si seconds es negativo;
       anteriormente, se generaba un error de nivel **[E_WARNING](#constant.e-warning)** y la función retornaba **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con sleep()**

&lt;?php

// Hora actual
echo date('h:i:s') . "\n";

// Detiene por 10 segundos
sleep(10);

// ¡Regreso!
echo date('h:i:s') . "\n";

?&gt;

     Este ejemplo mostrará (después de 10 segundos):

05:31:23
05:31:33

### Ver también

    - [usleep()](#function.usleep) - Detiene la ejecución durante algunas microsegundos

    - [time_nanosleep()](#function.time-nanosleep) - Esperar durante un número de segundos y nanosegundos

    - [time_sleep_until()](#function.time-sleep-until) - Detiene el script durante una duración especificada

    - [set_time_limit()](#function.set-time-limit) - Establece el tiempo máximo de ejecución de un script

# sys_getloadavg

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

sys_getloadavg — Obtiene la carga promedio del sistema

### Descripción

**sys_getloadavg**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve tres muestras que representan la carga promedio del
sistema (el número de procesos en el sistema que está en el proceso
de rotación en espera) durante los últimos 1, 5 y 15 minutos,
respectivamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) con tres muestras (últimos 1, 5 y 15
minutos). Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con sys_getloadavg()**

&lt;?php
$load = sys_getloadavg();
if ($load[0] &gt; 0.80) {
header('HTTP/1.1 503 Too busy, try again later');
die('Server too busy. Please try again later.');
}
?&gt;

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

# time_nanosleep

(PHP 5, PHP 7, PHP 8)

time_nanosleep — Esperar durante un número de segundos y nanosegundos

### Descripción

**time_nanosleep**([int](#language.types.integer) $seconds, [int](#language.types.integer) $nanoseconds): [array](#language.types.array)|[bool](#language.types.boolean)

**time_nanosleep()** impone un retraso de ejecución
de seconds segundos y
nanoseconds nanosegundos.

### Parámetros

     seconds


       Debe ser un integer no negativo.






     nanoseconds


       Debe ser un integer no negativo, inferior a 1000 millones.



      **Nota**:

        En Windows, el sistema puede esperar más tiempo que el número
        de nanosegundos dado, según el hardware.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si el retraso es interrumpido por una señal, se devolverá un array asociativo
con los elementos:

    -

      seconds: número de segundos restantes en el retraso



    -

      nanoseconds: número de nanosegundos restantes en el retraso


### Ejemplos

    **Ejemplo #1 Ejemplo con time_nanosleep()**

&lt;?php
// ¡Atención! Esto no funcionará como se espera si se devuelve un array
if (time_nanosleep(0, 500000000)) {
echo "Dormir durante media segundo.\n";
}

// Esto es mejor:
if (time_nanosleep(0, 500000000) === true) {
echo "Dormir durante media segundo.\n";
}

// Y esto es la mejor forma:
$nano = time_nanosleep(2, 100000);

if ($nano === true) {
    echo "Dormir durante 2 segundos y 100 microsegundos.\n";
} elseif ($nano === false) {
echo "El retraso ha fallado.\n";
} elseif (is_array($nano)) {
$seconds = $nano['seconds'];
$nanoseconds = $nano['nanoseconds'];
echo "Interrumpido por una señal.\n";
echo "Tiempo restante: $seconds segundos, $nanoseconds nanosegundos.";
}
?&gt;

### Ver también

    - [sleep()](#function.sleep) - Detiene la ejecución durante algunos segundos

    - [usleep()](#function.usleep) - Detiene la ejecución durante algunas microsegundos

    - [time_sleep_until()](#function.time-sleep-until) - Detiene el script durante una duración especificada

    - [set_time_limit()](#function.set-time-limit) - Establece el tiempo máximo de ejecución de un script

# time_sleep_until

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

time_sleep_until —
Detiene el script durante una duración especificada

### Descripción

**time_sleep_until**([float](#language.types.float) $timestamp): [bool](#language.types.boolean)

Detiene el script hasta el instante indicado por el argumento
timestamp.

### Parámetros

     timestamp


       El timestamp correspondiente al instante en que el script debe despertarse.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el instante indicado por timestamp está en el pasado,
**time_sleep_until()** generará una alerta
de nivel **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con time_sleep_until()**

&lt;?php

// Retorna false y genera una alerta
var_dump(time_sleep_until(time()-1));

// Funcionará solo en computadoras rápidas, detendrá el script 0.2 segundos
var_dump(time_sleep_until(microtime(true)+0.2));

?&gt;

### Notas

**Nota**:

    Todas las señales serán entregadas una vez reanudado el script.

### Ver también

    - [sleep()](#function.sleep) - Detiene la ejecución durante algunos segundos

    - [usleep()](#function.usleep) - Detiene la ejecución durante algunas microsegundos

    - [time_nanosleep()](#function.time-nanosleep) - Esperar durante un número de segundos y nanosegundos

    - [set_time_limit()](#function.set-time-limit) - Establece el tiempo máximo de ejecución de un script

# uniqid

(PHP 4, PHP 5, PHP 7, PHP 8)

uniqid — Genera un identificador basado en el tiempo

### Descripción

**uniqid**([string](#language.types.string) $prefix = "", [bool](#language.types.boolean) $more_entropy = **[false](#constant.false)**): [string](#language.types.string)

Genera un identificador basado en la hora actual con una precisión a la microsegundo,
prefijado por el prefix dado y añadiendo
eventualmente un valor generado aleatoriamente.

**Precaución**

Esta función no genera valores criptográficamente seguros, y _no debe_
ser utilizada con fines criptográficos, o con fines que requieran que los valores devueltos sean indescifrables.

Si se requiere aleatoriedad criptográficamente segura, el [Random\Randomizer](#class.random-randomizer) puede ser utilizado
con el motor [Random\Engine\Secure](#class.random-engine-secure). Para casos de uso simples, las funciones
[random_int()](#function.random-int) y [random_bytes()](#function.random-bytes) proporcionan una API
práctica y segura que es soportada por el CSPRNG del sistema operativo.

**Advertencia**

    Esta función no garantiza la unicidad del valor devuelto
    ya que este se basa en la hora actual en microsegundos
    o en la hora actual con una pequeña cantidad de datos aleatorios añadidos
    si more_entropy es **[true](#constant.true)**.

### Parámetros

     prefix


       Puede ser útil, por ejemplo, para identificar fácilmente diferentes hosts, si se genera
       simultáneamente en varios hosts que pueden generar el
       mismo identificador en la misma microsegundo. (Esto puede ocurrir
       incluso en un solo host si el reloj del sistema se mueve hacia atrás,
       por ejemplo por un ajuste NTP.)




       Sin prefix (prefijo vacío), la
       cadena devuelta tendrá 13 caracteres. Si
       more_entropy es **[true](#constant.true)**, tendrá 23
       caracteres.






     more_entropy


       Si el parámetro opcional more_entropy es
       **[true](#constant.true)**, **uniqid()** añadirá una entropía
       "combined LCG" al final del valor devuelto,
       lo que aumenta la probabilidad de la unicidad del resultado.





### Valores devueltos

Devuelve un identificador basado en el timestamp, en forma de [string](#language.types.string).

**Advertencia**

    Esta función no garantiza la unicidad del valor devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con uniqid()**

&lt;?php
/_ Un identificador único, como: 4b3403665fea6 _/
printf("uniqid(): %s\r\n", uniqid());

/\* También podemos prefijar el identificador único,

- lo que equivale a:
-
- $uniqid = $prefix . uniqid();
- $uniqid = uniqid($prefix);
  \*/
  printf("uniqid('php*'): %s\r\n", uniqid('php*'));

/\* También podemos activar el parámetro more_entropy,

- requerido por algunos sistemas, como Cygwin. Esto hará que
- uniqid() produzca un valor como: 4b340550242239.64159797
  \*/
  printf("uniqid('', true): %s\r\n", uniqid('', true));
  ?&gt;

### Notas

**Nota**:

    En Cygwin, el parámetro more_entropy debe ser
    pasado a **[true](#constant.true)** para que esta función funcione.

### Ver también

- [random_bytes()](#function.random-bytes) - Obtiene bytes aleatorios criptográficamente seguros

# unpack

(PHP 4, PHP 5, PHP 7, PHP 8)

unpack — Desempaqueta datos desde una cadena binaria

### Descripción

**unpack**([string](#language.types.string) $format, [string](#language.types.string) $string, [int](#language.types.integer) $offset = 0): [array](#language.types.array)|[false](#language.types.singleton)

Desempaqueta los datos data
desde una cadena binaria con el formato format.

Los datos desempaquetados se almacenan en un
array. Para ello, debe asignarse un nombre a cada
formato utilizado y separarlos con una barra (/). Si
se proporciona un argumento de repetición, entonces cada una de
las claves del array tendrá un número de secuencia detrás del
nombre proporcionado.

Se han realizado modificaciones para alinear el comportamiento
de esta función con Perl :

    -
     El código "a" ya no elimina los bytes NULL finales.


    -
     El código "A" ahora elimina todos los espacios en blanco ASCII finales
     (espacio, tabulación, nuevas líneas, retorno de carro, y bytes NULL).


    -
     Se ha añadido el código "Z" para las cadenas rellenas con caracteres
     NULL, y elimina los bytes NULL finales.

### Parámetros

     format


       Consulte la función [pack()](#function.pack) para una explicación de los códigos de formato.






     string


       Los datos empaquetados.






     offset


       La posición donde comenzar el desempaquetado.





### Valores devueltos

Devuelve un array asociativo que contiene los elementos desempaquetados
de una cadena binaria, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Los tipos [float](#language.types.float) y [double](#language.types.float) soportan tanto la orientación Big Endian como Little Endian.




       7.1.0

        Se ha añadido el argumento opcional offset.





### Ejemplos

    **Ejemplo #1 Ejemplo con unpack()**

&lt;?php
$binarydata = "\x04\x00\xa0\x00";
$array = unpack("cchars/nint", $binarydata);
print_r($array);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[chars] =&gt; 4
[int] =&gt; 160
)

    **Ejemplo #2 Ejemplo con unpack()** y un argumento de repetición

&lt;?php
$binarydata = "\x04\x00\xa0\x00";
$array = unpack("c2chars/nint", $binarydata);
print_r($array);
?&gt;

     El ejemplo anterior mostrará:




Array
(
[chars1] =&gt; 4
[chars2] =&gt; 0
[int] =&gt; 40960
)

### Notas

**Precaución**

    Debe tenerse en cuenta que PHP maneja los valores internamente
    en forma firmada. Si se desempaqueta
    un valor que es tan grande como el tamaño utilizado
    internamente por PHP, el resultado será
    un número negativo, incluso si se ha
    desempaquetado con la opción "no firmado".

**Precaución**

    Si no se nombra un elemento, se utilizan los índices numéricos a partir de
    1. Tenga en cuenta que si tiene más de un
    elemento sin nombre, algunos datos se sobrescriben porque la numeración
    se reinicia a partir de 1 para cada elemento.







     **Ejemplo #3 Ejemplo con unpack()** con claves no nombradas




&lt;?php
$binarydata = "\x32\x42\x00\xa0";
$array = unpack("c2/n", $binarydata);
var_dump($array);
?&gt;

     El ejemplo anterior mostrará:




array(2) {
[1]=&gt;
int(160)
[2]=&gt;
int(66)
}

      Observe que el primer
      valor desde el especificador c es sobrescrito
      por el primer valor desde el especificador n.


### Ver también

    - [pack()](#function.pack) - Compacta datos en una cadena binaria

# usleep

(PHP 4, PHP 5, PHP 7, PHP 8)

usleep — Detiene la ejecución durante algunas microsegundos

### Descripción

**usleep**([int](#language.types.integer) $microseconds): [void](language.types.void.html)

Detiene la ejecución de un programa durante un período de tiempo.

### Parámetros

     microseconds


       Duración de la detención, en microsegundos. Una microsegundo es un
       millonésimo de segundo.



      **Nota**:

        Los valores mayores que 1000000 (es decir, dormir
        por más de un segundo) pueden no ser soportados por el sistema
        operativo.
        Utilizar [sleep()](#function.sleep) en su lugar.




      **Nota**:

        El tiempo de detención puede ser ligeramente alargado (es decir, puede ser
        más largo que microseconds) por cualquier actividad
        del sistema o por el tiempo empleado en procesar la llamada o por la granularidad de los temporizadores del sistema.






### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con usleep()**

&lt;?php

// Hora actual
echo (new DateTime('now'))-&gt;format('H:i:s.v'), "\n";

// Detiene por 2 milisegundos
usleep(2000);

// ¡Vuelta!
echo (new DateTime('now'))-&gt;format('H:i:s.v'), "\n";

// Espera 30 milisegundos
usleep(30000);

// ¡Vuelta otra vez!
echo (new DateTime('now'))-&gt;format('H:i:s.v'), "\n";

?&gt;

    El ejemplo anterior mostrará:

11:13:28.005
11:13:28.007
11:13:28.037

### Ver también

    - [sleep()](#function.sleep) - Detiene la ejecución durante algunos segundos

    - [time_nanosleep()](#function.time-nanosleep) - Esperar durante un número de segundos y nanosegundos

    - [time_sleep_until()](#function.time-sleep-until) - Detiene el script durante una duración especificada

    - [set_time_limit()](#function.set-time-limit) - Establece el tiempo máximo de ejecución de un script

## Tabla de contenidos

- [connection_aborted](#function.connection-aborted) — Indica si el usuario ha abandonado la conexión HTTP
- [connection_status](#function.connection-status) — Devuelve los bits de estado de la conexión HTTP
- [constant](#function.constant) — Retorna el valor de una constante
- [define](#function.define) — Define una constante
- [defined](#function.defined) — Verifica si una constante con el nombre dado existe
- [die](#function.die) — Alias de la función exit
- [eval](#function.eval) — Ejecuta una cadena como un script PHP
- [exit](#function.exit) — Terminar el script en curso con un código de estado o un mensaje
- [get_browser](#function.get-browser) — Indica las capacidades del navegador cliente
- [\_\_halt_compiler](#function.halt-compiler) — Detiene la ejecución del compilador
- [highlight_file](#function.highlight-file) — Coloración sintáctica de un fichero
- [highlight_string](#function.highlight-string) — Aplica la sintaxis colorizada a código PHP
- [hrtime](#function.hrtime) — Devuelve el tiempo de alta resolución del sistema
- [ignore_user_abort](#function.ignore-user-abort) — Activa la interrupción de script al desconectarse el visitante
- [pack](#function.pack) — Compacta datos en una cadena binaria
- [php_strip_whitespace](#function.php-strip-whitespace) — Devuelve la fuente sin comentarios ni espacios en blanco
- [sapi_windows_cp_conv](#function.sapi-windows-cp-conv) — Convierte un string de una página de código a otra
- [sapi_windows_cp_get](#function.sapi-windows-cp-get) — Devuelve la página de código actual
- [sapi_windows_cp_is_utf8](#function.sapi-windows-cp-is-utf8) — Indica si la página de código es compatible con UTF-8
- [sapi_windows_cp_set](#function.sapi-windows-cp-set) — Establece la página de código del proceso
- [sapi_windows_generate_ctrl_event](#function.sapi-windows-generate-ctrl-event) — Envía un evento CTRL a otro proceso
- [sapi_windows_set_ctrl_handler](#function.sapi-windows-set-ctrl-handler) — Establece o elimina un gestor de eventos CTRL
- [sapi_windows_vt100_support](#function.sapi-windows-vt100-support) — Obtiene o define el soporte VT100 para el flujo especificado asociado a un búfer de salida de una consola Windows.
- [show_source](#function.show-source) — Alias de highlight_file
- [sleep](#function.sleep) — Detiene la ejecución durante algunos segundos
- [sys_getloadavg](#function.sys-getloadavg) — Obtiene la carga promedio del sistema
- [time_nanosleep](#function.time-nanosleep) — Esperar durante un número de segundos y nanosegundos
- [time_sleep_until](#function.time-sleep-until) — Detiene el script durante una duración especificada
- [uniqid](#function.uniqid) — Genera un identificador basado en el tiempo
- [unpack](#function.unpack) — Desempaqueta datos desde una cadena binaria
- [usleep](#function.usleep) — Detiene la ejecución durante algunas microsegundos

    # Registro de cambios

    A las clases/funciones/métodos de esta extensión se han realizado los siguientes cambios.

    VersionFunctionDescription8.4.0[exit](#function.exit)exit es ahora una verdadera función,
    por lo tanto sigue la lógica habitual de
    manipulación de tipos,
    es afectada por la declaración
    strict_types,
    puede ser llamada con argumentos nombrados y ser utilizada
    como una función variable. [highlight_string](#function.highlight-string)El tipo de retorno ha pasado de stringbool a
    stringtrue.8.3.0[highlight_file](#function.highlight-file)El HTML resultante ha cambiado. [highlight_string](#function.highlight-string)El HTML resultante ha cambiado.8.1.0[define](#function.define)value ahora puede ser un objeto.8.0.0[constant](#function.constant)Si la constante no está definida, constant ahora lanza una excepción Error; anteriormente se emitía un E_WARNING y se retornaba null. [define](#function.define)Pasar true a case_insensitive ahora emite una E_WARNING.
    Pasar false sigue siendo permitido. [ignore_user_abort](#function.ignore-user-abort)enable ahora es nullable. [pack](#function.pack)Esta función ya no devuelve false en caso de error. [sapi_windows_vt100_support](#function.sapi-windows-vt100-support)enable ahora es nullable. [sleep](#function.sleep)La función lanza una ValueError si seconds es negativo;
    anteriormente, se generaba un error de nivel E_WARNING y la función retornaba false.7.3.0[define](#function.define)case_insensitive está deprecado y será eliminado en la versión 8.0.0.7.2.0[pack](#function.pack)Los tipos float y double admiten Big Endian y Little Endian. [unpack](#function.unpack)Los tipos float y double soportan tanto la orientación Big Endian como Little Endian.7.1.1[pack](#function.pack)Se han añadido los códigos "e", "E", "g" y "G" para activar la
    compatibilidad con el orden de bytes para los números de coma flotante
    de simple y doble precisión.7.1.0[unpack](#function.unpack)Se ha añadido el argumento opcional offset.7.0.15[pack](#function.pack)Se han añadido los códigos "e", "E", "g" y "G" para activar la
    compatibilidad con el orden de bytes para los números de coma flotante
    de simple y doble precisión.

- [Introducción](#intro.misc)
- [Instalación/Configuración](#misc.setup)<li>[Configuración en tiempo de ejecución](#misc.configuration)
  </li>- [Constantes predefinidas](#misc.constants)
- [Funciones Varias](#ref.misc)<li>[connection_aborted](#function.connection-aborted) — Indica si el usuario ha abandonado la conexión HTTP
- [connection_status](#function.connection-status) — Devuelve los bits de estado de la conexión HTTP
- [constant](#function.constant) — Retorna el valor de una constante
- [define](#function.define) — Define una constante
- [defined](#function.defined) — Verifica si una constante con el nombre dado existe
- [die](#function.die) — Alias de la función exit
- [eval](#function.eval) — Ejecuta una cadena como un script PHP
- [exit](#function.exit) — Terminar el script en curso con un código de estado o un mensaje
- [get_browser](#function.get-browser) — Indica las capacidades del navegador cliente
- [\_\_halt_compiler](#function.halt-compiler) — Detiene la ejecución del compilador
- [highlight_file](#function.highlight-file) — Coloración sintáctica de un fichero
- [highlight_string](#function.highlight-string) — Aplica la sintaxis colorizada a código PHP
- [hrtime](#function.hrtime) — Devuelve el tiempo de alta resolución del sistema
- [ignore_user_abort](#function.ignore-user-abort) — Activa la interrupción de script al desconectarse el visitante
- [pack](#function.pack) — Compacta datos en una cadena binaria
- [php_strip_whitespace](#function.php-strip-whitespace) — Devuelve la fuente sin comentarios ni espacios en blanco
- [sapi_windows_cp_conv](#function.sapi-windows-cp-conv) — Convierte un string de una página de código a otra
- [sapi_windows_cp_get](#function.sapi-windows-cp-get) — Devuelve la página de código actual
- [sapi_windows_cp_is_utf8](#function.sapi-windows-cp-is-utf8) — Indica si la página de código es compatible con UTF-8
- [sapi_windows_cp_set](#function.sapi-windows-cp-set) — Establece la página de código del proceso
- [sapi_windows_generate_ctrl_event](#function.sapi-windows-generate-ctrl-event) — Envía un evento CTRL a otro proceso
- [sapi_windows_set_ctrl_handler](#function.sapi-windows-set-ctrl-handler) — Establece o elimina un gestor de eventos CTRL
- [sapi_windows_vt100_support](#function.sapi-windows-vt100-support) — Obtiene o define el soporte VT100 para el flujo especificado asociado a un búfer de salida de una consola Windows.
- [show_source](#function.show-source) — Alias de highlight_file
- [sleep](#function.sleep) — Detiene la ejecución durante algunos segundos
- [sys_getloadavg](#function.sys-getloadavg) — Obtiene la carga promedio del sistema
- [time_nanosleep](#function.time-nanosleep) — Esperar durante un número de segundos y nanosegundos
- [time_sleep_until](#function.time-sleep-until) — Detiene el script durante una duración especificada
- [uniqid](#function.uniqid) — Genera un identificador basado en el tiempo
- [unpack](#function.unpack) — Desempaqueta datos desde una cadena binaria
- [usleep](#function.usleep) — Detiene la ejecución durante algunas microsegundos
  </li>- [Registro de cambios](#changelog.misc)
