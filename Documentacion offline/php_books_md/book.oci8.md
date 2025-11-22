# Oracle OCI8

# Introducción

**Advertencia**

    Esta extensión está *SEPARADA* a partir de PHP 8.4.0.

Estas funciones permiten acceder a las bases de datos Oracle.
Soportan las comandos SQL y PL/SQL. Las funciones básicas
incluyen el control de transacción, la ligadura de variables PHP con contenedores Oracle,
el soporte de los tipos de grandes objetos (LOB) y de las colecciones.
Las funciones de extensibilidad de Oracle, tales como Database
Resident Connection Pooling (DRCP) y el caché de resultados también
son soportadas.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#oci8.requirements)
- [Instalación](#oci8.installation)
- [Pruebas](#oci8.test)
- [Configuración en tiempo de ejecución](#oci8.configuration)

    ## Requerimientos

    OCI8 3.0 está incluida con PHP 8. También está disponible desde
    [» PECL](https://pecl.php.net/). Para PHP 7, utilice OCI8 2.2 desde [» PECL](https://pecl.php.net/).
    OCI8 requiere Oracle 10*g*
    o bibliotecas cliente posteriores.

    Si la base de datos Oracle está en la misma máquina que PHP, el software
    de base de datos ya contiene las bibliotecas y encabezados necesarios.
    Cuando PHP está en una máquina diferente, utilice las bibliotecas gratuitas
    [» Oracle Instant Client](https://www.oracle.com/database/technologies/instant-client.html).

    Para utilizar Oracle Instant Client, instale el archivo
    comprimido ZIP Basic o Basic Light de
    Oracle Instant Client, el paquete RPM, o el paquete DMG.
    Al compilar OCI8 desde el código fuente, instale también el
    SDK de Instant Client.

    Debe ejecutar PHP con la misma versión o una versión más reciente de las
    bibliotecas cliente de Oracle utilizadas para construir OCI8.

    **Nota**:

    La interoperabilidad estándar de red cliente-servidor de Oracle permite
    conexiones entre diferentes versiones de Oracle Client y Oracle Database.
    Para configuraciones certificadas, consulte la documentación Oracle Support
    ID ID 207303.1. En resumen, Oracle Client 19, 18 y 12.2 pueden conectarse a
    Oracle Database 11.2 o superior. Oracle Client 12.1 puede conectarse a Oracle
    Database 10.2 o superior. Oracle Client 11.2 puede conectarse a Oracle
    Database 9.2 o superior.

    **Nota**:

    El soporte de todas las funcionalidades de OCI8 solo está disponible
    al utilizar las versiones más recientes de las bibliotecas cliente de Oracle
    así como la base de datos más reciente.

## Instalación

## Configuración de PHP con OCI8

Revísese la sección anterior sobre los
[Requisitos previos](#oci8.requirements) antes de configurar OCI8.

Antes de iniciar el servidor web, OCI8, típicamente, requiere varias
variables de entorno (ver a continuación) para localizar las bibliotecas,
para apuntar a archivos de configuración, y para definir algunas
propiedades básicas como el juego de caracteres utilizado por las bibliotecas
OCI8. Las variables deben ser definidas _antes_ del inicio
de cualquier proceso PHP.

El binario PHP debe ser enlazado con las mismas (o versiones más recientes)
de las bibliotecas Oracle para las cuales ha sido configurado. Por ejemplo,
si se compila OCI8 con las bibliotecas Oracle 19, entonces PHP
también debe ser desplegado y ejecutado con las bibliotecas Oracle 19.
Las aplicaciones PHP pueden conectarse a otras versiones de bases
de datos Oracle, sabiendo que Oracle contiene compatibilidades de versiones
de los diferentes clientes - servidores.

## Instalación de OCI8 desde PECL utilizando el comando pecl

La extensión OCI8 puede ser añadida a una instalación PHP existente utilizando
el repositorio [» PECL](https://pecl.php.net/package/oci8).

    -

      Si se encuentra detrás de un firewall, defínase el proxy de PEAR, por ejemplo:









pear config-set http_proxy http://my-proxy.example.com:80/

    -

      Ejecútese:









pecl install oci8

      Para PHP 7, utilícese pecl install oci8-2.2.0.





    -

      Cuando se le solicite, introdúzcase el valor de $ORACLE_HOME o
      instantclient,/ruta/al/directorio/instant/client/lib.




      Nota: No se introduzcan nombres de variables como $ORACLE_HOME
      o $HOME ya que pecl no los
      expandirá. En su lugar, introdúzcase una ruta expandida, por ejemplo /opt/oracle/product/19c/dbhome_1
      o instantclient,/Users/monnom/Descargas/instantclient_19_8.





    -

      Si se obtiene un error oci8_dtrace_gen.h: No existe el archivo o
      directorio, esto significa que PHP ha sido compilado
      con [DTrace Dynamic Tracing](#features.dtrace) activado.
      Instálese utilizando el comando:









$ export PHP_DTRACE=yes
$ pecl install oci8

- Modifíquese el archivo php.ini y añádase la línea:

extension=oci8.so

      Asegúrese de que la directiva php.ini
      [extension_dir](#ini.extension-dir) está
      definida en el directorio en el cual oci8.so ha sido instalado.


## Instalación de OCI8 desde PECL utilizando phpize

Para instalar OCI8 en una instalación PHP existente cuando
el comando pecl no está disponible, descárguese manualmente
el paquete OCI8 [» PECL](https://pecl.php.net/package/oci8),
por ejemplo oci8-3.0.0.tgz.

    -

      Extraer el paquete:









tar -zxf oci8-3.0.0.tgz
cd oci8-3.0.0

    -

      Preparar el paquete:









phpize

    -

      Configurar el paquete utilizando $ORACLE_HOME o Instant Client.









./configure -with-oci8=shared,$ORACLE_HOME

     o









./configure -with-oci8=shared,instantclient,/ruta/a/instant/client/lib

    -

      Instalar el paquete:









make install

     -

       Si se obtiene un error oci8_dtrace_gen.h: No existe el archivo o
       directorio, esto significa que PHP ha sido compilado
       con [DTrace Dynamic Tracing](#features.dtrace) activado.
       Ejecútese nuevamente los comandos configure y make
       después de haber definido esta variable de entorno:









$ export PHP_DTRACE=yes

     -

       Modifíquese el archivo php.ini y añádase la línea:









extension=oci8.so

      Asegúrese de que la directiva php.ini
      [extension_dir](#ini.extension-dir) está
      configurada en el directorio en el cual oci8.so
      ha sido instalado.


## Instalación de OCI8 como extensión compartida durante la compilación de PHP

Si se compila PHP a partir del código fuente, la opción de configuración shared puede ser utilizada para construir OCI8 como una biblioteca compartida que puede ser cargada dinámicamente en PHP. La construcción de una extensión compartida permite a OCI8 ser fácilmente actualizado sin afectar al resto de PHP.

Configúrese OCI8 utilizando una de las siguientes opciones de configuración.

    -

      Si se utilizan las bibliotecas gratuitas [» Oracle Instant
      Client](https://www.oracle.com/database/technologies/instant-client.html), hágase lo siguiente:









./configure --with-oci8=shared,instantclient,/ruta/a/instant/client/lib

      Si Instant Client 12.2 (o una versión anterior) está instalado a partir de archivos ZIP, asegúrese de crear
      primero el enlace simbólico a la biblioteca, por ejemplo ln -s
      libclntsh.so.12.1 libclntsh.so.




      Si se utiliza una instalación basada en RPM de Oracle Instant Client,
      la línea de configuración se verá así:









./configure --with-oci8=shared,instantclient,/usr/lib/oracle/&lt;version&gt;/client/lib

     Por ejemplo, **--with-oci8=shared,instantclient,/usr/lib/oracle/19.9/client/lib**





    -

      Si se utiliza una base de datos Oracle o una instalación completa de Oracle Client, procedase de la siguiente manera:









./configure --with-oci8=shared,$ORACLE_HOME

      Asegúrese de que el usuario del servidor web (nobody, www) tiene acceso a las
      bibliotecas, a los archivos de inicialización
      y al archivo tnsnames.ora (si se utiliza) bajo
      el directorio $ORACLE_HOME. Con Oracle
      10*g*R2, puede que sea necesario ejecutar
      la utilidad $ORACLE_HOME/install/changePerm.sh
      para dar acceso al directorio.

Después de la configuración, sigase el procedimiento habitual de compilación de PHP,
por ejemplo _make install_. La extensión compartida OCI8 oci8.so
será creada. Puede ser necesario moverla manualmente al directorio de extensiones PHP, especificado por
la opción [extension_dir](#ini.extension-dir) en su
archivo php.ini.

Para completar la instalación de OCI8, modifíquese el archivo php.ini y añádase la línea:

extension=oci8.so

## Instalación de OCI8 como extensión compilada estáticamente durante la compilación de PHP

Si se compila PHP a partir del código fuente, puede configurarse PHP para incluir
OCI8 como una extensión estática utilizando una de las siguientes opciones de configuración.

- Si se utiliza Oracle Instant Client, hágase lo siguiente:

./configure --with-oci8=instantclient,/ruta/a/instant/client/lib

    -

      Si se utiliza una base de datos Oracle o una instalación completa del cliente Oracle, hágase lo siguiente:









./configure --with-oci8=$ORACLE_HOME

Después de la configuración, sigase el procedimiento habitual
de construcción de PHP, por ejemplo _make install_. Después de una compilación
exitosa, no es necesario añadir oci8.so a
su php.ini. No se requiere ningún paso adicional de construcción.

## Instalación de OCI8 bajo Windows

La biblioteca OCI8 puede ser añadida a una instalación existente de PHP utilizando
las DLL del repositorio [» PECL](https://pecl.php.net/package/oci8) o las bibliotecas situadas en el directorio
ext de su instalación PHP.

Con las bibliotecas Oracle 12*c* (o posteriores), descoméntese una de las
siguientes líneas en su archivo php.ini extension=php_oci8_12c.dll
o extension=php_oci8_11g.dll, o bien
extension=php_oci8.dll. Solo una de estas DLLs debe
estar activa al mismo tiempo. Las DLLs con versiones superiores pueden
contener más funcionalidades. Todas las DLLs pueden no estar disponibles
para todas las versiones de PHP. Asegúrese de que la opción
[extension_dir](#ini.extension-dir) está definida en la carpeta
que contiene las extensiones DLL de PHP.

Si se utiliza el cliente Oracle Instant, defínase la variable
de entorno PATH del sistema a la carpeta que contiene las
bibliotecas Oracle.

## Definición del entorno Oracle

Antes de utilizar esta extensión, asegúrese de que las variables de entorno
Oracle están correctamente definidas para el usuario que ejecuta el servidor Web.
Si su servidor Web se inicia automáticamente al arrancar el servidor,
entonces asegúrese también de la correcta configuración de la variable
de entorno utilizada en ese momento.

**Nota**:

    No se definan las variables de entorno Oracle utilizando la función
    [putenv()](#function.putenv) en sus scripts PHP, ya que las bibliotecas
    Oracle son cargadas e inicializadas antes de la ejecución de su script.
    Las variables definidas con [putenv()](#function.putenv) podrían
    entrar en conflicto y provocar tanto fallos como comportamientos totalmente inesperados. Algunas funciones pueden reaccionar
    normalmente, otras pueden provocar errores. Las variables
    deben ser definidas *antes* del inicio del
    servidor.

En los sistemas Red Hat Linux y sus variantes, debe exportarse
las variables al final del archivo /etc/sysconfig/httpd.
En otros sistemas que utilicen Apache 2, debe utilizarse el
script envvars que se encontrará en el directorio
bin de Apache. Otra opción consiste en utilizar
la directiva SetEnv del archivo
httpd.conf, pero esto puede no ser suficiente
en algunos sistemas.

Para verificar si las variables de entorno han sido definidas
correctamente, utilícese la función [phpinfo()](#function.phpinfo)
y prestese atención a la sección _Environment_
(y no a la sección _Apache Environment_);
debe contener todas las variables definidas.

Las variables que se necesitan están
incluidas en la tabla siguiente. Consúltese la documentación Oracle
para más información sobre todas las variables.

    <caption>**Variables de entorno Oracle comunes**</caption>



       Nombre
       Propósito






       ORACLE_HOME

        Ruta al directorio que contiene el software de base de datos
        Oracle. No se defina esta variable si se utiliza el cliente
        Oracle Instant. De hecho, no es necesaria pero puede causar
        problemas durante la instalación.




       ORACLE_SID

        El nombre de la base de datos en la máquina local. No es
        necesario definirla si se utiliza el cliente Oracle Instant,
        o entonces, pasarla siempre como argumento de conexión a la
        función [oci_connect()](#function.oci-connect).



       LD_LIBRARY_PATH

        Defínase esta variable (o su equivalente en la plataforma
        actual, como LIBPATH,
        o SHLIB_PATH)
        como la ruta a las bibliotecas Oracle, por ejemplo
        $ORACLE_HOME/lib o
        /usr/lib/oracle/19/client/lib.
        Esta variable no es necesaria si las bibliotecas
        son localizadas por un mecanismo de búsqueda diferente, como
        con ldconfig o
        con LD_PRELOAD en lugar
        de LD_LIBRARY_PATH.




       NLS_LANG

        Es la variable principal para definir el
        juego de caracteres y las informaciones de globalización
        utilizadas por las bibliotecas Oracle.




       ORA_SDTZ

        Define el desplazamiento horario a utilizar por las sesiones Oracle.




       TNS_ADMIN

        Ruta al directorio que contiene los archivos de configuración
        Oracle Net Services (tnsnames.ora
        y sqlnet.ora). Innecesario si la cadena
        de conexión utilizada por la función
        [oci_connect()](#function.oci-connect) está en formato de conexión fácil
        como localhost/XE. También innecesario si los
        archivos de configuración de red están en ubicaciones por defecto como /usr/lib/oracle/VERSION/client/lib/network/admin, $ORACLE_HOME/network/admin
        o /etc.





Existen otras variables de entorno Oracle menos frecuentemente
utilizadas, como TWO*TASK,
ORA_TZFILE, así como las diversas variables
de globalización como NLS\* y
ORA_NLS*\*.

## En caso de problemas

El problema más común durante la instalación de OCI8 es
haber configurado incorrectamente el juego de variables de entorno.
Es un problema típico cuando se recibe un mensaje
de error al utilizar las funciones
[oci_connect()](#function.oci-connect) o [oci_pconnect()](#function.oci-pconnect).
El error puede ser un error puramente PHP como _Llamada a la función
no definida oci_connect()_, un error Oracle como ORA-12705 o
incluso un fallo brusco de Apache. Verifíquese el contenido de los archivos de
registro de Apache durante su inicio y refiérase a las secciones
anteriores para resolver el problema.

Mientras que los errores de red como ORA-12154 o ORA-12514 indican
un problema de nombramiento de red o un problema de configuración,
muy a menudo, la causa principal es que el entorno PHP no está
correctamente definido y que las bibliotecas Oracle son incapaces
de encontrar el archivo de configuración tnsnames.ora.

En Windows, tener varias versiones de Oracle en la misma
máquina puede hacer que la instalación falle fácilmente a menos que se
asegure de que PHP no está utilizando únicamente la versión correcta de Oracle.

Una utilidad que permite examinar las bibliotecas buscadas
y cargadas puede ayudar a resolver este tipo
de problema, especialmente en Windows.

**Nota**:
**Si el servidor Web no arranca o falla al inicio**

    Verifíquese que Apache está enlazado con la biblioteca pthread:









# ldd /www/apache/bin/httpd

libpthread.so.0 =&gt; /lib/libpthread.so.0 (0x4001c000)
libm.so.6 =&gt; /lib/libm.so.6 (0x4002f000)
libcrypt.so.1 =&gt; /lib/libcrypt.so.1 (0x4004c000)
libdl.so.2 =&gt; /lib/libdl.so.2 (0x4007a000)
libc.so.6 =&gt; /lib/libc.so.6 (0x4007e000)
/lib/ld-linux.so.2 =&gt; /lib/ld-linux.so.2 (0x40000000)

    Si la biblioteca libpthread no está listada, reinstálese Apache:









# cd /usr/src/apache_1.3.xx

# make clean

# LIBS=-lpthread ./config.status

# make

# make install

    Tenga en cuenta que en sistemas como UnixWare, la biblioteca se llama
    libthread en lugar de libpthread. PHP y Apache deben ser configurados
    con EXTRA_LIBS=-lthread.

## Pruebas

El conjunto de pruebas de OCI8 está en el directorio ext/oci8/tests.
Después de ejecutar las pruebas de OCI8, este directorio también contendrá los registros
de cualquier fallo.

Antes de ejecutar las pruebas de PHP, edite details.inc
y establezca $user, $password y la cadena de conexión $dbase. El
conjunto de pruebas de OCI8 ha sido desarrollado usando
la cuenta SYSTEM. Algunas pruebas fallarán si
el usuario de las mismas no tiene permisos equivalentes.

Si se está comprobando Oracle Database Resident Connection Pooling,
establezca $test_drcp a **[true](#constant.true)** y asegúrese de que
la cadena de conexión utiliza un servidor de la agrupación DRCP apropiado.

Una alternativa a editar details.inc es el
establecimiento de variables de entorno, por ejemplo:

    $ export PHP_OCI8_TEST_USER=system
    $ export PHP_OCI8_TEST_PASS=oracle
    $ export PHP_OCI8_TEST_DB=localhost/XE
    $ export PHP_OCI8_TEST_DRCP=FALSE

Observe que en algunas shell, estas variables no se propagan correctamente
por proceso de PHP y que las pruebas fallarán al conectar si se utiliza
este método.

Lo siguiente es establecer cualquier entorno necesario para la base de datos de Oracle.
Con Oracle 10*g*R2 XE, haga lo siguiente:

    $ . /usr/lib/oracle/xe/app/oracle/product/10.2.0/server/bin/oracle_env.sh

Con Oracle 11*g*R2 XE:

    $ . /u01/app/oracle/product/11.2.0/xe/bin/oracle_env.sh

Para otras versiones de la base de datos de Oracle, haga:

    $ . /usr/local/bin/oraenv

Algunas shells requieren que php.ini contenga E en el
parámetro variables_order, por ejemplo:

    variables_order = "EGPCS"

Ejecute todas las pruebas de PHP con:

    $ cd your_php_src_directory
    $ make test

o ejecute únicamente las pruebas de OCI8 con

    $ cd your_php_src_directory
    $ make test TESTS=ext/oci8

Cuando hayan finalizado las pruebas, revise cualquier fallo. En sistemas
lentos, algunas pruebas podrían tomar más tiempo que el tiempo de espera de prueba
predeterminado de run-tests.php. Para corregir esto,
establezca la variable de entorno TEST_TIMEOUT a
un número mayor de segundos.

En máquinas rápidas con una base de datos local configurada para una carga ligera
(p.ej. Oracle 11*g*R2 XE), algunas pruebas podrían ocasionar los errores
ORA-12516 u ORA-12520. Para evitarlo, aumente el parámetro PROCESSES
de la base de datos siguiendo estos pasos:

Conéctese como propietario del software de Oracle:

    $ su - oracle

Establezca el entorno de Oracle necesario con oracle_env.sh u
oraenv, tal como está descrito arriba.

Inicie la herramienta de línea de comandos SQL\*Plus y
aumente PROCESSES

    $ sqlplus / as sysdba
    SQL&gt; alter system set processes=100 scope=spfile

Reinicie la base de datos:

    SQL&gt; startup force

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración OCI8**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [oci8.connection_class](#ini.oci8.connection-class)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [oci8.default_prefetch](#ini.oci8.default-prefetch)
      "100"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.events](#ini.oci8.events)
      Off
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.max_persistent](#ini.oci8.max-persistent)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.old_oci_close_semantics](#ini.oci8.old-oci-close-semantics)
      Off
      **[INI_SYSTEM](#constant.ini-system)**
      Deprecado a partir de PHP 8.1.0.



      [oci8.persistent_timeout](#ini.oci8.persistent-timeout)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.ping_interval](#ini.oci8.ping-interval)
      "60"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.prefetch_lob_size](#ini.oci8.prefetch-lob-size)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PECL OCI8 3.2.



      [oci8.privileged_connect](#ini.oci8.privileged-connect)
      Off
      **[INI_SYSTEM](#constant.ini-system)**
       



      [oci8.statement_cache_size](#ini.oci8.statement-cache-size)
      "20"
      **[INI_SYSTEM](#constant.ini-system)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     oci8.connection_class
     [string](#language.types.string)



      El texto definido por el usuario es utilizado por las conexiones del
      pool de conexiones residente de la base de datos Oracle 11*g*
      para particionar el pool. Esto permite a las conexiones persistentes
      OCI8 de una aplicación reutilizar las sesiones a la base de datos
      desde un script anterior, permitiendo así una mejor eficiencia.
      Cuando una aplicación utiliza un proceso de base de datos previamente
      utilizado con una clase de conexión diferente, las configuraciones
      de la sesión, como el formato de fecha por defecto de Oracle,
      serán reinicializadas. Este comportamiento permite evitar compartir
      accidentalmente información entre las diferentes aplicaciones.




      El valor puede ser definido en tiempo de ejecución gracias a la función
      [ini_set()](#function.ini-set), llamada antes de la conexión.




      Para utilizar DRCP, OCI8 debe estar vinculado con las bibliotecas Oracle 11*g*
      y la base de datos debe ser Oracle 11*g*. El pool de conexión debe
      estar activado en la base de datos, la opción de configuración
      oci8.connection_class debe valer la misma cadena
      para todos los servidores web utilizando la misma aplicación, y la cadena
      de conexión OCI8 debe especificar el uso de un servidor con pool.







     oci8.default_prefetch
     [int](#language.types.integer)



      Esta opción define el número por defecto de líneas adicionales
      que serán recuperadas y almacenadas en caché automáticamente cada vez
      que se realice una consulta de bajo nivel recuperando datos desde la base
      de datos. Definir un valor de
      0 permite desactivar esta funcionalidad.




      El valor de pre-carga no altera el número de líneas que funciones como
      [oci_fetch_array()](#function.oci-fetch-array) devolverán al usuario; la pre-carga y
      el almacenamiento en caché de líneas es gestionado internamente por OCI8.




      El valor puede ser definido para cada consulta, ejecutando la función
      [oci_set_prefetch()](#function.oci-set-prefetch) antes de ejecutar la consulta.




      Al utilizar Oracle 12*c* o posterior, el valor de
      pre-carga definido por PHP puede ser sobreescrito por el archivo de
      configuración del cliente Oracle: oraaccess.xml.
      Consulte la documentación de Oracle para más información.



     **Nota**:

       Si se introduce un valor demasiado grande, esto puede conducir a
       una mejora de las prestaciones, a costa
       del uso de memoria. Para consultas que devuelven un gran número de datos,
       la ganancia de rendimiento puede ser realmente significativa.








     oci8.events
     [bool](#language.types.boolean)



      Definir esta opción a On permite a PHP ser
      notificado de los eventos de base de datos FAN (Fast Application
      Notification).




      Sin FAN, cuando una instancia de la base de datos o un nodo de máquinas
      falla bruscamente, las aplicaciones PHP pueden bloquearse esperando
      una respuesta de la base de datos, hasta el final del tiempo de espera TCP.
      Con los eventos FAN, las aplicaciones PHP son notificadas rápidamente
      de los errores que afectan a las conexiones a la base de datos. La extensión
      OCI8 limpiará las conexiones inutilizables en la caché de conexiones persistentes.




      Cuando se utiliza On como valor, la base de datos
      también debe estar configurada para emitir los eventos FAN.




      El soporte de FAN está disponible cuando OCI8 está vinculado a bibliotecas
      Oracle 10*g*R2 (y posteriores) y conectado a una base de datos Oracle
      10*g*R2 (y posteriores).







     oci8.max_persistent
     [int](#language.types.integer)



      El número máximo de conexiones persistentes OCI8 por proceso PHP.
      Definir esta opción a -1 significa que no hay límite.







     oci8.old_oci_close_semantics
     [bool](#language.types.boolean)



      Esta opción controla el comportamiento de la función [oci_close()](#function.oci-close).
      Activar esta opción significa que [oci_close()](#function.oci-close) no hará nada;
      la conexión no será cerrada hasta que finalice el script. Esto es únicamente
      para asegurar la compatibilidad ascendente. Si se piensa que es necesario
      activar esta opción, se *recomienda encarecidamente*
      eliminar las llamadas a la función [oci_close()](#function.oci-close) de la aplicación
      en lugar de activar esta opción.







     oci8.persistent_timeout
     [int](#language.types.integer)



      El tiempo máximo (en segundos) que un proceso PHP dado está autorizado
      a mantener una conexión persistente. Definir esta opción a -1 significa
      que las conexiones persistentes serán siempre mantenidas
      mientras el proceso PHP no termine o la conexión sea explícitamente
      cerrada usando la función [oci_close()](#function.oci-close).



     **Nota**:

       En PHP, la expiración de los recursos persistentes no produce
       ninguna alerta. Ocurre cuando PHP termina un script y
       verifica el timestamp del último uso del recurso.
       Además, las conexiones persistentes solo pueden ser cerradas
       durante alguna actividad (no necesaria en OCI8) en el proceso PHP.
       Si hay más de un proceso PHP, entonces cada uno de ellos
       debe ser activado manualmente
       para iniciar la expiración de sus propios recursos.
       La introducción del pool de conexiones persistentes (DRCP) en
       Oracle 11*g* resuelve los problemas de memoria y recursos, que
       las opciones oci8.max_persistent y
       oci8.persistent_timeout intentaron resolver previamente.








     oci8.ping_interval
     [int](#language.types.integer)



      El tiempo máximo (en segundos) a esperar antes de enviar un ping durante
      [oci_pconnect()](#function.oci-pconnect). Cuando se define a 0, las conexiones
      persistentes serán verificadas en cada reutilización. Para desactivar
      completamente los pings, defina esta opción a -1.



     **Nota**:

       Desactivar los pings hace que las llamadas a [oci_pconnect()](#function.oci-pconnect)
       sean altamente rentables, pero impide a PHP detectar problemas de conexión,
       como problemas de red, o si el servidor Oracle ha sido apagado desde la
       conexión de PHP, hasta que la conexión no sea utilizada más tarde en el script.
       Consulte la documentación de la función
       [oci_pconnect()](#function.oci-pconnect) para más información.








     oci8.prefetch_lob_size
     [int](#language.types.integer)



      Se trata de un parámetro de ajuste que afecta al almacenamiento en memoria
      interna de los datos LOB. Aumentar este valor puede mejorar el rendimiento
      de recuperación de pequeños LOB reduciendo los intercambios entre PHP y la base de datos.
      El uso de la memoria cambiará.




      El valor afecta a los LOB devueltos como instancias OCILob así como a aquellos
      devueltos usando **[OCI_RETURN_LOBS](#constant.oci-return-lobs)**.




      El valor puede ser definido por instrucción
      con [oci_set_prefetch_lob()](#function.oci-set-prefetch-lob) antes de ejecutar la instrucción.



     **Nota**:

       Para usar con Oracle Database 12.2 o posterior.








     oci8.privileged_connect
     [bool](#language.types.boolean)



      Esta opción activa las conexiones privilegiadas utilizando derechos externos
      (**[OCI_SYSOPER](#constant.oci-sysoper)**, **[OCI_SYSDBA](#constant.oci-sysdba)**).



     **Nota**:

       Definir este valor a On
       permite a los scripts del servidor web ejecutando los privilegios de usuario
       del sistema apropiados conectarse a la base de datos utilizando
       estos privilegios, sin necesidad de proporcionar una contraseña a
       la base de datos. Esto puede tener consecuencias en términos de
       seguridad.








     oci8.statement_cache_size
     [int](#language.types.integer)



      Esta opción activa la caché de consultas, y especifica el número de consultas
      a almacenar en caché. Para desactivar la caché de consultas, defina esta
      opción a 0.




      La caché de consultas permite no tener que transmitir
      el texto de la consulta a la base de datos, así como no tener que
      transmitir metadatos sobre la consulta a PHP.
      Esto permite aumentar significativamente el rendimiento del sistema
      en las aplicaciones, reutilizando las consultas durante toda
      la vida de la conexión. Los "cursores" de base de datos
      también pueden ayudar si se parte de la base de que las consultas serán
      reutilizadas.




      Defina este valor al tamaño de su conjunto de consultas comunes
      utilizadas por su aplicación. Definir un valor demasiado pequeño
      puede hacer que sus consultas sean eliminadas de la caché antes de que
      sean utilizadas.




      Esta opción es más utilizada con las conexiones persistentes.




      Con la base de datos Oracle 12*c*, este valor
      puede ser sobreescrito y ajustado automáticamente por el archivo
      oraaccess.xml del cliente Oracle. Consulte la documentación
      de Oracle para más explicaciones.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

  <caption>**Métodos y funciones OCI8**</caption>
  
   
    
     Constante
     Descripción


     **[OCI_ASSOC](#constant.oci-assoc)**

      Utilizado con [oci_fetch_all()](#function.oci-fetch-all) y
      [oci_fetch_array()](#function.oci-fetch-array) para recuperar los resultados
      en un array asociativo.




     **[OCI_BOTH](#constant.oci-both)**

      Utilizado con [oci_fetch_all()](#function.oci-fetch-all) y
      [oci_fetch_array()](#function.oci-fetch-array) para recuperar los resultados
      en un array asociativo e indexado numéricamente.




     **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)**

      Modo de ejecución de comandos para [oci_execute()](#function.oci-execute).
      El comando se valida automáticamente tras el éxito de la consulta.




     **[OCI_CRED_EXT](#constant.oci-cred-ext)**

      Utilizado con [oci_connect()](#function.oci-connect) para la identificación
      en un servidor Oracle externo o en el sistema operativo.




     **[OCI_DEFAULT](#constant.oci-default)**

      Ver la constante **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**.




     **[OCI_DESCRIBE_ONLY](#constant.oci-describe-only)**

      Modo de ejecución de comandos para [oci_execute()](#function.oci-execute).
      Utilícelo si no desea ejecutar el comando, pero obtener descripciones.




     **[OCI_EXACT_FETCH](#constant.oci-exact-fetch)**

      Obsoleto.
      Modo de lectura de resultados. Utilizado cuando las aplicaciones
      conocen de antemano el número de líneas que se necesitarán leer.
      Este modo desactiva la lectura anticipada de Oracle versión 8
      y posteriores. El cursor se anula una vez que se alcanza el número
      de líneas a leer, lo que reduce los recursos consumidos en el servidor.




     **[OCI_FETCHSTATEMENT_BY_COLUMN](#constant.oci-fetchstatement-by-column)**

      Modo por defecto de [oci_fetch_all()](#function.oci-fetch-all).




     **[OCI_FETCHSTATEMENT_BY_ROW](#constant.oci-fetchstatement-by-row)**

      Modo alternativo para [oci_fetch_all()](#function.oci-fetch-all).




     **[OCI_LOB_BUFFER_FREE](#constant.oci-lob-buffer-free)**

      Utilizado con [OCILob::flush](#ocilob.flush) para liberar
      los buffers utilizados.




     **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**

      Modo de ejecución de la consulta para [oci_execute()](#function.oci-execute).
      La transacción no se valida automáticamente al utilizar este modo. Para mayor claridad en su código, utilice este valor en lugar del antiguo valor **[OCI_DEFAULT](#constant.oci-default)**.




     **[OCI_NUM](#constant.oci-num)**

      Utilizado con [oci_fetch_all()](#function.oci-fetch-all) y
      [oci_fetch_array()](#function.oci-fetch-array) para leer un array
      enumerado.




     **[OCI_RETURN_LOBS](#constant.oci-return-lobs)**

      Utilizado con [oci_fetch_array()](#function.oci-fetch-array) para obtener la
      valor del LOB en lugar del puntero.




     **[OCI_RETURN_NULLS](#constant.oci-return-nulls)**

      Utilizado con [oci_fetch_array()](#function.oci-fetch-array) para obtener
      elementos vacíos, si el valor del campo es **[null](#constant.null)**.




     **[OCI_SEEK_CUR](#constant.oci-seek-cur)**

      Utilizado con [OCILob::seek](#ocilob.seek) para definir la posición.




     **[OCI_SEEK_END](#constant.oci-seek-end)**

      Utilizado con [OCILob::seek](#ocilob.seek) para definir la posición.




     **[OCI_SEEK_SET](#constant.oci-seek-set)**

      Utilizado con [OCILob::seek](#ocilob.seek) para definir la posición.




     **[OCI_SYSDATE](#constant.oci-sysdate)**

      Obsoleto.




     **[OCI_SYSDBA](#constant.oci-sysdba)**

      Utilizado con [oci_connect()](#function.oci-connect) para conectarse como SYSDBA
      utilizando credenciales externas ([oci8.privileged_connect](#ini.oci8.privileged-connect)
      debe estar activado para utilizar esta constante).




     **[OCI_SYSOPER](#constant.oci-sysoper)**

      Utilizado con [oci_connect()](#function.oci-connect) para conectarse como SYSOPER
      utilizando credenciales externas ([oci8.privileged_connect](#ini.oci8.privileged-connect)
      debe estar activado para utilizar esta constante).




     **[OCI_TEMP_BLOB](#constant.oci-temp-blob)**

      Utilizado con [OCILob::writeTemporary](#ocilob.writetemporary) para
      indicar explícitamente que debe crearse un BLOB temporal.




     **[OCI_TEMP_CLOB](#constant.oci-temp-clob)**

      Utilizado con [OCILob::writeTemporary](#ocilob.writetemporary) para
      indicar explícitamente que debe crearse un CLOB temporal.


  <caption>**Tipos definidos y vinculados OCI8**</caption>
  
   
    
     Constante
     Descripción


     **[OCI_B_BFILE](#constant.oci-b-bfile)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name) para vincular
      BFILEs.




     **[OCI_B_BIN](#constant.oci-b-bin)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name) para vincular
      valores brutos (RAW).




     **[OCI_B_BLOB](#constant.oci-b-blob)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular BLOB.




     **[OCI_B_BOL](#constant.oci-b-bol)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name) para
      vincular una variable booleana PL/SQL.




     **[OCI_B_CFILEE](#constant.oci-b-cfilee)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular CFILEs.




     **[OCI_B_CLOB](#constant.oci-b-clob)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular CLOB.




     **[OCI_B_CURSOR](#constant.oci-b-cursor)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular cursores, previamente asignados con
      [oci_new_descriptor()](#function.oci-new-descriptor).




     **[OCI_B_INT](#constant.oci-b-int)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name)
      para vincular arrays de enteros.




     **[OCI_B_NTY](#constant.oci-b-nty)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular nombres de tipos de datos.




     **[OCI_B_NUM](#constant.oci-b-num)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de números.




     **[OCI_B_ROWID](#constant.oci-b-rowid)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name)
      para vincular ROWID.




     **[SQLT_AFC](#constant.sqlt-afc)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de CHAR.




     **[SQLT_AVC](#constant.sqlt-avc)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de VARCHAR2.




     **[SQLT_BDOUBLE](#constant.sqlt-bdouble)**

      No soportado.




     **[SQLT_BFILEE](#constant.sqlt-bfilee)**

      Idéntico a **[OCI_B_BFILE](#constant.oci-b-bfile)**.




     **[SQLT_BFLOAT](#constant.sqlt-bfloat)**

      No soportado.




     **[SQLT_BIN](#constant.sqlt-bin)**

      Idéntico a **[OCI_B_BIN](#constant.oci-b-bin)**.




     **[SQLT_BLOB](#constant.sqlt-blob)**

      Idéntico a **[OCI_B_BLOB](#constant.oci-b-blob)**.




     **[SQLT_BOL](#constant.sqlt-bol)**

      Idéntico a **[OCI_B_BOL](#constant.oci-b-bol)**.




     **[SQLT_CFILEE](#constant.sqlt-cfilee)**

      Idéntico a **[OCI_B_CFILEE](#constant.oci-b-cfilee)**.




     **[SQLT_CHR](#constant.sqlt-chr)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de VARCHAR2.
      También utilizado con [oci_bind_by_name()](#function.oci-bind-by-name).




     **[SQLT_CLOB](#constant.sqlt-clob)**

      Idéntico a **[OCI_B_CLOB](#constant.oci-b-clob)**.




     **[SQLT_FLT](#constant.sqlt-flt)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de FLOAT.




     **[SQLT_INT](#constant.sqlt-int)**

      Idéntico a **[OCI_B_INT](#constant.oci-b-int)**.




     **[SQLT_LBI](#constant.sqlt-lbi)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name) para vincular
      valores LONG RAW.




     **[SQLT_LNG](#constant.sqlt-lng)**

      Utilizado con [oci_bind_by_name()](#function.oci-bind-by-name) para vincular valores LONG.




     **[SQLT_LVC](#constant.sqlt-lvc)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para vincular
      arrays de LONG VARCHAR.




     **[SQLT_NTY](#constant.sqlt-nty)**

      Idéntico a **[OCI_B_NTY](#constant.oci-b-nty)**.




     **[SQLT_NUM](#constant.sqlt-num)**

      Idéntico a **[OCI_B_NUM](#constant.oci-b-num)**.




     **[SQLT_ODT](#constant.sqlt-odt)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para
      vincular arrays de LONG.




     **[SQLT_RDD](#constant.sqlt-rdd)**

      Idéntico a **[OCI_B_ROWID](#constant.oci-b-rowid)**.




     **[SQLT_RSET](#constant.sqlt-rset)**

      Idéntico a **[OCI_B_CURSOR](#constant.oci-b-cursor)**.




     **[SQLT_STR](#constant.sqlt-str)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para
      vincular arrays de string.




     **[SQLT_UIN](#constant.sqlt-uin)**

      No soportado.




     **[SQLT_VCS](#constant.sqlt-vcs)**

      Utilizado con [oci_bind_array_by_name()](#function.oci-bind-array-by-name) para
      vincular arrays de VARCHAR.


  <caption>**Tipos de descriptores OCI8**</caption>
  
   
    
     Constante
     Descripción


     **[OCI_DTYPE_FILE](#constant.oci-dtype-file)**

      Esta opción indica a [oci_new_descriptor()](#function.oci-new-descriptor)
      que inicialice un nuevo puntero FILE.




     **[OCI_DTYPE_LOB](#constant.oci-dtype-lob)**

      Esta opción indica a [oci_new_descriptor()](#function.oci-new-descriptor)
      que inicialice un nuevo descriptor LOB.




     **[OCI_DTYPE_ROWID](#constant.oci-dtype-rowid)**

      Esta opción indica a [oci_new_descriptor()](#function.oci-new-descriptor)
      que inicialice un nuevo puntero LOB.




     **[OCI_D_FILE](#constant.oci-d-file)**

      Idéntico a **[OCI_DTYPE_FILE](#constant.oci-dtype-file)**.




     **[OCI_D_LOB](#constant.oci-d-lob)**

      Idéntico a **[OCI_DTYPE_LOB](#constant.oci-dtype-lob)**.




     **[OCI_D_ROWID](#constant.oci-d-rowid)**

      Idéntico a **[OCI_DTYPE_ROWID](#constant.oci-dtype-rowid)**.









        Constantes
        Descripción


**Constantes de OCI8 Transparent Application Failover (TAF)**

    **[OCI_FO_ABORT](#constant.oci-fo-abort)**
    ([int](#language.types.integer))



     El failover ha fallado y no hay posibilidad de reintentar.





    **[OCI_FO_BEGIN](#constant.oci-fo-begin)**
    ([int](#language.types.integer))



     El failover ha detectado una conexión perdida y comienza el failover.





    **[OCI_FO_END](#constant.oci-fo-end)**
    ([int](#language.types.integer))



     El failover ha finalizado con éxito.





    **[OCI_FO_ERROR](#constant.oci-fo-error)**
    ([int](#language.types.integer))



     El failover ha fallado pero permite a la aplicación gestionar el error y devolver **[OCI_FO_RETRY](#constant.oci-fo-retry)** para reintentar el failover.





    **[OCI_FO_NONE](#constant.oci-fo-none)**
    ([int](#language.types.integer))



     El usuario no ha solicitado ningún tipo de failover.





    **[OCI_FO_REAUTH](#constant.oci-fo-reauth)**
    ([int](#language.types.integer))



     Un usuario de Oracle ha sido reautenticado.





    **[OCI_FO_RETRY](#constant.oci-fo-retry)**
    ([int](#language.types.integer))



     El failover debe ser reintentado por Oracle.
     En caso de error durante el failover a una nueva
     conexión, TAF puede reintentar el failover.
     Típicamente, el código de la aplicación debe dormir
     durante un tiempo antes de devolver **[OCI_FO_RETRY](#constant.oci-fo-retry)**.





    **[OCI_FO_SELECT](#constant.oci-fo-select)**
    ([int](#language.types.integer))



     El usuario también ha solicitado el failover SELECT.
     Permite a los usuarios con cursores abiertos continuar utilizándolos tras una caída.





    **[OCI_FO_SESSION](#constant.oci-fo-session)**
    ([int](#language.types.integer))



     El usuario ha solicitado únicamente el failover de sesión.
     Por ejemplo, si la conexión de un usuario se pierde,
     entonces se crea automáticamente una nueva sesión para el usuario en la copia de seguridad.
     Este tipo de failover no intenta recuperar los SELECT.





    **[OCI_FO_TXNAL](#constant.oci-fo-txnal)**
    ([int](#language.types.integer))



     El usuario ha solicitado un failover de transacción.

# Ejemplos

Estos ejemplos utilizan, para conectarse a la base de datos,
el usuario HR que es el esquema
"Human Resources" proporcionado por la
base de datos Oracle. Esta cuenta debe haber sido desbloqueada y
la contraseña reestablecida antes de poder utilizarla.

Estos ejemplos se conectan a la base de datos
XE de su máquina. Modifique la cadena de conexión
para que corresponda a su base de datos antes de ejecutar los
ejemplos de esta documentación.

**Ejemplo #1 Consulta simple**

Este ejemplo muestra la ejecución de una consulta y la visualización de los resultados.
Las consultas OCI8 utilizan las etapas preparación/ejecución/recuperación
de datos.

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Preparación de la consulta
$stid = oci_parse($conn, 'SELECT \* FROM departments');
if (!$stid) {
    $e = oci_error($conn);
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Ejecución de la lógica de la consulta
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Recuperación de los resultados de la consulta
print "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
print "&lt;tr&gt;\n";
foreach ($row as $item) {
        print "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
print "&lt;/tr&gt;\n";
}
print "&lt;/table&gt;\n";

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #2 Inserción de datos utilizando variables ligadas**

Las variables ligadas aumentan el rendimiento permitiendo la reutilización
del caché y el contexto de ejecución. Las variables ligadas aumentan también
la seguridad previniendo muchos casos de inyección SQL.

&lt;?php

// Antes de la ejecución, cree la siguiente tabla:
// CREATE TABLE MYTABLE (mid NUMBER, myd VARCHAR2(20));

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'INSERT INTO MYTABLE (mid, myd) VALUES(:myid, :mydata)');

$id = 60;
$data = 'Some data';

oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $data);

$r = oci_execute($stid); // ejecución y validación

if ($r) {
print "Una fila insertada";
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #3 Ligadura de una cláusula WHERE de una consulta**

Esto muestra la ligadura simple.

&lt;?php

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$sql = 'SELECT last_name FROM employees WHERE department_id = :didbv ORDER BY last_name';
$stid = oci_parse($conn, $sql);
$didbv = 60;
oci_bind_by_name($stid, ':didbv', $didbv);
oci_execute($stid);
while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
echo $row['LAST_NAME'] ."&lt;br&gt;\n";
}

// Muestra:
// Austin
// Ernst
// Hunold
// Lorentz
// Pataballa

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #4 Inserción de datos en una columna CLOB**

Para datos grandes, utilice un objeto binario largo (BLOB)
o un objeto de caracteres largo (CLOB). Este ejemplo utiliza los CLOB.

&lt;?php

// Antes de la ejecución, cree la siguiente tabla:
// CREATE TABLE MYTABLE (mykey NUMBER, myclob CLOB);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$mykey = 12343; // clave arbitraria para el ejemplo

$sql = "INSERT INTO mytable (mykey, myclob)
VALUES (:mykey, EMPTY_CLOB())
RETURNING myclob INTO :myclob";

$stid = oci_parse($conn, $sql);
$clob = oci_new_descriptor($conn, OCI_D_LOB);
oci_bind_by_name($stid, ":mykey", $mykey, 5);
oci_bind_by_name($stid, ":myclob", $clob, -1, OCI_B_CLOB);
oci_execute($stid, OCI_NO_AUTO_COMMIT);
$clob-&gt;save("Una cadena realmente muy larga");

oci_commit($conn);

// Recuperación de datos CLOB

$query = 'SELECT myclob FROM mytable WHERE mykey = :mykey';

$stid = oci_parse ($conn, $query);
oci_bind_by_name($stid, ":mykey", $mykey, 5);
oci_execute($stid);

print '&lt;table border="1"&gt;';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_LOBS)) {
print '&lt;tr&gt;&lt;td&gt;'.$row['MYCLOB'].'&lt;/td&gt;&lt;/tr&gt;';
    // En un bucle, liberar la variable antes de recuperar la
    // segunda línea permite reducir el uso de memoria de PHP
    unset($row);
}
print '&lt;/table&gt;';

?&gt;

**Ejemplo #5 Uso de una función almacenada PL/SQL**

Debe ligar una variable para el valor devuelto y, opcionalmente,
para todos los argumentos de la función PL/SQL.

&lt;?php

/*
Antes de ejecutar el programa PHP, cree una función almacenada
en lenguaje SQL*Plus o SQL Developer:

CREATE OR REPLACE FUNCTION myfunc(p IN NUMBER) RETURN NUMBER AS
BEGIN
RETURN p \* 3;
END;

\*/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$p = 8;

$stid = oci_parse($conn, 'begin :r := myfunc(:p); end;');
oci_bind_by_name($stid, ':p', $p);
oci_bind_by_name($stid, ':r', $r, 40);

oci_execute($stid);

print "$r\n"; // Muestra 24

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #6 Uso de una procedimiento almacenado PL/SQL**

Con los procedimientos almacenados, debe ligar las variables para todos
los argumentos.

&lt;?php

/*
Antes de ejecutar el programa PHP, cree un procedimiento almacenado en
lenguaje SQL*Plus o SQL Developer:

CREATE OR REPLACE PROCEDURE myproc(p1 IN NUMBER, p2 OUT NUMBER) AS
BEGIN
p2 := p1 \* 2;
END;

\*/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$p1 = 8;

$stid = oci_parse($conn, 'begin myproc(:p1, :p2); end;');
oci_bind_by_name($stid, ':p1', $p1);
oci_bind_by_name($stid, ':p2', $p2, 40);

oci_execute($stid);

print "$p2\n"; // muestra 16

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #7 Llamada a una función PL/SQL que devuelve un REF CURSOR**

Cada valor devuelto por la consulta es un REF
CURSOR a utilizar para recuperar los datos.

&lt;?php
/\*
Cree una función almacenada PL/SQL de la siguiente manera:

CREATE OR REPLACE FUNCTION myfunc(p1 IN NUMBER) RETURN SYS_REFCURSOR AS
rc SYS_REFCURSOR;
BEGIN
OPEN rc FOR SELECT city FROM locations WHERE ROWNUM &lt; p1;
RETURN rc;
END;
\*/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT myfunc(5) AS mfrc FROM dual');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC))) {
echo "&lt;tr&gt;\n";
$rc = $row['MFRC'];
    oci_execute($rc); // El valor de la columna devuelto desde la consulta es una referencia de cursor
while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
echo " &lt;td&gt;" . $rc_row['CITY'] . "&lt;/td&gt;\n";
    }
    oci_free_statement($rc);
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

// Muestra:
// Beijing
// Bern
// Bombay
// Geneva

oci_free_statement($stid);
oci_close($conn);

?&gt;

# Gestión de la conexión OCI8 y la cola de espera

## Funciones de conexión

La extensión oci8 proporciona tres funciones diferentes para conectarse
a Oracle. La función de conexión estándar es la función
[oci_connect()](#function.oci-connect). Esta función crea una conexión
a la base de datos Oracle y devuelve un recurso utilizado
por las futuras llamadas a la base de datos.

La conexión a un servidor Oracle es una operación razonablemente costosa
en términos de tiempo. La función [oci_pconnect()](#function.oci-pconnect)
utiliza un caché persistente de conexiones que puede ser reutilizado a través
de diferentes scripts. Esto significa que una sola conexión será utilizada por
proceso PHP (o un hijo Apache).

Si su aplicación se conecta a Oracle utilizando un juego diferente de derechos
de base de datos para cada usuario web, el caché persistente utilizado
por la función [oci_pconnect()](#function.oci-pconnect) se vuelve menos apropiado
ya que el aumento del número de usuarios concurrentes afectará el rendimiento
del servidor Oracle, ya que deberá mantener demasiadas conexiones en caché.
Si su aplicación es de este tipo, se recomienda optimizar su aplicación
utilizando las opciones de configuración [oci8.max_persistent](#ini.oci8.max-persistent) y [oci8.persistent_timeout](#ini.oci8.persistent-timeout)
(estas opciones le dan control sobre el tamaño y la vida útil del caché
de conexiones persistentes) o utilizar el pool de conexiones residentes de Oracle
(para las bases de datos Oracle 11g y posteriores), o bien, utilizar la función
[oci_connect()](#function.oci-connect).

Las funciones [oci_connect()](#function.oci-connect) y [oci_pconnect()](#function.oci-pconnect)
emplean un caché de conexiones; si se realizan múltiples llamadas
a [oci_connect()](#function.oci-connect), utilizando los mismos parámetros en
un script dado, la segunda llamada y las siguientes devolverán el manejador
de conexión existente. El caché utilizado por la función [oci_connect()](#function.oci-connect)
se limpia al final de la ejecución del script o cuando se cierra explícitamente
el manejador de conexión. [oci_pconnect()](#function.oci-pconnect) tiene un comportamiento
sustancialmente idéntico, con la diferencia de que el caché se mantiene por separado
y se conserva entre las peticiones HTTP.

Es importante recordar esta funcionalidad de caché, ya que da la apariencia de que
los dos manejadores no están aislados a nivel de transacciones
(en realidad representan el mismo manejador de conexión, por lo que no están aislados
en absoluto). Si su conexión necesita dos conexiones separadas, aisladas
a nivel de transacciones, debe utilizar la función [oci_new_connect()](#function.oci-new-connect).

El caché de la función [oci_pconnect()](#function.oci-pconnect) se borra
y todas las conexiones a la base de datos se cierran cuando el proceso
PHP termina, por lo que las conexiones persistentes solo tienen interés cuando
PHP se utiliza como módulo Apache o con FPM o similar.
Las conexiones persistentes no tienen ningún interés a través de [oci_connect()](#function.oci-connect)
cuando PHP se utiliza como CGI o en línea de comandos.

[oci_new_connect()](#function.oci-new-connect) siempre crea una nueva conexión al
servidor Oracle, independientemente de la existencia de otras conexiones.
Las aplicaciones web de alto tráfico deben evitar utilizar
[oci_new_connect()](#function.oci-new-connect), especialmente en las secciones
más cargadas de la aplicación.

Las conexiones persistentes pueden ahora ser cerradas
por el usuario, permitiendo un mejor control de los recursos
de conexión. Las conexiones persistentes pueden ahora ser cerradas
automáticamente cuando ninguna variable PHP las referencia, como podría ser el caso
al final de un contexto de una función de usuario PHP.
Esto invalidará todas las transacciones no confirmadas. Estos cambios en las
conexiones persistentes hacen que funcionen como las funciones
no persistentes, simplificando la interfaz, permitiendo una mayor
coherencia de la aplicación y previsibilidad. Defina la directiva
[oci8.old_oci_close_semantics](#ini.oci8.old-oci-close-semantics)
a _On_ para recuperar el comportamiento histórico.

El restablecimiento automático de las conexiones persistentes PHP
después del reinicio de un proceso Apache o FPM hace que los triggers
LOGON sean únicamente recomendados para definir
los atributos de sesión y no las peticiones de conexión de usuarios
por aplicación.

## Pool de conexión DRCP

PHP soporta el pool de conexiones residentes
Oracle (DRCP). DRCP permite utilizar más eficientemente la memoria de la base de datos
y permite una mejor escalabilidad. Se requieren pocos o ningún cambio
para aprovechar DRCP.

DRCP está previsto para aplicaciones que se conectan utilizando poco
esquema de base de datos, y que mantienen las conexiones abiertas
durante un corto período de tiempo. Las otras aplicaciones deben
utilizar el proceso dedicado a la base de datos Oracle, o utilizar
los servidores compartidos.

DRCP se beneficia de las 3 funciones de conexión, pero solo la función
[oci_pconnect()](#function.oci-pconnect) ofrece el mayor rendimiento.

Para hacer DRCP disponible con OCI8, la versión de las bibliotecas clientes Oracle
utilizadas por PHP así como la versión de la base de datos Oracle
deben ser 11g o superiores.

La documentación sobre DRCP puede encontrarse en los diferentes manuales
Oracle. Por ejemplo, consulte la
[» configuración del pool
de conexiones residentes a la base de datos](https://docs.oracle.com/en/database/oracle/oracle-database/23/jjdbc/database-resident-connection-pooling.html) de la documentación
Oracle para un ejemplo de uso.
Un [» libro blanco sobre DRCP](https://www.oracle.com/technetwork/topics/php/whatsnew/php-scalability-ha-twp-128842.pdf)
contiene varias informaciones internas sobre DRCP.

Para utilizar DRCP, instale la extensión OCI8 y las
bibliotecas Oracle 11g (o posterior), luego, siga estos pasos:

    -

      Utilizando los privilegios de administrador de la base de datos,
      utilice un programa como SQL*Plus para iniciar un pool
      de conexiones a la base de datos:









    SQL&gt; execute dbms_connection_pool.start_pool;






    -

      Opcionalmente, utilice dbms_connection_pool.alter_param()
      para configurar las opciones DRCP. Las opciones comunes del pool
      pueden encontrarse utilizando la vista DBA_CPOOL_INFO.





    -

      Actualice las cadenas de conexión utilizadas. Para las aplicaciones PHP
      que actualmente se conectan mediante un nombre de conexión de red como
      MYDB:









    $c = oci_pconnect("myuser", "mypassword", "MYDB");





      modifique el archivo tnsnames.ora y añada una cláusula
      (SERVER=POOLED), por ejemplo:









    MYDB = (DESCRIPTION=(ADDRESS=(PROTOCOL=tcp) (HOST=myhost.dom.com)
           (PORT=1521))(CONNECT_DATA=(SERVICE_NAME=sales)
           (SERVER=POOLED)))





      De lo contrario, puede modificar la sintaxis de conexión fácil en PHP y añadir
      :POOLED después del nombre del servicio:









    $c = oci_pconnect("myuser", "mypassword", "myhost.dom.com:1521/sales:POOLED");






    -

      Edite php.ini y elija el nombre de la clase de conexión.
      Este nombre indica una división lógica del pool de conexión y puede
      ser utilizado para aislar el pool de diferentes aplicaciones.
      Todas las aplicaciones PHP utilizando el mismo usuario así como
      el mismo valor de clase de conexión podrán compartir
      el pool de conexiones, permitiendo así obtener una mayor disponibilidad.









    oci8.connection_class = "MY_APPLICATION_NAME"






    -

      Ejecute su aplicación, conéctese a la base de datos
      11g (o superior).


**Nota**:

    Las aplicaciones que utilizan las bibliotecas cliente Oracle 10g que necesitan el rendimiento
    de las conexiones persistentes, pueden reducir la cantidad de memoria
    asignada al servidor de la base de datos utilizando los servidores
    compartidos Oracle (conocidos anteriormente como servidores multihilo).
    Consulte la documentación Oracle para obtener más información.

**Nota**:

    La modificación de una contraseña durante conexiones DRCP fallará
    con el error "*ORA-56609: Usage not supported with DRCP*".
    Esto es una restricción documentada de la base de datos Oracle 11g.

# Soporte de FAN (Fast Application Notification : Notificación Rápida de Aplicación) OCI8

El soporte de FAN proporciona un cambio de conexión rápido,
una funcionalidad de alta disponibilidad para la base de datos Oracle.
Permite a los scripts PHP OCI8 ser notificados cuando una máquina
de base de datos o una instancia de base de datos se vuelve
no disponible. Sin FAN, OCI8 puede bloquearse en caso de alcanzar el tiempo límite
TCP, y se devuelve un error, lo cual puede tomar varios minutos.
La activación de FAN en OCI8 permite a las aplicaciones detectar los errores
y reconectarse a una instancia de conexión disponible sin
que el servidor Web necesite conocerlo.

El soporte de FAN está disponible cuando las bibliotecas clientes
Oracle vinculadas a PHP y la base de datos Oracle son de la versión
10gR2 o superiores.

FAN beneficia a los usuarios de la tecnología de clúster Oracle (RAC)
ya que las conexiones sobrevivientes a las instancias de base de datos pueden
realizarse inmediatamente. Los usuarios de Oracle Data Guard con un broker,
verán los eventos FAN generados cuando una base de datos pasa a estar en línea. Las bases de datos que no forman parte de un clúster
enviarán eventos FAN cuando la base de datos se reinicie.

Para las conexiones activas, cuando una máquina o una instancia de
base de datos se vuelve indisponible, se devolverá un error de conexión
por la función de la extensión OCI8 llamada. Durante la reconexión
de un script PHP subyacente, se establecerá una conexión a una instancia de base de datos
sobreviviente. La extensión OCI8 también, de forma transparente,
limpiará todas las conexiones inactivas afectadas por una máquina de
base de datos o una instancia en fallo, así, las llamadas de conexión PHP
establecerán una nueva conexión sin que el script lo sepa,
evitando así cualquier interrupción del servicio.

Cuando [oci8.events](#ini.oci8.events)
vale On, se sugiere definir
[oci8.ping_interval](#ini.oci8.ping-interval)
a -1 para desactivar el ping, sabiendo que la activación de los eventos FAN
proporciona un gestor de conexiones proactivo de las conexiones inactivas
que se han vuelto inválidas por una interrupción del servicio.

Para activar el soporte FAN en PHP OCI8, compile PHP OCI8 con las
bibliotecas Oracle 10gR2 o superiores, luego, siga estos pasos:

    -

      Con los privilegios de administrador de la base de datos, utilice
      un programa como SQL*Plus para activar el servicio de base de datos
      para publicar los eventos FAN; por ejemplo:







    SQL&gt; execute dbms_service.modify_service(
                   SERVICE_NAME        =&gt; 'sales',
                   AQ_HA_NOTIFICATIONS =&gt; TRUE);






    -

      Edite el archivo php.ini y añada:







    oci8.events = On






    -

      Si la aplicación no gestiona aún las condiciones de error
      OCI8, modifíquela para detectar los fallos. Esto puede requerir
      la reconexión y la re-ejecución de las consultas.



    -

      Ejecute la aplicación, conéctese a la base de datos
      Oracle 10gR2 o superiores.


# El soporte de la reanudación transparente de aplicación (TAF) de OCI8

TAF es una funcionalidad de la base de datos Oracle que proporciona alta disponibilidad.
Permite que las aplicaciones PHP OCI8 se reconecten automáticamente a
una base de datos preconfigurada cuando la conectividad a la base de datos falla debido
a una falla de instancia o de red.

En un sistema de base de datos Oracle configurado, TAF ocurre cuando la aplicación PHP
detecta que la instancia de la base de datos está fuera de servicio o inalcanzable. Establece una conexión
a otro nodo en una configuración Oracle [» RAC](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-DEF850F6-27E9-428E-B8FC-530230D78AD2),
una base de datos de respaldo en caliente, o la misma instancia de la base de datos
ella misma. Consulte el [» Guía del programador de la interfaz de llamada Oracle](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-F7817CD2-4A2C-4D37-BD36-56DBABD4725F)
para más información sobre OCI TAF.

Una función de retrollamada de aplicación puede ser registrada
con [oci_register_taf_callback()](#function.oci-register-taf-callback). Durante
la reanudación, el procesamiento normal de la aplicación se detiene y la retrollamada registrada es invocada.
La función de retrollamada notifica a la aplicación de los eventos de reanudación. Si la reanudación tiene éxito,
el procesamiento normal se reanudará. Si la reanudación es abandonada, todas las operaciones de base de datos
siguientes en la aplicación fallarán debido a la falta de una conexión disponible.

Cuando la conexión falla en otra base de datos, la función de retrollamada puede
restablecer cualquier estado de conexión necesario, por ejemplo, rejugando
los comandos ALTER SESSION necesarios si el servicio de base de datos no tenía
-failover_restore activado.

Una función de retrollamada de aplicación puede ser eliminada llamando a [oci_unregister_taf_callback()](#function.oci-unregister-taf-callback).

## Configuración de la reanudación transparente de aplicación

TAF puede ser configurado del lado PHP OCI8 o en la configuración de la
base de datos. Si ambos están configurados, los parámetros del lado de la base de datos
tienen prioridad.

Configurar TAF en PHP OCI8 (el lado cliente) incluyendo el
parámetro FAILOVER_MODE en la parte CONNECT_DATA de un
descriptor de conexión. Consulte la sección
Configuración de la reanudación transparente de aplicación
del [» 
Guía del administrador de Oracle Database Net Services](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-8F532535-C401-4B51-BE0B-04FD74BB0621)
para más información sobre la configuración del lado cliente de TAF.

Un ejemplo de tnsnames.ora para configurar TAF reconectando a
la misma instancia de la base de datos:

    ORCL =
      (DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521))
        (CONNECT_DATA =
          (SERVICE_NAME = orclpdb1)
          (FAILOVER_MODE =
            (TYPE = SELECT)
            (METHOD = BASIC)
            (RETRIES = 20)
            (DELAY = 15))))



También es posible configurar TAF del lado de la base de datos
modificando el servicio objetivo con
[» srvctl](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-8DC4D5E0-CA9D-47BC-BAD0-8769405AFEC5)
(para RAC) o la procedimiento empaquetado
[» 
DBMS_SERVICE.MODIFY_SERVICE](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-C11449DC-EEDE-4BB8-9D2C-0A45198C1928)
(para bases de datos de instancia única).

## Uso de las funciones de retrollamada TAF en OCI8

Una función de retrollamada TAF es una función de aplicación que puede ser
registrada para ser llamada durante la reanudación. Es llamada
varias veces durante la reanudación de la conexión de la aplicación.

La función de retrollamada es llamada por primera vez cuando se detecta una pérdida de conexión.
Esto permite que la aplicación actúe en consecuencia para
los retrasos venideros de la reanudación. Si la reanudación tiene éxito,
la función de retrollamada es invocada después de que la conexión sea restablecida
y utilizable. En ese momento, la aplicación puede resincronizar
los parámetros de sesión y tomar acciones tales como
informar al usuario que una reanudación ha ocurrido. Si la reanudación
es infructuosa, una retrollamada ocurre para informar a la aplicación
que una reanudación no ha ocurrido y que la conexión no es utilizable.

La interfaz de una función de retrollamada TAF definida por el usuario es la siguiente:

**userCallbackFn**([resource](#language.types.resource) $connection, [int](#language.types.integer) $event, [int](#language.types.integer) $type): [int](#language.types.integer)

     connection


       La conexión Oracle en la que la retrollamada TAF ha sido
       registrada vía [oci_register_taf_callback()](#function.oci-register-taf-callback).
       La conexión no es válida hasta que la
       reanudación no termine con éxito.






     event


       El evento de reanudación indica el estado actual de
       la reanudación.







        -

          **[OCI_FO_BEGIN](#constant.oci-fo-begin)** indica que
          la reanudación ha detectado una pérdida de conexión y que
          la reanudación comienza.





        -

          **[OCI_FO_END](#constant.oci-fo-end)** indica que la
          reanudación ha tenido éxito.





        -

          **[OCI_FO_ABORT](#constant.oci-fo-abort)** indica que
          la reanudación ha fallado y que no hay opción
          de reintentar.





        -

          **[OCI_FO_ERROR](#constant.oci-fo-error)** indica asimismo
          que la reanudación ha fallado, pero da a
          la aplicación la oportunidad de manejar el error
          y devolver OCI_FO_RETRY para reintentar la reanudación.





        -

           **[OCI_FO_REAUTH](#constant.oci-fo-reauth)** indica que
           un usuario Oracle ha sido reautenticado.










     type


       El tipo de reanudación. Esto permite a la retrollamada saber
       qué tipo de reanudación la aplicación ha solicitado. Los
       valores habituales son los siguientes:







        -

          **[OCI_FO_SESSION](#constant.oci-fo-session)** indica que
          el usuario ha solicitado únicamente la reanudación de sesión.
          Por ejemplo, si la conexión de un usuario se pierde,
          una nueva sesión es automáticamente creada para
          el usuario en la base de datos de respaldo. Este tipo de reanudación
          no intenta recuperar los SELECT.





        -

          **[OCI_FO_SELECT](#constant.oci-fo-select)** indica que
          el usuario ha solicitado la reanudación SELECT asimismo.
          Permite a los usuarios con cursores abiertos
          continuar recuperándolos después de una falla.










     return value





        -

          0 indica que los pasos de reanudación
          deben continuar normalmente.





        -

          **[OCI_FO_RETRY](#constant.oci-fo-retry)** indica que
          la reanudación debe ser intentada nuevamente por Oracle.
          En caso de error al reanudar a una nueva
          conexión, TAF es capaz de reintentar la reanudación.
          En general, el código de la aplicación debe dormir
          durante un cierto tiempo antes de devolver OCI_FO_RETRY.









**Ejemplo #1 Registro de una función de retrollamada TAF**

&lt;?php

// Definición de la función de retrollamada del espacio de usuario
class MyClass {
public static $retry_count;
    public static function TAFCallback($conn, $event, $type)
    {
        switch ($event) {
case OCI_FO_BEGIN:
printf(" Reanudando ... Por favor, espere\n");
printf(" El tipo de reanudación se encontró que era %s \n",
(($type==OCI_FO_SESSION) ? "SESSION"
                        :(($type==OCI_FO_SELECT) ? "SELECT" : "UNKNOWN!")));
self::$retry_count = 0;
                break;
            case OCI_FO_ABORT:
                // La aplicación no puede continuar utilizando la base de datos
                printf(" Reanudación abortada. La reanudación no tendrá lugar.\n");
                break;
            case OCI_FO_END:
                // Reanudación exitosa. Informar a los usuarios que una reanudación ha ocurrido.
                printf(" Reanudación terminada ... reanudando servicios\n");
                break;
            case OCI_FO_REAUTH:
                printf(" Usuario reanudado ... reanudando servicios\n");
                // Rejugar todas las comandos ALTER SESSION asociadas a esta conexión
                // por ejemplo oci_parse($conn, 'ALTER SESSION ...');
break;
case OCI_FO_ERROR:
// Detener los intentos si ya se ha intentado 20 veces.
if (self::$retry_count &gt;= 20)
                    return 0;
                printf(" Error de reanudación recibido. Durmiendo...\n");
                sleep(10);
                self::$retry_count++;
return OCI_FO_RETRY; // reintentar reanudación
break;
default:
printf("Evento de reanudación incorrecto: %d.\n", $event);
break;
}
return 0;
}
}

$fn_name = 'MyClass::TAFCallback';

$conn = oci_connect('hr', 'welcome', 'orcl');
$sysconn = oci_connect('system', 'oracle', 'orcl');

// Usar una conexión privilegiada para construir una instrucción SQL que iniciará la reanudación
$sql = &lt;&lt;&lt; 'END'
select unique 'alter system disconnect session '''||sid||','||serial#||''''
from v$session_connect_info
where sid = sys_context('USERENV', 'SID')
END;

$s = oci_parse($conn, $sql);
oci_execute($s);
$r = oci_fetch_array($s);
$disconnectssql = $r[0];

oci_register_taf_callback($conn, $fn_name); // Registrar TAFCallback a Oracle TAF

print "Analizando consulta de usuario\n";
$sql = "select systimestamp from dual";
$stmt = oci_parse($conn, $sql);

// Por ejemplo, si una pérdida de conexión ocurre en este momento, oci_execute() detectará
// la pérdida y la reanudación comenzará. Durante la reanudación, oci_execute() invocará
// la función de retrollamada TAF varias veces. Si la reanudación tiene éxito,
// una nueva conexión es creada de manera transparente y oci_execute() continuará como
// de costumbre. Los parámetros de sesión de la conexión pueden ser restablecidos en la función de retrollamada TAF.
// Si la reanudación es abandonada, oci_execute() devolverá un error
// ya que una conexión válida no está disponible.

// Desconectar al usuario, lo que inicia la reanudación
print "Desconectando al usuario\n";
$discsql = oci_parse($sysconn, $disconnectssql);
oci_execute($discsql);

print "Ejecutando consulta de usuario\n";
$e = oci_execute($stmt);
if (!$e) {
    $m = oci_error($stmt);
trigger_error("No se pudo ejecutar la sentencia: ". $m['message'], E_USER_ERROR);
}
$row = oci_fetch_array($stmt);
print $row[0] . "\n";

// hacer otras instrucciones SQL con la nueva conexión, si es válida
// $stmt = oci_parse($conn, . . .);

?&gt;

## Ver también

- [oci_register_taf_callback()](#function.oci-register-taf-callback)

- [oci_unregister_taf_callback()](#function.oci-unregister-taf-callback)

# OCI8 y rastreo dinámico de DTrace

OCI8 2.0 sondeos de DTrace estáticos que se pueden usar en
sistemas operativos que admiten DTrace.
Véase [Rastreo dinámico de DTrace](#features.dtrace)
para una visión general de PHP y DTrace.

## Instalar OCI8 con soporte para DTrace

Para habilitar el soporte para DTrace en OCI8 para PHP, construya OCI8 como una
extensión compartida después de establecer PHP_DTRACE.

$ export PHP_DTRACE=yes
$ pecl install oci8

Edite php.ini,
establezca [extension_dir](#ini.extension-dir) al
directorio con el oci8.so creado y también
habilite la extensión añadiendo:

extension=oci8.so

Si instala PHP OCI8 2.0 desde PECL usando phpize y
configure (en lugar
de pecl), será necesario establecer
PHP_DTRACE=yes. Esto es así debido a que
la opción --enable-dtrace será ignorada por el
script limitado configure de un PECL incluido.

Véase [Instalación de extensiones
PECL](#install.pecl) para las instrucciones generales de instalación de PECL.

## Sondeos estáticos de DTrace en OCI8 para PHP

   <caption>**Los siguientes sondeos estáticos están disponibles en OCI8 para PHP**</caption>
   
    
     
      Nombre del sondeo
      Descripción del sondeo
      Argumentos del sondeo


      oci8-connect-entry
      Iniciado por oci_connect(), oci_pconnect() y oci_new_connect(). Lanzado antes de establecer una conexión con una base de datos.
      char *username, char *dbname, char *charset, long session_mode, int persistent, int exclusive



      oci8-connect-return
      Lanzado al finallde una conexión.
      void *connection



      oci8-check-connection
      Lanzado si un error de Oracle podría haber causado que la conexión sea inválida.
      void *connection, char *client_id, int is_open, long errcode, unsigned long server_status



      oci8-sqltext
      Lanzado cuando oci_parse() se ejecuta.
      void *connection, char *client_id, void *statement, char *sql



      oci8-connection-close
      Lanzado cuando la conexión a la base de datos está completamente destruida.
      void *connection



      oci8-error
      Lanzado si ocurre un error de Oracle.
      int status, long errcode



      oci8-execute-mode
      Lanzado en [oci_execute()](#function.oci-execute) para mostrar el modo de ejecución.
      void *connection, char *client_id, void *statement, unsigned int mode


Estos sondeos son útiles para rastrear scripts de OCI8.

connection y statement
son los punteros a las estructuras internas usadas para rastrear conexiones
de PHP y ejecutar sentencias.

client_id es el valor establecido
por [oci_set_client_identifier()](#function.oci-set-client-identifier).

El núcleo de PHP también posee sondeos estáticos.
Véase [Sondeos estáticos
de DTrace en el núcleo de PHP](#features.dtrace.static-probes).

   <caption>**Sondeos de DTrace de depuración interna en OCI8**</caption>
   
    
     
      Nombre del sondeo


      oci8-connect-expiry



      oci8-connect-lookup



      oci8-connect-p-dtor-close



      oci8-connect-p-dtor-release



      oci8-connect-type



      oci8-sesspool-create



      oci8-sesspool-stats



      oci8-sesspool-type


Estos sondeos son útiles para mantenedores de OCI8. Consulte el código fuente de OCI8 para los argumentos y para ver cuando serán lanzados.

## Enumerar los Sondeos estáticos de DTrace en OCI8 para PHP

Para enumerar los sondeos disponibles, inicie un proceso de PHP y ejecute:

# dtrace -l

La salida será similar a:

ID PROVIDER MODULE FUNCTION NAME
[ . . . ]
17 phpoci22116 oci8.so php_oci_dtrace_check_connection oci8-check-connection
18 phpoci22116 oci8.so php_oci_do_connect oci8-connect-entry
19 phpoci22116 oci8.so php_oci_persistent_helper oci8-connect-expiry
20 phpoci22116 oci8.so php_oci_do_connect_ex oci8-connect-lookup
21 phpoci22116 oci8.so php_oci_pconnection_list_np_dtor oci8-connect-p-dtor-close
22 phpoci22116 oci8.so php_oci_pconnection_list_np_dtor oci8-connect-p-dtor-release
23 phpoci22116 oci8.so php_oci_do_connect oci8-connect-return
24 phpoci22116 oci8.so php_oci_do_connect_ex oci8-connect-type
25 phpoci22116 oci8.so php_oci_connection_close oci8-connection-close
26 phpoci22116 oci8.so php_oci_error oci8-error
27 phpoci22116 oci8.so php_oci_statement_execute oci8-execute-mode
28 phpoci22116 oci8.so php_oci_create_spool oci8-sesspool-create
29 phpoci22116 oci8.so php_oci_create_session oci8-sesspool-stats
30 phpoci22116 oci8.so php_oci_create_session oci8-sesspool-type
31 phpoci22116 oci8.so php_oci_statement_create oci8-sqltext

Los valores de la columna "Provider" (Proveedor) consisten en phpoci and
el ID del proceso de PHP ejecutándose actualmente.

La columna "Function" (Función) se refiere a los nombres de funciones internas
de la implementación en C de PHP donde cada proveedor está ubicado.

Si un proceso de PHP no se está ejecutando, no se mostrarán sondeos de PHP.

## Ejemplo de DTrace con OCI8 para PHP

Este ejemplo muestra lo básico del lenguaje de script D de DTrace.

    **Ejemplo #1 user_oci8_probes.d para rasrear todos los Sondeos estáticos de OCI8 para PHP al nivel de usuario con DTrace**

#!/usr/sbin/dtrace -Zs

#pragma D option quiet

php\*:::oci8-connect-entry
{
printf("%lld: PHP connect-entry\n", walltimestamp);
printf(" credentials=\"%s@%s\"\n", arg0 ? copyinstr(arg0) : "", arg1 ? copyinstr(arg1) : "");
printf(" charset=\"%s\"\n", arg2 ? copyinstr(arg2) : "");
printf(" session_mode=%ld\n", (long)arg3);
printf(" persistent=%d\n", (int)arg4);
printf(" exclusive=%d\n", (int)arg5);
}

php*:::oci8-connect-return
{
printf("%lld: PHP oci8-connect-return\n", walltimestamp);
printf(" connection=0x%p\n", (void *)arg0);
}

php*:::oci8-connection-close
{
printf("%lld: PHP oci8-connect-close\n", walltimestamp);
printf(" connection=0x%p\n", (void *)arg0);
}

php\*:::oci8-error
{
printf("%lld: PHP oci8-error\n", walltimestamp);
printf(" status=%d\n", (int)arg0);
printf(" errcode=%ld\n", (long)arg1);
}

php*:::oci8-check-connection
{
printf("%lld: PHP oci8-check-connection\n", walltimestamp);
printf(" connection=0x%p\n", (void *)arg0);
printf(" client_id=\"%s\"\n", arg1 ? copyinstr(arg1) : "");
printf(" is_open=%d\n", arg2);
printf(" errcode=%ld\n", (long)arg3);
printf(" server_status=%lu\n", (unsigned long)arg4);
}

php*:::oci8-sqltext
{
printf("%lld: PHP oci8-sqltext\n", walltimestamp);
printf(" connection=0x%p\n", (void *)arg0);
printf(" client_id=\"%s\"\n", arg1 ? copyinstr(arg1) : "");
printf(" statement=0x%p\n", (void \*)arg2);
printf(" sql=\"%s\"\n", arg3 ? copyinstr(arg3) : "");
}

php*:::oci8-execute-mode
{
printf("%lld: PHP oci8-execute-mode\n", walltimestamp);
printf(" connection=0x%p\n", (void *)arg0);
printf(" client_id=\"%s\"\n", arg1 ? copyinstr(arg1) : "");
printf(" statement=0x%p\n", (void \*)arg2);
printf(" mode=0x%x\n", arg3);
}

Este script usa la opción -Z para
dtrace, permitiéndole que sea ejecutado cuando no exista un
procesode PHP en ejecución. Si esta opción fuera omitida, el script
terminaría inmediatamente cuando no se ejecutara PHP
porque no sabe de la existencia de sondeos a ser
monitorizados.

En máquinas multi-CPU, el orden de los sondeos no parecerá ser
sencuencial. Esto depende de cuál CPU estaba procesando los sondeos,
y de cómo los hilos migran entre CPUs. Mostrar las marcas de tiempo de los sondeos
atudará a reducir la confusión.

El script rastrea todos los sondeos estáticos de OCI8 para PHP a nivel de usuario que apuntan
a lo largo de la duración de un script de PHP en ejecución. Ejecute el script D:

# ./user_oci8_probes.d

Ejecute un script o aplicación de PHP. El script D de monitorización
generará cada argumento del sondeo mientras se lanza. Por ejemplo, un sencillo
script de PHP que requiere una tabla podría producir la siguiente salida
de rastreo:

1381794982092854582: PHP connect-entry
credentials="hr@localhost/pdborcl"
charset=""
session_mode=0
persistent=0
exclusive=0
1381794982183158766: PHP oci8-connect-return
connection=0x7f4a7907bfb8
1381794982183594576: PHP oci8-sqltext
connection=0x7f4a7907bfb8
client_id="Chris"
statement=0x7f4a7907c2a0
sql="select \* from employees"
1381794982183783706: PHP oci8-execute-mode
connection=0x7f4a7907bfb8
client_id="Chris"
statement=0x7f4a7907c2a0
mode=0x20
1381794982444344390: PHP oci8-connect-close
connection=0x7f4a7907bfb8

Cuando la monitorización está completa, el script D puede terminarse con un
^C.

## Véase también

- [Rastreo dinámico de DTrace](#features.dtrace)

# Tipos de datos admitidos

  <caption>**El controlador admite los siguientes tipos cuando se vinculan parámetros usando la
   función [oci_bind_by_name()](#function.oci-bind-by-name):**</caption>
  
   
    
     Tipo
     Referencia


     **[SQLT_NTY](#constant.sqlt-nty)**
     Hace referencia a un tipo de colección nativo desde un objeto colección de PHP,
      tales como aquellos creados por [oci_new_collection()](#function.oci-new-collection).



     **[SQLT_BFILEE](#constant.sqlt-bfilee)**
     Hace referencia a un descriptor nativo, tales como a aquellos creados por
      [oci_new_descriptor()](#function.oci-new-descriptor).



     **[SQLT_CFILEE](#constant.sqlt-cfilee)**
     Hace referencia a un descriptor nativo, tales como a aquellos creados por
      [oci_new_descriptor()](#function.oci-new-descriptor).



     **[SQLT_CLOB](#constant.sqlt-clob)**
     Hace referencia a un descriptor nativo, tales como a aquellos creados por
      [oci_new_descriptor()](#function.oci-new-descriptor).



     **[SQLT_BLOB](#constant.sqlt-blob)**
     Hace referencia a un descriptor nativo, tales como a aquellos creados por
      [oci_new_descriptor()](#function.oci-new-descriptor).



     **[SQLT_RDD](#constant.sqlt-rdd)**
     Hace referencia a un descriptor nativo, tales como a aquellos creados por
      [oci_new_descriptor()](#function.oci-new-descriptor).



     **[SQLT_NUM](#constant.sqlt-num)**
     Convierte el parámetro de PHP al tipo long de 'C', y lo vincula a
      ese valor.



     **[SQLT_RSET](#constant.sqlt-rset)**
     Hace referencia a un gestor de sentencias nativo, tales como a aquellos creados por
      [oci_parse()](#function.oci-parse) o aquellos recuperados desde otras consultas de OCI.



     **[SQLT_BOL](#constant.sqlt-bol)**
     Vincular el parámetro de PHP a un BOOLEAN de PL/SQL



     **[SQLT_CHR](#constant.sqlt-chr)** y cualquier otro tipo
     Convierte el parámetro de PHP al tipo string y lo vincula como
      string.

  <caption>**Los siguientes tipos son admitidos cuando se recuperan columnas desde un conjunto de resultados:**</caption>
  
   
    
     Tipo
     Referencia


     **[SQLT_RSET](#constant.sqlt-rset)**
     Crea un recurso de sentencia de OCI para representar al cursor.



     **[SQLT_RDD](#constant.sqlt-rdd)**
     Crea un objeto ROWID.



     **[SQLT_BLOB](#constant.sqlt-blob)**
     Crea un objeto LOB.



     **[SQLT_CLOB](#constant.sqlt-clob)**
     Crea un objeto LOB.



     **[SQLT_BFILE](#constant.sqlt-bfile)**
     Crea un objeto LOB.



     **[SQLT_LNG](#constant.sqlt-lng)**
     Vinculado como SQLT_CHR, devuelto como string



     **[SQLT_LBI](#constant.sqlt-lbi)**
     Vinculado como **[SQLT_BIN](#constant.sqlt-bin)**, devuelto como string



     Cualquier otro tipo
     Vinculado como **[SQLT_CHR](#constant.sqlt-chr)**, devuelto como string

# Funciones de OCI8

# oci_bind_array_by_name

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.2.0)

oci_bind_array_by_name — Asocia un array PHP a un parámetro de array Oracle PL/SQL

### Descripción

**oci_bind_array_by_name**(
    [resource](#language.types.resource) $statement,
    [string](#language.types.string) $param,
    [array](#language.types.array) &amp;$var,
    [int](#language.types.integer) $max_array_length,
    [int](#language.types.integer) $max_item_length = -1,
    [int](#language.types.integer) $type = **[SQLT_AFC](#constant.sqlt-afc)**
): [bool](#language.types.boolean)

Asocia un array PHP var a un marcador
Oracle param, que apunta a un array PL/SQL.
Puede ser utilizado para entrada o salida, dependiendo de la configuración en tiempo de ejecución.

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     param


       El marcador Oracle.






     var


       Un array.






     max_array_length


       Especifica la longitud máxima de los arrays de entrada y resultado.






     max_item_length


       Define la longitud máxima para los elementos del array.
       Si max_item_length no se proporciona
       o si vale -1, **oci_bind_array_by_name()** buscará
       el elemento más largo en el array de entrada y lo utilizará como
       longitud máxima.






     type


       Debe ser utilizado para definir el tipo de los elementos PL/SQL.
       Consulte la lista de tipos disponibles a continuación:







        -

          **[SQLT_NUM](#constant.sqlt-num)** - para arrays de NUMBER.





        -

          **[SQLT_INT](#constant.sqlt-int)** - para arrays INTEGER (Nota: INTEGER
          actualmente es un sinónimo de NUMBER(38), pero el tipo
          **[SQLT_NUM](#constant.sqlt-num)** no funcionará en este caso aunque sean sinónimos).





        -

          **[SQLT_FLT](#constant.sqlt-flt)** - para arrays de FLOAT.





        -

          **[SQLT_AFC](#constant.sqlt-afc)** - para arrays de CHAR.





        -

          **[SQLT_CHR](#constant.sqlt-chr)** - para arrays de VARCHAR2.





        -

          **[SQLT_VCS](#constant.sqlt-vcs)** - para arrays de VARCHAR.





        -

          **[SQLT_AVC](#constant.sqlt-avc)** - para arrays de CHARZ.





        -

          **[SQLT_STR](#constant.sqlt-str)** - para arrays de STRING.





        -

          **[SQLT_LVC](#constant.sqlt-lvc)** - para arrays de LONG VARCHAR.





        -

          **[SQLT_ODT](#constant.sqlt-odt)** - para arrays de DATE.









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_bind_array_by_name()**

&lt;?php

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$create = "CREATE TABLE bind_example(name VARCHAR(20))";
$stid = oci_parse($conn, $create);
oci_execute($stid);

$create_pkg = "
CREATE OR REPLACE PACKAGE ARRAYBINDPKG1 AS
  TYPE ARRTYPE IS TABLE OF VARCHAR(20) INDEX BY BINARY_INTEGER;
  PROCEDURE iobind(c1 IN OUT ARRTYPE);
END ARRAYBINDPKG1;";
$stid = oci_parse($conn, $create_pkg);
oci_execute($stid);

$create_pkg_body = "
CREATE OR REPLACE PACKAGE BODY ARRAYBINDPKG1 AS
CURSOR CUR IS SELECT name FROM bind_example;
PROCEDURE iobind(c1 IN OUT ARRTYPE) IS
BEGIN
-- Bulk Insert
FORALL i IN INDICES OF c1
INSERT INTO bind_example VALUES (c1(i));

    -- Fetch and reverse;
    IF NOT CUR%ISOPEN THEN
      OPEN CUR;
    END IF;
    FOR i IN REVERSE 1..5 LOOP
      FETCH CUR INTO c1(i);
      IF CUR%NOTFOUND THEN
        CLOSE CUR;
        EXIT;
      END IF;
    END LOOP;

END iobind;
END ARRAYBINDPKG1;";
$stid = oci_parse($conn, $create_pkg_body);
oci_execute($stid);

$stid = oci_parse($conn, "BEGIN arraybindpkg1.iobind(:c1); END;");
$array = array("one", "two", "three", "four", "five");
oci_bind_array_by_name($stid, ":c1", $array, 5, -1, SQLT_CHR);
oci_execute($stid);

var_dump($array);

?&gt;

# oci_bind_by_name

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_bind_by_name — Asocia una variable PHP a un marcador Oracle

### Descripción

**oci_bind_by_name**(
    [resource](#language.types.resource) $statement,
    [string](#language.types.string) $param,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $max_length = -1,
    [int](#language.types.integer) $type = 0
): [bool](#language.types.boolean)

Vincula una variable PHP var al marcador Oracle
param. El hecho de vincular una
variable es importante en términos de rendimiento de la
base de datos Oracle, pero también en términos de seguridad
relativa a las inyecciones SQL.

El vínculo permite a las bases de datos reutilizar el contexto
de ejecución de la consulta así como el caché asociado,
incluso cuando otro usuario o proceso la ejecuta. El vínculo reduce el riesgo de
inyección SQL ya que los datos asociados a una variable vinculada nunca son tratados como
parte de la consulta SQL. Por lo tanto, no es necesario añadir comillas
ni escapar estos datos.

Las variables PHP vinculadas pueden cambiarse y la consulta re-ejecutarse
sin necesidad de analizar de nuevo la consulta o de vincular
de nuevo las variables.

Con Oracle, las variables vinculadas suelen dividirse
en vínculo IN para los valores pasados a la base
de datos, y en vínculo OUT para los valores
a devolver a PHP. Una variable vinculada puede ser a la vez en vínculo
IN y OUT. En este caso,
el hecho de saber si la variable vinculada debe ser utilizada
para la entrada o la salida será determinado en el momento de la ejecución.

Debe especificarse el parámetro max_length
al utilizar el vínculo OUT para que PHP asigne
suficiente memoria para contener el valor de retorno.

Para los vínculos IN, se recomienda
definir el parámetro max_length si la
consulta se ejecuta varias veces con valores diferentes
para las variables PHP. De lo contrario, Oracle puede truncar los datos
a la longitud del valor inicial de la variable PHP. Si no se conoce la
longitud máxima necesaria, entonces llame de nuevo a la función
**oci_bind_by_name()** con los datos actuales, antes de cada llamada a la función
[oci_execute()](#function.oci-execute). El hecho de asociar una longitud
superior a la necesaria tiene un impacto en la memoria
asociada al proceso para la base de datos.

Una llamada a la funcionalidad de asociación de variables
proporciona a Oracle la dirección de memoria a utilizar para leer los datos.
Para los vínculos IN, esta dirección debe contener
datos válidos al llamar a la función
[oci_execute()](#function.oci-execute). Esto significa que la variable vinculada
debe permanecer en el contexto hasta la ejecución. Si no es así, pueden producirse resultados
no esperados, así como errores de tipo "ORA-01460: unimplemented or unreasonable conversion requested".
Para los vínculos OUT, un síntoma puede ser
que no se haya definido ningún valor en la variable PHP.

Para una consulta que se ejecuta varias veces, los valores vinculados que nunca cambian pueden reducir la capacidad del optimizador
de Oracle para elegir el mejor plan de ejecución. Para las consultas que tardan mucho tiempo, que rara vez se llaman varias veces, la asociación
de variables no aporta ningún beneficio. Sin embargo, en los 2 casos,
la asociación es más segura que colocar directamente las cadenas de caracteres en la consulta SQL, sabiendo que existe un riesgo
de filtrado incorrecto de la entrada del usuario.

### Parámetros

     statement


       Un identificador de consulta OCI8 válido.






     param


       El marcador, prefijado por una coma, utilizado en la consulta.
       La coma es opcional en el parámetro
       param.






     var


       La variable PHP a asociar con el marcador del parámetro
       param.






     max_length


       Especifica la longitud máxima para los datos. Si el valor es -1,
       la función utilizará la longitud actual de los datos del parámetro
       var para definir la longitud máxima.
       En este caso, el parámetro var debe existir
       y contener datos al llamar a la función
       **oci_bind_by_name()**.






     type


       El tipo de datos a utilizar por Oracle para tratar
       los datos. Por omisión, vale **[SQLT_CHR](#constant.sqlt-chr)**.
       Oracle convertirá los datos entre este tipo y la columna
       de la base de datos (o las variables de tipo PL/SQL),
       cuando sea posible.




       Si debe vincular tipos abstractos de datos (LOB/ROWID/BFILE),
       deberá asignarlos en primer lugar, con
       [oci_new_descriptor()](#function.oci-new-descriptor). La longitud
       length no sirve para estos tipos y
       debería fijarse a -1.




       Los valores posibles para el parámetro
       type son :



        -

          **[SQLT_FILE](#constant.sqlt-file)** o **[OCI_B_BFILE](#constant.oci-b-bfile)**
          - para los BFILEs ;





        -

          **[SQLT_CFILE](#constant.sqlt-cfile)** o **[OCI_B_CFILEE](#constant.oci-b-cfilee)**
          - para los CFILEs ;





        -

          **[SQLT_CLOB](#constant.sqlt-clob)** o **[OCI_B_CLOB](#constant.oci-b-clob)**
          - para los CLOBs ;





        -

          **[SQLT_BLOB](#constant.sqlt-blob)** o **[OCI_B_BLOB](#constant.oci-b-blob)**
          - para los BLOBs ;





        -

          **[SQLT_RDD](#constant.sqlt-rdd)** o **[OCI_B_ROWID](#constant.oci-b-rowid)**
          - para los ROWIDs ;





        -

          **[SQLT_NTY](#constant.sqlt-nty)** o **[OCI_B_NTY](#constant.oci-b-nty)**
          - para los tipos de datos nombrados ;





        -

          **[SQLT_INT](#constant.sqlt-int)** o **[OCI_B_INT](#constant.oci-b-int)**
          - para los enteros ;





        -

          **[SQLT_CHR](#constant.sqlt-chr)** - para los VARCHAR ;





        -

          **[SQLT_BIN](#constant.sqlt-bin)** o **[OCI_B_BIN](#constant.oci-b-bin)**
          - para las columnas RAW ;





        -

          **[SQLT_LNG](#constant.sqlt-lng)** - para las columnas LONG ;





        -

          **[SQLT_LBI](#constant.sqlt-lbi)** - para las columnas LONG RAW ;





        -

          **[SQLT_RSET](#constant.sqlt-rset)** - para los cursores creados
          con la función [oci_new_cursor()](#function.oci-new-cursor);





        -

          **[SQLT_BOL](#constant.sqlt-bol)** o **[OCI_B_BOL](#constant.oci-b-bol)**
          - para los booleanos (requiere Oracle Database 12c)









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Inserción de datos con la función oci_bind_by_name()**

&lt;?php

// Creación de la tabla con :
// CREATE TABLE mytab (id NUMBER, text VARCHAR2(40));

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn,"INSERT INTO mytab (id, text) VALUES(:id_bv, :text_bv)");

$id = 1;
$text = "Datos a insertar ";
oci_bind_by_name($stid, ":id_bv", $id);
oci_bind_by_name($stid, ":text_bv", $text);
oci_execute($stid);

// La tabla contiene ahora : 1, 'Datos a insertar

?&gt;

    **Ejemplo #2 Una asociación con múltiples llamadas**

&lt;?php

// Creación de la tabla con :
// CREATE TABLE mytab (id NUMBER);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$a = array(1,3,5,7,11); // Datos a insertar

$stid = oci_parse($conn, 'INSERT INTO mytab (id) VALUES (:bv)');
oci_bind_by_name($stid, ':bv', $v, 20);
foreach ($a as $v) {
    $r = oci_execute($stid, OCI_DEFAULT); // No validar automáticamente
}
oci_commit($conn); // Una sola validación

// La tabla contiene ahora 5 líneas : 1, 3, 5, 7, 11

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Asociación con un bucle foreach**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$sql = 'SELECT * FROM departments WHERE department_name = :dname AND location_id = :loc';
$stid = oci_parse($conn, $sql);

$ba = array(':dname' =&gt; 'IT Support', ':loc' =&gt; 1700);

foreach ($ba as $key =&gt; $val) {

    // oci_bind_by_name($stid, $key, $val) no funciona porque
    // asocia cada marcador al mismo lugar : $val
    // en lugar de utilizar el lugar actual de la dato $ba[$key]
    oci_bind_by_name($stid, $key, $ba[$key]);

}

oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
foreach ($row as $item) {
print $item."&lt;br&gt;\n";
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #4 Asociación en una cláusula WHERE**

&lt;?php

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$sql = 'SELECT last_name FROM employees WHERE department_id = :didbv ORDER BY last_name';
$stid = oci_parse($conn, $sql);
$didbv = 60;
oci_bind_by_name($stid, ':didbv', $didbv);
oci_execute($stid);
while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
echo $row['LAST_NAME'] ."&lt;br&gt;\n";
}

// Muestra :
// Austin
// Ernst
// Hunold
// Lorentz
// Pataballa

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #5 Asociación con una cláusula LIKE**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

// Encuentra todos los criterios que comienzan por 'South'
$stid = oci_parse($conn, "SELECT city FROM locations WHERE city LIKE :bv");
$city = 'South%';  // '%' es un comodín en SQL
oci_bind_by_name($stid, ":bv", $city);
oci_execute($stid);
oci_fetch_all($stid, $res);

foreach ($res['CITY'] as $c) {
print $c . "&lt;br&gt;\n";
}
// Muestra :
// South Brunswick
// South San Francisco
// Southlake

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #6 Asociación con REGEXP_LIKE**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

// Encuentra todos los criterios que contienen 'ing'
$stid = oci_parse($conn, "SELECT city FROM locations WHERE REGEXP_LIKE(city, :bv)");
$city = '.*ing.*';
oci_bind_by_name($stid, ":bv", $city);
oci_execute($stid);
oci_fetch_all($stid, $res);

foreach ($res['CITY'] as $c) {
print $c . "&lt;br&gt;\n";
}
// Muestra :
// Beijing
// Singapore

oci_free_statement($stid);
oci_close($conn);

?&gt;

Para algunas condiciones utilizadas en las cláusulas IN, utilice
variables vinculadas individuales. Los valores desconocidos en el momento
de la ejecución podrán definirse a NULL.
Esto permite utilizar una sola consulta para todos los usuarios
de la aplicación, maximizando así la eficacia del caché Oracle DB.

    **Ejemplo #7 Asociación de múltiples valores en una cláusula IN**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$sql = 'SELECT last_name FROM employees WHERE employee_id in (:e1, :e2, :e3)';
$stid = oci_parse($conn, $sql);
$mye1 = 103;
$mye2 = 104;
$mye3 = NULL; // fingimos que no nos fue dado este valor
oci_bind_by_name($stid, ':e1', $mye1);
oci_bind_by_name($stid, ':e2', $mye2);
oci_bind_by_name($stid, ':e3', $mye3);
oci_execute($stid);
oci_fetch_all($stid, $res);
foreach ($res['LAST_NAME'] as $name) {
print $name ."&lt;br&gt;\n";
}

// Muestra :
// Ernst
// Hunold

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #8 Asociación de un ROWID devuelto por una consulta**

&lt;?php

// Creación de la tabla con :
// CREATE TABLE mytab (id NUMBER, salary NUMBER, name VARCHAR2(40));
// INSERT INTO mytab (id, salary, name) VALUES (1, 100, 'Chris');
// COMMIT;

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT ROWID, name FROM mytab WHERE id = :id_bv FOR UPDATE');
$id = 1;
oci_bind_by_name($stid, ':id_bv', $id);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
$rid = $row['ROWID'];
$name = $row['NAME'];

// Modificación del nombre en letra mayúscula &amp; guardado de esta modificación
$name = strtoupper($name);
$stid = oci_parse($conn, 'UPDATE mytab SET name = :n_bv WHERE ROWID = :r_bv');
oci_bind_by_name($stid, ':n_bv', $name);
oci_bind_by_name($stid, ':r_bv', $rid, -1, OCI_B_ROWID);
oci_execute($stid);

// La tabla contiene ahora 1, 100, CHRIS

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #9 Asociación de un ROWID en un INSERT**

&lt;?php

// Este ejemplo inserta un id &amp; un nombre, luego, actualiza el salario
// Creación de la tabla con :
// CREATE TABLE mytab (id NUMBER, salary NUMBER, name VARCHAR2(40));
//
// Basado en el ejemplo original de ROWID, proporcionado por thies at thieso dot net (980221)

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$sql = "INSERT INTO mytab (id, name) VALUES(:id_bv, :name_bv)
RETURNING ROWID INTO :rid";

$ins_stid = oci_parse($conn, $sql);

$rowid = oci_new_descriptor($conn, OCI_D_ROWID);
oci_bind_by_name($ins_stid, ":id_bv",   $id,    10);
oci_bind_by_name($ins_stid, ":name_bv", $name,  32);
oci_bind_by_name($ins_stid, ":rid", $rowid, -1, OCI_B_ROWID);

$sql = "UPDATE mytab SET salary = :salary WHERE ROWID = :rid";
$upd_stid = oci_parse($conn, $sql);
oci_bind_by_name($upd_stid, ":rid", $rowid, -1, OCI_B_ROWID);
oci_bind_by_name($upd_stid, ":salary", $salary, 32);

// ids y nombres a insertar
$data = array(1111 =&gt; "Larry",
2222 =&gt; "Bill",
3333 =&gt; "Jim");

// Salario de cada persona
$salary = 10000;

// Inserción y actualización inmediata de cada línea
foreach ($data as $id =&gt; $name) {
    oci_execute($ins_stid);
oci_execute($upd_stid);
}

$rowid-&gt;free();
oci_free_statement($upd_stid);
oci_free_statement($ins_stid);

// Visualización de las nuevas líneas
$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid);
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    var_dump($row);
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #10 Asociación para una función almacenada PL/SQL**

&lt;?php

// Antes de ejecutar el programa PHP, una función almacenada debe ser creada
// en formato SQL*Plus o SQL Developer :
//
// CREATE OR REPLACE FUNCTION myfunc(p IN NUMBER) RETURN NUMBER AS
// BEGIN
// RETURN p * 3;
// END;

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$p = 8;

$stid = oci_parse($conn, 'begin :r := myfunc(:p); end;');
oci_bind_by_name($stid, ':p', $p);

// El valor devuelto es un vínculo OUT. El tipo por omisión deberá ser
// de tipo string, también, la asociación sobre una longitud de 40 significa
// que la cadena devuelta tendrá como máximo 40 caracteres.
oci_bind_by_name($stid, ':r', $r, 40);

oci_execute($stid);

print "$r\n"; // Muestra 24

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #11 Asociación de parámetros a un procedimiento almacenado PL/SQL**

&lt;?php

// Antes de ejecutar el programa PHP, un procedimiento almacenado debe ser creado
// en formato SQL*Plus o SQL Developer :
//
// CREATE OR REPLACE PROCEDURE myproc(p1 IN NUMBER, p2 OUT NUMBER) AS
// BEGIN
// p2 := p1 * 2;
// END;

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$p1 = 8;

$stid = oci_parse($conn, 'begin myproc(:p1, :p2); end;');
oci_bind_by_name($stid, ':p1', $p1);

// El segundo parámetro del procedimiento almacenado es un vínculo OUT.
// El tipo por omisión deberá ser de tipo string, también,
// la asociación sobre una longitud de 40 significa
// que la cadena devuelta tendrá como máximo 40 caracteres.

oci_bind_by_name($stid, ':p2', $p2, 40);

oci_execute($stid);

print "$p2\n"; // Muestra 16

oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #12 Asociación sobre una columna CLOB**

&lt;?php

// Antes de la ejecución, es necesario crear la tabla :
// CREATE TABLE mytab (mykey NUMBER, myclob CLOB);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$mykey = 12343; // Clave arbitraria para el ejemplo ;

$sql = "INSERT INTO mytab (mykey, myclob)
VALUES (:mykey, EMPTY_CLOB())
RETURNING myclob INTO :myclob";

$stid = oci_parse($conn, $sql);
$clob = oci_new_descriptor($conn, OCI_D_LOB);
oci_bind_by_name($stid, ":mykey", $mykey, 5);
oci_bind_by_name($stid, ":myclob", $clob, -1, OCI_B_CLOB);
oci_execute($stid, OCI_DEFAULT);
$clob-&gt;save("A very long string");

oci_commit($conn);

// Recuperación de los datos CLOB

$query = 'SELECT myclob FROM mytab WHERE mykey = :mykey';

$stid = oci_parse ($conn, $query);
oci_bind_by_name($stid, ":mykey", $mykey, 5);
oci_execute($stid);

print '&lt;table border="1"&gt;';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_LOBS)) {
print '&lt;tr&gt;&lt;td&gt;'.$row['MYCLOB'].'&lt;/td&gt;&lt;/tr&gt;';
    // En un bucle, el hecho de liberar la variable antes de la recuperación de
    // la línea siguiente reduce el uso de memoria de PHP
    unset($row);
}
print '&lt;/table&gt;';

?&gt;

**Ejemplo #13 Asociación sobre un booleano en un script PL/SQL**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$plsql =
"begin
:output1 := true;
:output2 := false;
end;";

$s = oci_parse($c, $plsql);
oci_bind_by_name($s, ':output1', $output1, -1, OCI_B_BOL);
oci_bind_by_name($s, ':output2', $output2, -1, OCI_B_BOL);
oci_execute($s);
var_dump($output1);  // true
var_dump($output2); // false

?&gt;

### Notas

**Advertencia**

    No utilice la función [addslashes()](#function.addslashes) y
    **oci_bind_by_name()** simultáneamente, ya que no es necesario añadir
    comillas. Si es así, entonces las comillas añadidas
    serán escritas en la base de datos ; de hecho, la función
    **oci_bind_by_name()** inserta los datos sin procesar
    y no elimina ni las comillas añadidas, ni los caracteres de escape.

**Nota**:

    Si asocia una cadena de caracteres a una columna
    de tipo CHAR en una cláusula
    WHERE, recuerde que Oracle utiliza una comparación
    añadiendo caracteres vacíos para las columnas de tipo
    CHAR. Por lo tanto, su variable PHP debe ser
    completada con caracteres vacíos para alcanzar la misma longitud
    que la columna para que la cláusula WHERE funcione.

**Nota**:

    El argumento PHP var es una referencia.
    Por lo tanto, algunos formatos de bucle pueden no funcionar como se espera :






&lt;?php
foreach ($myarray as $key =&gt; $value)  {
    oci_bind_by_name($stid, $key, $value);
}
?&gt;

    Esto asocia cada clave al valor apuntado por $value,
    por lo tanto, todas las variables asociadas apuntan hacia el
    valor de la última iteración del bucle.
    En su lugar, utilice esto :






&lt;?php
foreach ($myarray as $key =&gt; $value) {
    oci_bind_by_name($stid, $key, $myarray[$key]);
}
?&gt;

### Ver también

    - [oci_bind_array_by_name()](#function.oci-bind-array-by-name) - Asocia un array PHP a un parámetro de array Oracle PL/SQL

    - [oci_parse()](#function.oci-parse) - Prepara una consulta SQL con Oracle

# oci_cancel

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_cancel — Cancela la lectura del cursor

### Descripción

**oci_cancel**([resource](#language.types.resource) $statement): [bool](#language.types.boolean)

Invalida un cursor, liberando todos los recursos asociados y cancela la
capacidad para leer desde él.

### Parámetros

     statement


       Una sentencia de OCI.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# oci_client_version

(PHP 5 &gt;= 5.3.7, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.6)

oci_client_version — Devuelve la versión de la biblioteca cliente Oracle

### Descripción

**oci_client_version**(): [string](#language.types.string)

Devuelve un [string](#language.types.string) que contiene el número de versión
de la biblioteca cliente Oracle C, a la cual PHP está ligada.

### Parámetros

Ninguno.

### Valores devueltos

Devuelve el número de versión, en forma de un [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_client_version()**

&lt;?php
echo "Client Version: " . oci_client_version(); // Versión del cliente: 19.9.0.0.0
?&gt;

### Notas

**Nota**:

    Las bibliotecas Oracle anteriores a la 10*g*R2 no poseían
    funcionalidad interna para recuperar el número
    de versión de la biblioteca. La cadena "Unknow" será devuelta
    en este caso.

### Ver también

    - [oci_server_version()](#function.oci-server-version) - Devuelve la versión del servidor Oracle

# oci_close

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_close — Cierra una conexión Oracle

### Descripción

**oci_close**([resource](#language.types.resource) $connection): [?](#language.types.null)[bool](#language.types.boolean)

Cierra una conexión connection Oracle.
La conexión será cerrada si ninguna recurso la utiliza y si
fue creada con la función [oci_connect()](#function.oci-connect)
o la función [oci_new_connect()](#function.oci-new-connect).

Se recomienda cerrar las conexiones que ya no sean necesarias,
liberando así más recursos para otros usuarios.

### Parámetros

     connection


       Un identificador de conexión Oracle, retornado por la función
       [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect),
       o [oci_new_connect()](#function.oci-new-connect).





### Valores devueltos

Retorna **[null](#constant.null)** cuando [oci8.old_oci_close_semantics](#ini.oci8.old-oci-close-semantics)
está activado, **[true](#constant.true)** en caso contrario.

### Ejemplos

**Ejemplo #1 Cierre de una conexión**

    Los recursos asociados con una conexión deben ser cerrados
    para asegurar a la base de datos subyacente el fin de
    las operaciones y así liberar los recursos.

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM departments');
$r = oci_execute($stid);
oci_fetch_all($stid, $res);
var_dump($res);

// Liberación del identificador de consulta al cerrar la conexión
oci_free_statement($stid);
oci_close($conn);

?&gt;

**Ejemplo #2 Las conexiones a la base de datos son cerradas cuando las referencias lo son**

    El identificador interno que cuenta las conexiones debe valer cero
    para poder cerrar la conexión.

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM departments'); // esto incrementa el contador interno $conn
oci_execute($stid);
oci_fetch_all($stid, $res);
var_dump($res);

oci_close($conn);

// $conn ya no es utilizable en el script pero la conexión subyacente a
// la base de datos sigue abierta mientras $stid no sea liberada.
var_dump($conn); // muestra NULL

// Mientras PHP espera, el hecho de consultar la vista V$SESSION de Oracle
// en un terminal mostrará que un usuario sigue conectado.
sleep(10);

// Cuando $stid es liberada, la conexión a la base de datos será físicamente cerrada
oci_free_statement($stid);

// Mientras PHP espera, el hecho de consultar la vista V$SESSION de Oracle
// en un terminal mostrará que el usuario se ha desconectado.
sleep(10);

?&gt;

**Ejemplo #3 Cierre de una conexión abierta más de una vez**

    Cuando se reutilizan identificadores de base de datos, todas las conexiones
    deben ser cerradas antes de que la conexión subyacente a la base de datos lo sea realmente.

&lt;?php

$conn1 = oci_connect('hr', 'welcome', 'localhost/XE');

// La utilización de los mismos identificadores reutiliza la misma conexión subyacente a la base de datos.
// Todas las modificaciones no confirmadas realizadas sobre $conn1 serán visibles sobre $conn2.
$conn2 = oci_connect('hr', 'welcome', 'localhost/XE');

// Mientras PHP espera, el hecho de consultar la vista V$SESSION de Oracle
// en un terminal mostrará que un solo usuario está conectado.
sleep(10);

oci_close($conn1); // no cierra la conexión subyacente a la base de datos
var_dump($conn1); // muestra NULL ya que la variable $conn1 ya no es utilizable
var_dump($conn2); // muestra que $conn2 sigue siendo un recurso de conexión válido

?&gt;

**Ejemplo #4 Las conexiones son cerradas cuando las variables salen del contexto**

    Cuando todas las variables que referencian una conexión salen del contexto
    y son liberadas por PHP, se produce un rollback (si es necesario) y la conexión
    subyacente a la base de datos es cerrada.

&lt;?php

function myfunc() {
$conn = oci_connect('hr', 'hrpwd', 'localhost/XE');
    if (!$conn) {
$e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

    $stid = oci_parse($conn, 'UPDATE mytab SET id = 100');
    oci_execute($stid, OCI_NO_AUTO_COMMIT);
    return "Finished";

}

$r = myfunc();
// En este momento, se produce un rollback y la conexión subyacente a la base de datos es cerrada.

print $r; // muestra el valor de retorno de la función "Finished"

?&gt;

### Notas

**Nota**:

    Las variables que dependen del identificador de conexión,
    como los identificadores de consulta retornados por la función
    [oci_parse()](#function.oci-parse), deben ser liberadas antes de
    intentar cerrar la conexión subyacente a la base de datos.

**Nota**:

    La función **oci_close()** no cierra las conexiones subyacentes
    a la base de datos creadas por la función [oci_pconnect()](#function.oci-pconnect).

### Ver también

    - [oci_connect()](#function.oci-connect) - Establece una conexión con un servidor Oracle

    - [oci_free_statement()](#function.oci-free-statement) - Libera todos los recursos asociados con una sentencia o cursor

# oci_commit

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_commit — Valida las transacciones Oracle en curso

### Descripción

**oci_commit**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Valida todas las transacciones en curso en la conexión Oracle
connection. Una validación hace permanentes
todas las modificaciones, liberando todos los bloqueos.

Una transacción comienza cuando se ejecuta la primera consulta SQL
que modifica datos con la función
[oci_execute()](#function.oci-execute) utilizando el flag
**[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**. Las modificaciones siguientes
realizadas por otras consultas forman parte de la misma transacción. Los datos
modificados por una transacción son temporales hasta que la transacción sea
validada o revertida. Otros usuarios de la base de datos no verán estas
modificaciones hasta que la transacción sea validada.

Al insertar o actualizar datos, el uso de transacciones es recomendado
para garantizar la consistencia relacional de los datos, así como para
mejorar el rendimiento.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect),
       o [oci_new_connect()](#function.oci-new-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_commit()**

&lt;?php

// Inserción en múltiples tablas, con cancelación de las modificaciones si ocurren errores

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, "INSERT INTO mysalary (id, name) VALUES (1, 'Chris')");

// El flag OCI_NO_AUTO_COMMIT indica a Oracle que no valide las inserciones automáticamente.
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {
    $e = oci_error($stid);
trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, 'INSERT INTO myschedule (startday) VALUES (12)');
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {
    $e = oci_error($stid);
oci_rollback($conn);  // Cancelación de las modificaciones en las 2 tablas
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

// Valida las modificaciones en las 2 tablas
$r = oci_commit($conn);
if (!$r) {
    $e = oci_error($conn);
trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

?&gt;

### Notas

**Nota**:

    Las transacciones son automáticamente revertidas al cerrar la conexión,
    o cuando el script finaliza, cualquiera de los dos que ocurra primero.
    Debe llamarse explícitamente a la función
    **oci_commit()** para validar la transacción.




    Cada llamada a la función [oci_execute()](#function.oci-execute) que
    utiliza el modo **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)**
    explícitamente o por omisión, validará todas las transacciones
    no validadas hasta ese punto.




    Todas las consultas Oracle como CREATE
    o DROP también validarán todas las
    transacciones no validadas.

### Ver también

    - [oci_execute()](#function.oci-execute) - Ejecuta un comando SQL de Oracle

    - [oci_rollback()](#function.oci-rollback) - Anula las transacciones Oracle en curso

# oci_connect

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_connect — Establece una conexión con un servidor Oracle

### Descripción

**oci_connect**(
    [string](#language.types.string) $username,
    [string](#language.types.string) $password,
    [?](#language.types.null)[string](#language.types.string) $connection_string = **[null](#constant.null)**,
    [string](#language.types.string) $encoding = "",
    [int](#language.types.integer) $session_mode = **[OCI_DEFAULT](#constant.oci-default)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Devuelve un identificador de conexión, necesario para la mayoría de las llamadas OCI8.

Para mejorar el rendimiento, la mayoría de las aplicaciones deberían utilizar
conexiones persistentes con [oci_pconnect()](#function.oci-pconnect) en lugar de
**oci_connect()**.
Consulte la sección sobre [la gestión de conexiones](#oci8.connection)
para obtener información general sobre la gestión de conexiones y el agrupamiento de conexiones.

Las llamadas siguientes (tras la primera) a la función **oci_connect()**
con los mismos parámetros devolverán el manejador de conexión
devuelto en la primera llamada. Esto significa que las transacciones realizadas
sobre un manejador estarán activas en los demás, siempre que utilicen
la _misma_ conexión subyacente. Si 2 manejadores deben tener
transacciones aisladas, utilice en su lugar la función [oci_new_connect()](#function.oci-new-connect).

### Parámetros

     username


       El nombre de usuario de Oracle.






     password


       La contraseña del usuario.






     connection_string



Contiene la instancia Oracle a la que debemos conectarnos.
Esto puede ser una [» cadena de conexión
rápida](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-E5358DEA-D619-4B7B-A799-3D2F802500F1), un nombre de conexión del archivo tnsnames.ora,
o el nombre de una instancia local Oracle.

Si no se especifica o es **[null](#constant.null)**, PHP utiliza variables de entorno como **[TWO_TASK](#constant.two-task)** (en Linux)
o **[LOCAL](#constant.local)** (en Windows)
y **[ORACLE_SID](#constant.oracle-sid)** para determinar la instancia
Oracle a la que debemos conectarnos.

Para usar el método de conexión rápida, PHP debe estar vinculado con la biblioteca
cliente Oracle 10*g* o superior. La cadena de conexión rápida para Oracle
10*g* o superior es de la forma:
_[//]host_name[:port][/service_name]_. Desde Oracle
11*g*, la sintaxis es:
_[//]host_name[:port][/service_name][:server_type][/instance_name]_.
Opciones adicionales fueron introducidas con Oracle 19c
Los nombres de los servicios pueden ser encontrados ejecutando la utilidad
Oracle lsnrctl status en la máquina que ejecuta
la base de datos.

El archivo tnsnames.ora puede estar en el camino
de búsqueda de Oracle Net, que incluye
/your/path/to/instantclient/network/admin, $ORACLE_HOME/network/admin
y /etc.
Una solución alternativa sería definir TNS_ADMIN
para que el archivo $TNS_ADMIN/tnsnames.ora sea leído.
Asegúrese de que el demonio que ejecuta el servidor web tenga acceso de lectura a este
archivo.

     encoding

      Determina

el juego de caracteres utilizado por la biblioteca cliente Oracle. El juego de
caracteres no necesita ser idéntico al utilizado por la base de datos.
Si no coincide, Oracle hará lo mejor posible para convertir los datos
desde el juego de caracteres de la base de datos. Dependiendo de los juegos de caracteres,
el resultado puede no ser perfecto. Además, esta conversión
requiere un poco de tiempo del sistema.

Si no se especifica, la biblioteca
cliente Oracle determinará un juego de caracteres desde la variable de entorno
**[NLS_LANG](#constant.nls-lang)**.

Pasar este parámetro puede
reducir el tiempo de conexión.

     session_mode

      Este parámetro

está disponible a partir de PHP 5 (PECL OCI8 1.1) y acepta los siguientes valores:
**[OCI_DEFAULT](#constant.oci-default)**, **[OCI_SYSOPER](#constant.oci-sysoper)** y
**[OCI_SYSDBA](#constant.oci-sysdba)**.
Si bien la constante **[OCI_SYSOPER](#constant.oci-sysoper)** o la constante
**[OCI_SYSDBA](#constant.oci-sysdba)** es especificada, esta función intentará establecer
una conexión privilegiada usando identidades externas. Las
conexiones privilegiadas están desactivadas por omisión. Para activarlas, debe
definir la opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
a On.

PHP 5.3 (PECL OCI8 1.3.4) introducen el valor de modo
**[OCI_CRED_EXT](#constant.oci-cred-ext)**. Este modo solicita a Oracle usar una
identificación externa o bien del sistema operativo, que debe ser
configurada en la base de datos. El flag **[OCI_CRED_EXT](#constant.oci-cred-ext)**
solo puede ser usado con el nombre de usuario "/" asociado a una contraseña vacía.
La opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
puede ser definida a On o Off.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** puede ser combinado con el modo
**[OCI_SYSOPER](#constant.oci-sysoper)** o el modo
**[OCI_SYSDBA](#constant.oci-sysdba)**.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** no es soportado en Windows por razones de seguridad.

### Valores devueltos

Devuelve un identificador de conexión o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       connection_string ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con oci_connect()** utilizando la sintaxis simplificada

&lt;?php

// Conexión al servicio XE (es decir, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

    **Ejemplo #2 Ejemplo con oci_connect()** utilizando un nombre de conexión de red

&lt;?php

// Conexión a la base de datos MYDB descrita en el archivo tnsnames.ora,
// Un ejemplo de entrada tnsnames.ora para MYDB podría ser:
// MYDB =
// (DESCRIPTION =
// (ADDRESS = (PROTOCOL = TCP)(HOST = mymachine.oracle.com)(PORT = 1521))
// (CONNECT_DATA =
// (SERVER = DEDICATED)
// (SERVICE_NAME = XE)
// )
// )

$conn = oci_connect('hr', 'welcome', 'MYDB');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

    **Ejemplo #3 Ejemplo con oci_connect()** utilizando un juego de caracteres específico

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE', 'AL32UTF8');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

    **Ejemplo #4 Ejemplo con múltiples llamadas a la función oci_connect()**

&lt;?php

$c1 = oci_connect("hr", "welcome", 'localhost/XE');
$c2 = oci_connect("hr", "welcome", 'localhost/XE');

// Tanto $c1 como $c2 muestran el mismo identificador de recursos PHP, lo que significa
// que se trata de la misma conexión a la base de datos
echo "c1 is $c1&lt;br&gt;\n";
echo "c2 is $c2&lt;br&gt;\n";

function create_table($conn)
{
    $stmt = oci_parse($conn, "create table hallo (test varchar2(64))");
oci_execute($stmt);
echo "Created table&lt;br&gt;\n";
}

function drop_table($conn)
{
    $stmt = oci_parse($conn, "drop table hallo");
oci_execute($stmt);
echo "Dropped table&lt;br&gt;\n";
}

function insert_data($connname, $conn)
{
    $stmt = oci_parse($conn, "insert into hallo
values(to_char(sysdate,'DD-MON-YY HH24:MI:SS'))");
oci_execute($stmt, OCI_DEFAULT);
    echo "$connname inserted row without committing&lt;br&gt;\n";
}

function rollback($connname, $conn)
{
    oci_rollback($conn);
echo "$connname rollback&lt;br&gt;\n";
}

function select_data($connname, $conn)
{
    $stmt = oci_parse($conn, "select \* from hallo");
oci_execute($stmt, OCI_DEFAULT);
    echo "$connname ----selecting&lt;br&gt;\n";
while (oci_fetch($stmt)) {
        echo "    " . oci_result($stmt, "TEST") . "&lt;br&gt;\n";
}
echo "$connname ----done&lt;br&gt;\n";
}

create_table($c1);

insert_data('c1', $c1); // Inserta una fila utilizando c1
sleep(2); // Se espera para ver un timestamp diferente para la segunda fila
insert_data('c2', $c2); // Inserta una fila utilizando c2

select_data('c1', $c1); // Se devuelven los resultados de las 2 inserciones
select_data('c2', $c2); // Se devuelven los resultados de las 2 inserciones

rollback('c1', $c1); // Revertir la transacción utilizando c1

select_data('c1', $c1); // Las 2 inserciones han sido revertidas
select_data('c2', $c2);

drop_table($c1);

// El cierre de una conexión hace que las variables PHP sean inaccesibles, pero las demás
// pueden seguir siendo utilizadas
oci_close($c1);
echo "c1 is $c1&lt;br&gt;\n";
echo "c2 is $c2&lt;br&gt;\n";

// Salida:
// c1 is Resource id #5
// c2 is Resource id #5
// Created table
// c1 inserted row without committing
// c2 inserted row without committing
// c1 ----selecting
// 09-DEC-09 12:14:43
// 09-DEC-09 12:14:45
// c1 ----done
// c2 ----selecting
// 09-DEC-09 12:14:43
// 09-DEC-09 12:14:45
// c2 ----done
// c1 rollback
// c1 ----selecting
// c1 ----done
// c2 ----selecting
// c2 ----done
// Dropped table
// c1 is
// c2 is Resource id #5

?&gt;

### Notas

**Nota**:

    Si ha ocurrido un problema durante la instalación de la extensión OCI8,
    una de las manifestaciones será un problema durante la conexión.
    Consulte la sección [Instalación/Configuración](#oci8.setup)
    para obtener más información en caso de errores.

### Ver también

    - [oci_pconnect()](#function.oci-pconnect) - Establece una conexión persistente a un servidor Oracle

    - [oci_new_connect()](#function.oci-new-connect) - Conexión al servidor Oracle utilizando una sola conexión

    - [oci_close()](#function.oci-close) - Cierra una conexión Oracle

# oci_define_by_name

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_define_by_name — Asocia una variable PHP con una columna para una consulta de recuperación de datos

### Descripción

**oci_define_by_name**(
    [resource](#language.types.resource) $statement,
    [string](#language.types.string) $column,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $type = 0
): [bool](#language.types.boolean)

Asocia una variable PHP con una columna para una consulta de recuperación de
datos utilizando la función [oci_fetch()](#function.oci-fetch).

La llamada a la función **oci_define_by_name()** debe realizarse
antes de la ejecución de la función [oci_execute()](#function.oci-execute).

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

     column


       El nombre de la columna utilizado en la consulta.




       Utilice un nombre en mayúsculas para los nombres de columna no sensibles a
       la casilla (por omisión bajo Oracle). Utilice la casilla exacta del nombre
       de la columna para los nombres de columna sensibles a la casilla.






     var


       La variable PHP que contendrá el valor devuelto por la columna.






     type


       El tipo de datos a devolver. En general, este argumento no es necesario.
       Tenga en cuenta que el estilo Oracle de conversión de datos no se
       aplica aquí. Por ejemplo, **[SQLT_INT](#constant.sqlt-int)** será ignorado y
       el tipo de datos devuelto será **[SQLT_CHR](#constant.sqlt-chr)**.




       Puede utilizar, opcionalmente, la función
       [oci_new_descriptor()](#function.oci-new-descriptor) para asignar descriptores
       LOB/ROWID/BFILE.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_define_by_name()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT location_id, city FROM locations WHERE location_id &lt; 1200';
$stid = oci_parse($conn, $sql);

// Las definiciones DEBEN realizarse antes de la ejecución de la consulta
oci_define_by_name($stid, 'LOCATION_ID', $locid);
oci_define_by_name($stid, 'CITY', $city);

oci_execute($stid);

// Cada recuperación poblará las variables previamente definidas con los datos de la siguiente línea
while (oci_fetch($stid)) {
echo "Location id $locid is $city&lt;br&gt;\n";
}

// Muestra:
// Location id 1000 is Roma
// Location id 1100 is Venice

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Ejemplo con oci_define_by_name()** y nombres de columna sensibles a la casilla

&lt;?php

/_
Antes de la ejecución, cree la tabla siguiente con un nombre de columna sensible a la casilla:
CREATE TABLE mytab (id NUMBER, "MyDescription" VARCHAR2(30));
INSERT INTO mytab (id, "MyDescription") values (1, 'Iced Coffee');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM mytab');

// Utilice mayúsculas para los nombres de columna no sensibles a la casilla
oci_define_by_name($stid, 'ID', $id);

// Utilice la casilla exacta para los nombres de columnas sensibles a la casilla
oci_define_by_name($stid, 'MyDescription', $mydesc);

oci_execute($stid);

while (oci_fetch($stid)) {
echo "id $id is $mydesc&lt;br&gt;\n";
}

// Muestra:
// id 1 is Iced Coffee

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Ejemplo con oci_define_by_name()** y columnas de tipo LOB

&lt;?php

/_
Antes de la ejecución, cree la tabla siguiente:
CREATE TABLE mytab (id NUMBER, fruit CLOB);
INSERT INTO mytab (id, fruit) values (1, 'apple');
INSERT INTO mytab (id, fruit) values (2, 'orange');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM mytab');

// Las definiciones DEBEN realizarse antes de la ejecución
oci_define_by_name($stid, 'ID', $id);
oci_define_by_name($stid, 'FRUIT', $fruit); // $fruit se convertirá en un descriptor LOB

oci_execute($stid);

while (oci_fetch($stid)) {
echo $id . " is " . $fruit-&gt;load(100) . "&lt;br&gt;\n";
}

// Muestra:
// 1 is apple
// 2 is orange

$fruit-&gt;free();
oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #4 Ejemplo con oci_define_by_name()** y un tipo explícito

&lt;?php

/_
Antes de la ejecución, cree la tabla siguiente:
CREATE TABLE mytab (id NUMBER, fruit CLOB);
INSERT INTO mytab (id, fruit) values (1, 'apple');
INSERT INTO mytab (id, fruit) values (2, 'orange');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM mytab');

// Las definiciones DEBEN realizarse antes de la ejecución
oci_define_by_name($stid, 'ID', $id);

$fruit = oci_new_descriptor($conn, OCI_D_LOB);
oci_define_by_name($stid, 'FRUIT', $fruit, OCI_D_CLOB);

oci_execute($stid);

while (oci_fetch($stid)) {
echo $id . " is " . $fruit-&gt;load(100) . "&lt;br&gt;\n";
}

// Muestra:
// 1 is apple
// 2 is orange

$fruit-&gt;free();
oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_new_descriptor()](#function.oci-new-descriptor) - Inicializa un nuevo puntero vacío de LOB/FILE de Oracle

# oci_error

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_error — Devuelve el último error de Oracle

### Descripción

**oci_error**([?](#language.types.null)[resource](#language.types.resource) $connection_or_statement = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve el último error de Oracle.

La función debe ser llamada inmediatamente después de que ocurra un error.
Los errores son reinicializados después de una consulta exitosa.

### Parámetros

     connection_or_statement


       Para la mayoría de los errores, el argumento connection_or_statement
       representa un recurso de conexión. Para los errores de conexión con las funciones
       [oci_connect()](#function.oci-connect), [oci_new_connect()](#function.oci-new-connect) o
       [oci_pconnect()](#function.oci-pconnect), **[null](#constant.null)** debe ser pasado.





### Valores devueltos

Si no se encuentra ningún error, **oci_error()** devuelve
**[false](#constant.false)**. De lo contrario, **oci_error()** devuelve la información sobre
el error en forma de un array asociativo.

    <caption>**Descripción del array devuelto por oci_error()**</caption>



       Clave del array
       Tipo
       Descripción






       code
       [int](#language.types.integer)

        El número de error de Oracle.




       message
       [string](#language.types.string)

        El texto del error de Oracle.




       offset
       [int](#language.types.integer)

        La posición del byte del error en la consulta SQL. Si no hay
        consulta, 0 será colocado como valor.




       sqltext
       [string](#language.types.string)

        El texto de la consulta SQL. Si no hay consulta,
        será una cadena vacía.





### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       connection_or_statement ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo de visualización de un mensaje de error de Oracle después de un error
     de conexión**

&lt;?php
$conn = oci_connect("hr", "welcome", "localhost/XE");
if (!$conn) {
$e = oci_error();   // Para los errores oci_connect, no se pasa un manejador de conexión
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
?&gt;

    **Ejemplo #2 Ejemplo de visualización de un mensaje de error de Oracle después de un error
     de análisis**

&lt;?php
$stid = oci_parse($conn, "select ' from dual"); // Note el error con las comillas
if (!$stid) {
    $e = oci_error($conn); // Para los errores oci_parse, se pasa el manejador de conexión
trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
?&gt;

    **Ejemplo #3 Ejemplo de visualización de un mensaje de error de Oracle después de un error
     de ejecución encontrado en una consulta SQL**

&lt;?php
$stid = oci_parse($conn, "select does_not_exist from dual");
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid); // Para los errores oci_execute, se pasa el manejador de conexión
print htmlentities($e['message']);
    print "\n&lt;pre&gt;\n";
    print htmlentities($e['sqltext']);
printf("\n%".($e['offset']+1)."s", "^");
print "\n&lt;/pre&gt;\n";
}
?&gt;

# oci_execute

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_execute — Ejecuta un comando SQL de Oracle

### Descripción

**oci_execute**([resource](#language.types.resource) $statement, [int](#language.types.integer) $mode = **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)**): [bool](#language.types.boolean)

Ejecuta una consulta statement previamente
devuelta por la función [oci_parse()](#function.oci-parse).

Tras la ejecución, las consultas como INSERT
tendrán por omisión los datos validados (cometidos) en la base de datos.
Para consultas como SELECT, la ejecución
realiza la lógica de la consulta. Los resultados de la consulta
pueden ser recuperados por PHP con funciones como
[oci_fetch_array()](#function.oci-fetch-array).

Cada consulta analizada puede ser ejecutada varias veces, por lo que
no es necesario analizarlas de nuevo. Esto es práctico para consultas
de tipo INSERT cuando los datos están vinculados
mediante la función [oci_bind_by_name()](#function.oci-bind-by-name).

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     mode


       Un segundo argumento opcional puede tomar una de las constantes siguientes:



        <caption>**Modos de ejecución**</caption>



           Constante
           Descripción






           **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)**
           Validación automática en la conexión cuando la consulta
            ha sido ejecutada con éxito. Este es el comportamiento por omisión.



           **[OCI_DESCRIBE_ONLY](#constant.oci-describe-only)**
           Hace disponibles los metadatos de la consulta a funciones
            como [oci_field_name()](#function.oci-field-name) pero no crea un conjunto de resultados. Cualquier llamada a funciones de recuperación como
            [oci_fetch_array()](#function.oci-fetch-array) fallará.



           **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**
           No valida automáticamente las modificaciones.








       El uso del modo **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)** inicia
       o continúa una transacción. Las transacciones son automáticamente anuladas
       cuando la conexión se cierra o cuando el script termina.
       Llame explícitamente a la función [oci_commit()](#function.oci-commit) para
       validar la transacción o a la función [oci_rollback()](#function.oci-rollback)
       para anularla.




       Al insertar o actualizar datos, el uso de transacciones es altamente recomendado
       para garantizar la consistencia relacional de los datos, así como por un
       significativo aumento de rendimiento.




       Si el modo **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)** es utilizado para
       todas las operaciones incluyendo consultas, y las funciones
       [oci_commit()](#function.oci-commit) y [oci_rollback()](#function.oci-rollback)
       nunca son llamadas, OCI8 realizará una anulación al final del
       script incluso si los datos han cambiado. Para evitar este comportamiento,
       la mayoría de los scripts no utiliza el modo
       **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)** para consultas o
       procedimientos almacenados PL/SQL. Asegúrese de la consistencia
       transaccional apropiada de sus aplicaciones al utilizar
       la función **oci_execute()** con diferentes modos en
       el mismo script.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_execute()** para consultas

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

    **Ejemplo #2 Ejemplo con oci_execute()** sin especificar modo

&lt;?php

// Antes de la ejecución, cree la tabla:
// CREATE TABLE MYTABLE (col1 NUMBER);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'INSERT INTO mytab (col1) VALUES (123)');

oci_execute($stid); // La fila es validada y es inmediatamente visible por otros usuarios

?&gt;

    **Ejemplo #3 Ejemplo con oci_execute()** y **[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**

&lt;?php

// Antes de la ejecución, cree la tabla:
// CREATE TABLE MYTABLE (col1 NUMBER);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'INSERT INTO mytab (col1) VALUES (:bv)');
oci_bind_by_name($stid, ':bv', $i, 10);
for ($i = 1; $i &lt;= 5; ++$i) {
oci_execute($stid, OCI_NO_AUTO_COMMIT);
}
oci_commit($conn); // valida todos los nuevos valores: 1, 2, 3, 4, 5

?&gt;

    **Ejemplo #4 Ejemplo con oci_execute()** y diferentes modos en el mismo script

&lt;?php

// Antes de la ejecución, cree la tabla:
// CREATE TABLE MYTABLE (col1 NUMBER);

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'INSERT INTO mytab (col1) VALUES (123)');
oci_execute($stid, OCI_NO_AUTO_COMMIT); // datos no cometidos

$stid = oci_parse($conn, 'INSERT INTO mytab (col1) VALUES (456)');
oci_execute($stid); // valida tanto los valores 123 como 456

?&gt;

    **Ejemplo #5 Ejemplo con oci_execute()** y
     **[OCI_DESCRIBE_ONLY](#constant.oci-describe-only)**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT \* FROM locations');
oci_execute($s, OCI_DESCRIBE_ONLY);
for ($i = 1; $i &lt;= oci_num_fields($stid); ++$i) {
    echo oci_field_name($stid, $i) . "&lt;br&gt;\n";
}

?&gt;

### Notas

**Nota**:

    Las transacciones son automáticamente anuladas cuando las conexiones
    se cierran, o cuando el script termina, según lo que ocurra primero.
    Llame explícitamente a la función [oci_commit()](#function.oci-commit) para validar
    una transacción.




    Cualquier llamada a la función **oci_execute()** que utilice el modo
    **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)** explícita o implícitamente
    validará todas las transacciones en curso.




    Todas las consultas Oracle DDL como CREATE
    o DROP validarán todas las transacciones en curso.

**Nota**:

    Debido a que la función **oci_execute()** generalmente envía
    la consulta a la base de datos, la función
    **oci_execute()** puede identificar errores de sintaxis
    de la consulta que la función [oci_parse()](#function.oci-parse) pudo no detectar.

### Ver también

    - [oci_parse()](#function.oci-parse) - Prepara una consulta SQL con Oracle

# oci_fetch

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch — Lee la siguiente línea de un resultado Oracle en un buffer interno

### Descripción

**oci_fetch**([resource](#language.types.resource) $statement): [bool](#language.types.boolean)

Lee la siguiente línea de una consulta en un buffer interno accesible
bien mediante la función [oci_result()](#function.oci-result), o utilizando
las variables previamente definidas con la función
[oci_define_by_name()](#function.oci-define-by-name).

Consulte la función [oci_fetch_array()](#function.oci-fetch-array) para obtener
información genérica sobre la recuperación de datos.

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si no hay más líneas
disponibles para la consulta statement.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch()** y variables definidas

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT location_id, city FROM locations WHERE location_id &lt; 1200';
$stid = oci_parse($conn, $sql);

// La definición debe realizarse ANTES de la ejecución
oci_define_by_name($stid, 'LOCATION_ID', $locid);
oci_define_by_name($stid, 'CITY', $city);

oci_execute($stid);

// Cada recuperación utiliza las variables previamente definidas con los datos de la siguiente línea
while (oci_fetch($stid)) {
echo "Location id $locid is $city&lt;br&gt;\n";
}

// Muestra:
// Location id 1000 is Roma
// Location id 1100 is Venice

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Ejemplo con oci_fetch()** y [oci_result()](#function.oci-result)

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT location_id, city FROM locations WHERE location_id &lt; 1200';
$stid = oci_parse($conn, $sql);
oci_execute($stid);

while (oci_fetch($stid)) {
    echo oci_result($stid, 'LOCATION_ID') . " is ";
echo oci_result($stid, 'CITY') . "&lt;br&gt;\n";
}

// Muestra:
// 1000 is Roma
// 1100 is Venice

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    Esta función no devolverá líneas desde el conjunto de resultados implícito
    de una base de datos Oracle. Utilice en su lugar la función
    [oci_fetch_array()](#function.oci-fetch-array).

### Ver también

    - [oci_define_by_name()](#function.oci-define-by-name) - Asocia una variable PHP con una columna para una consulta de recuperación de datos

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

    - [oci_result()](#function.oci-result) - Devuelve el valor de una columna en un resultado Oracle

# oci_fetch_all

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch_all — Lee múltiples líneas de un resultado en un array multidimensional

### Descripción

**oci_fetch_all**(
    [resource](#language.types.resource) $statement,
    [array](#language.types.array) &amp;$output,
    [int](#language.types.integer) $offset = 0,
    [int](#language.types.integer) $limit = -1,
    [int](#language.types.integer) $flags = OCI_FETCHSTATEMENT_BY_COLUMN | OCI_ASSOC
): [int](#language.types.integer)

Lee todas las líneas de un resultado Oracle en un array de 2 dimensiones.
Por omisión, se devuelven todas las líneas.

Esta función puede ser llamada una sola vez para cada consulta
ejecutada mediante la función [oci_execute()](#function.oci-execute).

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

     output


       La variable que contendrá las líneas devueltas.




       Las columnas LOB se devuelven en forma de string
       cuando Oracle soporta la conversión.




       Ver la función [oci_fetch_array()](#function.oci-fetch-array) para más
       información sobre cómo se recuperan los datos y sus tipos.






     offset


       Número de líneas iniciales a ignorar al leer
       el resultado. Por omisión, este parámetro vale 0, para comenzar la lectura
       en la primera línea.






     limit


       Número máximo de líneas a devolver. Por omisión, vale -1, lo que
       significa que todas las líneas disponibles serán devueltas
       desde el parámetro offset + 1.






     flags


       El parámetro flags indica la estructura
       del array pero también si deben usarse arrays asociativos.



        <caption>**Modos de estructura de arrays para la función
         oci_fetch_all()**</caption>



           Constante
           Descripción






           **[OCI_FETCHSTATEMENT_BY_ROW](#constant.oci-fetchstatement-by-row)**
           El array devuelto contendrá un solo subarray por
            líneas.



           **[OCI_FETCHSTATEMENT_BY_COLUMN](#constant.oci-fetchstatement-by-column)**
           El array devuelto contendrá un solo subarray por
            columnas. Este es el comportamiento por omisión.








       Los arrays pueden ser indexados ya sea por el encabezado de columna,
       o numéricamente.



        <caption>**Modos de indexación de arrays para la función
         oci_fetch_all()**</caption>



           Constante
           Descripción






           **[OCI_NUM](#constant.oci-num)**
           Se usan índices numéricos para cada array de columnas.



           **[OCI_ASSOC](#constant.oci-assoc)**
           Se usan índices asociativos para cada array de columnas. Este es el comportamiento por omisión.








       Utilice el operador de adición ""+"" para elegir una
       combinación de estructuras de arrays y modos de indexación.




       Los nombres de columnas que no son sensibles a mayúsculas/minúsculas (por omisión en Oracle),
       tendrán nombres de atributos en mayúsculas. Los nombres de columnas que son sensibles a mayúsculas/minúsculas,
       tendrán nombres de atributos usando exactamente la misma casilla de la columna.
       Utilice la función [var_dump()](#function.var-dump) en el objeto de resultado para verificar
       la casilla apropiada a usar para cada consulta.




       Las consultas que poseen más de una columna con el mismo nombre
       deben usar alias. De lo contrario, solo una
       de las columnas aparecerá en el array asociativo.





### Valores devueltos

Devuelve el número de líneas recuperadas en el parámetro output
que puede ser 0 o más.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch_all()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT POSTAL_CODE, CITY FROM locations WHERE ROWNUM &lt; 3');
oci_execute($stid);

$nrows = oci_fetch_all($stid, $res);

echo "$nrows rows fetched&lt;br&gt;\n";
var_dump($res);

// var_dump mostrará:
// 2 rows fetched
// array(2) {
// ["POSTAL_CODE"]=&gt;
// array(2) {
// [0]=&gt;
// string(6) "00989x"
// [1]=&gt;
// string(6) "10934x"
// }
// ["CITY"]=&gt;
// array(2) {
// [0]=&gt;
// string(4) "Roma"
// [1]=&gt;
// string(6) "Venice"
// }
// }

// Mostrar resultados
echo "&lt;table border='1'&gt;\n";
foreach ($res as $col) {
    echo "&lt;tr&gt;\n";
    foreach ($col as $item) {
        echo "    &lt;td&gt;".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Ejemplo con oci_fetch_all()** y **[OCI_FETCHSTATEMENT_BY_ROW](#constant.oci-fetchstatement-by-row)**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT POSTAL_CODE, CITY FROM locations WHERE ROWNUM &lt; 3');
oci_execute($stid);

$nrows = oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

echo "$nrows líneas recuperadas&lt;br&gt;\n";
var_dump($res);

// Muestra:
// 2 líneas recuperadas
// array(2) {
// [0]=&gt;
// array(2) {
// ["POSTAL_CODE"]=&gt;
// string(6) "00989x"
// ["CITY"]=&gt;
// string(4) "Roma"
// }
// [1]=&gt;
// array(2) {
// ["POSTAL_CODE"]=&gt;
// string(6) "10934x"
// ["CITY"]=&gt;
// string(6) "Venice"
// }
// }

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Ejemplo con oci_fetch_all()** y **[OCI_NUM](#constant.oci-num)**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT POSTAL_CODE, CITY FROM locations WHERE ROWNUM &lt; 3');
oci_execute($stid);

$nrows = oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_NUM);

echo "$nrows líneas recuperadas&lt;br&gt;\n";
var_dump($res);

// Muestra:
// 2 líneas recuperadas
// array(2) {
// [0]=&gt;
// array(2) {
// [0]=&gt;
// string(6) "00989x"
// [1]=&gt;
// string(4) "Roma"
// }
// [1]=&gt;
// array(2) {
// [0]=&gt;
// string(6) "10934x"
// [1]=&gt;
// string(6) "Venice"
// }
// }

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    El uso del parámetro offset es realmente ineficiente.
    Todas las líneas a evitar están incluidas en el conjunto de resultados devuelto por
    la base de datos a PHP. Luego, son descartadas. Es más eficiente
    usar una consulta SQL para restringir el alcance de las líneas deseadas.
    Ver la función [oci_fetch_array()](#function.oci-fetch-array) para un ejemplo concreto.

**Nota**:

    Las consultas que devuelven un número muy grande de líneas pueden
    ahorrar memoria al usar funciones que recuperan una sola línea, como hace la función [oci_fetch_array()](#function.oci-fetch-array).

**Nota**:

Para las
consultas que devuelven un número muy grande de líneas, el rendimiento puede
ser muy significativamente mejorado aumentando el valor de la opción
[oci8.default_prefetch](#ini.oci8.default-prefetch)
o usando la función [oci_set_prefetch()](#function.oci-set-prefetch).

**Nota**:

    Esta función no devolverá líneas desde un conjunto
    de resultados implícito de una base de datos Oracle
    12*c*. Utilice en su lugar la función
    [oci_fetch_array()](#function.oci-fetch-array).

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

    - [oci_set_prefetch()](#function.oci-set-prefetch) - Indica el número de filas que deben leerse por adelantado por Oracle

# oci_fetch_array

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch_array — Lee una línea de un resultado en forma de array asociativo o numérico

### Descripción

**oci_fetch_array**([resource](#language.types.resource) $statement, [int](#language.types.integer) $mode = OCI_BOTH | OCI_RETURN_NULLS): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array que contiene la siguiente línea de una consulta.
Cada entrada de este array corresponde a una columna de la línea.
Esta función se utiliza típicamente en un ciclo que devuelve
**[false](#constant.false)** cuando ya no hay más líneas disponibles.

Si el parámetro statement corresponde a un bloque PL/SQL
devuelto por juegos de resultados implícitos de Oracle Database,
entonces las líneas de todos los juegos de resultados serán recuperadas
consecutivamente. Si statement es devuelto por
la función [oci_get_implicit_resultset()](#function.oci-get-implicit-resultset), entonces solo
el subconjunto de líneas de una sola consulta hija será devuelto.

Para más detalles sobre el mapeo de tipos de datos
realizado por la extensión OCI8, lea los [tipos de datos
soportados por el driver](#oci8.datatypes).

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

        Puede ser también un identificador de consulta devuelto por
        la función [oci_get_implicit_resultset()](#function.oci-get-implicit-resultset).






     mode


       El parámetro opcional mode puede ser la
       combinación de las siguientes constantes:




        <caption>**Modos para oci_fetch_array()**</caption>



           Constante
           Descripción






           **[OCI_BOTH](#constant.oci-both)**
           Devuelve un array, indexado numéricamente y con los nombres
            de columnas. Idéntico a **[OCI_ASSOC](#constant.oci-assoc)** +
            **[OCI_NUM](#constant.oci-num)**). Este es el comportamiento por defecto.



           **[OCI_ASSOC](#constant.oci-assoc)**
           Devuelve un array asociativo.



           **[OCI_NUM](#constant.oci-num)**
           Devuelve un array indexado numéricamente.



           **[OCI_RETURN_NULLS](#constant.oci-return-nulls)**
           Crea elementos vacíos para los valores **[null](#constant.null)**. El valor
            de los elementos será el valor **[null](#constant.null)** de PHP.




           **[OCI_RETURN_LOBS](#constant.oci-return-lobs)**
           Devuelve el contenido del LOB en lugar de su descriptor.








       El mode por defecto es **[OCI_BOTH](#constant.oci-both)**.




       Utilice el operador de adición ""+"" para especificar más de un modo
       a la vez.





### Valores devueltos

Devuelve un array con índices numéricos o asociativos. Si ya no hay más líneas
disponibles para la consulta statement entonces **[false](#constant.false)**
será devuelto.

Por defecto, las columnas LOB son devueltas en forma
de descriptores LOB.

Las columnas DATE son devueltas en forma de una cadena
con el formato de fecha actual. El formato por defecto puede ser modificado
mediante las variables de entorno de Oracle, como NLS_LANG o
mediante la ejecución del comando ALTER SESSION SET NLS_DATE_FORMAT.

Los nombres de columnas que no son sensibles a mayúsculas/minúsculas (por defecto en Oracle),
tendrán nombres de atributos en mayúsculas. Los nombres de columnas que son sensibles a mayúsculas/minúsculas,
tendrán nombres de atributos utilizando exactamente la misma mayúscula/minúscula de la columna.
Utilice la función [var_dump()](#function.var-dump) sobre el objeto de resultado para verificar
la mayúscula/minúscula apropiada a utilizar para cada consulta.

El nombre de la tabla no está incluido en el índice del array. Si su consulta
contiene dos columnas diferentes con el mismo nombre, utilice la constante
**[OCI_NUM](#constant.oci-num)** o añada un alias a la columna en la consulta
para asegurar la unicidad del nombre; ver el ejemplo #7. De lo contrario, solo
una columna será devuelta mediante PHP.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch_array()** con **[OCI_BOTH](#constant.oci-both)**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT department_id, department_name FROM departments');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
// Utilice nombres de columna en mayúsculas para los índices del array asociativo
echo $row[0] . " and " . $row['DEPARTMENT_ID'] . " son los mismos&lt;br&gt;\n";
echo $row[1] . " and " . $row['DEPARTMENT_NAME'] . " son los mismos&lt;br&gt;\n";
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Ejemplo con oci_fetch_array()** con
     **[OCI_NUM](#constant.oci-num)**

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab (id NUMBER, description CLOB);
INSERT INTO mytab (id, description) values (1, 'A very long string');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
echo $row[0] . "&lt;br&gt;\n";
echo $row[1]-&gt;read(11) . "&lt;br&gt;\n"; // esto mostrará los 11 primeros bytes desde DESCRIPTION
}

// Muestra:
// 1
// A very long

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Ejemplo con oci_fetch_array()** con
     **[OCI_ASSOC](#constant.oci-assoc)**

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab (id NUMBER, description CLOB);
INSERT INTO mytab (id, description) values (1, 'A very long string');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
echo $row['ID'] . "&lt;br&gt;\n";
echo $row['DESCRIPTION']-&gt;read(11) . "&lt;br&gt;\n"; // esto mostrará los 11 primeros bytes desde DESCRIPTION
}

// Muestra:
// 1
// A very long

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #4 Ejemplo con oci_fetch_array()** con
     **[OCI_RETURN_NULLS](#constant.oci-return-nulls)**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT 1, null FROM dual');
oci_execute($stid);
while (($row = oci_fetch_array ($stid, OCI_ASSOC)) != false) { // Ignora NULLs
    var_dump($row);
}

/_
El código anterior muestra:
array(1) {
[1]=&gt;
string(1) "1"
}
_/

$stid = oci_parse($conn, 'SELECT 1, null FROM dual');
oci_execute($stid);
while (($row = oci_fetch_array ($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) { // Recupera NULLs
    var_dump($row);
}

/_
El código anterior muestra:
array(2) {
[1]=&gt;
string(1) "1"
["NULL"]=&gt;
NULL
}
_/

?&gt;

    **Ejemplo #5 oci_fetch_array()** con **[OCI_RETURN_LOBS](#constant.oci-return-lobs)**

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab (id NUMBER, description CLOB);
INSERT INTO mytab (id, description) values (1, 'A very long string');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_LOBS)) != false) {
echo $row['ID'] . "&lt;br&gt;\n";
echo $row['DESCRIPTION'] . "&lt;br&gt;\n"; // contiene todo el contenido de DESCRIPTION

    // En un ciclo, liberar la variable antes de recuperar una segunda
    // línea permite reducir el uso de memoria de PHP
    unset($row);

}

// Muestra:
// 1
// A very long string

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #6 Ejemplo con oci_fetch_array()** con
     nombres de columnas sensibles a mayúsculas/minúsculas

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab ("Name" VARCHAR2(20), city VARCHAR2(20));
INSERT INTO mytab ("Name", city) values ('Chris', 'Melbourne');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'select \* from mytab');
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

// Dado que 'Name' fue creado como una columna sensible a mayúsculas/minúsculas, la misma mayúscula/minúscula
// es utilizada para los índices del array. Sin embargo, 'CITY' debe ser utilizado
// para los índices de columna no sensible a mayúsculas/minúsculas
print $row['Name'] . "&lt;br&gt;\n"; // muestra Chris
print $row['CITY'] . "&lt;br&gt;\n"; // muestra Melbourne

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #7 Ejemplo con oci_fetch_array()**
     con columnas que poseen nombres duplicados

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mycity (id NUMBER, name VARCHAR2(20));
INSERT INTO mycity (id, name) values (1, 'Melbourne');
CREATE TABLE mycountry (id NUMBER, name VARCHAR2(20));
INSERT INTO mycountry (id, name) values (1, 'Australia');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT mycity.name, mycountry.name
        FROM mycity, mycountry
        WHERE mycity.id = mycountry.id';
$stid = oci_parse($conn, $sql);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);
var_dump($row);

// La salida contiene solo UNA entrada "NAME":
// array(1) {
// ["NAME"]=&gt;
// string(9) "Australia"
// }

// Para consultar un nombre de columna duplicado, utilice un alias de columna SQL
// como "AS ctnm":
$sql = 'SELECT mycity.name AS ctnm, mycountry.name
        FROM mycity, mycountry
        WHERE mycity.id = mycountry.id';
$stid = oci_parse($conn, $sql);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);
var_dump($row);

// La salida contiene ahora 2 columnas:
// array(2) {
// ["CTNM"]=&gt;
// string(9) "Melbourne"
// ["NAME"]=&gt;
// string(9) "Australia"
// }

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #8 Ejemplo con oci_fetch_array()** y columnas DATE

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Define el formato utilizado para las fechas en esta conexión.
// Por razones de rendimiento, debe modificar el formato mediante un disparador o
// utilizando variables de entorno
$stid = oci_parse($conn, "ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD'");
oci_execute($stid);

$stid = oci_parse($conn, 'SELECT hire_date FROM employees WHERE employee_id = 188');
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);
echo $row['HIRE_DATE'] . "&lt;br&gt;\n"; // Muestra 1997-06-14

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #9 Ejemplo con oci_fetch_array()** y REF CURSOR

&lt;?php
/\*
Cree el procedimiento almacenado PL/SQL siguiente antes de la ejecución:

CREATE OR REPLACE PROCEDURE myproc(p1 OUT SYS_REFCURSOR) AS
BEGIN
OPEN p1 FOR SELECT _ FROM all_objects WHERE ROWNUM &lt; 5000;
END;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'BEGIN myproc(:rc); END;');
$refcur = oci_new_cursor($conn);
oci_bind_by_name($stid, ':rc', $refcur, -1, OCI_B_CURSOR);
oci_execute($stid);

// Ejecuta el REF CURSOR devuelto y recupera un identificador de consulta
oci_execute($refcur);
echo "&lt;table border='1'&gt;\n";
while (($row = oci_fetch_array($refcur, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "&lt;tr&gt;\n";
    foreach ($row as $item) {
        echo "    &lt;td&gt;".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($refcur);
oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #10 Paginación con oci_fetch_array()** utilizando una consulta
     que utiliza el parámetro LIMIT

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtiene la versión de la base de datos
preg_match('/Release ([0-9]+)\./', oci_server_version($conn), $matches);
$oracleversion = $matches[1];

// Consulta para la paginación
$sql = 'SELECT city, postal_code FROM locations ORDER BY city';

if ($oracleversion &gt;= 12) {
    // Utilización de la sintaxis Oracle 12c OFFSET / FETCH NEXT
    $sql = $sql . ' OFFSET :offset ROWS FETCH NEXT :numrows ROWS ONLY';
} else {
    // Las versiones antiguas de Oracle requieren una consulta anidada
    // para seleccionar un subconjunto desde $sql. O, si la consulta SQL
    // es conocida en el momento del desarrollo, utilice una función
    // row_number() en lugar de esta solución de anidación. En los
    // entornos de producción, asegúrese de evitar las inyecciones
    // SQL con la concatenación.
    $sql = "SELECT * FROM (SELECT a.*, ROWNUM AS my_rnum
                           FROM ($sql) a
WHERE ROWNUM &lt;= :offset + :numrows)
WHERE my_rnum &gt; :offset";
}

$offset  = 0;  // No procesar las primeras líneas
$numrows = 5; // Devuelve 5 líneas
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':numrows', $numrows);
oci_bind_by_name($stid, ':offset', $offset);
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
echo $row['CITY'] . " " . $row['POSTAL_CODE'] . "&lt;br&gt;\n";
}

// Muestra:
// Beijing 190518
// Bern 3095
// Bombay 490231
// Geneva 1730
// Hiroshima 6823

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #11 Ejemplo con oci_fetch_array()** con Oracle Database

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/pdborcl');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Requiere OCI8 2.0 (o posterior) y Oracle Database 12c (o posterior)
// Ver también oci_get_implicit_resultset()
$sql = 'DECLARE
c1 SYS_REFCURSOR;
BEGIN
OPEN c1 FOR SELECT city, postal_code FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
OPEN c1 FOR SELECT country_id FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
END;';

$stid = oci_parse($conn, $sql);
oci_execute($stid);

// Nota: oci_fetch_all y oci_fetch() no pueden ser utilizadas de esta manera
echo "&lt;table&gt;\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "  &lt;td&gt;".($item!==null?htmlentities($item, ENT_QUOTES|ENT_SUBSTITUTE):"")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

// Muestra:
// Beijing 190518
// Bern 3095
// Bombay 490231
// CN
// CH
// IN

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    Los índices de los arrays asociativos deben estar en mayúsculas para
    las columnas estándar de Oracle que han sido creadas con nombres sensibles a mayúsculas/minúsculas.

**Nota**:

Para las
consultas que devuelven un número muy grande de líneas, el rendimiento puede
ser muy significativamente mejorado aumentando el valor de la opción
[oci8.default_prefetch](#ini.oci8.default-prefetch)
o usando la función [oci_set_prefetch()](#function.oci-set-prefetch).

**Nota**:

    La función **oci_fetch_array()**
    es *significativamente* más lenta que la función
    [oci_fetch_assoc()](#function.oci-fetch-assoc)
    o [oci_fetch_row()](#function.oci-fetch-row), pero es más flexible.

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

    - [oci_set_prefetch()](#function.oci-set-prefetch) - Indica el número de filas que deben leerse por adelantado por Oracle

# oci_fetch_assoc

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch_assoc — Lee una línea de un resultado en forma de array asociativo

### Descripción

**oci_fetch_assoc**([resource](#language.types.resource) $statement): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array asociativo que contiene la siguiente línea de resultado de una consulta.
Cada elemento del array corresponde a una columna de la línea. Esta función
es típicamente llamada en un ciclo mientras no devuelva **[false](#constant.false)**, lo que indica
que no hay más líneas disponibles.

**oci_fetch_assoc()** es idéntica a la función
[oci_fetch_array()](#function.oci-fetch-array) y al modo
**[OCI_ASSOC](#constant.oci-assoc)** + **[OCI_RETURN_NULLS](#constant.oci-return-nulls)**.

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

### Valores devueltos

Devuelve un array asociativo o **[false](#constant.false)** si no hay más líneas disponibles
para la consulta statement.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch_assoc()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT department_id, department_name FROM departments');
oci_execute($stid);

while (($row = oci_fetch_assoc($stid)) != false) {
echo $row['DEPARTMENT_ID'] . " " . $row['DEPARTMENT_NAME'] . "&lt;br&gt;\n";
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    Ver [oci_fetch_array()](#function.oci-fetch-array) para más ejemplos sobre la recuperación
    de líneas.

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

# oci_fetch_object

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch_object — Lee una línea de un resultado en forma de objeto

### Descripción

**oci_fetch_object**([resource](#language.types.resource) $statement, [int](#language.types.integer) $mode = OCI_ASSOC | OCI_RETURN_NULLS): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Devuelve un objeto que contiene la siguiente línea de resultado de una
consulta. Cada atributo de este objeto corresponde a una columna
de la línea. Esta función se utiliza típicamente en un ciclo
mientras no devuelva **[false](#constant.false)**, lo que indica que no hay más líneas disponibles.

Para más detalles sobre el mapeo de tipos de datos
realizado por la extensión OCI8, lea los [tipos de datos
soportados por el driver](#oci8.datatypes).

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

### Valores devueltos

Devuelve un objeto. Cada atributo de este objeto corresponde a una columna de la línea.
Si no hay más líneas disponibles en la consulta statement
entonces se devuelve **[false](#constant.false)**.

    Todas las columnas LOB son devueltas en forma de
    descriptores LOB.

Las columnas DATE son devueltas en forma de strings formateados
con el formato de fecha actual. El formato por omisión puede ser cambiado mediante las variables
de entorno Oracle, como NLS_LANG o ejecutando el comando
ALTER SESSION SET NLS_DATE_FORMAT.

Los nombres de columnas que no son sensibles a la casse (por omisión en Oracle),
tendrán nombres de atributos en mayúsculas. Los nombres de columnas que son sensibles a la
casse, tendrán nombres de atributos utilizando exactamente la misma casse de la columna.
Utilice la función [var_dump()](#function.var-dump) sobre el objeto de resultado para verificar
la casse apropiada para el acceso a los atributos.

Los valores de atributo serán **[null](#constant.null)** para cada campo de datos NULL.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch_object()**

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab (id NUMBER, description VARCHAR2(30));
INSERT INTO mytab (id, description) values (1, 'Fish and Chips');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_object($stid)) != false) {
// Utilice nombres de atributos sensibles a la casse para cada columna estándar de Oracle
echo $row-&gt;ID . "&lt;br&gt;\n";
echo $row-&gt;DESCRIPTION . "&lt;br&gt;\n";
}

// Muestra:
// 1
// Fish and Chips

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Ejemplo con oci_fetch_object()** con nombres de columna sensibles a la casse

&lt;?php

/_
Antes de la ejecución, cree la tabla con una columna cuyo nombre es sensible a la casse:
CREATE TABLE mytab (id NUMBER, "MyDescription" VARCHAR2(30));
INSERT INTO mytab (id, "MyDescription") values (1, 'Iced Coffee');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, "MyDescription" FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_object($stid)) != false) {
// Utilice nombres de atributos en mayúsculas para cada columna estándar de Oracle
echo $row-&gt;ID . "&lt;br&gt;\n";
// Utilice la casse exacta para los nombres de columnas sensibles a la casse
echo $row-&gt;MyDescription . "&lt;br&gt;\n";
}

// Muestra:
// 1
// Iced Coffee

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Ejemplo con oci_fetch_object()** con LOBs

&lt;?php

/_
Antes de la ejecución, cree la tabla:
CREATE TABLE mytab (id NUMBER, description CLOB);
INSERT INTO mytab (id, description) values (1, 'A very long string');
COMMIT;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_object($stid)) != false) {
echo $row-&gt;ID . "&lt;br&gt;\n";
// Lo siguiente mostrará los 11 primeros bytes desde DESCRIPTION
echo $row-&gt;DESCRIPTION-&gt;read(11) . "&lt;br&gt;\n";
}

// Muestra:
// 1
// A very long

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

# oci_fetch_row

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_fetch_row — Lee la siguiente línea de una consulta en forma de array numérico

### Descripción

**oci_fetch_row**([resource](#language.types.resource) $statement): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array indexado numéricamente que contiene la siguiente línea de una consulta.
Cada elemento de este array corresponde a una columna de la línea. Esta función
es llamada típicamente en un ciclo mientras no devuelva **[false](#constant.false)**, lo que indica
que no hay más líneas disponibles.

**oci_fetch_row()** es idéntica a la función
[oci_fetch_array()](#function.oci-fetch-array) y al modo
**[OCI_NUM](#constant.oci-num)** + **[OCI_RETURN_NULLS](#constant.oci-return-nulls)**.

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

### Valores devueltos

Devuelve un array indexado numéricamente. Si no hay más líneas
disponibles para la consulta statement entonces **[false](#constant.false)**
será devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_fetch_row()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT department_id, department_name FROM departments');
oci_execute($stid);

while (($row = oci_fetch_row($stid)) != false) {
echo $row[0] . " " . $row[1] . "&lt;br&gt;\n";
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    Ver [oci_fetch_array()](#function.oci-fetch-array) para más ejemplos sobre la recuperación
    de líneas.

### Ver también

    - [oci_fetch()](#function.oci-fetch) - Lee la siguiente línea de un resultado Oracle en un buffer interno

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

# oci_field_is_null

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_is_null — Comprueba si un campo de la fila recuperada es nulo

### Descripción

**oci_field_is_null**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [bool](#language.types.boolean)

Verifica si el campo column dado de la fila
actual de la consulta statement es nulo.

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser el índice del campo (a partir de 1) o su nombre.





### Valores devueltos

Devuelve **[true](#constant.true)** si column es nulo, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con [oci_field_name()](#function.oci-field-name)**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (c1 NUMBER);
// INSERT INTO mytab VALUES (1);
// INSERT INTO mytab VALUES (NULL);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS)) != false) {
$ncols = oci_num_fields($stid);
for ($col = 1; $col &lt;= $ncols; $col++) {
        var_dump(oci_field_is_null($stid, $col));
}
}

// Muestra:
// bool(false)
// bool(true)

oci_free_statement($stid);
oci_close($conn);

?&gt;

# oci_field_name

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_name — Devuelve el nombre de un campo Oracle

### Descripción

**oci_field_name**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre del campo column.

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser un índice de campo (comenzando en 1) o un nombre de campo.





### Valores devueltos

Devuelve el nombre, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_name()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (number_col NUMBER, varchar2_col varchar2(1),
// clob_col CLOB, date_col DATE);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si no se recuperan filas

echo "&lt;table border=\"1\"&gt;\n";
echo "&lt;tr&gt;";
echo "&lt;th&gt;Name&lt;/th&gt;";
echo "&lt;th&gt;Type&lt;/th&gt;";
echo "&lt;th&gt;Length&lt;/th&gt;";
echo "&lt;/tr&gt;\n";

$ncols = oci_num_fields($stid);

for ($i = 1; $i &lt;= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
    $column_type  = oci_field_type($stid, $i);

    echo "&lt;tr&gt;";
    echo "&lt;td&gt;$column_name&lt;/td&gt;";
    echo "&lt;td&gt;$column_type&lt;/td&gt;";
    echo "&lt;/tr&gt;\n";

}

echo "&lt;/table&gt;\n";

// Muestra:
// Name Type
// NUMBER_COL NUMBER
// VARCHAR2_COL VARCHAR2
// CLOB_COL CLOB
// DATE_COL DATE

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_num_fields()](#function.oci-num-fields) - Devuelve el número de columnas en un resultado Oracle

    - [oci_field_type()](#function.oci-field-type) - Devuelve el tipo de datos de un campo Oracle

    - [oci_field_size()](#function.oci-field-size) - Devuelve el tamaño de un campo Oracle

# oci_field_precision

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_precision — Lee la precisión de un campo Oracle

### Descripción

**oci_field_precision**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la precisión del campo column.

Para las columnas de tipo FLOAT, la precisión no es nula, y
la escala es de -127. Si la precisión es 0, entonces la columna
es de tipo NUMBER. De lo contrario, es de tipo NUMBER(precision, scale).

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser un índice de campo (comenzando en 1) o un nombre de campo.





### Valores devueltos

Devuelve la precisión, en forma de [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_precision()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (c1 NUMBER, c2 FLOAT, c3 NUMBER(4), c4 NUMBER(5,3));

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si ninguna fila es recuperada

$ncols = oci_num_fields($stid);
for ($i = 1; $i &lt;= $ncols; $i++) {
    echo oci_field_name($stid, $i) . " "
        . oci_field_precision($stid, $i) . " "
        . oci_field_scale($stid, $i) . "&lt;br&gt;\n";
}

// Muestra:
// C1 0 -127
// C2 126 -127
// C3 4 0
// C4 5 3

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_field_scale()](#function.oci-field-scale) - Lee la escala de una columna Oracle

    - [oci_field_type()](#function.oci-field-type) - Devuelve el tipo de datos de un campo Oracle

# oci_field_scale

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_scale — Lee la escala de una columna Oracle

### Descripción

**oci_field_scale**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Lee la escala de una columna Oracle.

Para las columnas de tipo FLOAT, la precisión no es nula, y
la escala es de -127. Si la precisión es 0, entonces la columna
es de tipo NUMBER. De lo contrario, es de tipo NUMBER(precision, scale).

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser un índice de campo (comenzando en 1) o el nombre de un campo.





### Valores devueltos

Devuelve la escala, en forma de [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_scale()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (c1 NUMBER, c2 FLOAT, c3 NUMBER(4), c4 NUMBER(5,3));

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si no se recupera ninguna fila

$ncols = oci_num_fields($stid);
for ($i = 1; $i &lt;= $ncols; $i++) {
    echo oci_field_name($stid, $i) . " "
        . oci_field_precision($stid, $i) . " "
        . oci_field_scale($stid, $i) . "&lt;br&gt;\n";
}

// Muestra:
// C1 0 -127
// C2 126 -127
// C3 4 0
// C4 5 3

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_field_precision()](#function.oci-field-precision) - Lee la precisión de un campo Oracle

    - [oci_field_type()](#function.oci-field-type) - Devuelve el tipo de datos de un campo Oracle

# oci_field_size

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_size — Devuelve el tamaño de un campo Oracle

### Descripción

**oci_field_size**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño del campo column Oracle.

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser el índice del campo (la indexación comienza en 1) o
       el nombre del campo.





### Valores devueltos

Devuelve el tamaño del campo field en bytes, o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_size()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (number_col NUMBER, varchar2_col varchar2(1),
// clob_col CLOB, date_col DATE);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Utilización de OCI_DESCRIBE_ONLY si ninguna fila es recuperada

echo "&lt;table border=\"1\"&gt;\n";
echo "&lt;tr&gt;";
echo "&lt;th&gt;Name&lt;/th&gt;";
echo "&lt;th&gt;Type&lt;/th&gt;";
echo "&lt;th&gt;Length&lt;/th&gt;";
echo "&lt;/tr&gt;\n";

$ncols = oci_num_fields($stid);

for ($i = 1; $i &lt;= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
    $column_type  = oci_field_type($stid, $i);
    $column_size  = oci_field_size($stid, $i);

    echo "&lt;tr&gt;";
    echo "&lt;td&gt;$column_name&lt;/td&gt;";
    echo "&lt;td&gt;$column_type&lt;/td&gt;";
    echo "&lt;td&gt;$column_size&lt;/td&gt;";
    echo "&lt;/tr&gt;\n";

}

echo "&lt;/table&gt;\n";

// Muestra:
// Name Type Length
// NUMBER_COL NUMBER 22
// VARCHAR2_COL VARCHAR2 1
// CLOB_COL CLOB 4000
// DATE_COL DATE 7

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_num_fields()](#function.oci-num-fields) - Devuelve el número de columnas en un resultado Oracle

    - [oci_field_name()](#function.oci-field-name) - Devuelve el nombre de un campo Oracle

# oci_field_type

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_type — Devuelve el tipo de datos de un campo Oracle

### Descripción

**oci_field_type**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [string](#language.types.string)|[int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el nombre del tipo de datos de un campo.

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser el índice del campo (la indexación comienza en 1) o el nombre.





### Valores devueltos

Devuelve el tipo de datos de un campo, en forma de [string](#language.types.string) o un
[int](#language.types.integer), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_type()**

// Creación de la tabla con:
// CREATE TABLE mytab (number_col NUMBER, varchar2_col varchar2(1),
// clob_col CLOB, date_col DATE);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si no se recupera ninguna fila

echo "&lt;table border=\"1\"&gt;\n";
echo "&lt;tr&gt;";
echo "&lt;th&gt;Name&lt;/th&gt;";
echo "&lt;th&gt;Type&lt;/th&gt;";
echo "&lt;th&gt;Length&lt;/th&gt;";
echo "&lt;/tr&gt;\n";

$ncols = oci_num_fields($stid);

for ($i = 1; $i &lt;= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
    $column_type  = oci_field_type($stid, $i);
    $column_size  = oci_field_size($stid, $i);

    echo "&lt;tr&gt;";
    echo "&lt;td&gt;$column_name&lt;/td&gt;";
    echo "&lt;td&gt;$column_type&lt;/td&gt;";
    echo "&lt;td&gt;$column_size&lt;/td&gt;";
    echo "&lt;/tr&gt;\n";

}

echo "&lt;/table&gt;\n";

// Muestra:
// Name Type Length
// NUMBER_COL NUMBER 22
// VARCHAR2_COL VARCHAR2 1
// CLOB_COL CLOB 4000
// DATE_COL DATE 7

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_num_fields()](#function.oci-num-fields) - Devuelve el número de columnas en un resultado Oracle

    - [oci_field_name()](#function.oci-field-name) - Devuelve el nombre de un campo Oracle

    - [oci_field_size()](#function.oci-field-size) - Devuelve el tamaño de un campo Oracle

# oci_field_type_raw

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_field_type_raw — Lee los datos brutos del tipo de un campo

### Descripción

**oci_field_type_raw**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Lee los datos brutos "SQLT" del tipo del campo column.

Si se desea obtener el nombre del tipo del campo, utilice la función
[oci_field_type()](#function.oci-field-type).

### Parámetros

     statement


       Un identificador de consulta OCI válido.






     column


       Puede ser el índice de un campo (comenzando en 1) o el nombre de un campo.





### Valores devueltos

Devuelve el tipo de datos brutos de Oracle, para el campo, en forma de número,
o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_field_type_raw()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (number_col NUMBER, varchar2_col varchar2(1), clob_col CLOB, date_col DATE);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, 'select \* from mytab');
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si no se recupera ninguna fila

$n = oci_num_fields($stid);
for ($i = 1; $i &lt;= $n; ++$i) {
echo oci_field_name($stid, $i) . " is raw type: " . oci_field_type_raw($stid, $i) . "&lt;br&gt;\n";
}

// Muestra:
// NUMBER_COL is raw type: 2
// VARCHAR2_COL is raw type: 1
// CLOB_COL is raw type: 112
// DATE_COL is raw type: 12

oci_free_statement($stid);
oci_close($conn);

?&gt;

# oci_free_descriptor

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_free_descriptor — Libera un descriptor

### Descripción

**oci_free_descriptor**([OCILob](#class.ocilob) $lob): [bool](#language.types.boolean)

Libera un descriptor asignado por la función
[oci_new_descriptor()](#function.oci-new-descriptor).

### Parámetros

     descriptor


       Descriptor asignado por [oci_new_descriptor()](#function.oci-new-descriptor).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    Esta función es habitualmente utilizada como método
    [OCILOB::free](#ocilob.free).

### Ver también

    - [OCILOB::free](#ocilob.free)

# oci_free_statement

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_free_statement — Libera todos los recursos asociados con una sentencia o cursor

### Descripción

**oci_free_statement**([resource](#language.types.resource) $statement): [bool](#language.types.boolean)

Libera los recursos asociados con un cursor o sentencia de Oracle, el cual fue
recibido desde una resultado de [oci_parse()](#function.oci-parse) u obtenido
desde Oracle.

### Parámetros

     statement


       Un identificador de sentecia válido de OCI.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# oci_get_implicit_resultset

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8, PECL OCI8 &gt;= 2.0.0)

oci_get_implicit_resultset — Retorna el hijo siguiente de un recurso de consulta desde un recurso de consulta padre que tiene un juego de resultados implícito de Oracle Database

### Descripción

**oci_get_implicit_resultset**([resource](#language.types.resource) $statement): [resource](#language.types.resource)|[false](#language.types.singleton)

Utilizado para recuperar juegos recursivos de resultados de consultas
después de la ejecución de un bloque almacenado o anónimo Oracle PL/SQL donde este bloque
retorna resultados de consultas con la función
_DBMS_SQL.RETURN_RESULT_ Oracle PL/SQL de la base de datos
Oracle 12 (o posterior).
Esto permite a los bloques PL/SQL retornar fácilmente resultados
de consultas.

La consulta hija puede ser utilizada con cualquiera de las funciones
de recuperación OCI8: [oci_fetch()](#function.oci-fetch), [oci_fetch_all()](#function.oci-fetch-all),
[oci_fetch_array()](#function.oci-fetch-array), [oci_fetch_object()](#function.oci-fetch-object),
[oci_fetch_assoc()](#function.oci-fetch-assoc) o [oci_fetch_row()](#function.oci-fetch-row)

Las consultas hijas heredan los valores pre-recuperados de sus padres,
o pueden ser definidas explícitamente con la función
[oci_set_prefetch()](#function.oci-set-prefetch).

### Parámetros

     statement


        Un identificador de consulta OCI8 válido creado por la función
        [oci_parse()](#function.oci-parse) y ejecutado por la función
        [oci_execute()](#function.oci-execute).  El identificador de consulta
        puede o no estar asociado con una consulta OCI8 que retorna
        juegos de resultados implícitos.





### Valores devueltos

Retorna un gestor de consulta para la próxima consulta hija disponible
en statement. Retorna **[false](#constant.false)** cuando la consulta
hija no existe, o cuando todas las consultas hijas han sido retornadas
por llamados previos a la función **oci_get_implicit_resultset()**.

### Ejemplos

    **Ejemplo #1 Recuperación de los juegos de resultados implícitos mediante un ciclo**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/pdborcl');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'DECLARE
c1 SYS_REFCURSOR;
BEGIN
OPEN c1 FOR SELECT city, postal_code FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
OPEN c1 FOR SELECT country_id FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
END;';

$stid = oci_parse($conn, $sql);
oci_execute($stid);

while (($stid_c = oci_get_implicit_resultset($stid))) {
echo "&lt;h2&gt;Nuevo juego de resultados implícito:&lt;/h2&gt;\n";
echo "&lt;table&gt;\n";
while (($row = oci_fetch_array($stid_c, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
            echo "  &lt;td&gt;".($item!==null?htmlentities($item, ENT_QUOTES|ENT_SUBSTITUTE):"")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";
}

// Muestra:
// Nuevo juego de resultados implícito:
// Beijing 190518
// Bern 3095
// Bombay 490231
// Nuevo juego de resultados implícito:
// CN
// CH
// IN

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Recupera individualmente los gestores de consultas hijas**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/pdborcl');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'DECLARE
c1 SYS_REFCURSOR;
BEGIN
OPEN c1 FOR SELECT city, postal_code FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
OPEN c1 FOR SELECT country_id FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
END;';

$stid = oci_parse($conn, $sql);
oci_execute($stid);

$stid_1 = oci_get_implicit_resultset($stid);
$stid_2 = oci_get_implicit_resultset($stid);

$row = oci_fetch_array($stid_1, OCI_ASSOC+OCI_RETURN_NULLS);
var_dump($row);
$row = oci_fetch_array($stid_2, OCI_ASSOC+OCI_RETURN_NULLS);
var_dump($row);
$row = oci_fetch_array($stid_1, OCI_ASSOC+OCI_RETURN_NULLS);
var_dump($row);
$row = oci_fetch_array($stid_2, OCI_ASSOC+OCI_RETURN_NULLS);
var_dump($row);

// Muestra:
// array(2) {
// ["CITY"]=&gt;
// string(7) "Beijing"
// ["POSTAL_CODE"]=&gt;
// string(6) "190518"
// }
// array(1) {
// ["COUNTRY_ID"]=&gt;
// string(2) "CN"
// }
// array(2) {
// ["CITY"]=&gt;
// string(4) "Bern"
// ["POSTAL_CODE"]=&gt;
// string(4) "3095"
// }
// array(1) {
// ["COUNTRY_ID"]=&gt;
// string(2) "CH"
// }

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #3 Definición explícita del contador de pre-recuperación**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/pdborcl');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'DECLARE
c1 SYS_REFCURSOR;
BEGIN
OPEN c1 FOR SELECT city, postal_code FROM locations ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
END;';

$stid = oci_parse($conn, $sql);
oci_execute($stid);

$stid_c = oci_get_implicit_resultset($stid);
oci_set_prefetch($stid_c, 200);   // Establece la pre-recuperación antes de recuperar de la consulta hija
echo "&lt;table&gt;\n";
while (($row = oci_fetch_array($stid_c, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "&lt;tr&gt;\n";
    foreach ($row as $item) {
        echo "  &lt;td&gt;".($item!==null?htmlentities($item, ENT_QUOTES|ENT_SUBSTITUTE):"")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #4 Ejemplo de juego de resultados implícito sin utilizar la función
     oci_get_implicit_resultset()**



     Todos los resultados de todas las consultas son retornados consecutivamente.

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/pdborcl');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'DECLARE
c1 SYS_REFCURSOR;
BEGIN
OPEN c1 FOR SELECT city, postal_code FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
OPEN c1 FOR SELECT country_id FROM locations WHERE ROWNUM &lt; 4 ORDER BY city;
DBMS_SQL.RETURN_RESULT(c1);
END;';

$stid = oci_parse($conn, $sql);
oci_execute($stid);

// Nota: oci_fetch_all y oci_fetch() no pueden ser utilizados de esta manera
echo "&lt;table&gt;\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "  &lt;td&gt;".($item!==null?htmlentities($item, ENT_QUOTES|ENT_SUBSTITUTE):"")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

// Muestra:
// Beijing 190518
// Bern 3095
// Bombay 490231
// CN
// CH
// IN

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

Para las
consultas que devuelven un número muy grande de líneas, el rendimiento puede
ser muy significativamente mejorado aumentando el valor de la opción
[oci8.default_prefetch](#ini.oci8.default-prefetch)
o usando la función [oci_set_prefetch()](#function.oci-set-prefetch).

# oci_lob_copy

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_lob_copy — Copia un LOB Oracle

### Descripción

**oci_lob_copy**([OCILob](#class.ocilob) $to, [OCILob](#class.ocilob) $from, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [bool](#language.types.boolean)

Copia un LOB o una parte de un LOB a otro LOB. Los datos antiguos del LOB de destino serán sobrescritos por los nuevos.

Si se debe copiar una parte específica de un LOB a una posición particular de otro LOB, utilice la función [OCILob::seek()](#ocilob.seek) para mover el puntero interno de LOB.

### Parámetros

     to


       El LOB de destino.






     from


       El LOB copiado.






     length


       Indica el tamaño de los datos a copiar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       length es ahora nullable.



### Notas

**Nota**:

    La clase OCILob se llamaba OCI-Lob antes de PHP 8 y OCI8 3.0.0.

# oci_lob_is_equal

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_lob_is_equal — Comparar dos LOB/FILE de Oracle

### Descripción

**oci_lob_is_equal**([OCILob](#class.ocilob) $lob1, [OCILob](#class.ocilob) $lob2): [bool](#language.types.boolean)

Compara dos LOB/FILE de Oracle.

### Parámetros

     lob1


       Un identificador LOB.






     lob2


       Un identificador LOB.





### Valores devueltos

Devuelve **[true](#constant.true)** si estos objetos son iguales, **[false](#constant.false)** en caso contrario.

### Notas

**Nota**:

    La clase OCICollection se denominaba OCI-Collection antes de PHP 8 y OCI8 3.0.0.

# oci_new_collection

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_new_collection — Inicializa una nueva colección Oracle

### Descripción

**oci_new_collection**([resource](#language.types.resource) $connection, [string](#language.types.string) $type_name, [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**): [OCICollection](#class.ocicollection)|[false](#language.types.singleton)

Inicializa una nueva colección Oracle.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect) o la función
       [oci_pconnect()](#function.oci-pconnect).






     type_name


       Debe ser un tipo nombrado válido (en mayúsculas).






     schema


       Debe apuntar al esquema de la base de datos, donde el tipo fue creado.
       El nombre del usuario actual es utilizado cuando **[null](#constant.null)** es proporcionado.





### Valores devueltos

Devuelve un nuevo objeto [OCICollection](#class.ocicollection), o **[false](#constant.false)**
si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       schema ahora es nullable.



### Notas

**Nota**:

    La clase [OCICollection](#class.ocicollection) se llamaba **OCI-Collection** antes de PHP 8 y OCI8 3.0.0.

# oci_new_connect

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_new_connect — Conexión al servidor Oracle utilizando una sola conexión

### Descripción

**oci_new_connect**(
    [string](#language.types.string) $username,
    [string](#language.types.string) $password,
    [?](#language.types.null)[string](#language.types.string) $connection_string = **[null](#constant.null)**,
    [string](#language.types.string) $encoding = "",
    [int](#language.types.integer) $session_mode = **[OCI_DEFAULT](#constant.oci-default)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Establece una nueva conexión al servidor Oracle e identifica.

A diferencia de las funciones [oci_connect()](#function.oci-connect) y
[oci_pconnect()](#function.oci-pconnect), **oci_new_connect()**
no almacena en caché las conexiones y siempre devuelve un manejador de conexión
recién abierto. Esto es muy útil si la aplicación necesita aislamiento
transaccional entre dos conjuntos de consultas.

### Parámetros

     username


       El nombre de usuario de Oracle.






     password


       La contraseña para el usuario.






     connection_string



Contiene la instancia Oracle a la que debemos conectarnos.
Esto puede ser una [» cadena de conexión
rápida](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-E5358DEA-D619-4B7B-A799-3D2F802500F1), un nombre de conexión del archivo tnsnames.ora,
o el nombre de una instancia local Oracle.

Si no se especifica o es **[null](#constant.null)**, PHP utiliza variables de entorno como **[TWO_TASK](#constant.two-task)** (en Linux)
o **[LOCAL](#constant.local)** (en Windows)
y **[ORACLE_SID](#constant.oracle-sid)** para determinar la instancia
Oracle a la que debemos conectarnos.

Para usar el método de conexión rápida, PHP debe estar vinculado con la biblioteca
cliente Oracle 10*g* o superior. La cadena de conexión rápida para Oracle
10*g* o superior es de la forma:
_[//]host_name[:port][/service_name]_. Desde Oracle
11*g*, la sintaxis es:
_[//]host_name[:port][/service_name][:server_type][/instance_name]_.
Opciones adicionales fueron introducidas con Oracle 19c
Los nombres de los servicios pueden ser encontrados ejecutando la utilidad
Oracle lsnrctl status en la máquina que ejecuta
la base de datos.

El archivo tnsnames.ora puede estar en el camino
de búsqueda de Oracle Net, que incluye
/your/path/to/instantclient/network/admin, $ORACLE_HOME/network/admin
y /etc.
Una solución alternativa sería definir TNS_ADMIN
para que el archivo $TNS_ADMIN/tnsnames.ora sea leído.
Asegúrese de que el demonio que ejecuta el servidor web tenga acceso de lectura a este
archivo.

     encoding

      Determina

el juego de caracteres utilizado por la biblioteca cliente Oracle. El juego de
caracteres no necesita ser idéntico al utilizado por la base de datos.
Si no coincide, Oracle hará lo mejor posible para convertir los datos
desde el juego de caracteres de la base de datos. Dependiendo de los juegos de caracteres,
el resultado puede no ser perfecto. Además, esta conversión
requiere un poco de tiempo del sistema.

Si no se especifica, la biblioteca
cliente Oracle determinará un juego de caracteres desde la variable de entorno
**[NLS_LANG](#constant.nls-lang)**.

Pasar este parámetro puede
reducir el tiempo de conexión.

     session_mode

      Este parámetro

está disponible a partir de PHP 5 (PECL OCI8 1.1) y acepta los siguientes valores:
**[OCI_DEFAULT](#constant.oci-default)**, **[OCI_SYSOPER](#constant.oci-sysoper)** y
**[OCI_SYSDBA](#constant.oci-sysdba)**.
Si bien la constante **[OCI_SYSOPER](#constant.oci-sysoper)** o la constante
**[OCI_SYSDBA](#constant.oci-sysdba)** es especificada, esta función intentará establecer
una conexión privilegiada usando identidades externas. Las
conexiones privilegiadas están desactivadas por omisión. Para activarlas, debe
definir la opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
a On.

PHP 5.3 (PECL OCI8 1.3.4) introducen el valor de modo
**[OCI_CRED_EXT](#constant.oci-cred-ext)**. Este modo solicita a Oracle usar una
identificación externa o bien del sistema operativo, que debe ser
configurada en la base de datos. El flag **[OCI_CRED_EXT](#constant.oci-cred-ext)**
solo puede ser usado con el nombre de usuario "/" asociado a una contraseña vacía.
La opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
puede ser definida a On o Off.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** puede ser combinado con el modo
**[OCI_SYSOPER](#constant.oci-sysoper)** o el modo
**[OCI_SYSDBA](#constant.oci-sysdba)**.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** no es soportado en Windows por razones de seguridad.

### Valores devueltos

Devuelve un identificador de conexión, o **[false](#constant.false)**
si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       connection_string ahora es nullable.



### Ejemplos

A continuación se muestra cómo separar transacciones.

    **Ejemplo #1 Ejemplo con oci_new_connect()**

&lt;?php

// Creación de la tabla mytab (mycol number);

function query($name, $c)
{
    echo "Querying $name\n";
    $s = oci_parse($c, "select \* from mytab");
oci_execute($s, OCI_NO_AUTO_COMMIT);
    $row = oci_fetch_array($s, OCI_ASSOC);
if (!$row) {
        echo "No rows\n";
    } else {
        do {
            foreach ($row as $item)
                echo $item . " ";
            echo "\n";
        } while (($row = oci_fetch_array($s, OCI_ASSOC)) != false);
}
}

$c1 = oci_connect("hr", "welcome", "localhost/orcl");
$c2 = oci_new_connect("hr", "welcome", "localhost/orcl");

$s = oci_parse($c1, "insert into mytab values(1234)");
oci_execute($s, OCI_NO_AUTO_COMMIT);

query("basic connection", $c1);
query("new connection", $c2);
oci_commit($c1);
query("new connection after commit", $c2);

// Muestra:
// Querying basic connection
// 1234
// Querying new connection
// No rows
// Querying new connection after commit
// 1234

?&gt;

Ver la función [oci_connect()](#function.oci-connect) para más ejemplos
sobre el uso de este parámetro.

### Ver también

    - [oci_connect()](#function.oci-connect) - Establece una conexión con un servidor Oracle

    - [oci_pconnect()](#function.oci-pconnect) - Establece una conexión persistente a un servidor Oracle

# oci_new_cursor

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_new_cursor — Asigna y devuelve un nuevo cursor Oracle

### Descripción

**oci_new_cursor**([resource](#language.types.resource) $connection): [resource](#language.types.resource)|[false](#language.types.singleton)

Asigna un nuevo cursor Oracle en la conexión especificada.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect) o la función
       [oci_pconnect()](#function.oci-pconnect).





### Valores devueltos

Devuelve un nuevo manejador de conexión, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Utilizar un REF CURSOR de un procedimiento almacenado**

&lt;?php
// Requisitos previos:
// crear o reemplazar el procedimiento myproc(myrc out sys_refcursor) de la siguiente manera:
// begin
// open myrc for select first_name from employees;
// end;

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin myproc(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);

oci_execute($curs);  // Ejecutar el REF CURSOR como un identificador de sentencia normal
while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
echo $row['FIRST_NAME'] . "&lt;br /&gt;\n";
}

oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);
?&gt;

# oci_new_descriptor

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_new_descriptor — Inicializa un nuevo puntero vacío de LOB/FILE de Oracle

### Descripción

**oci_new_descriptor**([resource](#language.types.resource) $connection, [int](#language.types.integer) $type = **[OCI_DTYPE_LOB](#constant.oci-dtype-lob)**): [?](#language.types.null)[OCILob](#class.ocilob)

Inicializa un nuevo puntero vacío de LOB/FILE de Oracle.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect) o la función
       [oci_pconnect()](#function.oci-pconnect).






     type


       Los valores admitidos para type son :
       **[OCI_D_FILE](#constant.oci-d-file)**,
       **[OCI_D_LOB](#constant.oci-d-lob)** y **[OCI_D_ROWID](#constant.oci-d-rowid)**.





### Valores devueltos

Devuelve un nuevo recurso LOB o FILE en caso de éxito,
o **[null](#constant.null)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_new_descriptor()**

&lt;?php
/\* Este script está diseñado para ser llamado desde un formulario HTML

- Espera las variables $user, $password, $table, $where, y $commitsize
- El script elimina entonces las filas seleccionadas con ROWID y valida
- la eliminación después de cada grupo de $commitsize filas.
- (Utilícelo con precaución, ya que no hay posibilidad de deshacer).
  \*/
  $conn = oci_connect($user, $password);
$stmt = oci_parse($conn, "select rowid from $table $where");
$rowid = oci_new_descriptor($conn, OCI_D_ROWID);
oci_define_by_name($stmt, "ROWID", $rowid);
oci_execute($stmt);
  while (oci_fetch($stmt)) {
    $nrows = oci_num_rows($stmt);
  $delete = oci_parse($conn, "delete from $table where ROWID = :rid");
    oci_bind_by_name($delete, ":rid", $rowid, -1, OCI_B_ROWID);
    oci_execute($delete);
  echo "$nrows\n";
    if (($nrows % $commitsize) == 0) {
        oci_commit($conn);
  }
  }
  $nrows = oci_num_rows($stmt);
  echo "$nrows deleted...\n";
oci_free_statement($stmt);
  oci_close($conn);
  ?&gt;

&lt;?php
/\* Este script ilustra la carga de columnas de tipo LOB

- El formulario utilizado en este ejemplo se parece a esto:
- &lt;form action="upload.php" method="post" enctype="multipart/form-data"&gt;
- &lt;input type="file" name="lob_upload" /&gt;
- ...
  \*/
  if (!isset($lob_upload) || $lob_upload == 'none'){
  ?&gt;
  &lt;form action="upload.php" method="post" enctype="multipart/form-data"&gt;
  Upload file: &lt;input type="file" name="lob_upload" /&gt;&lt;br /&gt;
  &lt;input type="submit" value="Upload" /&gt; - &lt;input type="reset" value="Reset" /&gt;
  &lt;/form&gt;
  &lt;?php
  } else {

         // $lob_upload contiene el fichero temporal

         // Consulte la sección sobre la subida de ficheros
         // para asegurar sus subidas

         $conn = oci_connect($user, $password);
         $lob = oci_new_descriptor($conn, OCI_D_LOB);
         $stmt = oci_parse($conn, "insert into $table (id, the_blob)
                   values(my_seq.NEXTVAL, EMPTY_BLOB()) returning the_blob into :the_blob");
         oci_bind_by_name($stmt, ':the_blob', $lob, -1, OCI_B_BLOB);
         oci_execute($stmt, OCI_DEFAULT);
         if ($lob-&gt;savefile($lob_upload)){
            oci_commit($conn);
            echo "BLOB cargado !\n";
         }else{
            echo "Imposible cargar el BLOB\n";
         }
         $lob-&gt;free();
         oci_free_statement($stmt);
         oci_close($conn);

    }
    ?&gt;

        **Ejemplo #2 Ejemplo con oci_new_descriptor()**

&lt;?php
/\* Llamada a un procedimiento PL/SQL almacenado que toma un clob

- como entrada.
- Ejemplo de firma de procedimiento almacenado PL/SQL:
-
- PROCEDURE save_data
- Argument Name Type In/Out Default?
- ***
- KEY NUMBER(38) IN
- DATA CLOB IN
- \*/

$conn = oci_connect($user, $password);
$stmt = oci_parse($conn, "begin save_data(:key, :data); end;");
$clob = oci_new_descriptor($conn, OCI_D_LOB);
oci_bind_by_name($stmt, ':key', $key);
oci_bind_by_name($stmt, ':data', $clob, -1, OCI_B_CLOB);
$clob-&gt;write($data);
oci_execute($stmt, OCI_DEFAULT);
oci_commit($conn);
$clob-&gt;free();
oci_free_statement($stmt);
?&gt;

### Ver también

    - [oci_bind_by_name()](#function.oci-bind-by-name) - Asocia una variable PHP a un marcador Oracle

# oci_num_fields

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_num_fields — Devuelve el número de columnas en un resultado Oracle

### Descripción

**oci_num_fields**([resource](#language.types.resource) $statement): [int](#language.types.integer)

Devuelve el número de columnas en el resultado Oracle
statement.

### Parámetros

     statement


       Un identificador de consulta OCI válido.





### Valores devueltos

Devuelve el número de columnas, en forma de [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_num_fields()**

&lt;?php

// Creación de la tabla con:
// CREATE TABLE mytab (id NUMBER, quantity NUMBER);

$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT \* FROM mytab");
oci_execute($stid, OCI_DESCRIBE_ONLY); // Uso de OCI_DESCRIBE_ONLY si no se recupera ninguna fila

$ncols = oci_num_fields($stid);
for ($i = 1; $i &lt;= $ncols; $i++) {
    echo oci_field_name($stid, $i) . " " . oci_field_type($stid, $i) . "&lt;br&gt;\n";
}

// Muestra:
// ID NUMBER
// QUANTITY NUMBER

oci_free_statement($stid);
oci_close($conn);

?&gt;

# oci_num_rows

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_num_rows — Devuelve el número de filas afectadas durante el último comando Oracle

### Descripción

**oci_num_rows**([resource](#language.types.resource) $statement): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de filas afectadas durante el último comando Oracle.

### Parámetros

     statement


       Un identificador de consulta OCI válido.





### Valores devueltos

Devuelve el número de filas afectadas, en forma de [int](#language.types.integer), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_num_rows()**

&lt;?php
$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
$m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "create table emp2 as select \* from employees");
oci_execute($stid);
echo oci_num_rows($stid) . " filas insertadas.&lt;br /&gt;\n";
oci_free_statement($stid);

$stid = oci_parse($conn, "delete from emp2");
oci_execute($stid, OCI_DEFAULT);
echo oci_num_rows($stid) . " filas borradas.&lt;br /&gt;\n";
oci_commit($conn);
oci_free_statement($stid);

$stid = oci_parse($conn, "drop table emp2");
oci_execute($stid);
oci_free_statement($stid);

oci_close($conn);
?&gt;

### Notas

**Nota**:

    Esta función *no devuelve* el número de filas
    seleccionadas. Para los comandos de tipo SELECT, esta función va
    a devolver el número de filas que han sido leídas en el buffer con
    **oci_fetch*()**.

# oci_parse

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_parse — Prepara una consulta SQL con Oracle

### Descripción

**oci_parse**([resource](#language.types.resource) $connection, [string](#language.types.string) $sql): [resource](#language.types.resource)|[false](#language.types.singleton)

Prepara la consulta sql utilizando la conexión
connection y devuelve el identificador de consulta
que podrá ser utilizado con las funciones [oci_bind_by_name()](#function.oci-bind-by-name),
[oci_execute()](#function.oci-execute), etc.

Los identificadores de consulta pueden ser liberados
utilizando la función [oci_free_statement()](#function.oci-free-statement)
o definiendo la variable correspondiente al valor
**[null](#constant.null)**.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect),
       [oci_pconnect()](#function.oci-pconnect) o
       [oci_new_connect()](#function.oci-new-connect).






     sql


       La consulta SQL o PL/SQL.




       Las consultas SQL *no deben*
       terminar con un punto y coma (";"). Las
       consultas PL/SQL *deben* terminar
       con un punto y coma (";").





### Valores devueltos

Devuelve un manejador de consulta en caso de éxito, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_parse()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

// Análisis de la consulta. Note que no hay un punto y coma al final de la consulta SQL
$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

    **Ejemplo #2 Ejemplo con oci_parse()** y una consulta PL/SQL

&lt;?php

/*
Antes de ejecutar este código PHP, debe crear un procedimiento almacenado en
SQL*Plus o SQL Developer:

CREATE OR REPLACE PROCEDURE myproc(p1 IN NUMBER, p2 OUT NUMBER) AS
BEGIN
p2 := p1 \* 2;
END;

\*/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$p1 = 8;

// Al analizar PL/SQL, debe haber un punto y coma al final de la cadena
$stid = oci_parse($conn, 'begin myproc(:p1, :p2); end;');
oci_bind_by_name($stid, ':p1', $p1);
oci_bind_by_name($stid, ':p2', $p2, 40);

oci_execute($stid);

print "$p2\n"; // muestra 16

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Notas

**Nota**:

    Esta función *no valida* la consulta
    sql. La única forma de saber si la
    consulta sql es válida es ejecutándola.

### Ver también

    - [oci_execute()](#function.oci-execute) - Ejecuta un comando SQL de Oracle

    - [oci_free_statement()](#function.oci-free-statement) - Libera todos los recursos asociados con una sentencia o cursor

# oci_password_change

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_password_change — Modifica la contraseña de un usuario Oracle

### Descripción

**oci_password_change**(
    [resource](#language.types.resource) $connection,
    [string](#language.types.string) $username,
    [string](#language.types.string) $old_password,
    [string](#language.types.string) $new_password
): [bool](#language.types.boolean)

**oci_password_change**(
    [string](#language.types.string) $database_name,
    [string](#language.types.string) $username,
    [string](#language.types.string) $old_password,
    [string](#language.types.string) $new_password
): [resource](#language.types.resource)

Modifica la contraseña del usuario username.

La función **oci_password_change()** es más útil con scripts PHP
en línea de comandos, o cuando se utilizan conexiones no persistentes en
la aplicación PHP.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect) o la función
       [oci_pconnect()](#function.oci-pconnect).






     username


       El nombre de usuario Oracle.






     old_password


       La contraseña antigua.






     new_password


       La nueva contraseña a establecer.






     database_name


       El nombre de la base de datos.





### Valores devueltos

Cuando database_name es proporcionado,
**oci_password_change()** devuelve **[true](#constant.true)** en caso de éxito,
o **[false](#constant.false)** si ocurre un error. Cuando connection es proporcionado,
**oci_password_change()** devuelve el recurso de
conexión en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_password_change()** para cambiar
     la contraseña de un usuario ya conectado

&lt;?php

$dbase      = 'localhost/orcl';
$user = 'cj';
$current_pw = 'welcome';
$new_pw = 'geelong';

$c = oci_pconnect($user, $current_pw, $dbase);
oci_password_change($c, $user, $current_pw, $new_pw);
echo "La nueva contraseña es: " . $new_pw . "\n";

?&gt;

    **Ejemplo #2 Ejemplo con oci_password_change()** para conectarse
     y cambiar la contraseña en una sola etapa

&lt;?php

$dbase      = 'localhost/orcl';
$user = 'cj';
$current_pw = 'welcome';
$new_pw = 'geelong';

$c = oci_pconnect($user, $current_pw, $dbase);
if (!$c) {
$m = oci_error();
    if ($m['code'] == 28001) { // "ORA-28001: La contraseña ha expirado"
// Conexión y cambio de contraseña en una etapa
$c = oci_password_change($dbase, $user, $current_pw, $new_pw);
        if ($c) {
echo "La nueva contraseña es: " . $new_pw . "\n";
}
}
}

if (!$c) { // El error original no era 28001, o el cambio de contraseña falló
$m = oci_error();
trigger_error('No se pudo conectar a la base de datos: '. $m['message'], E_USER_ERROR);
}

// Uso de la conexión $c
// ...

?&gt;

### Notas

**Nota**:

    Cambiar la contraseña, con esta función, o directamente en Oracle
    debe hacerse con precaución. Esto se debe a que las aplicaciones PHP podrían
    seguir utilizando conexiones persistentes con la contraseña antigua.
    La mejor práctica es reiniciar todos los servidores web una vez que
    la contraseña ha sido cambiada.

**Nota**:

    Si se actualizan las bibliotecas cliente o la base de datos Oracle
    desde una versión anterior a 11.2.0.3 a una versión 11.2.0.3 o superior,
    la función **oci_password_change()** puede devolver el error
    "ORA-1017: invalid username/password" hasta que las versiones del cliente y del
    servidor sean idénticas.

**Nota**:

    La segunda sintaxis de **oci_password_change()** está disponible desde
    la versión de OCI8 1.1.

# oci_pconnect

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_pconnect — Establece una conexión persistente a un servidor Oracle

### Descripción

**oci_pconnect**(
    [string](#language.types.string) $username,
    [string](#language.types.string) $password,
    [?](#language.types.null)[string](#language.types.string) $connection_string = **[null](#constant.null)**,
    [string](#language.types.string) $encoding = "",
    [int](#language.types.integer) $session_mode = **[OCI_DEFAULT](#constant.oci-default)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Establece una conexión persistente a un servidor Oracle y se identifica.

Las conexiones persistentes se almacenan en caché y se reutilizan
entre las consultas, reduciendo así la carga en cada carga de página;
una aplicación PHP típica tiene una sola conexión persistente a un servidor Oracle
por proceso hijo Apache (o proceso PHP FastCGI/CGI). Ver la sección sobre la
[Gestión de Conexiones y el Agrupamiento
de Conexiones](#oci8.connection) para más información.

### Parámetros

     username


       El nombre de usuario de Oracle.






     password


       La contraseña del usuario.






     connection_string



Contiene la instancia Oracle a la que debemos conectarnos.
Esto puede ser una [» cadena de conexión
rápida](https://www.oracle.com/pls/topic/lookup?ctx=dblatest&id=GUID-E5358DEA-D619-4B7B-A799-3D2F802500F1), un nombre de conexión del archivo tnsnames.ora,
o el nombre de una instancia local Oracle.

Si no se especifica o es **[null](#constant.null)**, PHP utiliza variables de entorno como **[TWO_TASK](#constant.two-task)** (en Linux)
o **[LOCAL](#constant.local)** (en Windows)
y **[ORACLE_SID](#constant.oracle-sid)** para determinar la instancia
Oracle a la que debemos conectarnos.

Para usar el método de conexión rápida, PHP debe estar vinculado con la biblioteca
cliente Oracle 10*g* o superior. La cadena de conexión rápida para Oracle
10*g* o superior es de la forma:
_[//]host_name[:port][/service_name]_. Desde Oracle
11*g*, la sintaxis es:
_[//]host_name[:port][/service_name][:server_type][/instance_name]_.
Opciones adicionales fueron introducidas con Oracle 19c
Los nombres de los servicios pueden ser encontrados ejecutando la utilidad
Oracle lsnrctl status en la máquina que ejecuta
la base de datos.

El archivo tnsnames.ora puede estar en el camino
de búsqueda de Oracle Net, que incluye
/your/path/to/instantclient/network/admin, $ORACLE_HOME/network/admin
y /etc.
Una solución alternativa sería definir TNS_ADMIN
para que el archivo $TNS_ADMIN/tnsnames.ora sea leído.
Asegúrese de que el demonio que ejecuta el servidor web tenga acceso de lectura a este
archivo.

     encoding

      Determina

el juego de caracteres utilizado por la biblioteca cliente Oracle. El juego de
caracteres no necesita ser idéntico al utilizado por la base de datos.
Si no coincide, Oracle hará lo mejor posible para convertir los datos
desde el juego de caracteres de la base de datos. Dependiendo de los juegos de caracteres,
el resultado puede no ser perfecto. Además, esta conversión
requiere un poco de tiempo del sistema.

Si no se especifica, la biblioteca
cliente Oracle determinará un juego de caracteres desde la variable de entorno
**[NLS_LANG](#constant.nls-lang)**.

Pasar este parámetro puede
reducir el tiempo de conexión.

     session_mode

      Este parámetro

está disponible a partir de PHP 5 (PECL OCI8 1.1) y acepta los siguientes valores:
**[OCI_DEFAULT](#constant.oci-default)**, **[OCI_SYSOPER](#constant.oci-sysoper)** y
**[OCI_SYSDBA](#constant.oci-sysdba)**.
Si bien la constante **[OCI_SYSOPER](#constant.oci-sysoper)** o la constante
**[OCI_SYSDBA](#constant.oci-sysdba)** es especificada, esta función intentará establecer
una conexión privilegiada usando identidades externas. Las
conexiones privilegiadas están desactivadas por omisión. Para activarlas, debe
definir la opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
a On.

PHP 5.3 (PECL OCI8 1.3.4) introducen el valor de modo
**[OCI_CRED_EXT](#constant.oci-cred-ext)**. Este modo solicita a Oracle usar una
identificación externa o bien del sistema operativo, que debe ser
configurada en la base de datos. El flag **[OCI_CRED_EXT](#constant.oci-cred-ext)**
solo puede ser usado con el nombre de usuario "/" asociado a una contraseña vacía.
La opción [oci8.privileged_connect](#ini.oci8.privileged-connect)
puede ser definida a On o Off.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** puede ser combinado con el modo
**[OCI_SYSOPER](#constant.oci-sysoper)** o el modo
**[OCI_SYSDBA](#constant.oci-sysdba)**.

**[OCI_CRED_EXT](#constant.oci-cred-ext)** no es soportado en Windows por razones de seguridad.

### Valores devueltos

Devuelve un identificador de conexión, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_pconnect()**

&lt;?php

// Conexión al servicio XE (i.e. base de datos) en la máquina "localhost"
$conn = oci_pconnect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT \* FROM employees');
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

?&gt;

Ver la función [oci_connect()](#function.oci-connect) para más ejemplos sobre el uso
de este parámetro.

### Notas

**Nota**:

    La duración y el número máximo
    de conexiones persistentes Oracle por proceso PHP pueden ajustarse
    definiendo los siguientes valores de configuración: [oci8.persistent_timeout](#ini.oci8.persistent-timeout),
    [oci8.ping_interval](#ini.oci8.ping-interval) y
    [oci8.max_persistent](#ini.oci8.max-persistent).

### Ver también

    - [oci_connect()](#function.oci-connect) - Establece una conexión con un servidor Oracle

    - [oci_new_connect()](#function.oci-new-connect) - Conexión al servidor Oracle utilizando una sola conexión

# oci_register_taf_callback

(PHP 7.0 &gt;= 7.0.21, PHP 8, PHP 7 &gt;= 7.1.7, PHP 8, PECL OCI8 &gt;= 2.1.7)

oci_register_taf_callback — Registra una función de retrollamada definida por el usuario para Oracle Database TAF

### Descripción

**oci_register_taf_callback**([resource](#language.types.resource) $connection, [?](#language.types.null)[callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Se registra una función de retrollamada definida por el usuario para connection.
Si connection falla debido a una falla de instancia o de red,
la función de retrollamada registrada será invocada varias veces durante
el basculement. Ver [Soporte de basculement de aplicación transparente OCI8 (TAF)](#oci8.taf) para más información.

Cuando **oci_register_taf_callback()** es llamada varias veces,
cada registro sobrescribe al anterior.

Utilizar [oci_unregister_taf_callback()](#function.oci-unregister-taf-callback) para cancelar explícitamente un
retrollamada definida por el usuario.

Los registros de retrollamada TAF NO serán guardados entre conexiones persistentes,
por lo tanto, el retrollamada debe ser re-registrado para una nueva conexión persistente.

### Parámetros

     connection


       Un identificador de conexión Oracle.






     callback


       Una función de retrollamada definida por el usuario para registrar TAF Oracle. Puede ser
       una cadena de nombre de función o una clausura (función anónima).




       La interfaz para una función de retrollamada definida por el usuario TAF es la siguiente:




       **userCallbackFn**([resource](#language.types.resource) $connection, [int](#language.types.integer) $event, [int](#language.types.integer) $type): [int](#language.types.integer)


       Ver la descripción del parámetro y un ejemplo en la página [
       Soporte de basculement de aplicación transparente OCI8 (TAF)](#oci8.taf).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [oci_unregister_taf_callback()](#function.oci-unregister-taf-callback) - Anular el registro de una función callback definida para Oracle Database TAF

# oci_result

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_result — Devuelve el valor de una columna en un resultado Oracle

### Descripción

**oci_result**([resource](#language.types.resource) $statement, [string](#language.types.string)|[int](#language.types.integer) $column): [mixed](#language.types.mixed)

Devuelve los datos de la columna column
en la fila actual del resultado statement.

Para más detalles sobre el mapeo de tipos de datos
realizado por la extensión OCI8, lea los [tipos de datos
soportados por el driver](#oci8.datatypes).

### Parámetros

     statement








     column


       Puede ser el número de la columna (empezando por 1), o el nombre de la columna. Si es el nombre de la columna, es porque
       las metadatos de Oracle lo presentan de esta manera, y estará en mayúsculas
       para las columnas creadas sin tener en cuenta la casilla.





### Valores devueltos

Devuelve todos los tipos, excepto los tipos abstractos (ROWIDs, LOBs y FILEs).
Devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con [oci_fetch()](#function.oci-fetch) y oci_result()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conn) {
$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT location_id, city FROM locations WHERE location_id &lt; 1200';
$stid = oci_parse($conn, $sql);
oci_execute($stid);

while (oci_fetch($stid)) {
    echo oci_result($stid, 'LOCATION_ID') . " es ";
echo oci_result($stid, 'CITY') . "&lt;br&gt;\n";
}

// Muestra:
// 1000 es Roma
// 1100 es Venice

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    - [oci_fetch_array()](#function.oci-fetch-array) - Lee una línea de un resultado en forma de array asociativo o numérico

    - [oci_fetch_assoc()](#function.oci-fetch-assoc) - Lee una línea de un resultado en forma de array asociativo

    - [oci_fetch_object()](#function.oci-fetch-object) - Lee una línea de un resultado en forma de objeto

    - [oci_fetch_row()](#function.oci-fetch-row) - Lee la siguiente línea de una consulta en forma de array numérico

    - [oci_fetch_all()](#function.oci-fetch-all) - Lee múltiples líneas de un resultado en un array multidimensional

# oci_rollback

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_rollback — Anula las transacciones Oracle en curso

### Descripción

**oci_rollback**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Anula todas las modificaciones no confirmadas para una
conexión connection Oracle
y finaliza la transacción actual. Todos los bloqueos serán
liberados asimismo. Todos los puntos de guardado Oracle
(SAVEPOINTS) serán eliminados.

Una transacción comienza cuando la primera consulta SQL
que modifica datos es ejecutada con la función
[oci_execute()](#function.oci-execute) utilizando el flag
**[OCI_NO_AUTO_COMMIT](#constant.oci-no-auto-commit)**. Las modificaciones siguientes
realizadas por otras consultas se convierten en parte de la
misma transacción. Las modificaciones realizadas durante una transacción son
temporales hasta que la transacción sea confirmada o anulada.
Los demás usuarios de la base de datos no verán estas modificaciones
hasta la confirmación de la transacción.

Al insertar o actualizar datos, el uso de transacciones es
altamente recomendado para garantizar la consistencia
relacional de los datos, pero también por razones de rendimiento.

### Parámetros

     connection


       Un identificador de conexión Oracle, devuelto por la función
       [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
       o [oci_new_connect()](#function.oci-new-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_rollback()**

&lt;?php

// Inserción en múltiples tablas, luego, anulación de las modificaciones si ocurren errores

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, "INSERT INTO mysalary (id, name) VALUES (1, 'Chris')");

// El flag OCI_NO_AUTO_COMMIT indica a Oracle no confirmar la inserción inmediatamente.
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {
    $e = oci_error($stid);
trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, 'INSERT INTO myschedule (startday) VALUES (12)');
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {
    $e = oci_error($stid);
oci_rollback($conn);  // Anulación de las modificaciones en las 2 tablas
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

// Confirmación de las modificaciones en las 2 tablas
$r = oci_commit($conn);
if (!$r) {
    $e = oci_error($conn);
trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

?&gt;

    **Ejemplo #2 Ejemplo de retorno a un punto de guardado (SAVEPOINT)**

&lt;?php
$stid = oci_parse($conn, 'UPDATE mytab SET id = 1111');
oci_execute($stid, OCI_NO_AUTO_COMMIT);

// creación del punto de guardado
$stid = oci_parse($conn, 'SAVEPOINT mysavepoint');
oci_execute($stid, OCI_NO_AUTO_COMMIT);

$stid = oci_parse($conn, 'UPDATE mytab SET id = 2222');
oci_execute($stid, OCI_NO_AUTO_COMMIT);

// utiliza una consulta SQL explícita para realizar el retorno al punto de guardado
$stid = oci_parse($conn, 'ROLLBACK TO SAVEPOINT mysavepoint');
oci_execute($stid, OCI_NO_AUTO_COMMIT);

oci_commit($conn); // mytab tiene ahora un id de 1111
?&gt;

### Notas

**Nota**:

    Las transacciones son anuladas automáticamente al cerrar
    la conexión, o cuando el script finaliza, cualquiera de los dos que ocurra primero.
    Debe llamarse explícitamente a la función [oci_commit()](#function.oci-commit)
    para confirmar la conexión.




    Todas las llamadas a la función [oci_execute()](#function.oci-execute) que utilizan
    el modo **[OCI_COMMIT_ON_SUCCESS](#constant.oci-commit-on-success)**, ya sea por defecto o
    de forma explícita, confirmarán todas las transacciones pendientes.




    Todas las consultas Oracle como CREATE
    o DROP confirmarán asimismo,
    automáticamente, todas las transacciones pendientes.

### Ver también

    - [oci_commit()](#function.oci-commit) - Valida las transacciones Oracle en curso

    - [oci_execute()](#function.oci-execute) - Ejecuta un comando SQL de Oracle

# oci_server_version

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_server_version — Devuelve la versión del servidor Oracle

### Descripción

**oci_server_version**([resource](#language.types.resource) $connection): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una cadena que contiene la versión del servidor
Oracle junto con las opciones disponibles.

### Parámetros

     connection







### Valores devueltos

Devuelve la información sobre la versión, en forma de [string](#language.types.string),
o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_server_version()**

&lt;?php
$conn = oci_connect("hr", "hrpwd", "localhost/XE");
echo "Versión del servidor : " . oci_server_version($conn);

// Muestra :
// Versión del servidor : Oracle Database 11g Enterprise Edition Release 11.2.0.1.0 - 64bit Production
// With the Partitioning, OLAP, Data Mining and Real Application Testing option

oci_close($conn);
?&gt;

### Ver también

    - [oci_client_version()](#function.oci-client-version) - Devuelve la versión de la biblioteca cliente Oracle

# oci_set_action

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.0)

oci_set_action — Define el nombre de la acción

### Descripción

**oci_set_action**([resource](#language.types.resource) $connection, [string](#language.types.string) $action): [bool](#language.types.boolean)

Define el nombre de la acción para un seguimiento de Oracle.

El nombre de la acción se registra en la base de datos durante el próximo
intercambio 'round-trip' desde PHP hacia la base de datos; típicamente, cuando se
ejecuta una consulta SQL.

El nombre de la acción puede ser consultado posteriormente desde la vista de administración
de la base de datos V$SESSION.
   Puede ser utilizado para rastrear y monitorear otras vistas como
   V$SQLAREA y DBMS_MONITOR.SERV_MOD_ACT_STAT_ENABLE.

El valor puede ser conservado a través de las conexiones persistentes.

### Parámetros

     connection

      Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     action


       String seleccionado por el usuario de hasta 32 caracteres
       de longitud.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Definición de una acción**

&lt;?php

$c = oci_connect('hr', 'welcome', 'localhost/XE');

// Registra la acción
oci_set_action($c, 'Friend Lookup');

// Código que genera un intercambio (round-trip), por ejemplo, una consulta:
$s = oci_parse($c, 'select \* from dual');
oci_execute($s);
oci_fetch_all($s, $res);

sleep(30);

?&gt;

// Durante la ejecución del script, el administrador puede ver las acciones
// en curso de ejecución:

sqlplus system/welcome
SQL&gt; select action from v$session;

### Notas

**Nota**: **Requerido por la versión Oracle**

Esta función está disponible si PHP está vinculado a partir de la versión 10*g*
de la biblioteca de la base de datos Oracle.

**Sugerencia**# Rendimiento
Con versiones antiguas de OCI8 o bases de datos Oracle antiguas, la información del cliente
puede ser definida usando el paquete Oracle DBMS_APPLICATION_INFO.
Esto es menos eficiente que usar la función
[oci_set_client_info()](#function.oci-set-client-info).

**Precaución**# Ida y vuelta

Algunas funciones OCI8 requieren ida y vuelta con la base de datos.
Estas ida y vuelta pueden ser evitadas al usar consultas cuyo resultado es almacenado en caché.

### Ver también

    - [oci_set_module_name()](#function.oci-set-module-name) - Define el nombre del módulo

    - [oci_set_client_info()](#function.oci-set-client-info) - Define la información del cliente

    - [oci_set_client_identifier()](#function.oci-set-client-identifier) - Define el identificador del cliente

    - [oci_set_db_operation()](#function.oci-set-db-operation) - Establece la operación de base de datos

# oci_set_call_timeout

(PHP 7.2 &gt;= 7.2.14, PHP 8, PHP 7 &gt;= 7.3.1, PHP 8, PECL OCI8 &gt;= 2.2.0)

oci_set_call_timeout — Define un tiempo de espera en milisegundos para las llamadas a la base de datos

### Descripción

**oci_set_call_timeout**([resource](#language.types.resource) $connection, [int](#language.types.integer) $timeout): [bool](#language.types.boolean)

Define un tiempo de espera que limita el tiempo máximo que puede tomar un intercambio de base de datos utilizando esta conexión.

Cada operación OCI8 puede realizar cero o más llamadas a la biblioteca cliente
de Oracle. Estas llamadas internas pueden luego realizar cero o más intercambios con
la base de datos Oracle. Si alguno de estos intercambios toma
más de time_out milisegundos,
entonces la operación se cancela y se devuelve un error a la aplicación.

    El valor time_out se aplica a cada intercambio
    individualmente, y no a la suma de todos los intercambios. El tiempo pasado
    procesando en PHP OCI8 antes o después de la finalización de cada
    intercambio no se cuenta.




    Cuando una llamada es interrumpida, Oracle intentará limpiar la
    conexión para su reutilización. Esta operación está permitida para ejecutarse durante
    otro período de time_out. Dependiendo del
    resultado de la limpieza, la conexión puede o no ser reutilizable.




    Cuando se utilizan conexiones persistentes, el valor del tiempo de espera será
    conservado entre las consultas PHP.

La función **oci_set_call_timeout()** está disponible
cuando OCI8 utiliza las bibliotecas clientes de Oracle 18 (o posteriores).

### Parámetros

     connection

       Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     timeout


       El tiempo máximo en milisegundos que puede tomar un intercambio entre PHP y la base de datos Oracle.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Configuración del tiempo de espera**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');
oci_set_call_timeout($conn, 5000);

?&gt;

# oci_set_client_identifier

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.0)

oci_set_client_identifier — Define el identificador del cliente

### Descripción

**oci_set_client_identifier**([resource](#language.types.resource) $connection, [string](#language.types.string) $client_id): [bool](#language.types.boolean)

Define el identificador del cliente, utilizado por numerosos componentes
de la base de datos para identificar a los usuarios de la aplicación
que se autentican con el mismo nombre de usuario de la base de datos.

El identificador del cliente se registra en la base de datos durante el próximo
intercambio 'round-trip' desde PHP hacia la base de datos; típicamente,
la ejecución de una consulta SQL.

El identificador puede ser consultado posteriormente, por ejemplo,
con la consulta SELECT SYS_CONTEXT('USERENV','CLIENT_IDENTIFIER')
FROM DUAL. Una vista de administración de la base de datos,
como la vista V$SESSION también contiene el valor.
Puede ser utilizado con DBMS_MONITOR.CLIENT_ID_TRACE_ENABLE
en el contexto de un trazado. Asimismo, puede ser utilizado en el marco
de un audit.

El valor puede ser conservado a lo largo de las diferentes consultas de las páginas
que utilizan la misma conexión persistente.

### Parámetros

     connection

      Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     client_id


       Cadena de caracteres elegida por el usuario de hasta 64 bytes de longitud.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Define el identificador del cliente como el usuario de la aplicación**

&lt;?php

// Recupera el nombre utilizado para la identificación del usuario de la aplicación
session_start();
$un = my_validate_session($\_SESSION['username']);
$c = oci_connect('myschema', 'welcome', 'localhost/XE');

// Informa a Oracle sobre este usuario
oci_set_client_identifier($c, $un);

// El próximo intercambio (round-trip) hacia la base de datos validará este identificador
$s = oci_parse($c, 'select mydata from mytable');
oci_execute($s);

// ...

?&gt;

### Notas

**Precaución**# Ida y vuelta

Algunas funciones OCI8 requieren ida y vuelta con la base de datos.
Estas ida y vuelta pueden ser evitadas al usar consultas cuyo resultado es almacenado en caché.

### Ver también

    - [oci_set_module_name()](#function.oci-set-module-name) - Define el nombre del módulo

    - [oci_set_action()](#function.oci-set-action) - Define el nombre de la acción

    - [oci_set_client_info()](#function.oci-set-client-info) - Define la información del cliente

    - [oci_set_db_operation()](#function.oci-set-db-operation) - Establece la operación de base de datos

# oci_set_client_info

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.0)

oci_set_client_info — Define la información del cliente

### Descripción

**oci_set_client_info**([resource](#language.types.resource) $connection, [string](#language.types.string) $client_info): [bool](#language.types.boolean)

Define la información del cliente para el trazado de Oracle.

La información del cliente se registra en la base de datos durante el próximo
intercambio 'round-trip' desde PHP hacia la base de datos; típicamente,
cuando se ejecuta una consulta SQL.

La información del cliente puede ser consultada posteriormente
desde la vista de administración de la base de datos V$SESSION.

El valor se conserva mediante el mecanismo de conexiones persistentes.

### Parámetros

     connection

      Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     client_info


       Cadena de caracteres de hasta 64 bytes de longitud.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Define la información del cliente**

&lt;?php

$c = oci_connect('hr', 'welcome', 'localhost/XE');

// Registra la información del cliente
oci_set_client_info($c, 'My Application Version 2');

// Código que genera un intercambio (round-trip), por ejemplo, una consulta:
$s = oci_parse($c, 'select \* from dual');
oci_execute($s);
oci_fetch_all($s, $res);

sleep(30);

?&gt;

// Durante la ejecución de este script, el administrador puede ver la información
// del cliente:

sqlplus system/welcome
SQL&gt; select client_info from v$session;

### Notas

**Nota**: **Requerido por la versión Oracle**

Esta función está disponible si PHP está vinculado a partir de la versión 10*g*
de la biblioteca de la base de datos Oracle.

**Sugerencia**# Rendimiento
Con versiones antiguas de OCI8 o bases de datos Oracle antiguas, la información del cliente
puede ser definida usando el paquete Oracle DBMS_APPLICATION_INFO.
Esto es menos eficiente que usar la función
**oci_set_client_info()**.

**Precaución**# Ida y vuelta

Algunas funciones OCI8 requieren ida y vuelta con la base de datos.
Estas ida y vuelta pueden ser evitadas al usar consultas cuyo resultado es almacenado en caché.

### Ver también

    - [oci_set_module_name()](#function.oci-set-module-name) - Define el nombre del módulo

    - [oci_set_action()](#function.oci-set-action) - Define el nombre de la acción

    - [oci_set_client_identifier()](#function.oci-set-client-identifier) - Define el identificador del cliente

    - [oci_set_db_operation()](#function.oci-set-db-operation) - Establece la operación de base de datos

# oci_set_db_operation

(PHP 7 &gt;= 7.2.14, PHP 8, PHP 7 &gt;= 7.3.1, PHP 8, PECL OCI8 &gt;= 2.2.0)

oci_set_db_operation — Establece la operación de base de datos

### Descripción

**oci_set_db_operation**([resource](#language.types.resource) $connection, [string](#language.types.string) $action): [bool](#language.types.boolean)

    Establece el DBOP para el seguimiento de Oracle.

El nombre de la operación de la base de datos se registra en la base de datos cuando
se produce el siguiente "ida y vuelta" de PHP a la base de datos, normalmente cuando
se ejecuta una instrucción SQL.

La operación de la base de datos puede consultarse posteriormente desde las
vistas de administración de la base de datos como V$SQL_MONITOR.

La función **oci_set_db_operation()** está disponible cuando
OCI8 utiliza la biblioteca cliente de Oracle 12 (o posterior) y Oracle Database 12 (o posterior).

### Parámetros

     connection

       Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     action


       El string elegida por el usuario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ajuste del DBOP**

&lt;?php

$c = oci_connect('hr', 'welcome', 'localhost/XE');

// Record the operation
oci_set_db_operation($c, 'main query');

// Code that causes a round-trip, for example a query:
$s = oci_parse($c, 'select \* from dual');
oci_execute($s);
oci_fetch_all($s, $res);

sleep(30);

?&gt;

// While the script is running, the administrator can see the database operations
// being performed:

sqlplus system/welcome
SQL&gt; select dbop_name from v$sql_monitor;

### Notas

**Precaución**# Ida y vuelta

Algunas funciones OCI8 requieren ida y vuelta con la base de datos.
Estas ida y vuelta pueden ser evitadas al usar consultas cuyo resultado es almacenado en caché.

### Ver también

       - [oci_set_action()](#function.oci-set-action) - Define el nombre de la acción

       - [oci_set_module_name()](#function.oci-set-module-name) - Define el nombre del módulo

       - [oci_set_client_info()](#function.oci-set-client-info) - Define la información del cliente

       - [oci_set_client_identifier()](#function.oci-set-client-identifier) - Define el identificador del cliente



# oci_set_edition

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.0)

oci_set_edition — Define la edición de la base de datos

### Descripción

**oci_set_edition**([string](#language.types.string) $edition): [bool](#language.types.boolean)

Define la edición de los objetos de la base de datos a utilizar por las
conexiones.

La edición Oracle permite que versiones concurrentes de las aplicaciones
se ejecuten utilizando el mismo nombre de esquema y objetos.
Esto es práctico para actualizar sistemas en vivo.

Llame a la función **oci_set_edition()** antes de llamar
a una función como [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o [oci_new_connect()](#function.oci-new-connect).

Si se define una edición pero no es válida en la base de datos,
cualquier intento de conexión fallará incluso si la función
**oci_set_edition()** devuelve un estado de éxito.

Al utilizar conexiones persistentes, si una conexión con la edición
solicitada ya existe, será reutilizada.
De lo contrario, se creará una conexión persistente diferente.

### Parámetros

     edition


       Nombre de la edición Oracle, previamente creada con el comando
       SQL "CREATE EDITION".





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 2 scripts pueden utilizar diferentes versiones
     de myfunc() al mismo momento**

&lt;?php

// Archivo 1

echo "Versión 1 de la aplicación\n";

oci_set_edition('ORA$BASE');
$c = oci_connect('hr', 'welcome', 'localhost/XE');

$s = oci_parse($c, "begin :r := myfunc(); end;");
oci_bind_by_name($s, ":r", $r, 20);
oci_execute($s);
echo "El resultado es $r\n";

?&gt;

&lt;?php

// Archivo 2

echo "Versión 2 de la aplicación\n";

oci_set_edition('E1');
$c = oci_connect('hr', 'welcome', 'localhost/XE');

$s = oci_parse($c, "begin :r := myfunc(); end;");
oci_bind_by_name($s, ":r", $r, 20);
oci_execute($s);
echo "El resultado es $r\n";

?&gt;

### Notas

**Nota**:
**Requisito de la versión Oracle**

    Esta función está disponible para Oracle 11*g*R2 y versiones posteriores.

**Precaución**

# Conexiones persistentes

    Para evitar inconsistencias de datos o errores inesperados,
    no se utilice la consulta ALTER SESSION SET EDITION para cambiar
    una edición en las conexiones persistentes.

**Precaución**

# Cola de conexiones DRCP

    Para evitar inconsistencias de datos o errores inesperados
    al utilizar ediciones y
    [DRCP](#oci8.connection) con Oracle 11.2.0.1,
    mantenga una correspondencia uno-a-uno entre
    [oci8.connection_class](#ini.oci8.connection-class)
    y el nombre de la edición utilizado por sus aplicaciones. Cada servidor
    para una clase de conexión dada debe ser utilizado con una sola
    edición. Esta restricción fue eliminada en Oracle 11.2.0.2.

# oci_set_module_name

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8, PECL OCI8 &gt;= 1.4.0)

oci_set_module_name — Define el nombre del módulo

### Descripción

**oci_set_module_name**([resource](#language.types.resource) $connection, [string](#language.types.string) $name): [bool](#language.types.boolean)

Define el nombre del módulo para el trazado de Oracle.

El nombre del módulo se registra en la base de datos durante el próximo
viaje de ida y vuelta 'round-trip' desde PHP hacia la base de datos;
típicamente, cuando se ejecuta una consulta SQL.

El nombre podrá ser consultado posteriormente desde la vista de administración
de la base de datos como V$SESSION. También podrá
   ser utilizado para el trazado y la supervisión, como con
   V$SQLAREA y DBMS_MONITOR.SERV_MOD_ACT_STAT_ENABLE.

El valor será retenido mediante el mecanismo de conexiones persistentes.

### Parámetros

     connection

      Un identificador de conexión Oracle,

devuelto por la función [oci_connect()](#function.oci-connect), [oci_pconnect()](#function.oci-pconnect)
o la función [oci_new_connect()](#function.oci-new-connect).

     name


       String seleccionado por el usuario con una longitud máxima de 48 caracteres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Definición del nombre del módulo**

&lt;?php

$c = oci_connect('hr', 'welcome', 'localhost/XE');

// Registro del módulo
oci_set_module_name($c, 'Home Page');

// Código que genera un viaje de ida y vuelta (round-trip), por ejemplo, una consulta:
$s = oci_parse($c, 'select \* from dual');
oci_execute($s);
oci_fetch_all($s, $res);

sleep(30);
?&gt;

// Durante la ejecución del script, el administrador puede ver los
// módulos en uso:

sqlplus system/welcome
SQL&gt; select module from v$session;

### Notas

**Nota**: **Requerido por la versión Oracle**

Esta función está disponible si PHP está vinculado a partir de la versión 10*g*
de la biblioteca de la base de datos Oracle.

**Sugerencia**# Rendimiento
Con versiones antiguas de OCI8 o bases de datos Oracle antiguas, la información del cliente
puede ser definida usando el paquete Oracle DBMS_APPLICATION_INFO.
Esto es menos eficiente que usar la función
[oci_set_client_info()](#function.oci-set-client-info).

**Precaución**# Ida y vuelta

Algunas funciones OCI8 requieren ida y vuelta con la base de datos.
Estas ida y vuelta pueden ser evitadas al usar consultas cuyo resultado es almacenado en caché.

### Ver también

    - [oci_set_action()](#function.oci-set-action) - Define el nombre de la acción

    - [oci_set_client_info()](#function.oci-set-client-info) - Define la información del cliente

    - [oci_set_client_identifier()](#function.oci-set-client-identifier) - Define el identificador del cliente

    - [oci_set_db_operation()](#function.oci-set-db-operation) - Establece la operación de base de datos

# oci_set_prefetch

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_set_prefetch — Indica el número de filas que deben leerse por adelantado por Oracle

### Descripción

**oci_set_prefetch**([resource](#language.types.resource) $statement, [int](#language.types.integer) $rows): [bool](#language.types.boolean)

Define el número de filas a pre-cargar por las bibliotecas clientes de Oracle
después de una llamada exitosa a la función [oci_execute()](#function.oci-execute) pero también
para cada llamada a las funciones internas de recuperación de filas en la base
de datos. Para las consultas que devuelven un gran número de filas, el rendimiento
puede mejorar significativamente aumentando el número de filas a pre-cargar respecto
al valor por omisión definido por la opción de configuración [oci8.default_prefetch](#ini.oci8.default-prefetch).

La pre-carga es una forma eficiente de devolver más de una fila de datos
desde la base de datos por cada envío de red. Esto permite una mejor utilización
de la red y del CPU. La pre-carga de filas es interna a OCI8 y el comportamiento
de las funciones de recuperación de datos permanece inalterado según el valor
del contador de pre-carga. Por ejemplo, la función [oci_fetch_row()](#function.oci-fetch-row)
siempre devolverá una fila. El buffer de pre-carga es específico de cada consulta
y no será utilizado para re-ejecutar consultas o por otras conexiones.

Es conveniente llamar a la función **oci_set_prefetch()** antes
de la función [oci_execute()](#function.oci-execute).

Una forma de mejorar la eficiencia es definir el valor de pre-carga a un valor
razonable según la red y la base de datos a gestionar. Para las consultas que
devuelven un número muy grande de filas, es conveniente recuperar el conjunto
de filas por partes (es decir, definir el valor de pre-carga a un valor inferior
al número total de filas). Esto permite a la base de datos gestionar las consultas
de otros usuarios mientras el script PHP gestiona el conjunto de filas actual.

La pre-carga fue introducida en Oracle 8*i*.
La pre-carga REF CURSOR fue introducida en
Oracle 11*g*R2 y está disponible cuando PHP está vinculado
con las bibliotecas clientes de Oracle 11*g*R2 (o superior).
Los cursores anidados de pre-carga fueron introducidos en Oracle
11*g*R2 y requieren tanto las bibliotecas clientes de Oracle,
como una base de datos en versión 11*g*R2 (o superior).

La pre-carga no es soportada cuando las consultas contienen columnas de tipo LONG o LOB. El valor de pre-carga será utilizado en todas las situaciones
donde la pre-carga es soportada.

Al utilizar la base de datos Oracle 12*c*,
el conjunto de valores pre-cargados por PHP puede ser sobrescrito por el archivo
de configuración cliente de Oracle oraaccess.xml.
Consulte la documentación de Oracle para más detalles.

### Parámetros

     statement

      Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

     rows


       El número de filas a pre-cargar, &gt;=0





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Modificación del valor de pre-carga para una consulta**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT \* FROM myverybigtable');
oci_set_prefetch($stid, 300);  // A definir antes de la llamada a la función oci_execute()
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($stid);
oci_close($conn);

?&gt;

    **Ejemplo #2 Modificación del valor de pre-carga para una recuperación REF CURSOR**

&lt;?php
/\*
Creación del procedimiento almacenado PL/SQL siguiente :

CREATE OR REPLACE PROCEDURE myproc(p1 OUT SYS_REFCURSOR) AS
BEGIN
OPEN p1 FOR SELECT _ FROM all_objects WHERE ROWNUM &lt; 5000;
END;
_/

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'BEGIN myproc(:rc); END;');
$refcur = oci_new_cursor($conn);
oci_bind_by_name($stid, ':rc', $refcur, -1, OCI_B_CURSOR);
oci_execute($stid);

// Modificación del valor de pre-carga antes de la ejecución del cursor.
// La pre-carga REF CURSOR funciona cuando PHP está vinculado con las bibliotecas clientes
// Oracle 11gR2 (o superior)
oci_set_prefetch($refcur, 200);
oci_execute($refcur);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($refcur, OCI_ASSOC+OCI_RETURN_NULLS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($refcur);
oci_free_statement($stid);
oci_close($conn);

?&gt;

Si PHP OCI8 recupera datos desde un cursor REF CURSOR
y luego devuelve el cursor REF CURSOR a un segundo
procedimiento almacenado para su procesamiento, entonces es conveniente definir
la pre-carga de REF CURSOR a 0
para evitar perder filas del conjunto de resultados. El valor de pre-carga es
el número de filas adicionales a recuperar para cada llamada interna OCI8 a la base de datos,
por lo tanto, definirlo a 0 significa simplemente que se desea
recuperar una sola fila a la vez.

    **Ejemplo #3 Definición del valor de pre-carga al devolver un cursor REF CURSOR a Oracle**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/orcl');

// Recuperación del cursor REF CURSOR
$stid = oci_parse($conn, 'BEGIN myproc(:rc_out); END;');
$refcur = oci_new_cursor($conn);
oci_bind_by_name($stid, ':rc_out', $refcur, -1, OCI_B_CURSOR);
oci_execute($stid);

// Muestra 2 filas, pero no pre-carga filas adicionales
// de lo contrario, estas filas adicionales no serán pasadas a myproc_use_rc().
oci_set_prefetch($refcur, 0);
oci_execute($refcur);
$row = oci_fetch_array($refcur);
var_dump($row);
$row = oci_fetch_array($refcur);
var_dump($row);

// pasa el cursor REF CURSOR a myproc_use_rc() para realizar otros
// procesamientos en el conjunto de resultados
$stid = oci_parse($conn, 'begin myproc_use_rc(:rc_in); end;');
oci_bind_by_name($stid, ':rc_in', $refcur, -1, OCI_B_CURSOR);
oci_execute($stid);

?&gt;

### Ver también

    -
     la opción de configuración
     [oci8.default_prefetch](#ini.oci8.default-prefetch)

# oci_set_prefetch_lob

(PHP 8.2, PECL OCI8 &gt;= 3.2)

oci_set_prefetch_lob — Define la cantidad de datos precargados para cada CLOB o BLOB.

### Descripción

**oci_set_prefetch_lob**([resource](#language.types.resource) $statement, [int](#language.types.integer) $prefetch_lob_size): [bool](#language.types.boolean)

Define el tamaño del búfer interno utilizado para recuperar cada valor CLOB o BLOB cuando
la implementación recupera el localizador LOB interno de Oracle de la base de datos después
de una llamada exitosa a [oci_execute()](#function.oci-execute) y para cada
solicitud de recuperación interna posterior a la base de datos. Aumentar este valor
puede mejorar el rendimiento de recuperación de los LOB más pequeños al reducir los viajes
entre PHP y la base de datos. El uso de la memoria cambiará.

Este valor afecta a los LOB devueltos como instancias OCILob y también a aquellos devueltos
utilizando **[OCI_RETURN_LOBS](#constant.oci-return-lobs)**.

Llamar a **oci_set_prefetch_lob()** antes de llamar
a [oci_execute()](#function.oci-execute). Si no se hace, se utiliza
el valor de [oci8.prefetch_lob_size](#ini.oci8.prefetch-lob-size).

El valor de prefetch LOB debe definirse únicamente con Oracle Database 12.2 o posterior.

### Parámetros

     statement

       Un identificador de consulta OCI8

creado por la función [oci_parse()](#function.oci-parse) y ejecutado por la función
[oci_execute()](#function.oci-execute), o un identificador de consulta REF
CURSOR.

     prefetch_lob_size


       El número de bytes de cada LOB a precargar, &gt;= 0





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cambio del valor de prefetch LOB para una consulta**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT myclob FROM mytable');
oci_set_prefetch_lob($stid, 100000);  // Establecer antes de llamar a oci_execute()
oci_execute($stid);

echo "&lt;table border='1'&gt;\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS+OCI_RETURN_LOBS)) {
echo "&lt;tr&gt;\n";
foreach ($row as $item) {
        echo "    &lt;td&gt;".($item !== null ? htmlentities($item, ENT_QUOTES) : "&amp;nbsp;")."&lt;/td&gt;\n";
}
echo "&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

oci_free_statement($stid);
oci_close($conn);

?&gt;

### Ver también

    -
     La opción ini
     [oci8.prefetch_lob_size](#ini.oci8.prefetch-lob-size)

# oci_statement_type

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

oci_statement_type — Devuelve el tipo de consulta Oracle

### Descripción

**oci_statement_type**([resource](#language.types.resource) $statement): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve una palabra clave que identifica el tipo de
la consulta statement OCI8.

### Parámetros

     statement


       Un identificador de consulta OCI válido, devuelto
       por la función [oci_parse()](#function.oci-parse).





### Valores devueltos

Devuelve el tipo de consulta statement
en forma de una de las siguientes cadenas.

    <caption>**Tipo de consulta**</caption>



       Cadena devuelta
       Notas






       ALTER
        



       BEGIN
        



       CALL
        



       CREATE
        



       DECLARE
        



       DELETE
        



       DROP
        



       INSERT
        



       SELECT
        



       UPDATE
        



       UNKNOWN
        




Devuelve **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con oci_statement_type()**

&lt;?php

$conn = oci_connect('hr', 'welcome', 'localhost/XE');

$stid = oci_parse($conn, 'DELETE FROM departments WHERE department_id = 130;');
if (oci_statement_type($stid) == "DELETE") {
    trigger_error('No se está autorizado a borrar líneas en esta tabla', E_USER_ERROR);
}
else {
    oci_execute($stid); // borra la línea
}

oci_free_statement($stid);
oci_close($conn);

?&gt;

# oci_unregister_taf_callback

(PHP 7.0 &gt;= 7.0.23, PHP 8, PHP 7 &gt;= 7.1.9, PHP 8, PECL OCI8 &gt;= 2.1.7)

oci_unregister_taf_callback — Anular el registro de una función callback definida para Oracle Database TAF

### Descripción

**oci_unregister_taf_callback**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Anula el registro de la función callback definida por el usuario registrada en la conexión
por [oci_register_taf_callback()](#function.oci-register-taf-callback). Véase
[Soporte para 'Transparent Application Failover' (TAF) de OCI8
](#oci8.taf) para más información.

### Parámetros

     connection


       Un identificador de conexión de Oracle.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [oci_register_taf_callback()](#function.oci-register-taf-callback) - Registra una función de retrollamada definida por el usuario para Oracle Database TAF

## Tabla de contenidos

- [oci_bind_array_by_name](#function.oci-bind-array-by-name) — Asocia un array PHP a un parámetro de array Oracle PL/SQL
- [oci_bind_by_name](#function.oci-bind-by-name) — Asocia una variable PHP a un marcador Oracle
- [oci_cancel](#function.oci-cancel) — Cancela la lectura del cursor
- [oci_client_version](#function.oci-client-version) — Devuelve la versión de la biblioteca cliente Oracle
- [oci_close](#function.oci-close) — Cierra una conexión Oracle
- [oci_commit](#function.oci-commit) — Valida las transacciones Oracle en curso
- [oci_connect](#function.oci-connect) — Establece una conexión con un servidor Oracle
- [oci_define_by_name](#function.oci-define-by-name) — Asocia una variable PHP con una columna para una consulta de recuperación de datos
- [oci_error](#function.oci-error) — Devuelve el último error de Oracle
- [oci_execute](#function.oci-execute) — Ejecuta un comando SQL de Oracle
- [oci_fetch](#function.oci-fetch) — Lee la siguiente línea de un resultado Oracle en un buffer interno
- [oci_fetch_all](#function.oci-fetch-all) — Lee múltiples líneas de un resultado en un array multidimensional
- [oci_fetch_array](#function.oci-fetch-array) — Lee una línea de un resultado en forma de array asociativo o numérico
- [oci_fetch_assoc](#function.oci-fetch-assoc) — Lee una línea de un resultado en forma de array asociativo
- [oci_fetch_object](#function.oci-fetch-object) — Lee una línea de un resultado en forma de objeto
- [oci_fetch_row](#function.oci-fetch-row) — Lee la siguiente línea de una consulta en forma de array numérico
- [oci_field_is_null](#function.oci-field-is-null) — Comprueba si un campo de la fila recuperada es nulo
- [oci_field_name](#function.oci-field-name) — Devuelve el nombre de un campo Oracle
- [oci_field_precision](#function.oci-field-precision) — Lee la precisión de un campo Oracle
- [oci_field_scale](#function.oci-field-scale) — Lee la escala de una columna Oracle
- [oci_field_size](#function.oci-field-size) — Devuelve el tamaño de un campo Oracle
- [oci_field_type](#function.oci-field-type) — Devuelve el tipo de datos de un campo Oracle
- [oci_field_type_raw](#function.oci-field-type-raw) — Lee los datos brutos del tipo de un campo
- [oci_free_descriptor](#function.oci-free-descriptor) — Libera un descriptor
- [oci_free_statement](#function.oci-free-statement) — Libera todos los recursos asociados con una sentencia o cursor
- [oci_get_implicit_resultset](#function.oci-get-implicit-resultset) — Retorna el hijo siguiente de un recurso de consulta desde un recurso de consulta padre que tiene un juego de resultados implícito de Oracle Database
- [oci_lob_copy](#function.oci-lob-copy) — Copia un LOB Oracle
- [oci_lob_is_equal](#function.oci-lob-is-equal) — Comparar dos LOB/FILE de Oracle
- [oci_new_collection](#function.oci-new-collection) — Inicializa una nueva colección Oracle
- [oci_new_connect](#function.oci-new-connect) — Conexión al servidor Oracle utilizando una sola conexión
- [oci_new_cursor](#function.oci-new-cursor) — Asigna y devuelve un nuevo cursor Oracle
- [oci_new_descriptor](#function.oci-new-descriptor) — Inicializa un nuevo puntero vacío de LOB/FILE de Oracle
- [oci_num_fields](#function.oci-num-fields) — Devuelve el número de columnas en un resultado Oracle
- [oci_num_rows](#function.oci-num-rows) — Devuelve el número de filas afectadas durante el último comando Oracle
- [oci_parse](#function.oci-parse) — Prepara una consulta SQL con Oracle
- [oci_password_change](#function.oci-password-change) — Modifica la contraseña de un usuario Oracle
- [oci_pconnect](#function.oci-pconnect) — Establece una conexión persistente a un servidor Oracle
- [oci_register_taf_callback](#function.oci-register-taf-callback) — Registra una función de retrollamada definida por el usuario para Oracle Database TAF
- [oci_result](#function.oci-result) — Devuelve el valor de una columna en un resultado Oracle
- [oci_rollback](#function.oci-rollback) — Anula las transacciones Oracle en curso
- [oci_server_version](#function.oci-server-version) — Devuelve la versión del servidor Oracle
- [oci_set_action](#function.oci-set-action) — Define el nombre de la acción
- [oci_set_call_timeout](#function.oci-set-call-timout) — Define un tiempo de espera en milisegundos para las llamadas a la base de datos
- [oci_set_client_identifier](#function.oci-set-client-identifier) — Define el identificador del cliente
- [oci_set_client_info](#function.oci-set-client-info) — Define la información del cliente
- [oci_set_db_operation](#function.oci-set-db-operation) — Establece la operación de base de datos
- [oci_set_edition](#function.oci-set-edition) — Define la edición de la base de datos
- [oci_set_module_name](#function.oci-set-module-name) — Define el nombre del módulo
- [oci_set_prefetch](#function.oci-set-prefetch) — Indica el número de filas que deben leerse por adelantado por Oracle
- [oci_set_prefetch_lob](#function.oci-set-prefetch-lob) — Define la cantidad de datos precargados para cada CLOB o BLOB.
- [oci_statement_type](#function.oci-statement-type) — Devuelve el tipo de consulta Oracle
- [oci_unregister_taf_callback](#function.oci-unregister-taf-callback) — Anular el registro de una función callback definida para Oracle Database TAF

# La clase OCICollection

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

## Introducción

    Funcionalidades de las colecciones OCI8 Collection.

**Nota**:

    La clase **OCI-Collection** fue renombrada a **OCICollection** en PHP 8 OCI8 3.0.0 para alinearse con los estándares de nomenclatura de PHP.

## Sinopsis de la Clase

     class **OCICollection**
     {

    /* Métodos */

public [append](#ocicollection.append)([string](#language.types.string) $value): [bool](#language.types.boolean)
public [assign](#ocicollection.assign)([OCICollection](#class.ocicollection) $from): [bool](#language.types.boolean)
public [assignElem](#ocicollection.assignelem)([int](#language.types.integer) $index, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [free](#ocicollection.free)(): [bool](#language.types.boolean)
public [getElem](#ocicollection.getelem)([int](#language.types.integer) $index): [string](#language.types.string)|[float](#language.types.float)|[null](#language.types.null)|[false](#language.types.singleton)
public [max](#ocicollection.max)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [size](#ocicollection.size)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [trim](#ocicollection.trim)([int](#language.types.integer) $num): [bool](#language.types.boolean)

}

# OCICollection::append

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::append — Añade un elemento a una colección Oracle

### Descripción

public **OCICollection::append**([string](#language.types.string) $value): [bool](#language.types.boolean)

Añade un elemento al final de una colección Oracle.

### Parámetros

     value


       El valor a añadir a la colección.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinear con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::assign](#ocicollection.assign)

# OCICollection::assign

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::assign — Asigna un valor a una colección desde otra colección Oracle

### Descripción

public **OCICollection::assign**([OCICollection](#class.ocicollection) $from): [bool](#language.types.boolean)

Asigna un valor a una colección, a partir de la colección
from. Las dos colecciones deben haber sido
creadas con [oci_new_collection()](#function.oci-new-collection) antes de utilizar
esta función.

### Parámetros

     from


       Una instancia OCICollection.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::append](#ocicollection.append)

# OCICollection::assignElem

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::assignElem — Asigna un valor a un elemento de una colección Oracle

### Descripción

public **OCICollection::assignElem**([int](#language.types.integer) $index, [string](#language.types.string) $value): [bool](#language.types.boolean)

Asigna un valor al elemento cuyo índice es index.

### Parámetros

     index


       El índice del elemento. El primero vale 0.






     value


       Puede ser una [string](#language.types.string) o un número.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::getElem](#ocicollection.getelem)

# OCICollection::free

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::free — Libera los recursos asociados con un objeto de colección

### Descripción

public **OCICollection::free**(): [bool](#language.types.boolean)

Libera los recursos asociados con un objeto de colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [oci_new_collection](#function.oci-new-collection)

# OCICollection::getElem

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::getElem — Devuelve el valor de un elemento de una colección Oracle

### Descripción

public **OCICollection::getElem**([int](#language.types.integer) $index): [string](#language.types.string)|[float](#language.types.float)|[null](#language.types.null)|[false](#language.types.singleton)

Devuelve el valor del elemento en el índice index (comenzando en 0).

### Parámetros

     index


       El índice del elemento. El primero vale 1.





### Valores devueltos

Devuelve **[false](#constant.false)** si este elemento no existe; **[null](#constant.null)**, si el elemento es **[null](#constant.null)**, un string si la columna es de tipo string, y un número si es un campo numérico.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::assignElem](#ocicollection.assignelem)

# OCICollection::max

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::max — Retorna el número máximo de valores de una colección Oracle

### Descripción

public **OCICollection::max**(): [int](#language.types.integer)|[false](#language.types.singleton)

Retorna el número máximo de valores de una colección Oracle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el número máximo, en forma de [int](#language.types.integer), o
**[false](#constant.false)** si ocurre un error.

Si el valor retornado es 0, entonces el número de elementos no está limitado.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::size](#ocicollection.size)

# OCICollection::size

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::size — Devuelve el tamaño de una colección Oracle

### Descripción

public **OCICollection::size**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño de una colección Oracle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de elementos de la colección, o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::max](#ocicollection.max)

# OCICollection::trim

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCICollection::trim — Elimina los últimos elementos de una colección Oracle

### Descripción

public **OCICollection::trim**([int](#language.types.integer) $num): [bool](#language.types.boolean)

Elimina los num
últimos elementos de una colección.

### Parámetros

     num


       El número de elementos a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Collection** ha sido renombrada a
       [OCICollection](#class.ocicollection) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCICollection::size](#ocicollection.size)

## Tabla de contenidos

- [OCICollection::append](#ocicollection.append) — Añade un elemento a una colección Oracle
- [OCICollection::assign](#ocicollection.assign) — Asigna un valor a una colección desde otra colección Oracle
- [OCICollection::assignElem](#ocicollection.assignelem) — Asigna un valor a un elemento de una colección Oracle
- [OCICollection::free](#ocicollection.free) — Libera los recursos asociados con un objeto de colección
- [OCICollection::getElem](#ocicollection.getelem) — Devuelve el valor de un elemento de una colección Oracle
- [OCICollection::max](#ocicollection.max) — Retorna el número máximo de valores de una colección Oracle
- [OCICollection::size](#ocicollection.size) — Devuelve el tamaño de una colección Oracle
- [OCICollection::trim](#ocicollection.trim) — Elimina los últimos elementos de una colección Oracle

# La clase OCILob

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

## Introducción

Funcionalidad OCI8 LOB para los objetos de datos binarios grandes (BLOB) y de caracteres (CLOB).

**Nota**:

La clase **OCI-Lob** fue renombrada a **OCILob** en PHP 8 y PECL OCI8 3.0.0 para alinearse con los estándares de nomenclatura de PHP.

## Sinopsis de la Clase

    class **OCILob**
    {

/_ Métodos _/

public [append](#ocilob.append)([OCILob](#class.ocilob) $from): [bool](#language.types.boolean)
public [close](#ocilob.close)(): [bool](#language.types.boolean)
public [eof](#ocilob.eof)(): [bool](#language.types.boolean)
public [erase](#ocilob.erase)([?](#language.types.null)[int](#language.types.integer) $offset = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)
public [export](#ocilob.export)([string](#language.types.string) $filename, [?](#language.types.null)[int](#language.types.integer) $offset = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [bool](#language.types.boolean)
public [flush](#ocilob.flush)([int](#language.types.integer) $flag = 0): [bool](#language.types.boolean)
public [free](#ocilob.free)(): [bool](#language.types.boolean)
public [getBuffering](#ocilob.getbuffering)(): [bool](#language.types.boolean)
public [import](#ocilob.import)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [load](#ocilob.load)(): [string](#language.types.string)|[false](#language.types.singleton)
public [read](#ocilob.read)([int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)
public [rewind](#ocilob.rewind)(): [bool](#language.types.boolean)
public [save](#ocilob.save)([string](#language.types.string) $data, [int](#language.types.integer) $offset = 0): [bool](#language.types.boolean)
public [seek](#ocilob.seek)([int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[OCI_SEEK_SET](#constant.oci-seek-set)**): [bool](#language.types.boolean)
public [setBuffering](#ocilob.setbuffering)([bool](#language.types.boolean) $mode): [bool](#language.types.boolean)
public [size](#ocilob.size)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [tell](#ocilob.tell)(): [int](#language.types.integer)|[false](#language.types.singleton)
public [truncate](#ocilob.truncate)([int](#language.types.integer) $length = 0): [bool](#language.types.boolean)
public [write](#ocilob.write)([string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)
public [writeTemporary](#ocilob.writetemporary)([string](#language.types.string) $data, [int](#language.types.integer) $type = **[OCI_TEMP_CLOB](#constant.oci-temp-clob)**): [bool](#language.types.boolean)

}

# OCILob::append

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::append — Añade datos a un LOB Oracle

### Descripción

public **OCILob::append**([OCILob](#class.ocilob) $from): [bool](#language.types.boolean)

Añade datos a un LOB Oracle.

La escritura en un LOB con **OCI-Lob-&gt;append()** fallará
si la bufferización ha sido previamente activada. Se debe desactivar
la bufferización antes de añadir datos. Puede ser necesario vaciar los buffers
con la función [OCILob::flush](#ocilob.flush)
antes de desactivarla.

### Parámetros

     from


       El LOB copiado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::flush](#ocilob.flush)

    - [OCILob::setBuffering](#ocilob.setbuffering)

    - [OCILob::getBuffering](#ocilob.getbuffering)

# OCILob::close

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::close — Cierra un LOB Oracle

### Descripción

public **OCILob::close**(): [bool](#language.types.boolean)

Cierra un LOB Oracle. Esta función debe ser utilizada únicamente
con [OCILob::writeTemporary](#ocilob.writetemporary).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinear con los estándares de nombramiento de PHP.



### Ver también

    - [OCILob::writeTemporary](#ocilob.writetemporary)

# OCILob::eof

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::eof — Prueba el final del LOB Oracle

### Descripción

public **OCILob::eof**(): [bool](#language.types.boolean)

Verifica si el puntero interno de un LOB está al final.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el puntero interno de LOB ha alcanzado el final
del LOB, y **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Notas

**Nota**:

    Esta función devolverá un error de Oracle si
    [OCILob::setBuffering](#ocilob.setbuffering) está activo en el LOB.

### Ver también

    - [OCILob::size](#ocilob.size)

# OCILob::erase

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::erase — Elimina una parte de un LOB Oracle

### Descripción

public **OCILob::erase**([?](#language.types.null)[int](#language.types.integer) $offset = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Elimina la parte del LOB Oracle comenzando en el desplazamiento offset,
con una longitud de length bytes.

Para los BLOB, la eliminación significa que el valor existente del LOB
es reemplazado por el carácter 0. Para los CLOB, se utilizan espacios.

### Parámetros

     offset








     length







### Valores devueltos

Devuelve el número de caracteres/bytes eliminados o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       offset y length ahora son nulos.




      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::truncate](#ocilob.truncate)

# OCILob::export

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::export — Exporta un LOB Oracle a un fichero

### Descripción

public **OCILob::export**([string](#language.types.string) $filename, [?](#language.types.null)[int](#language.types.integer) $offset = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [bool](#language.types.boolean)

Exporta un LOB Oracle a un fichero.

### Parámetros

     filename


       La ruta de acceso al fichero.






     offset


       Indica la posición a partir de la cual debe comenzar la exportación.






     length


       Indica el tamaño de los datos a exportar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       offset y length ahora son nulos.




      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::import](#ocilob.import)

# OCILob::flush

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::flush — Escribe los LOB Oracle en el disco

### Descripción

public **OCILob::flush**([int](#language.types.integer) $flag = 0): [bool](#language.types.boolean)

Escribe los LOB Oracle en el disco.

### Parámetros

     flag


       Por omisión, los recursos no son liberados, pero utilizando
       la opción flag con el valor
       **[OCI_LOB_BUFFER_FREE](#constant.oci-lob-buffer-free)**, puede hacerse explícitamente.
       Asegúrese de saber bien lo que hace: la próxima lectura
       o escritura en el mismo LOB requerirá entonces una petición al servidor,
       y la reasignación de recursos. Se recomienda utilizar la opción
       **[OCI_LOB_BUFFER_FREE](#constant.oci-lob-buffer-free)** únicamente si ya no se necesita el LOB.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Retorna **[false](#constant.false)** si la bufferización no ha sido activada,
o si ha ocurrido un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::getBuffering](#ocilob.getbuffering)

    - [OCILob::setBuffering](#ocilob.setbuffering)

# OCILob::free

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::free — Destruye un puntero de LOB Oracle

### Descripción

public **OCILob::free**(): [bool](#language.types.boolean)

Libera los recursos asociados con el recurso, previamente asignado con
[oci_new_descriptor()](#function.oci-new-descriptor).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



# OCILob::getBuffering

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::getBuffering — Devuelve el estado de bufferización LOB de Oracle

### Descripción

public **OCILob::getBuffering**(): [bool](#language.types.boolean)

Devuelve el estado de bufferización LOB de Oracle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[false](#constant.false)** si la bufferización de los LOB está desactivada, y **[true](#constant.true)**
si está activada.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::setBuffering](#ocilob.setbuffering)

# OCILob::import

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::import — Importa un fichero en LOB Oracle

### Descripción

public **OCILob::import**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Escribe los datos del fichero filename
en el LOB, a partir de la posición actual.

### Parámetros

     filename


       Ruta de acceso al fichero.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::export](#ocilob.export)

    - [OCILob::write](#ocilob.write)

# OCILob::load

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::load — Devuelve el contenido de un LOB

### Descripción

public **OCILob::load**(): [string](#language.types.string)|[false](#language.types.singleton)

Lee el contenido de un LOB Oracle. El script puede ser interrumpido debido a
[memory_limit](#ini.memory-limit), si este
último excede el límite. En la mayoría de los casos, se
recomienda utilizar la función
[OCILob::read](#ocilob.read) en su lugar. En caso de error, **OCI-Lob-&gt;load()** devuelve **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del objeto, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::read](#ocilob.read)

# OCILob::read

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::read — Lee una parte de un LOB Oracle

### Descripción

public **OCILob::read**([int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)

Lee length bytes (BLOB) o caracteres (CLOB)
a partir de la posición actual del LOB.

La lectura se detiene cuando length bytes han sido leídos para un BLOB,
cuando length caracteres han sido leídos para un CLOB,
o cuando se alcanza el final del LOB. El puntero del LOB será desplazado por esta lectura
del número de bytes/caracteres leídos.

### Parámetros

     length


       El tamaño de los datos a leer, en bytes para un BLOB, en caracteres para un CLOB.
       Los valores grandes serán redondeados al MB inferior.





### Valores devueltos

Devuelve el contenido, en forma de un [string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::load](#ocilob.load)

    - [OCILob::write](#ocilob.write)

# OCILob::rewind

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::rewind — Retorna el puntero interno de un LOB Oracle al inicio

### Descripción

public **OCILob::rewind**(): [bool](#language.types.boolean)

Retorna el puntero interno de un LOB Oracle al inicio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::seek](#ocilob.seek)

    - [OCILob::tell](#ocilob.tell)

# OCILob::save

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::save — Guardado de datos en un LOB Oracle

### Descripción

public **OCILob::save**([string](#language.types.string) $data, [int](#language.types.integer) $offset = 0): [bool](#language.types.boolean)

Guardado de datos en un LOB Oracle.

### Parámetros

     data


       Los datos a guardar.






     offset


       Puede ser utilizado para indicar la posición desde el inicio del LOB.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinear con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::write](#ocilob.write)

    - [OCILob::import](#ocilob.import)

# OCILob::saveFile

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::saveFile — Alias de [OCILob::import()](#ocilob.import)

### Descripción

Esta función es un alias de: [OCILob::import()](#ocilob.import).

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para ajustarse a los estándares de nomenclatura de PHP.



# OCILob::seek

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::seek — Desplaza el puntero interno de un LOB Oracle

### Descripción

public **OCILob::seek**([int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[OCI_SEEK_SET](#constant.oci-seek-set)**): [bool](#language.types.boolean)

Desplaza el puntero interno de un LOB Oracle.

### Parámetros

     offset


       Indica la distancia de desplazamiento. El tipo de desplazamiento se especifica con
       whence.






     whence


       Puede ser una constante entre:



        -
         **[OCI_SEEK_SET](#constant.oci-seek-set)** - desplaza el puntero a la posición
         offset.


        -
         **[OCI_SEEK_CUR](#constant.oci-seek-cur)** - añade offset
         bytes a la posición actual.


        -
         **[OCI_SEEK_END](#constant.oci-seek-end)** - añade offset
         bytes al final del LOB (utilice un valor negativo para obtener una
         posición antes del final del LOB).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinear con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::rewind](#ocilob.rewind)

    - [OCILob::tell](#ocilob.tell)

    - [OCILob::eof](#ocilob.eof)

# OCILob::setBuffering

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::setBuffering — Activa/desactiva la bufferización de los LOB Oracle

### Descripción

public **OCILob::setBuffering**([bool](#language.types.boolean) $mode): [bool](#language.types.boolean)

Activa o desactiva la bufferización de los LOB Oracle, en función del
parámetro mode.

Utilizar esta función aporta mejoras de rendimiento mediante la bufferización
de pequeñas lecturas y escrituras de LOB: el buffer limita los intercambios
con el servidor.
[OCILob::flush()](#ocilob.flush) debe ser utilizado para vaciar los buffers
una vez finalizado el trabajo con el LOB.

### Parámetros

     mode


       **[true](#constant.true)** para activarlo, y **[false](#constant.false)** para desactivarlo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Llamadas repetidas a **lob-&gt;setbuffering()** con
el mismo valor de parámetro siempre devolverá **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::getBuffering](#ocilob.getbuffering)

# OCILob::size

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::size — Devuelve el tamaño de un LOB Oracle

### Descripción

public **OCILob::size**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tamaño de un LOB Oracle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño del LOB o **[false](#constant.false)** si ocurre un error.
Los objetos vacíos tienen un tamaño de 0.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



# OCILob::tell

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::tell — Devuelve la posición actual del puntero de LOB

### Descripción

public **OCILob::tell**(): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la posición actual del puntero de LOB.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la posición actual del
puntero interno del LOB, o bien **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::rewind](#ocilob.rewind)

    - [OCILob::size](#ocilob.size)

    - [OCILob::eof](#ocilob.eof)

# OCILob::truncate

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::truncate — Trunca un LOB Oracle

### Descripción

public **OCILob::truncate**([int](#language.types.integer) $length = 0): [bool](#language.types.boolean)

Trunca un LOB Oracle.

### Parámetros

     length


       Si length es proporcionado,
       **OCI-Lob-&gt;truncate()** trunca el LOB a
       length bytes. De lo contrario,
       **OCI-Lob-&gt;truncate()** vacía completamente el LOB.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::erase](#ocilob.erase)

# OCILob::write

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::write — Escribe datos en un LOB Oracle

### Descripción

public **OCILob::write**([string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Escribe los datos de la variable data
en la posición actual del LOB.

### Parámetros

     data


       Los datos a escribir en el LOB.






     length


       Si este argumento es un entero, la escritura se detendrá
       después de length bytes, o al final de la variable
       data.





### Valores devueltos

Devuelve el número de bytes escritos o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       length ahora es nullable.




      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::read](#ocilob.read)

# OCILob::writeTemporary

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::writeTemporary — Escribe un LOB Oracle temporal

### Descripción

public **OCILob::writeTemporary**([string](#language.types.string) $data, [int](#language.types.integer) $type = **[OCI_TEMP_CLOB](#constant.oci-temp-clob)**): [bool](#language.types.boolean)

Crea un LOB temporal y escribe los datos data en él.

Se debe utilizar la función [OCILob::close](#ocilob.close) cuando
se ha terminado de trabajar con el LOB.

### Parámetros

     data


       Los datos a escribir.






     type


       Puede tomar uno de los siguientes valores:



        -
         **[OCI_TEMP_BLOB](#constant.oci-temp-blob)** se utiliza para crear un BLOB temporal.


        -
         **[OCI_TEMP_CLOB](#constant.oci-temp-clob)** se utiliza para crear un CLOB temporal.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para alinearse con los estándares de nomenclatura de PHP.



### Ver también

    - [OCILob::close](#ocilob.close)

# OCILob::writeToFile

(PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.1.0)

OCILob::writeToFile — Alias de [OCILob::export()](#ocilob.export)

### Descripción

Esta función es un alias de: [OCILob::export()](#ocilob.export).

### Historial de cambios

      Versión
      Descripción






      8.0.0, PECL OCI8 3.0.0

       offset y length ahora son nullable.




      8.0.0, PECL OCI8 3.0.0

       La clase **OCI-Lob** ha sido renombrada a
       [OCILob](#class.ocilob) para ajustarse a los estándares de nomenclatura de PHP.



## Tabla de contenidos

- [OCILob::append](#ocilob.append) — Añade datos a un LOB Oracle
- [OCILob::close](#ocilob.close) — Cierra un LOB Oracle
- [OCILob::eof](#ocilob.eof) — Prueba el final del LOB Oracle
- [OCILob::erase](#ocilob.erase) — Elimina una parte de un LOB Oracle
- [OCILob::export](#ocilob.export) — Exporta un LOB Oracle a un fichero
- [OCILob::flush](#ocilob.flush) — Escribe los LOB Oracle en el disco
- [OCILob::free](#ocilob.free) — Destruye un puntero de LOB Oracle
- [OCILob::getBuffering](#ocilob.getbuffering) — Devuelve el estado de bufferización LOB de Oracle
- [OCILob::import](#ocilob.import) — Importa un fichero en LOB Oracle
- [OCILob::load](#ocilob.load) — Devuelve el contenido de un LOB
- [OCILob::read](#ocilob.read) — Lee una parte de un LOB Oracle
- [OCILob::rewind](#ocilob.rewind) — Retorna el puntero interno de un LOB Oracle al inicio
- [OCILob::save](#ocilob.save) — Guardado de datos en un LOB Oracle
- [OCILob::saveFile](#ocilob.savefile) — Alias de OCILob::import
- [OCILob::seek](#ocilob.seek) — Desplaza el puntero interno de un LOB Oracle
- [OCILob::setBuffering](#ocilob.setbuffering) — Activa/desactiva la bufferización de los LOB Oracle
- [OCILob::size](#ocilob.size) — Devuelve el tamaño de un LOB Oracle
- [OCILob::tell](#ocilob.tell) — Devuelve la posición actual del puntero de LOB
- [OCILob::truncate](#ocilob.truncate) — Trunca un LOB Oracle
- [OCILob::write](#ocilob.write) — Escribe datos en un LOB Oracle
- [OCILob::writeTemporary](#ocilob.writetemporary) — Escribe un LOB Oracle temporal
- [OCILob::writeToFile](#ocilob.writetofile) — Alias de OCILob::export

# Funciones y alias de OCI8 obsoletos

# oci_internal_debug

(PHP 5, PHP 7, PECL OCI8 &gt;= 1.1.0, PECL OCI8 &lt;= 2.2.0)

oci_internal_debug — Activa o desactiva la salida de depuración interna

### Descripción

**oci_internal_debug**([bool](#language.types.boolean) $onoff): [void](language.types.void.html)

Activa o desactiva la salida de depuración interna.

### Parámetros

     onoff


       Establezca este valor a **[false](#constant.false)** para desactivar la salida de depuración o a **[true](#constant.true)** para activarla.





### Valores devueltos

No se retorna ningún valor.

### Notas

**Nota**:

      Esta función fue eliminada en PHP 8 y PECL OCI8 3.0.

# ocibindbyname

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocibindbyname — Alias de [oci_bind_by_name()](#function.oci-bind-by-name)

### Descripción

Alias de [oci_bind_by_name()](#function.oci-bind-by-name)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicancel

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicancel — Alias de [oci_cancel()](#function.oci-cancel)

### Descripción

Alias de [oci_cancel()](#function.oci-cancel)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicloselob

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PECL OCI8 1.0)

ocicloselob — Alias de [OCILob::close()](#ocilob.close)

### Descripción

Alias de [OCILob::close()](#ocilob.close)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollappend

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicollappend — Alias de [OCICollection::append()](#ocicollection.append)

### Descripción

Alias de [OCICollection::append()](#ocicollection.append)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollassign

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PECL OCI8 &gt;= 1.0.0)

ocicollassign — Alias de [OCICollection::assign()](#ocicollection.assign)

### Descripción

Alias de [OCICollection::assign()](#ocicollection.assign)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollassignelem

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicollassignelem — Alias de [OCICollection::assignElem()](#ocicollection.assignelem)

### Descripción

Alias de [OCICollection::assignElem()](#ocicollection.assignelem)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollgetelem

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicollgetelem — Alias de [OCICollection::getElem()](#ocicollection.getelem)

### Descripción

Alias de [OCICollection::getElem()](#ocicollection.getelem)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollmax

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicollmax — Alias de [OCICollection::max()](#ocicollection.max)

### Descripción

Alias de [OCICollection::max()](#ocicollection.max)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicollsize

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicollsize — Alias de [OCICollection::size()](#ocicollection.size)

### Descripción

Alias de [OCICollection::size()](#ocicollection.size)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolltrim

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolltrim — Alias de [OCICollection::trim()](#ocicollection.trim)

### Descripción

Alias de [OCICollection::trim()](#ocicollection.trim)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumnisnull

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumnisnull — Alias de [oci_field_is_null()](#function.oci-field-is-null)

### Descripción

Alias de [oci_field_is_null()](#function.oci-field-is-null)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumnname

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumnname — Alias de [oci_field_name()](#function.oci-field-name)

### Descripción

Alias de [oci_field_name()](#function.oci-field-name)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumnprecision

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumnprecision — Alias de [oci_field_precision()](#function.oci-field-precision)

### Descripción

Alias de [oci_field_precision()](#function.oci-field-precision)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumnscale

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumnscale — Alias de [oci_field_scale()](#function.oci-field-scale)

### Descripción

Alias de [oci_field_scale()](#function.oci-field-scale)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumnsize

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumnsize — Alias de [oci_field_size()](#function.oci-field-size)

### Descripción

Alias de [oci_field_size()](#function.oci-field-size)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumntype

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumntype — Alias de [oci_field_type()](#function.oci-field-type)

### Descripción

Alias de [oci_field_type()](#function.oci-field-type)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicolumntyperaw

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicolumntyperaw — Alias de [oci_field_type_raw()](#function.oci-field-type-raw)

### Descripción

Alias de [oci_field_type_raw()](#function.oci-field-type-raw)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocicommit

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocicommit — Alias de [oci_commit()](#function.oci-commit)

### Descripción

Alias de [oci_commit()](#function.oci-commit)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocidefinebyname

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocidefinebyname — Alias de [oci_define_by_name()](#function.oci-define-by-name)

### Descripción

Alias de [oci_define_by_name()](#function.oci-define-by-name)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocierror

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocierror — Alias de [oci_error()](#function.oci-error)

### Descripción

Alias de [oci_error()](#function.oci-error)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociexecute

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociexecute — Alias de [oci_execute()](#function.oci-execute)

### Descripción

Alias de [oci_execute()](#function.oci-execute)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifetch

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifetch — Alias de [oci_fetch()](#function.oci-fetch)

### Descripción

Alias de [oci_fetch()](#function.oci-fetch)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifetchinto

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifetchinto — Variante obsoleta de [oci_fetch_array()](#function.oci-fetch-array), [oci_fetch_object()](#function.oci-fetch-object),
[oci_fetch_assoc()](#function.oci-fetch-assoc) y
[oci_fetch_row()](#function.oci-fetch-row)

### Descripción

    Variante absoleta de [oci_fetch_array()](#function.oci-fetch-array), [oci_fetch_object()](#function.oci-fetch-object),

[oci_fetch_assoc()](#function.oci-fetch-assoc) y
[oci_fetch_row()](#function.oci-fetch-row)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifetchstatement

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifetchstatement — Alias de [oci_fetch_all()](#function.oci-fetch-all)

### Descripción

Alias de [oci_fetch_all()](#function.oci-fetch-all)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifreecollection

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifreecollection — Alias de [OCICollection::free()](#ocicollection.free)

### Descripción

Alias de [OCICollection::free()](#ocicollection.free)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifreecursor

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifreecursor — Alias de [oci_free_statement()](#function.oci-free-statement)

### Descripción

Alias de [oci_free_statement()](#function.oci-free-statement)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifreedesc

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifreedesc — Alias de [OCILob::free()](#ocilob.free)

### Descripción

Alias de [OCILob::free()](#ocilob.free)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocifreestatement

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocifreestatement — Alias de [oci_free_statement()](#function.oci-free-statement)

### Descripción

Alias de [oci_free_statement()](#function.oci-free-statement)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociinternaldebug

(PHP 4, PHP 5, PHP 7, PECL OCI8 &gt;= 1.0.0, PECL OCI8 &lt;= 2.2.0)

ociinternaldebug — Alias de [oci_internal_debug()](#function.oci-internal-debug)

### Descripción

Alias de [oci_internal_debug()](#function.oci-internal-debug)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociloadlob

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociloadlob — Alias de [OCILob::load()](#ocilob.load)

### Descripción

Alias de [OCILob::load()](#ocilob.load)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocilogoff

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocilogoff — Alias de [oci_close()](#function.oci-close)

### Descripción

Alias de [oci_close()](#function.oci-close)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocilogon

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocilogon — Alias de [oci_connect()](#function.oci-connect)

### Descripción

Alias de [oci_connect()](#function.oci-connect)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocinewcollection

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocinewcollection — Alias de [oci_new_collection()](#function.oci-new-collection)

### Descripción

Alias de [oci_new_collection()](#function.oci-new-collection)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocinewcursor

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocinewcursor — Alias de [oci_new_cursor()](#function.oci-new-cursor)

### Descripción

Alias de [oci_new_cursor()](#function.oci-new-cursor)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocinewdescriptor

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocinewdescriptor — Alias de [oci_new_descriptor()](#function.oci-new-descriptor)

### Descripción

Alias de [oci_new_descriptor()](#function.oci-new-descriptor)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocinlogon

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocinlogon — Alias de [oci_new_connect()](#function.oci-new-connect)

### Descripción

Alias de [oci_new_connect()](#function.oci-new-connect)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocinumcols

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocinumcols — Alias de [oci_num_fields()](#function.oci-num-fields)

### Descripción

Alias de [oci_num_fields()](#function.oci-num-fields)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociparse

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociparse — Alias de [oci_parse()](#function.oci-parse)

### Descripción

Alias de [oci_parse()](#function.oci-parse)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociplogon

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociplogon — Alias de [oci_pconnect()](#function.oci-pconnect)

### Descripción

Alias de [oci_pconnect()](#function.oci-pconnect)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociresult

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociresult — Alias de [oci_result()](#function.oci-result)

### Descripción

Alias de [oci_result()](#function.oci-result)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocirollback

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocirollback — Alias de [oci_rollback()](#function.oci-rollback)

### Descripción

Alias de [oci_rollback()](#function.oci-rollback)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocirowcount

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocirowcount — Alias de [oci_num_rows()](#function.oci-num-rows)

### Descripción

Alias de [oci_num_rows()](#function.oci-num-rows)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocisavelob

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocisavelob — Alias de [OCILob::save()](#ocilob.save)

### Descripción

Alias de [OCILob::save()](#ocilob.save)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocisavelobfile

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocisavelobfile — Alias de [OCILob::import()](#ocilob.import)

### Descripción

Alias de [OCILob::import()](#ocilob.import)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociserverversion

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociserverversion — Alias de [oci_server_version()](#function.oci-server-version)

### Descripción

Alias de [oci_server_version()](#function.oci-server-version)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocisetprefetch

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocisetprefetch — Alias de [oci_set_prefetch()](#function.oci-set-prefetch)

### Descripción

Alias de [oci_set_prefetch()](#function.oci-set-prefetch)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ocistatementtype

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ocistatementtype — Alias de [oci_statement_type()](#function.oci-statement-type)

### Descripción

Alias de [oci_statement_type()](#function.oci-statement-type)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociwritelobtofile

(PHP 4, PHP 5, PHP 7, PHP 8, PECL OCI8 &gt;= 1.0.0)

ociwritelobtofile — Alias de [OCILob::export()](#ocilob.export)

### Descripción

Alias de [OCILob::export()](#ocilob.export)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

# ociwritetemporarylob

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PECL OCI8 1.0)

ociwritetemporarylob — Alias de [OCILob::writeTemporary()](#ocilob.writetemporary)

### Descripción

Alias de [OCILob::writeTemporary()](#ocilob.writetemporary)

**Advertencia**
Este alias está _OBSOLETO_ a partir de PHP 5.4.0.
Depender de este alias está fuertemente desaconsejado.

## Tabla de contenidos

- [oci_internal_debug](#function.oci-internal-debug) — Activa o desactiva la salida de depuración interna
- [ocibindbyname](#function.ocibindbyname) — Alias de oci_bind_by_name
- [ocicancel](#function.ocicancel) — Alias de oci_cancel
- [ocicloselob](#function.ocicloselob) — Alias de OCILob::close
- [ocicollappend](#function.ocicollappend) — Alias de OCICollection::append
- [ocicollassign](#function.ocicollassign) — Alias de OCICollection::assign
- [ocicollassignelem](#function.ocicollassignelem) — Alias de OCICollection::assignElem
- [ocicollgetelem](#function.ocicollgetelem) — Alias de OCICollection::getElem
- [ocicollmax](#function.ocicollmax) — Alias de OCICollection::max
- [ocicollsize](#function.ocicollsize) — Alias de OCICollection::size
- [ocicolltrim](#function.ocicolltrim) — Alias de OCICollection::trim
- [ocicolumnisnull](#function.ocicolumnisnull) — Alias de oci_field_is_null
- [ocicolumnname](#function.ocicolumnname) — Alias de oci_field_name
- [ocicolumnprecision](#function.ocicolumnprecision) — Alias de oci_field_precision
- [ocicolumnscale](#function.ocicolumnscale) — Alias de oci_field_scale
- [ocicolumnsize](#function.ocicolumnsize) — Alias de oci_field_size
- [ocicolumntype](#function.ocicolumntype) — Alias de oci_field_type
- [ocicolumntyperaw](#function.ocicolumntyperaw) — Alias de oci_field_type_raw
- [ocicommit](#function.ocicommit) — Alias de oci_commit
- [ocidefinebyname](#function.ocidefinebyname) — Alias de oci_define_by_name
- [ocierror](#function.ocierror) — Alias de oci_error
- [ociexecute](#function.ociexecute) — Alias de oci_execute
- [ocifetch](#function.ocifetch) — Alias de oci_fetch
- [ocifetchinto](#function.ocifetchinto) — Variante obsoleta de oci_fetch_array, oci_fetch_object,
  oci_fetch_assoc y
  oci_fetch_row
- [ocifetchstatement](#function.ocifetchstatement) — Alias de oci_fetch_all
- [ocifreecollection](#function.ocifreecollection) — Alias de OCICollection::free
- [ocifreecursor](#function.ocifreecursor) — Alias de oci_free_statement
- [ocifreedesc](#function.ocifreedesc) — Alias de OCILob::free
- [ocifreestatement](#function.ocifreestatement) — Alias de oci_free_statement
- [ociinternaldebug](#function.ociinternaldebug) — Alias de oci_internal_debug
- [ociloadlob](#function.ociloadlob) — Alias de OCILob::load
- [ocilogoff](#function.ocilogoff) — Alias de oci_close
- [ocilogon](#function.ocilogon) — Alias de oci_connect
- [ocinewcollection](#function.ocinewcollection) — Alias de oci_new_collection
- [ocinewcursor](#function.ocinewcursor) — Alias de oci_new_cursor
- [ocinewdescriptor](#function.ocinewdescriptor) — Alias de oci_new_descriptor
- [ocinlogon](#function.ocinlogon) — Alias de oci_new_connect
- [ocinumcols](#function.ocinumcols) — Alias de oci_num_fields
- [ociparse](#function.ociparse) — Alias de oci_parse
- [ociplogon](#function.ociplogon) — Alias de oci_pconnect
- [ociresult](#function.ociresult) — Alias de oci_result
- [ocirollback](#function.ocirollback) — Alias de oci_rollback
- [ocirowcount](#function.ocirowcount) — Alias de oci_num_rows
- [ocisavelob](#function.ocisavelob) — Alias de OCILob::save
- [ocisavelobfile](#function.ocisavelobfile) — Alias de OCILob::import
- [ociserverversion](#function.ociserverversion) — Alias de oci_server_version
- [ocisetprefetch](#function.ocisetprefetch) — Alias de oci_set_prefetch
- [ocistatementtype](#function.ocistatementtype) — Alias de oci_statement_type
- [ociwritelobtofile](#function.ociwritelobtofile) — Alias de OCILob::export
- [ociwritetemporarylob](#function.ociwritetemporarylob) — Alias de OCILob::writeTemporary

- [Introducción](#intro.oci8)
- [Instalación/Configuración](#oci8.setup)<li>[Requerimientos](#oci8.requirements)
- [Instalación](#oci8.installation)
- [Pruebas](#oci8.test)
- [Configuración en tiempo de ejecución](#oci8.configuration)
  </li>- [Constantes predefinidas](#oci8.constants)
- [Ejemplos](#oci8.examples)
- [Gestión de la conexión OCI8 y la cola de espera](#oci8.connection)
- [Soporte de FAN (Fast Application Notification : Notificación Rápida de Aplicación) OCI8](#oci8.fan)
- [El soporte de la reanudación transparente de aplicación (TAF) de OCI8](#oci8.taf)
- [OCI8 y rastreo dinámico de DTrace](#oci8.dtrace)
- [Tipos de datos admitidos](#oci8.datatypes)
- [Funciones de OCI8](#ref.oci8)<li>[oci_bind_array_by_name](#function.oci-bind-array-by-name) — Asocia un array PHP a un parámetro de array Oracle PL/SQL
- [oci_bind_by_name](#function.oci-bind-by-name) — Asocia una variable PHP a un marcador Oracle
- [oci_cancel](#function.oci-cancel) — Cancela la lectura del cursor
- [oci_client_version](#function.oci-client-version) — Devuelve la versión de la biblioteca cliente Oracle
- [oci_close](#function.oci-close) — Cierra una conexión Oracle
- [oci_commit](#function.oci-commit) — Valida las transacciones Oracle en curso
- [oci_connect](#function.oci-connect) — Establece una conexión con un servidor Oracle
- [oci_define_by_name](#function.oci-define-by-name) — Asocia una variable PHP con una columna para una consulta de recuperación de datos
- [oci_error](#function.oci-error) — Devuelve el último error de Oracle
- [oci_execute](#function.oci-execute) — Ejecuta un comando SQL de Oracle
- [oci_fetch](#function.oci-fetch) — Lee la siguiente línea de un resultado Oracle en un buffer interno
- [oci_fetch_all](#function.oci-fetch-all) — Lee múltiples líneas de un resultado en un array multidimensional
- [oci_fetch_array](#function.oci-fetch-array) — Lee una línea de un resultado en forma de array asociativo o numérico
- [oci_fetch_assoc](#function.oci-fetch-assoc) — Lee una línea de un resultado en forma de array asociativo
- [oci_fetch_object](#function.oci-fetch-object) — Lee una línea de un resultado en forma de objeto
- [oci_fetch_row](#function.oci-fetch-row) — Lee la siguiente línea de una consulta en forma de array numérico
- [oci_field_is_null](#function.oci-field-is-null) — Comprueba si un campo de la fila recuperada es nulo
- [oci_field_name](#function.oci-field-name) — Devuelve el nombre de un campo Oracle
- [oci_field_precision](#function.oci-field-precision) — Lee la precisión de un campo Oracle
- [oci_field_scale](#function.oci-field-scale) — Lee la escala de una columna Oracle
- [oci_field_size](#function.oci-field-size) — Devuelve el tamaño de un campo Oracle
- [oci_field_type](#function.oci-field-type) — Devuelve el tipo de datos de un campo Oracle
- [oci_field_type_raw](#function.oci-field-type-raw) — Lee los datos brutos del tipo de un campo
- [oci_free_descriptor](#function.oci-free-descriptor) — Libera un descriptor
- [oci_free_statement](#function.oci-free-statement) — Libera todos los recursos asociados con una sentencia o cursor
- [oci_get_implicit_resultset](#function.oci-get-implicit-resultset) — Retorna el hijo siguiente de un recurso de consulta desde un recurso de consulta padre que tiene un juego de resultados implícito de Oracle Database
- [oci_lob_copy](#function.oci-lob-copy) — Copia un LOB Oracle
- [oci_lob_is_equal](#function.oci-lob-is-equal) — Comparar dos LOB/FILE de Oracle
- [oci_new_collection](#function.oci-new-collection) — Inicializa una nueva colección Oracle
- [oci_new_connect](#function.oci-new-connect) — Conexión al servidor Oracle utilizando una sola conexión
- [oci_new_cursor](#function.oci-new-cursor) — Asigna y devuelve un nuevo cursor Oracle
- [oci_new_descriptor](#function.oci-new-descriptor) — Inicializa un nuevo puntero vacío de LOB/FILE de Oracle
- [oci_num_fields](#function.oci-num-fields) — Devuelve el número de columnas en un resultado Oracle
- [oci_num_rows](#function.oci-num-rows) — Devuelve el número de filas afectadas durante el último comando Oracle
- [oci_parse](#function.oci-parse) — Prepara una consulta SQL con Oracle
- [oci_password_change](#function.oci-password-change) — Modifica la contraseña de un usuario Oracle
- [oci_pconnect](#function.oci-pconnect) — Establece una conexión persistente a un servidor Oracle
- [oci_register_taf_callback](#function.oci-register-taf-callback) — Registra una función de retrollamada definida por el usuario para Oracle Database TAF
- [oci_result](#function.oci-result) — Devuelve el valor de una columna en un resultado Oracle
- [oci_rollback](#function.oci-rollback) — Anula las transacciones Oracle en curso
- [oci_server_version](#function.oci-server-version) — Devuelve la versión del servidor Oracle
- [oci_set_action](#function.oci-set-action) — Define el nombre de la acción
- [oci_set_call_timeout](#function.oci-set-call-timout) — Define un tiempo de espera en milisegundos para las llamadas a la base de datos
- [oci_set_client_identifier](#function.oci-set-client-identifier) — Define el identificador del cliente
- [oci_set_client_info](#function.oci-set-client-info) — Define la información del cliente
- [oci_set_db_operation](#function.oci-set-db-operation) — Establece la operación de base de datos
- [oci_set_edition](#function.oci-set-edition) — Define la edición de la base de datos
- [oci_set_module_name](#function.oci-set-module-name) — Define el nombre del módulo
- [oci_set_prefetch](#function.oci-set-prefetch) — Indica el número de filas que deben leerse por adelantado por Oracle
- [oci_set_prefetch_lob](#function.oci-set-prefetch-lob) — Define la cantidad de datos precargados para cada CLOB o BLOB.
- [oci_statement_type](#function.oci-statement-type) — Devuelve el tipo de consulta Oracle
- [oci_unregister_taf_callback](#function.oci-unregister-taf-callback) — Anular el registro de una función callback definida para Oracle Database TAF
  </li>- [OCICollection](#class.ocicollection) — La clase OCICollection<li>[OCICollection::append](#ocicollection.append) — Añade un elemento a una colección Oracle
- [OCICollection::assign](#ocicollection.assign) — Asigna un valor a una colección desde otra colección Oracle
- [OCICollection::assignElem](#ocicollection.assignelem) — Asigna un valor a un elemento de una colección Oracle
- [OCICollection::free](#ocicollection.free) — Libera los recursos asociados con un objeto de colección
- [OCICollection::getElem](#ocicollection.getelem) — Devuelve el valor de un elemento de una colección Oracle
- [OCICollection::max](#ocicollection.max) — Retorna el número máximo de valores de una colección Oracle
- [OCICollection::size](#ocicollection.size) — Devuelve el tamaño de una colección Oracle
- [OCICollection::trim](#ocicollection.trim) — Elimina los últimos elementos de una colección Oracle
  </li>- [OCILob](#class.ocilob) — La clase OCILob<li>[OCILob::append](#ocilob.append) — Añade datos a un LOB Oracle
- [OCILob::close](#ocilob.close) — Cierra un LOB Oracle
- [OCILob::eof](#ocilob.eof) — Prueba el final del LOB Oracle
- [OCILob::erase](#ocilob.erase) — Elimina una parte de un LOB Oracle
- [OCILob::export](#ocilob.export) — Exporta un LOB Oracle a un fichero
- [OCILob::flush](#ocilob.flush) — Escribe los LOB Oracle en el disco
- [OCILob::free](#ocilob.free) — Destruye un puntero de LOB Oracle
- [OCILob::getBuffering](#ocilob.getbuffering) — Devuelve el estado de bufferización LOB de Oracle
- [OCILob::import](#ocilob.import) — Importa un fichero en LOB Oracle
- [OCILob::load](#ocilob.load) — Devuelve el contenido de un LOB
- [OCILob::read](#ocilob.read) — Lee una parte de un LOB Oracle
- [OCILob::rewind](#ocilob.rewind) — Retorna el puntero interno de un LOB Oracle al inicio
- [OCILob::save](#ocilob.save) — Guardado de datos en un LOB Oracle
- [OCILob::saveFile](#ocilob.savefile) — Alias de OCILob::import
- [OCILob::seek](#ocilob.seek) — Desplaza el puntero interno de un LOB Oracle
- [OCILob::setBuffering](#ocilob.setbuffering) — Activa/desactiva la bufferización de los LOB Oracle
- [OCILob::size](#ocilob.size) — Devuelve el tamaño de un LOB Oracle
- [OCILob::tell](#ocilob.tell) — Devuelve la posición actual del puntero de LOB
- [OCILob::truncate](#ocilob.truncate) — Trunca un LOB Oracle
- [OCILob::write](#ocilob.write) — Escribe datos en un LOB Oracle
- [OCILob::writeTemporary](#ocilob.writetemporary) — Escribe un LOB Oracle temporal
- [OCILob::writeToFile](#ocilob.writetofile) — Alias de OCILob::export
  </li>- [Funciones y alias de OCI8 obsoletos](#oldaliases.oci8)<li>[oci_internal_debug](#function.oci-internal-debug) — Activa o desactiva la salida de depuración interna
- [ocibindbyname](#function.ocibindbyname) — Alias de oci_bind_by_name
- [ocicancel](#function.ocicancel) — Alias de oci_cancel
- [ocicloselob](#function.ocicloselob) — Alias de OCILob::close
- [ocicollappend](#function.ocicollappend) — Alias de OCICollection::append
- [ocicollassign](#function.ocicollassign) — Alias de OCICollection::assign
- [ocicollassignelem](#function.ocicollassignelem) — Alias de OCICollection::assignElem
- [ocicollgetelem](#function.ocicollgetelem) — Alias de OCICollection::getElem
- [ocicollmax](#function.ocicollmax) — Alias de OCICollection::max
- [ocicollsize](#function.ocicollsize) — Alias de OCICollection::size
- [ocicolltrim](#function.ocicolltrim) — Alias de OCICollection::trim
- [ocicolumnisnull](#function.ocicolumnisnull) — Alias de oci_field_is_null
- [ocicolumnname](#function.ocicolumnname) — Alias de oci_field_name
- [ocicolumnprecision](#function.ocicolumnprecision) — Alias de oci_field_precision
- [ocicolumnscale](#function.ocicolumnscale) — Alias de oci_field_scale
- [ocicolumnsize](#function.ocicolumnsize) — Alias de oci_field_size
- [ocicolumntype](#function.ocicolumntype) — Alias de oci_field_type
- [ocicolumntyperaw](#function.ocicolumntyperaw) — Alias de oci_field_type_raw
- [ocicommit](#function.ocicommit) — Alias de oci_commit
- [ocidefinebyname](#function.ocidefinebyname) — Alias de oci_define_by_name
- [ocierror](#function.ocierror) — Alias de oci_error
- [ociexecute](#function.ociexecute) — Alias de oci_execute
- [ocifetch](#function.ocifetch) — Alias de oci_fetch
- [ocifetchinto](#function.ocifetchinto) — Variante obsoleta de oci_fetch_array, oci_fetch_object,
  oci_fetch_assoc y
  oci_fetch_row
- [ocifetchstatement](#function.ocifetchstatement) — Alias de oci_fetch_all
- [ocifreecollection](#function.ocifreecollection) — Alias de OCICollection::free
- [ocifreecursor](#function.ocifreecursor) — Alias de oci_free_statement
- [ocifreedesc](#function.ocifreedesc) — Alias de OCILob::free
- [ocifreestatement](#function.ocifreestatement) — Alias de oci_free_statement
- [ociinternaldebug](#function.ociinternaldebug) — Alias de oci_internal_debug
- [ociloadlob](#function.ociloadlob) — Alias de OCILob::load
- [ocilogoff](#function.ocilogoff) — Alias de oci_close
- [ocilogon](#function.ocilogon) — Alias de oci_connect
- [ocinewcollection](#function.ocinewcollection) — Alias de oci_new_collection
- [ocinewcursor](#function.ocinewcursor) — Alias de oci_new_cursor
- [ocinewdescriptor](#function.ocinewdescriptor) — Alias de oci_new_descriptor
- [ocinlogon](#function.ocinlogon) — Alias de oci_new_connect
- [ocinumcols](#function.ocinumcols) — Alias de oci_num_fields
- [ociparse](#function.ociparse) — Alias de oci_parse
- [ociplogon](#function.ociplogon) — Alias de oci_pconnect
- [ociresult](#function.ociresult) — Alias de oci_result
- [ocirollback](#function.ocirollback) — Alias de oci_rollback
- [ocirowcount](#function.ocirowcount) — Alias de oci_num_rows
- [ocisavelob](#function.ocisavelob) — Alias de OCILob::save
- [ocisavelobfile](#function.ocisavelobfile) — Alias de OCILob::import
- [ociserverversion](#function.ociserverversion) — Alias de oci_server_version
- [ocisetprefetch](#function.ocisetprefetch) — Alias de oci_set_prefetch
- [ocistatementtype](#function.ocistatementtype) — Alias de oci_statement_type
- [ociwritelobtofile](#function.ociwritelobtofile) — Alias de OCILob::export
- [ociwritetemporarylob](#function.ociwritetemporarylob) — Alias de OCILob::writeTemporary
  </li>
