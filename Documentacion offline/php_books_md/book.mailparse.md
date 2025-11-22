# Mailparse

# Introducción

Mailparse es una extensión para analizar y trabajar con los mensajes de correo electrónico.
Esto puede tratarse con los mensajes compatibles [» RFC 822](https://datatracker.ietf.org/doc/html/rfc822) y
[» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045) (MIME).

Mailparse está basado en flujo, lo que significa que no guarda en memoria las
copias de los archivos que procesa - lo que es muy eficiente para recursos cuando
se trata de mensajes de gran tamaño.

**Nota**:

    Mailparse requiere la extensión [mbstring](#book.mbstring),
    y mbstring debe cargarse antes de mailparse.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#mailparse.installation)
- [Configuración en tiempo de ejecución](#mailparse.configuration)
- [Tipos de recursos](#mailparse.resources)

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.
Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/mailparse](https://pecl.php.net/package/mailparse).

Para poder utilizar estas funciones se debe compilar PHP con soporte para mailparse
mediante la opción de configuración
**--enable-mailparse**.

Los usuarios de windows deben habilitar php_mailparse.dll en el
fichero php.ini con el fin de usar estas funciones.
Los binarios Windows
(los archivos DLL)
para esta extensión PECL están disponibles en el sitio web PECL.

Es necesario que la extensión [mbstring](#ref.mbstring)
esté cargada antes que mailparse.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

    <caption>**Mailparse Opciones de configuración**</caption>



       Nombre
       Por defecto
       Cambiable
       Historial de cambios






       [mailparse.def_charset](#ini.mailparse.def_charset)
       "us-ascii"
       **[INI_SYSTEM](#constant.ini-system)**
        




Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      mailparse.def_charset
      [string](#language.types.string)



       El juego de caracteres por omisión.





## Tipos de recursos

Mailparse define el tipo de recurso mailparse_mail_structure,
que es devuelto por [mailparse_msg_create()](#function.mailparse-msg-create) y
[mailparse_msg_parse_file()](#function.mailparse-msg-parse-file).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[MAILPARSE_EXTRACT_OUTPUT](#constant.mailparse-extract-output)**
     ([int](#language.types.integer))








    **[MAILPARSE_EXTRACT_STREAM](#constant.mailparse-extract-stream)**
     ([int](#language.types.integer))








    **[MAILPARSE_EXTRACT_RETURN](#constant.mailparse-extract-return)**
     ([int](#language.types.integer))

# Funciones Mailparse

# mailparse_determine_best_xfer_encoding

(PECL mailparse &gt;= 0.9.0)

mailparse_determine_best_xfer_encoding — Obtiene la mejor forma de codificar

### Descripción

**mailparse_determine_best_xfer_encoding**([resource](#language.types.resource) $fp): [string](#language.types.string)

Encuentra la mejor forma de codificar el contenido leído del apuntador de
archivo dado.

### Parámetros

     fp


       Un apuntador de archivo válido, que reciba operaciones de búsqueda.





### Valores devueltos

Devuelve una de las codificaciones de caracteres soportadas por el módulo
[mbstring](#ref.mbstring).

### Ejemplos

    **Ejemplo #1 Ejemplo de
    mailparse_determine_best_xfer_encoding()**

&lt;?php

$aa = fopen('alguncorreo.eml', 'r');
echo 'Mejor codificación: ' . mailparse_determine_best_xfer_encoding($aa);

?&gt;

    Resultado del ejemplo anterior es similar a:

Mejor codificación: 7bit

# mailparse_msg_create

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_create — Crea un recurso de correo mime

### Descripción

**mailparse_msg_create**(): [resource](#language.types.resource)

Crea un recurso tipo correo MIME.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un recurso que puede ser usado para interpretar un mensaje.

### Notas

**Nota**:

    Se recomienda llamar a [mailparse_msg_free()](#function.mailparse-msg-free) en el resultado
    de esta función, cuando ya no sea necesaria, para evitar fugas de memoria

### Ver también

    - [mailparse_msg_free()](#function.mailparse-msg-free) - Libera un recurso MIME

    - [mailparse_msg_parse_file()](#function.mailparse-msg-parse-file) - Procesa un archivo

# mailparse_msg_extract_part

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_extract_part —
Extrae/decodifica una sección de mensaje

### Descripción

**mailparse_msg_extract_part**([resource](#language.types.resource) $mimemail, [string](#language.types.string) $msgbody, [callable](#language.types.callable) $callbackfunc = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     mimemail


       Un recurso MIME válido.






      msgbody








     callbackfunc







### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [mailparse_msg_extract_part_file()](#function.mailparse-msg-extract-part-file) - Extrae/decodifica una sección de mensaje

    - [mailparse_msg_extract_whole_part_file()](#function.mailparse-msg-extract-whole-part-file) - Extrae una sección del mensaje incluyendo cabeceras sin descodificar la transferencia codificada

# mailparse_msg_extract_part_file

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_extract_part_file — Extrae/decodifica una sección de mensaje

### Descripción

**mailparse_msg_extract_part_file**([resource](#language.types.resource) $mimemail, [mixed](#language.types.mixed) $filename, [callable](#language.types.callable) $callbackfunc = ?): [string](#language.types.string)

Extrae/decodifica una sección de mensaje del archivo indicado.

Los contenidos de la sección serán decodificados de acuerdo a su
codificación de transferencia - se soportan base64,
imprimible-con-comillas y texto uuencode.

### Parámetros

     mimemail


       Un recurso MIME válido, creado con
       [mailparse_msg_create()](#function.mailparse-msg-create).






     filename


       Puede ser un nombre de archivo o un recurso de secuencia válido.






     callbackfunc


       Si se define, este parámetro debe ser una llamada de retorno válida,
       a la cual le será pasada la sección extraída, o **[null](#constant.null)** para
       asegurarse de que esta función devuelva la sección extraída.




       Si no se especifica, los contenidos serán enviados a "stdout".





### Valores devueltos

Si callbackfunc es diferente de **[null](#constant.null)** devuelve
**[true](#constant.true)** en caso de éxito.

Si callbackfunc es **[null](#constant.null)**, devuelve la sección
extraída como una cadena.

Devuelve **[false](#constant.false)** en caso de fallo.

### Ver también

    - [mailparse_msg_extract_part()](#function.mailparse-msg-extract-part) - Extrae/decodifica una sección de mensaje

    - [mailparse_msg_extract_whole_part_file()](#function.mailparse-msg-extract-whole-part-file) - Extrae una sección del mensaje incluyendo cabeceras sin descodificar la transferencia codificada

# mailparse_msg_extract_whole_part_file

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_extract_whole_part_file — Extrae una sección del mensaje incluyendo cabeceras sin descodificar la transferencia codificada

### Descripción

**mailparse_msg_extract_whole_part_file**([resource](#language.types.resource) $mimemail, [string](#language.types.string) $filename, [callable](#language.types.callable) $callbackfunc = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     mimemail


       Un recurso MIME válido.






     filename








     callbackfunc







### Valores devueltos

### Ver también

    - [mailparse_msg_extract_part()](#function.mailparse-msg-extract-part) - Extrae/decodifica una sección de mensaje

    - [mailparse_msg_extract_part_file()](#function.mailparse-msg-extract-part-file) - Extrae/decodifica una sección de mensaje

# mailparse_msg_free

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_free — Libera un recurso MIME

### Descripción

**mailparse_msg_free**([resource](#language.types.resource) $mimemail): [bool](#language.types.boolean)

Libera un recurso MIME.

### Parámetros

     mimemail


       Un recurso MIME válido reservado por
       [mailparse_msg_create()](#function.mailparse-msg-create) o
       [mailparse_msg_parse_file()](#function.mailparse-msg-parse-file).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mailparse_msg_create()](#function.mailparse-msg-create) - Crea un recurso de correo mime

    - [mailparse_msg_parse_file()](#function.mailparse-msg-parse-file) - Procesa un archivo

# mailparse_msg_get_part

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_get_part — Devuelve un gestor sobre una sección dada en un mensaje
mime

### Descripción

**mailparse_msg_get_part**([resource](#language.types.resource) $mimemail, [string](#language.types.string) $mimesection): [resource](#language.types.resource)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     mimemail


       Un recurso MIME válido.






     mimesection







# mailparse_msg_get_part_data

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_get_part_data — Devuelve una matriz asociativa de información sobre el
mensaje

### Descripción

**mailparse_msg_get_part_data**([resource](#language.types.resource) $mimemail): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     mimemail


       Un recurso MIME válido.





# mailparse_msg_get_structure

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_get_structure — Devuelve una matriz de nombres de sección mime en el mensaje
dado

### Descripción

**mailparse_msg_get_structure**([resource](#language.types.resource) $mimemail): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     mimemail


       Un recurso MIME válido.





# mailparse_msg_parse

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_parse — Procesar datos incrementalmente sobre un búfer

### Descripción

**mailparse_msg_parse**([resource](#language.types.resource) $mimemail, [string](#language.types.string) $data): [bool](#language.types.boolean)

Procesa datos incrementalmente al interior del recurso de correo mime
entregado.

Esta función le permite secuenciar porciones de un archivo en pedazos, en
lugar de leer y procesarlo en su totalidad.

### Parámetros

     mimemail


       Un recurso MIME válido.






      data

      **Nota**:



        El último trozo de data debe terminar con una
        nueva línea (CRLF); de lo contrario,
        no se analizará la última línea del mensaje.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# mailparse_msg_parse_file

(PECL mailparse &gt;= 0.9.0)

mailparse_msg_parse_file — Procesa un archivo

### Descripción

**mailparse_msg_parse_file**([string](#language.types.string) $filename): [resource](#language.types.resource)

Procesa un archivo. Este es el modo óptimo de interpretar un archivo que
tenga en disco.

### Parámetros

     filename


       Ruta al archivo que contiene el mensaje. El archivo es abierto y
       secuenciado a través del analizador sintáctico.



      **Nota**:



        El mensaje contenido en filename debe terminar con una
        nueva línea (CRLF); de lo contrario, no se analizará la última línea del mensaje.






### Valores devueltos

Devuelve un recurso MIME que representa la estructura,
o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

    Se recomienda llamar a [mailparse_msg_free()](#function.mailparse-msg-free) en el resultado
    de esta función, cuando ya no sea necesaria, para evitar fugas de memoria

### Ver también

    - [mailparse_msg_free()](#function.mailparse-msg-free) - Libera un recurso MIME

    - [mailparse_msg_create()](#function.mailparse-msg-create) - Crea un recurso de correo mime

# mailparse_rfc822_parse_addresses

(PECL mailparse &gt;= 0.9.0)

mailparse_rfc822_parse_addresses — Procesa direcciones compatibles con RFC 822

### Descripción

**mailparse_rfc822_parse_addresses**([string](#language.types.string) $addresses): [array](#language.types.array)

Procesa una lista de recipientes compatible con [» RFC 822](https://datatracker.ietf.org/doc/html/rfc822), tal como la que es encontrada en una
cabecera To:.

### Parámetros

     addresses


       Una cadena que contiene direcciones, como:
       Wez Furlong &lt;wez@example.com&gt;, pepe@example.com



      **Nota**:



        Esta cadena no debe contener el nombre de la cabecera.






### Valores devueltos

Devuelve una matriz de matrices asociativas con las siguientes claves
para cada recipiente:

       display

        El nombre del recipiente, para propósitos de muestra. Si esta parte
        no es definida para un recipiente, esta clave contendrá el mismo
        valor que address.




       address
       La dirección de correo electrónico



       is_group
       **[true](#constant.true)** si el recipiente es un grupo de noticias, **[false](#constant.false)** de lo
       contrario.




### Ejemplos

    **Ejemplo #1 Ejemplo de
    mailparse_rfc822_parse_addresses()**

&lt;?php

$to = 'Wez Furlong &lt;wez@example.com&gt;, pepe@example.com';
var_dump(mailparse_rfc822_parse_addresses($to));

?&gt;

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
array(3) {
["display"]=&gt;
string(11) "Wez Furlong"
["address"]=&gt;
string(15) "wez@example.com"
["is_group"]=&gt;
bool(false)
}
[1]=&gt;
array(3) {
["display"]=&gt;
string(16) "pepe@example.com"
["address"]=&gt;
string(16) "pepe@example.com"
["is_group"]=&gt;
bool(false)
}
}

# mailparse_stream_encode

(PECL mailparse &gt;= 0.9.0)

mailparse_stream_encode —
Secuencia datos desde un apuntador de archivo, codifica y escribe a
fp_destino

### Descripción

**mailparse_stream_encode**([resource](#language.types.resource) $sourcefp, [resource](#language.types.resource) $destfp, [string](#language.types.string) $encoding): [bool](#language.types.boolean)

Secuencia datos del apuntador de archivo fuente, aplica la
codificacion y escribe al apuntador de archivo de
destino.

### Parámetros

     sourcefp


       Un gestor de archivo válido. El archivo es secuenciado a través del
       procesador.






     destfp


       El gestor de archivo de destino, en el cual los datos codificados
       serán escritos.






     encoding


       Una de las codificaciones de caracteres soportadas por el módulo
       [mbstring](#ref.mbstring).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mailparse_stream_encode()**

&lt;?php

// Contenido de email.eml: hola, este es un trozo de texto=hola.
$aa = fopen('email.eml', 'r');

$dest = tmpfile();

mailparse_stream_encode($aa, $dest, "quoted-printable");

rewind($dest);

// Mostrar el contenido del nuevo archivo
fpassthru($dest);

?&gt;

    El ejemplo anterior mostrará:

hola, este es un trozo de texto=3Dhola.

# mailparse_uudecode_all

(PECL mailparse &gt;= 0.9.0)

mailparse_uudecode_all —
Procesa los datos desde un apuntador a archivo y extrae cada archivo
embebido con codificación uu

### Descripción

**mailparse_uudecode_all**([resource](#language.types.resource) $fp): [array](#language.types.array)

Lee los datos del apuntador de archivo dado y extrae cada archivo
codificado mediante uuencode embebido en un archivo temporal.

### Parámetros

     fp


       Un apuntador de archivo válido.





### Valores devueltos

Devuelve una matriz de matrices asociativas, listando la información de
cada archivo.

       filename
       Ruta al nombre de archivo temporal creado



       origfilename
       El nombre de archivo original, solo para partes codificadas
       mediante uuencode




La primera entrada es el cuerpo del mensaje. Las siguientes son los
archivos uuencode decodificados.

### Ejemplos

    **Ejemplo #1 Ejemplo de mailparse_uudecode_all()**

&lt;?php

$texto = &lt;&lt;&lt;EOD
To: fred@example.com

hello, this is some text hello.
blah blah blah.

begin 644 test.txt
/=&amp;AI&lt;R!I&lt;R!A('1E&lt;W0\*
`
end

EOD;

$aa = tmpfile();
fwrite($aa, $texto);

$datos = mailparse_uudecode_all($aa);

echo "BODY\n";
readfile($datos[0]["filename"]);
echo "UUE ({$datos[1]['origfilename']})\n";
readfile($datos[1]["filename"]);

// Limpiar
unlink($datos[0]["filename"]);
unlink($datos[1]["filename"]);

?&gt;

    El ejemplo anterior mostrará:

BODY
To: fred@example.com

hello, this is some text hello.
blah blah blah.

UUE (test.txt)
this is a test

## Tabla de contenidos

- [mailparse_determine_best_xfer_encoding](#function.mailparse-determine-best-xfer-encoding) — Obtiene la mejor forma de codificar
- [mailparse_msg_create](#function.mailparse-msg-create) — Crea un recurso de correo mime
- [mailparse_msg_extract_part](#function.mailparse-msg-extract-part) — Extrae/decodifica una sección de mensaje
- [mailparse_msg_extract_part_file](#function.mailparse-msg-extract-part-file) — Extrae/decodifica una sección de mensaje
- [mailparse_msg_extract_whole_part_file](#function.mailparse-msg-extract-whole-part-file) — Extrae una sección del mensaje incluyendo cabeceras sin descodificar la transferencia codificada
- [mailparse_msg_free](#function.mailparse-msg-free) — Libera un recurso MIME
- [mailparse_msg_get_part](#function.mailparse-msg-get-part) — Devuelve un gestor sobre una sección dada en un mensaje
  mime
- [mailparse_msg_get_part_data](#function.mailparse-msg-get-part-data) — Devuelve una matriz asociativa de información sobre el
  mensaje
- [mailparse_msg_get_structure](#function.mailparse-msg-get-structure) — Devuelve una matriz de nombres de sección mime en el mensaje
  dado
- [mailparse_msg_parse](#function.mailparse-msg-parse) — Procesar datos incrementalmente sobre un búfer
- [mailparse_msg_parse_file](#function.mailparse-msg-parse-file) — Procesa un archivo
- [mailparse_rfc822_parse_addresses](#function.mailparse-rfc822-parse-addresses) — Procesa direcciones compatibles con RFC 822
- [mailparse_stream_encode](#function.mailparse-stream-encode) — Secuencia datos desde un apuntador de archivo, codifica y escribe a
  fp_destino
- [mailparse_uudecode_all](#function.mailparse-uudecode-all) — Procesa los datos desde un apuntador a archivo y extrae cada archivo
  embebido con codificación uu

- [Introducción](#intro.mailparse)
- [Instalación/Configuración](#mailparse.setup)<li>[Instalación](#mailparse.installation)
- [Configuración en tiempo de ejecución](#mailparse.configuration)
- [Tipos de recursos](#mailparse.resources)
  </li>- [Constantes predefinidas](#mailparse.constants)
- [Funciones Mailparse](#ref.mailparse)<li>[mailparse_determine_best_xfer_encoding](#function.mailparse-determine-best-xfer-encoding) — Obtiene la mejor forma de codificar
- [mailparse_msg_create](#function.mailparse-msg-create) — Crea un recurso de correo mime
- [mailparse_msg_extract_part](#function.mailparse-msg-extract-part) — Extrae/decodifica una sección de mensaje
- [mailparse_msg_extract_part_file](#function.mailparse-msg-extract-part-file) — Extrae/decodifica una sección de mensaje
- [mailparse_msg_extract_whole_part_file](#function.mailparse-msg-extract-whole-part-file) — Extrae una sección del mensaje incluyendo cabeceras sin descodificar la transferencia codificada
- [mailparse_msg_free](#function.mailparse-msg-free) — Libera un recurso MIME
- [mailparse_msg_get_part](#function.mailparse-msg-get-part) — Devuelve un gestor sobre una sección dada en un mensaje
  mime
- [mailparse_msg_get_part_data](#function.mailparse-msg-get-part-data) — Devuelve una matriz asociativa de información sobre el
  mensaje
- [mailparse_msg_get_structure](#function.mailparse-msg-get-structure) — Devuelve una matriz de nombres de sección mime en el mensaje
  dado
- [mailparse_msg_parse](#function.mailparse-msg-parse) — Procesar datos incrementalmente sobre un búfer
- [mailparse_msg_parse_file](#function.mailparse-msg-parse-file) — Procesa un archivo
- [mailparse_rfc822_parse_addresses](#function.mailparse-rfc822-parse-addresses) — Procesa direcciones compatibles con RFC 822
- [mailparse_stream_encode](#function.mailparse-stream-encode) — Secuencia datos desde un apuntador de archivo, codifica y escribe a
  fp_destino
- [mailparse_uudecode_all](#function.mailparse-uudecode-all) — Procesa los datos desde un apuntador a archivo y extrae cada archivo
embebido con codificación uu
  </li>
