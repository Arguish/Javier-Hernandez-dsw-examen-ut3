# Strings multibyte

# Introducción

Aunque exiten muchos idiomas en los cuales cada carácter necesario
puede ser representado por una referencia uno a uno a un valor de 8 bits, existen
también bastantes idiomas que requieren tantos caracteres para la comunicación
escrita que no pueden ser representados dentro del rango que un mero
byte puede codificar (un byte se compone de ocho bits. Cada bit puede contener solamente dos
valores distintos, uno o cero. Debido a esto, con un byte solo se pueden representar
256 valores únicos (2 a la 8ª potencia)). Los esquemas de codificación
multibyte fueron desarrollados precisamente para expresar más de 256 caracteres
en el sistema de codificación regular a nivel de bits.

Cuando se manipulan strings (trim, split, splice, etc.) en una
codificación multibyte, es neceario utilizar funciones especiales, ya que dos o más
bytes consecutivos pueden representar un único carácter en tal esquema de
codificación. Si, de lo contrario, se usa una función que no considera caracteres multibyte
con la cadena de caracteres, es probable que falle al detectar el comienzo o el final del
carácter multibyte, y que se termine con una cadena de caracteres corrupta que
probablemente pierda su significado original.

mbstring proporciona funciones específicas para cadenas de texto
multibyte que ayudan a tratar codificaciones multibyte en PHP. Además,
mbstring controla la conversión de la codificación de caracteres entre
los posibles esquemas de codificación. mbstring está diseñada para
manejar codificaciones basadas en Unicode, tales como UTF-8 y UCS-2, y, por conveniencia,
varias codificaciones de un solo byte (enumeradas más adelante).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#mbstring.installation)
- [Configuración en tiempo de ejecución](#mbstring.configuration)

## Instalación

mbstring es una extensión PHP. La extensión debe ser activada
con la opción configure.
Ver la sección [instalación](#install) para más detalles.

Las siguientes opciones de configuración están relacionadas con la extensión
mbstring.

- **--enable-mbstring** : Activa las funciones
  mbstring. Esta opción es necesaria
  para utilizar las funciones mbstring.

    libmbfl es necesario para mbstring.
    libmbfl está incluido con mbstring.
    Anterior a PHP 7.3.0, si libmbfl ya está instalado en el sistema,
    **--with-libmbfl[=DIR]** puede ser especificado para
    utilizar la biblioteca instalada.

- **--disable-mbregex** : Desactiva las
  funciones de expresión regular con soporte para caracteres multioctetos.

    Oniguruma es necesario para las funciones
    de expresión regular con soporte para caracteres multioctetos.
    A partir de PHP 7.4.0, pkg-config es utilizado para detectar la
    biblioteca libonig.
    Anterior a PHP 7.4.0, Oniguruma estaba incluido
    con mbstring, pero era posible compilar contra
    una versión de libonig ya instalada pasando
    **--with-onig[=DIR]**.

    Es posible desactivar la verificación del backtrack
    (retroceso) de las regex multioctetos especificando
    **--disable-mbregex-backtrack**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de mbstring**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [mbstring.language](#ini.mbstring.language)
      "neutral"
      **[INI_ALL](#constant.ini-all)**
       



      [mbstring.detect_order](#ini.mbstring.detect-order)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mbstring.http_input](#ini.mbstring.http-input)
      "pass"
      **[INI_ALL](#constant.ini-all)**
      Obsoleta



      [mbstring.http_output](#ini.mbstring.http-output)
      "pass"
      **[INI_ALL](#constant.ini-all)**
      Obsoleta



      [mbstring.internal_encoding](#ini.mbstring.internal-encoding)
      NULL
      **[INI_ALL](#constant.ini-all)**
      Obsoleta



      [mbstring.substitute_character](#ini.mbstring.substitute-character)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mbstring.func_overload](#ini.mbstring.func-overload)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**

       Obsoleta desde PHP 7.2.0; eliminada desde PHP 8.0.0.




      [mbstring.encoding_translation](#ini.mbstring.encoding-translation)
      "0"
      **[INI_PERDIR](#constant.ini-perdir)**
       



      [mbstring.http_output_conv_mimetypes](#ini.mbstring.http-output-conv-mimetypes)
      "^(text/|application/xhtml\+xml)"
      **[INI_ALL](#constant.ini-all)**
       



      [mbstring.strict_detection](#ini.mbstring.strict-detection)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [mbstring.regex_retry_limit](#ini.mbstring.regex-retry-limit)
      "1000000"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.4.0.



      [mbstring.regex_stack_limit](#ini.mbstring.regex-stack-limit)
      "100000"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 7.3.5.


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     mbstring.language
     [string](#language.types.string)



      El ajuste de lenguaje nacional predeterminado (NLS) usado en mbstring. Se ha de observar que esta opción
      define automágicamente mbstring.internal_encoding, por lo que
      se debe colocar mbstring.internal_encoding
      tras mbstring.language en php.ini







     mbstring.encoding_translation
     [bool](#language.types.boolean)



      Habilita el filtro de codificación de caracteres transparente para las consultas HTTP entrantes,
      la cual lleva a cabo la detección y la conversión de la codificación de entrada
      a la codificación de caracteres interna.







     mbstring.internal_encoding
     [string](#language.types.string)


     **Advertencia**
      Esta funcionalidad obsoleta *será*

ciertamente _eliminada_ en el futuro.

      Define la codificación de caracteres interna.




      Los usuarios deberían dejarla vacía y establecer
      [default_charset](#ini.default-charset)
      en su lugar.







     mbstring.http_input
     [string](#language.types.string)


     **Advertencia**
      Esta funcionalidad obsoleta *será*

ciertamente _eliminada_ en el futuro.

      Define la codificación de caracteres predeterminada de entrada de HTTP.




      Los usuarios deberían dejarla vacía y establecer
      [default_charset](#ini.default-charset)
      en su lugar.







     mbstring.http_output
     [string](#language.types.string)


     **Advertencia**
      Esta funcionalidad obsoleta *será*

ciertamente _eliminada_ en el futuro.

      Define la codificación de caracteres predeterminada de salida de HTTP (la salida será convertida de la codificación interna a la codificación de salida de HTTP).




      Los usuarios deberían dejarla vacía y establecer
      [default_charset](#ini.default-charset)
      en su lugar.







     mbstring.detect_order
     [string](#language.types.string)



      Define el orden de detección de códigos de caracteres predeterminado. Véase también
      [mb_detect_order()](#function.mb-detect-order).







     mbstring.substitute_character
     [string](#language.types.string)



      Define el caracter de sustitución para juegos de caracteres inválidos.
      Véase también [mb_substitute_character()](#function.mb-substitute-character) para valores compatibles.







     mbstring.func_overload
     [string](#language.types.string)


     **Advertencia**

Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0,
y _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta funcionalidad está altamente desaconsejado.

      Reemplaza determinadas funciones de único byte por sus equivalentes en mbstring. Véase
      la sección [Sobrecarga de funciones](#mbstring.overload) para más
      información.




      Este ajuste sólo puede ser cambiado en el fichero php.ini







     mbstring.http_output_conv_mimetypes
     [string](#language.types.string)










     mbstring.strict_detection
     [bool](#language.types.boolean)



      Habilita la detección estricta de codificaciones. Consulte [mb_detect_encoding()](#function.mb-detect-encoding)
      para obtener una descripción y ejemplos.







     mbstring.regex_retry_limit
     [int](#language.types.integer)



      Limita la cantidad de retroceso que se puede realizar durante una coincidencia
      de mbregex.




      Esta configuración solo tiene efecto al enlazar con oniguruma &gt;= 6.8.0.







     mbstring.regex_stack_limit
     [int](#language.types.integer)



      Limita la profundidad de la pila de las expresiones regulares de mbstring.


De acuerdo a la [» especificación de HTML 4.01](http://www.w3.org/TR/REC-html40/interact/forms.html#adef-accept-charset),
se permite que los navegadores envíen un formulario con una codificación
diferente a la utilizada por la página.
Véase [mb_http_input()](#function.mb-http-input) para consultar los juegos de caracteres
utilizados por los navegadores.

Pese a que la mayoría de navegadores son capaces de averiguar la codificación
de un determinado documento HTML, es aconsejable utilizar el
parámetro charset en la cabecera
Content-Type de HTTP con un valor apropiado, mediante
[header()](#function.header) o mediante el ajuste ini
[default_charset](#ini.sect.data-handling).

**Ejemplo #1 Ejemplos de ajustes de php.ini**

; Establecer el lenguaje predeterminado
mbstring.language = Neutral; Establecer el lenguaje neutral(UTF-8) (predeterminado)
mbstring.language = English; Establecer como lenguaje el inglés
mbstring.language = Japanese; Establecer como lenguaje el japonés

;; Establecer la codificación interna predeterminada
;; Nota: Asegúrese de usar una codificación que funcione con PHP
mbstring.internal_encoding = UTF-8 ; Establecer la codificación interna a UTF-8

;; Traducción de codificación HTTP entrante habilitada
mbstring.encoding_translation = On

;; Establecer la codificación de caracteres predeterminada de HTTP entrante
;; Nota: Un script no podrá cambiar el ajuste http_input.
mbstring.http_input = pass ; Sin conversión.
mbstring.http_input = auto ; Establecer la entrada HTTP en automático
; "auto" se expande de acuerdo a mbstring.language
mbstring.http_input = SJIS ; Establecer la entrada HTTP a SJIS
mbstring.http_input = UTF-8,SJIS,EUC-JP ; Especificar el orden

;; Establecer la codificación de caracteres predeterminada de HTTP saliente
mbstring.http_output = pass ; Sin conversión
mbstring.http_output = UTF-8 ; Establecer la codificación de salida HTTP a UTF-8

;; Establecer el orden predeterminado de la detección de juegos de caracteres
mbstring.detect_order = auto ; Orden de detección automático
mbstring.detect_order = ASCII,JIS,UTF-8,SJIS,EUC-JP ; Especificar el orden

;; Establecer el carácter de sustitución predeterminado
mbstring.substitute_character = 12307 ; Especificar un valor Unicode
mbstring.substitute_character = none ; No imprimir el carácter
mbstring.substitute_character = long ; Ejemplo de long: U+3000,JIS+7E7E

**Ejemplo #2 Ajustes de php.ini para usuarios de EUC-JP**

;; Deshabilitar el almacenamiento en el búfer de salida
output_buffering = Off

;; Establecer el juego de caracteres de las cabeceras HTTP
default_charset = EUC-JP

;; Establecer como lenguaje predeterminado el japonés
mbstring.language = Japanese

;; Habilitar la traducción de la codificación del HTTP entrante.
mbstring.encoding_translation = On

;; Establecer en automática la conversión de la codificación de HTTP entrante
mbstring.http_input = auto

;; Convertir la salida de HTTP a EUC-JP
mbstring.http_output = EUC-JP

;; Establecer EUC-JP como codificación interna
mbstring.internal_encoding = EUC-JP

;; No imprimir caracteres inválidos
mbstring.substitute_character = none

**Ejemplo #3 Ajustes de php.ini para usuarios de SJIS**

;; Habilitar el almacenamiento en el búfer de salida
output_buffering = On

;; Establecer mb_output_handler para habilitar la conversión de los datos de salida
output_handler = mb_output_handler

;; Establecer el juego de caracteres de las cabeceras HTTP
default_charset = Shift_JIS

;; Establecer como lenguaje predeterminado el japonés
mbstring.language = Japanese

;; Establecer en automático la conversión del juego de caracteres http entrante
mbstring.http_input = auto

;; Convertir a SJIS
mbstring.http_output = SJIS

;; Establecer EUC-JP como codificación interna
mbstring.internal_encoding = EUC-JP

;; No imprimir caracteres inválidos
mbstring.substitute_character = none

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[MB_OVERLOAD_MAIL](#constant.mb-overload-mail)**
    ([int](#language.types.integer))



     Eliminado desde PHP 8.0.0.





    **[MB_OVERLOAD_STRING](#constant.mb-overload-string)**
    ([int](#language.types.integer))



     Eliminado desde PHP 8.0.0.





    **[MB_OVERLOAD_REGEX](#constant.mb-overload-regex)**
    ([int](#language.types.integer))



     Eliminado desde PHP 8.0.0.





    **[MB_CASE_UPPER](#constant.mb-case-upper)**
    ([int](#language.types.integer))



     Realiza una conversión completa a mayúsculas.
     Esto puede cambiar la longitud del string.
     Este es el modo utilizado por mb_strtoupper().





    **[MB_CASE_LOWER](#constant.mb-case-lower)**
    ([int](#language.types.integer))



     Realiza una conversión completa a minúsculas.
     Esto puede cambiar la longitud del string.
     Este es el modo utilizado por mb_strtolower().





    **[MB_CASE_TITLE](#constant.mb-case-title)**
    ([int](#language.types.integer))



     Realiza una conversión completa a title-case basada en las propiedades derivadas de
     Unicode Cased y CaseIgnorable.
     En particular, esto mejora el manejo de las comillas y los apóstrofes.
     Esto puede cambiar la longitud del string.





    **[MB_CASE_FOLD](#constant.mb-case-fold)**
    ([int](#language.types.integer))



     Realiza una conversión completa que elimina las distinciones de
     mayúsculas y minúsculas presentes en el string.
     Esto se utiliza para la comparación sin distinción entre mayúsculas y minúsculas.
     Esto puede cambiar la longitud del string.
     Disponible desde PHP 7.3.





    **[MB_CASE_LOWER_SIMPLE](#constant.mb-case-lower-simple)**
    ([int](#language.types.integer))



     Realiza una conversión simple a minúsculas.
     Esto no cambia la longitud del string.
     Disponible desde PHP 7.3.





    **[MB_CASE_UPPER_SIMPLE](#constant.mb-case-upper-simple)**
    ([int](#language.types.integer))



     Realiza una conversión simple a mayúsculas.
     Esto no cambia la longitud del string.
     Disponible desde PHP 7.3.





    **[MB_CASE_TITLE_SIMPLE](#constant.mb-case-title-simple)**
    ([int](#language.types.integer))



     Realiza una conversión simple a title-case.
     Performs simple title-case fold conversion.
     Esto no cambia la longitud del string.
     Disponible desde PHP 7.3.





    **[MB_CASE_FOLD_SIMPLE](#constant.mb-case-fold-simple)**
    ([int](#language.types.integer))



     Realiza una conversión simple que elimina las distinciones de
     mayúsculas y minúsculas presentes en el string.
     Esto se utiliza para la comparación sin distinción entre mayúsculas y minúsculas.
     Esto no cambia la longitud del string.
     Utilizado internamente por las operaciones sin distinción entre mayúsculas y minúsculas de la extensión MBString.
     Disponible desde PHP 7.3.





    **[MB_ONIGURUMA_VERSION](#constant.mb-oniguruma-version)**
    ([string](#language.types.string))



     La versión de Oniguruma, p. ej. 6.9.4.
     Disponible desde PHP 7.4.

# Juegos de caracteres soportados

   <caption>**Juegos de caracteres soportados**</caption>
   Nombre en el registro IANA
   Juegos de caracteres
   Descripción
   Notas
   
    ISO-10646-UCS-4
    ISO 10646
    
     El juego de caracteres universal (Universal Character Set),
     con 31 bits por caracter, al estándar UCS-4
     por ISO/IEC 10646. Está sincronizado con
     la última versión de Unicode.
    
    
     Si este nombre es utilizado en la herramienta de conversión, el convertidor
     intenta reconocer el texto a partir del último BOM
     (byte order mark), para conocer el orden
     de los bits.
    
   
   
    ISO-10646-UCS-4
    UCS-4
    
     Ver arriba.
    
    
     A diferencia de UCS-4, las cadenas se suponen
     estar en formato big endian.
    
   
   
    ISO-10646-UCS-4
    UCS-4
    
     Ver arriba.
    
    
     A diferencia de UCS-2, las cadenas se suponen
     estar en formato little endian.
    
   
   
    ISO-10646-UCS-2
    UCS-2
    
     El juego de caracteres universal (Universal Character Set),
     con 16 bits por caracter, al estándar UCS-2
     por ISO/IEC 10646. Está sincronizado con
     la última versión de Unicode.
    
    
     Si este nombre es utilizado en la herramienta de conversión, el convertidor
     intenta reconocer el texto a partir del último BOM
     (byte order mark), para conocer el orden
     de los bits.
    
   
   
    ISO-10646-UCS-2
    UCS-2
    
     Ver arriba.
    
    
     A diferencia de UCS-4, las cadenas se suponen
     estar en formato big endian.
    
   
   
    UTF-32
    Unicode
    
     Formato de transformación de Unicode, de 32 bits, cuyas cartas
     corresponden al juego estándar Unicode. Este juego no es idéntico
     a UCS-4 porque los caracteres Unicode estaban limitados
     a valores de 21 bits.
    
    
     Si este nombre es utilizado en la herramienta de conversión, el convertidor
     intenta reconocer el texto a partir del último BOM
     (byte order mark), para conocer el orden
     de los bits.
    
   
   
    UTF-32BE
    Unicode
    
     Ver arriba.
    
    
     A diferencia de UTF-32, las cadenas se suponen
     estar en formato big endian.
    
   
   
    UTF-32LE
    Unicode
    
     Ver arriba.
    
    
     A diferencia de UTF-32, las cadenas se suponen
     estar en formato little endian.
    
   
   
    UTF-16
    Unicode
    
     Formato de transformación de Unicode sobre 16 bits. Se debe notar
     que UTF-16 ya no es idéntico a  UCS-2
     porque un mecanismo fue introducido en Unicode 2.0 y
     UTF-16 ahora hace referencia a un
     codificación de 21 bits.
    
    
     Si este nombre es utilizado en la herramienta de conversión, el convertidor
     intenta reconocer el texto a partir del último BOM
     (byte order mark), para conocer el orden
     de los bits.
    
   
   
    UTF-16BE
    Unicode
    
     Ver arriba.
    
    
     A diferencia de UTF-16, las cadenas se suponen
     estar en formato big endian.
    
   
   
    UTF-16LE
    Unicode
    
     Ver arriba.
    
    
     A diferencia de UTF-16, las cadenas se suponen
     estar en formato little endian.
    
   
   
    UTF-8
    Unicode / UCS
    
     Formato de transformación Unicode de 8 bits.
    
    ninguno
   
   
    UTF-7
    Unicode
    
     Un formato compatible con el correo electrónico de Unicode,
     especificado en [» RFC2152](https://datatracker.ietf.org/doc/html/rfc2152).
    
    ninguno
   
   
    ninguno
    Unicode
    
     Una variante de UTF-7 que es especialmente utilizada en el
     [» protocolo IMAP](https://datatracker.ietf.org/doc/html/rfc3501).
    
    ninguno
   
   
    
     US-ASCII (recomendado) / iso-ir-6 / ANSI_X3.4-1986 /
     ISO_646.irv:1991 / ASCII / ISO646-US / us / IBM367 / CP367 / csASCII
    
    ASCII / ISO 646
    
     ASCII, American Standard Code for Information Interchange
     es un formato clásico de 7 bits. También está normalizado internacionalmente,
     bajo el nombre ISO 646.
    
    (ninguno)
   
   
    
     EUC-JP (recomendado) /
     Extended_UNIX_Code_Packed_Format_for_Japanese / csEUCPkdFmtJapanese
    
    
     Compuesto de US-ASCII / JIS X0201:1997 (hankaku kana) /
     JIS X0208:1990 / JIS X0212:1990
    
    
     Como se puede ver, el nombre deriva de la abreviatura de
     Extended UNIX Code Packed Format for Japanese,
     este juego es esencialmente utilizado en plataformas Unix.
     El juego original, Extended UNIX Code,
     está diseñado sobre la base de ISO 2022.
    
    
     El juego identificado por EUC-JP es diferente
     de IBM932 / CP932, que es utilizado por
     OS/2® y Microsoft® Windows®.
     Para intercambiar información con estas plataformas,
     utilice EUCJP-WIN.
    
   
   
    Shift_JIS (recomendado) / MS_Kanji / csShift_JIS
    Compuesto de JIS X0201:1997 / JIS X0208:1997
    
     Shift_JIS fue desarrollado a principios de los años 80,
     y, al mismo tiempo, los primeros procesadores de texto estaban
     en el mercado. Fue hecho para conservar la compatibilidad con
     el juego JIS X 0201:1976. Según la definición de
     IANA, el juego de caracteres Shift_JIS es ligeramente
     diferente de IBM932 / CP932. Sin embargo, los nombres
     "SJIS" y  "Shift_JIS" son
     a menudo utilizados erróneamente, para estos juegos.
    
    Para CP932, utilice SJIS-WIN.
   
   
    (ninguno)
    
     Compuesto de JIS X0201:1997 / JIS X0208:1997 / IBM extensions / NEC extensions
    
    
     Aunque este "juego de caracteres" utiliza el mismo juego que
     EUC-JP, en realidad es diferente. Solo tiene
     algunos caracteres de diferencia.
    
    ninguno
   
   
    Windows-31J / csWindows31J
    
     Compuesto de JIS X0201:1997 / JIS X0208:1997 / IBM extensions / NEC extensions
    
    
     Aunque este "juego de caracteres" utiliza el mismo juego que
     Shift_JIS, en realidad es diferente. Solo tiene
     algunos caracteres de diferencia.
    
    (ninguno)
   
   
    ISO-2022-JP (recomendado) / csISO2022JP
    
     US-ASCII / JIS X0201:1976 / JIS X0208:1978 / JIS X0208:1983
    
    [» RFC1468](https://datatracker.ietf.org/doc/html/rfc1468)
    ninguno
   
   
    JIS
    
    
    
   
   
    ISO-8859-1
    
    
    
   
   
    ISO-8859-2
    
    
    
   
   
    ISO-8859-3
    
    
    
   
   
    ISO-8859-4
    
    
    
   
   
    ISO-8859-5
    
    
    
   
   
    ISO-8859-6
    
    
    
   
   
    ISO-8859-7
    
    
    
   
   
    ISO-8859-8
    
    
    
   
   
    ISO-8859-9
    
    
    
   
   
    ISO-8859-10
    
    
    
   
   
    ISO-8859-13
    
    
    
   
   
    ISO-8859-14
    
    
    
   
   
    ISO-8859-15
    
    
    
   
   
    ISO-8859-16
    
    
    
   
   
    byte2be
    
    
    
   
   
    byte2le
    
    
    
   
   
    byte4be
    
    
    
   
   
    byte4le
    
    
    
   
   
    BASE64
    
    
    
   
   
    HTML-ENTITIES
    
    
    
   
   
    7bit
    
    
    
   
   
    8bit
    
    
    
   
   
    EUC-CN
    
    
    
   
   
    CP936
    
    
    
   
   
    HZ
    
    
    
   
   
    EUC-TW
    
    
    
   
   
    CP950
    
    
    
   
   
    BIG-5
    
    
    
   
   
    EUC-KR
    
    
    
   
   
    UHC (CP949)
    
    
    
   
   
    ISO-2022-KR
    
    
    
   
   
    Windows-1251 (CP1251)
    
    
    
   
   
    Windows-1252 (CP1252)
    
    
    
   
   
    CP866 (IBM866)
    
    
    
   
   
    KOI8-R
    
    
    
   
   
    KOI8-U
    
    
    
   
  


# Casos de caracteres japoneses

Los caracteres japoneses solo pueden ser representados con encodings multiocteto y los estándares de encoding múltiple se utilizan según la plataforma y el texto de referencia. Para facilitar las cosas, estos estándares de encodings difieren ligeramente entre sí.
Para desarrollar aplicaciones Web en entorno japonés, el desarrollador deberá tener en cuenta estas complejidades a fin de asegurarse de que se utilice el encoding de caracteres correcto.

- El tamaño necesario para un carácter puede llegar hasta 4 octetos.

- Un carácter japonés multiocteto ocupa generalmente dos octetos, en comparación con los caracteres mono-octeto tradicionalmente utilizados. Estos caracteres se denominan "zen-kaku", lo que significa "gran anchura". Los más pequeños se denominan "han-kaku", lo que significa "media anchura".

- Algunos encodings de caracteres utilizan secuencias "shift" (escape) definidas en la referencia ISO-2022 para cambiar a la tabla de encoding del código específico (00h a 7fh).

- ISO-2022-JP debe ser utilizado para los protocolos SMTP/NNTP, y los encabezados así como las entidades deberían ser reencodificados de acuerdo con la RFC correspondiente. Aunque esto no es requerido, sigue siendo una buena idea ya que muchos user-agent (agentes de usuario) populares no pueden reconocer otro método de encoding.

- Las páginas Web creadas para teléfonos móviles como
  [» i-mode](http://www.nttdocomo.com/services/imode/),
  o [» EZweb](http://www.au.kddi.com/english/service/ezweb/index.html)
  están supuestas a utilizar el encoding Shift_JIS.

- Los emojis utilizados para teléfonos móviles, tales como
  [» i-mode](http://www.nttdocomo.com/services/imode/) o
  [» EZweb](http://www.au.kddi.com/english/service/ezweb/index.html) son soportados.

# Entradas/Salidas HTTP

La conversión automática de las entradas/salidas HTTP puede
también convertir datos binarios. Los usuarios deben controlar las conversiones,
si los datos binarios deben ser utilizados mediante HTTP.

**Nota**:

Si el atributo enctype de la etiqueta form
vale multipart/form-data y la directiva del
php.ini está posicionada a On, las variables y los nombres de ficheros
subidos mediante el método POST serán convertidos con la codificación interna.
De lo contrario, la conversión no se realizará.

- Entrada HTTP

    No hay medios para controlar la conversión de caracteres HTTP en entrada,
    desde un script PHP. Para desactivar esta conversión, debe hacerse desde el fichero php.ini.

    **Ejemplo #1
    Desactiva la conversión HTTP en el php.ini
    **

;; Desactivar la conversión de entrada HTTP
mbstring.http_input = pass
;; Desactivar la conversión de entrada HTTP
mbstring.encoding_translation = Off

     Cuando se utiliza PHP como módulo Apache, es posible anular la configuración del php.ini
     para cada Virtual Host en el fichero
     httpd.conf o por directorio con el fichero
     .htaccess. Consúltese la sección de
     [configuración](#configuration) así como el manual de Apache.

- Salidas HTTP

    Existen varios medios para activar la conversión en salida de script
    PHP. Uno de ellos utiliza php.ini, otro utiliza [ob_start()](#function.ob-start) con la función
    [mb_output_handler()](#function.mb-output-handler) como función de retrollamada.

**Ejemplo #2 Ejemplo de configuración de mbstring en php.ini**

;; Habilitar la conversión de codificación de caracteres en salida para todas las páginas PHP

;; Habilitar el búfer de salida
output_buffering = On

;; Establecer mb_output_handler para habilitar la conversión en salida
output_handler = mb_output_handler

**Ejemplo #3 Ejemplo de script con mbstring**

&lt;?php

// Habilitar la conversión de codificación de caracteres en salida HTTP solo para esta página

// Establecer la codificación de caracteres en salida HTTP a SJIS
mb_http_output('SJIS');

// Iniciar el búfer y especificar "mb_output_handler" como
// función de retrollamada
ob_start('mb_output_handler');

?&gt;

# Juegos de caracteres soportados

Actualmente, los siguientes juegos de caracteres son
soportados por mbstring. La codificación
de caracteres puede ser especificada
mediante los parámetros encoding en las funciones
mbstring.

Los siguientes juegos de caracteres son soportados por
mbstring:

- UCS-4\*

- UCS-4BE

- UCS-4LE\*

- UCS-2

- UCS-2BE

- UCS-2LE

- UTF-32\*

- UTF-32BE\*

- UTF-32LE\*

- UTF-16\*

- UTF-16BE\*

- UTF-16LE\*

- UTF-7

- UTF7-IMAP

- UTF-8\*

- ASCII\*

- EUC-JP\*

- SJIS\*

- eucJP-win\*

- SJIS-win\*

- ISO-2022-JP

- ISO-2022-JP-MS

- CP932

- CP51932

- SJIS-mac (alias: MacJapanese)

- SJIS-Mobile#DOCOMO (alias: SJIS-DOCOMO)

- SJIS-Mobile#KDDI (alias: SJIS-KDDI)

- SJIS-Mobile#SOFTBANK (alias: SJIS-SOFTBANK)

- UTF-8-Mobile#DOCOMO (alias: UTF-8-DOCOMO)

- UTF-8-Mobile#KDDI-A

- UTF-8-Mobile#KDDI-B (alias: UTF-8-KDDI)

- UTF-8-Mobile#SOFTBANK (alias: UTF-8-SOFTBANK)

- ISO-2022-JP-MOBILE#KDDI (alias: ISO-2022-JP-KDDI)

- JIS

- JIS-ms

- CP50220

- CP50220raw

- CP50221

- CP50222

- ISO-8859-1\*

- ISO-8859-2\*

- ISO-8859-3\*

- ISO-8859-4\*

- ISO-8859-5\*

- ISO-8859-6\*

- ISO-8859-7\*

- ISO-8859-8\*

- ISO-8859-9\*

- ISO-8859-10\*

- ISO-8859-13\*

- ISO-8859-14\*

- ISO-8859-15\*

- ISO-8859-16\*

- byte2be

- byte2le

- byte4be

- byte4le

- BASE64

- HTML-ENTITIES (alias: HTML)

- 7bit

- 8bit

- EUC-CN\*

- CP936

- GB18030

- HZ

- EUC-TW\*

- CP950

- BIG-5\*

- EUC-KR\*

- UHC (alias: CP949)

- ISO-2022-KR

- Windows-1251 (alias: CP1251)

- Windows-1252 (alias: CP1252)

- CP866 (alias: IBM866)

- KOI8-R\*

- KOI8-U\*

- ArmSCII-8 (alias: ArmSCII8)

* : codificaciones también utilizables en expresiones regulares.

Todas las entradas del php.ini que aceptan un nombre de codificación
pueden también utilizar los valores "auto"
y "pass".
Las funciones mbstring, que aceptan
nombres de juegos de caracteres, pueden también utilizar el valor
"auto".

Si "pass" es utilizada, ninguna conversión
se efectúa.

Si "auto" es definido, la lista será extendida a la lista de codificaciones
definidas por [NLS](#mbstring.configuration).
Por ejemplo, si NLS vale Japanese, los valores serán
"ASCII,JIS,UTF-8,EUC-JP,SJIS".

Ver también [mb_detect_order()](#function.mb-detect-order).

#

Función de sobrecarga

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0,
y _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta funcionalidad está altamente desaconsejado.

Puede resultar difícil lograr que una aplicación PHP existente
funcione en un entorno multibyte determinado. Esto se debe a que la mayoría
de las aplicaciones PHP están escritas con funciones de string estándar
como [substr()](#function.substr), que es conocida por
no manejar correctamente los strings codificados en multibyte.

mbstring admite la sobrecarga de funciones, lo que permite añadir
compatibilidad con multibyte a este tipo de aplicaciones sin
modificar el código, mediante la sobrecarga de las funciones equivalentes para multibyte en
las funciones de string estándar. Por ejemplo,
si la sobrecarga de funciones está habilitada,
se llama a [mb_substr()](#function.mb-substr)
en lugar de a [substr()](#function.substr).
Esta característica facilita la migración de aplicaciones que solo admiten
codificaciones de un solo byte a un entorno multibyte en muchos casos.

Para utilizar la sobrecarga de funciones, establezca
mbstring.func_overload, en el php.ini, a
un valor positivo que represente una combinación de máscaras de bits especificando
las categorías de funciones a sobrecargar. Debe ser definido
a 1 para sobrecargar la función [mail()](#function.mail), 2 para las
funciones de strings, 4 para las funciones de expresiones regulares. Por ejemplo,
con el valor 7, todas las funciones anteriores serán
sobrecargadas. A continuación se muestra la lista de funciones sobrecargadas.

   <caption>**Funciones de reemplazo**</caption>
   
    
     
      Valor de mbstring.func_overload
      Función original
      Función de reemplazo


      1
      [mail()](#function.mail)
      [mb_send_mail()](#function.mb-send-mail)



      2
      [strlen()](#function.strlen)
      [mb_strlen()](#function.mb-strlen)



      2
      [strpos()](#function.strpos)
      [mb_strpos()](#function.mb-strpos)



      2
      [strrpos()](#function.strrpos)
      [mb_strrpos()](#function.mb-strrpos)



      2
      [substr()](#function.substr)
      [mb_substr()](#function.mb-substr)



      2
      [strtolower()](#function.strtolower)
      [mb_strtolower()](#function.mb-strtolower)



      2
      [strtoupper()](#function.strtoupper)
      [mb_strtoupper()](#function.mb-strtoupper)



      2
      [stripos()](#function.stripos)
      [mb_stripos()](#function.mb-stripos)



      2
      [strripos()](#function.strripos)
      [mb_strripos()](#function.mb-strripos)



      2
      [strstr()](#function.strstr)
      [mb_strstr()](#function.mb-strstr)



      2
      [stristr()](#function.stristr)
      [mb_stristr()](#function.mb-stristr)



      2
      [strrchr()](#function.strrchr)
      [mb_strrchr()](#function.mb-strrchr)



      2
      [substr_count()](#function.substr-count)
      [mb_substr_count()](#function.mb-substr-count)


**Nota**:

No se recomienda utilizar la opción de sobrecarga de funciones en
el contexto por directorio, ya que aún no se ha confirmado que sea
lo suficientemente estable en un entorno de producción y puede provocar un
comportamiento indefinido.

# Requerimientos para la codificación de caracteres en PHP

Las codificaciones de los siguientes tipos se pueden utilizar con PHP de forma segura.

- Codificaciones de un solo byte,

     <li class="listitem">
      
       que tienen mapas de referencia compatibles con ASCII (ISO646) para los
       caracteres en el rango de 00h a
       7fh.
      


   </li>
   - 
    
     Codificación multibyte,


      <li class="listitem">

        que tienen mapas de referencia compatibles con ASCII para los caracteres en el rango de
        00h a 7fh.



      -

        que no utilizan secuencias de escape ISO2022.



      -

        que no utilizan un valor en el rango de 00h a
        7fh en cualquiera de los bytes compuestos
        que representan un carácter sencillo.





   </li>
  
 
 
  Estos son ejemplos de codificaciones de caracteres que es poco probable que funcionen
  con PHP.


JIS, SJIS, ISO-2022-JP, BIG-5

Aunque algunos scripts de PHP escritos en estas codificaciones podrían no funcionar,
especialmente en el caso donde los strings codificados aparecen como identificadores
o como literales en el propio script, se puede evitar el uso de estas codificaciones
configurando la función de filtro de codificación transparente de
mbstring para las consultas HTTP entrantes.

**Nota**:

Se desaconseja energicamente el uso de SJIS, BIG5, CP936, CP949 y GB18030 para
la codificación interna, a menos que se esté familiarizado con el analizador,
el explorador y la codificación de caracteres.

**Nota**:

Si se va a conectar a una base de datos con PHP, se recomienda
utilizar la misma codificación de caracteres para la base de datos y la
codificación interna para un uso más sencillo y un mejor
rendimiento.

Si se utiliza PostgreSQL, la codificación utilizada en la base de datos y la utilizada
en PHP puede ser distinta debido a que se admite la conversión automática del conjunto
de caracteres entre la parte final y la inicial del proceso.

# Funciones de strings multibyte

# Referencias

Los esquemas de codificación de caracteres multibyte y temas relacionados son
muy complicados y están fuera del alcance de esta documentación.
Se aconseja visitar los siguientes URLs y otros recursos para
tener unos conocimientos más amplios que los escritos en estos temas.

    -

      Documentación de Unicode




      [» http://www.unicode.org/](http://www.unicode.org/)





    -

      Información sobre los conjuntos de caracteres japonés/coreano/chino




      [» https://resources.oreilly.com/examples/9781565922242/blob/master/doc/cjk.inf](https://resources.oreilly.com/examples/9781565922242/blob/master/doc/cjk.inf)


# mb_check_encoding

(PHP 4 &gt;= 4.4.3, PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

mb_check_encoding — Verifica si las cadenas son válidas para el encodage especificado

### Descripción

**mb_check_encoding**([array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $value = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [bool](#language.types.boolean)

Verifica si el flujo de octetos es válido para el encodage específico.
Si value es de tipo [array](#language.types.array), todas las claves y los valores son validados de manera recursiva.
Es útil para prever lo que se conoce como « ataque por encodage inválido ».

### Parámetros

     value


       El flujo de octetos o [array](#language.types.array) a verificar. Si es omitido, esta función verifica
       todas las entradas desde el inicio de la petición.



     **Advertencia**

        A partir de PHP 8.1.0, la omisión de este argumento o el paso de **[null](#constant.null)** está obsoleto.







     encoding


       Encodage esperado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

        La llamada a esta función con **[null](#constant.null)** como value o sin argumento está obsoleta.




      8.0.0

       value y encoding ahora son nullable.




      7.2.0

       Esta función ahora también acepta un [array](#language.types.array) como valor de
       value.
       Anteriormente, solo las [string](#language.types.string) eran soportadas.



# mb_chr

(PHP 7 &gt;= 7.2.0, PHP 8)

mb_chr — Devuelve un carácter por su valor de punto de código Unicode

### Descripción

**mb_chr**([int](#language.types.integer) $codepoint, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una cadena que contiene el carácter especificado por el valor del punto
de código Unicode, codificado en la codificación especificada.

Esta función complementa a [mb_ord()](#function.mb-ord).

### Parámetros

    codepoint


      Un valor de punto de código Unicode, p. ej. 128024
      para *U+1F418 ELEPHANT*






    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Una cadena que contiene el carácter solicitado, si puede ser representado
en la codificación especificada o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ejemplos

**Ejemplo #1 Testing different code points**

    &lt;?php

$values = [65, 63, 0x20AC, 128024];
foreach ($values as $value) {
    var_dump(mb_chr($value, 'UTF-8'));
var_dump(mb_chr($value, 'ISO-8859-1'));
}
?&gt;

El ejemplo anterior mostrará:

    string(1) "A"

string(1) "A"
string(1) "?"
string(1) "?"
string(3) "€"
bool(false)
string(4) "🐘"
bool(false)

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_ord()](#function.mb-ord) - Obtiene el punto de código Unicode de un carácter

    - [IntlChar::ord()](#intlchar.ord) - Devuelve el valor del punto de código Unicode de un carácter

    - [chr()](#function.chr) - Generar un string de un byte a partir de un número

# mb_convert_case

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mb_convert_case — Realiza una conversión a mayúsculas/minúsculas de un string

### Descripción

**mb_convert_case**([string](#language.types.string) $string, [int](#language.types.integer) $mode, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una conversión a mayúsculas/minúsculas de un [string](#language.types.string), de acuerdo al
valor especificado en mode.

### Parámetros

     string


       El [string](#language.types.string) que se va a convertir.






     mode


       El modo de conversión. Puede ser uno de
       **[MB_CASE_UPPER](#constant.mb-case-upper)**,
       **[MB_CASE_LOWER](#constant.mb-case-lower)**,
       **[MB_CASE_TITLE](#constant.mb-case-title)**,
       **[MB_CASE_FOLD](#constant.mb-case-fold)**,
       **[MB_CASE_UPPER_SIMPLE](#constant.mb-case-upper-simple)**,
       **[MB_CASE_LOWER_SIMPLE](#constant.mb-case-lower-simple)**,
       **[MB_CASE_TITLE_SIMPLE](#constant.mb-case-title-simple)**,
       **[MB_CASE_FOLD_SIMPLE](#constant.mb-case-fold-simple)**.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

La versión convertida del string en función
del valor especificado en mode.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Se implementaron reglas de mayúsculas y minúsculas condicionales
        para la letra griega sigma que solo se aplican a los modos
        **[MB_CASE_LOWER](#constant.mb-case-lower)** y **[MB_CASE_TITLE](#constant.mb-case-title)**,
        no a **[MB_CASE_LOWER_SIMPLE](#constant.mb-case-lower-simple)** y
        **[MB_CASE_TITLE_SIMPLE](#constant.mb-case-title-simple)**.




       7.3.0

        Añadido soporte para
        **[MB_CASE_FOLD](#constant.mb-case-fold)**,
        **[MB_CASE_UPPER_SIMPLE](#constant.mb-case-upper-simple)**,
        **[MB_CASE_LOWER_SIMPLE](#constant.mb-case-lower-simple)**,
        **[MB_CASE_TITLE_SIMPLE](#constant.mb-case-title-simple)**, y
        **[MB_CASE_FOLD_SIMPLE](#constant.mb-case-fold-simple)**
        como mode.





### Ejemplos

    **Ejemplo #1 Ejemplo de mb_convert_case()**

&lt;?php
$str = "mary had a Little lamb and she loved it so";
$str = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
echo $str, PHP_EOL;
$str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
echo $str, PHP_EOL;
?&gt;

    **Ejemplo #2 Ejemplo de mb_convert_case()** con alfabeto no latino en UTF-8

&lt;?php
$str = "Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός";
$str = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
echo $str, PHP_EOL;
$str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
echo $str, PHP_EOL;
?&gt;

### Notas

    A diferencia de las funciones estándar de mayúsculas/minúsculas, como

[strtolower()](#function.strtolower) y [strtoupper()](#function.strtoupper),
la conversión se lleva a cabo según los fundamentos de las propiedades de los
caracteres Unicode. Por lo tanto, el comportamiento de esta función
no se ve afectado por la configuración regional y puede convertir cualquier
carácter que tenga propiedad 'alfabética', como la a con diéresis (ä).

Para más información sobre las propiedades Unicode, por favor, revise [» http://www.unicode.org/reports/tr21/](http://www.unicode.org/reports/tr21/).

### Ver también

    - [mb_strtolower()](#function.mb-strtolower) - Convierte todos los caracteres a minúsculas

    - [mb_strtoupper()](#function.mb-strtoupper) - Convierte todos los caracteres a mayúsculas

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

    - [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

    - [ucwords()](#function.ucwords) - Pone en mayúscula la primera letra de todas las palabras

# mb_convert_encoding

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_convert_encoding — Convertir una cadena de un codificación de caracteres a otra

### Descripción

**mb_convert_encoding**([array](#language.types.array)|[string](#language.types.string) $string, [string](#language.types.string) $to_encoding, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $from_encoding = **[null](#constant.null)**): [array](#language.types.array)|[string](#language.types.string)|[false](#language.types.singleton)

Convierte la string desde from_encoding,
o la codificación interna actual, a to_encoding.
Opcionalmente desde from_encoding.
Si string es un [array](#language.types.array), todos sus valores [string](#language.types.string)
serán convertidos recursivamente.

### Parámetros

     string


       La [string](#language.types.string) o [array](#language.types.array) a convertir.






     to_encoding


       La codificación deseada del resultado.






     from_encoding


       La codificación actual utilizada para interpretar la string.
       Múltiples codificaciones pueden ser especificadas en forma de array ([array](#language.types.array)) o lista separada por comas.
       En este caso, la codificación correcta será adivinada utilizando el
       mismo algoritmo que [mb_detect_encoding()](#function.mb-detect-encoding).




       Si from_encoding es omitido o **[null](#constant.null)**, el
       parámetro [mbstring.internal_encoding](#ini.mbstring.internal-encoding)
       será utilizado si está definido, de lo contrario el parámetro [default_charset](#ini.default-charset) será utilizado.




       Ver [codificaciones soportadas](#mbstring.supported-encodings)
       para los valores válidos de to_encoding
       y from_encoding.





### Valores devueltos

La [string](#language.types.string) o [array](#language.types.array) codificado en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

A partir de PHP 8.0.0, una [ValueError](#class.valueerror) es lanzada si la
valor de to_encoding o
from_encoding es una codificación inválida.
Anterior a PHP 8.0.0, una **[E_WARNING](#constant.e-warning)** era emitida en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       **mb_convert_encoding()** ya no devolverá
       las siguientes codificaciones no textuales:
       "Base64", "QPrint",
       "UUencode", "HTML entities",
       "7 bit" y "8 bit".




      8.0.0

       **mb_convert_encoding()** lanzará ahora una
       [ValueError](#class.valueerror) cuando
       to_encoding es pasado una codificación inválida.




      8.0.0

       **mb_convert_encoding()** lanzará ahora una
       [ValueError](#class.valueerror) cuando
       from_encoding es pasado una codificación inválida.




      8.0.0

       from_encoding ahora es nullable.




      7.2.0

       Esta función ahora acepta un [array](#language.types.array) como
       string.
       Anteriormente, solo las [string](#language.types.string) eran soportadas.



### Ejemplos

    **Ejemplo #1 Ejemplo con mb_convert_encoding()**

&lt;?php
/_ Convierte la codificación interna a SJIS _/
$str = mb_convert_encoding($str, "SJIS");

/_ Convierte EUC-JP a UTF-7 _/
$str = mb_convert_encoding($str, "UTF-7", "EUC-JP");

/_ Detecta automáticamente una codificación entre JIS, eucjp-win o sjis-win,
Luego convierte a UCS-2LE _/
$str = mb_convert_encoding($str, "UCS-2LE", "JIS, eucjp-win, sjis-win");

/_ Si mbstring.language es "Japanese", "auto" es extendido a "ASCII,JIS,UTF-8,EUC-JP,SJIS" _/
$str = mb_convert_encoding($str, "EUC-JP", "auto");
?&gt;

### Ver también

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

    - [UConverter::transcode()](#uconverter.transcode) - Convierte una cadena de un juego de caracteres a otro

    - [iconv()](#function.iconv) - Convierte una cadena de caracteres de un encodaje a otro

# mb_convert_kana

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_convert_kana — Convierte un "kana" en otro ("zen-kaku", "han-kaku" y más)

### Descripción

**mb_convert_kana**([string](#language.types.string) $string, [string](#language.types.string) $mode = "KV", [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una conversión "han-kaku" - "zen-kaku" en la cadena
string. Esta función es únicamente útil para los japoneses.

### Parámetros

     string


       La cadena a convertir.






     mode


       La opción de conversión.




       Especifique las conversiones combinando los siguientes valores.



        <caption>**Opciones de conversión disponibles**</caption>



           Opción
           Significado






           r

            Convierte el alfabeto "zen-kaku" en "han-kaku"




           R

            Convierte el alfabeto "han-kaku" en "zen-kaku"




           n

            Convierte los números "zen-kaku" en "han-kaku"




           N

            Convierte los números "han-kaku" en "zen-kaku"




           a

            Convierte los números y alfabeto "zen-kaku" en "han-kaku"




           A

            Convierte los números y alfabeto "zen-kaku" en "han-kaku".
            (Los caracteres incluidos en las opciones "a", "A" son
            U+0021 - U+007E excluyendo U+0022, U+0027, U+005C, U+007E)




           s

            Convierte "zen-kaku" en "han-kaku" (U+3000 -&gt; U+0020)




           S

            Convierte "han-kaku" en "zen-kaku" (U+0020 -&gt; U+3000)




           k

            Convierte "zen-kaku kata-kana" en "han-kaku kata-kana"




           K

            Convierte "han-kaku kata-kana" en "zen-kaku kata-kana"




           h

            Convierte "zen-kaku hira-gana" en "han-kaku kata-kana"




           H

            Convierte "han-kaku kata-kana" en "zen-kaku hira-gana"




           c

            Convierte "zen-kaku kata-kana" en "zen-kaku hira-gana"




           C

            Convierte "zen-kaku hira-gana" en "zen-kaku kata-kana"




           V

            Elimina las notaciones vocales y las convierte en caracteres. Usar con "K","H"











     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

La cadena convertida.

### Errores/Excepciones

Genera un [ValueError](#class.valueerror) si la combinación de
diferentes mode no es válida.
Por ejemplo "sS".

### Historial de cambios

      Versión
      Descripción






      8.2.0

        Ahora se genera un [ValueError](#class.valueerror) si la
        combinación de diferentes modes no es válida.





8.0.0

encoding is nullable now.

### Ejemplos

**Ejemplo #1 Ejemplo con mb_convert_kana()**

&lt;?php
/_ Convierte todos los "han-kaku" "kata-kana" en "zen-kaku" "hira-gana" _/
echo mb_convert_kana('ﾔﾏﾀﾞ ﾊﾅｺ', "HV") . "\n";

/_ Convierte "han-kaku" "kata-kana" en "zen-kaku" "kata-kana"
y "zen-kaku" alfanumérico en "han-kaku" _/
echo mb_convert_kana('ｺｳｻﾞﾊﾞﾝｺﾞｳ ０１２３４５６', "KVa") . "\n";
?&gt;

El ejemplo anterior mostrará:

やまだ はなこ
コウザバンゴウ 0123456

# mb_convert_variables

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_convert_variables — Convierte la codificación de variables

### Descripción

**mb_convert_variables**(
    [string](#language.types.string) $to_encoding,
    [array](#language.types.array)|[string](#language.types.string) $from_encoding,
    [mixed](#language.types.mixed) &amp;$var,
    [mixed](#language.types.mixed) &amp;...$vars
): [string](#language.types.string)|[false](#language.types.singleton)

Convierte la codificación de las variables var y
vars desde la codificación
from_encoding hacia la codificación
to_encoding

     **mb_convert_variables()** coloca las strings en un array
     o un objeto para detectar la codificación, pero la detección tiende a fallar
     para strings de pequeño tamaño. Por lo tanto, no es posible mezclar codificaciones en un array o un objeto "simple".

### Parámetros

     to_encoding


       La codificación a la cual la string debe ser convertida.






     from_encoding


       from-encoding es una lista de codificaciones posibles
       para las variables vars, proporcionada en forma de un
       array o una lista de codificaciones, separadas por comas.
       Si from_encoding es omitido,
       las codificaciones proporcionadas en [mb_detect_order()](#function.mb-detect-order) son
       utilizadas.






     var


       var es una referencia a una variable
       a convertir. Las strings, arrays y objetos también son soportados.
       **mb_convert_variables()** toma todos estos parámetros
       con la misma codificación.






     vars


       Variables adicionales.





### Valores devueltos

La codificación antes de la conversión en caso de éxito, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_convert_variables()**

&lt;?php
/_ Convierte las variables $post1, $post2 a la codificación interna _/
$interenc = mb_internal_encoding();
$inputenc = mb_convert_variables($interenc, "ASCII,UTF-8,SJIS-win", $post1, $post2);
?&gt;

# mb_decode_mimeheader

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_decode_mimeheader — Decodifica un encabezado MIME

### Descripción

**mb_decode_mimeheader**([string](#language.types.string) $string): [string](#language.types.string)

Decodifica la cadena codificada string en el encabezado MIME.

### Parámetros

     string


       La cadena a decodificar.





### Valores devueltos

La cadena decodificada, con un codificación interna.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Los guiones bajos son convertidos en espacios como se especifica en
        [» RFC 2047](https://datatracker.ietf.org/doc/html/rfc2047).





### Ver también

    - [mb_encode_mimeheader()](#function.mb-encode-mimeheader) - Codifica una cadena para un encabezado MIME

# mb_decode_numericentity

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_decode_numericentity — Decodificar referencia numérica de cadena HTML a carácter

### Descripción

**mb_decode_numericentity**([string](#language.types.string) $string, [array](#language.types.array) $map, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Convierte la referencia numérica de cadena de [string](#language.types.string)
string en un bloque especificado a carácter.

### Parámetros

     string


       La [string](#language.types.string) que se está decodificando.






     map


       map es un [array](#language.types.array) que especifica
       el área de código a convertir.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

     is_hex


       Este parámetro no se utiliza.





### Valores devueltos

La [string](#language.types.string) convertida.

### Errores/Excepciones

Genera una excepción [ValueError](#class.valueerror) si
map no es una lista de [int](#language.types.integer)s.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **mb_decode_numericentity()** ahora genera una
       [ValueError](#class.valueerror) si map
       no es una lista de [int](#language.types.integer)s.





8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 Ejemplo de map**

&lt;?php
$convmap = array (
int start_code1, int end_code1, int offset1, int mask1,
int start_code2, int end_code2, int offset2, int mask2,
// ........
int start_codeN, int end_codeN, int offsetN, int maskN );
// Especificar valor Unicode para start_codeN y end_codeN
// Añadir offsetN al valor y realizar 'AND' a nivel de bits con maskN,
// luego convertir el valor a referencia numérica de cadena.
?&gt;

    **Ejemplo #2 Ejemplo de map para escapar cadena JavaScript**

&lt;?php
function escape_javascript_string($str) {
  $map = [
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,0,0, // 49
          0,0,0,0,0,0,0,0,1,1,
          1,1,1,1,1,0,0,0,0,0,
          0,0,0,0,0,0,0,0,0,0,
          0,0,0,0,0,0,0,0,0,0,
          0,1,1,1,1,1,1,0,0,0, // 99
          0,0,0,0,0,0,0,0,0,0,
          0,0,0,0,0,0,0,0,0,0,
          0,0,0,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1, // 149
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1, // 199
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1,
          1,1,1,1,1,1,1,1,1,1, // 249
          1,1,1,1,1,1,1, // 255
          ];
  // Codificación de caracteres es UTF-8
  $mblen = mb_strlen($str, 'UTF-8');
$utf32 = bin2hex(mb_convert_encoding($str, 'UTF-32', 'UTF-8'));
for ($i=0, $encoded=''; $i &lt; $mblen; $i++) {
      $u = substr($utf32, $i*8, 8);
      $v = base_convert($u, 16, 10);
if ($v &lt; 256 &amp;&amp; $map[$v]) {
$encoded .= '\\x'.substr($u, 6,2);
} else if ($v == 2028) {
        $encoded .= '\\u2028';
      } else if ($v == 2029) {
$encoded .= '\\u2029';
      } else {
        $encoded .= mb_convert_encoding(hex2bin($u), 'UTF-8', 'UTF-32');
}
}
return $encoded;
}

// Datos de prueba
$convmap = [ 0x0, 0xffff, 0, 0xffff ];
$msg = '';
for ($i=0; $i &lt; 1000; $i++) {
  // chr() no puede generar datos UTF-8 correctos mayores que 128, usar mb_decode_numericentity().
  $msg .= mb_decode_numericentity('&amp;#'.$i.';', $convmap, 'UTF-8');
}

// var_dump($msg);
var_dump(escape_javascript_string($msg));

### Ver también

    - [mb_encode_numericentity()](#function.mb-encode-numericentity) - Codifica caracteres a referencia numérica HTML

# mb_detect_encoding

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_detect_encoding — Detectar la codificación de caracteres

### Descripción

**mb_detect_encoding**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $encodings = **[null](#constant.null)**, [bool](#language.types.boolean) $strict = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Detectar la codificación de caracteres más probable para la [string](#language.types.string) string
desde una lista de candidatos.

A partir de PHP 8.1, esta función utiliza heurística para detectar cuál de las codificaciones de texto válidas en la lista
especificada tiene más probabilidades de ser correcta y puede no estar en el orden de encodings proporcionado.

La detección automática del juego de caracteres previsto nunca es totalmente
fiable; sin información adicional, es similar a descifrar una cadena cifrada sin la clave. Siempre es preferible utilizar una indicación del juego de caracteres almacenado o transmitido con los datos,
como el encabezado HTTP "Content-Type".

Esta función se utiliza principalmente con codificaciones multibyte, donde no todas las secuencias de
bytes forman una cadena válida. Si la cadena de entrada contiene una secuencia de este tipo, esta
codificación será rechazada.

**Advertencia**

# El resultado no es fiable

    El nombre de esta función es engañoso, realiza una «suposición» en lugar de una «detección».




    Las suposiciones están lejos de ser precisas, y por lo tanto, esta función no permite
    detectar de manera fiable la codificación correcto de los caracteres.

### Parámetros

     string


       El [string](#language.types.string) que será inspeccionado.






     encodings


       Una lista de codificaciones de caracteres a probar. Esta lista puede ser especificada como
       un [array](#language.types.array) de [string](#language.types.string), o como un [string](#language.types.string) único separado por comas.




       Si encodings es omitido o **[null](#constant.null)**,
       el será utilizado el detect_order actual (definido con la opción de configuración
       [mbstring.detect_order](#ini.mbstring.detect-order),
       o la función [mb_detect_order()](#function.mb-detect-order)).






     strict


       Controla el comportamiento cuando string no es
       válido en ninguno de los encodings listados.
       Si strict está definido como **[false](#constant.false)**, se devolverá la codificación
       más coincidente; si strict
       está definido como **[true](#constant.true)**, devolverá **[false](#constant.false)**.




       El valor por omisión de strict puede ser definido
       con la opción de configuración
       [mbstring.strict_detection](#ini.mbstring.strict-detection).





### Valores devueltos

La codificación caracteres detectado, o **[false](#constant.false)** si la cadena no es válida
en ninguna de las codificaciones listadas.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       **mb_detect_encoding()** ya no devolverá las siguientes
       codificaciones que no sean de texto:
       "Base64", "QPrint",
       "UUencode", "HTML entities",
       "7 bit" y "8 bit".



### Ejemplos

    **Ejemplo #1 Ejemplo con mb_detect_encoding()**

&lt;?php

$str = "\x95\xB6\x8E\x9A\x83\x52\x81\x5B\x83\x68";

// Detecta la codificación con el detect_order actual
var_dump(mb_detect_encoding($str));

// "auto" es modificado según mbstring.language
var_dump(mb_detect_encoding($str, "auto"));

// Especifica el parámetro "encodings" con una lista separada por comas
var_dump(mb_detect_encoding($str, "JIS, eucjp-win, sjis-win"));

// Uso de un array para especificar el parámetro "encodings"
$encodings = [
  "ASCII",
  "JIS",
  "EUC-JP"
];
var_dump(mb_detect_encoding($str, $encodings));
?&gt;

    El ejemplo anterior mostrará:

string(5) "ASCII"
string(5) "ASCII"
string(8) "SJIS-win"
string(5) "ASCII"

    **Ejemplo #2 Efecto del parámetro strict**

&lt;?php
// 'áéóú' codificado en ISO-8859-1
$str = "\xE1\xE9\xF3\xFA";

// La cadena no válica en ASCII ni UTF-8, pero UTF-8 se considera una coincidencia más cercana
var_dump(mb_detect_encoding($str, ['ASCII', 'UTF-8'], false));
var_dump(mb_detect_encoding($str, ['ASCII', 'UTF-8'], true));

// Si se encuentra una codificación válida, el parámetro "strict" no cambia el resultado
var_dump(mb_detect_encoding($str, ['ASCII', 'UTF-8', 'ISO-8859-1'], false));
var_dump(mb_detect_encoding($str, ['ASCII', 'UTF-8', 'ISO-8859-1'], true));
?&gt;

    El ejemplo anterior mostrará:

string(5) "UTF-8"
bool(false)
string(10) "ISO-8859-1"
string(10) "ISO-8859-1"

En ciertos casos, la misma secuencia de bytes puede formar una cadena válida
en diferentes codificaciones de caracteres, y es imposible determinar
cuál interpretación era prevista. Un ejemplo, entre otros,
la secuencia de bytes "\xC4\xA2" podría ser:

    -
     "Ä¢" (U+00C4 LATIN CAPITAL LETTER A WITH DIAERESIS seguido de U+00A2 CENT SIGN)
     codificado en ISO-8859-1, ISO-8859-15, o Windows-1252


    -
     "ФЂ" (U+0424 CYRILLIC CAPITAL LETTER EF seguido de U+0402 CYRILLIC CAPITAL LETTER
     DJE) codificado en ISO-8859-5


    -
     "Ģ" (U+0122 LATIN CAPITAL LETTER G WITH CEDILLA) codificado en UTF-8








    **Ejemplo #3 Efecto del orden cuando coinciden múltiples codificaciones**

&lt;?php
$str = "\xC4\xA2";

// La cadena es válida en las tres codificaciones, pero no siempre devolverá el primero de la lista
var_dump(mb_detect_encoding($str, ['UTF-8']));
var_dump(mb_detect_encoding($str, ['UTF-8', 'ISO-8859-1', 'ISO-8859-5'])); // A partir de PHP 8.1 esto devolverá ISO-8859-1 en vez de UTF-8
var_dump(mb_detect_encoding($str, ['ISO-8859-1', 'ISO-8859-5', 'UTF-8']));
var_dump(mb_detect_encoding($str, ['ISO-8859-5', 'UTF-8', 'ISO-8859-1']));
?&gt;

    El ejemplo anterior mostrará:

string(5) "UTF-8"
string(10) "ISO-8859-1"
string(10) "ISO-8859-1"
string(10) "ISO-8859-5"

### Ver también

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

# mb_detect_order

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_detect_order — Lee/modifica el orden de detección de codificaciones

### Descripción

**mb_detect_order**([array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $encoding = **[null](#constant.null)**): [array](#language.types.array)|[bool](#language.types.boolean)

Reemplaza el orden de detección de codificaciones actual por encoding.

### Parámetros

     encoding


       encoding es un array, o una lista de codificaciones
       separadas por comas. Ver las [codificaciones soportadas](#mbstring.supported-encodings).




       Si encoding es omitido o **[null](#constant.null)**, **mb_detect_order()**
       devuelve el orden de detección de codificaciones actual en un array.




       Esta configuración afecta a las funciones [mb_detect_encoding()](#function.mb-detect-encoding) y
       [mb_send_mail()](#function.mb-send-mail).




       Actualmente, mbstring soporta los siguientes filtros
       de detección. Si una secuencia de bytes es inválida
       para uno de los siguientes filtros, la detección fallará.




       UTF-8, UTF-7,
       ASCII,
       EUC-JP,SJIS,
       eucJP-win, SJIS-win,
       JIS, ISO-2022-JP


       Para ISO-8859-*, mbstring
       siempre detecta ISO-8859-*.




       Para UTF-16, UTF-32,
       UCS2 y UCS4 la detección
       siempre fallará.





### Valores devueltos

Al definir el orden de detección de codificación, **[true](#constant.true)** es devuelto en caso de éxito o **[false](#constant.false)** en caso de fallo.

Al obtener el orden de detección de codificación, un array ordenado de codificaciones es devuelto.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_detect_order()**

&lt;?php
/_ Reemplaza el orden de detección por una lista enumerada _/
mb_detect_order("eucjp-win,sjis-win,UTF-8");

/_ Reemplaza el orden de detección por un array _/
$ary[] = "ASCII";
$ary[] = "JIS";
$ary[] = "EUC-JP";
mb_detect_order($ary);

/_ Muestra el orden de detección actual _/
echo implode(", ", mb_detect_order());
?&gt;

    **Ejemplo #2 Ejemplo de orden de detección innecesario**

; Siempre detectado como ISO-8859-1
detect_order = ISO-8859-1, UTF-8

; Siempre detectado como UTF-8, desde que los valores ASCII/UTF-7
; son válidos para UTF-8
detect_order = UTF-8, ASCII, UTF-7

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_http_input()](#function.mb-http-input) - Detecta el tipo de codificación de caracteres HTTP

    - [mb_http_output()](#function.mb-http-output) - Lee/modifica la codificación de visualización

    - [mb_send_mail()](#function.mb-send-mail) - Envía un correo electrónico codificado

# mb_encode_mimeheader

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_encode_mimeheader — Codifica una cadena para un encabezado MIME

### Descripción

**mb_encode_mimeheader**(
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $charset = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $transfer_encoding = **[null](#constant.null)**,
    [string](#language.types.string) $newline = "\r\n",
    [int](#language.types.integer) $indent = 0
): [string](#language.types.string)

Codifica una [string](#language.types.string) string dada en un encabezado MIME.

### Parámetros

     string


       La [string](#language.types.string) a codificar. Su codificación debería ser idéntica a
       [mb_internal_encoding()](#function.mb-internal-encoding).






     charset


       charset es el nombre de la codificación utilizada
       por la cadena string. El valor por omisión
       se determina mediante los parámetros actuales de NLS
       (mbstring.language).






     transfer_encoding


       transfer_encoding es la codificación de transferencia. Puede ser "B" (Base64) o
       "Q" (Quoted-Printable). Por omisión, es
       "B".






     newline


       newline especifica los finales de línea (EOF:
       end-of-line) utilizados por **mb_encode_mimeheader()**
       para formatear la cadena (una [» RFC](https://datatracker.ietf.org/doc/html/rfc2822)
       define la longitud de una cadena a partir de la cual se debe añadir
       un final de línea. La longitud actual es 74 caracteres). El valor
       por omisión es "\r\n" (CRLF).






     indent


       Indentación de la primera línea (número de caracteres en el encabezado
       antes de string).





### Valores devueltos

Una versión convertida de la [string](#language.types.string) en ASCII.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Los octetos NUL (0) ya no se eliminan durante la codificación
       en Quoted-Printable, sino que se codifican como =00.




      8.0.0

       charset y transfer_encoding
       ahora son nulos.



### Ejemplos

    **Ejemplo #1 Ejemplo con mb_encode_mimeheader()**

&lt;?php
$name = "太郎"; // kanji
$mbox = "kru";
$doma = "gtinn.mon";
$addr = '"' . addcslashes(mb_encode_mimeheader($name, "UTF-7", "Q"), '"') . '" &lt;' . $mbox . "@" . $doma . "&gt;";
echo $addr;
?&gt;

    El ejemplo anterior mostrará:

"=?UTF-7?Q?+WSqQzg-?=" &lt;kru@gtinn.mon&gt;

### Notas

**Nota**:

    Esta función no está diseñada para cortar líneas en medio de palabras.
    Este comportamiento puede añadir espacios no deseados en una palabra
    de la cadena original.

### Ver también

    - [mb_decode_mimeheader()](#function.mb-decode-mimeheader) - Decodifica un encabezado MIME

# mb_encode_numericentity

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_encode_numericentity — Codifica caracteres a referencia numérica HTML

### Descripción

**mb_encode_numericentity**(
    [string](#language.types.string) $string,
    [array](#language.types.array) $map,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $hex = **[false](#constant.false)**
): [string](#language.types.string)

Convierte
los códigos de caracteres especificados en [string](#language.types.string) string
de código de caracteres a referencia numérica de caracteres HTML.

### Parámetros

     string


       El [string](#language.types.string) que se está codificando.






     map


       map es un array que especifica el área de código a
       convertir.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

     hex


       Si la referencia de entidad devuelta debe estar en notación hexadecimal
       (de lo contrario, está en notación decimal).





### Valores devueltos

El [string](#language.types.string) convertido.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror) si
map no es una lista de [int](#language.types.integer)s.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **mb_encode_numericentity()** ahora lanza una
       [ValueError](#class.valueerror) si map
       no es una lista de [int](#language.types.integer)s.





8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 map ejemplo**

&lt;?php
$convmap = array (
int start_code1, int end_code1, int offset1, int mask1,
int start_code2, int end_code2, int offset2, int mask2,
........
int start_codeN, int end_codeN, int offsetN, int maskN );
// Especificar valor Unicode para start_codeN y end_codeN
// Añadir offsetN al valor y hacer un 'AND' a nivel de bits con maskN, luego
// convierte el valor a referencia numérica de string.
?&gt;

    **Ejemplo #2 mb_encode_numericentity()** ejemplo

&lt;?php

$str = "aAæÆあア𩸽";

/_ Convertir todos los caracteres UTF8 hasta 4 bytes a referencia numérica de caracteres HTML _/
$convmap = [0, 0x1FFFFF, 0, 0x10FFFF];
var_dump(mb_encode_numericentity($str, $convmap, "utf8"));

/_ Convertir solo los caracteres UTF8 de 2 bytes y 4 bytes a referencia numérica de caracteres HTML _/
$convmap = [
    0x80, 0x7FF, 0, 0x10FFFF,
    0x10000, 0x1FFFFF, 0, 0x10FFFF,
];
var_dump(mb_encode_numericentity($str, $convmap, "utf8"));
?&gt;

El ejemplo anterior mostrará:

string(46) "&amp;#97;&amp;#65;&amp;#230;&amp;#198;&amp;#12354;&amp;#12450;&amp;#40509;"
string(28) "aA&amp;#230;&amp;#198;あア&amp;#40509;"

### Ver también

    - [mb_decode_numericentity()](#function.mb-decode-numericentity) - Decodificar referencia numérica de cadena HTML a carácter

# mb_encoding_aliases

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mb_encoding_aliases — Obtiene los alias de un tipo de codificación conocido

### Descripción

**mb_encoding_aliases**([string](#language.types.string) $encoding): [array](#language.types.array)

Devuelve un array de alias para un tipo conocido de codificación.

### Parámetros

    encoding


      El tipo de codificación a verificar, para los alias.


### Valores devueltos

Devuelve un array indexado numéricamente de alias de codificación.
o **[false](#constant.false)** si ocurre un error

### Errores/Excepciones

Genera un [ValueError](#class.valueerror) si
encoding es desconocido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si el argumento encoding es desconocido, ahora se genera un [ValueError](#class.valueerror);
       previamente, se emitía un **[E_WARNING](#constant.e-warning)** y la función devolvía **[false](#constant.false)**.



### Ejemplos

**Ejemplo #1 Ejemplo con mb_encoding_aliases()**

&lt;?php
$encoding        = 'ASCII';
$known_encodings = mb_list_encodings();

if (in_array($encoding, $known_encodings)) {

    $aliases = mb_encoding_aliases($encoding);
    print_r($aliases);

} else {

    echo "Codificación ($encoding) desconocida.\n";

}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; ANSI_X3.4-1968
[1] =&gt; iso-ir-6
[2] =&gt; ANSI_X3.4-1986
[3] =&gt; ISO_646.irv:1991
[4] =&gt; US-ASCII
[5] =&gt; ISO646-US
[6] =&gt; us
[7] =&gt; IBM367
[8] =&gt; cp367
[9] =&gt; csASCII
)

### Ver también

    - [mb_list_encodings()](#function.mb-list-encodings) - Devuelve un array que contiene todos los encodings soportados

# mb_ereg

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg — Búsqueda por expresión regular con soporte para caracteres multibyte

### Descripción

**mb_ereg**([string](#language.types.string) $pattern, [string](#language.types.string) $string, [array](#language.types.array) &amp;$matches = **[null](#constant.null)**): [bool](#language.types.boolean)

Búsqueda por expresión regular con soporte para caracteres multibyte.

### Parámetros

     pattern


       El patrón de búsqueda.






     string


       La cadena sobre la que se realiza la búsqueda.






     matches


       Si se encuentran coincidencias para las subcadenas entre
       paréntesis de pattern y si la función es
       llamada con el tercer argumento matches, las
       coincidencias serán almacenadas en los elementos del array
       matches. Si no se encuentra ninguna coincidencia,
       matches tendrá como valor un array vacío.




       $matches[1] contendrá la subcadena que comienza en la
       primera paréntesis izquierdo; $matches[2] contendrá la
       subcadena que comienza en la segunda, y así sucesivamente.
       $matches[0] contendrá una copia de la cadena completa
       coincidente.





### Valores devueltos

Devuelve si se ha encontrado una coincidencia de pattern
en string.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora **[true](#constant.true)** en caso de éxito.
       Anteriormente, devolvía la longitud en bytes de la cadena encontrada, si se encontraba
       una coincidencia para pattern en string y
       si se proporcionaba matches.
       Si el parámetro opcional matches no se proporcionaba o si la
       longitud de la cadena coincidente era 0, esta función devolvía 1.




      7.1.0

       **mb_ereg()** ahora asignará matches
       a un [array](#language.types.array) vacío, si no hay coincidencias. Anteriormente, los
       matches no se modificaban en este caso.



### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_eregi()](#function.mb-eregi) - Expresión regular insensible a mayúsculas/minúsculas con soporte para caracteres multioctetos

# mb_ereg_match

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_match — Expresión regular POSIX para strings multibyte

### Descripción

**mb_ereg_match**([string](#language.types.string) $pattern, [string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [bool](#language.types.boolean)

Ejecuta la expresión regular POSIX para strings multibyte.

**Nota**:

     pattern se asocia únicamente al inicio de string.

### Parámetros

     pattern


       La expresión regular.






     string


       El string a evaluar.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

string retorna **[true](#constant.true)** si
string verifica la expresión regular
pattern, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       options ahora es nullable.



### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg()](#function.mb-ereg) - Búsqueda por expresión regular con soporte para caracteres multibyte

# mb_ereg_replace

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_replace — Reemplaza segmentos de cadena mediante expresiones regulares

### Descripción

**mb_ereg_replace**(
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $replacement,
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

Busca en la cadena string las ocurrencias
que coinciden con el patrón pattern,
y las reemplaza con el texto de reemplazo replacement.

### Parámetros

     pattern


       La expresión regular.




       Los caracteres multi-octeto pueden ser utilizados en
       pattern.






     replacement


       El texto de reemplazo.






     string


       La cadena a analizar.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).



### Valores devueltos

La cadena resultante en caso de éxito, o **[false](#constant.false)** si ocurre
un error.
Si string no es válido para la codificación actual,
**[null](#constant.null)** es devuelto.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        options ahora es nullable.




       7.1.0

        Esta función verifica si string es válido
        para la codificación actual.




       7.1.0

        El modificador e ahora está obsoleto.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

**Advertencia**Never use the e modifier when working on untrusted input. No automatic escaping will happen (as known from [preg_replace()](#function.preg-replace)). Not taking care of this will most likely create remote code execution vulnerabilities in your application.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_eregi_replace()](#function.mb-eregi-replace) - Expresión regular con soporte para caracteres multibyte, sin distinción de mayúsculas y minúsculas

# mb_ereg_replace_callback

(PHP 5 &gt;= 5.4.1, PHP 7, PHP 8)

mb_ereg_replace_callback — Buscar y reemplazar mediante expresión regular con soporte multi byte utilizando una función de devolución de llamada

### Descripción

**mb_ereg_replace_callback**(
    [string](#language.types.string) $pattern,
    [callable](#language.types.callable) $callback,
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

Busca los string que coinciden con el argumento
pattern, luego reemplaza los textos que coinciden
con el retorno de la función callback.

    El comportamiento de esta función es casi idéntico a [mb_ereg_replace()](#function.mb-ereg-replace),
    a excepción de que el argumento
    replacement debe especificar una función de devolución de llamada
    callback.

### Parámetros

     pattern


       La expresión regular.




       Los caracteres multi byte pueden ser utilizados en el pattern.






     callback


        Un callback que será llamado y se le pasará un array de elementos coincidentes
        en la cadena de caracteres string. El callback debe retornar
        la cadena reemplazada.




        Con frecuencia será necesario utilizar la función callback
        para **mb_ereg_replace_callback()** solo una vez.
        En este caso se pueden utilizar las
        [funciones anónimas](#functions.anonymous) para
        declarar una función de devolución de llamada al momento de llamar a la función
        **mb_ereg_replace_callback()**. Al hacerlo de esta manera
        se tiene toda la información necesaria para la llamada de la función
        en un solo lugar, lo que permite evitar saturar el espacio de nombres
        de las funciones con un callback de función que no se utiliza en otro lugar.






     string


       El [string](#language.types.string) que debe ser verificado.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

Retorna un [string](#language.types.string) en caso de éxito, o **[false](#constant.false)** en caso de error.
Si string no es válido para el codificación actual,
**[null](#constant.null)** es retornado.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        options ahora es nullable.




       7.1.0

        Esta función verifica si string es válido para
        la codificación actual.





### Ejemplos

    **Ejemplo #1 Ejemplo con mb_ereg_replace_callback()**

&lt;?php
// este texto fue utilizado en 2002
// se desea actualizarlo para 2003
$text = "April fools day is 04/01/2002\n";
$text.= "Last christmas was 12/24/2001\n";
// la función de devolución de llamada
function next_year($matches)
{
  // como de costumbre: $matches[0] es la coincidencia completa
  // $matches[1] la coincidencia para el primer subpatrón
  // encerrado en '(...)' y así sucesivamente
  return $matches[1].($matches[2]+1);
}
echo mb_ereg_replace_callback(
"(\d{2}/\d{2}/)(\d{4})",
"next_year",
$text);

?&gt;

    El ejemplo anterior mostrará:

April fools day is 04/01/2003
Last christmas was 12/24/2002

    **Ejemplo #2 mb_ereg_replace_callback()** utilizando funciones anónimas

&lt;?php
// este texto fue utilizado en 2002
// se desea actualizarlo para 2003
$text = "April fools day is 04/01/2002\n";
$text.= "Last christmas was 12/24/2001\n";

echo mb_ereg_replace_callback(
"(\d{2}/\d{2}/)(\d{4})",
function ($matches) {
               return $matches[1].($matches[2]+1);
},
$text);
?&gt;

### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_replace()](#function.mb-ereg-replace) - Reemplaza segmentos de cadena mediante expresiones regulares

    - [Funciones anónimas](#functions.anonymous)

# mb_ereg_search

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search — Búsqueda por expresión regular multioctets

### Descripción

**mb_ereg_search**([?](#language.types.null)[string](#language.types.string) $pattern = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [bool](#language.types.boolean)

Búsqueda por expresión regular multioctets.

### Parámetros

     pattern


       El patrón de búsqueda.






     options


       La opción de búsqueda. Para más explicaciones, consúltese [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

**mb_ereg_search()** devuelve **[true](#constant.true)** si la cadena
multioctets coincide con el patrón de expresión regular, o bien
**[false](#constant.false)** en caso contrario. La cadena a estudiar ha sido configurada con la función
[mb_ereg_search_init()](#function.mb-ereg-search-init). Si el patrón
pattern no está especificado, se utilizará el anterior.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        pattern y options ahora son nulos.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_init()](#function.mb-ereg-search-init) - Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

# mb_ereg_search_getpos

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_getpos — Devuelve la posición de inicio para la siguiente comparación de una expresión regular

### Descripción

**mb_ereg_search_getpos**(): [int](#language.types.integer)

Devuelve la posición de inicio para la siguiente coincidencia de una expresión regular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**mb_ereg_search_getpos()** devuelve
el punto de inicio de la comparación de una expresión regular para
[mb_ereg_search()](#function.mb-ereg-search),
[mb_ereg_search_pos()](#function.mb-ereg-search-pos),
[mb_ereg_search_regs()](#function.mb-ereg-search-regs). La posición está
representada mediante bytes desde la cabeza del string.

### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_setpos()](#function.mb-ereg-search-setpos) - Selecciona el punto de partida para la búsqueda mediante expresión regular

# mb_ereg_search_getregs

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_getregs — Lee el último segmento de cadena multioctets que coincide con el patrón

### Descripción

**mb_ereg_search_getregs**(): [array](#language.types.array)|[false](#language.types.singleton)

Lee el último segmento de cadena multioctets que coincide con el patrón.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que incluye todas las sub-caenas que han sido encontradas por
[mb_ereg_search()](#function.mb-ereg-search), [mb_ereg_search_pos()](#function.mb-ereg-search-pos) y
[mb_ereg_search_regs()](#function.mb-ereg-search-regs). Si se ha encontrado una solución,
el primer elemento será la sub-caena encontrada, el segundo representará la
primera paréntesis capturante, el tercero representará la segunda paréntesis
capturante, etc. Esta función devuelve **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_init()](#function.mb-ereg-search-init) - Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

# mb_ereg_search_init

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_init — Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

### Descripción

**mb_ereg_search_init**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $pattern = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [bool](#language.types.boolean)

**mb_ereg_search_init()** configura
string y pattern
para soportar expresiones regulares multioctetos. Estos valores son
utilizados por [mb_ereg_search()](#function.mb-ereg-search),
[mb_ereg_search_pos()](#function.mb-ereg-search-pos) y
[mb_ereg_search_regs()](#function.mb-ereg-search-regs).

### Parámetros

     string


       La cadena a buscar.






     pattern


       La máscara de búsqueda.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        pattern y options ahora son nulos.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_regs()](#function.mb-ereg-search-regs) - Retorna el segmento de cadena encontrado por una expresión regular multioctets

# mb_ereg_search_pos

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_pos — Retorna la posición y la longitud del segmento de string que cumple con el patrón de expresión regular

### Descripción

**mb_ereg_search_pos**([?](#language.types.null)[string](#language.types.string) $pattern = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Retorna la posición y la longitud del segmento de string que cumple con
el patrón de expresión regular.

El string a utilizar es especificado por [mb_ereg_search_init()](#function.mb-ereg-search-init).
Si no es especificado, se utilizará el anterior.

### Parámetros

     pattern


       El patrón de búsqueda.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

Un array que contiene dos elementos. El primer elemento es la posición,
en bytes, donde comienza la coincidencia relativamente al inicio del
string buscado, y el segundo elemento es la longitud, en bytes,
de la coincidencia.

Si ocurre un error, **[false](#constant.false)** será retornado.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        pattern y options ahora son nulos.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_init()](#function.mb-ereg-search-init) - Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

# mb_ereg_search_regs

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_regs — Retorna el segmento de cadena encontrado por una expresión regular multioctets

### Descripción

**mb_ereg_search_regs**([?](#language.types.null)[string](#language.types.string) $pattern = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Retorna el segmento de cadena encontrado por una expresión regular multioctets.

### Parámetros

     pattern


       La máscara de búsqueda.






     options


       La opción de búsqueda. Para más explicaciones, consulte [mb_regex_set_options()](#function.mb-regex-set-options).





### Valores devueltos

**mb_ereg_search_regs()** ejecuta la expresión regular
pattern, y, si un segmento de cadena coincide,
lo retorna en un array, cuyo primer elemento es el
segmento de cadena encontrado, el segundo el contenido
de la primera paréntesis capturante, el tercero
el contenido de la segunda paréntesis capturante, etc.
La función retorna **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        pattern y options ahora son nulos.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_init()](#function.mb-ereg-search-init) - Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

# mb_ereg_search_setpos

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_ereg_search_setpos — Selecciona el punto de partida para la búsqueda mediante expresión regular

### Descripción

**mb_ereg_search_setpos**([int](#language.types.integer) $offset): [bool](#language.types.boolean)

**mb_ereg_search_setpos()** selecciona el punto de partida
para la búsqueda que va a realizar la función [mb_ereg_search()](#function.mb-ereg-search).

### Parámetros

     offset


       La posición a definir. Si es negativa, se cuenta desde el final de la cadena.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.1.0

       Se ha añadido el soporte para un offset negativo.



### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_search_init()](#function.mb-ereg-search-init) - Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos

# mb_eregi

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_eregi — Expresión regular insensible a mayúsculas/minúsculas con soporte para caracteres multioctetos

### Descripción

**mb_eregi**([string](#language.types.string) $pattern, [string](#language.types.string) $string, [array](#language.types.array) &amp;$matches = **[null](#constant.null)**): [bool](#language.types.boolean)

Ejecuta la expresión regular insensible a mayúsculas/minúsculas con soporte
para caracteres multioctetos.

### Parámetros

     pattern


       La expresión regular.






     string


       La cadena a buscar.






     matches


       Si al menos una secuencia es encontrada
       (eventualmente en los paréntesis capturantes de
       pattern), y la función es llamada
       con un tercer argumento matches, los
       resultados serán almacenados en
       matches.




       $matches[1] contendrá
       el primer paréntesis capturante (aquel que comienza primero), $matches[2] contendrá el segundo
       paréntesis capturante (aquel que comienza después
       del primero), y así sucesivamente.
       $matches[0] contiene una copia de la cadena.





### Valores devueltos

Devuelve si una correspondencia de pattern ha sido encontrada
en string.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora **[true](#constant.true)** en caso de éxito.
       Anteriormente, devolvía la longitud de octeto de la cadena encontrada, si una correspondencia
       para pattern era encontrada en string y
       que matches era proporcionado.
       Si el parámetro opcional matches no era proporcionado o que la
       longitud de la cadena correspondiente era 0, esta función devolvía 1.




      7.1.0

       **mb_eregi()** definirá ahora matches
       como un [array](#language.types.array) vacío, si no hay ninguna correspondencia. Anteriormente,
       matches no era modificado en este caso.



### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg()](#function.mb-ereg) - Búsqueda por expresión regular con soporte para caracteres multibyte

# mb_eregi_replace

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_eregi_replace — Expresión regular con soporte para caracteres multibyte, sin distinción de mayúsculas y minúsculas

### Descripción

**mb_eregi_replace**(
    [string](#language.types.string) $pattern,
    [string](#language.types.string) $replacement,
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

Analiza la cadena string con el patrón de expresión regular
pattern, luego reemplaza el texto encontrado por replacement.

### Parámetros

     pattern


       La expresión regular. Pueden utilizarse caracteres multibyte.
       La distinción de mayúsculas y minúsculas será ignorada.






     replacement


       El texto de sustitución.






     string


       La cadena a buscar.






     options


       Las opciones de búsqueda.
       Ver [mb_regex_set_options()](#function.mb-regex-set-options) para más detalles.



### Valores devueltos

La cadena resultante, o **[false](#constant.false)** si ocurre un error.
Si string no es válido para la codificación actual,
se devuelve **[null](#constant.null)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        options ahora es nullable.




       7.1.0

        Esta función verifica si string es válido para
        la codificación actual.




       7.1.0

        El modificador e ahora está obsoleto.





### Notas

**Nota**:

The internal encoding or the
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function.

**Advertencia**Never use the e modifier when working on untrusted input. No automatic escaping will happen (as known from [preg_replace()](#function.preg-replace)). Not taking care of this will most likely create remote code execution vulnerabilities in your application.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg_replace()](#function.mb-ereg-replace) - Reemplaza segmentos de cadena mediante expresiones regulares

# mb_get_info

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_get_info — Lee la configuración interna de la extensión mbstring

### Descripción

**mb_get_info**([string](#language.types.string) $type = "all"): [array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer)|[false](#language.types.singleton)|[null](#language.types.null)

**mb_get_info()** lee la configuración interna de
la extensión mbstring.

### Parámetros

     type


       Si type no se solicita explícitamente, o si vale
       "all",
       "all",
       "internal_encoding", "http_input",
       "http_output", "http_output_conv_mimetypes",
       "mail_charset", "mail_header_encoding",
       "mail_body_encoding", "illegal_chars",
       "encoding_translation", "language",
       "detect_order", "substitute_character"
       y "strict_detection"
       se devolverá.




       Si type se especifica como
       "internal_encoding", "http_input",
       "http_output", "http_output_conv_mimetypes",
       "mail_charset", "mail_header_encoding",
       "mail_body_encoding", "illegal_chars",
       "encoding_translation", "language",
       "detect_order", "substitute_character"
       o "strict_detection"
       se devolverá el parámetro especificado.





### Valores devueltos

Un [array](#language.types.array) de información si type no
se especifica, de lo contrario, un type específico,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Los types "func_overload"
       y "func_overload_list" ya no son soportados.



### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_http_output()](#function.mb-http-output) - Lee/modifica la codificación de visualización

# mb_http_input

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_http_input — Detecta el tipo de codificación de caracteres HTTP

### Descripción

**mb_http_input**([?](#language.types.null)[string](#language.types.string) $type = **[null](#constant.null)**): [array](#language.types.array)|[string](#language.types.string)|[false](#language.types.singleton)

Detecta el tipo de codificación de caracteres HTTP.

### Parámetros

     type


       El argumento type especifica el tipo
       de entrada HTTP. Puede tomar uno de los siguientes valores:
       "G" para GET, "P" para POST, "C" para COOKIE, "S" para
       string, "L" para la lista, "I" para la lista
       completa (retornará [array](#language.types.array)). Si type
       es omitido, tomará el valor del último tipo utilizado.





### Valores devueltos

El nombre de la codificación de caracteres según type,
o un array de nombres de juegos de caracteres, si type es "I".
Si
**mb_http_input()** no procesa la entrada
HTTP especificada, retornará **[false](#constant.false)**.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) si
type es inválido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **mb_http_input()** ahora levanta una
       excepción [ValueError](#class.valueerror) si type
       es inválido.




      8.0.0

       type ahora es nullable.



### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_http_output()](#function.mb-http-output) - Lee/modifica la codificación de visualización

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

# mb_http_output

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_http_output — Lee/modifica la codificación de visualización

### Descripción

**mb_http_output**([?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)

Lee/modifica la codificación de visualización. La visualización después de la llamada a esta función
será convertida desde la codificación interna hacia la codificación proporcionada por el argumento
encoding.

### Parámetros

     encoding


       Si encoding es proporcionado,
       **mb_http_output()** utilizará la codificación
       encoding para las visualizaciones HTTP: los
       caracteres que serán enviados a los clientes web serán convertidos al juego de caracteres encoding.




       Si encoding es omitido,
       **mb_http_output()** devuelve la codificación de visualización
       actual.





### Valores devueltos

Si el argumento encoding es omitido,
**mb_http_output()** devuelve la codificación HTTP actual. De lo contrario, Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Levanta una excepción [ValueError](#class.valueerror) si
encoding contiene octetos nulos.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **mb_http_output()** levanta ahora una
       excepción [ValueError](#class.valueerror) si encoding
       contiene octetos nulos.





8.0.0

encoding is nullable now.

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_http_input()](#function.mb-http-input) - Detecta el tipo de codificación de caracteres HTTP

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

# mb_internal_encoding

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_internal_encoding — Lee/modifica la codificación interna

### Descripción

**mb_internal_encoding**([?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)

Lee/modifica la codificación interna.

### Parámetros

     encoding


       encoding se utiliza durante las conversiones de
       strings provenientes y dirigidas hacia la web, así como durante la creación de strings con el módulo mbstring. Se debe tener en cuenta que la codificación interna es completamente diferente
       de la de las regex multioctetos.





### Valores devueltos

Si encoding es proporcionado,
Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
En este caso, la codificación de caracteres para las regex multioctetos
no se cambia. Si encoding
es omitido, **mb_internal_encoding()** devuelve el
nombre de la codificación actual.

### Errores/Excepciones

A partir de PHP 8.0.0, se lanza una [ValueError](#class.valueerror) si el valor
de encoding es una codificación inválida.
Anterior a PHP 8.0.0, se emitía una **[E_WARNING](#constant.e-warning)** en su lugar.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

      8.0.0

       Ahora lanza una [ValueError](#class.valueerror) si
       encoding es una codificación inválida.
       Anteriormente, se emitía una **[E_WARNING](#constant.e-warning)** en su lugar.



### Ejemplos

    **Ejemplo #1 Ejemplo con mb_internal_encoding()**

&lt;?php
/_ Utiliza la codificación interna UTF-8 _/
mb_internal_encoding("UTF-8");

/_ Muestra la codificación interna actual _/
echo mb_internal_encoding();
?&gt;

### Ver también

    - [mb_http_input()](#function.mb-http-input) - Detecta el tipo de codificación de caracteres HTTP

    - [mb_http_output()](#function.mb-http-output) - Lee/modifica la codificación de visualización

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

# mb_language

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_language — Define/Recupera el lenguaje actual

### Descripción

**mb_language**([?](#language.types.null)[string](#language.types.string) $language = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)

Define/Recupera el lenguaje actual.

### Parámetros

     language


       Utilizado para codificar los correos electrónicos.
       Los lenguajes válidos se enumeran en la siguiente tabla.
       [mb_send_mail()](#function.mb-send-mail) utiliza esta opción para codificar
       los correos electrónicos.







          Language
          Charset
          Encoding
          Alias






          German/de
          ISO-8859-15
          Quoted-Printable
          Deutsch



          English/en
          ISO-8859-1
          Quoted-Printable
           



          Armenian/hy
          ArmSCII-8
          Quoted-Printable
           



          Japanese/ja
          ISO-2022-JP
          BASE64
           



          Korean/ko
          ISO-2022-KR
          BASE64
           



          neutral
          UTF-8
          BASE64
           



          Russian/ru
          KOI8-R
          Quoted-Printable
           



          Turkish/tr
          ISO-8859-9
          Quoted-Printable
           



          Ukrainian/ua
          KOI8-U
          Quoted-Printable
           



          uni
          UTF-8
          BASE64
          universal



          Simplified Chinese/zh-cn
          HZ
          BASE64
           



          Traditional Chinese/zh-tw
          BIG-5
          BASE64
           








### Valores devueltos

Si language es proporcionado y
language es válido, devuelve **[true](#constant.true)**.
De lo contrario, devuelve **[false](#constant.false)**.
Cuando language es omitido o **[null](#constant.null)**, devuelve el nombre del
lenguaje actual, como [string](#language.types.string).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       language ahora es nullable.



### Ver también

    - [mb_send_mail()](#function.mb-send-mail) - Envía un correo electrónico codificado

# mb_lcfirst

(PHP 8 &gt;= 8.4.0)

mb_lcfirst — Convierte la primera letra de un string a minúscula

### Descripción

**mb_lcfirst**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una operación [lcfirst()](#function.lcfirst) segura para multi-octetos,
y devuelve un string con la primera letra de
string en minúscula.

### Parámetros

    string


      El string de entrada.




    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve el string resultante.

### Ver también

- [mb_ucfirst()](#function.mb-ucfirst) - Convierte una string con la primera letra en mayúscula

- [lcfirst()](#function.lcfirst) - Pone el primer carácter en minúscula

# mb_list_encodings

(PHP 5, PHP 7, PHP 8)

mb_list_encodings — Devuelve un array que contiene todos los encodings soportados

### Descripción

**mb_list_encodings**(): [array](#language.types.array)

Devuelve un array que contiene todos los [encodings soportados](#mbstring.supported-encodings).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado numéricamente.

### Errores/Excepciones

Esta función no genera errores.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_list_encodings()**

&lt;?php

print_r(mb_list_encodings());

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; pass
[1] =&gt; auto
[2] =&gt; wchar
[3] =&gt; byte2be
[4] =&gt; byte2le
[5] =&gt; byte4be
[6] =&gt; byte4le
[7] =&gt; BASE64
[8] =&gt; UUENCODE
[9] =&gt; HTML-ENTITIES
[10] =&gt; Quoted-Printable
[11] =&gt; 7bit
[12] =&gt; 8bit
[13] =&gt; UCS-4
[14] =&gt; UCS-4BE
[15] =&gt; UCS-4LE
[16] =&gt; UCS-2
[17] =&gt; UCS-2BE
[18] =&gt; UCS-2LE
[19] =&gt; UTF-32
[20] =&gt; UTF-32BE
[21] =&gt; UTF-32LE
[22] =&gt; UTF-16
[23] =&gt; UTF-16BE
[24] =&gt; UTF-16LE
[25] =&gt; UTF-8
[26] =&gt; UTF-7
[27] =&gt; UTF7-IMAP
[28] =&gt; ASCII
[29] =&gt; EUC-JP
[30] =&gt; SJIS
[31] =&gt; eucJP-win
[32] =&gt; SJIS-win
[33] =&gt; JIS
[34] =&gt; ISO-2022-JP
[35] =&gt; Windows-1252
[36] =&gt; ISO-8859-1
[37] =&gt; ISO-8859-2
[38] =&gt; ISO-8859-3
[39] =&gt; ISO-8859-4
[40] =&gt; ISO-8859-5
[41] =&gt; ISO-8859-6
[42] =&gt; ISO-8859-7
[43] =&gt; ISO-8859-8
[44] =&gt; ISO-8859-9
[45] =&gt; ISO-8859-10
[46] =&gt; ISO-8859-13
[47] =&gt; ISO-8859-14
[48] =&gt; ISO-8859-15
[49] =&gt; EUC-CN
[50] =&gt; CP936
[51] =&gt; HZ
[52] =&gt; EUC-TW
[53] =&gt; BIG-5
[54] =&gt; EUC-KR
[55] =&gt; UHC
[56] =&gt; ISO-2022-KR
[57] =&gt; Windows-1251
[58] =&gt; CP866
[59] =&gt; KOI8-R
)

### Ver también

- [mb_encoding_aliases()](#function.mb-encoding-aliases) - Obtiene los alias de un tipo de codificación conocido

# mb_ltrim

(PHP 8 &gt;= 8.4.0)

mb_ltrim — Elimina los espacios (u otros caracteres) del inicio de un string

### Descripción

**mb_ltrim**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $characters = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una operación [ltrim()](#function.ltrim) segura para datos multi-octetos.
Elimina los espacios (u otros caracteres) del inicio de un string.

Sin el segundo argumento,
**mb_ltrim()** eliminará los siguientes caracteres:

-

" " (Unicode U+0020), un espacio ordinario.

-

"\t" (Unicode U+0009), una tabulación.

-

"\n" (Unicode U+000A), un salto de línea.

-

"\r" (Unicode U+000D), un retorno de carro.

-

"\0" (Unicode U+0000), el octeto NUL.

-

"\v" (Unicode U+000B), una tabulación vertical.

-

"\f" (Unicode U+000C), un avance de página.

-

"\u00A0" (Unicode U+00A0), un ESPACIO INSÉCABLE.

-

"\u1680" (Unicode U+1680), una MARCA DE ESPACIO OGHAM.

-

"\u2000" (Unicode U+2000), un CUADRADO MEDIO.

-

"\u2001" (Unicode U+2001), un CUADRADO.

-

"\u2002" (Unicode U+2002), un ESPACIO MEDIO.

-

"\u2003" (Unicode U+2003), un ESPACIO CUADRADO.

-

"\u2004" (Unicode U+2004), un ESPACIO DE UN-TERCIO-DE-CUADRADO.

-

"\u2005" (Unicode U+2005), un ESPACIO DE UN-CUARTO-DE-CUADRADO.

-

"\u2006" (Unicode U+2006), un ESPACIO DE UN-SEXTO-DE-CUADRADO.

-

"\u2007" (Unicode U+2007), un ESPACIO PARA DÍGITOS.

-

"\u2008" (Unicode U+2008), un ESPACIO DE PUNTUACIÓN.

-

"\u2009" (Unicode U+2009), un ESPACIO FINO.

-

"\u200A" (Unicode U+200A), un ESPACIO PELUDO.

-

"\u2028" (Unicode U+2028), un SEPARADOR DE LÍNEA.

-

"\u2029" (Unicode U+2029), un SEPARADOR DE PÁRRAFO.

-

"\u202F" (Unicode U+202F), un ESPACIO INSÉCABLE ESTRECHO.

-

"\u205F" (Unicode U+205F), un ESPACIO MATEMÁTICO MEDIO.

-

"\u3000" (Unicode U+3000), un ESPACIO IDEOGRÁFICO.

-

"\u0085" (Unicode U+0085), una LÍNEA SIGUIENTE (NEL).

-

"\u180E" (Unicode U+180E), un SEPARADOR DE VOCALES MONGOL.

### Parámetros

    string


      El string de entrada.




    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres a eliminar.

    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Esta función devuelve un string con los espacios eliminados
del inicio de string.

### Ver también

- [mb_trim()](#function.mb-trim) - Elimina los espacios (u otros caracteres) del inicio y final de un string

- [mb_rtrim()](#function.mb-rtrim) - Elimina los espacios (u otros caracteres) del final de un string

- [ltrim()](#function.ltrim) - Elimina los espacios (u otros caracteres) del inicio de un string

# mb_ord

(PHP 7 &gt;= 7.2.0, PHP 8)

mb_ord — Obtiene el punto de código Unicode de un carácter

### Descripción

**mb_ord**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el punto de código Unicode para el carácter proporcionado.

Esta función complementa [mb_chr()](#function.mb-chr).

### Parámetros

    string


      Una cadena de caracteres






    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

El punto de código Unicode para el primer carácter de string o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 Un ejemplo básico de mb_ord()**

&lt;?php
var_dump(mb_ord("A", "UTF-8"));
var_dump(mb_ord("🐘", "UTF-8"));
var_dump(mb_ord("\x80", "ISO-8859-1"));
var_dump(mb_ord("\x80", "Windows-1252"));
?&gt;

    El ejemplo anterior mostrará:



     int(65)
     int(128024)
     int(128)
     int(8364)

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_chr()](#function.mb-chr) - Devuelve un carácter por su valor de punto de código Unicode

    - [IntlChar::ord()](#intlchar.ord) - Devuelve el valor del punto de código Unicode de un carácter

    - [ord()](#function.ord) - Convierte el primer byte de un string en un valor entre 0 y 255

# mb_output_handler

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_output_handler — Función de tratamiento de los despliegues

### Descripción

**mb_output_handler**([string](#language.types.string) $string, [int](#language.types.integer) $status): [string](#language.types.string)

**mb_output_handler()** es la función a proporcionar a
[ob_start()](#function.ob-start). **mb_output_handler()**
convierte los caracteres enviados al cliente en la codificación
parametrizada con [mb_http_output()](#function.mb-http-output).

### Parámetros

     string


       El contenido del búfer de salida.






     status


       El estado del búfer de salida.





### Valores devueltos

La cadena convertida.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_output_handler()**

&lt;?php
mb_http_output("UTF-8");
ob_start("mb_output_handler");
?&gt;

### Notas

**Nota**:

    Si se desea enviar datos binarios tales como imágenes,
    el encabezado Content-Type: header
    debe ser definido utilizando la función [header()](#function.header)
    antes de enviar los datos binarios al cliente (por ejemplo,
    header("Content-Type: image/png"). Si
    Content-Type: header es enviado, la conversión
    de la codificación de salida no se realizará.




    Tenga en cuenta que si Content-Type: text/* es enviado,
    el contenido del cuerpo es visto como texto; la conversión será
    realizada.

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

# mb_parse_str

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_parse_str — Analiza los datos HTTP GET/POST/COOKIE y asigna las variables globales

### Descripción

**mb_parse_str**([string](#language.types.string) $string, [array](#language.types.array) &amp;$result): [bool](#language.types.boolean)

Analiza los datos de entrada HTTP GET/POST/COOKIE y asigna las
variables globales. Dado que PHP no proporciona valores brutos de POST/COOKIE,
esta función solo es utilizable con los datos en método GET. **mb_parse_str()**
toma los datos de la URL llamante, detecta el juego de caracteres, convierte
los datos al juego de caracteres interno, y asigna los valores al array de
variables globales.

### Parámetros

     string


       Los datos codificados en URL.






     result


       Un array que contiene los valores decodificados
       y los nombres de los juegos de caracteres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0
      El segundo argumento ya no es opcional.



      7.2.0
      Una llamada a la función **mb_parse_str()**
       sin el segundo argumento se ha vuelto obsoleta.


### Ver también

    - [mb_detect_order()](#function.mb-detect-order) - Lee/modifica el orden de detección de codificaciones

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

# mb_preferred_mime_name

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_preferred_mime_name — Detecta la codificación MIME

### Descripción

**mb_preferred_mime_name**([string](#language.types.string) $encoding): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre de la codificación MIME de una cadena.

### Parámetros

     encoding


       La codificación a verificar.





### Valores devueltos

El nombre de la codificación MIME para la codificación encoding,
o **[false](#constant.false)** si no se prevé ningún juego de caracteres para la encoding dada.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_preferred_mime_name()**

&lt;?php
$outputenc = "sjis-win";
mb_http_output($outputenc);
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=" . mb_preferred_mime_name($outputenc));
?&gt;

# mb_regex_encoding

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_regex_encoding — Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

### Descripción

**mb_regex_encoding**([?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)

Define/Recupera la codificación de caracteres para las
expresiones regulares multioctetos.

### Parámetros

     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Si encoding está definido, entonces
Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error..
En este caso, la codificación de caracteres interna no es
modificada. Si el argumento encoding
es omitido, entonces el nombre de la codificación de caracteres actual
para las expresiones regulares multioctetos será devuelto.

### Historial de cambios

       Versión
       Descripción







8.0.0

encoding is nullable now.

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [mb_ereg()](#function.mb-ereg) - Búsqueda por expresión regular con soporte para caracteres multibyte

# mb_regex_set_options

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mb_regex_set_options — Lee y modifica las opciones de las funciones de expresión regular con soporte para caracteres multibyte

### Descripción

**mb_regex_set_options**([?](#language.types.null)[string](#language.types.string) $options = **[null](#constant.null)**): [string](#language.types.string)

Configura las opciones por omisión con los nuevos valores contenidos en
options, para las funciones de expresión
regular con soporte para caracteres multibyte.

### Parámetros

     options


       Las opciones a definir, en forma de un string donde cada carácter es una opción. Para definir un modo, se debe colocar el carácter que representa este modo al final, el resto de los caracteres serán las opciones. Solo puede definirse un modo, mientras que pueden definirse múltiples opciones.





       <caption>**Opciones para la expresión**</caption>



          Opción
          Significado
          Historial de cambios






          i
          Activa la ambigüedad
           



          x
          Activa los patrones extendidos
           



          m
          El carácter '.' también corresponde a nuevas líneas
           



          s
          '^' -&gt; '\A', '$' -&gt; '\Z'
           



          p
          Idéntico a las opciones m y s
           



          l
          Encuentra la correspondencia más larga
           



          n
          Ignora las correspondencias vacías
           



          e
          Utiliza la función [eval()](#function.eval) sobre el resultado
          Deprecado a partir de PHP 7.1.0 y eliminado a partir de PHP 8.0.0






      **Nota**:



        La opción "e" no tiene efecto cuando es definida por la **mb_regex_set_options()**. Úsese con [mb_ereg_replace()](#function.mb-ereg-replace) o [mb_eregi_replace()](#function.mb-eregi-replace).





       <caption>**Modos de sintaxis de la expresión regular (solo uno puede ser definido)**</caption>



          Modo
          Significado






          j
          Java (Sun java.util.regex)



          u
          GNU regex



          g
          grep



          c
          Emacs



          r
          Ruby



          z
          Perl



          b
          POSIX Basic regex



          d
          POSIX Extended regex








### Valores devueltos

Las opciones anteriores. Si el parámetro options
es omitido o **[null](#constant.null)**, se retornará un string describiendo las opciones actuales.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si el parámetro options es proporcionado y no **[null](#constant.null)**,
       se retornan las opciones *anteriores*.
       Anteriormente, se retornaban las opciones *actuales*.




      8.0.0

       options ahora es nullable.




      8.0.0

       La opción "e" ahora lanza una [ValueError](#class.valueerror).




      7.1.0

       La opción "e" ahora emite una **[E_DEPRECATED](#constant.e-deprecated)**.



### Ver también

    - [mb_split()](#function.mb-split) - Divide una string en un array utilizando una expresión regular multibyte

    - [mb_ereg()](#function.mb-ereg) - Búsqueda por expresión regular con soporte para caracteres multibyte

    - [mb_eregi()](#function.mb-eregi) - Expresión regular insensible a mayúsculas/minúsculas con soporte para caracteres multioctetos

# mb_rtrim

(PHP 8 &gt;= 8.4.0)

mb_rtrim — Elimina los espacios (u otros caracteres) del final de un string

### Descripción

**mb_rtrim**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $characters = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una operación [rtrim()](#function.rtrim) segura para multibyte,
y devuelve un string con los espacios (u otros caracteres) del final de
string eliminados.

Sin el segundo parámetro,
**mb_rtrim()** eliminará los siguientes caracteres:

-

" " (Unicode U+0020), un espacio ordinario.

-

"\t" (Unicode U+0009), una tabulación.

-

"\n" (Unicode U+000A), un salto de línea.

-

"\r" (Unicode U+000D), un retorno de carro.

-

"\0" (Unicode U+0000), el octeto NUL.

-

"\v" (Unicode U+000B), una tabulación vertical.

-

"\f" (Unicode U+000C), un avance de página.

-

"\u00A0" (Unicode U+00A0), un ESPACIO INSÉCABLE.

-

"\u1680" (Unicode U+1680), una MARCA DE ESPACIO OGHAM.

-

"\u2000" (Unicode U+2000), un CUADRADO MEDIO.

-

"\u2001" (Unicode U+2001), un CUADRADO.

-

"\u2002" (Unicode U+2002), un ESPACIO MEDIO.

-

"\u2003" (Unicode U+2003), un ESPACIO CUADRADO.

-

"\u2004" (Unicode U+2004), un ESPACIO DE UN-TERCIO-DE-CUADRADO.

-

"\u2005" (Unicode U+2005), un ESPACIO DE UN-CUARTO-DE-CUADRADO.

-

"\u2006" (Unicode U+2006), un ESPACIO DE UN-SEXTO-DE-CUADRADO.

-

"\u2007" (Unicode U+2007), un ESPACIO PARA DÍGITOS.

-

"\u2008" (Unicode U+2008), un ESPACIO DE PUNTUACIÓN.

-

"\u2009" (Unicode U+2009), un ESPACIO FINO.

-

"\u200A" (Unicode U+200A), un ESPACIO PELUDO.

-

"\u2028" (Unicode U+2028), un SEPARADOR DE LÍNEA.

-

"\u2029" (Unicode U+2029), un SEPARADOR DE PÁRRAFO.

-

"\u202F" (Unicode U+202F), un ESPACIO INSÉCABLE ESTRECHO.

-

"\u205F" (Unicode U+205F), un ESPACIO MATEMÁTICO MEDIO.

-

"\u3000" (Unicode U+3000), un ESPACIO IDEOGRÁFICO.

-

"\u0085" (Unicode U+0085), una LÍNEA SIGUIENTE (NEL).

-

"\u180E" (Unicode U+180E), un SEPARADOR DE VOCALES MONGOL.

### Parámetros

    string


      El string de entrada.




    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres que deben ser eliminados.
Con .., es posible especificar un rango creciente de caracteres.

    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve el string modificado.

### Ver también

- [mb_trim()](#function.mb-trim) - Elimina los espacios (u otros caracteres) del inicio y final de un string

- [mb_ltrim()](#function.mb-ltrim) - Elimina los espacios (u otros caracteres) del inicio de un string

- [rtrim()](#function.rtrim) - Elimina los espacios (u otros caracteres) al final de un string

# mb_scrub

(PHP 7 &gt;= 7.2.0, PHP 8)

mb_scrub — Reemplaza las secuencias de bytes mal formadas por el carácter de sustitución.

### Descripción

**mb_scrub**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una conversión de juego de caracteres desde la codificación especificada, o desde la codificación por omisión si no se ha especificado ninguna,
hacia la misma codificación. Esto tiene como efecto reemplazar cualquier secuencia de bytes inválida
por el carácter de sustitución.

### Parámetros

    string


      La cadena de entrada.






    encoding


      La codificación utilizada para interpretar string.
      Si se omite o es **[null](#constant.null)**, el
      parámetro [mbstring.internal_encoding](#ini.mbstring.internal-encoding)
      será utilizado si está definido, de lo contrario el parámetro [default_charset](#ini.default-charset)
      será utilizado.


### Valores devueltos

El resultado [string](#language.types.string) con las secuencias de bytes inválidas reemplazadas.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

# mb_send_mail

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_send_mail — Envía un correo electrónico codificado

### Descripción

**mb_send_mail**(
    [string](#language.types.string) $to,
    [string](#language.types.string) $subject,
    [string](#language.types.string) $message,
    [array](#language.types.array)|[string](#language.types.string) $additional_headers = [],
    [?](#language.types.null)[string](#language.types.string) $additional_params = **[null](#constant.null)**
): [bool](#language.types.boolean)

Envía un correo electrónico.
Los encabezados y el cuerpo del mensaje son convertidos y codificados
de acuerdo con [mb_language()](#function.mb-language). **mb_send_mail()**
es una versión adaptada de [mail()](#function.mail).
Consulte la función [mail()](#function.mail) para más detalles.

### Parámetros

     to


       to es la dirección de destino del correo. Las
       direcciones múltiples pueden especificarse separándolas con comas. Este parámetro
       no es codificado automáticamente.






     subject


       El asunto del correo.






     message


       El mensaje del correo.






     additional_headers (opcional)


       [string](#language.types.string) o [array](#language.types.array) a insertar al final del encabezado del correo.




       Este parámetro se utiliza típicamente para añadir encabezados adicionales
       (From, Cc, y Bcc). Los diferentes añadidos deben separarse con un
       CRLF (\r\n). Este parámetro debe ser validado para evitar la inyección
       de encabezados no deseados por personas malintencionadas.




       Si se proporciona un [array](#language.types.array), sus claves son los nombres de los encabezados y sus
       valores son los valores respectivos de los encabezados.



      **Nota**:



        Al enviar un correo, *debe* contener
        un encabezado From. Puede ser definido mediante el
        parámetro additional_headers o como valor por defecto en el php.ini.




        Si no se hace, se emitirá un error similar a:
        Warning: mail(): "sendmail_from" not
        set in php.ini or custom "From:" header missing. El encabezado From también
        define Return-Path en Windows.




      **Nota**:



        Si los mensajes no son recibidos, intente utilizar únicamente un LF
        (\n). Algunos agentes de transferencia de correos Unix (en particular
        [» qmail](http://cr.yp.to/qmail.html)) reemplazan un LF por
        un CRLF automáticamente (lo que resulta en un doble CR si se utiliza
        CRLF). Debe intentar esta corrección en último lugar, sabiendo que no
        cumple con la
        [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822).







     additional_params


       additional_params es una línea
       de parámetros MTA. Es práctico cuando se quiere
       definir un Return-Path correcto cuando
       se utiliza sendmail.




       Este parámetro es escapado por la función [escapeshellcmd()](#function.escapeshellcmd) internamente
       para prevenir la ejecución de comandos. La función [escapeshellcmd()](#function.escapeshellcmd)
       previene la ejecución de comandos, pero permite parámetros adicionales. Por razones de seguridad,
       este parámetro debe ser validado.




       Dado que la función [escapeshellcmd()](#function.escapeshellcmd) se aplica automáticamente internamente,
       algunos caracteres permitidos en las direcciones de correo por los RFCs de Internet
       ya no pueden ser utilizados. Los programas que necesiten utilizar estos caracteres,
       la función [mail()](#function.mail) ya no puede ser utilizada.




       El usuario que ejecuta el servidor web debe ser añadido como usuario de confianza en la configuración
       de envío de correos para evitar la adición de un encabezado 'X-Warning' en el mensaje cuando
       el remitente de la envelope (-f) es definido utilizando este método. Para los usuarios de sendmail,
       este archivo se encuentra utilizando la ruta /etc/mail/trusted-users.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






      8.0.0

       additional_params ahora es nullable.




       7.2.0

        El parámetro additional_headers ahora acepta
        un [array](#language.types.array).





### Ver también

    - [mail()](#function.mail) - Envío de correo

    - [mb_encode_mimeheader()](#function.mb-encode-mimeheader) - Codifica una cadena para un encabezado MIME

    - [mb_language()](#function.mb-language) - Define/Recupera el lenguaje actual

# mb_split

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

mb_split — Divide una string en un array utilizando una expresión regular multibyte

### Descripción

**mb_split**([string](#language.types.string) $pattern, [string](#language.types.string) $string, [int](#language.types.integer) $limit = -1): [array](#language.types.array)|[false](#language.types.singleton)

Divide la string multibyte
string utilizando la expresión regular
pattern y devuelve el resultado en forma de array.

### Parámetros

     pattern


       La máscara de la expresión regular.






     string


       La string a dividir.






     limit


       Si el argumento opcional limit es especificado,
       la string será dividida en un máximo de limit elementos.



### Valores devueltos

El resultado, en forma de un [array](#language.types.array), o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

The
character encoding specified by [mb_regex_encoding()](#function.mb-regex-encoding)
will be used as the character encoding for this function by default.

### Ver también

    - [mb_regex_encoding()](#function.mb-regex-encoding) - Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos

    - [mb_ereg()](#function.mb-ereg) - Búsqueda por expresión regular con soporte para caracteres multibyte

    - [explode()](#function.explode) - Divide una string en segmentos

# mb_str_pad

(PHP 8 &gt;= PHP 8.3.0)

mb_str_pad — Rellena una cadena multibyte hasta una cierta longitud con otra cadena multibyte

### Descripción

**mb_str_pad**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $length,
    [string](#language.types.string) $pad_string = " ",
    [int](#language.types.integer) $pad_type = **[STR_PAD_RIGHT](#constant.str-pad-right)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)

Esta función devuelve el string
rellenado por la izquierda, la derecha o ambos lados hasta la longitud de
relleno especificada, donde la longitud se mide en puntos de código Unicode. Si el argumento opcional
pad_string no se proporciona, el
string se rellena con espacios, de lo contrario se
rellena con caracteres de pad_string
hasta el límite.

### Parámetros

     string


       La cadena de entrada.






     length


       Si el valor de length es negativo,
       inferior o igual a la longitud de la cadena de entrada, no se realiza ningún relleno
       y string será devuelto.






     pad_string

      **Nota**:



        El pad_string puede ser truncado si el
        número requerido de caracteres de relleno no puede ser dividido
        equitativamente por la longitud del pad_string.







     pad_type


       El argumento opcional pad_type puede ser
       **[STR_PAD_RIGHT](#constant.str-pad-right)**, **[STR_PAD_LEFT](#constant.str-pad-left)**,
       o **[STR_PAD_BOTH](#constant.str-pad-both)**.
       Por omisión **[STR_PAD_RIGHT](#constant.str-pad-right)**.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la cadena rellenada.

### Ejemplos

    **Ejemplo #1 Ejemplo de mb_str_pad()**

&lt;?php
var_dump(mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_RIGHT)); // string(18) "▶▶❤❓❇❤"
var_dump(mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_LEFT)); // string(18) "❤❓❇❤▶▶"
var_dump(mb_str_pad('▶▶', 6, '❤❓❇', STR_PAD_BOTH)); // string(18) "❤❓▶▶❤❓"

var_dump(mb_str_pad("🎉", 3, "祝", STR_PAD_LEFT)); // string(10) "祝祝🎉"
?&gt;

# mb_str_split

(PHP 7 &gt;= 7.4.0, PHP 8)

mb_str_split — Para una cadena multibyte dada, devuelve un array de sus caracteres

### Descripción

**mb_str_split**([string](#language.types.string) $string, [int](#language.types.integer) $length = 1, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [array](#language.types.array)

Esta función devolverá un array de strings, es una versión de [str_split()](#function.str-split)
con soporte para codificaciones de tamaño de carácter variable así como para codificaciones de tamaño fijo
de caracteres de 1, 2 o 4 bytes.
Si el parámetro length es especificado, la cadena se divide en bloques de la longitud
especificada en caracteres (y no en bytes).
El parámetro encoding es opcional pero se recomienda proporcionarlo.

### Parámetros

     string


       El [string](#language.types.string) a dividir en caracteres o en trozos.






     length


       Si se especifica, cada elemento del array devuelto estará compuesto por múltiples caracteres en lugar de un solo carácter.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

       Una cadena de caracteres que especifica uno de los [encodings soportados](#mbstring.supported-encodings).





### Valores devueltos

**mb_str_split()** devuelve un array de strings.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.



### Ver también

    - [str_split()](#function.str-split) - Convierte un string en un array

    - [grapheme_str_split()](#function.grapheme-str-split) - Divide una string en un array

    - [explode()](#function.explode) - Divide una string en segmentos

# mb_strcut

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strcut — Corta una parte de string

### Descripción

**mb_strcut**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $start,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)

**mb_strcut()** extrae un substring desde un string, de
manera similar a la función [mb_substr()](#function.mb-substr), pero opera
sobre los bytes en lugar de los caracteres. Si el corte ocurre entre 2 bytes
de un carácter multibyte, el corte se realizará al inicio del primer
byte de ese carácter. Esta es también la diferencia con la función
[substr()](#function.substr) que cortará el string en medio de los bytes,
resultando en una secuencia de bytes mal formada.

### Parámetros

     string


       El string a cortar.






     start


       Si start es positivo, el string
       devuelto comenzará en el *byte* número start,
       en el string string. El primer carácter
       está numerado cero. En efecto, en el string 'abcdef',
       el byte en la posición 0 es 'a',
       el byte en la posición 2 es 'c',
       y así sucesivamente.




       Si start es negativo, el string devuelto
       comenzará en el byte número start contando
       desde el final del string string. Sin embargo, si el
       número negativo pasado como argumento start es mayor
       que la longitud del string, la porción devuelta comenzará desde
       el inicio del string string.






     length


       Longitud en *bytes*. Si este
       argumento es omitido, o vale NULL,
       todos los bytes hasta el final del string serán extraídos.




       Si length es negativo, el string devuelto
       terminará en la posición length contando
       desde el final del string string.
       Sin embargo, si el número negativo pasado al argumento
       length es mayor que el número de caracteres
       después de la posición start, un string vacío será
       devuelto.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

**mb_strcut()** devuelve la porción del string
string que comienza en el carácter
start y tiene la longitud de
length caracteres.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ver también

    - [mb_substr()](#function.mb-substr) - Extrae una subcadena

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

# mb_strimwidth

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strimwidth — Trunca una cadena

### Descripción

**mb_strimwidth**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $start,
    [int](#language.types.integer) $width,
    [string](#language.types.string) $trim_marker = "",
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)

Trunca la cadena string a la longitud
width especificada,
donde los caracteres de media caja cuentan como 1, y
los caracteres de caja completa cuentan como 2.
Ver [» http://www.unicode.org/reports/tr11/](http://www.unicode.org/reports/tr11/)
para más detalles sobre las cajas de caracteres asiáticos del este.

### Parámetros

     string


       La cadena a truncar.






     start


       start es la posición de inicio, en número
       de caracteres desde el principio de la cadena (el primer carácter es 0),
       o si la posición es negativa, número de caracteres desde el final de la [string](#language.types.string).






     width


       La anchura de la truncación deseada.
       Si se especifica una anchura negativa, debe contarse desde el final de la cadena.


**Nota**:

         Proporcionar una anchura negativa está obsoleto a partir de PHP 8.3.0.








     trim_marker


       trim_marker es la cadena añadida al final de la cadena truncada.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

La cadena truncada. Si trim_marker está definido,
trim_marker reemplaza los últimos caracteres para corresponder al tamaño width.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Proporcionar una width negativa a
       **mb_strimwidth()** ahora está obsoleto.





8.0.0

encoding is nullable now.

      7.1.0

       Se añadió soporte para starts y widths negativos.



### Ejemplos

    **Ejemplo #1 Ejemplo con mb_strimwidth()**

&lt;?php
echo mb_strimwidth("Hello World", 0, 10, "...");
// Muestra: "Hello W..."
?&gt;

### Ver también

    - [mb_strwidth()](#function.mb-strwidth) - Devuelve el tamaño de una cadena

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

# mb_stripos

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_stripos — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla

### Descripción

**mb_stripos**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**mb_stripos()** devuelve la posición numérica de la
primera ocurrencia de needle en la cadena
haystack.
A diferencia de [mb_strpos()](#function.mb-strpos),
**mb_stripos()** no distingue entre mayúsculas y minúsculas.
Si needle no es encontrado, la función devolverá **[false](#constant.false)**.

### Parámetros

     haystack


       La cadena desde la cual se obtiene la posición de la primera ocurrencia
       de needle






     needle


       La cadena a buscar en haystack






     offset


       La posición en haystack
       donde se debe comenzar a buscar.
       Una posición negativa cuenta desde el final de la [string](#language.types.string).






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la posición numérica de la primera ocurrencia de
needle en la cadena haystack
o **[false](#constant.false)** si needle no es encontrado.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

      7.1.0

       Se añadió soporte para offsets negativos.



### Ver también

    - [stripos()](#function.stripos) - Busca la posición de la primera ocurrencia en un string, sin distinguir mayúsculas de minúsculas

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

    - [mb_strpos()](#function.mb-strpos) - Localiza la primera ocurrencia de un carácter en una cadena

# mb_stristr

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_stristr — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla

### Descripción

**mb_stristr**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

**mb_stristr()** encuentra la primera ocurrencia de
needle en haystack
y devuelve la porción de haystack.
A diferencia de [mb_strstr()](#function.mb-strstr),
**mb_stristr()** no distingue entre mayúsculas y minúsculas.
Si needle no se encuentra, la función devolverá **[false](#constant.false)**.

### Parámetros

     haystack


       La cadena desde la cual se recupera la primera ocurrencia de
       needle






     needle


       La cadena a buscar en haystack






     before_needle


       Determina qué porción de haystack
       devuelve esta función.
       Si se establece en **[true](#constant.true)**, la función devolverá toda la cadena haystack
       desde el principio hasta la primera ocurrencia de needle
       (needle excluido).
       Si se establece en **[false](#constant.false)**, la función devolverá toda la cadena haystack
       desde la primera ocurrencia de needle hasta el final
       (needle incluido).






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la porción de haystack,
o **[false](#constant.false)** si needle no se encuentra.

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

### Ver también

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [mb_strstr()](#function.mb-strstr) - Encuentra la primera ocurrencia de una cadena en otra

# mb_strlen

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strlen — Devuelve la longitud de una cadena

### Descripción

**mb_strlen**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)

Obtiene la longitud de la cadena proporcionada.

### Parámetros

     string


       La cadena a analizar.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve el número de caracteres
en la cadena string, con la codificación
encoding. Un carácter multiocteto es
entonces contado como 1.

### Errores/Excepciones

Si la codificación es desconocida, se genera un error de nivel
**[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [grapheme_strlen()](#function.grapheme-strlen) - Lee la longitud de una cadena en número de grafemas

    - [iconv_strlen()](#function.iconv-strlen) - Devuelve el número de caracteres de una cadena

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

# mb_strpos

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strpos — Localiza la primera ocurrencia de un carácter en una cadena

### Descripción

**mb_strpos**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Localiza la posición de la primera ocurrencia de needle en el string haystack.

Realiza una búsqueda de tipo
[strpos()](#function.strpos), teniendo en cuenta los caracteres
multioctetos. La posición de needle se cuenta
desde el inicio de la cadena haystack: las
posiciones comienzan en 0.

### Parámetros

     haystack


       El string a partir del cual se obtiene la posición de la primera aparición
       de needle.






     needle


       La [string](#language.types.string) a encontrar en el parámetro
       haystack. A diferencia de la
       función [strpos()](#function.strpos), los valores numéricos
       no se aplican como valor ordinal de un carácter.






     offset


       La posición de inicio de la búsqueda. Si se omite, se utilizará cero.
       Una posición negativa se cuenta desde el final de la [string](#language.types.string).






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la posición numérica de
la primera ocurrencia del carácter needle en la
cadena haystack. Si needle no se
encuentra, **mb_strpos()** devuelve **[false](#constant.false)**.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

      7.1.0

       Se añadió soporte para offsets negativos.



### Ver también

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [strpos()](#function.strpos) - Busca la posición de la primera ocurrencia en un string

# mb_strrchr

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_strrchr — Encuentra la última ocurrencia de un carácter de una cadena en otra

### Descripción

**mb_strrchr**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

**mb_strrchr()** encuentra la última ocurrencia de
needle en haystack
y devuelve la porción de haystack.
Si needle no es encontrado, la función devolverá **[false](#constant.false)**.

### Parámetros

     haystack


       La cadena desde la cual se debe recuperar la última ocurrencia de
       needle.






     needle


       La cadena a encontrar en haystack.






     before_needle


       Determina qué porción de haystack
       esta función devuelve.
       Si se define como **[true](#constant.true)**, la función devuelve toda la cadena haystack
       desde el inicio hasta la última ocurrencia de needle.
       Si se define como **[false](#constant.false)**, la función devuelve toda la cadena haystack
       desde la última ocurrencia de needle hasta el final.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la porción de haystack.
o **[false](#constant.false)** si needle no es encontrado.

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

### Ver también

    - [strrchr()](#function.strrchr) - Encuentra la última ocurrencia de un carácter en un string

    - [mb_strstr()](#function.mb-strstr) - Encuentra la primera ocurrencia de una cadena en otra

    - [mb_strrichr()](#function.mb-strrichr) - Encuentra la última ocurrencia de un carácter de una cadena en otra, sin distinción de mayúsculas y minúsculas

# mb_strrichr

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_strrichr — Encuentra la última ocurrencia de un carácter de una cadena en otra, sin distinción de mayúsculas y minúsculas

### Descripción

**mb_strrichr**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

**mb_strrichr()** encuentra la última ocurrencia de
needle en haystack
y devuelve la porción de haystack. A diferencia de
[mb_strrchr()](#function.mb-strrchr), **mb_strrichr()** no
distingue entre mayúsculas y minúsculas.
Si needle no se encuentra, la función devolverá **[false](#constant.false)**.

### Parámetros

     haystack


       La cadena desde la cual se debe buscar la última ocurrencia de
       needle.






     needle


       La cadena a buscar en haystack.






     before_needle


       Determina qué porción de haystack
       devuelve esta función.
       Si se establece en **[true](#constant.true)**, la función devuelve toda la cadena haystack
       desde el principio hasta la última ocurrencia de needle.
       Si se establece en **[false](#constant.false)**, la función devuelve toda la cadena haystack
       desde la última ocurrencia de needle hasta el final.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la porción de haystack.
o **[false](#constant.false)** si needle no se encuentra.

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

### Ver también

    - [mb_stristr()](#function.mb-stristr) - Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla

    - [mb_strrchr()](#function.mb-strrchr) - Encuentra la última ocurrencia de un carácter de una cadena en otra

# mb_strripos

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_strripos — Encuentra la posición de la última ocurrencia de una cadena en otra, sin tener en cuenta la casilla

### Descripción

**mb_strripos**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**mb_strripos()** realiza una operación
[strripos()](#function.strripos) basada en el número de caracteres.
La posición needle se cuenta desde el inicio de
haystack. La posición del primer carácter es 0.
El segundo tiene como posición 1, etc.
A diferencia de [mb_strrpos()](#function.mb-strrpos),
**mb_strripos()** no es sensible a la casilla.

### Parámetros

     haystack


       La cadena desde la cual se recupera la posición de la última ocurrencia de
       needle.






     needle


       La cadena a buscar en haystack.






     offset


       Se puede especificar para comenzar la búsqueda en un número arbitrario de caracteres dentro
       de haystack. Los valores negativos detendrán la búsqueda en un punto arbitrario
       antes del final de haystack.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la posición numérica de la última ocurrencia de
needle en la cadena
haystack, o **[false](#constant.false)**
si needle no es encontrado.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

### Ver también

    - [strripos()](#function.strripos) - Busca la posición de la última ocurrencia de un string contenido en otro, de forma insensible a mayúsculas y minúsculas

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

    - [mb_strrpos()](#function.mb-strrpos) - Localiza la última ocurrencia de un carácter en una cadena

# mb_strrpos

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strrpos — Localiza la última ocurrencia de un carácter en una cadena

### Descripción

**mb_strrpos**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [int](#language.types.integer) $offset = 0,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**mb_strrpos()** realiza una búsqueda de tipo
[strpos()](#function.strpos), teniendo en cuenta los caracteres
multioctetos. La posición de needle se cuenta
a partir del inicio de la cadena haystack: las
posiciones comienzan en 0.

### Parámetros

     haystack


       El [string](#language.types.string) donde se comprobará, para la última aparición
       de needle.






     needle


       El [string](#language.types.string) a buscar en haystack.






     offset


       Se puede especificar para comenzar la búsqueda en un número arbitrario de caracteres dentro
       de haystack. Los valores negativos detendrán la búsqueda en un punto arbitrario
       antes del final de haystack.




     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la posición numérica de
la última ocurrencia del carácter needle en la
cadena haystack. Si needle no
es encontrado, **mb_strrpos()** devuelve **[false](#constant.false)**.

### Errores/Excepciones

- Si offset es mayor que la longitud de
  haystack, se lanzará un
  [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

      8.0.0

       Pasar encoding como tercer argumento
       en lugar de offset ha sido eliminado.





8.0.0

encoding is nullable now.

### Ver también

    - [mb_strpos()](#function.mb-strpos) - Localiza la primera ocurrencia de un carácter en una cadena

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

    - [strrpos()](#function.strrpos) - Busca la posición de la última ocurrencia de una subcadena en una cadena

# mb_strstr

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

mb_strstr — Encuentra la primera ocurrencia de una cadena en otra

### Descripción

**mb_strstr**(
    [string](#language.types.string) $haystack,
    [string](#language.types.string) $needle,
    [bool](#language.types.boolean) $before_needle = **[false](#constant.false)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

**mb_strstr()** encuentra la primera ocurrencia de
needle en haystack
y devuelve la porción de haystack.
Si needle no es encontrado, la función devolverá **[false](#constant.false)**.

### Parámetros

     haystack


       La cadena en la cual se debe buscar la primera ocurrencia de
       needle






     needle


       La cadena a buscar en haystack






     before_needle


       Determina qué porción de haystack
       esta función devuelve. Si se define como **[true](#constant.true)**, la función
       devolverá toda la cadena haystack
       desde el inicio hasta la primera ocurrencia de
       needle (needle excluido).
       Si se define como **[false](#constant.false)**, la función devolverá toda la cadena
       haystack desde la primera ocurrencia de
       needle hasta el final (needle incluido).






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la porción de haystack,
o **[false](#constant.false)** si needle no es encontrado.

### Historial de cambios

      Versión
      Descripción







8.0.0

needle now accepts an empty string.

8.0.0

encoding is nullable now.

### Ver también

    - [stristr()](#function.stristr) - Versión insensible a mayúsculas y minúsculas de strstr

    - [strstr()](#function.strstr) - Encuentra la primera ocurrencia en un string

    - [mb_stristr()](#function.mb-stristr) - Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla

# mb_strtolower

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mb_strtolower — Convierte todos los caracteres a minúsculas

### Descripción

**mb_strtolower**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Devuelve la cadena string
después de convertir todos los caracteres alfabéticos a minúsculas.

### Parámetros

     string


       La cadena a convertir a minúsculas.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve la cadena string con todos los caracteres
alfabéticos convertidos a minúsculas.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Implementación de reglas de conversión condicional a minúsculas para la letra griega sigma.





### Ejemplos

    **Ejemplo #1 Ejemplo con mb_strtolower()**

&lt;?php
$str = "Marie A Un Petit Agneau Et Elle L'Aime BEAUCOUP.";
$str = mb_strtolower($str);
echo $str; // marie a un petit agneau et elle l'aime beaucoup
?&gt;

    **Ejemplo #2 Ejemplo con mb_strtolower()** con texto
     UTF-8 no latino

&lt;?php
$str = "Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός";
$str = mb_strtolower($str, 'UTF-8');
echo $str; // Muestra τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός
?&gt;

### Notas

A diferencia de [strtolower()](#function.strtolower), el concepto de carácter
'alfabético' se determina mediante las propiedades Unicode. Por lo tanto,
el comportamiento de esta función no se modifica por las configuraciones
locales, y puede convertir todos los caracteres considerados alfabéticos como la c cédilla (ç).

Para más información sobre las propiedades de Unicode, véase
[» http://www.unicode.org/reports/tr21/](http://www.unicode.org/reports/tr21/).

### Ver también

    - [mb_strtoupper()](#function.mb-strtoupper) - Convierte todos los caracteres a mayúsculas

    - [mb_convert_case()](#function.mb-convert-case) - Realiza una conversión a mayúsculas/minúsculas de un string

    - [strtolower()](#function.strtolower) - Devuelve una string en minúsculas

# mb_strtoupper

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mb_strtoupper — Convierte todos los caracteres a mayúsculas

### Descripción

**mb_strtoupper**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Devuelve el string string
después de convertir todos los caracteres alfabéticos a mayúsculas.

### Parámetros

     string


       El string a convertir a mayúsculas.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve el string string con todos los caracteres
convertidos a mayúsculas.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_strtoupper()**

&lt;?php
$str = "Marie A Un Petit Agneau Et Elle L'Aime BEAUCOUP.";
$str = mb_strtoupper($str);
echo $str; // MARIE A UN PETIT AGNEAU ET ELLE L'AIME BEAUCOUP.
?&gt;

    **Ejemplo #2 Ejemplo con mb_strtoupper()** y texto UTF-8 no latino

&lt;?php
$str = "Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός";
$str = mb_strtoupper($str, 'UTF-8');
echo $str; // Muestra ΤΆΧΙΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ, ΔΡΑΣΚΕΛΊΖΕΙ ΥΠΈΡ ΝΩΘΡΟΎ ΚΥΝΌΣ
?&gt;

### Notas

A diferencia de [strtoupper()](#function.strtoupper), el concepto de carácter
'alfabético' se determina por las propiedades Unicode. Por lo tanto,
el comportamiento de esta función no se modifica por las configuraciones
locales, y puede convertir todos los caracteres considerados alfabéticos como la c cedilla (ç).

Para más información sobre las propiedades de Unicode, véase
[» http://www.unicode.org/reports/tr21/](http://www.unicode.org/reports/tr21/).

### Ver también

    - [mb_strtolower()](#function.mb-strtolower) - Convierte todos los caracteres a minúsculas

    - [mb_convert_case()](#function.mb-convert-case) - Realiza una conversión a mayúsculas/minúsculas de un string

    - [strtoupper()](#function.strtoupper) - Devuelve una string en mayúsculas

# mb_strwidth

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_strwidth — Devuelve el tamaño de una cadena

### Descripción

**mb_strwidth**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)

Devuelve la anchura de [string](#language.types.string) string,
donde los caracteres de media anchura cuentan como 1, y
los caracteres de doble anchura cuentan como 2.
Ver [» http://www.unicode.org/reports/tr11/](http://www.unicode.org/reports/tr11/)
para más detalles sobre la anchura de caracteres asiáticos del este.

Los caracteres de doble anchura son:
U+1100-U+115F,
U+11A3-U+11A7,
U+11FA-U+11FF,
U+2329-U+232A,
U+2E80-U+2E99,
U+2E9B-U+2EF3,
U+2F00-U+2FD5,
U+2FF0-U+2FFB,
U+3000-U+303E,
U+3041-U+3096,
U+3099-U+30FF,
U+3105-U+312D,
U+3131-U+318E,
U+3190-U+31BA,
U+31C0-U+31E3,
U+31F0-U+321E,
U+3220-U+3247,
U+3250-U+32FE,
U+3300-U+4DBF,
U+4E00-U+A48C,
U+A490-U+A4C6,
U+A960-U+A97C,
U+AC00-U+D7A3,
U+D7B0-U+D7C6,
U+D7CB-U+D7FB,
U+F900-U+FAFF,
U+FE10-U+FE19,
U+FE30-U+FE52,
U+FE54-U+FE66,
U+FE68-U+FE6B,
U+FF01-U+FF60,
U+FFE0-U+FFE6,
U+1B000-U+1B001,
U+1F200-U+1F202,
U+1F210-U+1F23A,
U+1F240-U+1F248,
U+1F250-U+1F251,
U+20000-U+2FFFD,
U+30000-U+3FFFD.
Todos los demás caracteres son caracteres de media anchura.

### Parámetros

     string


       La cadena a analizar.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

El tamaño de la [string](#language.types.string) string.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ejemplos

**Ejemplo #1 Ejemplo mb_strwidth()**

&lt;?php
var_dump(
mb_strwidth('a'), // LATIN SMALL LETTER A
mb_strwidth("\u{ff41}") // FULLWIDTH LATIN SMALL LETTER A
);
?&gt;

El ejemplo anterior mostrará:

int(1)
int(2)

### Ver también

    - [mb_strimwidth()](#function.mb-strimwidth) - Trunca una cadena

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

# mb_substitute_character

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_substitute_character — Define/Recupera los caracteres de sustitución

### Descripción

**mb_substitute_character**([string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null) $substitute_character = **[null](#constant.null)**): [string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean)

Especifica el carácter de sustitución para caracteres inválidos o
codificaciones inválidas. Los caracteres inválidos pueden ser
reemplazados por "none" (no se muestra, se eliminan), una
[string](#language.types.string) o un valor [int](#language.types.integer) (valor de un código de carácter Unicode).

Esta configuración afecta a [mb_convert_encoding()](#function.mb-convert-encoding),
[mb_convert_variables()](#function.mb-convert-variables),
[mb_output_handler()](#function.mb-output-handler),
[mb_scrub()](#function.mb-scrub),
y [mb_send_mail()](#function.mb-send-mail).

### Parámetros

     substitute_character


       Especifica un valor Unicode en forma de [int](#language.types.integer),
       o bien una [string](#language.types.string) en las siguientes formas:



        -

          "none" : no se muestra



        -

          "long" : muestra el valor hexadecimal (Ejemplo:
          U+3000, JIS+7E7E)



        -

          "entity" : muestra la entidad del carácter (Ejemplo:
          &amp;#x200;)







### Valores devueltos

Si substitute_character es proporcionado,
**mb_substitute_character()** devuelve
**[true](#constant.true)** en caso de éxito, y **[false](#constant.false)** en
caso de error. Si substitute_character es omitido,
**mb_substitute_character()** devuelve un valor Unicode,
o bien "none"/"long".

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Pasar una cadena vacía a substitute_character
       ya no es soportado; "none" debería ser proporcionado en su lugar.





8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_substitute_character()**

&lt;?php
/_ Configura el carácter de sustitución con U+3013 (GETA MARK) _/
mb_substitute_character(0x3013);

/_ Configura el carácter de sustitución con un formato hexadecimal _/
mb_substitute_character("long");

/_ Muestra la configuración actual _/
echo mb_substitute_character();
?&gt;

# mb_substr

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

mb_substr — Extrae una subcadena

### Descripción

**mb_substr**(
    [string](#language.types.string) $string,
    [int](#language.types.integer) $start,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**
): [string](#language.types.string)

Realiza una operación similar a
[substr()](#function.substr) basada en el número de caracteres.
La posición se cuenta desde el inicio de la [string](#language.types.string)
string. La posición del primer carácter
es 0, el segundo, uno, etc...

### Parámetros

     string


       La cadena desde la cual extraer la subcadena.






     start


       Si start es positivo, la cadena
       devuelta comenzará en el carácter número start,
       dentro de la cadena string. El primer carácter
       está numerado cero. En efecto, en la cadena 'abcdef',
       el carácter en la posición 0 es 'a',
       el carácter en la posición 2 es 'c',
       y así sucesivamente.




       Si start es negativo, la cadena devuelta
       comenzará en el carácter número start contando
       desde el final de la cadena string.






     length


       Número máximo de caracteres a utilizar
       desde string. Si este parámetro
       es omitido, o vale NULL, todos los
       caracteres hasta el final de la cadena serán extraídos.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

**mb_substr()** devuelve la porción de la cadena
string que comienza en el carácter
start y tiene una longitud de
length caracteres.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ver también

    - [mb_strcut()](#function.mb-strcut) - Corta una parte de string

    - [mb_internal_encoding()](#function.mb-internal-encoding) - Lee/modifica la codificación interna

# mb_substr_count

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

mb_substr_count — Cuenta el número de ocurrencias de una subcadena

### Descripción

**mb_substr_count**([string](#language.types.string) $haystack, [string](#language.types.string) $needle, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [int](#language.types.integer)

Cuenta el número de ocurrencias de la
cadena needle en la cadena
haystack.

### Parámetros

     haystack


       La cadena a analizar.






     needle


       La cadena a buscar.






     encoding

      The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

Devuelve el número de veces que la cadena
needle aparece en la cadena
haystack.

### Historial de cambios

      Versión
      Descripción







8.0.0

encoding is nullable now.

### Ejemplos

    **Ejemplo #1 Ejemplo con mb_substr_count()**

&lt;?php
echo mb_substr_count("Ceci est un test", "es"); // muestra 2
?&gt;

### Ver también

    - [mb_strpos()](#function.mb-strpos) - Localiza la primera ocurrencia de un carácter en una cadena

    - [mb_substr()](#function.mb-substr) - Extrae una subcadena

    - [substr_count()](#function.substr-count) - Cuenta el número de ocurrencias de segmentos en un string

# mb_trim

(PHP 8 &gt;= 8.4.0)

mb_trim — Elimina los espacios (u otros caracteres) del inicio y final de un string

### Descripción

**mb_trim**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $characters = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una operación [trim()](#function.trim) segura para multi-octetos,
y devuelve un string con los espacios eliminados del
inicio y final de string.
Sin el segundo parámetro,
**mb_trim()** eliminará los siguientes caracteres:

-

" " (Unicode U+0020), un espacio ordinario.

-

"\t" (Unicode U+0009), una tabulación.

-

"\n" (Unicode U+000A), un salto de línea.

-

"\r" (Unicode U+000D), un retorno de carro.

-

"\0" (Unicode U+0000), el octeto NUL.

-

"\v" (Unicode U+000B), una tabulación vertical.

-

"\f" (Unicode U+000C), un avance de página.

-

"\u00A0" (Unicode U+00A0), un ESPACIO INSÉCABLE.

-

"\u1680" (Unicode U+1680), una MARCA DE ESPACIO OGHAM.

-

"\u2000" (Unicode U+2000), un CUADRADO MEDIO.

-

"\u2001" (Unicode U+2001), un CUADRADO.

-

"\u2002" (Unicode U+2002), un ESPACIO MEDIO.

-

"\u2003" (Unicode U+2003), un ESPACIO CUADRADO.

-

"\u2004" (Unicode U+2004), un ESPACIO DE UN-TERCIO-DE-CUADRADO.

-

"\u2005" (Unicode U+2005), un ESPACIO DE UN-CUARTO-DE-CUADRADO.

-

"\u2006" (Unicode U+2006), un ESPACIO DE UN-SEXTO-DE-CUADRADO.

-

"\u2007" (Unicode U+2007), un ESPACIO PARA DÍGITOS.

-

"\u2008" (Unicode U+2008), un ESPACIO DE PUNTUACIÓN.

-

"\u2009" (Unicode U+2009), un ESPACIO FINO.

-

"\u200A" (Unicode U+200A), un ESPACIO PELUDO.

-

"\u2028" (Unicode U+2028), un SEPARADOR DE LÍNEA.

-

"\u2029" (Unicode U+2029), un SEPARADOR DE PÁRRAFO.

-

"\u202F" (Unicode U+202F), un ESPACIO INSÉCABLE ESTRECHO.

-

"\u205F" (Unicode U+205F), un ESPACIO MATEMÁTICO MEDIO.

-

"\u3000" (Unicode U+3000), un ESPACIO IDEOGRÁFICO.

-

"\u0085" (Unicode U+0085), una LÍNEA SIGUIENTE (NEL).

-

"\u180E" (Unicode U+180E), un SEPARADOR DE VOCALES MONGOL.

### Parámetros

    string


      El [string](#language.types.string) que será recortado.




    characters



Opcionalmente, los caracteres a eliminar también pueden ser especificados utilizando
el parámetro characters.
Basta con listar todos los caracteres a eliminar.

    encoding

     The encoding

parameter is the character encoding. If it is omitted or **[null](#constant.null)**, the internal character
encoding value will be used.

### Valores devueltos

El string recortado.

### Ver también

- [mb_ltrim()](#function.mb-ltrim) - Elimina los espacios (u otros caracteres) del inicio de un string

- [mb_rtrim()](#function.mb-rtrim) - Elimina los espacios (u otros caracteres) del final de un string

- [trim()](#function.trim) - Elimina los espacios (u otros caracteres) al inicio y al final de un string

# mb_ucfirst

(PHP 8 &gt;= 8.4.0)

mb_ucfirst — Convierte una string con la primera letra en mayúscula

### Descripción

**mb_ucfirst**([string](#language.types.string) $string, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)

Realiza una operación [ucfirst()](#function.ucfirst) segura para multi-octetos,
y devuelve una string con la primera letra de
string en mayúscula.

### Parámetros

    string


      La string de entrada.




    encoding


      La codificación de caracteres.


### Valores devueltos

Devuelve la string resultante.

### Notas

**Nota**:

    A diferencia de las funciones estándar de conversión de mayúsculas y minúsculas como
    [strtolower()](#function.strtolower) y [strtoupper()](#function.strtoupper),
    la conversión de mayúsculas y minúsculas se realiza en función de las propiedades de los caracteres Unicode.
    Por lo tanto, el comportamiento de esta función no se ve afectado por la configuración regional,
    y puede convertir todos los caracteres con la propiedad 'alfabético', como la diéresis sobre la "a" (ä).

Para obtener más información sobre las propiedades Unicode, consulte [» http://www.unicode.org/reports/tr21/](http://www.unicode.org/reports/tr21/).

### Ver también

- [mb_lcfirst()](#function.mb-lcfirst) - Convierte la primera letra de un string a minúscula

- [mb_convert_case()](#function.mb-convert-case) - Realiza una conversión a mayúsculas/minúsculas de un string

- [ucfirst()](#function.ucfirst) - Pone en mayúscula el primer carácter

## Tabla de contenidos

- [mb_check_encoding](#function.mb-check-encoding) — Verifica si las cadenas son válidas para el encodage especificado
- [mb_chr](#function.mb-chr) — Devuelve un carácter por su valor de punto de código Unicode
- [mb_convert_case](#function.mb-convert-case) — Realiza una conversión a mayúsculas/minúsculas de un string
- [mb_convert_encoding](#function.mb-convert-encoding) — Convertir una cadena de un codificación de caracteres a otra
- [mb_convert_kana](#function.mb-convert-kana) — Convierte un "kana" en otro ("zen-kaku", "han-kaku" y más)
- [mb_convert_variables](#function.mb-convert-variables) — Convierte la codificación de variables
- [mb_decode_mimeheader](#function.mb-decode-mimeheader) — Decodifica un encabezado MIME
- [mb_decode_numericentity](#function.mb-decode-numericentity) — Decodificar referencia numérica de cadena HTML a carácter
- [mb_detect_encoding](#function.mb-detect-encoding) — Detectar la codificación de caracteres
- [mb_detect_order](#function.mb-detect-order) — Lee/modifica el orden de detección de codificaciones
- [mb_encode_mimeheader](#function.mb-encode-mimeheader) — Codifica una cadena para un encabezado MIME
- [mb_encode_numericentity](#function.mb-encode-numericentity) — Codifica caracteres a referencia numérica HTML
- [mb_encoding_aliases](#function.mb-encoding-aliases) — Obtiene los alias de un tipo de codificación conocido
- [mb_ereg](#function.mb-ereg) — Búsqueda por expresión regular con soporte para caracteres multibyte
- [mb_ereg_match](#function.mb-ereg-match) — Expresión regular POSIX para strings multibyte
- [mb_ereg_replace](#function.mb-ereg-replace) — Reemplaza segmentos de cadena mediante expresiones regulares
- [mb_ereg_replace_callback](#function.mb-ereg-replace-callback) — Buscar y reemplazar mediante expresión regular con soporte multi byte utilizando una función de devolución de llamada
- [mb_ereg_search](#function.mb-ereg-search) — Búsqueda por expresión regular multioctets
- [mb_ereg_search_getpos](#function.mb-ereg-search-getpos) — Devuelve la posición de inicio para la siguiente comparación de una expresión regular
- [mb_ereg_search_getregs](#function.mb-ereg-search-getregs) — Lee el último segmento de cadena multioctets que coincide con el patrón
- [mb_ereg_search_init](#function.mb-ereg-search-init) — Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos
- [mb_ereg_search_pos](#function.mb-ereg-search-pos) — Retorna la posición y la longitud del segmento de string que cumple con el patrón de expresión regular
- [mb_ereg_search_regs](#function.mb-ereg-search-regs) — Retorna el segmento de cadena encontrado por una expresión regular multioctets
- [mb_ereg_search_setpos](#function.mb-ereg-search-setpos) — Selecciona el punto de partida para la búsqueda mediante expresión regular
- [mb_eregi](#function.mb-eregi) — Expresión regular insensible a mayúsculas/minúsculas con soporte para caracteres multioctetos
- [mb_eregi_replace](#function.mb-eregi-replace) — Expresión regular con soporte para caracteres multibyte, sin distinción de mayúsculas y minúsculas
- [mb_get_info](#function.mb-get-info) — Lee la configuración interna de la extensión mbstring
- [mb_http_input](#function.mb-http-input) — Detecta el tipo de codificación de caracteres HTTP
- [mb_http_output](#function.mb-http-output) — Lee/modifica la codificación de visualización
- [mb_internal_encoding](#function.mb-internal-encoding) — Lee/modifica la codificación interna
- [mb_language](#function.mb-language) — Define/Recupera el lenguaje actual
- [mb_lcfirst](#function.mb-lcfirst) — Convierte la primera letra de un string a minúscula
- [mb_list_encodings](#function.mb-list-encodings) — Devuelve un array que contiene todos los encodings soportados
- [mb_ltrim](#function.mb-ltrim) — Elimina los espacios (u otros caracteres) del inicio de un string
- [mb_ord](#function.mb-ord) — Obtiene el punto de código Unicode de un carácter
- [mb_output_handler](#function.mb-output-handler) — Función de tratamiento de los despliegues
- [mb_parse_str](#function.mb-parse-str) — Analiza los datos HTTP GET/POST/COOKIE y asigna las variables globales
- [mb_preferred_mime_name](#function.mb-preferred-mime-name) — Detecta la codificación MIME
- [mb_regex_encoding](#function.mb-regex-encoding) — Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos
- [mb_regex_set_options](#function.mb-regex-set-options) — Lee y modifica las opciones de las funciones de expresión regular con soporte para caracteres multibyte
- [mb_rtrim](#function.mb-rtrim) — Elimina los espacios (u otros caracteres) del final de un string
- [mb_scrub](#function.mb-scrub) — Reemplaza las secuencias de bytes mal formadas por el carácter de sustitución.
- [mb_send_mail](#function.mb-send-mail) — Envía un correo electrónico codificado
- [mb_split](#function.mb-split) — Divide una string en un array utilizando una expresión regular multibyte
- [mb_str_pad](#function.mb-str-pad) — Rellena una cadena multibyte hasta una cierta longitud con otra cadena multibyte
- [mb_str_split](#function.mb-str-split) — Para una cadena multibyte dada, devuelve un array de sus caracteres
- [mb_strcut](#function.mb-strcut) — Corta una parte de string
- [mb_strimwidth](#function.mb-strimwidth) — Trunca una cadena
- [mb_stripos](#function.mb-stripos) — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_stristr](#function.mb-stristr) — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_strlen](#function.mb-strlen) — Devuelve la longitud de una cadena
- [mb_strpos](#function.mb-strpos) — Localiza la primera ocurrencia de un carácter en una cadena
- [mb_strrchr](#function.mb-strrchr) — Encuentra la última ocurrencia de un carácter de una cadena en otra
- [mb_strrichr](#function.mb-strrichr) — Encuentra la última ocurrencia de un carácter de una cadena en otra, sin distinción de mayúsculas y minúsculas
- [mb_strripos](#function.mb-strripos) — Encuentra la posición de la última ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_strrpos](#function.mb-strrpos) — Localiza la última ocurrencia de un carácter en una cadena
- [mb_strstr](#function.mb-strstr) — Encuentra la primera ocurrencia de una cadena en otra
- [mb_strtolower](#function.mb-strtolower) — Convierte todos los caracteres a minúsculas
- [mb_strtoupper](#function.mb-strtoupper) — Convierte todos los caracteres a mayúsculas
- [mb_strwidth](#function.mb-strwidth) — Devuelve el tamaño de una cadena
- [mb_substitute_character](#function.mb-substitute-character) — Define/Recupera los caracteres de sustitución
- [mb_substr](#function.mb-substr) — Extrae una subcadena
- [mb_substr_count](#function.mb-substr-count) — Cuenta el número de ocurrencias de una subcadena
- [mb_trim](#function.mb-trim) — Elimina los espacios (u otros caracteres) del inicio y final de un string
- [mb_ucfirst](#function.mb-ucfirst) — Convierte una string con la primera letra en mayúscula

- [Introducción](#intro.mbstring)
- [Instalación/Configuración](#mbstring.setup)<li>[Instalación](#mbstring.installation)
- [Configuración en tiempo de ejecución](#mbstring.configuration)
  </li>- [Constantes predefinidas](#mbstring.constants)
- [Juegos de caracteres soportados](#mbstring.encodings)
- [Casos de caracteres japoneses](#mbstring.ja-basic)
- [Entradas/Salidas HTTP](#mbstring.http)
- [Juegos de caracteres soportados](#mbstring.supported-encodings)
- [Función de sobrecarga](#mbstring.overload)
- [Requerimientos para la codificación de caracteres en PHP](#mbstring.php4.req)
- [Funciones de strings multibyte](#ref.mbstring)<li>[mb_check_encoding](#function.mb-check-encoding) — Verifica si las cadenas son válidas para el encodage especificado
- [mb_chr](#function.mb-chr) — Devuelve un carácter por su valor de punto de código Unicode
- [mb_convert_case](#function.mb-convert-case) — Realiza una conversión a mayúsculas/minúsculas de un string
- [mb_convert_encoding](#function.mb-convert-encoding) — Convertir una cadena de un codificación de caracteres a otra
- [mb_convert_kana](#function.mb-convert-kana) — Convierte un "kana" en otro ("zen-kaku", "han-kaku" y más)
- [mb_convert_variables](#function.mb-convert-variables) — Convierte la codificación de variables
- [mb_decode_mimeheader](#function.mb-decode-mimeheader) — Decodifica un encabezado MIME
- [mb_decode_numericentity](#function.mb-decode-numericentity) — Decodificar referencia numérica de cadena HTML a carácter
- [mb_detect_encoding](#function.mb-detect-encoding) — Detectar la codificación de caracteres
- [mb_detect_order](#function.mb-detect-order) — Lee/modifica el orden de detección de codificaciones
- [mb_encode_mimeheader](#function.mb-encode-mimeheader) — Codifica una cadena para un encabezado MIME
- [mb_encode_numericentity](#function.mb-encode-numericentity) — Codifica caracteres a referencia numérica HTML
- [mb_encoding_aliases](#function.mb-encoding-aliases) — Obtiene los alias de un tipo de codificación conocido
- [mb_ereg](#function.mb-ereg) — Búsqueda por expresión regular con soporte para caracteres multibyte
- [mb_ereg_match](#function.mb-ereg-match) — Expresión regular POSIX para strings multibyte
- [mb_ereg_replace](#function.mb-ereg-replace) — Reemplaza segmentos de cadena mediante expresiones regulares
- [mb_ereg_replace_callback](#function.mb-ereg-replace-callback) — Buscar y reemplazar mediante expresión regular con soporte multi byte utilizando una función de devolución de llamada
- [mb_ereg_search](#function.mb-ereg-search) — Búsqueda por expresión regular multioctets
- [mb_ereg_search_getpos](#function.mb-ereg-search-getpos) — Devuelve la posición de inicio para la siguiente comparación de una expresión regular
- [mb_ereg_search_getregs](#function.mb-ereg-search-getregs) — Lee el último segmento de cadena multioctets que coincide con el patrón
- [mb_ereg_search_init](#function.mb-ereg-search-init) — Configura las cadenas y las expresiones regulares para el soporte de caracteres multioctetos
- [mb_ereg_search_pos](#function.mb-ereg-search-pos) — Retorna la posición y la longitud del segmento de string que cumple con el patrón de expresión regular
- [mb_ereg_search_regs](#function.mb-ereg-search-regs) — Retorna el segmento de cadena encontrado por una expresión regular multioctets
- [mb_ereg_search_setpos](#function.mb-ereg-search-setpos) — Selecciona el punto de partida para la búsqueda mediante expresión regular
- [mb_eregi](#function.mb-eregi) — Expresión regular insensible a mayúsculas/minúsculas con soporte para caracteres multioctetos
- [mb_eregi_replace](#function.mb-eregi-replace) — Expresión regular con soporte para caracteres multibyte, sin distinción de mayúsculas y minúsculas
- [mb_get_info](#function.mb-get-info) — Lee la configuración interna de la extensión mbstring
- [mb_http_input](#function.mb-http-input) — Detecta el tipo de codificación de caracteres HTTP
- [mb_http_output](#function.mb-http-output) — Lee/modifica la codificación de visualización
- [mb_internal_encoding](#function.mb-internal-encoding) — Lee/modifica la codificación interna
- [mb_language](#function.mb-language) — Define/Recupera el lenguaje actual
- [mb_lcfirst](#function.mb-lcfirst) — Convierte la primera letra de un string a minúscula
- [mb_list_encodings](#function.mb-list-encodings) — Devuelve un array que contiene todos los encodings soportados
- [mb_ltrim](#function.mb-ltrim) — Elimina los espacios (u otros caracteres) del inicio de un string
- [mb_ord](#function.mb-ord) — Obtiene el punto de código Unicode de un carácter
- [mb_output_handler](#function.mb-output-handler) — Función de tratamiento de los despliegues
- [mb_parse_str](#function.mb-parse-str) — Analiza los datos HTTP GET/POST/COOKIE y asigna las variables globales
- [mb_preferred_mime_name](#function.mb-preferred-mime-name) — Detecta la codificación MIME
- [mb_regex_encoding](#function.mb-regex-encoding) — Define/Recupera la codificación de caracteres para las expresiones regulares multioctetos
- [mb_regex_set_options](#function.mb-regex-set-options) — Lee y modifica las opciones de las funciones de expresión regular con soporte para caracteres multibyte
- [mb_rtrim](#function.mb-rtrim) — Elimina los espacios (u otros caracteres) del final de un string
- [mb_scrub](#function.mb-scrub) — Reemplaza las secuencias de bytes mal formadas por el carácter de sustitución.
- [mb_send_mail](#function.mb-send-mail) — Envía un correo electrónico codificado
- [mb_split](#function.mb-split) — Divide una string en un array utilizando una expresión regular multibyte
- [mb_str_pad](#function.mb-str-pad) — Rellena una cadena multibyte hasta una cierta longitud con otra cadena multibyte
- [mb_str_split](#function.mb-str-split) — Para una cadena multibyte dada, devuelve un array de sus caracteres
- [mb_strcut](#function.mb-strcut) — Corta una parte de string
- [mb_strimwidth](#function.mb-strimwidth) — Trunca una cadena
- [mb_stripos](#function.mb-stripos) — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_stristr](#function.mb-stristr) — Encuentra la primera ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_strlen](#function.mb-strlen) — Devuelve la longitud de una cadena
- [mb_strpos](#function.mb-strpos) — Localiza la primera ocurrencia de un carácter en una cadena
- [mb_strrchr](#function.mb-strrchr) — Encuentra la última ocurrencia de un carácter de una cadena en otra
- [mb_strrichr](#function.mb-strrichr) — Encuentra la última ocurrencia de un carácter de una cadena en otra, sin distinción de mayúsculas y minúsculas
- [mb_strripos](#function.mb-strripos) — Encuentra la posición de la última ocurrencia de una cadena en otra, sin tener en cuenta la casilla
- [mb_strrpos](#function.mb-strrpos) — Localiza la última ocurrencia de un carácter en una cadena
- [mb_strstr](#function.mb-strstr) — Encuentra la primera ocurrencia de una cadena en otra
- [mb_strtolower](#function.mb-strtolower) — Convierte todos los caracteres a minúsculas
- [mb_strtoupper](#function.mb-strtoupper) — Convierte todos los caracteres a mayúsculas
- [mb_strwidth](#function.mb-strwidth) — Devuelve el tamaño de una cadena
- [mb_substitute_character](#function.mb-substitute-character) — Define/Recupera los caracteres de sustitución
- [mb_substr](#function.mb-substr) — Extrae una subcadena
- [mb_substr_count](#function.mb-substr-count) — Cuenta el número de ocurrencias de una subcadena
- [mb_trim](#function.mb-trim) — Elimina los espacios (u otros caracteres) del inicio y final de un string
- [mb_ucfirst](#function.mb-ucfirst) — Convierte una string con la primera letra en mayúscula
  </li>
