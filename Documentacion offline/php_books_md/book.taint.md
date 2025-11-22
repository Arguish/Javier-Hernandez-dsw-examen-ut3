# Taint

# Introducción

Taint es una extensión que sirve para detectar código XSS (strings
corrompidos, «tainted»).
También se puede utilizar para localizar vulnerabilidades a inyecciones SQL, inyecciones
«shell», etc.

Si taint está habilitada, advertirá de si se ha proporcionado una cadena corrompida
(que venga de [$\_GET](#reserved.variables.get), [$\_POST](#reserved.variables.post)
o [$\_COOKIE](#reserved.variables.cookies)) a alguna función.

**Ejemplo #1 Ejemplo de [taint()](#function.taint)**

&lt;?php
$a = trim($\_GET['a']);

$nombre_fichero = '/tmp' .  $a;
$salida = "¡¡¡Bienvenido, {$a} !!!";
$var = "salida";
$sql       = "Select *  from " . $a;
$sql .= "ooxx";

echo $salida;

print $$var;

include $nombre_fichero;

mysql_query($sql);
?&gt;

Resultado del ejemplo anterior es similar a:

Warning: main() [function.echo]: Attempt to echo a string that might be tainted

Warning: main() [function.echo]: Attempt to print a string that might be tainted

Warning: include() [function.include]: File path contains data that might be tainted

Warning: mysql_query() [function.mysql-query]: SQL statement contains data that might be tainted

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#taint.installation)
- [Configuración en tiempo de ejecución](#taint.configuration)

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/taint](https://pecl.php.net/package/taint).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de taint**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [taint.enable](#ini.taint.enable)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [taint.error_level](#ini.taint.error-level)
      E_WARNING
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      taint.enable
      [int](#language.types.integer)



       Si habilitar taint.







      taint.error_level
      [int](#language.types.integer)



       El tipo del error del que taint informará cuando encuentre una cadena
       corrupta.





# Más detalles

## Tabla de contenidos

- [Funciones y sentencias que propagarán la marca de corrupción de una
  cadena corrupta](#taint.detail.basic)
- [Funciones y sentencias que comprobarán cadenas corrompidas](#taint.detail.taint)
- [Funciones que sanean cadenas corruptas](#taint.detail.untaint)

    ## Funciones y sentencias que propagarán la marca de corrupción de una

    cadena corrupta

       <col>
       <col>
       
        
         Función/Sentencia
         Desde


         = (asignación)
         0.1.0



         . (concatenación)
         0.1.0



         "{$var}" (sustitución de variables)
         0.1.0



         .= (concatenación de asignación)
         0.1.0



         strval
         0.3.0



         explode/split
         0.3.0



         implode/join
         0.3.0



         sprintf
         0.3.0



         vsprintf
         0.3.0



         trim
         0.4.0



         rtrim
         0.4.0



         ltrim
         0.4.0



         strstr
         0.5.0



         str_pad
         0.5.0



         str_replace
         0.5.0



         substr
         0.5.0



         strtolower
         0.5.0



         strtoupper
         0.5.0

    ## Funciones y sentencias que comprobarán cadenas corrompidas

       <col>
       <col>
       
        
         Función/Sentencia
         Desde


         Sentencias básicas



         eval
         0.1.0



         include/include_once
         0.1.0



         require/require_once
         0.1.0





         Funciones de salida



         echo
         0.1.0



         print
         0.1.0



         printf
         0.1.0



         file_put_contents
         0.1.0




         Funciones del sistema de ficheros



         fopen
         0.2.0



         opendir
         0.2.0



         basename
         0.2.0



         dirname
         0.2.0



         file
         0.2.0



         pathinfo
         0.2.0




         Funciones relacionadas con bases de datos



         mysql_query
         0.2.0



         mysqli_query/MySQLi::query
         0.2.0



         sqlite_query/SqliteDataBase::query
         0.3.0



         sqlite_single_query/SqliteDataBase::singleQuery
         0.3.0



         oci_parse
         0.3.0



         PDO::query
         0.3.0



         PDO::prepare
         0.3.0



         SQLite3::query
         2.0.1



         SQLite3::prepare
         2.0.1




         Funciones relacionadas con la línea de comandos



         system
         0.1.0



         exec
         0.1.0



         proc_open
         0.1.0



         passthru
         0.1.0



         shell_exec
         0.3.0

    ## Funciones que sanean cadenas corruptas

       <col>
       <col>
       
        
         Función
         Desde


         addslashes
         0.1.0



         addcslashes
         0.1.0



         htmlspecialchars
         0.1.0



         htmlentities
         0.1.0



         escapeshellcmd
         0.1.0



         mysql_escape_string
         0.1.0



         mysql_real_escape_string
         0.1.0



         mysqli_escape_string/MySQLi::escape_string
         0.1.0



         mysqli_real_escape_string/MySQLi::real_escape_string
         0.1.0



         sqlite_escape_string/SqliteDataBase::escapeString
         0.3.0



         PDO::quote
         0.3.0

# Funciones de taint

# is_tainted

(PECL taint &gt;=0.1.0)

is_tainted — Comprobar si un string está corrompido

### Descripción

**is_tainted**([string](#language.types.string) $string): [bool](#language.types.boolean)

Comprueba si un string está corrompido

### Parámetros

    string





### Valores devueltos

Devuelve TRUE si el string está corrompido, FALSE en caso contrario.

# taint

(PECL taint &gt;=0.1.0)

taint — Corrompe un string

### Descripción

**taint**([string](#language.types.string) &amp;$string, [string](#language.types.string) ...$strings): [bool](#language.types.boolean)

Crea un string corrompido. Solamente se usa para realizar pruebas.

### Parámetros

    string









    strings




### Valores devueltos

Devuelve TRUE si la transformación se lleva a cabo. Siempre devuelve TRUE si la extensión
taint no esta activada.

# untaint

(PECL taint &gt;=0.1.0)

untaint — Sanea un string

### Descripción

**untaint**([string](#language.types.string) &amp;$string, [string](#language.types.string) ...$strings): [bool](#language.types.boolean)

    Sanea un string

### Parámetros

    string









    strings





### Valores devueltos

## Tabla de contenidos

- [is_tainted](#function.is-tainted) — Comprobar si un string está corrompido
- [taint](#function.taint) — Corrompe un string
- [untaint](#function.untaint) — Sanea un string

- [Introducción](#intro.taint)
- [Instalación/Configuración](#taint.setup)<li>[Instalación](#taint.installation)
- [Configuración en tiempo de ejecución](#taint.configuration)
  </li>- [Más detalles](#taint.detail)<li>[Funciones y sentencias que propagarán la marca de corrupción de una
     cadena corrupta](#taint.detail.basic)
- [Funciones y sentencias que comprobarán cadenas corrompidas](#taint.detail.taint)
- [Funciones que sanean cadenas corruptas](#taint.detail.untaint)
  </li>- [Funciones de taint](#ref.taint)<li>[is_tainted](#function.is-tainted) — Comprobar si un string está corrompido
- [taint](#function.taint) — Corrompe un string
- [untaint](#function.untaint) — Sanea un string
  </li>
