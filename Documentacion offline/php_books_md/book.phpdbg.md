# Depurador interactivo PHP

# Introducción

Implementado como un módulo SAPI, phpdbg puede ejercer un control completo sobre el entorno
sin afectar la funcionalidad o el rendimiento del código.

phpdbg tiene como objetivo ser una plataforma de depuración ligera, potente y fácil de usar para PHP.
Ofrece las siguientes funcionalidades:

    -
     Depuración paso a paso


    -
     Punto de interrupción flexible (método de clase, función, archivo:línea, dirección, opcode)


    -
     Acceso fácil a PHP con eval() integrado


    -
     Una API de usuario


    -
     SAPI Agnóstico - Fácilmente integrable


    -
     Soporte de archivo de configuración PHP


    -
     Super Globales JIT - ¡Defina las suyas!!


    -
     Soporte readline opcional - Operación cómoda del terminal


    -
     Operación fácil - Consulte la ayuda :)









    <caption>**Opción de línea de comandos**</caption>



       Opción
       Argumento de ejemplo
       Descripción






       -c
       -c/my/php.ini

        Define el archivo php.ini a cargar




       -d
       -dmemory_limit=4G

        Define una directiva php.ini




       -n
        

        Desactiva el php.ini por defecto




       -q
        

        Suprime el banner de bienvenida




       -v
        

        Activa la salida oplog




       -b
        

        Desactiva el color




       -i
       -imy.init

        Define el archivo .phpdbginit




       -I
        

        Ignora el .phpdbginit por defecto




       -O
       -Omy.oplog

        Define el archivo de salida oplog




       -r
        

        Ejecuta el contexto de ejecución




       -rr
        

        Ejecuta el contexto de ejecución y sale después de la ejecución (sin respetar los puntos de interrupción)




       -e
        

        Genera información extendida para el depurador/profiler




       -E
        

        Activa la evaluación paso a paso con eval, ¡atención!




       -s
       -s=, -s=foo

        Lee el código a ejecutar desde stdin con un delimitador opcional




       -S
       -Scli

        Sobrescribe el nombre SAPI, ¡atención!




        
        









       -l
       -l4000

        Establece el puerto de la consola remota




       -a
       -a192.168.0.3

        Establece la dirección de enlace de la consola remota




       -x
        

        Activa la salida xml (en lugar de la salida de texto normal)




       -p
       -p, -p=func, -p*

        Muestra los opcodes y sale




       -h
        

        Muestra el resumen de ayuda




       -V
        

        Muestra el número de versión




       --
       -- arg1 arg2

        Utilizado para delimitar los argumentos phpdbg y php $argv; añada cualquier argumento $argv después





# Instalación/Configuración

## Tabla de contenidos

- [Configuración en tiempo de ejecución](#phpdbg.configuration)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de phpdbg**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [phpdbg.eol](#ini.phpdbg.eol)
      2
      **[INI_ALL](#constant.ini-all)**
      Eliminada a partir de PHP 8.1.0



      [phpdbg.path](#ini.phpdbg.path)
       
      6
      Eliminada a partir de PHP 8.1.0


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      phpdbg.eol
      [mixed](#language.types.mixed)



       El tipo de fin de línea a utilizar para la salida. Para definir el valor, se debe utilizar uno de los alias de string.






           [int](#language.types.integer) Valor
           [string](#language.types.string) Alias






           0

            CRLF, crlf,
            DOS, dos




           1

            LF, lf,
            UNIX, unix




           2

            CR, cr,
            MAC, mac












      phpdbg.path
      [string](#language.types.string)









# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[PHPDBG_VERSION](#constant.phpdbg-version)**
     ([string](#language.types.string))








     **[PHPDBG_FILE](#constant.phpdbg-file)**
     ([int](#language.types.integer))



      Eliminado desde PHP 7.3.0.





     **[PHPDBG_METHOD](#constant.phpdbg-method)**
     ([int](#language.types.integer))



      Eliminado desde PHP 7.3.0.





     **[PHPDBG_LINENO](#constant.phpdbg-lineno)**
     ([int](#language.types.integer))



      Eliminado desde PHP 7.3.0.





     **[PHPDBG_FUNC](#constant.phpdbg-func)**
     ([int](#language.types.integer))



      Eliminado desde PHP 7.3.0.





     **[PHPDBG_COLOR_PROMPT](#constant.phpdbg-color-prompt)**
     ([int](#language.types.integer))








     **[PHPDBG_COLOR_NOTICE](#constant.phpdbg-color-notice)**
     ([int](#language.types.integer))








     **[PHPDBG_COLOR_ERROR](#constant.phpdbg-color-error)**
     ([int](#language.types.integer))





# phpdbg Funciones

# phpdbg_break_file

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

phpdbg_break_file — Inserta un punto de interrupción en una línea de un fichero

### Descripción

**phpdbg_break_file**([string](#language.types.string) $file, [int](#language.types.integer) $line): [void](language.types.void.html)

Inserta un punto de interrupción en la línea line en el fichero
file.

### Parámetros

    file


      El nombre del fichero.






    line


      El número de la línea.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_break_function()](#function.phpdbg-break-function) - Inserta un punto de interrupción en la entrada de una función

- [phpdbg_break_method()](#function.phpdbg-break-method) - Inserta un punto de interrupción en la entrada de un método

- [phpdbg_break_next()](#function.phpdbg-break-next) - Inserta un punto de interrupción en el próximo opcode

- [phpdbg_clear()](#function.phpdbg-clear) - Elimina todos los puntos de interrupción

# phpdbg_break_function

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

phpdbg_break_function — Inserta un punto de interrupción en la entrada de una función

### Descripción

**phpdbg_break_function**([string](#language.types.string) $function): [void](language.types.void.html)

Inserta un punto de interrupción en la entrada de la función
function.

### Parámetros

    function


      El nombre de la función.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_break_file()](#function.phpdbg-break-file) - Inserta un punto de interrupción en una línea de un fichero

- [phpdbg_break_method()](#function.phpdbg-break-method) - Inserta un punto de interrupción en la entrada de un método

- [phpdbg_break_next()](#function.phpdbg-break-next) - Inserta un punto de interrupción en el próximo opcode

- [phpdbg_clear()](#function.phpdbg-clear) - Elimina todos los puntos de interrupción

# phpdbg_break_method

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

phpdbg_break_method — Inserta un punto de interrupción en la entrada de un método

### Descripción

**phpdbg_break_method**([string](#language.types.string) $class, [string](#language.types.string) $method): [void](language.types.void.html)

Inserta un punto de interrupción en la entrada del método
method de la clase
class.

### Parámetros

    class


      El nombre de la clase.






    method


      El nombre del método.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_break_file()](#function.phpdbg-break-file) - Inserta un punto de interrupción en una línea de un fichero

- [phpdbg_break_function()](#function.phpdbg-break-function) - Inserta un punto de interrupción en la entrada de una función

- [phpdbg_break_next()](#function.phpdbg-break-next) - Inserta un punto de interrupción en el próximo opcode

- [phpdbg_clear()](#function.phpdbg-clear) - Elimina todos los puntos de interrupción

# phpdbg_break_next

(PHP 5 &gt;= 5.6.3, PHP 7, PHP 8)

phpdbg_break_next — Inserta un punto de interrupción en el próximo opcode

### Descripción

**phpdbg_break_next**(): [void](language.types.void.html)

Inserta un punto de interrupción en el próximo opcode.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_break_file()](#function.phpdbg-break-file) - Inserta un punto de interrupción en una línea de un fichero

- [phpdbg_break_function()](#function.phpdbg-break-function) - Inserta un punto de interrupción en la entrada de una función

- [phpdbg_break_method()](#function.phpdbg-break-method) - Inserta un punto de interrupción en la entrada de un método

- [phpdbg_clear()](#function.phpdbg-clear) - Elimina todos los puntos de interrupción

# phpdbg_clear

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

phpdbg_clear — Elimina todos los puntos de interrupción

### Descripción

**phpdbg_clear**(): [void](language.types.void.html)

Elimina todos los puntos de interrupción que han sido definidos, ya sea mediante
una de las funciones **phpdbg*break*\*()**, o
de manera interactiva a través de la consola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_break_file()](#function.phpdbg-break-file) - Inserta un punto de interrupción en una línea de un fichero

- [phpdbg_break_function()](#function.phpdbg-break-function) - Inserta un punto de interrupción en la entrada de una función

- [phpdbg_break_method()](#function.phpdbg-break-method) - Inserta un punto de interrupción en la entrada de un método

- [phpdbg_break_next()](#function.phpdbg-break-next) - Inserta un punto de interrupción en el próximo opcode

# phpdbg_color

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

phpdbg_color — Define el color de ciertos elementos

### Descripción

**phpdbg_color**([int](#language.types.integer) $element, [string](#language.types.string) $color): [void](language.types.void.html)

Define el color color para el elemento element.

### Parámetros

    element


      Una de las constantes **[PHPDBG_COLOR_*](#constant.phpdbg-color-prompt)**.






    color


      El nombre del color. Puede ser white, red,
      green, yellow, blue,
      purple, cyan o black,
      y, opcionalmente, con los complementos -bold o -underline;
      por ejemplo white-bold o green-underline.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_prompt()](#function.phpdbg-prompt) - Define el indicador de comandos

# phpdbg_end_oplog

(PHP 7, PHP 8)

phpdbg_end_oplog — Finaliza un oplog

### Descripción

**phpdbg_end_oplog**([array](#language.types.array) $options = []): [?](#language.types.null)[array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    options





### Valores devueltos

# phpdbg_exec

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

phpdbg_exec — Intenta definir el contexto de ejecución

### Descripción

**phpdbg_exec**([string](#language.types.string) $context): [string](#language.types.string)|[bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    context





### Valores devueltos

Si el contexto de ejecución ha sido definido con éxito, este contexto será
devuelto.
Si el contexto de ejecución no ha sido definido, **[true](#constant.true)** será devuelto.
Si un error ha ocurrido durante la definición del contexto, **[false](#constant.false)**
será devuelto y un error de nivel **[E_WARNING](#constant.e-warning)** será
emitido.

# phpdbg_get_executable

(PHP 7, PHP 8)

phpdbg_get_executable — Devuelve un ejecutable

### Descripción

**phpdbg_get_executable**([array](#language.types.array) $options = []): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    options





### Valores devueltos

# phpdbg_prompt

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

phpdbg_prompt — Define el indicador de comandos

### Descripción

**phpdbg_prompt**([string](#language.types.string) $string): [void](language.types.void.html)

Define el indicador de comandos para la cadena string.

### Parámetros

    string


      La cadena a utilizar como indicador de comandos.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [phpdbg_color()](#function.phpdbg-color) - Define el color de ciertos elementos

# phpdbg_start_oplog

(PHP 7, PHP 8)

phpdbg_start_oplog — Inicia un oplog

### Descripción

**phpdbg_start_oplog**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [phpdbg_break_file](#function.phpdbg-break-file) — Inserta un punto de interrupción en una línea de un fichero
- [phpdbg_break_function](#function.phpdbg-break-function) — Inserta un punto de interrupción en la entrada de una función
- [phpdbg_break_method](#function.phpdbg-break-method) — Inserta un punto de interrupción en la entrada de un método
- [phpdbg_break_next](#function.phpdbg-break-next) — Inserta un punto de interrupción en el próximo opcode
- [phpdbg_clear](#function.phpdbg-clear) — Elimina todos los puntos de interrupción
- [phpdbg_color](#function.phpdbg-color) — Define el color de ciertos elementos
- [phpdbg_end_oplog](#function.phpdbg-end-oplog) — Finaliza un oplog
- [phpdbg_exec](#function.phpdbg-exec) — Intenta definir el contexto de ejecución
- [phpdbg_get_executable](#function.phpdbg-get-executable) — Devuelve un ejecutable
- [phpdbg_prompt](#function.phpdbg-prompt) — Define el indicador de comandos
- [phpdbg_start_oplog](#function.phpdbg-start-oplog) — Inicia un oplog

- [Introducción](#intro.phpdbg)
- [Instalación/Configuración](#phpdbg.setup)<li>[Configuración en tiempo de ejecución](#phpdbg.configuration)
  </li>- [Constantes predefinidas](#phpdbg.constants)
- [phpdbg Funciones](#ref.phpdbg)<li>[phpdbg_break_file](#function.phpdbg-break-file) — Inserta un punto de interrupción en una línea de un fichero
- [phpdbg_break_function](#function.phpdbg-break-function) — Inserta un punto de interrupción en la entrada de una función
- [phpdbg_break_method](#function.phpdbg-break-method) — Inserta un punto de interrupción en la entrada de un método
- [phpdbg_break_next](#function.phpdbg-break-next) — Inserta un punto de interrupción en el próximo opcode
- [phpdbg_clear](#function.phpdbg-clear) — Elimina todos los puntos de interrupción
- [phpdbg_color](#function.phpdbg-color) — Define el color de ciertos elementos
- [phpdbg_end_oplog](#function.phpdbg-end-oplog) — Finaliza un oplog
- [phpdbg_exec](#function.phpdbg-exec) — Intenta definir el contexto de ejecución
- [phpdbg_get_executable](#function.phpdbg-get-executable) — Devuelve un ejecutable
- [phpdbg_prompt](#function.phpdbg-prompt) — Define el indicador de comandos
- [phpdbg_start_oplog](#function.phpdbg-start-oplog) — Inicia un oplog
  </li>
