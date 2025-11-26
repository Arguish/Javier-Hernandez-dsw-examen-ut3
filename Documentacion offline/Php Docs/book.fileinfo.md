# Información de un fichero

# Introducción

Las funciones en este módulo tratan de averiguar el tipo de
contenido y la codificación de un fichero buscando ciertas
secuencias de bytes _mágicas_ en una posición específica
del mismo. Aunque no es una estrategia "a prueba de balas",
la heurística empleada realiza un trabajo realmente bueno.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#fileinfo.installation)
- [Tipos de recursos](#fileinfo.resources)

## Instalación

Esta extensión está activada por omisión.

Los usuarios de Windows deben incluir la biblioteca DLL
proporcionada php_fileinfo.dll en su php.ini para activar
esta extensión.

La biblioteca libmagic se proporciona con PHP, pero incluye cambios específicos para PHP. Un parche de libmagic denominado libmagic.patch se mantiene y puede ser encontrado en el código fuente de la extensión fileinfo de PHP.

## Tipos de recursos

Antes de PHP 8.1.0, se utilizaba un recurso en la extensión Fileinfo: un descriptor
mágico de base de datos devuelto por [finfo_open()](#function.finfo-open).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[FILEINFO_NONE](#constant.fileinfo-none)**
    ([int](#language.types.integer))



     No se realiza ningún tratamiento especial.





    **[FILEINFO_SYMLINK](#constant.fileinfo-symlink)**
    ([int](#language.types.integer))



     Sigue los enlaces simbólicos.





    **[FILEINFO_MIME_TYPE](#constant.fileinfo-mime-type)**
    ([int](#language.types.integer))



     Devuelve el tipo MIME.





    **[FILEINFO_MIME_ENCODING](#constant.fileinfo-mime-encoding)**
    ([int](#language.types.integer))



     Devuelve la codificación MIME del fichero.





    **[FILEINFO_MIME](#constant.fileinfo-mime)**
    ([int](#language.types.integer))



     Devuelve el tipo MIME y la codificación MIME, tal como se describe en la RFC 2045.





    **[FILEINFO_COMPRESS](#constant.fileinfo-compress)**
    ([int](#language.types.integer))



     Descomprime los ficheros comprimidos.


     Desactivado debido a las consecuencias en la seguridad de los hilos.





    **[FILEINFO_DEVICES](#constant.fileinfo-devices)**
    ([int](#language.types.integer))



     Examina los contenidos de los bloques o dispositivos especiales de caracteres.





    **[FILEINFO_CONTINUE](#constant.fileinfo-continue)**
    ([int](#language.types.integer))



     Devuelve todos los datos encontrados, no solo el primero.





    **[FILEINFO_PRESERVE_ATIME](#constant.fileinfo-preserve-atime)**
    ([int](#language.types.integer))



     Si es posible, conserva el tiempo de acceso al fichero original.





    **[FILEINFO_RAW](#constant.fileinfo-raw)**
    ([int](#language.types.integer))



     No traduce los caracteres no imprimibles a representación octal
     \ooo.





    **[FILEINFO_EXTENSION](#constant.fileinfo-extension)**
    ([int](#language.types.integer))



     Devuelve la extensión de fichero apropiada para un tipo MIME detectado
     en el fichero.


     Para los tipos que generalmente tienen múltiples extensiones de fichero, tales
     como las imágenes JPEG, el valor devuelto es varias
     extensiones separadas por una barra oblicua, por ejemplo:
     "jpeg/jpg/jpe/jfif". Para los tipos desconocidos no
     disponibles en la base de datos magic.mime, el
     valor devuelto es "???".


     Disponible a partir de PHP 7.2.0.





    **[FILEINFO_APPLE](#constant.fileinfo-apple)**
    ([int](#language.types.integer))



     Devuelve el creador y tipo de Apple.

# Funciones de Fileinfo

# finfo_buffer

# finfo::buffer

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo_buffer -- finfo::buffer — Devuelve información acerca de un string de buffer

### Descripción

Estilo procedimental

**finfo_buffer**(
    [finfo](#class.finfo) $finfo,
    [string](#language.types.string) $string,
    [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

Estilo orientado a objetos

public [finfo::buffer](#finfo.buffer)([string](#language.types.string) $string, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función se utiliza para obtener información acerca de
datos binarios en un string.

### Parámetros

     finfo

      Una instancia [finfo](#class.finfo), retornada por [finfo_open()](#function.finfo-open).





     string


       Contenido de un fichero a ser verificado.






     flags


       Una o una unión de varias [constantes Fileinfo](#fileinfo.constants).






     context







### Valores devueltos

Devuelve una descripción textual del argumento
string o **[false](#constant.false)** si ha ocurrido un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro finfo ahora espera una instancia de
[finfo](#class.finfo) ; anteriormente, una [resource](#language.types.resource) era esperado.

      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con finfo_buffer()**

&lt;?php
$finfo = new finfo(FILEINFO_MIME);
echo $finfo-&gt;buffer($\_POST["script"]) . "\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

application/x-sh; charset=us-ascii

### Ver también

    - [finfo_file()](#function.finfo-file) - Devuelve información acerca de un fichero

# finfo_close

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo_close — Cierra una instancia finfo

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**finfo_close**([finfo](#class.finfo) $finfo): [bool](#language.types.boolean)

Esta función cierra la instancia abierta por [finfo_open()](#function.finfo-open).

### Parámetros

     finfo

      Una instancia [finfo](#class.finfo), retornada por [finfo_open()](#function.finfo-open).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro finfo ahora espera una instancia de
[finfo](#class.finfo) ; anteriormente, una [resource](#language.types.resource) era esperado.

# finfo_file

# finfo::file

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo_file -- finfo::file — Devuelve información acerca de un fichero

### Descripción

Estilo procedimental

**finfo_file**(
    [finfo](#class.finfo) $finfo,
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

Estilo orientado a objetos

public [finfo::file](#finfo.file)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función se utiliza para obtener información acerca de un
fichero.

### Parámetros

     finfo

      Una instancia [finfo](#class.finfo), retornada por [finfo_open()](#function.finfo-open).





     filename


       Nombre de un fichero a verificar.






     flags


       Una o una unión de varias [constantes Fileinfo](#fileinfo.constants).






     context


       Para una descripción de contexts, consúltese
       [Funciones de Flujos](#ref.stream).





### Valores devueltos

Devuelve una descripción textual del contenido del argumento
filename o **[false](#constant.false)** si ha ocurrido un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro finfo ahora espera una instancia de
[finfo](#class.finfo) ; anteriormente, una [resource](#language.types.resource) era esperado.

      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con finfo_file()**

&lt;?php
$finfo = finfo_open(FILEINFO_MIME_TYPE); // Devuelve el tipo mime también llamado extensión mimetype
foreach (glob("*") as $filename) {
    echo finfo_file($finfo, $filename) . "\n";
}
finfo_close($finfo);
?&gt;

    Resultado del ejemplo anterior es similar a:

text/html
image/gif
application/vnd.ms-excel

### Ver también

    - [finfo_buffer()](#function.finfo-buffer) - Devuelve información acerca de un string de buffer

# finfo_open

# finfo::\_\_construct

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo_open -- finfo::\_\_construct — Crea una nueva instancia finfo

### Descripción

Estilo procedimental

**finfo_open**([int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[string](#language.types.string) $magic_database = **[null](#constant.null)**): [finfo](#class.finfo)|[false](#language.types.singleton)

Estilo orientado a objetos (constructor):

public [finfo::\_\_construct](#finfo.construct)([int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[string](#language.types.string) $magic_database = **[null](#constant.null)**)

Esta función abre una base de datos mágica y devuelve su instancia.

### Parámetros

     flags


       Una o una unión de varias [constantes Fileinfo](#fileinfo.constants).






     magic_database


       Nombre de fichero de una base de datos mágica, normalmente algo
       como /path/to/magic.mime. Si no se especifica, se utiliza
       la variable de entorno MAGIC.
       Si la variable de entorno no está definida, se utilizará la base de datos mágica
       integrada en PHP.




       Pasar **[null](#constant.null)** o un [string](#language.types.string) vacío equivale a
       utilizar el valor por omisión.





### Valores devueltos

(Únicamente en modo procedimental)
Devuelve una instancia de [finfo](#class.finfo) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [finfo](#class.finfo) ;
       anteriormente, se esperaba una [resource](#language.types.resource).




      8.0.3

       magic_database ahora es nullable.



### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$finfo = new finfo(FILEINFO_MIME, "/usr/share/misc/magic"); // Devuelve el tipo mime

/_ Obtiene el mime-type de un fichero específico _/
$filename = "/usr/local/something.txt";
echo $finfo-&gt;file($filename);

?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$finfo = finfo_open(FILEINFO_MIME, "/usr/share/misc/magic"); // Devuelve el tipo mime

if (!$finfo) {
echo "Fallo al abrir la base de datos fileinfo";
exit();
}

/_ Obtiene el mime-type de un fichero específico _/
$filename = "/usr/local/something.txt";
echo finfo_file($finfo, $filename);

/_ Cierre de la conexión _/
finfo_close($finfo);
?&gt;

El ejemplo anterior mostrará:

text/plain; charset=us-ascii

### Notas

**Nota**:

    Generalmente, el uso de la base de datos mágica integrada (dejando
    las variables de entorno magic_database y MAGIC
    no definidas) es la mejor solución a menos que se necesite
    una base de datos mágica específica.

### Ver también

    - [finfo_close()](#function.finfo-close) - Cierra una instancia finfo

# finfo_set_flags

# finfo::set_flags

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo_set_flags -- finfo::set_flags — Establece opciones de configuración de libmagic

### Descripción

Estilo procedimental

**finfo_set_flags**([finfo](#class.finfo) $finfo, [int](#language.types.integer) $flags): [true](#language.types.singleton)

Estilo orientado a objetos

public [finfo::set_flags](#finfo.set-flags)([int](#language.types.integer) $flags): [true](#language.types.singleton)

Esta función establece diversas opciones de Fileinfo. Las opciones pueden ser
también establecidas directamente en [finfo_open()](#function.finfo-open) o por
otras funciones Fileinfo.

### Parámetros

     finfo

      Una instancia [finfo](#class.finfo), retornada por [finfo_open()](#function.finfo-open).





     flags


       Una o una unión de varias [constantes Fileinfo](#fileinfo.constants).





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro finfo ahora espera una instancia de
[finfo](#class.finfo) ; anteriormente, una [resource](#language.types.resource) era esperado.

# mime_content_type

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mime_content_type — Detecta el tipo de contenido de un fichero

### Descripción

**mime_content_type**([resource](#language.types.resource)|[string](#language.types.string) $filename): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el contenido MIME de un fichero utilizando las informaciones
desde el fichero magic.mime.

### Parámetros

     filename


       Ruta hacia el fichero a probar.





### Valores devueltos

Devuelve el tipo de contenido en formato MIME, como
text/plain o application/octet-stream,
o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con mime_content_type()**

&lt;?php
echo mime_content_type('php.gif') . "\n";
echo mime_content_type('test.php');
?&gt;

    El ejemplo anterior mostrará:

image/gif
text/plain

### Ver también

    - [finfo_file()](#function.finfo-file) - Devuelve información acerca de un fichero

    - [finfo_buffer()](#function.finfo-buffer) - Devuelve información acerca de un string de buffer

## Tabla de contenidos

- [finfo_buffer](#function.finfo-buffer) — Devuelve información acerca de un string de buffer
- [finfo_close](#function.finfo-close) — Cierra una instancia finfo
- [finfo_file](#function.finfo-file) — Devuelve información acerca de un fichero
- [finfo_open](#function.finfo-open) — Crea una nueva instancia finfo
- [finfo_set_flags](#function.finfo-set-flags) — Establece opciones de configuración de libmagic
- [mime_content_type](#function.mime-content-type) — Detecta el tipo de contenido de un fichero

# La clase finfo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

## Introducción

    Esta clase proporciona una interfaz orientada a objetos para las funciones fileinfo.

## Sinopsis de la Clase

     class **finfo**
     {

    /* Métodos */

public [\_\_construct](#finfo.construct)([int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[string](#language.types.string) $magic_database = **[null](#constant.null)**)

    public [buffer](#finfo.buffer)([string](#language.types.string) $string, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

public [file](#finfo.file)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [set_flags](#finfo.set-flags)([int](#language.types.integer) $flags): [true](#language.types.singleton)

}

# finfo::buffer

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo::buffer — Alias de [finfo_buffer()](#function.finfo-buffer)

### Descripción

public **finfo::buffer**([string](#language.types.string) $string, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función es un alias de: [finfo_buffer()](#function.finfo-buffer)

# finfo::\_\_construct

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo::\_\_construct — Alias de [finfo_open()](#function.finfo-open)

### Descripción

public **finfo::\_\_construct**([int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[string](#language.types.string) $magic_database = **[null](#constant.null)**)

Esta función es un alias de: [finfo_open()](#function.finfo-open)

### Historial de cambios

      Versión
      Descripción






      8.0.3

       magic_database es ahora nullable.



# finfo::file

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo::file — Alias de [finfo_file()](#function.finfo-file)

### Descripción

public **finfo::file**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = **[FILEINFO_NONE](#constant.fileinfo-none)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función es un alias de: [finfo_file()](#function.finfo-file)

# finfo::set_flags

(PHP &gt;= 5.3.0, PHP 7, PHP 8, PECL fileinfo &gt;= 0.1.0)

finfo::set_flags — Alias de [finfo_set_flags()](#function.finfo-set-flags)

### Descripción

public **finfo::set_flags**([int](#language.types.integer) $flags): [true](#language.types.singleton)

Esta función es un alias de: [finfo_set_flags()](#function.finfo-set-flags)

## Tabla de contenidos

- [finfo::buffer](#finfo.buffer) — Alias de finfo_buffer()
- [finfo::\_\_construct](#finfo.construct) — Alias de finfo_open
- [finfo::file](#finfo.file) — Alias de finfo_file()
- [finfo::set_flags](#finfo.set-flags) — Alias de finfo_set_flags()

- [Introducción](#intro.fileinfo)
- [Instalación/Configuración](#fileinfo.setup)<li>[Instalación](#fileinfo.installation)
- [Tipos de recursos](#fileinfo.resources)
  </li>- [Constantes predefinidas](#fileinfo.constants)
- [Funciones de Fileinfo](#ref.fileinfo)<li>[finfo_buffer](#function.finfo-buffer) — Devuelve información acerca de un string de buffer
- [finfo_close](#function.finfo-close) — Cierra una instancia finfo
- [finfo_file](#function.finfo-file) — Devuelve información acerca de un fichero
- [finfo_open](#function.finfo-open) — Crea una nueva instancia finfo
- [finfo_set_flags](#function.finfo-set-flags) — Establece opciones de configuración de libmagic
- [mime_content_type](#function.mime-content-type) — Detecta el tipo de contenido de un fichero
  </li>- [finfo](#class.finfo) — La clase finfo<li>[finfo::buffer](#finfo.buffer) — Alias de finfo_buffer()
- [finfo::\_\_construct](#finfo.construct) — Alias de finfo_open
- [finfo::file](#finfo.file) — Alias de finfo_file()
- [finfo::set_flags](#finfo.set-flags) — Alias de finfo_set_flags()
  </li>
