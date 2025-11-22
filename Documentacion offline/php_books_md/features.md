# Características

# Identificación HTTP con PHP

Es posible utilizar la función [header()](#function.header) para solicitar
una identificación ("Authentication Required") al cliente,
generando así la aparición de una ventana
de solicitud de usuario y contraseña. Una vez que los
campos han sido completados, la URL será llamada de nuevo, con las [variables predefinidas](#reserved.variables)
PHP_AUTH_USER, PHP_AUTH_PW y
AUTH_TYPE conteniendo respectivamente el nombre de usuario, la contraseña y
el tipo de identificación. Estas variables predefinidas se encuentran en los arrays
[$\_SERVER](#reserved.variables.server).
_Solo_ los métodos de identificación simple ("Basic")
son soportados. Consulte la función
[header()](#function.header) para más información.

Aquí hay un ejemplo de script que fuerza la identificación del cliente
para acceder a una página:

**Ejemplo #1 Ejemplo de identificación HTTP simple**

&lt;?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Texto utilizado si el visitante usa el botón de cancelación';
    exit;
} else {
    echo "&lt;p&gt;Hola, {$\_SERVER['PHP_AUTH_USER']}.&lt;/p&gt;";
echo "&lt;p&gt;Su contraseña es {$\_SERVER['PHP_AUTH_PW']}.&lt;/p&gt;";
}
?&gt;

**Nota**:
**Nota de compatibilidad**

Sea muy cuidadoso al usar encabezados HTTP con PHP. Para
garantizar la máxima compatibilidad entre los navegadores, la palabra clave
"Basic" debe escribirse con una B mayúscula, y el texto de presentación
debe colocarse entre comillas dobles (no simples), y exactamente un espacio debe
preceder al código _401_ en el encabezado
_HTTP/1.0 401_. Los parámetros de autenticación deben
estar separados por comas.

En lugar de mostrar simplemente las variables globales PHP_AUTH_USER
y PHP_AUTH_PW, se preferirá
verificar la validez del nombre de usuario y la contraseña.
Por ejemplo, enviando esta información a una base de datos,
o buscando en un fichero dbm.

Desconfíe de los navegadores con errores, como Internet Explorer.
Parecen ser muy susceptibles en cuanto al orden de los encabezados.
Enviar el encabezado de identificación (_WWW-Authenticate_)
antes del código de HTTP/1.0 401 parece convenirle
hasta ahora.

**Nota**:
**Nota de configuración**

PHP utiliza la presencia de la directiva AuthType
para determinar si una identificación externa está activada.
Evite esta directiva de contexto si desea utilizar
la identificación de PHP (de lo contrario, ambas identificaciones se contradirán,
y fallarán).

Tenga en cuenta, sin embargo, que las manipulaciones anteriores no impiden
que cualquier persona con una página no identificada
robe las contraseñas de las páginas protegidas,
en el mismo servidor.

Netscape e Internet Explorer borrarán la caché de identificación del cliente
si reciben una respuesta 401. Esto permite desconectar
a un usuario, para forzarlo a ingresar nuevamente su nombre de cuenta
y su contraseña. Algunos programadores lo utilizan para proporcionar un
tiempo de expiración o, de lo contrario, proporcionan un botón de desconexión.

**Ejemplo #2 Identificación HTTP con nombre de usuario/contraseña forzada**

&lt;?php
function authenticate() {
header('WWW-Authenticate: Basic realm="Test Authentication System"');
header('HTTP/1.0 401 Unauthorized');
echo "Debe ingresar un identificador y una contraseña válidos para acceder
a este recurso.\n";
exit;
}

if ( !isset($_SERVER['PHP_AUTH_USER']) ||
     ($\_POST['SeenBefore'] == 1 &amp;&amp; $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
    authenticate();
} else {
    echo "&lt;p&gt;Bienvenido: " . htmlspecialchars($\_SERVER['PHP_AUTH_USER']) . "&lt;br /&gt;";
echo "Anterior: " . htmlspecialchars($_REQUEST['OldAuth']);
    echo "&lt;form action='' method='post'&gt;\n";
    echo "&lt;input type='hidden' name='SeenBefore' value='1' /&gt;\n";
    echo "&lt;input type='hidden' name='OldAuth' value=\"" . htmlspecialchars($\_SERVER['PHP_AUTH_USER']) . "\" /&gt;\n";
echo "&lt;input type='submit' value='Re Authenticate' /&gt;\n";
echo "&lt;/form&gt;&lt;/p&gt;\n";
}
?&gt;

Este comportamiento no es necesario por el estándar
de identificación HTTP Basic. Las pruebas con
Lynx han mostrado que no afectaba
la información de sesión al recibir un
mensaje de tipo 401. Esto hace que presionar la tecla "retroceso"
a un cliente Lynx
previamente identificado dé acceso directo a
la fuente. Sin embargo, el usuario puede usar la tecla
'\_' para destruir las identificaciones anteriores.

Para hacer funcional la autenticación HTTP con un servidor IIS con
la versión CGI de PHP, debe editar
su configuración "Directory Security". Haga clic
en "Edit" y active solo
"Anonymous Access", todos los demás campos deben
dejarse inactivos.

**Nota**:
**Nota para los usuarios de IIS:**

Para que la identificación HTTP funcione con IIS, la directiva PHP
[cgi.rfc2616_headers](#ini.cgi.rfc2616-headers)
debe establecerse en 0 (el valor por defecto).

# Cookies

PHP soporta las cookies HTTP de manera transparente.
Las cookies son un mecanismo de almacenamiento de información en el cliente,
y de lectura de dicha información. Este sistema permite identificar
y seguir a los visitantes. Se puede enviar una cookie con la función
[setcookie()](#function.setcookie) o [setrawcookie()](#function.setrawcookie). Las
cookies forman parte de los encabezados HTTP, lo que impone que
[setcookie()](#function.setcookie) sea llamada antes de cualquier visualización de texto.
Estas son las mismas limitaciones que para [header()](#function.header). Se pueden
utilizar las funciones [de bufferización de salida](#ref.outcontrol) para retrasar
la visualización de su script hasta que se haya decidido enviar una cookie o encabezados.

Todas las cookies enviadas al servidor por el cliente serán automáticamente
incluidas en un array superglobal
[$\_COOKIE](#reserved.variables.cookies) si [variables_order](#ini.variables-order) contiene "C".
Si se desea asignar múltiples valores a una sola cookie, se debe añadir
[] al nombre de la cookie.

Para más detalles, incluyendo notas sobre errores de los navegadores,
ver las funciones [setcookie()](#function.setcookie) y
[setrawcookie()](#function.setrawcookie).

# Sesiones

El soporte para sesiones en PHP consiste en una manera de preservar ciertos datos a través
de accesos posteriores, lo que permite crear aplicaciones más personalizadas
y mejorar el atractivo de un sitio web. Toda la información está
en la sección [Referencia de sesiones](#book.session).

# Gestión de cargas de ficheros

## Tabla de contenidos

- [Cargas de ficheros por método POST](#features.file-upload.post-method)
- [Explicación sobre los mensajes de errores de carga de ficheros](#features.file-upload.errors)
- [Errores clásicos](#features.file-upload.common-pitfalls)
- [Cargar múltiples ficheros simultáneamente](#features.file-upload.multiple)
- [Carga por método PUT](#features.file-upload.put-method)
- [Ver también](#features.file-upload.errors.seealso)

    ## Cargas de ficheros por método POST

    Esta funcionalidad permite a las personas subir tanto texto como ficheros binarios. Con las funciones de identificación y manipulación de ficheros de PHP, se tiene el control total para definir quién tiene derecho a subir, pero también qué se hará con el fichero una vez que se haya subido.

    PHP es capaz de recibir ficheros emitidos por un navegador conforme a la norma RFC-1867.

    **Nota**:
    **Notas de configuración**

    Véase también las directivas
    [file_uploads](#ini.file-uploads),
    [upload_max_filesize](#ini.upload-max-filesize),
    [upload_tmp_dir](#ini.upload-tmp-dir),
    [post_max_size](#ini.post-max-size) y
    [max_input_time](#ini.max-input-time) en php.ini

    PHP también soporta la carga por el método PUT como en el navegador Netscape Composer y Amaya del W3C. Consulte el capítulo sobre el
    [soporte del método PUT](#features.file-upload.put-method).

    **Ejemplo #1 Formulario de carga de fichero**

    Un formulario de carga de ficheros puede ser construido creando un formulario específico como este:

&lt;!-- El tipo de codificación de datos, enctype, DEBE ser especificado como se indica a continuación --&gt;
&lt;form enctype="multipart/form-data" action="_URL_" method="post"&gt;
&lt;!-- MAX_FILE_SIZE debe preceder al campo input de tipo file --&gt;
&lt;input type="hidden" name="MAX_FILE_SIZE" value="30000" /&gt;
&lt;!-- El nombre del elemento input determina el nombre en el array $\_FILES --&gt;
Envíe este fichero: &lt;input name="userfile" type="file" /&gt;
&lt;input type="submit" value="Enviar el fichero" /&gt;
&lt;/form&gt;

     _URL_ en el ejemplo anterior debe ser reemplazado y apuntar a un fichero PHP.




     El campo oculto MAX_FILE_SIZE (medido en bytes) debe preceder al campo input de tipo file y su valor representa el tamaño máximo aceptado del fichero por PHP. Este elemento de formulario debe ser siempre utilizado, ya que permite informar al usuario que la transferencia deseada es demasiado grande antes de llegar al final de la carga. Tenga en cuenta que este parámetro puede ser "engañado" fácilmente desde el lado del navegador, por lo que no se debe confiar en él, tratándose finalmente de una funcionalidad de conveniencia del lado del cliente. El parámetro PHP (del lado del servidor) sobre el tamaño máximo de un fichero cargado, no puede ser engañado.

**Nota**:

    Asegúrese de que su formulario de carga de fichero contenga enctype="multipart/form-data", de lo contrario, el fichero no será cargado.

La variable global [$\_FILES](#reserved.variables.files) contendrá toda la información sobre el fichero cargado. Su contenido se detalla en nuestro ejemplo a continuación. Tenga en cuenta que se supone que el nombre de la variable del fichero cargado es _userfile_, tal como se define en el formulario anterior, pero puede ser cualquier nombre.

     [$_FILES['userfile']['name']](#reserved.variables.files)


       El nombre original del fichero, tal como en la máquina del cliente web.






     [$_FILES['userfile']['type']](#reserved.variables.files)


       El tipo MIME del fichero, si el navegador ha proporcionado esta información. Por ejemplo, esto podría ser "image/gif". Este tipo mime no es verificado por PHP y, por lo tanto, no se debe tomar su valor para sincronizarse.






     [$_FILES['userfile']['size']](#reserved.variables.files)


       El tamaño, en bytes, del fichero cargado.






     [$_FILES['userfile']['tmp_name']](#reserved.variables.files)


       El nombre temporal del fichero que será cargado en la máquina servidor.






     [$_FILES['userfile']['error']](#reserved.variables.files)


       El [código de error](#features.file-upload.errors) asociado a la carga del fichero.






     [$_FILES['userfile']['full_path']](#reserved.variables.files)


       La ruta completa tal como se envía por el navegador. Este valor no contiene siempre una verdadera jerarquía de carpetas, y no se debe confiar en él. Disponible a partir de PHP 8.1.0.





El fichero cargado será almacenado temporalmente en el directorio temporal del sistema, a menos que se proporcione otro directorio con la directiva [upload_tmp_dir](#ini.upload-tmp-dir) del php.ini. El directorio por defecto del servidor puede ser cambiado en el entorno a través de la variable TMPDIR. Modificar el valor de esta variable con la función [putenv()](#function.putenv) en un script PHP será sin efecto. Esta variable de entorno también puede ser utilizada para asegurarse de que otras operaciones funcionen también en los ficheros cargados.

    **Ejemplo #2 Validación de carga de ficheros**



     Véase también las funciones [is_uploaded_file()](#function.is-uploaded-file) y [move_uploaded_file()](#function.move-uploaded-file) para más información. El siguiente ejemplo cargará un fichero desde un formulario.

&lt;?php
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($\_FILES['userfile']['name']);

echo '&lt;pre&gt;';
if (move_uploaded_file($\_FILES['userfile']['tmp_name'], $uploadfile)) {
echo "El fichero es válido, y ha sido cargado con éxito. Aquí hay más información :\n";
} else {
echo "Ataque potencial por carga de ficheros. Aquí hay más información :\n";
}

echo 'Aquí hay algunas informaciones de depuración :';
print_r($\_FILES);

echo '&lt;/pre&gt;';

?&gt;

El script PHP que recibe el fichero cargado debe poder gestionar el fichero de manera apropiada. Se puede utilizar la variable [$\_FILES['userfile']['size']](#reserved.variables.files) para recalar todos los ficheros que son demasiado grandes o demasiado pequeños. Se puede utilizar la variable [$\_FILES['userfile']['type']](#reserved.variables.files) para descartar los ficheros que no tienen el tipo correcto, pero utilizarla únicamente para una serie de verificaciones, ya que este valor está completamente bajo el control del cliente y no es verificado por PHP. Se puede utilizar la información en [$\_FILES['userfile']['error']](#reserved.variables.files) y adaptar su política en función de los [códigos de error](#features.file-upload.errors). Sea cual sea su política, se debe borrar el fichero del directorio temporal o moverlo.

Si no se selecciona ningún fichero en el formulario, PHP devolverá 0 en [$\_FILES['userfile']['size']](#reserved.variables.files) y nada en [$\_FILES['userfile']['tmp_name']](#reserved.variables.files).

El fichero será borrado automáticamente del directorio temporal al final del script, si no ha sido movido o renombrado.

**Ejemplo #3 Envío de un array de ficheros**

    PHP soporta los [arrays en HTML](#faq.html.arrays) así como con los ficheros.

&lt;form action="" method="post" enctype="multipart/form-data"&gt;
&lt;p&gt;Imágenes:
&lt;input type="file" name="pictures[]" /&gt;
&lt;input type="file" name="pictures[]" /&gt;
&lt;input type="file" name="pictures[]" /&gt;
&lt;input type="submit" value="Enviar" /&gt;
&lt;/p&gt;
&lt;/form&gt;

&lt;?php
foreach ($_FILES["pictures"]["error"] as $key =&gt; $error) {
    if ($error == UPLOAD_ERR_OK) {
$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
// basename() puede prevenir los ataques "filesystem traversal";
// otra validación/limpieza del nombre de fichero puede ser apropiada
$name = basename($\_FILES["pictures"]["name"][$key]);
move_uploaded_file($tmp_name, "data/$name");
}
}
?&gt;

La barra de progreso de carga puede ser implementada utilizando [la progresión de la carga a través de las sesiones](#session.upload-progress).

## Explicación sobre los mensajes de errores de carga de ficheros

PHP devuelve un código de error apropiado en el array de ficheros. Este código de error es accesible en el índice ['error'] del array, que es creado durante la carga por PHP. En otras palabras, el mensaje de error es accesible en la variable [$\_FILES['userfile']['error']](#reserved.variables.files).

El valor de este código de error es una de las constantes **[UPLOAD*ERR*\*](#constant.upload-err-cant-write)**.

## Errores clásicos

La variable MAX_FILE_SIZE no puede especificar un tamaño de fichero mayor que el tamaño que ha sido fijado por [upload_max_filesize](#ini.upload-max-filesize), en el php.ini. El valor por defecto es 2 megaoctetos.

Si se activa un límite de memoria, puede ser necesario un valor mayor de [memory_limit](#ini.memory-limit). Asegúrese de haber definido un valor para [memory_limit](#ini.memory-limit) lo suficientemente grande.

Si el valor de [max_execution_time](#ini.max-execution-time) es demasiado pequeño, el tiempo de ejecución del script puede exceder este valor. Asegúrese de haber definido un valor para max_execution_time lo suficientemente grande.

**Nota**:

    [max_execution_time](#ini.max-execution-time) afecta únicamente al tiempo de ejecución del script. El tiempo pasado en la actividad que aparece fuera de la ejecución del script como las llamadas al sistema con la función [system()](#function.system), la función [sleep()](#function.sleep), las consultas a las bases de datos, el tiempo empleado para realizar la carga del fichero, etc. no está incluido en el cálculo del tiempo máximo de ejecución del script.

**Advertencia**

    [max_input_time](#ini.max-input-time) define el tiempo máximo, en segundos, para que el script reciba los datos; esto incluye la carga del fichero. Para múltiples ficheros, o ficheros grandes, o incluso para usuarios en conexiones lentas, el valor por defecto de 60 segundos puede ser superado.

Si [post_max_size](#ini.post-max-size) está definido de manera demasiado baja, los ficheros grandes no podrán ser cargados. Asegúrese de definir post_max_size con un tamaño suficiente.

La configuración de [max_file_uploads](#ini.max-file-uploads) controla el número máximo de ficheros que pueden ser enviados en una solicitud. Si el número de ficheros enviados supera este límite, entonces [$\_FILES](#reserved.variables.files) dejará de recibir. Por ejemplo, si [max_file_uploads](#ini.max-file-uploads) vale 10, entonces [$\_FILES](#reserved.variables.files) nunca contendrá más de 10 entidades.

No validar los ficheros que se manipulan puede dar acceso a los usuarios a ficheros sensibles en otras carpetas.

Debido a la gran diversidad de sistemas, no se puede garantizar que los ficheros con nombres exóticos (por ejemplo, aquellos que contienen espacios) sean tratados correctamente.

El desarrollador no debe mezclar los campos input normales y los campos de carga en una misma variable (utilizando un nombre de input como foo[]).

## Cargar múltiples ficheros simultáneamente

La carga de múltiples ficheros es posible utilizando diferentes nombres en el atributo name de la etiqueta input.

También es posible cargar múltiples ficheros simultáneamente y obtener la información en forma de array. Para ello, se debe utilizar la sintaxis de array en los nombres de las etiquetas HTML, como se ha hecho con las selecciones múltiples y las casillas de verificación.

    **Ejemplo #1 Cargar múltiples ficheros simultáneamente**

&lt;form action="file-upload.php" method="post" enctype="multipart/form-data"&gt;
Envíe múltiples ficheros: &lt;br /&gt;
&lt;input name="userfile[]" type="file" /&gt;&lt;br /&gt;
&lt;input name="userfile[]" type="file" /&gt;&lt;br /&gt;
&lt;input type="submit" value="Enviar los ficheros" /&gt;
&lt;/form&gt;

Cuando el formulario anterior ha sido enviado, los arrays [$\_FILES['userfile']](#reserved.variables.files), [$\_FILES['userfile']['name']](#reserved.variables.files), y [$\_FILES['userfile']['size']](#reserved.variables.files) serán inicializados.

Por ejemplo, supongamos que los ficheros /home/test/review.html y /home/test/xwp.out han sido cargados. En este caso, [$\_FILES['userfile']['name'][0]](#reserved.variables.files) contiene review.html y [$\_FILES['userfile']['name'][1]](#reserved.variables.files) contiene xwp.out. De manera similar, [$\_FILES['userfile']['size'][0]](#reserved.variables.files) contendrá el tamaño del fichero review.html, etc.

[$\_FILES['userfile']['name'][0]](#reserved.variables.files), [$\_FILES['userfile']['tmp_name'][0]](#reserved.variables.files), [$\_FILES['userfile']['size'][0]](#reserved.variables.files) y [$\_FILES['userfile']['type'][0]](#reserved.variables.files) también son creados.

**Advertencia**

    El parámetro [max_file_uploads](#ini.max-file-uploads) limita el número de ficheros que pueden ser enviados en una solicitud. Se debe verificar que su formulario no intente enviar más ficheros en la solicitud de lo que permite este límite.








    **Ejemplo #2 Telever un directorio entero**



     En los campos de televersión de fichero HTML, es posible televersar un directorio entero con el atributo webkitdirectory. Esta funcionalidad es soportada en la mayoría de los navegadores modernos.




     Con la información full_path, es posible almacenar las rutas relativas o reconstruir la misma jerarquía de directorios en el directorio.

&lt;form action="file-upload.php" method="post" enctype="multipart/form-data"&gt;
Envíe este directorio:&lt;br /&gt;
&lt;input name="userfile[]" type="file" webkitdirectory multiple /&gt;
&lt;input type="submit" value="Enviar ficheros" /&gt;
&lt;/form&gt;

**Advertencia**

     El atributo webkitdirectory no es estándar y no está actualmente en proceso de estandarización. Esto no debe ser utilizado en sitios de producción orientados al Web: no funcionará para todos los usuarios. Puede haber grandes incompatibilidades entre las implementaciones y el comportamiento puede cambiar en el futuro.




     PHP analiza únicamente la información de las rutas relativas enviadas por el navegador/user-agent y transmite la información en el array [$_FILES](#reserved.variables.files). No hay garantías de que los valores en el array full_path contengan una verdadera estructura de directorios y la aplicación PHP no debe confiar en esta información.

## Carga por método PUT

PHP soporta el método HTTP PUT utilizado por los navegadores para almacenar ficheros en un servidor. Las solicitudes de tipo PUT son mucho más simples que las cargas de ficheros utilizando el tipo POST, y se parecen a:

    **Ejemplo #1 Método PUT para las cargas de ficheros**

PUT /path/filename.html HTTP/1.1

Normalmente, esto significa que el servidor remoto guardará los datos que siguen en el fichero: /path/filename.html de su disco. Esto no es, por supuesto, muy seguro permitir que Apache o PHP sobrescriban cualquier fichero de la arborescencia. Para evitar esto, primero se debe indicar al servidor que se desea que un script PHP dado gestione la solicitud. Con Apache, hay una directiva para ello: _Script_. Puede ser colocada en cualquier lugar del fichero de configuración de Apache. En general, los webmasters la colocan en el bloque &lt;Directory&gt;, o tal vez en el bloque &lt;VirtualHost&gt;. La siguiente línea hará muy bien el trabajo:

    **Ejemplo #2 Directiva Apache para la carga por método PUT**

Script PUT /put.php

Indica a Apache que debe enviar las solicitudes de carga por método PUT al script put.php. Por supuesto, esto presupone que se ha activado PHP para que maneje los ficheros de tipo .php, y que PHP está activo. El recurso de destino para todas las solicitudes PUT de este script debe ser el script mismo, y no el nombre del fichero que el fichero cargado debe tener.

Con PHP, se querría hacer algo como lo siguiente en su put.php. Esto copiará el contenido del fichero cargado en el fichero myputfile.ext en el servidor. Probablemente se querrá realizar algunas verificaciones y/o identificar al usuario antes de realizar esta copia de fichero.

    **Ejemplo #3 Guardado de ficheros HTTP PUT**

&lt;?php
/_ Los datos PUT llegan del flujo _/
$putdata = fopen("php://input", "r");

/_ Abre un fichero para escritura _/
$fp = fopen("myputfile.ext", "w");

/_ Lectura de los datos, 1 Ko a la vez y escritura en el fichero _/
while ($data = fread($putdata, 1024))
fwrite($fp, $data);

/_ Cierre del flujo _/
fclose($fp);
fclose($putdata);
?&gt;

## Ver también

    - [Seguridad de los ficheros](#security.filesystem)

# Uso de ficheros a distancia

Mientras el soporte de los gestores de URL ("URL fopen wrapper")
esté activado en el php.ini, con la opción **allow_url_fopen**,
se puede utilizar URL (HTTP y FTP)
con la mayoría de las funciones que utilizan un
nombre de fichero como argumento. Esto incluye especialmente
[include](#function.include),
[include_once](#function.include-once),
[require](#function.require) y
[require_once](#function.require-once)
(**allow_url_include** debe estar activo para utilizarlos).
Consulte [Protocolos y Envolturas soportados](#wrappers) para más información
sobre los protocolos soportados por PHP.

Por ejemplo, se puede seguir el siguiente ejemplo para abrir un
fichero en un servidor web distante, analizar los resultados
para extraer la información que se necesita, y luego
utilizarla en una consulta de base de datos, o
simplemente editar la información en el estilo del sitio.

**Ejemplo #1 Conocer el título de una página distante**

&lt;?php
$file = fopen ("http://www.example.com/", "r");
if (!$file) {
echo "&lt;p&gt;Imposible leer la página.\n";
exit;
}
while (!feof ($file)) {
    $line = fgets ($file, 1024);
/_ Esto solo funciona si las etiquetas Title están correctamente utilizadas _/
if (preg_match ("@\&lt;title\&gt;(.\*)\&lt;/title\&gt;@i", $line, $out)) {
        $title = $out[1];
        break;
    }
}
fclose($file);
?&gt;

También se puede escribir ficheros en un servidor FTP
siempre que se esté conectado con un
usuario con los derechos de acceso adecuados, aunque el
fichero no existiera aún.

Para conectarse con un usuario distinto de anónimo, se debe
especificar un nombre de usuario (y probablemente la contraseña) en
la URL, como ftp://user:password@ftp.example.com/path/to/file.
(Se puede utilizar el mismo tipo de sintaxis para acceder
a los ficheros vía HTTP cuando requieren una
identificación simple).

**Ejemplo #2 Almacenar datos en un servidor distante**

&lt;?php
$file = fopen ("ftp://ftp.example.com/incoming/outputfile", "w");
if (!$file) {
echo "&lt;p&gt;Imposible abrir el fichero distante para escritura.\n";
exit;
}
/_ Escritura de los datos. _/
fputs ($file, $_SERVER['HTTP_USER_AGENT'] . "\n");
fclose ($file);
?&gt;

**Nota**:

    Nota: se puede tener la idea, a partir del
    ejemplo anterior, de utilizar la misma técnica para
    escribir en un log distante, pero como se mencionó anteriormente
    solo se puede escribir en un nuevo fichero utilizando
    las funciones [fopen()](#function.fopen) con una URL. Para hacer logs
    distribuidos, se recomienda consultar la parte
    [syslog()](#function.syslog).

# Gestión de las conexiones

El estado de las conexiones se conserva internamente por PHP. Hay
cuatro estados posibles:

- 0 - NORMAL (normal)

- 1 - ABORTED (anulado)

- 2 - TIMEOUT (caducado)

- 3 - ABORTED and TIMEOUT (anulado y caducado)

Cuando un script PHP está en ejecución, el estado es NORMAL.
Si el cliente remoto se desconecta, el estado se convierte en ABORTED.
Una desconexión del cliente remoto generalmente es causada por los usuarios
presionando su botón STOP. Si se supera el tiempo máximo de ejecución de PHP, (ver [set_time_limit()](#function.set-time-limit)), el script adopta el estado TIMEOUT.

Asimismo, se puede decidir si se desea que la
desconexión de un cliente provoque la interrupción del
script. A veces es práctico que los scripts continúen
ejecutándose hasta el final, incluso si el cliente ya no está
presente para recibir la información. Sin embargo, por omisión, el script
se detendrá tan pronto como el cliente se desconecte.
Este comportamiento puede ser modificado con la directiva
**ignore_user_abort** en el fichero php.ini o
bien con la directiva Apache php_value ignore_user_abort
del fichero Apache httpd.conf o con la función
[ignore_user_abort()](#function.ignore-user-abort). Si no se solicita a PHP que ignore la desconexión, y el
usuario se desconecta, el script será terminado. La
única excepción es si se ha registrado una función de cierre, con [register_shutdown_function()](#function.register-shutdown-function).
Con tal función, cuando el usuario interrumpe su
solicitud, en la próxima ejecución del script,
PHP se dará cuenta de que el último script no ha sido
terminado, y desencadenará la función de cierre.
Esta función también será llamada al final del script,
si este termina normalmente. Para poder tener un comportamiento
diferente según el estado del script al finalizar,
se pueden ejecutar comandos específicos a
la desconexión gracias a la función
[connection_aborted()](#function.connection-aborted). Esta función devolverá
**[true](#constant.true)** si la conexión ha sido anulada.

El script también puede ser interrumpido automáticamente
después de un cierto tiempo.
Por omisión, el tiempo límite es de 30 segundos. Este valor
puede ser cambiado utilizando la directiva PHP
**max_execution_time** en el fichero
php.ini o con la directiva
php_value max_execution_time, en el fichero
Apache httpd.conf o también con la función
[set_time_limit()](#function.set-time-limit).
Cuando el tiempo límite expira, el script es terminado,
y como en la desconexión del cliente, una función de
terminación será llamada. En esta función, se puede saber si es el tiempo límite el que ha
causado el fin del script, llamando a la función
[connection_status()](#function.connection-status). Esta función
devolverá 2 si el tiempo límite ha
sido superado.

Una cosa a tener en cuenta es que los dos casos ABORTED y TIMEOUT
pueden ser llamados al mismo tiempo. Esto es
posible si se solicita a PHP que ignore las
desconexiones de los usuarios. PHP aún así notará el hecho de que el usuario se ha desconectado,
pero el script continuará. Luego, cuando alcance el límite de
tiempo, el script caducará. En ese momento, la
función [connection_status()](#function.connection-status)
devolverá 3.

# Conexiones persistentes a bases de datos

### ¿Qué son las conexiones persistentes?

Las conexiones persistentes son enlaces que no se cierran al
finalizar la ejecución de un script. Cuando se solicita una
conexión persistente, PHP comprueba si ya hay una idéntica
(que ya estuviera abierta antes), utilizándola si
existe. Si no, crea el enlace. Una conexión «idéntica»
es una conexión que fue abierta por el mismo host, con
el mismo usuario y la misma contraseña (donde sea aplicable).

No hay ningún método para solicitar una conexión específica, o garantizar
si obtendrá una conexión existente o una nueva (si todas las conexiones existentes
están en uso, o la solicitud está siendo atendida por un trabajador diferente,
el cual tiene un grupo separado de conexiones).

Esto significa que no puedes usar las conexiones persistentes de PHP para, por ejemplo:

- asignar una sesión de base de datos específica a un usuario web específico

- crear una transacción grande en múltiples solicitudes

- iniciar una consulta en una solicitud y recopilar los resultados en otra

Las conexiones persistentes no le brindan _ninguna_
funcionalidad que no fuera posible con las conexiones no persistentes.

### Solicitudes web

Hay dos formas las cuales su servidor web puede utilizar PHP para generar
páginas web:

El primer método es emplear PHP como una «envoltura» CGI. Cuando se ejecuta
de esta forma, se crea y se destruye una instancia del intérprete de PHP
por cada solicitud de página (para una página de PHP) al servidor web.
Debido a que esta instancia se destruye después de cada solicitud, cualquier recurso que
adquiera (tal como un enlace a un servidor de base de datos SQL) es cerrado
en la destrucción de dicha instancia. En este caso, no se gana nada
utilizando conexiones persistentes: simplemente no persisten.

El segundo método, y más popular, es ejecutar PHP-FPM, o PHP como módulo
en un servidor web multiproceso, lo que actualmente solo incluye a Apache.
Estas configuraciones suelen tener un proceso (el padre) que
coordina un grupo de procesos (sus hijos) los cuales son los que realmente
hacen el trabajo de servir páginas web. Cuando una solicitud proviene de
un cliente, esta es cedida a uno de los hijos que no esté ya
sirviendo a otro cliente. Esto significa que cuando el mismo cliente
hace una segunda solicitud al servidor, esta podría ser servida por un
proceso hijo diferente a la primera vez. Cuando se abre una conexión
persistente, cada página que solicite servicios SQL puede reusar
la misma conexión establecida al servidor SQL.

**Nota**:

Puede comprobar qué método utilizan sus solicitudes web consultando el valor de
"Server API" en la salida de [phpinfo()](#function.phpinfo) o el valor de
**[PHP_SAPI](#constant.php-sapi)**, ejecutado desde una solicitud web.

    Si la API del servidor es "Apache 2 Handler" o "FPM/FastCGI", se usarán conexiones persistentes
    en todas las solicitudes atendidas por el mismo trabajador. Con cualquier
    otro valor, las conexiones persistentes no persistirán después de cada solicitud.

### Procesos de línea de comandos

Dado que PHP de línea de comandos utiliza un nuevo proceso para cada script, las
conexiones persistentes no se comparten entre scripts de línea de comandos, por lo que no
tiene sentido usarlas en scripts transitorios como crons o comandos.
Sin embargo, pueden ser útiles si, por ejemplo, se está desarrollando un servidor
de aplicaciones de larga duración que atiende muchas solicitudes o tareas, y cada una puede
necesitar su propia conexión a la base de datos.

### ¿Por qué usarlas?

Las conexiones persistentes son recomendables si la sobrecarga para crear un enlace a su
servidor SQL es alta. Que esta sobrecarga sea realmente alta o no depende
de muchos factores, como el tipo de base de datos que se emplea, si esta
se encuentra en la misma computadora en la que está el servidor web, la
carga de la máquina donde está el servidor SQL, etc. En resumidas cuentas,
si la sobrecarga de una conexión es alta, las conexiones persistentes
ayudan considerablemente, haciendo que un proceso hijo únicamente se
conecte una vez durante su vida útil, en lugar de hacerlo cada vez
que procese una página que requiera una conexión al servidor
SQL. Esto significa que cada hijo que abra una conexión
persistente tendrá su propia conexión persistente abierta al
servidor. Por ejemplo, si se tienen 20 procesos hijos diferentes que
ejecutan un script que realiza una conexión persistente al servidor SQL,
se tendrán 20 conexiones diferentes al servidor SQL, una por cada
hijo.

### Posibles inconvenientes: Límites de conexión

Observe, sin embargo, que esto puede tener algunos inconvenientes si se está usando
una base de datos con un limite de conexiones que sea excedido por las conexiones
persistentes hijas. Si la base de datos tiene un limite de 16 conexiones
simultáneas, y en el curso de una sesión de un servidor ocupado 17 hilos
hijos intentan conectarse, uno de ellos no será capaz de hacerlo. Si un
script contiene errores que impidan el cierre de las conexiones
(como un bucle infinito), la mencionada base de datos con solamente 16 conexiones
podría saturarse rápidamente.

Las conexiones persistentes suelen aumentar el número de conexiones abiertas
en un momento dado, ya que los procesos inactivos mantienen las conexiones utilizadas
en las solicitudes anteriores que atendieron. Si se inicia un gran número de procesos para
manejar una oleada de solicitudes, las conexiones que estos abrieron permanecerán activas hasta
que el proceso sea finalizado o el servidor de base de datos cierre la conexión.

Asegúrate de que el número máximo de conexiones permitidas por el servidor de base de datos
sea superior al número máximo de procesos que atienden solicitudes web (más cualquier otro
uso adicional, como tareas programadas o conexiones administrativas).

Consulta la documentación de tu base de datos para obtener información sobre cómo manejar conexiones abandonadas o
inactivas (timeouts). Los timeouts largos pueden aumentar significativamente el
número de conexiones persistentes abiertas en un momento dado.

### Posibles inconvenientes: Mantenimiento del estado de la conexión

Algunas extensiones de base de datos realizan limpieza automática al reutilizar
la conexión; otras delegan esta tarea en el desarrollador de la aplicación.
Según la extensión utilizada y el diseño de la aplicación, puede ser necesario
realizar una limpieza manual antes de que el script finalice. Los cambios que pueden dejar
la conexión en un estado inesperado incluyen:

- Base de datos seleccionada o por defecto

- Bloqueos de tablas

- Transacciones no confirmadas

- Tablas temporales

- Configuraciones o características específicas de la conexión, como el perfilado

Los bloqueos de tablas y las transacciones que no se limpian ni cierran pueden provocar
que otras consultas queden bloqueadas indefinidamente o que la reutilización posterior de
la conexión genere cambios inesperados.

Tener seleccionada una base de datos incorrecta puede impedir que la conexión
reutilizada ejecute las consultas como se espera (o que las ejecute sobre
la base de datos equivocada si los esquemas son suficientemente similares).

Si no se eliminan las tablas temporales, las solicitudes posteriores no podrán
recrear la misma tabla.

Puede implementar la limpieza utilizando destructores de clase o la función
[register_shutdown_function()](#function.register-shutdown-function). También puede considerar
el uso de proxies dedicados para agrupación de conexiones que incluyan
esta funcionalidad.

### Palabras finales

Dado su comportamiento y los posibles inconvenientes descritos anteriormente, no debería
utilizar conexiones persistentes sin una evaluación cuidadosa. No deben emplearse
sin realizar cambios adicionales en su aplicación y sin una configuración
meticulosa del servidor de base de datos, del servidor web y/o de PHP-FPM.

Considere soluciones alternativas, como investigar y corregir las causas del
sobrecoste en la creación de conexiones (por ejemplo, desactivar las búsquedas inversas de DNS
en el servidor de base de datos), o utilizar proxies dedicados para agrupación de conexiones.

Para APIs web de alto volumen, considere el uso de entornos de ejecución alternativos o servidores
de aplicaciones de larga duración.

### Ver también

- [ibase_pconnect()](#function.ibase-pconnect)

- [oci_pconnect()](#function.oci-pconnect)

- [odbc_pconnect()](#function.odbc-pconnect)

- [pfsockopen()](#function.pfsockopen)

- [pg_connect()](#function.pg-connect)

- [Mysqli y conexiones persistentes](#mysqli.persistconns)

- [Gestor de conexiones PDO](#pdo.connections)

# Utilización de la línea de comandos

## Tabla de contenidos

- [Diferencia con otros SAPIs](#features.commandline.differences)
- [Opciones](#features.commandline.options)
- [Utilización](#features.commandline.usage)
- [Flujos I/O](#features.commandline.io-streams)
- [Shell Interactivo](#features.commandline.interactive)
- [Servidor web interno](#features.commandline.webserver)
- [Configuraciones INI](#features.commandline.ini)

    ## Introducción

    El propósito principal de CLI SAPI es el desarrollo de aplicaciones shell con PHP. Las diferencias entre CLI SAPI y otros SAPI se explican en este capítulo. Es importante mencionar que CLI y CGI son SAPI diferentes a pesar de que puedan compartir la mayor parte de sus comportamientos.

    El CLI SAPI se activa por defecto utilizando la opción **--enable-cli**, pero se puede desactivar utilizando la opción **--disable-cli** al ejecutar el comando **./configure**.

    El nombre, la ubicación y la existencia de los binarios CLI/CGI dependerán de la forma en que PHP esté instalado en su sistema. Por defecto, al ejecutar **make**, ambos binarios CGI y CLI se compilan y se nombran respectivamente sapi/cgi/php y sapi/cli/php en su directorio fuente PHP. Se observará que ambos se nombran php. Lo que sucede después durante el **make install** depende de su línea de configuración. Si un módulo SAPI, como apxs, se ha elegido durante la configuración, o si la opción ** --disable-cgi** se ha activado, el CLI se copia en {PREFIX}/bin/php durante el **make install**, de lo contrario, el CGI se colocará aquí. Si, por ejemplo, **--with-apxs** figura en su línea de configuración, el CLI se copia en {PREFIX}/bin/php durante el **make install**. Si se desea forzar la instalación del binario CGI, ejecute **make install-cli** después del **make install**. De lo contrario, también se puede especificar **--disable-cgi** en su línea de configuración.

    **Nota**:

    Dado que ambas opciones **--enable-cli** y **--enable-cgi** están activadas por defecto, tener simplemente **--enable-cli** en su línea de configuración no implica necesariamente que el CLI se renombre a {PREFIX}/bin/php durante el **make install**.

    El binario CLI se distribuye en el directorio principal bajo el nombre de php.exe en Windows. La versión CGI se distribuye bajo el nombre de php-cgi.exe. Además, un archivo php-win.exe se distribuye si PHP se configura utilizando la opción de configuración **--enable-cli-win32**. Este archivo hace lo mismo que la versión CLI, excepto que no muestra nada y no proporciona una consola.

    **Nota**:
    **¿Qué SAPI está instalado?**

    Desde un terminal, ejecutar **php -v** indicará si php está en versión CGI o CLI. También se puede consultar la función [php_sapi_name()](#function.php-sapi-name) y la constante **[PHP_SAPI](#constant.php-sapi)**.

    **Nota**:

    Una página man de manual Unix está disponible escribiendo **man php** en el intérprete de comandos.

    ## Diferencia con otros SAPIs

    Las diferencias más notables entre el CLI SAPI y los otros SAPI son:
    - A diferencia del CGI SAPI, ningún encabezado HTTP se escribe en el resultado.

        Aunque el CGI SAPI proporciona una forma de eliminar los encabezados HTTP, no es posible activar los encabezados HTTP en el CLI SAPI.

        CLI se ejecuta en modo silencioso por defecto, aunque las opciones **-q** y **--no-header** se mantienen para mantener la compatibilidad con versiones anteriores de CGI.

        No cambia el directorio actual al del script. (Las opciones **-C** y **--no-chdir** se mantienen por razones de compatibilidad).

        Mensajes de error en texto plano (sin formato HTML).

    - Hay varias directivas del php.ini que son ignoradas por el CLI SAPI, ya que no tienen sentido en un entorno shell:

         <caption>**Directivas php.ini ignoradas**</caption>
         
          
           
            Directiva
            Valor por defecto para CLI SAPI
            Comentario


            [**html_errors**](#ini.html-errors)
            **[false](#constant.false)**

             Por defecto a **[false](#constant.false)**, ya que puede ser bastante difícil leer mensajes de error en un terminal cuando están enterrados en etiquetas HTML no interpretadas.




            [**implicit_flush**](#ini.implicit-flush)
            **[true](#constant.true)**

             En un terminal, generalmente es deseable que cualquier salida de [print](#function.print), [echo](#function.echo) y otros, se muestre inmediatamente, y no se coloque en un búfer. Sin embargo, siempre es posible utilizar [la bufferización de salida](#ref.outcontrol) si se desea retrasar una salida, o bien manipular su contenido una última vez.




            [max_execution_time](#ini.max-execution-time)
            0 (sin límite)

             PHP en un terminal es susceptible de ser utilizado para tareas mucho más diversas que en scripts web, y dado que esto generalmente toma mucho tiempo, este parámetro se establecerá por defecto a 0 permitiendo así ser ilimitado.




            [register_argc_argv](#ini.register-argc-argv)
            **[true](#constant.true)**


              El establecimiento de esta directiva a **[true](#constant.true)** significa que los scripts ejecutados a través del SAPI CLI siempre tendrán acceso a *argc* (representando el número de argumentos pasados a la aplicación) y *argv* (el array que contiene los argumentos pasados).




              Las variables PHP [$argc](#reserved.variables.argc) y [$argv](#reserved.variables.argv) se definen y rellenan automáticamente con los valores apropiados, al utilizar el SAPI CLI. Estos valores también pueden encontrarse en la variable [$_SERVER](#reserved.variables.server), por ejemplo: [$_SERVER['argv']](#reserved.variables.server).



             **Advertencia**

              La presencia de [$argv](#reserved.variables.argv) o [$_SERVER['argv']](#reserved.variables.server) no es una indicación fiable de que un script se está ejecutando desde la línea de comandos, ya que estas variables pueden definirse en otros contextos cuando [register_argc_argv](#ini.register-argc-argv) está activado. El valor devuelto por [php_sapi_name()](#function.php-sapi-name) debe verificarse en su lugar.





&lt;?php

if (php_sapi_name() === 'cli') {
echo "¡Este script se está ejecutando desde la línea de comandos!\n";
}

          [output_buffering](#ini.output-buffering)
          **[false](#constant.false)**


            Aunque esta configuración INI está codificada a **[false](#constant.false)**, las funciones relacionadas con [la visualización del búfer](#book.outcontrol) están disponibles.







          [max_input_time](#ini.max-input-time)
          **[false](#constant.false)**


            El PHP CLI no soporta GET, POST y la carga de archivos.











     **Nota**:



       Estas directivas no pueden inicializarse con otros valores en el archivo php.ini o por cualquier otro método. Es una limitación, ya que estos valores por defecto se aplican una vez que todos los otros archivos de configuración han sido analizados. Sin embargo, estos valores pueden modificarse durante la ejecución (lo cual no es lógico para ciertas directivas, como [register_argc_argv](#ini.register-argc-argv)).




     **Nota**:



       Se recomienda establecer [ignore_user_abort](#ini.ignore-user-abort) para los scripts en línea de comandos. Consulte la función [ignore_user_abort()](#function.ignore-user-abort) para más información.







    -

      Para facilitar el trabajo en un entorno shell, se definen varias constantes para los [flujos I/O](#features.commandline.io-streams).






    -

      El CLI SAPI **no transforma** el directorio actual en el directorio de ejecución del script.




      **Ejemplo #1
       Ejemplo que muestra la diferencia con el SAPI CGI:
      **




&lt;?php
// Una prueba simple: muestra el directorio de ejecución \*/
echo getcwd(), "\n";
?&gt;

       Cuando se utiliza la versión CGI, la salida será:





$ pwd
/tmp

$ php -q otro_directorio/test.php
/tmp/otro_directorio

       Esto muestra claramente que PHP cambia el directorio actual y utiliza el directorio del script ejecutado.




       Al utilizar el CLI SAPI, se obtiene:





$ pwd
/tmp

$ php -f otro_directorio/test.php
/tmp

       Esto proporciona mucha más flexibilidad al escribir scripts shell con PHP.




     **Nota**:



       El CGI SAPI se comporta de la misma manera que el CLI SAPI, pasándole la opción **-C**, cuando se invoca en la línea de comandos.





## Opciones de línea de comandos

La lista de opciones de línea de comandos proporcionadas por PHP está disponible en cualquier momento ejecutando PHP con la opción **-h**:

Uso: php [opciones] [-f] &lt;archivo&gt; [--] [args...]
php [opciones] -r &lt;código&gt; [--] [args...]
php [opciones] [-B &lt;begin_code&gt;] -R &lt;código&gt; [-E &lt;end_code&gt;] [--] [args...]
php [opciones] [-B &lt;begin_code&gt;] -F &lt;archivo&gt; [-E &lt;end_code&gt;] [--] [args...]
php [opciones] -- [args...]
php [opciones] -a

-a Ejecutar de forma interactiva
-c &lt;ruta&gt;|&lt;archivo&gt; Buscar el archivo php.ini en este directorio
-n No se utilizará ningún archivo php.ini
-d foo[=bar] Definir la entrada INI foo con el valor 'bar'
-e Generar información extendida para el depurador/perfilador
-f &lt;archivo&gt; Analizar y ejecutar &lt;archivo&gt;.
-h Esta ayuda
-i Información de PHP
-l Verificación de sintaxis únicamente (lint)
-m Mostrar módulos compilados
-r &lt;código&gt; Ejecutar el código PHP sin usar etiquetas de script &lt;?..?&gt;
-B &lt;begin_code&gt; Ejecutar &lt;begin_code&gt; antes de procesar las líneas de entrada
-R &lt;código&gt; Ejecutar el código PHP para cada línea de entrada
-F &lt;archivo&gt; Analizar y ejecutar &lt;archivo&gt; para cada línea de entrada
-E &lt;end_code&gt; Ejecutar &lt;end_code&gt; después de procesar todas las líneas de entrada
-H Ocultar cualquier argumento pasado de herramientas externas.
-S &lt;dirección&gt;:&lt;puerto&gt; Ejecutar con el servidor web integrado.
-t &lt;docroot&gt; Especificar el directorio raíz del documento para el servidor web integrado.
-s Salida de sintaxis HTML resaltada.
-v Número de versión
-w Salida de código fuente con comentarios y espacios en blanco eliminados.
-z &lt;archivo&gt; Cargar la extensión Zend &lt;archivo&gt;.

args... Argumentos pasados al script. Usar -- args cuando el primer argumento
comienza con - o el script se lee desde stdin

--ini Mostrar nombres de archivos de configuración

--rf &lt;nombre&gt; Mostrar información sobre la función &lt;nombre&gt;.
--rc &lt;nombre&gt; Mostrar información sobre la clase &lt;nombre&gt;.
--re &lt;nombre&gt; Mostrar información sobre la extensión &lt;nombre&gt;.
--rz &lt;nombre&gt; Mostrar información sobre la extensión Zend &lt;nombre&gt;.
--ri &lt;nombre&gt; Mostrar configuración para la extensión &lt;nombre&gt;.

    <caption>**Opciones de línea de comandos**</caption>



       Opción
       Opción larga
       Descripción






       -a
       --interactive


         Lanza PHP de forma interactiva. Para más información, consulte la documentación sobre el [shell interactivo](#features.commandline.interactive).







       -b
       --bindpath


         Enlaza la ruta para los externos, en modo servidor FASTCGI (solo CGI).







       -C
       --no-chdir


         No ir al directorio del script (solo CGI).







       -q
       --no-header


         Modo silencioso. Suprime la salida de los encabezados HTTP (solo CGI).







       -T
       --timing


         Mide el tiempo de ejecución del script, repetido count veces (solo CGI).







       -c
       --php-ini


         Especifica el nombre del directorio en el que se encuentra el archivo php.ini, o bien especifica un archivo de configuración (INI) directamente (que no se llama necesariamente php.ini):









$ php -c /custom/directory/ mon_script.php

$ php -c /custom/directory/custom-file.ini mon_script.php

         Si esta opción no se especifica, php.ini se buscará en los [lugares por defecto](#configuration.file).







       -n
       --no-php-ini


         Ignora completamente php.ini.







       -d
       --define


         Define un valor personalizado para cualquier directiva de configuración del archivo php.ini. La sintaxis es:


-d configuration_directive[=value]

          **Ejemplo #1 Ejemplo de uso de -d para establecer una configuración INI**




# La omisión del valor conduce a dar el valor de "1"

$ php -d max_execution_time
-r '$foo = ini_get("max_execution_time"); var_dump($foo);'
string(1) "1"

# Pasar un valor vacío conduce a dar el valor de ""

php -d max_execution_time=
-r '$foo = ini_get("max_execution_time"); var_dump($foo);'
string(0) ""

# La directiva de configuración será cualquier valor pasado después del carácter '='

$ php -d max_execution_time=20
-r '$foo = ini_get("max_execution_time"); var_dump($foo);'
string(2) "20"
$ php
-d max_execution_time=doesntmakesense
-r '$foo = ini_get("max_execution_time"); var_dump($foo);'
string(15) "doesntmakesense"

       -e
       --profile-info


         Genera información extendida para la depuración y el perfilado.







       -f
       --file


         Analiza y ejecuta el archivo especificado. La opción **-f** es opcional y puede omitirse. El nombre del archivo es suficiente.







       -h y -?
       --help y --usage

        Muestra información sobre la lista actual de opciones de la línea de comandos, así como su descripción.




       -i
       --info

        Llama a la función [phpinfo()](#function.phpinfo) y muestra el resultado. Si PHP no funciona correctamente, se recomienda utilizar el comando **php -i** y ver si no hay errores mostrados antes o después de la tabla de información. No olvide que el resultado de esta opción, si se utiliza el modo CGI, está en formato HTML y, por lo tanto, es de tamaño considerable.




       -l
       --syntax-check


         Verifica la sintaxis pero no ejecuta el código PHP dado. La entrada proveniente de la entrada estándar se procesará si no se especifica ningún nombre de archivo, de lo contrario, cada archivo especificado se verificará. En caso de éxito, se muestra el mensaje No syntax errors detected in &lt;filename&gt; (Literalmente, no se detectaron errores de sintaxis en el archivo) en la salida estándar. En caso de error, se muestra el mensaje Errors parsing &lt;filename&gt; (Literalmente, error de análisis en el archivo filename) junto con los mensajes de error detectados por el analizador mismo. Si se encuentran errores en los archivos especificados (o en la entrada estándar), el código de retorno del shell se establece en -1, de lo contrario, el código de retorno del shell se establece en 0.




         Esta opción no detecta errores fatales (por ejemplo, funciones no definidas) que requieren la ejecución del código.



        **Nota**:



          Antes de PHP 8.3.0, solo se podía especificar un nombre de archivo para verificar.




        **Nota**:



          Esta opción no funciona con la opción **-r**.








       -m
       --modules





          **Ejemplo #2 Mostrar módulos internos (y cargados) de PHP y Zend**




$ php -m
[PHP Modules]
xml
tokenizer
standard
session
posix
pcre
overload
mysql
mbstring
ctype

[Zend Modules]

       -r
       --run


         Permite la ejecución de PHP directamente en la línea de comandos. Las etiquetas de PHP (&lt;?php y ?&gt;) **no son** necesarias y causarán un error de análisis si están presentes.



        **Nota**:



          Se debe prestar especial atención al utilizar esta opción de PHP para que no haya colisión con las sustituciones de variables en la línea de comandos realizadas por el shell.




          **Ejemplo #3 Error de sintaxis al usar comillas dobles**




$ php -r "$foo = get_defined_constants();"
PHP Parse error: syntax error, unexpected '=' in Command line code on line 1

Parse error: syntax error, unexpected '=' in Command line code on line 1

          El problema aquí es que el shell (sh/bash) realiza una sustitución de variables, incluso con las comillas dobles ". Dado que la variable $foo probablemente no está definida en el shell, se reemplaza por nada, lo que hace que el código pasado a PHP para ejecutar sea:






$ php -r " = get_defined_constants();"

          La solución a este problema es utilizar comillas simples '. Las variables de estas cadenas no serán sustituidas por sus valores por el shell.




          **Ejemplo #4 Uso de comillas simples para evitar una sustitución por el shell**




$ php -r '$foo = get_defined_constants(); var_dump($foo);'
array(370) {
["E_ERROR"]=&gt;
int(1)
["E_WARNING"]=&gt;
int(2)
["E_PARSE"]=&gt;
int(4)
["E_NOTICE"]=&gt;
int(8)
["E_CORE_ERROR"]=&gt;
[...]

          Si se utiliza un shell diferente de sh/bash, pueden encontrarse otros problemas; si es apropiado, se puede abrir un informe de errores a través de [» https://github.com/php/php-src/issues](https://github.com/php/php-src/issues). Es muy fácil tener problemas al intentar incluir variables de shell en el código, o al usar las barras invertidas para la protección. ¡Se le ha advertido!




        **Nota**:



          **-r** está disponible con el CLI SAPI pero no con el SAPI *CGI*.




        **Nota**:



          Esta opción solo se utiliza para cosas simples. Por lo tanto, algunas directivas de configuración (por ejemplo, [auto_prepend_file](#ini.auto-prepend-file) y [auto_append_file](#ini.auto-append-file)) se ignoran en este modo.








       -B
       --process-begin


         Código PHP a ejecutar antes de procesar stdin.







       -R
       --process-code


         Código PHP a ejecutar para cada línea de entrada.




         Hay dos variables especiales disponibles en este modo: $argn y $argi. $argn debe contener la línea PHP procesada en ese momento, mientras que $argi debe contener el número de la línea.







       -F
       --process-file


         Archivo PHP a ejecutar para cada línea de entrada.







       -E
       --process-end


         Código PHP a ejecutar después de realizar la entrada.







          **Ejemplo #5 Ejemplo de uso de las opciones -B**, **-R** y **-E** para contar el número de líneas de un proyecto.




$ find my_proj | php -B '$l=0;' -R '$l += count(@file($argn));' -E 'echo "Total Lines: $l\n";'
Total Lines: 37328

       -S
       --server


         Inicia el [servidor web interno](#features.commandline.webserver). Disponible desde 5.4.0.







       -t
       --docroot

        Especifica la raíz de los documentos para el [servidor web interno](#features.commandline.webserver).




       -s
       --syntax-highlight y --syntax-highlighting


         Muestra el código con colorización de sintaxis.




         Esta opción utiliza el mecanismo interno para analizar el archivo y escribir una versión coloreada del código fuente en formato HTML. Tenga en cuenta que esta opción solo genera un bloque HTML, con las etiquetas HTML &lt;code&gt; [...] &lt;/code&gt;, sin encabezados HTML.



        **Nota**:



          Esta opción no funciona con la opción **-r**.








       -v
       --version




         **Ejemplo #6 Uso de la opción -v** para recuperar el nombre del SAPI así como la versión de PHP y de Zend




$ php -v
PHP 5.3.1 (cli) (built: Dec 11 2009 19:55:07)
Copyright (c) 1997-2009 The PHP Group
Zend Engine v2.3.0, Copyright (c) 1998-2009 Zend Technologies

       -w
       --strip


         Muestra el código fuente sin comentarios ni espacios.



        **Nota**:



          Esta opción no funciona con la opción **-r**.








       -z
       --zend-extension


         Carga una extensión Zend. Si y solo si se proporciona un archivo, PHP intentará cargar esta extensión en el directorio predeterminado de las bibliotecas en su sistema (generalmente especificado con /etc/ld.so.conf en Linux, por ejemplo). Pasar un nombre de archivo con la ruta completa hará que PHP use este archivo, sin buscar en los directorios habituales. Una ruta de directorio relativa, que incluya información sobre el directorio, indicará a PHP que debe buscar las extensiones solo en ese directorio.







        
       --ini


         Muestra los nombres de los archivos de configuración y los directorios analizados.



          **Ejemplo #7 Ejemplo con --ini**




$ php --ini
Configuration File (php.ini) Path: /usr/dev/php/5.2/lib
Loaded Configuration File: /usr/dev/php/5.2/lib/php.ini
Scan for additional .ini files in: (none)
Additional .ini files parsed: (none)

       --rf
       --rfunction


         Muestra información sobre la función dada o el método de una clase (es decir, número y nombre de los parámetros).




         Esta opción solo está disponible si PHP se ha compilado con soporte [Reflection](#book.reflection).







          **Ejemplo #8 Ejemplo con --rf**




$ php --rf var_dump
Function [ &lt;internal&gt; public function var_dump ] {

- Parameters [2] {
  Parameter #0 [ &lt;required&gt; $var ]
  Parameter #1 [ &lt;optional&gt; $... ]
  }
  }

           --rc
           --rclass


             Muestra información sobre la clase dada (lista de constantes, propiedades y métodos).




             Esta opción solo está disponible si PHP se ha compilado con soporte [Reflection](#book.reflection).







              **Ejemplo #9 Ejemplo con --rc**




$ php --rc Directory
Class [ &lt;internal:standard&gt; class Directory ] {

- Constants [0] {
  }

- Static properties [0] {
  }

- Static methods [0] {
  }

- Properties [0] {
  }

- Methods [3] {
  Method [ &lt;internal&gt; public method close ] {
  }

        Method [ &lt;internal&gt; public method rewind ] {
        }

        Method [ &lt;internal&gt; public method read ] {
        }

    }
    }

           --re
           --rextension


             Muestra la información sobre la extensión dada (lista las opciones del php.ini, las funciones definidas, las constantes y las clases).




             Esta opción solo está disponible si PHP se ha compilado con soporte [Reflection](#book.reflection).







              **Ejemplo #10 Ejemplo con --re**




$ php --re json
Extension [ &lt;persistent&gt; extension #19 json version 1.2.1 ] {

- Functions {
  Function [ &lt;internal&gt; function json_encode ] {
  }
  Function [ &lt;internal&gt; function json_decode ] {
  }
  }
  }

           --rz
           --rzendextension


             Muestra la información de configuración para la extensión Zend proporcionada (la misma información que la devuelta por la función [phpinfo()](#function.phpinfo)).







           --ri
           --rextinfo


             Muestra la información de configuración para la extensión dada (la misma información devuelta por la función [phpinfo()](#function.phpinfo)). Las informaciones de configuración internas están disponibles utilizando el nombre de extensión "main" o "core".







              **Ejemplo #11 Ejemplo con --ri**




$ php --ri date

date

date/time support =&gt; enabled
"Olson" Timezone Database Version =&gt; 2009.20
Timezone Database =&gt; internal
Default timezone =&gt; Europe/Oslo

Directive =&gt; Local Value =&gt; Master Value
date.timezone =&gt; Europe/Oslo =&gt; Europe/Oslo
date.default_latitude =&gt; 59.930972 =&gt; 59.930972
date.default_longitude =&gt; 10.776699 =&gt; 10.776699
date.sunset_zenith =&gt; 90.583333 =&gt; 90.583333
date.sunrise_zenith =&gt; 90.583333 =&gt; 90.583333

**Nota**:

    Las opciones -rBRFEH, --ini y --r[fcezi] solo están disponibles en modo CLI.

## Ejecución de archivos PHP

Hay 3 formas diferentes de llamar al CLI SAPI con código PHP a ejecutar:

    -

      Indicar a PHP que ejecute un archivo dado:






php mon_script.php

php -f mon_script.php

      Ambos métodos (usando **-f** o no) ejecutan el script contenido en el archivo mon_script.php. Tenga en cuenta que no existe restricción sobre los archivos que se pueden ejecutar; en particular, no es necesario que la extensión del archivo sea .php.





    -

      Dar código PHP a ejecutar directamente en la línea de comandos.






php -r 'print_r(get_defined_constants());'

      En este caso, se debe prestar especial atención a las variables de entorno, que serán reemplazadas, y a las comillas, que tienen significados especiales en la línea de comandos.



     **Nota**:



       Lea el ejemplo con atención, ¡no hay etiquetas de apertura ni de cierre! La opción **-r** hace que el uso de estas etiquetas sea innecesario, y agregarlas conduciría a un error de análisis sintáctico.






    -

      Alimentar la entrada estándar con código PHP (stdin).




      Esto proporciona la posibilidad de crear código PHP dinámicamente, luego proporcionarlo a PHP y, finalmente, procesarlo nuevamente en el shell. Aquí hay un ejemplo ficticio:






$ some_application | some_filter | php | sort -u &gt; final_output.txt

No es posible combinar estos tres modos de ejecución.

Como cualquier aplicación shell, el ejecutable PHP acepta argumentos; sin embargo, el script PHP también puede recibirlos. El número de argumentos que se pueden pasar a su script no está limitado por PHP (el shell tiene un límite en términos de número de caracteres que se pueden pasar. Generalmente, no alcanzará este límite). Los argumentos pasados al script se transmitirán a través de la variable array [$argv](#reserved.variables.argv). El primer índice (cero) contiene siempre el nombre del script llamado desde la línea de comandos. Tenga en cuenta que, si el código se ejecuta en línea usando la opción de línea de comandos **-r**, el valor de [$argv[0]](#reserved.variables.argv) será "Standard input code"; anterior a PHP 7.2.0, era un guion ("-") en su lugar. Esto también es cierto si el código se ejecuta a través de un pipe desde **[STDIN](#constant.stdin)**.

Una segunda variable global, [$argc](#reserved.variables.argc), contiene el número de elementos del array [$argv](#reserved.variables.argv) (**y no** el número de argumentos pasados a su script).

Mientras los argumentos pasados al script no comiencen con el carácter -, no hay nada especial que vigilar. El hecho de pasar argumentos al script que comienzan con - plantea problemas porque PHP pensará que debe interpretarlos. Para evitar esto, use el separador --. Después de este argumento, todos los argumentos siguientes se pasarán al script sin ser modificados ni analizados por PHP.

# Esto no ejecutará el código, sino que mostrará la ayuda de PHP

$ php -r 'var_dump($argv);' -h
Uso: php [opciones] [-f] &lt;archivo&gt; [args...]
[...]

# Esto pasará el argumento '-h' al script y evitará que PHP lo maneje

$ php -r 'var_dump($argv);' -- -h
array(2) {
[0]=&gt;
string(1) "-"
[1]=&gt;
string(2) "-h"
}

Sin embargo, hay otra forma de usar PHP como script shell; la primera línea del script debe ser #!/usr/bin/php (a reemplazar por la ruta hacia el binario PHP CLI en el sistema subyacente). El resto del archivo debe contener el código PHP normal, comprendido entre las etiquetas de apertura/cierre. Después de establecer los permisos de ejecución en el script (**chmod +x test**), puede ejecutarse como un script shell o perl habitual:

**Ejemplo #1 Ejecuta un script PHP como script shell**

#!/usr/bin/php
&lt;?php
var_dump($argv);
?&gt;

    Suponiendo que este archivo se llame test, en el directorio actual, entonces es posible hacer esto:

$ chmod +x test
$ ./test -h -- foo
array(4) {
[0]=&gt;
string(6) "./test"
[1]=&gt;
string(2) "-h"
[2]=&gt;
string(2) "--"
[3]=&gt;
string(3) "foo"
}

Como puede ver, en este caso, no es necesario tener cuidado al pasar parámetros que comienzan con - a su script.

El ejecutable PHP puede ser utilizado para ejecutar scripts independientes del servidor web. Si está en un sistema Unix, se recomienda agregar la línea especial al inicio del script, hacerlo ejecutable de manera que el sistema sepa qué programa debe ejecutar el script. En Windows, puede asociar el ejecutable php.exe con el doble clic en los archivos de extensión .php, o bien puede hacer un archivo batch para ejecutar el script gracias a PHP. La primera línea utilizada en el mundo Unix no perturbará la ejecución en Windows, lo que hace que los scripts sean fácilmente portables. Un ejemplo completo se proporciona a continuación:

    **Ejemplo #2 Script previsto para ser ejecutado en línea de comandos (script.php)**

#!/usr/bin/php
&lt;?php

if ($argc != 2 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
?&gt;

Esto es una línea de comando a una opción.

Uso:
&lt;?php echo $argv[0]; ?&gt; &lt;opción&gt;

&lt;opción&gt; puede ser una palabra que desee mostrar.
Con las opciones --help, -help, -h,
y -?, obtendrá esta ayuda.

&lt;?php
} else {
echo $argv[1];
}
?&gt;

El script anterior incluye la primera línea especial que indica que este archivo debe ser ejecutado por PHP. Se trabaja aquí con la versión CLI, por lo que no se mostrará ningún encabezado HTTP.

El programa comienza verificando que se haya especificado el argumento requerido (además del nombre del script, que también se cuenta). Si no está presente, o si el argumento es **--help**, **-help**, **-h** o **-?**, se mostrará un mensaje de ayuda, utilizando [$argv[0]](#reserved.variables.argv) para mostrar dinámicamente el nombre del script tal como se ingresó en la línea de comandos. De lo contrario, el argumento se mostrará tal como se ingresó en el terminal.

Para ejecutar el script anterior en Unix, debe hacerlo ejecutable y luego llamarlo con un comando como: **script.php echothis** o **script.php -h**. En Windows, puede hacer un archivo batch para esto:

    **Ejemplo #3 Archivo batch para ejecutar un script PHP en línea de comandos (script.bat)**

@echo OFF
"C:\php\php.exe" script.php %\*

Suponiendo que el programa anterior se llame script.php, y que el ejecutable CLI php.exe se encuentre en C:\php\php.exe, este archivo batch lo ejecutará con las opciones que le pase: **script.bat echothis** o **script.bat -h**.

Vea también la extensión [Readline](#ref.readline), que dispone de numerosas funciones para mejorar la usabilidad de las aplicaciones PHP en línea de comandos.

En Windows, PHP puede configurarse para funcionar sin necesidad de proporcionar las extensiones C:\php\php.exe o .php, tal como se describe en [la línea de comandos PHP bajo Microsoft Windows](#install.windows.commandline).

**Nota**:

    En Windows, se recomienda ejecutar PHP bajo una cuenta de usuario. Cuando PHP se ejecuta bajo un servicio de red, algunas operaciones pueden fallar, ya que "No se realiza ninguna vinculación entre los nombres de cuenta y los identificadores de seguridad".

## Flujos de entrada/salida

El CLI SAPI define algunas constantes para los flujos I/O para hacer que la programación en línea de comandos sea más fácil.

    <caption>**Constantes específicas CLI**</caption>



       Constante
       Descripción






       **[STDIN](#constant.stdin)**


         Un flujo ya abierto hacia stdin. Esto evita abrirlo explícitamente con


&lt;?php
$stdin = fopen('php://stdin', 'r');
?&gt;

         Si desea leer una sola línea desde stdin, puede usar


&lt;?php
$line = trim(fgets(STDIN)); // lee una línea desde STDIN
fscanf(STDIN, "%d\n", $number); // lee números desde STDIN
?&gt;

       **[STDOUT](#constant.stdout)**


         Un flujo ya abierto hacia stdout. Esto evita abrirlo explícitamente con


&lt;?php
$stdout = fopen('php://stdout', 'w');
?&gt;

       **[STDERR](#constant.stderr)**


         Un flujo ya abierto hacia stderr. Esto evita abrirlo explícitamente con


&lt;?php
$stderr = fopen('php://stderr', 'w');
?&gt;

Por lo tanto, no es necesario abrir un flujo específico para, por ejemplo, stderr pero se puede usar simplemente la constante correspondiente a ese flujo:

php -r 'fwrite(STDERR, "stderr\n");'

No es necesario cerrar explícitamente estos flujos, ya que se cerrarán automáticamente por PHP al final de su script.

**Nota**:

    Estas constantes no están disponibles cuando se lee un script PHP desde stdin.

## Shell Interactivo

El CLI SAPI proporciona un shell interactivo al usar la opción **-a** si PHP se ha compilado con la opción **--with-readline**. Desde PHP 7.1.0, el shell interactivo también está disponible en Windows, si la extensión [readline](#book.readline) está activada.

Al usar el shell interactivo, tiene la posibilidad de escribir código PHP y que se ejecute directamente.

**Ejemplo #1 Ejecución de código usando el shell interactivo**

$ php -a
Interactive shell

php &gt; echo 5+8;
13
php &gt; function addTwo($n)
php &gt; {
php { return $n + 2;
php { }
php &gt; var_dump(addtwo(2));
int(4)
php &gt;

El shell interactivo también proporciona autocompletado de funciones, constantes, nombres de clases, variables, llamadas a métodos estáticos y constantes de clases utilizando la tecla de tabulación. Desde PHP 8.4.0, la ruta hacia el archivo de historial puede establecerse utilizando la variable de entorno PHP_HISTFILE.

**Ejemplo #2 Autocompletado usando la tecla de tabulación**

    Presionar dos veces la tecla de tabulación cuando hay varias posibles completaciones mostrará una lista de estas completaciones:

php &gt; strp[TAB][TAB]
strpbrk strpos strptime
php &gt; strp

    Cuando solo hay una posible completación, presionar la tecla de tabulación una vez completará el resto en la misma línea:

php &gt; strpt[TAB]ime(

    La completación también funcionará para los nombres que se han definido durante la sesión actual del shell interactivo:

php &gt; $fooThisIsAReallyLongVariableName = 42;
php &gt; $foo[TAB]ThisIsAReallyLongVariableName

El shell interactivo almacena su historial y puede acceder a él utilizando las teclas arriba y abajo. El historial se guarda en el archivo ~/.php_history.

El CLI SAPI proporciona 2 directivas del php.ini: cli.pager y cli.prompt. La directiva cli.pager permite la definición de un programa externo (como less) a utilizar como pager para la salida en lugar de mostrarla directamente en la pantalla. La directiva cli.prompt permite la modificación del prompt php &gt;.

También es posible definir directivas del php.ini en un shell interactivo utilizando notaciones abreviadas.

**Ejemplo #3 Definición de directivas del php.ini en un shell interactivo**

    La definición de la directiva cli.prompt:

php &gt; #cli.prompt=hello world :&gt;
hello world :&gt;

    Utilizando comillas invertidas, es posible ejecutar código PHP en el prompt:

php &gt; #cli.prompt=`echo date('H:i:s');` php &gt;
15:49:35 php &gt; echo 'hi';
hi
15:49:43 php &gt; sleep(2);
15:49:45 php &gt;

    Definición del pager a less:

php &gt; #cli.pager=less
php &gt; phpinfo();
(salida mostrada con less)
php &gt;

La directiva cli.prompt soporta algunas secuencias de escape:

    <caption>**Secuencias de escape de cli.prompt**</caption>



       Secuencia:
       Descripción:






       \e

        utilizado para agregar colores al prompt. Ejemplo:
        \e[032m\v \e[031m\b \e[34m\&gt; \e[0m




       \v
       La versión de PHP.



       \b

        Indica en qué bloque de PHP nos encontramos. Por ejemplo, /* permite indicar que estamos en un comentario multilínea. El ámbito externo se representa por php.




       \&gt;

        Indica el carácter utilizado para el prompt. Por defecto, será &gt;, pero puede cambiarse cuando el shell se encuentra en un bloque indeterminado o en una cadena de caracteres. Los caracteres posibles son: ' " {
        ( &gt;





**Nota**:

    Los archivos incluidos a través de [auto_prepend_file](#ini.auto-prepend-file) y [auto_append_file](#ini.auto-append-file) se analizan en este modo, pero con algunas restricciones; es decir, las funciones deben haber sido definidas antes de la llamada.

## Modo interactivo

    Si la extensión readline no está disponible, anterior a PHP 8.1.0, invocar el CLI SAPI con la opción **-a** proporciona el modo interactivo. En este modo, se supone que se da un script PHP completo a través de STDIN, y después de la interrupción con

     CTRL
     +D

    (POSIX) o

     CTRL
     +Z

    seguido de ENTER (Windows), este script será evaluado. Esto es básicamente idéntico a invocar el CLI SAPI sin la opción **-a**.




    A partir de PHP 8.1.0, invocar el CLI SAPI con la opción **-a** falla si la extensión readline no está disponible.

## Servidor web interno

**Advertencia**

    Este servidor web está destinado a ayudar en el desarrollo de aplicaciones. También puede ser útil para pruebas y para demostraciones de aplicaciones que se ejecutan en entornos controlados. Sin embargo, no está diseñado para ser un servidor web completo. Por lo tanto, no debe utilizarse en una red pública.

El CLI SAPI proporciona un servidor web interno.

El servidor web se ejecuta en un solo proceso single-threaded, las aplicaciones PHP se retrasarán/suspenderán si una solicitud está bloqueada.

Las solicitudes URI se sirven desde el directorio de trabajo actual donde se inició PHP, a menos que se utilice la opción -t para especificar explícitamente un documento raíz. Si una solicitud URI no especifica un archivo, entonces el archivo index.php o el archivo index.html del directorio actual será devuelto. Si ninguno de estos archivos existe, la búsqueda de un archivo index.php e index.html continuará en el directorio padre y así sucesivamente hasta que se encuentre uno de estos archivos o se alcance el directorio raíz. Si se encuentra un archivo index.php o index.html, se devolverá y $\_SERVER['PATH_INFO'] se establecerá como la última parte de la URI. De lo contrario, se devolverá un código de respuesta 404.

Si se proporciona un archivo PHP en la línea de comandos cuando se inicia el servidor web, se tratará como un script "ruteador". El script se ejecutará al inicio de cada solicitud HTTP. Si este script devuelve **[false](#constant.false)**, entonces el recurso solicitado se devolverá tal cual. De lo contrario, la salida del script se devolverá al navegador.

Los tipos MIME estándar se devuelven para archivos con las extensiones:
.3gp, .apk, .avi, .bmp, .css, .csv, .doc, .docx, .flac, .gif, .gz, .gzip, .htm, .html, .ics, .jpe, .jpeg, .jpg, .js, .kml, .kmz, .m4a, .mov, .mp3, .mp4, .mpeg, .mpg, .odp, .ods, .odt, .oga, .ogg, .ogv, .pdf, .png, .pps, .pptx, .qt, .svg, .swf, .tar, .text, .tif, .txt, .wav, .webm, .wmv, .xls, .xlsx, .xml, .xsl, .xsd, .zip
.

A partir de PHP 7.4.0, el servidor web integrado puede configurarse para bifurcar varios trabajadores para probar código que requiere múltiples solicitudes concurrentes al servidor web integrado. Establezca la variable de entorno PHP_CLI_SERVER_WORKERS en el número de trabajadores deseados antes de iniciar el servidor.

**Nota**:

    Esta funcionalidad no está soportada en Windows.

**Advertencia**

    Esta funcionalidad *experimental* no está destinada a ser utilizada en producción. En general, el Servidor Web integrado no está destinado a ser utilizado en producción.

**Ejemplo #1 Inicio del servidor web**

$ cd ~/public_html
$ php -S localhost:8000

    El terminal mostrará:

PHP 5.4.0 Development Server started at Thu Jul 21 10:43:28 2011
Listening on localhost:8000
Document root is /home/me/public_html
Press Ctrl-C to quit

    Después de las solicitudes URI a http://localhost:8000/ y http://localhost:8000/myscript.html, el terminal mostrará algo como:

PHP 5.4.0 Development Server started at Thu Jul 21 10:43:28 2011
Listening on localhost:8000
Document root is /home/me/public_html
Press Ctrl-C to quit.
[Thu Jul 21 10:48:48 2011] ::1:39144 GET /favicon.ico - Request read
[Thu Jul 21 10:48:50 2011] ::1:39146 GET / - Request read
[Thu Jul 21 10:48:50 2011] ::1:39147 GET /favicon.ico - Request read
[Thu Jul 21 10:48:52 2011] ::1:39148 GET /myscript.html - Request read
[Thu Jul 21 10:48:52 2011] ::1:39149 GET /favicon.ico - Request read

    Tenga en cuenta que antes de PHP 7.4.0, los recursos estáticos en enlace simbólico no son accesibles en Windows, a menos que el script ruteador lo maneje.

**Ejemplo #2 Inicio con un directorio raíz específico**

$ cd ~/public_html
$ php -S localhost:8000 -t foo/

    El terminal mostrará:

PHP 5.4.0 Development Server started at Thu Jul 21 10:50:26 2011
Listening on localhost:8000
Document root is /home/me/public_html/foo
Press Ctrl-C to quit

**Ejemplo #3 Uso de un script ruteador**

    En este ejemplo, solicitar imágenes las mostrará, pero las solicitudes de archivos HTML mostrarán "¡Bienvenido a PHP!".

&lt;?php
// router.php
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $\_SERVER["REQUEST_URI"])) {
return false; // devuelve la solicitud tal cual.
} else {
echo "&lt;p&gt;¡Bienvenido a PHP!&lt;/p&gt;";
}
?&gt;

$ php -S localhost:8000 router.php

**Ejemplo #4 Verificación de la utilización de CLI del servidor web**

    Para reutilizar un script ruteador del marco durante el desarrollo con el CLI del servidor web y luego continuar utilizándolo con un servidor web de producción:

&lt;?php
// router.php
if (php_sapi_name() == 'cli-server') {
/_ Activar la ruta estática y devolver FALSE _/
}
/_ continuar con las operaciones de un index.php normal _/
?&gt;

$ php -S localhost:8000 router.php

**Ejemplo #5 Manejo de tipos de archivos no soportados**

    Si necesita servir un recurso estático para el cual el tipo MIME no es manejado por el CLI del servidor web, use esto:

&lt;?php
// router.php
$path = pathinfo($\_SERVER["SCRIPT_FILENAME"]);
if ($path["extension"] == "el") {
    header("Content-Type: text/x-script.elisp");
    readfile($\_SERVER["SCRIPT_FILENAME"]);
}
else {
return FALSE;
}
?&gt;

$ php -S localhost:8000 router.php

**Ejemplo #6 Acceso al CLI del servidor web desde una máquina remota**

    Puede hacer que el servidor web sea accesible en el puerto 8000 para todas las interfaces con:

$ php -S 0.0.0.0:8000

**Advertencia**

     El servidor web integrado no debe utilizarse en una red pública.

## Configuraciones INI

    <caption>**Opciones de configuración CLI SAPI**</caption>



       Nombre
       Por defecto
       Cambiable
       Historial de cambios






       [cli_server.color](#ini.cli-server.color)
       "0"
       **[INI_ALL](#constant.ini-all)**
        




Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      cli_server.color
      [bool](#language.types.boolean)



       Activa el servidor web de desarrollo interno para utilizar la coloración ANSI del código en la salida del terminal.





# Recolección de basura (Garbage Collection)

## Tabla de contenidos

- [Bases sobre el conteo de referencias](#features.gc.refcounting-basics)
- [Limpieza de Ciclos](#features.gc.collecting-cycles)
- [Consideraciones sobre el rendimiento](#features.gc.performance-considerations)

    Esta sección explica los méritos del nuevo mecanismo de recolección de basura (también llamado
    GC, del término inglés Garbage Collection) disponible a partir de PHP 5.3.

    ## Bases sobre el conteo de referencias

    Una variable PHP se almacena internamente en un contenedor llamado "zval". Un contenedor
    zval contiene, además del tipo de la variable y su valor, dos informaciones adicionales.
    La primera se llama "is_ref" y es un valor booléano que indica si
    una variable forma parte de una referencia o no. Gracias a esta información, el motor de
    PHP sabe diferenciar las variables normales de las referencias. Como PHP permite
    al programador utilizar referencias, mediante el operador &amp;, un contenedor
    zval posee también un mecanismo de conteo de referencias para optimizar el uso
    de la memoria. Esta segunda información, llamada "refcount", contiene el número de
    variables (también llamadas símbolos) que apuntan a este contenedor zval. Todos los símbolos
    se almacenan en una tabla de símbolos, y hay una tabla por ámbito de visibilidad
    (scope). Hay un ámbito global para el script principal (el que se llama, por ejemplo, a través
    del navegador) y un ámbito por función o método.

    Un contenedor zval se crea cuando se crea una nueva variable con un valor
    constante, como por ejemplo:

    **Ejemplo #1 Creación de un nuevo contenedor zval**

&lt;?php
$a = "new string";
?&gt;

    En este caso, el nuevo símbolo a se crea en el ámbito global,
    y se crea un nuevo contenedor con el tipo [string](#language.types.string) y el valor
    new string. El bit "is_ref" se establece por omisión en **[false](#constant.false)** ya que ninguna
    referencia ha sido creada por el programador. El contador de referencias "refcount" se establece en
    1 ya que solo hay un símbolo que utiliza este contenedor.
    Es de destacar que las referencias (es decir, "is_ref" es **[true](#constant.true)**) con "refcount"
    1, se tratan como si no fueran
    referencias (es decir, como si "is_ref" fuera **[false](#constant.false)**). Si ha
    instalado [» Xdebug](http://xdebug.org/), puede mostrar esta
    información llamando a **xdebug_debug_zval()**.







     **Ejemplo #2 Mostrar información zval**




&lt;?php
$a = "new string";
xdebug_debug_zval('a');
?&gt;

     El ejemplo anterior mostrará:




a: (refcount=1, is_ref=0)='new string'

    Asignar esta variable a otro símbolo incrementará el refcount.







     **Ejemplo #3 Incrementar el refcount de una zval**




&lt;?php
$a = "new string";
$b = $a;
xdebug_debug_zval( 'a' );
?&gt;

     El ejemplo anterior mostrará:




a: (refcount=2, is_ref=0)='new string'

    El refcount vale 2 aquí, ya que el mismo contenedor está ligado
    tanto a a como a b. PHP es lo suficientemente
    inteligente como para no duplicar el contenedor cuando no es necesario.
    Los contenedores se destruyen cuando su "refcount" llega a cero. El
    "refcount" se decrementa en uno cuando cualquier símbolo ligado a
    un contenedor sale del ámbito (por ejemplo: cuando la función termina) o
    cuando un símbolo se desasigna (por ejemplo: por la llamada a [unset()](#function.unset)).
    El siguiente ejemplo lo demuestra:







     **Ejemplo #4 Decrementar el refcount de una zval**




&lt;?php
$a = "new string";
$c = $b = $a;
xdebug_debug_zval( 'a' );
$b = 42;
xdebug_debug_zval( 'a' );
unset( $c );
xdebug_debug_zval( 'a' );
?&gt;

     El ejemplo anterior mostrará:




a: (refcount=3, is_ref=0)='new string'
a: (refcount=2, is_ref=0)='new string'
a: (refcount=1, is_ref=0)='new string'

    Si ahora se llama a unset($a);, el contenedor zval, incluyendo
    el tipo y el valor, será eliminado de la memoria.





    ### Tipos compuestos



     Las cosas se complican en el caso de tipos compuestos como [array](#language.types.array) y
     [object](#language.types.object). A diferencia de los valores escalares, los
     [array](#language.types.array) y [object](#language.types.object) almacenan sus propiedades en una tabla de
     símbolos que les es propia. Esto significa que el siguiente ejemplo crea tres contenedores
     zval:







      **Ejemplo #5 Creación de una zval [array](#language.types.array)**




&lt;?php
$a = array( 'meaning' =&gt; 'life', 'number' =&gt; 42 );
xdebug_debug_zval( 'a' );
?&gt;

      Resultado del ejemplo anterior es similar a:




a: (refcount=1, is_ref=0)=array (
'meaning' =&gt; (refcount=1, is_ref=0)='life',
'number' =&gt; (refcount=1, is_ref=0)=42
)

      O gráficamente





        ![Zvals de un array simple](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-simple-array.png)





     Los tres contenedores zval son: a, meaning, y
     number. Las mismas reglas se aplican para el incremento y la
     decrementación de los "refcounts". A continuación, se añade otro elemento al array, y se asigna su valor con el contenido de un elemento ya existente del array:







      **Ejemplo #6 Añadir un elemento ya existente al array**




&lt;?php
$a = array( 'meaning' =&gt; 'life', 'number' =&gt; 42 );
$a['life'] = $a['meaning'];
xdebug_debug_zval( 'a' );
?&gt;

      Resultado del ejemplo anterior es similar a:




a: (refcount=1, is_ref=0)=array (
'meaning' =&gt; (refcount=2, is_ref=0)='life',
'number' =&gt; (refcount=1, is_ref=0)=42,
'life' =&gt; (refcount=2, is_ref=0)='life'
)

      O gráficamente





        ![Zvals para un array simple con una referencia](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-simple-array2.png)





     La salida Xdebug que vemos indica que el antiguo y el nuevo elemento del array
     apuntan ahora ambos a un contenedor zval cuyo "refcount" vale 2.
     Aunque la salida XDebug muestra dos contenedores zval con el valor 'life', son los
     mismos. La función **xdebug_debug_zval()** no muestra esto, pero se podría ver
     mostrando también el puntero de memoria.




     Eliminar un elemento del array es asimilable a la eliminación de un símbolo desde un
     espacio. Al hacerlo, el "refcount" del contenedor al que apunta el elemento del array se decrementa.
     Una vez más, si llega a cero, el contenedor zval se elimina de la memoria. El siguiente ejemplo lo demuestra:







      **Ejemplo #7 Eliminación de un elemento de array**




&lt;?php
$a = array( 'meaning' =&gt; 'life', 'number' =&gt; 42 );
$a['life'] = $a['meaning'];
unset( $a['meaning'], $a['number'] );
xdebug_debug_zval( 'a' );
?&gt;

      Resultado del ejemplo anterior es similar a:




a: (refcount=1, is_ref=0)=array (
'life' =&gt; (refcount=1, is_ref=0)='life'
)

     Ahora, las cosas se vuelven interesantes si añadimos el array
     como elemento de sí mismo. Hacemos esto en el siguiente ejemplo, utilizando un
     operador de referencia para evitar que PHP cree una copia:







      **Ejemplo #8 Añadir el array como referencia a sí mismo como elemento**




&lt;?php
$a = array( 'one' );
$a[] =&amp; $a;
xdebug_debug_zval( 'a' );
?&gt;

      Resultado del ejemplo anterior es similar a:




a: (refcount=2, is_ref=1)=array (
0 =&gt; (refcount=1, is_ref=0)='one',
1 =&gt; (refcount=2, is_ref=1)=...
)

      O gráficamente





        ![Zvals en un array con referencia circular](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-loop-array.png)





     Se puede ver que la variable array (a) así como el segundo elemento
     (1) apuntan ahora a un contenedor cuyo "refcount" vale
     2. Los "..." en la visualización indican una recursión, que, en este caso,
     significa que el "..." apunta al array mismo.




     Como antes, eliminar una variable elimina su símbolo, y el refcount del contenedor
     al que apuntaba se decrementa. Por lo tanto, si eliminamos la variable
     $a después de ejecutar el código anterior, el contador de referencias del
     contenedor al que apuntan $a y el elemento "1" se decrementará en uno,
     pasando de "2" a "1". Esto se puede representar como:







      **Ejemplo #9 Eliminación de $a**




(refcount=1, is_ref=1)=array (
0 =&gt; (refcount=1, is_ref=0)='one',
1 =&gt; (refcount=1, is_ref=1)=...
)

      O gráficamente





        ![Zvals después de la eliminación del array que contiene una referencia circular, fuga de memoria](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-leak-array.png)







    ### Problemas de limpieza


     Aunque ya no haya ningún símbolo en el espacio de variables actual que apunte
     a esta estructura, no puede ser limpiada, ya que el elemento "1" del array
     sigue apuntando a este mismo array. Como ya no hay ningún símbolo externo
     que apunte a esta estructura, el usuario no puede limpiarla manualmente;
     por lo tanto, hay una fuga de memoria. Afortunadamente, PHP destruirá esta estructura al final de
     la solicitud, pero antes de esta etapa, la memoria no se libera. Esta situación ocurre a menudo si se implementa un algoritmo de análisis u otras ideas donde se tiene un hijo que apunta a su padre. Lo mismo puede ocurrir, por supuesto, con los objetos, y es incluso más probable, ya que siempre se utilizan implícitamente por
     "[referencia](#language.oop5.references)".




     Esto puede no ser molesto si ocurre solo una o dos veces, pero si hay miles, o incluso millones,
     de estas fugas de memoria, entonces obviamente esto puede convertirse en un problema importante. Esto es particularmente problemático para los scripts
     que duran mucho tiempo, como los demonios para los cuales la solicitud nunca termina, o incluso en grandes suites de pruebas unitarias.
     Este último caso se encontró al lanzar las pruebas unitarias del componente Template de la
     biblioteca eZ Components. En algunos casos, la suite de pruebas requería más de 2Go de
     memoria, que el servidor de prueba no tenía realmente disponible.

## Limpieza de Ciclos

    Tradicionalmente, los mecanismos de conteo de referencias, como los utilizados anteriormente
    en PHP, no saben manejar las fugas de memoria debidas a referencias circulares;
    sin embargo, desde PHP 5.3.0, un algoritmo síncrono derivado del análisis
    [» Concurrent Cycle Collection in Reference Counted Systems](https://pages.cs.wisc.edu/~cymen/misc/interests/Bacon01Concurrent.pdf)
    se utiliza para abordar este problema en particular.




    Una explicación completa del funcionamiento del algoritmo iría un poco más allá del alcance de esta sección,
    pero aquí presentaremos los principios básicos. En primer lugar, estableceremos algunas reglas básicas.
    Si un refcount se incrementa, el contenedor siempre se utiliza, por lo tanto, no se limpia. Si el refcount
    se decrementa y llega a cero, el contenedor zval puede ser eliminado y la memoria liberada. En primer lugar, esto significa
    que los ciclos perturbadores solo pueden crearse cuando el refcount se decrementa a un valor
    diferente de cero. Luego, en un ciclo problemático, es posible detectar la basura verificando si es posible o no
    decrementar su refcount en uno, verificando luego qué zvals tienen un refcount a cero.









       ![Algoritmo de recolección de basura](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-gc-algorithm.png)




    Para evitar tener que llamar a la rutina de limpieza en cada decrementación de refcount posible,
    el algoritmo coloca todas las raíces zval en un "búfer de raíces" (marcándolas en "violeta").
    También se asegura de que cada raíz aparezca solo una vez en el búfer.
    El mecanismo de limpieza solo interviene cuando el búfer está lleno. Vea el paso A
    en la figura anterior.




    En el paso B, el algoritmo lanza una búsqueda en todas las raíces posibles, para
    decrementar en una unidad los refcounts de todas las zvals que encuentra, teniendo mucho
    cuidado de no decrementar dos veces el refcount de la misma zval (marcándolas
    como "grises"). En el paso C, el algoritmo relanza una búsqueda en todas las raíces
    posibles y escanea el valor de refcount de cada zval. Si encuentra un refcount a cero,
    la zval se marca como "blanca" (azul en la figura). Si encuentra un valor superior a cero,
    cancela la decrementación del refcount realizando una búsqueda desde este nodo, y las
    marca como "negras" nuevamente. En el último paso, D, el algoritmo recorre todo el
    búfer de raíces y las elimina, escaneando cada zval; cualquier zval marcada como "blanca" en el
    paso anterior será entonces eliminada de la memoria.




    Ahora que se sabe globalmente cómo funciona el algoritmo, se verá cómo se ha integrado en PHP. Por omisión, el recolector de basura de PHP está
    activado. Sin embargo, hay una opción de php.ini para cambiar esto:
    [zend.enable_gc](#ini.zend.enable-gc).




    Cuando el recolector de basura está activado, el algoritmo de búsqueda de ciclos
    descrito anteriormente se ejecuta cada vez que el búfer está lleno. El búfer de
    raíces tiene un tamaño fijado a 10.000 raíces (este parámetro es modificable gracias a
    **[GC_THRESHOLD_DEFAULT](#constant.gc-threshold-default)** en Zend/zend_gc.c
    en el código fuente de PHP, por lo tanto, se necesita una recompilación). Si el recolector de
    basura está desactivado, la búsqueda de ciclos también lo está. Sin embargo, las raíces
    posibles siempre se registrarán en el búfer, esto no depende de la activación
    del recolector de basura.




    Si el búfer está lleno mientras el mecanismo de limpieza está desactivado, las raíces
    ya no se registrarán. Estas raíces nunca serán analizadas por el algoritmo, y si
    formaban parte de referencias circulares, nunca se limpiarán, y causarán fugas de memoria.




    La razón por la que las raíces posibles se registran en el búfer
    incluso si el mecanismo está desactivado es que habría sido demasiado costoso verificar la posible
    activación del mecanismo en cada intento de agregar una raíz al búfer. El mecanismo
    de recolección de basura y análisis puede, por su parte, ser muy costoso en tiempo.




    Además de poder cambiar el valor del parámetro de configuración
    [zend.enable_gc](#ini.zend.enable-gc), también se puede activar o desactivar el mecanismo de
    recolección de basura llamando a las funciones [gc_enable()](#function.gc-enable) o
    [gc_disable()](#function.gc-disable) respectivamente. Utilizar estas funciones tendrá el mismo efecto que modificar el parámetro de configuración. También se tiene la posibilidad de forzar la ejecución del
    recolector de basura en un momento dado en el script, incluso si el búfer aún no
    está completamente lleno. Para ello, utilice la función [gc_collect_cycles()](#function.gc-collect-cycles),
    que devolverá el número de ciclos recolectados.




    Se puede tomar el control desactivando el recolector de basura o forzándolo a pasar en un momento dado porque algunas partes de la aplicación
    podrían depender fuertemente del tiempo de procesamiento, en cuyo caso se podría desear que el recolector de basura no se inicie. Por supuesto, al desactivar el recolector de basura para algunas partes de la aplicación, se corre el riesgo de crear
    fugas de memoria, ya que algunas raíces probables podrían no registrarse en el búfer de memoria de tamaño limitado.
    En consecuencia, generalmente se recomienda desencadenar manualmente el proceso gracias a
    [gc_collect_cycles()](#function.gc-collect-cycles) justo antes de la llamada a
    [gc_disable()](#function.gc-disable), para liberar memoria. Esto dejará un búfer
    vacío, y habrá más espacio para raíces probables cuando
    el mecanismo esté desactivado.

## Consideraciones sobre el rendimiento

    Ya se ha visto en las secciones anteriores que la recolección de raíces probables
    tenía un impacto muy ligero en el rendimiento, pero esto es en comparación con PHP 5.2 a
    PHP 5.3. Aunque el registro de raíces probables es más lento que no registrarlas en absoluto, como en PHP 5.2, otras mejoras aportadas por PHP 5.3
    hacen que esta operación no se sienta a nivel de rendimiento.




    Hay principalmente dos niveles para los cuales se afecta el rendimiento.
    El primero es la huella de memoria reducida, y el segundo es el retraso en la ejecución,
    cuando el mecanismo de limpieza realiza su operación de liberación de memoria.
    Se estudiarán estos dos ejes.





    ### Huella de memoria reducida


     En primer lugar, la razón principal de la implementación del mecanismo de recolección de basura
     es la reducción de la memoria consumida, limpiando las referencias circulares cuando
     se cumplen las condiciones requeridas.
     Con PHP, esto ocurre tan pronto como el búfer de raíces está lleno, o cuando se llama a la
     función [gc_collect_cycles()](#function.gc-collect-cycles). En el gráfico a continuación, se muestra el uso de memoria del siguiente script, con PHP 5.2 y con PHP 5.3, excluyendo
     la memoria obligatoria que PHP consume por sí mismo al inicio.







      **Ejemplo #1 Ejemplo de uso de memoria**




&lt;?php
class Foo
{
public $var = '3.14159265359';
public $self;
}

$baseMemory = memory_get_usage();

for ( $i = 0; $i &lt;= 100000; $i++ )
{
$a = new Foo;
$a-&gt;self = $a;
if ( $i % 500 === 0 )
{
echo sprintf( '%8d: ', $i ), memory_get_usage() - $baseMemory, "\n";
}
}
?&gt;

        ![Comparación del consumo de memoria entre PHP 5.2 y PHP 5.3](php-bigxhtml-data/images/12f37b1c6963c1c5c18f30495416a197-gc-benchmark.png)





     En este ejemplo algo académico, se crea un objeto que tiene un atributo que se referencia
     a sí mismo. Cuando la variable $a en el script se reasigna a
     la siguiente iteración, aparecerá una fuga de memoria. En este caso, los dos contenedores zval
     se fugan (el zval del objeto y el del atributo), pero solo se encuentra una raíz probable:
     la variable que ha sido eliminada. Cuando el búfer de raíces está lleno después de
     10.000 iteraciones (con un total de 10.000 raíces probables), el mecanismo de recolección de basura entra en juego y libera la memoria asociada a estas raíces probables. Esto se ve
     muy claramente en los gráficos de uso de memoria de PHP 5.3. Después de cada 10.000
     iteraciones, el mecanismo se desencadena y libera la memoria asociada a las variables circularmente
     referenciadas. El mecanismo en cuestión no tiene mucho trabajo en este ejemplo, porque la estructura que se fugó es extremadamente simple.
     El diagrma muestra que el uso máximo de memoria de PHP 5.3 es de aproximadamente
     9Mo, mientras que sigue aumentando con PHP 5.2.






    ### Ralentizaciones durante la ejecución


     El segundo punto donde el mecanismo de recolección de basura (GC) afecta el rendimiento
     es cuando se ejecuta para liberar la memoria "desperdiciada". Para cuantificar este
     impacto, se modifica ligeramente el script anterior para tener un número de iteraciones
     más alto y eliminar la recolección del uso de memoria intermedia.
     El segundo script se reproduce a continuación:







      **Ejemplo #2 Impacto de GC en el rendimiento**




&lt;?php
class Foo
{
public $var = '3.14159265359';
public $self;
}

for ( $i = 0; $i &lt;= 1000000; $i++ )
{
$a = new Foo;
$a-&gt;self = $a;
}

echo memory_get_peak_usage(), "\n";
?&gt;

     Se lanzará este script 2 veces, una vez con
     [zend.enable_gc](#ini.zend.enable-gc) en on, y una vez en off:







      **Ejemplo #3 Ejecución del script anterior**




time php -dzend.enable_gc=0 -dmemory_limit=-1 -n example2.php

# y

time php -dzend.enable_gc=1 -dmemory_limit=-1 -n example2.php

     En mi máquina, el primer comando parece durar siempre 10,7 segundos,
     mientras que el segundo comando tarda aproximadamente 11,4 segundos. Esto corresponde a un retraso
     de aproximadamente el 7%. Sin embargo, la cantidad total de memoria utilizada por el script se reduce
     en un 98%, pasando de 931Mo a 10Mo. Este benchmark no es muy científico ni representativo de aplicaciones reales, pero demuestra concretamente en qué medida el mecanismo
     de recolección de basura puede ser útil en términos de consumo de memoria. El punto positivo es que el retraso es siempre del 7%, en el caso particular de este script, mientras que
     la memoria preservada será cada vez más importante a medida que
     aparezcan referencias circulares durante la ejecución.






    ### Estadísticas internas del GC de PHP


     Es posible obtener algunas informaciones adicionales concernientes al mecanismo de recolección de basura
     interno de PHP. Pero para ello, se debe recompilar PHP con el soporte
     de benchmarking y recolección de datos. Se debe establecer la variable
     de entorno CFLAGS con -DGC_BENCH=1 antes
     de lanzar ./configure con las opciones que interesan.
     El siguiente ejemplo lo demuestra:







      **Ejemplo #4 Recompilar PHP para activar el soporte de benchmark del GC**




export CFLAGS=-DGC_BENCH=1
./config.nice
make clean
make

     Cuando se re-ejecuta el código del script anterior con el binario PHP recién reconstruido, se debería ver el siguiente resultado después de la ejecución:







      **Ejemplo #5 Estadísticas GC**




## GC Statistics

Runs: 110
Collected: 2072204
Root buffer length: 0
Root buffer peak: 10000

      Possible            Remove from  Marked
        Root    Buffered     buffer     grey
      --------  --------  -----------  ------

ZVAL 7175487 1491291 1241690 3611871
ZOBJ 28506264 1527980 677581 1025731

     Las estadísticas más interesantes se muestran en el primer bloque. Se ve aquí
     que el mecanismo de recolección de basura se ha desencadenado 110 veces, y que en total son
     más de 2 millones de asignaciones de memoria las que se han liberado durante estos 110 pasos.
     Tan pronto como el mecanismo haya intervenido al menos una vez, el pico del búfer de raíces es siempre
     de 10000.






    ### Conclusión


     En general, la recolección de basura de PHP solo causará un retraso
     cuando el algoritmo de recolección de ciclos se ejecute, lo que significa que en los scripts
     normales (más cortos), no debería haber ningún impacto en el rendimiento.




     Sin embargo, cuando el mecanismo de recolección de ciclos se desencadene en scripts
     normales, la reducción de la huella de memoria permitirá la ejecución paralela de un número mayor de estos scripts, ya que se utilizará menos memoria en total.




     Las ventajas se sienten más claramente en el caso de scripts demonio o que deben ejecutarse durante mucho tiempo. Así, para las aplicaciones [» PHP-GTK](http://gtk.php.net/) que a menudo
     duran más que los scripts web, el nuevo mecanismo debería reducir
     significativamente las fugas de memoria a largo plazo.

# Rastreo dinámico de DTrace

## Tabla de contenidos

- [Introducción a PHP y DTrace](#features.dtrace.introduction)
- [Usar PHP y DTrace](#features.dtrace.dtrace)
- [Usar SystemTap con las sondas estáticas DTrace de PHP](#features.dtrace.systemtap)

    ## Introducción a PHP y DTrace

    DTrace es un framework de rastreo siempre disponible, a bajo costo,
    disponible en varias plataformas, incluyendo Solaris, macOS,
    Oracle Linux y BSD. DTrace puede rastrear el comportamiento del sistema operativo
    y la ejecución de programas de usuario. Puede mostrar los valores de los argumentos y ser
    utilizado para deducir estadísticas de rendimiento. Las sondas son controladas por scripts
    creados por el usuario y escritos en el lenguaje de script DTrace D. Esto
    permite un análisis eficiente de los puntos de datos.

    Las sondas PHP que no son activamente monitoreadas por el script DTrace
    D del usuario no contienen código instrumentado, por lo que
    no hay degradación del rendimiento durante la ejecución normal de la aplicación.
    Las sondas que son monitoreadas tienen un costo de funcionamiento bastante bajo para
    generalmente permitir la supervisión de DTrace en sistemas de producción.

    PHP incorpora sondas de "Rastreo Estático Definido por el Usuario" (USDT)
    que se disparan en el momento de la ejecución. Por ejemplo, cuando un script D
    monitorea la sonda function-entry de PHP, entonces,
    cada vez que se llama a una función del script PHP, esta sonda se dispara y
    el código de acción del script D asociado se ejecuta. Este código de acción
    podría, por ejemplo, imprimir los argumentos de la sonda como la ubicación del fichero
    fuente de la función PHP. La acción también puede agrupar datos
    como el número de veces que se llama a cada función.

    Solo se describen aquí las sondas PHP USDT. Consulte la documentación externa
    general y específica del sistema operativo para ver cómo
    DTrace puede ser utilizado para trazar funciones arbitrarias, y cómo puede ser utilizado
    para trazar el comportamiento del sistema operativo. Tenga en cuenta que no todas las funcionalidades
    de DTrace están disponibles en todas las implementaciones de DTrace.

    Las sondas DTrace estáticas en PHP pueden alternativamente ser utilizadas con la función
    SystemTap en ciertas distribuciones Linux.

    ## Usar PHP y DTrace

    PHP puede ser configurado con las sondas estáticas DTrace en las plataformas
    que soportan el rastreo dinámico DTrace.

    ### Configurar PHP para las sondas estáticas de DTrace

    Consulte la documentación específica de la plataforma externa para habilitar
    el soporte de DTrace del sistema operativo. Por ejemplo, en Oracle Linux
    inicie un núcleo UEK3 y haga:

# modprobe fasttrap

# chmod 666 /dev/dtrace/helper

    En lugar de usar chmod, puede usar una regla de paquetado
    ACL para limitar el acceso al dispositivo a un usuario específico.





    Construir PHP con el parámetro de configuración --enable-dtrace:





# ./configure --enable-dtrace ...

# make

# make install

    Esto hace que las sondas estáticas estén disponibles en el núcleo de PHP. Todas las extensiones PHP
    que proporcionen sus propias sondas deben ser construidas por separado como extensiones
    compartidas.




    Para habilitar las sondas, definir la variable de entorno **USE_ZEND_DTRACE=1** a los procesos PHP objetivo.

### Sondas estáticas DTrace en el núcleo de PHP

   <caption>**Las siguientes sondas estáticas están disponibles en PHP**</caption>
   
    
     
      Nombre de la sonda
      Descripción de la sonda
      Argumentos de la sonda


      request-startup
      Se dispara cuando una petición comienza.
      char *file, char *request_uri, char *request_method



      request-shutdown
      Se dispara cuando una petición se detiene.
      char *file, char *request_uri, char *request_method



      compile-file-entry
      Se dispara cuando comienza la compilación de un script.
      char *compile_file, char *compile_file_translated



      compile-file-return
      Se dispara cuando termina la compilación de un script.
      char *compile_file, char *compile_file_translated



      execute-entry
      Se dispara cuando un array de opcodes debe ser ejecutado.
      Por ejemplo, se dispara en llamadas de función, inclusiones y reanudaciones de
      generador.
      char *request_file, int lineno



      execute-return
      Se dispara después de la ejecución de un array de opcodes.
      char *request_file, int lineno



      function-entry
      Se dispara cuando el motor de PHP entra en una función PHP o una llamada de método.
      char *function_name, char *request_file, int lineno, char *classname, char *scope



      function-return
      Se dispara cuando el motor PHP regresa de una función PHP o una llamada de método.
      char *function_name, char *request_file, int lineno, char *classname, char *scope



      exception-thrown
      Se dispara cuando se lanza una excepción.
      char *classname



      exception-caught
      Se dispara cuando se captura una excepción.
      char *classname



      error
      Se dispara cuando ocurre un error, independientemente del nivel de [error_reporting](#ini.error-reporting).
      char *errormsg, char *request_file, int lineno


Las extensiones PHP también pueden disponer de sondas estáticas adicionales.

### Lista de sondas estáticas DTrace de PHP

    Para listar las sondas disponibles, inicie un proceso PHP y luego ejecute:





# dtrace -l

    El resultado será similar al siguiente:





ID PROVIDER MODULE FUNCTION NAME
[ . . . ]
4 php15271 php dtrace_compile_file compile-file-entry
5 php15271 php dtrace_compile_file compile-file-return
6 php15271 php zend_error error
7 php15271 php ZEND_CATCH_SPEC_CONST_CV_HANDLER exception-caught
8 php15271 php zend_throw_exception_internal exception-thrown
9 php15271 php dtrace_execute_ex execute-entry
10 php15271 php dtrace_execute_internal execute-entry
11 php15271 php dtrace_execute_ex execute-return
12 php15271 php dtrace_execute_internal execute-return
13 php15271 php dtrace_execute_ex function-entry
14 php15271 php dtrace_execute_ex function-return
15 php15271 php php_request_shutdown request-shutdown
16 php15271 php php_request_startup request-startup

    Los valores de la columna Provider son php y
    el identificador del proceso PHP en ejecución.





    Si el servidor web Apache está en ejecución, el nombre del módulo podría ser,
    por ejemplo, libphp5.so, y habría
    varios bloques de listas, uno por cada proceso Apache en ejecución.





    La columna Función hace referencia a la implementación interna en C
    de PHP, donde se encuentra cada proveedor.





    Si no hay un proceso PHP en ejecución, no se mostrará ninguna sonda PHP.

### DTrace con un ejemplo PHP

    Este ejemplo muestra los fundamentos del lenguaje de script DTrace D.



     **Ejemplo #1 all_probes.d para trazar todas las sondas estáticas PHP con DTrace**




#!/usr/sbin/dtrace -Zs

#pragma D option quiet

php\*:::compile-file-entry
{
printf("PHP compile-file-entry\n");
printf(" compile_file %s\n", copyinstr(arg0));
printf(" compile_file_translated %s\n", copyinstr(arg1));
}

php\*:::compile-file-return
{
printf("PHP compile-file-return\n");
printf(" compile_file %s\n", copyinstr(arg0));
printf(" compile_file_translated %s\n", copyinstr(arg1));
}

php\*:::error
{
printf("PHP error\n");
printf(" errormsg %s\n", copyinstr(arg0));
printf(" request_file %s\n", copyinstr(arg1));
printf(" lineno %d\n", (int)arg2);
}

php\*:::exception-caught
{
printf("PHP exception-caught\n");
printf(" classname %s\n", copyinstr(arg0));
}

php\*:::exception-thrown
{
printf("PHP exception-thrown\n");
printf(" classname %s\n", copyinstr(arg0));
}

php\*:::execute-entry
{
printf("PHP execute-entry\n");
printf(" request_file %s\n", copyinstr(arg0));
printf(" lineno %d\n", (int)arg1);
}

php\*:::execute-return
{
printf("PHP execute-return\n");
printf(" request_file %s\n", copyinstr(arg0));
printf(" lineno %d\n", (int)arg1);
}

php\*:::function-entry
{
printf("PHP function-entry\n");
printf(" function_name %s\n", copyinstr(arg0));
printf(" request_file %s\n", copyinstr(arg1));
printf(" lineno %d\n", (int)arg2);
printf(" classname %s\n", copyinstr(arg3));
printf(" scope %s\n", copyinstr(arg4));
}

php\*:::function-return
{
printf("PHP function-return\n");
printf(" function_name %s\n", copyinstr(arg0));
printf(" request_file %s\n", copyinstr(arg1));
printf(" lineno %d\n", (int)arg2);
printf(" classname %s\n", copyinstr(arg3));
printf(" scope %s\n", copyinstr(arg4));
}

php\*:::request-shutdown
{
printf("PHP request-shutdown\n");
printf(" file %s\n", copyinstr(arg0));
printf(" request_uri %s\n", copyinstr(arg1));
printf(" request_method %s\n", copyinstr(arg2));
}

php\*:::request-startup
{
printf("PHP request-startup\n");
printf(" file %s\n", copyinstr(arg0));
printf(" request_uri %s\n", copyinstr(arg1));
printf(" request_method %s\n", copyinstr(arg2));
}

    Este script utiliza la opción -Z de
    dtrace, lo que le permite ejecutarse cuando no hay
    ningún proceso PHP en ejecución. Si se omitiera esta opción, el script
    terminaría inmediatamente porque sabe que ninguna de las sondas a
    monitorear existe.





    El script traza todos los puntos de sondeo estáticos de PHP durante la
    duración de un script PHP en ejecución. Ejecute el script D:





# ./all_probes.d

    Ejecute un script o una aplicación PHP. El script D de monitoreo
    mostrará los argumentos de cada sonda a medida que se dispare.





    Cuando el monitoreo haya terminado, el script D puede ser interrumpido con un
    CTRL+C





    En máquinas multi-CPU, el orden de las sondas puede no ser secuencial.
    Esto depende del CPU que ha procesado las sondas,
    y de cómo los hilos migran de un CPU a otro. La visualización de los timestamps de las sondas
    permite reducir la confusión, por ejemplo :





php\*:::function-entry
{
printf("%lld: PHP function-entry ", walltimestamp);
[ . . .]
}

### Ver también

    - [OCI8 y el rastreo dinámico DTrace](#oci8.dtrace)

## Usar SystemTap con las sondas estáticas DTrace de PHP

En ciertas distribuciones Linux, la utilidad de rastreo SystemTap puede
ser utilizada para trazar las sondas estáticas DTrace de PHP. Esto está disponible con
PHP 5.4.20 y PHP 5.5.

### Instalar PHP con SystemTap

    Instale el paquete de desarrollo SDT de SystemTap:





# yum install systemtap-sdt-devel

    Instalar PHP con las sondas DTrace habilitadas:





# ./configure --enable-dtrace ...

# make

### Lista de sondas estáticas con SystemTap

    Las sondas estáticas en PHP pueden ser listadas utilizando stap:





# stap -l 'process.provider("php").mark("\*")' -c 'sapi/cli/php -i'

    Esto produce:





process("sapi/cli/php").provider("php").mark("compile**file**entry")
process("sapi/cli/php").provider("php").mark("compile**file**return")
process("sapi/cli/php").provider("php").mark("error")
process("sapi/cli/php").provider("php").mark("exception**caught")
process("sapi/cli/php").provider("php").mark("exception**thrown")
process("sapi/cli/php").provider("php").mark("execute**entry")
process("sapi/cli/php").provider("php").mark("execute**return")
process("sapi/cli/php").provider("php").mark("function**entry")
process("sapi/cli/php").provider("php").mark("function**return")
process("sapi/cli/php").provider("php").mark("request**shutdown")
process("sapi/cli/php").provider("php").mark("request**startup")

### SystemTap con un Ejemplo PHP

     **Ejemplo #1 all_probes.stp para trazar todas las sondas estáticas PHP con SystemTap**




probe process("sapi/cli/php").provider("php").mark("compile**file**entry") {
printf("Probe compile**file**entry\n");
printf(" compile_file %s\n", user_string($arg1));
    printf("  compile_file_translated %s\n", user_string($arg2));
}
probe process("sapi/cli/php").provider("php").mark("compile**file**return") {
printf("Probe compile**file**return\n");
printf(" compile_file %s\n", user_string($arg1));
    printf("  compile_file_translated %s\n", user_string($arg2));
}
probe process("sapi/cli/php").provider("php").mark("error") {
printf("Probe error\n");
printf(" errormsg %s\n", user_string($arg1));
    printf("  request_file %s\n", user_string($arg2));
printf(" lineno %d\n", $arg3);
}
probe process("sapi/cli/php").provider("php").mark("exception__caught") {
    printf("Probe exception__caught\n");
    printf("  classname %s\n", user_string($arg1));
}
probe process("sapi/cli/php").provider("php").mark("exception**thrown") {
printf("Probe exception**thrown\n");
printf(" classname %s\n", user_string($arg1));
}
probe process("sapi/cli/php").provider("php").mark("execute__entry") {
    printf("Probe execute__entry\n");
    printf("  request_file %s\n", user_string($arg1));
printf(" lineno %d\n", $arg2);
}
probe process("sapi/cli/php").provider("php").mark("execute__return") {
    printf("Probe execute__return\n");
    printf("  request_file %s\n", user_string($arg1));
printf(" lineno %d\n", $arg2);
}
probe process("sapi/cli/php").provider("php").mark("function__entry") {
    printf("Probe function__entry\n");
    printf("  function_name %s\n", user_string($arg1));
printf(" request_file %s\n", user_string($arg2));
    printf("  lineno %d\n", $arg3);
    printf("  classname %s\n", user_string($arg4));
printf(" scope %s\n", user_string($arg5));
}
probe process("sapi/cli/php").provider("php").mark("function__return") {
    printf("Probe function__return: %s\n", user_string($arg1));
printf(" function_name %s\n", user_string($arg1));
    printf("  request_file %s\n", user_string($arg2));
printf(" lineno %d\n", $arg3);
    printf("  classname %s\n", user_string($arg4));
printf(" scope %s\n", user_string($arg5));
}
probe process("sapi/cli/php").provider("php").mark("request__shutdown") {
    printf("Probe request__shutdown\n");
    printf("  file %s\n", user_string($arg1));
printf(" request_uri %s\n", user_string($arg2));
    printf("  request_method %s\n", user_string($arg3));
}
probe process("sapi/cli/php").provider("php").mark("request**startup") {
printf("Probe request**startup\n");
printf(" file %s\n", user_string($arg1));
    printf("  request_uri %s\n", user_string($arg2));
printf(" request_method %s\n", user_string($arg3));
}

    El script anterior trazará todos los puntos de sondeo estáticos de PHP
    durante toda la duración de la ejecución de un script PHP:





# stap -c 'sapi/cli/php test.php' all_probes.stp

- [Identificación HTTP con PHP](#features.http-auth)
- [Cookies](#features.cookies)
- [Sesiones](#features.sessions)
- [Gestión de cargas de ficheros](#features.file-upload)<li>[Cargas de ficheros por método POST](#features.file-upload.post-method)
- [Explicación sobre los mensajes de errores de carga de ficheros](#features.file-upload.errors)
- [Errores clásicos](#features.file-upload.common-pitfalls)
- [Cargar múltiples ficheros simultáneamente](#features.file-upload.multiple)
- [Carga por método PUT](#features.file-upload.put-method)
- [Ver también](#features.file-upload.errors.seealso)
  </li>- [Uso de ficheros a distancia](#features.remote-files)
- [Gestión de las conexiones](#features.connection-handling)
- [Conexiones persistentes a bases de datos](#features.persistent-connections)
- [Utilización de líneas de comando](#features.commandline) — Utilización de la línea de comandos<li>[Diferencia con otros SAPIs](#features.commandline.differences)
- [Opciones](#features.commandline.options) — Opciones de línea de comandos
- [Utilización](#features.commandline.usage) — Ejecución de archivos PHP
- [Flujos I/O](#features.commandline.io-streams) — Flujos de entrada/salida
- [Shell Interactivo](#features.commandline.interactive)
- [Servidor web interno](#features.commandline.webserver)
- [Configuraciones INI](#features.commandline.ini)
  </li>- [Recolección de basura (Garbage Collection)](#features.gc)<li>[Bases sobre el conteo de referencias](#features.gc.refcounting-basics)
- [Limpieza de Ciclos](#features.gc.collecting-cycles)
- [Consideraciones sobre el rendimiento](#features.gc.performance-considerations)
  </li>- [Rastreo dinámico de DTrace](#features.dtrace)<li>[Introducción a PHP y DTrace](#features.dtrace.introduction)
- [Usar PHP y DTrace](#features.dtrace.dtrace)
- [Usar SystemTap con las sondas estáticas DTrace de PHP](#features.dtrace.systemtap)
  </li>
