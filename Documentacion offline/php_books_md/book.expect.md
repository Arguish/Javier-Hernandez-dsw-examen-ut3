# Expect

# Introducción

Esta extensión permite interactuar con procesos mediante PTY. Se recomienda
tener en cuenta la [envoltura expect://
](#wrappers.expect) junto con las [funciones del sistema
de ficheros](#ref.filesystem), lo cual ofrece una interfaz más sencilla e intuitiva.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#expect.requirements)
- [Instalación](#expect.installation)
- [Configuración en tiempo de ejecución](#expect.configuration)
- [Tipos de recursos](#expect.resources)

    ## Requerimientos

    Este módulo utiliza las funciones de la biblioteca [» expect](http://expect.nist.gov/).
    Se necesita la versión de libexpect &gt;= 5.43.0.

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.
Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/expect](https://pecl.php.net/package/expect).

Para poder utilizar estas funciones, se debe compilar PHP con soporte para expect
utilizando la opción de configuración
**--with-expect[=DIR]**.

Los usuarios de Windows deben habilitar php_expect.dll dentro
del fichero php.ini para poder utilizar estas funciones.
No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

La extensión Expect se configura mediante opciones del
[fichero de configuración](#configuration.file) php.ini.

   <caption>**Opciones de configuración de Expect**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [expect.timeout](#ini.expect.timeout)
      "10"
      **[INI_ALL](#constant.ini-all)**
       



      [expect.loguser](#ini.expect.loguser)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [expect.logfile](#ini.expect.logfile)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [expect.match_max](#ini.expect.match-max)
      ""
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     expect.timeout
     [int](#language.types.integer)



      Tiempo de espera de datos, al usar la función
      [expect_expectl()](#function.expect-expectl).




      El valor en "-1" deshabilita el tiempo de espera.



     **Nota**:



       El valor en "0" provoca que [expect_expectl()](#function.expect-expectl)
       devuelva el control inmediatamente.









     expect.loguser
     [bool](#language.types.boolean)



      Indica si Expect debe enviar alguna salida del proceso creado a la salida estándar.
      Dado que normalmente los programas interactivos imprimen en pantalla los datos de entrada,
      esto sería suficiente para poder mostrar los dos lados de la conversación.








     expect.logfile
     [string](#language.types.string)



      Nombre del fichero en el que se escribirá la salida del proceso creado.
      Si no existiera, se crearía.



     **Nota**:



       Si se establece un valor, se escribe la salida independientemente del
       valor de [expect.loguser](#ini.expect.loguser).









     expect.match_max
     [int](#language.types.integer)



      Cambia el tamaño predeterminado (2000 bytes) del buffer utilizado para que coincida
      con los asteriscos en el patrón.


## Tipos de recursos

[expect_popen()](#function.expect-popen) devuelve el flujo del PTY usado por
[expect_expectl()](#function.expect-expectl).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[EXP_GLOB](#constant.exp-glob)**
     ([int](#language.types.integer))



     Indica que el patrón es del tipo glob (tipo Unix).





    **[EXP_EXACT](#constant.exp-exact)**
     ([int](#language.types.integer))



     Indica que el patrón es una cadena exacta.





    **[EXP_REGEXP](#constant.exp-regexp)**
     ([int](#language.types.integer))



     Indica que el patrón es un texto de tipo expresión regular.





    **[EXP_EOF](#constant.exp-eof)**
     ([int](#language.types.integer))



     Valor, devuelto por [expect_expectl()](#function.expect-expectl), cada vez que
     se alcanza EOF (fin del fichero).





    **[EXP_TIMEOUT](#constant.exp-timeout)**
     ([int](#language.types.integer))



     Valor, devuelto por [expect_expectl()](#function.expect-expectl) pasados unos determinados
     segundos, con el valor especificado en [expect.timeout](#ini.expect.timeout)





    **[EXP_FULLBUFFER](#constant.exp-fullbuffer)**
     ([int](#language.types.integer))



     Valor, devuelto por [expect_expectl()](#function.expect-expectl) si no coincidiera
     ningún patrón.

# Ejemplos

## Tabla de contenidos

- [Ejemplos de uso de Expect](#expect.examples-usage)

    ## Ejemplos de uso de Expect

    **Ejemplo #1 Ejemplo de uso de Expect**

    Este ejemplo conecta a un host remoto mediante SSH, y muestra el tiempo
    que lleva en funcionamiento dicho host con uptime.

&lt;?php
ini_set("expect.loguser", "Off");

$stream = fopen("expect://ssh root@remotehost uptime", "r");

$cases = array (
array (0 =&gt; "password:", 1 =&gt; PASSWORD)
);

switch (expect_expectl ($stream, $cases)) {
    case PASSWORD:
        fwrite ($stream, "password\n");
break;

    default:
        die ("Error al tratar de conectar con el host remoto\n");

}

while ($line = fgets($stream)) {
print $line;
}
fclose ($stream);
?&gt;

El siguiente ejemplo conecta con un host remoto, determina si el SO instalado
es de 32 o de 64 bits, y finalmente actualiza el paquete que corresponda.

**Ejemplo #2 Otro ejemplo de uso de Expect**

&lt;?php
ini_set("expect.timeout", -1);
ini_set("expect.loguser", "Off");

$stream = expect_popen("ssh root@remotehost");

while (true) {
switch (expect_expectl ($stream, array (
            array ("password:", PASSWORD), // SSH pide contraseña
            array ("yes/no)?", YESNO), // SSH pide si almacenar o no el host
            array ("~$ ", SHELL, EXP_EXACT), // ¡Hemos conectado!
))) {
case PASSWORD:
fwrite ($stream, "secret\n");
break;

        case YESNO:
            fwrite ($stream, "yes\n");
            break;

        case SHELL:
            fwrite ($stream, "uname -a\n");
            while (true) {
                    switch (expect_expectl ($stream, array (
                            array ("~$ ", SHELL, EXP_EXACT), // ¡Hemos conectado!
                            array ("^Linux.*$", UNAME, EXP_REGEXP), // salida de uname -a
                    ), $match)) {
                        case UNAME:
                            $uname .= $match[0];
                            break;

                        case SHELL:
                            // Run update:
                            if (strstr ($uname, "x86_64")) {
                                    fwrite ($stream, "rpm -Uhv http://mirrorsite/somepath/some_64bit.rpm\n");
                            } else {
                                    fwrite ($stream, "rpm -Uhv http://mirrorsite/somepath/some_32bit.rpm\n");
                            }
                            fwrite ($stream, "exit\n");
                            break 2;

                        case EXP_TIMEOUT:
                        case EXP_EOF:
                            break 2;

                        default:
                            die ("Ha ocurrido un error\n");
                    }
            }
            break 2;

        case EXP_TIMEOUT:
        case EXP_EOF:
            break 2;

        default:
            die ("Ha ocurrido un error\n");
    }

}

fclose ($stream);
?&gt;

# Funciones de Expect

# expect_expectl

(PECL expect &gt;= 0.1.0)

expect_expectl — Espera a que la salida de un proceso coincida con un patrón,
se supere un determinado periodo de tiempo, o se alcance un EOF

### Descripción

**expect_expectl**([resource](#language.types.resource) $expect, [array](#language.types.array) $cases, [array](#language.types.array) &amp;$match = ?): [int](#language.types.integer)

Espera a que la salida de un proceso coincida con un patrón, se supere un determinado
periodo de tiempo, o se alcance un EOF.

Si se proporciona el parámetro match, se le asignará el resultado de la
búsqueda. La cadena que coincide se encuentra en match[0].
Las subcadenas que coincidan (de acuerdo a los paréntesis) con el patrón original se encuentran
en match[1], match[2], y así
hasta match[9] (límite establecido por libexpect).

### Parámetros

     expect


       Flujo de Expect, abierto anteriormente con
       [expect_popen()](#function.expect-popen).






     cases


       Matriz con casos de expect. Cada caso será un array indexado, tal
       como se describe en la siguiente tabla:



        <caption>**Array de Caso de Expect**</caption>



           Clave de índice
           Tipo de valor
           Descripción
           Es Obligatorio
           Valor por omisión






           0
           string
           patrón, que buscará coincidencias en la salida del flujo
           sí
            



           1
           mixto
           valor, que devolverá esta función, si coincidiera el patrón
           sí
            



           2
           integer

            tipo de patrón, de entre:
            [**<a href="#constant.exp-glob">EXP_GLOB](#constant.exp-glob)**</a>,
            [**<a href="#constant.exp-exact">EXP_EXACT](#constant.exp-exact)**</a>
            o
            [**<a href="#constant.exp-regexp">EXP_REGEXP](#constant.exp-regexp)**</a>

           no
           [**<a href="#constant.exp-glob">EXP_GLOB](#constant.exp-glob)**</a>









### Valores devueltos

Devuelve valores asociados con el patrón que coincida.

En caso de error esta función devuelve:
[\*\*<a href="#constant.exp-eof">EXP_EOF](#constant.exp-eof)**</a>,
[**<a href="#constant.exp-timeout">EXP_TIMEOUT](#constant.exp-timeout)**</a>
o
[**<a href="#constant.exp-fullbuffer">EXP_FULLBUFFER](#constant.exp-fullbuffer)\*\*</a>

### Historial de cambios

       Versión
       Descripción






       PECL expect 0.2.1

        Antes de la versión 0.2.1, en el parámetro match se devolvía el string que
        coincidiera, no un array de substrings coincidentes.





### Ejemplos

    **Ejemplo #1 Ejemplo de expect_expectl()**

&lt;?php
// Copias de los archivos de host remoto:
ini_set("expect.timeout", 30);

$stream = fopen("expect://scp user@remotehost:/var/log/messages /home/user/messages.txt", "r");

$cases = array(
// array(patrón, valor que se devolverá si el patrón es encontrado)
array("password:", "asked for password"),
array("yes/no)?", "asked for yes/no")
);

while (true) {
switch (expect_expectl($stream, $cases)) {
        case "asked for password":
            fwrite($stream, "my password\n");
break;
case "asked for yes/no":
fwrite($stream, "yes\n");
break;
case EXP_TIMEOUT:
case EXP_EOF:
break 2; // break tanto la sentencia switch y el bucle while
default:
die("Error has occurred!");
}
}

fclose($stream);
?&gt;

### Ver también

    - [expect_popen()](#function.expect-popen) - Ejecuta comandos por la shell Bourne, y abre el flujo PTY

al proceso

# expect_popen

(PECL expect &gt;= 0.1.0)

expect_popen — Ejecuta comandos por la shell Bourne, y abre el flujo PTY
al proceso

### Descripción

**expect_popen**([string](#language.types.string) $command): [resource](#language.types.resource)

Ejecuta comandos por la shell Bourne, y abre el flujo PTY al proceso.

### Parámetros

     command


       Comando a ejecutar.





### Valores devueltos

Devuelve un flujo PTY abierto al stdio,
stdout, y stderr del prceso.

En caso de error, devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de expect_popen()**

&lt;?php
// Entrar en el repositorio CVS de PHP.net
$stream = expect_popen ("cvs -d :pserver:anonymous@cvs.php.net:/repository login");
sleep (3);
fwrite ($stream, "phpfi\n");
fclose ($stream);
?&gt;

### Ver también

    - [popen()](#function.popen) - Crea un puntero de archivo de proceso

## Tabla de contenidos

- [expect_expectl](#function.expect-expectl) — Espera a que la salida de un proceso coincida con un patrón,
  se supere un determinado periodo de tiempo, o se alcance un EOF
- [expect_popen](#function.expect-popen) — Ejecuta comandos por la shell Bourne, y abre el flujo PTY
  al proceso

- [Introducción](#intro.expect)
- [Instalación/Configuración](#expect.setup)<li>[Requerimientos](#expect.requirements)
- [Instalación](#expect.installation)
- [Configuración en tiempo de ejecución](#expect.configuration)
- [Tipos de recursos](#expect.resources)
  </li>- [Constantes predefinidas](#expect.constants)
- [Ejemplos](#expect.examples)<li>[Ejemplos de uso de Expect](#expect.examples-usage)
  </li>- [Funciones de Expect](#ref.expect)<li>[expect_expectl](#function.expect-expectl) — Espera a que la salida de un proceso coincida con un patrón,
     se supere un determinado periodo de tiempo, o se alcance un EOF
- [expect_popen](#function.expect-popen) — Ejecuta comandos por la shell Bourne, y abre el flujo PTY
al proceso
  </li>
