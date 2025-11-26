# Bzip2

# Introducción

Las funciones de bzip2 se utilizan para leer y escribir ficheros comprimidos
con bzip2 (.bz2) de forma transparente.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#bzip2.requirements)
- [Instalación](#bzip2.installation)
- [Tipos de recursos](#bzip2.resources)

    ## Requerimientos

    Este módulo usa las funciones de la librería [» bzip2
    ](https://www.sourceware.org/bzip2/) por Julian Seward. Este módulo requiere bzip2/libbzip2
    version &gt;= 1.0.x.

## Instalación

El soporte de Bzip2 en PHP no está activado por defecto. Se necesita
usar la opción de configuración **--with-bz2[=DIR]**
al compilar PHP para activar soporte de bzip2.

## Tipos de recursos

Esta extensión define un tipo de recurso: apunta a un archivo identificando
el fichero bz2 a trabajar.

# Ejemplos

Este ejemplo abre un fichero temporal y escribe una cadena de prueba
en el, muestra el contenido del fichero.

**Ejemplo #1 Pequeño ejemplo de bzip2**

&lt;?php

$filename = "/tmp/testfile.bz2";
$str = "Esto es una cadena de prueba.\n";

// Abriendo fichero para escribir
$bz = bzopen($filename, "w");

// escribe la cadena en el fichero
bzwrite($bz, $str);

// cierra el fichero
bzclose($bz);

// abre el fichero para escritura
$bz = bzopen($filename, "r");

// lee 10 caracteres
echo bzread($bz, 10);

// muestra salida hasta el final del fichero (o los siguientes 1024 caracteres) y lo cierra.
echo bzread($bz);

bzclose($bz);

?&gt;

# Funciones de Bzip2

# bzclose

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzclose — Cierra un fichero bzip2

### Descripción

**bzclose**([resource](#language.types.resource) $bz): [bool](#language.types.boolean)

Cierra el dado puntero del fichero bzip2.

### Parámetros

     bz


       El puntero del fichero. Debe ser un puntero válido a un fichero
       abierto con [bzopen()](#function.bzopen) satisfactoriamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [bzopen()](#function.bzopen) - Abre un archivo comprimido con bzip2

# bzcompress

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzcompress — Comprime una cadena con bzip2

### Descripción

**bzcompress**([string](#language.types.string) $data, [int](#language.types.integer) $block_size = 4, [int](#language.types.integer) $work_factor = 0): [string](#language.types.string)|[int](#language.types.integer)

**bzcompress()** comprime la cadena
source y devuelve los datos así codificados.

### Parámetros

     data


       La cadena a comprimir.






     block_size


       Especifica el tamaño de bloque utilizado durante la compresión y debe ser un
       número de 1 a 9, siendo 9 la mejor compresión,
       pero que utiliza más recursos para realizarse.






     work_factor


       Controla el comportamiento de la compresión en los peores casos de datos altamente repetitivos. Este valor puede ir de 0 a 250 (0
       es un valor especial).




       Fuera de work_factor, el resultado será el mismo.





### Valores devueltos

La cadena comprimida o un número de error si ocurre un error.

### Ejemplos

**Ejemplo #1 Compresión de datos**

&lt;?php
$str = "datos simples";
$bzstr = bzcompress($str, 9);
echo $bzstr;
?&gt;

### Ver también

    - [bzdecompress()](#function.bzdecompress) - Descomprime una cadena bzip2

# bzdecompress

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzdecompress — Descomprime una cadena bzip2

### Descripción

**bzdecompress**([string](#language.types.string) $data, [bool](#language.types.boolean) $use_less_memory = **[false](#constant.false)**): [string](#language.types.string)|[int](#language.types.integer)|[false](#language.types.singleton)

**bzdecompress()** descomprime la cadena
source, que contiene datos comprimidos bzip2.

### Parámetros

     data


       La cadena a descomprimir.






     use_less_memory


       Si este argumento es **[true](#constant.true)**, se utilizará otro algoritmo de descompresión:
       consume menos memoria (el máximo solicitado ronda los
       2300 ko), pero funciona globalmente a la mitad de
       la velocidad.




       Consulte la [» documentación bzip2](https://www.sourceware.org/bzip2/)
       para obtener más detalles sobre esta funcionalidad.





### Valores devueltos

La cadena descomprimida, o **[false](#constant.false)**, o un número de error si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El tipo de use_less_memory ha sido modificado de
       [int](#language.types.integer) a [bool](#language.types.boolean). Anteriormente, el valor por omisión era
       0.



### Ejemplos

    **Ejemplo #1 Descompresión de una cadena**

&lt;?php
$start_str = "frase a comprimir";
$bzstr = bzcompress($start_str);

echo "Cadena comprimida : ";
echo $bzstr;
echo "\n&lt;br /&gt;\n";

$str = bzdecompress($bzstr);
echo "Cadena descomprimida : ";
echo $str;
echo "\n&lt;br /&gt;\n";
?&gt;

### Ver también

    - [bzcompress()](#function.bzcompress) - Comprime una cadena con bzip2

# bzerrno

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzerrno — Devuelve el número de erro de bzip2

### Descripción

**bzerrno**([resource](#language.types.resource) $bz): [int](#language.types.integer)

Devuelve el número de error de cualquier error bzip2 devuelto por el
puntero del fichero dado.

### Parámetros

     bz


       El puntero del fichero. Debe ser un puntero a un fichero
       abierto con [bzopen()](#function.bzopen) satisfactoriamente.





### Valores devueltos

Devuelve el número de error como entero.

### Ver también

    - [bzerror()](#function.bzerror) - Devuelve el número de error y la cadena del error de bzip2 en un array

    - [bzerrstr()](#function.bzerrstr) - Devuelve una cadena de error de bzip2

# bzerror

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzerror —
Devuelve el número de error y la cadena del error de bzip2 en un array

### Descripción

**bzerror**([resource](#language.types.resource) $bz): [array](#language.types.array)

Devuelve el número de error y la cadena de error de cualquier error bzip2
devuelto por el puntero del fichero dado.

### Parámetros

     bz


       El puntero del fichero. Debe ser un puntero a un fichero
       abierto con [bzopen()](#function.bzopen) satisfactoriamente.





### Valores devueltos

Devuelve un array asociativo, con el código de error en la entrada
errno y el mensaje de error en la entrada
errstr.

### Ejemplos

    **Ejemplo #1 Ejemplo de bzerror()**

&lt;?php
$error = bzerror($bz);

echo $error["errno"];
echo $error["errstr"];
?&gt;

### Ver también

    - [bzerrno()](#function.bzerrno) - Devuelve el número de erro de bzip2

    - [bzerrstr()](#function.bzerrstr) - Devuelve una cadena de error de bzip2

# bzerrstr

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzerrstr — Devuelve una cadena de error de bzip2

### Descripción

**bzerrstr**([resource](#language.types.resource) $bz): [string](#language.types.string)

Obtiene la cadena de error de cualquier error bzip2 devuelto por el
puntero dado.

### Parámetros

     bz


       El puntero del fichero. Debe ser un puntero a un fichero
       abierto con [bzopen()](#function.bzopen) satisfactoriamente.





### Valores devueltos

Devuelve una cadena que contiene el mensaje de error.

### Ver también

    - [bzerrno()](#function.bzerrno) - Devuelve el número de erro de bzip2

    - [bzerror()](#function.bzerror) - Devuelve el número de error y la cadena del error de bzip2 en un array

# bzflush

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzflush — No realiza ninguna acción

### Descripción

**bzflush**([resource](#language.types.resource) $bz): [bool](#language.types.boolean)

Esta función está diseñada para forzar la escritura de todos los datos
bzip2 almacenados en el búfer para el puntero de archivo representado por
bz,
pero está implementada como una función nula en libbz2, por lo que no realiza ninguna acción.

### Parámetros

     bz


       El puntero de archivo. Debe ser válido y debe apuntar a un archivo
       abierto con éxito por la función [bzopen()](#function.bzopen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [bzread()](#function.bzread) - Lectura binaria de un archivo bzip2

    - [bzwrite()](#function.bzwrite) - Escritura binaria en un archivo bzip2

# bzopen

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzopen — Abre un archivo comprimido con bzip2

### Descripción

**bzopen**([string](#language.types.string)|[resource](#language.types.resource) $file, [string](#language.types.string) $mode): [resource](#language.types.resource)|[false](#language.types.singleton)

**bzopen()** abre un archivo bzip2 (.bz2)
en modo escritura o lectura.

### Parámetros

     file


       El nombre del fichero a abrir o un recurso de flujo existente.






     mode


       Los modos 'r' (para lectura), y 'w' (para escritura)
       son soportados. Cualquier otra opción hará que la función **bzopen()**
       retorne **[false](#constant.false)**.





### Valores devueltos

Si la apertura falla, **bzopen()** retorna **[false](#constant.false)**,
de lo contrario, retorna un puntero al fichero abierto.

### Ejemplos

    **Ejemplo #1 Ejemplo con bzopen()**

&lt;?php

$file = "/tmp/foo.bz2";
$bz = bzopen($file, "r") or die("Imposible abrir el fichero $file para lectura");

bzclose($bz);

?&gt;

### Ver también

    - [bzclose()](#function.bzclose) - Cierra un fichero bzip2

# bzread

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzread — Lectura binaria de un archivo bzip2

### Descripción

**bzread**([resource](#language.types.resource) $bz, [int](#language.types.integer) $length = 1024): [string](#language.types.string)|[false](#language.types.singleton)

**bzread()** lee desde el puntero de archivo bzip2 dado.

La lectura se detiene cuando length (no comprimido)
caracteres han sido leídos o si se alcanza el final del archivo, el primero de los dos que
ocurra.

### Parámetros

     bz


       El puntero de archivo. Debe ser válido y debe apuntar a un archivo abierto
       correctamente por la función [bzopen()](#function.bzopen).






     length


       Si no se especifica, **bzread()** leerá 1024
       (no comprimidos) caracteres a la vez. Un máximo de 8192 caracteres
       no comprimidos serán leídos a la vez.





### Valores devueltos

Devuelve los datos no comprimidos o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con bzread()**

&lt;?php

$file = "/tmp/foo.bz2";
$bz = bzopen($file, "r") or die("Imposible abrir el archivo $file");

$decompressed_file = '';
while (!feof($bz)) {
$decompressed_file .= bzread($bz, 4096);
}
bzclose($bz);

echo "El contenido del archivo $file es : &lt;br /&gt;\n";
echo $decompressed_file;

?&gt;

### Ver también

    - [bzwrite()](#function.bzwrite) - Escritura binaria en un archivo bzip2

    - [feof()](#function.feof) - Prueba el final del archivo

    - [bzopen()](#function.bzopen) - Abre un archivo comprimido con bzip2

# bzwrite

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

bzwrite — Escritura binaria en un archivo bzip2

### Descripción

**bzwrite**([resource](#language.types.resource) $bz, [string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**bzwrite()** escribe el contenido del string
data en el archivo bzip2 representado
por bz.

### Parámetros

     bz


       El puntero de archivo. Debe ser válido y debe apuntar a un archivo abierto
       correctamente por la función [bzopen()](#function.bzopen).






     data


       Los datos escritos.






     length


       Si se proporciona, la escritura se detendrá después de que length
       (no comprimidos) bytes hayan sido escritos o bien se alcance el final de
       data, el primero de los dos que ocurra.





### Valores devueltos

Devuelve el número de bytes escritos o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con bzwrite()**

&lt;?php
$str = "datos no comprimidos";
$bz = bzopen("/tmp/foo.bz2", "w");
bzwrite($bz, $str, strlen($str));
bzclose($bz);
?&gt;

### Ver también

    - [bzread()](#function.bzread) - Lectura binaria de un archivo bzip2

    - [bzopen()](#function.bzopen) - Abre un archivo comprimido con bzip2

## Tabla de contenidos

- [bzclose](#function.bzclose) — Cierra un fichero bzip2
- [bzcompress](#function.bzcompress) — Comprime una cadena con bzip2
- [bzdecompress](#function.bzdecompress) — Descomprime una cadena bzip2
- [bzerrno](#function.bzerrno) — Devuelve el número de erro de bzip2
- [bzerror](#function.bzerror) — Devuelve el número de error y la cadena del error de bzip2 en un array
- [bzerrstr](#function.bzerrstr) — Devuelve una cadena de error de bzip2
- [bzflush](#function.bzflush) — No realiza ninguna acción
- [bzopen](#function.bzopen) — Abre un archivo comprimido con bzip2
- [bzread](#function.bzread) — Lectura binaria de un archivo bzip2
- [bzwrite](#function.bzwrite) — Escritura binaria en un archivo bzip2

- [Introducción](#intro.bzip2)
- [Instalación/Configuración](#bzip2.setup)<li>[Requerimientos](#bzip2.requirements)
- [Instalación](#bzip2.installation)
- [Tipos de recursos](#bzip2.resources)
  </li>- [Ejemplos](#bzip2.examples)
- [Funciones de Bzip2](#ref.bzip2)<li>[bzclose](#function.bzclose) — Cierra un fichero bzip2
- [bzcompress](#function.bzcompress) — Comprime una cadena con bzip2
- [bzdecompress](#function.bzdecompress) — Descomprime una cadena bzip2
- [bzerrno](#function.bzerrno) — Devuelve el número de erro de bzip2
- [bzerror](#function.bzerror) — Devuelve el número de error y la cadena del error de bzip2 en un array
- [bzerrstr](#function.bzerrstr) — Devuelve una cadena de error de bzip2
- [bzflush](#function.bzflush) — No realiza ninguna acción
- [bzopen](#function.bzopen) — Abre un archivo comprimido con bzip2
- [bzread](#function.bzread) — Lectura binaria de un archivo bzip2
- [bzwrite](#function.bzwrite) — Escritura binaria en un archivo bzip2
  </li>
