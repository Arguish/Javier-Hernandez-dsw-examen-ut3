# GNU Readline

# Introducción

Las funciones readline implementan una interfaz de la biblioteca
GNU readline. Estas funciones proporcionan líneas de comandos editables. Un ejemplo es proporcionado mostrando cómo Bash
permite el uso de las flechas para insertar caracteres o desplazarse por el historial de comandos. Debido a la naturaleza
de esta biblioteca, no se debería necesitar en las aplicaciones Web, pero puede ser muy útil
durante la escritura de scripts utilizados desde la
[línea de comandos](#features.commandline).

A partir de PHP 7.1.0 esta extensión es soportada en Windows.

**Precaución**

    ¡La extensión readline no es thread-safe! Por consiguiente, el uso de esta
    con cualquier SAPI que sea verdaderamente thread-safe (como Apache mod_winnt) está fuertemente desaconsejado.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#readline.requirements)
- [Instalación](#readline.installation)
- [Configuración en tiempo de ejecución](#readline.configuration)

    ## Requerimientos

    Para utilizar las funciones readline, debe instalarse libreadline. Puede
    encontrarse libreadline en la página de inicio del proyecto GNU Readline, en
    [» https://tiswww.case.edu/php/chet/readline/rltop.html](https://tiswww.case.edu/php/chet/readline/rltop.html).
    Es mantenido por Chet Ramey, quien es también el autor de Bash.

    Asimismo, pueden utilizarse estas funciones con la biblioteca libedit, un reemplazo no-GPL
    de la biblioteca readline. La biblioteca libedit está bajo licencia BSD
    y disponible para descarga en
    [» http://www.thrysoee.dk/editline/](http://www.thrysoee.dk/editline/).

## Instalación

Para utilizar estas funciones, es necesario compilar la versión CGI o CLI de PHP
con soporte readline. También es necesario utilizar la opción de compilación
**--with-readline[=DIR]**.
Si se desea utilizar el reemplazo readline de libedit, configure PHP
**--with-libedit[=DIR]**.

En Windows esta extensión está disponible por omisión a partir de PHP 7.1.0.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración Readline**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [cli.pager](#ini.cli.pager)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [cli.prompt](#ini.cli.prompt)
      "\\b \\&gt; "
      **[INI_ALL](#constant.ini-all)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      cli.pager
      [string](#language.types.string)



       Herramienta externa para mostrar la salida de la
       [línea de comandos](#features.commandline).







      cli.prompt
      [string](#language.types.string)



       Véase [Línea de Comandos](#features.commandline).





# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[READLINE_LIB](#constant.readline-lib)**
    ([string](#language.types.string))



     La biblioteca utilizada para el soporte de readline; actualmente sea
     readline o libedit.

# Funciones Readline

# readline

(PHP 4, PHP 5, PHP 7, PHP 8)

readline — Lee una línea

### Descripción

**readline**([?](#language.types.null)[string](#language.types.string) $prompt = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una línea introducida por el usuario.
La línea debe ser añadida al historial manualmente,
mediante la función [readline_add_history()](#function.readline-add-history).

### Parámetros

     prompt


       Puede especificarse un [string](#language.types.string) para utilizarlo como prompt al
       usuario.





### Valores devueltos

Devuelve un [string](#language.types.string) del usuario. La línea devuelta ha sido
limpiada del carácter final de nueva línea.
Si no hay más datos para leer, entonces se devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con readline()**

&lt;?php
// Lee 3 comandos del usuario
for ($i=0; $i &lt; 3; $i++) {
        $line = readline("Comando : ");
        readline_add_history($line);
}

// Lista el historial
print_r(readline_list_history());

// Lista las variables
print_r(readline_info());
?&gt;

# readline_add_history

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_add_history — Se añade una línea al historial

### Descripción

**readline_add_history**([string](#language.types.string) $prompt): [true](#language.types.singleton)

Se añade una línea al historial.

### Parámetros

     prompt


       La línea a añadir al historial.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

# readline_callback_handler_install

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

readline_callback_handler_install — Inicializa la interfaz y el terminal de devolución de llamada de readline, muestra el prompt y retorna inmediatamente

### Descripción

**readline_callback_handler_install**([string](#language.types.string) $prompt, [callable](#language.types.callable) $callback): [true](#language.types.singleton)

Define una interfaz de devolución de llamada para readline, muestra el
prompt y retorna inmediatamente.
Llamar a esta función dos veces sin borrar previamente la interfaz
de devolución de llamada anterior borrará automáticamente
y correctamente la interfaz antigua.

La funcionalidad de devolución de llamada es muy útil cuando se combina
con la función [stream_select()](#function.stream-select) que permite
la interconexión IO / entrada de usuario, a diferencia de
[readline()](#function.readline).

### Parámetros

     prompt


       El mensaje de prompt.






     callback


       La función callback toma
       un argumento: la entrada de usuario retornada.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de interfaz de devolución de llamada de Readline**

&lt;?php
function rl_callback($ret)
{
global $c, $prompting;

    echo "You entered: $ret\n";
    $c++;

    if ($c &gt; 10) {
        $prompting = false;
        readline_callback_handler_remove();
    } else {
        readline_callback_handler_install("[$c] Entrar algo: ", 'rl_callback');
    }

}

$c = 1;
$prompting = true;

readline_callback_handler_install("[$c] Entrar algo: ", 'rl_callback');

while ($prompting) {
    $w = NULL;
    $e = NULL;
    $n = stream_select($r = array(STDIN), $w, $e, null);
    if ($n &amp;&amp; in_array(STDIN, $r)) {
// lee un carácter, llamará a la función de devolución de llamada cuando se ingrese una nueva línea
readline_callback_read_char();
}
}

echo "El prompt está desactivado. Todo ha sido realizado.\n";
?&gt;

### Ver también

    - [readline_callback_handler_remove()](#function.readline-callback-handler-remove) - Elimina un manejador de devolución de llamada readline

    - [readline_callback_read_char()](#function.readline-callback-read-char) - Lee un carácter e informa a la interfaz de devolución de llamada readline

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

# readline_callback_handler_remove

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

readline_callback_handler_remove — Elimina un manejador de devolución de llamada readline

### Descripción

**readline_callback_handler_remove**(): [bool](#language.types.boolean)

Elimina un manejador de devolución de llamada instalado previamente y restaura
los parámetros del terminal.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si un manejador de devolución de llamada previamente instalado ha sido eliminado
o **[false](#constant.false)** si no ha sido encontrado.

### Ejemplos

Consulte la función [readline_callback_handler_install()](#function.readline-callback-handler-install)
para un ejemplo sobre el uso de la interfaz de devolución de llamada readline.

### Ver también

    - [readline_callback_handler_install()](#function.readline-callback-handler-install) - Inicializa la interfaz y el terminal de devolución de llamada de readline, muestra el prompt y retorna inmediatamente

    - [readline_callback_read_char()](#function.readline-callback-read-char) - Lee un carácter e informa a la interfaz de devolución de llamada readline

# readline_callback_read_char

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

readline_callback_read_char — Lee un carácter e informa a la interfaz de devolución de llamada readline

### Descripción

**readline_callback_read_char**(): [void](language.types.void.html)

Lee un carácter de la entrada del usuario. Cuando se recibe una línea, la
función informa a la interfaz de devolución de llamada readline instalada mediante
[readline_callback_handler_install()](#function.readline-callback-handler-install) de que una línea está lista para ser ingresada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

Ver la función [readline_callback_handler_install()](#function.readline-callback-handler-install)
para un ejemplo sobre el uso de la interfaz de devolución de llamada readline.

### Ver también

    - [readline_callback_handler_install()](#function.readline-callback-handler-install) - Inicializa la interfaz y el terminal de devolución de llamada de readline, muestra el prompt y retorna inmediatamente

    - [readline_callback_handler_remove()](#function.readline-callback-handler-remove) - Elimina un manejador de devolución de llamada readline

# readline_clear_history

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_clear_history — Elimina el historial

### Descripción

**readline_clear_history**(): [true](#language.types.singleton)

Elimina el historial.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

# readline_completion_function

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_completion_function — Registra una función de completado

### Descripción

**readline_completion_function**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Registra una nueva función de completado. Es la misma funcionalidad que
cuando se utiliza la tecla de tabulación bajo Bash.

### Parámetros

     callback


       Debe proporcionarse el nombre de una función que acepte un nombre
       parcial de comando, y devuelva una lista de funciones completas
       posibles.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# readline_info

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_info — Lee o modifica diversas variables internas de readline

### Descripción

**readline_info**([?](#language.types.null)[string](#language.types.string) $var_name = **[null](#constant.null)**, [int](#language.types.integer)|[string](#language.types.string)|[bool](#language.types.boolean)|[null](#language.types.null) $value = **[null](#constant.null)**): [mixed](#language.types.mixed)

Lee/modifica diversas variables internas.

### Parámetros

     var_name


       Un nombre de variable.






     value


       Si se proporciona, será el nuevo valor a definir.





### Valores devueltos

Cuando se invoca sin parámetros, **readline_info()**
devuelve un array que contiene los valores de los parámetros de
Readline. Los elementos estarán indexados por las claves siguientes :
"done", "end",
"erase_empty_line", "library_version",
"line_buffer", "mark",
"pending_input", "point",
"prompt", "readline_name" y
"terminal_name".
El [array](#language.types.array) solo contendrá los elementos que sean soportados
por la biblioteca utilizada para construir la extensión readline.

Si se invoca con uno o dos parámetros, se devuelve el valor anterior.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       var_name y value ahora son nullable.



# readline_list_history

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_list_history — Lista el historial

### Descripción

**readline_list_history**(): [array](#language.types.array)

Lista el historial.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con la lista de todas las líneas de
comandos del historial. Los elementos están indexados
numéricamente, a partir de 0.

# readline_on_new_line

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

readline_on_new_line — Indica a readline que el cursor ha pasado a una nueva línea

### Descripción

**readline_on_new_line**(): [void](language.types.void.html)

Indica a readline que el cursor ha pasado a una nueva línea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Notas

**Nota**:

    Esta función solo está disponible si es soportada por la biblioteca readline subyacente. No es soportada en Windows.

# readline_read_history

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_read_history — Lee el historial

### Descripción

**readline_read_history**([?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**): [bool](#language.types.boolean)

Lee una línea del historial desde el fichero filename.

### Parámetros

     filename


       Ruta de acceso al fichero que contiene el historial de comandos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       filename ahora es nullable.



# readline_redisplay

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

readline_redisplay — Solicita a readline que vuelva a mostrar la información

### Descripción

**readline_redisplay**(): [void](language.types.void.html)

Solicita a readline que vuelva a mostrar la información.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# readline_write_history

(PHP 4, PHP 5, PHP 7, PHP 8)

readline_write_history — Escribe en el historial

### Descripción

**readline_write_history**([?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**): [bool](#language.types.boolean)

Escribe el historial en el fichero filename.

### Parámetros

     filename


       Ruta de acceso al fichero a guardar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       filename ahora es nullable.



## Tabla de contenidos

- [readline](#function.readline) — Lee una línea
- [readline_add_history](#function.readline-add-history) — Se añade una línea al historial
- [readline_callback_handler_install](#function.readline-callback-handler-install) — Inicializa la interfaz y el terminal de devolución de llamada de readline, muestra el prompt y retorna inmediatamente
- [readline_callback_handler_remove](#function.readline-callback-handler-remove) — Elimina un manejador de devolución de llamada readline
- [readline_callback_read_char](#function.readline-callback-read-char) — Lee un carácter e informa a la interfaz de devolución de llamada readline
- [readline_clear_history](#function.readline-clear-history) — Elimina el historial
- [readline_completion_function](#function.readline-completion-function) — Registra una función de completado
- [readline_info](#function.readline-info) — Lee o modifica diversas variables internas de readline
- [readline_list_history](#function.readline-list-history) — Lista el historial
- [readline_on_new_line](#function.readline-on-new-line) — Indica a readline que el cursor ha pasado a una nueva línea
- [readline_read_history](#function.readline-read-history) — Lee el historial
- [readline_redisplay](#function.readline-redisplay) — Solicita a readline que vuelva a mostrar la información
- [readline_write_history](#function.readline-write-history) — Escribe en el historial

- [Introducción](#intro.readline)
- [Instalación/Configuración](#readline.setup)<li>[Requerimientos](#readline.requirements)
- [Instalación](#readline.installation)
- [Configuración en tiempo de ejecución](#readline.configuration)
  </li>- [Constantes predefinidas](#readline.constants)
- [Funciones Readline](#ref.readline)<li>[readline](#function.readline) — Lee una línea
- [readline_add_history](#function.readline-add-history) — Se añade una línea al historial
- [readline_callback_handler_install](#function.readline-callback-handler-install) — Inicializa la interfaz y el terminal de devolución de llamada de readline, muestra el prompt y retorna inmediatamente
- [readline_callback_handler_remove](#function.readline-callback-handler-remove) — Elimina un manejador de devolución de llamada readline
- [readline_callback_read_char](#function.readline-callback-read-char) — Lee un carácter e informa a la interfaz de devolución de llamada readline
- [readline_clear_history](#function.readline-clear-history) — Elimina el historial
- [readline_completion_function](#function.readline-completion-function) — Registra una función de completado
- [readline_info](#function.readline-info) — Lee o modifica diversas variables internas de readline
- [readline_list_history](#function.readline-list-history) — Lista el historial
- [readline_on_new_line](#function.readline-on-new-line) — Indica a readline que el cursor ha pasado a una nueva línea
- [readline_read_history](#function.readline-read-history) — Lee el historial
- [readline_redisplay](#function.readline-redisplay) — Solicita a readline que vuelva a mostrar la información
- [readline_write_history](#function.readline-write-history) — Escribe en el historial
  </li>
