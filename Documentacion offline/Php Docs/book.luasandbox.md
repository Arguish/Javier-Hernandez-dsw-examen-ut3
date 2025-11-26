# LuaSandbox

# Introducción

LuaSandbox es una extensión para PHP 7 y PHP 8 que permite ejecutar de manera segura código Lua 5.1 no confiable desde PHP.

Las diferencias con respecto a la extensión [Lua](#book.lua) :

    -

      LuaSandbox tiene soporte para límites de tiempo y memoria.





    -

      LuaSandbox proporciona un entorno seguro por omisión para la ejecución de código no confiable.
      Las funciones estándar de Lua han sido examinadas para la seguridad, y varias han sido corregidas en
      consecuencia.





    -

      LuaSandbox tiene una interfaz PHP más compleja, precisa y potente,
      pero es menos práctica para los desarrolladores.





    -

      LuaSandbox solo soporta Lua 5.1. Es difícil cambiar esto, ya que
      LuaSandbox utiliza bibliotecas estándar de Lua fuertemente modificadas, y
      debido a la falta de compatibilidad ascendente entre las principales versiones de Lua.
      LuaSandbox tiene como objetivo maximizar la compatibilidad ascendente con los scripts proporcionados
      por el usuario.


# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#luasandbox.requirements)
- [Instalación](#luasandbox.installation)

    ## Requerimientos

    Para utilizar esta extensión, Lua 5.1 debe estar instalado, disponible en la [» página de inicio de Lua](http://www.lua.org/).

    Para utilizar las funcionalidades de temporizador, LuaSandbox debe estar instalado en
    Linux.

    Si se utiliza FreeBSD o Mac OS X, solo se soporta el tiempo real (reloj de pared), las funciones que pretenden devolver el tiempo de CPU devolverán
    en realidad el tiempo del reloj de pared.

    Si se utiliza Windows, ninguna función de temporizador será soportada. Los límites de tiempo
    serán inoperantes.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/luasandbox](https://pecl.php.net/package/luasandbox).

    Si el sistema operativo es Debian 10 o más reciente, o Ubuntu 18.04 o más reciente, entonces
    LuaSandbox debería ser típicamente instalado desde el paquete
    php-luasandbox:

sudo apt-get install php-luasandbox

# Diferencias con Lua estándar

LuaSandbox proporciona un entorno seguro que difiere en algunos aspectos de Lua 5.1 estándar.

### Funcionalidades no disponibles

    -

      Los paquetes dofile(), loadfile(), y io, ya que permiten acceso directo al sistema de ficheros. Si es necesario, el acceso al sistema de ficheros debe realizarse a través de funciones de retrollamada PHP.





    -

      El paquete package, incluyendo require() y module(), ya que depende en gran medida del acceso directo al sistema de ficheros. Una reescritura pura de Lua como la utilizada en la extensión MediaWiki Scribunto puede ser utilizada en su lugar.





    -

      load() y loadstring(), para permitir el análisis estático del código Lua.





    -

      print(), ya que escribe en la salida estándar. Si es necesario, la salida debe realizarse a través de funciones de retrollamada PHP.





    -

      La mayoría del paquete os, ya que permite la manipulación del proceso y la ejecución de otros procesos.







       <li class="listitem">

         os.clock(), os.date(), os.difftime(), y os.time() siguen estando disponibles.







    </li>
    -

      La mayoría del paquete debug, ya que permite la manipulación del estado Lua y de los metadatos de manera que puede romper el aislamiento.







       <li class="listitem">

         debug.traceback() sigue estando disponible.







    </li>
    -

      string.dump(), ya que puede exponer datos internos.





    -

      El paquete collectgarbage(), gcinfo(), y coroutine no han sido examinados en cuanto a seguridad.


### Funcionalidades que han sido modificadas

    -

      pcall() y xpcall() no pueden capturar ciertos errores, en particular los errores de tiempo límite.





    -

      tostring() no incluye las direcciones de puntero.





    -

      string.match() ha sido parcheado para limitar la profundidad de recursión y para verificar periódicamente un tiempo límite.





    -

      math.random() y math.randomseed() son reemplazados por versiones que no comparten el estado con rand() de PHP.





    -

      Las meta métodos de Lua 5.2 __pairs y __ipairs son soportadas por pairs() y ipairs().


# Ejemplos

## Tabla de contenidos

- [Uso básico de LuaSandbox](#luasandbox.examples-basic)

    ## Uso básico de LuaSandbox

    Una vez que se ha compilado PHP con soporte para LuaSandbox, se puede comenzar a utilizar LuaSandbox para ejecutar de manera segura el código Lua proporcionado por el usuario.

    **Ejemplo #1 Ejecutar código Lua**

&lt;?php

$sandbox = new LuaSandbox;
$sandbox-&gt;setMemoryLimit( 50 _ 1024 _ 1024 );
$sandbox-&gt;setCPULimit( 10 );

// Registrar algunas funciones en el entorno Lua

function frobnosticate( $v ) {
return [ $v + 42 ];
}

$sandbox-&gt;registerLibrary( 'php', [
    'frobnosticate' =&gt; 'frobnosticate',
    'output' =&gt; function ( $string ) {
        echo "$string\n";
},
'error' =&gt; function () {
throw new LuaSandboxRuntimeError( "Something is wrong" );
}
] );

// Ejecutar código Lua, incluyendo funciones de retrollamada en PHP y en Lua

$luaCode = &lt;&lt;&lt;EOF
php.output( "Hello, world" );

return "Hi", function ( v )
return php.frobnosticate( v + 200 )
end
EOF;

list( $hi, $frob ) = $sandbox-&gt;loadString( $luaCode )-&gt;call();
assert( $frob-&gt;call( 4000 ) === [ 4242 ] );

// Las excepciones LuaSandboxRuntimeError lanzadas por PHP pueden ser capturadas en PHP

list( $ok, $message ) = $sandbox-&gt;loadString( 'return pcall( php.error )' )-&gt;call();
assert( !$ok );
assert( $message === 'Something is wrong' );

?&gt;

# La clase LuaSandbox

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    La clase LuaSandbox crea un entorno Lua y permite la ejecución de
    código Lua.

## Sinopsis de la Clase

    ****




      class **LuaSandbox**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SAMPLES](#luasandbox.constants.samples) = 0;

    const
     [int](#language.types.integer)
      [SECONDS](#luasandbox.constants.seconds) = 1;

    const
     [int](#language.types.integer)
      [PERCENT](#luasandbox.constants.percent) = 2;


    /* Métodos */

public [callFunction](#luasandbox.callfunction)([string](#language.types.string) $name, [mixed](#language.types.mixed) ...$args): [array](#language.types.array)|[bool](#language.types.boolean)
public [disableProfiler](#luasandbox.disableprofiler)(): [void](language.types.void.html)
public [enableProfiler](#luasandbox.enableprofiler)([float](#language.types.float) $period = 0.02): [bool](#language.types.boolean)
public [getCPUUsage](#luasandbox.getcpuusage)(): [float](#language.types.float)
public [getMemoryUsage](#luasandbox.getmemoryusage)(): [int](#language.types.integer)
public [getPeakMemoryUsage](#luasandbox.getpeakmemoryusage)(): [int](#language.types.integer)
public [getProfilerFunctionReport](#luasandbox.getprofilerfunctionreport)([int](#language.types.integer) $units = LuaSandbox::SECONDS): [array](#language.types.array)
public static [getVersionInfo](#luasandbox.getversioninfo)(): [array](#language.types.array)
public [loadBinary](#luasandbox.loadbinary)([string](#language.types.string) $code, [string](#language.types.string) $chunkName = ''): [LuaSandboxFunction](#class.luasandboxfunction)
public [loadString](#luasandbox.loadstring)([string](#language.types.string) $code, [string](#language.types.string) $chunkName = ''): [LuaSandboxFunction](#class.luasandboxfunction)
public [pauseUsageTimer](#luasandbox.pauseusagetimer)(): [bool](#language.types.boolean)
public [registerLibrary](#luasandbox.registerlibrary)([string](#language.types.string) $libname, [array](#language.types.array) $functions): [void](language.types.void.html)
public [setCPULimit](#luasandbox.setcpulimit)([float](#language.types.float)|[bool](#language.types.boolean) $limit): [void](language.types.void.html)
public [setMemoryLimit](#luasandbox.setmemorylimit)([int](#language.types.integer) $limit): [void](language.types.void.html)
public [unpauseUsageTimer](#luasandbox.unpauseusagetimer)(): [void](language.types.void.html)
public [wrapPhpFunction](#luasandbox.wrapphpfunction)([callable](#language.types.callable) $function): [LuaSandboxFunction](#class.luasandboxfunction)

}

## Constantes predefinidas

     **[LuaSandbox::SAMPLES](#luasandbox.constants.samples)**


       Utilizado con [LuaSandbox::getProfilerFunctionReport()](#luasandbox.getprofilerfunctionreport) para devolver las duraciones en muestras.







     **[LuaSandbox::SECONDS](#luasandbox.constants.seconds)**


       Utilizado con [LuaSandbox::getProfilerFunctionReport()](#luasandbox.getprofilerfunctionreport) para devolver las duraciones en segundos.







     **[LuaSandbox::PERCENT](#luasandbox.constants.percent)**


       Utilizado con [LuaSandbox::getProfilerFunctionReport()](#luasandbox.getprofilerfunctionreport) para devolver las duraciones en porcentajes del total.





# LuaSandbox::callFunction

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::callFunction — Llama a una función en una variable global Lua

### Descripción

public **LuaSandbox::callFunction**([string](#language.types.string) $name, [mixed](#language.types.mixed) ...$args): [array](#language.types.array)|[bool](#language.types.boolean)

Llama a una función en una variable global Lua.

Si el nombre contiene caracteres ".", la función se localiza a través
de accesos recursivos a la tabla, como si el nombre fuera una expresión Lua.

Si la variable no existe, o no es una función, se devolverá false y se emitirá un aviso.

Para más información sobre la llamada de funciones Lua y los valores de retorno,
ver [LuaSandboxFunction::call()](#luasandboxfunction.call).

### Parámetros

    name


      Nombre de la variable Lua.






    args


      Argumentos de la función.


### Valores devueltos

Devuelve un [array](#language.types.array) de los valores devueltos por la función Lua, que puede estar vacío, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Llamada a una función Lua**

&lt;?php

// crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// Llamar a la función Lua string.match
$captures = $sandbox-&gt;callFunction( 'string.match', $string, $pattern );

?&gt;

# LuaSandbox::disableProfiler

(PECL luasandbox &gt;= 1.1.0)

LuaSandbox::disableProfiler — Desactiva el perfilador

### Descripción

public **LuaSandbox::disableProfiler**(): [void](language.types.void.html)

Desactiva el perfilador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [LuaSandbox::enableProfiler()](#luasandbox.enableprofiler) - Activa el perfilador

    - [LuaSandbox::getProfilerFunctionReport()](#luasandbox.getprofilerfunctionreport) - Recupera los datos del perfilador

# LuaSandbox::enableProfiler

(PECL luasandbox &gt;= 1.1.0)

LuaSandbox::enableProfiler — Activa el perfilador

### Descripción

public **LuaSandbox::enableProfiler**([float](#language.types.float) $period = 0.02): [bool](#language.types.boolean)

Activa el perfilador. El perfilado comenzará cuando se ingrese código Lua.

El perfilador muestrea periódicamente el entorno Lua para registrar la función en ejecución. Las pruebas indican que, al menos en Linux, un período inferior a 1ms resultará en un número elevado de desbordamientos, pero sin problemas de rendimiento.

### Parámetros

    period


      Muestreo en segundos.


### Valores devueltos

Devuelve un bool indicando si el perfilador está activado.

### Ver también

    - [LuaSandbox::disableProfiler()](#luasandbox.disableprofiler) - Desactiva el perfilador

    - [LuaSandbox::getProfilerFunctionReport()](#luasandbox.getprofilerfunctionreport) - Recupera los datos del perfilador

# LuaSandbox::getCPUUsage

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::getCPUUsage — Recupera el uso actual del tiempo de CPU del entorno Lua

### Descripción

public **LuaSandbox::getCPUUsage**(): [float](#language.types.float)

Recupera el uso actual del tiempo de CPU del entorno Lua.

Esto incluye el tiempo pasado en las funciones de retrollamada PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el uso actual del tiempo de CPU en segundos.

**Nota**:

    En Windows, esta función siempre devuelve cero. En los sistemas operativos que no soportan **[CLOCK_THREAD_CPUTIME_ID](#constant.clock-thread-cputime-id)**,
    como FreeBSD y Mac OS X, esta función devolverá el tiempo transcurrido en el reloj, no el tiempo de CPU.

### Ver también

    - [LuaSandbox::getMemoryUsage()](#luasandbox.getmemoryusage) - Recupera el uso actual de la memoria del entorno Lua

    - [LuaSandbox::getPeakMemoryUsage()](#luasandbox.getpeakmemoryusage) - Recupera el pico de uso de memoria del entorno Lua

    - [LuaSandbox::setCPULimit()](#luasandbox.setcpulimit) - Define la limitación de tiempo CPU para el entorno Lua

# LuaSandbox::getMemoryUsage

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::getMemoryUsage — Recupera el uso actual de la memoria del entorno Lua

### Descripción

public **LuaSandbox::getMemoryUsage**(): [int](#language.types.integer)

Recupera el uso actual de la memoria del entorno Lua.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el uso actual de la memoria en bytes.

### Ver también

    - [LuaSandbox::getPeakMemoryUsage()](#luasandbox.getpeakmemoryusage) - Recupera el pico de uso de memoria del entorno Lua

    - [LuaSandbox::getCPUUsage()](#luasandbox.getcpuusage) - Recupera el uso actual del tiempo de CPU del entorno Lua

    - [LuaSandbox::setMemoryLimit()](#luasandbox.setmemorylimit) - Define el límite de memoria para el entorno Lua

# LuaSandbox::getPeakMemoryUsage

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::getPeakMemoryUsage — Recupera el pico de uso de memoria del entorno Lua

### Descripción

public **LuaSandbox::getPeakMemoryUsage**(): [int](#language.types.integer)

Recupera el pico de uso de memoria del entorno Lua.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el pico de uso de memoria en bytes.

### Ver también

    - [LuaSandbox::getMemoryUsage()](#luasandbox.getmemoryusage) - Recupera el uso actual de la memoria del entorno Lua

    - [LuaSandbox::getCPUUsage()](#luasandbox.getcpuusage) - Recupera el uso actual del tiempo de CPU del entorno Lua

    - [LuaSandbox::setMemoryLimit()](#luasandbox.setmemorylimit) - Define el límite de memoria para el entorno Lua

# LuaSandbox::getProfilerFunctionReport

(PECL luasandbox &gt;= 1.1.0)

LuaSandbox::getProfilerFunctionReport — Recupera los datos del perfilador

### Descripción

public **LuaSandbox::getProfilerFunctionReport**([int](#language.types.integer) $units = LuaSandbox::SECONDS): [array](#language.types.array)

Para una instancia de perfilado previamente iniciada por
[LuaSandbox::enableProfiler()](#luasandbox.enableprofiler), recupera un
informe del costo de cada función.

La medición del costo se determina por el argumento
$units:

     **[LuaSandbox::SAMPLES](#luasandbox.constants.samples)**
     Medición en número de muestras.




     **[LuaSandbox::SECONDS](#luasandbox.constants.seconds)**
     Medición en segundos de tiempo CPU.




     **[LuaSandbox::PERCENT](#luasandbox.constants.percent)**
     Medición en porcentaje de tiempo CPU.

### Parámetros

    units


      La unidad de medida constante.


### Valores devueltos

Devuelve las mediciones del perfilador, ordenadas en orden descendente, en forma
de un array asociativo. Las claves son los nombres de las funciones Lua (con el fichero fuente y la línea
definidos entre corchetes angulares), los valores son las mediciones en [int](#language.types.integer)
o [float](#language.types.float).

**Nota**:

    En Windows, esta función siempre devuelve cero. En los sistemas operativos que no soportan **[CLOCK_THREAD_CPUTIME_ID](#constant.clock-thread-cputime-id)**,
    como FreeBSD y Mac OS X, esta función devolverá el tiempo transcurrido
    en el reloj, no el tiempo CPU.

### Ejemplos

    **Ejemplo #1 Perfilado de código Lua**

&lt;?php

// crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// Inicia el perfilador
$sandbox-&gt;enableProfiler( 0.01 );

// ... Ejecute código Lua aquí ...

// Recupera los datos del perfilador
$data = $sandbox-&gt;getProfilerFunctionReport();

?&gt;

# LuaSandbox::getVersionInfo

(PECL luasandbox &gt;= 1.6.0)

LuaSandbox::getVersionInfo — Devuelve las versiones de LuaSandbox y Lua

### Descripción

public static **LuaSandbox::getVersionInfo**(): [array](#language.types.array)

Devuelve las versiones de LuaSandbox y Lua.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con dos claves:

      elementtypedescription





       LuaSandbox
       [string](#language.types.string)
       La versión de la extensión LuaSandbox.



       Lua
       [string](#language.types.string)
       El nombre y la versión de la biblioteca Lua, tal como se define por la macro LUA_RELEASE, por ejemplo, "Lua 5.1.5".




# LuaSandbox::loadBinary

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::loadBinary — Carga un fragmento binario precompilado en el entorno Lua

### Descripción

public **LuaSandbox::loadBinary**([string](#language.types.string) $code, [string](#language.types.string) $chunkName = ''): [LuaSandboxFunction](#class.luasandboxfunction)

Carga los datos generados por [LuaSandboxFunction::dump()](#luasandboxfunction.dump).

### Parámetros

    code


      Los datos de [LuaSandboxFunction::dump()](#luasandboxfunction.dump).






    chunkName


      El nombre del fragmento para la función cargada.


### Valores devueltos

Devuelve una [LuaSandboxFunction](#class.luasandboxfunction).

### Ver también

    - [LuaSandbox::loadString()](#luasandbox.loadstring) - Carga código Lua en el entorno Lua

# LuaSandbox::loadString

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::loadString — Carga código Lua en el entorno Lua

### Descripción

public **LuaSandbox::loadString**([string](#language.types.string) $code, [string](#language.types.string) $chunkName = ''): [LuaSandboxFunction](#class.luasandboxfunction)

Carga código Lua en el entorno Lua.

Esto es equivalente a la función loadstring() de Lua estándar.

### Parámetros

    code


      El código Lua.






    chunkName


      El nombre del fragmento cargado, para su uso en los rastros de error.


### Valores devueltos

Devuelve una [LuaSandboxFunction](#class.luasandboxfunction) que, al ejecutarse, ejecutará el $code pasado.

### Ejemplos

    **Ejemplo #1 Carga de código en Lua**

&lt;?php

// Crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// Carga el código
$function = $sandbox-&gt;loadString(
&lt;&lt;&lt;CODE
return "Hello, world"
CODE
);

// Ejecuta el código cargado
var_dump( $function-&gt;call() );

?&gt;

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
string(12) "Hello, world"
}

### Ver también

    - [LuaSandbox::registerLibrary()](#luasandbox.registerlibrary) - Registra un conjunto de funciones PHP como una biblioteca Lua

    - [LuaSandbox::wrapPhpFunction()](#luasandbox.wrapphpfunction) - Envuelve una función PHP en una LuaSandboxFunction

# LuaSandbox::pauseUsageTimer

(PECL luasandbox &gt;= 1.4.0)

LuaSandbox::pauseUsageTimer — Pausa el temporizador de uso de la CPU

### Descripción

public **LuaSandbox::pauseUsageTimer**(): [bool](#language.types.boolean)

Pausa el temporizador de uso de la CPU.

Esto solo tiene efecto cuando se llama desde una retrollamada de Lua. Cuando
la ejecución vuelve a Lua, el temporizador se reiniciará automáticamente.
Si se realiza una nueva llamada a Lua, el temporizador se reiniciará
durante la duración de esa llamada.

Si una retrollamada PHP llama nuevamente a Lua con el temporizador sin pausar, y
esa función Lua llama nuevamente a PHP, la segunda llamada PHP no podrá
pausar el temporizador. La lógica es que incluso si la segunda llamada PHP
evita contar el uso de la CPU contra el límite, la primera
llamada sigue contándolo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [bool](#language.types.boolean) indicando si el temporizador está ahora en pausa.

### Ejemplos

    **Ejemplo #1 Manipulando el temporizador de uso**

&lt;?php

// Crear un nuevo LuaSandbox y definir un límite de CPU
$sandbox = new LuaSandbox();
$sandbox-&gt;setCPULimit( 1 );

function doWait( $t ) {
$end = microtime( true ) + $t;
while ( microtime( true ) &lt; $end ) {
// waste CPU cycles
}
}

// Registrar una función de retrollamada PHP
$sandbox-&gt;registerLibrary( 'php', [
'test' =&gt; function () use ( $sandbox ) {
$sandbox-&gt;pauseUsageTimer();
doWait( 5 );

        $sandbox-&gt;unpauseUsageTimer();
        doWait( 0.1 );
    },
    'test2' =&gt; function () use ( $sandbox ) {
        $sandbox-&gt;pauseUsageTimer();
        $sandbox-&gt;unpauseUsageTimer();
        doWait( 1.1 );
    }

] );

echo "Esto no debería agotar el tiempo...\n";
$sandbox-&gt;loadString( 'php.test()' )-&gt;call();

echo "Esto debería agotar el tiempo.\n";
try {
$sandbox-&gt;loadString( 'php.test2()' )-&gt;call();
echo "¿No lo hizo?\n";
} catch ( LuaSandboxTimeoutError $ex ) {
echo "¡Lo hizo! " . $ex-&gt;getMessage() . "\n";
}

?&gt;

    El ejemplo anterior mostrará:

Esto no debería agotar el tiempo...
Esto debería agotar el tiempo.
¡Lo hizo! El tiempo máximo de ejecución para este script fue excedido

### Ver también

    - [LuaSandbox::setCPULimit()](#luasandbox.setcpulimit) - Define la limitación de tiempo CPU para el entorno Lua

    - [LuaSandbox::unpauseUsageTimer()](#luasandbox.unpauseusagetimer) - Reanuda el temporizador de uso pausado por LuaSandbox::pauseUsageTimer

# LuaSandbox::registerLibrary

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::registerLibrary — Registra un conjunto de funciones PHP como una biblioteca Lua

### Descripción

public **LuaSandbox::registerLibrary**([string](#language.types.string) $libname, [array](#language.types.array) $functions): [void](language.types.void.html)

Registra un conjunto de funciones PHP como una biblioteca Lua, de modo que Lua pueda
llamar al código PHP correspondiente.

Para más información sobre la llamada de funciones Lua y los valores de retorno,
ver [LuaSandboxFunction::call()](#luasandboxfunction.call).

### Parámetros

    libname


      El nombre de la biblioteca. En el estado Lua, la variable global de este
      nombre se definirá en la tabla de funciones. Si la tabla ya existe,
      las nuevas funciones se añadirán a ella.






    functions


      Un [array](#language.types.array), donde cada clave es un nombre de función, y cada valor es un
      [callable](#language.types.callable) PHP correspondiente.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Registro de funciones PHP para ser llamadas desde Lua**

&lt;?php

// crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// Registrar algunas funciones en el entorno Lua

function frobnosticate( $v ) {
return [ $v + 42 ];
}

$sandbox-&gt;registerLibrary( 'php', [
    'frobnosticate' =&gt; 'frobnosticate',
    'output' =&gt; function ( $string ) {
        echo "$string\n";
},
'error' =&gt; function () {
throw new LuaSandboxRuntimeError( "Something is wrong" );
}
] );

?&gt;

### Ver también

    - [LuaSandbox::loadString()](#luasandbox.loadstring) - Carga código Lua en el entorno Lua

    - [LuaSandbox::wrapPhpFunction()](#luasandbox.wrapphpfunction) - Envuelve una función PHP en una LuaSandboxFunction

# LuaSandbox::setCPULimit

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::setCPULimit — Define la limitación de tiempo CPU para el entorno Lua

### Descripción

public **LuaSandbox::setCPULimit**([float](#language.types.float)|[bool](#language.types.boolean) $limit): [void](language.types.void.html)

Define la limitación de tiempo CPU para el entorno Lua.

Si el tiempo total de usuario y sistema utilizado por el entorno después
de la llamada a este método excede este límite, se lanza una excepción
[LuaSandboxTimeoutError](#class.luasandboxtimeouterror).

El tiempo utilizado en las funciones de retrollamada PHP se incluye en el límite.

Definir el tiempo límite a una función de retrollamada Lua en ejecución provoca
que el temporizador se reinicie, o se inicie si no estaba ya en ejecución.

**Nota**:

    En Windows, la limitación de tiempo CPU será ignorada. En los sistemas operativos
    que no soportan **[CLOCK_THREAD_CPUTIME_ID](#constant.clock-thread-cputime-id)**, como FreeBSD y Mac OS X, el tiempo transcurrido en el muro, en lugar del tiempo CPU, será limitado.

### Parámetros

    limit


      El límite como [float](#language.types.float) en segundos, o **[false](#constant.false)** para ningún límite.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Llamada a una función Lua**

&lt;?php

// crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// definir un límite de tiempo
$sandbox-&gt;setCPULimit( 2 );

// lanza el código Lua
$sandbox-&gt;loadString( 'while true do end' )-&gt;call();

?&gt;

    Resultado del ejemplo anterior es similar a:

PHP Fatal error: Uncaught LuaSandboxTimeoutError: The maximum execution time for this script was exceeded

### Ver también

    - [LuaSandbox::getCPUUsage()](#luasandbox.getcpuusage) - Recupera el uso actual del tiempo de CPU del entorno Lua

    - [LuaSandbox::setMemoryLimit()](#luasandbox.setmemorylimit) - Define el límite de memoria para el entorno Lua

# LuaSandbox::setMemoryLimit

(PECL luasandbox &gt;= 1.0.0)

LuaSandbox::setMemoryLimit — Define el límite de memoria para el entorno Lua

### Descripción

public **LuaSandbox::setMemoryLimit**([int](#language.types.integer) $limit): [void](language.types.void.html)

Define el límite de memoria para el entorno Lua.

Si se supera este límite, se lanza una
excepción [LuaSandboxMemoryError](#class.luasandboxmemoryerror).

### Parámetros

    limit


      El límite de memoria en bytes.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Llamando a una función Lua**

&lt;?php

// crear un nuevo LuaSandbox
$sandbox = new LuaSandbox();

// define un límite de memoria
$sandbox-&gt;setMemoryLimit( 50 _ 1024 _ 1024 );

// ejecuta el código Lua
$sandbox-&gt;loadString( 'local x = "x"; while true do x = x .. x; end' )-&gt;call();

?&gt;

    Resultado del ejemplo anterior es similar a:

PHP Fatal error: Uncaught LuaSandboxMemoryError: not enough memory

### Ver también

    - [LuaSandbox::getMemoryUsage()](#luasandbox.getmemoryusage) - Recupera el uso actual de la memoria del entorno Lua

    - [LuaSandbox::getPeakMemoryUsage()](#luasandbox.getpeakmemoryusage) - Recupera el pico de uso de memoria del entorno Lua

    - [LuaSandbox::setCPULimit()](#luasandbox.setcpulimit) - Define la limitación de tiempo CPU para el entorno Lua

# LuaSandbox::unpauseUsageTimer

(PECL luasandbox &gt;= 1.4.0)

LuaSandbox::unpauseUsageTimer — Reanuda el temporizador de uso pausado por [LuaSandbox::pauseUsageTimer()](#luasandbox.pauseusagetimer)

### Descripción

public **LuaSandbox::unpauseUsageTimer**(): [void](language.types.void.html)

Reanuda el temporizador de uso pausado por [LuaSandbox::pauseUsageTimer()](#luasandbox.pauseusagetimer).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [LuaSandbox::pauseUsageTimer()](#luasandbox.pauseusagetimer) - Pausa el temporizador de uso de la CPU

    - [LuaSandbox::setCPULimit()](#luasandbox.setcpulimit) - Define la limitación de tiempo CPU para el entorno Lua

# LuaSandbox::wrapPhpFunction

(PECL luasandbox &gt;= 1.2.0)

LuaSandbox::wrapPhpFunction — Envuelve una función PHP en una [LuaSandboxFunction](#class.luasandboxfunction)

### Descripción

public **LuaSandbox::wrapPhpFunction**([callable](#language.types.callable) $function): [LuaSandboxFunction](#class.luasandboxfunction)

Envuelve una función PHP en una [LuaSandboxFunction](#class.luasandboxfunction), de modo
que pueda ser pasada a Lua como una función anónima.

La función debe devolver un array de valores (que puede estar vacío),
o **[null](#constant.null)** que es equivalente a devolver el array vacío.

Las excepciones serán lanzadas como errores en Lua, sin embargo, solo las
excepciones [LuaSandboxRuntimeError](#class.luasandboxruntimeerror) pueden ser capturadas
dentro de Lua con pcall() o xpcall().

Para más información sobre la llamada de funciones Lua y los valores de retorno,
ver [LuaSandboxFunction::call()](#luasandboxfunction.call).

### Parámetros

    function


      La función de retrollamada a envolver.


### Valores devueltos

Devuelve un [LuaSandboxFunction](#class.luasandboxfunction).

### Ver también

    - [LuaSandbox::loadString()](#luasandbox.loadstring) - Carga código Lua en el entorno Lua

    - [LuaSandbox::registerLibrary()](#luasandbox.registerlibrary) - Registra un conjunto de funciones PHP como una biblioteca Lua

## Tabla de contenidos

- [LuaSandbox::callFunction](#luasandbox.callfunction) — Llama a una función en una variable global Lua
- [LuaSandbox::disableProfiler](#luasandbox.disableprofiler) — Desactiva el perfilador
- [LuaSandbox::enableProfiler](#luasandbox.enableprofiler) — Activa el perfilador
- [LuaSandbox::getCPUUsage](#luasandbox.getcpuusage) — Recupera el uso actual del tiempo de CPU del entorno Lua
- [LuaSandbox::getMemoryUsage](#luasandbox.getmemoryusage) — Recupera el uso actual de la memoria del entorno Lua
- [LuaSandbox::getPeakMemoryUsage](#luasandbox.getpeakmemoryusage) — Recupera el pico de uso de memoria del entorno Lua
- [LuaSandbox::getProfilerFunctionReport](#luasandbox.getprofilerfunctionreport) — Recupera los datos del perfilador
- [LuaSandbox::getVersionInfo](#luasandbox.getversioninfo) — Devuelve las versiones de LuaSandbox y Lua
- [LuaSandbox::loadBinary](#luasandbox.loadbinary) — Carga un fragmento binario precompilado en el entorno Lua
- [LuaSandbox::loadString](#luasandbox.loadstring) — Carga código Lua en el entorno Lua
- [LuaSandbox::pauseUsageTimer](#luasandbox.pauseusagetimer) — Pausa el temporizador de uso de la CPU
- [LuaSandbox::registerLibrary](#luasandbox.registerlibrary) — Registra un conjunto de funciones PHP como una biblioteca Lua
- [LuaSandbox::setCPULimit](#luasandbox.setcpulimit) — Define la limitación de tiempo CPU para el entorno Lua
- [LuaSandbox::setMemoryLimit](#luasandbox.setmemorylimit) — Define el límite de memoria para el entorno Lua
- [LuaSandbox::unpauseUsageTimer](#luasandbox.unpauseusagetimer) — Reanuda el temporizador de uso pausado por LuaSandbox::pauseUsageTimer
- [LuaSandbox::wrapPhpFunction](#luasandbox.wrapphpfunction) — Envuelve una función PHP en una LuaSandboxFunction

# La clase LuaSandboxFunction

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Representa una función Lua, permitiendo llamarla desde PHP.




    Una LuaSandboxFunction puede ser obtenida como valor de retorno desde Lua, como argumento
    pasado a una retrollamada desde Lua, o utilizando
    [LuaSandbox::wrapPhpFunction()](#luasandbox.wrapphpfunction),
    [LuaSandbox::loadString()](#luasandbox.loadstring), o
    [LuaSandbox::loadBinary()](#luasandbox.loadbinary).

## Sinopsis de la Clase

    ****




      class **LuaSandboxFunction**

     {


    /* Métodos */

public [call](#luasandboxfunction.call)([string](#language.types.string) ...$args): [array](#language.types.array)|[bool](#language.types.boolean)
public [dump](#luasandboxfunction.dump)(): [string](#language.types.string)

}

# LuaSandboxFunction::call

(PECL luasandbox &gt;= 1.0.0)

LuaSandboxFunction::call — Llama a una función Lua

### Descripción

public **LuaSandboxFunction::call**([string](#language.types.string) ...$args): [array](#language.types.array)|[bool](#language.types.boolean)

Llama a una función Lua.

Los errores considerados como culpa del código PHP harán que la función devuelva el valor **[false](#constant.false)** y emita **[E_WARNING](#constant.e-warning)**, por ejemplo, un tipo [resource](#language.types.resource) utilizado como argumento. Los errores Lua lanzarán una excepción [LuaSandboxRuntimeError](#class.luasandboxruntimeerror).

Los tipos PHP y Lua se convierten de la siguiente manera:

    -
     Los **[null](#constant.null)** de PHP son Lua nil, y viceversa.




    -

      Los [int](#language.types.integer)s de PHP y [float](#language.types.float)s se convierten en números Lua. El infinito y **[NAN](#constant.nan)** son soportados.





    -

      Los números Lua sin parte fraccionaria entre aproximadamente -2**53 y 2**53 se convierten en [int](#language.types.integer)s PHP, los demás se convierten en [float](#language.types.float)s PHP.





    -
     Los [bool](#language.types.boolean)s de PHP son booleanos Lua, y viceversa.




    -
     Los [string](#language.types.string)s de PHP son cadenas Lua, y viceversa.




    -

      Las funciones Lua son objetos PHP [LuaSandboxFunction](#class.luasandboxfunction), y viceversa. Los [callable](#language.types.callable)s PHP generales no son soportados.





    -

      Los [array](#language.types.array)s de PHP se convierten en tablas Lua, y viceversa.







       <li class="listitem">

         Se debe tener en cuenta que Lua indexa típicamente los arrays a partir de 1, mientras que PHP indexa los arrays a partir de 0. No se hace ningún ajuste para estas diferentes convenciones.





       -
        Los arrays auto-referenciales no son soportados en ambos sentidos.




       -
        Las referencias PHP son desreferenciadas.




       -

         Los __pairs y __ipairs de Lua son tratados. __index es ignorado.





       -

         Al convertir de PHP a Lua, las claves enteras entre -2**53 y 2**53 se representan como números Lua. Todas las demás claves se representan como cadenas Lua.





       -

         Al convertir de Lua a PHP, las claves distintas de las cadenas y los números enteros resultarán en un error, así como las colisiones al convertir números en cadenas o viceversa (ya que PHP considera cosas como $a[0] y $a["0"] como equivalentes).







    </li>
    -

      Todos los demás tipos no son soportados y resultarán en un error/excepción, incluyendo los [object](#language.types.object)s PHP generales y los tipos userdata y thread Lua.


Las funciones Lua devuelven intrínsecamente una lista de resultados. Por lo tanto, en caso de éxito, este método devuelve un [array](#language.types.array) que contiene todos los valores devueltos por Lua, con claves [int](#language.types.integer) comenzando en cero. Lua puede no devolver ningún resultado, en cuyo caso se devuelve un array vacío.

### Parámetros

    args


      Los argumentos pasados a la función.


### Valores devueltos

Devuelve un [array](#language.types.array) de los valores devueltos por la función, que puede estar vacío, o **[false](#constant.false)** si ocurre un error.

# LuaSandboxFunction::\_\_construct

(PECL luasandbox &gt;= 1.0.0)

LuaSandboxFunction::\_\_construct — No utilizado

### Descripción

final private **LuaSandboxFunction::\_\_construct**()

Los [LuaSandboxFunction](#class.luasandboxfunction) se obtienen como valor de retorno de Lua,
como argumento pasado a una retrollamada desde Lua, o utilizando
[LuaSandbox::wrapPhpFunction()](#luasandbox.wrapphpfunction),
[LuaSandbox::loadString()](#luasandbox.loadstring), o
[LuaSandbox::loadBinary()](#luasandbox.loadbinary). No pueden ser construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

# LuaSandboxFunction::dump

(PECL luasandbox &gt;= 1.0.0)

LuaSandboxFunction::dump — Muestra la función como un blob binario

### Descripción

public **LuaSandboxFunction::dump**(): [string](#language.types.string)

Muestra la función como un blob binario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que puede ser pasado a [LuaSandbox::loadBinary()](#luasandbox.loadbinary).

## Tabla de contenidos

- [LuaSandboxFunction::call](#luasandboxfunction.call) — Llama a una función Lua
- [LuaSandboxFunction::\_\_construct](#luasandboxfunction.construct) — No utilizado
- [LuaSandboxFunction::dump](#luasandboxfunction.dump) — Muestra la función como un blob binario

# La clase LuaSandboxError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    La clase base para las excepciones LuaSandbox

## Sinopsis de la Clase

    ****




      class **LuaSandboxError**



      extends
       [Exception](#class.exception)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [RUN](#luasandboxerror.constants.run) = 2;

    const
     [int](#language.types.integer)
      [SYNTAX](#luasandboxerror.constants.syntax) = 3;

    const
     [int](#language.types.integer)
      [MEM](#luasandboxerror.constants.mem) = 4;

    const
     [int](#language.types.integer)
      [ERR](#luasandboxerror.constants.err) = 5;


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

## Constantes predefinidas

     **[LuaSandboxError::RUN](#luasandboxerror.constants.run)**








     **[LuaSandboxError::SYNTAX](#luasandboxerror.constants.syntax)**








     **[LuaSandboxError::MEM](#luasandboxerror.constants.mem)**








     **[LuaSandboxError::ERR](#luasandboxerror.constants.err)**






# La clase LuaSandboxErrorError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Excepción lanzada cuando Lua encuentra un error dentro de un gestor de errores.

## Sinopsis de la Clase

    ****




      class **LuaSandboxErrorError**



      extends
       [LuaSandboxFatalError](#class.luasandboxfatalerror)

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

# La clase LuaSandboxFatalError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Las excepciones LuaSandbox que no pueden ser atrapadas.




    Estas excepciones no pueden ser atrapadas en Lua utilizando
    pcall() o xpcall().

## Sinopsis de la Clase

    ****




      class **LuaSandboxFatalError**



      extends
       [LuaSandboxError](#class.luasandboxerror)

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

# La clase LuaSandboxMemoryError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Excepción lanzada cuando Lua no puede asignar memoria.

## Sinopsis de la Clase

    ****




      class **LuaSandboxMemoryError**



      extends
       [LuaSandboxFatalError](#class.luasandboxfatalerror)

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

## Ver también

     - [LuaSandbox::setMemoryLimit()](#luasandbox.setmemorylimit)

# La clase LuaSandboxRuntimeError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Las excepciones de ejecución LuaSandbox que pueden ser capturadas.




    Estas excepciones pueden ser capturadas en Lua utilizando
    pcall() o xpcall().

## Sinopsis de la Clase

    ****




      class **LuaSandboxRuntimeError**



      extends
       [LuaSandboxError](#class.luasandboxerror)

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

# La clase LuaSandboxSyntaxError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Excepción lanzada cuando el código Lua no puede ser analizado.

## Sinopsis de la Clase

    ****




      class **LuaSandboxSyntaxError**



      extends
       [LuaSandboxFatalError](#class.luasandboxfatalerror)

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

# La clase LuaSandboxTimeoutError

(PECL luasandbox &gt;= 1.0.0)

## Introducción

    Excepción lanzada cuando se supera el límite de tiempo de CPU configurado.

## Sinopsis de la Clase

    ****




      class **LuaSandboxTimeoutError**



      extends
       [LuaSandboxFatalError](#class.luasandboxfatalerror)

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

## Ver también

     - [LuaSandbox::setCPULimit()](#luasandbox.setcpulimit)

- [Introducción](#intro.luasandbox)
- [Instalación/Configuración](#luasandbox.setup)<li>[Requerimientos](#luasandbox.requirements)
- [Instalación](#luasandbox.installation)
  </li>- [Diferencias con Lua estándar](#reference.luasandbox.differences)
- [Ejemplos](#luasandbox.examples)<li>[Uso básico de LuaSandbox](#luasandbox.examples-basic)
  </li>- [LuaSandbox](#class.luasandbox) — La clase LuaSandbox<li>[LuaSandbox::callFunction](#luasandbox.callfunction) — Llama a una función en una variable global Lua
- [LuaSandbox::disableProfiler](#luasandbox.disableprofiler) — Desactiva el perfilador
- [LuaSandbox::enableProfiler](#luasandbox.enableprofiler) — Activa el perfilador
- [LuaSandbox::getCPUUsage](#luasandbox.getcpuusage) — Recupera el uso actual del tiempo de CPU del entorno Lua
- [LuaSandbox::getMemoryUsage](#luasandbox.getmemoryusage) — Recupera el uso actual de la memoria del entorno Lua
- [LuaSandbox::getPeakMemoryUsage](#luasandbox.getpeakmemoryusage) — Recupera el pico de uso de memoria del entorno Lua
- [LuaSandbox::getProfilerFunctionReport](#luasandbox.getprofilerfunctionreport) — Recupera los datos del perfilador
- [LuaSandbox::getVersionInfo](#luasandbox.getversioninfo) — Devuelve las versiones de LuaSandbox y Lua
- [LuaSandbox::loadBinary](#luasandbox.loadbinary) — Carga un fragmento binario precompilado en el entorno Lua
- [LuaSandbox::loadString](#luasandbox.loadstring) — Carga código Lua en el entorno Lua
- [LuaSandbox::pauseUsageTimer](#luasandbox.pauseusagetimer) — Pausa el temporizador de uso de la CPU
- [LuaSandbox::registerLibrary](#luasandbox.registerlibrary) — Registra un conjunto de funciones PHP como una biblioteca Lua
- [LuaSandbox::setCPULimit](#luasandbox.setcpulimit) — Define la limitación de tiempo CPU para el entorno Lua
- [LuaSandbox::setMemoryLimit](#luasandbox.setmemorylimit) — Define el límite de memoria para el entorno Lua
- [LuaSandbox::unpauseUsageTimer](#luasandbox.unpauseusagetimer) — Reanuda el temporizador de uso pausado por LuaSandbox::pauseUsageTimer
- [LuaSandbox::wrapPhpFunction](#luasandbox.wrapphpfunction) — Envuelve una función PHP en una LuaSandboxFunction
  </li>- [LuaSandboxFunction](#class.luasandboxfunction) — La clase LuaSandboxFunction<li>[LuaSandboxFunction::call](#luasandboxfunction.call) — Llama a una función Lua
- [LuaSandboxFunction::\_\_construct](#luasandboxfunction.construct) — No utilizado
- [LuaSandboxFunction::dump](#luasandboxfunction.dump) — Muestra la función como un blob binario
  </li>- [LuaSandboxError](#class.luasandboxerror) — La clase LuaSandboxError
- [LuaSandboxErrorError](#class.luasandboxerrorerror) — La clase LuaSandboxErrorError
- [LuaSandboxFatalError](#class.luasandboxfatalerror) — La clase LuaSandboxFatalError
- [LuaSandboxMemoryError](#class.luasandboxmemoryerror) — La clase LuaSandboxMemoryError
- [LuaSandboxRuntimeError](#class.luasandboxruntimeerror) — La clase LuaSandboxRuntimeError
- [LuaSandboxSyntaxError](#class.luasandboxsyntaxerror) — La clase LuaSandboxSyntaxError
- [LuaSandboxTimeoutError](#class.luasandboxtimeouterror) — La clase LuaSandboxTimeoutError
