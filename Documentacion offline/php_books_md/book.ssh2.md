# Secure Shell2

# Introducción

Se enlaza a la biblioteca [» libssh2](http://libssh2.org/) que
provee acceso a recursos (shell, ejecución remota, tunneling, transferencia de
archivos) sobre una máquina remota utilizando una vía de transporte criptográfica
segura.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ssh2.requirements)
- [Instalación](#ssh2.installation)
- [Tipos de recursos](#ssh2.resources)

    ## Requerimientos

    Las librerías
    [» OpenSSL](http://www.openssl.org/) y
    [» libssh2](http://libssh2.org/) son obligatorias.
    Asegúrese que las librerías de desarrollo estan instaladas,
    donde el nombre típico del paquete podría ser openssl-dev.

    Es necesaria la versión 1.2 o posterior de libssh2 , aunque
    es posible que nuevos lanzamientos de pecl/ssh2 pueden requerir versiones
    posteriores (consultar las notas de lanzamiento)

    La función [ssh2_auth_agent()](#function.ssh2-auth-agent) estará disponible únicamente
    con libssh &gt;= 1.2.3.

    El soporte para [stream_set_timeout()](#function.stream-set-timeout) para canalizar secuencias
    sólo estará disponible con libssh &gt;= 1.2.9.

    libssh2 viene en dos versiones: gcrypt y openssl. Algunas distribuciones
    de Linux compilan libssh2 contra la librería gcrypt, y otras utilizan openssl.
    libssh2 tiene algunos problemas cuando se compila contra gcrypt, por favor, utilice openssl.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/ssh2](https://pecl.php.net/package/ssh2).

Los binarios Windows
(los archivos DLL)
para esta extensión PECL están disponibles en el sitio web PECL.

## Tipos de recursos

Esta extensión define los siguientes tipos de recursos:

    - SSH2 Session

    - SSH2 Listener

    - SSH2 SFTP

    - SSH2 Publickey Subsystem (disponible a partir de ssh2 0.10)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[SSH2_FINGERPRINT_MD5](#constant.ssh2-fingerprint-md5)**
     ([int](#language.types.integer))



     Flag que permite a la función [ssh2_fingerprint()](#function.ssh2-fingerprint) solicitar la huella de la clave del host como hash MD5.





    **[SSH2_FINGERPRINT_SHA1](#constant.ssh2-fingerprint-sha1)**
     ([int](#language.types.integer))



     Flag que permite a la función [ssh2_fingerprint()](#function.ssh2-fingerprint) solicitar la huella de la clave del host como hash SHA1.





    **[SSH2_FINGERPRINT_HEX](#constant.ssh2-fingerprint-hex)**
     ([int](#language.types.integer))



     Flag que permite a la función [ssh2_fingerprint()](#function.ssh2-fingerprint) solicitar la huella de la clave del host como string hexits.





    **[SSH2_FINGERPRINT_RAW](#constant.ssh2-fingerprint-raw)**
     ([int](#language.types.integer))



     Flag que permite a la función [ssh2_fingerprint()](#function.ssh2-fingerprint) solicitar la huella de la clave del host como string de caracteres 8-bit.





    **[SSH2_TERM_UNIT_CHARS](#constant.ssh2-term-unit-chars)**
     ([int](#language.types.integer))



     Flag que especifica a la función [ssh2_shell()](#function.ssh2-shell) que los parámetros width y height se proporcionan en forma de tamaño de caracteres.





    **[SSH2_TERM_UNIT_PIXELS](#constant.ssh2-term-unit-pixels)**
     ([int](#language.types.integer))



     Flag que especifica a la función [ssh2_shell()](#function.ssh2-shell) que los parámetros width y height se proporcionan en forma de píxeles.





    **[SSH2_DEFAULT_TERM_WIDTH](#constant.ssh2-default-term-width)**
     ([int](#language.types.integer))



     Ancho por defecto del terminal solicitado por la función [ssh2_shell()](#function.ssh2-shell).





    **[SSH2_DEFAULT_TERM_HEIGHT](#constant.ssh2-default-term-height)**
     ([int](#language.types.integer))



     Altura por defecto del terminal solicitado por la función [ssh2_shell()](#function.ssh2-shell).





    **[SSH2_DEFAULT_TERM_UNIT](#constant.ssh2-default-term-unit)**
     ([int](#language.types.integer))



     Unidad por defecto del terminal solicitado por la función [ssh2_shell()](#function.ssh2-shell).





    **[SSH2_STREAM_STDIO](#constant.ssh2-stream-stdio)**
     ([int](#language.types.integer))



     Flag para que la función [ssh2_fetch_stream()](#function.ssh2-fetch-stream) solicite un subcanal STDIO.





    **[SSH2_STREAM_STDERR](#constant.ssh2-stream-stderr)**
     ([int](#language.types.integer))



     Flag para que la función [ssh2_fetch_stream()](#function.ssh2-fetch-stream) solicite un subcanal STDERR.





    **[SSH2_DEFAULT_TERMINAL](#constant.ssh2-default-terminal)**
    ([string](#language.types.string))



     Tipo por defecto del terminal (e.g. "vt102", "ansi", "xterm", "vanilla") solicitado por la función [ssh2_shell()](#function.ssh2-shell).





    **[SSH2_POLLIN](#constant.ssh2-pollin)**
    ([int](#language.types.integer))








    **[SSH2_POLLEXT](#constant.ssh2-pollext)**
    ([int](#language.types.integer))








    **[SSH2_POLLOUT](#constant.ssh2-pollout)**
    ([int](#language.types.integer))








    **[SSH2_POLLERR](#constant.ssh2-pollerr)**
    ([int](#language.types.integer))








    **[SSH2_POLLHUP](#constant.ssh2-pollhup)**
    ([int](#language.types.integer))








    **[SSH2_POLLNVAL](#constant.ssh2-pollnval)**
    ([int](#language.types.integer))








    **[SSH2_POLL_SESSION_CLOSED](#constant.ssh2-poll-session-closed)**
    ([int](#language.types.integer))








    **[SSH2_POLL_CHANNEL_CLOSED](#constant.ssh2-poll-channel-closed)**
    ([int](#language.types.integer))








    **[SSH2_POLL_LISTENER_CLOSED](#constant.ssh2-poll-listener-closed)**
    ([int](#language.types.integer))

# Funciones de SSH2

# ssh2_auth_agent

(PECL ssh2 &gt;= 0.12)

ssh2_auth_agent — Autenticación SSH utilizando el agente ssh

### Descripción

**ssh2_auth_agent**([resource](#language.types.resource) $session, [string](#language.types.string) $username): [bool](#language.types.boolean)

Autenticación SSH utilizando el agente ssh.

**Nota**:

     La función **ssh2_auth_agent()** solo está disponible
     cuando la extensión ssh2 ha sido compilada con libssh &gt;= 1.2.3.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde una llamada a la función
       [ssh2_connect()](#function.ssh2-connect).






     username


       Nombre de usuario remoto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Autenticación utilizando un agente ssh**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);

if (ssh2_auth_agent($connection, 'username')) {
echo "¡Autenticación exitosa!\n";
} else {
die('Autenticación fallida...');
}
?&gt;

# ssh2_auth_hostbased_file

(PECL ssh2 &gt;= 0.9.0)

ssh2_auth_hostbased_file — Identificación utilizando una clave de host pública

### Descripción

**ssh2_auth_hostbased_file**(
    [resource](#language.types.resource) $session,
    [string](#language.types.string) $username,
    [string](#language.types.string) $hostname,
    [string](#language.types.string) $pubkeyfile,
    [string](#language.types.string) $privkeyfile,
    [string](#language.types.string) $passphrase = ?,
    [string](#language.types.string) $local_username = ?
): [bool](#language.types.boolean)

Identificación utilizando una clave de host pública leída desde un fichero.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido a través de la función
       [ssh2_connect()](#function.ssh2-connect).






     username








     hostname








     pubkeyfile








     privkeyfile








     passphrase


       Si privkeyfile está cifrado (y debe estarlo), la frase secreta debe
       ser proporcionada.






     local_username


       Si local_username es omitido, entonces el valor de
       username será utilizado para ello.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Identificación utilizando una clave de host pública**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22, array('hostkey'=&gt;'ssh-rsa'));

if (ssh2_auth_hostbased_file($connection, 'remoteusername', 'myhost.example.com',
'/usr/local/etc/hostkey_rsa.pub',
'/usr/local/etc/hostkey_rsa', 'secret',
'localusername')) {
echo "Identificación utilizando una clave de host pública con éxito\n";
} else {
die('Fallo en la identificación utilizando una clave de host pública con éxito');
}
?&gt;

### Notas

**Nota**:

    **ssh2_auth_hostbased_file()** requiere libssh2 &gt;= 0.7 y PHP/SSH2 &gt;= 0.7.

# ssh2_auth_none

(PECL ssh2 &gt;= 0.9.0)

ssh2_auth_none — Identificación como "none"

### Descripción

**ssh2_auth_none**([resource](#language.types.resource) $session, [string](#language.types.string) $username): [mixed](#language.types.mixed)

Intenta una identificación como "none", que, habitualmente, falla
(y debe fallar). Aparte del fallo, esta función debe devolver un
array que contiene los métodos de identificación aceptables.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido con la función
       [ssh2_connect()](#function.ssh2-connect).






     username


       Nombre de usuario remoto.





### Valores devueltos

Devuelve **[true](#constant.true)** si el servidor acepta "none" como método de identificación,
o un array de métodos de identificación aceptables en caso de fallo.

### Ejemplos

    **Ejemplo #1 Recuperación de la lista de métodos de identificación**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);

$auth_methods = ssh2_auth_none($connection, 'user');

if (in_array('password', $auth_methods)) {
echo "El servidor soporta la identificación por contraseña\n";
}
?&gt;

# ssh2_auth_password

(PECL ssh2 &gt;= 0.9.0)

ssh2_auth_password — Autenticación vía SSH utilizando una contraseña en texto claro

### Descripción

**ssh2_auth_password**([resource](#language.types.resource) $session, [string](#language.types.string) $username, [string](#language.types.string) $password): [bool](#language.types.boolean)

Autenticación vía SSH utilizando una contraseña en texto claro.
Desde la versión 0.12, esta función también soporta el método
keyboard_interactive.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     username


       Nombre de usuario remoto.






     password


       Contraseña para el usuario username.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Autenticación con una contraseña**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);

if (ssh2_auth_password($connection, 'username', 'secret')) {
echo "Autenticación exitosa!\n";
} else {
die('Fallo en la autenticación...');
}
?&gt;

# ssh2_auth_pubkey_file

(PECL ssh2 &gt;= 0.9.0)

ssh2_auth_pubkey_file — Identificación utilizando una clave pública

### Descripción

**ssh2_auth_pubkey_file**(
    [resource](#language.types.resource) $session,
    [string](#language.types.string) $username,
    [string](#language.types.string) $pubkeyfile,
    [string](#language.types.string) $privkeyfile,
    [string](#language.types.string) $passphrase = ?
): [bool](#language.types.boolean)

Identificación utilizando una clave pública, leída desde un fichero.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     username








     pubkeyfile


       El fichero que contiene la clave pública debe estar en formato
       OpenSSH. Debe parecerse a esto:




       ssh-rsa AAAAB3NzaC1yc2EAAA....NX6sqSnHA8= rsa-key-20121110






     privkeyfile


         La clave privada debe estar en formato PEM.






     passphrase


       Si privkeyfile está cifrado (y debe estarlo),
       la frase de paso debe ser proporcionada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Identificación utilizando una clave pública**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22, array('hostkey'=&gt;'ssh-rsa'));

if (ssh2_auth_pubkey_file($connection, 'username',
'/home/username/.ssh/id_rsa.pub',
'/home/username/.ssh/id_rsa', 'secret')) {
echo "Identificación exitosa utilizando una clave pública\n";
} else {
die('Fallo en la identificación utilizando una clave pública');
}
?&gt;

### Notas

**Nota**:

    La biblioteca libssh subyacente no soporta muy limpiamente las
    autenticaciones parciales. Es decir, que si debe proporcionar a la
    vez una clave pública y una contraseña, entonces parecerá como si
    la función estuviera en error. En este caso particular, un error en esta
    llamada puede simplemente significar que la autenticación no está aún terminada.
    Debe ignorar este error y continuar con la llamada
    [ssh2_auth_password()](#function.ssh2-auth-password) para terminar la autenticación.

# ssh2_connect

(PECL ssh2 &gt;= 0.9.0)

ssh2_connect — Conexión a un servidor SSH

### Descripción

**ssh2_connect**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = 22,
    [array](#language.types.array) $methods = ?,
    [array](#language.types.array) $callbacks = ?
): [resource](#language.types.resource)|[false](#language.types.singleton)

Establece una conexión a un servidor SSH remoto.

Una vez conectado, el cliente debe verificar la clave de host del servidor
utilizando la función [ssh2_fingerprint()](#function.ssh2-fingerprint),
luego identificarse utilizando un password o una clave pública.

### Parámetros

     host








     port








     methods


       methods debe ser un array asociativo de hasta
       cuatro parámetros, como se describe a continuación. methods
       puede contener cualquiera o todos los parámetros siguientes.







        <caption>**Opciones de conexión SSH**</caption>



           Índice
           Significado
           Valores soportados *






           kex

            La lista de métodos de intercambio a anunciar, separados por una coma,
            por orden de preferencia.


            diffie-hellman-group1-sha1,
            diffie-hellman-group14-sha1, y
            diffie-hellman-group-exchange-sha1




           hostkey

            La lista de métodos de claves de host a anunciar, separados por
            una coma, por orden de preferencia.


            ssh-rsa y
            ssh-dss




           client_to_server

            Array asociativo que contiene los códigos de los métodos de cifrado,
            compresión y mensajes de autenticación (MAC) preferidos
            para el envío de mensajes desde el cliente al servidor.

            



           server_to_client

            Array asociativo que contiene los códigos de los métodos de cifrado,
            compresión y mensajes de autenticación (MAC) preferidos
            para el envío de mensajes desde el servidor al cliente.

            








       * - Los valores soportados dependen de los métodos soportados por
       la biblioteca. Consulte la documentación [» libssh2](http://libssh2.org/)
       para más información.







        <caption>**
         client_to_server y
         server_to_client deben ser un array asociativo
         con cualquiera o todos los parámetros siguientes.
        **</caption>



           Índice
           Significado
           Valores soportados *






           crypt

            Lista de métodos de cifrado a anunciar, separados por una coma,
            por orden de preferencia.


            rijndael-cbc@lysator.liu.se,
            aes256-cbc,
            aes192-cbc,
            aes128-cbc,
            3des-cbc,
            blowfish-cbc,
            cast128-cbc,
            arcfour, y
            none**




           comp

            Lista de métodos de compresión a anunciar, separados por una coma,
            por orden de preferencia.


            zlib y
            none




           mac

            Lista de métodos MAC a anunciar, separados por una coma,
            por orden de preferencia.


            hmac-sha1,
            hmac-sha1-96,
            hmac-ripemd160,
            hmac-ripemd160@openssh.com, y
            none**











**Nota**:
**Cifrado y método MAC "none"**

         Por razones de seguridad, none está desactivado por la
         biblioteca [» libssh2](http://libssh2.org/) a menos que se
         active explícitamente durante la compilación utilizando las opciones
         apropiadas de ./configure. Consulte la documentación de la biblioteca
         para más información.








     callbacks


       callbacks debe ser un array asociativo
       que contiene cualquiera o todos los parámetros siguientes.



        <caption>**
         Parámetros de retrollamada
        **</caption>



           Índice
           Significado
           Prototipo






           ignore

            Nombre de la función a llamar cuando se recibe un paquete
            **[SSH2_MSG_IGNORE](#constant.ssh2-msg-ignore)**

           void ignore_cb($message)



           debug

            Nombre de la función a llamar cuando se recibe un paquete
            **[SSH2_MSG_DEBUG](#constant.ssh2-msg-debug)**

           void debug_cb($message, $language, $always_display)



           macerror

            Nombre de la función a llamar cuando se recibe un paquete pero el
            código de mensaje de autenticación falla. Si la función de retrollamada
            devuelve **[true](#constant.true)**, el error será ignorado, de lo contrario, la conexión terminará.

           bool macerror_cb($packet)



           disconnect

            Nombre de la función a llamar cuando se recibe un paquete
            **[SSH2_MSG_DISCONNECT](#constant.ssh2-msg-disconnect)**

           void disconnect_cb($reason, $message, $language)









### Valores devueltos

Devuelve un recurso en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ssh2_connect()**



     Apertura de una conexión forzando 3des-cbc al enviar paquetes,
     cualquier cifrado AES al recibir paquetes,
     ninguna compresión en ambas direcciones, y un intercambio de claves Group1.

&lt;?php
/_ Notificación al usuario si el servidor termina la conexión _/
function my_ssh_disconnect($reason, $message, $language) {
printf("Servidor desconectado con código de razón [%d] y mensaje: %s\n",
$reason, $message);
}

$methods = array(
'kex' =&gt; 'diffie-hellman-group1-sha1',
'client_to_server' =&gt; array(
'crypt' =&gt; '3des-cbc',
'comp' =&gt; 'none'),
'server_to_client' =&gt; array(
'crypt' =&gt; 'aes256-cbc,aes192-cbc,aes128-cbc',
'comp' =&gt; 'none'));

$callbacks = array('disconnect' =&gt; 'my_ssh_disconnect');

$connection = ssh2_connect('shell.example.com', 22, $methods, $callbacks);
if (!$connection) die('Fallo en la conexión');
?&gt;

### Ver también

    - [ssh2_fingerprint()](#function.ssh2-fingerprint) - Recupera la huella de un servidor remoto

    - [ssh2_auth_none()](#function.ssh2-auth-none) - Identificación como "none"

    - [ssh2_auth_password()](#function.ssh2-auth-password) - Autenticación vía SSH utilizando una contraseña en texto claro

    - [ssh2_auth_pubkey_file()](#function.ssh2-auth-pubkey-file) - Identificación utilizando una clave pública

    - [ssh2_disconnect()](#function.ssh2-disconnect) - Cierra una conexión a un servidor SSH remoto

# ssh2_disconnect

(PECL ssh2 &gt;= 1.0)

ssh2_disconnect — Cierra una conexión a un servidor SSH remoto

### Descripción

**ssh2_disconnect**([resource](#language.types.resource) $session): [bool](#language.types.boolean)

Cierra una conexión a un servidor SSH remoto.

### Parámetros

    session


      Un identificador de enlace de conexión SSH, obtenido desde una llamada
      a [ssh2_connect()](#function.ssh2-connect).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

# ssh2_exec

(PECL ssh2 &gt;= 0.9.0)

ssh2_exec — Ejecuta un comando en un servidor remoto

### Descripción

**ssh2_exec**(
    [resource](#language.types.resource) $session,
    [string](#language.types.string) $command,
    [string](#language.types.string) $pty = ?,
    [array](#language.types.array) $env = ?,
    [int](#language.types.integer) $width = 80,
    [int](#language.types.integer) $height = 25,
    [int](#language.types.integer) $width_height_type = SSH2_TERM_UNIT_CHARS
): [resource](#language.types.resource)|[false](#language.types.singleton)

Ejecuta un comando en un servidor remoto.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     command








     pty








     env


       env puede ser pasado bajo la forma de un
       array asociativo de pares nombre/valor, a definir en el
       entorno objetivo.






     width


       Ancho del terminal virtual.






     height


       Altura del terminal virtual.






     width_height_type


       width_height_type puede valer
       **[SSH2_TERM_UNIT_CHARS](#constant.ssh2-term-unit-chars)** o
       **[SSH2_TERM_UNIT_PIXELS](#constant.ssh2-term-unit-pixels)**.





### Valores devueltos

Devuelve un flujo en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejecución de un comando**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$stream = ssh2_exec($connection, '/usr/local/bin/php -i');
?&gt;

### Ver también

    - [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

    - [ssh2_shell()](#function.ssh2-shell) - Solicita un shell interactivo

    - [ssh2_tunnel()](#function.ssh2-tunnel) - Abre un túnel a través de un servidor remoto

# ssh2_fetch_stream

(PECL ssh2 &gt;= 0.9.0)

ssh2_fetch_stream — Recorre un flujo extendido de datos

### Descripción

**ssh2_fetch_stream**([resource](#language.types.resource) $channel, [int](#language.types.integer) $streamid): [resource](#language.types.resource)

Recorre un subflujo alternativo asociado a un flujo de canal SSH2.
El protocolo SSH2 define actualmente un solo subflujo, STDERR, que tiene
un identificador de subflujo de **[SSH2_STREAM_STDERR](#constant.ssh2-stream-stderr)** (definido a 1).

### Parámetros

     channel








     streamid


       Un canal de flujo SSH2.





### Valores devueltos

Devuelve el recurso, representando el flujo solicitado.

### Ejemplos

    **Ejemplo #1 Apertura de un shell y recuperación del flujo stderr que le está asociado**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$stdio_stream = ssh2_shell($connection);
$stderr_stream = ssh2_fetch_stream($stdio_stream, SSH2_STREAM_STDERR);
?&gt;

### Ver también

    - [ssh2_shell()](#function.ssh2-shell) - Solicita un shell interactivo

    - [ssh2_exec()](#function.ssh2-exec) - Ejecuta un comando en un servidor remoto

    - [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

# ssh2_fingerprint

(PECL ssh2 &gt;= 0.9.0)

ssh2_fingerprint — Recupera la huella de un servidor remoto

### Descripción

**ssh2_fingerprint**([resource](#language.types.resource) $session, [int](#language.types.integer) $flags = SSH2_FINGERPRINT_MD5 | SSH2_FINGERPRINT_HEX): [string](#language.types.string)

Recupera la huella de un servidor remoto.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     flags


       flags puede ser
       **[SSH2_FINGERPRINT_MD5](#constant.ssh2-fingerprint-md5)** o
       **[SSH2_FINGERPRINT_SHA1](#constant.ssh2-fingerprint-sha1)** asociado lógicamente con
       **[SSH2_FINGERPRINT_HEX](#constant.ssh2-fingerprint-hex)** o
       **[SSH2_FINGERPRINT_RAW](#constant.ssh2-fingerprint-raw)**.





### Valores devueltos

Devuelve la huella, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Comparación de una huella con un valor conocido**

&lt;?php
$known_host = '6F89C2F0A719B30CC38ABDF90755F2E4';

$connection = ssh2_connect('shell.example.com', 22);

$fingerprint = ssh2_fingerprint($connection,
SSH2_FINGERPRINT_MD5 | SSH2_FINGERPRINT_HEX);

if ($fingerprint != $known_host) {
die("HOSTKEY MISMATCH!\n" .
"Posible ataque Man-In-The-Middle ?");
}
?&gt;

# ssh2_forward_accept

(PECL ssh2 &gt;= 0.9.0)

ssh2_forward_accept — Acepta una conexión creada por un observador

### Descripción

**ssh2_forward_accept**([resource](#language.types.resource) $listener): [resource](#language.types.resource)|[false](#language.types.singleton)

Acepta una conexión creada por un observador.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    desc


      Un observador SSH2, obtenido por una llamada a [ssh2_forward_listen()](#function.ssh2-forward-listen).


### Valores devueltos

Devuelve un recurso de flujo, o **[false](#constant.false)** si ocurre un error.

# ssh2_forward_listen

(PECL ssh2 &gt;= 0.9.0)

ssh2_forward_listen — Enlaza un puerto en el servidor remoto y observa las conexiones

### Descripción

**ssh2_forward_listen**(
    [resource](#language.types.resource) $session,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $host = ?,
    [int](#language.types.integer) $max_connections = 16
): [resource](#language.types.resource)|[false](#language.types.singleton)

Enlaza un puerto en el servidor remoto y observa las conexiones.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    session


      Un recurso de sesión SSH, obtenido mediante una llamada a [ssh2_connect()](#function.ssh2-connect).






    port


      Un puerto del servidor remoto.






    host









    max_connections





### Valores devueltos

Devuelve un observador SSH2, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [ssh2_forward_accept()](#function.ssh2-forward-accept) - Acepta una conexión creada por un observador

# ssh2_methods_negotiated

(PECL ssh2 &gt;= 0.9.0)

ssh2_methods_negotiated — Devuelve una lista de métodos negociados

### Descripción

**ssh2_methods_negotiated**([resource](#language.types.resource) $session): [array](#language.types.array)

Devuelve una lista de métodos negociados.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).





### Valores devueltos

### Ejemplos

    **Ejemplo #1 Determina qué métodos han sido negociados**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
$methods = ssh2_methods_negotiated($connection);

echo "Clave de cifrado negociada utilizando: {$methods['kex']}\n";
echo "Identificación del servidor utilizando {$methods['hostkey']}";
echo "Huella: " . ssh2_fingerprint($connection) . "\n";

echo "Métodos de transmisión de paquetes cliente a servidor:\n";
echo "\tCrypt: {$methods['client_to_server']['crypt']}\n";
echo "\tComp: {$methods['client_to_server']['comp']}\n";
echo "\tMAC: {$methods['client_to_server']['mac']}\n";

echo "Métodos de transmisión de paquetes servidor a cliente:\n";
echo "\tCrypt: {$methods['server_to_client']['crypt']}\n";
echo "\tComp: {$methods['server_to_client']['comp']}\n";
echo "\tMAC: {$methods['server_to_client']['mac']}\n";

?&gt;

### Ver también

    - [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

# ssh2_poll

(PECL ssh2 &gt;= 0.9.0)

ssh2_poll — Consulta los canales/observadores/flujos para eventos

### Descripción

**ssh2_poll**([array](#language.types.array) &amp;$desc, [int](#language.types.integer) $timeout = 30): [int](#language.types.integer)

Consulta los canales/observadores/flujos para eventos,
y devuelve el número de descriptores que han devuelto eventos no nulos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    desc


      Un array indexado de sub-arrays con las claves
      'resource' y 'events'.
      El valor de la ressource es un flujo (de canal) o una ressource de tipo SSH2 Listener.
      El valor del evento es un máscara de bits SSH2_POLL*.
      Cada sub-array será poblado con un elemento 'revents' al final,
      cuyos valores son máscaras de bits SSH2_POLL* de los eventos que han ocurrido.






    timeout


      El tiempo de espera en segundos.


### Valores devueltos

Devuelve el número de descriptores que han devuelto eventos no nulos.

# ssh2_publickey_add

(PECL ssh2 &gt;= 0.10)

ssh2_publickey_add — Añade una clave pública autorizada

### Descripción

**ssh2_publickey_add**(
    [resource](#language.types.resource) $pkey,
    [string](#language.types.string) $algoname,
    [string](#language.types.string) $blob,
    [bool](#language.types.boolean) $overwrite = **[false](#constant.false)**,
    [array](#language.types.array) $attributes = ?
): [bool](#language.types.boolean)

**Nota**: El publickey subsystem
es utilizado para gestionar las claves públicas en un servidor en el cual el cliente
ya está _identificado_. Para identificarse a un sistema
remoto utilizando la identificación por clave pública, utilice la función
[ssh2_auth_pubkey_file()](#function.ssh2-auth-pubkey-file) en su lugar.

### Parámetros

     pkey


       Recurso Publickey Subsystem creado por
       [ssh2_publickey_init()](#function.ssh2-publickey-init).






     algoname


       Algoritmo de clave pública (ejemplo): ssh-dss, ssh-rsa






     blob


       Blob de clave pública como datos binarios sin tratar






     overwrite


       Si la clave especificada ya existe, ¿debería ser sobrescrita?






     attributes


       Array asociativo de atributos para asignar a esta clave pública.
       Consulte ietf-secsh-publickey-subsystem para una lista de los
       atributos soportados. Para marcar un atributo como obligatorio,
       anteponga un asterisco a su nombre. Si el servidor no es capaz de
       soportar un atributo marcado como obligatorio, abandonará el
       proceso de adición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Adición de una clave pública con ssh2_publickey_add()**

&lt;?php
$ssh2 = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($ssh2, 'jdoe', 'password');
$pkey = ssh2_publickey_init($ssh2);

$keyblob = base64_decode('
AAAAB3NzaC1yc2EAAAABIwAAAIEA5HVt6VqSGd5PTrLRdjNONxXH1tVFGn0
Bd26BF0aCP9qyJRlvdJ3j4WBeX4ZmrveGrjMgkseSYc4xZ26sDHwfL351xj
zaLpipu\BGRrw17mWVBhuCExo476ri5tQFzbTc54VEHYckxQ16CjSTibI5X
69GmnYC9PNqEYq/1TP+HF10=');

ssh2_publickey_add($pkey, 'ssh-rsa', $keyblob, false, array('comment'=&gt;"John's Key"));
?&gt;

### Ver también

    - [ssh2_publickey_init()](#function.ssh2-publickey-init) - Inicializa un Publickey Subsystem (subsistema de clave pública)

    - [ssh2_publickey_remove()](#function.ssh2-publickey-remove) - Elimina una clave pública autorizada

    - [ssh2_publickey_list()](#function.ssh2-publickey-list) - Lista las claves públicas actualmente autorizadas

# ssh2_publickey_init

(PECL ssh2 &gt;= 0.10)

ssh2_publickey_init — Inicializa un Publickey Subsystem (subsistema de clave pública)

### Descripción

**ssh2_publickey_init**([resource](#language.types.resource) $session): [resource](#language.types.resource)|[false](#language.types.singleton)

Solicita el subsistema de clave pública desde un servidor SSH2 ya conectado.

El subsistema de clave pública permite a un cliente ya conectado e identificado gestionar la lista de claves públicas autorizadas registradas en el servidor objetivo de manera agnóstica a la implementación. Si el servidor no soporta el subsistema de clave pública, la función
**ssh2_publickey_init()** devolverá **[false](#constant.false)**.

### Parámetros

     session







### Valores devueltos

Devuelve un recurso SSH2 Publickey Subsystem
para usar con todos los otros métodos ssh2*publickey*\*() o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**: El publickey subsystem
es utilizado para gestionar las claves públicas en un servidor en el cual el cliente
ya está _identificado_. Para identificarse a un sistema
remoto utilizando la identificación por clave pública, utilice la función
[ssh2_auth_pubkey_file()](#function.ssh2-auth-pubkey-file) en su lugar.

### Ver también

    - [ssh2_publickey_add()](#function.ssh2-publickey-add) - Añade una clave pública autorizada

    - [ssh2_publickey_remove()](#function.ssh2-publickey-remove) - Elimina una clave pública autorizada

    - [ssh2_publickey_list()](#function.ssh2-publickey-list) - Lista las claves públicas actualmente autorizadas

# ssh2_publickey_list

(PECL ssh2 &gt;= 0.10)

ssh2_publickey_list — Lista las claves públicas actualmente autorizadas

### Descripción

**ssh2_publickey_list**([resource](#language.types.resource) $pkey): [array](#language.types.array)

Lista las claves públicas actualmente autorizadas.

### Parámetros

     pkey


       Recurso Publickey Subsystem.





### Valores devueltos

Devuelve un array de claves indexadas numéricamente, cada una de ellas es un
array asociativo que contiene: nombre, blob y elementos attrs.

    <caption>**Elemento de clave pública**</caption>



       Clave Array
       Significado






       name
       Nombre del algoritmo utilizado por esta clave pública, por ejemplo:
       ssh-dss o ssh-rsa.



       blob
       Blob de clave pública como datos binarios sin tratar.



       attrs

        Atributos asignados a esta clave pública.
        El atributo más común y el único soportado por la clave
        pública versión 1 de los servidores es comment,
        que puede ser cualquier forma de string.





### Ejemplos

    **Ejemplo #1 Lista de claves autorizadas con ssh2_publickey_list()**

&lt;?php
$ssh2 = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($ssh2, 'jdoe', 'secret');
$pkey = ssh2_publickey_init($ssh2);

$list = ssh2_publickey_list($pkey);

foreach($list as $key) {
  echo "Clave : {$key['name']}\n";
echo "Blob : " . chunk_split(base64_encode($key['blob']), 40, "\n") . "\n";
  echo "Comentario : {$key['attrs']['comment']}\n\n";
}
?&gt;

    El ejemplo anterior mostrará:

Clave : ssh-rsa
Blob : AAAAB3NzaC1yc2EAAAABIwAAAIEA5HVt6VqSGd5P
TrLRdjNONxXH1tVFGn0Bd26BF0aCP9qyJRlvdJ3j
4WBeX4ZmrveGrjMgkseSYc4xZ26sDHwfL351xjza
Lpipu\BGRrw17mWVBhuCExo476ri5tQFzbTc54VE
HYckxQ16CjSTibI5X69GmnYC9PNqEYq/1TP+HF10
Comentario : Clave de John

Clave : ssh-rsa
Blob : AAAAB3NzaHVt6VqSGd5C1yc2EAAAABIwA232dnJA
AIEA5HVt6VqSGd5PTrLRdjNONxX/1TP+HF1HVt6V
qSGd50H1tVFGn0BB3NzaC1yc2EAd26BF0aCP9qyJ
RlvdJ3j4WBeX4ZmrveGrjMgkseSYc4xZ26HVt6Vq
SGd5sDHwfL351xjzaLpipu\BGB3NzaC1yc2EA/1T
Comentario : Clave de Alice

### Notas

**Nota**: El publickey subsystem
es utilizado para gestionar las claves públicas en un servidor en el cual el cliente
ya está _identificado_. Para identificarse a un sistema
remoto utilizando la identificación por clave pública, utilice la función
[ssh2_auth_pubkey_file()](#function.ssh2-auth-pubkey-file) en su lugar.

### Ver también

    - [ssh2_publickey_init()](#function.ssh2-publickey-init) - Inicializa un Publickey Subsystem (subsistema de clave pública)

    - [ssh2_publickey_add()](#function.ssh2-publickey-add) - Añade una clave pública autorizada

    - [ssh2_publickey_remove()](#function.ssh2-publickey-remove) - Elimina una clave pública autorizada

# ssh2_publickey_remove

(PECL ssh2 &gt;= 0.10)

ssh2_publickey_remove — Elimina una clave pública autorizada

### Descripción

**ssh2_publickey_remove**([resource](#language.types.resource) $pkey, [string](#language.types.string) $algoname, [string](#language.types.string) $blob): [bool](#language.types.boolean)

Elimina una clave pública autorizada.

### Parámetros

     pkey


       Recurso Publickey Subsystem






     algoname


       Algoritmo de clave pública (ejemplo): ssh-dss, ssh-rsa






     blob


       Blob de clave pública como datos binarios sin tratar





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**: El publickey subsystem
es utilizado para gestionar las claves públicas en un servidor en el cual el cliente
ya está _identificado_. Para identificarse a un sistema
remoto utilizando la identificación por clave pública, utilice la función
[ssh2_auth_pubkey_file()](#function.ssh2-auth-pubkey-file) en su lugar.

### Ver también

    - [ssh2_publickey_init()](#function.ssh2-publickey-init) - Inicializa un Publickey Subsystem (subsistema de clave pública)

    - [ssh2_publickey_add()](#function.ssh2-publickey-add) - Añade una clave pública autorizada

    - [ssh2_publickey_list()](#function.ssh2-publickey-list) - Lista las claves públicas actualmente autorizadas

# ssh2_scp_recv

(PECL ssh2 &gt;= 0.9.0)

ssh2_scp_recv — Solicita un fichero mediante SCP

### Descripción

**ssh2_scp_recv**([resource](#language.types.resource) $session, [string](#language.types.string) $remote_file, [string](#language.types.string) $local_file): [bool](#language.types.boolean)

Copia un fichero desde el servidor remoto al sistema de ficheros local usando el protocolo SCP.

### Parámetros

     session


       Un identificador de enlace de conexión a SSH, obtenido desde una llamada a
       [ssh2_connect()](#function.ssh2-connect).






     remote_file


       Ruta del fichero remoto.






     local_file


       Ruta del fichero local.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Descargar un fichero mediante SCP**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

ssh2_scp_recv($connection, '/remote/filename', '/local/filename');
?&gt;

### Ver también

    - [ssh2_scp_send()](#function.ssh2-scp-send) - Envía un fichero mediante SCP

    - [copy()](#function.copy) - Copia un fichero

# ssh2_scp_send

(PECL ssh2 &gt;= 0.9.0)

ssh2_scp_send — Envía un fichero mediante SCP

### Descripción

**ssh2_scp_send**(
    [resource](#language.types.resource) $session,
    [string](#language.types.string) $local_file,
    [string](#language.types.string) $remote_file,
    [int](#language.types.integer) $create_mode = 0644
): [bool](#language.types.boolean)

Copia un fichero desde el sistema de ficheros local a un servidor remoto usando el protocolo SCP.

### Parámetros

     session


       Un identificador de enlace de conexión a SSH, obtenido desde una llamada a
       [ssh2_connect()](#function.ssh2-connect).






     local_file


       Ruta del fichero local.






     remote_file


       Ruta del fichero remoto.






     create_mode


       El fichero debe ser creado con el modo especificado por
       create_mode.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cargar un fichero via SCP**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

ssh2_scp_send($connection, '/local/filename', '/remote/filename', 0644);
?&gt;

### Ver también

    - [ssh2_scp_recv()](#function.ssh2-scp-recv) - Solicita un fichero mediante SCP

    - [copy()](#function.copy) - Copia un fichero

# ssh2_send_eof

(PECL ssh2 &gt;= 1.3)

ssh2_send_eof — Envía un EOF al flujo

### Descripción

**ssh2_send_eof**([resource](#language.types.resource) $channel): [bool](#language.types.boolean)

Envía un EOF al flujo; esto se utiliza típicamente para cerrar la entrada estándar,
manteniendo abiertas la salida y los errores. Por ejemplo, se pueden enviar datos a un proceso remoto en la entrada estándar, cerrarla para comenzar el procesamiento, y aún ser capaz de leer los resultados sin crear ficheros adicionales.

### Parámetros

    channel


      Un flujo SSH; puede ser adquirido por funciones como [ssh2_fetch_stream()](#function.ssh2-fetch-stream)
      o [ssh2_connect()](#function.ssh2-connect).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [ssh2_fetch_stream()](#function.ssh2-fetch-stream) - Recorre un flujo extendido de datos

# ssh2_sftp

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp — Inicializa un subsistema SFTP

### Descripción

**ssh2_sftp**([resource](#language.types.resource) $session): [resource](#language.types.resource)|[false](#language.types.singleton)

Solicita un subsistema SFTP desde un servidor ya conectado mediante SSH2.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).





### Valores devueltos

Este método devuelve un recurso SSH2 SFTP
para su uso con todos los métodos ssh2*sftp*\*()
así como el gestor abierto
[ssh2.sftp://](#wrappers.ssh2),
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Apertura de un fichero mediante SFTP**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$sftp = ssh2_sftp($connection);

$stream = fopen('ssh2.sftp://' . intval($sftp) . '/path/to/file', 'r');
?&gt;

### Ver también

    - [ssh2_scp_recv()](#function.ssh2-scp-recv) - Solicita un fichero mediante SCP

    - [ssh2_scp_send()](#function.ssh2-scp-send) - Envía un fichero mediante SCP

# ssh2_sftp_chmod

(PECL ssh2 &gt;= 0.12)

ssh2_sftp_chmod — Modifica el modo de un fichero

### Descripción

**ssh2_sftp_chmod**([resource](#language.types.resource) $sftp, [string](#language.types.string) $filename, [int](#language.types.integer) $mode): [bool](#language.types.boolean)

Intenta modificar el modo del fichero especificado, utilizando el
mode proporcionado.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto con la función
       [ssh2_sftp()](#function.ssh2-sftp).






     filename


       Ruta hacia el fichero.






     mode


       Permisos sobre el fichero. Ver la función
       [chmod()](#function.chmod) para más detalles concernientes
       a este parámetro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cambio del modo del fichero en el servidor remoto**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'nombreUsuario', 'contraseña');
$sftp = ssh2_sftp($connection);

ssh2_sftp_chmod($sftp, '/carpeta/fichero', 0755);
?&gt;

### Ver también

    - [chmod()](#function.chmod) - Cambia el modo del fichero

    - [ssh2_sftp()](#function.ssh2-sftp) - Inicializa un subsistema SFTP

    - [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

# ssh2_sftp_lstat

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_lstat — Estado de un enlace simbólico

### Descripción

**ssh2_sftp_lstat**([resource](#language.types.resource) $sftp, [string](#language.types.string) $path): [array](#language.types.array)

Estado de un enlace simbólico en el sistema
de ficheros remoto _sin_ seguir el enlace.

Esta función es similar a la utilización de la función
[lstat()](#function.lstat) con el gestor
[ssh2.sftp://](#wrappers.ssh2) y devuelve los
mismos valores.

### Parámetros

     sftp


       Un recurso SSH2 SFTP abierto por  [ssh2_sftp()](#function.ssh2-sftp).






     path


       Ruta hacia el enlace simbólico remoto.





### Valores devueltos

Ver la documentación de la función [stat()](#function.stat)
para los detalles concernientes a los valores devueltos.

### Ejemplos

    **Ejemplo #1 Estado de un enlace simbólico vía SFTP**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$sftp = ssh2_sftp($connection);
$statinfo = ssh2_sftp_lstat($sftp, '/path/to/symlink');

$filesize = $statinfo['size'];
$group = $statinfo['gid'];
$owner = $statinfo['uid'];
$atime = $statinfo['atime'];
$mtime = $statinfo['mtime'];
$mode = $statinfo['mode'];
?&gt;

### Ver también

    - [ssh2_sftp_stat()](#function.ssh2-sftp-stat) - Obtiene el estado de un fichero en un sistema de ficheros remoto

    - [lstat()](#function.lstat) - Devuelve información sobre un fichero o un enlace simbólico

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# ssh2_sftp_mkdir

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_mkdir — Crea un directorio

### Descripción

**ssh2_sftp_mkdir**(
    [resource](#language.types.resource) $sftp,
    [string](#language.types.string) $dirname,
    [int](#language.types.integer) $mode = 0777,
    [bool](#language.types.boolean) $recursive = **[false](#constant.false)**
): [bool](#language.types.boolean)

Crea un directorio en el sistema de ficheros remoto.

Esta función es similar a la función [mkdir()](#function.mkdir)
con el gestor [ssh2.sftp://](#wrappers.ssh2).

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto con la función
       [ssh2_sftp()](#function.ssh2-sftp).






     dirname


       Ruta del nuevo directorio.






     mode


       Permisos del nuevo directorio.
       El modo actual es afectado por la umask actual.






     recursive


       Si recursive vale **[true](#constant.true)**, todos los directorios requeridos
       para dirname serán también automáticamente
       creados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Creación de un directorio en un servidor remoto**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

ssh2_sftp_mkdir($sftp, '/home/username/newdir');
/* O:  mkdir("ssh2.sftp://$sftp/home/username/newdir"); \*/
?&gt;

### Ver también

    - [mkdir()](#function.mkdir) - Crea un directorio

    - [ssh2_sftp_rmdir()](#function.ssh2-sftp-rmdir) - Elimina un directorio

# ssh2_sftp_readlink

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_readlink — Devuelve el destino de un enlace simbólico

### Descripción

**ssh2_sftp_readlink**([resource](#language.types.resource) $sftp, [string](#language.types.string) $link): [string](#language.types.string)

Devuelve el destino de un enlace simbólico.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     link


       Ruta hacia el enlace simbólico.





### Valores devueltos

Devuelve el destino del enlace simbólico link.

### Ejemplos

    **Ejemplo #1 Lectura de un enlace simbólico**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

$target = ssh2_sftp_readlink($sftp, '/tmp/mysql.sock');
/_ $target es ahora (e.g.): '/var/run/mysql.sock' _/
?&gt;

### Ver también

    - [readlink()](#function.readlink) - Devuelve el contenido de un enlace simbólico

    - [ssh2_sftp_symlink()](#function.ssh2-sftp-symlink) - Crea un enlace simbólico

# ssh2_sftp_realpath

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_realpath — Resuelve la ruta real de una ruta proporcionada

### Descripción

**ssh2_sftp_realpath**([resource](#language.types.resource) $sftp, [string](#language.types.string) $filename): [string](#language.types.string)

Traduce un nombre de fichero filename en su ruta
realmente efectiva en el sistema de ficheros remoto.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     filename







### Valores devueltos

Devuelve la ruta real, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Resolver un nombre de ruta**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

$realpath = ssh2_sftp_realpath($sftp, '/home/username/../../../..//./usr/../etc/passwd');
/_ $realpath es ahora: '/etc/passwd' _/
?&gt;

### Ver también

    - [realpath()](#function.realpath) - Retorna la ruta de acceso canónica absoluta

    - [ssh2_sftp_symlink()](#function.ssh2-sftp-symlink) - Crea un enlace simbólico

    - [ssh2_sftp_readlink()](#function.ssh2-sftp-readlink) - Devuelve el destino de un enlace simbólico

# ssh2_sftp_rename

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_rename — Renombra un fichero remoto

### Descripción

**ssh2_sftp_rename**([resource](#language.types.resource) $sftp, [string](#language.types.string) $from, [string](#language.types.string) $to): [bool](#language.types.boolean)

Renombra un fichero remoto.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     from


       El fichero actual a renombrar.






     to


       El nuevo nombre del fichero.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Renombrar un fichero vía sftp**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

ssh2_sftp_rename($sftp, '/home/username/oldname', '/home/username/newname');
?&gt;

### Ver también

    - [rename()](#function.rename) - Renombra un fichero o un directorio

# ssh2_sftp_rmdir

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_rmdir — Elimina un directorio

### Descripción

**ssh2_sftp_rmdir**([resource](#language.types.resource) $sftp, [string](#language.types.string) $dirname): [bool](#language.types.boolean)

Elimina un directorio del sistema de ficheros remoto.

Esta función es similar al uso de la función
[rmdir()](#function.rmdir) con el gestor
[ssh2.sftp://](#wrappers.ssh2).

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     dirname







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Eliminación de un directorio en un servidor remoto**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

ssh2_sftp_rmdir($sftp, '/home/username/deltodel');
/* O :  rmdir("ssh2.sftp://$sftp/home/username/dirtodel"); \*/
?&gt;

### Ver también

    - [rmdir()](#function.rmdir) - Elimina un directorio

    - [ssh2_sftp_mkdir()](#function.ssh2-sftp-mkdir) - Crea un directorio

# ssh2_sftp_stat

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_stat — Obtiene el estado de un fichero en un sistema de ficheros remoto

### Descripción

**ssh2_sftp_stat**([resource](#language.types.resource) $sftp, [string](#language.types.string) $path): [array](#language.types.array)

Obtiene el estado de un fichero en un sistema de ficheros remoto, siguiendo los enlaces simbólicos.

Esta función es similar al uso de la función
[stat()](#function.stat) con el gestor
[ssh2.sftp://](#wrappers.ssh2) y devuelve los mismos valores.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     path







### Valores devueltos

Ver la documentación de la función
[stat()](#function.stat) para los detalles sobre los valores devueltos.

### Ejemplos

    **Ejemplo #1 Estado de un fichero vía SFTP**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$sftp = ssh2_sftp($connection);
$statinfo = ssh2_sftp_stat($sftp, '/path/to/file');

$filesize = $statinfo['size'];
$group = $statinfo['gid'];
$owner = $statinfo['uid'];
$atime = $statinfo['atime'];
$mtime = $statinfo['mtime'];
$mode = $statinfo['mode'];
?&gt;

### Ver también

    - [ssh2_sftp_lstat()](#function.ssh2-sftp-lstat) - Estado de un enlace simbólico

    - [lstat()](#function.lstat) - Devuelve información sobre un fichero o un enlace simbólico

    - [stat()](#function.stat) - Proporciona información sobre un fichero

# ssh2_sftp_symlink

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_symlink — Crea un enlace simbólico

### Descripción

**ssh2_sftp_symlink**([resource](#language.types.resource) $sftp, [string](#language.types.string) $target, [string](#language.types.string) $link): [bool](#language.types.boolean)

Crea un enlace simbólico en el sistema de ficheros remoto.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     target


       Objetivo del enlace simbólico.






     link







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Creación de un enlace simbólico**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

ssh2_sftp_symlink($sftp, '/var/run/mysql.sock', '/tmp/mysql.sock');
?&gt;

### Ver también

    - [ssh2_sftp_readlink()](#function.ssh2-sftp-readlink) - Devuelve el destino de un enlace simbólico

    - [symlink()](#function.symlink) - Crea un enlace simbólico

# ssh2_sftp_unlink

(PECL ssh2 &gt;= 0.9.0)

ssh2_sftp_unlink — Borra un fichero

### Descripción

**ssh2_sftp_unlink**([resource](#language.types.resource) $sftp, [string](#language.types.string) $filename): [bool](#language.types.boolean)

Borra un fichero en el sistema de ficheros remoto.

### Parámetros

     sftp


       Un recurso SSH2 SFTP, abierto por la función [ssh2_sftp()](#function.ssh2-sftp).






     filename


       El nombre del fichero a borrar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Borrado de un fichero**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');
$sftp = ssh2_sftp($connection);

ssh2_sftp_unlink($sftp, '/home/username/stale_file');
?&gt;

### Ver también

    - [unlink()](#function.unlink) - Elimina un fichero

# ssh2_shell

(PECL ssh2 &gt;= 0.9.0)

ssh2_shell — Solicita un shell interactivo

### Descripción

**ssh2_shell**(
    [resource](#language.types.resource) $session,
    [string](#language.types.string) $termtype = "vanilla",
    [?](#language.types.null)[array](#language.types.array) $env = **[null](#constant.null)**,
    [int](#language.types.integer) $width = 80,
    [int](#language.types.integer) $height = 25,
    [int](#language.types.integer) $width_height_type = SSH2_TERM_UNIT_CHARS
): [resource](#language.types.resource)|[false](#language.types.singleton)

Abre un shell en el servidor remoto y le asigna un flujo.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     termtype


       termtype debe corresponder a una
       de las entradas del fichero /etc/termcap del sistema objetivo.






     env


       env debe ser pasado como un array asociativo
       de pares nombre/valor a definir en el entorno objetivo.






     width


       Ancho del terminal virtual.






     height


       Altura del terminal virtual.






     width_height_type


       width_height_type debe ser o bien
       **[SSH2_TERM_UNIT_CHARS](#constant.ssh2-term-unit-chars)**, o bien
       **[SSH2_TERM_UNIT_PIXELS](#constant.ssh2-term-unit-pixels)**.





### Valores devueltos

Devuelve un flujo de [resource](#language.types.resource) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejecución de un comando**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_password($connection, 'username', 'password');

$stream = ssh2_shell($connection, 'vt102', null, 80, 24, SSH2_TERM_UNIT_CHARS);
?&gt;

### Ver también

    - [ssh2_exec()](#function.ssh2-exec) - Ejecuta un comando en un servidor remoto

    - [ssh2_tunnel()](#function.ssh2-tunnel) - Abre un túnel a través de un servidor remoto

    - [ssh2_fetch_stream()](#function.ssh2-fetch-stream) - Recorre un flujo extendido de datos

# ssh2_tunnel

(PECL ssh2 &gt;= 0.9.0)

ssh2_tunnel — Abre un túnel a través de un servidor remoto

### Descripción

**ssh2_tunnel**([resource](#language.types.resource) $session, [string](#language.types.string) $host, [int](#language.types.integer) $port): [resource](#language.types.resource)

Abre un socket hacia un host/puerto arbitrario
a través de un servidor SSH conectado.

### Parámetros

     session


       Un identificador de conexión SSH, obtenido desde la función
       [ssh2_connect()](#function.ssh2-connect).






     host








     port







### Valores devueltos

### Ejemplos

    **Ejemplo #1 Apertura de un túnel en un host arbitrario**

&lt;?php
$connection = ssh2_connect('shell.example.com', 22);
ssh2_auth_pubkey_file($connection, 'username', 'id_dsa.pub', 'id_dsa');

$tunnel = ssh2_tunnel($connection, '10.0.0.101', 12345);
?&gt;

### Ver también

    - [ssh2_connect()](#function.ssh2-connect) - Conexión a un servidor SSH

    - [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

## Tabla de contenidos

- [ssh2_auth_agent](#function.ssh2-auth-agent) — Autenticación SSH utilizando el agente ssh
- [ssh2_auth_hostbased_file](#function.ssh2-auth-hostbased-file) — Identificación utilizando una clave de host pública
- [ssh2_auth_none](#function.ssh2-auth-none) — Identificación como "none"
- [ssh2_auth_password](#function.ssh2-auth-password) — Autenticación vía SSH utilizando una contraseña en texto claro
- [ssh2_auth_pubkey_file](#function.ssh2-auth-pubkey-file) — Identificación utilizando una clave pública
- [ssh2_connect](#function.ssh2-connect) — Conexión a un servidor SSH
- [ssh2_disconnect](#function.ssh2-disconnect) — Cierra una conexión a un servidor SSH remoto
- [ssh2_exec](#function.ssh2-exec) — Ejecuta un comando en un servidor remoto
- [ssh2_fetch_stream](#function.ssh2-fetch-stream) — Recorre un flujo extendido de datos
- [ssh2_fingerprint](#function.ssh2-fingerprint) — Recupera la huella de un servidor remoto
- [ssh2_forward_accept](#function.ssh2-forward-accept) — Acepta una conexión creada por un observador
- [ssh2_forward_listen](#function.ssh2-forward-listen) — Enlaza un puerto en el servidor remoto y observa las conexiones
- [ssh2_methods_negotiated](#function.ssh2-methods-negotiated) — Devuelve una lista de métodos negociados
- [ssh2_poll](#function.ssh2-poll) — Consulta los canales/observadores/flujos para eventos
- [ssh2_publickey_add](#function.ssh2-publickey-add) — Añade una clave pública autorizada
- [ssh2_publickey_init](#function.ssh2-publickey-init) — Inicializa un Publickey Subsystem (subsistema de clave pública)
- [ssh2_publickey_list](#function.ssh2-publickey-list) — Lista las claves públicas actualmente autorizadas
- [ssh2_publickey_remove](#function.ssh2-publickey-remove) — Elimina una clave pública autorizada
- [ssh2_scp_recv](#function.ssh2-scp-recv) — Solicita un fichero mediante SCP
- [ssh2_scp_send](#function.ssh2-scp-send) — Envía un fichero mediante SCP
- [ssh2_send_eof](#function.ssh2-send-eof) — Envía un EOF al flujo
- [ssh2_sftp](#function.ssh2-sftp) — Inicializa un subsistema SFTP
- [ssh2_sftp_chmod](#function.ssh2-sftp-chmod) — Modifica el modo de un fichero
- [ssh2_sftp_lstat](#function.ssh2-sftp-lstat) — Estado de un enlace simbólico
- [ssh2_sftp_mkdir](#function.ssh2-sftp-mkdir) — Crea un directorio
- [ssh2_sftp_readlink](#function.ssh2-sftp-readlink) — Devuelve el destino de un enlace simbólico
- [ssh2_sftp_realpath](#function.ssh2-sftp-realpath) — Resuelve la ruta real de una ruta proporcionada
- [ssh2_sftp_rename](#function.ssh2-sftp-rename) — Renombra un fichero remoto
- [ssh2_sftp_rmdir](#function.ssh2-sftp-rmdir) — Elimina un directorio
- [ssh2_sftp_stat](#function.ssh2-sftp-stat) — Obtiene el estado de un fichero en un sistema de ficheros remoto
- [ssh2_sftp_symlink](#function.ssh2-sftp-symlink) — Crea un enlace simbólico
- [ssh2_sftp_unlink](#function.ssh2-sftp-unlink) — Borra un fichero
- [ssh2_shell](#function.ssh2-shell) — Solicita un shell interactivo
- [ssh2_tunnel](#function.ssh2-tunnel) — Abre un túnel a través de un servidor remoto

- [Introducción](#intro.ssh2)
- [Instalación/Configuración](#ssh2.setup)<li>[Requerimientos](#ssh2.requirements)
- [Instalación](#ssh2.installation)
- [Tipos de recursos](#ssh2.resources)
  </li>- [Constantes predefinidas](#ssh2.constants)
- [Funciones de SSH2](#ref.ssh2)<li>[ssh2_auth_agent](#function.ssh2-auth-agent) — Autenticación SSH utilizando el agente ssh
- [ssh2_auth_hostbased_file](#function.ssh2-auth-hostbased-file) — Identificación utilizando una clave de host pública
- [ssh2_auth_none](#function.ssh2-auth-none) — Identificación como "none"
- [ssh2_auth_password](#function.ssh2-auth-password) — Autenticación vía SSH utilizando una contraseña en texto claro
- [ssh2_auth_pubkey_file](#function.ssh2-auth-pubkey-file) — Identificación utilizando una clave pública
- [ssh2_connect](#function.ssh2-connect) — Conexión a un servidor SSH
- [ssh2_disconnect](#function.ssh2-disconnect) — Cierra una conexión a un servidor SSH remoto
- [ssh2_exec](#function.ssh2-exec) — Ejecuta un comando en un servidor remoto
- [ssh2_fetch_stream](#function.ssh2-fetch-stream) — Recorre un flujo extendido de datos
- [ssh2_fingerprint](#function.ssh2-fingerprint) — Recupera la huella de un servidor remoto
- [ssh2_forward_accept](#function.ssh2-forward-accept) — Acepta una conexión creada por un observador
- [ssh2_forward_listen](#function.ssh2-forward-listen) — Enlaza un puerto en el servidor remoto y observa las conexiones
- [ssh2_methods_negotiated](#function.ssh2-methods-negotiated) — Devuelve una lista de métodos negociados
- [ssh2_poll](#function.ssh2-poll) — Consulta los canales/observadores/flujos para eventos
- [ssh2_publickey_add](#function.ssh2-publickey-add) — Añade una clave pública autorizada
- [ssh2_publickey_init](#function.ssh2-publickey-init) — Inicializa un Publickey Subsystem (subsistema de clave pública)
- [ssh2_publickey_list](#function.ssh2-publickey-list) — Lista las claves públicas actualmente autorizadas
- [ssh2_publickey_remove](#function.ssh2-publickey-remove) — Elimina una clave pública autorizada
- [ssh2_scp_recv](#function.ssh2-scp-recv) — Solicita un fichero mediante SCP
- [ssh2_scp_send](#function.ssh2-scp-send) — Envía un fichero mediante SCP
- [ssh2_send_eof](#function.ssh2-send-eof) — Envía un EOF al flujo
- [ssh2_sftp](#function.ssh2-sftp) — Inicializa un subsistema SFTP
- [ssh2_sftp_chmod](#function.ssh2-sftp-chmod) — Modifica el modo de un fichero
- [ssh2_sftp_lstat](#function.ssh2-sftp-lstat) — Estado de un enlace simbólico
- [ssh2_sftp_mkdir](#function.ssh2-sftp-mkdir) — Crea un directorio
- [ssh2_sftp_readlink](#function.ssh2-sftp-readlink) — Devuelve el destino de un enlace simbólico
- [ssh2_sftp_realpath](#function.ssh2-sftp-realpath) — Resuelve la ruta real de una ruta proporcionada
- [ssh2_sftp_rename](#function.ssh2-sftp-rename) — Renombra un fichero remoto
- [ssh2_sftp_rmdir](#function.ssh2-sftp-rmdir) — Elimina un directorio
- [ssh2_sftp_stat](#function.ssh2-sftp-stat) — Obtiene el estado de un fichero en un sistema de ficheros remoto
- [ssh2_sftp_symlink](#function.ssh2-sftp-symlink) — Crea un enlace simbólico
- [ssh2_sftp_unlink](#function.ssh2-sftp-unlink) — Borra un fichero
- [ssh2_shell](#function.ssh2-shell) — Solicita un shell interactivo
- [ssh2_tunnel](#function.ssh2-tunnel) — Abre un túnel a través de un servidor remoto
  </li>
