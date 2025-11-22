# Ejecución de programas del sistema

# Introducción

Estas funciones proveen medios para ejecutar comandos
en el sistema en sí, y medios para hacer seguros estos comandos.

**Nota**:

    Todas las funciones de ejecución llaman a los comandos a través de
    cmd.exe bajo Windows. Por lo tanto, el usuario que llame a estas
    funciones necesita los privilegios apropiados para ejecutar este comando. La única
    excepción es [proc_open()](#function.proc-open) con la opción
    bypass_shell.

# Instalación/Configuración

## Tabla de contenidos

- [Tipos de recursos](#exec.resources)

    ## Tipos de recursos

    Esta extensión define un recurso process,
    devuelto por la función [proc_open()](#function.proc-open).

    # Funciones de ejecución de programas

    ## Notas

    **Advertencia**

        Los archivos abiertos con seguridad (especialmente sesiones abiertas) deben ser
        cerrados antes de ejecutar un programa en segundo plano.

    ## Ver también

    Estas funciones están también estrechamente relacionadas con el
    [operador de comillas invertidas](#language.operators.execution).

    # escapeshellarg

    (PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

escapeshellarg — Protege una cadena de caracteres para su uso en línea de comandos

### Descripción

**escapeshellarg**([string](#language.types.string) $arg): [string](#language.types.string)

**escapeshellarg()** añade comillas simples
alrededor de las cadenas de caracteres, y añade
comillas y escapa las comillas simples de la
cadena. Esto permite pasar directamente el argumento
arg como argumento Shell, garantizando
un máximo de seguridad. **escapeshellarg()**
debe ser utilizada para tratar individualmente cada uno de los argumentos
a pasar al Shell. Las funciones Shell son [exec()](#function.exec),
[system()](#function.system) y los operadores
[backtick operator](#language.operators.execution).

En Windows, **escapeshellarg()** reemplaza en su lugar los
signos de porcentaje, los signos de exclamación (sustitución de variables
diferidas) y las comillas dobles con espacios y añade comillas dobles alrededor de la cadena.
Además, cada serie de barras invertidas consecutivas (\)
es escapada por una barra invertida adicional.

### Parámetros

     arg


       El argumento a escapar.





### Valores devueltos

La cadena escapada.

### Ejemplos

    **Ejemplo #1 Ejemplo con escapeshellarg()**

&lt;?php
system('ls '.escapeshellarg($dir));
?&gt;

### Ver también

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [system()](#function.system) - Ejecutar un programa externo y mostrar su salida

    - [backtick operator](#language.operators.execution)

# escapeshellcmd

(PHP 4, PHP 5, PHP 7, PHP 8)

escapeshellcmd — Protege los caracteres especiales del Shell

### Descripción

**escapeshellcmd**([string](#language.types.string) $command): [string](#language.types.string)

**escapeshellcmd()** escapa todos los
caracteres de la cadena command
que podrían tener un significado especial en una
orden Shell. Esta función permite asegurarse de que la orden será
correctamente pasada al ejecutor de órdenes Shell
[exec()](#function.exec) y [system()](#function.system), o incluso
a [comillas invertidas](#language.operators.execution).

Los siguientes caracteres serán escapados:
&amp;#;`|\*?~&lt;&gt;^()[]{}$\, \x0A
y \xFF. ' y "
son escapados solo si no están en pares. En Windows, todos estos caracteres
así como % y ! son precedidos por
un circunflejo (^).

### Parámetros

     command


       La orden a escapar.





### Valores devueltos

La cadena escapada.

### Ejemplos

    **Ejemplo #1 Ejemplo con escapeshellcmd()**

&lt;?php
// Se permiten intencionalmente un número arbitrario de argumentos aquí.
$command = './configure '.$\_POST['configure_options'];

$escaped_command = escapeshellcmd($command);

system($escaped_command);
?&gt;

### Notas

**Advertencia**

     La función **escapeshellcmd()** debe ser utilizada
     sobre toda la cadena de orden, y permite
     a personas malintencionadas pasar un número arbitrario
     de argumentos. Para escapar un solo argumento,
     la función [escapeshellarg()](#function.escapeshellarg) debería ser
     utilizada en su lugar.

**Advertencia**

    Los espacios no son escapados por **escapeshellcmd()**
    lo cual puede ser problemático en Windows con rutas como:
    C:\Program Files\ProgramName\program.exe.
    Esto puede ser mitigado utilizando el siguiente fragmento de código:

&lt;?php
$cmd = preg_replace('`(?&lt;!^) `', '^ ', escapeshellcmd($cmd));

### Ver también

    - [escapeshellarg()](#function.escapeshellarg) - Protege una cadena de caracteres para su uso en línea de comandos

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [system()](#function.system) - Ejecutar un programa externo y mostrar su salida

    - [las comillas invertidas](#language.operators.execution)

# exec

(PHP 4, PHP 5, PHP 7, PHP 8)

exec — Ejecuta un programa externo

### Descripción

**exec**([string](#language.types.string) $command, [array](#language.types.array) &amp;$output = **[null](#constant.null)**, [int](#language.types.integer) &amp;$result_code = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**exec()** ejecuta el comando command.

### Parámetros

     command


       El comando a ejecutar.






     output


       Si el argumento output está presente,
       entonces este array será rellenado por las líneas devueltas por
       el comando. Los espacios al inicio y al final de la cadena, como
       \n, no serán incluidos en este array.
       Cabe señalar que si este array contiene
       elementos, **exec()** añadirá
       las nuevas líneas al final del array. Si no se desean
       concatenar los nuevos elementos, utilice la función
       [unset()](#function.unset) con este array antes
       de pasárselo a **exec()**.






     result_code


       Si el argumento result_code está presente
       además del array output, entonces el estado
       de retorno de ejecución será escrito en esta variable.





### Valores devueltos

La última línea del resultado del comando. Para ejecutar un comando
y obtener el resultado sin ningún tratamiento, debe utilizarse la
función [passthru()](#function.passthru).

Devuelve **[false](#constant.false)** en caso de error.

Para recuperar la salida del comando ejecutado, asegúrese de definir
y utilizar el parámetro output.

### Errores/Excepciones

Emite una advertencia **[E_WARNING](#constant.e-warning)** si **exec()** no puede
ejecutar el comando command.

Levanta una excepción [ValueError](#class.valueerror) si command
está vacío o contiene bytes nulos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si command está vacío o contiene bytes nulos,
       **exec()** levanta ahora una excepción [ValueError](#class.valueerror).
       Anteriormente, se emitía una advertencia **[E_WARNING](#constant.e-warning)** y se devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con exec()**

&lt;?php
// Muestra el nombre de usuario que ejecuta el proceso php/http
// (en un sistema que tenga "whoami" en el camino de ejecutables)
$output=null;
$retval=null;
exec('whoami', $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
?&gt;

    Resultado del ejemplo anterior es similar a:

Returned with status 0 and output:
Array
(
[0] =&gt; cmb
)

### Notas

**Advertencia**
Si los datos provenientes de los usuarios tienen permiso de ser pasados a esta función, utilice
[escapeshellarg()](#function.escapeshellarg) o [escapeshellcmd()](#function.escapeshellcmd) para asegurarse de que los usuarios
no puedan hacer que el sistema ejecute comandos arbitrarios.

**Nota**:

Si un programa es iniciado con esta función
y se ejecuta en segundo plano, la salida del programa debe
ser redirigida a un archivo, o a otro flujo de salida. De lo contrario,
PHP se bloqueará hasta el final de la ejecución del programa.

**Nota**:

En Windows **exec()**
iniciará primero cmd.exe para ejecutar el comando. Si se desea iniciar un programa externo sin ejecutar cmd.exe
utilice [proc_open()](#function.proc-open) definiendo la opción bypass_shell.

### Ver también

    - [system()](#function.system) - Ejecutar un programa externo y mostrar su salida

    - [passthru()](#function.passthru) - Ejecuta un programa externo y muestra el resultado sin procesar

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

    - [pcntl_exec()](#function.pcntl-exec) - Ejecuta el programa indicado en el espacio actual de procesos

    - [los guiones bajos](#language.operators.execution)

# passthru

(PHP 4, PHP 5, PHP 7, PHP 8)

passthru — Ejecuta un programa externo y muestra el resultado sin procesar

### Descripción

**passthru**([string](#language.types.string) $command, [int](#language.types.integer) &amp;$result_code = **[null](#constant.null)**): [?](#language.types.null)[false](#language.types.singleton)

**passthru()** es similar a la función
[exec()](#function.exec) ya que ambas ejecutan el comando
command. Si el argumento
result_code está presente,
el código de estado de respuesta UNIX será colocado allí. Esta función
debe preferirse a las funciones [exec()](#function.exec)
o [system()](#function.system) cuando el resultado esperado es de tipo
binario y debe pasarse sin procesar a un navegador.
Un uso clásico de esta función es la ejecución
de la utilidad pbmplus que puede devolver una imagen. Al establecer el tipo de contenido (Content-Type) a image/gif
y luego llamar a pbmplus para obtener una imagen gif, se pueden crear scripts PHP que devuelven imágenes.

### Parámetros

     command


       El comando a ejecutar.






     result_code


       Si el argumento result_code está
       presente, el estado devuelto por el comando Unix será colocado
       en esta variable.





### Valores devueltos

Esta función retorna **[null](#constant.null)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia **[E_WARNING](#constant.e-warning)** si **passthru()** no puede
ejecutar el comando command.

Genera una excepción [ValueError](#class.valueerror) si command
está vacío o contiene caracteres nulos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Si command está vacío o contiene caracteres nulos,
       **passthru()** ahora genera una excepción [ValueError](#class.valueerror).
       Anteriormente, se emitía una advertencia **[E_WARNING](#constant.e-warning)** y se devolvía **[false](#constant.false)**.



### Notas

**Advertencia**
Si los datos provenientes de los usuarios tienen permiso de ser pasados a esta función, utilice
[escapeshellarg()](#function.escapeshellarg) o [escapeshellcmd()](#function.escapeshellcmd) para asegurarse de que los usuarios
no puedan hacer que el sistema ejecute comandos arbitrarios.

**Nota**:

Si un programa es iniciado con esta función
y se ejecuta en segundo plano, la salida del programa debe
ser redirigida a un archivo, o a otro flujo de salida. De lo contrario,
PHP se bloqueará hasta el final de la ejecución del programa.

### Ver también

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [system()](#function.system) - Ejecutar un programa externo y mostrar su salida

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

    - [los guiones bajos](#language.operators.execution)

# proc_close

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

proc_close —
Cierra un proceso abierto por [proc_open()](#function.proc-open)

### Descripción

**proc_close**([resource](#language.types.resource) $process): [int](#language.types.integer)

**proc_close()** es similar a [pclose()](#function.pclose)
excepto que funciona con los procesos abiertos por
[proc_open()](#function.proc-open).
**proc_close()** espera a que el proceso
process termine, luego devuelve su código de salida.
Los pipes abiertos con este proceso son cerrados cuando esta función es
llamada para evitar bloqueos: el proceso puede no poder salir mientras los pipes estén abiertos.

### Parámetros

     process


       El [resource](#language.types.resource) [proc_open()](#function.proc-open)
       a cerrar





### Valores devueltos

Devuelve el código de salida del proceso o -1 en caso de error.

**Nota**:

Si PHP ha sido compilado con la opción de configuración --enable-sigchild,
el valor devuelto de esta función será indefinido.

# proc_get_status

(PHP 5, PHP 7, PHP 8)

proc_get_status —
Lee las informaciones concernientes a un proceso abierto por [proc_open()](#function.proc-open)

### Descripción

**proc_get_status**([resource](#language.types.resource) $process): [array](#language.types.array)

**proc_get_status()** lee los datos concernientes al
proceso process creado con la función
[proc_open()](#function.proc-open).

### Parámetros

     process


       El [resource](#language.types.resource) [proc_open()](#function.proc-open) a evaluar.





### Valores devueltos

Un array que contiene las informaciones recolectadas.
El array retornado contiene los siguientes elementos :

      ElementoTipoDescripción





       command
       [string](#language.types.string)

        El comando pasado a la función [proc_open()](#function.proc-open).




       pid
       [int](#language.types.integer)
       identificador del proceso



       running
       [bool](#language.types.boolean)

        **[true](#constant.true)** si el proceso funciona aún y
        **[false](#constant.false)** si ha terminado.




       signaled
       [bool](#language.types.boolean)

        **[true](#constant.true)** si el proceso hijo ha sido terminado por un señal desconocido.
        Siempre definido a **[false](#constant.false)** bajo Windows.




       stopped
       [bool](#language.types.boolean)

        **[true](#constant.true)** si el proceso hijo ha sido parado por un señal.
        Siempre definido a **[false](#constant.false)** bajo Windows.




       exitcode
       [int](#language.types.integer)

        El código retornado por el proceso (únicamente si el elemento
        running vale **[false](#constant.false)**).
        Antes de PHP 8.3.0, solo la primera llamada de esta función retornaba el verdadero valor, las llamadas siguientes retornaban -1.



      en caché
      [bool](#language.types.boolean)

       A partir de PHP 8.3.0, esto es **[true](#constant.true)** cuando el código de salida está en caché.
       La caché es necesaria para asegurarse de que el código de salida no se pierde durante las llamadas siguientes a las API de procesamiento.




       termsig
       [int](#language.types.integer)

        el número del señal que ha causado la terminación de la ejecución del proceso hijo
        (únicamente significativo si signaled vale **[true](#constant.true)**).




       stopsig
       [int](#language.types.integer)

        el número del señal que ha causado la parada de la ejecución del proceso hijo
        (únicamente significativo si signaled vale **[true](#constant.true)**).





### Historial de cambios

      Versión
      Descripción






      8.3.0

       La entrada "en caché" ha sido añadida al array retornado.
       Antes de PHP 8.3.0, solo la primera llamada retornaba el verdadero código de salida.
       La entrada "en caché" indica que el código de salida ha sido puesto en caché.



### Ver también

    - [proc_open()](#function.proc-open) - Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas

# proc_nice

(PHP 5, PHP 7, PHP 8)

proc_nice — Modifica la prioridad de ejecución del proceso actual

### Descripción

**proc_nice**([int](#language.types.integer) $priority): [bool](#language.types.boolean)

**proc_nice()** modifica la prioridad del proceso actual
mediante el argumento especificado priority.
Un argumento priority positivo reducirá la
prioridad del proceso actual, mientras que un valor negativo
priority aumentará la prioridad.

**proc_nice()** no está relacionado con
[proc_open()](#function.proc-open) ni con sus funciones asociadas de ninguna manera.

### Parámetros

     priority


       El nuevo valor de prioridad, este valor puede variar según la plataforma.




       En Unix, un valor bajo, como -20 indica una prioridad alta, mientras que un valor positivo indica una prioridad baja.




       Para Windows, el argumento priority tiene las
       siguientes significaciones:







          Clase de prioridad
          Valores posibles






          Prioridad alta

           priority &lt; -9




          Por encima de la prioridad normal

           priority &lt; -4




          Prioridad normal

           priority &lt; 5 &amp;
           priority &gt; -5




          Por debajo de la prioridad normal

           priority &gt; 5




          Prioridad inactiva

           priority &gt; 9









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si ocurre un error, por ejemplo, si el usuario que intenta cambiar la prioridad de un proceso no tiene
suficientes permisos para hacerlo, se genera un error de nivel
**[E_WARNING](#constant.e-warning)** y se devuelve **[false](#constant.false)**.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Esta función está ahora disponible en Windows.





### Ejemplos

    **Ejemplo #1 Uso de proc_nice()** para establecer una prioridad de proceso alta

&lt;?php
// Prioridad más alta
proc_nice(-20);
?&gt;

### Notas

**Nota**:
**Disponibilidad**

    **proc_nice()** solo está disponible en sistemas que
    disponen de capacidades NICE. NICE es compatible con: SVr4, SVID EXT,
    AT&amp;T, X/OPEN, BSD 4.3.

**Nota**:
**Solo Windows**

    **proc_nice()** cambiará la prioridad del *proceso*
    actual incluso si PHP ha sido compilado utilizando la
    seguridad de hilos.

### Ver también

- [pcntl_setpriority()](#function.pcntl-setpriority) - Cambia la prioridad de un proceso

# proc_open

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

proc_open —
Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas

### Descripción

**proc_open**(
    [array](#language.types.array)|[string](#language.types.string) $command,
    [array](#language.types.array) $descriptor_spec,
    [array](#language.types.array) &amp;$pipes,
    [?](#language.types.null)[string](#language.types.string) $cwd = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $env_vars = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

**proc_open()** es similar a [popen()](#function.popen)
pero proporciona un mayor grado de control sobre la ejecución del programa.

### Parámetros

     command


       El comando a ejecutar como [string](#language.types.string). Los caracteres especiales
       deben ser escapados correctamente, y una aplicación correcta de
       las comillas debe ser aplicada.



      **Nota**:

        En *Windows*, a menos que bypass_shell esté definida a **[true](#constant.true)** en
        options, command es
        pasado a **cmd.exe** (en realidad, %ComSpec%)
        con el flag /c como un [string](#language.types.string) *sin
        comillas* (es decir, exactamente como fue proporcionado a
        **proc_open()**). Esto puede causar
        **cmd.exe** para eliminar las comillas que rodean
        command (para más detalles ver la documentación
        de **cmd.exe**), resultando en un comportamiento
        inesperado, y potencialmente peligroso, ya que los mensajes de error de
        **cmd.exe** pueden contener (una parte de) la
        command pasada (ver ejemplo a continuación).





       A partir de PHP 7.4.0, command puede ser pasado como
       un [array](#language.types.array) de argumentos de comandos.
       En este caso el proceso será abierto directamente (sin pasar por un shell) y PHP se encargará de escapar los argumentos necesarios.



      **Nota**:



        En Windows, el escape de los argumentos de los elementos del [array](#language.types.array) asume
        que el procesamiento de la línea de comandos del comando ejecutado es
        compatible con el procesamiento de argumentos de línea de comandos realizado por el runtime VC.







     descriptor_spec


       Un array indexado, donde las claves representan el número de descriptor
       y el valor el método con el cual PHP pasará este descriptor al
       proceso hijo. 0 es stdin, 1 es stdout, y 2 es stderr.




       Cada elemento puede ser:



        -
         Un array que describe el pipe a pasar al proceso. El primer elemento
         es el tipo del descriptor y el segundo es una opción para el tipo dado.
         Los tipos válidos son pipe (el segundo elemento es
         r para pasar el extremo de lectura del pipe al proceso, o
         w para pasar el extremo de escritura) y
         file (el segundo elemento es el nombre de fichero).
         Se debe notar que cualquier otro elemento diferente de w es tratado como r.


        -
         Un recurso de flujo que representa un descriptor de fichero (por ejemplo, un fichero
         abierto, un socket, o bien **[STDIN](#constant.stdin)**).





       Los números de punteros de ficheros no están limitados a 0, 1 y 2 -
       se puede especificar cualquier número de descriptor válido, y
       será pasado al proceso hijo. Esto permitirá que su script interactúe
       con otros scripts, y que sea ejecutado como "co-proceso". En particular,
       es muy práctico para pasar contraseñas a programas como
       PGP, GPG y openssl, con un método muy protegido. También es práctico
       para leer información de estado proporcionada por estos programas, en
       descriptores auxiliares.






     pipes


       Debe ser definido como un array indexado de punteros de ficheros que
       corresponden al extremo de cualquier descriptor PHP que sean
       creados.






     cwd


       El directorio inicial de trabajo del comando. Esto debe ser
       una ruta **absoluta**
       al directorio o **[null](#constant.null)** si se quiere utilizar el valor
       por omisión (el directorio de trabajo del proceso PHP actual)






     env_vars


       Un array que contiene las variables de entorno para el comando
       que debe ser ejecutado, o **[null](#constant.null)** para utilizar el mismo entorno
       que el proceso PHP actual






     options


       Permite especificar opciones adicionales. Las opciones
       actualmente soportadas son:



        -
         suppress_errors (solo Windows): supresión de
         errores generados por esta función cuando está definida a **[true](#constant.true)**


        -
         bypass_shell (solo Windows): omisión del shell
         cmd.exe cuando está definida a **[true](#constant.true)**


        -
         blocking_pipes (solo Windows): fuerza
         los pipes bloqueantes cuando está definida a **[true](#constant.true)**


        -
         create_process_group (solo Windows): permite
         al proceso hijo manejar los eventos CTRL
         cuando está a **[true](#constant.true)**


        -
         create_new_console (solo Windows): el nuevo
         proceso tiene una nueva consola, en lugar de heredar la consola de su
         padre.






### Valores devueltos

Retorna un recurso que representa el proceso, que podrá ser utilizado por
la función [proc_close()](#function.proc-close) cuando ya no sea necesario.
En caso de fallo, **[false](#constant.false)** será retornado.

### Errores/Excepciones

A partir de PHP 8.3.0, se lanza una excepción [ValueError](#class.valueerror) si
command es un array sin al menos un elemento no vacío.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Se lanzará una excepción [ValueError](#class.valueerror) si
        command es un array sin al menos un elemento no vacío.




       7.4.4

        Se añadió la opción create_new_console al parámetro
        options.




       7.4.0

        **proc_open()** ahora acepta un [array](#language.types.array)
        para command.




       7.4.0

        Se añadió la opción create_process_group al parámetro
        options.





### Ejemplos

    **Ejemplo #1 Ejemplo con proc_open()**

&lt;?php
$descriptorspec = array(
0 =&gt; array("pipe", "r"), // stdin es un pipe donde el proceso leerá
1 =&gt; array("pipe", "w"), // stdout es un pipe donde el proceso escribirá
2 =&gt; array("file", "/tmp/error-output.txt", "a") // stderr es un fichero
);

$cwd = '/tmp';
$env = array('some_option' =&gt; 'aeiou');

$process = proc_open('php', $descriptorspec, $pipes, $cwd, $env);

if (is_resource($process)) {
// $pipes se parece a:
// 0 =&gt; fichero accesible en escritura, conectado a la entrada estándar del proceso hijo
// 1 =&gt; fichero accesible en lectura, conectado a la salida estándar del proceso hijo
// Cualquier error será añadido al fichero /tmp/error-output.txt

    fwrite($pipes[0], '&lt;?php print_r($_ENV); ?&gt;');
    fclose($pipes[0]);

    echo stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    // Es importante que cierre los pipes antes de llamar
    // a proc_close para evitar un bloqueo.
    $return_value = proc_close($process);

    echo "El comando retornó $return_value\n";

}
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[some_option] =&gt; aeiou
[PWD] =&gt; /tmp
[SHLVL] =&gt; 1
[_] =&gt; /usr/local/bin/php
)
El comando retornó 0

    **Ejemplo #2 Comportamiento extraño de proc_open()** en Windows



     Aunque se podría esperar que el siguiente programa busque
     el fichero filename.txt para el texto
     search y muestre los resultados,
     se comporta de manera diferente.

&lt;?php
$descriptorspec = [STDIN, STDOUT, STDOUT];
$cmd = '"findstr" "search" "filename.txt"';
$proc = proc_open($cmd, $descriptorspec, $pipes);
proc_close($proc);
?&gt;

    El ejemplo anterior mostrará:

'findstr" "search" "filename.txt' no se reconoce como un comando interno o externo,
programa ejecutable o archivo por lotes.

     Para evitar este comportamiento, generalmente es suficiente rodear
     command con comillas adicionales:

$cmd = '""findstr" "search" "filename.txt""';

### Notas

**Nota**:

    Compatibilidad Windows: los descriptores más allá de 2 (stderr) son
    accesibles al proceso hijo, en forma de punteros heredados, pero
    como la arquitectura Windows no asocia números a los descriptores
    de bajo nivel, el proceso hijo no tiene, actualmente, ningún medio
    para acceder a ellos. Por otro lado, stdin, stdout y stderr funcionan
    como de costumbre.

**Nota**:

    Si solo se necesita un proceso unidireccional,
    [popen()](#function.popen) será más práctico, ya que es más
    sencillo de utilizar.

### Ver también

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [system()](#function.system) - Ejecutar un programa externo y mostrar su salida

    - [passthru()](#function.passthru) - Ejecuta un programa externo y muestra el resultado sin procesar

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

    - [Las comillas invertidas](#language.operators.execution)

# proc_terminate

(PHP 5, PHP 7, PHP 8)

proc_terminate — Mata un proceso abierto mediante proc_open

### Descripción

**proc_terminate**([resource](#language.types.resource) $process, [int](#language.types.integer) $signal = 15): [bool](#language.types.boolean)

Señala un process (creado usando
[proc_open()](#function.proc-open)) que debe terminar.
**proc_terminate()** regresa inmediatamente y espera a la terminación del proceso.

**proc_terminate()**
Permite terminar el proceso y continuar con otras tareas. Puede consultar el estado del proceso (para ver si se ha
detenido) usando la función [proc_get_status()](#function.proc-get-status).

### Parámetros

     process



El recurso de [proc_open()](#function.proc-open) que será cerrado.

     signal



Este parámetro opcional solo es útil en sistemas operativos POSIX; puede especificar una señal para enviar al proceso utilizando la llamada al sistema kill(2). Por defecto es SIGTERM.

### Valores devueltos

Devuelve el estado de terminación del proceso que se ejecutó.

### Ver también

    - [proc_open()](#function.proc-open) - Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas

    - [proc_close()](#function.proc-close) - Cierra un proceso abierto por proc_open

    - [proc_get_status()](#function.proc-get-status) - Lee las informaciones concernientes a un proceso abierto por proc_open

# shell_exec

(PHP 4, PHP 5, PHP 7, PHP 8)

shell_exec —
Ejecuta un comando a través del Shell y devuelve el resultado en forma de string

### Descripción

**shell_exec**([string](#language.types.string) $command): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

**shell_exec()** es idéntico a los
[backticks](#language.operators.execution).

**Nota**:

    En Windows, el tubo subyacente se abre en modo texto lo que puede causar que
    la función falle para salidas binarias. Considerar el uso de
    [popen()](#function.popen) para tales casos.

### Parámetros

     command


       El comando a ejecutar.





### Valores devueltos

Un [string](#language.types.string) que contiene el resultado del comando ejecutado, **[false](#constant.false)** si el
pipe no puede ser establecido, o **[null](#constant.null)** si ocurre un error
o si el comando no produce salida.

**Nota**:

    Esta función puede devolver **[null](#constant.null)** cuando ocurre un error
    pero también cuando el programa no produce salida. No es posible
    detectar fallos de ejecución utilizando esta función. La función
    [exec()](#function.exec) debe ser utilizada cuando se desea recuperar
    el código de salida del programa.

### Errores/Excepciones

Un error de nivel **[E_WARNING](#constant.e-warning)** es generado cuando el
pipe no puede ser establecido.

### Ejemplos

    **Ejemplo #1 Ejemplo con shell_exec()**

&lt;?php
$output = shell_exec('ls -lart');
echo "&lt;pre&gt;$output&lt;/pre&gt;";
?&gt;

### Ver también

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

# system

(PHP 4, PHP 5, PHP 7, PHP 8)

system — Ejecutar un programa externo y mostrar su salida

### Descripción

**system**([string](#language.types.string) $command, [int](#language.types.integer) &amp;$result_code = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

**system()** es similar a la versión C de
la función de mismo nombre, dado que ejecuta el
command dado y muestra el resultado.

La llamada a **system()** también intenta
volcar automáticamente el búfer de salida del
servidor web después de cada línea de salida, si
PHP está corriendo como un módulo de servidor.

Si necesita ejecutar un comando y recibir de vuelta todo los
datos del mismo sin interferencias, use la
función [passthru()](#function.passthru).

### Parámetros

     comando


       El comando que será ejecutado.






     result_code


       Si el argumento result_code se encuentra
       presente, entonces el status devuelto por el comando ejecutado
       será almacenado en esta variable.





### Valores devueltos

Devuelve la última línea de la salida del comando en
caso de tener éxito, y **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de system()**

&lt;?php
echo '&lt;pre&gt;';

// Muestra el resultado completo del comando "ls", y devuelve la
// ultima linea de la salida en $ultima_linea. Almacena el valor de
// retorno del comando en $retval.
$ultima_linea = system('ls', $retval);

// Imprimir informacion adicional
echo '
&lt;/pre&gt;
&lt;hr /&gt;Ultima linea de la salida: ' . $ultima_linea . '
&lt;hr /&gt;Valor de retorno: ' . $retval;
?&gt;

### Notas

**Advertencia**
Si los datos provenientes de los usuarios tienen permiso de ser pasados a esta función, utilice
[escapeshellarg()](#function.escapeshellarg) o [escapeshellcmd()](#function.escapeshellcmd) para asegurarse de que los usuarios
no puedan hacer que el sistema ejecute comandos arbitrarios.

**Nota**:

Si un programa es iniciado con esta función
y se ejecuta en segundo plano, la salida del programa debe
ser redirigida a un archivo, o a otro flujo de salida. De lo contrario,
PHP se bloqueará hasta el final de la ejecución del programa.

### Ver también

    - [exec()](#function.exec) - Ejecuta un programa externo

    - [passthru()](#function.passthru) - Ejecuta un programa externo y muestra el resultado sin procesar

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

    - [escapeshellcmd()](#function.escapeshellcmd) - Protege los caracteres especiales del Shell

    - [pcntl_exec()](#function.pcntl-exec) - Ejecuta el programa indicado en el espacio actual de procesos

    - [el operador
    de comillas invertidas](#language.operators.execution)

## Tabla de contenidos

- [escapeshellarg](#function.escapeshellarg) — Protege una cadena de caracteres para su uso en línea de comandos
- [escapeshellcmd](#function.escapeshellcmd) — Protege los caracteres especiales del Shell
- [exec](#function.exec) — Ejecuta un programa externo
- [passthru](#function.passthru) — Ejecuta un programa externo y muestra el resultado sin procesar
- [proc_close](#function.proc-close) — Cierra un proceso abierto por proc_open
- [proc_get_status](#function.proc-get-status) — Lee las informaciones concernientes a un proceso abierto por proc_open
- [proc_nice](#function.proc-nice) — Modifica la prioridad de ejecución del proceso actual
- [proc_open](#function.proc-open) — Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas
- [proc_terminate](#function.proc-terminate) — Mata un proceso abierto mediante proc_open
- [shell_exec](#function.shell-exec) — Ejecuta un comando a través del Shell y devuelve el resultado en forma de string
- [system](#function.system) — Ejecutar un programa externo y mostrar su salida

- [Introducción](#intro.exec)
- [Instalación/Configuración](#exec.setup)<li>[Tipos de recursos](#exec.resources)
  </li>- [Funciones de ejecución de programas](#ref.exec)<li>[escapeshellarg](#function.escapeshellarg) — Protege una cadena de caracteres para su uso en línea de comandos
- [escapeshellcmd](#function.escapeshellcmd) — Protege los caracteres especiales del Shell
- [exec](#function.exec) — Ejecuta un programa externo
- [passthru](#function.passthru) — Ejecuta un programa externo y muestra el resultado sin procesar
- [proc_close](#function.proc-close) — Cierra un proceso abierto por proc_open
- [proc_get_status](#function.proc-get-status) — Lee las informaciones concernientes a un proceso abierto por proc_open
- [proc_nice](#function.proc-nice) — Modifica la prioridad de ejecución del proceso actual
- [proc_open](#function.proc-open) — Ejecuta un comando y abre los punteros de ficheros para las entradas / salidas
- [proc_terminate](#function.proc-terminate) — Mata un proceso abierto mediante proc_open
- [shell_exec](#function.shell-exec) — Ejecuta un comando a través del Shell y devuelve el resultado en forma de string
- [system](#function.system) — Ejecutar un programa externo y mostrar su salida
  </li>
