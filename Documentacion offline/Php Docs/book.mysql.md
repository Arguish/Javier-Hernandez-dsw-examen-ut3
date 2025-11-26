# API MySQL original

# Introducción

Esta extensión está obsoleta desde PHP 5.5.0 y ha sido eliminada
desde PHP 7.0.0. En su lugar, se debe utilizar la extensión
[mysqli](#book.mysqli) o
[PDO_MySQL](#ref.pdo-mysql). Consulte también la [visión general de la API MySQL](#mysqlinfo.api.choosing) para obtener más ayuda en la elección de una API MySQL.

Estas funciones permiten acceder a las bases de datos
MySQL. El sitio oficial de esta base de datos es
[» http://www.mysql.com/](http://www.mysql.com/).

La documentación de MySQL está disponible en
[» http://dev.mysql.com/doc/](http://dev.mysql.com/doc/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mysql.requirements)
- [Instalación](#mysql.installation)
- [Configuración en tiempo de ejecución](#mysql.configuration)
- [Tipos de recursos](#mysql.resources)

    ## Requerimientos

    Para poder utilizarlos, es necesario compilar PHP con el soporte MySQL.

    **Advertencia**
    Esta extensión
    estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
    utilizar la extensión [MySQLi](#book.mysqli) o la extensión
    [PDO_MySQL](#ref.pdo-mysql). Ver también
    [MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
    Alternativas a esta función:

## Instalación

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

Para compilar, simplemente se debe utilizar la opción de configuración
**--with-mysql[=DIR]**
donde el parámetro opcional [DIR] apunta hacia
el directorio de instalación de MySQL.

Aunque esta extensión MySQL sea compatible con MySQL 4.1.0 y superior,
no soporta las funcionalidades adicionales que esta versión proporciona.
Para ello, se recomienda utilizar la extensión [MySQLi](#book.mysqli).

Si se desea instalar la extensión mysqli al mismo tiempo que la extensión
mysql, se debe utilizar la misma biblioteca cliente para evitar conflictos.

## Instalación en sistemas Linux

Nota: [DIR] es la ruta hacia la biblioteca cliente
MySQL (_encabezados y bibliotecas_), que puede ser
descargada desde el sitio de [» MySQL](http://www.mysql.com/).

   <caption>**Matriz de soporte de ext/mysql**</caption>
   
    
     
      PHP Versión
      Por defecto
      Opciones de configuración: [mysqlnd](#mysqlnd.overview)
      Opciones de configuración: libmysqlclient
      Historial de cambios


      4.x.x
      libmysqlclient
      No Disponible
      **--without-mysql** para desactivar
      MySQL está activo por omisión, las bibliotecas cliente MySQL están incluidas internamente



      5.0.x, 5.1.x, 5.2.x
      libmysqlclient
      No Disponible
      **--with-mysql=[DIR]**

       MySQL no está activo por omisión, y las bibliotecas cliente MySQL
       ya no están incluidas internamente




      5.3.x
      libmysqlclient
      **--with-mysql=mysqlnd**
      **--with-mysql=[DIR]**
      mysqlnd está ahora disponible



      5.4.x
      mysqlnd
      **--with-mysql**
      **--with-mysql=[DIR]**
      mysqlnd está ahora incluido por omisión


## Instalación en sistemas Windows

## PHP 5.0.x, 5.1.x, 5.2.x

    MySQL ya no está activado por omisión, por lo tanto, la biblioteca
    php_mysql.dll debe ser activada en el php.ini.
    Además, PHP debe tener acceso a la biblioteca cliente MySQL.
    Un fichero llamado libmysql.dll está incluido en
    la distribución de PHP para Windows y para que PHP pueda comunicarse
    con MySQL, este fichero debe estar disponible en el PATH
    del sistema Windows. Lea la FAQ titulada
    "[¿Dónde debo añadir mi directorio PHP a la variable
    PATH en Windows?](#faq.installation.addtopath)" para más información sobre
    cómo realizar esto. No obstante, copiar el fichero
    libmysql.dll en el directorio sistema de Windows funciona
    (ya que el directorio sistema está por omisión en el PATH del sistema),
    pero esto no es recomendado en absoluto.




    Para activar cualquier extensión PHP (como
    php_mysql.dll), la directiva PHP
    [extension_dir](#ini.extension-dir) debe estar definida
    y debe apuntar hacia el directorio donde están almacenadas las extensiones PHP.
    Lea también el
    [manual de instalación en Windows](#install.windows.manual).
    Por ejemplo, aquí hay un valor posible para la directiva
    extension_dir en PHP 5:
    c:\php\ext

**Nota**:

     Si al iniciar el servidor web aparece un error similar a este:
     "Unable to load dynamic library './php_mysql.dll'",
     es porque php_mysql.dll y/o
     libmysql.dll no pudieron ser encontrados por el sistema.

## PHP 5.3.0+

    El [driver MySQL nativo](#mysqlnd.overview) está activado por omisión.
    Incluya php_mysql.dll, pero libmysql.dll
    ya no es necesario, ni utilizado.

## Notas sobre la instalación de MySQL

**Advertencia**

    Pueden encontrarse fallos y problemas de inicio de PHP cuando
    se carga esta función al mismo tiempo que la extensión recode. Consulte la extensión
    [recode](#ref.recode) para más detalles.

**Nota**:

    Si se necesitan otros juegos de caracteres que el predeterminado
    (*latino*), se debe instalar la biblioteca externa
    libmysqlclient (no proporcionada), compilada con este juego de caracteres.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración MySQL**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [mysql.allow_local_infile](#ini.mysql.allow-local-infile)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysql.allow_persistent](#ini.mysql.allow-persistent)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysql.max_persistent](#ini.mysql.max-persistent)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysql.max_links](#ini.mysql.max-links)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysql.trace_mode](#ini.mysql.trace-mode)
      "Off"
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.default_port](#ini.mysql.default-port)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.default_socket](#ini.mysql.default-socket)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.default_host](#ini.mysql.default-host)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.default_user](#ini.mysql.default-user)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.default_password](#ini.mysql.default-password)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysql.connect_timeout](#ini.mysql.connect-timeout)
      "60"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    mysql.allow_local_infile
    [int](#language.types.integer)



     Permite el acceso, desde el punto de vista de PHP, a los ficheros locales,
     con las consultas LOAD DATA.








    mysql.allow_persistent
    [bool](#language.types.boolean)



     Activa o desactiva las
     [conexiones persistentes](#features.persistent-connections)
     a la base de datos MySQL.








    mysql.max_persistent
    [int](#language.types.integer)



     El número máximo de conexiones persistentes a las bases de datos
     MySQL, por proceso.








    mysql.max_links
    [int](#language.types.integer)



     El número máximo de conexiones a las bases de datos MySQL,
     incluyendo las conexiones persistentes, por proceso.








    mysql.trace_mode
    [bool](#language.types.boolean)



     Modo de seguimiento. Cuando mysql.trace_mode está activado,
     se mostrarán alertas para escaneos de tabla o de índice, para olvidos de liberación
     de recursos o errores SQL. Esta opción fue introducida en PHP 4.3.0.








    mysql.default_port
    [string](#language.types.string)



     El número de puerto TCP por defecto, utilizado para conectarse
     a la base de datos, cuando no se especifica ningún puerto. Si no se
     especifica ningún puerto por defecto, el puerto se obtendrá entonces
     leyendo la variable de entorno MYSQL_TCP_PORT,
     la entrada mysql-tcp en el fichero
     /etc/services o la constante
     de compilación **[MYSQL_PORT](#constant.mysql-port)**, en este orden. Windows
     utilizará también solo la constante **[MYSQL_PORT](#constant.mysql-port)**.








    mysql.default_socket
    [string](#language.types.string)



     El nombre por defecto del socket cuando se conecta
     al servidor local, si no se especifica ningún otro socket.








    mysql.default_host
    [string](#language.types.string)



     Dirección por defecto del servidor, a utilizar al conectarse a
     un servidor MySQL, si no se especifica ningún host.
     No se aplica cuando el [safe mode SQL](#ini.sql.safe-mode) está activado.








    mysql.default_user
    [string](#language.types.string)



     Usuario por defecto, a utilizar al conectarse a un servidor
     MySQL, si no se especifica ningún usuario.
     No se aplica cuando el [safe mode SQL](#ini.sql.safe-mode) está activado.








    mysql.default_password
    [string](#language.types.string)



     Contraseña por defecto, a utilizar al conectarse a un servidor
     MySQL, si no se especifica ninguna contraseña.
     No se aplica cuando el [safe mode SQL](#ini.sql.safe-mode) está activado.








    mysql.connect_timeout
    [int](#language.types.integer)



     Tiempo máximo de espera de la respuesta de un servidor, en segundos.
     En Linux, este tiempo sirve también durante el intercambio del primero con
     el servidor.

## Tipos de recursos

Existen dos tipos de recursos utilizados por el módulo MySQL.
El primero es un identificador de conexión al servidor, denominado
mysql link,
y el segundo es un identificador de resultado de consulta, denominado
mysql result.

# Registro de cambios

A las clases/funciones/métodos de esta extensión se han realizado los siguientes cambios.

### Histórico de cambios general para la extensión ext/mysql

Este histórico de cambios hace referencia a la extensión ext/mysql.

### Cambios globales en ext/mysql

La siguiente lista presenta los cambios en toda la extensión ext/mysql.

       Versión
       Descripción






       7.0.0


         Esta extensión ha sido eliminada de PHP. Para más detalles,
         ver [Elegir una API](#mysqlinfo.api.choosing).








### Cambios en las funciones existentes

La siguiente lista es una compilación de los cambios realizados
en las funciones de la extensión ext/mysql.

VersionFunctionDescription

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Es posible especificar opciones de cliente adicionales para las funciones
[mysql_connect()](#function.mysql-connect) y [mysql_pconnect()](#function.mysql-pconnect).
Estas constantes son las siguientes:

   <caption>**Constantes de cliente MySQL**</caption>
    
     
      
       Constante
       Descripción


       **[MYSQL_CLIENT_COMPRESS](#constant.mysql-client-compress)**
       Utiliza el protocolo con compresión



       **[MYSQL_CLIENT_IGNORE_SPACE](#constant.mysql-client-ignore-space)**
       Permite espacios después de los nombres de función



       **[MYSQL_CLIENT_INTERACTIVE](#constant.mysql-client-interactive)**
       Permite **interactive_timeout** segundos de inactividad
       en la conexión (en lugar de **wait_timeout**).



       **[MYSQL_CLIENT_SSL](#constant.mysql-client-ssl)**
       Utilización de cifrado SSL. Esta constante solo está disponible a partir
       de la versión 4.x y posteriores de la biblioteca cliente MySQL. La versión 3.23.x
       se proporciona con PHP 4 así como con los binarios para Windows de PHP 5.




La función [mysql_fetch_array()](#function.mysql-fetch-array) utiliza una constante para especificar
los diferentes tipos de formatos de respuesta. Las constantes siguientes son utilizadas:

   <caption>**Constantes de [mysql_fetch_array()](#function.mysql-fetch-array)**</caption>
   
    
     
      Constante
      Descripción


      **[MYSQL_ASSOC](#constant.mysql-assoc)**

       Las columnas son devueltas en un array cuyos índices son los nombres de columnas.




      **[MYSQL_BOTH](#constant.mysql-both)**

       Las columnas son devueltas en un array con indexación numérica y un sistema de índices
       correspondiente al nombre de las columnas.




      **[MYSQL_NUM](#constant.mysql-num)**

       Las columnas son devueltas en un array con un índice numérico. Las columnas están
       numeradas en su orden de aparición. El índice comienza en cero.



# Ejemplos

## Tabla de contenidos

- [Ejemplo con la extensión MySQL](#mysql.examples-basic)

    ## Ejemplo con la extensión MySQL

    Este ejemplo simple muestra cómo conectarse, ejecutar una
    consulta, leer la información obtenida y desconectarse de una
    base de datos MySQL.

    **Ejemplo #1 Ejemplo de presentación de la extensión MySQL**

&lt;?php
// Conexión y selección de la base de datos
$link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password')
or die('Imposible conectarse: ' . mysql_error());
echo 'Conectado correctamente';
mysql_select_db('my_database') or die('Imposible seleccionar la base de datos');

// Ejecución de consultas SQL
$query = 'SELECT * FROM my_table';
$result = mysql_query($query) or die('Fallo en la consulta: ' . mysql_error());

// Visualización de los resultados en HTML
echo "&lt;table&gt;\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "\t&lt;tr&gt;\n";
foreach ($line as $col_value) {
        echo "\t\t&lt;td&gt;$col_value&lt;/td&gt;\n";
}
echo "\t&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

// Liberación de los resultados
mysql_free_result($result);

// Cierre de la conexión
mysql_close($link);
?&gt;

# Funciones MySQL

## Notas

**Nota**:

     La mayoría de las funciones MySQL aceptan
     link_identifier como último argumento
     opcional. Si no se proporciona, se utiliza la última conexión abierta. Si no
     existe, se intenta establecer una conexión con los parámetros por omisión
     definidos en php.ini. Si las funciones no tienen éxito, devuelven **[false](#constant.false)**.

# mysql_affected_rows

(PHP 4, PHP 5)

mysql_affected_rows — Obtiene el número de filas afectadas en la anterior operación de MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_affected_rows()](#mysqli.affected-rows)

    - [PDOStatement::rowCount()](#pdostatement.rowcount)

### Descripción

**mysql_affected_rows**([resource](#language.types.resource) $link_identifier = NULL): [int](#language.types.integer)

Obtiene el número de filas afectadas por la última consulta INSERT, UPDATE, REPLACE
o DELETE asociada con link_identifier.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve el número de filas afectadas en caso de éxito, y -1 si la última consulta
falló.

Si la consulta anterior fue DELETE con ninguna cláusula WHERE, todos
los registros habrán sido borrados de la tabla, aunque ésta función
devolverá cero con una versión anterior a MySQL 4.1.2.

Al utilizar UPDATE, MySQL no actualiza las columnas donde el nuevo valor es el
mismo que el anterior. Esto crea la posibilidad de que
**mysql_affected_rows()** no pueda equivaler en realidad al número
de filas encontradas, solamente el número de filas que estuvieron literalmente afectadas por
la consulta.

La sentencia REPLACE primero borra el registro con la misma clave primaria
y luego inserta el nuevo registro. Esta función devuelve el número de
registros borrados más el número de registros insertados.

En el caso de consultas "INSERT ... ON DUPLICATE KEY UPDATE", el
valor devuelto será 1 si se realizó una inserción,
o 2 para una actualización de una fila existente.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_affected_rows()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No se pudo conectar: ' . mysql_error());
}
mysql_select_db('mibd');

/_ Esto debería devolver el número correcto de registros borrados _/
mysql_query('DELETE FROM mitabla WHERE id &lt; 10');
printf("Registros borrados: %d\n", mysql_affected_rows());

/_ con una clausula WHERE que nunca es verdad, debería devolver 0 _/
mysql_query('DELETE FROM mitabla WHERE 0');
printf("Registros borrados: %d\n", mysql_affected_rows());
?&gt;

    Resultado del ejemplo anterior es similar a:

Registros borrados: 10
Registros borrados: 0

    **Ejemplo #2 Ejemplo de mysql_affected_rows()** al utilizar transacciones

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No se pudo conectar: ' . mysql_error());
}
mysql_select_db('mibd');

/_ Actualizar registros _/
mysql_query("UPDATE mitabla SET usado=1 WHERE id &lt; 10");
printf ("Registros actualizados: %d\n", mysql_affected_rows());
mysql_query("COMMIT");
?&gt;

    Resultado del ejemplo anterior es similar a:

Registros actualizados: 10

### Notas

**Nota**:
**Transacciones**

    Si se usan transacciones, es necesario llamar a
    **mysql_affected_rows()** después de una consulta INSERT, UPDATE, o
    DELETE, no después del COMMIT.

**Nota**:
**Sentencias SELECT**

    Para conocer el número de filas devueltas por un SELECT, es posible
    usar [mysql_num_rows()](#function.mysql-num-rows).

**Nota**:
**Claves Foráneas en Cascada**

    **mysql_affected_rows()** no cuenta la filas afectadas
    implícitamente a través del uso de ON DELETE CASCADE y/o ON UPDATE CASCADE
    en las restricciones de las claves foráneas.

### Ver también

    - [mysql_num_rows()](#function.mysql-num-rows) - Obtener el número de filas de un conjunto de resultados

    - [mysql_info()](#function.mysql-info) - Obtiene información sobre la consulta más reciente

# mysql_client_encoding

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_client_encoding — Devuelve el nombre del conjunto de caracteres

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_character_set_name()](#mysqli.character-set-name)

### Descripción

**mysql_client_encoding**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)

Recupera la variable character_set de MySQL.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve el nombre del conjunto de caracteres predeterminado de la conexión actual.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_client_encoding()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$conjunto_caracteres = mysql_client_encoding($enlace);

echo "El conjunto de caracteres actual es: $conjunto_caracteres\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

El conjunto de caracteres actual es: latin1

### Ver también

    - [mysql_set_charset()](#function.mysql-set-charset) - Establece el conjunto de caracteres del cliente

    - [mysql_real_escape_string()](#function.mysql-real-escape-string) - Escapa caracteres especiales en una cadena para su uso en una sentencia SQL

# mysql_close

(PHP 4, PHP 5)

mysql_close — Cerrar una conexión de MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_close()](#mysqli.close)

    - PDO: Asignar el valor de **[null](#constant.null)** al objeto PDO

### Descripción

**mysql_close**([resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

**mysql_close()** cierra la conexión no persistente
al servidor de MySQL que está asociada con el identificador de enlace especificado. Si
link_identifier no se especifica, se usará el último
enlace abierto.

Las conexiones y los juegos de resultados abiertos de forma no persistente son automáticamente
destruidos cuando un script PHP termina su ejecución. También, el hecho de cerrar una conexión
y liberar los resultados siendo opcional, el hecho de hacerlo explícitamente es altamente
recomendado. Esto devolverá los recursos inmediatamente a PHP y a MySQL, lo que mejorará las
performance. Para más información, refiérase a la
[liberación de recursos](#language.types.resource.self-destruct)

### Parámetros

link_identifier
La conexión MySQL.
Si el identificador del enlace no se especifica, se utilizará la última conexión
abierta con la función [mysql_connect()](#function.mysql-connect).
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_close()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No se pudo conectar: ' . mysql_error());
}
echo 'Conectado con éxito';
mysql_close($enlace);
?&gt;

    El ejemplo anterior mostrará:

Conectado con éxito

### Notas

**Nota**:

    **mysql_close()** no cerrará los enlaces persistentes
    creados por [mysql_pconnect()](#function.mysql-pconnect).
    Para más detalles, véase la página del manual sobre
    [conexiones persistentes](#features.persistent-connections).

### Ver también

    - [mysql_connect()](#function.mysql-connect) - Abre una conexión al servidor MySQL

    - [mysql_free_result()](#function.mysql-free-result) - Libera la memoria del resultado

# mysql_connect

(PHP 4, PHP 5)

mysql_connect — Abre una conexión al servidor MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_connect()](#function.mysqli-connect)

    - [PDO::__construct()](#pdo.construct)

### Descripción

**mysql_connect**(
    [string](#language.types.string) $server = ini_get("mysql.default_host"),
    [string](#language.types.string) $username = ini_get("mysql.default_user"),
    [string](#language.types.string) $password = ini_get("mysql.default_password"),
    [bool](#language.types.boolean) $new_link = **[false](#constant.false)**,
    [int](#language.types.integer) $client_flags = 0
): [resource](#language.types.resource)|[false](#language.types.singleton)

Abre o reutiliza una conexión a un servidor MySQL.

### Parámetros

     server


       El servidor MySQL. También se puede incluir un número de puerto. P.ej.
       "nombre_anfitrión:puerto" o una ruta a un socket local, p.ej. ":/ruta/al/socket" para
       el servidor local.




       Si la directiva PHP [
       mysql.default_host](#ini.mysql.default-host) no está definida (por defecto), el valor por
       defecto es 'localhost:3306'. En [safe mode SQL](#ini.sql.safe-mode), éste parámetro es ignorado
       y siempre se usa el valor 'localhost:3306'.






     username


       El nombre de usuario. El valor por defecto está definido por [mysql.default_user](#ini.mysql.default-user). En
       [safe mode SQL](#ini.sql.safe-mode), éste parámetro es ignorado y se usa el nombre de usuario que
       posee el proceso del servidor.






     password


       La contraseña. El valor por defecto está definido por [mysql.default_password](#ini.mysql.default-password). En
       [safe mode SQL](#ini.sql.safe-mode), éste parámetro es ignorado y se usa la contraseña vacía.






     new_link


       Si se realiza una segunda llamada a **mysql_connect()**
       con los mismos argumentos, un nuevo enlace no será establecido, pero en
       su lugar, será devuelto el identificador de enlace del enlace ya
       abierto. El parámetro new_link modifica  éste
       comportamiento y hace que **mysql_connect()** siempre abra
       un nuevo enlace, aun si **mysql_connect()** fue llamada
       antes con los  mismos parámetros.
       En [safe mode SQL](#ini.sql.safe-mode), éste parámetro es ignorado.






     client_flags


       El parámetro client_flags puede ser una combinación
       de las siguientes constantes:
       128 (habilita el manejo de LOAD DATA LOCAL),
       **[MYSQL_CLIENT_SSL](#constant.mysql-client-ssl)**,
       **[MYSQL_CLIENT_COMPRESS](#constant.mysql-client-compress)**,
       **[MYSQL_CLIENT_IGNORE_SPACE](#constant.mysql-client-ignore-space)** o
       **[MYSQL_CLIENT_INTERACTIVE](#constant.mysql-client-interactive)**.
       Lea la sección sobre [Constantes de cliente MySQL](#mysql.client-flags) para más información.
       En [safe mode SQL](#ini.sql.safe-mode), éste  parámetro es ignorado.





### Valores devueltos

Devuelve un identificador de enlace de MySQL en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_connect()**

&lt;?php
$enlace =  mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace);
?&gt;

    **Ejemplo #2 Ejemplo de mysql_connect()** usando la sintaxis nombre_anfitrión:puerto

&lt;?php
// nos conectamos a ejemplo.com y al puerto 3307
$enlace = mysql_connect('ejemplo.com:3307',  'usuario_mysql', 'contraseña_mysql');
if  (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace);

// nos conectamos a ejemplo.com y al puerto 3307
$enlace = mysql_connect('127.0.0.1:3307', 'usuario_mysql',  'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace);
?&gt;

    **Ejemplo #3 Ejemplo de mysql_connect()** usando la sintaxis ":/rota/al/socket"

&lt;?php
// nos conectamos a localhost y a la toma ej. /tmp/mysql.sock

// variante 1: omitir el localhost
$enlace = mysql_connect(':/tmp/mysql', 'usuario_mysql',  'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace);

// variante 2: con localhost
$enlace = mysql_connect('localhost:/tmp/mysql.sock',  'usuario_mysql', 'contraseña_mysql');
if  (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
mysql_close($enlace);
?&gt;

### Notas

**Nota**:

    Siempre que se especifique "localhost" o
    "localhost:puerto" como servidor, la biblioteca cliente de MySQL
    invalidará esto e intentará conectarse a un socket local (llamada tubería en
    Windows). Si se quiere usar TCP/IP, se ha de utilizar "127.0.0.1"
    en lugar de "localhost". Si la biblioteca cliente de MySQL intenta
    conectarse al socket local erróneo, se debería establecer el ruta correcta como
    [](#ini.mysql.default-host) en la configuración de PHP y dejar el campo del servidor en
    blanco.

**Nota**:

    El enlace al servidor se cerrará tan pronto finalice la ejecución
    del script, a menos que se cierre antes por una llamada explícita a
    [mysql_close()](#function.mysql-close).

**Nota**:

    Se pPuede suprimir el mensaje de error en caso de fallo anteponiendo
    un [@](#language.operators.errorcontrol)
    al nombre de la función.

**Nota**:

    El error "Can't create TCP/IP socket (10106)" normalmente significa que la directiva
    de configuración [variables_order](#ini.variables-order)
    no contiene el carácter E. En Windows, si el
    entorno no es copiadola variable de entorno SYSTEMROOT
    no estará disponible y PHP tendrá problemas al cargar Winsock.

### Ver también

    - [mysql_pconnect()](#function.mysql-pconnect) - Abre una conexión persistente a un servidor MySQL

    - [mysql_close()](#function.mysql-close) - Cerrar una conexión de MySQL

# mysql_create_db

(PHP 4, PHP 5)

mysql_create_db — Crea una base de datos MySQL

**Advertencia**
Esta función estaba obsoleta
en PHP 4.3.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - [mysqli_query()](#mysqli.query)

    - [PDO::query()](#pdo.query)

### Descripción

**mysql_create_db**([string](#language.types.string) $database_name, [resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

**mysql_create_db()** intenta crear una nueva
base de datos en el servidor asociado con el identificador de enlace
especificado.

### Parámetros

     database_name


       El nombre de la base de datos a crear.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo alternativo de mysql_create_db()**



     La función **mysql_create_db()** está obsoleta. Es
     preferible el uso de  [mysql_query()](#function.mysql-query) para emitir
     una sentencia CREATE DATABASE de sql en su lugar.

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}

$sql = 'CREATE DATABASE mi_bd';
if (mysql_query($sql, $enlace)) {
echo "La base de datos mi_bd se creó correctamente\n";
} else {
echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

La base de datos mi_bd se creó correctamente

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_createdb()**

**Nota**:

    Ésta función no estará disponible si la extensión MySQL fue construida
    con una biblioteca cliente MySQL 4.x.

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_select_db()](#function.mysql-select-db) - Seleccionar una base de datos MySQL

# mysql_data_seek

(PHP 4, PHP 5)

mysql_data_seek — Mueve el puntero de resultados interno

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_data_seek()](#mysqli-result.data-seek)

    - **[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs)**

### Descripción

**mysql_data_seek**([resource](#language.types.resource) $result, [int](#language.types.integer) $row_number): [bool](#language.types.boolean)

**mysql_data_seek()** mueve el puntero de filas interno
del resultado de MySQL asociado con el identificador de resultado especificado
para apuntar al número de fila especificada. La siguiente llamada
a una función de obtención de MySQL, tal como [mysql_fetch_assoc()](#function.mysql-fetch-assoc),
devolverá esa fila.

row_number empieza en 0.
row_number debería ser un valor en el rango de 0 a
[mysql_num_rows()](#function.mysql-num-rows) -1. Sin embargo, si el conjunto de resultados
esta vacío ([mysql_num_rows()](#function.mysql-num-rows) == 0), una búsqueda a 0
fallará con un **[E_WARNING](#constant.e-warning)** y
**mysql_data_seek()** devolverá **[false](#constant.false)**.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

     row_number


       Número de la fila deseada del puntero de resultados nuevo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_data_seek()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}
$bd_seleccionada = mysql_select_db('bd_muestra');
if (!$bd_seleccionada) {
die('La base de datos no pudo seleccionarse: ' . mysql_error());
}
$consulta = 'SELECT apellido, nombre FROM amigos';
$resultado = mysql_query($consulta);
if (!$resultado) {
die('La consulta falló: ' . mysql_error());
}
/_ obtención de filas en orden inverso _/
for ($i = mysql_num_rows($resultado) - 1; $i &gt;= 0; $i--) {
    if (!mysql_data_seek($resultado, $i)) {
echo "No se encuenta la fila $i: " . mysql_error() . "\n";
continue;
}

    if (!($fila = mysql_fetch_assoc($resultado))) {
        continue;
    }

    echo $fila['apellido'] . ' ' . $fila['nombre'] . "&lt;br /&gt;\n";

}

mysql_free_result($resultado);
?&gt;

### Notas

**Nota**:

    La función **mysql_data_seek()** puede ser usada
    solamente junto con [mysql_query()](#function.mysql-query), y no con
    [mysql_unbuffered_query()](#function.mysql-unbuffered-query).

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_num_rows()](#function.mysql-num-rows) - Obtener el número de filas de un conjunto de resultados

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_fetch_array()](#function.mysql-fetch-array) - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

    - [mysql_fetch_object()](#function.mysql-fetch-object) - Recupera una fila de resultados como un objeto

# mysql_db_name

(PHP 4, PHP 5)

mysql_db_name — Recupera el nombre de la base de datos desde una llamada a [mysql_list_dbs()](#function.mysql-list-dbs)

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - Consulta: SELECT DATABASE()

### Descripción

**mysql_db_name**([resource](#language.types.resource) $result, [int](#language.types.integer) $row, [mixed](#language.types.mixed) $field = NULL): [string](#language.types.string)

Recupera el nombre de la base de datos de una llamada a
[mysql_list_dbs()](#function.mysql-list-dbs).

### Parámetros

     result


       El puntero de resultados desde una llamada a [mysql_list_dbs()](#function.mysql-list-dbs).






     row


       El índice dentro del conjunto de resultados.






     field


       El nombre del campo.





### Valores devueltos

Devuelve el nombre de la base de datos en caso de éxito, y **[false](#constant.false)** en caso de error.
Si se devuelve **[false](#constant.false)**, se usa [mysql_error()](#function.mysql-error) para determinar la naturaleza
del error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_db_name()**

&lt;?php
error_reporting(E_ALL);

$enlace = mysql_connect('anfitrión_bd', 'nombre_usuario', 'contraseña');
$lista_bd = mysql_list_dbs($enlace);

$i = 0;
$cuenta = mysql_num_rows($lista_bd);
while ($i &lt; $cuenta) {
    echo mysql_db_name($lista_bd, $i) . "\n";
$i++;
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_dbname()**

### Ver también

    - [mysql_list_dbs()](#function.mysql-list-dbs) - Lista las bases de datos disponibles en un servidor MySQL

    - [mysql_tablename()](#function.mysql-tablename) - Obtiene el nombre de la tabla de un campo

# mysql_db_query

(PHP 4, PHP 5)

mysql_db_query — Selecciona una base de datos y ejecuta una consulta sobre la misma

**Advertencia**
Esta función estaba obsoleta
en PHP 5.3.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_select_db()](#mysqli.select-db) y luego la consulta

    - [PDO::__construct()](#pdo.construct)

### Descripción

**mysql_db_query**([string](#language.types.string) $database, [string](#language.types.string) $query, [resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)|[bool](#language.types.boolean)

**mysql_db_query()** selecciona una base de datos y ejecuta una
consulta en ella.

### Parámetros

     database


       El nombre de la base de datos que va a ser seleccionada.






     query


       La consulta MySQL.




       Los datos dentro de la consulta deben ser  [escapados apropiadamente](#function.mysql-real-escape-string).





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve un recurso de resultados de MySQL positivo al resultado de la consulta,
o **[false](#constant.false)** en caso de error. La función también retorna **[true](#constant.true)**/**[false](#constant.false)** para las consultas
INSERT/UPDATE/DELETE
indicando éxito/fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo alternativo de mysql_db_query()**

&lt;?php

if (!$enlace = mysql_connect('anfitrión_mysql', 'usuario_mysql', 'contraseña_mysql')) {
echo 'No pudo conectarse a mysql';
exit;
}

if (!mysql_select_db('nombre_bd_mysql', $enlace)) {
echo 'No pudo seleccionar la base de datos';
exit;
}

$sql       = 'SELECT foo FROM bar WHERE id = 42';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
echo "Error de BD, no se pudo consultar la base de datos\n";
echo "Error MySQL: ' . mysql_error();
exit;
}

while ($fila = mysql_fetch_assoc($resultado)) {
echo $fila['foo'];
}

mysql_free_result($resultado);

?&gt;

### Notas

**Nota**:

    Se ha de tener en cuenta que ésta función **NO**
    vuelve a la base de datos a la que se estaba conectado anteriormente. En otras palabras,
    no se puede utilizar ésta función para ejecutar *temporalmente* una
    consulta SQL en otra base de datos; se tendría que hacer el cambio manualmente.
    Se recomienda encarecidamente usar la sintaxis
    basedatos.tabla en las consultas SQL o
    [mysql_select_db()](#function.mysql-select-db) en lugar de esta función.

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_select_db()](#function.mysql-select-db) - Seleccionar una base de datos MySQL

# mysql_drop_db

(PHP 4, PHP 5)

mysql_drop_db — Elimina (DROP) una base de datos MySQL

**Advertencia**
Esta función estaba obsoleta
en PHP 4.3.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - Ejecutar una consulta DROP DATABASE

### Descripción

**mysql_drop_db**([string](#language.types.string) $database_name, [resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

**mysql_drop_db()** intenta eliminar (remover) una
base de datos entera del servidor asociado con el identificador
de enlace especificado. Esta función es obsoleta; es preferible usar
[mysql_query()](#function.mysql-query) para ejecutar una sentencia SQL
DROP DATABASE en su lugar.

### Parámetros

     database_name


       El nombre de la base de datos que va a ser eliminada.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo alternativo de mysql_drop_db()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No pudo conectarse: ' . mysql_error());
}

$sql = 'DROP DATABASE mi_bd';
if (mysql_query($sql, $enlace)) {
echo "La base de datos mi_bd fue eliminada con éxito\n";
} else {
echo 'Error al eliminar la base de datos: ' . mysql_error() . "\n";
}
?&gt;

### Notas

**Advertencia**

    Ésta función no estará disponible si la extensión MySQL fue construida
    con una biblioteca cliente MySQL 4.x.

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_dropdb()**

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

# mysql_errno

(PHP 4, PHP 5)

mysql_errno — Devuelve el valor numérico del mensaje de error de la última operación MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_errno()](#mysqli.errno)

    - [PDO::errorCode()](#pdo.errorcode)

### Descripción

**mysql_errno**([resource](#language.types.resource) $link_identifier = NULL): [int](#language.types.integer)

Devuelve el número de error de la última función MySQL.

Los errores que provienen del procesamiento de la base de datos MySQL ya no
emiten advertencias. En su lugar, utilice **mysql_errno()** para
recuperar el código de error. Tenga en cuenta que ésta función solamente devolverá el
código de error de la función MySQL ejecutada mas recientemente (sin
incluir a [mysql_error()](#function.mysql-error) y
**mysql_errno()**), por lo que, si se quiere usar,
hay que asegurarse de revisar el valor antes de llamar otra función
MySQL.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve el número de error de la última función de MySQL, o
0 (cero) si no ha ocurrido ningún error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_errno()**

&lt;?php
$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");

if (!mysql_select_db("bd_inexistente", $enlace)) {
    echo mysql_errno($enlace) . ": " . mysql_error($enlace). "\n";
}

mysql_select_db("kossu", $enlace);
if (!mysql_query("SELECT * FROM tabla_inexistente", $enlace)) {
    echo mysql_errno($enlace) . ": " . mysql_error($enlace) . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

1049: Unknown database 'bd_inexistente'
1146: Table 'kossu.tabla_inexistente' doesn't exist

### Ver también

    - [mysql_error()](#function.mysql-error) - Devuelve el texto del mensaje de error de la operación MySQL anterior

    - [» Códigos de error de MySQL](http://dev.mysql.com/doc/mysql/en/error-handling.html)

# mysql_error

(PHP 4, PHP 5)

mysql_error — Devuelve el texto del mensaje de error de la operación MySQL anterior

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_error()](#mysqli.error)

    - [PDO::errorInfo()](#pdo.errorinfo)

### Descripción

**mysql_error**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)

Devuelve el texto del error de la última función MySQL.
Los errores que provienen del procesamiento de la base de datos MySQL ya no
emiten advertencias. En su lugar, utilice [mysql_errno()](#function.mysql-errno) para
recuperar el código de error. Tenga en cuenta que ésta función solamente devolverá el
código de error de la función MySQL ejecutada mas recientemente (sin
incluir a **mysql_error()** y
[mysql_errno()](#function.mysql-errno)), por lo que, si se quiere usar,
hay que asegurarse de revisar el valor antes de llamar otra función
MySQL.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve el texto del error de la última función MySQL, o
'' (una cadena vacía) si no ha ocurrido ningún error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_error()**

&lt;?php
$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");

mysql_select_db("bd_inexistente", $enlace);
echo mysql_errno($enlace) . ": " . mysql_error($enlace). "\n";

mysql_select_db("kossu", $enlace);
mysql_query("SELECT * FROM tabla_inexistente", $enlace);
echo mysql_errno($enlace) . ": " . mysql_error($enlace) . "\n";
?&gt;

     Resultado del ejemplo anterior es similar a:




1049: Unknown database 'bd_inexistente'
1146: Table 'kossu.tabla_inexistente' doesn't exist

### Ver también

    - [mysql_errno()](#function.mysql-errno) - Devuelve el valor numérico del mensaje de error de la última operación MySQL

    - [» Códigos de error de MySQL](http://dev.mysql.com/doc/mysql/en/error-handling.html)

# mysql_escape_string

(PHP 4 &gt;= 4.0.3, PHP 5)

mysql_escape_string — Escapa una cadena para ser usada en mysql_query

**Advertencia**
Esta función estaba obsoleta
en PHP 4.3.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - [mysqli_escape_string()](#function.mysqli-escape-string)

    - [PDO::quote()](#pdo.quote)

### Descripción

**mysql_escape_string**([string](#language.types.string) $unescaped_string): [string](#language.types.string)

Esta función escapará unescaped_string,
para que sea segura ponerla en una [mysql_query()](#function.mysql-query).
Esta función está obsoleta.

Esta función es idéntica a [mysql_real_escape_string()](#function.mysql-real-escape-string)
excepto que [mysql_real_escape_string()](#function.mysql-real-escape-string) toma un
gestor de conexión y escapa la cadena de acuerdo con el juego de caracteres
actual. **mysql_escape_string()** no toma un
argumento de conexión y no respeta la configuración del juego de caracteres actual.

### Parámetros

     unescaped_string


       La cadena que va a ser escapada.





### Valores devueltos

Devuelve la cadena escapada.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_escape_string()**

&lt;?php
$elemento = "Zak's Laptop";
$elemento_escapado = mysql_escape_string($elemento);
printf("Cadena escapada: %s\n", $elemento_escapado);
?&gt;

    El ejemplo anterior mostrará:

Cadena escapada: Zak\'s Laptop

### Notas

**Nota**:

    **mysql_escape_string()** no escapa los caracteres
    % y _.

### Ver también

    - [mysql_real_escape_string()](#function.mysql-real-escape-string) - Escapa caracteres especiales en una cadena para su uso en una sentencia SQL

# mysql_fetch_array

(PHP 4, PHP 5)

mysql_fetch_array — Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_array()](#mysqli-result.fetch-array)

    - [PDOStatement::fetch()](#pdostatement.fetch)

### Descripción

**mysql_fetch_array**([resource](#language.types.resource) $result, [int](#language.types.integer) $result_type = MYSQL_BOTH): [array](#language.types.array)

Devuelve un array que corresponde a la fila recuperada
y mueve el puntero de datos interno hacia delante.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

     result_type


       El tipo de array que va a ser devuelto. Es una constante y puede
       tomar los siguientes valores: **[MYSQL_ASSOC](#constant.mysql-assoc)**,
       **[MYSQL_NUM](#constant.mysql-num)**, y
       **[MYSQL_BOTH](#constant.mysql-both)**.





### Valores devueltos

Devuelve un array de cadenas que corresponde a la fila recuperada, o **[false](#constant.false)**
si no hay más filas. El tipo del array retornado depende de
como esté definido result_type. Al utilizar
**[MYSQL_BOTH](#constant.mysql-both)** (predeterminado), se obtendrá un array con ambos
índices: asociativos y numéricos. Al utilizar **[MYSQL_ASSOC](#constant.mysql-assoc)**,
se obtienen solo los índices asociativos (tal como funciona [mysql_fetch_assoc()](#function.mysql-fetch-assoc)).
Al utilizar **[MYSQL_NUM](#constant.mysql-num)**, se obtienen solo los índices numéricos
(tal como funciona [mysql_fetch_row()](#function.mysql-fetch-row)).

Si dos o más columnas del resultado tienen el mismo nombre de campo,
la última columna tomará precedencia. Para acceder a la/s otra/s columna/s
con el mismo nombre, se deberá usar el índice numérico de la columna o
crear un alias para la columna. Para las columnas con alias, no se puede
acceder al contenido con el nombre de la columna original.

### Ejemplos

    **Ejemplo #1 Consulta con nombres de campos duplicados con alias**

SELECT tabla1.campo AS foo, tabla2.campo AS bar FROM tabla1, tabla2

    **Ejemplo #2 mysql_fetch_array()** con **[MYSQL_NUM](#constant.mysql-num)**

&lt;?php
mysql_connect("localhost", "usuario_mysql", "contraseña_mysql") or
die("No se pudo conectar: " . mysql_error());
mysql_select_db("mibd");

$resultado = mysql_query("SELECT id, nombre FROM mitabla");

while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
printf("ID: %s Nombre: %s", $fila[0], $fila[1]);
}

mysql_free_result($resultado);
?&gt;

    **Ejemplo #3 mysql_fetch_array()** con **[MYSQL_ASSOC](#constant.mysql-assoc)**

&lt;?php
mysql_connect("localhost", "usuario_mysql", "contraseña_mysql") or
die("No se pudo conectar: " . mysql_error());
mysql_select_db("mibd");

$resultado = mysql_query("SELECT id, nombre FROM mitabla");

while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
printf("ID: %s Nombre: %s", $fila["id"], $fila["nombre"]);
}

mysql_free_result($resultado);
?&gt;

    **Ejemplo #4 mysql_fetch_array()** con **[MYSQL_BOTH](#constant.mysql-both)**

&lt;?php
mysql_connect("localhost", "usuario_mysql", "contraseña_mysql") or
die("No se pudo conectar: " . mysql_error());
mysql_select_db("mibd");

$resultado = mysql_query("SELECT id, nombre FROM mitabla");

while ($fila = mysql_fetch_array($resultado, MYSQL_BOTH)) {
printf ("ID: %s Nombre: %s", $fila[0], $fila["nombre"]);
}

mysql_free_result($resultado);
?&gt;

### Notas

**Nota**:
**Rendimiento**

    Una cosa importante a tener en cuenta es que el uso de
    **mysql_fetch_array()** *no es
    significativamente* más lento que el uso de
    [mysql_fetch_row()](#function.mysql-fetch-row), aunque provee un
    valor añadido considerable.

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Ver también

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_data_seek()](#function.mysql-data-seek) - Mueve el puntero de resultados interno

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

# mysql_fetch_assoc

(PHP 4 &gt;= 4.0.3, PHP 5)

mysql_fetch_assoc — Recupera una fila de resultados como un array asociativo

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc)

    -
     [PDOStatement::fetch()](#pdostatement.fetch)
     con mode como **[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)**

### Descripción

**mysql_fetch_assoc**([resource](#language.types.resource) $result): [array](#language.types.array)

Devuelve un array asociativo que corresponde a la fila recuperada
y mueve el puntero de datos interno hacia adelante.
**mysql_fetch_assoc()** es equivalente a llamar a
[mysql_fetch_array()](#function.mysql-fetch-array) con MYSQL_ASSOC como segundo
parámetro opcional. Únicamente devuelve un array asociativo.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

Devuelve un array asociativo de strings que corresponde a la fila recuperada, o
**[false](#constant.false)** si no hay más filas disponibles.

Si dos o más columnas del resultado tienen los mismos nombres de campo,
la última columna tomará precedencia. Para acceder a la/s otra/s
columna/s con el mismo nombre, se tendrá que acceder al
resultado con índices numéricos mediante el uso de
[mysql_fetch_row()](#function.mysql-fetch-row) o agregando sobrenombres.
Véase el ejemplo en la descripción de [mysql_fetch_array()](#function.mysql-fetch-array)
respecto a los sobrenombres.

### Ejemplos

    **Ejemplo #1 Un ejemplo desarrolado de mysql_fetch_assoc()**

&lt;?php

$conexión = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");

if (!$conexión) {
echo "No pudo conectarse a la BD: " . mysql_error();
exit;
}

if (!mysql_select_db("nombre_de_la_bd")) {
echo "No ha sido posible seleccionar la BD: " . mysql_error();
exit;
}

$sql = "SELECT id as id_usuario, nombre_completo, estatus_usuario
FROM alguna_tabla
WHERE estatus_usuario = 1";

$resultado = mysql_query($sql);

if (!$resultado) {
    echo "No se pudo ejecutar con exito la consulta ($sql) en la BD: " . mysql_error();
exit;
}

if (mysql_num_rows($resultado) == 0) {
echo "No se han encontrado filas, nada a imprimir, asi que voy a detenerme.";
exit;
}

// Mientras exista una fila de datos, colocar esa fila en $fila como un array asociativo
// Nota: Si solo espera una fila, no hay necesidad de usar un bucle
// Nota: Si coloca extract($fila); dentro del siguiente bucle,
// estará creando $id_usuario, $nombre_completo, y $estatus_usuario
while ($fila = mysql_fetch_assoc($resultado)) {
echo $fila["id_usuario"];
echo $fila["nombre_completo"];
echo $fila["estatus_usuario"];
}

mysql_free_result($resultado);

?&gt;

### Notas

**Nota**:
**Rendimiento**

    Algo importante a observar es que el uso de
    **mysql_fetch_assoc()** *no es
    significativamente* más lento que el uso de
    [mysql_fetch_row()](#function.mysql-fetch-row), aunque provee un
    valor añadido considerable.

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Ver también

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [mysql_fetch_array()](#function.mysql-fetch-array) - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

    - [mysql_data_seek()](#function.mysql-data-seek) - Mueve el puntero de resultados interno

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_error()](#function.mysql-error) - Devuelve el texto del mensaje de error de la operación MySQL anterior

# mysql_fetch_field

(PHP 4, PHP 5)

mysql_fetch_field — Obtiene la información de una columna de un resultado y la devuelve como un objeto

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field()](#mysqli-result.fetch-field)

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta)

### Descripción

**mysql_fetch_field**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset = 0): [object](#language.types.object)

Devuelve un objeto que contiene la información de los campos. Esta función puede ser usada
para obtener información sobre campos en el resultado de la consulta proporcionada.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

     field_offset


       El índice numérico del campo. Si el índice del campo no se especifica, se
       recuperará el siguiente campo que aún no haya recuperado esta función.
       Los índices de field_offset comienzan en 0.





### Valores devueltos

Devuelve un [object](#language.types.object) que contiene la información del campo.
Las propiedades del objeto son:

    -

      name - nombre de la columna



    -

      table - nombre de la tabla a la que pertenece la columna, el cual es el sobrenombre si alguno está definido



    -

      max_length - longitud máxima de la columna



    -

      not_null - 1 si la columna no puede ser **[null](#constant.null)**



    -

      primary_key - 1 si la columna es una clave primaria



    -

      unique_key - 1 si la columna es una clave única



    -

      multiple_key - 1 si la colmuna es una clave no única



    -

      numeric - 1 si la columna es numérica



    -

      blob - 1 si la columna es un BLOB



    -

      type - el tipo de la columna



    -

      unsigned - 1 si la columna es sin signo



    -

      zerofill - 1 si la columna es rellena de ceros


### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_fetch_field()**

&lt;?php
$conexión = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$conexión) {
die('No se pudo conectar: ' . mysql_error());
}
mysql_select_db('basedatos');
$resultado = mysql_query('select * from table');
if (!$resultado) {
die('Falló la consulta: ' . mysql_error());
}
/_ obtener los metadatos de la columna _/
$i = 0;
while ($i &lt; mysql_num_fields($resultado)) {
    echo "Información de la columna $i:&lt;br /&gt;\n";
    $metadatos = mysql_fetch_field($resultado, $i);
    if (!$metadatos) {
echo "No hay información disponible&lt;br /&gt;\n";
}
echo "&lt;pre&gt;
blob: $metadatos-&gt;blob
max_length:   $metadatos-&gt;max_length
multiple_key: $metadatos-&gt;multiple_key
name:         $metadatos-&gt;name
not_null:     $metadatos-&gt;not_null
numeric:      $metadatos-&gt;numeric
primary_key:  $metadatos-&gt;primary_key
table:        $metadatos-&gt;table
type:         $metadatos-&gt;type
unique_key:   $metadatos-&gt;unique_key
unsigned:     $metadatos-&gt;unsigned
zerofill:     $metadatos-&gt;zerofill
&lt;/pre&gt;";
    $i++;
}
mysql_free_result($resultado);
?&gt;

### Notas

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**:

    Si se usa un alias para los campos o los nombres de tablas en la consulta SQL se
    devolverá el nombre del alias. El nombre original se puede recuperar, por ejemplo, usando
    [mysqli_result::fetch_field()](#mysqli-result.fetch-field).

### Ver también

    - [mysql_field_seek()](#function.mysql-field-seek) - Establece el puntero del resultado en un índice de campo específicado

# mysql_fetch_lengths

(PHP 4, PHP 5)

mysql_fetch_lengths — Obtiene la longitud de cada salida en un resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_lengths()](#mysqli-result.lengths)

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta)

### Descripción

**mysql_fetch_lengths**([resource](#language.types.resource) $result): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array que corresponde a las longitudes de cada campo
de la última fila recuperada por MySQL.

**mysql_fetch_lengths()** almacena las longitudes de
cada columna del resultado en la última fila devuelta mediante
[mysql_fetch_row()](#function.mysql-fetch-row),
[mysql_fetch_assoc()](#function.mysql-fetch-assoc),
[mysql_fetch_array()](#function.mysql-fetch-array), y
[mysql_fetch_object()](#function.mysql-fetch-object) en un array, comenzando desde el
índice 0.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

Un [array](#language.types.array) de longitudes en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_fetch_lengths()**

&lt;?php
$resultado = mysql_query("SELECT id,email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}
$fila       = mysql_fetch_assoc($resultado);
$longitudes = mysql_fetch_lengths($resultado);

print_r($fila);
print_r($longitudes);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[id] =&gt; 42
[email] =&gt; user@example.com
)
Array
(
[0] =&gt; 2
[1] =&gt; 16
)

### Ver también

    - [mysql_field_len()](#function.mysql-field-len) - Devuelve la longitud del campo especificado

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

# mysql_fetch_object

(PHP 4, PHP 5)

mysql_fetch_object — Recupera una fila de resultados como un objeto

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_object()](#mysqli-result.fetch-object)

    -
     [PDOStatement::fetch()](#pdostatement.fetch)
     con mode como **[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)**

### Descripción

**mysql_fetch_object**([resource](#language.types.resource) $result, [string](#language.types.string) $class_name = ?, [array](#language.types.array) $params = ?): [object](#language.types.object)

Devuelve un objeto con propiedades que corresponden a la fila recuperada
y mueve el puntero interno hacia delante.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

     class_name


       El nombre de la clase donde instanciar, configurar las propiedades y devolver.
       Si no se especifica, se devuelve un objeto [stdClass](#class.stdclass).






     params


       Un [array](#language.types.array) opcional de parámetros para pasar al constructor
       de los objetos class_name.





### Valores devueltos

Devuelve un [object](#language.types.object) con propiedades de tipo string que se corresponden con la
fila recuperada, o **[false](#constant.false)** si no quedan más filas.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_fetch_object()**

&lt;?php
mysql_connect("nombre_anfitrión", "usuario", "contraseña");
mysql_select_db("mibd");
$resultado = mysql_query("select * from mitabla");
while ($fila = mysql_fetch_object($resultado)) {
    echo $fila-&gt;id_usuario;
    echo $fila-&gt;nombre_completo;
}
mysql_free_result($resultado);
?&gt;

    **Ejemplo #2 Ejemplo de mysql_fetch_object()**

&lt;?php
class foo {
public $nombre;
}

mysql_connect("nombre_anfitrión", "usuario", "contraseña");
mysql_select_db("mibd");

$resultado = mysql_query("select nombre from mitabla limit 1");
$objeto = mysql_fetch_object($resultado, 'foo');
var_dump($objeto);
?&gt;

### Notas

**Nota**:
**Rendimiento**

    En cuestión de velocidad, la función es idéntica a
    [mysql_fetch_array()](#function.mysql-fetch-array), y casi tan rápida como
    [mysql_fetch_row()](#function.mysql-fetch-row) (la diferencia es
    insignificante).

**Nota**:

    **mysql_fetch_object()** es similar a
    [mysql_fetch_array()](#function.mysql-fetch-array), con una diferencia: se
    devuelve un objeto, en lugar de un array. Indirectamente, esto significa
    que se puede acceder a los datos únicamente mediante los nombres de los campos, y no
    mediante sus índices (los números son ilegales como nombres de propiedades).

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Ver también

    - [mysql_fetch_array()](#function.mysql-fetch-array) - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [mysql_data_seek()](#function.mysql-data-seek) - Mueve el puntero de resultados interno

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

# mysql_fetch_row

(PHP 4, PHP 5)

mysql_fetch_row — Obtiene una fila de resultados como un array numérico

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_row()](#mysqli-result.fetch-row)

    -
     [PDOStatement::fetch()](#pdostatement.fetch)
     con mode como **[PDO::FETCH_NUM](#pdo.constants.fetch-num)**

### Descripción

**mysql_fetch_row**([resource](#language.types.resource) $result): [array](#language.types.array)

Devuelve un array numérico que corresponde a la fila recuperada
y mueve el puntero de datos interno hacia delante.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

Devuelve un array numérico que corresponde a la fila recuperada, o
**[false](#constant.false)** si no quedan más filas.

**mysql_fetch_row()** recupera una fila de datos del
resultado asociado al identificador de resultados especificado. La
fila es devuelta como un array. Cada columna del resultado es almacenada en un
índice del array, empezando desde 0.

### Ejemplos

    **Ejemplo #1 Recuperar una fila con mysql_fetch_row()**

&lt;?php
$resultado = mysql_query("SELECT id, email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}
$fila = mysql_fetch_row($resultado);

echo $fila[0]; // 42
echo $fila[1]; // el valor de email
?&gt;

### Notas

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Ver también

    - [mysql_fetch_array()](#function.mysql-fetch-array) - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_fetch_object()](#function.mysql-fetch-object) - Recupera una fila de resultados como un objeto

    - [mysql_data_seek()](#function.mysql-data-seek) - Mueve el puntero de resultados interno

    - [mysql_fetch_lengths()](#function.mysql-fetch-lengths) - Obtiene la longitud de cada salida en un resultado

    - [mysql_result()](#function.mysql-result) - Obtener datos de resultado

# mysql_field_flags

(PHP 4, PHP 5)

mysql_field_flags — Obtiene las banderas asociadas al campo especificado de un resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) [flags]

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) [flags]

### Descripción

**mysql_field_flags**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)|[false](#language.types.singleton)

**mysql_field_flags()** devuelve las banderas del
campo especificado. Las banderas son reportadas como una sola palabra
por bandera, separada por un solo espacio, por lo que se puede dividir el
valor devuelto usando [explode()](#function.explode).

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve un string de banderas asociadas con el resultado o **[false](#constant.false)** si ocurre un error.

Las siguientes banderas son reportadas si la versión de MySQL es
suficientemente actual para soportarlas: "not_null",
"primary_key", "unique_key",
"multiple_key", "blob",
"unsigned", "zerofill",
"binary", "enum",
"auto_increment" y "timestamp".

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_field_flags()**

&lt;?php
$resultado = mysql_query("SELECT id, email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}
$banderas = mysql_field_flags($resultado, 0);

echo $banderas;
print_r(explode(' ', $banderas));
?&gt;

    Resultado del ejemplo anterior es similar a:

not_null primary_key auto_increment
Array
(
[0] =&gt; not_null
[1] =&gt; primary_key
[2] =&gt; auto_increment
)

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_fieldflags()**

### Ver también

    - [mysql_field_type()](#function.mysql-field-type) - Obtiene el tipo del campo especificado de un resultado

    - [mysql_field_len()](#function.mysql-field-len) - Devuelve la longitud del campo especificado

# mysql_field_len

(PHP 4, PHP 5)

mysql_field_len — Devuelve la longitud del campo especificado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) [length]

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) [len]

### Descripción

**mysql_field_len**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [int](#language.types.integer)|[false](#language.types.singleton)

**mysql_field_len()** devuelve la longitud del
campo especificado.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

La longitud del índice del campo especificado en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_field_len()**

&lt;?php
$resultado = mysql_query("SELECT id, email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}

// Se obtendrá la longitud del campo id tal como está especificado en el esquema
// de la base de datos.
$longitud = mysql_field_len($resultado, 0);
echo $longitud;
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_fieldlen()**

### Ver también

    - [mysql_fetch_lengths()](#function.mysql-fetch-lengths) - Obtiene la longitud de cada salida en un resultado

    - [strlen()](#function.strlen) - Calcula el tamaño de un string

# mysql_field_name

(PHP 4, PHP 5)

mysql_field_name — Obtiene el nombre del campo especificado de un resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) [name] o [orgname]

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) [name]

### Descripción

**mysql_field_name**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)|[false](#language.types.singleton)

**mysql_field_name()** devuelve el nombre del
índice del campo especificado.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

El nombre del índice del campo especificado en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_field_name()**

&lt;?php
/\* La tabla usuarios consiste de tres campos:

- user_id
- username
- password.
  _/
  $enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
  die('No se pudo conectar al servidor MySQL: ' . mysql_error());
  }
  $nombre_bd = 'mibd';
$bd_seleccionada = mysql_select_db($nombre_bd, $enlace);
if (!$bd_seleccionada) {
  die("No se pudo establecer $nombre_bd: " . mysql_error());
}
$resultado = mysql_query('select _ from usuarios', $enlace);

echo mysql_field_name($resultado, 0) . "\n";
echo mysql_field_name($resultado, 2);
?&gt;

    El ejemplo anterior mostrará:

user_id
password

### Notas

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_fieldname()**

### Ver también

    - [mysql_field_type()](#function.mysql-field-type) - Obtiene el tipo del campo especificado de un resultado

    - [mysql_field_len()](#function.mysql-field-len) - Devuelve la longitud del campo especificado

# mysql_field_seek

(PHP 4, PHP 5)

mysql_field_seek — Establece el puntero del resultado en un índice de campo específicado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_field_seek()](#mysqli-result.field-seek)

    -
     [PDOStatement::fetch()](#pdostatement.fetch) empleando los parámetros
     cursor_orientation y
     offset

### Descripción

**mysql_field_seek**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [bool](#language.types.boolean)

Busca el índice del campo especificado. Si la siguiente llamada a
[mysql_fetch_field()](#function.mysql-fetch-field) no incluye un índice de
campo, será devuelto el índice del campo especificado en
**mysql_field_seek()**.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mysql_fetch_field()](#function.mysql-fetch-field) - Obtiene la información de una columna de un resultado y la devuelve como un objeto

# mysql_field_table

(PHP 4, PHP 5)

mysql_field_table — Obtiene el nombre de la tabla en la que está el campo especificado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) [table] o [orgtable]

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) [table]

### Descripción

**mysql_field_table**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

Devuelve el nombre de la tabla en la que está el campo especificado.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

El nombre de la tabla en caso de éxito.

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_field_table()**

&lt;?php

$consulta = "SELECT account._, country._ FROM account, country WHERE country.name = 'Portugal' AND account.country_id = country.id";

// obtener el resultado desde la BD
$resultado = mysql_query($consulta);

// Lista el nombre de la tabla y luego el nombre del campo
for ($i = 0; $i &lt; mysql_num_fields($resultado); ++$i) {
    $tabla = mysql_field_table($resultado, $i);
    $campo = mysql_field_name($resultado, $i);

    echo  "$tabla: $campo\n";

}

?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_fieldtable()**

### Ver también

    - [mysql_list_tables()](#function.mysql-list-tables) - Lista las tablas de una base de datos MySQL

# mysql_field_type

(PHP 4, PHP 5)

mysql_field_type — Obtiene el tipo del campo especificado de un resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) [type]

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) [driver:decl_type] o [pdo_type]

### Descripción

**mysql_field_type**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

**mysql_field_type()** es similar a la
función [mysql_field_name()](#function.mysql-field-name). Los argumentos son
idénticos, pero se devuelve en su lugar el tipo de campo.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

field_offset
La posición numérica del campo.
field_offset comienza en 0.
Si field_offset no existe, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

El tipo de campo devuelto será uno de
los siguientes: "int", "real",
"string", "blob", y otros tal
como se detalla en [» la
documentación de MySQL](http://dev.mysql.com/doc/).

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_field_type()**

&lt;?php
mysql_connect("localhost", "nombre_usuario_mysql", "cotraseña_mysql");
mysql_select_db("mysql");
$resultado = mysql_query("SELECT * FROM func");
$campos = mysql_num_fields($resultado);
$filas = mysql_num_rows($resultado);
$tabla = mysql_field_table($resultado, 0);
echo "Su tabla '" . $tabla . "' tiene " . $campos . " campos y " . $filas . " registro/s\n";
echo "La tabla tiene los siguientes campos:\n";
for ($i=0; $i &lt; $campos; $i++) {
    $tipo     = mysql_field_type($resultado, $i);
    $nombre   = mysql_field_name($resultado, $i);
    $longitud = mysql_field_len($resultado, $i);
    $banderas = mysql_field_flags($resultado, $i);
    echo $tipo . " " . $nombre . " " . $longitud . " " . $banderas . "\n";
}
mysql_free_result($resultado);
mysql_close();
?&gt;

    Resultado del ejemplo anterior es similar a:

Su tabla 'func' tiene 4 campos y 1 registro/s
La tabla tiene los siguientes campos:
string name 64 not_null primary_key binary
int ret 1 not_null
string dl 128 not_null
string type 9 not_null enum

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_fieldtype()**

### Ver también

    - [mysql_field_name()](#function.mysql-field-name) - Obtiene el nombre del campo especificado de un resultado

    - [mysql_field_len()](#function.mysql-field-len) - Devuelve la longitud del campo especificado

# mysql_free_result

(PHP 4, PHP 5)

mysql_free_result — Libera la memoria del resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_free_result()](#mysqli-result.free)

    - Asignar el valor de **[null](#constant.null)** al objeto PDO, o [PDOStatement::closeCursor()](#pdostatement.closecursor)

### Descripción

**mysql_free_result**([resource](#language.types.resource) $result): [bool](#language.types.boolean)

**mysql_free_result()** liberará toda la memoria
asociada con el identificador del resultado result.

**mysql_free_result()** solo necesita ser llamado si
se está preocupado por la cantidad de memoria que está siendo usada por las consultas
que devuelven conjuntos de resultados grandes. Toda la memoria de resultados asociada
se liberará automaticamente al finalizar la ejecución del script.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Si se utiliza un recurso no válido para result,
se emitirá un error de nivel E_WARNING. Vale la pena señalar que
[mysql_query()](#function.mysql-query) solo devuelve un recurso
para las consultas SELECT, SHOW, EXPLAIN, y DESCRIBE.

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_free_result()**

&lt;?php
$resultado = mysql_query("SELECT id, email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}
/_ Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él _/
$fila = mysql_fetch_assoc($resultado);

/_ Ahora liberamos el resultado y continuamos con nuestro script _/
mysql_free_result($resultado);

echo $fila['id'];
echo $fila['email'];
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_freeresult()**

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [is_resource()](#function.is-resource) - Determina si una variable es un recurso

# mysql_get_client_info

(PHP 4 &gt;= 4.0.5, PHP 5)

mysql_get_client_info — Obtiene información del cliente MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_get_client_info()](#mysqli.get-client-info)

    -
     [PDO::getAttribute()](#pdo.getattribute)
     con attribute como **[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version)**

### Descripción

**mysql_get_client_info**(): [string](#language.types.string)

**mysql_get_client_info()** devuelve un string
que representa la versión de la biblioteca cliente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión del cliente MySQL.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_get_client_info()**

&lt;?php
printf("Información del cliente MySQL: %s\n", mysql_get_client_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Información del cliente MySQL: 3.23.39

### Ver también

    - [mysql_get_host_info()](#function.mysql-get-host-info) - Obtener información del anfitrión de MySQL

    - [mysql_get_proto_info()](#function.mysql-get-proto-info) - Obtener información del protocolo MySQL

    - [mysql_get_server_info()](#function.mysql-get-server-info) - Obtiene información del servidor MySQL

# mysql_get_host_info

(PHP 4 &gt;= 4.0.5, PHP 5)

mysql_get_host_info — Obtener información del anfitrión de MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_get_host_info()](#mysqli.get-host-info)

    -
     [PDO::getAttribute()](#pdo.getattribute)
     con attribute como **[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status)**

### Descripción

**mysql_get_host_info**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)|[false](#language.types.singleton)

Describe el tipo de conexión en uso, incluyendo el nombre del
servidor anfitrión.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve un string que describe el tipo de conexión MySQL
en uso, o o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_get_host_info()**

&lt;?php
$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");
if (!$enlace) {
die("No pudo conectarse: " . mysql_error());
}
printf("Información del anfitrión de MySQL: %s\n", mysql_get_host_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Información del anfitrión de MySQL: Localhost via UNIX socket

### Ver también

    - [mysql_get_client_info()](#function.mysql-get-client-info) - Obtiene información del cliente MySQL

    - [mysql_get_proto_info()](#function.mysql-get-proto-info) - Obtener información del protocolo MySQL

    - [mysql_get_server_info()](#function.mysql-get-server-info) - Obtiene información del servidor MySQL

# mysql_get_proto_info

(PHP 4 &gt;= 4.0.5, PHP 5)

mysql_get_proto_info — Obtener información del protocolo MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_get_proto_info()](#mysqli.get-proto-info)

### Descripción

**mysql_get_proto_info**([resource](#language.types.resource) $link_identifier = NULL): [int](#language.types.integer)|[false](#language.types.singleton)

Recupera el protocolo MySQL.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve el protocolo MySQL en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_get_proto_info()**

&lt;?php
$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");
if (!$enlace) {
die("No pudo conectarse: " . mysql_error());
}
printf("Versión del protocolo MySQL: %s\n", mysql_get_proto_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Versión del protocolo MySQL: 10

### Ver también

    - [mysql_get_client_info()](#function.mysql-get-client-info) - Obtiene información del cliente MySQL

    - [mysql_get_host_info()](#function.mysql-get-host-info) - Obtener información del anfitrión de MySQL

    - [mysql_get_server_info()](#function.mysql-get-server-info) - Obtiene información del servidor MySQL

# mysql_get_server_info

(PHP 4 &gt;= 4.0.5, PHP 5)

mysql_get_server_info — Obtiene información del servidor MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_get_server_info()](#mysqli.get-server-info)

    -
     [PDO::getAttribute()](#pdo.getattribute)
     con attribute como **[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version)**

### Descripción

**mysql_get_server_info**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)|[false](#language.types.singleton)

Recupera la versión del servidor MySQL.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve la versión del servidor MySQL en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_get_server_info()**

&lt;?php
$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");
if (!$enlace) {
die("No pudo conectarse: " . mysql_error());
}
printf("Versión del servidor MySQL: %s\n", mysql_get_server_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

Versión del servidor MySQL: 4.0.1-alpha

### Ver también

    - [mysql_get_client_info()](#function.mysql-get-client-info) - Obtiene información del cliente MySQL

    - [mysql_get_host_info()](#function.mysql-get-host-info) - Obtener información del anfitrión de MySQL

    - [mysql_get_proto_info()](#function.mysql-get-proto-info) - Obtener información del protocolo MySQL

    - [phpversion()](#function.phpversion) - Devuelve el número de la versión actual de PHP

# mysql_info

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_info — Obtiene información sobre la consulta más reciente

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_info()](#mysqli.info)

### Descripción

**mysql_info**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)

Devuelve información detallada sobre la última consulta.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuele información sobre la sentencia en caso de éxito, o **[false](#constant.false)** en
caso de error. Vea el ejemplo siguiente para conocer qué sentencias proveen información,
y cuál puede ser la apariencia del valor devuelto. Las sentencias que no están en la lista
devolverán **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Sentencias MySQL Relevantes**



     Sentencias que devuelven valores de tipo cadena. Los números están únicamente
     por propósitos ilustrativos; sus valores corresponderán con la consulta.

INSERT INTO ... SELECT ...
String format: Records: 23 Duplicates: 0 Warnings: 0
INSERT INTO ... VALUES (...),(...),(...)...
String format: Records: 37 Duplicates: 0 Warnings: 0
LOAD DATA INFILE ...
String format: Records: 42 Deleted: 0 Skipped: 0 Warnings: 0
ALTER TABLE
String format: Records: 60 Duplicates: 0 Warnings: 0
UPDATE
String format: Rows matched: 65 Changed: 65 Warnings: 0

### Notas

**Nota**:

    **mysql_info()** devuelve un valor diferente a **[false](#constant.false)** para la
    sentencia INSERT ... VALUES sólo si se indican múltiples listas de valores
    en la sentencia.

### Ver también

    - [mysql_affected_rows()](#function.mysql-affected-rows) - Obtiene el número de filas afectadas en la anterior operación de MySQL

    - [mysql_insert_id()](#function.mysql-insert-id) - Obtiene el ID generado en la última consulta

    - [mysql_stat()](#function.mysql-stat) - Obtiene el estado actual del sistema

# mysql_insert_id

(PHP 4, PHP 5)

mysql_insert_id — Obtiene el ID generado en la última consulta

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_insert_id()](#mysqli.insert-id)

    - [PDO::lastInsertId()](#pdo.lastinsertid)

### Descripción

**mysql_insert_id**([resource](#language.types.resource) $link_identifier = NULL): [int](#language.types.integer)

Recupera el ID generado por la consulta anterior (normalmente INSERT) para
una columna AUTO_INCREMENT.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

El ID generado por la consulta anterior para una columna AUTO_INCREMENT
en caso de éxito, 0 si la consulta
anterior no genera un valor AUTO_INCREMENT, o **[false](#constant.false)** si
no se estableció una conexión MySQL.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_insert_id()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No se pudo conectar: ' . mysql_error());
}
mysql_select_db('mibd');

mysql_query("INSERT INTO mitabla (producto) values ('kossu')");
printf("El último registro insertado tiene el id %d\n", mysql_insert_id());
?&gt;

### Notas

**Precaución**

    **mysql_insert_id()** convertirá el tipo devuelto de la
    función nativa mysql_insert_id() de la API de C de MySQL a un tipo
    long (llamado [int](#language.types.integer) en PHP). Si la
    columna AUTO_INCREMENT tiene un tipo BIGINT (64 bits) la
    conversión puede resultar en un valor incorrecto. En su lugar, use la función de SQL
    interna LAST_INSERT_ID() de MySQL en una consulta SQL. Para más información
    sobre los valores máximos de tipo integer, por favor vea la documentación de
    [integer](#language.types.integer).

**Nota**:

    Como **mysql_insert_id()** actúa en la última consulta realizada,
    asegúrese de llamar a **mysql_insert_id()** inmediatamente
    después de la consulta que genera el valor.

**Nota**:

    El valor de la función de SQL LAST_INSERT_ID()
    de MySQL siempre contiene el valor AUTO_INCREMENT generado más
    recientientemente, y no se restablece
    entre consultas.

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_info()](#function.mysql-info) - Obtiene información sobre la consulta más reciente

# mysql_list_dbs

(PHP 4, PHP 5)

mysql_list_dbs — Lista las bases de datos disponibles en un servidor MySQL

**Advertencia**
Esta función estaba obsoleta
en PHP 5.4.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - Consulta SQL: SHOW DATABASES

### Descripción

**mysql_list_dbs**([resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)

Devuelve un puntero de resultados que contiene las bases de datos disponibles en el
demonio de mysql actual.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve un [resource](#language.types.resource) de puntero de resultados en caso de éxito, o **[false](#constant.false)** en
caso de error. Use la función [mysql_tablename()](#function.mysql-tablename) para atravesar
este puntero de resultado, o cualquier función para obtener tablas, tal como
[mysql_fetch_array()](#function.mysql-fetch-array).

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_list_dbs()**

&lt;?php
// Uso sin mysql_list_dbs()
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$resultado = mysql_query("SHOW DATABASES");

while ($fila = mysql_fetch_assoc($res)) {
echo $fila['Database'] . "\n";
}

// Obsoleto a partir de PHP 5.4.0
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$lista_bd = mysql_list_dbs($enlace);

while ($fila = mysql_fetch_object($lista_bd)) {
echo $fila-&gt;Database . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

basedatos1
basedatos2
basedatos3

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_listdbs()**

### Ver también

    - [mysql_db_name()](#function.mysql-db-name) - Recupera el nombre de la base de datos desde una llamada a mysql_list_dbs

    - [mysql_select_db()](#function.mysql-select-db) - Seleccionar una base de datos MySQL

# mysql_list_fields

(PHP 4, PHP 5)

mysql_list_fields — Lista los campos de una tabla de MySQL

**Advertencia**
Esta función estaba obsoleta
en PHP 5.4.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - Consulta SQL: SHOW COLUMNS FROM alguna_tabla

### Descripción

**mysql_list_fields**([string](#language.types.string) $database_name, [string](#language.types.string) $table_name, [resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)

Devuelve información sobre el nombre de la tabla dado.

Esta función está obsoleta. Es preferible usar
[mysql_query()](#function.mysql-query) para ejecutar una consulta SQL SHOW COLUMNS FROM
tabla [LIKE 'nombre'] en su lugar.

### Parámetros

     database_name


       El nombre de la base de la base de datos que está siendo consultada.






     table_name


       El nombre de la tabla que está siendo consultada.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Un [resource](#language.types.resource) del puntero del resultado en caso de éxito, o **[false](#constant.false)** en
caso de error.

El resultado devuelto puede ser usado con [mysql_field_flags()](#function.mysql-field-flags),
[mysql_field_len()](#function.mysql-field-len),
[mysql_field_name()](#function.mysql-field-name) y
[mysql_field_type()](#function.mysql-field-type).

### Ejemplos

    **Ejemplo #1 Alternativa para la obsoleta mysql_list_fields()**

&lt;?php
$resultado = mysql_query("SHOW COLUMNS FROM alguna_tabla");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}
if (mysql_num_rows($resultado) &gt; 0) {
    while ($fila = mysql_fetch_assoc($resultado)) {
        print_r($fila);
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[Field] =&gt; id
[Type] =&gt; int(7)
[Null] =&gt;
[Key] =&gt; PRI
[Default] =&gt;
[Extra] =&gt; auto_increment
)
Array
(
[Field] =&gt; email
[Type] =&gt; varchar(100)
[Null] =&gt;
[Key] =&gt;
[Default] =&gt;
[Extra] =&gt;
)

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_listfields()**

### Ver también

    - [mysql_field_flags()](#function.mysql-field-flags) - Obtiene las banderas asociadas al campo especificado de un resultado

    - [mysql_info()](#function.mysql-info) - Obtiene información sobre la consulta más reciente

# mysql_list_processes

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_list_processes — Lista los procesos de MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_thread_id()](#mysqli.thread-id)

### Descripción

**mysql_list_processes**([resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)|[false](#language.types.singleton)

Recupera los hilos del servidor MySQL actuales.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Un puntero de resultados de tipo [resource](#language.types.resource) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_list_processes()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');

$resultado = mysql_list_processes($enlace);

while ($fila = mysql_fetch_assoc($resultado)){
printf("%s %s %s %s %s\n", $fila["Id"], $fila["Host"], $fila["db"],
        $fila["Command"], $fila["Time"]);
}
mysql_free_result($resultado);
?&gt;

    Resultado del ejemplo anterior es similar a:

1 localhost test Processlist 0
4 localhost mysql sleep 5

### Ver también

    - [mysql_thread_id()](#function.mysql-thread-id) - Devuelve el ID del hilo actual

    - [mysql_stat()](#function.mysql-stat) - Obtiene el estado actual del sistema

# mysql_list_tables

(PHP 4, PHP 5)

mysql_list_tables — Lista las tablas de una base de datos MySQL

**Advertencia**
Esta función estaba obsoleta
en PHP 4.3.0, y toda la [extensión original MySQL](#book.mysql) fue eliminada en PHP 7.0.0.
En su lugar, se puede utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también [MySQL: elegir
una API](#mysqlinfo.api.choosing) de la guía. Alternativas a esta función:

    - Consulta SQL: SHOW TABLES FROM dbname

### Descripción

**mysql_list_tables**([string](#language.types.string) $database, [resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)|[false](#language.types.singleton)

Lista las tablas de una base de datos MySQL especificada.

Esta función está deprecada. Es preferible utilizar la función
[mysql_query()](#function.mysql-query) para ejecutar la consulta SQL SHOW TABLES
[FROM db_name] [LIKE 'pattern'] en su lugar.

### Parámetros

     database


       El nombre de la base de datos





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Un recurso de punteros de resultados en caso de éxito o **[false](#constant.false)** si ocurre un error.

Utilice la función [mysql_tablename()](#function.mysql-tablename)
para recorrer este puntero de resultados o cualquier otra función
para los resultados de tablas, como la función
[mysql_fetch_array()](#function.mysql-fetch-array).

### Ejemplos

    **Ejemplo #1 Ejemplo de alternativa a mysql_list_tables()**

&lt;?php
$dbname = 'mysql_dbname';

if (!mysql_connect('mysql_host', 'mysql_user', 'mysql_password')) {
echo 'No es posible conectarse a MySQL';
exit;
}

$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
echo "Error DB, no es posible listar las tablas\n";
echo 'Error MySQL : ' . mysql_error();
exit;
}

while ($row = mysql_fetch_row($result)) {
echo "Tabla : {$row[0]}\n";
}

mysql_free_result($result);
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_listtables()**

### Ver también

    - [mysql_list_dbs()](#function.mysql-list-dbs) - Lista las bases de datos disponibles en un servidor MySQL

    - [mysql_tablename()](#function.mysql-tablename) - Obtiene el nombre de la tabla de un campo

# mysql_num_fields

(PHP 4, PHP 5)

mysql_num_fields — Obtiene el número de campos de un resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_num_fields()](#mysqli-result.field-count)

    - [PDOStatement::columnCount()](#pdostatement.columncount)

### Descripción

**mysql_num_fields**([resource](#language.types.resource) $result): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de campos de una consulta.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

Devuelve el número de campos del [resource](#language.types.resource) de conjunto de resultados en
caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_num_fields()**

&lt;?php
$resultado = mysql_query("SELECT id,email FROM people WHERE id = '42'");
if (!$resultado) {
echo 'No se pudo ejecutar la consulta: ' . mysql_error();
exit;
}

/_ devuelve 2 ya que id,email === dos campos _/
echo mysql_num_fields($resultado);
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_numfields()**

### Ver también

    - [mysql_select_db()](#function.mysql-select-db) - Seleccionar una base de datos MySQL

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

    - [mysql_fetch_field()](#function.mysql-fetch-field) - Obtiene la información de una columna de un resultado y la devuelve como un objeto

    - [mysql_num_rows()](#function.mysql-num-rows) - Obtener el número de filas de un conjunto de resultados

# mysql_num_rows

(PHP 4, PHP 5)

mysql_num_rows — Obtener el número de filas de un conjunto de resultados

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_num_rows()](#mysqli-result.num-rows)

    - [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows)

    - [PDOStatement::rowCount()](#pdostatement.rowcount)

### Descripción

**mysql_num_rows**([resource](#language.types.resource) $result): [int](#language.types.integer)|[false](#language.types.singleton)

Recupera el número de filas de un conjunto de resultados. Este comando es únicamente válido
para sentencias como SELECT o SHOW que retornan un conjunto de resultados real.
Para recuperar el número de filas afectadas por una consulta INSERT, UPDATE, REPLACE o
DELETE, use [mysql_affected_rows()](#function.mysql-affected-rows).

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

### Valores devueltos

El número de filas de un conjunto de resultados en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_num_rows()**

&lt;?php

$enlace = mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");
mysql_select_db("basedatos", $enlace);

$resultado = mysql_query("SELECT * FROM tabla1", $enlace);
$número_filas = mysql_num_rows($resultado);

echo "$número_filas Filas\n";

?&gt;

### Notas

**Nota**:

    Si se utiliza [mysql_unbuffered_query()](#function.mysql-unbuffered-query),
    **mysql_num_rows()** no retornará el valor correcto
    hasta que se hayan recuperado todas las filas del conjunto de
    resultados.

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_numrows()**

### Ver también

    - [mysql_affected_rows()](#function.mysql-affected-rows) - Obtiene el número de filas afectadas en la anterior operación de MySQL

    - [mysql_connect()](#function.mysql-connect) - Abre una conexión al servidor MySQL

    - [mysql_data_seek()](#function.mysql-data-seek) - Mueve el puntero de resultados interno

    - [mysql_select_db()](#function.mysql-select-db) - Seleccionar una base de datos MySQL

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

# mysql_pconnect

(PHP 4, PHP 5)

mysql_pconnect — Abre una conexión persistente a un servidor MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_connect()](#function.mysqli-connect) con p: host prefix

    - [PDO::__construct()](#pdo.construct) con **[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent)** como una opción de controlador

### Descripción

**mysql_pconnect**(
    [string](#language.types.string) $server = ini_get("mysql.default_host"),
    [string](#language.types.string) $username = ini_get("mysql.default_user"),
    [string](#language.types.string) $password = ini_get("mysql.default_password"),
    [int](#language.types.integer) $client_flags = 0
): [resource](#language.types.resource)

Establece una conexión persistente a un servidor MySQL.

**mysql_pconnect()** se parece mucho a
[mysql_connect()](#function.mysql-connect) con dos grandes diferencias.

En primer lugar, cuando se conecta, la función primero intenta encontrar un
enlace (persistente) que ya esté abierto con el mismo anfitrión,
nombre de usuario y contraseña. Si se encuentra uno, se devolverá un identificador
para él, en lugar de abrir una nueva conexión.

Segundo, la conexión al servidor SQL no será cerrada cuando
la ejecución del script finalice. En su lugar, el enlace permanecerá
abierto para su uso futuro ([mysql_close()](#function.mysql-close) no
cerrará los enlaces establecidos mediante **mysql_pconnect()**).

Por eso a este tipo de enlace se le llama 'persistente'.

### Parámetros

     server


       El servidor de MySQL. También puede incluir un número de puerto. P.ej.
       "nombre_anfitrión:puerto" o una ruta a un socket local, p.ej. ":/ruta/al/socket" para
       el localhost.




       Si la directiva de PHP [
       mysql.default_host](#ini.mysql.default-host) no se ha definido (predeterminado), entonces el
       valor por defecto es 'localhost:3306'






     username


       El nombre de usuario. El valor por defecto es el nombre del usuario al que pertenece el
       proceso del servidor.






     password


       La contraseña. El valor por defecto es una contraseña vacia.






     client_flags


       El parámetro client_flags puede ser una combinación
       de las siguientes constantes:
       128 (habilita el manejo de LOAD DATA LOCAL),
       **[MYSQL_CLIENT_SSL](#constant.mysql-client-ssl)**,
       **[MYSQL_CLIENT_COMPRESS](#constant.mysql-client-compress)**,
       **[MYSQL_CLIENT_IGNORE_SPACE](#constant.mysql-client-ignore-space)** o
       **[MYSQL_CLIENT_INTERACTIVE](#constant.mysql-client-interactive)**.





### Valores devueltos

Devuelve un identificador de enlace persistente a MySQL en caso de éxito o **[false](#constant.false)** en
caso de error.

### Notas

**Nota**:

    Tenga en cuenta que este tipo de enlaces solo funcionan si se está usando
    una versión de  módulo de PHP. Véase la
    sección [Conexiones
    persistentes a bases de datos](#features.persistent-connections) para más información.

**Advertencia**

    El uso de conexiones persistentes puede requerir ajustar un poco las configuraciones
    de Apache y de MySQL para asegurarse de que no se excede el número de conexiones
    permitidas por MySQL.

### Ver también

    - [mysql_connect()](#function.mysql-connect) - Abre una conexión al servidor MySQL

    - [Conexiones
     persistentes a bases de datos](#features.persistent-connections)

# mysql_ping

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_ping — Efectuar un chequeo de respuesta (ping) sobre una conexión al servidor o reconectarse si no hay conexión

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_ping()](#mysqli.ping)

### Descripción

**mysql_ping**([resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

Chequea si está activa o no la conexión con
el servidor. Si ésta se ha caído, se intenta una reconexión
automática. Esta función puede ser usada por scripts que permanecen pasivos
durante largos espacios de tiempo, para chequear si el servidor ha cerrado la conexión
y reconectarse de ser necesario.

**Nota**:

    La reconexión automática está deshabilitada de forma predeterminada en versiones de MySQL &gt;= 5.0.3.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve **[true](#constant.true)** si la conexión con el servidor MySQL está funcionando, o
**[false](#constant.false)** si no.

### Ejemplos

    **Ejemplo #1 Un ejemplo de mysql_ping()**

&lt;?php
set_time_limit(0);

$conexión = mysql_connect('localhost', 'usuario_mysql', 'contraseña');
$bd = mysql_select_db('mi_bd');

/_ Se asume que esta consulta toma mucho tiempo _/
$resultado = mysql_query($sql);
if (!$resultado) {
echo 'La consulta #1 falló; Saliendo.';
exit;
}

/_ Asegurarse de que la conexión sigue viva, si no, intentar una reconexión _/
if (!mysql_ping($conexión)) {
    echo 'Se ha perdido la conexión, saliendo después de la consulta #1';
    exit;
}
mysql_free_result($resultado);

/_ Ya que la conexión sigue viva, ejecutemos otra consulta _/
$resultado2 = mysql_query($sql2);
?&gt;

### Ver también

    - [mysql_thread_id()](#function.mysql-thread-id) - Devuelve el ID del hilo actual

    - [mysql_list_processes()](#function.mysql-list-processes) - Lista los procesos de MySQL

# mysql_query

(PHP 4, PHP 5)

mysql_query — Enviar una consulta MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_query()](#mysqli.query)

    - [PDO::query()](#pdo.query)

### Descripción

**mysql_query**([string](#language.types.string) $query, [resource](#language.types.resource) $link_identifier = NULL): [mixed](#language.types.mixed)

**mysql_query()** envía una única consulta (no hay soporte para
múltiples consultas) a la base de datos
actualmente activa en el servidor asociado con el
identificador de enlace especificado por link_identifier.

### Parámetros

     query


       Una consulta SQL




       El string de la consulta no debería terminar con un punto y coma.
       Los datos insertados en la consulta deberían estar [correctamente escapados](#function.mysql-real-escape-string).





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Para SELECT, SHOW, DESCRIBE, EXPLAIN y otras sentencias que retornan un conjunto de resultados,
**mysql_query()**
devuelve un [resource](#language.types.resource) en caso de éxito, o **[false](#constant.false)** en caso de
error.

Para otros tipos de sentencias SQL, tales como INSERT, UPDATE, DELETE, DROP, etc,
**mysql_query()** devuelve **[true](#constant.true)** en caso de éxito
o **[false](#constant.false)** en caso de error.

El conjunto de resultados devuelto debería ser pasado a
[mysql_fetch_array()](#function.mysql-fetch-array), y otras
funciones para manejar las tablas del resultado, para acceder a los datos retornados.

Use [mysql_num_rows()](#function.mysql-num-rows) para averiguar cuántas filas
fueron devueltas por la sentencia SELECT, o
[mysql_affected_rows()](#function.mysql-affected-rows) para averiguar cuántas
filas fueron afectadas por las sentencias DELETE, INSERT, REPLACE,
o UPDATE.

**mysql_query()** también fallará y retornará **[false](#constant.false)**
si el usuario no está autorizado para acceder a la/s tabla/s a la/s que hace
referencia la consulta.

### Ejemplos

    **Ejemplo #1 Consulta inválida**



     La siguiente consulta no es sintácticamente válida, por lo que
     **mysql_query()** fallará y retornará **[false](#constant.false)**.

&lt;?php
$resultado = mysql_query('SELECT * WHERE 1=1');
if (!$resultado) {
die('Consulta no válida: ' . mysql_error());
}

?&gt;

    **Ejemplo #2 Consulta válida**



     La siguiente consulta es válida, por lo que **mysql_query()**
     retornará un [resource](#language.types.resource).

&lt;?php
// Lo siguiente podría ser proporcionado por un usuario, como por ejemplo
$nombre = 'fred';
$apellido = 'fox';

// Formular la consulta
// Este es el mejor método para formular una consulta SQL
// Para más ejemplos, consulte mysql_real_escape_string()
$consulta = sprintf("SELECT nombre, apellido, direccion, edad FROM amigos
    WHERE nombre='%s' AND apellido='%s'",
    mysql_real_escape_string($nombre),
mysql_real_escape_string($apellido));

// Ejecutar la consulta
$resultado = mysql_query($consulta);

// Comprobar el resultado
// Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
if (!$resultado) {
    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $consulta;
    die($mensaje);
}

// Usar el resultado
// Si se intenta imprimir $resultado no será posible acceder a la información del recurso
// Se debe usar una de las funciones de resultados de mysql
// Consulte también mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($fila = mysql_fetch_assoc($resultado)) {
echo $fila['nombre'];
echo $fila['apellido'];
echo $fila['direccion'];
echo $fila['edad'];
}

// Liberar los recursos asociados con el conjunto de resultados
// Esto se ejecutado automáticamente al finalizar el script.
mysql_free_result($resultado);
?&gt;

### Ver también

    - [mysql_connect()](#function.mysql-connect) - Abre una conexión al servidor MySQL

    - [mysql_error()](#function.mysql-error) - Devuelve el texto del mensaje de error de la operación MySQL anterior

    - [mysql_real_escape_string()](#function.mysql-real-escape-string) - Escapa caracteres especiales en una cadena para su uso en una sentencia SQL

    - [mysql_result()](#function.mysql-result) - Obtener datos de resultado

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_unbuffered_query()](#function.mysql-unbuffered-query) - Envía una consulta SQL a MySQL, sin recuperar ni almacenar en búfer las filas de resultados

# mysql_real_escape_string

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_real_escape_string — Escapa caracteres especiales en una cadena para su uso en una sentencia SQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_real_escape_string()](#mysqli.real-escape-string)

    - [PDO::quote()](#pdo.quote)

### Descripción

**mysql_real_escape_string**([string](#language.types.string) $unescaped_string, [resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)

Escapa caracteres especiales en la cadena dada por unescaped_string,
teniendo en cuenta el conjunto de caracteres en uso de la conexión, para que
sea seguro usarla en [mysql_query()](#function.mysql-query). Si se van a insertar
datos binarios, se ha de usar esta función.

**mysql_real_escape_string()** llama a la función mysql_real_escape_string
de la biblioteca de MySQL, la cual antepone barras invertidas a los siguientes caracteres:
\x00, \n,
\r, \, ',
" y \x1a.

Esta función siempre debe usarse (con pocas excepciones) para hacer seguros
los datos antes de enviar una consulta a MySQL.

**Precaución**

# Seguridad: el conjunto de caracters predeterminado

    El conjunto de caracteres debe ser establecido o bien a nivel del servidor, o bien con
    la función [mysql_set_charset()](#function.mysql-set-charset) de la API para que afecte a
    **mysql_real_escape_string()**. Véase la sección sobre los conceptos
    de [conjuntos de caracters](#mysqlinfo.concepts.charset) para
    más información.

### Parámetros

     unescaped_string


       La cadena a escapar.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve la cadena escapada, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

Ejecutar esta función sin una conexión de MySQL presente también
emitirá errores de nivel **[E_WARNING](#constant.e-warning)** de PHP. Solo
se ha de ejecutar con una conexión de MySQL válida presente.

### Ejemplos

    **Ejemplo #1 Ejemplo sencillo de mysql_real_escape_string()**

&lt;?php
// Conexión
$enlace = mysql_connect('anfitrión_mysql', 'usuario_mysql', 'contraseña_mysql')
OR die(mysql_error());

// Consulta
$consulta = sprintf("SELECT * FROM users WHERE user='%s' AND password='%s'",
            mysql_real_escape_string($usuario),
mysql_real_escape_string($contraseña));
?&gt;

    **Ejemplo #2 mysql_real_escape_string()** requiere una conexión



     Este ejemplo muestra lo que sucede si no hay presente una conexión
     de MySQL al invocar a esta función.

&lt;?php
// No nos hemos conectado a MySQL

$apellido  = "O'Reilly";
$\_apellido = mysql_real_escape_string($apellido);

$consulta = "SELECT * FROM actors WHERE last_name = '$\_apellido'";

var_dump($_apellido);
var_dump($consulta);
?&gt;

    Resultado del ejemplo anterior es similar a:

Warning: mysql_real_escape_string(): No such file or directory in /this/test/script.php on line 5
Warning: mysql_real_escape_string(): A link to the server could not be established in /this/test/script.php on line 5

bool(false)
string(41) "SELECT \* FROM actors WHERE last_name = ''"

    **Ejemplo #3 Un ejemplo de ataque de inyección de SQL**

&lt;?php
// No hemos comprobado $_POST['password'], ¡podría ser cualquier cosa que el usuario quisiera! Por ejemplo:
$\_POST['username'] = 'aidan';
$\_POST['password'] = "' OR ''='";

// Consultar la base de datos para comprobar si existe algún usuario que coincida
$consulta = "SELECT * FROM users WHERE user='{$\_POST['username']}' AND password='{$_POST['password']}'";
mysql_query($consulta);

// Esto significa que la consulta enviada a MySQL sería:
echo $consulta;
?&gt;

     La consulta enviada a MySQL:

SELECT \* FROM users WHERE user='aidan' AND password='' OR ''=''

     Esto permitiría a alguien acceder a una sesión sin una contraseña válida.

### Notas

**Nota**:

    Se requiere una conexión a MySQL antes de usar
    **mysql_real_escape_string()**, si no, se generará
    un error de nivel **[E_WARNING](#constant.e-warning)**, y se devolverá **[false](#constant.false)**.
    Si link_identifier no está definido, se
    usará la última conexión a MySQL.

**Nota**:

    Si esta función no se utiliza para escapar los datos, la consulta es vulnerable a
    [Ataques de inyección SQL](#security.database.sql-injection).

**Nota**:

    **mysql_real_escape_string()** no escapa
    % ni _. Estos son comodines en
    MySQL si se combinan con LIKE, GRANT,
    o REVOKE.

### Ver también

    - [mysql_set_charset()](#function.mysql-set-charset) - Establece el conjunto de caracteres del cliente

    - [mysql_client_encoding()](#function.mysql-client-encoding) - Devuelve el nombre del conjunto de caracteres

# mysql_result

(PHP 4, PHP 5)

mysql_result — Obtener datos de resultado

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    -
     [mysqli_data_seek()](#mysqli-result.data-seek) junto con
     [mysqli_field_seek()](#mysqli-result.field-seek) y
     [mysqli_fetch_field()](#mysqli-result.fetch-field)


    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn)

### Descripción

**mysql_result**([resource](#language.types.resource) $result, [int](#language.types.integer) $row, [mixed](#language.types.mixed) $field = 0): [string](#language.types.string)

Recupera el contenido de una celda de un conjunto de resultados de MySQL.

Cuando se esté trabajando con conjuntos de resultados grandes, se debería considerar usar una
de las funciones que obtienen una fila completa (especificadas más abajo). Debido a que
estas funciones retornan el contenido de múltiples celdas en una única
llamada a función, son MUCHO MÁS rápidas que
**mysql_result()**. Además, se ha de tener en cuenta que la especificación
de un índice numérico para el campo pasado como argumento es mucho más rápido que
especificar un nombre de campo o el argumento nombre_tabla.nombre_campo.

### Parámetros

result
La [resource](#language.types.resource) de resultado que acaba de ser evaluada.
Este resultado proviene de la llamada a la función [mysql_query()](#function.mysql-query).

     row


       El número de fila del conjunto de resultados que está siendo recuperado. El número de filas
       empieza a partir de 0.






     field


       El nombre o el índice del campo que está siendo recuperado.




       Puede ser el índice del campo, el nombre del campo, o el nombre de la tabla
       punto nombre del campo (nombre_tabla.nombre_campo). Si se ha utilizado un alias
       para el nombre de la columna ('select foo as bar from...'), utilice el alias en lugar
       del nombre del campo. Si no está definido, se recuperará el primer campo.





### Valores devueltos

El contenido de una celda de un conjunto de resultados de MySQL en caso de éxito, o
**[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_result()**

&lt;?php
$enlace = mysql_connect('anfitrión_mysql', 'usuario_mysql', 'contraseña_mysql');
if (!$enlace) {
die('No se pudo conectar: ' . mysql_error());
}
if (!mysql_select_db('nombre_base_datos')) {
die('No se pudo seleccionar la base de datos: ' . mysql_error());
}
$resultado = mysql_query('SELECT name FROM work.employee');
if (!$resultado) {
die('No se pudo consultar:' . mysql_error());
}
echo mysql_result($resultado, 2); // imprime el nombre del tercer empleado

mysql_close($enlace);
?&gt;

### Notas

**Nota**:

    Las llamadas a **mysql_result()** no deberían ser mezcladas
    con llamadas a otras funciones que manejen conjuntos de resultados.

### Ver también

    - [mysql_fetch_row()](#function.mysql-fetch-row) - Obtiene una fila de resultados como un array numérico

    - [mysql_fetch_array()](#function.mysql-fetch-array) - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos

    - [mysql_fetch_assoc()](#function.mysql-fetch-assoc) - Recupera una fila de resultados como un array asociativo

    - [mysql_fetch_object()](#function.mysql-fetch-object) - Recupera una fila de resultados como un objeto

# mysql_select_db

(PHP 4, PHP 5)

mysql_select_db — Seleccionar una base de datos MySQL

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_select_db()](#mysqli.select-db)

    - [PDO::__construct()](#pdo.construct) (parte de dsn)

### Descripción

**mysql_select_db**([string](#language.types.string) $database_name, [resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

Establece la base de datos activa actual en el servidor asociado con el
identificador de enlace especificado. Cada llamada posterior a
[mysql_query()](#function.mysql-query) será ejecutada en la base de datos activa.

### Parámetros

     database_name


       El nombre de la base de datos que va a ser seleccionada.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo mysql_select_db()**

&lt;?php

$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_myql');
if (!$enlace) {
die('No se pudo conectar : ' . mysql_error());
}

// Hacer que foo sea la base de datos actual
$bd_seleccionada = mysql_select_db('foo', $enlace);
if (!$bd_seleccionada) {
die ('No se puede usar foo : ' . mysql_error());
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**mysql_selectdb()**

### Ver también

    - [mysql_connect()](#function.mysql-connect) - Abre una conexión al servidor MySQL

    - [mysql_pconnect()](#function.mysql-pconnect) - Abre una conexión persistente a un servidor MySQL

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

# mysql_set_charset

(PHP 5 &gt;= 5.2.3)

mysql_set_charset — Establece el conjunto de caracteres del cliente

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_set_charset()](#mysqli.set-charset)

    - PDO: Añadir charset al string de conexión, tal como charset=utf8

### Descripción

**mysql_set_charset**([string](#language.types.string) $charset, [resource](#language.types.resource) $link_identifier = NULL): [bool](#language.types.boolean)

Establece el conjunto de caracteres predeterminado para la conexión actual.

### Parámetros

     charset


       Un nombre válido de un conjunto de caracteres.





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    Esta función requiere MySQL 5.0.7 o posterior.

**Nota**:

    Esta es la mejor forma de cambiar el conjunto de caracteres. El uso de
    [mysql_query()](#function.mysql-query) para establecerlo (como SET NAMES utf8)
    no es recomendable. Véase la sección [conceptos de conjuntos de caracteres de MySQL](#mysqlinfo.concepts.charset)
    para más información.

### Ver también

    - [Establecer conjuntos de caracteres en MySQL](#mysqlinfo.concepts.charset)

    - [» Listado de los conjuntos de caracteres admitidos por MySQL](http://dev.mysql.com/doc/mysql/en/charset-charsets.html)

    - [mysql_client_encoding()](#function.mysql-client-encoding) - Devuelve el nombre del conjunto de caracteres

# mysql_stat

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_stat — Obtiene el estado actual del sistema

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_stat()](#mysqli.stat)

    -
     [PDO::getAttribute()](#pdo.getattribute)
     con attribute como **[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info)**

### Descripción

**mysql_stat**([resource](#language.types.resource) $link_identifier = NULL): [string](#language.types.string)

**mysql_stat()** devuelve el estado actual del servidor.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Devuelve un string con el estado del tiempo de funcionamiento, hilos, consultas, tablas abiertas,
tablas de volcado y consultas por segundo. Para obtener una lista completa de variables de
estado, es necesario usar el comando SQL SHOW STATUS.
Si link_identifier no es válido, se devuelve **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_stat()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$estado = explode(' ', mysql_stat($enlace));
print_r($estado);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Uptime: 5380
[1] =&gt; Threads: 2
[2] =&gt; Questions: 1321299
[3] =&gt; Slow queries: 0
[4] =&gt; Opens: 26
[5] =&gt; Flush tables: 1
[6] =&gt; Open tables: 17
[7] =&gt; Queries per second avg: 245.595
)

    **Ejemplo #2 Ejemplo alternativo de mysql_stat()**

&lt;?php
$enlace    = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$resultado = mysql_query('SHOW STATUS', $enlace);
while ($fila = mysql_fetch_assoc($resultado)) {
echo $fila['Nombre_variable'] . ' = ' . $fila['Valor'] . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

back_log = 50
basedir = /usr/local/
bdb_cache_size = 8388600
bdb_log_buffer_size = 32768
bdb_home = /var/db/mysql/
bdb_max_lock = 10000
bdb_logdir =
bdb_shared_data = OFF
bdb_tmpdir = /var/tmp/
...

### Ver también

    - [mysql_get_server_info()](#function.mysql-get-server-info) - Obtiene información del servidor MySQL

    - [mysql_list_processes()](#function.mysql-list-processes) - Lista los procesos de MySQL

# mysql_tablename

(PHP 4, PHP 5)

mysql_tablename — Obtiene el nombre de la tabla de un campo

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - Consulta SQL: SHOW TABLES

### Descripción

**mysql_tablename**([resource](#language.types.resource) $result, [int](#language.types.integer) $i): [string](#language.types.string)|[false](#language.types.singleton)

Recupera el nombre de tabla desde un resultado dado por result.

Esta función está obsoleta. Es preferible usar
[mysql_query()](#function.mysql-query) para ejecutar una consulta SQL SHOW TABLES
[FROM nombre_bd] [LIKE 'patrón'] en su lugar.

### Parámetros

     result


       Un [resource](#language.types.resource) de puntero de resultados que se devuelve desde
       [mysql_list_tables()](#function.mysql-list-tables).






     i


       El índice de tipo integer (número de fila/tabla)





### Valores devueltos

El nombre de la tabla en caso de éxito o **[false](#constant.false)** si ocurre un error.

Use la función **mysql_tablename()** para
atravesar este puntero de resultados, o cualquier función para obtener tablas,
tal como [mysql_fetch_array()](#function.mysql-fetch-array).

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_tablename()**

&lt;?php
mysql_connect("localhost", "usuario_mysql", "contraseña_mysql");
$resultado = mysql_list_tables("mibd");
$número_filas = mysql_num_rows($resultado);
for ($i = 0; $i &lt; $número_filas; $i++) {
    echo "Tabla: ", mysql_tablename($resultado, $i), "\n";
}

mysql_free_result($resultado);
?&gt;

### Notas

**Nota**:

    La función [mysql_num_rows()](#function.mysql-num-rows) puede ser usada para
    determinar el número de tablas del puntero de resultados.

### Ver también

    - [mysql_list_tables()](#function.mysql-list-tables) - Lista las tablas de una base de datos MySQL

    - [mysql_field_table()](#function.mysql-field-table) - Obtiene el nombre de la tabla en la que está el campo especificado

    - [mysql_db_name()](#function.mysql-db-name) - Recupera el nombre de la base de datos desde una llamada a mysql_list_dbs

# mysql_thread_id

(PHP 4 &gt;= 4.3.0, PHP 5)

mysql_thread_id — Devuelve el ID del hilo actual

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - [mysqli_thread_id()](#mysqli.thread-id)

### Descripción

**mysql_thread_id**([resource](#language.types.resource) $link_identifier = NULL): [int](#language.types.integer)|[false](#language.types.singleton)

Recupera el ID del hilo actual. Si la conexión se ha perdido, y se ejecuta una
reconexión con [mysql_ping()](#function.mysql-ping), el ID del hilo
cambiará. Esto quiere decir que sólo se ha de recuperar el ID del hilo cuando sea necesario.

### Parámetros

link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

El ID del hilo en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de mysql_thread_id()**

&lt;?php
$enlace = mysql_connect('localhost', 'usuario_mysql', 'contraseña_mysql');
$id_hilo = mysql_thread_id($enlace);
if ($id_hilo){
printf("El ID del hilo actual es %d\n", $id_hilo);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

El ID del hilo actual es 73

### Ver también

    - [mysql_ping()](#function.mysql-ping) - Efectuar un chequeo de respuesta (ping) sobre una conexión al servidor o reconectarse si no hay conexión

    - [mysql_list_processes()](#function.mysql-list-processes) - Lista los procesos de MySQL

# mysql_unbuffered_query

(PHP 4 &gt;= 4.0.6, PHP 5)

mysql_unbuffered_query — Envía una consulta SQL a MySQL, sin recuperar ni almacenar en búfer las filas de resultados

**Advertencia**
Esta extensión
estaba obsoleta en PHP 5.5.0, y fue eliminada en PHP 7.0.0. En su lugar, se puede
utilizar la extensión [MySQLi](#book.mysqli) o la extensión
[PDO_MySQL](#ref.pdo-mysql). Ver también
[MySQL: elegir una API](#mysqlinfo.api.choosing) de la guía.
Alternativas a esta función:

    - See: [Consultas almacenadas y no almacenadas en buffer](#mysqlinfo.concepts.buffering)

### Descripción

**mysql_unbuffered_query**([string](#language.types.string) $query, [resource](#language.types.resource) $link_identifier = NULL): [resource](#language.types.resource)

**mysql_unbuffered_query()** envía la consulta SQL
query a MySQL, sin recuperar ni almacenar automáticamente
en búfer las filas de resultados, como
[mysql_query()](#function.mysql-query) lo hace. Esto ahorra una considerable
cantidad de memoria con las consultas SQL que producen conjuntos de resultados grandes,
y se puede empezar a trabajar con el conjunto de resultados inmediatamente después de
que la primera fila haya sido recuperada, ya que no es necesario esperar hasta que la
consulta SQL completa haya sido ejecutada. Para usar
**mysql_unbuffered_query()** mientras están abiertas
múltiples conexiones a la base de datos, se debe especificar el parámetro opcional
link_identifier para identificar qué conexión
se desea utilizar.

### Parámetros

     query


       La consulta SQL a ejecutar.




       Los datos dentro de la consulta deben estar [propiamente escapados](#function.mysql-real-escape-string).





link_identifier
La conexión MySQL.
Si no se especifica, se utilizará la última conexión abierta con la función
[mysql_connect()](#function.mysql-connect). Si no se encuentra una conexión de este tipo,
la función intentará abrir una conexión, como si la función [mysql_connect()](#function.mysql-connect) hubiera sido llamada sin argumento.
Si no se encuentra o establece una conexión, se generará una alerta de nivel
**[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Para sentencias SELECT, SHOW, DESCRIBE o EXPLAIN,
**mysql_unbuffered_query()**
devuelve un [resource](#language.types.resource) en caso de éxito, o **[false](#constant.false)** en caso
de error.

Para otro tipo de sentencias SQL, UPDATE, DELETE, DROP, etc,
**mysql_unbuffered_query()** devuelve **[true](#constant.true)** en caso de éxito
o **[false](#constant.false)** en caso de error.

### Notas

**Nota**:

    Los beneficios de **mysql_unbuffered_query()** tienen
    un precio: no se puede usar [mysql_num_rows()](#function.mysql-num-rows) ni
    [mysql_data_seek()](#function.mysql-data-seek) en un conjunto de resultados devuelto por
    **mysql_unbuffered_query()**, hasta que todas las filas sean recuperadas.
    También se tendrán que recuperar todas las filas de resultados de una consulta SQL no almacenada en búfer
    antes de poder enviar una nueva consulta SQL a MySQL, usando el mismo
    link_identifier.

### Ver también

    - [mysql_query()](#function.mysql-query) - Enviar una consulta MySQL

## Tabla de contenidos

- [mysql_affected_rows](#function.mysql-affected-rows) — Obtiene el número de filas afectadas en la anterior operación de MySQL
- [mysql_client_encoding](#function.mysql-client-encoding) — Devuelve el nombre del conjunto de caracteres
- [mysql_close](#function.mysql-close) — Cerrar una conexión de MySQL
- [mysql_connect](#function.mysql-connect) — Abre una conexión al servidor MySQL
- [mysql_create_db](#function.mysql-create-db) — Crea una base de datos MySQL
- [mysql_data_seek](#function.mysql-data-seek) — Mueve el puntero de resultados interno
- [mysql_db_name](#function.mysql-db-name) — Recupera el nombre de la base de datos desde una llamada a mysql_list_dbs
- [mysql_db_query](#function.mysql-db-query) — Selecciona una base de datos y ejecuta una consulta sobre la misma
- [mysql_drop_db](#function.mysql-drop-db) — Elimina (DROP) una base de datos MySQL
- [mysql_errno](#function.mysql-errno) — Devuelve el valor numérico del mensaje de error de la última operación MySQL
- [mysql_error](#function.mysql-error) — Devuelve el texto del mensaje de error de la operación MySQL anterior
- [mysql_escape_string](#function.mysql-escape-string) — Escapa una cadena para ser usada en mysql_query
- [mysql_fetch_array](#function.mysql-fetch-array) — Recupera una fila de resultados como un array asociativo, un array numérico o como ambos
- [mysql_fetch_assoc](#function.mysql-fetch-assoc) — Recupera una fila de resultados como un array asociativo
- [mysql_fetch_field](#function.mysql-fetch-field) — Obtiene la información de una columna de un resultado y la devuelve como un objeto
- [mysql_fetch_lengths](#function.mysql-fetch-lengths) — Obtiene la longitud de cada salida en un resultado
- [mysql_fetch_object](#function.mysql-fetch-object) — Recupera una fila de resultados como un objeto
- [mysql_fetch_row](#function.mysql-fetch-row) — Obtiene una fila de resultados como un array numérico
- [mysql_field_flags](#function.mysql-field-flags) — Obtiene las banderas asociadas al campo especificado de un resultado
- [mysql_field_len](#function.mysql-field-len) — Devuelve la longitud del campo especificado
- [mysql_field_name](#function.mysql-field-name) — Obtiene el nombre del campo especificado de un resultado
- [mysql_field_seek](#function.mysql-field-seek) — Establece el puntero del resultado en un índice de campo específicado
- [mysql_field_table](#function.mysql-field-table) — Obtiene el nombre de la tabla en la que está el campo especificado
- [mysql_field_type](#function.mysql-field-type) — Obtiene el tipo del campo especificado de un resultado
- [mysql_free_result](#function.mysql-free-result) — Libera la memoria del resultado
- [mysql_get_client_info](#function.mysql-get-client-info) — Obtiene información del cliente MySQL
- [mysql_get_host_info](#function.mysql-get-host-info) — Obtener información del anfitrión de MySQL
- [mysql_get_proto_info](#function.mysql-get-proto-info) — Obtener información del protocolo MySQL
- [mysql_get_server_info](#function.mysql-get-server-info) — Obtiene información del servidor MySQL
- [mysql_info](#function.mysql-info) — Obtiene información sobre la consulta más reciente
- [mysql_insert_id](#function.mysql-insert-id) — Obtiene el ID generado en la última consulta
- [mysql_list_dbs](#function.mysql-list-dbs) — Lista las bases de datos disponibles en un servidor MySQL
- [mysql_list_fields](#function.mysql-list-fields) — Lista los campos de una tabla de MySQL
- [mysql_list_processes](#function.mysql-list-processes) — Lista los procesos de MySQL
- [mysql_list_tables](#function.mysql-list-tables) — Lista las tablas de una base de datos MySQL
- [mysql_num_fields](#function.mysql-num-fields) — Obtiene el número de campos de un resultado
- [mysql_num_rows](#function.mysql-num-rows) — Obtener el número de filas de un conjunto de resultados
- [mysql_pconnect](#function.mysql-pconnect) — Abre una conexión persistente a un servidor MySQL
- [mysql_ping](#function.mysql-ping) — Efectuar un chequeo de respuesta (ping) sobre una conexión al servidor o reconectarse si no hay conexión
- [mysql_query](#function.mysql-query) — Enviar una consulta MySQL
- [mysql_real_escape_string](#function.mysql-real-escape-string) — Escapa caracteres especiales en una cadena para su uso en una sentencia SQL
- [mysql_result](#function.mysql-result) — Obtener datos de resultado
- [mysql_select_db](#function.mysql-select-db) — Seleccionar una base de datos MySQL
- [mysql_set_charset](#function.mysql-set-charset) — Establece el conjunto de caracteres del cliente
- [mysql_stat](#function.mysql-stat) — Obtiene el estado actual del sistema
- [mysql_tablename](#function.mysql-tablename) — Obtiene el nombre de la tabla de un campo
- [mysql_thread_id](#function.mysql-thread-id) — Devuelve el ID del hilo actual
- [mysql_unbuffered_query](#function.mysql-unbuffered-query) — Envía una consulta SQL a MySQL, sin recuperar ni almacenar en búfer las filas de resultados

- [Introducción](#intro.mysql)
- [Instalación/Configuración](#mysql.setup)<li>[Requerimientos](#mysql.requirements)
- [Instalación](#mysql.installation)
- [Configuración en tiempo de ejecución](#mysql.configuration)
- [Tipos de recursos](#mysql.resources)
  </li>- [Registro de cambios](#changelog.mysql)
- [Constantes predefinidas](#mysql.constants)
- [Ejemplos](#mysql.examples)<li>[Ejemplo con la extensión MySQL](#mysql.examples-basic)
  </li>- [Funciones MySQL](#ref.mysql)<li>[mysql_affected_rows](#function.mysql-affected-rows) — Obtiene el número de filas afectadas en la anterior operación de MySQL
- [mysql_client_encoding](#function.mysql-client-encoding) — Devuelve el nombre del conjunto de caracteres
- [mysql_close](#function.mysql-close) — Cerrar una conexión de MySQL
- [mysql_connect](#function.mysql-connect) — Abre una conexión al servidor MySQL
- [mysql_create_db](#function.mysql-create-db) — Crea una base de datos MySQL
- [mysql_data_seek](#function.mysql-data-seek) — Mueve el puntero de resultados interno
- [mysql_db_name](#function.mysql-db-name) — Recupera el nombre de la base de datos desde una llamada a mysql_list_dbs
- [mysql_db_query](#function.mysql-db-query) — Selecciona una base de datos y ejecuta una consulta sobre la misma
- [mysql_drop_db](#function.mysql-drop-db) — Elimina (DROP) una base de datos MySQL
- [mysql_errno](#function.mysql-errno) — Devuelve el valor numérico del mensaje de error de la última operación MySQL
- [mysql_error](#function.mysql-error) — Devuelve el texto del mensaje de error de la operación MySQL anterior
- [mysql_escape_string](#function.mysql-escape-string) — Escapa una cadena para ser usada en mysql_query
- [mysql_fetch_array](#function.mysql-fetch-array) — Recupera una fila de resultados como un array asociativo, un array numérico o como ambos
- [mysql_fetch_assoc](#function.mysql-fetch-assoc) — Recupera una fila de resultados como un array asociativo
- [mysql_fetch_field](#function.mysql-fetch-field) — Obtiene la información de una columna de un resultado y la devuelve como un objeto
- [mysql_fetch_lengths](#function.mysql-fetch-lengths) — Obtiene la longitud de cada salida en un resultado
- [mysql_fetch_object](#function.mysql-fetch-object) — Recupera una fila de resultados como un objeto
- [mysql_fetch_row](#function.mysql-fetch-row) — Obtiene una fila de resultados como un array numérico
- [mysql_field_flags](#function.mysql-field-flags) — Obtiene las banderas asociadas al campo especificado de un resultado
- [mysql_field_len](#function.mysql-field-len) — Devuelve la longitud del campo especificado
- [mysql_field_name](#function.mysql-field-name) — Obtiene el nombre del campo especificado de un resultado
- [mysql_field_seek](#function.mysql-field-seek) — Establece el puntero del resultado en un índice de campo específicado
- [mysql_field_table](#function.mysql-field-table) — Obtiene el nombre de la tabla en la que está el campo especificado
- [mysql_field_type](#function.mysql-field-type) — Obtiene el tipo del campo especificado de un resultado
- [mysql_free_result](#function.mysql-free-result) — Libera la memoria del resultado
- [mysql_get_client_info](#function.mysql-get-client-info) — Obtiene información del cliente MySQL
- [mysql_get_host_info](#function.mysql-get-host-info) — Obtener información del anfitrión de MySQL
- [mysql_get_proto_info](#function.mysql-get-proto-info) — Obtener información del protocolo MySQL
- [mysql_get_server_info](#function.mysql-get-server-info) — Obtiene información del servidor MySQL
- [mysql_info](#function.mysql-info) — Obtiene información sobre la consulta más reciente
- [mysql_insert_id](#function.mysql-insert-id) — Obtiene el ID generado en la última consulta
- [mysql_list_dbs](#function.mysql-list-dbs) — Lista las bases de datos disponibles en un servidor MySQL
- [mysql_list_fields](#function.mysql-list-fields) — Lista los campos de una tabla de MySQL
- [mysql_list_processes](#function.mysql-list-processes) — Lista los procesos de MySQL
- [mysql_list_tables](#function.mysql-list-tables) — Lista las tablas de una base de datos MySQL
- [mysql_num_fields](#function.mysql-num-fields) — Obtiene el número de campos de un resultado
- [mysql_num_rows](#function.mysql-num-rows) — Obtener el número de filas de un conjunto de resultados
- [mysql_pconnect](#function.mysql-pconnect) — Abre una conexión persistente a un servidor MySQL
- [mysql_ping](#function.mysql-ping) — Efectuar un chequeo de respuesta (ping) sobre una conexión al servidor o reconectarse si no hay conexión
- [mysql_query](#function.mysql-query) — Enviar una consulta MySQL
- [mysql_real_escape_string](#function.mysql-real-escape-string) — Escapa caracteres especiales en una cadena para su uso en una sentencia SQL
- [mysql_result](#function.mysql-result) — Obtener datos de resultado
- [mysql_select_db](#function.mysql-select-db) — Seleccionar una base de datos MySQL
- [mysql_set_charset](#function.mysql-set-charset) — Establece el conjunto de caracteres del cliente
- [mysql_stat](#function.mysql-stat) — Obtiene el estado actual del sistema
- [mysql_tablename](#function.mysql-tablename) — Obtiene el nombre de la tabla de un campo
- [mysql_thread_id](#function.mysql-thread-id) — Devuelve el ID del hilo actual
- [mysql_unbuffered_query](#function.mysql-unbuffered-query) — Envía una consulta SQL a MySQL, sin recuperar ni almacenar en búfer las filas de resultados
  </li>
