# xattr

# Introducción

La extensión xattr permite la manipulación de los atributos extendidos de un sistema de archivos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xattr.requirements)
- [Instalación](#xattr.installation)

    ## Requerimientos

    Para utilizar xattr, se necesita tener libattr instalado. Este está
    disponible en [» http://savannah.nongnu.org/projects/attr/](http://savannah.nongnu.org/projects/attr/).

    **Nota**:

    Estas funciones sólo funcionan en sistemas de archivos que soportan
    atributos extendidos, y haya activado durante la instalación. Algunos sistemas
    de ficheros comunes que soportan atributos extendidos son ext2, ext3,
    reiserfs, jfs, y xfs.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/xattr](https://pecl.php.net/package/xattr).

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[XATTR_ROOT](#constant.xattr-root)**
    ([int](#language.types.integer))



     Establece atributos en la raíz (segura) de espacio de nombres. Requiere privilegios de
     administrador.





    **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
    ([int](#language.types.integer))



     No sigue el enlace simbólico pero se puede operar en este.





    **[XATTR_CREATE](#constant.xattr-create)**
    ([int](#language.types.integer))



     La función falla si el atributo extendido ya existe.





    **[XATTR_REPLACE](#constant.xattr-replace)**
    ([int](#language.types.integer))



     La función falla si el atributo extendido no existe.

# Funciones de xattr

# xattr_get

(PECL xattr &gt;= 0.9.0)

xattr_get —
Obtener un atributo extendido

### Descripción

**xattr_get**([string](#language.types.string) $filename, [string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Esta función obtiene el valor de un atributo extendido del archivo.

Los atributos extendidos tienen dos espacios de nombres
diferentes: user y root. El espacio de nombres
user está disponible para todos los usuarios mientras que el espacio de
nombres root solo está disponible para los usuarios con privilegios
root. xattr opera sobre el espacio de nombres user por
defecto, pero esto puede ser cambiado utilizando el argumento
flags.

### Parámetros

     filename


       El archivo de la cual obtenemos el atributo.






     name


       El nombre del atributo.






     flags





        <caption>**Banderas xattr soportadas**</caption>



           **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
           No sigue el enlace simbólico pero se puede operar en este.



           **[XATTR_ROOT](#constant.xattr-root)**

            Establece atributos en la raíz (segura) de espacio de nombres.
            Requiere privilegios de administrador.










### Valores devueltos

Devuelve un string que contiene el valor o **[false](#constant.false)** si el atributo
no existe.

### Ejemplos

    **Ejemplo #1 Comprueba si el administrador del sistema firmó el archivo**

&lt;?php
$file = '/usr/local/sbin/some_binary';
$firma = xattr_get($file, 'Root signature', XATTR_ROOT);

/_ ... Comprobar si la $firma es válida ... _/

?&gt;

### Ver también

    - [xattr_list()](#function.xattr-list) - Obtener una lista de atributos extendidos

    - [xattr_set()](#function.xattr-set) - Establece un atributo extendido

    - [xattr_remove()](#function.xattr-remove) - Elimina un atributo extendido

# xattr_list

(PECL xattr &gt;= 0.9.0)

xattr_list —
Obtener una lista de atributos extendidos

### Descripción

**xattr_list**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Esta función obtiene una lista de nombres de los atributos extendidos de un archivo.

Los atributos extendidos tienen dos espacios de nombres
diferentes: user y root. El espacio de nombres
user está disponible para todos los usuarios mientras que el espacio de
nombres root solo está disponible para los usuarios con privilegios
root. xattr opera sobre el espacio de nombres user por
defecto, pero esto puede ser cambiado utilizando el argumento
flags.

### Parámetros

     filename


       La ruta del archivo.






     flags





        <caption>**Banderas xattr soportadas**</caption>



           **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
           No sigue el enlace simbólico pero se puede operar en este.



           **[XATTR_ROOT](#constant.xattr-root)**

            Establece atributos en la raíz (segura) de espacio de nombres.
            Requiere privilegios de administrador.










### Valores devueltos

Esta función devuelve un array con los nombres de los atributos extendidos.

### Ejemplos

    **Ejemplo #1 Imprime los nombres de todos los atributos extendidos del archivo**

&lt;?php
$file = 'some_file';
$root_attributes = xattr_list($file, XATTR_ROOT);
$user_attributes = xattr_list($file);

echo "Atributos Root: \n";
foreach ($root_attributes as $attr_name) {
printf("%s\n", $attr_name);
}

echo "\n Atributos usuario: \n";
foreach ($attributes as $attr_name) {
printf("%s\n", $attr_name);
}

?&gt;

### Ver también

    - [xattr_get()](#function.xattr-get) - Obtener un atributo extendido

# xattr_remove

(PECL xattr &gt;= 0.9.0)

xattr_remove —
Elimina un atributo extendido

### Descripción

**xattr_remove**([string](#language.types.string) $filename, [string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Esta función elimina un atributo extendido del archivo.

Los atributos extendidos tienen dos espacios de nombres
diferentes: user y root. El espacio de nombres
user está disponible para todos los usuarios mientras que el espacio de
nombres root solo está disponible para los usuarios con privilegios
root. xattr opera sobre el espacio de nombres user por
defecto, pero esto puede ser cambiado utilizando el argumento
flags.

### Parámetros

     filename


       El archivo del que se elimina el atributo.






     name


       El nombre del atributo a eliminar.






     flags





        <caption>**Banderas xattr soportadas**</caption>



           **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
           No sigue el enlace simbólico pero se puede operar en este.



           **[XATTR_ROOT](#constant.xattr-root)**

            Establece atributos en la raíz (segura) de espacio de nombres. Requiere privilegios de
            administrador.










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Elimina todos los atributos extendidos de un archivo**

&lt;?php
$file = 'some_file';
$attributes = xattr_list($file);

foreach ($attributes as $attr_name) {
    xattr_remove($file, $attr_name);
}
?&gt;

### Ver también

    - [xattr_list()](#function.xattr-list) - Obtener una lista de atributos extendidos

    - [xattr_set()](#function.xattr-set) - Establece un atributo extendido

    - [xattr_get()](#function.xattr-get) - Obtener un atributo extendido

# xattr_set

(PECL xattr &gt;= 0.9.0)

xattr_set —
Establece un atributo extendido

### Descripción

**xattr_set**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $name,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Esta función establece el valor de un atributo extendido del archivo.

Los atributos extendidos tienen dos espacios de nombres
diferentes: user y root. El espacio de nombres
user está disponible para todos los usuarios mientras que el espacio de
nombres root solo está disponible para los usuarios con privilegios
root. xattr opera sobre el espacio de nombres user por
defecto, pero esto puede ser cambiado utilizando el argumento
flags.

### Parámetros

     filename


       El archivo en el que se establece el atributo.






     name


       El nombre del atributo extendido. Este atributo se crea si no existe
       o reemplazado si ya existe. Puede cambiar este comportamiento mediante
       el uso de los parámetros flags.






     value


       El valor del atributo.






     flags





        <caption>**Banderas xattr soportadas**</caption>



           **[XATTR_CREATE](#constant.xattr-create)**
           La función falla si el atributo extendido ya existe.



           **[XATTR_REPLACE](#constant.xattr-replace)**
           La función falla si el atributo extendido no existe.



           **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
           No sigue el enlace simbólico pero se puede operar en este.



           **[XATTR_ROOT](#constant.xattr-root)**

            Establece atributos en la raíz (segura) de espacio de nombres.
            Requiere privilegios de administrador.










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Establece atributos extendidos en archivo .wav**

&lt;?php
$file = 'my_favourite_song.wav';
xattr_set($file, 'Artist', 'Someone');
xattr_set($file, 'My ranking', 'Good');
xattr_set($file, 'Listen count', '34');

/_ ... other code ... _/

printf("You've played this song %d times", xattr_get($file, 'Listen count'));
?&gt;

### Ver también

    - [xattr_get()](#function.xattr-get) - Obtener un atributo extendido

    - [xattr_remove()](#function.xattr-remove) - Elimina un atributo extendido

# xattr_supported

(PECL xattr &gt;= 1.0.0)

xattr_supported —
Comprueba si soporta los atributos extendidos del sistema de archivos

### Descripción

**xattr_supported**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Esta función comprueba si el sistema de archivos que contenía el fichero dado soporta
los atributos extendidos. Es necesario tener acceso de lectura al archivo.

### Parámetros

     filename


       La ruta del archivo de prueba.






     flags





        <caption>**Banderas xattr soportadas**</caption>



           **[XATTR_DONTFOLLOW](#constant.xattr-dontfollow)**
           No sigue el enlace simbólico pero se puede operar en este.









### Valores devueltos

Esta función devuelve **[true](#constant.true)** si sistema de archivo soporta los atributos extendidos,
**[false](#constant.false)** si no soporta y **[null](#constant.null)** si no se puede determinar (Por ejemplo
ruta incorrecta o le faltan permisos al archivo).

### Ejemplos

    **Ejemplo #1 Ejemplo de xattr_supported()**



     El siguiente código comprueba si se pueden utilizar los atributos extendidos.

&lt;?php
$file = 'some_file';

if (xattr*supported($file)) {
/\* ... make use of some xattr*_ functions ... _/
}

?&gt;

### Ver también

    - [xattr_get()](#function.xattr-get) - Obtener un atributo extendido

    - [xattr_list()](#function.xattr-list) - Obtener una lista de atributos extendidos

## Tabla de contenidos

- [xattr_get](#function.xattr-get) — Obtener un atributo extendido
- [xattr_list](#function.xattr-list) — Obtener una lista de atributos extendidos
- [xattr_remove](#function.xattr-remove) — Elimina un atributo extendido
- [xattr_set](#function.xattr-set) — Establece un atributo extendido
- [xattr_supported](#function.xattr-supported) — Comprueba si soporta los atributos extendidos del sistema de archivos

- [Introducción](#intro.xattr)
- [Instalación/Configuración](#xattr.setup)<li>[Requerimientos](#xattr.requirements)
- [Instalación](#xattr.installation)
  </li>- [Constantes predefinidas](#xattr.constants)
- [Funciones de xattr](#ref.xattr)<li>[xattr_get](#function.xattr-get) — Obtener un atributo extendido
- [xattr_list](#function.xattr-list) — Obtener una lista de atributos extendidos
- [xattr_remove](#function.xattr-remove) — Elimina un atributo extendido
- [xattr_set](#function.xattr-set) — Establece un atributo extendido
- [xattr_supported](#function.xattr-supported) — Comprueba si soporta los atributos extendidos del sistema de archivos
  </li>
