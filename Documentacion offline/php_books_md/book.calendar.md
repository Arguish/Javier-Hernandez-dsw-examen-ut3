# Calendario

# Introducción

La extensión Calendario presenta una serie de funciones para simplificar
la conversión entre diferentes formatos de calendario. El intermediario o
estádar está basado en la Fecha Juliana. La Fecha Juliana es una
cuenta de días comenzando desde el 1 de Enero del 4713 A.C. Para hacer la conversión
entre sistemas de calendario, primero debe convertir a la Fecha Juliana, y después al
sistema de calendario de su elección. ¡La Fecha Juliana es muy diferente del
Calendario Juliano! Para más información sobre la Fecha Juliana, visite
[» http://www.hermetic.ch/cal_stud/jdn.htm](http://www.hermetic.ch/cal_stud/jdn.htm). Para más
información sobre sistemas de calendario visite [» http://www.fourmilab.ch/documents/calendar/](http://www.fourmilab.ch/documents/calendar/). Los extractos de esta página están
incluidos en estas instrucciones, y están entrecomillados.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#calendar.installation)

## Instalación

Para que estas funciones estén disponibles tiene que compilar PHP con
**--enable-calendar**.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[CAL_EASTER_DEFAULT](#constant.cal-easter-default)**
    ([int](#language.types.integer))



     Para [easter_days()](#function.easter-days) : calcula Pascua para los años anteriores
     a 1753 según el calendario juliano, y para los años posteriores según el
     calendario gregoriano.





    **[CAL_EASTER_ROMAN](#constant.cal-easter-roman)**
    ([int](#language.types.integer))



     Para [easter_days()](#function.easter-days) : calcula Pascua para los años anteriores
     a 1583 según el calendario juliano, y para los años posteriores según el
     calendario gregoriano.





    **[CAL_EASTER_ALWAYS_GREGORIAN](#constant.cal-easter-always-gregorian)**
    ([int](#language.types.integer))



     Para [easter_days()](#function.easter-days) : calcula Pascua según el
     calendario gregoriano proleptico.





    **[CAL_EASTER_ALWAYS_JULIAN](#constant.cal-easter-always-julian)**
    ([int](#language.types.integer))



     Para [easter_days()](#function.easter-days) : calcula Pascua según el
     calendario juliano.





    **[CAL_GREGORIAN](#constant.cal-gregorian)**
    ([int](#language.types.integer))



     Para [cal_days_in_month()](#function.cal-days-in-month),
     [cal_from_jd()](#function.cal-from-jd), [cal_info()](#function.cal-info) y
     [cal_to_jd()](#function.cal-to-jd) : utiliza el calendario gregoriano proleptico.





    **[CAL_JULIAN](#constant.cal-julian)**
    ([int](#language.types.integer))



     Para [cal_days_in_month()](#function.cal-days-in-month),
     [cal_from_jd()](#function.cal-from-jd), [cal_info()](#function.cal-info) y
     [cal_to_jd()](#function.cal-to-jd) : utiliza el calendario juliano.





    **[CAL_JEWISH](#constant.cal-jewish)**
    ([int](#language.types.integer))



     Para [cal_days_in_month()](#function.cal-days-in-month),
     [cal_from_jd()](#function.cal-from-jd), [cal_info()](#function.cal-info) y
     [cal_to_jd()](#function.cal-to-jd) : utiliza el calendario hebreo.





    **[CAL_FRENCH](#constant.cal-french)**
    ([int](#language.types.integer))



     Para [cal_days_in_month()](#function.cal-days-in-month),
     [cal_from_jd()](#function.cal-from-jd), [cal_info()](#function.cal-info) y
     [cal_to_jd()](#function.cal-to-jd) : utiliza el calendario republicano.





    **[CAL_NUM_CALS](#constant.cal-num-cals)**
    ([int](#language.types.integer))



     El número de calendarios disponibles.





    **[CAL_JEWISH_ADD_ALAFIM_GERESH](#constant.cal-jewish-add-alafim-geresh)**
    ([int](#language.types.integer))



     Para [jdtojewish()](#function.jdtojewish) : añade un símbolo geresh (que se parece
     a una apostrofe) como separador de miles al número del año.





    **[CAL_JEWISH_ADD_ALAFIM](#constant.cal-jewish-add-alafim)**
    ([int](#language.types.integer))



     Para [jdtojewish()](#function.jdtojewish) : añade la palabra alafim como
     separador de miles al número del año.





    **[CAL_JEWISH_ADD_GERESHAYIM](#constant.cal-jewish-add-gereshayim)**
    ([int](#language.types.integer))



     Para [jdtojewish()](#function.jdtojewish) : añade un símbolo gershayim (que se parece
     a una comilla) antes de la letra final de los números de día y año.





    **[CAL_DOW_DAYNO](#constant.cal-dow-dayno)**
    ([int](#language.types.integer))



     Para [jddayofweek()](#function.jddayofweek) : el día de la semana como
     [int](#language.types.integer), donde 0 significa Domingo y
     6 significa Sábado.





    **[CAL_DOW_SHORT](#constant.cal-dow-short)**
    ([int](#language.types.integer))



     Para [jddayofweek()](#function.jddayofweek) : el nombre inglés abreviado del
     día de la semana.





    **[CAL_DOW_LONG](#constant.cal-dow-long)**
    ([int](#language.types.integer))



     Para [jddayofweek()](#function.jddayofweek) : el nombre inglés del día de
     la semana.





    **[CAL_MONTH_GREGORIAN_SHORT](#constant.cal-month-gregorian-short)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes gregoriano abreviado.





    **[CAL_MONTH_GREGORIAN_LONG](#constant.cal-month-gregorian-long)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes gregoriano.





    **[CAL_MONTH_JULIAN_SHORT](#constant.cal-month-julian-short)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes juliano abreviado.





    **[CAL_MONTH_JULIAN_LONG](#constant.cal-month-julian-long)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes juliano.





    **[CAL_MONTH_JEWISH](#constant.cal-month-jewish)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes hebreo.





    **[CAL_MONTH_FRENCH](#constant.cal-month-french)**
    ([int](#language.types.integer))



     Para [jdmonthname()](#function.jdmonthname) : el nombre de mes republicano.

# Funciones de Calendario

# cal_days_in_month

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

cal_days_in_month — Devolver el número de días de un mes para un año y un calendario dados

### Descripción

**cal_days_in_month**([int](#language.types.integer) $calendar, [int](#language.types.integer) $month, [int](#language.types.integer) $year): [int](#language.types.integer)

Esta función devolverá el número de días del mes
month del año year para
el calendario calendar especificado.

### Parámetros

     calendar


       El calendario que se va a usar para el cálculo






     month


       El mes del calendario seleccionado






     year


       El año del calendario seleccionado





### Valores devueltos

La longitud en días del mes seleccionado en el calendario dado.

### Ejemplos

    **Ejemplo #1 Ejemplo de cal_days_in_month()**

&lt;?php
$número = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31
echo "Hubo {$número} días en agosto del 2003";
?&gt;

# cal_from_jd

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

cal_from_jd — Convierte el número de días Julianos a un calendario específico

### Descripción

**cal_from_jd**([int](#language.types.integer) $julian_day, [int](#language.types.integer) $calendar): [array](#language.types.array)

**cal_from_jd()** convierte el número de días Julianos
julian_day a una fecha del calendario
calendar. Los valores posibles para
calendar son
**[CAL_GREGORIAN](#constant.cal-gregorian)**,
**[CAL_JULIAN](#constant.cal-julian)**,
**[CAL_JEWISH](#constant.cal-jewish)** y
**[CAL_FRENCH](#constant.cal-french)**.

### Parámetros

     julian_day


       Día Juliano, en forma de un [int](#language.types.integer)






     calendar


       Calendario a utilizar





### Valores devueltos

Retorna un array que contiene información sobre el calendario, como
el mes, el día, el año, el día de la semana (dow), los nombres abreviados y completos
de los días de la semana y del mes, y la fecha, en forma de una [string](#language.types.string)
"mes/día/año".
El intervalo del día de la semana va de 0 (Domingo) a
6 (Sábado).

### Ejemplos

    **Ejemplo #1 Ejemplo con cal_from_jd()**

&lt;?php
$today = unixtojd(mktime(0, 0, 0, 8, 16, 2003));
print_r(cal_from_jd($today, CAL_GREGORIAN));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[date] =&gt; 8/16/2003
[month] =&gt; 8
[day] =&gt; 16
[year] =&gt; 2003
[dow] =&gt; 6
[abbrevdayname] =&gt; Sat
[dayname] =&gt; Saturday
[abbrevmonth] =&gt; Aug
[monthname] =&gt; August
)

### Ver también

    - [cal_to_jd()](#function.cal-to-jd) - Convertir un calendario soportado a la Fecha Juliana

    - [jdtofrench()](#function.jdtofrench) - Convierte el número de días del calendario juliano en fecha del calendario

francés republicano

    - [jdtogregorian()](#function.jdtogregorian) - Convierte el número de días del calendario Juliano en fecha

Gregoriana

    - [jdtojewish()](#function.jdtojewish) - Convierte el número de días del calendario Juliano a fecha del calendario judío

    - [jdtojulian()](#function.jdtojulian) - Convierte el número de días del calendario Juliano en fecha del calendario Juliano

    - [jdtounix()](#function.jdtounix) - Convierte un día Juliano en un timestamp UNIX

# cal_info

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

cal_info — Devuelve información sobre un calendario en particular

### Descripción

**cal_info**([int](#language.types.integer) $calendar = -1): [array](#language.types.array)

**cal_info()** devuelve información sobre el
calendario calendar especificado.

La información del calendario es devuelta como una matriz que contiene los
elementos calname, calsymbol,
month, abbrevmonth y
maxdaysinmonth. Los nombre de los diferentes calendarios
que se pueden usar en calendar son los siguientes:

    -

      0 o **[CAL_GREGORIAN](#constant.cal-gregorian)** - Calendario Gregoriano



    -

      1 o **[CAL_JULIAN](#constant.cal-julian)** - Calendario Juliano



    -

      2 o **[CAL_JEWISH](#constant.cal-jewish)** - Calendario Judío



    -

      3 o **[CAL_FRENCH](#constant.cal-french)** - Calendario Republicano Francés


Si no se especifica calendar la información de todos
los calendarios soportados es devuelta como un matriz.

### Parámetros

     calendar


       El calendario del que se va a devolver la información. Si no se especifica ningún
       calendario se devolverá la información sobre todos los calendarios.





### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo de cal_info()**

&lt;?php
$info = cal_info(0);
print_r($info);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[months] =&gt; Array
(
[1] =&gt; January
[2] =&gt; February
[3] =&gt; March
[4] =&gt; April
[5] =&gt; May
[6] =&gt; June
[7] =&gt; July
[8] =&gt; August
[9] =&gt; September
[10] =&gt; October
[11] =&gt; November
[12] =&gt; December
)

    [abbrevmonths] =&gt; Array
        (
            [1] =&gt; Jan
            [2] =&gt; Feb
            [3] =&gt; Mar
            [4] =&gt; Apr
            [5] =&gt; May
            [6] =&gt; Jun
            [7] =&gt; Jul
            [8] =&gt; Aug
            [9] =&gt; Sep
            [10] =&gt; Oct
            [11] =&gt; Nov
            [12] =&gt; Dec
        )

    [maxdaysinmonth] =&gt; 31
    [calname] =&gt; Gregorian
    [calsymbol] =&gt; CAL_GREGORIAN

)

# cal_to_jd

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

cal_to_jd — Convertir un calendario soportado a la Fecha Juliana

### Descripción

**cal_to_jd**(
    [int](#language.types.integer) $calendar,
    [int](#language.types.integer) $month,
    [int](#language.types.integer) $day,
    [int](#language.types.integer) $year
): [int](#language.types.integer)

**cal_to_jd()** calcula la Fecha Juliana
para una fecha en el calendario calendar especificado.
Los calendarios calendar soportados son
**[CAL_GREGORIAN](#constant.cal-gregorian)**,
**[CAL_JULIAN](#constant.cal-julian)**,
**[CAL_JEWISH](#constant.cal-jewish)** y
**[CAL_FRENCH](#constant.cal-french)**.

### Parámetros

     calendar


       El calendario desde el que se va a hacer la conversión,
       **[CAL_GREGORIAN](#constant.cal-gregorian)**,
       **[CAL_JULIAN](#constant.cal-julian)**,
       **[CAL_JEWISH](#constant.cal-jewish)** o
       **[CAL_FRENCH](#constant.cal-french)**.






     month


       El mes como número, el rango válido depende de calendar






     day


       El día como número, el rango válido depende de calendar






     year


       El año como número, el rango válido depende de calendar





### Valores devueltos

Un número de día de la Fecha Juliana.

### Ver también

    - [cal_from_jd()](#function.cal-from-jd) - Convierte el número de días Julianos a un calendario específico

    - [frenchtojd()](#function.frenchtojd) - Convierte una fecha del Calendario Republicano Francés a una fecha Juliana

    - [gregoriantojd()](#function.gregoriantojd) - Convierte una fecha gregoriana en número de días del calendario juliano

    - [jewishtojd()](#function.jewishtojd) - Convierte una fecha del calendario judío en número de días del calendario juliano

    - [juliantojd()](#function.juliantojd) - Convierte una fecha del Calendario Juliano a una Fecha Juliana

    - [unixtojd()](#function.unixtojd) - Convierte un timestamp UNIX en un día Juliano

# easter_date

(PHP 4, PHP 5, PHP 7, PHP 8)

easter_date — Retorna el timestamp Unix para la medianoche local el día de Pascua de un año dado

### Descripción

**easter_date**([?](#language.types.null)[int](#language.types.integer) $year = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[CAL_EASTER_DEFAULT](#constant.cal-easter-default)**): [int](#language.types.integer)

Retorna un timestamp UNIX para Pascua, a medianoche, para un año dado.

La fecha de Pascua fue establecida por el concilio
de Nicea, en 325 de nuestra era, como siendo el domingo
después de la primera luna llena que sigue al equinoccio de
primavera. El equinoccio de primavera es considerado
como siendo siempre el 21 de marzo, lo cual reduce el
problema al cálculo de la fecha de la luna llena que sigue, y el
domingo siguiente. El algoritmo fue introducido hacia 532, por Dionysius
Exiguus. Con el calendario Juliano, (para los años antes de 1753),
un ciclo de 19 años es suficiente para conocer las fechas de las fases de la
luna. Con el calendario Gregoriano, (a partir de los años
1753, diseñado por Clavius y Lilius, luego introducido por el papa Gregorio XIII
en octubre de 1582, y en Gran Bretaña y sus colonias en septiembre de 1752),
dos factores de corrección fueron añadidos para hacer
el ciclo más preciso.

### Parámetros

     year


       El año, debe ser un número comprendido entre 1970 y 2037 para los sistemas de 32 bits, o entre 1970 y 2 000 000 000 para los sistemas de 64 bits.
       Si se omite o es **[null](#constant.null)**, el valor por omisión será el año actual según la hora local.






     mode


       Permite calcular la fecha de Pascua según el calendario Juliano
       cuando se define como **[CAL_EASTER_ALWAYS_JULIAN](#constant.cal-easter-always-julian)**. Ver también
       [las constantes de calendario](#calendar.constants).





### Valores devueltos

La fecha para Pascua, en forma de timestamp unix.

### Errores/Excepciones

Se genera una [ValueError](#class.valueerror) si el año es anterior a 1970 o posterior a 2037
al ejecutarse en un sistema de 32 bits, o posterior a 2 000 000 000 en un sistema de 64 bits.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       En los sistemas de 64 bits, el argumento year ahora acepta valores en el rango de 1970 a
       2 000 000 000.




      8.0.0

       year ahora es nullable.




      8.0.0

       Ahora se genera una [ValueError](#class.valueerror) cuando
       year está fuera del rango permitido.
       Anteriormente, se generaba una advertencia **[E_WARNING](#constant.e-warning)**
       y la función retornaba **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con easter_date()**

&lt;?php

echo date("M-d-Y", easter_date(1999)); // Apr-04-1999
echo date("M-d-Y", easter_date(2000)); // Apr-23-2000
echo date("M-d-Y", easter_date(2001)); // Apr-15-2001

?&gt;

    **Ejemplo #2 Uso de easter_date()** con [DateTime](#class.datetime)

&lt;?php

$timestamp = easter_date(2023);

$datetime = new \DateTime();
$datetime-&gt;setTimestamp($timestamp);

echo $datetime-&gt;format('M-d-Y'); // Apr-09-2023

?&gt;

### Notas

**Nota**:

    La función **easter_date()** se basa en las funciones
    de la biblioteca C time del sistema, en lugar de las funciones
    date y time internas de PHP. Además, la función **easter_date()**
    utiliza la variable de entorno TZ para determinar
    la zona horaria a utilizar, en lugar de la
    [zona horaria por defecto](#ini.date.timezone) de PHP,
    lo cual puede llevar a un comportamiento no deseado al utilizar
    esta función con otras funciones date de PHP.




    Como solución alternativa, puede utilizarse la función
    [easter_days()](#function.easter-days) con las clases
    [DateTime](#class.datetime) y [DateInterval](#class.dateinterval)
    para calcular el día de Pascua en la zona horaria de PHP, de la siguiente manera:

&lt;?php
function get_easter_datetime($year) {
    $base = new DateTime("$year-03-21");
$days = easter_days($year);

    return $base-&gt;add(new DateInterval("P{$days}D"));

}

foreach (range(2012, 2015) as $year) {
    printf("Pascua, en %d, cae el %s\n",
           $year,
           get_easter_datetime($year)-&gt;format('d F'));
}
?&gt;

    El ejemplo anterior mostrará:

Pascua, en 2012, cae el 08 Abril
Pascua, en 2013, cae el 31 Marzo
Pascua, en 2014, cae el 20 Abril
Pascua, en 2015, cae el 05 Abril

### Ver también

    -
     [easter_days()](#function.easter-days) - Retorna el número de días entre el 21 de marzo y Pascua, para un año dado para el cálculo de Pascua
     antes de 1970 y después de 2037

# easter_days

(PHP 4, PHP 5, PHP 7, PHP 8)

easter_days — Retorna el número de días entre el 21 de marzo y Pascua, para un año dado

### Descripción

**easter_days**([?](#language.types.null)[int](#language.types.integer) $year = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[CAL_EASTER_DEFAULT](#constant.cal-easter-default)**): [int](#language.types.integer)

Retorna el número de días entre el 21 de marzo y Pascua, para un
año dado. Si el año no está especificado, se utilizará el año actual.

Esta función puede ser utilizada en lugar de [easter_date()](#function.easter-date)
para calcular la fecha de Pascua, para los años que caen fuera del intervalo
de validez de los timestamps UNIX (es decir, antes de 1970 o después de 2037).

La fecha de Pascua fue fijada por el concilio de Nicea, en 325
de nuestra era, como siendo el domingo después de la primera luna
llena que sigue al equinoccio de primavera. El equinoccio de primavera
es considerado como siendo siempre el 21 de marzo, lo que reduce el
problema al cálculo de la fecha de la luna llena que sigue, y el
domingo siguiente. El algoritmo fue introducido hacia 532, por Dionysius
Exiguus. Con el calendario Juliano, (para los años antes de 1753),
un ciclo de 19 años es suficiente para conocer las fechas de las fases de la
luna. Con el calendario Gregoriano, (a partir de los años 1753,
diseñado por Clavius y Lilius, luego introducido por el papa Gregorio XIII
en octubre de 1582, y en Gran Bretaña y sus colonias en septiembre
de 1752), dos factores de corrección fueron añadidos para hacer el
ciclo más preciso.

### Parámetros

     year


       El año, en forma de un número positivo. Si se omite o es **[null](#constant.null)**,
       el valor por defecto será el año actual según la hora
       local.






     mode


       Permite el cálculo de las fechas de Pascua basándose en
       el calendario Gregoriano para los años entre 1582 y
       1752 cuando se define como **[CAL_EASTER_ROMAN](#constant.cal-easter-roman)**.
       Ver las [constantes
        de los calendarios](#calendar.constants) para más constantes válidas.





### Valores devueltos

El número de días entre el 21 de marzo y Pascua, para el año
year proporcionado.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       year ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con easter_days()**

&lt;?php

echo easter_days(1999); // 14, es decir, 4 de abril
echo easter_days(1492); // 32, es decir, 22 de abril
echo easter_days(1913); // 2, es decir, 23 de marzo

?&gt;

### Ver también

    - [easter_date()](#function.easter-date) - Retorna el timestamp Unix para la medianoche local el día de Pascua de un año dado

# frenchtojd

(PHP 4, PHP 5, PHP 7, PHP 8)

frenchtojd — Convierte una fecha del Calendario Republicano Francés a una fecha Juliana

### Descripción

**frenchtojd**([int](#language.types.integer) $month, [int](#language.types.integer) $day, [int](#language.types.integer) $year): [int](#language.types.integer)

Convierte una fecha del Calendario Republicano Francés
a una fecha Juliana.

Estas rutinas sólamente convierten fechas de los años 1 al 14
(fechas gregorianas desde el 22 de septiembre de 1792 hasta el 22 de septiembre
de 1806). Esto cubre con creces el periodo cuando el calendario estaba en
uso.

### Parámetros

     month


       El mes como un número desde 1 (para Vendémiaire) hasta 13 (para el periodo de 5-6 días al final de cada año)






     day


       El día como un número de 1 a 30






     year


       El año como un número entre 1 y 14





### Valores devueltos

La fecha Juliana para la fecha de la Revolución Francesa dada como un entero.

### Ver también

    - [jdtofrench()](#function.jdtofrench) - Convierte el número de días del calendario juliano en fecha del calendario

francés republicano

    - [cal_to_jd()](#function.cal-to-jd) - Convertir un calendario soportado a la Fecha Juliana

# gregoriantojd

(PHP 4, PHP 5, PHP 7, PHP 8)

gregoriantojd — Convierte una fecha gregoriana en número de días del calendario juliano

### Descripción

**gregoriantojd**([int](#language.types.integer) $month, [int](#language.types.integer) $day, [int](#language.types.integer) $year): [int](#language.types.integer)

El intervalo de validez para el calendario gregoriano es del 25 de noviembre,
4714 a.C. al menos hasta el 31 de diciembre 9999 d.C.

Aunque es posible manipular fechas hasta el 4714 a.C.,
tal uso no es significativo. Este calendario fue creado el 18 de octubre de
1582 d.C. (o 5 de octubre 1582 en calendario juliano). Algunos países no lo
aceptaron hasta mucho más tarde. Por ejemplo, los británicos no lo adoptaron
hasta 1752, los rusos en 1918 y los griegos en 1923. La mayoría de los países
europeos utilizaban el calendario juliano antes del gregoriano.

### Parámetros

     month


       El mes, en forma de número comprendido entre
       1 (para Enero) y 12 (para Diciembre)






     day


       El día, en forma de número comprendido entre 1 y 31.
       Si el mes tiene menos días de los proporcionados, se produce un desbordamiento;
       ver ejemplo a continuación.






     year


       El año, en forma de número comprendido entre -4714 y 9999.
       Los números negativos significan años antes de C., los números positivos
       significan después de C.
       Se observa que no existe el año 0; 31 de diciembre, 1
       a.C. es inmediatamente seguido por 1 de enero, 1 d.C.





### Valores devueltos

El día juliano para la fecha gregoriana proporcionada, en forma de [int](#language.types.integer).
Las fechas fuera del intervalo válido devuelven 0.

### Ejemplos

    **Ejemplo #1 Funciones calendario**

&lt;?php
$jd = gregoriantojd(10, 11, 1970);
echo "$jd\n";
$gregorian = jdtogregorian($jd);
echo "$gregorian\n";
?&gt;

    El ejemplo anterior mostrará:

2440871
10/11/1970

    **Ejemplo #2 Comportamiento de desbordamiento**

&lt;?php
echo gregoriantojd(2, 31, 2018), PHP_EOL,
gregoriantojd(3, 3, 2018), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

2458181
2458181

### Ver también

    - [jdtogregorian()](#function.jdtogregorian) - Convierte el número de días del calendario Juliano en fecha

Gregoriana

    - [cal_to_jd()](#function.cal-to-jd) - Convertir un calendario soportado a la Fecha Juliana

# jddayofweek

(PHP 4, PHP 5, PHP 7, PHP 8)

jddayofweek — Devuelve el número del día de la semana

### Descripción

**jddayofweek**([int](#language.types.integer) $julian_day, [int](#language.types.integer) $mode = **[CAL_DOW_DAYNO](#constant.cal-dow-dayno)**): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el número del día de la semana. Puede devolver una
cadena o un entero, dependiendo del modo.

### Parámetros

     julian_day


       El número del día juliano, en forma de [int](#language.types.integer).






     mode


       <caption>**Modos para la semana del calendario**</caption>



          Modo
          Significado






          0 (por omisión)

           Devuelve el número del día como un entero (0=domingo, 1=lunes, etc.)




          1

           Devuelve una cadena que contiene el nombre del día (inglés gregoriano)




          2

           Devuelve una cadena que contiene el nombre abreviado del día de la semana (inglés gregoriano)









### Valores devueltos

El día de la semana gregoriano, en forma de [int](#language.types.integer) o de [string](#language.types.string).

# jdmonthname

(PHP 4, PHP 5, PHP 7, PHP 8)

jdmonthname — Devuelve el nombre del mes

### Descripción

**jdmonthname**([int](#language.types.integer) $julian_day, [int](#language.types.integer) $mode): [string](#language.types.string)

Devuelve una cadena que contiene el nombre del mes.
mode indica de qué calendario depende este mes,
y qué tipo de nombre debe ser devuelto.

    <caption>**Modos de calendario**</caption>



       Modo
       Significado
       Valores






       **[CAL_MONTH_GREGORIAN_SHORT](#constant.cal-month-gregorian-short)**
       Gregoriano - abreviado
       Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec



       **[CAL_MONTH_GREGORIAN_LONG](#constant.cal-month-gregorian-long)**
       Gregoriano
       January, February, March, April, May, June, July, August, September, October, November, December



       **[CAL_MONTH_JULIAN_SHORT](#constant.cal-month-julian-short)**
       Juliano - abreviado
       Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec



       **[CAL_MONTH_JULIAN_LONG](#constant.cal-month-julian-long)**
       Juliano
       January, February, March, April, May, June, July, August, September, October, November, December



       **[CAL_MONTH_JEWISH](#constant.cal-month-jewish)**
       Judío
       Tishri, Heshvan, Kislev, Tevet, Shevat, Adar, Adar I, Adar II, Nisan, Iyyar, Sivan, Tammuz, Av, Elul



       **[CAL_MONTH_FRENCH](#constant.cal-month-french)**
       Francés republicano
       Vendemiaire, Brumaire, Frimaire, Nivose, Pluviose, Ventose, Germinal, Floreal, Prairial, Messidor, Thermidor, Fructidor, Extra




### Parámetros

     jday


       El día juliano a analizar






     mode


       El modo de calendario (ver tabla anterior).





### Valores devueltos

El nombre del mes para el día juliano y el mode.

# jdtofrench

(PHP 4, PHP 5, PHP 7, PHP 8)

jdtofrench — Convierte el número de días del calendario juliano en fecha del calendario
francés republicano

### Descripción

**jdtofrench**([int](#language.types.integer) $julian_day): [string](#language.types.string)

Convierte el número de días del calendario juliano en fecha del calendario
francés republicano.

### Parámetros

     julian_day


       El número del día juliano, en forma de [int](#language.types.integer)





### Valores devueltos

La fecha francesa republicana, en forma de [string](#language.types.string)
"mes/día/año".

### Ver también

    - [frenchtojd()](#function.frenchtojd) - Convierte una fecha del Calendario Republicano Francés a una fecha Juliana

    - [cal_from_jd()](#function.cal-from-jd) - Convierte el número de días Julianos a un calendario específico

# jdtogregorian

(PHP 4, PHP 5, PHP 7, PHP 8)

jdtogregorian — Convierte el número de días del calendario Juliano en fecha
Gregoriana

### Descripción

**jdtogregorian**([int](#language.types.integer) $julian_day): [string](#language.types.string)

Convierte el número de días del calendario Juliano en una cadena
que contiene una fecha del calendario Gregoriano, en formato "mes/día/año".

### Parámetros

     julian_day


       El número del día Juliano, en forma de [int](#language.types.integer)





### Valores devueltos

La fecha Gregoriana, en forma de [string](#language.types.string)
"mes/día/año".

### Ver también

    - [gregoriantojd()](#function.gregoriantojd) - Convierte una fecha gregoriana en número de días del calendario juliano

    - [cal_from_jd()](#function.cal-from-jd) - Convierte el número de días Julianos a un calendario específico

# jdtojewish

(PHP 4, PHP 5, PHP 7, PHP 8)

jdtojewish — Convierte el número de días del calendario Juliano a fecha del calendario judío

### Descripción

**jdtojewish**([int](#language.types.integer) $julian_day, [bool](#language.types.boolean) $hebrew = **[false](#constant.false)**, [int](#language.types.integer) $flags = 0): [string](#language.types.string)

Convierte un número de días del calendario Juliano a calendario judío.

### Parámetros

     julian_day


       Un número de día Juliano en forma de [int](#language.types.integer).






     hebrew


       Si el argumento hebrew está definido como **[true](#constant.true)**, el
       argumento flags se utiliza para el hebreo,
       formato de salida basado en una [string](#language.types.string) codificada ISO-8859-8.






     flags


       Una máscara a nivel de bits que puede consistir en
       **[CAL_JEWISH_ADD_ALAFIM_GERESH](#constant.cal-jewish-add-alafim-geresh)**,
       **[CAL_JEWISH_ADD_ALAFIM](#constant.cal-jewish-add-alafim)** y
       **[CAL_JEWISH_ADD_GERESHAYIM](#constant.cal-jewish-add-gereshayim)**.





### Valores devueltos

La fecha judía, en forma de [string](#language.types.string) "mes/día/año", o una [string](#language.types.string) de
fecha hebrea codificada ISO-8859-8, dependiendo del argumento hebrew.

### Ejemplos

    **Ejemplo #1 Ejemplo con jdtojewish()**

&lt;?php
$jd = gregoriantojd(10, 8, 2002);
echo jdtojewish($jd, true), PHP_EOL,
jdtojewish($jd, true, CAL_JEWISH_ADD_GERESHAYIM), PHP_EOL,
     jdtojewish($jd, true, CAL_JEWISH_ADD_ALAFIM), PHP_EOL,
jdtojewish($jd, true,CAL_JEWISH_ADD_ALAFIM_GERESH), PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

ב חשון התשסג
ב' חשון התשס"ג
ב חשון ה אלפים תשסג
ב חשון ה'תשסג

### Ver también

    - [jewishtojd()](#function.jewishtojd) - Convierte una fecha del calendario judío en número de días del calendario juliano

    - [cal_from_jd()](#function.cal-from-jd) - Convierte el número de días Julianos a un calendario específico

# jdtojulian

(PHP 4, PHP 5, PHP 7, PHP 8)

jdtojulian — Convierte el número de días del calendario Juliano en fecha del calendario Juliano

### Descripción

**jdtojulian**([int](#language.types.integer) $julian_day): [string](#language.types.string)

Convierte el número de días del calendario Juliano en una cadena
que contiene la fecha del calendario Juliano, en formato "mes/día/año".

### Parámetros

     julian_day


       El número de días Julianos, en forma de [int](#language.types.integer)





### Valores devueltos

La fecha Juliana, en forma de [string](#language.types.string)
"mes/día/año".

### Ver también

    - [juliantojd()](#function.juliantojd) - Convierte una fecha del Calendario Juliano a una Fecha Juliana

    - [cal_from_jd()](#function.cal-from-jd) - Convierte el número de días Julianos a un calendario específico

# jdtounix

(PHP 4, PHP 5, PHP 7, PHP 8)

jdtounix — Convierte un día Juliano en un timestamp UNIX

### Descripción

**jdtounix**([int](#language.types.integer) $julian_day): [int](#language.types.integer)

Devuelve un timestamp UNIX correspondiente al día Juliano
julian_day o **[false](#constant.false)** si julian_day
no está dentro del intervalo permitido. El tiempo devuelto es UTC.

### Parámetros

     julian_day


       El número de días Julianos, comprendido entre
       2440588 y 106751993607888 en
       sistemas de 64 bits, o comprendido entre
       2440588 y 2465443 en sistemas
       de 32 bits.





### Valores devueltos

El timestamp UNIX para el inicio (medianoche, no mediodía) del día Juliano dado.

### Errores/Excepciones

Si julian_day está fuera del intervalo permitido,
se lanza una [ValueError](#class.valueerror).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de error,
       sino que lanza una [ValueError](#class.valueerror) en su lugar.




      7.3.24, 7.4.12

       El límite superior del parámetro julian_day ha sido
       extendido. Antes, era de 2465342 según la arquitectura.



### Ver también

    - [unixtojd()](#function.unixtojd) - Convierte un timestamp UNIX en un día Juliano

# jewishtojd

(PHP 4, PHP 5, PHP 7, PHP 8)

jewishtojd — Convierte una fecha del calendario judío en número de días del calendario juliano

### Descripción

**jewishtojd**([int](#language.types.integer) $month, [int](#language.types.integer) $day, [int](#language.types.integer) $year): [int](#language.types.integer)

Aunque es posible manipular fechas a partir del año 1 (3761
antes de J.C.), un uso de este tipo tiene poco sentido.
El calendario judío ha sido utilizado durante varios
siglos, pero en los primeros tiempos no existía
una fórmula para determinar el inicio del mes. Un nuevo
mes comenzaba cuando una nueva luna era observada.

### Parámetros

     month


       El mes, en forma de número entre 1 y 13,
       donde 1 significa Tishri,
       13 significa Eloul, y
       6 *y* 7
       significa Adar en los años regulares, pero
       Adar I y Adar II, respectivamente,
       en los años bisiestos.






     day


       El día, en forma de número entre 1 y 30.
       Si el mes tiene solo 29 días, se asume el primer día del mes siguiente.






     year


       El año, en forma de número entre 1 y 9999





### Valores devueltos

El día juliano para la fecha judía dada, en forma de [int](#language.types.integer).

### Ver también

    - [jdtojewish()](#function.jdtojewish) - Convierte el número de días del calendario Juliano a fecha del calendario judío

    - [cal_to_jd()](#function.cal-to-jd) - Convertir un calendario soportado a la Fecha Juliana

# juliantojd

(PHP 4, PHP 5, PHP 7, PHP 8)

juliantojd — Convierte una fecha del Calendario Juliano a una Fecha Juliana

### Descripción

**juliantojd**([int](#language.types.integer) $month, [int](#language.types.integer) $day, [int](#language.types.integer) $year): [int](#language.types.integer)

El rango válido para el Calendario Juliano es desde 4713 A.C. a 9999 D.C.

Aunque esta función puede manejar fechas que se remontan hasta 4713
A.C., tal uso puede no ser significativo. El calendario fue creado en el
46 A.C., pero los detalles no se estabilizaron hasta al menos el 8 D.C.,
y quizás hasta el siglo IV tardío. También, el comienzo de un
año variaba de una cultura a otra - no todas aceptaron
enero como el primer mes.

**Precaución**

    Recuerde, el sistema de calendario actual que se usa mundialmente es el
    Calendario Gregoriano. [gregoriantojd()](#function.gregoriantojd) se puede usar para
    convertir tales fechas a sus Fechas Julianas.

### Parámetros

     month


       El mes como un número de 1 (para enero) a 12 (para diecienbre)






     day


       El día como un número de 1 a 31






     year


       El año como un número entre -4713 y 9999





### Valores devueltos

La Fecha Juliana para la fecha del Calendario Juliano dado como un entero.

### Ver también

    - [jdtojulian()](#function.jdtojulian) - Convierte el número de días del calendario Juliano en fecha del calendario Juliano

    - [cal_to_jd()](#function.cal-to-jd) - Convertir un calendario soportado a la Fecha Juliana

# unixtojd

(PHP 4, PHP 5, PHP 7, PHP 8)

unixtojd — Convierte un timestamp UNIX en un día Juliano

### Descripción

**unixtojd**([?](#language.types.null)[int](#language.types.integer) $timestamp = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el día Juliano del timestamp UNIX timestamp
(número de segundos desde el 1/1/1970), o para el día actual si
timestamp es omitido. En cualquier caso, la hora es
considerada como la hora local (no UTC).

### Parámetros

     timestamp


       Un timestamp UNIX a convertir.





### Valores devueltos

Un número de días Julianos, en forma de [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       timestamp ahora es nullable.



### Ver también

    - [jdtounix()](#function.jdtounix) - Convierte un día Juliano en un timestamp UNIX

## Tabla de contenidos

- [cal_days_in_month](#function.cal-days-in-month) — Devolver el número de días de un mes para un año y un calendario dados
- [cal_from_jd](#function.cal-from-jd) — Convierte el número de días Julianos a un calendario específico
- [cal_info](#function.cal-info) — Devuelve información sobre un calendario en particular
- [cal_to_jd](#function.cal-to-jd) — Convertir un calendario soportado a la Fecha Juliana
- [easter_date](#function.easter-date) — Retorna el timestamp Unix para la medianoche local el día de Pascua de un año dado
- [easter_days](#function.easter-days) — Retorna el número de días entre el 21 de marzo y Pascua, para un año dado
- [frenchtojd](#function.frenchtojd) — Convierte una fecha del Calendario Republicano Francés a una fecha Juliana
- [gregoriantojd](#function.gregoriantojd) — Convierte una fecha gregoriana en número de días del calendario juliano
- [jddayofweek](#function.jddayofweek) — Devuelve el número del día de la semana
- [jdmonthname](#function.jdmonthname) — Devuelve el nombre del mes
- [jdtofrench](#function.jdtofrench) — Convierte el número de días del calendario juliano en fecha del calendario
  francés republicano
- [jdtogregorian](#function.jdtogregorian) — Convierte el número de días del calendario Juliano en fecha
  Gregoriana
- [jdtojewish](#function.jdtojewish) — Convierte el número de días del calendario Juliano a fecha del calendario judío
- [jdtojulian](#function.jdtojulian) — Convierte el número de días del calendario Juliano en fecha del calendario Juliano
- [jdtounix](#function.jdtounix) — Convierte un día Juliano en un timestamp UNIX
- [jewishtojd](#function.jewishtojd) — Convierte una fecha del calendario judío en número de días del calendario juliano
- [juliantojd](#function.juliantojd) — Convierte una fecha del Calendario Juliano a una Fecha Juliana
- [unixtojd](#function.unixtojd) — Convierte un timestamp UNIX en un día Juliano

- [Introducción](#intro.calendar)
- [Instalación/Configuración](#calendar.setup)<li>[Instalación](#calendar.installation)
  </li>- [Constantes predefinidas](#calendar.constants)
- [Funciones de Calendario](#ref.calendar)<li>[cal_days_in_month](#function.cal-days-in-month) — Devolver el número de días de un mes para un año y un calendario dados
- [cal_from_jd](#function.cal-from-jd) — Convierte el número de días Julianos a un calendario específico
- [cal_info](#function.cal-info) — Devuelve información sobre un calendario en particular
- [cal_to_jd](#function.cal-to-jd) — Convertir un calendario soportado a la Fecha Juliana
- [easter_date](#function.easter-date) — Retorna el timestamp Unix para la medianoche local el día de Pascua de un año dado
- [easter_days](#function.easter-days) — Retorna el número de días entre el 21 de marzo y Pascua, para un año dado
- [frenchtojd](#function.frenchtojd) — Convierte una fecha del Calendario Republicano Francés a una fecha Juliana
- [gregoriantojd](#function.gregoriantojd) — Convierte una fecha gregoriana en número de días del calendario juliano
- [jddayofweek](#function.jddayofweek) — Devuelve el número del día de la semana
- [jdmonthname](#function.jdmonthname) — Devuelve el nombre del mes
- [jdtofrench](#function.jdtofrench) — Convierte el número de días del calendario juliano en fecha del calendario
  francés republicano
- [jdtogregorian](#function.jdtogregorian) — Convierte el número de días del calendario Juliano en fecha
  Gregoriana
- [jdtojewish](#function.jdtojewish) — Convierte el número de días del calendario Juliano a fecha del calendario judío
- [jdtojulian](#function.jdtojulian) — Convierte el número de días del calendario Juliano en fecha del calendario Juliano
- [jdtounix](#function.jdtounix) — Convierte un día Juliano en un timestamp UNIX
- [jewishtojd](#function.jewishtojd) — Convierte una fecha del calendario judío en número de días del calendario juliano
- [juliantojd](#function.juliantojd) — Convierte una fecha del Calendario Juliano a una Fecha Juliana
- [unixtojd](#function.unixtojd) — Convierte un timestamp UNIX en un día Juliano
  </li>
