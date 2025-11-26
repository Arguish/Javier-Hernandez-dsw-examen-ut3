# Sistema de Ficheros

# Introducción

No es necesaria ninguna biblioteca externa para compilar esta extensión, pero si quiere que
PHP admita LFS (ficheros grandes) en Linux, necesita tener una versión reciente
de glibc y compilar PHP con las siguientes banderas de compilación:
-D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64.

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#filesystem.configuration)
- [Tipos de recursos](#filesystem.resources)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración del sistema de ficheros y flujos**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [allow_url_fopen](#ini.allow-url-fopen)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [allow_url_include](#ini.allow-url-include)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Obsoleto a partir de PHP 7.4.0.



      [user_agent](#ini.user-agent)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [default_socket_timeout](#ini.default-socket-timeout)
      "60"
      **[INI_ALL](#constant.ini-all)**
       



      [from](#ini.from)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [auto_detect_line_endings](#ini.auto-detect-line-endings)
      "0"
      **[INI_ALL](#constant.ini-all)**
      Obsoleto a partir de PHP 8.1.0.



      [sys_temp_dir](#ini.sys-temp-dir)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     allow_url_fopen
     [bool](#language.types.boolean)



      Esta opción habilita las envolturas fopen de tipo URL que permiten
      el acceso a objetos URL como ficheros. Las envolturas predeterminadas están proporcionads para
      el acceso de [ficheros remotos](#features.remote-files)
      usando los protocolos ftp o http, algunas extensiones como
      [zlib](#ref.zlib) pueden registrar envolturas adicionales.








     allow_url_include
     [bool](#language.types.boolean)



      Esta opción permite es uso de envolturas fopen de tipo URL con las siguientes
      funciones: [include](#function.include), [include_once](#function.include-once),
      [require](#function.require), [require_once](#function.require-once).



     **Nota**:



       Esta opción requiere allow_url_fopen para ser activada.









     user_agent
     [string](#language.types.string)



      Define el agente de usuario de PHP para el envío.








     default_socket_timeout
     [int](#language.types.integer)



      Tiempo de espera predeterminado (en segundos) para sockets basados en flujos.
      Especificar un valor negativo significa tiempo de espera infinito.








     from
     [string](#language.types.string)



      La dirección de email a usar en conexiones FTP no autenticadas y
      como valor de la cabecera From de conexiones HTTP, al usar las envolturas
      ftp y http, respectivamente.








     auto_detect_line_endings
     [bool](#language.types.boolean)



      Cuando se activa, PHP examinará la información leída por
      [fgets()](#function.fgets) y [file()](#function.file) para ver si se
      está usando las convenciones de final de línea de Unix, MS-Dos o Macintosh.




      Esto permite a PHP inter-operar con los sistemas Macintosh,
      pero por defecto está en Off, ya que hay una pérdida muy pequeña de rendimiento
      cuando se detectan las convenciones de EOL para la primera línea, y también
      porque la gente que usa retornos de carro como elementos serparadores bajo
      sistemas Unix podrían experimentar un comportamiento que no es compatible con versiones anteriores.








     sys_temp_dir
     [string](#language.types.string)





## Tipos de recursos

El sistema de ficheros usa flujos como su tipo de recursos. Los flujos
están documentados en su propio capítulo de referencia, [Flujos](#book.stream).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[SEEK_SET](#constant.seek-set)**
    ([int](#language.types.integer))









    **[SEEK_CUR](#constant.seek-cur)**
    ([int](#language.types.integer))









    **[SEEK_END](#constant.seek-end)**
    ([int](#language.types.integer))









    **[LOCK_SH](#constant.lock-sh)**
    ([int](#language.types.integer))









    **[LOCK_EX](#constant.lock-ex)**
    ([int](#language.types.integer))









    **[LOCK_UN](#constant.lock-un)**
    ([int](#language.types.integer))









    **[LOCK_NB](#constant.lock-nb)**
    ([int](#language.types.integer))

**
flags disponibles para
[file()](#function.file)
**

    **[FILE_USE_INCLUDE_PATH](#constant.file-use-include-path)**
    ([int](#language.types.integer))



     Busca el filename en
     [include_path](#ini.include-path).





    **[FILE_NO_DEFAULT_CONTEXT](#constant.file-no-default-context)**
    ([int](#language.types.integer))








    **[FILE_APPEND](#constant.file-append)**
    ([int](#language.types.integer))



     Añade contenido a un archivo existente.





    **[FILE_IGNORE_NEW_LINES](#constant.file-ignore-new-lines)**
    ([int](#language.types.integer))



     Quita caracteres EOL.





    **[FILE_SKIP_EMPTY_LINES](#constant.file-skip-empty-lines)**
    ([int](#language.types.integer))



     Salta líneas vacías.






    **[FILE_BINARY](#constant.file-binary)**
    ([int](#language.types.integer))



     Modo texto


**Advertencia**

       Esta constante no tiene efecto, y está obsoleta a partir de PHP 8.1.0.










    **[FILE_TEXT](#constant.file-text)**
    ([int](#language.types.integer))



     Text mode.


**Advertencia**

       Esta constante no tiene efecto, y está obsoleta a partir de PHP 8.1.0.





**
flags disponibles para
[glob()](#function.glob)
**

    **[GLOB_AVAILABLE_FLAGS](#constant.glob-available-flags)**
    ([int](#language.types.integer))



     Todas las flags **[GLOB_*](#constant.glob-available-flags)** combinadas.
     Equivalente a 0 | **[GLOB_BRACE](#constant.glob-brace)** |
     **[GLOB_MARK](#constant.glob-mark)** | **[GLOB_NOSORT](#constant.glob-nosort)** |
     **[GLOB_NOCHECK](#constant.glob-nocheck)** | **[GLOB_NOESCAPE](#constant.glob-noescape)** |
     **[GLOB_ERR](#constant.glob-err)** | **[GLOB_ONLYDIR](#constant.glob-onlydir)**





    **[GLOB_BRACE](#constant.glob-brace)**
    ([int](#language.types.integer))



     Expande {a,b,c} para coincidir con 'a', 'b' o 'c'.

    **Nota**:

      **[GLOB_BRACE](#constant.glob-brace)** no está disponible en algunos systemas non GNU,
      como Solaris o Alpine Linux.








    **[GLOB_ERR](#constant.glob-err)**
    ([int](#language.types.integer))



     Detenerse ante errores de lectura (como directorios ilegibles),
     por defecto los errores son ignorados.





    **[GLOB_MARK](#constant.glob-mark)**
    ([int](#language.types.integer))



     Añade una barra (una barra invertida en Windows) a cada directorio devuelto.





    **[GLOB_NOCHECK](#constant.glob-nocheck)**
    ([int](#language.types.integer))



     Devolver el patrón de búsqueda si no se encontraron archivos que coincidan con él.





    **[GLOB_NOESCAPE](#constant.glob-noescape)**
    ([int](#language.types.integer))



     Las barras invertidas no citan metacaracteres.





    **[GLOB_NOSORT](#constant.glob-nosort)**
    ([int](#language.types.integer))



     Devolver los archivos tal como aparecen en el directorio (sin ordenar).
     Cuando no se usa este falg, los nombres de ruta se ordenan alfabéticamente.





    **[GLOB_ONLYDIR](#constant.glob-onlydir)**
    ([int](#language.types.integer))



     Devolver solo las entradas de directorio que coincidan con el patrón.

**
flags disponibles para
[pathinfo()](#function.pathinfo)
**

    **[PATHINFO_ALL](#constant.pathinfo-all)**
    ([int](#language.types.integer))



     Todas las partes de pathinfo
     son devueltas como un array asociativo.





    **[PATHINFO_DIRNAME](#constant.pathinfo-dirname)**
    ([int](#language.types.integer))



     La ruta del directorio o archivo.





    **[PATHINFO_BASENAME](#constant.pathinfo-basename)**
    ([int](#language.types.integer))



     El nombre del directorio o
     el nombre y la extensión del archivo.





    **[PATHINFO_EXTENSION](#constant.pathinfo-extension)**
    ([int](#language.types.integer))



     La extensión del archivo.





    **[PATHINFO_FILENAME](#constant.pathinfo-filename)**
    ([int](#language.types.integer))



     El nombre del archivo (sin la extensión)
     o del directorio.

**
scanner_modes disponibles para
[parse_ini_file()](#function.parse-ini-file) y
[parse_ini_string()](#function.parse-ini-string)
**

    **[INI_SCANNER_NORMAL](#constant.ini-scanner-normal)**
    ([int](#language.types.integer))



     Modo de escaneo INI normal.






    **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**
    ([int](#language.types.integer))



     Modo de escaneo INI en bruto (RAW).






    **[INI_SCANNER_TYPED](#constant.ini-scanner-typed)**
    ([int](#language.types.integer))



     Modo de escaneo INI tipado.

**
flags disponibles para
[fnmatch()](#function.fnmatch)
**

    **[FNM_NOESCAPE](#constant.fnm-noescape)**
    ([int](#language.types.integer))



     Deshabilita el escapado de la barra invertida.






    **[FNM_PATHNAME](#constant.fnm-pathname)**
    ([int](#language.types.integer))



     Una barra en un string sólo concide con otra en el patrón dado.






    **[FNM_PERIOD](#constant.fnm-period)**
    ([int](#language.types.integer))



     Un punto en un string debe coincidir exactamente con otro en el patrón dado.






    **[FNM_CASEFOLD](#constant.fnm-casefold)**
    ([int](#language.types.integer))



     Comparación insensible a mayúsculas-minúsculas. Parte de la extensión GNU.

**Constantes de subida de archivos en PHP**

    **[UPLOAD_ERR_CANT_WRITE](#constant.upload-err-cant-write)**
    ([int](#language.types.integer))



     Error al escribir el archivo en el disco.
     El valor de la constante es 7.







    **[UPLOAD_ERR_EXTENSION](#constant.upload-err-extension)**
    ([int](#language.types.integer))



     Una extensión de PHP detuvo la subida del archivo. PHP no
     proporciona una forma de determinar qué extensión causó la detención de la subida del archivo;
     examinar la lista de extensiones cargadas con [phpinfo()](#function.phpinfo) puede ayudar.
     El valor de la constante es 8.







    **[UPLOAD_ERR_FORM_SIZE](#constant.upload-err-form-size)**
    ([int](#language.types.integer))



     El archivo subido excede la directiva *MAX_FILE_SIZE*
     especificada en el formulario HTML.
     El valor de la constante es 2.







    **[UPLOAD_ERR_INI_SIZE](#constant.upload-err-ini-size)**
    ([int](#language.types.integer))



     El archivo subido excede la directiva
     [upload_max_filesize](#ini.upload-max-filesize)
     en php.ini.
     El valor de la constante es 1.







    **[UPLOAD_ERR_NO_FILE](#constant.upload-err-no-file)**
    ([int](#language.types.integer))



     No se ha subido ningún archivo.
     El valor de la constante es 4.







    **[UPLOAD_ERR_NO_TMP_DIR](#constant.upload-err-no-tmp-dir)**
    ([int](#language.types.integer))



     Directorio temporal no encontrado.
     El valor de la constante es 6.







    **[UPLOAD_ERR_OK](#constant.upload-err-ok)**
    ([int](#language.types.integer))



     No hay error, el archivos se ha subido correctamente.
     El valor de la constante es 0.







    **[UPLOAD_ERR_PARTIAL](#constant.upload-err-partial)**
    ([int](#language.types.integer))



     El archivo solo se ha subido parcialmente.
     El valor de la constante es 3.

# Funciones del Sistema de Archivos

# Ver también

Para funciones relacionadas, vea también las secciones [Directorio](#ref.dir)
y [Ejecución de Programas](#ref.exec).

Para una lista y explicación de las distintas envolturas URL que se pueden usar
como archivos remotos, vea también [Protocolos y Envolturas soportados](#wrappers).

# basename

(PHP 4, PHP 5, PHP 7, PHP 8)

basename — Devuelve el nombre del componente final de una ruta

### Descripción

**basename**([string](#language.types.string) $path, [string](#language.types.string) $suffix = ""): [string](#language.types.string)

Toma como argumento path, la ruta de un
fichero o directorio y proporciona el nombre del último componente.

**Nota**:

    **basename()** actúa de manera ingenua y no tiene conocimiento del sistema de archivos subyacente o de los componentes de una ruta tales
    como "..".

**Precaución**

    **basename()** es sensible a la configuración local, por lo que si la ruta contiene
    caracteres multioctetos, la configuración local adecuada debe ser establecida
    mediante la función [setlocale()](#function.setlocale).
    Si path contiene caracteres que son inválidos
    para la configuración local actual, el comportamiento de **basename()**
    es indefinido.

### Parámetros

     path


       Una ruta.




       En Windows, los caracteres slash (/) y antislash
       (\) se utilizan como separadores de
       directorio. En otros sistemas operativos, solo el carácter slash
       (/) se utiliza.






     suffix


       Si suffix es proporcionado, el sufijo también será eliminado.





### Valores devueltos

Devuelve el nombre base de la ruta path dada.

### Ejemplos

    **Ejemplo #1 Ejemplo con basename()**

&lt;?php
echo "1) ".basename("/etc/sudoers.d", ".d").PHP_EOL;
echo "2) ".basename("/etc/sudoers.d").PHP_EOL;
echo "3) ".basename("/etc/passwd").PHP_EOL;
echo "4) ".basename("/etc/").PHP_EOL;
echo "5) ".basename(".").PHP_EOL;
echo "6) ".basename("/");
?&gt;

    El ejemplo anterior mostrará:

1. sudoers
2. sudoers.d
3. passwd
4. etc
5. .
6. ### Ver también
    - [dirname()](#function.dirname) - Devuelve la ruta de la carpeta padre

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

    # chgrp

    (PHP 4, PHP 5, PHP 7, PHP 8)

chgrp — Cambia el grupo de un fichero

### Descripción

**chgrp**([string](#language.types.string) $filename, [string](#language.types.string)|[int](#language.types.integer) $group): [bool](#language.types.boolean)

Intenta reemplazar el grupo propietario actual del fichero
filename por group.

Solo el superusuario (root) puede cambiar el grupo
propietario de un fichero arbitrariamente; los usuarios
comunes solo pueden cambiar el grupo propietario de un
fichero si el usuario propietario del fichero es miembro del grupo.

### Parámetros

     filename


       Ruta hacia el fichero.






     group


       Un nombre o un número de grupo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Modificación de grupo de un fichero**

&lt;?php
$filename = 'shared_file.txt';
$format = "%s's Group ID @ %s: %d\n";
printf($format, $filename, date('r'), filegroup($filename));
chgrp($filename, 8);
clearstatcache(); // no almacenar en caché el resultado de filegroup()
printf($format, $filename, date('r'), filegroup($filename));
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:

    En Windows, esta función falla silenciosamente cuando se aplica sobre un
    fichero ordinario.

### Ver también

    - [chown()](#function.chown) - Cambia el propietario del fichero

    - [chmod()](#function.chmod) - Cambia el modo del fichero

# chmod

(PHP 4, PHP 5, PHP 7, PHP 8)

chmod — Cambia el modo del fichero

### Descripción

**chmod**([string](#language.types.string) $filename, [int](#language.types.integer) $permissions): [bool](#language.types.boolean)

Reemplaza el modo del fichero filename
por el modo permissions.

### Parámetros

     filename


       Ruta hacia el fichero.






     permissions


       Se debe tener en cuenta que el modo permissions es
       considerado como un número en notación octal, por lo que, para asegurarse,
       se puede prefigurar el modo permissions con un cero. Las cadenas como "g+w"
       no funcionarán correctamente:









&lt;?php
chmod("/somedir/somefile", 755); // notación decimal: probablemente incorrecto
chmod("/somedir/somefile", "u+rwx,go+rx"); // string: incorrecto
chmod("/somedir/somefile", 0755); // notación octal: valor del modo correcto
?&gt;

       El argumento permissions se compone de tres
       valores octales que especifican los derechos para el propietario,
       el grupo del propietario y los demás, respectivamente. Cada
       componente puede ser calculado sumando los derechos deseados.
       El número 1 otorga los derechos de ejecución, el número 2 los derechos
       de escritura y el número 4 los derechos de lectura. Simplemente
       sume estos números para especificar los derechos deseados. También
       puede leer el manual de los sistemas Unix con **man 1 chmod** y
       **man 2 chmod**.









&lt;?php
// Lectura y escritura para el propietario, nada para los demás
chmod("/somedir/somefile", 0600);

// Lectura y escritura para el propietario, lectura para los demás
chmod("/somedir/somefile", 0644);

// Todo para el propietario, lectura y ejecución para los demás
chmod("/somedir/somefile", 0755);

// Todo para el propietario, lectura y ejecución para el grupo, nada para los demás
chmod("/somedir/somefile", 0750);
?&gt;

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

En caso de error, se emite un error **[E_WARNING](#constant.e-warning)**.

### Notas

**Nota**:

    El usuario actual es el usuario con el que PHP funciona.
    Probablemente sea diferente del usuario que se utiliza
    en modo Shell o FTP. El modo solo puede ser modificado por el usuario
    al que pertenece el fichero en la mayoría de los sistemas.

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

### Ver también

    - [chown()](#function.chown) - Cambia el propietario del fichero

    - [chgrp()](#function.chgrp) - Cambia el grupo de un fichero

    - [fileperms()](#function.fileperms) - Lee los permisos de un fichero

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# chown

(PHP 4, PHP 5, PHP 7, PHP 8)

chown — Cambia el propietario del fichero

### Descripción

**chown**([string](#language.types.string) $filename, [string](#language.types.string)|[int](#language.types.integer) $user): [bool](#language.types.boolean)

Cambia el propietario del fichero
filename a user.
Solo el superusuario (root) puede cambiar arbitrariamente
el propietario de un fichero.

### Parámetros

     filename


       Ruta hacia el fichero.






     user


       Un nombre o un número de usuario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con chown()**

&lt;?php

// Nombre del fichero y nombre de usuario a utilizar
$file_name= "foo.php";
$path = "/home/sites/php.net/public_html/sandbox/" . $file_name ;
$user_name = "root";

// Define el usuario
chown($path, $user_name);

// Verificación del resultado
$stat = stat($path);
print_r(posix_getpwuid($stat['uid']));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; root
[passwd] =&gt; x
[uid] =&gt; 0
[gid] =&gt; 0
[gecos] =&gt; root
[dir] =&gt; /root
[shell] =&gt; /bin/bash
)

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:

    En Windows, esta función falla silenciosamente cuando se aplica sobre un
    fichero ordinario.

### Ver también

    - [chmod()](#function.chmod) - Cambia el modo del fichero

    - [chgrp()](#function.chgrp) - Cambia el grupo de un fichero

# clearstatcache

(PHP 4, PHP 5, PHP 7, PHP 8)

clearstatcache — Elimina la caché de [stat()](#function.stat)

### Descripción

**clearstatcache**([bool](#language.types.boolean) $clear_realpath_cache = **[false](#constant.false)**, [string](#language.types.string) $filename = ""): [void](language.types.void.html)

La llamada a la función [stat()](#function.stat) o
[lstat()](#function.lstat) es relativamente costosa en términos de
tiempo de ejecución. Por ello, el resultado de la última
llamada a una de las funciones de estado (ver la lista a continuación) se
guarda para su reutilización. Si se desea forzar la verificación del estado de un fichero,
en el caso de que el fichero hubiera podido ser modificado o hubiera desaparecido, se
debe utilizar la función **clearstatcache()**
para borrar de la memoria los resultados de la última llamada a la función.

Tenga en cuenta que PHP no guarda en caché información sobre
un fichero inexistente. Si se llama a [file_exists()](#function.file-exists)
sobre un fichero que no existe, la función devolverá **[false](#constant.false)**
hasta que se cree el fichero. Si se crea el fichero,
la función devolverá **[true](#constant.true)** incluso si se borra el fichero.

**Nota**:

    Esta función guarda en caché información sobre ficheros.
    Por lo tanto, solo es necesario llamar a **clearstatcache()** si
    se realizan múltiples operaciones sobre el directorio, y se desea tener
    una versión actualizada de la información.

Las funciones afectadas incluyen :
[stat()](#function.stat),
[lstat()](#function.lstat),
[file_exists()](#function.file-exists),
[is_writable()](#function.is-writable),
[is_readable()](#function.is-readable),
[is_executable()](#function.is-executable),
[is_file()](#function.is-file),
[is_dir()](#function.is-dir),
[is_link()](#function.is-link),
[filectime()](#function.filectime),
[fileatime()](#function.fileatime),
[filemtime()](#function.filemtime),
[fileinode()](#function.fileinode),
[filegroup()](#function.filegroup),
[fileowner()](#function.fileowner),
[filesize()](#function.filesize),
[filetype()](#function.filetype), y
[fileperms()](#function.fileperms).

### Parámetros

     clear_realpath_cache


       Si también debe vaciarse la caché de rutas reales.






     filename


       Limpia la caché de ruta real de un fichero específico.
       Solo puede ser utilizado si el argumento
       clear_realpath_cache vale **[true](#constant.true)**.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con clearstatcache()**

&lt;?php
$file = 'output_log.txt';

function get_owner($file)
{
    $stat = stat($file);
$user = posix_getpwuid($stat['uid']);
return $user['name'];
}

$format = "UID @ %s: %s\n";

printf($format, date('r'), get_owner($file));

chown($file, 'ross');
printf($format, date('r'), get_owner($file));

clearstatcache();
printf($format, date('r'), get_owner($file));
?&gt;

    Resultado del ejemplo anterior es similar a:

UID @ Sun, 12 Oct 2008 20:48:28 +0100: root
UID @ Sun, 12 Oct 2008 20:48:28 +0100: root
UID @ Sun, 12 Oct 2008 20:48:28 +0100: ross

# copy

(PHP 4, PHP 5, PHP 7, PHP 8)

copy — Copia un fichero

### Descripción

**copy**([string](#language.types.string) $from, [string](#language.types.string) $to, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [bool](#language.types.boolean)

Realiza una copia del fichero from
hacia el fichero to.

Si se desea mover un fichero, utilice la función
[rename()](#function.rename).

### Parámetros

     from


       Ruta hacia el fichero origen.






     to


       La ruta de destino. Si to es
       una URL, la copia puede fallar si este protocolo no soporta
       la sobrescritura de ficheros existentes.



      **Advertencia**

        Si el fichero de destino to ya existe,
        será sobrescrito.







     context


       Un recurso de contexto válido, creado por la
       función [stream_context_create()](#function.stream-context-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con copy()**

&lt;?php
$file = 'example.txt';
$newfile = 'example.txt.bak';

if (!copy($file, $newfile)) {
echo "La copia $file del fichero ha fallado...\n";
}
?&gt;

### Ver también

    - [move_uploaded_file()](#function.move-uploaded-file) - Mueve un archivo subido a una nueva ubicación

    - [rename()](#function.rename) - Renombra un fichero o un directorio

    - La sección del manual relativa a la [gestión de subidas de
    ficheros](#features.file-upload)

# delete

delete — Ver [unlink()](#function.unlink) o [unset()](#function.unset)

### Descripción

No existe una palabra clave o función delete en el lenguaje PHP.
Si se ha llegado a esta página intentando eliminar un fichero,
probar con [unlink()](#function.unlink).
Para eliminar una variable del ámbito local, consultar
[unset()](#function.unset).

### Ver también

    - [unlink()](#function.unlink) - Elimina un fichero

    - [unset()](#function.unset) - unset destruye una variable

# dirname

(PHP 4, PHP 5, PHP 7, PHP 8)

dirname — Devuelve la ruta de la carpeta padre

### Descripción

**dirname**([string](#language.types.string) $path, [int](#language.types.integer) $levels = 1): [string](#language.types.string)

Devuelve la ruta padre de un camino que representa un fichero
o una carpeta, que corresponde a levels nivel(es) más
arriba que la carpeta actual.

**Nota**:

    **dirname()** actúa de forma ingenua sobre la cadena de entrada y
    no está al tanto del sistema de archivos actual o de componentes eventuales como
    "..".

**Precaución**

    En Windows, **dirname()** asume que la página de código actualmente
    definida, por lo que para que pueda ver el nombre de carpeta correcto con caracteres
    multioctetos en el camino, la página de código correspondiente debe
    estar definida.
    Si path contiene caracteres que son inválidos
    para la página de código actual, el comportamiento de **dirname()**
    es indefinido.




    En otros sistemas, **dirname()** asume que path
    está codificado en un codificación compatible con ASCII. De lo contrario, el comportamiento de la
    función es indefinido.

### Parámetros

     path


       Un camino.




       En Windows, las barras (//) y antislash
       (\) se utilizan como separadores
       de carpeta. En otros entornos, solo la barra
       (/) se utiliza.






     levels


       El número de carpetas padres más arriba.




       Debe ser un integer superior a 0.





### Valores devueltos

Devuelve la carpeta padre del camino. Si no hay ninguna barra en el camino
path, un punto ('.') será
devuelto, indicando la carpeta actual. De lo contrario, la cadena devuelta
será el camino path del cual se habrán eliminado todos
los /component.

**Precaución**

    Se debe tener cuidado al utilizar esta función en un ciclo que pueda alcanzar la
    carpeta raíz, ya que esto puede producir un ciclo infinito.





&lt;?php
dirname('.'); // Devolverá '.'.
dirname('/'); // Devolverá `\` en Windows y '/' en sistemas *nix.
dirname('\\'); // Devolverá `\` en Windows y '.' en sistemas *nix.
dirname('C:\\'); // Devolverá 'C:\' en Windows y '.' en sistemas \*nix.
?&gt;

### Ejemplos

    **Ejemplo #1 Ejemplo con dirname()**

&lt;?php
echo dirname("/etc/passwd") . PHP_EOL;
echo dirname("/etc/") . PHP_EOL;
echo dirname(".") . PHP_EOL;
echo dirname("C:\\") . PHP_EOL;
echo dirname("/usr/local/lib", 2);

    Resultado del ejemplo anterior es similar a:

/etc
/ (o \ en Windows)
.
C:\
/usr

### Ver también

    - [basename()](#function.basename) - Devuelve el nombre del componente final de una ruta

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

    - [realpath()](#function.realpath) - Retorna la ruta de acceso canónica absoluta

# disk_free_space

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

disk_free_space — Devuelve el espacio en disco disponible en el sistema de archivos o partición

### Descripción

**disk_free_space**([string](#language.types.string) $directory): [float](#language.types.float)|[false](#language.types.singleton)

Devuelve el espacio en disco disponible en el directorio o partición.

### Parámetros

     directory


       Un directorio del sistema de archivos o una partición de disco.



      **Nota**:



        Si se proporciona un fichero en lugar de un directorio, el comportamiento
        de esta función puede ser aleatorio, dependiendo del sistema operativo
        y las versiones de PHP.






### Valores devueltos

Devuelve el número de bytes disponibles, en forma de [float](#language.types.float)
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con disk_free_space()**

&lt;?php
// $df contiene el número de bytes libres en "/"
$df = disk_free_space("/");

// En Windows:
$df_c = disk_free_space("C:");
$df_d = disk_free_space("D:");
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

### Ver también

    - [disk_total_space()](#function.disk-total-space) - Devuelve el tamaño de un directorio o partición

# disk_total_space

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

disk_total_space — Devuelve el tamaño de un directorio o partición

### Descripción

**disk_total_space**([string](#language.types.string) $directory): [float](#language.types.float)|[false](#language.types.singleton)

Lee recursivamente todos los tamaños
del directorio directory y devuelve la suma en bytes.

### Parámetros

     directory


       Un directorio del sistema de archivos o la partición de un disco.





### Valores devueltos

Devuelve el tamaño en bytes, en forma de [float](#language.types.float)
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con disk_total_space()**

&lt;?php
// $ds contiene el número de bytes del directorio "/"
$ds = disk_total_space("/");

// En Windows:
$ds = disk_total_space("C:");
$ds = disk_total_space("D:");
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

### Ver también

    - [disk_free_space()](#function.disk-free-space) - Devuelve el espacio en disco disponible en el sistema de archivos o partición

# diskfreespace

(PHP 4, PHP 5, PHP 7, PHP 8)

diskfreespace — Alias de [disk_free_space()](#function.disk-free-space)

### Descripción

Esta función es un alias de:
[disk_free_space()](#function.disk-free-space).

# fclose

(PHP 4, PHP 5, PHP 7, PHP 8)

fclose — Cierra un fichero

### Descripción

**fclose**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Cierra el fichero representado por el puntero
stream.

### Parámetros

     stream


       El puntero de fichero debe ser válido y debe haber sido
       correctamente abierto por la función [fopen()](#function.fopen) o
       la función [fsockopen()](#function.fsockopen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con fclose()**

&lt;?php

$handle = fopen('somefile.txt', 'r');

fclose($handle);

?&gt;

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

# fdatasync

(PHP 8 &gt;= 8.1.0)

fdatasync — Sincroniza los datos (pero no los metadatos) con el fichero

### Descripción

**fdatasync**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Esta función sincroniza el contenido del stream en el soporte de almacenamiento, al igual que [fsync()](#function.fsync),
pero no sincroniza los metadatos de los ficheros.
Cabe señalar que esta función es diferente solo en sistemas POSIX.
En Windows, esta función es un alias de [fsync()](#function.fsync).

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de fdatasync()**

&lt;?php
$file = 'test.txt';
$stream = fopen($file, 'w');
fwrite($stream, 'test data');
fwrite($stream, "\r\n");
fwrite($stream, 'additional data');
fdatasync($stream);
fclose($stream);
?&gt;

### Ver también

    - [fflush()](#function.fflush) - Envía todo el contenido generado en un fichero

    - [fsync()](#function.fsync) - Sincroniza los cambios realizados en el fichero (incluyendo los metadatos)

# feof

(PHP 4, PHP 5, PHP 7, PHP 8)

feof — Prueba el final del archivo

### Descripción

**feof**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Prueba el final del archivo.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Retorna **[true](#constant.true)** si el puntero
handle está al final del archivo o si
ocurre un error, de lo contrario, retorna **[false](#constant.false)**.

### Notas

**Advertencia**

    Si una conexión abierta con [fsockopen()](#function.fsockopen) no es cerrada
    por el servidor, **feof()** se bloqueará.
    Para evitar este comportamiento, consulte el ejemplo a continuación:



     **Ejemplo #1 Gestión de tiempos de espera excedidos feof()**




&lt;?php
function safe_feof($fp, &amp;$start = NULL) {
$start = microtime(true);

return feof($fp);
}

/_ Supongamos que $fp fue previamente abierto por fsockopen() _/

$start = NULL;
$timeout = ini_get('default_socket_timeout');

while(!safe_feof($fp, $start) &amp;&amp; (microtime(true) - $start) &lt; $timeout)
{
/_ Gestión _/
}
?&gt;

**Advertencia**

    Si el puntero de archivo pasado no es válido, se obtendrá
    un bucle infinito ya que **feof()** fallará al retornar **[true](#constant.true)**.



     **Ejemplo #2 Ejemplo con feof()** y un puntero de archivo inválido




&lt;?php
// Si el archivo no puede ser leído o no existe, la función fopen retorna FALSE
$file = @fopen("no_such_file", "r");

// FALSE proveniente de fopen emitirá una advertencia y causará un bucle infinito aquí
while (!feof($file)) {
}

fclose($file);
?&gt;

# fflush

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

fflush — Envía todo el contenido generado en un fichero

### Descripción

**fflush**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Fuerza la escritura de todos los datos bufferizados en el fichero designado
por stream.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Escritura de un fichero utilizando fflush()**

&lt;?php
$filename = 'bar.txt';

$file = fopen($filename, 'r+');
rewind($file);
fwrite($file, 'Foo');
fflush($file);
ftruncate($file, ftell($file));
fclose($file);
?&gt;

### Ver también

    - [clearstatcache()](#function.clearstatcache) - Elimina la caché de stat

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# fgetc

(PHP 4, PHP 5, PHP 7, PHP 8)

fgetc — Lee un carácter en un fichero

### Descripción

**fgetc**([resource](#language.types.resource) $stream): [string](#language.types.string)|[false](#language.types.singleton)

Lee un carácter en un fichero.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Devuelve una cadena que contiene un solo carácter, leído desde el fichero apuntado por
stream. Devuelve **[false](#constant.false)** al final del fichero.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ejemplos

    **Ejemplo #1 Ejemplo con fgetc()**

&lt;?php
$fp = fopen('somefile.txt', 'r');
if (!$fp) {
echo 'No es posible abrir el fichero somefile.txt';
}
while (false !== ($char = fgetc($fp))) {
echo "$char\n";
}
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

# fgetcsv

(PHP 4, PHP 5, PHP 7, PHP 8)

fgetcsv — Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

### Descripción

**fgetcsv**(
    [resource](#language.types.resource) $stream,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\"
): [array](#language.types.array)|[false](#language.types.singleton)

Similar a [fgets()](#function.fgets) pero **fgetcsv()**
analiza la línea que lee y busca los campos CSV,
que devuelve en un array que los contiene.

**Nota**:

    Los parámetros de configuración local son tenidos en cuenta por esta función.
    Por ejemplo, los datos codificados en ciertos juegos de caracteres de un byte pueden ser analizados
    incorrectamente si **[LC_CTYPE](#constant.lc-ctype)** es
    en_US.UTF-8.

### Parámetros

     stream


       Un puntero válido a un archivo abierto con [fopen()](#function.fopen),
       [popen()](#function.popen) o [fsockopen()](#function.fsockopen).






     length


       Debe ser mayor que la línea más larga (en términos de caracteres)
       a leer en el archivo (incluyendo el carácter de fin de línea).
       En caso contrario la línea será dividida en fragmentos de length caracteres,
       a menos que la división ocurra dentro de un encierro.




       Omitir este parámetro (o establecerlo a 0, o **[null](#constant.null)** en PHP 8.0.0 o
       versiones posteriores) hace que la longitud máxima de la línea no esté limitada,
       lo cual es ligeramente más lento.






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

Devuelve un array indexado que contiene los campos leídos en caso de éxito, o **[false](#constant.false)** si ocurre un error.

**Nota**:

    Una línea vacía en un archivo CSV será devuelta
    en forma de un array que contiene el valor **[null](#constant.null)** y no será tratada
    como un error.

**Nota**:
Si PHP no reconoce correctamente los finales de línea al leer archivos que han sido creados o leídos en
un Macintosh, la activación de la opción de configuración
[auto_detect_line_endings](#ini.auto-detect-line-endings) puede resolver el problema.

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




       8.3.0

        Una cadena vacía es devuelta en lugar de una cadena que contiene un solo
        byte nulo para el último campo si este contiene únicamente un delimitador no terminado.




       8.0.0

        length ahora es nullable.




       7.4.0

        El parámetro escape ahora acepta una cadena vacía
        para desactivar el mecanismo de escape propietario.





### Ejemplos

    **Ejemplo #1 Lee y muestra el contenido de un archivo CSV**

&lt;?php
$row = 1;
if (($handle = fopen("test.csv", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
echo "&lt;p&gt; $num campos en la línea $row: &lt;br /&gt;&lt;/p&gt;\n";
        $row++;
        for ($c=0; $c &lt; $num; $c++) {
            echo $data[$c] . "&lt;br /&gt;\n";
}
}
fclose($handle);
}
?&gt;

### Ver también

- [fputcsv()](#function.fputcsv) - Formatea una línea en CSV y la escribe en un fichero

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

- [explode()](#function.explode) - Divide una string en segmentos

- [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

- [pack()](#function.pack) - Compacta datos en una cadena binaria

# fgets

(PHP 4, PHP 5, PHP 7, PHP 8)

fgets — Recupera la línea actual a partir de la posición del puntero de archivo

### Descripción

**fgets**([resource](#language.types.resource) $stream, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Recupera la línea actual a partir de la posición del puntero de archivo.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

     length


       Lee hasta la longitud length - 1 byte
       desde el puntero de archivo stream,
       o bien el final del archivo, o una nueva línea (que es incluida
       en el valor devuelto), o un EOF (el que llegue primero). Si no se
       proporciona longitud, la función leerá el flujo hasta el final de la línea.





### Valores devueltos

Devuelve un [string](#language.types.string) que contiene los length primeros
caracteres, menos 1 byte desde el puntero de archivo
stream. **[false](#constant.false)** es devuelto si no hay más
datos para leer.

Si ocurre un error, la función devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Lectura de un archivo línea por línea**

&lt;?php

$fp = @fopen("/tmp/inputfile.txt", "r");

if ($fp) {
    while (($buffer = fgets($fp, 4096)) !== false) {
        echo $buffer, PHP_EOL;
    }
    if (!feof($fp)) {
echo "Error: fgets() falló\n";
}

    fclose($fp);

}

?&gt;

### Notas

**Nota**:
Si PHP no reconoce correctamente los finales de línea al leer archivos que han sido creados o leídos en
un Macintosh, la activación de la opción de configuración
[auto_detect_line_endings](#ini.auto-detect-line-endings) puede resolver el problema.

**Nota**:

    Los programadores acostumbrados a la programación 'C' notarán que
    **fgets()** no se comporta como su equivalente en C
    al encontrar el final del archivo.

### Ver también

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fgetc()](#function.fgetc) - Lee un carácter en un fichero

    - [stream_get_line()](#function.stream-get-line) - Lee una línea en un flujo

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

# fgetss

(PHP 4, PHP 5, PHP 7)

fgetss — Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.3.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**fgetss**([resource](#language.types.resource) $handle, [int](#language.types.integer) $length = ?, [string](#language.types.string) $allowable_tags = ?): [string](#language.types.string)

Idéntica a [fgets()](#function.fgets), excepto que
**fgetss()** intenta eliminar cualesquiera bytes NULL, etiquetas HTML y PHP del
texto que lee.

### Parámetros

     handle

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

     length


       Longitud de la información que va a ser recuperada.






     allowable_tags


       Puede usar el tercer parámetro opcional para especificar las etiquetas que no deberían
       ser eliminadas.
       Consulte [strip_tags()](#function.strip-tags) para obtener más información sobre
       allowable_tags.





### Valores devueltos

Devuelve una cadena de hasta length - 1 bytes leídos desde
el archivo apuntado por handle, con todo el código HTML y PHP
eliminado.

Si se produjo un error devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Leer un archivo PHP línea a línea**

&lt;?php
$cadena = &lt;&lt;&lt;EOD
&lt;html&gt;&lt;body&gt;
&lt;p&gt;¡Bienvenido! Hoy es el &lt;?php echo(date('jS')); ?&gt; de &lt;?= date('F'); ?&gt;.&lt;/p&gt;
&lt;/body&gt;&lt;/html&gt;
Texto fuera del bloque HTML.
EOD;
file_put_contents('ejemplo.php', $cadena);

$gestor = @fopen("ejemplo.php", "r");
if ($gestor) {
while (!feof($gestor)) {
        $buffer = fgetss($gestor, 4096);
echo $buffer;
    }
    fclose($gestor);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

¡Bienvenido! Hoy es el de .

Texto fuera del bloque HTML.

### Notas

**Nota**:
Si PHP no reconoce correctamente los finales de línea al leer archivos que han sido creados o leídos en
un Macintosh, la activación de la opción de configuración
[auto_detect_line_endings](#ini.auto-detect-line-endings) puede resolver el problema.

### Ver también

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [strip_tags()](#function.strip-tags) - Elimina las etiquetas HTML y PHP de un string

# file

(PHP 4, PHP 5, PHP 7, PHP 8)

file — Lee el fichero y devuelve el resultado en un array

### Descripción

**file**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Lee el fichero y devuelve el resultado en un array.

**Nota**:

    Puede utilizarse la función [file_get_contents()](#function.file-get-contents)
    para devolver el contenido de un fichero en un [string](#language.types.string).

### Parámetros

     filename


       Ruta de acceso al fichero.



      **Sugerencia**

Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

     flags


       El argumento opcional flags puede ser
       una o más de las siguientes constantes:





          **[FILE_USE_INCLUDE_PATH](#constant.file-use-include-path)**



           Busca el fichero en el [include_path](#ini.include-path).





          **[FILE_IGNORE_NEW_LINES](#constant.file-ignore-new-lines)**



           No añade nueva línea al final de cada elemento del array.





          **[FILE_SKIP_EMPTY_LINES](#constant.file-skip-empty-lines)**



           Ignora las líneas vacías.





          **[FILE_NO_DEFAULT_CONTEXT](#constant.file-no-default-context)**



           No utiliza el contexto por omisión.








     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Devuelve el fichero en un array.
Cada elemento del array corresponde a una línea del fichero,
y los retornos de carro se colocan al final de la línea. Si ocurre un error,
**file()** devolverá **[false](#constant.false)**.

**Nota**:

    Cada línea del array resultante incluirá un final de línea, a menos
    que se utilice **[FILE_IGNORE_NEW_LINES](#constant.file-ignore-new-lines)**.

**Nota**:
Si PHP no reconoce correctamente los finales de línea al leer archivos que han sido creados o leídos en
un Macintosh, la activación de la opción de configuración
[auto_detect_line_endings](#ini.auto-detect-line-endings) puede resolver el problema.

### Errores/Excepciones

A partir de PHP 8.3.0, se lanza una excepción [ValueError](#class.valueerror)
si el flags contiene valores inválidos,
como **[FILE_APPEND](#constant.file-append)**.

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el fichero
no existe.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Se lanza una excepción [ValueError](#class.valueerror) para
       cualquier valor inválido del flags.



### Ejemplos

    **Ejemplo #1 Ejemplo con file()**

&lt;?php
// Lee una página web en un array.
$lines = file('http://www.example.com/');

// Muestra todas las líneas del array como código HTML, con los números de línea
foreach ($lines as $line_num =&gt; $line) {
    echo "Line #&lt;b&gt;{$line_num}&lt;/b&gt; : " . htmlspecialchars($line) . "&lt;br /&gt;\n";
}

// Uso de flag
$trimmed = file('somefile.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?&gt;

### Notas

**Advertencia**
Cuando SSL es utilizado, el servidor IIS de Microsoft violará el protocolo al cerrar la conexión sin
enviar un indicador close_notify. PHP lo reportará como "SSL: Fatal Protocol Error"
cuando se llegue al final de los datos. Para evitar esto, el nivel de la directiva
[error_reporting](#ini.error-reporting) debe ser bajado para no incluir los avisos.
PHP puede detectar automáticamente los servidores IIS defectuosos al abrir
el flujo utilizando https:// y suprimirá el aviso.
Al utilizar [fsockopen()](#function.fsockopen) para crear un socket ssl://,
es responsabilidad del desarrollador detectar y suprimir el aviso.

### Ver también

    - [file_get_contents()](#function.file-get-contents) - Lee todo un fichero en una cadena

    - [readfile()](#function.readfile) - Muestra un fichero

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [include](#function.include) - include

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

# file_exists

(PHP 4, PHP 5, PHP 7, PHP 8)

file_exists — Verifica si un fichero o un directorio existe

### Descripción

**file_exists**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Verifica si un fichero o un directorio existe.

### Parámetros

     filename


       Ruta de acceso al fichero o directorio.




       En Windows, utilice el formato de ruta
       //computername/share/filename o
       \\\\computername\share\filename para verificar que un
       fichero está disponible en el recurso compartido.





### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero o directorio especificado
por el argumento filename existe; **[false](#constant.false)** en caso contrario.

**Nota**:

    Devuelve **[false](#constant.false)** para los enlaces simbólicos que apuntan a un fichero
    que no existe.

**Nota**:

    La verificación se realiza utilizando el UID/GID real en lugar del efectivo.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Prueba la existencia de un fichero**

&lt;?php
$filename = '/path/to/foo.txt';

if (file_exists($filename)) {
echo "El fichero $filename existe.";
} else {
echo "El fichero $filename no existe.";
}
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [is_readable()](#function.is-readable) - Indica si un fichero existe y es accesible en lectura

    - [is_writable()](#function.is-writable) - Indica si un fichero es accesible en escritura

    - [is_file()](#function.is-file) - Indica si el fichero es un fichero verdadero

    - [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

    - [SplFileInfo](#class.splfileinfo)

# file_get_contents

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

file_get_contents — Lee todo un fichero en una cadena

### Descripción

**file_get_contents**(
    [string](#language.types.string) $filename,
    [bool](#language.types.boolean) $use_include_path = **[false](#constant.false)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

Similar a la función [file()](#function.file), excepto que
**file_get_contents()** devuelve el fichero
filename en una cadena, comenzando
desde la posición offset y hasta
length bytes.
En caso de error, **file_get_contents()** devuelve
**[false](#constant.false)**.

**file_get_contents()** es el método recomendado para leer
el contenido de un fichero en una [string](#language.types.string). Utilizará un buffer en
memoria si este mecanismo es soportado por el sistema, con el fin de mejorar
el rendimiento.

**Nota**:

    Si se abre una URI con caracteres especiales, como espacios, es necesario
    codificar esta URI con la función [urlencode()](#function.urlencode).

### Parámetros

     filename


       Nombre del fichero a leer.






     use_include_path

      **Nota**:



        La constante **[FILE_USE_INCLUDE_PATH](#constant.file-use-include-path)**
        puede ser utilizada para activar la búsqueda en el
        [ruta de inclusión](#ini.include-path).
        Esto no es posible si [strict typing](#language.types.declarations.strict)
        está activado, ya que **[FILE_USE_INCLUDE_PATH](#constant.file-use-include-path)** es un
        [int](#language.types.integer). Utilice **[true](#constant.true)** en su lugar.







     context


       Un recurso de contexto válido, creado con la función
       [stream_context_create()](#function.stream-context-create). Si no es necesario
       utilizar un contexto específico, este parámetro puede ser omitido
       asignándole el valor **[null](#constant.null)**.






     offset


       La posición desde la cual se comienza a leer en el flujo original.
       Una posición negativa cuenta desde el final del flujo.




       El desplazamiento en el fichero (offset) no es
       soportado en ficheros remotos. Si se intenta desplazarse en un fichero
       que no es local puede funcionar en pequeños desplazamientos, pero el
       comportamiento puede no ser el esperado ya que el proceso utiliza el
       flujo del buffer.






     length


       El tamaño máximo de datos a leer. El comportamiento por defecto es leer
       hasta el final del fichero. Este parámetro se aplica al flujo procesado
       por los filtros.





### Valores devueltos

Devuelve los datos leídos o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Genera una advertencia de tipo **[E_WARNING](#constant.e-warning)** si,
filename no puede ser encontrado, si el
parámetro length es menor que cero,
o si el desplazamiento a la posición offset
especificado en el flujo falla.

Cuando **file_get_contents()** es llamado sobre un directorio,
se genera un error de nivel **[E_WARNING](#constant.e-warning)** en Windows,
y a partir de PHP 7.4 en otros sistemas operativos también.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        length ahora es nullable.




       7.1.0

        Se añade soporte para posiciones offset negativas.





### Ejemplos

    **Ejemplo #1 Lee y muestra el código HTML de un sitio web**

&lt;?php
$homepage = file_get_contents('http://www.example.com/');
echo $homepage;
?&gt;

    **Ejemplo #2 Busca un fichero en el include_path**

&lt;?php
// Si el tipado estricto está activado c.à.d. declare(strict_types=1);
$file = file_get_contents('./people.txt', true);
// De lo contrario
$file = file_get_contents('./people.txt', FILE_USE_INCLUDE_PATH);
?&gt;

    **Ejemplo #3 Lee una sección de un fichero**

&lt;?php
// Lee 14 caracteres a partir del 21º carácter
$section = file_get_contents('./people.txt', FALSE, NULL, 20, 14);
var_dump($section);
?&gt;

    Resultado del ejemplo anterior es similar a:

string(14) "lle Bjori Ro"

    **Ejemplo #4 Uso de contextos de flujo**

&lt;?php
// Creación de un flujo
$opts = [
'http'=&gt; [
'method'=&gt;"GET",
'header'=&gt;"Accept-language: en\r\n" .
"Cookie: foo=bar\r\n",
]
];

$context = stream_context_create($opts);

// Acceso a un fichero HTTP con los encabezados HTTP indicados arriba
$file = file_get_contents('http://www.example.com/', false, $context);
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

**Advertencia**
Cuando SSL es utilizado, el servidor IIS de Microsoft violará el protocolo al cerrar la conexión sin
enviar un indicador close_notify. PHP lo reportará como "SSL: Fatal Protocol Error"
cuando se llegue al final de los datos. Para evitar esto, el nivel de la directiva
[error_reporting](#ini.error-reporting) debe ser bajado para no incluir los avisos.
PHP puede detectar automáticamente los servidores IIS defectuosos al abrir
el flujo utilizando https:// y suprimirá el aviso.
Al utilizar [fsockopen()](#function.fsockopen) para crear un socket ssl://,
es responsabilidad del desarrollador detectar y suprimir el aviso.

### Ver también

    - [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [readfile()](#function.readfile) - Muestra un fichero

    - [file_put_contents()](#function.file-put-contents) - Escribe datos en un fichero

    - [stream_get_contents()](#function.stream-get-contents) - Lee todo un flujo en un string

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [$http_response_header](#reserved.variables.httpresponseheader)

# file_put_contents

(PHP 5, PHP 7, PHP 8)

file_put_contents — Escribe datos en un fichero

### Descripción

**file_put_contents**(
    [string](#language.types.string) $filename,
    [mixed](#language.types.mixed) $data,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Equivale a llamar a las funciones [fopen()](#function.fopen),
[fwrite()](#function.fwrite) y [fclose()](#function.fclose)
sucesivamente.

Si el fichero filename no existe, será creado.
De lo contrario, el fichero existente será sobrescrito, a menos que
la opción **[FILE_APPEND](#constant.file-append)** esté definida.

### Parámetros

     filename


       Ruta de acceso al fichero en el que se deben escribir los datos.






     data


       Los datos a escribir. Puede ser un string, un array o un recurso de flujo (explicación más abajo).




       Si data es un recurso de tipo stream,
       el buffer restante de este flujo será copiado al fichero especificado.
       Esto equivale a utilizar la función [stream_copy_to_stream()](#function.stream-copy-to-stream).




       Asimismo, puede especificarse el argumento data
       como un array de una sola dimensión. Esto equivale a
       file_put_contents($filename, implode('', $array)).






     flags


       El valor del argumento flags puede ser cualquier
       combinación de los siguientes flags, unidos por el operador OR binario
       (|).







        <caption>**Flags disponibles**</caption>



           Flag
           Descripción







            **[FILE_USE_INCLUDE_PATH](#constant.file-use-include-path)**


            Busca el fichero filename en el directorio de inclusión.
            Ver [include_path](#ini.include-path)
            para más información.





            **[FILE_APPEND](#constant.file-append)**


            Si el fichero filename ya existe,
            esta opción permite añadir los datos al fichero en lugar de sobrescribirlo.





            **[LOCK_EX](#constant.lock-ex)**


            Adquiere un bloqueo exclusivo sobre el fichero durante la operación
            de escritura. En otras palabras, se realiza una llamada a la función
            [flock()](#function.flock) entre la llamada a la función
            [fopen()](#function.fopen) y la llamada a la función
            [fwrite()](#function.fwrite). Este comportamiento no es idéntico a
            una llamada a la función [fopen()](#function.fopen) con el modo "x".











     context


       Un recurso de contexto válido creado con la función
       [stream_context_create()](#function.stream-context-create).





### Valores devueltos

Devuelve el número de bytes que han sido escritos al fichero, o **[false](#constant.false)**
si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ejemplos

    **Ejemplo #1 Uso simple de file_put_contents**

&lt;?php
$file = 'people.txt';
// Abre un fichero para leer un contenido existente
$current = file_get_contents($file);
// Añade una persona
$current .= "Jean Dupond\n";
// Escribe el resultado en el fichero
file_put_contents($file, $current);
?&gt;

    **Ejemplo #2 Uso de opciones para file_put_contents**

&lt;?php
$file = 'people.txt';
// Una nueva persona a añadir
$person = "Jean Dupond\n";
// Escribe el contenido en el fichero, utilizando el flag
// FILE_APPEND para añadir al final del fichero y
// LOCK_EX para evitar que otros escriban en el fichero
// al mismo tiempo
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [file_get_contents()](#function.file-get-contents) - Lee todo un fichero en una cadena

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

# fileatime

(PHP 4, PHP 5, PHP 7, PHP 8)

fileatime — Devuelve la fecha en la que el fichero fue accedido por última vez

### Descripción

**fileatime**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la fecha en la que el fichero fue accedido por última vez.

### Parámetros

     filename


       Ruta hacia el fichero.





### Valores devueltos

Devuelve la fecha en la que el fichero fue accedido por última vez
o **[false](#constant.false)** si ocurre un error. La fecha se devuelve en formato timestamp
Unix.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con fileatime()**

&lt;?php

// Muestra: somefile.txt fue accedido el: December 29 2002 22:16:23.

$filename = 'somefile.txt';
if (file_exists($filename)) {
echo "$filename fue accedido el: " . date("F d Y H:i:s.", fileatime($filename));
}

?&gt;

### Notas

**Nota**:

    La fecha de última modificación de un fichero se supone que cambia
    cada vez que los bloques de datos del fichero comienzan
    a ser leídos. Esto puede ser muy costoso en términos de rendimiento cuando una
    aplicación accede regularmente a muchos ficheros o directorios.




    La mayoría de los sistemas de archivos Unix pueden ser montados con
    esta información desactivada para aumentar el rendimiento de una aplicación de este tipo; los nuevos USENET son un buen ejemplo.
    En tales sistemas de archivos, esta función se vuelve totalmente inútil.

**Nota**:

Tenga en cuenta que la precisión temporal puede variar según el sistema de archivos utilizado.

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [filemtime()](#function.filemtime) - Lee la fecha de última modificación del fichero

    - [fileinode()](#function.fileinode) - Lee el número de inodo del fichero

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

# filectime

(PHP 4, PHP 5, PHP 7, PHP 8)

filectime — Devuelve la fecha de última modificación del inodo de un fichero

### Descripción

**filectime**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la fecha de última modificación del inodo de un fichero.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve la fecha en la que el inodo fue modificado por
última vez o **[false](#constant.false)** si ocurre un error. La hora
se devuelve en formato timestamp Unix.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con filectime()**

&lt;?php

// Muestra: somefile.txt fue modificado el: December 29 2002 22:16:23.

$filename = 'somefile.txt';
if (file_exists($filename)) {
echo "$filename fue modificado el: " . date("F d Y H:i:s.", filectime($filename));
}

?&gt;

### Notas

**Nota**:

    En la mayoría de servidores UNIX, un fichero se considera
    modificado si los datos de su inodo son modificados.
    Es decir, cuando los permisos (de usuario, grupo u otros) han
    sido modificados. Véase también [filemtime()](#function.filemtime)
    (que puede ser utilizado cuando se creen indicaciones
    como "Última modificación: " en las páginas web) y
    [fileatime()](#function.fileatime).

**Nota**:

    Tenga en cuenta que en algunos sistemas UNIX, el ctime
    de un fichero de texto es considerado como su fecha de creación. ¡Esto es falso!
    No existe una fecha de creación de fichero en la mayoría
    de los sistemas UNIX.

**Nota**:

Tenga en cuenta que la precisión temporal puede variar según el sistema de archivos utilizado.

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [filemtime()](#function.filemtime) - Lee la fecha de última modificación del fichero

# filegroup

(PHP 4, PHP 5, PHP 7, PHP 8)

filegroup — Leer el nombre del grupo

### Descripción

**filegroup**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Lee el nombre del grupo. El identificador de grupo se devuelve en formato numérico, utilice
[posix_getgrgid()](#function.posix-getgrgid) para recuperar el nombre del grupo.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el grupo que posee el fichero
filename, o **[false](#constant.false)** si ocurre un error.
El identificador de grupo se devuelve en formato numérico, utilice
[posix_getgrgid()](#function.posix-getgrgid) para recuperar el nombre del grupo.
En caso de error, se devuelve **[false](#constant.false)**.

### Errores/Excepciones

Si ocurre un error, se emitirá una advertencia de tipo
**[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Buscar el grupo de un fichero**

&lt;?php
$filename = 'index.php';
print_r(posix_getgrgid(filegroup($filename)));
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [fileowner()](#function.fileowner) - Lee el identificador del propietario de un fichero

    - [posix_getgrgid()](#function.posix-getgrgid) - Devolver información sobre un grupo mediante un id de grupo

# fileinode

(PHP 4, PHP 5, PHP 7, PHP 8)

fileinode — Lee el número de inodo del fichero

### Descripción

**fileinode**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Lee el número de inodo del fichero.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el número de inodo del fichero, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Comparación del inodo de un fichero con el fichero actual**

&lt;?php
$filename = 'index.php';
if (getmyinode() == fileinode($filename)) {
echo 'Se verifica el fichero actual.';
}
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [getmyinode()](#function.getmyinode) - Devuelve el inodo del script

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# filemtime

(PHP 4, PHP 5, PHP 7, PHP 8)

filemtime — Lee la fecha de última modificación del fichero

### Descripción

**filemtime**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Lee la fecha en la que el fichero fue modificado por última vez.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el timestamp Unix de última modificación del fichero
filename o **[false](#constant.false)** si ocurre un error.
Utilice [date()](#function.date) sobre este resultado para obtener
una fecha de modificación legible por humanos.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con filemtime()**

&lt;?php
// Mostrará: somefile.txt fue modificado el: December 29 2002 22:16:23.

$filename = 'somefile.txt';
if (file_exists($filename)) {
echo "$filename fue modificado el: " . date ("F d Y H:i:s.", filemtime($filename));
}
?&gt;

### Notas

**Nota**:

Tenga en cuenta que la precisión temporal puede variar según el sistema de archivos utilizado.

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [filectime()](#function.filectime) - Devuelve la fecha de última modificación del inodo de un fichero

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - [touch()](#function.touch) - Modifica la fecha de modificación y de último acceso de un fichero

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

# fileowner

(PHP 4, PHP 5, PHP 7, PHP 8)

fileowner — Lee el identificador del propietario de un fichero

### Descripción

**fileowner**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Lee el identificador del propietario de un fichero.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el identificador del propietario del fichero
filename, o **[false](#constant.false)** si ocurre un error.
El identificador del propietario es numérico: es necesario utilizar
[posix_getpwuid()](#function.posix-getpwuid) para obtener el nombre de usuario.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Búsqueda del propietario de un fichero**

&lt;?php
$filename = 'index.php';
print_r(posix_getpwuid(fileowner($filename)));
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [filegroup()](#function.filegroup) - Leer el nombre del grupo

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - [posix_getpwuid()](#function.posix-getpwuid) - Devolver información sobre un usuario mediante su id de usuario

# fileperms

(PHP 4, PHP 5, PHP 7, PHP 8)

fileperms — Lee los permisos de un fichero

### Descripción

**fileperms**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Lee los permisos del fichero dado.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve los permisos del fichero en formato numérico. Los bits de menor peso
son los mismos que los de los permisos en [chmod()](#function.chmod),
sin embargo algunas plataformas incluyen en el retorno información sobre
el tipo de fichero dado en filename. Los ejemplos
siguientes muestran cómo probar el valor de retorno en cuanto a los
permisos y el tipo de fichero en sistemas POSIX como Linux o macOS.

Para ficheros locales, se utiliza el valor específico st_mode
de la estructura C devuelta por la función [stat()](#function.stat). Los bits
afectados pueden cambiar según la plataforma y se debe investigar al respecto
si se deben analizar los bits que no concernen a la permisión.

Devuelve **[false](#constant.false)** en caso de error.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Mostrar los permisos en valor octal**

&lt;?php
echo substr(sprintf('%o', fileperms('/tmp')), -4);
echo substr(sprintf('%o', fileperms('/etc/passwd')), -4);
?&gt;

    El ejemplo anterior mostrará:

1777
0644

    **Ejemplo #2 Mostrar todos los permisos**

&lt;?php
$perms = fileperms('/etc/passwd');

switch ($perms &amp; 0xF000) {
case 0xC000: // Socket
$info = 's';
break;
case 0xA000: // Enlace simbólico
$info = 'l';
break;
case 0x8000: // Regular
$info = 'r';
break;
case 0x6000: // Especial de bloque
$info = 'b';
break;
case 0x4000: // Directorio
$info = 'd';
break;
case 0x2000: // Especial de carácter
$info = 'c';
break;
case 0x1000: // Pipe FIFO
$info = 'p';
break;
default: // Desconocido
$info = 'u';
}

// Propietario
$info .= (($perms &amp; 0x0100) ? 'r' : '-');
$info .= (($perms &amp; 0x0080) ? 'w' : '-');
$info .= (($perms &amp; 0x0040) ?
(($perms &amp; 0x0800) ? 's' : 'x' ) :
            (($perms &amp; 0x0800) ? 'S' : '-'));

// Grupo
$info .= (($perms &amp; 0x0020) ? 'r' : '-');
$info .= (($perms &amp; 0x0010) ? 'w' : '-');
$info .= (($perms &amp; 0x0008) ?
(($perms &amp; 0x0400) ? 's' : 'x' ) :
            (($perms &amp; 0x0400) ? 'S' : '-'));

// Todos
$info .= (($perms &amp; 0x0004) ? 'r' : '-');
$info .= (($perms &amp; 0x0002) ? 'w' : '-');
$info .= (($perms &amp; 0x0001) ?
(($perms &amp; 0x0200) ? 't' : 'x' ) :
            (($perms &amp; 0x0200) ? 'T' : '-'));

echo $info;
?&gt;

    El ejemplo anterior mostrará:

-rw-r--r--

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [chmod()](#function.chmod) - Cambia el modo del fichero

    - [is_readable()](#function.is-readable) - Indica si un fichero existe y es accesible en lectura

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# filesize

(PHP 4, PHP 5, PHP 7, PHP 8)

filesize — Obtiene el tamaño de un fichero

### Descripción

**filesize**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el tamaño del fichero especificado.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el tamaño del fichero
filename en bytes, o **[false](#constant.false)** (y genera
un error de nivel **[E_WARNING](#constant.e-warning)**) en caso de error.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con filesize()**

&lt;?php

// Muestra por ejemplo: somefile.txt: 1024 bytes

$filename = 'somefile.txt';
echo $filename . ': ' . filesize($filename) . ' bytes';

?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [file_exists()](#function.file-exists) - Verifica si un fichero o un directorio existe

# filetype

(PHP 4, PHP 5, PHP 7, PHP 8)

filetype — Devuelve el tipo de fichero

### Descripción

**filetype**([string](#language.types.string) $filename): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el tipo de un fichero dado.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve el tipo del fichero. Las respuestas posibles son :
fifo, char, dir,
block, link, file
socket y unknown.

Devuelve **[false](#constant.false)** en caso de error.
**filetype()** también emite un error
**[E_NOTICE](#constant.e-notice)** si el llamado a stat falla,
o si el tipo de fichero es desconocido.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con filetype()**

&lt;?php

echo filetype('/etc/passwd');
echo "\n";
echo filetype('/etc/');
?&gt;

    El ejemplo anterior mostrará:

file
dir

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [is_file()](#function.is-file) - Indica si el fichero es un fichero verdadero

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

    - [file_exists()](#function.file-exists) - Verifica si un fichero o un directorio existe

    - [mime_content_type()](#function.mime-content-type) - Detecta el tipo de contenido de un fichero

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# flock

(PHP 4, PHP 5, PHP 7, PHP 8)

flock — Bloquea el fichero

### Descripción

**flock**([resource](#language.types.resource) $stream, [int](#language.types.integer) $operation, [int](#language.types.integer) &amp;$would_block = **[null](#constant.null)**): [bool](#language.types.boolean)

**flock()** permite realizar un sistema simple de
bloqueos de escritura/lectura, que puede ser utilizado en
cualquier plataforma (incluyendo Unix y Windows).

El bloqueo también se libera con [fclose()](#function.fclose),
o cuando stream es recogido por el recolector de basura.

PHP dispone de un sistema completo de bloqueo de ficheros.
Todos los programas que accedan al fichero deben utilizar la
misma metodología de bloqueo para que sea efectivo. Por
omisión, esta función se bloqueará hasta que el bloqueo solicitado
sea adquirido; este comportamiento puede ser controlado con la opción **[LOCK_NB](#constant.lock-nb)**
cuya documentación se encuentra a continuación.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

     operation


       operation puede tomar uno de los siguientes valores:



        -

          **[LOCK_SH](#constant.lock-sh)** para adquirir un bloqueo compartido (lectura).



        -

          **[LOCK_EX](#constant.lock-ex)** para adquirir un bloqueo exclusivo (escritura).



        -

          **[LOCK_UN](#constant.lock-un)** para liberar un bloqueo (compartido o exclusivo).






       Asimismo, es posible añadir **[LOCK_NB](#constant.lock-nb)**
       como máscara de una de las operaciones anteriores si no
       se desea que la función **flock()** se bloquee durante
       el bloqueo.






     would_block


       Este tercer argumento opcional se establece a 1 si el bloqueo
       debe bloquear el script (condición de error EWOULDBLOCK).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con flock()**

&lt;?php

$fp = fopen("/tmp/lock.txt", "r+");

if (flock($fp, LOCK_EX)) { // adquiere un bloqueo exclusivo
    ftruncate($fp, 0); // borrado del contenido
fwrite($fp, "Escribir en un fichero\n");
    fflush($fp); // libera el contenido antes de quitar el bloqueo
flock($fp, LOCK_UN); // Quita el bloqueo
} else {
echo "¡Imposible bloquear el fichero!";
}

fclose($fp);

?&gt;

    **Ejemplo #2 Ejemplo con flock()** utilizando la opción **[LOCK_NB](#constant.lock-nb)**

&lt;?php
$fp = fopen('/tmp/lock.txt', 'r+');

/_ Activación de la opción LOCK_NB durante una operación LOCK_EX _/
if(!flock($fp, LOCK_EX | LOCK_NB)) {
echo 'Imposible obtener el bloqueo';
exit(-1);
}

/_ ... _/

fclose($fp);
?&gt;

### Notas

**Nota**:

    **flock()** utiliza bloqueos obligatorios bajo Windows, que también son
    soportados en Linux y sistemas derivados de System V mediante la llamada
    al sistema fcntl(): si el fichero en cuestión tiene el bit setgid activado y el bit
    de grupo vacío. En Linux, el sistema de ficheros deberá ser montado con la opción
    mand para que esto funcione.

**Nota**:

    Al requerir un puntero de fichero, **flock()**
    puede ser necesario utilizar un bloqueo especial para proteger el acceso al fichero
    que se desea truncar al abrirlo en modo escritura (con "w" o "w+"
    como argumento de [fopen()](#function.fopen)).

**Nota**:

    Debería ser utilizado únicamente en recursos provenientes de [fopen()](#function.fopen)
    para ficheros locales o mediante el gestor de flujos personalizado definiendo
    [streamWrapper::stream_lock()](#streamwrapper.stream-lock).

**Advertencia**

    Asignar otro valor al argumento stream
    en este código liberará el bloqueo.

**Advertencia**

    En ciertos sistemas operativos, **flock()** está implementado
    a nivel de proceso. Al utilizar una API multihilo, puede que no se pueda
    confiar en **flock()** para proteger ficheros contra otros
    scripts PHP que funcionen en paralelo en otros hilos del mismo servidor.




    **flock()** no es soportado en sistemas de ficheros antiguos
    como FAT y sus derivados, y siempre devolverá
    **[false](#constant.false)** en estos entornos.

**Nota**:

    En Windows, si el procedimiento de bloqueo abre un fichero por segunda vez,
    no puede acceder al fichero a través de este gestor hasta que
    el fichero sea desbloqueado.

# fnmatch

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

fnmatch — Prueba un nombre de fichero mediante un patrón de búsqueda

### Descripción

**fnmatch**([string](#language.types.string) $pattern, [string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

**fnmatch()** verifica si la cadena filename
cumple con el patrón de shell pattern.

### Parámetros

     pattern


       El pattern a comparar. Habitualmente, el pattern contendrá
       caracteres genéricos como '?' y '*'.



       <caption>**
        Caracteres genéricos a utilizar en el parámetro pattern
       **</caption>



          Carácter genérico
          Descripción







           ?


           El signo de interrogación coincidirá con cualquier carácter único.
           Por ejemplo, el patrón "file?.txt" coincidirá con "file1.txt" y
           "fileA.txt", pero no coincidirá con "file10.txt".





           *


           El asterisco coincidirá con cero o más caracteres.
           Por ejemplo, el patrón "foo*.xml" coincidirá con "foo.xml" y
           "foobar.xml".





           [ ]


           Los corchetes se utilizan para crear rangos de puntos de código ASCII o conjuntos de caracteres.
           Por ejemplo, el patrón "index.php[45]" coincidirá con "index.php4" y
           "index.php5", pero no coincidirá con "index.phpt".
           Rangos conocidos son [0-9], [a-z] y [A-Z].
           Varios conjuntos y rangos pueden utilizarse simultáneamente, por ejemplo [0-9a-zABC].





           !


           El signo de exclamación se utiliza para negar caracteres dentro de los corchetes.
           Por ejemplo, "[!A-Z]*.html" coincidirá con "demo.html", pero no coincidirá con
           "Demo.html".





           \


           La barra invertida se utiliza para escapar caracteres especiales.
           Por ejemplo, "Name\?" coincidirá con "Name?", pero no coincidirá con
           "Names".











    filename


      La cadena a probar. Esta función es particularmente útil para los
      nombres de fichero, pero también puede utilizarse con cadenas
      regulares.




      El usuario medio de Shell puede estar familiarizado con los patrones de Shell,
      o al menos, sus expresiones más simples, como '?' y
      '*'. De esta manera, utilizar
      **fnmatch()** en lugar de
      [preg_match()](#function.preg-match) para búsquedas puede ser más
      práctico para los no iniciados.






    flags


      El valor de flags puede ser una combinación
      de los siguientes flags, unidos con el
      [operador binario OR (|)](#language.operators.bitwise).



       <caption>**
        Lista de flags posibles para fnmatch()**
       </caption>



          Flag
          Descripción






          **[FNM_NOESCAPE](#constant.fnm-noescape)**

           Desactiva el escape de las barras invertidas.




          **[FNM_PATHNAME](#constant.fnm-pathname)**

           Una barra diagonal en una cadena coincide únicamente con una barra diagonal
           en el patrón proporcionado.




          **[FNM_PERIOD](#constant.fnm-period)**

           Un punto al inicio de la cadena debe coincidir exactamente con
           un punto en el patrón proporcionado.




          **[FNM_CASEFOLD](#constant.fnm-casefold)**

           Las coincidencias no distinguen mayúsculas y minúsculas. Forma parte
           de la extensión GNU.









### Valores devueltos

Devuelve **[true](#constant.true)** si hay resultados, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Verificar el nombre de un color con un patrón de Shell**

&lt;?php
if (fnmatch("\*gr[ae]y", $color)) {
echo "formas de gris ...";
}
?&gt;

### Notas

**Advertencia**

    Actualmente, esta función no está disponible para
    sistemas no-POSIX, a excepción de Windows.

### Ver también

    - [glob()](#function.glob) - Búsqueda de rutas que coinciden con un patrón

    - [preg_match()](#function.preg-match) - Realiza una búsqueda de coincidencia con una expresión regular estándar

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

# fopen

(PHP 4, PHP 5, PHP 7, PHP 8)

fopen — Abre un fichero o un URL

### Descripción

**fopen**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $mode,
    [bool](#language.types.boolean) $use_include_path = **[false](#constant.false)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

**fopen()** asocia un recurso con nombre, especificado por
filename, a un flujo.

### Parámetros

     filename


       Si filename está en la forma "esquema://...", se
       asume que será un URL y PHP buscará un gestor de protocolos
       (también conocido como envoltura) para ese protocolo. Si no está registrada
       ninguna envoltura para ese protocolo, PHP emitirá un aviso para ayudar a rastrear
       problemas potenciales en el script y continuará como si
       filename especificara un fichero normal.




       Si PHP ha decidido que filename especifica
       un fichero local, intentará abrir un flujo para ese fichero.
       El fichero debe ser accesible para PHP, por lo que es necesario asegurarse de que
       los permisos de acceso del fichero permiten este acceso.
       Si está habilitado
       [open_basedir](#ini.open-basedir) se pueden aplicar
       más restricciones.




       Si PHP ha decidido que filename especifica
       un protocolo registrado, y ese protocolo está registrado como un
       URL de red, PHP se asegurará de que
       [allow_url_fopen](#ini.allow-url-fopen) está
       habilitado. Si es desactivado, PHP emitirá un aviso y
       la llamada a fopen fallará.



      **Nota**:



        La lista de protocolos soportados se puede encontrar en [Protocolos y Envolturas soportados](#wrappers). Algunos protocolos (también descritos como
        envolturas) soportan contexto
        y/u opciones de php.ini. Consulte la página específica del protocolo
        en uso para una lista de opciones que se pueden establecer. (p.ej.
        el valor user_agent en php.ini usado por la
        envoltura http).





       En la plataforma Windows, asegúrese de escapar cualquier barra invertida
       usada en la ruta de fichero, o use barras hacia delante.





&lt;?php
$handle = fopen("c:\\folder\\resource.txt", "r");
?&gt;

     mode


       El parámetro mode especifica el tipo de acceso
       que se necesita para el flujo. Puede ser cualquiera de los siguientes:



        <caption>**
         Una lista de los modos posibles de fopen()**
         usando mode
        </caption>



           mode
           Descripción






           'r'

            Apertura para sólo lectura; coloca el puntero al fichero al
            principio del fichero.




           'r+'

            Apertura para lectura y escritura; coloca el puntero al fichero al
            principio del fichero.




           'w'

            Apertura para sólo escritura; coloca el puntero al fichero al
            principio del fichero y trunca el fichero a longitud cero.
            Si el fichero no existe se intenta crear.




           'w+'

            Abre para lectura y escritura; de otro modo, tiene
            el mismo comportamiento que 'w'.




           'a'

            Apertura para sólo escritura; coloca el puntero del fichero al
            final del mismo. Si el fichero no existe, se intenta crear.
            En este modo, [fseek()](#function.fseek) no tiene efecto, escribe siempre agregando.




           'a+'

            Apertura para lectura y escritura; coloca el puntero del fichero al
            final del mismo. Si el fichero no existe,
            se intenta crear. En este modo, [fseek()](#function.fseek) solo afecta
            a la posición de lectura, escribe siempre agregando.




           'x'

            Creación y apertura para sólo escritura; coloca el puntero del fichero al
            principio del mismo. Si el fichero ya existe, la
            llamada a **fopen()** fallará devolviendo **[false](#constant.false)** y
            generando un error de nivel **[E_WARNING](#constant.e-warning)**. Si
            el fichero no existe se intenta crear. Esto es equivalente
            a especificar las flags O_EXCL|O_CREAT para la
            llamada al sistema de open(2) subyacente.




           'x+'

            Creación y apertura para lectura y escritura; de otro modo tiene
            el mismo comportamiento que 'x'.




           'c'

            Abre el fichero para sólo escritura. Si el fichero no existe, se
            crea. Si existe no es truncado (a diferencia de
            'w'), ni la llamada a esta función falla (como en
            el caso con 'x'). El puntero al fichero se
            posiciona en el principio del fichero. Esto puede ser útil si
            se desea obtener un bloqueo asistido (véase [flock()](#function.flock))
            antes de intentar modificar el fichero, ya que al usar
            'w' se podría truncar el fichero antes de haber
            obtenido el bloqueo (si se desea truncar el fichero,
            se puede usar [ftruncate()](#function.ftruncate) después de solicitar el
            bloqueo).




           'c+'

            Abre el fichero para lectura y escritura; de otro modo tiene el mismo
            comportamiento que 'c'.




           'e'

            Establece el flag 'close-on-exec' en el descriptor de fichero abierto. Disponible
            solamente en PHP compilado en sistemas compatibles con POSIX.1-2008.




           'n'

            Establecer el flag de no bloqueo en el descriptor de fichero abierto. Disponible
            solamente en PHP compilado en sistemas compatibles con POSIX.1-2008.








      **Nota**:



        Diferentes familias de sistemas operativos tienen diferentes convenciones
        para el final de línea. Cuando escribe un fichero de texto y quiere insertar un salto
        de línea, necesita usar el carácter o caracteres correctos de final de línea para su
        sistema operativo. Los sistemas basados en Unix usan \n como el
        carácter de final de línea, los sistemas basados en Windows usan \r\n
        como caracteres de final de línea y los sistemas basados en Macintosh usan
        \r como carácter de final de línea.




        Si usa los caracteres de final de línea erróneos cuando escribe sus ficheros, se
        podrá encontrar con que otras aplicaciones que abran esos ficheros "parecerán
        raras".




        Windows ofrece un flag de trasnformación en modo texto ('t')
        que transformará de manera transparente \n a
        \r\n cuando se trabaja con el fichero. En contraste, puede
        usar 'b' para forzar el modo binario, lo cual no
        transformará su información. Para usar estas flags, especifique
        'b' o 't' como el último carácter
        del parámetro mode.




        El modo de transformación por omición es 'b'.
        Puede usar el modo 't'
        si está trabajando con ficheros de texto plano y usa
        \n para delimitar los finales de línea es su script, pero
        espera que sus ficheros sean legibles con aplicaciones como versiones antiguas de notepad. Debería
        usar el 'b' en todos los demás casos.




        Si especifica el flag 't' cuando trabaja con archivos binarios,
        puede experimentar problemas extraños con sus datos, incluyendo archivos de imagen rotos
        y problemas extraños con los caracteres \r\n.




      **Nota**:



        Por portabilidad, También se recomienda encarecidamente que
        reescriba el código que usa o se basa en el modo 't'
        para que use las terminaciones de línea correctas y el modo
        'b' en su lugar.




      **Nota**:

        El mode modo es ignorado para php://output,
        php://input, php://stdin,
        php://stdout, php://stderr Y
        envoluturas de flujo php://fd.







     use_include_path


       El tercer parámetro opcional use_include_path
       puede ser establecido a '1' o **[true](#constant.true)** si se desea buscar un fichero también en
       [include_path](#ini.include-path).






     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Devuelve un recurso de puntero a fichero si tiene éxito,
o **[false](#constant.false)** si ocurre un error

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

       Versión
       Descripción






       7.0.16, 7.1.2

        Se añadió la opción 'e'.





### Ejemplos

    **Ejemplo #1 Ejemplos de fopen()**

&lt;?php
$handle = fopen("/home/rasmus/fichero.txt", "r");
$handle = fopen("/home/rasmus/fichero.gif", "wb");
$handle = fopen("http://www.ejemplo.com/", "r");
$handle = fopen("ftp://user:password@example.com/fichero.txt", "w");
?&gt;

### Notas

**Advertencia**
Cuando SSL es utilizado, el servidor IIS de Microsoft violará el protocolo al cerrar la conexión sin
enviar un indicador close_notify. PHP lo reportará como "SSL: Fatal Protocol Error"
cuando se llegue al final de los datos. Para evitar esto, el nivel de la directiva
[error_reporting](#ini.error-reporting) debe ser bajado para no incluir los avisos.
PHP puede detectar automáticamente los servidores IIS defectuosos al abrir
el flujo utilizando https:// y suprimirá el aviso.
Al utilizar [fsockopen()](#function.fsockopen) para crear un socket ssl://,
es responsabilidad del desarrollador detectar y suprimir el aviso.

**Nota**:

    Si está experimentando problemas al leer y escribir ficheros y
    está usando la versión de módulo de servidor de PHP, asegúrese de que
    los ficheros y directorios que está usando sean accesibles por el proceso
    del servidor.

**Nota**:

    Esta función también podría tener éxito cuando filename es un
    directorio. Si no se está seguro de que filename sea un
    fichero o un directorio, podría ser necesario utilzar la función
    [is_dir()](#function.is-dir) antes de llamar a **fopen()**.

### Ver también

    - [Protocolos y Envolturas soportados](#wrappers)

    - [fclose()](#function.fclose) - Cierra un fichero

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

    - [file_exists()](#function.file-exists) - Verifica si un fichero o un directorio existe

    - [is_readable()](#function.is-readable) - Indica si un fichero existe y es accesible en lectura

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [umask()](#function.umask) - Cambia el "umask" actual

    - [SplFileObject](#class.splfileobject)

# fpassthru

(PHP 4, PHP 5, PHP 7, PHP 8)

fpassthru — Muestra el resto del fichero

### Descripción

**fpassthru**([resource](#language.types.resource) $stream): [int](#language.types.integer)

Lee todo el resto de un fichero hasta el final y dirige el resultado
hacia la salida estándar.

Es necesario llamar a la función [rewind()](#function.rewind) para reiniciar
el puntero de fichero al principio si ya se han escrito datos en el
fichero.

Si se desea únicamente copiar el contenido de un fichero en el buffer
de salida, sin modificarlo previamente o colocar el puntero en un lugar
particular, debe utilizarse la función [readfile()](#function.readfile), lo que
evita tener que llamar a la función [fopen()](#function.fopen).

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Devuelve el número de caracteres leídos desde stream
y pasados a la salida estándar.

### Ejemplos

    **Ejemplo #1 Uso de fpassthru()** con un fichero binario

&lt;?php

// abre un fichero en modo binario
$name = './img/ok.png';
$fp = fopen($name, 'rb');

// envía los encabezados correctos
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));

// envía el contenido del fichero, luego detiene el script
fpassthru($fp);
exit;

?&gt;

### Notas

**Nota**:

    Cuando se utiliza la función **fpassthru()** sobre un fichero
    binario en Windows, asegúrese de haber abierto el fichero
    en modo binario añadiendo la letra b al modo
    de acceso utilizado en [fopen()](#function.fopen).




    Se recomienda utilizar la opción b al trabajar con ficheros binarios,
    incluso si el sistema no lo requiere, para garantizar la portabilidad de los scripts.

### Ver también

    - [readfile()](#function.readfile) - Muestra un fichero

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

# fputcsv

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

fputcsv — Formatea una línea en CSV y la escribe en un fichero

### Descripción

**fputcsv**(
    [resource](#language.types.resource) $stream,
    [array](#language.types.array) $fields,
    [string](#language.types.string) $separator = ",",
    [string](#language.types.string) $enclosure = "\"",
    [string](#language.types.string) $escape = "\\",
    [string](#language.types.string) $eol = "\n"
): [int](#language.types.integer)|[false](#language.types.singleton)

**fputcsv()** formatea la línea pasada como
fields (array) como CSV y la escribe
(terminada por un eol) en el stream especificado.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

     fields


       Un array de strings.






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







     eol


       El parámetro opcional eol define una secuencia
       de fin de línea personalizada.





**Advertencia**
When escape is set to anything other than an empty string
("") it can result in CSV that is not compliant with
[» RFC 4180](https://datatracker.ietf.org/doc/html/rfc4180) or unable to survive a roundtrip
through the PHP CSV functions. The default for escape is
"\\" so it is recommended to set it to the empty string explicitly.
The default value will change in a future version of PHP, no earlier than PHP 9.0.

**Nota**:

    Si un carácter enclosure está contenido en un campo,
    será escapado duplicándolo, a menos que esté inmediatamente precedido
    por un escape.

### Valores devueltos

Devuelve el tamaño de la cadena escrita o **[false](#constant.false)** si ocurre un error.

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




       8.1.0

        Se añadió el parámetro opcional eol.




       7.4.0

        El parámetro escape ahora acepta una cadena vacía
        para desactivar el mecanismo de escape propietario.





### Ejemplos

    **Ejemplo #1 Ejemplo con fputcsv()**

&lt;?php

$list = [
['aaa', 'bbb', 'ccc', 'dddd'],
['123', '456', '789'],
['"aaa"', '"bbb"']
];

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
     fputcsv($fp, $fields, ',', '"', '');
}

fclose($fp);
?&gt;

    El ejemplo anterior escribirá lo siguiente en file.csv:

aaa,bbb,ccc,dddd
123,456,789
"""aaa""","""bbb"""

### Ver también

- [fgetcsv()](#function.fgetcsv) - Obtiene una línea desde un puntero de archivo y la analiza para campos CSV

- [str_getcsv()](#function.str-getcsv) - Analiza una string CSV en un array

- [SplFileObject::fgetcsv()](#splfileobject.fgetcsv) - Recupera una línea del archivo y la analiza como datos CSV

- [SplFileObject::fputcsv()](#splfileobject.fputcsv) - Escribe un array en forma de línea CSV

- [SplFileObject::setCsvControl()](#splfileobject.setcsvcontrol) - Define las opciones CSV

- [SplFileObject::getCsvControl()](#splfileobject.getcsvcontrol) - Recupera las opciones para CSV

# fputs

(PHP 4, PHP 5, PHP 7, PHP 8)

fputs — Alias de [fwrite()](#function.fwrite)

### Descripción

Esta función es un alias de:
[fwrite()](#function.fwrite).

# fread

(PHP 4, PHP 5, PHP 7, PHP 8)

fread — Lectura del archivo en modo binario

### Descripción

**fread**([resource](#language.types.resource) $stream, [int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)

**fread()** lee hasta length
bytes en el archivo referenciado por stream.
La lectura se detiene cuando se presenta alguna de las siguientes condiciones:

    -

      length bytes han sido leídos



    -

      se alcanza el final del archivo



    -

      un paquete se vuelve disponible o el tiempo
      [
      socket timeout](#function.socket-set-timeout) ha pasado (para flujos de red)



    -

      si el flujo se lee desde el buffer, y no representa un archivo
      completo, entonces al menos una lectura de un número de bytes equivalente
      al tamaño del bloque (generalmente 8192) se realiza; siguiendo los datos
      del buffer anterior, el tamaño de los datos devueltos puede ser superior
      al tamaño del bloque.


### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

     length


       Tamaño length de bytes a leer.





### Valores devueltos

Devuelve la cadena leída, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con fread()**

&lt;?php
// Lee un archivo y lo coloca en una cadena
$filename = "/usr/local/something.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
?&gt;

    **Ejemplo #2 Ejemplo con fread()** y un archivo binario


    **Advertencia**

      En los sistemas que diferencian los archivos
      de texto y binarios (por ejemplo, Windows) el archivo debe ser
      abierto con la letra 'b' añadida al parámetro
      de modo de la función [fopen()](#function.fopen).


&lt;?php
$filename = "c:\\files\\somepic.gif";
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);
?&gt;

    **Ejemplo #3 Ejemplo con fread()** y un archivo remoto


    **Advertencia**

      Cuando se lee desde cualquier fuente que no sea un archivo local,
      como flujos devueltos al leer
      [archivos remotos](#features.remote-files) o desde
      [popen()](#function.popen) y [fsockopen()](#function.fsockopen), la lectura
      se detiene después de recibir un paquete. Por lo tanto, se deben hacer
      bucles para recolectar los datos por paquete, como se presenta
      a continuación.


&lt;?php
$handle = fopen("http://www.example.com/", "rb");
$contents = stream_get_contents($handle);
fclose($handle);
?&gt;

&lt;?php
$handle = fopen("http://www.example.com/", "rb");
if (FALSE === $handle) {
exit("Fallo al abrir el flujo hacia la URL");
}

$contents = '';

while (!feof($handle)) {
    $contents .= fread($handle, 8192);
}
fclose($handle);
?&gt;

### Notas

**Nota**:

    Si se desea leer el contenido de un archivo en una cadena de
    caracteres, es preferible utilizar [file_get_contents()](#function.file-get-contents)
    que es mucho más rápido que el código anterior.

**Nota**:

    Se observa que la función **fread()** lee la posición
    actual del puntero de archivo. Utilice la función
    [ftell()](#function.ftell) para encontrar la posición actual del puntero
    y la función [rewind()](#function.rewind) para reinicializar la posición del
    puntero.

### Ver también

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [fscanf()](#function.fscanf) - Analiza un archivo según un formato

    - [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

    - [fpassthru()](#function.fpassthru) - Muestra el resto del fichero

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

    - [ftell()](#function.ftell) - Devuelve la posición actual del puntero de archivo

    - [rewind()](#function.rewind) - Reemplaza el puntero de fichero al inicio

    - [unpack()](#function.unpack) - Desempaqueta datos desde una cadena binaria

# fscanf

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

fscanf — Analiza un archivo según un formato

### Descripción

**fscanf**([resource](#language.types.resource) $stream, [string](#language.types.string) $format, [mixed](#language.types.mixed) &amp;...$vars): [array](#language.types.array)|[int](#language.types.integer)|[false](#language.types.singleton)|[null](#language.types.null)

La función **fscanf()** es similar a la función
[sscanf()](#function.sscanf), excepto que toma un archivo como entrada,
representado por el recurso stream e interpreta
la entrada según el formato format especificado.

Todos los caracteres en blanco de la cadena de formato corresponden
a tantos espacios en el flujo de entrada. Esto significa que una tabulación
(\t) en la cadena de formato puede reemplazar
un espacio simple en el flujo de entrada.

Cada llamada a la función **fscanf()** lee una línea del archivo.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

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


       Los valores opcionales a asignar.





### Valores devueltos

Si solo se pasan 2 argumentos a la función, el valor analizado
será devuelto en forma de un array. Si se pasan argumentos opcionales,
la función devolverá el número de valores asignados.
Los argumentos opcionales deben ser pasados por referencia.

Si se esperan más subcadenas en el format
de las disponibles en string,
**[null](#constant.null)** será devuelto. En otros casos de error, **[false](#constant.false)** será devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con fscanf()**

&lt;?php
$handle = fopen("users.txt", "r");
while ($userinfo = fscanf($handle, "%s\t%s\t%s\n")) {
    list ($name, $profession, $countrycode) = $userinfo;
    //... procesamiento de datos
}
fclose($handle);
?&gt;

    **Ejemplo #2 Contenido del archivo users.txt**

javier argonaut pe
hiroshi sculptor jp
robert slacker us
luigi florist it

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [sscanf()](#function.sscanf) - Analiza una cadena utilizando un formato

    - [printf()](#function.printf) - Muestra una string formateada

    - [sprintf()](#function.sprintf) - Devuelve una string formateada

# fseek

(PHP 4, PHP 5, PHP 7, PHP 8)

fseek — Modifica la posición del puntero de archivo

### Descripción

**fseek**([resource](#language.types.resource) $stream, [int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_SET](#constant.seek-set)**): [int](#language.types.integer)

Modifica el cursor de posición en el archivo stream.
La nueva posición, medida en bytes, desde el inicio del archivo,
se obtiene sumando la distancia offset
a la posición whence.

En general, es posible desplazarse más allá del final del flujo (eof); si se
escriben datos en este caso, el espacio entre el final del flujo y
la posición actual será rellenado con bytes nulos. Sin embargo, algunos flujos no soportan
este comportamiento, en particular cuando el espacio de almacenamiento subyacente es de
tamaño fijo.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

     offset


       La posición.




       Para desplazarse a una posición antes del final del archivo,
       debe pasarse un valor negativo en el offset y
       el parámetro whence debe establecerse
       en **[SEEK_END](#constant.seek-end)**.






     whence


       Los valores posibles para whence son :



        - **[SEEK_SET](#constant.seek-set)** - Establecer la posición igual a offset bytes desde el inicio del archivo.

        - **[SEEK_CUR](#constant.seek-cur)** - Establecer la posición en el lugar actual más offset bytes.

        - **[SEEK_END](#constant.seek-end)** - Establecer la posición al final del archivo más offset bytes.





### Valores devueltos

En caso de éxito, devuelve 0;
de lo contrario, devuelve -1.

**Advertencia**

    Esta función ha sido creada para imitar la función del mismo nombre en lenguaje C.
    Tenga en cuenta los valores de retorno, ya que difieren de lo que podría esperarse en PHP.

### Ejemplos

    **Ejemplo #1 Ejemplo con fseek()**

&lt;?php

$fp = fopen('somefile.txt', 'r');

// lee algunos datos
$data = fgets($fp, 4096);

// vuelve al inicio del archivo
// equivalente a rewind($fp);
fseek($fp, 0);

?&gt;

### Notas

**Nota**:

    Si abre el archivo con el modo a o
    a+, todos los datos que escriba en el archivo
    siempre serán añadidos, sin importar la posición en el archivo.

**Nota**:

    No todos los flujos soportan el desplazamiento. Para aquellos que no lo soportan,
    el desplazamiento hacia adelante se realizará leyendo y liberando los bytes; otras formas
    de desplazamiento fallarán.

### Ver también

    - [ftell()](#function.ftell) - Devuelve la posición actual del puntero de archivo

    - [rewind()](#function.rewind) - Reemplaza el puntero de fichero al inicio

# fstat

(PHP 4, PHP 5, PHP 7, PHP 8)

fstat — Lee las informaciones sobre un fichero a partir de un puntero de fichero

### Descripción

**fstat**([resource](#language.types.resource) $stream): [array](#language.types.array)|[false](#language.types.singleton)

Recopila las informaciones sobre el fichero del cual
se conoce el puntero stream. **fstat()**
es similar a la función [stat()](#function.stat), excepto
que utiliza un puntero de fichero, en lugar de un nombre de fichero.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

### Valores devueltos

Devuelve un array que contiene las estadísticas para el fichero;
el formato de este array se describe en detalle en la página de
documentación de la función [stat()](#function.stat).
Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con fstat()**

&lt;?php

// abre un fichero
$fp = fopen("/etc/passwd", "r");

// lee las informaciones
$fstat = fstat($fp);

// cierra el fichero
fclose($fp);

// muestra el resultado
print_r(array_slice($fstat, 13));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[dev] =&gt; 771
[ino] =&gt; 488704
[mode] =&gt; 33188
[nlink] =&gt; 1
[uid] =&gt; 0
[gid] =&gt; 0
[rdev] =&gt; 0
[size] =&gt; 1114
[atime] =&gt; 1061067181
[mtime] =&gt; 1056136526
[ctime] =&gt; 1056136526
[blksize] =&gt; 4096
[blocks] =&gt; 8
)

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

# fsync

(PHP 8 &gt;= 8.1.0)

fsync — Sincroniza los cambios realizados en el fichero (incluyendo los metadatos)

### Descripción

**fsync**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Esta función sincroniza los cambios realizados en el fichero, incluyendo sus metadatos. Es similar a [fflush()](#function.fflush),
pero además solicita al sistema operativo que escriba en el soporte de almacenamiento.

### Parámetros

     stream

      El puntero de archivo debe ser válido y apuntar

a un archivo abierto con éxito por [fopen()](#function.fopen) o
[fsockopen()](#function.fsockopen) (y no cerrado aún por [fclose()](#function.fclose)).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de fsync()**

&lt;?php
$file = 'test.txt';
$stream = fopen($file, 'w');
fwrite($stream, 'test data');
fwrite($stream, "\r\n");
fwrite($stream, 'additional data');
fsync($stream);
fclose($stream);
?&gt;

### Ver también

    - [fdatasync()](#function.fdatasync) - Sincroniza los datos (pero no los metadatos) con el fichero

    - [fflush()](#function.fflush) - Envía todo el contenido generado en un fichero

# ftell

(PHP 4, PHP 5, PHP 7, PHP 8)

ftell — Devuelve la posición actual del puntero de archivo

### Descripción

**ftell**([resource](#language.types.resource) $stream): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la posición actual del puntero de archivo referenciado por stream.

### Parámetros

     stream


       El puntero de archivo debe ser válido y haber sido abierto correctamente
       por [fopen()](#function.fopen) o [popen()](#function.popen).
       **ftell()** proporciona resultados no definidos para los flujos
       "append-only" (abiertos con el flag "a").





### Valores devueltos

Devuelve la posición actual del puntero en el
archivo identificado por el puntero stream
en forma de entero,
es decir, su posición en el flujo del archivo.

Si ocurre un error, la función devolverá **[false](#constant.false)**.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Ejemplos

    **Ejemplo #1 Ejemplo con ftell()**

&lt;?php

// Abre un archivo y lee algunos datos
$fp = fopen("/etc/passwd", "r");
$data = fgets($fp, 12);

// ¿Dónde estamos?
echo ftell($fp); // 11

fclose($fp);

?&gt;

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

    - [rewind()](#function.rewind) - Reemplaza el puntero de fichero al inicio

# ftruncate

(PHP 4, PHP 5, PHP 7, PHP 8)

ftruncate — Tronca un fichero

### Descripción

**ftruncate**([resource](#language.types.resource) $stream, [int](#language.types.integer) $size): [bool](#language.types.boolean)

Se toma el puntero de fichero stream y se
trunca a la longitud de size.

### Parámetros

     stream


       El puntero de fichero.



      **Nota**:



        El puntero stream debe haber sido abierto
        en modo escritura.







     size


       La longitud que debe conservarse.



      **Nota**:



        Si size es mayor que la longitud del fichero,
        este último será extendido con octetos nulos.




        Si size es menor que la longitud del fichero,
        el resto de los datos se perderá.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ftruncate()**

&lt;?php
$filename = 'lorem_ipsum.txt';

$handle = fopen($filename, 'r+');
ftruncate($handle, rand(1, filesize($filename)));
rewind($handle);
echo fread($handle, filesize($filename));
fclose($handle);
?&gt;

### Notas

**Nota**:

    El puntero de fichero no es *modificado*.

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

# fwrite

(PHP 4, PHP 5, PHP 7, PHP 8)

fwrite — Escribe en un fichero en modo binario

### Descripción

**fwrite**([resource](#language.types.resource) $stream, [string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**fwrite()** escribe el contenido de la cadena
data en el fichero apuntado por
stream.

### Parámetros

     stream

      Un puntero del sistema de archivos de tipo [resource](#language.types.resource)

que es habitualmente creado utilizando la función [fopen()](#function.fopen).

     data


       La cadena a escribir.






     length


       Si se proporciona la longitud length,
       la escritura se detendrá después de
       length bytes, o al final de la
       cadena (lo que ocurra primero).





### Valores devueltos

**fwrite()** devuelve el número de bytes escritos o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

La función **fwrite()** emite una **[E_WARNING](#constant.e-warning)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con fwrite()**



     &lt;?php

$filename = 'test.txt';
$somecontent = "Añadiendo cadena al fichero\n";

// Asegurémonos de que el fichero es accesible en escritura
if (is_writable($filename)) {

    // En nuestro ejemplo, abrimos el fichero $filename en modo de añadir
    // El puntero del fichero se coloca al final del fichero
    // es ahí donde $somecontent será colocado
    if (!$fp = fopen($filename, 'a')) {
         echo "No se puede abrir el fichero ($filename)";
         exit;
    }

    // Escribamos algo en nuestro fichero.
    if (fwrite($fp, $somecontent) === FALSE) {
        echo "No se puede escribir en el fichero ($filename)";
        exit;
    }

    echo "La escritura de ($somecontent) en el fichero ($filename) ha tenido éxito";

    fclose($fp);

} else {
echo "El fichero $filename no es accesible en escritura.";
}
?&gt;

### Notas

**Nota**:

    La escritura en un flujo puede terminar antes de que la cadena completa sea
    escrita. El valor devuelto por la función
    **fwrite()** puede ser verificado de la siguiente manera:

&lt;?php
function fwrite_stream($fp, $string) {
    for ($written = 0; $written &lt; strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
return $fwrite;
}
}
return $written;
}
?&gt;

**Nota**:

    En los sistemas que hacen la distinción entre ficheros binarios
    y ficheros de texto (por ejemplo, Windows), el fichero debe ser abierto
    con la opción 'b' incluida en el parámetro de modo de
    [fopen()](#function.fopen).

**Nota**:

    Si stream está abierto en modo añadir (append),
    **fwrite()** será atómico (excepto si el tamaño de
    data excede el tamaño del bloque del sistema de ficheros,
    en algunas plataformas, y siempre que el fichero se encuentre en el sistema de ficheros
    local). Por lo tanto, no es necesario utilizar la función [flock()](#function.flock)
    en un recurso antes de llamar a la función **fwrite()**;
    todos los datos serán escritos sin interrupción.

**Nota**:

    Si se escribe dos veces en el fichero, los datos serán añadidos al final
    del fichero; esto significa que el siguiente ejemplo no dará el resultado
    esperado:



&lt;?php
$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fwrite($fp, '23');
fclose($fp);

// el contenido de 'data.txt' es ahora 123 y no 23 !
?&gt;

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [file_get_contents()](#function.file-get-contents) - Lee todo un fichero en una cadena

    - [pack()](#function.pack) - Compacta datos en una cadena binaria

# glob

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

glob — Búsqueda de rutas que coinciden con un patrón

### Descripción

**glob**([string](#language.types.string) $pattern, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

**glob()** busca todas las rutas que coinciden con
el patrón pattern, siguiendo las reglas utilizadas por
la función glob() de la libc, que son las mismas que las
utilizadas por el Shell en general.

El comportamiento en sistemas Unix y macOS está determinado por
la implementación de glob() del sistema. En Windows, se utiliza una
implementación conforme a la definición POSIX 1003.2 de glob(), con
una extensión para manejar la convención [!...] que permite
negar un rango.

### Parámetros

     pattern


       El patrón. No se realiza sustitución de tilde
       (~) ni de parámetro.




       Caracteres especiales:



        -

          * - Asocia cero o más caracteres.



        -

          ? - Asocia exactamente un carácter (cualquier
          carácter).



        -

          [...] - Asocia un carácter de un conjunto de
          caracteres. Si el primer carácter es !,
          asocia cualquier carácter que no esté en este conjunto.



        -

          {a,b,c} - Asocia una cadena de un grupo de
          cadenas separadas por comas cuando se utiliza el flag
          **[GLOB_BRACE](#constant.glob-brace)**.



        -

          \ - Escapa el carácter siguiente, excepto cuando
          se utiliza el flag **[GLOB_NOESCAPE](#constant.glob-noescape)**.








     flags


       Cualquiera de las constantes **[GLOB_*](#constant.glob-available-flags)**.





### Valores devueltos

Devuelve un array que contiene los ficheros y directorios que coinciden con
el patrón, un array vacío si no hay coincidencias, o **[false](#constant.false)** si ocurre un error.
A menos que se utilice GLOB_NOSORT, los nombres serán ordenados
alfabéticamente.

### Ejemplos

    **Ejemplo #1
     Un método práctico para reemplazar [opendir()](#function.opendir)
     por glob()**

&lt;?php
foreach (glob("\*.txt") as $filename) {
    echo "$filename ocupa " . filesize($filename) . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

funclist.txt ocupa 44686
funcsummary.txt ocupa 267625
quickref.txt ocupa 137820

    **Ejemplo #2
     Ejemplo con un patrón más complejo
    **

&lt;?php
foreach (glob("path/_/_.{txt,md}", \GLOB_BRACE) as $filename) {
    echo "$filename\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

path/docs/mailinglist-rules.md
path/docs/README.md
path/docs/release-process.md
path/pear/install-pear.txt
path/Zend/README.md

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:

    Esta función no está disponible en algunos sistemas (por ejemplo, viejos Sun OS).

### Ver también

    - [opendir()](#function.opendir) - Abre un directorio y recupera un puntero sobre él

    - [readdir()](#function.readdir) - Lee una entrada del directorio

    - [closedir()](#function.closedir) - Cierra el puntero al directorio

    - [fnmatch()](#function.fnmatch) - Prueba un nombre de fichero mediante un patrón de búsqueda

# is_dir

(PHP 4, PHP 5, PHP 7, PHP 8)

is_dir — Indica si el fichero es un directorio

### Descripción

**is_dir**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Indica si el fichero es un directorio.

### Parámetros

     filename


       Ruta de acceso al fichero. Si filename
       es un fichero relativo, será verificado relativamente al
       directorio de trabajo actual. Si filename
       es un enlace simbólico o un enlace convencional, el enlace será resuelto
       y verificado. Si se ha activado
       [open_basedir](#ini.open-basedir),
       pueden aplicarse más restricciones.





### Valores devueltos

Devuelve **[true](#constant.true)** si el nombre de fichero existe y es un directorio, **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_dir()**

&lt;?php
var_dump(is_dir('a_file.txt'));
var_dump(is_dir('bogus_dir/abc'));

var_dump(is_dir('..')); // un directorio superior
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(false)
bool(true)

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [chdir()](#function.chdir) - Cambia de directorio

    - [dir()](#function.dir) - Devuelve una instancia de la clase Directory

    - [opendir()](#function.opendir) - Abre un directorio y recupera un puntero sobre él

    - [is_file()](#function.is-file) - Indica si el fichero es un fichero verdadero

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

# is_executable

(PHP 4, PHP 5, PHP 7, PHP 8)

is_executable — Indica si el fichero es ejecutable

### Descripción

**is_executable**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Indica si el fichero es ejecutable.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero existe y es ejecutable, **[false](#constant.false)** en caso contrario.
En los sistemas POSIX, un fichero es ejecutable si el bit ejecutable de los
permisos del fichero está definido. En Windows, véase la nota a continuación.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_executable()**

&lt;?php

$file = '/home/vincent/somefile.sh';

if (is_executable($file)) {
echo $file.' es ejecutable';
} else {
echo $file.' no es ejecutable';
}

?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

**Nota**:

    En Windows, un fichero se considera ejecutable si es un fichero ejecutable
    propio según lo reportado por la API Win
    GetBinaryType(); por razones de retrocompatibilidad,
    los ficheros con extensión .bat o
    .cmd también se consideran ejecutables.
    Anterior a PHP 7.4.0, cualquier fichero no vacío con extensión
    .exe o .com se consideraba
    ejecutable. Cabe señalar que PATHEXT no es relevante para
    **is_executable()**.

### Ver también

    - [is_file()](#function.is-file) - Indica si el fichero es un fichero verdadero

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

# is_file

(PHP 4, PHP 5, PHP 7, PHP 8)

is_file — Indica si el fichero es un fichero verdadero

### Descripción

**is_file**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Indica si el fichero es un fichero verdadero. Si filename es un
enlace simbólico, se resolverá el enlace y
se proporcionará información sobre el fichero
referenciado.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve **[true](#constant.true)** si el nombre de fichero existe y es un fichero regular, **[false](#constant.false)**
en caso contrario.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_file()**

&lt;?php
var_dump(is_file('a_file.txt')) . "\n";
var_dump(is_file('/usr/bin/')) . "\n";
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

    - [SplFileInfo](#class.splfileinfo)

# is_link

(PHP 4, PHP 5, PHP 7, PHP 8)

is_link — Indica si el fichero es un enlace simbólico

### Descripción

**is_link**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Indica si el fichero es un enlace simbólico.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Devuelve **[true](#constant.true)** si el nombre de fichero existe y es un enlace simbólico, **[false](#constant.false)**
en caso contrario.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Creación y verificación de un enlace simbólico**

&lt;?php
$link = 'uploads';

if (is_link($link)) {
    echo readlink($link);
} else {
symlink('uploads.php', $link);
}
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [is_file()](#function.is-file) - Indica si el fichero es un fichero verdadero

    - [readlink()](#function.readlink) - Devuelve el contenido de un enlace simbólico

    - [symlink()](#function.symlink) - Crea un enlace simbólico

# is_readable

(PHP 4, PHP 5, PHP 7, PHP 8)

is_readable — Indica si un fichero existe y es accesible en lectura

### Descripción

**is_readable**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Indica si un fichero existe y es accesible en lectura.

### Parámetros

     filename


       Ruta hacia el fichero.





### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero o el directorio especificado por
filename existe y es accesible en lectura,
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_readable()**

&lt;?php
$filename = 'test.txt';
if (is_readable($filename)) {
echo 'El fichero es accesible en lectura';
} else {
echo 'El fichero no es accesible en lectura !';
}
?&gt;

### Notas

No se olvide que PHP accede a los ficheros con los mismos
permisos que el usuario que ejecuta el servidor web
(a menudo, es 'nobody', nadie).

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

**Nota**:

    La verificación se realiza utilizando el UID/GID real en lugar del efectivo.

Esta función puede devolver **[true](#constant.true)** para los directorios.
Utilice la función [is_dir()](#function.is-dir) para distinguir
los ficheros y los directorios.

### Ver también

    - [is_writable()](#function.is-writable) - Indica si un fichero es accesible en escritura

    - [file_exists()](#function.file-exists) - Verifica si un fichero o un directorio existe

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

# is_uploaded_file

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

is_uploaded_file — Indica si el archivo fue subido mediante HTTP POST

### Descripción

**is_uploaded_file**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el archivo nombrado por filename fue
subido mediante HTTP POST. Esto es útil para intentar asegurarse de que un
usuario malicioso no ha intentado engañar al script haciéndole trabajar con
archivos con los que no debiera de estar trabajando--por ejemplo,
/etc/passwd.

Este tipo de comprobación es especialmente importante si hay alguna posibilidad
de que nada hecho con los archivos subidos pueda revelar su
contenido al usuario, o incluso a otros usuarios en el mismo
sistema.

Para un funcionamiento apropiado, la función **is_uploaded_file()** necesita
un argumento como [$\_FILES['archivo_usuario']['tmp_name']](#reserved.variables.files), - el nombre del
archivo subido de la máquina del cliente [$\_FILES['archivo_usuario']['name']](#reserved.variables.files)
no funciona.

### Parámetros

     filename


       El nombre de archivo que se va a comprobar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de is_uploaded_file()**

&lt;?php

if (is_uploaded_file($_FILES['archivo_usuario']['tmp_name'])) {
   echo "Archivo ". $_FILES['archivo_usuario']['name'] ." subido con éxtio.\n";
   echo "Monstrar contenido\n";
   readfile($\_FILES['archivo_usuario']['tmp_name']);
} else {
echo "Posible ataque del archivo subido: ";
echo "nombre del archivo '". $\_FILES['archivo_usuario']['tmp_name'] . "'.";
}

?&gt;

### Ver también

    - [move_uploaded_file()](#function.move-uploaded-file) - Mueve un archivo subido a una nueva ubicación

    - [$_FILES](#reserved.variables.files)

    - Véase [Manejo de subidas de archivos](#features.file-upload) para
    un sencillo ejemplo de uso.

# is_writable

(PHP 4, PHP 5, PHP 7, PHP 8)

is_writable — Indica si un fichero es accesible en escritura

### Descripción

**is_writable**([string](#language.types.string) $filename): [bool](#language.types.boolean)

devuelve **[true](#constant.true)** si filename existe y es
accesible en escritura. El argumento puede ser el nombre de un directorio,
permitiendo así verificar si el directorio es accesible en escritura.

No se olvide que PHP accede a los ficheros con los mismos
permisos que el usuario que ejecuta el servidor web
(a menudo, es 'nobody', nadie).

### Parámetros

     filename


       El nombre del fichero a verificar.





### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero filename
existe y es accesible en escritura.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_writable()**

&lt;?php
$filename = 'test.txt';
if (is_writable($filename)) {
echo 'El fichero es accesible en escritura.';
} else {
echo 'El fichero no es accesible en escritura !';
}
?&gt;

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [is_readable()](#function.is-readable) - Indica si un fichero existe y es accesible en lectura

    - [file_exists()](#function.file-exists) - Verifica si un fichero o un directorio existe

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# is_writeable

(PHP 4, PHP 5, PHP 7, PHP 8)

is_writeable — Alias de [is_writable()](#function.is-writable)

### Descripción

Esta función es un alias de:
[is_writable()](#function.is-writable).

# lchgrp

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

lchgrp — Cambiar la pertenencia al grupo de un enlace simbólico

### Descripción

**lchgrp**([string](#language.types.string) $filename, [string](#language.types.string)|[int](#language.types.integer) $group): [bool](#language.types.boolean)

Intenta reemplazar el grupo del enlace simbólico
filename por el grupo
group.

Solo el superusuario puede cambiar el grupo de un enlace simbólico
arbitrariamente; los demás usuarios pueden cambiar el grupo de un
enlace simbólico a un grupo del cual este usuario es miembro.

### Parámetros

     filename


       Ruta hacia el enlace simbólico.






     group


       El grupo, especificado por su nombre o su número.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Modificación del grupo de un enlace simbólico**

&lt;?php
$target = 'output.php';
$link = 'output.html';
symlink($target, $link);

lchgrp($link, 8);
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:
Esta función no está implementada en las plataformas Windows.

### Ver también

    - [chgrp()](#function.chgrp) - Cambia el grupo de un fichero

    - [lchown()](#function.lchown) - Cambia el propietario de un enlace simbólico

    - [chown()](#function.chown) - Cambia el propietario del fichero

    - [chmod()](#function.chmod) - Cambia el modo del fichero

# lchown

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

lchown — Cambia el propietario de un enlace simbólico

### Descripción

**lchown**([string](#language.types.string) $filename, [string](#language.types.string)|[int](#language.types.integer) $user): [bool](#language.types.boolean)

Intenta reemplazar el propietario del enlace simbólico
filename por el usuario
user

Solo el superusuario puede cambiar el propietario de un enlace simbólico.

### Parámetros

     filename


       Ruta hacia el fichero.






     user


       El usuario, por su nombre o su número.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Modificación del propietario de un enlace simbólico**

&lt;?php
$target = 'output.php';
$link = 'output.html';
symlink($target, $link);

lchown($link, 8);
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:
Esta función no está implementada en las plataformas Windows.

### Ver también

    - [chown()](#function.chown) - Cambia el propietario del fichero

    - [lchgrp()](#function.lchgrp) - Cambiar la pertenencia al grupo de un enlace simbólico

    - [chgrp()](#function.chgrp) - Cambia el grupo de un fichero

    - [chmod()](#function.chmod) - Cambia el modo del fichero

# link

(PHP 4, PHP 5, PHP 7, PHP 8)

link — Crea un enlace

### Descripción

**link**([string](#language.types.string) $target, [string](#language.types.string) $link): [bool](#language.types.boolean)

**link()** crea un enlace.

### Parámetros

     target


       El destino del enlace.






     link


       El nombre del enlace.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

La función falla y emite una **[E_WARNING](#constant.e-warning)** si
link ya existe, o si
target no existe.

### Ejemplos

    **Ejemplo #1 Creación de un enlace**

&lt;?php

$target = 'source.ext'; // Este es el fichero que existe actualmente
$link = 'newfile.ext'; // Este será el nombre del fichero que se desea enlazar

link($target, $link);
?&gt;

### Notas

**Nota**:
Esta función no funciona con los [archivos remotos](#features.remote-files),
ya que el archivo examinado debe ser accesible en el sistema de archivos del servidor.

**Nota**:

    Windows únicamente: esta función requiere un nivel
    de funcionamiento con derechos elevados, o bien la
    desactivación de UAC.

### Ver también

    - [symlink()](#function.symlink) - Crea un enlace simbólico

    - [readlink()](#function.readlink) - Devuelve el contenido de un enlace simbólico

    - [linkinfo()](#function.linkinfo) - Devuelve la información de un enlace

    - [unlink()](#function.unlink) - Elimina un fichero

# linkinfo

(PHP 4, PHP 5, PHP 7, PHP 8)

linkinfo — Devuelve la información de un enlace

### Descripción

**linkinfo**([string](#language.types.string) $path): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la información de un enlace.

Esta función se utiliza para verificar si un enlace (indicado
por la ruta path) existe realmente
(utilizando el mismo método que la macro S_ISLNK, definida en
stat.h).

### Parámetros

     path


       Ruta hacia el enlace.





### Valores devueltos

**linkinfo()** devuelve el campo st_dev
de la estructura stat de C Unix, devuelta por la llamada al sistema
lstat. Devuelve un entero no negativo en caso de éxito,
-1 en el caso de que el enlace no haya sido encontrado, o **[false](#constant.false)** si ocurre
una violación open.base_dir.

### Ejemplos

    **Ejemplo #1 Ejemplo con linkinfo()**

&lt;?php

echo linkinfo('/vmlinuz'); // 835

?&gt;

### Ver también

    - [symlink()](#function.symlink) - Crea un enlace simbólico

    - [link()](#function.link) - Crea un enlace

    - [readlink()](#function.readlink) - Devuelve el contenido de un enlace simbólico

# lstat

(PHP 4, PHP 5, PHP 7, PHP 8)

lstat — Devuelve información sobre un fichero o un enlace simbólico

### Descripción

**lstat**([string](#language.types.string) $filename): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve información sobre un fichero o un enlace simbólico.

### Parámetros

     filename


       Ruta de acceso a un fichero o un enlace simbólico.





### Valores devueltos

Consúltese la página del manual de [stat()](#function.stat) para obtener más información
sobre la estructura del array devuelto por **lstat()**.
Esta función es idéntica a la función [stat()](#function.stat) excepto
que si filename es un enlace simbólico, la información se basará en el enlace simbólico.

En caso de error, se devuelve **[false](#constant.false)**.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Comparación entre [stat()](#function.stat) y lstat()**

&lt;?php
symlink('uploads.php', 'uploads');

// Se destaca la diferencia de información
array_diff(stat('uploads'), lstat('uploads'));
?&gt;

    Resultado del ejemplo anterior es similar a:



     Información que difiere entre los 2 ficheros.

Array
(
[ino] =&gt; 97236376
[mode] =&gt; 33188
[size] =&gt; 34
[atime] =&gt; 1223580003
[mtime] =&gt; 1223581848
[ctime] =&gt; 1223581848
[blocks] =&gt; 8
)

### Notas

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
[stat()](#function.stat).

### Ver también

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# mkdir

(PHP 4, PHP 5, PHP 7, PHP 8)

mkdir — Crea un directorio

### Descripción

**mkdir**(
    [string](#language.types.string) $directory,
    [int](#language.types.integer) $permissions = 0777,
    [bool](#language.types.boolean) $recursive = **[false](#constant.false)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [bool](#language.types.boolean)

Intenta crear el directorio especificado por directory.

### Parámetros

     directory


       La ruta del directorio.


**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

     permissions


       El modo predeterminado es 0777, lo que significa el acceso más amplio
       posible. Para más información sobre los modos, lea los detalles
       en la página de [chmod()](#function.chmod).



      **Nota**:



        permissions es ignorado en Windows.





       Observe que probablemente se quiera especificar el modo como un número octal,
       lo que significa que debería de haber un cero inicial. El modo es modificado también
       por la actual máscara de usuario, la cual se puede cambiar usando
       [umask()](#function.umask).






     recursive


       Si el valor es **[true](#constant.true)**, entonces cualquier directorio padre del directorio especificado
       en el parámetro directory también será creado, con los mismos permisos.






     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Nota**:

    Si el directorio a crear ya existe, se considerará un error
    y se devolverá **[false](#constant.false)**. Utilice [is_dir()](#function.is-dir) o
    [file_exists()](#function.file-exists) para comprobar si el directorio ya existe
    antes de intentar crearlo.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el directorio
ya existe.

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si los permisos
relevantes impiden crear el directorio.

### Ejemplos

    **Ejemplo #1 Ejemplo de mkdir()**

&lt;?php
mkdir("/ruta/a/mi/directorio", 0700);
?&gt;

    **Ejemplo #2 mkdir()** usando el parámetro recursive

&lt;?php
// Estructura de la carpeta deseada
$estructura = './nivel1/nivel2/nivel3/';

// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

if(!mkdir($estructura, 0777, true)) {
die('Fallo al crear las carpetas...');
}

// ...
?&gt;

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [rmdir()](#function.rmdir) - Elimina un directorio

    - [umask()](#function.umask) - Cambia el "umask" actual

# move_uploaded_file

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

move_uploaded_file — Mueve un archivo subido a una nueva ubicación

### Descripción

**move_uploaded_file**([string](#language.types.string) $filename, [string](#language.types.string) $destination): [bool](#language.types.boolean)

Esta función intenta asegurarse de que el archivo designado por
filename es un archivo subido válido (lo que significa
que fue subido mediante el mecanismo de subida HTTP POST de PHP). Si
el archivo es válido, será movido al nombre de archivo dado por
destination.

El orden de comprobación es especialmente importante si hay cualquier posibilidad
de que cualquier cosa hecha con los archivos subidos pueda revelar su
contenido al usuario, o incluso a otros usuarios en el mismo
sistema.

### Parámetros

     filename


       El nombre de archivo del archivo subido.






     destination


       El destino del archivo movido.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

Si filename no es un archivo válido subido,
no sucederá ninguna acción, y
**move_uploaded_file()** devolverá
**[false](#constant.false)**.

Si filename es un archivo subido válido, pero
no puede ser movido por algunas razones, no sucederá ninguna acción, y
**move_uploaded_file()** devolverá
**[false](#constant.false)**. Adicionalmente, se emitirá un aviso.

### Ejemplos

    **Ejemplo #1 Subida  de múltiples archivos**

&lt;?php
$uploads_dir = '/uploads';
foreach ($\_FILES["pictures"]["error"] as $key =&gt; $error) {
    if ($error == UPLOAD_ERR_OK) {
$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
// basename() puede evitar ataques de denegación de sistema de ficheros;
// podría ser apropiada más validación/saneamiento del nombre del fichero
$name = basename($\_FILES["pictures"]["name"][$key]);
move_uploaded_file($tmp_name, "$uploads_dir/$name");
}
}
?&gt;

### Notas

**Nota**:

    **move_uploaded_file()** es compatible con
    [open_basedir](#ini.open-basedir).
    Sin embargo, las restricciones sólo están impuestas para la
    ruta dest para permitir mover
    los archivos subidos en los cuales filename pueda tener
    conflictos con tales restricciones. **move_uploaded_file()** garantiza
    la seguridad de esta operación permitiendo que sólo aquellos archivos subidos
    a través de PHP sean movidos.

**Advertencia**

    Si el archivo destino ya existe se sobrescribirá.

### Ver también

    - [is_uploaded_file()](#function.is-uploaded-file) - Indica si el archivo fue subido mediante HTTP POST

    - [rename()](#function.rename) - Renombra un fichero o un directorio

    - Véase [Manejo de subidas de archivos](#features.file-upload) para un sencillo ejemplo de uso

# parse_ini_file

(PHP 4, PHP 5, PHP 7, PHP 8)

parse_ini_file — Analiza un archivo de configuración

### Descripción

**parse_ini_file**([string](#language.types.string) $filename, [bool](#language.types.boolean) $process_sections = **[false](#constant.false)**, [int](#language.types.integer) $scanner_mode = **[INI_SCANNER_NORMAL](#constant.ini-scanner-normal)**): [array](#language.types.array)|[false](#language.types.singleton)

**parse_ini_file()** carga el archivo
filename y devuelve las
configuraciones que contiene como un array asociativo.

La estructura de los archivos de configuración leídos es similar a la de php.ini.

**Advertencia**

    Esta función no debe ser utilizada con entradas no confiables, a menos que
    scanner_mode sea **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**,
    ya que la salida analizada podría contener los valores de constantes sensibles,
    como constantes que contienen una contraseña de base de datos.

### Parámetros

     filename


       El nombre del archivo de configuración a analizar. Si se utiliza una ruta relativa,
       se evalúa relativa a la carpeta actual, luego según el [include_path](#ini.include-path).






     process_sections


       Al pasar el argumento process_sections
       a **[true](#constant.true)**, se obtendrá
       un array multidimensional con los nombres de las secciones.
       El valor por omisión de este argumento es **[false](#constant.false)**






     scanner_mode


       Puede ser **[INI_SCANNER_NORMAL](#constant.ini-scanner-normal)** (por omisión) o
       **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**. Si se proporciona **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**,
       entonces los valores en opción no serán analizados.





A partir de PHP 5.6.1 también puede ser especificado como **[INI_SCANNER_TYPED](#constant.ini-scanner-typed)**.
En este modo los booleanos, null y enteros son preservados tanto como sea posible.
Las cadenas de caracteres "true", "on" y "yes"
son convertidas a **[true](#constant.true)**. "false", "off", "no"
y "none" son considerados como **[false](#constant.false)**. "null" es convertido a **[null](#constant.null)** en este modo. Además todas las cadenas de caracteres numéricas son convertidas a entero si es posible.

### Valores devueltos

La configuración se devuelve en forma de un array asociativo
en caso de éxito, y **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Contenido del archivo sample.ini**

; Este es un archivo de configuración
; Los comentarios comienzan con ';', como en php.ini

[first_section]
one = 1
five = 5
animal = BIRD

[second_section]
path = "/usr/local/bin"
URL = "http://www.example.com/~username"

[third_section]
phpversion[] = "5.0"
phpversion[] = "5.1"
phpversion[] = "5.2"
phpversion[] = "5.3"

urls[svn] = "http://svn.php.net"
urls[git] = "http://git.php.net"

    **Ejemplo #2 Ejemplo con parse_ini_file()**



     Las [constantes](#language.constants) (pero no las
     "constantes mágicas" como **[__FILE__](#constant.file)**) también
     pueden ser utilizadas en el archivo .ini, por lo que si se define
     una constante antes de ejecutar **parse_ini_file()**, será
     integrada en los resultados. Solo se evalúan los valores de configuración,
     y el valor debe ser simplemente la constante. Por ejemplo:

&lt;?php

define('BIRD', 'Dodo bird');

// Análisis sin secciones
$ini_array = parse_ini_file("sample.ini");
print_r($ini_array);

// Análisis con secciones
$ini_array = parse_ini_file("sample.ini", true);
print_r($ini_array);

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[one] =&gt; 1
[five] =&gt; 5
[animal] =&gt; Dodo bird
[path] =&gt; /usr/local/bin
[URL] =&gt; http://www.example.com/~username
[phpversion] =&gt; Array
(
[0] =&gt; 5.0
[1] =&gt; 5.1
[2] =&gt; 5.2
[3] =&gt; 5.3
)

    [urls] =&gt; Array
        (
            [svn] =&gt; http://svn.php.net
            [git] =&gt; http://git.php.net
        )

)
Array
(
[first_section] =&gt; Array
(
[one] =&gt; 1
[five] =&gt; 5
[animal] =&gt; Dodo bird
)

    [second_section] =&gt; Array
        (
            [path] =&gt; /usr/local/bin
            [URL] =&gt; http://www.example.com/~username
        )

    [third_section] =&gt; Array
        (
            [phpversion] =&gt; Array
                (
                    [0] =&gt; 5.0
                    [1] =&gt; 5.1
                    [2] =&gt; 5.2
                    [3] =&gt; 5.3
                )
            [urls] =&gt; Array
                (
                    [svn] =&gt; http://svn.php.net
                    [git] =&gt; http://git.php.net
                )

)

    **Ejemplo #3 parse_ini_file()** para analizar un archivo php.ini

&lt;?php
// Una función simple para comparar los resultados a continuación
function yesno($expression)
{
    return($expression ? 'Yes' : 'No');
}

// Lee la ruta del php.ini utilizando php_ini_loaded_file()
$ini_path = php_ini_loaded_file();

// Análisis de php.ini
$ini = parse_ini_file($ini_path);

// Visualización y comparativo de los valores. Observe que get_cfg_var()
// dará los mismos resultados entre los resultados analizados y cargados
echo '(analizado) magic_quotes_gpc = ' . yesno($ini['magic_quotes_gpc']) . PHP_EOL;
echo '(cargado ) magic_quotes_gpc = ' . yesno(get_cfg_var('magic_quotes_gpc')) . PHP_EOL;
?&gt;

    Resultado del ejemplo anterior es similar a:

(analizado) magic_quotes_gpc = Yes
(cargado ) magic_quotes_gpc = Yes

    **Ejemplo #4 Interpolación de Valor**



     Además de evaluar las constantes, ciertos caracteres tienen un significado
     particular en un valor ini.
     Adicionalmente, las variables de entorno y opciones de configuración
     definidas previamente (ver [get_cfg_var()](#function.get-cfg-var)) pueden ser
     leídas utilizando la sintaxis ${}.

; | se utiliza para OR a nivel de bits
three = 2|3

; &amp; se utiliza para AND a nivel de bits
four = 6&amp;5

; ^ se utiliza para XOR a nivel de bits
five = 3^6

; ~ se utiliza para negación a nivel de bits
negative_two = ~1

; () se utiliza para agrupación
seven = (8|7)&amp;(6|5)

; Interpolar la variable de entorno PATH
path = ${PATH}

; Interpolar la opción de configuración 'memory_limit'
configured_memory_limit = ${memory_limit}

    **Ejemplo #5 Escapar Caracteres**



     Ciertos caracteres tienen un significado particular en las cadenas entre comillas dobles y deben
     ser escapados prefijándolos con un antislash.
     Primero, son las comillas dobles " como marcador de frontera,
     y el antislash \ mismo (si está seguido de uno de los caracteres especiales):

quoted = "She said \"Exactly my point\"." ; Resultados en una cadena con marcas de comillas en ella.
hint = "Use \\\" to escape double quote" ; Resultados en: Use \" to escape double quote

     Hay una excepción para las rutas estilo Windows: es posible no escapar
     el antislash final si la cadena citada es seguida directamente por un retorno de línea:

save_path = "C:\Temp\"

     Si se debe escapar una comilla doble seguida de un retorno de línea en un
     valor multilínea, es posible utilizar la concatenación de valor de la siguiente manera
     (hay una cadena de comillas dobles seguida directamente de otra):

long_text = "Lorem \"ipsum\"""
dolor" ; Resultados en: Lorem "ipsum"\n dolor

     Otro carácter con un significado particular es $ (el signo de dólar).
     Debe ser escapado si está seguido de una llave abierta:

code = "\${test}"

     El escape de caracteres no es soportado en el modo **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**
     (en este modo todos los caracteres son tratados "tal cual").




     Es de notar que el analizador INI no soporta las secuencias de escape estándar
     (\n, \t, etc.).
     Si es necesario, el resultado de **parse_ini_file()** debe
     ser post-procesado con la función [stripcslashes()](#function.stripcslashes).

### Notas

**Nota**:

    Esta función no tiene nada que ver con el archivo
    php.ini. Este último ya ha sido procesado cuando
    se comienza a ejecutar el script. Esta función
    puede permitir leer sus propios archivos de configuración.

**Nota**:

    Si un valor del archivo ini contiene
    datos no-alfanuméricos, debe ser protegido colocándolo
    entre comillas dobles (").

**Nota**:

    Existen palabras reservadas que no deben ser utilizadas como claves
    en los archivos ini. Esto incluye: null,
    yes, no, true,
    false, on y off.
    Los valores null, off, no
    y false dan "" (cadena vacía). Los valores
    on, yes y
    true dan "1", a menos que se utilice el modo
    **[INI_SCANNER_TYPED](#constant.ini-scanner-typed)**.
    Los caracteres ?{}|&amp;~!()^" no deben ser utilizados
    en ninguna parte de la clave y tienen un significado especial en el valor.

**Nota**:

    Las entradas sin un signo igual serán ignoradas. Por ejemplo, "foo"
    será ignorado mientras que "bar =" será analizado y añadido con un valor vacío.
    Por ejemplo, MySQL tiene una opción de configuración "no-auto-rehash" en
    el archivo my.cnf que no toma valor, por lo tanto,
    será ignorada.

**Nota**:

    Los archivos ini son generalmente tratados como archivos de texto sin formato
    por los servidores web, y por lo tanto enviados al navegador si se solicita. Esto significa
    que para la seguridad, los archivos ini deben ser almacenados fuera
    de la raíz docroot, o reconfigurar el servidor web para no servirlos.
    El fracaso de realizar una de estas medidas puede introducir un riesgo de seguridad.

### Ver también

    - [parse_ini_string()](#function.parse-ini-string) - Analiza una cadena de configuración

# parse_ini_string

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

parse_ini_string — Analiza una cadena de configuración

### Descripción

**parse_ini_string**([string](#language.types.string) $ini_string, [bool](#language.types.boolean) $process_sections = **[false](#constant.false)**, [int](#language.types.integer) $scanner_mode = **[INI_SCANNER_NORMAL](#constant.ini-scanner-normal)**): [array](#language.types.array)|[false](#language.types.singleton)

**parse_ini_string()** devuelve la configuración en la
cadena ini_string en un array asociativo.

La estructura de la cadena debe ser la misma que la del archivo php.ini.

**Advertencia**

    Esta función no debe ser utilizada con entradas no confiables, a menos que
    scanner_mode sea **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**,
    ya que la salida analizada podría contener los valores de constantes sensibles,
    como constantes que contienen una contraseña de base de datos.

### Parámetros

     ini_string


       El contenido de tipo ini a analizar.






     process_sections


       Al activar el argumento process_sections
       con **[true](#constant.true)**, se obtendrá un array multidimensional,
       con los nombres de secciones y directivas. El valor por
       omisión del argumento process_sections es **[false](#constant.false)**






     scanner_mode


       Puede tomar los valores de las constantes **[INI_SCANNER_NORMAL](#constant.ini-scanner-normal)**
       (por omisión) o **[INI_SCANNER_RAW](#constant.ini-scanner-raw)**. Si
       **[INI_SCANNER_RAW](#constant.ini-scanner-raw)** es utilizado, los valores de las
       opciones no serán analizados.





A partir de PHP 5.6.1 también puede ser especificado como **[INI_SCANNER_TYPED](#constant.ini-scanner-typed)**.
En este modo los booleanos, null y enteros son preservados tanto como sea posible.
Las cadenas de caracteres "true", "on" y "yes"
son convertidas a **[true](#constant.true)**. "false", "off", "no"
y "none" son considerados como **[false](#constant.false)**. "null" es convertido a **[null](#constant.null)** en este modo. Además todas las cadenas de caracteres numéricas son convertidas a entero si es posible.

### Valores devueltos

Las directivas son devueltas en forma de array [array](#language.types.array)
en caso de éxito, y **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

    Existen varias palabras reservadas que no deben ser
    utilizadas como clave en los archivos .ini. Esto incluye:
    null, yes, no,
    true, false, on,
    off, none.
    Los valores null, off,
    no y
    false son devueltos como "" (cadena vacía) y los valores
    on, yes y true
    son devueltos como "1" a menos que el modo **[INI_SCANNER_TYPED](#constant.ini-scanner-typed)**
    sea utilizado. Los caracteres ?{}|&amp;~![()^" no
    deben ser utilizados en ninguna parte en las claves, y tienen un significado
    especial en los valores.

### Ver también

    - [parse_ini_file()](#function.parse-ini-file) - Analiza un archivo de configuración

# pathinfo

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

pathinfo — Devuelve información sobre una ruta del sistema

### Descripción

**pathinfo**([string](#language.types.string) $path, [int](#language.types.integer) $flags = **[PATHINFO_ALL](#constant.pathinfo-all)**): [array](#language.types.array)|[string](#language.types.string)

**pathinfo()** devuelve información sobre la ruta
path, en forma de string o array asociativo, dependiendo del argumento flags.

**Nota**:

    Para más información sobre la lectura de la ruta actual,
    consulte la sección sobre las
    [variables predefinidas](#language.variables.predefined).

**Nota**:

    **pathinfo()** opera de manera ingenua sobre la cadena de entrada,
    y no es consciente de los sistemas de archivos actuales, o de los componentes
    de rutas como "..".

**Nota**:

    Solo en sistemas Windows, el carácter \ será
    interpretado como separador de directorio. En otros sistemas, será
    tratado como cualquier otro carácter.

**Precaución**

    La función **pathinfo()** es sensible a la configuración local,
    por lo tanto, si se desea que analice correctamente una ruta que contenga
    caracteres de varios bytes, la configuración local correspondiente debe ser definida
    utilizando la función [setlocale()](#function.setlocale).

### Parámetros

     path


       La ruta a analizar.






     flags


       Especifica qué elemento será devuelto. Puede pasar una de las constantes
       **[PATHINFO_DIRNAME](#constant.pathinfo-dirname)**,
       **[PATHINFO_BASENAME](#constant.pathinfo-basename)**,
       **[PATHINFO_EXTENSION](#constant.pathinfo-extension)** y
       **[PATHINFO_FILENAME](#constant.pathinfo-filename)**.




       Si flags no es especificado,
       todos los elementos son devueltos.





### Valores devueltos

Si flags no es utilizado, esta función devolverá
un array asociativo que contiene los siguientes elementos :
dirname, basename,
extension (si existe), y filename.

**Nota**:

    Si path contiene más de una extensión,
    **[PATHINFO_EXTENSION](#constant.pathinfo-extension)** devuelve únicamente la
    última y **[PATHINFO_FILENAME](#constant.pathinfo-filename)** eliminará
    únicamente la última también (ver el primer ejemplo a continuación).

**Nota**:

    Si path no tiene extensión, el elemento
    extension no será devuelto
    (ver el segundo ejemplo a continuación).

**Nota**:

    Si basename del argumento path
    comienza con un punto, los caracteres siguientes son interpretados como la
    extension, y el filename estará vacío
    (ver el tercer ejemplo a continuación).

Si flags es utilizado, esta función devolverá
una [string](#language.types.string) que contiene los elementos.

### Ejemplos

    **Ejemplo #1 Ejemplo con pathinfo()**

&lt;?php
$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');

echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";
echo $path_parts['filename'], "\n";
?&gt;

    El ejemplo anterior mostrará:

/www/htdocs/inc
lib.inc.php
php
lib.inc

    **Ejemplo #2 Ejemplo pathinfo()** sin extensión

&lt;?php
$path_parts = pathinfo('/path/emptyextension.');
var_dump($path_parts['extension']);

$path_parts = pathinfo('/path/noextension');
var_dump($path_parts['extension']);
?&gt;

    Resultado del ejemplo anterior es similar a:

string(0) ""

Notice: Undefined index: extension in test.php on line 6
NULL

    **Ejemplo #3 Ejemplo con pathinfo()**

&lt;?php
print_r(pathinfo('/some/path/.test'));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[dirname] =&gt; /some/path
[basename] =&gt; .test
[extension] =&gt; test
[filename] =&gt;
)

    **Ejemplo #4 Ejemplo de pathinfo()** con desestructuración de array



     El argumento flags no es una máscara de bits. Solo un valor
     puede ser proporcionado. Para seleccionar únicamente un conjunto limitado de valores analizados, utilice
     la desestructuración de array como se muestra a continuación:




     &lt;?php
     ['basename' =&gt; $basename, 'dirname' =&gt; $dirname] = pathinfo('/www/htdocs/inc/lib.inc.php');
     var_dump($basename, $dirname);
     ?&gt;


    Resultado del ejemplo anterior es similar a:




     string(11) "lib.inc.php"
     string(15) "/www/htdocs/inc"

### Ver también

    - [dirname()](#function.dirname) - Devuelve la ruta de la carpeta padre

    - [basename()](#function.basename) - Devuelve el nombre del componente final de una ruta

    - [parse_url()](#function.parse-url) - Analiza una URL y devuelve sus componentes

    - [realpath()](#function.realpath) - Retorna la ruta de acceso canónica absoluta

# pclose

(PHP 4, PHP 5, PHP 7, PHP 8)

pclose — Cierra un proceso de un puntero a un fichero

### Descripción

**pclose**([resource](#language.types.resource) $handle): [int](#language.types.integer)

Cierra un puntero a un fichero hacia una tubería abierta por [popen()](#function.popen).

### Parámetros

     handle


       El puntero al fichero debe ser válido, y debe haber sido devuelto por una
       llamada exitosa a [popen()](#function.popen).





### Valores devueltos

Devuelve el estado de terminación del proceso que se estaba ejecutando. En caso de
error, se devuelve -1.

**Nota**:

Si PHP ha sido compilado con la opción de configuración --enable-sigchild,
el valor devuelto de esta función será indefinido.

### Ejemplos

    **Ejemplo #1 Ejemplo de pclose()**

&lt;?php
$gestor = popen('/bin/ls', 'r');
pclose($gestor);
?&gt;

### Notas

**Nota**:
**Solamente Unix:**

    **pclose()** está internamente implementada usando la
    llamada al sistema de waitpid(3). Para obtener el código de
    estado de salida real debería usarse la función
    [pcntl_wexitstatus()](#function.pcntl-wexitstatus).

### Ver también

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

# popen

(PHP 4, PHP 5, PHP 7, PHP 8)

popen — Crea un puntero de archivo de proceso

### Descripción

**popen**([string](#language.types.string) $command, [string](#language.types.string) $mode): [resource](#language.types.resource)|[false](#language.types.singleton)

Crea un puntero de archivo de proceso, ejecutado mediante un fork
de la orden proporcionada por el argumento command.

### Parámetros

     command


       La orden






     mode


       El modo. Puede ser 'r' para lectura, o 'w'
       para escritura.




       En Windows, **popen()** utiliza el modo texto por defecto,
       es decir, todo carácter \n escrito o leído del pipe será
       traducido a \r\n.
       Si esto no es deseado, el modo binario puede ser forzado definiendo
       el mode a 'rb' y
       'wb', respectivamente.





### Valores devueltos

Devuelve un puntero de archivo idéntico al devuelto por
[fopen()](#function.fopen), excepto que será
unidireccional (solo lectura, o solo escritura), y debe ser
cerrado mediante [pclose()](#function.pclose). Este puntero puede ser
utilizado con [fgets()](#function.fgets), [fgetss()](#function.fgetss)
y [fwrite()](#function.fwrite). Cuando el modo es 'r', el puntero de archivo
devuelto equivale al STDOUT de la orden, y cuando el modo es 'w', el
puntero de archivo devuelto equivale al STDIN de la orden.

Si ocurre un error, la función devolverá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con popen()**

&lt;?php
$handle = popen("/bin/ls", "r");
?&gt;

Si la orden a ejecutar no ha podido ser encontrada, se devolverá
un recurso válido. Esto puede parecer extraño, pero es práctico.
Esto permite acceder a los mensajes de error que han sido
devueltos por el Shell:

    **Ejemplo #2 Ejemplo con popen()**

&lt;?php
error_reporting(E_ALL);

/_ Añade una redirección para que pueda leer stderr. _/
$handle = popen('/path/to/executable 2&gt;&amp;1', 'r');
echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);
?&gt;

### Notas

**Nota**:

    Si se desea un soporte bidireccional (two-way), utilice
    la función [proc_open()](#function.proc-open).

### Ver también

    - [pclose()](#function.pclose) - Cierra un proceso de un puntero a un fichero

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [proc_open()](#function.proc-open) - Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas

# readfile

(PHP 4, PHP 5, PHP 7, PHP 8)

readfile — Muestra un fichero

### Descripción

**readfile**([string](#language.types.string) $filename, [bool](#language.types.boolean) $use_include_path = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Lee un fichero y lo envía al buffer de salida.

### Parámetros

     filename


       El fichero a leer.






     use_include_path


       Puede utilizarse el segundo argumento opcional
       para explorar el directorio [include_path](#ini.include-path),
       pasando el valor de **[true](#constant.true)**.






     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Devuelve el número de bytes leídos desde el fichero
en caso de éxito, o **[false](#constant.false)** si ocurre un error

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Forzar la descarga utilizando readfile()**

&lt;?php
$file = 'monkey.gif';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
    readfile($file);
exit;
}
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Ventana de apertura / guardado](php-bigxhtml-data/images/e88cefb5c3fca5060e2490b9763c4433-readfile.png)


### Notas

**Nota**:

    **readfile()** no presentará problemas de memoria,
    incluso al enviar ficheros grandes. Si se encuentran este tipo
    de problemas, asegúrese de que el buffer de salida está desactivado
    con la función [ob_get_level()](#function.ob-get-level).

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Ver también

    - [fpassthru()](#function.fpassthru) - Muestra el resto del fichero

    - [file()](#function.file) - Lee el fichero y devuelve el resultado en un array

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [include](#function.include) - include

    - [require](#function.require) - require

    - [virtual()](#function.virtual) - Efectúa una subpetición Apache

    - [file_get_contents()](#function.file-get-contents) - Lee todo un fichero en una cadena

    - [Protocolos y Envolturas soportados](#wrappers)

# readlink

(PHP 4, PHP 5, PHP 7, PHP 8)

readlink — Devuelve el contenido de un enlace simbólico

### Descripción

**readlink**([string](#language.types.string) $path): [string](#language.types.string)|[false](#language.types.singleton)

**readlink()** realiza la misma operación que la
función C readlink.

### Parámetros

     path


       La ruta hacia el enlace simbólico.





### Valores devueltos

Devuelve el contenido del enlace simbólico o **[false](#constant.false)** si ocurre un error.

**Nota**:

    La función falla si el argumento path
    no es un enlace simbólico, excepto en Windows, donde se devolverá la ruta personalizada.

### Ejemplos

    **Ejemplo #1 Ejemplo con readlink()**

&lt;?php

// Muestra por ejemplo /boot/vmlinux-2.4.20-xfs
echo readlink('/vmlinuz');

?&gt;

### Ver también

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

    - [symlink()](#function.symlink) - Crea un enlace simbólico

    - [linkinfo()](#function.linkinfo) - Devuelve la información de un enlace

# realpath

(PHP 4, PHP 5, PHP 7, PHP 8)

realpath — Retorna la ruta de acceso canónica absoluta

### Descripción

**realpath**([string](#language.types.string) $path): [string](#language.types.string)|[false](#language.types.singleton)

**realpath()** resuelve todos los enlaces simbólicos, y
reemplaza todas las referencias /./, /../
y / de path luego retorna
la ruta de acceso canónica absoluta así encontrada.

### Parámetros

     path


       La ruta de acceso a verificar.


**Nota**:

         Debe ser proporcionada una ruta de acceso, el valor puede ser una cadena de caracteres vacía.
         En estos casos, el valor es interpretado como el directorio actual.







### Valores devueltos

Retorna la ruta de acceso canónica absoluta
así encontrada. El resultado no contiene ningún enlace simbólico,
/./ o /../. Los delimitadores
de fin como \ y / son igualmente eliminados.

**realpath()** retorna **[false](#constant.false)** si ocurre un error, por ejemplo
si el fichero no existe.

**Nota**:

    El script que se ejecuta debe tener los permisos de ejecución
    sobre todos los directorios de la estructura, de lo contrario, la función
    **realpath()** retornará **[false](#constant.false)**.

**Nota**:

    Para los sistemas de archivos insensibles a mayúsculas/minúsculas,
    **realpath()** puede o no normalizar la casilla de los
    caracteres.

**Nota**:

    La función **realpath()** no funcionará para un
    fichero que se encuentra dentro de un phar ya que esta ruta sería una
    ruta de acceso virtual, no una real.

**Nota**:

    En Windows, las uniones y los enlaces simbólicos a los directorios son
    únicamente extendidos a un nivel.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Ejemplos

    **Ejemplo #1 Ejemplo con realpath()**

&lt;?php
chdir('/var/www/');
echo realpath('./../../etc/passwd') . PHP_EOL;

echo realpath('/tmp/') . PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

/etc/passwd
/tmp

    **Ejemplo #2 Ejemplo con realpath()** en Windows



     En Windows, **realpath()** cambiará las rutas de estilo Unix
     a rutas de estilo Windows.

&lt;?php
echo realpath('/windows/system32'), PHP_EOL;

echo realpath('C:\Program Files\\'), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

C:\WINDOWS\System32
C:\Program Files

### Ver también

    - [basename()](#function.basename) - Devuelve el nombre del componente final de una ruta

    - [dirname()](#function.dirname) - Devuelve la ruta de la carpeta padre

    - [pathinfo()](#function.pathinfo) - Devuelve información sobre una ruta del sistema

# realpath_cache_get

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8)

realpath_cache_get — Recupera las entradas del caché realpath

### Descripción

**realpath_cache_get**(): [array](#language.types.array)

Recupera las entradas del caché realpath.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de entradas del caché realpath. Las claves son los caminos
originales y los valores son arrays de datos que contienen el camino
resuelto, la fecha de expiración y otros parámetros guardados en caché.

### Ejemplos

    **Ejemplo #1 Ejemplo con realpath_cache_get()**

&lt;?php
var_dump(realpath_cache_get());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
["/test"]=&gt;
array(4) {
["key"]=&gt;
int(123456789)
["is_dir"]=&gt;
bool(true)
["realpath"]=&gt;
string(5) "/test"
["expires"]=&gt;
int(1260318939)
}
["/test/test.php"]=&gt;
array(4) {
["key"]=&gt;
int(987654321)
["is_dir"]=&gt;
bool(false)
["realpath"]=&gt;
string(12) "/root/test.php"
["expires"]=&gt;
int(1260318939)
}
}

### Ver también

    - [realpath_cache_size()](#function.realpath-cache-size) - Obtiene el tamaño del caché realpath

# realpath_cache_size

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8)

realpath_cache_size — Obtiene el tamaño del caché realpath

### Descripción

**realpath_cache_size**(): [int](#language.types.integer)

Obtiene la cantidad de memoria utilizada por el caché realpath.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve la cantidad de memoria utilizada por el caché realpath.

### Ejemplos

    **Ejemplo #1 Ejemplo con realpath_cache_size()**

&lt;?php
var_dump(realpath_cache_size());
?&gt;

    Resultado del ejemplo anterior es similar a:

int(412)

### Ver también

    - [realpath_cache_get()](#function.realpath-cache-get) - Recupera las entradas del caché realpath

    -
     La opción de configuración
     [realpath_cache_size](#ini.realpath-cache-size)

# rename

(PHP 4, PHP 5, PHP 7, PHP 8)

rename — Renombra un fichero o un directorio

### Descripción

**rename**([string](#language.types.string) $from, [string](#language.types.string) $to, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [bool](#language.types.boolean)

Intenta renombrar from
a to, moviéndolo de directorio si
es necesario. Si se renombra un fichero y to
existe, será sobrescrito. Si se renombra un directorio y
to existe, esta función emite un aviso.

### Parámetros

     from


       El nombre antiguo.



      **Nota**:



        El gestor utilizado en el argumento
        from *DEBE*
        ser el mismo que el utilizado en to.







     to


       El nuevo nombre.


**Nota**:

         En Windows, si to ya existe, debe poder ser escrito.
         De lo contrario **rename()** falla y emite un **[E_WARNING](#constant.e-warning)**.








     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con rename()**

&lt;?php
rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
?&gt;

### Ver también

    - [copy()](#function.copy) - Copia un fichero

    - [unlink()](#function.unlink) - Elimina un fichero

    - [move_uploaded_file()](#function.move-uploaded-file) - Mueve un archivo subido a una nueva ubicación

# rewind

(PHP 4, PHP 5, PHP 7, PHP 8)

rewind — Reemplaza el puntero de fichero al inicio

### Descripción

**rewind**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Reemplaza el puntero de fichero stream al inicio
del flujo.

**Nota**:

    Si se ha abierto el fichero en modo de adición ("a" o "a+"), todos
    los datos que se escriban en este fichero serán siempre añadidos,
    sin importar la posición del puntero de fichero.

### Parámetros

     stream


       El puntero de fichero debe ser válido y haber sido
       abierto correctamente por [fopen()](#function.fopen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con rewind()**

&lt;?php
$handle = fopen('output.txt', 'r+');

fwrite($handle, 'Really long sentence.');
rewind($handle);
fwrite($handle, 'Foo');
rewind($handle);

echo fread($handle, filesize('output.txt'));

fclose($handle);
?&gt;

    Resultado del ejemplo anterior es similar a:

Foolly long sentence.

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

    - [ftell()](#function.ftell) - Devuelve la posición actual del puntero de archivo

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# rmdir

(PHP 4, PHP 5, PHP 7, PHP 8)

rmdir — Elimina un directorio

### Descripción

**rmdir**([string](#language.types.string) $directory, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [bool](#language.types.boolean)

Intenta eliminar el directorio cuyo camino es
directory. El directorio debe estar vacío,
y el script debe tener los permisos adecuados.
Una advertencia de nivel **[E_WARNING](#constant.e-warning)** será generada
en caso de fallo.

### Parámetros

     directory


       El camino hacia el directorio.






     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con rmdir()**

&lt;?php
if (!is_dir('examples')) {
mkdir('examples');
}

rmdir('examples');
?&gt;

### Ver también

    - [is_dir()](#function.is-dir) - Indica si el fichero es un directorio

    - [mkdir()](#function.mkdir) - Crea un directorio

    - [unlink()](#function.unlink) - Elimina un fichero

# set_file_buffer

(PHP 4, PHP 5, PHP 7, PHP 8)

set_file_buffer — Alias de [stream_set_write_buffer()](#function.stream-set-write-buffer)

### Descripción

Esta función es un alias de:
[stream_set_write_buffer()](#function.stream-set-write-buffer).

# stat

(PHP 4, PHP 5, PHP 7, PHP 8)

stat — Proporciona información sobre un fichero

### Descripción

**stat**([string](#language.types.string) $filename): [array](#language.types.array)|[false](#language.types.singleton)

Proporciona información sobre el fichero filename.
Si filename es un enlace simbólico, la información
proviene del fichero en sí, y no del enlace simbólico.
Antes de PHP 7.4.0, en Windows NTS compila los valores estáticos
size, atime, mtime y
ctime desde los enlaces simbólicos, en este caso.

[lstat()](#function.lstat) es idéntico a
**stat()** excepto que la información se basa
en el enlace simbólico.

### Parámetros

     filename


       La ruta al fichero.





### Valores devueltos

    <caption>**Formato del resultado de stat()** y
     [fstat()](#function.fstat)</caption>



       Número
       Nombre
       Descripción






       0
       dev
       volumen (***)



       1
       ino
       Número de inodo (****)



       2
       mode
       derechos de acceso al inodo *****



       3
       nlink
       número de enlaces



       4
       uid
       userid del propietario (*)



       5
       gid
       groupid del propietario (*)



       6
       rdev
       tipo de volumen, si el volumen es un inodo



       7
       size
       tamaño en bytes



       8
       atime
       fecha del último acceso (timestamp Unix)



       9
       mtime
       fecha de la última modificación (timestamp Unix)



       10
       ctime
       fecha del último cambio de inodo (timestamp Unix)



       11
       blksize
       tamaño de bloque (**)



       12
       blocks
       número de bloques de 512 bytes asignados (**)




-   - En Windows, esto siempre será 0.

\*\* - Solo en sistemas que soportan el tipo st_blksize.
Los otros sistemas (ej. Windows) devuelven -1.

*** - En Windows, desde PHP 7.4.0, será el número de serie del volumen que
contiene el fichero, que será un entero 64-bit *sin signo\*
que puede desbordarse. Anteriormente, era la representación numérica de la letra
del volumen (ej. 2 para C:) para la función
**stat()\*\*, y 0 para la función
[lstat()](#function.lstat).

\**\*\* - En Windows, desde PHP 7.4.0, es el identificador asociado con el fichero,
que será un entero 64-bit *sin signo\* que puede desbordarse.
Anteriormente, siempre era 0.

**\*** En Windows, el bit de permiso de escritura se define en función del atributo
de solo lectura del fichero, y el mismo valor se reporta para todos los usuarios,
grupo y propietario. El ACL no se tiene en cuenta, a diferencia de
[is_writable()](#function.is-writable).

El valor de mode contiene información leída por
varias funciones. Cuando se escribe en octal, comenzando por la derecha,
los tres primeros dígitos son devueltos por [chmod()](#function.chmod).
El siguiente dígito es ignorado por PHP. Los dos siguientes dígitos indican
el tipo de fichero:

    <caption>**Los tipos de ficheros mode**</caption>



       mode en octal
       Significado






       0140000
       socket



       0120000
       enlace simbólico



       0100000
       fichero regular



       0060000
       dispositivo de bloque



       0040000
       directorio



       0020000
       dispositivo de carácter



       0010000
       FIFO (un tubo nombrado)




Por ejemplo, un fichero regular podría ser
0100644 y un directorio podría 0040755.

En caso de error, **stat()** devuelve **[false](#constant.false)**.

**Nota**:
Como el tipo entero de PHP es firmado y que muchas plataformas
utilizan enteros de 32 bits, algunas funciones relacionadas con el sistema
de archivos pueden retornar resultados extraños para archivos de
tamaño superior a 2 Go.

### Errores/Excepciones

Si ocurre un error, se emite una advertencia de tipo
**[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       En Windows, el número del volumen es ahora el número de serie que contiene
       el fichero, y el número de inodo es el identificador asociado con el fichero.




      7.4.0

       Los valores estáticos size, atime,
       mtime y ctime de los enlaces simbólicos
       son siempre los de la meta. Esto no era así previamente
       para los builds NTS en Windows.



### Ejemplos

    **Ejemplo #1 Ejemplo con stat()**

&lt;?php
/_ Obtención de la información _/
$stat = stat('C:\php\php.exe');

/\*

- Mostrar la fecha y hora del acceso a este fichero,
- idéntico a la llamada a la función fileatime()
  \*/
  echo 'Fecha y hora de acceso : ' . $stat['atime'];

/\*

- Mostrar la fecha y hora de modificación del fichero,
- idéntico a la llamada a la función filemtime()
  \*/
  echo 'Fecha y hora de modificación : ' . $stat['mtime'];

/_ Mostrar el número del dispositivo _/
echo 'Número del dispositivo : ' . $stat['dev'];
?&gt;

    **Ejemplo #2 Uso de la información obtenida de stat()**
    junto con la función [touch()](#function.touch)

&lt;?php
/_ Obtención de la información de la función stat _/
$stat = stat('C:\php\php.exe');

/_ ¿Ha fallado el acceso a la información? _/
if (!$stat) {
echo 'La llamada a stat() ha fallado...';
} else {
/\*
_ Queremos que la fecha y hora de acceso sea una
_ semana después de la fecha actual.
\*/
$atime = $stat['atime'] + 604800;

    /* Modificamos el fichero */
    if(!touch('some_file.txt', time(), $atime)) {
        echo 'Fallo al llamar a la función touch()...';
    } else {
        echo 'La llamada a touch() ha tenido éxito...';
    }

}
?&gt;

### Notas

**Nota**:

Tenga en cuenta que la precisión temporal puede variar según el sistema de archivos utilizado.

**Nota**: Los resultados de esta
función se almacenan en caché. Véase la función [clearstatcache()](#function.clearstatcache) para
más detalles.

**Sugerencia**
A partir de PHP 5.0.0, esta función también puede ser utilizada con _algunos_ protocolos url.
Lea [Protocolos y Envolturas soportados](#wrappers) para conocer los protocolos que soportan la familia de funcionalidades de
**stat()**.

### Ver también

    - [lstat()](#function.lstat) - Devuelve información sobre un fichero o un enlace simbólico

    - [fstat()](#function.fstat) - Lee las informaciones sobre un fichero a partir de un puntero de fichero

    - [filemtime()](#function.filemtime) - Lee la fecha de última modificación del fichero

    - [filegroup()](#function.filegroup) - Leer el nombre del grupo

    - [SplFileInfo](#class.splfileinfo)

# symlink

(PHP 4, PHP 5, PHP 7, PHP 8)

symlink — Crea un enlace simbólico

### Descripción

**symlink**([string](#language.types.string) $target, [string](#language.types.string) $link): [bool](#language.types.boolean)

**symlink()** crea un enlace simbólico para el objeto
target con el nombre de link.

### Parámetros

     target


       El objetivo del enlace.






     link


       El nombre del enlace.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

La función falla, y emite una **[E_WARNING](#constant.e-warning)**,
si link ya existe.
En Windows, esta función falla igualmente, y emite una **[E_WARNING](#constant.e-warning)**,
si target no existe.

### Ejemplos

    **Ejemplo #1 Creación de un enlace simbólico**

&lt;?php
$target = 'uploads.php';
$link = 'uploads';
symlink($target, $link);

echo readlink($link);
?&gt;

### Ver también

    - [is_link()](#function.is-link) - Indica si el fichero es un enlace simbólico

    - [link()](#function.link) - Crea un enlace

    - [readlink()](#function.readlink) - Devuelve el contenido de un enlace simbólico

    - [linkinfo()](#function.linkinfo) - Devuelve la información de un enlace

    - [unlink()](#function.unlink) - Elimina un fichero

# tempnam

(PHP 4, PHP 5, PHP 7, PHP 8)

tempnam — Crea un fichero con un nombre único

### Descripción

**tempnam**([string](#language.types.string) $directory, [string](#language.types.string) $prefix): [string](#language.types.string)|[false](#language.types.singleton)

Crea un fichero con un nombre único, con permisos de acceso 0600,
en el directorio especificado. Si el directorio no existe o no es accesible en escritura,
**tempnam()** intentará crear un fichero en el directorio
temporal del sistema, y devolverá la ruta completa de dicho fichero, incluyendo su
nombre.

### Parámetros

     directory


       El directorio en el que se creará el fichero temporal.






     prefix


       El prefijo del fichero temporal generado.



      **Nota**:

        Solo se utilizan los 63 primeros caracteres del prefijo, el resto se ignora.
        Windows utiliza únicamente los 3 primeros caracteres del prefijo.






### Valores devueltos

Devuelve un nuevo fichero temporal (con su ruta), o **[false](#constant.false)**
si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.1.0

       **tempnam()** ahora emite un aviso al recurrir al directorio temporal del sistema.



### Ejemplos

    **Ejemplo #1 Ejemplo con tempnam()**

&lt;?php
$tmpfname = tempnam("/tmp", "FOO");

$handle = fopen($tmpfname, "w");
fwrite($handle, "Escritura en el fichero temporal");
fclose($handle);

// procesamiento

unlink($tmpfname);
?&gt;

### Notas

**Nota**:

    Si PHP no puede crear un fichero en el directorio especificado por el argumento
    directory, intentará hacerlo en el directorio por defecto del sistema.
    En sistemas de archivos NTFS, esto también ocurre si el directorio
    directory contiene más de 65534 ficheros.

### Ver también

    - [tmpfile()](#function.tmpfile) - Crea un fichero temporal

    - [sys_get_temp_dir()](#function.sys-get-temp-dir) - Devuelve la ruta del directorio utilizado para los ficheros temporales

    - [unlink()](#function.unlink) - Elimina un fichero

# tmpfile

(PHP 4, PHP 5, PHP 7, PHP 8)

tmpfile — Crea un fichero temporal

### Descripción

**tmpfile**(): [resource](#language.types.resource)|[false](#language.types.singleton)

Crea un fichero temporal con un nombre único, abierto
en escritura, lectura y binario (w+b), y
devuelve un puntero de fichero.

Este fichero será automáticamente borrado cuando sea
cerrado (por ejemplo, al llamar a la función [fclose()](#function.fclose),
o cuando no haya más referencias al gestor de fichero devuelto
por la función **tmpfile()**), o cuando el script
finalice.

**Precaución**

    Si el script termina de manera inesperada, es posible que el fichero temporal no sea eliminado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un puntero de fichero, idéntico al devuelto
por la función [fopen()](#function.fopen), para el nuevo
fichero o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con tmpfile()**

&lt;?php
$temp = tmpfile();
fwrite($temp, "Escritura en el fichero temporal");
fseek($temp, 0);
echo fread($temp, 1024);
fclose($temp); // esto borrará el fichero
?&gt;

    El ejemplo anterior mostrará:

Escritura en el fichero temporal

### Ver también

    - [tempnam()](#function.tempnam) - Crea un fichero con un nombre único

    - [sys_get_temp_dir()](#function.sys-get-temp-dir) - Devuelve la ruta del directorio utilizado para los ficheros temporales

# touch

(PHP 4, PHP 5, PHP 7, PHP 8)

touch — Modifica la fecha de modificación y de último acceso de un fichero

### Descripción

**touch**([string](#language.types.string) $filename, [?](#language.types.null)[int](#language.types.integer) $mtime = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $atime = **[null](#constant.null)**): [bool](#language.types.boolean)

Intenta forzar la fecha de modificación del fichero
designado por el parámetro filename a la fecha
especificada por el parámetro mtime.
Tenga en cuenta que la fecha de último acceso se modifica, independientemente
del número de argumentos.

Si el fichero no existe, PHP intentará crearlo.

### Parámetros

     filename


       El nombre del fichero a crear.






     mtime


       La fecha de creación. Si mtime es omitido,
       se utiliza la hora actual [time()](#function.time).






     atime


       Si no es **[null](#constant.null)**, la hora de acceso al fichero proporcionado se establecerá a la
       valor del parámetro atime. De lo contrario, se establecerá a
       la valor pasada al parámetro mtime.
       Si ambos son **[null](#constant.null)**, se utilizará la hora actual del sistema.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       mtime y atime
       ahora son nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con touch()**

&lt;?php
if (touch($FileName)) {
echo "La fecha de modificación de $FileName ha sido modificada a la fecha actual";
} else {
echo "Lo sentimos, no es posible cambiar la fecha de modificación de $FileName";
}
?&gt;

    **Ejemplo #2 Ejemplo con touch()** utilizando el parámetro
    mtime

&lt;?php
/\*

- Esta es la fecha y hora del último acceso, le añadimos 1 hora
- en el pasado.
  \*/
  $time = time() - 3600;

/_ ¡Toquemos el fichero! _/
if (!touch('some_file.txt', $time)) {
echo '¡Ups, ha ocurrido un error...';
} else {
echo 'La llamada a la función touch() ha tenido éxito';
}
?&gt;

### Notas

**Nota**:

Tenga en cuenta que la precisión temporal puede variar según el sistema de archivos utilizado.

# umask

(PHP 4, PHP 5, PHP 7, PHP 8)

umask — Cambia el "umask" actual

### Descripción

**umask**([?](#language.types.null)[int](#language.types.integer) $mask = **[null](#constant.null)**): [int](#language.types.integer)

**umask()** cambia el umask de PHP y lo
reemplaza por mask:
mask &amp; 0777 y, a continuación, devuelve el viejo
umask. Cuando PHP se utiliza como módulo de servidor, el
umask recupera su valor al final de cada script.

### Parámetros

     mask


       El nuevo umask.





### Valores devueltos

Si mask es **[null](#constant.null)**,
**umask()** simplemente devuelve el umask actual
de lo contrario se devuelve el antiguo umask.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       mask ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con umask()**

&lt;?php
$old = umask(0);
chmod("/path/some_dir/some_file.txt", 0755);
umask($old);

// Verificación
if ($old != umask()) {
die('Ocurrió un error al modificar los permisos');
}
?&gt;

### Notas

**Nota**:

    Evítese el uso de esta función en un servidor Web multithread.
    Es preferible cambiar los permisos de un directorio con la función
    [chmod()](#function.chmod), después de la creación del directorio. Al utilizar
    **umask()**, puede encontrarse con comportamientos
    indefinidos a nivel de otros scripts y del servidor, ya que todos utilizan
    el mismo umask.

# unlink

(PHP 4, PHP 5, PHP 7, PHP 8)

unlink — Elimina un fichero

### Descripción

**unlink**([string](#language.types.string) $filename, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [bool](#language.types.boolean)

Elimina filename. Similar a la función C Unix
unlink().
En caso de error, se generará una advertencia de nivel **[E_WARNING](#constant.e-warning)**.

### Parámetros

     filename


       Ruta de acceso al fichero.




       Si el fichero es un enlace simbólico, se eliminará el enlace simbólico.
       En Windows, para eliminar un enlace simbólico a un directorio,
       debe utilizarse [rmdir()](#function.rmdir) en su lugar.






     context

      Un [resource](#language.types.resource) de

[contexto de flujo](#stream.contexts).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.3.0

       En Windows, ahora es posible utilizar **unlink()**
       para eliminar ficheros cuyos gestores están en uso, lo cual antes fallaba. Sin embargo, aún no es posible recrear el fichero eliminado hasta que todos sus gestores sean cerrados.



### Ejemplos

    **Ejemplo #1 Ejemplo con unlink()**

&lt;?php
$fh = fopen('test.html', 'a');
fwrite($fh, '&lt;h1&gt;Hello world!&lt;/h1&gt;');
fclose($fh);

unlink('test.html');
?&gt;

### Ver también

    - [rmdir()](#function.rmdir) - Elimina un directorio

## Tabla de contenidos

- [basename](#function.basename) — Devuelve el nombre del componente final de una ruta
- [chgrp](#function.chgrp) — Cambia el grupo de un fichero
- [chmod](#function.chmod) — Cambia el modo del fichero
- [chown](#function.chown) — Cambia el propietario del fichero
- [clearstatcache](#function.clearstatcache) — Elimina la caché de stat
- [copy](#function.copy) — Copia un fichero
- [delete](#function.delete) — Ver unlink o unset
- [dirname](#function.dirname) — Devuelve la ruta de la carpeta padre
- [disk_free_space](#function.disk-free-space) — Devuelve el espacio en disco disponible en el sistema de archivos o partición
- [disk_total_space](#function.disk-total-space) — Devuelve el tamaño de un directorio o partición
- [diskfreespace](#function.diskfreespace) — Alias de disk_free_space
- [fclose](#function.fclose) — Cierra un fichero
- [fdatasync](#function.fdatasync) — Sincroniza los datos (pero no los metadatos) con el fichero
- [feof](#function.feof) — Prueba el final del archivo
- [fflush](#function.fflush) — Envía todo el contenido generado en un fichero
- [fgetc](#function.fgetc) — Lee un carácter en un fichero
- [fgetcsv](#function.fgetcsv) — Obtiene una línea desde un puntero de archivo y la analiza para campos CSV
- [fgets](#function.fgets) — Recupera la línea actual a partir de la posición del puntero de archivo
- [fgetss](#function.fgetss) — Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML
- [file](#function.file) — Lee el fichero y devuelve el resultado en un array
- [file_exists](#function.file-exists) — Verifica si un fichero o un directorio existe
- [file_get_contents](#function.file-get-contents) — Lee todo un fichero en una cadena
- [file_put_contents](#function.file-put-contents) — Escribe datos en un fichero
- [fileatime](#function.fileatime) — Devuelve la fecha en la que el fichero fue accedido por última vez
- [filectime](#function.filectime) — Devuelve la fecha de última modificación del inodo de un fichero
- [filegroup](#function.filegroup) — Leer el nombre del grupo
- [fileinode](#function.fileinode) — Lee el número de inodo del fichero
- [filemtime](#function.filemtime) — Lee la fecha de última modificación del fichero
- [fileowner](#function.fileowner) — Lee el identificador del propietario de un fichero
- [fileperms](#function.fileperms) — Lee los permisos de un fichero
- [filesize](#function.filesize) — Obtiene el tamaño de un fichero
- [filetype](#function.filetype) — Devuelve el tipo de fichero
- [flock](#function.flock) — Bloquea el fichero
- [fnmatch](#function.fnmatch) — Prueba un nombre de fichero mediante un patrón de búsqueda
- [fopen](#function.fopen) — Abre un fichero o un URL
- [fpassthru](#function.fpassthru) — Muestra el resto del fichero
- [fputcsv](#function.fputcsv) — Formatea una línea en CSV y la escribe en un fichero
- [fputs](#function.fputs) — Alias de fwrite
- [fread](#function.fread) — Lectura del archivo en modo binario
- [fscanf](#function.fscanf) — Analiza un archivo según un formato
- [fseek](#function.fseek) — Modifica la posición del puntero de archivo
- [fstat](#function.fstat) — Lee las informaciones sobre un fichero a partir de un puntero de fichero
- [fsync](#function.fsync) — Sincroniza los cambios realizados en el fichero (incluyendo los metadatos)
- [ftell](#function.ftell) — Devuelve la posición actual del puntero de archivo
- [ftruncate](#function.ftruncate) — Tronca un fichero
- [fwrite](#function.fwrite) — Escribe en un fichero en modo binario
- [glob](#function.glob) — Búsqueda de rutas que coinciden con un patrón
- [is_dir](#function.is-dir) — Indica si el fichero es un directorio
- [is_executable](#function.is-executable) — Indica si el fichero es ejecutable
- [is_file](#function.is-file) — Indica si el fichero es un fichero verdadero
- [is_link](#function.is-link) — Indica si el fichero es un enlace simbólico
- [is_readable](#function.is-readable) — Indica si un fichero existe y es accesible en lectura
- [is_uploaded_file](#function.is-uploaded-file) — Indica si el archivo fue subido mediante HTTP POST
- [is_writable](#function.is-writable) — Indica si un fichero es accesible en escritura
- [is_writeable](#function.is-writeable) — Alias de is_writable
- [lchgrp](#function.lchgrp) — Cambiar la pertenencia al grupo de un enlace simbólico
- [lchown](#function.lchown) — Cambia el propietario de un enlace simbólico
- [link](#function.link) — Crea un enlace
- [linkinfo](#function.linkinfo) — Devuelve la información de un enlace
- [lstat](#function.lstat) — Devuelve información sobre un fichero o un enlace simbólico
- [mkdir](#function.mkdir) — Crea un directorio
- [move_uploaded_file](#function.move-uploaded-file) — Mueve un archivo subido a una nueva ubicación
- [parse_ini_file](#function.parse-ini-file) — Analiza un archivo de configuración
- [parse_ini_string](#function.parse-ini-string) — Analiza una cadena de configuración
- [pathinfo](#function.pathinfo) — Devuelve información sobre una ruta del sistema
- [pclose](#function.pclose) — Cierra un proceso de un puntero a un fichero
- [popen](#function.popen) — Crea un puntero de archivo de proceso
- [readfile](#function.readfile) — Muestra un fichero
- [readlink](#function.readlink) — Devuelve el contenido de un enlace simbólico
- [realpath](#function.realpath) — Retorna la ruta de acceso canónica absoluta
- [realpath_cache_get](#function.realpath-cache-get) — Recupera las entradas del caché realpath
- [realpath_cache_size](#function.realpath-cache-size) — Obtiene el tamaño del caché realpath
- [rename](#function.rename) — Renombra un fichero o un directorio
- [rewind](#function.rewind) — Reemplaza el puntero de fichero al inicio
- [rmdir](#function.rmdir) — Elimina un directorio
- [set_file_buffer](#function.set-file-buffer) — Alias de stream_set_write_buffer
- [stat](#function.stat) — Proporciona información sobre un fichero
- [symlink](#function.symlink) — Crea un enlace simbólico
- [tempnam](#function.tempnam) — Crea un fichero con un nombre único
- [tmpfile](#function.tmpfile) — Crea un fichero temporal
- [touch](#function.touch) — Modifica la fecha de modificación y de último acceso de un fichero
- [umask](#function.umask) — Cambia el "umask" actual
- [unlink](#function.unlink) — Elimina un fichero

- [Introducción](#intro.filesystem)
- [Instalación/Configuración](#filesystem.setup)<li>[Configuración en tiempo de ejecución](#filesystem.configuration)
- [Tipos de recursos](#filesystem.resources)
  </li>- [Constantes predefinidas](#filesystem.constants)
- [Funciones del Sistema de Archivos](#ref.filesystem)<li>[basename](#function.basename) — Devuelve el nombre del componente final de una ruta
- [chgrp](#function.chgrp) — Cambia el grupo de un fichero
- [chmod](#function.chmod) — Cambia el modo del fichero
- [chown](#function.chown) — Cambia el propietario del fichero
- [clearstatcache](#function.clearstatcache) — Elimina la caché de stat
- [copy](#function.copy) — Copia un fichero
- [delete](#function.delete) — Ver unlink o unset
- [dirname](#function.dirname) — Devuelve la ruta de la carpeta padre
- [disk_free_space](#function.disk-free-space) — Devuelve el espacio en disco disponible en el sistema de archivos o partición
- [disk_total_space](#function.disk-total-space) — Devuelve el tamaño de un directorio o partición
- [diskfreespace](#function.diskfreespace) — Alias de disk_free_space
- [fclose](#function.fclose) — Cierra un fichero
- [fdatasync](#function.fdatasync) — Sincroniza los datos (pero no los metadatos) con el fichero
- [feof](#function.feof) — Prueba el final del archivo
- [fflush](#function.fflush) — Envía todo el contenido generado en un fichero
- [fgetc](#function.fgetc) — Lee un carácter en un fichero
- [fgetcsv](#function.fgetcsv) — Obtiene una línea desde un puntero de archivo y la analiza para campos CSV
- [fgets](#function.fgets) — Recupera la línea actual a partir de la posición del puntero de archivo
- [fgetss](#function.fgetss) — Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML
- [file](#function.file) — Lee el fichero y devuelve el resultado en un array
- [file_exists](#function.file-exists) — Verifica si un fichero o un directorio existe
- [file_get_contents](#function.file-get-contents) — Lee todo un fichero en una cadena
- [file_put_contents](#function.file-put-contents) — Escribe datos en un fichero
- [fileatime](#function.fileatime) — Devuelve la fecha en la que el fichero fue accedido por última vez
- [filectime](#function.filectime) — Devuelve la fecha de última modificación del inodo de un fichero
- [filegroup](#function.filegroup) — Leer el nombre del grupo
- [fileinode](#function.fileinode) — Lee el número de inodo del fichero
- [filemtime](#function.filemtime) — Lee la fecha de última modificación del fichero
- [fileowner](#function.fileowner) — Lee el identificador del propietario de un fichero
- [fileperms](#function.fileperms) — Lee los permisos de un fichero
- [filesize](#function.filesize) — Obtiene el tamaño de un fichero
- [filetype](#function.filetype) — Devuelve el tipo de fichero
- [flock](#function.flock) — Bloquea el fichero
- [fnmatch](#function.fnmatch) — Prueba un nombre de fichero mediante un patrón de búsqueda
- [fopen](#function.fopen) — Abre un fichero o un URL
- [fpassthru](#function.fpassthru) — Muestra el resto del fichero
- [fputcsv](#function.fputcsv) — Formatea una línea en CSV y la escribe en un fichero
- [fputs](#function.fputs) — Alias de fwrite
- [fread](#function.fread) — Lectura del archivo en modo binario
- [fscanf](#function.fscanf) — Analiza un archivo según un formato
- [fseek](#function.fseek) — Modifica la posición del puntero de archivo
- [fstat](#function.fstat) — Lee las informaciones sobre un fichero a partir de un puntero de fichero
- [fsync](#function.fsync) — Sincroniza los cambios realizados en el fichero (incluyendo los metadatos)
- [ftell](#function.ftell) — Devuelve la posición actual del puntero de archivo
- [ftruncate](#function.ftruncate) — Tronca un fichero
- [fwrite](#function.fwrite) — Escribe en un fichero en modo binario
- [glob](#function.glob) — Búsqueda de rutas que coinciden con un patrón
- [is_dir](#function.is-dir) — Indica si el fichero es un directorio
- [is_executable](#function.is-executable) — Indica si el fichero es ejecutable
- [is_file](#function.is-file) — Indica si el fichero es un fichero verdadero
- [is_link](#function.is-link) — Indica si el fichero es un enlace simbólico
- [is_readable](#function.is-readable) — Indica si un fichero existe y es accesible en lectura
- [is_uploaded_file](#function.is-uploaded-file) — Indica si el archivo fue subido mediante HTTP POST
- [is_writable](#function.is-writable) — Indica si un fichero es accesible en escritura
- [is_writeable](#function.is-writeable) — Alias de is_writable
- [lchgrp](#function.lchgrp) — Cambiar la pertenencia al grupo de un enlace simbólico
- [lchown](#function.lchown) — Cambia el propietario de un enlace simbólico
- [link](#function.link) — Crea un enlace
- [linkinfo](#function.linkinfo) — Devuelve la información de un enlace
- [lstat](#function.lstat) — Devuelve información sobre un fichero o un enlace simbólico
- [mkdir](#function.mkdir) — Crea un directorio
- [move_uploaded_file](#function.move-uploaded-file) — Mueve un archivo subido a una nueva ubicación
- [parse_ini_file](#function.parse-ini-file) — Analiza un archivo de configuración
- [parse_ini_string](#function.parse-ini-string) — Analiza una cadena de configuración
- [pathinfo](#function.pathinfo) — Devuelve información sobre una ruta del sistema
- [pclose](#function.pclose) — Cierra un proceso de un puntero a un fichero
- [popen](#function.popen) — Crea un puntero de archivo de proceso
- [readfile](#function.readfile) — Muestra un fichero
- [readlink](#function.readlink) — Devuelve el contenido de un enlace simbólico
- [realpath](#function.realpath) — Retorna la ruta de acceso canónica absoluta
- [realpath_cache_get](#function.realpath-cache-get) — Recupera las entradas del caché realpath
- [realpath_cache_size](#function.realpath-cache-size) — Obtiene el tamaño del caché realpath
- [rename](#function.rename) — Renombra un fichero o un directorio
- [rewind](#function.rewind) — Reemplaza el puntero de fichero al inicio
- [rmdir](#function.rmdir) — Elimina un directorio
- [set_file_buffer](#function.set-file-buffer) — Alias de stream_set_write_buffer
- [stat](#function.stat) — Proporciona información sobre un fichero
- [symlink](#function.symlink) — Crea un enlace simbólico
- [tempnam](#function.tempnam) — Crea un fichero con un nombre único
- [tmpfile](#function.tmpfile) — Crea un fichero temporal
- [touch](#function.touch) — Modifica la fecha de modificación y de último acceso de un fichero
- [umask](#function.umask) — Cambia el "umask" actual
- [unlink](#function.unlink) — Elimina un fichero
  </li>
