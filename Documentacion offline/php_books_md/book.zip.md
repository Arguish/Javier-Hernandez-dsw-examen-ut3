# Zip

# Introducción

Esta extensión permite leer o escribir de forma transparente archivos
comprimidos ZIP y los ficheros que hay dentro.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#zip.requirements)
- [Instalación](#zip.installation)
- [Tipos de recursos](#zip.resources)

    ## Requerimientos

    Esta extensión requiere [» libzip](https://libzip.org/). La versión 1.1.2 estaba incluida en PHP hasta la versión 7.3.

    La versión mínima soportada es 0.11, pero se recomienda encarecidamente una versión superior.
    - Versión 1.2 requerida para soporte de encriptación, ver [ZipArchive::setEncryptionIndex()](#ziparchive.setencryptionindex)

    - Versión 1.3 requerida para soporte de progreso, ver [ZipArchive::registerProgressCallback()](#ziparchive.registerprogresscallback)

    - Versión 1.6 requerida para soporte de cancelación, ver [ZipArchive::registerCancelCallback()](#ziparchive.registercancelcallback)

## Instalación

    ## Sistemas Linux


     Para usar estas funciones, PHP debe compilarse con soporte ZIP
     utilizando la opción de configuración **--with-zip**.




     Antes de PHP 7.4.0, libzip estaba incluida con PHP,
     y para compilar la extensión se necesitaba usar la opción de configuración
     **--enable-zip**.
     Compilar contra la libzip incluida estaba desaconsejado a partir de PHP 7.3.0,
     pero aún era posible usando la opción de configuración
     **--without-libzip**.




     Se ha añadido una opción de configuración **--with-libzip=DIR**
     para usar una instalación de libzip del sistema. Se requiere la versión 0.11 de libzip,
     recomendándose la 0.11.2 o superior.






    ## Windows


     A partir de PHP 8.2.0, el archivo php_zip.dll DLL debe ser
     [habilitado](#install.pecl.windows.loading) en
     php.ini.
     Anteriormente, esta extensión estaba integrada.

## Instalación mediante PECL

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/zip](https://pecl.php.net/package/zip).

## Tipos de recursos

Existen dos tipos de recursos usados en el módulo Zip. El primero es
el directorio Zip para el fichero Zip, el segundo la entrada Zip
para la entrada de archivos.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

[ZipArchive](#class.ziparchive) usa constantes de clase.
Existen tres tipos de constantes:
Flags (prefijadas con FL*),
errores (prefijados con ER*) y
modos (sin prefijo).

**Archive open modes**

    **[ZipArchive::CREATE](#ziparchive.constants.create)**
    ([int](#language.types.integer))



     Crea el archivo si no existe.





    **[ZipArchive::OVERWRITE](#ziparchive.constants.overwrite)**
    ([int](#language.types.integer))



     Si existe un archivo, ignora su contenido actual.
     En otras palabras, lo trata de la misma manera que un archivo vacío.






    **[ZipArchive::EXCL](#ziparchive.constants.excl)**
    ([int](#language.types.integer))



     Error si el fichero ya existe.






    **[ZipArchive::RDONLY](#ziparchive.constants.rdonly)**
    ([int](#language.types.integer))



     Abrir archivo en modo de solo lectura.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.17.1, respectivamente,
     si se compila con libzip ≥ 1.0.0.






    **[ZipArchive::CHECKCONS](#ziparchive.constants.checkcons)**
    ([int](#language.types.integer))



     Realiza comprobaciones de coherencia adicionales al archivo, producirá un error si falla.

**Archive global flags**

    **[ZipArchive::AFL_RDONLY](#ziparchive.constants.afl-rdonly)**
    ([int](#language.types.integer))



     Archivo en modo de solo lectura, no se puede borrar.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.





    **[ZipArchive::AFL_IS_TORRENTZIP](#ziparchive.constants.afl-is-torrentzip)**
    ([int](#language.types.integer))



     Sl archivo actual está comprimido en torrentzip.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.





    **[ZipArchive::AFL_WANT_TORRENTZIP](#ziparchive.constants.afl-want-torrentzip)**
    ([int](#language.types.integer))



     Crear archivo en formato torrentzip.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.





    **[ZipArchive::AFL_CREATE_OR_KEEP_FILE_FOR_EMPTY_ARCHIVE](#ziparchive.constants.afl-create-or-keep-file-for-empty-archive)**
    ([int](#language.types.integer))



     No eliminar archivo si el archivo está vacío.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.

**Archive flags**

    **[ZipArchive::FL_NOCASE](#ziparchive.constants.fl-nocase)**
    ([int](#language.types.integer))



     Ignorar mayúsculas el lookup del nombre





    **[ZipArchive::FL_NODIR](#ziparchive.constants.fl-nodir)**
    ([int](#language.types.integer))



     Ignorar el componente directorio





    **[ZipArchive::FL_COMPRESSED](#ziparchive.constants.fl-compressed)**
    ([int](#language.types.integer))



     Leer datos comprimidos





    **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**
    ([int](#language.types.integer))



     Usar los datos originales, ignorando cambios.





    **[ZipArchive::FL_RECOMPRESS](#ziparchive.constants.fl-recompress)**
    ([int](#language.types.integer))



     Forzar la recompresión de los datos.
     Disponible a partir de PHP 8.0.0 y PECL zip 1.18.0.
     Deprecated as of PHP 8.3.0 and PECL zip 1.22.1,
     will be removed in a future version of libzip.





    **[ZipArchive::FL_ENCRYPTED](#ziparchive.constants.fl-encrypted)**
    ([int](#language.types.integer))



     Leer datos encriptados (implica FL_COMPRESSED).
     Disponible a partir de PHP 8.0.0 y PECL zip 1.18.0.





    **[ZipArchive::FL_OVERWRITE](#ziparchive.constants.fl-overwrite)**
    ([int](#language.types.integer))



     Si existe un archivo con nombre, sobrescríbalo (reemplácelo).
     Disponible a partir de PHP 8.0.0 y PECL zip 1.18.0.





    **[ZipArchive::FL_LOCAL](#ziparchive.constants.fl-local)**
    ([int](#language.types.integer))



     En la cabecera local.
     Disponible a partir de PHP 8.0.0 y PECL zip 1.18.0.





    **[ZipArchive::FL_CENTRAL](#ziparchive.constants.fl-central)**
    ([int](#language.types.integer))



     En el directorio central.
     Disponible a partir de PHP 8.0.0 y PECL zip 1.18.0.






    **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**
    ([int](#language.types.integer))



     Codificación de la cadena de suposición (guess string) (predeterminado). Disponible a partir de PHP 7.0.8.





    **[ZipArchive::FL_ENC_RAW](#ziparchive.constants.fl-enc-raw)**
    ([int](#language.types.integer))



     Obtener la cadena sin modificaciones. Disponible a partir de PHP 7.0.8.





    **[ZipArchive::FL_ENC_STRICT](#ziparchive.constants.fl-enc-strict)**
    ([int](#language.types.integer))



     Seguir la especificación estrictamente. Disponible a partir de PHP 7.0.8.





    **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**
    ([int](#language.types.integer))



     La cadena está codificada en UTF-8. Disponible a partir de PHP 7.0.8.





    **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**
    ([int](#language.types.integer))



     La cadena está codifica en CP437. Disponible a partir de PHP 7.0.8.





    **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**
    ([int](#language.types.integer))



     Open the file when added instead of waiting for archive to be closed.
     Be aware of file descriptors consumption.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.1.

**Compression modes**

    **[ZipArchive::CM_DEFAULT](#ziparchive.constants.cm-default)**
    ([int](#language.types.integer))



     Mejor para desinflar o almacenar.





    **[ZipArchive::CM_STORE](#ziparchive.constants.cm-store)**
    ([int](#language.types.integer))



     almacenar (no comprimir).





    **[ZipArchive::CM_SHRINK](#ziparchive.constants.cm-shrink)**
    ([int](#language.types.integer))



     Reducir





    **[ZipArchive::CM_REDUCE_1](#ziparchive.constants.cm-reduce-1)**
    ([int](#language.types.integer))



     reducido con factor 1





    **[ZipArchive::CM_REDUCE_2](#ziparchive.constants.cm-reduce-2)**
    ([int](#language.types.integer))



     reducido con factor 2





    **[ZipArchive::CM_REDUCE_3](#ziparchive.constants.cm-reduce-3)**
    ([int](#language.types.integer))



     reducido con factor 3





    **[ZipArchive::CM_REDUCE_4](#ziparchive.constants.cm-reduce-4)**
    ([int](#language.types.integer))



     reducido con factor 4





    **[ZipArchive::CM_IMPLODE](#ziparchive.constants.cm-implode)**
    ([int](#language.types.integer))



     implodado





    **[ZipArchive::CM_DEFLATE](#ziparchive.constants.cm-deflate)**
    ([int](#language.types.integer))



     Deflactado





    **[ZipArchive::CM_DEFLATE64](#ziparchive.constants.cm-deflate64)**
    ([int](#language.types.integer))



     deflate64





    **[ZipArchive::CM_PKWARE_IMPLODE](#ziparchive.constants.cm-pkware-implode)**
    ([int](#language.types.integer))



     PKWARE imploding





    **[ZipArchive::CM_BZIP2](#ziparchive.constants.cm-bzip2)**
    ([int](#language.types.integer))



     Algoritmo BZIP2





    **[ZipArchive::CM_LZMA](#ziparchive.constants.cm-lzma)**
    ([int](#language.types.integer))



     Algoritmo LZMA





    **[ZipArchive::CM_LZMA2](#ziparchive.constants.cm-lzma2)**
    ([int](#language.types.integer))



     Algoritmo LZMA2.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.0, respectivamente,
     si se compila con libzip ≥ 1.6.0.





    **[ZipArchive::CM_ZSTD](#ziparchive.constants.cm-zstd)**
    ([int](#language.types.integer))



     Algoritmo Zstandard.
     Disponible a partir de PHP 8.0.0 y PECL zip 1.19.1, respectivamente,
     si se compila con libzip ≥ 1.8.0.





    **[ZipArchive::CM_XZ](#ziparchive.constants.cm-xz)**
    ([int](#language.types.integer))



     Algoritmo XZ.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.6.0.





    **[ZipArchive::CM_TERSE](#ziparchive.constants.cm-terse)**
    ([int](#language.types.integer))







    **[ZipArchive::CM_LZ77](#ziparchive.constants.cm-lz77)**
    ([int](#language.types.integer))







    **[ZipArchive::CM_WAVPACK](#ziparchive.constants.cm-wavpack)**
    ([int](#language.types.integer))







    **[ZipArchive::CM_PPMD](#ziparchive.constants.cm-ppmd)**
    ([int](#language.types.integer))

**Errors**

    **[ZipArchive::ER_OK](#ziparchive.constants.er-ok)**
    ([int](#language.types.integer))



     Sin errores.





    **[ZipArchive::ER_MULTIDISK](#ziparchive.constants.er-multidisk)**
    ([int](#language.types.integer))



     Archivos zip multi-disk no soportados.





    **[ZipArchive::ER_RENAME](#ziparchive.constants.er-rename)**
    ([int](#language.types.integer))



     Mantener fichero temporal fallado.





    **[ZipArchive::ER_CLOSE](#ziparchive.constants.er-close)**
    ([int](#language.types.integer))



     Cerrar fichero zip fallado.





    **[ZipArchive::ER_SEEK](#ziparchive.constants.er-seek)**
    ([int](#language.types.integer))



     Buscar error





    **[ZipArchive::ER_READ](#ziparchive.constants.er-read)**
    ([int](#language.types.integer))



     Leer error






    **[ZipArchive::ER_WRITE](#ziparchive.constants.er-write)**
    ([int](#language.types.integer))



     Escribir error





    **[ZipArchive::ER_CRC](#ziparchive.constants.er-crc)**
    ([int](#language.types.integer))



     Error CRC





    **[ZipArchive::ER_ZIPCLOSED](#ziparchive.constants.er-zipclosed)**
    ([int](#language.types.integer))



     Conteniendo el fichero zip que ha sido cerrado





    **[ZipArchive::ER_NOENT](#ziparchive.constants.er-noent)**
    ([int](#language.types.integer))



     No existe el fichero.





    **[ZipArchive::ER_EXISTS](#ziparchive.constants.er-exists)**
    ([int](#language.types.integer))



     El fichero ya existe





    **[ZipArchive::ER_OPEN](#ziparchive.constants.er-open)**
    ([int](#language.types.integer))



     No se puede abrir el fichero





    **[ZipArchive::ER_TMPOPEN](#ziparchive.constants.er-tmpopen)**
    ([int](#language.types.integer))



     Fallo al intentar crear fichero temporal.





    **[ZipArchive::ER_ZLIB](#ziparchive.constants.er-zlib)**
    ([int](#language.types.integer))



     Error de Zlib






    **[ZipArchive::ER_MEMORY](#ziparchive.constants.er-memory)**
    ([int](#language.types.integer))



     Error de asignación de memoria






    **[ZipArchive::ER_CHANGED](#ziparchive.constants.er-changed)**
    ([int](#language.types.integer))



     La entrada a cambiado






    **[ZipArchive::ER_COMPNOTSUPP](#ziparchive.constants.er-compnotsupp)**
    ([int](#language.types.integer))



     Método de compresión no soportado.





    **[ZipArchive::ER_EOF](#ziparchive.constants.er-eof)**
    ([int](#language.types.integer))



     EOF precoz.





    **[ZipArchive::ER_INVAL](#ziparchive.constants.er-inval)**
    ([int](#language.types.integer))



     Argumento inválido





    **[ZipArchive::ER_NOZIP](#ziparchive.constants.er-nozip)**
    ([int](#language.types.integer))



     No es un archivo zip





    **[ZipArchive::ER_INTERNAL](#ziparchive.constants.er-internal)**
    ([int](#language.types.integer))



     Error interno





    **[ZipArchive::ER_INCONS](#ziparchive.constants.er-incons)**
    ([int](#language.types.integer))



     Fichero Zip inconsistente





    **[ZipArchive::ER_REMOVE](#ziparchive.constants.er-remove)**
    ([int](#language.types.integer))



     No se puede eliminar el fichero





    **[ZipArchive::ER_DELETED](#ziparchive.constants.er-deleted)**
    ([int](#language.types.integer))



     La entrada ha sido eliminada





    **[ZipArchive::ER_ENCRNOTSUPP](#ziparchive.constants.er-encrnotsupp)**
    ([int](#language.types.integer))



     No se admite el método de cifrado.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente.





    **[ZipArchive::ER_RDONLY](#ziparchive.constants.er-rdonly)**
    ([int](#language.types.integer))



     Archivo de sólo lectura.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente.





    **[ZipArchive::ER_NOPASSWD](#ziparchive.constants.er-nopasswd)**
    ([int](#language.types.integer))



     No se ha proporcionado ninguna contraseña.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente.





    **[ZipArchive::ER_WRONGPASSWD](#ziparchive.constants.er-wrongpasswd)**
    ([int](#language.types.integer))



     Contraseña incorrecta proporcionada.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente.





    **[ZipArchive::ER_OPNOTSUPP](#ziparchive.constants.er-opnotsupp)**
    ([int](#language.types.integer))



     Operación no soportada.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.0.0.





    **[ZipArchive::ER_INUSE](#ziparchive.constants.er-inuse)**
    ([int](#language.types.integer))



     Recurso todavía en uso.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.0.0.





    **[ZipArchive::ER_TELL](#ziparchive.constants.er-tell)**
    ([int](#language.types.integer))



     Diga error.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.0.0.





    **[ZipArchive::ER_COMPRESSED_DATA](#ziparchive.constants.er-compressed-data)**
    ([int](#language.types.integer))



     Los datos comprimidos no son válidos.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.6.0.





    **[ZipArchive::ER_CANCELLED](#ziparchive.constants.er-cancelled)**
    ([int](#language.types.integer))



     Operation cancelled.
     Disponible a partir de PHP 7.4.3 y PECL zip 1.16.1, respectivamente,
     si se compila con libzip ≥ 1.6.0.





    **[ZipArchive::ER_DATA_LENGTH](#ziparchive.constants.er-data-length)**
    ([int](#language.types.integer))



     Unexpected length of data.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.





    **[ZipArchive::ER_NOT_ALLOWED](#ziparchive.constants.er-not-allowed)**
    ([int](#language.types.integer))



     Not allowed in torrentzip.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.0, respectivamente,
     si se compila con libzip ≥ 1.10.0.





     **[ZipArchive::ER_TRUNCATED_ZIP](#ziparchive.constants.er-truncated-zip)**
     ([int](#language.types.integer))



      Archivo zip posiblemente truncado o corrupto.
      Disponible a partir de PHP 8.4.0 y PECL zip 1.22.4, respectivamente,
      si se compila contra libzip ≥ 1.11.1.


**Encryption modes**

    **[ZipArchive::EM_NONE](#ziparchive.constants.em-none)**
    ([int](#language.types.integer))



     No hay encriptación. Disponible a partir de PHP 7.2.0 y PECL zip 1.14.0, respectivamente.





    **[ZipArchive::EM_TRAD_PKWARE](#ziparchive.constants.em-trad-pkware)**
    ([int](#language.types.integer))



     Traditional PKWARE encryption. Disponible a partir de PHP 8.0.0 y PECL zip 1.19.0, respectivamente.





    **[ZipArchive::EM_AES_128](#ziparchive.constants.em-aes-128)**
    ([int](#language.types.integer))



     Encriptación AES 128. Disponible a partir de PHP 7.2.0 y PECL zip 1.14.0, respectivamente,
     si se compila con libzip ≥ 1.2.0.





    **[ZipArchive::EM_AES_192](#ziparchive.constants.em-aes-192)**
    ([int](#language.types.integer))



     Encriptación AES 192. Disponible a partir de PHP 7.2.0 y PECL zip 1.14.0, respectivamente,
     si se compila con libzip ≥ 1.2.0.





    **[ZipArchive::EM_AES_256](#ziparchive.constants.em-aes-256)**
    ([int](#language.types.integer))



     Encriptación AES 256. Disponible a partir de PHP 7.2.0 y PECL zip 1.14.0, respectivamente,
     si se compila con libzip ≥ 1.2.0.





    **[ZipArchive::EM_UNKNOWN](#ziparchive.constants.em-unknown)**
    ([int](#language.types.integer))



     Unknown encryption algorithm. Disponible a partir de PHP 8.0.0 y PECL zip 1.19.0, respectivamente.

**Length parameter constants**

    **[ZipArchive::LENGTH_TO_END](#ziparchive.constants.length-to-end)**
    ([int](#language.types.integer))



     Use file size, if the file grows additional data is ignored, if the file shrinks an error is raised (**[ZipArchive::ER_DATA_LENGTH](#ziparchive.constants.er-data-length)**).
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.2.





    **[ZipArchive::LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked)**
    ([int](#language.types.integer))



     Use all available data.
     Disponible a partir de PHP 8.3.0 y PECL zip 1.22.2, si se compila con libzip ≥ 1.10.1.

**Other constants**

    **[ZipArchive::LIBZIP_VERSION](#ziparchive.constants.libzip-version)**
    ([string](#language.types.string))



     Versión de la biblioteca Zip. Disponible a partir de PHP 7.4.3 y PECL zip 1.16.0.

**Constantes de sistema operativo para atributos externos**

    **[ZipArchive::OPSYS_DOS](#ziparchive.constants.opsys-dos)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_AMIGA](#ziparchive.constants.opsys-amiga)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_OPENVMS](#ziparchive.constants.opsys-openvms)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_UNIX](#ziparchive.constants.opsys-unix)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_VM_CMS](#ziparchive.constants.opsys-vm-cms)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_ATARI_ST](#ziparchive.constants.opsys-atari-st)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_OS_2](#ziparchive.constants.opsys-os-2)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_MACINTOSH](#ziparchive.constants.opsys-macintosh)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_Z_SYSTEM](#ziparchive.constants.opsys-z-system)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_CPM](#ziparchive.constants.opsys-cpm)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_WINDOWS_NTFS](#ziparchive.constants.opsys-windows-ntfs)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_MVS](#ziparchive.constants.opsys-mvs)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_VSE](#ziparchive.constants.opsys-vse)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_ACORN_RISC](#ziparchive.constants.opsys-acorn-risc)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_VFAT](#ziparchive.constants.opsys-vfat)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_ALTERNATE_MVS](#ziparchive.constants.opsys-alternate-mvs)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_BEOS](#ziparchive.constants.opsys-beos)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_TANDEM](#ziparchive.constants.opsys-tandem)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_OS_400](#ziparchive.constants.opsys-os-400)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_OS_X](#ziparchive.constants.opsys-os-x)**
    ([int](#language.types.integer))







    **[ZipArchive::OPSYS_DEFAULT](#ziparchive.constants.opsys-default)**
    ([int](#language.types.integer))



     Disponible a partir de PECL zip 1.12.4.

# Ejemplos

**Ejemplo #1 Crear un fichero Zip **

&lt;?php

$zip = new ZipArchive();
$filename = "./test112.zip";

if ($zip-&gt;open($filename, ZipArchive::CREATE)!==TRUE) {
exit("cannot open &lt;$filename&gt;\n");
}

$zip-&gt;addFromString("testfilephp.txt" . time(), "#1 Esto es una cadena de prueba añadida como  testfilephp.txt.\n");
$zip-&gt;addFromString("testfilephp2.txt" . time(), "#2 Esto es una cadena de prueba añadida como testfilephp2.txt.\n");
$zip-&gt;addFile($thisdir . "/too.php","/testfromfile.php");
echo "numficheros: " . $zip-&gt;numFiles . "\n";
echo "estado:" . $zip-&gt;status . "\n";
$zip-&gt;close();
?&gt;

**Ejemplo #2 Volcar la información del archivo y listarlos**

&lt;?php
$za = new ZipArchive();

$za-&gt;open('test_with_comment.zip');
print_r($za);
var_dump($za);
echo "numFicheros: " . $za-&gt;numFiles . "\n";
echo "estado: " . $za-&gt;status . "\n";
echo "estadosSis: " . $za-&gt;statusSys . "\n";
echo "nombreFichero: " . $za-&gt;filename . "\n";
echo "comentario: " . $za-&gt;comment . "\n";

for ($i=0; $i&lt;$za-&gt;numFiles;$i++) {
    echo "index: $i\n";
    print_r($za-&gt;statIndex($i));
}
echo "numFichero:" . $za-&gt;numFiles . "\n";
?&gt;

**Ejemplo #3 Usando contenedor Zip, leer meta info de OpenOffice**

&lt;?php
$reader = new XMLReader();

$reader-&gt;open('zip://' . dirname(__FILE__) . '/test.odt#meta.xml');
$odt_meta = array();
while ($reader-&gt;read()) {
    if ($reader-&gt;nodeType == XMLREADER::ELEMENT) {
$elm = $reader-&gt;name;
    } else {
        if ($reader-&gt;nodeType == XMLREADER::END_ELEMENT &amp;&amp; $reader-&gt;name == 'office:meta') {
            break;
        }
        if (!trim($reader-&gt;value)) {
continue;
}
$odt_meta[$elm] = $reader-&gt;value;
    }
}
print_r($odt_meta);
?&gt;

Este ejemplo utiliza la antigua API (PHP 4), abre un fichero ZIP,
lee cada fichero del archivo y imprime
su contenido. El archivotest2.zip usado en este
ejmplo es uno de los archivos de prueba la fuente de distribución
de ZZIPlib.

**Ejemplo #4 Ejemplo del uso de Zip**

&lt;?php

$zip = zip_open("/tmp/test2.zip");

if ($zip) {
    while ($zip_entry = zip_read($zip)) {
        echo "Nombre:               " . zip_entry_name($zip_entry) . "\n";
echo "Tamaño actual del fichero: " . zip_entry_filesize($zip_entry) . "\n";
        echo "Tamaño comprimido:    " . zip_entry_compressedsize($zip_entry) . "\n";
echo "Método de compresión: " . zip_entry_compressionmethod($zip_entry) . "\n";

        if (zip_entry_open($zip, $zip_entry, "r")) {
            echo "Contenido del fichero:\n";
            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            echo "$buf\n";

            zip_entry_close($zip_entry);
        }
        echo "\n";

    }

    zip_close($zip);

}
?&gt;

# La clase [ZipArchive](#class.ziparchive)

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

## Introducción

    Un fichero, comprimido con Zip.

## Sinopsis de la Clase

     class **ZipArchive**



     implements
      [Countable](#class.countable) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [CREATE](#ziparchive.constants.create);

    public
     const
     [int](#language.types.integer)
      [EXCL](#ziparchive.constants.excl);

    public
     const
     [int](#language.types.integer)
      [CHECKCONS](#ziparchive.constants.checkcons);

    public
     const
     [int](#language.types.integer)
      [OVERWRITE](#ziparchive.constants.overwrite);

    public
     const
     [int](#language.types.integer)
      [RDONLY](#ziparchive.constants.rdonly);

    public
     const
     [int](#language.types.integer)
      [FL_NOCASE](#ziparchive.constants.fl-nocase);

    public
     const
     [int](#language.types.integer)
      [FL_NODIR](#ziparchive.constants.fl-nodir);

    public
     const
     [int](#language.types.integer)
      [FL_COMPRESSED](#ziparchive.constants.fl-compressed);

    public
     const
     [int](#language.types.integer)
      [FL_UNCHANGED](#ziparchive.constants.fl-unchanged);

    public
     const
     [int](#language.types.integer)
      [FL_RECOMPRESS](#ziparchive.constants.fl-recompress);

    public
     const
     [int](#language.types.integer)
      [FL_ENCRYPTED](#ziparchive.constants.fl-encrypted);

    public
     const
     [int](#language.types.integer)
      [FL_OVERWRITE](#ziparchive.constants.fl-overwrite);

    public
     const
     [int](#language.types.integer)
      [FL_LOCAL](#ziparchive.constants.fl-local);

    public
     const
     [int](#language.types.integer)
      [FL_CENTRAL](#ziparchive.constants.fl-central);

    public
     const
     [int](#language.types.integer)
      [FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess);

    public
     const
     [int](#language.types.integer)
      [FL_ENC_RAW](#ziparchive.constants.fl-enc-raw);

    public
     const
     [int](#language.types.integer)
      [FL_ENC_STRICT](#ziparchive.constants.fl-enc-strict);

    public
     const
     [int](#language.types.integer)
      [FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8);

    public
     const
     [int](#language.types.integer)
      [FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437);

    public
     const
     [int](#language.types.integer)
      [FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now);

    public
     const
     [int](#language.types.integer)
      [CM_DEFAULT](#ziparchive.constants.cm-default);

    public
     const
     [int](#language.types.integer)
      [CM_STORE](#ziparchive.constants.cm-store);

    public
     const
     [int](#language.types.integer)
      [CM_SHRINK](#ziparchive.constants.cm-shrink);

    public
     const
     [int](#language.types.integer)
      [CM_REDUCE_1](#ziparchive.constants.cm-reduce-1);

    public
     const
     [int](#language.types.integer)
      [CM_REDUCE_2](#ziparchive.constants.cm-reduce-2);

    public
     const
     [int](#language.types.integer)
      [CM_REDUCE_3](#ziparchive.constants.cm-reduce-3);

    public
     const
     [int](#language.types.integer)
      [CM_REDUCE_4](#ziparchive.constants.cm-reduce-4);

    public
     const
     [int](#language.types.integer)
      [CM_IMPLODE](#ziparchive.constants.cm-implode);

    public
     const
     [int](#language.types.integer)
      [CM_DEFLATE](#ziparchive.constants.cm-deflate);

    public
     const
     [int](#language.types.integer)
      [CM_DEFLATE64](#ziparchive.constants.cm-deflate64);

    public
     const
     [int](#language.types.integer)
      [CM_PKWARE_IMPLODE](#ziparchive.constants.cm-pkware-implode);

    public
     const
     [int](#language.types.integer)
      [CM_BZIP2](#ziparchive.constants.cm-bzip2);

    public
     const
     [int](#language.types.integer)
      [CM_LZMA](#ziparchive.constants.cm-lzma);

    public
     const
     [int](#language.types.integer)
      [CM_LZMA2](#ziparchive.constants.cm-lzma2);

    public
     const
     [int](#language.types.integer)
      [CM_ZSTD](#ziparchive.constants.cm-zstd);

    public
     const
     [int](#language.types.integer)
      [CM_XZ](#ziparchive.constants.cm-xz);

    public
     const
     [int](#language.types.integer)
      [CM_TERSE](#ziparchive.constants.cm-terse);

    public
     const
     [int](#language.types.integer)
      [CM_LZ77](#ziparchive.constants.cm-lz77);

    public
     const
     [int](#language.types.integer)
      [CM_WAVPACK](#ziparchive.constants.cm-wavpack);

    public
     const
     [int](#language.types.integer)
      [CM_PPMD](#ziparchive.constants.cm-ppmd);

    public
     const
     [int](#language.types.integer)
      [ER_OK](#ziparchive.constants.er-ok);

    public
     const
     [int](#language.types.integer)
      [ER_MULTIDISK](#ziparchive.constants.er-multidisk);

    public
     const
     [int](#language.types.integer)
      [ER_RENAME](#ziparchive.constants.er-rename);

    public
     const
     [int](#language.types.integer)
      [ER_CLOSE](#ziparchive.constants.er-close);

    public
     const
     [int](#language.types.integer)
      [ER_SEEK](#ziparchive.constants.er-seek);

    public
     const
     [int](#language.types.integer)
      [ER_READ](#ziparchive.constants.er-read);

    public
     const
     [int](#language.types.integer)
      [ER_WRITE](#ziparchive.constants.er-write);

    public
     const
     [int](#language.types.integer)
      [ER_CRC](#ziparchive.constants.er-crc);

    public
     const
     [int](#language.types.integer)
      [ER_ZIPCLOSED](#ziparchive.constants.er-zipclosed);

    public
     const
     [int](#language.types.integer)
      [ER_NOENT](#ziparchive.constants.er-noent);

    public
     const
     [int](#language.types.integer)
      [ER_EXISTS](#ziparchive.constants.er-exists);

    public
     const
     [int](#language.types.integer)
      [ER_OPEN](#ziparchive.constants.er-open);

    public
     const
     [int](#language.types.integer)
      [ER_TMPOPEN](#ziparchive.constants.er-tmpopen);

    public
     const
     [int](#language.types.integer)
      [ER_ZLIB](#ziparchive.constants.er-zlib);

    public
     const
     [int](#language.types.integer)
      [ER_MEMORY](#ziparchive.constants.er-memory);

    public
     const
     [int](#language.types.integer)
      [ER_CHANGED](#ziparchive.constants.er-changed);

    public
     const
     [int](#language.types.integer)
      [ER_COMPNOTSUPP](#ziparchive.constants.er-compnotsupp);

    public
     const
     [int](#language.types.integer)
      [ER_EOF](#ziparchive.constants.er-eof);

    public
     const
     [int](#language.types.integer)
      [ER_INVAL](#ziparchive.constants.er-inval);

    public
     const
     [int](#language.types.integer)
      [ER_NOZIP](#ziparchive.constants.er-nozip);

    public
     const
     [int](#language.types.integer)
      [ER_INTERNAL](#ziparchive.constants.er-internal);

    public
     const
     [int](#language.types.integer)
      [ER_INCONS](#ziparchive.constants.er-incons);

    public
     const
     [int](#language.types.integer)
      [ER_REMOVE](#ziparchive.constants.er-remove);

    public
     const
     [int](#language.types.integer)
      [ER_DELETED](#ziparchive.constants.er-deleted);

    public
     const
     [int](#language.types.integer)
      [ER_ENCRNOTSUPP](#ziparchive.constants.er-encrnotsupp);

    public
     const
     [int](#language.types.integer)
      [ER_RDONLY](#ziparchive.constants.er-rdonly);

    public
     const
     [int](#language.types.integer)
      [ER_NOPASSWD](#ziparchive.constants.er-nopasswd);

    public
     const
     [int](#language.types.integer)
      [ER_WRONGPASSWD](#ziparchive.constants.er-wrongpasswd);

    public
     const
     [int](#language.types.integer)
      [ER_OPNOTSUPP](#ziparchive.constants.er-opnotsupp);

    public
     const
     [int](#language.types.integer)
      [ER_INUSE](#ziparchive.constants.er-inuse);

    public
     const
     [int](#language.types.integer)
      [ER_TELL](#ziparchive.constants.er-tell);

    public
     const
     [int](#language.types.integer)
      [ER_COMPRESSED_DATA](#ziparchive.constants.er-compressed-data);

    public
     const
     [int](#language.types.integer)
      [ER_CANCELLED](#ziparchive.constants.er-cancelled);

    public
     const
     [int](#language.types.integer)
      [ER_DATA_LENGTH](#ziparchive.constants.er-data-length);

    public
     const
     [int](#language.types.integer)
      [ER_NOT_ALLOWED](#ziparchive.constants.er-not-allowed);

    public
     const
     [int](#language.types.integer)
      [ER_TRUNCATED_ZIP](#ziparchive.constants.er-truncated-zip);

    public
     const
     [int](#language.types.integer)
      [AFL_RDONLY](#ziparchive.constants.afl-rdonly);

    public
     const
     [int](#language.types.integer)
      [AFL_IS_TORRENTZIP](#ziparchive.constants.afl-is-torrentzip);

    public
     const
     [int](#language.types.integer)
      [AFL_WANT_TORRENTZIP](#ziparchive.constants.afl-want-torrentzip);

    public
     const
     [int](#language.types.integer)
      [AFL_CREATE_OR_KEEP_FILE_FOR_EMPTY_ARCHIVE](#ziparchive.constants.afl-create-or-keep-file-for-empty-archive);

    public
     const
     [int](#language.types.integer)
      [OPSYS_DOS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_AMIGA](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_OPENVMS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_UNIX](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_VM_CMS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_ATARI_ST](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_OS_2](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_MACINTOSH](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_Z_SYSTEM](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_CPM](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_WINDOWS_NTFS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_MVS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_VSE](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_ACORN_RISC](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_VFAT](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_ALTERNATE_MVS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_BEOS](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_TANDEM](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_OS_400](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_OS_X](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [OPSYS_DEFAULT](#ziparchive.constants.opsys);

    public
     const
     [int](#language.types.integer)
      [EM_NONE](#ziparchive.constants.em-none);

    public
     const
     [int](#language.types.integer)
      [EM_TRAD_PKWARE](#ziparchive.constants.em-trad-pkware);

    public
     const
     [int](#language.types.integer)
      [EM_AES_128](#ziparchive.constants.em-aes-128);

    public
     const
     [int](#language.types.integer)
      [EM_AES_192](#ziparchive.constants.em-aes-192);

    public
     const
     [int](#language.types.integer)
      [EM_AES_256](#ziparchive.constants.em-aes-256);

    public
     const
     [int](#language.types.integer)
      [EM_UNKNOWN](#ziparchive.constants.em-unknown);

    public
     const
     [string](#language.types.string)
      [LIBZIP_VERSION](#ziparchive.constants.libzip-version);

    public
     const
     [int](#language.types.integer)
      [LENGTH_TO_END](#ziparchive.constants.length-to-end);

    public
     const
     [int](#language.types.integer)
      [LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked);


    /* Propiedades */
    public
     readonly
     [int](#language.types.integer)
      [$lastId](#ziparchive.props.lastid);

    public
     readonly
     [int](#language.types.integer)
      [$status](#ziparchive.props.status);

    public
     readonly
     [int](#language.types.integer)
      [$statusSys](#ziparchive.props.statussys);

    public
     readonly
     [int](#language.types.integer)
      [$numFiles](#ziparchive.props.numfiles);

    public
     readonly
     [string](#language.types.string)
      [$filename](#ziparchive.props.filename);

    public
     readonly
     [string](#language.types.string)
      [$comment](#ziparchive.props.comment);


    /* Métodos */

public [addEmptyDir](#ziparchive.addemptydir)([string](#language.types.string) $dirname, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [addFile](#ziparchive.addfile)(
    [string](#language.types.string) $filepath,
    [string](#language.types.string) $entryname = "",
    [int](#language.types.integer) $start = 0,
    [int](#language.types.integer) $length = ZipArchive::LENGTH_TO_END,
    [int](#language.types.integer) $flags = ZipArchive::FL_OVERWRITE
): [bool](#language.types.boolean)
public [addFromString](#ziparchive.addfromstring)([string](#language.types.string) $name, [string](#language.types.string) $content, [int](#language.types.integer) $flags = ZipArchive::FL_OVERWRITE): [bool](#language.types.boolean)
public [addGlob](#ziparchive.addglob)([string](#language.types.string) $pattern, [int](#language.types.integer) $flags = 0, [array](#language.types.array) $options = []): [array](#language.types.array)|[false](#language.types.singleton)
public [addPattern](#ziparchive.addpattern)([string](#language.types.string) $pattern, [string](#language.types.string) $path = ".", [array](#language.types.array) $options = []): [array](#language.types.array)|[false](#language.types.singleton)
public [clearError](#ziparchive.clearerror)(): [void](language.types.void.html)
public [close](#ziparchive.close)(): [bool](#language.types.boolean)
public [count](#ziparchive.count)(): [int](#language.types.integer)
public [deleteIndex](#ziparchive.deleteindex)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [deleteName](#ziparchive.deletename)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [extractTo](#ziparchive.extractto)([string](#language.types.string) $pathto, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**): [bool](#language.types.boolean)
public [getArchiveComment](#ziparchive.getarchivecomment)([int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getArchiveFlag](#ziparchive.getarchiveflag)([int](#language.types.integer) $flag, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)
public [getCommentIndex](#ziparchive.getcommentindex)([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getCommentName](#ziparchive.getcommentname)([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getExternalAttributesIndex](#ziparchive.getexternalattributesindex)(
    [int](#language.types.integer) $index,
    [int](#language.types.integer) &amp;$opsys,
    [int](#language.types.integer) &amp;$attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [getExternalAttributesName](#ziparchive.getexternalattributesname)(
    [string](#language.types.string) $name,
    [int](#language.types.integer) &amp;$opsys,
    [int](#language.types.integer) &amp;$attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [getFromIndex](#ziparchive.getfromindex)([int](#language.types.integer) $index, [int](#language.types.integer) $len = 0, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getFromName](#ziparchive.getfromname)([string](#language.types.string) $name, [int](#language.types.integer) $len = 0, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getNameIndex](#ziparchive.getnameindex)([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [getStatusString](#ziparchive.getstatusstring)(): [string](#language.types.string)
public [getStream](#ziparchive.getstream)([string](#language.types.string) $name): [resource](#language.types.resource)|[false](#language.types.singleton)
public [getStreamIndex](#ziparchive.getstreamindex)([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [resource](#language.types.resource)|[false](#language.types.singleton)
public [getStreamName](#ziparchive.getstreamname)([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [resource](#language.types.resource)|[false](#language.types.singleton)
public static [isCompressionMethodSupported](#ziparchive.iscompressionmethoddupported)([int](#language.types.integer) $method, [bool](#language.types.boolean) $enc = true): [bool](#language.types.boolean)
public static [isEncryptionMethodSupported](#ziparchive.isencryptionmethodsupported)([int](#language.types.integer) $method, [bool](#language.types.boolean) $enc = true): [bool](#language.types.boolean)
public [locateName](#ziparchive.locatename)([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)|[false](#language.types.singleton)
public [open](#ziparchive.open)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)|[int](#language.types.integer)
public [registerCancelCallback](#ziparchive.registercancelcallback)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [registerProgressCallback](#ziparchive.registerprogresscallback)([float](#language.types.float) $rate, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [renameIndex](#ziparchive.renameindex)([int](#language.types.integer) $index, [string](#language.types.string) $new_name): [bool](#language.types.boolean)
public [renameName](#ziparchive.renamename)([string](#language.types.string) $name, [string](#language.types.string) $new_name): [bool](#language.types.boolean)
public [replaceFile](#ziparchive.replacefile)(
    [string](#language.types.string) $filepath,
    [int](#language.types.integer) $index,
    [int](#language.types.integer) $start = 0,
    [int](#language.types.integer) $length = ZipArchive::LENGTH_TO_END,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [setArchiveComment](#ziparchive.setarchivecomment)([string](#language.types.string) $comment): [bool](#language.types.boolean)
public [setArchiveFlag](#ziparchive.setarchiveflag)([int](#language.types.integer) $flag, [int](#language.types.integer) $value): [bool](#language.types.boolean)
public [setCommentIndex](#ziparchive.setcommentindex)([int](#language.types.integer) $index, [string](#language.types.string) $comment): [bool](#language.types.boolean)
public [setCommentName](#ziparchive.setcommentname)([string](#language.types.string) $name, [string](#language.types.string) $comment): [bool](#language.types.boolean)
public [setCompressionIndex](#ziparchive.setcompressionindex)([int](#language.types.integer) $index, [int](#language.types.integer) $method, [int](#language.types.integer) $compflags = 0): [bool](#language.types.boolean)
public [setCompressionName](#ziparchive.setcompressionname)([string](#language.types.string) $name, [int](#language.types.integer) $method, [int](#language.types.integer) $compflags = 0): [bool](#language.types.boolean)
public [setEncryptionIndex](#ziparchive.setencryptionindex)([int](#language.types.integer) $index, [int](#language.types.integer) $method, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**): [bool](#language.types.boolean)
public [setEncryptionName](#ziparchive.setencryptionname)([string](#language.types.string) $name, [int](#language.types.integer) $method, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**): [bool](#language.types.boolean)
public [setExternalAttributesIndex](#ziparchive.setexternalattributesindex)(
    [int](#language.types.integer) $index,
    [int](#language.types.integer) $opsys,
    [int](#language.types.integer) $attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [setExternalAttributesName](#ziparchive.setexternalattributesname)(
    [string](#language.types.string) $name,
    [int](#language.types.integer) $opsys,
    [int](#language.types.integer) $attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [setMtimeIndex](#ziparchive.setmtimeindex)([int](#language.types.integer) $index, [int](#language.types.integer) $timestamp, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [setMtimeName](#ziparchive.setmtimename)([string](#language.types.string) $name, [int](#language.types.integer) $timestamp, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [setPassword](#ziparchive.setpassword)([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password): [bool](#language.types.boolean)
public [statIndex](#ziparchive.statindex)([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)
public [statName](#ziparchive.statname)([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)
public [unchangeAll](#ziparchive.unchangeall)(): [bool](#language.types.boolean)
public [unchangeArchive](#ziparchive.unchangearchive)(): [bool](#language.types.boolean)
public [unchangeIndex](#ziparchive.unchangeindex)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [unchangeName](#ziparchive.unchangename)([string](#language.types.string) $name): [bool](#language.types.boolean)

}

## Propiedades

     lastId


       Valor de índice de la última entrada añadida (archivo o directorio).
       Disponible para archivo cerrado, a partir de PHP 8.0.0 y PECL zip 1.18.0.






     status


       Estado del archivo Zip.
       Disponible para archivo cerrado, a partir de PHP 8.0.0 y PECL zip 1.18.0.






     statusSys


       Estado del sistema del archivo Zip.
       Disponible para archivo cerrado, a partir de PHP 8.0.0 y PECL zip 1.18.0.






     numFiles

      Número de ficheros en el archivo





     filename

      Nombre del archivo en le sistema de archivos





     comment

      Comentario para el archivo




# ZipArchive::addEmptyDir

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.8.0)

ZipArchive::addEmptyDir — Añadir un nuevo directorio

### Descripción

public **ZipArchive::addEmptyDir**([string](#language.types.string) $dirname, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Añade un directoro vacío en el archivo.

### Parámetros

     dirname


       El directorio a añadir.






     flags


       Máscara de bits compuesta por
       **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**,
       **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**,
       **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**.
       El comportamiento de estas constantes se describe en
       la página de [constantes ZIP](#zip.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0, PECL zip 1.18.0

        Se añadio flags.





### Ejemplos

**Ejemplo #1 Crea un nuevo directorio en un archivo**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
if($zip-&gt;addEmptyDir('newDirectory')) {
echo 'Creado nuevo directorio root';
} else {
echo 'No se puede crear el directorio';
}
$zip-&gt;close();
} else {
echo 'falló';
}
?&gt;

# ZipArchive::addFile

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::addFile — Añade un fichero al archivo ZIP para la ruta dada

### Descripción

public **ZipArchive::addFile**(
    [string](#language.types.string) $filepath,
    [string](#language.types.string) $entryname = "",
    [int](#language.types.integer) $start = 0,
    [int](#language.types.integer) $length = ZipArchive::LENGTH_TO_END,
    [int](#language.types.integer) $flags = ZipArchive::FL_OVERWRITE
): [bool](#language.types.boolean)

Añade un fichero al archivo ZIP par la ruta dada.

**Nota**: Para una portabilidad máxima, se recomienda siempre utilizar barras oblicuas (/) como separador de directorio en los nombres de archivos zip.

### Parámetros

     filename


       La ruta del fichero a añadir.






     entryname


       Si corresponde, este es el nombre local dentro del archivo ZIP que reemplazará el filepath.






     start


       Para la copia parcial, posición de inicio.






     length


       Para copia parcial, longitud a copiar,
       si **[ZipArchive::LENGTH_TO_END](#ziparchive.constants.length-to-end)** (0) se usa el tamaño del archivo,
       si **[ZipArchive::LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked)** se usa todo el archivo
       (comenzando desde start).






     flags


       Máscara de bits compuesta por
       **[ZipArchive::FL_OVERWRITE](#ziparchive.constants.fl-overwrite)**,
       **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**,
       **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**,
       **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**,
       **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.
       El comportamiento de estas constantes se describe en
       la página de [constantes ZIP](#zip.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0, PECL zip 1.18.0

        Se añadio flags.




       8.3.0, PECL zip 1.22.1

        Se añadio **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.




       8.3.0, PECL zip 1.22.2

        **[ZipArchive::LENGTH_TO_END](#ziparchive.constants.length-to-end)** and **[ZipArchive::LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked)** were added.





### Ejemplos

     Este ejemplo abre un archivo ZIP
     test.zip y añade
     el fichero /path/to/index.txt.
     como newname.txt.




     **Ejemplo #1 Abrir y extraer**




&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
$zip-&gt;addFile('/path/to/index.txt', 'newname.txt');
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

### Notas

**Nota**:

    Cuando un fichero es añadido al archivo, PHP bloqueará el fichero. El
    bloqueo se desbloqueará cuando el objeto [ZipArchive](#class.ziparchive) finalice,
    ya sea a través de [ZipArchive::close()](#ziparchive.close) o el
    objeto [ZipArchive](#class.ziparchive) sea destruido. Esto puede impedir
    que se pueda eliminar el archivo que se está añadiendo hasta después de que el
    bloqueo haya sido liberado.

### Ver también

    - [ZipArchive::replaceFile()](#ziparchive.replacefile) - Reemplaza fichero en el archivo ZIP con una ruta determinada

# ZipArchive::addFromString

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::addFromString — Añadir un fichero al archivo ZIP usando su contenido

### Descripción

public **ZipArchive::addFromString**([string](#language.types.string) $name, [string](#language.types.string) $content, [int](#language.types.integer) $flags = ZipArchive::FL_OVERWRITE): [bool](#language.types.boolean)

Añade un fichero al archivo ZIP usando su contenido.

**Nota**: Para una portabilidad máxima, se recomienda siempre utilizar barras oblicuas (/) como separador de directorio en los nombres de archivos zip.

### Parámetros

     name


       Nombre de la entrada a crear.






     content


       El contenido a usar para crear la entrada. Es usado en modo
       binary safe.






     flags


       Máscara de bits compuesta por
       **[ZipArchive::FL_OVERWRITE](#ziparchive.constants.fl-overwrite)**,
       **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**,
       **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**,
       **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**,
       **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.
       El comportamiento de estas constantes se describe en
       la página de [constantes ZIP](#zip.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0, PECL zip 1.18.0

        Se añadio flags.





### Ejemplos

**Ejemplo #1 Añade una entrada al nuevo fichero**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFromString('test.txt', 'el contenido del fichero va aquí');
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

**Ejemplo #2 Añade un fichero en un directorio dentro de un archivo**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
$zip-&gt;addFromString('dir/test.txt', 'el contenido del fichero va aquí');
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

# ZipArchive::addGlob

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL zip &gt;= 1.9.0)

ZipArchive::addGlob — Añadir ficheros de un directorio mediante un patrón glob

### Descripción

public **ZipArchive::addGlob**([string](#language.types.string) $pattern, [int](#language.types.integer) $flags = 0, [array](#language.types.array) $options = []): [array](#language.types.array)|[false](#language.types.singleton)

Añade ficheros de un directorio que corresponde con el patrón global pattern.

**Nota**: Para una portabilidad máxima, se recomienda siempre utilizar barras oblicuas (/) como separador de directorio en los nombres de archivos zip.

### Parámetros

    pattern


      Un patrón [glob()](#function.glob)contra el cual se hará la correspondencia con los ficheros.






    flags


      Una máscara de un bit de marcas glob().






    options


      Un array asociativo de opciones. Las opciones disponibles son:



       -

         "add_path"




         Prefijo a indicar cuando se traduce la ruta de acceso del fichero dentro
         del archivo. Esta traducción se aplica después de cualquier operación de eliminación definida por las opciones
         "remove_path" o "remove_all_path".





       -

         "remove_path"




         Prefijo para eliminar la ruta de acceso de los ficheros antes de añadirlos al archivo.





       -

         "remove_all_path"




         **[true](#constant.true)** para utilizar únicamente el nombre del fichero y añadirlo a la raíz del archivo.





       -

         "flags"




         Máscara de bits compuesta por
         **[ZipArchive::FL_OVERWRITE](#ziparchive.constants.fl-overwrite)**,
         **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**,
         **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**,
         **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**,
         **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.
         El comportamiento de estas constantes se describe en
         la página de [constantes ZIP](#zip.constants).





       -

         "comp_method"




         Compression method, one of the **[ZipArchive::CM_*](#ziparchive.constants.cm-default)**
         constants, see [ZIP constants](#zip.constants) page.





       -

         "comp_flags"




         Compression level.





       -

         "enc_method"




         Encryption method, one of the **[ZipArchive::EM_*](#ziparchive.constants.em-none)**
         constants, see [ZIP constants](#zip.constants) page.





       -

         "enc_password"




         Password used for encryption.








### Valores devueltos

An [array](#language.types.array) of added files on success o **[false](#constant.false)** si ocurre un error

### Historial de cambios

       Versión
       Descripción






       8.0.0, PECL zip 1.18.0

        "flags" in options was added.




       8.0.0, PECL zip 1.18.1

        "comp_method", "comp_flags",
        "enc_method" and "enc_password" in
        options were added.




       8.3.0, PECL zip 1.22.1

        **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)** was added.





### Ejemplos

**Ejemplo #1 Ejemplo con ZipArchive::addGlob()**

     Añadir todos los ficheros de scripts y texto php del directorio de trabajo actual

&lt;?php
$zip = new ZipArchive();
$ret = $zip-&gt;open('application.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
if ($ret !== TRUE) {
printf('Erróneo con el código %d', $ret);
} else {
$options = array('add_path' =&gt; 'sources/', 'remove_all_path' =&gt; TRUE);
$zip-&gt;addGlob('\*.{php,txt}', GLOB_BRACE, $options);
$zip-&gt;close();
}
?&gt;

### Ver también

    - [ZipArchive::addFile()](#ziparchive.addfile) - Añade un fichero al archivo ZIP para la ruta dada

    - [ZipArchive::addPattern()](#ziparchive.addpattern) - Añade ficheros de un directorio a partir de un patrón PCRE

# ZipArchive::addPattern

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL zip &gt;= 1.9.0)

ZipArchive::addPattern — Añade ficheros de un directorio a partir de un patrón PCRE

### Descripción

public **ZipArchive::addPattern**([string](#language.types.string) $pattern, [string](#language.types.string) $path = ".", [array](#language.types.array) $options = []): [array](#language.types.array)|[false](#language.types.singleton)

Añade ficheros de un directorio que coinciden con la expresión regular pattern.
La operación no es recursiva. Únicamente se hará la correspondencia del patrón con el nombre del fichero.

### Parámetros

    pattern


      Un patrón [PCRE](#book.pcre) contra el cual se realizará la correspondencia.






    path


      El directorio que será escaneado. Por defecto es el directorio de trabajo actual.






    options


      Un array asociativo de opciones aceptadas por [ZipArchive::addGlob()](#ziparchive.addglob).


### Valores devueltos

Un [array](#language.types.array) de archivos añadidos en caso de éxito o **[false](#constant.false)** si ocurre un error

### Ejemplos

**Ejemplo #1 Ejemplo con ZipArchive::addPattern()**

     Añadir todos los scripts y ficheros de texto php del directorio actual

&lt;?php
$zip = new ZipArchive();
$ret = $zip-&gt;open('application.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
if ($ret !== TRUE) {
printf('Erróneo con código %d', $ret);
} else {
    $directory = realpath('.');
    $options = array('add_path' =&gt; 'sources/', 'remove_path' =&gt; $directory);
    $zip-&gt;addPattern('/\.(?:php|txt)$/', $directory, $options);
$zip-&gt;close();
}
?&gt;

### Ver también

    - [ZipArchive::addFile()](#ziparchive.addfile) - Añade un fichero al archivo ZIP para la ruta dada

    - [ZipArchive::addGlob()](#ziparchive.addglob) - Añadir ficheros de un directorio mediante un patrón glob

# ZipArchive::clearError

(PHP 8 &gt;= 8.2.0, PECL zip &gt;= 1.20.0)

ZipArchive::clearError — Borra el mensaje de error, los mensajes del sistema y/o zip

### Descripción

public **ZipArchive::clearError**(): [void](language.types.void.html)

Borra el mensaje de error, los mensajes del sistema y/o zip.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ZipArchive::getStatusString()](#ziparchive.getstatusstring) - Devuelve mensajes de: estado de error, de sistema y/o mensajes de zip

# ZipArchive::close

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::close — Cierra el fichero activo (abierto o el nuevo creado)

### Descripción

public **ZipArchive::close**(): [bool](#language.types.boolean)

Cierra fichero abierto o creado y guarda los cambios. Este método es
automáticamente llamado al finalizar el script.

Si el archivo no contiene ningún fichero, el fichero es completamente eliminado por defecto
(no se escribe ningún archivo vacío) según el valor de la
bandera global **[ZipArchive::AFL_CREATE_OR_KEEP_FILE_FOR_EMPTY_ARCHIVE](#ziparchive.constants.afl-create-or-keep-file-for-empty-archive)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ZipArchive::setArchiveFlag()](#ziparchive.setarchiveflag) - Define una bandera global de un archivo ZIP

# ZipArchive::count

(PHP 7 &gt;= 7.2.0, PHP 8, PECL zip &gt;= 1.15.0)

ZipArchive::count — Cuenta el número de archivos en el archivo

### Descripción

public **ZipArchive::count**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de ficheros en el archivo.

# ZipArchive::deleteIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::deleteIndex — Elimina una entrada en el archivo usando su índice

### Descripción

public **ZipArchive::deleteIndex**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Elimina una entrada en su archivo usando su índice.

### Parámetros

     index


       Índice de la entrada a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Elimina el fichero desde el archivo usando su índice**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
$zip-&gt;deleteIndex(2);
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

# ZipArchive::deleteName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::deleteName — Elimina una entrada en el archivo por su nombre

### Descripción

public **ZipArchive::deleteName**([string](#language.types.string) $name): [bool](#language.types.boolean)

Elimina una entrada en el archivo por su nombre

### Parámetros

     name


       Nombre de la entrada a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Eliminado un fichero y un directorio desde un archivo, usando nombres**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test1.zip') === TRUE) {
$zip-&gt;deleteName('testfromfile.php');
$zip-&gt;deleteName('testDir/');
$zip-&gt;close();
echo 'ok';
} else {
echo 'Falló';
}
?&gt;

# ZipArchive::extractTo

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::extractTo — Extraer el contenido del archivo

### Descripción

public **ZipArchive::extractTo**([string](#language.types.string) $pathto, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**): [bool](#language.types.boolean)

Extrae el archivo completo o los ficheros dados en la ruta
que se especifique.

**Advertencia**

    Los permisos por omisión para los archivos y directorios
    extraídos dan el más amplio acceso posible. Esto se puede restringir
    estableciendo la umask actual, que se puede cambiar usando
    [umask()](#function.umask).




    Por razones de seguridad, los permisos originales no se restauran.
    Para ver un ejemplo de cómo restaurarlos, consulte el
    [ejemplo de código](#ziparchive.getexternalattributesindex.examples.perms)
    en la página de [ZipArchive::getExternalAttributesIndex()](#ziparchive.getexternalattributesindex).

### Parámetros

     pathto


       Destino en donde extraer los ficheros.






     files


       Las entradas a extraer. Acepta tanto un solo nombre o un array
       de nombres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Extraer todas las entradas**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
$zip-&gt;extractTo('/my/destination/dir/');
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

**Ejemplo #2 Extraer dos entradas**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test_im.zip');
if ($res === TRUE) {
$zip-&gt;extractTo('/my/destination/dir/', array('pear_item.gif', 'testfromfile.php'));
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

### Notas

**Nota**:

Los sistemas de archivos NTFS de Windows
no soportan ciertos caracteres en los nombres de archivo, como &lt;|&gt;\*?":. Los nombres de archivo con un punto
final no son soportados. A diferencia de algunas herramientas de extracción, este método no reemplaza estos caracteres con
un guión bajo, sino que falla al extraer tales archivos.

# ZipArchive::getArchiveComment

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::getArchiveComment — Devuelve el comentario del archivo ZIP

### Descripción

public **ZipArchive::getArchiveComment**([int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el comentario del archivo ZIP.

### Parámetros

     flags


       Si las flags se establecen en **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, el
       comentario original se devuelve sin cambios.





### Valores devueltos

Devuelve el comentario del archivo Zip o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Vuelca el comentario del archivo**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test_with_comment.zip');
if ($res === TRUE) {
var_dump($zip-&gt;getArchiveComment());
    /* O usando la propiedad del archivo */
    var_dump($zip-&gt;comment);
} else {
echo 'falló, código:' . $res;
}
?&gt;

# ZipArchive::getArchiveFlag

(PHP &gt;= 8.3.0, PECL zip &gt;= 1.22.0)

ZipArchive::getArchiveFlag — Devuelve el valor de una bandera global del archivo

### Descripción

public **ZipArchive::getArchiveFlag**([int](#language.types.integer) $flag, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)

Devuelve el valor de una bandera global del archivo.

### Parámetros

     flag


       La bandera global a recuperar, entre las constantes AFL_*:



        -

          **[ZipArchive::AFL_RDONLY](#ziparchive.constants.afl-rdonly)**





        -

          **[ZipArchive::AFL_IS_TORRENTZIP](#ziparchive.constants.afl-is-torrentzip)**





        -

          **[ZipArchive::AFL_WANT_TORRENTZIP](#ziparchive.constants.afl-want-torrentzip)**





        -

          **[ZipArchive::AFL_CREATE_OR_KEEP_FILE_FOR_EMPTY_ARCHIVE](#ziparchive.constants.afl-create-or-keep-file-for-empty-archive)**










     flags


       Si flags se define como **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**,
       la bandera original no se modifica y se devuelve.





### Valores devueltos

Devuelve 1 si la bandera está definida para el archivo, 0 si no lo está, y -1 si ocurre un error.

### Ejemplos

**Ejemplo #1 Prueba si el archivo está en formato torrentzip**

&lt;?php

$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');

if ($res === TRUE) {
    var_dump($zip-&gt;getArchiveFlag(ZipArchive::AFL_IS_TORRENTZIP));
} else {
echo 'Fallo, código: ' . $res;
}
?&gt;

### Ver también

    - [ZipArchive::setArchiveFlag()](#ziparchive.setarchiveflag) - Define una bandera global de un archivo ZIP

# ZipArchive::getCommentIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.4.0)

ZipArchive::getCommentIndex — Devuelve el comentario de una entrada usando la entrada díndice

### Descripción

public **ZipArchive::getCommentIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el comentario de una entrada usando la entrada índice.

### Parámetros

     index


       Índice de la entrada






     flags


       Si flags **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, se devolverá
       el comentario original no cambiado.





### Valores devueltos

Con éxito devuelve el comentario o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Vuelca el comentario de la entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test1.zip');
if ($res === TRUE) {
var_dump($zip-&gt;getCommentIndex(1));
} else {
echo 'falló, código:' . $res;
}
?&gt;

# ZipArchive::getCommentName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.4.0)

ZipArchive::getCommentName — Devuelve el comentario de una entrada usando el nombre de la entrada

### Descripción

public **ZipArchive::getCommentName**([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el comentario de una entrada usando el nombre de la entrada.

### Parámetros

     name


       Nombre de la entrada






     flags


       Si flags está defindo a **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, se devuelve el
       comentario original no cambiado.





### Valores devueltos

Devuelve el comentario si se ejecutó con éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Vuelca el comentario de la entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test1.zip');
if ($res === TRUE) {
var_dump($zip-&gt;getCommentName('test/entry1.txt'));
} else {
echo 'Falló, código:' . $res;
}
?&gt;

# ZipArchive::getExternalAttributesIndex

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL zip &gt;= 1.12.4)

ZipArchive::getExternalAttributesIndex — Obtener los atributos externos de una entrada definida por su índice

### Descripción

public **ZipArchive::getExternalAttributesIndex**(
    [int](#language.types.integer) $index,
    [int](#language.types.integer) &amp;$opsys,
    [int](#language.types.integer) &amp;$attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Recuperar los atributos externos de una entrada definida por su índice.

### Parámetros

     index


       El índice de la entrada.






     opsys


       En caso de éxito, recibe el código del sistema operativo definido por una de las constantes ZipArchive::OPSYS_.






     attr


       En caso de éxito, recibe los atributos externos. El valor dependerá del sistema operativo.






     flags


       Si flags se establece a **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, se devuelven los atributos
       originales sin cambios.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo extrae todas las entradas de un archivo
ZIP test.zip y
asigna los permisos Unix tomados de los atributos externos.

**Ejemplo #1 Extraer todas las entradas con permisos Unix**

&lt;?php
$zip = new ZipArchive();
if ($zip-&gt;open('test.zip') === TRUE) {
for ($idx=0 ; $s = $zip-&gt;statIndex($idx) ; $idx++) {
        if ($zip-&gt;extractTo('.', $s['name'])) {
            if ($zip-&gt;getExternalAttributesIndex($idx, $opsys, $attr)
                &amp;&amp; $opsys==ZipArchive::OPSYS_UNIX) {
               chmod($s['name'], ($attr &gt;&gt; 16) &amp; 0777);
}
}
}
$zip-&gt;close();
echo "Ok\n";
} else {
echo "KO\n";
}
?&gt;

# ZipArchive::getExternalAttributesName

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL zip &gt;= 1.12.4)

ZipArchive::getExternalAttributesName — Obtener los atributos externos de una entrada definida por su nombre

### Descripción

public **ZipArchive::getExternalAttributesName**(
    [string](#language.types.string) $name,
    [int](#language.types.integer) &amp;$opsys,
    [int](#language.types.integer) &amp;$attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Obtener los atributos externos de una entrada definida por su nombre.

### Parámetros

     name


       El nombre de la entrada.






     opsys


       En caso de éxito, recibe el código del sistema operativo definido por una de las constantes ZipArchive::OPSYS_.






     attr


       En caso de éxito, recibe los atributos externos. El valor depende del sistema operativo.






     flags


       Si flags se establece a **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, se devuelven los atributos
       originales sin cambios.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ZipArchive::getFromIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::getFromIndex — Devuelve el contenido de la entrada usando su índice

### Descripción

public **ZipArchive::getFromIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $len = 0, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el contenido de la entrada usando su índice.

### Parámetros

     index


       El índice de la entrada






     len


       La longitud  que se see desde la entrada. Si es 0, entonces
       toda la entrada se lee.






     flags


       Las flags usadas para abrir el fichero. Los siguientes valores
       pueden ser Ored.



        -

          **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**





        -

          **[ZipArchive::FL_COMPRESSED](#ziparchive.constants.fl-compressed)**









### Valores devueltos

Devuelve el contenido de la entrada si se ejecutó con éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Obtener el contenido del fichero**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
echo $zip-&gt;getFromIndex(2);
$zip-&gt;close();
} else {
echo 'falló';
}
?&gt;

### Ver también

    - [ZipArchive::getFromName()](#ziparchive.getfromname) - Devuelve el contenido de la entrada utilizando su nombre

# ZipArchive::getFromName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::getFromName — Devuelve el contenido de la entrada utilizando su nombre

### Descripción

public **ZipArchive::getFromName**([string](#language.types.string) $name, [int](#language.types.integer) $len = 0, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el contenido de la entrada utilizando su nombre

### Parámetros

     name


       Nombre de la entrada






     len


       La longitud a ser leída desde la entrada. Si es 0, entonces
       toda la entrada es leída.






     flags


       Los indicadores a utilizar para abrir el archivo. Los siguientes valores podrían
       ser escritos juntos con un OR lógico en él.



        -

          **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**





        -

          **[ZipArchive::FL_COMPRESSED](#ziparchive.constants.fl-compressed)**





        -

          **[ZipArchive::FL_NOCASE](#ziparchive.constants.fl-nocase)**









### Valores devueltos

Devuelve el contenido de la entrada en caso de tener éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

     **Ejemplo #1 Obtener el contenido de los ficheros**




&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test1.zip') === TRUE) {
echo $zip-&gt;getFromName('testfromfile.php');
$zip-&gt;close();
} else {
echo 'falló';
}
?&gt;

     **Ejemplo #2 Convierte una imagen desde una entrada de fichero zip**




&lt;?php
$z = new ZipArchive();
if ($z-&gt;open(dirname(**FILE**) . '/test_im.zip')) {
$im_string = $z-&gt;getFromName("pear_item.gif");
    $im = imagecreatefromstring($im_string);
imagepng($im, 'b.png');
}
?&gt;

### Ver también

    - [ZipArchive::getFromIndex()](#ziparchive.getfromindex) - Devuelve el contenido de la entrada usando su índice

# ZipArchive::getNameIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::getNameIndex — Devuelve el nombre de una entrada utilizando su índice

### Descripción

public **ZipArchive::getNameIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre de una entrada utilizando su índice.

### Parámetros

     index


       El índice de la entrada.






     flags


       Si las flags se establecen en **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, el nombre original es
       devuelto sin cambios.





### Valores devueltos

Devuelve el nombre en caso de tener éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de ZipArchive::getNameIndex()**

&lt;?php
if ($zip-&gt;open('test.zip') == TRUE) {
 for ($i = 0; $i &lt; $zip-&gt;numFiles; $i++) {
     $filename = $zip-&gt;getNameIndex($i);
// ...
}
}
?&gt;

# ZipArchive::getStatusString

(PHP 5 &gt;= 5.2.7, PHP 7, PHP 8)

ZipArchive::getStatusString — Devuelve mensajes de: estado de error, de sistema y/o mensajes de zip

### Descripción

public **ZipArchive::getStatusString**(): [string](#language.types.string)

Devuelve mensajes de: estado de error, de sistema y/o mensajes de zip.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) con el mensaje de estado.

### Historial de cambios

       Versión
       Descripción






       8.0.0, PECL zip 1.18.0

        Este método puede ser llamado en un archivo cerrado.




       8.0.0, PECL zip 1.18.0

        Este método ya no devuelve **[false](#constant.false)** en caso de fallo.





# ZipArchive::getStream

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::getStream — Obtener un manejador de fichero para la entrada definido por su nombre (sólo lectura)

### Descripción

public **ZipArchive::getStream**([string](#language.types.string) $name): [resource](#language.types.resource)|[false](#language.types.singleton)

Obtener un manejador de fichero para la entrada definido por su nombre. Por ahora, éste solamente
soporta operaciones de lectura.

### Parámetros

     name


       El nombre de la entrada a utilizar.





### Valores devueltos

Devuelve un puntero de fichero (un recurso) en caso de tener éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Obtiene los contenidos de entrada con [fread()](#function.fread) y lo almacena**

&lt;?php
$contents = '';
$z = new ZipArchive();
if ($z-&gt;open('test.zip')) {
    $fp = $z-&gt;getStream('test');
    if(!$fp) exit("failed\n");

    while (!feof($fp)) {
        $contents .= fread($fp, 2);
    }

    fclose($fp);
    file_put_contents('t',$contents);
    echo "done.\n";

}
?&gt;

**Ejemplo #2 Lo mismo como el ejemplo anterior pero con [fopen()](#function.fopen) y el envoltorio de flujo de zip**

&lt;?php
$contents = '';
$fp = fopen('zip://' . dirname(**FILE**) . '/test.zip#test', 'r');
if (!$fp) {
    exit("cannot open\n");
}
while (!feof($fp)) {
$contents .= fread($fp, 2);
}
echo "$contents\n";
fclose($fp);
echo "done.\n";
?&gt;

**Ejemplo #3 El flujo de envoltorio y la imagen, también pueden ser utilizados con la función xml**

&lt;?php
$im = imagecreatefromgif('zip://' . dirname(__FILE__) . '/test_im.zip#pear_item.gif');
imagepng($im, 'a.png');
?&gt;

### Ver también

    - [ZipArchive::getStreamIndex()](#ziparchive.getstreamindex) - Recupera un manejador de archivo para la entrada definida por su índice (solo lectura)

    - [ZipArchive::getStreamName()](#ziparchive.getstreamname) - Recupera un manejador de archivo para la entrada definida por su nombre (solo lectura)

    - [Flujos de compresión](#wrappers.compression)

# ZipArchive::getStreamIndex

(PHP 8 &gt;= 8.2.0, PECL zip &gt;= 1.20.0)

ZipArchive::getStreamIndex — Recupera un manejador de archivo para la entrada definida por su índice (solo lectura)

### Descripción

public **ZipArchive::getStreamIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [resource](#language.types.resource)|[false](#language.types.singleton)

Recupera un manejador de archivo para la entrada definida por su índice. Actualmente,
esta función solo soporta operaciones de lectura.

### Parámetros

     index


       Índice de la entrada a utilizar.






     flags


       Si flags se define como **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, el flujo original
       es devuelto.





### Valores devueltos

Devuelve un puntero de archivo (recurso) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

     **Ejemplo #1 Obtener el contenido de la entrada con [fread()](#function.fread) y almacenarlo**




&lt;?php
$contents = '';
$z = new ZipArchive();
if ($z-&gt;open('test.zip')) {
    $fp = $z-&gt;getStreamIndex(1, ZipArchive::FL_UNCHANGED);
    if(!$fp) die($z-&gt;getStatusString());

    echo stream_get_contents($fp);

    fclose($fp);

}
?&gt;

### Ver también

    - [ZipArchive::getStreamName()](#ziparchive.getstreamname) - Recupera un manejador de archivo para la entrada definida por su nombre (solo lectura)

# ZipArchive::getStreamName

(PHP 8 &gt;= 8.2.0, PECL zip &gt;= 1.20.0)

ZipArchive::getStreamName — Recupera un manejador de archivo para la entrada definida por su nombre (solo lectura)

### Descripción

public **ZipArchive::getStreamName**([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [resource](#language.types.resource)|[false](#language.types.singleton)

Recupera un manejador de archivo para la entrada definida por su nombre. Actualmente,
esta función solo soporta operaciones de lectura.

### Parámetros

     name


       El nombre de la entrada a utilizar.






     flags


       Si flags se define como **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**, el flujo original
       es devuelto.





### Valores devueltos

Devuelve un puntero de archivo (recurso) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

     **Ejemplo #1 Obtener el contenido de la entrada con [fread()](#function.fread) y almacenarlo**




&lt;?php
$contents = '';
$z = new ZipArchive();
if ($z-&gt;open('test.zip')) {
    $fp = $z-&gt;getStreamName('test', ZipArchive::FL_UNCHANGED);
    if(!$fp) die($z-&gt;getStatusString());

    echo stream_get_contents($fp);

    fclose($fp);

}
?&gt;

### Ver también

    - [ZipArchive::getStreamIndex()](#ziparchive.getstreamindex) - Recupera un manejador de archivo para la entrada definida por su índice (solo lectura)

# ZipArchive::isCompressionMethodSupported

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.19.0)

ZipArchive::isCompressionMethodSupported — Verifica si un método de compresión es soportado por libzip

### Descripción

public static **ZipArchive::isCompressionMethodSupported**([int](#language.types.integer) $method, [bool](#language.types.boolean) $enc = true): [bool](#language.types.boolean)

Verifica si un método de compresión es soportado por libzip.

### Parámetros

     method


       El método de compresión, una de las constantes
       **[ZipArchive::CM_*](#ziparchive.constants.cm-default)**.






     enc


       Si es **[true](#constant.true)**, verifica la compresión; si es **[false](#constant.false)**, verifica la
       descompresión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    Esta función está disponible solo si la compilación
    se realizó con ≥ 1.7.0.

### Ver también

    - [ZipArchive::setCompressionIndex()](#ziparchive.setcompressionindex) - Establecer el método de compresión de una entrada definida por su índice

    - [ZipArchive::setCompressionName()](#ziparchive.setcompressionname) - Establecer el método de compresión de una entrada definida por su nombre

# ZipArchive::isEncryptionMethodSupported

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.19.0)

ZipArchive::isEncryptionMethodSupported — Verifica si un método de cifrado es soportado por libzip

### Descripción

public static **ZipArchive::isEncryptionMethodSupported**([int](#language.types.integer) $method, [bool](#language.types.boolean) $enc = true): [bool](#language.types.boolean)

Verifica si un método de cifrado es soportado por libzip.

### Parámetros

     method


       El método de cifrado, una de las constantes
       **[ZipArchive::EM_*](#ziparchive.constants.em-none)**.






     enc


       Si es true, verifica el cifrado; si es false, verifica el
       descifrado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    Esta función está disponible solo si la extensión ha sido compilada con
    libzip ≥ 1.7.0.

### Ver también

    - [ZipArchive::setEncryptionIndex()](#ziparchive.setencryptionindex) - Establece el método de cifrado de una entrada definida por su índice

    - [ZipArchive::setEncryptionName()](#ziparchive.setencryptionname) - Establece el método de cifrado de una entrada definida por su nombre

# ZipArchive::locateName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::locateName — Devuelve el índice de la entrada en el archivo

### Descripción

public **ZipArchive::locateName**([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Localiza una entrada utilizando su nombre.

### Parámetros

     name


       El nombre de la entrada a buscar






     flags


       Los indicadores son especificados agregándoles OR a los siguientes valores, ó 0 para ninguno de ellos.



        -

          **[ZipArchive::FL_NOCASE](#ziparchive.constants.fl-nocase)**





        -

          **[ZipArchive::FL_NODIR](#ziparchive.constants.fl-nodir)**









### Valores devueltos

Devuelve el índice de la entrada en caso de tener éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Crear un archivo y luego utilizarlo con ZipArchive::locateName()**

&lt;?php
$file = 'testlocate.zip';

$zip = new ZipArchive;
if ($zip-&gt;open($file, ZipArchive::CREATE) !== TRUE) {
exit('falló');
}

$zip-&gt;addFromString('entry1.txt', 'entry #1');
$zip-&gt;addFromString('entry2.txt', 'entry #2');
$zip-&gt;addFromString('dir/entry2d.txt', 'entry #2');

if ($zip-&gt;status !== ZipArchive::ER_OK) {
    echo "falló al escribir en el archivo zip\n";
}
$zip-&gt;close();

if ($zip-&gt;open($file) !== TRUE) {
exit('falló');
}

echo $zip-&gt;locateName('entry1.txt') . "\n";
echo $zip-&gt;locateName('eNtry2.txt') . "\n";
echo $zip-&gt;locateName('eNtry2.txt', ZipArchive::FL_NOCASE) . "\n";
echo $zip-&gt;locateName('enTRy2d.txt', ZipArchive::FL_NOCASE|ZipArchive::FL_NODIR) . "\n";
$zip-&gt;close();

?&gt;

El ejemplo anterior mostrará:

El ejemplo de arriba mostrará la salida:

0

1
2

# ZipArchive::open

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::open — Abrir un fichero de archivo en formato ZIP

### Descripción

public **ZipArchive::open**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)|[int](#language.types.integer)

Abre un archivo zip nuevo o existente para leer, escribir o modificar.

Desde libzip 1.6.0, un archivo vacío ya no es un archivo válido.

### Parámetros

     filename


       El nombre del fichero del archivo ZIP para ser abierto.






     flags


       El modo a utilizar para abrir el archivo.



        -

          **[ZipArchive::OVERWRITE](#ziparchive.constants.overwrite)**





        -

          **[ZipArchive::CREATE](#ziparchive.constants.create)**





        -

          **[ZipArchive::RDONLY](#ziparchive.constants.rdonly)**





        -

          **[ZipArchive::EXCL](#ziparchive.constants.excl)**





        -

          **[ZipArchive::CHECKCONS](#ziparchive.constants.checkcons)**









### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** o uno de los siguientes códigos de error en caso de error:

     **[ZipArchive::ER_EXISTS](#ziparchive.constants.er-exists)**

      El fichero ya existe.



     **[ZipArchive::ER_INCONS](#ziparchive.constants.er-incons)**

      Archivo zip inconsistente.



     **[ZipArchive::ER_INVAL](#ziparchive.constants.er-inval)**

      Argumento no válido.



     **[ZipArchive::ER_MEMORY](#ziparchive.constants.er-memory)**

      Falló malloc.



     **[ZipArchive::ER_NOENT](#ziparchive.constants.er-noent)**

      No existe el fichero.



     **[ZipArchive::ER_NOZIP](#ziparchive.constants.er-nozip)**

      No es un archivo zip.



     **[ZipArchive::ER_OPEN](#ziparchive.constants.er-open)**

      No se puede abrir el fichero.



     **[ZipArchive::ER_READ](#ziparchive.constants.er-read)**

      Error de lectura.



     **[ZipArchive::ER_SEEK](#ziparchive.constants.er-seek)**

      Error de búsqueda.


### Ejemplos

**Ejemplo #1 Abrir y extraer**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
echo 'ok';
$zip-&gt;extractTo('test');
$zip-&gt;close();
} else {
echo 'falló, código:' . $res;
}
?&gt;

**Ejemplo #2 Crear un fichero**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFromString('test.txt', 'el contenido del fichero va aquí');
$zip-&gt;addFile('data.txt', 'entryname.txt');
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

     **Ejemplo #3 Crear un fichero temporal**




&lt;?php
$name = tempnam(sys_get_temp_dir(), "FOO");
$zip = new ZipArchive;
$res = $zip-&gt;open($name, ZipArchive::OVERWRITE); /_ truncate as empty file is not valid _/
if ($res === TRUE) {
$zip-&gt;addFile('data.txt', 'entryname.txt');
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

# ZipArchive::registerCancelCallback

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.17.0)

ZipArchive::registerCancelCallback — Registrar una llamada para permitir la cancelación durante el cierre del archivo

### Descripción

public **ZipArchive::registerCancelCallback**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Registrar una función callback para permitir la cancelación durante el cierre del archivo.

### Parámetros

     callback


       Si esta función vuelve a 0, la operación continuará, otro valor será cancelado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo crea un archivo ZIP
php.zip y cancela
la operación en alguna condición de operación.

**Ejemplo #1 Archive a file**

&lt;?php
$zip = new ZipArchive();
if ($zip-&gt;open('php.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
$zip-&gt;addFile(PHP_BINARY, 'php');
    $zip-&gt;registerCancelCallback(function () {
        return ($someruncondition ? -1 : 0);
});
$zip-&gt;close();
}

### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.6.0.

### Ver también

    - [ZipArchive::registerProgressCallback()](#ziparchive.registerprogresscallback) - Registra una llamada para proporcionar actualizaciones durante el cierre del archivo

# ZipArchive::registerProgressCallback

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.17.0)

ZipArchive::registerProgressCallback — Registra una llamada para proporcionar actualizaciones durante el cierre del archivo

### Descripción

public **ZipArchive::registerProgressCallback**([float](#language.types.float) $rate, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Registra una función callback para proporcionar actualizaciones durante el cierre del archivo.

### Parámetros

     rate


       Cambiar entre cada llamada de la devolución de llamada (de 0.0 a 1.0).






     callback


       Esta función recibirá el actual state como un [float](#language.types.float) (de 0.0 a 1.0).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo crea un archivo ZIP
php.zip y muestra
la progresión.

**Ejemplo #1 Archive a file**

$zip = new ZipArchive();
if ($zip-&gt;open('php.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
$zip-&gt;addFile(PHP_BINARY, 'php');
    $zip-&gt;registerProgressCallback(0.05, function ($r) {
printf("%d%%\n", $r \* 100);
});
$zip-&gt;close();
}

### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.3.0.

### Ver también

    - [ZipArchive::registerCancelCallback()](#ziparchive.registercancelcallback) - Registrar una llamada para permitir la cancelación durante el cierre del archivo

# ZipArchive::renameIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::renameIndex — Renombra una entrada definida por su índice

### Descripción

public **ZipArchive::renameIndex**([int](#language.types.integer) $index, [string](#language.types.string) $new_name): [bool](#language.types.boolean)

Renombra una entrada definida por su índice.

### Parámetros

     index


       Índice de la entrada a renombrar.






     new_name


       Nombre nuevo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Renombra una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
$zip-&gt;renameIndex(2,'newname.txt');
$zip-&gt;close();
} else {
echo 'falló, código:' . $res;
}
?&gt;

# ZipArchive::renameName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::renameName — Renombra una entrada definida por su nombre

### Descripción

public **ZipArchive::renameName**([string](#language.types.string) $name, [string](#language.types.string) $new_name): [bool](#language.types.boolean)

Renombra una entrada definida por su nombre.

### Parámetros

     name


       Nombre de la entrada a renombrar.






     new_name


       Nombre nuevo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Renombra una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
$zip-&gt;renameName('currentname.txt','newname.txt');
$zip-&gt;close();
} else {
echo 'falló, código:' . $res;
}
?&gt;

# ZipArchive::replaceFile

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.18.0)

ZipArchive::replaceFile — Reemplaza fichero en el archivo ZIP con una ruta determinada

### Descripción

public **ZipArchive::replaceFile**(
    [string](#language.types.string) $filepath,
    [int](#language.types.integer) $index,
    [int](#language.types.integer) $start = 0,
    [int](#language.types.integer) $length = ZipArchive::LENGTH_TO_END,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Reemplaza fichero en el archivo ZIP con una ruta determinada.

**Nota**: Para una portabilidad máxima, se recomienda siempre utilizar barras oblicuas (/) como separador de directorio en los nombres de archivos zip.

### Parámetros

     filepath


       La ruta del archivo a añadir.






     index


       El índice del archivo a reemplazar, su nombre no ha cambiado.






     start


        Para la copia parcial, posición de inicio.






     length


       Para copia parcial, longitud a copiar,
       si **[ZipArchive::LENGTH_TO_END](#ziparchive.constants.length-to-end)** (0) se usa el tamaño del archivo,
       si **[ZipArchive::LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked)** se usa todo el archivo
       (comenzando desde start).






     flags


       Máscara de bits compuesta por
       **[ZipArchive::FL_OVERWRITE](#ziparchive.constants.fl-overwrite)**,
       **[ZipArchive::FL_ENC_GUESS](#ziparchive.constants.fl-enc-guess)**,
       **[ZipArchive::FL_ENC_UTF_8](#ziparchive.constants.fl-enc-utf-8)**,
       **[ZipArchive::FL_ENC_CP437](#ziparchive.constants.fl-enc-cp437)**,
       **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.
       El comportamiento de estas constantes se describe en
       la página de [constantes ZIP](#zip.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.3.0, PECL zip 1.22.1

        Se añadio **[ZipArchive::FL_OPEN_FILE_NOW](#ziparchive.constants.fl-open-file-now)**.




         8.3.0, PECL zip 1.22.2

          Se añadieron **[ZipArchive::LENGTH_TO_END](#ziparchive.constants.length-to-end)** y **[ZipArchive::LENGTH_UNCHECKED](#ziparchive.constants.length-unchecked)**.





### Ejemplos

Este ejemplo abre un archivo ZIP
test.zip y sustituye la entrada del índice 1
con /path/to/index.txt.

**Ejemplo #1 Abrir y reemplazar**

&lt;?php
$zip = new ZipArchive;
if ($zip-&gt;open('test.zip') === TRUE) {
$zip-&gt;replaceFile('/path/to/index.txt', 1);
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

### Ver también

    - [ZipArchive::addFile()](#ziparchive.addfile) - Añade un fichero al archivo ZIP para la ruta dada

# ZipArchive::setArchiveComment

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.4.0)

ZipArchive::setArchiveComment — Establece el comentario de un archivo ZIP

### Descripción

public **ZipArchive::setArchiveComment**([string](#language.types.string) $comment): [bool](#language.types.boolean)

Establece el comentario de un archivo ZIP.

### Parámetros

     comment


       Los contenidos del comentario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Crear un archivo y establecer un comentario**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFromString('test.txt', 'El contenido del fichero va aquí');
$zip-&gt;setArchiveComment('nuevo comentario del archivo');
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

# ZipArchive::setArchiveFlag

(PHP &gt;= 8.3.0, PECL zip &gt;= 1.22.0)

ZipArchive::setArchiveFlag — Define una bandera global de un archivo ZIP

### Descripción

public **ZipArchive::setArchiveFlag**([int](#language.types.integer) $flag, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Define una bandera global de un archivo ZIP.

### Parámetros

     flag


       La bandera global a cambiar, entre las constantes AFL_*.



        -

          **[ZipArchive::AFL_WANT_TORRENTZIP](#ziparchive.constants.afl-want-torrentzip)**





        -

          **[ZipArchive::AFL_CREATE_OR_KEEP_FILE_FOR_EMPTY_ARCHIVE](#ziparchive.constants.afl-create-or-keep-file-for-empty-archive)**










     value


       El nuevo valor de la bandera.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

     **Ejemplo #1 Crear un archivo torrentzip**




&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;setArchiveFlag(ZipArchive::AFL_WANT_TORRENTZIP, 1);
$zip-&gt;addFromString('test.txt', 'file content goes here');
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

### Ver también

    - [ZipArchive::getArchiveFlag()](#ziparchive.getarchiveflag) - Devuelve el valor de una bandera global del archivo

# ZipArchive::setCommentIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.4.0)

ZipArchive::setCommentIndex — Establece el comentario de una entrada definido por su índice

### Descripción

public **ZipArchive::setCommentIndex**([int](#language.types.integer) $index, [string](#language.types.string) $comment): [bool](#language.types.boolean)

Establece el comentario de una entrada definido por su índice.

### Parámetros

     index


       Índice de la entrada.






     comment


       Los contenidos del comentario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Abrir un archivo y establecer un comentario para una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
$zip-&gt;setCommentIndex(2, 'comentario de la entrada nueva');
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

# ZipArchive::setCommentName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.4.0)

ZipArchive::setCommentName — Establece el comentario de una entrada definido por su nombre

### Descripción

public **ZipArchive::setCommentName**([string](#language.types.string) $name, [string](#language.types.string) $comment): [bool](#language.types.boolean)

Establece el comentario de una entrada definido por su nombre.

### Parámetros

     name


       Nombre de la entrada.






     comment


       Los contenidos del comentario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Abrir un archivo y establecer un comentario para una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
$zip-&gt;setCommentName('entry1.txt', 'comentario de la entrada nueva');
$zip-&gt;close();
echo 'ok';
} else {
echo 'falló';
}
?&gt;

# ZipArchive::setCompressionIndex

(PHP 7, PHP 8, PECL zip &gt;= 1.13.0)

ZipArchive::setCompressionIndex — Establecer el método de compresión de una entrada definida por su índice

### Descripción

public **ZipArchive::setCompressionIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $method, [int](#language.types.integer) $compflags = 0): [bool](#language.types.boolean)

Establecer el método de compresión de una entrada definida por su índice.

### Parámetros

     index


       El índice de la entrada.






     method


       El método de compresión, una de las constantes
       **[ZipArchive::CM_*](#ziparchive.constants.cm-default)**.






     compflags


       Nivel de compresión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Añadir ficheros con diferentes métodos de compresión a un archivo**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFromString('foo', 'Un texto');
$zip-&gt;addFromString('bar', 'Otro texto');
$zip-&gt;setCompressionIndex(0, ZipArchive::CM_STORE);
$zip-&gt;setCompressionIndex(1, ZipArchive::CM_DEFLATE);
$zip-&gt;close();
echo 'ok';
} else {
echo 'fallo';
}
?&gt;

# ZipArchive::setCompressionName

(PHP 7, PHP 8, PECL zip &gt;= 1.13.0)

ZipArchive::setCompressionName — Establecer el método de compresión de una entrada definida por su nombre

### Descripción

public **ZipArchive::setCompressionName**([string](#language.types.string) $name, [int](#language.types.integer) $method, [int](#language.types.integer) $compflags = 0): [bool](#language.types.boolean)

Establecer el método de compresión de una entrada definida por su nombre.

### Parámetros

     name


       El nombre de la entrada.






     method


       El método de compresión. Una de las constantes
       **[ZipArchive::CM_*](#ziparchive.constants.cm-default)**.






     compflags


       Nivel de compresión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Añadir ficheros con diferentes métodos de compresión a un archivo**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFromString('foo', 'Un texto');
$zip-&gt;addFromString('bar', 'Otro texto');
$zip-&gt;setCompressionName('foo', ZipArchive::CM_STORE);
$zip-&gt;setCompressionName('bar', ZipArchive::CM_DEFLATE);
$zip-&gt;close();
echo 'ok';
} else {
echo 'fallo';
}
?&gt;

**Ejemplo #2 Añadir fichero y establecer el método de compresión**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
$zip-&gt;addFile('foo.jpg', 'bar.jpg');
$zip-&gt;setCompressionName('bar.jpg', ZipArchive::CM_XZ);
$zip-&gt;close();
echo 'ok';
} else {
echo 'failed';
}
?&gt;

# ZipArchive::setEncryptionIndex

(PHP &gt;= 7.2.0, PHP 8, PECL zip &gt;= 1.14.0)

ZipArchive::setEncryptionIndex — Establece el método de cifrado de una entrada definida por su índice

### Descripción

public **ZipArchive::setEncryptionIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $method, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**): [bool](#language.types.boolean)

Establece el método de cifrado de una entrada definida por su índice.

### Parámetros

     index


       Índice de la entrada.






     method


       El método de cifrado definido por una de las constantes ZipArchive::EM_ constants.






     password


       Contraseña opcional, se utiliza por defecto cuando falta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       password ahora es anulable.



### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.2.0.

### Ver también

    - [ZipArchive::setPassword()](#ziparchive.setpassword) - Establece la contraseña para el archivo activo

    - [ZipArchive::setEncryptionName()](#ziparchive.setencryptionname) - Establece el método de cifrado de una entrada definida por su nombre

# ZipArchive::setEncryptionName

(PHP &gt;= 7.2.0, PHP 8, PECL zip &gt;= 1.14.0)

ZipArchive::setEncryptionName — Establece el método de cifrado de una entrada definida por su nombre

### Descripción

public **ZipArchive::setEncryptionName**([string](#language.types.string) $name, [int](#language.types.integer) $method, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**): [bool](#language.types.boolean)

Establece el método de cifrado de una entrada definida por su nombre.

### Parámetros

     name


       Nombre de la entrada.






     method


       El método de encriptación definido por una de las constantes ZipArchive::EM_constants.






     password


       Contraseña opcional, se utiliza por defecto cuando falta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       password ahora es anulable.



### Ejemplos

Este ejemplo crea un archivo ZIP
test.zip y añade
al archivo test.txt
encriptado usando el método AES 256.

**Ejemplo #1 Archivar y encriptar un archivo**

&lt;?php
$zip = new ZipArchive();
if ($zip-&gt;open('test.zip', ZipArchive::CREATE) === TRUE) {
$zip-&gt;setPassword('secret');
$zip-&gt;addFile('text.txt');
$zip-&gt;setEncryptionName('text.txt', ZipArchive::EM_AES_256);
$zip-&gt;close();
echo "Ok\n";
} else {
echo "KO\n";
}
?&gt;

### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.2.0.

### Ver también

    - [ZipArchive::setPassword()](#ziparchive.setpassword) - Establece la contraseña para el archivo activo

    - [ZipArchive::setEncryptionIndex()](#ziparchive.setencryptionindex) - Establece el método de cifrado de una entrada definida por su índice

# ZipArchive::setExternalAttributesIndex

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL zip &gt;= 1.12.4)

ZipArchive::setExternalAttributesIndex — Establece los atributos externos de una entrada definida por su índice

### Descripción

public **ZipArchive::setExternalAttributesIndex**(
    [int](#language.types.integer) $index,
    [int](#language.types.integer) $opsys,
    [int](#language.types.integer) $attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Establece los atributos externos de una entrada definida por su índice.

### Parámetros

     index


       El índice de la entrada.






     opsys


       El código del sistema operativo definido por una de las constantes ZipArchive::OPSYS_.






     attr


       Los atributos externos. El valor depende del sistema operativo.






     flags


       Banderas opcionales. Actualmente no se utiliza.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ZipArchive::setExternalAttributesName

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL zip &gt;= 1.12.4)

ZipArchive::setExternalAttributesName — Establece los atributos externos de una entrada definida por su nombre

### Descripción

public **ZipArchive::setExternalAttributesName**(
    [string](#language.types.string) $name,
    [int](#language.types.integer) $opsys,
    [int](#language.types.integer) $attr,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Establece los atributos externos de una entrada definida por su nombre.

### Parámetros

     name


       El nombre de la entrada.






     opsys


       El código del sistema operativo definido por una de las constantes ZipArchive::OPSYS_.






     attr


       Los atributos externos. El valor depende del sistema operativo.






     flags


       Banderas opcionales. Actualmente no se utiliza.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo abre un archivo comprimido ZIP
test.zip y añade
el fichero test.txt
con sus permisos Unix como atributos externos.

**Ejemplo #1 Archivar un fichero, con sus permisos Unix**

&lt;?php
$zip = new ZipArchive();
$stat = stat($filename='test.txt');
if (is_array($stat) &amp;&amp; $zip-&gt;open('test.zip', ZipArchive::CREATE) === TRUE) {
    $zip-&gt;addFile($filename);
$zip-&gt;setExternalAttributesName($filename, ZipArchive::OPSYS_UNIX, $stat['mode'] &lt;&lt; 16);
$zip-&gt;close();
echo "Ok\n";
} else {
echo "KO\n";
}
?&gt;

# ZipArchive::setMtimeIndex

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.16.0)

ZipArchive::setMtimeIndex — Establece el tiempo de modificación de una entrada definido por su índice

### Descripción

public **ZipArchive::setMtimeIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $timestamp, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Establece el tiempo de modificación de una entrada definido por su índice.

### Parámetros

     index


       Índice de la entrada.






     timestamp


       La hora de modificación (unix timestamp) del archivo.






     flags


       Flags opcionales, sin usar por ahora.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo crea un archivo ZIP
test.zip y añade
al archivo test.txt
con su fecha de modificación.

**Ejemplo #1 Archivar un fichero**

&lt;?php
$zip = new ZipArchive();
if ($zip-&gt;open('test.zip', ZipArchive::CREATE) === TRUE) {
$zip-&gt;addFile('text.txt');
$zip-&gt;setMtimeIndex(0, mktime(0,0,0,12,25,2019));
$zip-&gt;close();
echo "Ok\n";
} else {
echo "KO\n";
}
?&gt;

### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.0.0.

### Ver también

    - [ZipArchive::setMtimeName()](#ziparchive.setmtimename) - Establece la hora de modificación de una entrada definida por su nombre

# ZipArchive::setMtimeName

(PHP &gt;= 8.0.0, PECL zip &gt;= 1.16.0)

ZipArchive::setMtimeName — Establece la hora de modificación de una entrada definida por su nombre

### Descripción

public **ZipArchive::setMtimeName**([string](#language.types.string) $name, [int](#language.types.integer) $timestamp, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Establece la hora de modificación de una entrada definida por su nombre.

### Parámetros

     name


       Nombre de la entrada.






     timestamp


       La hora de modificación (unix timestamp) del archivo.






     flags


       Flags opcionales, sin usar por ahora.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Este ejemplo crea un archivo ZIP
test.zip y añade
al archivo test.txt
con su fecha de modificación.

**Ejemplo #1 Archivar un fichero**

&lt;?php
$zip = new ZipArchive();
if ($zip-&gt;open('test.zip', ZipArchive::CREATE) === TRUE) {
$zip-&gt;addFile('text.txt');
$zip-&gt;setMtimeName('text.txt', mktime(0,0,0,12,25,2019));
$zip-&gt;close();
echo "Ok\n";
} else {
echo "KO\n";
}
?&gt;

### Notas

**Nota**:

    Esta función sólo está disponible si se construye con libzip ≥ 1.0.0.

### Ver también

    - [ZipArchive::setMtimeIndex()](#ziparchive.setmtimeindex) - Establece el tiempo de modificación de una entrada definido por su índice

# ZipArchive::setPassword

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL zip &gt;= 1.12.4)

ZipArchive::setPassword — Establece la contraseña para el archivo activo

### Descripción

public **ZipArchive::setPassword**([#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password): [bool](#language.types.boolean)

Establece la contraseña para el archivo activo.

### Parámetros

    password


      La contraseña a emplear para el archivo.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    A partir de PHP 7.2.0 y libzip 1.2.0 la contraseña se utiliza para descomprimir el archivo,
    y también es la contraseña por omisión para [ZipArchive::setEncryptionName()](#ziparchive.setencryptionname)
    y [ZipArchive::setEncryptionIndex()](#ziparchive.setencryptionindex).
    Anteriormente, esta función sólo establecía la contraseña que se usaría para descomprimir el archivo;
    No se convirtió en un no protegido con contraseña [ZipArchive](#class.ziparchive)
    en un protegido con contraseña [ZipArchive](#class.ziparchive).

### Ver también

    - [ZipArchive::setEncryptionIndex()](#ziparchive.setencryptionindex) - Establece el método de cifrado de una entrada definida por su índice

    - [ZipArchive::setEncryptionName()](#ziparchive.setencryptionname) - Establece el método de cifrado de una entrada definida por su nombre

# ZipArchive::statIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::statIndex — Obtiene los detalles de una entrada definida por su índice

### Descripción

public **ZipArchive::statIndex**([int](#language.types.integer) $index, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

    La función obtiene información acerca de la entrada definida por su
    índice.

### Parámetros

     index


       Índice de la entrada






     flags


       **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)** podría ser puesto con otros OR lógicos en él para pedir
       información  acerca del fichero original en el archivo,
       ignorando cualquiera de los cambios hechos.





### Valores devueltos

Devuelve una matríz conteniendo los detalles de la entrada, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Volcar la información estadística de una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
print_r($zip-&gt;statIndex(3));
$zip-&gt;close();
} else {
echo 'falló, código:' . $res;
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; foobar/baz
[index] =&gt; 3
[crc] =&gt; 499465816
[size] =&gt; 27
[mtime] =&gt; 1123164748
[comp_size] =&gt; 24
[comp_method] =&gt; 8
)

# ZipArchive::statName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::statName — Obtener los detalles de una entrada definida por su nombre

### Descripción

public **ZipArchive::statName**([string](#language.types.string) $name, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

    La función obtiene información acerca de la entrada definida por su nombre.

### Parámetros

     name


       Nombre de la entrada






     flags


       El argumento flags especifica cómo la búsqueda del nombre debería se hecho.
       También, **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)** podría ser puesta con otros OR en él para solicitar la
       información acerca del fichero original en el archivo,
       ignorando cualquier cambio realizado.



        -

          **[ZipArchive::FL_NOCASE](#ziparchive.constants.fl-nocase)**





        -

          **[ZipArchive::FL_NODIR](#ziparchive.constants.fl-nodir)**





        -

          **[ZipArchive::FL_UNCHANGED](#ziparchive.constants.fl-unchanged)**









### Valores devueltos

Devuelve una matríz que contenie detalles de la entrada o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Volcar la información estadística de una entrada**

&lt;?php
$zip = new ZipArchive;
$res = $zip-&gt;open('test.zip');
if ($res === TRUE) {
print_r($zip-&gt;statName('foobar/baz'));
$zip-&gt;close();
} else {
echo 'falló, código:' . $res;
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; foobar/baz
[index] =&gt; 3
[crc] =&gt; 499465816
[size] =&gt; 27
[mtime] =&gt; 1123164748
[comp_size] =&gt; 24
[comp_method] =&gt; 8
)

# ZipArchive::unchangeAll

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::unchangeAll — Deshacer todos los cambios hechos en el archivo

### Descripción

public **ZipArchive::unchangeAll**(): [bool](#language.types.boolean)

Deshacer todos los cambios hechos en el archivo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ZipArchive::unchangeArchive

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::unchangeArchive — Revertir todos los cambios globales hechos en el archivo

### Descripción

public **ZipArchive::unchangeArchive**(): [bool](#language.types.boolean)

Revertir todos los cambios globales en el archivo. Por ahora, esto
solamente revierte los cambios de los comentarios del archivo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ZipArchive::unchangeIndex

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.1.0)

ZipArchive::unchangeIndex — Revertir todos los cambios hechos a una entrada en el índice dado

### Descripción

public **ZipArchive::unchangeIndex**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Revertir todos los cambios hechos a una entrada en el índice dado.

### Parámetros

     index


       Índice de la entrada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ZipArchive::unchangeName

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.5.0)

ZipArchive::unchangeName — Deshace todos los cambios realizados a una entrada con un nombre dado

### Descripción

public **ZipArchive::unchangeName**([string](#language.types.string) $name): [bool](#language.types.boolean)

Deshacer todos los cambios hechos a una entrada.

### Parámetros

     name


       Nombre de la entrada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [ZipArchive::addEmptyDir](#ziparchive.addemptydir) — Añadir un nuevo directorio
- [ZipArchive::addFile](#ziparchive.addfile) — Añade un fichero al archivo ZIP para la ruta dada
- [ZipArchive::addFromString](#ziparchive.addfromstring) — Añadir un fichero al archivo ZIP usando su contenido
- [ZipArchive::addGlob](#ziparchive.addglob) — Añadir ficheros de un directorio mediante un patrón glob
- [ZipArchive::addPattern](#ziparchive.addpattern) — Añade ficheros de un directorio a partir de un patrón PCRE
- [ZipArchive::clearError](#ziparchive.clearerror) — Borra el mensaje de error, los mensajes del sistema y/o zip
- [ZipArchive::close](#ziparchive.close) — Cierra el fichero activo (abierto o el nuevo creado)
- [ZipArchive::count](#ziparchive.count) — Cuenta el número de archivos en el archivo
- [ZipArchive::deleteIndex](#ziparchive.deleteindex) — Elimina una entrada en el archivo usando su índice
- [ZipArchive::deleteName](#ziparchive.deletename) — Elimina una entrada en el archivo por su nombre
- [ZipArchive::extractTo](#ziparchive.extractto) — Extraer el contenido del archivo
- [ZipArchive::getArchiveComment](#ziparchive.getarchivecomment) — Devuelve el comentario del archivo ZIP
- [ZipArchive::getArchiveFlag](#ziparchive.getarchiveflag) — Devuelve el valor de una bandera global del archivo
- [ZipArchive::getCommentIndex](#ziparchive.getcommentindex) — Devuelve el comentario de una entrada usando la entrada díndice
- [ZipArchive::getCommentName](#ziparchive.getcommentname) — Devuelve el comentario de una entrada usando el nombre de la entrada
- [ZipArchive::getExternalAttributesIndex](#ziparchive.getexternalattributesindex) — Obtener los atributos externos de una entrada definida por su índice
- [ZipArchive::getExternalAttributesName](#ziparchive.getexternalattributesname) — Obtener los atributos externos de una entrada definida por su nombre
- [ZipArchive::getFromIndex](#ziparchive.getfromindex) — Devuelve el contenido de la entrada usando su índice
- [ZipArchive::getFromName](#ziparchive.getfromname) — Devuelve el contenido de la entrada utilizando su nombre
- [ZipArchive::getNameIndex](#ziparchive.getnameindex) — Devuelve el nombre de una entrada utilizando su índice
- [ZipArchive::getStatusString](#ziparchive.getstatusstring) — Devuelve mensajes de: estado de error, de sistema y/o mensajes de zip
- [ZipArchive::getStream](#ziparchive.getstream) — Obtener un manejador de fichero para la entrada definido por su nombre (sólo lectura)
- [ZipArchive::getStreamIndex](#ziparchive.getstreamindex) — Recupera un manejador de archivo para la entrada definida por su índice (solo lectura)
- [ZipArchive::getStreamName](#ziparchive.getstreamname) — Recupera un manejador de archivo para la entrada definida por su nombre (solo lectura)
- [ZipArchive::isCompressionMethodSupported](#ziparchive.iscompressionmethoddupported) — Verifica si un método de compresión es soportado por libzip
- [ZipArchive::isEncryptionMethodSupported](#ziparchive.isencryptionmethodsupported) — Verifica si un método de cifrado es soportado por libzip
- [ZipArchive::locateName](#ziparchive.locatename) — Devuelve el índice de la entrada en el archivo
- [ZipArchive::open](#ziparchive.open) — Abrir un fichero de archivo en formato ZIP
- [ZipArchive::registerCancelCallback](#ziparchive.registercancelcallback) — Registrar una llamada para permitir la cancelación durante el cierre del archivo
- [ZipArchive::registerProgressCallback](#ziparchive.registerprogresscallback) — Registra una llamada para proporcionar actualizaciones durante el cierre del archivo
- [ZipArchive::renameIndex](#ziparchive.renameindex) — Renombra una entrada definida por su índice
- [ZipArchive::renameName](#ziparchive.renamename) — Renombra una entrada definida por su nombre
- [ZipArchive::replaceFile](#ziparchive.replacefile) — Reemplaza fichero en el archivo ZIP con una ruta determinada
- [ZipArchive::setArchiveComment](#ziparchive.setarchivecomment) — Establece el comentario de un archivo ZIP
- [ZipArchive::setArchiveFlag](#ziparchive.setarchiveflag) — Define una bandera global de un archivo ZIP
- [ZipArchive::setCommentIndex](#ziparchive.setcommentindex) — Establece el comentario de una entrada definido por su índice
- [ZipArchive::setCommentName](#ziparchive.setcommentname) — Establece el comentario de una entrada definido por su nombre
- [ZipArchive::setCompressionIndex](#ziparchive.setcompressionindex) — Establecer el método de compresión de una entrada definida por su índice
- [ZipArchive::setCompressionName](#ziparchive.setcompressionname) — Establecer el método de compresión de una entrada definida por su nombre
- [ZipArchive::setEncryptionIndex](#ziparchive.setencryptionindex) — Establece el método de cifrado de una entrada definida por su índice
- [ZipArchive::setEncryptionName](#ziparchive.setencryptionname) — Establece el método de cifrado de una entrada definida por su nombre
- [ZipArchive::setExternalAttributesIndex](#ziparchive.setexternalattributesindex) — Establece los atributos externos de una entrada definida por su índice
- [ZipArchive::setExternalAttributesName](#ziparchive.setexternalattributesname) — Establece los atributos externos de una entrada definida por su nombre
- [ZipArchive::setMtimeIndex](#ziparchive.setmtimeindex) — Establece el tiempo de modificación de una entrada definido por su índice
- [ZipArchive::setMtimeName](#ziparchive.setmtimename) — Establece la hora de modificación de una entrada definida por su nombre
- [ZipArchive::setPassword](#ziparchive.setpassword) — Establece la contraseña para el archivo activo
- [ZipArchive::statIndex](#ziparchive.statindex) — Obtiene los detalles de una entrada definida por su índice
- [ZipArchive::statName](#ziparchive.statname) — Obtener los detalles de una entrada definida por su nombre
- [ZipArchive::unchangeAll](#ziparchive.unchangeall) — Deshacer todos los cambios hechos en el archivo
- [ZipArchive::unchangeArchive](#ziparchive.unchangearchive) — Revertir todos los cambios globales hechos en el archivo
- [ZipArchive::unchangeIndex](#ziparchive.unchangeindex) — Revertir todos los cambios hechos a una entrada en el índice dado
- [ZipArchive::unchangeName](#ziparchive.unchangename) — Deshace todos los cambios realizados a una entrada con un nombre dado

# Funciones Zip

**Advertencia**

     La API mediante funciones está obsoleta a partir de PHP 8.0.0.
     Debe usarse [ZipArchive](#class.ziparchive) en su lugar.

# zip_close

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_close — Cierra un archivo Zip

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_close**([resource](#language.types.resource) $zip): [void](language.types.void.html)

**zip_close()** cierra el archivo ZIP dado.

### Parámetros

     zip


       Un archivo ZIP previamente abierto con la función [zip_open()](#function.zip-open).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::close()](#ziparchive.close).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

# zip_entry_close

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_close — Cierra un directorio de archivo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_close**([resource](#language.types.resource) $zip_entry): [bool](#language.types.boolean)

**zip_entry_close()** cierra un directorio de archivo dado.

### Parámetros

     zip_entry


       Un directorio de archivo previamente abierto con la función
       [zip_entry_open()](#function.zip-entry-open).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos.





### Ver también

    - [zip_entry_open()](#function.zip-entry-open) - Abre un directorio de archivo para lectura

    - [zip_entry_read()](#function.zip-entry-read) - Lee el contenido de un archivo en un directorio

# zip_entry_compressedsize

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_compressedsize — Lee el tamaño comprimido de un directorio de archivo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_compressedsize**([resource](#language.types.resource) $zip_entry): [int](#language.types.integer)|[false](#language.types.singleton)

**zip_entry_compressedsize()** devuelve el tamaño comprimido
de un directorio de archivo dado.

### Parámetros

     zip_entry


       Un directorio de archivo devuelto por la función
       [zip_read()](#function.zip-read).





### Valores devueltos

El tamaño comprimido, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::statIndex()](#ziparchive.statindex).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

# zip_entry_compressionmethod

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_compressionmethod — Lee el método de compresión usado en un directorio de archivo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_compressionmethod**([resource](#language.types.resource) $zip_entry): [string](#language.types.string)|[false](#language.types.singleton)

**zip_entry_compressionmethod()** devuelve el método de compresión
usado en el directorio de archivo especificado por zip_entry.

### Parámetros

     zip_entry


       Un directorio de archivo devuelto por la función [zip_read()](#function.zip-read).





### Valores devueltos

El método de compresión, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::statIndex()](#ziparchive.statindex).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

# zip_entry_filesize

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_filesize — Lee el tamaño descomprimido de un directorio de archivo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_filesize**([resource](#language.types.resource) $zip_entry): [int](#language.types.integer)|[false](#language.types.singleton)

**zip_entry_filesize()** devuelve el tamaño descomprimido
de un directorio de archivo dado.

### Parámetros

     zip_entry


       Un directorio de archivo devuelto por la función
       [zip_read()](#function.zip-read).





### Valores devueltos

El tamaño descomprimido del directorio de archivo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::statIndex()](#ziparchive.statindex).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

# zip_entry_name

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_name — Lee el nombre de un directorio de archivo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_name**([resource](#language.types.resource) $zip_entry): [string](#language.types.string)|[false](#language.types.singleton)

**zip_entry_name()** devuelve el nombre de un
directorio de archivo dado.

### Parámetros

     zip_entry


       Un directorio de archivo devuelto por la función [zip_read()](#function.zip-read).





### Valores devueltos

El nombre del directorio de archivo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::statIndex()](#ziparchive.statindex).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

# zip_entry_open

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_open — Abre un directorio de archivo para lectura

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_open**([resource](#language.types.resource) $zip_dp, [resource](#language.types.resource) $zip_entry, [string](#language.types.string) $mode = "rb"): [bool](#language.types.boolean)

**zip_entry_open()** abre un directorio en un archivo ZIP
para lectura.

### Parámetros

     zip_dp


       Un recurso válido devuelto por la función
       [zip_open()](#function.zip-open).






     zip_entry


       Un directorio de archivo devuelto por la función
       [zip_read()](#function.zip-read).






     mode


       Todos los métodos especificados en la documentación
       de la función [fopen()](#function.fopen).



      **Nota**:



        Actualmente, mode es ignorado y siempre vale
        "rb". Esto se debe a que el soporte ZIP
        de PHP es solo de lectura.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Nota**:

    A diferencia de [fopen()](#function.fopen) y otras funciones
    de archivos, el valor devuelto por **zip_entry_open()**
    solo indica el resultado de la operación y no es necesario
    para la lectura o el cierre del archivo del directorio de archivo.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos.





### Ver también

    - [zip_entry_close()](#function.zip-entry-close) - Cierra un directorio de archivo

    - [zip_entry_read()](#function.zip-entry-read) - Lee el contenido de un archivo en un directorio

# zip_entry_read

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_entry_read — Lee el contenido de un archivo en un directorio

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_entry_read**([resource](#language.types.resource) $zip_entry, [int](#language.types.integer) $len = 1024): [string](#language.types.string)|[false](#language.types.singleton)

**zip_entry_read()** lee en un directorio de archivo abierto.

### Parámetros

     zip_entry


       Un directorio de archivo devuelto por la función
       [zip_read()](#function.zip-read).






     len


       El número de bytes a devolver.



      **Nota**:



        Esto debe ser el tamaño descomprimido que desea leer.






### Valores devueltos

Devuelve los datos leídos, una cadena vacía si se está al
final del archivo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::getFromIndex()](#ziparchive.getfromindex).





### Ver también

    - [zip_entry_open()](#function.zip-entry-open) - Abre un directorio de archivo para lectura

    - [zip_entry_close()](#function.zip-entry-close) - Cierra un directorio de archivo

    - [zip_entry_filesize()](#function.zip-entry-filesize) - Lee el tamaño descomprimido de un directorio de archivo

# zip_open

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_open — Abre un archivo ZIP

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_open**([string](#language.types.string) $filename): [resource](#language.types.resource)|[int](#language.types.integer)|[false](#language.types.singleton)

**zip_open()** abre un nuevo archivo ZIP para lectura.

### Parámetros

     filename


       El nombre del archivo ZIP a abrir.





### Valores devueltos

Devuelve un recurso a utilizar
más tarde con las funciones [zip_read()](#function.zip-read) y
[zip_close()](#function.zip-close), o bien devuelve **[false](#constant.false)** o
el número de error si el parámetro filename
no existe o en caso de otro error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::open()](#ziparchive.open).





### Ver también

    - [zip_read()](#function.zip-read) - Lee la siguiente entrada en un archivo ZIP

    - [zip_close()](#function.zip-close) - Cierra un archivo Zip

# zip_read

(PHP 4 &gt;= 4.1.0, PHP 5 &gt;= 5.2.0, PHP 7, PHP 8, PECL zip &gt;= 1.0.0)

zip_read — Lee la siguiente entrada en un archivo ZIP

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**zip_read**([resource](#language.types.resource) $zip): [resource](#language.types.resource)|[false](#language.types.singleton)

**zip_read()** lee la siguiente entrada en un archivo
ZIP.

### Parámetros

     zip


       Un archivo ZIP previamente abierto con la función
       [zip_open()](#function.zip-open).





### Valores devueltos

Devuelve un recurso de entrada de archivo,
para usar más tarde con otras funciones de la biblioteca,
**[false](#constant.false)** si no hay más entradas para leer en el archivo ZIP o el número
de error si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función está obsoleta en favor de la API orientada a objetos, ver [ZipArchive::statIndex()](#ziparchive.statindex).





### Ver también

    - [zip_open()](#function.zip-open) - Abre un archivo ZIP

    - [zip_close()](#function.zip-close) - Cierra un archivo Zip

    - [zip_entry_open()](#function.zip-entry-open) - Abre un directorio de archivo para lectura

    - [zip_entry_read()](#function.zip-entry-read) - Lee el contenido de un archivo en un directorio

## Tabla de contenidos

- [zip_close](#function.zip-close) — Cierra un archivo Zip
- [zip_entry_close](#function.zip-entry-close) — Cierra un directorio de archivo
- [zip_entry_compressedsize](#function.zip-entry-compressedsize) — Lee el tamaño comprimido de un directorio de archivo
- [zip_entry_compressionmethod](#function.zip-entry-compressionmethod) — Lee el método de compresión usado en un directorio de archivo
- [zip_entry_filesize](#function.zip-entry-filesize) — Lee el tamaño descomprimido de un directorio de archivo
- [zip_entry_name](#function.zip-entry-name) — Lee el nombre de un directorio de archivo
- [zip_entry_open](#function.zip-entry-open) — Abre un directorio de archivo para lectura
- [zip_entry_read](#function.zip-entry-read) — Lee el contenido de un archivo en un directorio
- [zip_open](#function.zip-open) — Abre un archivo ZIP
- [zip_read](#function.zip-read) — Lee la siguiente entrada en un archivo ZIP

- [Introducción](#intro.zip)
- [Instalación/Configuración](#zip.setup)<li>[Requerimientos](#zip.requirements)
- [Instalación](#zip.installation)
- [Tipos de recursos](#zip.resources)
  </li>- [Constantes predefinidas](#zip.constants)
- [Ejemplos](#zip.examples)
- [ZipArchive](#class.ziparchive) — La clase ZipArchive<li>[ZipArchive::addEmptyDir](#ziparchive.addemptydir) — Añadir un nuevo directorio
- [ZipArchive::addFile](#ziparchive.addfile) — Añade un fichero al archivo ZIP para la ruta dada
- [ZipArchive::addFromString](#ziparchive.addfromstring) — Añadir un fichero al archivo ZIP usando su contenido
- [ZipArchive::addGlob](#ziparchive.addglob) — Añadir ficheros de un directorio mediante un patrón glob
- [ZipArchive::addPattern](#ziparchive.addpattern) — Añade ficheros de un directorio a partir de un patrón PCRE
- [ZipArchive::clearError](#ziparchive.clearerror) — Borra el mensaje de error, los mensajes del sistema y/o zip
- [ZipArchive::close](#ziparchive.close) — Cierra el fichero activo (abierto o el nuevo creado)
- [ZipArchive::count](#ziparchive.count) — Cuenta el número de archivos en el archivo
- [ZipArchive::deleteIndex](#ziparchive.deleteindex) — Elimina una entrada en el archivo usando su índice
- [ZipArchive::deleteName](#ziparchive.deletename) — Elimina una entrada en el archivo por su nombre
- [ZipArchive::extractTo](#ziparchive.extractto) — Extraer el contenido del archivo
- [ZipArchive::getArchiveComment](#ziparchive.getarchivecomment) — Devuelve el comentario del archivo ZIP
- [ZipArchive::getArchiveFlag](#ziparchive.getarchiveflag) — Devuelve el valor de una bandera global del archivo
- [ZipArchive::getCommentIndex](#ziparchive.getcommentindex) — Devuelve el comentario de una entrada usando la entrada díndice
- [ZipArchive::getCommentName](#ziparchive.getcommentname) — Devuelve el comentario de una entrada usando el nombre de la entrada
- [ZipArchive::getExternalAttributesIndex](#ziparchive.getexternalattributesindex) — Obtener los atributos externos de una entrada definida por su índice
- [ZipArchive::getExternalAttributesName](#ziparchive.getexternalattributesname) — Obtener los atributos externos de una entrada definida por su nombre
- [ZipArchive::getFromIndex](#ziparchive.getfromindex) — Devuelve el contenido de la entrada usando su índice
- [ZipArchive::getFromName](#ziparchive.getfromname) — Devuelve el contenido de la entrada utilizando su nombre
- [ZipArchive::getNameIndex](#ziparchive.getnameindex) — Devuelve el nombre de una entrada utilizando su índice
- [ZipArchive::getStatusString](#ziparchive.getstatusstring) — Devuelve mensajes de: estado de error, de sistema y/o mensajes de zip
- [ZipArchive::getStream](#ziparchive.getstream) — Obtener un manejador de fichero para la entrada definido por su nombre (sólo lectura)
- [ZipArchive::getStreamIndex](#ziparchive.getstreamindex) — Recupera un manejador de archivo para la entrada definida por su índice (solo lectura)
- [ZipArchive::getStreamName](#ziparchive.getstreamname) — Recupera un manejador de archivo para la entrada definida por su nombre (solo lectura)
- [ZipArchive::isCompressionMethodSupported](#ziparchive.iscompressionmethoddupported) — Verifica si un método de compresión es soportado por libzip
- [ZipArchive::isEncryptionMethodSupported](#ziparchive.isencryptionmethodsupported) — Verifica si un método de cifrado es soportado por libzip
- [ZipArchive::locateName](#ziparchive.locatename) — Devuelve el índice de la entrada en el archivo
- [ZipArchive::open](#ziparchive.open) — Abrir un fichero de archivo en formato ZIP
- [ZipArchive::registerCancelCallback](#ziparchive.registercancelcallback) — Registrar una llamada para permitir la cancelación durante el cierre del archivo
- [ZipArchive::registerProgressCallback](#ziparchive.registerprogresscallback) — Registra una llamada para proporcionar actualizaciones durante el cierre del archivo
- [ZipArchive::renameIndex](#ziparchive.renameindex) — Renombra una entrada definida por su índice
- [ZipArchive::renameName](#ziparchive.renamename) — Renombra una entrada definida por su nombre
- [ZipArchive::replaceFile](#ziparchive.replacefile) — Reemplaza fichero en el archivo ZIP con una ruta determinada
- [ZipArchive::setArchiveComment](#ziparchive.setarchivecomment) — Establece el comentario de un archivo ZIP
- [ZipArchive::setArchiveFlag](#ziparchive.setarchiveflag) — Define una bandera global de un archivo ZIP
- [ZipArchive::setCommentIndex](#ziparchive.setcommentindex) — Establece el comentario de una entrada definido por su índice
- [ZipArchive::setCommentName](#ziparchive.setcommentname) — Establece el comentario de una entrada definido por su nombre
- [ZipArchive::setCompressionIndex](#ziparchive.setcompressionindex) — Establecer el método de compresión de una entrada definida por su índice
- [ZipArchive::setCompressionName](#ziparchive.setcompressionname) — Establecer el método de compresión de una entrada definida por su nombre
- [ZipArchive::setEncryptionIndex](#ziparchive.setencryptionindex) — Establece el método de cifrado de una entrada definida por su índice
- [ZipArchive::setEncryptionName](#ziparchive.setencryptionname) — Establece el método de cifrado de una entrada definida por su nombre
- [ZipArchive::setExternalAttributesIndex](#ziparchive.setexternalattributesindex) — Establece los atributos externos de una entrada definida por su índice
- [ZipArchive::setExternalAttributesName](#ziparchive.setexternalattributesname) — Establece los atributos externos de una entrada definida por su nombre
- [ZipArchive::setMtimeIndex](#ziparchive.setmtimeindex) — Establece el tiempo de modificación de una entrada definido por su índice
- [ZipArchive::setMtimeName](#ziparchive.setmtimename) — Establece la hora de modificación de una entrada definida por su nombre
- [ZipArchive::setPassword](#ziparchive.setpassword) — Establece la contraseña para el archivo activo
- [ZipArchive::statIndex](#ziparchive.statindex) — Obtiene los detalles de una entrada definida por su índice
- [ZipArchive::statName](#ziparchive.statname) — Obtener los detalles de una entrada definida por su nombre
- [ZipArchive::unchangeAll](#ziparchive.unchangeall) — Deshacer todos los cambios hechos en el archivo
- [ZipArchive::unchangeArchive](#ziparchive.unchangearchive) — Revertir todos los cambios globales hechos en el archivo
- [ZipArchive::unchangeIndex](#ziparchive.unchangeindex) — Revertir todos los cambios hechos a una entrada en el índice dado
- [ZipArchive::unchangeName](#ziparchive.unchangename) — Deshace todos los cambios realizados a una entrada con un nombre dado
  </li>- [Funciones Zip](#ref.zip)<li>[zip_close](#function.zip-close) — Cierra un archivo Zip
- [zip_entry_close](#function.zip-entry-close) — Cierra un directorio de archivo
- [zip_entry_compressedsize](#function.zip-entry-compressedsize) — Lee el tamaño comprimido de un directorio de archivo
- [zip_entry_compressionmethod](#function.zip-entry-compressionmethod) — Lee el método de compresión usado en un directorio de archivo
- [zip_entry_filesize](#function.zip-entry-filesize) — Lee el tamaño descomprimido de un directorio de archivo
- [zip_entry_name](#function.zip-entry-name) — Lee el nombre de un directorio de archivo
- [zip_entry_open](#function.zip-entry-open) — Abre un directorio de archivo para lectura
- [zip_entry_read](#function.zip-entry-read) — Lee el contenido de un archivo en un directorio
- [zip_open](#function.zip-open) — Abre un archivo ZIP
- [zip_read](#function.zip-read) — Lee la siguiente entrada en un archivo ZIP
  </li>
