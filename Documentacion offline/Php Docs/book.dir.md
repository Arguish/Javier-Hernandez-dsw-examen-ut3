# Directorios

# Constantes predefinidas

    **[DIRECTORY_SEPARATOR](#constant.directory-separator)**
     ([string](#language.types.string))









    **[PATH_SEPARATOR](#constant.path-separator)**
     ([string](#language.types.string))



     Punto y coma en Windows, en caso contrario dos puntos.





    **[SCANDIR_SORT_ASCENDING](#constant.scandir-sort-ascending)**
     ([int](#language.types.integer))



     Disponible desde PHP 5.4.0.





    **[SCANDIR_SORT_DESCENDING](#constant.scandir-sort-descending)**
     ([int](#language.types.integer))



     Disponible desde PHP 5.4.0.





    **[SCANDIR_SORT_NONE](#constant.scandir-sort-none)**
     ([int](#language.types.integer))



     Disponible desde PHP 5.4.0.

# La clase Directory

(PHP 4, PHP 5, PHP 7, PHP 8)

## Introducción

    Las instancias de la clase **Directory**
    se crean llamando a la función [dir()](#function.dir),
    sin utilizar el operador [new](#language.oop5.basic.new).

## Sinopsis de la Clase

     class **Directory**
     {

    /* Propiedades */

     public
     readonly
     [string](#language.types.string)
      [$path](#directory.props.path);

    public
     readonly
     [resource](#language.types.resource)
      [$handle](#directory.props.handle);


    /* Métodos */

public [close](#directory.close)(): [void](language.types.void.html)
public [read](#directory.read)(): [string](#language.types.string)|[false](#language.types.singleton)
public [rewind](#directory.rewind)(): [void](language.types.void.html)

}

## Propiedades

     path


       El directorio a abrir.






     handle


       Puede ser utilizado con otras funciones relativas a
       directorios, como [readdir()](#function.readdir),
       [rewinddir()](#function.rewinddir) y
       [closedir()](#function.closedir).





## Historial de cambios

       Versión
       Descripción






       8.1.0

        Las propiedades path y
        handle son ahora de solo lectura.





# Directory::close

(PHP 4, PHP 5, PHP 7, PHP 8)

Directory::close — Cierra el manejador de directorio

### Descripción

public **Directory::close**(): [void](language.types.void.html)

### Historial de cambios

      Versión
      Descripción






      8.0.0

       No se acepta ningún argumento. Anteriormente, un manejador de directorio podía ser pasado como argumento.



# Directory::read

(PHP 4, PHP 5, PHP 7, PHP 8)

Directory::read — Lee una entrada desde el manejador de directorio

### Descripción

public **Directory::read**(): [string](#language.types.string)|[false](#language.types.singleton)

### Historial de cambios

      Versión
      Descripción






      8.0.0

       No se acepta ningún argumento. Anteriormente, un manejador de directorio podía ser pasado como argumento.



# Directory::rewind

(PHP 4, PHP 5, PHP 7, PHP 8)

Directory::rewind — Reinicia el manejador de directorio

### Descripción

public **Directory::rewind**(): [void](language.types.void.html)

### Historial de cambios

      Versión
      Descripción






      8.0.0

       No se acepta ningún argumento. Anteriormente, un manejador de directorio podía ser pasado como argumento.



## Tabla de contenidos

- [Directory::close](#directory.close) — Cierra el manejador de directorio
- [Directory::read](#directory.read) — Lee una entrada desde el manejador de directorio
- [Directory::rewind](#directory.rewind) — Reinicia el manejador de directorio

# Funciones de directorio

# Ver también

Para funciones relacionadas, como [dirname()](#function.dirname),
[is_dir()](#function.is-dir), [mkdir()](#function.mkdir), y
[rmdir()](#function.rmdir), visita
[Filesystem](#ref.filesystem) sección.

# chdir

(PHP 4, PHP 5, PHP 7, PHP 8)

chdir — Cambia de directorio

### Descripción

**chdir**([string](#language.types.string) $directory): [bool](#language.types.boolean)

Cambia el directorio actual de PHP a
directorio.

### Parámetros

     directorio


       El nuevo directorio actual.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** en caso de error.

### Ejemplos

    **Ejemplo #1 chdir()** ejemplo

&lt;?php

// directorio actual
echo getcwd() . "\n";

chdir('public_html');

// directorio actual
echo getcwd() . "\n";

?&gt;

    Resultado del ejemplo anterior es similar a:

/home/vincent
/home/vincent/public_html

### Notas

**Precaución**

    Si el intérprete de PHP ha sido compilado con ZTS (Seguridad de Hilos Zend) habilitada,
    cualquier cambio en el directorio actual realizado mediante **chdir()**
    será invisible para el sistema operativo. Todas las funciones integradas de PHP
    seguirán respetando el cambio en el directorio actual; pero las funciones de bibliotecas externas
    llamadas mediante [FFI](#book.ffi) no lo harán. Puedes
    saber si la copia de PHP fue compilada con ZTS habilitada usando
    **php -i** o la constante incorporada
    **[PHP_ZTS](#constant.php-zts)**.

### Ver también

    - [getcwd()](#function.getcwd) - Devuelve el directorio de trabajo actual

# chroot

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

chroot — Cambia el directorio raíz

### Descripción

**chroot**([string](#language.types.string) $directory): [bool](#language.types.boolean)

**chroot()** cambia la raíz del script en curso,
y la reemplaza por directory, luego cambia el directorio
de trabajo actual a "/".

Esta función solo está disponible en sistemas GNU y BSD y cuando se utiliza
la SAPI CLI, CGI o Embed. Además, esta función requiere privilegios de administrador.

Llamar a esta función no modifica los valores de las constantes mágicas
**DIR** y **FILE**.

### Parámetros

     directory


       El directorio al cual cambiar la raíz.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con chroot()**

&lt;?php
chroot("/path/to/your/chroot/");
echo getcwd();
?&gt;

    El ejemplo anterior mostrará:

/

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

**Nota**:
Esta función no está disponible en los intérpretes PHP compilados con
ZTS (Zend Thread Safety) activado. Para verificar si su copia de PHP ha sido
compilada con ZTS activado, utilice **php -i** o pruebe la
constante incluida **[PHP_ZTS](#constant.php-zts)**.

# closedir

(PHP 4, PHP 5, PHP 7, PHP 8)

closedir — Cierra el puntero al directorio

### Descripción

**closedir**([?](#language.types.null)[resource](#language.types.resource) $dir_handle = **[null](#constant.null)**): [void](language.types.void.html)

**closedir()** cierra el puntero al directorio
dir_handle. El directorio debe haber sido abierto previamente con
[opendir()](#function.opendir).

### Parámetros

     dir_handle


       La recurso de directorio abierta previamente con
       [opendir()](#function.opendir).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con closedir()**

&lt;?php
$dir = "/etc/php5/";

// Apertura de un directorio conocido, lectura del directorio y asignación a
// una variable, posteriormente cierre del directorio
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $directory = readdir($dh);
closedir($dh);
}
}
?&gt;

# dir

(PHP 4, PHP 5, PHP 7, PHP 8)

dir — Devuelve una instancia de la clase Directory

### Descripción

**dir**([string](#language.types.string) $directory, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [Directory](#class.directory)|[false](#language.types.singleton)

Un mecanismo pseudo-objeto permite la lectura de un directorio.
El argumento directory es abierto.

### Parámetros

    directory


      El directorio a abrir






    context

     Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Devuelve una instancia de la clase [Directory](#class.directory)
en caso de éxito, o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con dir()**



     Observe cómo se verifica el valor de retorno de [Directory::read()](#directory.read)
     en el siguiente ejemplo. Se comprueba si el valor es
     idéntico (igual y del mismo tipo que -- véase [operadores de comparación](#language.operators.comparison)
     para más detalles) **[false](#constant.false)** de lo contrario, cualquier entrada en el nombre se evaluaría
     a **[false](#constant.false)** causaría la interrupción del ciclo.

&lt;?php
$d = dir("/etc/php5");
echo "Manejador : " . $d-&gt;handle . "\n";
echo "Ruta : " . $d-&gt;path . "\n";
while (false !== ($entry = $d-&gt;read())) {
   echo $entry."\n";
}
$d-&gt;close();
?&gt;

    Resultado del ejemplo anterior es similar a:

Manejador : Resource id #2
Ruta : /etc/php5
.
..
apache
cgi
cli

### Notas

**Nota**:

    El orden en el que las entradas del directorio son devueltas con el
    método read depende del sistema.

# getcwd

(PHP 4, PHP 5, PHP 7, PHP 8)

getcwd — Devuelve el directorio de trabajo actual

### Descripción

**getcwd**(): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el directorio de trabajo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el directorio de trabajo actual en caso de éxito o **[false](#constant.false)** en caso
de fallo.

En algunas versiones de Unix, **getcwd()**
puede devolver **[false](#constant.false)** si todos los directorios padres no tienen
el modo escritura o el modo búsqueda definido, incluso si el directorio
actual los tiene. Ver la función [chmod()](#function.chmod) para más información
sobre los modos de permisos.

### Ejemplos

    **Ejemplo #1 Ejemplo con getcwd()**




&lt;?php

// directorio actual
echo getcwd() . "\n";

chdir('cvs');

// directorio actual
echo getcwd() . "\n";

?&gt;

     Resultado del ejemplo anterior es similar a:




/home/didou
/home/didou/cvs

### Notas

**Precaución**

    Si el intérprete PHP ha sido compilado con ZTS activado (Zend Thread Safety),
    el directorio de trabajo actual, devuelto por la función
    **getcwd()** puede ser diferente del devuelto por
    las interfaces del sistema. Las bibliotecas externas (llamadas a través
    de [FFI](#book.ffi)), que dependen del directorio
    de trabajo actual, se verán afectadas.

### Ver también

    - [chdir()](#function.chdir) - Cambia de directorio

    - [chmod()](#function.chmod) - Cambia el modo del fichero

# opendir

(PHP 4, PHP 5, PHP 7, PHP 8)

opendir —
Abre un directorio y recupera un puntero sobre él

### Descripción

**opendir**([string](#language.types.string) $directory, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [resource](#language.types.resource)|[false](#language.types.singleton)

**opendir()** devuelve un puntero sobre un directorio
que puede ser utilizado con las funciones
[closedir()](#function.closedir), [readdir()](#function.readdir)
y [rewinddir()](#function.rewinddir).

### Parámetros

     directory


       La ruta del directorio a abrir






     context


       Para la descripción del parámetro context,
       consúltese la [sección de flujos](#ref.stream) del manual.





### Valores devueltos

Devuelve el [resource](#language.types.resource) de directorio en caso de éxito,
o **[false](#constant.false)** si ocurre un error

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

Esto puede ocurrir si directory no es un directorio
válido, el directorio no puede ser abierto por problemas de permisos,
o debido a errores relacionados con el sistema de archivos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con opendir()**

&lt;?php
$dir = "/tmp/php5";

// Abre un directorio conocido y lista todos los ficheros
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "fichero : $file : tipo : " . filetype($dir . $file) . "\n";
        }
        closedir($dh);
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

fichero : . : tipo : dir
fichero : .. : tipo : dir
fichero : apache : tipo : dir
fichero : cgi : tipo : dir
fichero : cli : tipo : dir

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [readdir()](#function.readdir) - Lee una entrada del directorio

    - [dir()](#function.dir) - Devuelve una instancia de la clase Directory

# readdir

(PHP 4, PHP 5, PHP 7, PHP 8)

readdir — Lee una entrada del directorio

### Descripción

**readdir**([?](#language.types.null)[resource](#language.types.resource) $dir_handle = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**readdir()** devuelve el nombre de la próxima entrada
del directorio identificado por dir_handle.
Las entradas se devuelven en el orden en que están registradas
en el sistema de archivos.

### Parámetros

     dir_handle


       El recurso de directorio abierto previamente con
       [opendir()](#function.opendir). Si el recurso de directorio
       no está especificado, se utilizará el último recurso abierto con la función
       [opendir()](#function.opendir).





### Valores devueltos

Devuelve el nombre de la entrada en caso de éxito, o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dir_handle ahora es nullable.



### Ejemplos

    **Ejemplo #1 Lista de todas las entradas de un directorio**



     Observe cómo se verifica el valor de retorno de [dir()](#function.dir)
     en el siguiente ejemplo. Se comprueba si el valor es idéntico (igual y del mismo tipo -- véase [operadores de comparación](#language.operators.comparison)
     para más detalles) **[false](#constant.false)** de lo contrario, cualquier entrada en el nombre se evaluaría
     como **[false](#constant.false)** causaría el fin del ciclo (ejemplo, un directorio llamado 0).

&lt;?php

if ($handle = opendir('/ruta/al/directorio')) {
echo "Controlador del directorio: $handle\n";
echo "Entradas:\n";

    /* Esta es la forma correcta de recorrer un directorio. */
    while (false !== ($entry = readdir($handle))) {
        echo "$entry\n";
    }

    /* Esta es la FORMA INCORRECTA de recorrer un directorio. */
    while ($entry = readdir($handle)) {
        echo "$entry\n";
    }

    closedir($handle);

}
?&gt;

    **Ejemplo #2
     Lista todas las entradas del directorio actual y elimina los
     . y ..
    **

&lt;?php
if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." &amp;&amp; $entry != "..") {
            echo "$entry\n";
}
}
closedir($handle);
}
?&gt;

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [glob()](#function.glob) - Búsqueda de rutas que coinciden con un patrón

    - [opendir()](#function.opendir) - Abre un directorio y recupera un puntero sobre él

    - [scandir()](#function.scandir) - Lista los ficheros y directorios en un directorio

# rewinddir

(PHP 4, PHP 5, PHP 7, PHP 8)

rewinddir — Retorna al primer elemento del directorio

### Descripción

**rewinddir**([?](#language.types.null)[resource](#language.types.resource) $dir_handle = **[null](#constant.null)**): [void](language.types.void.html)

**rewinddir()** retorna al primer
elemento del directorio identificado por dir_handle.

### Parámetros

     dir_handle


       El [resource](#language.types.resource) de directorio abierto previamente con
       [opendir()](#function.opendir). Si no se proporciona el recurso de directorio,
       se utilizará el último recurso abierto con la función
       [opendir()](#function.opendir).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora es nulo.



# scandir

(PHP 5, PHP 7, PHP 8)

scandir —
Lista los ficheros y directorios en un directorio

### Descripción

**scandir**([string](#language.types.string) $directory, [int](#language.types.integer) $sorting_order = **[SCANDIR_SORT_ASCENDING](#constant.scandir-sort-ascending)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array de ficheros y directorios, provenientes de directory.

### Parámetros

     directory


       El directorio que será analizado.






     sorting_order


       Por omisión, el orden es alfabético ascendente. Si el parámetro
       opcional sorting_order es definido a
       **[SCANDIR_SORT_DESCENDING](#constant.scandir-sort-descending)**, entonces el orden será
       alfabético descendente. Si este parámetro es definido a
       **[SCANDIR_SORT_NONE](#constant.scandir-sort-none)**, entonces el resultado no será
       ordenado.






     context


       Para una descripción del parámetro context,
       consulte la [sección flujo de datos](#ref.stream)
       del manual.





### Valores devueltos

Devuelve un array de ficheros en caso de éxito o **[false](#constant.false)** en caso de
fallo. Si directory no es un directorio, entonces
se devuelve un valor booleano **[false](#constant.false)** y se genera un error de nivel
**[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un simple ejemplo con scandir()**

&lt;?php
$dir    = '/tmp';
$files1 = scandir($dir);
$files2 = scandir($dir, SCANDIR_SORT_DESCENDING);

print_r($files1);
print_r($files2);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; .
[1] =&gt; ..
[2] =&gt; bar.php
[3] =&gt; foo.txt
[4] =&gt; somedir
)
Array
(
[0] =&gt; somedir
[1] =&gt; foo.txt
[2] =&gt; bar.php
[3] =&gt; ..
[4] =&gt; .
)

### Notas

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Ver también

    - [opendir()](#function.opendir) - Abre un directorio y recupera un puntero sobre él

    - [readdir()](#function.readdir) - Lee una entrada del directorio

    - [glob()](#function.glob) - Búsqueda de rutas que coinciden con un patrón

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [sort()](#function.sort) - Ordena un array en orden creciente

## Tabla de contenidos

- [chdir](#function.chdir) — Cambia de directorio
- [chroot](#function.chroot) — Cambia el directorio raíz
- [closedir](#function.closedir) — Cierra el puntero al directorio
- [dir](#function.dir) — Devuelve una instancia de la clase Directory
- [getcwd](#function.getcwd) — Devuelve el directorio de trabajo actual
- [opendir](#function.opendir) — Abre un directorio y recupera un puntero sobre él
- [readdir](#function.readdir) — Lee una entrada del directorio
- [rewinddir](#function.rewinddir) — Retorna al primer elemento del directorio
- [scandir](#function.scandir) — Lista los ficheros y directorios en un directorio

- [Constantes predefinidas](#dir.constants)
- [Directory](#class.directory) — La clase Directory<li>[Directory::close](#directory.close) — Cierra el manejador de directorio
- [Directory::read](#directory.read) — Lee una entrada desde el manejador de directorio
- [Directory::rewind](#directory.rewind) — Reinicia el manejador de directorio
  </li>- [Funciones de directorio](#ref.dir)<li>[chdir](#function.chdir) — Cambia de directorio
- [chroot](#function.chroot) — Cambia el directorio raíz
- [closedir](#function.closedir) — Cierra el puntero al directorio
- [dir](#function.dir) — Devuelve una instancia de la clase Directory
- [getcwd](#function.getcwd) — Devuelve el directorio de trabajo actual
- [opendir](#function.opendir) — Abre un directorio y recupera un puntero sobre él
- [readdir](#function.readdir) — Lee una entrada del directorio
- [rewinddir](#function.rewinddir) — Retorna al primer elemento del directorio
- [scandir](#function.scandir) — Lista los ficheros y directorios en un directorio
  </li>
