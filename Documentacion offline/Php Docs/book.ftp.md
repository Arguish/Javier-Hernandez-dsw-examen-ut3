# FTP

# Introducción

Las funciones en esta extensión implementan el acceso por parte del cliente a los
servidores de ficheros que "hablen" el Protocolo de Transferencia de Ficheros (FTP) como se define en
[» https://datatracker.ietf.org/doc/html/rfc959](https://datatracker.ietf.org/doc/html/rfc959). Esta extensión tiene
como propósito el acceso detallado a un servidor FTP proporcionando una amplia gama
de controles para el script en ejecución. Si sólo desea leer
o escribir un fichero en un servidor FTP, considere el uso de
las [envolturas ftp://](#wrappers.ftp)
con las [funciones de sistema de ficheros](#ref.filesystem),
las cuales proporcionan una interfaz más sencilla e intuitiva.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#ftp.installation)
- [Tipos de recursos](#ftp.resources)

## Instalación

Para activar el módulo FTP en la configuración de PHP, debe utilizarse la opción **--enable-ftp**.

En Autotools, el soporte FTP SSL se activa implícitamente durante la compilación
con la extensión openssl utilizando la opción de configuración
**--with-openssl**. Durante la compilación sin
la extensión openssl, la opción de configuración Autotools
**--with-ftp-ssl** puede ser utilizada para activar
explícitamente el soporte FTP SSL.

En Windows, esta extensión siempre se construye como
extensión compartida, por lo que debe ser activada en el php.ini.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        La opción de configuración Autotools **--with-openssl-dir**
        ha sido eliminada en favor de la nueva
        **--with-ftp-ssl** que activa explícitamente el
        soporte FTP SSL durante la compilación sin la extensión openssl.





## Tipos de recursos

Antes de PHP 8.1.0, esta extensión utilizaba un tipo de recurso,
que es el identificador de enlace de la conexión FTP devuelto por
[ftp_connect()](#function.ftp-connect) o [ftp_ssl_connect()](#function.ftp-ssl-connect).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[FTP_ASCII](#constant.ftp-ascii)**
    ([int](#language.types.integer))









    **[FTP_AUTOSEEK](#constant.ftp-autoseek)**
    ([int](#language.types.integer))



     Ver [ftp_set_option()](#function.ftp-set-option) para más información.







    **[FTP_AUTORESUME](#constant.ftp-autoresume)**
    ([int](#language.types.integer))



     Determinar automáticamente la posición de reanudación y la
     posición de inicio para las peticiones GET y PUT
     (solo funciona si FTP_AUTOSEEK está activado)







    **[FTP_FAILED](#constant.ftp-failed)**
    ([int](#language.types.integer))



     La transferencia asíncrona ha fallado







    **[FTP_FINISHED](#constant.ftp-finished)**
    ([int](#language.types.integer))



     La transferencia asíncrona ha finalizado







    **[FTP_MOREDATA](#constant.ftp-moredata)**
    ([int](#language.types.integer))



     La transferencia asíncrona sigue activa







    **[FTP_TEXT](#constant.ftp-text)**
    ([int](#language.types.integer))


    Alias de **[FTP_ASCII](#constant.ftp-ascii)**.






    **[FTP_BINARY](#constant.ftp-binary)**
    ([int](#language.types.integer))









    **[FTP_IMAGE](#constant.ftp-image)**
    ([int](#language.types.integer))


    Alias de **[FTP_BINARY](#constant.ftp-binary)**.






    **[FTP_TIMEOUT_SEC](#constant.ftp-timeout-sec)**
    ([int](#language.types.integer))



     Ver [ftp_set_option()](#function.ftp-set-option) para más información.







    **[FTP_USEPASVADDRESS](#constant.ftp-usepasvaddress)**
    ([int](#language.types.integer))



     Ver [ftp_set_option()](#function.ftp-set-option) para más información.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#ftp.examples-basic)

    ## Uso básico

    **Ejemplo #1 Ejemplo con FTP**

&lt;?php
// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Verificación de la conexión
if ((!$ftp) || (!$login_result)) {
echo "¡La conexión FTP ha fallado!";
echo "Intento de conexión al servidor $ftp_server para el usuario $ftp_user_name";
exit;
} else {
echo "Conexión al servidor $ftp_server, para el usuario $ftp_user_name";
}

// Carga de un fichero
$upload = ftp_put($ftp, $destination_file, $source_file, FTP_BINARY);

// Verificación del estado de la carga
if (!$upload) {
echo "¡La carga FTP ha fallado!";
} else {
echo "Carga de $source_file hacia $ftp_server como $destination_file";
}

// Cierre de la conexión FTP
ftp_close($ftp);
?&gt;

# Funciones de FTP

# ftp_alloc

(PHP 5, PHP 7, PHP 8)

ftp_alloc — Asigna espacio para una descarga de fichero

### Descripción

**ftp_alloc**([FTP\Connection](#class.ftp-connection) $ftp, [int](#language.types.integer) $size, [string](#language.types.string) &amp;$response = **[null](#constant.null)**): [bool](#language.types.boolean)

**ftp_alloc()** envía el comando FTP ALLO
para asignar espacio en el servidor FTP de filesize
bytes.

**Nota**:

    Muchos servidores FTP no soportan este comando. Estos
    servidores pueden devolver un código de error (**[false](#constant.false)**) que indica
    que el comando no es soportado, o (**[true](#constant.true)**) para indicar que la
    preasignación no es necesaria: el cliente continúa entonces sus
    operaciones de la misma forma. Debido a esto, es preferible
    utilizar esta función solo con los servidores que requieran
    específicamente esta función.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     size


       El número de bytes a asignar.






     response


       Una representación textual de la respuesta del servidor que será devuelta
       por referencia en response si se proporciona una variable.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_alloc()**

&lt;?php

$file = "/home/user/myfile";

// Conexión al servidor
$ftp = ftp_connect('ftp.example.com');
$login_result = ftp_login($ftp, 'anonymous', 'user@example.com');

if (ftp_alloc($ftp, filesize($file), $result)) {
  echo "Espacio asignado con éxito en el servidor. Enviando $file.\n";
  ftp_put($ftp, '/incoming/myfile', $file, FTP_BINARY);
} else {
echo "No se pudo asignar el espacio en el servidor. Respuesta del servidor: $result\n";
}

ftp_close($ftp);

?&gt;

### Ver también

    - [ftp_put()](#function.ftp-put) - Carga un fichero en un servidor FTP

    - [ftp_fput()](#function.ftp-fput) - Carga un fichero en un servidor FTP

# ftp_append

(PHP 7 &gt;= 7.2.0, PHP 8)

ftp_append — Añade el contenido de un fichero a otro fichero en el servidor FTP

### Descripción

**ftp_append**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $remote_filename,
    [string](#language.types.string) $local_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





    remote_filename


       El nombre del fichero remoto al que se añadirá el contenido.






    local_filename


       El nombre del fichero local cuyo contenido se añadirá al fichero remoto.






    mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o **[FTP_BINARY](#constant.ftp-binary)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

# ftp_cdup

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_cdup — Cambia de directorio y pasa al directorio padre

### Descripción

**ftp_cdup**([FTP\Connection](#class.ftp-connection) $ftp): [bool](#language.types.boolean)

**ftp_cdup()** cambia de directorio y pasa al directorio padre.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_cdup()**

&lt;?php
// Configuración de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con nombre de usuario y contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Modifica el directorio actual a html
ftp_chdir($ftp, 'html');

echo ftp_pwd($ftp); // /html

// Regreso al directorio padre
if (ftp_cdup($ftp)) {
echo "éxito de cdup\n";
} else {
echo "Fallo de cdup\n";
}

echo ftp_pwd($ftp); // /

ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_chdir()](#function.ftp-chdir) - Modifica el directorio FTP actual

    - [ftp_pwd()](#function.ftp-pwd) - Devuelve el nombre del directorio actual

# ftp_chdir

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_chdir — Modifica el directorio FTP actual

### Descripción

**ftp_chdir**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory): [bool](#language.types.boolean)

**ftp_chdir()** modifica el directorio actual a
directory.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       El directorio destino.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si el cambio falla, PHP también generará una advertencia.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_chdir()**

&lt;?php

// Configuración de una conexión básica
$ftp = ftp_connect($ftp_server)

// Autenticación con nombre de usuario y contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Verificación de la conexión
if ((!$ftp) || (!$login_result)) {
die("¡Fallo en la conexión FTP!");
}

echo "Directorio actual: " . ftp_pwd($ftp) . "\n";

// Intento de cambiar al directorio "somedir"
if (ftp_chdir($ftp, "somedir")) {
    echo "El directorio actual es ahora: " . ftp_pwd($ftp) . "\n";
} else {
echo "No se pudo cambiar de directorio\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_cdup()](#function.ftp-cdup) - Cambia de directorio y pasa al directorio padre

    - [ftp_pwd()](#function.ftp-pwd) - Devuelve el nombre del directorio actual

# ftp_chmod

(PHP 5, PHP 7, PHP 8)

ftp_chmod — Modifica los permisos de un fichero mediante FTP

### Descripción

**ftp_chmod**([FTP\Connection](#class.ftp-connection) $ftp, [int](#language.types.integer) $permissions, [string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

**ftp_chmod()** modifica los permisos de acceso al fichero
filename en el servidor FTP
ftp, asignándole los permisos de
permissions, especificado en forma de entero en base octal.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     permissions


       Los nuevos permisos, dados como valor *octal*.






     filename


       El fichero remoto.





### Valores devueltos

Devuelve los nuevos permisos del fichero en caso de éxito, o **[false](#constant.false)**
si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_chmod()**

&lt;?php
$file = 'public_html/index.php';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Autenticación con nombre de usuario y contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de modificación de los permisos del fichero $file a 644
if (ftp_chmod($ftp, 0644, $file) !== false) {
echo "Los permisos del fichero $file han sido modificados correctamente a 644\n";
} else {
echo "No ha sido posible modificar los permisos del fichero $file\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [chmod()](#function.chmod) - Cambia el modo del fichero

# ftp_close

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ftp_close — Cierra una conexión FTP

### Descripción

**ftp_close**([FTP\Connection](#class.ftp-connection) $ftp): [bool](#language.types.boolean)

**ftp_close()** cierra la conexión
ftp y libera los recursos.

**Nota**:

    Tras llamar a esta función, ya no es posible
    utilizar la antigua conexión, y debe abrirse una nueva
    con [ftp_connect()](#function.ftp-connect).

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_close()**

&lt;?php

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Autenticación con nombre de usuario y contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Mostrar el directorio actual
echo ftp_pwd($ftp); // /

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_connect()](#function.ftp-connect) - Establece una conexión FTP

# ftp_connect

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_connect — Establece una conexión FTP

### Descripción

**ftp_connect**([string](#language.types.string) $hostname, [int](#language.types.integer) $port = 21, [int](#language.types.integer) $timeout = 90): [FTP\Connection](#class.ftp-connection)|[false](#language.types.singleton)

**ftp_connect()** establece una conexión FTP con el host
hostname.

### Parámetros

     hostname


       La dirección del servidor FTP. Este argumento nunca debe terminar con una barra y no debe estar prefijado con ftp://.






     port


       Este argumento especifica un número de puerto alternativo para la conexión. Si se omite o se define como cero, se utilizará el puerto FTP por defecto, 21.






     timeout


       Este argumento especifica el tiempo de espera de conexión en segundos para todas las operaciones de red posteriores. Si se omite, el valor por defecto será de 90 segundos. El tiempo de espera de conexión puede modificarse y consultarse en cualquier momento con las funciones [ftp_set_option()](#function.ftp-set-option) y [ftp_get_option()](#function.ftp-get-option).





### Valores devueltos

Devuelve una instancia de [FTP\Connection](#class.ftp-connection) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [FTP\Connection](#class.ftp-connection); anteriormente se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_connect()**

&lt;?php

$ftp_server = "ftp.example.com";

// Establecimiento de una conexión
$ftp = ftp_connect($ftp_server) or die("No se puede conectar al servidor $ftp_server");

?&gt;

### Ver también

    - [ftp_close()](#function.ftp-close) - Cierra una conexión FTP

    - [ftp_ssl_connect()](#function.ftp-ssl-connect) - Abierto una conexión FTP segura con SSL

# ftp_delete

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_delete — Elimina un fichero en un servidor FTP

### Descripción

**ftp_delete**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $filename): [bool](#language.types.boolean)

**ftp_delete()** elimina el fichero filename
en un servidor FTP.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     filename


       El fichero a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_delete()**

&lt;?php
$file = 'public_html/old.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de eliminar el fichero $file
if (ftp_delete($ftp, $file)) {
 echo "$file eliminado con éxito\n";
} else {
echo "No se pudo eliminar el fichero $file\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

# ftp_exec

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

ftp_exec — Ejecuta un comando en un servidor FTP

### Descripción

**ftp_exec**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $command): [bool](#language.types.boolean)

**ftp_exec()** envía un comando SITE EXEC
al servidor FTP, para que ejecute el programa command.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     command


       El comando a ejecutar.





### Valores devueltos

Devuelve **[true](#constant.true)** si el comando se ejecutó con éxito (el servidor
envía el código de respuesta: 200); de lo contrario, devuelve **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_exec()**

&lt;?php

// Inicialización de la variable
$command = 'ls -al &gt;files.txt';

// Inicialización de la conexión
$ftp = ftp_connect($ftp_server);

// Identificación
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Ejecución de un comando
if (ftp_exec($ftp, $command)) {
    echo "$command se ejecutó con éxito\n";
} else {
echo "No se pudo ejecutar: $command\n";
}

// Cierre de la conexión
ftp_close($ftp);

?&gt;

### Ver también

    - [ftp_raw()](#function.ftp-raw) - Envía una orden FTP bruta

# ftp_fget

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_fget — Descarga un fichero a través de FTP en un fichero local

### Descripción

**ftp_fget**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [resource](#language.types.resource) $stream,
    [string](#language.types.string) $remote_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [bool](#language.types.boolean)

**ftp_fget()** descarga el fichero
remote_filename desde el servidor FTP y lo escribe
en el fichero identificado por stream.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     stream


       Un puntero de fichero abierto en el que se escriben los datos.






     remote_filename


       La ruta hacia el fichero remoto.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición del fichero remoto desde la cual comienza la descarga.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_fget()**

&lt;?php

// Ruta hacia el fichero remoto
$remote_file = 'somefile.txt';
$local_file = 'localfile.txt';

// Apertura del fichero para escritura
$handle = fopen($local_file, 'w');

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de descargar el fichero $remote_file y guardarlo en $handle
if (ftp_fget($ftp, $handle, $remote_file, FTP_ASCII, 0)) {
echo "Escritura en el fichero $local_file con éxito\n";
} else {
echo "Hay un problema durante la descarga del fichero $remote_file en $local_file\n";
}

// Cierre de la conexión y del puntero de fichero
ftp_close($ftp);
fclose($handle);
?&gt;

### Ver también

    - [ftp_get()](#function.ftp-get) - Descarga un fichero desde un servidor FTP

    - [ftp_nb_get()](#function.ftp-nb-get) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

    - [ftp_nb_fget()](#function.ftp-nb-fget) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

# ftp_fput

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_fput — Carga un fichero en un servidor FTP

### Descripción

**ftp_fput**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $remote_filename,
    [resource](#language.types.resource) $stream,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [bool](#language.types.boolean)

**ftp_fput()** carga los datos del fichero
identificado por stream hasta el final del fichero.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     remote_filename


       La ruta hacia el fichero remoto.






     stream


       Un puntero de fichero abierto sobre el fichero local. La lectura se detiene al final
       del fichero.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto a partir de la cual
       comenzará la carga.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode es ahora opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_fput()**

&lt;?php

// Apertura de algunos ficheros para lectura
$file = 'somefile.txt';
$fp = fopen($file, 'r');

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de cargar el fichero $file
if (ftp_fput($ftp, $file, $fp, FTP_ASCII)) {
echo "Carga exitosa del fichero $file\n";
} else {
echo "Hubo un problema durante la carga del fichero $file\n";
}

// Cierre de la conexión y del puntero de fichero
ftp_close($ftp);
fclose($fp);

?&gt;

### Ver también

    - [ftp_put()](#function.ftp-put) - Carga un fichero en un servidor FTP

    - [ftp_nb_fput()](#function.ftp-nb-fput) - Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)

    - [ftp_nb_put()](#function.ftp-nb-put) - Envía un fichero a un servidor FTP (no bloqueante)

# ftp_get

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_get — Descarga un fichero desde un servidor FTP

### Descripción

**ftp_get**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $local_filename,
    [string](#language.types.string) $remote_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [bool](#language.types.boolean)

**ftp_get()** descarga el fichero
remote_filename desde el servidor FTP, y lo guarda en
el fichero local local_filename.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     local_filename


       La ruta hacia el fichero local (será sobrescrito si el fichero ya existe).






     remote_filename


       La ruta hacia el fichero remoto.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto desde la cual comienza la descarga.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_get()**

&lt;?php

// Definición de algunas variables
$local_file = 'local.zip';
$server_file = 'server.zip';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de descargar el fichero $server_file y guardarlo en el fichero $local_file
if (ftp_get($ftp, $local_file, $server_file, FTP_BINARY)) {
echo "El fichero $local_file ha sido escrito con éxito\n";
} else {
echo "Hay un problema\n";
}

// Cierre de la conexión
ftp_close($ftp);

?&gt;

### Ver también

    - [ftp_pasv()](#function.ftp-pasv) - Activa o desactiva el modo pasivo

    - [ftp_fget()](#function.ftp-fget) - Descarga un fichero a través de FTP en un fichero local

    - [ftp_nb_get()](#function.ftp-nb-get) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

    - [ftp_nb_fget()](#function.ftp-nb-fget) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

# ftp_get_option

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ftp_get_option — Lee diferentes opciones para la conexión FTP actual

### Descripción

**ftp_get_option**([FTP\Connection](#class.ftp-connection) $ftp, [int](#language.types.integer) $option): [int](#language.types.integer)|[bool](#language.types.boolean)

**ftp_get_option()** devuelve el valor de la opción
option desde la conexión FTP especificada.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     option


       Actualmente, las siguientes opciones son soportadas:



        <caption>**Opciones FTP soportadas**</caption>



           **[FTP_TIMEOUT_SEC](#constant.ftp-timeout-sec)**

            Devuelve el tiempo de espera de conexión actual utilizado para las operaciones
            en la red.




           **[FTP_AUTOSEEK](#constant.ftp-autoseek)**

            Devuelve **[true](#constant.true)** si esta opción está activa, **[false](#constant.false)** en caso contrario.










### Valores devueltos

Devuelve el valor en caso de éxito, o **[false](#constant.false)** si la opción
option no es soportada. En el último caso,
un mensaje de alerta es igualmente enviado.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_get_option()**

&lt;?php
// Obtención del tiempo de espera de conexión del flujo FTP actual
$timeout = ftp_get_option($ftp, FTP_TIMEOUT_SEC);
?&gt;

### Ver también

    - [ftp_set_option()](#function.ftp-set-option) - Modifica las opciones de la conexión FTP

# ftp_login

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_login — Autenticación en un servidor FTP

### Descripción

**ftp_login**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $username, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password): [bool](#language.types.boolean)

**ftp_login()** autentica la conexión FTP en el servidor,
con el nombre de usuario username y la contraseña
password.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     username


       El nombre de usuario (USER).






     password


       La contraseña (PASS).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si la autenticación falla, PHP lanzará una advertencia.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_login()**

&lt;?php

$ftp_server = "ftp.example.com";
$ftp_user = "foo";
$ftp_pass = "bar";

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");

// Intento de autenticación
if (@ftp_login($ftp, $ftp_user, $ftp_pass)) {
    echo "Conectado como $ftp_user@$ftp_server\n";
} else {
echo "Conexión imposible como $ftp_user\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

# ftp_mdtm

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_mdtm —
Devuelve la fecha de última modificación de un fichero en
un servidor FTP

### Descripción

**ftp_mdtm**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $filename): [int](#language.types.integer)

**ftp_mdtm()** lee la fecha de última modificación
de un fichero remoto.

**Nota**:

    No todos los servidores soportan esta funcionalidad.

**Nota**:

    **ftp_mdtm()** no funciona con directorios.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     filename


       El fichero desde el cual se debe extraer la fecha de última modificación.





### Valores devueltos

Devuelve la fecha de última modificación como un timestamp
_locale_ Unix en caso de éxito, o -1 si
ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_mdtm()**

&lt;?php

$file = 'somefile.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Obtención de la fecha de última modificación
$buff = ftp_mdtm($ftp, $file);

if ($buff != -1) {
    // somefile.txt fue modificado por última vez el: March 26 2003 14:16:41.
    echo "$file fue modificado por última vez: " . date("F d Y H:i:s.", $buff);
} else {
echo "No se pudo obtener mdtime";
}

// Cierre de la conexión
ftp_close($ftp);

?&gt;

# ftp_mkdir

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_mkdir — Crea un directorio en un servidor FTP

### Descripción

**ftp_mkdir**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory): [string](#language.types.string)|[false](#language.types.singleton)

**ftp_mkdir()** crea el directorio nombrado
directory en el servidor FTP.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       El nombre del directorio que debe ser creado.





### Valores devueltos

Retorna el nombre del directorio creado en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el directorio
ya existe o los permisos correspondientes impiden la creación del directorio.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_mkdir()**

&lt;?php

$dir = 'www';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de creación del directorio $dir
if (ftp_mkdir($ftp, $dir)) {
echo "El directorio $dir ha sido creado con éxito\n";
} else {
echo "Ha ocurrido un problema durante la creación del directorio $dir\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_rmdir()](#function.ftp-rmdir) - Elimina un directorio FTP

# ftp_mlsd

(PHP 7 &gt;= 7.2.0, PHP 8)

ftp_mlsd — Devuelve la lista de ficheros de un directorio dado

### Descripción

**ftp_mlsd**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       El directorio a recorrer.





### Valores devueltos

Devuelve un array de arrays con la información de los ficheros del directorio especificado
en caso de éxito o **[false](#constant.false)** si hay un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_mlsd()**

&lt;?php

// establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// conexión con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// obtiene el contenido del directorio actual
$contents = ftp_mlsd($ftp, ".");

// muestra $contents
var_dump($contents);

?&gt;

    Resultado del ejemplo anterior es similar a:

array(5) {
[0]=&gt;
array(8) {
["name"]=&gt;
string(1) "."
["modify"]=&gt;
string(14) "20171212154511"
["perm"]=&gt;
string(7) "flcdmpe"
["type"]=&gt;
string(4) "cdir"
["unique"]=&gt;
string(11) "811U5740002"
["UNIX.group"]=&gt;
string(2) "33"
["UNIX.mode"]=&gt;
string(4) "0755"
["UNIX.owner"]=&gt;
string(2) "33"
}
[1]=&gt;
array(8) {
["name"]=&gt;
string(2) ".."
["modify"]=&gt;
string(14) "20171212154511"
["perm"]=&gt;
string(7) "flcdmpe"
["type"]=&gt;
string(4) "pdir"
["unique"]=&gt;
string(11) "811U5740002"
["UNIX.group"]=&gt;
string(2) "33"
["UNIX.mode"]=&gt;
string(4) "0755"
["UNIX.owner"]=&gt;
string(2) "33"
}
[2]=&gt;
array(8) {
["name"]=&gt;
string(11) "public_html"
["modify"]=&gt;
string(14) "20171211171525"
["perm"]=&gt;
string(7) "flcdmpe"
["type"]=&gt;
string(3) "dir"
["unique"]=&gt;
string(11) "811U5740525"
["UNIX.group"]=&gt;
string(2) "33"
["UNIX.mode"]=&gt;
string(4) "0755"
["UNIX.owner"]=&gt;
string(2) "33"
}
[3]=&gt;
array(8) {
["name"]=&gt;
string(10) "public_ftp"
["modify"]=&gt;
string(14) "20171211174536"
["perm"]=&gt;
string(7) "flcdmpe"
["type"]=&gt;
string(3) "dir"
["unique"]=&gt;
string(11) "811U57405EE"
["UNIX.group"]=&gt;
string(2) "33"
["UNIX.mode"]=&gt;
string(4) "0755"
["UNIX.owner"]=&gt;
string(2) "33"
}
[4]=&gt;
array(8) {
["name"]=&gt;
string(3) "www"
["modify"]=&gt;
string(14) "www"
["perm"]=&gt;
string(7) "flcdmpe"
["type"]=&gt;
string(3) "dir"
["unique"]=&gt;
string(11) "811U5740780"
["UNIX.group"]=&gt;
string(2) "33"
["UNIX.mode"]=&gt;
string(4) "0755"
["UNIX.owner"]=&gt;
string(2) "33"
}
}

### Ver también

    - [ftp_rawlist()](#function.ftp-rawlist) - Realiza una lista detallada de los ficheros de un directorio

    - [ftp_nlist()](#function.ftp-nlist) - Devuelve la lista de ficheros de un directorio

# ftp_nb_continue

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_nb_continue — Reanuda la descarga de un fichero (no bloqueante)

### Descripción

**ftp_nb_continue**([FTP\Connection](#class.ftp-connection) $ftp): [int](#language.types.integer)

**ftp_nb_continue()** reanuda la descarga
de un fichero en la conexión ftp,
de manera asíncrona.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).




### Valores devueltos

Devuelve **[FTP_FAILED](#constant.ftp-failed)** o **[FTP_FINISHED](#constant.ftp-finished)**
o **[FTP_MOREDATA](#constant.ftp-moredata)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nb_continue()**

&lt;?php

// Inicialización de la descarga
$ret = ftp_nb_get($ftp, "test", "README", FTP_BINARY);
while ($ret == FTP_MOREDATA) {

// Continúa la descarga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Ha ocurrido un error durante la descarga del fichero...";
exit(1);
}
?&gt;

# ftp_nb_fget

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_nb_fget — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

### Descripción

**ftp_nb_fget**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [resource](#language.types.resource) $stream,
    [string](#language.types.string) $remote_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)

**ftp_nb_fget()** lee el fichero remote_filename
presente en el servidor FTP ftp.

La diferencia entre esta función y [ftp_fget()](#function.ftp-fget) es
que esta función puede leer el fichero de manera asíncrona, de modo que su
programa pueda realizar otras tareas mientras el fichero se descarga.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     stream


       Un puntero de fichero abierto en el que se escriben los datos.






     remote_filename


       La ruta hacia el fichero remoto.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto desde la cual
       debe comenzar la descarga.





### Valores devueltos

Devuelve **[FTP_FAILED](#constant.ftp-failed)** o **[FTP_FINISHED](#constant.ftp-finished)**
o **[FTP_MOREDATA](#constant.ftp-moredata)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nb_fget()**

&lt;?php

// Apertura de algunos ficheros para escritura
$file = 'index.php';
$fp = fopen($file, 'w');

$ftp = ftp_connect($ftp_server);

$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Inicia la descarga
$ret = ftp_nb_fget($ftp, $fp, $file, FTP_BINARY);
while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la descarga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Ocurrió un error durante la descarga del fichero...";
exit(1);
}

// Cierra el puntero de fichero
fclose($fp);
?&gt;

### Ver también

    - [ftp_nb_get()](#function.ftp-nb-get) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

    - [ftp_nb_continue()](#function.ftp-nb-continue) - Reanuda la descarga de un fichero (no bloqueante)

    - [ftp_fget()](#function.ftp-fget) - Descarga un fichero a través de FTP en un fichero local

    - [ftp_get()](#function.ftp-get) - Descarga un fichero desde un servidor FTP

# ftp_nb_fput

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_nb_fput — Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)

### Descripción

**ftp_nb_fput**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $remote_filename,
    [resource](#language.types.resource) $stream,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)

**ftp_nb_fput()** escribe el fichero remote_filename
presente en la máquina local, en el servidor FTP ftp.

La diferencia entre esta función y [ftp_fput()](#function.ftp-fput) es
que esta función puede leer el fichero de manera asíncrona, para
que su programa realice otras tareas mientras el fichero
se descarga.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     remote_filename


       La ruta hacia el fichero remoto.






     stream


       Un puntero de fichero hacia un fichero local. La lectura se detiene al final
       del fichero.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto desde la cual
       comenzará la descarga.





### Valores devueltos

Devuelve **[FTP_FAILED](#constant.ftp-failed)**, **[FTP_FINISHED](#constant.ftp-finished)**
o **[FTP_MOREDATA](#constant.ftp-moredata)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nb_fput()**

&lt;?php

$file = 'index.php';

$fp = fopen($file, 'r');

$ftp = ftp_connect($ftp_server);

$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Inicia la subida
$ret = ftp_nb_fput($ftp, $file, $fp, FTP_BINARY);
while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la subida...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Ocurrió un problema durante la subida del fichero...";
exit(1);
}

fclose($fp);
?&gt;

### Ver también

    - [ftp_nb_put()](#function.ftp-nb-put) - Envía un fichero a un servidor FTP (no bloqueante)

    - [ftp_nb_continue()](#function.ftp-nb-continue) - Reanuda la descarga de un fichero (no bloqueante)

    - [ftp_put()](#function.ftp-put) - Carga un fichero en un servidor FTP

    - [ftp_fput()](#function.ftp-fput) - Carga un fichero en un servidor FTP

# ftp_nb_get

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_nb_get — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

### Descripción

**ftp_nb_get**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $local_filename,
    [string](#language.types.string) $remote_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**ftp_nb_get()** lee el fichero remote_filename
presente en el servidor FTP ftp y lo guarda
en un fichero local.

La diferencia entre esta función y [ftp_fget()](#function.ftp-fget) es
que esta función puede leer el fichero de manera asíncrona, para
que el programa realice otras tareas mientras el fichero
se descarga.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     local_filename


       La ruta hacia el fichero local (será sobrescrito si el fichero ya existe).






     remote_filename


       La ruta hacia el fichero remoto.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto a partir de la cual
       debe comenzar la descarga.





### Valores devueltos

Devuelve **[FTP_FAILED](#constant.ftp-failed)** o **[FTP_FINISHED](#constant.ftp-finished)**
o **[FTP_MOREDATA](#constant.ftp-moredata)**, o **[false](#constant.false)** en caso de fallo al abrir el fichero local.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nb_get()**

&lt;?php

// Inicia la descarga
$ret = ftp_nb_get($ftp, "test", "README", FTP_BINARY);
while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la descarga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Hubo un problema durante la descarga...";
exit(1);
}
?&gt;

    **Ejemplo #2 Reanudación de una descarga con ftp_nb_get()**

&lt;?php

// Inicializa
$ret = ftp_nb_get($ftp, "test", "README", FTP_BINARY,
filesize("test"));
// O: $ret = ftp_nb_get($ftp, "test", "README",
// FTP_BINARY, FTP_AUTORESUME);
while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la descarga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Hubo un problema durante la descarga del fichero...";
exit(1);
}
?&gt;

    **Ejemplo #3
     Reanudación de una descarga desde la posición 100 en un nuevo fichero con
     ftp_nb_get()**

&lt;?php

// Desactiva AutoSeek
ftp_set_option($ftp, FTP_AUTOSEEK, false);

// Inicialización
$ret = ftp_nb_get($ftp, "newfile", "README", FTP_BINARY, 100);
while ($ret == FTP_MOREDATA) {

/_ ... _/

// Continúa la descarga...
$ret = ftp_nb_continue($ftp);
}
?&gt;

En el ejemplo anterior, newfile es 100
bytes más pequeño que README en el sitio FTP, ya que
comenzamos a leer desde el offset 100. Si no hubiéramos desactivado la opción **[FTP_AUTOSEEK](#constant.ftp-autoseek)**, los primeros
100 bytes del fichero newfile serían rellenados
con '\0'.

### Ver también

    - [ftp_nb_fget()](#function.ftp-nb-fget) - Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)

    - [ftp_nb_continue()](#function.ftp-nb-continue) - Reanuda la descarga de un fichero (no bloqueante)

    - [ftp_fget()](#function.ftp-fget) - Descarga un fichero a través de FTP en un fichero local

    - [ftp_get()](#function.ftp-get) - Descarga un fichero desde un servidor FTP

# ftp_nb_put

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_nb_put — Envía un fichero a un servidor FTP (no bloqueante)

### Descripción

**ftp_nb_put**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $remote_filename,
    [string](#language.types.string) $local_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**ftp_nb_put()** escribe el fichero remote_filename
presente en la máquina local, en el servidor FTP ftp.

La diferencia entre esta función y [ftp_put()](#function.ftp-put) es
que esta función puede leer el fichero de manera asíncrona, de modo
que el programa pueda realizar otras tareas mientras el fichero
se está descargando.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     remote_filename


       La ruta hacia el fichero remoto.






     local_filename


       La ruta hacia el fichero local.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto desde la cual
       comenzará la descarga.





### Valores devueltos

Devuelve **[FTP_FAILED](#constant.ftp-failed)**, **[FTP_FINISHED](#constant.ftp-finished)**
o **[FTP_MOREDATA](#constant.ftp-moredata)**, o **[false](#constant.false)** en caso de fallo al abrir el fichero local.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente
       era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nb_put()**

&lt;?php

// Inicialización de la carga
$ret = ftp_nb_put($ftp, "test.remote", "test.local", FTP_BINARY);
while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la carga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Ocurrió un problema durante la carga del fichero...";
exit(1);
}
?&gt;

    **Ejemplo #2 Reanudación de una carga con ftp_nb_put()**

&lt;?php

// Inicialización
$ret = ftp_nb_put($ftp, "test.remote", "test.local",
FTP_BINARY, ftp_size("test.remote"));
// O: $ret = ftp_nb_put($ftp, "test.remote", "test.local",
// FTP_BINARY, FTP_AUTORESUME);

while ($ret == FTP_MOREDATA) {

// Realice lo que desee...
echo ".";

// Continúa la carga...
$ret = ftp_nb_continue($ftp);
}
if ($ret != FTP_FINISHED) {
echo "Ocurrió un problema durante la carga...";
exit(1);
}
?&gt;

### Ver también

    - [ftp_nb_fput()](#function.ftp-nb-fput) - Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)

    - [ftp_nb_continue()](#function.ftp-nb-continue) - Reanuda la descarga de un fichero (no bloqueante)

    - [ftp_put()](#function.ftp-put) - Carga un fichero en un servidor FTP

    - [ftp_fput()](#function.ftp-fput) - Carga un fichero en un servidor FTP

# ftp_nlist

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_nlist — Devuelve la lista de ficheros de un directorio

### Descripción

**ftp_nlist**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory): [array](#language.types.array)|[false](#language.types.singleton)

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       El directorio a listar. Este argumento puede incluir argumentos adicionales,
       e.g. ftp_nlist($ftp, "-la /your/dir");
       Tenga en cuenta que este argumento no se escapa, por lo que pueden producirse
       comportamientos no deseados si el nombre de los ficheros contiene espacios u
       otros caracteres.





### Valores devueltos

Devuelve un array con los nombres de ficheros presentes en el directorio especificado
en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_nlist()**

&lt;?php

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Obtención del contenido de un directorio
$contents = ftp_nlist($ftp, ".");

// Visualización de $contents
var_dump($contents);

?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
string(11) "public_html"
[1]=&gt;
string(10) "public_ftp"
[2]=&gt;
string(3) "www"

### Ver también

    - [ftp_rawlist()](#function.ftp-rawlist) - Realiza una lista detallada de los ficheros de un directorio

    - [ftp_mlsd()](#function.ftp-mlsd) - Devuelve la lista de ficheros de un directorio dado

# ftp_pasv

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_pasv — Activa o desactiva el modo pasivo

### Descripción

**ftp_pasv**([FTP\Connection](#class.ftp-connection) $ftp, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

**ftp_pasv()** activa o desactiva el modo pasivo.
En modo pasivo, las conexiones de datos son iniciadas por el
cliente, en lugar del servidor.
Este modo puede ser necesario cuando el cliente está detrás de un firewall.

Tenga en cuenta que **ftp_pasv()** solo puede ser llamada después
de una identificación exitosa, de lo contrario, la función fallará.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     enable


       Si **[true](#constant.true)**, el modo pasivo es activado, de lo contrario, es desactivado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_pasv()**

&lt;?php
$file = 'somefile.txt';
$remote_file = 'readme.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Activación del modo pasivo
ftp_pasv($ftp, true);

// Carga de un fichero
if (ftp_put($ftp, $remote_file, $file, FTP_ASCII)) {
echo "El fichero $file ha sido cargado con éxito\n";
} else {
echo "Ha habido un problema al cargar el fichero $file\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

# ftp_put

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_put — Carga un fichero en un servidor FTP

### Descripción

**ftp_put**(
    [FTP\Connection](#class.ftp-connection) $ftp,
    [string](#language.types.string) $remote_filename,
    [string](#language.types.string) $local_filename,
    [int](#language.types.integer) $mode = **[FTP_BINARY](#constant.ftp-binary)**,
    [int](#language.types.integer) $offset = 0
): [bool](#language.types.boolean)

**ftp_put()** registra el fichero
local_filename en el servidor FTP.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     remote_filename


       La ruta hacia el fichero remoto.






     local_filename


       La ruta hacia el fichero local.






     mode


       El modo de transferencia. Debe ser **[FTP_ASCII](#constant.ftp-ascii)** o
       **[FTP_BINARY](#constant.ftp-binary)**.






     offset


       La posición en el fichero remoto desde la cual
       comenzará la carga.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      7.3.0

       El argumento mode ahora es opcional. Anteriormente era obligatorio.



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_put()**

&lt;?php
$file = 'somefile.txt';
$remote_file = 'readme.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Carga un fichero
if (ftp_put($ftp, $remote_file, $file, FTP_ASCII)) {
echo "El fichero $file ha sido cargado con éxito\n";
} else {
echo "Ha ocurrido un problema al cargar el fichero $file\n";
}

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_pasv()](#function.ftp-pasv) - Activa o desactiva el modo pasivo

    - [ftp_fput()](#function.ftp-fput) - Carga un fichero en un servidor FTP

    - [ftp_nb_fput()](#function.ftp-nb-fput) - Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)

    - [ftp_nb_put()](#function.ftp-nb-put) - Envía un fichero a un servidor FTP (no bloqueante)

# ftp_pwd

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_pwd — Devuelve el nombre del directorio actual

### Descripción

**ftp_pwd**([FTP\Connection](#class.ftp-connection) $ftp): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).




### Valores devueltos

Devuelve el nombre del directorio actual o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_pwd()**

&lt;?php

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Cambia el directorio a public_html
ftp_chdir($ftp, 'public_html');

// Muestra el directorio actual
echo ftp_pwd($ftp); // /public_html

// Cierre de la conexión
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_chdir()](#function.ftp-chdir) - Modifica el directorio FTP actual

    - [ftp_cdup()](#function.ftp-cdup) - Cambia de directorio y pasa al directorio padre

# ftp_quit

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_quit — Alias de [ftp_close()](#function.ftp-close)

### Descripción

Esta función es un alias de:
[ftp_close()](#function.ftp-close).

# ftp_raw

(PHP 5, PHP 7, PHP 8)

ftp_raw — Envía una orden FTP bruta

### Descripción

**ftp_raw**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $command): [?](#language.types.null)[array](#language.types.array)

**ftp_raw()** envía la orden FTP bruta
command al servidor FTP identificado por
ftp.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     command


       La orden a ejecutar.





### Valores devueltos

Devuelve la respuesta del servidor como un array de strings, o **[null](#constant.null)** en caso de fallo.
No se realiza ningún análisis sobre la cadena de respuesta, ni si la orden ha tenido éxito.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Uso de ftp_raw()** para identificarse
    manualmente en un servidor FTP

&lt;?php
$ftp = ftp_connect("ftp.example.com");

/_ Esto es equivalente a:
ftp_login($ftp, "joeblow", "secret");
_/

ftp_raw($ftp, "USER joeblow");
ftp_raw($ftp, "PASS secret");
?&gt;

### Ver también

    - [ftp_exec()](#function.ftp-exec) - Ejecuta un comando en un servidor FTP

# ftp_rawlist

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_rawlist — Realiza una lista detallada de los ficheros de un directorio

### Descripción

**ftp_rawlist**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory, [bool](#language.types.boolean) $recursive = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

**ftp_rawlist()** ejecuta el comando FTP
**LIST**, y devuelve el resultado en un array.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       La ruta al directorio. Puede incluir los argumentos para el
       comando **LIST**.






     recursive


       Si se establece en **[true](#constant.true)**, el comando será **LIST -R**.





### Valores devueltos

Devuelve un array donde los elementos corresponden a una línea de texto.
Devuelve **[false](#constant.false)** cuando el argumento directory es inválido.

La salida nunca se analiza. El identificador del tipo de sistema devuelto por
la función [ftp_systype()](#function.ftp-systype) puede ser utilizado para
determinar cómo deben interpretarse los resultados.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_rawlist()**

&lt;?php

// Configuración de una conexión básica
$ftp = ftp_connect($ftp_server);

// Autenticación con nombre de usuario y contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Obtiene la lista de ficheros de /
$buff = ftp_rawlist($ftp, '/');

// Cierre de la conexión
ftp_close($ftp);

// Muestra el buffer
var_dump($buff);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
string(65) "drwxr-x--- 3 vincent vincent 4096 Jul 12 12:16 public_ftp"
[1]=&gt;
string(66) "drwxr-x--- 15 vincent vincent 4096 Nov 3 21:31 public_html"
[2]=&gt;
string(73) "lrwxrwxrwx 1 vincent vincent 11 Jul 12 12:16 www -&gt; public_html"
}

### Ver también

    - [ftp_nlist()](#function.ftp-nlist) - Devuelve la lista de ficheros de un directorio

    - [ftp_mlsd()](#function.ftp-mlsd) - Devuelve la lista de ficheros de un directorio dado

# ftp_rename

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_rename — Renombra un fichero en un servidor FTP

### Descripción

**ftp_rename**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $from, [string](#language.types.string) $to): [bool](#language.types.boolean)

**ftp_rename()** renombra el fichero o el directorio
from a to,
en el servidor ftp.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     from


       El nombre antiguo del directorio / fichero.






     to


       El nuevo nombre.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. En caso de fallo (como intentar renombrar un fichero
inexistente), se emitirá un error **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_rename()**

&lt;?php
$old_file = 'somefile.txt.bak';
$new_file = 'somefile.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de renombrar $old_file a $new_file
if (ftp_rename($ftp, $old_file, $new_file)) {
echo "Renombrado con éxito de $old_file a $new_file\n";
} else {
echo "Hubo un problema al renombrar $old_file a $new_file\n";
}

// Cierre de la conexión
ftp_close($ftp);

?&gt;

# ftp_rmdir

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_rmdir — Elimina un directorio FTP

### Descripción

**ftp_rmdir**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $directory): [bool](#language.types.boolean)

**ftp_rmdir()** elimina el directorio
directory.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     directory


       El directorio a eliminar. Debe ser una ruta absoluta o una ruta relativa
       hacia un directorio vacío.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_rmdir()**

&lt;?php

$dir = 'www/';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Intento de eliminación del directorio $dir
if (ftp_rmdir($ftp, $dir)) {
echo "El directorio $dir ha sido eliminado con éxito\n";
} else {
echo "Hubo un problema al eliminar el directorio $dir\n";
}

ftp_close($ftp);

?&gt;

### Ver también

    - [ftp_mkdir()](#function.ftp-mkdir) - Crea un directorio en un servidor FTP

# ftp_set_option

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ftp_set_option — Modifica las opciones de la conexión FTP

### Descripción

**ftp_set_option**([FTP\Connection](#class.ftp-connection) $ftp, [int](#language.types.integer) $option, [int](#language.types.integer)|[bool](#language.types.boolean) $value): [bool](#language.types.boolean)

**ftp_set_option()** controla diversas opciones de una
conexión FTP especificada.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     option


       Actualmente, las siguientes opciones son soportadas:



        <caption>**Opciones FTP soportadas**</caption>



           **[FTP_TIMEOUT_SEC](#constant.ftp-timeout-sec)**

            Modifica el tiempo de espera de conexión en segundos utilizado para todas las
            funciones de red. value
            debe ser un integer mayor que 0. El tiempo de espera de conexión por defecto
            es de 90 segundos.




           **[FTP_AUTOSEEK](#constant.ftp-autoseek)**

            Cuando está activo, las peticiones GET o PUT con un argumento
            resumepos o startpos
            se posicionarán primero en la posición deseada en el archivo. Esto está activo
            por defecto.




           **[FTP_USEPASVADDRESS](#constant.ftp-usepasvaddress)**

            Cuando está desactivado, PHP ignora la dirección IP devuelta por el
            servidor FTP en respuesta al comando PASV y utiliza en su lugar
            la dirección IP proporcionada en el ftp_connect().
            value debe ser un valor booleano.











     value


       Este argumento depende de la opción option
       que se desea modificar.





### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Valores devueltos

Devuelve **[true](#constant.true)** si la opción pudo ser modificada, **[false](#constant.false)** en caso contrario. Un mensaje
de alerta será enviado si option no es soportada
o bien si el valor value no corresponde al valor esperado para la
opción option dada.

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_set_option()**

&lt;?php
// Definición del tiempo de espera de conexión a 10 segundos
ftp_set_option($ftp, FTP_TIMEOUT_SEC, 10);
?&gt;

### Ver también

    - [ftp_get_option()](#function.ftp-get-option) - Lee diferentes opciones para la conexión FTP actual

# ftp_site

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_site — Ejecuta el comando SITE en un servidor FTP

### Descripción

**ftp_site**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $command): [bool](#language.types.boolean)

**ftp_site()** ejecuta el comando SITE en
el servidor FTP.

Los comandos SITE no están normalizados, y pueden
variar de un servidor a otro. Permiten gestionar, entre otras cosas, los permisos
de ficheros y los grupos.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     command


       El comando SITE. Tenga en cuenta que este argumento no se escapa, por lo que
       pueden producirse comportamientos no deseados si el nombre de los ficheros contiene espacios
       u otros caracteres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Envío de un comando SITE a un servidor FTP**

&lt;?php
// Conexión al servidor FTP
$ftp = ftp_connect('ftp.example.com');
if (!$ftp) die('Imposible conectarse al servidor ftp.example.com');

// Identificación con el usuario "user" y la contraseña "pass"
if (!ftp_login($ftp, 'user', 'pass')) die('Error de identificación en el servidor ftp.example.com');

// Resultado: comando "SITE CHMOD 0600 /home/user/privatefile" en el servidor ftp
if (ftp_site($ftp, 'CHMOD 0600 /home/user/privatefile')) {
echo "El comando se ha ejecutado correctamente.\n";
} else {
die('El comando ha fallado.');
}
?&gt;

### Ver también

    - [ftp_raw()](#function.ftp-raw) - Envía una orden FTP bruta

# ftp_size

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_size — Devuelve el tamaño de un fichero

### Descripción

**ftp_size**([FTP\Connection](#class.ftp-connection) $ftp, [string](#language.types.string) $filename): [int](#language.types.integer)

**ftp_size()** devuelve el tamaño de un fichero dado en bytes.

**Nota**:

    No todos los servidores soportan esta funcionalidad.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).





     filename


       El fichero remoto.





### Valores devueltos

Devuelve el tamaño del fichero en caso de éxito, o -1 si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_size()**

&lt;?php

$file = 'somefile.txt';

// Establecimiento de una conexión básica
$ftp = ftp_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);

// Obtención del tamaño del fichero $file
$res = ftp_size($ftp, $file);

if ($res != -1) {
echo "El tamaño del fichero $file es de $res bytes";
} else {
echo "No ha sido posible obtener el tamaño del fichero";
}

// Cierre de la conexión
ftp_close($ftp);

?&gt;

### Ver también

    - [ftp_rawlist()](#function.ftp-rawlist) - Realiza una lista detallada de los ficheros de un directorio

# ftp_ssl_connect

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

ftp_ssl_connect — Abierto una conexión FTP segura con SSL

### Descripción

**ftp_ssl_connect**([string](#language.types.string) $hostname, [int](#language.types.integer) $port = 21, [int](#language.types.integer) $timeout = 90): [FTP\Connection](#class.ftp-connection)|[false](#language.types.singleton)

**ftp_ssl_connect()** abre _explícitamente_ una conexión SSL-FTP
al hostname especificado. Esto implica que
**ftp_ssl_connect()** tendrá éxito incluso si el servidor no está
configurado para SSL-FTP. Es únicamente cuando [ftp_login()](#function.ftp-login) es llamado, que el cliente recibirá la
orden AUTH FTP apropiada, entonces [ftp_login()](#function.ftp-login) fallará.
La conexión establecida por **ftp_ssl_connect()** _no_ realizará
ninguna verificación del certificado de par.

**Nota**:
**¿Por qué esta función puede no existir?**

    Anterior a PHP 7.0.0, **ftp_ssl_connect()** solo estaba
    disponible si el módulo ftp y el soporte [OpenSSL](#ref.openssl)
    habían sido compilados estáticamente en php; esto significa que, bajo Windows,
    esta función no estaba definida en la versión oficial de PHP.
    Para tener esta función disponible bajo Windows, era necesario
    compilar los propios binarios PHP.

**Nota**:

    **ftp_ssl_connect()** no está previsto para funcionar
    con sFTP. Para utilizar sFTP con PHP, consúltese la función
    [ssh2_sftp()](#function.ssh2-sftp).

### Parámetros

     hostname


       La dirección FTP del servidor. Este parámetro no debe contener barra final y no debe estar prefijado por ftp://.






     port


       Este parámetro especifica un puerto alternativo de conexión. Si es omitido o definido
       a cero, entonces el puerto por defecto FTP, 21, será utilizado.






     timeout


       Este parámetro especifica el tiempo de espera de conexión para todas las operaciones sobre el
       red. Si es omitido, el valor por defecto será de 90 segundos. Este tiempo de espera de conexión
       puede ser modificado y consultado en cualquier momento con las funciones
       [ftp_set_option()](#function.ftp-set-option) y [ftp_get_option()](#function.ftp-get-option).





### Valores devueltos

Devuelve una instancia de [FTP\Connection](#class.ftp-connection) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [FTP\Connection](#class.ftp-connection);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_ssl_connect()**

&lt;?php

// Establecimiento de una conexión básica
$ftp = ftp_ssl_connect($ftp_server);

// Identificación con un nombre de usuario y una contraseña
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);
if (!$login_result) {
// PHP ya habrá lanzado un mensaje de nivel E_WARNING en este caso
die("can't login");
}

echo ftp_pwd($ftp);

// Cierre de la conexión SSL
ftp_close($ftp);
?&gt;

### Ver también

    - [ftp_connect()](#function.ftp-connect) - Establece una conexión FTP

# ftp_systype

(PHP 4, PHP 5, PHP 7, PHP 8)

ftp_systype — Devuelve un identificador del tipo de servidor FTP

### Descripción

**ftp_systype**([FTP\Connection](#class.ftp-connection) $ftp): [string](#language.types.string)|[false](#language.types.singleton)

**ftp_systype()** devuelve el tipo de servidor FTP remoto.

### Parámetros

     ftp

      Una instancia de [FTP\Connection](#class.ftp-connection).




### Valores devueltos

Devuelve el tipo de servidor remoto o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro ftp ahora espera una instancia de
[FTP\Connection](#class.ftp-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con ftp_systype()**

&lt;?php

// Conexión ftp
$ftp = ftp_connect('ftp.example.com');
ftp_login($ftp, 'user', 'password');

// Obtención del tipo de servidor
if ($type = ftp_systype($ftp)) {
echo "Example.com es ejecutado por $type\n";
} else {
echo "No es posible recuperar el tipo del servidor";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Example.com es ejecutado por UNIX

## Tabla de contenidos

- [ftp_alloc](#function.ftp-alloc) — Asigna espacio para una descarga de fichero
- [ftp_append](#function.ftp-append) — Añade el contenido de un fichero a otro fichero en el servidor FTP
- [ftp_cdup](#function.ftp-cdup) — Cambia de directorio y pasa al directorio padre
- [ftp_chdir](#function.ftp-chdir) — Modifica el directorio FTP actual
- [ftp_chmod](#function.ftp-chmod) — Modifica los permisos de un fichero mediante FTP
- [ftp_close](#function.ftp-close) — Cierra una conexión FTP
- [ftp_connect](#function.ftp-connect) — Establece una conexión FTP
- [ftp_delete](#function.ftp-delete) — Elimina un fichero en un servidor FTP
- [ftp_exec](#function.ftp-exec) — Ejecuta un comando en un servidor FTP
- [ftp_fget](#function.ftp-fget) — Descarga un fichero a través de FTP en un fichero local
- [ftp_fput](#function.ftp-fput) — Carga un fichero en un servidor FTP
- [ftp_get](#function.ftp-get) — Descarga un fichero desde un servidor FTP
- [ftp_get_option](#function.ftp-get-option) — Lee diferentes opciones para la conexión FTP actual
- [ftp_login](#function.ftp-login) — Autenticación en un servidor FTP
- [ftp_mdtm](#function.ftp-mdtm) — Devuelve la fecha de última modificación de un fichero en
  un servidor FTP
- [ftp_mkdir](#function.ftp-mkdir) — Crea un directorio en un servidor FTP
- [ftp_mlsd](#function.ftp-mlsd) — Devuelve la lista de ficheros de un directorio dado
- [ftp_nb_continue](#function.ftp-nb-continue) — Reanuda la descarga de un fichero (no bloqueante)
- [ftp_nb_fget](#function.ftp-nb-fget) — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)
- [ftp_nb_fput](#function.ftp-nb-fput) — Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)
- [ftp_nb_get](#function.ftp-nb-get) — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)
- [ftp_nb_put](#function.ftp-nb-put) — Envía un fichero a un servidor FTP (no bloqueante)
- [ftp_nlist](#function.ftp-nlist) — Devuelve la lista de ficheros de un directorio
- [ftp_pasv](#function.ftp-pasv) — Activa o desactiva el modo pasivo
- [ftp_put](#function.ftp-put) — Carga un fichero en un servidor FTP
- [ftp_pwd](#function.ftp-pwd) — Devuelve el nombre del directorio actual
- [ftp_quit](#function.ftp-quit) — Alias de ftp_close
- [ftp_raw](#function.ftp-raw) — Envía una orden FTP bruta
- [ftp_rawlist](#function.ftp-rawlist) — Realiza una lista detallada de los ficheros de un directorio
- [ftp_rename](#function.ftp-rename) — Renombra un fichero en un servidor FTP
- [ftp_rmdir](#function.ftp-rmdir) — Elimina un directorio FTP
- [ftp_set_option](#function.ftp-set-option) — Modifica las opciones de la conexión FTP
- [ftp_site](#function.ftp-site) — Ejecuta el comando SITE en un servidor FTP
- [ftp_size](#function.ftp-size) — Devuelve el tamaño de un fichero
- [ftp_ssl_connect](#function.ftp-ssl-connect) — Abierto una conexión FTP segura con SSL
- [ftp_systype](#function.ftp-systype) — Devuelve un identificador del tipo de servidor FTP

# The FTP\Connection class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    ftp a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **FTP\Connection**
     {

}

- [Introducción](#intro.ftp)
- [Instalación/Configuración](#ftp.setup)<li>[Instalación](#ftp.installation)
- [Tipos de recursos](#ftp.resources)
  </li>- [Constantes predefinidas](#ftp.constants)
- [Ejemplos](#ftp.examples)<li>[Uso básico](#ftp.examples-basic)
  </li>- [Funciones de FTP](#ref.ftp)<li>[ftp_alloc](#function.ftp-alloc) — Asigna espacio para una descarga de fichero
- [ftp_append](#function.ftp-append) — Añade el contenido de un fichero a otro fichero en el servidor FTP
- [ftp_cdup](#function.ftp-cdup) — Cambia de directorio y pasa al directorio padre
- [ftp_chdir](#function.ftp-chdir) — Modifica el directorio FTP actual
- [ftp_chmod](#function.ftp-chmod) — Modifica los permisos de un fichero mediante FTP
- [ftp_close](#function.ftp-close) — Cierra una conexión FTP
- [ftp_connect](#function.ftp-connect) — Establece una conexión FTP
- [ftp_delete](#function.ftp-delete) — Elimina un fichero en un servidor FTP
- [ftp_exec](#function.ftp-exec) — Ejecuta un comando en un servidor FTP
- [ftp_fget](#function.ftp-fget) — Descarga un fichero a través de FTP en un fichero local
- [ftp_fput](#function.ftp-fput) — Carga un fichero en un servidor FTP
- [ftp_get](#function.ftp-get) — Descarga un fichero desde un servidor FTP
- [ftp_get_option](#function.ftp-get-option) — Lee diferentes opciones para la conexión FTP actual
- [ftp_login](#function.ftp-login) — Autenticación en un servidor FTP
- [ftp_mdtm](#function.ftp-mdtm) — Devuelve la fecha de última modificación de un fichero en
  un servidor FTP
- [ftp_mkdir](#function.ftp-mkdir) — Crea un directorio en un servidor FTP
- [ftp_mlsd](#function.ftp-mlsd) — Devuelve la lista de ficheros de un directorio dado
- [ftp_nb_continue](#function.ftp-nb-continue) — Reanuda la descarga de un fichero (no bloqueante)
- [ftp_nb_fget](#function.ftp-nb-fget) — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)
- [ftp_nb_fput](#function.ftp-nb-fput) — Escribe un fichero en un servidor FTP, y lo lee desde un fichero (no bloqueante)
- [ftp_nb_get](#function.ftp-nb-get) — Lee un fichero en un servidor FTP y lo escribe en un fichero (no bloqueante)
- [ftp_nb_put](#function.ftp-nb-put) — Envía un fichero a un servidor FTP (no bloqueante)
- [ftp_nlist](#function.ftp-nlist) — Devuelve la lista de ficheros de un directorio
- [ftp_pasv](#function.ftp-pasv) — Activa o desactiva el modo pasivo
- [ftp_put](#function.ftp-put) — Carga un fichero en un servidor FTP
- [ftp_pwd](#function.ftp-pwd) — Devuelve el nombre del directorio actual
- [ftp_quit](#function.ftp-quit) — Alias de ftp_close
- [ftp_raw](#function.ftp-raw) — Envía una orden FTP bruta
- [ftp_rawlist](#function.ftp-rawlist) — Realiza una lista detallada de los ficheros de un directorio
- [ftp_rename](#function.ftp-rename) — Renombra un fichero en un servidor FTP
- [ftp_rmdir](#function.ftp-rmdir) — Elimina un directorio FTP
- [ftp_set_option](#function.ftp-set-option) — Modifica las opciones de la conexión FTP
- [ftp_site](#function.ftp-site) — Ejecuta el comando SITE en un servidor FTP
- [ftp_size](#function.ftp-size) — Devuelve el tamaño de un fichero
- [ftp_ssl_connect](#function.ftp-ssl-connect) — Abierto una conexión FTP segura con SSL
- [ftp_systype](#function.ftp-systype) — Devuelve un identificador del tipo de servidor FTP
  </li>- [FTP\Connection](#class.ftp-connection) — The FTP\Connection class
