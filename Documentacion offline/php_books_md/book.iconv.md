# iconv

# Introducción

Este módulo es una interfaz hacia la biblioteca iconv.
La extensión iconv convierte ficheros entre diversos juegos de caracteres.
Los juegos soportados dependen de la implementación de la función
iconv()
en su sistema. Tenga en cuenta que esta función no siempre funciona correctamente
en todos los sistemas. En ese caso, sería una buena idea instalar la
biblioteca [» GNU libiconv](http://www.gnu.org/software/libiconv/).

Esta extensión dispone de muchas funciones
útiles para ayudar a escribir scripts multilingües.
Consúltense las secciones siguientes para descubrir las nuevas funcionalidades.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#iconv.requirements)
- [Instalación](#iconv.installation)
- [Configuración en tiempo de ejecución](#iconv.configuration)

    ## Requerimientos

    No se requiere nada especial si el sistema es conforme al estándar POSIX, ya que la biblioteca estándar C proporciona iconv.
    En caso contrario, debe instalarse la biblioteca [» libiconv](http://www.gnu.org/software/libiconv/) en el sistema.

## Instalación

Esta extensión se encuentra activada por omisión, sin embargo, puede ser
desactivada compilando PHP con la opción **--without-iconv**.

La directiva opcional **--with-iconv[=DIR]**
se utiliza para especificar la ubicación de _iconv_ en
el sistema donde PHP es compilado. Si esta directiva no es especificada,
únicamente se escanearán las ubicaciones por omisión.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración iconv**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [iconv.input_encoding](#ini.iconv.input-encoding)
      ""
      **[INI_ALL](#constant.ini-all)**
      Deprecado en PHP 5.6.0.



      [iconv.output_encoding](#ini.iconv.output-encoding)
      ""
      **[INI_ALL](#constant.ini-all)**
      Deprecado en PHP 5.6.0.



      [iconv.internal_encoding](#ini.iconv.internal-encoding)
      ""
      **[INI_ALL](#constant.ini-all)**
      Deprecado en PHP 5.6.0.


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

**Advertencia**

Algunos sistemas (como IBM AIX) utilizan "ISO8859-1"
en lugar de "ISO-8859-1", por lo que este valor debe
ser utilizado en las opciones de configuración así como en
los argumentos de las funciones.

      iconv.input_encoding
      [string](#language.types.string)


      **Advertencia**

Esta funcionalidad está _OBSOLETA_ a partir de PHP 5.6.0.
Depender de esta funcionalidad está altamente desaconsejado.

       Los usuarios de PHP 5.6 y versiones posteriores deben dejar esta opción
       vacía y definir en su lugar la opción
       [input_encoding](#ini.input-encoding).







      iconv.output_encoding
      [string](#language.types.string)


      **Advertencia**

Esta funcionalidad está _OBSOLETA_ a partir de PHP 5.6.0.
Depender de esta funcionalidad está altamente desaconsejado.

       Los usuarios de PHP 5.6 y versiones posteriores deben dejar esta opción
       vacía y definir en su lugar la opción
       [output_encoding](#ini.output-encoding).







      iconv.internal_encoding
      [string](#language.types.string)


      **Advertencia**

Esta funcionalidad está _OBSOLETA_ a partir de PHP 5.6.0.
Depender de esta funcionalidad está altamente desaconsejado.

       Los usuarios de PHP 5.6 y versiones posteriores deben dejar esta opción
       vacía y definir en su lugar la opción
       [default_charset](#ini.default-charset).





# Constantes predefinidas

Es posible identificar durante la ejecución,
la versión de la biblioteca iconv que se utiliza.

   <caption>**Constantes de implementación iconv**</caption>
   
    
     
      Constante
      Tipo
      Descripción


      **[ICONV_IMPL](#constant.iconv-impl)**
      [string](#language.types.string)
      El nombre de la biblioteca



      **[ICONV_VERSION](#constant.iconv-version)**
      [string](#language.types.string)
      La versión de la biblioteca


**Nota**:

La programación de scripts dependientes de versiones específicas,
con estas constantes, está fuertemente desaconsejada.

Las constantes siguientes también están disponibles :

   <caption>**Otras constantes iconv**</caption>
   
    
     
      Constante
      Tipo
      Descripción


      **[ICONV_MIME_DECODE_STRICT](#constant.iconv-mime-decode-strict)**
      [int](#language.types.integer)
      Una máscara utilizada por [iconv_mime_decode()](#function.iconv-mime-decode)



      **[ICONV_MIME_DECODE_CONTINUE_ON_ERROR](#constant.iconv-mime-decode-continue-on-error)**
      [int](#language.types.integer)
      Una máscara utilizada para [iconv_mime_decode()](#function.iconv-mime-decode)


# Funciones de iconv

# Ver también

    Ver también [funciones de GNU Recode](#ref.recode).

# iconv

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

iconv — Convierte una cadena de caracteres de un encodaje a otro

### Descripción

**iconv**([string](#language.types.string) $from_encoding, [string](#language.types.string) $to_encoding, [string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Convierte la cadena string desde from_encoding
hacia el encodaje to_encoding.

### Parámetros

     from_encoding


       El encodaje utilizado para interpretar string.






     to_encoding


       El encodaje deseado del resultado.




       Si la cadena //TRANSLIT es añadida al argumento
       to_encoding, entonces la transliteración es activada.
       Esto significa que cuando un carácter no puede ser representado en el juego
       de caracteres destino, podría ser representado aproximadamente a partir
       de uno o varios caracteres que representen el mismo carácter.
       Si la cadena //IGNORE es añadida, los caracteres
       que no puedan ser representados en el juego de caracteres destino serán
       simplemente ignorados. De lo contrario, se generará una alerta de nivel
       **[E_NOTICE](#constant.e-notice)** y la función retornará
       **[false](#constant.false)**.



      **Precaución**

        Si y cómo //TRANSLIT funciona exactamente depende
        de la implementación iconv() del sistema (cf. **[ICONV_IMPL](#constant.iconv-impl)**).
        Algunas implementaciones son conocidas por ignorar //TRANSLIT,
        por lo que la conversión de caracteres ilegales probablemente fallará para
        to_encoding.







     string


       La [string](#language.types.string) a convertir.





### Valores devueltos

Retorna la [string](#language.types.string) convertida, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con iconv()**

&lt;?php
$text = "Ceci est le symbole de l'Euro '€'.";

echo 'Original : ', $text, PHP_EOL;
echo 'TRANSLIT : ', iconv("UTF-8", "ISO-8859-1//TRANSLIT", $text), PHP_EOL;
echo 'IGNORE : ', iconv("UTF-8", "ISO-8859-1//IGNORE", $text), PHP_EOL;
echo 'Brut : ', iconv("UTF-8", "ISO-8859-1", $text), PHP_EOL;
?&gt;

    Resultado del ejemplo anterior es similar a:

Original : Ceci est le symbole de l'Euro '€'.
TRANSLIT : Ceci est le symbole de l'Euro 'EUR'.
IGNORE : Ceci est le symbole de l'Euro ''.
Brut : Ceci est le symbole de l'Euro '
Notice: iconv(): Detected an illegal character in input string in /Users/macbook/Desktop/- on line 8
Ceci est le symbole de l'Euro '

### Notas

**Nota**:

    El encodaje de caracteres y las opciones disponibles dependen de la implementación de iconv.
    Si el argumento de from_encoding o to_encoding no es
    soportado en el sistema actual, **[false](#constant.false)** será retornado.

### Ver también

    - [mb_convert_encoding()](#function.mb-convert-encoding) - Convertir una cadena de un codificación de caracteres a otra

    - [UConverter::transcode()](#uconverter.transcode) - Convierte una cadena de un juego de caracteres a otro

# iconv_get_encoding

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

iconv_get_encoding — Lee el juego de caracteres actual

### Descripción

**iconv_get_encoding**([string](#language.types.string) $type = "all"): [array](#language.types.array)|[string](#language.types.string)|[false](#language.types.singleton)

Devuelve la configuración actual del gestor [ob_iconv_handler()](#function.ob-iconv-handler).

### Parámetros

     type


       Los valores posibles para el argumento opcional type son:



        - all

        - input_encoding

        - output_encoding

        - internal_encoding





### Valores devueltos

Devuelve el valor actual de la variable de configuración en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si type es omitido o diferente de all
(es decir "todos"), **iconv_get_encoding()** devuelve un
array que contiene todos los valores de estas constantes.

### Ejemplos

    **Ejemplo #1 Ejemplo con iconv_get_encoding()**

&lt;pre&gt;
&lt;?php
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "ISO-8859-1");
var_dump(iconv_get_encoding('all'));
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[input_encoding] =&gt; ISO-8859-1
[output_encoding] =&gt; ISO-8859-1
[internal_encoding] =&gt; UTF-8
)

### Ver también

    - [iconv_set_encoding()](#function.iconv-set-encoding) - Modifica el juego de caracteres de codificación actual

    - [ob_iconv_handler()](#function.ob-iconv-handler) - Convierte la codificación de caracteres al manejador del buffer de salida

# iconv_mime_decode

(PHP 5, PHP 7, PHP 8)

iconv_mime_decode — Decodifica un campo de encabezado MIME

### Descripción

**iconv_mime_decode**([string](#language.types.string) $string, [int](#language.types.integer) $mode = 0, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**iconv_mime_decode()** decodifica un campo de encabezado MIME.

### Parámetros

     string


       El encabezado codificado, en forma de [string](#language.types.string).






     mode


       mode determina una alternativa en caso
       de que **iconv_mime_decode()** encuentre un campo de encabezado
       MIME mal formado.



        <caption>**Máscaras aceptables para la función iconv_mime_decode()**</caption>



           Valor
           Constante
           Descripción






           1
           ICONV_MIME_DECODE_STRICT

            Si está definido, el encabezado correspondiente será decodificado
            siguiendo estrictamente el estándar [» RFC2047](https://datatracker.ietf.org/doc/html/rfc2047).
            Esta opción está desactivada por omisión, ya que existen muchos
            clientes de correo que no siguen este estándar y
            por lo tanto, producen malos encabezados MIME.




           2
           ICONV_MIME_DECODE_CONTINUE_ON_ERROR

            Si está definido, **iconv_mime_decode()**
            intenta continuar decodificando el encabezado pasado,
            incluso si aparecen errores.











     encoding


       El parámetro por omisión encoding especifica
       el juego de caracteres a utilizar para representar el resultado.
       Si se omite,
       [iconv.internal_encoding](#iconv.configuration)
       será utilizado.





### Valores devueltos

Devuelve un campo MIME en caso de éxito,
o **[false](#constant.false)** si ocurre un error durante la decodificación.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       encoding ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con iconv_mime_decode()**

&lt;?php
// Esto mostrará: "Subject: Prüfung Prüfung"
echo iconv_mime_decode("Subject: =?UTF-8?B?UHLDvGZ1bmcgUHLDvGZ1bmc=?=",
0, "ISO-8859-1");
?&gt;

### Ver también

    - [iconv_mime_decode_headers()](#function.iconv-mime-decode-headers) - Decodifica múltiples encabezados MIME

    - [mb_decode_mimeheader()](#function.mb-decode-mimeheader) - Decodifica un encabezado MIME

    - [imap_mime_header_decode()](#function.imap-mime-header-decode) - Decodifica los elementos MIME de un encabezado

    - [imap_base64()](#function.imap-base64) - Decodifica un texto codificado en BASE64

    - [imap_qprint()](#function.imap-qprint) - Convierte una string con comillas en una string de 8 bits

# iconv_mime_decode_headers

(PHP 5, PHP 7, PHP 8)

iconv_mime_decode_headers — Decodifica múltiples encabezados MIME

### Descripción

**iconv_mime_decode_headers**([string](#language.types.string) $headers, [int](#language.types.integer) $mode = 0, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**iconv_mime_decode_headers()** decodifica
múltiples encabezados MIME.

### Parámetros

     headers


       Los encabezados codificados, en forma de [string](#language.types.string).






     mode


       mode determina el comportamiento de la función,
       si **iconv_mime_decode_headers()** encuentra un
       encabezado MIME malformado.



        <caption>**Mascara aceptada por la función iconv_mime_decode_headers()**</caption>



           Valor
           Constante
           Descripción






           1
           ICONV_MIME_DECODE_STRICT

            Si se utiliza, los encabezados son decodificados respetando estrictamente
            el estándar de la [» RFC2047](https://datatracker.ietf.org/doc/html/rfc2047).
            Esta opción está desactivada por omisión, ya que existen numerosos clientes
            de correo que no siguen estas especificaciones y que no producen
            encabezados MIME correctos.




           2
           ICONV_MIME_DECODE_CONTINUE_ON_ERROR

            Si esta opción está activada, **iconv_mime_decode_headers()**
            intenta ignorar los errores de sintaxis y continúa procesando el encabezado
            dado.











     encoding


       El parámetro opcional encoding especifica el
       juego de caracteres utilizado para representar el resultado.
       Si se omite, se utiliza el juego definido en el archivo php.ini
       [iconv.internal_encoding](#iconv.configuration).





### Valores devueltos

Devuelve un array asociativo que contiene los encabezados
MIME especificados por el parámetro
headers, o bien **[false](#constant.false)**
si ocurre un error durante el decodificado.

Cada clave del array devuelto contiene un nombre de encabezado distinto,
y su valor correspondiente. Si varios campos tienen el mismo nombre,
**iconv_mime_decode_headers()** convierte ese campo en
un array indexado, con los valores en su orden de aparición.
Cabe señalar que los nombres de los encabezados no son
_insensibles a mayúsculas/minúsculas_.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       encoding ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con iconv_mime_decode_headers()**

&lt;?php
$headers_string = &lt;&lt;&lt;EOF
Subject: =?UTF-8?B?UHLDvGZ1bmcgUHLDvGZ1bmc=?=
To: example@example.com
Date: Thu, 1 Jan 1970 00:00:00 +0000
Message-Id: &lt;example@example.com&gt;
Received: from localhost (localhost [127.0.0.1]) by localhost
with SMTP id example for &lt;example@example.com&gt;;
Thu, 1 Jan 1970 00:00:00 +0000 (UTC)
(envelope-from example-return-0000-example=example.com@example.com)
Received: (qmail 0 invoked by uid 65534); 1 Thu 2003 00:00:00 +0000

EOF;

$headers =  iconv_mime_decode_headers($headers_string, 0, "ISO-8859-1");
print_r($headers);
?&gt;

     El ejemplo anterior mostrará:




Array
(
[Subject] =&gt; Prüfung Prüfung
[To] =&gt; example@example.com
[Date] =&gt; Thu, 1 Jan 1970 00:00:00 +0000
[Message-Id] =&gt; &lt;example@example.com&gt;
[Received] =&gt; Array
(
[0] =&gt; from localhost (localhost [127.0.0.1]) by localhost with SMTP id example for &lt;example@example.com&gt;; Thu, 1 Jan 1970 00:00:00 +0000 (UTC) (envelope-from example-return-0000-example=example.com@example.com)
[1] =&gt; (qmail 0 invoked by uid 65534); 1 Thu 2003 00:00:00 +0000
)

)

### Ver también

    - [iconv_mime_decode()](#function.iconv-mime-decode) - Decodifica un campo de encabezado MIME

    - [mb_decode_mimeheader()](#function.mb-decode-mimeheader) - Decodifica un encabezado MIME

    - [imap_mime_header_decode()](#function.imap-mime-header-decode) - Decodifica los elementos MIME de un encabezado

    - [imap_base64()](#function.imap-base64) - Decodifica un texto codificado en BASE64

    - [imap_qprint()](#function.imap-qprint) - Convierte una string con comillas en una string de 8 bits

# iconv_mime_encode

(PHP 5, PHP 7, PHP 8)

iconv_mime_encode — Construye un encabezado MIME con los campos field_name y field_value

### Descripción

**iconv_mime_encode**([string](#language.types.string) $field_name, [string](#language.types.string) $field_value, [array](#language.types.array) $options = []): [string](#language.types.string)|[false](#language.types.singleton)

**iconv_mime_encode()** compone y devuelve una
cadena de caracteres que representa un campo
encabezado MIME similar a:

Subject: =?ISO-8859-1?Q?Pr=FCfung_f=FCr?= Entwerfen von einer MIME kopfzeile

En el ejemplo anterior, "Subject" es el nombre
del campo y la parte que comienza por
"=?ISO-8859-1?..." es el valor del campo.

### Parámetros

     field_name


       El nombre del campo.






     field_value


       El valor del campo.






     options


       Puede controlarse el comportamiento de la función
       **iconv_mime_encode()** especificando
       un array asociativo que contenga la configuración de
       los elementos en el parámetro options.
       La lista de elementos soportados por
       **iconv_mime_encode()** se muestra a continuación.
       Tenga en cuenta que los nombres de los elementos son sensibles a mayúsculas/minúsculas.



        <caption>**Lista de elementos soportados por iconv_mime_encode()**</caption>



           Elemento
           Tipo
           Descripción
           Valor por omisión
           Ejemplo






           scheme
           [string](#language.types.string)

            Especifica el método de codificación de un campo. Los valores posibles son "B" o "Q", donde
            "B" indica que el esquema de codificación será base64 y "Q",
            quoted-printable.

           B
           B



           input-charset
           [string](#language.types.string)

            Especifica el juego de caracteres para representar el primer parámetro
            field_name y el segundo parámetro
            field_value. Si se omite,
            **iconv_mime_encode()**
            utilizará la directiva de configuración
            [iconv.internal_encoding](#iconv.configuration)
            de su php.ini para representarlos.


            [iconv.internal_encoding](#iconv.configuration)

           ISO-8859-1



           output-charset
           [string](#language.types.string)

            Especifica el juego de caracteres a utilizar para componer
            el encabezado MIME.


            [iconv.internal_encoding](#iconv.configuration)

           UTF-8



           line-length
           [int](#language.types.integer)

            Especifica la longitud máxima de cada encabezado.
            Si el encabezado es mayor que la longitud definida por este parámetro,
            el encabezado resultante será un encabezado compuesto por varias líneas
            conforme al estándar [» RFC2822 - Internet Message Format](https://datatracker.ietf.org/doc/html/rfc2822).
            Si se omite, la longitud máxima se establecerá en 76 caracteres.

           76
           996



           line-break-chars
           [string](#language.types.string)

            Especifica los caracteres de fin de línea. Si se omite, el valor por omisión será "\r\n"
            (CR LF). Tenga en cuenta que este parámetro siempre
            se representa como una cadena ASCII en relación con el valor del parámetro
          input-charset.

           \r\n
           \n









### Valores devueltos

Devuelve un campo MIME en caso de éxito,
o **[false](#constant.false)** si ocurre un error durante la codificación.

### Ejemplos

    **Ejemplo #1 Ejemplo con iconv_mime_encode()**

&lt;?php
$preferences = array(
    "input-charset" =&gt; "ISO-8859-1",
    "output-charset" =&gt; "UTF-8",
    "line-length" =&gt; 76,
    "line-break-chars" =&gt; "\n"
);
$preferences["scheme"] = "Q";
// Esto produce "Subject: =?UTF-8?Q?Pr=C3=BCfung=20Pr=C3=BCfung?="
echo iconv_mime_encode("Subject", "Prüfung Prüfung", $preferences);

$preferences["scheme"] = "B";
// Esto produce "Subject: =?UTF-8?B?UHLDvGZ1bmcgUHLDvGZ1bmc=?="
echo iconv_mime_encode("Subject", "Prüfung Prüfung", $preferences);
?&gt;

### Ver también

    - [imap_binary()](#function.imap-binary) - Convierte una string de 8 bits en una string en base64

    - [mb_encode_mimeheader()](#function.mb-encode-mimeheader) - Codifica una cadena para un encabezado MIME

    - [imap_8bit()](#function.imap-8bit) - Convierte un string de 8 bits en un string codificado en Quoted-Printable

    - [quoted_printable_encode()](#function.quoted-printable-encode) - Convierte un string de 8 bits en un string quoted-printable

# iconv_set_encoding

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

iconv_set_encoding — Modifica el juego de caracteres de codificación actual

### Descripción

**iconv_set_encoding**([string](#language.types.string) $type, [string](#language.types.string) $encoding): [bool](#language.types.boolean)

Modifica el juego de caracteres actual, y reemplaza el valor actual
del argumento type por encoding.

### Parámetros

     type


       Los valores posibles de type son :



        - input_encoding

        - output_encoding

        - internal_encoding






     encoding


       El juego de caracteres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con iconv_set_encoding()**

&lt;?php
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "ISO-8859-1");
?&gt;

### Ver también

    - [iconv_get_encoding()](#function.iconv-get-encoding) - Lee el juego de caracteres actual

    - [ob_iconv_handler()](#function.ob-iconv-handler) - Convierte la codificación de caracteres al manejador del buffer de salida

# iconv_strlen

(PHP 5, PHP 7, PHP 8)

iconv_strlen — Devuelve el número de caracteres de una cadena

### Descripción

**iconv_strlen**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

A diferencia de [strlen()](#function.strlen), el valor devuelto por
**iconv_strlen()** es el número de caracteres que forman
parte de la secuencia de bytes string, lo cual no siempre coincide con el tamaño en bytes de la cadena de caracteres.

### Parámetros

     string


       La [string](#language.types.string).






     encoding


       Si encoding es omitido o **[null](#constant.null)**,
       string se asume que está codificada en
       [iconv.internal_encoding](#iconv.configuration).





### Valores devueltos

Devuelve el número de caracteres de la cadena string,
en forma de [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error durante la codificación.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       encoding ahora es nullable.



### Ver también

    - [grapheme_strlen()](#function.grapheme-strlen) - Lee la longitud de una cadena en número de grafemas

    - [mb_strlen()](#function.mb-strlen) - Devuelve la longitud de una cadena

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

# iconv_strpos

(PHP 5, PHP 7, PHP 8)

iconv_strpos — Encuentra la posición de la primera ocurrencia de una cadena en otra

### Descripción

**iconv_strpos**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Encuentra la posición de la primera ocurrencia de needle
en haystack.

A diferencia de [strpos()](#function.strpos), el valor devuelto por
**iconv_strpos()** es el número de caracteres
que se encuentran antes de needle, en lugar de la posición en bytes donde needle fue encontrado.
Los caracteres son contados basándose en el juego de caracteres especificado por
encoding.

### Parámetros

     haystack


       El [string](#language.types.string) completo.






     needle


       El [string](#language.types.string) a buscar.






     offset


       El parámetro opcional offset especifica la posición
       desde la cual debe comenzar la búsqueda.
       Si la posición es negativa, se cuenta desde el final del [string](#language.types.string).






     encoding


       Si el parámetro encoding es omitido o **[null](#constant.null)**,
       string será codificado de acuerdo con
       [iconv.internal_encoding](#iconv.configuration).





Si haystack o needle no
son strings, son convertidos a enteros y aplicados como valor ordinal de un carácter.

### Valores devueltos

Devuelve la posición numérica de la primera ocurrencia de
needle en haystack.

Si needle no es encontrado,
**iconv_strpos()** devolverá **[false](#constant.false)**.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       encoding ahora es nullable.




      7.1.0

       Se añadió soporte para offsets negativos.



### Ver también

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [iconv_strrpos()](#function.iconv-strrpos) - Encuentra la posición de la última ocurrencia de un elemento en una cadena

    - [mb_strpos()](#function.mb-strpos) - Localiza la primera ocurrencia de un carácter en una cadena

# iconv_strrpos

(PHP 5, PHP 7, PHP 8)

iconv_strrpos — Encuentra la posición de la última ocurrencia de un elemento en una cadena

### Descripción

**iconv_strrpos**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Encuentra la última ocurrencia de needle
en haystack.

A diferencia de la función [strpos()](#function.strpos), el valor devuelto por
**iconv_strrpos()** es el número de caracteres antes de needle,
en lugar de la posición en bytes de needle. Los caracteres son contados
basándose en el juego de caracteres charset. Los caracteres
son contados sobre la base del juego de caracteres encoding
especificado.

### Parámetros

     haystack


       La [string](#language.types.string) completa.






     needle


       La [string](#language.types.string) buscada.






     encoding


       Si el parámetro opcional encoding es omitido o **[null](#constant.null)**,
       string se asume que está codificado en
       [iconv.internal_encoding](#iconv.configuration).





Si haystack o needle
no son strings, serán convertidos a string y reconocidos
como código ASCII de cada carácter.

### Valores devueltos

Devuelve la posición numérica de la última ocurrencia de
needle en haystack.

Si needle no es encontrado, **iconv_strrpos()**
devolverá **[false](#constant.false)**.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       encoding ahora es nullable.



### Ver también

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [iconv_strpos()](#function.iconv-strpos) - Encuentra la posición de la primera ocurrencia de una cadena en otra

    - [mb_strrpos()](#function.mb-strrpos) - Localiza la última ocurrencia de un carácter en una cadena

# iconv_substr

(PHP 5, PHP 7, PHP 8)

iconv_substr — Extrae una parte de una cadena

### Descripción

**iconv_substr**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $offset,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

Extrae una parte de la cadena string a partir
de la posición offset y con una longitud de
length.

### Parámetros

     string


       La [string](#language.types.string) original.






     offset


       Si offset no es negativo,
       **iconv_substr()** devuelve el segmento de
       string comenzando en el carácter número
       offset, contando desde cero.




       Si offset es negativo,
       **iconv_substr()** devuelve el segmento comenzando en la
       posición offset caracteres desde el final de la [string](#language.types.string) string.






     length


       Si el parámetro length se proporciona y es positivo, el valor devuelto contendrá
       como máximo length caracteres de la porción de cadena que comienza en offset
       (dependiendo del tamaño de la cadena string).




       Si length se proporciona y es negativo,
       **iconv_substr()** extrae la porción externa de
       string desde el carácter número offset
       hasta el carácter número length, contando desde el final de
       la [string](#language.types.string). En el caso de que offset también sea negativo,
       la posición de inicio se calcula hacia atrás, siguiendo la regla explicada anteriormente.






     encoding


       Si encoding se omite o es **[null](#constant.null)**,
       string se asume que está codificada en
       [iconv.internal_encoding](#iconv.configuration).




       Tenga en cuenta que offset y length
       siempre se consideran como posiciones calculadas sobre la representación ASCII
       de los caracteres determinados por encoding, a diferencia de
       [substr()](#function.substr) que se basa siempre en la posición por byte.





### Valores devueltos

Devuelve la porción de string especificada por los parámetros
offset y length.

Si string es más pequeño que offset,
se devolverá **[false](#constant.false)**.
Si string tiene exactamente offset
caracteres de longitud, se devolverá una [string](#language.types.string) vacía.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        length y encoding ahora son nullable.




       7.0.11

        Si string tiene exactamente
        offset caracteres de longitud, se devolverá una cadena vacía. Antes de esta versión, se devolvía **[false](#constant.false)** en este caso.





### Ver también

    - [substr()](#function.substr) - Devuelve un segmento de string

    - [mb_substr()](#function.mb-substr) - Extrae una subcadena

    - [mb_strcut()](#function.mb-strcut) - Corta una parte de string

# ob_iconv_handler

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ob_iconv_handler — Convierte la codificación de caracteres al manejador del buffer de salida

### Descripción

**ob_iconv_handler**([string](#language.types.string) $contents, [int](#language.types.integer) $status): [string](#language.types.string)

Convierte el string codificado en internal_encoding a
output_encoding.

internal_encoding y
output_encoding deberían estar definidos en el
fichero php.ini o en [iconv_set_encoding()](#function.iconv-set-encoding).

### Parámetros

Ver [ob_start()](#function.ob-start) para más información sobre los parámetros
del manejador.

### Valores devueltos

Ver [ob_start()](#function.ob-start) para mas información sobre los valores de
retorno del manejador.

### Ejemplos

    **Ejemplo #1 Ejemplo de ob_iconv_handler()**

&lt;?php
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "ISO-8859-1");
ob_start("ob_iconv_handler"); // empieza a usarse el buffer de salida
?&gt;

### Ver también

    - [iconv_get_encoding()](#function.iconv-get-encoding) - Lee el juego de caracteres actual

    - [iconv_set_encoding()](#function.iconv-set-encoding) - Modifica el juego de caracteres de codificación actual

    - [output-control functions](#ref.outcontrol)

## Tabla de contenidos

- [iconv](#function.iconv) — Convierte una cadena de caracteres de un encodaje a otro
- [iconv_get_encoding](#function.iconv-get-encoding) — Lee el juego de caracteres actual
- [iconv_mime_decode](#function.iconv-mime-decode) — Decodifica un campo de encabezado MIME
- [iconv_mime_decode_headers](#function.iconv-mime-decode-headers) — Decodifica múltiples encabezados MIME
- [iconv_mime_encode](#function.iconv-mime-encode) — Construye un encabezado MIME con los campos field_name y field_value
- [iconv_set_encoding](#function.iconv-set-encoding) — Modifica el juego de caracteres de codificación actual
- [iconv_strlen](#function.iconv-strlen) — Devuelve el número de caracteres de una cadena
- [iconv_strpos](#function.iconv-strpos) — Encuentra la posición de la primera ocurrencia de una cadena en otra
- [iconv_strrpos](#function.iconv-strrpos) — Encuentra la posición de la última ocurrencia de un elemento en una cadena
- [iconv_substr](#function.iconv-substr) — Extrae una parte de una cadena
- [ob_iconv_handler](#function.ob-iconv-handler) — Convierte la codificación de caracteres al manejador del buffer de salida

- [Introducción](#intro.iconv)
- [Instalación/Configuración](#iconv.setup)<li>[Requerimientos](#iconv.requirements)
- [Instalación](#iconv.installation)
- [Configuración en tiempo de ejecución](#iconv.configuration)
  </li>- [Constantes predefinidas](#iconv.constants)
- [Funciones de iconv](#ref.iconv)<li>[iconv](#function.iconv) — Convierte una cadena de caracteres de un encodaje a otro
- [iconv_get_encoding](#function.iconv-get-encoding) — Lee el juego de caracteres actual
- [iconv_mime_decode](#function.iconv-mime-decode) — Decodifica un campo de encabezado MIME
- [iconv_mime_decode_headers](#function.iconv-mime-decode-headers) — Decodifica múltiples encabezados MIME
- [iconv_mime_encode](#function.iconv-mime-encode) — Construye un encabezado MIME con los campos field_name y field_value
- [iconv_set_encoding](#function.iconv-set-encoding) — Modifica el juego de caracteres de codificación actual
- [iconv_strlen](#function.iconv-strlen) — Devuelve el número de caracteres de una cadena
- [iconv_strpos](#function.iconv-strpos) — Encuentra la posición de la primera ocurrencia de una cadena en otra
- [iconv_strrpos](#function.iconv-strrpos) — Encuentra la posición de la última ocurrencia de un elemento en una cadena
- [iconv_substr](#function.iconv-substr) — Extrae una parte de una cadena
- [ob_iconv_handler](#function.ob-iconv-handler) — Convierte la codificación de caracteres al manejador del buffer de salida
  </li>
