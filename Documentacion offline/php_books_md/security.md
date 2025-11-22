# Seguridad

# Introducción

PHP es un potente lenguaje, y su intérprete, bien como módulo
del servidor web o bien como binario CGI,
puede acceder a ficheros, ejecutar comandos o abrir conexiones de
red desde el servidor. Estas propiedades hacen que, por omisión,
sea inseguro todo lo que se ejecute en un servidor web.
PHP está diseñado específicamente para ser un lenguaje más seguro
para escribir aplicaciones CGI que Perl o C.
Partiendo de un correcto ajuste de opciones de configuración para tiempo de ejecución
y en tiempo de compilación, y el uso de prácticas de programación
apropiadas, pueden proporcionarle la combinación de libertad y de
seguridad que necesita.

Dado que hay muchas vías para ejecutar PHP, existen muchas opciones de
configuración para controlar su comportamiento. Al haber una extensa selección
de opciones se garantiza poder usar PHP para un gran número de propósitos, pero a la
vez significa que existen combinaciones que conllevan una configuración
menos segura.

La flexibilidad de configuración de PHP rivaliza igualmente con la
flexibilidad de su código. PHP puede ser usado para construir completas
aplicaciones de servidor, con toda la potencia de un usuario de consola,
o se puede usar sólo desde el lado del servidor implicando un menor
riesgo dentro de un entorno controlado. El cómo construir ese entorno, y cómo
de seguro es, depende del desarrollador PHP.

Este capítulo comienza con algunos consejos generales de seguridad, explica
las diferentes combinaciones de opciones de configuración y las situaciones
en que pueden ser útiles, y describe diferentes consideraciones relacionadas
con la programación de acuerdo a diferentes niveles de seguridad.

# Consideraciones generales

    Un sistema completamente seguro es prácticamente un
    imposible, de modo que el enfoque usado con mayor frecuencia en la
    profesión de seguridad es uno que busque el balance
    adecuado entre riesgo y funcionalidad. Si cada variable enviada
    por un usuario requiriera de dos formas de validación
    biométrica (como rastreo de retinas y análisis
    dactilar), usted contaría con un nivel extremadamente alto
    de confiabilidad. También implicaría que llenar los
    datos de un formulario razonablemente complejo podría tomar
    media hora, cosa que podría incentivar a los usuarios a
    buscar métodos para esquivar los mecanismos de seguridad.




    La mejor seguridad con frecuencia es lo suficientemente razonable
    como para suplir los requerimientos dados sin prevenir que el
    usuario realice su labor de forma natural, y sin sobrecargar al
    autor del código con una complejidad excesiva. De hecho,
    algunos ataques de seguridad son simples recursos que aprovechan
    las vulnerabilidades de este tipo de seguridad sobrecargada, que
    tiende a erosionarse con el tiempo.




    Una frase que vale la pena recordar: Un sistema es apenas tan
    bueno como el eslabón más débil de una
    cadena. Si todas las transacciones son registradas copiosamente
    basándose en la fecha/hora, ubicación, tipo de
    transacción, etc. pero la verificación del usuario
    se realiza únicamente mediante una cookie sencilla, la
    validez de atar a los usuarios al registro de transacciones es
    mermada severamente.




    Cuando realice pruebas, tenga en mente que no será capaz de
    probar todas las diferentes posibilidades, incluso para las
    páginas más simples. Los datos de entrada que usted
    puede esperar en sus aplicaciones no necesariamente tendrán
    relación alguna con el tipo de información que
    podría ingresar un empleado disgustado, un cracker con
    meses de tiempo entre sus manos, o un gato doméstico
    caminando sobre el teclado. Es por esto que es mejor observar el
    código desde una perspectiva lógica, para determinar
    en dónde podrían introducirse datos inesperados, y
    luego hacer un seguimiento de cómo esta información
    es modificada, reducida o amplificada.




    Internet está repleto de personas que tratan de crearse
    fama al romper la seguridad de su código, bloquear su
    sitio, publicar contenido inapropiado, y por lo demás
    haciendo que sus días sean más interesantes. No
    importa si usted administra un sitio pequeño o grande,
    usted es un objetivo por el simple hecho de estar en línea,
    por tener un servidor al cual es posible conectarse. Muchas
    aplicaciones de cracking no hacen distinciones por tamaños,
    simplemente recorren bloques masivos de direcciones IP en busca de
    víctimas. Trate de no convertirse en una.

# Instalado como CGI binario

## Tabla de contenidos

- [Ataques posibles](#security.cgi-bin.attacks)
- [Caso 1: Ficheros públicos servidos solamente](#security.cgi-bin.default)
- [Caso 2: utilizando cgi.force_redirect](#security.cgi-bin.force-redirect)
- [Caso 3: Configurando doc_root o user_dir](#security.cgi-bin.doc-root)
- [Caso 4: El analizador de PHP fuera del árbol de la web](#security.cgi-bin.shell)

    ## Ataques posibles

    Usar PHP como un binario CGI es una opción para
    configuraciones que por alguna razón no desean integrar PHP como un
    módulo dentro del software de servidor (como Apache), o usarán PHP con
    diferentes tipos de envoltorios CGI para crear entornos
    seguros **chroot** y **setuid** para scripts.
    Esta configuración usualmente involucra la instalación del binario
    ejecutable de **php** en el directorio cgi-bin
    del servidor web. La recomendación [» CA-96.11](http://www.cert.org/advisories/CA-1996-11.html) del CERT recomienda
    que está en contra de colocar cualquiera de los intérpretes dentro de cgi-bin.
    Aún si el binario de **php** puede ser usado como un intérprete independiente, PHP está diseñado
    para prevenir los ataques que esta configuración hace posible:
    - Accediendo a los ficheros del sistema: http://mi.servidor/cgi-bin/php?/etc/passwd

        La consulta de información en una URL después del signo de interrogación (?) es
        pasado como argumento de la línea de comandos al intérprete por la interfaz
        del CGI. Usualmente los intérpretes abren y ejecutan el fichero
        especificado como el primer argumento en la línea de comandos.

        Cuando es invocado como un binario de CGI, **php** se niega a interpretar los
        argumentos de línea de comandos.

    - Accediendo a cualquier documento web en el servidor: http://mi.servidor/cgi-bin/php/directorio/secreto/doc.html

        Parte de la ruta de información de la URL después del nombre del binario de PHP,
        /directorio/secreto/doc.html es
        convencionalmente utilizado para especificar el nombre del fichero
        a ser abierto e interpretado por el programa CGI.
        Usualmente las directivas de configuración de algunos servidores web (Apache:
        Action) son utilizados para redirigir peticiones a los documentos como
        http://mi.servidor/directorio/secreto/script.php al
        intérprete de PHP. Con esta configuración, el servidor web revisa primero
        los permisos de acceso a los directorios /directorio/secreto, y después crea la
        petición redirigida http://mi.servidor/cgi-bin/php/directorio/secreto/script.php.
        Desafortunadamente, si la petición es proporcionada originalmente en esta forma,
        no se revisan los accesos a los directorios hechos por el servidor web /directorio/secreto/script.php, sino solamente al fichero
        /cgi-bin/php. De esta forma
        /cgi-bin/php cualquier usuario está habilitado a acceder
        a cualquier documento protegido en el servidor web.

        En PHP, las directivas de configuración en tiempo de ejecución [cgi.force_redirect](#ini.cgi.force-redirect), [doc_root](#ini.doc-root) y [user_dir](#ini.user-dir) pueden ser utilizadas para prevenir
        este ataque, si el árbol de documentos del servidor tiene cualquiera de estos directorios
        con restricciones de acceso. Véase más abajo para una explicación completa
        de las diferentes combinaciones.

    ## Caso 1: Ficheros públicos servidos solamente

    Si su servidor no tiene ningún contenido que no esté restringido
    por contraseña o control de acceso basado en IP, no hay necesidad de
    estas opciones de configuración. Si su servidor web no le permite
    hacer redirecciones, o el servidor no tiene una forma de
    comunicar al binario de PHP que la petición es una forma segura de
    petición de redireccionada la solicitud, puedes habilitar la directiva ini [cgi.force_redirect](#ini.cgi.force-redirect). Usted todavía tiene que asegurarse que sus
    scripts de PHP no confían en una forma o en otra para llamar el script,
    ni directamente http://my.host/cgi-bin/php/dir/script.php
    ni por redirección http://my.host/dir/script.php.

    La redirección puede ser configurada en Apache utilizando directivas
    Action y AddHandler (vea más abajo).

    ## Caso 2: utilizando cgi.force_redirect

    La directiva de configuración [cgi.force_redirect](#ini.cgi.force-redirect)
    previene a cualquiera que llame a PHP
    directamente por medio de una URL como esta http://mi.servidor/cgi-bin/php/directoriosecreto/script.php.
    En cambio, **php** solamente lo analizará en este modo si éste se ha ido a través de
    una regla directa del servidor web.

    Usualmente la redirección en la configuración de Apache se hace con
    las siguientes directivas:

Action php-script /cgi-bin/php
AddHandler php-script .php

     Esta opción ha sido probada solamente con el servidor web Apache, y
     se basa en que en Apache se configure en una variable de entorno no-estándar de CGI
     REDIRECT_STATUS para peticiones de redirección. Si su
     servidor web no soporta ninguna forma de decirle si la petición es
     directa o redirigida, usted no puede utilizar esta opción y debe usar
     una de las otras formas de ejecutar la versión CGI aquí documentadas.








    ## Caso 3: Configurando doc_root o user_dir


     Para incluir contenido activo, como scripts y ejecutables, en los
     directorios de documentos del servidor web es algunas veces considerado una práctica
     insegura. Si, por el hecho del algún error de configuración, los scripts
     no se ejecutan y son mostrados como documentos HTML regulares, esto
     podría resultar en una fuga de información de propiedad intelectual
     o de información de seguridad como las contraseñas. Por lo tanto muchos Administradores de Sistemas
     preferirán configurar otra estructura de directorios para scripts que sean
     accesibles solamente a través del CGI de PHP, y por lo tanto siempre interpretado y no desplegado como tal.




     También si el método para asegurar las peticiones no es
     redirigido, como se describió en la sección anterior, no está
     disponible, es necesario configurar un script doc_root que sea
     diferente de la raíz del documento web.




     Usted puede configurar el script de la raíz de documento de PHP en la directiva
     de configuración [doc_root](#ini.doc-root) en el
     [fichero de configuración](#configuration.file), o
     puede configurar la variable de entorno PHP_DOCUMENT_ROOT.
     Si éste es configurado, la versión del CGI
     de PHP siempre construirá el nombre del fichero para abrir con este
     doc_root y la ruta de información en la petición,
     de tal forma que pueda estar seguro que ningún script será ejecutado fuera de
     este directorio (excepto por user_dir que se encuentra
     más abajo).




     Otra opción utilizable es esta [user_dir](#ini.user-dir). Cuando user_dir no está configurado,
     lo único que controla el fichero abierto es doc_root.
     Al abrir una URL como http://mi.servidor/~usuario/documento.php no resulta
     en la apertura de un fichero bajo el directorio personal de los usuarios, pero si
     un fichero llamado ~usuario/documento.php debajo de
     doc_root (si, un nombre de directorio que inicia con una a tilde [~]).




     Si user_dir es configurado, por ejemplo public_php, una petición como http://mi.servidor/~usuario/doc.php abrirá un
     fichero llamado doc.php bajo el directorio
     llamado public_php debajo de el directorio
     personal del usuario.  Si el directorio personal del usuario es /home/usuario, el fichero ejecutado será
     /home/user/public_php/doc.php.




     La expansión de user_dir sucede sin tomar en cuenta
     la configuración de doc_root, así que usted puede
     controlar el acceso a la raíz de los documentos y el directorio de los
     usuarios separadamente.








    ## Caso 4: El analizador de PHP fuera del árbol de la web


     Una opción muy segura es poner el binario analizador de PHP en algún lugar
     fuera del árbol de ficheros de la web. En /usr/local/bin, por ejemplo.  El único inconveniente
     real con esta opción es que ahora tendrá que poner una línea similar a:





#!/usr/local/bin/php

     como la primera línea de cualquier fichero que contenga etiquetas de PHP. También
     necesitará hacer que el fichero sea ejecutable. Eso significa, tratarlo exactamente
     como trataría cualquier otro script de CGI escrito en Perl, sh, bash, o cualquier
     otro lenguaje común de script el cual utilice #! como mecanismo
     de ejecución de si mismo.


     Para que PHP maneje la información correctamente de PATH_INFO y
     PATH_TRANSLATED con esta configuración, La directiva ini [cgi.discard_path](#ini.cgi.discard-path) debe estar habilitada..

# Instalado como módulo de Apache

    Cuando PHP es usado como un módulo de Apache, hereda los
    permisos del usuario de Apache (generalmente los del usuario
    "nobody"). Este hecho representa varios impactos sobre la
    seguridad y las autorizaciones. Por ejemplo, si se está usando
    PHP para acceder a una base de datos, a menos que tal base de
    datos disponga de un control de acceso propio, se tendrá
    que hacer que la base de datos sea asequible por el usuario
    "nobody".  Esto quiere decir que un script malicioso podría
    tener acceso y modificar la base de datos, incluso sin un nombre
    de usuario y contraseña. Es completamente posible que una
    araña web (bot) pudiera toparse con la página web de administración de
    una base de datos, y eliminar todo de la base de datos. Una
    protección ante este tipo de situaciones es mediante el uso del
    mecanismo de autorización de Apache, o con modelos de acceso
    de diseño propio usando LDAP, archivos .htaccess, etc. e
    incluir ese código como parte de los scripts PHP.




    Con frecuencia, una vez la seguridad se ha establecido en un punto
    en donde el usuario de PHP (en este caso, el usuario de apache)
    tiene asociada muy poco riesgo, se descubre que
    PHP se encuentra ahora imposibilitado de escribir archivos en los
    directorios de los usuarios. O quizás se le haya
    desprovisto de la capacidad de acceder o modificar bases de
    datos. Se ha prevenido  que pudiera escribir tanto
    archivos buenos como malos, o que pudiera realizar transacciones
    buenas o malas en la base de datos.




    Un error de seguridad cometido con frecuencia en este punto es
    darle permisos de administrador (root) a apache, o incrementar las
    habilidades del usuario de apache de alguna otra forma.




    Incrementar los permisos del usuario de Apache hasta el nivel de
    administrador es extremadamente peligroso y puede comprometer al
    sistema entero, así que el uso de entornos sudo, chroot, o
    cualquier otro mecanismo que sea ejecutado como root no
    debería ser considerado como una opción por aquellos que no
    son profesionales en seguridad.




    Existen otras soluciones más simples. Mediante el uso
    de [open_basedir](#ini.open-basedir) se
    puede controlar y restringir qué directorios
    pueden ser usados por PHP. También se pueden definir
    áreas solo-Apache, para restringir todas las actividades
    basadas en web a archivos que no son de usuarios o del sistema.

# Seguridad de una Sesión

Es importante mantener seguro el manejo de sesión HTTP. La seguridad
relacionada a la Sesión está descrita en
[Seguridad de Sesión](#session.security) en la sección
de referencia [Módulo de Sesión](#book.session).

# Seguridad del Sistema de Archivos

## Tabla de contenidos

- [Cuestiones relacionadas a bytes nulos](#security.filesystem.nullbytes)

    PHP está sujeto a la seguridad integrada en la mayoría de sistemas de servidores con
    respecto a los permisos de archivos y directorios. Esto permite
    controlar qué archivos en el sistema de archivos se pueden leer. Se debe
    tener cuidado con los archivos que son legibles para garantizar
    que son seguros para la lectura por todos los usuarios que tienen acceso al
    sistema de archivos.

    Desde que PHP fue diseñado para permitir el acceso a nivel de usuarios para el sistema de archivos,
    es perfectamente posible escribir un script PHP que le permita
    leer archivos del sistema como /etc/passwd, modificar sus conexiones de red,
    enviar trabajos de impresión masiva, etc. Esto tiene algunas
    implicaciones obvias, es necesario asegurarse que los archivos
    que se van a leer o escribir son los apropiados.

    Considere el siguiente script, donde un usuario indica que
    quiere borrar un archivo en su directorio home. Esto supone una
    situación en la que una interfaz web en PHP es usada regularmente para gestionar archivos,
    por lo que es necesario que el usuario Apache pueda borrar archivos en los
    directorios home de los usuarios.

    **Ejemplo #1 Un control pobre puede llevar a ....**

&lt;?php

// eliminar un archivo del directorio personal del usuario
$username = $_POST['user_submitted_name'];
$userfile = $_POST['user_submitted_filename'];
$homedir = "/home/$username";

unlink("$homedir/$userfile");

echo "El archivo ha sido eliminado!";
?&gt;

Dado que el nombre de usuario y el nombre del archivo son enviados desde un formulario,
estos pueden representar un nombre de archivo y un nombre de usuario que pertenecen a otra persona,
incluso se podría borrar el archivo a pesar que se supone que no estaría permitido hacerlo.
En este caso, usted desearía usar algún otro tipo de autenticación.
Considere lo que podría suceder si las variables enviadas son
"../etc/" y "passwd". El código entonces se ejecutaría efectivamente como:

     **Ejemplo #2 ... Un ataque al sistema de archivos**




&lt;?php

// elimina un archivo desde cualquier lugar en el disco duro al que
// el usuario de PHP tiene acceso. Si PHP tiene acceso de root:
$username = $_POST['user_submitted_name']; // "../etc"
$userfile = $_POST['user_submitted_filename']; // "passwd"
$homedir = "/home/$username"; // "/home/../etc"

unlink("$homedir/$userfile"); // "/home/../etc/passwd"

echo "El archivo ha sido eliminado!";
?&gt;

    Hay dos medidas importantes que usted debe tomar para prevenir estas
     cuestiones.

     -

       Únicamente permisos limitados al usuario web de PHP.



     -

       Revise todas las variables que se envían.




    Aquí está una versión mejorada del script:

     **Ejemplo #3 Comprobación más segura del nombre de archivo**




&lt;?php

// elimina un archivo del disco duro al que
// el usuario de PHP tiene acceso.
$username = $_SERVER['REMOTE_USER']; // usando un mecanismo de autenticación
$userfile = basename($_POST['user_submitted_filename']);
$homedir = "/home/$username";

$filepath = "$homedir/$userfile";

if (file_exists($filepath) &amp;&amp; unlink($filepath)) {
$logstring = "Se ha eliminado $filepath\n";
} else {
$logstring = "No se ha podido eliminar $filepath\n";
}

$fp = fopen("/home/logging/filedelete.log", "a");
fwrite($fp, $logstring);
fclose($fp);

echo htmlentities($logstring, ENT_QUOTES);

?&gt;

    Sin embargo, incluso esto no está exento de defectos. Si la autenticación
    del sistema permite a los usuarios crear sus propios inicios de sesión de usuario, y un usuario
    eligió la entrada "../etc/", el sistema está expuesto una vez más. Por
    esta razón, puede que prefiera escribir un chequeo más personalizado:

     **Ejemplo #4 Comprobación más segura del nombre de archivo**




&lt;?php

$username     = $_SERVER['REMOTE_USER']; // usando un mecanismo de autenticación
$userfile = $_POST['user_submitted_filename'];
$homedir = "/home/$username";

$filepath     = "$homedir/$userfile";

if (!ctype*alnum($username) || !preg_match('/^(?:[a-z0-9*-]|\.(?!\.))+$/iD', $userfile)) {
die("nombre de usuario o nombre de archivo incorrecto");
}

// etc.

?&gt;

    Dependiendo de sus sistema operativo, hay una gran variedad de archivos
    a los que debe estar atento, esto incluye las entradas de dispositivos (/dev/
    o COM1), archivos de configuracion (archivos /etc/ y archivos .ini),
    las muy conocidas carpetas de almacenamiento (/home/, My Documents), etc. Por esta
    razón, por lo general es más fácil crear una política en donde se prohíba
    todo excepto lo que expresamente se permite.




    ## Cuestiones relacionadas a bytes nulos


     Como PHP utiliza las funciones de C para operaciones relacionadas al sistema de archivos,
     se podría manejar bytes nulos de manera bastante inesperada.
     Como un byte nulo denota el fin de una cadena en C, las cadenas que contengan estos
     no serán consideradas por completo, sino sólo hasta que ocurra un byte nulo.

     El siguiente ejemplo muestra un código vulnerable que presenta este problema:




     **Ejemplo #1 Script vulnerable a bytes nulos**




&lt;?php

$file = $\_GET['file']; // "../../etc/passwd\0"
if (file_exists('/home/wwwrun/' . $file . '.php')) {
// file_exists devolverá true si el archivo /home/wwwrun/../../etc/passwd existe
include '/home/wwwrun/' . $file . '.php';
// el archivo /etc/passwd se incluirá
}

?&gt;

     Por lo tanto, cualquier cadena que se utiliza en una operación de sistema de archivos siembre deben
     ser validados correctamente. He aquí una versión mejorada del ejemplo anterior:




     **Ejemplo #2 Validando correctamente la entrada**




&lt;?php

$file = $\_GET['file'];

// Lista blanca de valores posibles
switch ($file) {
    case 'main':
    case 'foo':
    case 'bar':
        include '/home/wwwrun/include/'.$file.'.php';
break;
default:
include '/home/wwwrun/include/main.php';
}

?&gt;

# Seguridad en bases de datos

## Tabla de contenidos

- [Diseño de bases de datos](#security.database.design)
- [Conexión a una base de datos](#security.database.connection)
- [Modelo de almacenamiento cifrado](#security.database.storage)
- [Inyección de SQL](#security.database.sql-injection)

    Hoy en día, las bases de datos son componentes esenciales de cualquier aplicación web,
    permitiendo a los sitios web proveer variedad de contenido dinámico. Puesto que se puede
    almacenar información muy delicada o secreta en una base de datos, debería considerarse
    ampliamente proteger las bases de datos.

    Para obtener o almacenar cualquier información, es necesario conectarse a la base de datos,
    enviar una consulta válida, obtener el resultado, y cerrar la conexión.
    Hoy en día, el lenguaje de consultas más utilizado en esta interacción es el
    Lenguaje Estructurado de Consultas (SQL, por sus siglas en inglés). Vea como un atacante puede [realizar manipulaciones maliciosas con una consulta SQL](#security.database.sql-injection).

    Como es de suponer, PHP no puede proteger una base de datos por sí mismo. Las
    siguientes secciones tienen como objetivo ser una introducción básica de cómo
    acceder y manipular bases de datos dentro de scripts de PHP.

    Tenga en mente esta sencilla regla: Protección en profundidad. En cuantos más sitios se
    tomen acciones para aumentar la protección de una base de datos, menor es la
    probabilidad de que un atacante tenga éxito en exponer o abusar de cualquier información
    que tenga almacenada. Un buen diseño del esquema de la base de datos y de la aplicación
    se ocupará de sus mayores temores.

    ## Diseño de bases de datos

    El primer paso es siempre crear una base de datos, a menos que se quiera utilizar
    una de un tercero. Cuando se crea una base de datos, esta es
    asignada a un propietario, aquel que ejecutó la sentencia de creación. Usualmente, sólo
    el propietario (o un superusuario) puede hacer cualquier cosa con los objetos de esa
    base de datos. Para que otros usuarios puedan utilizarla, se les deben conceder
    privilegios.

    Las aplicaciones nunca deberían conectarse a la base de datos como su propietario o como
    un superusuario, porque estos usuarios pueden ejecutar cualquier consulta a su antojo; por
    ejemplo, modificar el esquema (p.ej., eliminar tablas) o borrar su contenido
    por completo.

    Se pueden crear distintos usuarios de una base de datos para cada aspecto de la
    aplicación con permisos muy limitados a los objetos de dicha base de datos. Solamente
    deberían otorgarse los privilegios necesarios, evitando así que el mismo usuario
    pueda interactuar con la base de datos en diferentes casos y uso. Esto significa que si
    un intruso obtiene acceso a una base de datos utilizando las credenciales de la aplicación,
    solamente puede efectuar los cambios que la aplicación permita.

    ## Conexión a una base de datos

    Se pueden establecer las conexiones sobre SSL para cifrar
    las comunicaciones cliente/servidor y aumentar la seguridad, o también emplear ssh
    para cifrar la conexión de red entre los clientes y el servidor de bases de datos.
    Si se utiliza algunas de estas opciones, será difícil para un posible atacante
    la monitorización del tráfico y la obtención de información de la base de datos.

    ## Modelo de almacenamiento cifrado

    SSL/SSH protege los datos que viajan desde el cliente al servidor: SSL/SSH
    no protege los datos persistentes almacenados en una base de datos. SSL es un
    protocolo que protege los datos mientras viajan por el cable.

    Una vez que un atacante obtiene acceso directo a una base de datos (eludiendo el
    servidor web), los datos sensibles almacenados podrían ser divulgados o mal utilizados, a menos que
    la información esté protegida por la base de datos misma. Cifrar los datos
    es una buena forma de mitigar esta amenaza, pero muy pocas bases de datos ofrecen este
    tipo de cifrado de datos.

    La forma más sencilla para evitar este problema es crear primero un paquete de
    cifrado propio y utilizarlo en los scripts de PHP. Hay muchas
    extensiones de PHP que pueden ser de ayuda para esto, tales como [OpenSSL](#book.openssl) y [Sodium](#book.sodium), cubriendo así una amplia variedad de algoritmos de
    cifrado. El script cifra los datos antes de insertarlos en la base de datos, y los
    descifra al obtenerlos. Véanse las referencias para ejemplos adicionales del
    funcionamiento del cifrado.

    ### 'Hashing'

    En caso de datos que deban estar realmente ocultos, si no fuera necesaria su representación real,
    (es decir, que no sean mostrados), quizás convenga utilizar algoritmos hash.
    El ejemplo más típico del uso del hash es a la hora de almacenar el hash criptográfico de una
    contraseña en una base de datos, en lugar de almacenar la contraseña en sí.

    Las funciones de [password](#ref.password)
    proporcionan una forma adecuada de utilizar hash con datos delicados y trabajar con estos hash.

    [password_hash()](#function.password-hash) se emplea para usar un hash con una cadena dada utilizando
    el algoritmo más fuerte actualmente disponible, mientras que [password_verify()](#function.password-verify)
    comprueba si la contraseña dada coincide con el hash almacenado en la base de datos.

    **Ejemplo #1 Campo de contraseña con hash**

&lt;?php

// Almacenar el hash de la contraseña
$query  = sprintf("INSERT INTO users(name,pwd) VALUES('%s','%s');",
            pg_escape_string($nombre_usuario),
password_hash($password, PASSWORD_DEFAULT));
$result = pg_query($connection, $query);

// Consultar si el usuario envió la contraseña correcta
$query = sprintf("SELECT pwd FROM users WHERE name='%s';",
                pg_escape_string($nombre_usuario));
$row = pg_fetch_assoc(pg_query($connection, $query));

if ($row &amp;&amp; password_verify($contraseña, $row['pwd'])) {
    echo 'Bienvenido, ' . htmlspecialchars($username) . '!';
} else {
echo 'La autenticación ha fallado para ' . htmlspecialchars($username) . '.';
}

?&gt;

## Inyección de SQL

La inyección SQL es una técnica en la que un atacante aprovecha fallas en el código de la aplicación encargado de construir consultas SQL dinámicas. El atacante puede obtener acceso a secciones privilegiadas de la aplicación, recuperar toda la información de la base de datos, manipular datos existentes o incluso ejecutar comandos peligrosos a nivel del sistema en el host de la base de datos. La vulnerabilidad ocurre cuando los desarrolladores concatenan o interpolan entrada arbitraria en sus declaraciones SQL.

    **Ejemplo #1
     Dividir el conjunto de resultados en páginas ... y crear superusuarios
     (PostgreSQL)
    **



     En el siguiente ejemplo, la entrada del usuario se interpola directamente en la consulta SQL, lo que permite al atacante obtener una cuenta de superusuario en la base de datos.

&lt;?php

$offset = $_GET['offset']; // ¡Cuidado, no hay validación en la entrada de datos!
$query = "SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET $offset;";
$result = pg_query($conn, $query);

?&gt;

Un usuario común hace clic en los enlaces 'siguiente' o 'atrás' donde el $índice
está codificado en el URL. El script espera que el $índice
entrante sea un número. Sin embargo, Qué sucede si alguien intenta ingresar al añadir lo siguiente a la URL?

0;
insert into pg_shadow(usename,usesysid,usesuper,usecatupd,passwd)
select 'crack', usesysid, 't','t','crack'
from pg_shadow where usename='postgres';
--

Si ocurriera, el script presentaría un acceso de superusuario al atacante.
Observe que 0; es para proveer un índcie válido a la
consulta original y así finalizarla.

**Nota**:

    Es una técnica común forzar al analizador SQL a ignorar el resto de la
    consulta escrita por el desarrollador con --, lo cual
    representa un comentario en SQL.

Una forma factible de obtener contraseñas es burlar las páginas de búsqueda de resultados.
Lo único que el atacante necesita hacer es ver si hay variables que hayan sido enviadas
y sean empleadas en sentencias SQL que no sean manejadas apropiadamente. Estos filtros se pueden establecer
comunmente en un formulario anterior para personalizar las cláusulas WHERE, ORDER BY,
LIMIT y OFFSET en las sentencias SELECT.
Si la base de datos admite el constructor UNION,
el atacante podría intentar anteponer una consulta entera a la consulta original para enumerar las
contraseñas de una tabla arbitraria. Se recomienda encarecidamente almacenar solo hashes seguros de contraseñas en lugar de las contraseñas mismas.

    **Ejemplo #2
     Enumerar artículos ... y algunas contraseñas (cualquier servidor de bases de datos)
    **

&lt;?php

$query  = "SELECT id, name, inserted, size FROM products
           WHERE size = '$size'";
$result = odbc_exec($conexión, $query);

?&gt;

La parte estática de la consulta se puede combinar con otra sentencia
SELECT la cual revelará todas las contraseñas:

'
union select '1', concat(uname||'-'||passwd) as name, '1971-01-01', '0' from usertable;
--

Las declaraciones UPDATE e INSERT también son susceptibles a este tipo de ataques.

    **Ejemplo #3
     Desde restablecer una contraseña ... hasta obtener más privilegios (cualquier servidor de bases de datos)
    **

&lt;?php
$query = "UPDATE usertable SET pwd='$pwd' WHERE uid='$uid';";
?&gt;

Si un usuario malicioso podría enviar el valor
' or uid like'%admin% a $uid para
cambiar la contraseña del administrador, o simplemente cambiar $pwd a
jejeje', trusted=100, admin='yes para obtener más
privilegios, entonces la consulta se tornaría:

&lt;?php

// $uid: ' or uid like '%admin%
$query = "UPDATE usertable SET pwd='...' WHERE uid='' or uid like '%admin%';";

// $pwd: jejeje', trusted=100, admin='yes
$query = "UPDATE usertable SET pwd='jejeje', trusted=100, admin='yes' WHERE
...;";

?&gt;

Aunque sigue siendo evidente que un atacante debe poseer al menos cierto conocimiento de la arquitectura de la base de datos para llevar a cabo un ataque exitoso, obtener esta información a menudo es muy simple. Por ejemplo, el código puede ser parte de un software de código abierto y estar disponible públicamente. Esta información también puede ser revelada por código fuente cerrado, incluso si está codificado, ofuscado o compilado, e incluso por tu propio código a través de la visualización de mensajes de error. Otros métodos incluyen el uso de nombres de tablas y columnas típicos. Por ejemplo, un formulario de inicio de sesión que utiliza una tabla 'users' con nombres de columnas 'id', 'username' y 'password'.

    **Ejemplo #4 Atacar el sistema operativo del host de la base de datos (MSSQL Server)**



     Un ejemplo alarmante de cómo los comandos a nivel del sistema operativo pueden ser accedidos en algunos hosts de bases de datos.

&lt;?php

$query  = "SELECT * FROM products WHERE id LIKE '%$prod%'";
$result = mssql_query($query);

?&gt;

Si un atacante envía el valor
a%' exec master..xp_cmdshell 'net user test testpass /ADD' --
a $prod, la $query será:

&lt;?php

$query  = "SELECT * FROM products
              WHERE id LIKE '%a%'
              exec master..xp_cmdshell 'net user test testpass /ADD' --%'";
$result = mssql_query($query);

?&gt;

El servidor MSSQL ejecuta la sentencia SQL en el lote incluyendo un comando
para añadir un usuario nuevo a la base de datos de cuentas local. Si esta aplicación
estaban siendo ejecutados como sa y el servicio MSSQLSERVER estaba
ejecutando con los privilegios suficientes, el atacante ahora podría tener una cuenta
con la cual acceder a esta máquina.

**Nota**:

    Algunos ejemplos anteriores están vinculados a un servidor de bases de datos específico, pero esto no significa que un ataque similar sea imposible contra otros productos. Tu servidor de bases de datos puede ser igualmente vulnerable de otra manera.










     ![Un ejemplo divertido de los problemas relacionados con la inyección SQL.](php-bigxhtml-data/images/fa7c5b5f326e3c4a6cc9db19e7edbaf0-xkcd-bobby-tables.png)



      Imagen cortesía de [» xkcd](http://xkcd.com/327)


### Técnicas de evitación

    La forma recomendada de evitar la inyección SQL es vincular todos los datos mediante declaraciones preparadas. Utilizar consultas parametrizadas no es suficiente para evitar por completo la inyección SQL, pero es la manera más fácil y segura de proporcionar datos a las declaraciones SQL. Todas las literales de datos dinámicos en las cláusulas WHERE, SET, y VALUES deben ser reemplazadas con marcadores de posición. Los datos reales se vincularán durante la ejecución y se enviarán por separado del comando SQL.




    La vinculación de parámetros solo puede utilizarse para datos. Otras partes dinámicas de la consulta SQL deben filtrarse contra una lista conocida de valores permitidos.







     **Ejemplo #5 Evitar la inyección SQL mediante el uso de declaraciones preparadas con PDO**




&lt;?php

// La parte dinámica del SQL se valida contra valores esperados
$sortingOrder = $_GET['sortingOrder'] === 'DESC' ? 'DESC' : 'ASC';
$productId = $_GET['productId'];
// El SQL se prepara con un marcador de posición
$stmt = $pdo-&gt;prepare("SELECT * FROM products WHERE id LIKE ? ORDER BY price {$sortingOrder}");
// El valor se proporciona con comodines LIKE
$stmt-&gt;execute(["%{$productId}%"]);

?&gt;

Las declaraciones preparadas son proporcionadas por [PDO](#pdo.prepared-statements), [MySQLi](#mysqli.quickstart.prepared-statements) y otras bibliotecas de bases de datos.

Los ataques de inyección SQL se basan principalmente en explotar código que no ha sido escrito teniendo en cuenta la seguridad. Nunca confíes en ninguna entrada, especialmente desde el lado del cliente, incluso si proviene de un cuadro de selección, un campo de entrada oculto o una cookie. El primer ejemplo muestra que una consulta tan simple puede causar desastres.

Una estrategia de defensa en profundidad implica varias buenas prácticas de codificación:

- Nunca te conectes a la base de datos como un superusuario o como el propietario de la base de datos. Utiliza siempre usuarios personalizados con privilegios mínimos.

- Verifica si la entrada proporcionada tiene el tipo de datos esperado. PHP tiene una amplia gama de funciones de validación de entrada, desde las más simples encontradas en [Funciones de Variables](#ref.var) y en [Funciones de Tipo de Carácter](#ref.ctype) (por ejemplo, [is_numeric()](#function.is-numeric), [ctype_digit()](#function.ctype-digit) respectivamente) hasta el soporte de [Expresiones Regulares Compatibles con Perl](#ref.pcre).

- Si la aplicación espera una entrada numérica, considera verificar los datos con [ctype_digit()](#function.ctype-digit), cambiar silenciosamente su tipo usando [settype()](#function.settype), o usar su representación numérica con [sprintf()](#function.sprintf).

- Si la capa de la base de datos no admite la vinculación de variables, entonces coloca comillas alrededor de cada valor proporcionado por el usuario que no sea numérico y que se pase a la base de datos con la función de escape de cadena específica de la base de datos (por ejemplo, [mysql_real_escape_string()](#function.mysql-real-escape-string), **sqlite_escape_string()**, etc.). Las funciones genéricas como [addslashes()](#function.addslashes) son útiles solo en un entorno muy específico (por ejemplo, MySQL en un conjunto de caracteres de un solo byte con NO_BACKSLASH_ESCAPES deshabilitado), así que es mejor evitarlas.

- No imprimas ninguna información específica de la base de datos, especialmente sobre el esquema, por las buenas o por las malas. Consulta también [Informes de Errores](#security.errors) y [Funciones de Manejo y Registro de Errores](#ref.errorfunc).

    Además, se puede beneficiar del registro de consultas, ya sea dentro de un script
    o mediante la base de datos en sí misma, si es que lo soporta. Obviamente, llevar un registro no
    previene los intentos dañinos, aunque puede ser útil para realizar un seguimiento de las
    aplicación que han sido eludidas. El registro no es útil por sí mismo sino
    por la información que contiene. Normalmente cuantos más detalles, mejor.

# Reportando errores

    Con la seguridad de PHP, hay dos formas para reportar errores. Una es
    en beneficio, para incrementar la seguridad, y la otra es para perjudicar.




    Una táctica estándar de ataque conlleva a perfilar un sistema; llenándolo
    de datos incorrectos, revisando los tipos y contextos de los errores
    que son devueltos. Esto le permite al atacante recolectar información
    acerca del servidor, para determinar posibles debilidades.
    Por ejemplo, si un atacante ha recogido información sobre una página
    basada en un envío previo, él podría intentar sobrescribir las variables,
    o modificarlas:



     **Ejemplo #1 Atacando variables con una página HTML personalizada**




&lt;form method="post" action="objetivodelataque?username=badfoo&amp;amp;password=badfoo"&gt;
&lt;input type="hidden" name="username" value="badfoo" /&gt;
&lt;input type="hidden" name="password" value="badfoo" /&gt;
&lt;/form&gt;

    Los errores de PHP que normalmente son devueltos, pueden ser muy útiles para
    el desarrollador que está intentando depurar un script, indicando qué cosas,
    como por ejemplo, qué función o qué fichero de PHP falló, y el número de línea en donde
    la falla ocurrió. Toda esta es la información que puede ser explotada.
    Esto no es algo raro para un desarrollador de PHP que utilice las funciones
    [show_source()](#function.show-source), [highlight_string()](#function.highlight-string), o
    [highlight_file()](#function.highlight-file) como una medida de depuración, pero en
    un sitio en escena, esto puede exponer variables ocultas, sintáxis sin revisar,
    y otra información peligrosa. Es especialmente peligroso el código en ejecución
    de fuentes conocidas con manejadores de depuración incluidos, o utilizar
    técnicas comunes de depuración. Si los atacantes pueden determinar qué técnica en
    general usted está utilizando, ellos podrían tratar de usar fuerza bruta en una página,
    enviando varias cadenas comunes de depuración:



     **Ejemplo #2 Explotando variables comunes de depuración**




&lt;form method="post" action="objetivodelataque?errors=Y&amp;amp;showerrors=1&amp;amp;debug=1"&gt;
&lt;input type="hidden" name="errors" value="Y" /&gt;
&lt;input type="hidden" name="showerrors" value="1" /&gt;
&lt;input type="hidden" name="debug" value="1" /&gt;
&lt;/form&gt;

    Sin importar el método de manejo de errores, la capacidad de probar
    errores en un sistema conlleva a proveer a un atacante con mas
    información.




    Por ejemplo, el estilo común de un error genérico de PHP indica que un sistema
    ciertamente está ejecutando PHP. Si un atacante está en una página .html, y quiere
    probar qué motor hay tras de ese servidor (para buscar debilidades en el sistema),
    lo alimenta con datos erróneos que lo podrían habilitar a que determine
    que ese sistema fue construido con PHP.




    El error de una función puede indicar ya sea, un sistema que puede estar
    ejecutando un motor específico de base de datos, o dar las pistas de cómo una página web
    puede estar programada o diseñada. Esto permite una investigación más profunda dentro
    de los puertos abiertos de la base de datos, o buscar errores específicos o debilidades
    en una página web. Pasando diferentes porciones de datos erróneos, por ejemplo,
    un atacante puede determinar el orden de autenticación en un script,
    (por medio del número de línea de los errores) como también probar exploits
    que pueden ser utilizados en diferentes ubicaciones del script.




    Un error del sistema de archivos o un error general de PHP puede indicar qué permisos
    tiene el servidor web, así también la estructura y organización de
    ficheros en el servidor web. El código de error escrito por el desarrollador puede agravar
    este problema, conllevando a la explotación fácil de la, hasta entonces,
    información "oculta".




    Hay tres grandes soluciones a este problema. La primera consiste en
    examinar todas las funciones, e intentar arreglar la mayoría
    de los errores. La segunda es deshabilitar completamente la notificación de errores
    de el código en ejecución. La tercera es utilizar las funciones de manejo de error
    propias de PHP para crear su propio manejador de errores. Dependiendo
    de su política de seguridad, puede ser que encuentre que las tres sean aplicables
    a su situación.




    Una forma de detectar este problema por adelantado es hacer uso de
    la función propia de PHP [error_reporting()](#function.error-reporting), para ayudarle a
    asegurar su código y encontrar el uso de variables que podrían ser peligrosas.
    Al probar su código, antes de distribuirlo, con **[E_ALL](#constant.e-all)**,
    usted puede encontrar rapidamente áreas donde sus variables pueden ser abiertas para envenenamiento
    o modificación en otras maneras. Una vez usted está listo para distribuirlo,
    debería deshabilitar completamente el reporte de errores poniendo el valor de
    [error_reporting()](#function.error-reporting) a 0, o apagar el visor de errores
    utilizando la  opción display_errors del fichero php.ini
    para aislar su código de ataques. Si decide hacer esto último,
    también debería definir la ruta de acceso a su archivo de registros utilizando
    la directiva error_log, y poner
    log_errors en "on".



     **Ejemplo #3 Buscando variables peligrosas con E_ALL**




&lt;?php
if ($username) {  // No se ha inicializado o revisado antes de utilizar
    $good_login = 1;
}
if ($good_login == 1) { // Si la prueba anterior falla, los que no estén inicializados o comprobados antes de utilizar, tendrán acceso
readfile("/ruta/hacia/datos/altamente/sensibles/index.html");
}
?&gt;

# Datos Enviados por el Usuario

Las mayores debilidades de muchos programas PHP no son inherentes al
lenguaje mismo, sino simplemente un problema generado cuando se escribe
código sin pensar en la seguridad. Por esta razón, usted debería tomarse
siempre el tiempo para considerar las implicaciones de cada pedazo de
código, para averiguar el posible peligro involucrado cuando una variable
inesperada es enviada.

**Ejemplo #1 Uso Peligroso de Variables**

&lt;?php
// eliminar un archivo del directorio personal del usuario .. ¿o
// quizás de alguien más?

unlink ($evil_var);

// Imprimir el registro del acceso... ¿o quizás una entrada de /etc/passwd?
fwrite ($fp, $evil_var);

// Ejecutar algo trivial.. ¿o rm -rf \*?
system ($evil_var);
exec ($evil_var);

?&gt;

Usted debería examinar siempre, y cuidadosamente su código para asegurarse
de que cualquier variable siendo enviada desde un navegador web sea
chequeada apropiadamente, y preguntarse a sí mismo:

- ¿Este script afectará únicamente los archivos que se pretende?

- ¿Puede tomarse acción sobre datos inusuales o indeseados?

- ¿Puede ser usado este script en formas malintencionadas?

- ¿Puede ser usado en conjunto con otros scripts en forma negativa?

- ¿Serán adecuadamente registradas las transacciones?

Al preguntarse adecuadamente estas preguntas mientras escribe su script,
en lugar de hacerlo posteriormente, usted previene una desafortunada
re-implementación del programa cuando desee incrementar el nivel de
seguridad. Al comenzar con esta mentalidad, no garantizará la seguridad de
su sistema, pero puede ayudar a mejorarla.

Mejore la seguridad deshabilitando las configuraciones de conveniencia que
oscurecen el origen, la validez o la integridad de los datos de entrada.
La creación implícita de variables y la entrada no verificada pueden llevar a
vulnerabilidades como ataques de inyección y manipulación de datos.

Características como register_globals y
magic_quotes (ambas eliminadas en PHP 5.4.0) contribuyeron
a estos riesgos al crear automáticamente variables a partir de la entrada del
usuario y escapar datos de manera inconsistente. Aunque ya no están en PHP,
riesgos similares persisten si la gestión de la entrada es incorrecta.

Habilite [error_reporting(E_ALL)](#function.error-reporting) para
ayudar a detectar variables no inicializadas y validar la entrada. Utilice
tipos estrictos ([declare(strict_types=1)](#language.types.declarations.strict),
introducido en PHP 7) para imponer la seguridad de tipos, prevenir conversiones
de tipos no intencionadas y mejorar la seguridad general.

# Ocultar PHP

En general, la seguridad por ocultación es una de las formas más débiles de seguridad.
Aunque en algunos casos, es aconsejable cada pequeño elemento extra de seguridad.

Unas cuantas técnicas simples pueden ayudar a ocultar PHP, posiblemente retrasando
a un atacante que esté tratando de descubrir debilidades en el
sistema. Al establecer expose_php a off en el
fichero php.ini, se reduce la cantidad de información disponible.

Otra táctica es configurar servidores web como Apache para
interpretar diferentes tipos de ficheros por medio de PHP, ya sea con una directiva
de .htaccess o en el propio fichero de configuración de Apache. Así se pueden
utilizar extensiones de ficheros engañosas:

**Ejemplo #1 Ocultando PHP como si fuera otro lenguaje**

# Hacer que el código de PHP parezca otro tipo de código

AddType application/x-httpd-php .asp .py .pl

U ocultarlo completamente:

**Ejemplo #2 Utilizar tipos desconocidos para extensiones de PHP**

# Hacer que el código de PHP parezca de tipo desconocido

AddType application/x-httpd-php .bop .foo .133t

U ocultarlo como código HTML, lo cual tiene un pequeño impacto de rendimiento debido
a que todos los ficheros HTML serán procesados por el motor de PHP:

**Ejemplo #3 Utilizar tipos HTML para extensiones de PHP**

# Hacer que el código de PHP parezca HTML

AddType application/x-httpd-php .htm .html

Para que esto funcione eficazmente, se debe cambiar el nombre de los ficheros PHP con
las extensiones de arriba. Si bien es una forma de seguridad por
ocultamiento, es una medida preventiva menor con pocos inconvenientes.

# Mantenerse al día

PHP, como cualquier otro sistema de tamaño considerable, está bajo constante escrutinio
y mejoramiento. Cada nueva versión incluye con frecuencia cambios mayores y
menores para mejorar la seguridad y reparar cualquier fallo, problemas de
configuración, y otros asuntos que puedan afectar la seguridad y estabilidad
global del sistema.

Como cualquier lenguaje y programa de script a nivel de sistema, la mejor
estrategia es actualizar con frecuencia y mantenerse alerta sobre las últimas
versiones y sus cambios.

- [Introducción](#security.intro)
- [Consideraciones generales](#security.general)
- [Instalado como CGI binario](#security.cgi-bin)<li>[Ataques posibles](#security.cgi-bin.attacks)
- [Caso 1: Ficheros públicos servidos solamente](#security.cgi-bin.default)
- [Caso 2: utilizando cgi.force_redirect](#security.cgi-bin.force-redirect)
- [Caso 3: Configurando doc_root o user_dir](#security.cgi-bin.doc-root)
- [Caso 4: El analizador de PHP fuera del árbol de la web](#security.cgi-bin.shell)
  </li>- [Instalado como módulo de Apache](#security.apache)
- [Seguridad de una Sesión](#security.sessions)
- [Seguridad del Sistema de Archivos](#security.filesystem)<li>[Cuestiones relacionadas a bytes nulos](#security.filesystem.nullbytes)
  </li>- [Seguridad en bases de datos](#security.database)<li>[Diseño de bases de datos](#security.database.design)
- [Conexión a una base de datos](#security.database.connection)
- [Modelo de almacenamiento cifrado](#security.database.storage)
- [Inyección de SQL](#security.database.sql-injection)
  </li>- [Reportando errores](#security.errors)
- [Datos Enviados por el Usuario](#security.variables)
- [Ocultar PHP](#security.hiding)
- [Mantenerse al día](#security.current)
