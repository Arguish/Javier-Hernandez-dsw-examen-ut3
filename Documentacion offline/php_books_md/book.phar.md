# Phar

# Introducción

La extensión phar proporciona un medio para empaquetar una aplicación PHP completa en un único archivo
llamado "phar" (PHP Archive) para facilitar la instalación y configuración.
Además de este servicio, la extensión también proporciona una clase de abstracción de formato de archivo
para crear y manipular archivos tar y zip a través de la clase
[PharData](#class.phardata), de manera similar a como
PDO proporciona una interfaz unificada para acceder a diferentes bases de datos. Sin embargo, a diferencia de PDO,
que no puede transferir datos entre bases de datos, Phar tiene la capacidad de convertir archivos tar,
zip y phar con una sola línea de código. Consulte
[Phar::convertToExecutable()](#phar.converttoexecutable) para obtener un ejemplo.

¿Qué es phar? Las archivos phar son en realidad un medio práctico para agrupar
varios archivos en uno solo. Así, un archivo phar permite distribuir una
aplicación PHP completa en un único archivo y ejecutarla desde este archivo
sin necesidad de extraerlo en el disco. Además, los archivos phar pueden ser ejecutados
por PHP tan fácilmente como cualquier otro archivo, tanto desde la línea de comandos como a través
de un servidor web. Phar es una especie de memoria USB para aplicaciones PHP.

Phar implementa esta funcionalidad mediante [un
flujo](#book.stream). Normalmente, para utilizar un archivo externo desde un script PHP, se
debe utilizar la función [include](#function.include):

    **Ejemplo #1 Utilizar un archivo externo**



     &lt;?php

include '/ruta/al/archivo/externo.php';
?&gt;

Puede considerarse que PHP convierte en realidad
/ruta/al/archivo/externo.php en un
flujo file:///ruta/al/archivo/externo.php, y que
utiliza de forma oculta las funciones de flujo de archivos planos para acceder
a archivos locales.

Para utilizar un archivo llamado archivo.php contenido en un archivo phar
/ruta/al/miphar.phar,
la sintaxis es casi similar a la sintaxis file:// anterior.

    **Ejemplo #2 Utilizar un archivo contenido en un archivo phar**



     &lt;?php

include 'phar:///ruta/al/miphar.phar/archivo.php';
?&gt;

En realidad, un archivo phar puede tratarse como si fuera un disco externo, utilizando
cualquiera de las funciones relacionadas con [fopen()](#function.fopen), [opendir()](#function.opendir) y
[mkdir()](#function.mkdir) para leer, modificar o crear nuevos archivos o directorios dentro del
archivo phar. Esto permite que aplicaciones PHP completas sean distribuidas en un único archivo
y ejecutadas desde él.

El uso más común de un archivo phar es distribuir una aplicación completa
en un único archivo. Por ejemplo, el instalador PEAR que se incluye con las versiones de PHP
se distribuye mediante un archivo phar. Para utilizar el archivo phar distribuido de esta manera, este
puede ser ejecutado mediante la línea de comandos o a través de un navegador web.

Los archivos phar pueden distribuirse en formato tar,
zip o en el formato phar especialmente diseñado
para la extensión phar. Cada formato de archivo tiene sus ventajas e inconvenientes. Los archivos
zip y tar pueden ser extraídos por cualquier herramienta de terceros que pueda leer el formato, pero
requieren la extensión phar para ser ejecutados por PHP. El formato de archivo phar es único y dedicado
a la extensión phar y solo puede ser creado por esta o por el paquete PEAR
[» PHP_Archive](https://pear.php.net/package/PHP_Archive), pero tiene la ventaja de no
requerir la instalación de la extensión phar para que la aplicación empaquetada pueda ser ejecutada.

En otras palabras, incluso con la extensión phar desactivada, es posible ejecutar o incluir
un archivo basado en phar. Acceder a archivos individuales dentro de un archivo phar solo es
posible con la extensión phar a menos que el archivo phar haya sido creado por PHP_Archive.

La extensión phar también es capaz de convertir un archivo phar desde un tar hacia un archivo zip
o phar con un solo comando:

    **Ejemplo #3 Convertir un archivo phar al formato tar**



     &lt;?php

$phar = new Phar('miphar.phar');
$pgz = $phar-&gt;convertToExecutable(Phar::TAR, Phar::GZ); // produce miphar.phar.tar.gz
?&gt;

Phar puede comprimir archivos individuales o un archivo completo
utilizando la compresión [gzip](#book.zlib) o
[bzip2](#book.bzip2), y puede verificar la integridad del archivo
automáticamente utilizando funciones de firma MD5, SHA-1, SHA-256 o SHA-512.

Finalmente, la extensión phar está orientada a la seguridad, desactiva por defecto los accesos
de escritura en archivos phar ejecutables y requiere la desactivación a nivel de sistema
del parámetro phar.readonly del php.ini para crear o modificar archivos phar.
Los archivos tar y zip sin el marcador ejecutable pueden ser siempre creados o modificados
utilizando la clase [PharData](#class.phardata).

Si se crean aplicaciones con el propósito de distribuirlas, se debe leer
[Cómo crear archivos Phar](#phar.creating). Si se desea
más información sobre las diferencias entre los formatos de archivo que phar soporta,
se debe leer [Phar, Tar y Zip](#phar.fileformat).

Si se utilizan aplicaciones phar, hay trucos muy útiles en
[Cómo utilizar archivos Phar](#phar.using).

La palabra phar es la contracción de PHP y de
Archive y está fuertemente inspirada
en la palabra jar (Java Archive) familiar a los desarrolladores Java.

La implementación de los archivos Phar se basa en el paquete PEAR
[» PHP_Archive](https://pear.php.net/package/PHP_Archive), y
los detalles de implementación son los mismos, aunque la extensión Phar
es más potente. Además, esta permite que la mayoría de las aplicaciones
PHP sean ejecutadas sin modificación mientras que los archivos basados en PHP_Archive
requieren a menudo muchas modificaciones para funcionar.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#phar.requirements)
- [Instalación](#phar.installation)
- [Configuración en tiempo de ejecución](#phar.configuration)
- [Tipos de recursos](#phar.resources)

    ## Requerimientos

    Puede ser deseable activar las extensiones [zlib](#book.zlib)
    y [bzip2](#book.bzip2) para aprovechar el soporte
    de archivos phar comprimidos. Asimismo, para utilizar las firmas OpenSSL, la extensión
    [OpenSSL](#book.openssl) debe ser activada.

    Si [zend.multibyte](#ini.zend.multibyte) está activado,
    [zend.detect_unicode](#ini.zend.detect-unicode) también debe estar activado.

## Instalación

La extensión Phar está integrada en PHP y activada por omisión.
Para desactivar el soporte de Phar, se utiliza la opción de configuración
**--disable-phar**.

Phar también puede ser instalado
desde la extensión PECL para versiones anteriores de PHP, la
[» página PECL de Phar](https://pecl.php.net/package/phar) contiene más
información y el registro de cambios.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de Configuración de Flujos y Sistema de Ficheros**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [phar.readonly](#ini.phar.readonly)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [phar.require_hash](#ini.phar.require-hash)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [phar.cache_list](#ini.phar.cache-list)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     phar.readonly
     [bool](#language.types.boolean)



      Esta opción deshabilita la modificación o creación de archivos Phar
      usando el flujo phar o el soporte para escritura de
      objetos [Phar](#class.phar). Este ajuste debería estar siempre activado en
      máquinas de producción, ya que el soporte para escritura conveniente de la extensión phar
      podría permitir la simple creación de un virus basado en PHP al asociarse
      con otras vulnerabilidades de seguridad comunes.



     **Nota**:



       Este ajuste sólo puede ser desactivado en php.ini por motivos de seguridad.
       Si phar.readonly está deshabilitado en php.ini, un
       usuario puede habilitar phar.readonly en un script
       o deshabilitarlo después. Si phar.readonly está
       habilitado en php.ini, un scrip puede "re-habilitar" inofensivamente
       la variable INI, pero no puede deshabilitarla.









     phar.require_hash
     [bool](#language.types.boolean)



      Esta opción forzará a todos los archivos Phar abiertos a que contengan algún
      tipo de signatura (actualmente está soportadas MD5, SHA1, SHA256 y SHA512), y
      rehusará procesar cualquer archivo Phar que no contenga una signatura.



     **Nota**:



       Este ajuste sólo puede ser desactivado en php.ini por motivos de seguridad.
       Si phar.require_hash está deshabilitado en php.ini, un
       usuario puede habilitar phar.require_hash en un script
       o deshabilitarlo después. Si phar.require_hash está
       habilitado en php.ini, un scrip puede "re-habilitar" inofensivamente
       la variable INI, pero no puede deshabilitarla.




       Este ajuste no afecta a la lectura de ficheros tar planos con la
       clase [PharData](#class.phardata).




     **Precaución**

       phar.require_hash no proporciona ninguna seguridad per se,
       es simplemente una medida contra la ejecución accidental de archivos Phar corruptos,
       porque cualquiera que pueda alterar el Phar podría corregir fácilmente la firma.









     phar.cache_list
     [string](#language.types.string)



      Permite mapear archivos phar para que sean preanalizados en el arranque del servidor web,
      proporcionando una mejora de rendimiento que saca ficheros en ejecución de un
      archivo phar casi tan rápido como si esos ficheros se ejecutaran desde una
      instalación tradicional basada en disco.



       **Ejemplo #1 Ejemplo de uso de phar.cache_list**




en php.ini (windows):
phar.cache_list =C:\ruta\a\phar1.phar;C:\ruta\a\phar2.phar
en php.ini (unix):
phar.cache_list =/ruta/a/phar1.phar:/ruta/a/phar2.phar

## Tipos de recursos

La extensión Phar proporciona el flujo phar, que permite el acceso de forma
transparente a los ficheros contenidos en un phar. Para más información,
consulte [el formato de archivo Phar](#phar.fileformat)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

   <caption>**Las constantes de compresión Phar**</caption>
   
    
     
      Constante
      Valor
      Descripción


       **[Phar::NONE](#phar.constants.none)**
       ([int](#language.types.integer))

      0x00000000
      ninguna compresión




       **[Phar::COMPRESSED](#phar.constants.compressed)**
       ([int](#language.types.integer))

      0x0000F000
      máscara de bits que puede ser utilizada con los flags de fichero para determinar si se utiliza una compresión




       **[Phar::GZ](#phar.constants.gz)**
       ([int](#language.types.integer))

      0x00001000
      compresión zlib (gzip)




       **[Phar::BZ2](#phar.constants.bz2)**
       ([int](#language.types.integer))

      0x00002000
      compresión bzip2


   <caption>**Las constantes de formato de fichero Phar**</caption>
   
    
     
      Constante
      Valor
      Descripción


       **[Phar::PHAR](#phar.constants.phar)**
       ([int](#language.types.integer))

      1
      formato de fichero phar




       **[Phar::TAR](#phar.constants.tar)**
       ([int](#language.types.integer))

      2
      formato de fichero tar




       **[Phar::ZIP](#phar.constants.zip)**
       ([int](#language.types.integer))

      3
      formato de fichero zip


   <caption>**Las constantes de firma Phar**</caption>
   
    
     
      Constante
      Valor
      Descripción


       **[Phar::MD5](#phar.constants.md5)**
       ([int](#language.types.integer))

      0x0001
      firma con el algoritmo md5




       **[Phar::SHA1](#phar.constants.sha1)**
       ([int](#language.types.integer))

      0x0002
      firma con el algoritmo sha1




       **[Phar::SHA256](#phar.constants.sha256)**
       ([int](#language.types.integer))

      0x0003
      firma con el algoritmo sha256 (requiere la extensión hash)




       **[Phar::SHA512](#phar.constants.sha512)**
       ([int](#language.types.integer))

      0x0004
      firma con el algoritmo sha512 (requiere la extensión hash)




       **[Phar::OPENSSL](#phar.constants.openssl)**
       ([int](#language.types.integer))

      0x0010
      firma con un par de claves privada/pública OpenSSL. Es una verdadera
      firma de clave asimétrica




       **[Phar::OPENSSL_SHA256](#phar.constants.openssl-sha256)**
       ([int](#language.types.integer))

       
       




       **[Phar::OPENSSL_SHA512](#phar.constants.openssl-sha512)**
       ([int](#language.types.integer))

       
       


   <caption>**Las constantes de sobrescritura de mime Phar webPhar**</caption>
   
    
     
      Constante
      Valor
      Descripción


       **[Phar::PHP](#phar.constants.php)**
       ([int](#language.types.integer))

      0
      utilizada para especificar el argumento de sobrescritura mime
      de [Phar::webPhar()](#phar.webphar) y hacer que la extensión
      sea analizada como un fichero PHP




       **[Phar::PHPS](#phar.constants.phps)**
       ([int](#language.types.integer))

      1
      utilizada para especificar el argumento de sobrescritura mime
      de [Phar::webPhar()](#phar.webphar) y hacer que la extensión
      sea analizada como un fichero PHP mediante [highlight_file()](#function.highlight-file)


# Utilizar los archivos Phar

## Tabla de contenidos

- [Utilizar los archivos Phar : Introducción](#phar.using.intro)
- [Utilizar los archivos Phar : el flujo phar](#phar.using.stream)
- [Utilizar los archivos Phar : las clases Phar y PharData](#phar.using.object)

## Utilizar los archivos Phar : Introducción

Los archivos Phar son idénticos en concepto a los archivos JAR
de Java, pero están diseñados específicamente para las necesidades y
la flexibilidad de las aplicaciones PHP. Un archivo Phar se utiliza
para distribuir una aplicación PHP completa o una biblioteca
en forma de un único archivo.
Una aplicación en forma de archivo Phar se utiliza exactamente de
la misma forma que cualquier otra aplicación PHP:

php aplicacionesympa.phar

El uso de una biblioteca en forma de archivo Phar es el mismo que cualquier otra biblioteca PHP:

&lt;?php
include 'bibliothequesympa.phar';
?&gt;

El flujo phar proporciona el núcleo de la extensión phar, y
es descrito en detalle [aquí](#phar.using.stream).
El flujo phar permite el acceso a los ficheros contenidos en un archivo phar mediante las
funciones estándar de ficheros [fopen()](#function.fopen), [opendir()](#function.opendir), y
cualquier otra que funcione con ficheros normales. El flujo phar soporta todas
las operaciones de lectura/escritura tanto en ficheros como en directorios.

&lt;?php
include 'phar://bibliothequesympa.phar/fichero/interne.php';
header('Content-type: image/jpeg');
// los phars pueden ser alcanzados mediante la ruta completa o mediante alias
echo file_get_contents('phar:///ruta/completa/hacia/bibliothequesympa.phar/images/wow.jpg');
?&gt;

La clase [Phar](#class.phar) implementa funcionalidades
avanzadas para acceder a los ficheros y crear archivos phar. La
clase Phar es descrita en detalle [aquí](#phar.using.object).

&lt;?php
try {
// abre un phar existente
$p = new Phar('bibliothequesympa.phar', 0);
    // Phar extiende la clase DirectoryIterator de SPL
    foreach (new RecursiveIteratorIterator($p) as $file) {
        // $file es una clase PharFileInfo y heredada de SplFileInfo
        echo $file-&gt;getFileName() . "\n";
        echo file_get_contents($file-&gt;getPathName()) . "\n"; // muestra el contenido;
}
if (isset($p['fichero/interne.php'])) {
        var_dump($p['fichero/interne.php']-&gt;getMetadata());
}

    // crea un nuevo phar - phar.readonly debe ser 0 en php.ini
    // phar.readonly está activado por omisión por razones de seguridad.
    // En servidores de producción, los Phars no necesitan ser creados,
    // solo ejecutados.
    if (Phar::canWrite()) {
        $p = new Phar('nuevophar.tar.phar', 0, 'nuevophar.tar.phar');
        // Se crea un archivo Phar basado en tar, comprimido por gzip (.tar.gz)
        $p = $p-&gt;convertToExecutable(Phar::TAR, Phar::GZ);

        // crea una transacción - nada se escribe en nuevophar.phar
        // hasta que stopBuffering() sea llamado, aunque se requiere almacenamiento temporal
        $p-&gt;startBuffering();
        // añade todos los ficheros de /ruta/hacia/elproyecto en el phar con el prefijo "proyecto"
        $p-&gt;buildFromIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/ruta/hacia/elproyecto')), '/ruta/hacia/');

        // añade un nuevo fichero utilizando la API de acceso por array
        $p['fichero1.txt'] = 'Información';
        $fp = fopen('grosfichero.dat', 'rb');
        // copia todos los datos del flujo
        $p['data/grosfichero.dat'] = $fp;

        if (Phar::canCompress(Phar::GZ)) {
            $p['data/grosfichero.dat']-&gt;compress(Phar::GZ);
        }

        $p['images/wow.jpg'] = file_get_contents('images/wow.jpg');
        // cualquier valor puede ser guardado como metadatos específicos del fichero
        $p['images/wow.jpg']-&gt;setMetadata(array('mime-type' =&gt; 'image/jpeg'));
        $p['index.php'] = file_get_contents('index.php');
        $p-&gt;setMetadata(array('bootstrap' =&gt; 'index.php'));

        // guarda el archivo phar en el disco
        $p-&gt;stopBuffering();
    }

} catch (Exception $e) {
echo 'No ha podido abrir el Phar: ', $e;
}
?&gt;

Por otro lado, la verificación del contenido del archivo phar puede realizarse utilizando uno de
los algoritmos de firma simétrica (MD5, SHA1, SHA256 y SHA512 si ext/hash está activada) y
utilizando la firma asimétrica por clave pública/privada de OpenSSL.
Para aprovechar la firma OpenSSL, debe generarse un par de claves pública/privada y
utilizar la clave privada para firmar con [Phar::setSignatureAlgorithm()](#phar.setsignaturealgorithm). Además, la
clave pública, extraída utilizando este código:

&lt;?php
$public = openssl_get_publickey(file_get_contents('private.pem'));
$pkey = '';
openssl_pkey_export($public, $pkey);
?&gt;

debe ser guardada por separado del archivo phar que verifica. Si el archivo phar es guardado
como /ruta/hacia/mon.phar, la clave pública debe ser guardada como
/ruta/hacia/mon.phar.pubkey, de lo contrario phar no será capaz de verificar
la firma OpenSSL.

La clase [Phar](#class.phar) también proporciona tres métodos estáticos, [Phar::webPhar()](#phar.webphar),
[Phar::mungServer()](#phar.mungserver) y [Phar::interceptFileFuncs()](#phar.interceptfilefuncs) que son cruciales
para empaquetar aplicaciones PHP destinadas a ser utilizadas en un sistema de ficheros clásico o como aplicación web.
[Phar::webPhar()](#phar.webphar) implementa un controlador que enruta las llamadas HTTP al lugar correcto del archivo phar.
[Phar::mungServer()](#phar.mungserver) se utiliza para modificar los valores del array [$\_SERVER](#reserved.variables.server) para
indicar a las aplicaciones que utilicen estos valores. [Phar::interceptFileFuncs()](#phar.interceptfilefuncs) indica a Phar que intercepte las llamadas a
[fopen()](#function.fopen), [file_get_contents()](#function.file-get-contents), [opendir()](#function.opendir), y
a todas las funciones basadas en stat ([file_exists()](#function.file-exists), [is_readable()](#function.is-readable), etc) y
enruta todos los caminos relativos a los lugares correctos del archivo phar.

Por ejemplo, empaquetar una versión de la famosa aplicación phpMyAdmin en un archivo phar requiere
simplemente este script y, a partir de entonces, phpMyAdmin.phar.tar.php puede ser accedido como un fichero
clásico desde su servidor web, después de haber modificado la pareja usuario/contraseña:

    &lt;?php

@unlink('phpMyAdmin.phar.tar.php');
copy('phpMyAdmin-2.11.3-english.tar.gz', 'phpMyAdmin.phar.tar.php');
$a = new Phar('phpMyAdmin.phar.tar.php');
$a-&gt;startBuffering();
$a["phpMyAdmin-2.11.3-english/config.inc.php"] = '&lt;?php
/* Servers configuration */
$i = 0;

/_ Server localhost (config:root) [1] _/
$i++;
$cfg[\'Servers\'][$i][\'host\'] = \'localhost\';
$cfg[\'Servers\'][$i][\'extension\'] = \'mysqli\';
$cfg[\'Servers\'][$i][\'connect_type\'] = \'tcp\';
$cfg[\'Servers\'][$i][\'compress\'] = false;
$cfg[\'Servers\'][$i][\'auth_type\'] = \'config\';
$cfg[\'Servers\'][$i][\'user\'] = \'root\';
$cfg[\'Servers\'][$i][\'password\'] = \'\';

/_ End of servers configuration _/
if (strpos(PHP_OS, \'WIN\') !== false) {
$cfg[\'UploadDir\'] = getcwd();
} else {
    $cfg[\'UploadDir\'] = \'/tmp/pharphpmyadmin\';
    @mkdir(\'/tmp/pharphpmyadmin\');
    @chmod(\'/tmp/pharphpmyadmin\', 0777);
}';
$a-&gt;setStub('&lt;?php
Phar::interceptFileFuncs();
Phar::webPhar("phpMyAdmin.phar", "phpMyAdmin-2.11.3-english/index.php");
echo "phpMyAdmin está destinado a ser ejecutado desde un navegador web\n";
exit -1;
\_\_HALT_COMPILER();
');
$a-&gt;stopBuffering();
?&gt;

## Utilizar los archivos Phar : el flujo phar

El flujo Phar soporta totalmente [fopen()](#function.fopen) para las
lecturas/escrituras (no las concatenaciones), [unlink()](#function.unlink), [stat()](#function.stat),
[fstat()](#function.fstat), [fseek()](#function.fseek), [rename()](#function.rename),
y las operaciones de flujo sobre los directorios [opendir()](#function.opendir), y [rmdir()](#function.rmdir)
y [mkdir()](#function.mkdir).

La compresión y los metadatos individuales por fichero pueden también ser manipulados
dentro del archivo Phar utilizando los contextos de flujo:

&lt;?php
$context = stream_context_create(array('phar' =&gt;
array('compress' =&gt; Phar::GZ)),
array('metadata' =&gt; array('user' =&gt; 'cellog')));
file_put_contents('phar://mon.phar/unfichero.php', 0, $context);
?&gt;

El flujo phar no actúa sobre los ficheros remotos y no puede
considerar los ficheros remotos, etc... incluso si las opciones INI
[allow_url_fopen](#ini.allow-url-fopen) y
[allow_url_include](#ini.allow-url-include) están
desactivadas.

Aunque es posible crear archivos phar desde cero utilizando solo las
operaciones sobre los flujos, es preferible utilizar la funcionalidad incluida en
la clase Phar. El flujo es mejor utilizado para las operaciones de lectura.

## Utilizar los archivos Phar : las clases Phar y PharData

La clase [Phar](#class.phar) soporta la lectura y la manipulación de los
archivos Phar, así como la iteración a través de la funcionalidad heredada de la clase
[RecursiveDirectoryIterator](#class.recursivedirectoryiterator).
Con el soporte de la interfaz [ArrayAccess](#class.arrayaccess),
los ficheros contenidos en un archivo Phar pueden ser accedidos
como si fueran miembros de un array asociativo.

La clase [PharData](#class.phardata) extiende la clase [Phar](#class.phar), y
permite la creación y modificación de archivos tar y zip no ejecutables (datos) incluso si
phar.readonly=1 en php.ini. Por lo tanto,
[PharData::setAlias()](#phardata.setalias) y [PharData::setStub()](#phardata.setstub)
están ambas desactivadas ya que los conceptos de alias y contenedor están restringidos a
los archivos phar ejecutables.

Es importante señalar que cuando un archivo Phar es creado, la ruta completa
debe ser pasada al constructor del objeto [Phar](#class.phar).
Una ruta relativa impediría la inicialización.

Suponiendo que $p es un objeto inicializado de esta forma:

&lt;?php
$p = new Phar('/ruta/hacia/monphar.phar', 0, 'monphar.phar');
?&gt;

Un archivo Phar vacío será creado como /ruta/hacia/monphar.phar,
o si /ruta/hacia/monphar.phar ya existe, será abierto
de nuevo. El término monphar.phar demuestra el concepto de un alias
que puede ser utilizado para referenciar /ruta/hacia/monphar.phar en URLs como esto:

&lt;?php
// estas dos llamadas a file_get_contents() son equivalentes si
// /ruta/hacia/monphar.phar tiene un alias explícito de "monphar.phar"
// en su manifiesto, o si el phar fue inicializado con la instanciación de
// el objeto Phar del ejemplo anterior
$f = file_get_contents('phar:///ruta/hacia/monphar.phar/algo.txt');
$f = file_get_contents('phar://monphar.phar/algo.txt');
?&gt;

Con el objeto [Phar](#class.phar) $p recién creado,
las siguientes cosas son posibles:

- $a = $p['fichero.php'] crea una [PharFileInfo](#class.pharfileinfo)
  que se refiere al contenido de phar://monphar.phar/fichero.php

- $p['fichero.php'] = $v crea un nuevo fichero
     (phar://monphar.phar/fichero.php), o sobrescribe
     un fichero existente dentro de monphar.phar.  $v
     puede ser una cadena o un puntero a un fichero abierto, en cuyo caso
     el contenido del fichero será utilizado para crear el nuevo fichero. Tenga en cuenta que
     $p-&gt;addFromString('fichero.php', $v) es equivalente en términos de
     funcionalidad al caso anterior. También es posible añadir el contenido de un fichero
     con $p-&gt;addFile('/ruta/hacia/fichero.php', 'fichero.php').
     Finalmente, un directorio vacío puede ser creado con
     $p-&gt;addEmptyDir('vacío').

- isset($p['fichero.php']) puede ser utilizado para determinar
  si phar://monphar.phar/fichero.php existe dentro de
  monphar.phar.

- unset($p['fichero.php']) elimina
  phar://monphar.phar/fichero.php de
  monphar.phar.

Además, el objeto [Phar](#class.phar) es el único medio
de acceder a los metadatos específicos de Phar, mediante
[Phar::getMetadata()](#phar.getmetadata),
y es también el único medio de establecer o recuperar el
contenedor del cargador del archivo Phar mediante
[Phar::getStub()](#phar.getstub) y
[Phar::setStub()](#phar.setstub).
Además, la compresión para el archivo Phar completo puede
ser manipulada solo mediante la clase [Phar](#class.phar).

La lista completa de funcionalidades del objeto
[Phar](#class.phar) está documentada a continuación.

La clase [PharFileInfo](#class.pharfileinfo) extiende la clase
[SplFileInfo](#class.splfileinfo)
y añade varios métodos para manipular los metadatos
específicos de Phar de un fichero contenido en un Phar,
tales como manipular la compresión o los metadatos.

# Creación de archivos Phar

## Tabla de contenidos

- [Creación de archivos Phar: Introducción](#phar.creating.intro)

    ## Creación de archivos Phar: Introducción

    Para ser escrita completamente en un futuro próximo. Antes de leer esto, asegúrese de leer
    [Como utilizar archivos PHAR](#phar.using).

    Un buen lugar para empezar es leer acerca de [Phar::buildFromIterator()](#phar.buildfromiterator),
    y los detalles de la elección del [formato de fichero](#phar.fileformat)
    disponible para los archivos. Una adecuada comprensión de lo que es y hace una rutina de interoperabilidad (stub), es crucial
    para la creación de un archivo PHAR, así [Phar::setStub()](#phar.setstub) y
    [Phar::createDefaultStub()](#phar.createdefaultstub) son buenos lugares para comenzar.
    Si va a distribuir una aplicación basada en web es fundamental saber qué es y cómo funciona
    [Phar::webPhar()](#phar.webphar) y el método relacionado
    [Phar::mungServer()](#phar.mungserver). Cualquier aplicación que tenga acceso
    a sus propios ficheros también debe considerar el uso de [Phar::interceptFileFuncs()](#phar.interceptfilefuncs).

# ¿Qué hace que un phar sea un phar y no un tar o un zip?

## Tabla de contenidos

- [Los componentes de todas las archivos Phar, independientemente del formato de archivo](#phar.fileformat.ingredients)
- [El contenedor de archivo Phar](#phar.fileformat.stub)
- [Comparación entre Phar, Tar y Zip](#phar.fileformat.comparison)
- [Los phars basados en Tar](#phar.fileformat.tar)
- [Los phars basados en Zip](#phar.fileformat.zip)
- [El formato de archivo Phar](#phar.fileformat.phar)
- [Flags "bitmapped" globales del Phar](#phar.fileformat.flags)
- [Definición de las entradas del manifiesto Phar](#phar.fileformat.manifestfile)
- [Formato de firma Phar](#phar.fileformat.signature)

    ## Los componentes de todas las archivos Phar, independientemente del formato de archivo

    Todos los archivos Phar contienen de tres a cuatro secciones:
    - Un contenedor

    - Un manifiesto que describe el contenido

    - El contenido del archivo

    - Una firma (opcional) para verificar la integridad
      (solo con el formato de archivo phar)

    ## El contenedor de archivo Phar

    Un contenedor Phar es un simple archivo PHP. El contenedor mínimo contiene:

&lt;?php \_\_HALT_COMPILER();

Un contenedor debe contener al menos el token \_\_HALT_COMPILER();
como conclusión. Típicamente, un contenedor contendrá las siguientes funcionalidades
de carga:

&lt;?php
Phar::mapPhar();
include 'phar://monphar.phar/index.php';
\_\_HALT_COMPILER();

No hay restricciones sobre el contenido de un contenedor Phar, excepto la necesidad de
concluir con \_\_HALT_COMPILER();. La etiqueta de cierre PHP ?&gt; puede ser
incluida u omitida, pero no puede haber más de un espacio entre el ; y la etiqueta de cierre
?&gt;, de lo contrario la extensión phar no será capaz de leer el
manifiesto del archivo.

En un archivo phar basado en tar o zip, el contenedor se almacena en el archivo
.phar/stub.php. El contenedor por defecto de los archivos Phar basados en
phar contiene aproximadamente 7ko de código para extraer el contenido del phar y ejecutarlo.
Consulte la función [Phar::createDefaultStub()](#phar.createdefaultstub) para más detalles.

El alias phar se almacena, en el caso de un archivo phar basado en tar o zip, en el archivo
.phar/alias.txt como texto plano.

## Comparación entre Phar, Tar y Zip

¿Cuáles son las ventajas y desventajas de cada uno de los tres formatos soportados
por la extensión phar? Esta tabla intenta responder a esta pregunta.

    <caption>**Tabla comparativa: Phar, Tar y Zip**</caption>



       Funcionalidad
       Phar
       Tar
       Zip






       Formato de archivo estándar
       No
       Sí
       Sí



       Puede ser ejecutado sin la extensión Phar
        [[1]](#phar.fileformat.phartip)

       Sí
       No
       No



       Compresión por archivo
       Sí
       No
       Sí



       Compresión para todo el archivo
       Sí
       Sí
       No



       Validación por firma de todo el archivo
       Sí
       Sí
       Sí



       Soporte de aplicaciones específicamente web
       Sí
       Sí
       Sí



       Metadatos por archivo
       Sí
       Sí
       Sí



       Metadatos para todo el archivo
       Sí
       Sí
       Sí



       Creación/modificación de archivo
        [[2]](#phar.fileformat.phartip2)

       Sí
       Sí
       Sí



       Soporte completo de todas las funciones de flujo
       Sí
       Sí
       Sí



       Puede ser creado/modificado incluso si phar.readonly=1
        [[3]](#phar.fileformat.phartip3)

       No
       Sí
       Sí




**Sugerencia**

     [1] PHP no puede acceder directamente al contenido de un archivo Phar sin que la extensión
     Phar esté instalada si utiliza un contenedor
     que extrae el contenido del archivo phar. El contenedor
     creado por [Phar::createDefaultStub()](#phar.createdefaultstub) extrae
     el archivo phar y ejecuta su contenido desde un directorio temporal si
     no se encuentra ninguna extensión phar.

**Sugerencia**

     [2] Todos los accesos en escritura requieren que phar.readonly esté
     desactivado en el php.ini o directamente desde la línea de comandos.

**Sugerencia**

     [3] Solo los archivos tar o zip sin .phar en su
     nombre y sin contenedor ejecutable .phar/stub.php
     pueden ser creados si phar.readonly=1.

## Los phars basados en Tar

Los archivos basados en el formato de archivo tar son conformes al formato moderno
USTAR. El diseño de los encabezados del archivo tar lo hace más eficiente que el formato de archivo zip
y tan eficiente como el formato de archivo phar cuando se trata de acceder a los datos.
Los nombres de archivos están limitados a 255 bytes, incluyendo la ruta completa dentro del archivo phar
basado en tar. Estos archivos pueden ser completamente comprimidos en formato gzip o bzip2 mientras
siguen siendo ejecutables por la extensión Phar.

Hay un soporte limitado para leer los tarballs en el formato pax interchangeable,
pero todos los encabezados pax reconocidos (actualmente, typeflag x
y g) son silenciosamente ignorados.
También hay un soporte limitado para los archivos GNU Tar;
actualmente, los encabezados ././@LongLink son resueltos.

Para comprimir un archivo completo, utilice [Phar::compress()](#phar.compress).
Para descomprimir un archivo completo, utilice [Phar::decompress()](#phar.decompress).

## Los phars basados en Zip

Los archivos basados en el formato de archivo zip soportan numerosas funcionalidades
incluidas en el formato zip. Los metadatos por archivo o sobre todo el archivo se almacenan
en los comentarios del archivo zip y del archivo zip como una cadena de caracteres serializada.
Los comentarios zip ya existentes serán leídos sin problemas como una cadena. Las lecturas/escrituras
comprimidas son soportadas por la compresión zlib DEFLATE, y solo las lecturas comprimidas por
la compresión bzip2. No hay límite en el número de archivos dentro de un archivo phar
basado en zip. Los directorios vacíos se almacenan en el archivo zip como archivos con una barra final,
como mon/repertoire/

## El formato de archivo Phar

El formato de archivo phar está compuesto por contenedor/manifiesto/contenido/firma, y almacena
las informaciones cruciales de lo que está contenido en el archivo phar en su
manifiesto.

El manifiesto Phar es un formato altamente optimizado que permite la especificación archivo por archivo
de la compresión, los permisos y hasta metadatos de usuario tales como el usuario o el
grupo propietario. Todos los valores de más de un byte son almacenados en formato little-endian,
A excepción de la versión de la API que es almacenada por razones históricas en 3 trozos
big-endian.

Todos los flags no utilizados están reservados para un uso futuro y no deben ser utilizados
para almacenar informaciones personalizadas. Utilice los metadatos por archivo para almacenar
metadatos personalizados sobre archivos particulares.

El formato de archivo básico del manifiesto de un archivo Phar es el siguiente:

    <caption>**Formato global del manifiesto Phar**</caption>



       Tamaño en bytes
       Descripción






       4 bytes
       Longitud del manifiesto en bytes (limitada a 1 MB)



       4 bytes
       Número de archivos en el Phar



       2 bytes
       Versión de la API del manifiesto Phar (actualmente 1.0.0)



       4 bytes
       Flags "bitmapped" globales del Phar



       4 bytes
       Longitud del alias Phar



       ??
       El alias Phar (longitud basada en el valor anterior)



       4 bytes
       Longitud de los metadatos Phar (0 si no hay)



       ??
       Metadatos Phar serializados, almacenados en un formato [serialize()](#function.serialize)



       al menos 24 * bytes de las entradas
       Entradas para cada archivo




## Flags "bitmapped" globales del Phar

Estos son los flags "bitmapped" actualmente reconocidos por la extensión Phar
para el bitmap completo global de Phar:

    <caption>**Valores de bitmap reconocidos**</caption>



       Valor
       Descripción






       0x00010000
       Si está presente, el Phar contiene una firma de verificación



       0x00001000

        Si está presente, el Phar contiene al menos 1 archivo que es
        comprimido mediante zlib DEFLATE




       0x00002000

        Si está presente, el Phar contiene al menos 1 archivo que es
        comprimido mediante bzip2





## Definición de las entradas del manifiesto Phar

Cada archivo del manifiesto contiene las siguientes informaciones:

    <caption>**Entrada del manifiesto Phar**</caption>



       Tamaño en bytes
       Descripción






       4 bytes
       Longitud del nombre de archivo en bytes



       ??
       Nombre de archivo (longitud basada en el valor anterior)



       4 bytes
       Tamaño del archivo descomprimido en bytes



       4 bytes
       Timestamp Unix del archivo



       4 bytes
       Tamaño del archivo comprimido en bytes



       4 bytes
       Suma de control CRC32 del contenido descomprimido del archivo



       4 bytes
       Flags bitmapped específicos del archivo



       4 bytes
       Longitud de los metadatos del archivo serializados (0 si no hay)



       ??
       Metadatos del archivo serializados, almacenados en un formato [serialize()](#function.serialize)




Se debe notar que a partir de la API 1.1.1, los directorios vacíos son almacenados como nombres de archivo
con una barra final como mon/repertoire/

Los valores reconocidos de flags bitmapped específicos del archivo son:

    <caption>**Valores reconocidos de bitmap**</caption>



       Valor
       Descripción






       0x000001FF

        Estos bits están reservados para definir permisos específicos del archivo.
        Estos son utilizados para [fstat()](#function.fstat)
        y pueden ser utilizados para recrear los permisos deseados en caso de extracción.




       0x00001000

        Si está presente, el archivo es comprimido mediante zlib DEFLATE




       0x00002000

        Si está presente, el archivo es comprimido mediante bzip2





## Formato de firma Phar

Los Phar que contienen una firma siempre tienen la firma añadida al final del Phar,
después del cargador, el manifiesto y el contenido.
Los tipos de firma soportados hasta la fecha son MD5, SHA1, SHA256, SHA512,
y OPENSSL.

    <caption>**Formato de firma**</caption>



       Longitud en bytes
       Descripción






       variante

        La firma actual, 20 bytes para una SHA1,
        16 bytes para una MD5, 32 bytes para una SHA256,
        y 64 bytes para una SHA512. La longitud de una firma
        OPENSSL depende del tamaño de la clave privada.




       4 bytes

        Los flags de firma. 0x0001 es utilizado para
        definir una firma MD5, 0x0002 para una SHA1,
        0x0003 para una SHA256 y 0x0004
        para una SHA512. El soporte para las firmas SHA256 y SHA512 está disponible
        a partir de la versión 1.1.0 de la API.
        0x0010 es utilizado para definir una firma OPENSSL,
        que está disponible a partir de la versión 1.1.1 de la API, si OpenSSL está disponible.




       4 bytes

        GBMB mágico utilizado para definir la presencia de una firma.





# La clase Phar

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

## Introducción

    La clase Phar proporciona una interfaz de alto nivel para acceder y crear
    archivos phar.

## Sinopsis de la Clase

     class **Phar**



     extends
      [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)



     implements
      [Countable](#class.countable),

     [ArrayAccess](#class.arrayaccess) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [FilesystemIterator::CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask);

public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename);
public
const
[int](#language.types.integer)
[FilesystemIterator::NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key);
public
const
[int](#language.types.integer)
[FilesystemIterator::OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots);
public
const
[int](#language.types.integer)
[FilesystemIterator::UNIX_PATHS](#filesystemiterator.constants.unix-paths);

    /* Constantes */
    const
     [int](#language.types.integer)
      [BZ2](#phar.constants.bz2);

    const
     [int](#language.types.integer)
      [GZ](#phar.constants.gz);

    const
     [int](#language.types.integer)
      [NONE](#phar.constants.none);

    const
     [int](#language.types.integer)
      [PHAR](#phar.constants.phar);

    const
     [int](#language.types.integer)
      [TAR](#phar.constants.tar);

    const
     [int](#language.types.integer)
      [ZIP](#phar.constants.zip);

    const
     [int](#language.types.integer)
      [COMPRESSED](#phar.constants.compressed);

    const
     [int](#language.types.integer)
      [PHP](#phar.constants.php);

    const
     [int](#language.types.integer)
      [PHPS](#phar.constants.phps);

    const
     [int](#language.types.integer)
      [MD5](#phar.constants.md5);

    const
     [int](#language.types.integer)
      [OPENSSL](#phar.constants.openssl);

    const
     [int](#language.types.integer)
      [OPENSSL_SHA256](#phar.constants.openssl-sha256);

    const
     [int](#language.types.integer)
      [OPENSSL_SHA512](#phar.constants.openssl-sha512);

    const
     [int](#language.types.integer)
      [SHA1](#phar.constants.sha1);

    const
     [int](#language.types.integer)
      [SHA256](#phar.constants.sha256);

    const
     [int](#language.types.integer)
      [SHA512](#phar.constants.sha512);

    /* Métodos */

public [\_\_construct](#phar.construct)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS, [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**)

    public [addEmptyDir](#phar.addemptydir)([string](#language.types.string) $directory): [void](language.types.void.html)

public [addFile](#phar.addfile)([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $localName = **[null](#constant.null)**): [void](language.types.void.html)
public [addFromString](#phar.addfromstring)([string](#language.types.string) $localName, [string](#language.types.string) $contents): [void](language.types.void.html)
final public static [apiVersion](#phar.apiversion)(): [string](#language.types.string)
public [buildFromDirectory](#phar.buildfromdirectory)([string](#language.types.string) $directory, [string](#language.types.string) $pattern = ""): [array](#language.types.array)
public [buildFromIterator](#phar.buildfromiterator)([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $baseDirectory = **[null](#constant.null)**): [array](#language.types.array)
final public static [canCompress](#phar.cancompress)([int](#language.types.integer) $compression = 0): [bool](#language.types.boolean)
final public static [canWrite](#phar.canwrite)(): [bool](#language.types.boolean)
public [compress](#phar.compress)([int](#language.types.integer) $compression, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)
public [compressFiles](#phar.compressfiles)([int](#language.types.integer) $compression): [void](language.types.void.html)
public [convertToData](#phar.converttodata)([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)
public [convertToExecutable](#phar.converttoexecutable)([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)
public [copy](#phar.copy)([string](#language.types.string) $from, [string](#language.types.string) $to): [true](#language.types.singleton)
public [count](#phar.count)([int](#language.types.integer) $mode = **[COUNT_NORMAL](#constant.count-normal)**): [int](#language.types.integer)
final public static [createDefaultStub](#phar.createdefaultstub)([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [string](#language.types.string)
public [decompress](#phar.decompress)([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)
public [decompressFiles](#phar.decompressfiles)(): [true](#language.types.singleton)
public [delMetadata](#phar.delmetadata)(): [true](#language.types.singleton)
public [delete](#phar.delete)([string](#language.types.string) $localName): [true](#language.types.singleton)
public [extractTo](#phar.extractto)([string](#language.types.string) $directory, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**, [bool](#language.types.boolean) $overwrite = **[false](#constant.false)**): [bool](#language.types.boolean)
public [getAlias](#phar.getalias)(): [?](#language.types.null)[string](#language.types.string)
public [getMetadata](#phar.getmetadata)([array](#language.types.array) $unserializeOptions = []): [mixed](#language.types.mixed)
public [getModified](#phar.getmodified)(): [bool](#language.types.boolean)
public [getPath](#phar.getpath)(): [string](#language.types.string)
public [getSignature](#phar.getsignature)(): [array](#language.types.array)|[false](#language.types.singleton)
public [getStub](#phar.getstub)(): [string](#language.types.string)
final public static [getSupportedCompression](#phar.getsupportedcompression)(): [array](#language.types.array)
final public static [getSupportedSignatures](#phar.getsupportedsignatures)(): [array](#language.types.array)
public [getVersion](#phar.getversion)(): [string](#language.types.string)
public [hasMetadata](#phar.hasmetadata)(): [bool](#language.types.boolean)
final public static [interceptFileFuncs](#phar.interceptfilefuncs)(): [void](language.types.void.html)
public [isBuffering](#phar.isbuffering)(): [bool](#language.types.boolean)
public [isCompressed](#phar.iscompressed)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [isFileFormat](#phar.isfileformat)([int](#language.types.integer) $format): [bool](#language.types.boolean)
final public static [isValidPharFilename](#phar.isvalidpharfilename)([string](#language.types.string) $filename, [bool](#language.types.boolean) $executable = **[true](#constant.true)**): [bool](#language.types.boolean)
public [isWritable](#phar.iswritable)(): [bool](#language.types.boolean)
final public static [loadPhar](#phar.loadphar)([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**): [bool](#language.types.boolean)
final public static [mapPhar](#phar.mapphar)([?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**, [int](#language.types.integer) $offset = 0): [bool](#language.types.boolean)
final public static [mount](#phar.mount)([string](#language.types.string) $pharPath, [string](#language.types.string) $externalPath): [void](language.types.void.html)
final public static [mungServer](#phar.mungserver)([array](#language.types.array) $variables): [void](language.types.void.html)
public [offsetExists](#phar.offsetexists)([string](#language.types.string) $localName): [bool](#language.types.boolean)
public [offsetGet](#phar.offsetget)([string](#language.types.string) $localName): [SplFileInfo](#class.splfileinfo)
public [offsetSet](#phar.offsetset)([string](#language.types.string) $localName, [resource](#language.types.resource)|[string](#language.types.string) $value): [void](language.types.void.html)
public [offsetUnset](#phar.offsetunset)([string](#language.types.string) $localName): [void](language.types.void.html)
final public static [running](#phar.running)([bool](#language.types.boolean) $returnPhar = **[true](#constant.true)**): [string](#language.types.string)
public [setAlias](#phar.setalias)([string](#language.types.string) $alias): [true](#language.types.singleton)
public [setDefaultStub](#phar.setdefaultstub)([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [true](#language.types.singleton)
public [setMetadata](#phar.setmetadata)([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)
public [setSignatureAlgorithm](#phar.setsignaturealgorithm)([int](#language.types.integer) $algo, [?](#language.types.null)[string](#language.types.string) $privateKey = **[null](#constant.null)**): [void](language.types.void.html)
public [setStub](#phar.setstub)([resource](#language.types.resource)|[string](#language.types.string) $stub, [int](#language.types.integer) $length = -1): [bool](#language.types.boolean)
public [startBuffering](#phar.startbuffering)(): [void](language.types.void.html)
public [stopBuffering](#phar.stopbuffering)(): [void](language.types.void.html)
final public static [unlinkArchive](#phar.unlinkarchive)([string](#language.types.string) $filename): [true](#language.types.singleton)
final public static [webPhar](#phar.webphar)(
    [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $fileNotFoundScript = **[null](#constant.null)**,
    [array](#language.types.array) $mimeTypes = [],
    [?](#language.types.null)[callable](#language.types.callable) $rewrite = **[null](#constant.null)**
): [void](language.types.void.html)

    public [__destruct](#phar.destruct)()


    /* Métodos heredados */
    public [RecursiveDirectoryIterator::getChildren](#recursivedirectoryiterator.getchildren)(): [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)

public [RecursiveDirectoryIterator::getSubPath](#recursivedirectoryiterator.getsubpath)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::getSubPathname](#recursivedirectoryiterator.getsubpathname)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::hasChildren](#recursivedirectoryiterator.haschildren)([bool](#language.types.boolean) $allowLinks = **[false](#constant.false)**): [bool](#language.types.boolean)
public [RecursiveDirectoryIterator::key](#recursivedirectoryiterator.key)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::next](#recursivedirectoryiterator.next)(): [void](language.types.void.html)
public [RecursiveDirectoryIterator::rewind](#recursivedirectoryiterator.rewind)(): [void](language.types.void.html)

    public [FilesystemIterator::current](#filesystemiterator.current)(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

public [FilesystemIterator::getFlags](#filesystemiterator.getflags)(): [int](#language.types.integer)
public [FilesystemIterator::key](#filesystemiterator.key)(): [string](#language.types.string)
public [FilesystemIterator::next](#filesystemiterator.next)(): [void](language.types.void.html)
public [FilesystemIterator::rewind](#filesystemiterator.rewind)(): [void](language.types.void.html)
public [FilesystemIterator::setFlags](#filesystemiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)

    public [DirectoryIterator::current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [DirectoryIterator::getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [DirectoryIterator::getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [DirectoryIterator::getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [DirectoryIterator::isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [DirectoryIterator::key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [DirectoryIterator::next](#directoryiterator.next)(): [void](language.types.void.html)
public [DirectoryIterator::rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [DirectoryIterator::seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [DirectoryIterator::\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [DirectoryIterator::valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

## Historial de cambios

       Versión
       Descripción






       8.4.0

        Se añadió el soporte para la extensión de timestamp Unix en archivos basados en Zip.




       8.0.0

        Los metadatos ya no se deserializan al abrir el archivo,
        sino que se posponen hasta que se llama a
        [Phar::getMetadata()](#phar.getmetadata).





## Notas

**Precaución**

     Antes de PHP 8.0.0, los metadatos se deserializaban al abrir el
     archivo. Esto podía provocar vulnerabilidades de seguridad.
     A partir de PHP 8.0.0, los metadatos solo se deserializan al llamar a
     [Phar::getMetadata()](#phar.getmetadata), que ofrece opciones para restringir
     la deserialización por razones de seguridad.

# Phar::addEmptyDir

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::addEmptyDir — Añade un directorio vacío al archivo phar

### Descripción

public **Phar::addEmptyDir**([string](#language.types.string) $directory): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Mediante este método se crea un directorio vacío con la ruta dirname.
Este método es idéntico a [ZipArchive::addEmptyDir()](#ziparchive.addemptydir).

### Parámetros

     directory


       El nombre del directorio vacío a crear en el archivo phar





### Valores devueltos

No se devuelve ningún valor, se lanza una excepción en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::addEmptyDir()**

&lt;?php
try {
$a = new Phar('/ruta/al/archivo.phar');

    $a-&gt;addEmptyDir('/ruta/completa/al/fichero');
    // demuestra cómo se almacena el fichero
    $b = $a['ruta/completa/al/fichero']-&gt;isDir();

} catch (Exception $e) {
// maneja los errores aquí
}
?&gt;

### Ver también

    - [PharData::addEmptyDir()](#phardata.addemptydir) - Añade un directorio vacío al archivo tar/zip

    - [Phar::addFile()](#phar.addfile) - Añade un fichero del sistema de ficheros al archivo phar

    - [Phar::addFromString()](#phar.addfromstring) - Añade un fichero desde un string al archivo phar

# Phar::addFile

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::addFile — Añade un fichero del sistema de ficheros al archivo phar

### Descripción

public **Phar::addFile**([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $localName = **[null](#constant.null)**): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Mediante este método, cualquier fichero o URL puede ser añadido al archivo phar. Si
el segundo parámetro opcional localName es un [string](#language.types.string),
el fichero será almacenado en el archivo con ese nombre, de lo contrario el parámetro
filename se utiliza como ruta hacia donde almacenar el archivo.
Las URL deben ser locales, de lo contrario se lanza una excepción.
Este método es idéntico a [ZipArchive::addFile()](#ziparchive.addfile).

### Parámetros

     filename


       Ruta absoluta o relativa hacia un fichero del disco a añadir
       al archivo phar.






     localName


       Ruta donde el fichero será almacenado en el archivo.





### Valores devueltos

No hay valor de retorno, se lanza una excepción en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       localName ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::addFile()**

&lt;?php
try {
$a = new Phar('/ruta/al/phar.phar');

    $a-&gt;addFile('/ruta/completa/al/fichero');
    // demuestra cómo el fichero es almacenado
    $b = $a['ruta/completa/al/fichero']-&gt;getContent();

    $a-&gt;addFile('/ruta/completa/al/fichero', 'mi/fichero.txt');
    $c = $a['mi/fichero.txt']-&gt;getContent();

    // demuestra el uso de URL
    $a-&gt;addFile('http://www.ejemplo.com', 'ejemplo.html');

} catch (Exception $e) {
// maneja los errores aquí
}
?&gt;

### Notas

**Nota**:

**Phar::addFile()**, [Phar::addFromString()](#phar.addfromstring) y [Phar::offsetSet()](#phar.offsetset)
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[Phar::buildFromDirectory()](#phar.buildfromdirectory) o [Phar::buildFromIterator()](#phar.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

    - [PharData::addFile()](#phardata.addfile) - Añade un fichero del sistema de archivos al archivo tar/zip

    - [Phar::addFromString()](#phar.addfromstring) - Añade un fichero desde un string al archivo phar

    - [Phar::addEmptyDir()](#phar.addemptydir) - Añade un directorio vacío al archivo phar

# Phar::addFromString

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::addFromString — Añade un fichero desde un string al archivo phar

### Descripción

public **Phar::addFromString**([string](#language.types.string) $localName, [string](#language.types.string) $contents): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Esta función permite añadir cualquier string a un archivo phar.
El fichero se almacenará en el archivo con localname como
ruta. Esta función es idéntica a [ZipArchive::addFromString()](#ziparchive.addfromstring).

### Parámetros

     localName


       Ruta donde el fichero será almacenado en el archivo.






     contents


       El contenido del fichero a almacenar





### Valores devueltos

No devuelve ningún valor, se lanza una excepción en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::addFromString()**

&lt;?php
try {
$a = new Phar('/ruta/al/archivo.phar');

    $a-&gt;addFromString('ruta/al/fichero.txt', 'mi fichero simple');
    $b = $a['ruta/al/fichero.txt']-&gt;getContent();

    // para añadir contenido desde un descriptor de flujo para archivos grandes, utilice offsetSet()
    $c = fopen('/ruta/al/archivo_grande.bin');
    $a['archivo_grande.bin'] = $c;
    fclose($c);

} catch (Exception $e) {
// manejo de errores aquí
}
?&gt;

### Notas

**Nota**:

[Phar::addFile()](#phar.addfile), **Phar::addFromString()** y [Phar::offsetSet()](#phar.offsetset)
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[Phar::buildFromDirectory()](#phar.buildfromdirectory) o [Phar::buildFromIterator()](#phar.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

    - [PharData::addFromString()](#phardata.addfromstring) - Añade un fichero a partir de un string al archivo tar/zip

    - [Phar::addFile()](#phar.addfile) - Añade un fichero del sistema de ficheros al archivo phar

    - [Phar::addEmptyDir()](#phar.addemptydir) - Añade un directorio vacío al archivo phar

# Phar::apiVersion

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::apiVersion — Devuelve la versión de la API

### Descripción

final public static **Phar::apiVersion**(): [string](#language.types.string)

Devuelve la versión de la API del formato de archivo phar que será utilizada
para la creación de phars. La extensión Phar soporta la lectura de las versiones
de API 1.0.0 y superiores. La versión de API 1.1.0 es requerida para los hashes
SHA-256 y SHA-512, y la versión de API 1.1.1 es requerida para almacenar
directorios vacíos.

### Parámetros

### Valores devueltos

La versión de la API, por ejemplo "1.0.0".

### Ejemplos

    **Ejemplo #1 Un ejemplo conPhar::apiVersion()**

&lt;?php
echo Phar::apiVersion();
?&gt;

    El ejemplo anterior mostrará:

1.1.1

# Phar::buildFromDirectory

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::buildFromDirectory — Construye un archivo phar a partir de los ficheros de un directorio

### Descripción

public **Phar::buildFromDirectory**([string](#language.types.string) $directory, [string](#language.types.string) $pattern = ""): [array](#language.types.array)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Rellena un archivo phar a partir del contenido de un directorio. El segundo parámetro,
opcional, es una expresión regular (pcre) utilizada para excluir ficheros.
Todo fichero cuyo nombre cumpla la expresión regular será incluido, los demás serán excluidos.
Para un control más fino, utilice [Phar::buildFromIterator()](#phar.buildfromiterator).

### Parámetros

     directory


       La ruta absoluta o relativa hacia el directorio que contiene todos los ficheros
       a añadir al archivo.






     pattern


       Una expresión regular opcional utilizada para filtrar la lista
       de ficheros. Solo los ficheros cuyo nombre cumpla la expresión regular
       serán incluidos en el archivo.





### Valores devueltos

**Phar::buildFromDirectory()** devuelve un array asociativo
que hace corresponder la ruta interna del fichero con la ruta completa en el sistema
de ficheros.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception) cuando no es
capaz de instanciar el iterador de directorio interno,
o una excepción [PharException](#class.pharexception) si ha habido errores durante
el guardado del archivo.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       **Phar::buildFromDirectory()** ya no devuelve **[false](#constant.false)**.



### Ejemplos

**Ejemplo #1 Un ejemplo con Phar::buildFromDirectory()**

&lt;?php
// crea con el alias "proyecto.phar"
$phar = new Phar('proyecto.phar', 0, 'proyecto.phar');
// añade ficheros en el proyecto
$phar-&gt;buildFromDirectory(dirname(**FILE**) . '/proyecto');
$phar-&gt;setStub($phar-&gt;createDefaultWebStub('cli/index.php', 'www/index.php'));

$phar2 = new Phar('proyecto2.phar', 0, 'proyecto2.phar');
// añade todos los ficheros en el proyecto, pero solo los ficheros .php
$phar-&gt;buildFromDirectory(dirname(**FILE**) . '/proyecto', '/\.php$/');
$phar-&gt;setStub($phar-&gt;createDefaultStub('cli/index.php', 'www/index.php'));
?&gt;

### Ver también

    - [Phar::buildFromIterator()](#phar.buildfromiterator) - Construye un archivo phar a partir de un iterador

# Phar::buildFromIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::buildFromIterator — Construye un archivo phar a partir de un iterador

### Descripción

public **Phar::buildFromIterator**([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $baseDirectory = **[null](#constant.null)**): [array](#language.types.array)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Rellena un archivo phar a partir de un iterador. Dos estilos de iterador
son soportados: los iteradores que hacen corresponder el nombre de archivo
dentro del phar con el nombre de un archivo en el disco, y los iteradores
como [DirectoryIterator](#class.directoryiterator) que devuelven objetos
[SplFileInfo](#class.splfileinfo). Para los iteradores que devuelven
objetos [SplFileInfo](#class.splfileinfo), el segundo parámetro es
obligatorio.

### Parámetros

     iterator


       Un iterador que asocia un archivo con una posición, o bien
       devuelve objetos [SplFileInfo](#class.splfileinfo).






     baseDirectory


       Para los iteradores que devuelven objetos
       [SplFileInfo](#class.splfileinfo), la porción de ruta absoluta
       de cada archivo que debe ser eliminada al añadir al
       archivo phar.





### Valores devueltos

**Phar::buildFromIterator()** devuelve un array
asociativo que asocia la representación interna del archivo a un
camino absoluto en el sistema.

### Errores/Excepciones

Este método emite una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
cuando el iterador devuelve valores falsos, tales como una clave
entera en lugar de una cadena; una excepción
[BadMethodCallException](#class.badmethodcallexception) cuando un iterador
basado en [SplFileInfo](#class.splfileinfo) es pasado sin parámetro
baseDirectory, o una excepción
[PharException](#class.pharexception) si ha habido errores al
guardar el archivo phar.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       **Phar::buildFromIterator()** ya no devuelve **[false](#constant.false)** ahora.




      8.0.0

       baseDirectory ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::buildFromIterator()** y [SplFileInfo](#class.splfileinfo)



     Para la mayoría de archivos phar, el archivo refleja la estructura
     de un directorio, y el segundo estilo es el más útil. Por ejemplo,
     para crear un archivo phar que contenga los archivos de la estructura
     del directorio:






/ruta/hacia/proyecto/
config/
dist.xml
debug.xml
lib/
file1.php
file2.php
src/
processthing.php
www/
index.php
cli/
index.php

Este código puede ser utilizado para añadir al archivo "proyecto.phar":

&lt;?php
// crea con el alias "proyecto.phar"
$phar = new Phar('proyecto.phar', 0, 'proyecto.phar');
$phar-&gt;buildFromIterator(
new RecursiveIteratorIterator(
new RecursiveDirectoryIterator('/ruta/hacia/proyecto')),
'/ruta/hacia/proyecto');
$phar-&gt;setStub($phar-&gt;createDefaultStub('cli/index.php', 'www/index.php'));
?&gt;

El archivo proyecto.phar puede ser utilizado inmediatamente.
**Phar::buildFromIterator()** no establece parámetros
tales como la compresión o los metadatos; esto
puede ser hecho después de crear el archivo phar.

Es interesante notar que **Phar::buildFromIterator()**
también puede ser utilizado para copiar los elementos de un archivo phar
existente, ya que el objeto Phar hereda de [DirectoryIterator](#class.directoryiterator):

&lt;?php
// crea con el alias "proyecto.phar"
$phar = new Phar('proyecto.phar', 0, 'proyecto.phar');
$phar-&gt;buildFromIterator(
new RecursiveIteratorIterator(
new Phar('/ruta/hacia/otrophar.phar')),
'phar:///ruta/hacia/otrophar.phar/ruta/hacia/proyecto');
$phar-&gt;setStub($phar-&gt;createDefaultWebStub('cli/index.php', 'www/index.php'));
?&gt;

**Ejemplo #2 Ejemplo con Phar::buildFromIterator()** y otros iteradores

La segunda forma de iterador puede ser utilizada con cualquier
iterador que devuelva una correspondencia clave =&gt; valor,
tales como [ArrayIterator](#class.arrayiterator):

&lt;?php
// crea con el alias "proyecto.phar"
$phar = new Phar('proyecto.phar', 0, 'proyecto.phar');
$phar-&gt;buildFromIterator(
new ArrayIterator(
array(
'interna/fichero.php' =&gt; dirname(**FILE**) . '/unfichero.php',
'otro/fichero.jpg' =&gt; fopen('/ruta/hacia/grande.jpg', 'rb'),
)));
$phar-&gt;setStub($phar-&gt;createDefaultWebStub('cli/index.php', 'www/index.php'));
?&gt;

### Ver también

    - [Phar::buildFromDirectory()](#phar.buildfromdirectory) - Construye un archivo phar a partir de los ficheros de un directorio

# Phar::canCompress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::canCompress — Determina si la extensión phar soporta la compresión utilizando zip o bzip2

### Descripción

final public static **Phar::canCompress**([int](#language.types.integer) $compression = 0): [bool](#language.types.boolean)

Este método debe ser utilizado para determinar si la compresión es posible antes
de cargar un archivo phar que contiene ficheros comprimidos.

### Parámetros

     compression


       Phar::GZ y Phar::BZ2 pueden ser utilizadas
       para determinar si la compresión es posible con zlib o bzip2, respectivamente.





### Valores devueltos

**[true](#constant.true)** si la compresión/descompresión está disponible, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::canCompress()**

&lt;?php
if (Phar::canCompress()) {
echo file_get_contents('phar://pharcompresse.phar/interne/fichero.txt');
} else {
echo 'compresión no disponible';
}
?&gt;

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::convertToExecutable()](#phar.converttoexecutable) - Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

    - [Phar::convertToData()](#phar.converttodata) - Convierte un archivo phar en un fichero no ejecutable

# Phar::canWrite

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::canWrite — Determina si la extensión phar soporta la creación y escritura de archivos phar

### Descripción

final public static **Phar::canWrite**(): [bool](#language.types.boolean)

Este método estático determina si el acceso en escritura ha sido desactivado en el
php.ini del sistema mediante la variable INI [phar.readonly](#ini.phar.readonly).

### Parámetros

### Valores devueltos

**[true](#constant.true)** si el acceso en escritura es posible, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::canWrite()**

&lt;?php
if (Phar::canWrite()) {
file_put_contents('phar://monphar.phar/fichero.txt', 'coucou');
}
?&gt;

### Ver también

    - [phar.readonly](#ini.phar.readonly)

    - [Phar::isWritable()](#phar.iswritable) - Retorna true si el archivo phar puede ser modificado

# Phar::compress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::compress — Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

### Descripción

public **Phar::compress**([int](#language.types.integer) $compression, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

En el caso de los archivos phar basados en tar o en phar, este método comprime el archivo completo
utilizando la compresión gzip o bzip2. El archivo resultante puede ser procesado con el comando
gzip/bzip2, o accedido directamente y de forma transparente con la extensión Phar.

En el caso de los archivos phar basados en Zip, este método falla lanzando una excepción.
La extensión [zlib](#ref.zlib) debe estar activada para comprimir con gzip, mientras que
la extensión [bzip2](#ref.bzip2) debe estar activada para comprimir con bzip2.
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off para funcionar.

Además, este método renombra automáticamente el archivo, añadiendo a su nombre .gz,
.bz2 o eliminando la extensión si Phar::NONE es pasado para eliminar
la compresión. De lo contrario, una extensión de archivo puede también ser especificada utilizando el segundo
parámetro.

### Parámetros

     compression


       La compresión debe ser Phar::GZ,
       Phar::BZ2 para beneficiarse de la compresión, o bien Phar::NONE
       para eliminar la compresión.






     extension


       Por omisión, la extensión es .phar.gz
       o .phar.bz2 para comprimir los archivos phar, y
       .phar.tar.gz o .phar.tar.bz2 para
       comprimir los archivos tar. Para descomprimir, las extensiones por omisión
       son .phar y .phar.tar.





### Valores devueltos

Devuelve un objeto [Phar](#class.phar), o **[null](#constant.null)** en caso de error.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si
la variable INI [phar.readonly](#ini.phar.readonly) está a on,
si la extensión [zlib](#ref.zlib)
no está disponible, o si la extensión [bzip2](#ref.bzip2) no está
activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       extension ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::compress()**

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
$p['monfichier.txt'] = 'hola';
$p['monfichier2.txt'] = 'hola';
$p1 = $p-&gt;compress(Phar::GZ); // copia a /ruta/al/mon.phar.gz
$p2 = $p-&gt;compress(Phar::BZ2); // copia a /ruta/al/mon.phar.bz2
$p3 = $p2-&gt;compress(Phar::NONE); // excepción: /ruta/al/mon.phar ya existe
?&gt;

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

# Phar::compressFiles

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::compressFiles — Comprime todos los ficheros del archivo Phar actual

### Descripción

public **Phar::compressFiles**([int](#language.types.integer) $compression): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Para los archivos phar basados en tar, este método lanza una excepción
[BadMethodCallException](#class.badmethodcallexception) ya que la compresión de ficheros individuales dentro
de un archivo tar no es soportada por el formato de archivo. Utilice
[Phar::compress()](#phar.compress) para comprimir un archivo phar basado en tar en su totalidad.

Para las extensiones phar basadas en Zip, este método comprime todos los ficheros del archivo
Phar utilizando la compresión especificada.
Las extensiones [zlib](#ref.zlib) o [bzip2](#ref.bzip2)
deben estar activadas para aprovechar esta funcionalidad. Asimismo, si uno o varios ficheros
ya han sido comprimidos utilizando la compresión bzip2/zlib, la extensión adecuada debe estar
activada para descomprimir los ficheros antes de recomprimirlos.
Como con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off para funcionar.

### Parámetros

     compression


    La compresión debe ser Phar::GZ,
    Phar::BZ2 para beneficiarse de la compresión, o bien Phar::NONE
    para eliminar la compresión.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Lanza una excepción [BadMethodCallException](#class.badmethodcallexception) si
la variable INI [phar.readonly](#ini.phar.readonly) está a on,
si la extensión [zlib](#ref.zlib)
no está disponible, o si uno o varios ficheros han sido comprimidos con el algoritmo bzip2
y la extensión [bzip2](#ref.bzip2) no está activada.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::compressFiles()**

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
$p['monfichero.txt'] = 'hola';
$p['monfichero2.txt'] = 'hola';
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
$p-&gt;compressFiles(Phar::GZ);
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
?&gt;

    El ejemplo anterior mostrará:

string(10) "monfichero.txt"
bool(false)
bool(false)
bool(false)
string(11) "monfichero2.txt"
bool(false)
bool(false)
bool(false)
string(10) "monfichero.txt"
int(4096)
bool(false)
bool(true)
string(11) "monfichero2.txt"
int(4096)
bool(false)
bool(true)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

# Phar::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::\_\_construct — Construye un objeto de archivo Phar

### Descripción

public **Phar::\_\_construct**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS, [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**)

### Parámetros

     filename


       La ruta hacia un archivo Phar existente o a crear.
       El nombre del fichero debe contener la extensión .phar.






     flags


       Los flags a pasar a la clase padre [RecursiveDirectoryIterator](#class.recursivedirectoryiterator).






     alias


       Alias con el cual se debe hacer referencia al archivo al llamar a las funcionalidades de flujo.





### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception)
si el método es llamado dos veces, o [UnexpectedValueException](#class.unexpectedvalueexception)
si el archivo no puede ser abierto.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::__construct()**





&lt;?php
try {
$p = new Phar('/path/to/my.phar', FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME,
'mon.phar');
} catch (UnexpectedValueException $e) {
die('No puede abrir mon.phar');
} catch (BadMethodCallException $e) {
echo 'técnicamente, esto no puede ocurrir';
}
// ahora funciona
echo file_get_contents('phar://mon.phar/ejemplo.txt');
// y funciona como si hubiéramos escrito
echo file_get_contents('phar:///ruta/al/mon.phar/ejemplo.txt');
?&gt;

# Phar::convertToData

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::convertToData — Convierte un archivo phar en un fichero no ejecutable

### Descripción

public **Phar::convertToData**([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)

Convierte un archivo phar ejecutable en un fichero tar o zip.
Para hacer que el tar o el zip no sea ejecutable, el contenedor phar
y el alias phar son eliminados del archivo recién creado.

Si no se especifica ningún cambio, este método lanza una excepción
[BadMethodCallException](#class.badmethodcallexception) si el archivo está en
el formato de archivo phar. Para los archivos basados en tar o zip,
este método convierte el archivo en un archivo no ejecutable.

En caso de éxito, el método crea un nuevo archivo en el disco
y devuelve un objeto [PharData](#class.phardata). El archivo antiguo
no se elimina del disco, lo cual debe hacerse manualmente al final del proceso.

### Parámetros

     format


       Debe ser uno de los formatos Phar::TAR
       o Phar::ZIP. Si este argumento es **[null](#constant.null)**,
       se conservará el formato de archivo actual.






     compression


       Debe ser Phar::NONE para ninguna compresión global,
       Phar::GZ para una compresión basada en zlib y
       Phar::BZ2 para una compresión basada en bzip2.






     extension


       Este argumento se utiliza para sobrescribir la extensión por defecto de un
       archivo convertido. Cabe señalar que .phar no puede
       ser utilizado en el nombre de archivo de un archivo tar o zip
       no ejecutable.




       Si se convierte a un archivo basado en tar, las extensiones por defecto son
       .tar, .tar.gz,
       y .tar.bz2 según la compresión especificada.
       Para los archivos phar basados en zip, la extensión por
       defecto es .zip.





### Valores devueltos

El método devuelve un objeto [PharData](#class.phardata) en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception)
si no es capaz de comprimir, si se ha especificado un método de compresión
desconocido o si el archivo solicitado ha sido almacenado en búfer
con [Phar::startBuffering()](#phar.startbuffering) sin ser concluido con
[Phar::stopBuffering()](#phar.stopbuffering), y lanza una excepción
[PharException](#class.pharexception) si se ha encontrado algún problema durante
la fase de creación del archivo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       format, compression,
       y extension ahora son nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::convertToData()**



     Utilización de Phar::convertToData():

&lt;?php
try {
$tarphar = new Phar('monphar.phar.tar');
// note que monphar.phar.tar no es _eliminado_
// se convierte al formato de archivo tar no ejecutable
// crea monphar.tar
$tar = $tarphar-&gt;convertToData();
// se convierte al formato de archivo zip no ejecutable y crea monphar.zip
$zip = $tarphar-&gt;convertToData(Phar::ZIP);
// crea monphar.tbz
$tgz = $tarphar-&gt;convertToData(Phar::TAR, Phar::BZ2, '.tbz');
// crea monphar.phar.tgz
$phar = $tarphar-&gt;convertToData(Phar::PHAR); // lanza una excepción
} catch (Exception $e) {
// se manejan los errores aquí
}
?&gt;

### Ver también

    - [Phar::convertToExecutable()](#phar.converttoexecutable) - Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

    - [PharData::convertToExecutable()](#phardata.converttoexecutable) - Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable

    - [PharData::convertToData()](#phardata.converttodata) - Convierte un archivo phar en un archivo tar o zip no ejecutable

# Phar::convertToExecutable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::convertToExecutable — Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

### Descripción

public **Phar::convertToExecutable**([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Este método se utiliza para convertir un archivo phar a otro formato de archivo. Por ejemplo,
puede ser utilizado para crear un archivo phar basado en tar a partir de un archivo phar basado en zip
o a partir de un archivo phar ejecutable basado en el formato de archivo phar. Asimismo,
puede ser utilizado para aplicar una compresión global a un archivo basado en tar o en phar.

Si no se especifica ningún cambio, este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception).

En caso de éxito, el método crea un nuevo archivo en el disco y devuelve un objeto [Phar](#class.phar).
El archivo antiguo no es eliminado del disco, lo cual debe hacerse manualmente al final del procedimiento.

### Parámetros

     format


       Debe ser uno de los formatos Phar::PHAR, Phar::TAR,
       o Phar::ZIP. Si este argumento es **[null](#constant.null)**, el formato de archivo actual será
       conservado.






     compression


       Debe ser Phar::NONE para ninguna compresión global,
       Phar::GZ para una compresión basada en zlib y
       Phar::BZ2 para una compresión basada en bzip2.






     extension


       Este argumento se utiliza para sobrescribir la extensión por defecto de un archivo convertido.
       Cabe señalar que todos los archivos phar basados en zip o en tar deben contener
       .phar en su extensión para ser tratados como un archivo phar.




       Si se convierte a un archivo basado en phar, las extensiones por defecto son
       .phar, .phar.gz, o .phar.bz2
       según la compresión especificada. Para los archivos phar basados en tar, las extensiones
       por defecto son .phar.tar, .phar.tar.gz,
       y .phar.tar.bz2. Para los archivos phar basados en zip, la extensión por
       defecto es .phar.zip.





### Valores devueltos

El método devuelve un objeto [Phar](#class.phar) en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception) si no es
capaz de comprimir, si se ha especificado un método de compresión desconocido o si el archivo solicitado
ha sido almacenado en búfer con [Phar::startBuffering()](#phar.startbuffering) sin ser concluido con
[Phar::stopBuffering()](#phar.stopbuffering), lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el soporte de escritura ha sido desactivado y lanza una excepción [PharException](#class.pharexception) si
se ha encontrado algún problema durante la fase de creación del archivo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       format, compression,
       y extension ahora son nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::convertToExecutable()**



     Utilicemos Phar::convertToExecutable() :

&lt;?php
try {
$tarphar = new Phar('monphar.phar.tar');
    // se convierte al formato de archivo phar
    // note que monphar.phar.tar *no* es borrado
    $phar = $tarphar-&gt;convertToExecutable(Phar::PHAR); // crea monphar.phar
    $phar-&gt;setStub($phar-&gt;createDefaultStub('cli.php', 'web/index.php'));
// crea monphar.phar.tgz
$compressed = $phar-&gt;convertToExecutable(Phar::TAR, Phar::GZ, '.phar.tgz');
} catch (Exception $e) {
// se manejan los errores aquí
}
?&gt;

### Ver también

    - [Phar::convertToData()](#phar.converttodata) - Convierte un archivo phar en un fichero no ejecutable

    - [PharData::convertToExecutable()](#phardata.converttoexecutable) - Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable

    - [PharData::convertToData()](#phardata.converttodata) - Convierte un archivo phar en un archivo tar o zip no ejecutable

# Phar::copy

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::copy — Copia un fichero perteneciente a un archivo hacia otro fichero del mismo archivo

### Descripción

public **Phar::copy**([string](#language.types.string) $from, [string](#language.types.string) $to): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Copia un fichero perteneciente a un archivo hacia un nuevo
fichero del mismo archivo. Es una alternativa orientada a objetos
al uso de [copy()](#function.copy) con un flujo phar.

### Parámetros

     from








     to







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Levanta una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el fichero origen no existe, si el fichero destino ya existe,
si el acceso en escritura está desactivado, si abrir uno u otro
de los ficheros falla, si la lectura del fichero origen falla, o levanta
una excepción [PharException](#class.pharexception)
si la escritura de los cambios en el phar falla.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::copy()**



     Este ejemplo muestra cómo utilizar **Phar::copy()** y la comparación en términos
     de rendimiento con el equivalente utilizando el flujo phar. La diferencia principal entre
     los dos métodos concierne la gestión de errores. Todos los métodos Phar levantan excepciones,
     mientras que las funciones de flujo utilizan [trigger_error()](#function.trigger-error).

&lt;?php

try {
$phar = new Phar('monphar.phar');

    $phar['a'] = 'salut';
    $phar-&gt;copy('a', 'b');

    echo $phar['b']; // Muestra "phar://myphar.phar/b"

} catch (Exception $e) {
// Maneja los errores
}

// El equivalente en términos de flujo del código anterior
// se devuelven E_WARNING en lugar de excepciones
copy('phar://monphar.phar/a', 'phar//monphar.phar/c');
echo file_get_contents('phar://monphar.phar/c'); // Muestra "salut"

?&gt;

# Phar::count

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::count — Devuelve el número de entradas (ficheros) en el archivo Phar

### Descripción

public **Phar::count**([int](#language.types.integer) $mode = **[COUNT_NORMAL](#constant.count-normal)**): [int](#language.types.integer)

### Parámetros

    mode


      mode es un valor entero que especifica el modo de conteo a utilizar.
      Por omisión, se define como **[COUNT_NORMAL](#constant.count-normal)**,
      que solo cuenta el número de elementos en el archivo que no han sido eliminados o ocultados.
      Cuando se define como **[COUNT_RECURSIVE](#constant.count-recursive)**, cuenta todos los elementos del archivo,
      incluyendo aquellos que han sido eliminados o ocultados.


### Valores devueltos

El número de ficheros contenidos en el phar, o 0 (el número cero)
si no hay ninguno.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::count()**

&lt;?php
// se asegura de que el phar no exista
@unlink('lenouveauphar.phar');
try {
$p = new Phar(dirname(__FILE__) . '/lenouveauphar.phar', 0, 'le nouveauphar.phar');
} catch (Exception $e) {
    echo 'No puede crear el phar:', $e;
}
echo 'El nuevo phar tiene ' . $p-&gt;count() . " entradas\n";
$p['file.txt'] = 'salut';
echo 'El nuevo phar tiene ' . $p-&gt;count() . " entradas\n";
?&gt;

    El ejemplo anterior mostrará:

El nuevo phar tiene 0 entradas
El nuevo phar tiene 1 entradas

# Phar::createDefaultStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::createDefaultStub — Crea un contenedor de carga de un archivo Phar

### Descripción

final public static **Phar::createDefaultStub**([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [string](#language.types.string)

Este método está destinado a la creación de contenedores específicos del formato de archivo phar y no está
diseñado para ser utilizado con archivos phar basados en tar o zip.

Los archivos Phar contienen un cargador o contenedor escrito en PHP que se
ejecuta cuando el archivo es ejecutado ya sea mediante una inclusión

    &lt;?php

include 'monphar.phar';
?&gt;

o mediante una simple ejecución:

    php monphar.phar

Este método proporciona un medio simple y fácil de crear un contenedor que lanzará
un archivo de inicio desde el archivo phar. Además, se pueden especificar archivos diferentes
para ejecutar el archivo desde la línea de comandos o desde un servidor web. El contenedor de carga
llama entonces a [Phar::interceptFileFuncs()](#phar.interceptfilefuncs) para permitir el empaquetado fácil de
aplicaciones PHP que acceden al sistema de archivos. Si la extensión phar no está presente, el contenedor de carga
extraerá el archivo phar a un directorio temporal y tratará los archivos. Una función de apagado eliminará los
archivos temporales al final.

### Parámetros

     index


       Ruta relativa dentro del archivo phar a ejecutar en caso de acceso desde la línea de comandos






     webIndex


       Ruta relativa dentro del archivo phar a ejecutar en caso de acceso desde un navegador





### Valores devueltos

Devuelve un string que contiene un contenedor de carga personalizado
que permite que el archivo Phar creado funcione con o sin la extensión Phar
activada.

### Errores/Excepciones

Lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception) si uno de los argumentos es más largo
de 400 bytes.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       index y webIndex ahora son nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::createDefaultStub()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
    $phar-&gt;setStub($phar-&gt;createDefaultStub('cli.php', 'web/index.php'));
} catch (Exception $e) {
// trata los errores
}
?&gt;

### Ver también

    - [Phar::setStub()](#phar.setstub) - Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

    - [Phar::getStub()](#phar.getstub) - Retorna el cargador PHP o el contenedor de carga de un archivo Phar

# Phar::decompress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::decompress — Descomprime el archivo tar completo

### Descripción

public **Phar::decompress**([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Para los archivos phar basados en tar y en phar, este método descomprime el archivo completo.

Para los archivos phar basados en Zip, este método falla y lanza una excepción.
La extensión [zlib](#ref.zlib) debe estar activa para descomprimir
un archivo comprimido con gzip, y la extensión [bzip2](#ref.bzip2)
debe estar activa para descomprimir un archivo comprimido con bzip2.
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off
para que funcione.

Además, este método cambia automáticamente la extensión del archivo,
.phar
Por omisión para los archivos phar, o .phar.tar para los archivos phar basados en tar.
De lo contrario, se puede especificar una extensión de archivo utilizando el segundo
argumento.

### Parámetros

     extension


       Para descomprimir, las extensiones de archivo por omisión
       son .phar y .phar.tar.
       Utilice este argumento para especificar otra extensión de archivo.
       Cabe señalar que todos los archivos phar ejecutables deben contener .phar
       en su nombre de archivo.





### Valores devueltos

Se devuelve un objeto [Phar](#class.phar) en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Se lanza una excepción [BadMethodCallException](#class.badmethodcallexception) si
la variable INI [phar.readonly](#ini.phar.readonly)
está a on, si la extensión [zlib](#ref.zlib)
no está disponible, o si la extensión [bzip2](#ref.bzip2)
no está activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       extension ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::decompress()**

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar.gz');
$p['monfichero.txt'] = 'hola';
$p['monfichero.txt'] = 'hola';
$p3 = $p2-&gt;decompress(); // crea /ruta/al/mon.phar
?&gt;

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

# Phar::decompressFiles

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::decompressFiles — Descomprime todos los ficheros del archivo Phar actual

### Descripción

public **Phar::decompressFiles**(): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Para los archivos phar basados en tar, este método lanza una excepción
[BadMethodCallException](#class.badmethodcallexception), ya que la compresión individual de los ficheros
dentro de un archivo tar no es soportada por el formato de archivo. Utilice
[Phar::compress()](#phar.compress) para comprimir en un archivo phar basado en tar en su totalidad.

Para los archivos phar basados en Zip o en phar, este método descomprime todos los ficheros
del archivo Phar.
Las extensiones [zlib](#ref.zlib) o [bzip2](#ref.bzip2)
deben estar activadas para aprovechar esta funcionalidad si alguno de los ficheros
está comprimido utilizando la compresión bzip2/zlib.
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off
para que funcione.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Lanza una excepción [BadMethodCallException](#class.badmethodcallexception) si
la variable INI [phar.readonly](#ini.phar.readonly)
está a on, si la extensión [zlib](#ref.zlib) no está
disponible o si alguno de los ficheros está comprimido utilizando la compresión
bzip2 y la extensión [bzip2](#ref.bzip2) no está activada.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::decompressFiles()**

&lt;?php
$p = new Phar('/ruta/hacia/mon.phar', 0, 'mon.phar');
$p['monfichier.txt'] = 'hola';
$p['monfichier2.txt'] = 'hola';
$p-&gt;compressFiles(Phar::GZ);
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
$p-&gt;decompressFiles();
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
?&gt;

    El ejemplo anterior mostrará:

string(10) "monfichier.txt"
int(4096)
bool(false)
bool(true)
string(11) "monfichier2.txt"
int(4096)
bool(false)
bool(true)
string(10) "monfichier.txt"
bool(false)
bool(false)
bool(false)
string(11) "monfichier2.txt"
bool(false)
bool(false)
bool(false)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

# Phar::delMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

Phar::delMetadata — Elimina los metadatos globales del phar

### Descripción

public **Phar::delMetadata**(): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Elimina los metadatos globales del phar

### Parámetros

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) si ocurren errores durante
la escritura en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::delMetaData()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
    var_dump($phar-&gt;getMetadata());
$phar-&gt;setMetadata("salut");
    var_dump($phar-&gt;getMetadata());
$phar-&gt;delMetadata();
    var_dump($phar-&gt;getMetadata());
} catch (Exception $e) {
// manejo de errores
}
?&gt;

    El ejemplo anterior mostrará:

NULL
string(8) "salut"
NULL

### Ver también

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

# Phar::delete

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::delete — Elimina un fichero dentro de un archivo phar

### Descripción

public **Phar::delete**([string](#language.types.string) $localName): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Elimina un fichero dentro de un archivo phar. Es equivalente a la llamada
a [unlink()](#function.unlink) en un contexto de flujo, como se describe en el siguiente ejemplo...

### Parámetros

     localName


       Ruta del fichero a eliminar dentro del archivo.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) si se producen errores durante
la escritura en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::delete()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
$phar-&gt;delete('efface/moi.php');
// es equivalente a:
unlink('phar://monphar.phar/efface/moi.php');
} catch (Exception $e) {
// manejo de errores
}
?&gt;

### Ver también

    - [PharData::delete()](#phardata.delete) - Elimina un fichero dentro del archivo tar/zip

    - [Phar::unlinkArchive()](#phar.unlinkarchive) - Elimina completamente un archivo phar del disco y de la memoria

# Phar::\_\_destruct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::\_\_destruct — Destruye un objeto archivo Phar

### Descripción

public **Phar::\_\_destruct**()

### Parámetros

Esta función no contiene ningún parámetro.

# Phar::extractTo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::extractTo — Extrae el contenido de un archivo phar hacia un directorio

### Descripción

public **Phar::extractTo**([string](#language.types.string) $directory, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**, [bool](#language.types.boolean) $overwrite = **[false](#constant.false)**): [bool](#language.types.boolean)

Extrae todos los ficheros de un archivo phar hacia el disco. Los ficheros
y los directorios extraídos conservan los permisos de manera idéntica
a los del interior del archivo. Los parámetros opcionales permiten
controlar qué ficheros se extraen y si los ficheros ya existentes en el disco
pueden ser sobrescritos. El segundo parámetro files puede ser
el nombre de un fichero o directorio, o un array de nombres de ficheros y directorios
a extraer. Por omisión, este método no sobrescribe los ficheros existentes, el tercer
parámetro puede ser pasado a **[true](#constant.true)** para activar la sobrescritura de ficheros.
Este método es idéntico a [ZipArchive::extractTo()](#ziparchive.extractto).

### Parámetros

     directory


       Ruta de acceso hacia la cual extraer los ficheros files






     files


       El nombre de un fichero o directorio o un array de
       ficheros/directorios a extraer, **[null](#constant.null)** para ignorar este parámetro






     overwrite


       Pasarlo a **[true](#constant.true)** para activar la sobrescritura de ficheros existentes





### Valores devueltos

devuelve **[true](#constant.true)** en caso de éxito, pero es más seguro verificar
si se lanzan excepciones, y considerar que todo ha ido bien
si ninguna es lanzada.

### Errores/Excepciones

Lanza una excepción [PharException](#class.pharexception) si ocurren errores
durante la escritura en el disco.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::extractTo()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
$phar-&gt;extractTo('/chemin/complet'); // extrae todos los ficheros
$phar-&gt;extractTo('/autre/chemin', 'fichier.txt'); // extrae solo fichier.txt
$phar-&gt;extractTo('/ce/chemin',
array('fichier1.txt', 'fichier2.txt')); // extrae solo 2 ficheros
$phar-&gt;extractTo('/troisieme/chemin', null, true); // extrae todos los ficheros, sobrescribiendo
} catch (Exception $e) {
// maneja los errores
}
?&gt;

### Notas

**Nota**:

Los sistemas de archivos NTFS de Windows
no soportan ciertos caracteres en los nombres de archivo, como &lt;|&gt;\*?":. Los nombres de archivo con un punto
final no son soportados. A diferencia de algunas herramientas de extracción, este método no reemplaza estos caracteres con
un guión bajo, sino que falla al extraer tales archivos.

### Ver también

    - [PharData::extractTo()](#phardata.extractto) - Extrae el contenido de un archivo tar/zip hacia un directorio

# Phar::getAlias

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.1)

Phar::getAlias — Obtiene el alias para Phar

### Descripción

public **Phar::getAlias**(): [?](#language.types.null)[string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el alias o **[null](#constant.null)** si no hay alias.

# Phar::getMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::getMetadata — Devuelve las metadatos del archivo phar

### Descripción

public **Phar::getMetadata**([array](#language.types.array) $unserializeOptions = []): [mixed](#language.types.mixed)

Recupera las metadatos del archivo. Estas pueden ser cualquier variable PHP que pueda ser serializada.

**Precaución**

    Acceder a los metadatos activará la deserialización, lo que puede provocar
    la ejecución de código PHP arbitrario. No utilice esto en archivos phar
    no confiables ni configure unserializeOptions
    de forma segura.

### Parámetros

No se proporcionan parámetros.

### Valores devueltos

Cualquier variable PHP que pueda ser serializada y que se almacena como metadato del archivo Phar,
o **[null](#constant.null)** si no se almacenan metadatos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Se ha añadido el parámetro unserializeOptions.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::getMetadata()**

&lt;?php
// se asegura de que el phar no exista
@unlink('nouveauphar.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nouveauphar.phar', 0, 'nouveauphar.phar');
    $p['fichier.php'] = '&lt;?php echo "salut";';
    $p-&gt;setMetadata(array('bootstrap' =&gt; 'fichier.php'));
    var_dump($p-&gt;getMetadata());
} catch (Exception $e) {
echo 'No puede modificar el phar :', $e;
}
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["bootstrap"]=&gt;
string(8) "fichier.php"
}

### Ver también

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::delMetadata()](#phar.delmetadata) - Elimina los metadatos globales del phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

# Phar::getModified

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::getModified — Indica si el archivo phar ha sido modificado

### Descripción

public **Phar::getModified**(): [bool](#language.types.boolean)

Determina si un archivo phar ha tenido algún fichero interno
eliminado o si el contenido de un fichero ha cambiado
de alguna manera.

### Parámetros

No se admiten argumentos.

### Valores devueltos

**[true](#constant.true)** si el phar ha sido modificado desde su apertura, **[false](#constant.false)** en caso contrario.

# Phar::getPath

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

Phar::getPath — Obtiene la ruta de acceso absoluta del archivo Phar en el disco

### Descripción

public **Phar::getPath**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Phar::getSignature

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::getSignature — Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar

### Descripción

public **Phar::getSignature**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve la firma de verificación de un archivo phar en forma de un string hexadecimal.

### Parámetros

### Valores devueltos

Un array con la firma del archivo abierto con el hash como clave y
"MD5", "SHA-1", "SHA-256"
o "SHA-512" como hash_type. Esta firma es un hash
calculado a partir del contenido completo del archivo; puede ser utilizada para verificar
la integridad del archivo. Una firma válida es absolutamente requerida para todos los archivos phar
ejecutables si la variable INI [phar.require_hash](#ini.phar.require-hash) vale **[true](#constant.true)**.
Si no hay firma, la función devuelve **[false](#constant.false)**

# Phar::getStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::getStub — Retorna el cargador PHP o el contenedor de carga de un archivo Phar

### Descripción

public **Phar::getStub**(): [string](#language.types.string)

Los archivos phar contienen un cargador, o contenedor
(stub), escrito en PHP que se ejecuta
cuando el archivo mismo es ejecutado ya sea por inclusión:

    &lt;?php

include 'monphar.phar';
?&gt;

o por simple ejecución:

    php monphar.phar

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un string con el contenido del contenedor de carga
(stub) del archivo phar actual.

### Errores/Excepciones

Levanta una excepción [RuntimeException](#class.runtimeexception) si
no es posible leer el contenedor de carga del archivo Phar.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::getStub()**

&lt;?php
$p = new Phar('/ruta/versus/mon.phar', 0, 'mon.phar');
echo $p-&gt;getStub();
echo "==SIGUIENTE==\n";
$p-&gt;setStub("&lt;?php
function **autoload($class)
{
include 'phar://' . str*replace('*', '/', $class);
}
Phar::mapPhar('monphar.phar');
include 'phar://monphar.phar/inicio.php';
**HALT_COMPILER(); ?&gt;");
echo $p-&gt;getStub();
?&gt;

    El ejemplo anterior mostrará:

&lt;?php **HALT_COMPILER(); ?&gt;
==SIGUIENTE==
&lt;?php
function **autoload($class)
{
include 'phar://' . str*replace('*', '/', $class);
}
Phar::mapPhar('monphar.phar');
include 'phar://monphar.phar/inicio.php';
\_\_HALT_COMPILER(); ?&gt;

### Ver también

    - [Phar::setStub()](#phar.setstub) - Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

    - [Phar::createDefaultStub()](#phar.createdefaultstub) - Crea un contenedor de carga de un archivo Phar

# Phar::getSupportedCompression

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

Phar::getSupportedCompression — Devuelve un array de los algoritmos de compresión soportados

### Descripción

final public static **Phar::getSupportedCompression**(): [array](#language.types.array)

### Parámetros

No se admiten argumentos.

### Valores devueltos

Devuelve un array que contiene uno de los algoritmos Phar::GZ o
Phar::BZ2, según la disponibilidad de la extensión
[zlib](#book.zlib) o de la extensión
[bz2](#book.bzip2).

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

# Phar::getSupportedSignatures

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.1.0)

Phar::getSupportedSignatures — Devuelve un array de los tipos de firma soportados

### Descripción

final public static **Phar::getSupportedSignatures**(): [array](#language.types.array)

Devuelve un array de los tipos de firma soportados

### Parámetros

No se admiten argumentos.

### Valores devueltos

Devuelve un array que contiene uno o más de los tipos MD5, SHA-1, SHA-256, SHA-512.

### Ver también

    - [Phar::getSignature()](#phar.getsignature) - Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar

    - [Phar::setSignatureAlgorithm()](#phar.setsignaturealgorithm) - Establece y aplica el algoritmo de firma de un phar

# Phar::getVersion

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::getVersion — Devuelve las informaciones de versión del archivo Phar

### Descripción

public **Phar::getVersion**(): [string](#language.types.string)

Devuelve la versión de la API de un archivo Phar abierto.

### Parámetros

### Valores devueltos

La versión de la API del archivo abierto. No debe confundirse con la versión de API
que la extensión phar cargada utilizará para crear nuevos archivos phar.
Cada archivo Phar tiene la versión de API codificada de forma fija en su manifiesto. Para más
información, consulte [el formato de archivo Phar](#phar.fileformat).

### Ver también

    - [Phar::apiVersion()](#phar.apiversion) - Devuelve la versión de la API

# Phar::hasMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

Phar::hasMetadata — Determina si el phar contiene o no metadatos

### Descripción

public **Phar::hasMetadata**(): [bool](#language.types.boolean)

Determina si el phar contiene o no metadatos.

### Parámetros

No se admiten argumentos.

### Valores devueltos

Devuelve **[true](#constant.true)** si están presentes metadatos, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::hasMetadata()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
    var_dump($phar-&gt;hasMetadata());
$phar-&gt;setMetadata(array('deschoses' =&gt; 'salut'));
    var_dump($phar-&gt;hasMetadata());
$phar-&gt;delMetadata();
    var_dump($phar-&gt;hasMetadata());
} catch (Exception $e) {
// manejo de errores
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)
bool(false)

### Ver también

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::delMetadata()](#phar.delmetadata) - Elimina los metadatos globales del phar

# Phar::interceptFileFuncs

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::interceptFileFuncs — Indica a phar que debe interceptar las funciones de archivos

### Descripción

final public static **Phar::interceptFileFuncs**(): [void](language.types.void.html)

Indica a phar que debe interceptar [fopen()](#function.fopen), [readfile()](#function.readfile),
[file_get_contents()](#function.file-get-contents), [opendir()](#function.opendir) y todas las funciones
relativas a stat. Si cualquiera de estas funciones es llamada desde el archivo phar
con una ruta relativa, la llamada es modificada para acceder a un archivo dentro del archivo.
Las rutas absolutas se asumen como intentos de carga de archivos externos
desde el sistema de archivos.

Esta función permite la ejecución de aplicaciones PHP diseñadas
para ser lanzadas fuera de un disco duro, como aplicación phar.

### Parámetros

No se proporcionan argumentos.

### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::interceptFileFuncs()**

&lt;?php
Phar::interceptFileFuncs();
include 'phar://' . **FILE** . '/fichero.php';
?&gt;

Suponiendo que este phar se llama /ruta/hacia/monphar.phar y contiene
fichero.php y
fichero2.txt, si fichero.php contiene este código:

    **Ejemplo #2 Un ejemplo con Phar::interceptFileFuncs()**

&lt;?php
echo file_get_contents('fichero2.txt');
?&gt;

Normalmente, PHP buscaría en el directorio actual el archivo llamado file2.txt,
es decir, en el directorio de fichero.php o el directorio actual del usuario de la línea
de comandos. **Phar::interceptFileFuncs()** indica
a PHP que considere phar:///ruta/hacia/monphar.phar/ como directorio actual
y así abre en el ejemplo anterior el archivo phar:///ruta/hacia/monphar.phar/fichero2.txt.

# Phar::isBuffering

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::isBuffering — Determina si las operaciones de escritura de Phar están en búfer o se escriben directamente en el disco

### Descripción

public **Phar::isBuffering**(): [bool](#language.types.boolean)

Este método puede ser utilizado para determinar si un Phar guardará sus cambios
inmediatamente en el disco o si es necesario un llamado a la función [Phar::stopBuffering()](#phar.stopbuffering)
para escribir las modificaciones.

El búfer de escritura de Phar se realiza por archivo; el búfer del archivo Phar
foo.phar no afecta en nada los cambios realizados en el archivo Phar
bar.phar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si las operaciones de escritura están en búfer,
**[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::isBuffering()**

&lt;?php
$p = new Phar(dirname(__FILE__) . '/nouveauphar.phar', 0, 'nouveauphar.phar');
$p2 = new Phar('pharexistant.phar');
$p['fichier1.txt'] = 'salut';
var_dump($p-&gt;isBuffering());
var_dump($p2-&gt;isBuffering());
?&gt;
=2=
&lt;?php
$p-&gt;startBuffering();
var_dump($p-&gt;isBuffering());
var_dump($p2-&gt;isBuffering());
$p-&gt;stopBuffering();
?&gt;
=3=
&lt;?php
var_dump($p-&gt;isBuffering());
var_dump($p2-&gt;isBuffering());
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(false)
=2=
bool(true)
bool(false)
=3=
bool(false)
bool(false)

### Ver también

    - [Phar::startBuffering()](#phar.startbuffering) - Inicia el almacenamiento en búfer de escrituras Phar, sin modificar el objeto Phar en el disco

    - [Phar::stopBuffering()](#phar.stopbuffering) - Detiene el almacenamiento en búfer de las escrituras Phar y provoca la escritura en el disco

# Phar::isCompressed

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::isCompressed — Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

### Descripción

public **Phar::isCompressed**(): [int](#language.types.integer)|[false](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido
(.tar.gz/tar.bz, etc). Los archivos phar basados en Zip no pueden
ser comprimidos como archivo, y este método siempre devolverá **[false](#constant.false)**
si se consulta un archivo phar basado en Zip.

### Parámetros

No se admiten argumentos.

### Valores devueltos

Phar::GZ, Phar::BZ2 o **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::isCompressed()**

&lt;?php
try {
$phar1 = new Phar('monphar.zip.phar');
    var_dump($phar1-&gt;isCompressed());
$phar2 = new Phar('monpharnoncompresse.tar.phar');
    var_dump($phar2-&gt;isCompressed());
$phar2-&gt;compress(Phar::GZ);
    var_dump($phar2-&gt;isCompressed() == Phar::GZ);
} catch (Exception $e) {
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(false)
bool(true)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

# Phar::isFileFormat

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::isFileFormat — Retorna **[true](#constant.true)** si el archivo phar está basado en el formato de archivo tar/phar/zip según el argumento

### Descripción

public **Phar::isFileFormat**([int](#language.types.integer) $format): [bool](#language.types.boolean)

### Parámetros

     format


       Puede ser Phar::PHAR, Phar::TAR o
       Phar::ZIP para probar el formato de archivo del archivo.





### Valores devueltos

Retorna **[true](#constant.true)** si el archivo phar utiliza el formato de archivo especificado en el argumento

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception) si el argumento es un formato de archivo desconocido.

### Ver también

    - [Phar::convertToExecutable()](#phar.converttoexecutable) - Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

    - [Phar::convertToData()](#phar.converttodata) - Convierte un archivo phar en un fichero no ejecutable

# Phar::isValidPharFilename

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

Phar::isValidPharFilename — Determina si el nombre de fichero especificado es un nombre de fichero válido para un archivo phar

### Descripción

final public static **Phar::isValidPharFilename**([string](#language.types.string) $filename, [bool](#language.types.boolean) $executable = **[true](#constant.true)**): [bool](#language.types.boolean)

Determina si el nombre de fichero especificado es un nombre de fichero válido para un archivo phar, que será
reconocido como tal por la extensión phar. Esto puede ser utilizado para probar un nombre sin tener
que instanciar un archivo phar y atrapar la inevitable Exception que será lanzada si se especifica un nombre de fichero
no válido.

### Parámetros

     filename


       El nombre o la ruta completa hacia un archivo phar no creado aún






     executable


       Este argumento determina si el nombre de fichero debe ser tratado como el
       de un archivo phar ejecutable o como un archivo de datos no ejecutable.





### Valores devueltos

Devuelve **[true](#constant.true)** si el nombre de fichero es válido, **[false](#constant.false)** en caso contrario.

# Phar::isWritable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::isWritable — Retorna **[true](#constant.true)** si el archivo phar puede ser modificado

### Descripción

public **Phar::isWritable**(): [bool](#language.types.boolean)

Este método retorna **[true](#constant.true)** si phar.readonly está en 0
y el archivo phar actual en el disco no es de solo lectura.

### Parámetros

No se admiten argumentos.

### Valores devueltos

Retorna **[true](#constant.true)** si el archivo phar puede ser modificado

### Ver también

    - [Phar::canWrite()](#phar.canwrite) - Determina si la extensión phar soporta la creación y escritura de archivos phar

    - [PharData::isWritable()](#phardata.iswritable) - Verifica si el archivo tar/zip puede ser modificado

# Phar::loadPhar

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::loadPhar — Carga cualquier archivo phar con un alias

### Descripción

final public static **Phar::loadPhar**([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**): [bool](#language.types.boolean)

Este método puede ser utilizado para leer el contenido de un archivo Phar externo. Esto es
principalmente útil para asignar un alias a un phar de tal forma que las referencias posteriores
al phar puedan realizarse mediante un alias más corto o para cargar archivos Phar
que contienen solo datos y que no están destinados a ser ejecutados/incluidos en scripts PHP.

### Parámetros

     filename


       la ruta relativa o absoluta hacia el archivo phar a abrir






     alias


       El alias que podrá ser utilizado para referirse al archivo phar. Tenga en cuenta que
       muchos archivos phar especifican un alias explícito dentro del archivo phar,
       y se lanzará una excepción [PharException](#class.pharexception) si se especifica un nuevo alias
       en este caso.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception)
si se pasa un alias mientras que el archivo phar ya tiene un alias explícito

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::loadPhar()**



     Phar::loadPhar puede ser utilizada en cualquier lugar para cargar
     un archivo phar externo mientras que Phar::mapPhar debe ser
     utilizada en un contenedor de carga para un Phar.

&lt;?php
try {
Phar::loadPhar('/ruta/al/phar.phar', 'mi.phar');
echo file_get_contents('phar://mi.phar/fichero.txt');
} catch (PharException $e) {
echo $e;
}
?&gt;

### Ver también

    - [Phar::mapPhar()](#phar.mapphar) - Lee el phar ejecutado y carga su manifiesto

# Phar::mapPhar

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::mapPhar — Lee el phar ejecutado y carga su manifiesto

### Descripción

final public static **Phar::mapPhar**([?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**, [int](#language.types.integer) $offset = 0): [bool](#language.types.boolean)

Este método estático puede ser utilizado únicamente dentro del contenedor de carga
de un archivo Phar para inicializar el phar cuando es ejecutado directamente o cuando
es incluido en otro script.

### Parámetros

     alias


       El alias que puede ser utilizado en la URL phar:// para referirse
       al archivo en lugar de utilizar su ruta completa.






     offset


       Variable no utilizada, presente por motivos de compatibilidad
       con la biblioteca PHP_Archive de PEAR.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception) si el método no es llamado
directamente dentro de la ejecución de PHP, si no se encuentra ningún token \_\_HALT_COMPILER(); en el
archivo fuente actual o si el archivo no puede ser abierto en lectura.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::mapPhar()**



     mapPhar debe ser utilizado únicamente dentro del contenedor de carga de un phar. Utilice
     loadPhar para cargar un phar externo en memoria.




     A continuación se muestra un ejemplo de contenedor de carga Phar que utiliza mapPhar.

&lt;?php
function **autoload($class)
{
include 'phar://mon.phar/' . str*replace('*', '/', $class) . '.php';
}
try {
Phar::mapPhar('mon.phar');
include 'phar://mon.phar/demarrage.php';
} catch (PharException $e) {
echo $e-&gt;getMessage();
die('No puede inicializar el Phar');
}
**HALT_COMPILER();

### Ver también

    - [Phar::loadPhar()](#phar.loadphar) - Carga cualquier archivo phar con un alias

# Phar::mount

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::mount — Monta un camino o un fichero externo a una ubicación virtual dentro del archivo phar

### Descripción

final public static **Phar::mount**([string](#language.types.string) $pharPath, [string](#language.types.string) $externalPath): [void](language.types.void.html)

Al igual que el concepto unix de montar un dispositivo externo en un punto de la jerarquía,
**Phar::mount()** permite referirse a ficheros y directorios externos
como si estuvieran dentro del archivo.

### Parámetros

     pharPath


       El camino interno dentro del archivo phar a utilizar
       como punto de montaje. Debe ser un camino relativo
       dentro del archivo phar, y no debe existir ya.






     externalPath


       Un camino o URL hacia un fichero o directorio externo a montar dentro del archivo





### Valores devueltos

No devuelve valor. Se lanza una excepción [PharException](#class.pharexception) en caso de fallo.

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception) si se encuentra un problema durante el montaje.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::mount()**



     El siguiente ejemplo muestra el acceso a un fichero de configuración externo como si fuera
     un camino dentro del archivo phar.




     Primero, el código dentro del archivo phar:

&lt;?php
$configuration = simplexml_load_string(file_get_contents(
Phar::running(false) . '/config.xml'));
?&gt;

     Luego el código externo utilizado para montar el fichero de configuración:

&lt;?php
// se comienza configurando la asociación entre el fichero config.xml abstracto
// y el que está en el disco
Phar::mount('phar://config.xml', '/home/example/config.xml');
// ahora se lanza la aplicación
include '/ruta/al/archivo.phar';
?&gt;

     Otro método es colocar el código de montaje dentro del contenedor de carga del archivo phar.
     Aquí hay un ejemplo para configurar un fichero de configuración por defecto si no se hace ninguna configuración de usuario:

&lt;?php
// se comienza configurando la asociación entre el fichero config.xml abstracto
// y el que está en el disco
if (defined('EXTERNAL_CONFIG')) {
Phar::mount('config.xml', EXTERNAL_CONFIG);
if (file_exists(**DIR** . '/extra_config.xml')) {
Phar::mount('extra.xml', **DIR** . '/extra_config.xml');
}
} else {
Phar::mount('config.xml', 'phar://' . **FILE** . '/default_config.xml');
Phar::mount('extra.xml', 'phar://' . **FILE** . '/default_extra.xml');
}
// ahora se lanza la aplicación
include 'phar://' . **FILE** . '/index.php';
\_\_HALT_COMPILER();
?&gt;

     ... y el código externo para cargar este archivo phar:

&lt;?php
define('EXTERNAL_CONFIG', '/home/ejemplo/config.xml');
// ahora se lanza la aplicación
include '/ruta/al/archivo.phar';
?&gt;

# Phar::mungServer

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::mungServer — Define una lista de un máximo de 4 variables $\_SERVER que deben ser modificadas durante la ejecución

### Descripción

final public static **Phar::mungServer**([array](#language.types.array) $variables): [void](language.types.void.html)

**Phar::mungServer()** debe ser llamada solo en el contenedor de carga
de un archivo phar.

Define una lista de un máximo de 4 variables [$\_SERVER](#reserved.variables.server) que deben ser modificadas
durante la ejecución.
Las variables que pueden ser modificadas para borrar los rastros de la ejecución phar son
REQUEST_URI, PHP_SELF,
SCRIPT_NAME y SCRIPT_FILENAME.

Por sí sola, esta método no hace nada. Toma efecto solo cuando se combina con
[Phar::webPhar()](#phar.webphar) y solo si el archivo solicitado es un archivo PHP
a parsear. Tenga en cuenta que las variables PATH_INFO y
PATH_TRANSLATED siempre son modificadas.

Los valores iniciales de las variables que son modificadas son almacenados en el array SERVER
con el prefijo PHAR\_ y por ejemplo
SCRIPT_NAME será almacenada como PHAR_SCRIPT_NAME.

### Parámetros

     variables


       un array que contiene cualquiera de estas strings.
       REQUEST_URI, PHP_SELF,
       SCRIPT_NAME y SCRIPT_FILENAME como
       índices de strings. Otros valores desencadenan una excepción
       y **Phar::mungServer()** es sensible a mayúsculas/minúsculas.





### Valores devueltos

No devuelve ningún valor.

### Errores/Excepciones

Levanta una excepción [UnexpectedValueException](#class.unexpectedvalueexception) si se encuentra
algún problema en los datos pasados.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::mungServer()**

&lt;?php
// ejemplo de contenedor
Phar::mungServer(array('REQUEST_URI'));
Phar::webPhar();
\_\_HALT_COMPILER();
?&gt;

### Ver también

    - [Phar::webPhar()](#phar.webphar) - Redirige una solicitud desde un navegador web a un fichero interno en el archivo phar

    - [Phar::setStub()](#phar.setstub) - Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

# Phar::offsetExists

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::offsetExists — Determina si un fichero existe en el phar

### Descripción

public **Phar::offsetExists**([string](#language.types.string) $localName): [bool](#language.types.boolean)

Es una implementación de la interfaz [ArrayAccess](#class.arrayaccess) que permite
la manipulación directa del contenido de un archivo Phar utilizando los corchetes de acceso al array.

offsetExists() es llamado como [isset()](#function.isset) es llamado.

### Parámetros

     localName


       El nombre de fichero (en ruta relativa) a buscar en el Phar.





### Valores devueltos

Devuelve **[true](#constant.true)** si el fichero existe en el phar, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::offsetExists()**

&lt;?php
$p = new Phar(dirname(__FILE__) . '/mon.phar', 0, 'mon.phar');
$p['premierfichier.txt'] = 'premier fichier';
$p['secondfichier.txt'] = 'second fichier';
// las líneas siguientes hacen uso de offsetExists() de forma indirecta
var_dump(isset($p['premierfichier.txt']));
var_dump(isset($p['pasla.txt']));
?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

### Ver también

    - [Phar::offsetGet()](#phar.offsetget) - Obtiene un objeto PharFileInfo a partir de un fichero

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

    - [Phar::offsetUnset()](#phar.offsetunset) - Elimina un fichero de un phar

# Phar::offsetGet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::offsetGet — Obtiene un objeto [PharFileInfo](#class.pharfileinfo) a partir de un fichero

### Descripción

public **Phar::offsetGet**([string](#language.types.string) $localName): [SplFileInfo](#class.splfileinfo)

Esta es una implementación de la interfaz
[ArrayAccess](#class.arrayaccess) que permite
la manipulación directa del contenido de un archivo Phar
utilizando los corchetes de acceso a array.
**Phar::offsetGet()** se utiliza para
extraer ficheros de un archivo Phar.

### Parámetros

     localName


       El nombre de fichero (en ruta relativa) a buscar en el Phar.





### Valores devueltos

Se devuelve un objeto [PharFileInfo](#class.pharfileinfo) que
puede ser utilizado para integrar el contenido de un fichero o para
recuperar información sobre el fichero actual.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception)
si el fichero no existe en el archivo Phar.

### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::offsetGet()**



     Al igual que con todas las clases que implementan la interfaz
     [ArrayAccess](#class.arrayaccess), **Phar::offsetGet()**
     es llamada automáticamente cuando se utilizan los corchetes de acceso a array
     ([]).

&lt;?php
$p = new Phar(dirname(__FILE__) . '/monphar.phar', 0, 'monphar.phar');
$p['existe.txt'] = "el fichero existe\n";
try {
// llama automáticamente a offsetGet()
echo $p['existe.txt'];
echo $p['nexistepas.txt'];
} catch (BadMethodCallException $e) {
echo $e;
}
?&gt;

    El ejemplo anterior mostrará:

el fichero existe
Entry nexistepas.txt does not exist

### Ver también

    - [Phar::offsetExists()](#phar.offsetexists) - Determina si un fichero existe en el phar

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

    - [Phar::offsetUnset()](#phar.offsetunset) - Elimina un fichero de un phar

# Phar::offsetSet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::offsetSet — Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

### Descripción

public **Phar::offsetSet**([string](#language.types.string) $localName, [resource](#language.types.resource)|[string](#language.types.string) $value): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Es una implementación de la interfaz [ArrayAccess](#class.arrayaccess) que permite
la manipulación directa del contenido de un archivo Phar utilizando los corchetes de acceso al array.
offsetSet se utiliza para modificar un fichero existente o para añadir un nuevo fichero al archivo Phar.

### Parámetros

     localName


       El nombre del fichero (en ruta relativa) a buscar en el Phar.






     value


       Contenido del fichero.





### Valores devueltos

No se devuelve ningún valor.

### Errores/Excepciones

Si [phar.readonly](#ini.phar.readonly) está a 1,
se lanza una excepción [BadMethodCallException](#class.badmethodcallexception), ya que modificar un Phar solo es
permitido cuando phar.readonly está a 0. Se lanza una excepción
[PharException](#class.pharexception) si ha habido un problema al escribir los cambios del archivo Phar en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::offsetSet()**



     offsetSet no debe ser accedido directamente, sino a través del operador de acceso al array, [].

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
try {
// llama a offsetSet
$p['fichero.txt'] = 'Hola';
} catch (Exception $e) {
echo 'No puede modificar fichero.txt:', $e;
}
?&gt;

### Notas

**Nota**:

[Phar::addFile()](#phar.addfile), [Phar::addFromString()](#phar.addfromstring) y **Phar::offsetSet()**
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[Phar::buildFromDirectory()](#phar.buildfromdirectory) o [Phar::buildFromIterator()](#phar.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [Phar::offsetExists()](#phar.offsetexists) - Determina si un fichero existe en el phar

    - [Phar::offsetGet()](#phar.offsetget) - Obtiene un objeto PharFileInfo a partir de un fichero

    - [Phar::offsetUnset()](#phar.offsetunset) - Elimina un fichero de un phar

# Phar::offsetUnset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::offsetUnset — Elimina un fichero de un phar

### Descripción

public **Phar::offsetUnset**([string](#language.types.string) $localName): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Esta es una implementación de la interfaz [ArrayAccess](#class.arrayaccess) que permite
la manipulación directa del contenido de un archivo Phar utilizando los corchetes de acceso al array.
offsetUnset se utiliza para eliminar un fichero existente y es llamado por la función [unset()](#function.unset).

### Parámetros

     localName


       El nombre del fichero (en ruta relativa) a buscar en el Phar.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Si [phar.readonly](#ini.phar.readonly) está a 1,
se lanza una excepción [BadMethodCallException](#class.badmethodcallexception), ya que modificar un Phar solo es
permitido cuando phar.readonly está a 0. Se lanza una excepción
[PharException](#class.pharexception) si ha habido un problema al escribir los cambios del archivo Phar en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::offsetUnset()**

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
try {
    // elimina archivo.txt de mon.phar llamando a offsetUnset
    unset($p['archivo.txt']);
} catch (Exception $e) {
echo 'No se puede eliminar archivo.txt: ', $e;
}
?&gt;

### Ver también

    - [Phar::offsetExists()](#phar.offsetexists) - Determina si un fichero existe en el phar

    - [Phar::offsetGet()](#phar.offsetget) - Obtiene un objeto PharFileInfo a partir de un fichero

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

    - [Phar::unlinkArchive()](#phar.unlinkarchive) - Elimina completamente un archivo phar del disco y de la memoria

    - [Phar::delete()](#phar.delete) - Elimina un fichero dentro de un archivo phar

# Phar::running

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::running — Devuelve la ruta completa en el disco o la URL phar completa del archivo phar actualmente ejecutado

### Descripción

final public static **Phar::running**([bool](#language.types.boolean) $returnPhar = **[true](#constant.true)**): [string](#language.types.string)

Devuelve la ruta completa del archivo phar ejecutado. Esto es utilizado de manera similar
a la constante mágica **FILE** y tiene efectos únicamente dentro de un archivo phar
que está siendo ejecutado.

Dentro de un contenedor de carga de un archivo, **Phar::running()** devuelve
"". Utilice simplemente **[**FILE**](#constant.file)**
para acceder al phar actual dentro de un contenedor de carga.

### Parámetros

     returnPhar


       Si **[false](#constant.false)**, se devuelve la ruta completa en el disco hacia el phar.
       Si **[true](#constant.true)**, se devuelve una URL phar completa.





### Valores devueltos

Devuelve la ruta del fichero si es válida, de lo contrario una cadena vacía.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::running()**



     Para el ejemplo siguiente, se asume que el archivo phar es
     /ruta/al/archivo.phar.

&lt;?php
$a = Phar::running(); // $a vale "phar:///ruta/al/archivo.phar"
$b = Phar::running(false); // $b vale "/ruta/al/archivo.phar"
?&gt;

# Phar::setAlias

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.1)

Phar::setAlias — Establece el alias del archivo Phar

### Descripción

public **Phar::setAlias**([string](#language.types.string) $alias): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Establece el alias del archivo Phar y lo escribe como alias permanente de este archivo phar.
Un alias puede ser utilizado dentro de un archivo phar para asegurar que el uso del flujo
phar para acceder a ficheros internos funcione siempre independientemente
de la ubicación del archivo phar en el sistema de ficheros. Una alternativa consiste en confiar
en la intercepción de [include](#function.include)
realizada por Phar o en utilizar [Phar::interceptFileFuncs()](#phar.interceptfilefuncs)
y usar rutas relativas.

### Parámetros

     alias


       Una pequeña cadena con la que se referirá a este archivo durante los accesos con el flujo
       phar.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception) cuando el acceso
en escritura está desactivado y se lanza una excepción [PharException](#class.pharexception) si el alias
ya está en uso o si se ha encontrado un problema al escribir los cambios en el disco.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **Phar::setAlias()**
       ahora tiene un tipo de retorno provisional de tipo [true](#language.types.singleton).



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::setAlias()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
$phar-&gt;setAlias('monp.phar');
} catch (Exception $e) {
// trata los errores
}
?&gt;

### Ver también

    - [Phar::__construct()](#phar.construct) - Construye un objeto de archivo Phar

    - [Phar::interceptFileFuncs()](#phar.interceptfilefuncs) - Indica a phar que debe interceptar las funciones de archivos

# Phar::setDefaultStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::setDefaultStub — Utilizado para establecer el cargador PHP o el contenedor de carga de un archivo Phar como cargador por defecto

### Descripción

public **Phar::setDefaultStub**([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Este método es un atajo que combina las funcionalidades de
[Phar::createDefaultStub()](#phar.createdefaultstub) y [Phar::setStub()](#phar.setstub).

### Parámetros

     index


       Ruta relativa dentro del archivo phar a ejecutar si se lanza desde la línea de comandos






     webIndex


       Ruta relativa dentro del archivo phar a ejecutar si se lanza desde un navegador





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception) si
[phar.readonly](#ini.phar.readonly) está activada
en el php.ini.
Se lanza una excepción [PharException](#class.pharexception) si se encuentran problemas al
escribir los cambios en el disco.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **Phar::setDefaultStub()**
       ahora tiene un tipo de retorno provisional de [true](#language.types.singleton).




      8.0.0

       webIndex ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::setDefaultStub()**

&lt;?php
try {
$phar = new Phar('monphar.phar');
    $phar-&gt;setDefaultStub('cli.php', 'web/index.php');
    // es equivalente a:
    // $phar-&gt;setStub($phar-&gt;createDefaultStub('cli.php', 'web/index.php'));
} catch (Exception $e) {
// manejo de errores
}
?&gt;

### Ver también

    - [Phar::setStub()](#phar.setstub) - Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

    - [Phar::createDefaultStub()](#phar.createdefaultstub) - Crea un contenedor de carga de un archivo Phar

# Phar::setMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::setMetadata — Establece las metadatos del archivo phar

### Descripción

public **Phar::setMetadata**([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

**Phar::setMetadata()** debe ser utilizada para almacenar datos personalizados
que describen el archivo phar, como una entidad separada.
[PharFileInfo::setMetadata()](#pharfileinfo.setmetadata) debe ser utilizada para las metadatos específicas de los ficheros.
Las metadatos pueden disminuir el rendimiento de carga de un archivo phar si los datos son grandes.

Un uso posible de las metadatos es la especificación
de los ficheros a utilizar dentro del archivo para ejecutarlo,
o la ubicación de un fichero de manifiesto como el fichero package.xml
de [» PEAR](https://pear.php.net/).
En general, cualquier dato útil que describa el archivo phar puede ser almacenado.

### Parámetros

     metadata


       Cualquier variable PHP que contenga información a almacenar y que
       describa el archivo phar





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::setMetadata()**

&lt;?php
// se asegura de que el phar no exista ya
@unlink('nuevo.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nuevo.phar', 0, 'nuevo.phar');
    $p['fichero.php'] = '&lt;?php echo "hola"';
    $p-&gt;setMetadata(array('cargador' =&gt; 'fichero.php'));
    var_dump($p-&gt;getMetadata());
} catch (Exception $e) {
echo 'No puede crear/modificar el phar :', $e;
}
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["cargador"]=&gt;
string(11) "fichero.php"
}

### Ver también

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

    - [Phar::delMetadata()](#phar.delmetadata) - Elimina los metadatos globales del phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

# Phar::setSignatureAlgorithm

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.1.0)

Phar::setSignatureAlgorithm — Establece y aplica el algoritmo de firma de un phar

### Descripción

public **Phar::setSignatureAlgorithm**([int](#language.types.integer) $algo, [?](#language.types.null)[string](#language.types.string) $privateKey = **[null](#constant.null)**): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Establece y aplica el algoritmo de firma de un phar. El algoritmo de firma debe ser
Phar::MD5, Phar::SHA1, Phar::SHA256,
Phar::SHA512, o Phar::OPENSSL.

Tenga en cuenta que todas las archives phar ejecutables tienen
una firma creada automáticamente, SHA1 por omisión.
Las archives de datos basadas en tar o en zip (creadas con la clase
[PharData](#class.phardata)) deben tener su firma creada y
asignada explícitamente mediante **Phar::setSignatureAlgorithm()**.

### Parámetros

     algo


       Uno de los algoritmos Phar::MD5,
       Phar::SHA1, Phar::SHA256,
       Phar::SHA512, o Phar::OPENSSL






     privateKey


       El contenido de una clave privada OpenSSL, tal como se extrae de un
       certificado o de un archivo de clave OpenSSL:


&lt;?php
$private = openssl_get_privatekey(file_get_contents('private.pem'));
$pkey = '';
openssl_pkey_export($private, $pkey);
$p-&gt;setSignatureAlgorithm(Phar::OPENSSL, $pkey);
?&gt;

       Consulte
       [la introducción de phar](#phar.using)
       para las instrucciones de nombramiento y ubicación del
       archivo de clave pública.



### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Genera una excepción [UnexpectedValueException](#class.unexpectedvalueexception) para muchos errores
y una excepción [PharException](#class.pharexception) si ocurren problemas
durante la escritura de los cambios en el disco.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       privateKey ahora es nullable.



### Ver también

    - [Phar::getSupportedSignatures()](#phar.getsupportedsignatures) - Devuelve un array de los tipos de firma soportados

    - [Phar::getSignature()](#phar.getsignature) - Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar

# Phar::setStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::setStub — Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

### Descripción

public **Phar::setStub**([resource](#language.types.resource)|[string](#language.types.string) $stub, [int](#language.types.integer) $length = -1): [bool](#language.types.boolean)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Este método se utiliza para añadir un cargador PHP a un nuevo archivo Phar, o
para reemplazar el contenedor de carga de un archivo Phar existente.

El contenedor de carga de un archivo Phar se utiliza cuando un archivo es incluido directamente
como en este ejemplo:

&lt;?php
include 'monphar.phar';
?&gt;

El cargador no se utiliza cuando un fichero es incluido a través del flujo phar
como esto:

&lt;?php
include 'phar://monphar.phar/unfchier.php';
?&gt;

### Parámetros

     stub


       Una cadena o un [resource](#language.types.resource) de flujo abierto a utilizar
       como contenedor ejecutable para este archivo phar.






     length








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Una excepción [UnexpectedValueException](#class.unexpectedvalueexception) es lanzada si
[phar.readonly](#ini.phar.readonly) está activado en
el php.ini.
Una excepción [PharException](#class.pharexception) es lanzada si se encuentran problemas al
escribir los cambios en el disco.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a **Phar::setStub()** con una
       [resource](#language.types.resource) y una length
       ahora está obsoleto. Tales llamadas deberían ser reemplazadas por:
       $phar-&gt;setStub(stream_get_contents($resource));



### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::setStub()**

&lt;?php
try {
$p = new Phar(dirname(__FILE__) . '/nouveau.phar', 0, 'nouveau.phar');
    $p['a.php'] = '&lt;?php var_dump("Salut");';
    $p-&gt;setStub('&lt;?php var_dump("Premier"); Phar::mapPhar("nouveau.phar"); __HALT_COMPILER(); ?&gt;');
    include 'phar://nouveau.phar/a.php';
    var_dump($p-&gt;getStub());
$p['b.php'] = '&lt;?php var_dump("Tout le monde");';
    $p-&gt;setStub('&lt;?php var_dump("Second"); Phar::mapPhar("nouveau.phar"); __HALT_COMPILER(); ?&gt;');
    include 'phar://nouveau.phar/b.php';
    var_dump($p-&gt;getStub());
} catch (Exception $e) {
echo 'Error al escribir nuevo.phar: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

string(5) "Salut"
string(79) "&lt;?php var_dump("Premier"); Phar::mapPhar("nouveau.phar"); **HALT_COMPILER(); ?&gt;"
string(13) "Tout le monde"
string(78) "&lt;?php var_dump("Second"); Phar::mapPhar("nouveau.phar"); **HALT_COMPILER(); ?&gt;"

### Ver también

    - [Phar::getStub()](#phar.getstub) - Retorna el cargador PHP o el contenedor de carga de un archivo Phar

    - [Phar::createDefaultStub()](#phar.createdefaultstub) - Crea un contenedor de carga de un archivo Phar

# Phar::startBuffering

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::startBuffering — Inicia el almacenamiento en búfer de escrituras Phar, sin modificar el objeto Phar en el disco

### Descripción

public **Phar::startBuffering**(): [void](language.types.void.html)

Aunque técnicamente innecesario, el método **Phar::startBuffering()**
puede proporcionar un aumento de rendimiento durante la creación o modificación de un archivo
Phar con un gran número de ficheros. Normalmente, cada vez que un fichero dentro del
archivo Phar es creado o modificado, el archivo Phar completo se recrea incluyendo los
cambios. De esta manera, el archivo siempre estará actualizado con respecto a las operaciones que
se le aplican.

Aunque esto pueda parecer innecesario durante la creación de un archivo Phar simple,
adquiere sentido al escribir el archivo Phar completo de una sola vez.
Asimismo, es frecuente necesitar realizar una serie de cambios y asegurarse
de que todos son posibles antes de escribir en el disco, de manera similar a las transacciones
de las bases de datos relacionales. Las funciones
**Phar::startBuffering()**/[Phar::stopBuffering()](#phar.stopbuffering) están disponibles
con este propósito.

El almacenamiento en búfer Phar se realiza por archivo, el búfer activo para el archivo Phar
foo.phar no afecta a los cambios realizados en el archivo Phar
bar.phar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::startBuffering()**

&lt;?php
// se asegura de que el phar no exista ya
@unlink('nouveau.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nouveau.phar', 0, 'nouveau.phar');
} catch (Exception $e) {
    echo 'No puede crear el phar:', $e;
}
echo 'El nuevo phar tiene ' . $p-&gt;count() . " entradas\n";
$p-&gt;startBuffering();
$p['fichier.txt'] = 'salut';
$p['fichier2.txt'] = 'jolie';
$p['fichier2.txt']-&gt;setCompressedGZ();
$p['fichier3.txt'] = 'môme';
$p['fichier3.txt']-&gt;setMetadata(42);
$p-&gt;setStub("&lt;?php
function **autoload($class)
{
include 'phar://monphar.phar/' . str*replace('*', '/', $class) . '.php';
}
Phar::mapPhar('monphar.phar');
include 'phar://monphar.phar/demarrage.php';
**HALT_COMPILER();");
$p-&gt;stopBuffering();
?&gt;

### Ver también

    - [Phar::stopBuffering()](#phar.stopbuffering) - Detiene el almacenamiento en búfer de las escrituras Phar y provoca la escritura en el disco

    - [Phar::isBuffering()](#phar.isbuffering) - Determina si las operaciones de escritura de Phar están en búfer o se escriben directamente en el disco

# Phar::stopBuffering

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

Phar::stopBuffering — Detiene el almacenamiento en búfer de las escrituras Phar y provoca la escritura en el disco

### Descripción

public **Phar::stopBuffering**(): [void](language.types.void.html)

**Phar::stopBuffering()** se utiliza en conjunción con el método
[Phar::startBuffering()](#phar.startbuffering). [Phar::startBuffering()](#phar.startbuffering)
puede proporcionar un aumento de rendimiento durante la creación o modificación de un archivo
Phar con un gran número de ficheros. Normalmente, cada vez que un fichero dentro del
archivo Phar es creado o modificado, el archivo Phar completo se recrea incluyendo los
cambios. De esta manera, el archivo estará siempre actualizado respecto a las operaciones que
se le aplican.

Aunque esto puede parecer innecesario durante la creación de un archivo Phar simple,
adquiere sentido al escribir el archivo Phar completo de una sola vez.
Asimismo, es frecuentemente necesario realizar una serie de cambios y asegurarse
de que todos son posibles antes de escribir en el disco, de manera similar a las transacciones
de las bases de datos relacionales. Las funciones
[Phar::startBuffering()](#phar.startbuffering)/**Phar::stopBuffering()** están disponibles
con este propósito.

El almacenamiento en búfer Phar se realiza por archivo, el búfer activo para el archivo Phar
foo.phar no afecta a los cambios realizados en el archivo Phar
bar.phar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception) si se encuentran problemas durante
la escritura de los cambios en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo Phar::stopBuffering()**

&lt;?php
$p = new Phar(dirname(__FILE__) . '/nouveau.phar', 0, 'nouveau.phar');
$p['fichier1.txt'] = 'salut';
$p-&gt;startBuffering();
var_dump($p-&gt;getStub());
$p-&gt;setStub("&lt;?php
function __autoload(\$class)
{
    include 'phar://nouveau.phar/' . str_replace('_', '/', \$class) . '.php';
}
Phar::mapPhar('nouveau.phar');
include 'phar://nouveau.phar/demarrage.php';
__HALT_COMPILER();");
$p-&gt;stopBuffering();
var_dump($p-&gt;getStub());
?&gt;

    El ejemplo anterior mostrará:

string(24) "&lt;?php **HALT_COMPILER();"
string(195) "&lt;?php
function **autoload($class)
{
include 'phar://' . str*replace('*', '/', $class);
}
Phar::mapPhar('nouveau.phar');
include 'phar://nouveau.phar/demarrage.php';
\_\_HALT_COMPILER();"

### Ver también

    - [Phar::startBuffering()](#phar.startbuffering) - Inicia el almacenamiento en búfer de escrituras Phar, sin modificar el objeto Phar en el disco

    - [Phar::isBuffering()](#phar.isbuffering) - Determina si las operaciones de escritura de Phar están en búfer o se escriben directamente en el disco

# Phar::unlinkArchive

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::unlinkArchive — Elimina completamente un archivo phar del disco y de la memoria

### Descripción

final public static **Phar::unlinkArchive**([string](#language.types.string) $filename): [true](#language.types.singleton)

Elimina completamente un archivo phar del disco y de la memoria

### Parámetros

     filename


       La ruta en el disco hacia el archivo phar.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se lanza una excepción [PharException](#class.pharexception) si existen punteros abiertos hacia ficheros
del archivo phar, o si objetos [Phar](#class.phar), [PharData](#class.phardata),
o [PharFileInfo](#class.pharfileinfo) hacen referencia al archivo phar.

### Ejemplos

    **Ejemplo #1 Un ejemplo con Phar::unlinkArchive()**

&lt;?php
// uso simple
Phar::unlinkArchive('/ruta/al/archivo.phar');

// un ejemplo más común:
$p = new Phar('archivo.phar');
$fp = fopen('phar://archivo.phar/fichero.txt', 'r');
// esto crea 'archivo.phar.gz'
$gp = $p-&gt;compress(Phar::GZ);
// elimina todas las referencias al archivo
unset($p);
fclose($fp);
// borra ahora todo rastro del archivo
Phar::unlinkArchive('archivo.phar');
?&gt;

### Ver también

    - [Phar::delete()](#phar.delete) - Elimina un fichero dentro de un archivo phar

    - [Phar::offsetUnset()](#phar.offsetunset) - Elimina un fichero de un phar

# Phar::webPhar

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

Phar::webPhar — Redirige una solicitud desde un navegador web a un fichero interno en el archivo phar

### Descripción

final public static **Phar::webPhar**(
    [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $fileNotFoundScript = **[null](#constant.null)**,
    [array](#language.types.array) $mimeTypes = [],
    [?](#language.types.null)[callable](#language.types.callable) $rewrite = **[null](#constant.null)**
): [void](language.types.void.html)

**Phar::webPhar()** actúa como [Phar::mapPhar()](#phar.mapphar) para los phars orientados a web. Este método analiza
[$\_SERVER['REQUEST_URI']](#reserved.variables.server) y enruta las solicitudes de un navegador hacia un fichero
interno del archivo.
Esto simula un servidor web, enrutando solicitudes al fichero correcto,
enviando los encabezados adecuados y analizando el fichero PHP como corresponde.
Combinado con [Phar::mungServer()](#phar.mungserver) y [Phar::interceptFileFuncs()](#phar.interceptfilefuncs),
cualquier aplicación web puede ser utilizada sin cambios a partir del archivo phar.

**Phar::webPhar()** debe ser llamado únicamente desde el contenedor de carga
de un archivo phar (consultar [esto](#phar.fileformat.stub)
para obtener más información sobre los contenedores).

### Parámetros

     alias


       El alias que puede ser utilizado en la URL
       phar:// para referirse
       al archivo, en lugar de su ruta completa.






     index


       La ubicación dentro del archivo del índice de directorio.






     fileNotFoundScript


       La ubicación del script a ejecutar cuando un fichero no es encontrado. Este
       script debe enviar los encabezados HTTP 404 correctos.






     mimeTypes


       Un array que hace corresponder extensiones de fichero adicionales a tipos MIME.
       Si las correspondencias por defecto son suficientes, se debe pasar un array vacío.
       Por defecto, estas correspondencias son las siguientes:



        &lt;?php

$mimes = array(
'phps' =&gt; Phar::PHPS, // paso a highlight_file()
'c' =&gt; 'text/plain',
'cc' =&gt; 'text/plain',
'cpp' =&gt; 'text/plain',
'c++' =&gt; 'text/plain',
'dtd' =&gt; 'text/plain',
'h' =&gt; 'text/plain',
'log' =&gt; 'text/plain',
'rng' =&gt; 'text/plain',
'txt' =&gt; 'text/plain',
'xsd' =&gt; 'text/plain',
'php' =&gt; Phar::PHP, // analizar como PHP
'inc' =&gt; Phar::PHP, // analizar como PHP
'avi' =&gt; 'video/avi',
'bmp' =&gt; 'image/bmp',
'css' =&gt; 'text/css',
'gif' =&gt; 'image/gif',
'htm' =&gt; 'text/html',
'html' =&gt; 'text/html',
'htmls' =&gt; 'text/html',
'ico' =&gt; 'image/x-ico',
'jpe' =&gt; 'image/jpeg',
'jpg' =&gt; 'image/jpeg',
'jpeg' =&gt; 'image/jpeg',
'js' =&gt; 'application/x-javascript',
'midi' =&gt; 'audio/midi',
'mid' =&gt; 'audio/midi',
'mod' =&gt; 'audio/mod',
'mov' =&gt; 'movie/quicktime',
'mp3' =&gt; 'audio/mp3',
'mpg' =&gt; 'video/mpeg',
'mpeg' =&gt; 'video/mpeg',
'pdf' =&gt; 'application/pdf',
'png' =&gt; 'image/png',
'swf' =&gt; 'application/shockwave-flash',
'tif' =&gt; 'image/tiff',
'tiff' =&gt; 'image/tiff',
'wav' =&gt; 'audio/wav',
'xbm' =&gt; 'image/xbm',
'xml' =&gt; 'text/xml',
);
?&gt;

     rewrite


       La función de reescritura que se pasa toma como único argumento un string
       y debe devolver un string o false.




       Si se utiliza fast-cgi o cgi, el argumento pasado a la función es el valor de la
       variable [$_SERVER['PATH_INFO']](#reserved.variables.server). De lo contrario, el argumento pasado a la función
       es el valor de la variable [$_SERVER['REQUEST_URI']](#reserved.variables.server).




       Si se devuelve un string, será utilizado en la ruta interna del fichero.
       Si se devuelve false, entonces webPhar() enviará un código HTTP 403.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Levanta una excepción [PharException](#class.pharexception) cuando el fichero interno no puede ser
abierto o si la llamada se realiza fuera de un contenedor. Si se pasa un valor de array no válido en
mimeTypes o si se pasa una función de devolución de llamada inválida al parámetro
rewrite, entonces se levanta una excepción [UnexpectedValueException](#class.unexpectedvalueexception).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       fileNotFoundScript y rewrite
       ahora son nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con Phar::webPhar()**



     En el ejemplo siguiente, el phar creado mostrará Hola mundo
     si alguien llama a /monphar.phar/index.php o
     /monphar.phar, y mostrará la fuente de
     index.phps si /monphar.phar/index.phps es llamado.

&lt;?php
// el archivo phar es creado:
try {
$phar = new Phar('monphar.phar');
$phar['index.php'] = '&lt;?php echo "Hola mundo"; ?&gt;';
$phar['index.phps'] = '&lt;?php echo "Hola mundo"; ?&gt;';
$phar-&gt;setStub('&lt;?php
Phar::webPhar();
\_\_HALT_COMPILER(); ?&gt;');
} catch (Exception $e) {
// se manejan los errores aquí
}
?&gt;

### Ver también

    - [Phar::mungServer()](#phar.mungserver) - Define una lista de un máximo de 4 variables $_SERVER que deben ser modificadas durante la ejecución

    - [Phar::interceptFileFuncs()](#phar.interceptfilefuncs) - Indica a phar que debe interceptar las funciones de archivos

## Tabla de contenidos

- [Phar::addEmptyDir](#phar.addemptydir) — Añade un directorio vacío al archivo phar
- [Phar::addFile](#phar.addfile) — Añade un fichero del sistema de ficheros al archivo phar
- [Phar::addFromString](#phar.addfromstring) — Añade un fichero desde un string al archivo phar
- [Phar::apiVersion](#phar.apiversion) — Devuelve la versión de la API
- [Phar::buildFromDirectory](#phar.buildfromdirectory) — Construye un archivo phar a partir de los ficheros de un directorio
- [Phar::buildFromIterator](#phar.buildfromiterator) — Construye un archivo phar a partir de un iterador
- [Phar::canCompress](#phar.cancompress) — Determina si la extensión phar soporta la compresión utilizando zip o bzip2
- [Phar::canWrite](#phar.canwrite) — Determina si la extensión phar soporta la creación y escritura de archivos phar
- [Phar::compress](#phar.compress) — Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2
- [Phar::compressFiles](#phar.compressfiles) — Comprime todos los ficheros del archivo Phar actual
- [Phar::\_\_construct](#phar.construct) — Construye un objeto de archivo Phar
- [Phar::convertToData](#phar.converttodata) — Convierte un archivo phar en un fichero no ejecutable
- [Phar::convertToExecutable](#phar.converttoexecutable) — Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable
- [Phar::copy](#phar.copy) — Copia un fichero perteneciente a un archivo hacia otro fichero del mismo archivo
- [Phar::count](#phar.count) — Devuelve el número de entradas (ficheros) en el archivo Phar
- [Phar::createDefaultStub](#phar.createdefaultstub) — Crea un contenedor de carga de un archivo Phar
- [Phar::decompress](#phar.decompress) — Descomprime el archivo tar completo
- [Phar::decompressFiles](#phar.decompressfiles) — Descomprime todos los ficheros del archivo Phar actual
- [Phar::delMetadata](#phar.delmetadata) — Elimina los metadatos globales del phar
- [Phar::delete](#phar.delete) — Elimina un fichero dentro de un archivo phar
- [Phar::\_\_destruct](#phar.destruct) — Destruye un objeto archivo Phar
- [Phar::extractTo](#phar.extractto) — Extrae el contenido de un archivo phar hacia un directorio
- [Phar::getAlias](#phar.getalias) — Obtiene el alias para Phar
- [Phar::getMetadata](#phar.getmetadata) — Devuelve las metadatos del archivo phar
- [Phar::getModified](#phar.getmodified) — Indica si el archivo phar ha sido modificado
- [Phar::getPath](#phar.getpath) — Obtiene la ruta de acceso absoluta del archivo Phar en el disco
- [Phar::getSignature](#phar.getsignature) — Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar
- [Phar::getStub](#phar.getstub) — Retorna el cargador PHP o el contenedor de carga de un archivo Phar
- [Phar::getSupportedCompression](#phar.getsupportedcompression) — Devuelve un array de los algoritmos de compresión soportados
- [Phar::getSupportedSignatures](#phar.getsupportedsignatures) — Devuelve un array de los tipos de firma soportados
- [Phar::getVersion](#phar.getversion) — Devuelve las informaciones de versión del archivo Phar
- [Phar::hasMetadata](#phar.hasmetadata) — Determina si el phar contiene o no metadatos
- [Phar::interceptFileFuncs](#phar.interceptfilefuncs) — Indica a phar que debe interceptar las funciones de archivos
- [Phar::isBuffering](#phar.isbuffering) — Determina si las operaciones de escritura de Phar están en búfer o se escriben directamente en el disco
- [Phar::isCompressed](#phar.iscompressed) — Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)
- [Phar::isFileFormat](#phar.isfileformat) — Retorna true si el archivo phar está basado en el formato de archivo tar/phar/zip según el argumento
- [Phar::isValidPharFilename](#phar.isvalidpharfilename) — Determina si el nombre de fichero especificado es un nombre de fichero válido para un archivo phar
- [Phar::isWritable](#phar.iswritable) — Retorna true si el archivo phar puede ser modificado
- [Phar::loadPhar](#phar.loadphar) — Carga cualquier archivo phar con un alias
- [Phar::mapPhar](#phar.mapphar) — Lee el phar ejecutado y carga su manifiesto
- [Phar::mount](#phar.mount) — Monta un camino o un fichero externo a una ubicación virtual dentro del archivo phar
- [Phar::mungServer](#phar.mungserver) — Define una lista de un máximo de 4 variables $\_SERVER que deben ser modificadas durante la ejecución
- [Phar::offsetExists](#phar.offsetexists) — Determina si un fichero existe en el phar
- [Phar::offsetGet](#phar.offsetget) — Obtiene un objeto PharFileInfo a partir de un fichero
- [Phar::offsetSet](#phar.offsetset) — Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo
- [Phar::offsetUnset](#phar.offsetunset) — Elimina un fichero de un phar
- [Phar::running](#phar.running) — Devuelve la ruta completa en el disco o la URL phar completa del archivo phar actualmente ejecutado
- [Phar::setAlias](#phar.setalias) — Establece el alias del archivo Phar
- [Phar::setDefaultStub](#phar.setdefaultstub) — Utilizado para establecer el cargador PHP o el contenedor de carga de un archivo Phar como cargador por defecto
- [Phar::setMetadata](#phar.setmetadata) — Establece las metadatos del archivo phar
- [Phar::setSignatureAlgorithm](#phar.setsignaturealgorithm) — Establece y aplica el algoritmo de firma de un phar
- [Phar::setStub](#phar.setstub) — Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar
- [Phar::startBuffering](#phar.startbuffering) — Inicia el almacenamiento en búfer de escrituras Phar, sin modificar el objeto Phar en el disco
- [Phar::stopBuffering](#phar.stopbuffering) — Detiene el almacenamiento en búfer de las escrituras Phar y provoca la escritura en el disco
- [Phar::unlinkArchive](#phar.unlinkarchive) — Elimina completamente un archivo phar del disco y de la memoria
- [Phar::webPhar](#phar.webphar) — Redirige una solicitud desde un navegador web a un fichero interno en el archivo phar

# La clase PharData

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

## Introducción

    La clase PharData proporciona una interfaz de alto nivel para acceder y crear
    archivos tar y zip no ejecutables. Dado que estos archivos no contienen
    un contenedor y no pueden ser ejecutados por la extensión phar, es posible
    crear y manipular archivos zip y tar normales utilizando la clase PharData
    incluso si el parámetro phar.readonly del php.ini está a 1.

## Sinopsis de la Clase

     class **PharData**



     extends
      [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)



     implements
      [Countable](#class.countable),

     [ArrayAccess](#class.arrayaccess) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [FilesystemIterator::CURRENT_MODE_MASK](#filesystemiterator.constants.current-mode-mask);

public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_PATHNAME](#filesystemiterator.constants.current-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_FILEINFO](#filesystemiterator.constants.current-as-fileinfo);
public
const
[int](#language.types.integer)
[FilesystemIterator::CURRENT_AS_SELF](#filesystemiterator.constants.current-as-self);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_MODE_MASK](#filesystemiterator.constants.key-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_PATHNAME](#filesystemiterator.constants.key-as-pathname);
public
const
[int](#language.types.integer)
[FilesystemIterator::FOLLOW_SYMLINKS](#filesystemiterator.constants.follow-symlinks);
public
const
[int](#language.types.integer)
[FilesystemIterator::KEY_AS_FILENAME](#filesystemiterator.constants.key-as-filename);
public
const
[int](#language.types.integer)
[FilesystemIterator::NEW_CURRENT_AND_KEY](#filesystemiterator.constants.new-current-and-key);
public
const
[int](#language.types.integer)
[FilesystemIterator::OTHER_MODE_MASK](#filesystemiterator.constants.other-mode-mask);
public
const
[int](#language.types.integer)
[FilesystemIterator::SKIP_DOTS](#filesystemiterator.constants.skip-dots);
public
const
[int](#language.types.integer)
[FilesystemIterator::UNIX_PATHS](#filesystemiterator.constants.unix-paths);

    /* Métodos */

public [\_\_construct](#phardata.construct)(
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $flags = FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS,
    [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**,
    [int](#language.types.integer) $format = 0
)

    public [addEmptyDir](#phardata.addemptydir)([string](#language.types.string) $directory): [void](language.types.void.html)

public [addFile](#phardata.addfile)([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $localName = **[null](#constant.null)**): [void](language.types.void.html)
public [addFromString](#phardata.addfromstring)([string](#language.types.string) $localName, [string](#language.types.string) $contents): [void](language.types.void.html)
public [buildFromDirectory](#phardata.buildfromdirectory)([string](#language.types.string) $directory, [string](#language.types.string) $pattern = ""): [array](#language.types.array)
public [buildFromIterator](#phardata.buildfromiterator)([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $baseDirectory = **[null](#constant.null)**): [array](#language.types.array)
public [compress](#phardata.compress)([int](#language.types.integer) $compression, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)
public [compressFiles](#phardata.compressfiles)([int](#language.types.integer) $compression): [void](language.types.void.html)
public [convertToData](#phardata.converttodata)([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)
public [convertToExecutable](#phardata.converttoexecutable)([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)
public [copy](#phardata.copy)([string](#language.types.string) $from, [string](#language.types.string) $to): [true](#language.types.singleton)
public [decompress](#phardata.decompress)([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)
public [decompressFiles](#phardata.decompressfiles)(): [true](#language.types.singleton)
public [delMetadata](#phardata.delmetadata)(): [true](#language.types.singleton)
public [delete](#phardata.delete)([string](#language.types.string) $localName): [true](#language.types.singleton)
public [extractTo](#phardata.extractto)([string](#language.types.string) $directory, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**, [bool](#language.types.boolean) $overwrite = **[false](#constant.false)**): [bool](#language.types.boolean)
public [isWritable](#phardata.iswritable)(): [bool](#language.types.boolean)
public [offsetSet](#phardata.offsetset)([string](#language.types.string) $localName, [resource](#language.types.resource)|[string](#language.types.string) $value): [void](language.types.void.html)
public [offsetUnset](#phardata.offsetunset)([string](#language.types.string) $localName): [void](language.types.void.html)
public [setAlias](#phardata.setalias)([string](#language.types.string) $alias): [bool](#language.types.boolean)
public [setDefaultStub](#phardata.setdefaultstub)([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [bool](#language.types.boolean)
public [setMetadata](#phardata.setmetadata)([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)
public [setSignatureAlgorithm](#phardata.setsignaturealgorithm)([int](#language.types.integer) $algo, [?](#language.types.null)[string](#language.types.string) $privateKey = **[null](#constant.null)**): [void](language.types.void.html)
public [setStub](#phardata.setstub)([string](#language.types.string) $stub, [int](#language.types.integer) $len = -1): [bool](#language.types.boolean)

    public [__destruct](#phardata.destruct)()


    /* Métodos heredados */
    public [RecursiveDirectoryIterator::getChildren](#recursivedirectoryiterator.getchildren)(): [RecursiveDirectoryIterator](#class.recursivedirectoryiterator)

public [RecursiveDirectoryIterator::getSubPath](#recursivedirectoryiterator.getsubpath)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::getSubPathname](#recursivedirectoryiterator.getsubpathname)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::hasChildren](#recursivedirectoryiterator.haschildren)([bool](#language.types.boolean) $allowLinks = **[false](#constant.false)**): [bool](#language.types.boolean)
public [RecursiveDirectoryIterator::key](#recursivedirectoryiterator.key)(): [string](#language.types.string)
public [RecursiveDirectoryIterator::next](#recursivedirectoryiterator.next)(): [void](language.types.void.html)
public [RecursiveDirectoryIterator::rewind](#recursivedirectoryiterator.rewind)(): [void](language.types.void.html)

    public [FilesystemIterator::current](#filesystemiterator.current)(): [string](#language.types.string)|[SplFileInfo](#class.splfileinfo)|[FilesystemIterator](#class.filesystemiterator)

public [FilesystemIterator::getFlags](#filesystemiterator.getflags)(): [int](#language.types.integer)
public [FilesystemIterator::key](#filesystemiterator.key)(): [string](#language.types.string)
public [FilesystemIterator::next](#filesystemiterator.next)(): [void](language.types.void.html)
public [FilesystemIterator::rewind](#filesystemiterator.rewind)(): [void](language.types.void.html)
public [FilesystemIterator::setFlags](#filesystemiterator.setflags)([int](#language.types.integer) $flags): [void](language.types.void.html)

    public [DirectoryIterator::current](#directoryiterator.current)(): [mixed](#language.types.mixed)

public [DirectoryIterator::getBasename](#directoryiterator.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [DirectoryIterator::getExtension](#directoryiterator.getextension)(): [string](#language.types.string)
public [DirectoryIterator::getFilename](#directoryiterator.getfilename)(): [string](#language.types.string)
public [DirectoryIterator::isDot](#directoryiterator.isdot)(): [bool](#language.types.boolean)
public [DirectoryIterator::key](#directoryiterator.key)(): [mixed](#language.types.mixed)
public [DirectoryIterator::next](#directoryiterator.next)(): [void](language.types.void.html)
public [DirectoryIterator::rewind](#directoryiterator.rewind)(): [void](language.types.void.html)
public [DirectoryIterator::seek](#directoryiterator.seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [DirectoryIterator::\_\_toString](#directoryiterator.tostring)(): [string](#language.types.string)
public [DirectoryIterator::valid](#directoryiterator.valid)(): [bool](#language.types.boolean)

    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# PharData::addEmptyDir

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::addEmptyDir — Añade un directorio vacío al archivo tar/zip

### Descripción

public **PharData::addEmptyDir**([string](#language.types.string) $directory): [void](language.types.void.html)

Con este método, se crea un directorio vacío con la ruta dirname.
Este método es idéntico a [ZipArchive::addEmptyDir()](#ziparchive.addemptydir).

### Parámetros

     directory


       El nombre del directorio vacío a crear en el archivo phar





### Valores devueltos

No se devuelve ningún valor, se lanza una excepción en caso de fallo.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::addEmptyDir()**

&lt;?php
try {
$a = new PharData('/ruta/al/archivo.tar');

    $a-&gt;addEmptyDir('/ruta/completa/al/fichero');
    // muestra cómo se almacena el fichero
    $b = $a['ruta/completa/al/fichero']-&gt;isDir();

} catch (Exception $e) {
// los errores se manejan aquí
}
?&gt;

### Ver también

    - [Phar::addEmptyDir()](#phar.addemptydir) - Añade un directorio vacío al archivo phar

    - [PharData::addFile()](#phardata.addfile) - Añade un fichero del sistema de archivos al archivo tar/zip

    - [PharData::addFromString()](#phardata.addfromstring) - Añade un fichero a partir de un string al archivo tar/zip

# PharData::addFile

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::addFile — Añade un fichero del sistema de archivos al archivo tar/zip

### Descripción

public **PharData::addFile**([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $localName = **[null](#constant.null)**): [void](language.types.void.html)

Con este método, cualquier fichero o URL puede ser añadido al archivo tar/zip. Si
el segundo argumento opcional localname es especificado,
el fichero será almacenado en el archivo con este nombre, de lo contrario el argumento
file es utilizado como ruta hacia donde almacenar el fichero dentro de
el archivo. Las URLs deben tener un nombre local de lo contrario se lanza una excepción.
Este método es idéntico a [ZipArchive::addFile()](#ziparchive.addfile).

### Parámetros

     filename


       Ruta relativa o absoluta hacia un fichero del disco a añadir
       al archivo phar.






     localName


       Ruta hacia donde el fichero será almacenado dentro del archivo.





### Valores devueltos

No se devuelve ningún valor, se lanza una excepción en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       localName ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::addFile()**

&lt;?php
try {
$a = new PharData('/ruta/al/archivo.tar');

    $a-&gt;addFile('/ruta/completa/al/fichero');
    // muestra cómo el fichero es almacenado
    $b = $a['ruta/completa/al/fichero']-&gt;getContent();

    $a-&gt;addFile('/ruta/completa/al/fichero', 'mi/fichero.txt');
    $c = $a['mi/fichero.txt']-&gt;getContent();

    // muestra el uso de URLs
    $a-&gt;addFile('http://www.ejemplo.com', 'ejemplo.html');

} catch (Exception $e) {
// los errores son manejados aquí
}
?&gt;

### Notas

**Nota**:

**PharData::addFile()**, [PharData::addFromString()](#phardata.addfromstring) y [PharData::offsetSet()](#phardata.offsetset)
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[PharData::buildFromDirectory()](#phardata.buildfromdirectory) o [PharData::buildFromIterator()](#phardata.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [PharData::offsetSet()](#phardata.offsetset) - Rellena un fichero dentro del archivo tar/zip con el contenido de un fichero externo o de un string

    - [Phar::addFile()](#phar.addfile) - Añade un fichero del sistema de ficheros al archivo phar

    - [PharData::addFromString()](#phardata.addfromstring) - Añade un fichero a partir de un string al archivo tar/zip

    - [PharData::addEmptyDir()](#phardata.addemptydir) - Añade un directorio vacío al archivo tar/zip

# PharData::addFromString

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::addFromString — Añade un fichero a partir de un string al archivo tar/zip

### Descripción

public **PharData::addFromString**([string](#language.types.string) $localName, [string](#language.types.string) $contents): [void](language.types.void.html)

Añade un string al archivo tar/zip.
El fichero será almacenado en el archivo con la ruta localname.
Este método es idéntico a [ZipArchive::addFromString()](#ziparchive.addfromstring).

### Parámetros

     localName


       Ruta hacia la cual el fichero será almacenado dentro del archivo.






     contents


       El contenido del fichero a almacenar





### Valores devueltos

No hay valor de retorno, se lanza una excepción en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con PharData::addFromString()**

&lt;?php
try {
$a = new PharData('/ruta/versus/mon.tar');

    $a-&gt;addFromString('ruta/versus/fichero.txt', 'mi fichero simple');
    $b = $a['ruta/versus/fichero.txt']-&gt;getContent();

    // para añadir contenido a partir de un manejador de flujo para archivos grandes, utilice offsetSet()
    $c = fopen('/ruta/versus/grandearchivo.bin');
    $a['grandearchivo.bin'] = $c;
    fclose($c);

} catch (Exception $e) {
// los errores son tratados aquí
}
?&gt;

### Notas

**Nota**:

[Phar::addFile()](#phar.addfile), [Phar::addFromString()](#phar.addfromstring) y [Phar::offsetSet()](#phar.offsetset)
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[Phar::buildFromDirectory()](#phar.buildfromdirectory) o [Phar::buildFromIterator()](#phar.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [PharData::offsetSet()](#phardata.offsetset) - Rellena un fichero dentro del archivo tar/zip con el contenido de un fichero externo o de un string

    - [Phar::addFromString()](#phar.addfromstring) - Añade un fichero desde un string al archivo phar

    - [PharData::addFile()](#phardata.addfile) - Añade un fichero del sistema de archivos al archivo tar/zip

    - [PharData::addEmptyDir()](#phardata.addemptydir) - Añade un directorio vacío al archivo tar/zip

# PharData::buildFromDirectory

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::buildFromDirectory — Construye un archivo tar/zip a partir de los ficheros de un directorio

### Descripción

public **PharData::buildFromDirectory**([string](#language.types.string) $directory, [string](#language.types.string) $pattern = ""): [array](#language.types.array)

Rellena un archivo tar/zip a partir del contenido de un directorio. El segundo argumento opcional
es una expresión regular (pcre) utilizada para excluir ficheros.
Cualquier fichero cuyo nombre cumpla la expresión será incluido, todos los demás serán excluidos. Para un
control más fino, utilice [PharData::buildFromIterator()](#phardata.buildfromiterator).

### Parámetros

     directory


       La ruta relativa o absoluta hacia el directorio que contiene todos los ficheros a añadir
       al archivo.






     pattern


       Una expresión regular opcional que se utiliza para filtrar la lista de
       ficheros. Solo los ficheros cuyos nombres cumplan la expresión serán incluidos
       en el archivo.





### Valores devueltos

[Phar::buildFromDirectory()](#phar.buildfromdirectory) devuelve un array asociativo que hace corresponder
una ruta de fichero interno con una ruta completa en el sistema de ficheros, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception) cuando no es capaz
de instanciar los iteradores internos de directorio, o una excepción [PharException](#class.pharexception)
si se han encontrado errores durante el registro del archivo phar.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       **PharData::buildFromDirectory()** ya no devuelve **[false](#constant.false)**.



### Ejemplos

**Ejemplo #1 Un ejemplo con PharData::buildFromDirectory()**

&lt;?php
$phar = new PharData('projet.tar');
// añade todos los ficheros al proyecto
$phar-&gt;buildFromDirectory(dirname(**FILE**) . '/projet');

$phar2 = new PharData('projet2.zip');
// añade todos los ficheros al proyecto incluyendo solo los ficheros php
$phar2-&gt;buildFromDirectory(dirname(**FILE**) . '/projet', '/\.php$/');
?&gt;

### Ver también

    - [Phar::buildFromDirectory()](#phar.buildfromdirectory) - Construye un archivo phar a partir de los ficheros de un directorio

    - [PharData::buildFromIterator()](#phardata.buildfromiterator) - Construye un archivo tar o zip a partir de un iterador

# PharData::buildFromIterator

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::buildFromIterator — Construye un archivo tar o zip a partir de un iterador

### Descripción

public **PharData::buildFromIterator**([Traversable](#class.traversable) $iterator, [?](#language.types.null)[string](#language.types.string) $baseDirectory = **[null](#constant.null)**): [array](#language.types.array)

Rellena un archivo tar o zip a partir de un iterador. Dos estilos de iteradores son soportados,
los iteradores que hacen corresponder la ruta de archivo dentro del archivo con la ruta en el disco
y los iteradores como DirectoryIterator que devuelven objetos
SplFileInfo. Para los iteradores que devuelven objetos SplFileInfo, el segundo argumento es requerido.

### Parámetros

     iterator


       Cualquier iterador que haga corresponder de forma asociativa un archivo tar/zip o
       que devuelva objetos SplFileInfo






     baseDirectory


       Para los iteradores que devuelven objetos SplFileInfo, la parte del camino completo
       hacia el archivo a eliminar al añadir al archivo tar/zip





### Valores devueltos

**PharData::buildFromIterator()** devuelve un array asociativo
que hace corresponder una ruta de archivo interna con una ruta completa hacia
el archivo en el sistema de archivos.

### Errores/Excepciones

Este método devuelve una excepción [UnexpectedValueException](#class.unexpectedvalueexception) cuando
el iterador devuelve valores incorrectos, como una clave entera en lugar de una cadena,
una excepción [BadMethodCallException](#class.badmethodcallexception) cuando se pasa un iterador basado en
SplFileInfo sin el argumento baseDirectory, o una
excepción [PharException](#class.pharexception) si se han encontrado errores al
guardar el archivo phar.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       **PharData::buildFromIterator()** ya no devuelve **[false](#constant.false)** ahora.




      8.0.0

       baseDirectory ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con PharData::buildFromIterator()** y [SplFileInfo](#class.splfileinfo)

    Para la mayoría de los archivos tar/zip, el archivo reflejará la estructura
    de directorio actual y el segundo estilo es el más útil. Por
    ejemplo, para crear un archivo tar/zip que contenga los archivos
    con la estructura de directorio a continuación:

/chemin/vers/projet/
config/
dist.xml
debug.xml
lib/
fichier1.php
fichier2.php
src/
processthing.php
www/
index.php
cli/
index.php

    Este código puede ser utilizado para añadir archivos a
    el archivo "projet.tar" tar:

&lt;?php
$phar = new PharData('projet.tar');
$phar-&gt;buildFromIterator(
new RecursiveIteratorIterator(
new RecursiveDirectoryIterator('/chemin/vers/projet')),
'/chemin/vers/projet');
?&gt;

    El archivo projet.tar puede entonces ser borrado
    inmediatamente. **PharData::buildFromIterator()**
    no establece parámetros como la compresión, las metadatos,
    lo cual puede ser hecho después de haber creado el archivo tar/zip.




    Se debe notar que [Phar::buildFromIterator()](#phar.buildfromiterator) también
    puede ser utilizado para copiar el contenido de un archivo phar, tar o zip
    existente, ya que el objeto [PharData](#class.phardata) es derivado
    de [DirectoryIterator](#class.directoryiterator):

&lt;?php
$phar = new PharData('projet.tar');
$phar-&gt;buildFromIterator(
new RecursiveIteratorIterator(
new Phar('/chemin/vers/unautrephar.phar')),
'phar:///chemin/vers/unautrephar.phar/chemin/vers/projet');
$phar-&gt;setStub($phar-&gt;createDefaultStub('cli/index.php', 'www/index.php'));
?&gt;

**Ejemplo #2 Ejemplo con PharData::buildFromIterator()** y otros iteradores

    La segunda forma de iterador puede ser utilizada con cualquier iterador que devuelva
    una asociación clave =&gt; valor, tal como [ArrayIterator](#class.arrayiterator):

&lt;?php
$phar = new PharData('projet.tar');
$phar-&gt;buildFromIterator(
new ArrayIterator(
array(
'interne/fichier.php' =&gt; dirname(**FILE**) . '/unfichier.php',
'unautre/fichier.jpg' =&gt; fopen('/chemin/vers/grosfichier.jpg', 'rb'),
)));
?&gt;

### Ver también

    - [Phar::buildFromIterator()](#phar.buildfromiterator) - Construye un archivo phar a partir de un iterador

# PharData::compress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::compress — Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

### Descripción

public **PharData::compress**([int](#language.types.integer) $compression, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)

Para los archivos tar, este método comprime el archivo completo utilizando la compresión
gzip o bzip2. El archivo resultante puede ser manipulado con el comando gunzip/bunzip, o
ser accedido directamente y de forma transparente con la extensión Phar.

Para los archivos zip, este método falla al lanzar una excepción.
La extensión [zlib](#ref.zlib) debe estar activada para comprimir con gzip,
la extensión [bzip2](#ref.bzip2) debe estar activada para comprimir con bzip2.

Asimismo, este método renombra automáticamente el archivo, añadiendo el sufijo .gz,
.bz2 o eliminando la extensión si Phar::NONE es especificado para eliminar
la compresión. De lo contrario, una extensión de archivo puede ser especificada con el segundo argumento.

### Parámetros

     compression


       La compresión debe ser Phar::GZ o
       Phar::BZ2 para aplicar una compresión, o Phar::NONE
       para eliminarla.






     extension


       Por omisión, la extensión es .tar.gz o .tar.bz2
       para comprimir un tar, y .tar para descomprimir.





### Valores devueltos

Un objeto [PharData](#class.phardata) es devuelto en caso de éxito, **[null](#constant.null)** en caso de error.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si la extensión
[zlib](#ref.zlib) no está disponible, o si la extensión
[bzip2](#ref.bzip2) no está activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       extension ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::compress()**

&lt;?php
$p = new PharData('/ruta/al/mio.tar');
$p['monfichier.txt'] = 'salut';
$p['monfichier2.txt'] = 'salut';
$p1 = $p-&gt;compress(Phar::GZ); // copies hacia /path/to/my.tar.gz
$p2 = $p-&gt;compress(Phar::BZ2); // copies hacia /path/to/my.tar.bz2
$p3 = $p2-&gt;compress(Phar::NONE); // excepción: /path/to/my.tar ya existe
?&gt;

### Ver también

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

# PharData::compressFiles

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::compressFiles — Comprime todos los ficheros del archivo tar/zip actual

### Descripción

public **PharData::compressFiles**([int](#language.types.integer) $compression): [void](language.types.void.html)

Para los archivos basados en tar, este método genera una excepción
[BadMethodCallException](#class.badmethodcallexception) ya que la compresión individual de los ficheros
de un archivo tar no es soportada por este formato de archivo. Utilice
[PharData::compress()](#phardata.compress) para comprimir un archivo basado en tar completo.

Para los archivos basados en Zip, este método comprime todos los ficheros del archivo
utilizando la compresión especificada.
Las extensiones [zlib](#ref.zlib) o [bzip2](#ref.bzip2)
deben estar activadas para aprovechar esta funcionalidad. Además, si al menos un fichero
ya está comprimido utilizando la compresión bzip2/zlib, la extensión adecuada debe estar activada
para descomprimir los ficheros antes de volver a comprimirlos.

### Parámetros

     compression


        La compresión debe ser Phar::GZ o
     Phar::BZ2 para aplicar una compresión, o Phar::NONE
     para eliminarla.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Genera una excepción [BadMethodCallException](#class.badmethodcallexception) si la variable
INI [phar.readonly](#ini.phar.readonly) está a on, si la extensión
[zlib](#ref.zlib) no está disponible o si al menos un fichero está
comprimido vía bzip2 y la extensión [bzip2](#ref.bzip2) no está
activada.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::compressFiles()**

&lt;?php
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
$p['monfichero.txt'] = 'hola';
$p['monfichero2.txt'] = 'hola';
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
$p-&gt;compressFiles(Phar::GZ);
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
?&gt;

    El ejemplo anterior mostrará:

string(14) "monfichero.txt"
bool(false)
bool(false)
bool(false)
string(15) "monfichero2.txt"
bool(false)
bool(false)
bool(false)
string(14) "monfichero.txt"
int(4096)
bool(false)
bool(true)
string(15) "monfichero2.txt"
int(4096)
bool(false)
bool(true)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [PharData::decompressFiles()](#phardata.decompressfiles) - Descomprime todos los ficheros del archivo zip actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [PharData::decompress()](#phardata.decompress) - Descomprime el archivo Phar completo

# PharData::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::\_\_construct — Construye un objeto de archivo tar o zip no ejecutable

### Descripción

public **PharData::\_\_construct**(
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $flags = FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS,
    [?](#language.types.null)[string](#language.types.string) $alias = **[null](#constant.null)**,
    [int](#language.types.integer) $format = 0
)

### Parámetros

     filename


       Ruta hacia un archivo tar/zip existente o a crear






     flags


       Banderas a pasar a la clase padre [Phar](#class.phar)
       [RecursiveDirectoryIterator](#class.recursivedirectoryiterator).






     alias


       El alias del archivo Phar a utilizar durante las llamadas a las funcionalidades de flujo.






     format


       Una de las
       [constantes de formato de archivo](#phar.constants.fileformat)
       disponibles en la clase [Phar](#class.phar).





### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si es llamada
dos veces, una excepción [UnexpectedValueException](#class.unexpectedvalueexception)
si el archivo phar no puede ser abierto.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::__construct()**





&lt;?php
try {
$p = new PharData('/path/to/my.tar', Phar::CURRENT_AS_FILEINFO | Phar::KEY_AS_FILENAME);
} catch (UnexpectedValueException $e) {
die('No puede abrir my.tar');
} catch (BadMethodCallException $e) {
echo 'técnicamente, esto no puede ocurrir';
}
echo file_get_contents('phar:///ruta/vers/my.tar/ejemplo.txt');
?&gt;

# PharData::convertToData

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::convertToData — Convierte un archivo phar en un archivo tar o zip no ejecutable

### Descripción

public **PharData::convertToData**([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)

Este método se utiliza para convertir un archivo tar o zip no ejecutable en
otro formato no ejecutable.

Si no se solicita ningún cambio, este método, este método lanza una excepción
[BadMethodCallException](#class.badmethodcallexception).
Este método debe utilizarse para convertir un archivo tar al formato zip y viceversa.
Aunque es posible cambiar la compresión de un archivo tar con este método, es
preferible utilizar el método [PharData::compress()](#phardata.compress) para mantener la coherencia a nivel de lógica.

En caso de éxito, este método crea un nuevo archivo en el disco y devuelve un objeto
[PharData](#class.phardata). El archivo antiguo no se borra del disco, lo cual debe
hacerse manualmente una vez finalizado el procesamiento.

### Parámetros

     format


       El formato debe ser Phar::TAR o
       Phar::ZIP. Si es **[null](#constant.null)**, se conservará el formato de archivo actual.






     compression


       La compresión debe ser Phar::NONE para evitar la compresión del archivo
       completo, Phar::GZ para la compresión basada en zlib, y
       Phar::BZ2 para la compresión basada en bzip.






     extension


       Este parámetro se utiliza para sobrescribir la extensión de archivo por defecto del archivo convertido. Tenga en cuenta
       que .phar no puede utilizarse en ninguna parte del nombre de archivo de un archivo tar o zip no ejecutable.




       En caso de conversión a un archivo phar basado en tar, las extensiones por defecto son
       .tar, .tar.gz
       y .tar.bz2 según la compresión especificada.
       Para los archivos basados en zip, la extensión por defecto es .zip.





### Valores devueltos

Este método devuelve un objeto [PharData](#class.phardata) en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception)
cuando no es capaz de comprimir, cuando se ha especificado un método de compresión desconocido, cuando el archivo solicitado está en búfer con
[Phar::startBuffering()](#phar.startbuffering) y no se ha finalizado con
[Phar::stopBuffering()](#phar.stopbuffering), y lanza una excepción
[PharException](#class.pharexception) si se produce algún problema durante
la creación del phar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       format, compression, y
       extension ahora son nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::convertToData()**



     Utilicemos PharData::convertToData():

&lt;?php
try {
$tarphar = new PharData('monphar.tar');
// note que monphar.tar no se _borra_
// al convertirlo al formato tar no ejecutable
// se crea monphar.zip
$zip = $tarphar-&gt;convertToData(Phar::ZIP);
// se crea monphar.tbz
$tgz = $zip-&gt;convertToData(Phar::TAR, Phar::BZ2, '.tbz');
// se crea monphar.phar.tgz
$phar = $tarphar-&gt;convertToData(Phar::PHAR); // lanza una excepción
} catch (Exception $e) {
// los errores se manejan aquí
}
?&gt;

### Ver también

    - [Phar::convertToExecutable()](#phar.converttoexecutable) - Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

    - [Phar::convertToData()](#phar.converttodata) - Convierte un archivo phar en un fichero no ejecutable

    - [PharData::convertToExecutable()](#phardata.converttoexecutable) - Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable

# PharData::convertToExecutable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::convertToExecutable — Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable

### Descripción

public **PharData::convertToExecutable**([?](#language.types.null)[int](#language.types.integer) $format = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[Phar](#class.phar)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Este método se utiliza para convertir un archivo tar o zip no ejecutable en un
archivo phar ejecutable. Cualquiera de los tres formatos de archivo
(phar, tar o zip) puede ser utilizado y la compresión del archivo completo también es posible.

Si no se solicita ningún cambio, este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception).

En caso de éxito, este método crea un nuevo archivo en el disco y devuelve un objeto
[Phar](#class.phar). El archivo antiguo no se borra del disco, lo cual debe
hacerse manualmente una vez finalizado el procesamiento.

### Parámetros

     format


       El formato debe ser Phar::PHAR, Phar::TAR
       o Phar::ZIP. Si es **[null](#constant.null)**, se conservará el formato de archivo actual.






     compression


       La compresión debe ser Phar::NONE para evitar la compresión del archivo
       completo, Phar::GZ para la compresión basada en zlib, y
       Phar::BZ2 para la compresión basada en bzip.






     extension


       Este parámetro se utiliza para sobrescribir la extensión de archivo por defecto del archivo convertido. Tenga en cuenta
       que todos los archivos basados en tar y zip deben contener
       .phar en su extensión de archivo para poder ser tratados como archivos
       phar.




       En caso de conversión a un archivo basado en phar, las extensiones por defecto son
       .phar, .phar.gz o .phar.bz2
       según la compresión especificada. Para los archivos phar basados en tar, las extensiones por defecto
       son .phar.tar, .phar.tar.gz
       y .phar.tar.bz2. Para los archivos phar basados en zip, la extensión por
       defecto es .phar.zip.





### Valores devueltos

Este método devuelve un objeto [Phar](#class.phar) en caso de éxito,
o **[null](#constant.null)** en caso de fallo

### Errores/Excepciones

Este método lanza una excepción [BadMethodCallException](#class.badmethodcallexception)
cuando no puede comprimir, cuando se ha especificado un método de compresión desconocido, cuando el archivo solicitado está en búfer con
[Phar::startBuffering()](#phar.startbuffering) y no se ha concluido con
[Phar::stopBuffering()](#phar.stopbuffering), lanza una excepción
[UnexpectedValueException](#class.unexpectedvalueexception) si el soporte de escritura está desactivado,
y lanza una excepción [PharException](#class.pharexception) si se han encontrado problemas
durante la creación del phar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       format, compression,
       y localName ahora son nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::convertToExecutable()**



     Utilizando PharData::convertToExecutable() :

&lt;?php
try {
$tarphar = new PharData('monphar.tar');
    // lo convierte al formato de archivo phar
    // note que monphar.tar *no* se borra
    $phar = $tarphar-&gt;convertToExecutable(Phar::PHAR); // crea monphar.phar
    $phar-&gt;setStub($phar-&gt;createDefaultStub('cli.php', 'web/index.php'));
// crea monphar.phar.tgz
$compressed = $tarphar-&gt;convertToExecutable(Phar::TAR, Phar::GZ, '.phar.tgz');
} catch (Exception $e) {
// los errores se manejan aquí
}
?&gt;

### Ver también

    - [Phar::convertToExecutable()](#phar.converttoexecutable) - Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable

    - [Phar::convertToData()](#phar.converttodata) - Convierte un archivo phar en un fichero no ejecutable

    - [PharData::convertToData()](#phardata.converttodata) - Convierte un archivo phar en un archivo tar o zip no ejecutable

# PharData::copy

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::copy — Copia un fichero interno del archivo tar/zip a otro fichero dentro del mismo archivo

### Descripción

public **PharData::copy**([string](#language.types.string) $from, [string](#language.types.string) $to): [true](#language.types.singleton)

Copia un fichero interno del archivo tar/zip a otro fichero dentro del mismo archivo.
Es una alternativa orientada a objetos al uso de [copy()](#function.copy) con
el gestor de flujos phar.

### Parámetros

     from








     to







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se lanza una excepción [UnexpectedValueException](#class.unexpectedvalueexception) si el fichero de origen no existe,
si el fichero de destino ya existe, si el soporte de escritura está desactivado, si falla la apertura
de alguno de los dos ficheros o si falla la lectura del fichero de origen; o se lanza una excepción
[PharException](#class.pharexception) si falla la escritura de los cambios del archivo phar.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::copy()**



     Este ejemplo muestra el uso de **PharData::copy()** y su equivalente
     en términos de gestor de flujos. La principal diferencia entre ambos enfoques
     radica en la gestión de errores. Todos los métodos PharData lanzan excepciones, mientras
     que el gestor de flujos utiliza [trigger_error()](#function.trigger-error).

&lt;?php

try {
$phar = new PharData('monphar.tar');
$phar['a'] = 'salut';
$phar-&gt;copy('a', 'b');
echo $phar['b']; // Muestra "phar://myphar.tar/b"
} catch (Exception $e) {
// Se manejan los errores
}

// El equivalente en términos de flujo del ejemplo anterior.
// Se lanzan E_WARNING en caso de error en lugar de excepciones.
copy('phar://monphar.tar/a', 'phar//monphar.tar/c');
echo file_get_contents('phar://monphar.tar/c'); // Muestra "salut"
?&gt;

# PharData::decompress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::decompress — Descomprime el archivo Phar completo

### Descripción

public **PharData::decompress**([?](#language.types.null)[string](#language.types.string) $extension = **[null](#constant.null)**): [?](#language.types.null)[PharData](#class.phardata)

Descomprime el archivo completo, si es un archivo tar.

Para los archivos Zip, este método falla y lanza una excepción.
La extensión [zlib](#ref.zlib) debe estar activada
para descomprimir un archivo comprimido con gzip y la extensión
[bzip2](#ref.bzip2) debe estar disponible para
descomprimir un archivo comprimido con bzip2.

Además, este método renombra automáticamente la extensión de
archivo del archivo, .tar por defecto.
De lo contrario, una extensión de archivo puede especificarse con el argumento
extension.

### Parámetros

     extension


       Para descomprimir, la extensión por defecto es
       .tar. Utilice este argumento
       para especificar otra extensión de archivo. Tenga en cuenta que
       solo los archivos ejecutables pueden contener .phar en su nombre de archivo.





### Valores devueltos

Un objeto [PharData](#class.phardata) es devuelto en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si
la extensión [zlib](#ref.zlib) no está disponible o si
la extensión [bzip2](#ref.bzip2) no está activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       extension ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con PharData::decompress()**

&lt;?php
$p = new PharData('/path/to/my.tar.gz');
$p-&gt;decompress(); // crea /path/to/my.tar
?&gt;

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [PharData::compressFiles()](#phardata.compressfiles) - Comprime todos los ficheros del archivo tar/zip actual

    - [PharData::decompressFiles()](#phardata.decompressfiles) - Descomprime todos los ficheros del archivo zip actual

# PharData::decompressFiles

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::decompressFiles — Descomprime todos los ficheros del archivo zip actual

### Descripción

public **PharData::decompressFiles**(): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Para los archivos basados en tar, este método levanta una excepción
[BadMethodCallException](#class.badmethodcallexception), ya que la compresión individual de los ficheros
dentro de un archivo tar no es soportada por el formato de archivo. Utilice
[PharData::compress()](#phardata.compress) para comprimir un archivo completo basado en tar.

Para los archivos basados en Zip, este método descomprime todos los ficheros del archivo.
Las extensiones [zlib](#ref.zlib) o [bzip2](#ref.bzip2)
deben estar activadas para aprovechar esta funcionalidad si al menos uno de los ficheros
está comprimido con bzip2/zlib.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si
la extensión [zlib](#ref.zlib) no está disponible o si al menos uno
de los ficheros está comprimido con bzip2 y la extensión [bzip2](#ref.bzip2)
no está activada.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::decompressFiles()**

&lt;?php
$p = new PharData('/ruta/hacia/mion.zip');
$p['mifichero.txt'] = 'hola';
$p['mifichero2.txt'] = 'hola';
$p-&gt;compressFiles(Phar::GZ);
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
$p-&gt;decompressFiles();
foreach ($p as $file) {
    var_dump($file-&gt;getFileName());
var_dump($file-&gt;isCompressed());
    var_dump($file-&gt;isCompressed(Phar::BZ2));
var_dump($file-&gt;isCompressed(Phar::GZ));
}
?&gt;

    El ejemplo anterior mostrará:

string(14) "mifichero.txt"
int(4096)
bool(false)
bool(true)
string(15) "mifichero2.txt"
int(4096)
bool(false)
bool(true)
string(14) "mifichero.txt"
bool(false)
bool(false)
bool(false)
string(15) "mifichero2.txt"
bool(false)
bool(false)
bool(false)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [PharData::compressFiles()](#phardata.compressfiles) - Comprime todos los ficheros del archivo tar/zip actual

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [PharData::compress()](#phardata.compress) - Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2

    - [PharData::decompress()](#phardata.decompress) - Descomprime el archivo Phar completo

# PharData::delMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::delMetadata — Elimina los metadatos globales de un archivo zip

### Descripción

public **PharData::delMetadata**(): [true](#language.types.singleton)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Elimina los metadatos globales del archivo zip

### Parámetros

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se genera una excepción [PharException](#class.pharexception) si se producen errores durante
la escritura de los cambios en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::delMetaData()**

&lt;?php
try {
$phar = new PharData('monphar.zip');
    var_dump($phar-&gt;getMetadata());
$phar-&gt;setMetadata("salut");
    var_dump($phar-&gt;getMetadata());
$phar-&gt;delMetadata();
    var_dump($phar-&gt;getMetadata());
} catch (Exception $e) {
// se manejan los errores
}
?&gt;

    El ejemplo anterior mostrará:

NULL
string(5) "salut"
NULL

### Ver también

    - [Phar::delMetadata()](#phar.delmetadata) - Elimina los metadatos globales del phar

# PharData::delete

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::delete — Elimina un fichero dentro del archivo tar/zip

### Descripción

public **PharData::delete**([string](#language.types.string) $localName): [true](#language.types.singleton)

Elimina un fichero dentro del archivo. Es equivalente a la llamada a
[unlink()](#function.unlink) utilizando el manejador de flujo phar,
como se muestra en el ejemplo a continuación.

### Parámetros

     localName


       Ruta del fichero a eliminar dentro del archivo.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) si se producen
errores durante la escritura de los cambios en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::delete()**

&lt;?php
try {
$phar = new PharData('monphar.zip');
$phar-&gt;delete('efface/moi.php');
// es equivalente a:
unlink('phar://monphar.phar/efface/mon.php');
} catch (Exception $e) {
// se manejan los errores
}
?&gt;

### Ver también

    - [Phar::delete()](#phar.delete) - Elimina un fichero dentro de un archivo phar

# PharData::\_\_destruct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::\_\_destruct — Destruye un objeto tar no ejecutable o un archivo zip

### Descripción

public **PharData::\_\_destruct**()

### Parámetros

Esta función no contiene ningún parámetro.

# PharData::extractTo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::extractTo — Extrae el contenido de un archivo tar/zip hacia un directorio

### Descripción

public **PharData::extractTo**([string](#language.types.string) $directory, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $files = **[null](#constant.null)**, [bool](#language.types.boolean) $overwrite = **[false](#constant.false)**): [bool](#language.types.boolean)

Extrae todos los ficheros de un archivo tar/zip hacia el disco.
Los ficheros y directorios extraídos conservan los permisos
tal como en el archivo. Los parámetros opcionales permiten un
eventual control sobre qué ficheros serán extraídos y si los ficheros
ya existentes en el disco pueden ser sobrescritos. El segundo parámetro
files puede ser el nombre de un fichero o directorio
a extraer, o un array de nombres de ficheros y directorios a extraer.
Por omisión, este método no sobrescribirá ningún fichero ya existente, a menos
que el tercer parámetro sea **[true](#constant.true)**. Este método es idéntico a
[ZipArchive::extractTo()](#ziparchive.extractto).

### Parámetros

     directory


       Ruta donde los ficheros serán extraídos.






     files


       El nombre de un fichero o directorio a extraer, o un array
       de ficheros/directorios a extraer






     overwrite


       Pasarlo a **[true](#constant.true)** para activar la sobrescritura de ficheros ya
       existentes





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, pero es preferible verificar las
excepciones lanzadas y considerar el éxito si ninguna se produce.

### Errores/Excepciones

Lanza una excepción [PharException](#class.pharexception) si se encuentran
errores al escribir los cambios en el disco.

### Ejemplos

    **Ejemplo #1 Ejemplo con PharData::extractTo()**

&lt;?php
try {
$phar = new PharData('monphar.tar');
$phar-&gt;extractTo('/ruta/completa'); // extrae todos los ficheros
$phar-&gt;extractTo('/otra/ruta', 'fichero.txt'); // extrae solo fichero.txt
$phar-&gt;extractTo('/esta/ruta',
array('fichero1.txt', 'fichero2.txt')); // extrae solo 2 ficheros
$phar-&gt;extractTo('/tercera/ruta', null, true); // extrae todos los ficheros, sobrescribiendo
} catch (Exception $e) {
// se manejan los errores
}
?&gt;

### Notas

**Nota**:

Los sistemas de archivos NTFS de Windows
no soportan ciertos caracteres en los nombres de archivo, como &lt;|&gt;\*?":. Los nombres de archivo con un punto
final no son soportados. A diferencia de algunas herramientas de extracción, este método no reemplaza estos caracteres con
un guión bajo, sino que falla al extraer tales archivos.

### Ver también

    - [Phar::extractTo()](#phar.extractto) - Extrae el contenido de un archivo phar hacia un directorio

# PharData::isWritable

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::isWritable — Verifica si el archivo tar/zip puede ser modificado

### Descripción

public **PharData::isWritable**(): [bool](#language.types.boolean)

Este método devuelve **[true](#constant.true)** si el archivo tar/zip en el disco no es de solo lectura.
A diferencia de [Phar::isWritable()](#phar.iswritable), los archivos tar/zip de datos
pueden ser modificados incluso si phar.readonly está a 1.

### Parámetros

No se proporcionan argumentos.

### Valores devueltos

Devuelve **[true](#constant.true)** si el archivo tar/zip puede ser modificado

### Ver también

    - [Phar::canWrite()](#phar.canwrite) - Determina si la extensión phar soporta la creación y escritura de archivos phar

    - [Phar::isWritable()](#phar.iswritable) - Retorna true si el archivo phar puede ser modificado

# PharData::offsetSet

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::offsetSet — Rellena un fichero dentro del archivo tar/zip con el contenido de un fichero externo o de un string

### Descripción

public **PharData::offsetSet**([string](#language.types.string) $localName, [resource](#language.types.resource)|[string](#language.types.string) $value): [void](language.types.void.html)

Es una implementación de la interfaz [ArrayAccess](#class.arrayaccess) que permite la manipulación
directa del contenido de un archivo tar/zip utilizando los corchetes, operadores de acceso al array. offsetSet es
utilizado para modificar un fichero existente o para añadir un nuevo fichero al archivo tar/zip.

### Parámetros

     localName


       La ruta (relativa) del fichero a modificar dentro del archivo tar o zip.






     value


       Contenido del fichero.





### Valores devueltos

No se devuelve ningún valor.

### Errores/Excepciones

Se lanza una excepción
[PharException](#class.pharexception) si se han encontrado problemas al escribir en el disco
los cambios del archivo tar/zip.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::offsetSet()**



     offsetSet no debe ser accedido directamente, sino que debe ser utilizado a través
     del operador [].

&lt;?php
$p = new PharData('/ruta/al/mon.tar');
try {
// llama a offsetSet
$p['fichero.txt'] = 'Hola';
} catch (Exception $e) {
echo 'No se puede modificar fichero.txt:', $e;
}
?&gt;

### Notas

**Nota**:

[Phar::addFile()](#phar.addfile), [Phar::addFromString()](#phar.addfromstring) y [Phar::offsetSet()](#phar.offsetset)
registran un nuevo archivo phar cada vez que son llamadas. Si las prestaciones son una preocupación,
[Phar::buildFromDirectory()](#phar.buildfromdirectory) o [Phar::buildFromIterator()](#phar.buildfromiterator)
deberían ser utilizadas en su lugar.

### Ver también

    - [Phar::offsetSet()](#phar.offsetset) - Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo

# PharData::offsetUnset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::offsetUnset — Elimina un fichero de un archivo tar/zip

### Descripción

public **PharData::offsetUnset**([string](#language.types.string) $localName): [void](language.types.void.html)

Es una implementación de la interfaz [ArrayAccess](#class.arrayaccess) que permite la manipulación
directa del contenido de un archivo tar/zip utilizando los corchetes, operadores de acceso al array. offsetUnset es
utilizado para borrar un fichero existente y es llamado por la construcción de lenguaje [unset()](#function.unset).

### Parámetros

     localName


       La ruta (relativa) del fichero a modificar dentro del archivo tar o zip.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Genera una excepción
[PharException](#class.pharexception) si se han encontrado problemas al escribir en el disco
los cambios del archivo tar/zip.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharData::offsetUnset()**

&lt;?php
$p = new PharData('/ruta/al/mon.zip');
try {
    // borra archivo.txt de mon.zip llamando a offsetUnset
    unset($p['archivo.txt']);
} catch (Exception $e) {
echo 'No puede borrar archivo.txt: ', $e;
}
?&gt;

### Ver también

    - [Phar::offsetUnset()](#phar.offsetunset) - Elimina un fichero de un phar

# PharData::setAlias

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::setAlias — Función inútil (Phar::setAlias no es válido para PharData)

### Descripción

public **PharData::setAlias**([string](#language.types.string) $alias): [bool](#language.types.boolean)

Los archivos tar/zip no ejecutables no pueden tener alias, por lo que este método
solo genera una excepción.

### Parámetros

     alias


       Una corta cadena de caracteres a la cual referirse para invocar al archivo
       mediante el gestor de flujos phar. Este argumento es ignorado.





### Valores devueltos

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) al llamar al método

### Ver también

    - [Phar::setAlias()](#phar.setalias) - Establece el alias del archivo Phar

# PharData::setDefaultStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::setDefaultStub — Función inútil (Phar::setDefaultStub no es válido para PharData)

### Descripción

public **PharData::setDefaultStub**([?](#language.types.null)[string](#language.types.string) $index = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $webIndex = **[null](#constant.null)**): [bool](#language.types.boolean)

Los archivos tar/zip no ejecutables no pueden tener un contenedor de carga, por lo que este método
solo genera una excepción.

### Parámetros

     index


       Ruta relativa dentro del archivo phar a ejecutar en caso de acceso desde la línea de comandos






     webIndex


       Ruta relativa dentro del archivo phar a ejecutar en caso de acceso desde un navegador





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) al llamar al método

### Historial de cambios

      Versión
      Descripción






      8.0.0

       webIndex ahora es nullable.



### Ver también

    - [Phar::setDefaultStub()](#phar.setdefaultstub) - Utilizado para establecer el cargador PHP o el contenedor de carga de un archivo Phar como cargador por defecto

# PharData::setMetadata

(No version information available, might only be in Git)

PharData::setMetadata — Fija las metadatos del archivo

### Descripción

public **PharData::setMetadata**([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

[Phar::setMetadata()](#phar.setmetadata) debe ser utilizado para almacenar metadatos personalizados
que describen algo acerca del archivo phar como entidad completa.
[PharFileInfo::setMetadata()](#pharfileinfo.setmetadata) debe ser utilizado para metadatos específicos de ficheros.
Las metadatos pueden degradar el rendimiento de carga de un archivo phar si los datos son demasiado pesados.

Las metadatos pueden ser utilizadas para especificar qué fichero dentro del archivo debe ser utilizado para
cargar el archivo o la ubicación de un fichero de manifiesto como el fichero package.xml de
[» PEAR](https://pear.php.net/).
En general, cualquier dato útil que describa el archivo phar puede ser almacenado.

### Parámetros

     metadata


       Cualquier variable PHP que contenga información a almacenar para describir el archivo phar





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Un ejemplo con [Phar::setMetadata()](#phar.setmetadata)**

&lt;?php
// se asegura de que el phar no exista
@unlink('nouveauphar.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nouveauphar.phar', 0, 'nouveauphar.phar');
    $p['fichier.php'] = '&lt;?php echo "salut"';
    $p-&gt;setMetadata(array('chargement' =&gt; 'fichier.php'));
    var_dump($p-&gt;getMetadata());
} catch (Exception $e) {
echo 'No puede crear/modificar el phar:', $e;
}
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["chargement"]=&gt;
string(11) "fichier.php"
}

### Ver también

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

    - [Phar::delMetadata()](#phar.delmetadata) - Elimina los metadatos globales del phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

# PharData::setSignatureAlgorithm

(No version information available, might only be in Git)

PharData::setSignatureAlgorithm — Asigna el algoritmo de firma de un phar y lo aplica

### Descripción

public **PharData::setSignatureAlgorithm**([int](#language.types.integer) $algo, [?](#language.types.null)[string](#language.types.string) $privateKey = **[null](#constant.null)**): [void](language.types.void.html)

**Nota**:

Este
método requiere que la variable de configuración INI phar.readonly
esté definida a 0 para funcionar con los objetos [Phar](#class.phar).
De lo contrario, se lanzará una excepción [PharException](#class.pharexception).

Asigna el algoritmo de firma de un phar y lo aplica. El algoritmo
de firma debe ser Phar::MD5,
Phar::SHA1, Phar::SHA256,
Phar::SHA512, o Phar::OPENSSL.

### Parámetros

     algo


       Un algoritmo entre Phar::MD5,
       Phar::SHA1, Phar::SHA256,
       Phar::SHA512, o Phar::OPENSSL.






     privateKey


       El contenido de una clave privada OpenSSL, como extraída desde un
       certificado o un fichero de clave OpenSSL:


&lt;?php
$private = openssl_get_privatekey(file_get_contents('private.pem'));
$pkey = '';
openssl_pkey_export($private, $pkey);
$p-&gt;setSignatureAlgorithm(Phar::OPENSSL, $pkey);
?&gt;

       Ver la [introducción Phar](#phar.using) para consignas de nombramiento y ubicación de ficheros de clave pública.



### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Levanta una excepción [UnexpectedValueException](#class.unexpectedvalueexception) para muchos errores,
una excepción [BadMethodCallException](#class.badmethodcallexception) si la llamada se realiza para un archivo phar
basado en tar o en zip, una excepción [PharException](#class.pharexception) si se encuentran problemas
al escribir los cambios en el disco.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       privateKey ahora es nullable.



### Ver también

    - [Phar::getSupportedSignatures()](#phar.getsupportedsignatures) - Devuelve un array de los tipos de firma soportados

    - [Phar::getSignature()](#phar.getsignature) - Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar

# PharData::setStub

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharData::setStub — Función inútil (Phar::setStub no es válido para PharData)

### Descripción

public **PharData::setStub**([string](#language.types.string) $stub, [int](#language.types.integer) $len = -1): [bool](#language.types.boolean)

Los archivos tar/zip no ejecutables no pueden tener un contenedor de carga, por lo que este método
solo genera una excepción.

### Parámetros

     stub


    Un string o un manejador de flujo abierto para usar como contenedor de
    carga ejecutable para el archivo phar. Este argumento es ignorado.






     len








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) en cualquier llamada al método

### Ver también

    - [Phar::setStub()](#phar.setstub) - Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar

## Tabla de contenidos

- [PharData::addEmptyDir](#phardata.addemptydir) — Añade un directorio vacío al archivo tar/zip
- [PharData::addFile](#phardata.addfile) — Añade un fichero del sistema de archivos al archivo tar/zip
- [PharData::addFromString](#phardata.addfromstring) — Añade un fichero a partir de un string al archivo tar/zip
- [PharData::buildFromDirectory](#phardata.buildfromdirectory) — Construye un archivo tar/zip a partir de los ficheros de un directorio
- [PharData::buildFromIterator](#phardata.buildfromiterator) — Construye un archivo tar o zip a partir de un iterador
- [PharData::compress](#phardata.compress) — Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2
- [PharData::compressFiles](#phardata.compressfiles) — Comprime todos los ficheros del archivo tar/zip actual
- [PharData::\_\_construct](#phardata.construct) — Construye un objeto de archivo tar o zip no ejecutable
- [PharData::convertToData](#phardata.converttodata) — Convierte un archivo phar en un archivo tar o zip no ejecutable
- [PharData::convertToExecutable](#phardata.converttoexecutable) — Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable
- [PharData::copy](#phardata.copy) — Copia un fichero interno del archivo tar/zip a otro fichero dentro del mismo archivo
- [PharData::decompress](#phardata.decompress) — Descomprime el archivo Phar completo
- [PharData::decompressFiles](#phardata.decompressfiles) — Descomprime todos los ficheros del archivo zip actual
- [PharData::delMetadata](#phardata.delmetadata) — Elimina los metadatos globales de un archivo zip
- [PharData::delete](#phardata.delete) — Elimina un fichero dentro del archivo tar/zip
- [PharData::\_\_destruct](#phardata.destruct) — Destruye un objeto tar no ejecutable o un archivo zip
- [PharData::extractTo](#phardata.extractto) — Extrae el contenido de un archivo tar/zip hacia un directorio
- [PharData::isWritable](#phardata.iswritable) — Verifica si el archivo tar/zip puede ser modificado
- [PharData::offsetSet](#phardata.offsetset) — Rellena un fichero dentro del archivo tar/zip con el contenido de un fichero externo o de un string
- [PharData::offsetUnset](#phardata.offsetunset) — Elimina un fichero de un archivo tar/zip
- [PharData::setAlias](#phardata.setalias) — Función inútil (Phar::setAlias no es válido para PharData)
- [PharData::setDefaultStub](#phardata.setdefaultstub) — Función inútil (Phar::setDefaultStub no es válido para PharData)
- [PharData::setMetadata](#phardata.setmetadata) — Fija las metadatos del archivo
- [PharData::setSignatureAlgorithm](#phardata.setsignaturealgorithm) — Asigna el algoritmo de firma de un phar y lo aplica
- [PharData::setStub](#phardata.setstub) — Función inútil (Phar::setStub no es válido para PharData)

# La clase PharFileInfo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

## Introducción

    La clase PharFileInfo proporciona una interfaz de alto nivel para acceder al contenido
    y a los atributos de un fichero contenido en un archivo phar.

## Sinopsis de la Clase

     class **PharFileInfo**



     extends
      [SplFileInfo](#class.splfileinfo)
     {

    /* Métodos */

public [\_\_construct](#pharfileinfo.construct)([string](#language.types.string) $filename)

    public [chmod](#pharfileinfo.chmod)([int](#language.types.integer) $perms): [void](language.types.void.html)

public [compress](#pharfileinfo.compress)([int](#language.types.integer) $compression): [true](#language.types.singleton)
public [decompress](#pharfileinfo.decompress)(): [true](#language.types.singleton)
public [delMetadata](#pharfileinfo.delmetadata)(): [true](#language.types.singleton)
public [getCRC32](#pharfileinfo.getcrc32)(): [int](#language.types.integer)
public [getCompressedSize](#pharfileinfo.getcompressedsize)(): [int](#language.types.integer)
public [getContent](#pharfileinfo.getcontent)(): [string](#language.types.string)
public [getMetadata](#pharfileinfo.getmetadata)([array](#language.types.array) $unserializeOptions = []): [mixed](#language.types.mixed)
public [getPharFlags](#pharfileinfo.getpharflags)(): [int](#language.types.integer)
public [hasMetadata](#pharfileinfo.hasmetadata)(): [bool](#language.types.boolean)
public [isCRCChecked](#pharfileinfo.iscrcchecked)(): [bool](#language.types.boolean)
public [isCompressed](#pharfileinfo.iscompressed)([?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**): [bool](#language.types.boolean)
public [setMetadata](#pharfileinfo.setmetadata)([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)

    public [__destruct](#pharfileinfo.destruct)()


    /* Métodos heredados */
    public [SplFileInfo::getATime](#splfileinfo.getatime)(): [int](#language.types.integer)|[false](#language.types.singleton)

public [SplFileInfo::getBasename](#splfileinfo.getbasename)([string](#language.types.string) $suffix = ""): [string](#language.types.string)
public [SplFileInfo::getCTime](#splfileinfo.getctime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getExtension](#splfileinfo.getextension)(): [string](#language.types.string)
public [SplFileInfo::getFileInfo](#splfileinfo.getfileinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getFilename](#splfileinfo.getfilename)(): [string](#language.types.string)
public [SplFileInfo::getGroup](#splfileinfo.getgroup)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getInode](#splfileinfo.getinode)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getLinkTarget](#splfileinfo.getlinktarget)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getMTime](#splfileinfo.getmtime)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getOwner](#splfileinfo.getowner)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getPath](#splfileinfo.getpath)(): [string](#language.types.string)
public [SplFileInfo::getPathInfo](#splfileinfo.getpathinfo)([?](#language.types.null)[string](#language.types.string) $class = **[null](#constant.null)**): [?](#language.types.null)[SplFileInfo](#class.splfileinfo)
public [SplFileInfo::getPathname](#splfileinfo.getpathname)(): [string](#language.types.string)
public [SplFileInfo::getPerms](#splfileinfo.getperms)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getRealPath](#splfileinfo.getrealpath)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::getSize](#splfileinfo.getsize)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [SplFileInfo::getType](#splfileinfo.gettype)(): [string](#language.types.string)|[false](#language.types.singleton)
public [SplFileInfo::isDir](#splfileinfo.isdir)(): [bool](#language.types.boolean)
public [SplFileInfo::isExecutable](#splfileinfo.isexecutable)(): [bool](#language.types.boolean)
public [SplFileInfo::isFile](#splfileinfo.isfile)(): [bool](#language.types.boolean)
public [SplFileInfo::isLink](#splfileinfo.islink)(): [bool](#language.types.boolean)
public [SplFileInfo::isReadable](#splfileinfo.isreadable)(): [bool](#language.types.boolean)
public [SplFileInfo::isWritable](#splfileinfo.iswritable)(): [bool](#language.types.boolean)
public [SplFileInfo::openFile](#splfileinfo.openfile)([string](#language.types.string) $mode = "r", [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**, [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**): [SplFileObject](#class.splfileobject)
public [SplFileInfo::setFileClass](#splfileinfo.setfileclass)([string](#language.types.string) $class = SplFileObject::class): [void](language.types.void.html)
public [SplFileInfo::setInfoClass](#splfileinfo.setinfoclass)([string](#language.types.string) $class = SplFileInfo::class): [void](language.types.void.html)
public [SplFileInfo::\_\_toString](#splfileinfo.tostring)(): [string](#language.types.string)

}

# PharFileInfo::chmod

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::chmod — Fija los bits de permiso específicos de los ficheros

### Descripción

public **PharFileInfo::chmod**([int](#language.types.integer) $perms): [void](language.types.void.html)

**PharFileInfo::chmod()** permite fijar los bits de ejecución
de los ficheros, así como los de solo lectura. Los de escritura son ignorados ya que se fijan
al inicio por la variable INI [phar.readonly](#ini.phar.readonly).
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar en off para tener éxito si el fichero
se encuentra dentro de un archivo [Phar](#class.phar). Los ficheros dentro de un archivo
[PharData](#class.phardata) no tienen esta restricción.

### Parámetros

     perms


       Los permisos (ver [chmod()](#function.chmod))





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::chmod()**

&lt;?php
// se asegura de que el phar no exista
@unlink('nouveauphar.phar');
try {
$p = new Phar('nouveauphar.phar', 0, 'nouveauphar.phar');
    $p['fichier.sh'] = '#!/usr/local/lib/php
    &lt;?php echo "salut"; ?&gt;';
    // establece el bit de ejecución
    $p['fichier.sh']-&gt;chmod(0555);
    var_dump($p['fichier.sh']-&gt;isExecutable());
} catch (Exception $e) {
echo 'No puede crear/modificar el phar: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# PharFileInfo::compress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharFileInfo::compress — Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

### Descripción

public **PharFileInfo::compress**([int](#language.types.integer) $compression): [true](#language.types.singleton)

Este método comprime el fichero dentro del archivo Phar utilizando una de las compresiones
bzip2 o zlib. Las extensiones [bzip2](#ref.bzip2) o [zlib](#ref.zlib)
deben estar activadas para aprovechar esta funcionalidad. Además, si el fichero ya está comprimido,
la extensión adecuada debe estar activada para descomprimirlo. Al igual que con todas las
funcionalidades que modifican el contenido de un phar, la variable INI [phar.readonly](#ini.phar.readonly)
debe estar a off para tener éxito si el fichero está dentro de un archivo [Phar](#class.phar).
Los ficheros dentro de archivos [PharData](#class.phardata) no tienen esta restricción.

### Parámetros

     compression


       La compresión debe ser **[Phar::GZ](#phar.constants.gz)** o **[Phar::BZ2](#phar.constants.bz2)**.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception) si la variable INI
[phar.readonly](#ini.phar.readonly) está a on, o si la extensión
[bzip2](#ref.bzip2)/[zlib](#ref.zlib) no está
disponible.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::compress()**

&lt;?php
try {
$p = new Phar('/ruta/hacia/mifichero.phar', 0, 'mifichero.phar');
    $p['mifichero.txt'] = 'hola';
    $file = $p['mifichero.txt'];
    var_dump($file-&gt;isCompressed(Phar::BZ2));
$p['mifichero.txt']-&gt;compress(Phar::BZ2);
    var_dump($file-&gt;isCompressed(Phar::BZ2));
} catch (Exception $e) {
echo 'No puede crear/modificar mifichero.phar : ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

# PharFileInfo::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::\_\_construct — Construye un objeto de entrada Phar

### Descripción

public **PharFileInfo::\_\_construct**([string](#language.types.string) $filename)

Este método no debe ser llamado directamente. En su lugar, un objeto
[PharFileInfo](#class.pharfileinfo) es inicializado llamando
[Phar::offsetGet()](#phar.offsetget) mediante un acceso de tipo array.

### Parámetros

     filename


       La URL completa para recuperar un fichero. Si se desea recuperar
       la información del fichero mon/fichier.php
       del phar boo.phar, se deberá especificar
       phar://boo.phar/mon/fichier.php.





### Errores/Excepciones

Genera una excepción [BadMethodCallException](#class.badmethodcallexception) si
[\_\_construct()](#object.construct) es llamado dos veces.
Genera una excepción [UnexpectedValueException](#class.unexpectedvalueexception) si
la URL del phar solicitado está mal formada, si el phar no puede ser abierto o
si el fichero no puede ser encontrado dentro del phar.

### Ejemplos

    **Ejemplo #1 Ejemplo con PharFileInfo::__construct()**

&lt;?php
try {
$p = new Phar('/ruta/hacia/mon.phar', 0, 'mon.phar');
    $p['fichierdetest.txt'] = "hola\nmi\namigo";
    $file = $p['fichierdetest.txt'];
    foreach ($file as $line =&gt; $text) {
        echo "línea número $line: $text";
    }
    // esto también funciona
    $file = new PharFileInfo('phar:///ruta/hacia/mon.phar/fichierdetest.txt');
    foreach ($file as $line =&gt; $text) {
echo "línea número $line: $text";
}
} catch (Exception $e) {
echo 'La operación Phar ha fallado: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

línea número 1: hola
línea número 2: mi
línea número 3: amigo
línea número 1: hola
línea número 2: mi
línea número 3: amigo

# PharFileInfo::decompress

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 2.0.0)

PharFileInfo::decompress — Descomprime la entrada Phar actual dentro del phar

### Descripción

public **PharFileInfo::decompress**(): [true](#language.types.singleton)

Este método descomprime el fichero dentro del archivo Phar. Según la forma en que el fichero esté
comprimido, las extensiones [bzip2](#ref.bzip2)
o [zlib](#ref.zlib) deben estar activadas para aprovechar esta funcionalidad.
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off para tener éxito si el fichero
se encuentra en un archivo [Phar](#class.phar). Los ficheros dentro de archivos
[PharData](#class.phardata) no tienen esta restricción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se genera una excepción [BadMethodCallException](#class.badmethodcallexception) si
la variable INI [phar.readonly](#ini.phar.readonly) está a on, o
si la extensión [bzip2](#ref.bzip2)/[zlib](#ref.zlib)
no está disponible.

### Ejemplos

    **Ejemplo #1 Ejemplo con PharFileInfo::decompress()**

&lt;?php
try {
$p = new Phar('/ruta/hacia/mon.phar', 0, 'mon.phar');
    $p['monfichier.txt'] = 'hola';
    $file = $p['monfichier.txt'];
    $file-&gt;compress(Phar::GZ);
    var_dump($file-&gt;isCompressed());
$p['monfichier.txt']-&gt;decompress();
    var_dump($file-&gt;isCompressed());
} catch (Exception $e) {
echo 'No puede crear/modificar mon.phar: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

int(4096)
bool(false)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

# PharFileInfo::delMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

PharFileInfo::delMetadata — Elimina las metadatos de la entrada

### Descripción

public **PharFileInfo::delMetadata**(): [true](#language.types.singleton)

Elimina las metadatos de la entrada, si las hay.

### Parámetros

No hay parámetros.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.
Al igual que con todas las funcionalidades que modifican el contenido de un phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar en off para tener éxito si el fichero está
dentro de un archivo [Phar](#class.phar). Los ficheros dentro de archivos
[PharData](#class.phardata) no tienen esta restricción.

### Errores/Excepciones

Genera una excepción [PharException](#class.pharexception) si se han encontrado errores al escribir los cambios en el disco, y una excepción [BadMethodCallException](#class.badmethodcallexception)
si el acceso en escritura está desactivado.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::delMetaData()**

&lt;?php
try {
$a = new Phar('monphar.phar');
    $a['salut'] = 'salut';
    var_dump($a['salut']-&gt;delMetadata());
$a['salut']-&gt;setMetadata('mon pote');
    var_dump($a['salut']-&gt;delMetadata());
var_dump($a['salut']-&gt;delMetadata());
} catch (Exception $e) {
// se manejan los errores
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)
bool(false)

### Ver también

    - [PharFileInfo::setMetadata()](#pharfileinfo.setmetadata) - Establece las metadatos específicas de un fichero

    - [PharFileInfo::hasMetadata()](#pharfileinfo.hasmetadata) - Devuelve las metadatos de la entrada

    - [PharFileInfo::getMetadata()](#pharfileinfo.getmetadata) - Devuelve las metadatos específicas adjuntas a un fichero

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

# PharFileInfo::\_\_destruct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::\_\_destruct — Destruye un objeto PharFileInfo

### Descripción

public **PharFileInfo::\_\_destruct**()

### Parámetros

Esta función no contiene ningún parámetro.

# PharFileInfo::getCRC32

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::getCRC32 — Retorna el código CRC32 o levanta una excepción si el CRC no ha sido verificado

### Descripción

public **PharFileInfo::getCRC32**(): [int](#language.types.integer)

Retorna la suma de verificación [crc32()](#function.crc32) del fichero dentro
del archivo Phar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La suma de verificación [crc32()](#function.crc32) del fichero dentro del archivo Phar.

### Errores/Excepciones

Levanta una excepción [BadMethodCallException](#class.badmethodcallexception)
si el CRC32 del fichero no ha sido verificado aún. Esto no ocurre
normalmente, ya que el CRC es verificado al abrir
el fichero en modo lectura o escritura.

### Ejemplos

    **Ejemplo #1 Ejemplo con PharFileInfo::getCRC32()**

&lt;?php
try {
$p = new Phar('/ruta/versus/mon.phar', 0, 'mon.phar');
$p['monfichier.txt'] = 'salut';
$file = $p['monfichier.txt'];
echo $file-&gt;getCRC32();
} catch (Exception $e) {
echo 'La escritura de mon.phar.phar ha fallado: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

3633523372

# PharFileInfo::getCompressedSize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::getCompressedSize — Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

### Descripción

public **PharFileInfo::getCompressedSize**(): [int](#language.types.integer)

Este método devuelve el tamaño del fichero dentro del archivo Phar. Los ficheros no comprimidos
devolverán el mismo valor con getCompressedSize que con [filesize()](#function.filesize)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El tamaño en bytes del fichero dentro del archivo Phar en el disco.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::getCompressedSize()**

&lt;?php
try {
$p = new Phar('/ruta/hacia/mon.phar', 0, 'mon.phar');
$p['monfichier.txt'] = 'hola';
$file = $p['monfichier.txt'];
echo $file-&gt;getCompressedSize();
} catch (Exception $e) {
echo 'La escritura de mon.phar ha fallado: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

2

### Ver también

    - [PharFileInfo::isCompressed()](#pharfileinfo.iscompressed) - Indica si la entrada está comprimida

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

# PharFileInfo::getContent

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

PharFileInfo::getContent — Obtiene el contenido completo del fichero de la entrada

### Descripción

public **PharFileInfo::getContent**(): [string](#language.types.string)

Esta función se comporta como [file_get_contents()](#function.file-get-contents) pero para
Phar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del fichero.

# PharFileInfo::getMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::getMetadata — Devuelve las metadatos específicas adjuntas a un fichero

### Descripción

public **PharFileInfo::getMetadata**([array](#language.types.array) $unserializeOptions = []): [mixed](#language.types.mixed)

Devuelve las metadatos que han sido guardadas en el manifiesto del archivo Phar para este fichero.

### Parámetros

### Valores devueltos

Cualquier variable PHP que pueda ser serializada y que se almacena como metadatos para el fichero,
o **[null](#constant.null)** si no se almacenan metadatos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El argumento unserializeOptions ha sido añadido.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::getMetadata()**

&lt;?php
// se asegura de que el phar no esté ya
@unlink('nouveauphar.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nouveauphar.phar', 0, 'nouveauphar.phar');
    $p['fichier.txt'] = 'salut';
    $p['fichier.txt']-&gt;setMetadata(array('utilisateur' =&gt; 'PhilDaiguille', 'mime-type' =&gt; 'text/plain'));
    var_dump($p['fichier.txt']-&gt;getMetadata());
} catch (Exception $e) {
echo 'No puede crear/modificar nouveauphar.phar: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["utilisateur"]=&gt;
string(7) "PhilDaiguille"
["mime-type"]=&gt;
string(10) "text/plain"
}

### Ver también

    - [PharFileInfo::setMetadata()](#pharfileinfo.setmetadata) - Establece las metadatos específicas de un fichero

    - [PharFileInfo::hasMetadata()](#pharfileinfo.hasmetadata) - Devuelve las metadatos de la entrada

    - [PharFileInfo::delMetadata()](#pharfileinfo.delmetadata) - Elimina las metadatos de la entrada

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

# PharFileInfo::getPharFlags

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::getPharFlags — Devuelve los flags del archivo Phar

### Descripción

public **PharFileInfo::getPharFlags**(): [int](#language.types.integer)

Este método devuelve los flags establecidos en el manifiesto para un Phar. Siempre devolverá
0 en su implementación actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los flags Phar (siempre 0 en su implementación actual)

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::getPharFlags()**

&lt;?php
try {
$p = new Phar('/ruta/versus/mon.phar', 0, 'mon.phar');
    $p['monfichier.txt'] = 'hola';
    $file = $p['monfichier.txt'];
    var_dump($file-&gt;getPharFlags());
} catch (Exception $e) {
echo 'No puede crear/modificar mon.phar: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

int(0)

# PharFileInfo::hasMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.2.0)

PharFileInfo::hasMetadata — Devuelve las metadatos de la entrada

### Descripción

public **PharFileInfo::hasMetadata**(): [bool](#language.types.boolean)

Devuelve las metadatos de un fichero dentro de un archivo Phar.

### Parámetros

No se admiten argumentos.

### Valores devueltos

Devuelve **[false](#constant.false)** si no hay metadatos presentes o son **[null](#constant.null)**, **[true](#constant.true)** si las metadatos no son **[null](#constant.null)**

### Ver también

    - [PharFileInfo::setMetadata()](#pharfileinfo.setmetadata) - Establece las metadatos específicas de un fichero

    - [PharFileInfo::getMetadata()](#pharfileinfo.getmetadata) - Devuelve las metadatos específicas adjuntas a un fichero

    - [PharFileInfo::delMetadata()](#pharfileinfo.delmetadata) - Elimina las metadatos de la entrada

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

# PharFileInfo::isCRCChecked

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::isCRCChecked — Determina si el fichero tiene un CRC verificado

### Descripción

public **PharFileInfo::isCRCChecked**(): [bool](#language.types.boolean)

Este método determina si un fichero dentro de un archivo Phar tiene un CRC verificado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el fichero tiene un CRC verificado, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::isCRCChecked()**

&lt;?php
try {
$p = new Phar('/ruta/al/mon.phar', 0, 'mon.phar');
    $p['monfichier.txt'] = 'hola';
    $file = $p['monfichier.txt'];
    var_dump($file-&gt;isCRCChecked());
} catch (Exception $e) {
echo 'La creación/modificación de mon.phar ha fallado: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# PharFileInfo::isCompressed

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::isCompressed — Indica si la entrada está comprimida

### Descripción

public **PharFileInfo::isCompressed**([?](#language.types.null)[int](#language.types.integer) $compression = **[null](#constant.null)**): [bool](#language.types.boolean)

Este método determina si un fichero dentro de un archivo Phar está comprimido
con una de las compresiones Gzip o Bzip2.

### Parámetros

     compression


       Una de las compresiones **[Phar::GZ](#phar.constants.gz)** o **[Phar::BZ2](#phar.constants.bz2)**,
       sin compresión por omisión.





### Valores devueltos

**[true](#constant.true)** si el fichero dentro del archivo está comprimido, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       compression ahora es nullable.



### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::isCompressed()**

&lt;?php
try {
$p = new Phar('/ruta/versus/mon.phar', 0, 'mon.phar');
    $p['monfichier.txt'] = 'salut';
    $p['monfichier2.txt'] = 'salut';
    $p['monfichier2.txt']-&gt;setCompressedGZ();
    $file = $p['monfichier.txt'];
    $file2 = $p['monfichier2.txt'];
    var_dump($file-&gt;isCompressed());
var_dump($file2-&gt;isCompressed());
} catch (Exception $e) {
echo 'La creación/modificación de mon.phar ha fallado: ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

### Ver también

    - [PharFileInfo::getCompressedSize()](#pharfileinfo.getcompressedsize) - Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar

    - [PharFileInfo::decompress()](#pharfileinfo.decompress) - Descomprime la entrada Phar actual dentro del phar

    - [PharFileInfo::compress()](#pharfileinfo.compress) - Comprime la entrada Phar actual con una de las compresiones zlib o bzip2

    - [Phar::decompress()](#phar.decompress) - Descomprime el archivo tar completo

    - [Phar::compress()](#phar.compress) - Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2

    - [Phar::canCompress()](#phar.cancompress) - Determina si la extensión phar soporta la compresión utilizando zip o bzip2

    - [Phar::isCompressed()](#phar.iscompressed) - Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)

    - [Phar::getSupportedCompression()](#phar.getsupportedcompression) - Devuelve un array de los algoritmos de compresión soportados

    - [Phar::decompressFiles()](#phar.decompressfiles) - Descomprime todos los ficheros del archivo Phar actual

    - [Phar::compressFiles()](#phar.compressfiles) - Comprime todos los ficheros del archivo Phar actual

# PharFileInfo::setMetadata

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

PharFileInfo::setMetadata — Establece las metadatos específicas de un fichero

### Descripción

public **PharFileInfo::setMetadata**([mixed](#language.types.mixed) $metadata): [void](language.types.void.html)

**PharFileInfo::setMetadata()** debe ser utilizada únicamente para almacenar datos
personalizados en un fichero que no pueden ser almacenados con las informaciones normalmente
almacenadas con el fichero. Las metadatos pueden degradar el rendimiento de carga de un archivo phar
si los datos son demasiado pesados o si hay muchos ficheros con metadatos.
Es importante señalar que los permisos de ficheros son soportados nativamente en un phar; es posible
fijarlos con el método [PharFileInfo::chmod()](#pharfileinfo.chmod). Al igual que con todas las
funcionalidades que modifican el contenido del phar, la variable INI
[phar.readonly](#ini.phar.readonly) debe estar a off para tener éxito si el fichero está
dentro de un archivo [Phar](#class.phar). Los ficheros dentro de archivos [PharData](#class.phardata)
no tienen esta restricción.

Un uso posible de las metadatos es el paso de un usuario/grupo
que debería ser utilizado cuando un fichero es extraído del phar hacia el disco. También puede
especificarse un tipo MIME a devolver. En general, puede almacenarse cualquier dato útil que describa
un fichero pero que no pueda ser inscrito directamente en él.

### Parámetros

     metadata


       Cualquier variable PHP que contenga información a almacenar aparte del fichero





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Un ejemplo con PharFileInfo::setMetadata()**

&lt;?php
// se asegura de que el phar no exista ya
@unlink('nouveauphar.phar');
try {
$p = new Phar(dirname(__FILE__) . '/nouveauphar.phar', 0, 'nouveauphar.phar');
    $p['fichier.txt'] = 'salut';
    $p['fichier.txt']-&gt;setMetadata(array('utilisateur' =&gt; 'PhilDaiguille', 'mime-type' =&gt; 'text/plain'));
    var_dump($p['fichier.txt']-&gt;getMetadata());
} catch (Exception $e) {
echo 'No puede crear/modificar el phar : ', $e;
}
?&gt;

    El ejemplo anterior mostrará:

array(2) {
["utilisateur"]=&gt;
string(7) "PhilDaiguille"
["mime-type"]=&gt;
string(10) "text/plain"
}

### Ver también

    - [PharFileInfo::hasMetadata()](#pharfileinfo.hasmetadata) - Devuelve las metadatos de la entrada

    - [PharFileInfo::getMetadata()](#pharfileinfo.getmetadata) - Devuelve las metadatos específicas adjuntas a un fichero

    - [PharFileInfo::delMetadata()](#pharfileinfo.delmetadata) - Elimina las metadatos de la entrada

    - [Phar::setMetadata()](#phar.setmetadata) - Establece las metadatos del archivo phar

    - [Phar::hasMetadata()](#phar.hasmetadata) - Determina si el phar contiene o no metadatos

    - [Phar::getMetadata()](#phar.getmetadata) - Devuelve las metadatos del archivo phar

## Tabla de contenidos

- [PharFileInfo::chmod](#pharfileinfo.chmod) — Fija los bits de permiso específicos de los ficheros
- [PharFileInfo::compress](#pharfileinfo.compress) — Comprime la entrada Phar actual con una de las compresiones zlib o bzip2
- [PharFileInfo::\_\_construct](#pharfileinfo.construct) — Construye un objeto de entrada Phar
- [PharFileInfo::decompress](#pharfileinfo.decompress) — Descomprime la entrada Phar actual dentro del phar
- [PharFileInfo::delMetadata](#pharfileinfo.delmetadata) — Elimina las metadatos de la entrada
- [PharFileInfo::\_\_destruct](#pharfileinfo.destruct) — Destruye un objeto PharFileInfo
- [PharFileInfo::getCRC32](#pharfileinfo.getcrc32) — Retorna el código CRC32 o levanta una excepción si el CRC no ha sido verificado
- [PharFileInfo::getCompressedSize](#pharfileinfo.getcompressedsize) — Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar
- [PharFileInfo::getContent](#pharfileinfo.getcontent) — Obtiene el contenido completo del fichero de la entrada
- [PharFileInfo::getMetadata](#pharfileinfo.getmetadata) — Devuelve las metadatos específicas adjuntas a un fichero
- [PharFileInfo::getPharFlags](#pharfileinfo.getpharflags) — Devuelve los flags del archivo Phar
- [PharFileInfo::hasMetadata](#pharfileinfo.hasmetadata) — Devuelve las metadatos de la entrada
- [PharFileInfo::isCRCChecked](#pharfileinfo.iscrcchecked) — Determina si el fichero tiene un CRC verificado
- [PharFileInfo::isCompressed](#pharfileinfo.iscompressed) — Indica si la entrada está comprimida
- [PharFileInfo::setMetadata](#pharfileinfo.setmetadata) — Establece las metadatos específicas de un fichero

# La clase PharException

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8, PECL phar &gt;= 1.0.0)

## Introducción

    La clase PharException proporciona una clase de excepción específica para phar
    para los bloques try/catch.

## Sinopsis de la Clase

     class **PharException**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

- [Introducción](#intro.phar)
- [Instalación/Configuración](#phar.setup)<li>[Requerimientos](#phar.requirements)
- [Instalación](#phar.installation)
- [Configuración en tiempo de ejecución](#phar.configuration)
- [Tipos de recursos](#phar.resources)
  </li>- [Constantes predefinidas](#phar.constants)
- [Utilizar los archivos Phar](#phar.using)<li>[Utilizar los archivos Phar : Introducción](#phar.using.intro)
- [Utilizar los archivos Phar : el flujo phar](#phar.using.stream)
- [Utilizar los archivos Phar : las clases Phar y PharData](#phar.using.object)
  </li>- [Creación de archivos Phar](#phar.creating)<li>[Creación de archivos Phar: Introducción](#phar.creating.intro)
  </li>- [¿Qué hace que un phar sea un phar y no un tar o un zip?](#phar.fileformat)<li>[Los componentes de todas las archivos Phar, independientemente del formato de archivo](#phar.fileformat.ingredients)
- [El contenedor de archivo Phar](#phar.fileformat.stub)
- [Comparación entre Phar, Tar y Zip](#phar.fileformat.comparison)
- [Los phars basados en Tar](#phar.fileformat.tar)
- [Los phars basados en Zip](#phar.fileformat.zip)
- [El formato de archivo Phar](#phar.fileformat.phar)
- [Flags "bitmapped" globales del Phar](#phar.fileformat.flags)
- [Definición de las entradas del manifiesto Phar](#phar.fileformat.manifestfile)
- [Formato de firma Phar](#phar.fileformat.signature)
  </li>- [Phar](#class.phar) — La clase Phar<li>[Phar::addEmptyDir](#phar.addemptydir) — Añade un directorio vacío al archivo phar
- [Phar::addFile](#phar.addfile) — Añade un fichero del sistema de ficheros al archivo phar
- [Phar::addFromString](#phar.addfromstring) — Añade un fichero desde un string al archivo phar
- [Phar::apiVersion](#phar.apiversion) — Devuelve la versión de la API
- [Phar::buildFromDirectory](#phar.buildfromdirectory) — Construye un archivo phar a partir de los ficheros de un directorio
- [Phar::buildFromIterator](#phar.buildfromiterator) — Construye un archivo phar a partir de un iterador
- [Phar::canCompress](#phar.cancompress) — Determina si la extensión phar soporta la compresión utilizando zip o bzip2
- [Phar::canWrite](#phar.canwrite) — Determina si la extensión phar soporta la creación y escritura de archivos phar
- [Phar::compress](#phar.compress) — Comprime el archivo Phar completo utilizando la compresión Gzip o Bzip2
- [Phar::compressFiles](#phar.compressfiles) — Comprime todos los ficheros del archivo Phar actual
- [Phar::\_\_construct](#phar.construct) — Construye un objeto de archivo Phar
- [Phar::convertToData](#phar.converttodata) — Convierte un archivo phar en un fichero no ejecutable
- [Phar::convertToExecutable](#phar.converttoexecutable) — Convierte un archivo phar a otro formato de archivo de archivo phar ejecutable
- [Phar::copy](#phar.copy) — Copia un fichero perteneciente a un archivo hacia otro fichero del mismo archivo
- [Phar::count](#phar.count) — Devuelve el número de entradas (ficheros) en el archivo Phar
- [Phar::createDefaultStub](#phar.createdefaultstub) — Crea un contenedor de carga de un archivo Phar
- [Phar::decompress](#phar.decompress) — Descomprime el archivo tar completo
- [Phar::decompressFiles](#phar.decompressfiles) — Descomprime todos los ficheros del archivo Phar actual
- [Phar::delMetadata](#phar.delmetadata) — Elimina los metadatos globales del phar
- [Phar::delete](#phar.delete) — Elimina un fichero dentro de un archivo phar
- [Phar::\_\_destruct](#phar.destruct) — Destruye un objeto archivo Phar
- [Phar::extractTo](#phar.extractto) — Extrae el contenido de un archivo phar hacia un directorio
- [Phar::getAlias](#phar.getalias) — Obtiene el alias para Phar
- [Phar::getMetadata](#phar.getmetadata) — Devuelve las metadatos del archivo phar
- [Phar::getModified](#phar.getmodified) — Indica si el archivo phar ha sido modificado
- [Phar::getPath](#phar.getpath) — Obtiene la ruta de acceso absoluta del archivo Phar en el disco
- [Phar::getSignature](#phar.getsignature) — Devuelve la firma MD5/SHA1/SHA256/SHA512 de un archivo Phar
- [Phar::getStub](#phar.getstub) — Retorna el cargador PHP o el contenedor de carga de un archivo Phar
- [Phar::getSupportedCompression](#phar.getsupportedcompression) — Devuelve un array de los algoritmos de compresión soportados
- [Phar::getSupportedSignatures](#phar.getsupportedsignatures) — Devuelve un array de los tipos de firma soportados
- [Phar::getVersion](#phar.getversion) — Devuelve las informaciones de versión del archivo Phar
- [Phar::hasMetadata](#phar.hasmetadata) — Determina si el phar contiene o no metadatos
- [Phar::interceptFileFuncs](#phar.interceptfilefuncs) — Indica a phar que debe interceptar las funciones de archivos
- [Phar::isBuffering](#phar.isbuffering) — Determina si las operaciones de escritura de Phar están en búfer o se escriben directamente en el disco
- [Phar::isCompressed](#phar.iscompressed) — Devuelve Phar::GZ o PHAR::BZ2 si el archivo completo está comprimido (.tar.gz/tar.bz, etc)
- [Phar::isFileFormat](#phar.isfileformat) — Retorna true si el archivo phar está basado en el formato de archivo tar/phar/zip según el argumento
- [Phar::isValidPharFilename](#phar.isvalidpharfilename) — Determina si el nombre de fichero especificado es un nombre de fichero válido para un archivo phar
- [Phar::isWritable](#phar.iswritable) — Retorna true si el archivo phar puede ser modificado
- [Phar::loadPhar](#phar.loadphar) — Carga cualquier archivo phar con un alias
- [Phar::mapPhar](#phar.mapphar) — Lee el phar ejecutado y carga su manifiesto
- [Phar::mount](#phar.mount) — Monta un camino o un fichero externo a una ubicación virtual dentro del archivo phar
- [Phar::mungServer](#phar.mungserver) — Define una lista de un máximo de 4 variables $\_SERVER que deben ser modificadas durante la ejecución
- [Phar::offsetExists](#phar.offsetexists) — Determina si un fichero existe en el phar
- [Phar::offsetGet](#phar.offsetget) — Obtiene un objeto PharFileInfo a partir de un fichero
- [Phar::offsetSet](#phar.offsetset) — Establece el contenido de un fichero interno en el archivo a partir del contenido de un fichero externo
- [Phar::offsetUnset](#phar.offsetunset) — Elimina un fichero de un phar
- [Phar::running](#phar.running) — Devuelve la ruta completa en el disco o la URL phar completa del archivo phar actualmente ejecutado
- [Phar::setAlias](#phar.setalias) — Establece el alias del archivo Phar
- [Phar::setDefaultStub](#phar.setdefaultstub) — Utilizado para establecer el cargador PHP o el contenedor de carga de un archivo Phar como cargador por defecto
- [Phar::setMetadata](#phar.setmetadata) — Establece las metadatos del archivo phar
- [Phar::setSignatureAlgorithm](#phar.setsignaturealgorithm) — Establece y aplica el algoritmo de firma de un phar
- [Phar::setStub](#phar.setstub) — Utilizado para especificar el cargador PHP o el contenedor de carga de un archivo Phar
- [Phar::startBuffering](#phar.startbuffering) — Inicia el almacenamiento en búfer de escrituras Phar, sin modificar el objeto Phar en el disco
- [Phar::stopBuffering](#phar.stopbuffering) — Detiene el almacenamiento en búfer de las escrituras Phar y provoca la escritura en el disco
- [Phar::unlinkArchive](#phar.unlinkarchive) — Elimina completamente un archivo phar del disco y de la memoria
- [Phar::webPhar](#phar.webphar) — Redirige una solicitud desde un navegador web a un fichero interno en el archivo phar
  </li>- [PharData](#class.phardata) — La clase PharData<li>[PharData::addEmptyDir](#phardata.addemptydir) — Añade un directorio vacío al archivo tar/zip
- [PharData::addFile](#phardata.addfile) — Añade un fichero del sistema de archivos al archivo tar/zip
- [PharData::addFromString](#phardata.addfromstring) — Añade un fichero a partir de un string al archivo tar/zip
- [PharData::buildFromDirectory](#phardata.buildfromdirectory) — Construye un archivo tar/zip a partir de los ficheros de un directorio
- [PharData::buildFromIterator](#phardata.buildfromiterator) — Construye un archivo tar o zip a partir de un iterador
- [PharData::compress](#phardata.compress) — Comprime el archivo tar/zip completo utilizando la compresión Gzip o Bzip2
- [PharData::compressFiles](#phardata.compressfiles) — Comprime todos los ficheros del archivo tar/zip actual
- [PharData::\_\_construct](#phardata.construct) — Construye un objeto de archivo tar o zip no ejecutable
- [PharData::convertToData](#phardata.converttodata) — Convierte un archivo phar en un archivo tar o zip no ejecutable
- [PharData::convertToExecutable](#phardata.converttoexecutable) — Convierte un archivo tar/zip no ejecutable en un archivo phar ejecutable
- [PharData::copy](#phardata.copy) — Copia un fichero interno del archivo tar/zip a otro fichero dentro del mismo archivo
- [PharData::decompress](#phardata.decompress) — Descomprime el archivo Phar completo
- [PharData::decompressFiles](#phardata.decompressfiles) — Descomprime todos los ficheros del archivo zip actual
- [PharData::delMetadata](#phardata.delmetadata) — Elimina los metadatos globales de un archivo zip
- [PharData::delete](#phardata.delete) — Elimina un fichero dentro del archivo tar/zip
- [PharData::\_\_destruct](#phardata.destruct) — Destruye un objeto tar no ejecutable o un archivo zip
- [PharData::extractTo](#phardata.extractto) — Extrae el contenido de un archivo tar/zip hacia un directorio
- [PharData::isWritable](#phardata.iswritable) — Verifica si el archivo tar/zip puede ser modificado
- [PharData::offsetSet](#phardata.offsetset) — Rellena un fichero dentro del archivo tar/zip con el contenido de un fichero externo o de un string
- [PharData::offsetUnset](#phardata.offsetunset) — Elimina un fichero de un archivo tar/zip
- [PharData::setAlias](#phardata.setalias) — Función inútil (Phar::setAlias no es válido para PharData)
- [PharData::setDefaultStub](#phardata.setdefaultstub) — Función inútil (Phar::setDefaultStub no es válido para PharData)
- [PharData::setMetadata](#phardata.setmetadata) — Fija las metadatos del archivo
- [PharData::setSignatureAlgorithm](#phardata.setsignaturealgorithm) — Asigna el algoritmo de firma de un phar y lo aplica
- [PharData::setStub](#phardata.setstub) — Función inútil (Phar::setStub no es válido para PharData)
  </li>- [PharFileInfo](#class.pharfileinfo) — La clase PharFileInfo<li>[PharFileInfo::chmod](#pharfileinfo.chmod) — Fija los bits de permiso específicos de los ficheros
- [PharFileInfo::compress](#pharfileinfo.compress) — Comprime la entrada Phar actual con una de las compresiones zlib o bzip2
- [PharFileInfo::\_\_construct](#pharfileinfo.construct) — Construye un objeto de entrada Phar
- [PharFileInfo::decompress](#pharfileinfo.decompress) — Descomprime la entrada Phar actual dentro del phar
- [PharFileInfo::delMetadata](#pharfileinfo.delmetadata) — Elimina las metadatos de la entrada
- [PharFileInfo::\_\_destruct](#pharfileinfo.destruct) — Destruye un objeto PharFileInfo
- [PharFileInfo::getCRC32](#pharfileinfo.getcrc32) — Retorna el código CRC32 o levanta una excepción si el CRC no ha sido verificado
- [PharFileInfo::getCompressedSize](#pharfileinfo.getcompressedsize) — Devuelve el tamaño actual (con compresión) del fichero dentro del archivo Phar
- [PharFileInfo::getContent](#pharfileinfo.getcontent) — Obtiene el contenido completo del fichero de la entrada
- [PharFileInfo::getMetadata](#pharfileinfo.getmetadata) — Devuelve las metadatos específicas adjuntas a un fichero
- [PharFileInfo::getPharFlags](#pharfileinfo.getpharflags) — Devuelve los flags del archivo Phar
- [PharFileInfo::hasMetadata](#pharfileinfo.hasmetadata) — Devuelve las metadatos de la entrada
- [PharFileInfo::isCRCChecked](#pharfileinfo.iscrcchecked) — Determina si el fichero tiene un CRC verificado
- [PharFileInfo::isCompressed](#pharfileinfo.iscompressed) — Indica si la entrada está comprimida
- [PharFileInfo::setMetadata](#pharfileinfo.setmetadata) — Establece las metadatos específicas de un fichero
  </li>- [PharException](#class.pharexception) — La clase PharException
