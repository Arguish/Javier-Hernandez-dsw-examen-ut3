# xdiff

# Introducción

La extensión xdiff permite crear y aplicar archivos parche que contienen
diferencias entre diferentes revisiones de archivos.

Esta extensión soporta dos modos de funcionamiento - sobre cadenas y sobre archivos, así como
dos formatos de parches diferentes - unificado y binario. Los parches unificados son excelentes
para archivos de texto, ya que son legibles y fáciles de revisar. Para los archivos binarios como
archivos o imágenes, los parches binarios serán la opción adecuada, ya que ellos son binary safe y
manejan caracteres no imprimibles.

A partir de la versión 1.5.0 hay dos diferentes conjuntos de funciones para la generación de
parches binarios. Las nuevas funciones - [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff)
[xdiff_file_rabdiff()](#function.xdiff-file-rabdiff) generan salidas compatibles con funciones más antiguas
pero suelen ser más rápidas y generan resultados más pequeños. Para más detalles sobre los métodos de
la generación de parches binarios y diferencias entre ellos, por favor consulte la website
[» libxdiff](http://www.xmailserver.org/xdiff-lib.html).

Esta extensión utiliza libxdiff para implementar estas funciones. Consulte
[» http://www.xmailserver.org/xdiff-lib.html](http://www.xmailserver.org/xdiff-lib.html) para mayor información.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xdiff.requirements)
- [Instalación](#xdiff.installation)

    ## Requerimientos

    Para usar xdiff, es necesario contar con libxdiff instalado, disponible
    en la web de libxdiff [» http://www.xmailserver.org/xdiff-lib.html](http://www.xmailserver.org/xdiff-lib.html).

    **Nota**:

    Para que estas funciones tengan en cuenta la directiva memory_limit es necesario contar con, al menos, libxdiff 0.7.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/xdiff](https://pecl.php.net/package/xdiff).

Los binarios Windows
(los archivos DLL)
para esta extensión PECL están disponibles en el sitio web PECL.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[XDIFF_PATCH_NORMAL](#constant.xdiff-patch-normal)**
    ([int](#language.types.integer))



     Este indicador indica que las funciones [xdiff_string_patch()](#function.xdiff-string-patch) y
     [xdiff_file_patch()](#function.xdiff-file-patch) deben crear el resultado de
     aplicar el parche al contenido original, creando así una versión más reciente del archivo. Este es el
     modo por defecto de funcionamiento.





    **[XDIFF_PATCH_REVERSE](#constant.xdiff-patch-reverse)**
    ([int](#language.types.integer))



     Este indicador indica que las funciones [xdiff_string_patch()](#function.xdiff-string-patch) y
     [xdiff_file_patch()](#function.xdiff-file-patch) deben crear el resultado de
     revertir el parche de modificación desde el nuevo contenido, creando así la versión original.

# Funciones de xdiff

# xdiff_file_bdiff

(PECL xdiff &gt;= 1.5.0)

xdiff_file_bdiff — Realiza una diferencia binaria de dos archivos

### Descripción

**xdiff_file_bdiff**([string](#language.types.string) $old_file, [string](#language.types.string) $new_file, [string](#language.types.string) $dest): [bool](#language.types.boolean)

Hace una diferencia binaria de dos archivos y almacena el resultado en un archivo de revisión.
Esta función trabaja con archivos de texto y binarios. El archivo parche
resultante puede ser aplicado posteriormente utilizando [xdiff_file_bpatch()](#function.xdiff-file-bpatch)/[xdiff_string_bpatch()](#function.xdiff-string-bpatch).

### Parámetros

     old_file


       Ruta a el primer archivo. Este archivo actúa como "viejo" archivo.






     new_file


       Ruta a el segundo archivo. Este archivo actúa como "nuevo" archivo.






     dest


       Ruta de el archivo parche resultante. El archivo resultante contiene diferencias
       entre los archivos "viejo" y "nuevo". Este será en formato binario y no leible por humanos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_bdiff()**



     El siguiente código hace una diferencia binaria de dos archivos.

&lt;?php
$old_version = 'my_script_1.0.tgz';
$new_version = 'my_script_1.1.tgz';

xdiff_file_bdiff($old_version, $new_version, 'my_script.bdiff');
?&gt;

### Notas

**Nota**:

    Ambos archivos serán cargados en memoria así que asegúrese que el valor de memory_limit es
    lo suficientemente alto.

### Ver también

    - [xdiff_file_bpatch()](#function.xdiff-file-bpatch) - Parchea un archivo con una diferencia binaria

# xdiff_file_bdiff_size

(PECL xdiff &gt;= 1.5.0)

xdiff_file_bdiff_size — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria

### Descripción

**xdiff_file_bdiff_size**([string](#language.types.string) $file): [int](#language.types.integer)

Devuelve el tamaño de un archivo resultado que se creó después de aplicar el parche binario desde el archivo
file a el archivo original.

### Parámetros

     file


       La ruta al parche binario creado por la función [xdiff_string_bdiff()](#function.xdiff-string-bdiff) o
       [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff).





### Valores devueltos

Devuelve el tamaño del archivo que se creará.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_bdiff_size()**



     El siguiente código lee el tamaño de un archivo que se creará
     tras realizar una diferencia binaria.

&lt;?php
$length = xdiff_string_bdiff_size('file.bdiff');
echo "El archivo resultante tendrá $length bytes de longitud";
?&gt;

### Ver también

    - [xdiff_file_bdiff()](#function.xdiff-file-bdiff) - Realiza una diferencia binaria de dos archivos

    - [xdiff_file_rabdiff()](#function.xdiff-file-rabdiff) - Hacer una diferencia binaria de dos archivos utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

    - [xdiff_file_bpatch()](#function.xdiff-file-bpatch) - Parchea un archivo con una diferencia binaria

# xdiff_file_bpatch

(PECL xdiff &gt;= 1.5.0)

xdiff_file_bpatch — Parchea un archivo con una diferencia binaria

### Descripción

**xdiff_file_bpatch**([string](#language.types.string) $file, [string](#language.types.string) $patch, [string](#language.types.string) $dest): [bool](#language.types.boolean)

Parchea un file con un
patch binario y almacena el resultado en un archivo dest.
Esta función acepta parches creados tanto a través de la funciones [xdiff_file_bdiff()](#function.xdiff-file-bdiff)
y [xdiff_file_rabdiff()](#function.xdiff-file-rabdiff) como de sus equivalentes de cadena.

### Parámetros

     file


       El archivo original.






     patch


       El archivo parche binario.






     dest


       La ruta del archivo resultante.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 xdiff_file_bpatch()** example



     El siguiente código aplica una diferencia binaria a un archivo.

&lt;?php
$old_version = 'archive-1.0.tgz';
$patch = 'archive.bpatch';

$result = xdiff_file_bpatch($old_version, $patch, 'archive-1.1.tgz');
if ($result) {
echo "Archivo parcheado";
} else {
echo "El archivo no pudo ser parcheado";
}

?&gt;

### Notas

**Nota**:

    Ambos archivos (file y patch)
    serán cargados en memoria así que asegúrese que el valor de memory_limit es
    lo suficientemente alto.

### Ver también

    - [xdiff_file_bdiff()](#function.xdiff-file-bdiff) - Realiza una diferencia binaria de dos archivos

    - [xdiff_file_rabdiff()](#function.xdiff-file-rabdiff) - Hacer una diferencia binaria de dos archivos utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

# xdiff_file_diff

(PECL xdiff &gt;= 0.2.0)

xdiff_file_diff — Hacer un diff unificado de dos archivos

### Descripción

**xdiff_file_diff**(
    [string](#language.types.string) $old_file,
    [string](#language.types.string) $new_file,
    [string](#language.types.string) $dest,
    [int](#language.types.integer) $context = 3,
    [bool](#language.types.boolean) $minimal = **[false](#constant.false)**
): [bool](#language.types.boolean)

Hace un diff unificado que contiene las diferencias entre old_file y
new_file y almacena este en el archivo dest. El
archivo resultante es legible. Un parámetro opcional context
especifica el número de líneas de contexto que hay que añadir alrededor de cada cambio.
Establecer el parámetro minimal a true dará como resultado de salida el archivo
parche más corto posible (puede tomar algo de tiempo).

### Parámetros

     old_file


       Ruta a el primer archivo. Este archivo actúa como "viejo" archivo.






     new_file


       Ruta a el segundo archivo. Este archivo actúa como "nuevo" archivo.






     dest


       Ruta del archivo parche resultante.






     context


       Indica el número de líneas de contexto que desea incluir en el resultado
       diff.






     minimal


       Establezca este parámetro a **[true](#constant.true)** si desea reducir el tamaño del resultado
       (puede tomar algo de tiempo).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_diff()**



     El siguiente código hace un diff unificado de dos archivos php con una longitud de contexto de 2.

&lt;?php
$old_version = 'my_script.php';
$new_version = 'my_new_script.php';

xdiff_file_diff($old_version, $new_version, 'my_script.diff', 2);
?&gt;

### Notas

**Nota**:

    Esta función no funciona bien con archivos binarios. Para hacer una diferencia binaria de
    archivos utilice la [xdiff_file_bdiff()](#function.xdiff-file-bdiff)/[xdiff_file_rabdiff()](#function.xdiff-file-rabdiff).

### Ver también

    - [xdiff_file_patch()](#function.xdiff-file-patch) - Parchea un archivo con un diff unificado

# xdiff_file_diff_binary

(PECL xdiff &gt;= 0.2.0)

xdiff_file_diff_binary — Alias de [xdiff_file_bdiff()](#function.xdiff-file-bdiff)

### Descripción

**xdiff_file_diff_binary**([string](#language.types.string) $old_file, [string](#language.types.string) $new_file, [string](#language.types.string) $dest): [bool](#language.types.boolean)

Hace una diferencia binaria de dos archivos y almacena el resultado en un archivo de revisión.
Esta función trabaja con archivos de texto y binarios. El archivo parche resultante
puede ser posteriormente aplicado con [xdiff_file_bpatch()](#function.xdiff-file-bpatch).

Desde la versión 1.5.0 de esta función es un alias de [xdiff_file_bdiff()](#function.xdiff-file-bdiff).

### Parámetros

     old_file


       Ruta a el primer archivo. Este archivo actúa como "viejo" archivo.






     new_file


       Ruta a el segundo archivo. Este archivo actúa como "nuevo" archivo.






     dest


       Ruta de el archivo parche resultante. El archivo resultante contiene diferencias
       entre los archivos "viejo" y "nuevo". Este será en formato binario y no legible por humanos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_diff_binary()**



     El siguiente código hace una diferencia binaria de dos archivos.

&lt;?php
$old_version = 'my_script_1.0.tgz';
$new_version = 'my_script_1.1.tgz';

xdiff_file_diff_binary($old_version, $new_version, 'my_script.bdiff');
?&gt;

### Notas

**Nota**:

    Ambos archivos serán cargados en memoria así que asegúrese que el valor de memory_limit es
    lo suficientemente alto.

### Ver también

    - [xdiff_file_bdiff()](#function.xdiff-file-bdiff) - Realiza una diferencia binaria de dos archivos

    - [xdiff_file_bpatch()](#function.xdiff-file-bpatch) - Parchea un archivo con una diferencia binaria

# xdiff_file_merge3

(PECL xdiff &gt;= 0.2.0)

xdiff_file_merge3 — Une 3 archivos en uno

### Descripción

**xdiff_file_merge3**(
    [string](#language.types.string) $old_file,
    [string](#language.types.string) $new_file1,
    [string](#language.types.string) $new_file2,
    [string](#language.types.string) $dest
): [mixed](#language.types.mixed)

Une tres archivos en uno y almacena el resultado en un archivo dest.
El old_file es una versión original mientras new_file1
y new_file2 son versiones modificadas de un original.

### Parámetros

     old_file


       Ruta a el primer archivo. Este archivo actúa como "viejo" archivo.






     new_file1


       Ruta a el segundo archivo. Este actúa como una versión modificada de old_file.






     new_file2


       Ruta a el tercer archivo. Este actúa como una versión modificada de old_file.






     dest


       La ruta del archivo resultante, contiene la unión modificada de new_file1 y
       new_file2.





### Valores devueltos

Devuelve **[true](#constant.true)** si la unión fue satisfactoria, una cadena con fragmento erróneo si
esta no lo fue o **[false](#constant.false)** si ocurrió un error interno.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_merge3()**



     El código siguiente combina tres archivos en uno.

&lt;?php
$old_version = 'original_script.php';
$fix1 = 'script_with_fix1.php';
$fix2 = 'script_with_fix2.php';

$errors = xdiff_file_merge3($old_version, $fix1, $fix2, 'fixed_script.php');
if (is_string($errors)) {
echo "Rejects:\n";
echo $errors;
}
?&gt;

### Ver también

    - [xdiff_string_merge3()](#function.xdiff-string-merge3) - Unir tres cadenas en una

# xdiff_file_patch

(PECL xdiff &gt;= 0.2.0)

xdiff_file_patch — Parchea un archivo con un diff unificado

### Descripción

**xdiff_file_patch**(
    [string](#language.types.string) $file,
    [string](#language.types.string) $patch,
    [string](#language.types.string) $dest,
    [int](#language.types.integer) $flags = DIFF_PATCH_NORMAL
): [mixed](#language.types.mixed)

Parchea un file con un patch y almacena el resultado en un archivo.
patch tiene que ser un diff unificado creado por la función
[xdiff_file_diff()](#function.xdiff-file-diff)/[xdiff_string_diff()](#function.xdiff-string-diff).
Un parámetro opcional flags especifica el modo de operación.

### Parámetros

     file


       El archivo original.






     patch


       El archivo de revisión unificado. Este tiene que ser creado con las funciones [xdiff_string_diff()](#function.xdiff-string-diff),
       [xdiff_file_diff()](#function.xdiff-file-diff) o herramientas compatibles.






     dest


       Ruta de el archivo resultante.






     flags


       Puede ser **[XDIFF_PATCH_NORMAL](#constant.xdiff-patch-normal)** (modo por defecto,
       parche normal) o **[XDIFF_PATCH_REVERSE](#constant.xdiff-patch-reverse)** (parche
       invertido).




       A partir de la versión 1.5.0, también puede utilizar binario OR para habilitar el indicador
       **[XDIFF_PATCH_IGNORESPACE](#constant.xdiff-patch-ignorespace)**.





### Valores devueltos

Devuelve **[false](#constant.false)** si ocurrió un error interno, una cadena con fragmento erróneo
si el parche no pudo ser aplicado o **[true](#constant.true)** si el parche fue aplicado con éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_patch()**



     El siguiente código aplica un diff unificado a un archivo.

&lt;?php
$old_version = 'my_script-1.0.php';
$patch = 'my_script.patch';

$errors = xdiff_file_patch($old_version, $patch, 'my_script-1.1.php');
if (is_string($errors)) {
echo "Rejects:\n";
echo $errors;
}

?&gt;

    **Ejemplo #2 Ejemplo de parche invertido**



     El código siguiente invierte un parche.

&lt;?php
$new_version = 'my_script-1.1.php';
$patch = 'my_script.patch';

$errors = xdiff_file_patch($new_version, $patch, 'my_script-1.0.php', XDIFF_PATCH_REVERSE);
if (is_string($errors)) {
echo "Fragmentos erróneos:\n";
echo $errors;
}

?&gt;

### Ver también

    - [xdiff_file_diff()](#function.xdiff-file-diff) - Hacer un diff unificado de dos archivos

# xdiff_file_patch_binary

(PECL xdiff &gt;= 0.2.0)

xdiff_file_patch_binary — Alias de [xdiff_file_bpatch()](#function.xdiff-file-bpatch)

### Descripción

**xdiff_file_patch_binary**([string](#language.types.string) $file, [string](#language.types.string) $patch, [string](#language.types.string) $dest): [bool](#language.types.boolean)

Parchea un file con un
patch binario y almacena el resultado en un archivo dest.
Esta función acepta parches creados tanto a través de funciones [xdiff_file_bdiff()](#function.xdiff-file-bdiff)
o [xdiff_file_rabdiff()](#function.xdiff-file-rabdiff) como de sus equivalentes de cadena.

Desde la versión 1.5.0 esta función es un alias de [xdiff_file_bpatch()](#function.xdiff-file-bpatch).

### Parámetros

     file


       El archivo original.






     patch


       El archivo parche binario.






     dest


       La ruta de el archivo resultante.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_patch_binary()**



     El siguiente código aplica una diferencia binaria a un archivo.

&lt;?php
$old_version = 'archive-1.0.tgz';
$patch = 'archive.bpatch';

$result = xdiff_file_patch_binary($old_version, $patch, 'archive-1.1.tgz');
if ($result) {
echo "Archivo parcheado";
} else {
echo "El archivo no pudo ser parcheado";
}

?&gt;

### Notas

**Nota**:

    Ambos archivos (file y patch)
    serán cargados en memoria así que asegúrese que el valor de memory_limit es
    lo suficientemente alto.

### Ver también

    - [xdiff_string_patch_binary()](#function.xdiff-string-patch-binary) - Alias de xdiff_string_bpatch

# xdiff_file_rabdiff

(PECL xdiff &gt;= 1.5.0)

xdiff_file_rabdiff — Hacer una diferencia binaria de dos archivos utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

### Descripción

**xdiff_file_rabdiff**([string](#language.types.string) $old_file, [string](#language.types.string) $new_file, [string](#language.types.string) $dest): [bool](#language.types.boolean)

Hace una diferencia binaria de dos archivos y almacena el resultado en un archivo de revisión.
La diferencia entre esta función y [xdiff_file_bdiff()](#function.xdiff-file-bdiff) es el diferente
algoritmo que se utiliza que debería traducirse en una ejecución más rápida y un diff producido menor.
Esta función trabaja con archivos de texto y binarios. El archivo parche resultante
puede ser posteriormente aplicado utilizando [xdiff_file_bpatch()](#function.xdiff-file-bpatch)/[xdiff_string_bpatch()](#function.xdiff-string-bpatch).

Para obtener más información sobre las diferencias entre el algoritmo utilizado por favor vea
el sitio web [» libxdiff](http://www.xmailserver.org/xdiff-lib.html)

### Parámetros

     old_file


       Ruta a el primer archivo. Este archivo actúa como "viejo" archivo.






     new_file


       Ruta a el segundo archivo. Este archivo actúa como "nuevo" archivo.






     dest


       Ruta de el archivo parche resultante. El archivo resultante contiene diferencias
       entre  los archivos "viejo" y "nuevo". Este será en formato binario y no legible por humanos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_file_rabdiff()**



     El siguiente código hace una diferencia binaria de dos archivos.

&lt;?php
$old_version = 'my_script_1.0.tgz';
$new_version = 'my_script_1.1.tgz';

xdiff_file_rabdiff($old_version, $new_version, 'my_script.bdiff');
?&gt;

### Notas

**Nota**:

    Ambos archivos serán cargados en memoria así que asegúrese que el valor de memory_limit es
    lo suficientemente alto.

### Ver también

    - [xdiff_file_bpatch()](#function.xdiff-file-bpatch) - Parchea un archivo con una diferencia binaria

# xdiff_string_bdiff

(PECL xdiff &gt;= 1.5.0)

xdiff_string_bdiff — Hacer una diferencia binaria de dos cadenas

### Descripción

**xdiff_string_bdiff**([string](#language.types.string) $old_data, [string](#language.types.string) $new_data): [string](#language.types.string)

Hace una diferencia binaria de dos cadenas y devuelve el resultado.
Esta función trabaja con texto y datos binarios. El parche resultante
puede ser posteriormente aplicado utilizando [xdiff_string_bpatch()](#function.xdiff-string-bpatch)/[xdiff_file_bpatch()](#function.xdiff-file-bpatch).

### Parámetros

     old_data


       Primera cadena con información binaria. Esta actúa como "vieja" información.






     new_data


       Segunda cadena con información binaria. Esta actúa como "nueva" información.





### Valores devueltos

Devuelve la cadena con la diferencia binaria conteniendo las diferencias entre "vieja" y "nueva"
información o **[false](#constant.false)** si se producido un error interno.

### Ver también

    - [xdiff_string_bpatch()](#function.xdiff-string-bpatch) - Parchear una cadena con una diferencia binaria

# xdiff_string_bdiff_size

(PECL xdiff &gt;= 1.5.0)

xdiff_string_bdiff_size — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria

### Descripción

**xdiff_string_bdiff_size**([string](#language.types.string) $patch): [int](#language.types.integer)

Devuelve el tamaño de un archivo resultante que será creado tras aplicar el patch binario a
el archivo original.

### Parámetros

     patch


       El parche binario creado por la función [xdiff_string_bdiff()](#function.xdiff-string-bdiff) o
       [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff).





### Valores devueltos

Devuelve el tamaño del archivo que fue creado.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_string_bdiff_size()**



     El siguiente código lee el tamaño de un archivo que fue creado
     tras aplicar una diferencia binaria.

&lt;?php
$binary_patch = file_get_contents('file.bdiff');
$length = xdiff_string_bdiff_size($binary_patch);
echo "El archivo resultante tendrá $length bytes de longitud";
?&gt;

### Ver también

    - [xdiff_string_bdiff()](#function.xdiff-string-bdiff) - Hacer una diferencia binaria de dos cadenas

    - [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff) - Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

    - [xdiff_string_bpatch()](#function.xdiff-string-bpatch) - Parchear una cadena con una diferencia binaria

# xdiff_string_bpatch

(PECL xdiff &gt;= 1.5.0)

xdiff_string_bpatch — Parchear una cadena con una diferencia binaria

### Descripción

**xdiff_string_bpatch**([string](#language.types.string) $str, [string](#language.types.string) $patch): [string](#language.types.string)

Parchea una cadena str con un patch binario.
Esta función acepta parches creados tanto a través de las funciones [xdiff_string_bdiff()](#function.xdiff-string-bdiff)
y [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff) o su archivo homólogo equivalente.

### Parámetros

     str


       La cadena binaria original.






     patch


       La cadena parche binaria.





### Valores devueltos

Devuelve la cadena parcheada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [xdiff_string_bdiff()](#function.xdiff-string-bdiff) - Hacer una diferencia binaria de dos cadenas

    - [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff) - Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

# xdiff_string_diff

(PECL xdiff &gt;= 0.2.0)

xdiff_string_diff — Hacer un diff unificado de dos strings

### Descripción

**xdiff_string_diff**(
    [string](#language.types.string) $old_data,
    [string](#language.types.string) $new_data,
    [int](#language.types.integer) $context = 3,
    [bool](#language.types.boolean) $minimal = **[false](#constant.false)**
): [string](#language.types.string)

Hace un diff unificado que contiene diferencias entre el string old_data y
el string new_data y devuelve este. El diff resultante es legible.
Un parámetro opcional context especifica el número de líneas de contexto que hay que añadir
alrededor de cada cambio. Establecer el parámetro minimal
a true dará como resultado de salida el archivo parche más corto posible (puede tomar algo de tiempo).

### Parámetros

     old_data


       Primera cadena con información. Esta actúa como "vieja" información.






     new_data


       Segundo string con información. Esta actúa como "nueva" información.






     context


       Indica el número de líneas de contexto que desea incluir en el diff
       resultado.






     minimal


       Establezca este parámetro a **[true](#constant.true)** si desea reducir el tamaño del
       resultado (puede tomar algo de tiempo).





### Valores devueltos

Devuelve un string con el resultado diff o **[false](#constant.false)** si ocurriera un error interno.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_string_diff()**



     El siguiente código hace un diff unificado de dos artículos.

&lt;?php
$old_article = file_get_contents('./old_article.txt');
$new_article = $\_REQUEST['article']; /_ Supongamos que alguien pega un nuevo artículo en formato html _/

$diff = xdiff_string_diff($old_article, $new_article, 1);
if (is_string($diff)) {
echo "Diferencias entre los dos artículos:\n";
echo $diff;
}

?&gt;

### Notas

**Nota**:

    Esta función no funciona bien con string binarios. Para hacer un diff de string binario
    utilice [xdiff_string_bdiff()](#function.xdiff-string-bdiff)/[xdiff_string_rabdiff()](#function.xdiff-string-rabdiff).

### Ver también

    - [xdiff_string_patch()](#function.xdiff-string-patch) - Parchear una cadena con un diff unificado

# xdiff_string_diff_binary

(PECL xdiff &gt;= 0.2.0)

xdiff_string_diff_binary — Alias de [xdiff_string_bdiff()](#function.xdiff-string-bdiff)

### Descripción

[xdiff_string_bdiff](#function.xdiff-string-bdiff)([string](#language.types.string) $old_data, [string](#language.types.string) $new_data): [string](#language.types.string)

Hace una diferencia binaria de dos cadenas y devuelve el resultado.
Esta función trabaja con texto y datos binarios. El parche resultante
puede ser posteriormente aplicado utilizando [xdiff_string_bpatch()](#function.xdiff-string-bpatch)/[xdiff_file_bpatch()](#function.xdiff-file-bpatch).

Desde la versión 1.5.0 esta función es un alias de [xdiff_string_bdiff()](#function.xdiff-string-bdiff).

### Parámetros

     old_data


       Primera cadena con información binaria. Esta actúa como "vieja" información.






     new_data


       Segunda cadena con información binaria. Esta actúa como "nueva" información.





### Valores devueltos

Devuelve cadena con resultado o **[false](#constant.false)** si se produce un error interno.

### Ver también

    - [xdiff_string_bdiff()](#function.xdiff-string-bdiff) - Hacer una diferencia binaria de dos cadenas

    - [xdiff_string_bpatch()](#function.xdiff-string-bpatch) - Parchear una cadena con una diferencia binaria

# xdiff_string_merge3

(PECL xdiff &gt;= 0.2.0)

xdiff_string_merge3 — Unir tres cadenas en una

### Descripción

**xdiff_string_merge3**(
    [string](#language.types.string) $old_data,
    [string](#language.types.string) $new_data1,
    [string](#language.types.string) $new_data2,
    [string](#language.types.string) &amp;$error = ?
): [mixed](#language.types.mixed)

Une tres cadenas en una y devuelve el resultado.
El parámetro old_data es una versión original de los datos
mientras new_data1 y new_data2 son versiones
modificadas de un original. El parámetro opcional error es utilizado para admitir cualquier
fragmento erróneo durante el proceso de unión.

### Parámetros

     old_data


       Primera cadena con información. Esta actúa como "vieja" información.






     new_data1


       Segunda cadena con información. Esta actúa como versión modificada del old_data.






     new_data2


       La tercera cadena con información. Esta actúa como versión modificada del old_data.






     error


       Si se produce algún fragmento erróneo entonces se almacenan dentro de esta variable.





### Valores devueltos

Devuelve la cadena unida, **[false](#constant.false)** si se produce un error interno, o **[true](#constant.true)**
si la cadena unida está vacía.

### Ver también

    - [xdiff_file_merge3()](#function.xdiff-file-merge3) - Une 3 archivos en uno

# xdiff_string_patch

(PECL xdiff &gt;= 0.2.0)

xdiff_string_patch — Parchear una cadena con un diff unificado

### Descripción

**xdiff_string_patch**(
    [string](#language.types.string) $str,
    [string](#language.types.string) $patch,
    [int](#language.types.integer) $flags = ?,
    [string](#language.types.string) &amp;$error = ?
): [string](#language.types.string)

Parchea una cadena str con un parche unificado en parámetro patch
y devuelve el resultado. patch tiene que ser un diff unificado creado por la función
[xdiff_file_diff()](#function.xdiff-file-diff)/[xdiff_string_diff()](#function.xdiff-string-diff).
Un parámetro opcional flags especifica el modo de operación. Cualquier
fragmento erróneo del parche será almacenado en el interior de la variable error si
si esta es proporcionada.

### Parámetros

     str


       La cadena original.






     patch


       La cadena parche unificada. Esta tiene que ser creada utilizando las funciones [xdiff_string_diff()](#function.xdiff-string-diff),
       [xdiff_file_diff()](#function.xdiff-file-diff) o herramientas compatibles.






     flags


       flags uede ser
       **[XDIFF_PATCH_NORMAL](#constant.xdiff-patch-normal)** (modo por defecto, parche normal)
       o **[XDIFF_PATCH_REVERSE](#constant.xdiff-patch-reverse)** (parche invertido).




       A partir de la versión 1.5.0, también se puede utilizar binario OR para habilitar el indicador
       **[XDIFF_PATCH_IGNORESPACE](#constant.xdiff-patch-ignorespace)**.






     error


       Si se proporciona entonces los fragmentos erróneos se almacenan dentro de esta variable.





### Valores devueltos

Devuelve la cadena parcheada, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de xdiff_string_patch()**



     El siguiente código aplica cambios en algún artículo.

&lt;?php
$old_article = file_get_contents('./old_article.txt');
$diff = $\_SERVER['patch']; /_ Supongamos que alguien pega un parche para un formulario html _/

$errors = '';

$new_article = xdiff_string_patch($old_article, $diff, XDIFF_PATCH_NORMAL, $errors);
if (is_string($new_article)) {
echo "Nuevo artículo:\n";
echo $new_article;
}

if (strlen($errors)) {
echo "Fragmentos erróneos: \n";
echo $errors;
}

?&gt;

### Ver también

    - [xdiff_string_diff()](#function.xdiff-string-diff) - Hacer un diff unificado de dos strings

# xdiff_string_patch_binary

(PECL xdiff &gt;= 0.2.0)

xdiff_string_patch_binary — Alias de [xdiff_string_bpatch()](#function.xdiff-string-bpatch)

### Descripción

**xdiff_string_patch_binary**([string](#language.types.string) $str, [string](#language.types.string) $patch): [string](#language.types.string)

Parchea una cadena str con un patch binario.
Esta función acepta parches creados tanto a través de las funciones [xdiff_string_bdiff()](#function.xdiff-string-bdiff)
y [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff) o de su archivo homólogo equivalente.

Desde la versión 1.5.0 esta función es un alias de [xdiff_string_bpatch()](#function.xdiff-string-bpatch).

### Parámetros

     str


       La cadena binaria original.






     patch


       La cadena parche binaria.





### Valores devueltos

Devuelve la cadena parcheada, o **[false](#constant.false)** en caso de error.

### Ver también

    - [xdiff_string_bpatch()](#function.xdiff-string-bpatch) - Parchear una cadena con una diferencia binaria

    - [xdiff_string_bdiff()](#function.xdiff-string-bdiff) - Hacer una diferencia binaria de dos cadenas

    - [xdiff_string_rabdiff()](#function.xdiff-string-rabdiff) - Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

# xdiff_string_rabdiff

(PECL xdiff &gt;= 1.5.0)

xdiff_string_rabdiff — Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

### Descripción

[xdiff_string_bdiff](#function.xdiff-string-bdiff)([string](#language.types.string) $old_data, [string](#language.types.string) $new_data): [string](#language.types.string)

Hace una diferencia binaria de dos cadenas y almacena el resultado.
La diferencia entre esta función y [xdiff_string_bdiff()](#function.xdiff-string-bdiff) es el diferente
algoritmo que se utiliza que debería traducirse en una ejecución más rápida y un diff producido menor.
Esta función trabaja con archivos de texto y binarios. El archivo parche resultante
puede ser posteriormente aplicado utilizando [xdiff_string_bpatch()](#function.xdiff-string-bpatch)/[xdiff_file_bpatch()](#function.xdiff-file-bpatch).

Para obtener más información sobre las diferencias entre el algoritmo utilizado por favor vea
el sitio web [» libxdiff](http://www.xmailserver.org/xdiff-lib.html)

### Parámetros

     old_data


       Primera cadena con información binaria. Esta actúa como "vieja" información.






     new_data


       Segunda cadena con información binaria. Esta actúa como "nueva" información.





### Valores devueltos

Devuelve la cadena con la diferencia binaria conteniendo las diferencias entre "vieja" y "nueva"
información o **[false](#constant.false)** si se ha producido un error interno.

### Ver también

    - [xdiff_string_bpatch()](#function.xdiff-string-bpatch) - Parchear una cadena con una diferencia binaria

## Tabla de contenidos

- [xdiff_file_bdiff](#function.xdiff-file-bdiff) — Realiza una diferencia binaria de dos archivos
- [xdiff_file_bdiff_size](#function.xdiff-file-bdiff-size) — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria
- [xdiff_file_bpatch](#function.xdiff-file-bpatch) — Parchea un archivo con una diferencia binaria
- [xdiff_file_diff](#function.xdiff-file-diff) — Hacer un diff unificado de dos archivos
- [xdiff_file_diff_binary](#function.xdiff-file-diff-binary) — Alias de xdiff_file_bdiff
- [xdiff_file_merge3](#function.xdiff-file-merge3) — Une 3 archivos en uno
- [xdiff_file_patch](#function.xdiff-file-patch) — Parchea un archivo con un diff unificado
- [xdiff_file_patch_binary](#function.xdiff-file-patch-binary) — Alias de xdiff_file_bpatch
- [xdiff_file_rabdiff](#function.xdiff-file-rabdiff) — Hacer una diferencia binaria de dos archivos utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin
- [xdiff_string_bdiff](#function.xdiff-string-bdiff) — Hacer una diferencia binaria de dos cadenas
- [xdiff_string_bdiff_size](#function.xdiff-string-bdiff-size) — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria
- [xdiff_string_bpatch](#function.xdiff-string-bpatch) — Parchear una cadena con una diferencia binaria
- [xdiff_string_diff](#function.xdiff-string-diff) — Hacer un diff unificado de dos strings
- [xdiff_string_diff_binary](#function.xdiff-string-diff-binary) — Alias de xdiff_string_bdiff
- [xdiff_string_merge3](#function.xdiff-string-merge3) — Unir tres cadenas en una
- [xdiff_string_patch](#function.xdiff-string-patch) — Parchear una cadena con un diff unificado
- [xdiff_string_patch_binary](#function.xdiff-string-patch-binary) — Alias de xdiff_string_bpatch
- [xdiff_string_rabdiff](#function.xdiff-string-rabdiff) — Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin

- [Introducción](#intro.xdiff)
- [Instalación/Configuración](#xdiff.setup)<li>[Requerimientos](#xdiff.requirements)
- [Instalación](#xdiff.installation)
  </li>- [Constantes predefinidas](#xdiff.constants)
- [Funciones de xdiff](#ref.xdiff)<li>[xdiff_file_bdiff](#function.xdiff-file-bdiff) — Realiza una diferencia binaria de dos archivos
- [xdiff_file_bdiff_size](#function.xdiff-file-bdiff-size) — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria
- [xdiff_file_bpatch](#function.xdiff-file-bpatch) — Parchea un archivo con una diferencia binaria
- [xdiff_file_diff](#function.xdiff-file-diff) — Hacer un diff unificado de dos archivos
- [xdiff_file_diff_binary](#function.xdiff-file-diff-binary) — Alias de xdiff_file_bdiff
- [xdiff_file_merge3](#function.xdiff-file-merge3) — Une 3 archivos en uno
- [xdiff_file_patch](#function.xdiff-file-patch) — Parchea un archivo con un diff unificado
- [xdiff_file_patch_binary](#function.xdiff-file-patch-binary) — Alias de xdiff_file_bpatch
- [xdiff_file_rabdiff](#function.xdiff-file-rabdiff) — Hacer una diferencia binaria de dos archivos utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin
- [xdiff_string_bdiff](#function.xdiff-string-bdiff) — Hacer una diferencia binaria de dos cadenas
- [xdiff_string_bdiff_size](#function.xdiff-string-bdiff-size) — Lee el tamaño de un archivo creado tras aplicar una diferencia binaria
- [xdiff_string_bpatch](#function.xdiff-string-bpatch) — Parchear una cadena con una diferencia binaria
- [xdiff_string_diff](#function.xdiff-string-diff) — Hacer un diff unificado de dos strings
- [xdiff_string_diff_binary](#function.xdiff-string-diff-binary) — Alias de xdiff_string_bdiff
- [xdiff_string_merge3](#function.xdiff-string-merge3) — Unir tres cadenas en una
- [xdiff_string_patch](#function.xdiff-string-patch) — Parchear una cadena con un diff unificado
- [xdiff_string_patch_binary](#function.xdiff-string-patch-binary) — Alias de xdiff_string_bpatch
- [xdiff_string_rabdiff](#function.xdiff-string-rabdiff) — Hacer una diferencia binaria de dos cadenas utilizando el algoritmo polinomial de huella digital (fingerprinting) de Rabin
  </li>
