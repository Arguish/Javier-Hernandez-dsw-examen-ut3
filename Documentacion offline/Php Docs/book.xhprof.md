# Hierarchical Profiler

# Introducción

El XHProf es un perfilador ligero jerárquico y basado en la instrumentación.
Durante la fase de recopilación de datos, lleva un registro de los recuentos de llamadas e incluso
métricas para los arcos en el calibre dinámico de un programa. Calcula las exclusivas
métricas en la fase de reporte/procesamiento posterior, como el tiempo de espera (transcurrido),
El tiempo de la CPU y el uso de la memoria. Un perfil de funciones puede ser dividido por los llamantes
o llamadas. El XHProf maneja funciones recursivas detectando ciclos en la
caligrafía en el propio momento de la recogida de datos y evitar los ciclos dando
nombres calificados de profundidad para las invocaciones recursivas.

XHProf incluye una sencilla interfaz de usuario basada en HTML (escrita en PHP). El navegador basado en
La interfaz de usuario para ver los resultados de los perfiles hace que sea fácil ver los resultados o compartirlos.
con los compañeros. También se admite una vista de imagen de caligrafía.

Los informes del XHProf a menudo pueden ser útiles para entender la estructura del código
siendo ejecutado. La naturaleza jerárquica de los informes puede ser utilizada para determinar,
por ejemplo, qué cadena de llamadas llevó a que se llamara a una función en particular.

El XHProf permite comparar dos ejecuciones (también conocidas como informes "diff") o agregar
datos de múltiples ejecuciones. Informes diferenciales y agregados, muy parecidos a los informes de una sola ejecución,
ofrecen vistas "planas" y "jerárquicas" del perfil.

Se puede encontrar documentación adicional a través del
sitio [» facebook xhprof](http://web.archive.org/web/20110514095512/http://mirror.facebook.net/facebook/xhprof/doc.html).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xhprof.requirements)
- [Instalación](#xhprof.installation)
- [Configuración en tiempo de ejecución](#xhprof.configuration)

    ## Requerimientos

    Aunque no es obligatorio, xhprof incluye una interfaz que está escrito en PHP.
    Se utiliza para guardar y mostrar los datos reseñados en una forma utilizable, donde la observación
    se realiza mediante un navegador web. Por lo tanto, un servidor web PHP activado probablemente mejorará
    la experiencia xhprof.

    También hay un "fork" (bifurcación del desarrollo) de la interfaz gráfica de usuario en
    [» http://github.com/preinheimer/xhprof](http://github.com/preinheimer/xhprof)

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/xhprof](https://pecl.php.net/package/xhprof)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Xhprof Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [xhprof.output_dir](#ini.xhprof.output-dir)
      ""
      **[INI_ALL](#constant.ini-all)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     xhprof.output_dir
     [string](#language.types.string)



      Directorio utilizado por la aplicación por defecto de la  interfaz iXHProfRuns
     (es decir, la clase XHProfRuns_Default) para el almacenamiento XHProf.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[XHPROF_FLAGS_NO_BUILTINS](#constant.xhprof-flags-no-builtins)**
    ([int](#language.types.integer))



     Se utiliza para saltar todas las funciones incorporadas (internas)





    **[XHPROF_FLAGS_CPU](#constant.xhprof-flags-cpu)**
    ([int](#language.types.integer))



     Se utiliza para agregar información  de la CPU a la salida.





    **[XHPROF_FLAGS_MEMORY](#constant.xhprof-flags-memory)**
    ([int](#language.types.integer))



     Se utiliza para agregar información de la memoria a la salida.

# Ejemplos

**Ejemplo #1 Ejemplo Xhprof con interfaz gráfica de usuario opcional**

En este ejemplo se inicia y detiene el perfilador, a continuación, utiliza
interfaz gráfica de usuario para guardar y analizar los resultados. En otras palabras, el
código de la extensión se termina en la llamada a
[xhprof_disable()](#function.xhprof-disable) .

&lt;?php
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

for ($i = 0; $i &lt;= 1000; $i++) {
$a = $i \* $i;
}

$xhprof_data = xhprof_disable();

$XHPROF_ROOT = "/tools/xhprof/";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs-&gt;save_run($xhprof_data, "xhprof_testing");

echo "http://localhost/xhprof/xhprof_html/index.php?run={$run_id}&amp;source=xhprof_testing\n";

?&gt;

Resultado del ejemplo anterior es similar a:

http://localhost/xhprof/xhprof_html/index.php?run=t11_4bdf44d21121f&amp;source=xhprof_testing

# Xhprof Funciones

# xhprof_disable

(PECL xhprof &gt;= 0.9.0)

xhprof_disable — Detiene el perfilado xhprof

### Descripción

**xhprof_disable**(): [?](#language.types.null)[array](#language.types.array)

Detiene el perfilado y devuelve los datos xhprof correspondientes a su ejecución.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de datos xhprof, procedentes de su ejecución.
Devuelve **[null](#constant.null)** si el perfilado no está activado.

### Ejemplos

**Ejemplo #1 Ejemplo con xhprof_disable()**

&lt;?php
xhprof_enable();

$foo = strlen("foo bar");

$xhprof_data = xhprof_disable();

print_r($xhprof_data);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[main()==&gt;strlen] =&gt; Array
(
[ct] =&gt; 1
[wt] =&gt; 279
)

    [main()==&gt;xhprof_disable] =&gt; Array
        (
            [ct] =&gt; 1
            [wt] =&gt; 9
        )

    [main()] =&gt; Array
        (
            [ct] =&gt; 1
            [wt] =&gt; 610
        )

)

# xhprof_enable

(PECL xhprof &gt;= 0.9.0)

xhprof_enable — Inicia perfil xhprof

### Descripción

**xhprof_enable**([int](#language.types.integer) $flags = 0, [array](#language.types.array) $options = ?): [void](language.types.void.html)

Inicia perfiles xhprof.

### Parámetros

     flags


       Flags opcionales para añadir información adicional a la creación de perfiles. Véase las
       [constantes XHprof](#xhprof.constants) Para obtener más información
       acerca de estos flags, p. ej., **[XHPROF_FLAGS_MEMORY](#constant.xhprof-flags-memory)**
       para permitir perfiles de memoria.






     options


       Un [array](#language.types.array) de opciones opcionales, es decir, la opción
       'ignored_functions' para pasar en las funciones que se ignoraron
       durante el perfilado.





### Valores devueltos

**[null](#constant.null)**

### Historial de cambios

      Versión
      Descripción






      PECL xhprof 0.9.2

       El parámetro opcional options fué agregado.



### Ejemplos

**Ejemplo #1 Ejemplos de xhprof_enable()**

&lt;?php
// 1. tiempo transcurrido + memoria + perfiles CPU; e ignorar las funciones integradas (internas)
xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);

// 2. perfil tiempo transcurrido; ignorando call_user_func\* durante el perfilado
xhprof_enable(
0,
array('ignored_functions' =&gt; array('call_user_func',
'call_user_func_array')));

// 3. tiempo transcurrido + perfil de memoria; ignorando call_user_func\* durante el perfilado
xhprof_enable(
XHPROF_FLAGS_MEMORY,
array('ignored_functions' =&gt; array('call_user_func',
'call_user_func_array')));
?&gt;

### Ver también

- [xhprof_disable()](#function.xhprof-disable) - Detiene el perfilado xhprof

- [xhprof_sample_enable()](#function.xhprof-sample-enable) - Iniciar el analisis de XHProf en modo de muestreo

- [memory_get_usage()](#function.memory-get-usage) - Indica la cantidad de memoria utilizada por PHP

- [getrusage()](#function.getrusage) - Devuelve el nivel de utilización de los recursos

# xhprof_sample_disable

(PECL xhprof &gt;= 0.9.0)

xhprof_sample_disable — Detiene el perfilado xhprof por muestreo

### Descripción

**xhprof_sample_disable**(): [?](#language.types.null)[array](#language.types.array)

Detiene el perfilado xhprof por muestreo y devuelve la información de perfilado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de datos de muestreo xhprof, procedentes de su ejecución.
Devuelve **[null](#constant.null)** si el perfilado no está activado.

### Ejemplos

**Ejemplo #1 Ejemplo con xhprof_sample_disable()**

&lt;?php
xhprof_sample_enable();

for ($i = 0; $i &lt;= 10000; $i++) {
    $a = strlen($i);
$b = $i \* $a;
$c = rand();
}

$xhprof_data = xhprof_sample_disable();

print_r($xhprof_data);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[1272935300.800000] =&gt; main()
[1272935300.900000] =&gt; main()
)

# xhprof_sample_enable

(PECL xhprof &gt;= 0.9.0)

xhprof_sample_enable — Iniciar el analisis de XHProf en modo de muestreo

### Descripción

**xhprof_sample_enable**(): [void](language.types.void.html)

Inicia la creación de perfiles en modo de muestra, que es una versión más ligera de peso
de [xhprof_enable()](#function.xhprof-enable) . El intervalo de muestreo es
0,1 segundos, y las muestras de registro de la pila de llamadas de función completa. El
caso de uso principal es en gastos indirectos más bajos se requiere cuando se hace
la supervisión del rendimiento y de diagnóstico.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[null](#constant.null)**

### Ver también

- [xhprof_sample_disable()](#function.xhprof-sample-disable) - Detiene el perfilado xhprof por muestreo

- [xhprof_enable()](#function.xhprof-enable) - Inicia perfil xhprof

- [memory_get_usage()](#function.memory-get-usage) - Indica la cantidad de memoria utilizada por PHP

- [getrusage()](#function.getrusage) - Devuelve el nivel de utilización de los recursos

## Tabla de contenidos

- [xhprof_disable](#function.xhprof-disable) — Detiene el perfilado xhprof
- [xhprof_enable](#function.xhprof-enable) — Inicia perfil xhprof
- [xhprof_sample_disable](#function.xhprof-sample-disable) — Detiene el perfilado xhprof por muestreo
- [xhprof_sample_enable](#function.xhprof-sample-enable) — Iniciar el analisis de XHProf en modo de muestreo

- [Introducción](#intro.xhprof)
- [Instalación/Configuración](#xhprof.setup)<li>[Requerimientos](#xhprof.requirements)
- [Instalación](#xhprof.installation)
- [Configuración en tiempo de ejecución](#xhprof.configuration)
  </li>- [Constantes predefinidas](#xhprof.constants)
- [Ejemplos](#xhprof.examples)
- [Xhprof Funciones](#ref.xhprof)<li>[xhprof_disable](#function.xhprof-disable) — Detiene el perfilado xhprof
- [xhprof_enable](#function.xhprof-enable) — Inicia perfil xhprof
- [xhprof_sample_disable](#function.xhprof-sample-disable) — Detiene el perfilado xhprof por muestreo
- [xhprof_sample_enable](#function.xhprof-sample-enable) — Iniciar el analisis de XHProf en modo de muestreo
  </li>
