# Controlador Nativo de MySQL

# Introducción

El Controlador Nativo de MySQL (MySQL Native Driver en inglés) es un sustituto para
la Biblioteca Cliente de MySQL (libmysqlclient). El Controlador Nativo de MySQL es parte de
las fuentes oficiales de PHP a partir de PHP 5.3.0.

Las extensiones de base de datos de MySQL (la extensión MySQL,
mysqli y PDO MYSQL), se comunican con el servidor
de MySQL. En el pasado, esto lo realizaba la extensión utilizando los servicios
prestados por la Biblioteca Cliente de MySQL. Las extensiones eran compiladas
con la Biblioteca Cliente de MySQL con el fin de utilizar su protocolo
cliente-servidor.

Ahora existe una alternativa con el Controlador Nativo de MySQL, ya que las extensiones
de bases de datos MySQL puede ser compiladas para utilizar el Controlador Nativo de MySQL en lugar
de la Biblioteca Cliente de MySQL.

El Controlador Nativo de MySQL está escrito en C, como una extensión de PHP.

# Introducción

**Lo que no es**

Aunque el driver nativo de MySQL está escrito como una extensión PHP, es importante
señalar que no proporciona una nueva API al programador PHP. Las API para programadores
son proporcionadas por la extensión MySQL, mysqli y PDO
MySQL. Estas extensiones pueden ahora utilizar los servicios del driver nativo MySQL para comunicarse
con el servidor MySQL. Por lo tanto, el driver nativo MySQL no debe ser considerado como una API.

**¿Por qué utilizarlo?**

Utilizar el driver nativo de MySQL ofrece numerosas ventajas en comparación con
la biblioteca cliente de MySQL.

La antigua biblioteca cliente de MySQL fue escrita por MySQL AB (ahora
parte de Oracle Corporation) y, por lo tanto, fue publicada bajo la licencia MySQL,
lo que tuvo como consecuencia la desactivación del soporte de MySQL por defecto
en PHP. Dado que el driver nativo de MySQL fue desarrollado como parte integral
del proyecto PHP, se publica bajo la licencia PHP, lo que resuelve los problemas
de licencia que existían en el pasado.

Además, anteriormente, era necesario compilar las extensiones de base de datos
MySQL en relación con una copia de la biblioteca cliente de MySQL, lo que significaba que
se debía tener instalado MySQL en la máquina donde se compilaba PHP a partir de los fuentes. Por lo tanto,
cuando se ejecutaba la aplicación PHP, las extensiones MySQL llamaban a los archivos de la biblioteca cliente de MySQL
al inicio, los cuales debían estar obligatoriamente instalados en el sistema. Con el driver nativo de MySQL, esto ya no es necesario
ya que está incluido en la distribución estándar. Por lo tanto, ya no será necesario tener instalado MySQL para compilar PHP o ejecutar aplicaciones PHP
que hagan uso de una base de datos.

Dado que el driver nativo de MySQL está escrito como una extensión PHP, está íntimamente
ligado al núcleo de PHP. Esto implica una mejor eficiencia, especialmente en lo que respecta
al uso de la memoria, ya que el driver utiliza la asignación de memoria de PHP y, por
lo tanto, soporta los límites de memoria. Utilizar el driver nativo de MySQL resulta en
un rendimiento igual o mejor que con la biblioteca cliente de MySQL, ya que el uso
de la memoria es mucho más eficiente. El hecho de que, al utilizar la biblioteca cliente
de MySQL, cada registro se almacene dos veces en memoria, mientras que el cliente nativo de MySQL solo lo almacena una vez, es un buen ejemplo de una buena gestión de la memoria.

**Nota**:
**Supervisión del uso de memoria**

Debido a que el driver nativo de MySQL utiliza el sistema de gestión de memoria
de PHP, su uso de memoria puede ser supervisado con la función
[memory_get_usage()](#function.memory-get-usage). Esto no es posible
con la biblioteca libmysqlclient ya que utiliza la función C malloc() en su lugar.

**Funcionalidades especiales**

El driver nativo de MySQL también proporciona algunas funcionalidades especiales no
disponibles con la biblioteca cliente de MySQL, listadas a continuación:

- Conexiones persistentes mejoradas

- La función especial [mysqli_fetch_all()](#mysqli-result.fetch-all)

- Llamadas a las estadísticas de rendimiento:
  [mysqli_get_client_stats()](#function.mysqli-get-client-stats),
  [mysqli_get_connection_stats()](#mysqli.get-connection-stats)

Las estadísticas de rendimiento pueden ser muy útiles para identificar
cuellos de botella de rendimiento.

El driver nativo de MySQL también proporciona conexiones persistentes al utilizarlo
con la extensión mysqli.

**Soporte de SSL**

El driver nativo de MySQL (MySQL Native Driver) soporta SSL.

**Soporte del protocolo comprimido**

El driver nativo de MySQL soporta el protocolo cliente/servidor MySQL comprimido.
La extensión ext/mysqli, si está configurada para utilizar el driver
nativo de MySQL, también puede beneficiarse de esta funcionalidad.
Es importante señalar que PDO_MYSQL no soporta
_EN ABSOLUTO_ la compresión cuando se utiliza con mysqlnd.

**Soporte de pipes nombrados**

Los pipes nombrados pueden ser utilizados para conectarse bajo Windows.

# Instalación

**Instalación bajo Unix**

Para utilizar el controlador nativo MySQL,
PHP debe ser compilado especificando explícitamente que las extensiones de base de
datos MySQL deben ser compiladas en relación con él. Esto se realiza mediante las opciones
de configuración anteriores a la compilación de PHP en sí.

Por ejemplo, para compilar la extensión MySQL, mysqli
y PDO MySQL utilizando el controlador nativo MySQL, la siguiente
orden debe ser ejecutada:

./configure --with-mysql=mysqlnd \
--with-mysqli=mysqlnd \
--with-pdo-mysql=mysqlnd \
[otras opciones]

**Instalación bajo Windows**

En las distribuciones oficiales de PHP para Windows, el
controlador nativo MySQL está activado por defecto y no se requiere configuración
adicional para su uso. Todas las extensiones de base de datos MySQL lo utilizarán entonces.

**Soporte del plugin de autenticación SHA-256**

El driver nativo MySQL requiere la carga de la funcionalidad OpenSSL de PHP,
y la activación de la conexión a MySQL mediante cuentas que utilizan
el plugin de autenticación MySQL SHA-256. Por ejemplo, PHP podría ser configurado
utilizando la siguiente orden:

./configure --with-mysql=mysqlnd \
--with-mysqli=mysqlnd \
--with-pdo-mysql=mysqlnd \
--with-openssl
[otras opciones]

En Autotools, el soporte SSL extendido en mysqlnd es
activado implícitamente durante la compilación con la extensión openssl
utilizando la opción de configuración **--with-openssl**.
Durante la compilación sin la extensión openssl, la opción
de configuración **--with-mysqlnd-ssl** puede ser
utilizada para activar explícitamente el soporte SSL extendido.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        La opción de configuración Autotools **--with-mysqlnd-ssl**
        fue añadida para activar explícitamente el soporte SSL extendido durante la
        compilación sin la extensión openssl.





# Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de MySQL Native Driver**</caption>
    
     
      
       Nombre
       Por defecto
       Cambiable
       Historial de cambios


       [mysqlnd.collect_statistics](#ini.mysqlnd.collect-statistics)
       "1"
       **[INI_SYSTEM](#constant.ini-system)**
        



       [mysqlnd.collect_memory_statistics](#ini.mysqlnd.collect-memory-statistics)
       "0"
       **[INI_SYSTEM](#constant.ini-system)**
        



       [mysqlnd.debug](#ini.mysqlnd.debug)
       ""
       **[INI_SYSTEM](#constant.ini-system)**
        



       [mysqlnd.log_mask](#ini.mysqlnd.log-mask)
       0
       **[INI_ALL](#constant.ini-all)**
        



       [mysqlnd.mempool_default_size](#ini.mysqlnd.mempool-default-size)
       16000
       **[INI_ALL](#constant.ini-all)**
        



      [mysqlnd.net_read_timeout](#ini.mysqlnd.net-read-timeout)
      "86400"
      **[INI_ALL](#constant.ini-all)**

       Antes de PHP 7.2.0 el valor por omisión era "31536000"
       y la variabilidad era **[INI_SYSTEM](#constant.ini-system)**




       [mysqlnd.net_cmd_buffer_size](#ini.mysqlnd.net-cmd-buffer-size)
       "4096"
       **[INI_SYSTEM](#constant.ini-system)**
        



       [mysqlnd.net_read_buffer_size](#ini.mysqlnd.net-read-buffer-size)
       "32768"
       **[INI_SYSTEM](#constant.ini-system)**
        



       [mysqlnd.sha256_server_public_key](#ini.mysqlnd.sha256-server-public-key)
       ""
       **[INI_PERDIR](#constant.ini-perdir)**
        



       [mysqlnd.trace_alloc](#ini.mysqlnd.trace-alloc)
       ""
       **[INI_SYSTEM](#constant.ini-system)**
        



      [mysqlnd.fetch_data_copy](#ini.mysqlnd.fetch_data_copy)
      0
      **[INI_ALL](#constant.ini-all)**
      Eliminado a partir de PHP 8.1.0




Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     mysqlnd.collect_statistics
     [bool](#language.types.boolean)



      Activa la recolección de diferentes estadísticas del cliente a las cuales
      se puede acceder mediante [mysqli_get_client_stats()](#function.mysqli-get-client-stats),
      [mysqli_get_connection_stats()](#mysqli.get-connection-stats),
      y que también se describen
      en la sección mysqlnd de la salida de la función
      [phpinfo()](#function.phpinfo).




      Este parámetro activa todas
      [ las estadísticas de MySQL Native Driver
      ](#mysqlnd.stats) excepto las relativas a la gestión de la memoria.







      mysqlnd.collect_memory_statistics
      [bool](#language.types.boolean)



       Activa la recolección de diferentes estadísticas concernientes a la memoria
       que pueden ser consultadas mediante
       [mysqli_get_client_stats()](#function.mysqli-get-client-stats),
       [mysqli_get_connection_stats()](#mysqli.get-connection-stats),
       y que también se muestran en
       la sección mysqlnd de la salida de la función
       [phpinfo()](#function.phpinfo).




       Este parámetro activa las estadísticas de gestión de la memoria entre
       [las estadísticas proporcionadas por MySQL
        Native Driver](#mysqlnd.stats).







      mysqlnd.debug [string](#language.types.string)



       Registra las comunicaciones provenientes de cualquier extensión que utilice
       mysqlnd.




       El formato de esta directiva es mysqlnd.debug =
       "option1[,parameter_option1][:option2[,parameter_option2]]".




       Las opciones de formato de strings son las siguientes:




       -

         A[,file] - Añade la traza a un fichero. Asegura que los datos son escritos
         después de cada escritura cerrando y volviendo a abrir el fichero de traza (lento). Esto
         ayuda a asegurar que el fichero de trazas será completo incluso si la aplicación falla.





       -

         a[,file] - Añade la traza a un fichero.





       -

         d - Activa la salida desde las macros DBUG_&lt;N&gt; para el estado actual.
         Puede ser seguido de una lista de palabras clave que seleccionan la salida solo
         para las macros DBUG con esa palabra clave (filtro). Una lista vacía de palabras clave
         seleccionará todo.





       -

         f[,functions] - Limita las acciones del depurador a una lista específica de funciones.
         Una lista vacía hará que todas las funciones sean utilizadas.





       -

         F - Marca cada línea de depuración con el nombre del fichero fuente que contiene la macro
         que causa esta salida.





       -

         i - Marca cada línea de depuración con el PID.





       -

         L - Marca cada línea de depuración con el nombre del fichero fuente así como la línea
         de la macro que causa esta salida.





       -

         n - Marca cada línea de depuración con la profundidad actual de la función.





       -

         o[,file] - Similar a a[,file] pero sobrescribe los ficheros en lugar de complementarlos.





       -

         O[,file] - Similar a A[,file] pero sobrescribe los ficheros en lugar de complementarlos.





       -

         t[,N] - Activa el trazado del flujo de control de las funciones. La profundidad máxima
         se especifica mediante N, por omisión 200.





       -

         x - Activa el perfilado.





       -

         m - Trazar las asignaciones y desasignaciones de memoria.







       Ejemplo:





d:t:x:O,/tmp/mysqlnd.trace

     **Nota**:



       Esta característica solo está disponible para las versiones de depuración de PHP.











      mysqlnd.log_mask
      [int](#language.types.integer)



       Define qué consulta será historizada. Por omisión, vale 0, lo que significa
       que los logs están desactivados. Conviene definir esta opción utilizando
       un entero, y no una constante PHP. Por ejemplo, un valor de
       48 (16 + 32) historizará las consultas lentas que utilicen 'no good index'
       (SERVER_QUERY_NO_GOOD_INDEX_USED = 16) o ningún índice en absoluto (SERVER_QUERY_NO_INDEX_USED = 32).
       Un valor de 2043 (1 + 2 + 8 + ... + 1024) historizará todo tipo de consultas lentas.




       Los tipos son los siguientes: SERVER_STATUS_IN_TRANS=1, SERVER_STATUS_AUTOCOMMIT=2,
       SERVER_MORE_RESULTS_EXISTS=8, SERVER_QUERY_NO_GOOD_INDEX_USED=16, SERVER_QUERY_NO_INDEX_USED=32,
       SERVER_STATUS_CURSOR_EXISTS=64, SERVER_STATUS_LAST_ROW_SENT=128, SERVER_STATUS_DB_DROPPED=256,
       SERVER_STATUS_NO_BACKSLASH_ESCAPES=512, y SERVER_QUERY_WAS_SLOW=1024.







      mysqlnd.mempool_default_size
      [int](#language.types.integer)



       Tamaño por omisión de la cola de memoria mysqlnd, utilizada por los juegos
       de resultados.







      mysqlnd.net_read_timeout
      [int](#language.types.integer)



       mysqlnd y la MySQL Client Library,
       libmysqlclient utilizan API de red diferentes.
       mysqlnd utiliza los flujos PHP, mientras que
       libmysqlclient utiliza su propia implementación basada en
       el sistema. PHP, por omisión, utiliza un timeout de lectura de 60s. Esto
       utilizando el parámetro de php.ini,
       default_socket_timeout. Esto se aplica a todos los flujos
       que no especifican un timeout por omisión.
       mysqlnd no afecta ningún otro valor y por lo tanto las consultas
       largas pueden verse desconectadas después
       de default_socket_timeout segundos con el resultado
       de un mensaje de error 2006 - MySQL Server has gone
       away. La MySQL Client Library afecta un timeout por omisión de
       24 * 3600 segundos (1 día) y espera otros timeouts, como los de
       TCP/IP. mysqlnd utiliza ahora el mismo timeout muy largo.
       El valor es configurable mediante el parámetro php.ini
       mysqlnd.net_read_timeout.
       mysqlnd.net_read_timeout es por lo tanto utilizado por cualquier extensión
       (ext/mysql, ext/mysqli,
       PDO_MySQL) que se basa en
       mysqlnd. mysqlnd indica a los flujos PHP utilizar
       mysqlnd.net_read_timeout. Tenga en cuenta que puede haber diferencias
       sutiles entre
       MYSQL_OPT_READ_TIMEOUT de la MySQL Client Library y los flujos
       PHP, por ejemplo MYSQL_OPT_READ_TIMEOUT se dice funcional
       únicamente con conexiones TCP/IP y, antes de MySQL 5.1.2, solo en Windows.
       Los flujos PHP, ellos, no tienen esta limitación. Consulte la documentación de los flujos en caso de duda.







      mysqlnd.net_cmd_buffer_size
      [int](#language.types.integer)



       mysqlnd asigna un buffer interno para la red de un tamaño
       de mysqlnd.net_cmd_buffer_size (en
       php.ini) bytes para cada conexión. Si una orden del
       protocolo MySQL Client Server, por ejemplo,
       COM_QUERY (consulta normal), no cabe en
       el buffer, mysqlnd aumentará aquel a la tamaño requerido.
       Cada vez que el buffer es aumentado para una conexión,
       command_buffer_too_small será incrementado en uno.




       Si mysqlnd debe aumentar el buffer más allá de su tamaño inicial de
       mysqlnd.net_cmd_buffer_size bytes para casi todas las conexiones,
       entonces debería aumentar este tamaño por omisión para evitar las reasignaciones.




       El tamaño por omisión del buffer es de 4096 bytes.




       El valor también puede ser cambiado mediante mysqli_options(link,
       MYSQLI_OPT_NET_CMD_BUFFER_SIZE, size).







      mysqlnd.net_read_buffer_size
      [int](#language.types.integer)



       Tamaño máximo del segmento en lectura al leer el cuerpo de un paquete de orden MySQL. El protocolo servidor de MySQL encapsula todas
       sus órdenes en paquetes. Los paquetes consisten en un encabezado corto
       seguido de un cuerpo que contiene las informaciones. El tamaño del cuerpo está codificado en
       el encabezado. mysqlnd lee el cuerpo en forma de segmentos
       de MIN(header.size, mysqlnd.net_read_buffer_size)
       bytes. Si el cuerpo de un paquete es más grande que
       mysqlnd.net_read_buffer_size bytes,
       mysqlnd debe entonces llamar a read()
       varias veces.




       El valor también puede ser cambiado mediante mysqli_options(link,
       MYSQLI_OPT_NET_READ_BUFFER_SIZE, size).







      mysqlnd.sha256_server_public_key
      [string](#language.types.string)



       Relacionado con el plugin de autenticación SHA-256.
       Fichero que contiene la clave pública RSA en el servidor MySQL.




       Los clientes pueden omitir definir una clave pública RSA y especificar
       la clave mediante la directiva de configuración PHP, o bien, definir la clave
       en el momento de la ejecución utilizando la función [mysqli_options()](#mysqli.options).
       Si ningún fichero de clave pública RSA es proporcionado por el cliente, entonces la clave
       será intercambiada conforme al procedimiento del plugin de autenticación estándar
       SHA-256.







     mysqlnd.trace_alloc
     [string](#language.types.string)










     mysqlnd.fetch_data_copy
     [int](#language.types.integer)



      Obliga a copiar los juegos de resultados desde los buffers internos hacia
      variables PHP en lugar de utilizar el mecanismo por omisión de referencia
      y copia al escribir. Consulte las,
      [notas de implementación sobre la gestión de memoria](#mysqlnd.memory)
      para más detalles.




      Copiar los juegos de resultados en lugar de tener variables PHP que los referencian permite liberar más pronto la memoria ocupada por las variables PHP. Dependiendo del código de la API cliente, las consultas actuales y el tamaño de sus juegos de resultados, esto puede reducir la huella de memoria de mysqlnd.




       No activar con PDO_MySQL. PDO_MySQL no soporta aún este modo.



     **Nota**:
      Eliminado a partir de PHP 8.1.0


# Incompatibilidades

El Driver MySQL Native es compatible en muchos casos con la librería MySQL Client
(libmysql). Esta sección documenta las incompatibilidades
entre estas librerías.

- Los valores de tipo bit son devueltos como strings binarios
  (p.e. "\0" o "\x1F") con libmysql y como strings
  decimales (p.e. "0" o "31") con mysqlnd. Si se desea que el código
  sea compatible con ambas librerías entonces siempre se deberá devolver campos de tipo bit como
  números desde MySQL con una consulta como la siguiente:
  SELECT bit + 0 FROM table.

# Conexiones persistentes

**Utilizar conexiones persistentes**

Si mysqli se utiliza con mysqlnd,
cuando se crea una conexión persistente, se genera una llamada
COM_CHANGE_USER
(mysql_change_user()) en el servidor. Esto
asegura que la re-autenticación de la conexión se lleva a cabo.

Dado que hay una cierta sobrecarga asociada con la llamada
COM_CHANGE_USER, es posible apagar
esto en el tiempo de compilado. La reutilización de una conexión persistente entonces
generará una llamada COM_PING (mysql_ping)
para simplemente probar si la conexión es reusable.

La generación de COM_CHANGE_USER se puede apagar
con el marcador de compilación
MYSQLI_NO_CHANGE_USER_ON_PCONNECT. Por ejemplo:

shell# CFLAGS="-DMYSQLI_NO_CHANGE_USER_ON_PCONNECT" ./configure --with-mysql=/usr/local/mysql/ --with-mysqli=/usr/local/mysql/bin/mysql_config --with-pdo-mysql=/usr/local/mysql/bin/mysql_config --enable-debug &amp;&amp; make clean &amp;&amp; make -j6

O, alternativamente:

shell# export CFLAGS="-DMYSQLI_NO_CHANGE_USER_ON_PCONNECT"
shell# configure --whatever-option
shell# make clean
shell# make

Observe que solamente mysqli sobre mysqlnd
utiliza COM_CHANGE_USER. Otra combinación de
extensión-controlador emplea COM_PING en el uso inicial de una
conexión persistente.

# Estadísticas

El controlador nativo de MySQL contiene soporte para la recolección de estadísticas
sobre la comunicación entre el cliente y el servidor. Las estadísticas
recolectadas son de dos tipos principales:

- Estadísticas del cliente

- Estadísticas de la conexión

Cuando se utiliza la extensión [mysqli](#book.mysqli),
estas estadísticas pueden obtenerse mediante dos llamadas API:

- [mysqli_get_client_stats()](#function.mysqli-get-client-stats)

- [mysqli_get_connection_stats()](#mysqli.get-connection-stats)

**Nota**:

Las estadísticas se agrupan entre todas las extensiones que utilizan
el controlador nativo de MySQL. Por ejemplo, si la extensión [mysqli](#book.mysqli)
y el controlador PDO MySQL están ambos configurados para usar MySQLnd,
entonces las llamadas de funciones de [mysqli](#book.mysqli)
y las llamadas de métodos de PDO afectarán las estadísticas.

No hay manera de saber cuánto impacto ha tenido una cierta llamada API de una
extensión que ha sido compilada sin el controlador nativo de MySQL en
una cierta estadística.

## Recuperación de las estadísticas

Las estadísticas del cliente pueden recuperarse llamando a la
función [mysqli_get_client_stats()](#function.mysqli-get-client-stats).

Las estadísticas de conexión pueden recuperarse llamando a la
función [mysqli_get_connection_stats()](#mysqli.get-connection-stats).

Las dos funciones devuelven un array asociativo,
donde el nombre de una estadística es la clave para los
datos estadísticos correspondientes.

## Estadísticas del controlador nativo de MySQL

La mayoría de las estadísticas están asociadas a una conexión, pero algunas
están asociadas al proceso, en cuyo caso esto será mencionado.

Las siguientes estadísticas son producidas por el controlador nativo de MySQL:

**Estadísticas relacionadas con la red**

    bytes_sent


      El número de bytes enviados de PHP al servidor MySQL.





    bytes_received


      El número de bytes recibidos del servidor MySQL.





    packets_sent


      El número de paquetes enviados por el protocolo cliente-servidor MySQL.





    packets_received


      El número de paquetes recibidos del protocolo cliente-servidor MySQL.





    protocol_overhead_in


      La sobrecarga del protocolo cliente-servidor MySQL en bytes para el tráfico entrante.
      Actualmente, solo el encabezado de paquete (4 bytes) se considera como sobrecarga.
      protocol_overhead_in = packets_received * 4





    protocol_overhead_out


      La sobrecarga del protocolo cliente-servidor MySQL en bytes para el tráfico saliente.
      Actualmente, solo el encabezado de paquete (4 bytes) se considera como sobrecarga.
      protocol_overhead_out = packets_received * 4





    bytes_received_ok_packet


      El tamaño total en bytes de los paquetes OK del protocolo cliente-servidor MySQL recibidos.
      Los paquetes OK pueden contener un mensaje de estado.
      La longitud del mensaje de estado puede variar y por lo tanto el tamaño de un paquete OK
      no es fijo.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_ok


      El número de paquetes OK del protocolo cliente-servidor MySQL recibidos.





    bytes_received_eof_packet


      El tamaño total en bytes de los paquetes EOF del protocolo cliente-servidor MySQL recibidos.
      El tamaño de un paquete EOF puede variar dependiendo de la versión del servidor.
      Además, un paquete EOF puede transportar un mensaje de error.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_eof


      El número de paquetes EOF del protocolo cliente-servidor MySQL recibidos.


      Al igual que con otras estadísticas de paquetes, el número de paquetes será
      incrementado incluso si PHP no recibe el paquete esperado, sino, por ejemplo,
      un mensaje de error.





    bytes_received_rset_header_packet


      El tamaño total en bytes de los encabezados de paquetes de resultados del protocolo cliente-servidor
      MySQL recibidos.
      El tamaño del encabezado del paquete puede variar dependiendo de la carga útil
      (LOAD LOCAL INFILE, INSERT,
      UPDATE, SELECT, mensaje de error).

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_rset_header


      El número de paquetes de encabezados de resultados del protocolo cliente-servidor MySQL recibidos.





    bytes_received_rset_field_meta_packet


      El tamaño total en bytes de los paquetes de metadatos de resultados del protocolo cliente-servidor
      (información de campo).
      Por supuesto, el tamaño varía con los campos del resultado.
      El paquete también puede transportar un error o un paquete EOF en caso de
      COM_LIST_FIELDS.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_rset_field_meta


      El número de paquetes de metadatos de resultados del protocolo cliente-servidor recibidos
      (información de campo).





    bytes_received_rset_row_packet


      El tamaño total en bytes de los datos de fila de resultados del protocolo cliente-servidor
      MySQL recibidos.
      El paquete también puede transportar un error o un paquete EOF.
      Se puede calcular el número de errores y paquetes EOF restando
      rows_fetched_from_server_normal
      y rows_fetched_from_server_ps
      de bytes_received_rset_row_packet.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_rset_row


      El número de paquetes de datos de fila de resultados del protocolo cliente-servidor MySQL recibidos.





    bytes_received_prepare_response_packet


      El tamaño total en bytes de los paquetes OK del protocolo cliente-servidor MySQL recibidos para
      la inicialización de declaraciones preparadas (paquetes de inicialización de declaración preparada).
      El paquete también puede transportar un error.
      El tamaño del paquete depende de la versión de MySQL.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_prepare_response


      El número de paquetes OK del protocolo cliente-servidor MySQL recibidos para
      la inicialización de declaraciones preparadas (paquetes de inicialización de declaración preparada).





    bytes_received_change_user_packet


      El tamaño total en bytes de los paquetes COM_CHANGE_USER del protocolo cliente-servidor MySQL recibidos.
      El paquete también puede transportar un error o un paquete EOF.

     **Nota**:

       El tamaño total en bytes incluye el tamaño del encabezado del paquete
       (4 bytes, ver la sobrecarga del protocolo).








    packets_received_change_user


      El número de paquetes COM_CHANGE_USER del protocolo cliente-servidor MySQL recibidos.





    packets_sent_command


      El número de comandos MySQL enviados por PHP al servidor MySQL.


      No hay manera de saber qué comandos específicos y cuántos
      de ellos han sido enviados.





    bytes_received_real_data_normal


      El número de bytes de carga útil recuperados por el cliente PHP desde
      mysqlnd usando el protocolo de texto.


      Esto es el tamaño de los datos reales contenidos en los conjuntos de resultados
      que no provienen de declaraciones preparadas y que han sido recuperados por el cliente PHP.


      Es de notar que aunque un conjunto de resultados completo haya podido ser extraído de MySQL
      por mysqlnd, esta estadística solo cuenta los datos reales
      extraídos de mysqlnd por el cliente PHP.


      Un ejemplo de secuencia de código que incrementará el valor es el siguiente:


$mysqli = new mysqli();
$res = $mysqli-&gt;query("SELECT 'abc'");
$res-&gt;fetch_assoc();
$res-&gt;close();

      Cada operación de recuperación incrementará el valor.


      Sin embargo, la estadística no será incrementada si el conjunto de resultados es solo
      almacenado en búfer en el cliente, pero no extraído, como en el siguiente ejemplo:


$mysqli = new mysqli();
$res = $mysqli-&gt;query("SELECT 'abc'");
$res-&gt;close();

    bytes_received_real_data_ps


      El número de bytes de carga útil recuperados por el cliente PHP desde
      mysqlnd usando el protocolo de declaración preparada.


      Esto es el tamaño de los datos reales contenidos en los conjuntos de resultados
      que provienen de declaraciones preparadas y que han sido recuperados por el cliente PHP.


      El valor no será incrementado si el conjunto de resultados no es leído por el cliente PHP.


      Es de notar que aunque un conjunto de resultados completo haya podido ser extraído de MySQL
      por mysqlnd, esta estadística solo cuenta los datos reales
      extraídos de mysqlnd por el cliente PHP.


      Ver también bytes_received_real_data_normal.


**Estadísticas relacionadas con los conjuntos de resultados**

    result_set_queries


      El número de consultas que han generado un conjunto de resultados.
      Ejemplos de consultas que generan un conjunto de resultados:
      SELECT, SHOW.


      La estadística no será incrementada si hay un error al leer
      el encabezado del paquete del conjunto de resultados.

     **Nota**:

       Esta estadística puede ser utilizada como medida indirecta del número de
       Esto puede ayudar a identificar un cliente que provoca una carga alta en la base de datos.
       consultas que PHP ha enviado a MySQL.








    non_result_set_queries


      El número de consultas que no han generado un conjunto de resultados.
      Ejemplos de consultas que no generan un conjunto de resultados:
      INSERT, UPDATE, LOAD DATA.


      Esta estadística no será incrementada si hay un error al leer
      el encabezado del paquete del conjunto de resultados.

     **Nota**:

       Esta estadística puede ser utilizada como medida indirecta del número de
       Esto puede ayudar a identificar un cliente que provoca una carga alta en la base de datos.
       consultas que PHP ha enviado a MySQL.








    no_index_used


      El número de consultas que han generado un conjunto de resultados pero no han utilizado un índice.
      (Ver también la opción de inicio de mysqld --log-queries-not-using-indexes).

     **Nota**:

       Estas consultas pueden ser reportadas mediante una excepción llamando
       mysqli_report(MYSQLI_REPORT_INDEX);.
       Es posible reportarlas mediante un aviso llamando
       mysqli_report(MYSQLI_REPORT_INDEX ^ MYSQLI_REPORT_STRICT);.








    bad_index_used


      El número de consultas que han generado un conjunto de resultados y no han utilizado un buen índice.
      (Ver también la opción de inicio de mysqld --log-slow-queries).

     **Nota**:

       Estas consultas pueden ser reportadas mediante una excepción llamando
       mysqli_report(MYSQLI_REPORT_INDEX);.
       Es posible reportarlas mediante un aviso llamando
       mysqli_report(MYSQLI_REPORT_INDEX ^ MYSQLI_REPORT_STRICT);.








    slow_queries


      Las declaraciones SQL que han tomado más de long_query_time
      segundos para ejecutarse y han necesitado al menos
      min_examined_row_limit filas para examinar.

     **Precaución**

       No reportado mediante [mysqli_report()](#function.mysqli-report).








    buffered_sets


      El número de conjuntos de resultados almacenados en búfer devueltos por consultas normales
      (es decir, no mediante una declaración preparada).


      Ejemplos de llamadas API que almacenarán en búfer los conjuntos de resultados en el cliente:
      [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result), [mysqli_stmt_get_result()](#mysqli-stmt.get-result)







    unbuffered_sets


      El número de conjuntos de resultados no almacenados en búfer devueltos por consultas normales
      (es decir, no mediante una declaración preparada).


      Ejemplos de llamadas API que no almacenarán en búfer los conjuntos de resultados en el cliente:
      [mysqli_use_result()](#mysqli.use-result)







    ps_buffered_sets


      El número de conjuntos de resultados almacenados en búfer devueltos por declaraciones preparadas.


      Ejemplos de llamadas API que almacenarán en búfer los conjuntos de resultados en el cliente:
      [mysqli_stmt_store_result()](#mysqli-stmt.store-result)







    ps_unbuffered_sets


      El número de conjuntos de resultados no almacenados en búfer devueltos por declaraciones preparadas.


      Por omisión, las declaraciones preparadas no son almacenadas en búfer,
      por lo que la mayoría de las declaraciones preparadas serán contabilizadas en esta estadística.





    flushed_normal_sets


      El número de juegos de resultados devueltos por consultas normales
      (es decir, no mediante una declaración preparada) con datos no leídos que han sido
      silenciosamente vaciados.


     **Nota**:

       El vaciado solo ocurre con conjuntos de resultados no almacenados en búfer.


       Los conjuntos de resultados no almacenados en búfer deben ser recuperados completamente antes
       de que una nueva consulta pueda ser ejecutada en la conexión, de lo contrario MySQL lanzará un error.
       Si la aplicación no recupera todas las filas de un conjunto de resultados no almacenado en búfer,
       mysqlnd recupera implícitamente el conjunto de resultados para vaciar la fila.


       Ver también rows_skipped_normal, rows_skipped_ps.




       Algunas causas posibles para un vaciado implícito:



        -

          Aplicación cliente defectuosa



        -

          Cliente se detuvo de leer después de encontrar lo que buscaba
          pero hizo que MySQL calculara más filas de las necesarias



        -

          La aplicación cliente se detuvo de manera inesperada










    flushed_ps_sets


      El número de juegos de resultados devueltos por declaraciones preparadas
      con datos no leídos que han sido silenciosamente vaciados.


     **Nota**:

       El vaciado solo ocurre con conjuntos de resultados no almacenados en búfer.


       Los conjuntos de resultados no almacenados en búfer deben ser recuperados completamente antes
       de que una nueva consulta pueda ser ejecutada en la conexión, de lo contrario MySQL lanzará un error.
       Si la aplicación no recupera todas las filas de un conjunto de resultados no almacenado en búfer,
       mysqlnd recupera implícitamente el conjunto de resultados para vaciar la fila.


       Ver también rows_skipped_normal, rows_skipped_ps.




       Algunas causas posibles para un vaciado implícito:



        -

          Aplicación cliente defectuosa



        -

          Cliente se detuvo de leer después de encontrar lo que buscaba
          pero hizo que MySQL calculara más filas de las necesarias



        -

          La aplicación cliente se detuvo de manera inesperada










    ps_prepared_never_executed


      El número de declaraciones preparadas preparadas pero nunca ejecutadas.





    ps_prepared_once_executed


      El número de declaraciones preparadas ejecutadas una sola vez.





    rows_fetched_from_server_normal
    rows_fetched_from_server_ps


      El número total de filas de conjunto de resultados recuperadas del servidor.
      Esto incluye las filas que no han sido leídas por el cliente pero
      han sido recuperadas implícitamente debido a conjuntos de resultados no almacenados en búfer vaciados.


      Ver también packets_received_rset_row.





    rows_buffered_from_client_normal


      El número total de filas almacenadas en búfer provenientes de una consulta normal.


      Esto es el número de filas que han sido recuperadas de MySQL y almacenadas en búfer en el cliente.


      Ejemplos de consultas que almacenarán en búfer los conjuntos de resultados:



       - [mysqli_query()](#mysqli.query)

       - [mysqli_store_result()](#mysqli.store-result)







    rows_buffered_from_client_ps


      Equivalente a rows_buffered_from_client_normal
      pero para las declaraciones preparadas.





    rows_fetched_from_client_normal_buffered


      El número total de filas recuperadas por el cliente desde un conjunto de resultados almacenado en búfer
      creado por una consulta normal.





    rows_fetched_from_client_ps_buffered


      El número total de filas recuperadas por el cliente desde un conjunto de resultados almacenado en búfer
      creado por una declaración preparada.





    rows_fetched_from_client_normal_unbuffered


      El número total de filas recuperadas por el cliente desde un conjunto de resultados no almacenado en búfer
      creado por una consulta normal.





    rows_fetched_from_client_ps_unbuffered


      El número total de filas recuperadas por el cliente desde un conjunto de resultados no almacenado en búfer
      creado por una declaración preparada.





    rows_fetched_from_client_ps_cursor


      El número total de filas recuperadas por el cliente desde un cursor creado
      por una declaración preparada.






    rows_skipped_normal
    rows_skipped_ps


      Reservado para uso futuro (actualmente no soportado).





    copy_on_write_saved
    copy_on_write_performed


      Esto es una estadística de alcance de proceso.


      Con mysqlnd, las variables devueltas por las extensiones apuntan a mysqlnd
      búferes de resultados internos.
      Si los datos no son modificados, los datos extraídos solo se conservan una vez en memoria.
      Sin embargo, cualquier modificación de los datos requerirá que mysqlnd realice
      una operación de copia-al-escribir.





    explicit_free_result
    implicit_free_result


      Esto es una estadística de alcance de conexión y de proceso.


      El número total de resultados liberados.





    proto_text_fetched_null


      El número total de columnas de tipo
      MYSQL_TYPE_NULL
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_null


      El número total de columnas de tipo
      MYSQL_TYPE_NULL
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_bit


      El número total de columnas de tipo
      MYSQL_TYPE_BIT
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_bit


      El número total de columnas de tipo
      MYSQL_TYPE_BIT
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_tinyint


      El número total de columnas de tipo
      MYSQL_TYPE_TINY
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_tinyint


      El número total de columnas de tipo
      MYSQL_TYPE_TINY
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_short


      El número total de columnas de tipo
      MYSQL_TYPE_SHORT
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_short


      El número total de columnas de tipo
      MYSQL_TYPE_SHORT
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_int24


      El número total de columnas de tipo
      MYSQL_TYPE_INT24
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_int24


      El número total de columnas de tipo
      MYSQL_TYPE_INT24
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_int


      El número total de columnas de tipo
      MYSQL_TYPE_LONG
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_int


      El número total de columnas de tipo
      MYSQL_TYPE_LONG
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_bigint


      El número total de columnas de tipo
      MYSQL_TYPE_LONGLONG
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_bigint


      El número total de columnas de tipo
      MYSQL_TYPE_LONGLONG
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_decimal


      El número total de columnas de tipo
      MYSQL_TYPE_DECIMAL, o MYSQL_TYPE_NEWDECIMAL
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_decimal


      El número total de columnas de tipo
      MYSQL_TYPE_DECIMAL, o MYSQL_TYPE_NEWDECIMAL
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_float


      El número total de columnas de tipo
      MYSQL_TYPE_FLOAT
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_float


      El número total de columnas de tipo
      MYSQL_TYPE_FLOAT
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_double


      El número total de columnas de tipo
      MYSQL_TYPE_DOUBLE
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_double


      El número total de columnas de tipo
      MYSQL_TYPE_DOUBLE
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_date


      El número total de columnas de tipo
      MYSQL_TYPE_DATE, o MYSQL_TYPE_NEWDATE
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_date


      El número total de columnas de tipo
      MYSQL_TYPE_DATE, o MYSQL_TYPE_NEWDATE
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_year


      El número total de columnas de tipo
      MYSQL_TYPE_YEAR
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_year


      El número total de columnas de tipo
      MYSQL_TYPE_YEAR
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_time


      El número total de columnas de tipo
      MYSQL_TYPE_TIME
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_time


      El número total de columnas de tipo
      MYSQL_TYPE_TIME
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_datetime


      El número total de columnas de tipo
      MYSQL_TYPE_DATETIME
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_datetime


      El número total de columnas de tipo
      MYSQL_TYPE_DATETIME
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_timestamp


      El número total de columnas de tipo
      MYSQL_TYPE_TIMESTAMP
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_timestamp


      El número total de columnas de tipo
      MYSQL_TYPE_TIMESTAMP
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_string


      El número total de columnas de tipo
      MYSQL_TYPE_STRING, MYSQL_TYPE_VARSTRING, or MYSQL_TYPE_VARCHAR
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_string


      El número total de columnas de tipo
      MYSQL_TYPE_STRING, MYSQL_TYPE_VARSTRING, or MYSQL_TYPE_VARCHAR
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_blob


      El número total de columnas de tipo
      MYSQL_TYPE_TINY_BLOB,
      MYSQL_TYPE_MEDIUM_BLOB,
      o MYSQL_TYPE_BLOB
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_blob


      El número total de columnas de tipo
      MYSQL_TYPE_TINY_BLOB,
      MYSQL_TYPE_MEDIUM_BLOB,
      MYSQL_TYPE_LONG_BLOB,
      o MYSQL_TYPE_BLOB
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_enum


      El número total de columnas de tipo
      MYSQL_TYPE_ENUM
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_enum


      El número total de columnas de tipo
      MYSQL_TYPE_ENUM
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_set


      El número total de columnas de tipo
      MYSQL_TYPE_SET
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_set


      El número total de columnas de tipo
      MYSQL_TYPE_SET
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_geometry


      El número total de columnas de tipo
      MYSQL_TYPE_GEOMETRY
      recuperadas desde una consulta normal (protocolo de texto MySQL).





    proto_binary_fetched_geometry


      El número total de columnas de tipo
      MYSQL_TYPE_GEOMETRY
      recuperadas desde una declaración preparada (protocolo binario MySQL).





    proto_text_fetched_other


      El número total de columnas de tipos
      MYSQL_TYPE_*
      no listados anteriormente
      recuperadas desde una consulta normal (protocolo de texto MySQL).

     **Nota**:

       En teoría, esto debería ser siempre 0.








    proto_binary_fetched_other


      El número total de columnas de tipo
      MYSQL_TYPE_*
      no listados anteriormente
      recuperadas desde una declaración preparada (protocolo binario MySQL).

     **Nota**:

       En teoría, esto debería ser siempre 0.



**Estadísticas relacionadas con la conexión**

    connect_success


      El número total de intentos de conexión exitosos.

     **Nota**:

       connect_success contiene la suma de los intentos de conexión
       persistentes y no persistentes exitosos.
       Por lo tanto, el número de intentos de conexión no persistentes exitosos
       es connect_success - pconnect_success.








    pconnect_success


      El número total de intentos de conexión persistentes exitosos.





    connect_failure


      El número total de intentos de conexión fallidos.





    reconnect


      Esto es una estadística de alcance de proceso.





    active_connections


      Esto es una estadística de alcance de proceso.


      El número total de conexiones persistentes y no persistentes activas.

     **Nota**:

       El número total de conexiones no persistentes activas es
       active_connections - active_persistent_connections.








    active_persistent_connections


      Esto es una estadística de alcance de proceso.


      El número total de conexiones persistentes activas.





    explicit_close


      El número total de conexiones cerradas explícitamente.


      **Ejemplo #1 Ejemplos de fragmentos de código que provocan un cierre explícito**



       -


$link = new mysqli(/* ... */);
$link-&gt;close(/_ ... _/);

       -


$link = new mysqli(/* ... */);
$link-&gt;connect(/_ ... _/);

    implicit_close


      El número total de conexiones cerradas implícitamente.


      **Ejemplo #2 Ejemplos de fragmentos de código que provocan un cierre implícito**



       -


$link = new mysqli(/* ... */);
$link-&gt;real_connect(/_ ... _/);

       -

         unset($link)




       -

         Conexión persistente: una conexión agrupada ha sido creada con
         real_connect y puede haber opciones desconocidas definidas - cerrar
         implícitamente para evitar devolver una conexión con opciones desconocidas



       -

         Conexión persistente: ping/change_user falla y ext/mysqli
         cierra la conexión



       -

         Fin de la ejecución del script: cerrar conexiones que no han sido
         cerradas por el usuario









    disconnect_close


      Fallos de conexión indicados por la llamada de API C
      mysql_real_connect durante un intento de
      establecer una conexión.





    in_middle_of_command_close


      Esto es una estadística de alcance de proceso.


      Una conexión ha sido cerrada en medio de la ejecución de un comando
      (conjuntos de resultados no recuperados, después de enviar una consulta y
      antes de recuperar una respuesta, durante la recuperación de datos, durante
      la transferencia de datos con LOAD DATA).

     **Advertencia**

       A menos que se usen consultas asíncronas, esto solo debería ocurrir
       si la aplicación PHP terminó inesperadamente y PHP cierra automáticamente la conexión.








    init_command_executed_count


      El número total de ejecuciones de comandos de inicialización.
      Por ejemplo: mysqli_options(MYSQLI_INIT_COMMAND , $value).


      El número de ejecuciones exitosas es
      init_command_executed_count - init_command_failed_count.





    init_command_failed_count


      El número total de fallos en la ejecución de comandos de inicialización.


**Estadísticas relacionadas con los comandos COM\_\***

    com_quit
    com_init_db
    com_query
    com_field_list
    com_create_db
    com_drop_db
    com_refresh
    com_shutdown
    com_statistics
    com_process_info
    com_connect
    com_process_kill
    com_debug
    com_ping
    com_time
    com_delayed_insert
    com_change_user
    com_binlog_dump
    com_table_dump
    com_connect_out
    com_register_slave
    com_stmt_prepare
    com_stmt_execute
    com_stmt_send_long_data
    com_stmt_close
    com_stmt_reset
    com_stmt_set_option
    com_stmt_fetch
    com_daemon


      El número total de intentos de enviar un cierto comando
      COM_* de PHP a MySQL.


      La estadística es incrementada después de verificar la línea y justo
      antes de enviar el paquete de protocolo cliente-servidor MySQL correspondiente.

     **Precaución**

       Si MySQLnd falla al enviar el paquete en la red, las estadísticas no serán decrementadas.
       En caso de fallo, MySQLnd emite un aviso PHP
       Error while sending %s packet. PID=%d.






      **Ejemplo #3 Ejemplos de uso**



       -

         Verificar si PHP envía ciertos comandos a MySQL, por ejemplo,
         verificar si un cliente envía COM_PROCESS_KILL





       -

         Calcular el número promedio de ejecuciones de comandos preparados
         comparando COM_EXECUTE con
         COM_PREPARE





       -

         Verificar si PHP ha ejecutado declaraciones SQL no preparadas
         verificando si COM_QUERY es cero





       -

         Identificar los scripts PHP que ejecutan un número excesivo de declaraciones SQL
         verificando COM_QUERY y
         COM_EXECUTE








**Estadísticas diversas**

    explicit_stmt_close
    implicit_stmt_close


      Esto es una estadística de alcance de proceso.


      El número total de declaraciones preparadas cerradas explícitamente.

     **Nota**:

       Una declaración preparada siempre es cerrada explícitamente. La única vez que es cerrada implícitamente es cuando su preparación falla.








    mem_emalloc_count
    mem_emalloc_ammount
    mem_ecalloc_count
    mem_ecalloc_ammount
    mem_realloc_count
    mem_realloc_ammount
    mem_efree_count
    mem_malloc_count
    mem_malloc_ammount
    mem_calloc_count
    mem_calloc_ammount
    mem_ealloc_count
    mem_ealloc_ammount
    mem_free_count


      Esto es una estadística de alcance de proceso.


      Llamadas a la gestión de memoria.





    command_buffer_too_small



      El número de extensiones de búfer de comando de red al enviar comandos de
      PHP a MySQL.


      MySQLnd asigna un búfer de comando/red interno de
      [mysqlnd.net_cmd_buffer_size](#ini.mysqlnd.net-cmd-buffer-size)
      bytes para cada conexión.


      Si un protocolo de comando de servidor MySQL, por ejemplo
      COM_QUERY (consulta normal),
      no cabe en el búfer,
      MyQSLnd extenderá el búfer a lo que sea necesario para enviar el comando.
      Cada vez que el búfer es extendido para una conexión
      command_buffer_too_small será incrementado en uno.


      Si mysql es obligado a hacer crecer el búfer más allá de su tamaño inicial de
      [mysqlnd.net_cmd_buffer_size](#ini.mysqlnd.net-cmd-buffer-size)
      bytes para casi cada conexión,
      se deberían considerar aumentar el tamaño por defecto para evitar
      las reasignaciones.





    connection_reused


      El número total de veces que una conexión persistente ha sido reutilizada.


# Notas

En esta sección se ofrece una colección de diversas notas sobre el uso del
Controlador Nativo de MySQL.

- Utilizar mysqlnd significa que se están utilizando flujos
  PHP para la conectividad subyacente. Para mysqlnd, se debe consultar
  la documentación de flujos de PHP ([Flujos](#book.stream))
  para detalles como la configuración del tiempo de espera, y no la documentación para la
  Biblioteca Cliente de MySQL.

# Gestión de la memoria

**Introducción**

El driver nativo MySQL gestiona la memoria de forma diferente a la biblioteca
cliente MySQL. Las bibliotecas difieren en la forma en que la memoria
es asignada y liberada, en la forma en que la memoria es asignada por
fragmentos durante la lectura de los resultados desde MySQL, qué opciones
de depuración y desarrollo existen, y cómo los resultados leídos
desde MySQL son vinculados a las variables de usuario PHP.

Las notas siguientes son una introducción y un resumen destinados a los usuarios
interesados en comprender el driver nativo MySQL desde el punto de vista
del código C.

**Funciones utilizadas en la gestión de memoria**

Todas las asignaciones y desasignaciones se realizan utilizando las funciones
de gestión de memoria de PHP. Sin embargo, el consumo de memoria
de mysqlnd puede ser monitoreado utilizando llamadas a APIs de PHP, como
[memory_get_usage()](#function.memory-get-usage). Debido a que la memoria
es asignada y liberada utilizando la gestión de memoria de PHP, las modificaciones
pueden no ser inmediatamente visibles a nivel del sistema operativo.
El gestor de memoria de PHP funciona como un proxy que puede tener un poco
de retraso en la liberación de memoria del sistema. Además, la comparación del uso
de memoria del driver nativo MySQL y de la biblioteca cliente MySQL se vuelve
difícil. La biblioteca cliente MySQL llama directamente al gestor de memoria
del sistema operativo, y por lo tanto, los efectos pueden ser vistos inmediatamente
a nivel del sistema operativo.

Todas las limitaciones de memoria realizadas por PHP afectan también al driver
nativo MySQL. Esto puede causar errores de excedente de memoria al recuperar
juegos de resultados demasiado grandes, excediendo el tamaño de la memoria restante
disponible para PHP. Debido a que la biblioteca cliente MySQL no utiliza las funciones
de gestión de memoria de PHP, no tiene en cuenta ninguna limitación de memoria
definida por PHP. Si se utiliza la biblioteca cliente MySQL, según el modelo de despliegue,
la huella de memoria del proceso PHP puede aumentar y superar el límite de memoria
impuesto por PHP. Además, los scripts PHP pueden analizar juegos de resultados más grandes,
asignando así más memoria para el juego de resultados de la que el control del motor PHP permite.

Las funciones de gestión de memoria de PHP son llamadas por el driver nativo MySQL
a través de un gestor ligero. Entre otras cosas, este gestor facilita el depuración.

**Gestión de los juegos de resultados**

Los diferentes servidores MySQL y las diferentes APIs de clientes se diferencian
según el [buffering o no](#mysqli.quickstart.statements) de los juegos de resultados. Los juegos de resultados que no son bufferizados son transferidos línea por línea desde MySQL hacia el cliente, y el cliente recorrerá los resultados. Los resultados que son bufferizados son recuperados en su totalidad por la biblioteca cliente antes de pasarlos al cliente.

El driver nativo MySQL utiliza flujos PHP para la comunicación en red con
el servidor MySQL. Los resultados enviados por MySQL son recuperados desde la memoria
buffer de los flujos de red PHP hacia la memoria buffer de resultados de mysqlnd.
La memoria buffer de resultados está compuesta por zvals. En una etapa siguiente,
los resultados son puestos a disposición del script PHP. La transferencia final desde la
memoria buffer de resultados hacia las variables PHP impacta el consumo de memoria
y esto se vuelve muy visible al utilizar juegos de resultados bufferizados.

Por omisión, el driver nativo MySQL intenta no conservar en memoria
dos veces los resultados bufferizados. Los resultados son conservados
una sola vez en la memoria buffer interna de resultados, así como en sus
zvals. Cuando los resultados son recuperados en las variables PHP por el script
PHP, las variables referenciarán la memoria buffer interna de resultados.
Los resultados de consultas de base de datos no son copiados y
son conservados en memoria solo una vez. Cuando un usuario modifica
el contenido de una variable que contiene un resultado de base de datos, una operación
de copia-al-escritura debe ser realizada para evitar modificar la memoria buffer
interna de resultado referenciada. El contenido de la memoria buffer no debe ser modificado
porque el usuario puede decidir leer el juego de resultados una segunda vez.
La operación de copia-al-escritura está implementada utilizando un gestor de lista
de referencia adicional, así como el uso de los contadores de referencia zvals estándar.
La operación de copia-al-escritura también debe ser realizada si el usuario
lee un juego de resultados en las variables PHP y libera un juego de resultado antes
de que las variables sean eliminadas.

En general, este mecanismo funciona bien para los scripts que leen
un juego de resultados una sola vez, y no modifican las variables que contienen
los resultados. Su principal desventaja es la sobrecarga de memoria causada por
el gestor de referencia adicional, que proviene principalmente del hecho
de que las variables de usuario que contienen los resultados no pueden ser liberadas
completamente mientras el gestor de referencia mysqlnd las siga referenciando.
El driver nativo MySQL elimina la referencia a las variables de usuario cuando
el juego de resultados es liberado o cuando se realiza una operación de copia-al-escritura.
Un observador puede ver que el consumo total de memoria aumenta
mientras el juego de resultados no sea liberado. Utilice las
[estadísticas](#mysqlnd.stats) para verificar si un script
libera el juego de resultados explícitamente, o si el driver lo libera implícitamente,
haciendo que la memoria sea utilizada más tiempo del necesario.
Las estadísticas también pueden ayudar a ver las operaciones de copia-al-escritura.

Un script PHP que lee muchas pequeñas líneas de un juego de resultados bufferizado
utilizando líneas de código como while ($row = $res-&gt;fetch_assoc()) { ... }
puede optimizar el consumo de memoria solicitando una copia en lugar de
referencias. Aunque solicitar copias significa conservar dos veces el resultado en memoria,
esto permite a PHP liberar la copia contenida en
$row sabiendo que el juego de resultados está siendo recorrido
y antes de liberar el juego de resultados en sí. En un servidor cargado,
la optimización del uso de memoria puede mejorar el rendimiento del sistema
en general, aunque para un script individual, el enfoque de la copia puede ser más lento
debido a las operaciones adicionales de asignación y copia de memoria.

**Supervisión y depuración**

Existen varias formas de supervisar el uso de memoria del driver nativo MySQL.
Si el objetivo es obtener una vista rápida de alto nivel, o verificar la eficiencia
de memoria de los scripts PHP, entonces revise las [estadísticas](#mysqlnd.stats)
recopiladas por la biblioteca. Estas le permiten, por ejemplo,
ver las consultas SQL que generan más resultados de los analizados por un script PHP.

El rastreo de [depuración](#ini.mysqlnd.debug) en el historial
puede ser configurado para registrar las llamadas al gestor de memoria. Esto puede ayudar
a ver cuándo la memoria es asignada o liberada. Sin embargo, el tamaño de los
fragmentos de memoria solicitados puede no estar listado.

Las versiones recientes del driver nativo MySQL intentan emular situaciones
de excedente de memoria aleatorio. Esto es útil únicamente para los desarrolladores C
de la biblioteca, o para los desarrolladores del [complemento](#mysqlnd.plugin)
mysqlnd. Consulte el código fuente para las opciones de configuración de PHP correspondientes,
así como para obtener más detalles sobre este mecanismo.
Esta funcionalidad se considera privada, y puede ser modificada en cualquier momento
sin previo aviso.

# API del plugin del controlador nativo MySQL

## Tabla de contenidos

- [Comparación de los plugins mysqlnd con proxy MySQL](#mysqlnd.plugin.mysql-proxy)
- [Obtener la API del plugin mysqlnd](#mysqlnd.plugin.obtaining)
- [Arquitectura del plugin del controlador nativo](#mysqlnd.plugin.architecture)
- [La API del plugin mysqlnd](#mysqlnd.plugin.api)
- [Cómo comenzar a compilar un plugin mysqlnd](#mysqlnd.plugin.developing)

    La API del plugin del controlador nativo MySQL es una funcionalidad
    del controlador nativo MySQL, o mysqlnd.
    El plugin Mysqlnd opera en la capa entre
    las aplicaciones PHP y el servidor MySQL. Es comparable
    a un proxy MySQL. Un proxy MySQL opera en una capa entre todas
    las aplicaciones cliente MySQL, por ejemplo, una aplicación PHP
    y un servidor MySQL. El plugin Mysqlnd
    puede realizar tareas típicas de proxy MySQL como
    el equilibrio de carga, así como el seguimiento y la optimización
    de las prestaciones. Debido a una arquitectura y una localización
    diferente, el plugin mysqlnd no tiene todos los
    inconvenientes de un proxy MySQL. Por ejemplo, con el plugin, no
    hay un único punto de fallo, no hay un servidor proxy dedicado
    que desplegar, y no hay un nuevo lenguaje que aprender (Lua).

    Un plugin mysqlnd puede ejecutarse como una extensión
    a mysqlnd. Un plugin puede interceptar la mayoría de
    las funciones mysqlnd. Las funciones mysqlnd
    son llamadas por la extensión PHP MySQL como
    ext/mysql, ext/mysqli, y
    PDO_MYSQL. Como resultado, es posible para un
    plugin mysqlnd interceptar todas las llamadas realizadas
    por estas extensiones desde una aplicación cliente.

    Las llamadas a las funciones internas mysqlnd pueden
    también ser interceptadas o reemplazadas. No hay ninguna restricción
    sobre la manipulación de las tablas de funciones internas mysqlnd.
    Es posible definir acciones para que cuando
    ciertas funciones mysqlnd sean llamadas
    por la extensión que utiliza mysqlnd, la llamada
    sea redirigida hacia la función apropiada del plugin
    mysqlnd. La posibilidad de manipular las tablas
    de funciones internas mysqlnd de este modo permite
    un máximo de flexibilidad.

    El plugin Mysqlnd es, en realidad, una extensión PHP,
    escrita en C, que utiliza la API del plugin mysqlnd
    (que está compilada en el controlador nativo MySQL, mysqlnd).
    El plugin puede ser 100% transparente para las aplicaciones PHP. No se requiere
    ninguna modificación a las aplicaciones ya que el plugin opera
    en una capa diferente. El plugin mysqlnd
    puede ser utilizado en una capa por debajo de mysqlnd.

    La lista siguiente representa algunas aplicaciones posibles
    del plugin mysqlnd.
    - El equilibrio de carga.

        <li class="listitem">
         
          Separación de lecturas y escrituras. Un ejemplo de esta funcionalidad
          es la extensión PECL/mysqlnd_ms (Maestro/esclavo). Esta extensión separa
          las consultas de lectura y escritura para una configuración de replicación.

        - Conmutación por error

        - Round-Robin, el menos cargado

    </li>
    - 
     
      Supervisión


      <li class="listitem">
       
        Registro de consultas

    - Análisis de consultas

    - Auditoría de consultas. Un ejemplo de esto es la extensión
      PECL/mysqlnd_sip (Protección contra Inyección SQL). Esta extensión
      inspecciona las consultas y ejecuta únicamente aquellas que son
      permitidas siguiendo conjuntos de reglas.

    </li>
    - 
     
      Rendimiento


      <li class="listitem">
       
        La caché. Un ejemplo de esto es la extensión
        PECL/mysqlnd_qc (Query Cache).

    - Limitación

    - Fragmentación. Un ejemplo de esto es la extensión
      PECL/mysqlnd_mc (Multi Connect). Esta extensión intenta
      separar una consulta SELECT en n partes, utilizando
      consultas del tipo SELECT ... LIMIT part_1, SELECT LIMIT part_n.
      La extensión envía las consultas a servidores MySQL distintos
      y luego fusiona el resultado hacia el cliente.

    </li>

    **Plugins del controlador nativo MySQL disponibles**

    Ya hay varios plugins mysqlnd disponibles.
    - **PECL/mysqlnd_mc** - Plugin Multi Conexión.

    - **PECL/mysqlnd_ms** - Plugin Maestro Esclavo.

    - **PECL/mysqlnd_qc** - Plugin de caché de consultas.

    - **PECL/mysqlnd_pscache** - Plugin de caché de gestor
      de consultas preparadas.

    - **PECL/mysqlnd_sip** - Plugin que permite la protección
      contra inyecciones SQL.

    - **PECL/mysqlnd_uh** - Plugin de gestor de usuarios.

    ## Comparación de los plugins mysqlnd con proxy MySQL

    Los plugins Mysqlnd y el proxy MySQL son
    tecnologías diferentes que utilizan diferentes enfoques.
    Ambos son herramientas válidas para resolver muchas
    tareas clásicas, como el equilibrio de carga, la supervisión,
    y la mejora de las prestaciones. Una diferencia importante es
    que el proxy MySQL funciona con todos los clientes MySQL mientras que
    los plugins mysqlnd son específicos para
    las aplicaciones PHP.

    Como una extensión PHP, un plugin mysqlnd
    debe ser instalado en el servidor de aplicaciones PHP, además del
    resto de PHP. Un proxy MySQL puede funcionar tanto en el servidor
    de aplicaciones PHP como ser instalado en una máquina dedicada para
    gestionar varios servidores de aplicaciones PHP.

    El despliegue de un proxy MySQL en un servidor de aplicaciones
    tiene 2 ventajas:
    - No hay un único punto de fallo

    - Fácil de escalar (escalado horizontal,
      escalado por el cliente)

    Un proxy MySQL (y los plugins mysqlnd) puede
    resolver problemas fácilmente, que de otro modo habrían requerido
    modificaciones a las aplicaciones existentes.

    Sin embargo, un proxy MySQL tiene algunos inconvenientes:
    - Un proxy MySQL es un nuevo componente, una nueva tecnología a
      aplicar al maestro y desplegar.

    - Un proxy MySQL requiere el conocimiento del lenguaje de script Lua.

    Un proxy MySQL puede ser personalizado utilizando los lenguajes de
    programación C y Lua. Lua es el lenguaje preferido para un proxy MySQL.
    Para la mayoría de los expertos PHP, Lua es un nuevo lenguaje a aprender.
    Un plugin mysqlnd puede ser escrito en C. También
    es posible escribir un plugin en PHP utilizando
    [» PECL/mysqlnd_uh](https://pecl.php.net/package/mysqlnd_uh).

    Un proxy MySQL funciona como un demonio - un proceso en segundo plano.
    Un proxy MySQL puede recordar decisiones tomadas anteriormente,
    ya que todos los estados pueden ser conservados. Sin embargo, un plugin
    mysqlnd está ligado al ciclo de vida de una consulta PHP.
    Un proxy MySQL puede compartir también resultados calculados una sola vez
    entre varios servidores de aplicaciones. Un plugin mysqlnd
    puede necesitar almacenar datos en un medio persistente.
    Otro demonio puede ser utilizado con este propósito, como por ejemplo,
    Memcache. Este mecanismo da una ventaja al proxy MySQL.

    Un proxy MySQL funciona por encima de la capa física. Con un
    proxy MySQL, debe analizar y realizar ingeniería inversa
    del protocolo cliente-servidor MySQL. Las acciones están limitadas a las
    que pueden ser realizadas mediante la manipulación del protocolo
    de comunicación. Si la capa física cambia (lo que ocurre muy raramente),
    los scripts del proxy MySQL pueden necesitar ser adaptados.

    Los plugins Mysqlnd funcionan por encima de la API C,
    reflejando así las APIs cliente libmysqlclient.
    Esta API C es esencialmente una envoltura del protocolo Servidor Cliente MySQL,
    o de la capa física, ya que es llamada algunas veces. Puede
    interceptar todas las llamadas a la API C. PHP utiliza la API C, sin embargo,
    puede conectar todas las llamadas PHP, sin necesidad de programar
    a nivel de la capa física.

    Mysqlnd implementa la capa física. Los plugins
    pueden analizar, realizar ingeniería inversa, manipular
    y siempre reemplazar el protocolo de comunicación. Sin embargo, esto no es
    generalmente necesario.

    Dado que los plugins permiten crear implementaciones que
    utilizan los 2 niveles (API C y capa física), tienen más flexibilidad
    que el proxy MySQL. Si un plugin mysqlnd es implementado
    utilizando la API C, todos los cambios posteriores a la capa
    física no requerirán modificaciones al plugin en sí.

    ## Obtener la API del plugin mysqlnd

    La API del plugin mysqlnd es simplemente una parte
    de la extensión del controlador PHP Nativo MySQL, ext/mysqlnd.
    El desarrollo de la API del plugin mysqlnd comenzó
    en Diciembre de 2009. Se desarrolla como parte del repositorio fuente de PHP,
    y por lo tanto, está disponible desde el repositorio público Git, o desde
    la descarga de las fuentes.

    Los desarrolladores de plugins pueden determinar la versión de
    mysqlnd a través de la variable
    MYSQLND_VERSION,
    en el formato mysqlnd 8.3.17,
    o a través de MYSQLND_VERSION_ID, que es un entero
    como por ejemplo 50007. Los desarrolladores pueden calcular el número
    de versión de la siguiente manera:

     <caption>**Tabla de cálculo de MYSQLND_VERSION_ID**</caption>
     
      
       
        Versión (parte)
        Ejemplo


        Mayor*10000
        5*10000 = 50000



        Menor*100
        0*100 = 0



        Parche
        7 = 7



        MYSQLND_VERSION_ID
        50007

    Durante el desarrollo, los desarrolladores deben referirse
    al número de versión mysqlnd para pruebas
    de compatibilidad y de versión, sabiendo que varias
    versiones de mysqlnd pueden ocurrir durante
    un ciclo de vida de la rama de desarrollo de PHP.

    ## Arquitectura del plugin del controlador nativo

    Esta sección proporciona una visión general de la arquitectura del plugin
    mysqlnd.

    **Visión general del controlador nativo MySQL**

    Antes de desarrollar plugins mysqlnd,
    es útil tener un conocimiento mínimo sobre la organización
    de mysqlnd. Mysqlnd está compuesto
    por los siguientes módulos:

     <caption>**Esquema de la organización mysqlnd, por módulo**</caption>
     
      
       
        Módulos de estadísticas
        mysqlnd_statistics.c


        Conexión
        mysqlnd.c



        Juego de resultados
        mysqlnd_result.c



        Datos méta del juego de resultados
        mysqlnd_result_meta.c



        Consulta
        mysqlnd_ps.c



        Red
        mysqlnd_net.c



        Capa física
        mysqlnd_wireprotocol.c

    **Objeto C orientado a paradigma**

    A nivel de código, mysqlnd utiliza una máscara C
    para implementar la orientación al objeto.

    En C, se utiliza una estructura (struct)
    para representar un objeto. Los miembros de esta estructura
    representan las propiedades del objeto. Los miembros de la
    estructura que apuntan hacia funciones representan los métodos.

    A diferencia de otros lenguajes como C++ o Java, no hay
    reglas fijas sobre la herencia en los objetos C orientados a paradigma.
    Sin embargo, hay algunas convenciones que deben seguirse
    que serán abordadas posteriormente.

    **El ciclo de vida PHP**

    El ciclo de vida de PHP consta de 2 ciclos básicos:
    - El ciclo de inicio y parada del motor PHP

    - El ciclo de una petición

    Cuando el motor PHP se inicia, llama a la función de inicialización
    del módulo (MINIT) de cada extensión registrada. Esto
    permite a cada módulo definir las variables y asignar los
    recursos que deben existir durante la vida del proceso
    correspondiente al motor PHP. Cuando el motor PHP se detiene,
    llama a la función de parada del módulo (MSHUTDOWN) para cada extensión.

    Durante la vida del motor PHP, recibirá peticiones.
    Cada petición constituye otro ciclo de vida. Para cada
    petición, el motor PHP llamará a la función de inicialización
    de cada extensión. La extensión puede realizar todas las definiciones
    de variables así como las asignaciones de recursos necesarias para
    procesar la petición. Cuando el ciclo de la petición termina, el motor
    llama a la función de parada (RSHUTDOWN) para cada extensión,
    por lo que la extensión puede lanzar toda la limpieza necesaria.

    **Cómo funciona un plugin**

    Un plugin mysqlnd funciona interceptando las llamadas
    realizadas a mysqlnd por las extensiones que utilizan
    mysqlnd. Esto es posible obteniendo la tabla
    de función mysqlnd, guardándola, y reemplazándola por una tabla
    de función personalizada, que llama a las funciones del plugin.

    El código siguiente muestra cómo se reemplaza la tabla de función
    mysqlnd:

/_ un lugar para almacenar la tabla de función original _/
struct st_mysqlnd_conn_methods org_methods;

void minit_register_hooks(TSRMLS_D) {
/_ tabla de función activa _/
struct st_mysqlnd_conn_methods \* current_methods
= mysqlnd_conn_get_methods();

/_ guardar la tabla de función original _/
memcpy(&amp;org_methods, current_methods,
sizeof(struct st_mysqlnd_conn_methods));

/_ instalación de las nuevas métodos _/
current_methods-&gt;query = MYSQLND_METHOD(my_conn_class, query);
}

Las manipulaciones de la tabla de función de conexión deben
realizarse durante la inicialización del módulo (MINIT).
La tabla de función es un recurso global compartido. En
un entorno multihilo, con una compilación TSRM, la
manipulación de un recurso global compartido durante un proceso
de petición generalmente resultará en conflictos.

**Nota**:

    No utilice ninguna lógica de tamaño fijo al manipular
    la tabla de función mysqlnd: las nuevas
    funciones pueden ser añadidas al final de la tabla de función.
    La tabla de función puede ser modificada en cualquier momento después.

**Llamada a métodos padres**

Si la tabla de función original se guarda, siempre
es posible llamar a las entradas de la tabla de función original -
los métodos padres.

En este caso, al igual que Connection::stmt_init(),
es vital llamar al método padre antes de cualquier otra actividad
en el método derivado.

MYSQLND_METHOD(my_conn_class, query)(MYSQLND *conn,
const char *query, unsigned int query_len TSRMLS_DC) {

php_printf("my_conn_class::query(query = %s)\n", query);

query = "SELECT 'query rewritten' FROM DUAL";
query_len = strlen(query);

return org_methods.query(conn, query, query_len); /_ retorno con llamada al padre _/
}

**Extender propiedades**

Un objeto mysqlnd está representado por una estructura C.
No es posible añadir un miembro a una estructura C en tiempo de ejecución.
Los usuarios de objetos mysqlnd
no pueden simplemente añadir propiedades a los objetos.

Datos arbitrarios (propiedades) pueden ser añadidos a los objetos
mysqlnd utilizando una función apropiada de la
familia mysqlnd*plugin_get_plugin*&lt;object&gt;\_data().
Durante la asignación de un objeto, mysqlnd reserva
un espacio al final del objeto para alojar un puntero
void _ hacia datos arbitrarios.
mysqlnd reserva un espacio para un puntero
void _ por plugin.

La tabla siguiente muestra cómo calcular la posición de un puntero
para un plugin específico:

   <caption>**Cálculo de punteros para mysqlnd**</caption>
   
    
     
      Dirección de memoria
      Contenido


      0
      Inicio de la estructura C del objeto mysqlnd



      n
      Fin de la estructura C del objeto mysqlnd



      n + (m x sizeof(void*))
      void* hacia los datos del objeto del plugin m-ésimo


Si planea hacer subclases de los constructores
de los objetos mysqlnd, lo cual está permitido,
debe tener esto en cuenta.

El código siguiente muestra cómo se extienden propiedades:

/_ todos los datos que queremos asociar _/
typedef struct my_conn_properties {
unsigned long query_counter;
} MY_CONN_PROPERTIES;

/_ id del plugin _/
unsigned int my_plugin_id;

void minit_register_hooks(TSRMLS_D) {
/_ obtenemos un ID único para el plugin _/
my_plugin_id = mysqlnd_plugin_register();
/_ snip - ver la extensión de la conexión: métodos _/
}

static MY_CONN_PROPERTIES** get_conn_properties(const MYSQLND \*conn TSRMLS_DC) {
MY_CONN_PROPERTIES** props;
props = (MY_CONN_PROPERTIES\**)mysqlnd_plugin_get_plugin_connection_data(
conn, my_plugin_id);
if (!props || !(*props)) {
*props = mnd_pecalloc(1, sizeof(MY_CONN_PROPERTIES), conn-&gt;persistent);
(*props)-&gt;query_counter = 0;
}
return props;
}

El desarrollador del plugin es responsable de la gestión de la memoria
asociada a los datos del plugin.

Se recomienda el uso del asignador de memoria mysqlnd
para los datos del plugin. Estas funciones son nombradas
utilizando la siguiente convención: mnd\_\*loc().
El asignador mysqlnd tiene algunas características muy útiles,
como la posibilidad de utilizar un asignador de depuración en una compilación
no depurada.

   <caption>**Cuándo y cómo hacer una subclase**</caption>
   
    
     
       
      ¿Cuándo hacer una subclase?
      ¿Cada instancia tiene su propia tabla de funciones privada?
      ¿Cómo hacer una subclase?


      Conexión (MYSQLND)
      MINIT
      No
      mysqlnd_conn_get_methods()



      Juego de resultados (MYSQLND_RES)
      MINIT o después
      Sí
      mysqlnd_result_get_methods() o método del objeto de manipulación de la tabla de funciones



      Meta del juego de resultados (MYSQLND_RES_METADATA)
      MINIT
      No
      mysqlnd_result_metadata_get_methods()



      Consulta (MYSQLND_STMT)
      MINIT
      No
      mysqlnd_stmt_get_methods()



      Red (MYSQLND_NET)
      MINIT o después
      Sí
      mysqlnd_net_get_methods() o método del objeto de manipulación de la tabla de funciones



      Capa física (MYSQLND_PROTOCOL)
      MINIT o después
      Sí
      mysqlnd_protocol_get_methods() o método del objeto de manipulación de la tabla de funciones


No debe manipular las tablas de funciones después de MINIT si
no está permitido según la tabla anterior.

Algunas clases contienen un puntero hacia un método de la tabla
de funciones. Todas las instancias de una clase de este tipo compartirán
la misma tabla de funciones. Para evitar el caos, en particular
en entornos multihilo, este tipo de tablas de funciones solo debe ser
manipulado durante el MINIT.

Las otras clases utilizan una copia de la tabla de funciones
global compartida. Esta copia se crea al mismo tiempo que el objeto.
Cada objeto utiliza su propia tabla de funciones. Esto le da
2 opciones: puede manipular la tabla de funciones por defecto
de un objeto durante el MINIT, y también puede afinar métodos de un objeto
sin afectar a las otras instancias de la misma clase.

La ventaja del enfoque con una tabla de funciones compartida es
el rendimiento. No es necesario copiar una tabla de funciones
para cada objeto.

   <caption>**Estado del constructor**</caption>
   
    
     
      Tipo
      Asignación, construcción, reinicialización
      ¿Puede ser modificado?
      Llamante


      Conexión (MYSQLND)
      mysqlnd_init()
      No
      mysqlnd_connect()



      Juego de resultados (MYSQLND_RES)

       Asignación:




        -

          Connection::result_init()







        Reinicio y reinicialización durante:




        -

          Result::use_result()





        -

          Result::store_result






      Sí, pero llamada al padre.

       -

         Connection::list_fields()





       -

         Statement::get_result()





       -

         Statement::prepare() (Meta-datos únicamente)





       -

         Statement::resultMetaData()









      Meta del juego de resultados (MYSQLND_RES_METADATA)
      Connection::result_meta_init()
      Sí, pero llamada al padre.
      Result::read_result_metadata()



      Consulta (MYSQLND_STMT)
      Connection::stmt_init()
      Sí, pero llamada al padre.
      Connection::stmt_init()



      Red (MYSQLND_NET)
      mysqlnd_net_init()
      No
      Connection::init()



      Capa física (MYSQLND_PROTOCOL)
      mysqlnd_protocol_init()
      No
      Connection::init()


Se recomienda encarecidamente no reemplazar completamente un constructor.
Los constructores realizan asignaciones de memoria. Las asignaciones
de memoria son vitales para la API del plugin mysqlnd
así como para la lógica del objeto mysqlnd. Si
no se preocupa por las advertencias e insiste en
reemplazar los constructores, debería al menos llamar
al constructor padre antes de hacer cualquier cosa en su
constructor.

A nivel de todas las advertencias, puede ser útil hacer subclases de los
constructores. Los constructores son los lugares perfectos para modificar
las tablas de funciones de los objetos con tablas de objetos no compartidas,
como los juegos de resultados, la red o la capa física.

   <caption>**Estado del destructor**</caption>
   
    
     
      Tipo
      ¿El método derivado debe llamar al padre?
      Destructor


      Conexión
      Sí, después de la ejecución del método
      free_contents(), end_psession()



      Juego de resultados
      Sí, después de la ejecución del método
      free_result()



      Meta del juego de resultados
      Sí, después de la ejecución del método
      free()



      Consulta
      Sí, después de la ejecución del método
      dtor(), free_stmt_content()



      Red
      Sí, después de la ejecución del método
      free()



      Capa física
      Sí, después de la ejecución del método
      free()


Los destructores son los lugares perfectos para liberar propiedades,
mysqlnd*plugin_get_plugin*&lt;object&gt;\_data().

Los destructores listados pueden no ser los equivalentes a
los métodos actuales mysqlnd que liberan el objeto mismo.
Sin embargo, son los mejores lugares para liberar
los datos de su plugin. Al igual que los constructores, puede reemplazar
métodos completos pero no se recomienda. Si varios métodos están listados
en la tabla anterior, debe modificar todos los métodos listados y liberar
los datos de su plugin en el método llamado primero por mysqlnd.

El método recomendado para los plugins es simplemente modificar los métodos,
liberar su memoria y llamar a la implementación del padre inmediatamente después.

## La API del plugin mysqlnd

A continuación se presenta la lista de funciones proporcionadas en la API plugin
mysqlnd:

- mysqlnd_plugin_register()

- mysqlnd_plugin_count()

- mysqlnd_plugin_get_plugin_connection_data()

- mysqlnd_plugin_get_plugin_result_data()

- mysqlnd_plugin_get_plugin_stmt_data()

- mysqlnd_plugin_get_plugin_net_data()

- mysqlnd_plugin_get_plugin_protocol_data()

- mysqlnd_conn_get_methods()

- mysqlnd_result_get_methods()

- mysqlnd_result_meta_get_methods()

- mysqlnd_stmt_get_methods()

- mysqlnd_net_get_methods()

- mysqlnd_protocol_get_methods()

No hay una definición formal de qué es un plugin
ni de cómo funciona un plugin.

Los componentes más frecuentemente encontrados en los mecanismos de plugin son:

- Un gestor de plugin

- Una API del plugin

- Los servicios aplicativos (o módulos)

- Las APIs de los servicios aplicativos (o APIs del módulo)

El concepto de un plugin mysqlnd utiliza estas características,
así como otras joyas de arquitectura abierta.

**Sin restricciones**

Un plugin tiene acceso total a los trabajos internos de
mysqlnd. No hay límites de seguridad
ni restricciones. Todo puede ser sobrescrito para implementar
algoritmos útiles o hostiles. Se recomienda desplegar
solo plugins desde fuentes de confianza.

Tal como se ha discutido anteriormente, los plugins pueden utilizar libremente
punteros. Estos punteros no están restringidos de ninguna manera,
por lo que puede apuntar hacia los datos de otro plugin.
Una simple posición aritmética puede ser utilizada para leer
los datos de otro plugin.

Se recomienda escribir plugins cooperativos, y por lo tanto, siempre llamar
al método padre. Los plugins deben cooperar siempre con
mysqlnd.

   <caption>**Problemas: un ejemplo de encadenamiento y cooperación**</caption>
   
    
     
      Extensión
      Puntero mysqlnd.query()
      Pila de llamadas si se llama al padre


      ext/mysqlnd
      mysqlnd.query()
      mysqlnd.query



      ext/mysqlnd_cache
      mysqlnd_cache.query()

       -

         mysqlnd_cache.query()





       -

         mysqlnd.query









      ext/mysqlnd_monitor
      mysqlnd_monitor.query()

       -

         mysqlnd_monitor.query()





       -

         mysqlnd_cache.query()





       -

         mysqlnd.query








En este escenario, un plugin de caché (ext/mysqlnd_cache) y
un plugin de supervisión (ext/mysqlnd_monitor)
están cargados. Ambos tienen una subclase de Connection::query().
El registro del plugin ocurre durante el MINIT
utilizando la lógica mencionada anteriormente. PHP llama a las extensiones
en un orden alfabético por defecto. Los plugins no están al tanto
unos de otros y no pueden fijar dependencias.

Por defecto, los plugins llaman a la implementación del padre de la
función de consulta en su versión de la función derivada.

**Resumen de la extensión PHP**

A continuación se presenta un resumen de lo que ocurre al utilizar
un plugin de ejemplo, ext/mysqlnd_plugin,
que expone la API C del plugin mysqlnd a PHP:

- Todas las aplicaciones PHP MySQL intentan establecer una conexión
  a la dirección 192.168.2.29

- La aplicación PHP utilizará ext/mysql,
  ext/mysqli o PDO_MYSQL.
  Estas 3 extensiones PHP MySQL utilizan mysqlnd para
  establecer la conexión a la dirección 192.168.2.29.

- Mysqlnd llama a su método de conexión, que ha sido subclaseado
  por ext/mysqlnd_plugin.

- ext/mysqlnd_plugin llama al método del espacio de usuario
  proxy::connect() registrado por el usuario.

- El espacio de usuario modifica el host de conexión de 192.168.2.29
  a 127.0.0.1 y devuelve la conexión establecida por
  parent::connect().

- ext/mysqlnd_plugin ejecuta el equivalente de
  parent::connect(127.0.0.1) llamando al método
  original de mysqlnd para establecer una conexión.

- ext/mysqlnd establece una conexión y devuelve el control
  a ext/mysqlnd_plugin.
  ext/mysqlnd_plugin también devuelve.

- Cualquier extensión PHP MySQL utilizada por la aplicación,
  recibe una conexión a 127.0.0.1. La extensión PHP MySQL
  devuelve el control a la aplicación PHP. El ciclo está cerrado.

## Cómo comenzar a compilar un plugin mysqlnd

Es importante recordar que un plugin mysqlnd
es en sí mismo una extensión PHP.

El código siguiente muestra la estructura básica de una función MINIT
utilizada en un plugin típico mysqlnd:

/_ my_php_mysqlnd_plugin.c _/

static PHP_MINIT_FUNCTION(mysqlnd_plugin) {
/_ globales, entradas ini, recursos, clases _/

/_ registro del plugin mysqlnd _/
mysqlnd_plugin_id = mysqlnd_plugin_register();

conn_m = mysqlnd_get_conn_methods();
memcpy(org_conn_m, conn_m,
sizeof(struct st_mysqlnd_conn_methods));

conn_m-&gt;query = MYSQLND_METHOD(mysqlnd_plugin_conn, query);
conn_m-&gt;connect = MYSQLND_METHOD(mysqlnd_plugin_conn, connect);
}

/_ my_mysqlnd_plugin.c _/

enum_func_status MYSQLND_METHOD(mysqlnd_plugin_conn, query)(/_ ... _/) {
/_ ... _/
}
enum_func_status MYSQLND_METHOD(mysqlnd_plugin_conn, connect)(/_ ... _/) {
/_ ... _/
}

**Tarea de análisis: desde C hacia el espacio de usuario**

class proxy extends mysqlnd_plugin_connection {
public function connect($host, ...) { .. }
}
mysqlnd_plugin_set_conn_proxy(new proxy());

Proceso:

- PHP: el usuario registra una función de devolución de llamada para el plugin

- PHP: el usuario llama a un método de la API PHP MySQL para conectarse a MySQL

- C: ext/_mysql_ llama al método mysqlnd

- C: mysqlnd termina en ext/mysqlnd_plugin

- C: ext/mysqlnd_plugin

<ol type="1">
      <li class="listitem">
       
        Llamada a la función de devolución de llamada del espacio de usuario


      -

        O la función original mysqlnd, si el espacio
        de usuario no ha definido una función de devolución de llamada







   </li>
  </ol>
  
   Debe realizar las siguientes operaciones:


- Escribir una clase "mysqlnd_plugin_connection" en C

- Aceptar y registrar el objeto proxy a través de
  "mysqlnd_plugin_set_conn_proxy()"

- Llamar a los métodos de proxy del espacio de usuario
  desde C (optimización - zend_interfaces.h)

Los métodos del objeto del espacio de usuario pueden ser llamados
utilizando call_user_function(),
o puede operar a un nivel por debajo del motor Zend y
utilizar zend_call_method().

**Optimización: llamada a métodos desde C utilizando
zend_call_method**

El código siguiente muestra un prototipo para la función
zend_call_method, obtenido de
zend_interfaces.h.

ZEND_API zval* zend_call_method(
zval \*\*object_pp, zend_class_entry *obj_ce,
zend_function **fn_proxy, char \*function_name,
int function_name_len, zval **retval_ptr_ptr,
int param_count, zval* arg1, zval* arg2 TSRMLS_DC
);

La API Zend soporta 2 argumentos. Puede necesitar más, por ejemplo:

enum_func_status (*func_mysqlnd_conn\_\_connect)(
MYSQLND *conn, const char _host,
const char _ user, const char _ passwd,
unsigned int passwd_len, const char _ db,
unsigned int db_len, unsigned int port,
const char \* socket, unsigned int mysql_flags TSRMLS_DC
);

Para solucionar este problema, deberá hacer una copia
de zend_call_method() y añadir funcionalidad para añadir parámetros.
Puede lograr esto creando un conjunto de macros
MY_ZEND_CALL_METHOD_WRAPPER.

**Llamada al espacio de usuario PHP**

El código siguiente muestra el método optimizado para realizar
una llamada a una función del espacio de usuario desde C:

/_ my_mysqlnd_plugin.c _/

MYSQLND_METHOD(my_conn_class,connect)(
MYSQLND *conn, const char *host /_ ... _/ TSRMLS_DC) {
enum_func_status ret = FAIL;
zval _ global_user_conn_proxy = fetch_userspace_proxy();
if (global_user_conn_proxy) {
/_ llamada al proxy del espacio de usuario _/
ret = MY_ZEND_CALL_METHOD_WRAPPER(global_user_conn_proxy, host, /_..._/);
} else {
/_ o el método original mysqlnd = no hacer nada, ser transparente \*/
ret = org_methods.connect(conn, host, user, passwd,
passwd_len, db, db_len, port,
socket, mysql_flags TSRMLS_CC);
}
return ret;
}

**Llamada al espacio de usuario: argumentos simples**

/_ my_mysqlnd_plugin.c _/

MYSQLND_METHOD(my_conn_class,connect)(
/_ ... _/, const char _host, /_ ..._/) {
/_ ... _/
if (global_user_conn_proxy) {
/_ ... _/
zval_ zv_host;
MAKE_STD_ZVAL(zv_host);
ZVAL_STRING(zv_host, host, 1);
MY_ZEND_CALL_METHOD_WRAPPER(global_user_conn_proxy, zv_retval, zv_host /_, ..._/);
zval_ptr_dtor(&amp;zv_host);
/_ ... _/
}
/_ ... _/
}

**Llamada al espacio de usuario: estructuras como argumentos**

/_ my_mysqlnd_plugin.c _/

MYSQLND_METHOD(my_conn_class, connect)(
MYSQLND _conn, /_ ..._/) {
/_ ... _/
if (global_user_conn_proxy) {
/_ ... _/
zval_ zv_conn;
ZEND_REGISTER_RESOURCE(zv_conn, (void _)conn, le_mysqlnd_plugin_conn);
MY_ZEND_CALL_METHOD_WRAPPER(global_user_conn_proxy, zv_retval, zv_conn, zv_host /_, ..._/);
zval_ptr_dtor(&amp;zv_conn);
/_ ... _/
}
/_ ... \*/
}

El primer argumento de todas las funciones mysqlnd
es un objeto C. Por ejemplo, el primer argumento de la función
connect() es un puntero hacia MYSQLND.
La estructura MYSQLND representa un objeto de conexión
mysqlnd.

El puntero del objeto de conexión mysqlnd
puede ser comparado a un puntero de archivo estándar I/O.
Al igual que un puntero de archivo estándar I/O, un objeto de
conexión mysqlnd debe ser vinculado al espacio
de usuario utilizando una variable PHP de tipo recurso.

**Desde C hacia el espacio de usuario, y luego de vuelta**

class proxy extends mysqlnd_plugin_connection {
public function connect($conn, $host, ...) {
    /* "pre" hook */
    printf("Conexión al host = '%s'\n", $host);
    debug_print_backtrace();
    return parent::connect($conn);
}

public function query($conn, $query) {
    /* "post" hook */
    $ret = parent::query($conn, $query);
printf("Consulta = '%s'\n", $query);
return $ret;
}
}
mysqlnd_plugin_set_conn_proxy(new proxy());

Los usuarios PHP deben poder llamar a la implementación
del padre de un método sobrescrito.

Como resultado de una subclase, es posible
redefinir únicamente los métodos seleccionados, y puede elegir tener
acciones "pre" o "post".

**Construcción de una clase: mysqlnd_plugin_connection::connect()**

/_ my_mysqlnd_plugin_classes.c _/

PHP_METHOD("mysqlnd_plugin_connection", connect) {
/_ ... simplificado! ... _/
zval* mysqlnd_rsrc;
MYSQLND* conn;
char* host; int host_len;
if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "rs",
&amp;mysqlnd_rsrc, &amp;host, &amp;host_len) == FAILURE) {
RETURN_NULL();
}
ZEND_FETCH_RESOURCE(conn, MYSQLND* conn, &amp;mysqlnd_rsrc, -1,
"Mysqlnd Connection", le_mysqlnd_plugin_conn);
if (PASS == org_methods.connect(conn, host, /_ simplificado! _/ TSRMLS_CC))
RETVAL_TRUE;
else
RETVAL_FALSE;
}

- [Introducción](#intro.mysqlnd)
- [Introducción](#mysqlnd.overview)
- [Instalación](#mysqlnd.install)
- [Configuración en tiempo de ejecución](#mysqlnd.config)
- [Incompatibilidades](#mysqlnd.incompatibilities)
- [Conexiones persistentes](#mysqlnd.persist)
- [Estadísticas](#mysqlnd.stats)
- [Notas](#mysqlnd.notes)
- [Gestión de la memoria](#mysqlnd.memory)
- [API del plugin del controlador nativo MySQL](#mysqlnd.plugin)<li>[Comparación de los plugins mysqlnd con proxy MySQL](#mysqlnd.plugin.mysql-proxy)
- [Obtener la API del plugin mysqlnd](#mysqlnd.plugin.obtaining)
- [Arquitectura del plugin del controlador nativo](#mysqlnd.plugin.architecture)
- [La API del plugin mysqlnd](#mysqlnd.plugin.api)
- [Cómo comenzar a compilar un plugin mysqlnd](#mysqlnd.plugin.developing)
  </li>
