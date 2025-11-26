# Manejo y registro de errores

# Introducción

Estas funciones se ocupan del manejo y registro de errores. Le
permiten definir sus propias reglas de manejo de errores, así como modificar
la manera en que los errores pueden ser registrados. Esto le permite cambiar y
mejorar la notificación de errores para acomodarla a sus necesidades.

Con las funciones de registro se pueden enviar mensajes directamente a otras
máquinas, a un e-mail (¡o un e-mail a un busca!), al registro del sistema,
etc., por lo que puede registrar y monitorizar selectivamente las partes más importantes
de sus aplicaciones y sitios web.

Las funciones de notificación de errores le permiten personalizar qué niveles y
tipos de errores se dan, abarcando desde simples avisos hasta funciones
personalizadas devueltas al originarse un error.

# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#errorfunc.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración para la gestión de errores**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [error_reporting](#ini.error-reporting)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [display_errors](#ini.display-errors)
     "1"
     **[INI_ALL](#constant.ini-all)**
      



     [display_startup_errors](#ini.display-startup-errors)
     "1"
     **[INI_ALL](#constant.ini-all)**

      Anterior a PHP 8.0.0, el valor por omisión era "0".




     [log_errors](#ini.log-errors)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [log_errors_max_len](#ini.log-errors-max-len)
     "1024"
     **[INI_ALL](#constant.ini-all)**

      Sin efecto a partir de PHP 8.0.0, eliminado a partir de PHP 8.1.0.




     [ignore_repeated_errors](#ini.ignore-repeated-errors)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [ignore_repeated_source](#ini.ignore-repeated-source)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [report_memleaks](#ini.report-memleaks)
     "1"
     **[INI_ALL](#constant.ini-all)**
      



     [track_errors](#ini.track-errors)
     "0"
     **[INI_ALL](#constant.ini-all)**
     Deprecado a partir de PHP 7.2.0, eliminado a partir de PHP 8.0.0.



     [html_errors](#ini.html-errors)
     "1"
     **[INI_ALL](#constant.ini-all)**
      



     [xmlrpc_errors](#ini.xmlrpc-errors)
     "0"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [xmlrpc_error_number](#ini.xmlrpc-error-number)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [docref_root](#ini.docref-root)
     ""
     **[INI_ALL](#constant.ini-all)**
      



     [docref_ext](#ini.docref-ext)
     ""
     **[INI_ALL](#constant.ini-all)**
      



     [error_prepend_string](#ini.error-prepend-string)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [error_append_string](#ini.error-append-string)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [error_log](#ini.error-log)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



      [error_log_mode](#ini.error-log-mode)
      0o644
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de PHP 8.2.0.



     [syslog.facility](#ini.syslog.facility)
     "LOG_USER"
     **[INI_SYSTEM](#constant.ini-system)**
     Disponible a partir de PHP 7.3.0.



     [syslog.filter](#ini.syslog.filter)
     "no-ctrl"
     **[INI_ALL](#constant.ini-all)**
     Disponible a partir de PHP 7.3.0.



     [syslog.ident](#ini.syslog.ident)
     "php"
     **[INI_SYSTEM](#constant.ini-system)**
     Disponible a partir de PHP 7.3.0.

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     error_reporting
     [int](#language.types.integer)



      Establece el nivel de error. Este parámetro es un entero, representando un
      campo de bits. Añada los valores siguientes para elegir el nivel
      que desee, tal como se describe en la sección
      [Constantes predefinidas](#errorfunc.constants),
      y en el archivo php.ini. Para modificar esta configuración durante
      la ejecución del script, utilice la función
      [error_reporting()](#function.error-reporting). Consulte también la directiva
      [display_errors](#ini.display-errors).




      El valor por omisión es **[E_ALL](#constant.e-all)**.




      Anterior a PHP 8.0.0, el valor por omisión era :
      **[E_ALL](#constant.e-all)** &amp;
       ~**[E_NOTICE](#constant.e-notice)** &amp;
       ~**[E_STRICT](#constant.e-strict)** &amp;
       ~**[E_DEPRECATED](#constant.e-deprecated)**.
      Esto significa que los diagnósticos de nivel **[E_NOTICE](#constant.e-notice)**,
      **[E_STRICT](#constant.e-strict)** y **[E_DEPRECATED](#constant.e-deprecated)** no eran mostrados.



     **Nota**:
      **Las constantes PHP fuera de PHP**



       El uso de las constantes PHP fuera de PHP, como en el archivo
       httpd.conf, no tiene significado útil excepto
       en los casos donde se necesitan valores enteros. Y desde que los niveles
       de errores fueron añadidos, el valor máximo (para **[E_ALL](#constant.e-all)**)
       debería cambiar. Por lo tanto, en lugar de **[E_ALL](#constant.e-all)**, utilice
       un valor más grande para cubrir todos los bits, un valor numérico como
       2147483647 (incluyendo todos los errores, y no solo
       los errores de tipo **[E_ALL](#constant.e-all)**).









     display_errors
     [string](#language.types.string)



      Esta directiva determina si los errores deben ser
      mostrados en pantalla o no.




      El valor "stderr" envía los errores a stderr
      en lugar de a stdout.



     **Nota**:



       Es una directiva necesaria en desarrollo, pero que nunca debe ser utilizada
       en un sistema en producción. (ej. sistemas conectados a Internet).




     **Nota**:



       Aunque display_errors puede ser definido durante la ejecución (con
       la función [ini_set()](#function.ini-set)), no tendrá efecto si el script
       tiene errores fatales, ya que la acción deseada en el momento de la ejecución
       no será ejecutada.









     display_startup_errors
     [bool](#language.types.boolean)



      Aunque display_errors esté activado, pueden ocurrir errores durante
      la secuencia de inicio de PHP, y estos errores son ocultados.
      Con esta opción, puede mostrarlos, lo cual es recomendado
      para el depurado. Fuera de este caso, se recomienda encarecidamente
      dejar display_startup_errors en off.








     log_errors
     [bool](#language.types.boolean)



      Indica si los mensajes de error generados por los scripts deben
      ser registrados en el registro de errores del servidor o en
      [error_log](#ini.error-log).
      Esta función es específica del servidor.



     **Nota**:



       Se recomienda utilizar el historial de errores, en lugar de
       mostrar los errores en los sitios de producción.









     log_errors_max_len
     [int](#language.types.integer)



      Configura la longitud máxima de los errores que serán registrados en
      el historial, en kilobytes. En las informaciones de
      [error_log](#ini.error-log), se añade el origen.
      El valor por omisión es de 1024. 0 significa que no hay límite de
      longitud. Esta longitud se aplica para registrar en el historial
      los errores, mostrar los errores y también a [$php_errormsg](#reserved.variables.phperrormsg)
      pero no para las llamadas explícitas a funciones como [error_log()](#function.error-log).




     Cuando un [int](#language.types.integer) es utilizado,

su valor es medido en bytes. También puede utilizar la notación abreviada
como se describe en esta
[entrada de la FAQ.](#faq.using.shorthandbytes).

     ignore_repeated_errors
     [bool](#language.types.boolean)



      No registrar mensajes repetitivos. Los errores repetidos
      deben ocurrir en el mismo momento, en la misma línea y desde el mismo archivo de script,
      a menos que [ignore_repeated_source](#ini.ignore-repeated-source)
      esté definido a **[true](#constant.true)**.








     ignore_repeated_source
     [bool](#language.types.boolean)



      Ignora la fuente del mensaje en los mensajes repetidos. Cuando se ha configurado
      esta opción a On, no se registrarán los errores repetidos
      provenientes de archivos y líneas de código diferentes.








     report_memleaks
     [bool](#language.types.boolean)



      Si este parámetro está definido a On (por omisión), mostrará un informe de
      fuga de memoria detectada por el gestor de memoria Zend. Este informe
      será enviado a stderr en las plataformas Posix. En Windows, será
      enviado al depurador utilizando OutputDebugString() y podrá ser leído
      con herramientas como [» DbgView](http://technet.microsoft.com/en-us/sysinternals/bb896647).
      Este parámetro solo tiene efecto durante una compilación de depuración, y si
      error_reporting incluye **[E_WARNING](#constant.e-warning)** en su lista autorizada.








     track_errors
     [bool](#language.types.boolean)



      Si esta opción está activada, el último mensaje de error será colocado en la
      variable [$php_errormsg](#reserved.variables.phperrormsg).








     html_errors
     [bool](#language.types.boolean)



      Si está activado, los mensajes de error incluirán etiquetas HTML. El formato
      de los errores HTML producirá mensajes clicables que redirigirán al usuario
      hacia una página describiendo el error o la función que causó el error.
      Estas referencias son afectadas por
      [docref_root](#ini.docref-root) y
      [docref_ext](#ini.docref-ext).




      Si está desactivado, el mensaje de error será mostrado en texto plano.








     xmlrpc_errors
     [bool](#language.types.boolean)



      Si está activado, desactiva el informe normal de error y formatea los errores
      como mensajes de error XML-RPC.








     xmlrpc_error_number
     [int](#language.types.integer)



      Utilizado como valor del elemento XML-RPC faultcode.








     docref_root
     [string](#language.types.string)



      El nuevo formato de error contiene una referencia a una página describiendo
      el error, o la función que causó el error. Para el manual, puede
      descargar este último en su idioma, y configurar esta opción para que apunte a él. Si su copia del manual es accesible a
      "/manual/", puede simplemente utilizar
      **docref_root=/manual/**. Además, debe configurar
      docref_ext para que corresponda a las extensiones de su manual.
      **docref_ext=.html**. Es posible utilizar referencias externas. Por ejemplo, puede utilizar
      **docref_root=http://manual/en/** o
      **docref_root="http://landonize.it/?how=url&amp;theme=classic&amp;filter=Landon&amp;url=http%3A%2F%2Fwww.php.net%2F"**




      La mayoría de las veces, se utiliza la opción docref_root con una barra al final ("/").
      Pero no es obligatorio, como muestra el segundo ejemplo anterior.



     **Nota**:



       Esta directiva está destinada a ayudar en el desarrollo haciendo
       fácil la consulta de la descripción de una función. Nunca debe ser utilizada en un
       sistema de producción (ej. sistema conectado a Internet).









     docref_ext
     [string](#language.types.string)



      Consulte también [docref_root](#ini.docref-root).



     **Nota**:



       El valor de docref_ext debe comenzar con un punto ".".









     error_prepend_string
     [string](#language.types.string)



      La cadena a colocar antes de los mensajes de error.
      Solo utilizado cuando el mensaje de error es mostrado en pantalla.
      El uso principal es poder añadir etiquetado HTML adicional
      antes del mensaje de error.








     error_append_string
     [string](#language.types.string)



      La cadena a colocar después de los mensajes de error.
      Solo utilizado cuando el mensaje de error es mostrado en pantalla.
      El uso principal es poder añadir etiquetado HTML adicional
      después del mensaje de error.








     error_log
     [string](#language.types.string)



      Nombre del archivo donde serán registrados los errores. El archivo
      debe ser accesible en escritura por el usuario ejecutando
      el servidor web. Si el
      valor especial syslog es utilizado, los errores
      serán enviados al sistema de registro del servidor. En
      Unix, esto corresponde a syslog(3) y en Windows al
      registro de eventos. Consulte también: [syslog()](#function.syslog).
      Si esta directiva no está fijada, los errores son enviados al registro de errores SAPI. Por ejemplo, si es un registro de errores en
      Apache o stderr en CLI.
      Consulte también la función [error_log()](#function.error-log).








     error_log_mode
     [int](#language.types.integer)



      Modo de archivo para el archivo definido para
      [error_log](#ini.error-log).








     syslog.facility
     [string](#language.types.string)



      Especifica el tipo de programa que registra el mensaje. Solo
      efectivo si [error_log](#ini.error-log) está definido
      como "syslog".








     syslog.filter
     [string](#language.types.string)



      Especifica el tipo de filtro para filtrar los mensajes registrados. Los
      caracteres permitidos son pasados sin modificación; todos los demás son
      escritos en su representación hexadecimal prefijada con \x.



       -
        all – la cadena registrada será separada en
         caracteres de retorno de línea, y todos los caracteres son transmitidos
         sin alteraciones



       -
        ascii – la cadena registrada será separada en
         caracteres de retorno de línea, y todo carácter 7-bit ASCII no imprimible será escapado



       -
        no-ctrl – la cadena registrada será separada en
         caracteres de retorno de línea, y los caracteres no imprimibles serán escapados



       -
        raw – todos los caracteres son pasados al
         sistema de registro sin alteraciones, sin separaciones en los retornos
         de línea (idéntico a PHP anterior a 7.3)




      Este parámetro afectará el registro a través de
      [error_log](#ini.error-log) definido como "syslog" y
      las llamadas a [syslog()](#function.syslog).

     **Nota**:



       El tipo de filtro raw está disponible a partir de PHP 7.3.8 y PHP 7.4.0.





      Esta directiva no es soportada en Windows.






     syslog.ident
     [string](#language.types.string)



      Especifica la cadena de identidad que es añadida a cada mensaje.
      Solo efectivo si [error_log](#ini.error-log) está
      definido como "syslog".


# Constantes predefinidas

Las constantes listadas aquí están
siempre disponibles en PHP.

Las constantes siguientes (ya sea el valor numérico correspondiente, o su
nombre simbólico) se utilizan como una máscara de bits para especificar los errores a reportar.
Es posible utilizar
[los operadores a nivel de bits](#language.operators.bitwise)
para combinar estos valores o enmascarar ciertos tipos de errores.

**Sugerencia**

Los nombres de las constantes pueden ser utilizados en php.ini
en lugar de los valores numéricos brutos a los que corresponden.
Sin embargo, solo los operadores
|,
~,
^,
!,
&amp;
son comprendidos en php.ini.

**Advertencia**

No es posible utilizar los nombres simbólicos fuera de PHP.
Por ejemplo, en httpd.conf el valor calculado de la máscara de bits debe ser utilizado en su lugar.

    **[E_ERROR](#constant.e-error)**
    ([int](#language.types.integer))



     Errores fatales durante la ejecución
     Estos indican errores de los cuales no es posible recuperarse,
     como un problema de asignación de memoria.
     La ejecución del script es detenida.


     Valor de la constante: 1






    **[E_WARNING](#constant.e-warning)**
    ([int](#language.types.integer))



     Advertencias durante la ejecución (errores no fatales).
     La ejecución del script no es interrumpida.


     Valor de la constante: 2






    **[E_PARSE](#constant.e-parse)**
    ([int](#language.types.integer))



     Errores de análisis durante la compilación.
     Los errores de análisis deberían ser generados únicamente por el analizador sintáctico.


     Valor de la constante: 4






    **[E_NOTICE](#constant.e-notice)**
    ([int](#language.types.integer))



     Notificaciones de ejecución.
     Indican que el script ha encontrado algo que podría señalar un error,
     pero que también podría ocurrir normalmente durante la ejecución de un script.


     Valor de la constante: 8






    **[E_CORE_ERROR](#constant.e-core-error)**
    ([int](#language.types.integer))



     Errores fatales que ocurren durante el inicio inicial de PHP.
     Es como una **[E_ERROR](#constant.e-error)**,
     excepto que es generada por el núcleo de PHP.


     Valor de la constante: 16






    **[E_CORE_WARNING](#constant.e-core-warning)**
    ([int](#language.types.integer))



     Advertencias (errores no fatales) que ocurren durante el inicio inicial de PHP.
     Es como un **[E_WARNING](#constant.e-warning)**,
     excepto que es generada por el núcleo de PHP.


     Valor de la constante: 32






    **[E_COMPILE_ERROR](#constant.e-compile-error)**
    ([int](#language.types.integer))



     Errores fatales de compilación.
     Es como un **[E_ERROR](#constant.e-error)**,
     excepto que es generado por el motor de script Zend.


     Valor de la constante: 64






    **[E_COMPILE_WARNING](#constant.e-compile-warning)**
    ([int](#language.types.integer))



     Advertencias de compilación (errores no fatales).
     Es como un **[E_WARNING](#constant.e-warning)**,
     excepto que es generado por el motor de script Zend.


     Valor de la constante: 128






    **[E_DEPRECATED](#constant.e-deprecated)**
    ([int](#language.types.integer))



     Avisos de depreciación durante la ejecución.
     Actívelo para recibir advertencias sobre código
     que no funcionará en versiones futuras.


     Valor de la constante: 8192






    **[E_USER_ERROR](#constant.e-user-error)**
    ([int](#language.types.integer))



     Mensaje de error generado por el usuario.
     Esto se asemeja a un **[E_ERROR](#constant.e-error)**,
     excepto que es generado en el código PHP utilizando la función PHP
     [trigger_error()](#function.trigger-error).


     Valor de la constante: 256

    **Advertencia**

      El uso de esta constante con [trigger_error()](#function.trigger-error) está
      obsoleto a partir de PHP 8.4.0.
      Se recomienda lanzar una [Exception](#class.exception)
      o llamar a [exit()](#function.exit) en su lugar.









    **[E_USER_WARNING](#constant.e-user-warning)**
    ([int](#language.types.integer))



     Mensaje de advertencia generado por el usuario.
     Esto se asemeja a un **[E_NOTICE](#constant.e-notice)**,
     excepto que es generado en el código PHP utilizando la función PHP
     [trigger_error()](#function.trigger-error).


     Valor de la constante: 512






    **[E_USER_NOTICE](#constant.e-user-notice)**
    ([int](#language.types.integer))



     Mensaje de notificación generado por el usuario.
     Esto se asemeja a un **[E_NOTICE](#constant.e-notice)**,
     excepto que es generado en el código PHP utilizando la función PHP
     [trigger_error()](#function.trigger-error).


     Valor de la constante: 1024






    **[E_USER_DEPRECATED](#constant.e-user-deprecated)**
    ([int](#language.types.integer))



     Mensaje de depreciación generado por el usuario.
     Esto se asemeja a un **[E_DEPRECATED](#constant.e-deprecated)**,
     excepto que es generado en el código PHP utilizando la función PHP
     [trigger_error()](#function.trigger-error).


     Valor de la constante: 16384






    **[E_STRICT](#constant.e-strict)**
    ([int](#language.types.integer))



     Sugerencias de ejecución emitidas por PHP sobre el código ejecutado
     para garantizar la compatibilidad futura.


     Valor de la constante: 2048

    **Advertencia**

      Este nivel de error no es utilizado,
      y ha sido depreciado a partir de PHP 8.4.0.









    **[E_RECOVERABLE_ERROR](#constant.e-recoverable-error)**
    ([int](#language.types.integer))



     "Excepciones" del motor antiguo correspondientes a un error fatal recuperable.
     Similar a [Error](#class.error) pero debe ser capturado mediante un
     manejador de errores definido por el usuario (ver [set_error_handler()](#function.set-error-handler)).
     Si no es gestionado, se comporta como **[E_ERROR](#constant.e-error)**.


     Valor de la constante: 4096

    **Nota**:

      Este nivel de error está efectivamente inutilizado,
      el único caso en el que puede ocurrir es cuando la interpretación de un
      [object](#language.types.object) como [bool](#language.types.boolean) falla.
      Esto solo puede ocurrir para objetos internos.


      El ejemplo más común, anterior a PHP 8.4.0, es el uso de una
      instancia [GMP](#class.gmp) en una condición.









    **[E_ALL](#constant.e-all)**
    ([int](#language.types.integer))



     Máscara de bits que contiene todos los errores, advertencias y notificaciones.


     Valor de la constante: 30719

    **Advertencia**

      Anterior a PHP 8.4, el valor de la constante era 32767.


# Ejemplos

Abajo podemos ver un ejemplo del uso de las capacidades del manejo de errores de
PHP. Definimos una función de gestión de errores que registra la información en
un archivo (usado un foramto XML), y envía un e-mail a los desarrolladores en caso de que
suceda un error crítico en la lógica.

    **Ejemplo #1 Usar el manejo de errores en un script**

&lt;?php
// haremos nuestro propio manejo de errores
error_reporting(0);

// función de gestión de errores definida por el usuario
function gestorErrores($númerr, $menserr, $nombrearchivo, $númlínea, $vars)
{
// marca de tiempo para la entrada del error
$fh = date("Y-m-d H:i:s (T)");

    // definir una matriz asociativa de cadena de error
    // en realidad las únicas entradas que deberíamos
    // considerar son E_WARNING, E_NOTICE, E_USER_ERROR,
    // E_USER_WARNING y E_USER_NOTICE
    $tipoerror = array (
                E_ERROR              =&gt; 'Error',
                E_WARNING            =&gt; 'Warning',
                E_PARSE              =&gt; 'Parsing Error',
                E_NOTICE             =&gt; 'Notice',
                E_CORE_ERROR         =&gt; 'Core Error',
                E_CORE_WARNING       =&gt; 'Core Warning',
                E_COMPILE_ERROR      =&gt; 'Compile Error',
                E_COMPILE_WARNING    =&gt; 'Compile Warning',
                E_USER_ERROR         =&gt; 'User Error',
                E_USER_WARNING       =&gt; 'User Warning',
                E_USER_NOTICE        =&gt; 'User Notice',
                E_STRICT             =&gt; 'Runtime Notice',
                E_RECOVERABLE_ERROR  =&gt; 'Catchable Fatal Error'
                );
    // conjunto de errores por el cuál se guardará un seguimiento de una variable
    $errores_usuario = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);

    $err = "&lt;errorentry&gt;\n";
    $err .= "\t&lt;datetime&gt;" . $fh . "&lt;/datetime&gt;\n";
    $err .= "\t&lt;errornum&gt;" . $númerr . "&lt;/errornum&gt;\n";
    $err .= "\t&lt;errortype&gt;" . $tipoerror[$númerr] . "&lt;/errortype&gt;\n";
    $err .= "\t&lt;errormsg&gt;" . $menserr . "&lt;/errormsg&gt;\n";
    $err .= "\t&lt;scriptname&gt;" . $nombrearchivo . "&lt;/scriptname&gt;\n";
    $err .= "\t&lt;scriptlinenum&gt;" . $númlínea . "&lt;/scriptlinenum&gt;\n";

    if (in_array($númerr, $errores_usuario)) {
        $err .= "\t&lt;vartrace&gt;" . wddx_serialize_value($vars, "Variables") . "&lt;/vartrace&gt;\n";
    }
    $err .= "&lt;/errorentry&gt;\n\n";

    // para probar
    // echo $err;

    // guardar al registro de errores, y enviarme un e-mail si hay un error crítico de usuario
    error_log($err, 3, "/usr/local/php4/error.log");
    if ($númerr == E_USER_ERROR) {
        mail("phpdev@example.com", "Error Crítico de Usuario", $err);
    }

}

function distancia($vect1, $vect2)
{
    if (!is_array($vect1) || !is_array($vect2)) {
trigger_error("Parámetros incorrectos, se esperaba una matriz", E_USER_ERROR);
return NULL;
}

    if (count($vect1) != count($vect2)) {
        trigger_error("Los vectores necesitan ser del mismo tamaño", E_USER_ERROR);
        return NULL;
    }

    for ($i=0; $i&lt;count($vect1); $i++) {
        $c1 = $vect1[$i]; $c2 = $vect2[$i];
        $d = 0.0;
        if (!is_numeric($c1)) {
            trigger_error("La coordenada $i del vector 1 no es un número, se usará cero",
                            E_USER_WARNING);
            $c1 = 0.0;
        }
        if (!is_numeric($c2)) {
            trigger_error("La coordenada $i del vector 2 no es un número, se usará cero",
                            E_USER_WARNING);
            $c2 = 0.0;
        }
        $d += $c2*$c2 - $c1*$c1;
    }
    return sqrt($d);

}

$gestor_error_antiguo = set_error_handler("gestorErrores");

// constante no definida, genera una advertencia
$t = NO_ESTOY_DEFINIDA;

// definir algunos "vectores"
$a = array(2, 3, "foo");
$b = array(5.5, 4.3, -1.6);
$c = array(1, -3);

// generar un error de usuario
$t1 = distancia($c, $b) . "\n";

// generar otro error de usuario
$t2 = distancia($b, "no soy una matriz") . "\n";

// generar una advertencia
$t3 = distancia($a, $b) . "\n";

?&gt;

# Funciones de Manejo de Errores

# Ver también

    Véase también [syslog()](#function.syslog).

# debug_backtrace

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

debug_backtrace — Genera el contexto de depuración

### Descripción

**debug_backtrace**([int](#language.types.integer) $options = **[DEBUG_BACKTRACE_PROVIDE_OBJECT](#constant.debug-backtrace-provide-object)**, [int](#language.types.integer) $limit = 0): [array](#language.types.array)

**debug_backtrace()** genera un contexto de depuración PHP.

### Parámetros

     options


       Este argumento es una máscara de las siguientes opciones:



        <caption>**Opciones para la función debug_backtrace()**</caption>



           DEBUG_BACKTRACE_PROVIDE_OBJECT

            Si se debe o no poblar el índice "object".




           DEBUG_BACKTRACE_IGNORE_ARGS

            Si se debe o no omitir el índice "args" y por lo tanto todos los argumentos
            de la función/método para ahorrar memoria.







       **Nota**:



         Existen cuatro combinaciones posibles:



          <caption>**Opciones de debug_backtrace()**</caption>



             debug_backtrace()

              Rellena los dos índices




             debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT)



             debug_backtrace(1)



             debug_backtrace(0)

              Omite el índice "object" y rellena el índice "args".




             debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)

              Omite el índice "object" *y* el índice "args".




             debug_backtrace(2)



             debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT|DEBUG_BACKTRACE_IGNORE_ARGS)

              Rellena el índice "object" *y* omite el índice "args".




             debug_backtrace(3)












     limit


       Este argumento puede ser utilizado para limitar
       el número de marcos en la pila devuelta. Por omisión
       (limit=0), la
       función devuelve todos los marcos de la pila.





### Valores devueltos

Devuelve un array de arrays asociativos. Los elementos de retorno posibles son los siguientes:

    <caption>**Elementos posibles de retorno de la función debug_backtrace()**</caption>



       Nombre
       Tipo
       Descripción






       function
       [string](#language.types.string)

        El nombre de la función actual. Ver también
        [__FUNCTION__](#language.constants.magic).




       line
       [int](#language.types.integer)

        El número de línea actual. Ver también
        [__LINE__](#language.constants.magic).




       file
       [string](#language.types.string)

        El nombre del fichero actual. Ver también
        [__FILE__](#language.constants.magic).




       class
       [string](#language.types.string)

        El nombre de la [clase](#language.oop5) actual. Ver también
        [__CLASS__](#language.constants.magic).




       object
       [object](#language.types.object)

        El [objeto](#language.oop5) actual.




       type
       [string](#language.types.string)

        El tipo de clase actual. Si un método es llamado, "-&gt;" es devuelto.
        Si un método estático es llamado, "::" es devuelto. Si una función es llamada,
        nada será devuelto.




       args
       [array](#language.types.array)

        Si dentro de una función, esto lista los argumentos. Si
        en un fichero incluido, esto lista los ficheros incluidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con debug_backtrace()**

&lt;?php
// filename: /tmp/a.php

function a_test($str)
{
echo "\nHi: $str";
var_dump(debug_backtrace());
}

a_test('friend');
?&gt;

&lt;?php
// filename: /tmp/b.php
include_once '/tmp/a.php';
?&gt;

     Resultado de la ejecución de
     /tmp/b.php:

Hi: friend
array(2) {
[0]=&gt;
array(4) {
["file"] =&gt; string(10) "/tmp/a.php"
["line"] =&gt; int(10)
["function"] =&gt; string(6) "a_test"
["args"]=&gt;
array(1) {
[0] =&gt; &amp;string(6) "friend"
}
}
[1]=&gt;
array(4) {
["file"] =&gt; string(10) "/tmp/b.php"
["line"] =&gt; int(2)
["args"] =&gt;
array(1) {
[0] =&gt; string(10) "/tmp/a.php"
}
["function"] =&gt; string(12) "include_once"
}
}

### Ver también

    - [trigger_error()](#function.trigger-error) - Desencadena un error de usuario

    - [debug_print_backtrace()](#function.debug-print-backtrace) - Muestra la pila de ejecución de PHP

# debug_print_backtrace

(PHP 5, PHP 7, PHP 8)

debug_print_backtrace —
Muestra la pila de ejecución de PHP

### Descripción

**debug_print_backtrace**([int](#language.types.integer) $options = 0, [int](#language.types.integer) $limit = 0): [void](language.types.void.html)

**debug_print_backtrace()** muestra la pila de ejecución
de PHP. Muestra las llamadas a funciones, los ficheros incluidos/requeridos por [include](#function.include)/[require](#function.require)
así como las llamadas a [eval()](#function.eval).

### Parámetros

     options


       Este argumento es una máscara de las siguientes opciones:



        <caption>**Opciones para debug_print_backtrace()**</caption>



           DEBUG_BACKTRACE_IGNORE_ARGS

            Si se deben omitir el índice "args" y, por lo tanto, todos los argumentos
            del método/función para preservar la memoria.











     limit


       Este argumento puede ser utilizado para limitar el número de marcos
       de la pila a mostrar. Por omisión (limit=0),
       todos los marcos de la pila serán mostrados.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con debug_print_backtrace()**

&lt;?php
// fichero include.php

function a() {
b();
}

function b() {
c();
}

function c(){
debug_print_backtrace();
}

a();

?&gt;

&lt;?php
// fichero test.php
// Este es el fichero que debe ser ejecutado

include 'include.php';
?&gt;

    Resultado del ejemplo anterior es similar a:

#0 c() called at [/tmp/include.php:10]
#1 b() called at [/tmp/include.php:6]
#2 a() called at [/tmp/include.php:17]
#3 include(/tmp/include.php) called at [/tmp/test.php:3]

### Ver también

    - [debug_backtrace()](#function.debug-backtrace) - Genera el contexto de depuración

# error_clear_last

(PHP 7, PHP 8)

error_clear_last — Elimina el error más reciente

### Descripción

**error_clear_last**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Elimina el error más reciente, haciéndolo irrecuperable con
[error_get_last()](#function.error-get-last).

### Ejemplos

    **Ejemplo #1 Un ejemplo de error_clear_last()**

&lt;?php
var_dump(error_get_last());
error_clear_last();
var_dump(error_get_last());

@$a = $b;

var_dump(error_get_last());
error_clear_last();
var_dump(error_get_last());
?&gt;

    Resultado del ejemplo anterior es similar a:

NULL
NULL
array(4) {
["type"]=&gt;
int(8)
["message"]=&gt;
string(21) "Undefined variable: b"
["file"]=&gt;
string(9) "%s"
["line"]=&gt;
int(6)
}
NULL

### Ver también

    - [Constantes de errores](#errorfunc.constants)

# error_get_last

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

error_get_last — Obtener el último error que ocurrió

### Descripción

**error_get_last**(): [?](#language.types.null)[array](#language.types.array)

Obtiene información sobre el último error que ocurrió.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz asociativa describiendo el último error con las claves "type" (tipo),
"message" (mensaje), "file" (archivo) y "line" (línea). Si el error ha sido causado por una función
interna de PHP, el "message" (mensaje) comienza con su nombre.
Devuelve **[null](#constant.null)** si no ha habido aún un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de error_get_last()**

&lt;?php
echo $a;
print_r(error_get_last());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[type] =&gt; 8
[message] =&gt; Undefined variable: a
[file] =&gt; C:\WWW\index.php
[line] =&gt; 2
)

### Ver también

    - [Constantes de error](#errorfunc.constants)

    - La variable [$php_errormsg](#reserved.variables.phperrormsg)

    - [error_clear_last()](#function.error-clear-last) - Elimina el error más reciente

    - [La directiva display_errors](#ini.display-errors)

    - [La directiva html_errors](#ini.html-errors)

    - [La directiva xmlrpc_errors](#ini.xmlrpc-errors)

# error_log

(PHP 4, PHP 5, PHP 7, PHP 8)

error_log — Envía un mensaje de error al gestor de errores definido

### Descripción

**error_log**(
    [string](#language.types.string) $message,
    [int](#language.types.integer) $message_type = 0,
    [?](#language.types.null)[string](#language.types.string) $destination = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $additional_headers = **[null](#constant.null)**
): [bool](#language.types.boolean)

Envía un mensaje de error al historial de errores
del servidor web o a un fichero.

### Parámetros

     message


       El mensaje de error que debe ser almacenado.






     message_type


       Especifica el destino del mensaje de error.
       Los tipos posibles de mensajes son:







        <caption>**error_log()** tipos de registro</caption>



           0

            message es enviado al historial
            PHP, que se basa en el historial del sistema o un fichero,
            dependiendo de la configuración de [error_log](#ini.error-log). Esta es la opción por omisión.




           1

            message es enviado por email a
            la dirección destination. Este es el único tipo que
            utiliza el cuarto parámetro
            additional_headers.




           2

            Ya no es una opción.




           3

            message es añadido al fichero
            destination. No se añade automáticamente una nueva línea
            (retorno de carro) al final de la cadena
            message.




           4

           message es enviado directamente al gestor de identificación SAPI.











     destination


       El destino. Esto depende del parámetro
       message_type descrito anteriormente.






     additional_headers


       Los encabezados adicionales. Estos son utilizados cuando el parámetro
       message_type está definido a
       1. Este tipo de mensaje utiliza la misma función interna
       que la función [mail()](#function.mail).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si message_type es cero, entonces esta función siempre retorna **[true](#constant.true)**,
independientemente de si el error pudo ser registrado en el registro de eventos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       destination y
       additional_headers
       ahora son nullables.



### Ejemplos

    **Ejemplo #1 Ejemplos con error_log()**

&lt;?php
// Envía una notificación por el historial del servidor web,
// si la conexión a la base de datos es imposible.
if (!Ora_Logon($username, $password)) {
error_log("Base Oracle no disponible !", 0);
}

// Indicar al administrador, por email, que no hay más FOO
if (!($foo = allocate_new_foo())) {
error_log("¡Ay!, No quedan más FOO disponibles !", 1,
"operador@example.com");
}

// Otras maneras de llamar a error_log():
error_log("¡Gran error !", 3, "/var/tmp/mis-errors.log");
?&gt;

### Notas

**Advertencia**

    La función **error_log()** no es segura a nivel binario.
    El parámetro message será truncado por un carácter nulo.

**Sugerencia**

    El parámetro message no debe contener caracteres
    nulos. Tenga en cuenta que el parámetro message puede ser enviado
    hacia un fichero, un correo, syslog, etc. Utilice las funciones apropiadas de
    conversión/escape, [base64_encode()](#function.base64-encode), [rawurlencode()](#function.rawurlencode)
    o [addslashes()](#function.addslashes) antes de llamar a la función **error_log()**.

# error_reporting

(PHP 4, PHP 5, PHP 7, PHP 8)

error_reporting — Establece el nivel de reporte de errores de PHP

### Descripción

**error_reporting**([?](#language.types.null)[int](#language.types.integer) $error_level = **[null](#constant.null)**): [int](#language.types.integer)

**error_reporting()** modifica la directiva
[error_reporting](#ini.error-reporting)
durante la ejecución del script. PHP posee varios niveles de errores,
utilizar esta función configura este nivel durante la duración (de ejecución)
del script. Si el parámetro opcional error_level
no está definido, **error_reporting()** retornará
únicamente el nivel de reporte de errores actual.

### Parámetros

     error_level


       El nuevo nivel [error_reporting](#ini.error-reporting).
       Puede ser un campo de bits o una combinación de constantes.
       El uso de constantes es altamente recomendado para asegurar una
       compatibilidad máxima con las futuras versiones.
       A medida que se crean nuevos niveles de errores, los valores
       evolucionan, por lo que los valores antiguos ya no tienen necesariamente el mismo significado.




       Las constantes que representan los niveles de errores disponibles y la
       significación de estos niveles de errores se describe
       en el manual sobre las
       [constantes predefinidas](#errorfunc.constants).





### Valores devueltos

Retorna el nivel de [error_reporting](#ini.error-reporting),
_before_ de que sea cambiado a error_level

**Nota**:

    El operador de [control de errores](#language.operators.errorcontrol)
    @ modifica el error_level durante la gestión de errores.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       error_level ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con error_reporting()**

&lt;?php

// Desactivar el reporte de errores
error_reporting(0);

// Reportar errores de ejecución de script
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reportar E_NOTICE puede ayudar a mejorar los scripts
// (variables no inicializadas, variables mal escritas..)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Reportar todas las errores excepto E_NOTICE
// Esta es la configuración por omisión de php.ini
error_reporting(E_ALL &amp; ~E_NOTICE);

// Reportar todas las errores PHP
error_reporting(E_ALL);

// Reportar todas las errores PHP
error_reporting(-1);

// Igual que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

?&gt;

### Notas

**Sugerencia**

    Al pasar el valor -1, todas las errores posibles
    serán mostradas, incluso al agregar nuevos niveles y constantes
    en las futuras versiones de PHP. Este comportamiento
    es equivalente a proporcionar la constante **[E_ALL](#constant.e-all)**.

### Ver también

    - La directiva [display_errors](#ini.display-errors)

    - La directiva [html_errors](#ini.html-errors)

    - La directiva [xmlrpc_errors](#ini.xmlrpc-errors)

    - El operador de [control de errores](#language.operators.errorcontrol)

    - [ini_set()](#function.ini-set) - Modifica el valor de una opción de configuración

# get_error_handler

(PHP 8 &gt;= 8.5.0)

get_error_handler — Devuelve la función de manejo de errores definida por el usuario

### Descripción

**get_error_handler**(): [?](#language.types.null)[callable](#language.types.callable)

Devuelve la función de manejo de errores definida por el usuario, si se ha definido alguna.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la función de manejo de errores definida.
Si se utiliza el gestor por defecto, se devuelve **[null](#constant.null)**.

El gestor devuelto es la función de devolución de llamada exacta que se pasó
a [set_error_handler()](#function.set-error-handler) para definirla.

### Ejemplos

**Ejemplo #1 Ejemplo de get_error_handler()**

&lt;?php

$handler = function (int $errno, string $errstr, ?string $errfile, ?int $errline) {
echo "Error: " . $errstr . "\n";
};

var_dump(get_error_handler()); // NULL

set_error_handler($handler);

var_dump(get_error_handler() === $handler); // bool(true)

?&gt;

### Notas

**Sugerencia**

     Anteriormente a PHP 8.5.0, esta funcionalidad puede ser proporcionada por el
     polyfill siguiente:

&lt;?php
if (!function_exists('get_error_handler')) {
function noop_error_handler() {
}
function get_error_handler(): ?callable {
$handler = set_error_handler('noop_error_handler');
restore_error_handler();
return $handler;
}
}
?&gt;

### Ver también

- [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

- [set_error_handler()](#function.set-error-handler) - Especifica una función de usuario como gestor de errores

- [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

- [trigger_error()](#function.trigger-error) - Desencadena un error de usuario

- [constante de nivel de error](#errorfunc.constants)

# get_exception_handler

(PHP 8 &gt;= 8.5.0)

get_exception_handler — Devuelve la función de gestión de excepciones definida por el usuario

### Descripción

**get_exception_handler**(): [?](#language.types.null)[callable](#language.types.callable)

Devuelve la función de gestión de excepciones definida por el usuario, si se ha definido alguna.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la función de gestión de excepciones definida.
Si no se ha definido ninguna, se devuelve **[null](#constant.null)**.

El gestor devuelto es la función de devolución de llamada exacta que se pasó
a [set_exception_handler()](#function.set-exception-handler) para definirla.

### Ejemplos

**Ejemplo #1 Ejemplo de get_exception_handler()**

&lt;?php

$handler = function (Throwable $ex) {
echo "Exception: " . $ex::class . ": " . $ex-&gt;getMessage() . "\n";
};

var_dump(get_exception_handler()); // NULL

set_exception_handler($handler);

var_dump(get_exception_handler() === $handler); // bool(true)

?&gt;

### Notas

**Sugerencia**

    Antes de PHP 8.5.0, esta funcionalidad podía ser proporcionada por el
    siguiente polyfill:

&lt;?php
if (!function_exists('get_exception_handler')) {
function noop_exception_handler() {
}
function get_exception_handler(): ?callable {
$handler = set_exception_handler('noop_exception_handler');
restore_exception_handler();
return $handler;
}
}
?&gt;

### Ver también

- [set_exception_handler()](#function.set-exception-handler) - Define una función de usuario para gestionar excepciones

- [restore_exception_handler()](#function.restore-exception-handler) - Reactiva la antigua función de gestión de excepciones

- [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

- [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

- [Excepciones](#language.exceptions)

# restore_error_handler

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

restore_error_handler — Restaura la función anterior de manejo de errores

### Descripción

**restore_error_handler**(): [true](#language.types.singleton)

Utilizada después de modificar la función de manejo de errores,
gracias a [set_error_handler()](#function.set-error-handler),
**restore_error_handler()** permite reutilizar
la versión anterior de manejo de errores (que puede ser la
función PHP por defecto, o alguna otra función del usuario).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con restore_error_handler()**



     Si [unserialize()](#function.unserialize) causa un error, entonces el manejador
     de errores original es restaurado.

&lt;?php
function unserialize_handler($errno, $errstr)
{
echo "Valor incorrectamente serializado.\n";
}

$serialized = 'foo';
set_error_handler('unserialize_handler');
$original = unserialize($serialized);
restore_error_handler();
?&gt;

    El ejemplo anterior mostrará:

Valor incorrectamente serializado.

### Ver también

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

    - [set_error_handler()](#function.set-error-handler) - Especifica una función de usuario como gestor de errores

    - [get_error_handler()](#function.get-error-handler) - Devuelve la función de manejo de errores definida por el usuario

    - [restore_exception_handler()](#function.restore-exception-handler) - Reactiva la antigua función de gestión de excepciones

    - [trigger_error()](#function.trigger-error) - Desencadena un error de usuario

# restore_exception_handler

(PHP 5, PHP 7, PHP 8)

restore_exception_handler —
Reactiva la antigua función de gestión de excepciones

### Descripción

**restore_exception_handler**(): [true](#language.types.singleton)

**restore_exception_handler()** se utiliza, después del cambio
de la función de gestión de excepciones con la función
[set_exception_handler()](#function.set-exception-handler), para volver al antiguo
gestor de excepciones (que puede ser la función interna o una función
definida por el usuario).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con restore_exception_handler()**

&lt;?php
function exception_handler_1(Exception $e)
{
echo '[' . __FUNCTION__ . '] ' . $e-&gt;getMessage();
}

    function exception_handler_2(Exception $e)
    {
        echo '[' . __FUNCTION__ . '] ' . $e-&gt;getMessage();
    }

    set_exception_handler('exception_handler_1');
    set_exception_handler('exception_handler_2');

    restore_exception_handler();

    throw new Exception('Esto utiliza el primer gestor de excepciones...');

?&gt;

    El ejemplo anterior mostrará:

[exception_handler_1] Esto utiliza el primer gestor de excepciones...

### Ver también

    - [set_exception_handler()](#function.set-exception-handler) - Define una función de usuario para gestionar excepciones

    - [get_exception_handler()](#function.get-exception-handler) - Devuelve la función de gestión de excepciones definida por el usuario

    - [set_error_handler()](#function.set-error-handler) - Especifica una función de usuario como gestor de errores

    - [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

# set_error_handler

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

set_error_handler — Especifica una función de usuario como gestor de errores

### Descripción

**set_error_handler**([?](#language.types.null)[callable](#language.types.callable) $callback, [int](#language.types.integer) $error_levels = **[E_ALL](#constant.e-all)**): [?](#language.types.null)[callable](#language.types.callable)

**set_error_handler()** selecciona la función de usuario
callback para gestionar errores en un script.

Esta función puede ser utilizada para definir gestores de errores personalizados durante la ejecución,
por ejemplo en aplicaciones que necesitan limpiar archivos/datos cuando ocurre un error crítico
o cuando un error es generado en respuesta a ciertas condiciones
(utilizando la función [trigger_error()](#function.trigger-error)).

Debe recordarse que la función estándar de tratamiento de errores
de PHP es completamente ignorada para los errores de tipos
especificados por error_levels a menos que la función de retorno devuelva **[false](#constant.false)**.
Los parámetros de la función [error_reporting()](#function.error-reporting) no tendrán efecto
y el gestor de errores será llamado en cualquier caso. Sin embargo, siempre es posible
leer el valor actual de la configuración de
[error_reporting](#ini.error-reporting) y
hacer que la función de gestión de errores reaccione en consecuencia.

También debe notarse que es responsabilidad del gestor de errores detener
la ejecución del script si es necesario llamando a la función [exit()](#function.exit). Si la función del gestor de errores devuelve,
la ejecución del script continuará con la instrucción siguiente a la que causó el error.

Los siguientes tipos de errores no pueden ser gestionados con esta función:
**[E_ERROR](#constant.e-error)**, **[E_PARSE](#constant.e-parse)**,
**[E_CORE_ERROR](#constant.e-core-error)**, **[E_CORE_WARNING](#constant.e-core-warning)**,
**[E_COMPILE_ERROR](#constant.e-compile-error)**,
**[E_COMPILE_WARNING](#constant.e-compile-warning)** independientemente de dónde sean generados,
así como la mayoría de los
**[E_STRICT](#constant.e-strict)** del archivo en el cual
**set_error_handler()** es llamado.

Si un error ocurre antes de que el script sea ejecutado (por ejemplo
una descarga de archivo), el gestor de errores personalizado no podrá
ser llamado, ya que aún no está registrado.

### Parámetros

     callback


       Si **[null](#constant.null)** es proporcionado, el gestor es reestablecido a su estado por defecto.
       De lo contrario, el gestor es una función de retorno con la siguiente firma:







        handler(

    [int](#language.types.integer) $errno,
    [string](#language.types.string) $errstr,
    [string](#language.types.string) $errfile = ?,
    [int](#language.types.integer) $errline = ?,
    [array](#language.types.array) $errcontext = ?
): [bool](#language.types.boolean)

         errno


           El primer parámetro errno, será pasado el
           nivel de error, en forma de entero.




         errstr


           El segundo parámetro errstr, será pasado el
           mensaje de error, en forma de string.




         errfile


           Si el cierre acepta un tercer parámetro, errfile,
           será pasado el nombre del archivo en el cual el error fue identificado, en forma de string.




         errline


           Si el cierre acepta un cuarto parámetro, errline,
           será pasado el número de línea en la cual el error fue identificado, en forma de entero.




         errcontext


           Si el cierre acepta un quinto parámetro, errcontext,
           será pasado como un array que apunta a la tabla de símbolos activos en
           el momento en que el error ocurrió. En otras palabras, errcontext
           contiene un array con todas las variables que existían cuando
           el error fue generado.
           Los gestores de errores de usuario no deben modificar el contexto de error.

          **Advertencia**

            Este parámetro es *OBSOLETO* a partir de PHP 7.2.0,
            y *ELIMINADO* a partir de PHP 8.0.0. Si la
            función definida este parámetro sin valor por defecto, un error de
            "too few arguments" será generado al llamarla.









       Si la función devuelve **[false](#constant.false)**, entonces el gestor de errores normal continúa.






     error_levels


       Sirve como máscara para llamar a la función
       callback de la misma forma que la opción de
       configuración [error_reporting](#ini.error-reporting)
       controla los errores que son mostrados. Sin la máscara,
       callback será llamado para todos los errores,
       independientemente del valor de
       [error_reporting](#ini.error-reporting).





### Valores devueltos

Devuelve el último gestor de errores (si existe) en forma de [callable](#language.types.callable).
Si el gestor de errores interno es utilizado, **[null](#constant.null)** es devuelto.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        errcontext ha sido eliminado, y ya no será pasado a los cierres de usuario.




       7.2.0

        errcontext se ha vuelto obsoleto.
        El uso de este parámetro emite una notificación **[E_DEPRECATED](#constant.e-deprecated)**.





### Ejemplos

    **Ejemplo #1 Gestor de errores con set_error_handler()** y
     [trigger_error()](#function.trigger-error)



     El ejemplo siguiente ilustra la intercepción de errores internos con
     generación de error y su explotación en una función de usuario:

&lt;?php
// Gestor de errores
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
if (!(error_reporting() &amp; $errno)) {
// Este código de error no está incluido en error_reporting(), por lo tanto continúa
// hasta el gestor de errores estándar de PHP
return false;
}

    // $errstr debe ser posiblemente escapado:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
    case E_USER_ERROR:
        echo "&lt;b&gt;MI ERROR&lt;/b&gt; [$errno] $errstr&lt;br /&gt;\n";
        echo "  Error fatal en la línea $errline en el archivo $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")&lt;br /&gt;\n";
        echo "Detención...&lt;br /&gt;\n";
        exit(1);

    case E_USER_WARNING:
        echo "&lt;b&gt;MI ALERTA&lt;/b&gt; [$errno] $errstr&lt;br /&gt;\n";
        break;

    case E_USER_NOTICE:
        echo "&lt;b&gt;MI AVISO&lt;/b&gt; [$errno] $errstr&lt;br /&gt;\n";
        break;

    default:
        echo "Tipo de error desconocido: [$errno] $errstr&lt;br /&gt;\n";
        break;
    }

    /* No ejecutar el gestor interno de PHP */
    return true;

}

// Función para probar la gestión de error
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale &lt;= 0) {
trigger_error("log(x) para x &lt;= 0 es indefinido, usted usó: scale = $scale", E_USER_ERROR);
}

    if (!is_array($vect)) {
        trigger_error("Tipo de entrada incorrecto, se esperaba un array de valores", E_USER_WARNING);
        return null;
    }

    $temp = array();
    foreach($vect as $pos =&gt; $value) {
        if (!is_numeric($value)) {
            trigger_error("El valor en la posición $pos no es un número, se utiliza 0 (cero)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }
    return $temp;

}

// Configuración del gestor de errores
$old_error_handler = set_error_handler("myErrorHandler");

// Generación de algunos errores. Comencemos creando un array
echo "vector a\n";
$a = array(2, 3, "foo", 5.5, 43.3, 21.11);
print_r($a);

// Generemos ahora un segundo array
echo "----\nvector b - un aviso (b = log(PI) _ a)\n";
/_ Valor en la posición $pos no es un número, se utiliza 0 (cero) */
$b = scale_by_log($a, M_PI);
print_r($b);

// Esto es un problema, hemos utilizado una cadena en lugar de un array
echo "----\nvector c - una advertencia\n";
/_ Tipo de entrada incorrecto, se esperaba un array de valores _/
$c = scale_by_log("no un array", 2.3);
var_dump($c); // NULL

// Esto es un error crítico: el logaritmo de cero o de un número negativo es indefinido
echo "----\nvector d - error fatal\n";
/_ log(x) para x &lt;= 0 es indefinido, usted usó: scale = $scale" _/
$d = scale_by_log($a, -2.5);
var_dump($d); // Nunca alcanzado
?&gt;

    Resultado del ejemplo anterior es similar a:

vector a
Array
(
[0] =&gt; 2
[1] =&gt; 3
[2] =&gt; foo
[3] =&gt; 5.5
[4] =&gt; 43.3
[5] =&gt; 21.11
)

---

vector b - un aviso (b = log(PI) \* a)
&lt;b&gt;MI AVISO&lt;/b&gt; [1024] El valor en la posición 2 no es un número, se utiliza 0 (cero)&lt;br /&gt;
Array
(
[0] =&gt; 2.2894597716988
[1] =&gt; 3.4341896575482
[2] =&gt; 0
[3] =&gt; 6.2960143721717
[4] =&gt; 49.566804057279
[5] =&gt; 24.165247890281
)

---

vector c - una advertencia
&lt;b&gt;MI ALERTA&lt;/b&gt; [512] Entrada incorrecta, se esperaba un array de valores&lt;br /&gt;
NULL

---

vector d - error fatal
&lt;b&gt;MI ERROR&lt;/b&gt; [256] log(x) para x &lt;= 0 es indefinido, usted usó: scale = -2.5&lt;br /&gt;
Error fatal en la línea 36 en el archivo trigger_error.php, PHP 4.0.2 (Linux)&lt;br /&gt;
Abandono...&lt;br /&gt;

### Ver también

    - [ErrorException](#class.errorexception)

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

    - [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

    - [get_error_handler()](#function.get-error-handler) - Devuelve la función de manejo de errores definida por el usuario

    - [trigger_error()](#function.trigger-error) - Desencadena un error de usuario

    - [Constantes de nivel de error](#errorfunc.constants)

# set_exception_handler

(PHP 5, PHP 7, PHP 8)

set_exception_handler —
Define una función de usuario para gestionar excepciones

### Descripción

**set_exception_handler**([?](#language.types.null)[callable](#language.types.callable) $callback): [?](#language.types.null)[callable](#language.types.callable)

**set_exception_handler()** define el manejador de excepciones
por defecto si una excepción no es capturada con un bloque
de prueba/atrapa. La ejecución se detendrá después de la llamada a la
función callback.

### Parámetros

     callback


       La función a llamar cuando ocurre una excepción no capturada.
       Esta función de gestión debe aceptar un argumento,
       que será el objeto [Throwable](#class.throwable) que fue lanzado.
       Las clases [Error](#class.error) y [Exception](#class.exception)
       implementan la interfaz [Throwable](#class.throwable).
       Esta es la firma del manejador:







        handler([Throwable](#class.throwable) $ex): [void](language.types.void.html)



       **[null](#constant.null)** puede ser pasado en su lugar, para re-initializar este manejador
       a su estado inicial.





### Valores devueltos

Retorna el manejador previamente definido o **[null](#constant.null)** en caso de error.
Si ningún manejador fue previamente definido, **[null](#constant.null)** es también
retornado.

### Ejemplos

    **Ejemplo #1 Ejemplo con set_exception_handler()**

&lt;?php
function exception_handler(Throwable $exception) {
echo "Excepción no capturada: " , $exception-&gt;getMessage(), "\n";
}

set_exception_handler('exception_handler');

throw new Exception('Excepción no capturada');
echo "No ejecutado\n";
?&gt;

### Ver también

    - [get_exception_handler()](#function.get-exception-handler) - Devuelve la función de gestión de excepciones definida por el usuario

    - [restore_exception_handler()](#function.restore-exception-handler) - Reactiva la antigua función de gestión de excepciones

    - [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

    - Las [excepciones](#language.exceptions)

# trigger_error

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

trigger_error — Desencadena un error de usuario

### Descripción

**trigger_error**([string](#language.types.string) $message, [int](#language.types.integer) $error_level = **[E_USER_NOTICE](#constant.e-user-notice)**): [true](#language.types.singleton)

**trigger_error()** se utiliza para desencadenar
un error de usuario. También puede ser utilizada en
conjunción con un manejador de errores interno, o un manejador
de errores de usuario que haya sido seleccionado como manejador
de errores con [set_error_handler()](#function.set-error-handler).

**trigger_error()** es práctico cuando se debe
generar una respuesta particular durante
la ejecución.

### Parámetros

     message


       El mensaje de error designado para este error. Está limitado en longitud a 1024
       bytes. Todos los caracteres después de los 1024 bytes serán ignorados.






     error_level


       El tipo de error designado para este error. Solo funciona con
       la familia de constantes **[E_USER_*](#constant.e-user-error)**
       y será por omisión **[E_USER_NOTICE](#constant.e-user-notice)**.



      **Advertencia**

        Pasar **[E_USER_ERROR](#constant.e-user-error)** como
        error_level está ahora deprecado.
        Lance una [Exception](#class.exception) o
        llame a [exit()](#function.exit) en su lugar.






### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Esta función lanza una [ValueError](#class.valueerror) si el
error_level no es uno de los
**[E_USER_ERROR](#constant.e-user-error)**, **[E_USER_WARNING](#constant.e-user-warning)**,
**[E_USER_NOTICE](#constant.e-user-notice)**, **[E_USER_DEPRECATED](#constant.e-user-deprecated)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Pasar **[E_USER_ERROR](#constant.e-user-error)** como
       error_level está ahora deprecado.
       Lance una [Exception](#class.exception) o
       llame a [exit()](#function.exit) en su lugar.




      8.4.0

       La función tiene ahora un tipo de retorno [true](#language.types.singleton)
       en lugar de [bool](#language.types.boolean).




      8.0.0

       La función lanza ahora una [ValueError](#class.valueerror) si se especifica un
       error_level inválido. Anteriormente, devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con trigger_error()**



     Ver [set_error_handler()](#function.set-error-handler) para un ejemplo más sustancial.

&lt;?php
$password = $_POST['password'] ?? '';
if ($password === '') {
trigger_error("Usar una contraseña vacía no es seguro", E_USER_WARNING);
}
$hash = password_hash($password, PASSWORD_DEFAULT);
?&gt;

### Notas

**Advertencia**

    Las entidades HTML contenidas en el parámetro message
    no son escapadas. Utilice la función [htmlentities()](#function.htmlentities)
    en el mensaje si el error debe ser mostrado en un navegador.

### Ver también

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

    - [set_error_handler()](#function.set-error-handler) - Especifica una función de usuario como gestor de errores

    - [restore_error_handler()](#function.restore-error-handler) - Restaura la función anterior de manejo de errores

    - Las [constantes de nivel de error](#errorfunc.constants)

    - El atributo [Deprecated](#class.deprecated)

# user_error

(PHP 4, PHP 5, PHP 7, PHP 8)

user_error — Alias de [trigger_error()](#function.trigger-error)

### Descripción

Esta función es un alias de: [trigger_error()](#function.trigger-error).

## Tabla de contenidos

- [debug_backtrace](#function.debug-backtrace) — Genera el contexto de depuración
- [debug_print_backtrace](#function.debug-print-backtrace) — Muestra la pila de ejecución de PHP
- [error_clear_last](#function.error-clear-last) — Elimina el error más reciente
- [error_get_last](#function.error-get-last) — Obtener el último error que ocurrió
- [error_log](#function.error-log) — Envía un mensaje de error al gestor de errores definido
- [error_reporting](#function.error-reporting) — Establece el nivel de reporte de errores de PHP
- [get_error_handler](#function.get-error-handler) — Devuelve la función de manejo de errores definida por el usuario
- [get_exception_handler](#function.get-exception-handler) — Devuelve la función de gestión de excepciones definida por el usuario
- [restore_error_handler](#function.restore-error-handler) — Restaura la función anterior de manejo de errores
- [restore_exception_handler](#function.restore-exception-handler) — Reactiva la antigua función de gestión de excepciones
- [set_error_handler](#function.set-error-handler) — Especifica una función de usuario como gestor de errores
- [set_exception_handler](#function.set-exception-handler) — Define una función de usuario para gestionar excepciones
- [trigger_error](#function.trigger-error) — Desencadena un error de usuario
- [user_error](#function.user-error) — Alias de trigger_error

- [Introducción](#intro.errorfunc)
- [Instalación/Configuración](#errorfunc.setup)<li>[Configuración en tiempo de ejecución](#errorfunc.configuration)
  </li>- [Constantes predefinidas](#errorfunc.constants)
- [Ejemplos](#errorfunc.examples)
- [Funciones de Manejo de Errores](#ref.errorfunc)<li>[debug_backtrace](#function.debug-backtrace) — Genera el contexto de depuración
- [debug_print_backtrace](#function.debug-print-backtrace) — Muestra la pila de ejecución de PHP
- [error_clear_last](#function.error-clear-last) — Elimina el error más reciente
- [error_get_last](#function.error-get-last) — Obtener el último error que ocurrió
- [error_log](#function.error-log) — Envía un mensaje de error al gestor de errores definido
- [error_reporting](#function.error-reporting) — Establece el nivel de reporte de errores de PHP
- [get_error_handler](#function.get-error-handler) — Devuelve la función de manejo de errores definida por el usuario
- [get_exception_handler](#function.get-exception-handler) — Devuelve la función de gestión de excepciones definida por el usuario
- [restore_error_handler](#function.restore-error-handler) — Restaura la función anterior de manejo de errores
- [restore_exception_handler](#function.restore-exception-handler) — Reactiva la antigua función de gestión de excepciones
- [set_error_handler](#function.set-error-handler) — Especifica una función de usuario como gestor de errores
- [set_exception_handler](#function.set-exception-handler) — Define una función de usuario para gestionar excepciones
- [trigger_error](#function.trigger-error) — Desencadena un error de usuario
- [user_error](#function.user-error) — Alias de trigger_error
  </li>
