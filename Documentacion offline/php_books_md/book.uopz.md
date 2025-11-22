# Operaciones de usuario para Zend

# Introducción

La extensión uopz - User Operations for Zend (NdT : las operaciones de usuario para Zend) -
expone las funcionalidades del motor Zend, normalmente utilizadas durante
la compilación y la ejecución, para permitir la modificación de las
estructuras internas que representan el código PHP, y para que el código
de usuario interactúe con la VM.

uopz soporta las siguientes actividades:

- Sobrescritura de opcodes incluyendo ZEND_EXIT y ZEND_NEW

- Guardado y restauración de funciones y métodos

- Renombrado de funciones y métodos

- Copiado de funciones y métodos

- Eliminación de funciones y métodos

- Re-definición de constantes globales y de clase

- Eliminación de constantes globales y de clase

- Composición y modificación de clases en tiempo de ejecución

**Nota**:

    Todas las actividades soportadas son compatibles con opcache.

**Precaución**

    PECL uopz 6.1.1 no es compatible con Xdebug &gt;= 2.9.4.
    Las versiones posteriores de uopz no son compatibles con Xdebug &lt; 2.9.4.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#uopz.requirements)
- [Instalación](#uopz.installation)
- [Configuración en tiempo de ejecución](#uopz.configuration)

    ## Requerimientos

    A partir de uopz 5.0, PHP 7.0 es necesario. A partir de uopz 5.1, PHP 7.1+ es necesario.

    ## Instalación

    Las versiones de uopz están alojadas por PECL y el código fuente por
    [» github](https://github.com/krakjoe/uopz);
    la forma más sencilla de instalarlo es a través de la instalación
    via PECL :
    [» https://pecl.php.net/package/uopz](https://pecl.php.net/package/uopz).

    Los usuarios de Windows pueden descargar los binarios desde el sitio web de
    [» PECL](https://pecl.php.net/package/uopz).

    A partir de uopz 5.0.0, la extensión debe ser cargada como una
    [extensión](#ini.extension). Anterior a esta versión, debe
    ser cargada como una [zend_extension](#ini.zend-extension).

    ## Configuración en tiempo de ejecución

    El comportamiento de estas funciones es
    afectado por la configuración en el archivo php.ini.

        <caption>**uopz Opciones de configuración**</caption>



           Nombre
           Por defecto
           Cambiable
           Historial de cambios






           [uopz.disable](#ini.uopz.disable)
           "0"
           **[INI_SYSTEM](#constant.ini-system)**
           Disponible a partir de uopz 5.0.2



           [uopz.exit](#ini.uopz.exit)
           "0"
           **[INI_SYSTEM](#constant.ini-system)**
           Disponible a partir de uopz 6.0.1



           [uopz.overloads](#ini.uopz.overloads)
           "1"
           **[INI_SYSTEM](#constant.ini-system)**
           Disponible a partir de uopz 2.0.2. Eliminado a partir de uopz 5.0.0.




    Para más detalles sobre los modos INI\_\*,
    refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

    Aquí hay una aclaración sobre
    el uso de las directivas de configuración.

          uopz.disable
          [bool](#language.types.boolean)



           Si está activado, uopz no debería tener ningún efecto sobre el motor.







          uopz.exit
          [bool](#language.types.boolean)



           Permitir o no la ejecución de los códigos de operación (opcodes) de salida.
           Este parámetro puede ser sobreescrito durante la ejecución llamando a [uopz_allow_exit()](#function.uopz-allow-exit).







          uopz.overloads
          [bool](#language.types.boolean)



           Activa la posibilidad de utilizar [uopz_overload()](#function.uopz-overload).





    **Nota**:

        Al ejecutar con OPcache activado, puede ser necesario desactivar todas las
        [optimizaciones OPcache](#ini.opcache.optimization-level)
        (opcache.optimization_level=0).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Los siguientes opcodes son definidos como constantes por uopz antes de 5.0.0:

     **[ZEND_EXIT](#constant.zend-exit)**
     ([int](#language.types.integer))



      Invoca exit() y die(); no recibe ningún argumento.
      Devuelve **[true](#constant.true)** para salir, **[false](#constant.false)** para continuar





     **[ZEND_NEW](#constant.zend-new)**
     ([int](#language.types.integer))



      Invocado por la construcción de un objeto, recibe el objeto de la clase creada como
      único argumento





     **[ZEND_THROW](#constant.zend-throw)**
     ([int](#language.types.integer))



      Invocado por la estructura throw, recibe la excepción de la clase emitida como único argumento





     **[ZEND_FETCH_CLASS](#constant.zend-fetch-class)**
     ([int](#language.types.integer))



      Invocado durante una composición, recibe la clase, el nombre de la clase recuperada como único argumento





     **[ZEND_ADD_TRAIT](#constant.zend-add-trait)**
     ([int](#language.types.integer))



      Invocado durante una composición, recibe la clase en la cual el trait será añadido, como primer
      argumento, y el nombre del trait como segundo argumento





     **[ZEND_ADD_INTERFACE](#constant.zend-add-interface)**
     ([int](#language.types.integer))



      Invocado durante una composición, recibe la clase en la cual la interfaz será añadida como primer
      argumento, y el nombre de la interfaz como segundo argumento





     **[ZEND_INSTANCEOF](#constant.zend-instanceof)**
     ([int](#language.types.integer))



      Invocado por el operador instanceof, recibe el objeto a verificar como primer argumento,
      y el nombre de la clase a la que pertenece el objeto como segundo argumento


Las siguientes constantes controlan el comportamiento del VM después de que un gestor usuario
sea llamado; sea extremadamente cuidadoso!
Estas constantes son eliminadas a partir de uopz 5.0.0.

     **[ZEND_USER_OPCODE_CONTINUE](#constant.zend-user-opcode-continue)**
     ([int](#language.types.integer))



      Avance de un opcode, y continúe





     **[ZEND_USER_OPCODE_ENTER](#constant.zend-user-opcode-enter)**
     ([int](#language.types.integer))



      Entrar en un nuevo op_array sin recursión





     **[ZEND_USER_OPCODE_LEAVE](#constant.zend-user-opcode-leave)**
     ([int](#language.types.integer))



      Retorna el op_array llamado en el mismo ejecutor





     **[ZEND_USER_OPCODE_DISPATCH](#constant.zend-user-opcode-dispatch)**
     ([int](#language.types.integer))



      Despacha el gestor opcode original





     **[ZEND_USER_OPCODE_DISPATCH_TO](#constant.zend-user-opcode-dispatch-to)**
     ([int](#language.types.integer))



      Despacha a un gestor específico (o combinado con la constante opcode de ZEND)





     **[ZEND_USER_OPCODE_RETURN](#constant.zend-user-opcode-return)**
     ([int](#language.types.integer))



      Sale del ejecutor (retorna a la función)


Los siguientes modificadores están registrados como constantes por uopz

     **[ZEND_ACC_PUBLIC](#constant.zend-acc-public)**
     ([int](#language.types.integer))



      Marca una función como pública, el comportamiento por omisión





     **[ZEND_ACC_PROTECTED](#constant.zend-acc-protected)**
     ([int](#language.types.integer))



      Marca una función como protegida





     **[ZEND_ACC_PRIVATE](#constant.zend-acc-private)**
     ([int](#language.types.integer))



      Marca una función como privada





     **[ZEND_ACC_STATIC](#constant.zend-acc-static)**
     ([int](#language.types.integer))



      Marca una función como estática





     **[ZEND_ACC_FINAL](#constant.zend-acc-final)**
     ([int](#language.types.integer))



      Marca una función como final





     **[ZEND_ACC_ABSTRACT](#constant.zend-acc-abstract)**
     ([int](#language.types.integer))



      Marca una función como abstracta





     **[ZEND_ACC_CLASS](#constant.zend-acc-class)**
     ([int](#language.types.integer))



      Registro ficticio para consistencia, el tipo de entrada de clase por omisión.
      Eliminada a partir de uopz 5.0.0.





     **[ZEND_ACC_INTERFACE](#constant.zend-acc-interface)**
     ([int](#language.types.integer))



      Marca la clase como una interfaz.
      Eliminada a partir de uopz 5.0.0.





     **[ZEND_ACC_TRAIT](#constant.zend-acc-trait)**
     ([int](#language.types.integer))



      Marca la clase como un trait.
      Eliminada a partir de uopz 5.0.0.





     **[ZEND_ACC_FETCH](#constant.zend-acc-fetch)**
     ([int](#language.types.integer))



      Utilizado para recuperar solo los flags.
      Eliminada a partir de uopz 5.0.0.


# Funciones Uopz

# uopz_add_function

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_add_function — Añade una función o método inexistente

### Descripción

**uopz_add_function**([string](#language.types.string) $function, [Closure](#class.closure) $handler, [int](#language.types.integer) &amp;$flags = ZEND_ACC_PUBLIC): [bool](#language.types.boolean)

**uopz_add_function**(
    [string](#language.types.string) $class,
    [string](#language.types.string) $function,
    [Closure](#class.closure) $handler,
    [int](#language.types.integer) &amp;$flags = ZEND_ACC_PUBLIC,
    [int](#language.types.integer) &amp;$all = **[true](#constant.true)**
): [bool](#language.types.boolean)

Añade una función o método inexistente.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o método.






    handler


      La [Closure](#class.closure) que define la nueva función o método.






    flags


      Los flags a definir para la nueva función o método.






    all


      Si todas las clases que heredan de class serán
      también afectadas.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

**uopz_add_function()** lanza una [RuntimeException](#class.runtimeexception)
si la función o método a añadir ya existe.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_add_function()**

&lt;?php
uopz_add_function('foo', function () {echo 'bar';});
foo();
?&gt;

El ejemplo anterior mostrará:

bar

### Ver también

- [uopz_del_function()](#function.uopz-del-function) - Elimina una función o método previamente añadido

- [uopz_set_return()](#function.uopz-set-return) - Proporciona un valor de retorno para una función existente

# uopz_allow_exit

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_allow_exit — Permite controlar el opcode exit desactivado

### Descripción

**uopz_allow_exit**([bool](#language.types.boolean) $allow): [void](language.types.void.html)

Por omisión, uopz desactiva el opcode exit, por lo que las llamadas a [exit()](#function.exit)
son prácticamente ignoradas. **uopz_allow_exit()**
permite controlar este comportamiento.

### Parámetros

    allow


      Permitir o no la ejecución de los opcodes exit.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_allow_exit()**

&lt;?php
exit(1);
echo 1;
uopz_allow_exit(true);
exit(2);
echo 2;
?&gt;

El ejemplo anterior mostrará:

1

### Notas

**Precaución**

    [OPcache](#book.opcache) optimiza el código muerto después de una salida incondicional.

### Ver también

- [uopz_get_exit_status()](#function.uopz-get-exit-status) - Devuelve el último estado de salida definido

# uopz_backup

(PECL uopz 1 &gt;= 1.0.3, PECL uopz 2)

uopz_backup — Guarda una función

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_backup**([string](#language.types.string) $function): [void](language.types.void.html)

**uopz_backup**([string](#language.types.string) $class, [string](#language.types.string) $function): [void](language.types.void.html)

Guarda una función en tiempo de ejecución.

### Parámetros

    class


      El nombre de la clase que contiene la función a guardar






    function


      El nombre de la función


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_backup()**

&lt;?php
uopz_backup("fgets");
uopz_function("fgets", function(){
return true;
});
var_dump(fgets());
?&gt;

El ejemplo anterior mostrará:

bool(true)

# uopz_compose

(PECL uopz 1, PECL uopz 2)

uopz_compose — Componer una clase

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_compose**(
    [string](#language.types.string) $name,
    [array](#language.types.array) $classes,
    [array](#language.types.array) $methods = ?,
    [array](#language.types.array) $properties = ?,
    [int](#language.types.integer) $flags = ?
): [void](language.types.void.html)

Crea una nueva clase con el nombre especificado, que implementa, extiende o
utiliza todas las clases proporcionadas.

### Parámetros

    name


      Un nombre de clase válido






    classes


      Un array de clases, interfaces o nombres de trait






    methods


      Un array asociativo de métodos; los valores son o bien closures, o bien [modificadores =&gt; closure]






    properties


      Un array asociativo de propiedades, con las claves como nombres,
      y los valores como modificadores






    flags


      Tipo de entrada; por omisión, ZEND_ACC_CLASS


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_compose()**

&lt;?php
class myClass {}
trait myTrait {}
interface myInterface {}

uopz_compose(
Composed::class, [
myClass::class,
myTrait::class,
myInterface::class
], [
"__construct" =&gt; function() {
/* ... */
}
]);

var_dump(
class_uses(Composed::class),
class_parents(Composed::class),
class_implements(Composed::class));
?&gt;

El ejemplo anterior mostrará:

array(1) {
["myTrait"]=&gt;
string(7) "myTrait"
}
array(1) {
["myClass"]=&gt;
string(7) "myClass"
}
array(1) {
["myInterface"]=&gt;
string(11) "myInterface"
}

# uopz_copy

(PECL uopz 1 &gt;= 1.0.4, PECL uopz 2)

uopz_copy — Copia una función

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_copy**([string](#language.types.string) $function): [Closure](#class.closure)

**uopz_copy**([string](#language.types.string) $class, [string](#language.types.string) $function): [Closure](#class.closure)

Copia una función a partir de su nombre.

### Parámetros

    class


      El nombre de la clase que contiene la función a copiar






    function


      El nombre de la función


### Valores devueltos

Una closure para la función especificada.

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_copy()**

&lt;?php
$strtotime = uopz_copy('strtotime');

uopz_function("strtotime", function($arg1, $arg2) use($strtotime) {
/_ se puede llamar a la función strtotime original desde aquí _/
var_dump($arg1);
});

var_dump(strtotime('dummy'));
?&gt;

El ejemplo anterior mostrará:

string(5) "dummy"

# uopz_del_function

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_del_function — Elimina una función o método previamente añadido

### Descripción

**uopz_del_function**([string](#language.types.string) $function): [bool](#language.types.boolean)

**uopz_del_function**([string](#language.types.string) $class, [string](#language.types.string) $function, [int](#language.types.integer) &amp;$all = **[true](#constant.true)**): [bool](#language.types.boolean)

Elimina una función o método previamente añadido.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o método.






    all


      Si todas las clases que heredan de class serán también afectadas.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

**uopz_del_function()** lanza una [RuntimeException](#class.runtimeexception)
si la función o método a eliminar no ha sido añadido por [uopz_add_function()](#function.uopz-add-function).

### Ejemplos

**Ejemplo #1 Uso básico de uopz_del_function()**

&lt;?php
uopz_add_function('foo', function () {echo 'bar';});
var_dump(function_exists('foo'));
uopz_del_function('foo');
var_dump(function_exists('foo'));
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

- [uopz_add_function()](#function.uopz-add-function) - Añade una función o método inexistente

- [uopz_unset_return()](#function.uopz-unset-return) - Suprime un valor de retorno previamente fijado para una función

# uopz_delete

(PECL uopz 1, PECL uopz 2)

uopz_delete — Elimina una función

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_delete**([string](#language.types.string) $function): [void](language.types.void.html)

**uopz_delete**([string](#language.types.string) $class, [string](#language.types.string) $function): [void](language.types.void.html)

Elimina una función o método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o método.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_delete()**

&lt;?php
uopz_delete("strlen");

echo strlen("Hello World");
?&gt;

Resultado del ejemplo anterior es similar a:

PHP Fatal error: Call to undefined function strlen() in /path/to/script.php on line 4

**Ejemplo #2 Ejemplo con uopz_delete()** y una clase

&lt;?php
class My {
public static function strlen($arg) {
        return strlen($arg);
}
}

uopz_delete(My::class, "strlen");

echo My::strlen("Hello World");
?&gt;

Resultado del ejemplo anterior es similar a:

PHP Fatal error: Call to undefined method My::strlen() in /path/to/script.php on line 10

# uopz_extend

(PECL uopz 1, PECL uopz 2, PECL uopz 5, PECL uopz 6, PECL uopz 7 &lt; 7.1.0)

uopz_extend — Extiende una clase en tiempo de ejecución

### Descripción

**uopz_extend**([string](#language.types.string) $class, [string](#language.types.string) $parent): [bool](#language.types.boolean)

Extiende la clase class utilizando
la clase parent.

### Parámetros

    class


      El nombre de la clase a extender






    parent


      El nombre de la clase padre


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

A partir de PHP 7.4.0, **uopz_extend()** emite una
[RuntimeException](#class.runtimeexception), si
[OPcache](#book.opcache) está activado, y la entrada de clase
de class o parent (si en un trait) es inmutable.

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_extend()**

&lt;?php
class A {}
class B {}

uopz_extend(A::class, B::class);

var_dump(class_parents(A::class));
?&gt;

El ejemplo anterior mostrará:

array(1) {
["B"]=&gt;
string(1) "B"
}

# uopz_flags

(PECL uopz 2 &gt;= 2.0.2, PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_flags — Recupera o define los flags de una función o clase

### Descripción

**uopz_flags**([string](#language.types.string) $function, [int](#language.types.integer) $flags = PHP_INT_MAX): [int](#language.types.integer)

**uopz_flags**([string](#language.types.string) $class, [string](#language.types.string) $function, [int](#language.types.integer) $flags = PHP_INT_MAX): [int](#language.types.integer)

Recupera o define los flags de una clase o entrada de función en tiempo de ejecución.

### Parámetros

    class


      El nombre de la clase






    function


      El nombre de la función. Si class es proporcionado y
      una [string](#language.types.string) vacía es pasada como function,
      **uopz_flags()** recupera o define los flags de la propia clase.






    flags


      Un conjunto válido de flags ZEND_ACC_.
      Si se omite, **uopz_flags()** actúa como recuperador.


### Valores devueltos

Si se definen flags, devuelve los flags antiguos,
de lo contrario, devuelve los flags actuales

### Errores/Excepciones

A partir de PHP 7.4.0, si el parámetro flags es proporcionado
**uopz_flags()** emite una
[RuntimeException](#class.runtimeexception), si
[OPcache](#book.opcache) está activado, y la entrada de clase
de class o la entrada de función
function es inmutable.

### Historial de cambios

      Versión
      Descripción






      PECL uopz 5.0.0

       El parámetro flags es ahora opcional. Anteriormente,
       **[ZEND_ACC_FETCH](#constant.zend-acc-fetch)** debía ser pasado para usar
       **uopz_flags()** como recuperador.



### Ejemplos

**Ejemplo #1 Ejemplo con uopz_flags()**

&lt;?php
class Test {
public function method() {
return **CLASS**;
}
}

$flags = uopz_flags("Test", "method");

var_dump((bool) (uopz_flags("Test", "method") &amp; ZEND_ACC_PRIVATE));
var_dump((bool) (uopz_flags("Test", "method") &amp; ZEND_ACC_STATIC));

var_dump(uopz_flags("Test", "method", $flags|ZEND_ACC_STATIC|ZEND_ACC_PRIVATE));

var_dump((bool) (uopz_flags("Test", "method") &amp; ZEND_ACC_PRIVATE));
var_dump((bool) (uopz_flags("Test", "method") &amp; ZEND_ACC_STATIC));
?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(false)
int(1234567890)
bool(true)
bool(true)

**Ejemplo #2 Transformar una clase final en no final**

&lt;?php
final class MyClass
{
}

$flags = uopz_flags(MyClass::class, '');
uopz_flags(MyClass::class, '', $flags &amp; ~ZEND_ACC_FINAL);
var_dump((new ReflectionClass(MyClass::class))-&gt;isFinal());
?&gt;

El ejemplo anterior mostrará:

bool(false)

# uopz_function

(PECL uopz 1, PECL uopz 2)

uopz_function — Crea una función en tiempo de ejecución

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_function**([string](#language.types.string) $function, [Closure](#class.closure) $handler, [int](#language.types.integer) $modifiers = ?): [void](language.types.void.html)

**uopz_function**(
    [string](#language.types.string) $class,
    [string](#language.types.string) $function,
    [Closure](#class.closure) $handler,
    [int](#language.types.integer) $modifiers = ?
): [void](language.types.void.html)

Crea una función en tiempo de ejecución.

### Parámetros

    class


      El nombre de la clase que debe recibir la nueva función






    function


      El nombre de la función






    handler


      La closure de la función






    modifiers


      Los modificadores de la función; por omisión, copiados o
      ZEND_ACC_PUBLIC


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_function()**

&lt;?php
uopz_function("my_strlen", function($arg) {
    return strlen($arg);
});
echo my_strlen("Hello World");
?&gt;

Resultado del ejemplo anterior es similar a:

11

**Ejemplo #2 Ejemplo con uopz_function()** y una clase

&lt;?php
class My {}

uopz_function(My::class, "strlen", function($arg) {
    return strlen($arg);
}, ZEND_ACC_STATIC);

echo My::strlen("Hello World");
?&gt;

El ejemplo anterior mostrará:

11

# uopz_get_exit_status

(PECL uopz 5, PECL uopz , PECL uopz 7)

uopz_get_exit_status — Devuelve el último estado de salida definido

### Descripción

**uopz_get_exit_status**(): [mixed](#language.types.mixed)

Devuelve el último estado de salida definido, es decir, el valor pasado a
[exit()](#function.exit).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función devuelve el último estado de salida, o **[null](#constant.null)** si [exit()](#function.exit)
no ha sido llamada.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_get_exit_status()**

&lt;?php
exit(123);
echo uopz_get_exit_status();?&gt;

El ejemplo anterior mostrará:

123

### Notas

**Precaución**

    [OPcache](#book.opcache) optimiza el código muerto después de una salida incondicional.

### Ver también

- [uopz_allow_exit()](#function.uopz-allow-exit) - Permite controlar el opcode exit desactivado

# uopz_get_hook

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_get_hook — Devuelve el hook previamente definido en una función o método

### Descripción

**uopz_get_hook**([string](#language.types.string) $function): [Closure](#class.closure)

**uopz_get_hook**([string](#language.types.string) $class, [string](#language.types.string) $function): [Closure](#class.closure)

Devuelve el hook previamente definido en una función o método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o método.


### Valores devueltos

Devuelve el hook previamente definido en una función o método, o **[null](#constant.null)** si ningún hook
ha sido definido.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_get_hook()**

&lt;?php
function foo() {
echo 'foo';
}
uopz_set_hook('foo', function () {echo 'bar';});
var_dump(uopz_get_hook('foo'));
?&gt;

Resultado del ejemplo anterior es similar a:

object(Closure)#2 (0) {
}

### Ver también

- [uopz_set_hook()](#function.uopz-set-hook) - Define el hook que se ejecutará al entrar en una función o un método

- [uopz_unset_hook()](#function.uopz-unset-hook) - Suprime el hook previamente fijado sobre una función o un método

# uopz_get_mock

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_get_mock — Devuelve la simulación actual de una clase

### Descripción

**uopz_get_mock**([string](#language.types.string) $class): [mixed](#language.types.mixed)

Devuelve la simulación actual de class.

### Parámetros

    class


      El nombre de la clase simulada.


### Valores devueltos

O bien una cadena que contiene el nombre de la simulación, o bien un objeto,
o bien **[null](#constant.null)** si ninguna simulación ha sido definida.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_get_mock()**

&lt;?php
class A {
public static function who() {
echo "A";
}
}

class mockA {
public static function who() {
echo "mockA";
}
}

uopz_set_mock(A::class, mockA::class);
echo uopz_get_mock(A::class);
?&gt;

El ejemplo anterior mostrará:

mockA

### Ver también

- [uopz_set_mock()](#function.uopz-set-mock) - Utiliza una simulación en lugar de una clase para nuevos objetos

- [uopz_unset_mock()](#function.uopz-unset-mock) - Suprime la simulación previamente fijada

# uopz_get_property

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_get_property — Devuelve el valor de una propiedad de clase o instancia

### Descripción

**uopz_get_property**([string](#language.types.string) $class, [string](#language.types.string) $property): [mixed](#language.types.mixed)

**uopz_get_property**([object](#language.types.object) $instance, [string](#language.types.string) $property): [mixed](#language.types.mixed)

Devuelve el valor de una propiedad de clase estática, si class
es proporcionado, o el valor de una propiedad de instancia, si instance
es proporcionado.

### Parámetros

    class


      El nombre de la clase.






    instance


      La instancia del objeto.






    property


      El nombre de la propiedad.


### Valores devueltos

Devuelve el valor de la propiedad de clase o instancia, o **[null](#constant.null)** si la propiedad
no está definida.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_get_property()**

&lt;?php
class Foo {
private static $staticBar = 10;
    private $bar = 100;
}
$foo = new Foo;
var_dump(uopz_get_property('Foo', 'staticBar'));
var_dump(uopz_get_property($foo, 'bar'));
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(100)

### Ver también

- [uopz_set_property()](#function.uopz-set-property) - Establece el valor de una propiedad de clase existente o de instancia

# uopz_get_return

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_get_return — Devuelve un valor de retorno previamente definido para una función

### Descripción

**uopz_get_return**([string](#language.types.string) $function): [mixed](#language.types.mixed)

**uopz_get_return**([string](#language.types.string) $class, [string](#language.types.string) $function): [mixed](#language.types.mixed)

Devuelve el valor de retorno de la function previamente definido por [uopz_set_return()](#function.uopz-set-return).

### Parámetros

    class


      El nombre de la clase que contiene la función






    function


      El nombre de la función


### Valores devueltos

El valor de retorno o la closure previamente definida.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_get_return()**

&lt;?php
uopz_set_return("strlen", 42);
echo uopz_get_return("strlen");
?&gt;

El ejemplo anterior mostrará:

42

# uopz_get_static

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_get_static — Devuelve las variables estáticas de una función o método

### Descripción

**uopz_get_static**([string](#language.types.string) $class, [string](#language.types.string) $function): [array](#language.types.array)

**uopz_get_static**([string](#language.types.string) $function): [array](#language.types.array)

Devuelve las variables estáticas de una función o método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o método.


### Valores devueltos

Devuelve un [array](#language.types.array) asociativo de nombres de variables mapeados a sus
valores actuales en caso de éxito, o **[null](#constant.null)** si la función o método no existe.

Desde PHP 8.3.0, los inicializadores estáticos se calculan ya sea durante la compilación,
o si no es posible, solo cuando la función o método se ejecuta por primera vez, en cuyo caso
el valor de la variable estática se reporta como **[null](#constant.null)** antes de la primera invocación.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_get_static()**

&lt;?php
function foo() {
static $bar = 'baz';
}
var_dump(uopz_get_static('foo'));
?&gt;

El ejemplo anterior mostrará:

array(1) {
["bar"]=&gt;
string(3) "baz"
}

### Ver también

- [ReflectionFunctionAbstract::getStaticVariables()](#reflectionfunctionabstract.getstaticvariables) - Obtiene las variables estáticas

- [uopz_set_static()](#function.uopz-set-static) - Fija las variables estáticas en el ámbito de una función o de un método

# uopz_implement

(PECL uopz 1, PECL uopz 2, PECL uopz 5, PECL uopz 6, PECL uopz 7 &lt; 7.1.0)

uopz_implement — Implementa una interfaz en tiempo de ejecución

### Descripción

**uopz_implement**([string](#language.types.string) $class, [string](#language.types.string) $interface): [bool](#language.types.boolean)

Implementa la interface en la class.

### Parámetros

    class


      El nombre de la clase.






    interface


      El nombre de la interfaz.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

A partir de PHP 7.4.0, **uopz_implement()** emite una
[RuntimeException](#class.runtimeexception), si
[OPcache](#book.opcache) está activado, y la entrada de clase
de class es inmutable.

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_implement()**

&lt;?php
interface myInterface {}

class myClass {}

uopz_implement(myClass::class, myInterface::class);

var_dump(class_implements(myClass::class));
?&gt;

El ejemplo anterior mostrará:

array(1) {
["myInterface"]=&gt;
string(11) "myInterface"
}

# uopz_overload

(PECL uopz 1, PECL uopz 2)

uopz_overload — Sobrecarga un opcode de la VM

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_overload**([int](#language.types.integer) $opcode, [Callable](#language.types.callable) $callable): [void](language.types.void.html)

Sobrecarga el opcode especificado con una función
definida por el usuario.

### Parámetros

    opcode


      Un opcode válido; consulte las constantes para más detalles
      sobre los códigos admitidos.






    callable





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_overload()**

&lt;?php
uopz_overload(ZEND_EXIT, function(){});

exit();
echo "Hello World";
?&gt;

El ejemplo anterior mostrará:

Hello World

# uopz_redefine

(PECL uopz 1, PECL uopz 2, PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_redefine — Redefinir una constante

### Descripción

**uopz_redefine**([string](#language.types.string) $constant, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

**uopz_redefine**([string](#language.types.string) $class, [string](#language.types.string) $constant, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Redefine la constante constant proporcionada,
a value.

### Parámetros

    class


      El nombre de la clase que contiene la constante






    constant


      El nombre de la constante






    value


      El nuevo valor de la constante; debe ser un tipo válido para
      una constante


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_redefine()**

&lt;?php
define("MY", 100);

uopz_redefine("MY", 1000);

echo MY;
?&gt;

El ejemplo anterior mostrará:

1000

# uopz_rename

(PECL uopz 1, PECL uopz 2)

uopz_rename — Cambia el nombre de una función en tiempo de ejecución

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_rename**([string](#language.types.string) $function, [string](#language.types.string) $rename): [void](language.types.void.html)

**uopz_rename**([string](#language.types.string) $class, [string](#language.types.string) $function, [string](#language.types.string) $rename): [void](language.types.void.html)

Cambia el nombre de la función function a rename.

**Nota**:

    Si ambas funciones existen, sus nombres serán intercambiados.

### Parámetros

    class


      El nombre de la clase que contiene la función






    function


      El nombre de una función existente






    rename


      El nuevo nombre de la función


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_rename()**

&lt;?php
uopz_rename("strlen", "original_strlen");

echo original_strlen("Hello World");
?&gt;

El ejemplo anterior mostrará:

11

**Ejemplo #2 Ejemplo con uopz_rename()** y una clase

&lt;?php
class My {
public function strlen($arg) {
        return strlen($arg);
}
}

uopz_rename(My::class, "strlen", "original_strlen");

echo My::original_strlen("Hello World");
?&gt;

El ejemplo anterior mostrará:

11

# uopz_restore

(PECL uopz 1 &gt;= 1.0.3, PECL uopz 2)

uopz_restore — Restaura una función guardada

**Advertencia**Esta función ha sido
_ELIMINADA_ en PECL uopz 5.0.0.

### Descripción

**uopz_restore**([string](#language.types.string) $function): [void](language.types.void.html)

**uopz_restore**([string](#language.types.string) $class, [string](#language.types.string) $function): [void](language.types.void.html)

Restaura una función guardada.

### Parámetros

    class


      El nombre de la clase que contiene la función a restaurar






    function


      El nombre de la función


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_restore()**

&lt;?php
uopz_backup("fgets");
uopz_function("fgets", function(){
return true;
});
var_dump(fgets());
uopz_restore('fgets');
fgets();
?&gt;

Resultado del ejemplo anterior es similar a:

Advertencia: fgets() espera al menos 1 parámetro, 0 dado en /path/to/script.php en la línea 8

# uopz_set_hook

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_set_hook — Define el hook que se ejecutará al entrar en una función o un método

### Descripción

**uopz_set_hook**([string](#language.types.string) $function, [Closure](#class.closure) $hook): [bool](#language.types.boolean)

**uopz_set_hook**([string](#language.types.string) $class, [string](#language.types.string) $function, [Closure](#class.closure) $hook): [bool](#language.types.boolean)

Define un hook que se ejecutará al entrar en una función o un método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o del método.






    hook


      Una función anónima que se ejecutará al entrar en la función o el método.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_set_hook()**

&lt;?php
function foo() {
echo 'foo';
}
uopz_set_hook('foo', function () {echo 'bar';});
foo();
?&gt;

El ejemplo anterior mostrará:

barfoo

### Ver también

- [uopz_get_hook()](#function.uopz-get-hook) - Devuelve el hook previamente definido en una función o método

- [uopz_unset_hook()](#function.uopz-unset-hook) - Suprime el hook previamente fijado sobre una función o un método

# uopz_set_mock

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_set_mock — Utiliza una simulación en lugar de una clase para nuevos objetos

### Descripción

**uopz_set_mock**([string](#language.types.string) $class, [mixed](#language.types.mixed) $mock): [void](language.types.void.html)

Si mock es una cadena que contiene el nombre de una clase, se instanciará en lugar de
class. mock también puede ser un objeto.

**Nota**:

    Solo el acceso dinámico a las propiedades y métodos usará el objeto mock.
    El acceso estático sigue utilizando la class original.
    Consulte el [ejemplo](#uopz_set_mock.example.static) a continuación.

### Parámetros

    class


      El nombre de la clase que se va a simular.






    mock


      La simulación a usar en forma de cadena que contiene el nombre de la clase a usar o un objeto.
      Si se pasa una cadena, debe ser el nombre totalmente calificado de la clase. Se recomienda usar la constante mágica ::class en este caso.


### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      PECL uopz 6.0.0

       La simulación de miembros estáticos ya no es compatible con esta función.
       [uopz_redefine()](#function.uopz-redefine) y [uopz_set_return()](#function.uopz-set-return),
       o [Componere](#book.componere) pueden ser utilizados en su lugar.



### Ejemplos

**Ejemplo #1 Ejemplo de uopz_set_mock()**

&lt;?php
class A {
public function who() {
echo "A";
}
}

class mockA {
public function who() {
echo "mockA";
}
}

uopz_set_mock(A::class, mockA::class);
(new A)-&gt;who();
?&gt;

El ejemplo anterior mostrará:

mockA

**Ejemplo #2 Ejemplo de uopz_set_mock()**

&lt;?php
class A {
public function who() {
echo "A";
}
}

uopz_set_mock(A::class, new class {
public function who() {
echo "mockA";
}
});
(new A)-&gt;who();
?&gt;

El ejemplo anterior mostrará:

mockA

**Ejemplo #3 uopz_set_mock()** y miembros estáticos

    Desde uopz 6.0.0, la simulación de miembros estáticos ya no es compatible.

&lt;?php
class A {
const CON = 'A';
public static function who() {
echo "A";
}
}

uopz_set_mock(A::class, new class {
const CON = 'mockA';
public static function who() {
echo "mockA";
}
});
echo A::CON, PHP_EOL;
A::who();
?&gt;

El ejemplo anterior mostrará:

A
A

     El ejemplo anterior muestra con uopz 5:

mockA
mockA

### Ver también

- [uopz_get_mock()](#function.uopz-get-mock) - Devuelve la simulación actual de una clase

- [uopz_unset_mock()](#function.uopz-unset-mock) - Suprime la simulación previamente fijada

# uopz_set_property

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_set_property — Establece el valor de una propiedad de clase existente o de instancia

### Descripción

**uopz_set_property**([string](#language.types.string) $class, [string](#language.types.string) $property, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

**uopz_set_property**([object](#language.types.object) $instance, [string](#language.types.string) $property, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Establece el valor de una propiedad de clase estática existente, si se proporciona class, o el valor de una propiedad de instancia (sin importar si la propiedad de instancia ya existe), si se proporciona instance.

### Parámetros

    class


      El nombre de la clase.






    instance


      La instancia del objeto.






    property


      El nombre de la propiedad.






    value


      El valor a asignar a la propiedad.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_set_property()**

&lt;?php
class Foo {
private static $staticBar;
   private $bar;
   public static function testStaticBar() {
      return self::$staticBar;
}
public function testBar() {
return $this-&gt;bar;
   }
}
$foo = new Foo;
uopz_set_property('Foo', 'staticBar', 10);
uopz_set_property($foo, 'bar', 100);
var_dump(Foo::testStaticBar());
var_dump($foo-&gt;testBar());
?&gt;

El ejemplo anterior mostrará:

int(10)

### Ver también

- [uopz_get_property()](#function.uopz-get-property) - Devuelve el valor de una propiedad de clase o instancia

# uopz_set_return

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_set_return — Proporciona un valor de retorno para una función existente

### Descripción

**uopz_set_return**([string](#language.types.string) $function, [mixed](#language.types.mixed) $value, [bool](#language.types.boolean) $execute = **[false](#constant.false)**): [bool](#language.types.boolean)

**uopz_set_return**(
    [string](#language.types.string) $class,
    [string](#language.types.string) $function,
    [mixed](#language.types.mixed) $value,
    [bool](#language.types.boolean) $execute = **[false](#constant.false)**
): [bool](#language.types.boolean)

Establece el valor de retorno de la function a value. Si value
es una función anónima y execute está establecido, la función anónima se ejecutará en lugar de la función original.
Es posible llamar a la función original desde la función anónima.

**Nota**:

    Esta función reemplaza a [uopz_rename()](#function.uopz-rename).

### Parámetros

    class


      El nombre de la clase que contiene la función






    function


      El nombre de una función existente






    value


      El valor que la función debe devolver. Si se proporciona una función anónima y el flag de ejecución está establecido, la función anónima se ejecutará en lugar de la función original.






    execute


      Si es verdadero, y se ha proporcionado una función anónima como valor, la función anónima se ejecutará en lugar de la función original.


### Valores devueltos

Devuelve true en caso de éxito, de lo contrario false.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_set_return()**

&lt;?php
uopz_set_return("strlen", 42);
echo strlen("Banana");
?&gt;

El ejemplo anterior mostrará:

42

**Ejemplo #2 Ejemplo de uopz_set_return()**

&lt;?php
uopz_set_return("strlen", function($str) { return strlen($str) \* 2; }, true );
echo strlen("Banana");
?&gt;

El ejemplo anterior mostrará:

12

**Ejemplo #3 Ejemplo de uopz_set_return()** con una clase

&lt;?php
class My {
public static function strlen($arg) {
        return strlen($arg);
}
}
uopz_set_return(My::class, "strlen", function($str) { return strlen($str) \* 2; }, true );
echo My::strlen("Banana");
?&gt;

El ejemplo anterior mostrará:

12

# uopz_set_static

(PECL uopz 5, PECL uopz , PECL uopz 7)

uopz_set_static — Fija las variables estáticas en el ámbito de una función o de un método

### Descripción

**uopz_set_static**([string](#language.types.string) $function, [array](#language.types.array) $static): [void](language.types.void.html)

**uopz_set_static**([string](#language.types.string) $class, [string](#language.types.string) $function, [array](#language.types.array) $static): [void](language.types.void.html)

Fija las variables estáticas en el ámbito de una función o de un método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o del método.






    static


      El array asociativo de nombres de variables mapeados a sus valores.


### Valores devueltos

    No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de uso de uopz_set_static()**

&lt;?php
function foo() {
static $bar = 'baz';
    var_dump($bar);
}
uopz_set_static('foo', ['bar' =&gt; 'qux']);
foo();
?&gt;

El ejemplo anterior mostrará:

string(3) "qux"

### Ver también

- [uopz_get_static()](#function.uopz-get-static) - Devuelve las variables estáticas de una función o método

# uopz_undefine

(PECL uopz 1, PECL uopz 2, PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_undefine — Elimina una constante

### Descripción

**uopz_undefine**([string](#language.types.string) $constant): [bool](#language.types.boolean)

**uopz_undefine**([string](#language.types.string) $class, [string](#language.types.string) $constant): [bool](#language.types.boolean)

Elimina una constante en tiempo de ejecución.

### Parámetros

    class


      El nombre de la clase que contiene la constant






    constant


      El nombre de una constante existente


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con uopz_undefine()**

&lt;?php
define("MY", true);

uopz_undefine("MY");

var_dump(defined("MY"));
?&gt;

El ejemplo anterior mostrará:

bool(false)

# uopz_unset_hook

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_unset_hook — Suprime el hook previamente fijado sobre una función o un método

### Descripción

**uopz_unset_hook**([string](#language.types.string) $function): [bool](#language.types.boolean)

**uopz_unset_hook**([string](#language.types.string) $class, [string](#language.types.string) $function): [bool](#language.types.boolean)

Suprime el hook previamente fijado sobre una función o un método.

### Parámetros

    class


      El nombre de la clase.






    function


      El nombre de la función o del método.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Uso básico de uopz_unset_hook()**

&lt;?php
function foo() {
echo 'foo';
}
uopz_set_hook('foo', function () {echo 'bar';});
foo();
echo PHP_EOL;
uopz_unset_hook('foo');
foo();
?&gt;

El ejemplo anterior mostrará:

barfoo
foo

### Ver también

- [uopz_set_hook()](#function.uopz-set-hook) - Define el hook que se ejecutará al entrar en una función o un método

- [uopz_get_hook()](#function.uopz-get-hook) - Devuelve el hook previamente definido en una función o método

# uopz_unset_mock

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_unset_mock — Suprime la simulación previamente fijada

### Descripción

**uopz_unset_mock**([string](#language.types.string) $class): [void](language.types.void.html)

Suprime la simulación previamente fijada para class.

### Parámetros

    class


      El nombre de la clase simulada.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Una [RuntimeException](#class.runtimeexception) es lanzada si ninguna simulación ha sido previamente
fijada para class.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_unset_mock()**

&lt;?php
class A {
public static function who() {
echo "A";
}
}

class mockA {
public static function who() {
echo "mockA";
}
}

uopz_set_mock(A::class, mockA::class);
uopz_unset_mock(A::class);
A::who();
?&gt;

El ejemplo anterior mostrará:

A

### Ver también

- [uopz_set_mock()](#function.uopz-set-mock) - Utiliza una simulación en lugar de una clase para nuevos objetos

- [uopz_get_mock()](#function.uopz-get-mock) - Devuelve la simulación actual de una clase

# uopz_unset_return

(PECL uopz 5, PECL uopz 6, PECL uopz 7)

uopz_unset_return — Suprime un valor de retorno previamente fijado para una función

### Descripción

**uopz_unset_return**([string](#language.types.string) $function): [bool](#language.types.boolean)

**uopz_unset_return**([string](#language.types.string) $class, [string](#language.types.string) $function): [bool](#language.types.boolean)

Suprime el valor de retorno de la function previamente fijado por [uopz_set_return()](#function.uopz-set-return).

### Parámetros

    class


      El nombre de la clase que contiene la función






    function


      El nombre de la función


### Valores devueltos

true en caso de éxito.

### Ejemplos

**Ejemplo #1 Ejemplo de uopz_unset_return()**

&lt;?php
uopz_set_return("strlen", 42);
$len = strlen("Banana");
uopz_unset_return("strlen");
echo $len + strlen("Banana");
?&gt;

El ejemplo anterior mostrará:

48

## Tabla de contenidos

- [uopz_add_function](#function.uopz-add-function) — Añade una función o método inexistente
- [uopz_allow_exit](#function.uopz-allow-exit) — Permite controlar el opcode exit desactivado
- [uopz_backup](#function.uopz-backup) — Guarda una función
- [uopz_compose](#function.uopz-compose) — Componer una clase
- [uopz_copy](#function.uopz-copy) — Copia una función
- [uopz_del_function](#function.uopz-del-function) — Elimina una función o método previamente añadido
- [uopz_delete](#function.uopz-delete) — Elimina una función
- [uopz_extend](#function.uopz-extend) — Extiende una clase en tiempo de ejecución
- [uopz_flags](#function.uopz-flags) — Recupera o define los flags de una función o clase
- [uopz_function](#function.uopz-function) — Crea una función en tiempo de ejecución
- [uopz_get_exit_status](#function.uopz-get-exit-status) — Devuelve el último estado de salida definido
- [uopz_get_hook](#function.uopz-get-hook) — Devuelve el hook previamente definido en una función o método
- [uopz_get_mock](#function.uopz-get-mock) — Devuelve la simulación actual de una clase
- [uopz_get_property](#function.uopz-get-property) — Devuelve el valor de una propiedad de clase o instancia
- [uopz_get_return](#function.uopz-get-return) — Devuelve un valor de retorno previamente definido para una función
- [uopz_get_static](#function.uopz-get-static) — Devuelve las variables estáticas de una función o método
- [uopz_implement](#function.uopz-implement) — Implementa una interfaz en tiempo de ejecución
- [uopz_overload](#function.uopz-overload) — Sobrecarga un opcode de la VM
- [uopz_redefine](#function.uopz-redefine) — Redefinir una constante
- [uopz_rename](#function.uopz-rename) — Cambia el nombre de una función en tiempo de ejecución
- [uopz_restore](#function.uopz-restore) — Restaura una función guardada
- [uopz_set_hook](#function.uopz-set-hook) — Define el hook que se ejecutará al entrar en una función o un método
- [uopz_set_mock](#function.uopz-set-mock) — Utiliza una simulación en lugar de una clase para nuevos objetos
- [uopz_set_property](#function.uopz-set-property) — Establece el valor de una propiedad de clase existente o de instancia
- [uopz_set_return](#function.uopz-set-return) — Proporciona un valor de retorno para una función existente
- [uopz_set_static](#function.uopz-set-static) — Fija las variables estáticas en el ámbito de una función o de un método
- [uopz_undefine](#function.uopz-undefine) — Elimina una constante
- [uopz_unset_hook](#function.uopz-unset-hook) — Suprime el hook previamente fijado sobre una función o un método
- [uopz_unset_mock](#function.uopz-unset-mock) — Suprime la simulación previamente fijada
- [uopz_unset_return](#function.uopz-unset-return) — Suprime un valor de retorno previamente fijado para una función

- [Introducción](#intro.uopz)
- [Instalación/Configuración](#uopz.setup)<li>[Requerimientos](#uopz.requirements)
- [Instalación](#uopz.installation)
- [Configuración en tiempo de ejecución](#uopz.configuration)
  </li>- [Constantes predefinidas](#uopz.constants)
- [Funciones Uopz](#ref.uopz)<li>[uopz_add_function](#function.uopz-add-function) — Añade una función o método inexistente
- [uopz_allow_exit](#function.uopz-allow-exit) — Permite controlar el opcode exit desactivado
- [uopz_backup](#function.uopz-backup) — Guarda una función
- [uopz_compose](#function.uopz-compose) — Componer una clase
- [uopz_copy](#function.uopz-copy) — Copia una función
- [uopz_del_function](#function.uopz-del-function) — Elimina una función o método previamente añadido
- [uopz_delete](#function.uopz-delete) — Elimina una función
- [uopz_extend](#function.uopz-extend) — Extiende una clase en tiempo de ejecución
- [uopz_flags](#function.uopz-flags) — Recupera o define los flags de una función o clase
- [uopz_function](#function.uopz-function) — Crea una función en tiempo de ejecución
- [uopz_get_exit_status](#function.uopz-get-exit-status) — Devuelve el último estado de salida definido
- [uopz_get_hook](#function.uopz-get-hook) — Devuelve el hook previamente definido en una función o método
- [uopz_get_mock](#function.uopz-get-mock) — Devuelve la simulación actual de una clase
- [uopz_get_property](#function.uopz-get-property) — Devuelve el valor de una propiedad de clase o instancia
- [uopz_get_return](#function.uopz-get-return) — Devuelve un valor de retorno previamente definido para una función
- [uopz_get_static](#function.uopz-get-static) — Devuelve las variables estáticas de una función o método
- [uopz_implement](#function.uopz-implement) — Implementa una interfaz en tiempo de ejecución
- [uopz_overload](#function.uopz-overload) — Sobrecarga un opcode de la VM
- [uopz_redefine](#function.uopz-redefine) — Redefinir una constante
- [uopz_rename](#function.uopz-rename) — Cambia el nombre de una función en tiempo de ejecución
- [uopz_restore](#function.uopz-restore) — Restaura una función guardada
- [uopz_set_hook](#function.uopz-set-hook) — Define el hook que se ejecutará al entrar en una función o un método
- [uopz_set_mock](#function.uopz-set-mock) — Utiliza una simulación en lugar de una clase para nuevos objetos
- [uopz_set_property](#function.uopz-set-property) — Establece el valor de una propiedad de clase existente o de instancia
- [uopz_set_return](#function.uopz-set-return) — Proporciona un valor de retorno para una función existente
- [uopz_set_static](#function.uopz-set-static) — Fija las variables estáticas en el ámbito de una función o de un método
- [uopz_undefine](#function.uopz-undefine) — Elimina una constante
- [uopz_unset_hook](#function.uopz-unset-hook) — Suprime el hook previamente fijado sobre una función o un método
- [uopz_unset_mock](#function.uopz-unset-mock) — Suprime la simulación previamente fijada
- [uopz_unset_return](#function.uopz-unset-return) — Suprime un valor de retorno previamente fijado para una función
  </li>
