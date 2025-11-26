# GNU Recode

# Introducción

**Advertencia**
Esta extensión es _no mantenida_.

Este módulo contiene una interfaz a la biblioteca GNU Recode. La
biblioteca GNU Recode convierte los ficheros entre diversas codificaciones.
Cuando esta conversión no ha podido ser efectuada de manera precisa,
se realizan aproximaciones. La biblioteca reconoce alrededor de
150 juegos de caracteres diferentes y es capaz de convertir ficheros utilizándolos. La mayoría de los juegos de caracteres
[» RFC 1345](https://datatracker.ietf.org/doc/html/rfc1345) son soportados.

**Nota**:

    Esta extensión ha sido desligada y movida a
    [» PECL](https://pecl.php.net/package/recode) a partir de PHP 7.4.0.
    Considere el uso de las extensiones
    [Cadenas Multioctetos](#book.mbstring) o
    [iconv](#book.iconv) en su lugar.

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#recode.requirements)
- [Instalación](#recode.installation)

    ## Requerimientos

    Se debe tener GNU Recode 3.5 o superior instalado en el sistema.
    El paquete puede ser descargado desde
    [» http://directory.fsf.org/All_GNU_Packages/recode.html](http://directory.fsf.org/All_GNU_Packages/recode.html).

    **Advertencia**

    La versión 3.6 de la biblioteca Recode añade caracteres extraños
    al final de las strings convertidas en ciertas circunstancias. Por lo tanto,
    es preferible utilizar Recode v3.5 o una biblioteca alternativa disponible,
    como la extensión
    [iconv](#ref.iconv) o la extensión
    [mbstring](#ref.mbstring).

## Instalación

## PHP 7.4

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/recode](https://pecl.php.net/package/recode).

## PHP &lt; 7.4

Para utilizar las funciones definidas en este módulo, PHP debe ser compilado
con la opción**--with-recode[=DIR]**.

**Advertencia**

    Pueden encontrarse fallos y problemas de inicio de PHP
    cuando la extensión recode es cargada
    **después** de las extensiones
    [MySQL](#ref.mysql) o
    [imap](#ref.imap).
    Cargar la extensión recode antes de estas dos extensiones corrige
    el problema. Esto se debe a un problema técnico ya que la biblioteca
    c-client de IMAP y recode tienen ambas su propia función
    hash_lookup() y las extensiones mysql y recode
    tienen ambas su función hash_insert.

**Advertencia**
Las extensiones [IMAP](#book.imap), [recode](#book.recode) y
[YAZ](#book.yaz)
no pueden ser utilizadas simultáneamente ya que utilizan un símbolo interno común.
Nota: Yaz 2.0 y superior ya no sufre de este problema.

# Recode Funciones

# recode

(PHP 4, PHP 5, PHP 7 &lt; 7.4.0)

recode — Alias de [recode_string()](#function.recode-string)

### Descripción

Esta función es un alias de:
[recode_string()](#function.recode-string).

# recode_file

(PHP 4, PHP 5, PHP 7 &lt; 7.4.0)

recode_file — Recodificación de fichero a fichero, según la solicitud

### Descripción

**recode_file**([string](#language.types.string) $request, [resource](#language.types.resource) $input, [resource](#language.types.resource) $output): [bool](#language.types.boolean)

Recodifica el fichero identificado por input
en el fichero identificado por output
según la solicitud de recodificación request.

### Parámetros

     request


       El tipo de solicitud de recodificación deseada






     input


       Un gestor de fichero local para el argumento
       input






     output


       Un gestor de fichero local para el argumento
       output





### Valores devueltos

Retorna **[false](#constant.false)** en caso de fallo, y **[true](#constant.true)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo con recode_file()**

&lt;?php
$input = fopen('input.txt', 'r');
$output = fopen('output.txt', 'w');
recode_file("us..flat", $input, $output);
?&gt;

### Notas

Esta función aún no maneja ficheros remotos (URL). Ambos ficheros deben hacer referencia a ficheros locales.

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

# recode_string

(PHP 4, PHP 5, PHP 7 &lt; 7.4.0)

recode_string — Recodifica una string según la petición

### Descripción

**recode_string**([string](#language.types.string) $request, [string](#language.types.string) $string): [string](#language.types.string)

Recodifica la string string según
la petición request.

### Parámetros

     request


       El tipo de petición de recodificación deseado






     string


       La string a recodificar





### Valores devueltos

Devuelve la string recodificada en caso de éxito y false en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con recode_string()**

&lt;?php
echo recode_string("us..flat", "El carácter siguiente es diacrítico: á");
?&gt;

### Notas

    Una petición simple de recodificación puede ser "lat1..iso646-de".

### Ver también

    -
     Consulte la documentación GNU Recode de su instalación
     para más detalles sobre las peticiones.


    - [mb_convert_encoding()](#function.mb-convert-encoding) - Convertir una cadena de un codificación de caracteres a otra

    - [UConverter::transcode()](#uconverter.transcode) - Convierte una cadena de un juego de caracteres a otro

    - [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

## Tabla de contenidos

- [recode](#function.recode) — Alias de recode_string
- [recode_file](#function.recode-file) — Recodificación de fichero a fichero, según la solicitud
- [recode_string](#function.recode-string) — Recodifica una string según la petición

- [Introducción](#intro.recode)
- [Instalación/Configuración](#recode.setup)<li>[Requerimientos](#recode.requirements)
- [Instalación](#recode.installation)
  </li>- [Recode Funciones](#ref.recode)<li>[recode](#function.recode) — Alias de recode_string
- [recode_file](#function.recode-file) — Recodificación de fichero a fichero, según la solicitud
- [recode_string](#function.recode-string) — Recodifica una string según la petición
  </li>
