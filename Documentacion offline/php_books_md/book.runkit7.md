# runkit7

# Introducción

La extensión runkit7 proporciona medios para modificar las constantes,
las funciones definidas por el usuario y las clases definidas por el usuario.
Asimismo, proporciona variables superglobales personalizadas.

Este paquete es un fork del
paquete [» runkit](https://pecl.php.net/package/runkit) que proporciona soporte para PHP 7.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#runkit7.requirements)
- [Instalación](#runkit7.installation)
- [Configuración en tiempo de ejecución](#runkit7.configuration)

    ## Requerimientos

    _Modificar constantes, funciones, clases y métodos_
    así como las _superglobales personalizadas_
    funciona con todas las versiones de PHP 7. No se requieren
    exigencias especiales.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/runkit7](https://pecl.php.net/package/runkit7).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de Configuración de Runkit**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [runkit.superglobal](#ini.runkit7.superglobal)
      ""
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [runkit.internal_override](#ini.runkit7.internal-override)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    runkit.superglobal
    [string](#language.types.string)



     Una lista separada por comas de nombres de variables que van a ser tratadas como superglobales.
     Este valor debería estar establecido a través del archivo php.ini, pero puede funcionar
     en contextos de configuración por directorio dependiendo de su SAPI.


     **Ejemplo #1 Superglobales personalizadas con runkit.superglobal=_FOO,_BAR en php.ini**




&lt;?php
function mostrar_valores() {
echo "Foo es $\_FOO\n";
echo "Bar es $\_BAR\n";
echo "Baz es $\_BAZ\n";
}

$_FOO = 'foo';
$\_BAR = 'bar';
$\_BAZ = 'baz';

/_ Muestra foo y bar, pero no baz _/
mostrar_valores();
?&gt;

    runkit.internal_override
    [boolean](#language.types.boolean)



     Habilita la capacidad de modificar/renombrar/eliminar funciones internas.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[RUNKIT7_IMPORT_FUNCTIONS](#constant.runkit7-import-functions)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica
     que las funciones normales deben ser importadas del
     archivo especificado.





     **[RUNKIT7_IMPORT_CLASS_METHODS](#constant.runkit7-import-class-methods)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica
     que los métodos de clase deben ser importados del
     archivo especificado.





     **[RUNKIT7_IMPORT_CLASS_CONSTS](#constant.runkit7-import-class-consts)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica
     que las constantes de clase deben ser importadas del
     archivo especificado.





     **[RUNKIT7_IMPORT_CLASS_PROPS](#constant.runkit7-import-class-props)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica
     que las propiedades de clase estándar deben ser importadas
     del archivo especificado.





     **[RUNKIT7_IMPORT_CLASS_STATIC_PROPS](#constant.runkit7-import-class-static-props)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica
     que las propiedades estáticas de clase deben ser importadas
     del archivo especificado. Disponible a partir de Runkit 1.0.1.





     **[RUNKIT7_IMPORT_CLASSES](#constant.runkit7-import-classes)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) representa
     un OU a nivel de bits de las constantes **[RUNKIT7_IMPORT_CLASS_*](#constant.runkit7-import-class-methods)**.





     **[RUNKIT7_IMPORT_OVERRIDE](#constant.runkit7-import-override)**
     ([int](#language.types.integer))



     El flag [runkit7_import()](#function.runkit7-import) indica que
     si alguna de las funciones, métodos, constantes o propiedades
     importados ya existen, deben ser sobrescritos por las nuevas definiciones. Si este flag no está definido,
     entonces todas las definiciones importadas que ya existan
     serán ignoradas.





     **[RUNKIT7_ACC_RETURN_REFERENCE](#constant.runkit7-acc-return-reference)**
     ([int](#language.types.integer))



      Incluir este flag para hacer que la función o método creado o redefinido devuelva una referencia.





     **[RUNKIT7_ACC_PUBLIC](#constant.runkit7-acc-public)**
     ([int](#language.types.integer))



      El flag para [runkit7_method_add()](#function.runkit7-method-add) y [runkit7_method_redefine()](#function.runkit7-method-redefine) para hacer que el método sea público.





     **[RUNKIT7_ACC_PROTECTED](#constant.runkit7-acc-protected)**
     ([int](#language.types.integer))



      El flag para [runkit7_method_add()](#function.runkit7-method-add) y [runkit7_method_redefine()](#function.runkit7-method-redefine) para hacer que el método sea protegido.





     **[RUNKIT7_ACC_PRIVATE](#constant.runkit7-acc-private)**
     ([int](#language.types.integer))



      El flag para [runkit7_method_add()](#function.runkit7-method-add) y [runkit7_method_redefine()](#function.runkit7-method-redefine) para hacer que el método sea privado.





     **[RUNKIT7_ACC_STATIC](#constant.runkit7-acc-static)**
     ([int](#language.types.integer))



     El flag para [runkit7_method_add()](#function.runkit7-method-add) y [runkit7_method_redefine()](#function.runkit7-method-redefine) para hacer que el método sea estático.





     **[RUNKIT7_FEATURE_MANIPULATION](#constant.runkit7-feature-manipulation)**
     ([int](#language.types.integer))



      Igual a 1 si la manipulación en tiempo de ejecución está activada, y 0 en caso contrario.





     **[RUNKIT7_FEATURE_SUPERGLOBALS](#constant.runkit7-feature-superglobals)**
     ([int](#language.types.integer))



      Igual a 1 si las superglobales personalizadas están activadas, y 0 en caso contrario.





     **[RUNKIT7_FEATURE_SANDBOX](#constant.runkit7-feature-sandbox)**
     ([int](#language.types.integer))



      Siempre 0, es impracticable implementar la funcionalidad de entorno de pruebas en php 7.


# Funciones de runkit7

# runkit7_constant_add

(PECL runkit7 &gt;= Unknown)

runkit7_constant_add —
Similar a define(), pero permite definir constantes en las definiciones de clase también

### Descripción

**runkit7_constant_add**([string](#language.types.string) $constant_name, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $newVisibility = ?): [bool](#language.types.boolean)

### Parámetros

    constant_name


       El nombre de la constante a declarar. Puede ser un string para indicar una constante global,
       o classname::constname para indicar una constante de clase.






    value


       NULL, Bool, Long, Double, String, Array, o Resource a almacenar en la nueva constante.






    newVisibility


      La visibilidad de la constante, para las constantes de clase. Público por omisión.
      Una de las constantes **[RUNKIT7_ACC_*](#constant.runkit7-acc-return-reference)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [define()](#function.define) - Define una constante

    - [runkit7_constant_redefine()](#function.runkit7-constant-redefine) - Redefine una constante ya definida

    - [runkit7_constant_remove()](#function.runkit7-constant-remove) - Elimina una constante ya definida

# runkit7_constant_redefine

(PECL runkit7 &gt;= Unknown)

runkit7_constant_redefine — Redefine una constante ya definida

### Descripción

**runkit7_constant_redefine**([string](#language.types.string) $constant_name, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $new_visibility = ?): [bool](#language.types.boolean)

### Parámetros

    constant_name


       La constante a redefinir. Puede ser el nombre de una constante global,
       o classname::constname indicando una constante de clase.






    value


       El valor a asignar a la constante.






    new_visibility


      La nueva visibilidad de la constante, para constantes de clase.
      Por omisión, permanece sin cambios.
      Una de las constantes **[RUNKIT7_ACC_*](#constant.runkit7-acc-return-reference)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [runkit7_constant_add()](#function.runkit7-constant-add) - Similar a define(), pero permite definir constantes en las definiciones de clase también

    - [runkit7_constant_remove()](#function.runkit7-constant-remove) - Elimina una constante ya definida

# runkit7_constant_remove

(PECL runkit7 &gt;= Unknown)

runkit7_constant_remove —
Elimina una constante ya definida

### Descripción

**runkit7_constant_remove**([string](#language.types.string) $constant_name): [bool](#language.types.boolean)

### Parámetros

    constant_name


       El nombre de la constante a eliminar. Puede ser el nombre de una constante global,
       o classname::constname indicando una constante de clase.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [define()](#function.define) - Define una constante

    - [runkit7_constant_add()](#function.runkit7-constant-add) - Similar a define(), pero permite definir constantes en las definiciones de clase también

    - [runkit7_constant_redefine()](#function.runkit7-constant-redefine) - Redefine una constante ya definida

# runkit7_function_add

(PECL runkit7 &gt;= Unknown)

runkit7_function_add —
Añade una nueva función, similar a [create_function()](#function.create-function)

### Descripción

**runkit7_function_add**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string) $argument_list,
    [string](#language.types.string) $code,
    [bool](#language.types.boolean) $return_by_reference = **[null](#constant.null)**,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

**runkit7_function_add**(
    [string](#language.types.string) $function_name,
    [Closure](#class.closure) $closure,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

### Parámetros

    function_name


       El nombre de la función a crear






    argument_list


      La lista de argumentos separados por comas






    code


      El código que compone la función






    closure


      Una [closure](#class.closure) que define la función






    return_by_reference


      Si la función debe devolver por referencia






    doc_comment


      El comentario de documentación de la función






    return_type


      El tipo de retorno de la función






    is_strict


      Si la función debe comportarse como si fuera declarada en un archivo con strict_types=1


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de runkit7_function_add()**

&lt;?php
runkit7_function_add('testme','$a,$b','echo "The value of a is $a\n"; echo "The value of b is $b\n";');
testme(1,2);
?&gt;

    El ejemplo anterior mostrará:

The value of a is 1
The value of b is 2

### Ver también

    - [create_function()](#function.create-function) - Crea una función anónima

    - [runkit7_function_redefine()](#function.runkit7-function-redefine) - Sustituye una definición de función por una nueva implementación

    - [runkit7_function_copy()](#function.runkit7-function-copy) - Copia una función hacia un nuevo nombre de función

    - [runkit7_function_rename()](#function.runkit7-function-rename) - Cambiar un nombre de función

    - [runkit7_function_remove()](#function.runkit7-function-remove) - Elimina una definición de función

    - [runkit7_method_add()](#function.runkit7-method-add) - Añade dinámicamente un nuevo método a una clase dada

# runkit7_function_copy

(PECL runkit7 &gt;= Unknown)

runkit7_function_copy —
Copia una función hacia un nuevo nombre de función

### Descripción

**runkit7_function_copy**([string](#language.types.string) $source_name, [string](#language.types.string) $target_name): [bool](#language.types.boolean)

### Parámetros

    source_name


       El nombre de la función existente






    target_name


       El nombre de la nueva función hacia la cual copiar la definición


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de runkit7_function_copy()**

&lt;?php
function original() {
echo "In a function\n";
}
runkit7_function_copy('original','duplicate');
original();
duplicate();
?&gt;

    El ejemplo anterior mostrará:

In a function
In a function

### Ver también

    - [runkit7_function_add()](#function.runkit7-function-add) - Añade una nueva función, similar a create_function

    - [runkit7_function_redefine()](#function.runkit7-function-redefine) - Sustituye una definición de función por una nueva implementación

    - [runkit7_function_rename()](#function.runkit7-function-rename) - Cambiar un nombre de función

    - [runkit7_function_remove()](#function.runkit7-function-remove) - Elimina una definición de función

# runkit7_function_redefine

(PECL runkit7 &gt;= Unknown)

runkit7_function_redefine —
Sustituye una definición de función por una nueva implementación

### Descripción

**runkit7_function_redefine**(
    [string](#language.types.string) $function_name,
    [string](#language.types.string) $argument_list,
    [string](#language.types.string) $code,
    [bool](#language.types.boolean) $return_by_reference = **[null](#constant.null)**,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

**runkit7_function_redefine**(
    [string](#language.types.string) $function_name,
    [Closure](#class.closure) $closure,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

**Nota**: Por defecto, solo
las funciones definidas por el usuario pueden ser eliminadas,
renombradas o modificadas. Para sobreescribir funciones internas, se
debe activar la configuración runkit.internal_override
en el archivo php.ini del sistema entero.

### Parámetros

    function_name


       El nombre de la función a redefinir






     argument_list


       La nueva lista de argumentos a aceptar por la función






     code


       El código de la nueva implementación






     closure


       Una [closure](#class.closure) que define la función






     return_by_reference


       Si la función debe devolver por referencia






     doc_comment


       El comentario de documentación de la función






    return_type


      El tipo de retorno de la función






    is_strict


      Si la función se comporta como si estuviera declarada en un fichero con strict_types=1


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de runkit7_function_redefine()**

&lt;?php
function testme() {
echo "Original Testme Implementation\n";
}
testme();
runkit7_function_redefine('testme','','echo "New Testme Implementation\n";');
testme();
?&gt;

    El ejemplo anterior mostrará:

Original Testme Implementation
New Testme Implementation

### Ver también

    - [runkit7_function_add()](#function.runkit7-function-add) - Añade una nueva función, similar a create_function

    - [runkit7_function_copy()](#function.runkit7-function-copy) - Copia una función hacia un nuevo nombre de función

    - [runkit7_function_rename()](#function.runkit7-function-rename) - Cambiar un nombre de función

    - [runkit7_function_remove()](#function.runkit7-function-remove) - Elimina una definición de función

    - [runkit7_method_redefine()](#function.runkit7-method-redefine) - Cambiar dinámicamente el código del método dado

# runkit7_function_remove

(PECL runkit7 &gt;= Unknown)

runkit7_function_remove —
Elimina una definición de función

### Descripción

**runkit7_function_remove**([string](#language.types.string) $function_name): [bool](#language.types.boolean)

**Nota**: Por defecto, solo
las funciones definidas por el usuario pueden ser eliminadas,
renombradas o modificadas. Para sobreescribir funciones internas, se
debe activar la configuración runkit.internal_override
en el archivo php.ini del sistema entero.

### Parámetros

    function_name


       El nombre de la función a eliminar


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [runkit7_function_add()](#function.runkit7-function-add) - Añade una nueva función, similar a create_function

    - [runkit7_function_copy()](#function.runkit7-function-copy) - Copia una función hacia un nuevo nombre de función

    - [runkit7_function_redefine()](#function.runkit7-function-redefine) - Sustituye una definición de función por una nueva implementación

    - [runkit7_function_rename()](#function.runkit7-function-rename) - Cambiar un nombre de función

# runkit7_function_rename

(PECL runkit7 &gt;= Unknown)

runkit7_function_rename —
Cambiar un nombre de función

### Descripción

**runkit7_function_rename**([string](#language.types.string) $source_name, [string](#language.types.string) $target_name): [bool](#language.types.boolean)

**Nota**: Por defecto, solo
las funciones definidas por el usuario pueden ser eliminadas,
renombradas o modificadas. Para sobreescribir funciones internas, se
debe activar la configuración runkit.internal_override
en el archivo php.ini del sistema entero.

### Parámetros

    source_name


       El nombre de la función existente






    target_name


       El nuevo nombre de la función


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [runkit7_function_add()](#function.runkit7-function-add) - Añade una nueva función, similar a create_function

    - [runkit7_function_copy()](#function.runkit7-function-copy) - Copia una función hacia un nuevo nombre de función

    - [runkit7_function_redefine()](#function.runkit7-function-redefine) - Sustituye una definición de función por una nueva implementación

    - [runkit7_function_remove()](#function.runkit7-function-remove) - Elimina una definición de función

# runkit7_import

(PECL runkit7 &gt;= Unknown)

runkit7_import —
Realiza la importación de un fichero PHP importando las definiciones de funciones y clases, sobrescribiéndolas si es necesario

**Advertencia**
Esta característica ha sido _eliminada_ en PECL runkit7 4.0.0.

### Descripción

**runkit7_import**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = ?): [bool](#language.types.boolean)

Similar a [include](#function.include). Sin embargo, todo código que se encuentre
fuera de una función o clase es simplemente ignorado.
Además, en función del valor de flags,
toda función o clase ya existente en el entorno de ejecución actual
puede ser automáticamente sobrescrita por sus nuevas definiciones.

### Parámetros

    filename


       El nombre del fichero a partir del cual importar las definiciones de funciones y clases






    flags


       Una operación a nivel de bits de la familia de constantes
       [RUNKIT7_IMPORT_*](#runkit7.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# runkit7_method_add

(PECL runkit7 &gt;= Unknown)

runkit7_method_add — Añade dinámicamente un nuevo método a una clase dada

### Descripción

**runkit7_method_add**(
    [string](#language.types.string) $class_name,
    [string](#language.types.string) $method_name,
    [string](#language.types.string) $argument_list,
    [string](#language.types.string) $code,
    [int](#language.types.integer) $flags = RUNKIT7_ACC_PUBLIC,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

**runkit7_method_add**(
    [string](#language.types.string) $class_name,
    [string](#language.types.string) $method_name,
    [Closure](#class.closure) $closure,
    [int](#language.types.integer) $flags = RUNKIT7_ACC_PUBLIC,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

### Parámetros

    class_name


       La clase a la cual se añadirá este método






    method_name


       El nombre del método a añadir






     argument_list


       La lista de argumentos separados por comas para el nuevo método






     code


       El código a evaluar cuando method_name
       es llamado






     closure


       Una [closure](#class.closure) que define el método.






     flags


       El tipo de método a crear, puede ser
       **[RUNKIT7_ACC_PUBLIC](#constant.runkit7-acc-public)**,
       **[RUNKIT7_ACC_PROTECTED](#constant.runkit7-acc-protected)** o
       **[RUNKIT7_ACC_PRIVATE](#constant.runkit7-acc-private)** opcionalmente combinado mediante una operación bit a bit OU con
       **[RUNKIT7_ACC_STATIC](#constant.runkit7-acc-static)**






     doc_comment


       El comentario de documentación del método.






    return_type


      El tipo de retorno del método.







    is_strict


      Si el método se comporta como si fuera declarado en un fichero con strict_types=1


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_method_add()**

&lt;?php
class Example {
function foo() {
echo "foo!\n";
}
}

// Crear un objeto Example
$e = new Example();

// Añadir un nuevo método público
runkit7_method_add(
'Example',
'add',
'$num1, $num2',
'return $num1 + $num2;',
RUNKIT7_ACC_PUBLIC
);

// Sumar 12 + 4
echo $e-&gt;add(12, 4);
?&gt;

    El ejemplo anterior mostrará:

16

### Ver también

    - [runkit7_method_copy()](#function.runkit7-method-copy) - Copia un método de una clase a otra

    - [runkit7_method_redefine()](#function.runkit7-method-redefine) - Cambiar dinámicamente el código del método dado

    - [runkit7_method_remove()](#function.runkit7-method-remove) - Elimina dinámicamente el método especificado

    - [runkit7_method_rename()](#function.runkit7-method-rename) - Cambiar dinámicamente el nombre del método dado

    - [runkit7_function_add()](#function.runkit7-function-add) - Añade una nueva función, similar a create_function

# runkit7_method_copy

(PECL runkit7 &gt;= Unknown)

runkit7_method_copy — Copia un método de una clase a otra

### Descripción

**runkit7_method_copy**(
    [string](#language.types.string) $destination_class,
    [string](#language.types.string) $destination_method_name,
    [string](#language.types.string) $source_class,
    [string](#language.types.string) $source_method_name = ?
): [bool](#language.types.boolean)

### Parámetros

    destination_class


       La clase de destino para el método copiado






    destination_method_name


       El nombre del método de destino






    source_class


       La clase fuente del método a copiar






    source_method_name


       El nombre del método a copiar de la clase fuente. Si este argumento es
       omitido, se asume el valor de destination_method_name.


### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_method_copy()**

&lt;?php
class Foo {
function example() {
return "foo!\n";
}
}

class Bar {
// sin métodos inicialmente
}

// copia el example() de la clase Foo a la clase Bar, como baz()
runkit7_method_copy('Bar', 'baz', 'Foo', 'example');

// muestra la función copiada
echo Bar::baz();
?&gt;

    El ejemplo anterior mostrará:

foo!

### Ver también

    - [runkit7_method_add()](#function.runkit7-method-add) - Añade dinámicamente un nuevo método a una clase dada

    - [runkit7_method_redefine()](#function.runkit7-method-redefine) - Cambiar dinámicamente el código del método dado

    - [runkit7_method_remove()](#function.runkit7-method-remove) - Elimina dinámicamente el método especificado

    - [runkit7_method_rename()](#function.runkit7-method-rename) - Cambiar dinámicamente el nombre del método dado

    - [runkit7_function_copy()](#function.runkit7-function-copy) - Copia una función hacia un nuevo nombre de función

# runkit7_method_redefine

(PECL runkit7 &gt;= Unknown)

runkit7_method_redefine — Cambiar dinámicamente el código del método dado

### Descripción

**runkit7_method_redefine**(
    [string](#language.types.string) $class_name,
    [string](#language.types.string) $method_name,
    [string](#language.types.string) $argument_list,
    [string](#language.types.string) $code,
    [int](#language.types.integer) $flags = RUNKIT7_ACC_PUBLIC,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

**runkit7_method_redefine**(
    [string](#language.types.string) $class_name,
    [string](#language.types.string) $method_name,
    [Closure](#class.closure) $closure,
    [int](#language.types.integer) $flags = RUNKIT7_ACC_PUBLIC,
    [string](#language.types.string) $doc_comment = **[null](#constant.null)**,
    [string](#language.types.string) $return_type = ?,
    [bool](#language.types.boolean) $is_strict = ?
): [bool](#language.types.boolean)

### Parámetros

    class_name


       La clase en la que redefinir el método






    method_name


       El nombre del método a redefinir






     argument_list


       La lista de argumentos separados por comas para el método redefinido






     code


       El nuevo código a evaluar cuando method_name
       es llamado






     closure


       Una [closure](#class.closure) que define el método.






     flags


       El método redefinido puede ser
       **[RUNKIT7_ACC_PUBLIC](#constant.runkit7-acc-public)**,
       **[RUNKIT7_ACC_PROTECTED](#constant.runkit7-acc-protected)** o
       **[RUNKIT7_ACC_PRIVATE](#constant.runkit7-acc-private)** opcionalmente combinado mediante una operación bit a bit OU con
       **[RUNKIT7_ACC_STATIC](#constant.runkit7-acc-static)**






     doc_comment


       El comentario de documentación del método.






    return_type


      El tipo de retorno del método.






    is_strict


      Si el método se comporta como si fuera declarado en un archivo con strict_types=1


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_method_redefine()**

&lt;?php
class Example {
function foo() {
return "foo!\n";
}
}

// crear un objeto Example
$e = new Example();

// muestra Example::foo() (antes de la redefinición)
echo "Before: " . $e-&gt;foo();

// Redefine el método 'foo'
runkit7_method_redefine(
'Example',
'foo',
'',
'return "bar!\n";',
RUNKIT7_ACC_PUBLIC
);

// muestra Example::foo() (después de la redefinición)
echo "After: " . $e-&gt;foo();
?&gt;

    El ejemplo anterior mostrará:

Before: foo!
After: bar!

### Ver también

    - [runkit7_method_add()](#function.runkit7-method-add) - Añade dinámicamente un nuevo método a una clase dada

    - [runkit7_method_copy()](#function.runkit7-method-copy) - Copia un método de una clase a otra

    - [runkit7_method_remove()](#function.runkit7-method-remove) - Elimina dinámicamente el método especificado

    - [runkit7_method_rename()](#function.runkit7-method-rename) - Cambiar dinámicamente el nombre del método dado

    - [runkit7_function_redefine()](#function.runkit7-function-redefine) - Sustituye una definición de función por una nueva implementación

# runkit7_method_remove

(PECL runkit7 &gt;= Unknown)

runkit7_method_remove — Elimina dinámicamente el método especificado

### Descripción

**runkit7_method_remove**([string](#language.types.string) $class_name, [string](#language.types.string) $method_name): [bool](#language.types.boolean)

**Nota**: Esta función
no puede ser utilizada para manipular el método en curso de utilización (o encadenado).

### Parámetros

    class_name


       La clase de la cual eliminar el método






    method_name


       El nombre del método a eliminar


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_method_remove()**

&lt;?php
class Example {
function foo() {
return "foo!\n";
}

    function bar() {
        return "bar!\n";
    }

}

// Elimina el método 'foo'
runkit7_method_remove(
'Example',
'foo'
);

echo implode(' ', get_class_methods('Example'));

?&gt;

    El ejemplo anterior mostrará:

bar

### Ver también

    - [runkit7_method_add()](#function.runkit7-method-add) - Añade dinámicamente un nuevo método a una clase dada

    - [runkit7_method_copy()](#function.runkit7-method-copy) - Copia un método de una clase a otra

    - [runkit7_method_redefine()](#function.runkit7-method-redefine) - Cambiar dinámicamente el código del método dado

    - [runkit7_method_rename()](#function.runkit7-method-rename) - Cambiar dinámicamente el nombre del método dado

    - [runkit7_function_remove()](#function.runkit7-function-remove) - Elimina una definición de función

# runkit7_method_rename

(PECL runkit7 &gt;= Unknown)

runkit7_method_rename — Cambiar dinámicamente el nombre del método dado

### Descripción

**runkit7_method_rename**([string](#language.types.string) $class_name, [string](#language.types.string) $source_method_name, [string](#language.types.string) $target_method_name): [bool](#language.types.boolean)

**Nota**: Esta función
no puede ser utilizada para manipular el método en curso de utilización (o encadenado).

### Parámetros

    class_name


       La clase en la que renombrar el método






    source_method_name


       El nombre del método a renombrar






    target_method_name


       El nuevo nombre a dar al método renombrado


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_method_rename()**

&lt;?php
class Example {
function foo() {
return "foo!\n";
}
}

// Renombrar el método 'foo' a 'bar'
runkit7_method_rename(
'Example',
'foo',
'bar'
);

// Mostrar la función renombrada
echo (new Example)-&gt;bar();
?&gt;

    El ejemplo anterior mostrará:

foo!

### Ver también

    - [runkit7_method_add()](#function.runkit7-method-add) - Añade dinámicamente un nuevo método a una clase dada

    - [runkit7_method_copy()](#function.runkit7-method-copy) - Copia un método de una clase a otra

    - [runkit7_method_redefine()](#function.runkit7-method-redefine) - Cambiar dinámicamente el código del método dado

    - [runkit7_method_remove()](#function.runkit7-method-remove) - Elimina dinámicamente el método especificado

    - [runkit7_function_rename()](#function.runkit7-function-rename) - Cambiar un nombre de función

# runkit7_object_id

(PECL runkit7 &gt;= Unknown)

runkit7_object_id —
Devuelve el identificador de objeto para un objeto dado

### Descripción

**runkit7_object_id**([object](#language.types.object) $obj): [int](#language.types.integer)

Esta función es equivalente a [spl_object_id()](#function.spl-object-id).

Esta función devuelve un identificador único para el objeto. El identificador
de objeto es único durante la vida del objeto. Una vez destruido el objeto,
su identificador puede ser reutilizado para otros objetos. Este comportamiento
es similar a [spl_object_hash()](#function.spl-object-hash).

### Parámetros

    obj


      Un objeto cualquiera.


### Valores devueltos

Un identificador entero que es único para cada objeto actualmente existente
y siempre es el mismo para cada objeto.

### Notas

**Nota**:

    Cuando un objeto es destruido, su identificador puede ser reutilizado para otros objetos.

### Ver también

    - [spl_object_id()](#function.spl-object-id) - Devuelve el gestor de objeto entero para un objeto dado

# runkit7_superglobals

(PECL runkit7 &gt;= Unknown)

runkit7_superglobals —
Devuelve un array indexado numéricamente de las superglobales registradas

### Descripción

**runkit7_superglobals**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado numéricamente de las superglobales registradas.
Es decir, \_GET, \_POST, \_REQUEST, \_COOKIE, \_SESSION, \_SERVER, \_ENV, \_FILES

### Ver también

    - [Ámbito de las variables](#language.variables.scope)

# runkit7_zval_inspect

(PECL runkit7 &gt;= Unknown)

runkit7_zval_inspect — Proporciona información sobre el valor pasado con los tipos de datos, los conteos de referencia, etc

### Descripción

**runkit7_zval_inspect**([string](#language.types.string) $value): [array](#language.types.array)

### Parámetros

    value


      El valor para el cual se devuelve la representación


### Valores devueltos

El array devuelto por esta función contiene los siguientes elementos:

    - address

    - refcount (opcional)

    - is_ref (opcional)

    - type

### Ejemplos

    **Ejemplo #1 Ejemplo de runkit7_zval_inspect()**

&lt;?php

$var = new DateTime();
var_dump(runkit7_zval_inspect($var));

$var = 1;
var_dump(runkit7_zval_inspect($var));
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["address"]=&gt;
string(14) "0x7f45ab21b1e0"
["refcount"]=&gt;
int(2)
["is_ref"]=&gt;
bool(false)
["type"]=&gt;
int(8)
}

array(2) {
["address"]=&gt;
string(14) "0x7f45ab21b1e0"
["type"]=&gt;
int(4)
}

### Ver también

    - [References Explained](#language.references)

    - [» References Explained (by Derick Rethans)](http://derickrethans.nl/php_references_article.php)

## Tabla de contenidos

- [runkit7_constant_add](#function.runkit7-constant-add) — Similar a define(), pero permite definir constantes en las definiciones de clase también
- [runkit7_constant_redefine](#function.runkit7-constant-redefine) — Redefine una constante ya definida
- [runkit7_constant_remove](#function.runkit7-constant-remove) — Elimina una constante ya definida
- [runkit7_function_add](#function.runkit7-function-add) — Añade una nueva función, similar a create_function
- [runkit7_function_copy](#function.runkit7-function-copy) — Copia una función hacia un nuevo nombre de función
- [runkit7_function_redefine](#function.runkit7-function-redefine) — Sustituye una definición de función por una nueva implementación
- [runkit7_function_remove](#function.runkit7-function-remove) — Elimina una definición de función
- [runkit7_function_rename](#function.runkit7-function-rename) — Cambiar un nombre de función
- [runkit7_import](#function.runkit7-import) — Realiza la importación de un fichero PHP importando las definiciones de funciones y clases, sobrescribiéndolas si es necesario
- [runkit7_method_add](#function.runkit7-method-add) — Añade dinámicamente un nuevo método a una clase dada
- [runkit7_method_copy](#function.runkit7-method-copy) — Copia un método de una clase a otra
- [runkit7_method_redefine](#function.runkit7-method-redefine) — Cambiar dinámicamente el código del método dado
- [runkit7_method_remove](#function.runkit7-method-remove) — Elimina dinámicamente el método especificado
- [runkit7_method_rename](#function.runkit7-method-rename) — Cambiar dinámicamente el nombre del método dado
- [runkit7_object_id](#function.runkit7-object-id) — Devuelve el identificador de objeto para un objeto dado
- [runkit7_superglobals](#function.runkit7-superglobals) — Devuelve un array indexado numéricamente de las superglobales registradas
- [runkit7_zval_inspect](#function.runkit7-zval-inspect) — Proporciona información sobre el valor pasado con los tipos de datos, los conteos de referencia, etc

- [Introducción](#intro.runkit7)
- [Instalación/Configuración](#runkit7.setup)<li>[Requerimientos](#runkit7.requirements)
- [Instalación](#runkit7.installation)
- [Configuración en tiempo de ejecución](#runkit7.configuration)
  </li>- [Constantes predefinidas](#runkit7.constants)
- [Funciones de runkit7](#ref.runkit7)<li>[runkit7_constant_add](#function.runkit7-constant-add) — Similar a define(), pero permite definir constantes en las definiciones de clase también
- [runkit7_constant_redefine](#function.runkit7-constant-redefine) — Redefine una constante ya definida
- [runkit7_constant_remove](#function.runkit7-constant-remove) — Elimina una constante ya definida
- [runkit7_function_add](#function.runkit7-function-add) — Añade una nueva función, similar a create_function
- [runkit7_function_copy](#function.runkit7-function-copy) — Copia una función hacia un nuevo nombre de función
- [runkit7_function_redefine](#function.runkit7-function-redefine) — Sustituye una definición de función por una nueva implementación
- [runkit7_function_remove](#function.runkit7-function-remove) — Elimina una definición de función
- [runkit7_function_rename](#function.runkit7-function-rename) — Cambiar un nombre de función
- [runkit7_import](#function.runkit7-import) — Realiza la importación de un fichero PHP importando las definiciones de funciones y clases, sobrescribiéndolas si es necesario
- [runkit7_method_add](#function.runkit7-method-add) — Añade dinámicamente un nuevo método a una clase dada
- [runkit7_method_copy](#function.runkit7-method-copy) — Copia un método de una clase a otra
- [runkit7_method_redefine](#function.runkit7-method-redefine) — Cambiar dinámicamente el código del método dado
- [runkit7_method_remove](#function.runkit7-method-remove) — Elimina dinámicamente el método especificado
- [runkit7_method_rename](#function.runkit7-method-rename) — Cambiar dinámicamente el nombre del método dado
- [runkit7_object_id](#function.runkit7-object-id) — Devuelve el identificador de objeto para un objeto dado
- [runkit7_superglobals](#function.runkit7-superglobals) — Devuelve un array indexado numéricamente de las superglobales registradas
- [runkit7_zval_inspect](#function.runkit7-zval-inspect) — Proporciona información sobre el valor pasado con los tipos de datos, los conteos de referencia, etc
  </li>
