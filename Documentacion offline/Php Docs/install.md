# Instalación y configuración

# Consideraciones generales sobre la instalación

Antes de instalar PHP, es necesario saber qué se desea hacer con PHP. Existen dos casos de uso que se describen
en la sección [¿Qué puede hacer PHP?](#intro-whatcando):

- Sitios Web y aplicaciones Web (script lado-servidor)

- Scripts en línea de comandos

Para la primera tarea, que es con diferencia la más común, se necesitan tres cosas: PHP en sí, un servidor Web
y un navegador. Probablemente ya se dispone de un navegador y, dependiendo del sistema operativo, también puede
disponer de un servidor Web (i.e. Apache en Linux y macOS o IIS en Windows). También es posible alquilar un espacio
a una empresa. De esta manera, no será necesario configurar PHP, sino únicamente escribir los scripts, cargarlos
en el servidor y ver el resultado en el navegador.

Si se instala PHP y el servidor por uno mismo, se tienen dos opciones. O bien como un módulo
del servidor Web (a través de una interfaz directa llamada SAPI). Los servidores que soportan esta solución incluyen,
entre otros, Apache y Microsoft Internet Information Server. Si PHP no soporta la interfaz de módulo
del servidor Web, siempre es posible utilizarlo como procesador CGI o FastCGI. Esto significa que se debe
configurar el servidor para que utilice el ejecutable CGI de PHP, para que procese los ficheros PHP en el servidor.

Si también se desea utilizar PHP en línea de comandos (escribir scripts de generación de imágenes fuera de línea,
por ejemplo, o bien procesar textos en función de la información proporcionada), se necesitará un ejecutable PHP.
Para más detalles, lea la sección [escribir aplicaciones PHP en línea de comandos](#features.commandline).
En este caso, no se necesitará un servidor Web ni un navegador.

A partir de ahora, esta sección describe la instalación de PHP con un servidor Web en Unix y Windows,
ya sea como módulo o como ejecutables CGI.

El código fuente y los ejecutables compilados para ciertos sistemas operativos (incluyendo Windows) están disponibles
en [» https://www.php.net/downloads.php](https://www.php.net/downloads.php).

# Instalación en sistemas Unix

## Tabla de contenidos

- [Instalación desde paquetes en Debian GNU/Linux y distribuciones similares](#install.unix.debian)
- [Instalación a partir de paquetes en distribuciones GNU/Linux que utilizan DNF](#install.unix.dnf)
- [Instalación desde paquetes o puertos en OpenBSD](#install.unix.openbsd)
- [Instalación desde las fuentes en sistemas Unix y macOS](#install.unix.source)
- [CGI y configuraciones de línea de comandos](#install.unix.commandline)
- [Apache 2.x en sistemas Unix](#install.unix.apache2)
- [Nginx 1.4.x en sistemas Unix](#install.unix.nginx)
- [Lighttpd 1.4 en sistemas Unix](#install.unix.lighttpd-14)
- [Servidor Web LiteSpeed/Servidor Web OpenLiteSpeed en sistemas Unix](#install.unix.litespeed)
- [Instalación en Solaris](#install.unix.solaris)

    La mayoría de los sistemas operativos y distribuciones Unix (y Linux)
    ofrecen una versión empaquetada de PHP y extensiones disponibles a través de su
    sistema de gestión de paquetes. Hay secciones con información básica
    sobre la instalación de PHP usando estos sistemas.

    Para algunas distribuciones, también existen repositorios de paquetes de terceros
    que suelen incluir una mayor variedad de versiones y extensiones disponibles.

    PHP también puede ser instalado como un componente de ciertos servidores
    de aplicaciones de terceros .

    Por último, PHP siempre puede instalarse desde las distribuciones fuente,
    lo que ofrece la mayor flexibilidad a la hora de elegir qué características,
    extensiones y APIs de servidor habilitar.
    Hay secciones que contienen información sobre la compilación y configuración
    configuración de PHP para su uso con diferentes APIs de servidor en particular.

## Instalación desde paquetes en Debian GNU/Linux y distribuciones similares

Aunque PHP puede ser instalado desde el código fuente, también está
disponible a través de paquetes provenientes de [» Debian GNU/Linux](http://www.debian.org/).
Esto también es cierto para otras distribuciones basadas en Debian, tales como
Ubuntu, Kali Linux y Linux Mint.

**Advertencia**

Las versiones provenientes de terceros son consideradas no oficiales y no
son directamente soportadas por el proyecto PHP. Cualquier bug encontrado
debe ser reportado al proveedor de estas versiones no oficiales, a menos que
pueda ser reproducido utilizando las versiones provenientes de [» 
la zona de descargas oficial](https://www.php.net/downloads.php).

Los paquetes pueden ser instalados utilizando la comando **apt** o
la comando **aptitude**. Esta página de manual utiliza estos dos
comandos de manera intercambiable.

### Uso de APT

En primer lugar, tenga en cuenta que otros paquetes pueden ser deseables, como
libapache-mod-php para la integración con Apache 2, y
php-pear para PEAR.

Luego, antes de instalar un paquete, es prudente asegurarse de que la lista de paquetes
esté actualizada. Generalmente, esto se hace utilizando el comando
**apt update**.

**Ejemplo #1 Ejemplo de instalación en Debian con Apache 2**

# apt install php-common libapache2-mod-php php-cli

APT instalará y activará automáticamente el módulo PHP para Apache 2, así como todas
sus dependencias. Apache deberá ser reiniciado para que los cambios sean efectivos. Por ejemplo:

**Ejemplo #2 Detener y reiniciar Apache una vez instalado PHP**

# /etc/init.d/apache2 stop

# /etc/init.d/apache2 start

### Un mejor control de la configuración

En el ejemplo anterior, PHP fue instalado con solo los componentes principales. Es probable que se necesiten módulos adicionales, tales como
[MySQL](#book.mysql),
[cURL](#book.curl),
[GD](#book.image),
etc. También pueden ser instalados a través del comando **apt**.

**Ejemplo #3 Métodos para listar los paquetes PHP adicionales**

# apt-cache search php

# apt search php | grep -i mysql

# aptitude search php

La lista de paquetes incluirá un gran número de paquetes que incluyen los componentes
básicos de PHP, tales como php-cgi, php-cli, y
php-dev, así como numerosas extensiones PHP. Durante
la instalación de las extensiones, se instalarán automáticamente paquetes adicionales si es necesario para satisfacer las dependencias de estos paquetes.

**Ejemplo #4 Instalar PHP con MySQL y cURL**

# apt install php-mysql php-curl

APT agregará automáticamente las líneas correctas a los ficheros relacionados con php.ini, como
/etc/php/7.4/php.ini,
/etc/php/7.4/conf.d/\*.ini, etc., y según la extensión,
agregará entradas similares a extension=foo.so.
Además, reiniciar el servidor web (Apache, por ejemplo) es necesario para que estos cambios
sean efectivos.

### Problemas comunes

- Si los scripts PHP no son interpretados por el servidor web, es probable que PHP
  no haya sido añadido a los ficheros de configuración del servidor web, es decir, en Debian,
  /etc/apache2/apache2.conf o equivalente.
  Consulte el manual de Debian para más detalles.

- Si una extensión ha sido aparentemente instalada pero sus funciones no están definidas,
  asegúrese de que las líneas adecuadas han sido insertadas en los ficheros .ini y/o que
  el servidor web ha sido reiniciado después de la instalación.

## Instalación a partir de paquetes en distribuciones GNU/Linux que utilizan DNF

Aunque PHP puede ser instalado desde el código fuente, también está disponible
a través de paquetes en sistemas que usan DNF, como Red Hat Enterprise Linux
OpenSUSE, Fedora, CentOS, Rocky Linux y Oracle Enterprise Linux.

**Advertencia**

Las versiones provenientes de terceros son consideradas no oficiales y no
son directamente soportadas por el proyecto PHP. Cualquier bug encontrado
debe ser reportado al proveedor de estas versiones no oficiales, a menos que
pueda ser reproducido utilizando las versiones provenientes de [» 
la zona de descargas oficial](https://www.php.net/downloads.php).

Los paquetes pueden instalarse mediante el comando **dnf**.

### Instalación de paquetes

Para empezar, es importante señalar que se pueden desear otros paquetes vinculados,
como php-pear para [» PEAR](https://pear.php.net/),
o php-mysqlnd para la extensión [
MySQL](#book.mysqlnd).

Entonces, antes de instalar un paquete, conviene asegurarse de que la lista de
paquetes está actualizada. Normalmente, esto se hace ejecutando el comando
**dnf update**.

**Ejemplo #1 Ejemplo de instalación DNF**

# dnf install php php-common

DNF instalará automáticamente la configuración de PHP para el servidor web,
pero puede ser necesario reiniciarlo para que los cambios surtan efecto.
Por ejemplo :

**Ejemplo #2 Reiniciar Apache una vez instalado PHP**

# sudo systemctl restart httpd

### Mejor control de la configuración

En la última sección, PHP ha sido instalado sólo con los módulos básicos. Es
muy probable que se requieran módulos adicionales, tales como
[MySQL](#book.mysql), [cURL](#book.curl), [GD](#book.image), etc.
También se pueden instalar mediante la función **dnf**.

**Ejemplo #3 Métodos para listar paquetes PHP adicionales**

# dnf search php

La lista de paquetes incluirá un gran número de paquetes incluyendo
componentes básicos de PHP, como php-cli,
php-fpm y php-devel, así como
numerosas extensiones de PHP. Cuando se instalan extensiones, los paquetes adicionales
se instalarán automáticamente si es necesario para satisfacer
las dependencias de estos paquetes.

**Ejemplo #4 Instalación de PHP con MySQL, GD**

# dnf install php-mysqlnd php-gd

DNF añadirá automáticamente las líneas apropiadas a los distintos archivos
vinculados a php.ini, como /etc/php/8.3/php.ini,
/etc/php/8.3/conf.d/\*.ini, etc. y dependiendo de
la extensión añadirá entradas similares a extension=foo.so.
Sin embargo, es necesario reiniciar el servidor web (como Apache) para que estos cambios surtan efecto.

## Instalación desde paquetes o puertos en OpenBSD

Esta sección contiene las notas específicas para la instalación
de PHP en [» OpenBSD](http://www.openbsd.org/).

### Uso de paquetes binarios

Este método es el método recomendado para instalar PHP en OpenBSD.
También es el método más simple. El paquete core ha sido separado de los módulos
y cada uno de ellos puede ser instalado y eliminado independientemente de los otros.
Los ficheros necesarios están en el CD de OpenBSD o en el sitio FTP.

El paquete principal que debe ser instalado es php,
que contiene el motor base (además de fpm, gettext e iconv) y podría
estar disponible en varias versiones.
Luego, eche un vistazo a los paquetes de módulos, como php-mysqli
o php-imap. Debe utilizar el comando
**phpxs** para activar y desactivar estos módulos en su
php.ini.

**Ejemplo #1 Ejemplo de instalación de PHP en OpenBSD con Ports**

# pkg_add php

# pkg_add php-apache

# pkg_add php-mysqli

(instalar las bibliotecas PEAR)

# pkg_add pear

Siga las instrucciones mostradas con cada paquete!

(para eliminar paquetes)

# pkg_delete php

# pkg_delete php-apache

# pkg_delete php-mysqli

# pkg_delete pear

Lea la página de manual Unix [» packages(7)](http://www.openbsd.org/cgi-bin/man.cgi?query=packages)
para más detalles sobre los paquetes binarios de OpenBSD.

### Uso de puertos

También es posible compilar PHP utilizando [» el árbol de puertos](http://www.openbsd.org/faq/ports/ports.html).
Este método es recomendado para usuarios experimentados de OpenBSD. El puerto PHP
está dividido en core y extensiones. El directorio
extensiones genera los subpaquetes de todos los módulos PHP. Si no desea crear estos módulos,
puede utilizar el comando en línea
**no\_\*** FLAVOR. Por ejemplo, para no compilar el módulo
imap, utilice FLAVOR con el valor **no_imap**.

### Problemas comunes

- Apache y Nginx ya no son el servidor por defecto en OpenBSD, pero pueden ser fácilmente encontrados en los puertos y los paquetes. El nuevo
  servidor por defecto también se llama 'httpd'.

- La instalación por defecto de Apache funciona en un
  [» contexto chroot(2)](http://www.openbsd.org/cgi-bin/man.cgi?query=chroot),
  que limitará el acceso de los scripts PHP al directorio
  /var/www. Por lo tanto, debe crear un directorio
  /var/www/tmp para que las sesiones PHP sean almacenadas, o utilizar otra solución de almacenamiento.
  Además, los sockets de bases de datos deben ser colocados
  en este directorio, o utilizar la interfaz
  localhost. Si utiliza funciones de red con ficheros como /etc,
  por ejemplo /etc/resolv.conf, y
  /etc/services, deberá hacerlos accesibles
  también en /var/www/etc.
  El paquete OpenBSD PEAR instala automáticamente los directorios correctos.

- El paquete OpenBSD para la extensión [» gd](http://www.libgd.org/)
  requiere Xorg. A menos que ya esté incluido después de la instalación añadiendo
  el conjunto de ficheros xbase.tgz, esto puede ser añadido posteriormente
  (ver [» OpenBSD FAQ#4](https://www.openbsd.org/faq/faq4.html#FilesNeeded)).

## Instalación desde las fuentes en sistemas Unix y macOS

Software requerido para la compilación:

- [» GNU **make**](https://www.gnu.org/software/make/make.html)

- Un compilador C (a partir de PHP 8.0.0, se requiere compatibilidad con C99; a partir de PHP 8.4.0, se requiere compatibilidad con C11)

- Un servidor web

- Cualquier componente específico de un módulo (como las bibliotecas GD,
  PDF, etc.)

Cuando la compilación se realiza directamente desde las fuentes de Git o después de
modificaciones personalizadas, pueden ser necesarias estas herramientas adicionales:

- [» autoconf](https://www.gnu.org/software/autoconf/autoconf.html):

    <li>
     PHP 7.3 y más reciente: 2.68+
    - PHP 7.2: 2.64+
    - PHP 7.1 y más antiguo: 2.59+

   </li>
   - 
    
     [» re2c](https://re2c.org/):
    
    
     <li>
      PHP 8.3 y más reciente: 1.0.3+


     -
      PHP 8.2 y más antiguo: 0.13.4+


   </li>
   - 
    
     [» bison](http://www.gnu.org/software/bison/bison.html):
    
    
     <li>
      PHP 7.4 y más reciente: 3.0.0+


     -
      PHP 7.3 y más antiguo: 2.4+ (incluido Bison 3.x)


   </li>
  


Para obtener pasos más detallados para compilar PHP desde el código fuente, véase el fichero
[» README.md](https://github.com/php/php-src/blob/master/README.md)
en el archivo tarball de origen.

La configuración y el proceso inicial de compilación de PHP están controlados por
el uso de las opciones de línea de comandos del script **configure**.
Una lista de las opciones disponibles con breves explicaciones puede mostrarse ejecutando
**./configure --help**.
Este manual documenta las diferentes opciones por separado.
Las [opciones básicas están disponibles en el apéndice](#configure.about),
mientras que las diferentes opciones específicas de las extensiones están
descritas en las páginas de referencia.

Después de que el script de configuración se haya ejecutado, PHP puede ser compilado usando
el comando **make**.
El [
capítulo de preguntas frecuentes sobre la instalación
](#faq.installation) contiene más información sobre cómo manejar los problemas de compilación.

**Nota**:

Algunos sistemas Unix (como OpenBSD y SELinux) pueden prohibir el
mapeo de páginas tanto en escritura como en ejecución por razones de seguridad, lo cual se llama
[» PaX MPROTECT](<https://en.wikibooks.org/wiki/Grsecurity/Appendix/Grsecurity_and_PaX_Configuration_Options#Restrict_mprotect()>)
o [» protección contra las
violaciones W^X](https://en.wikipedia.org/wiki/W%5EX).
Este tipo de mapeo de memoria es necesario para el soporte JIT de PCRE, por lo tanto
PHP debe ser compilado [sin el soporte JIT de PCRE](#pcre.installation),
o el binario debe ser incluido en la lista blanca por cualquier medio
proporcionado por el sistema.

**Nota**:

La compilación cruzada para ARM con la cadena de herramientas de Android no es actualmente soportada.

## CGI y configuraciones de línea de comandos

Por defecto, PHP se construye como un programa CLI y
CGI, que puede ser utilizado para el procesamiento de CGI.
Si está ejecutando un servidor web PHP tiene soporte para los módulos,
por lo general debe irse por esta solución por razones de rendimiento.
Sin embargo, la versión CGI permite a los usuarios ejecutar diferentes páginas con PHP bajo
diferentes identificadores de usuarios.

**Advertencia**
Un servidor desplegado en modo CGI se expone a varias vulnerabilidades posibles. Por favor, lea nuestra
[sección sobre la seguridad en modo CGI](#security.cgi-bin)
para aprender cómo protegerse contra estos ataques.

### Pruebas

Si has construido PHP como un programa CGI, puede probar su construcción
escribiendo **make test**. Siempre es una buena idea
probar su construcción. De esta manera usted puede encontrar un problema al principio con PHP en
la plataforma, en lugar de tener que luchar con él más adelante.

### Utilización de variables

Algunos [servidores suministrando
variables de entorno](#reserved.variables.server) no se definen en las actuales
[» CGI/1.1 specification](https://datatracker.ietf.org/doc/html/rfc3875).
Sólo las siguientes variables no se definen: AUTH_TYPE,
CONTENT_LENGTH, CONTENT_TYPE,
GATEWAY_INTERFACE, PATH_INFO,
PATH_TRANSLATED, QUERY_STRING,
REMOTE_ADDR, REMOTE_HOST,
REMOTE_IDENT, REMOTE_USER,
REQUEST_METHOD, SCRIPT_NAME,
SERVER_NAME, SERVER_PORT,
SERVER_PROTOCOL, and SERVER_SOFTWARE.
Todo lo demás debe ser tratado como "extensiones de proveedor".

## Apache 2.x en sistemas Unix

Esta sección contiene las notas y consejos de instalación de PHP con el servidor
Apache 2.x en sistemas Unix.

**Advertencia**No se recomienda
el uso de PHP en un entorno thread MPM, con Apache 2.
Utilice el modo prefork MPM, que es el MPM por defecto para Apache 2.0 y 2.2.
Para saber por qué, lea
la entrada de la FAQ correspondiente a la
[utilización de Apache 2 en un entorno thread MPM](#faq.installation.apache2).

La [» Documentación Apache](http://httpd.apache.org/docs/current/)
es la mejor fuente de información sobre el servidor Apache 2.x.
La mayoría de la información sobre las opciones de instalación de Apache
puede encontrarse allí.

La versión más reciente del servidor HTTP Apache puede obtenerse
desde la [» página de descarga de Apache](http://httpd.apache.org/),
y una versión adaptada de PHP desde los enlaces anteriores.
Esta guía cubre únicamente las bases de funcionamiento de Apache 2.x con PHP.
Para más información, leer la
[» documentación Apache](http://httpd.apache.org/docs/current/).
Los números de versión se omiten aquí, para asegurarse de que las instrucciones no sean
incorrectas. En los ejemplos a continuación, 'NN' deberá ser reemplazado
por la versión específica de Apache a utilizar.

Actualmente hay 2 versiones de Apache 2.x - 2.4 y 2.2.
Hay varias razones para elegir una sobre la otra; sin embargo, la versión
2.4 es actualmente la última versión disponible y también la que recomendamos. Sin embargo, las instrucciones
contenidas en esta guía deberían funcionar para la versión 2.4 así como para la versión 2.2. Nota: Apache httpd 2.2 está oficialmente en Fin de Vida, no habrá más desarrollo ni parches para esta versión.

- Descargue el servidor HTTP Apache desde el sitio anterior y descomprímalo :

tar -xzf httpd-2.x.NN.tar.gz

- De la misma manera, descargue y descomprima las fuentes de PHP :

tar -xzf php-NN.tar.gz

- Compile e instale Apache. Consulte la documentación sobre la instalación
  de Apache para más detalles sobre la compilación de este software.

cd httpd-2_x_NN
./configure --enable-so
make
make install

- Ahora que se tiene Apache 2.x.NN disponible bajo /usr/local/apache2,
  configúrelo con soporte para la carga de módulos, así como el
  MPM prefork estándar. Para probar la instalación, utilice el procedimiento
  normal para iniciar el servidor Apache, es decir:

/usr/local/apache2/bin/apachectl start

    y deténgalo para continuar con la configuración de PHP :




/usr/local/apache2/bin/apachectl stop

- Ahora, configure y compile PHP. Será en este momento
  cuando se podrá personalizar PHP con las diversas opciones disponibles,
  como la lista de extensiones a activar. En nuestro ejemplo, realizaremos
  una configuración simple, con Apache 2 y soporte MySQL.

    Si se ha construido Apache desde las fuentes, tal como se describe anteriormente,
    el siguiente ejemplo debería ser correcto en cuanto a las rutas hacia los apxs, pero si
    se ha instalado Apache de otra manera, se deberán tener en cuenta las especificidades y ajustar las rutas apxs en consecuencia. Tenga en cuenta que, según las distribuciones, podría ser necesario renombrar apxs a apxs2.

cd ../php-NN
./configure --with-apxs2=/usr/local/apache2/bin/apxs --with-pdo-mysql
make
make install

    Si se decide modificar las opciones de configuración después de la instalación,
    se deberán ejecutar nuevamente las etapas "configure", "make" y "make install".
    Entonces solo se necesitará reiniciar Apache para que el nuevo módulo surta efecto.
    Una recompilación de Apache no es necesaria.





    Tenga en cuenta que, salvo indicaciones contrarias, la etapa "make install" también instalará
    PEAR, así como diversas herramientas PHP como phpsize, PHP CLI y
    mucho más.

- Configurar el archivo php.ini

cp php.ini-development /usr/local/lib/php.ini

    Se debe editar el archivo .ini para definir las opciones PHP.
    Si se prefiere colocar este archivo en otro directorio, utilice
    la opción --with-config-file-path=/some/path en la etapa 5.





    Si se elige el archivo php.ini-production, asegúrese de leer la lista
    de modificaciones correspondiente ya que puede afectar considerablemente la forma
    en que PHP funcionará.

- Edite el archivo httpd.conf para cargar el módulo PHP. La ruta especificada
  a la derecha de la cadena LoadModule, debe corresponder a la ruta del sistema del módulo
  PHP. La etapa "make install" anterior debería haber realizado esta operación
  por usted, pero una simple verificación permitirá asegurarse.

    Para PHP 8:

LoadModule php_module modules/libphp.so

     Para PHP 7:

LoadModule php7_module modules/libphp5.so

- Indique a Apache que analice ciertas extensiones como scripts PHP.
  Por ejemplo, deje que Apache pase a PHP los archivos cuya extensión es
  .php.
  En lugar de utilizar solo la directiva AddType de Apache,
  se desea evitar cualquier riesgo potencialmente peligroso, cuando
  se descarga y crea un archivo como exploit.php.jpg,
  de ejecución PHP. Utilizando este ejemplo, se puede tener cualquier
  extensión analizada por PHP. Se ha añadido .php para el ejemplo.

&lt;FilesMatch \.php$&gt;
SetHandler application/x-httpd-php
&lt;/FilesMatch&gt;

    O, si se desea permitir que los archivos .php, .php2,
    .php3, .php4, .php5,
    .php6, y .phtml sean
    analizados por PHP, pero nada más, se utilizará esto :

&lt;FilesMatch "\.ph(p[2-6]?|tml)$"&gt;
SetHandler application/x-httpd-php
&lt;/FilesMatch&gt;

    Y para permitir que los archivos .phps sean manejados por el filtro del código
    fuente de PHP, y así, ser mostrados como código fuente con coloración
    sintáctica, utilice esto :

&lt;FilesMatch "\.phps$"&gt;
SetHandler application/x-httpd-php-source
&lt;/FilesMatch&gt;

    mod_rewrite puede ser utilizado para permitir que cualquier archivo .php
    sea mostrado como código fuente con coloración sintáctica, sin necesidad de renombrarlo o copiarlo con una extensión .phps. :

RewriteEngine On
RewriteRule (.\*\.php)s$ $1 [H=application/x-httpd-php-source]

    El filtro de código fuente PHP no debería estar activo en sistemas de
    producción, ya que puede exponer código confidencial o información
    sensible contenida en el código fuente.

- Utilice el procedimiento normal para iniciar el servidor Apache, es decir:

/usr/local/apache2/bin/apachectl start

O

service httpd restart

Si se han seguido los pasos anteriores, ahora se tiene un servidor web
Apache2 funcional con soporte PHP como módulo SAPI.
Por supuesto, hay una multitud de otras opciones de configuración disponibles
con Apache y PHP. Para más información, introduzca el comando
**./configure --help** en el árbol de fuentes correspondiente.

Apache puede ser compilado en modo multithread, seleccionando
el MPM worker, en lugar del estándar
MPM prefork. Esto se hace añadiendo la siguiente opción al argumento de la comando "./configure", en la etapa 3 anterior :

--with-mpm=worker

Esto no debería emprenderse sin ser consciente de las consecuencias,
y teniendo al menos una justa comprensión de lo que implica.
La documentación de Apache sobre
[» MPM-Modules](http://httpd.apache.org/docs/current/mpm.html)
proporcionará información importante que permitirá tomar
la decisión.

**Nota**:

La [FAQ Apache
MultiViews](#faq.installation.apache.multiviews) trata sobre el uso de MultiViews con PHP.

**Nota**:

Para compilar una versión multithread de Apache, el sistema de destino
debe soportar threads. En este caso, PHP también debe ser construido
con Zend Thread Safety (ZTS). Bajo esta configuración, no todas las extensiones
estarán disponibles. Recomendamos compilar Apache con el
prefork MPM-Module.

## Nginx 1.4.x en sistemas Unix

Esta documentación cubre la instalación y configuración de PHP con
PHP-FPM para el servidor HTTP Nginx 1.4.x.

Este guía asume que se ha compilado Nginx a partir de las fuentes y por lo tanto
todos los binarios y ficheros de configuración se encuentran en
/usr/local/nginx. Si no es el caso y se ha obtenido Nginx por otros medios, por favor refiérase al
[» Wiki de Nginx](https://www.nginx.com/resources/wiki/) para adaptar este manual
a su configuración.

Este guía cubre las bases de la configuración del servidor Nginx para
servir una aplicación PHP en el puerto 80. Se recomienda estudiar las documentaciones de Nginx y PHP-FPM para optimizar su
instalación.

Tenga en cuenta que a lo largo de esta documentación, los números de versión
han sido reemplazados por una "x" para asegurar que esta última permanezca correcta
en el futuro. Recuerde reemplazarlos por su número de versión.

- Se recomienda consultar la
  [» documentación de Nginx](https://www.nginx.com/resources/wiki/start/topics/tutorials/install/)
  para instalarla en su sistema.

- Recuperar y descomprimir las fuentes de PHP:

tar zxf php-x.x.x

- Configurar y compilar PHP. Este será el momento en el que se podrá
  personalizar PHP con diversas opciones, como las extensiones
  a activar. Ejecutar ./configure --help para obtener una lista
  de las opciones disponibles. En nuestro ejemplo, se realizará
  una configuración simple con soporte PHP-FPM y MySQLi.

cd ../php-x.x.x
./configure --enable-fpm --with-mysqli
make
sudo make install

- Recuperar y mover los ficheros de configuración en
  los directorios correctos

cp php.ini-development /usr/local/php/php.ini
cp /usr/local/etc/php-fpm.d/www.conf.default /usr/local/etc/php-fpm.d/www.conf
cp sapi/fpm/php-fpm /usr/local/bin

- Es importante que se impida que Nginx pase las peticiones
  al backend PHP-FPM si el fichero no existe, evitando así
  las vulnerabilidades por inyecciones arbitrarias de scripts.

    Esto se puede realizar definiendo la directiva
    de configuración [cgi.fix_pathinfo](#ini.cgi.fix-pathinfo)
    al valor 0 en su php.ini.

    Editar php.ini:

vim /usr/local/php/php.ini

    Encontrar la directiva cgi.fix_pathinfo=
    y modificarla como sigue:

cgi.fix_pathinfo=0

- El fichero php-fpm.conf debe ser modificado para especificar que
  php-fpm debe ser ejecutado con el usuario
  www-data y el grupo www-data antes de iniciar el servicio:

vim /usr/local/etc/php-fpm.d/www.conf

    Encontrar y modificar lo siguiente:

; Unix user/group of processes
; Note: The user is mandatory. If the group is not set, the default user's group
; will be used.
user = www-data
group = www-data

    El servicio php-fpm puede ahora ser iniciado:

/usr/local/bin/php-fpm

    Este guía no va a configurar php-fpm más allá de esto; si está interesado en la configuración avanzada de php-fpm, por favor
    consulte la documentación.

- Nginx debe ahora ser configurado para soportar el análisis de
  las aplicaciones PHP:

vim /usr/local/nginx/conf/nginx.conf

    Modificar el bloque por defecto para que pueda servir ficheros
    .php:

location / {
root html;
index index.php index.html index.htm;
}

    La siguiente etapa asegura que los ficheros .php sean pasados
    al backend PHP-FPM; Bajo el bloque comentado por defecto y entre:

location ~\* \.php$ {
fastcgi_index index.php;
fastcgi_pass 127.0.0.1:9000;
include fastcgi_params;
fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
fastcgi_param SCRIPT_NAME $fastcgi_script_name;
}

    Reiniciar Nginx.

sudo /usr/local/nginx/sbin/nginx -s stop
sudo /usr/local/nginx/sbin/nginx

- Crear un fichero de prueba

rm /usr/local/nginx/html/index.html
echo "&lt;?php phpinfo(); ?&gt;" &gt;&gt; /usr/local/nginx/html/index.php

    Ahora, navegue a http://localhost. El phpinfo()
    debería ser mostrado.

Siguiendo estos diferentes pasos, se debería ejecutar un servidor
web Nginx con soporte de PHP como módulo FPM SAPI.
Por supuesto, hay muchas más opciones de configuración disponibles para Nginx y PHP. Para más información, escriba
**./configure --help** en la fuente correspondiente.

## Lighttpd 1.4 en sistemas Unix

Esta sección contiene información específica sobre la instalación
de PHP con Lighttpd 1.4 en sistemas Unix.

Consulte [» Lighttpd](http://trac.lighttpd.net/trac/)
para una instalación correcta de Lighttpd antes de continuar.

FastCGI es el SAPI preferido para conectar PHP y Lighttpd. FastCGI activa
automáticamente php-cgi.

### Llamada de PHP por Lighttpd

Para configurar Lighttpd para que se conecte a PHP y llame al proceso
FastCGI, se debe editar el fichero lighttpd.conf. Una conexión por sockets
es la solución preferida para sistemas locales.

**Ejemplo #1 Porción del fichero lighttpd.conf**

server.modules += ( "mod_fastcgi" )

fastcgi.server = ( ".php" =&gt;
((
"socket" =&gt; "/tmp/php.socket",
"bin-path" =&gt; "/usr/local/bin/php-cgi",
"bin-environment" =&gt; (
"PHP_FCGI_CHILDREN" =&gt; "16",
"PHP_FCGI_MAX_REQUESTS" =&gt; "10000"
),
"min-procs" =&gt; 1,
"max-procs" =&gt; 1,
"idle-timeout" =&gt; 20
))
)

La directiva bin-path permite a lighttpd llamar al proceso FastCGI
dinámicamente. PHP llamará a los hijos según la variable de entorno
PHP_FCGI_CHILDREN. La directiva bin-environment define el entorno
para los procesos llamados. PHP terminará un proceso hijo cuando el
número de solicitudes especificado por PHP_FCGI_MAX_REQUESTS haya sido alcanzado.
Las directivas min-procs y max-procs pueden generalmente ser ignoradas
con PHP. PHP gestiona sus propios hijos y caches opcode como APC que comparte
únicamente los hijos gestionados por PHP. Si min-procs se establece en algo
superior a 1, el número total de respuestas PHP será multiplicado por
PHP_FCGI_CHILDREN (2 min-procs \* 16 hijos, da 32 respuestas).

### Llamada con spawn-fcgi

Lighttpd proporciona un programa llamado spawn-fcgi para facilitar
las llamadas a los procesos FastCGI.

### Llamada de php-cgi

Es posible llamar a los procesos sin spawn-fcgi, con un
mínimo de configuración. La variable de entorno PHP_FCGI_CHILDREN
controla el número de hijos que PHP llama para gestionar las solicitudes.
La variable de entorno PHP_FCGI_MAX_REQUESTS determina la duración de
vida, en número de solicitudes, de cada hijo. A continuación se muestra un script bash simple
que ayuda a las llamadas a los gestores PHP.

**Ejemplo #2 Llamada a los gestores FastCGI**

#!/bin/sh

# Ubicación del binario php-cgi

PHP=/usr/local/bin/php-cgi

# Ubicación del fichero PID

PHP_PID=/tmp/php.pid

# Enlace a una dirección

#FCGI_BIND_ADDRESS=10.0.1.1:10000

# Enlace a un socket de dominio

FCGI_BIND_ADDRESS=/tmp/php.sock

PHP_FCGI_CHILDREN=16
PHP_FCGI_MAX_REQUESTS=10000

env -i PHP_FCGI_CHILDREN=$PHP_FCGI_CHILDREN \
       PHP_FCGI_MAX_REQUESTS=$PHP_FCGI_MAX_REQUESTS \
 $PHP -b $FCGI_BIND_ADDRESS &amp;

echo $! &gt; "$PHP_PID"

### Conexión a instancias FCGI remotas

Las instancias FastCGI pueden ser llamadas en múltiples máquinas remotas
para distribuir las aplicaciones.

**Ejemplo #3 Conexión a instancias remotas de php-fastcgi**

fastcgi.server = ( ".php" =&gt;
(( "host" =&gt; "10.0.0.2", "port" =&gt; 1030 ),
( "host" =&gt; "10.0.0.3", "port" =&gt; 1030 ))
)

## Servidor Web LiteSpeed/Servidor Web OpenLiteSpeed en sistemas Unix

LiteSpeed PHP es una compilación optimizada de PHP construida para funcionar con los productos LiteSpeed
a través de la API LiteSpeed. LSPHP funciona como su propio proceso y tiene
su propio binario autónomo, que puede ser utilizado como un simple binario en línea de comandos para ejecutar
scripts PHP desde la línea de comandos.

LSAPI es una API altamente optimizada que permite la comunicación entre
LiteSpeed y motores web de terceros. Su protocolo es similar a FCGI, pero es
más eficiente.

Esta documentación cubrirá la instalación y configuración de PHP con LSAPI
para un servidor Web LiteSpeed y un servidor Web OpenLiteSpeed.

Se asumirá que LSWS o OLS está instalado con sus
rutas y flags por omisión. El directorio de instalación por omisión para ambos servidores Web es
/usr/local/lsws y ambos pueden ser ejecutados desde el subdirectorio bin.

Tenga en cuenta que a lo largo de esta documentación, los números de versión han sido
reemplazados por un x para garantizar que esta documentación permanezca correcta en el futuro,
reemplácelos, si es necesario, por los números de versión correspondientes.

- Para obtener e instalar LiteSpeed Web Server o OpenLiteSpeed Web Server, visite la
  [» página de instalación](https://docs.litespeedtech.com/products/lsws/installation/)
  de la documentación de LiteSpeed Web Server
  o la
  [» página de instalación](https://openlitespeed.org/kb/category/installation/more-installation-methods/).
  de la documentación OpenLiteSpeed

- Descargue y descomprima el código fuente de PHP:

mkdir /home/php
cd /home/php
wget http://us1.php.net/get/php-x.x.x.tar.gz/from/this/mirror
tar -zxvf php-x.x.x.tar.gz
cd php-x.x.x

- Configure y construya PHP. Aquí es donde PHP puede ser personalizado con diversas opciones,
  tales como las extensiones que serán activadas. Ejecute ./configure --help para obtener una lista de las opciones
  disponibles. En el ejemplo, se utilizarán las opciones de configuración recomendadas por omisión para
  LiteSpeed Web Server:

./configure ... '--with-litespeed'
make
sudo make install

- Verificar la instalación de LSPHP

    Una de las formas más simples de verificar si la instalación de PHP ha tenido éxito
    es ejecutar el siguiente código:

cd /usr/local/lsws/fcgi-bin/
./lsphp5 -v

    Esto debería devolver información sobre la nueva versión de PHP:

PHP 5.6.17 (litespeed) (built: Mar 22 2016 11:34:19)
Copyright (c) 1997-2014 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2015 Zend Technologies

    Observe el litespeed entre paréntesis. Esto significa que el binario PHP ha sido
    construido con soporte LSAPI.

Después de seguir los pasos anteriores, LiteSpeed / OpenLiteSpeed Web Server debería
ahora funcionar con soporte de PHP como una extensión SAPI. Existen muchas otras
opciones de configuración disponibles para LSWS / OLS y PHP. Para más información,
consulte la documentación de LiteSpeed en
[» PHP](https://docs.litespeedtech.com/extapp/php/configuration/control/).

Uso de LSPHP desde la línea de comandos:

El modo de línea de comandos LSPHP (LSAPI + PHP) se utiliza para procesar scripts PHP en ejecución
en un servidor remoto que no necesariamente tiene un servidor web en ejecución. Se utiliza para procesar
scripts PHP residentes en un servidor web local (separado). Esta configuración es adecuada para la escalabilidad del servicio
ya que el procesamiento PHP se descarga a un servidor remoto.

Iniciar lsphp desde la línea de comandos en un servidor remoto:
LSPHP es un ejecutable y puede ser iniciado manualmente y ligado a direcciones IPv4, IPv6 o
direcciones de socket de dominio Unix con la opción de línea de comandos -b socket_address

Ejemplos:

Hacer que LSPHP se ligue al puerto 3000 en todas las direcciones IPv4 e IPv6:

/path/to/lsphp -b [::]:3000

Hacer que LSPHP se ligue al puerto 3000 en todas las direcciones IPv4:

/path/to/lsphp -b \*:3000

Hacer que LSPHP se ligue a la dirección 192.168.0.2:3000:

/path/to/lsphp -b 192.168.0.2:3000

Hacer que LSPHP acepte las solicitudes en el socket de dominio Unix /tmp/lsphp_manual.sock:

/path/to/lsphp -b /tmp/lsphp_manual.sock

Las variables de entorno pueden ser añadidas antes del ejecutable LSPHP:

PHP_LSAPI_MAX_REQUESTS=500 PHP_LSAPI_CHILDREN=35 /path/to/lsphp -b IP_address:port

Hoy en día, LiteSpeed PHP puede ser utilizado con LiteSpeed Web Server,
OpenLiteSpeed Web Server y Apache mod_lsapi. Para los pasos de
configuración del lado del servidor, visite las páginas de documentación para
[» LiteSpeed Web Server](https://docs.litespeedtech.com/extapp/php/getting_started/)
y [» OpenLiteSpeed](https://openlitespeed.org/kb/category/installation/php-installation-guides/).

LSPHP también puede ser instalado de varias otras maneras.

CentOS:
En CentOS, LSPHP puede ser instalado desde el depósito LiteSpeed o el depósito
Remi utilizando [» RPM](https://docs.litespeedtech.com/extapp/php/getting_started/#litespeed-repo-search-packages).

Debian:
En Debian, LSPHP puede ser instalado desde el depósito LiteSpeed utilizando
[» apt](https://docs.litespeedtech.com/extapp/php/getting_started/#litespeed-repo-search-packages).

cPanel:
Ver la [» página de documentación](https://docs.litespeedtech.com/cp/cpanel/quickstart/#easyapache-integration) respectiva
sobre cómo instalar LSPHP con cPanel y LSWS/OLS utilizando EasyApache 4.

Plesk:
Plesk puede ser utilizado con LSPHP en CentOS, CloudLinux, Debian y Ubuntu,
para más detalles sobre esto, visite la [» página de documentación](https://docs.litespeedtech.com/cp/plesk/) respectiva.

## Instalación en Solaris

Esta sección contiene las notas y consejos de instalación de PHP
en las distribuciones Solaris.

### Software necesario

La instalación Solaris generalmente omite los compiladores C y sus
utilidades. Lea [esta FAQ](#faq.installation.needgnu)
para saber por qué las versiones GNU de algunas de estas herramientas
son necesarias.

Para descomprimir la distribución PHP, se necesita

    -

      tar



    -

      gzip o



    -

      bzip2


Para compilar PHP, se necesita

    -

      gcc (recomendado, otros compiladores C también pueden funcionar)



    -

      make



    -

      GNU sed


Para construir las extensiones adicionales o modificar el código de PHP,
también se puede necesitar

    -

      re2c



    -

      bison



    -

      m4



    -

      autoconf



    -

      automake


Además, también se deberán instalar (y tal vez compilar)
todas las bibliotecas necesarias para las extensiones como MySQL, Oracle, etc.

### Uso de paquetes

La instalación Solaris puede simplificarse
utilizando pkgadd para instalar la mayoría de los componentes. El
sistema de paquetes de imágenes (IPS) para Solaris 11 Express
también contiene los componentes necesarios para la instalación
utilizando el comando pkg.

# Instalación en un sistema macOS

## Tabla de contenidos

- [Instalación en macOS utilizando paquetes de terceros](#install.macosx.packages)
- [Compilar PHP en macOS](#install.macosx.compile)
- [Uso de PHP integrado anterior a macOS Monterey](#install.macosx.bundled)

    PHP estaba incluido con macOS en las versiones 10 y 11, pero ya no está incluido
    desde la versión macOS 12 (Monterey). La instalación en las versiones recientes
    requiere ya sea el uso de paquetes provenientes de fuentes de terceros, ya sea la
    compilación a partir del código fuente.

## Instalación en macOS utilizando paquetes de terceros

Existen algunas versiones pre-empaquetadas y pre-compiladas
de PHP para macOS. Esto puede ser útil para configurar una instalación
estándar, pero si se necesita acceder a funcionalidades
específicas (como un servidor seguro, o un controlador de bases de datos
exóticas), será necesario compilar PHP y/o el servidor web por cuenta propia.
Si no se está familiarizado con la compilación y la configuración
de aplicaciones, es recomendable verificar si alguien más ha creado un paquete
que contenga las funcionalidades deseadas.

Una manera sencilla de instalar PHP en macOS es utilizando el gestor de paquetes
[» Homebrew](https://brew.sh/).

- Instalar homebrew, siguiendo las instrucciones en el sitio web.

- **brew install php**

Los siguientes recursos alternativos ofrecen la posibilidad de instalar paquetes
y binarios precompilados para PHP en macOS:

- [» MacPorts](http://www.macports.org/)

- [» Fink](http://www.finkproject.org/)

## Compilar PHP en macOS

Consulte el [guía de instalación en Unix](#install.unix)
para compilar PHP en macOS.

## Uso de PHP integrado anterior a macOS Monterey

PHP está integrado con macOS desde macOS X (10.0.0) y anterior a macOS Monterey (12.0.0).
Activar PHP con el servidor Web por defecto requiere descomentar
algunas líneas en el fichero de configuración de Apache
httpd.conf mientras que el modo
CGI y/o CLI están activados por defecto
(acceso simple a través del terminal).

La activación de PHP siguiendo estas instrucciones permite configurar
rápidamente un entorno local de desarrollo. Se recomienda encarecidamente
siempre actualizar PHP a su versión más reciente. Como la mayoría de los programas, las nuevas
versiones se crean para corregir errores y añadir funcionalidades y es el caso de PHP. Consulte la documentación de la instalación
de macOS para más detalles. Las siguientes instrucciones están destinadas
al principiante, proporcionando solo los detalles suficientes para configurar
una configuración por defecto para trabajar. Se recomienda encarecidamente a todos los usuarios compilar e instalar una versión reciente del paquete.

El tipo de instalación estándar utiliza mod_php, y activa el
mod_php integrado en macOS para el servidor Web Apache (el servidor Web
por defecto que es accesible a través de las preferencias del sistema), en algunos pasos:

- Encuentre y abra el fichero de configuración de Apache. Por defecto, será:
  /private/etc/apache2/httpd.conf

    Utilizar el programa Finder o Spotlight
    para encontrar este fichero puede resultar difícil, sabiendo que, por defecto, pertenece al usuario root.

    **Nota**:

    Una forma de abrirlo es utilizar un editor de texto Unix en
    un terminal, por ejemplo, nano, y sabiendo que el
    fichero es propiedad del usuario root,
    deberá utilizar el comando sudo para abrirlo
    (como root); además, deberá introducir
    el siguiente comando en su Terminal (se le pedirá su
    contraseña):
    sudo nano /private/etc/apache2/httpd.conf

    Algunos comandos de nano: ^w (búsqueda),
    ^o (guardar), y ^x (salida) donde
    ^ representa la tecla Ctrl.

    **Nota**:

    Las versiones de Mac OS X anteriores a 10.5 proporcionan versiones antiguas de PHP y Apache. Además, el fichero de configuración
    de Apache en las máquinas originales puede ser
    /etc/httpd/httpd.conf.

- Con un editor de texto, descomente las líneas (borrando el carácter #)
  que se parecen a las siguientes líneas (estas 2 líneas no se encuentran en el mismo lugar):

# LoadModule php5_module libexec/httpd/libphp5.so

# AddModule mod_php5.c

     Tenga en cuenta la ruta. En el futuro, cuando compile PHP, los ficheros
     anteriores deben ser reemplazados o comentados.

- Asegúrese de que las extensiones deseadas sean analizadas por PHP (ejemplos:
  .php, .html y .inc)

    Sabiendo que este comportamiento ya ha sido activado en su fichero
    httpd.conf (desde Mac Panther), una vez activado PHP,
    los ficheros .php serán automáticamente analizados por PHP.

&lt;IfModule mod_php5.c&gt; # If php is turned on, we respect .php and .phps files.
AddType application/x-httpd-php .php
AddType application/x-httpd-php-source .phps

    # Since most users will want index.php to work we
    # also automatically enable index.php
    &lt;IfModule mod_dir.c&gt;
        DirectoryIndex index.html index.php
    &lt;/IfModule&gt;

&lt;/IfModule&gt;

    **Nota**:



      Antes de OS X 10.5 (Leopard), PHP 4 se entregaba por defecto en lugar de PHP 5.
      Por lo tanto, las instrucciones anteriores diferirán solo cambiando 5 por 4.


- Asegúrese de que DirectoryIndex cargue el fichero index por defecto.

    Esto también se define en el fichero httpd.conf.
    Normalmente, los ficheros index.php y
    index.html se utilizan. Por defecto,
    index.php está activado porque también está
    en la verificación de PHP anterior. Ajuste según sea necesario.

- Defina la ruta hacia el fichero
  php.ini o utilice la ruta por defecto.

    La ruta por defecto en macOS es
    /usr/local/php/php.ini y una llamada a la función
    [phpinfo()](#function.phpinfo) revelará esta información.
    Si no se utiliza ningún fichero php.ini, PHP utilizará todos los valores
    por defecto. Consulte la FAQ sobre
    "[encontrar el fichero php.ini](#faq.installation.phpini)".

- Encuentre y defina el DocumentRoot

    Este es el directorio principal para todos los ficheros Web. Los ficheros en
    este directorio serán servidos por el servidor Web, y por lo tanto, los ficheros PHP
    serán analizados por PHP antes de enviarlos al navegador. La ruta por defecto es /Library/WebServer/Documents pero puede
    definirse a cualquier valor en el fichero
    httpd.conf. Además, el directorio DocumentRoot para
    los diferentes usuarios es
    /Users/yourusername/Sites

- Cree un fichero [phpinfo()](#function.phpinfo).

    La función [phpinfo()](#function.phpinfo) muestra la información sobre PHP.
    Cree un fichero en el DocumentRoot con el siguiente código PHP:

&lt;?php phpinfo(); ?&gt;

- Reinicie Apache y cargue el fichero PHP que acabamos de crear.

    Para reiniciar, ejecute el comando sudo apachectl graceful
    en un terminal o detenga/inicie la opción "Personal Web Server" en las
    preferencias del sistema de macOS. Por defecto, la carga de ficheros locales en
    el navegador se realiza a través de URL como esta:
    http://localhost/info.php o, si está utilizando el DocumentRoot
    de un directorio de usuario, la URL será:
    http://localhost/~yourusername/info.php

CLI (o CGI en versiones anteriores) se llama
php y normalmente reside en
/usr/bin/php. Abra un terminal, lea la sección sobre
[la línea de comandos](#features.commandline) del manual de PHP, y
ejecute el comando php -v para verificar la versión de PHP de este binario. Una llamada a la función [phpinfo()](#function.phpinfo) también puede revelar esta
información.

# Instalación en sistemas Windows

## Tabla de contenidos

- [Configuración recomendada en sistemas Windows](#install.windows.recommended)
- [Instalación manual de los binarios precompilados](#install.windows.manual)
- [Apache 2.x en Microsoft Windows](#install.windows.apache2)
- [Instalación con IIS para Windows](#install.windows.iis)
- [Herramientas de terceros para la instalación de PHP](#install.windows.tools)
- [Construir a partir de las fuentes](#install.windows.building)
- [Ejecución de PHP en línea de comandos en sistemas Windows](#install.windows.commandline)

    Las versiones oficiales de PHP en Windows son recomendadas para uso en producción,
    pero PHP también puede ser [compilado desde el código fuente](#install.windows.building).

    PHP también se puede [instalar en Azure App Services](#install.cloud.azure)
    (también conocido como Microsoft Azure, Windows Azure o (Windows) Azure Web Apps).

    La [sección de instalación de las
    preguntas frecuentes](#faq.installation) abarca problemas comunes de instalación y
    configuración que podrían encontrarse.

## Configuración recomendada en sistemas Windows

### OpCache

Se recomienda encarecidamente activar OpCache.
Esta extensión está incluida con PHP para Windows.
Compila y optimiza los scripts PHP y los almacena en caché en memoria para
que no se compilen cada vez que se carga la página.

Definir el php.ini a :

    **Ejemplo #1 Configuración recomendada para OpCache**

opcache.enable=On
opcache.enable_cli=On

Y reiniciar el servidor web.

Para más información, leer :
[Configuración de OpCache](#opcache.configuration)

### WinCache

Se recomienda utilizar WinCache al usar IIS, especialmente en un entorno de alojamiento web compartido o al usar almacenamiento de ficheros en red (NAS).

Todas las aplicaciones PHP se benefician automáticamente de la funcionalidad de caché de ficheros de WinCache. Las operaciones del sistema de ficheros se almacenan en caché en memoria.

WinCache también puede almacenar en caché en memoria objetos del usuario y compartirlos entre los procesos php.exe o
php-cgi.exe (compartir objetos entre las peticiones).

Muchas aplicaciones web importantes tienen un complemento o una extensión o una opción de configuración para usar el caché de objetos del usuario de WinCache.

Si se requiere un alto rendimiento, utilice el caché de objetos en las aplicaciones.

Ver : [» https://pecl.php.net/package/WinCache](https://pecl.php.net/package/WinCache)
para descargar una DLL WinCache (o WINCACHE\_\*.tgz)
en el directorio de extensiones PHP
([extension_dir](#ini.extension-dir) en el fichero php.ini).

Definir el php.ini a :

    **Ejemplo #2 Configuración recomendada para WinCache**

extension=php_wincache.dll
wincache.fcenabled=1
wincache.ocenabled=1 ; removed as of wincache 2.0.0.0

Para más información, leer :
[Configuración de WinCache](#wincache.configuration)

## Instalación manual de los binarios precompilados

### Requisitos de instalación

PHP solo está disponible para sistemas de 32 bits x86 o 64 bits x64, y actualmente no funciona en Windows RT o Windows sobre ARM.
A partir de la versión 8.3.0, PHP requiere Windows 8 o Windows Server 2012.
Las versiones posteriores a 7.2.0 requerían Windows 2008 R2 o Windows 7.
Las versiones anteriores a 7.2.0 soportaban Windows 2008 y Vista.

PHP requiere el runtime Visual C (CRT). Muchas otras aplicaciones también lo exigen, por lo que es probable que ya esté instalado, pero si no está presente, el Microsoft Visual C++ Redistributable para Visual Studio 2022 es adecuado para todas las versiones de PHP y puede ser
[» descargado desde Microsoft](https://visualstudio.microsoft.com/downloads/#microsoft-visual-c-redistributable-for-visual-studio-2022).

El CRT x86 debe ser descargado para ser utilizado con las compilaciones PHP x86 y el CRT x64 para las compilaciones PHP x64.
Si el CRT ya está instalado, el instalador mostrará un mensaje indicando que ya estaba instalado y no realizará ningún cambio.
El instalador CRT soporta las opciones de línea de comandos
**/quiet** y **/norestart**, por lo que la instalación puede ser scriptada.

### Dónde descargar los binarios PHP

Las compilaciones de Windows pueden ser descargadas desde [» el
sitio web PHP Windows](https://windows.php.net/download/).
Todas las compilaciones están optimizadas (PGO), y las versiones QA y GA están cuidadosamente probadas.

### Extensiones PECL precompiladas

Las versiones preconstruidas de Windows de las extensiones PECL se distribuyen como ficheros DLL en la página PECL de la extensión.

Los binarios no están disponibles para las extensiones que utilizan características específicas de otros sistemas, como Unix, o dependen de bibliotecas que no están disponibles en Windows.

### Tipos de compilación

Existen cuatro tipos de compilaciones PHP:

    -
     Thread-Safe (TS) - para servidores web de proceso único, como Apache con mod_php




    -
     Non-Thread-Safe (NTS) - para IIS y otros servidores web FastCGI (Apache con mod_fastcgi) y recomendado para scripts en línea de comandos




    -
     x86 - para sistemas de 32 bits.




    -
     x64 - para sistemas de 64 bits.

## Apache 2.x en Microsoft Windows

Esta sección contiene notas y sugerencias específicas de Apache 2.x instaladas
con PHP en sistemas Microsoft Windows.

**Nota**:

Se debe leer primero el [manual
de instalación PHP en Windows](#install.windows.manual)

Se recomienda consultar la
[» Documentación de Apache](http://httpd.apache.org/docs/current/)
para obtener un conocimiento básico del servidor Apache 2.x.
También considere leer las
[» notas específicas para Windows](http://httpd.apache.org/docs/current/platform/windows.html)
para Apache 2.x antes de seguir leyendo.

Descargue la versión más reciente de
[» Apache 2.x](https://www.apachelounge.com/download/)
y una versión adecuada de PHP. Siga los pasos del
[manual de instalación](#install.windows.manual)
y regrese para continuar con la integración de PHP y Apache.

Hay tres formas de configurar PHP para que funcione con Apache 2.x en Windows.
PHP se puede ejecutar como controlador, como CGI o bajo FastCGI

**Nota**: Recuerde que al añadir
valores que representan una ruta en la configuración de Apache bajo Windows,
todos los antislash, como c:\directorio\archivo.ext, deben ser
convertidos a slashes, como
c:/directorio/archivo.ext. Un slash final puede
también ser necesario para los directorios.

### Instalación como un controlador de Apache

**Nota**:

    Cuando se utiliza apache2handler SAPI, se debe utilizar la versión
    Thread Safe (TS) de PHP.

Para cargar el módulo PHP en Apache 2.x las siguientes líneas en el
fichero de configuración httpd.conf de Apache deben ser añadidas:

    **Ejemplo #1 PHP y Apache 2.x como controlador**

# before PHP 8.0.0 the name of the module was php7_module

LoadModule php_module "c:/php/php8apache2_4.dll"
&lt;FilesMatch \.php$&gt;
SetHandler application/x-httpd-php
&lt;/FilesMatch&gt;

# configure the path to php.ini

PHPIniDir "C:/php"

**Nota**:

    La ruta real de PHP debe sustituirse por
    C:/php/ en los ejemplos anteriores.
    Asegúrese que el fichero al que hace referencia en la directiva LoadModule
    está en la ubicación especificada, y utilize php7apache2_4.dll
    para PHP 7, o php8apache2_4.dll para PHP 8.

### Ejecución de PHP como CGI

Se recomienda consultar la
[» documentación de Apache CGI](http://httpd.apache.org/docs/current/howto/cgi.html)
para una comprensión más completa de la ejecución de CGI en Apache.

Para ejecutar PHP como CGI, deberá colocar los ficheros php-cgi en un
directorio designado como directorio CGI utilizando la directiva ScriptAlias.

Será necesario colocar una línea #! en los ficheros PHP,
que apunte a la ubicación del binario PHP:

    **Ejemplo #2 PHP y Apache 2.x como CGI**

#!C:/php/php.exe
&lt;?php
phpinfo();
?&gt;

**Advertencia**
Un servidor desplegado en modo CGI se expone a varias vulnerabilidades posibles. Por favor, lea nuestra
[sección sobre la seguridad en modo CGI](#security.cgi-bin)
para aprender cómo protegerse contra estos ataques.

### Ejecutando PHP bajo FastCGI

Ejecutar PHP bajo FastCGI tiene una serie de ventajas con respecto a ejecutarlo bajo
CGI. Configurarlo de esta manera es bastante sencillo:

Descargue mod_fcgid desde
[» https://www.apachelounge.com](https://www.apachelounge.com/download/).
Los binarios de Win32 están disponibles para descargar desde ese sitio.
Instale el módulo de acuerdo con las instrucciones que lo acompañarán.

Configure su servidor web como se muestra a continuación, teniendo cuidado de ajustar cualquier ruta
que reflejen la forma en que ha instalado las cosas en su sistema particular:

    **Ejemplo #3 Configurar Apache para ejecutar PHP como FastCGI**

LoadModule fcgid_module modules/mod_fcgid.so

# ¿Dónde está el fichero php.ini?

FcgidInitialEnv PHPRC "c:/php"
&lt;FilesMatch \.php$&gt;
SetHandler fcgid-script
&lt;/FilesMatch&gt;
FcgidWrapper "c:/php/php-cgi.exe" .php

Los archivos con una extensión .php ahora serán ejecutados por el
contenedor PHP FastCGI.

## Instalación con IIS para Windows

### Instalar IIS

Los Servicios de Información de Internet (Internet Information Services - IIS) están integrados en Windows.
En Windows Server, el rol IIS puede ser añadido a través del Administrador del Servidor.
El módulo CGI debe ser incluido.
En los escritorios Windows, IIS debe ser añadido a través del Panel de Control.
La documentación de Microsoft proporciona [» instrucciones detalladas para habilitar IIS](<https://docs.microsoft.com/en-us/previous-versions/ms181052(v=vs.80)>).
Para el desarrollo,
[» IIS/Express](https://www.microsoft.com/en-us/download/details.aspx?id=48264) también puede ser utilizado.

**Nota**:

    La versión No-Thread Safe (NTS) de PHP debe ser instalada cuando se utiliza
    el gestor FastCGI con IIS.

### Configurar PHP con IIS

En el Administrador de IIS, instale el módulo FastCGI y añada una correspondencia de gestor para
.php al camino de php-cgi.exe
(no php.exe)

El comando **APPCMD** puede ser utilizado para
crear scripts de configuración de IIS.

### Ejemplo de script batch

**Ejemplo #1 Línea de comandos para configurar IIS y PHP**

@echo off

REM descargar el archivo .ZIP de la versión de PHP desde http://windows.php.net/downloads/

REM ruta del directorio en el que el archivo .ZIP de PHP ha sido descomprimido (sin \ final)
set phppath=c:\php

REM Elimina los gestores PHP actuales
%windir%\system32\inetsrv\appcmd clear config /section:system.webServer/fastCGI
REM La siguiente comanda generará un mensaje de error si PHP no está instalado. Esto puede ser ignorado.
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /-[name='PHP_via_FastCGI']

REM Configura el gestor PHP
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/fastCGI /+[fullPath='%phppath%\php-cgi.exe']
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /+[name='PHP_via_FastCGI',path='*.php',verb='*',modules='FastCgiModule',scriptProcessor='%phppath%\php-cgi.exe',resourceType='Unspecified']
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /accessPolicy:Read,Script

REM Configura las variables FastCGI
%windir%\system32\inetsrv\appcmd set config -section:system.webServer/fastCgi /[fullPath='%phppath%\php-cgi.exe'].instanceMaxRequests:10000
%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phppath%\php-cgi.exe'].environmentVariables.[name='PHP_FCGI_MAX_REQUESTS',value='10000']"
%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phppath%\php-cgi.exe'].environmentVariables.[name='PHPRC',value='%phppath%\php.ini']"

## Herramientas de terceros para la instalación de PHP

**Advertencia**

Las versiones provenientes de terceros son consideradas no oficiales y no
son directamente soportadas por el proyecto PHP. Cualquier bug encontrado
debe ser reportado al proveedor de estas versiones no oficiales, a menos que
pueda ser reproducido utilizando las versiones provenientes de [» 
la zona de descargas oficial](https://www.php.net/downloads.php).

[» XAMPP](https://www.apachefriends.org/),
[» WampServer](https://www.wampserver.com), y
[» Bitnami](https://bitnami.com)
configuran asimismo aplicaciones PHP para su uso con Apache en Windows.

## Construir a partir de las fuentes

Ver las [» instrucciones de construcción paso a paso](https://wiki.php.net/internals/windows/stepbystepbuild_sdk_2)
para compilar con Visual Studio.

## Ejecución de PHP en línea de comandos en sistemas Windows

Esta sección contiene notas y consejos específicos para la ejecución de PHP
en línea de comandos en Windows.

**Nota**:

¡Leer primero los [pasos
de instalación manual](#install.windows.manual)!

Tener PHP ejecutándose desde la línea de comandos puede realizarse sin
hacer modificaciones en Windows.

C:\php\php.exe -f "C:\PHP Scripts\script.php" -- -arg1 -arg2 -arg3

Pero hay algunos pasos fáciles de seguir para simplificar esto.
Algunos de estos pasos ya deberían haberse tomado, pero se repiten aquí
para proporcionar una secuencia completa paso a paso.

**Nota**:

     Las dos variables de sistema preexistentes PATH y PATHEXT son
     importantes en Windows,
     y se debe tener cuidado de no sobrescribirlas,
     solo añadirlas.

- Añadir la ubicación del ejecutable PHP (php.exe,
  php-win.exe o php-cli.exe
  según la versión de PHP y las preferencias de visualización) a la variable
  de entorno PATH. Leer más sobre cómo añadir el
  directorio PHP apropiado a la variable de entorno PATH en la
  [entrada FAQ correspondiente](#faq.installation.addtopath).

- Añadir la extensión .PHP
  a la variable de entorno PATHEXT. Esto puede hacerse
  al mismo tiempo que se añade la variable de entorno PATH.
  Siga los mismos pasos descritos en la [FAQ](#faq.installation.addtopath) pero modifique la variable
  de entorno PATHEXT en lugar de la variable
  de entorno PATH.

**Nota**:

       La posición en la que se coloca .PHP determinará
       qué script o programa se ejecuta cuando hay nombres de ficheros
       correspondientes. Por ejemplo, colocar .PHP antes
       de .BAT hará que se ejecute el script, en lugar del
       fichero batch, si hay un fichero batch con el mismo nombre.





- Asociar la extensión .PHP con un tipo de fichero. Esto
  se hace ejecutando el siguiente comando:

assoc .php=phpfile

- Asociar el tipo de fichero phpfile con el ejecutable PHP
  apropiado. Esto se hace ejecutando el siguiente comando:

ftype phpfile="C:\php\php.exe" -f "%1" -- %~2

Siguiendo estos pasos, los scripts PHP podrán ser ejecutados desde cualquier
directorio sin necesidad de escribir el ejecutable PHP o la extensión
.PHP y todos los argumentos serán proporcionados al script para su procesamiento.

El ejemplo a continuación detalla algunos de los cambios de registro que pueden hacerse manualmente.

**Ejemplo #1 Cambios de registro**

Windows Registry Editor Version 5.00

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\.php]
@="phpfile"
"Content Type"="application/php"

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\phpfile]
@="PHP Script"
"EditFlags"=dword:00000000
"BrowserFlags"=dword:00000008
"AlwaysShowExt"=""

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\phpfile\DefaultIcon]
@="C:\\php\\php-win.exe,0"

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\phpfile\shell]
@="Open"

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\phpfile\shell\Open]
@="&amp;Open"

[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\phpfile\shell\Open\command]
@="\"C:\\php\\php.exe\" -f \"%1\" -- %~2"

Con estos cambios, el mismo comando puede escribirse como sigue:

"C:\PHP Scripts\script" -arg1 -arg2 -arg3

o, si la ruta "C:\PHP Scripts" está en la
variable de entorno PATH:

script -arg1 -arg2 -arg3

**Nota**:

Hay un pequeño problema si la intención es utilizar esta técnica y
utilizar los scripts PHP como filtro en línea de comandos, como en el ejemplo a continuación:

dir | "C:\PHP Scripts\script" -arg1 -arg2 -arg3

o

dir | script -arg1 -arg2 -arg3

El script puede simplemente bloquearse y no mostrar nada.
Para que esto funcione, se debe realizar otro cambio de registro:

Windows Registry Editor Version 5.00

[HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\policies\Explorer]
"InheritConsoleHandles"=dword:00000001

Más información sobre este problema puede encontrarse en este [» artículo de la base de conocimientos de Microsoft: 321788](http://support.microsoft.com/default.aspx?scid=kb;en-us;321788).
A partir de Windows 10, este ajuste parece estar invertido, haciendo que la instalación por defecto de
Windows 10 soporte automáticamente los manejadores de consola heredados. Este [» 
post del foro de Microsoft](https://social.msdn.microsoft.com/Forums/en-US/f19d740d-21c8-4dc2-a9ab-d5c0527e932b/nasty-file-association-regression-bug-in-windows-10-console?forum=windowssdk) proporciona la explicación.

# Instalación en las plataformas de Nube Informática

## Tabla de contenidos

- [Azure App services](#install.cloud.azure)
- [Amazon EC2](#install.cloud.ec2)
- [DigitalOcean](#install.cloud.digitalocean)

    PHP instalará en la nube. A la nube de PHP!

## Azure App services

PHP es frecuentemente utilizado en Azure App Services (alias Microsoft Azure,
Windows Azure, Azure Web Apps).

Azure App Services gestiona los pools de servidores Web Windows para alojar
su aplicación Web, como alternativa a la gestión de su propio
servidor Web en sus propias VM de cálculo Azure u otros servidores.

PHP ya está activado para su sitio web automático Azure App Services. En
el portal de Azure, seleccione su sitio Web, y puede elegir la
versión de PHP a utilizar. Es posible que desee elegir una versión más
reciente que la predeterminada.

Como tal, PHP y las extensiones se ejecutan en Azure App Services
de la misma manera que lo harían en otros servidores Windows.

Sin embargo, la interfaz de gestión para Azure app services es diferente:

    -

       Portal de Azure: crear, modificar y eliminar los sitios Web. [» Portal de Azure](https://portal.azure.com/)





    -

       Tablero de Kudu: si el sitio Web tiene la URL
       nombre_del_sitio.azurewebsites.net,
       el tablero de Kudu es
       https://nombre_del_sitio.scm.azurewebsites.net/.
       El tablero ofrece acceso a las funcionalidades de depuración, a la gestión
       de los ficheros y a las extensiones del sitio.
       Las extensiones de sitio son un mecanismo de Azure para agregar programas
       adicionales, como versiones preliminares de PHP, a un sitio Web.





     -

       No se puede utilizar el gestor de servicios de Internet,
       el gestor de servidor o RDP.


También existe un SDK PHP, que permitirá utilizar los numerosos servicios de Azure desde su código PHP.
Ver [» Azure SDK para PHP](https://github.com/Azure/azure-sdk-for-php).

Para más información, ver [» Centro de desarrolladores de PHP de Azure](https://azure.microsoft.com/en-us/develop/php/)

    ### WinCache

WinCache está activado por omisión en Azure App Services y se recomienda dejarlo activado.

Si instala su propia versión de PHP, debe activar
WinCache.

    ### Build personalizada de PHP

Puede cargar su propia versión de PHP en su D:\Home (C:\
 no es accesible en escritura). Luego, en el portal de Azure,
defina SCRIPT_PROCESSOR para .php en la ruta de acceso absoluta al
fichero php-cgi.exe en su build personalizada.

## Amazon EC2

PHP instalará el [» EC2 cloud platform](http://aws.amazon.com/ec2/).

Ver acerca de [» AWS SDK for PHP](http://aws.amazon.com/sdkforphp/).

## DigitalOcean

DigitalOcean ofrece las siguientes plataformas para instalar PHP y
ejecutar una aplicación web en su infraestructura de alojamiento en la nube.

- [» Cloudways](https://www.cloudways.com/en/managed-hosting-for-digital-ocean.php):
  Despliegue en un clic de las principales aplicaciones PHP:
  WordPress, Magento, Drupal, Laravel y más.

- [» Droplet](https://www.digitalocean.com/products/droplets):
  Máquinas virtuales para instalar PHP y otros programas.
  [» 
  Instalación de una pila LAMP en un servidor Linux
  ](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04).

- [» Plataforma de aplicaciones](https://www.digitalocean.com/products/app-platform):
  Gestione infraestructuras para crear, implantar y escalar aplicaciones rápidamente.
  Aprenda a
  [» 
  ejecutar aplicaciones PHP en la App
  ](https://docs.digitalocean.com/products/app-platform/getting-started/sample-apps/php/).

- [» Funciones](https://www.digitalocean.com/products/functions):
  Plataforma sin servidor que permite a los desarrolladores ejecutar código sin aprovisionar ni gestionar servidores.
  PHP es compatible de forma nativa.
  Aprenda a
  [» 
  crear funciones sin servidor en PHP
  ](https://docs.digitalocean.com/products/functions/reference/runtimes/php/).

# FastCGI Process Manager (FPM)

## Tabla de contenidos

- [Instalación](#install.fpm.install)
- [Configuración](#install.fpm.configuration)

FPM (FastCGI Process Manager, gestor de procesos FastCGI)
es una alternativa a la implementación PHP FastCGI con funcionalidades adicionales útiles para sitios muy altamente cargados.

Estas funcionalidades incluyen :

- Gestión avanzada de procesos con parada/arranque suave (graceful) ;

- Pools que permiten iniciar trabajadores con diferentes uid/gid/chroot/entorno,
  escuchando en diferentes puertos y utilizando diferentes php.ini (reemplaza el modo seguro) ;

- Registro configurable stdout y stderr ;

- Reinicio de emergencia en caso de destrucción accidental del caché opcode ;

- Soporte de carga acelerada ;

- "slowlog" - registro de scripts (no solo sus nombres, sino también su backtrace PHP,
  utilizando ptrace o equivalente para leer el proceso remoto) que se ejecutan anormalmente lento ;

- [fastcgi_finish_request()](#function.fastcgi-finish-request) - función especial para terminar la petición y volcar todas las datos
  mientras se continúa ejecutando una tarea consumidora (conversión de video por ejemplo) ;

- Nacimiento de procesos hijos dinámicos/bajo demanda/estáticos ;

- Información de estado básica y extendida (similar a mod_status de Apache)
  con diferentes formatos soportados como json, xml y openmetrics ;

- Fichero de configuración basado en php.ini

## Instalación

### Compilar desde las fuentes

Para activar FPM en la construcción de PHP es necesario añadir la línea --enable-fpm
a la línea de configuración.

Existen múltiples opciones de configuración para FPM (todas opcionales):

- --with-fpm-user - el usuario FPM (por omisión - nobody).

- --with-fpm-group - el grupo FPM (por omisión - nobody).

- --with-fpm-systemd - Activa la integración de systemd (por omisión - no).

- --with-fpm-acl - Utilizar POSIX Access Control Lists (por omisión - no).

- --with-fpm-apparmor - Activa la integración de AppArmor (por omisión - no).

- --with-fpm-selinux - Activa la integración SELinux (por omisión - no).

### Historial de cambios

       Versión
       Descripción






       8.2.0

        La opción --with-fpm-selinux ha sido añadida.




       8.0.0

        La opción --with-fpm-apparmor ha sido añadida.





## Configuración

    FPM utiliza la sintaxis de php.ini para su archivo de configuración - php-fpm.conf, y archivos de configuración de grupos.





    ### Lista de directivas globales de php-fpm.conf




       pid
       [string](#language.types.string)



        Ruta al archivo PID. Valor por defecto: ninguno.







       error_log
       [string](#language.types.string)



        Ruta al archivo de registro de errores. Valor por defecto:
        #INSTALL_PREFIX#/log/php-fpm.log.
        Si se establece en "syslog", el registro se envía a syslogd en lugar de escribirse en un archivo local.







       log_level
       [string](#language.types.string)



        Nivel de registro de errores. Valores posibles: alert, error, warning, notice,
        debug. Valor por defecto: notice.







       log_limit
       [int](#language.types.integer)



        Límite de registro para las líneas registradas que permite registrar mensajes más largos que
        1024 caracteres sin envolver.
        Valor por defecto: 1024.
        Disponible a partir de PHP 7.3.0.







       log_buffering
       [bool](#language.types.boolean)



        Registro experimental sin búfer adicional.
        Valor por defecto: yes.
        Disponible a partir de PHP 7.3.0.







       syslog.facility
       [string](#language.types.string)



        usado para especificar qué tipo de programa está registrando el mensaje.
        Valor por defecto: daemon.







       syslog.ident
       [string](#language.types.string)



        Precede a cada mensaje.
        Si tiene múltiples instancias de FPM ejecutándose en el mismo servidor,
        puede cambiar el valor por defecto que debe adaptarse a las necesidades comunes.
        Valor por defecto: php-fpm.







       emergency_restart_threshold
       [int](#language.types.integer)



        Si este número de procesos hijos salen con SIGSEGV o SIGBUS dentro
        del intervalo de tiempo establecido por emergency_restart_interval,
        entonces FPM se reiniciará. Un valor de 0 significa 'Desactivado'. Valor por defecto: 0 (Desactivado).







       emergency_restart_interval
       [mixed](#language.types.mixed)



        Intervalo de tiempo utilizado por emergency_restart_interval para determinar cuándo
        se iniciará un reinicio sin interrupción. Esto puede ser útil para trabajar alrededor
        de corrupciones accidentales en la memoria compartida de un acelerador.
        Unidades disponibles: s(econdos), m(inutos), h(oras), o d(ías).
        Unidad por defecto: segundos. Valor por defecto: 0 (Desactivado).







       process_control_timeout
       [mixed](#language.types.mixed)



        Límite de tiempo para que los procesos hijos esperen una reacción a las señales del
        proceso principal. Unidades disponibles: s(econdos), m(inutos), h(oras), o d(ías)
        Unidad por defecto: segundos. Valor por defecto: 0.







       process.max
       [int](#language.types.integer)



        El número máximo de procesos que FPM generará. Esto ha sido diseñado
        para controlar el número global de procesos cuando se utiliza PM dinámico
        dentro de muchos grupos. Úselo con precaución.
        Valor por defecto: 0.







       process.priority
       [int](#language.types.integer)



        Especifica la prioridad nice(2) a aplicar al proceso principal (solo si está establecido).
        El valor puede variar de -19 (prioridad más alta) a 20 (prioridad más baja).
        Valor por defecto: no establecido.







       daemonize
       [bool](#language.types.boolean)



        Enviar FPM al fondo. Establecer en 'no' para mantener FPM en primer plano para
        depuración. Valor por defecto: yes.







       rlimit_files
       [int](#language.types.integer)



        Establecer el límite de descriptores de archivo abiertos para el proceso principal.
        Valor por defecto: valor definido por el sistema.







       rlimit_core
       [int](#language.types.integer)



        Establecer el límite máximo de tamaño de núcleo para el proceso principal.
        Valor por defecto: 0.







       events.mechanism
       [string](#language.types.string)



        Especifica el mecanismo de eventos que FPM utilizará.
        Lo siguiente está disponible: epoll, kqueue (*BSD), port (Solaris), poll, select.
        Valor por defecto: no establecido (detección automática prefiriendo epoll y kqueue).







       systemd_interval
       [int](#language.types.integer)



        Cuando FPM se construye con integración de systemd, especificar el intervalo,
        en segundos, entre las notificaciones de informe de salud a systemd.
        Establecer en 0 para desactivar.
        Valor por defecto: 10.










    ### Lista de directivas de grupo


     Con FPM puede ejecutar varios grupos de procesos con diferentes configuraciones.
     Estas son las configuraciones que se pueden ajustar por grupo.






       listen
       [string](#language.types.string)



        La dirección en la que aceptar solicitudes FastCGI. Sintaxis válidas son:
        'ip.add.re.ss:port', 'port', '/path/to/unix/socket'. Esta opción es
        obligatoria para cada grupo.







       listen.backlog
       [int](#language.types.integer)



        Establecer listen(2) backlog. Un valor de -1 significa máximo en sistemas BSD.
        Valor por defecto: -1 (FreeBSD o OpenBSD) o 511
        (Linux y otras plataformas).







       listen.allowed_clients
       [string](#language.types.string)



        Lista de direcciones IPv4 o IPv6 de clientes FastCGI que están autorizados a conectarse. Equivalente
        a la variable de entorno FCGI_WEB_SERVER_ADDRS en el PHP FastCGI original (5.2.2+).
        Solo tiene sentido con un socket de escucha tcp. Cada dirección debe estar separada por una coma.
        Si este valor se deja en blanco, se aceptarán conexiones desde cualquier dirección ip.
        Valor por defecto: no establecido (se acepta cualquier dirección ip).







       listen.owner
       [string](#language.types.string)



        Establecer permisos para el socket unix, si se utiliza uno. En Linux, los permisos de lectura/escritura
        deben establecerse para permitir conexiones desde un servidor web. Muchos sistemas derivados de BSD
        permiten conexiones independientemente de los permisos.
        Valores por defecto: usuario y grupo se establecen como el usuario en ejecución, modo se establece en 0660.







       listen.group
       [string](#language.types.string)



        Ver listen.owner.







       listen.mode
       [string](#language.types.string)



        Ver listen.owner.







       listen.acl_users
       [string](#language.types.string)



        Cuando se admiten las listas de control de acceso POSIX, puede establecerlas utilizando esta opción.
        Cuando se establece, listen.owner y listen.group
        se ignoran. El valor es una lista separada por comas de nombres de usuarios.







       listen.acl_groups
       [string](#language.types.string)



        Ver listen.acl_users.
        El valor es una lista separada por comas de nombres de grupos.







       listen.setfib
       [int](#language.types.integer)



        Establecer la tabla de rutas asociada (FIB). Solo para FreeBSD.
        Valor por defecto: -1. Desde PHP 8.2.0.







       user
       [string](#language.types.string)



        Usuario Unix de los procesos FPM. Esta opción es obligatoria.







       group
       [string](#language.types.string)



        Grupo Unix de los procesos FPM. Si no se establece, se utiliza el grupo del usuario por defecto.







       pm
       [string](#language.types.string)



        Elegir cómo el gestor de procesos controlará el número de procesos hijos.
        Valores posibles: static, ondemand,
        dynamic.
        Esta opción es obligatoria.




        static - el número de procesos hijos es fijo (pm.max_children).




        ondemand - los procesos se generan bajo demanda (cuando se solicita,
        a diferencia de dinámico, donde pm.start_servers se inician
        cuando se inicia el servicio.




        dynamic - el número de procesos hijos se establece dinámicamente en función de las
        siguientes directivas: pm.max_children, pm.start_servers,
        pm.min_spare_servers, pm.max_spare_servers.







       pm.max_children
       [int](#language.types.integer)



        El número de procesos hijos que se crearán cuando pm se establece en
        static y el número máximo de procesos hijos que se crearán
        cuando pm se establece en dynamic. Esta
        opción es obligatoria.




        Esta opción establece el límite en el número de solicitudes simultáneas que
        se atenderán. Equivalente a la directiva ApacheMaxClients con
        mpm_prefork y a la variable de entorno PHP_FCGI_CHILDREN en el
        PHP FastCGI original.







       pm.start_servers
       [int](#language.types.integer)



        El número de procesos hijos creados al inicio.
        Solo se utiliza cuando pm se establece en dynamic.
        Valor por defecto: (min_spare_servers + max_spare_servers) / 2.







       pm.min_spare_servers
       [int](#language.types.integer)



        El número deseado de procesos de servidor inactivos. Solo se utiliza cuando
        pm se establece en dynamic. También
        obligatorio en este caso.







       pm.max_spare_servers
       [int](#language.types.integer)



        El número deseado de procesos de servidor inactivos. Solo se utiliza cuando
        pm se establece en dynamic. También
        obligatorio en este caso.







       pm.max_spawn_rate
       [int](#language.types.integer)



        El número de tasa para generar procesos hijos a la vez. Solo se utiliza cuando
        pm se establece en dynamic.
        Valor por defecto: 32







       pm.process_idle_timeout
       [mixed](#language.types.mixed)



        El número de segundos después de los cuales un proceso inactivo será eliminado.
        Solo se utiliza cuando pm se establece en ondemand.
        Unidades disponibles: s(econdos)(por defecto), m(inutos), h(oras), o d(ías).
        Valor por defecto: 10s.







       pm.max_requests
       [int](#language.types.integer)



        El número de solicitudes que cada proceso hijo debe ejecutar antes
        de regenerarse. Esto puede ser útil para trabajar alrededor de fugas de memoria en bibliotecas de terceros.
        Para el procesamiento de solicitudes sin fin, especifique '0'. Equivalente a
        PHP_FCGI_MAX_REQUESTS. Valor por defecto: 0.







       pm.status_listen
       [string](#language.types.string)



        La dirección en la que aceptar solicitudes de estado FastCGI. Esto crea un nuevo grupo invisible
        que puede manejar solicitudes de forma independiente. Esto es útil si el grupo principal está ocupado con solicitudes de larga duración porque aún es posible obtener la
        [página de estado de FPM](#fpm.status) antes de finalizar las solicitudes de larga duración.
        La sintaxis es la misma que para la directiva [listen](#listen).
        Valor por defecto: ninguno.







       pm.status_path
       [string](#language.types.string)



        La URI para ver la [página de estado de FPM](#fpm.status). Este valor debe
        comenzar con una barra inicial (/). Si este valor no se establece, ninguna URI será reconocida como
        una página de estado. Valor por defecto: ninguno.







       ping.path
       [string](#language.types.string)



        La URI de ping para llamar a la página de monitoreo de FPM. Si este valor no
        se establece, ninguna URI será reconocida como una página de ping. Esto podría usarse para probar
        desde fuera que FPM está vivo y respondiendo. Tenga en cuenta que el valor debe
        comenzar con una barra inicial (/).







       ping.response
       [string](#language.types.string)



        Esta directiva puede usarse para personalizar la respuesta a una
        solicitud de ping. La respuesta se formatea como text/plain con un código de respuesta 200.
        Valor por defecto: pong.







       process.priority
       [int](#language.types.integer)



        Especifica la prioridad nice(2) a aplicar al proceso de trabajo (solo si está establecido).
        El valor puede variar de -19 (prioridad más alta) a 20 (prioridad más baja).
        Valor por defecto: no establecido.







       process.dumpable
       [bool](#language.types.boolean)



        Establece la bandera de proceso dumpable (PR_SET_DUMPABLE prctl) incluso si el usuario o grupo del proceso
        es diferente al usuario del proceso principal. Permite crear un volcado de núcleo de proceso
        y ptrace el proceso para el usuario del grupo.
        Valor por defecto: no. Desde PHP 7.0.29, 7.1.17 y 7.2.5.







       prefix
       [string](#language.types.string)



        Especificar prefijo para la evaluación de rutas







       request_terminate_timeout
       [mixed](#language.types.mixed)



        El tiempo límite para atender una solicitud única después del cual el
        proceso de trabajo será eliminado. Esta opción debe usarse cuando la opción
        ini 'max_execution_time' no detiene la ejecución del script por alguna razón. Un valor de '0' significa
        'Desactivado'. Unidades disponibles: s(econdos)(por defecto), m(inutos), h(oras), o d(ías).
        Valor por defecto: 0.







       request_terminate_timeout_track_finished
       [bool](#language.types.boolean)



        El tiempo límite establecido por
        [request_terminate_timeout](#request-terminate-timeout) no se activa
        después de un [fastcgi_finish_request](#function.fastcgi-finish-request) o
        cuando la aplicación ha terminado y se están llamando las funciones de cierre internas. Esta
        directiva habilitará el límite de tiempo para que se aplique incondicionalmente incluso en tales casos.
        Valor por defecto: no. Desde PHP 7.3.0.







       request_slowlog_timeout
       [mixed](#language.types.mixed)



        El tiempo límite para atender una solicitud única después del cual se volcará un backtrace de PHP
        al archivo 'slowlog'. Un valor de '0' significa 'Desactivado'.
        Unidades disponibles: s(econdos)(por defecto), m(inutos), h(oras), o d(ías).
        Valor por defecto: 0.







       request_slowlog_trace_depth
       [int](#language.types.integer)



        La profundidad del registro de traza de pila de slowlog.
        Valor por defecto: 20. Desde PHP 7.2.0.







       slowlog
       [string](#language.types.string)



        El archivo de registro para solicitudes lentas. Valor por defecto:
        #INSTALL_PREFIX#/log/php-fpm.log.slow.







       rlimit_files
       [int](#language.types.integer)



        Establecer el límite de descriptores de archivo abiertos para los procesos hijos en este grupo. Valor por defecto: valor definido por el sistema.







       rlimit_core
       [int](#language.types.integer)



        Establecer el límite máximo de tamaño de núcleo para los procesos hijos en este grupo. Valores posibles: 'unlimited' o un entero mayor o igual a 0.
        Valor por defecto: valor definido por el sistema.







       chroot
       [string](#language.types.string)



        Cambiar al directorio raíz al inicio. Este valor debe definirse como
        una ruta absoluta. Cuando este valor no está establecido, no se utiliza chroot.







       chdir
       [string](#language.types.string)



        Cambiar al directorio al inicio. Este valor debe ser una ruta absoluta.
        Valor por defecto: directorio actual o / cuando chroot.







       catch_workers_output
       [bool](#language.types.boolean)



        Redirigir la salida y error estándar de los trabajadores al registro de errores principal. Si no está establecido,
        la salida y error estándar se redirigirán a /dev/null según las especificaciones de FastCGI.
        Valor por defecto: no.







       decorate_workers_output
       [bool](#language.types.boolean)



        Habilitar la decoración de salida para la salida de los trabajadores cuando [catch_workers_output](#catch-workers-output) está habilitado.
        Valor por defecto: yes.
        Disponible a partir de PHP 7.3.0.







       clear_env
       [bool](#language.types.boolean)



        Limpiar el entorno en los trabajadores de FPM.
        Evita que variables de entorno arbitrarias lleguen a los procesos de trabajadores de FPM
        limpiando el entorno en los trabajadores antes de que se añadan las variables de entorno especificadas en esta
        configuración de grupo.
        Valor por defecto: Sí.







       security.limit_extensions
       [string](#language.types.string)



        Limita las extensiones del script principal que FPM permitirá analizar.
        Esto puede evitar errores de configuración en el lado del servidor web.
        Solo debe limitar FPM a extensiones .php para evitar que usuarios malintencionados
        utilicen otras extensiones para ejecutar código php.
        Valor por defecto: .php .phar







       apparmor_hat
       [string](#language.types.string)



        Si AppArmor está habilitado, permite cambiar de sombrero.
        Valor por defecto: no establecido







       access.log
       [string](#language.types.string)



        El archivo de registro de acceso.
        Valor por defecto: no establecido







       access.format
       [string](#language.types.string)



        El formato del registro de acceso.
        Valor por defecto: "%R - %u %t \"%m %r\" %s":



         <caption>**Opciones válidas**</caption>



            Marcador de posición
            Descripción







             %%

            El carácter %




             %C


             %CPU utilizado por la solicitud. Puede aceptar el siguiente formato:
             %{user}C para solo CPU de usuario,
             %{system}C para solo CPU del sistema,
             %{total}C para CPU de usuario + sistema (por defecto)





             %d


             Tiempo empleado para atender la solicitud.
             Puede aceptar los siguientes formatos para precisión:
             %{seconds}d (por defecto), %{milliseconds}d,
             %{microseconds}d





             %{name}e


             Una variable de entorno (igual que [$_ENV](#reserved.variables.environment) o [$_SERVER](#reserved.variables.server)).
             Un nombre de variable debe especificarse entre llaves para especificar el nombre de la variable de entorno.
             Por ejemplo, específicos del servidor como %{REQUEST_METHOD}e o
             %{SERVER_PROTOCOL}e, encabezados HTTP como
             %{HTTP_HOST}e o %{HTTP_USER_AGENT}e





             %f

            Nombre del script




             %l


             Content-Length de la solicitud (solo para solicitudes HTTP POST)





             %m

            Método HTTP de la solicitud




             %M


             Pico de memoria asignada por PHP.
             Puede aceptar el siguiente formato:
             %{bytes}M (por defecto), %{kilobytes}M
             %{kilo}M, %{megabytes}M,
             %{mega}M





             %n

            Nombre del grupo




             %{name}o


             Encabezado de salida. El nombre del encabezado debe especificarse entre llaves.
             Por ejemplo: %{Content-Type}o,
             %{X-Powered-By}o, %{Transfer-Encoding}o





             %p

            PID del hijo que atendió la solicitud




             %P

            PID del padre del hijo que atendió la solicitud




             %q

            Cadena de consulta




             %Q


             El carácter '?', o pegamento entre %q y %r,
             si existe la cadena de consulta





             %r


             URI de solicitud sin la cadena de consulta,
             ver %q y %Q





             %R

            Dirección IP remota




             %s

            Estado (código de respuesta)




             %t


             Hora del servidor en que se recibió la solicitud. Puede
             aceptar un formato strftime(3):
             %d/%b/%Y:%H:%M:%S %z (por defecto)
             El formato strftime(3) debe encapsularse en
             una etiqueta %{&lt;strftime_format&gt;}t, por ejemplo, para una cadena de tiempo en formato ISO8601, use:
             %{%Y-%m-%dT%H:%M:%S%z}t





             %T


             Hora en que se escribió el registro (cuando la solicitud terminó). Puede aceptar un
             formato strftime(3):
             %d/%b/%Y:%H:%M:%S %z (por defecto).
             El formato strftime(3) debe encapsularse en una
             etiqueta %{&lt;strftime_format&gt;}T, por ejemplo, para una cadena de tiempo en formato ISO8601, use:
             %{%Y-%m-%dT%H:%M:%S%z}T





             %u

            Usuario de autenticación básica, si se especifica en el encabezado Authorization











       access.suppress_path
       [array](#language.types.array)



        Una lista de valores de request_uri que deben filtrarse del registro de acceso.
        Valor por defecto: no establecido. Desde PHP 8.2.0.







     Es posible pasar variables de entorno adicionales y actualizar la configuración de PHP de un grupo determinado.
     Para hacer esto, debe agregar las siguientes opciones al archivo de configuración del grupo.



      **Ejemplo #1 Pasar variables de entorno y configuración de PHP a un grupo**




env[HOSTNAME] = $HOSTNAME
env[PATH] = /usr/local/bin:/usr/bin:/bin
env[TMP] = /tmp
env[TMPDIR] = /tmp
env[TEMP] = /tmp

php_admin_value[sendmail_path] = /usr/sbin/sendmail -t -i -f www@my.domain.com
php_flag[display_errors] = off
php_admin_value[error_log] = /var/log/fpm-php.www.log
php_admin_flag[log_errors] = on
php_admin_value[memory_limit] = 32M

     La configuración de PHP pasada con php_value o
     php_flag sobrescribirá su valor anterior.
     Tenga en cuenta que definir
     [disable_functions](#ini.disable-functions) o
     [disable_classes](#ini.disable-classes) no
     sobrescribirá los valores previamente definidos de php.ini,
     sino que añadirá el nuevo valor en su lugar.


     Las configuraciones definidas con php_admin_value y php_admin_flag
     no pueden ser anuladas con [ini_set()](#function.ini-set).




     La configuración de PHP puede establecerse en la configuración del servidor web.



      **Ejemplo #2 Establecer configuración de PHP en nginx.conf**




set $php_value "pcre.backtrack_limit=424242";
set $php_value "$php_value \n pcre.recursion_limit=99999";
fastcgi_param PHP_VALUE $php_value;

fastcgi_param PHP_ADMIN_VALUE "open_basedir=/var/www/htdocs";

     **Precaución**

       Debido a que estas configuraciones se pasan a php-fpm como encabezados fastcgi,
       php-fpm no debe estar vinculado a una dirección accesible en todo el mundo.
       De lo contrario, cualquiera podría alterar las opciones de configuración de PHP.
       Ver también
       [listen.allowed_clients](#listen-allowed-clients).




     **Nota**:

       Los grupos no son un mecanismo de seguridad, porque no proporcionan una separación completa; por ejemplo, todos los grupos utilizarían una sola instancia de OPcache.



# Instalación de extensiones PECL

## Tabla de contenidos

- [Introducción a las instalaciones PECL](#install.pecl.intro)
- [Descarga de extensiones PECL](#install.pecl.downloads)
- [Instalación de una extensión PHP en Windows](#install.pecl.windows)
- [Compilación de extensiones PECL compartidas con el comando pecl](#install.pecl.pear)
- [Compilación de extensiones PECL compartidas con phpize](#install.pecl.phpize)
- [php-config](#install.pecl.php-config)
- [Compilación de extensiones PECL estáticamente en PHP](#install.pecl.static)

    ## Introducción a las instalaciones PECL

    **Nota**:

    El instalador de Extensiones para PHP (PHP Installer for Extensions - PIE) es una nueva herramienta que reemplazará PECL.
    Recomendamos usar PIE para instalar extensiones.
    Más información en [» https://github.com/php/pie](https://github.com/php/pie)

    [» PECL](https://pecl.php.net/) es un repositorio de extensiones PHP que están disponibles a través del
    sistema de empaquetado [» PEAR](https://pear.php.net/).
    Esta sección del manual está destinada a demostrar cómo obtener e
    instalar extensiones PECL.

    Estas instrucciones asumen que /path/to/php/src/dir/ es la
    ruta a la distribución del código fuente de PHP y que extname es
    el nombre de la extensión PECL. Ajuste según corresponda.
    Estas instrucciones también asumen familiaridad con el
    [» comando pear](https://pear.php.net/manual/en/guide.users.commandline.cli.php).
    La información en el manual de PEAR para el
    comando **pear**
    también se aplica al
    comando **pecl**.

    Una extensión compartida debe ser compilada, instalada y cargada para ser útil.
    Los métodos descritos a continuación proporcionan varias instrucciones sobre cómo compilar e
    instalar las extensiones, pero no las cargan automáticamente.
    Las extensiones pueden cargarse añadiendo una
    directiva [extension](#ini.extension)
    al fichero php.ini o mediante el uso de la
    función [dl()](#function.dl).

    Al compilar módulos PHP, es importante tener versiones conocidas y buenas de las
    herramientas requeridas (autoconf, automake, libtool, etc.).
    Consulte las
    [» Instrucciones de Git Anónimo](https://www.php.net/git.php)
    para obtener detalles sobre las herramientas requeridas y las versiones necesarias.

    ## Descarga de extensiones PECL

    **Nota**:

    El instalador de Extensiones para PHP (PHP Installer for Extensions - PIE) es una nueva herramienta que reemplazará PECL.
    Recomendamos usar PIE para instalar extensiones.
    Más información en [» https://github.com/php/pie](https://github.com/php/pie)

    Hay varias opciones para descargar extensiones PECL, como:
    - El comando **pecl install extname** descarga el
      código de la extensión automáticamente, por lo que en este caso no es necesaria una
      descarga separada.

    - [» https://pecl.php.net/](https://pecl.php.net/)

        El sitio web de PECL contiene información sobre las diferentes extensiones que
        ofrece el Equipo de Desarrollo de PHP.
        La información disponible aquí incluye: registro de cambios, notas de la versión,
        requisitos y otros detalles similares.

    - **pecl download extname**

        Las extensiones PECL que tienen versiones publicadas en el sitio web de PECL están disponibles
        para descarga e instalación usando el
        [» comando pecl](https://pear.php.net/manual/en/guide.users.commandline.cli.php).
        También pueden especificarse revisiones específicas.

    - git

        Muchas extensiones PECL residen en GitHub.

    - SVN

        Algunas extensiones PECL también residen en SVN.
        Una vista basada en web puede verse en
        [» https://svn.php.net/pecl/](https://svn.php.net/pecl/).
        Para descargar directamente desde SVN,
        puede usarse la siguiente secuencia de comandos:

$ svn checkout https://svn.php.net/repository/pecl/extname/trunk extname

- Descargas para Windows

    El proyecto PHP compila y ofrece DLLs de Windows para la mayoría de las extensiones PECL
    en la página del paquete.

## Instalación de una extensión PHP en Windows

Hay dos formas de cargar una extensión PHP en Windows: compilarla en
PHP o cargar la DLL.
Cargar una extensión precompilada es la forma más fácil y preferida.

Para cargar una extensión, debe estar disponible como un
fichero .dll
en el sistema.
Todas las extensiones son compiladas automáticamente y periódicamente por el Grupo PHP
(consulte la siguiente sección para la descarga).

Para compilar una extensión en PHP, consulte la
documentación de [compilación desde el código fuente](#install.windows.building).

Para compilar una extensión independiente (también conocida como un fichero DLL), consulte la
documentación de [compilación desde el código fuente](#install.windows.building).
Si el fichero DLL no está disponible ni con la distribución de PHP ni en PECL,
puede ser necesario compilarlo antes de que la extensión pueda usarse.

### ¿Dónde encontrar una extensión?

    Las extensiones PHP suelen llamarse php_*.dll (donde el
    asterisco representa el nombre de la extensión), y se encuentran en la
    carpeta PHP\ext.




    PHP incluye las extensiones más útiles para la mayoría de los desarrolladores.
    Se llaman extensiones *incluidas*.




    Sin embargo, si las extensiones incluidas no proporcionan la funcionalidad necesaria,
    aún puede encontrarse una extensión que lo haga en [» PECL](https://pecl.php.net/).
    La Biblioteca de Extensiones de la Comunidad PHP (PECL) es un repositorio para
    Extensiones PHP, que proporciona un directorio de todas las extensiones conocidas y ofrece
    instalaciones para descargar y desarrollar extensiones PHP.




    Si una extensión ha sido desarrollada para usos particulares, puede estar alojada en
    PECL para que otros con las mismas necesidades puedan beneficiarse de ella.
    Un buen efecto secundario es que es una buena oportunidad para recibir comentarios,
    (con suerte) agradecimientos, informes de errores e incluso correcciones/parches.
    Antes de enviar una extensión para alojarla en PECL, lea
    [» PECL submit](https://pecl.php.net/package-new.php).

### ¿Qué extensión descargar?

    *
     Muchas veces, habrá varias versiones de cada DLL disponibles:
    *



     -

       Diferentes números de versión (al menos los dos primeros números deben coincidir)



     -

       Diferentes configuraciones de seguridad de hilos



     -

       Diferentes arquitecturas de procesador (x86, x64, ...)



     -

       Diferentes configuraciones de depuración



     -

       etc.






    Tenga en cuenta que la configuración de la extensión debe coincidir con todas las configuraciones de
    el ejecutable de PHP que se está utilizando.
    El siguiente script PHP informará *todo* sobre la configuración de PHP:







     **Ejemplo #1
      Llamada a [phpinfo()](#function.phpinfo)
     **




&lt;?php
phpinfo();
?&gt;

    O desde la línea de comandos, ejecute:

drive:\path\to\php\executable\php.exe -i

### Carga de una extensión

    La forma más común de cargar una extensión PHP es incluirla en el
    fichero de configuración php.ini.
    Tenga en cuenta que muchas extensiones ya están presentes en el php.ini y
    que solo es necesario eliminar el punto y coma para activarlas.




    Tenga en cuenta que, a partir de PHP 7.2.0, puede usarse el nombre de la extensión
    en lugar del nombre del fichero de la extensión.
    Al ser independiente del sistema operativo y más fácil, especialmente para los recién llegados, se convierte
    en la forma recomendada de especificar las extensiones a cargar.
    Los nombres de fichero siguen siendo compatibles con versiones anteriores.

;extension=php_extname.dll

extension=php_extname.dll

; A partir de PHP 7.2.0, se prefiere:
extension=extname
zend_extension=another_extension

    Sin embargo, algunos servidores web son confusos porque no usan
    el php.ini ubicado junto al ejecutable de PHP.
    Para averiguar dónde reside el php.ini real, busque su ruta
    en [phpinfo()](#function.phpinfo):

Configuration File (php.ini) Path C:\WINDOWS

Loaded Configuration File C:\Program Files\PHP\8.2\php.ini

    Después de activar una extensión, guarde php.ini, reinicie el servidor web y
    verifique [phpinfo()](#function.phpinfo) nuevamente.
    La nueva extensión debería tener ahora su propia sección.

### Resolución de problemas

    Si la extensión no aparece en [phpinfo()](#function.phpinfo),
    deben revisarse los registros para saber de dónde proviene el problema.




    Si PHP se está utilizando desde la línea de comandos (CLI), el error de carga de la extensión
    puede leerse directamente en la pantalla.




    Si PHP se está utilizando con un servidor web, la ubicación y el formato de los registros
    varían según el software.
    Lea la documentación del servidor web para localizar los registros, ya que no tiene
    nada que ver con PHP en sí.




    Los problemas comunes son la ubicación de la DLL y las DLLs de las que depende, el
    valor de la configuración "[extension_dir](#ini.extension-dir)"
    dentro de php.ini y las incompatibilidades en la configuración de compilación.




    Si el problema radica en una incompatibilidad en la configuración de compilación, probablemente la DLL
    descargada no es la correcta.
    Intente descargar la extensión nuevamente con la configuración adecuada.
    Nuevamente, [phpinfo()](#function.phpinfo) puede ser de gran ayuda.

## Compilación de extensiones PECL compartidas con el comando pecl

PECL facilita la creación de extensiones PHP compartidas.
Usando el
[» comando pecl](https://pear.php.net/manual/en/guide.users.commandline.cli.php),
haga lo siguiente:

$ pecl install extname

Esto descargará el código fuente de _extname_,
lo compilará e instalará extname.so en el
[extension_dir](#ini.extension-dir).
extname.so
luego puede cargarse a través de php.ini.

Por omisión, el comando **pecl** no instalará paquetes
que estén marcados con el estado alpha o
beta.
Si no hay paquetes stable disponibles,
puede instalarse un paquete beta usando el siguiente
comando:

$ pecl install extname-beta

También puede instalarse una versión específica usando esta variante:

$ pecl install extname-0.1

**Nota**:

    Después de habilitar la extensión en php.ini, es necesario reiniciar el servicio web para que
    los cambios surtan efecto.

## Compilación de extensiones PECL compartidas con phpize

A veces, usar el instalador **pecl** no es una opción.
Esto podría deberse a que hay un firewall o porque la extensión que se está
instalando no está disponible como un paquete compatible con PECL, como extensiones no publicadas
de git.
Si es necesario compilar dicha extensión, se pueden usar las herramientas de compilación de bajo nivel para
realizar la compilación manualmente.

El comando **phpize** se utiliza para preparar el entorno de compilación
para una extensión PHP.
En el siguiente ejemplo, los fuentes de una extensión están en un directorio
llamado extname:

$ cd extname
$ phpize
$ ./configure
$ make

# make install

Una instalación exitosa habrá creado extname.so y
lo habrá colocado en el directorio de extensiones de PHP
[extensions directory](#ini.extension-dir).
El php.ini deberá ajustarse y se deberá añadir una
línea extension=extname.so
antes de que la extensión pueda usarse.

Si el sistema no tiene el comando **phpize**, y
se usan paquetes precompilados (como RPMs), asegúrese de instalar también la
versión de desarrollo adecuada del paquete PHP, ya que a menudo incluyen el
comando **phpize**
junto con los ficheros de cabecera adecuados para compilar PHP y sus extensiones.

Ejecute **phpize --help** para mostrar información adicional de uso.

##

**php-config**

**php-config**
es un script de shell simple para obtener información sobre la configuración instalada de PHP.

Cuando las extensiones se están compilando, si hay varias versiones de PHP instaladas, la instalación para la cual
se va a compilar puede especificarse usando la opción
**--with-php-config**
durante la configuración, estableciendo la ruta del script respectivo
**php-config**.

La lista de opciones de línea de comandos proporcionadas por el
script **php-config** puede consultarse en cualquier momento ejecutando
**php-config**
con el modificador **-h**:

Usage: /usr/local/bin/php-config [OPTION]
Options:
--prefix [...]
--includes [...]
--ldflags [...]
--libs [...]
--extension-dir [...]
--include-dir [...]
--php-binary [...]
--php-sapis [...]
--configure-options [...]
--version [...]
--vernum [...]

    <caption>**Opciones de línea de comandos**</caption>



       Opción
       Descripción






       --prefix
       Prefijo del directorio donde está instalado PHP, p. ej. /usr/local



       --includes

        Lista de opciones -I con todos los ficheros de inclusión




       --ldflags

        LD
        flags con los que se compiló PHP




       --libs
       Bibliotecas adicionales con las que se compiló PHP



       --extension-dir
       Directorio donde se buscan las extensiones por omisión



       --include-dir

        Prefijo del directorio donde se instalan los ficheros de cabecera por omisión




       --php-binary
       Ruta completa al binario CLI o CGI de php



       --php-sapis
       Mostrar todos los módulos SAPI disponibles



       --configure-options

        Opciones de configuración para recrear la configuración de la instalación actual de PHP




       --version
       Versión de PHP



       --vernum
       Versión de PHP como entero




## Compilación de extensiones PECL estáticamente en PHP

Puede ser necesario compilar una extensión PECL estáticamente en el binario de PHP.
Para hacerlo, el código fuente de la extensión deberá colocarse bajo el
directorio /path/to/php/src/dir/ext/,
y el sistema de compilación de PHP deberá regenerar su script de configuración.

$ cd /path/to/php/src/dir/ext
$ pecl download extname
$ gzip -d &lt; extname.tgz | tar -xvf -
$ mv extname-x.x.x extname

Esto dará como resultado el siguiente directorio:

/path/to/php/src/dir/ext/extname

Desde aquí, PHP necesita ser forzado a reconstruir el script de configuración, y luego
puede ser compilado normalmente:

$ cd /path/to/php/src/dir
$ rm configure
$ ./buildconf --force
$ ./configure --help
$ ./configure --with-extname --enable-someotherext --with-foobar
$ make
$ make install

**Nota**:

    Para ejecutar el script **buildconf**, se necesitarán
    **autoconf**
    2.68
    y
    **automake**
    1.4+.
    Versiones más recientes de **autoconf** pueden funcionar pero no están
    soportadas.

Si se usa
**--enable-extname**
o
**--with-extname**
depende de la extensión.
Normalmente, una extensión que no requiere bibliotecas externas usa
**--enable**.
Para estar seguro, ejecute lo siguiente después de **buildconf**:

$ ./configure --help | grep extname

# Instalación de Composer y paquetes de terceros

## Introducción a Composer

[» Composer](https://getcomposer.org/) es un administrador de dependencias para PHP, lo cual hace posible
definir el uso de paquetes de código de terceros en un proyecto,
facilitando su instalación y actualización. El cual se beneficia de la característica integrada de
[autocarga de clases](#language.oop5.autoload)
de PHP, repositorios de paquetes de PHP como
[» Packagist](https://packagist.org), y convenciones comunes
de diseño y codificación del proyecto.

Por ejemplo, si una aplicación o sitio web en PHP necesita
trabajar con valores UUID,
el [» paquete
ramsey/uuid de Ben Ramsey](https://packagist.org/packages/ramsey/uuid)
el cual implementa los tipos de UUID ampliamente conocidos y utilizados,
y definidos en [» RFC 4122](https://datatracker.ietf.org/doc/html/rfc4122) podrían ser utilizados.

Brevemente, esto se hace creando un archivo composer.json
en el proyecto, y usando Composer para instalar la última versión del
paquete, e incluyendo el script de autocarga de Composer para hacerlo disponible
al código. La [» documentación
"Basic Usage" (Uso básico) de Composer](https://getcomposer.org/doc/01-basic-usage.md) profundiza en esto.

**Ejemplo #1
composer.json el cual incluye un solo paquete.
**

{
"require": {
"ramsey/uuid": "^4.7"
}
}

# Instalación de PIE y extensiones de terceros

## Introducción a PIE

[» PIE](https://github.com/php/pie) es un instalador para PHP que permite instalar
extensiones PHP de terceros, que luego pueden ser fácilmente instaladas y actualizadas.
Aprovecha el repositorio de extensiones PHP de
[» Packagist](https://packagist.org) para encontrar el código fuente
para compilar la extensión, o un binario de Windows para descargar, si existe. Si
descarga el código fuente, también sabe cómo compilarlo e instalarlo.

Tras [» instalar
los requisitos y PIE en sí](https://github.com/php/pie?tab=readme-ov-file#what-do-i-need-to-get-started), puede instalar la
[extensión MongoDB](#mongodb.mongodb) ejecutando
el siguiente comando en la línea de comandos.

**Ejemplo #1 Instalación de la extensión MongoDB con PIE**

pie install mongodb/mongodb-extension

La documentación de [» "Uso de PIE"](https://github.com/php/pie/blob/main/docs/usage.md)
profundiza más en este tema.

# Configuración en tiempo de ejecución

## Tabla de contenidos

- [El fichero de configuración](#configuration.file)
- [Ficheros .user.ini](#configuration.file.per-user)
- [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes)
- [Cómo modificar la configuración](#configuration.changes)

    ## El fichero de configuración

    El fichero de configuración (php.ini) es leído por PHP al inicio. Si se ha compilado PHP como módulo, el fichero solo se lee una vez, al inicio del servidor web. Para las versiones
    CGI y CLI el fichero es leído en cada invocación.

    El php.ini se busca en estos lugares (y en este orden) :
    - El lugar específico del módulo SAPI (la directiva PHPIniDir
      de Apache 2, la opción de la línea de comandos -c en CGI y en CLI)

    - La variable de entorno PHPRC.

    - El lugar donde se encuentra el fichero php.ini
      puede ser definido para diferentes versiones de PHP.
      La raíz de las claves de registro depende de la arquitectura de 32 o 64 bits del SO y de PHP.
      Para un SO y PHP de 32 bits o un SO y PHP de 64 bits, utilizar
      [HKEY_LOCAL_MACHINE\SOFTWARE\PHP] para PHP de 32 bits
      en un SO de 64 bits, utilizar
      [HKEY_LOCAL_MACHINE\SOFTWARE\WOW6432Node\PHP]
      en su lugar.
      Para una instalación con la misma arquitectura, las siguientes claves de registro se buscan en este orden :
      [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y.z],
      [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y] y
      [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x], donde
      x, y y z significan las versiones mayores, menores y normales.
      Para una arquitectura de 32 bits de PHP en un SO de 64 bits, las siguientes claves de
      registro se buscan en este orden :
      [HKEY_LOCAL_MACHINE\SOFTWARE\WOW6421Node\PHP\x.y.z],
      [HKEY_LOCAL_MACHINE\SOFTWARE\WOW6421Node\PHP\x.y] y
      [HKEY_LOCAL_MACHINE\SOFTWARE\WOW6421Node\PHP\x], donde
      x, y y z significan las versiones mayores, menores y normales.
      Si hay un valor para IniFilePath en estas claves,
      el primero encontrado será utilizado como el lugar donde se encuentra el fichero
      php.ini (solo en Windows).

    - [HKEY_LOCAL_MACHINE\SOFTWARE\PHP] o
      [HKEY_LOCAL_MACHINE\SOFTWARE\WOW6432Node\PHP], valor de
      IniFilePath (solo en Windows).

    - El directorio de trabajo actual (excepto para CLI)

    - El directorio del servidor web (para los módulos SAPI), o el directorio que contiene PHP
      (de otro modo en Windows)

    - El directorio Windows (C:\windows
      o C:\winnt) (para Windows), o
      la opción de compilación --with-config-file-path durante la compilación

    Si el fichero php-SAPI.ini existe (donde SAPI utiliza SAPI, por lo que
    el nombre del fichero es e.g. php-cli.ini o
    php-apache.ini), se utilizará en lugar de php.ini.
    El nombre SAPI puede ser determinado utilizando la función [php_sapi_name()](#function.php-sapi-name).

    **Nota**:

    El servidor web Apache cambia este directorio al directorio root al inicio, lo que hace
    que PHP intente leer php.ini desde el sistema de ficheros raíz si existe.

    Las variables de entorno pueden ser referenciadas en los valores
    de configuración de php.ini como se ilustra a continuación. A partir de PHP 8.3.0,
    un valor de repliegue puede ser especificado, que será utilizado cuando la variable
    referenciada no esté definida.

    **Ejemplo #1 Variables de entorno en php.ini**

; PHP_MEMORY_LIMIT se toma desde el entorno
memory_limit = ${PHP_MEMORY_LIMIT}
; Si PHP_MAX_EXECUTION_TIME no está definido, tomará el valor de repliegue 30.
max_execution_time = ${PHP_MAX_EXECUTION_TIME:-30}

Las directivas php.ini están directamente documentadas, por extensiones,
en las páginas respectivas del manual de estas extensiones. La
[lista de directivas internas](#ini) está disponible
en el anexo. Es probable que no todas las directivas PHP estén documentadas
en el manual. Para una lista completa de las directivas disponibles en su versión de PHP,
lea los comentarios de su propio fichero php.ini.
También se puede encontrar la
[» última versión del php.ini](https://github.com/php/php-src/blob/master/php.ini-production)
en Git.

    **Ejemplo #2 Extracto del php.ini**

; todo texto en una línea, situado después de un punto y coma ";" es ignorado
[php] ; los marcadores de sección (texto entre corchetes) también son ignorados
; Los valores booleanos pueden ser especificados así :
; true, on, yes
; o false, off, no, none
register_globals = off
track_errors = yes

; se pueden colocar las cadenas de caracteres entre comillas
include_path = ".:/usr/local/lib/php"

; Las barras invertidas se tratan como cualquier carácter
include_path = ".;c:\php\lib"

Es posible referirse a variables .ini
desde ficheros .ini. Por ejemplo : open_basedir = ${open_basedir}
":/new/dir".

### Leer un directorio

    Es posible configurar PHP para leer los ficheros .ini presentes en un directorio.
    después de la lectura de php.ini. Esto se ajusta durante la compilación con el argumento
    **--with-config-file-scan-dir**.
    El directorio a leer puede ser modificado durante la ejecución
    por la definición de la variable de entorno PHP_INI_SCAN_DIR.





    Es posible leer varios directorios separándolos con un
    separador de ruta específico de la plataforma (; para Windows, NetWare
    y RISC OS; : para todas las otras plataformas; el valor utilizado por PHP es
    disponible en la constante **[PATH_SEPARATOR](#constant.path-separator)**).
    Si se proporciona un directorio vacío en
    PHP_INI_SCAN_DIR, PHP
    también leerá el directorio proporcionado durante la compilación a través de
    **--with-config-file-scan-dir**.





    En cada directorio, PHP leerá todos los ficheros que terminen por
    .ini en orden alfabético. Una lista de los ficheros que
    han sido cargados y en qué orden está disponible llamando a la función
    [php_ini_scanned_files()](#function.php-ini-scanned-files), o ejecutando PHP con la opción
    **--ini**.

Suponiendo que PHP está configurado con --with-config-file-scan-dir=/etc/php.d,
y que el separador de ruta es :...

$ php
PHP cargará todos los ficheros presentes en /etc/php.d/\*.ini como fichero
de configuración.

$ PHP_INI_SCAN_DIR=/usr/local/etc/php.d php
PHP cargará todos los ficheros presentes en /usr/local/etc/php.d/\*.ini
como fichero de configuración.

$ PHP_INI_SCAN_DIR=:/usr/local/etc/php.d php
PHP cargará todos los ficheros presentes en /etc/php.d/_.ini, luego
/usr/local/etc/php.d/_.ini como fichero de configuración.

$ PHP_INI_SCAN_DIR=/usr/local/etc/php.d: php
PHP cargará todos los ficheros presentes en /usr/local/etc/php.d/_.ini, luego en
/etc/php.d/_.ini como fichero de configuración.

## Ficheros .user.ini

PHP incluye el soporte para ficheros INI de configuración
por directorio. Estos ficheros son analizados _solo_
por el SAPI CGI/FastCGI. Esta funcionalidad hace obsoleta la extensión PECL
htscanner. Si se ejecuta PHP como módulo Apache,
el uso de los ficheros .htaccess produce el mismo efecto.

Además del fichero php.ini principal, PHP analiza los ficheros INI
contenidos en cada directorio, comenzando por el directorio desde el cual
el fichero PHP actual es llamado, y recorre los directorios hasta el
directorio raíz actual (tal como se define por la variable
[$\_SERVER['DOCUMENT_ROOT']](#reserved.variables.server)). En el caso de que el fichero PHP
esté fuera de la raíz web, solo su directorio será escaneado.

Solo las configuraciones INI con los modos **[INI_PERDIR](#constant.ini-perdir)**
y **[INI_USER](#constant.ini-user)** serán reconocidas en los ficheros INI
.user.ini-style.

Dos nuevas directivas INI,
[user_ini.filename](#ini.user-ini.filename) y
[user_ini.cache_ttl](#ini.user-ini.cache-ttl)

controlan el uso de los ficheros INI definidos por el usuario.

[user_ini.filename](#ini.user-ini.filename) define el nombre del fichero buscado
por PHP en cada directorio ; si esta directiva está definida a una cadena vacía,
PHP no analizará nada en absoluto. Por defecto, vale .user.ini.

[user_ini.cache_ttl](#ini.user-ini.cache-ttl) controla la duración entre 2 relecturas
de los ficheros INI definidos por el usuario. Por defecto, vale
300 segundos (5 minutos).

## Dónde una directiva de configuración puede ser modificada

Estos modos determinan cuándo y dónde una directiva PHP puede o no puede
ser modificada, y cada directiva del manual está dirigida por uno de estos modos.
Por ejemplo, algunas directivas pueden ser modificadas en un script PHP
con la función [ini_set()](#function.ini-set), mientras que otras necesitan
ser modificadas en los ficheros php.ini o httpd.conf.

Por ejemplo, la directiva
[output_buffering](#ini.output-buffering) tiene el modo
**[INI_PERDIR](#constant.ini-perdir)** por lo que no puede ser modificada
con la función [ini_set()](#function.ini-set). Por otro lado, la directiva
[display_errors](#ini.display-errors) tiene el modo
**[INI_ALL](#constant.ini-all)**, y puede ser modificada en cualquier lugar,
incluyendo con la función [ini_set()](#function.ini-set).

    **Constantes de modo INI**


      **[INI_USER](#constant.ini-user)**
      ([int](#language.types.integer))



       La entrada puede ser definida en scripts de usuario (como con [ini_set()](#function.ini-set))
       o en el [registro Windows](#configuration.changes.windows).
       La entrada puede ser definida en .user.ini





      **[INI_PERDIR](#constant.ini-perdir)**
      ([int](#language.types.integer))



       La entrada puede ser definida en php.ini, .htaccess, httpd.conf o .user.ini





      **[INI_SYSTEM](#constant.ini-system)**
      ([int](#language.types.integer))



       La entrada puede ser definida en php.ini o httpd.conf





      **[INI_ALL](#constant.ini-all)**
      ([int](#language.types.integer))



       La entrada puede ser definida en cualquier lugar



## Cómo modificar la configuración

### Ejecutar PHP como módulo Apache

    Cuando se utiliza el módulo Apache, también se pueden cambiar
    los parámetros de configuración utilizando las directivas
    en los ficheros de configuración de Apache (httpd.conf) y en
    los ficheros .htaccess. Se necesitarán los privilegios
    "AllowOverride Options" o "AllowOverride All".





    Hay muchas directivas
    Apache que permiten modificar la configuración de PHP
    desde los ficheros de configuración de Apache. Para una lista de las
    directivas que son **[INI_ALL](#constant.ini-all)**,
    **[INI_PERDIR](#constant.ini-perdir)** o **[INI_SYSTEM](#constant.ini-system)**
    consulte el anexo [Lista de directivas
    del php.ini](#ini.list).










       php_value
       nombre
       valor



        Modifica el valor de la directiva especificada.
        Esta instrucción solo es utilizable con las directivas PHP de tipo
        **[INI_ALL](#constant.ini-all)** y **[INI_PERDIR](#constant.ini-perdir)**.
        Para anular un valor que hubiera sido modificado previamente,
        utilice el valor none.



       **Nota**:

         No utilice php_value
         para configurar valores booleanos.
         php_flag (ver más abajo)
         debe ser utilizada.








       php_flag
       nombre
       on|off



        Esta instrucción se utiliza para activar o
        desactivar una opción.
        Esta instrucción solo es utilizable con las directivas
        PHP de tipo **[INI_ALL](#constant.ini-all)** y
        **[INI_PERDIR](#constant.ini-perdir)**.







       php_admin_value
       nombre
       valor



        Esta instrucción asigna un valor a la variable especificada.
        Esta instrucción *NO puede ser utilizada* en un fichero
        .htaccess. Cualquier directiva de PHP configurada con el tipo
        php_admin_value no puede ser
        modificada utilizando el fichero .htaccess o la función [ini_set()](#function.ini-set).
        Para anular un valor que hubiera sido modificado previamente, utilice la
        valor none.







       php_admin_flag
       name
       on|off



        Esta directiva se utiliza para activar o desactivar una opción.
        Esta instrucción *NO puede ser utilizada* en un fichero
        .htaccess. Cualquier directiva de PHP configurada con el tipo
        php_admin_flag no puede ser
        modificada utilizando el fichero .htaccess o por la función [ini_set()](#function.ini-set).











     **Ejemplo #1 Ejemplo de configuración Apache**




&lt;IfModule mod_php5.c&gt;
php_value include_path ".:/usr/local/lib/php"
php_admin_flag engine on
&lt;/IfModule&gt;
&lt;IfModule mod_php4.c&gt;
php_value include_path ".:/usr/local/lib/php"
php_admin_flag engine on
&lt;/IfModule&gt;

**Precaución**

     Las constantes PHP no existen fuera de PHP. Por
     ejemplo, en el fichero httpd.conf,
     no se pueden utilizar constantes PHP como
     **[E_ALL](#constant.e-all)** o **[E_NOTICE](#constant.e-notice)** para especificar
     el nivel de [informe de errores](#ini.error-reporting),
     ya que estas constantes no tienen significado para Apache,
     y serán reemplazadas por *0*.
     Utilice los valores numéricos en su lugar.
     Las constantes pueden ser utilizadas en el php.ini

### Modificar la configuración de PHP a través del registro de Windows

    Cuando se utiliza PHP en Windows, la configuración puede
    ser modificada directorio por directorio utilizando el registro de Windows. Los valores de configuración se almacenan
    con la clave de registro
    HKLM\SOFTWARE\PHP\Per Directory Values,
    en las subclaves correspondientes a los nombres de directorio. Por ejemplo,
    el valor de una opción en el directorio c:\inetpub\wwwroot
    se almacenará en la clave
    HKLM\SOFTWARE\PHP\Per Directory Values\c\inetpub\wwwroot.
    El valor de esta opción será utilizado para todos los
    scripts que funcionen en este directorio o sus subdirectorios.
    Los valores bajo la clave deben tener el nombre de una
    dirección de configuración PHP,
    y el valor correspondiente. Las constantes PHP no son utilizables : hay que poner el valor entero.
    Sin embargo, solo los valores de las configuraciones en
    **[INI_USER](#constant.ini-user)** pueden ser fijados de esta manera,
    los de **[INI_PERDIR](#constant.ini-perdir)** no pueden serlo,
    ya que estos valores de configuración son releídos en cada solicitud.

### Otras interfaces de configuración de PHP

    Según la forma en que se ejecute PHP, se pueden cambiar algunos valores
    durante la ejecución de los scripts utilizando [ini_set()](#function.ini-set).
    Consulte la documentación de la función [ini_set()](#function.ini-set) para más
    información.




    Si está interesado en una lista completa de las opciones configuradas
    en su sistema con sus valores actuales, puede ejecutar
    la función [phpinfo()](#function.phpinfo) y consultar la página resultante.
    También se puede acceder individualmente a las directivas de configuración
    durante la ejecución de los scripts utilizando la función
    [ini_get()](#function.ini-get) o la función [get_cfg_var()](#function.get-cfg-var).

- [Consideraciones generales sobre la instalación](#install.general)
- [Instalación en sistemas Unix](#install.unix)<li>[Instalación desde paquetes en Debian GNU/Linux y distribuciones similares](#install.unix.debian)
- [Instalación a partir de paquetes en distribuciones GNU/Linux que utilizan DNF](#install.unix.dnf)
- [Instalación desde paquetes o puertos en OpenBSD](#install.unix.openbsd)
- [Instalación desde las fuentes en sistemas Unix y macOS](#install.unix.source)
- [CGI y configuraciones de línea de comandos](#install.unix.commandline)
- [Apache 2.x en sistemas Unix](#install.unix.apache2)
- [Nginx 1.4.x en sistemas Unix](#install.unix.nginx)
- [Lighttpd 1.4 en sistemas Unix](#install.unix.lighttpd-14)
- [Servidor Web LiteSpeed/Servidor Web OpenLiteSpeed en sistemas Unix](#install.unix.litespeed)
- [Instalación en Solaris](#install.unix.solaris)
  </li>- [Instalación en un sistema macOS](#install.macosx)<li>[Instalación en macOS utilizando paquetes de terceros](#install.macosx.packages)
- [Compilar PHP en macOS](#install.macosx.compile)
- [Uso de PHP integrado anterior a macOS Monterey](#install.macosx.bundled)
  </li>- [Instalación en sistemas Windows](#install.windows)<li>[Configuración recomendada en sistemas Windows](#install.windows.recommended)
- [Instalación manual de los binarios precompilados](#install.windows.manual)
- [Apache 2.x en Microsoft Windows](#install.windows.apache2)
- [Instalación con IIS para Windows](#install.windows.iis)
- [Herramientas de terceros para la instalación de PHP](#install.windows.tools)
- [Construir a partir de las fuentes](#install.windows.building)
- [Ejecución de PHP en línea de comandos en sistemas Windows](#install.windows.commandline)
  </li>- [Instalación en las plataformas de Nube Informática](#install.cloud)<li>[Azure App services](#install.cloud.azure)
- [Amazon EC2](#install.cloud.ec2)
- [DigitalOcean](#install.cloud.digitalocean)
  </li>- [FastCGI Process Manager (FPM)](#install.fpm)<li>[Instalación](#install.fpm.install)
- [Configuración](#install.fpm.configuration)
  </li>- [Instalación de extensiones PECL](#install.pecl)<li>[Introducción a las instalaciones PECL](#install.pecl.intro)
- [Descarga de extensiones PECL](#install.pecl.downloads)
- [Instalación de una extensión PHP en Windows](#install.pecl.windows)
- [Compilación de extensiones PECL compartidas con el comando pecl](#install.pecl.pear)
- [Compilación de extensiones PECL compartidas con phpize](#install.pecl.phpize)
- [php-config](#install.pecl.php-config)
- [Compilación de extensiones PECL estáticamente en PHP](#install.pecl.static)
  </li>- [Introducción a Composer](#install.composer.intro)
- [Introducción a PIE](#install.pie.intro)
- [Configuración en tiempo de ejecución](#configuration)<li>[El fichero de configuración](#configuration.file)
- [Ficheros .user.ini](#configuration.file.per-user)
- [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes)
- [Cómo modificar la configuración](#configuration.changes)
  </li>
