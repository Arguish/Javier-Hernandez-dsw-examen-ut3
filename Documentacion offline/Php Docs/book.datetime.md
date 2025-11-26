# Fecha y Hora

# Introducción

[DateTimeImmutable](#class.datetimeimmutable) y las clases asociadas permiten
representar las informaciones de fecha y hora. Los objetos pueden ser creados pasando las
informaciones de fecha y hora mediante una cadena de caracteres, o a partir de la hora del sistema
utilizado.

Un conjunto rico de métodos es proporcionado para modificar y formatear estas informaciones
así como la gestión de los husos horarios y las transiciones DST.

Las funcionalidades de fecha/hora de PHP implementan el calendario ISO 8601,
que es un [» calendario
Gregoriano proleptico](https://en.wikipedia.org/wiki/Proleptic_Gregorian_calendar) implementando las reglas actuales de los días
bisiestos antes de la puesta en marcha del calendario Gregoriano, e incluye
también el año 0 como número de año comprendido entre
-1 antes de la era común y 1 de la era común.
Los segundos intercalares no son soportados.

Las informaciones relativas a la fecha y la hora son almacenadas internamente
como número de 64 bits, por lo tanto, todas las fechas imaginables (incluyendo
las fechas negativas) son soportadas. El intervalo va de 292 mil millones
de años en el pasado, y el mismo valor en el futuro.

**Nota**:

    Los husos horarios referenciados en esta sección pueden
    ser encontrados en la sección [Lista de Zonas Horarias Soportadas](#timezones).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#datetime.installation)
- [Configuración en tiempo de ejecución](#datetime.configuration)

## Instalación

No hay instalación necesaria para
usar estas funciones, son parte del núcleo de PHP.

**Nota**:
**Recuperación de la última base de datos de los husos horarios**

La última versión de la base de datos de los husos horarios puede
ser instalada mediante el paquete PECL
[» timezonedb](https://pecl.php.net/get/timezonedb).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración para fechas y horas**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [date.default_latitude](#ini.date.default-latitude)
      "31.7667"
      **[INI_ALL](#constant.ini-all)**
       



      [date.default_longitude](#ini.date.default-longitude)
      "35.2333"
      **[INI_ALL](#constant.ini-all)**
       



      [date.sunrise_zenith](#ini.date.sunrise-zenith)
      "90.833333"
      **[INI_ALL](#constant.ini-all)**
      Antes de PHP 8.0.0, el valor por omisión era "90.583333"



      [date.sunset_zenith](#ini.date.sunset-zenith)
      "90.833333"
      **[INI_ALL](#constant.ini-all)**
      Antes de PHP 8.0.0, el valor por omisión era "90.583333"



      [date.timezone](#ini.date.timezone)
      "UTC"
      **[INI_ALL](#constant.ini-all)**
      Desde PHP 8.2, se emite una advertencia si la opción se define
       con un valor inválido o una cadena vacía.


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     date.default_latitude
     [float](#language.types.float)



      La latitud por omisión
      que va desde 0 en el ecuador,
      hasta +90 en dirección norte,
      y -90 en dirección sur.








     date.default_longitude
     [float](#language.types.float)



      La longitud por omisión
      que va desde 0 en el meridiano de origen,
      hasta +180 en dirección este,
      y -180 en dirección oeste.








     date.sunrise_zenith
     [float](#language.types.float)



      La hora de salida del sol por omisión.




      El valor por omisión es 90°50'. Los 50' adicionales
      se deben a dos componentes: el radio del Sol, que es
      de 16', y la refracción atmosférica, que es de 34'.








     date.sunset_zenith
     [float](#language.types.float)



      La hora de puesta del sol por omisión.








     date.timezone
     [string](#language.types.string)



      La zona horaria por omisión utilizada por todas las funciones de fecha/hora.
      El orden de las zonas horarias utilizadas si ninguna se especifica está
      descrito explícitamente en la página de documentación de la función
      [date_default_timezone_get()](#function.date-default-timezone-get).
      Ver [Lista de Zonas Horarias Soportadas](#timezones) para una lista completa de las zonas
      horarias soportadas.


**Nota**:

Las cuatro primeras opciones de configuración se utilizan actualmente
únicamente por las funciones [date_sunrise()](#function.date-sunrise)
y [date_sunset()](#function.date-sunset).

# Constantes predefinidas

Las contantes **[DATE\_\*](#constant.date-atom)**
están definidas y ofrecen representaciones de fecha estándar
que pueden ser empleadas por funciones de formato de fecha
(como [date()](#function.date)).

**
Disponibles como returnFormat para
[date_sunrise()](#function.date-sunrise) y
[date_sunset()](#function.date-sunset)
**

**Advertencia**

    Estas constantes están obsoletas desde PHP 8.4.0.
    Las funciones correspondientes [date_sunrise()](#function.date-sunrise) y
    [date_sunset()](#function.date-sunset) están obsoletas desde PHP 8.1.0.







    **[SUNFUNCS_RET_TIMESTAMP](#constant.sunfuncs-ret-timestamp)**
    ([int](#language.types.integer))



     Timestamp





    **[SUNFUNCS_RET_STRING](#constant.sunfuncs-ret-string)**
    ([int](#language.types.integer))



     Horas:minutos (ejemplo: 08:02)





    **[SUNFUNCS_RET_DOUBLE](#constant.sunfuncs-ret-double)**
    ([int](#language.types.integer))



     Horas como número con decimales (ejemplo 8.75)

**[DATE\_\*](#constant.date-atom)** constants

    **[DATE_ATOM](#constant.date-atom)**
    ([string](#language.types.string))



     Atom (ejemplo: 2005-08-15T15:52:01+00:00)






    **[DATE_COOKIE](#constant.date-cookie)**
    ([string](#language.types.string))



     HTTP Cookies (ejemplo: Monday, 15-Aug-2005 15:52:01 UTC)






    **[DATE_ISO8601](#constant.date-iso8601)**
    ([string](#language.types.string))



     ISO-8601 (ejemplo: 2005-08-15T15:52:01+0000)

    **Nota**:

      Este formato no es compatible con el ISO-8601, aunque se deja por
      razones de retrocompatibilidad. Use
      **[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded)**,
      **[DateTimeInterface::ATOM](#datetimeinterface.constants.atom)** en su lugar para que sea
      compatible con el ISO-8601. (ref ISO8601:2004 section 4.3.3 clause d)









    **[DATE_ISO8601_EXPANDED](#constant.date-iso8601-expanded)**
    ([string](#language.types.string))



     ISO-8601 Extendido (ejemplo: +10191-07-26T08:59:52+01:00)

    **Nota**:

      Este formato permite rangos de años fuera del rango normal de ISO-8601
      de 0000-9999 al incluir siempre
      un carácter de signo. También asegura que la parte de la zona horaria
      (+01:00) sea compatible con ISO-8601.









    **[DATE_RFC822](#constant.date-rfc822)**
    ([string](#language.types.string))



     RFC 822 (ejemplo: Mon, 15 Aug 05 15:52:01 +0000)






    **[DATE_RFC850](#constant.date-rfc850)**
    ([string](#language.types.string))



     RFC 850 (ejemplo: Monday, 15-Aug-05 15:52:01 UTC)






    **[DATE_RFC1036](#constant.date-rfc1036)**
    ([string](#language.types.string))



     RFC 1036 (ejemplo: Mon, 15 Aug 05 15:52:01 +0000)






    **[DATE_RFC1123](#constant.date-rfc1123)**
    ([string](#language.types.string))



     RFC 1123 (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000)






    **[DATE_RFC7231](#constant.date-rfc7231)**
    ([string](#language.types.string))



     RFC 7231 (desde PHP 7.0.19 y 7.1.5)
     (ejemplo: Sat, 30 Apr 2016 17:52:13 GMT)






    **[DATE_RFC2822](#constant.date-rfc2822)**
    ([string](#language.types.string))



     RFC 2822 (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000)






    **[DATE_RFC3339](#constant.date-rfc3339)**
    ([string](#language.types.string))



     Same as **[DATE_ATOM](#constant.date-atom)**.






    **[DATE_RFC3339_EXTENDED](#constant.date-rfc3339-extended)**
    ([string](#language.types.string))



     Formato RFC 3339 EXTENDED
     (ejemplo: 2005-08-15T15:52:01.000+00:00)






    **[DATE_RSS](#constant.date-rss)**
    ([string](#language.types.string))



     RSS (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000).
     Alias de **[DATE_RFC1123](#constant.date-rfc1123)**.






    **[DATE_W3C](#constant.date-w3c)**
    ([string](#language.types.string))



     World Wide Web Consortium (ejemplo: 2005-08-15T15:52:01+00:00).
     Alias de **[DATE_RFC3339](#constant.date-rfc3339)**.

# Ejemplos

## Tabla de contenidos

- [Aritmética con DateTime](#datetime.examples-arithmetic)

    ## Aritmética con DateTime

    Los ejemplos siguientes muestran algunos problemas de la aritmética de DateTime en lo que respecta
    a las transiciones DST y los meses con diferente número de días.

    **Ejemplo #1 DateTimeImmutable::add/sub añadir un intervalo de tiempo transcurrido**

    Añadir PT24H más allá de una transición DST parecerá añadir 23/25 horas
    (para la mayoría de los husos horarios).

&lt;?php
$dt = new DateTimeImmutable("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;add(new DateInterval("PT3H"));
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

    El ejemplo anterior mostrará:

Start: 2015-11-01 00:00:00 -04:00
End: 2015-11-01 02:00:00 -05:00

    **Ejemplo #2 DateTimeImmutable::modify y strtotime incrementar o decrementar valores individuales**



     Añadir +24 horas más allá de una transición DST puede añadir exactamente 24
     horas como se ve con la cadena fecha/hora
     (excepto si la hora de inicio o fin está en un punto de transición).

&lt;?php
$dt = new DateTimeImmutable("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;modify("+24 hours");
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

    El ejemplo anterior mostrará:

Start: 2015-11-01 00:00:00 -04:00
End: 2015-11-02 00:00:00 -05:00

    **Ejemplo #3 La adición o sustracción de fechas/horas puede exceder
     (en más o en menos) fechas**



     Como para 31 de Enero + 1 mes dará como resultado 2 de Marzo (año bisiesto) o
     3 de Marzo (año normal).

&lt;?php
echo "Normal year:\n"; // February has 28 days
$dt = new DateTimeImmutable("2015-01-31 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;modify("+1 month");
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

echo "Leap year:\n"; // February has 29 days
$dt = new DateTimeImmutable("2016-01-31 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;modify("+1 month");
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

    El ejemplo anterior mostrará:

Normal year:
Start: 2015-01-31 00:00:00 -05:00
End: 2015-03-03 00:00:00 -05:00
Leap year:
Start: 2016-01-31 00:00:00 -05:00
End: 2016-03-02 00:00:00 -05:00

     Para obtener el último día del mes próximo (es decir, para prever el
     excedente), el formato last day of está disponible.

&lt;?php
echo "Normal year:\n"; // February has 28 days
$dt = new DateTimeImmutable("2015-01-31 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;modify("last day of next month");
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

echo "Leap year:\n"; // February has 29 days
$dt = new DateTimeImmutable("2016-01-31 00:00:00", new DateTimeZone("America/New_York"));
echo "Start: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;
$dt = $dt-&gt;modify("last day of next month");
echo "End: ", $dt-&gt;format("Y-m-d H:i:s P"), PHP_EOL;

    El ejemplo anterior mostrará:

Normal year:
Start: 2015-01-31 00:00:00 -05:00
End: 2015-02-28 00:00:00 -05:00
Leap year:
Start: 2016-01-31 00:00:00 -05:00
End: 2016-02-29 00:00:00 -05:00

# La clase DateTime

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

## Introducción

    Representación de la fecha y la hora.




    Esta clase se comporta igual que [DateTimeImmutable](#class.datetimeimmutable),
    excepto que los objetos se modifican cuando se llaman métodos de modificación
    como [DateTime::modify()](#datetime.modify).

**Advertencia**

     Llamando metodos en objetos de la clase **DateTime**
     cambiará la información encapsulada en ese objeto, si deseas prevenir
     eso tendrás que usar el operador clone para
     crear un nuevo objeto. Usa [DateTimeImmutable](#class.datetimeimmutable)
     en lugar de **DateTime** para obtener este comportamiento
     recomendado por defecto.

## Sinopsis de la Clase

     class **DateTime**



     implements
      [DateTimeInterface](#class.datetimeinterface) {

    /* Constantaes heredadas constants */

     public
     const
     [string](#language.types.string)
      [DateTimeInterface::ATOM](#datetimeinterface.constants.atom) = "Y-m-d\\TH:i:sP";

public
const
[string](#language.types.string)
[DateTimeInterface::COOKIE](#datetimeinterface.constants.cookie) = "l, d-M-Y H:i:s T";
public
const
[string](#language.types.string)
[DateTimeInterface::ISO8601](#datetimeinterface.constants.iso8601) = "Y-m-d\\TH:i:sO";
public
const
[string](#language.types.string)
[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded) = "X-m-d\\TH:i:sP";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC822](#datetimeinterface.constants.rfc822) = "D, d M y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC850](#datetimeinterface.constants.rfc850) = "l, d-M-y H:i:s T";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC1036](#datetimeinterface.constants.rfc1036) = "D, d M y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC1123](#datetimeinterface.constants.rfc1123) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC7231](#datetimeinterface.constants.rfc7231) = "D, d M Y H:i:s \\G\\M\\T";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC2822](#datetimeinterface.constants.rfc2822) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC3339](#datetimeinterface.constants.rfc3339) = "Y-m-d\\TH:i:sP";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC3339_EXTENDED](#datetimeinterface.constants.rfc3339-extended) = "Y-m-d\\TH:i:s.vP";
public
const
[string](#language.types.string)
[DateTimeInterface::RSS](#datetimeinterface.constants.rss) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::W3C](#datetimeinterface.constants.w3c) = "Y-m-d\\TH:i:sP";

    /* Métodos */

public [\_\_construct](#datetime.construct)([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**)

    public [add](#datetime.add)([DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

public static [createFromFormat](#datetime.createfromformat)([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTime](#class.datetime)|[false](#language.types.singleton)
public static [createFromImmutable](#datetime.createfromimmutable)([DateTimeImmutable](#class.datetimeimmutable) $object): static
public static [createFromInterface](#datetime.createfrominterface)([DateTimeInterface](#class.datetimeinterface) $object): [DateTime](#class.datetime)
public [modify](#datetime.modify)([string](#language.types.string) $modifier): [DateTime](#class.datetime)
public static [\_\_set_state](#datetime.set-state)([array](#language.types.array) $array): [DateTime](#class.datetime)
public [setDate](#datetime.setdate)([int](#language.types.integer) $year, [int](#language.types.integer) $month, [int](#language.types.integer) $day): [DateTime](#class.datetime)
public [setISODate](#datetime.setisodate)([int](#language.types.integer) $year, [int](#language.types.integer) $week, [int](#language.types.integer) $dayOfWeek = 1): [DateTime](#class.datetime)
public [setTime](#datetime.settime)(
    [int](#language.types.integer) $hour,
    [int](#language.types.integer) $minute,
    [int](#language.types.integer) $second = 0,
    [int](#language.types.integer) $microsecond = 0
): [DateTime](#class.datetime)
public [setTimestamp](#datetime.settimestamp)([int](#language.types.integer) $timestamp): [DateTime](#class.datetime)
public [setTimezone](#datetime.settimezone)([DateTimeZone](#class.datetimezone) $timezone): [DateTime](#class.datetime)
public [sub](#datetime.sub)([DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

    public [diff](#datetime.diff)([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

public [format](#datetime.format)([string](#language.types.string) $format): [string](#language.types.string)
public [getOffset](#datetime.getoffset)(): [int](#language.types.integer)
public [getTimestamp](#datetime.gettimestamp)(): [int](#language.types.integer)
public [getTimezone](#datetime.gettimezone)(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)
public [\_\_serialize](#datetime.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#datetime.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)
[#[\Deprecated]](class.deprecated.html)
public [\_\_wakeup](#datetime.wakeup)(): [void](language.types.void.html)

}

## Historial de cambios

        Versión
        Descripción






        8.4.0

         Las constantes de clase ahora están tipadas.




        7.2.0

         Las constantes de clase de  **DateTime** ahora están
         definidas en [DateTimeInterface](#class.datetimeinterface).




        7.1.0

         El constructor de **DateTime** ahora incluye los
         microsegundos actuales en el valor construido. Antes de esto, siempre
         inicializaría los microsegundos a 0.






# DateTime::add

# date_add

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::add -- date_add —
Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos

### Descripción

Estilo orientado a objetos

public **DateTime::add**([DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

Estilo procedimental

[date_add](#function.date-add)([DateTime](#class.datetime) $object, [DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

Añade el objeto [DateInterval](#class.dateinterval) especificado al
objeto [DateTime](#class.datetime) especificado.

Igual que [DateTimeImmutable::add()](#datetimeimmutable.add), pero
funciona con [DateTime](#class.datetime).

La versión procedimental toma el objeto [DateTime](#class.datetime)
como su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

     interval



      Un objeto [DateInterval](#class.dateinterval)


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Ver también

- [DateTimeImmutable::add()](#datetimeimmutable.add) - Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos

# DateTime::\_\_construct

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::\_\_construct — Devuelve un nuevo objeto DateTime

### Descripción

public **DateTime::\_\_construct**([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**)

Igual que [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) pero funciona con
[DateTime](#class.datetime). Considere usar
[DateTimeImmutable](#class.datetimeimmutable) y sus características en su lugar.

Devuelve un nuevo objeto DateTime.

### Parámetros

    datetime

     Una cadena de fecha/hora. Los formatos válidos son explicados en la documentación sobre los

[formatos de Fecha y Hora](#datetime.formats).

      Introduzca "now" aquí para obtener el instante actual cuando se emplee
      el parámetro $timezone.






    timezone


      Un objeto [DateTimeZone](#class.datetimezone) que representa la
      zona horaria de $datetime.




      Si se omite $timezone o
      es **[null](#constant.null)**, se usará la zona horaria actual.



     **Nota**:



       El parámetro $timezone
       y la zona horaria actuales se ignoran cuando el
       parámetro $time
       es una marca temporal de UNIX (p.ej. @946684800)
       o especifica una zona horaria
       (p.ej. 2010-01-28T15:00:00+02:00).





### Valores devueltos

Devuelve una nueva instancia de DateTime.

### Errores/Excepciones

    Si se pasa una cadena de fecha/hora incorrecta,
    lanza [DateMalformedStringException](#class.datemalformedstringexception).
    Hasta PHP 8.3, lanzaba [Exception](#class.exception).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Ahora lanza
        [DateMalformedStringException](#class.datemalformedstringexception) si
        se pasa una cadena incorrecta, en vez de
        [Exception](#class.exception).





### Ver también

- [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) - Devuelve un nuevo objeto DateTimeImmutable

# DateTime::createFromFormat

# date_create_from_format

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::createFromFormat -- date_create_from_format — Analiza una cadena con un instante según un formato especificado

### Descripción

Estilo orientado a objetos

public static **DateTime::createFromFormat**([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTime](#class.datetime)|[false](#language.types.singleton)

Estilo procedimental

[date_create_from_format](#function.date-create-from-format)([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTime](#class.datetime)|[false](#language.types.singleton)

Devuelve un nuevo objeto DateTime que representa la fecha y la hora especificadas por la
cadena time, la cual fue formateada en el formato indicado en
format.

Igual que [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat)
y [date_create_immutable_from_format()](#function.date-create-immutable-from-format), respectivamente, pero
crea un objeto [DateTime](#class.datetime).

Este método, incluyendo parámetros, ejemplos y consideraciones están
documentados en la página
[DateTimeImmutable::createFromFormat](#datetimeimmutable.createfromformat).

### Parámetros

Vease [DateTimeImmutable::createFromFormat](#datetimeimmutable.createfromformat).

### Valores devueltos

Devuelve una nueva instancia de DateTime o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método lanza [ValueError](#class.valueerror) cuando
datetime contiene bytes nulos (NULL-bytes).

### Historial de cambios

       Versión
       Descripción






       5.3.9

        Se añadió el especficador + para format.





### Historial de cambios

      Versión
      Descripción






      8.0.21, 8.1.8, 8.2.0

       Ahora lanza [ValueError](#class.valueerror) cuando se pasan
       bytes nulos (NULL-bytes) a datetime, cuando
       antes eran ignorados silenciosamente.



### Ejemplos

Para una lista extensa de ejemplos, vea
[DateTimeImmutable::createFromFormat](#datetimeimmutable.createfromformat).

### Ver también

- [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) - Analiza un string de tiempo según el formato especificado

# DateTime::createFromImmutable

(PHP 7 &gt;= 7.3.0, PHP 8)

DateTime::createFromImmutable — Devuelve una nueva instancia de DateTime encapsulando el objeto DateTimeImmutable dado

### Descripción

public static **DateTime::createFromImmutable**([DateTimeImmutable](#class.datetimeimmutable) $object): static

### Parámetros

     object


       El objeto [DateTimeImmutable](#class.datetimeimmutable) inmutable que necesita
       ser convertido a una versión mutable. Este objeto no es modificado, sino que
       en su lugar se crea una nueva instancia de [DateTime](#class.datetime)
       que contiene la misma fecha, hora y zona horaria.





### Valores devueltos

Devuelve una nueva instancia de [DateTime](#class.datetime).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        El método ahora devuelve una instancia de la clase actualmente invocada. Anteriormente, creaba una nueva instancia
        de [DateTime](#class.datetime).





### Ejemplos

    **Ejemplo #1 Creando un objeto de fecha y hora mutable**

&lt;?php
$date = new DateTimeImmutable("2014-06-20 11:45 Europe/London");
$mutable = DateTime::createFromImmutable( $date );

# DateTime::createFromInterface

(PHP 8)

DateTime::createFromInterface — RDevuelve un nuevo objeto DateTime que encapsula el objeto DateTimeInterface dado

### Descripción

public static **DateTime::createFromInterface**([DateTimeInterface](#class.datetimeinterface) $object): [DateTime](#class.datetime)

### Parámetros

     object


       El objeto [DateTimeInterface](#class.datetimeinterface) que necesita
       ser convertido a una versión mutable. Este objeto no se modifica, sino que
       en su lugar se crea un nuevo objeto [DateTime](#class.datetime)
       que contiene la misma información de fecha, hora y zona horaria.





### Valores devueltos

Devuelve una nueva instancia de [DateTime](#class.datetime).

### Ejemplos

    **Ejemplo #1 Creando un objeto fecha y hora mutable**

&lt;?php
$date = new DateTimeImmutable("2014-06-20 11:45 Europe/London");
$mutable = DateTime::createFromInterface($date);

$date = new DateTime("2014-06-20 11:45 Europe/London");
$also_mutable = DateTime::createFromInterface($date);

# DateTime::getLastErrors

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::getLastErrors — Alias de [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors)

### Descripción

Esta función es un alias de: [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors)

# DateTime::modify

# date_modify

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::modify -- date_modify — Altera la marca temporal

### Descripción

Estilo orientado a objetos

public **DateTime::modify**([string](#language.types.string) $modifier): [DateTime](#class.datetime)

Estilo procedimental

[date_modify](#function.date-modify)([DateTime](#class.datetime) $object, [string](#language.types.string) $modifier): [DateTime](#class.datetime)|[false](#language.types.singleton)

Altera la marca temporal de un objeto DateTime aumentando o disminuyendo en un
formato aceptado por [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct).

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    modifier

     Una cadena de fecha/hora. Los formatos válidos son explicados en la documentación sobre los

[formatos de Fecha y Hora](#datetime.formats).

### Valores devueltos

Devuelve [DateTime](#class.datetime) en caso de éxito.
Estilo procedimental retorna **[false](#constant.false)** en caso de error.

### Errores/Excepciones

    Solo en la API Orientada a Objetos: Si se pasa una cadena de Fecha/Hora inválida,
    se lanza [DateMalformedStringException](#class.datemalformedstringexception).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       **DateTime::modify()** ahora lanza
       [DateMalformedStringException](#class.datemalformedstringexception) si se
       pasa una cadena inválida. Anteriormente, devolvía false,
       y se emitía una advertencia.
       [date_modify()](#function.date-modify) no ha cambiado.



### Ejemplos

**Ejemplo #1 Ejemplo de DateTime::modify()**

Estilo orientado a objetos

&lt;?php
$date = new DateTime('2006-12-12');
$date-&gt;modify('+1 day');
echo $date-&gt;format('Y-m-d');

El ejemplo anterior mostrará:

2006-12-13

Estilo procedimental

&lt;?php
$date = date_create('2006-12-12');
date_modify($date, '+1 day');
echo date_format($date, 'Y-m-d');

El ejemplo anterior mostrará:

2006-12-13

**Ejemplo #2 Cuidado al añadir o sustraer meses**

&lt;?php
$date = new DateTime('2000-12-31');

$date-&gt;modify('+1 month');
echo $date-&gt;format('Y-m-d') . "\n";

$date-&gt;modify('+1 month');
echo $date-&gt;format('Y-m-d') . "\n";

El ejemplo anterior mostrará:

2001-01-31
2001-03-03

**Ejemplo #3 Todos los formatos de Fecha y Hora son admitidos**

&lt;?php
$date = new DateTime('2020-12-31');

$date-&gt;modify('July 1st, 2023');
echo $date-&gt;format('Y-m-d H:i') . "\n";

$date-&gt;modify('Monday next week');
echo $date-&gt;format('Y-m-d H:i') . "\n";

$date-&gt;modify('17:30');
echo $date-&gt;format('Y-m-d H:i') . "\n";

El ejemplo anterior mostrará:

2023-07-01 00:00
2023-07-03 00:00
2023-07-03 17:30

### Ver también

- [strtotime()](#function.strtotime) - Transforma un texto inglés en timestamp

- [DateTimeImmutable::modify()](#datetimeimmutable.modify) - Crea un nuevo objeto con la marca de tiempo modificada

- [DateTime::add()](#datetime.add) - Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos

- [DateTime::sub()](#datetime.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto
  DateTime

- [DateTime::setDate()](#datetime.setdate) - Establece la fecha

- [DateTime::setISODate()](#datetime.setisodate) - Establece la fecha ISO

- [DateTime::setTime()](#datetime.settime) - Establece la hora

- [DateTime::setTimestamp()](#datetime.settimestamp) - Establece la fecha y la hora basándose en una marca temporal de Unix

# DateTime::\_\_set_state

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::**set_state — El gestor **set_state

### Descripción

public static **DateTime::\_\_set_state**([array](#language.types.array) $array): [DateTime](#class.datetime)

El gestor [\_\_set_state()](#object.set-state).

Igual que [DateTimeImmutable::\_\_set_state()](#datetimeimmutable.set-state) pero funciona con
[DateTime](#class.datetime).

### Parámetros

    array


      Array de inicialización.


### Valores devueltos

Devuelve una nueva instancia de un objeto DateTime.

# DateTime::setDate

# date_date_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::setDate -- date_date_set — Establece la fecha

### Descripción

Estilo orientado a objetos

public **DateTime::setDate**([int](#language.types.integer) $year, [int](#language.types.integer) $month, [int](#language.types.integer) $day): [DateTime](#class.datetime)

Estilo procedimental

[date_date_set](#function.date-date-set)(
    [DateTime](#class.datetime) $object,
    [int](#language.types.integer) $year,
    [int](#language.types.integer) $month,
    [int](#language.types.integer) $day
): [DateTime](#class.datetime)

Reinicia la fecha actual del objeto DateTime a una fecha diferente.

Igual que [DateTimeImmutable::setDate()](#datetimeimmutable.setdate) pero funciona con
[DateTime](#class.datetime), y cambia el objeto existente.

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    year


      Año de la fecha.






    month


      Mes de la fecha.






    day


      Día de la fecha.


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Ver también

- [DateTimeImmutable::setDate()](#datetimeimmutable.setdate) - Establece la fecha

# DateTime::setISODate

# date_isodate_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::setISODate -- date_isodate_set — Establece la fecha ISO

### Descripción

Estilo orientado a objetos

public **DateTime::setISODate**([int](#language.types.integer) $year, [int](#language.types.integer) $week, [int](#language.types.integer) $dayOfWeek = 1): [DateTime](#class.datetime)

Estilo procedimental

[date_isodate_set](#function.date-isodate-set)(
    [DateTime](#class.datetime) $object,
    [int](#language.types.integer) $year,
    [int](#language.types.integer) $week,
    [int](#language.types.integer) $dayOfWeek = 1
): [DateTime](#class.datetime)

Establece una fecha según el estándar ISO 8601, empleando índices de semanas y días
en vez de fechas específicas.

Igual que [DateTimeImmutable::setISODate()](#datetimeimmutable.setisodate) pero funciona con
[DateTime](#class.datetime).

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    year


      Año de la fecha.






    week


      Semana de la fecha.






    dayOfWeek


      Desplazamiento desde el primer día de la semana.


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Ver también

- [DateTimeImmutable::setISODate()](#datetimeimmutable.setisodate) - Establece la fecha ISO

# DateTime::setTime

# date_time_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::setTime -- date_time_set — Establece la hora

### Descripción

Estilo orientado a objetos

public **DateTime::setTime**(
    [int](#language.types.integer) $hour,
    [int](#language.types.integer) $minute,
    [int](#language.types.integer) $second = 0,
    [int](#language.types.integer) $microsecond = 0
): [DateTime](#class.datetime)

Estilo procedimental

[date_time_set](#function.date-time-set)(
    [DateTime](#class.datetime) $object,
    [int](#language.types.integer) $hour,
    [int](#language.types.integer) $minute,
    [int](#language.types.integer) $second = 0,
    [int](#language.types.integer) $microsecond = 0
): [DateTime](#class.datetime)

Reinicia la hora actual del objeto DateTime a una hora diferente.

Igual que [DateTimeImmutable::setTime()](#datetimeimmutable.settime) pero funciona con
[DateTime](#class.datetime).

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    hour


      Hora del instante.






    minute


      Minuto de la hora.






    second


      Segundo de la hora.






    microsecond


      Microsegundo de la hora.


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Historial de cambios

      Versión
      Descripción






      8.1.0
      El comportamiento con horas dobles existentes (durante la transición
      de DST de retroceso) cambió. Anteriormente, PHP elegiría la segunda ocurrencia
      (después de la transición de DST), en lugar de la primera ocurrencia (antes de
      la transición de DST).



      7.1.0
      Se ha añadido el parametro microsecond.


### Ver también

- [DateTimeImmutable::setTime()](#datetimeimmutable.settime) - Establece la hora

# DateTime::setTimestamp

# date_timestamp_set

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::setTimestamp -- date_timestamp_set — Establece la fecha y la hora basándose en una marca temporal de Unix

### Descripción

Estilo orientado a objetos

public **DateTime::setTimestamp**([int](#language.types.integer) $timestamp): [DateTime](#class.datetime)

Estilo procedimental

[date_timestamp_set](#function.date-timestamp-set)([DateTime](#class.datetime) $object, [int](#language.types.integer) $timestamp): [DateTime](#class.datetime)

Establece la fecha y la hora basándose en una marca temporal de Unix (Unix timestamp).

Igual que [DateTimeImmutable::setTimestamp()](#datetimeimmutable.settimestamp) pero funciona con
[DateTime](#class.datetime).

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    timestamp


      La marca temporal de Unix que representa la fecha.
      Establecer marcas de tiempo fuera del rango de [int](#language.types.integer) es posible usando
      [DateTimeImmutable::modify()](#datetimeimmutable.modify) con el formato @.


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Ver también

- [DateTimeImmutable::setTimestamp()](#datetimeimmutable.settimestamp) - Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)

# DateTime::setTimezone

# date_timezone_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTime::setTimezone -- date_timezone_set — Establece la zona horaria para el objeto DateTime

### Descripción

Estilo orientado a objetos

public **DateTime::setTimezone**([DateTimeZone](#class.datetimezone) $timezone): [DateTime](#class.datetime)

Estilo procedimental

[date_timezone_set](#function.date-timezone-set)([DateTime](#class.datetime) $object, [DateTimeZone](#class.datetimezone) $timezone): [DateTime](#class.datetime)

Establece una nueva zona horaria para un [object](#language.types.object) de [DateTime](#class.datetime).

Igual que [DateTimeImmutable::setTimezone()](#datetimeimmutable.settimezone) pero funciona con
[DateTime](#class.datetime).

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    timezone


      Un objeto [DateTimeZone](#class.datetimezone) que representa la
      zona horaria deseada.


### Valores devueltos

Devuelve el objeto [DateTime](#class.datetime) para encadenar métodos. El
punto en el tiempo subyacente no cambia al llamar a este método.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTime::setTimeZone()**

Estilo orientado a objetos

&lt;?php
$date = new DateTime('2000-01-01', new DateTimeZone('Pacific/Nauru'));
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

$date-&gt;setTimezone(new DateTimeZone('Pacific/Chatham'));
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

El ejemplo anterior mostrará:

2000-01-01 00:00:00+12:00
2000-01-01 01:45:00+13:45

Estilo procedimental

&lt;?php
$date = date_create('2000-01-01', timezone_open('Pacific/Nauru'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";

date_timezone_set($date, timezone_open('Pacific/Chatham'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";

El ejemplo anterior mostrará:

2000-01-01 00:00:00+12:00
2000-01-01 01:45:00+13:45

### Ver también

- [DateTimeImmutable::setTimezone()](#datetimeimmutable.settimezone) - Establece la zona horaria

- [DateTime::getTimezone()](#datetime.gettimezone) - Devuelve la zona horaria relativa al DateTime proporcionado

- [DateTimeZone::\_\_construct()](#datetimezone.construct) - Crea un nuevo objeto DateTimeZone

# DateTime::sub

# date_sub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::sub -- date_sub —
Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto
DateTime

### Descripción

Estilo orientado a objetos

public **DateTime::sub**([DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

Estilo procedimental

[date_sub](#function.date-sub)([DateTime](#class.datetime) $object, [DateInterval](#class.dateinterval) $interval): [DateTime](#class.datetime)

Modifica el objeto DateTime especificado, sustrayendo el objeto
[DateInterval](#class.dateinterval) especificado.

Igual que [DateTimeImmutable::sub()](#datetimeimmutable.sub) pero funciona con
[DateTime](#class.datetime).

La versión procedural toma el objeto [DateTime](#class.datetime) como
su primer argumento.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

     interval



      Un objeto [DateInterval](#class.dateinterval)


### Valores devueltos

Retorna el objeto modificado [DateTime](#class.datetime) para encadenar métodos.

### Errores/Excepciones

    Solo en la API Orientada a Objetos: Si se intenta realizar una operación no soportada, como usar un objeto
    [DateInterval](#class.dateinterval) que represente especificaciones de tiempo
    relativas como próximo día de la semana, se lanzará una
    [DateInvalidOperationException](#class.dateinvalidoperationexception).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza una [DateInvalidOperationException](#class.dateinvalidoperationexception) con
       **DateTime::sub()**, en lugar de
       una advertencia cuando se intenta realizar una operación no soportada.
       La función [date_sub()](#function.date-sub) no ha cambiado.



### Ver también

- [DateTimeImmutable::sub()](#datetimeimmutable.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos

## Tabla de contenidos

- [DateTime::add](#datetime.add) — Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos
- [DateTime::\_\_construct](#datetime.construct) — Devuelve un nuevo objeto DateTime
- [DateTime::createFromFormat](#datetime.createfromformat) — Analiza una cadena con un instante según un formato especificado
- [DateTime::createFromImmutable](#datetime.createfromimmutable) — Devuelve una nueva instancia de DateTime encapsulando el objeto DateTimeImmutable dado
- [DateTime::createFromInterface](#datetime.createfrominterface) — RDevuelve un nuevo objeto DateTime que encapsula el objeto DateTimeInterface dado
- [DateTime::getLastErrors](#datetime.getlasterrors) — Alias de DateTimeImmutable::getLastErrors
- [DateTime::modify](#datetime.modify) — Altera la marca temporal
- [DateTime::\_\_set_state](#datetime.set-state) — El gestor \_\_set_state
- [DateTime::setDate](#datetime.setdate) — Establece la fecha
- [DateTime::setISODate](#datetime.setisodate) — Establece la fecha ISO
- [DateTime::setTime](#datetime.settime) — Establece la hora
- [DateTime::setTimestamp](#datetime.settimestamp) — Establece la fecha y la hora basándose en una marca temporal de Unix
- [DateTime::setTimezone](#datetime.settimezone) — Establece la zona horaria para el objeto DateTime
- [DateTime::sub](#datetime.sub) — Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto
  DateTime

# La clase DateTimeImmutable

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

## Introducción

    Representación de fecha y hora.




    Esta clase se comporta igual que [DateTime](#class.datetime)
    con la excepción de que devuelve nuevos objetos cuando se llaman a
    métodos de modificación como [DateTime::modify()](#datetime.modify).

## Sinopsis de la Clase

     class **DateTimeImmutable**



     implements
      [DateTimeInterface](#class.datetimeinterface) {

    /* Constantaes heredadas constants */

     public
     const
     [string](#language.types.string)
      [DateTimeInterface::ATOM](#datetimeinterface.constants.atom) = "Y-m-d\\TH:i:sP";

public
const
[string](#language.types.string)
[DateTimeInterface::COOKIE](#datetimeinterface.constants.cookie) = "l, d-M-Y H:i:s T";
public
const
[string](#language.types.string)
[DateTimeInterface::ISO8601](#datetimeinterface.constants.iso8601) = "Y-m-d\\TH:i:sO";
public
const
[string](#language.types.string)
[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded) = "X-m-d\\TH:i:sP";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC822](#datetimeinterface.constants.rfc822) = "D, d M y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC850](#datetimeinterface.constants.rfc850) = "l, d-M-y H:i:s T";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC1036](#datetimeinterface.constants.rfc1036) = "D, d M y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC1123](#datetimeinterface.constants.rfc1123) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC7231](#datetimeinterface.constants.rfc7231) = "D, d M Y H:i:s \\G\\M\\T";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC2822](#datetimeinterface.constants.rfc2822) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC3339](#datetimeinterface.constants.rfc3339) = "Y-m-d\\TH:i:sP";
public
const
[string](#language.types.string)
[DateTimeInterface::RFC3339_EXTENDED](#datetimeinterface.constants.rfc3339-extended) = "Y-m-d\\TH:i:s.vP";
public
const
[string](#language.types.string)
[DateTimeInterface::RSS](#datetimeinterface.constants.rss) = "D, d M Y H:i:s O";
public
const
[string](#language.types.string)
[DateTimeInterface::W3C](#datetimeinterface.constants.w3c) = "Y-m-d\\TH:i:sP";

    /* Métodos */

public [\_\_construct](#datetimeimmutable.construct)([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**)

    #[\NoDiscard]

public [add](#datetimeimmutable.add)([DateInterval](#class.dateinterval) $interval): [DateTimeImmutable](#class.datetimeimmutable)
public static [createFromFormat](#datetimeimmutable.createfromformat)([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTimeImmutable](#class.datetimeimmutable)|[false](#language.types.singleton)
public static [createFromInterface](#datetimeimmutable.createfrominterface)([DateTimeInterface](#class.datetimeinterface) $object): [DateTimeImmutable](#class.datetimeimmutable)
public static [createFromMutable](#datetimeimmutable.createfrommutable)([DateTime](#class.datetime) $object): static
public static [getLastErrors](#datetimeimmutable.getlasterrors)(): [array](#language.types.array)|[false](#language.types.singleton) #[\NoDiscard]
public [modify](#datetimeimmutable.modify)([string](#language.types.string) $modifier): [DateTimeImmutable](#class.datetimeimmutable)
public static [\_\_set_state](#datetimeimmutable.set-state)([array](#language.types.array) $array): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [setDate](#datetimeimmutable.setdate)([int](#language.types.integer) $year, [int](#language.types.integer) $month, [int](#language.types.integer) $day): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [setISODate](#datetimeimmutable.setisodate)([int](#language.types.integer) $year, [int](#language.types.integer) $week, [int](#language.types.integer) $dayOfWeek = 1): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [setTime](#datetimeimmutable.settime)(
    [int](#language.types.integer) $hour,
    [int](#language.types.integer) $minute,
    [int](#language.types.integer) $second = 0,
    [int](#language.types.integer) $microsecond = 0
): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [setTimestamp](#datetimeimmutable.settimestamp)([int](#language.types.integer) $timestamp): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [setTimezone](#datetimeimmutable.settimezone)([DateTimeZone](#class.datetimezone) $timezone): [DateTimeImmutable](#class.datetimeimmutable) #[\NoDiscard]
public [sub](#datetimeimmutable.sub)([DateInterval](#class.dateinterval) $interval): [DateTimeImmutable](#class.datetimeimmutable)

    public [diff](#datetime.diff)([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

public [format](#datetime.format)([string](#language.types.string) $format): [string](#language.types.string)
public [getOffset](#datetime.getoffset)(): [int](#language.types.integer)
public [getTimestamp](#datetime.gettimestamp)(): [int](#language.types.integer)
public [getTimezone](#datetime.gettimezone)(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)
public [\_\_serialize](#datetime.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#datetime.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)
[#[\Deprecated]](class.deprecated.html)
public [\_\_wakeup](#datetime.wakeup)(): [void](language.types.void.html)

}

## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       7.1.0

        El constructor de **DateTimeImmutable** ahora incluye los
        microsegundos actuales en el valor construido. Antes de esto, siempre
        inicializaría los microsegundos a 0.





# DateTimeImmutable::add

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::add —
Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::add**([DateInterval](#class.dateinterval) $interval): [DateTimeImmutable](#class.datetimeimmutable)

Crea un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable), y añade el
objeto [DateInterval](#class.dateinterval) especificado para representar el nuevo valor.

### Parámetros

     interval



      Un objeto [DateInterval](#class.dateinterval)


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::add()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2000-01-01');
$newDate = $date-&gt;add(new DateInterval('P10D'));
echo $newDate-&gt;format('Y-m-d') . "\n";
?&gt;

**Ejemplo #2 Más ejemplos de DateTimeImmutable::add()**

&lt;?php
$date = new DateTimeImmutable('2000-01-01');
$newDate = $date-&gt;add(new DateInterval('PT10H30S'));
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$date = new DateTimeImmutable('2000-01-01');
$newDate = $date-&gt;add(new DateInterval('P7Y5M4DT4H3M2S'));
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";
?&gt;

El ejemplo anterior mostrará:

2000-01-01 10:00:30
2007-06-05 04:03:02

**Ejemplo #3 Tenga cuidado al agregar meses**

&lt;?php
$date = new DateTimeImmutable('2000-12-31');
$interval = new DateInterval('P1M');

$newDate1 = $date-&gt;add($interval);
echo $newDate1-&gt;format('Y-m-d') . "\n";

$newDate2 = $newDate1-&gt;add($interval);
echo $newDate2-&gt;format('Y-m-d') . "\n";
?&gt;

El ejemplo anterior mostrará:

2001-01-31
2001-03-03

### Ver también

- [DateTimeImmutable::sub()](#datetimeimmutable.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos

- [DateTimeImmutable::diff()](#datetime.diff) - Devuelve la diferencia entre dos objetos DateTime

- [DateTimeImmutable::modify()](#datetimeimmutable.modify) - Crea un nuevo objeto con la marca de tiempo modificada

# DateTimeImmutable::\_\_construct

# date_create_immutable

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::\_\_construct -- date_create_immutable — Devuelve un nuevo objeto DateTimeImmutable

### Descripción

Estilo orientado a objetos

public **DateTimeImmutable::\_\_construct**([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**)

Estilo procedimental

[date_create_immutable](#function.date-create-immutable)([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTimeImmutable](#class.datetimeimmutable)|[false](#language.types.singleton)

Devuelve un nuevo objeto DateTimeImmutable.

### Parámetros

    datetime

     Una cadena de fecha/hora. Los formatos válidos son explicados en la documentación sobre los

[formatos de Fecha y Hora](#datetime.formats).

      Introduzca "now" aquí para obtener el instante actual cuando se emplee
      el parámetro $timezone.






    timezone


      Un objeto [DateTimeZone](#class.datetimezone) que representa la
      zona horaria de $datetime.




      Si se omite $timezone o
      es **[null](#constant.null)**, se usará la zona horaria actual.



     **Nota**:



       El parámetro $timezone
       y la zona horaria actuales se ignoran cuando el
       parámetro $time
       es una marca temporal de UNIX (p.ej. @946684800)
       o especifica una zona horaria
       (p.ej. 2010-01-28T15:00:00+02:00, o
       2010-07-05T06:00:00Z).





### Valores devueltos

Devuelve una nueva instancia de DateTimeImmutable.

### Errores/Excepciones

    Si se pasa una cadena de fecha/hora incorrecta,
    lanza [DateMalformedStringException](#class.datemalformedstringexception).
    Hasta PHP 8.3, lanzaba [Exception](#class.exception).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Ahora lanza
        [DateMalformedStringException](#class.datemalformedstringexception) si
        se pasa una cadena incorrecta, en vez de
        [Exception](#class.exception).




       7.1.0
       Desde ahora los microsegundos se rellenan con el valor actual. No con '00000'.




### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::\_\_construct()**

Estilo orientado a objetos

&lt;?php
try {
$date = new DateTimeImmutable('2000-01-01');
} catch (Exception $e) {
echo $e-&gt;getMessage();
exit(1);
}

echo $date-&gt;format('Y-m-d');

El ejemplo anterior mostrará:

2000-01-01

Estilo procedimental

&lt;?php
$date = date_create('2000-01-01');
if (!$date) {
$e = date_get_last_errors();
    foreach ($e['errors'] as $error) {
        echo "$error\n";
}
exit(1);
}

echo date_format($date, 'Y-m-d');

El ejemplo anterior mostrará:

2000-01-01

**Ejemplo #2 Complejidades de DateTimeImmutable::\_\_construct()**

&lt;?php
date_default_timezone_set('America/Jamaica');

// Especificando una fecha/hora en la zona horaria por omisión
$date = new DateTimeImmutable('2000-01-01');
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

// Especificando una fecha/hora en una zona horaria específica.
$date = new DateTimeImmutable('2000-01-01', new DateTimeZone('Pacific/Nauru'));
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

// Fecha/hora actual en la zona horaria por omisión de PHP.
$date = new DateTimeImmutable();
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

// Fecha/hora actual en la zona horaria especificada.
$date = new DateTimeImmutable('now', new DateTimeZone('Pacific/Nauru'));
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

// Usando una marca temporal de UNIX (UNIX timestamp). Observe que el resultado está en la zona horaria UTC.
$date = new DateTimeImmutable('@946684800');
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

// Completado de los valores inexistentes.
$date = new DateTimeImmutable('2000-02-30');
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

Resultado del ejemplo anterior es similar a:

2000-01-01 00:00:00-05:00
2000-01-01 00:00:00+12:00
2010-04-24 10:24:16-04:00
2010-04-25 02:24:16+12:00
2000-01-01 00:00:00+00:00
2000-03-01 00:00:00-05:00

**Nota**:

     Las fechas desbordadas se pueden detectar comprobando las advertencias mediante
     [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors).

**Ejemplo #3 Cambiando la zona horaria asociada**

&lt;?php
$timeZone = new \DateTimeZone('Asia/Tokyo');

$time = new \DateTimeImmutable();
$time = $time-&gt;setTimezone($timeZone);

echo $time-&gt;format('Y/m/d H:i:s e'), "\n";

Resultado del ejemplo anterior es similar a:

2022/08/12 23:49:23 Asia/Tokyo

**Ejemplo #4 Usando una fecha/hora relativas**

&lt;?php
$time = new \DateTimeImmutable("-1 year");

echo $time-&gt;format('Y/m/d H:i:s'), "\n";

Resultado del ejemplo anterior es similar a:

2021/08/12 15:43:51

# DateTimeImmutable::createFromFormat

# date_create_immutable_from_format

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::createFromFormat -- date_create_immutable_from_format — Analiza un string de tiempo según el formato especificado

### Descripción

Estilo orientado a objetos

public static **DateTimeImmutable::createFromFormat**([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTimeImmutable](#class.datetimeimmutable)|[false](#language.types.singleton)

Estilo procedimental

[date_create_immutable_from_format](#function.date-create-immutable-from-format)([string](#language.types.string) $format, [string](#language.types.string) $datetime, [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTimeImmutable](#class.datetimeimmutable)|[false](#language.types.singleton)

Devuelve un nuevo objeto DateTimeImmutable representando la fecha y hora especificada por
el string datetime, que tiene el formato indicado por
format.

### Parámetros

    format


      El formato en el cual se ha pasado el [string](#language.types.string). Consulta las
      opciones de formato a continuación. En la mayoría de los casos, pueden ser
      usadas las mismas letras que para la función [date()](#function.date).




      Todos los campos son inicializados con la fecha y hora actual. En el caso
      de que quieras restablecerlos a "cero" (Unix epoch, 01/01/1970
      00:00:00 UTC). Puedes hacerlo incluyendo el carácter
      ! al principio de format,
      o | al final. Por favor, consulta la documentación
      de cada carácter a continuación para más información.




      El formato es analizado de izquierda a derecha, lo que significa que en
      algunas situaciones el orden en el que los caracteres de formato están
      escritos afecta al resultado. En el caso de z (el
      día del año), es necesario que un año ya se haya analizado, por
      ejemplo mediante los caracteres Y o
      y.




      Las letras de formato que se usan para analizar números permiten un
      amplio rango de valores, fuera de lo que sería el rango lógico. Por
      ejemplo, el d (día del mes) acepta valores en el
      rango de 00 a 99. La única
      restricción es en la cantidad de dígitos. El mecanismo de desbordamiento
      del analizador de fecha/hora se usa cuando se dan valores fuera de rango.
      Los ejemplos a continuación muestran algo de este comportamiento.




      Esto también significa que los datos analizados para una letra de formato
      son golosos, y leerán toda la cantidad de dígitos que su formato
      permite. Esto también puede significar que no hay suficientes
      caracteres en datetime para las letras de
      formato sucesivas. Un ejemplo en esta página también ilustra este
      problema.







       <caption>**Los siguientes caracteres son reconocidos en la cadena
       del parámetro format**</caption>



          Carácter format
          Descripción
          Ejemplo de valores analizables






          *Día*
          ---
          ---



          d y j
          Día del mes, 2 dígitos con o sin ceros iniciales

           01 a 31 o
           1 a 31. (Se aceptan 2 dígitos
           numericos mayores que los días del mes, en cuyo caso harán
           que el mes se desborde. Por ejemplo usando 33 con enero,
           significará 2 de febrero)




          D y l
          Nombre del día de la semana como texto, en inglés

           Mon hasta Sun o
           Sunday hasta Saturday. Si
           el nombre del día indicado es diferente al nombre del día que
           pertenece la fecha analizada (o predeterminada) es diferente,
           entonces se produce un desbordamiento a la *siguiente*
           fecha con el nombre de indicado. Vea los ejemplos a continuación
           para obtener una explicación.




          S
          Sufijo ordinal en inglés para el día del mes, 2
           caracteres. Se ignora durante el procesamiento.


           st, nd, rd o
           th.




          z

           Día del año (comenzando en 0);
           debe estar precedido por Y o y.


           0 hasta 365. (son aceptados
           3 dígitos numéricos mayores que 365, en cuyo caso harán que
           el año se desborde. Por ejemplo usando 366 con 2022, significa
           2 de enero de 2023)




          *Mes*
          ---
          ---



          F y M
          Nombre del mes, en inglés, como January o Sept

           January hasta December o
           Jan hasta Dec




          m y n
          Representación numerica del mes, 2 dígitos con o sin ceros iniciales

           01 hasta 12 o
           1 hasta 12.
           (son aceptados 2 dígitos numéricos mayores que 12, en cuyo caso
           harán que el año se desborde. Por ejemplo usando 13 significa
           enero del siguiente año)




          *Año*
          ---
          ---



          X y x
          Una representación completa del año, *hasta* 19 dígitos,
           opcionalmente con el prefijo + o
           -

          Ejemplos: 0055, 787,
           1999, -2003,
           +10191



          Y
          Una representación completa del año, *hasta* 4 dígitos
          Ejemplos: 25 (igual que 0025),
           787, 1999, 2003



          y

           Una representación de dos dígitos de un año (que se asume que está
           en el rango 1970-2069, inclusive)


           Ejemplos:
           99 o 03
           (que se interpretarán como 1999 y
           2003, respectivamente)




          *Hora*
          ---
          ---



          a y A
          Ante meridiem y post meridiem
          am or pm



          g y h
          Hora en formato 12 horas, 2 dígitos con o sin ceros iniciales

           1 hasta 12 o
           01 hasta 12 (son aceptados
           2 dígitos numéricos mayores que 12, en cuyo caso harán que
           el día se desborde. Por ejemplo usando 14 significa
           02 en el siguiente periodo AM/PM)




          G y H
          Hora en formato 24 horas, 2 dígitos con o sin ceros iniciales

           0 hasta 23 o
           00 hasta 23 (son aceptados
           2 dígitos numéricos mayores que 24, en cuyo caso harán que
           el día se desborde. Por ejemplo usando 26 significa
           02:00 en el siguiente día)




          i
          Minutos, con ceros iniciales

           00 a 59. (son aceptados
           2 dígitos numéricos mayores que 59, en cuyo caso harán que
           la hora se desborde. Por ejemplo usando 66 significa
           06 en la siguiente hora)




          s
          Segundos, con ceros iniciales

           00 hastah 59 (son aceptados
           2 dígitos numéricos mayores que 59, en cuyo caso harán que
           el minuto se desborde. Por ejemplo usando 90 significa
           30 en el siguiente minuto)




          v
          Fracción en milisengundos (hasta 3 digitos)
          Ejemplos: 12 (0.12
          segundos), 345 (0.345 segundos)



          u
          Fracción en microsengundos (hasta 6 dígitos)
          Ejemplos: 45 (0.45
          segundos), 654321 (0.654321
          segundos)



          *Zona horaria*
          ---
          ---




           e, O, p,
           P y T


           Identificador de zona horaria, o diferencia a UTC en horas, o
           diferencia a UTC con dos puntos entre horas y minutos, o abreviatura
           de zona horaria

          Ejemplos: UTC, GMT,
           Atlantic/Azores o
           +0200 o +02:00 o
           EST, MDT




          *Fecha y hora completa*
          ---
          ---



          U
          Segundos desde Unix Epoch (1 de enero de 1970 00:00:00 GMT)
          Ejemplo: 1292177455



          *Espacios en blanco y separadores*
          ---
          ---



            (espacio)

           Cero o más espacios, tabuladores, NBSP (U+A0) o NNBSP (U+202F)

          Ejemplos: "\t" o "  "



          #

           Uno de los siguientes símbolos de separación: ;,
           :, /, .,
           ,, -, ( o
           )

          Ejemplo: /




           ;,
           :, /, .,
           ,, -, ( o
           )

          El carácter especificado
          Ejemplo: -



          ?
          Un byte aleatorio
          Ejemplo: ^ (Tenga en cuenta que los
          caracteres UTF-8 es posible que necesite más de uno ?.
          En este caso, usar * es probablemente lo que
          desea en su lugar)



          *
          Bytes aleatorios hasta el siguiente separador o dígito
          Ejemplo: * en Y-*-d con
          la cadena  2009-aWord-08 coincidirá con
          aWord



          !

           Restablece todos los campos (año, mes, día, hora, minuto, segundo,
           fracción e información de zona horaria) a valores similares a cero
           (0 para hora, minuto, segundo y fracción,
           1 para mes y día, 1970 para
           año y UTC para información de zona horaria)

          Sin !, todos los campos se establecerán
          a la fecha y hora actual.



          |

           Restablece todos los campos (año, mes, día, hora, minuto, segundo,
           fracción e información de zona horaria) a valores similares a cero
           si no han sido analizados todavía.


           Y-m-d| establecerá el año, mes y día
           a la información encontrada en la cadena a analizar, y establecerá
           la hora, minuto y segundo a 0.




          +

           Si este especificador de formato está presente, los datos
           adicionales en la cadena no causarán un error, sino una advertencia
           en su lugar


           Usa [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors) para
           averiguar si había datos adicionales.









      Los caracteres no reconocidos en el string de formato causarán que el
      análisis falle y un mensaje de error se añadirá a la estructura
      devuelta. Puedes consultar los mensajes de error con
      [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors).




      Para incluir caracteres literales en format, debes
      escaparlos con una barra invertida (\).




      Si format no contiene el carácter
      !, entonces las partes de la fecha/hora que no están
      especificadas en format se establecerán a la fecha
      actual del sistema.




      Si format contiene el carácter !,
      entonces las partes de la fecha/hora generadas que no están especificadas
      en format, así como los valores a la izquierda del
      !, se establecerán a los valores correspondientes de
      Unix epoch.




      Si cualquier carácter de tiempo es analizado, entonces todos los demás
      campos relacionados con el tiempo se establecerán a "0", a menos que
      también se analicen.




      Unix epoch es 01/01/1970 00:00:00 UTC.






    datetime


      String representando la fecha y hora.






    timezone


      Una instancia de [DateTimeZone](#class.datetimezone) representando la
      zona horaria deseada.




      Si se omite timezone o pasado **[null](#constant.null)** y
      datetime no contiene zona horaria,
      se usará la zona horaria actual.



     **Nota**:



       El parámetro timezone y la zona horaria actual
       son ignorados cuando el parámetro datetime contiene
       un timestamp UNIX (por ejemplo, 946684800) o especifica
       una zona horaria (por ejemplo, 2010-01-28T15:00:00+02:00).





### Valores devueltos

Devuelve una nueva instancia de DateTimeImmutable o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método lanza [ValueError](#class.valueerror) cuando
datetime contiene bytes nulos.

### Historial de cambios

       Versión
       Descripción






       8.2.9

        El especificador   (espacio) ahora también
        soporta los caracteres NBSP (U+A0) y NNBSP (U+202F).




       8.2.0

        Se ha añadido los especificadores de format
        X y x.




       8.0.21, 8.1.8, 8.2.0

        Ahora se lanza [ValueError](#class.valueerror) cuando
        se pasan bytes nulos a datetime, lo que
        anteriormente se ignoraba silenciosamente.




       7.3.0

        Se ha añadido el especificador de format
        v.





### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::createFromFormat()**

Estilo orientado a objetos

&lt;?php
$date = DateTimeImmutable::createFromFormat('j-M-Y', '15-Feb-2009');
echo $date-&gt;format('Y-m-d');

**Ejemplo #2 Usando constantes predefinidas con DateTimeImmutable::createFromFormat()**

Estilo orientado a objetos

&lt;?php
$date = DateTimeImmutable::createFromFormat(
DateTimeInterface::ISO8601,
'2004-02-12T15:19:21+00:00'
);
echo $date-&gt;format('c e') . "\n";

$date = DateTimeImmutable::createFromFormat(
DateTimeInterface::RFC3339_EXTENDED,
'2013-10-14T09:00:00.000+02:00'
);
echo $date-&gt;format('c e') . "\n";

    Las [constantes de formato](#datetimeinterface.constants.types)
    usadas en este ejemplo consisten en una cadena de caracteres para
    [formatear](#datetime.format) un objeto
    [DateTimeImmutable](#class.datetimeimmutable). En la mayoría de los casos, estas
    letras coinciden con los mismos elementos de información de fecha/hora que
    los definidos en los [parámetros](#datetimeimmutable.createfromformat.parameters)
    de la sección anterior, pero tienden a ser más permisivos.

**Ejemplo #3 Complejidades de DateTimeImmutable::createFromFormat()**

&lt;?php
echo 'Hora actual: ' . date('Y-m-d H:i:s') . "\n";

$format = 'Y-m-d';
$date = DateTimeImmutable::createFromFormat($format, '2009-02-15');
echo "Formato: $format; " . $date-&gt;format('Y-m-d H:i:s') . "\n";

$format = 'Y-m-d H:i:s';
$date = DateTimeImmutable::createFromFormat($format, '2009-02-15 15:16:17');
echo "Formato: $format; " . $date-&gt;format('Y-m-d H:i:s') . "\n";

$format = 'Y-m-!d H:i:s';
$date = DateTimeImmutable::createFromFormat($format, '2009-02-15 15:16:17');
echo "Formato: $format; " . $date-&gt;format('Y-m-d H:i:s') . "\n";

$format = '!d';
$date = DateTimeImmutable::createFromFormat($format, '15');
echo "Formato: $format; " . $date-&gt;format('Y-m-d H:i:s') . "\n";

$format = 'i';
$date = DateTimeImmutable::createFromFormat($format, '15');
echo "Formato: $format; " . $date-&gt;format('Y-m-d H:i:s') . "\n";

Resultado del ejemplo anterior es similar a:

Hora actual: 2022-06-02 15:50:46
Formato: Y-m-d; 2009-02-15 15:50:46
Formato: Y-m-d H:i:s; 2009-02-15 15:16:17
Formato: Y-m-!d H:i:s; 1970-01-15 15:16:17
Formato: !d; 1970-01-15 00:00:00
Formato: i; 2022-06-02 00:15:00

**Ejemplo #4 Cadenas de formato con caracteres literales**

&lt;?php
echo DateTimeImmutable::createFromFormat('H\h i\m s\s','23h 15m 03s')-&gt;format('H:i:s');

Resultado del ejemplo anterior es similar a:

23:15:03

**Ejemplo #5 Comportamiento de desbordamiento**

&lt;?php
echo DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2021-17-35 16:60:97')-&gt;format(DateTimeImmutable::RFC2822);

Resultado del ejemplo anterior es similar a:

Sat, 04 Jun 2022 17:01:37 +0000

    Aunque el resultado parece extraño, es correcto, ya que ocurren
    los siguientes desbordamientos:




    -

      97 segundos se desbordan a 1 minuto,
      dejando 37 segundos.



    -

      61 minutos se desbordan a 1 hora,
      dejando 1 minuto.



    -

      35 días se debordan a 1 mes,
      dejando 4 días. La cantidad de días que quedan
      depende del mes, ya que no todos los meses tienen la misma cantidad
      de días.



    -

      18 meses se desbordan a 1 año,
      dejando 6 meses.


**Ejemplo #6 Comportamiento de desbordamiento de nombres de días de la semana**

&lt;?php
$d = DateTime::createFromFormat(DateTimeInterface::RFC1123, 'Mon, 3 Aug 2020 25:00:00 +0000');
echo $d-&gt;format(DateTime::RFC1123), "\n";

Resultado del ejemplo anterior es similar a:

Mon, 10 Aug 2020 01:00:00 +0000

    Aunque el resultado parece extraño, es correcto, ya que ocurren
    los siguientes desbordamientos:




    -

      3 Aug 2020 25:00:00 se desborda a (Tue) 4 Aug
      2020 01:00.



    -

      Se aplica Mon, el cual avanza la fecha a
      Mon, 10 Aug 2020 01:00:00. La explicación de
      palabras clave relativas como Mon se explica en la
      sección de [formatos relativos](#datetime.formats.relative).


Para detectar desbordamientos en fechas, puedes usar
[DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors), el cual
incluirá una advertencia si ocurrió un desbordamiento.

**Ejemplo #7 Detección de fechas desbordadas**

&lt;?php
$d = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2021-17-35 16:60:97');
echo $d-&gt;format(DateTimeImmutable::RFC2822), "\n\n";

var_dump(DateTimeImmutable::getLastErrors());

Resultado del ejemplo anterior es similar a:

Sat, 04 Jun 2022 17:01:37 +0000

array(4) {
'warning_count' =&gt;
int(2)
'warnings' =&gt;
array(1) {
[19] =&gt;
string(27) "The parsed date was invalid"
}
'error_count' =&gt;
int(0)
'errors' =&gt;
array(0) {
}
}

**Ejemplo #8 Comportamiento de análisis goloso**

&lt;?php
print_r(date_parse_from_format('Gis', '60101'));

Resultado del ejemplo anterior es similar a:

Array
(
[year] =&gt;
[month] =&gt;
[day] =&gt;
[hour] =&gt; 60
[minute] =&gt; 10
[second] =&gt; 0
[fraction] =&gt; 0
[warning_count] =&gt; 1
[warnings] =&gt; Array
(
[5] =&gt; The parsed time was invalid
)

    [error_count] =&gt; 1
    [errors] =&gt; Array
        (
            [4] =&gt; A two digit second could not be found
        )

    [is_localtime] =&gt;

)

    El formato G es para analizar horas en formato de 24
    horas, con o sin cero inicial. Esto requiere analizar 1 o 2 dígitos. Debido
    a que hay dos dígitos siguientes, lo lee ávidamente como 60.




    Los siguientes caracteres de formato i y s
    requieren ambos dos dígitos. Esto significa que se pasa 10
    como minutos (i), y que luego no quedan suficientes
    dígitos para analizar como segundos (s).




    El array errors indica este problema.




    Adicionalmente, una hora de 60 está fuera del rango
    0-24, lo que hace que el array
    warnings incluya una advertencia de que la hora es
    incorrecta.

### Ver también

- [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) - Devuelve un nuevo objeto DateTimeImmutable

- [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors) - Devuelve las advertencias y errores

- [checkdate()](#function.checkdate) - Valida una fecha gregoriana

- [strptime()](#function.strptime) - Analiza una fecha/hora generada con strftime

# DateTimeImmutable::createFromInterface

(PHP 8)

DateTimeImmutable::createFromInterface — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTimeInterface dado

### Descripción

public static **DateTimeImmutable::createFromInterface**([DateTimeInterface](#class.datetimeinterface) $object): [DateTimeImmutable](#class.datetimeimmutable)

### Parámetros

     object


       El objeto [DateTimeInterface](#class.datetimeinterface) que necesita
       ser convertido en una versión immutable. Este objeto no se modifica, sino que
       en su lugar se crea un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable)
       que contiene la misma información de fecha, hora y zona horaria.





### Valores devueltos

Devuelve una nueva instancia de [DateTimeImmutable](#class.datetimeimmutable).

### Ejemplos

    **Ejemplo #1 Creando un objeto fecha y hora inmutable**

&lt;?php
$date = new DateTime("2014-06-20 11:45 Europe/London");
$immutable = DateTimeImmutable::createFromInterface($date);

$date = new DateTimeImmutable("2014-06-20 11:45 Europe/London");
$also_immutable = DateTimeImmutable::createFromInterface($date);

# DateTimeImmutable::createFromMutable

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

DateTimeImmutable::createFromMutable — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTime dado

### Descripción

public static **DateTimeImmutable::createFromMutable**([DateTime](#class.datetime) $object): static

### Parámetros

     object


       El objeto [DateTime](#class.datetime) mutable para convertirlo
       en una versión immutable. Este objeto no se modifica, sino que
       en su lugar se crea un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable)
       que contiene la misma información de fecha, hora y zona horaria.





### Valores devueltos

Devuelve una nueva instancia de [DateTimeImmutable](#class.datetimeimmutable).

### Historial de cambios

       Versión
       Descripción






       8.0.0

        El método ahora devuelve una instancia de la clase actualmente invocada. Anteriormente,
        creaba una nueva instancia de [DateTimeImmutable](#class.datetimeimmutable).





### Ejemplos

    **Ejemplo #1 Creando un objeto de fecha y hora inmutable**

&lt;?php
$date = new DateTime("2014-06-20 11:45 Europe/London");
$immutable = DateTimeImmutable::createFromMutable( $date );

# DateTimeImmutable::getLastErrors

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::getLastErrors — Devuelve las advertencias y errores

### Descripción

public static **DateTimeImmutable::getLastErrors**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array de advertencias y errores encontrados mientras se analizaba
una cadena de fecha/hora.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene información sobre advertencias y errores, o **[false](#constant.false)** si no
hay ni advertencias ni errores.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Antes de PHP 8.2.0, esta función no devolvía **[false](#constant.false)**
        cuando no había advertencias ni errores. En su lugar, siempre
        devolvía la estructura de array documentada.





### Ejemplos

**Ejemplo #1 DateTimeImmutable::getLastErrors()** example

&lt;?php
try {
$date = new DateTimeImmutable('asdfasdf');
} catch (Exception $e) {
// Solo para fines de demostración...
print_r(DateTimeImmutable::getLastErrors());

    // La forma correcta de hacer esto con programación orientada a objetos es
    echo $e-&gt;getMessage();

}
?&gt;

El ejemplo anterior mostrará:

Array
(
[warning_count] =&gt; 1
[warnings] =&gt; Array
(
[6] =&gt; Double timezone specification
)

    [error_count] =&gt; 1
    [errors] =&gt; Array
        (
            [0] =&gt; The timezone could not be found in the database
        )

)
Failed to parse time string (asdfasdf) at position 0 (a): The timezone could not be found in the database

    Los índices 6, y 0 en la salida de ejemplo se refieren al índice de caracteres en la cadena donde ocurrió el error.

**Ejemplo #2 Detectando fechas desbordadas**

&lt;?php
$date = DateTimeImmutable::createFromFormat('!Y-m-d', '2020-02-30');
print_r(DateTimeImmutable::getLastErrors());

El ejemplo anterior mostrará:

Array
(
[warning_count] =&gt; 1
[warnings] =&gt; Array
(
[10] =&gt; The parsed date was invalid
)

    [error_count] =&gt; 0
    [errors] =&gt; Array
        (
        )

)

# DateTimeImmutable::modify

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::modify — Crea un nuevo objeto con la marca de tiempo modificada

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::modify**([string](#language.types.string) $modifier): [DateTimeImmutable](#class.datetimeimmutable)

Crea un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable) con la marca de tiempo modificada.
El objeto original no se modifica.

### Parámetros

    modifier

     Una cadena de fecha/hora. Los formatos válidos son explicados en la documentación sobre los

[formatos de Fecha y Hora](#datetime.formats).

### Valores devueltos

Devuelve [DateTimeImmutable](#class.datetimeimmutable) en caso de éxito.
Estilo procedimental retorna **[false](#constant.false)** en caso de error.

### Errores/Excepciones

    Si se pasa una cadena de Fecha/Hora no válida,
    se lanza [DateMalformedStringException](#class.datemalformedstringexception).
    Antes de PHP 8.3, esto emitía una advertencia.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       **DateTimeImmutable::modify()** ahora lanzará
       [DateMalformedStringException](#class.datemalformedstringexception) si es pasada
       una cadena no válida. Anteriormente, devolvía false,
       y se emitía una advertencia.



### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::modify()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2006-12-12');
$newDate = $date-&gt;modify('+1 day');
echo $newDate-&gt;format('Y-m-d');

El ejemplo anterior mostrará:

2006-12-13

**Ejemplo #2 Tenga cuidado al añadir o restar meses**

&lt;?php
$date = new DateTimeImmutable('2000-12-31');

$newDate1 = $date-&gt;modify('+1 month');
echo $newDate1-&gt;format('Y-m-d') . "\n";

$newDate2 = $newDate1-&gt;modify('+1 month');
echo $newDate2-&gt;format('Y-m-d') . "\n";

El ejemplo anterior mostrará:

2001-01-31
2001-03-03

### Ver también

- [DateTimeImmutable::add()](#datetimeimmutable.add) - Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos

- [DateTimeImmutable::sub()](#datetimeimmutable.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos

- [DateTimeImmutable::setDate()](#datetimeimmutable.setdate) - Establece la fecha

- [DateTimeImmutable::setISODate()](#datetimeimmutable.setisodate) - Establece la fecha ISO

- [DateTimeImmutable::setTime()](#datetimeimmutable.settime) - Establece la hora

- [DateTimeImmutable::setTimestamp()](#datetimeimmutable.settimestamp) - Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)

# DateTimeImmutable::\_\_set_state

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::**set_state — El gestor **set_state

### Descripción

public static **DateTimeImmutable::\_\_set_state**([array](#language.types.array) $array): [DateTimeImmutable](#class.datetimeimmutable)

El gestor [\_\_set_state()](#object.set-state).

### Parámetros

    array


      Array de inicialización.


### Valores devueltos

Devuelve una nueva instancia de un objeto DateTimeImmutable.

# DateTimeImmutable::setDate

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::setDate — Establece la fecha

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::setDate**([int](#language.types.integer) $year, [int](#language.types.integer) $month, [int](#language.types.integer) $day): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto DateTimeImmutable con la fecha actual del
objeto DateTimeImmutable establecida a la fecha dada.

### Parámetros

object
Solo en estilo procedimental: Un objeto [DateTime](#class.datetime)
retornado por la función [date_create()](#function.date-create).
Esta función modifica este objeto.

    year


      Año de la fecha.






    month


      Mes de la fecha.






    day


      Día de la fecha.


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::setDate()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable();
$newDate = $date-&gt;setDate(2001, 2, 3);
echo $newDate-&gt;format('Y-m-d');

El ejemplo anterior mostrará:

2001-02-03

**Ejemplo #2 Valores que exceden los rangos se añaden a sus valores padres**

&lt;?php
$date = new DateTimeImmutable();

$newDate = $date-&gt;setDate(2001, 2, 28);
echo $newDate-&gt;format('Y-m-d') . "\n";

$newDate = $date-&gt;setDate(2001, 2, 29);
echo $newDate-&gt;format('Y-m-d') . "\n";

$newDate = $date-&gt;setDate(2001, 14, 3);
echo $newDate-&gt;format('Y-m-d') . "\n";

El ejemplo anterior mostrará:

2001-02-28
2001-03-01
2002-02-03

### Ver también

- [DateTimeImmutable::setISODate()](#datetimeimmutable.setisodate) - Establece la fecha ISO

- [DateTimeImmutable::setTime()](#datetimeimmutable.settime) - Establece la hora

# DateTimeImmutable::setISODate

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::setISODate — Establece la fecha ISO

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::setISODate**([int](#language.types.integer) $year, [int](#language.types.integer) $week, [int](#language.types.integer) $dayOfWeek = 1): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable) con la fecha establecida de acuerdo al
estándar ISO 8601 - usando semanas y desplazamientos de días en lugar de fechas específicas.

### Parámetros

    year


      Año de la fecha.






    week


      Semana de la fecha.






    dayOfWeek


      Desplazamiento desde el primer día de la semana.


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::setISODate()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable();

$newDate = $date-&gt;setISODate(2008, 2);
echo $newDate-&gt;format('Y-m-d') . "\n";

$newDate = $date-&gt;setISODate(2008, 2, 7);
echo $newDate-&gt;format('Y-m-d') . "\n";

El ejemplo anterior mostrará:

2008-01-07
2008-01-13

Estilo procedimental

&lt;?php

$date = date_create();

date_isodate_set($date, 2008, 2);
echo date_format($date, 'Y-m-d') . "\n";

date_isodate_set($date, 2008, 2, 7);
echo date_format($date, 'Y-m-d') . "\n";

El ejemplo anterior mostrará:

2008-01-07
2008-01-13

**Ejemplo #2 Valores que exceden los rangos se añaden a sus valores padres**

&lt;?php

$date = new DateTimeImmutable();

$newDate = $date-&gt;setISODate(2008, 2, 7);
echo $newDate-&gt;format('Y-m-d') . "\n";

$newDate = $date-&gt;setISODate(2008, 2, 8);
echo $newDate-&gt;format('Y-m-d') . "\n";

$newDate = $date-&gt;setISODate(2008, 53, 7);
echo $newDate-&gt;format('Y-m-d') . "\n";

El ejemplo anterior mostrará:

2008-01-13
2008-01-14
2009-01-04

**Ejemplo #3 Buscando el mes en el que se encuentra una semana**

&lt;?php

$date = new DateTimeImmutable();
$newDate = $date-&gt;setISODate(2008, 14);
echo $newDate-&gt;format('n');

El ejemplo anterior mostrará:

3

### Ver también

- [DateTimeImmutable::setDate()](#datetimeimmutable.setdate) - Establece la fecha

- [DateTimeImmutable::setTime()](#datetimeimmutable.settime) - Establece la hora

# DateTimeImmutable::setTime

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::setTime — Establece la hora

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::setTime**(
    [int](#language.types.integer) $hour,
    [int](#language.types.integer) $minute,
    [int](#language.types.integer) $second = 0,
    [int](#language.types.integer) $microsecond = 0
): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto DateTimeImmutable con la hora establecida a la hora dada.

### Parámetros

    hour


      Hora de la hora.






    minute


      Minuto de la hora.






    second


      Segundo de la hora.






    microsecond


      Microsegundo de la hora.


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Historial de cambios

      Versión
      Descripción






      8.1.0
      El comportamiento con horas dobles existentes (durante la transición
      de DST de retroceso) cambió. Anteriormente, PHP elegiría la segunda ocurrencia
      (después de la transición de DST), en lugar de la primera ocurrencia (antes de
      la transición de DST).



      7.1.0
      Se ha añadido el parametro microsecond.


### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::setTime()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2001-01-01');

$newDate = $date-&gt;setTime(14, 55);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$newDate = $date-&gt;setTime(14, 55, 24);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";
?&gt;

Resultado del ejemplo anterior es similar a:

2001-01-01 14:55:00
2001-01-01 14:55:24

**Ejemplo #2 Valores que exceden los rangos se añaden a sus valores padres**

&lt;?php
$date = new DateTimeImmutable('2001-01-01');

$newDate = $date-&gt;setTime(14, 55, 24);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$newDate = $date-&gt;setTime(14, 55, 65);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$newDate = $date-&gt;setTime(14, 65, 24);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$newDate = $date-&gt;setTime(25, 55, 24);
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";
?&gt;

El ejemplo anterior mostrará:

2001-01-01 14:55:24
2001-01-01 14:56:05
2001-01-01 15:05:24
2001-01-02 01:55:24

### Ver también

- [DateTimeImmutable::setDate()](#datetimeimmutable.setdate) - Establece la fecha

- [DateTimeImmutable::setISODate()](#datetimeimmutable.setisodate) - Establece la fecha ISO

# DateTimeImmutable::setTimestamp

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::setTimestamp — Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::setTimestamp**([int](#language.types.integer) $timestamp): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable) construido a partir del
antiguo, con la fecha y hora establecidas basadas en una marca de tiempo Unix.

### Parámetros

    timestamp


      Una marca de tiempo Unix representando la fecha.
      Establecer marcas de tiempo fuera del rango de [int](#language.types.integer) es posible usando
      [DateTimeImmutable::modify()](#datetimeimmutable.modify) con el formato @.


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::setTimestamp()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable();
echo $date-&gt;format('U = Y-m-d H:i:s') . "\n";

$newDate = $date-&gt;setTimestamp(1171502725);
echo $newDate-&gt;format('U = Y-m-d H:i:s') . "\n";

Resultado del ejemplo anterior es similar a:

1272508903 = 2010-04-28 22:41:43
1171502725 = 2007-02-14 20:25:25

### Ver también

- [DateTimeImmutable::getTimestamp()](#datetime.gettimestamp) - Obtiene el timestamp Unix

# DateTimeImmutable::setTimezone

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::setTimezone — Establece la zona horaria

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::setTimezone**([DateTimeZone](#class.datetimezone) $timezone): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto DateTimeImmutable con una nueva zona horaria establecida.

### Parámetros

    timezone


      Un objeto [DateTimeZone](#class.datetimezone) que representa la
      zona horaria deseada.


### Valores devueltos

Devuelve un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable) modificado para
encadenar métodos. El instante subyacente no se modifica al llamar a
este método.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::setTimeZone()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2000-01-01', new DateTimeZone('Pacific/Nauru'));
echo $date-&gt;format('Y-m-d H:i:sP') . "\n";

$newDate = $date-&gt;setTimezone(new DateTimeZone('Pacific/Chatham'));
echo $newDate-&gt;format('Y-m-d H:i:sP') . "\n";
?&gt;

El ejemplo anterior mostrará:

2000-01-01 00:00:00+12:00
2000-01-01 01:45:00+13:45

### Ver también

- [DateTimeImmutable::getTimezone()](#datetime.gettimezone) - Devuelve la zona horaria relativa al DateTime proporcionado

- [DateTimeZone::\_\_construct()](#datetimezone.construct) - Crea un nuevo objeto DateTimeZone

# DateTimeImmutable::sub

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

DateTimeImmutable::sub —
Sustrae una cantidad de días, meses, años, horas, minutos y segundos

### Descripción

#[\NoDiscard]
public **DateTimeImmutable::sub**([DateInterval](#class.dateinterval) $interval): [DateTimeImmutable](#class.datetimeimmutable)

Devuelve un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable), con el objeto
[DateInterval](#class.dateinterval) especificado sustraído del objeto
[DateTimeImmutable](#class.datetimeimmutable) especificado.

### Parámetros

     interval



      Un objeto [DateInterval](#class.dateinterval)


### Valores devueltos

Retorna un nuevo objeto
[DateTimeImmutable](#class.datetimeimmutable) con los datos modificados.

### Errores/Excepciones

    Si se intenta realizar una operación no soportada, como usar un objeto
    [DateInterval](#class.dateinterval) que represente especificaciones de tiempo
    relativas como próximo día de la semana, se lanzará una
    [DateInvalidOperationException](#class.dateinvalidoperationexception).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza una [DateInvalidOperationException](#class.dateinvalidoperationexception)
       en lugar de una advertencia cuando se intenta realizar una operación no soportada.



### Ejemplos

**Ejemplo #1 Ejemplo de DateTimeImmutable::sub()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2000-01-20');
$newDate = $date-&gt;sub(new DateInterval('P10D'));
echo $newDate-&gt;format('Y-m-d') . "\n";
?&gt;

El ejemplo anterior mostrará:

2000-01-10

**Ejemplo #2 Más ejemplos de DateTimeImmutable::sub()**

&lt;?php
$date = new DateTimeImmutable('2000-01-20');
$newDate = $date-&gt;sub(new DateInterval('PT10H30S'));
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";

$date = new DateTimeImmutable('2000-01-20');
$newDate = $date-&gt;sub(new DateInterval('P7Y5M4DT4H3M2S'));
echo $newDate-&gt;format('Y-m-d H:i:s') . "\n";
?&gt;

El ejemplo anterior mostrará:

2000-01-19 13:59:30
1992-08-15 19:56:58

**Ejemplo #3 Tenga cuidado al substraer meses**

&lt;?php
$date = new DateTimeImmutable('2001-04-30');
$interval = new DateInterval('P1M');

$newDate1 = $date-&gt;sub($interval);
echo $newDate1-&gt;format('Y-m-d') . "\n";

$newDate2 = $newDate1-&gt;sub($interval);
echo $newDate2-&gt;format('Y-m-d') . "\n";
?&gt;

El ejemplo anterior mostrará:

2001-03-30
2001-03-02

### Ver también

- [DateTimeImmutable::add()](#datetimeimmutable.add) - Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos

- [DateTimeImmutable::diff()](#datetime.diff) - Devuelve la diferencia entre dos objetos DateTime

- [DateTimeImmutable::modify()](#datetimeimmutable.modify) - Crea un nuevo objeto con la marca de tiempo modificada

## Tabla de contenidos

- [DateTimeImmutable::add](#datetimeimmutable.add) — Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos
- [DateTimeImmutable::\_\_construct](#datetimeimmutable.construct) — Devuelve un nuevo objeto DateTimeImmutable
- [DateTimeImmutable::createFromFormat](#datetimeimmutable.createfromformat) — Analiza un string de tiempo según el formato especificado
- [DateTimeImmutable::createFromInterface](#datetimeimmutable.createfrominterface) — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTimeInterface dado
- [DateTimeImmutable::createFromMutable](#datetimeimmutable.createfrommutable) — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTime dado
- [DateTimeImmutable::getLastErrors](#datetimeimmutable.getlasterrors) — Devuelve las advertencias y errores
- [DateTimeImmutable::modify](#datetimeimmutable.modify) — Crea un nuevo objeto con la marca de tiempo modificada
- [DateTimeImmutable::\_\_set_state](#datetimeimmutable.set-state) — El gestor \_\_set_state
- [DateTimeImmutable::setDate](#datetimeimmutable.setdate) — Establece la fecha
- [DateTimeImmutable::setISODate](#datetimeimmutable.setisodate) — Establece la fecha ISO
- [DateTimeImmutable::setTime](#datetimeimmutable.settime) — Establece la hora
- [DateTimeImmutable::setTimestamp](#datetimeimmutable.settimestamp) — Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)
- [DateTimeImmutable::setTimezone](#datetimeimmutable.settimezone) — Establece la zona horaria
- [DateTimeImmutable::sub](#datetimeimmutable.sub) — Sustrae una cantidad de días, meses, años, horas, minutos y segundos

# La interfaz DateTimeInterface

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

## Introducción

    **DateTimeInterface** fue creada
    tanto como parametro de retorno, como para las declaraciones de tipo
    de propiedad puedan aceptar tanto [DateTimeImmutable](#class.datetimeimmutable) o
    [DateTime](#class.datetime) como valor. No es posible que el usuario
    implemente esta interfaz en sus propias clases.




    Las constantes comunes que permiten el formato de objetos
    [DateTimeImmutable](#class.datetimeimmutable) o
    [DateTime](#class.datetime) mediante
    [DateTimeImmutable::format()](#datetime.format) y
    [DateTime::format()](#datetime.format) son también definidas en esta
    interfaz.

## Sinopsis de la Clase

     interface **DateTimeInterface** {

    /* Constantes */

     public
     const
     [string](#language.types.string)
      [ATOM](#datetimeinterface.constants.atom) = "Y-m-d\\TH:i:sP";

    public
     const
     [string](#language.types.string)
      [COOKIE](#datetimeinterface.constants.cookie) = "l, d-M-Y H:i:s T";

    public
     const
     [string](#language.types.string)
      [ISO8601](#datetimeinterface.constants.iso8601) = "Y-m-d\\TH:i:sO";

    public
     const
     [string](#language.types.string)
      [ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded) = "X-m-d\\TH:i:sP";

    public
     const
     [string](#language.types.string)
      [RFC822](#datetimeinterface.constants.rfc822) = "D, d M y H:i:s O";

    public
     const
     [string](#language.types.string)
      [RFC850](#datetimeinterface.constants.rfc850) = "l, d-M-y H:i:s T";

    public
     const
     [string](#language.types.string)
      [RFC1036](#datetimeinterface.constants.rfc1036) = "D, d M y H:i:s O";

    public
     const
     [string](#language.types.string)
      [RFC1123](#datetimeinterface.constants.rfc1123) = "D, d M Y H:i:s O";

    public
     const
     [string](#language.types.string)
      [RFC7231](#datetimeinterface.constants.rfc7231) = "D, d M Y H:i:s \\G\\M\\T";

    public
     const
     [string](#language.types.string)
      [RFC2822](#datetimeinterface.constants.rfc2822) = "D, d M Y H:i:s O";

    public
     const
     [string](#language.types.string)
      [RFC3339](#datetimeinterface.constants.rfc3339) = "Y-m-d\\TH:i:sP";

    public
     const
     [string](#language.types.string)
      [RFC3339_EXTENDED](#datetimeinterface.constants.rfc3339-extended) = "Y-m-d\\TH:i:s.vP";

    public
     const
     [string](#language.types.string)
      [RSS](#datetimeinterface.constants.rss) = "D, d M Y H:i:s O";

    public
     const
     [string](#language.types.string)
      [W3C](#datetimeinterface.constants.w3c) = "Y-m-d\\TH:i:sP";


    /* Métodos */

public [diff](#datetime.diff)([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)
public [format](#datetime.format)([string](#language.types.string) $format): [string](#language.types.string)
public [getOffset](#datetime.getoffset)(): [int](#language.types.integer)
public [getTimestamp](#datetime.gettimestamp)(): [int](#language.types.integer)
public [getTimezone](#datetime.gettimezone)(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)
public [\_\_serialize](#datetime.serialize)(): [array](#language.types.array)
public [\_\_unserialize](#datetime.unserialize)([array](#language.types.array) $data): [void](language.types.void.html)
[#[\Deprecated]](class.deprecated.html)
public [\_\_wakeup](#datetime.wakeup)(): [void](language.types.void.html)

}

## Constantes predefinidas

      **[DateTimeInterface::ATOM](#datetimeinterface.constants.atom)**
      [string](#language.types.string)

     **[DATE_ATOM](#constant.date-atom)**


       Atom (ejemplo: 2005-08-15T15:52:01+00:00)






      **[DateTimeInterface::COOKIE](#datetimeinterface.constants.cookie)**
      [string](#language.types.string)

     **[DATE_COOKIE](#constant.date-cookie)**


       HTTP Cookies (ejemplo: Monday, 15-Aug-2005 15:52:01 UTC)






      **[DateTimeInterface::ISO8601](#datetimeinterface.constants.iso8601)**
      [string](#language.types.string)

     **[DATE_ISO8601](#constant.date-iso8601)**


       ISO-8601 (ejemplo: 2005-08-15T15:52:01+0000)

      **Nota**:

        Este formato no es compatible con el ISO-8601, aunque se deja por
        razones de retrocompatibilidad. Use
        **[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded)**,
        **[DateTimeInterface::ATOM](#datetimeinterface.constants.atom)** en su lugar para que sea
        compatible con el ISO-8601. (ref ISO8601:2004 section 4.3.3 clause d)









      **[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded)**
      [string](#language.types.string)

     **[DATE_ISO8601_EXPANDED](#constant.date-iso8601-expanded)**


       ISO-8601 Extendido (ejemplo: +10191-07-26T08:59:52+01:00)

      **Nota**:

        Este formato permite rangos de años fuera del rango normal de ISO-8601
        de 0000-9999 al incluir siempre
        un carácter de signo. También asegura que la parte de la zona horaria
        (+01:00) sea compatible con ISO-8601.









      **[DateTimeInterface::RFC822](#datetimeinterface.constants.rfc822)**
      [string](#language.types.string)

     **[DATE_RFC822](#constant.date-rfc822)**


       RFC 822 (ejemplo: Mon, 15 Aug 05 15:52:01 +0000)






      **[DateTimeInterface::RFC850](#datetimeinterface.constants.rfc850)**
      [string](#language.types.string)

     **[DATE_RFC850](#constant.date-rfc850)**


       RFC 850 (ejemplo: Monday, 15-Aug-05 15:52:01 UTC)






      **[DateTimeInterface::RFC1036](#datetimeinterface.constants.rfc1036)**
      [string](#language.types.string)

     **[DATE_RFC1036](#constant.date-rfc1036)**


       RFC 1036 (ejemplo: Mon, 15 Aug 05 15:52:01 +0000)






      **[DateTimeInterface::RFC1123](#datetimeinterface.constants.rfc1123)**
      [string](#language.types.string)

     **[DATE_RFC1123](#constant.date-rfc1123)**


       RFC 1123 (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000)






       **[DateTimeInterface::RFC7231](#datetimeinterface.constants.rfc7231)**
       [string](#language.types.string)

      **[DATE_RFC7231](#constant.date-rfc7231)**


        RFC 7231 (desde PHP 7.0.19 y 7.1.5)
        (ejemplo: Sat, 30 Apr 2016 17:52:13 GMT)






      **[DateTimeInterface::RFC2822](#datetimeinterface.constants.rfc2822)**
      [string](#language.types.string)

     **[DATE_RFC2822](#constant.date-rfc2822)**


       RFC 2822 (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000)






      **[DateTimeInterface::RFC3339](#datetimeinterface.constants.rfc3339)**
      [string](#language.types.string)

     **[DATE_RFC3339](#constant.date-rfc3339)**


       Igual que **[DATE_ATOM](#constant.date-atom)**






      **[DateTimeInterface::RFC3339_EXTENDED](#datetimeinterface.constants.rfc3339-extended)**
      [string](#language.types.string)

     **[DATE_RFC3339_EXTENDED](#constant.date-rfc3339-extended)**


       Formato RFC 3339 EXTENDED
       (ejemplo: 2005-08-15T15:52:01.000+00:00)






      **[DateTimeInterface::RSS](#datetimeinterface.constants.rss)**
      [string](#language.types.string)

     **[DATE_RSS](#constant.date-rss)**


       RSS (ejemplo: Mon, 15 Aug 2005 15:52:01 +0000).
       Alias de **[DATE_RFC1123](#constant.date-rfc1123)**.






      **[DateTimeInterface::W3C](#datetimeinterface.constants.w3c)**
      [string](#language.types.string)

     **[DATE_W3C](#constant.date-w3c)**


       World Wide Web Consortium (ejemplo: 2005-08-15T15:52:01+00:00).
       Alias de **[DATE_RFC3339](#constant.date-rfc3339)**.



## Historial de cambios

       Versión
       Descripción






       8.4.0
       Las constantes de clase ahora están tipadas.



       8.2.0

        Se ha añadido la constante
        **[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded)**.




       7.2.0

        Las constantes de clase de [DateTime](#class.datetime) ahora están
        definidas en **DateTimeInterface**.





# DateTimeInterface::diff

# DateTimeImmutable::diff

# DateTime::diff

# date_diff

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTimeInterface::diff -- DateTimeImmutable::diff -- DateTime::diff -- date_diff — Devuelve la diferencia entre dos objetos DateTime

### Descripción

Estilo orientado a objetos

public **DateTimeInterface::diff**([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

public **DateTimeImmutable::diff**([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

public **DateTime::diff**([DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

Estilo procedimental

[date_diff](#function.date-diff)([DateTimeInterface](#class.datetimeinterface) $baseObject, [DateTimeInterface](#class.datetimeinterface) $targetObject, [bool](#language.types.boolean) $absolute = **[false](#constant.false)**): [DateInterval](#class.dateinterval)

Devuelve la diferencia entre dos objetos
[DateTimeInterface](#class.datetimeinterface).

### Parámetros

    datetime


      La fecha a comparar.






    absolute


      ¿Debería el intervalo forzado a ser positivo?


### Valores devueltos

El objeto [DateInterval](#class.dateinterval) que representa la
diferencia entre dos fechas.

El parámetro absolute solo afecta
a la propiedad invert de un
objeto [DateInterval](#class.dateinterval).

El valor devuelto más especificamente, representa el intervalo de tiempo
que habría que aplicar al objeto original ($this o
$originObject) para llegar a
$targetObject. Este proceso no siempre es
reversible.

El método tiene en cuenta los cambios de horario de verano y, por lo tanto,
puede devolver un intervalo de 24 horas y 30 minutos,
como en uno de los ejemplos. Si quieres calcular un tiempo absoluto,
debes comvertir ambos $this/$baseObject,
y $targetObject primero a UTC.

### Ejemplos

**Ejemplo #1 Ejemplo de DateTime::diff()**

Estilo orientado a objetos

&lt;?php
$origin = new DateTimeImmutable('2009-10-11');
$target = new DateTimeImmutable('2009-10-13');
$interval = $origin-&gt;diff($target);
echo $interval-&gt;format('%R%a days');

El ejemplo anterior mostrará:

+2 days

Estilo procedimental

&lt;?php
$origin = date_create('2009-10-11');
$target = date_create('2009-10-13');
$interval = date_diff($origin, $target);
echo $interval-&gt;format('%R%a days');

El ejemplo anterior mostrará:

+2 days

**Ejemplo #2 DateTimeInterface::diff()**
durante el cambio de horario de verano

&lt;?php
$originalTime = new DateTimeImmutable("2021-10-30 09:00:00 Europe/London");
$targetTime = new DateTimeImmutable("2021-10-31 08:30:00 Europe/London");
$interval = $originalTime-&gt;diff($targetTime);
echo $interval-&gt;format("%H:%I:%S (Días completos: %a)"), "\n";

El ejemplo anterior mostrará:

24:30:00 (Días completos: 0)

**Ejemplo #3 DateTimeInterface::diff()** range

    El valor devuelto es la cantidad de tiempo exacto entre
    $this y $targetObject.
    Comparando del 1 de enero al 31 de diciembre devuelve 364 días,
    y no 365 (para años no bisiestos).

&lt;?php
$originalTime = new DateTimeImmutable("2023-01-01 UTC");
$targetTime = new DateTimeImmutable("2023-12-31 UTC");
$interval = $originalTime-&gt;diff($targetTime);
echo "Días completos: ", $interval-&gt;format("%a"), "\n";

El ejemplo anterior mostrará:

Días completos: 364

**Ejemplo #4 Comparación de objetos [DateTime](#class.datetime)**

**Nota**:

     Los objetos DateTime se pueden comparar usando los
     [operadores de comparación](#language.operators.comparison).

&lt;?php
$date1 = new DateTime("now");
$date2 = new DateTime("tomorrow");

var_dump($date1 == $date2);
var_dump($date1 &lt; $date2);
var_dump($date1 &gt; $date2);

El ejemplo anterior mostrará:

bool(false)
bool(true)
bool(false)

### Ver también

- [DateInterval::format()](#dateinterval.format) - Formatea el intervalo

- [DateTime::add()](#datetime.add) - Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos

- [DateTime::sub()](#datetime.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto
  DateTime

# DateTimeInterface::format

# DateTimeImmutable::format

# DateTime::format

# date_format

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeInterface::format -- DateTimeImmutable::format -- DateTime::format -- date_format — Retorna una fecha formateada según el formato proporcionado

### Descripción

Estilo orientado a objetos

public **DateTimeInterface::format**([string](#language.types.string) $format): [string](#language.types.string)

public **DateTimeImmutable::format**([string](#language.types.string) $format): [string](#language.types.string)

public **DateTime::format**([string](#language.types.string) $format): [string](#language.types.string)

Estilo procedimental

[date_format](#function.date-format)([DateTimeInterface](#class.datetimeinterface) $object, [string](#language.types.string) $format): [string](#language.types.string)

Retorna una fecha formateada según el formato proporcionado.

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTime](#class.datetime)
retornado por [date_create()](#function.date-create)

     format


       El formato de la fecha deseada. Ver las opciones de formato a continuación.
       Existen también numerosas
       [constantes de fechas](#datetimeinterface.constants.types)
       que pueden ser utilizadas, lo que hace que **[DATE_RSS](#constant.date-rss)**
       reemplace el formato "D, d M Y H:i:s".








        <caption>**
         Los siguientes caracteres son reconocidos en el parámetro
         format
        **</caption>



           Caracteres para el parámetro format
           Descripción
           Ejemplos de valores retornados






           *Día*
           ---
           ---



           d
           Día del mes, en dos dígitos (con un cero inicial)
           01 a 31



           D
           Día de la semana, en tres letras (y en inglés - por defecto: en inglés, o sino, en el idioma local del servidor)
           Mon a Sun



           j
           Día del mes sin los ceros iniciales
           1 a 31



           l ('L' minúscula)
           Día de la semana, textual, versión larga, en inglés
           Sunday a Saturday



           N
           Representación numérica ISO 8601 del día de la semana
           1 (para Lunes) a 7 (para Domingo)



           S
           Sufijo ordinal de un número para el día del mes, en inglés, en dos letras

            st, nd, rd o
            th. Funciona bien con j




           w
           Día de la semana en formato numérico
           0 (para domingo) a 6 (para sábado)



           z
           Día del año
           0 a 365



           *Semana*
           ---
           ---



           W
           Número de semana en el año ISO 8601, las semanas comienzan
            el lunes
           Ejemplo: 42 (la 42ª semana del año)



           *Mes*
           ---
           ---



           F
           Mes, textual, versión larga; en inglés, como
            January o December
           January a December



           m
           Mes en formato numérico, con ceros iniciales
           01 a 12



           M
           Mes, en tres letras, en inglés
           Jan a Dec



           n
           Mes sin los ceros iniciales
           1 a 12



           t
           Número de días en el mes
           28 a 31



           *Año*
           ---
           ---



           L
           ¿Es el año bisiesto?
           1 si es bisiesto, 0 si no.



           o
           Año de numeración de semanas ISO 8601. Es el mismo valor que
            Y, excepto si el número de semana ISO
            (W) pertenece al año anterior o siguiente,
            este año será utilizado en su lugar.
           Ejemplos: 1999 o 2003



           X

            Una representación numérica completa extendida de un año, de al menos 4 dígitos,
            con un - para los años antes de la era común
            y un + para los años de la era común.


            Ejemplos: -0055, +0787,
            +1999, +10191




           x

            Una representación numérica completa extendida si es necesario,
            o una representación numérica completa estándar si es posible (como Y).
            Al menos cuatro dígitos. Los años anteriores a la era común son prefijados por un -.
            Los años más allá (y incluyendo) del 10000 son prefijados por un +.


            Ejemplos: -0055, 0787,
            1999, +10191




           Y
           Una representación numérica completa de un año, al menos 4 dígitos, con - para los años av. J.-C.
           Ejemplos: -0055, 0787,
            1999, 2003, 10191



           y
           Año en 2 dígitos
           Ejemplos: 99 o 03



           *Hora*
           ---
           ---



           a
           Ante meridiem y Post meridiem en minúsculas
           am o pm



           A
           Ante meridiem y Post meridiem en mayúsculas
           AM o PM



           B
           Hora Internet Swatch
           000 a 999



           g
           Hora, en formato 12h, sin los ceros iniciales
           1 a 12



           G
           Hora, en formato 24h, sin los ceros iniciales
           0 a 23



           h
           Hora, en formato 12h, con los ceros iniciales
           01 a 12



           H
           Hora, en formato 24h, con los ceros iniciales
           00 a 23



           i
           Minutos con ceros iniciales
           00 a 59



           s
           Segundos con ceros iniciales
           00 a 59



           u

            Microsegundos. Tenga en cuenta que la función
            [date()](#function.date) generará siempre
            000000 ya que toma un parámetro de tipo
            entero, mientras que el método **DateTimeInterface::format()**
            soporta microsegundos si un objeto de tipo
            [DateTimeInterface](#class.datetimeinterface) fue creado con microsegundos.

           Ejemplo: 654321



           v

            Milisegundos. Misma nota que para
            u.

           Ejemplo: 654



           *Zona horaria*
           ---
           ---



           e
           El identificador de la zona horaria
           Ejemplos: UTC, GMT, Atlantic/Azores



           I (i mayúscula)
           La hora de verano está activada o no
           1 si sí, 0 si no.



           O
           Diferencia de horas con la hora de Greenwich (GMT), sin
            dos puntos entre las horas y los minutos
           Ejemplo: +0200



           P
           Diferencia con la hora Greenwich (GMT) con un dos puntos
            entre las horas y los minutos
           Ejemplo: +02:00



           p

            Idéntico a P, pero retorna Z en lugar de +00:00
            (disponible a partir de PHP 8.0.0)

           Ejemplos: Z o +02:00



           T
           Abreviación de la zona horaria, si es conocida; sino, desplazamiento desde GMT
           Ejemplos: EST, MDT, +05



           Z
           Desplazamiento horario en segundos. El desplazamiento de zonas al oeste
            de la zona UTC es negativo, y al este, es positivo.
           -43200 a 50400



           *Fecha y Hora completa*
           ---
           ---



           c
           Fecha en formato ISO 8601. Solo compatible con el formato no expandido (hasta el año 9999). Las fechas posteriores generarán una cadena no válida. Para fechas posteriores y el formato expandido, consulte x y X.
           2004-02-12T15:19:21+00:00



           r
           Formato de fecha [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822)/[» RFC 5322](https://datatracker.ietf.org/doc/html/rfc5322)
           Ejemplo: Thu, 21 Dec 2000 16:01:070200



           U
           Segundos desde la época Unix (1 de Enero de 1970,  0h00 00s GMT)
           Ver también [time()](#function.time)








       Los caracteres no reconocidos serán impresos tal cual.
       "Z" retornará siempre 0 cuando se utiliza con
       [gmdate()](#function.gmdate).



      **Nota**:



        Sabiendo que esta función solo acepta enteros en forma de timestamp,
        el carácter u solo es útil al utilizar la función
        [date_format()](#function.date-format) con un timestamp de usuario creado con la función
        [date_create()](#function.date-create).






### Valores devueltos

Retorna la fecha formateada, en forma de string,
en caso de éxito.

### Historial de cambios

      Versión
      Descripción






      8.2.0

       Los caracteres de formato X o x
       han sido añadidos.




      8.0.0

       El carácter de formato p ha sido añadido.



### Ejemplos

    **Ejemplo #1 Ejemplo con DateTime::format()**


    Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable('2000-01-01');
echo $date-&gt;format('Y-m-d H:i:s');
?&gt;

    El ejemplo anterior mostrará:

2000-01-01 00:00:00

    Estilo procedimental

&lt;?php
$date = date_create('2000-01-01');
echo date_format($date, 'Y-m-d H:i:s');
?&gt;

    El ejemplo anterior mostrará:

2000-01-01 00:00:00

    **Ejemplo #2 Más ejemplos**

&lt;?php
// set the default timezone to use.
date_default_timezone_set('UTC');

// now
$date = new DateTimeImmutable();

// Imprime algo como: Wednesday
echo $date-&gt;format('l'), "\n";

// Imprime algo como: Wednesday 19th of October 2022 08:40:48 AM
echo $date-&gt;format('l jS \o\f F Y h:i:s A'), "\n";

/_ use the constants in the format parameter _/
// imprime algo como: Wed, 19 Oct 2022 08:40:48 +0000
echo $date-&gt;format(DateTimeInterface::RFC2822), "\n";
?&gt;

Es posible evitar que un carácter reconocido en la cadena de formato
se expanda escapándolo con un backslash (barra invertida). Si el carácter con
backslash es ya una secuencia especial, será necesario también escapar
el backslash.

    **Ejemplo #3 Escape de caracteres durante el formato**

&lt;?php
$date = new DateTimeImmutable();

// imprime algo como: Wednesday the 19th
echo $date-&gt;format('l \t\h\e jS');
?&gt;

Para formatear fechas en otros idiomas,
[IntlDateFormatter::format()](#intldateformatter.format)
puede ser utilizada en lugar de **DateTimeInterface::format()**.

### Notas

Este método no utiliza locales. Todos los despliegues
serán en inglés.

### Ver también

- [IntlDateFormatter::format()](#intldateformatter.format) - Formatea la fecha y la hora como string

# DateTimeInterface::getOffset

# DateTimeImmutable::getOffset

# DateTime::getOffset

# date_offset_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeInterface::getOffset -- DateTimeImmutable::getOffset -- DateTime::getOffset -- date_offset_get — Devuelve el desplazamiento horario

### Descripción

Estilo orientado a objetos

public **DateTimeInterface::getOffset**(): [int](#language.types.integer)

public **DateTimeImmutable::getOffset**(): [int](#language.types.integer)

public **DateTime::getOffset**(): [int](#language.types.integer)

Estilo procedimental

[date_offset_get](#function.date-offset-get)([DateTimeInterface](#class.datetimeinterface) $object): [int](#language.types.integer)

Devuelve el desplazamiento horario.

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTime](#class.datetime)
retornado por [date_create()](#function.date-create)

### Valores devueltos

Devuelve el desplazamiento horario en segundos, desde UTC en caso de éxito.

### Ejemplos

**Ejemplo #1 Ejemplo con DateTime::getOffset()**

Estilo orientado a objetos

&lt;?php
$winter = new DateTimeImmutable('2010-12-21', new DateTimeZone('America/New_York'));
$summer = new DateTimeImmutable('2008-06-21', new DateTimeZone('America/New_York'));

echo $winter-&gt;getOffset() . "\n";
echo $summer-&gt;getOffset() . "\n";

El ejemplo anterior mostrará:

-18000
-14400

Estilo procedimental

&lt;?php
$winter = date_create('2010-12-21', timezone_open('America/New_York'));
$summer = date_create('2008-06-21', timezone_open('America/New_York'));

echo date_offset_get($winter) . "\n";
echo date_offset_get($summer) . "\n";

El ejemplo anterior mostrará:

-18000
-14400

    Nota: -18000 = -5 horas, -14400 = -4 horas.

# DateTimeInterface::getTimestamp

# DateTimeImmutable::getTimestamp

# DateTime::getTimestamp

# date_timestamp_get

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTimeInterface::getTimestamp -- DateTimeImmutable::getTimestamp -- DateTime::getTimestamp -- date_timestamp_get — Obtiene el timestamp Unix

### Descripción

Estilo orientado a objetos

public **DateTimeInterface::getTimestamp**(): [int](#language.types.integer)

public **DateTimeImmutable::getTimestamp**(): [int](#language.types.integer)

public **DateTime::getTimestamp**(): [int](#language.types.integer)

Estilo procedimental

[date_timestamp_get](#function.date-timestamp-get)([DateTimeInterface](#class.datetimeinterface) $object): [int](#language.types.integer)

Obtiene el timestamp Unix.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el timestamp Unix que representa la fecha.

### Errores/Excepciones

Si el sello de tiempo no puede ser representado como un [int](#language.types.integer),
se lanza una [DateRangeError](#class.daterangeerror).
Anterior a PHP 8.3.0, se lanzaba una [ValueError](#class.valueerror).
Y anterior a PHP 8.0.0, se devolvía **[false](#constant.false)** en este caso.
Sin embargo, el sello de tiempo puede ser obtenido como un [string](#language.types.string) utilizando
[DateTimeInterface::format()](#datetime.format) con el formato U.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       La excepción de fuera de rango ahora es una
       [DateRangeError](#class.daterangeerror).




      8.0.0

       Estas funciones ya no devuelven **[false](#constant.false)** en caso de fallo.



### Ejemplos

**Ejemplo #1 Ejemplo con DateTime::getTimestamp()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable();
echo $date-&gt;getTimestamp();

Resultado del ejemplo anterior es similar a:

1272509157

Estilo procedimental

&lt;?php
$date = date_create();
echo date_timestamp_get($date);

Resultado del ejemplo anterior es similar a:

1272509157

Para obtener el sello de tiempo con precisión
en milisegundos o microsegundos, es posible utilizar
la función [DateTimeInterface::format()](#datetime.format).

**Ejemplo #2 Obtención del sello de tiempo con precisión en milisegundos y microsegundos**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable();
$milli = (int) $date-&gt;format('Uv'); // Timestamp en milisegundos
$micro = (int) $date-&gt;format('Uu'); // Timestamp en microsegundos

echo $milli, "\n", $micro, "\n";

Resultado del ejemplo anterior es similar a:

1674057635586
1674057635586918

### Ver también

- [DateTime::setTimestamp()](#datetime.settimestamp) - Establece la fecha y la hora basándose en una marca temporal de Unix

- [DateTimeImmutable::setTimestamp()](#datetimeimmutable.settimestamp) - Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)

- [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

# DateTimeInterface::getTimezone

# DateTimeImmutable::getTimezone

# DateTime::getTimezone

# date_timezone_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeInterface::getTimezone -- DateTimeImmutable::getTimezone -- DateTime::getTimezone -- date_timezone_get — Devuelve la zona horaria relativa al DateTime proporcionado

### Descripción

Estilo orientado a objetos

public **DateTimeInterface::getTimezone**(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)

public **DateTimeImmutable::getTimezone**(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)

public **DateTime::getTimezone**(): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)

Estilo procedimental

[date_timezone_get](#function.date-timezone-get)([DateTimeInterface](#class.datetimeinterface) $object): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)

Devuelve la zona horaria relativa al DateTime proporcionado.

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTime](#class.datetime)
retornado por [date_create()](#function.date-create)

### Valores devueltos

Devuelve un objeto [DateTimeZone](#class.datetimezone) en caso de éxito
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con DateTime::getTimezone()**

Estilo orientado a objetos

&lt;?php
$date = new DateTimeImmutable("now", new DateTimeZone('Europe/London'));
$tz = $date-&gt;getTimezone();
echo $tz-&gt;getName();

El ejemplo anterior mostrará:

Europe/London

Estilo procedimental

&lt;?php
$date = date_create("now", timezone_open('Europe/London'));
$tz = date_timezone_get($date);
echo timezone_name_get($tz);

El ejemplo anterior mostrará:

Europe/London

### Ver también

- [DateTime::setTimezone()](#datetime.settimezone) - Establece la zona horaria para el objeto DateTime

# DateTime::\_\_serialize

# DateTimeImmutable::\_\_serialize

# DateTimeInterface::\_\_serialize

(PHP 8 &gt;= 8.2.0)

DateTime::**serialize -- DateTimeImmutable::**serialize -- DateTimeInterface::\_\_serialize — Deserializa un DateTime

### Descripción

public **DateTime::\_\_serialize**(): [array](#language.types.array)

public **DateTimeImmutable::\_\_serialize**(): [array](#language.types.array)

public **DateTimeInterface::\_\_serialize**(): [array](#language.types.array)

El gestor [\_\_serialize()](#object.serialize).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La representación serializada del objeto
[DateTime](#class.datetime).

### Ejemplos

**Ejemplo #1 Ejemplo de DateTime::serialize()**

&lt;?php
$date = new DateTime('2025-03-27');
var_dump(serialize($date));

El ejemplo anterior mostrará:

string(114) "O:8:"DateTime":3:{s:4:"date";s:26:"2025-03-27 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}"

### Ver también

- [DateTime::\_\_unserialize()](#datetime.unserialize) - Deserializar un DateTime

# DateTime::\_\_unserialize

# DateTimeImmutable::\_\_unserialize

# DateTimeInterface::\_\_unserialize

(PHP 8 &gt;= 8.2.0)

DateTime::**unserialize -- DateTimeImmutable::**unserialize -- DateTimeInterface::\_\_unserialize — Deserializar un DateTime

### Descripción

public **DateTime::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

public **DateTimeImmutable::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

public **DateTimeInterface::\_\_unserialize**([array](#language.types.array) $data): [void](language.types.void.html)

El gestor [\_\_unserialize()](#object.unserialize).

### Parámetros

    data


      El [DateTime](#class.datetime) serializado.


### Valores devueltos

El objeto [DateTime](#class.datetime).

### Ejemplos

**Ejemplo #1 Ejemplo de DateTime::unserialize()**

&lt;?php
$serializedDate = 'O:8:"DateTime":3:{s:4:"date";s:26:"2025-03-27 00:00:00.000000";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}';
var_dump(unserialize($serializedDate));

El ejemplo anterior mostrará:

object(DateTime)#1 (3) {
["date"]=&gt;
string(26) "2025-03-27 00:00:00.000000"
["timezone_type"]=&gt;
int(3)
["timezone"]=&gt;
string(3) "UTC"
}

### Ver también

- [DateTime::\_\_serialize()](#datetime.serialize) - Deserializa un DateTime

# DateTime::\_\_wakeup

# DateTimeImmutable::\_\_wakeup

# DateTimeInterface::\_\_wakeup

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTime::**wakeup -- DateTimeImmutable::**wakeup -- DateTimeInterface::**wakeup — El manejador **wakeup

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
public **DateTime::\_\_wakeup**(): [void](language.types.void.html)

[#[\Deprecated]](class.deprecated.html)
public **DateTimeImmutable::\_\_wakeup**(): [void](language.types.void.html)

[#[\Deprecated]](class.deprecated.html)
public **DateTimeInterface::\_\_wakeup**(): [void](language.types.void.html)

El manejador [\_\_wakeup()](#object.wakeup).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Inicializa un objeto DateTime.

## Tabla de contenidos

- [DateTimeInterface::diff](#datetime.diff) — Devuelve la diferencia entre dos objetos DateTime
- [DateTimeInterface::format](#datetime.format) — Retorna una fecha formateada según el formato proporcionado
- [DateTimeInterface::getOffset](#datetime.getoffset) — Devuelve el desplazamiento horario
- [DateTimeInterface::getTimestamp](#datetime.gettimestamp) — Obtiene el timestamp Unix
- [DateTimeInterface::getTimezone](#datetime.gettimezone) — Devuelve la zona horaria relativa al DateTime proporcionado
- [DateTime::\_\_serialize](#datetime.serialize) — Deserializa un DateTime
- [DateTime::\_\_unserialize](#datetime.unserialize) — Deserializar un DateTime
- [DateTime::\_\_wakeup](#datetime.wakeup) — El manejador \_\_wakeup

# La clase DateTimeZone

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

## Introducción

    Representación de una zona horaria.

## Sinopsis de la Clase

     class **DateTimeZone**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [AFRICA](#datetimezone.constants.africa);

    public
     const
     [int](#language.types.integer)
      [AMERICA](#datetimezone.constants.america);

    public
     const
     [int](#language.types.integer)
      [ANTARCTICA](#datetimezone.constants.antarctica);

    public
     const
     [int](#language.types.integer)
      [ARCTIC](#datetimezone.constants.arctic);

    public
     const
     [int](#language.types.integer)
      [ASIA](#datetimezone.constants.asia);

    public
     const
     [int](#language.types.integer)
      [ATLANTIC](#datetimezone.constants.atlantic);

    public
     const
     [int](#language.types.integer)
      [AUSTRALIA](#datetimezone.constants.australia);

    public
     const
     [int](#language.types.integer)
      [EUROPE](#datetimezone.constants.europe);

    public
     const
     [int](#language.types.integer)
      [INDIAN](#datetimezone.constants.indian);

    public
     const
     [int](#language.types.integer)
      [PACIFIC](#datetimezone.constants.pacific);

    public
     const
     [int](#language.types.integer)
      [UTC](#datetimezone.constants.utc);

    public
     const
     [int](#language.types.integer)
      [ALL](#datetimezone.constants.all);

    public
     const
     [int](#language.types.integer)
      [ALL_WITH_BC](#datetimezone.constants.all-with-bc);

    public
     const
     [int](#language.types.integer)
      [PER_COUNTRY](#datetimezone.constants.per-country);


    /* Métodos */

public [\_\_construct](#datetimezone.construct)([string](#language.types.string) $timezone)

    public [getLocation](#datetimezone.getlocation)(): [array](#language.types.array)|[false](#language.types.singleton)

public [getName](#datetimezone.getname)(): [string](#language.types.string)
public [getOffset](#datetimezone.getoffset)([DateTimeInterface](#class.datetimeinterface) $datetime): [int](#language.types.integer)
public [getTransitions](#datetimezone.gettransitions)([int](#language.types.integer) $timestampBegin = **[PHP_INT_MIN](#constant.php-int-min)**, [int](#language.types.integer) $timestampEnd = **[PHP_INT_MAX](#constant.php-int-max)**): [array](#language.types.array)|[false](#language.types.singleton)
public static [listAbbreviations](#datetimezone.listabbreviations)(): [array](#language.types.array)
public static [listIdentifiers](#datetimezone.listidentifiers)([int](#language.types.integer) $timezoneGroup = DateTimeZone::ALL, [?](#language.types.null)[string](#language.types.string) $countryCode = **[null](#constant.null)**): [array](#language.types.array)

}

## Constantes predefinidas

      **[DateTimeZone::AFRICA](#datetimezone.constants.africa)**
      [int](#language.types.integer)


      Zona africana.







      **[DateTimeZone::AMERICA](#datetimezone.constants.america)**
      [int](#language.types.integer)


      Zona americana.







      **[DateTimeZone::ANTARCTICA](#datetimezone.constants.antarctica)**
      [int](#language.types.integer)


      Zona antártica.







      **[DateTimeZone::ARCTIC](#datetimezone.constants.arctic)**
      [int](#language.types.integer)


      Zona ártica.







      **[DateTimeZone::ASIA](#datetimezone.constants.asia)**
      [int](#language.types.integer)


      Zona asiática.







      **[DateTimeZone::ATLANTIC](#datetimezone.constants.atlantic)**
      [int](#language.types.integer)


      Zona atlántica.







      **[DateTimeZone::AUSTRALIA](#datetimezone.constants.australia)**
      [int](#language.types.integer)


      Zona australiana.







      **[DateTimeZone::EUROPE](#datetimezone.constants.europe)**
      [int](#language.types.integer)


      Zona europea.







      **[DateTimeZone::INDIAN](#datetimezone.constants.indian)**
      [int](#language.types.integer)


      Zona india.







      **[DateTimeZone::PACIFIC](#datetimezone.constants.pacific)**
      [int](#language.types.integer)


      Zona del Pacífico.







      **[DateTimeZone::UTC](#datetimezone.constants.utc)**
      [int](#language.types.integer)


      Zona UTC.







      **[DateTimeZone::ALL](#datetimezone.constants.all)**
      [int](#language.types.integer)


      Todas las zonas.







      **[DateTimeZone::ALL_WITH_BC](#datetimezone.constants.all-with-bc)**
      [int](#language.types.integer)


      Todas las zonas, incluyendo las antiguas.







      **[DateTimeZone::PER_COUNTRY](#datetimezone.constants.per-country)**
      [int](#language.types.integer)


      Zonas horarias por país.




## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.





# DateTimeZone::\_\_construct

# timezone_open

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::\_\_construct -- timezone_open — Crea un nuevo objeto [DateTimeZone](#class.datetimezone)

### Descripción

Estilo orientado a objetos

public **DateTimeZone::\_\_construct**([string](#language.types.string) $timezone)

Estilo procedimental

[timezone_open](#function.timezone-open)([string](#language.types.string) $timezone): [DateTimeZone](#class.datetimezone)|[false](#language.types.singleton)

Crea un nuevo objeto [DateTimeZone](#class.datetimezone).

Un objeto DateTimeZone proporciona acceso a tres tipos diferentes de reglas
de zona horaria: un desplazamiento UTC (tipo 1), una
abreviatura de zona horaria (tipo 2), y un
[identificador de zona horaria](#timezones) tal como
se publica en la base de datos de zonas horarias IANA (tipo 3).

El objeto DateTimeZone puede ser adjuntado a los objetos [DateTime](#class.datetime)
y [DateTimeImmutable](#class.datetimeimmutable) con el fin de poder representar
la zona horaria encapsulada por estos objetos en una zona horaria local.

### Parámetros

     timezone


       Una de las [zonas horarias](#timezones) soportadas,
       un valor de desplazamiento (+0200), o una abreviatura de zona (BST).





### Valores devueltos

Devuelve un objeto [DateTimeZone](#class.datetimezone) en caso de éxito.
Estilo procedimental retorna **[false](#constant.false)** en caso de error..

### Errores/Excepciones

Este método lanza una [DateInvalidTimeZoneException](#class.dateinvalidtimezoneexception)
si la zona horaria proporcionada no es reconocida como una zona horaria válida.
Anteriormente a PHP 8.3, esto era una [Exception](#class.exception).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Los valores inválidos ahora lanzan una
        [DateInvalidTimeZoneException](#class.dateinvalidtimezoneexception) en lugar
        de una [Exception](#class.exception) genérica.





### Ejemplos

    **Ejemplo #1 Creación y adjuntado de DateTimeZone a un DateTimeImmutable**

&lt;?php
$d = new DateTimeImmutable("2022-06-02 15:44:48 UTC");

$timezones = [ 'Europe/London', 'GMT+04:45', '-06:00', 'CEST' ];

foreach ($timezones as $tz) {
    $tzo = new DateTimeZone($tz);

    $local = $d-&gt;setTimezone($tzo);
    echo $local-&gt;format(DateTimeInterface::RFC2822 . ' — e') . "\n";

}

    El ejemplo anterior mostrará:

Thu, 02 Jun 2022 16:44:48 +0100 — Europe/London
Thu, 02 Jun 2022 20:29:48 +0445 — +04:45
Thu, 02 Jun 2022 09:44:48 -0600 — -06:00
Thu, 02 Jun 2022 17:44:48 +0200 — CEST

    **Ejemplo #2 Intercepción de errores con [DateTimeZone](#class.datetimezone)**

&lt;?php
// Manejo de errores por intercepción de excepciones
$timezones = array('Europe/London', 'Mars/Phobos', 'Jupiter/Europa');

foreach ($timezones as $tz) {
    try {
        $mars = new DateTimeZone($tz);
echo $mars-&gt;getName() . "\n";
} catch(Exception $e) {
echo $e-&gt;getMessage() . "\n";
}
}

    El ejemplo anterior mostrará:

Europe/London
DateTimeZone::**construct() [datetimezone.--construct]: Unknown or bad timezone (Mars/Phobos)
DateTimeZone::**construct() [datetimezone.--construct]: Unknown or bad timezone (Jupiter/Europa)

# DateTimeZone::getLocation

# timezone_location_get

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateTimeZone::getLocation -- timezone_location_get — Devuelve las informaciones geográficas de una zona horaria

### Descripción

Estilo orientado a objetos

public **DateTimeZone::getLocation**(): [array](#language.types.array)|[false](#language.types.singleton)

Estilo procedimental

[timezone_location_get](#function.timezone-location-get)([DateTimeZone](#class.datetimezone) $object): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve las informaciones geográficas de una zona horaria, incluyendo el
código del país, la latitud y longitud, y comentarios.

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTimeZone](#class.datetimezone)
retornado por [timezone_open()](#function.timezone-open)

### Valores devueltos

Array que contiene las informaciones de localización de la zona horaria o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con DateTimeZone::getLocation()**

&lt;?php
$tz = new DateTimeZone("Asia/Jakarta");
print_r($tz-&gt;getLocation());
print_r(timezone_location_get($tz));

    El ejemplo anterior mostrará:

Array
(
[country_code] =&gt; ID
[latitude] =&gt; -6.16667
[longitude] =&gt; 106.8
[comments] =&gt; Java, Sumatra
)
Array
(
[country_code] =&gt; ID
[latitude] =&gt; -6.16667
[longitude] =&gt; 106.8
[comments] =&gt; Java, Sumatra
)

Los elementos country_code contienen el código de país ISO 3166-1
alfa-2 correspondiente a cada entrada. Los elementos latitude y
longitude indican las coordenadas de la ciudad nombrada
en el identificador de zona horaria, y comments incluye
(cuando no es **[false](#constant.false)**) una indicación de la región del país a la que se aplica dicha
zona horaria. Esta información es adecuada para ser presentada a usuarios finales.

### Ver también

- [DateTimeZone::listIdentifiers()](#datetimezone.listidentifiers) - Devuelve un array numérico que contiene todos los identificadores de zonas horarias definidos para obtener una lista
  completa o parcial de todos los identificadores de zonas horarias soportadas

# DateTimeZone::getName

# timezone_name_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::getName -- timezone_name_get — Devuelve el nombre de la zona horaria

### Descripción

Estilo orientado a objetos

public **DateTimeZone::getName**(): [string](#language.types.string)

Estilo procedimental

[timezone_name_get](#function.timezone-name-get)([DateTimeZone](#class.datetimezone) $object): [string](#language.types.string)

Devuelve el nombre de la zona horaria.

### Parámetros

    object


      El objeto [DateTimeZone](#class.datetimezone) utilizado para recuperar
      el nombre de la zona horaria.


### Valores devueltos

Según el tipo de zona, el desplazamiento UTC (tipo 1), la abreviatura
de zona horaria (tipo 2) y los identificadores de zona horaria
tales como se publican en la base de datos de zonas horarias IANA
(tipo 3), la cadena de descripción para crear un nuevo objeto
[DateTimeZone](#class.datetimezone) con el mismo desplazamiento y/o
las mismas reglas. Por ejemplo 02:00,
CEST o uno de los nombres de zonas horarias
en la [lista de zonas horarias](#timezones).

# DateTimeZone::getOffset

# timezone_offset_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::getOffset -- timezone_offset_get — Retorna el desplazamiento GMT de una zona horaria

### Descripción

Estilo orientado a objetos

public **DateTimeZone::getOffset**([DateTimeInterface](#class.datetimeinterface) $datetime): [int](#language.types.integer)

Estilo procedimental

[timezone_offset_get](#function.timezone-offset-get)([DateTimeZone](#class.datetimezone) $object, [DateTimeInterface](#class.datetimeinterface) $datetime): [int](#language.types.integer)

[timezone_offset_get()](#function.timezone-offset-get) retorna el desplazamiento horario
respecto al GMT para el argumento datetime. El
desplazamiento GMT se calcula a partir de las informaciones de zona horaria
contenidas en el objeto [DateTime](#class.datetime).

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTimeZone](#class.datetimezone)
retornado por [timezone_open()](#function.timezone-open)

     datetime


       Objeto [DateTime](#class.datetime) que contiene la fecha
       para la cual se debe calcular el desplazamiento.





### Valores devueltos

Retorna el desplazamiento horario, expresado en segundos, en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con DateTimeZone::getOffset()**

&lt;?php
// Crea dos objetos zona horaria, uno para Taipei (Taiwán) y uno para
// Tokio (Japón)
$dateTimeZoneTaipei = new DateTimeZone("Asia/Taipei");
$dateTimeZoneJapan = new DateTimeZone("Asia/Tokyo");

// Crea dos objetos DateTime que contienen el mismo timestamp Unix,
// pero están situados en dos zonas horarias diferentes.
$dateTimeTaipei = new DateTime("now", $dateTimeZoneTaipei);
$dateTimeJapan = new DateTime("now", $dateTimeZoneJapan);

// Calcula el desplazamiento horario GMT para el objeto $dateTimeTaipei
// pero utilizando la zona horaria de Tokio
// ($dateTimeZoneJapan).
$timeOffset = $dateTimeZoneJapan-&gt;getOffset($dateTimeTaipei);

// Debería mostrar int(32400) (para las fechas posteriores al Sat Sep 8 01:00:00 1951 JST).
var_dump($timeOffset);

    El ejemplo anterior mostrará:

int(32400)

# DateTimeZone::getTransitions

# timezone_transitions_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::getTransitions -- timezone_transitions_get — Devuelve todas las transiciones de una zona horaria

### Descripción

Estilo orientado a objetos

public **DateTimeZone::getTransitions**([int](#language.types.integer) $timestampBegin = **[PHP_INT_MIN](#constant.php-int-min)**, [int](#language.types.integer) $timestampEnd = **[PHP_INT_MAX](#constant.php-int-max)**): [array](#language.types.array)|[false](#language.types.singleton)

Estilo procedimental

[timezone_transitions_get](#function.timezone-transitions-get)([DateTimeZone](#class.datetimezone) $object, [int](#language.types.integer) $timestampBegin = **[PHP_INT_MIN](#constant.php-int-min)**, [int](#language.types.integer) $timestampEnd = **[PHP_INT_MAX](#constant.php-int-max)**): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

object
Solo en estilo procedimental: un objeto [DateTimeZone](#class.datetimezone)
retornado por [timezone_open()](#function.timezone-open)

     timestampBegin


       Inicio del timestamp.






     timestampEnd


       Fin del timestamp.





### Valores devueltos

Devuelve un array indexado numéricamente de arrays
de transición en caso de éxito, o **[false](#constant.false)** si ocurre un error.
Los objetos DateTimeZone que envuelven zonas horarias de tipo 1 (desplazamiento UTC)
y tipo 2 (abreviaturas) no contienen transiciones y llamar
a este método sobre ellos devolverá **[false](#constant.false)**.

Si timestampBegin es proporcionado, la primera entrada
en el array devuelto contendrá un elemento de transición al tiempo de
timestampBegin.

    <caption>**Estructura de los arrays de transición**</caption>



       Clave
       Tipo
       Descripción






       ts
       [int](#language.types.integer)
       timestamp Unix



       time
       [string](#language.types.string)
       Cadena de tiempo **[DateTimeInterface::ISO8601_EXPANDED](#datetimeinterface.constants.iso8601-expanded)** (PHP
        8.2 y superior), o **[DateTimeInterface::ISO8601](#datetimeinterface.constants.iso8601)** (PHP
        8.1 e inferior)



       offset
       [int](#language.types.integer)
       Desplazamiento horario hacia UTC en segundos



       isdst
       [bool](#language.types.boolean)
       Si la hora de verano está activada



       abbr
       [string](#language.types.string)
       Abreviatura de la zona horaria




### Ejemplos

    **Ejemplo #1 Ejemplo con [timezone_transitions_get()](#function.timezone-transitions-get)**

&lt;?php
$timezone = new DateTimeZone("Europe/London");
$transitions = $timezone-&gt;getTransitions();
print_r(array_slice($transitions, 0, 3));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[ts] =&gt; -2147483648
[time] =&gt; 1901-12-13T20:45:52+00:00
[offset] =&gt; -75
[isdst] =&gt;
[abbr] =&gt; LMT
)

    [1] =&gt; Array
        (
            [ts] =&gt; 442304971
            [time] =&gt; 1847-12-01T00:01:15+00:00
            [offset] =&gt; 0
            [isdst] =&gt;
            [abbr] =&gt; GMT
        )

    [2] =&gt; Array
        (
            [ts] =&gt; -1691964000
            [time] =&gt; 1916-05-21T02:00:00+00:00
            [offset] =&gt; 3600
            [isdst] =&gt; 1
            [abbr] =&gt; BST
        )

)

    **Ejemplo #2 Un ejemplo de [timezone_transitions_get()](#function.timezone-transitions-get) con
     timestampBegin definido**

&lt;?php
$timezone = new DateTimeZone("Europe/London");
$transitions = $timezone-&gt;getTransitions(time());
print_r(array_slice($transitions, 0, 3));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[ts] =&gt; 1759058251
[time] =&gt; 2025-09-28T11:17:31+00:00
[offset] =&gt; 3600
[isdst] =&gt; 1
[abbr] =&gt; BST
)

    [1] =&gt; Array
        (
            [ts] =&gt; 1761440400
            [time] =&gt; 2025-10-26T01:00:00+00:00
            [offset] =&gt; 0
            [isdst] =&gt;
            [abbr] =&gt; GMT
        )

    [2] =&gt; Array
        (
            [ts] =&gt; 1774746000
            [time] =&gt; 2026-03-29T01:00:00+00:00
            [offset] =&gt; 3600
            [isdst] =&gt; 1
            [abbr] =&gt; BST
        )

)

# DateTimeZone::listAbbreviations

# timezone_abbreviations_list

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::listAbbreviations -- timezone_abbreviations_list — Devuelve un array asociativo que describe una zona horaria

### Descripción

Estilo orientado a objetos

public static **DateTimeZone::listAbbreviations**(): [array](#language.types.array)

Estilo procedimental

[timezone_abbreviations_list](#function.timezone-abbreviations-list)(): [array](#language.types.array)

La lista de abreviaturas devuelta contiene todos los usos históricos
de las abreviaturas, lo que puede dar lugar a entradas correctas, pero
confusas. Asimismo, existen conflictos, ya que PST se utiliza tanto
en Estados Unidos como en Filipinas.

La lista que devuelve esta función no es adecuada para construir un
menú de opciones que presente una selección de zonas horarias a los usuarios.

**Nota**:

    Los datos para esta función están precompilados por razones de
    rendimiento y no se actualizan al utilizar una
    [» timezonedb](https://pecl.php.net/package/timezonedb) más reciente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [array](#language.types.array) de abreviaturas de zonas horarias.

### Ejemplos

    **Ejemplo #1 Ejemplo con [timezone_abbreviations_list()](#function.timezone-abbreviations-list)**

&lt;?php
$timezone_abbreviations = DateTimeZone::listAbbreviations();
print_r($timezone_abbreviations["acst"]);

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[dst] =&gt;
[offset] =&gt; 34200
[timezone_id] =&gt; Australia/Adelaide
)

    [1] =&gt; Array
        (
            [dst] =&gt;
            [offset] =&gt; 34200
            [timezone_id] =&gt; Australia/Broken_Hill
        )

    [2] =&gt; Array
        (
            [dst] =&gt;
            [offset] =&gt; 34200
            [timezone_id] =&gt; Australia/Darwin
        )

    [3] =&gt; Array
        (
            [dst] =&gt;
            [offset] =&gt; 34200
            [timezone_id] =&gt; Australia/North
        )

    [4] =&gt; Array
        (
            [dst] =&gt;
            [offset] =&gt; 34200
            [timezone_id] =&gt; Australia/South
        )

    [5] =&gt; Array
        (
            [dst] =&gt;
            [offset] =&gt; 34200
            [timezone_id] =&gt; Australia/Yancowinna
        )

)

### Ver también

    - [timezone_identifiers_list()](#function.timezone-identifiers-list) - Alias de DateTimeZone::listIdentifiers

# DateTimeZone::listIdentifiers

# timezone_identifiers_list

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DateTimeZone::listIdentifiers -- timezone_identifiers_list — Devuelve un array numérico que contiene todos los identificadores de zonas horarias definidos

### Descripción

Estilo orientado a objetos

public static **DateTimeZone::listIdentifiers**([int](#language.types.integer) $timezoneGroup = DateTimeZone::ALL, [?](#language.types.null)[string](#language.types.string) $countryCode = **[null](#constant.null)**): [array](#language.types.array)

Estilo procedimental

[timezone_identifiers_list](#function.timezone-identifiers-list)([int](#language.types.integer) $timezoneGroup = DateTimeZone::ALL, [?](#language.types.null)[string](#language.types.string) $countryCode = **[null](#constant.null)**): [array](#language.types.array)

### Parámetros

     timezoneGroup


       Una (o una combinación) de las constantes de clase [DateTimeZone](#class.datetimezone).






     countryCode


       Un código de país de dos letras (en mayúsculas), compatible con ISO 3166-1.



      **Nota**:

        Esta opción solo está disponible cuando el argumento
        timezoneGroup toma el valor de
        **[DateTimeZone::PER_COUNTRY](#datetimezone.constants.per-country)**.






### Valores devueltos

Devuelve el [array](#language.types.array) de identificadores de zonas horarias.
Solo se devuelven los elementos no obsoletos. Para obtener todo,
incluyendo los identificadores de zonas horarias obsoletos, utilice
DateTimeZone::ALL_WITH_BC como valor para
timezoneGroup.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Anterior a esta versión, **[false](#constant.false)** se devolvía en caso de error.




       7.1.0

        countryCode ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con DateTimeZone::listIdentifiers()**

&lt;?php
$timezone_identifiers = DateTimeZone::listIdentifiers();
for ($i=0; $i &lt; 5; $i++) {
    echo "$timezone_identifiers[$i]\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Africa/Abidjan
Africa/Accra
Africa/Addis_Ababa
Africa/Algiers
Africa/Asmara

    **Ejemplo #2 Listar identificadores para una región específica**

&lt;?php
$timezone_identifiers = DateTimeZone::listIdentifiers( DateTimeZone::ASIA );
for ($i=0; $i &lt; 5; $i++) {
    echo "$timezone_identifiers[$i]\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Asia/Aden
Asia/Almaty
Asia/Amman
Asia/Anadyr
Asia/Aqtau

    **Ejemplo #3 Listar identificadores de múltiples regiones**

&lt;?php
$timezone_identifiers = DateTimeZone::listIdentifiers( DateTimeZone::ASIA | DateTimeZone::PACIFIC );
echo join( ', ', $timezone_identifiers );
?&gt;

    Resultado del ejemplo anterior es similar a:

Asia/Aden, Asia/Almaty, Asia/Amman, Asia/Anadyr, Asia/Aqtau, Asia/Aqtobe,
Asia/Ashgabat, Asia/Atyrau, Asia/Baghdad, Asia/Bahrain, Asia/Baku,
Asia/Bangkok, Asia/Barnaul, Asia/Beirut, Asia/Bishkek, Asia/Brunei,
Asia/Chita, Asia/Choibalsan, Asia/Colombo, Asia/Damascus, Asia/Dhaka,
Asia/Dili, Asia/Dubai, Asia/Dushanbe, Asia/Famagusta, Asia/Gaza, Asia/Hebron,
Asia/Ho_Chi_Minh, Asia/Hong_Kong, Asia/Hovd, Asia/Irkutsk, Asia/Jakarta,
Asia/Jayapura, Asia/Jerusalem, Asia/Kabul, Asia/Kamchatka, Asia/Karachi,
Asia/Kathmandu, Asia/Khandyga, Asia/Kolkata, Asia/Krasnoyarsk,
Asia/Kuala_Lumpur, Asia/Kuching, Asia/Kuwait, Asia/Macau, Asia/Magadan,
Asia/Makassar, Asia/Manila, Asia/Muscat, Asia/Nicosia, Asia/Novokuznetsk,
Asia/Novosibirsk, Asia/Omsk, Asia/Oral, Asia/Phnom_Penh, Asia/Pontianak,
Asia/Pyongyang, Asia/Qatar, Asia/Qostanay, Asia/Qyzylorda, Asia/Riyadh,
Asia/Sakhalin, Asia/Samarkand, Asia/Seoul, Asia/Shanghai, Asia/Singapore,
Asia/Srednekolymsk, Asia/Taipei, Asia/Tashkent, Asia/Tbilisi, Asia/Tehran,
Asia/Thimphu, Asia/Tokyo, Asia/Tomsk, Asia/Ulaanbaatar, Asia/Urumqi,
Asia/Ust-Nera, Asia/Vientiane, Asia/Vladivostok, Asia/Yakutsk, Asia/Yangon,
Asia/Yekaterinburg, Asia/Yerevan, Pacific/Apia, Pacific/Auckland,
Pacific/Bougainville, Pacific/Chatham, Pacific/Chuuk, Pacific/Easter,
Pacific/Efate, Pacific/Fakaofo, Pacific/Fiji, Pacific/Funafuti,
Pacific/Galapagos, Pacific/Gambier, Pacific/Guadalcanal, Pacific/Guam,
Pacific/Honolulu, Pacific/Kanton, Pacific/Kiritimati, Pacific/Kosrae,
Pacific/Kwajalein, Pacific/Majuro, Pacific/Marquesas, Pacific/Midway,
Pacific/Nauru, Pacific/Niue, Pacific/Norfolk, Pacific/Noumea,
Pacific/Pago_Pago, Pacific/Palau, Pacific/Pitcairn, Pacific/Pohnpei,
Pacific/Port_Moresby, Pacific/Rarotonga, Pacific/Saipan, Pacific/Tahiti,
Pacific/Tarawa, Pacific/Tongatapu, Pacific/Wake, Pacific/Wallis

    **Ejemplo #4 Listar identificadores de un solo país**

&lt;?php
$timezone_identifiers = DateTimeZone::listIdentifiers( DateTimeZone::PER_COUNTRY, "UA" );
foreach( $timezone_identifiers as $identifier ) {
    echo "$identifier\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Europe/Kyiv
Europe/Simferopol
Europe/Uzhgorod
Europe/Zaporozhye

### Ver también

    - [timezone_abbreviations_list()](#function.timezone-abbreviations-list) - Alias de DateTimeZone::listAbbreviations

## Tabla de contenidos

- [DateTimeZone::\_\_construct](#datetimezone.construct) — Crea un nuevo objeto DateTimeZone
- [DateTimeZone::getLocation](#datetimezone.getlocation) — Devuelve las informaciones geográficas de una zona horaria
- [DateTimeZone::getName](#datetimezone.getname) — Devuelve el nombre de la zona horaria
- [DateTimeZone::getOffset](#datetimezone.getoffset) — Retorna el desplazamiento GMT de una zona horaria
- [DateTimeZone::getTransitions](#datetimezone.gettransitions) — Devuelve todas las transiciones de una zona horaria
- [DateTimeZone::listAbbreviations](#datetimezone.listabbreviations) — Devuelve un array asociativo que describe una zona horaria
- [DateTimeZone::listIdentifiers](#datetimezone.listidentifiers) — Devuelve un array numérico que contiene todos los identificadores de zonas horarias definidos

# La clase DateInterval

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Representa un intervalo de fechas.




    Un intervalo de fechas almacena o bien una cantidad fija de instantes (en años, meses,
    días, horas, etc.) o bien una cadena con un instante relativo en el formato que
    admiten los constructores de [DateTimeImmutable](#class.datetimeimmutable) y
    [DateTime](#class.datetime).




    Más especificamente, la información en un objeto de la clase
    **DateInterval** es una instrucción para llegar de
    un instante de fecha/hora a otro instante de fecha/hora. Este proceso no es siempre reversible.




    Un modo común de crear un objeto **DateInterval**
    es calculando la diferencia entre dos objetos de fecha/hora a través de
    [DateTimeInterface::diff()](#datetime.diff).




    Dado que no hay una forma bien definida de comparar intervalos de fechas,
    las instancias de **DateInterval** son
    [incomparables](#language.operators.comparison.incomparable).

## Sinopsis de la Clase

     class **DateInterval**
     {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$y](#dateinterval.props.y);

    public
     [int](#language.types.integer)
      [$m](#dateinterval.props.m);

    public
     [int](#language.types.integer)
      [$d](#dateinterval.props.d);

    public
     [int](#language.types.integer)
      [$h](#dateinterval.props.h);

    public
     [int](#language.types.integer)
      [$i](#dateinterval.props.i);

    public
     [int](#language.types.integer)
      [$s](#dateinterval.props.s);

    public
     [float](#language.types.float)
      [$f](#dateinterval.props.f);

    public
     [int](#language.types.integer)
      [$invert](#dateinterval.props.invert);

    public
     [mixed](#language.types.mixed)
      [$days](#dateinterval.props.days);

    public
     [bool](#language.types.boolean)
      [$from_string](#dateinterval.props.from-string);

    public
     [string](#language.types.string)
      [$date_string](#dateinterval.props.date-string);


    /* Métodos */

public [\_\_construct](#dateinterval.construct)([string](#language.types.string) $duration)

    public static [createFromDateString](#dateinterval.createfromdatestring)([string](#language.types.string) $datetime): [DateInterval](#class.dateinterval)

public [format](#dateinterval.format)([string](#language.types.string) $format): [string](#language.types.string)

}

## Propiedades

**Advertencia**

     El listado de propiedades disponibles que se muestra a continuación depende de la versión de PHP, y deben
     considerarse como de *solo lectura*.






     y


       Número de años.






     m


       Número de meses.






     d


       Número de días.






     h


       Número de horas.






     i


       Número de minutos.






     s


       Número de segundos.






     f


       Número de microsegundos, como fracción de un segundo.






     invert


       Es 1 si el intervalo
       representa un periodo de tiempo negativo y
       0 en caso contrario.
       Véase [DateInterval::format()](#dateinterval.format).






     days


       If the DateInterval object was created by
       [DateTimeImmutable::diff()](#datetime.diff) or
       [DateTime::diff()](#datetime.diff), then this is the
       total number of full days between the start and end dates. Otherwise,
       days will be **[false](#constant.false)**.






     from_string


       Si el objeto DateInterval fue creado por
       [DateInterval::createFromDateString()](#dateinterval.createfromdatestring), entonces
       esta propiedad tendrá el valor **[true](#constant.true)**, y será establecida la propiedad
       date_string. De lo contrario,
       el valor será **[false](#constant.false)**, y serán establecidas las propiedades y a
       f, invert, y
       days.






     date_string


       La cadena usada como argumento en
       [DateInterval::createFromDateString()](#dateinterval.createfromdatestring).





## Historial de cambios

        Versión
        Descripción






        8.2.0

         Se han añadido las propiedades from_string y date_string
         para las instancias de **DateInterval**
         que fueron creadas usando el
         método [DateInterval::createFromDateString()](#dateinterval.createfromdatestring).




        8.2.0

         Solo las propiedades y a f,
         invert, y days serán visibles.




        7.4.0

         Ahora las instancias de **DateInterval** son incomparables;
         anteriormente, todas las instancias de **DateInterval** se consideraban iguales.




        7.1.0
        Se ha añadido la propiedad f.





# DateInterval::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateInterval::\_\_construct — Crea un nuevo objeto DateInterval

### Descripción

public **DateInterval::\_\_construct**([string](#language.types.string) $duration)

Crea un nuevo objeto DateInterval.

### Parámetros

     duration


       Una especificación de intervalo.




       El formato empieza con la letra P,
       de periodo.
       Cada periodo de duración está representado por un valor de tipo integer
       seguido de un indicador de periodo.
       Si la duración contiene elementos de hora, esa parte
       de la especificación estará precedida por una letra
       T.







        <caption>**
         Indicadores de periodo de duration
        **</caption>



           Indicador de periodo
           Descripción






           Y
           años



           M
           meses



           D
           días



           W

            semanas; estas se convierten a días,
            Antes de PHP 8.0.0, no se puede combinar con D.




           H
           horas



           M
           minutos



           S
           segundos








       Algunos ejemplos sencillos:
       Dos días es P2D.
       Dos segundos es PT2S.
       Seis años y cinco minutos es P6YT5M.



      **Nota**:



        Los tipos de unidades deben ser escritos desde la unidad de
        escala más grande a la izquierda a la unidad de escala más pequeña
        a la derecha.
        Así los años van antes que los meses, meses antes que días,
        días antes que minutos, etc.
        Así un año y cuatro días debe representarse como
        P1Y4D, y no como P4D1Y.





       La especificación también puede ser representada como una fecha/hora.
       Un ejemplo de un año y cuatro días sería
       P0001-00-04T00:00:00.
       Pero los valores en este formato no pueden exceder el punto de desbordamiento
       de un periodo (p.ej. 25 horas no es válido).




       Estos formatos están basados en la [» 
       especificación de duración ISO 8601](http://en.wikipedia.org/wiki/Iso8601#Durations).





### Errores/Excepciones

Lanza una [DateMalformedIntervalStringException](#class.datemalformedintervalstringexception) cuando
el duration no puede ser analizado como un intervalo.
Antes de PHP 8.3, esto era [Exception](#class.exception).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza
       [DateMalformedIntervalStringException](#class.datemalformedintervalstringexception)
       en lugar de [Exception](#class.exception).




      8.2.0

       Solo serán visibles las propiedades y a f,
       invert y days, incluyendo una nueva
       propiedad booleana from_string.




      8.0.0

       W se puede combinar con D.



### Ejemplos

    **Ejemplo #1 Construyendo y usando objetos [DateInterval](#class.dateinterval)**

&lt;?php
// Crea una fecha especifica
$someDate = \DateTime::createFromFormat("Y-m-d H:i", "2022-08-25 14:18");

// Crea un intervalo
$interval = new \DateInterval("P7D");

// Añade el intervalo
$someDate-&gt;add($interval);

// Convierte el intervalo a string
echo $interval-&gt;format("%d");

    El ejemplo anterior mostrará:

7

    **Ejemplo #2 Ejemplo de [DateInterval](#class.dateinterval)**

&lt;?php
$interval = new DateInterval('P1W2D');
var_dump($interval);

    Resultado del ejemplo anterior en PHP 8.2:

object(DateInterval)#1 (10) {
["y"]=&gt;
int(0)
["m"]=&gt;
int(0)
["d"]=&gt;
int(9)
["h"]=&gt;
int(0)
["i"]=&gt;
int(0)
["s"]=&gt;
int(0)
["f"]=&gt;
float(0)
["invert"]=&gt;
int(0)
["days"]=&gt;
bool(false)
["from_string"]=&gt;
bool(false)
}

    Resultado del ejemplo anterior en PHP 8:

object(DateInterval)#1 (16) {
["y"]=&gt;
int(0)
["m"]=&gt;
int(0)
["d"]=&gt;
int(9)
["h"]=&gt;
int(0)
["i"]=&gt;
int(0)
["s"]=&gt;
int(0)
["f"]=&gt;
float(0)
["weekday"]=&gt;
int(0)
["weekday_behavior"]=&gt;
int(0)
["first_last_day_of"]=&gt;
int(0)
["invert"]=&gt;
int(0)
["days"]=&gt;
bool(false)
["special_type"]=&gt;
int(0)
["special_amount"]=&gt;
int(0)
["have_weekday_relative"]=&gt;
int(0)
["have_special_relative"]=&gt;
int(0)
}

    Resultado del ejemplo anterior en PHP 7:



     object(DateInterval)#1 (16) {

["y"]=&gt;
int(0)
["m"]=&gt;
int(0)
["d"]=&gt;
int(2)
["h"]=&gt;
int(0)
["i"]=&gt;
int(0)
["s"]=&gt;
int(0)
["f"]=&gt;
float(0)
["weekday"]=&gt;
int(0)
["weekday_behavior"]=&gt;
int(0)
["first_last_day_of"]=&gt;
int(0)
["invert"]=&gt;
int(0)
["days"]=&gt;
bool(false)
["special_type"]=&gt;
int(0)
["special_amount"]=&gt;
int(0)
["have_weekday_relative"]=&gt;
int(0)
["have_special_relative"]=&gt;
int(0)
}

### Ver también

    - [DateInterval::format()](#dateinterval.format) - Formatea el intervalo

    - [DateTime::add()](#datetime.add) - Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos

    - [DateTime::sub()](#datetime.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto

DateTime

    - [DateTime::diff()](#datetime.diff) - Devuelve la diferencia entre dos objetos DateTime

# DateInterval::createFromDateString

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateInterval::createFromDateString — Establece un objeto DateInterval desde las partes relativas de una cadena

### Descripción

Estilo orientado a objetos

public static **DateInterval::createFromDateString**([string](#language.types.string) $datetime): [DateInterval](#class.dateinterval)

Estilo procedimental

[date_interval_create_from_date_string](#function.date-interval-create-from-date-string)([string](#language.types.string) $datetime): [DateInterval](#class.dateinterval)|[false](#language.types.singleton)

Usas los analizadores de fecha/hora como los usados en el constructor de
[DateTimeImmutable](#class.datetimeimmutable) para crear un
[DateInterval](#class.dateinterval) desde las partes relativas de la
cadena analizada.

### Parámetros

     datetime


       Una fecha con partes relativas. Específicamente, los
       [formatos relativos](#datetime.formats.relative)
       admitidos por el analizador utilizados por [DateTimeImmutable](#class.datetimeimmutable),
       [DateTime](#class.datetime), y [strtotime()](#function.strtotime)
       serán los empleados para construir el objeto DateInterval




       Para usar un string con formato ISO-8601 como P7D, debes
       usar [DateInterval::__construct()](#dateinterval.construct).





### Valores devueltos

Devuelve [DateInterval](#class.dateinterval) en caso de éxito.
Estilo procedimental retorna **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Solo en la API Orientada a Objetos: Si se pasa una cadena de fecha/hora inválida,
se lanza [DateMalformedStringException](#class.datemalformedstringexception).

### Historial de cambios

      Versión
      Descripción






      8.3.0

       **DateInterval::createFromDateString()** ahora lanza
       [DateMalformedStringException](#class.datemalformedstringexception) si se pasa
       una cadena inválida. Anteriormente, devolvía false,
       y emitía una advertencia.
       [date_interval_create_from_date_string()](#function.date-interval-create-from-date-string) no ha
       cambiado.




      8.2.0

       Las propiedades from_string y
       date_string solo serán visibles cuando se crea un
       [DateInterval](#class.dateinterval) con este método.



### Ejemplos

    **Ejemplo #1 Analizando intervalos de fechas válidos**

&lt;?php
// Each set of intervals is equal.
$i = new DateInterval('P1D');
$i = DateInterval::createFromDateString('1 day');

$i = new DateInterval('P2W');
$i = DateInterval::createFromDateString('2 weeks');

$i = new DateInterval('P3M');
$i = DateInterval::createFromDateString('3 months');

$i = new DateInterval('P4Y');
$i = DateInterval::createFromDateString('4 years');

$i = new DateInterval('P1Y1D');
$i = DateInterval::createFromDateString('1 year + 1 day');

$i = new DateInterval('P1DT12H');
$i = DateInterval::createFromDateString('1 day + 12 hours');

$i = new DateInterval('PT3600S');
$i = DateInterval::createFromDateString('3600 seconds');

    **Ejemplo #2 Analizando combinaciones e intervalos negativos**

&lt;?php
$i = DateInterval::createFromDateString('62 weeks + 1 day + 2 weeks + 2 hours + 70 minutes');
echo $i-&gt;format('%d %h %i'), "\n";

$i = DateInterval::createFromDateString('1 year - 10 days');
echo $i-&gt;format('%y %d'), "\n";

    El ejemplo anterior mostrará:

449 2 70
1 -10

    **Ejemplo #3 Analizando intervalos de fechas relativas especiales**

&lt;?php
$i = DateInterval::createFromDateString('last day of next month');
var_dump($i);

$i = DateInterval::createFromDateString('last weekday');
var_dump($i);

    Resultado del ejemplo anterior en PHP 8.2:

object(DateInterval)#1 (2) {
["from_string"]=&gt;
bool(true)
["date_string"]=&gt;
string(22) "last day of next month"
}
object(DateInterval)#2 (2) {
["from_string"]=&gt;
bool(true)
["date_string"]=&gt;
string(12) "last weekday"
}

    Resultado del ejemplo anterior en PHP 8 es similar a:

object(DateInterval)#1 (16) {
["y"]=&gt;
int(0)
["m"]=&gt;
int(1)
["d"]=&gt;
int(0)
["h"]=&gt;
int(0)
["i"]=&gt;
int(0)
["s"]=&gt;
int(0)
["f"]=&gt;
float(0)
["weekday"]=&gt;
int(0)
["weekday_behavior"]=&gt;
int(0)
["first_last_day_of"]=&gt;
int(2)
["invert"]=&gt;
int(0)
["days"]=&gt;
bool(false)
["special_type"]=&gt;
int(0)
["special_amount"]=&gt;
int(0)
["have_weekday_relative"]=&gt;
int(0)
["have_special_relative"]=&gt;
int(0)
}
object(DateInterval)#2 (16) {
["y"]=&gt;
int(0)
["m"]=&gt;
int(0)
["d"]=&gt;
int(0)
["h"]=&gt;
int(0)
["i"]=&gt;
int(0)
["s"]=&gt;
int(0)
["f"]=&gt;
float(0)
["weekday"]=&gt;
int(0)
["weekday_behavior"]=&gt;
int(0)
["first_last_day_of"]=&gt;
int(0)
["invert"]=&gt;
int(0)
["days"]=&gt;
bool(false)
["special_type"]=&gt;
int(1)
["special_amount"]=&gt;
int(-1)
["have_weekday_relative"]=&gt;
int(0)
["have_special_relative"]=&gt;
int(1)
}

# DateInterval::format

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DateInterval::format — Formatea el intervalo

### Descripción

public **DateInterval::format**([string](#language.types.string) $format): [string](#language.types.string)

Formatea el intervalo.

### Parámetros

     format





        <caption>**
         Los siguientes caracteres están reconocidos en el
         parámetro de cadena format.
         Cada carácter de formato debe ser prefijado con un signo de porcentaje
         (%).
        **</caption>



           Carácter format
           Descripción
           Valores de ejemplo






           %
           Literal %
           %



           Y
           Años, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03



           y
           Años, numérico
           1, 3



           M
           Meses, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03, 12



           m
           Meses, numérico
           1, 3, 12



           D
           Días, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03, 31



           d
           Días, numérico
           1, 3, 31



           a
           Número total de días como resultado de una operación con [DateTime::diff()](#datetime.diff), o de lo contrario (unknown)
           4, 18, 8123



           H
           Horas, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03, 23



           h
           Horas, numérico
           1, 3, 23



           I
           Minutos, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03, 59



           i
           Minutos, numérico
           1, 3, 59



           S
           Segundos, numérico, al menos 2 dígitos con 0 a la izquierda
           01, 03, 57



           s
           Segundos, numérico
           1, 3, 57



           F
           Microsegundos, numérico, al menos 6 dígitos con 0 a la izquierda
           0
           007701, 052738, 428291



           f
           Microsegundos, numérico
           7701, 52738, 428291



           R
           Signo "-" cuando es negativo, "+" cuando es positivo
           -, +



           r
           Signo "-" cuando es negativo, vacío cuando es positivo
           -,









### Valores devueltos

Devuelve el intervalo formateado.

### Historial de cambios

       Versión
       Descripción






       7.2.12

        Los caracteres de formato F y f
        ahora siempre serán positivos.




       7.1.0

        Se han añadido los caracteres de formato
        F y f.





### Ejemplos

    **Ejemplo #1 Ejemplo de [DateInterval](#class.dateinterval)**

&lt;?php
$interval = new DateInterval('P2Y4DT6H8M');
echo $interval-&gt;format('%d days');

    El ejemplo anterior mostrará:

4 days

    **Ejemplo #2 [DateInterval](#class.dateinterval) y excesos**



     &lt;?php

$interval = new DateInterval('P32D');
echo $interval-&gt;format('%d days');

    El ejemplo anterior mostrará:

32 days

    **Ejemplo #3
     [DateInterval](#class.dateinterval) y
     [DateTime::diff()](#datetime.diff) con los modificadores %a y %d
    **



     &lt;?php

$january = new DateTime('2010-01-01');
$february = new DateTime('2010-02-01');
$interval = $february-&gt;diff($january);

// %a imprimirá el múmero total de días.
echo $interval-&gt;format('%a total days')."\n";

// Mientras que %d sólo imprimirá el múmero total de días no cubiertos por el
// mes.
echo $interval-&gt;format('%m month, %d days');

    El ejemplo anterior mostrará:

31 total days
1 month, 0 days

### Notas

**Nota**:

    El método **DateInterval::format()** no
    recalcula los desbordamientos en los strings de tiempo ni en los segmentos de fecha. Esto
    se espera porque no es posible desbordar valores como "32 días"
    que podrían interpretarse en algo como, desde "1 mes y 4 días"
    hasta "1 mes y 1 día".

### Ver también

    - [DateTime::diff()](#datetime.diff) - Devuelve la diferencia entre dos objetos DateTime

## Tabla de contenidos

- [DateInterval::\_\_construct](#dateinterval.construct) — Crea un nuevo objeto DateInterval
- [DateInterval::createFromDateString](#dateinterval.createfromdatestring) — Establece un objeto DateInterval desde las partes relativas de una cadena
- [DateInterval::format](#dateinterval.format) — Formatea el intervalo

# La clase DatePeriod

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Representa un período de fechas.




    Un período de fechas permite iterar a través
    de un conjunto de fechas y horas, ocurriendo a intervalos regulares,
    durante un período determinado.

## Sinopsis de la Clase

     class **DatePeriod**



     implements
      [IteratorAggregate](#class.iteratoraggregate) {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date);

    public
     const
     [int](#language.types.integer)
      [INCLUDE_END_DATE](#dateperiod.constants.include-end-date);


    /* Propiedades */
    public
     readonly
     ?[DateTimeInterface](#class.datetimeinterface)
      [$start](#dateperiod.props.start);

    public
     readonly
     ?[DateTimeInterface](#class.datetimeinterface)
      [$current](#dateperiod.props.current);

    public
     readonly
     ?[DateTimeInterface](#class.datetimeinterface)
      [$end](#dateperiod.props.end);

    public
     readonly
     ?[DateInterval](#class.dateinterval)
      [$interval](#dateperiod.props.interval);

    public
     readonly
     [int](#language.types.integer)
      [$recurrences](#dateperiod.props.recurrences);

    public
     readonly
     [bool](#language.types.boolean)
      [$include_start_date](#dateperiod.props.include-start-date);

    public
     readonly
     [bool](#language.types.boolean)
      [$include_end_date](#dateperiod.props.include-end-date);


    /* Métodos */

public [\_\_construct](#dateperiod.construct)(
    [DateTimeInterface](#class.datetimeinterface) $start,
    [DateInterval](#class.dateinterval) $interval,
    [int](#language.types.integer) $recurrences,
    [int](#language.types.integer) $options = 0
)
public [\_\_construct](#dateperiod.construct)(
    [DateTimeInterface](#class.datetimeinterface) $start,
    [DateInterval](#class.dateinterval) $interval,
    [DateTimeInterface](#class.datetimeinterface) $end,
    [int](#language.types.integer) $options = 0
)
public [\_\_construct](#dateperiod.construct)([string](#language.types.string) $isostr, [int](#language.types.integer) $options = 0)

    public static [createFromISO8601String](#dateperiod.createfromiso8601string)([string](#language.types.string) $specification, [int](#language.types.integer) $options = 0): static

public [getDateInterval](#dateperiod.getdateinterval)(): [DateInterval](#class.dateinterval)
public [getEndDate](#dateperiod.getenddate)(): [?](#language.types.null)[DateTimeInterface](#class.datetimeinterface)
public [getRecurrences](#dateperiod.getrecurrences)(): [?](#language.types.null)[int](#language.types.integer)
public [getStartDate](#dateperiod.getstartdate)(): [DateTimeInterface](#class.datetimeinterface)

}

## Constantes predefinidas

      **[DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)**
      [int](#language.types.integer)


      Excluye la fecha de inicio, utilizada por [DatePeriod::__construct()](#dateperiod.construct).







      **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)**
      [int](#language.types.integer)


      Incluye la fecha de fin, utilizada por [DatePeriod::__construct()](#dateperiod.construct).




## Propiedades

     recurrences


       La cantidad mínima de instancias devueltas por el iterador.




       Si el número de recurrencias ha sido explícitamente pasado
       mediante el argumento $recurrences en el constructor de la instancia
       **DatePeriod**, entonces esta propiedad contiene ese valor,
       *más* uno si la fecha de inicio no ha sido desactivada por
      **[DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)**, *más*
      uno si la fecha de fin ha sido activada por
       **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)**.




       Si el número de recurrencias no ha sido explícitamente pasado, entonces esta
       propiedad contiene el número mínimo de instancias devueltas. Esto sería
       0, *más* uno si la fecha de inicio no
       ha sido desactivada por **[DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)**,
       *más* uno si la fecha de fin ha sido activada por
       **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)**.









&lt;?php
$start = new DateTime('2018-12-31 00:00:00');
$end = new DateTime('2021-12-31 00:00:00');
$interval = new DateInterval('P1M');
$recurrences = 5;

// recurrencias explícitamente definidas por el constructor
$period = new DatePeriod($start, $interval, $recurrences, DatePeriod::EXCLUDE_START_DATE);
echo $period-&gt;recurrences, "\n";

$period = new DatePeriod($start, $interval, $recurrences);
echo $period-&gt;recurrences, "\n";

$period = new DatePeriod($start, $interval, $recurrences, DatePeriod::INCLUDE_END_DATE);
echo $period-&gt;recurrences, "\n";

// recurrencias no definidas en el constructor
$period = new DatePeriod($start, $interval, $end);
echo $period-&gt;recurrences, "\n";

$period = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
echo $period-&gt;recurrences, "\n";

         El ejemplo anterior mostrará:




5
6
7
1
0

       Ver también [DatePeriod::getRecurrences()](#dateperiod.getrecurrences).






     include_end_date


       Incluye o no la fecha de fin en el conjunto de fechas recurrentes.






     include_start_date


       Si se debe incluir la fecha de inicio en el conjunto de fechas recurrentes
       o no.






     start


       La fecha de inicio del período.






     current


       Durante la iteración, esto contendrá la fecha del día en el período.






     end


       La fecha de fin del período.






     interval


       Una especificación de intervalo repetitivo ISO 8601.





## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.




       8.2.0

        La constante **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)** y
        la propiedad include_end_date han sido añadidas.




       8.0.0

        La clase **DatePeriod** ahora implementa [IteratorAggregate](#class.iteratoraggregate).
        Anteriormente, solo [Traversable](#class.traversable) era implementada.





# DatePeriod::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DatePeriod::\_\_construct — Crea un nuevo objeto [DatePeriod](#class.dateperiod)

### Descripción

public **DatePeriod::\_\_construct**(
    [DateTimeInterface](#class.datetimeinterface) $start,
    [DateInterval](#class.dateinterval) $interval,
    [int](#language.types.integer) $recurrences,
    [int](#language.types.integer) $options = 0
)

public **DatePeriod::\_\_construct**(
    [DateTimeInterface](#class.datetimeinterface) $start,
    [DateInterval](#class.dateinterval) $interval,
    [DateTimeInterface](#class.datetimeinterface) $end,
    [int](#language.types.integer) $options = 0
)

**Advertencia**

    La siguiente variante del constructor ha quedado obsoleta:




    public **DatePeriod::__construct**([string](#language.types.string) $isostr, [int](#language.types.integer) $options = 0)


    En su lugar, debería utilizarse el constructor virtual (factory method) estático
    [DatePeriod::createFromISO8601String()](#dateperiod.createfromiso8601string).

Crea un nuevo objeto [DatePeriod](#class.dateperiod).

Los objetos [DatePeriod](#class.dateperiod) pueden ser utilizados como iterador para
generar un cierto número de objetos [DateTimeImmutable](#class.datetimeimmutable) o
[DateTime](#class.datetime) a partir de una start
fecha (fecha de inicio), un interval, y una end
fecha (fecha de fin) o del número de recurrences.

La clase de los objetos devueltos es equivalente a la clase ancestro
[DateTimeImmutable](#class.datetimeimmutable) o [DateTime](#class.datetime)
proporcionada por el objeto start.

### Parámetros

     start


       La fecha de inicio del período. Incluida por omisión en el conjunto
       de resultados.






     interval


       El intervalo entre las recurrencias del período.






     recurrences


       El número de recurrencias. Debe ser mayor que 0.
       El número de resultados devueltos es superior en una unidad, ya que la fecha de
       inicio está incluida en el conjunto de resultados por omisión.






     end


       La fecha de fin del período. No incluida por omisión en el conjunto
       de resultados.






     isostr


       Un subconjunto de la
       [» 
       especificación ISO 8601 de la repetición del intervalo](http://en.wikipedia.org/wiki/Iso8601#Repeating_intervals).




       Ejemplos de algunas funcionalidades de especificación de intervalo
       ISO 8601 que PHP no soporta:




       -

         Las ocurrencias cero (R0/)



       -

         Desplazamientos horarios distintos de UTC (Z), tales como +02:00.







     options


       Un campo de bits que puede ser utilizado para controlar ciertos
       comportamientos con las fechas de inicio y fin.




       Puede ser configurado a **[DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)**
       para excluir la fecha de inicio del conjunto de fechas de recursión en
       el período.




       Puede ser configurado a **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)**
       para incluir la fecha de fin del conjunto de fechas de recursión en
       el período.





### Errores/Excepciones

Lanza una excepción [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception) cuando el argumento
isostr no puede ser analizado como una cadena de período ISO 8601 válida.
Anteriormente a PHP 8.3, esto era una [Exception](#class.exception).

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Ahora lanza una
        [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception)
        en lugar de [Exception](#class.exception).




       8.2.0

        Se ha añadido la constante **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)**.




       7.2.19, 7.3.6, 7.4.0

        recurrences ahora debe ser mayor que 0.





### Ejemplos

    **Ejemplo #1 Ejemplo con DatePeriod**

&lt;?php
$start = new DateTime('2012-07-01');
$interval = new DateInterval('P7D');
$end = new DateTime('2012-07-31');
$recurrences = 4;
$iso = 'R4/2012-07-01T00:00:00Z/P7D';

// Todas estas fechas son equivalentes.
$period = new DatePeriod($start, $interval, $recurrences);
$period = new DatePeriod($start, $interval, $end);
$period = new DatePeriod($iso);

// Al recorrer el objeto DatePeriod, todas las
// fechas de recursión para el período serán mostradas.
foreach ($period as $date) {
echo $date-&gt;format('Y-m-d')."\n";
}

    El ejemplo anterior mostrará:

Deprecated: Calling DatePeriod::\_\_construct(string $isostr, int $options = 0) is deprecated, use DatePeriod::createFromISO8601String() instead in script on line 11
2012-07-01
2012-07-08
2012-07-15
2012-07-22
2012-07-29

    **Ejemplo #2 Ejemplo con DatePeriod y [DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)**

&lt;?php
$start = new DateTime('2012-07-01');
$interval = new DateInterval('P7D');
$end = new DateTime('2012-07-31');

$period = new DatePeriod($start, $interval, $end,
DatePeriod::EXCLUDE_START_DATE);

// Al recorrer el objeto DatePeriod,
// todas las fechas de recursión para el período son mostradas.
// Tenga en cuenta que, en este caso, 2012-07-01 no será mostrada.
foreach ($period as $date) {
echo $date-&gt;format('Y-m-d')."\n";
}

    El ejemplo anterior mostrará:

2012-07-08
2012-07-15
2012-07-22
2012-07-29

    **Ejemplo #3 DatePeriod mostrando todos los últimos jueves del mes durante un año**

&lt;?php
$begin = new DateTime('2021-12-31');
$end = new DateTime('2022-12-31 23:59:59');

$interval = DateInterval::createFromDateString('last thursday of next month');
$period = new DatePeriod($begin, $interval, $end, DatePeriod::EXCLUDE_START_DATE);

foreach ($period as $dt) {
echo $dt-&gt;format('l Y-m-d'), "\n";
}

    El ejemplo anterior mostrará:

Thursday 2022-01-27
Thursday 2022-02-24
Thursday 2022-03-31
Thursday 2022-04-28
Thursday 2022-05-26
Thursday 2022-06-30
Thursday 2022-07-28
Thursday 2022-08-25
Thursday 2022-09-29
Thursday 2022-10-27
Thursday 2022-11-24
Thursday 2022-12-29

### Notas

Los números de repetición no vinculados especificados en la sección 4.5
"Intervalo de tiempo recurrente" de la norma ISO 8601 no son
soportados, es decir, ni "R/..." como
isostr ni **[null](#constant.null)** como
end funcionaría.

# DatePeriod::createFromISO8601String

(PHP 8 &gt;= 8.3.0)

DatePeriod::createFromISO8601String — Crea un nuevo objeto DatePeriod a partir de un string ISO8601

### Descripción

public static **DatePeriod::createFromISO8601String**([string](#language.types.string) $specification, [int](#language.types.integer) $options = 0): static

Crea un nuevo objeto DatePeriod a partir de un string ISO8601, tal como se especifica con
specification.

### Parámetros

    specification


      Un subconjunto de la especificación [» ISO 8601 de intervalos recurrentes](http://en.wikipedia.org/wiki/Iso8601#Repeating_intervals).




      Un ejemplo de especificación de intervalo ISO 8601 aceptada es
      R5/2008-03-01T13:00:00Z/P1Y2M10DT2H30M, que
      especifica :




      -

        5 iteraciones (R5/)



      -

        Comienza en 2008-03-01T13:00:00Z.



      -

        Cada iteración es un intervalo de 1 año, 2 meses, 10 días, 2 horas y 30 minutos
        (/P1Y2M10DT2H30M).






      Los ejemplos de algunas funcionalidades de especificación de intervalo ISO 8601 que PHP no soporta
      son :




      -

        cero ocurrencias (R0/)



      -

        desplazamientos horarios distintos de UTC (Z), como +02:00.







    options


      Un campo de bits que puede ser utilizado para controlar ciertos comportamientos con las fechas
      de inicio y fin.




      Con **[DatePeriod::EXCLUDE_START_DATE](#dateperiod.constants.exclude-start-date)** se
      excluye la fecha de inicio del conjunto de fechas recurrentes en el
      período.




      Con **[DatePeriod::INCLUDE_END_DATE](#dateperiod.constants.include-end-date)** se
      incluye la fecha de fin en el conjunto de fechas recurrentes en el
      período.


### Valores devueltos

Crea un nuevo objeto DatePeriod.

Los objetos [DatePeriod](#class.dateperiod) creados con este método pueden ser
utilizados como un iterador para generar un cierto número de objetos
[DateTimeImmutable](#class.datetimeimmutable).

### Errores/Excepciones

Lanza una [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception) cuando
la specification no puede ser analizada como un intervalo ISO 8601
válido.

### Ejemplos

    **Ejemplo #1 Ejemplo de DatePeriod::createFromISO8601String**

&lt;?php
$iso = 'R4/2023-07-01T00:00:00Z/P7D';
$period = DatePeriod::createFromISO8601String($iso);

// Al iterar sobre el objeto DatePeriod, todas las
// fechas recurrentes en este período son mostradas.
foreach ($period as $date) {
echo $date-&gt;format('Y-m-d'), "\n";
}

    El ejemplo anterior mostrará:

2023-07-01
2023-07-08
2023-07-15
2023-07-22
2023-07-29

# DatePeriod::getDateInterval

(PHP 5 &gt;= 5.6.5, PHP 7, PHP 8)

DatePeriod::getDateInterval —
Devuelve el intervalo

### Descripción

Estilo orientado a objetos

public **DatePeriod::getDateInterval**(): [DateInterval](#class.dateinterval)

Devuelve un objeto [DateInterval](#class.dateinterval) que representa el intervalo utilizado para el período.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [DateInterval](#class.dateinterval)

### Ejemplos

**Ejemplo #1 Ejemplo con DatePeriod::getDateInterval()**

&lt;?php
$period = DatePeriod::createFromIso8601String('R7/2016-05-16T00:00:00Z/P1D');
$interval = $period-&gt;getDateInterval();
echo $interval-&gt;format('%d day');

El ejemplo anterior mostrará:

1 day

### Ver también

- [DatePeriod::getStartDate()](#dateperiod.getstartdate) - Obtiene la fecha de inicio

- [DatePeriod::getEndDate()](#dateperiod.getenddate) - Devuelve la fecha de fin

# DatePeriod::getEndDate

(PHP 5 &gt;= 5.6.5, PHP 7, PHP 8)

DatePeriod::getEndDate —
Devuelve la fecha de fin

### Descripción

Estilo orientado a objetos

public **DatePeriod::getEndDate**(): [?](#language.types.null)[DateTimeInterface](#class.datetimeinterface)

Devuelve la fecha de fin del período.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[null](#constant.null)** si la [DatePeriod](#class.dateperiod) no tiene fecha de fin.
Por ejemplo, cuando se inicializa con el argumento recurrences,
o con el argumento isostr sin fecha de fin.

Retorna un [object](#language.types.object) [DateTimeImmutable](#class.datetimeimmutable)
cuando la [DatePeriod](#class.dateperiod) se inicializa con un
[object](#language.types.object) [DateTimeImmutable](#class.datetimeimmutable) como argumento end.

Devuelve un [object](#language.types.object) [DateTime](#class.datetime) clonado
que representa la fecha de fin en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplos con DatePeriod::getEndDate()**

&lt;?php
$period = new DatePeriod(
    new DateTime('2016-05-16T00:00:00Z'),
    new DateInterval('P1D'),
    new DateTime('2016-05-20T00:00:00Z')
);
$start = $period-&gt;getEndDate();
echo $start-&gt;format(DateTime::ISO8601);

Los ejemplos anteriores mostrarán:

2016-05-20T00:00:00+0000

**Ejemplo #2 DatePeriod::getEndDate()** sin fecha de fin

&lt;?php
$period = new DatePeriod(
    new DateTime('2016-05-16T00:00:00Z'),
    new DateInterval('P1D'),
    7
);
var_dump($period-&gt;getEndDate());

El ejemplo anterior mostrará:

NULL

### Ver también

- [DatePeriod::getStartDate()](#dateperiod.getstartdate) - Obtiene la fecha de inicio

- [DatePeriod::getDateInterval()](#dateperiod.getdateinterval) - Devuelve el intervalo

# DatePeriod::getRecurrences

(PHP 7 &gt;= 7.2.17/7.3.4, PHP 8)

DatePeriod::getRecurrences — Recupera el número de recurrencias

### Descripción

Estilo orientado a objetos

public **DatePeriod::getRecurrences**(): [?](#language.types.null)[int](#language.types.integer)

Recupera el número de recurrencias.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de recurrencias se define pasando explícitamente las
$recurrences al constructor de la clase
[DatePeriod](#class.dateperiod), de lo contrario se define como **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Valores diferentes para DatePeriod::getRecurrences()**

&lt;?php
$start = new DateTime('2018-12-31 00:00:00');
$end = new DateTime('2021-12-31 00:00:00');
$interval = new DateInterval('P1M');
$recurrences = 5;
// recurrencias definidas explícitamente a través del constructor
$period = new DatePeriod($start, $interval, $recurrences, DatePeriod::EXCLUDE_START_DATE);
echo $period-&gt;getRecurrences(), "\n";

$period = new DatePeriod($start, $interval, $recurrences);
echo $period-&gt;getRecurrences(), "\n";

$period = new DatePeriod($start, $interval, $recurrences, DatePeriod::INCLUDE_END_DATE);
echo $period-&gt;getRecurrences(), "\n\n";

// recurrencias no definidas en el constructor
$period = new DatePeriod($start, $interval, $end);
var_dump($period-&gt;getRecurrences());

$period = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
var_dump($period-&gt;getRecurrences());

El ejemplo anterior mostrará:

5
5
5

NULL
NULL

### Ver también

- [DatePeriod::$recurrences](#dateperiod.props.recurrences)

# DatePeriod::getStartDate

(PHP 5 &gt;= 5.6.5, PHP 7, PHP 8)

DatePeriod::getStartDate —
Obtiene la fecha de inicio

### Descripción

Estilo orientado a objetos

public **DatePeriod::getStartDate**(): [DateTimeInterface](#class.datetimeinterface)

Obtiene la fecha de inicio de un período.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [object](#language.types.object) [DateTimeImmutable](#class.datetimeimmutable)
cuando la [DatePeriod](#class.dateperiod) se inicializa con un
[object](#language.types.object) [DateTimeImmutable](#class.datetimeimmutable)
como argumento start.

Devuelve un [object](#language.types.object) [DateTime](#class.datetime)
en los demás casos.

### Ejemplos

**Ejemplo #1 Ejemplo DatePeriod::getStartDate()**

&lt;?php
$period = DatePeriod::createFromIso8601String('R7/2016-05-16T00:00:00Z/P1D');
$start = $period-&gt;getStartDate();
echo $start-&gt;format(DateTime::ISO8601);

El ejemplo anterior mostrará:

2016-05-16T00:00:00+0000

### Ver también

- [DatePeriod::getEndDate()](#dateperiod.getenddate) - Devuelve la fecha de fin

- [DatePeriod::getDateInterval()](#dateperiod.getdateinterval) - Devuelve el intervalo

## Tabla de contenidos

- [DatePeriod::\_\_construct](#dateperiod.construct) — Crea un nuevo objeto DatePeriod
- [DatePeriod::createFromISO8601String](#dateperiod.createfromiso8601string) — Crea un nuevo objeto DatePeriod a partir de un string ISO8601
- [DatePeriod::getDateInterval](#dateperiod.getdateinterval) — Devuelve el intervalo
- [DatePeriod::getEndDate](#dateperiod.getenddate) — Devuelve la fecha de fin
- [DatePeriod::getRecurrences](#dateperiod.getrecurrences) — Recupera el número de recurrencias
- [DatePeriod::getStartDate](#dateperiod.getstartdate) — Obtiene la fecha de inicio

# Funciones de Fecha/Hora

# checkdate

(PHP 4, PHP 5, PHP 7, PHP 8)

checkdate — Valida una fecha gregoriana

### Descripción

**checkdate**([int](#language.types.integer) $month, [int](#language.types.integer) $day, [int](#language.types.integer) $year): [bool](#language.types.boolean)

Comprueba la validez de una fecha formada por los argumentos. Una fecha
se considera válida si cada parámetro está propiamente definido.

### Parámetros

     month


       El mes entre 1 y 12 inclusive.






     day


       El día que está dentro del número de días del mes
       month dado. Los años year bisiestos
       son tomados en consideración.






     year


       El año entre 1 y 32767 inclusive.





### Valores devueltos

Devuelve **[true](#constant.true)** si la fecha dada es válida, si no, devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de checkdate()**

&lt;?php
var_dump(checkdate(12, 31, 2000));
var_dump(checkdate(2, 29, 2001));

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [strtotime()](#function.strtotime) - Transforma un texto inglés en timestamp

# date

(PHP 4, PHP 5, PHP 7, PHP 8)

date — Da formato a una marca de tiempo de Unix (Unix timestamp)

### Descripción

**date**([string](#language.types.string) $format, [?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [string](#language.types.string)

Devuelve una cadena formateada según el formato indicado usando el
integer timestamp (Unix timestamp) dado, o el momento actual
si no se da una marca de tiempo. En otras palabras, timestamp
es opcional y por defecto es el valor de [time()](#function.time).

**Advertencia**

    Las marcas de tiempo de Unix no manejan zonas horarias. Usa la
    clase [DateTimeImmutable](#class.datetimeimmutable), y su
    método [DateTimeInterface::format()](#datetime.format)
    para formatear fecha/hora incluyendo la información de zona horaria.

### Parámetros

    format


      Formato aceptado por [DateTimeInterface::format()](#datetime.format).



      **Nota**:

        **date()** generará siempre
        000000 como microsegundos ya que toma un tipo [int](#language.types.integer)
        como parámetro, mientras que [DateTimeInterface::format()](#datetime.format)
        soporta microsegundos, si el objeto del tipo
        [DateTimeInterface](#class.datetimeinterface) es creado con microsegundos.



timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve una cadena de fecha formateada.

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 date()** examples

&lt;?php
// Establecer la zona horaria por omisión
date_default_timezone_set('UTC');

// Imprime algo como: Monday
echo date("l") . "\n";

// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A') . "\n";

// Imprime: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000)) . "\n";

/_ Usar las constantes en el parámetro de formato _/
// Imprime algo como: Wed, 25 Sep 2013 15:28:57 -0700
echo date(DATE_RFC2822) . "\n";

// Imprime algo como: 2000-07-01T00:00:00+00:00
echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));

Puede prevenir que un carácter reconocido en la cadena de formato sea
expandido escapándolo con una barra invertida precedente. Si el carácter con una
barra invertida es ya una secuencia especial, necesitará escapar también
la barra invertida.

    **Ejemplo #2 Escapando caracteres en date()**

&lt;?php
// Imprime algo como: Wednesday the 15th
echo date('l \t\h\e jS');

Algunos ejemplos de formatear **date()**. Observe que
debería escapar cualesquiera otros caracteres, ya que cualquiera que tenga
actualmente un significado especial producirá resultados no deseados, y
a otros caracteres se les pueden asignar significado en futuras versiones de PHP.
Cuando se escapa un carácter, asegúrese de usar comillas simples para prevenir que
caracteres como \n se conviertan en nuevas líneas.

    **Ejemplo #3 Dando formato con date()**

&lt;?php
// Asumiendo que hoy es 10 de marzo de 2001, 5:16:18 pm, y que estamos en la
// zona horaria Mountain Standard Time (MST)
date_default_timezone_set("America/Phoenix");

echo date("F j, Y, g:i a") . "\n"; // March 10, 2001, 5:16 pm
echo date("m.d.y") . "\n"; // 03.10.01
echo date("j, n, Y") . "\n"; // 10, 3, 2001
echo date("Ymd") . "\n"; // 20010310
echo date('h-i-s, j-m-y, it is w Day') . "\n"; // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
echo date('\i\t \i\s \t\h\e jS \d\a\y.') . "\n"; // it is the 10th day.
echo date("D M j G:i:s T Y") . "\n"; // Sat Mar 10 17:16:18 MST 2001
echo date('H:m:s \m \i\s\ \m\o\n\t\h') . "\n"; // 17:03:18 m is month
echo date("H:i:s") . "\n"; // 17:16:18
echo date("Y-m-d H:i:s") . "\n"; // 2001-03-10 17:16:18 (the MySQL DATETIME format)

Para formatear fechas en otros lenguajes, debería usar
[IntlDateFormatter::format()](#intldateformatter.format)
en vez de **date()**.

### Notas

**Nota**:

    Para generar una marca de tiempo desde una cadena que representa la fecha,
    puede usar [strtotime()](#function.strtotime). Además, algunas
    bases de datos tienen funciones para convertir formatos de fecha en marcas de tiempo
    (como la función [» UNIX_TIMESTAMP](http://dev.mysql.com/doc/mysql/en/date-and-time-functions.html)
    de MySQL).

**Sugerencia**

    La marca de tiempo del inicio de una petición está disponible en
    [$_SERVER['REQUEST_TIME']](#reserved.variables.server).

### Ver también

    - [DateTimeImmutable::__construct()](#datetimeimmutable.construct) - Devuelve un nuevo objeto DateTimeImmutable

    - [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

    - [gmdate()](#function.gmdate) - Formatea una fecha/hora GMT/TUC

    - [idate()](#function.idate) - Formatea una parte de la hora/fecha local como un entero

    - [getdate()](#function.getdate) - Devuelve la fecha/hora

    - [getlastmod()](#function.getlastmod) - Devuelve la fecha de última modificación de la página

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [IntlDateFormatter::format()](#intldateformatter.format) - Formatea la fecha y la hora como string

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

    - [Constantes Predefinidas de DateTime](#datetimeinterface.constants.types)

# date_add

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_add — Alias de [DateTime::add()](#datetime.add)

### Descripción

Esta función es un alias de: [DateTime::add()](#datetime.add)

# date_create

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_create — Creación de un objeto [DateTime](#class.datetime)

### Descripción

**date_create**([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTime](#class.datetime)|[false](#language.types.singleton)

Versión procedimental de [DateTime::\_\_construct()](#datetime.construct)

A diferencia del constructor de [DateTime](#class.datetime),
devolverá **[false](#constant.false)** en lugar de una excepción si la cadena
datetime no es válida.

### Parámetros

Ver [DateTimeImmutable::\_\_construct](#datetimeimmutable.construct).

### Valores devueltos

Devuelve una nueva instancia DateTime o **[false](#constant.false)** si ocurre un error

### Ver también

- [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) - Devuelve un nuevo objeto DateTimeImmutable

- [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) - Analiza un string de tiempo según el formato especificado

- [DateTime::\_\_construct()](#datetime.construct) - Devuelve un nuevo objeto DateTime

# date_create_from_format

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_create_from_format — Alias de [DateTime::createFromFormat()](#datetime.createfromformat)

### Descripción

Esta función es un alias de: [DateTime::createFromFormat()](#datetime.createfromformat)

# date_create_immutable

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

date_create_immutable — Crea un nuevo objeto [DateTimeImmutable](#class.datetimeimmutable)

### Descripción

**date_create_immutable**([string](#language.types.string) $datetime = "now", [?](#language.types.null)[DateTimeZone](#class.datetimezone) $timezone = **[null](#constant.null)**): [DateTimeImmutable](#class.datetimeimmutable)|[false](#language.types.singleton)

Versión procedimental de [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct).

A diferencia del constructor de [DateTimeImmutable](#class.datetimeimmutable), esta función
devolverá **[false](#constant.false)** en lugar de una excepción si la cadena
datetime proporcionada no es válida.

### Parámetros

Ver [DateTimeImmutable::\_\_construct](#datetimeimmutable.construct).

### Valores devueltos

Devuelve una nueva instancia DateTimeImmutable o **[false](#constant.false)** si ocurre un error

### Ver también

- [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) - Analiza un string de tiempo según el formato especificado

# date_create_immutable_from_format

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

date_create_immutable_from_format — Alias de [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat)

### Descripción

Esta función es un alias de: [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat)

# date_date_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_date_set — Alias de [DateTime::setDate()](#datetime.setdate)

### Descripción

Esta función es un alias de: [DateTime::setDate()](#datetime.setdate)

# date_default_timezone_get

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

date_default_timezone_get —
Recupera el huso horario por defecto utilizado por todas las funciones de fecha/hora de un script

### Descripción

**date_default_timezone_get**(): [string](#language.types.string)

Esta función devuelve el huso horario siguiendo el siguiente orden de preferencia:

    -

      Lectura del huso horario definido utilizando la función
      [date_default_timezone_set()](#function.date-default-timezone-set) (si existe)





    -

      Lectura del valor de la opción de configuración
      [date.timezone](#ini.date.timezone)
      (si está definida)


Si todo lo anterior falla, **date_default_timezone_get()**
devolverá el huso horario por defecto de UTC.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Recuperación del huso horario por defecto**

&lt;?php
date_default_timezone_set('Europe/London');

if (date_default_timezone_get()) {
echo 'date_default_timezone_set: ' . date_default_timezone_get() . "\n";
}

if (ini_get('date.timezone')) {
echo 'date.timezone : ' . ini_get('date.timezone');
}

    Resultado del ejemplo anterior es similar a:

date_default_timezone_set : Europe/London
date.timezone : Europe/London

    **Ejemplo #2 Recuperación de la abreviatura de un huso horario**

&lt;?php
date_default_timezone_set('America/Los_Angeles');
echo date_default_timezone_get() . ' =&gt; ' . date('e') . ' =&gt; ' . date('T');

    El ejemplo anterior mostrará:

America/Los_Angeles =&gt; America/Los_Angeles =&gt; PST

### Ver también

    - [date_default_timezone_set()](#function.date-default-timezone-set) - Establece la zona horaria por defecto para todas las funciones de fecha/hora

    - [Lista de Zonas Horarias Soportadas](#timezones)

# date_default_timezone_set

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

date_default_timezone_set —
Establece la zona horaria por defecto para todas las funciones de fecha/hora

### Descripción

**date_default_timezone_set**([string](#language.types.string) $timezoneId): [bool](#language.types.boolean)

La función **date_default_timezone_set()**
establece la zona horaria por defecto utilizada por todas
las funciones de fecha/hora.

En lugar de utilizar esta función para establecer la zona horaria
por defecto en su script, también puede utilizarse
la configuración INI [date.timezone](#ini.date.timezone).

### Parámetros

     timezoneId


       El identificador de zona horaria, como UTC,
       Africa/Lagos, Asia/Hong_Kong, o
       Europe/Lisbon. La lista de identificadores válidos está
       disponible en el [Lista de Zonas Horarias Soportadas](#timezones).





### Valores devueltos

Esta función devuelve **[false](#constant.false)** si timezoneId
no es válido, **[true](#constant.true)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Obtención de la zona horaria por defecto**

&lt;?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();
$ini_tz = ini_get('date.timezone');

if (strcmp($script_tz, $ini_tz)){
echo 'La zona horaria del script difiere de la zona horaria definida en el archivo ini.';
} else {
echo 'La zona horaria del script es equivalente a la definida en el archivo ini.';
}

### Ver también

    - [date_default_timezone_get()](#function.date-default-timezone-get) - Recupera el huso horario por defecto utilizado por todas las funciones de fecha/hora de un script

    - [Lista de Zonas Horarias Soportadas](#timezones)

# date_diff

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_diff — Alias de [DateTime::diff()](#datetime.diff)

### Descripción

Esta función es un alias de: [DateTime::diff()](#datetime.diff)

# date_format

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_format — Alias de [DateTime::format()](#datetime.format)

### Descripción

Esta función es un alias de: [DateTime::format()](#datetime.format)

# date_get_last_errors

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_get_last_errors — Alias de [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors)

### Descripción

Esta función es un alias de: [DateTimeImmutable::getLastErrors()](#datetimeimmutable.getlasterrors)

# date_interval_create_from_date_string

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_interval_create_from_date_string — Alias de [DateInterval::createFromDateString()](#dateinterval.createfromdatestring)

### Descripción

Esta función es un alias de: [DateInterval::createFromDateString()](#dateinterval.createfromdatestring)

# date_interval_format

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_interval_format — Alias de [DateInterval::format()](#dateinterval.format)

### Descripción

Esta función es un alias de: [DateInterval::format()](#dateinterval.format)

# date_isodate_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_isodate_set — Alias de [DateTime::setISODate()](#datetime.setisodate)

### Descripción

Esta función es un alias de: [DateTime::setISODate()](#datetime.setisodate)

# date_modify

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_modify — Alias de [DateTime::modify()](#datetime.modify)

### Descripción

Esta función es un alias de: [DateTime::modify()](#datetime.modify)

# date_offset_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_offset_get — Alias de [DateTime::getOffset()](#datetime.getoffset)

### Descripción

Esta función es un alias de: [DateTime::getOffset()](#datetime.getoffset)

# date_parse

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_parse — Retorna un array asociativo con información detallada sobre una fecha/hora dada

### Descripción

**date_parse**([string](#language.types.string) $datetime): [array](#language.types.array)

**date_parse()** analiza la cadena
datetime dada según las mismas reglas
[strtotime()](#function.strtotime) y
[DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct). En lugar de
devolver un timestamp Unix (con [strtotime()](#function.strtotime)) o
un objeto [DateTimeImmutable](#class.datetimeimmutable) (con
[DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct)), devuelve un
array asociativo con la información que podría detectar en
la cadena datetime dada.

Si no se puede encontrar información sobre un cierto grupo de elementos, estos
elementos del array serán definidos como **[false](#constant.false)** o estarán ausentes. Si es necesario
para construir un timestamp o un objeto [DateTimeImmutable](#class.datetimeimmutable) a partir
de la misma cadena datetime, varios campos pueden ser definidos
con un valor no-**[false](#constant.false)**. Ver los ejemplos a continuación para los casos en que esto ocurre.

### Parámetros

     datetime


       Fecha/hora en un formato aceptado por
       [DateTimeImmutable::__construct()](#datetimeimmutable.construct).





### Valores devueltos

Retorna un [array](#language.types.array) que contiene información sobre la fecha/hora analizada.

El array retornado tiene claves para year,
month, day, hour,
minute, second,
fraction, y is_localtime.

Si is_localtime está presente, entonces
zone_type indica el tipo de zona horaria. Para el tipo
1 (desplazamiento UTC) los campos
zone y is_dst son añadidos. Para el tipo
2 (abreviatura) los campos
tz_abbr y is_dst son añadidos. Para el tipo
3 (identificador de zona horaria) los campos
tz_abbr y tz_id son añadidos.

El array incluye los campos warning_count y
warnings. El primero indica el número
de advertencias. Las claves del array warnings
indican la posición en el parámetro datetime
donde ocurrió la advertencia, con el valor de cadena describiendo
la advertencia misma. Un ejemplo a continuación muestra tal advertencia.

El array incluye también los campos error_count y
errors. El primero indica el número
de errores. Las claves del array errors indican
la posición en el parámetro datetime donde ocurrió
el error, con el valor de cadena describiendo la advertencia
misma. Un ejemplo a continuación muestra tal advertencia.

**Advertencia**

    El número de elementos de array en los arrays warnings y
    errors puede ser inferior a warning_count
    o error_count si ocurrieron en la misma posición.

### Errores/Excepciones

En el caso de que la función retorne un error, el elemento "errors"
contendrá los mensajes de error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El elemento zone del array retornado ahora representa
       segundos en lugar de minutos, y su signo es invertido. Por ejemplo,
       -120 ahora es 7200.



### Ejemplos

    **Ejemplo #1 date_parse()** con una cadena
    datetime completa

&lt;?php
var_dump(date_parse("2006-12-12 10:00:00.5"));

    El ejemplo anterior mostrará:

array(12) {
["year"]=&gt;
int(2006)
["month"]=&gt;
int(12)
["day"]=&gt;
int(12)
["hour"]=&gt;
int(10)
["minute"]=&gt;
int(0)
["second"]=&gt;
int(0)
["fraction"]=&gt;
float(0.5)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(false)
}

Los elementos de zona horaria solo aparecen si están incluidos
en la cadena datetime dada. En este caso,
siempre habrá un elemento zone_type y algunos otros
dependiendo de su valor.

    **Ejemplo #2 date_parse()** con información abreviada sobre la zona horaria

&lt;?php
var_dump(date_parse("June 2nd, 2022, 10:28:17 BST"));

    El ejemplo anterior mostrará:

array(16) {
["year"]=&gt;
int(2022)
["month"]=&gt;
int(6)
["day"]=&gt;
int(2)
["hour"]=&gt;
int(10)
["minute"]=&gt;
int(28)
["second"]=&gt;
int(17)
["fraction"]=&gt;
float(0)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(true)
["zone_type"]=&gt;
int(2)
["zone"]=&gt;
int(0)
["is_dst"]=&gt;
bool(true)
["tz_abbr"]=&gt;
string(3) "BST"
}

    **Ejemplo #3 date_parse()** con información abreviada sobre la zona horaria

&lt;?php
var_dump(date_parse("June 2nd, 2022, 10:28:17 Europe/London"));

    El ejemplo anterior mostrará:

array(14) {
["year"]=&gt;
int(2022)
["month"]=&gt;
int(6)
["day"]=&gt;
int(2)
["hour"]=&gt;
int(10)
["minute"]=&gt;
int(28)
["second"]=&gt;
int(17)
["fraction"]=&gt;
float(0)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(true)
["zone_type"]=&gt;
int(3)
["tz_id"]=&gt;
string(13) "Europe/London"
}

Si se analiza una cadena datetime más mínima,
hay menos información disponible. En este ejemplo, todas las partes
temporales son retornadas como **[false](#constant.false)**.

    **Ejemplo #4
     date_parse()** con
     una cadena mínima

&lt;?php
var_dump(date_parse("June 2nd, 2022"));

    El ejemplo anterior mostrará:

array(12) {
["year"]=&gt;
int(2022)
["month"]=&gt;
int(6)
["day"]=&gt;
int(2)
["hour"]=&gt;
bool(false)
["minute"]=&gt;
bool(false)
["second"]=&gt;
bool(false)
["fraction"]=&gt;
bool(false)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(false)
}

[Los formatos relativos](#datetime.formats.relative)
no influyen en los valores analizados desde formatos absolutos, pero
son analizados en el elemento "relativo".

    **Ejemplo #5 Ejemplo con date_parse()** y formatos relativos

&lt;?php
var_dump(date_parse("2006-12-12 10:00:00.5 +1 week +1 hour"));

    El ejemplo anterior mostrará:

array(13) {
["year"]=&gt;
int(2006)
["month"]=&gt;
int(12)
["day"]=&gt;
int(12)
["hour"]=&gt;
int(10)
["minute"]=&gt;
int(0)
["second"]=&gt;
int(0)
["fraction"]=&gt;
float(0.5)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(false)
["relative"]=&gt;
array(6) {
["year"]=&gt;
int(0)
["month"]=&gt;
int(0)
["day"]=&gt;
int(7)
["hour"]=&gt;
int(1)
["minute"]=&gt;
int(0)
["second"]=&gt;
int(0)
}
}

Algunas estrofas, tales como Thursday (jueves) definirán
la parte hora de la cadena como 0. Si Thursday
(jueves) se pasa a [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) la hora,
el minuto, el segundo y la fracción también serán definidos como 0. En el ejemplo a continuación, el elemento año
sin embargo es dejado como **[false](#constant.false)**.

    **Ejemplo #6 date_parse()** con efectos secundarios

&lt;?php
var_dump(date_parse("Thursday, June 2nd"));

    El ejemplo anterior mostrará:

array(13) {
["year"]=&gt;
bool(false)
["month"]=&gt;
int(6)
["day"]=&gt;
int(2)
["hour"]=&gt;
int(0)
["minute"]=&gt;
int(0)
["second"]=&gt;
int(0)
["fraction"]=&gt;
float(0)
["warning_count"]=&gt;
int(0)
["warnings"]=&gt;
array(0) {
}
["error_count"]=&gt;
int(0)
["errors"]=&gt;
array(0) {
}
["is_localtime"]=&gt;
bool(false)
["relative"]=&gt;
array(7) {
["year"]=&gt;
int(0)
["month"]=&gt;
int(0)
["day"]=&gt;
int(0)
["hour"]=&gt;
int(0)
["minute"]=&gt;
int(0)
["second"]=&gt;
int(0)
["weekday"]=&gt;
int(4)
}
}

### Ver también

    - [date_parse_from_format()](#function.date-parse-from-format) - Recupera las informaciones de una fecha dada siguiendo un formato específico para analizar
     el parámetro datetime con un formato específico

    - [checkdate()](#function.checkdate) - Valida una fecha gregoriana para una validación de fecha Gregoriana

    - [getdate()](#function.getdate) - Devuelve la fecha/hora

# date_parse_from_format

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_parse_from_format — Recupera las informaciones de una fecha dada siguiendo un formato específico

### Descripción

**date_parse_from_format**([string](#language.types.string) $format, [string](#language.types.string) $datetime): [array](#language.types.array)

Devuelve un array asociativo que contiene informaciones
detalladas sobre una fecha/hora dada.

### Parámetros

     format


       Documentación sobre el uso del format,
       por favor referirse a la documentación de
       [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat). Las
       mismas reglas se aplican.






     datetime


       Cadena que representa la fecha/hora.





### Valores devueltos

Devuelve un array asociativo con informaciones detalladas
sobre la fecha/hora dada.

El array devuelto tiene claves para year,
month, day, hour,
minute, second,
fraction, y is_localtime.

Si is_localtime está presente, entonces
zone_type indica el tipo de zona horaria. Para el tipo
1 (desplazamiento UTC) se añaden los campos
zone y is_dst. Para el tipo
2 (abreviatura) se añaden los campos
tz_abbr y is_dst. Para el tipo
3 (identificador de zona horaria) se añaden los campos
tz_abbr y tz_id.

El array incluye los campos warning_count y
warnings. El primero indica el número
de advertencias. Las claves del array warnings
indican la posición en el parámetro datetime
donde ocurrió la advertencia, con el valor de cadena que describe
la advertencia misma. Un ejemplo a continuación muestra tal advertencia.

El array incluye también los campos error_count y
errors. El primero indica el número
de errores. Las claves del array errors indican
la posición en el parámetro datetime donde ocurrió el error,
con el valor de cadena que describe la advertencia misma. Un ejemplo a continuación muestra tal advertencia.

**Advertencia**

    El número de elementos de array en los arrays warnings y
    errors puede ser inferior a warning_count
    o error_count si ocurrieron en la misma posición.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) cuando el
datetime contiene bytes NULL.

### Historial de cambios

      Versión
      Descripción






      8.0.21, 8.1.8, 8.2.0

       Ahora lanza una [ValueError](#class.valueerror) cuando se pasan bytes NULL
       en datetime, lo cual antes era ignorado silenciosamente.




      7.2.0

       El elemento zone del array devuelto representa segundos
       en lugar de minutos ahora, y su signo es invertido. Por ejemplo
       -120 ahora es igual a 7200.



### Ejemplos

    **Ejemplo #1 Ejemplo con date_parse_from_format()**

&lt;?php
$date = "6.1.2009 13:00+01:00";
print_r(date_parse_from_format("j.n.Y H:iP", $date));

    El ejemplo anterior mostrará:

Array
(
[year] =&gt; 2009
[month] =&gt; 1
[day] =&gt; 6
[hour] =&gt; 13
[minute] =&gt; 0
[second] =&gt; 0
[fraction] =&gt; 0
[warning_count] =&gt; 0
[warnings] =&gt; Array
(
)

    [error_count] =&gt; 0
    [errors] =&gt; Array
        (
        )

    [is_localtime] =&gt; 1
    [zone_type] =&gt; 1
    [zone] =&gt; 3600
    [is_dst] =&gt;

)

    **Ejemplo #2
     Ejemplo de date_parse_from_format()**
     con advertencias

&lt;?php
$date = "26 August 2022 22:30 pm";
$parsed = date_parse_from_format("j F Y G:i a", $date);

echo "Warnings count: ", $parsed['warning_count'], "\n";
foreach ($parsed['warnings'] as $position =&gt; $message) {
    echo "\tOn position {$position}: {$message}\n";
}

    El ejemplo anterior mostrará:

Warnings count: 1
On position 23: The parsed time was invalid

    **Ejemplo #3
     Ejemplo de date_parse_from_format()**
     con errores

&lt;?php
$date = "26 August 2022 CEST";
$parsed = date_parse_from_format("j F Y H:i", $date);

echo "Errors count: ", $parsed['error_count'], "\n";
foreach ($parsed['errors'] as $position =&gt; $message) {
    echo "\tOn position {$position}: {$message}\n";
}

    El ejemplo anterior mostrará:

Errors count: 3
On position 15: A two digit hour could not be found
On position 19: Not enough data available to satisfy format

### Ver también

    - [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) - Analiza un string de tiempo según el formato especificado

    - [checkdate()](#function.checkdate) - Valida una fecha gregoriana

# date_sub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_sub — Alias de [DateTime::sub()](#datetime.sub)

### Descripción

Esta función es un alias de: [DateTime::sub()](#datetime.sub)

### Ver también

    - [DateTimeImmutable::sub()](#datetimeimmutable.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos

    - [DateTime::sub()](#datetime.sub) - Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto

DateTime

# date_sun_info

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

date_sun_info — Retorna un array con las informaciones sobre el amanecer/atardecer
así como el inicio y el fin del amanecer

### Descripción

**date_sun_info**([int](#language.types.integer) $timestamp, [float](#language.types.float) $latitude, [float](#language.types.float) $longitude): [array](#language.types.array)

### Parámetros

     timestamp


       Timestamp Unix.






     latitude


       Latitud, en grados.






     longitude


       Longitud, en grados.





### Valores devueltos

Retorna un array cuya estructura del array se detalla en la lista siguiente:

     sunrise


       El timestamp del amanecer (ángulo de zenit = 90°35').




     sunset


       El timestamp del atardecer (ángulo de zenit = 90°35').




     transit


       El timestamp donde el sol está en su cenit, es decir ha
       alcanzado su punto más alto.




     civil_twilight_begin


       El inicio del amanecer civil (ángulo de zenit = 96°). Termina en el
       sunrise.




     civil_twilight_end


       El fin del crepúsculo civil (ángulo de zenit = 96°). Comienza en el
       sunset.




     nautical_twilight_begin


       El inicio del amanecer náutico (ángulo de zenit = 102°). Termina en el
       civil_twilight_begin.




     nautical_twilight_end


       El fin del crepúsculo náutico (ángulo de zenit = 102°). Comienza en
       civil_twilight_end.




     astronomical_twilight_begin


       El inicio del amanecer astronómico (ángulo de zenit = 108°). Termina en el
       nautical_twilight_begin.




     astronomical_twilight_end


       El fin del crepúsculo astronómico (ángulo de zenit = 108°). Comienza en
       nautical_twilight_end.



Los valores de los elementos del array son timestamps UNIX, **[false](#constant.false)**, si el sol está bajo el zenit
respectivo durante todo el día, o **[true](#constant.true)**, si el sol está sobre el zenit respectivo durante todo el día.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        El cálculo ha sido corregido teniendo en cuenta la medianoche local en lugar del mediodía local,
        lo que modifica ligeramente los resultados.





### Ejemplos

    **Ejemplo #1 Ejemplo con date_sun_info()**

&lt;?php
$sun_info = date_sun_info(strtotime("2006-12-12"), 31.7667, 35.2333);
foreach ($sun_info as $key =&gt; $val) {
  echo "$key: " . date("H:i:s", $val) . "\n";
}

    El ejemplo anterior mostrará:

sunrise: 05:52:11
sunset: 15:41:21
transit: 10:46:46
civil_twilight_begin: 05:24:08
civil_twilight_end: 16:09:24
nautical_twilight_begin: 04:52:25
nautical_twilight_end: 16:41:06
astronomical_twilight_begin: 04:21:32
astronomical_twilight_end: 17:12:00

    **Ejemplo #2 Noche polar con un poco de tratamiento**

&lt;?php
$tz = new \DateTimeZone('America/Anchorage');

$si = date_sun_info(strtotime("2022-12-21"), 70.21, -148.51);
foreach ($si as $key =&gt; $value) {
    echo
        match ($value) {
true =&gt; 'always',
false =&gt; 'never',
default =&gt; date_create("@{$value}")-&gt;setTimeZone($tz)-&gt;format( 'H:i:s T' ),
},
": {$key}",
"\n";
}

    El ejemplo anterior mostrará:

never: sunrise
never: sunset
12:52:18 AKST: transit
10:53:19 AKST: civil_twilight_begin
14:51:17 AKST: civil_twilight_end
09:01:47 AKST: nautical_twilight_begin
16:42:48 AKST: nautical_twilight_end
07:40:47 AKST: astronomical_twilight_begin
18:03:49 AKST: astronomical_twilight_end

    **Ejemplo #3 Sol de medianoche (Tromso, Noruega)**

&lt;?php
$si = date_sun_info(strtotime("2022-06-26"), 69.68, 18.94);
print_r($si);

    El ejemplo anterior mostrará:

Array
(
[sunrise] =&gt; 1
[sunset] =&gt; 1
[transit] =&gt; 1656240426
[civil_twilight_begin] =&gt; 1
[civil_twilight_end] =&gt; 1
[nautical_twilight_begin] =&gt; 1
[nautical_twilight_end] =&gt; 1
[astronomical_twilight_begin] =&gt; 1
[astronomical_twilight_end] =&gt; 1
)

    **Ejemplo #4 Cálculo de la duración del día (Kiev)**

&lt;?php
$si = date_sun_info(strtotime('2022-08-26'), 50.45, 30.52);
$diff = $si['sunset'] - $si['sunrise'];
echo "Duración del día: ",
    floor($diff / 3600), "h ",
floor(($diff % 3600) / 60), "s\n";

    El ejemplo anterior mostrará:

Duración del día: 13h 56s

# date_sunrise

(PHP 5, PHP 7, PHP 8)

date_sunrise — Devuelve la hora de salida del sol para un día y un lugar dados

**Advertencia**

    Esta función está *OBSOLETA* a partir de PHP 8.1.0.
    Depender de esta función está altamente desaconsejado. Se recomienda
    el uso de [date_sun_info()](#function.date-sun-info) en su lugar.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**date_sunrise**(
    [int](#language.types.integer) $timestamp,
    [int](#language.types.integer) $returnFormat = **[SUNFUNCS_RET_STRING](#constant.sunfuncs-ret-string)**,
    [?](#language.types.null)[float](#language.types.float) $latitude = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $longitude = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $zenith = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $utcOffset = **[null](#constant.null)**
): [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float)|[false](#language.types.singleton)

**date_sunrise()** devuelve la hora de salida del sol para un día
(especificado por el argumento timestamp) y un lugar dados.

### Parámetros

     timestamp


       El timestamp Unix del día para el cual se proporciona la hora de salida del sol.






     returnFormat





        <caption>**Constantes para el argumento format**</caption>



           Constante
           Descripción
           Ejemplo






           SUNFUNCS_RET_STRING
           Devuelve el resultado como [string](#language.types.string)
           16:46



           SUNFUNCS_RET_DOUBLE
           Devuelve el resultado como [float](#language.types.float)
           16.78243132



           SUNFUNCS_RET_TIMESTAMP
           Devuelve el resultado como [int](#language.types.integer) (timestamp)
           1095034606










     latitude


       Por defecto, es el Norte. Pase un valor negativo para el Sur.
       Ver también [date.default_latitude](#ini.date.default-latitude).






     longitude


       Por defecto, es el Este. Pase un valor negativo para el Oeste.
       Ver también [date.default_longitude](#ini.date.default-longitude).






     zenith


       zenith es el ángulo entre el centro del
       sol y la línea perpendicular a la superficie de la tierra. Por defecto
       [date.sunrise_zenith](#ini.date.sunrise-zenith)



        <caption>**Valores comunes del ángulo zenith**</caption>



           Ángulo
           Descripción






           90°50'
           Salida del sol: el punto donde el sol se vuelve visible.



           96°
           Crepúsculo civil: convencionalmente utilizado para significar el inicio del amanecer.



           102°
           Crepúsculo náutico: el punto donde el horizonte comienza a ser visible en el mar.



           108°
           Crepúsculo astronómico: el punto donde el sol comienza a ser la fuente de toda iluminación.










     utcOffset


       Especificado en horas.
       El utcOffset se ignora si
       returnFormat es
       **[SUNFUNCS_RET_TIMESTAMP](#constant.sunfuncs-ret-timestamp)**.





### Valores devueltos

Devuelve la hora de salida del sol en el returnFormat
especificado en caso de éxito o **[false](#constant.false)** si ocurre un error.
Una razón posible del fallo es que el sol no salga
en absoluto, lo cual ocurre dentro de los círculos
polares durante parte del año.

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido marcada como obsoleta en favor de [date_sun_info()](#function.date-sun-info).




       8.0.0

        latitude, longitude,
        zenith y utcOffset ahora son nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con date_sunrise()**

&lt;?php

/_ Calcula la hora de salida del sol para Lisboa, Portugal
Latitud: 38.4 Norte
Longitud: 9 Oeste
Zenith ~= 90
offset: +1 GMT
_/

echo date("D M d Y"). ', hora de salida del sol: ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1);

    Resultado del ejemplo anterior es similar a:

Deprecated: Constant SUNFUNCS_RET_STRING is deprecated in script on line 10
Deprecated: Function date_sunrise() is deprecated since 8.1, use date_sun_info() instead in script on line 10
Mon Dec 20 2004, sunrise time : 08:54

    **Ejemplo #2 Sin salida del sol**

&lt;?php
$solstice = strtotime('2017-12-21');
var_dump(date_sunrise($solstice, SUNFUNCS_RET_STRING, 69.245833, -53.537222));

    El ejemplo anterior mostrará:

Deprecated: Constant SUNFUNCS_RET_STRING is deprecated in script on line 3
Deprecated: Function date_sunrise() is deprecated since 8.1, use date_sun_info() instead in script on line 3
bool(false)

### Ver también

    - [date_sun_info()](#function.date-sun-info) - Retorna un array con las informaciones sobre el amanecer/atardecer

así como el inicio y el fin del amanecer

# date_sunset

(PHP 5, PHP 7, PHP 8)

date_sunset —
Devuelve la hora de puesta del sol para un día y un lugar dados

**Advertencia**

    Esta función está *OBSOLETA* a partir de PHP 8.1.0.
    Depender de esta función está altamente desaconsejo. Use
    [date_sun_info()](#function.date-sun-info) en su lugar.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**date_sunset**(
    [int](#language.types.integer) $timestamp,
    [int](#language.types.integer) $returnFormat = **[SUNFUNCS_RET_STRING](#constant.sunfuncs-ret-string)**,
    [?](#language.types.null)[float](#language.types.float) $latitude = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $longitude = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $zenith = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $utcOffset = **[null](#constant.null)**
): [string](#language.types.string)|[int](#language.types.integer)|[float](#language.types.float)|[false](#language.types.singleton)

La función **date_sunset()** devuelve la hora de puesta
del sol para un día (especificado como timestamp
Unix) y un lugar dados.

### Parámetros

     timestamp


       El timestamp Unix del día para el cual se proporciona la hora de puesta del sol.






     returnFormat





        <caption>**Constantes para el parámetro returnFormat**</caption>



           Constante
           Descripción
           Ejemplo






           SUNFUNCS_RET_STRING
           Devuelve el resultado en forma de [string](#language.types.string)
           16:46



           SUNFUNCS_RET_DOUBLE
           Devuelve el resultado en forma de [float](#language.types.float)
           16.78243132



           SUNFUNCS_RET_TIMESTAMP
           Devuelve el resultado en forma de [int](#language.types.integer) (timestamp)
           1095034606










     latitude


       Por omisión, es el Norte. Pase un valor negativo para el Sur.
       Ver también [date.default_latitude](#ini.date.default-latitude).






     longitude


       Por omisión, es el Este. Pase un valor negativo para el Oeste.
       Ver también [date.default_longitude](#ini.date.default-longitude).






     zenith


       zenith es el ángulo entre el
       centro del sol y la línea perpendicular a la superficie de la tierra.
       Por omisión
       [date.sunset_zenith](#ini.date.sunset-zenith)



        <caption>**Valores comunes de ángulo zenith**</caption>



           Ángulo
           Descripción






           90°50'
           Puesta del sol: El punto donde el sol se vuelve invisible.



           96°
           Crepúsculo civil: convencionalmente utilizado para significar el fin del crepúsculo.



           102°
           Crepúsculo náutico: el punto de fin del horizonte siendo visible en el mar.



           108°
           Crepúsculo astronómico: el punto donde el sol deja de ser la fuente de toda iluminación.










     utcOffset


       Especificado en horas.
       El utcOffset es ignorado, si
       returnFormat es
       **[SUNFUNCS_RET_TIMESTAMP](#constant.sunfuncs-ret-timestamp)**.





### Valores devueltos

Devuelve la hora de puesta del sol en el returnFormat
especificado o **[false](#constant.false)** si ocurre un error. Una razón posible del fallo es que
el sol no se pone, lo cual ocurre dentro de los círculos
polares durante parte del año.

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido marcada como obsoleta en favor de [date_sun_info()](#function.date-sun-info).




       8.0.0

        latitude, longitude,
        zenith y utcOffset ahora son nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con date_sunset()**

&lt;?php

     /* Calcula la hora de puesta del sol para Lisboa, Portugal

Latitud: 38.4 Norte
Longitud: 9 Oeste
Zenith ~= 90
offset:1 GMT
\*/

echo date("D M d Y"). ', hora de puesta del sol : ' .date_sunset(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1);

    Resultado del ejemplo anterior es similar a:

Deprecated: Constant SUNFUNCS_RET_STRING is deprecated in script on line 10
Deprecated: Function date_sunset() is deprecated since 8.1, use date_sun_info() instead in script on line 10
Mon Dec 20 2004, sunset time : 18:13

    **Ejemplo #2 Sin puesta de sol**

&lt;?php
$solstice = strtotime('2017-12-21');
var_dump(date_sunset($solstice, SUNFUNCS_RET_STRING, 69.245833, -53.537222));

    El ejemplo anterior mostrará:

Deprecated: Constant SUNFUNCS_RET_STRING is deprecated in script on line 3
Deprecated: Function date_sunset() is deprecated since 8.1, use date_sun_info() instead in script on line 3
bool(false)

### Ver también

    - [date_sun_info()](#function.date-sun-info) - Retorna un array con las informaciones sobre el amanecer/atardecer

así como el inicio y el fin del amanecer

# date_time_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_time_set — Alias de [DateTime::setTime()](#datetime.settime)

### Descripción

Esta función es un alias de: [DateTime::setTime()](#datetime.settime)

# date_timestamp_get

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_timestamp_get — Alias de [DateTime::getTimestamp()](#datetime.gettimestamp)

### Descripción

Esta función es un alias de: [DateTime::getTimestamp()](#datetime.gettimestamp)

# date_timestamp_set

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

date_timestamp_set — Alias de [DateTime::setTimestamp()](#datetime.settimestamp)

### Descripción

Esta función es un alias de: [DateTime::setTimestamp()](#datetime.settimestamp)

# date_timezone_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_timezone_get — Alias de [DateTime::getTimezone()](#datetime.gettimezone)

### Descripción

Esta función es un alias de: [DateTime::getTimezone()](#datetime.gettimezone)

# date_timezone_set

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

date_timezone_set — Alias de [DateTime::setTimezone()](#datetime.settimezone)

### Descripción

Esta función es un alias de: [DateTime::setTimezone()](#datetime.settimezone)

# getdate

(PHP 4, PHP 5, PHP 7, PHP 8)

getdate — Devuelve la fecha/hora

### Descripción

**getdate**([?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [array](#language.types.array)

Devuelve un [array](#language.types.array) asociativo que contiene las
informaciones de fecha y hora del timestamp, o la fecha/hora
actual local si timestamp es omitido o **[null](#constant.null)**.

### Parámetros

timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve un array asociativo que contiene las informaciones
de fecha y hora del timestamp timestamp.
Los elementos del array asociativo devuelto son los siguientes:

    <caption>**Nombres de las claves del array asociativo devuelto**</caption>



       Clave
       Descripción
       Ejemplo de valor devuelto






       "seconds"
       Representación numérica de los segundos
       0 a 59



       "minutes"
       Representación numérica de los minutos
       0 a 59



       "hours"
       Representación numérica de las horas
       0 a 23



       "mday"
       Representación numérica del día del mes actual
       1 a 31



       "wday"
       Representación numérica del día de la semana actual
       0 (para Domingo) a 6 (para Sábado)



       "mon"
       Representación numérica del mes
       1 a 12



       "year"
       Año, con 4 dígitos
       Ejemplos: 1999 o 2003



       "yday"
       Representación numérica del día del año
       0 a 365



       "weekday"
       Versión en texto del día de la semana
       Sunday a Saturday



       "month"
       Versión en texto del mes, como January o March
       January a December



       0
       Número de segundos desde la época Unix, similar al valor devuelto
        por la función [time()](#function.time) y utilizado por [date()](#function.date).

       Depende del sistema, típicamente de -2147483648 a
        2147483647.





### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con getdate()**

&lt;?php
$today = getdate();
print_r($today);

    Resultado del ejemplo anterior es similar a:

Array
(
[seconds] =&gt; 40
[minutes] =&gt; 58
[hours] =&gt; 21
[mday] =&gt; 17
[wday] =&gt; 2
[mon] =&gt; 6
[year] =&gt; 2003
[yday] =&gt; 167
[weekday] =&gt; Tuesday
[month] =&gt; June
[0] =&gt; 1055901520
)

### Ver también

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [idate()](#function.idate) - Formatea una parte de la hora/fecha local como un entero

    - [localtime()](#function.localtime) - Obtiene la hora local

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

# gettimeofday

(PHP 4, PHP 5, PHP 7, PHP 8)

gettimeofday — Devuelve la hora actual

### Descripción

**gettimeofday**([bool](#language.types.boolean) $as_float = **[false](#constant.false)**): [array](#language.types.array)|[float](#language.types.float)

Es una interfaz con gettimeofday(2). Devuelve un array
asociativo que contiene las informaciones devueltas por el sistema.

### Parámetros

     as_float


       Cuando se define como **[true](#constant.true)**, se devuelve un [float](#language.types.float) en lugar de un array.





### Valores devueltos

Por omisión, se devuelve un [array](#language.types.array). Si el argumento as_float
está definido, entonces se devolverá un [float](#language.types.float).

Claves del array :

    -

      "sec" : segundos desde la época Unix



    -

      "usec" : microsegundos



    -

      "minuteswest" : minutos de desfase respecto a Greenwich,
      hacia el Oeste.



    -

      "dsttime" : tipo de corrección dst


### Ejemplos

    **Ejemplo #1 Ejemplo con gettimeofday()**

&lt;?php
print_r(gettimeofday());

echo gettimeofday(true);

    Resultado del ejemplo anterior es similar a:

Array
(
[sec] =&gt; 1073504408
[usec] =&gt; 238215
[minuteswest] =&gt; 0
[dsttime] =&gt; 1
)
1073504408.23910

# gmdate

(PHP 4, PHP 5, PHP 7, PHP 8)

gmdate — Formatea una fecha/hora GMT/TUC

### Descripción

**gmdate**([string](#language.types.string) $format, [?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [string](#language.types.string)

**gmdate()** es idéntico a la función
[date()](#function.date), excepto que el tiempo
devuelto es GMT (Greenwich Mean Time).

### Parámetros

     format


       El formato de la fecha de salida. Ver las opciones de formato para la función
       [date()](#function.date).





timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve una fecha formateada.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con gmdate()**

&lt;?php
date_default_timezone_set("Europe/Helsinki");

echo date("M d Y H:i:s e", mktime(0, 0, 0, 1, 1, 1998)) . "\n";
echo gmdate("M d Y H:i:s e", mktime(0, 0, 0, 1, 1, 1998));

    El ejemplo anterior mostrará:

Jan 01 1998 00:00:00 Europe/Helsinki
Dec 31 1997 22:00:00 UTC

### Ver también

    - [DateTimeImmutable::__construct()](#datetimeimmutable.construct) - Devuelve un nuevo objeto DateTimeImmutable

    - [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [gmmktime()](#function.gmmktime) - Retorna el timestamp UNIX de una fecha GMT

    - [IntlDateFormatter::format()](#intldateformatter.format) - Formatea la fecha y la hora como string

# gmmktime

(PHP 4, PHP 5, PHP 7, PHP 8)

gmmktime — Retorna el timestamp UNIX de una fecha GMT

### Descripción

**gmmktime**(
    [int](#language.types.integer) $hour,
    [?](#language.types.null)[int](#language.types.integer) $minute = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $second = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $month = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $day = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $year = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Similar a la función [mktime()](#function.mktime) excepto que los argumentos
opcionales pasados son GMT. **gmmktime()** utiliza internamente
la función [mktime()](#function.mktime), por lo tanto, solo los tiempos válidos
en la zona horaria local derivada pueden ser utilizados.

Al igual que [mktime()](#function.mktime), los argumentos restantes pueden
ser omitidos. En ese caso, tomarán los valores GMT actuales.

Llamar a **gmmktime()** sin argumentos no es soportado.
Esto resultará en lanzar una [ArgumentCountError](#class.argumentcounterror).
[time()](#function.time) puede ser utilizado para obtener el timestamp actual.

### Parámetros

     hour


       El número de horas desde el inicio del día establecido por los parámetros
       month, day y year.
       Los valores negativos hacen referencia a las horas antes de la medianoche del día en cuestión.
       Los valores superiores a 23 hacen referencia a las horas asociadas al(dos) día(s) siguiente(s).






     minute


       El número de minutos desde el inicio de la hora hour.
       Los valores negativos hacen referencia a los minutos de la hora anterior.
       Los valores superiores a 59 hacen referencia a los minutos asociados
       a la(s) hora(s) siguiente(s).






     second


       El número de segundos desde el inicio del minuto minute.
       Los valores negativos hacen referencia a los segundos del minuto anterior.
       Los valores superiores a 59 hacen referencia a los segundos asociados a
       el(la) minuto(s) siguiente(s).






     month


       El número de meses desde el final del año anterior.
       Los valores comprendidos entre 1 y 12 hacen referencia a los meses
       del calendario normal del año en cuestión. Los valores inferiores a
       1 (incluyendo los valores negativos) hacen referencia a los meses del año
       anterior en orden inverso, por lo tanto, 0 corresponde a diciembre, -1 a noviembre, etc.
       Los valores superiores a 12 hacen referencia al mes correspondiente en el(la) año(s) siguiente(s).






     day


       El número de días desde el final del mes anterior. Los valores comprendidos
       entre 1 y 28, 29, 30, 31 (según el mes) hacen referencia a los días normales
       en el mes actual. Los valores inferiores a 1 (incluyendo los valores negativos)
       hacen referencia a los días del mes anterior, por lo tanto, 0 corresponde al último día del
       mes anterior, -1, el día anterior, etc. Los valores superiores al número
       de días del mes actual hacen referencia a los días correspondientes del(la) mes(es) siguiente(s).






     year


       El año





### Valores devueltos

Retorna un timestamp Unix, en forma de un [int](#language.types.integer), o **[false](#constant.false)** si
el timestamp no cabe en un entero PHP.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        hour ya no es opcional.
        Para obtener un timestamp unix, se deberá utilizar la
        función [time()](#function.time).




       8.0.0

        minute, second, month,
        day y year ahora son nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con gmmktime()**

&lt;?php
date_default_timezone_set("Indian/Maldives");

echo "July 1, 2000 is on a " . date("l", gmmktime(0, 0, 0, 7, 1, 2000));

    El ejemplo anterior mostrará:

July 1, 2000 is on a Saturday

### Ver también

    - La clase [DateTimeImmutable](#class.datetimeimmutable)

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

# gmstrftime

(PHP 4, PHP 5, PHP 7, PHP 8)

gmstrftime — Formatea una fecha/hora GMT/TUC según la configuración local

**Advertencia**Esta función
está _OBSOLETA_ a partir de PHP 8.1.0.
Se recomienda evitar su uso.

Las alternativas a esta función incluyen:

- [gmdate()](#function.gmdate)

- [IntlDateFormatter::format()](#intldateformatter.format)

### Descripción

[#[\Deprecated]](class.deprecated.html)
**gmstrftime**([string](#language.types.string) $format, [?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Se comporta igual que [strftime()](#function.strftime) excepto que la
hora devuelta es la hora del meridiano de Greenwich (GMT). Por ejemplo, cuando se ejecuta
en la hora estándar del este (GMT -0500), la primera línea a continuación imprime
"Dec 31 1998 20:00:00", mientras que la segunda imprime
"Jan 01 1999 01:00:00".

**Advertencia**

    Esta función depende de la información local del sistema operativo, que puede
    ser inconsistente o no estar disponible. Se recomienda utilizar el método
    [IntlDateFormatter::format()](#intldateformatter.format).

### Parámetros

     format


       Ver la descripción de la función [strftime()](#function.strftime).





timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve un [string](#language.types.string) formateado según el formato dado por el
argumento timestamp o la fecha actual
si no se proporciona ningún argumento timestamp.
Los nombres de los meses, días de la semana y otras cadenas
dependientes de una localización dada, respetan la localización
actual definida por la función [setlocale()](#function.setlocale).
En caso de error, se devuelve **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con gmstrftime()**

&lt;?php
setlocale(LC_TIME, 'en_US');
echo strftime("%b %d %Y %H:%M:%S", mktime(20, 0, 0, 12, 31, 98)) . "\n";
echo gmstrftime("%b %d %Y %H:%M:%S", mktime(20, 0, 0, 12, 31, 98)) . "\n";

### Ver también

    - [IntlDateFormatter::format()](#intldateformatter.format) - Formatea la fecha y la hora como string

    - [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

    - [strftime()](#function.strftime) - Formatea una fecha/hora local con la configuración local

# idate

(PHP 5, PHP 7, PHP 8)

idate — Formatea una parte de la hora/fecha local como un entero

### Descripción

**idate**([string](#language.types.string) $format, [?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**idate()** devuelve un número formateado con el
formato format y que representa el timestamp
timestamp o la hora actual si
timestamp es omitido.
En otras palabras, el parámetro timestamp es opcional
y el valor por omisión es el valor devuelto por la función [time()](#function.time).

A diferencia de la función [date()](#function.date), **idate()**
acepta solo un carácter como parámetro format.

### Parámetros

     format





        <caption>**Los siguientes caracteres son reconocidos en el string
        del parámetro format**</caption>



           Caracteres de format
           Descripción






           B
           Tiempo Internet Swatch Beat



           d
           El día del mes



           h
           Hora (formato 12 horas)



           H
           Hora (formato 24 horas)



           i
           Minutos



           I(i, en mayúscula)
           Devuelve 1 si el horario de verano está activado,
            0 en caso contrario



           L(l, en mayúscula)
           Devuelve 1 para un año bisiesto,
            0 en caso contrario



           m
           Número del mes



           N

            Día de la semana ISO-8601 (1 para
            el lunes a 7 para el domingo)




           o
           Año ISO-8601 (4 dígitos)



           s
           Segundos



           t
           Día del mes actual



           U
           Segundos desde la época Unix - 1 de Enero de 1970 00:00:00 UTC -
            esto es lo mismo que la función [time()](#function.time)



           w
           Día de la semana (0 para Domingo)



           W
           El número de semana del año; según ISO-8601, las semanas comienzan
            el Lunes



           y
           Año en 1 o 2 dígitos, ver la nota más abajo



           Y
           Año en 4 dígitos



           z
           Día del año



           Z
           Desplazamiento horario, en segundos









timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve un [int](#language.types.integer) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

Dado que **idate()** siempre devuelve un [int](#language.types.integer)
y no puede comenzar con 0,
**idate()** puede devolver menos dígitos de los
que se podrían esperar. Ver el ejemplo a continuación.

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Añade los caracteres de formato N (día de la semana ISO-8601)
        y o (año ISO-8601).




       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con idate()**

&lt;?php
$timestamp = strtotime('1st January 2004'); // 1072915200

// esto muestra el año en dos dígitos
// sin embargo, dado que este dígito comenzará con "0",
// solo "4" será mostrado
echo idate('y', $timestamp) . "\n";

$timestamp = strtotime('1st January 2024'); // 1704067200
echo idate('y', $timestamp);

    El ejemplo anterior mostrará:

4
24

### Ver también

    - [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [getdate()](#function.getdate) - Devuelve la fecha/hora

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

# localtime

(PHP 4, PHP 5, PHP 7, PHP 8)

localtime — Obtiene la hora local

### Descripción

**localtime**([?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**, [bool](#language.types.boolean) $associative = **[false](#constant.false)**): [array](#language.types.array)

**localtime()** devuelve un array idéntico a
la estructura devuelta por la función C localtime.

### Parámetros

timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

     associative


       Determina si la función debe devolver un array regular, indexado
       numéricamente, o un array asociativo.





### Valores devueltos

Si associative está definido como **[false](#constant.false)** o no se proporciona,
entonces el array se devuelve como un array indexado numéricamente estándar.
Si associative está definido como **[true](#constant.true)** entonces
**localtime()** devuelve un array asociativo que contiene
los elementos de la estructura devuelta por la llamada a la
función localtime de C
Las claves del array asociativo son las siguientes:

    -

      "tm_sec" : segundos, de 0 a 59



    -

      "tm_min" : minutos, de 0 a 59



    -

      "tm_hour" : hora, de 0 a 23



    -

      "tm_mday" : día del mes, de 1 a 31



    -

      "tm_mon" : mes del año, de 0 (Ene) a 11 (Dic)



    -

      "tm_year" : Año desde 1900



    -

      "tm_wday" : Día de la semana, de 0 (Dom) a 6 (Sáb)



    -

      "tm_yday" : Día del año, de 0 a 365



    -

      "tm_isdst" : ¿Está en vigor el horario de verano?


      Valor positivo si es así, 0 en caso contrario,
      valor negativo si el resultado no ha podido determinarse.


### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con localtime()**

&lt;?php
$localtime = localtime();
$localtime_assoc = localtime(time(), true);
print_r($localtime);
print_r($localtime_assoc);

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 24
[1] =&gt; 3
[2] =&gt; 19
[3] =&gt; 3
[4] =&gt; 3
[5] =&gt; 105
[6] =&gt; 0
[7] =&gt; 92
[8] =&gt; 1
)

Array
(
[tm_sec] =&gt; 24
[tm_min] =&gt; 3
[tm_hour] =&gt; 19
[tm_mday] =&gt; 3
[tm_mon] =&gt; 3
[tm_year] =&gt; 105
[tm_wday] =&gt; 0
[tm_yday] =&gt; 92
[tm_isdst] =&gt; 1
)

### Ver también

    - [getdate()](#function.getdate) - Devuelve la fecha/hora

# microtime

(PHP 4, PHP 5, PHP 7, PHP 8)

microtime — Devuelve el timestamp UNIX actual con microsegundos

### Descripción

**microtime**([bool](#language.types.boolean) $as_float = **[false](#constant.false)**): [string](#language.types.string)|[float](#language.types.float)

**microtime()** devuelve el timestamp Unix, con
microsegundos. Esta función está únicamente disponible en
los sistemas que soportan la función gettimeofday().

Para medir el rendimiento, se recomienda el uso de [hrtime()](#function.hrtime).

### Parámetros

     as_float


       Si se utiliza y se define como **[true](#constant.true)**, **microtime()** devolverá
       un número de coma flotante en lugar de un [string](#language.types.string), tal como se describe
       en la sección de valores devueltos a continuación.





### Valores devueltos

Por omisión, **microtime()** devuelve un [string](#language.types.string) en
el formato "msec sec", donde sec es el número de segundos
desde la época Unix (1 de Enero de 1970, 00:00:00 GMT),
y msec es el número de microsegundos que han transcurrido
desde sec, expresado en segundos en forma de fracción
decimal.

Si as_float se define como **[true](#constant.true)**, entonces
**microtime()** devuelve un número de coma flotante,
que representa el tiempo actual, en segundos, desde la época Unix, con precisión
de microsegundo.

### Ejemplos

    **Ejemplo #1 Duración de ejecución de un script en PHP**

&lt;?php
$time_start = microtime(true);

// Espera durante un momento
usleep(10_000);

$time_end = microtime(true);
$time = $time_end - $time_start;

print "No hacer nada durante $time segundos\n";

    **Ejemplo #2 Ejemplo con microtime()** y REQUEST_TIME_FLOAT

&lt;?php
// Duración de espera aleatoria
usleep(random_int(10_000, 1_000_000));

// REQUEST_TIME_FLOAT está disponible en el array superglobal $_SERVER.
// Contiene el timestamp del inicio de la petición, con precisión de microsegundo.
$time = microtime(true) - $\_SERVER["REQUEST_TIME_FLOAT"];

echo "No hacer nada durante $time segundos\n";

### Ver también

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

    - [hrtime()](#function.hrtime) - Devuelve el tiempo de alta resolución del sistema

# mktime

(PHP 4, PHP 5, PHP 7, PHP 8)

mktime — Obtener la marca de tiempo Unix de una fecha

### Descripción

**mktime**(
    [int](#language.types.integer) $hour,
    [?](#language.types.null)[int](#language.types.integer) $minute = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $second = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $month = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $day = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $year = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la marca de tiempo Unix correspondiente a los argumentos
dados. Esta marca de tiempo es un entero que contiene el número de
segundos entre la Época Unix (1 de Enero del 1970 00:00:00 GMT) y el instante
especificado.

Cualquier parámetro opcional omitido o a **[null](#constant.null)** se establecerá al valor actual según
la fecha y hora locales.

**Advertencia**

    Tenga en cuenta que el orden de los argumentos es extraño:
    month, day,
    year, y no en el orden más natural de
    year, month,
    day.

Llamar a **mktime()** sin argumentos no está soportado,
y devolverá un [ArgumentCountError](#class.argumentcounterror).
Puede usar [time()](#function.time) para obtener la marca de tiempo actual.

### Parámetros

     hour


       El número de la hora relativa al inicio del día determinado por
       month, day y year.
       Los valores negativos referencian la hora antes de la media noche del día en cuestión.
       Los valores mayores que 23 referencian la hora apropiada en el/los día/s siguiente/s.






     minute


       El número de los minutos relativos al inicio de hour.
       Los valores negativos referencian el minuto en la hora previa.
       Los valores mayores que 59 referencian el minuto apropiado en la/s hora/s siguiente/s.






     second


       El número de segundos relativos al inicio de minute.
       Los valores negativos referencian el segundo en el minuto previo.
       Los valores mayores que 59 referencian el segundo apropiado en el/los minuto/s siguiente/s.






     month


       El número del mes relativo al final del año previo.
       Los valores de 1 a 12 referencian los meses del calendario normal del año en cuestión.
       Los valores menores que 1 (incluyendo valores negativos) referencian los meses del año previo en orden inverso, por lo que 0 es Diciembre, -1 es Noviembre, etc.
       Los valores mayores que 12 referencian el mes apropiado en el/los año/s siguiente/s.






     day


       El número del día relativo al final del mes previo.
       Los valores del 1 al 28, 29, 30 o 31 (dependiendo del mes) referencian los días normales del mes relevante.
       Los valores menores que 1 (incluyendo valores negativos) referencian los días del mes previo por lo que 0 es el último día del mes previo, -1 es el día anterior a ese, etc.
       Los valores mayores que el número de días del mes relevante referencian el día apropiado en el/los mes/es siguiente/s.






     year


       El número del año, puede ser un valor de dos o cuatro dígitos,
       con valores entre 0-69 mapeados a 2000-2069 y 70-100 a
       1970-2000. En sistemas donde time_t es un entero con signo de 32 bits, como
       es lo más normal hoy en día, el rango válido para year
       es entre 1901 y 2038. Sin embargo, antes de PHP 5.1.0 este
       rango estaba limitado desde 1970 a 2038 en algunos sistemas (p.ej. Windows).





### Valores devueltos

**mktime()** devuelve la marca de tiempo Unix de los argumentos
dados, o **[false](#constant.false)** si la marca de tiempo no cabe en un entero PHP.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        hour ya no es opcional. Si necesita una
        marca de tiempo unix, utilice [time()](#function.time).




       8.0.0

        minute, second, month,
        day y year ahora pueden ser nulos.





### Ejemplos

    **Ejemplo #1 Ejemplo básico de mktime()**

&lt;?php
// Establece la zona horaria a utilizar.
date_default_timezone_set('UTC');

// Imprime: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000)) . "\n";

// Imprime algo como: 2006-04-05T01:02:03+00:00
echo date('c', mktime(1, 2, 3, 4, 5, 2006)) . "\n";

    Resultado del ejemplo anterior es similar a:

July 1, 2000 is on a Saturday
2006-04-05T01:02:03+00:00

    **Ejemplo #2 Ejemplo mktime()**



     **mktime()** es útil para hacer cálculos con fechas
     y validaciones, ya que calculará automáticamente los valores correctos
     para entradas fuera de rango. Por ejemplo, cada una de las siguientes líneas
     devuelve la cadena: "Jan-01-1998".

&lt;?php
date_default_timezone_set('America/New_York');

echo date("c", mktime(0, 0, 0, 12, 32, 1997)) . "\n";
echo date("c", mktime(0, 0, 0, 13, 1, 1997)) . "\n";
echo date("c", mktime(0, 0, 0, 1, 1, 1998)) . "\n";
echo date("c", mktime(0, 0, 0, 1, 1, 98)) . "\n";

    Resultado del ejemplo anterior es similar a:

1998-01-01T00:00:00-05:00
1998-01-01T00:00:00-05:00
1998-01-01T00:00:00-05:00
1998-01-01T00:00:00-05:00

    **Ejemplo #3 Usando mktime para buscar fechas relativas**

&lt;?php
date_default_timezone_set('Asia/Tokyo');

$tomorrow = mktime(0, 0, 0, date("m") , date("d")+1, date("Y"));
print date('c', $tomorrow) . "\n";

$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
print date('c', $lastmonth) . "\n";

$nextyear = mktime(0, 0, 0, date("m"), date("d"), date("Y")+1) . "\n";
print date('c', $nextyear) . "\n";

    Resultado del ejemplo anterior es similar a:

2025-09-30T00:00:00+09:00
2025-08-29T00:00:00+09:00
2026-09-29T00:00:00+09:00

**Nota**:

     Esto puede ser más fiable que simplemente sumar o restar el número
     de segundos de un día o mes a una marca de tiempo debido al horario
     de verano.









    **Ejemplo #4 El último día del mes**



     El último día de cualquier mes dado se puede expresar como el día "0"
     del mes siguiente, no el día -1. Los dos ejemplos siguientes
     producirán la cadena "El último día en Feb 2000 es: 29".

&lt;?php

$lastday = mktime(0, 0, 0, 3, 0, 2000);
echo 'Last day in Feb 2000 is: ', date('d', $lastday) . "\n";

$lastday = mktime(0, 0, 0, 4, -31, 2000);
echo 'Last day in Feb 2000 is: ', date('d', $lastday) . "\n";

    El ejemplo anterior mostrará:

Last day in Feb 2000 is: 29
Last day in Feb 2000 is: 29

### Ver también

    - La clase [DateTimeImmutable](#class.datetimeimmutable)

    - [checkdate()](#function.checkdate) - Valida una fecha gregoriana

    - [gmmktime()](#function.gmmktime) - Retorna el timestamp UNIX de una fecha GMT

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [time()](#function.time) - Devuelve el timestamp UNIX actual

# strftime

(PHP 4, PHP 5, PHP 7, PHP 8)

strftime — Formatea una fecha/hora local con la configuración local

**Advertencia**Esta función
está _OBSOLETA_ a partir de PHP 8.1.0.
Se recomienda evitar su uso.

Las alternativas a esta función incluyen:

- [date()](#function.date)

- [IntlDateFormatter::format()](#intldateformatter.format)

### Descripción

[#[\Deprecated]](class.deprecated.html)
**strftime**([string](#language.types.string) $format, [?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Formatea una fecha y/o una hora según la localización local. Los nombres
de los meses, de los días de la semana pero también de otras cadenas dependientes
de la localización, respetarán la localización actual definida por la función
[setlocale()](#function.setlocale).

**Advertencia**

    Es posible que no todos los especificadores de conversión sean compatibles con su biblioteca C, en cuyo
    caso no serán compatibles con **strftime()** de PHP.
    Además, no todas las plataformas admiten marcas de tiempo negativas, por lo que su
    rango de fechas puede estar limitado a fechas no anteriores a la época Unix. Esto significa que
    %e, %T, %R y %D
    (y puede que otros) y las fechas anteriores al
    1 de Enero de 1970 no funcionarán bajo Windows,
    en algunas distribuciones de Linux, y algunos otros sistemas operativos. Para Windows, una
    lista completa de las opciones de conversión está disponible en el
    [» sitio de MSDN](http://msdn.microsoft.com/en-us/library/fe06s4ak.aspx).
    Utilice en su lugar el método
    [IntlDateFormatter::format()](#intldateformatter.format).

### Parámetros

     format





        <caption>**Los siguientes caracteres son reconocidos en el argumento
         format**</caption>



           format
           Descripción
           Ejemplo de valores devueltos






           *Día*
           ---
           ---



           %a
           Nombre abreviado del día de la semana
           De Sun a Sat



           %A
           Nombre completo del día de la semana
           De Sunday a Saturday



           %d
           Día del mes en formato numérico, con 2 dígitos (con el cero inicial)
           De 01 a 31



           %e
           Día del mes, con un espacio precediendo al primer dígito.
           La implementación de Windows es diferente, véase más abajo para más información.
           De  1 a 31



           %j
           Día del año, con 3 dígitos con cero inicial
           001 a 366



           %u
           Representación ISO-8601 del día de la semana
           De 1 (para Lunes) a 7 (para Domingo)



           %w
           Representación numérica del día de la semana
           De 0 (para Domingo) a 6 (para Sábado)



           *Semana*
           ---
           ---



           %U
           Número de la semana del año dado, comenzando por el primer
            Lunes como primera semana
           13 (para la 13ª semana completa del año)



           %V
           Número de la semana del año, siguiendo la norma ISO-8601:1988,
            comenzando como primera semana, la semana del año que contiene al menos
            4 días, y donde Lunes es el inicio de la semana
           De 01 a 53 (donde 53
            cuenta como semana de solapamiento)



           %W
           Una representación numérica de la semana del año, comenzando
            por el primer Lunes de la primera semana
           46 (para la 46ª semana de la semana comenzando
            por un Lunes)



           *Mes*
           ---
           ---



           %b
           Nombre del mes, abreviado, según la localización
           De Jan a Dec



           %B
           Nombre completo del mes, según la localización
           De January a December



           %h
           Nombre del mes abreviado, según la localización (alias de %b)
           De Jan a Dec



           %m
           Mes, con 2 dígitos
           De 01 (para Enero) a 12 (para Diciembre)



           *Año*
           ---
           ---



           %C
           Representación, con 2 dígitos, del siglo (año dividido por 100, reducido a un entero)
           19 para el siglo 20



           %g
           Representación, con 2 dígitos, del año, compatible con los estándares ISO-8601:1988 (véase %V)
           Ejemplo: 09 para la semana del 6 de enero de 2009



           %G
           La versión completa de 4 dígitos de %g
           Ejemplo: 2009 para la semana del 3 de enero de 2009



           %y
           El año, con 2 dígitos
           Ejemplo: 09 para 2009, 79 para 1979



           %Y
           El año, con 4 dígitos
           Ejemplo: 2038



           *Hora*
           ---
           ---



           %H
           La hora, con 2 dígitos, en formato 24 horas
           De 00 a 23



           %k
           La hora en formato 24 horas, con un espacio precediendo a
            un solo dígito
           De  0 a 23



           %I
           Hora, con 2 dígitos, en formato 12 horas
           De 01 a 12



           %l ('L' minúscula)
           Hora, en formato 12 horas, con un espacio precediendo a un solo dígito
           De  1 a 12



           %M
           Minuto, con 2 dígitos
           De 00 a 59



           %p
           'AM' o 'PM', en mayúsculas, basado en la hora proporcionada

            Ejemplo: AM para 00:31, PM para 22:23.
            El resultado exacto depende del sistema operativo, y pueden devolver también variantes en minúsculas,
            o variantes con puntos (como a.m.).




           %P
           'am' o 'pm', en minúsculas, basado en la hora proporcionada

            Ejemplo: am para 00:31, pm para 22:23.
            No soportado por todos los sistemas operativos.




           %r
           Idéntico a "%I:%M:%S %p"
           Ejemplo: 09:34:17 PM para 21:34:17



           %R
           Idéntico a "%H:%M"
           Ejemplo: 00:35 para 12:35 AM, 16:44 para 4:44 PM



           %S
           Segundo, con 2 dígitos
           De 00 a 59



           %T
           Idéntico a "%H:%M:%S"
           Ejemplo: 21:34:17 para 09:34:17 PM



           %X
           Representación de la hora, basada en la localización, sin la fecha
           Ejemplo: 03:59:16 o 15:59:16



           %z

            El desplazamiento horario. No implementado tal como se describe en Windows.
            Ver más abajo para más información.
           Ejemplo: -0500 para la hora del este de EE.UU.



           %Z

            La abreviación del desplazamiento horario. No implementado tal como se describe en
            Windows. Ver más abajo para más información.


            Ejemplo: EST para la hora del este




           *Hora y fecha*
           ---
           ---



           %c
           Fecha y hora preferidas, basadas en la localización
           Ejemplo: Tue Feb  5 00:45:10 2009 para
            el 5 de febrero de 2009 a las 12:45:10 AM



           %D
           Idéntico a "%m/%d/%y"
           Ejemplo: 02/05/09 para el 5 de febrero de 2009



           %F

            Idéntico a "%Y-%m-%d"
            (usado habitualmente por las bases de datos)

           Ejemplo: 2009-02-05 para el 5 de febrero de 2009



           %s
           Timestamp de la época Unix (idéntico a la función [time()](#function.time))
           Ejemplo: 305815200 para el 10 de septiembre de 1979 08:40:00 AM



           %x
           Representación preferida de la fecha, basada en la localización, sin la hora
           Ejemplo: 02/05/09 para el 5 de febrero de 2009



           *Varios*
           ---
           ---



           %n
           Una nueva línea ("\n")
           ---



           %t
           Una tabulación ("\t")
           ---



           %%
           El carácter de porcentaje ("%")
           ---







      **Advertencia**

        A diferencia de la norma ISO-9899:1999, Sun Solaris
        comienza con el Domingo a 1. También, el formato %u
        no funcionará tal como se describe en este manual.




      **Advertencia**

        *Solo Windows:*




        El modificador %e
        no es soportado bajo Windows. Para calcular el valor, el modificador
        %#d puede ser utilizado en su lugar. El ejemplo de abajo ilustra la
        manera de escribir un código multiplataforma.




        Los modificadores %z y %Z
        devuelven ambos el nombre de la zona horaria en lugar del desplazamiento
        o de la abreviación.




      **Advertencia**

        *Solo macOS y musl:* El modificador %P
        no es soportado por la implementación de esta función bajo macOS.






timestamp
El parámetro opcional timestamp es un timestamp
Unix de tipo [int](#language.types.integer) que por omisión es la hora actual local si
timestamp es omitido o **[null](#constant.null)**. En otras
palabras, es por omisión el valor de la función [time()](#function.time).

### Valores devueltos

Devuelve una [string](#language.types.string) formateada según el argumento format
dado, utilizando el argumento timestamp o la fecha local
actual si no se proporciona ningún timestamp. Los nombres de los meses, de los días de la
semana pero también de otras cadenas dependientes de la localización, respetarán
la localización actual definida por la función [setlocale()](#function.setlocale).

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

Dado que la salida depende de la biblioteca C subyacente, algunos
especificadores de conversión no son soportados. Bajo Windows,
el hecho de proporcionar un especificador de conversión desconocido devolverá
5 mensajes de nivel **[E_WARNING](#constant.e-warning)** y devolverá **[false](#constant.false)**
al final. Bajo otros sistemas operativos, no recibirá ningún
mensaje de nivel **[E_WARNING](#constant.e-warning)** y la salida contendrá los
especificadores no convertidos.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        timestamp ahora es nullable.





### Ejemplos

Este ejemplo solo funcionará si tiene las localizaciones respectivas
instaladas en su sistema.

    **Ejemplo #1 Ejemplo con strftime()**

&lt;?php
setlocale(LC_TIME, "C");
echo strftime("%A");
setlocale(LC_TIME, "fi_FI");
echo strftime(" in Finnish is %A,");
setlocale(LC_TIME, "fr_FR");
echo strftime(" in French %A and");
setlocale(LC_TIME, "de_DE");
echo strftime(" in German %A.\n");

    **Ejemplo #2 Ejemplo en formato de fecha ISO 8601:1988**

&lt;?php
/\* Diciembre 2002 / Enero 2003
ISOWk L M X J V S D

---

51 16 17 18 19 20 21 22
52 23 24 25 26 27 28 29
1 30 31 1 2 3 4 5
2 6 7 8 9 10 11 12
3 13 14 15 16 17 18 19 \*/

// Muestra: 12/28/2002 - %V,%G,%Y = 52,2002,2002
echo "12/28/2002 - %V,%G,%Y = " . strftime("%V,%G,%Y", strtotime("12/28/2002")) . "\n";

// Muestra: 12/30/2002 - %V,%G,%Y = 1,2003,2002
echo "12/30/2002 - %V,%G,%Y = " . strftime("%V,%G,%Y", strtotime("12/30/2002")) . "\n";

// Muestra: 1/3/2003 - %V,%G,%Y = 1,2003,2003
echo "1/3/2003 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/3/2003")) . "\n";

// Muestra: 1/10/2003 - %V,%G,%Y = 2,2003,2003
echo "1/10/2003 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/10/2003")) . "\n";

/\* Diciembre 2004 / Enero 2005
ISOWk L M X J V S D

---

51 13 14 15 16 17 18 19
52 20 21 22 23 24 25 26
53 27 28 29 30 31 1 2
1 3 4 5 6 7 8 9
2 10 11 12 13 14 15 16 \*/

// Muestra: 12/23/2004 - %V,%G,%Y = 52,2004,2004
echo "12/23/2004 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/23/2004")) . "\n";

// Muestra: 12/31/2004 - %V,%G,%Y = 53,2004,2004
echo "12/31/2004 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/31/2004")) . "\n";

// Muestra: 1/2/2005 - %V,%G,%Y = 53,2004,2005
echo "1/2/2005 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/2/2005")) . "\n";

// Muestra: 1/3/2005 - %V,%G,%Y = 1,2005,2005
echo "1/3/2005 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/3/2005")) . "\n";

    **Ejemplo #3 %e funcionando en toda plataforma**

&lt;?php

// 1 de Enero: resultados en: '%e%1%' (%%, e, %%, %e, %%)
$format = '%%e%%%e%%';

// Verifica bajo Windows, para encontrar y reemplazar el modificador %e
// correctamente
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
$format = preg_replace('#(?&lt;!%)((?:%%)\*)%e#', '\1%#d', $format);
}

echo strftime($format);

    **Ejemplo #4 Muestra todos los formatos conocidos o no**

&lt;?php

// Describe los formatos
$strftimeFormats = array(
'A' =&gt; 'Una representación textual completa del día',
'B' =&gt; 'Nombre del mes completo, basado en la localización',
'C' =&gt; 'Representación con 2 dígitos del año (año, dividido por 100, truncado a entero)',
'D' =&gt; 'Idéntico a "%m/%d/%y"',
'E' =&gt; '',
'F' =&gt; 'Idéntico a "%Y-%m-%d"',
'G' =&gt; 'La versión completa, con 4 dígitos de %g',
'H' =&gt; 'Una representación con 2 dígitos de la hora en formato 24-horas',
'I' =&gt; 'Una representación con 2 dígitos de la hora en formato 12-horas',
'J' =&gt; '',
'K' =&gt; '',
'L' =&gt; '',
'M' =&gt; 'Una representación con 2 dígitos de los minutos',
'N' =&gt; '',
'O' =&gt; '',
'P' =&gt; '"am" o "pm" (en minúsculas) basado en la hora actual',
'Q' =&gt; '',
'R' =&gt; 'Idéntico a "%H:%M"',
'S' =&gt; 'Una representación con 2 dígitos de los segundos',
'T' =&gt; 'Idéntico a "%H:%M:%S"',
'U' =&gt; 'Número de la semana para el año actual, comenzando por el primer Domingo como primera semana',
'V' =&gt; 'Número ISO-8601:1988 de la semana del año actual, comenzando por la primera semana del año con al menos 4 días de semana, con el Lunes como inicio de semana',
'W' =&gt; 'Una representación numérica de la semana del año, comenzando por el primer Lunes como primera semana',
'X' =&gt; 'Representación preferida para la hora, basada en la localización, sin la fecha',
'Y' =&gt; 'Una representación con 4 dígitos del año',
'Z' =&gt; 'La abreviación del desplazamiento horario, no proporcionada por %z (depende del sistema operativo)',
'a' =&gt; 'La abreviación de la representación textual del día',
'b' =&gt; 'La abreviación del nombre del mes, basada en la localización',
'c' =&gt; 'Timestamp preferido basado en la localización',
'd' =&gt; 'Día del mes con 2 dígitos (con el cero inicial)',
'e' =&gt; 'Día del mes, con un espacio precediendo a un solo dígito',
'f' =&gt; '',
'g' =&gt; 'Una representación con 2 dígitos del año en formato ISO-8601:1988 (ver %V)',
'h' =&gt; 'Abreviación del nombre del mes, basada en la localización (alias de %b)',
'i' =&gt; '',
'j' =&gt; 'Día del año, con 3 dígitos con cero inicial',
'k' =&gt; 'Hora, en formato 24-horas, con un espacio precediendo a un solo dígito',
'l' =&gt; 'Hora, en formato 12-horas, con un espacio precediendo a un solo dígito',
'm' =&gt; 'Una representación del mes con 2 dígitos',
'n' =&gt; 'Un carácter de nueva línea ("\n")',
'o' =&gt; '',
'p' =&gt; '"AM" o "PM" (en mayúsculas) basado en la hora actual',
'q' =&gt; '',
'r' =&gt; 'Idéntico a "%I:%M:%S %p"',
's' =&gt; 'Timestamp respecto a la época Unix',
't' =&gt; 'Un carácter de tabulación ("\t")',
'u' =&gt; 'Representación numérica del día de la semana en formato ISO-8601',
'v' =&gt; '',
'w' =&gt; 'Representación numérica del día de la semana',
'x' =&gt; 'Representación preferida de la fecha, basada en la localización, sin la hora',
'y' =&gt; 'Representación del año con 2 dígitos',
'z' =&gt; 'O bien el desplazamiento horario desde UTC o su abreviación (según el sistema operativo)',
'%' =&gt; 'Un carácter porcentaje ("%")',
);

// Resultados
$strftimeValues = array();

// 2value los formatos mientras se eliminan los errores
foreach ($strftimeFormats as $format =&gt; $description) {
    if (false !== ($value = @strftime("%{$format}"))) {
        $strftimeValues[$format] = $value;
}
}

// Encuentra el valor más largo
$maxValueLength = 2 + max(array_map('strlen', $strftimeValues));

// Muestra todos los formatos conocidos
foreach ($strftimeValues as $format =&gt; $value) {
    echo "Formato conocido: '{$format}' = ", str_pad("'{$value}'", $maxValueLength), " ( {$strftimeFormats[$format]} )\n";
}

// Muestra todos los formatos no conocidos
foreach (array_diff_key($strftimeFormats, $strftimeValues) as $format =&gt; $description) {
    echo "Formato desconocido: '{$format}' ", str_pad(' ', $maxValueLength), ($description ? " ( {$description} )" : ''), "\n";
}

    Resultado del ejemplo anterior es similar a:

Formato conocido: 'A' = 'Friday' ( Una representación textual completa del día )
Formato conocido: 'B' = 'December' ( Nombre del mes completo, basado en la localización )
Formato conocido: 'H' = '11' ( Una representación con 2 dígitos de la hora en formato 24-horas )
Formato conocido: 'I' = '11' ( Una representación con 2 dígitos de la hora en formato 12-horas )
Formato conocido: 'M' = '24' ( Una representación con 2 dígitos de los minutos )
Formato conocido: 'S' = '44' ( Una representación con 2 dígitos de los segundos )
Formato conocido: 'U' = '48' ( Número de la semana para el año actual, comenzando por el primer Domingo como primera semana )
Formato conocido: 'W' = '48' ( Una representación numérica de la semana del año, comenzando por el primer Lunes como primera semana )
Formato conocido: 'X' = '11:24:44' ( Representación preferida para la hora, basada en la localización, sin la fecha )
Formato conocido: 'Y' = '2010' ( Una representación con 4 dígitos del año )
Formato conocido: 'Z' = 'GMT Standard Time' ( La abreviación del desplazamiento horario, no proporcionada por %z (depende del sistema operativo) )
Formato conocido: 'a' = 'Fri' ( La abreviación de la representación textual del día )
Formato conocido: 'b' = 'Dec' ( La abreviación del nombre del mes, basada en la localización )
Formato conocido: 'c' = '12/03/10 11:24:44' ( Timestamp preferido basado en la localización )
Formato conocido: 'd' = '03' ( Día del mes con 2 dígitos (con el cero inicial) )
Formato conocido: 'j' = '337' ( Día del año, con 3 dígitos con cero inicial )
Formato conocido: 'm' = '12' ( Una representación del mes con 2 dígitos )
Formato conocido: 'p' = 'AM' ( "AM" o "PM" (en mayúsculas) basado en la hora actual )
Formato conocido: 'w' = '5' ( Representación numérica del día de la semana )
Formato conocido: 'x' = '12/03/10' ( Representación preferida de la fecha, basada en la localización, sin la hora )
Formato conocido: 'y' = '10' ( Representación del año con 2 dígitos )
Formato conocido: 'z' = 'GMT Standard Time' ( O bien el desplazamiento horario desde UTC o su abreviación (según el sistema operativo) )
Formato conocido: '%' = '%' ( Un carácter porcentaje ("%") )
Formato desconocido: 'C' ( Representación con 2 dígitos del año (año, dividido por 100, truncado a entero) )
Formato desconocido: 'D' ( Idéntico a "%m/%d/%y" )
Formato desconocido: 'E'
Formato desconocido: 'F' ( Idéntico a "%Y-%m-%d" )
Formato desconocido: 'G' ( La versión completa, con 4 dígitos de %g )
Formato desconocido: 'J'
Formato desconocido: 'K'
Formato desconocido: 'L'
Formato desconocido: 'N'
Formato desconocido: 'O'
Formato desconocido: 'P' ( "am" o "pm" (en minúsculas) basado en la hora actual )
Formato desconocido: 'Q'
Formato desconocido: 'R' ( Idéntico a "%H:%M" )
Formato desconocido: 'T' ( Idéntico a "%H:%M:%S" )
Formato desconocido: 'V' ( Número ISO-8601:1988 de la semana del año actual, comenzando por la primera semana del año con al menos 4 días de semana, con el Lunes como inicio de semana )
Formato desconocido: 'e' ( Día del mes, con un espacio precediendo a un solo dígito )
Formato desconocido: 'f'
Formato desconocido: 'g' ( Una representación con 2 dígitos del año en formato ISO-8601:1988 (ver %V) )
Formato desconocido: 'h' ( Abreviación del nombre del mes, basada en la localización (alias de %b) )
Formato desconocido: 'i'
Formato desconocido: 'k' ( Hora, en formato 24-horas, con un espacio precediendo a un solo dígito )
Formato desconocido: 'l' ( Hora, en formato 12-horas, con un espacio precediendo a un solo dígito )
Formato desconocido: 'n' ( Un carácter de nueva línea ("\n") )
Formato desconocido: 'o'
Formato desconocido: 'q'
Formato desconocido: 'r' ( Idéntico a "%I:%M:%S %p" )
Formato desconocido: 's' ( Timestamp respecto a la época Unix )
Formato desconocido: 't' ( Un carácter de tabulación ("\t") )
Formato desconocido: 'u' ( Representación numérica del día de la semana en formato ISO-8601 )
Formato desconocido: 'v'

### Notas

**Nota**:

    %G y %V, que están basadas
    en la semana ISO 8601:1988, pueden conducir
    a resultados inesperados (aunque correctos) si el
    sistema de numeración no es conocido. Ver el ejemplo
    %V de esta página.

### Ver también

    - [IntlDateFormatter::format()](#intldateformatter.format) - Formatea la fecha y la hora como string

    - [DateTimeInterface::format()](#datetime.format) - Retorna una fecha formateada según el formato proporcionado

    - [» Herramienta de formato strftime() en línea](http://strftime.net/)

    - [setlocale()](#function.setlocale) - Establece la información de configuración local

    - [mktime()](#function.mktime) - Obtener la marca de tiempo Unix de una fecha

    - [strptime()](#function.strptime) - Analiza una fecha/hora generada con strftime

    - [gmstrftime()](#function.gmstrftime) - Formatea una fecha/hora GMT/TUC según la configuración local

    - [» grupo de especificaciones de **strftime()**](http://www.opengroup.org/onlinepubs/007908799/xsh/strftime.html)
















    # strptime

    (PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

strptime —
Analiza una fecha/hora generada con [strftime()](#function.strftime)

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

    ### Descripción

[#[\Deprecated]](class.deprecated.html)
**strptime**([string](#language.types.string) $timestamp, [string](#language.types.string) $format): [array](#language.types.array)|[false](#language.types.singleton)

     **strptime()** devuelve un array con la fecha
     timestamp analizada, o **[false](#constant.false)** si se produjo un error.




     Los nombres del mes y del día de la semana y otras cadenas dependientes del lenguaje
     están subordinados a la configuración regional local establecida con [setlocale()](#function.setlocale) (**[LC_TIME](#constant.lc-time)**).

### Parámetros

      timestamp ([string](#language.types.string))


        La cadena a analizar (p.ej. devuelta por [strftime()](#function.strftime)).






      format ([string](#language.types.string))


        El formato usado en timestamp (p.ej. el mismo
        que el usado en [strftime()](#function.strftime)). Observe que algunas de las opciones de
        formato disponibles en [strftime()](#function.strftime) pueden no tener ningún
        efecto en **strptime()**; el subconjunto exacto que está
        soportado variará según el sistema operativo y a la biblioteca de C que esté
        en uso.




        Para más información sobre las opciones de formato, lea la
        página de [strftime()](#function.strftime).






### Valores devueltos

    Devuelve un array  o **[false](#constant.false)** si ocurre un error.








      <caption>**Los siguientes parámetros son devueltos en el array**</caption>



         parámetros
         Descripción






         "tm_sec"
         Segundos después del minuto (0-61)



         "tm_min"
         Minutos después de la hora (0-59)



         "tm_hour"
         Hora desde la medianoche (0-23)



         "tm_mday"
         Día del mes (1-31)



         "tm_mon"
         Meses desde Enero (0-11)



         "tm_year"
         Años desde 1900



         "tm_wday"
         Días desde el Domingo (0-6)



         "tm_yday"
         Días desde el 1 de Enero (0-365)



         "unparsed"
         la parte de timestamp que no fue
         reconocida usando el formato format especificado






### Historial de cambios

       Versión
       Descripción






       8.1.0

        Esta función ha sido marcada como obsoleta.
        Use [date_parse_from_format()](#function.date-parse-from-format) en su lugar (para análisis independiente de la localización),
        o [IntlDateFormatter::parse()](#intldateformatter.parse) (para análisis dependiente de la localización)





### Ejemplos

    **Ejemplo #1 Ejemplo de strptime()**

&lt;?php
$format = '%d/%m/%Y %H:%M:%S';
$strf = strftime($format);

echo "$strf\n";

print_r(strptime($strf, $format));

    Resultado del ejemplo anterior es similar a:

03/10/2004 15:54:19

Array
(
[tm_sec] =&gt; 19
[tm_min] =&gt; 54
[tm_hour] =&gt; 15
[tm_mday] =&gt; 3
[tm_mon] =&gt; 9
[tm_year] =&gt; 104
[tm_wday] =&gt; 0
[tm_yday] =&gt; 276
[unparsed] =&gt;
)

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

**Nota**:

    Internamente, esta función llama a la función strptime()
    proporcionada por la biblioteca C del sistema. Esta función puede presentar
    diferencias notables de comportamiento en diferentes sistemas operativos. Se
    recomienda el uso de [date_parse_from_format()](#function.date-parse-from-format), a la cuál no le
    afectan estas cosas.

**Nota**:

    "tm_sec" incluye segundos intercalares (actualmente hasta 2
    por año). Para más información acerca de los segundos intercalares, vea el [» artículo de Wikipedia
    sobre segundos intercalares](http://en.wikipedia.org/wiki/Leap_second).

### Ver también

    - [IntlDateFormatter::parse()](#intldateformatter.parse) - Analiza una cadena hacia un timestamp

    - [DateTime::createFromFormat()](#datetime.createfromformat) - Analiza una cadena con un instante según un formato especificado

    - [checkdate()](#function.checkdate) - Valida una fecha gregoriana

    - [strftime()](#function.strftime) - Formatea una fecha/hora local con la configuración local

    - [date_parse_from_format()](#function.date-parse-from-format) - Recupera las informaciones de una fecha dada siguiendo un formato específico

# strtotime

(PHP 4, PHP 5, PHP 7, PHP 8)

strtotime — Transforma un texto inglés en timestamp

### Descripción

**strtotime**([string](#language.types.string) $datetime, [?](#language.types.null)[int](#language.types.integer) $baseTimestamp = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

La función **strtotime()** intenta leer una
fecha en formato inglés proporcionada por el parámetro time,
y transformarla en un timestamp Unix (el número de segundos desde
el 1 de enero de 1970 a 00:00:00 UTC), relativo al timestamp
baseTimestamp, o a la fecha actual si este último
es omitido. El análisis de la cadena de fecha está definido en
[los formatos de fecha y hora](#datetime.formats)
y presenta varias consideraciones sutiles. Se recomienda encarecidamente
examinar todos los detalles.

**Advertencia**

    El timestamp Unix que devuelve esta función no contiene información
    sobre los husos horarios. Para realizar cálculos con información de
    fecha/hora, es preferible utilizar
    [DateTimeImmutable](#class.datetimeimmutable) que es más capaz.

Cada parámetro de la función utiliza el desplazamiento horario por defecto
a menos que se especifique explícitamente un desplazamiento horario.
Tenga cuidado de no utilizar un desplazamiento horario diferente para
cada parámetro a menos que sea lo que se necesita.
Consulte la función [date_default_timezone_get()](#function.date-default-timezone-get)
para saber cómo definir un desplazamiento horario por defecto.

### Parámetros

     datetime

       Una cadena de fecha/hora. Los formatos válidos son explicados en la documentación sobre los

[formatos de Fecha y Hora](#datetime.formats).

     baseTimestamp


       El timestamp, que representa la fecha actual, utilizado para el cálculo
       relativo de fechas.





### Valores devueltos

Devuelve un timestamp en caso de éxito, **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

Cada llamada a una función de fecha/hora generará un diagnóstico de tipo
**[E_WARNING](#constant.e-warning)** si la zona horaria no es válida.
Ver también [date_default_timezone_set()](#function.date-default-timezone-set)

### Historial de cambios

       Versión
       Descripción






       8.0.0

        baseTimestamp ahora es nullable.





### Ejemplos

    **Ejemplo #1 Ejemplo con strtotime()**

&lt;?php
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";

    **Ejemplo #2 Verificación de error**

&lt;?php
$str = 'No es válido';

if (($timestamp = strtotime($str)) === false) {
echo "La cadena ($str) está corrupta";
} else {
   echo "$str == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}

### Notas

**Nota**:

    En este caso, la fecha "relativa" significa también que si un componente
    particular del timestamp no es proporcionado, será extraído textualmente de
    baseTimestamp. En otras palabras,
    strtotime('February'), si se ejecuta el 31 de mayo de 2022, será
    interpretado como el 31 de febrero de 2022, lo que
    desbordará a un timestamp el 3 de marzo. (En un año bisiesto,
    sería el 2 de marzo.) El uso de
    strtotime('1 February') o strtotime('first day of February')
    evitaría este problema.

**Nota**:

    Si el número de años se especifica en dos dígitos, los valores entre
    00-69 corresponden a 2000-2069 y 70-99 a 1970-1999. Consulte las notas
    posteriores sobre las posibles diferencias entre sistemas de 32 bits (las fechas
    pueden fallar después del 19/01/2038 a 03:14:07).

**Nota**:

    El intervalo de validez de un timestamp va del
    Viernes 13 de diciembre de 1901 20:45:54 UTC al Martes 19 de enero de 2038 03:14:07 UTC.
    (Esto corresponde a las fechas máximas y mínimas para un
    entero de 32 bits firmado).




    Para las versiones de 64 bits de PHP, el intervalo válido de un timestamp
    es realmente infinito, sabiendo que 64 bits puede representar aproximadamente
    293 mil millones de años en cualquier dirección.

**Nota**:

    El uso de esta función en operaciones matemáticas no está recomendado.
    Es preferible utilizar en este caso
    [DateTime::add()](#datetime.add) y [DateTime::sub()](#datetime.sub).

### Ver también

    - [DateTimeImmutable](#class.datetimeimmutable)

    - [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) - Analiza un string de tiempo según el formato especificado

    - [Los formatos sobre fechas](#datetime.formats)

    - [checkdate()](#function.checkdate) - Valida una fecha gregoriana

    - [strptime()](#function.strptime) - Analiza una fecha/hora generada con strftime

# time

(PHP 4, PHP 5, PHP 7, PHP 8)

time — Devuelve el timestamp UNIX actual

### Descripción

**time**(): [int](#language.types.integer)

**time()** devuelve la hora actual, medida
en segundos desde el inicio de la época UNIX, (1 de
enero de 1970 00:00:00 GMT).

**Nota**:

    Los timestamps Unix no contienen información alguna sobre el huso horario local.
    Se recomienda utilizar la clase [DateTimeImmutable](#class.datetimeimmutable) para manipular
    información relativa a la fecha y la hora, a fin de evitar los problemas asociados a los timestamps Unix.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el timestamp actual.

### Ejemplos

    **Ejemplo #1 Ejemplo con time()**

&lt;?php
echo 'Hoy : '. time();

    Resultado del ejemplo anterior es similar a:

Hoy : 1660338149

### Notas

**Sugerencia**

    Un timestamp que representa el inicio de la petición está disponible en
    la variable [$_SERVER['REQUEST_TIME']](#reserved.variables.server).

### Ver también

    - [DateTimeImmutable](#class.datetimeimmutable)

    - [date()](#function.date) - Da formato a una marca de tiempo de Unix (Unix timestamp)

    - [microtime()](#function.microtime) - Devuelve el timestamp UNIX actual con microsegundos

# timezone_abbreviations_list

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_abbreviations_list — Alias de [DateTimeZone::listAbbreviations()](#datetimezone.listabbreviations)

### Descripción

Esta función es un alias de: [DateTimeZone::listAbbreviations()](#datetimezone.listabbreviations)

# timezone_identifiers_list

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_identifiers_list — Alias de [DateTimeZone::listIdentifiers()](#datetimezone.listidentifiers)

### Descripción

Esta función es un alias de: [DateTimeZone::listIdentifiers()](#datetimezone.listidentifiers)

# timezone_location_get

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

timezone_location_get — Alias de [DateTimeZone::getLocation()](#datetimezone.getlocation)

### Descripción

Esta función es un alias de: [DateTimeZone::getLocation()](#datetimezone.getlocation)

# timezone_name_from_abbr

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

timezone_name_from_abbr — Devuelve el nombre de una zona horaria a partir de su abreviatura y del desplazamiento UTC

### Descripción

**timezone_name_from_abbr**([string](#language.types.string) $abbr, [int](#language.types.integer) $utcOffset = -1, [int](#language.types.integer) $isDST = -1): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     abbr


       Abreviatura de la zona horaria.






     utcOffset


       Desplazamiento respecto al GMT en segundos. El valor por omisión es -1 lo que
       significa que se devuelve la primera zona horaria encontrada que corresponda a
       abbr. De lo contrario, se busca el desplazamiento exacto y solo si no se
       encuentra, se devuelve la primera zona horaria con cualquier desplazamiento.






     isDST


       Indicador de hora de verano/hora de invierno. Por omisión -1 que significa que
       el desplazamiento de hora de verano/hora de invierno no se tiene en cuenta en la
       búsqueda aunque la zona horaria lo gestione. Si se establece en 1, entonces el
       utcOffset se asume que incluye el desplazamiento de hora de verano
       /hora de invierno; si es 0 entonces utcOffset
       se asume que representa un desplazamiento que no tiene en cuenta la hora de verano/invierno.
       Si abbr no existe entonces la zona horaria se busca
       únicamente mediante utcOffset y isDST.





### Valores devueltos

Devuelve un nombre de zona horaria en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con timezone_name_from_abbr()**

&lt;?php
echo timezone_name_from_abbr("CET") . "\n";
echo timezone_name_from_abbr("", 3600, 0) . "\n";

    Resultado del ejemplo anterior es similar a:

Europe/Berlin
Europe/Paris

### Ver también

    - [timezone_abbreviations_list()](#function.timezone-abbreviations-list) - Alias de DateTimeZone::listAbbreviations

# timezone_name_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_name_get — Alias de [DateTimeZone::getName()](#datetimezone.getname)

### Descripción

Esta función es un alias de: [DateTimeZone::getName()](#datetimezone.getname)

# timezone_offset_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_offset_get — Alias de [DateTimeZone::getOffset()](#datetimezone.getoffset)

### Descripción

Esta función es un alias de: [DateTimeZone::getOffset()](#datetimezone.getoffset)

# timezone_open

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_open — Alias de [DateTimeZone::\_\_construct()](#datetimezone.construct)

### Descripción

Esta función es un alias de: [DateTimeZone::\_\_construct()](#datetimezone.construct)

# timezone_transitions_get

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

timezone_transitions_get — Alias de [DateTimeZone::getTransitions()](#datetimezone.gettransitions)

### Descripción

Esta función es un alias de: [DateTimeZone::getTransitions()](#datetimezone.gettransitions)

# timezone_version_get

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

timezone_version_get —
Lee la versión de la timezonedb

### Descripción

**timezone_version_get**(): [string](#language.types.string)

**timezone_version_get()** lee la versión de la timezonedb.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) en formato YYYY.increment,
como 2022.2.

Si se tiene una versión antigua de la base de datos de zonas horarias
(por ejemplo, no muestra el año actual), se pueden actualizar
las informaciones de zona horaria actualizando la versión de PHP o
instalando el paquete PECL [» 
timezonedb](https://pecl.php.net/package/timezonedb) PECL.

Algunas distribuciones Linux corrigen el soporte de fecha/hora de PHP para
usar una fuente alternativa para las informaciones de zona horaria.
En este caso, esta función devolverá 0.system. Asimismo,
se recomienda instalar el paquete PECL
[» timezonedb](https://pecl.php.net/package/timezonedb)
en este caso.

### Ejemplos

    **Ejemplo #1 Lectura de la versión de la timezonedb**

&lt;?php
echo timezone_version_get();

    Resultado del ejemplo anterior es similar a:

2022.2

### Ver también

    - [Lista de zonas horarias válidas](#timezones)

## Tabla de contenidos

- [checkdate](#function.checkdate) — Valida una fecha gregoriana
- [date](#function.date) — Da formato a una marca de tiempo de Unix (Unix timestamp)
- [date_add](#function.date-add) — Alias de DateTime::add
- [date_create](#function.date-create) — Creación de un objeto DateTime
- [date_create_from_format](#function.date-create-from-format) — Alias de DateTime::createFromFormat
- [date_create_immutable](#function.date-create-immutable) — Crea un nuevo objeto DateTimeImmutable
- [date_create_immutable_from_format](#function.date-create-immutable-from-format) — Alias de DateTimeImmutable::createFromFormat
- [date_date_set](#function.date-date-set) — Alias de DateTime::setDate
- [date_default_timezone_get](#function.date-default-timezone-get) — Recupera el huso horario por defecto utilizado por todas las funciones de fecha/hora de un script
- [date_default_timezone_set](#function.date-default-timezone-set) — Establece la zona horaria por defecto para todas las funciones de fecha/hora
- [date_diff](#function.date-diff) — Alias de DateTime::diff
- [date_format](#function.date-format) — Alias de DateTime::format
- [date_get_last_errors](#function.date-get-last-errors) — Alias de DateTimeImmutable::getLastErrors
- [date_interval_create_from_date_string](#function.date-interval-create-from-date-string) — Alias de DateInterval::createFromDateString
- [date_interval_format](#function.date-interval-format) — Alias de DateInterval::format
- [date_isodate_set](#function.date-isodate-set) — Alias de DateTime::setISODate
- [date_modify](#function.date-modify) — Alias de DateTime::modify
- [date_offset_get](#function.date-offset-get) — Alias de DateTime::getOffset
- [date_parse](#function.date-parse) — Retorna un array asociativo con información detallada sobre una fecha/hora dada
- [date_parse_from_format](#function.date-parse-from-format) — Recupera las informaciones de una fecha dada siguiendo un formato específico
- [date_sub](#function.date-sub) — Alias de DateTime::sub
- [date_sun_info](#function.date-sun-info) — Retorna un array con las informaciones sobre el amanecer/atardecer
  así como el inicio y el fin del amanecer
- [date_sunrise](#function.date-sunrise) — Devuelve la hora de salida del sol para un día y un lugar dados
- [date_sunset](#function.date-sunset) — Devuelve la hora de puesta del sol para un día y un lugar dados
- [date_time_set](#function.date-time-set) — Alias de DateTime::setTime
- [date_timestamp_get](#function.date-timestamp-get) — Alias de DateTime::getTimestamp
- [date_timestamp_set](#function.date-timestamp-set) — Alias de DateTime::setTimestamp
- [date_timezone_get](#function.date-timezone-get) — Alias de DateTime::getTimezone
- [date_timezone_set](#function.date-timezone-set) — Alias de DateTime::setTimezone
- [getdate](#function.getdate) — Devuelve la fecha/hora
- [gettimeofday](#function.gettimeofday) — Devuelve la hora actual
- [gmdate](#function.gmdate) — Formatea una fecha/hora GMT/TUC
- [gmmktime](#function.gmmktime) — Retorna el timestamp UNIX de una fecha GMT
- [gmstrftime](#function.gmstrftime) — Formatea una fecha/hora GMT/TUC según la configuración local
- [idate](#function.idate) — Formatea una parte de la hora/fecha local como un entero
- [localtime](#function.localtime) — Obtiene la hora local
- [microtime](#function.microtime) — Devuelve el timestamp UNIX actual con microsegundos
- [mktime](#function.mktime) — Obtener la marca de tiempo Unix de una fecha
- [strftime](#function.strftime) — Formatea una fecha/hora local con la configuración local
- [strptime](#function.strptime) — Analiza una fecha/hora generada con strftime
- [strtotime](#function.strtotime) — Transforma un texto inglés en timestamp
- [time](#function.time) — Devuelve el timestamp UNIX actual
- [timezone_abbreviations_list](#function.timezone-abbreviations-list) — Alias de DateTimeZone::listAbbreviations
- [timezone_identifiers_list](#function.timezone-identifiers-list) — Alias de DateTimeZone::listIdentifiers
- [timezone_location_get](#function.timezone-location-get) — Alias de DateTimeZone::getLocation
- [timezone_name_from_abbr](#function.timezone-name-from-abbr) — Devuelve el nombre de una zona horaria a partir de su abreviatura y del desplazamiento UTC
- [timezone_name_get](#function.timezone-name-get) — Alias de DateTimeZone::getName
- [timezone_offset_get](#function.timezone-offset-get) — Alias de DateTimeZone::getOffset
- [timezone_open](#function.timezone-open) — Alias de DateTimeZone::\_\_construct
- [timezone_transitions_get](#function.timezone-transitions-get) — Alias de DateTimeZone::getTransitions
- [timezone_version_get](#function.timezone-version-get) — Lee la versión de la timezonedb

    # Errores y Excepciones Fecha/Hora
    - [DateError](#class.dateerror) (extiende [Error](#class.error))

         <li class="listitem">
          [DateObjectError](#class.dateobjecterror)
          [DateRangeError](#class.daterangeerror)


     </li>
     - 
      [DateException](#class.dateexception) (extiende [Exception](#class.exception))
      
       <li class="listitem">
        
         <li class="listitem">[DateInvalidOperationException](#class.dateinvalidoperationexception)

         - [DateInvalidTimezoneException](#class.dateinvalidtimezoneexception)

         - [DateMalformedIntervalStringException](#class.datemalformedintervalstringexception)

         - [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception)

         - [DateMalformedStringException](#class.datemalformedstringexception)

       </li>
      
     </li>

# Formatos soportados de tiempo y fechas

Esta sección describe, en un formato de tipo BNF, todos los formatos diferentes
que el analizador de [DateTimeImmutable](#class.datetimeimmutable),
[DateTime](#class.datetime), [date_create_immutable()](#function.date-create-immutable),
[date_create()](#function.date-create), [date_parse()](#function.date-parse), y
[strtotime()](#function.strtotime) es capaz de comprender.
Los formatos están agrupados por secciones.
En la mayoría de los casos, los formatos de secciones diferentes, separados por
caracteres de espacio en blanco, comas o puntos, pueden ser utilizados en la misma cadena fecha/hora. Para cada formato soportado, se dan uno o varios ejemplos así como una descripción del formato correspondiente.
Los caracteres entre comillas simples para los formatos son insensibles a la mayúscula/minúscula ('t' podría escribirse t o T), los caracteres escritos entre comillas dobles, ellos, son sensibles a la mayúscula/minúscula ("T" y solo T).

Para formatear objetos [DateTimeImmutable](#class.datetimeimmutable) y
[DateTime](#class.datetime), por favor refiérase a la documentación
del método [DateTimeInterface::format()](#datetime.format).

Un conjunto de reglas generales debería ser tenido en cuenta.

- El analizador, permite a cada unidad (año, mes, día, hora, minuto, segundo)
  el rango completo de valores. Para un año son solo 4 dígitos, para un
  mes es 0-12, para un día 0-31 y para la hora y los minutos es 0-59.

- 60 es permitido para los segundos, ya que a veces cadenas de fechas con
  este segundo intercalar aparecen. Pero PHP implementa el tiempo Unix
  donde "60" no es un número de segundos válido y así overflow.

- [strtotime()](#function.strtotime) returns **[false](#constant.false)** si un número está fuera
  del rango, y [DateTimeImmutable::\_\_construct()](#datetimeimmutable.construct) lanza
  una excepción.

- Si una cadena contiene una fecha, todos los elementos son puestos a 0.

- Todos los elementos de tiempo menos significativos son puestos a 0 si
  cualquier elemento de un tiempo está presente en la cadena dada.

- El analizador es tonto, y no efectúa verificación para hacerlo más rápido
  (y más genérico).

- Además de las reglas aplicables a los elementos temporales individuales,
  el analizador comprende también
  [formatos compuestos](#datetime.formats.compound) más
  específicos, tales como el análisis de timestamps Unix (@1690388256)
  y fechas semanales ISO (2008-W28-3).

- Hay una verificación adicional si una fecha inválida es proporcionada:

&lt;?php
$res = date_parse("2015-09-31");
var_dump($res["warnings"]);

     El ejemplo anterior mostrará:




array(1) {
[11] =&gt;
string(27) "The parsed date was invalid"
}

- Es ya posible manejar estos casos especiales, pero el uso de
  [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) es requerido
  proporcionando el formato deseado.

&lt;?php
$res = DateTimeImmutable::createFromFormat("Y-m-d", "2015-09-34");
var_dump($res);

     El ejemplo anterior mostrará:




object(DateTimeImmutable)#1 (3) {
["date"] =&gt;
string(26) "2015-10-04 17:24:43.000000"
["timezone_type"] =&gt;
int(3)
["timezone"] =&gt;
string(13) "Europe/London"
}

## Formatos para los tiempos (Time)

Esta página describe los diferentes formatos en una sintaxis de tipo BNF
que los analizadores de [DateTimeImmutable](#class.datetimeimmutable),
[DateTime](#class.datetime), [date_create()](#function.date-create),
[date_create_immutable()](#function.date-create-immutable), y
[strtotime()](#function.strtotime) comprenden.

Para formatear objetos [DateTimeImmutable](#class.datetimeimmutable) y
[DateTime](#class.datetime), por favor refiérase a la documentación
del método [DateTimeInterface::format()](#datetime.format).

   <caption>**Símbolos utilizados**</caption>
   
    
     
      Descripción
      Formats
      Ejemplos


      frac
      . [0-9]+
      ".21342", ".85"



      hh
      "0"?[1-9] | "1"[0-2]
      "04", "7", "12"



      HH
      [01][0-9] | "2"[0-4]
      "04", "07", "19"



      meridiem
      [AaPp] .? [Mm] .? [\0\t ]
      "A.m.", "pM", "am."



      MM
      [0-5][0-9]
      "00", "12", "59"



      II
      [0-5][0-9]
      "00", "12", "59"



      espacio
      [ \t]
       



      tz
      "("? [A-Za-z]{1,6} ")"? | [A-Z][a-z]+([_/][A-Z][a-z]+)+
      "CEST", "Europe/Amsterdam", "America/Indiana/Knox"



      tzcorrection
      "GMT"? [+-] hh ":"? MM?
      "+0400", "GMT-07:00", "-07:00"


   <caption>**Notación de 12 horas**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      Horas solas, con meridiem
      hh espacio? meridiem
      "4 am", "5PM"



      Horas y minutos, con meridiem
      hh [.:] MM espacio? meridiem
      "4:08 am", "7:19P.M."



      Horas, minutos y segundos con meridiem
      hh [.:] MM [.:] II espacio? meridiem
      "4:08:37 am", "7:19:19P.M."



      MS SQL (Horas, minutos, segundos y fracción con meridiem)
      hh ":" MM ":" II [.:] [0-9]+ meridiem
      "4:08:39:12313am"


   <caption>**Notación de 24 horas**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      Horas y minutos
      't'? HH [.:] MM
      "04:08", "19.19", "T23:43"



      Horas y minutos, sin dos puntos
      't'? HH MM
      "0408", "t1919", "T2343"



      Horas, minutos y segundos
      't'? HH [.:] MM [.:] II
      "04.08.37", "t19:19:19"



      Horas, minutos y segundos, sin dos puntos
      't'? HH MM II
      "040837", "T191919"



      Horas, minutos, segundos y zona horaria
      't'? HH [.:] MM [.:] II espacio? ( tzcorrection | tz )
      "040837CEST", "T191919-0700"



      Horas, minutos, segundos y fracción
      't'? HH [.:] MM [.:] II frac
      "04.08.37.81412", "19:19:19.532453"



      Información de zona horaria
      tz | tzcorrection
      "CEST", "Europe/Amsterdam", "+0430", "GMT-06:00"


## Formatos de fechas

Esta página describe los diferentes formatos en una sintaxis de tipo BNF
que los analizadores de [DateTimeImmutable](#class.datetimeimmutable),
[DateTime](#class.datetime), [date_create()](#function.date-create),
[date_create_immutable()](#function.date-create-immutable), y
[strtotime()](#function.strtotime) comprenden.

Para formatear objetos [DateTimeImmutable](#class.datetimeimmutable) y
[DateTime](#class.datetime), por favor refiérase a la documentación
del método [DateTimeInterface::format()](#datetime.format).

   <caption>**Símbolos utilizados**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      sufijo de días
      "st" | "nd" | "rd" | "th"
       



      dd
      ([0-2]?[0-9] | "3"[01]) daysuf?
      "7th", "22nd", "31"



      DD
      "0" [0-9] | [1-2][0-9] | "3" [01]
      "07", "31"



      m
      'january' | 'february' | 'march' | 'april' | 'may' | 'june' |
       'july' | 'august' | 'september' | 'october' | 'november' | 'december' |
       'jan' | 'feb' | 'mar' | 'apr' | 'may' | 'jun' | 'jul' | 'aug' | 'sep' |
       'sept' | 'oct' | 'nov' | 'dec' | "I" | "II" | "III" | "IV" | "V" | "VI"
       | "VII" | "VIII" | "IX" | "X" | "XI" | "XII"
       



      M
      'jan' | 'feb' | 'mar' | 'apr' | 'may' | 'jun' | 'jul' | 'aug' |
       'sep' | 'sept' | 'oct' | 'nov' | 'dec'
       



      mm
      "0"? [0-9] | "1"[0-2]
      "0", "04", "7", "12"



      MM
      "0" [0-9] | "1"[0-2]
      "00", "04", "07", "12"



      y
      [0-9]{1,4}
      "00", "78", "08", "8", "2008"



      yy
      [0-9]{2}
      "00", "08", "78"



      YY
      [0-9]{4}
      "2000", "2008", "1978"



      YYY
      [0-9]{5,19}
      "81412", "20192"


   <caption>**Formats estándar**</caption>
   
    
     
      Descripción
      Ejemplos


      ATOM
      "2022-06-02T16:58:35+00:00"



      COOKIE
      "Thursday, 02-Jun-2022 16:58:35 UTC"



      ISO8601
      "2022-06-02T16:58:35+0000"



      [» RFC 822](https://datatracker.ietf.org/doc/html/rfc822)
      "Thu, 02 Jun 22 16:58:35 +0000"



      [» RFC 850](https://datatracker.ietf.org/doc/html/rfc850)
      "Thursday, 02-Jun-22 16:58:35 UTC"



      [» RFC 1036](https://datatracker.ietf.org/doc/html/rfc1036)
      "Thu, 02 Jun 22 16:58:35 +0000"



      [» RFC 1123](https://datatracker.ietf.org/doc/html/rfc1123)
      "Thu, 02 Jun 2022 16:58:35 +0000"



      [» RFC 2822](https://datatracker.ietf.org/doc/html/rfc2822)
      "Thu, 02 Jun 2022 16:58:35 +0000"



      [» RFC 3339](https://datatracker.ietf.org/doc/html/rfc3339)
      "2022-06-02T16:58:35+00:00"



      [» RFC 3339](https://datatracker.ietf.org/doc/html/rfc3339) Extended
      "2022-06-02T16:58:35.698+00:00"



      [» RFC 7231](https://datatracker.ietf.org/doc/html/rfc7231)
      "Thu, 02 Jun 2022 16:58:35 GMT"



      RSS
      "Thu, 02 Jun 2022 16:58:35 +0000"



      W3C
      "2022-06-02T16:58:35+00:00"


   <caption>**Notaciones localizadas**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      Mes americano y día
      mm "/" dd
      "5/12", "10/27"



      Mes americano, día y año
      mm "/" dd "/" y
      "12/22/78", "1/17/2006", "1/17/6"



      Año de cuatro dígitos, mes y día con slashes
      YY "/" mm "/" dd
      "2008/6/30", "1978/12/22"



      Año de cuatro dígitos y mes (GNU)
      YY "-" mm
      "2008-6", "2008-06", "1978-12"



      Año, mes y día con guiones
      y "-" mm "-" dd
      "2008-6-30", "78-12-22", "8-6-21"



      Día, mes y año de dos dígitos, con puntos, tabulaciones o guiones
      dd [.\t-] mm [.-] YY
      "30-6-2008", "22.12.1978"



      Día, mes y año de dos dígitos, con puntos o tabulaciones
      dd [.\t] mm "." yy
      "30.6.08", "22\t12.78"



      Día, mes textual y año
      dd ([ \t.-])* m ([ \t.-])* y
      "30-June 2008", "22DEC78", "14 III 1879"



      Mes textual y año de cuatro dígitos (el día será el 1)
      m ([ \t.-])* YY
      "June 2008", "DEC1978", "March 1879"



      Año de cuatro dígitos y mes textual (el día será el 1)
      YY ([ \t.-])* m
      "2008 June", "1978-XII", "1879.MArCH"



      Mes textual, día y año
      m ([ .\t-])* dd [,.stndrh\t ]+ y
      "July 1st, 2008", "April 17, 1790", "May.9,78"



      Mes textual y día
      m ([ .\t-])* dd [,.stndrh\t ]*
      "July 1st,", "Apr 17", "May.9"



      Día y mes textual
      dd ([ .\t-])* m
      "1 July", "17 Apr", "9.May"



      Mes abreviado, día y año
      M "-" DD "-" y
      "May-09-78", "Apr-17-1790"



      Año, mes abreviado y día
      y "-" M "-" DD
      "78-Dec-22", "1814-MAY-17"



      Año (y solo el año)
      YY
      "1978", "2008"



      Año (desarrollado, 5-19 dígitos con signo)
      [+-] YYY
      "-81120", "+20192"



      Mes textual (y solo el mes)
      m
      "March", "jun", "DEC"


   <caption>**Notaciones ISO8601**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      Año, mes y día de ocho dígitos
      YY MM DD
      "15810726", "19780417", "18140517"



      Año de cuatro dígitos, mes y día con slashes
      YY "/" MM "/" DD
      "2008/06/30", "1978/12/22"



      Año de dos dígitos, mes y día con guiones
      yy "-" MM "-" DD
      "08-06-30", "78-12-22"



      Año de cuatro dígitos con signo opcional, mes y día
      [+-]? YY "-" MM "-" DD
      "-0002-07-26", "+1978-04-17", "1814-05-17"



      Año de cinco dígitos con signo, mes y día requeridos
      [+-] YYY "-" MM "-" DD
      "-81120-02-26", "+20192-04-17"


**Nota**:

    Para los formatos y y yy, los años
    antes de 100 son considerados de una manera especial cuando los
    símbolos y o yy son utilizados.
    Si el año está entre 0 (inclusivo) y 69 (inclusivo),
    2000 será añadido. Si el año está entre 70 (inclusivo) y
    99 (inclusivo) entonces 1900 será añadido. Esto significa que "00-01-01" es
    interpretado como "2000-01-01".

**Nota**:

    El formato "Día, mes y año de dos dígitos con tabulaciones o puntos"
    (dd [.\t] mm "."
    yy) solo funciona para valores de año de 61 (inclusivo)
    a 99 (inclusivo) - fuera de estos límites, el *formato de tiempo*
    "HH [.:] MM [.:] SS" tiene una
    precedencia más fuerte y prima.

**Nota**:

    El formato "Año (y solo el año)" solo funciona de manera fiable si una cadena
    de tiempo ya ha sido encontrada. De lo contrario, si el año de cuatro dígitos coincide
    con HH MM, estos dos elementos de fecha
    son definidos en su lugar.




    Para analizar de manera coherente solo un año, utilice
    [DateTimeImmutable::createFromFormat()](#datetimeimmutable.createfromformat) con el
    especificador Y.

**Precaución**

    Es posible añadir o restar un préstamo para los formatos
    dd y DD. El día 0 significa el último
    día del mes anterior, los préstamos positivos contarán el mes siguiente.
    Así, "2008-08-00" es equivalente a "2008-07-31" y "2008-06-31" es equivalente
    a "2008-07-01" (junio solo tiene 30 días).




    Es de notar que el rango de día está limitado a 0-31 como
    indicado por la expresión regular anterior. Así, "2008-06-32" no es
    una cadena de fecha válida, por ejemplo.




    También es posible jugar con los préstamos de los formatos mm y
    MM gracias al valor 0. Un valor de mes de 0 significa Diciembre
    del año anterior. Por ejemplo "2008-00-22" es equivalente a "2007-12-22".




    Si combina las dos nociones anteriores y utiliza un préstamo negativo en el día
    y el mes, entonces ocurre esto: "2008-00-00" es convertido primero hacia
    "2007-12-00" luego hacia "2007-11-30". Esto también ocurre con la cadena
    "0000-00-00" que es entonces transformada hacia "-0001-11-30" (el año -1 en el calendario
    ISO 8601, que es 2 BC en el calendario Gregoriano).

## Formats compuestos

Esta página describe los diferentes formatos en una sintaxis de tipo BNF que los analizadores de
[DateTimeImmutable](#class.datetimeimmutable), [DateTime](#class.datetime),
[date_create()](#function.date-create),
[date_create_immutable()](#function.date-create-immutable), y
[strtotime()](#function.strtotime) comprenden.

Para formatear objetos [DateTimeImmutable](#class.datetimeimmutable) y
[DateTime](#class.datetime), por favor refiérase a la documentación
del método [DateTimeInterface::format()](#datetime.format).

   <caption>**Símbolos utilizados**</caption>
   
    
     
      Descripción
      Formats
      Ejemplos


      DD
      "0" [0-9] | [1-2][0-9] | "3" [01]
      "02", "12", "31"



      doy
      "00"[1-9] | "0"[1-9][0-9] | [1-2][0-9][0-9] | "3"[0-5][0-9] | "36"[0-6]
      "001", "012", "180", "350", "366"



      frac
      . [0-9]+
      ".21342", ".85"



      hh
      "0"?[1-9] | "1"[0-2]
      "04", "7", "12"



      HH
      [01][0-9] | "2"[0-4]
      "04", "07", "19"



      meridiem
      [AaPp] .? [Mm] .? [\0\t ]
      "A.m.", "pM", "am."



      ii
      [0-5]?[0-9]
      "04", "8", "59"



      II
      [0-5][0-9]
      "04", "08", "59"



      M
      'jan' | 'feb' | 'mar' | 'apr' | 'may' | 'jun' | 'jul' | 'aug' | 'sep' | 'sept' | 'oct' | 'nov' | 'dec'
       



      MM
      [0-1][0-9]
      "00", "12"



      espacio
      [ \t]
       



      ss
      ([0-5]?[0-9])|60
      "04", "8", "59", "60" (segundo intercalar)



      SS
      [0-5][0-9]
      "04", "08", "59"



      W
      "0"[1-9] | [1-4][0-9] | "5"[0-3]
      "05", "17", "53"



      tzcorrection
      "GMT"? [+-] hh ":"? II?
      "+0400", "GMT-07:00", "-07:00"



      YY
      [0-9]{4}
      "2000", "2008", "1978"


   <caption>**Notaciones localizadas**</caption>
   
    
     
      Descripción
      Formato
      Ejemplos


      Formato de log común
      dd "/" M "/" YY : HH ":" II ":" SS espacio tzcorrection
      "10/Oct/2000:13:55:36 -0700"



      EXIF
      YY ":" MM ":" DD " " HH ":" II ":" SS
      "2008:08:07 18:11:31"



      Año ISO con semana ISO
      YY "-"? "W" W
      "2008W27", "2008-W28"



      Año ISO con semana ISO y día
      YY "-"? "W" W "-"? [0-7]
      "2008W273", "2008-W28-3"



      MySQL
      YY "-" MM "-" DD " " HH ":" II ":" SS
      "2008-08-07 18:11:31"



      PostgreSQL: Año con día del año
      YY "."? doy
      "2008.197", "2008197"



      SOAP
      YY "-" MM "-" DD "T" HH ":" II ":" SS frac tzcorrection?
      "2008-07-01T22:35:17.02", "2008-07-01T22:35:17.03+08:00"



      Timestamp Unix
      "@" "-"? [0-9]+
      "@1215282385"



      Timestamp Unix con microsegundos
      "@" "-"? [0-9]+ "." [0-9]{0,6}
      "@1607974647.503686"



      XMLRPC
      YY MM DD "T" hh ":" II ":" SS
      "20080701T22:38:07", "20080701T9:38:07"



      XMLRPC (Compacto)
      YY MM DD 't' hh II SS
      "20080701t223807", "20080701T093807"



      WDDX
      YY "-" mm "-" dd "T" hh ":" ii ":" ss
      "2008-7-1T9:3:37"


**Nota**:

    El "W" en los formatos "Año ISO con semana ISO" y "Año ISO con semana ISO y día"
    es sensible a la mayúscula/minúscula; solo puede utilizarse la mayúscula "W".




    El "T" en los formatos SOAP, XMRPC y WDDX es sensible a la mayúscula/minúscula; utilice siempre
    la mayúscula "T".




    El formato timestamp Unix define la zona horaria a UTC.

## Formats relativos

Esta página describe los diferentes formatos en una sintaxis de tipo BNF
que los analizadores de [DateTimeImmutable](#class.datetimeimmutable),
[DateTime](#class.datetime), [date_create()](#function.date-create),
[date_create_immutable()](#function.date-create-immutable), y
[strtotime()](#function.strtotime) comprenden.

Para formatear objetos [DateTimeImmutable](#class.datetimeimmutable) y
[DateTime](#class.datetime), por favor refiérase a la documentación
del método [DateTimeInterface::format()](#datetime.format).

   <caption>**Símbolos utilizados**</caption>
   
    
     
      Descripción
      Formato


      dayname
      'sunday' | 'monday' | 'tuesday' | 'wednesday' | 'thursday' |
       'friday' | 'saturday' | 'sun' | 'mon' | 'tue' | 'wed' | 'thu' | 'fri' |
       'sat'



      daytext
      'weekday' | 'weekdays'



      number
      [+-]?[0-9]+



      ordinal
      'first' | 'second' | 'third' | 'fourth' | 'fifth' | 'sixth' |
       'seventh' | 'eighth' | 'ninth' | 'tenth' | 'eleventh' | 'twelfth' |
       'next' | 'last' | 'previous' | 'this'



      reltext
      'next' | 'last' | 'previous' | 'this'



      espacio
      [ \t]+



      unit
      'ms' | 'µs' | (( 'msec' | 'millisecond' | 'µsec' | 'microsecond'
       | 'usec' | 'sec' | 'second' | 'min' | 'minute' | 'hour' | 'day' |
       'fortnight' | 'forthnight' | 'month' | 'year') 's'?) | 'weeks' |
       daytext



   <caption>**Notaciones basadas en el día**</caption>
   
    
     
      Formato
      Descripción
      Ejemplos


      'yesterday'
      Medianoche de ayer
      "yesterday 14:00"



      'midnight'
      El tiempo es puesto a 00:00:00
       



      'today'
      El tiempo es puesto a 00:00:00
       



      'now'
      Ahora
       



      'noon'
      El tiempo es puesto a 12:00:00
      "yesterday noon"



      'tomorrow'
      Medianoche de mañana
       



      'back of' hour
      15 minutos antes de la hora especificada
      "back of 7pm", "back of 15"



      'front of' hour
      15 minutos después de la hora especificada
      "front of 5am", "front of 23"



      'first day of'?
      Asigna el día del primer día del mes actual. Generalmente es preferible
       utilizar esta expresión con el nombre del mes que sigue, ya que solo se refiere al mes actual.
      "first day of January 2008"



      'last day of'?
      Asigna el día del último día del mes actual. Generalmente es preferible
       utilizar esta expresión con el nombre del mes que sigue, ya que solo se refiere al mes actual.
      "last day of next month"



      ordinal espacio dayname espacio 'of'
      Calcula el x-ésimo día de la semana del mes actual.
      "first sat of July 2008"



      'last' espacio dayname espacio 'of'
      Calcula el *último* día de la semana del mes actual.
      "last sat of July 2008"



      number espacio? (unit | 'week')
      Maneja tiempos relativos cuyo valor es numerado.
      "+5 weeks", "12 day", "-7 weekdays"



      (ordinal | reltext) espacio unit
      Maneja elementos temporales relativos cuyo valor es textual.
      last y previous son equivalentes a
      -1, this a 0, y next a
      +1.
      "fifth day", "second month", "last day", "previous year"



      'ago'
      Utiliza en el pasado cualquier descripción de tiempo relativo ('hace').
      "2 days ago", "8 days ago 14:00", "2 months 5 days ago", "2 months ago 5 days", "2 days ago"



      dayname
      Se mueve hacia el próximo día indicado.(Ver [nota](#datetime.formats.relative.dayname-note))
      "Monday"



      reltext espacio 'week'
      Maneja el formato especial "weekday + last/this/next week".
      "Monday next week"


**Nota**:

    Las expresiones relativas son siempre tratadas *después*
    de las expresiones no relativas. Esto hace que "+1 week july 2008" y "july
    2008 +1 week" sean equivalentes.




    "yesterday", "midnight", "today", "noon" y "tomorrow" son excepciones a esta
    regla. Note que "tomorrow 11:00" y "11:00 tomorrow" son diferentes. Si la fecha
    de hoy es "July 23rd, 2008", la primera expresión da "2008-07-24 11:00"
    mientras que la segunda dará "2008-07-24 00:00". La razón es que estas cinco expresiones
    influyen directamente en la fecha actual.




    Las palabras clave como "first day of" dependen del contexto en el cual
    la cadena de formato relativo es utilizada. Si se utiliza con un método
    estático o una función, el referente es el timestamp actual del sistema.
    Sin embargo, si se utiliza en [DateTime::modify()](#datetime.modify) o
    [DateTimeImmutable::modify()](#datetimeimmutable.modify), el referente es el objeto
    sobre el cual el método modify() es llamado.

**Nota**:

    Note las observaciones que siguen cuando el día de la semana actual es el mismo que el
    día de la semana utilizado en la cadena fecha/hora. El día de la semana actual podría haber sido
    recalculado con respecto a las partes no relativas de la cadena fecha/hora.




    -

      "dayname" no avanza *hacia* otro
      día. (Ejemplo: "Wed July 23rd, 2008" significa "2008-07-23").



    -

      "number dayname" no avanza
      *hacia* otro día. (Ejemplo: "1
      wednesday july 23rd, 2008" significa "2008-07-23").



    -

      "number week dayname" añadirá
      primero el número de semanas, pero no avanzará *hacia*
      otro día. En este caso "number
      week" y "dayname" son dos bloques distintos.
      (Ejemplo: "+1 week wednesday july 23rd, 2008" significa "2008-07-30").



    -

      "ordinal dayname"
      *avanza* hacia otro día. (Ejemplo: "first
      wednesday july 23rd, 2008" significa "2008-07-30").



    -

      "number week ordinal
      dayname" añadirá primero el número de semanas
      y luego *avanzará* hacia otro día.
      En este caso, "number week" y
      "ordinal dayname" son dos bloques
      distintos. (Ejemplo: "+1 week first wednesday july 23rd,
      2008" significa "2008-08-06").



    -

      "ordinal dayname 'of' "
      no avanza *hacia* otro día. (Ejemplo:
      "first wednesday of july 23rd, 2008" significa "2008-07-02" ya que la frase
      con 'of' resetea el día del mes hacia '1' y el '23' será ignorado).





    Note también que el "of" en "ordinal
    espacio dayname
    espacio 'of' " y "'last' espacio
    dayname espacio 'of' " hace algo especial.




    -

      Asigna el día del mes a 1.



    -

      "ordinal dayname 'of' " no avanza
      *hacia* otro día. (Ejemplo: "first
      tuesday of july 2008" significa "2008-07-01").



    -

      "ordinal dayname "
      *avanza* hacia otro día. (Ejemplo: "first
      tuesday july 2008" significa "2008-07-08", ver también el punto número
      4 de la lista anterior).



    -

      "'last' dayname 'of' " toma el último
      dayname del mes actual. (Ejemplo: "last
      wed of july 2008" significa "2008-07-30")



    -

      "'last' dayname" toma el último
      dayname a partir del día actual. (Ejemplo: "last
      wed july 2008" significa "2008-06-25"; "july 2008" asigna primero la fecha actual
      a "2008-07-01" y luego "last wed" retrocede al último miércoles que es el
      "2008-06-25").


**Nota**:

    Los valores relativos de los meses calculados se basan en el número de días de los meses que
    se utilizan. Por ejemplo, "+2 month 2011-11-30", dará como resultado la fecha "2012-01-30".
    Esto se debe a que el mes de noviembre tiene 30 días, y
    que el mes de diciembre tiene 31, lo que suma un total de 61 días.

**Nota**:

    number es un número *entero*; si un
    número decimal es dado, el punto (o la coma) será probablemente interpretado
    como un delimitador.
    Por ejemplo, '+1.5 hours' será analizado como
    '+1 5 hours', y no como '+1 hour +30 minutes'.

### Historial de cambios

        Versión
        Descripción






        8.4.0

         number ahora acepta un signo más seguido de un
         signo menos, por ejemplo +-2, y otras combinaciones
         de varios signos.




        8.2.0

         number ya no acepta un signo más seguido de un
         signo menos, ejemplo +-2.




        7.0.8

         Las semanas siempre comienzan el lunes. Antes, el domingo también era
         considerado para comenzar una semana.






# Lista de Zonas Horarias Soportadas

## Tabla de contenidos

- [África](#timezones.africa)
- [América](#timezones.america)
- [Antártida](#timezones.antarctica)
- [Ártico](#timezones.arctic)
- [Asia](#timezones.asia)
- [Atlántico](#timezones.atlantic)
- [Australia](#timezones.australia)
- [Europa](#timezones.europe)
- [Índico](#timezones.indian)
- [Pacífico](#timezones.pacific)
- [Otros](#timezones.others)

Aquí, se encuentra una lista completa de las
zonas horarias soportadas por PHP, que pueden ser utilizadas con, por ejemplo,
[date_default_timezone_set()](#function.date-default-timezone-set).

**Precaución**El comportamiento de las zonas horarias que no están listadas aquí es indefinido.

**Nota**:
La última versión de la base de datos de zonas horarias puede
ser instalada vía el comando PECL
[» timezonedb](https://pecl.php.net/get/timezonedb).

**Nota**:

Esta lista está basada en la versión de la base de datos de zonas horarias 2019.1.

## África

   <caption>**África**</caption>
   
    
     
      Africa/Abidjan
      Africa/Accra
      Africa/Addis_Ababa
      Africa/Algiers


      Africa/Asmara
      Africa/Bamako
      Africa/Bangui
      Africa/Banjul



      Africa/Bissau
      Africa/Blantyre
      Africa/Brazzaville
      Africa/Bujumbura



      Africa/Cairo
      Africa/Casablanca
      Africa/Ceuta
      Africa/Conakry



      Africa/Dakar
      Africa/Dar_es_Salaam
      Africa/Djibouti
      Africa/Douala



      Africa/El_Aaiun
      Africa/Freetown
      Africa/Gaborone
      Africa/Harare



      Africa/Johannesburg
      Africa/Juba
      Africa/Kampala
      Africa/Khartoum



      Africa/Kigali
      Africa/Kinshasa
      Africa/Lagos
      Africa/Libreville



      Africa/Lome
      Africa/Luanda
      Africa/Lubumbashi
      Africa/Lusaka



      Africa/Malabo
      Africa/Maputo
      Africa/Maseru
      Africa/Mbabane



      Africa/Mogadishu
      Africa/Monrovia
      Africa/Nairobi
      Africa/Ndjamena



      Africa/Niamey
      Africa/Nouakchott
      Africa/Ouagadougou
      Africa/Porto-Novo



      Africa/Sao_Tome
      Africa/Tripoli
      Africa/Tunis
      Africa/Windhoek


## América

   <caption>**América**</caption>
   
    
     
      America/Adak
      America/Anchorage
      America/Anguilla
      America/Antigua


      America/Araguaina
      America/Argentina/Buenos_Aires
      America/Argentina/Catamarca
      America/Argentina/Cordoba



      America/Argentina/Jujuy
      America/Argentina/La_Rioja
      America/Argentina/Mendoza
      America/Argentina/Rio_Gallegos



      America/Argentina/Salta
      America/Argentina/San_Juan
      America/Argentina/San_Luis
      America/Argentina/Tucuman



      America/Argentina/Ushuaia
      America/Aruba
      America/Asuncion
      America/Atikokan



      America/Bahia
      America/Bahia_Banderas
      America/Barbados
      America/Belem



      America/Belize
      America/Blanc-Sablon
      America/Boa_Vista
      America/Bogota



      America/Boise
      America/Cambridge_Bay
      America/Campo_Grande
      America/Cancun



      America/Caracas
      America/Cayenne
      America/Cayman
      America/Chicago



      America/Chihuahua
      America/Costa_Rica
      America/Creston
      America/Cuiaba



      America/Curacao
      America/Danmarkshavn
      America/Dawson
      America/Dawson_Creek



      America/Denver
      America/Detroit
      America/Dominica
      America/Edmonton



      America/Eirunepe
      America/El_Salvador
      America/Fort_Nelson
      America/Fortaleza



      America/Glace_Bay
      America/Godthab
      America/Goose_Bay
      America/Grand_Turk



      America/Grenada
      America/Guadeloupe
      America/Guatemala
      America/Guayaquil



      America/Guyana
      America/Halifax
      America/Havana
      America/Hermosillo



      America/Indiana/Indianapolis
      America/Indiana/Knox
      America/Indiana/Marengo
      America/Indiana/Petersburg



      America/Indiana/Tell_City
      America/Indiana/Vevay
      America/Indiana/Vincennes
      America/Indiana/Winamac



      America/Inuvik
      America/Iqaluit
      America/Jamaica
      America/Juneau



      America/Kentucky/Louisville
      America/Kentucky/Monticello
      America/Kralendijk
      America/La_Paz



      America/Lima
      America/Los_Angeles
      America/Lower_Princes
      America/Maceio



      America/Managua
      America/Manaus
      America/Marigot
      America/Martinique



      America/Matamoros
      America/Mazatlan
      America/Menominee
      America/Merida



      America/Metlakatla
      America/Mexico_City
      America/Miquelon
      America/Moncton



      America/Monterrey
      America/Montevideo
      America/Montserrat
      America/Nassau



      America/New_York
      America/Nipigon
      America/Nome
      America/Noronha



      America/North_Dakota/Beulah
      America/North_Dakota/Center
      America/North_Dakota/New_Salem
      America/Ojinaga



      America/Panama
      America/Pangnirtung
      America/Paramaribo
      America/Phoenix



      America/Port-au-Prince
      America/Port_of_Spain
      America/Porto_Velho
      America/Puerto_Rico



      America/Punta_Arenas
      America/Rainy_River
      America/Rankin_Inlet
      America/Recife



      America/Regina
      America/Resolute
      America/Rio_Branco
      America/Santarem



      America/Santiago
      America/Santo_Domingo
      America/Sao_Paulo
      America/Scoresbysund



      America/Sitka
      America/St_Barthelemy
      America/St_Johns
      America/St_Kitts



      America/St_Lucia
      America/St_Thomas
      America/St_Vincent
      America/Swift_Current



      America/Tegucigalpa
      America/Thule
      America/Thunder_Bay
      America/Tijuana



      America/Toronto
      America/Tortola
      America/Vancouver
      America/Whitehorse



      America/Winnipeg
      America/Yakutat
      America/Yellowknife
       


## Antártida

   <caption>**Antártida**</caption>
   
    
     
      Antarctica/Casey
      Antarctica/Davis
      Antarctica/DumontDUrville
      Antarctica/Macquarie


      Antarctica/Mawson
      Antarctica/McMurdo
      Antarctica/Palmer
      Antarctica/Rothera



      Antarctica/Syowa
      Antarctica/Troll
      Antarctica/Vostok
       


## Ártico

   <caption>**Ártico**</caption>
   
    
     
      Arctic/Longyearbyen


## Asia

   <caption>**Asia**</caption>
   
    
     
      Asia/Aden
      Asia/Almaty
      Asia/Amman
      Asia/Anadyr


      Asia/Aqtau
      Asia/Aqtobe
      Asia/Ashgabat
      Asia/Atyrau



      Asia/Baghdad
      Asia/Bahrain
      Asia/Baku
      Asia/Bangkok



      Asia/Barnaul
      Asia/Beirut
      Asia/Bishkek
      Asia/Brunei



      Asia/Chita
      Asia/Choibalsan
      Asia/Colombo
      Asia/Damascus



      Asia/Dhaka
      Asia/Dili
      Asia/Dubai
      Asia/Dushanbe



      Asia/Famagusta
      Asia/Gaza
      Asia/Hebron
      Asia/Ho_Chi_Minh



      Asia/Hong_Kong
      Asia/Hovd
      Asia/Irkutsk
      Asia/Jakarta



      Asia/Jayapura
      Asia/Jerusalem
      Asia/Kabul
      Asia/Kamchatka



      Asia/Karachi
      Asia/Kathmandu
      Asia/Khandyga
      Asia/Kolkata



      Asia/Krasnoyarsk
      Asia/Kuala_Lumpur
      Asia/Kuching
      Asia/Kuwait



      Asia/Macau
      Asia/Magadan
      Asia/Makassar
      Asia/Manila



      Asia/Muscat
      Asia/Nicosia
      Asia/Novokuznetsk
      Asia/Novosibirsk



      Asia/Omsk
      Asia/Oral
      Asia/Phnom_Penh
      Asia/Pontianak



      Asia/Pyongyang
      Asia/Qatar
      Asia/Qostanay
      Asia/Qyzylorda



      Asia/Riyadh
      Asia/Sakhalin
      Asia/Samarkand
      Asia/Seoul



      Asia/Shanghai
      Asia/Singapore
      Asia/Srednekolymsk
      Asia/Taipei



      Asia/Tashkent
      Asia/Tbilisi
      Asia/Tehran
      Asia/Thimphu



      Asia/Tokyo
      Asia/Tomsk
      Asia/Ulaanbaatar
      Asia/Urumqi



      Asia/Ust-Nera
      Asia/Vientiane
      Asia/Vladivostok
      Asia/Yakutsk



      Asia/Yangon
      Asia/Yekaterinburg
      Asia/Yerevan
       


## Atlántico

   <caption>**Atlántico**</caption>
   
    
     
      Atlantic/Azores
      Atlantic/Bermuda
      Atlantic/Canary
      Atlantic/Cape_Verde


      Atlantic/Faroe
      Atlantic/Madeira
      Atlantic/Reykjavik
      Atlantic/South_Georgia



      Atlantic/St_Helena
      Atlantic/Stanley
       
       


## Australia

   <caption>**Australia**</caption>
   
    
     
      Australia/Adelaide
      Australia/Brisbane
      Australia/Broken_Hill
      Australia/Currie


      Australia/Darwin
      Australia/Eucla
      Australia/Hobart
      Australia/Lindeman



      Australia/Lord_Howe
      Australia/Melbourne
      Australia/Perth
      Australia/Sydney


## Europa

   <caption>**Europa**</caption>
   
    
     
      Europe/Amsterdam
      Europe/Andorra
      Europe/Astrakhan
      Europe/Athens


      Europe/Belgrade
      Europe/Berlin
      Europe/Bratislava
      Europe/Brussels



      Europe/Bucharest
      Europe/Budapest
      Europe/Busingen
      Europe/Chisinau



      Europe/Copenhagen
      Europe/Dublin
      Europe/Gibraltar
      Europe/Guernsey



      Europe/Helsinki
      Europe/Isle_of_Man
      Europe/Istanbul
      Europe/Jersey



      Europe/Kaliningrad
      Europe/Kiev
      Europe/Kirov
      Europe/Lisbon



      Europe/Ljubljana
      Europe/London
      Europe/Luxembourg
      Europe/Madrid



      Europe/Malta
      Europe/Mariehamn
      Europe/Minsk
      Europe/Monaco



      Europe/Moscow
      Europe/Oslo
      Europe/Paris
      Europe/Podgorica



      Europe/Prague
      Europe/Riga
      Europe/Rome
      Europe/Samara



      Europe/San_Marino
      Europe/Sarajevo
      Europe/Saratov
      Europe/Simferopol



      Europe/Skopje
      Europe/Sofia
      Europe/Stockholm
      Europe/Tallinn



      Europe/Tirane
      Europe/Ulyanovsk
      Europe/Uzhgorod
      Europe/Vaduz



      Europe/Vatican
      Europe/Vienna
      Europe/Vilnius
      Europe/Volgograd



      Europe/Warsaw
      Europe/Zagreb
      Europe/Zaporozhye
      Europe/Zurich


## Índico

   <caption>**Índico**</caption>
   
    
     
      Indian/Antananarivo
      Indian/Chagos
      Indian/Christmas
      Indian/Cocos


      Indian/Comoro
      Indian/Kerguelen
      Indian/Mahe
      Indian/Maldives



      Indian/Mauritius
      Indian/Mayotte
      Indian/Reunion
       


## Pacífico

   <caption>**Pacífico**</caption>
   
    
     
      Pacific/Apia
      Pacific/Auckland
      Pacific/Bougainville
      Pacific/Chatham


      Pacific/Chuuk
      Pacific/Easter
      Pacific/Efate
      Pacific/Enderbury



      Pacific/Fakaofo
      Pacific/Fiji
      Pacific/Funafuti
      Pacific/Galapagos



      Pacific/Gambier
      Pacific/Guadalcanal
      Pacific/Guam
      Pacific/Honolulu



      Pacific/Kiritimati
      Pacific/Kosrae
      Pacific/Kwajalein
      Pacific/Majuro



      Pacific/Marquesas
      Pacific/Midway
      Pacific/Nauru
      Pacific/Niue



      Pacific/Norfolk
      Pacific/Noumea
      Pacific/Pago_Pago
      Pacific/Palau



      Pacific/Pitcairn
      Pacific/Pohnpei
      Pacific/Port_Moresby
      Pacific/Rarotonga



      Pacific/Saipan
      Pacific/Tahiti
      Pacific/Tarawa
      Pacific/Tongatapu



      Pacific/Wake
      Pacific/Wallis
       
       


## Otros

**Advertencia**

No se utilice ninguna de las zonas horarias listadas aquí (excepto UTC), estas
solo existen por razones de compatibilidad ascendente y su comportamiento puede provocar errores.
Además, estas zonas horarias pueden ser eliminadas de la base de datos IANA de zonas horarias en cualquier momento.

**Advertencia**

Si se ignora la advertencia anterior, tenga en cuenta que la base de datos de la IANA que proporciona el soporte de zonas
horarias en PHP utiliza los signos POSIX lo que significa que las zonas
Etc/GMT+n y Etc/GMT-n están invertidas
respecto al uso común.

Por ejemplo, la zona horaria 8 horas después de GMT que se utiliza en China y
en Australia Occidental es actualmente Etc/GMT-8 en
esta base de datos, y no Etc/GMT+8 como se podría esperar.

Una vez más, se recomienda encarecidamente que se utilice la zona horaria correcta
para su ubicación, como Asia/Shanghai o
Australia/Perth para los ejemplos anteriores.

   <caption>**Otros**</caption>
   
    
     
      Africa/Asmera
      Africa/Timbuktu
      America/Argentina/ComodRivadavia
      America/Atka


      America/Buenos_Aires
      America/Catamarca
      America/Coral_Harbour
      America/Cordoba



      America/Ensenada
      America/Fort_Wayne
      America/Indianapolis
      America/Jujuy



      America/Knox_IN
      America/Louisville
      America/Mendoza
      America/Montreal



      America/Porto_Acre
      America/Rosario
      America/Santa_Isabel
      America/Shiprock



      America/Virgin
      Antarctica/South_Pole
      Asia/Ashkhabad
      Asia/Calcutta



      Asia/Chongqing
      Asia/Chungking
      Asia/Dacca
      Asia/Harbin



      Asia/Istanbul
      Asia/Kashgar
      Asia/Katmandu
      Asia/Macao



      Asia/Rangoon
      Asia/Saigon
      Asia/Tel_Aviv
      Asia/Thimbu



      Asia/Ujung_Pandang
      Asia/Ulan_Bator
      Atlantic/Faeroe
      Atlantic/Jan_Mayen



      Australia/ACT
      Australia/Canberra
      Australia/LHI
      Australia/North



      Australia/NSW
      Australia/Queensland
      Australia/South
      Australia/Tasmania



      Australia/Victoria
      Australia/West
      Australia/Yancowinna
      Brazil/Acre



      Brazil/DeNoronha
      Brazil/East
      Brazil/West
      Canada/Atlantic



      Canada/Central
      Canada/Eastern
      Canada/Mountain
      Canada/Newfoundland



      Canada/Pacific
      Canada/Saskatchewan
      Canada/Yukon
      CET



      Chile/Continental
      Chile/EasterIsland
      CST6CDT
      Cuba



      EET
      Egypt
      Eire
      EST



      EST5EDT
      Etc/GMT
      Etc/GMT+0
      Etc/GMT+1



      Etc/GMT+10
      Etc/GMT+11
      Etc/GMT+12
      Etc/GMT+2



      Etc/GMT+3
      Etc/GMT+4
      Etc/GMT+5
      Etc/GMT+6



      Etc/GMT+7
      Etc/GMT+8
      Etc/GMT+9
      Etc/GMT-0



      Etc/GMT-1
      Etc/GMT-10
      Etc/GMT-11
      Etc/GMT-12



      Etc/GMT-13
      Etc/GMT-14
      Etc/GMT-2
      Etc/GMT-3



      Etc/GMT-4
      Etc/GMT-5
      Etc/GMT-6
      Etc/GMT-7



      Etc/GMT-8
      Etc/GMT-9
      Etc/GMT0
      Etc/Greenwich



      Etc/UCT
      Etc/Universal
      Etc/UTC
      Etc/Zulu



      Europe/Belfast
      Europe/Nicosia
      Europe/Tiraspol
      Factory



      GB
      GB-Eire
      GMT
      GMT+0



      GMT-0
      GMT0
      Greenwich
      Hongkong



      HST
      Iceland
      Iran
      Israel



      Jamaica
      Japan
      Kwajalein
      Libya



      MET
      Mexico/BajaNorte
      Mexico/BajaSur
      Mexico/General



      MST
      MST7MDT
      Navajo
      NZ



      NZ-CHAT
      Pacific/Johnston
      Pacific/Ponape
      Pacific/Samoa



      Pacific/Truk
      Pacific/Yap
      Poland
      Portugal



      PRC
      PST8PDT
      ROC
      ROK



      Singapore
      Turkey
      UCT
      Universal



      US/Alaska
      US/Aleutian
      US/Arizona
      US/Central



      US/East-Indiana
      US/Eastern
      US/Hawaii
      US/Indiana-Starke



      US/Michigan
      US/Mountain
      US/Pacific
      US/Pacific-New



      US/Samoa
      UTC
      W-SU
      WET



      Zulu
       
       
       


# La clase DateError

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada cuando la base de datos de los husos horarios no se encuentra, o contiene datos inválidos.




    Este error no debería producirse nunca, y no depende del código. Hay dos
    excepciones hijas ([DateObjectError](#class.dateobjecterror) y
    [DateRangeError](#class.daterangeerror)) que se lanzan en función
    de los errores del desarrollador o de los problemas de rango.

## Sinopsis de la Clase

     class **DateError**



     extends
      [Error](#class.error)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";

private
[string](#language.types.string)
[$string](#error.props.string) = "";
protected
[int](#language.types.integer)
[$code](#error.props.code);
protected
[string](#language.types.string)
[$file](#error.props.file) = "";
protected
[int](#language.types.integer)
[$line](#error.props.line);
private
[array](#language.types.array)
[$trace](#error.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#error.props.previous) = null;

    /* Métodos heredados */

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

## Ver también

    - [DateObjectError](#class.dateobjecterror)

    - [DateRangeError](#class.daterangeerror)

# La clase DateObjectError

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada cuando una de las clases Date/Hora no ha sido correctamente
    inicializada.




    Dado que las clases Date/Hora no son finales, estas clases pueden ser heredadas.
    Cuando el constructor padre no es llamado, este error es lanzado. Siempre es un error de programación.

## Sinopsis de la Clase

     class **DateObjectError**



     extends
      [DateError](#class.dateerror)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";

private
[string](#language.types.string)
[$string](#error.props.string) = "";
protected
[int](#language.types.integer)
[$code](#error.props.code);
protected
[string](#language.types.string)
[$file](#error.props.file) = "";
protected
[int](#language.types.integer)
[$line](#error.props.line);
private
[array](#language.types.array)
[$trace](#error.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#error.props.previous) = null;

    /* Métodos heredados */

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

## Ver también

    - [DateError](#class.dateerror)

    - [DateRangeError](#class.daterangeerror)

# La clase DateRangeError

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada por [DateTime::getTimestamp()](#datetime.gettimestamp),
    [DateTimeImmutable::getTimestamp()](#datetime.gettimestamp), y
    [date_timestamp_get()](#function.date-timestamp-get), en plataformas de 32 bits si el objeto
    date representa una fecha fuera del rango signado de 32 bits.

## Sinopsis de la Clase

     class **DateRangeError**



     extends
      [DateError](#class.dateerror)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";

private
[string](#language.types.string)
[$string](#error.props.string) = "";
protected
[int](#language.types.integer)
[$code](#error.props.code);
protected
[string](#language.types.string)
[$file](#error.props.file) = "";
protected
[int](#language.types.integer)
[$line](#error.props.line);
private
[array](#language.types.array)
[$trace](#error.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#error.props.previous) = null;

    /* Métodos heredados */

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

## Ver también

    - [DateError](#class.dateerror)

    - [DateObjectError](#class.dateobjecterror)

# La clase DateException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Clase padre de todas las excepciones Date/Time, para problemas relacionados con las entradas de usuario, o con los argumentos textuales libres que deben ser analizados.




    Las siguientes excepciones hijas son lanzadas por la extensión:



     - [DateInvalidOperationException](#class.dateinvalidoperationexception)

     - [DateInvalidTimezoneException](#class.dateinvalidtimezoneexception)

     - [DateMalformedIntervalStringException](#class.datemalformedintervalstringexception)

     - [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception)

     - [DateMalformedStringException](#class.datemalformedstringexception)

## Sinopsis de la Clase

     class **DateException**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La clase DateInvalidOperationException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada por [DateTimeImmutable::sub()](#datetimeimmutable.sub) y
    [DateTime::sub()](#datetime.sub) cuando se intenta una operación no soportada.




    Un ejemplo de operación no soportada es el uso de un objeto
    [DateInterval](#class.dateinterval) que representa especificaciones de tiempo
    como next weekday, ya que no se puede construir ninguna declaración lógica inversa.

## Sinopsis de la Clase

     class **DateInvalidOperationException**



     extends
      [DateException](#class.dateexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La clase DateInvalidTimeZoneException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada cuando un valor incorrecto es pasado a
    [DateTimeZone::__construct()](#datetimezone.construct).

## Sinopsis de la Clase

     class **DateInvalidTimeZoneException**



     extends
      [DateException](#class.dateexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La clase DateMalformedIntervalStringException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Se lanza cuando un argumento duration inválido es pasado a
    [DateInterval::__construct()](#dateinterval.construct).

## Sinopsis de la Clase

     class **DateMalformedIntervalStringException**



     extends
      [DateException](#class.dateexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La clase DateMalformedPeriodStringException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Se lanza cuando un argumento isostr inválido es pasado a
    [DatePeriod::__construct()](#dateperiod.construct).

## Sinopsis de la Clase

     class **DateMalformedPeriodStringException**



     extends
      [DateException](#class.dateexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

# La clase DateMalformedStringException

(PHP 8 &gt;= 8.3.0)

## Introducción

    Lanzada cuando se detecta una cadena de Fecha/Hora inválida.




    Esto puede ser un valor pasado a
    [DateTimeImmutable::__construct()](#datetimeimmutable.construct),
    [DateTimeImmutable::modify()](#datetimeimmutable.modify),
    [DateTime::__construct()](#datetime.construct), o
    [DateTime::modify()](#datetime.modify).

## Sinopsis de la Clase

     class **DateMalformedStringException**



     extends
      [DateException](#class.dateexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

- [Introducción](#intro.datetime)
- [Instalación/Configuración](#datetime.setup)<li>[Instalación](#datetime.installation)
- [Configuración en tiempo de ejecución](#datetime.configuration)
  </li>- [Constantes predefinidas](#datetime.constants)
- [Ejemplos](#datetime.examples)<li>[Aritmética con DateTime](#datetime.examples-arithmetic)
  </li>- [DateTime](#class.datetime) — La clase DateTime<li>[DateTime::add](#datetime.add) — Modifica un objeto DateTime, añadiendo una cantidad de días, meses, años, horas, minutos y segundos
- [DateTime::\_\_construct](#datetime.construct) — Devuelve un nuevo objeto DateTime
- [DateTime::createFromFormat](#datetime.createfromformat) — Analiza una cadena con un instante según un formato especificado
- [DateTime::createFromImmutable](#datetime.createfromimmutable) — Devuelve una nueva instancia de DateTime encapsulando el objeto DateTimeImmutable dado
- [DateTime::createFromInterface](#datetime.createfrominterface) — RDevuelve un nuevo objeto DateTime que encapsula el objeto DateTimeInterface dado
- [DateTime::getLastErrors](#datetime.getlasterrors) — Alias de DateTimeImmutable::getLastErrors
- [DateTime::modify](#datetime.modify) — Altera la marca temporal
- [DateTime::\_\_set_state](#datetime.set-state) — El gestor \_\_set_state
- [DateTime::setDate](#datetime.setdate) — Establece la fecha
- [DateTime::setISODate](#datetime.setisodate) — Establece la fecha ISO
- [DateTime::setTime](#datetime.settime) — Establece la hora
- [DateTime::setTimestamp](#datetime.settimestamp) — Establece la fecha y la hora basándose en una marca temporal de Unix
- [DateTime::setTimezone](#datetime.settimezone) — Establece la zona horaria para el objeto DateTime
- [DateTime::sub](#datetime.sub) — Sustrae una cantidad de días, meses, años, horas, minutos y segundos de un objeto
DateTime
  </li>- [DateTimeImmutable](#class.datetimeimmutable) — La clase DateTimeImmutable<li>[DateTimeImmutable::add](#datetimeimmutable.add) — Devuelve un nuevo objeto, con una cantidad añadida de días, meses, años, horas, minutos y segundos
- [DateTimeImmutable::\_\_construct](#datetimeimmutable.construct) — Devuelve un nuevo objeto DateTimeImmutable
- [DateTimeImmutable::createFromFormat](#datetimeimmutable.createfromformat) — Analiza un string de tiempo según el formato especificado
- [DateTimeImmutable::createFromInterface](#datetimeimmutable.createfrominterface) — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTimeInterface dado
- [DateTimeImmutable::createFromMutable](#datetimeimmutable.createfrommutable) — Devuelve un nuevo objeto DateTimeImmutable que encapsula el objeto DateTime dado
- [DateTimeImmutable::getLastErrors](#datetimeimmutable.getlasterrors) — Devuelve las advertencias y errores
- [DateTimeImmutable::modify](#datetimeimmutable.modify) — Crea un nuevo objeto con la marca de tiempo modificada
- [DateTimeImmutable::\_\_set_state](#datetimeimmutable.set-state) — El gestor \_\_set_state
- [DateTimeImmutable::setDate](#datetimeimmutable.setdate) — Establece la fecha
- [DateTimeImmutable::setISODate](#datetimeimmutable.setisodate) — Establece la fecha ISO
- [DateTimeImmutable::setTime](#datetimeimmutable.settime) — Establece la hora
- [DateTimeImmutable::setTimestamp](#datetimeimmutable.settimestamp) — Establece la fecha y hora basadas en una marca de tiempo Unix (Unix timestamp)
- [DateTimeImmutable::setTimezone](#datetimeimmutable.settimezone) — Establece la zona horaria
- [DateTimeImmutable::sub](#datetimeimmutable.sub) — Sustrae una cantidad de días, meses, años, horas, minutos y segundos
  </li>- [DateTimeInterface](#class.datetimeinterface) — La interfaz DateTimeInterface<li>[DateTimeInterface::diff](#datetime.diff) — Devuelve la diferencia entre dos objetos DateTime
- [DateTimeInterface::format](#datetime.format) — Retorna una fecha formateada según el formato proporcionado
- [DateTimeInterface::getOffset](#datetime.getoffset) — Devuelve el desplazamiento horario
- [DateTimeInterface::getTimestamp](#datetime.gettimestamp) — Obtiene el timestamp Unix
- [DateTimeInterface::getTimezone](#datetime.gettimezone) — Devuelve la zona horaria relativa al DateTime proporcionado
- [DateTime::\_\_serialize](#datetime.serialize) — Deserializa un DateTime
- [DateTime::\_\_unserialize](#datetime.unserialize) — Deserializar un DateTime
- [DateTime::\_\_wakeup](#datetime.wakeup) — El manejador \_\_wakeup
  </li>- [DateTimeZone](#class.datetimezone) — La clase DateTimeZone<li>[DateTimeZone::__construct](#datetimezone.construct) — Crea un nuevo objeto DateTimeZone
- [DateTimeZone::getLocation](#datetimezone.getlocation) — Devuelve las informaciones geográficas de una zona horaria
- [DateTimeZone::getName](#datetimezone.getname) — Devuelve el nombre de la zona horaria
- [DateTimeZone::getOffset](#datetimezone.getoffset) — Retorna el desplazamiento GMT de una zona horaria
- [DateTimeZone::getTransitions](#datetimezone.gettransitions) — Devuelve todas las transiciones de una zona horaria
- [DateTimeZone::listAbbreviations](#datetimezone.listabbreviations) — Devuelve un array asociativo que describe una zona horaria
- [DateTimeZone::listIdentifiers](#datetimezone.listidentifiers) — Devuelve un array numérico que contiene todos los identificadores de zonas horarias definidos
  </li>- [DateInterval](#class.dateinterval) — La clase DateInterval<li>[DateInterval::__construct](#dateinterval.construct) — Crea un nuevo objeto DateInterval
- [DateInterval::createFromDateString](#dateinterval.createfromdatestring) — Establece un objeto DateInterval desde las partes relativas de una cadena
- [DateInterval::format](#dateinterval.format) — Formatea el intervalo
  </li>- [DatePeriod](#class.dateperiod) — La clase DatePeriod<li>[DatePeriod::__construct](#dateperiod.construct) — Crea un nuevo objeto DatePeriod
- [DatePeriod::createFromISO8601String](#dateperiod.createfromiso8601string) — Crea un nuevo objeto DatePeriod a partir de un string ISO8601
- [DatePeriod::getDateInterval](#dateperiod.getdateinterval) — Devuelve el intervalo
- [DatePeriod::getEndDate](#dateperiod.getenddate) — Devuelve la fecha de fin
- [DatePeriod::getRecurrences](#dateperiod.getrecurrences) — Recupera el número de recurrencias
- [DatePeriod::getStartDate](#dateperiod.getstartdate) — Obtiene la fecha de inicio
  </li>- [Funciones de Fecha/Hora](#ref.datetime)<li>[checkdate](#function.checkdate) — Valida una fecha gregoriana
- [date](#function.date) — Da formato a una marca de tiempo de Unix (Unix timestamp)
- [date_add](#function.date-add) — Alias de DateTime::add
- [date_create](#function.date-create) — Creación de un objeto DateTime
- [date_create_from_format](#function.date-create-from-format) — Alias de DateTime::createFromFormat
- [date_create_immutable](#function.date-create-immutable) — Crea un nuevo objeto DateTimeImmutable
- [date_create_immutable_from_format](#function.date-create-immutable-from-format) — Alias de DateTimeImmutable::createFromFormat
- [date_date_set](#function.date-date-set) — Alias de DateTime::setDate
- [date_default_timezone_get](#function.date-default-timezone-get) — Recupera el huso horario por defecto utilizado por todas las funciones de fecha/hora de un script
- [date_default_timezone_set](#function.date-default-timezone-set) — Establece la zona horaria por defecto para todas las funciones de fecha/hora
- [date_diff](#function.date-diff) — Alias de DateTime::diff
- [date_format](#function.date-format) — Alias de DateTime::format
- [date_get_last_errors](#function.date-get-last-errors) — Alias de DateTimeImmutable::getLastErrors
- [date_interval_create_from_date_string](#function.date-interval-create-from-date-string) — Alias de DateInterval::createFromDateString
- [date_interval_format](#function.date-interval-format) — Alias de DateInterval::format
- [date_isodate_set](#function.date-isodate-set) — Alias de DateTime::setISODate
- [date_modify](#function.date-modify) — Alias de DateTime::modify
- [date_offset_get](#function.date-offset-get) — Alias de DateTime::getOffset
- [date_parse](#function.date-parse) — Retorna un array asociativo con información detallada sobre una fecha/hora dada
- [date_parse_from_format](#function.date-parse-from-format) — Recupera las informaciones de una fecha dada siguiendo un formato específico
- [date_sub](#function.date-sub) — Alias de DateTime::sub
- [date_sun_info](#function.date-sun-info) — Retorna un array con las informaciones sobre el amanecer/atardecer
  así como el inicio y el fin del amanecer
- [date_sunrise](#function.date-sunrise) — Devuelve la hora de salida del sol para un día y un lugar dados
- [date_sunset](#function.date-sunset) — Devuelve la hora de puesta del sol para un día y un lugar dados
- [date_time_set](#function.date-time-set) — Alias de DateTime::setTime
- [date_timestamp_get](#function.date-timestamp-get) — Alias de DateTime::getTimestamp
- [date_timestamp_set](#function.date-timestamp-set) — Alias de DateTime::setTimestamp
- [date_timezone_get](#function.date-timezone-get) — Alias de DateTime::getTimezone
- [date_timezone_set](#function.date-timezone-set) — Alias de DateTime::setTimezone
- [getdate](#function.getdate) — Devuelve la fecha/hora
- [gettimeofday](#function.gettimeofday) — Devuelve la hora actual
- [gmdate](#function.gmdate) — Formatea una fecha/hora GMT/TUC
- [gmmktime](#function.gmmktime) — Retorna el timestamp UNIX de una fecha GMT
- [gmstrftime](#function.gmstrftime) — Formatea una fecha/hora GMT/TUC según la configuración local
- [idate](#function.idate) — Formatea una parte de la hora/fecha local como un entero
- [localtime](#function.localtime) — Obtiene la hora local
- [microtime](#function.microtime) — Devuelve el timestamp UNIX actual con microsegundos
- [mktime](#function.mktime) — Obtener la marca de tiempo Unix de una fecha
- [strftime](#function.strftime) — Formatea una fecha/hora local con la configuración local
- [strptime](#function.strptime) — Analiza una fecha/hora generada con strftime
- [strtotime](#function.strtotime) — Transforma un texto inglés en timestamp
- [time](#function.time) — Devuelve el timestamp UNIX actual
- [timezone_abbreviations_list](#function.timezone-abbreviations-list) — Alias de DateTimeZone::listAbbreviations
- [timezone_identifiers_list](#function.timezone-identifiers-list) — Alias de DateTimeZone::listIdentifiers
- [timezone_location_get](#function.timezone-location-get) — Alias de DateTimeZone::getLocation
- [timezone_name_from_abbr](#function.timezone-name-from-abbr) — Devuelve el nombre de una zona horaria a partir de su abreviatura y del desplazamiento UTC
- [timezone_name_get](#function.timezone-name-get) — Alias de DateTimeZone::getName
- [timezone_offset_get](#function.timezone-offset-get) — Alias de DateTimeZone::getOffset
- [timezone_open](#function.timezone-open) — Alias de DateTimeZone::\_\_construct
- [timezone_transitions_get](#function.timezone-transitions-get) — Alias de DateTimeZone::getTransitions
- [timezone_version_get](#function.timezone-version-get) — Lee la versión de la timezonedb
  </li>- [Errores y Excepciones Fecha/Hora](#datetime.error.tree)
- [Formatos soportados de tiempo y fechas](#datetime.formats)
- [Lista de Zonas Horarias Soportadas](#timezones)<li>[África](#timezones.africa)
- [América](#timezones.america)
- [Antártida](#timezones.antarctica)
- [Ártico](#timezones.arctic)
- [Asia](#timezones.asia)
- [Atlántico](#timezones.atlantic)
- [Australia](#timezones.australia)
- [Europa](#timezones.europe)
- [Índico](#timezones.indian)
- [Pacífico](#timezones.pacific)
- [Otros](#timezones.others)
  </li>- [DateError](#class.dateerror) — La clase DateError
- [DateObjectError](#class.dateobjecterror) — La clase DateObjectError
- [DateRangeError](#class.daterangeerror) — La clase DateRangeError
- [DateException](#class.dateexception) — La clase DateException
- [DateInvalidOperationException](#class.dateinvalidoperationexception) — La clase DateInvalidOperationException
- [DateInvalidTimeZoneException](#class.dateinvalidtimezoneexception) — La clase DateInvalidTimeZoneException
- [DateMalformedIntervalStringException](#class.datemalformedintervalstringexception) — La clase DateMalformedIntervalStringException
- [DateMalformedPeriodStringException](#class.datemalformedperiodstringexception) — La clase DateMalformedPeriodStringException
- [DateMalformedStringException](#class.datemalformedstringexception) — La clase DateMalformedStringException
