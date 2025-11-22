# WDDX

# Introducción

**Advertencia**

    Esta extensión está *OBSOLETA* y *DESGRUPADA*
    a partir de PHP 7.4.0.

Estas funciones están previstas para funcionar con
[» WDDX](http://www.openwddx.org/).

**Advertencia**

    No se deben pasar datos de usuario no confiables a la función
    [wddx_deserialize()](#function.wddx-deserialize). La deserialización puede llevar al cargado
    y ejecución de datos durante la instancia y el autocargado del objeto, y un usuario
    malintencionado puede ser capaz de explotar este comportamiento.
    Utilice un formato seguro de intercambio de datos como JSON
    (usando las funciones [json_decode()](#function.json-decode) y [json_encode()](#function.json-encode))
    si se deben pasar datos serializados al usuario.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#wddx.requirements)
- [Instalación](#wddx.installation)
- [Tipos de recursos](#wddx.resources)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

Para utilizar WDDX, es necesario instalar la biblioteca expat
(que se proporciona con Apache 1.3.7 o superior).

## Instalación

## PHP 7.4

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/wddx](https://pecl.php.net/package/wddx).

## PHP &lt; 7.4

Después de instalar la librería requerida Expat, compile PHP con
**--enable-wddx** y utilice
**--with-libexpat-dir** para Expat.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

## Tipos de recursos

Esta extensión define un identificador de paquete WDDX,
devuelto por la función [wddx_packet_start()](#function.wddx-packet-start).

# Ejemplos

## Tabla de contenidos

- [Ejemplos WDDX](#wddx.examples-serialize)

    ## Ejemplos WDDX

    Todas las funciones que serializan variables utilizan
    el primer elemento de un array para determinar si el array
    debe ser serializado en un array o en una estructura.
    Si el primer elemento tiene una cadena de caracteres como clave,
    entonces será serializado en una estructura, de lo contrario, en un array.

    **Ejemplo #1 Serialización de un valor simple con WDDX**

&lt;?php
echo wddx_serialize_value("PHP to WDDX packet example", "PHP packet");
?&gt;

    Este ejemplo mostrará:

&lt;wddxPacket version='1.0'&gt;&lt;header comment='PHP packet'/&gt;&lt;data&gt;
&lt;string&gt;PHP to WDDX packet example&lt;/string&gt;&lt;/data&gt;&lt;/wddxPacket&gt;

**Ejemplo #2 Uso de paquetes incrementales con WDDX**

&lt;?php
$pi = 3.1415926;
$packet_id = wddx_packet_start("PHP");
wddx_add_vars($packet_id, "pi");

/_ Supongamos que $cities proviene de una base de datos _/
$cities = array("Austin", "Novato", "Seattle");
wddx_add_vars($packet_id, "cities");

$packet = wddx_packet_end($packet_id);
echo $packet;
?&gt;

    Este ejemplo mostrará:

&lt;wddxPacket version='1.0'&gt;&lt;header comment='PHP'/&gt;&lt;data&gt;&lt;struct&gt;
&lt;var name='pi'&gt;&lt;number&gt;3.1415926&lt;/number&gt;&lt;/var&gt;&lt;var name='cities'&gt;
&lt;array length='3'&gt;&lt;string&gt;Austin&lt;/string&gt;&lt;string&gt;Novato&lt;/string&gt;
&lt;string&gt;Seattle&lt;/string&gt;&lt;/array&gt;&lt;/var&gt;&lt;/struct&gt;&lt;/data&gt;&lt;/wddxPacket&gt;

**Nota**:

    Los strings deben estar codificados en UTF-8; para manejar otros juegos de caracteres,
    convierta primero el string utilizando [mb_convert_encoding()](#function.mb-convert-encoding),
    [UConverter::transcode()](#uconverter.transcode), o [iconv()](#function.iconv).

# WDDX Funciones

# wddx_add_vars

(PHP 4, PHP 5, PHP 7)

wddx_add_vars — Se utiliza para añadir variables a un paquete WDDX con el ID especificado

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_add_vars**([resource](#language.types.resource) $packet_id, [mixed](#language.types.mixed) $var_name, [mixed](#language.types.mixed) ...$var_names): [bool](#language.types.boolean)

Serializa las variables pasadas y añade el resultado al paquete dado.

### Parámetros

Esta función acepta un número variable de argumentos.

     packet_id


       Un paquete WDDX, devuelto por la función
       [wddx_packet_start()](#function.wddx-packet-start).






     var_name


       Puede ser una [string](#language.types.string) que nombre una variable o un array
       que contenga nombres de variables o de otros arrays, etc..






     var_names







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# wddx_deserialize

(PHP 4, PHP 5, PHP 7)

wddx_deserialize — Deserializa un paquete WDDX

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_deserialize**([string](#language.types.string) $packet): [mixed](#language.types.mixed)

Deserializa un paquete packet WDDX.

**Advertencia**

    No se debe pasar entrada de usuario no verificada a **wddx_deserialize()**.
    La deserialización puede hacer que el código sea cargado y ejecutado durante
    la instancia y el autocargado del objeto, y un usuario malintencionado puede ser
    capaz de alojar un exploit. Utilice un formato seguro, estándar de intercambio de datos
    como JSON (usando [json_decode()](#function.json-decode) y [json_encode()](#function.json-encode))
    si se deben pasar datos serializados al usuario.

### Parámetros

     packet


       Un paquete WDDX, en forma de [string](#language.types.string) o de flujo.





### Valores devueltos

Devuelve el valor deserializado, que puede ser un [string](#language.types.string), un número
o un array. Observe que las estructuras son deserializadas en arrays asociativos.

# wddx_packet_end

(PHP 4, PHP 5, PHP 7)

wddx_packet_end — Cierra un paquete WDDX con el ID especificado

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_packet_end**([resource](#language.types.resource) $packet_id): [string](#language.types.string)

Cierra y devuelve un paquete WDDX dado.

### Parámetros

     packet_id


       Un paquete WDDX, devuelto por la función
       [wddx_packet_start()](#function.wddx-packet-start).





### Valores devueltos

Devuelve un [string](#language.types.string) que contiene el paquete WDDX.

# wddx_packet_start

(PHP 4, PHP 5, PHP 7)

wddx_packet_start — Inicia un nuevo paquete WDDX con una estructura dentro de él

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_packet_start**([string](#language.types.string) $comment = ?): [resource](#language.types.resource)

Inicia un nuevo paquete WDDX para la adición incremental de variables.
Automáticamente crea una definición de estructura
en el paquete, para alojar variables.

### Parámetros

     comment


       Un [string](#language.types.string) opcional que contiene el comentario.





### Valores devueltos

Devuelve un identificador de paquete para su uso posterior con las funciones
WDDX, o **[false](#constant.false)** si ocurre un error.

# wddx_serialize_value

(PHP 4, PHP 5, PHP 7)

wddx_serialize_value — Serializa un solo valor en un paquete WDDX

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_serialize_value**([mixed](#language.types.mixed) $var, [string](#language.types.string) $comment = ?): [string](#language.types.string)

Crea un paquete WDDX a partir de un solo valor dado.

### Parámetros

     var


       El valor a serializar.






     comment


       Una [string](#language.types.string) opcional que contiene un comentario que aparece en
       el encabezado del paquete.





### Valores devueltos

Devuelve el paquete WDDX, o **[false](#constant.false)** si ocurre un error.

# wddx_serialize_vars

(PHP 4, PHP 5, PHP 7)

wddx_serialize_vars — Registra múltiples valores en un paquete WDDX

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

**wddx_serialize_vars**([mixed](#language.types.mixed) $var_name, [mixed](#language.types.mixed) ...$var_names): [string](#language.types.string)

Crea un paquete WDDX con una estructura que contiene la representación
serializada de las variables pasadas.

### Parámetros

Esta función acepta un número variable de argumentos.

     var_name


       Puede ser una [string](#language.types.string) que nombre una variable o un array
       que contenga nombres de variables o de otros arrays, etc..






     var_names







### Valores devueltos

Devuelve el paquete WDDX, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con wddx_serialize_vars()**

&lt;?php
$a = 1;
$b = 5.5;
$c = array("blue", "orange", "violet");
$d = "colors";

$clvars = array("c", "d");
echo wddx_serialize_vars("a", "b", $clvars);
?&gt;

    El ejemplo anterior mostrará:

&lt;wddxPacket version='1.0'&gt;&lt;header/&gt;&lt;data&gt;&lt;struct&gt;&lt;var name='a'&gt;&lt;number&gt;1&lt;/number&gt;&lt;/var&gt;
&lt;var name='b'&gt;&lt;number&gt;5.5&lt;/number&gt;&lt;/var&gt;&lt;var name='c'&gt;&lt;array length='3'&gt;
&lt;string&gt;blue&lt;/string&gt;&lt;string&gt;orange&lt;/string&gt;&lt;string&gt;violet&lt;/string&gt;&lt;/array&gt;&lt;/var&gt;
&lt;var name='d'&gt;&lt;string&gt;colors&lt;/string&gt;&lt;/var&gt;&lt;/struct&gt;&lt;/data&gt;&lt;/wddxPacket&gt;

## Tabla de contenidos

- [wddx_add_vars](#function.wddx-add-vars) — Se utiliza para añadir variables a un paquete WDDX con el ID especificado
- [wddx_deserialize](#function.wddx-deserialize) — Deserializa un paquete WDDX
- [wddx_packet_end](#function.wddx-packet-end) — Cierra un paquete WDDX con el ID especificado
- [wddx_packet_start](#function.wddx-packet-start) — Inicia un nuevo paquete WDDX con una estructura dentro de él
- [wddx_serialize_value](#function.wddx-serialize-value) — Serializa un solo valor en un paquete WDDX
- [wddx_serialize_vars](#function.wddx-serialize-vars) — Registra múltiples valores en un paquete WDDX

- [Introducción](#intro.wddx)
- [Instalación/Configuración](#wddx.setup)<li>[Requerimientos](#wddx.requirements)
- [Instalación](#wddx.installation)
- [Tipos de recursos](#wddx.resources)
  </li>- [Ejemplos](#wddx.examples)<li>[Ejemplos WDDX](#wddx.examples-serialize)
  </li>- [WDDX Funciones](#ref.wddx)<li>[wddx_add_vars](#function.wddx-add-vars) — Se utiliza para añadir variables a un paquete WDDX con el ID especificado
- [wddx_deserialize](#function.wddx-deserialize) — Deserializa un paquete WDDX
- [wddx_packet_end](#function.wddx-packet-end) — Cierra un paquete WDDX con el ID especificado
- [wddx_packet_start](#function.wddx-packet-start) — Inicia un nuevo paquete WDDX con una estructura dentro de él
- [wddx_serialize_value](#function.wddx-serialize-value) — Serializa un solo valor en un paquete WDDX
- [wddx_serialize_vars](#function.wddx-serialize-vars) — Registra múltiples valores en un paquete WDDX
  </li>
