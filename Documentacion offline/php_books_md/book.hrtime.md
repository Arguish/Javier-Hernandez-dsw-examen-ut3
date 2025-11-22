# Gestión del tiempo de alta resolución

# Introducción

La extensión HRTime implementa una clase StopWatch de alta resolución.
Utiliza la mejor de las APIs en las diferentes plataformas, que
proporcionará una resolución a la nanosegundo. Asimismo, es posible
implementar un cronómetro personalizado utilizando los ticks de bajo
nivel, entregados por las APIs subyacentes.

**Nota**:

    A partir de PHP 7.3.0 la función relacionada [hrtime()](#function.hrtime) forma
    parte del núcleo.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#hrtime.example.basic)

    ## Uso básico

    El ejemplo muestra el uso básico de la clase StopWatch

    **Ejemplo #1 Medir la ejecución de varios bloques de código y obtener el total**

&lt;?php

$c = new HRTime\StopWatch;

$c-&gt;start();
/* medir la ejecución de este bloque de código */
for ($i = 0; $i &lt; 1024*1024; $i++);
$c-&gt;stop();
$transcurrido0 = $c-&gt;getLastElapsedTime(HRTime\Unit::NANOSECOND);

/_ la medición no se ejecuta aquí _/
for ($i = 0; $i &lt; 1024\*1024; $i++);

$c-&gt;start();
/* medir la ejecución de este bloque de código */
for ($i = 0; $i &lt; 1024*1024; $i++);
$c-&gt;stop();
$transcurrido1 = $c-&gt;getLastElapsedTime(HRTime\Unit::NANOSECOND);

$total_transcurrido = $c-&gt;getElapsedTime(HRTime\Unit::NANOSECOND);

?&gt;

# La clase HRTime\PerformanceCounter

(PECL hrtime &gt;= 0.4.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **HRTime\PerformanceCounter**

     {


    /* Métodos */

      public static [getFrequency](#hrtime-performancecounter.getfrequency)(): [int](#language.types.integer)

public static [getTicks](#hrtime-performancecounter.getticks)(): [int](#language.types.integer)
public static [getTicksSince](#hrtime-performancecounter.gettickssince)([int](#language.types.integer) $start): [int](#language.types.integer)

}

# HRTime\PerformanceCounter::getFrequency

(PECL hrtime &gt;= 0.4.3)

HRTime\PerformanceCounter::getFrequency — Frecuencia del temporizador en ticks por segundo

### Descripción

      public static **HRTime\PerformanceCounter::getFrequency**(): [int](#language.types.integer)

Se devuelve la frecuencia del temporizador en ticks por segundo. Este
valor es constante tras el inicio del sistema en la mayoría
de los sistemas operativos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Se devuelve un [int](#language.types.integer) que indica la frecuencia del temporizador.

# HRTime\PerformanceCounter::getTicks

(PECL hrtime &gt;= 0.6.0)

HRTime\PerformanceCounter::getTicks — Ticks actuales desde el sistema

### Descripción

public static **HRTime\PerformanceCounter::getTicks**(): [int](#language.types.integer)

Devuelve el recuento de ticks.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que indica el recuento de ticks.

# HRTime\PerformanceCounter::getTicksSince

(PECL hrtime &gt;= 0.6.0)

HRTime\PerformanceCounter::getTicksSince — Ticks transcurridos desde el valor proporcionado

### Descripción

public static **HRTime\PerformanceCounter::getTicksSince**([int](#language.types.integer) $start): [int](#language.types.integer)

Devuelve el recuento de ticks transcurridos desde el valor de inicio proporcionado.

### Parámetros

     start


        Valor de ticks de inicio.





### Valores devueltos

Devuelve un [int](#language.types.integer) que indica el recuento de ticks.

## Tabla de contenidos

- [HRTime\PerformanceCounter::getFrequency](#hrtime-performancecounter.getfrequency) — Frecuencia del temporizador en ticks por segundo
- [HRTime\PerformanceCounter::getTicks](#hrtime-performancecounter.getticks) — Ticks actuales desde el sistema
- [HRTime\PerformanceCounter::getTicksSince](#hrtime-performancecounter.gettickssince) — Ticks transcurridos desde el valor proporcionado

# La clase HRTime\StopWatch

(PECL hrtime &gt;= 0.4.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **HRTime\StopWatch**



      extends
       [HRTime\PerformanceCounter](#class.hrtime-performancecounter)

     {


    /* Métodos */

public [getElapsedTicks](#hrtime-stopwatch.getelapsedticks)(): [int](#language.types.integer)
public [getElapsedTime](#hrtime-stopwatch.getelapsedtime)([int](#language.types.integer) $unit = ?): [float](#language.types.float)
public [getLastElapsedTicks](#hrtime-stopwatch.getlastelapsedticks)(): [int](#language.types.integer)
public [getLastElapsedTime](#hrtime-stopwatch.getlastelapsedtime)([int](#language.types.integer) $unit = ?): [float](#language.types.float)
public [isRunning](#hrtime-stopwatch.isrunning)(): [bool](#language.types.boolean)
public [start](#hrtime-stopwatch.start)(): [void](language.types.void.html)
public [stop](#hrtime-stopwatch.stop)(): [void](language.types.void.html)

    /* Métodos heredados */
    public static [HRTime\PerformanceCounter::getFrequency](#hrtime-performancecounter.getfrequency)(): [int](#language.types.integer)

public static [HRTime\PerformanceCounter::getTicks](#hrtime-performancecounter.getticks)(): [int](#language.types.integer)
public static [HRTime\PerformanceCounter::getTicksSince](#hrtime-performancecounter.gettickssince)([int](#language.types.integer) $start): [int](#language.types.integer)

}

# HRTime\StopWatch::getElapsedTicks

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::getElapsedTicks — Obtiene los ticks transcurridos para todos los intervalos

### Descripción

public **HRTime\StopWatch::getElapsedTicks**(): [int](#language.types.integer)

Obtiene los ticks transcurridos para todos los intervalos cerrados anteriores.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que indica los ticks transcurridos.

# HRTime\StopWatch::getElapsedTime

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::getElapsedTime — Obtiene el tiempo transcurrido para todos los intervalos

### Descripción

public **HRTime\StopWatch::getElapsedTime**([int](#language.types.integer) $unit = ?): [float](#language.types.float)

Obtiene el tiempo transcurrido para todos los intervalos anteriores cerrados.

### Parámetros

     unit


        Unidad de tiempo representada por una constante HRTime\Unit. Por omisión vale HRTime\Unit::SECOND.





### Valores devueltos

Devuelve un [float](#language.types.float) que indica el tiempo transcurrido.

# HRTime\StopWatch::getLastElapsedTicks

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::getLastElapsedTicks — Obtiene los ticks transcurridos para el último intervalo

### Descripción

public **HRTime\StopWatch::getLastElapsedTicks**(): [int](#language.types.integer)

Obtiene los ticks transcurridos para el último intervalo cerrado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que indica los ticks transcurridos.

# HRTime\StopWatch::getLastElapsedTime

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::getLastElapsedTime — Obtiene el tiempo transcurrido para el último intervalo

### Descripción

public **HRTime\StopWatch::getLastElapsedTime**([int](#language.types.integer) $unit = ?): [float](#language.types.float)

Obtiene el tiempo transcurrido para el último intervalo.

### Parámetros

     unit


        Unidad de tiempo representada por una constante
        HRTime\Unit. Por omisión vale HRTime\Unit::SECOND.





### Valores devueltos

Devuelve un [float](#language.types.float) que indica el tiempo transcurrido.

# HRTime\StopWatch::isRunning

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::isRunning — Comprueba si la medición del tiempo está en curso

### Descripción

public **HRTime\StopWatch::isRunning**(): [bool](#language.types.boolean)

Comprueba si la medición del tiempo ha sido iniciada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [bool](#language.types.boolean) que indica si la medición del tiempo está en curso.

# HRTime\StopWatch::start

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::start — Inicia la medición del tiempo

### Descripción

public **HRTime\StopWatch::start**(): [void](language.types.void.html)

Inicia la medición del tiempo. Este método no tiene ningún efecto si la medición ya ha sido iniciada. La medición continuará si ha sido detenida previamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No devuelve ningún valor.

# HRTime\StopWatch::stop

(PECL hrtime &gt;= 0.4.3)

HRTime\StopWatch::stop — Detiene la medición del tiempo

### Descripción

public **HRTime\StopWatch::stop**(): [void](language.types.void.html)

Detiene la medición del tiempo para el intervalo anterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve void.

## Tabla de contenidos

- [HRTime\StopWatch::getElapsedTicks](#hrtime-stopwatch.getelapsedticks) — Obtiene los ticks transcurridos para todos los intervalos
- [HRTime\StopWatch::getElapsedTime](#hrtime-stopwatch.getelapsedtime) — Obtiene el tiempo transcurrido para todos los intervalos
- [HRTime\StopWatch::getLastElapsedTicks](#hrtime-stopwatch.getlastelapsedticks) — Obtiene los ticks transcurridos para el último intervalo
- [HRTime\StopWatch::getLastElapsedTime](#hrtime-stopwatch.getlastelapsedtime) — Obtiene el tiempo transcurrido para el último intervalo
- [HRTime\StopWatch::isRunning](#hrtime-stopwatch.isrunning) — Comprueba si la medición del tiempo está en curso
- [HRTime\StopWatch::start](#hrtime-stopwatch.start) — Inicia la medición del tiempo
- [HRTime\StopWatch::stop](#hrtime-stopwatch.stop) — Detiene la medición del tiempo

# La clase HRTime\Unit

(PECL hrtime &gt;= 0.4.3)

## Introducción

## Sinopsis de la Clase

    ****




      class **HRTime\Unit**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SECOND](#hrtime-unit.constants.second) = 0;

    const
     [int](#language.types.integer)
      [MILLISECOND](#hrtime-unit.constants.millisecond) = 1;

    const
     [int](#language.types.integer)
      [MICROSECOND](#hrtime-unit.constants.microsecond) = 2;

    const
     [int](#language.types.integer)
      [NANOSECOND](#hrtime-unit.constants.nanosecond) = 3;


    /* Métodos */

}

## Constantes predefinidas

     **[HRTime\Unit::SECOND](#hrtime-unit.constants.second)**








     **[HRTime\Unit::MILLISECOND](#hrtime-unit.constants.millisecond)**








     **[HRTime\Unit::MICROSECOND](#hrtime-unit.constants.microsecond)**








     **[HRTime\Unit::NANOSECOND](#hrtime-unit.constants.nanosecond)**






- [Introducción](#intro.hrtime)
- [Ejemplos](#hrtime.examples)<li>[Uso básico](#hrtime.example.basic)
  </li>- [HRTime\PerformanceCounter](#class.hrtime-performancecounter) — La clase HRTime\PerformanceCounter<li>[HRTime\PerformanceCounter::getFrequency](#hrtime-performancecounter.getfrequency) — Frecuencia del temporizador en ticks por segundo
- [HRTime\PerformanceCounter::getTicks](#hrtime-performancecounter.getticks) — Ticks actuales desde el sistema
- [HRTime\PerformanceCounter::getTicksSince](#hrtime-performancecounter.gettickssince) — Ticks transcurridos desde el valor proporcionado
  </li>- [HRTime\StopWatch](#class.hrtime-stopwatch) — La clase HRTime\StopWatch<li>[HRTime\StopWatch::getElapsedTicks](#hrtime-stopwatch.getelapsedticks) — Obtiene los ticks transcurridos para todos los intervalos
- [HRTime\StopWatch::getElapsedTime](#hrtime-stopwatch.getelapsedtime) — Obtiene el tiempo transcurrido para todos los intervalos
- [HRTime\StopWatch::getLastElapsedTicks](#hrtime-stopwatch.getlastelapsedticks) — Obtiene los ticks transcurridos para el último intervalo
- [HRTime\StopWatch::getLastElapsedTime](#hrtime-stopwatch.getlastelapsedtime) — Obtiene el tiempo transcurrido para el último intervalo
- [HRTime\StopWatch::isRunning](#hrtime-stopwatch.isrunning) — Comprueba si la medición del tiempo está en curso
- [HRTime\StopWatch::start](#hrtime-stopwatch.start) — Inicia la medición del tiempo
- [HRTime\StopWatch::stop](#hrtime-stopwatch.stop) — Detiene la medición del tiempo
  </li>- [HRTime\Unit](#class.hrtime-unit) — La clase HRTime\Unit
