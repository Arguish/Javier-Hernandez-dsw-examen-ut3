# IMAP, POP3 y NNTP

# Introducción

**Advertencia**

    Esta extensión está *OBSOLETA* y *SEPARADA* a partir de PHP 8.4.0.

Estas funciones permiten utilizar el protocolo IMAP,
así como los protocolos NNTP, POP3
y los buzones de correo locales.

Sin embargo, se debe tener cuidado, ya que algunas funciones IMAP no funcionan
correctamente con el protocolo POP.

**Advertencia**

    La extensión IMAP no es segura a nivel de hilos; no debe ser utilizada con ZTS.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#imap.requirements)
- [Instalación](#imap.installation)
- [Configuración en tiempo de ejecución](#imap.configuration)
- [Tipos de recursos](#imap.resources)

    ## Requerimientos

    Esta extensión requiere la biblioteca C cliente. Descargue
    la última versión en [» https://github.com/uw-imap/imap](https://github.com/uw-imap/imap)
    y compílela.

    Es importante no copiar los ficheros fuente IMAP directamente
    en el directorio de inclusión del sistema para evitar conflictos. En lugar de esto,
    cree un nuevo directorio en el directorio de inclusión del sistema, como
    /usr/local/imap-2000b/ (la ruta y el nombre
    dependen de su configuración y de su versión de IMAP) y en este nuevo
    directorio, cree los directorios nombrados lib/ y
    include/. Desde el directorio
    c-client de las fuentes IMAP, copie todos los ficheros
    _.h en el directorio include/
    y todos los ficheros _.c en el directorio
    lib/. Adicionalmente, cuando se compila IMAP,
    se crea un fichero nombrado c-client.a. Póngalo también
    en el directorio lib/ pero renómbrelo a
    libc-client.a.

    **Nota**:

    Para compilar la biblioteca C cliente con
    SSL y/o con soporte Kerberos, lea la documentación proporcionada en
    la distribución.

    **Nota**:

    En Mandrake Linux, la biblioteca IMAP
    (libc-client.a) se compila sin soporte
    Kerberos. Una versión separada con SSL
    (client-PHP4.a) se instala. La biblioteca debe
    ser recompilada para añadir soporte Kerberos.

## Instalación

## PHP 8.4

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 8.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/imap](https://pecl.php.net/package/imap).

## PHP &lt; 8.4

Para que estas funciones operen, es necesario compilar PHP con
**--with-imap[=DIR]**, donde DIR es el
prefijo de instalación de c-client. En el ejemplo anterior, se utilizaría
**--with-imap=/usr/local/imap-2000b**.
Esta ubicación depende de dónde se haya creado este directorio, como
se indica en la descripción anterior. Los usuarios de
Windows pueden incluir la DLL
php_imap.dll en php.ini.

**Nota**:

    Dependiendo de cómo se haya configurado c-client, es posible que también
    sea necesario añadir **--with-imap-ssl=/path/to/openssl/** y/o
    **--with-kerberos=/path/to/kerberos**
    a la línea de configuración de PHP.

**Advertencia**

    La extensión IMAP no es thread-safe; no debe ser utilizada con builds ZTS.

**Advertencia**
Las extensiones [IMAP](#book.imap), [recode](#book.recode) y
[YAZ](#book.yaz)
no pueden ser utilizadas simultáneamente ya que utilizan un símbolo interno común.
Nota: Yaz 2.0 y superior ya no sufre de este problema.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**IMAP Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 7.1.25, 7.2.13 y 7.3.0. Anteriormente, estaba activado implícitamente.


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     imap.enable_insecure_rsh
     [bool](#language.types.boolean)



      Establecer una conexión a un servidor puede invocar comandos **rsh** o
      **ssh**, a menos que esta opción php.ini esté desactivada.



     **Advertencia**

       Ni PHP ni la biblioteca IMAP filtran los nombres de
       los buzones antes de pasarlos a los comandos **rsh** o **ssh**,
       por lo tanto, pasar datos no fiables a esta función sin desactivar esta opción
       php.ini es *peligroso*.





## Tipos de recursos

Anterior a PHP 8.1.0, esta extensión utilizaba un tipo de recurso
imap devuelto por [imap_open()](#function.imap-open) que
hace referencia a un flujo IMAP abierto.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[NIL](#constant.nil)**
    ([int](#language.types.integer))



     Obsoleto a partir de PHP 8.1.0.





    **[OP_DEBUG](#constant.op-debug)**
    ([int](#language.types.integer))









    **[OP_READONLY](#constant.op-readonly)**
    ([int](#language.types.integer))



     Abre un buzón de correo en modo de solo lectura.





    **[OP_ANONYMOUS](#constant.op-anonymous)**
    ([int](#language.types.integer))



     No utilizar, o modificar el fichero .newsrc para las noticias,
     (NNTP únicamente).





    **[OP_SHORTCACHE](#constant.op-shortcache)**
    ([int](#language.types.integer))









    **[OP_SILENT](#constant.op-silent)**
    ([int](#language.types.integer))









    **[OP_PROTOTYPE](#constant.op-prototype)**
    ([int](#language.types.integer))









    **[OP_HALFOPEN](#constant.op-halfopen)**
    ([int](#language.types.integer))



     Para los nombres IMAP y NNTP,
     abre una conexión pero no abre un buzón de correo.





    **[OP_EXPUNGE](#constant.op-expunge)**
    ([int](#language.types.integer))









    **[OP_SECURE](#constant.op-secure)**
    ([int](#language.types.integer))









    **[CL_EXPUNGE](#constant.cl-expunge)**
    ([int](#language.types.integer))



     purgar automáticamente el buzón de correo al llamar a [imap_close()](#function.imap-close)





    **[FT_UID](#constant.ft-uid)**
    ([int](#language.types.integer))



     El argumento es un UID.





    **[FT_PEEK](#constant.ft-peek)**
    ([int](#language.types.integer))



     No levantar el flag \Seen (Mensaje leído) si no está
     ya levantado.





    **[FT_NOT](#constant.ft-not)**
    ([int](#language.types.integer))









    **[FT_INTERNAL](#constant.ft-internal)**
    ([int](#language.types.integer))



     La cadena devuelta está en formato interno, y no va a canonizar los CRLF.





    **[FT_PREFETCHTEXT](#constant.ft-prefetchtext)**
    ([int](#language.types.integer))









    **[ST_UID](#constant.st-uid)**
    ([int](#language.types.integer))



     la secuencia contiene UID en lugar de números de secuencia





    **[ST_SILENT](#constant.st-silent)**
    ([int](#language.types.integer))









    **[ST_SET](#constant.st-set)**
    ([int](#language.types.integer))









    **[CP_UID](#constant.cp-uid)**
    ([int](#language.types.integer))



     La secuencia de números contiene UID





    **[CP_MOVE](#constant.cp-move)**
    ([int](#language.types.integer))



     Borra los mensajes después de copiar con
     [imap_mail_copy()](#function.imap-mail-copy)





    **[SE_UID](#constant.se-uid)**
    ([int](#language.types.integer))



     Devuelve UID en lugar de números





    **[SE_FREE](#constant.se-free)**
    ([int](#language.types.integer))









    **[SE_NOPREFETCH](#constant.se-noprefetch)**
    ([int](#language.types.integer))



     No pretelecargar los mensajes encontrados





    **[SO_FREE](#constant.so-free)**
    ([int](#language.types.integer))









    **[SO_NOSERVER](#constant.so-noserver)**
    ([int](#language.types.integer))









    **[SA_MESSAGES](#constant.sa-messages)**
    ([int](#language.types.integer))









    **[SA_RECENT](#constant.sa-recent)**
    ([int](#language.types.integer))









    **[SA_UNSEEN](#constant.sa-unseen)**
    ([int](#language.types.integer))









    **[SA_UIDNEXT](#constant.sa-uidnext)**
    ([int](#language.types.integer))









    **[SA_UIDVALIDITY](#constant.sa-uidvalidity)**
    ([int](#language.types.integer))









    **[SA_ALL](#constant.sa-all)**
    ([int](#language.types.integer))









    **[LATT_NOINFERIORS](#constant.latt-noinferiors)**
    ([int](#language.types.integer))



     Este buzón de correo no tiene "hijos"
     (no hay más buzones de correo debajo de este).





    **[LATT_NOSELECT](#constant.latt-noselect)**
    ([int](#language.types.integer))



     Esto es solo un contenedor, no un buzón de correo
     (no se puede abrir).





    **[LATT_MARKED](#constant.latt-marked)**
    ([int](#language.types.integer))



     Este buzón de correo está marcado.
     Utilizado únicamente con UW-IMAPD.





    **[LATT_UNMARKED](#constant.latt-unmarked)**
    ([int](#language.types.integer))



     Este buzón de correo no está marcado.
     Utilizado únicamente con UW-IMAPD.





    **[LATT_REFERRAL](#constant.latt-referral)**
    ([int](#language.types.integer))



     Este contenedor tiene una referencia a un buzón de correo remoto.





    **[LATT_HASCHILDREN](#constant.latt-haschildren)**
    ([int](#language.types.integer))



     Este buzón de correo tiene inferiores seleccionables.





    **[LATT_HASNOCHILDREN](#constant.latt-hasnochildren)**
    ([int](#language.types.integer))



     Este buzón de correo no tiene inferiores seleccionables.





    **[SORTDATE](#constant.sortdate)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Fecha del mensaje





    **[SORTARRIVAL](#constant.sortarrival)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Fecha de llegada





    **[SORTFROM](#constant.sortfrom)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Nombre de la primera caja de correo de la dirección
     de origen (From address)





    **[SORTSUBJECT](#constant.sortsubject)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Asunto del mensaje





    **[SORTTO](#constant.sortto)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Nombre de la primera caja de correo de destino (To address)





    **[SORTCC](#constant.sortcc)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Nombre de la caja de correo de copia oculta (cc address)





    **[SORTSIZE](#constant.sortsize)**
    ([int](#language.types.integer))



     Criterio de ordenación para [imap_sort()](#function.imap-sort) :
     Tamaño del mensaje en bytes





    **[TYPETEXT](#constant.typetext)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : texto no formateado





    **[TYPEMULTIPART](#constant.typemultipart)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : varias partes





    **[TYPEMESSAGE](#constant.typemessage)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : mensaje encapsulado





    **[TYPEAPPLICATION](#constant.typeapplication)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : datos de aplicación





    **[TYPEAUDIO](#constant.typeaudio)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : audio





    **[TYPEIMAGE](#constant.typeimage)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : imagen estática





    **[TYPEVIDEO](#constant.typevideo)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : video





    **[TYPEMODEL](#constant.typemodel)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : modelo





    **[TYPEOTHER](#constant.typeother)**
    ([int](#language.types.integer))



     Tipo de cuerpo primario : desconocido





    **[ENC7BIT](#constant.enc7bit)**
    ([int](#language.types.integer))



     Codificación del cuerpo : datos semánticos SMTP 7 bit





    **[ENC8BIT](#constant.enc8bit)**
    ([int](#language.types.integer))



     Codificación del cuerpo : datos semánticos SMTP 8 bit





    **[ENCBINARY](#constant.encbinary)**
    ([int](#language.types.integer))



     Codificación del cuerpo : datos binarios 8 bit





    **[ENCBASE64](#constant.encbase64)**
    ([int](#language.types.integer))



     Codificación del cuerpo : datos codificados en base-64





    **[ENCQUOTEDPRINTABLE](#constant.encquotedprintable)**
    ([int](#language.types.integer))



     Codificación del cuerpo : datos 8-7-bit legibles por el ser humano





    **[ENCOTHER](#constant.encother)**
    ([int](#language.types.integer))



     Codificación del cuerpo : desconocido





    **[IMAP_OPENTIMEOUT](#constant.imap-opentimeout)**
    ([int](#language.types.integer))









    **[IMAP_READTIMEOUT](#constant.imap-readtimeout)**
    ([int](#language.types.integer))









    **[IMAP_WRITETIMEOUT](#constant.imap-writetimeout)**
    ([int](#language.types.integer))









    **[IMAP_CLOSETIMEOUT](#constant.imap-closetimeout)**
    ([int](#language.types.integer))









    **[IMAP_GC_ELT](#constant.imap-gc-elt)**
    ([int](#language.types.integer))



     Recolección de la memoria, eliminación de las cachés de elementos de mensaje.





    **[IMAP_GC_ENV](#constant.imap-gc-env)**
    ([int](#language.types.integer))



     Recolección de la memoria, eliminación de las envolturas y cuerpos.





    **[IMAP_GC_TEXTS](#constant.imap-gc-texts)**
    ([int](#language.types.integer))



     Recolección de la memoria, eliminación de los textos.

# Funciones IMAP

# Ver también

Este documento no puede entrar en detalles de todos los temas
abordados. Más información está disponible con la documentación
de la biblioteca C (docs/internal.txt) así como
los RFC siguientes :

    -

      [» RFC2821](https://datatracker.ietf.org/doc/html/rfc2821) :
      Simple Mail Transfer Protocol (SMTP).



    -

      [» RFC2822](https://datatracker.ietf.org/doc/html/rfc2822) :
      Standard for ARPA internet text messages.



    -

      [» RFC2060](https://datatracker.ietf.org/doc/html/rfc2060) :
      Internet Message Access Protocol (IMAP) Version 4rev1.



    -

      [» RFC1939](https://datatracker.ietf.org/doc/html/rfc1939) :
      Post Office Protocol Version 3 (POP3).



    -

      [» RFC977](https://datatracker.ietf.org/doc/html/rfc977) :
      Network News Transfer Protocol (NNTP).



    -

      [» RFC2076](https://datatracker.ietf.org/doc/html/rfc2076) :
      Common Internet Message Headers.



    -

      [» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045) , [» RFC2046](https://datatracker.ietf.org/doc/html/rfc2046) , [» RFC2047](https://datatracker.ietf.org/doc/html/rfc2047) , [» RFC2048](https://datatracker.ietf.org/doc/html/rfc2048) y [» RFC2049](https://datatracker.ietf.org/doc/html/rfc2049):
      Multipurpose Internet Mail Extensions (MIME).


Un estudio en profundidad también está disponible en los siguientes
libros (en inglés) :
[» Programming Internet Email](https://www.oreilly.com/library/view/programming-internet-email/9780596802585/)
por David Wood y [» Managing
IMAP](http://oreilly.com/catalog/9780596000127/) por Dianna Mullet &amp; Kevin Mullet.

# imap_8bit

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_8bit — Convierte un string de 8 bits en un string codificado en Quoted-Printable

### Descripción

**imap_8bit**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Convierte el string de 8 bits en un string codificado en Quoted-Printable
(según la [» RFC 2045](https://datatracker.ietf.org/doc/html/rfc2045), Sección 6.7).

### Parámetros

     string


       El string de 8 bits a convertir





### Valores devueltos

Devuelve un string codificado en Quoted-Printable, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [imap_qprint()](#function.imap-qprint) - Convierte una string con comillas en una string de 8 bits

# imap_alerts

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_alerts — Devuelve todas las alertas

### Descripción

**imap_alerts**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array de todos los mensajes de alerta
IMAP generados desde la última llamada a
**imap_alerts()** o desde el inicio de la página.

Cuando **imap_alerts()** es llamada, la pila de alertas
es vaciada. Las especificaciones IMAP requieren que estos mensajes sean
pasados al usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene todos los mensajes de alerta IMAP generados o
**[false](#constant.false)** si no hay mensajes de alerta disponibles.

### Ver también

    - [imap_errors()](#function.imap-errors) - Devuelve todos los errores IMAP ocurridos

# imap_append

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_append — Añade un mensaje en un buzón de correo

### Descripción

**imap_append**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $folder,
    [string](#language.types.string) $message,
    [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $internal_date = **[null](#constant.null)**
): [bool](#language.types.boolean)

Añade un message al folder especificado.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     folder


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más información



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     message


       El mensaje a añadir, en forma de [string](#language.types.string)




       Al intercambiar con el servidor Cyrus IMAP, se debe utilizar
       "\r\n" como terminación de línea, en lugar de "\n" o
       la operación fallará.






     options


       Si se proporciona, el parámetro options será también
       escrito en el buzón folder






     internal_date


       Si se define este parámetro, establecerá los INTERNALDATE en el mensaje adjunto.
       El parámetro debe ser una cadena de fecha que cumpla
       con las especificaciones del rfc2060 para un valor date_time.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       options y internal_date ahora son nullables.



### Ejemplos

    **Ejemplo #1 Ejemplo con imap_append()**

&lt;?php
$imap = imap_open("{imap.example.org}INBOX.Drafts", "username", "password");

$check = imap_check($imap);
echo "Msg Count before append: ". $check-&gt;Nmsgs . "\n";

imap_append($imap, "{imap.example.org}INBOX.Drafts"
, "From: me@example.com\r\n"
. "To: you@example.com\r\n"
. "Subject: test\r\n"
. "\r\n"
. "Este es un mensaje de prueba. Ignórelo.\r\n"
);

$check = imap_check($imap);
echo "Número de mensajes después de añadir : ". $check-&gt;Nmsgs . "\n";

imap_close($imap);
?&gt;

# imap_base64

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_base64 — Decodifica un texto codificado en BASE64

### Descripción

**imap_base64**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Decodifica el texto string codificado en BASE64.

### Parámetros

     string


       El texto codificado.





### Valores devueltos

Devuelve el texto decodificado, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [imap_binary()](#function.imap-binary) - Convierte una string de 8 bits en una string en base64

    - [base64_encode()](#function.base64-encode) - Codifica datos con MIME base64

    - [base64_decode()](#function.base64-decode) - Decodifica datos codificados con MIME base64

    - [» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045), Sección 6.8

# imap_binary

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_binary — Convierte una string de 8 bits en una string en base64

### Descripción

**imap_binary**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Convierte la string de 8 bits string
en una string en base64 (según la [» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045),
Sección 6.8).

### Parámetros

     string


       La string de 8 bits





### Valores devueltos

Devuelve la string codificada en base64, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [imap_base64()](#function.imap-base64) - Decodifica un texto codificado en BASE64

# imap_body

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_body — Lee el cuerpo de un mensaje

### Descripción

**imap_body**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_num, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

**imap_body()** devuelve el cuerpo del mensaje número
message_num del buzón actual.

**imap_body()** devolverá una copia sin tratar del cuerpo del
mensaje. Para extraer las subpartes MIME del mensaje, utilice
[imap_fetchstructure()](#function.imap-fetchstructure) para analizar la estructura,
y [imap_fetchbody()](#function.imap-fetchbody) para extraer una copia de una
de las subpartes.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     flags


       El parámetro flags opcional es una máscara que puede
       contener los siguientes valores:



        -

          **[FT_UID](#constant.ft-uid)** - message_num es un UID



        -

          **[FT_PEEK](#constant.ft-peek)** - No levantar el flag \Seen (Mensaje leído) si no está ya levantado.



        -

          **[FT_INTERNAL](#constant.ft-internal)** - La string devuelta está en
          formato interno, y no va a canonizar los CRLF.







### Valores devueltos

Devuelve el cuerpo del mensaje especificado, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

# imap_bodystruct

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_bodystruct — Lee la estructura de una sección del cuerpo de un correo electrónico

### Descripción

**imap_bodystruct**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_num, [string](#language.types.string) $section): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Lee la estructura de una sección especificada del cuerpo de un correo electrónico.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     section


       La sección del cuerpo a leer





### Valores devueltos

Devuelve la información en un objeto, o **[false](#constant.false)** si ocurre un error.
Para una descripción detallada de la estructura del objeto así como de sus propiedades,
consulte la función [imap_fetchstructure()](#function.imap-fetchstructure).

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_fetchstructure()](#function.imap-fetchstructure) - Lee la estructura de un mensaje

# imap_check

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_check — Verifica el buzón de correo actual

### Descripción

**imap_check**([IMAP\Connection](#class.imap-connection) $imap): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Verifica la información del buzón de correo actual.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve la información en un objeto que contiene las siguientes propiedades:

    -

      **[Date](#constant.date)** - Fecha de la última modificación del contenido del
      buzón de correo de acuerdo con la [» RFC2822](https://datatracker.ietf.org/doc/html/rfc2822)



    -

      **[Driver](#constant.driver)** - protocolo utilizado para acceder al
      buzón de correo: POP3,
      IMAP, NNTP.



    -

      **[Mailbox](#constant.mailbox)** - nombre del buzón de correo



    -

      **[Nmsgs](#constant.nmsgs)** - número de mensajes en el buzón de correo



    -

      **[Recent](#constant.recent)** - número de mensajes recientes en el buzón de correo


Devuelve **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_check()**

&lt;?php

$imap = imap_check($imap_stream);
var_dump($imap);

?&gt;

    Resultado del ejemplo anterior es similar a:

object(stdClass)(5) {
["Date"]=&gt;
string(37) "Wed, 10 Dec 2003 17:56:54 +0100 (CET)"
["Driver"]=&gt;
string(4) "imap"
["Mailbox"]=&gt;
string(54)
"{www.example.com:143/imap/user="foo@example.com"}INBOX"
["Nmsgs"]=&gt;
int(1)
["Recent"]=&gt;
int(0)
}

# imap_clearflag_full

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_clearflag_full — Elimina un flag en un mensaje

### Descripción

**imap_clearflag_full**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $sequence,
    [string](#language.types.string) $flag,
    [int](#language.types.integer) $options = 0
): [true](#language.types.singleton)

**imap_clearflag_full()** borra el flag
flag en los mensajes de la secuencia
sequence, del flujo imap stream.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     sequence


       Una secuencia de números de mensajes. Se pueden enumerar los mensajes
       deseados con la sintaxis X,Y, o recuperar todos los mensajes
       contenidos en un intervalo, con la sintaxis X:Y






     flag


       Los flags flag que se pueden borrar son
       "\\Seen", "\\Answered", "\\Flagged", "\\Deleted" y "\\Draft" (tal
       como se definen en la [» RFC2060](https://datatracker.ietf.org/doc/html/rfc2060))






     options


       options es una máscara de bits, que acepta
       únicamente el siguiente valor:



        -

          **[ST_UID](#constant.st-uid)** - la secuencia contiene UID en lugar de
          números de secuencia







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si el argumento options es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       Una excepción [ValueError](#class.valueerror) es ahora lanzada
       para valores inválidos del argumento options. Anteriormente,
       se emitía una advertencia y la función devolvía **[false](#constant.false)**.



### Ver también

    - [imap_setflag_full()](#function.imap-setflag-full) - Establece un flag en un mensaje

# imap_close

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_close — Termina un flujo IMAP

### Descripción

**imap_close**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $flags = 0): [true](#language.types.singleton)

Termina un flujo IMAP.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     flags


       Si se establece en **[CL_EXPUNGE](#constant.cl-expunge)**,
       la función realizará una purga automática del buzón
       antes de cerrarlo, eliminando todos los mensajes marcados para su eliminación.
       Se puede lograr lo mismo con la función
       [imap_expunge()](#function.imap-expunge)





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si el argumento flags es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       Ahora se lanza una excepción [ValueError](#class.valueerror)
       para valores de argumento flags inválidos. Anteriormente,
       se emitía una advertencia y la función devolvía **[false](#constant.false)**.



### Ver también

    - [imap_open()](#function.imap-open) - Abre un flujo IMAP hacia un buzón de correo

# imap_create

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_create — Alias de [imap_createmailbox()](#function.imap-createmailbox)

### Descripción

Esta función es un alias de:
[imap_createmailbox()](#function.imap-createmailbox).

# imap_createmailbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_createmailbox — Crea un nuevo buzón de correo

### Descripción

**imap_createmailbox**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [bool](#language.types.boolean)

Crea un nuevo buzón de correo llamado mailbox.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más información.
       Los nombres que contienen caracteres internacionales deben ser codificados
       por la función [imap_utf7_encode()](#function.imap-utf7-encode)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_createmailbox()**

&lt;?php
$mbox = imap_open("{imap.example.org}", "username", "password", OP_HALFOPEN)
or die("conexión imposible : " . imap_last_error());

$name1 = "phpnewbox";
$name2 = imap_utf7_encode("phpnewböx"); // phpnewb&amp;w7Y-x

$newname = $name1;

echo "El nuevo nombre será '$name1'&lt;br /&gt;\n";

// Vamos a crear ahora un nuevo buzón de correo "phptestbox"
// en su carpeta inbox, verificar su estado y, finalmente, eliminarlo
// para devolver su inbox a su estado inicial.

if (@imap_createmailbox($mbox, imap_utf7_encode("{imap.example.org}INBOX.$newname"))) {
$status = @imap_status($mbox, "{imap.example.org}INBOX.$newname", SA_ALL);
    if ($status) {
echo "Su nuevo buzón '$name1' está en el siguiente estado :&lt;br /&gt;\n";
echo "Mensajes : " . $status-&gt;messages . "&lt;br /&gt;\n";
echo "Recientes : " . $status-&gt;recent . "&lt;br /&gt;\n";
echo "No leídos : " . $status-&gt;unseen . "&lt;br /&gt;\n";
echo "UIDnext : " . $status-&gt;uidnext . "&lt;br /&gt;\n";
echo "UIDvalidity :" . $status-&gt;uidvalidity . "&lt;br /&gt;\n";

        if (imap_renamemailbox($mbox, "{imap.example.org}INBOX.$newname", "{imap.example.org}INBOX.$name2")) {
            echo "renombrando el buzón de correo '$name1' a '$name2'&lt;br /&gt;\n";
            $newname = $name2;
        } else {
            echo "imap_renamemailbox en el nuevo buzón de correo falló : " . imap_last_error() . "&lt;br /&gt;\n";
        }
    } else {
        echo "imap_status en el nuevo buzón de correo falló : " . imap_last_error() . "&lt;br /&gt;\n";
    }

    if (@imap_deletemailbox($mbox, "{imap.example.org}INBOX.$newname")) {
        echo "nuevo buzón de correo eliminado para devolver todo a su estado&lt;br /&gt;\n";
    } else {
        echo "imap_deletemailbox en el nuevo buzón de correo falló : " . implode("&lt;br /&gt;\n", imap_errors()) . "&lt;br /&gt;\n";
    }

} else {
echo "Imposible crear un nuevo buzón de correo : " . implode("&lt;br /&gt;\n", imap_errors()) . "&lt;br /&gt;\n";
}

imap_close($mbox);
?&gt;

### Ver también

    - [imap_renamemailbox()](#function.imap-renamemailbox) - Renombra un buzón de correo

    - [imap_deletemailbox()](#function.imap-deletemailbox) - Borra una boîte aux lettres

# imap_delete

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_delete — Marca el fichero para el borrado, en el buzón de correo actual

### Descripción

**imap_delete**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $message_nums, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Marca los mensajes message_nums para el borrado.
El borrado real no intervendrá hasta la llamada de la función
[imap_expunge()](#function.imap-expunge) o de [imap_close()](#function.imap-close)
con el parámetro opcional **[CL_EXPUNGE](#constant.cl-expunge)**.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_nums


       Un string representando uno o varios mensajes en un estilo de
       formato de una secuencia IMAP4 ("n",
       "n:m", o una combinación de esto,
       delimitado por comas).






     flags


       Puede ser definido a **[FT_UID](#constant.ft-uid)**
       que solicita a la función tratar el argumento
       message_nums como un UID.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si el parámetro flags es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       Una excepción [ValueError](#class.valueerror) es ahora lanzada
       para valores de parámetro flags inválidos. Anteriormente,
       una advertencia era emitida y la función retornaba **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con imap_delete()**

&lt;?php

$mbox = imap_open("{imap.example.org}INBOX", "username", "password")
or die("Conexión imposible : " . imap_last_error());

$check = imap_mailboxmsginfo($mbox);
echo "Número de mensajes antes del borrado : " . $check-&gt;Nmsgs . "&lt;br /&gt;\n";

imap_delete($mbox, 1);

$check = imap_mailboxmsginfo($mbox);
echo "Número de mensajes después del borrado : " . $check-&gt;Nmsgs . "&lt;br /&gt;\n";

imap_expunge($mbox);

$check = imap_mailboxmsginfo($mbox);
echo "Número de mensajes después de imap_expunge : " . $check-&gt;Nmsgs . "&lt;br /&gt;\n";

imap_close($mbox);
?&gt;

### Notas

**Nota**:

    Los buzones de correo IMAP no tienen los flags de sus mensajes guardados
    entre las conexiones, por lo que la función [imap_expunge()](#function.imap-expunge) debe
    ser llamada durante la misma conexión para que los mensajes marcados
    para el borrado sean realmente purgados.

### Ver también

    - [imap_undelete()](#function.imap-undelete) - Elimina la marca de eliminación de un mensaje

    - [imap_expunge()](#function.imap-expunge) - Elimina todos los mensajes marcados para su eliminación

    - [imap_close()](#function.imap-close) - Termina un flujo IMAP

# imap_deletemailbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_deletemailbox — Borra una boîte aux lettres

### Descripción

**imap_deletemailbox**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [bool](#language.types.boolean)

Borra la boîte aux lettres especificada.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre de la boîte aux lettres, ver la documentación sobre la
       función [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_createmailbox()](#function.imap-createmailbox) - Crea un nuevo buzón de correo

    - [imap_renamemailbox()](#function.imap-renamemailbox) - Renombra un buzón de correo

    -
     [imap_open()](#function.imap-open) - Abre un flujo IMAP hacia un buzón de correo para el formato
     mbox

# imap_errors

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_errors — Devuelve todos los errores IMAP ocurridos

### Descripción

**imap_errors**(): [array](#language.types.array)|[false](#language.types.singleton)

Esta función devuelve un array de todos los mensajes de error
IMAP generados desde la última llamada a
**imap_errors()** o desde el inicio de la página.

Cuando **imap_errors()** es llamada, la pila de errores
es vaciada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función devuelve un array que contiene todos los mensajes de error
IMAP generados desde la última llamada a la función
**imap_errors()** o desde el inicio de la página.
Devuelve **[false](#constant.false)** si no hay mensajes de error disponibles.

### Ver también

    - [imap_last_error()](#function.imap-last-error) - Devuelve el último error ocurrido

    - [imap_alerts()](#function.imap-alerts) - Devuelve todas las alertas

# imap_expunge

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_expunge — Elimina todos los mensajes marcados para su eliminación

### Descripción

**imap_expunge**([IMAP\Connection](#class.imap-connection) $imap): [true](#language.types.singleton)

Elimina todos los mensajes marcados para su eliminación por
[imap_delete()](#function.imap-delete), [imap_mail_move()](#function.imap-mail-move),
o [imap_setflag_full()](#function.imap-setflag-full).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

# imap_fetch_overview

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_fetch_overview — Lee el resumen de los encabezados de los mensajes

### Descripción

**imap_fetch_overview**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $sequence, [int](#language.types.integer) $flags = 0): [array](#language.types.array)|[false](#language.types.singleton)

Lee los encabezados de los correos electrónicos de la secuencia
sequence y devuelve un resumen de su contenido.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     sequence


       Una descripción de la secuencia del mensaje. Se pueden enumerar los
       mensajes deseados con la sintaxis X,Y, o recuperar
       todos los mensajes de un intervalo, con la sintaxis X:Y






     flags


       sequence contendrá una secuencia
       de índice de mensaje o de UID, si flags
       contiene **[FT_UID](#constant.ft-uid)**.





### Valores devueltos

Devuelve un array de objetos que describen el encabezado de cada mensaje.
El objeto solo definirá una propiedad si existe. Las propiedades
posibles son:

    -

      subject : el asunto del mensaje



    -

      from : el remitente



    -

      to : el destinatario



    -

      date : la fecha de envío



    -

      message_id : la identificación del mensaje



    -

      references : la referencia sobre el id de este mensaje



    -

      in_reply_to : la respuesta a este identificador de mensaje



    -

      size : el tamaño en bytes



    -

      uid : UID del mensaje en el buzón



    -

      msgno : el número de secuencia del mensaje en el buzón



    -

      recent : este mensaje es reciente



    -

      flagged : este mensaje está marcado



    -

      answered : este mensaje ha dado lugar a una respuesta



    -

      deleted : este mensaje está marcado para el borrado



    -

      seen : este mensaje ya ha sido leído



    -

      draft : este mensaje es un borrador



    -

      udate : el horario UNIX de la hora de llegada


La función devuelve **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_fetch_overview()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}INBOX", "username", "password")
or die("Conexión imposible: " . imap_last_error());

$MC = imap_check($mbox);

// Recupera el resumen para todos los mensajes contenidos en INBOX
$result = imap_fetch_overview($mbox,"1:{$MC-&gt;Nmsgs}",0);
foreach ($result as $overview) {
    echo "#{$overview-&gt;msgno} ({$overview-&gt;date}) - From: {$overview-&gt;from}
{$overview-&gt;subject}\n";
}
imap_close($mbox);
?&gt;

### Ver también

    - [imap_fetchheader()](#function.imap-fetchheader) - Devuelve el encabezado de un mensaje

# imap_fetchbody

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_fetchbody — Devuelve una sección extraída del cuerpo de un mensaje

### Descripción

**imap_fetchbody**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [int](#language.types.integer) $message_num,
    [string](#language.types.string) $section,
    [int](#language.types.integer) $flags = 0
): [string](#language.types.string)|[false](#language.types.singleton)

Recupera una sección particular del cuerpo de los mensajes especificados.
Las partes del cuerpo no son decodificadas por esta función.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     section


       El número de la sección. Es una cadena de enteros, delimitados
       por una coma que corresponden a los índices en la lista
       de las secciones del mensaje, tal como se prevé en la especificación IMAP4.






     flags


       La opción **imap_fetchbody()** es una máscara que puede
       contener los siguientes valores:



        -

          **[FT_UID](#constant.ft-uid)** - message_num es un UID



        -

          **[FT_PEEK](#constant.ft-peek)** - No levantar el flag \Seen
          (Mensaje leído) si no está ya levantado.



        -

          **[FT_INTERNAL](#constant.ft-internal)** - La cadena devuelta está en formato
          interno, y no va a canonizar los CRLF.







### Valores devueltos

Devuelve una sección particular del cuerpo de los mensajes especificados, en
forma de una [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_savebody()](#function.imap-savebody) - Guarda una parte específica del cuerpo en un fichero

    - [imap_fetchstructure()](#function.imap-fetchstructure) - Lee la estructura de un mensaje

# imap_fetchheader

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_fetchheader — Devuelve el encabezado de un mensaje

### Descripción

**imap_fetchheader**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_num, [int](#language.types.integer) $flags = 0): [string](#language.types.string)|[false](#language.types.singleton)

**imap_fetchheader()** devuelve el encabezado RFC2822 crudo y
completo del mensaje msgno, en forma de string.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     flags


       Las opciones posibles son:



        -

          **[FT_UID](#constant.ft-uid)** - message_num es un UID



        -

          **[FT_INTERNAL](#constant.ft-internal)** - La string devuelta está
          en formato "internal", es decir, sin canonización de los CRLF



        -

          **[FT_PREFETCHTEXT](#constant.ft-prefetchtext)** - RFC822.TEXT debe ser pre
          descargado junto con el encabezado.
          Esto reduce el RTT en una conexión IMAP, si
          se desea el mensaje completo. (e.g. en una operación
          de guardado en un fichero).







### Valores devueltos

Devuelve el encabezado del mensaje especificado, en forma de string, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_fetch_overview()](#function.imap-fetch-overview) - Lee el resumen de los encabezados de los mensajes

# imap_fetchmime

(PHP 5 &gt;= 5.3.6, PHP 7, PHP 8)

imap_fetchmime — Recupera los encabezados MIME para una sección particular del mensaje

### Descripción

**imap_fetchmime**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [int](#language.types.integer) $message_num,
    [string](#language.types.string) $section,
    [int](#language.types.integer) $flags = 0
): [string](#language.types.string)|[false](#language.types.singleton)

Recupera los encabezados MIME para una sección particular del cuerpo de un mensaje específico.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje.






     section


       El número de la sección. Es una cadena de enteros delimitados por una coma
       que representa el índice de la lista de secciones del cuerpo del mensaje, tal
       como se especifica en IMAP4.






     flags


       Una máscara de una o varias opciones siguientes:



        -

          **[FT_UID](#constant.ft-uid)** - El parámetro message_num es un UID.



        -

          **[FT_PEEK](#constant.ft-peek)** - No colocar la bandera \Seen si no está ya definida.



        -

          **[FT_INTERNAL](#constant.ft-internal)** - La cadena devuelta está en un formato interno,
          y no será canonizada en CRLF.







### Valores devueltos

Devuelve los encabezados MIME de una sección particular del cuerpo del mensaje especificado, en
forma de un [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_fetchbody()](#function.imap-fetchbody) - Devuelve una sección extraída del cuerpo de un mensaje

    - [imap_fetchstructure()](#function.imap-fetchstructure) - Lee la estructura de un mensaje

    - [imap_fetchheader()](#function.imap-fetchheader) - Devuelve el encabezado de un mensaje

# imap_fetchstructure

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_fetchstructure — Lee la estructura de un mensaje

### Descripción

**imap_fetchstructure**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_num, [int](#language.types.integer) $flags = 0): [stdClass](#class.stdclass)|[false](#language.types.singleton)

**imap_fetchstructure()** lee la estructura del mensaje
msg_number.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     flags


       Este parámetro opcional tiene una sola opción,
       **[FT_UID](#constant.ft-uid)**, que solicita a la función tratar
       el argumento message_num como un
       UID.





### Valores devueltos

Devuelve un objeto cuyas propiedades se listan en la tabla
siguiente, o **[false](#constant.false)** si ocurre un error.

    <caption>**
     Objeto devuelto por imap_fetchstructure()**
    </caption>



       type
       Tipo primario de cuerpo



       encoding
       Codificación de transferencia del cuerpo



       ifsubtype
       **[true](#constant.true)** si hay una cadena de subtipo



       subtype
       subtipo MIME



       ifdescription
       **[true](#constant.true)** si hay una cadena de descripción



       description
       Cadena de descripción del contenido



       ifid
       **[true](#constant.true)** si hay una cadena de identificación



       id
       Cadena de identificación



       lines
       Número de líneas



       bytes
       Número de bytes



       ifdisposition
       **[true](#constant.true)** si hay una cadena de disposición



       disposition
       Cadena de disposición



       ifdparameters
       **[true](#constant.true)** si hay un array de parámetros dparameters



       dparameters
       array de objetos donde cada objeto tiene una propiedad "attribute" y una
        propiedad "value" correspondiente a los parámetros de encabezado
        Content-disposition MIME.



       ifparameters
       **[true](#constant.true)** si el array de parámetros existe



       parameters
       Array de objetos donde cada uno tiene una propiedad "attribute" y
        una propiedad "value".



       parts
       Array de objetos que describen cada parte
        MIME del mensaje











     <caption>**Tipo primario de cuerpo (puede variar según la biblioteca utilizada)**</caption>


      ValorTipoConstante




      0textoTYPETEXT

      1multipartTYPEMULTIPART

      2mensajeTYPEMESSAGE

      3aplicaciónTYPEAPPLICATION

      4audioTYPEAUDIO

      5imagenTYPEIMAGE

      6videoTYPEVIDEO

      7modeloTYPEMODEL

      8otroTYPEOTHER










     <caption>**Codificación de transferencia (puede variar según la biblioteca utilizada)**</caption>


      ValorTipoConstante




      07 bitENC7BIT

      18 bitENC8BIT

      2BinarioENCBINARY

      3Base 64ENCBASE64

      4Citado imprimibleENCQUOTEDPRINTABLE

      5OtroENCOTHER



### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_fetchbody()](#function.imap-fetchbody) - Devuelve una sección extraída del cuerpo de un mensaje

    - [imap_bodystruct()](#function.imap-bodystruct) - Lee la estructura de una sección del cuerpo de un correo electrónico

# imap_fetchtext

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_fetchtext — Alias de [imap_body()](#function.imap-body)

### Descripción

Esta función es un alias de:
[imap_body()](#function.imap-body).

# imap_gc

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

imap_gc — Borra la caché IMAP

### Descripción

**imap_gc**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $flags): [true](#language.types.singleton)

Elimina todas las entradas de un tipo dado en la caché IMAP.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     flags


       Indica el tipo de caché a purgar. Puede ser una combinación
       de las siguientes constantes:
       **[IMAP_GC_ELT](#constant.imap-gc-elt)** (caché de los elementos de mensaje),
       **[IMAP_GC_ENV](#constant.imap-gc-env)** (sobre y cuerpo),
       **[IMAP_GC_TEXTS](#constant.imap-gc-texts)** (textos).





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si el argumento flags es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       Una excepción [ValueError](#class.valueerror) es ahora lanzada
       para valores de argumento flags inválidos. Anteriormente,
       se emitía una advertencia y la función devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo conimap_gc()**

&lt;?php

$mbox = imap_open("{imap.example.org:143}", "username", "password");

imap_gc($mbox, IMAP_GC_ELT);

?&gt;

# imap_get_quota

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

imap_get_quota — Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos

### Descripción

**imap_get_quota**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $quota_root): [array](#language.types.array)|[false](#language.types.singleton)

Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos.

Para una versión de usuario, no administrador, de esta función,
refiérase a la función [imap_get_quotaroot()](#function.imap-get-quotaroot).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     quota_root


       quota_root debe ser de la forma :
       "user.nom", donde "nom" es el nombre del
       buzón de correo que se desea analizar.





### Valores devueltos

Devuelve un array que contiene los valores de cuota y actuales
del buzón de correo quota_root.
La cuota representa el tamaño máximo del buzón de correo.
El valor actual es el espacio actualmente utilizado por el buzón
de correo. **imap_get_quota()** devolverá **[false](#constant.false)**
en caso de fallo.

Desde PHP 4.3, la función refleja más fielmente las funcionalidades
dictadas por la [» RFC2087](https://datatracker.ietf.org/doc/html/rfc2087).
El array devuelto ha cambiado para soportar un número ilimitado de
recursos devueltos (i.e. mensajes o subcarpetas) con cada
recurso nombrado que es identificado por una clave. Cada clave contiene
entonces otro array con el uso y la cuota. El ejemplo a continuación
muestra cómo utilizarlo.

Por razones de compatibilidad, el método de acceso original sigue
estando disponible, pero se recomienda abandonarlo.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_get_quota()**

&lt;?php
$mbox = imap_open("{imap.example.org}", "mailadmin", "password", OP_HALFOPEN)
or die("Imposible conectarse : " . imap_last_error());

$quota_value = imap_get_quota($mbox, "user.kalowsky");
if (is_array($quota_value)) {
echo "Nivel de uso : " . $quota_value['usage'];
echo "Cuota : " . $quota_value['limit'];
}

imap_close($mbox);
?&gt;

    **Ejemplo #2 Ejemplo con imap_get_quota()** 4.3 o superior

&lt;?php
$mbox = imap_open("{imap.example.org}", "mailadmin", "password", OP_HALFOPEN)
or die("Imposible conectarse : " . imap_last_error());

$quota_values = imap_get_quota($mbox, "user.kalowsky");
if (is_array($quota_values)) {
$storage = $quota_values['STORAGE'];
echo "Uso actual de la capacidad de almacenamiento : " . $storage['usage'];
echo "Cuota actual de almacenamiento : " . $storage['limit'];

$message = $quota_values['MESSAGE'];
echo "Nivel de uso de MESSAGE : " . $message['usage'];
echo "Cuota de MESSAGE : " . $message['limit'];

/_ ... _/
}

imap_close($mbox);
?&gt;

### Notas

**imap_get_quota()** funciona actualmente solo con
las bibliotecas c-client2000.

El imap dado debe estar abierto como
administrador de correo, de lo contrario esta función falla.

### Ver también

    - [imap_open()](#function.imap-open) - Abre un flujo IMAP hacia un buzón de correo

    - [imap_set_quota()](#function.imap-set-quota) - Modifica el cupo de un buzón de correo

    - [imap_get_quotaroot()](#function.imap-get-quotaroot) - Lee los cuotas de cada usuario

# imap_get_quotaroot

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

imap_get_quotaroot — Lee los cuotas de cada usuario

### Descripción

**imap_get_quotaroot**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [array](#language.types.array)|[false](#language.types.singleton)

Recupera los cuotas de cada usuario. El valor límite representa
el espacio límite asignado para este usuario para el uso de su buzón
de correo. El valor de uso representa el tamaño actual del buzón
de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       mailbox debe ser un nombre de buzón de correo
       (i.e. INBOX).





### Valores devueltos

Devuelve un array de enteros, conteniendo los cuotas del buzón
de correo del usuario. Todos los valores son representados
por una clave basada en el nombre del buzón, y por un array
representando el nivel de uso y los límites.

Esta función devolverá **[false](#constant.false)** si ocurre un error, y
un array de datos si la respuesta del servidor no pudo ser comprendida.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_get_quotaroot()**

&lt;?php
$mbox = imap_open("{imap.example.org}", "kalowsky", "password", OP_HALFOPEN)
or die("Conexión imposible : " . imap_last_error());

$quota = imap_get_quotaroot($mbox, "INBOX");
if (is_array($quota)) {
$storage = $quota['STORAGE'];
echo "STORAGE nivel de uso : " . $storage['usage'];
echo "STORAGE tamaño límite : " . $storage['limit'];

$message = $quota['MESSAGE'];
echo "MESSAGE nivel de uso : " . $message['usage'];
echo "MESSAGE tamaño límite : " . $message['limit'];

/_ ... _/

}

imap_close($mbox);
?&gt;

### Notas

Esta función es accesible únicamente a los usuarios de la biblioteca
c-client2000 o más reciente.

imap debería ser abierto como el usuario
cuyo buzón de correo se desea verificar.

### Ver también

    - [imap_open()](#function.imap-open) - Abre un flujo IMAP hacia un buzón de correo

    - [imap_set_quota()](#function.imap-set-quota) - Modifica el cupo de un buzón de correo

    - [imap_get_quota()](#function.imap-get-quota) - Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos

# imap_getacl

(PHP 5, PHP 7, PHP 8)

imap_getacl — Devuelve el ACL para el buzón

### Descripción

**imap_getacl**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [array](#language.types.array)|[false](#language.types.singleton)

Recupera el ACL para el buzón dado.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre del buzón, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles.



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Devuelve un array asociativo en la forma
"folder" =&gt; "acl", o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_getacl()**

&lt;?php

print_r(imap_getacl($imap, 'user.joecool'));

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[asubfolder] =&gt; lrswipcda
[anothersubfolder] =&gt; lrswipcda
)

### Notas

Esta función está actualmente disponible solo para los
usuarios de la biblioteca c-client2000 o superior.

### Ver también

    - [imap_setacl()](#function.imap-setacl) - Modifica el ACL de la bandeja de entrada

# imap_getmailboxes

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_getmailboxes — Lista los buzones de correo y devuelve los detalles de cada uno

### Descripción

**imap_getmailboxes**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $reference, [string](#language.types.string) $pattern): [array](#language.types.array)|[false](#language.types.singleton)

Lista los buzones de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     reference


       reference debería ser solo el servidor
       en la forma descrita en [imap_open()](#function.imap-open)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     pattern

      Specifies where in the mailbox hierarchy

to start searching.

There are two special characters you can
pass as part of the pattern:
'_' and '%'.
'_' means to return all mailboxes. If you pass
pattern as '\*', you will
get a list of the entire mailbox hierarchy.
'%'
means to return the current level only.
'%' as the pattern
parameter will return only the top level
mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.

### Valores devueltos

Devuelve un array de objetos que contienen información sobre los
buzones de correo. Cada objeto posee un atributo de
name, que contiene el nombre completo
del buzón de correo, delimiter que
es el delimitador jerárquico y attributes.
attributes es una máscara de bits, que contiene :

    -

      **[LATT_NOINFERIORS](#constant.latt-noinferiors)** - Este buzón de correo
      no tiene "hijos" (no hay más buzones de correo
      debajo de este) y no puede contener ninguno. Una llamada a la
      función [imap_createmailbox()](#function.imap-createmailbox) no funcionará
      en este buzón.





    -

      **[LATT_NOSELECT](#constant.latt-noselect)** - Esto es solo un contenedor,
      no un buzón de correo (no se puede abrir).





    -

      **[LATT_MARKED](#constant.latt-marked)** - Este buzón de correo está marcado.
      Esto significa que puede contener nuevos mensajes desde la última
      vez que fue verificado. Este marcador no se proporciona con todos los
      servidores IMAP.





    -

      **[LATT_UNMARKED](#constant.latt-unmarked)** - Este buzón de correo no está
      marcado y no contiene nuevos mensajes. Si
      **[MARKED](#constant.marked)** o **[UNMARKED](#constant.unmarked)** se proporciona,
      se puede asumir que el servidor IMAP soporta esta funcionalidad
      para este buzón de correo.





    -

      **[LATT_REFERRAL](#constant.latt-referral)** - Este contenedor tiene una referencia a un buzón de correo remoto.





    -

      **[LATT_HASCHILDREN](#constant.latt-haschildren)** - Este buzón de correo tiene inferiores seleccionables.





    -

      **[LATT_HASNOCHILDREN](#constant.latt-hasnochildren)** - Este buzón de correo no tiene inferiores seleccionables.


Devuelve **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_getmailboxes()**

&lt;?php
$mbox = imap_open("{imap.example.org}", "username", "password", OP_HALFOPEN)
or die("Conexión imposible: " . imap_last_error());

$list = imap_getmailboxes($mbox, "{imap.example.org}", "\*");
if (is_array($list)) {
    foreach ($list as $key =&gt; $val) {
        echo "($key) ";
echo imap_utf7_decode($val-&gt;name) . ",";
echo "'" . $val-&gt;delimiter . "',";
echo $val-&gt;attributes . "&lt;br /&gt;\n";
}
} else {
echo "imap_getmailboxes ha fallado: " . imap_last_error() . "\n";
}

imap_close($mbox);
?&gt;

### Ver también

    - [imap_getsubscribed()](#function.imap-getsubscribed) - Lista todas las carpetas de correo suscritas

# imap_getsubscribed

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_getsubscribed — Lista todas las carpetas de correo suscritas

### Descripción

**imap_getsubscribed**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $reference, [string](#language.types.string) $pattern): [array](#language.types.array)|[false](#language.types.singleton)

Lista todas las carpetas de correo suscritas.

**imap_getsubscribed()** es idéntico a
[imap_getmailboxes()](#function.imap-getmailboxes), pero solo devuelve las
carpetas de correo a las que el usuario está suscrito.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     reference


       reference debe ser solo el servidor
       en la forma descrita en [imap_open()](#function.imap-open)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     pattern

      Specifies where in the mailbox hierarchy

to start searching.

There are two special characters you can
pass as part of the pattern:
'_' and '%'.
'_' means to return all mailboxes. If you pass
pattern as '\*', you will
get a list of the entire mailbox hierarchy.
'%'
means to return the current level only.
'%' as the pattern
parameter will return only the top level
mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.

### Valores devueltos

Devuelve un array de objetos que contienen información sobre las
carpetas de correo. Cada objeto posee un atributo de
name, que contiene el nombre completo
de la carpeta de correo, delimiter que
es el delimitador jerárquico y attributes.
attributes es una máscara de bits, que contiene :

    -

      **[LATT_NOINFERIORS](#constant.latt-noinferiors)** - Esta carpeta de correo
      no tiene "hijos" (no hay más carpetas de correo debajo de esta).


- **[LATT_NOSELECT](#constant.latt-noselect)** - Esto es solo un contenedor,
  no una carpeta de correo (no se puede abrir).

- **[LATT_MARKED](#constant.latt-marked)** - Esta carpeta de correo está marcada.
  Utilizado únicamente con UW-IMAPD.

- **[LATT_UNMARKED](#constant.latt-unmarked)** - Esta carpeta de correo no está
  marcada. Utilizado únicamente con UW-IMAPD.

- **[LATT_REFERRAL](#constant.latt-referral)** - Este contenedor tiene una referencia a una carpeta de correo remota.

- **[LATT_HASCHILDREN](#constant.latt-haschildren)** - Esta carpeta de correo tiene inferiores seleccionables.

- **[LATT_HASNOCHILDREN](#constant.latt-hasnochildren)** - Esta carpeta de correo no tiene inferiores seleccionables.

La función devuelve **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

# imap_header

(PHP 4, PHP 5, PHP 7)

imap_header — Alias de [imap_headerinfo()](#function.imap-headerinfo)

**Advertencia**Este alias está
_ELIMINADO_ a partir de PHP 8.0.0.

### Descripción

Esta función es un alias de:
[imap_headerinfo()](#function.imap-headerinfo).

# imap_headerinfo

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_headerinfo — Lee la cabecera del mensaje

### Descripción

**imap_headerinfo**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [int](#language.types.integer) $message_num,
    [int](#language.types.integer) $from_length = 0,
    [int](#language.types.integer) $subject_length = 0
): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Recupera la información sobre un número de mensaje dado leyendo sus cabeceras.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje






     from_length


       Número de caracteres para la propiedad fetchfrom.
       Debe ser mayor o igual a 0.






     subject_length


       Número de caracteres para la propiedad fetchsubject.
       Debe ser mayor o igual a 0.






     defaulthost







### Valores devueltos

Devuelve **[false](#constant.false)** en caso de errores o, en caso de éxito, la información en un objeto que contiene las siguientes propiedades:

    -

      "toaddress" : toda la línea de cabecera to: hasta 1024 caracteres



    -

      "to" : un array de objetos de la línea to: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "fromaddress" : toda la línea de cabecera from: hasta 1024 caracteres



    -

      "from" : un array de objetos de la línea From: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "ccaddress" : toda la línea de cabecera cc: hasta 1024 caracteres



    -

      "cc" : un array de objetos de la línea cc: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "bccaddress" : toda la línea de cabecera bcc: hasta 1024 caracteres



    -

      "bcc" : un array de objetos de la línea Bcc: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "reply_toaddress" : toda la línea de cabecera Reply_to: hasta 1024 caracteres



    -

      "reply_to" : un array de objetos de la línea Reply_to: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "senderaddress" : toda la línea de cabecera Sender: hasta 1024 caracteres



    -

      "sender" : un array de objetos de la línea Sender: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      "return_pathaddress" : toda la línea de cabecera Return-path: hasta 1024 caracteres



    -

      "return_path" : un array de objetos de la línea Return-path: con las siguientes propiedades:
      personal, adl,
      mailbox, y host



    -

      remail -



    -

      "date" : La fecha del mensaje, tal como se encuentra en las cabeceras



    -

      "Date" : Idéntico a "date"



    -

      "subject" : El asunto del mensaje



    -

      "Subject" : Idéntico a "subject"



    -

      "in_reply_to" :



    -

      "message_id" :



    -

      "newsgroups" :



    -

      "followup_to" :



    -

      "references" :



    -

      "Recent" : R si el mensaje es reciente y leído, N
      si el mensaje es reciente y no leído, " " si el mensaje no es reciente.



    -

      "Unseen" : U si el mensaje es no leído Y no reciente, " " si el mensaje
      es no leído y reciente



    -

      "Flagged" : F si el mensaje contiene un flag, " " en caso contrario



    -

      "Answered" : A si se ha respondido a este mensaje, " " en caso contrario



    -

      "Deleted" : D si el mensaje está eliminado, " " en caso contrario



    -

      "Draft" : X si el mensaje es un borrador, " " en caso contrario



    -

      "Msgno" : El número del mensaje



    -

      "MailDate" :



    -

      "Size" : El tamaño del mensaje



    -

      "udate" : Fecha de envío del mensaje, en forma de fecha Unix



    -

      "fetchfrom" : Línea "from" formateada para caber en from_length
      caracteres



    -

      "fetchsubject" : Línea "subject" formateada para caber en
      subject_length caracteres


### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       El parámetro defaulthost sin uso ha sido eliminado.



### Ver también

    - [imap_fetch_overview()](#function.imap-fetch-overview) - Lee el resumen de los encabezados de los mensajes

# imap_headers

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_headers — Devuelve los encabezados de todos los mensajes de un buzón de correo

### Descripción

**imap_headers**([IMAP\Connection](#class.imap-connection) $imap): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve los encabezados de todos los mensajes de un buzón de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve un array de strings que contienen los encabezados de los
mensajes: un string por mensaje.
Devuelve **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

# imap_is_open

(PHP 8 &gt;= 8.2.1)

imap_is_open — Verificar si el flujo IMAP sigue siendo válido

### Descripción

**imap_is_open**([IMAP\Connection](#class.imap-connection) $imap): [bool](#language.types.boolean)

Verifica si el flujo IMAP sigue siendo válido.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve **[true](#constant.true)** si el flujo sigue siendo válido, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de imap_is_open()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}INBOX", "username", "password") or die(implode(", ", imap_errors()));
imap_is_open($mbox);
// ...
?&gt;

# imap_last_error

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_last_error — Devuelve el último error ocurrido

### Descripción

**imap_last_error**(): [string](#language.types.string)|[false](#language.types.singleton)

**imap_last_error()** devuelve el texto completo del
último error IMAP (si existe) que
ocurrió durante la última petición. La pila de errores
no se ve afectada. Llamar a **imap_last_error()**
sucesivamente, sin nuevos errores, devolverá el mismo error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el texto completo del último mensaje de error IMAP ocurrido
en la página actual. Devuelve **[false](#constant.false)** si no hay ningún mensaje disponible.

### Ver también

    - [imap_errors()](#function.imap-errors) - Devuelve todos los errores IMAP ocurridos

# imap_list

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_list — Lee la lista de buzones de correo

### Descripción

**imap_list**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $reference, [string](#language.types.string) $pattern): [array](#language.types.array)|[false](#language.types.singleton)

Lee la lista de buzones de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     reference


       reference debería ser solo el servidor
       en la forma descrita en [imap_open()](#function.imap-open)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     pattern

      Specifies where in the mailbox hierarchy

to start searching.

There are two special characters you can
pass as part of the pattern:
'_' and '%'.
'_' means to return all mailboxes. If you pass
pattern as '\*', you will
get a list of the entire mailbox hierarchy.
'%'
means to return the current level only.
'%' as the pattern
parameter will return only the top level
mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.

### Valores devueltos

Devuelve un array que contiene los nombres de los buzones de correo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_list()**

&lt;?php
$mbox = imap_open("{imap.example.org}", "username", "password", OP_HALFOPEN)
or die("Conexión imposible: " . imap_last_error());

$list = imap_list($mbox, "{imap.example.org}", "\*");
if (is_array($list)) {
    foreach ($list as $val) {
        echo imap_utf7_decode($val) . "\n";
}
} else {
echo "imap_list ha fallado: " . imap_last_error() . "\n";
}

imap_close($mbox);
?&gt;

### Ver también

    - [imap_getmailboxes()](#function.imap-getmailboxes) - Lista los buzones de correo y devuelve los detalles de cada uno

    - [imap_lsub()](#function.imap-lsub) - Lista todas las carpetas de correo registradas

# imap_listmailbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_listmailbox — Alias de [imap_list()](#function.imap-list)

### Descripción

Esta función es un alias de:
[imap_list()](#function.imap-list).

# imap_listscan

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_listscan — Lee la lista de buzones de correo y busca una cadena

### Descripción

**imap_listscan**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $reference,
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $content
): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array que contiene los nombres de los buzones de correo
que contienen el string content
en su nombre.

Esta función es similar a [imap_listmailbox()](#function.imap-listmailbox),
pero también verifica la presencia del string content
en los mensajes del buzón de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     reference


       reference debe ser solo el servidor
       en la forma descrita en [imap_open()](#function.imap-open)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     pattern

      Specifies where in the mailbox hierarchy

to start searching.

There are two special characters you can
pass as part of the pattern:
'_' and '%'.
'_' means to return all mailboxes. If you pass
pattern as '\*', you will
get a list of the entire mailbox hierarchy.
'%'
means to return the current level only.
'%' as the pattern
parameter will return only the top level
mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.

     content


       El string buscado





### Valores devueltos

Devuelve un array que contiene los nombres de los buzones de correo
que contienen el string content
en el nombre del buzón de correo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_listmailbox()](#function.imap-listmailbox) - Alias de imap_list

    - [imap_search()](#function.imap-search) - Devuelve un array de mensajes después de la búsqueda

# imap_listsubscribed

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_listsubscribed — Alias de [imap_lsub()](#function.imap-lsub)

### Descripción

Esta función es un alias de:
[imap_lsub()](#function.imap-lsub).

# imap_lsub

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_lsub — Lista todas las carpetas de correo registradas

### Descripción

**imap_lsub**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $reference, [string](#language.types.string) $pattern): [array](#language.types.array)|[false](#language.types.singleton)

Recupera un array que contiene todas las carpetas de correo a las que se ha suscrito.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     reference


       reference debería ser solo el servidor en la forma descrita en [imap_open()](#function.imap-open)



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     pattern

      Specifies where in the mailbox hierarchy

to start searching.

There are two special characters you can
pass as part of the pattern:
'_' and '%'.
'_' means to return all mailboxes. If you pass
pattern as '\*', you will
get a list of the entire mailbox hierarchy.
'%'
means to return the current level only.
'%' as the pattern
parameter will return only the top level
mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.

### Valores devueltos

Devuelve un array que contiene todas las carpetas de correo suscritas, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_list()](#function.imap-list) - Lee la lista de buzones de correo

    - [imap_getmailboxes()](#function.imap-getmailboxes) - Lista los buzones de correo y devuelve los detalles de cada uno

# imap_mail

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mail — Envía un mensaje de correo electrónico

### Descripción

**imap_mail**(
    [string](#language.types.string) $to,
    [string](#language.types.string) $subject,
    [string](#language.types.string) $message,
    [?](#language.types.null)[string](#language.types.string) $additional_headers = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $cc = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $bcc = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $return_path = **[null](#constant.null)**
): [bool](#language.types.boolean)

**imap_mail()** permite enviar correos electrónicos
con una gestión correcta de los destinatarios Cc y Bcc.

Los parámetros to, cc
y bcc son todos strings y son analizados
como listas de direcciones [» RFC822](https://datatracker.ietf.org/doc/html/rfc822).

### Parámetros

     to


       El destinatario






     subject


       El asunto del correo






     message


       El cuerpo del correo; ver la función [imap_mail_compose()](#function.imap-mail-compose).






     additional_headers


       Un string conteniendo los encabezados adicionales a enviar con el correo






     cc








     bcc


       Los destinatarios especificados en el bcc
       recibirán el correo pero son excluidos de los encabezados.






     return_path


       Utilizar este parámetro para especificar el camino de retorno en caso
       de fallo en la entrega del correo. Es útil cuando se utiliza
       PHP como cliente de correo para varios usuarios.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       additional_headers, cc,
       bcc, y return_path son ahora nullable.



### Ver también

    - [mail()](#function.mail) - Envío de correo

    - [imap_mail_compose()](#function.imap-mail-compose) - Crea un mensaje MIME

# imap_mail_compose

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mail_compose — Crea un mensaje MIME

### Descripción

**imap_mail_compose**([array](#language.types.array) $envelope, [array](#language.types.array) $bodies): [string](#language.types.string)|[false](#language.types.singleton)

Crea un mensaje MIME basado en el sobre envelope
y las secciones bodies.

### Parámetros

     envelope


       Un array asociativo que contiene los campos de los encabezados.
       Las claves válidas son: "remail",
       "return_path", "date",
       "from", "reply_to",
       "in_reply_to", "subject",
       "to", "cc",
       "bcc" y "message_id", que
       definen los encabezados respectivos al [string](#language.types.string) dado.
       Para definir encabezados adicionales, la clave
       "custom_headers" es soportada, que espera un array
       de estos encabezados, por ejemplo ["User-Agent: My Mail Client"].






     bodies


       Un array indexado de los cuerpos. El primer cuerpo es el cuerpo principal
       del mensaje; solo si es del tipo **[TYPEMULTIPART](#constant.typemultipart)**,
       los cuerpos siguientes serán tratados; estos cuerpos constituyen los cuerpos de las partes.







        <caption>**Estructura de un Array de un Cuerpo**</caption>



           Clave
           Tipo
           Descripción






           type
           [int](#language.types.integer)

            El tipo MIME.
            Uno de **[TYPETEXT](#constant.typetext)** (por omisión), **[TYPEMULTIPART](#constant.typemultipart)**,
            **[TYPEMESSAGE](#constant.typemessage)**, **[TYPEAPPLICATION](#constant.typeapplication)**,
            **[TYPEAUDIO](#constant.typeaudio)**, **[TYPEIMAGE](#constant.typeimage)**,
            **[TYPEMODEL](#constant.typemodel)** o **[TYPEOTHER](#constant.typeother)**.




           encoding
           [int](#language.types.integer)

            El Content-Transfer-Encoding.
            Uno de **[ENC7BIT](#constant.enc7bit)** (por omisión), **[ENC8BIT](#constant.enc8bit)**,
            **[ENCBINARY](#constant.encbinary)**, **[ENCBASE64](#constant.encbase64)**,
            **[ENCQUOTEDPRINTABLE](#constant.encquotedprintable)** o **[ENCOTHER](#constant.encother)**.




           charset
           [string](#language.types.string)
           El juego de caracteres del parámetro del tipo MIME.



           type.parameters
           [array](#language.types.array)

            Un array asociativo de nombre de parámetro
            Content-Type y sus valores.




           subtype
           [string](#language.types.string)
           El subtipo MIME, e.g. 'jpeg' para **[TYPEIMAGE](#constant.typeimage)**.



           id
           [string](#language.types.string)
           El Content-ID.



           description
           [string](#language.types.string)
           El Content-Description.



           disposition.type
           [string](#language.types.string)
           El Content-Disposition, e.g. 'attachment'.



           disposition
           [array](#language.types.array)

            Un array asociativo de nombre de parámetro
            Content-Disposition y sus valores.




           contents.data
           [string](#language.types.string)
           La carga útil.



           lines
           [int](#language.types.integer)
           El tamaño de la carga útil en líneas.



           bytes
           [int](#language.types.integer)
           El tamaño de la carga útil en bytes.



           md5
           [string](#language.types.string)
           La checksum MD5 de la carga útil.









### Valores devueltos

Devuelve el mensaje MIME como un [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_mail_compose()**

&lt;?php

$envelope["from"]= "joe@example.com";
$envelope["to"] = "foo@example.com";
$envelope["cc"] = "bar@example.com";

$part1["type"] = TYPEMULTIPART;
$part1["subtype"] = "mixed";

$filename = "/tmp/imap.c.gz";
$fp = fopen($filename, "r");
$contents = fread($fp, filesize($filename));
fclose($fp);

$part2["type"] = TYPEAPPLICATION;
$part2["encoding"] = ENCBINARY;
$part2["subtype"] = "octet-stream";
$part2["description"] = basename($filename);
$part2["contents.data"] = $contents;

$part3["type"] = TYPETEXT;
$part3["subtype"] = "plain";
$part3["description"] = "description3";
$part3["contents.data"] = "contents.data3\n\n\n\t";

$body[1] = $part1;
$body[2] = $part2;
$body[3] = $part3;

echo nl2br(imap_mail_compose($envelope, $body));

?&gt;

# imap_mail_copy

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mail_copy — Copia los mensajes especificados en un buzón de correo

### Descripción

**imap_mail_copy**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $message_nums,
    [string](#language.types.string) $mailbox,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Copia los mensajes de correo electrónico especificados por message_nums en el
buzón de correo especificado.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_nums


       message_nums es un intervalo, y no solo
       una lista de números de mensaje (como se describe en la [» RFC2060](https://datatracker.ietf.org/doc/html/rfc2060)).






     mailbox


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     flags


       flags es una máscara, que puede contener uno o varios
       de los siguientes valores:



        -

          **[CP_UID](#constant.cp-uid)** - la secuencia de números contiene UIDS



        -

          **[CP_MOVE](#constant.cp-move)** - Borra los mensajes después de la copia.
          Si este flag está definido, la función se comporta de manera
          idéntica a [imap_mail_move()](#function.imap-mail-move).







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_mail_move()](#function.imap-mail-move) - Mueve mensajes a una caja de correo

# imap_mail_move

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mail_move — Mueve mensajes a una caja de correo

### Descripción

**imap_mail_move**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $message_nums,
    [string](#language.types.string) $mailbox,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

**imap_mail_move()** mueve los mensajes especificados
por message_nums a la caja de correo
mailbox.
Es importante destacar que los mensajes son en realidad _copiados_ a
la caja de correo mailbox, y los mensajes originales
son marcados para ser eliminados. Esto implica que los mensajes en
mailbox son asignados nuevos UIDs.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_nums


       message_nums es un intervalo, y no solo una
       lista de mensajes (como se describe en la [» RFC2060](https://datatracker.ietf.org/doc/html/rfc2060)).






     mailbox


       El nombre de la caja de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     flags


       flags es un campo de bits y puede contener un
       solo valor:



        -

          **[CP_UID](#constant.cp-uid)** - La secuencia de números contiene UIDs







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Notas

**Nota**:

    **imap_mail_move()** marcará el correo electrónico original con
    un marcador de eliminación, para eliminarlo efectivamente, se requiere una llamada a
    [imap_expunge()](#function.imap-expunge).

### Ver también

    - [imap_mail_copy()](#function.imap-mail-copy) - Copia los mensajes especificados en un buzón de correo

# imap_mailboxmsginfo

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mailboxmsginfo — Lee la información sobre el buzón de correo actual

### Descripción

**imap_mailboxmsginfo**([IMAP\Connection](#class.imap-connection) $imap): [stdClass](#class.stdclass)

**imap_mailboxmsginfo()** verifica el estado actual del buzón de correo en el servidor. Es similar al uso de la función
[imap_status()](#function.imap-status), pero también proporciona el tamaño total de los mensajes del buzón de correo, lo que requiere un poco más de tiempo de ejecución.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve un objeto con las siguientes propiedades:

    <caption>**Propiedades del buzón de correo**</caption>



       Date
       Fecha de la última modificación del contenido del buzón de correo (fecha y hora actuales)



       Driver
       Controlador



       Mailbox
       Nombre del buzón de correo



       Nmsgs
       Número de mensajes



       Recent
       Número de mensajes recientes



       Unread
       Número de mensajes no leídos



       Deleted
       Número de mensajes eliminados



       Size
       Tamaño del buzón de correo




### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_mailboxmsginfo()**

&lt;?php

$mbox = imap_open("{imap.example.org}INBOX", "username", "password")
or die("Conexión imposible: " . imap_last_error());

$check = imap_mailboxmsginfo($mbox);

if ($check) {
echo "Fecha : " . $check-&gt;Date . "&lt;br /&gt;\n" ;
echo "Controlador : " . $check-&gt;Driver . "&lt;br /&gt;\n" ;
echo "Buzón de correo : " . $check-&gt;Mailbox . "&lt;br /&gt;\n" ;
echo "Mensajes : " . $check-&gt;Nmsgs . "&lt;br /&gt;\n" ;
echo "Reciente : " . $check-&gt;Recent . "&lt;br /&gt;\n" ;
echo "No leído : " . $check-&gt;Unread . "&lt;br /&gt;\n" ;
echo "Eliminado : " . $check-&gt;Deleted . "&lt;br /&gt;\n" ;
echo "Tamaño : " . $check-&gt;Size . "&lt;br /&gt;\n" ;
} else {
echo "imap_mailboxmsginfo() ha fallado: " . imap_last_error() . "&lt;br /&gt;\n";
}

imap_close($mbox);

?&gt;

# imap_mime_header_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_mime_header_decode — Decodifica los elementos MIME de un encabezado

### Descripción

**imap_mime_header_decode**([string](#language.types.string) $string): [array](#language.types.array)|[false](#language.types.singleton)

Decodifica un mensaje MIME que contiene datos no ASCII
(ver [» RFC2047](https://datatracker.ietf.org/doc/html/rfc2047)).

### Parámetros

     string


       El texto MIME





### Valores devueltos

Los elementos decodificados se devuelven en un array
de objetos. Cada uno de estos objetos tiene dos propiedades:
charset y text.

Si el elemento no ha sido codificado, o, en otras palabras,
si está en claro (plain US_ASCII), la propiedad charset
se establece en default.

Esta función devuelve **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_mime_header_decode()**

&lt;?php
$text = "=?ISO-8859-1?Q?Keld_J=F8rn_Simonsen?= &lt;keld@example.com&gt;";

$elements = imap_mime_header_decode($text);
for ($i=0; $i&lt;count($elements); $i++) {
    echo "Charset : {$elements[$i]-&gt;charset}\n";
echo "Texto : {$elements[$i]-&gt;text}\n\n";
}
?&gt;

    El ejemplo anterior mostrará:

Charset: ISO-8859-1
Texto: Keld Jørn Simonsen

Charset: default
Texto: &lt;keld@example.com&gt;

En el ejemplo anterior, se encuentran dos elementos: el primero
ha sido codificado en ISO-8859-1, y el segundo está en claro.

### Ver también

    - [imap_utf8()](#function.imap-utf8) - Convierte texto en formato MIME a UTF-8

# imap_msgno

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_msgno — Devuelve el número de secuencia del mensaje para un UID dado

### Descripción

**imap_msgno**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_uid): [int](#language.types.integer)

Devuelve el número de secuencia del mensaje para el UID message_uid.

Esta función es el inverso de la función [imap_uid()](#function.imap-uid).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_uid


       El UID del mensaje





### Valores devueltos

Devuelve el número de secuencia del mensaje para el UID message_uid.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_uid()](#function.imap-uid) - Devuelve el UID de un mensaje

# imap_mutf7_to_utf8

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

imap_mutf7_to_utf8 — Decodifica una string UTF-7 modificado en UTF-8

### Descripción

**imap_mutf7_to_utf8**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Decodifica una [string](#language.types.string) UTF-7 modificado (como se especifica en la RFC 2060, sección 5.1.3) en UTF-8.

**Nota**:

    Esta función solo está disponible si libcclient exporta utf8_to_mutf7().

### Parámetros

    string


      Una [string](#language.types.string) codificada en UTF-7 modificado.


### Valores devueltos

Devuelve string convertida en UTF-8,
o **[false](#constant.false)** si ocurre un error.

### Ver también

- [imap_utf8_to_mutf7()](#function.imap-utf8-to-mutf7) - Codifica una string UTF-8 en UTF-7 modificado

# imap_num_msg

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_num_msg — Devuelve el número de mensajes en el buzón de correo actual

### Descripción

**imap_num_msg**([IMAP\Connection](#class.imap-connection) $imap): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de mensajes en el buzón de correo actual.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve el número de mensajes en el buzón de correo actual,
en forma de un [int](#language.types.integer), o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_num_recent()](#function.imap-num-recent) - Devuelve el número de mensajes recientes en el buzón de correo actual

    - [imap_status()](#function.imap-status) - Devuelve la información de estado sobre un buzón de correo

# imap_num_recent

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_num_recent — Devuelve el número de mensajes recientes en el buzón de correo actual

### Descripción

**imap_num_recent**([IMAP\Connection](#class.imap-connection) $imap): [int](#language.types.integer)

Devuelve el número de mensajes recientes en el buzón de correo actual.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve el número de mensajes recientes en el buzón de correo actual, en forma de un [int](#language.types.integer).

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_num_msg()](#function.imap-num-msg) - Devuelve el número de mensajes en el buzón de correo actual

    - [imap_status()](#function.imap-status) - Devuelve la información de estado sobre un buzón de correo

# imap_open

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_open — Abre un flujo IMAP hacia un buzón de correo

### Descripción

**imap_open**(
    [string](#language.types.string) $mailbox,
    [string](#language.types.string) $user,
    [string](#language.types.string) $password,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $retries = 0,
    [array](#language.types.array) $options = []
): [IMAP\Connection](#class.imap-connection)|[false](#language.types.singleton)

Abre un flujo IMAP hacia el buzón de correo
mailbox.

Esta función también puede ser utilizada para abrir flujos en servidores POP3 y NNTP,
pero algunas funciones y características solo están disponibles con servidores IMAP.

### Parámetros

     mailbox


       Un nombre de buzón de correo está compuesto por una dirección de servidor y una dirección de buzón en ese servidor. La palabra reservada
       INBOX representa el buzón de correo del usuario actual. Los nombres de buzones de correo que contienen caracteres especiales (fuera del espacio ASCII) deben ser codificados con [imap_utf7_encode()](#function.imap-utf7-encode).



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

       La dirección del servidor, entre llaves '{' y '}', está compuesta por el nombre del servidor o su dirección IP, una especificación de protocolo
       (comenzando por '/') y un puerto opcional (especificado con ':').




       Esta parte es obligatoria en los parámetros del buzón de correo.




       Todos los nombres que comienzan con { son nombres remotos y tienen la forma "{" nombre_sistema_remoto [":" puerto] [flags] "}"
       [nombre_buzon] donde :



        -

          remote_system_name : Nombre de dominio de Internet o una
          dirección IP de servidor entre comillas.



        -

          puerto : número de puerto TCP (opcional),
          el valor por defecto es el valor del puerto para este servicio.



        -

          flags : opciones, ver la tabla siguiente.



        -

          mailbox_name : nombre del buzón remoto, por defecto : INBOX









        <caption>**Flags opcionales para los nombres**</caption>



           Flag
           Descripción






           /service=*service*
           servicio para el acceso al buzón, por defecto : "imap"



           /user=*user*
           nombre del usuario remoto para la identificación en el servidor



           /authuser=*user*
           usuario remoto de identificación; si se especifica, este será el nombre del usuario
            cuya contraseña se utiliza (e.g. administrador)



           /anonymous
           acceso remoto anónimo



           /debug
           la telemetría de registro del protocolo en los logs de depuración de
            la aplicación



           /secure
           no transmite una contraseña en claro a través de la red



           /imap, /imap2,
            /imap2bis, /imap4,
            /imap4rev1
           equivalente a /service=imap



           /pop3
           equivalente a /service=pop3



           /nntp
           equivalente a /service=nntp



           /norsh
           no utilizar rsh o ssh para establecer una sesión de pre identificación
            IMAP



           /ssl
           utiliza Secure Socket Layer para cifrar la
            sesión



           /validate-cert
           valida los certificados desde el servidor TLS/SSL (es el comportamiento por
            defecto)



           /novalidate-cert
           no valida los certificados desde el servidor TLS/SSL, necesario si
            el servidor utiliza certificados autofirmados



           /tls
           fuerza el uso de start-TLS para cifrar la sesión y
            rechaza las conexiones a los servidores que no lo soportan



           /notls
           no utiliza start-TLS para cifrar la sesión,
            incluso con los servidores que lo soportan



           /readonly
           solicita acceso de solo lectura en el buzón (solo IMAP; ignorado en
            NNTP, y un error con SMTP y POP3)










     user


       El nombre de usuario






     password


       La contraseña asociada con el usuario user






     flags


       flags es una máscara de bits, que puede tomar uno o
       varios de los siguientes valores :



        -

          **[OP_READONLY](#constant.op-readonly)** : Abre un buzón de correo en modo de solo lectura



        -

          **[OP_ANONYMOUS](#constant.op-anonymous)** : No utilizar, o modificar el fichero
          .newsrc para las noticias (solo NNTP)



        -

          **[OP_HALFOPEN](#constant.op-halfopen)** : Para los nombres IMAP y NNTP,
          abre una conexión pero no abre un buzón de correo.



        -

          **[CL_EXPUNGE](#constant.cl-expunge)** : Elimina automáticamente el buzón de correo
          de la lista, al finalizar el flujo (ver también
          [imap_delete()](#function.imap-delete) y
          [imap_expunge()](#function.imap-expunge))



        -

          **[OP_DEBUG](#constant.op-debug)** : negociaciones de depuración del protocolo



        -

          **[OP_SHORTCACHE](#constant.op-shortcache)** : Caché corta (elt solamente)



        -

          **[OP_SILENT](#constant.op-silent)** : No transmitir los eventos (uso
          interno)



        -

          **[OP_PROTOTYPE](#constant.op-prototype)** : Devuelve el prototipo del controlador



        -

          **[OP_SECURE](#constant.op-secure)** : No realizar identificaciones no seguras








     retries


       El número máximo de intentos de conexión.






     options


       Parámetros de conexión; las claves pueden ser utilizadas para
       definir uno o varios parámetros de conexión :



        -

          DISABLE_AUTHENTICATOR - Desactiva las propiedades de autenticación







### Valores devueltos

Devuelve una instancia de [IMAP\Connection](#class.imap-connection)
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [IMAP\Connection](#class.imap-connection) ;
       anteriormente, un [resource](#language.types.resource) era devuelto.



### Ejemplos

    **Ejemplo #1 Diferentes usos de imap_open()**

&lt;?php
// Para conectarse a un servidor IMAP funcionando en el puerto 143 de la
// máquina local, haga esto :
$mbox = imap_open("{localhost:143}INBOX", "user_id", "password");

// Para conectarse a un servidor POP3 funcionando en el puerto 110 del
// servidor local, haga esto :
$mbox = imap_open ("{localhost:110/pop3}INBOX", "user_id", "password");

// Para conectarse a un servidor SSL IMAP o POP3, añada /ssl
// después de la especificación del protocolo :
$mbox = imap_open ("{localhost:993/imap/ssl}INBOX", "user_id", "password");

// Para conectarse a un servidor SSL IMAP o POP3 con un certificado autofirmado
// añada /ssl/novalidate-cert después del protocolo :
$mbox = imap_open ("{localhost:995/pop3/ssl/novalidate-cert}", "user_id", "password");

// Para conectarse a un servidor NNTP que funciona en
// el puerto 119 de la máquina local se puede utilizar el comando:
$nntp = imap_open ("{localhost:119/nntp}comp.test", "", "");

// Para conectarse a un servidor remoto, reemplace "localhost" por
// el nombre o la dirección IP de la máquina.
?&gt;

    **Ejemplo #2 Ejemplo con imap_open()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}", "username", "password");

echo "&lt;h1&gt;Buzones de correo&lt;/h1&gt;\n";
$folders = imap_listmailbox($mbox, "{imap.example.org:143}", "\*");

if ($folders == false) {
    echo "Llamada fallida&lt;br /&gt;\n";
} else {
    foreach ($folders as $val) {
echo $val . "&lt;br /&gt;\n";
&lt;/foreach&gt;
}

echo "&lt;h1&gt;Encabezados en INBOX&lt;/h1&gt;\n";
$headers = imap_headers($mbox);

if ($headers == false) {
    echo "Llamada fallida&lt;br /&gt;\n";
} else {
    foreach ($headers as $val) {
echo $val . "&lt;br /&gt;\n";
}
}

imap_close($mbox);
?&gt;

### Ver también

    - [imap_close()](#function.imap-close) - Termina un flujo IMAP

# imap_ping

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_ping — Verifica que el flujo IMAP sigue activo

### Descripción

**imap_ping**([IMAP\Connection](#class.imap-connection) $imap): [bool](#language.types.boolean)

Verifica que el flujo sigue activo, enviándole un ping. Esta
función permite darse cuenta de que ha llegado un correo electrónico: es incluso
el método recomendado para pruebas periódicas de verificación del correo.
Esta función también puede servir para mantener una conexión abierta,
con los servidores que tienen un tiempo de expiración.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

### Valores devueltos

Devuelve **[true](#constant.true)** si el flujo sigue activo, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_ping()**

&lt;?php

$imap = imap_open("{imap.example.org}", "mailadmin", "password");

// después de una pausa
if (!imap_ping($imap)) {
// realice un proceso para reconectar
}

?&gt;

# imap_qprint

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_qprint — Convierte una string con comillas en una string de 8 bits

### Descripción

**imap_qprint**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Convierte la string con comillas string
en una string de 8 bits (según la [» RFC2045](https://datatracker.ietf.org/doc/html/rfc2045),
sección 6.7).

### Parámetros

     string


       Una string con comillas





### Valores devueltos

Devuelve una [string](#language.types.string) de 8 bits, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [imap_8bit()](#function.imap-8bit) - Convierte un string de 8 bits en un string codificado en Quoted-Printable

# imap_rename

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_rename — Alias de [imap_renamemailbox()](#function.imap-renamemailbox)

### Descripción

Esta función es un alias de:
[imap_renamemailbox()](#function.imap-renamemailbox).

# imap_renamemailbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_renamemailbox — Renombra un buzón de correo

### Descripción

**imap_renamemailbox**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $from, [string](#language.types.string) $to): [bool](#language.types.boolean)

**imap_renamemailbox()** renombra el buzón de correo
from a to
(ver la función [imap_open()](#function.imap-open) para el formato de los nombres
mbox).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     from


       El antiguo nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     to


       El nuevo nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_createmailbox()](#function.imap-createmailbox) - Crea un nuevo buzón de correo

    - [imap_deletemailbox()](#function.imap-deletemailbox) - Borra una boîte aux lettres

# imap_reopen

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_reopen — Reabre un flujo IMAP hacia una nueva caja de correo

### Descripción

**imap_reopen**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $mailbox,
    [int](#language.types.integer) $flags = 0,
    [int](#language.types.integer) $retries = 0
): [bool](#language.types.boolean)

Reabre la conexión especificada al servidor IMAP
o NNTP, con una nueva caja de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre de la caja de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     flags


       flags es una máscara de bits, que puede contener los siguientes valores:



        -

          **[OP_READONLY](#constant.op-readonly)** - Abre una caja de correo en modo de solo lectura



        -

          **[OP_ANONYMOUS](#constant.op-anonymous)** - No utilizar, o modificar el fichero
          .newsrc para las noticias (NNTP únicamente)



        -

          **[OP_HALFOPEN](#constant.op-halfopen)** - Para los nombres IMAP y NNTP,
          abre una conexión pero no abre una caja de correo.



        -

          **[OP_EXPUNGE](#constant.op-expunge)** - Elimina silenciosamente el flujo reciclado



        -

          **[CL_EXPUNGE](#constant.cl-expunge)** - Elimina automáticamente la caja de correo de la lista,
          al finalizar el flujo. (ver [imap_delete()](#function.imap-delete) y
          [imap_expunge()](#function.imap-expunge)).








     retries


       El número máximo de intentos de conexión





### Valores devueltos

Devuelve **[true](#constant.true)** si el flujo es reabierto, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_reopen()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}INBOX", "username", "password") or die(implode(", ", imap_errors()));
// ...
imap_reopen($mbox, "{imap.example.org:143}INBOX.Sent") or die(implode(", ", imap_errors()));
// ..
?&gt;

# imap_rfc822_parse_adrlist

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_rfc822_parse_adrlist — Analiza una dirección de correo electrónico

### Descripción

**imap_rfc822_parse_adrlist**([string](#language.types.string) $string, [string](#language.types.string) $default_hostname): [array](#language.types.array)

Analiza la cadena address,
tal como se define en la [» RFC2822](https://datatracker.ietf.org/doc/html/rfc2822).

### Parámetros

     string


       Un string que contiene las direcciones






     default_hostname


       El nombre del host por omisión





### Valores devueltos

Devuelve un array de objetos. Las propiedades de los objetos son:

    -

      "mailbox" : El nombre del buzón de correo (nombre de usuario)



    -

      "host" : El nombre del host



    -

      "personal" : El nombre personal



    -

      "adl" : at domain source route (NDT : ???)


### Ejemplos

    **Ejemplo #1 Ejemplo con imap_rfc822_parse_adrlist()**

&lt;?php

$address_string = "Joe Doe &lt;doe@example.com&gt;, postmaster@example.com, root";
$address_array = imap_rfc822_parse_adrlist($address_string, "example.com");
if (!is_array($address_array) || count($address_array) &lt; 1) {
die("¡Error!\n");
}

foreach ($address_array as $id =&gt; $val) {
echo "# $id\n";
echo " Buzón : " . $val-&gt;mailbox . "\n";
echo " Host : " . $val-&gt;host . "\n";
echo " Nombre : " . $val-&gt;personal . "\n";
echo " adl : " . $val-&gt;adl . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

# 0

Buzón : doe
Host : example.com
Nombre : Joe Doe
adl :

# 1

Buzón : postmaster
Host : example.com
Nombre :
adl :

# 2

Buzón : root
Host : example.com
Nombre :
adl :

### Ver también

    - [imap_rfc822_parse_headers()](#function.imap-rfc822-parse-headers) - Analiza un encabezado de correo electrónico

# imap_rfc822_parse_headers

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_rfc822_parse_headers — Analiza un encabezado de correo electrónico

### Descripción

**imap_rfc822_parse_headers**([string](#language.types.string) $headers, [string](#language.types.string) $default_hostname = "UNKNOWN"): [stdClass](#class.stdclass)

Analiza la cadena headers y devuelve un objeto que contiene
diferentes elementos, similares a la función
[imap_header()](#function.imap-header).

### Parámetros

     headers


       Los datos a analizar






     default_hostname


       El nombre del host por defecto





### Valores devueltos

Devuelve un objeto similar al devuelto por la función
[imap_header()](#function.imap-header), excepto por los flags
y otras propiedades que provienen del servidor IMAP.

### Ver también

    - [imap_rfc822_parse_adrlist()](#function.imap-rfc822-parse-adrlist) - Analiza una dirección de correo electrónico

# imap_rfc822_write_address

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_rfc822_write_address — Devuelve una dirección de correo electrónico formateada correctamente

### Descripción

**imap_rfc822_write_address**([string](#language.types.string) $mailbox, [string](#language.types.string) $hostname, [string](#language.types.string) $personal): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una dirección de correo electrónico formateada correctamente según la [» RFC2822](https://datatracker.ietf.org/doc/html/rfc2822).

### Parámetros

     mailbox


       El nombre del buzón de correo, consulte la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     hostname


       La parte del host del correo electrónico






     personal


       El nombre del propietario de la cuenta





### Valores devueltos

Devuelve una dirección de correo electrónico formateada correctamente según la
[» RFC2822](https://datatracker.ietf.org/doc/html/rfc2822), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_rfc822_write_address()**

&lt;?php
echo imap_rfc822_write_address("hartmut", "example.com", "Hartmut Holzgraefe");
?&gt;

    El ejemplo anterior mostrará:

Hartmut Holzgraefe &lt;hartmut@example.com&gt;

# imap_savebody

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

imap_savebody — Guarda una parte específica del cuerpo en un fichero

### Descripción

**imap_savebody**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [resource](#language.types.resource)|[string](#language.types.string)|[int](#language.types.integer) $file,
    [int](#language.types.integer) $message_num,
    [string](#language.types.string) $section = "",
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Guarda una parte del cuerpo del mensaje especificado.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     file


       La ruta hacia el fichero de guardado, en forma de una [string](#language.types.string)
       o un descriptor de fichero válido devuelto por la función
       [fopen()](#function.fopen).






     message_num


       El número del mensaje






     section


       El número de la sección. Es una [string](#language.types.string) de enteros, delimitados por
       una coma que corresponden al índice en la lista de secciones
       del cuerpo, tal como se prevé en la especificación IMAP4.






     flags


       Una máscara que contiene una o más de las siguientes valores:



        -

          **[FT_UID](#constant.ft-uid)** - El número message_num es un UID



        -

          **[FT_PEEK](#constant.ft-peek)** - No definir el flag \Seen si no está ya definido



        -

          **[FT_INTERNAL](#constant.ft-internal)** - La [string](#language.types.string) devuelta está en un formato interno, que
          no corresponde a CRLF.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_fetchbody()](#function.imap-fetchbody) - Devuelve una sección extraída del cuerpo de un mensaje

# imap_scan

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_scan — Alias de [imap_listscan()](#function.imap-listscan)

### Descripción

Esta función es un alias de:
[imap_listscan()](#function.imap-listscan).

# imap_scanmailbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_scanmailbox — Alias de [imap_listscan()](#function.imap-listscan)

### Descripción

Esta función es un alias de:
[imap_listscan()](#function.imap-listscan).

# imap_search

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_search — Devuelve un array de mensajes después de la búsqueda

### Descripción

**imap_search**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $criteria,
    [int](#language.types.integer) $flags = **[SE_FREE](#constant.se-free)**,
    [string](#language.types.string) $charset = ""
): [array](#language.types.array)|[false](#language.types.singleton)

Realiza una búsqueda en el buzón de correo actual, en el flujo
IMAP actual.

Por ejemplo, para buscar los mensajes no respondidos, enviados
por mamá, se puede utilizar: "UNANSWERED FROM mamá". Las búsquedas
parecen no distinguir entre mayúsculas y minúsculas. Esta lista de criterios
proviene del código de un cliente C UW y puede ser incompleta o
imprecisa. (ver también la [» RFC1176](https://datatracker.ietf.org/doc/html/rfc1176), y
en particular, la sección "tag SEARCH search_criteria").

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     criteria


       Un [string](#language.types.string), delimitado por espacios, en el que se aceptan los siguientes
       palabras clave. Todos los argumentos de varias palabras (e.g.
       FROM "joey smith") deben colocarse entre comillas.
       Los resultados deben coincidir con todas las entradas
       criteria.



        -

          ALL - devuelve todos los mensajes que cumplen con el resto del criterio.



        -

          ANSWERED - todos los mensajes con el flag \\ANSWERED



        -

          BCC "string" - todos los mensajes con la cadena "string" en el
          campo Bcc



        -

          BEFORE "date" - todos los mensajes con Date: antes de "date"



        -

          BODY "string" - todos los mensajes con "string" en el cuerpo



        -

          CC "string" - todos los mensajes con "string" en el campo Cc



        -

          DELETED - todos los mensajes borrados



        -

          FLAGGED - todos los mensajes con el flag \\FLAGGED (a veces
          interpretado como Importante o Urgente)



        -

          FROM "string" - todos los mensajes con la cadena "string" en el
          campo From



        -

          KEYWORD "string" - todos los mensajes con la cadena "string" como palabra clave



        -

          NEW - todos los mensajes nuevos



        -

          OLD - todos los mensajes antiguos



        -

          ON "date" - todos los mensajes con la fecha "date" como campo Date



        -

          RECENT - todos los mensajes con el flag \\RECENT



        -

          SEEN - todos los mensajes leídos (con el flag\\SEEN flag)



        -

          SINCE "date" - todos los mensajes con la fecha Date: después de "date"



        -

          SUBJECT "string" - todos los mensajes con la cadena "string"
          en el campo Subject



        -

          TEXT "string" - todos los mensajes con el texto "string"



        -

          TO "string" - todos los mensajes con la cadena "string" en el
          campo To



        -

          UNANSWERED - todos los mensajes no respondidos



        -

          UNDELETED - todos los mensajes no borrados



        -

          UNFLAGGED - todos los mensajes no marcados



        -

          UNKEYWORD "string" - todos los mensajes que no contienen la palabra clave "string"



        -

          UNSEEN - todos los mensajes no leídos








     flags


       Los valores para flags son **[SE_UID](#constant.se-uid)**, que hace que el array de respuesta
       contenga los UID en lugar de los números de secuencia.






     charset


       Conjunto de caracteres MIME a utilizar durante la búsqueda de [string](#language.types.string).





### Valores devueltos

Devuelve un array de números de mensajes o de UID.

Devuelve **[false](#constant.false)** si la búsqueda no es comprendida, o bien si ningún
mensaje ha sido encontrado.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo con imap_search()**

&lt;?php
$imap = imap_open('{imap.example.com:993/imap/ssl}INBOX', 'foo@example.com', 'pass123', OP_READONLY);

$some   = imap_search($imap, 'SUBJECT "HOWTO be Awesome" SINCE "8 August 2008"', SE_UID);
$msgnos = imap_search($imap, 'ALL');
$uids   = imap_search($imap, 'ALL', SE_UID);

print_r($some);
print_r($msgnos);
print_r($uids);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 4
[1] =&gt; 6
[2] =&gt; 11
)
Array
(
[0] =&gt; 1
[1] =&gt; 2
[2] =&gt; 3
[3] =&gt; 4
[4] =&gt; 5
[5] =&gt; 6
)
Array
(
[0] =&gt; 1
[1] =&gt; 4
[2] =&gt; 6
[3] =&gt; 8
[4] =&gt; 11
[5] =&gt; 12
)

### Ver también

    - [imap_listscan()](#function.imap-listscan) - Lee la lista de buzones de correo y busca una cadena

# imap_set_quota

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

imap_set_quota — Modifica el cupo de un buzón de correo

### Descripción

**imap_set_quota**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $quota_root, [int](#language.types.integer) $mailbox_size): [bool](#language.types.boolean)

Modifica el cupo del buzón de correo quota_root.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     quota_root


       El buzón de correo cuyo cupo debe ser modificado. Debe seguir
       el formato estándar IMAP para un buzón de correo:
       user.name.






     mailbox_size


       El tamaño máximo (en KB) para el buzón quota_root





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_set_quota()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}", "mailadmin", "password");

if (!imap_set_quota($mbox, "user.kalowsky", 3000)) {
echo "Fallo al definir el cupo\n";
return;
}

imap_close($mbox);
?&gt;

### Notas

[imap_get_quota()](#function.imap-get-quota) actualmente solo funciona con
las bibliotecas c-client2000.

**imap_set_quota()**
requiere que imap haya sido
abierto con una cuenta de administrador, para tener los derechos
necesarios: no funcionará con ningún otro
usuario.

### Ver también

    - [imap_open()](#function.imap-open) - Abre un flujo IMAP hacia un buzón de correo

    - [imap_get_quota()](#function.imap-get-quota) - Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos

# imap_setacl

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imap_setacl — Modifica el ACL de la bandeja de entrada

### Descripción

**imap_setacl**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $mailbox,
    [string](#language.types.string) $user_id,
    [string](#language.types.string) $rights
): [bool](#language.types.boolean)

Define el ACL para la bandeja de entrada dada.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre de la bandeja de entrada, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     user_id


       El identificador del usuario cuyos derechos se desean definir.






     rights


       Los derechos a otorgar al usuario. Pasar una cadena vacía borrará el ACL.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Notas

Esta función está actualmente disponible solo para los usuarios de la biblioteca
c-client2000 o superior.

### Ver también

    - [imap_getacl()](#function.imap-getacl) - Devuelve el ACL para el buzón

# imap_setflag_full

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_setflag_full — Establece un flag en un mensaje

### Descripción

**imap_setflag_full**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [string](#language.types.string) $sequence,
    [string](#language.types.string) $flag,
    [int](#language.types.integer) $options = 0
): [true](#language.types.singleton)

**imap_setflag_full()** asigna el
flag especificado a los mensajes de la
sequence dada.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     sequence


       Una secuencia de números de mensajes. Los mensajes deseados pueden ser enumerados con la sintaxis X,Y, o
       recuperar todos los mensajes de un intervalo con la sintaxis
       X:Y






     flag


       Los flags que pueden ser modificados son \Seen,
       \Answered, \Flagged,
       \Deleted, y \Draft (como se define en
       la [» RFC2060](https://datatracker.ietf.org/doc/html/rfc2060)).






     options


       options es una máscara de bits, que acepta
       únicamente el siguiente valor:



        -

          **[ST_UID](#constant.st-uid)** - la secuencia contiene UID en lugar de
          números de secuencia.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [ValueError](#class.valueerror) si el argumento options es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       Una excepción [ValueError](#class.valueerror) es ahora lanzada
       para valores de argumento options inválidos. Anteriormente,
       se emitía una advertencia y la función devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con imap_setflag_full()**

&lt;?php
$mbox = imap_open("{imap.example.org:143}", "username", "password")
or die("Conexión imposible: " . imap_last_error());

$status = imap_setflag_full($mbox, "2,5", "\\Seen \\Flagged");

echo gettype($status) . "\n";
echo $status . "\n";

imap_close($mbox);
?&gt;

### Ver también

    - [imap_clearflag_full()](#function.imap-clearflag-full) - Elimina un flag en un mensaje

# imap_sort

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_sort — Ordena mensajes

### Descripción

**imap_sort**(
    [IMAP\Connection](#class.imap-connection) $imap,
    [int](#language.types.integer) $criteria,
    [bool](#language.types.boolean) $reverse,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[string](#language.types.string) $search_criteria = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $charset = **[null](#constant.null)**
): [array](#language.types.array)|[false](#language.types.singleton)

Recupera y ordena los números de mensajes en función de los parámetros dados.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     criteria


       Los criterios criteria pueden ser
       uno (y solo uno) de los siguientes:



        -

          **[SORTDATE](#constant.sortdate)** : fecha del mensaje



        -

          **[SORTARRIVAL](#constant.sortarrival)** : fecha de llegada



        -

          **[SORTFROM](#constant.sortfrom)** : nombre del primer buzón
          de la dirección de origen (From address)



        -

          **[SORTSUBJECT](#constant.sortsubject)** : asunto del mensaje



        -

          **[SORTTO](#constant.sortto)** : nombre del primer buzón
          de destino (To address)



        -

          **[SORTCC](#constant.sortcc)** : nombre del buzón de
          copia oculta (cc address)



        -

          **[SORTSIZE](#constant.sortsize)** : tamaño del mensaje en bytes








     reverse


       Si se debe ordenar en orden inverso.






     flags


       Los flags son máscaras de bits,
       de uno o más de los siguientes elementos:



        -

          **[SE_UID](#constant.se-uid)** : devuelve UID en lugar de números



        -

          **[SE_NOPREFETCH](#constant.se-noprefetch)** : no predescargar los mensajes encontrados








     search_criteria


       Criterios de búsqueda en formato IMAP2. Para más detalles ver
       [imap_search()](#function.imap-search).






     charset


       Conjunto de caracteres MIME a utilizar durante la búsqueda de [string](#language.types.string).





### Valores devueltos

Devuelve un array de números de mensajes ordenados en función
de los parámetros proporcionados, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

      8.0.0

       reverse es un [bool](#language.types.boolean) en lugar de [int](#language.types.integer).




      8.0.0

       search_criteria y charset son ahora nullable.



# imap_status

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_status — Devuelve la información de estado sobre un buzón de correo

### Descripción

**imap_status**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox, [int](#language.types.integer) $flags): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Devuelve la información de estado sobre el buzón de correo mailbox.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

     flags


       Los flags válidos son:



        -

          **[SA_MESSAGES](#constant.sa-messages)** - establece el valor de
          $status-&gt;messages al número de mensajes en el buzón de correo.



        -

          **[SA_RECENT](#constant.sa-recent)** - establece el valor de $status-&gt;recent
          al número de mensajes recientes en el buzón de correo.



        -

          **[SA_UNSEEN](#constant.sa-unseen)** - establece el valor de $status-&gt;unseen
          al número de mensajes no leídos en el buzón de correo.



        -

          **[SA_UIDNEXT](#constant.sa-uidnext)** - establece el valor de $status-&gt;uidnext
          al siguiente valor de uid que será utilizado.



        -

          **[SA_UIDVALIDITY](#constant.sa-uidvalidity)** - establece el valor de
          $status-&gt;uidvalidity a una constante, que cambia cuando el uid del
          buzón de correo ya no es válido.



        -

          **[SA_ALL](#constant.sa-all)** - establece todos los valores anteriores.







### Valores devueltos

Esta función devuelve un objeto que contiene la información de estado, o **[false](#constant.false)** si ocurre un error.
El objeto tiene las siguientes propiedades: messages,
recent, unseen,
uidnext, y uidvalidity.

flags también está definido, que contiene una máscara
con una de las constantes anteriores.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_status()**

&lt;?php
$mbox = imap_open("{imap.example.com}", "username", "password", OP_HALFOPEN)
or die("Conexión imposible : " . imap_last_error());

$status = imap_status($mbox, "{imap.example.org}INBOX", SA_ALL);
if ($status) {
echo "Mensajes : " . $status-&gt;messages . "&lt;br /&gt;\n";
echo "Reciente : " . $status-&gt;recent . "&lt;br /&gt;\n";
echo "No leído : " . $status-&gt;unseen . "&lt;br /&gt;\n";
echo "Próximo UID: " . $status-&gt;uidnext . "&lt;br /&gt;\n";
echo "Validez del UID: " . $status-&gt;uidvalidity . "&lt;br /&gt;\n";
} else {
echo "imap_status ha fallado : " . imap_last_error() . "\n";
}

imap_close($mbox);
?&gt;

# imap_subscribe

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_subscribe — Suscribe a un buzón de correo

### Descripción

**imap_subscribe**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [bool](#language.types.boolean)

Suscribe a un buzón de correo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_unsubscribe()](#function.imap-unsubscribe) - Termina la suscripción a un buzón de correo

# imap_thread

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imap_thread — Devuelve el árbol de mensajes organizados por hilo

### Descripción

**imap_thread**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $flags = **[SE_FREE](#constant.se-free)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve el árbol de mensajes organizados por hilo.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     flags







### Valores devueltos

**imap_thread()** devuelve un array asociativo que contiene
un árbol de mensajes organizados por hilo por REFERENCES
o **[false](#constant.false)** en caso de error.

Cada mensaje en el buzón actual será representado por entradas
en forma de árbol en el array resultante:

    -
     $thread["XX.num"] - número del mensaje actual




    -
     $thread["XX.next"]




    -
     $thread["XX.branch"]

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_thread()**

&lt;?php

// Aquí, se muestran los hilos de un newsgroup en HTML

$nntp = imap_open('{news.example.com:119/nntp}some.newsgroup', '', '');
$threads = imap_thread($nntp);

foreach ($threads as $key =&gt; $val) {
  $tree = explode('.', $key);
  if ($tree[1] == 'num') {
$header = imap_headerinfo($nntp, $val);
    echo "&lt;ul&gt;\n\t&lt;li&gt;" . $header-&gt;fromaddress . "\n";
  } elseif ($tree[1] == 'branch') {
echo "\t&lt;/li&gt;\n&lt;/ul&gt;\n";
}
}

imap_close($nntp);

?&gt;

# imap_timeout

(PHP 4 &gt;= 4.3.3, PHP 5, PHP 7, PHP 8)

imap_timeout — Configura o devuelve el timeout

### Descripción

**imap_timeout**([int](#language.types.integer) $timeout_type, [int](#language.types.integer) $timeout = -1): [int](#language.types.integer)|[bool](#language.types.boolean)

Define o devuelve el timeout imap.

### Parámetros

     timeout_type


       Un valor entre los siguientes:
       **[IMAP_OPENTIMEOUT](#constant.imap-opentimeout)**,
       **[IMAP_READTIMEOUT](#constant.imap-readtimeout)**,
       **[IMAP_WRITETIMEOUT](#constant.imap-writetimeout)**, o
       **[IMAP_CLOSETIMEOUT](#constant.imap-closetimeout)**.






     timeout


       El timeout, en segundos.





### Valores devueltos

Si el argumento timeout está definido, esta función
devuelve **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** si ocurre un error.

Si timeout no se proporciona o si se evalúa a -1,
el timeout actual será devuelto como un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con imap_timeout()**

&lt;?php

echo "El timeout actual es " . imap_timeout(IMAP_READTIMEOUT) . "\n";

?&gt;

# imap_uid

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_uid — Devuelve el UID de un mensaje

### Descripción

**imap_uid**([IMAP\Connection](#class.imap-connection) $imap, [int](#language.types.integer) $message_num): [int](#language.types.integer)|[false](#language.types.singleton)

**imap_uid()** devuelve el UID para el mensaje
msgno. Un UID es un identificador único
que nunca cambia, mientras que el número del mensaje en
la lista de mensajes puede cambiar con cualquier modificación
del buzón de correo.

Es la función inversa de [imap_msgno()](#function.imap-msgno).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_num


       El número del mensaje.





### Valores devueltos

El UID de un mensaje dado.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Notas

**Nota**:

    Esta funcionalidad no es soportada por los buzones de correo
    POP3.

### Ver también

    - [imap_msgno()](#function.imap-msgno) - Devuelve el número de secuencia del mensaje para un UID dado

# imap_undelete

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_undelete — Elimina la marca de eliminación de un mensaje

### Descripción

**imap_undelete**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $message_nums, [int](#language.types.integer) $flags = 0): [true](#language.types.singleton)

Elimina la marca de eliminación del mensaje
message_nums, colocada con
[imap_delete()](#function.imap-delete) o [imap_mail_move()](#function.imap-mail-move).

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     message_nums


       Un [string](#language.types.string) que representa uno o más mensajes en un formato de secuencia IMAP4 ("n",
       "n:m", o una combinación de estos,
       delimitados por comas).






     flags







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_delete()](#function.imap-delete) - Marca el fichero para el borrado, en el buzón de correo actual

    - [imap_mail_move()](#function.imap-mail-move) - Mueve mensajes a una caja de correo

# imap_unsubscribe

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_unsubscribe — Termina la suscripción a un buzón de correo

### Descripción

**imap_unsubscribe**([IMAP\Connection](#class.imap-connection) $imap, [string](#language.types.string) $mailbox): [bool](#language.types.boolean)

Termina la suscripción al buzón de correo mailbox.

### Parámetros

imapAn [IMAP\Connection](#class.imap-connection) instance.

     mailbox


       El nombre del buzón de correo, ver la documentación de la función
       [imap_open()](#function.imap-open) para más detalles.



      **Advertencia**

Passing untrusted data to this parameter is _insecure_, unless
[imap.enable_insecure_rsh](#ini.imap.enable-insecure-rsh) is disabled.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The imap parameter expects an [IMAP\Connection](#class.imap-connection)
instance now; previously, a valid imap [resource](#language.types.resource) was expected.

### Ver también

    - [imap_subscribe()](#function.imap-subscribe) - Suscribe a un buzón de correo

# imap_utf7_decode

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_utf7_decode — Decodifica una cadena codificada en UTF-7 modificado

### Descripción

**imap_utf7_decode**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

**imap_utf7_decode()** decodifica la cadena UTF-7
string en ISO-8859-1.

Esta función se utiliza para codificar los nombres de los buzones de correo que
contienen caracteres internacionales fuera del espacio ASCII.

### Parámetros

     string


       La codificación UTF-7 modificada está definida en la [» RFC 2060](https://datatracker.ietf.org/doc/html/rfc2060), sección 5.1.3.





### Valores devueltos

Devuelve una [string](#language.types.string) codificada en ISO-8859-1 y que contiene la misma
secuencia de caracteres que en el parámetro string,
o **[false](#constant.false)** si string contiene una secuencia UTF-7
modificada inválida o si string contiene un carácter
que no forma parte del juego de caracteres ISO-8859-1.

### Ver también

    - [imap_utf7_encode()](#function.imap-utf7-encode) - Convierte una cadena ISO-8859-1 en texto UTF-7 modificado

# imap_utf7_encode

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_utf7_encode — Convierte una cadena ISO-8859-1 en texto UTF-7 modificado

### Descripción

**imap_utf7_encode**([string](#language.types.string) $string): [string](#language.types.string)

Convierte una cadena string
ISO-8859-1 en texto UTF-7 modificado.

Esta función se utiliza para codificar los nombres de las carpetas de correo
que contienen caracteres internacionales fuera del espacio ASCII.

### Parámetros

     string


       Una [string](#language.types.string) ISO-8859-1.





### Valores devueltos

Devuelve los datos string codificados
con la codificación UTF-7 modificada tal como se define en la [» RFC 2060](https://datatracker.ietf.org/doc/html/rfc2060), sección 5.1.3.

### Ver también

    - [imap_utf7_decode()](#function.imap-utf7-decode) - Decodifica una cadena codificada en UTF-7 modificado

# imap_utf8

(PHP 4, PHP 5, PHP 7, PHP 8)

imap_utf8 — Convierte texto en formato MIME a UTF-8

### Descripción

**imap_utf8**([string](#language.types.string) $mime_encoded_text): [string](#language.types.string)

Convierte el texto mime_encoded_text a UTF-8,
si el conjunto de caracteres declarado es conocido por libc-client.
De lo contrario, el texto proporcionado será decodificado, pero no convertido a UTF-8.

### Parámetros

     mime_encoded_text


       Un string codificado en MIME. Las especificaciones de MIME y UTF8
       están descritas en los [» RFC2047](https://datatracker.ietf.org/doc/html/rfc2047) y
       [» RFC2044](https://datatracker.ietf.org/doc/html/rfc2044).





### Valores devueltos

Devuelve el string decodificado y, si es posible, convertido a UTF-8.

### Ejemplos

**Ejemplo #1 Uso básico de la función imap_utf8()**

&lt;?php
echo imap_utf8("Johannes =?ISO-8859-1?Q?Schl=FCter?=");
?&gt;

Resultado del ejemplo anterior es similar a:

Johannes Schlüter

### Ver también

    - [imap_mime_header_decode()](#function.imap-mime-header-decode) - Decodifica los elementos MIME de un encabezado

# imap_utf8_to_mutf7

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

imap_utf8_to_mutf7 — Codifica una string UTF-8 en UTF-7 modificado

### Descripción

**imap_utf8_to_mutf7**([string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Codifica una string UTF-8 en UTF-7 modificado (como se especifica en la RFC 2060, sección 5.1.3).

**Nota**:

    Esta función solo está disponible si libcclient exporta utf8_to_mutf7().

### Parámetros

    string


      Una string codificada en UTF-8.


### Valores devueltos

Devuelve string convertida en UTF-7 modificado,
o **[false](#constant.false)** si ocurre un error.

### Ver también

- [imap_mutf7_to_utf8()](#function.imap-mutf7-to-utf8) - Decodifica una string UTF-7 modificado en UTF-8

## Tabla de contenidos

- [imap_8bit](#function.imap-8bit) — Convierte un string de 8 bits en un string codificado en Quoted-Printable
- [imap_alerts](#function.imap-alerts) — Devuelve todas las alertas
- [imap_append](#function.imap-append) — Añade un mensaje en un buzón de correo
- [imap_base64](#function.imap-base64) — Decodifica un texto codificado en BASE64
- [imap_binary](#function.imap-binary) — Convierte una string de 8 bits en una string en base64
- [imap_body](#function.imap-body) — Lee el cuerpo de un mensaje
- [imap_bodystruct](#function.imap-bodystruct) — Lee la estructura de una sección del cuerpo de un correo electrónico
- [imap_check](#function.imap-check) — Verifica el buzón de correo actual
- [imap_clearflag_full](#function.imap-clearflag-full) — Elimina un flag en un mensaje
- [imap_close](#function.imap-close) — Termina un flujo IMAP
- [imap_create](#function.imap-create) — Alias de imap_createmailbox
- [imap_createmailbox](#function.imap-createmailbox) — Crea un nuevo buzón de correo
- [imap_delete](#function.imap-delete) — Marca el fichero para el borrado, en el buzón de correo actual
- [imap_deletemailbox](#function.imap-deletemailbox) — Borra una boîte aux lettres
- [imap_errors](#function.imap-errors) — Devuelve todos los errores IMAP ocurridos
- [imap_expunge](#function.imap-expunge) — Elimina todos los mensajes marcados para su eliminación
- [imap_fetch_overview](#function.imap-fetch-overview) — Lee el resumen de los encabezados de los mensajes
- [imap_fetchbody](#function.imap-fetchbody) — Devuelve una sección extraída del cuerpo de un mensaje
- [imap_fetchheader](#function.imap-fetchheader) — Devuelve el encabezado de un mensaje
- [imap_fetchmime](#function.imap-fetchmime) — Recupera los encabezados MIME para una sección particular del mensaje
- [imap_fetchstructure](#function.imap-fetchstructure) — Lee la estructura de un mensaje
- [imap_fetchtext](#function.imap-fetchtext) — Alias de imap_body
- [imap_gc](#function.imap-gc) — Borra la caché IMAP
- [imap_get_quota](#function.imap-get-quota) — Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos
- [imap_get_quotaroot](#function.imap-get-quotaroot) — Lee los cuotas de cada usuario
- [imap_getacl](#function.imap-getacl) — Devuelve el ACL para el buzón
- [imap_getmailboxes](#function.imap-getmailboxes) — Lista los buzones de correo y devuelve los detalles de cada uno
- [imap_getsubscribed](#function.imap-getsubscribed) — Lista todas las carpetas de correo suscritas
- [imap_header](#function.imap-header) — Alias de imap_headerinfo
- [imap_headerinfo](#function.imap-headerinfo) — Lee la cabecera del mensaje
- [imap_headers](#function.imap-headers) — Devuelve los encabezados de todos los mensajes de un buzón de correo
- [imap_is_open](#function.imap-is-open) — Verificar si el flujo IMAP sigue siendo válido
- [imap_last_error](#function.imap-last-error) — Devuelve el último error ocurrido
- [imap_list](#function.imap-list) — Lee la lista de buzones de correo
- [imap_listmailbox](#function.imap-listmailbox) — Alias de imap_list
- [imap_listscan](#function.imap-listscan) — Lee la lista de buzones de correo y busca una cadena
- [imap_listsubscribed](#function.imap-listsubscribed) — Alias de imap_lsub
- [imap_lsub](#function.imap-lsub) — Lista todas las carpetas de correo registradas
- [imap_mail](#function.imap-mail) — Envía un mensaje de correo electrónico
- [imap_mail_compose](#function.imap-mail-compose) — Crea un mensaje MIME
- [imap_mail_copy](#function.imap-mail-copy) — Copia los mensajes especificados en un buzón de correo
- [imap_mail_move](#function.imap-mail-move) — Mueve mensajes a una caja de correo
- [imap_mailboxmsginfo](#function.imap-mailboxmsginfo) — Lee la información sobre el buzón de correo actual
- [imap_mime_header_decode](#function.imap-mime-header-decode) — Decodifica los elementos MIME de un encabezado
- [imap_msgno](#function.imap-msgno) — Devuelve el número de secuencia del mensaje para un UID dado
- [imap_mutf7_to_utf8](#function.imap-mutf7-to-utf8) — Decodifica una string UTF-7 modificado en UTF-8
- [imap_num_msg](#function.imap-num-msg) — Devuelve el número de mensajes en el buzón de correo actual
- [imap_num_recent](#function.imap-num-recent) — Devuelve el número de mensajes recientes en el buzón de correo actual
- [imap_open](#function.imap-open) — Abre un flujo IMAP hacia un buzón de correo
- [imap_ping](#function.imap-ping) — Verifica que el flujo IMAP sigue activo
- [imap_qprint](#function.imap-qprint) — Convierte una string con comillas en una string de 8 bits
- [imap_rename](#function.imap-rename) — Alias de imap_renamemailbox
- [imap_renamemailbox](#function.imap-renamemailbox) — Renombra un buzón de correo
- [imap_reopen](#function.imap-reopen) — Reabre un flujo IMAP hacia una nueva caja de correo
- [imap_rfc822_parse_adrlist](#function.imap-rfc822-parse-adrlist) — Analiza una dirección de correo electrónico
- [imap_rfc822_parse_headers](#function.imap-rfc822-parse-headers) — Analiza un encabezado de correo electrónico
- [imap_rfc822_write_address](#function.imap-rfc822-write-address) — Devuelve una dirección de correo electrónico formateada correctamente
- [imap_savebody](#function.imap-savebody) — Guarda una parte específica del cuerpo en un fichero
- [imap_scan](#function.imap-scan) — Alias de imap_listscan
- [imap_scanmailbox](#function.imap-scanmailbox) — Alias de imap_listscan
- [imap_search](#function.imap-search) — Devuelve un array de mensajes después de la búsqueda
- [imap_set_quota](#function.imap-set-quota) — Modifica el cupo de un buzón de correo
- [imap_setacl](#function.imap-setacl) — Modifica el ACL de la bandeja de entrada
- [imap_setflag_full](#function.imap-setflag-full) — Establece un flag en un mensaje
- [imap_sort](#function.imap-sort) — Ordena mensajes
- [imap_status](#function.imap-status) — Devuelve la información de estado sobre un buzón de correo
- [imap_subscribe](#function.imap-subscribe) — Suscribe a un buzón de correo
- [imap_thread](#function.imap-thread) — Devuelve el árbol de mensajes organizados por hilo
- [imap_timeout](#function.imap-timeout) — Configura o devuelve el timeout
- [imap_uid](#function.imap-uid) — Devuelve el UID de un mensaje
- [imap_undelete](#function.imap-undelete) — Elimina la marca de eliminación de un mensaje
- [imap_unsubscribe](#function.imap-unsubscribe) — Termina la suscripción a un buzón de correo
- [imap_utf7_decode](#function.imap-utf7-decode) — Decodifica una cadena codificada en UTF-7 modificado
- [imap_utf7_encode](#function.imap-utf7-encode) — Convierte una cadena ISO-8859-1 en texto UTF-7 modificado
- [imap_utf8](#function.imap-utf8) — Convierte texto en formato MIME a UTF-8
- [imap_utf8_to_mutf7](#function.imap-utf8-to-mutf7) — Codifica una string UTF-8 en UTF-7 modificado

# La clase IMAP\Connection

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    imap a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **IMAP\Connection**
     {

}

- [Introducción](#intro.imap)
- [Instalación/Configuración](#imap.setup)<li>[Requerimientos](#imap.requirements)
- [Instalación](#imap.installation)
- [Configuración en tiempo de ejecución](#imap.configuration)
- [Tipos de recursos](#imap.resources)
  </li>- [Constantes predefinidas](#imap.constants)
- [Funciones IMAP](#ref.imap)<li>[imap_8bit](#function.imap-8bit) — Convierte un string de 8 bits en un string codificado en Quoted-Printable
- [imap_alerts](#function.imap-alerts) — Devuelve todas las alertas
- [imap_append](#function.imap-append) — Añade un mensaje en un buzón de correo
- [imap_base64](#function.imap-base64) — Decodifica un texto codificado en BASE64
- [imap_binary](#function.imap-binary) — Convierte una string de 8 bits en una string en base64
- [imap_body](#function.imap-body) — Lee el cuerpo de un mensaje
- [imap_bodystruct](#function.imap-bodystruct) — Lee la estructura de una sección del cuerpo de un correo electrónico
- [imap_check](#function.imap-check) — Verifica el buzón de correo actual
- [imap_clearflag_full](#function.imap-clearflag-full) — Elimina un flag en un mensaje
- [imap_close](#function.imap-close) — Termina un flujo IMAP
- [imap_create](#function.imap-create) — Alias de imap_createmailbox
- [imap_createmailbox](#function.imap-createmailbox) — Crea un nuevo buzón de correo
- [imap_delete](#function.imap-delete) — Marca el fichero para el borrado, en el buzón de correo actual
- [imap_deletemailbox](#function.imap-deletemailbox) — Borra una boîte aux lettres
- [imap_errors](#function.imap-errors) — Devuelve todos los errores IMAP ocurridos
- [imap_expunge](#function.imap-expunge) — Elimina todos los mensajes marcados para su eliminación
- [imap_fetch_overview](#function.imap-fetch-overview) — Lee el resumen de los encabezados de los mensajes
- [imap_fetchbody](#function.imap-fetchbody) — Devuelve una sección extraída del cuerpo de un mensaje
- [imap_fetchheader](#function.imap-fetchheader) — Devuelve el encabezado de un mensaje
- [imap_fetchmime](#function.imap-fetchmime) — Recupera los encabezados MIME para una sección particular del mensaje
- [imap_fetchstructure](#function.imap-fetchstructure) — Lee la estructura de un mensaje
- [imap_fetchtext](#function.imap-fetchtext) — Alias de imap_body
- [imap_gc](#function.imap-gc) — Borra la caché IMAP
- [imap_get_quota](#function.imap-get-quota) — Lee los cuotas de los buzones de correo así como las estadísticas sobre cada uno de ellos
- [imap_get_quotaroot](#function.imap-get-quotaroot) — Lee los cuotas de cada usuario
- [imap_getacl](#function.imap-getacl) — Devuelve el ACL para el buzón
- [imap_getmailboxes](#function.imap-getmailboxes) — Lista los buzones de correo y devuelve los detalles de cada uno
- [imap_getsubscribed](#function.imap-getsubscribed) — Lista todas las carpetas de correo suscritas
- [imap_header](#function.imap-header) — Alias de imap_headerinfo
- [imap_headerinfo](#function.imap-headerinfo) — Lee la cabecera del mensaje
- [imap_headers](#function.imap-headers) — Devuelve los encabezados de todos los mensajes de un buzón de correo
- [imap_is_open](#function.imap-is-open) — Verificar si el flujo IMAP sigue siendo válido
- [imap_last_error](#function.imap-last-error) — Devuelve el último error ocurrido
- [imap_list](#function.imap-list) — Lee la lista de buzones de correo
- [imap_listmailbox](#function.imap-listmailbox) — Alias de imap_list
- [imap_listscan](#function.imap-listscan) — Lee la lista de buzones de correo y busca una cadena
- [imap_listsubscribed](#function.imap-listsubscribed) — Alias de imap_lsub
- [imap_lsub](#function.imap-lsub) — Lista todas las carpetas de correo registradas
- [imap_mail](#function.imap-mail) — Envía un mensaje de correo electrónico
- [imap_mail_compose](#function.imap-mail-compose) — Crea un mensaje MIME
- [imap_mail_copy](#function.imap-mail-copy) — Copia los mensajes especificados en un buzón de correo
- [imap_mail_move](#function.imap-mail-move) — Mueve mensajes a una caja de correo
- [imap_mailboxmsginfo](#function.imap-mailboxmsginfo) — Lee la información sobre el buzón de correo actual
- [imap_mime_header_decode](#function.imap-mime-header-decode) — Decodifica los elementos MIME de un encabezado
- [imap_msgno](#function.imap-msgno) — Devuelve el número de secuencia del mensaje para un UID dado
- [imap_mutf7_to_utf8](#function.imap-mutf7-to-utf8) — Decodifica una string UTF-7 modificado en UTF-8
- [imap_num_msg](#function.imap-num-msg) — Devuelve el número de mensajes en el buzón de correo actual
- [imap_num_recent](#function.imap-num-recent) — Devuelve el número de mensajes recientes en el buzón de correo actual
- [imap_open](#function.imap-open) — Abre un flujo IMAP hacia un buzón de correo
- [imap_ping](#function.imap-ping) — Verifica que el flujo IMAP sigue activo
- [imap_qprint](#function.imap-qprint) — Convierte una string con comillas en una string de 8 bits
- [imap_rename](#function.imap-rename) — Alias de imap_renamemailbox
- [imap_renamemailbox](#function.imap-renamemailbox) — Renombra un buzón de correo
- [imap_reopen](#function.imap-reopen) — Reabre un flujo IMAP hacia una nueva caja de correo
- [imap_rfc822_parse_adrlist](#function.imap-rfc822-parse-adrlist) — Analiza una dirección de correo electrónico
- [imap_rfc822_parse_headers](#function.imap-rfc822-parse-headers) — Analiza un encabezado de correo electrónico
- [imap_rfc822_write_address](#function.imap-rfc822-write-address) — Devuelve una dirección de correo electrónico formateada correctamente
- [imap_savebody](#function.imap-savebody) — Guarda una parte específica del cuerpo en un fichero
- [imap_scan](#function.imap-scan) — Alias de imap_listscan
- [imap_scanmailbox](#function.imap-scanmailbox) — Alias de imap_listscan
- [imap_search](#function.imap-search) — Devuelve un array de mensajes después de la búsqueda
- [imap_set_quota](#function.imap-set-quota) — Modifica el cupo de un buzón de correo
- [imap_setacl](#function.imap-setacl) — Modifica el ACL de la bandeja de entrada
- [imap_setflag_full](#function.imap-setflag-full) — Establece un flag en un mensaje
- [imap_sort](#function.imap-sort) — Ordena mensajes
- [imap_status](#function.imap-status) — Devuelve la información de estado sobre un buzón de correo
- [imap_subscribe](#function.imap-subscribe) — Suscribe a un buzón de correo
- [imap_thread](#function.imap-thread) — Devuelve el árbol de mensajes organizados por hilo
- [imap_timeout](#function.imap-timeout) — Configura o devuelve el timeout
- [imap_uid](#function.imap-uid) — Devuelve el UID de un mensaje
- [imap_undelete](#function.imap-undelete) — Elimina la marca de eliminación de un mensaje
- [imap_unsubscribe](#function.imap-unsubscribe) — Termina la suscripción a un buzón de correo
- [imap_utf7_decode](#function.imap-utf7-decode) — Decodifica una cadena codificada en UTF-7 modificado
- [imap_utf7_encode](#function.imap-utf7-encode) — Convierte una cadena ISO-8859-1 en texto UTF-7 modificado
- [imap_utf8](#function.imap-utf8) — Convierte texto en formato MIME a UTF-8
- [imap_utf8_to_mutf7](#function.imap-utf8-to-mutf7) — Codifica una string UTF-8 en UTF-7 modificado
  </li>- [IMAP\Connection](#class.imap-connection) — La clase IMAP\Connection
