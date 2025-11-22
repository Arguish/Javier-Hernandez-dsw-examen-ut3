# Caché de Windows para PHP

# Introducción

La Extensión de Caché de Windows para PHP es un acelerador de PHP utilizado para incrementar la velocidad
de las aplicaciones de PHP que se ejecutan sobre Windows y Windows Server. Una vez que la Extensión de
Caché de Windows para PHP está habilitada y cargada por el motor de PHP, las aplicaciones de PHP se podrán
aprovechar de la funcionalidad sin ninguna modificación en el código.

La Extensión de Caché de Windows para PHP incluye 5 tipos diferentes de cachés. A continuación se
describe el propósito de cada tipo de caché y los beneficios que ofrece.

- _Caché de opcodes de PHP_ - PHP es un motor de procesamiento de scripts que
  lee un flujo de datos de entrada que contiene texto, instrucciones de PHP, o ambas, y produce
  otro flujo de datos, generalmente en formato HTML. Esto significa que, en un servidor web, el motor de
  PHP lee, analiza, compila y ejecuta un script de PHP cada vez que es solicitado por un cliente web.
  Las operaciones de lectura, análisis y compilación añaden una carga adicional a la CPU del servidor web
  y del sistema de ficheros y por tanto afectar al rendimiento global de una aplicación web PHP.
  La caché de bytecodes (opcodes) de PHP se utiliza para almacenar, en memoria compartida, el script de
  bytecodes ya compilado de manera que pueda ser re-utilizado por el motor de PHP para ejecuciones
  posteriores del mismo script.

    El soporte para el almacenamiento en caché de opcode fue eliminado en Wincache 2.0.0, todos los usuarios que
    desean tener un opcache debe utilizar la extensión [OPcache](#book.opcache)
    que se incluye en PHP.

- _Caché de Fichero_ - Incluso con la caché de opcodes de PHP activada, en un sistema de
  ficheros el motor de PHP, debe acceder a los ficheros de script.
  Cuando los script de PHP son almacenados en un UNC remoto de compartición de ficheros, las operaciones
  sobre ficheros introducen una considerable sobrecarga de rendimiento.
  La Extensión de Caché de Windows para PHP incluye una caché de ficheros que es utilizada para almacenar
  los contenidos de los ficheros de script de PHP en memoria compartida, lo que reduce la cantidad de
  operaciones en el sistema de ficheros realizado por el motor de PHP.

- _Caché de Resolución de Rutas de Ficheros_ - Los script de PHP a menudo incluyen u
  operan con ficheros mediante el uso de rutas relativas. Cada ruta de fichero debe ser normalizada por
  el motor de PHP a una ruta de fichero absoluta. Cuando una aplicación de PHP emplea muchos ficheros PHP
  y accede a ellos mediante rutas relativas, el tener que resolver las rutas puede afectar de manera
  negativa al rendimiento de la aplicación. La Extensión de Caché de Windows para PHP ofrece una caché
  de Resolución de Rutas de Ficheros, que se emplea para almacenar los mapeos entre las rutas relativas
  de ficheros y las absolutas, reduciendo por tanto la cantidad de resoluciones de rutas que el motor de
  PHP tiene que realizar.

- _Caché de Usuario (disponible desde la versión 1.1.0)_ - Los scripts de PHP pueden
  aprovecharse de la caché de la memoria compartida mediante el uso del API de la caché de usuario. Los
  objetos PHP y las variables se pueden almacenar en la caché de usuario y ser reutilizadas en posteriores
  peticiones. Esto se puede emplear para mejorar el rendimiento de los script de PHP y para compartir
  datos entre múltiples procesos de PHP.

- _Gestor de Sesión (disponible desde la versión 1.1.0)_ - El gestor de sesión WinCache
  se puede emplear para almacenar los datos de la sesión PHP en la memoria compartida. Esto evita
  operaciones del sistema de ficheros para leer y escribir datos de sesión, lo que mejora el rendimiento
  cuando se almacenan grandes cantidades de datos en la sesión de PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#wincache.requirements)
- [Instalación](#wincache.installation)
- [Configuración en tiempo de ejecución](#wincache.configuration)
- [Script de estadísticas WinCache](#wincache.stats)
- [Manejador de sesiones WinCache](#wincache.sessionhandler)
- [Redirecciones de funciones WinCache](#wincache.reroutes)

    ## Requerimientos

    La extensión actualmente solo es compatible con las siguientes configuraciones:

    Sistema Operativo Windows:
    - Windows XP SP3 con IIS 5.1 y la [» Extensión FastCGI](http://www.iis.net/extensions/fastcgi)

    - Windows Server 2003 con IIS 6.0 y la [» Extensión FastCGI](http://www.iis.net/extensions/fastcgi)

    - Windows Vista SP1 con IIS 7.0 y el módulo FastCGI

    - Windows Server 2008 con IIS 7.0 y el módulo FastCGI

    - Windows 7 con IIS 7.5 y el módulo FastCGI

    - Windows Server 2008 R2 con IIS 7.5 y el módulo FastCGI

    PHP:
    - PHP 5.2.X, compilación no segura para subprocesos

    - PHP 5.3 X86, compilación VC9 no segura para subprocesos

    **Nota**:

        La extensión WinCache solo puede ser utilizada cuando IIS está configurado para ejecutar PHP a través de FastCGI.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/wincache](https://pecl.php.net/package/wincache).

    Hay dos paquetes para esta extensión: un paquete es para las versiones PHP 5.2.X,
    y el otro paquete es para PHP 5.3.X. Elija el paquete adecuado para la versión de PHP
    que esté utilizando.

    Para instalar y activar la extensión, siga estos pasos:
    - Descomprima el paquete en una ubicación temporal.

    - Copie el archivo php_wincache.dll en la carpeta de extensiones PHP.
      Generalmente, esta carpeta se llama "ext" y está ubicada en el mismo directorio que todos
      los archivos binarios de PHP. Por ejemplo: C:\Program Files\PHP\ext.

    - Con un editor de texto, abra el archivo php.ini, que generalmente se encuentra en el mismo
      directorio que todos los archivos binarios de PHP. Por ejemplo:
      C:\Program Files\PHP\php.ini.

    - Agregue la siguiente línea al final del archivo php.ini:
      extension = php_wincache.dll.

    - Guarde y cierre el archivo php.ini.

    - Reinicie el grupo de aplicaciones IIS para que PHP recoja los cambios de configuración. Para verificar que la extensión se ha activado, cree un archivo llamado
      phpinfo.php que contenga una llamada a la función
      [phpinfo](#function.phpinfo).

    - Guarde el archivo phpinfo.php en el directorio raíz de un
      sitio web IIS que utilice PHP, luego abra un navegador y realice una solicitud a
      http://localhost/phpinfo.php. Busque una sección llamada wincache
      en la página devuelta. Si la extensión está activada, la salida de
      [phpinfo](#function.phpinfo) listará los parámetros de configuración
      proporcionados por WinCache.

    **Nota**:

        No olvide eliminar el archivo phpinfo.php del directorio raíz después de haber verificado que la extensión se ha activado.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

La siguiente tabla enumera y explica los ajustes de configuración
proporcionados por la extensión WinCache:

   <caption>**Opciones de configuración de WinCache**</caption>
   
    
     
      Nombre
      Por defecto
      Mínimo
      Máximo
      Cambiable
      Historial de cambios


      [wincache.fcenabled](#ini.wincache.fcenabled)
      "1"
      "0"
      "1"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de WinCache 1.0.0



      [wincache.fcenabledfilter](#ini.wincache.fcenabledfilter)
      "NULL"
      "NULL"
      "NULL"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.fcachesize](#ini.wincache.fcachesize)
      "24"
      "5"
      "255"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.fcndetect](#ini.wincache.fcndetect)
      "1"
      "0"
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.1.0



      [wincache.maxfilesize](#ini.wincache.maxfilesize)
      "256"
      "10"
      "2048"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.ocenabled](#ini.wincache.ocenabled)
      "1"
      "0"
      "1"
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de WinCache 1.0.0. Eliminada a partir de 2.0.0.0



      [wincache.ocenabledfilter](#ini.wincache.ocenabledfilter)
      "NULL"
      "NULL"
      "NULL"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0. Eliminada a partir de 2.0.0.0



      [wincache.ocachesize](#ini.wincache.ocachesize)
      "96"
      "15"
      "255"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0. Eliminada a partir de 2.0.0.0



      [wincache.filecount](#ini.wincache.filecount)
      "4096"
      "1024"
      "16384"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.chkinterval](#ini.wincache.chkinterval)
      "30"
      "0"
      "300"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.ttlmax](#ini.wincache.ttlmax)
      "1200"
      "0"
      "7200"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.enablecli](#ini.wincache.enablecli)
      0
      0
      1
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.ignorelist](#ini.wincache.ignorelist)
      NULL
      NULL
      NULL
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de WinCache 1.0.0



      [wincache.namesalt](#ini.wincache.namesalt)
      NULL
      NULL
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.0.0



      [wincache.ucenabled](#ini.wincache.ucenabled)
      1
      0
      1
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.1.0



      [wincache.ucachesize](#ini.wincache.ucachesize)
      8
      5
      85
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.1.0



      [wincache.scachesize](#ini.wincache.scachesize)
      8
      5
      85
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.1.0



      [wincache.rerouteini](#ini.wincache.rerouteini)
      NULL
      NULL
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.2.0. Eliminada a partir de 1.3.7



      [wincache.reroute_enabled](#ini.wincache.reroute_enabled)
      1
      0
      1
      **[INI_SYSTEM](#constant.ini-system)**|**[INI_PERDIR](#constant.ini-perdir)**
      Disponible a partir de WinCache 1.3.7



      [wincache.srwlocks](#ini.wincache.srwlocks)
      1
      0
      1
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.3.6.3. Eliminada a partir de 2.0.0.0



      [wincache.filemapdir](#ini.wincache.filemapdir)
      NULL
      NULL
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de WinCache 1.3.7.4


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     wincache.fcenabled
     [bool](#language.types.boolean)


     Habilita o deshabilita la caché de ficheros.




     wincache.fcenabledfilter
     [string](#language.types.string)



      Define una lista separada por comas de identificadores de sitios web de IIS donde debería
      habilitarse o deshabilitarse la caché de ficheros. Esta opción funciona junto
      con wincache.fcenabled: si wincache.fcenabled
      se establece a 1, los sitios enumerados en wincache.fcenabledfilter
      tendrán la caché de ficheros desactivada; si wincache.fcenabled
      se establece a 0, los sitios enumerados en wincache.fcenabledfilter
      tendrán la caché activada.





     wincache.fcachesize
     [int](#language.types.integer)



      Define el tamaño máximo de memoria (en megabytes) que se asigna a la caché de ficheros.
      Si el tamaño total de ficheros en caché excede el valor especificado en este ajuste,
      se eliminarán los ficheros más antiguos de la caché de ficheros.





     wincache.fcndetect
     [bool](#language.types.boolean)



      Habilita o deshabilita la detección de notificaciones de cambios en ficheros. Si está soportada
      la notificación de cambios en ficheros, se usará para refrescar las entradas de la caché de códigos de operación y de ficheros
      en cuanto los ficheros correspondientes sean modificados en un sistema de ficheros. Si la notificación de cambios en ficheros
      no está soportada, por ejemplo, al usar la compartición de ficheros en red, wincache hará un sondeo para
      los cambios en ficheros en intervalos de tiempo regulares especificados por wincache.chkinterval.





     wincache.maxfilesize
     [int](#language.types.integer)



      Define el tamaño máximo permitido (en kilobytes) para que un fichero sea almacenado en caché.
      Si un fichero excede el valor especificado, no será almacenado en caché.
      Este ajuste se aplica solamente a la caché de ficheros.





     wincache.ocenabled
     [bool](#language.types.boolean)


     **Advertencia**Esta opción ha sido *eliminada* a partir de 2.0.0.0


     Habilita o deshabilita la caché de códigos de operaciones ("opcodes")




     wincache.ocenabledfilter
     [string](#language.types.string)


     **Advertencia**Esta opción ha sido *eliminada* a partir de 2.0.0.0



      Define una lista separada por comas de identificadores de sitios web de IIS donde se debería
      habilitar o deshabilitar la caché de códigos de operaciones. Este ajuste funciona junto con
      wincache.ocenabled: si wincache.ocenabled
      se establece a 1, los sitios enumerados en wincache.ocenabledfilter
      tendrán la caché de códigos de operaciones desactivada; si wincache.ocenabled
      se establece a 0, los sitios enumerados en wincache.ocenabledfilter
      tendrán la caché de códigos de operaciones activada.





     wincache.ocachesize
     [int](#language.types.integer)


     **Advertencia**Esta opción ha sido *eliminada* a partir de 2.0.0.0



      Define el tamaño máximo de memoria (en megabytes) que se asigna a la caché de
      códigos de operaciones. Si el tamaño de dicha caché excede el valor especificado
      se eliminarán de la caché los códigos de operación más antiguos. Observe que el tamaño
      de la caché de códigos de operaciones debe ser al menos tres veces mayor que el tamaño de la caché de ficheros.
      Si no fuera así, el tamaño de la caché de códigos de operaciones será aumentada automáticamente.





     wincache.filecount
     [int](#language.types.integer)



      Define cuántos ficheros se preveen que almacene en caché la extensión, para así asignar el
      tamaño de memoria apropiada en el momento del arranque. Si el número de ficheros excede el valor
      especificado, WinCache reasignará tanta memoria como sea necesaria.





     wincache.chkinterval
     [int](#language.types.integer)



      Define la frecuencia (en segundos) con que la extensión comprobará los cambios en ficheros
      para refrescar la caché. Si se establece a 0 se deshabilitará el refresco de la caché.
      Los cambios en ficheros no se verán reflejados en la caché al menos que la entrada de la caché
      para tales ficheros sea eliminada mediante limpieza ("scavenger"), o la provisión ("pool") de aplicaciones
      de IIS sea reclicada, o se llame a la función wincache_refresh_if_changed.





     wincache.ttlmax
     [int](#language.types.integer)



      Define el tiempo máximo de vida (en segundos) para una entrada de caché que no se esté usando.
      Si se establece a 0, se desactivará la limpieza de la caché, por lo que las entradas en caché nunca
      serán eliminadas durante el tiempo de vida del proceso obrero ("worker") de IIS.





     wincache.enablecli
     [bool](#language.types.boolean)



      Define si la caché se habilita cuando PHP se está ejecutando en modo de línea de comandos (CLI).





     wincache.ignorelist
     [string](#language.types.string)



      Define una lista de ficheros que no deberían ser almacenados en caché por la extensión.
      La lista de ficheros se especifica empleando solamente nombres de ficheros, separados por
      el símbolo tubería - "|".



       **Ejemplo #1 Ejemplo de wincache.ignorelist**




wincache.ignorelist = "index.php|misc.php|admin.php"

     wincache.namesalt
     [string](#language.types.string)



      Define un string que será usado al nombrar los objetos específicos
      de la extensión que están almacenados en la memoria compartida. Se emplea
      para evitar conflictos que podrían causarse si otras aplicaciones dentro
      de un proceso obrero de IIS intenta acceder a la memoria compartida. La longitud
      del sting namesalt no puede exceder de 8 caracteres.





     wincache.ucenabled
     [bool](#language.types.boolean)



      Habilita o deshabilita la caché de usuarios.





     wincache.ucachesize
     [int](#language.types.integer)



      Define el tamaño máximo de memoria en megabytes que se asigna para la caché de usuario. Si el tamaño
      total de las variables almacenadas en la caché de usuario excede el valor especificado, se eliminarán
      las variables más antiguas de la caché.





     wincache.scachesize
     [int](#language.types.integer)



      Define el tamaño máximo de memoria en megabytes que se asigna para la caché de sesión. Si el tamaño
      total de los datos almacenados en la caché de sesión excede el valor especificado, se eliminarán
      los datos más antiguos de la caché.





     wincache.rerouteini
     [string](#language.types.string)


     **Advertencia**
      Esta opción ha sido *eliminada* a partir de 1.3.7.
      Véase wincache.reroute_enabled para una funcionalidad similar a partir de 1.3.7.




      Especifica una ruta absoluta o relativa al fichero reroute.ini que contiene la lista de funciones de PHP
      cuya implementación debería ser remplazada con las funciones equivalentes de WinCache. Si se especifica una ruta relativa,
      se asume que sea relativa a la ubicación del fichero php-cgi.exe.





     wincache.reroute_enabled
     [bool](#language.types.boolean)



      Habilita o deshabilita el redireccionamiento de varias funciones de E/S de ficheros a través de la caché de ficheros.





     wincache.srwlocks
     [bool](#language.types.boolean)


     **Advertencia**Esta opción ha sido *eliminada* a partir de 2.0.0.0



      Habilita o deshabilita el uso de bloqueos ("locks) de lectura/escritura compartidos. La deshabilitación es útil cuando se dan condiciones de problemas de punto muerto ("deadlock") en WinCache.





     wincache.filemapdir
     [string](#language.types.string)



      Especifica una ruta absoluta al directorio donde WinCache almacenará los ficheros temporales empleados para segmentos de memoria compartida.


      Este directorio debe estar en la máquina local y no en un sistema de ficheros en la red.


      Si no se especifica este directorio, WinCache utilizará el fichero de paginación de Windows para todos los segmentos de memoria compartida.


## Script de estadísticas WinCache

El paquete de instalación para WinCache incluye un script PHP,
wincache.php, que puede ser utilizado para obtener información y estadísticas sobre la caché.

Si la extensión WinCache se instaló a través del instalador de Microsoft Web Platform,
entonces este script se encuentra en
%SystemDrive%\Program Files\IIS\Windows Cache for PHP\.
En una versión de 64 bits del sistema operativo Windows Server, el script se encuentra en
%SystemDrive%\Program Files (x86)\IIS\Windows Cache for PHP.
Si la extensión se instaló manualmente, entonces el archivo wincache.php
estará ubicado en el mismo directorio desde el cual se extrajo el contenido del paquete de instalación.

Para usar wincache.php, cópielo en el directorio raíz de un sitio web o
en cualquier subdirectorio. Para proteger el script, ábralo en cualquier editor y
reemplace los valores de las constantes _USERNAME_ y _PASSWORD_. Si alguna otra autenticación IIS está habilitada en el servidor, entonces siga las instrucciones
en los comentarios:

    **Ejemplo #1 Configuración de la autenticación para wincache.php**

&lt;?php
/\*\*

- ======================== CONFIGURACIÓN DE AJUSTES ==============================
- Si no desea usar la autenticación para esta página, establezca USE_AUTHENTICATION en 0.
- Si usa autenticación, reemplace la contraseña predeterminada.
  \*/
  define('USE_AUTHENTICATION', 1);
  define('USERNAME', 'wincache');
  define('PASSWORD', 'wincache');

/\*\*

- La autenticación PHP básica solo funcionará cuando IIS esté configurado para admitir
- 'Autenticación anónima' y nada más. Si IIS está configurado para admitir/usar
- cualquier otro tipo de autenticación como Básica/Negociar/Digest, etc., esto no funcionará.
- En ese caso, use la matriz a continuación para definir los nombres de los usuarios en su
- dominio/red/grupo de trabajo a los que desea otorgar acceso.
  \*/
  $user_allowed = array('DOMAIN\user1', 'DOMAIN\user2', 'DOMAIN\user3');

/\*\*

- Si la matriz contiene la cadena 'all', entonces todos los usuarios autenticados por IIS
- tendrán acceso a la página. Descomente la línea a continuación y comente la línea anterior
- para otorgar acceso a todos los usuarios que sean autenticados por IIS.
  _/
  /_ $user_allowed = array('all'); \*/

/\*_ ===================== FIN DE CONFIGURACIÓN DE AJUSTES ========================== _/
?&gt;

**Nota**:

     Siempre proteja el script wincache.php utilizando el mecanismo de autenticación integrado o el mecanismo de autenticación del servidor. Dejar este script sin protección puede comprometer la seguridad de su aplicación web
     y del servidor.

## Manejador de sesiones WinCache

El manejador de sesiones WinCache (disponible desde WinCache 1.1.0) puede ser utilizado
para configurar PHP para almacenar los datos de sesión en la memoria compartida del caché de sesión.
El uso de la memoria compartida en lugar de la sesión predeterminada ayuda a mejorar el rendimiento
de las aplicaciones PHP que almacenan grandes cantidades de datos en objetos de sesión.
El caché de sesión Wincache utiliza archivos basados en memoria compartida, lo que
asegura que los datos de sesión no se perderán durante el reciclaje de la cola de aplicaciones IIS.

Para configurar PHP para usar el manejador de sesiones WinCache, establezca el parámetro
[session.save_handler](#ini.session.save-handler) del archivo
php.ini a _wincache_.
De forma predeterminada, la ubicación donde se almacenan los archivos temporales en Windows se usa
para almacenar los datos de sesión. Para cambiar esta ubicación, use la directiva
[session.save_path](#ini.session.save-path).

    **Ejemplo #1 Activar el manejador de sesiones WinCache**

session.save_handler = wincache
session.save_path = C:\inetpub\temp\session\

## Redirecciones de funciones WinCache

_NOTA:_
[wincache.rerouteini](#ini.wincache.rerouteini)
fue eliminado con WinCache 1.3.7.0. Esto ha sido reemplazado por el redireccionamiento automático de funciones. Ver:
[wincache.reroute_enabled](#ini.wincache.reroute_enabled)

Las funcionalidades de redireccionamiento de funciones de WinCache (disponibles
desde WinCache 1.2.0, eliminadas desde WinCache 1.3.7.0) pueden ser utilizadas para reemplazar funciones PHP nativas por sus equivalentes optimizados para casos particulares. La extensión
Wincache incluye implementaciones de funciones PHP optimizadas para Windows,
especialmente en casos de acceso a red o sistema de archivos.
Las siguientes funciones están involucradas:

- [file_exists](#function.file-exists)

- [file_get_contents](#function.file-get-contents)

- [readfile](#function.readfile)

- [is_readable](#function.is-readable)

- [is_writable](#function.is-writable)

- [is_dir](#function.is-dir)

- [realpath](#function.realpath)
    -

    [filesize](#function.filesize)

Para configurar el redireccionamiento de funciones con Wincache, use el archivo
reroute.ini incluido en el paquete. Cópielo en el directorio
donde se encuentra php.ini. Luego, agregue wincache.rerouteini en
php.ini y especifique la ruta absoluta o relativa a
reroute.ini.

    **Ejemplo #1 Activación de las funcionalidades de redireccionamiento de funciones de WinCache**

wincache.rerouteini = C:\PHP\reroute.ini

**Nota**:

    Si está habilitado, se recomienda aumentar el tamaño del caché de archivos. Esto se puede hacer
    usando el parámetro [wincache.fcachesize](#ini.wincache.fcachesize).

El archivo reroute.ini contiene la correspondencia entre la función PHP nativa y
el equivalente de Wincache. Cada línea en el archivo define una correspondencia. Aquí está la sintaxis:

&lt;Nombre de la función PHP&gt;:[&lt;número de parámetros de la función&gt;]=&lt;nombre de la función wincache&gt;

A continuación se muestra un ejemplo de archivo. En este ejemplo, las llamadas a las funciones PHP
[file_get_contents()](#function.file-get-contents) serán reemplazadas por **wincache_file_get_contents()**
solo si el número de parámetros pasados a la función es menor o igual a dos. Es útil especificar el número de parámetros cuando la función de reemplazo no está diseñada para usar todos ellos.

    **Ejemplo #2 Reroute.ini**

[FunctionRerouteList]
file_exists=wincache_file_exists
file_get_contents:2=wincache_file_get_contents
readfile:2=wincache_readfile
is_readable=wincache_is_readable
is_writable=wincache_is_writable
is_writeable=wincache_is_writable
is_file=wincache_is_file
is_dir=wincache_is_dir
realpath=wincache_realpath
filesize=wincache_filesize

# Funciones de WinCache

# wincache_fcache_fileinfo

(PECL wincache &gt;= 1.0.0)

wincache_fcache_fileinfo —
Extrae información sobre los archivos almacenados en la caché de archivos

### Descripción

**wincache_fcache_fileinfo**([bool](#language.types.boolean) $summaryonly = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Extrae información sobre el contenido de la caché de archivos y su utilización.

### Parámetros

     summaryonly


       Controla si el array devuelto debe contener información sobre las entradas individuales del caché además del resumen del caché de archivos.





### Valores devueltos

Array de metadatos sobre la caché de archivos o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      total_cache_uptime - Tiempo total de actividad en segundos de la caché de archivos



    -

      total_file_count - Número total de archivos actualmente en la caché de archivos



    -

      total_hit_count - Número de veces que los archivos han sido servidos desde la caché de archivos



    -

      total_miss_count - Número de veces que los archivos no se encontraron en la caché de archivos



    -

      file_entries - Array que contiene información sobre todos los archivos almacenados en caché:



       <li class="listitem">

         file_name - Nombre y ruta absoluta del archivo en caché



       -

         add_time - Tiempo en segundos desde que el archivo fue añadido a la caché de archivos



       -

         use_time - Tiempo en segundos desde que el archivo fue consultado en la caché de archivos



       -

         last_check - Tiempo en segundos desde la última verificación de modificaciones



       -

         hit_count - Número de veces que el archivo ha sido servido desde la caché



       -

         file_size - Tamaño en bytes del archivo almacenado en caché





    </li>

### Ejemplos

    **Ejemplo #1 Un ejemplo de wincache_fcache_fileinfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_fcache_fileinfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[total_cache_uptime] =&gt; 3234
[total_file_count] =&gt; 5
[total_hit_count] =&gt; 0
[total_miss_count] =&gt; 1
[file_entries] =&gt; Array
(
[1] =&gt; Array
(
[file_name] =&gt; c:\inetpub\wwwroot\checkcache.php
[add_time] =&gt; 1
[use_time] =&gt; 0
[last_check] =&gt; 1
[hit_count] =&gt; 1
[file_size] =&gt; 2435
)
[2] =&gt; Array (...iterates for each cached file)
)
)

### Ver también

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_fcache_meminfo

(PECL wincache &gt;= 1.0.0)

wincache_fcache_meminfo —
Recupera información sobre el uso de memoria caché de ficheros

### Descripción

**wincache_fcache_meminfo**(): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre el uso de la memoria caché del fichero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array de meta datos sobre el uso de memoria caché de ficheros o **[false](#constant.false)** si ocurre un error

El array devuelta por esta función contiene los siguientes elementos:

    -

      memory_total - cantidad de memoria en bytes asignados para la caché de ficheros



    -

      memory_free - cantidad de memoria libre en bytes disponibles para la caché de ficheros



    -

      num_used_blks - número de bloques de memoria utilizados por la caché de ficheros



    -

      num_free_blks - número de bloques de memoria libre disponibles para la caché de ficheros



    -

      memory_overhead - cantidad de memoria en bytes utilizados para las estructuras internas de la caché de ficheros


### Ejemplos

    **Ejemplo #1 Un ejemplo de wincache_fcache_meminfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_fcache_meminfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[memory_total] =&gt; 134217728
[memory_free] =&gt; 131339120
[num_used_blks] =&gt; 361
[num_free_blks] =&gt; 3
[memory_overhead] =&gt; 5856
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_lock

(PECL wincache &gt;= 1.1.0)

wincache_lock —
Obtiene un bloqueo exclusivo en una clave dada

### Descripción

**wincache_lock**([string](#language.types.string) $key, [bool](#language.types.boolean) $isglobal = **[false](#constant.false)**): [bool](#language.types.boolean)

Obtiene un bloqueo exclusivo sobre una clave dada. La ejecución del script actual quedará en espera que
se pueda obtener el bloqueo. Una vez obtenido el bloqueo, el otro script que intente solicitar dicho bloqueo utilizando la misma
clave quedará en espera, hasta que el script actual libere el bloqueo con [wincache_unlock()](#function.wincache-unlock).

**Advertencia**

    El uso de **wincache_lock()** y [wincache_unlock()](#function.wincache-unlock) puede causar bloqueos de punto muerto al
    ejecutar scripts de PHP en un entorno multiproceso como FastCGI. No emplear estas funciones a menos que se esté
    absolutamente seguro de que son necesarias. Para la mayoría de las operaciones en la caché de usuario no es necesario
    usar esar estas funciones.

### Parámetros

     key


       Nombre de la clave en la cahcé para adquirir el bloqueo.






     isglobal


       Controla si el ámbito del bloqueo es a nivel de sistema o local. Los bloqueos locales tienen alcance para la «pool» de la aplicación
       en el caso de FastCGI de IIS o a todos los procesos de php que tengan el mismo identificador de proceso padre.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Empleo de wincache_lock()**

&lt;?php
$fp = fopen("/tmp/lock.txt", "r+");
if (wincache_lock(“lock_txt_lock”)) { // realizar un bloqueo exclusivo
    ftruncate($fp, 0); // truncate file
fwrite($fp, "Write something here\n");
    wincache_unlock(“lock_txt_lock”); // liberar el bloqueo
} else {
    echo "No se pudo obtener el bloqueo";
}
fclose($fp);
?&gt;

### Ver también

    - [wincache_unlock()](#function.wincache-unlock) - Libera un bloqueo exclusivo sobre una clave dada

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

# wincache_ocache_fileinfo

(PECL wincache &gt;= 1.0.0)

wincache_ocache_fileinfo —
Extrae información sobre los archivos almacenados en el caché opcode

### Descripción

**wincache_ocache_fileinfo**([bool](#language.types.boolean) $summaryonly = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Extrae información sobre el contenido del caché opcode y su utilización.

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.0.0.

### Parámetros

     summaryonly


       Controla si el array devuelto debe contener información sobre las entradas individuales del caché además del resumen del caché opcode.





### Valores devueltos

Array de metadatos sobre el caché opcode o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      total_cache_uptime - Tiempo total de actividad en segundos del caché opcode



    -

      total_file_count - Número total de archivos actualmente en el caché opcode



    -

      total_hit_count - Número total de veces que el opcode compilado ha sido servido desde el caché



    -

      total_miss_count - Número de veces que el opcode compilado no se encontró en el caché



    -

      is_local_cache - true si los metadatos del caché son para una instancia de caché local, false si los metadatos son para el caché global.



    -

      file_entries - Array que contiene información sobre todos los archivos almacenados en caché:



       <li class="listitem">

         file_name - Nombre de archivo absoluto del archivo en caché



       -

         add_time - Tiempo en segundos desde que el archivo fue añadido al caché opcode



       -

         use_time - Tiempo en segundos desde que el archivo fue consultado en el caché opcode



       -

         last_check - Tiempo en segundos desde que el archivo fue verificado para cambios



       -

         hit_count - Número de veces que el archivo ha sido servido desde el caché



       -

         function_count - Número de funciones en el caché



       -

         class_count - Número de clases en el caché





    </li>

### Ejemplos

    **Ejemplo #1 Un ejemplo de wincache_ocache_fileinfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_ocache_fileinfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[total_cache_uptime] =&gt; 17357
[total_file_count] =&gt; 121
[total_hit_count] =&gt; 36562
[total_miss_count] =&gt; 201
[file_entries] =&gt; Array
(
[1] =&gt; Array
(
[file_name] =&gt; c:\inetpub\wwwroot\checkcache.php
[add_time] =&gt; 17356
[use_time] =&gt; 7
[last_check] =&gt; 10
[hit_count] =&gt; 454
[function_count] =&gt; 0
[class_count] =&gt; 1
)
[2] =&gt; Array (...iterates for each cached file)
)
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_ocache_meminfo

(PECL wincache &gt;= 1.0.0)

wincache_ocache_meminfo —
Extrae información sobre la utilización del caché opcode

### Descripción

**wincache_ocache_meminfo**(): [array](#language.types.array)|[false](#language.types.singleton)

Extrae información sobre la utilización de la memoria por el caché opcode.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Tabla de metadatos sobre la utilización de la memoria caché opcode o **[false](#constant.false)** si ocurre un error

La tabla devuelta por esta función contiene los siguientes elementos:

    -

      memory_total - Cantidad de memoria en bytes, asignada para el caché opcode



    -

      memory_free - Cantidad de memoria libre en bytes, disponible para el caché opcode



    -

      num_used_blks - Número de bloques de memoria utilizados por el caché opcode



    -

      num_free_blks - Número de bloques de memoria libres disponibles para el caché opcode



    -

      memory_overhead - Cantidad de memoria en bytes utilizada para la estructura interna del caché opcode


**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.0.0.

### Ejemplos

    **Ejemplo #1 Un ejemplo de wincache_ocache_meminfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_ocache_meminfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[memory_total] =&gt; 134217728
[memory_free] =&gt; 112106972
[num_used_blks] =&gt; 15469
[num_free_blks] =&gt; 4
[memory_overhead] =&gt; 247600
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_refresh_if_changed

(PECL wincache &gt;= 1.0.0)

wincache_refresh_if_changed —
Actualiza las entradas del caché para los archivos almacenados en caché

### Descripción

**wincache_refresh_if_changed**([array](#language.types.array) $files = NULL): [bool](#language.types.boolean)

Actualiza las entradas del caché para los archivos cuyos nombres se han pasado en los
argumentos de entrada. Si no se especifica ningún argumento, entonces se actualizan todas las entradas del caché.

### Parámetros

     files


       Array de nombres de archivos para los archivos que necesitan ser actualizados.
       Se puede usar una ruta de archivo absoluta o relativa.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

WinCache realiza verificaciones regulares en los archivos almacenados en caché para
asegurarse de que, si un archivo ha cambiado, la entrada correspondiente en la memoria caché
se actualice. Por defecto, esta verificación se realiza cada 30 segundos.
Si, por ejemplo, un script PHP actualiza otro script PHP donde se almacenan las configuraciones
de la aplicación, entonces puede ocurrir que, después de que los cambios de configuración se hayan guardado,
la aplicación siga utilizando los parámetros antiguos durante algún tiempo hasta que el caché se actualice.
En este caso, es preferible actualizar el caché justo después de que el archivo haya sido modificado.
El ejemplo siguiente muestra cómo hacerlo.

    **Ejemplo #1 Un ejemplo de wincache_refresh_if_changed()**

&lt;?php
$filename = 'C:\inetpub\wwwroot\config.php';
$handle = fopen($filename, 'w+');
if ($handle === FALSE) die('Failed to open file '.$filename.' for writing');
fwrite($handle, '&lt;?php $setting=something; ?&gt;');
fclose($handle);
wincache_refresh_if_changed(array($filename));
?&gt;

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

# wincache_rplist_fileinfo

(PECL wincache &gt;= 1.0.0)

wincache_rplist_fileinfo — Recupera información de la caché sobre una ruta de archivo resuelta

### Descripción

**wincache_rplist_fileinfo**([bool](#language.types.boolean) $summaryonly = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre las asignaciones almacenadas en caché entre rutas de archivos relativas y sus correspondencias en rutas de archivos absolutas

### Parámetros

     summaryonly








### Valores devueltos

Un array de metadatos con información sobre la caché de una ruta de archivo resuelta o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      total_file_count - número total de rutas de archivos almacenadas en la caché



    -

      rplist_entries - un array que contiene la información sobre las rutas de archivo presentes en la caché:



       <li class="listitem">

         resolve_path - ruta hacia el archivo



       -

         subkey_data - ruta absoluta correspondiente





    </li>

### Ejemplos

    **Ejemplo #1 Ejemplo con wincache_rplist_fileinfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_rplist_fileinfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[total_file_count] =&gt; 5
[rplist_entries] =&gt; Array
(
[1] =&gt; Array
(
[resolve_path] =&gt; checkcache.php
[subkey_data] =&gt; c:\inetpub\wwwroot|c:\inetpub\wwwroot\checkcache.php
)

            [2] =&gt; Array (...iterates for each cached file)
        )

)

### Ver también

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_rplist_meminfo

(PECL wincache &gt;= 1.0.0)

wincache_rplist_meminfo — Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

### Descripción

**wincache_rplist_meminfo**(): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de metadatos que describe el uso de la memoria
por la caché de ruta de archivo resuelta. o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      memory_total - cantidad de memoria, en bytes, asignada
      a la caché de rutas de archivos resueltas



    -

      memory_free - cantidad de memoria libre, en bytes, disponible para la
      caché de rutas de archivos resueltas



    -

      num_used_blks - número de bloques de memoria usados por la caché de rutas
      de archivos resueltas



    -

      num_free_blks - número de bloques de memoria libres para la caché
      de rutas de archivos resueltas



    -

      memory_overhead - cantidad de memoria, en bytes, usada para la
      estructura interna de la caché de rutas de archivos resueltas


### Ejemplos

    **Ejemplo #1 Ejemplo con wincache_rplist_meminfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_rplist_meminfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[memory_total] =&gt; 9437184
[memory_free] =&gt; 9416744
[num_used_blks] =&gt; 23
[num_free_blks] =&gt; 1
[memory_overhead] =&gt; 416
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_scache_info

(PECL wincache &gt;= 1.1.0)

wincache_scache_info — Recupera información sobre archivos almacenados en el caché de sesión.

### Descripción

**wincache_scache_info**([bool](#language.types.boolean) $summaryonly = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre el contenido del caché de sesión y su utilización.

### Parámetros

     summaryonly


       Controla si el array devuelto debe contener información sobre entradas
       individuales del caché además del resumen del caché.





### Valores devueltos

Un array de metadatos sobre el caché para esta sesión
o **[false](#constant.false)** si ocurre un error

     El array devuelto por esta función contiene los siguientes elementos:



    -

      total_cache_uptime - duración total (en segundos) de activación del caché



    -

      total_item_count - número total de elementos contenidos actualmente en el caché



    -

      is_local_cache - **[true](#constant.true)** si los metadatos del caché son para una instancia
      de caché local, **[false](#constant.false)** si son para un caché global



    -

      total_hit_count - número total de veces que los datos han sido servidos
      desde el caché



    -

      total_miss_count - número total de veces que los datos no se encontraron en
      el caché



    -

      scache_entries - un array que contiene información sobre los elementos almacenados en caché:



       <li class="listitem">

         key_name - nombre de la clave usada para almacenar los datos



       -

         value_type - tipo del valor almacenado



       -

         use_time - tiempo, en segundos, desde el último acceso del archivo desde el caché opcode



       -

         last_check - tiempo, en segundos, desde la última vez que el archivo fue verificado
         para detectar cambios



       -

         ttl_seconds - tiempo restante antes de la eliminación de los datos del caché, 0 significa que nunca serán eliminados



       -

         age_seconds - tiempo transcurrido desde el momento en que se agregaron los datos en la caché



       -

         hitcount - número de veces que los datos han sido servidos desde el caché





    </li>

### Ejemplos

    **Ejemplo #1 Ejemplo con wincache_scache_info()**

&lt;pre&gt;
&lt;?php
print_r(wincache_scache_info());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[total_cache_uptime] =&gt; 17357
[total_file_count] =&gt; 121
[total_hit_count] =&gt; 36562
[total_miss_count] =&gt; 201
[scache_entries] =&gt; Array
(
[1] =&gt; Array
(
[file_name] =&gt; c:\inetpub\wwwroot\checkcache.php
[add_time] =&gt; 17356
[use_time] =&gt; 7
[last_check] =&gt; 10
[hit_count] =&gt; 454
[function_count] =&gt; 0
[class_count] =&gt; 1
)
[2] =&gt; Array (...iterates for each cached file)
)
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_scache_meminfo

(PECL wincache &gt;= 1.1.0)

wincache_scache_meminfo —
Recupera información sobre el uso de memoria caché de sesión

### Descripción

**wincache_scache_meminfo**(): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre el uso de memoria caché de la sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array de metadatos sobre el uso de la memoria caché de sesión o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      memory_total - cantidad de memoria en bytes asignado para la caché de sesión



    -

      memory_free - cantidad de memoria libre en bytes disponible para la caché de sesión



    -

      num_used_blks - número de bloques de memoria utilizados por el caché de la sesión



    -

      num_free_blks - número de bloques disponibles en la memoria de la caché de sesión



    -

      memory_overhead - cantidad de memoria en bytes utilizado para las estructuras de sesión de caché interna


### Ejemplos

    **Ejemplo #1 Ejemplo de wincache_scache_meminfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_scache_meminfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[memory_total] =&gt; 5242880
[memory_free] =&gt; 5215056
[num_used_blks] =&gt; 6
[num_free_blks] =&gt; 3
[memory_overhead] =&gt; 176
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

# wincache_ucache_add

(PECL wincache &gt;= 1.1.0)

wincache_ucache_add —
Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

### Descripción

**wincache_ucache_add**([string](#language.types.string) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

**wincache_ucache_add**([array](#language.types.array) $values, [mixed](#language.types.mixed) $unused = NULL, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

Añade una variable al caché de usuario, solo si no existe ya en el caché. La variable permanecerá en el caché mientras no se alcance el tiempo de expiración o hasta que no se elimine con la función
[wincache_ucache_delete()](#function.wincache-ucache-delete) o la función [wincache_ucache_clear()](#function.wincache-ucache-clear).

### Parámetros

     key


       Almacena la variable usando el nombre key. Si una variable
       correspondiente a la misma clave ya está presente en el caché, la función
       fallará y devolverá **[false](#constant.false)**. El parámetro key es sensible a mayúsculas y minúsculas. Para sobrescribir este valor, si key está presente,
       use la función [wincache_ucache_set()](#function.wincache-ucache-set) en su lugar.
       key también puede ser un array de pares nombre =&gt; valor donde
       los nombres serán usados como claves. Este formato puede ser usado para añadir
       múltiples valores en el caché en una sola operación.






     value


       El valor de la variable a almacenar. El parámetro Value
       soporta todos los tipos de datos, excepto recursos, como punteros de archivos.
       Este parámetro será ignorado si el primer argumento es un array. Generalmente, se debe
       pasar el valor **[null](#constant.null)** al parámetro value cuando se usa un array para el parámetro key. Si el parámetro value
       es un objeto, o un array que contiene objetos, entonces los objetos serán serializados. Consulte la función [__sleep()](#object.sleep)
       para más detalles sobre la serialización de objetos.






     values


       Array asociativo de claves y valores.






     ttl


       Duración de vida de la variable en el caché, en segundos. Después del tiempo especificado
       por el parámetro ttl, la variable almacenada será eliminada del caché. Este parámetro toma, como
       valor por defecto, cero (0), lo que significa que la variable
       permanecerá en el caché hasta que no sea explícitamente eliminada usando la función [wincache_ucache_delete()](#function.wincache-ucache-delete)
       o la función [wincache_ucache_clear()](#function.wincache-ucache-clear).





### Valores devueltos

Si el parámetro key es una [string](#language.types.string), la función devuelve
**[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si ocurre un error.

Si el parámetro key es un array, la función devuelve:

    -

      Si todas las parejas nombre =&gt; valor del array pueden ser definidas, la función devolverá
      un array vacío;



    -

      Si ninguna de las parejas nombre =&gt; valor del array puede ser definida, la función devolverá
      **[false](#constant.false)** ;



    -

      Si algunas pueden ser definidas, y otras no, la función devolverá un array de parejas
      nombre =&gt; valor que no han podido ser definidas en el caché de usuario.


### Ejemplos

    **Ejemplo #1 Ejemplo con wincache_ucache_add()** y el parámetro key en forma de [string](#language.types.string)

&lt;?php
$bar = 'BAR';
var_dump(wincache_ucache_add('foo', $bar));
var_dump(wincache_ucache_add('foo', $bar));
var_dump(wincache_ucache_get('foo'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)
string(3) "BAR"

    **Ejemplo #2 Ejemplo con wincache_ucache_add()** y el parámetro key en forma de [array](#language.types.array)

&lt;?php
$colors_array = array('green' =&gt; '5', 'Blue' =&gt; '6', 'yellow' =&gt; '7', 'cyan' =&gt; '8');
var_dump(wincache_ucache_add($colors_array));
var_dump(wincache_ucache_add($colors_array));
var_dump(wincache_ucache_get('Blue'));
?&gt;

    El ejemplo anterior mostrará:

array(0) { }
array(4) {
["green"]=&gt; int(-1)
["Blue"]=&gt; int(-1)
["yellow"]=&gt; int(-1)
["cyan"]=&gt; int(-1)
}
string(1) "6"

### Ver también

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [__sleep()](#object.sleep)

# wincache_ucache_cas

(PECL wincache &gt;= 1.1.0)

wincache_ucache_cas —
Compara la variable con el valor antiguo y le asigna un nuevo valor a este

### Descripción

**wincache_ucache_cas**([string](#language.types.string) $key, [int](#language.types.integer) $old_value, [int](#language.types.integer) $new_value): [bool](#language.types.boolean)

Compara la variable asociada con la key con old_value
y si coincide entonces asigna el new_value a este.

### Parámetros

     key


       El parámetro key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas.






     old_value


       Valor anterior de la variable apuntada por key en la memoria caché del usuario.
       El valor debe ser de tipo long, en caso contrario la función devuelve
       **[false](#constant.false)**.






     new_value


       El nuevo valor que se asigna a una variable
       New value which will get assigned to variable indicado por la key si se
       encuentra una coincidencia. El valor debe ser de tipo long, en caso contrario
       la función devolverá **[false](#constant.false)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_cas()**

&lt;?php
wincache_ucache_set('counter', 2922);
var_dump(wincache_ucache_cas('counter', 2922, 1));
var_dump(wincache_ucache_get('counter'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
int(1)

### Ver también

    - [wincache_ucache_inc()](#function.wincache-ucache-inc) - Incrementa el valor asociado a la clave

    - [wincache_ucache_dec()](#function.wincache-ucache-dec) - Disminuye el valor asociado a la clave

# wincache_ucache_clear

(PECL wincache &gt;= 1.1.0)

wincache_ucache_clear —
Elimina todo el contenido de la caché del usuario

### Descripción

**wincache_ucache_clear**(): [bool](#language.types.boolean)

Borra o elimina todos los valores almacenados en la caché del usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_clear()**

&lt;?php
wincache_ucache_set('green', 1);
wincache_ucache_set('red', 2);
wincache_ucache_set('orange', 4);
wincache_ucache_set('blue', 8);
wincache_ucache_set('cyan', 16);
$array1 = array('green', 'red', 'orange', 'blue', 'cyan');
var_dump(wincache_ucache_get($array1));
var_dump(wincache_ucache_clear());
var_dump(wincache_ucache_get($array1));
?&gt;

    El ejemplo anterior mostrará:

array(5) { ["green"]=&gt; int(1)
["red"]=&gt; int(2)
["orange"]=&gt; int(4)
["blue"]=&gt; int(8)
["cyan"]=&gt; int(16) }
bool(true)
bool(false)

### Ver también

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_add()](#function.wincache-ucache-add) - Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

# wincache_ucache_dec

(PECL wincache &gt;= 1.1.0)

wincache_ucache_dec —
Disminuye el valor asociado a la clave

### Descripción

**wincache_ucache_dec**([string](#language.types.string) $key, [int](#language.types.integer) $dec_by = 1, [bool](#language.types.boolean) &amp;$success = ?): [mixed](#language.types.mixed)

Disminuye el valor asociado a la key por 1 o como se especifica
por dec_by.

### Parámetros

     key


       El parámetro key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas.






     dec_by


       El valor de la variable asociada por el que conseguirá que key disminuya.
       Si el argumento es un número de punto flotante se truncará al integer más cercano. La variable asociada
       con la key debe ser de tipo long, en caso contrario
       la función falla y devolverá **[false](#constant.false)**.






     success


       Será establecido a **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** en caso de error.





### Valores devueltos

Devuelve el valor decrementado en caso de éxito y **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_dec()**

&lt;?php
wincache_ucache_set('counter', 1);
var_dump(wincache_ucache_dec('counter', 2923, $success));
var_dump($success);
?&gt;

    El ejemplo anterior mostrará:

int(2922)
bool(true)

### Ver también

    - [wincache_ucache_inc()](#function.wincache-ucache-inc) - Incrementa el valor asociado a la clave

    - [wincache_ucache_cas()](#function.wincache-ucache-cas) - Compara la variable con el valor antiguo y le asigna un nuevo valor a este

# wincache_ucache_delete

(PECL wincache &gt;= 1.1.0)

wincache_ucache_delete —
Elimina las variables de la memoria caché del usuario

### Descripción

**wincache_ucache_delete**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

Elimina los elementos de la caché del usuario apuntado por key.

### Parámetros

     key


       El parámetro key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas. key puede ser un
       array de claves.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si key es un array, entonces la función devuelve **[false](#constant.false)**
si cada elemento del array no se borra de la memoria caché del usuario, en caso contrario devuelve un
array que consta de todas las claves que se eliminan.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_delete()** con key como un string

&lt;?php
wincache_ucache_set('foo', 'bar');
var_dump(wincache_ucache_delete('foo'));
var_dump(wincache_ucache_exists('foo'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

    **Ejemplo #2 Usingwincache_ucache_delete()** con key como un array

&lt;?php
$array1 = array('green' =&gt; '5', 'blue' =&gt; '6', 'yellow' =&gt; '7', 'cyan' =&gt; '8');
wincache_ucache_set($array1);
$array2 = array('green', 'blue', 'yellow', 'cyan');
var_dump(wincache_ucache_delete($array2));
?&gt;

    El ejemplo anterior mostrará:

array(4) { [0]=&gt; string(5) "green"
[1]=&gt; string(4) "Blue"
[2]=&gt; string(6) "yellow"
[3]=&gt; string(4) "cyan" }

    **Ejemplo #3 Using wincache_ucache_delete()** con key como un array donde algunos elementos no se pueden eliminar

&lt;?php
$array1 = array('green' =&gt; '5', 'blue' =&gt; '6', 'yellow' =&gt; '7', 'cyan' =&gt; '8');
wincache_ucache_set($array1);
$array2 = array('orange', 'red', 'yellow', 'cyan');
var_dump(wincache_ucache_delete($array2));
?&gt;

    El ejemplo anterior mostrará:

array(2) { [0]=&gt; string(6) "yellow"
[1]=&gt; string(4) "cyan" }

### Ver también

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_add()](#function.wincache-ucache-add) - Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

# wincache_ucache_exists

(PECL wincache &gt;= 1.1.0)

wincache_ucache_exists —
Comprueba si una variable existe en la caché del usuario

### Descripción

**wincache_ucache_exists**([string](#language.types.string) $key): [bool](#language.types.boolean)

Comprueba si una variable con la key existe en la caché de usuario o no.

### Parámetros

     key


       La key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas.





### Valores devueltos

Devuelve **[true](#constant.true)** si la variable con la key existe,
en caso contrario devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_exists()**

&lt;?php
if (!wincache_ucache_exists('green'))
wincache_ucache_set('green', 1);
var_dump(wincache_ucache_exists('green'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)

### Ver también

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_add()](#function.wincache-ucache-add) - Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

# wincache_ucache_get

(PECL wincache &gt;= 1.1.0)

wincache_ucache_get —
Obtiene una variable almacenada en la caché del usuario

### Descripción

**wincache_ucache_get**([mixed](#language.types.mixed) $key, [bool](#language.types.boolean) &amp;$success = ?): [mixed](#language.types.mixed)

Obtiene una variable almacenada en la caché del usuario.

### Parámetros

     key


       La key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas. key puede ser
       un array de claves. En este caso el valor de retorno será un array de valores de cada elemento en
       el array key. Si un objeto, o un array que contiene objetos,
       es retornado, entonces los objetos serán decodificados. Véase
       [__wakeup()](#object.wakeup) para más detalles sobre decodificar objetos.






     success


       Se establecerá en **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** en caso de error.





### Valores devueltos

Si key es un string, la función devuelve el valor de la variable almacenada con esa clave.
El parámetro success es establecido a **[true](#constant.true)** en caso de éxito y
a **[false](#constant.false)** en caso de error.

El parámetro key es un array, el parámetro success
siempre se establece en **[true](#constant.true)**. El array devuelto (pares nombre =&gt; valor) will
contendrá sólo aquellos pares nombre =&gt; valor en donde la operación de obtención de caché de
usuario se ha realizado correctamente. Si ninguna de las claves del array encuentran una coincidencia
en la caché del usuario, un array vacío será devuelto.

### Ejemplos

    **Ejemplo #1 wincache_ucache_get()** con key como un string

&lt;?php
wincache_ucache_add('color', 'blue');
var_dump(wincache_ucache_get('color', $success));
var_dump($success);
?&gt;

    El ejemplo anterior mostrará:

string(4) "blue"
bool(true)

    **Ejemplo #2 wincache_ucache_get()** con key como un array

&lt;?php
$array1 = array('green' =&gt; '5', 'Blue' =&gt; '6', 'yellow' =&gt; '7', 'cyan' =&gt; '8');
wincache_ucache_set($array1);
$array2 = array('green', 'Blue', 'yellow', 'cyan');
var_dump(wincache_ucache_get($array2, $success));
var_dump($success);
?&gt;

    El ejemplo anterior mostrará:

array(4) { ["green"]=&gt; string(1) "5"
["Blue"]=&gt; string(1) "6"
["yellow"]=&gt; string(1) "7"
["cyan"]=&gt; string(1) "8" }
bool(true)

### Ver también

    - [wincache_ucache_add()](#function.wincache-ucache-add) - Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [__wakeup()](#object.wakeup)

# wincache_ucache_inc

(PECL wincache &gt;= 1.1.0)

wincache_ucache_inc —
Incrementa el valor asociado a la clave

### Descripción

**wincache_ucache_inc**([string](#language.types.string) $key, [int](#language.types.integer) $inc_by = 1, [bool](#language.types.boolean) &amp;$success = ?): [mixed](#language.types.mixed)

Incrementa el valor asociado a la key por 1 o como se especifica
por inc_by.

### Parámetros

     key


       La key que se utiliza para almacenar la variable en la caché.
       key distingue mayúsculas de minúsculas.






     inc_by


       El valor por el cual la variable asociada con la key será incrementada.
       Si el argumento es un número de punto flotante se truncará al integer más cercano. La variable
       asociada con la key debe ser de tipo long, de lo contrario
       la función falla y devuelve **[false](#constant.false)**.






     success


       Se establecerá en **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** en caso de error.





### Valores devueltos

Devuelve el valor incrementado en caso de éxito y **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Usando wincache_ucache_inc()**

&lt;?php
wincache_ucache_set('counter', 1);
var_dump(wincache_ucache_inc('counter', 2921, $success));
var_dump($success);
?&gt;

    El ejemplo anterior mostrará:

int(2922)
bool(true)

### Ver también

    - [wincache_ucache_dec()](#function.wincache-ucache-dec) - Disminuye el valor asociado a la clave

    - [wincache_ucache_cas()](#function.wincache-ucache-cas) - Compara la variable con el valor antiguo y le asigna un nuevo valor a este

# wincache_ucache_info

(PECL wincache &gt;= 1.1.0)

wincache_ucache_info —
Recupera información sobre los datos almacenados en la caché del usuario

### Descripción

**wincache_ucache_info**([bool](#language.types.boolean) $summaryonly = **[false](#constant.false)**, [string](#language.types.string) $key = NULL): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre los datos almacenados en la caché del usuario.

### Parámetros

     summaryonly


       Controla si el array devuelto contiene información sobre las entradas de caché individuales
       junto con el resumen caché del usuario.






     key


       La clave de una entrada en la caché del usuario. Si se especifica a continuación, el array
       devuelto contendrá información sólo acerca de que la entrada de caché. Si no se especifica y
       summaryonly es establecido a **[false](#constant.false)** entonces el array devuelto contendrá
       información sobre todas las entradas en la caché.





### Valores devueltos

Array de metadatos sobre caché de usuario o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      total_cache_uptime - tiempo total en segundos que el caché de usuario ha sido activo



    -

      total_item_count - número total de elementos que están actualmente en la caché del usuario



    -

      is_local_cache - true si el caché es de metadatos para una instancia de caché local,
       false si los metadatos es para el la caché global



    -

      total_hit_count - número de veces que los datos se han servido de la memoria caché



    -

      total_miss_count - número de veces que los datos no se han encontrado en la caché



    -

      ucache_entries - un array que contiene la información sobre todos los elementos almacenados en caché:



       <li class="listitem">

         key_name - nombre de la clave que se utiliza para almacenar los datos



       -

         value_type - tipo de valor almacenado por la clave



       -

         use_time - tiempo en segundos desde el fichero ha sido visitado en la caché de código de operación



       -

         last_check - tiempo en segundos desde el fichero ha sido chequeado para modificaciones



       -

         is_session - indica si los datos son una variable de sesión



       -

         ttl_seconds - el tiempo restante de los datos a vivir en la memoria caché, 0 significa infinito



       -

         age_seconds - tiempo transcurrido desde el momento que los datos han sido añadidos en la caché



       -

         hitcount - número de veces que los datos se han servido de la memoria caché





    </li>

### Ejemplos

    **Ejemplo #1 Usar wincache_ucache_info()**

&lt;?php
wincache_ucache_get('green');
wincache_ucache_set('green', 2922);
wincache_ucache_get('green');
wincache_ucache_get('green');
wincache_ucache_get('green');
print_r(wincache_ucache_info());
?&gt;

    El ejemplo anterior mostrará:

Array
( ["total_cache_uptime"] =&gt; int(0)
["is_local_cache"] =&gt; bool(false)
["total_item_count"] =&gt; int(1)
["total_hit_count"] =&gt; int(3)
["total_miss_count"] =&gt; int(1)
["ucache_entries"] =&gt; Array(1)
( [1] =&gt; Array(6)
(
["key_name"] =&gt; string(5) "green"
["value_type"] =&gt; string(4) "long"
["is_session"] =&gt; int(0)
["ttl_seconds"] =&gt; int(0)
["age_seconds"] =&gt; int(0)
["hitcount"] =&gt; int(3)
)
)
)

### Ver también

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_ocache_meminfo()](#function.wincache-ocache-meminfo) - Extrae información sobre la utilización del caché opcode

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_ucache_meminfo

(PECL wincache &gt;= 1.1.0)

wincache_ucache_meminfo —
Recupera información sobre el uso de memoria caché de usuario

### Descripción

**wincache_ucache_meminfo**(): [array](#language.types.array)|[false](#language.types.singleton)

Recupera información sobre el uso de memoria caché del usuario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Array de metadatos sobre el uso de la memoria caché de usuario o **[false](#constant.false)** si ocurre un error

El array devuelto por esta función contiene los siguientes elementos:

    -

      memory_total - cantidad de memoria en bytes asignado para la caché de usuario



    -

      memory_free - cantidad de memoria libre en bytes disponible para la caché de usuario



    -

      num_used_blks - número de bloques de memoria utilizados por el caché del usuario



    -

      num_free_blks - número de bloques disponibles en la memoria de la caché del usuario



    -

      memory_overhead - cantidad de memoria en bytes utilizado para las estructuras de los usuarios de caché interna


### Ejemplos

    **Ejemplo #1 Ejemplo de wincache_ucache_meminfo()**

&lt;pre&gt;
&lt;?php
print_r(wincache_ucache_meminfo());
?&gt;
&lt;/pre&gt;

    El ejemplo anterior mostrará:

Array
(
[memory_total] =&gt; 5242880
[memory_free] =&gt; 5215056
[num_used_blks] =&gt; 6
[num_free_blks] =&gt; 3
[memory_overhead] =&gt; 176
)

### Ver también

    - [wincache_fcache_fileinfo()](#function.wincache-fcache-fileinfo) - Extrae información sobre los archivos almacenados en la caché de archivos

    - [wincache_fcache_meminfo()](#function.wincache-fcache-meminfo) - Recupera información sobre el uso de memoria caché de ficheros

    - [wincache_ocache_fileinfo()](#function.wincache-ocache-fileinfo) - Extrae información sobre los archivos almacenados en el caché opcode

    - [wincache_rplist_fileinfo()](#function.wincache-rplist-fileinfo) - Recupera información de la caché sobre una ruta de archivo resuelta

    - [wincache_rplist_meminfo()](#function.wincache-rplist-meminfo) - Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta

    - [wincache_refresh_if_changed()](#function.wincache-refresh-if-changed) - Actualiza las entradas del caché para los archivos almacenados en caché

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

    - [wincache_scache_meminfo()](#function.wincache-scache-meminfo) - Recupera información sobre el uso de memoria caché de sesión

# wincache_ucache_set

(PECL wincache &gt;= 1.1.0)

wincache_ucache_set — Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

### Descripción

**wincache_ucache_set**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

**wincache_ucache_set**([array](#language.types.array) $values, [mixed](#language.types.mixed) $unused = NULL, [int](#language.types.integer) $ttl = 0): [bool](#language.types.boolean)

Añade una variable a la caché de usuario. Sobrescribe una variable si ya existe
en la caché. La variable así creada o actualizada permanecerá en la caché de usuario
mientras no se alcance el tiempo de expiración o hasta que no se elimine con la función
[wincache_ucache_delete()](#function.wincache-ucache-delete) o la función [wincache_ucache_clear()](#function.wincache-ucache-clear).

### Parámetros

     key


       Almacena la variable usando la clave key.
       Si una variable usando la misma clave key ya está presente,
       la función sobrescribirá el valor anterior con el nuevo. El parámetro key
       es sensible a mayúsculas y minúsculas. key también puede ser un
       array de pares nombre =&gt; valor donde los nombres serán usados como claves. Esto puede ser útil
       para añadir múltiples valores en la caché en una sola operación, evitando así las condiciones de carrera.






     value


       Valor de la variable a almacenar. El parámetro Value
       soporta todos los tipos de datos, excepto recursos, como punteros de archivos. Este parámetro
       es ignorado si el primer argumento es un array. Es convención pasar **[null](#constant.null)** como
       value cuando se usa un array en el parámetro key.
       Si el parámetro value es un objeto, o un array que contiene objetos,
       entonces todos los objetos serán serializados. Consulte la función [__sleep()](#object.sleep)
       para más detalles sobre la serialización de objetos.






     values


       Array asociativo de claves y valores.






     ttl


       Tiempo de vida de la variable en la caché, en segundos. Después del tiempo especificado
       por el parámetro ttl, la variable almacenada será eliminada de la caché de usuario.
       Este parámetro toma por defecto el valor cero (0), lo que significa que la variable
       permanecerá en la caché hasta que no sea explícitamente eliminada llamando a la función
       [wincache_ucache_delete()](#function.wincache-ucache-delete) o la función [wincache_ucache_clear()](#function.wincache-ucache-clear).





### Valores devueltos

Si key es un [string](#language.types.string), la función devolverá **[true](#constant.true)** en caso de éxito,
**[false](#constant.false)** si ocurre un error.

Si key es un array, la función devolverá:

    -

      Si todas las parejas nombre =&gt; valor del array han podido ser definidas,
      la función devolverá un array vacío.



    -

      Si ninguna de las parejas nombre =&gt; valor del array ha podido ser definida,
      la función devolverá **[false](#constant.false)**.



    -

      Si algunas parejas han sido definidas, y otras no, la función
      devolverá un array de parejas nombre =&gt; valor que no han podido ser definidas
      en la caché de usuario.


### Ejemplos

    **Ejemplo #1 Ejemplo con wincache_ucache_set()** y
     el parámetro key en forma de [string](#language.types.string)

&lt;?php
$bar = 'BAR';
var_dump(wincache_ucache_set('foo', $bar));
var_dump(wincache_ucache_get('foo'));
$bar1 = 'BAR1';
var_dump(wincache_ucache_set('foo', $bar1));
var_dump(wincache_ucache_get('foo'));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
string(3) "BAR"
bool(true)
string(3) "BAR1"

    **Ejemplo #2 Ejemplo con wincache_ucache_set()** y
     el parámetro key en forma de [array](#language.types.array)

&lt;?php
$colors_array = array('green' =&gt; '5', 'Blue' =&gt; '6', 'yellow' =&gt; '7', 'cyan' =&gt; '8');
var_dump(wincache_ucache_set($colors_array));
var_dump(wincache_ucache_set($colors_array));
var_dump(wincache_ucache_get('Blue'));
?&gt;

    El ejemplo anterior mostrará:

array(0) {}
array(0) {}
string(1) "6"

### Ver también

    - [wincache_ucache_add()](#function.wincache-ucache-add) - Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [__sleep()](#object.sleep)

# wincache_unlock

(PECL wincache &gt;= 1.1.0)

wincache_unlock —
Libera un bloqueo exclusivo sobre una clave dada

### Descripción

**wincache_unlock**([string](#language.types.string) $key): [bool](#language.types.boolean)

Libera un bloqueo exclusivo que se obtuvo en una clave dada mediante [wincache_lock()](#function.wincache-lock).
Si cualquier otro proceso fue bloqueado en espera de el bloqueo en esta clave, este proceso será capaz de
obtener el bloqueo.

**Advertencia**

    Usando [wincache_lock()](#function.wincache-lock) y **wincache_unlock()** puede causar bloqueos al
    ejecutar los scripts PHP en un entorno de multi-proceso, como FastCGI. No utilice estas funciones a menos
    que esté absolutamente seguro de que necesitan para su uso. Para la mayoría de las operaciones en la caché
    de usuario no es necesario el uso de estas funciones.

### Parámetros

     key


       Nombre de la llave en la caché para liberar el bloqueo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar wincache_unlock()**

&lt;?php
$fp = fopen("/tmp/lock.txt", "r+");
if (wincache_lock(“lock_txt_lock”)) { // hacer un bloqueo exclusivo
    ftruncate($fp, 0); // truncate file
fwrite($fp, "Escribir algo aquí\n");
    wincache_unlock(“lock_txt_lock”); // liberar el bloqueo
} else {
    echo "No se pudo obtener el bloqueo!";
}
fclose($fp);
?&gt;

### Ver también

    - [wincache_lock()](#function.wincache-lock) - Obtiene un bloqueo exclusivo en una clave dada

    - [wincache_ucache_set()](#function.wincache-ucache-set) - Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché

    - [wincache_ucache_get()](#function.wincache-ucache-get) - Obtiene una variable almacenada en la caché del usuario

    - [wincache_ucache_delete()](#function.wincache-ucache-delete) - Elimina las variables de la memoria caché del usuario

    - [wincache_ucache_clear()](#function.wincache-ucache-clear) - Elimina todo el contenido de la caché del usuario

    - [wincache_ucache_exists()](#function.wincache-ucache-exists) - Comprueba si una variable existe en la caché del usuario

    - [wincache_ucache_meminfo()](#function.wincache-ucache-meminfo) - Recupera información sobre el uso de memoria caché de usuario

    - [wincache_ucache_info()](#function.wincache-ucache-info) - Recupera información sobre los datos almacenados en la caché del usuario

    - [wincache_scache_info()](#function.wincache-scache-info) - Recupera información sobre archivos almacenados en el caché de sesión.

## Tabla de contenidos

- [wincache_fcache_fileinfo](#function.wincache-fcache-fileinfo) — Extrae información sobre los archivos almacenados en la caché de archivos
- [wincache_fcache_meminfo](#function.wincache-fcache-meminfo) — Recupera información sobre el uso de memoria caché de ficheros
- [wincache_lock](#function.wincache-lock) — Obtiene un bloqueo exclusivo en una clave dada
- [wincache_ocache_fileinfo](#function.wincache-ocache-fileinfo) — Extrae información sobre los archivos almacenados en el caché opcode
- [wincache_ocache_meminfo](#function.wincache-ocache-meminfo) — Extrae información sobre la utilización del caché opcode
- [wincache_refresh_if_changed](#function.wincache-refresh-if-changed) — Actualiza las entradas del caché para los archivos almacenados en caché
- [wincache_rplist_fileinfo](#function.wincache-rplist-fileinfo) — Recupera información de la caché sobre una ruta de archivo resuelta
- [wincache_rplist_meminfo](#function.wincache-rplist-meminfo) — Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta
- [wincache_scache_info](#function.wincache-scache-info) — Recupera información sobre archivos almacenados en el caché de sesión.
- [wincache_scache_meminfo](#function.wincache-scache-meminfo) — Recupera información sobre el uso de memoria caché de sesión
- [wincache_ucache_add](#function.wincache-ucache-add) — Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache
- [wincache_ucache_cas](#function.wincache-ucache-cas) — Compara la variable con el valor antiguo y le asigna un nuevo valor a este
- [wincache_ucache_clear](#function.wincache-ucache-clear) — Elimina todo el contenido de la caché del usuario
- [wincache_ucache_dec](#function.wincache-ucache-dec) — Disminuye el valor asociado a la clave
- [wincache_ucache_delete](#function.wincache-ucache-delete) — Elimina las variables de la memoria caché del usuario
- [wincache_ucache_exists](#function.wincache-ucache-exists) — Comprueba si una variable existe en la caché del usuario
- [wincache_ucache_get](#function.wincache-ucache-get) — Obtiene una variable almacenada en la caché del usuario
- [wincache_ucache_inc](#function.wincache-ucache-inc) — Incrementa el valor asociado a la clave
- [wincache_ucache_info](#function.wincache-ucache-info) — Recupera información sobre los datos almacenados en la caché del usuario
- [wincache_ucache_meminfo](#function.wincache-ucache-meminfo) — Recupera información sobre el uso de memoria caché de usuario
- [wincache_ucache_set](#function.wincache-ucache-set) — Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché
- [wincache_unlock](#function.wincache-unlock) — Libera un bloqueo exclusivo sobre una clave dada

# Compilación en Windows

## Tabla de contenidos

- [Prerrequisitos](#wincache.win32build.prereq)
- [Compilar y construir](#wincache.win32build.building)
- [Verificar la compilación](#wincache.win32build.verify)

    ## Prerrequisitos

    Para compilar la extensión WinCache, se necesitará:
    - el código fuente de PHP
    - un entorno de compilación PHP
    - el código fuente de WinCache

    Para completar los dos primeros pasos, siga la guía paso a paso
    [» Compilar PHP en Windows](https://wiki.php.net/internals/windows/stepbystepbuild).

    Para obtener el código fuente de WinCache, siga las instrucciones descritas
    en [Descargar extensiones PECL](#install.pecl.downloads).

    ## Compilar y construir

    Los siguientes pasos describen cómo compilar y construir WinCache en Windows:
    - Abra una ventana de comandos utilizada para compilar PHP

    - Vaya al directorio raíz donde se encuentran las fuentes de PHP

    - Ejecute el comando:

cscript.exe win32\build\buildconf.js

    -

      Ejecute el comando:


configure.bat --help

      La salida contendrá una nueva opción --enable-wincache.



    -

      Ejecute el comando:


configure.js [todas las opciones usadas para compilar PHP] --enable-wincache

      --enable-wincache es la única opción adicional requerida
      para asegurarse de que la extensión WinCache se compile correctamente.
      Esta opción permite construir WinCache y enlazarlo estáticamente con la
      DLL de PHP. Para construir la extensión como una DLL externa, use la
      opción --enable-wincache=shared.



    -

      Ejecute el comando:


nmake

## Verificar la compilación

    Los siguientes pasos describen cómo verificar que WinCache se ha compilado correctamente:




    -

      Vaya al directorio donde se construyen los archivos PHP.





    -

      Ejecute el comando:


php.exe -n -d extension=php_wincache.dll -re wincache

      Si WinCache se ha compilado correctamente, la salida de este comando listará
      las directivas INI y las funciones soportadas por WinCache.


- [Introducción](#intro.wincache)
- [Instalación/Configuración](#wincache.setup)<li>[Requerimientos](#wincache.requirements)
- [Instalación](#wincache.installation)
- [Configuración en tiempo de ejecución](#wincache.configuration)
- [Script de estadísticas WinCache](#wincache.stats)
- [Manejador de sesiones WinCache](#wincache.sessionhandler)
- [Redirecciones de funciones WinCache](#wincache.reroutes)
  </li>- [Funciones de WinCache](#ref.wincache)<li>[wincache_fcache_fileinfo](#function.wincache-fcache-fileinfo) — Extrae información sobre los archivos almacenados en la caché de archivos
- [wincache_fcache_meminfo](#function.wincache-fcache-meminfo) — Recupera información sobre el uso de memoria caché de ficheros
- [wincache_lock](#function.wincache-lock) — Obtiene un bloqueo exclusivo en una clave dada
- [wincache_ocache_fileinfo](#function.wincache-ocache-fileinfo) — Extrae información sobre los archivos almacenados en el caché opcode
- [wincache_ocache_meminfo](#function.wincache-ocache-meminfo) — Extrae información sobre la utilización del caché opcode
- [wincache_refresh_if_changed](#function.wincache-refresh-if-changed) — Actualiza las entradas del caché para los archivos almacenados en caché
- [wincache_rplist_fileinfo](#function.wincache-rplist-fileinfo) — Recupera información de la caché sobre una ruta de archivo resuelta
- [wincache_rplist_meminfo](#function.wincache-rplist-meminfo) — Recupera información sobre el uso de la memoria por la caché de ruta de archivo resuelta
- [wincache_scache_info](#function.wincache-scache-info) — Recupera información sobre archivos almacenados en el caché de sesión.
- [wincache_scache_meminfo](#function.wincache-scache-meminfo) — Recupera información sobre el uso de memoria caché de sesión
- [wincache_ucache_add](#function.wincache-ucache-add) — Añade una nueva variable al caché de usuario solo si la variable todavía no existe en el cache
- [wincache_ucache_cas](#function.wincache-ucache-cas) — Compara la variable con el valor antiguo y le asigna un nuevo valor a este
- [wincache_ucache_clear](#function.wincache-ucache-clear) — Elimina todo el contenido de la caché del usuario
- [wincache_ucache_dec](#function.wincache-ucache-dec) — Disminuye el valor asociado a la clave
- [wincache_ucache_delete](#function.wincache-ucache-delete) — Elimina las variables de la memoria caché del usuario
- [wincache_ucache_exists](#function.wincache-ucache-exists) — Comprueba si una variable existe en la caché del usuario
- [wincache_ucache_get](#function.wincache-ucache-get) — Obtiene una variable almacenada en la caché del usuario
- [wincache_ucache_inc](#function.wincache-ucache-inc) — Incrementa el valor asociado a la clave
- [wincache_ucache_info](#function.wincache-ucache-info) — Recupera información sobre los datos almacenados en la caché del usuario
- [wincache_ucache_meminfo](#function.wincache-ucache-meminfo) — Recupera información sobre el uso de memoria caché de usuario
- [wincache_ucache_set](#function.wincache-ucache-set) — Añade una variable a la caché de usuario y sobrescribe la variable si ya existe en la caché
- [wincache_unlock](#function.wincache-unlock) — Libera un bloqueo exclusivo sobre una clave dada
  </li>- [Compilación en Windows](#wincache.win32build)<li>[Prerrequisitos](#wincache.win32build.prereq)
- [Compilar y construir](#wincache.win32build.building)
- [Verificar la compilación](#wincache.win32build.verify)
  </li>
