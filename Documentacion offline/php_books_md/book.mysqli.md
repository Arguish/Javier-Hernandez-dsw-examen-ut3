# Extensión mysqli

# Introducción

La extensión mysqli permite acceder a las
funcionalidades proporcionadas por MySQL 4.1 y superiores. Para más
información sobre el servidor de base de datos MySQL, puede consultarse
[» http://www.mysql.com/](http://www.mysql.com/)

Una lista de los programas disponibles para utilizar MySQL
desde PHP puede encontrarse en [Introducción](#mysqli.overview)

La documentación de MySQL está disponible en
[» http://dev.mysql.com/doc/](http://dev.mysql.com/doc/).

Fragmentos del manual de MySQL han sido incluidos en la documentación de PHP
con el permiso de Oracle Corporation.

Los ejemplos utilizan ya sea la base de datos
[» world](http://dev.mysql.com/doc/world-setup/en/index.html), ya sea la base de datos
[» sakila](http://dev.mysql.com/doc/sakila/en/index.html), que son de libre acceso.

# Introducción

    Esta sección proporciona información sobre las soluciones disponibles
    al desarrollar una aplicación PHP que necesita interactuar con una base de datos MySQL.





    **¿Qué es una API?**





    Una Interfaz de Programación de Aplicaciones, o Application Programming Interface (API),
    define las clases, métodos, funciones y variables que su aplicación utilizará para ejecutar diferentes tareas. En el caso
    de las aplicaciones PHP, las comunicaciones con una base de datos se realizan generalmente a través de una API que está expuesta en una extensión PHP.





    Las API pueden ser procedimentales u orientadas a objetos. Con una API procedimental,
    se pueden llamar funciones para ejecutar comandos; con una API orientada a objetos,
    es necesario crear objetos y llamar a los métodos de estos objetos. De las dos, esta última es generalmente preferida,
    ya que es más moderna y conduce a un código más organizado.





    Al escribir aplicaciones PHP que deben conectarse a MySQL, hay varias API disponibles. Este documento presenta estas API y
    proporciona la información necesaria para elegir la mejor solución para su aplicación.





    **¿Qué es un conector?**





    En la documentación de MySQL, el término *conector*
    se refiere a un software que permite a una aplicación conectarse
    a una base de datos MySQL. MySQL proporciona conectores para una amplia
    colección de lenguajes, incluyendo PHP.





    Si su aplicación PHP necesita comunicarse con un servidor de
    base de datos, es necesario escribir código para poder conectarse,
    enviar consultas al servidor, etc. Se requiere un software para
    proporcionar la interfaz que PHP utilizará y gestionar las comunicaciones
    entre su aplicación y el servidor de base de datos: eventualmente,
    se necesitan bibliotecas intermedias. Estos programas se denominan
    genéricamente conectores, ya que permiten *conectarse* a un servidor de base de datos.





    **¿Qué es un controlador?**





    Un controlador es un software diseñado para comunicarse con
    un tipo particular de base de datos. Un controlador también puede
    llamarse biblioteca, como la MySQL Client Library o el
    MySQL Native Driver. Estas bibliotecas implementan el protocolo
    de bajo nivel para comunicarse con un servidor MySQL.





    Por ejemplo, la capa de abstracción de base de datos
    [PHP Data Objects (PDO)](#mysqli.overview.pdo) utiliza
    uno o más controladores de base de datos. Uno de estos controladores es el
    controlador PDO MYSQL, que permite interactuar con MySQL.





    A veces, los desarrolladores utilizan los términos conector y controlador
    de manera intercambiable, lo que puede resultar confuso. En la
    documentación de MySQL, el término controlador está reservado
    para los programas que son la interfaz específica con la base de datos del paquete.





    **¿Qué es una extensión?**





    En la documentación de PHP, se encontrará con otro término:
    *extensión*. El código PHP está compuesto por un núcleo,
    con extensiones opcionales. Las extensiones relacionadas con MySQL de PHP,
    como la extensión mysqli y la extensión de controlador
    PDO MySQL, están implementadas utilizando el framework de extensión de PHP.





    Una extensión expone típicamente una API a un desarrollador PHP,
    para facilitar la programación. Sin embargo,
    algunas extensiones que utilizan el framework de PHP no exponen
    ninguna API al desarrollador PHP.





    La extensión de controlador PDO MySQL, por ejemplo, no expone ninguna API al
    desarrollador PHP, pero proporciona una interfaz a la capa PDO.





    Los términos API y extensión no deberían significar lo mismo,
    ya que una extensión PHP no proporciona necesariamente una API particular al desarrollador PHP.





    **¿Cuáles son las API de PHP para MySQL?**





    Hay dos API principales para conectarse a MySQL:





    -

        La extensión mysqli





    -

        PHP Data Objects (PDO)








    Cada una tiene sus ventajas e inconvenientes. Las siguientes secciones
    ofrecen una presentación rápida de cada API.





    **¿Qué es la extensión mysqli de PHP?**





    La extensión mysqli, o como a veces se la denomina,
    la extensión MySQL *mejorada* (i para improved
    en inglés), fue desarrollada para aprovechar las nuevas características
    de los sistemas MySQL versión 4.1.3 y posteriores. La extensión
    mysqli está incluida en PHP desde la versión 5.





    La extensión mysqli tiene una gran cantidad de ventajas
    y mejoras con respecto a la extensión mysql:



      -

          Interfaz orientada a objetos





      -

          Soporte para sentencias preparadas





      -

          Soporte para múltiples sentencias





      -

          Soporte para transacciones





      -

          Capacidades avanzadas de depuración









    Además de una interfaz orientada a objetos, la extensión también ofrece
    una interfaz procedimental.





    La extensión mysqli está compilada con el framework
    de PHP, y su código fuente se encuentra en el directorio ext/mysqli.





    Para más información sobre la extensión mysqli,
    consulte [MySQLi](#book.mysqli).





    **¿Qué es la extensión PDO de PHP?**





    PHP Data Objects, o PDO, es una capa de abstracción
    de base de datos específica para PHP. PDO ofrece una API coherente para sus
    aplicaciones PHP, independientemente del tipo de base de datos con la que
    se trabaje. En teoría, si se utiliza PDO, se puede cambiar de base de datos,
    por ejemplo de Firebird a MySQL, y solo realizar cambios menores en el código PHP.





    Otros ejemplos de capas de abstracción de base de datos incluyen
    JDBC para Java y DBI para Perl.





    Si PDO tiene sus ventajas, como una API limpia, simple y portable,
    sus principales inconvenientes son que no permite utilizar
    todas las características avanzadas de las últimas versiones de MySQL.
    Por ejemplo, PDO no permite realizar consultas múltiples.





    PDO está implementado utilizando el framework de PHP, y su código fuente
    se encuentra en el directorio ext/pdo.





    Para más información sobre PDO, consulte [PDO](#book.pdo).





    **¿Qué es el controlador MySQL para PDO?**





    El controlador PDO MYSQL no es una API en sí mismo, al menos desde el
    punto de vista del desarrollador PHP. De hecho, el controlador PDO MYSQL forma parte
    de PDO, y proporciona las funcionalidades específicas de MySQL. El
    desarrollador llama a la API PDO, pero PDO utiliza el controlador PDO MYSQL
    para gestionar las comunicaciones con MySQL.





    El controlador PDO MYSQL forma parte de la gran familia de controladores PDO.
    Otros controladores disponibles gestionan las comunicaciones con
    Firebird y PostgreSQL, entre otros.





    El controlador PDO MYSQL está implementado con el framework de extensión de PHP.
    Su código fuente se encuentra en el directorio ext/pdo_mysql.
    No expone ninguna API al desarrollador PHP.





    Para más detalles sobre el controlador PDO de MySQL, consulte
    [Controlador PDO MySQL](#ref.pdo-mysql).





    **¿Qué es el controlador nativo MySQL de PHP?**





    Para comunicarse con el servidor MySQL, la extensión
    mysqli y el controlador
    PDO MYSQL utilizan una biblioteca de bajo nivel que implementa
    el protocolo MySQL. En el pasado, la única biblioteca disponible
    era la MySQL Client Library,
    también llamada libmysqlclient.





    Sin embargo, la interfaz presentada por libmysqlclient no estaba
    optimizada para las comunicaciones con PHP, y
    libmysqlclient estaba diseñada originalmente en C, para aplicaciones
    de tipo similar. Por esta razón, el controlador MySQL nativo
    mysqlnd fue desarrollado como una alternativa a
    libmysqlclient para aplicaciones PHP.





    La extensión mysqli y el controlador MySQL nativo pueden
    configurarse individualmente para utilizar libmysqlclient o mysqlnd. Como
    mysqlnd fue diseñado específicamente para el sistema
    PHP, ofrece numerosas ventajas y mejoras con respecto a
    libmysqlclient. Se recomienda encarecidamente su uso.





    El MySQL Native Driver está implementado sobre la base del framework
    de extensión de PHP. El código fuente se encuentra en
    ext/mysqlnd. No expone ninguna nueva API
    al desarrollador PHP.





    **Comparación de características**





    La siguiente tabla compara las características de los métodos
    principales para conectarse a MySQL desde PHP:





    <caption>**Comparación de las opciones de API MySQL para PHP**</caption>

      <col width="34*">
      <col width="33*">
      <col width="33*">


           
          Extensión mysqli
          PDO (con el controlador PDO MySQL Driver y MySQL Native Driver)






          Versión de introducción en PHP
          5.0
          5.0



          Estado de desarrollo de MySQL
          Desarrollo activo
          Desarrollo activo



          La API soporta juegos de caracteres
          Sí
          Sí



          La API soporta sentencias preparadas
          Sí
          Sí



          La API soporta sentencias preparadas del lado del cliente
          No
          Sí



          La API soporta procedimientos almacenados
          Sí
          Sí



          La API soporta múltiples sentencias
          Sí
          La mayoría



          Todas las características de MySQL 4.1 y posteriores
          Sí
          La mayoría




# Guía de inicio rápido

## Tabla de contenidos

- [Interfaces procedimentales y orientadas a objetos](#mysqli.quickstart.dual-interface)
- [Conexiones](#mysqli.quickstart.connections)
- [Ejecución de consultas](#mysqli.quickstart.statements)
- [Las consultas preparadas](#mysqli.quickstart.prepared-statements)
- [Los procedimientos almacenados](#mysqli.quickstart.stored-procedures)
- [Consultas múltiples](#mysqli.quickstart.multiple-statement)
- [Soporte API para las transacciones](#mysqli.quickstart.transactions)
- [Las metadatos](#mysqli.quickstart.metadata)

    Esta guía de inicio rápido ayudará a familiarizarse con la API PHP MySQL.

    Proporciona una visión general de la extensión mysqli. Se proporcionan ejemplos de código
    para todos los aspectos importantes de la API. Los conceptos básicos de la base de datos se explican con la precisión necesaria para
    comprender las especificidades de los conceptos de MySQL.

    Requisitos: Se debe estar familiarizado con el lenguaje de programación PHP,
    el lenguaje SQL y tener algunos conocimientos básicos con el servidor MySQL.

    ## Interfaces procedimentales y orientadas a objetos

    La extensión mysqli proporciona 2 interfaces. Soporta la programación
    procedimental así como la programación orientada a objetos.

    Los usuarios migrantes desde la antigua extensión mysql preferirán
    la interfaz procedimental. Esta interfaz es similar a la utilizada
    por la antigua extensión mysql. En la mayoría de los casos, los nombres de funciones
    solo difieren por sus prefijos. Algunas funciones mysqli toman un manejador de conexión como primer argumento, mientras que la función
    correspondiente de la antigua interfaz mysql lo tomaba como argumento
    opcional en última posición.

    **Ejemplo #1 Migración fácil desde la antigua extensión mysql**

&lt;?php

$mysqli = mysqli_connect("example.com", "user", "password", "database");
$result = mysqli_query($mysqli, "SELECT 'No se debe usar la extensión mysql deprecada para nuevos desarrollos. ' AS _msg FROM DUAL");
$row = mysqli_fetch_assoc($result);
echo $row['_msg'];

$mysql = mysql_connect("example.com", "user", "password");
mysql_select_db("test");
$result = mysql_query("USE la extensión mysqli en su lugar. AS \_msg FROM DUAL", $mysql);
$row = mysql_fetch_assoc($result);
echo $row['_msg'];

    El ejemplo anterior mostrará:

No se debe usar la extensión mysql deprecada para nuevos desarrollos. USE la extensión mysqli en su lugar.

**La interfaz orientada a objetos**

Además de la interfaz procedimental, los usuarios pueden elegir
utilizar la interfaz orientada a objetos. La documentación está organizada
utilizando esta interfaz. Muestra las funciones agrupadas
por sus propósitos, facilitando el inicio de la programación.
La sección de referencia proporciona ejemplos sobre las dos sintaxis.

No hay diferencia significativa en términos de rendimiento
entre las dos interfaces. Los usuarios pueden hacer su elección
según sus preferencias personales.

    **Ejemplo #2 Interfaces procedimentales y orientadas a objetos**

&lt;?php

$mysqli = mysqli_connect("example.com", "user", "password", "database");
$result = mysqli_query($mysqli, "SELECT 'Un mundo lleno de ' AS _msg FROM DUAL");
$row = mysqli_fetch_assoc($result);
echo $row['_msg'];

$mysqli = new mysqli("example.com", "user", "password", "database");
$result = $mysqli-&gt;query("SELECT 'opciones para complacer a todos.' AS _msg FROM DUAL");
$row = $result-&gt;fetch_assoc();
echo $row['_msg'];

    El ejemplo anterior mostrará:

Un mundo lleno de opciones para complacer a todos.

La interfaz orientada a objetos se utiliza en el inicio rápido de la documentación
debido a que la sección de referencia está organizada de esta manera.

**Mezcla de estilos**

Es posible cambiar de un estilo a otro en cualquier momento, aunque no se recomienda por razones de claridad y estilo de codificación.

    **Ejemplo #3 Malo estilo de codificación**

&lt;?php

$mysqli = new mysqli("example.com", "user", "password", "database");
$result = mysqli_query($mysqli, "SELECT 'Posible pero mal estilo.' AS \_msg FROM DUAL");

if ($row = $result-&gt;fetch_assoc()) {
echo $row['_msg'];
}

    El ejemplo anterior mostrará:

Posible pero mal estilo.

**Ver también**

    - [mysqli::__construct()](#mysqli.construct)

    - [mysqli::query()](#mysqli.query)

    - [mysqli_result::fetch_assoc()](#mysqli-result.fetch-assoc)

    - [$mysqli::connect_errno](#mysqli.connect-errno)

    - [$mysqli::connect_error](#mysqli.connect-error)

    - [$mysqli::errno](#mysqli.errno)

    - [$mysqli::error](#mysqli.error)

    - [Resumen de las funciones de la extensión MySQLi](#mysqli.summary)

## Conexiones

El servidor MySQL soporta el uso de diferentes capas de transporte
para las conexiones. Las conexiones pueden utilizar TCP/IP, los sockets
de dominio Unix o los tubos nombrados de Windows.

El nombre de host localhost tiene un significado especial.
Está vinculado al uso de los sockets de dominio Unix.
Para abrir una conexión TCP/IP en el host local, 127.0.0.1 debe ser utilizado
en lugar de localhost.

    **Ejemplo #1 Significado especial de localhost**

&lt;?php

$mysqli = new mysqli("localhost", "user", "password", "database");

echo $mysqli-&gt;host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "user", "password", "database", 3306);

echo $mysqli-&gt;host_info . "\n";

    El ejemplo anterior mostrará:

Localhost via UNIX socket
127.0.0.1 via TCP/IP

**Parámetros por omisión de una conexión**

Dependiendo de la función de conexión utilizada, algunos parámetros pueden ser omitidos.
Si un parámetro no es proporcionado, entonces la extensión intentará utilizar los valores
por omisión definidos en el archivo de configuración de PHP.

    **Ejemplo #2 Parámetros por omisión**

mysqli.default_host=192.168.2.27
mysqli.default_user=root
mysqli.default_pw=""
mysqli.default_port=3306
mysqli.default_socket=/tmp/mysql.sock

Estos valores de parámetros son entonces pasados a la biblioteca cliente
utilizada por la extensión. Si la biblioteca cliente detecta un parámetro
vacío o no definido, entonces utilizará los valores por omisión internos a
la biblioteca.

**Valores por omisión internos a la biblioteca para la conexión**

Si el valor del host no está definido o es vacío, entonces la biblioteca cliente
utilizará por omisión una conexión de tipo socket Unix en localhost.
Si el socket no está definido o es vacío, y se solicita una conexión de tipo socket Unix, entonces se intentará una conexión al socket por omisión /tmp/mysql.sock.

En los sistemas Windows, el nombre de host . es interpretado
por la biblioteca cliente como un intento de abrir un tubo nombrado de Windows
para la conexión. En este caso, el parámetro socket es interpretado como
un tubo nombrado. Si no es proporcionado o está vacío, entonces el socket (tubo nombrado)
valdrá por omisión \\.\pipe\MySQL.

Si ni un socket de dominio Unix ni un tubo nombrado de Windows es proporcionado, se establecerá una conexión básica y si el valor del puerto no está definido, la biblioteca
utilizará el puerto 3306.

La biblioteca [mysqlnd](#mysqlnd.overview) y la biblioteca
cliente MySQL (libmysqlclient) implementan la misma lógica para determinar los valores
por omisión.

**Opciones de conexión**

Las opciones de conexión están disponibles para, por ejemplo, definir
comandos de inicialización a ejecutar durante la conexión, o
para solicitar el uso de un juego de caracteres específico. Las opciones
de conexión deben ser definidas antes de la conexión a la red.

Para definir una opción de conexión, la operación de conexión debe
ser realizada en 3 pasos: creación de un manejador de conexión con
[mysqli_init()](#mysqli.init) o [mysqli::\_\_construct()](#mysqli.construct),
definición de las opciones solicitadas utilizando
[mysqli::options()](#mysqli.options), y conexión a la red con
[mysqli::real_connect()](#mysqli.real-connect).

**Cola de conexión**

La extensión mysqli soporta las conexiones persistentes a la base de datos,
que son conexiones especiales. Por omisión, cada conexión a una
base de datos abierta por un script es cerrada explícitamente por
el usuario durante la ejecución, o liberada automáticamente al final
del script. Esto no es el caso de una conexión persistente. En efecto,
será colocada en una cola para una reutilización futura,
si una conexión al mismo servidor, utilizando el mismo nombre de usuario, la
misma contraseña, el mismo socket, el mismo puerto, así como la misma base de datos
es abierta. Esta reutilización permite aligerar la carga indebida por las
conexiones.

Cada proceso PHP utiliza su propia cola de conexiones mysqli.
Dependiendo del modelo de despliegue del servidor web, un proceso PHP puede
servir una o varias peticiones. Sin embargo, una conexión en cola
puede ser utilizada por uno o varios scripts posteriormente.

**Las conexiones persistentes**

Si una conexión persistente para una combinación de host, nombre de usuario,
contraseña, socket, puerto y base de datos no utilizada no puede
ser encontrada en la cola de conexión, entonces mysqli abrirá una nueva
conexión. El uso de las conexiones persistentes puede ser activado o desactivado
utilizando la directiva PHP
[mysqli.allow_persistent](#ini.mysqli.allow-persistent).
El número total de conexiones abiertas por un script puede ser limitado con
la directiva [mysqli.max_links](#ini.mysqli.max-links).
El número máximo de conexiones persistentes por proceso PHP puede ser
restringido con la directiva [mysqli.max_persistent](#ini.mysqli.max-persistent).
Tenga en cuenta que el servidor web puede generar varios procesos PHP.

Una queja común contra las conexiones persistentes es que su estado no es re-initializado antes de la reutilización. Por ejemplo,
las transacciones abiertas y no terminadas no son automáticamente
anuladas. Además, las modificaciones autorizadas que ocurren entre el momento
en que la conexión es colocada en cola y su reutilización no serán tomadas en cuenta. Este comportamiento puede ser visto como un efecto de
borde no deseado. Por el contrario, el nombre persistent
puede ser comprendido como una promesa sobre el hecho de que el estado persiste
realmente.

La extensión mysqli soporta dos interpretaciones de una conexión persistente :
estado persistente, y un estado re-initializado antes de la reutilización. Por
omisión, será re-initializado. Antes de que una conexión persistente sea
reutilizada, la extensión mysqli llama implícitamente a la función
[mysqli::change_user()](#mysqli.change-user) para re-initializar el estado.
La conexión persistente aparece al usuario como si acabara de ser abierta. Ninguna
traza de un uso anterior será visible.

La función [mysqli::change_user()](#mysqli.change-user) es una operación costosa.
Para mejores rendimientos, los usuarios pueden querer re-compilar
la extensión con el flag de compilación **[MYSQLI_NO_CHANGE_USER_ON_PCONNECT](#constant.mysqli-no-change-user-on-pconnect)**.

Así, se dejará al usuario la elección entre un comportamiento seguro
y un rendimiento optimizado. Ambos tienen como objetivo la optimización. Para
una utilización más sencilla, el comportamiento seguro ha sido colocado
por omisión en detrimento de un rendimiento máximo.

**Ver también**

    - [mysqli_init()](#mysqli.init)

    - [mysqli::__construct()](#mysqli.construct)

    - [mysqli::options()](#mysqli.options)

    - [mysqli::real_connect()](#mysqli.real-connect)

    - [mysqli::change_user()](#mysqli.change-user)

    - [$mysqli::host_info](#mysqli.get-host-info)

    - [Las opciones de configuración MySQLi](#mysqli.configuration)

    - [Las conexiones persistentes a las bases de datos](#features.persistent-connections)

## Ejecución de consultas

Las consultas pueden ser ejecutadas con las funciones
[mysqli::query()](#mysqli.query), [mysqli::real_query()](#mysqli.real-query)
y [mysqli::multi_query()](#mysqli.multi-query). La función
[mysqli::query()](#mysqli.query) es la más común, y combina
la ejecución de la consulta con una recuperación
de su juego de resultados en memoria tamponada, si lo hay, en una sola llamada.
Llamar a la función [mysqli::query()](#mysqli.query)
es idéntico a llamar a la función
[mysqli::real_query()](#mysqli.real-query) seguida de una llamada a la función
[mysqli::store_result()](#mysqli.store-result).

    **Ejemplo #1 Ejecución de consultas**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");

**Juegos de resultados en memoria tamponada**

Después de la ejecución de la consulta, los resultados pueden ser recuperados
completamente de una vez o bien ser leídos línea por línea. La memoria
tamponada del juego de resultados del lado-cliente permite al servidor liberar
los recursos asociados con el resultado de la consulta tan pronto como sea posible.
En general, los clientes son lentos para recorrer los juegos de resultados.
Sin embargo, se recomienda utilizar la memoria tamponada de los
juegos de resultados. La función [mysqli::query()](#mysqli.query)
combina tanto la ejecución de la consulta como la memoria tamponada del juego de resultados.

Las aplicaciones PHP pueden navegar libremente en los resultados
en memoria tamponada. La navegación es rápida ya que los juegos de resultados
están almacenados en la memoria del cliente. Tenga en cuenta que
a menudo es más sencillo realizar esta operación por el cliente que
por el servidor.

    **Ejemplo #2 Navegación en resultados en memoria tamponada**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");
$mysqli-&gt;query("INSERT INTO test(id) VALUES (1), (2), (3)");

$result = $mysqli-&gt;query("SELECT id FROM test ORDER BY id ASC");

echo "Orden inverso...\n";
for ($row_no = $result-&gt;num_rows - 1; $row_no &gt;= 0; $row_no--) {
    $result-&gt;data_seek($row_no);
$row = $result-&gt;fetch_assoc();
echo " id = " . $row['id'] . "\n";
}

echo "Orden del juego de resultados...\n";
foreach ($result as $row) {
echo " id = " . $row['id'] . "\n";
}

    El ejemplo anterior mostrará:

Orden inverso...
id = 3
id = 2
id = 1
Orden del juego de resultados...
id = 1
id = 2
id = 3

**Juegos de resultados no en memoria tamponada**

Si la memoria del cliente es un recurso limitado, y la liberación
de los recursos del servidor tan pronto como sea posible para mantener una carga
del servidor baja no es necesaria, los resultados no en memoria tamponada
pueden ser utilizados. La navegación a través de resultados no en memoria tamponada no es posible hasta que todas las líneas no hayan sido leídas.

    **Ejemplo #3 Navegación en resultados no en memoria tamponada**

&lt;?php

$mysqli-&gt;real_query("SELECT id FROM test ORDER BY id ASC");
$result = $mysqli-&gt;use_result();

echo "Orden del juego de resultados...\n";
foreach ($result as $row) {
echo " id = " . $row['id'] . "\n";
}

**Tipos de datos de los valores del juego de resultados**

Las funciones [mysqli::query()](#mysqli.query), [mysqli::real_query()](#mysqli.real-query)
y [mysqli::multi_query()](#mysqli.multi-query) se utilizan para ejecutar consultas no preparadas. A nivel del protocolo cliente-servidor MySQL, la orden
COM_QUERY así como el protocolo texto son utilizados para
la ejecución de la consulta. Con el protocolo texto, el servidor MySQL convierte
todos los datos de un juego de resultados en cadenas de caracteres antes de enviarlos.
La biblioteca cliente mysql recibe todos los valores de las columnas en forma
de cadena de caracteres. Ninguna otra conversión del lado-cliente se realiza
para recuperar el tipo nativo de las columnas. En su lugar, todas las valores son
proporcionados en la forma de cadena de caracteres PHP.

    **Ejemplo #4 El protocolo texto devuelve cadenas de caracteres por omisión**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label CHAR(1))");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'a')");

$result = $mysqli-&gt;query("SELECT id, label FROM test WHERE id = 1");
$row = $result-&gt;fetch_assoc();

printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

    El ejemplo anterior mostrará:

id = 1 (string)
label = a (string)

Es posible convertir columnas de tipo enteros y números de punto flotante
en números PHP definiendo la opción de conexión
**[MYSQLI_OPT_INT_AND_FLOAT_NATIVE](#constant.mysqli-opt-int-and-float-native)**, si se utiliza la biblioteca
mysqlnd. Si está definida, la biblioteca mysqlnd verificará las metadatos de los tipos
de las columnas en el juego de resultados y convertirá las columnas SQL numéricas
en números PHP, si el valor está dentro del intervalo permitido de PHP.
De esta manera, por ejemplo, las columnas SQL INT son devueltas en la forma
de entero.

    **Ejemplo #5 Tipos nativos de datos con mysqlnd y la opción de conexión**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli();
$mysqli-&gt;options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$mysqli-&gt;real_connect("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label CHAR(1))");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'a')");

$result = $mysqli-&gt;query("SELECT id, label FROM test WHERE id = 1");
$row = $result-&gt;fetch_assoc();

printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

    El ejemplo anterior mostrará:

id = 1 (integer)
label = a (string)

**Ver también**

    - [mysqli::__construct()](#mysqli.construct)

    - [mysqli::options()](#mysqli.options)

    - [mysqli::real_connect()](#mysqli.real-connect)

    - [mysqli::query()](#mysqli.query)

    - [mysqli::multi_query()](#mysqli.multi-query)

    - [mysqli::use_result()](#mysqli.use-result)

    - [mysqli::store_result()](#mysqli.store-result)

## Las consultas preparadas

La base de datos MySQL soporta las consultas preparadas. Una consulta
preparada o consulta parametrizable es utilizada para ejecutar la
misma consulta varias veces, con gran eficiencia y protege
contra las inyecciones SQL.

**Flujo de trabajo básico**

La ejecución de una consulta preparada se realiza en dos pasos :
la preparación y la ejecución. Durante la preparación, una plantilla
de consulta es enviada al servidor de base de datos. El servidor realiza
una verificación de la sintaxis, y inicializa los recursos internos
del servidor para un uso posterior.

El servidor MySQL soporta el modo anónimo, con marcadores de posición
utilizando el carácter ?.

    La preparación es seguida por la ejecución. Durante la ejecución, el cliente enlaza
    los valores de los parámetros y los envía al servidor. El servidor ejecuta
    la instrucción con los valores enlazados utilizando los recursos internos
    previamente creados.







    **Ejemplo #1 Primer paso: la preparación**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");

// Consulta preparada, paso 1: preparación
$stmt = $mysqli-&gt;prepare("INSERT INTO test(id, label) VALUES (?, ?)");

// Consulta preparada, paso 2: enlaza los valores y ejecuta la consulta
$id = 1;
$label = 'PHP';
$stmt-&gt;bind_param("is", $id, $label); // "is" significa que $id está enlazado como un integer y $label como un string

$stmt-&gt;execute();

**Ejecución repetida**

Una consulta preparada puede ser ejecutada varias veces. En cada
ejecución, el valor actual de la variable enlazada es evaluado, y enviado
al servidor. La consulta no es analizada de nuevo. La plantilla de consulta
no es enviada nuevamente al servidor.

    **Ejemplo #2 Consulta de tipo INSERT preparada una sola vez, y ejecutada varias veces**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");

// Consulta preparada, paso 1: la preparación
if (!($stmt = $mysqli-&gt;prepare("INSERT INTO test(id) VALUES (?)"))) {
echo "Fallo durante la preparación: (" . $mysqli-&gt;errno . ") " . $mysqli-&gt;error;
}

// Consulta preparada, paso 2: enlaza los valores y ejecuta la consulta
$id = 1;
$stmt-&gt;bind_param("is", $id, $label); // "is" significa que $id está enlazado como un integer y $label como un string

$data = [
1 =&gt; 'PHP',
2 =&gt; 'Java',
3 =&gt; 'C++'
];

foreach ($data as $id =&gt; $label) {
$stmt-&gt;execute();
}

$result = $mysqli-&gt;query('SELECT id, label FROM test');
var_dump($result-&gt;fetch_all(MYSQLI_ASSOC));

    El ejemplo anterior mostrará:

array(3) {
array(2) {
["id"]=&gt;
string(1) "1"
["label"]=&gt;
string(3) "PHP"
}
[1]=&gt;
array(2) {
["id"]=&gt;
string(1) "2"
["label"]=&gt;
string(4) "Java"
}
[2]=&gt;
array(2) {
["id"]=&gt;
string(1) "3"
["label"]=&gt;
string(3) "C++"
}
}

Cada consulta preparada ocupa recursos en el servidor. Deben
ser cerradas explícitamente inmediatamente después de su uso. Si no
lo hace, la consulta será cerrada cuando el manejador de consulta
sea liberado por PHP.

El uso de consultas preparadas no siempre es la forma más
eficiente de ejecutar una consulta. Una consulta preparada ejecutada una sola
vez provoca más idas y vueltas cliente-servidor que una consulta no preparada.
Es por eso que la consulta de tipo SELECT
no es ejecutada como consulta preparada en el ejemplo anterior.

Además, debe tener en cuenta el uso de las sintaxis multi-INSERT MySQL para los INSERTs. Por ejemplo, los multi-INSERTs requieren
menos idas y vueltas cliente-servidor que la consulta preparada vista en el ejemplo anterior.

    **Ejemplo #3 Menos idas y vueltas utilizando los multi-INSERTs SQL**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");

$values = [1, 2, 3, 4];

$stmt = $mysqli-&gt;prepare("INSERT INTO test(id) VALUES (?), (?), (?), (?)");
$stmt-&gt;bind_param('iiii', ...$values);
$stmt-&gt;execute();

**Tipos de datos de los valores del juego de resultados**

El protocolo servidor cliente MySQL define un protocolo de transferencia de datos
diferente para las consultas preparadas y para las consultas no preparadas.
Las consultas preparadas utilizan un protocolo llamado binario. El servidor MySQL
envía los datos del juego de resultados "tal cual", en formato binario. Los resultados
no son serializados en cadenas de caracteres antes de ser enviados. La biblioteca cliente
recibe datos binarios y intenta convertir los valores en un tipo de datos
PHP apropiado. Por ejemplo, los resultados desde una columna INT
SQL serán proporcionados como variables de tipo entero PHP.

    **Ejemplo #4 Tipos de datos nativos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'PHP')");

$stmt = $mysqli-&gt;prepare("SELECT id, label FROM test WHERE id = 1");
$stmt-&gt;execute();
$result = $stmt-&gt;get_result();
$row = $result-&gt;fetch_assoc();

printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

    El ejemplo anterior mostrará:

id = 1 (integer)
label = PHP (string)

Este comportamiento difiere para las consultas no preparadas. Por omisión, las
consultas no preparadas devuelven todos los resultados en forma de cadenas
de caracteres. Este comportamiento por omisión puede ser modificado utilizando
una opción durante la conexión. Si esta opción es utilizada,
entonces no habrá diferencia entre una consulta preparada y una
consulta no preparada.

**Recuperación de los resultados utilizando variables enlazadas**

Los resultados desde las consultas preparadas pueden ser recuperados
enlazando las variables de salida, o interrogando el objeto
[mysqli_result](#class.mysqli-result).

Las variables de salida deben ser enlazadas después de la ejecución de la consulta.
Una variable debe ser enlazada para cada columna del juego de resultados de la consulta.

    **Ejemplo #5 Enlace de las variables de salida**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'PHP')");

$stmt = $mysqli-&gt;prepare("SELECT id, label FROM test WHERE id = 1");
$stmt-&gt;execute();

$stmt-&gt;bind_result($out_id, $out_label);

$out_id    = NULL;
$out_label = NULL;
if (!$stmt-&gt;bind_result($out_id, $out_label)) {
echo "Fallo durante el enlace de los parámetros de salida: (" . $stmt-&gt;errno . ") " . $stmt-&gt;error;
}

while ($stmt-&gt;fetch()) {
    printf("id = %s (%s), label = %s (%s)\n", $out_id, gettype($out_id), $out_label, gettype($out_label));
}

    El ejemplo anterior mostrará:

id = 1 (integer), label = a (string)

Las consultas preparadas devuelven juegos de resultados no en memoria tamponada
por omisión. Los resultados de la consulta no son recuperados
implícitamente y transferidos desde el servidor hacia el cliente para una memoria tamponada
del lado-cliente. El juego de resultados ocupa recursos del servidor hasta que todos
los resultados no sean recuperados por el cliente. Por lo tanto, es recomendable
recuperarlos rápidamente. Si un cliente falla en la recuperación de
todos los resultados, o si el cliente cierra la consulta antes de haber recuperado
todos los datos, los datos deben ser recuperados implícitamente por
mysqli.

También es posible poner en memoria tamponada los resultados de una
consulta preparada utilizando la función
[mysqli_stmt::store_result()](#mysqli-stmt.store-result).

**Recuperación de los resultados utilizando la interfaz mysqli_result**

En lugar de utilizar resultados enlazados, los resultados pueden también ser recuperados
a través de la interfaz mysqli_result. La función [mysqli_stmt::get_result()](#mysqli-stmt.get-result)
devuelve un juego de resultados en memoria tamponada.

    **Ejemplo #6 Uso de mysqli_result para recuperar los resultados**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'PHP')");

$stmt = $mysqli-&gt;prepare("SELECT id, label FROM test WHERE id = 1");
$stmt-&gt;execute();

$result = $stmt-&gt;get_result();

var_dump($result-&gt;fetch_all(MYSQLI_ASSOC));

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
array(2) {
["id"]=&gt;
int(1)
["label"]=&gt;
string(3) "PHP"
}
}

El uso de la interfaz [mysqli_result](#class.mysqli-result) ofrece otras ventajas
en términos de flexibilidad en la navegación en el juego de resultados del lado-cliente.

    **Ejemplo #7 Juego de resultados en memoria tamponada para más flexibilidad en la lectura**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Consulta no preparada
$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT, label TEXT)");
$mysqli-&gt;query("INSERT INTO test(id, label) VALUES (1, 'PHP'), (2, 'Java'), (3, 'C++')");

$stmt = $mysqli-&gt;prepare("SELECT id, label FROM test");
$stmt-&gt;execute();

$result = $stmt-&gt;get_result();

for ($row_no = $result-&gt;num_rows - 1; $row_no &gt;= 0; $row_no--) {
    $result-&gt;data_seek($row_no);
var_dump($result-&gt;fetch_assoc());
}

    El ejemplo anterior mostrará:

array(2) {
["id"]=&gt;
int(3)
["label"]=&gt;
string(1) "C++"
}
array(2) {
["id"]=&gt;
int(2)
["label"]=&gt;
string(1) "Java"
}
array(2) {
["id"]=&gt;
int(1)
["label"]=&gt;
string(1) "PHP"
}

**Escape y inyección SQL**

Las variables enlazadas son enviadas al servidor separadamente de la consulta,
no pudiendo así interferir con esta. El servidor utiliza estos valores
directamente al momento de la ejecución, después de que la plantilla sea
analizada. Los parámetros enlazados no necesitan ser escapados ya que
nunca son colocados en la cadena de consulta directamente.
Una pista debe ser proporcionada al servidor para especificar el tipo de
variable enlazada, para realizar la conversión apropiada. Ver la
función [mysqli_stmt::bind_param()](#mysqli-stmt.bind-param) para más información.

Tal separación es a menudo considerada como la única funcionalidad
para protegerse contra las inyecciones SQL, pero el mismo grado de seguridad puede
ser alcanzado con las consultas no preparadas, si todas las valores son
correctamente formateadas. Tenga en cuenta que un formateo correcto no es lo mismo
que un escape y requiere más lógica que un simple escape.
Por lo tanto, las consultas preparadas son simplemente un método más sencillo
y menos propenso a errores en cuanto a este enfoque seguro.

**Emulación del lado-cliente de la preparación de una consulta**

La API no incluye una emulación del lado-cliente de la preparación de una consulta.

**Ver también**

    - [mysqli::__construct()](#mysqli.construct)

    - [mysqli::query()](#mysqli.query)

    - [mysqli::prepare()](#mysqli.prepare)

    - [mysqli_stmt::prepare()](#mysqli-stmt.prepare)

    - [mysqli_stmt::execute()](#mysqli-stmt.execute)

    - [mysqli_stmt::bind_param()](#mysqli-stmt.bind-param)

    - [mysqli_stmt::bind_result()](#mysqli-stmt.bind-result)

## Los procedimientos almacenados

La base de datos MySQL soporta los procedimientos almacenados. Un procedimiento almacenado
es una subrutina almacenada en el catálogo de la base de datos. Las
aplicaciones pueden llamar y ejecutar un procedimiento almacenado. La
consulta SQL CALL es utilizada para ejecutar
un procedimiento almacenado.

**Parámetro**

Los procedimientos almacenados pueden tener parámetros IN,
INOUT y OUT, dependiendo de la versión de MySQL.
La interfaz mysqli no tiene una noción específica de los diferentes tipos de parámetros.

**Parámetro IN**

Los parámetros de entrada son proporcionados con la consulta CALL.
Asegúrese de escapar correctamente los valores.

    **Ejemplo #1 Llamada a un procedimiento almacenado**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");

$mysqli-&gt;query("DROP PROCEDURE IF EXISTS p");
$mysqli-&gt;query("CREATE PROCEDURE p(IN id_val INT) BEGIN INSERT INTO test(id) VALUES(id_val); END;");

$mysqli-&gt;query("CALL p(1)");

$result = $mysqli-&gt;query("SELECT id FROM test");

var_dump($result-&gt;fetch_assoc());

    El ejemplo anterior mostrará:

array(1) {
["id"]=&gt;
string(1) "1"
}

**Parámetro INOUT/OUT**

Los valores de los parámetros INOUT/OUT
son accedidos utilizando las variables de sesión.

    **Ejemplo #2 Uso de las variables de sesión**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP PROCEDURE IF EXISTS p");
$mysqli-&gt;query('CREATE PROCEDURE p(OUT msg VARCHAR(50)) BEGIN SELECT "Hi!" INTO msg; END;');

$mysqli-&gt;query("SET @msg = ''");
$mysqli-&gt;query("CALL p(@msg)");

$result = $mysqli-&gt;query("SELECT @msg as \_p_out");

$row = $result-&gt;fetch_assoc();
echo $row['_p_out'];

    El ejemplo anterior mostrará:

Hi!

Los desarrolladores de aplicaciones y de frameworks pueden proporcionar una API
más amigable utilizando una mezcla de las variables de sesión y una inspección
del catálogo de la base de datos. Sin embargo, tenga en cuenta
el impacto en el rendimiento debido a una solución personalizada basada
en la inspección del catálogo.

**Gestión de los juegos de resultados**

Los procedimientos almacenados pueden devolver juegos de resultados. Los juegos de
resultados devueltos desde un procedimiento almacenado no pueden ser recuperados
correctamente utilizando la función [mysqli::query()](#mysqli.query).
La función [mysqli::query()](#mysqli.query) combina la ejecución de la consulta
y la recuperación del primer juego de resultados en un juego de resultados en memoria tamponada, si lo hay. Sin embargo, existen otros juegos de resultados
provenientes del procedimiento almacenado que están ocultos al usuario y que
hacen que la función [mysqli::query()](#mysqli.query) falle al recuperar los juegos de resultados esperados por el usuario.

Los juegos de resultados devueltos desde un procedimiento almacenado son
recuperados utilizando la función [mysqli::real_query()](#mysqli.real-query)
o [mysqli::multi_query()](#mysqli.multi-query).
Estas dos funciones permiten la recuperación de cualquier número
de juegos de resultados devueltos por una consulta, como la consulta
CALL. Fallar en la recuperación de todos los juegos de resultados
devueltos por un procedimiento almacenado causa un error.

    **Ejemplo #3 Recuperación de los resultados provenientes de un procedimiento almacenado**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");
$mysqli-&gt;query("INSERT INTO test(id) VALUES (1), (2), (3)");

$mysqli-&gt;query("DROP PROCEDURE IF EXISTS p");
$mysqli-&gt;query('CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;');

$mysqli-&gt;multi_query("CALL p()");

do {
if ($res = $mysqli-&gt;store_result()) {
        var_dump($result-&gt;fetch_all());
$result-&gt;free();
    }
} while ($mysqli-&gt;next_result());

    El ejemplo anterior mostrará:

---

array(3) {
[0]=&gt;
array(1) {
[0]=&gt;
string(1) "1"
}
[1]=&gt;
array(1) {
[0]=&gt;
string(1) "2"
}
[2]=&gt;
array(1) {
[0]=&gt;
string(1) "3"
}
}

---

array(3) {
[0]=&gt;
array(1) {
[0]=&gt;
string(1) "2"
}
[1]=&gt;
array(1) {
[0]=&gt;
string(1) "3"
}
[2]=&gt;
array(1) {
[0]=&gt;
string(1) "4"
}
}

**Uso de las consultas preparadas**

No se requiere una gestión especial al utilizar la interfaz
de preparación de consultas para recuperar los resultados desde el mismo procedimiento
almacenado que el anterior. Las interfaces de consulta preparada y no preparada
son similares. Tenga en cuenta que todas las versiones del servidor MySQL no
soportan la preparación de las consultas SQL CALL.

    **Ejemplo #4 Procedimientos almacenados y consulta preparada**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");
if ($mysqli-&gt;connect_errno) {
echo "Fallo durante la conexión a MySQL: (" . $mysqli-&gt;connect_errno . ") " . $mysqli-&gt;connect_error;
}

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");
$mysqli-&gt;query("INSERT INTO test(id) VALUES (1), (2), (3)");

$mysqli-&gt;query("DROP PROCEDURE IF EXISTS p");
$mysqli-&gt;query('CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;');

$stmt = $mysqli-&gt;prepare("CALL p()");

if (!$stmt-&gt;execute()) {
echo "Fallo durante la ejecución: (" . $stmt-&gt;errno . ") " . $stmt-&gt;error;
}

do {
if ($result = $stmt-&gt;get_result()) {
        var_dump($result-&gt;fetch_all());
$result-&gt;free();
    }
} while ($stmt-&gt;next_results());

        El ejemplo anterior mostrará:

---

array(3) {
[0]=&gt;
array(1) {
[0]=&gt;
int(1)
}
[1]=&gt;
array(1) {
[0]=&gt;
int(2)
}
[2]=&gt;
array(1) {
[0]=&gt;
int(3)
}
}

---

array(3) {
[0]=&gt;
array(1) {
[0]=&gt;
int(2)
}
[1]=&gt;
array(1) {
[0]=&gt;
int(3)
}
[2]=&gt;
array(1) {
[0]=&gt;
int(4)
}
}

Por supuesto, el uso de la API de enlace para la recuperación también es soportado.

    **Ejemplo #5 Procedimientos almacenados y consulta preparada utilizando la API de enlace**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");
$mysqli-&gt;query("INSERT INTO test(id) VALUES (1), (2), (3)");

$mysqli-&gt;query("DROP PROCEDURE IF EXISTS p");
$mysqli-&gt;query('CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;');

$stmt = $mysqli-&gt;prepare("CALL p()");

$stmt-&gt;execute();

do {
if ($stmt-&gt;store_result()) {
        $stmt-&gt;bind_result($id_out);
while ($stmt-&gt;fetch()) {
            echo "id = $id_out\n";
        }
    }
} while ($stmt-&gt;next_result());

        El ejemplo anterior mostrará:

id = 1
id = 2
id = 3
id = 2
id = 3
id = 4

**Ver también**

    - [mysqli::query()](#mysqli.query)

    - [mysqli::multi_query()](#mysqli.multi-query)

    - [mysqli::next_result()](#mysqli.next-result)

    - [mysqli::more_results()](#mysqli.more-results)

## Consultas múltiples

MySQL permite opcionalmente tener múltiples consultas en una
sola cadena de consulta pero requiere una gestión especial.

Las consultas múltiples o multiconsultas deben ser ejecutadas
con la función [mysqli::multi_query()](#mysqli.multi-query). Las consultas
individuales en la cadena de consulta están separadas por un punto y coma.
Luego, todos los juegos de resultados devueltos por la ejecución de las consultas
deben ser recuperados.

El servidor MySQL permite tener consultas que devuelven juegos
de resultados así como consultas que no devuelven ningún juego de resultados
en la misma consulta múltiple.

    **Ejemplo #1 Consultas múltiples**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$mysqli-&gt;query("DROP TABLE IF EXISTS test");
$mysqli-&gt;query("CREATE TABLE test(id INT)");

$sql = "SELECT COUNT(_) AS \_num FROM test;
INSERT INTO test(id) VALUES (1);
SELECT COUNT(_) AS \_num FROM test; ";

$mysqli-&gt;multi_query($sql);

do {
if ($result = $mysqli-&gt;store_result()) {
        var_dump($result-&gt;fetch_all(MYSQLI_ASSOC));
$result-&gt;free();
    }
} while ($mysqli-&gt;next_result());

    El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
array(1) {
["_num"]=&gt;
string(1) "0"
}
}
array(1) {
[0]=&gt;
array(1) {
["_num"]=&gt;
string(1) "1"
}
}

**Desde un punto de vista de seguridad**

Las funciones [mysqli::query()](#mysqli.query) y
[mysqli::real_query()](#mysqli.real-query) de la API no definen un flag de conexión necesario para la activación de las multiconsultas en
el servidor. Una llamada adicional a la API es utilizada para las multiconsultas
para reducir la probabilidad de inyección SQL accidental. Un atacante puede
intentar agregar consultas como
; DROP DATABASE mysql o ; SELECT SLEEP(999).
Si el atacante logra agregar este tipo de SQL en la cadena de consulta
pero que [mysqli::multi_query()](#mysqli.multi-query) no es utilizado, el servidor
solo ejecutará la primera consulta, pero no la segunda que representa la consulta SQL
maliciosa.

    **Ejemplo #2 Inyección SQL**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");
$result = $mysqli-&gt;query("SELECT 1; DROP TABLE mysql.user");

    El ejemplo anterior mostrará:

PHP Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax;
check the manual that corresponds to your MySQL server version for the right syntax to
use near 'DROP TABLE mysql.user' at line 1

**Consultas preparadas**

El uso de consultas múltiples con consultas preparadas no es soportado.

**Ver también**

    - [mysqli::query()](#mysqli.query)

    - [mysqli::multi_query()](#mysqli.multi-query)

    - **mysqli_result::next-result()**

    - **mysqli_result::more-results()**

## Soporte API para las transacciones

El servidor MySQL soporta las transacciones dependiendo del motor de almacenamiento utilizado.
Desde MySQL 5.5, el motor de almacenamiento por omisión es InnoDB.
InnoDB tiene un soporte completo de las transacciones ACID.

Las transacciones pueden ser controladas utilizando SQL, o mediante llamadas API.
Se recomienda utilizar las llamadas API para activar o desactivar
el modo autocommit y para validar y anular las transacciones.

    **Ejemplo #1 Definir el modo autocommit a través de SQL o a través de la API**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

// Recomendado: uso de la API para controlar la configuración de las transacciones
$mysqli-&gt;autocommit(false);

// No será monitoreado y reconocido por el plugin de replicación y balanceo de carga
$mysqli-&gt;query('SET AUTOCOMMIT = 0');

Los paquetes de funcionalidades adicionales, como los plugins de replicación
y balanceo de carga pueden monitorear las llamadas API. El plugin de replicación
ofrece seguridad sobre las transacciones durante el balanceo de carga, si
las transacciones son controladas con llamadas API. La seguridad de
las transacciones durante el balanceo de carga no está disponible si las consultas
SQL son utilizadas para definir el modo autocommit, para validar o anular
una transacción.

    **Ejemplo #2 Validación y anulación de una transacción**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");
$mysqli-&gt;autocommit(false);

$mysqli-&gt;query("INSERT INTO test(id) VALUES (1)");
$mysqli-&gt;rollback();

$mysqli-&gt;query("INSERT INTO test(id) VALUES (2)");
$mysqli-&gt;commit();

Tenga en cuenta que el servidor MySQL no puede anular todas las consultas.
Algunas consultas requieren una validación implícita.

**Ver también**

    - [mysqli::autocommit()](#mysqli.autocommit)

    - [mysqli::begin_transaction()](#mysqli.begin-transaction)

    - [mysqli::commit()](#mysqli.commit)

    - [mysqli::rollback()](#mysqli.rollback)

## Las metadatos

Un juego de resultados MySQL contiene metadatos. Estos describen
las columnas encontradas en el juego de resultados. Todos los metadatos
enviados por MySQL son accesibles a través de la interfaz mysqli.
La extensión no realiza ninguna modificación
sobre las informaciones que recibe. Las diferencias entre las versiones MySQL
no son idénticas.

Los metadatos pueden ser consultados a través de la interfaz
[mysqli_result](#class.mysqli-result).

    **Ejemplo #1
     Acceso a los metadatos del juego de resultados**

&lt;?php

$mysqli = new mysqli("example.com", "user", "password", "database");
if ($mysqli-&gt;connect_errno) {
echo "Fallo durante la conexión a MySQL: (" . $mysqli-&gt;connect_errno . ") " . $mysqli-&gt;connect_error;
}

$res = $mysqli-&gt;query("SELECT 1 AS _one, 'Hello' AS _two FROM DUAL");
var_dump($res-&gt;fetch_fields());

    El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
object(stdClass)#3 (13) {
["name"]=&gt;
string(4) "\_one"
["orgname"]=&gt;
string(0) ""
["table"]=&gt;
string(0) ""
["orgtable"]=&gt;
string(0) ""
["def"]=&gt;
string(0) ""
["db"]=&gt;
string(0) ""
["catalog"]=&gt;
string(3) "def"
["max_length"]=&gt;
int(1)
["length"]=&gt;
int(1)
["charsetnr"]=&gt;
int(63)
["flags"]=&gt;
int(32897)
["type"]=&gt;
int(8)
["decimals"]=&gt;
int(0)
}
[1]=&gt;
object(stdClass)#4 (13) {
["name"]=&gt;
string(4) "\_two"
["orgname"]=&gt;
string(0) ""
["table"]=&gt;
string(0) ""
["orgtable"]=&gt;
string(0) ""
["def"]=&gt;
string(0) ""
["db"]=&gt;
string(0) ""
["catalog"]=&gt;
string(3) "def"
["max_length"]=&gt;
int(5)
["length"]=&gt;
int(5)
["charsetnr"]=&gt;
int(8)
["flags"]=&gt;
int(1)
["type"]=&gt;
int(253)
["decimals"]=&gt;
int(31)
}
}

**Consultas preparadas**

Los metadatos de los juegos de resultados creados utilizando consultas
preparadas son accesibles de la misma manera. Un manejador
[mysqli_result](#class.mysqli-result) utilizable es devuelto por
la función [mysqli_stmt::result_metadata()](#mysqli-stmt.result-metadata).

    **Ejemplo #2 Metadatos a través de consultas preparadas**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("example.com", "user", "password", "database");

$stmt = $mysqli-&gt;prepare("SELECT 1 AS _one, 'Hello' AS _two FROM DUAL");
$stmt-&gt;execute();

$result = $stmt-&gt;result_metadata();
var_dump($result-&gt;fetch_fields());

**Ver también**

    - [mysqli::query()](#mysqli.query)

    - [mysqli_result::fetch_fields()](#mysqli-result.fetch-fields)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mysqli.requirements)
- [Instalación](#mysqli.installation)
- [Configuración en tiempo de ejecución](#mysqli.configuration)

    ## Requerimientos

    Para que estas funciones estén disponibles, es necesario compilar PHP con
    el soporte de la extensión mysqli.

    **MySQL 8**

    Si PHP es utilizado en una versión anterior a la 7.1.16, o PHP 7.2 anterior a 7.2.4,
    el plugin de contraseña debe ser definido a
    _mysql_native_password_ para MySQL 8 Server, ya que de lo contrario pueden aparecer errores
    similares a _The server requested authentication method unknown to the
    client [caching_sha2_password]_ incluso si
    _caching_sha2_password_ no es utilizado.

    Esto se debe a que MySQL 8 utiliza por omisión caching_sha2_password,
    un plugin que no es reconocido por las versiones antiguas de PHP (mysqlnd).
    En su lugar, es necesario modificar el parámetro
    default_authentication_plugin=mysql_native_password en
    my.cnf. El plugin _caching_sha2_password_
    es completamente soportado a partir de PHP 7.4.4. Para versiones anteriores,
    la extensión [mysql_xdevapi](#book.mysql-xdevapi) lo soporta.

## Instalación

La extensión mysqli fue introducida en PHP 5.0.0.
El controlador nativo MySQL (MySQL Native Driver) fue introducido en PHP 5.3.0.

## Instalación en Linux

Las distribuciones Linux incluyen versiones binarias de PHP que pueden
ser instaladas. Aunque estos binarios están construidos con las extensiones
MySQL, las bibliotecas cliente deben ser instaladas a menudo mediante un
paquete adicional. Verifique si este es el caso para su distribución.

Por ejemplo, en Ubuntu el paquete php5-mysql instala las
extensiones PHP ext/mysql, ext/mysqli y pdo_mysql. En CentOS, el paquete
php-mysql instala también estas tres extensiones PHP.

Alternativamente, es posible compilar esta extensión manualmente. Construir
PHP desde las fuentes permite especificar las extensiones MySQL a incluir,
así como las bibliotecas cliente de cada extensión.

El controlador nativo MySQL es la biblioteca cliente recomendada, ya que ofrece
un aumento de rendimiento y proporciona acceso a características
que no están disponibles al utilizar la biblioteca cliente MySQL. Consulte la sección
[¿Qué es el controlador nativo MySQL de PHP?](#mysqli.overview.mysqlnd)
para una breve descripción de las ventajas del controlador nativo MySQL.

/path/to/mysql_config representa la ruta de acceso del programa
mysql_config proporcionado con MySQL servidor.

   <caption>**Matriz de soporte para la compilación mysqli**</caption>
   
    
     
      Versión PHP
      Por defecto
      Opciones de configuración : [mysqlnd](#mysqlnd.overview)
      Opciones de configuración : libmysqlclient
      Historial de cambios


      5.4.x y posteriores
      mysqlnd
      **--with-mysqli**
      **--with-mysqli=/path/to/mysql_config**
      mysqlnd por omisión



      5.3.x
      libmysqlclient
      **--with-mysqli=mysqlnd**
      **--with-mysqli=/path/to/mysql_config**
      mysqlnd es soportado



      5.0.x, 5.1.x, 5.2.x
      libmysqlclient
      No Disponible
      **--with-mysqli=/path/to/mysql_config**
      mysqlnd no es soportado


Cabe señalar que es posible mezclar las extensiones MySQL así como las
bibliotecas cliente. Por ejemplo, es posible activar la extensión
MySQL para utilizar la biblioteca cliente MySQL (libmysqlclient) mientras se configura
la extensión mysqli para utilizar el controlador nativo MySQL.
Todas las combinaciones de extensiones y bibliotecas cliente son posibles.

## Instalación en sistemas Windows

En Windows, la DLL php_mysqli.dll debe ser activada en el fichero
php.ini.

Para activar una extensión PHP (tal como
php_mysqli.dll), la directiva PHP
[extension_dir](#ini.extension-dir) debe apuntar hacia
el directorio que contiene las extensiones PHP. Consulte también
[Instalación manual en Windows
](#install.windows.manual). Por ejemplo, extension_dir podría tener el valor
c:\php\ext.

**Nota**:

    Si al iniciar el servidor web se produce un error como
    "Unable to load dynamic library './php_mysqli.dll'",
    es porque php_mysqli.dll y/o
    libmysql.dll no pueden ser encontrados en el sistema.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración MySQLi**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [mysqli.allow_local_infile](#ini.mysqli.allow-local-infile)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Anterior a PHP 7.2.16 y 7.3.3 el valor por omisión era "1".



      [mysqli.local_infile_directory](#ini.mysqli.local-infile-directory)
       
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de PHP 8.1.0.



      [mysqli.allow_persistent](#ini.mysqli.allow-persistent)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysqli.max_persistent](#ini.mysqli.max-persistent)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysqli.max_links](#ini.mysqli.max-links)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [mysqli.default_port](#ini.mysqli.default-port)
      "3306"
      **[INI_ALL](#constant.ini-all)**
       



      [mysqli.default_socket](#ini.mysqli.default-socket)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysqli.default_host](#ini.mysqli.default-host)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysqli.default_user](#ini.mysqli.default-user)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysqli.default_pw](#ini.mysqli.default-pw)
      NULL
      **[INI_ALL](#constant.ini-all)**
       



      [mysqli.reconnect](#ini.mysqli.reconnect)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Eliminada a partir de PHP 8.2.0



      [mysqli.rollback_on_cached_plink](#ini.mysqli.rollback-on-cached-plink)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Para más detalles y definiciones sobre las constantes INI\_\* anteriores,
consulte el capítulo sobre [
modificaciones de configuración](#configuration.changes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     mysqli.allow_local_infile
     [int](#language.types.integer)



      Permite el acceso, desde PHP, a los ficheros locales cargados con LOAD DATA.








     mysqli.local_infile_directory
     [string](#language.types.string)



      Permite una carga restringida LOCAL DATA hacia ficheros que se encuentren
      en el directorio designado.








     mysqli.allow_persistent
     [int](#language.types.integer)



      Activa la posibilidad de crear conexiones persistentes utilizando
      la función [mysqli_connect()](#function.mysqli-connect).







     mysqli.max_persistent
     [int](#language.types.integer)



      Número máximo de conexiones persistentes que pueden realizarse.
      Establecer a 0 para "ilimitado".







     mysqli.max_links
     [int](#language.types.integer)



      El número máximo de conexiones MySQL por proceso, incluyendo las
      conexiones persistentes.







     mysqli.default_port
     [int](#language.types.integer)



      El número de puerto TCP por omisión a utilizar al conectarse
      al servidor si no se proporciona otro puerto. Si no está definido,
      el puerto se obtendrá de la variable de entorno
      MYSQL_TCP_PORT, la entrada mysql-tcp
      en /etc/services o la constante de compilación
      MYSQL_PORT, en este orden. Win32 solo utilizará la
      constante MYSQL_PORT.








     mysqli.default_socket
     [string](#language.types.string)



      El nombre por omisión del socket a utilizar durante las conexiones locales
      al servidor si no se proporciona otro nombre.







     mysqli.default_host
     [string](#language.types.string)



     El servidor por omisión a utilizar al conectarse a un
     servidor si no se proporciona otro host.








     mysqli.default_user
     [string](#language.types.string)



      El nombre de usuario por omisión a utilizar al conectarse
      a un servidor si no se proporciona otro nombre.








     mysqli.default_pw
     [string](#language.types.string)



      La contraseña por omisión a utilizar al conectarse
      a un servidor si no se proporciona otra contraseña.








     mysqli.reconnect
     [int](#language.types.integer)



      Reconexión automática si la conexión se interrumpe.



     **Nota**:
      Esta directiva php.ini había sido ignorada por el controlador mysqlnd y fue eliminada
      a partir de PHP 8.2.0.








     mysqli.rollback_on_cached_plink
     [bool](#language.types.boolean)



      Si esta opción está activada, el cierre de una conexión permanente anula
      todas las transacciones pendientes de esta conexión antes de ser reemplazada
      en el grupo de conexiones persistentes. De lo contrario, las transacciones pendientes
      serán restauradas únicamente cuando la conexión es reutilizada o
      cuando se cierra realmente.


Los usuarios no pueden cambiar MYSQL_OPT_READ_TIMEOUT mediante una llamada
a la API o en tiempo de ejecución.
Tenga en cuenta que incluso si es posible, habrá diferencias en la manera en que
libmysqlclient y los flujos van a interpretar el valor de
MYSQL_OPT_READ_TIMEOUT.

# La extensión mysqli y las conexiones persistentes

La idea detrás de las conexiones persistentes es que las conexiones
entre los clientes y la base de datos pueden ser reutilizadas por otro proceso
cliente, en lugar de ser destruidas y recreadas numerosas veces. Esto reduce
el coste de creación de conexiones cada vez que una de ellas es requerida,
ya que las conexiones se almacenan en caché para ser recicladas.

A diferencia de la extensión MySQL, MySQLi no proporciona una función
separada para abrir conexiones persistentes. Para abrir una conexión
persistente, se debe añadir p: al nombre del host
al conectar.

El problema de las conexiones persistentes es que pueden ser dejadas
en un estado impredecible por los clientes. Por ejemplo, un bloqueo de tabla
puede haber sido puesto antes de que el cliente se desconecte inesperadamente.
Un nuevo cliente tomará entonces la conexión, pero
tal cual. Sería necesario entonces que el nuevo cliente realice
una limpieza en profundidad de la conexión antes de poder reutilizarla
sin interferencias, lo cual es una desventaja para el programador.

La conexión persistente de la extensión mysqli
proporciona un método de limpieza automática. La limpieza es realizada
por mysqli e incluye:

- La cancelación de las transacciones activas.

- El cierre y destrucción de las tablas temporales.

- El desbloqueo de las tablas.

- La restauración de los valores por defecto de las variables de sesión.

- La liberación de las sentencias preparadas (esto siempre ocurre con PHP).

- El cierre del manejador.

- La liberación de los bloqueos puestos por **GET_LOCK()**.

Esto asegura que la conexión persistente está en una condición correcta
antes de ser devuelta al grupo de conexiones, y que un cliente diferente
la retome.

La extensión mysqli realiza esta limpieza
llamando automáticamente a la función C mysql_change_user().

La limpieza automática tiene sus ventajas e inconvenientes.
La ventaja es que el programador no necesita preocuparse por ello,
ya que es llamada automáticamente. Sin embargo, el inconveniente es
que este código puede _finalmente_ ser un poco más
lento, ya que debe ser llamado cada vez que la conexión es
devuelta al grupo de espera.

Es posible desactivar la limpieza del código, compilando
PHP con la opción **[MYSQLI_NO_CHANGE_USER_ON_PCONNECT](#constant.mysqli-no-change-user-on-pconnect)**.

**Nota**:

La extensión mysqli soporta las conexiones
persistentes con el MySQL Native Driver y con la biblioteca
MySQL.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[MYSQLI_READ_DEFAULT_GROUP](#constant.mysqli-read-default-group)**
    ([int](#language.types.integer))



     Lee las opciones en el grupo my.cnf
     o en el archivo especificado por **[MYSQLI_READ_DEFAULT_FILE](#constant.mysqli-read-default-file)**.







    **[MYSQLI_READ_DEFAULT_FILE](#constant.mysqli-read-default-file)**
    ([int](#language.types.integer))



     Lee las opciones en el archivo especificado, en lugar de en my.cnf.







     **[MYSQLI_OPT_CAN_HANDLE_EXPIRED_PASSWORDS](#constant.mysqli-opt-can-handle-expired-passwords)**
     ([int](#language.types.integer))



      Indica al servidor que el cliente puede gestionar el modo sandbox
      para las contraseñas expiradas.
      Puede ser utilizado con [mysqli_options()](#mysqli.options).





     **[MYSQLI_OPT_LOAD_DATA_LOCAL_DIR](#constant.mysqli-opt-load-data-local-dir)**
     ([int](#language.types.integer))



      Si está activada, esta opción especifica el directorio
      desde el cual la carga de datos LOCAL del lado del cliente está autorizada
      en las instrucciones LOAD DATA LOCAL.





    **[MYSQLI_OPT_CONNECT_TIMEOUT](#constant.mysqli-opt-connect-timeout)**
    ([int](#language.types.integer))



     Tiempo de expiración de la conexión, en segundos.







     **[MYSQLI_OPT_READ_TIMEOUT](#constant.mysqli-opt-read-timeout)**
     ([int](#language.types.integer))



      Tiempo de expiración de la ejecución de un comando en segundos.
      Disponible a partir de PHP 7.2.0.







    **[MYSQLI_OPT_LOCAL_INFILE](#constant.mysqli-opt-local-infile)**
    ([int](#language.types.integer))



     Activa el comando LOAD LOCAL INFILE.







     **[MYSQLI_OPT_INT_AND_FLOAT_NATIVE](#constant.mysqli-opt-int-and-float-native)**
     ([int](#language.types.integer))



      Convierte las columnas de tipo entero y número de coma flotante en
      números PHP. Solo válido para mysqlnd.







     **[MYSQLI_OPT_NET_CMD_BUFFER_SIZE](#constant.mysqli-opt-net-cmd-buffer-size)**
     ([int](#language.types.integer))



      El tamaño del buffer interno de comando/red. Solo válido para mysqlnd.







     **[MYSQLI_OPT_NET_READ_BUFFER_SIZE](#constant.mysqli-opt-net-read-buffer-size)**
     ([int](#language.types.integer))



      Tamaño en bytes de la porción máxima a leer, al leer
      el cuerpo de un paquete de comando MySQL. Solo válido para mysqlnd.







     **[MYSQLI_OPT_SSL_VERIFY_SERVER_CERT](#constant.mysqli-opt-ssl-verify-server-cert)**
     ([int](#language.types.integer))










    **[MYSQLI_INIT_COMMAND](#constant.mysqli-init-command)**
    ([int](#language.types.integer))



     Comando a ejecutar al conectarse al servidor MySQL.
     Este comando se ejecutará automáticamente al reconectarse
     al servidor.







     **[MYSQLI_CLIENT_CAN_HANDLE_EXPIRED_PASSWORDS](#constant.mysqli-client-can-handle-expired-passwords)**
    ([int](#language.types.integer))



      Indica al servidor que el cliente puede gestionar el modo sandbox
      para las contraseñas expiradas.
      Puede ser utilizado con [mysqli_real_connect()](#mysqli.real-connect).





     **[MYSQLI_CLIENT_FOUND_ROWS](#constant.mysqli-client-found-rows)**
    ([int](#language.types.integer))



      Devuelve el número de filas coincidentes, no el número de filas afectadas.





     **[MYSQLI_CLIENT_SSL_VERIFY_SERVER_CERT](#constant.mysqli-client-ssl-verify-server-cert)**
    ([int](#language.types.integer))



      Verifica el certificado del servidor.





    **[MYSQLI_CLIENT_SSL](#constant.mysqli-client-ssl)**
    ([int](#language.types.integer))



     Utiliza el protocolo SSL (cifrado). Esta opción no debe
     ser activada por un programa: debe ser activada internamente,
     por la biblioteca MySQL.







    **[MYSQLI_CLIENT_COMPRESS](#constant.mysqli-client-compress)**
    ([int](#language.types.integer))



     Utiliza el protocolo comprimido.







    **[MYSQLI_CLIENT_INTERACTIVE](#constant.mysqli-client-interactive)**
    ([int](#language.types.integer))



     Permite interactive_timeout segundos (en lugar de
     wait_timeout segundos) de inactividad antes de
     cerrar la conexión. El valor de la variable
     wait_timeout del cliente tomará el valor de
     interactive_timeout.







    **[MYSQLI_CLIENT_IGNORE_SPACE](#constant.mysqli-client-ignore-space)**
    ([int](#language.types.integer))



     Permite espacios después de un nombre de función. Esto hace que todos los nombres
     de funciones sean palabras reservadas.







    **[MYSQLI_CLIENT_NO_SCHEMA](#constant.mysqli-client-no-schema)**
    ([int](#language.types.integer))



     Prohíbe la sintaxis db_name.tbl_name.col_name.

**[MYSQLI_CLIENT_MULTI_QUERIES](#constant.mysqli-client-multi-queries)**

     Permite múltiples consultas separadas por un punto y coma
     en una sola llamada a la función [mysqli_query()](#mysqli.query).







    **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**
    ([int](#language.types.integer))



     Para los resultados almacenados en búfer. Tiene un valor de 0.







     **[MYSQLI_STORE_RESULT_COPY_DATA](#constant.mysqli-store-result-copy-data)**
     ([int](#language.types.integer))



      Desde PHP 8.1, esta constante ya no tiene ningún efecto.
      Antes de PHP 8.1, esta constante se utilizaba para copiar los resultados
      del búfer interno mysqlnd
      en las variables PHP recuperadas.
      Por defecto, mysqlnd utilizará una lógica de referencia
      para evitar copiar y duplicar los resultados mantenidos en memoria.
      Para ciertos conjuntos de resultados, por ejemplo, conjuntos de resultados con muchas filas pequeñas,
      el enfoque de copia puede reducir el uso global de la memoria
      ya que las variables PHP que contienen los resultados pueden ser liberadas antes.
      Disponible únicamente con mysqlnd.
      Obsoleto a partir de PHP 8.4.0.





    **[MYSQLI_USE_RESULT](#constant.mysqli-use-result)**
    ([int](#language.types.integer))



     Para los resultados no almacenados en búfer. Tiene un valor de 1.







    **[MYSQLI_ASSOC](#constant.mysqli-assoc)**
    ([int](#language.types.integer))



     Las columnas se devuelven en el array, con sus
     nombres como índices.







    **[MYSQLI_NUM](#constant.mysqli-num)**
    ([int](#language.types.integer))



     Las columnas se devuelven en el array, con sus
     números como índices.







    **[MYSQLI_BOTH](#constant.mysqli-both)**
    ([int](#language.types.integer))



     Las columnas se devuelven en el array, con sus
     nombres y sus números como índices.







    **[MYSQLI_NOT_NULL_FLAG](#constant.mysqli-not-null-flag)**
    ([int](#language.types.integer))



     Indica que un campo está definido como NOT NULL.







    **[MYSQLI_PRI_KEY_FLAG](#constant.mysqli-pri-key-flag)**
    ([int](#language.types.integer))



     El campo es una clave primaria.







    **[MYSQLI_UNIQUE_KEY_FLAG](#constant.mysqli-unique-key-flag)**
    ([int](#language.types.integer))



     El campo es un índice único.








    **[MYSQLI_MULTIPLE_KEY_FLAG](#constant.mysqli-multiple-key-flag)**
    ([int](#language.types.integer))



     El campo forma parte de un índice.







    **[MYSQLI_BLOB_FLAG](#constant.mysqli-blob-flag)**
    ([int](#language.types.integer))



     El campo es de tipo BLOB.







    **[MYSQLI_UNSIGNED_FLAG](#constant.mysqli-unsigned-flag)**
    ([int](#language.types.integer))



     El campo es de tipo UNSIGNED.







    **[MYSQLI_ZEROFILL_FLAG](#constant.mysqli-zerofill-flag)**
    ([int](#language.types.integer))



     El campo es de tipo ZEROFILL.







    **[MYSQLI_AUTO_INCREMENT_FLAG](#constant.mysqli-auto-increment-flag)**
    ([int](#language.types.integer))



     El campo es de tipo AUTO_INCREMENT.







    **[MYSQLI_TIMESTAMP_FLAG](#constant.mysqli-timestamp-flag)**
    ([int](#language.types.integer))



     El campo es de tipo TIMESTAMP.







    **[MYSQLI_SET_FLAG](#constant.mysqli-set-flag)**
    ([int](#language.types.integer))



     El campo es de tipo SET.







    **[MYSQLI_NUM_FLAG](#constant.mysqli-num-flag)**
    ([int](#language.types.integer))



     El campo es de tipo NUMERIC.







    **[MYSQLI_PART_KEY_FLAG](#constant.mysqli-part-key-flag)**
    ([int](#language.types.integer))



     El campo forma parte de un índice múltiple.







    **[MYSQLI_GROUP_FLAG](#constant.mysqli-group-flag)**
    ([int](#language.types.integer))



     El campo forma parte de la cláusula GROUP BY.







     **[MYSQLI_NO_DEFAULT_VALUE_FLAG](#constant.mysqli-no-default-value-flag)**
     ([int](#language.types.integer))



      Una columna no tiene una cláusula DEFAULT en su definición.
      Esto no se aplica a las columnas NULL
      o AUTO_INCREMENT
      ya que estas columnas tienen respectivamente un valor por defecto de NULL
      y un valor por defecto implícito.





    **[MYSQLI_TYPE_DECIMAL](#constant.mysqli-type-decimal)**
    ([int](#language.types.integer))



     El campo es de tipo DECIMAL.







    **[MYSQLI_TYPE_NEWDECIMAL](#constant.mysqli-type-newdecimal)**
    ([int](#language.types.integer))



     El campo es de tipo DECIMAL o
     NUMERIC.







    **[MYSQLI_TYPE_BIT](#constant.mysqli-type-bit)**
    ([int](#language.types.integer))



     El campo es de tipo BIT.







    **[MYSQLI_TYPE_TINY](#constant.mysqli-type-tiny)**
    ([int](#language.types.integer))



     El campo es de tipo TINYINT.







    **[MYSQLI_TYPE_SHORT](#constant.mysqli-type-short)**
    ([int](#language.types.integer))



     El campo es de tipo SMALLINT.







    **[MYSQLI_TYPE_LONG](#constant.mysqli-type-long)**
    ([int](#language.types.integer))



     El campo es de tipo INT.







    **[MYSQLI_TYPE_FLOAT](#constant.mysqli-type-float)**
    ([int](#language.types.integer))



     El campo es de tipo FLOAT.







    **[MYSQLI_TYPE_DOUBLE](#constant.mysqli-type-double)**
    ([int](#language.types.integer))



     El campo es de tipo DOUBLE.







    **[MYSQLI_TYPE_NULL](#constant.mysqli-type-null)**
    ([int](#language.types.integer))



     El campo es de tipo DEFAULT NULL.







    **[MYSQLI_TYPE_TIMESTAMP](#constant.mysqli-type-timestamp)**
    ([int](#language.types.integer))



     El campo es de tipo TIMESTAMP.







    **[MYSQLI_TYPE_LONGLONG](#constant.mysqli-type-longlong)**
    ([int](#language.types.integer))



     El campo es de tipo BIGINT.







    **[MYSQLI_TYPE_INT24](#constant.mysqli-type-int24)**
    ([int](#language.types.integer))



     El campo es de tipo MEDIUMINT.







    **[MYSQLI_TYPE_DATE](#constant.mysqli-type-date)**
    ([int](#language.types.integer))



     El campo es de tipo DATE.







    **[MYSQLI_TYPE_TIME](#constant.mysqli-type-time)**
    ([int](#language.types.integer))



     El campo es de tipo TIME.







    **[MYSQLI_TYPE_DATETIME](#constant.mysqli-type-datetime)**
    ([int](#language.types.integer))



     El campo es de tipo DATETIME.







    **[MYSQLI_TYPE_YEAR](#constant.mysqli-type-year)**
    ([int](#language.types.integer))



     El campo es de tipo YEAR.







    **[MYSQLI_TYPE_NEWDATE](#constant.mysqli-type-newdate)**
    ([int](#language.types.integer))



     El campo es de tipo DATE.







    **[MYSQLI_TYPE_INTERVAL](#constant.mysqli-type-interval)**
    ([int](#language.types.integer))



     Alias de **[MYSQLI_TYPE_ENUM](#constant.mysqli-type-enum)**. Eliminado desde PHP 8.4.0.







    **[MYSQLI_TYPE_ENUM](#constant.mysqli-type-enum)**
    ([int](#language.types.integer))



     El campo es de tipo ENUM.







    **[MYSQLI_TYPE_SET](#constant.mysqli-type-set)**
    ([int](#language.types.integer))



     El campo es de tipo SET.







    **[MYSQLI_TYPE_TINY_BLOB](#constant.mysqli-type-tiny-blob)**
    ([int](#language.types.integer))



     El campo es de tipo TINYBLOB.







    **[MYSQLI_TYPE_MEDIUM_BLOB](#constant.mysqli-type-medium-blob)**
    ([int](#language.types.integer))



     El campo es de tipo MEDIUMBLOB.







    **[MYSQLI_TYPE_LONG_BLOB](#constant.mysqli-type-long-blob)**
    ([int](#language.types.integer))



     El campo es de tipo LONGBLOB.







    **[MYSQLI_TYPE_BLOB](#constant.mysqli-type-blob)**
    ([int](#language.types.integer))



     El campo es de tipo BLOB.







    **[MYSQLI_TYPE_VAR_STRING](#constant.mysqli-type-var-string)**
    ([int](#language.types.integer))



     El campo es de tipo VARCHAR.







    **[MYSQLI_TYPE_STRING](#constant.mysqli-type-string)**
    ([int](#language.types.integer))



     El campo es de tipo STRING o BINARY.







    **[MYSQLI_TYPE_CHAR](#constant.mysqli-type-char)**
    ([int](#language.types.integer))



     El campo es de tipo TINYINT.
     Para CHAR, ver MYSQLI_TYPE_STRING.







    **[MYSQLI_TYPE_GEOMETRY](#constant.mysqli-type-geometry)**
    ([int](#language.types.integer))



     El campo es de tipo GEOMETRY.







    **[MYSQLI_TYPE_JSON](#constant.mysqli-type-json)**
    ([int](#language.types.integer))



     El campo es de tipo JSON.
     Únicamente válido para mysqlnd y MySQL 5.7.8 y posteriores.







    **[MYSQLI_TYPE_VECTOR](#constant.mysqli-type-vector)**
    ([int](#language.types.integer))



     El campo está definido como VECTOR.

**[MYSQLI_NEED_DATA](#constant.mysqli-need-data)**

     Quedan variables por enlazar.







    **[MYSQLI_ENUM_FLAG](#constant.mysqli-enum-flag)**
    ([int](#language.types.integer))



     El campo está definido como ENUM.







    **[MYSQLI_BINARY_FLAG](#constant.mysqli-binary-flag)**
    ([int](#language.types.integer))



     El campo está definido como BINARY.







    **[MYSQLI_CURSOR_TYPE_FOR_UPDATE](#constant.mysqli-cursor-type-for-update)**
    ([int](#language.types.integer))










    **[MYSQLI_CURSOR_TYPE_NO_CURSOR](#constant.mysqli-cursor-type-no-cursor)**
    ([int](#language.types.integer))



     Eliminado a partir de PHP 8.4.0.







    **[MYSQLI_CURSOR_TYPE_READ_ONLY](#constant.mysqli-cursor-type-read-only)**
    ([int](#language.types.integer))



     Eliminado a partir de PHP 8.4.0.







    **[MYSQLI_CURSOR_TYPE_SCROLLABLE](#constant.mysqli-cursor-type-scrollable)**
    ([int](#language.types.integer))



     Eliminado a partir de PHP 8.4.0.







    **[MYSQLI_STMT_ATTR_CURSOR_TYPE](#constant.mysqli-stmt-attr-cursor-type)**
    ([int](#language.types.integer))










    **[MYSQLI_STMT_ATTR_PREFETCH_ROWS](#constant.mysqli-stmt-attr-prefetch-rows)**
    ([int](#language.types.integer))










    **[MYSQLI_STMT_ATTR_UPDATE_MAX_LENGTH](#constant.mysqli-stmt-attr-update-max-length)**
    ([int](#language.types.integer))










    **[MYSQLI_SET_CHARSET_NAME](#constant.mysqli-set-charset-name)**
    ([int](#language.types.integer))










    **[MYSQLI_REPORT_INDEX](#constant.mysqli-report-index)**
    ([int](#language.types.integer))



     Reporta si se utiliza un índice incorrecto o ningún índice
     en una consulta.







    **[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**
    ([int](#language.types.integer))



     Reporta los errores desde llamadas a funciones mysqli.







    **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**
    ([int](#language.types.integer))



     Lanza una excepción mysqli_sql_exception
     para los errores en lugar de alertas.







    **[MYSQLI_REPORT_ALL](#constant.mysqli-report-all)**
    ([int](#language.types.integer))



     Activa todas las opciones.







    **[MYSQLI_REPORT_OFF](#constant.mysqli-report-off)**
    ([int](#language.types.integer))



     Desactiva todas las opciones.







    **[MYSQLI_DEBUG_TRACE_ENABLED](#constant.mysqli-debug-trace-enabled)**
    ([int](#language.types.integer))



     Establecido en 1 si la funcionalidad [mysqli_debug()](#mysqli.debug)
     está desactivada.







     **[MYSQLI_SERVER_PUBLIC_KEY](#constant.mysqli-server-public-key)**
     ([int](#language.types.integer))










    **[MYSQLI_REFRESH_GRANT](#constant.mysqli-refresh-grant)**
    ([int](#language.types.integer))



     Refresca las tablas GRANT.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_LOG](#constant.mysqli-refresh-log)**
    ([int](#language.types.integer))



     Vacía los logs, idéntico a ejecutar la consulta
     SQL FLUSH LOGS.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_TABLES](#constant.mysqli-refresh-tables)**
    ([int](#language.types.integer))



     Vacía la caché de las tablas, idéntico a ejecutar la consulta
     SQL FLUSH TABLES.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_HOSTS](#constant.mysqli-refresh-hosts)**
    ([int](#language.types.integer))



     Vacía la caché de los hosts, idéntico a ejecutar la
     consulta SQL FLUSH HOSTS.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_REPLICA](#constant.mysqli-refresh-replica)**
    ([int](#language.types.integer))



     Alias de la constante **[MYSQLI_REFRESH_SLAVE](#constant.mysqli-refresh-slave)**.
     Disponible a partir de PHP 8.1.0. Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_STATUS](#constant.mysqli-refresh-status)**
    ([int](#language.types.integer))



     Reinicia el estado de las variables, idéntico
     a ejecutar la consulta SQL FLUSH STATUS.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_THREADS](#constant.mysqli-refresh-threads)**
    ([int](#language.types.integer))



     Vacía la caché de los hilos.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_SLAVE](#constant.mysqli-refresh-slave)**
    ([int](#language.types.integer))



     En un servidor esclavo de replicación: reinicia las informaciones
     del servidor maestro, y reinicia el esclavo. Idéntico a ejecutar
     la consulta SQL RESET SLAVE.
     Obsoleto a partir de PHP 8.4.0.







    **[MYSQLI_REFRESH_MASTER](#constant.mysqli-refresh-master)**
    ([int](#language.types.integer))



     En un servidor maestro de replicación: elimina los archivos binarios
     de logs listados en el índice binario de logs, y trunca el archivo
     índice. Idéntico a ejecutar la consulta SQL
     RESET MASTER.
     Obsoleto a partir de PHP 8.4.0.







     **[MYSQLI_REFRESH_BACKUP_LOG](#constant.mysqli-refresh-backup-log)**
     ([int](#language.types.integer))



      Cierra y reabre los archivos de registro de copia de seguridad.
      Obsoleto a partir de PHP 8.4.0.





     **[MYSQLI_TRANS_COR_AND_CHAIN](#constant.mysqli-trans-cor-and-chain)**
     ([int](#language.types.integer))



      Añade "AND CHAIN" a [mysqli_commit()](#mysqli.commit) o
      [mysqli_rollback()](#mysqli.rollback).







     **[MYSQLI_TRANS_COR_AND_NO_CHAIN](#constant.mysqli-trans-cor-and-no-chain)**
     ([int](#language.types.integer))



      Añade "AND NO CHAIN" a [mysqli_commit()](#mysqli.commit) o
      [mysqli_rollback()](#mysqli.rollback).







     **[MYSQLI_TRANS_COR_RELEASE](#constant.mysqli-trans-cor-release)**
     ([int](#language.types.integer))



      Añade "RELEASE" a [mysqli_commit()](#mysqli.commit) o
      [mysqli_rollback()](#mysqli.rollback).







     **[MYSQLI_TRANS_COR_NO_RELEASE](#constant.mysqli-trans-cor-no-release)**
     ([int](#language.types.integer))



      Añade "NO RELEASE" a [mysqli_commit()](#mysqli.commit) o
      [mysqli_rollback()](#mysqli.rollback).







     **[MYSQLI_TRANS_START_READ_ONLY](#constant.mysqli-trans-start-read-only)**
     ([int](#language.types.integer))



      Inicia la transacción como "START TRANSACTION READ ONLY".







     **[MYSQLI_TRANS_START_READ_WRITE](#constant.mysqli-trans-start-read-write)**
     ([int](#language.types.integer))



      Inicia la transacción como "START TRANSACTION READ WRITE" con
      [mysqli_begin_transaction()](#mysqli.begin-transaction).







     **[MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT](#constant.mysqli-trans-start-with-consistent-snapshot)**
     ([int](#language.types.integer))



      Inicia la transacción como "START TRANSACTION WITH CONSISTENT SNAPSHOT"
      con [mysqli_begin_transaction()](#mysqli.begin-transaction).







     **[MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT](#constant.mysqli-client-ssl-dont-verify-server-cert)**
     ([int](#language.types.integer))



      Requiere MySQL 5.6.5 o posterior.







     **[MYSQLI_IS_MARIADB](#constant.mysqli-is-mariadb)**
     ([bool](#language.types.boolean))



      Si la extensión mysqli fue construida contra una biblioteca cliente MariaDB.
      Disponible a partir de PHP 8.1.2.







     **[MYSQLI_ASYNC](#constant.mysqli-async)**
     ([int](#language.types.integer))



      La consulta se ejecuta de manera asíncrona y ningún conjunto de resultados es devuelto inmediatamente.
      Disponible únicamente con mysqlnd.





     **[MYSQLI_ON_UPDATE_NOW_FLAG](#constant.mysqli-on-update-now-flag)**
     ([int](#language.types.integer))



      Si un campo es actualizado, recibirá el valor temporal actual.


# Notas

Algunas notas sobre la implementación:

- El soporte para MYSQL_TYPE_GEOMETRY
  fue añadido a la extensión MySQLI en PHP 5.3.

- Cabe señalar que existen diferencias internas de implementación
  entre libmysqlclient y mysqlnd
  para gestionar las columnas de tipo MYSQL_TYPE_GEOMETRY.
  En términos generales, mysqlnd asigna considerablemente
  menos memoria. Por ejemplo, si existe una columna de tipo
  POINT en el conjunto de resultados,
  libmysqlclient asignará aproximadamente 4GB de RAM
  mientras que solo se requieren 50 bytes para gestionar una columna de tipo
  POINT en memoria. La asignación de memoria es aún
  menor que 50 bytes al utilizar
  mysqlnd.

# Resumen de las funciones de la extensión MySQLi

  <caption>**Resumen de los métodos [mysqli](#class.mysqli)**</caption>
  
   
    
     Clase mysqli


     Interfaz POO
     Interfaz procedural
     Alias (No usar más)
     Descripción






     **Propiedades**



     [$mysqli::affected_rows](#mysqli.affected-rows)
     [mysqli_affected_rows()](#mysqli.affected-rows)
     N/A
     Devuelve el número de filas afectadas por la última operación MySQL



     [$mysqli::client_info](#mysqli.get-client-info)
     [mysqli_get_client_info()](#mysqli.get-client-info)
     N/A
     Devuelve la versión del cliente MySQL en forma de [string](#language.types.string)



     [$mysqli::client_version](#mysqli.get-client-version)
     [mysqli_get_client_version()](#mysqli.get-client-version)
     N/A
     Devuelve la información sobre la versión del cliente MySQL en forma de un entero



     [$mysqli::connect_errno](#mysqli.connect-errno)
     [mysqli_connect_errno()](#mysqli.connect-errno)
     N/A
     Devuelve el código de error de la conexión MySQL



     [$mysqli::connect_error](#mysqli.connect-error)
     [mysqli_connect_error()](#mysqli.connect-error)
     N/A
     Devuelve el mensaje de error de la conexión MySQL



     [$mysqli::errno](#mysqli.errno)
     [mysqli_errno()](#mysqli.errno)
     N/A
     Devuelve el código de error de conexión MySQL



     [$mysqli::error](#mysqli.error)
     [mysqli_error()](#mysqli.error)
     N/A
     Devuelve el mensaje de error de conexión MySQL



     [$mysqli::field_count](#mysqli.field-count)
     [mysqli_field_count()](#mysqli.field-count)
     N/A
     Devuelve el número de columnas para la última consulta



     [$mysqli::host_info](#mysqli.get-host-info)
     [mysqli_get_host_info()](#mysqli.get-host-info)
     N/A
     Devuelve una cadena que contiene el tipo de conexión utilizada



     [$mysqli::protocol_version](#mysqli.get-proto-info)
     [mysqli_get_proto_info()](#mysqli.get-proto-info)
     N/A
     Devuelve la versión del protocolo MySQL utilizado



     [$mysqli::server_info](#mysqli.get-server-info)
     [mysqli_get_server_info()](#mysqli.get-server-info)
     N/A
     Devuelve un entero que representa la versión del servidor MySQL



     [$mysqli::server_version](#mysqli.get-server-version)
     [mysqli_get_server_version()](#mysqli.get-server-version)
     N/A
     Devuelve la versión del servidor MySQL



     [$mysqli::info](#mysqli.info)
     [mysqli_info()](#mysqli.info)
     N/A
     Devuelve información sobre la última consulta ejecutada



     [$mysqli::insert_id](#mysqli.insert-id)
     [mysqli_insert_id()](#mysqli.insert-id)
     N/A
     Devuelve el identificador generado automáticamente por la última consulta



     [$mysqli::sqlstate](#mysqli.sqlstate)
     [mysqli_sqlstate()](#mysqli.sqlstate)
     N/A
     Devuelve el error SQLSTATE de la última operación MySQL



     [$mysqli::warning_count](#mysqli.warning-count)
     [mysqli_warning_count()](#mysqli.warning-count)
     N/A
     Devuelve el número de advertencias generadas por la última consulta



     **Métodos**



     [mysqli::autocommit()](#mysqli.autocommit)
     [mysqli_autocommit()](#mysqli.autocommit)
     N/A
     Activa o desactiva el modo auto-commit



     [mysqli::change_user()](#mysqli.change-user)
     [mysqli_change_user()](#mysqli.change-user)
     N/A
     Cambia el usuario de la conexión especificada



     [mysqli::character_set_name()](#mysqli.character-set-name)
     [mysqli_character_set_name()](#mysqli.character-set-name)
     **N/A()**
     Devuelve el juego de caracteres actual para la conexión



     [mysqli::close()](#mysqli.close)
     [mysqli_close()](#mysqli.close)
     N/A
     Cierra una conexión



     [mysqli::commit()](#mysqli.commit)
     [mysqli_commit()](#mysqli.commit)
     N/A
     Valida la transacción actual



     [mysqli::__construct()](#mysqli.construct)
     [mysqli_connect()](#function.mysqli-connect)
     N/A
     Abre una conexión a un servidor MySQL



     [mysqli::debug()](#mysqli.debug)
     [mysqli_debug()](#mysqli.debug)
     N/A
     Realiza acciones de depuración



     [mysqli::dump_debug_info()](#mysqli.dump-debug-info)
     [mysqli_dump_debug_info()](#mysqli.dump-debug-info)
     N/A
     Escribe la información de depuración en los registros



     [mysqli::get_charset()](#mysqli.get-charset)
     [mysqli_get_charset()](#mysqli.get-charset)
     N/A
     Devuelve un objeto que representa el juego de caracteres



     [mysqli::get_connection_stats()](#mysqli.get-connection-stats)
     [mysqli_get_connection_stats()](#mysqli.get-connection-stats)
     N/A
     Devuelve estadísticas sobre la conexión del cliente. Disponible solo con [mysqlnd](#book.mysqlnd).



     [mysqli::get_client_info()](#mysqli.get-client-info)
     [mysqli_get_client_info()](#mysqli.get-client-info)
     N/A
     Devuelve una cadena que contiene la versión del cliente MySQL



     N/A
     [mysqli_get_client_stats()](#function.mysqli-get-client-stats)
     N/A
     Devuelve las estadísticas del cliente MySQL. Disponible solo con [mysqlnd](#book.mysqlnd).



     [mysqli::get_server_info()](#mysqli.get-server-info)
     [mysqli_get_server_info()](#mysqli.get-server-info)
     N/A
     Devuelve una cadena que representa la versión del servidor MySQL al que la extensión MySQLi está conectada



     [mysqli::get_warnings()](#mysqli.get-warnings)
     [mysqli_get_warnings()](#mysqli.get-warnings)
     N/A
     No documentado



     [mysqli::init()](#mysqli.init)
     [mysqli_init()](#mysqli.init)
     N/A
     Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()



     [mysqli::kill()](#mysqli.kill)
     [mysqli_kill()](#mysqli.kill)
     N/A
     Solicita al servidor que termine un hilo MySQL



     [mysqli::more_results()](#mysqli.more-results)
     [mysqli_more_results()](#mysqli.more-results)
     N/A
     Verifica si hay más conjuntos de resultados MySQL disponibles



     [mysqli::multi_query()](#mysqli.multi-query)
     [mysqli_multi_query()](#mysqli.multi-query)
     N/A
     Ejecuta una consulta múltiple MySQL



     [mysqli::next_result()](#mysqli.next-result)
     [mysqli_next_result()](#mysqli.next-result)
     N/A
     Prepara el siguiente resultado de una consulta múltiple



     [mysqli::options()](#mysqli.options)
     [mysqli_options()](#mysqli.options)
     [mysqli_set_opt()](#function.mysqli-set-opt)
     Define las opciones



     [mysqli::ping()](#mysqli.ping)
     [mysqli_ping()](#mysqli.ping)
     N/A
     Hace ping a la conexión al servidor y se reconecta si ya no existe



     [mysqli::prepare()](#mysqli.prepare)
     [mysqli_prepare()](#mysqli.prepare)
     N/A
     Prepara una consulta SQL para su ejecución



     [mysqli::query()](#mysqli.query)
     [mysqli_query()](#mysqli.query)
     N/A
     Ejecuta una consulta en la base de datos



     [mysqli::real_connect()](#mysqli.real-connect)
     [mysqli_real_connect()](#mysqli.real-connect)
     N/A
     Abre una conexión a un servidor MySQL



     [mysqli::real_escape_string()](#mysqli.real-escape-string),
      [mysqli::escape_string()](#function.mysqli-escape-string)
     [mysqli_real_escape_string()](#mysqli.real-escape-string)
     [mysqli_escape_string()](#function.mysqli-escape-string)
     Protege los caracteres especiales de una cadena para usarla en una consulta



     [mysqli::real_query()](#mysqli.real-query)
     [mysqli_real_query()](#mysqli.real-query)
     N/A
     Ejecuta una consulta SQL



     [mysqli::refresh()](#mysqli.refresh)
     [mysqli_refresh()](#mysqli.refresh)
     N/A
     Reinicializa las tablas o las cachés, o reinicializa la información de replicación del servidor



     [mysqli::rollback()](#mysqli.rollback)
     [mysqli_rollback()](#mysqli.rollback)
     N/A
     Revierte la transacción actual



     [mysqli::select_db()](#mysqli.select-db)
     [mysqli_select_db()](#mysqli.select-db)
     N/A
     Selecciona una base de datos por defecto para las consultas



     [mysqli::set_charset()](#mysqli.set-charset)
     [mysqli_set_charset()](#mysqli.set-charset)
     N/A
     Define el juego de caracteres por defecto del cliente



     [mysqli::ssl_set()](#mysqli.ssl-set)
     [mysqli_ssl_set()](#mysqli.ssl-set)
     N/A
     Utilizada para establecer una conexión segura con SSL



     [mysqli::stat()](#mysqli.stat)
     [mysqli_stat()](#mysqli.stat)
     N/A
     Obtiene el estado actual del sistema



     [mysqli::stmt_init()](#mysqli.stmt-init)
     [mysqli_stmt_init()](#mysqli.stmt-init)
     N/A
     Inicializa un comando MySQL



     [mysqli::store_result()](#mysqli.store-result)
     [mysqli_store_result()](#mysqli.store-result)
     N/A
     Transfiere un conjunto de resultados desde la última consulta



     **mysqli::thread_id()**
     [mysqli_thread_id()](#mysqli.thread-id)
     N/A
     Devuelve el identificador del hilo para la conexión actual



     [mysqli::thread_safe()](#mysqli.thread-safe)
     [mysqli_thread_safe()](#mysqli.thread-safe)
     N/A
     Indica si el soporte de hilos está activado o no



     [mysqli::use_result()](#mysqli.use-result)
     [mysqli_use_result()](#mysqli.use-result)
     N/A
     Inicializa la recuperación de un conjunto de resultados

  <caption>**Resumen de los métodos [mysqli_stmt](#class.mysqli-stmt)**</caption>
  
   
    
     MySQL_STMT


     Interfaz POO
     Interfaz procedural
     Alias (No usar más)
     Descripción






     **Propiedades**



     [$mysqli_stmt::affected_rows](#mysqli-stmt.affected-rows)
     [mysqli_stmt_affected_rows()](#mysqli-stmt.affected-rows)
     N/A
     El número total de filas modificadas, eliminadas o insertadas por la última



     [$mysqli_stmt::errno](#mysqli-stmt.errno)
     [mysqli_stmt_errno()](#mysqli-stmt.errno)
     N/A
     El código de error de la última consulta



     [$mysqli_stmt::error](#mysqli-stmt.error)
     [mysqli_stmt_error()](#mysqli-stmt.error)
     N/A
     El mensaje de error de la última consulta



     [$mysqli_stmt::field_count](#mysqli-stmt.field-count)
     [mysqli_stmt_field_count()](#mysqli-stmt.field-count)
     N/A
     El número de campos presente en la consulta dada



     [$mysqli_stmt::insert_id](#mysqli-stmt.insert-id)
     [mysqli_stmt_insert_id()](#mysqli-stmt.insert-id)
     N/A
     El ID generado por la última consulta INSERT



     [$mysqli_stmt::num_rows](#mysqli-stmt.num-rows)
     [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows)
     N/A
     El número de filas de un resultado MySQL



     [$mysqli_stmt::param_count](#mysqli-stmt.param-count)
     [mysqli_stmt_param_count()](#mysqli-stmt.param-count)
     N/A
     El número de parámetros de un comando SQL



     [$mysqli_stmt::sqlstate](#mysqli-stmt.sqlstate)
     [mysqli_stmt_sqlstate()](#mysqli-stmt.sqlstate)
     N/A
     El código SQLSTATE de la última operación MySQL



     **Métodos**



     [mysqli_stmt::attr_get()](#mysqli-stmt.attr-get)
     [mysqli_stmt_attr_get()](#mysqli-stmt.attr-get)
     N/A
     Recupera el valor actual de un atributo de consulta



     [mysqli_stmt::attr_set()](#mysqli-stmt.attr-set)
     [mysqli_stmt_attr_set()](#mysqli-stmt.attr-set)
     N/A
     Modifica el comportamiento de una consulta preparada



     [mysqli_stmt::bind_param()](#mysqli-stmt.bind-param)
     [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param)
     N/A
     Vincula variables a una consulta MySQL



     [mysqli_stmt::bind_result()](#mysqli-stmt.bind-result)
     [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result)
     N/A
     Vincula variables a un conjunto de resultados



     [mysqli_stmt::close()](#mysqli-stmt.close)
     [mysqli_stmt_close()](#mysqli-stmt.close)
     N/A
     Termina una consulta preparada



     [mysqli_stmt::data_seek()](#mysqli-stmt.data-seek)
     [mysqli_stmt_data_seek()](#mysqli-stmt.data-seek)
     N/A
     Mueve el puntero de resultado



     [mysqli_stmt::execute()](#mysqli-stmt.execute)
     [mysqli_stmt_execute()](#mysqli-stmt.execute)
     [mysqli_execute()](#function.mysqli-execute)
     Ejecuta una consulta preparada



     [mysqli_stmt::fetch()](#mysqli-stmt.fetch)
     [mysqli_stmt_fetch()](#mysqli-stmt.fetch)
     N/A
     Lee resultados desde una consulta MySQL preparada en variables vinculadas



     [mysqli_stmt::free_result()](#mysqli-stmt.free-result)
     [mysqli_stmt_free_result()](#mysqli-stmt.free-result)
     N/A
     Libera el resultado MySQL de la memoria



     [mysqli_stmt::get_result()](#mysqli-stmt.get-result)
     [mysqli_stmt_get_result()](#mysqli-stmt.get-result)
     N/A
     Recupera el conjunto de resultados desde una consulta preparada. Disponible solo con [mysqlnd](#book.mysqlnd).



     [mysqli_stmt::get_warnings()](#mysqli-stmt.get-warnings)
     [mysqli_stmt_get_warnings()](#mysqli-stmt.get-warnings)
     N/A
     No documentado



     [mysqli_stmt::more_results()](#mysqli-stmt.more-results)
     [mysqli_stmt_more_results()](#mysqli-stmt.more-results)
     N/A
     Verifica si hay más resultados de consulta desde una consulta múltiple



     [mysqli_stmt::next_result()](#mysqli-stmt.next-result)
     [mysqli_stmt_next_result()](#mysqli-stmt.next-result)
     N/A
     Lee el siguiente resultado desde una consulta múltiple



     [mysqli_stmt::num_rows()](#mysqli-stmt.num-rows)
     [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows)
     N/A
     Ver también la propiedad [$mysqli_stmt-&gt;num_rows](#mysqli-stmt.num-rows)



     [mysqli_stmt::prepare()](#mysqli-stmt.prepare)
     [mysqli_stmt_prepare()](#mysqli-stmt.prepare)
     N/A
     Prepara una consulta SQL para su ejecución



     [mysqli_stmt::reset()](#mysqli-stmt.reset)
     [mysqli_stmt_reset()](#mysqli-stmt.reset)
     N/A
     Anula una consulta preparada



     [mysqli_stmt::result_metadata()](#mysqli-stmt.result-metadata)
     [mysqli_stmt_result_metadata()](#mysqli-stmt.result-metadata)
     N/A
     Devuelve los metadatos de preparación de consulta MySQL



     [mysqli_stmt::send_long_data()](#mysqli-stmt.send-long-data)
     [mysqli_stmt_send_long_data()](#mysqli-stmt.send-long-data)
     N/A
     Envía datos MySQL por paquetes



     [mysqli_stmt::store_result()](#mysqli-stmt.store-result)
     [mysqli_stmt_store_result()](#mysqli-stmt.store-result)
     N/A
     Almacena un conjunto de resultados desde una consulta preparada

  <caption>**Resumen de los métodos [mysqli_result](#class.mysqli-result)**</caption>
  
   
    
     mysqli_result


     Interfaz POO
     Interfaz procedural
     Alias (No usar más)
     Descripción






     **Propiedades**



     [$mysqli_result::current_field](#mysqli-result.current-field)
     [mysqli_field_tell()](#mysqli-result.current-field)
     N/A
     La posición actual de un campo en un puntero de resultado



     [$mysqli_result::field_count](#mysqli-result.field-count)
     [mysqli_num_fields()](#mysqli-result.field-count)
     N/A
     El número de campos en un resultado



     [$mysqli_result::lengths](#mysqli-result.lengths)
     [mysqli_fetch_lengths()](#mysqli-result.lengths)
     N/A
     Los tamaños de los campos en un resultado



     [$mysqli_result::num_rows](#mysqli-result.num-rows)
     [mysqli_num_rows()](#mysqli-result.num-rows)
     N/A
     El número de filas en un resultado



     **Métodos**



     [mysqli_result::data_seek()](#mysqli-result.data-seek)
     [mysqli_data_seek()](#mysqli-result.data-seek)
     N/A
     Mueve el puntero interno de resultado



     [mysqli_result::fetch_all()](#mysqli-result.fetch-all)
     [mysqli_fetch_all()](#mysqli-result.fetch-all)
     N/A
     Lee todas las filas de resultados en un array asociativo, numérico, o ambos. Disponible solo con [mysqlnd](#book.mysqlnd).



     [mysqli_result::fetch_array()](#mysqli-result.fetch-array)
     [mysqli_fetch_array()](#mysqli-result.fetch-array)
     N/A
     Devuelve una fila de resultado en forma de un array asociativo, un array indexado, o ambos



     [mysqli_result::fetch_assoc()](#mysqli-result.fetch-assoc)
     [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc)
     N/A
     Recupera una fila de resultado en forma de array asociativo



     [mysqli_result::fetch_column()](#mysqli-result.fetch-column)
     [mysqli_fetch_column()](#mysqli-result.fetch-column)
     N/A
     Recupera una sola columna de la siguiente fila de un conjunto de resultados



     [mysqli_result::fetch_field_direct()](#mysqli-result.fetch-field-direct)
     [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct)
     N/A
     Recupera los metadatos de un campo único



     [mysqli_result::fetch_field()](#mysqli-result.fetch-field)
     [mysqli_fetch_field()](#mysqli-result.fetch-field)
     N/A
     Devuelve el siguiente campo en el conjunto de resultados



     [mysqli_result::fetch_fields()](#mysqli-result.fetch-fields)
     [mysqli_fetch_fields()](#mysqli-result.fetch-fields)
     N/A
     Devuelve un array de objetos que representan los campos en el resultado



     [mysqli_result::fetch_object()](#mysqli-result.fetch-object)
     [mysqli_fetch_object()](#mysqli-result.fetch-object)
     N/A
     Devuelve la fila actual de un conjunto de resultados en forma de objeto



     [mysqli_result::fetch_row()](#mysqli-result.fetch-row)
     [mysqli_fetch_row()](#mysqli-result.fetch-row)
     N/A
     Recupera una fila de resultado en forma de array indexado



     [mysqli_result::field_seek()](#mysqli-result.field-seek)
     [mysqli_field_seek()](#mysqli-result.field-seek)
     N/A
     Mueve el puntero de resultado al campo especificado



     [mysqli_result::free()](#mysqli-result.free),
      [mysqli_result::close](#mysqli-result.free),
      [mysqli_result::free_result](#mysqli-result.free)
     [mysqli_free_result()](#mysqli-result.free)
     N/A
     Libera la memoria asociada a un resultado

  <caption>**Resumen de los métodos [mysqli_driver](#class.mysqli-driver)**</caption>
  
   
    
     MySQL_Driver


     Interfaz POO
     Interfaz procedural
     Alias (No usar más)
     Descripción






     **Propiedades**



     [$mysqli_driver::mysqli_report](#mysqli-driver.report-mode)
     [mysqli_report()](#function.mysqli-report)
     N/A
     Define el modo del informe de errores de mysqli



     **Métodos**



     [mysqli_driver::embedded_server_end()](#mysqli-driver.embedded-server-end)
     [mysqli_embedded_server_end()](#mysqli-driver.embedded-server-end)
     N/A
     No documentado



     [mysqli_driver::embedded_server_start()](#mysqli-driver.embedded-server-start)
     [mysqli_embedded_server_start()](#mysqli-driver.embedded-server-start)
     N/A
     No documentado

**Nota**:

Los alias se proporcionan para asegurar la compatibilidad ascendente.
No se deben usar en nuevos proyectos.

# La clase mysqli

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa una conexión entre PHP y una base de datos MySQL.

## Sinopsis de la Clase

     class **mysqli**
     {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$affected_rows](#mysqli.affected-rows);

    public
     readonly
     [string](#language.types.string)
      [$client_info](#mysqli.get-client-info);

    public
     readonly
     [int](#language.types.integer)
      [$client_version](#mysqli.get-client-version);

    public
     readonly
     [int](#language.types.integer)
      [$connect_errno](#mysqli.connect-errno);

    public
     readonly
     ?[string](#language.types.string)
      [$connect_error](#mysqli.connect-error);

    public
     readonly
     [int](#language.types.integer)
      [$errno](#mysqli.errno);

    public
     readonly
     [string](#language.types.string)
      [$error](#mysqli.error);

    public
     readonly
     [array](#language.types.array)
      [$error_list](#mysqli.error-list);

    public
     readonly
     [int](#language.types.integer)
      [$field_count](#mysqli.field-count);

    public
     readonly
     [string](#language.types.string)
      [$host_info](#mysqli.get-host-info);

    public
     readonly
     ?[string](#language.types.string)
      [$info](#mysqli.info);

    public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$insert_id](#mysqli.insert-id);

    public
     readonly
     [string](#language.types.string)
      [$server_info](#mysqli.get-server-info);

    public
     readonly
     [int](#language.types.integer)
      [$server_version](#mysqli.get-server-version);

    public
     readonly
     [string](#language.types.string)
      [$sqlstate](#mysqli.sqlstate);

    public
     readonly
     [int](#language.types.integer)
      [$protocol_version](#mysqli.get-proto-info);

    public
     readonly
     [int](#language.types.integer)
      [$thread_id](#mysqli.thread-id);

    public
     readonly
     [int](#language.types.integer)
      [$warning_count](#mysqli.warning-count);


    /* Métodos */

public [\_\_construct](#mysqli.construct)(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**
)

    public [autocommit](#mysqli.autocommit)([bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

public [begin_transaction](#mysqli.begin-transaction)([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)
public [change_user](#mysqli.change-user)([string](#language.types.string) $username, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [?](#language.types.null)[string](#language.types.string) $database): [bool](#language.types.boolean)
public [character_set_name](#mysqli.character-set-name)(): [string](#language.types.string)
public [close](#mysqli.close)(): [true](#language.types.singleton)
public [commit](#mysqli.commit)([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)
public [connect](#mysqli.construct)(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [debug](#mysqli.debug)([string](#language.types.string) $options): [true](#language.types.singleton)
public [dump_debug_info](#mysqli.dump-debug-info)(): [bool](#language.types.boolean)
public [execute_query](#mysqli.execute-query)([string](#language.types.string) $query, [?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)
public [get_charset](#mysqli.get-charset)(): [?](#language.types.null)[object](#language.types.object)
[#[\Deprecated]](class.deprecated.html) 
   public [get_client_info](#mysqli.get-client-info)(): [string](#language.types.string)
public [get_connection_stats](#mysqli.get-connection-stats)(): [array](#language.types.array)
public [get_server_info](#mysqli.get-server-info)(): [string](#language.types.string)
public [get_warnings](#mysqli.get-warnings)(): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)
[#[\Deprecated]](class.deprecated.html) 
   public [init](#mysqli.init)(): [?](#language.types.null)[bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html) 
   public [kill](#mysqli.kill)([int](#language.types.integer) $process_id): [bool](#language.types.boolean)
public [more_results](#mysqli.more-results)(): [bool](#language.types.boolean)
public [multi_query](#mysqli.multi-query)([string](#language.types.string) $query): [bool](#language.types.boolean)
[next_result](#mysqli.next-result)(): [bool](#language.types.boolean)
public [options](#mysqli.options)([int](#language.types.integer) $option, [string](#language.types.string)|[int](#language.types.integer) $value): [bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html) 
   public [ping](#mysqli.ping)(): [bool](#language.types.boolean)
public static [poll](#mysqli.poll)(
    [?](#language.types.null)[array](#language.types.array) &amp;$read,
    [?](#language.types.null)[array](#language.types.array) &amp;$error,
    [array](#language.types.array) &amp;$reject,
    [int](#language.types.integer) $seconds,
    [int](#language.types.integer) $microseconds = 0
): [int](#language.types.integer)|[false](#language.types.singleton)
public [prepare](#mysqli.prepare)([string](#language.types.string) $query): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)
public [query](#mysqli.query)([string](#language.types.string) $query, [int](#language.types.integer) $result_mode = **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)
public [real_connect](#mysqli.real-connect)(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [real_escape_string](#mysqli.real-escape-string)([string](#language.types.string) $string): [string](#language.types.string)
public [real_query](#mysqli.real-query)([string](#language.types.string) $query): [bool](#language.types.boolean)
public [reap_async_query](#mysqli.reap-async-query)(): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)
[#[\Deprecated]](class.deprecated.html)
public [refresh](#mysqli.refresh)([int](#language.types.integer) $flags): [bool](#language.types.boolean)
public [release_savepoint](#mysqli.release-savepoint)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [rollback](#mysqli.rollback)([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)
public [savepoint](#mysqli.savepoint)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [select_db](#mysqli.select-db)([string](#language.types.string) $database): [bool](#language.types.boolean)
public [set_charset](#mysqli.set-charset)([string](#language.types.string) $charset): [bool](#language.types.boolean)
public [ssl_set](#mysqli.ssl-set)(
    [?](#language.types.null)[string](#language.types.string) $key,
    [?](#language.types.null)[string](#language.types.string) $certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_path,
    [?](#language.types.null)[string](#language.types.string) $cipher_algos
): [true](#language.types.singleton)
public [stat](#mysqli.stat)(): [string](#language.types.string)|[false](#language.types.singleton)
public [stmt_init](#mysqli.stmt-init)(): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)
public [store_result](#mysqli.store-result)([int](#language.types.integer) $mode = 0): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)
public [thread_safe](#mysqli.thread-safe)(): [bool](#language.types.boolean)
public [use_result](#mysqli.use-result)(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

}

# mysqli::$affected_rows

# mysqli_affected_rows

(PHP 5, PHP 7, PHP 8)

mysqli::$affected_rows -- mysqli_affected_rows — Devuelve el número de filas afectadas por la última operación MySQL

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli-&gt;affected_rows](#mysqli.affected-rows);

Estilo procedimental

**mysqli_affected_rows**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el número de filas afectadas por la última consulta
INSERT, UPDATE,
REPLACE o DELETE
asociada al argumento link.

Funciona como [mysqli_num_rows()](#mysqli-result.num-rows) para las consultas
SELECT.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un entero mayor que cero indica el número de filas afectadas o recuperadas.
Cero indica que ningún registro fue modificado por una consulta del tipo
UPDATE, ninguna fila coincide con la cláusula
WHERE en la consulta o que ninguna consulta
fue ejecutada. -1 indica que la consulta devolvió
un error o que **mysqli_affected_rows()** fue llamado sobre
una consulta SELECT no almacenada en búfer.

**Nota**:

    Si el número de filas afectadas es mayor que el valor máximo
    (**[PHP_INT_MAX](#constant.php-int-max)**) que puede tomar un entero, el número
    de filas afectadas será devuelto como un string.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;affected_rows**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Inserción de una fila _/
$mysqli-&gt;query("CREATE TABLE Language SELECT \* from CountryLanguage");
printf("Número de filas afectadas (INSERT): %d\n", $mysqli-&gt;affected_rows);

$mysqli-&gt;query("ALTER TABLE Language ADD Status int default 0");

/_ Modificación de una fila _/
$mysqli-&gt;query("UPDATE Language SET Status=1 WHERE Percentage &gt; 50");
printf("Número de filas afectadas (UPDATE): %d\n", $mysqli-&gt;affected_rows);

/_ Eliminación de una fila _/
$mysqli-&gt;query("DELETE FROM Language WHERE Percentage &lt; 50");
printf("Número de filas afectadas (DELETE): %d\n", $mysqli-&gt;affected_rows);

/_ Selección de todas las filas _/
$result = $mysqli-&gt;query("SELECT CountryCode FROM Language");
printf("Número de filas afectadas (SELECT): %d\n", $mysqli-&gt;affected_rows);

/_ Eliminación de la tabla Language _/
$mysqli-&gt;query("DROP TABLE Language");
?&gt;

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Inserción de una fila _/
mysqli_query($link, "CREATE TABLE Language SELECT * from CountryLanguage");
printf("Número de filas afectadas (INSERT): %d\n", mysqli_affected_rows($link));

mysqli_query($link, "ALTER TABLE Language ADD Status int default 0");

/_ Modificación de una fila _/
mysqli_query($link, "UPDATE Language SET Status=1 WHERE Percentage &gt; 50");
printf("Número de filas afectadas (UPDATE): %d\n", mysqli_affected_rows($link));

/_ Eliminación de una fila _/
mysqli_query($link, "DELETE FROM Language WHERE Percentage &lt; 50");
printf("Número de filas afectadas (DELETE): %d\n", mysqli_affected_rows($link));

/_ Selección de todas las filas _/
$result = mysqli_query($link, "SELECT CountryCode FROM Language");
printf("Número de filas afectadas (SELECT): %d\n", mysqli_affected_rows($link));

/_ Eliminación de la tabla "language" _/
mysqli_query($link, "DROP TABLE Language");
?&gt;

Los ejemplos anteriores mostrarán:

Número de filas afectadas (INSERT): 984
Número de filas afectadas (UPDATE): 168
Número de filas afectadas (DELETE): 815
Número de filas afectadas (SELECT): 169

### Ver también

    - [mysqli_num_rows()](#mysqli-result.num-rows) - Devuelve el número de filas en el conjunto de resultados

    - [mysqli_info()](#mysqli.info) - Devuelve información acerca de la última consulta ejecutada

# mysqli::autocommit

# mysqli_autocommit

(PHP 5, PHP 7, PHP 8)

mysqli::autocommit -- mysqli_autocommit — Activa o desactiva el modo auto-commit

### Descripción

Estilo orientado a objetos

public **mysqli::autocommit**([bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_autocommit**([mysqli](#class.mysqli) $mysql, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

Activa o desactiva el modo auto-commit para las consultas en la
conexión.

Para verificar el estado del auto-commit, se puede utilizar el comando SQL
SELECT @@autocommit.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     enable


       Si se debe activar o no el auto-commit.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::autocommit()**

Estilo orientado a objetos

&lt;?php

/_ Solicita a mysqli que lance una excepción si ocurre un error _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ El motor de tabla soporta transacciones _/
$mysqli-&gt;query("CREATE TABLE IF NOT EXISTS language (
Code text NOT NULL,
Speakers int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

/_ Desactiva el autocommit _/
$mysqli-&gt;autocommit(false);

$result = $mysqli-&gt;query("SELECT @@autocommit");
$row = $result-&gt;fetch_row();
printf("El Autocommit vale %s\n", $row[0]);

try {
/_ Prepara una consulta de inserción _/
$stmt = $mysqli-&gt;prepare('INSERT INTO language(Code, Speakers) VALUES (?,?)');
$stmt-&gt;bind_param('ss', $language_code, $native_speakers);

    /* Inserta varios valores */
    $language_code = 'DE';
    $native_speakers = 50_123_456;
    $stmt-&gt;execute();
    $language_code = 'FR';
    $native_speakers = 40_546_321;
    $stmt-&gt;execute();

    /* Confirma los datos en la base de datos. Esto no activa el autocommit */
    $mysqli-&gt;commit();
    print "Confirmación de 2 líneas en la base de datos\n";

    $result = $mysqli-&gt;query("SELECT @@autocommit");
    $row = $result-&gt;fetch_row();
    printf("El autocommit vale %s\n", $row[0]);

    /* Intenta insertar varios valores */
    $language_code = 'PL';
    $native_speakers = 30_555_444;
    $stmt-&gt;execute();
    $language_code = 'DK';
    $native_speakers = 5_222_444;
    $stmt-&gt;execute();

    /* Establecer autocommit=true provocará el commit */
    $mysqli-&gt;autocommit(true);

    print "Confirmación de 2 líneas en la base de datos\n";

} catch (mysqli_sql_exception $exception) {
$mysqli-&gt;rollback();

    throw $exception;

}

Estilo procedimental

&lt;?php

/_ Solicita a mysqli que lance una excepción si ocurre un error _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ El motor de tabla soporta transacciones _/
mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS language (
Code text NOT NULL,
Speakers int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

/_ Desactiva el autocommit _/
mysqli_autocommit($mysqli, false);

$result = mysqli_query($mysqli, "SELECT @@autocommit");
$row = mysqli_fetch_row($result);
printf("El Autocommit vale %s\n", $row[0]);

try {
/_ Prepara una consulta de inserción _/
$stmt = mysqli_prepare($mysqli, 'INSERT INTO language(Code, Speakers) VALUES (?,?)');
mysqli_stmt_bind_param($stmt, 'ss', $language_code, $native_speakers);

    /* Inserta varios valores */
    $language_code = 'DE';
    $native_speakers = 50_123_456;
    mysqli_stmt_execute($stmt);
    $language_code = 'FR';
    $native_speakers = 40_546_321;
    mysqli_stmt_execute($stmt);

    /* Confirma los datos en la base de datos. Esto no activa el autocommit */
    mysqli_commit($mysqli);
    print "Confirmación de 2 líneas en la base de datos\n";

    $result = mysqli_query($mysqli, "SELECT @@autocommit");
    $row = mysqli_fetch_row($result);
    printf("El autocommit vale %s\n", $row[0]);

    /* Intenta insertar varios valores */
    $language_code = 'PL';
    $native_speakers = 30_555_444;
    mysqli_stmt_execute($stmt);
    $language_code = 'DK';
    $native_speakers = 5_222_444;
    mysqli_stmt_execute($stmt);

    /* Establecer autocommit=true provocará el commit */
    mysqli_autocommit($mysqli, true);

    print "Confirmación de 2 líneas en la base de datos\n";

} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);

    throw $exception;

}

Los ejemplos anteriores mostrarán:

El autocommit vale 0
Confirmación de 2 líneas en la base de datos
El autocommit vale 0
Confirmación de 2 líneas en la base de datos
El autocommit vale 0
Confirmación de 2 líneas en la base de datos
El autocommit vale 0
Confirmación de 2 líneas en la base de datos

### Notas

**Nota**:

    Esta función no funciona con los tipos de tablas no transaccionales,
    como MyISAM o ISAM.

### Ver también

    - [mysqli_begin_transaction()](#mysqli.begin-transaction) - Inicia una transacción

    - [mysqli_commit()](#mysqli.commit) - Valida la transacción actual

    - [mysqli_rollback()](#mysqli.rollback) - Revierte la transacción actual

# mysqli::begin_transaction

# mysqli_begin_transaction

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

mysqli::begin_transaction -- mysqli_begin_transaction — Inicia una transacción

### Descripción

Estilo orientado a objetos

public **mysqli::begin_transaction**([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental:

**mysqli_begin_transaction**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Inicia una transacción. Requiere el motor InnoDB (está activo por omisión).
Para más detalles sobre el funcionamiento de las transacciones MySQL,
ver [» http://dev.mysql.com/doc/mysql/en/commit.html](http://dev.mysql.com/doc/mysql/en/commit.html).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     flags


       Los flag válidos son:




       -

         **[MYSQLI_TRANS_START_READ_ONLY](#constant.mysqli-trans-start-read-only)**:
         Inicia la transacción como "START TRANSACTION READ ONLY".
         Requiere MySQL 5.6 o superior.





       -

         **[MYSQLI_TRANS_START_READ_WRITE](#constant.mysqli-trans-start-read-write)**:
         Inicia la transacción como "START TRANSACTION READ WRITE".
         Requiere MySQL 5.6 o superior.





       -

         **[MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT](#constant.mysqli-trans-start-with-consistent-snapshot)**:
          Inicia la transacción como "START TRANSACTION WITH CONSISTENT SNAPSHOT".









     name


       Nombre del punto de guardado para la transacción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       name ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::begin_transaction()**

Estilo orientado a objetos

&lt;?php

/_ Indica a mysqli que lance una excepción si ocurre un error _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ El motor de tabla soporta transacciones _/
$mysqli-&gt;query("CREATE TABLE IF NOT EXISTS language (
Code text NOT NULL,
Speakers int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

/_ Inicia la transacción _/
$mysqli-&gt;begin_transaction();

try {
/_ Inserta varios valores _/
$mysqli-&gt;query("INSERT INTO language(Code, Speakers) VALUES ('DE', 42000123)");

    /* Intenta insertar valores incorrectos */
    $language_code = 'FR';
    $native_speakers = 'Unknown';
    $stmt = $mysqli-&gt;prepare('INSERT INTO language(Code, Speakers) VALUES (?,?)');
    $stmt-&gt;bind_param('ss', $language_code, $native_speakers);
    $stmt-&gt;execute();

    /* Si el código llega a este punto sin errores, entonces se confirman los datos en
       la base de datos */
    $mysqli-&gt;commit();

} catch (mysqli_sql_exception $exception) {
$mysqli-&gt;rollback();

    throw $exception;

}

Estilo procedimental

&lt;?php

/_ Indica a mysqli que lance una excepción si ocurre un error _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ El motor de tabla soporta transacciones _/
mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS language (
Code text NOT NULL,
Speakers int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

/_ Inicia la transacción _/
mysqli_begin_transaction($mysqli);

try {
/_ Inserta varios valores _/
mysqli_query($mysqli, "INSERT INTO language(Code, Speakers) VALUES ('DE', 42000123)");

    /* Intenta insertar valores incorrectos */
    $language_code = 'FR';
    $native_speakers = 'Unknown';
    $stmt = mysqli_prepare($mysqli, 'INSERT INTO language(Code, Speakers) VALUES (?,?)');
    mysqli_stmt_bind_param($stmt, 'ss', $language_code, $native_speakers);
    mysqli_stmt_execute($stmt);

    /* Si el código llega a este punto sin errores, entonces se confirman los datos en
       la base de datos */
    mysqli_commit($mysqli);

} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);

    throw $exception;

}

### Notas

**Nota**:

    Esta función no funciona con tipos de tabla no transaccionales
    (como MyISAM o ISAM).

### Ver también

    - [mysqli_autocommit()](#mysqli.autocommit) - Activa o desactiva el modo auto-commit

    - [mysqli_commit()](#mysqli.commit) - Valida la transacción actual

    - [mysqli_rollback()](#mysqli.rollback) - Revierte la transacción actual

# mysqli::change_user

# mysqli_change_user

(PHP 5, PHP 7, PHP 8)

mysqli::change_user -- mysqli_change_user — Cambia el usuario de la conexión

### Descripción

Estilo orientado a objetos

public **mysqli::change_user**([string](#language.types.string) $username, [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password, [?](#language.types.null)[string](#language.types.string) $database): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_change_user**(
    [mysqli](#class.mysqli) $mysql,
    [string](#language.types.string) $username,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [?](#language.types.null)[string](#language.types.string) $database
): [bool](#language.types.boolean)

Intenta conectarse a la base de datos especificada utilizando las credenciales proporcionadas.

A diferencia de [mysqli::connect()](#mysqli.construct), este método
no desconectará la conexión actual si la nueva conexión no puede establecerse.

Para que esta función tenga éxito, los parámetros
username y password deben
ser válidos y el usuario en cuestión debe tener los permisos
de acceso a la base de datos deseada.
Si por alguna razón la autorización falla, el usuario
actual se conservará.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     username


       El nombre de usuario MySQL.






     password


       La contraseña MySQL.






     database


       El nombre de la base de datos. Si es **[null](#constant.null)** o una cadena vacía,
       la conexión al servidor se abrirá sin una base de datos por defecto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Reinicio de la sesión de conexión**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

$mysqli-&gt;query("SET @a:=1");

$mysqli-&gt;change_user("my_user", "my_password", "world");

$result = $mysqli-&gt;query("SELECT DATABASE()");
$row = $result-&gt;fetch_row();
printf("Base de datos por defecto: %s\n", $row[0]);

$result = $mysqli-&gt;query("SELECT @a");
$row = $result-&gt;fetch_row();
if ($row[0] === NULL) {
printf("El valor de la variable a es NULL\n");
}

?&gt;

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "test");
mysqli_query($link, "SET @a:=1");

$result = mysqli_query($link, "SELECT DATABASE()");
$row = mysqli_fetch_row($result);
printf("Base de datos por defecto: %s\n", $row[0]);

$result = mysqli_query($link, "SELECT @a");
$row = mysqli_fetch_row($result);
if ($row[0] === NULL) {
printf("El valor de la variable a es NULL\n");
}

?&gt;

Los ejemplos anteriores mostrarán:

Base de datos por defecto: world
El valor de la variable a es NULL

**Ejemplo #2 Si database es [null](#constant.null)** la conexión se abre sin seleccionar una base de datos por defecto

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

$mysqli-&gt;change_user("my_user", "my_password", null);

$result = $mysqli-&gt;query("SELECT DATABASE()");
$row = $result-&gt;fetch_row();
printf("Base de datos por defecto: %s\n", $row[0]);

Los ejemplos anteriores mostrarán:

Base de datos por defecto:

### Notas

**Nota**:

    El uso de este comando implica siempre que la conexión sea
    considerada como nueva, independientemente de si la función tiene éxito o no.
    Una llamada a esta función anulará por lo tanto todas las transacciones activas,
    cerrará las tablas temporales y desbloqueará las tablas
    bloqueadas.

### Ver también

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

    - [mysqli_select_db()](#mysqli.select-db) - Selecciona una base de datos por defecto para las consultas

# mysqli::character_set_name

# mysqli_character_set_name

(PHP 5, PHP 7, PHP 8)

mysqli::character_set_name -- mysqli_character_set_name — Devuelve el juego de caracteres actual para la conexión

### Descripción

Estilo orientado a objetos

public **mysqli::character_set_name**(): [string](#language.types.string)

Estilo procedimental

**mysqli_character_set_name**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)

Devuelve el juego de caracteres actual para la conexión
especificada por el argumento link.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

El juego de caracteres actual para la conexión actual.

### Ejemplos

**Ejemplo #1 Ejemplo de mysqli::character_set_name()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Establecer el juego de caracteres predeterminado _/
$mysqli-&gt;set_charset('utf8mb4');

/_ Mostrar el juego de caracteres actual _/
$charset = $mysqli-&gt;character_set_name();
printf("El juego de caracteres actual es %s\n", $charset);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Establecer el juego de caracteres predeterminado _/
mysqli_set_charset($mysqli, 'utf8mb4');

/_ Mostrar el juego de caracteres actual _/
$charset = mysqli_character_set_name($mysqli);
printf("El juego de caracteres actual es %s\n", $charset);

Los ejemplos anteriores mostrarán:

El juego de caracteres actual es utf8mb4

### Ver también

    - [mysqli_set_charset()](#mysqli.set-charset) - Define el juego de caracteres del cliente

    - [mysqli_real_escape_string()](#mysqli.real-escape-string) - Protege los caracteres especiales de un string para su uso en una consulta SQL, teniendo en cuenta el juego de caracteres actual de la conexión

# mysqli::close

# mysqli_close

(PHP 5, PHP 7, PHP 8)

mysqli::close -- mysqli_close — Cierra una conexión

### Descripción

Estilo orientado a objetos

public **mysqli::close**(): [true](#language.types.singleton)

Estilo procedimental

**mysqli_close**([mysqli](#class.mysqli) $mysql): [true](#language.types.singleton)

Cierra la conexión especificada por el parámetro link.

Las conexiones MySQL no persistentes y los conjuntos de resultados serán
cerrados automáticamente cuando sus objetos sean destruidos.
Cerrar explícitamente las conexiones abiertas y liberar los conjuntos de
resultados es opcional. Sin embargo, es una buena idea cerrar la
conexión tan pronto como el script termine de realizar todas sus operaciones de
base de datos, si aún tiene mucho procesamiento por hacer después
de haber recuperado los resultados.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ahora siempre devuelve **[true](#constant.true)**. Anteriormente, devolvía **[false](#constant.false)** en caso de fallo.





### Ejemplos

**Ejemplo #1 Ejemplo de mysqli::close()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$result = $mysqli-&gt;query("SELECT Name, CountryCode FROM City ORDER BY ID LIMIT 3");

/_ Cerrar la conexión tan pronto como ya no sea necesaria _/
$mysqli-&gt;close();

foreach ($result as $row) {
/_ Procesamiento de los datos recuperados de la base de datos _/
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$result = mysqli_query($mysqli, "SELECT Name, CountryCode FROM City ORDER BY ID LIMIT 3");

/_ Cerrar la conexión tan pronto como ya no sea necesaria _/
mysqli_close($mysqli);

foreach ($result as $row) {
/_ Procesamiento de los datos recuperados de la base de datos _/
}

### Notas

**Nota**:

    **mysqli_close()** no cierra las conexiones persistentes.
    Para más detalles, ver la página del manual sobre las
    [conexiones persistentes](#features.persistent-connections).

### Ver también

    - [mysqli::__construct()](#mysqli.construct) - Abre una conexión a un servidor MySQL

    - [mysqli_init()](#mysqli.init) - Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

    - [mysqli_free_result()](#mysqli-result.free) - Libera la memoria asociada a un resultado

# mysqli::commit

# mysqli_commit

(PHP 5, PHP 7, PHP 8)

mysqli::commit -- mysqli_commit — Valida la transacción actual

### Descripción

Estilo orientado a objetos

public **mysqli::commit**([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_commit**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Valida la transacción actual para la base de datos
especificada por el argumento link.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     flags


       Una máscara de constantes **[MYSQLI_TRANS_COR_*](#constant.mysqli-trans-cor-and-chain)**.






     name


       Si se proporciona, entonces COMMIT/*name*/ es ejecutado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        name es ahora nullable.





### Ejemplos

Ver el ejemplo que se encuentra en la documentación del método
[<a href="#mysqli.begin-transaction" class="methodname">mysqli::begin_transaction()](#mysqli.begin-transaction.example.basic)</a>.

### Notas

**Nota**:

    Esta función no funciona con los tipos de tabla no transaccionales (como MyISAM o ISAM).

### Ver también

    - [mysqli_autocommit()](#mysqli.autocommit) - Activa o desactiva el modo auto-commit

    - [mysqli_begin_transaction()](#mysqli.begin-transaction) - Inicia una transacción

    - [mysqli_rollback()](#mysqli.rollback) - Revierte la transacción actual

    - [mysqli_savepoint()](#mysqli.savepoint) - Establece un punto de guardado nombrado de la transacción

# mysqli::$connect_errno

# mysqli_connect_errno

(PHP 5, PHP 7, PHP 8)

mysqli::$connect_errno -- mysqli_connect_errno — Devuelve el código de error de la última llamada de conexión

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;connect_errno](#mysqli.connect-errno);

Estilo procedimental

**mysqli_connect_errno**(): [int](#language.types.integer)

Devuelve el código de error del último intento de conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un código de error para el último intento de conexión, si falla.
Cero significa que no ha ocurrido ningún error.

Devuelve el último código de error de conexión, independientemente de la instancia
en la que se llame.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;connect_errno**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_OFF);

/_ @ se utiliza para suprimir las advertencias _/
$mysqli = @new mysqli('localhost', 'fake_user', 'wrong_password', 'does_not_exist');

if ($mysqli-&gt;connect_errno) {
/_ Utilice su método preferido de registro de errores aquí _/
error_log('Error de conexión: ' . $mysqli-&gt;connect_errno);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_OFF);

/_ @ se utiliza para suprimir las advertencias _/
$link = @mysqli_connect('localhost', 'fake_user', 'wrong_password', 'does_not_exist');

if (!$link) {
/_ Utilice su método preferido de registro de errores aquí _/
error_log('Error de conexión: ' . mysqli_connect_errno());
}

### Ver también

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

    - [mysqli_connect_error()](#mysqli.connect-error) - Devuelve una descripción del último error de conexión

    - [mysqli_errno()](#mysqli.errno) - Devuelve el último código de error producido

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

# mysqli::$connect_error

# mysqli_connect_error

(PHP 5, PHP 7, PHP 8)

mysqli::$connect_error -- mysqli_connect_error — Devuelve una descripción del último error de conexión

### Descripción

Estilo orientado a objetos

?[string](#language.types.string) [$mysqli-&gt;connect_error](#mysqli.connect-error);

Estilo procedimental

**mysqli_connect_error**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el mensaje de error del último intento de conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que describe el error o **[null](#constant.null)** si no se produce ningún error.

Devuelve el último código de error de conexión, independientemente de la instancia
en la que se invoque.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;connect_error**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_OFF);

/_ @ se utiliza para suprimir las advertencias _/
$mysqli = @new mysqli('localhost', 'fake_user', 'wrong_password', 'does_not_exist');

if ($mysqli-&gt;connect_error) {
/_ Utilice su método preferido de registro de errores aquí _/
error_log('Connection error: ' . $mysqli-&gt;connect_error);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_OFF);

/_ @ se utiliza para suprimir las advertencias _/
$link = @mysqli_connect('localhost', 'fake_user', 'wrong_password', 'does_not_exist');

if (!$link) {
/_ Utilice su método preferido de registro de errores aquí _/
error_log('Connection error: ' . mysqli_connect_error());
}

### Ver también

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

    - [mysqli_connect_errno()](#mysqli.connect-errno) - Devuelve el código de error de la última llamada de conexión

    - [mysqli_errno()](#mysqli.errno) - Devuelve el último código de error producido

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

# mysqli::\_\_construct

# mysqli::connect

# mysqli_connect

(PHP 5, PHP 7, PHP 8)

mysqli::\_\_construct -- mysqli::connect -- mysqli_connect — Abre una conexión a un servidor MySQL

### Descripción

Estilo orientado a objetos

public **mysqli::\_\_construct**(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**
)

public **mysqli::connect**(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**
): [bool](#language.types.boolean)

Estilo procedimental

[mysqli_connect](#function.mysqli-connect)(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**
): [mysqli](#class.mysqli)|[false](#language.types.singleton)

Abre una conexión al servidor MySQL.

### Parámetros

     hostname


       Puede ser un nombre de host o una dirección IP.
       Al pasar **[null](#constant.null)**, el valor se recupera desde
       [mysqli.default_host](#ini.mysqli.default-host).
       Si es posible, se utilizarán pipes en lugar del protocolo TCP/IP.
       El protocolo TCP/IP se utiliza si se proporciona un nombre de host y un número de puerto juntos,
       por ejemplo localhost:3308.




       Prefijar el host con p: abre una conexión persistente.
       [mysqli_change_user()](#mysqli.change-user) se llama automáticamente
       en las conexiones que se utilizan en el grupo de conexiones.






     username


       El nombre de usuario MySQL o **[null](#constant.null)** para asumir el nombre de usuario según la opción ini
       [mysqli.default_user](#ini.mysqli.default-user).






     password


       Si la contraseña no se especifica (se pasa el valor **[null](#constant.null)**),
       el servidor MySQL intentará identificar al usuario examinando solo
       los registros donde los usuarios no tienen contraseña. Esto permite
       a un usuario disfrutar de múltiples permisos (dependiendo de si se proporciona
       una contraseña o no).






     database


       La base de datos predeterminada a utilizar al ejecutar consultas o **[null](#constant.null)**.






     port


       El número de puerto al que intentar conectarse al servidor MySQL o **[null](#constant.null)** para asumir el puerto según la opción ini
       [mysqli.default_port](#ini.mysqli.default-port).






     socket


       El socket o el pipe nombrado que debe utilizarse, o **[null](#constant.null)** para asumir el socket según la opción ini
       [mysqli.default_socket](#ini.mysqli.default-socket).



      **Nota**:



        Especificar el parámetro socket no
        determinará explícitamente el tipo de conexión que se utilizará
        al conectarse al servidor MySQL. Esto está
        determinado por el parámetro hostname.






### Valores devueltos

**mysqli::\_\_construct()** siempre devuelve un objeto
que representa la conexión a un servidor MySQL,
incluso si la conexión ha fallado.

[mysqli_connect()](#function.mysqli-connect) devuelve un objeto que representa la conexión al servidor MySQL,
o **[false](#constant.false)** si ocurre un error.

**mysqli::connect()** devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Anterior a PHP 8.1.0, devuelve **[null](#constant.null)** en caso de éxito.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        **mysqli::connect()** ahora devuelve **[true](#constant.true)** en lugar de **[null](#constant.null)** en caso de éxito.




       7.4.0

        Todos los parámetros ahora son nullable.






### Ejemplos

**Ejemplo #1 Ejemplo mysqli::\_\_construct()**

Estilo orientado a objetos

&lt;?php
/_ Siempre se debe activar el informe de errores para mysqli antes de intentar una conexión _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');
/* Establecer el juego de caracteres deseado después de establecer una conexión */
$mysqli-&gt;set_charset('utf8mb4');
printf("Éxito... %s\n", $mysqli-&gt;host_info);

Estilo procedimental

&lt;?php
/_ Siempre se debe activar el informe de errores para mysqli antes de intentar una conexión _/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');
/* Establecer el juego de caracteres deseado después de establecer una conexión */
mysqli_set_charset($mysqli, 'utf8mb4');
printf("Éxito... %s\n", mysqli_get_host_info($mysqli));

Los ejemplos anteriores mostrarán algo similar a:

Éxito... localhost via TCP/IP

**Ejemplo #2 Extender la clase mysqli**

&lt;?php
class FooMysqli extends mysqli {
public function **construct($host, $user, $pass, $db, $port, $socket, $charset) {
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
parent::**construct($host, $user, $pass, $db, $port, $socket);
        $this-&gt;set_charset($charset);
}
}
$db = new FooMysqli('localhost', 'my_user', 'my_password', 'my_db', 3306, null, 'utf8mb4');

**Ejemplo #3 Manejo manual de errores**

Si el informe de errores está desactivado, el desarrollador es responsable de verificar y manejar los fallos

Estilo orientado a objetos

&lt;?php
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');
if ($mysqli-&gt;connect_errno) {
throw new RuntimeException('error de conexión mysqli: ' . $mysqli-&gt;connect_error);
}
/* Establecer el juego de caracteres deseado después de establecer una conexión */
$mysqli-&gt;set_charset('utf8mb4');
if ($mysqli-&gt;errno) {
throw new RuntimeException('error mysqli: ' . $mysqli-&gt;error);
}

Estilo procedimental

&lt;?php
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');
if (mysqli_connect_errno()) {
    throw new RuntimeException('error de conexión mysqli: ' . mysqli_connect_error());
}
/* Establecer el juego de caracteres deseado después de establecer una conexión */
mysqli_set_charset($mysqli, 'utf8mb4');
if (mysqli_errno($mysqli)) {
    throw new RuntimeException('error mysqli: ' . mysqli_error($mysqli));
}

### Notas

**Nota**:

MySQLnd siempre asume el juego de caracteres predeterminado del servidor. Este juego de caracteres es enviado durante el intercambio de conexión/autenticación, el cual mysqlnd utilizará.

Libmysqlclient utiliza el juego de caracteres predeterminado establecido en el
my.cnf o mediante una llamada explícita a [mysqli_options()](#mysqli.options) antes de
llamar a [mysqli_real_connect()](#mysqli.real-connect), pero después de [mysqli_init()](#mysqli.init).

**Nota**:

    Estilo orientado a objetos solamente: si la conexión falla, se devuelve un objeto de todos modos.
    Para verificar si la conexión falló, utilice la función
    [mysqli_connect_error()](#mysqli.connect-error) o la propiedad
    [mysqli-&gt;connect_error](#mysqli.connect-error)
    como en el ejemplo anterior.

**Nota**:

    Si es necesario configurar opciones, como el tiempo de espera de conexión,
    [mysqli_real_connect()](#mysqli.real-connect) debe ser utilizado.

**Nota**:

    Llamar al constructor sin parámetros tiene el mismo efecto que llamar
    [mysqli_init()](#mysqli.init).

**Nota**:

    El error "Can't create TCP/IP socket (10106)" significa generalmente que la directiva de configuración
    [variables_order](#ini.variables-order) no contiene el
    carácter E. En Windows, si el entorno no se copia,
    la variable de entorno SYSTEMROOT no estará disponible
    y PHP tendrá problemas para cargar Winsock.

### Ver también

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

    - [mysqli_options()](#mysqli.options) - Define las opciones

    - [mysqli_connect_errno()](#mysqli.connect-errno) - Devuelve el código de error de la última llamada de conexión

    - [mysqli_connect_error()](#mysqli.connect-error) - Devuelve una descripción del último error de conexión

    - [mysqli_close()](#mysqli.close) - Cierra una conexión

# mysqli::debug

# mysqli_debug

(PHP 5, PHP 7, PHP 8)

mysqli::debug -- mysqli_debug — Realiza acciones de depuración

### Descripción

Estilo orientado a objetos

public **mysqli::debug**([string](#language.types.string) $options): [true](#language.types.singleton)

Estilo procedimental

**mysqli_debug**([string](#language.types.string) $options): [true](#language.types.singleton)

Realiza acciones de depuración utilizando la biblioteca de depuración Fred Fish.

### Parámetros

     options


       Un string que representa la operación de
       depuración a realizar.




       El string de control de depuración es una secuencia de campos separados por dos puntos, como sigue:
       &lt;field_1&gt;:&lt;field_2&gt;:&lt;field_N&gt;
       Cada campo se compone de un carácter flag obligatorio seguido de un ,
       opcional y una lista de modificadores separados por comas:
       flag[,modifier,modifier,...,modifier]







        <caption>**Caracteres flag reconocidos**</caption>



           options carácter
           Descripción






           O
           **[MYSQLND_DEBUG_FLUSH](#constant.mysqlnd-debug-flush)**



           A/a
           **[MYSQLND_DEBUG_APPEND](#constant.mysqlnd-debug-append)**



           F
           **[MYSQLND_DEBUG_DUMP_FILE](#constant.mysqlnd-debug-dump-file)**



           i
           **[MYSQLND_DEBUG_DUMP_PID](#constant.mysqlnd-debug-dump-pid)**



           L
           **[MYSQLND_DEBUG_DUMP_LINE](#constant.mysqlnd-debug-dump-line)**



           m
           **[MYSQLND_DEBUG_TRACE_MEMORY_CALLS](#constant.mysqlnd-debug-trace-memory-calls)**



           n
           **[MYSQLND_DEBUG_DUMP_LEVEL](#constant.mysqlnd-debug-dump-level)**



           o
           salida a fichero



           T
           **[MYSQLND_DEBUG_DUMP_TIME](#constant.mysqlnd-debug-dump-time)**



           t
           **[MYSQLND_DEBUG_DUMP_TRACE](#constant.mysqlnd-debug-dump-trace)**



           x
           **[MYSQLND_DEBUG_PROFILE_CALLS](#constant.mysqlnd-debug-profile-calls)**









### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función devuelve ahora siempre **[true](#constant.true)**. Anteriormente, devolvía **[false](#constant.false)** en caso de error.





### Ejemplos

    **Ejemplo #1 Generación de un fichero de "traza"**

&lt;?php

/_ Genera un fichero de "traza" en '/tmp/client.trace' en la máquina (cliente) local: _/
mysqli_debug("d:t:o,/tmp/client.trace");

?&gt;

### Notas

**Nota**:

    Para utilizar la función **mysqli_debug()**, se debe
    compilar la biblioteca cliente MySQL con soporte de depuración.

### Ver también

    - [mysqli_dump_debug_info()](#mysqli.dump-debug-info) - Escribe la información de depuración en los registros

    - [mysqli_report()](#function.mysqli-report) - Alias de mysqli_driver-&gt;report_mode

# mysqli::dump_debug_info

# mysqli_dump_debug_info

(PHP 5, PHP 7, PHP 8)

mysqli::dump_debug_info -- mysqli_dump_debug_info — Escribe la información de depuración en los registros

### Descripción

Estilo orientado a objetos

public **mysqli::dump_debug_info**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_dump_debug_info**([mysqli](#class.mysqli) $mysql): [bool](#language.types.boolean)

Esta función debe ser utilizada por un usuario con el privilegio
SUPER y se emplea para escribir cierta información de depuración
en el registro para el servidor MySQL relativo a la conexión especificada por
el argumento link.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mysqli_debug()](#mysqli.debug) - Realiza acciones de depuración

# mysqli::$errno

# mysqli_errno

(PHP 5, PHP 7, PHP 8)

mysqli::$errno -- mysqli_errno — Devuelve el último código de error producido

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;errno](#mysqli.errno);

Estilo procedimental

**mysqli_errno**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

Devuelve el código de error para la última llamada a una función
MySQLi que puede fallar o tener éxito, respetando la conexión
definida por el parámetro link.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

El valor del código de error para la última llamada, si falla. 0 significa que no
ha ocurrido ningún error.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;errno**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if ($mysqli-&gt;connect_errno) {
printf("Fallo en la conexión: %s\n", $mysqli-&gt;connect_error);
exit();
}

if (!$mysqli-&gt;query("SET a=1")) {
printf("Código de Error: %d\n", $mysqli-&gt;errno);
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

if (!mysqli_query($link, "SET a=1")) {
    printf("Código de Error: %d\n", mysqli_errno($link));
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Código de Error: 1193

### Ver también

    - [mysqli_connect_errno()](#mysqli.connect-errno) - Devuelve el código de error de la última llamada de conexión

    - [mysqli_connect_error()](#mysqli.connect-error) - Devuelve una descripción del último error de conexión

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

# mysqli::$error

# mysqli_error

(PHP 5, PHP 7, PHP 8)

mysqli::$error -- mysqli_error — Devuelve un string que describe el último error

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;error](#mysqli.error);

Estilo procedimental

**mysqli_error**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)

Devuelve el string que describe el error ocurrido durante la última llamada a una función MySQLi, ya sea que dicha llamada haya tenido éxito o haya fallado.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un string que describe el error. Un string vacío si no ha ocurrido ningún error.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;error**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if ($mysqli-&gt;connect_errno) {
printf("Fallo en la conexión: %s\n", $mysqli-&gt;connect_error);
exit();
}

if (!$mysqli-&gt;query("SET a=1")) {
printf("Mensaje de error: %s\n", $mysqli-&gt;error);
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

if (!mysqli_query($link, "SET a=1")) {
    printf("Mensaje de error: %s\n", mysqli_error($link));
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Mensaje de error: Unknown system variable 'a'

### Ver también

    - [mysqli_connect_errno()](#mysqli.connect-errno) - Devuelve el código de error de la última llamada de conexión

    - [mysqli_connect_error()](#mysqli.connect-error) - Devuelve una descripción del último error de conexión

    - [mysqli_errno()](#mysqli.errno) - Devuelve el último código de error producido

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

# mysqli::$error_list

# mysqli_error_list

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

mysqli::$error_list -- mysqli_error_list — Devuelve una lista de errores desde el último comando ejecutado

### Descripción

Estilo orientado a objetos

[array](#language.types.array) [$mysqli-&gt;error_list](#mysqli.error-list);

Estilo procedimental

**mysqli_error_list**([mysqli](#class.mysqli) $mysql): [array](#language.types.array)

Devuelve un array de errores desde la llamada más reciente a
una función MySQLi, ya sea que haya tenido éxito o no.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Una lista de errores, cada uno en forma de un array asociativo
que contiene el número de error (errno), el mensaje de error (error)
y el estado SQL (sqlstate).

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;error_list**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "nobody", "");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("La conexión ha fallado: %s\n", mysqli_connect_error());
exit();
}

if (!$mysqli-&gt;query("SET a=1")) {
    print_r($mysqli-&gt;error_list);
}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("La conexión ha fallado: %s\n", mysqli_connect_error());
exit();
}

if (!mysqli_query($link, "SET a=1")) {
    print_r(mysqli_error_list($link));
}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Array
(
[0] =&gt; Array
(
[errno] =&gt; 1193
[sqlstate] =&gt; HY000
[error] =&gt; Unknown system variable 'a'
)

)

### Ver también

    - [mysqli_connect_errno()](#mysqli.connect-errno) - Devuelve el código de error de la última llamada de conexión

    - [mysqli_connect_error()](#mysqli.connect-error) - Devuelve una descripción del último error de conexión

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

# mysqli::execute_query

# mysqli_execute_query

(PHP 8 &gt;= 8.2.0)

mysqli::execute_query -- mysqli_execute_query — Prepara, vincula los parámetros y ejecuta una sentencia SQL

### Descripción

Estilo orientado a objetos

public **mysqli::execute_query**([string](#language.types.string) $query, [?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Estilo procedimental

**mysqli_execute_query**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $query, [?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Prepara la consulta SQL, vincula los parámetros y la ejecuta.
El método **mysqli::execute_query()** es un atajo para
[mysqli::prepare()](#mysqli.prepare),
[mysqli_stmt::bind_param()](#mysqli-stmt.bind-param),
[mysqli_stmt::execute()](#mysqli-stmt.execute),
y [mysqli_stmt::get_result()](#mysqli-stmt.get-result).

El modelo de sentencia puede contener cero o más marcadores de parámetros
(?) también llamados espacios reservados.
Los valores de los parámetros deben ser proporcionados como un array
utilizando el parámetro params.

Una sentencia preparada es creada internamente, pero nunca es expuesta
fuera de la función. Es imposible acceder a las propiedades de la
sentencia como se haría con el objeto [mysqli_stmt](#class.mysqli-stmt).
Debido a esta limitación, la información de estado es copiada al objeto
[mysqli](#class.mysqli) y está disponible utilizando sus métodos, por ejemplo
[mysqli_affected_rows()](#mysqli.affected-rows) o [mysqli_error()](#mysqli.error).

**Nota**:

    En el caso en que una sentencia es pasada a
    **mysqli_execute_query()** que es más larga que
    max_allowed_packet del servidor, los códigos de error devueltos
    son diferentes dependiendo del sistema operativo.
    El comportamiento es el siguiente:




    -

      En Linux devuelve un código de error 1153.
      El mensaje de error significa recepción de un paquete más grande que
      max_allowed_packet bytes
      (got a packet bigger than
      max_allowed_packet bytes).





    -

      En Windows devuelve un código de error 2006.
      Este mensaje de error significa el servidor ha desaparecido
      (server has gone away).


### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     query


       La consulta, en forma de string. Debe consistir en una sola sentencia SQL.




       La sentencia SQL puede contener cero o más marcadores de parámetros
       representados por un signo de interrogación (?)
       en las posiciones apropiadas.



      **Nota**:




        Los marcadores de parámetros solo están permitidos en ciertos lugares de las sentencias SQL.
        Por ejemplo, están permitidos en la lista VALUES() de una sentencia
        INSERT (para especificar los valores de columnas para una fila), o en una
        comparación con una columna en una cláusula WHERE para especificar un valor de comparación.
        Sin embargo, no están permitidos para los identificadores (como nombres de tabla o columna).







     params


       Una lista opcional con tantos elementos como parámetros vinculados en la sentencia SQL que se está ejecutando. Cada valor es tratado como un [string](#language.types.string).





### Valores devueltos

Devuelve **[false](#constant.false)** en caso de fallo. Para consultas exitosas que producen un conjunto de resultados, como
SELECT, SHOW, DESCRIBE o EXPLAIN, devuelve
un objeto [mysqli_result](#class.mysqli-result). Para otras consultas exitosas,
devuelve **[true](#constant.true)**.

### Ejemplos

**Ejemplo #1 Ejemplo de mysqli::execute_query()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'world');

$query = 'SELECT Name, District FROM City WHERE CountryCode=? ORDER BY Name LIMIT 5';
$result = $mysqli-&gt;execute_query($query, ['DEU']);
foreach ($result as $row) {
printf("%s (%s)\n", $row["Name"], $row["District"]);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = 'SELECT Name, District FROM City WHERE CountryCode=? ORDER BY Name LIMIT 5';
$result = mysqli_execute_query($link, $query, ['DEU']);
foreach ($result as $row) {
printf("%s (%s)\n", $row["Name"], $row["District"]);
}

Los ejemplos anteriores mostrarán algo similar a:

Aachen (Nordrhein-Westfalen)
Augsburg (Baijeri)
Bergisch Gladbach (Nordrhein-Westfalen)
Berlin (Berliini)
Bielefeld (Nordrhein-Westfalen)

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

# mysqli::$field_count

# mysqli_field_count

(PHP 5, PHP 7, PHP 8)

mysqli::$field_count -- mysqli_field_count — Devuelve el número de columnas para la última consulta

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;field_count](#mysqli.field-count);

Estilo procedimental

**mysqli_field_count**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

Devuelve el número de columnas para la última consulta
en la conexión especificada por el parámetro
mysql. Esta función puede ser útil
al utilizar [mysqli_store_result()](#mysqli.store-result)
para determinar si la consulta debería haber devuelto un
resultado vacío o no, sin conocer su naturaleza.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un entero que representa el número de campos en un conjunto de resultados.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;field_count**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

$mysqli-&gt;query( "DROP TABLE IF EXISTS friends");
$mysqli-&gt;query( "CREATE TABLE friends (id int, name varchar(20))");

$mysqli-&gt;query( "INSERT INTO friends VALUES (1,'Hartmut'), (2, 'Ulf')");

$mysqli-&gt;real_query("SELECT \* FROM friends");

if ($mysqli-&gt;field_count) {
/_ Una consulta SELECT, SHOW o DESCRIBE _/
$result = $mysqli-&gt;store_result();

    /* Obtención del conjunto de resultados */
    $row = $result-&gt;fetch_row();

    /* Liberación del conjunto de resultados */
    $result-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "test");

mysqli_query($link, "DROP TABLE IF EXISTS friends");
mysqli_query($link, "CREATE TABLE friends (id int, name varchar(20))");

mysqli_query($link, "INSERT INTO friends VALUES (1,'Hartmut'), (2, 'Ulf')");

mysqli_real_query($link, "SELECT \* FROM friends");

if (mysqli_field_count($link)) {
    /* Una consulta SELECT, SHOW o DESCRIBE */
    $result = mysqli_store_result($link);

    /* Obtención del conjunto de resultados */
    $row = mysqli_fetch_row($result);

    /* Liberación del conjunto de resultados */
    mysqli_free_result($result);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

# mysqli::get_charset

# mysqli_get_charset

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

mysqli::get_charset -- mysqli_get_charset — Devuelve un objeto que representa el juego de caracteres

### Descripción

Estilo orientado a objetos

public **mysqli::get_charset**(): [?](#language.types.null)[object](#language.types.object)

Estilo procedimental

**mysqli_get_charset**([mysqli](#class.mysqli) $mysql): [?](#language.types.null)[object](#language.types.object)

Devuelve un objeto que representa el juego de caracteres, proporcionando
diferentes propiedades del juego de caracteres actual.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

La función devuelve un juego de caracteres con las siguientes propiedades:

     charset


       Nombre del juego de caracteres






     collation


       Nombre de la interclasificación






     dir


       El directorio en el que se busca la descripción del juego de
       caracteres o "" para los juegos de caracteres internos






     min_length


       Longitud mínima de caracteres, en bytes






     max_length


       Longitud máxima de caracteres, en bytes






     number


       Número del juego de caracteres interno






     state


       Estado del juego de caracteres





### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::get_charset()**

Estilo orientado a objetos

&lt;?php
$db = mysqli_init();
  $db-&gt;real_connect("localhost","root","","test");
  var_dump(mysqli_get_charset($db));
?&gt;

Estilo procedimental

&lt;?php
$db = mysqli_init();
  mysqli_real_connect($db, "localhost","root","","test");
var_dump($db-&gt;get_charset());
?&gt;

Los ejemplos anteriores mostrarán:

object(stdClass)#2 (7) {
["charset"]=&gt;
string(6) "latin1"
["collation"]=&gt;
string(17) "latin1_swedish_ci"
["dir"]=&gt;
string(0) ""
["min_length"]=&gt;
int(1)
["max_length"]=&gt;
int(1)
["number"]=&gt;
int(8)
["state"]=&gt;
int(801)
}

### Ver también

    - [mysqli_character_set_name()](#mysqli.character-set-name) - Devuelve el juego de caracteres actual para la conexión

    - [mysqli_set_charset()](#mysqli.set-charset) - Define el juego de caracteres del cliente

# mysqli::$client_info

# mysqli::get_client_info

# mysqli_get_client_info

(PHP 5, PHP 7, PHP 8)

mysqli::$client_info -- mysqli::get_client_info -- mysqli_get_client_info — Obtiene información sobre el cliente MySQL

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;client_info](#mysqli.get-client-info);

[#[\Deprecated]](class.deprecated.html)
public **mysqli::get_client_info**(): [string](#language.types.string)

Estilo procedimental

**mysqli_get_client_info**([?](#language.types.null)[mysqli](#class.mysqli) $mysql = **[null](#constant.null)**): [string](#language.types.string)

Devuelve un [string](#language.types.string) que representa la versión de la biblioteca cliente MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [string](#language.types.string) que representa la versión del cliente utilizado por la extensión MySQL.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       La llamada a la **mysqli_get_client_info()** con el argumento mysql ha sido deprecada.
       Esta función nunca ha requerido un parámetro, pero lo ha permitido de manera incorrecta como parámetro opcional.




      8.1.0

       El estilo orientado a objetos **mysqli::get_client_info()** ha sido deprecado.



### Ejemplos

    **Ejemplo #1 Ejemplo con mysqli_get_client_info()**

&lt;?php

/_ No es necesaria una conexión para determinar
la versión del cliente utilizada por la extensión MySQL _/

printf("Versión de la biblioteca cliente: %s\n", mysqli_get_client_info());
?&gt;

### Ver también

    - [mysqli_get_client_version()](#mysqli.get-client-version) - Devuelve la versión del cliente MySQL como un entero

    - [mysqli_get_server_info()](#mysqli.get-server-info) - Devuelve la versión del servidor MySQL

    - [mysqli_get_server_version()](#mysqli.get-server-version) - Devuelve un integer que representa la versión del servidor MySQL

# mysqli::$client_version

# mysqli_get_client_version

(PHP 5, PHP 7, PHP 8)

mysqli::$client_version -- mysqli_get_client_version — Devuelve la versión del cliente MySQL como un entero

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;client_version](#mysqli.get-client-version);

Estilo procedimental

**mysqli_get_client_version**(): [int](#language.types.integer)

Devuelve la versión del cliente MySQL como un entero.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un número que representa la versión de la biblioteca cliente
MySQL en este formato:
versión_principal*10000 + versión_menor *100 + subversión.
Por ejemplo, la versión 4.1.0 se devuelve como 40100.

Esta función es útil para determinar la versión de la
biblioteca cliente para saber si existen características específicas.

### Ejemplos

    **Ejemplo #1 Ejemplo con mysqli_get_client_version()**

&lt;?php

/_ No necesitamos una conexión para
determinar la versión de la biblioteca cliente mysql _/

printf("Versión de la biblioteca cliente: %d\n", mysqli_get_client_version());
?&gt;

### Ver también

    - [mysqli_get_client_info()](#mysqli.get-client-info) - Obtiene información sobre el cliente MySQL

    - [mysqli_get_server_info()](#mysqli.get-server-info) - Devuelve la versión del servidor MySQL

    - [mysqli_get_server_version()](#mysqli.get-server-version) - Devuelve un integer que representa la versión del servidor MySQL

# mysqli::get_connection_stats

# mysqli_get_connection_stats

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli::get_connection_stats -- mysqli_get_connection_stats — Devuelve estadísticas sobre la conexión

### Descripción

Estilo orientado a objetos

public **mysqli::get_connection_stats**(): [array](#language.types.array)

Estilo procedimental

**mysqli_get_connection_stats**([mysqli](#class.mysqli) $mysql): [array](#language.types.array)

Devuelve estadísticas sobre la conexión del cliente.

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve un array con las estadísticas de conexión.

### Ejemplos

    **Ejemplo #1 Ejemplo con mysqli_get_connection_stats()**

&lt;?php
$link = mysqli_connect();
print_r(mysqli_get_connection_stats($link));
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[bytes_sent] =&gt; 43
[bytes_received] =&gt; 80
[packets_sent] =&gt; 1
[packets_received] =&gt; 2
[protocol_overhead_in] =&gt; 8
[protocol_overhead_out] =&gt; 4
[bytes_received_ok_packet] =&gt; 11
[bytes_received_eof_packet] =&gt; 0
[bytes_received_rset_header_packet] =&gt; 0
[bytes_received_rset_field_meta_packet] =&gt; 0
[bytes_received_rset_row_packet] =&gt; 0
[bytes_received_prepare_response_packet] =&gt; 0
[bytes_received_change_user_packet] =&gt; 0
[packets_sent_command] =&gt; 0
[packets_received_ok] =&gt; 1
[packets_received_eof] =&gt; 0
[packets_received_rset_header] =&gt; 0
[packets_received_rset_field_meta] =&gt; 0
[packets_received_rset_row] =&gt; 0
[packets_received_prepare_response] =&gt; 0
[packets_received_change_user] =&gt; 0
[result_set_queries] =&gt; 0
[non_result_set_queries] =&gt; 0
[no_index_used] =&gt; 0
[bad_index_used] =&gt; 0
[slow_queries] =&gt; 0
[buffered_sets] =&gt; 0
[unbuffered_sets] =&gt; 0
[ps_buffered_sets] =&gt; 0
[ps_unbuffered_sets] =&gt; 0
[flushed_normal_sets] =&gt; 0
[flushed_ps_sets] =&gt; 0
[ps_prepared_never_executed] =&gt; 0
[ps_prepared_once_executed] =&gt; 0
[rows_fetched_from_server_normal] =&gt; 0
[rows_fetched_from_server_ps] =&gt; 0
[rows_buffered_from_client_normal] =&gt; 0
[rows_buffered_from_client_ps] =&gt; 0
[rows_fetched_from_client_normal_buffered] =&gt; 0
[rows_fetched_from_client_normal_unbuffered] =&gt; 0
[rows_fetched_from_client_ps_buffered] =&gt; 0
[rows_fetched_from_client_ps_unbuffered] =&gt; 0
[rows_fetched_from_client_ps_cursor] =&gt; 0
[rows_skipped_normal] =&gt; 0
[rows_skipped_ps] =&gt; 0
[copy_on_write_saved] =&gt; 0
[copy_on_write_performed] =&gt; 0
[command_buffer_too_small] =&gt; 0
[connect_success] =&gt; 1
[connect_failure] =&gt; 0
[connection_reused] =&gt; 0
[reconnect] =&gt; 0
[pconnect_success] =&gt; 0
[active_connections] =&gt; 1
[active_persistent_connections] =&gt; 0
[explicit_close] =&gt; 0
[implicit_close] =&gt; 0
[disconnect_close] =&gt; 0
[in_middle_of_command_close] =&gt; 0
[explicit_free_result] =&gt; 0
[implicit_free_result] =&gt; 0
[explicit_stmt_close] =&gt; 0
[implicit_stmt_close] =&gt; 0
[mem_emalloc_count] =&gt; 0
[mem_emalloc_ammount] =&gt; 0
[mem_ecalloc_count] =&gt; 0
[mem_ecalloc_ammount] =&gt; 0
[mem_erealloc_count] =&gt; 0
[mem_erealloc_ammount] =&gt; 0
[mem_efree_count] =&gt; 0
[mem_malloc_count] =&gt; 0
[mem_malloc_ammount] =&gt; 0
[mem_calloc_count] =&gt; 0
[mem_calloc_ammount] =&gt; 0
[mem_realloc_count] =&gt; 0
[mem_realloc_ammount] =&gt; 0
[mem_free_count] =&gt; 0
[proto_text_fetched_null] =&gt; 0
[proto_text_fetched_bit] =&gt; 0
[proto_text_fetched_tinyint] =&gt; 0
[proto_text_fetched_short] =&gt; 0
[proto_text_fetched_int24] =&gt; 0
[proto_text_fetched_int] =&gt; 0
[proto_text_fetched_bigint] =&gt; 0
[proto_text_fetched_decimal] =&gt; 0
[proto_text_fetched_float] =&gt; 0
[proto_text_fetched_double] =&gt; 0
[proto_text_fetched_date] =&gt; 0
[proto_text_fetched_year] =&gt; 0
[proto_text_fetched_time] =&gt; 0
[proto_text_fetched_datetime] =&gt; 0
[proto_text_fetched_timestamp] =&gt; 0
[proto_text_fetched_string] =&gt; 0
[proto_text_fetched_blob] =&gt; 0
[proto_text_fetched_enum] =&gt; 0
[proto_text_fetched_set] =&gt; 0
[proto_text_fetched_geometry] =&gt; 0
[proto_text_fetched_other] =&gt; 0
[proto_binary_fetched_null] =&gt; 0
[proto_binary_fetched_bit] =&gt; 0
[proto_binary_fetched_tinyint] =&gt; 0
[proto_binary_fetched_short] =&gt; 0
[proto_binary_fetched_int24] =&gt; 0
[proto_binary_fetched_int] =&gt; 0
[proto_binary_fetched_bigint] =&gt; 0
[proto_binary_fetched_decimal] =&gt; 0
[proto_binary_fetched_float] =&gt; 0
[proto_binary_fetched_double] =&gt; 0
[proto_binary_fetched_date] =&gt; 0
[proto_binary_fetched_year] =&gt; 0
[proto_binary_fetched_time] =&gt; 0
[proto_binary_fetched_datetime] =&gt; 0
[proto_binary_fetched_timestamp] =&gt; 0
[proto_binary_fetched_string] =&gt; 0
[proto_binary_fetched_blob] =&gt; 0
[proto_binary_fetched_enum] =&gt; 0
[proto_binary_fetched_set] =&gt; 0
[proto_binary_fetched_geometry] =&gt; 0
[proto_binary_fetched_other] =&gt; 0
)

### Ver también

    - [Descripción de las estadísticas](#mysqlnd.stats)

# mysqli::$host_info

# mysqli_get_host_info

(PHP 5, PHP 7, PHP 8)

mysqli::$host_info -- mysqli_get_host_info — Devuelve un string que contiene el tipo de conexión utilizada

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;host_info](#mysqli.get-host-info);

Estilo procedimental

**mysqli_get_host_info**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)

**mysqli_get_host_info()** devuelve un string
de caracteres que describe la conexión representada por
el argumento mysql (incluyendo el nombre de host del
servidor).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un string que representa el nombre de host del
servidor y el tipo de conexión.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;host_info**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Muestra información sobre el host _/
printf("Información sobre el host: %s\n", $mysqli-&gt;host_info);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Muestra información sobre el host _/
printf("Información sobre el host: %s\n", mysqli_get_host_info($link));

Los ejemplos anteriores mostrarán:

Información sobre el host: Localhost via UNIX socket

### Ver también

    - [mysqli_get_proto_info()](#mysqli.get-proto-info) - Devuelve la versión del protocolo MySQL utilizado

# mysqli::$protocol_version

# mysqli_get_proto_info

(PHP 5, PHP 7, PHP 8)

mysqli::$protocol_version -- mysqli_get_proto_info — Devuelve la versión del protocolo MySQL utilizado

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;protocol_version](#mysqli.get-proto-info);

Estilo procedimental

**mysqli_get_proto_info**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

Devuelve un integer que representa la versión del protocolo MySQL
utilizado por la conexión representada por el argumento
mysql.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve un integer que representa la versión del protocolo.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;protocol_version**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password");

/_ Muestra la versión del protocolo _/
printf("Versión del protocolo: %d\n", $mysqli-&gt;protocol_version);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password");

/_ Muestra la versión del protocolo _/
printf("Versión del protocolo: %d\n", mysqli_get_proto_info($link));

Los ejemplos anteriores mostrarán:

Versión del protocolo: 10

### Ver también

    - [mysqli_get_host_info()](#mysqli.get-host-info) - Devuelve un string que contiene el tipo de conexión utilizada

# mysqli::$server_info

# mysqli::get_server_info

# mysqli_get_server_info

(PHP 5, PHP 7, PHP 8)

mysqli::$server_info -- mysqli::get_server_info -- mysqli_get_server_info — Devuelve la versión del servidor MySQL

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;server_info](#mysqli.get-server-info);

public **mysqli::get_server_info**(): [string](#language.types.string)

Estilo procedimental

**mysqli_get_server_info**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)

Devuelve un string que representa la versión del servidor
MySQL al cual la extensión MySQLi está conectada (representado por el
argumento link).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un [string](#language.types.string) que representa la versión del servidor.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;server_info**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password");

/_ Muestra la versión del servidor _/
printf("Versión del servidor: %s\n", $mysqli-&gt;server_info);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password");

/_ Muestra la versión del servidor _/
printf("Versión del servidor: %s\n", mysqli_get_server_info($link));

Los ejemplos anteriores mostrarán algo similar a:

Versión del servidor: 8.0.21

### Ver también

    - [mysqli_get_client_info()](#mysqli.get-client-info) - Obtiene información sobre el cliente MySQL

    - [mysqli_get_client_version()](#mysqli.get-client-version) - Devuelve la versión del cliente MySQL como un entero

    - [mysqli_get_server_version()](#mysqli.get-server-version) - Devuelve un integer que representa la versión del servidor MySQL

# mysqli::$server_version

# mysqli_get_server_version

(PHP 5, PHP 7, PHP 8)

mysqli::$server_version -- mysqli_get_server_version — Devuelve un integer que representa la versión del servidor MySQL

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;server_version](#mysqli.get-server-version);

Estilo procedimental

**mysqli_get_server_version**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

La función **mysqli_get_server_version()** devuelve un
integer que representa la versión del servidor al que se está conectado
(representado por el argumento mysql).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un integer que representa la versión del servidor.

El formato de este número es
main_version _ 10000 + minor_version _ 100 + sub_version
(es decir, la versión 4.1.0 devolverá 40100).

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;server_version**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password");

/_ Muestra la versión del servidor _/
printf("Versión del servidor: %d\n", $mysqli-&gt;server_version);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password");

/_ Muestra la versión del servidor _/
printf("Versión del servidor: %d\n", mysqli_get_server_version($link));

Los ejemplos anteriores mostrarán algo similar a:

Versión del servidor: 80021

### Ver también

    - [mysqli_get_client_info()](#mysqli.get-client-info) - Obtiene información sobre el cliente MySQL

    - [mysqli_get_client_version()](#mysqli.get-client-version) - Devuelve la versión del cliente MySQL como un entero

    - [mysqli_get_server_info()](#mysqli.get-server-info) - Devuelve la versión del servidor MySQL

# mysqli::get_warnings

# mysqli_get_warnings

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

mysqli::get_warnings -- mysqli_get_warnings — Lee el resultado de SHOW WARNINGS

### Descripción

Estilo orientado a objetos

public **mysqli::get_warnings**(): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_get_warnings**([mysqli](#class.mysqli) $mysql): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)

Devuelve una lista simplemente enlazada compuesta de
[mysqli_warning](#class.mysqli-warning) o **[false](#constant.false)** si no hay advertencias.
Cada objeto de la lista corresponde a una línea única del resultado de
SHOW WARNINGS.
Llamar a [mysqli_warning::next()](#mysqli-warning.next) rellenará el objeto con
los valores de la línea siguiente.

**Nota**:

    Para recuperar los mensajes de advertencia, se recomienda utilizar el comando SQL
    SHOW WARNINGS [LIMIT row_count] en lugar de esta función.

**Advertencia**

    La lista enlazada no puede ser reinicializada ni recuperada nuevamente.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve una lista simplemente enlazada compuesta de
[mysqli_warning](#class.mysqli-warning) o **[false](#constant.false)** si no hay advertencias.

### Ejemplos

**Ejemplo #1 Recorrer la lista enlazada para recuperar todas las advertencias**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$mysqli-&gt;query("SELECT 1/0, CAST('NULL' AS UNSIGNED)");

if ($mysqli-&gt;warning_count &gt; 0) {
    $warning = $mysqli-&gt;get_warnings();
    if ($warning !== false) {
do {
printf("Número de error: %s\n", $warning-&gt;errno);
            printf("Mensaje: %s\n", $warning-&gt;message);
        } while ($warning-&gt;next());
}
}

Los ejemplos anteriores mostrarán:

Número de error: 1365
Mensaje: División por 0
Número de error: 1292
Mensaje: Valor INTEGER incorrecto truncado: 'NULL'

# mysqli::$info

# mysqli_info

(PHP 5, PHP 7, PHP 8)

mysqli::$info -- mysqli_info — Devuelve información acerca de la última consulta ejecutada

### Descripción

Estilo orientado a objetos

?[string](#language.types.string) [$mysqli-&gt;info](#mysqli.info);

Estilo procedimental

**mysqli_info**([mysqli](#class.mysqli) $mysql): [?](#language.types.null)[string](#language.types.string)

La función **mysqli_info()** devuelve un string
que proporciona información acerca de la última consulta ejecutada.
La naturaleza de este string se detalla a continuación:

    <caption>**Valores de retorno posibles para mysqli_info()**</caption>



       Tipo de consulta
       Ejemplo de retorno






       INSERT INTO...SELECT...
       Records: 100 Duplicates: 0 Warnings: 0



       INSERT INTO...VALUES (...),(...),(...)
       Records: 3 Duplicates: 0 Warnings: 0



       LOAD DATA INFILE ...
       Records: 1 Deleted: 0 Skipped: 0 Warnings: 0



       ALTER TABLE ...
       Records: 3 Duplicates: 0 Warnings: 0



       UPDATE ...
       Rows matched: 40 Changed: 40 Warnings: 0




**Nota**:

    Las consultas que no forman parte de la lista anterior no están soportadas.
    En esta situación, **mysqli_info()** devolverá un string vacío.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un string que proporciona información adicional
acerca de la última consulta ejecutada.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;info**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$mysqli-&gt;query("CREATE TEMPORARY TABLE t1 LIKE City");

/_ INSERT INTO ... SELECT _/
$mysqli-&gt;query("INSERT INTO t1 SELECT \* FROM City ORDER BY ID LIMIT 150");
printf("%s\n", $mysqli-&gt;info);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

mysqli_query($link, "CREATE TEMPORARY TABLE t1 LIKE City");

/_ INSERT INTO ... SELECT _/
mysqli_query($link, "INSERT INTO t1 SELECT * FROM City ORDER BY ID LIMIT 150");
printf("%s\n", mysqli_info($link));

Los ejemplos anteriores mostrarán:

Records: 150 Duplicates: 0 Warnings: 0

### Ver también

    - [mysqli_affected_rows()](#mysqli.affected-rows) - Devuelve el número de filas afectadas por la última operación MySQL

    - [mysqli_warning_count()](#mysqli.warning-count) - Devuelve el número de advertencias generadas por la última consulta ejecutada

    - [mysqli_num_rows()](#mysqli-result.num-rows) - Devuelve el número de filas en el conjunto de resultados

# mysqli::init

# mysqli_init

(PHP 5, PHP 7, PHP 8)

mysqli::init -- mysqli_init — Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()

### Descripción

Estilo orientado a objetos

[#[\Deprecated]](class.deprecated.html)
public **mysqli::init**(): [?](#language.types.null)[bool](#language.types.boolean)

Estilo procedimental

**mysqli_init**(): [mysqli](#class.mysqli)|[false](#language.types.singleton)

Asigna o inicializa un objeto MySQL utilizable para las funciones
[mysqli_options()](#mysqli.options) y [mysqli_real_connect()](#mysqli.real-connect).

**Nota**:

    Todas las llamadas siguientes a cualquier función MySQLi (excepto
    [mysqli_options()](#mysqli.options) y [mysqli_ssl_set()](#mysqli.ssl-set))
    fallarán hasta que la función [mysqli_real_connect()](#mysqli.real-connect) sea llamada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**mysqli::init()** devuelve **[null](#constant.null)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.
**mysqli_init()** devuelve un objeto en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El método **mysqli::init()** de estilo orientado a objetos ha sido deprecado.
       Reemplace las llamadas a **parent::init()** por **parent::__construct()**.



### Ejemplos

Ver [mysqli_real_connect()](#mysqli.real-connect).

### Ver también

    - [mysqli_options()](#mysqli.options) - Define las opciones

    - [mysqli_close()](#mysqli.close) - Cierra una conexión

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

# mysqli::$insert_id

# mysqli_insert_id

(PHP 5, PHP 7, PHP 8)

mysqli::$insert_id -- mysqli_insert_id — Devuelve el valor generado para una columna AUTO_INCREMENT por la última consulta

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli-&gt;insert_id](#mysqli.insert-id);

Estilo procedimental

**mysqli_insert_id**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el ID generado por una consulta INSERT o
UPDATE en una tabla con una columna que tiene el atributo
AUTO_INCREMENT. En el caso de consultas multilínea
INSERT, esto devuelve el primer valor generado automáticamente
que fue insertado con éxito.

Ejecutar una consulta INSERT o UPDATE
utilizando la función MySQL LAST_INSERT_ID() modificará
también el valor devuelto por **mysqli_insert_id()**.
Si LAST_INSERT_ID(expr) se ha utilizado para generar el
valor de AUTO_INCREMENT, esto devuelve el valor de la
última expr en lugar del valor generado de
AUTO_INCREMENT.

Devuelve 0 si la consulta anterior no ha cambiado el
valor de AUTO_INCREMENT.
**mysqli_insert_id()** debe ser llamado inmediatamente después
de que la consulta haya generado el valor.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

El valor del campo AUTO_INCREMENT modificado por la última consulta.
Devuelve cero si no ha habido consulta en la conexión o si la última consulta no ha
modificado el valor del AUTO_INCREMENT.

Solo las consultas emitidas por la conexión actual afectan el valor de retorno.
El valor no se ve afectado por las consultas que utilizan otras conexiones
o clientes.

**Nota**:

    Si el número es mayor que el valor máximo de un integer,
    será devuelto como un [string](#language.types.string)

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;insert_id**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$mysqli-&gt;query("CREATE TABLE myCity LIKE City");

$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
$mysqli-&gt;query($query);

printf("El nuevo registro tiene ID %d.\n", $mysqli-&gt;insert_id);

/_ eliminar tabla _/
$mysqli-&gt;query("DROP TABLE myCity");
?&gt;

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

mysqli_query($link, "CREATE TABLE myCity LIKE City");

$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
mysqli_query($link, $query);

printf("El nuevo registro tiene ID %d.\n", mysqli_insert_id($link));

/_ eliminar tabla _/
mysqli_query($link, "DROP TABLE myCity");
?&gt;

Los ejemplos anteriores mostrarán:

El nuevo registro tiene ID 1.

# mysqli::kill

# mysqli_kill

(PHP 5, PHP 7, PHP 8)

mysqli::kill -- mysqli_kill — Solicita al servidor que finalice un hilo MySQL

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

Estilo orientado a objetos

[#[\Deprecated]](class.deprecated.html)
public **mysqli::kill**([int](#language.types.integer) $process_id): [bool](#language.types.boolean)

Estilo procedimental

[#[\Deprecated]](class.deprecated.html)
**mysqli_kill**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $process_id): [bool](#language.types.boolean)

**mysqli_kill()** se utiliza para solicitar al servidor que
finalice un hilo MySQL especificado por el argumento
process_id. Este valor debe obtenerse
llamando a la función [mysqli_thread_id()](#mysqli.thread-id).

Para detener una consulta en ejecución, se debe utilizar el comando SQL
KILL QUERY process_id.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Los métodos **mysqli::kill()** y
       **mysqli_kill()** están ahora obsoletos. Se recomienda
       utilizar el comando SQL KILL.



### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::kill()**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

/_ Determina el id del hilo _/
$thread_id = $mysqli-&gt;thread_id;

/_ Finaliza el hilo _/
$mysqli-&gt;kill($thread_id);

/_ Esto debería producir un error _/
if (!$mysqli-&gt;query("CREATE TABLE myCity LIKE City")) {
printf("Error: %s\n", $mysqli-&gt;error);
exit;
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

/_ Determina el id del hilo _/
$thread_id = mysqli_thread_id($link);

/_ Finaliza el hilo _/
mysqli_kill($link, $thread_id);

/_ Esto debería producir un error _/
if (!mysqli_query($link, "CREATE TABLE myCity LIKE City")) {
    printf("Error: %s\n", mysqli_error($link));
exit;
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error: MySQL server has gone away

### Ver también

    - [mysqli_thread_id()](#mysqli.thread-id) - Devuelve el identificador del hilo para la conexión actual

# mysqli::more_results

# mysqli_more_results

(PHP 5, PHP 7, PHP 8)

mysqli::more_results -- mysqli_more_results — Comprueba si hay más conjuntos de resultados MySQL disponibles

### Descripción

Estilo orientado a objetos

public **mysqli::more_results**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_more_results**([mysqli](#class.mysqli) $mysql): [bool](#language.types.boolean)

Indica si uno o más conjuntos de resultados están disponibles, generados por una
llamada anterior a [mysqli_multi_query()](#mysqli.multi-query).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve **[true](#constant.true)** si uno o más conjuntos de resultados (incluyendo errores)
están disponibles a partir de una llamada previa a la función
[mysqli_multi_query()](#mysqli.multi-query), **[false](#constant.false)** en caso contrario.

### Ejemplos

Ver [mysqli_multi_query()](#mysqli.multi-query).

### Ver también

    - [mysqli_multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

    - [mysqli_next_result()](#mysqli.next-result) - Prepara el siguiente resultado de una consulta múltiple

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli::multi_query

# mysqli_multi_query

(PHP 5, PHP 7, PHP 8)

mysqli::multi_query -- mysqli_multi_query — Ejecuta una o varias consultas en la base de datos

### Descripción

Estilo orientado a objetos

public **mysqli::multi_query**([string](#language.types.string) $query): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_multi_query**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $query): [bool](#language.types.boolean)

Ejecuta una o varias consultas, agrupadas en el parámetro
query mediante puntos y comas.

**Advertencia**

# Advertencia de seguridad: Inyección SQL

Si la consulta contiene alguna entrada de variable,
entonces se deben usar [sentencias preparadas
parametrizadas](#mysqli.quickstart.prepared-statements) en su lugar. Alternativamente, los datos deben estar correctamente formateados y todas las cadenas deben ser escapadas usando
la función [mysqli_real_escape_string()](#mysqli.real-escape-string).

Las consultas se envían de manera asíncrona en una sola llamada a la
base de datos, pero la base de datos las procesa de manera secuencial.
**mysqli_multi_query()** espera a que la primera consulta
se complete antes de devolver el control a PHP. El servidor MySQL procesará
entonces la siguiente consulta en la secuencia. Una vez que el resultado esté listo,
MySQL esperará a la siguiente ejecución de
[mysqli_next_result()](#mysqli.next-result) desde PHP.

Se recomienda utilizar una
[do-while](#control-structures.do.while) para procesar
varias consultas. La conexión estará ocupada hasta que todas las
consultas se completen y sus resultados sean recuperados por PHP.
Ninguna otra consulta puede ser emitida en la misma conexión, hasta que
todas las consultas sean procesadas.
Para procesar la siguiente consulta en la secuencia, utilizar
[mysqli_next_result()](#mysqli.next-result). Si el siguiente resultado no está
aún listo, mysqli esperará la respuesta desde el servidor MySQL.
Para verificar si hay más resultados, utilizar
[mysqli_more_results()](#mysqli.more-results).

Para las consultas que producen un conjunto de resultados, como
SELECT, SHOW, DESCRIBE o
EXPLAIN,
[mysqli_use_result()](#mysqli.use-result) o [mysqli_store_result()](#mysqli.store-result)
pueden ser utilizados para recuperar el conjunto de resultados. Para las consultas que
no producen un conjunto de resultados, las mismas funciones pueden ser
utilizadas para recuperar información como el número de filas afectadas.

**Sugerencia**

    Ejecutar una consulta CALL para procedimientos almacenados
    puede producir varios conjuntos de resultados. Si el procedimiento almacenado contiene
    consultas SELECT, los conjuntos de resultados son devueltos
    en el orden en que son producidos por la ejecución del procedimiento.
    En general, el llamador no puede saber cuántos conjuntos de resultados devolverá un
    procedimiento y debe estar preparado para recuperar varios resultados.
    El resultado final del procedimiento es un resultado de estado que no incluye
    un conjunto de resultados. El estado indica si el procedimiento tuvo éxito
    o si se produjo un error.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     query


       Una [string](#language.types.string) que contiene las consultas a ejecutar.
       Varias consultas deben estar separadas por un punto y coma.





### Valores devueltos

Devuelve **[false](#constant.false)** únicamente si la primera consulta falla. Para recuperar
las subsecuencias de errores provenientes de otras consultas, se debe llamar
primero a la función [mysqli_next_result()](#mysqli.next-result).

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::multi_query()**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT CURRENT_USER();";
$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";

/_ Ejecución de una consulta múltiple _/
$mysqli-&gt;multi_query($query);
do {
/_ Almacenar el conjunto de resultados en PHP _/
if ($result = $mysqli-&gt;store_result()) {
        while ($row = $result-&gt;fetch_row()) {
            printf("%s\n", $row[0]);
        }
    }
    /* Imprimir divisor */
    if ($mysqli-&gt;more_results()) {
printf("-----------------\n");
}
} while ($mysqli-&gt;next_result());
?&gt;

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT CURRENT_USER();";
$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";

/_ Ejecución de una consulta múltiple _/
mysqli_multi_query($link, $query);
do {
    /* Almacenar el conjunto de resultados en PHP */
    if ($result = mysqli_store_result($link)) {
        while ($row = mysqli_fetch_row($result)) {
            printf("%s\n", $row[0]);
        }
        /* Mostrar una separación */
        if (mysqli_more_results($link)) {
printf("-----------------\n");
}
}
/_ Imprimir divisor _/
if (mysqli_more_results($link)) {
        printf("-----------------\n");
    }
} while (mysqli_next_result($link));
?&gt;

Los ejemplos anteriores mostrarán algo similar a:

## my_user@localhost

Amersfoort
Maastricht
Dordrecht
Leiden
Haarlemmermeer

### Ver también

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_next_result()](#mysqli.next-result) - Prepara el siguiente resultado de una consulta múltiple

    - [mysqli_more_results()](#mysqli.more-results) - Comprueba si hay más conjuntos de resultados MySQL disponibles

# mysqli::next_result

# mysqli_next_result

(PHP 5, PHP 7, PHP 8)

mysqli::next_result -- mysqli_next_result — Prepara el siguiente resultado de una consulta múltiple

### Descripción

Estilo orientado a objetos

**mysqli::next_result**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_next_result**([mysqli](#class.mysqli) $mysql): [bool](#language.types.boolean)

Prepara el siguiente conjunto de resultados, inicializado por una llamada anterior a
[mysqli_multi_query()](#mysqli.multi-query), y que puede ser leído por
[mysqli_store_result()](#mysqli.store-result) o
[mysqli_use_result()](#mysqli.use-result).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Asimismo, devuelve **[false](#constant.false)** si la siguiente sentencia
resulta en un error, a diferencia de [mysqli_more_results()](#mysqli.more-results).

### Ejemplos

Véase [mysqli_multi_query()](#mysqli.multi-query).

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ver también

    - [mysqli_multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

    - [mysqli_more_results()](#mysqli.more-results) - Comprueba si hay más conjuntos de resultados MySQL disponibles

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli::options

# mysqli_options

(PHP 5, PHP 7, PHP 8)

mysqli::options -- mysqli_options — Define las opciones

### Descripción

Estilo orientado a objetos

public **mysqli::options**([int](#language.types.integer) $option, [string](#language.types.string)|[int](#language.types.integer) $value): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_options**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $option, [string](#language.types.string)|[int](#language.types.integer) $value): [bool](#language.types.boolean)

Útil para definir opciones de conexión y así afectar el comportamiento de la conexión actual.

Esta función puede ser llamada múltiples veces para definir múltiples opciones.

**mysqli_options()** debe ser llamada después de
[mysqli_init()](#mysqli.init) y antes de
[mysqli_real_connect()](#mysqli.real-connect).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     option


       La opción que se desea definir. Puede tomar uno de los siguientes valores:



        <caption>**Opciones válidas**</caption>



           Nombre
           Descripción






           **[MYSQLI_OPT_CONNECT_TIMEOUT](#constant.mysqli-opt-connect-timeout)**
           Tiempo máximo de conexión en segundos



           **[MYSQLI_OPT_READ_TIMEOUT](#constant.mysqli-opt-read-timeout)**
           Tiempo de espera de ejecución de un comando en segundos.
            Disponible a partir de PHP 7.2.0.



           **[MYSQLI_OPT_LOCAL_INFILE](#constant.mysqli-opt-local-infile)**
           Activa/desactiva el uso de LOAD LOCAL INFILE



           **[MYSQLI_INIT_COMMAND](#constant.mysqli-init-command)**
           Comando a ejecutar después de la conexión al servidor MySQL



           **[MYSQLI_SET_CHARSET_NAME](#constant.mysqli-set-charset-name)**
           El juego de caracteres a definir por defecto.



           **[MYSQLI_READ_DEFAULT_FILE](#constant.mysqli-read-default-file)**

            Lee las opciones desde el nombre de la opción en lugar del archivo
            my.cnf
            No soportado por mysqlnd




           **[MYSQLI_READ_DEFAULT_GROUP](#constant.mysqli-read-default-group)**

            Lee las opciones del grupo desde my.cnf
            o desde el archivo especificado con **[MYSQL_READ_DEFAULT_FILE](#constant.mysql-read-default-file)**.
            No soportado por mysqlnd




           **[MYSQLI_SERVER_PUBLIC_KEY](#constant.mysqli-server-public-key)**

            Archivo que contiene la clave pública RSA utilizada con la autenticación
            basada en SHA-256.




           **[MYSQLI_OPT_NET_CMD_BUFFER_SIZE](#constant.mysqli-opt-net-cmd-buffer-size)**

            El tamaño del buffer interno de comando/red. Únicamente válido
            para mysqlnd.




           **[MYSQLI_OPT_NET_READ_BUFFER_SIZE](#constant.mysqli-opt-net-read-buffer-size)**

            Tamaño, en bytes, máximo de la parte a leer durante la lectura
            del cuerpo de un paquete de comando MySQL. Únicamente válido para mysqlnd.




           **[MYSQLI_OPT_INT_AND_FLOAT_NATIVE](#constant.mysqli-opt-int-and-float-native)**

            Convierte las columnas enteras y de coma flotante en números
            PHP al utilizar declaraciones no preparadas.
            Válido únicamente para mysqlnd.




           **[MYSQLI_OPT_SSL_VERIFY_SERVER_CERT](#constant.mysqli-opt-ssl-verify-server-cert)**

            Si el certificado del servidor debe ser verificado o no.











     value


       El valor para la opción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

Ver [mysqli_real_connect()](#mysqli.real-connect).

### Notas

**Nota**:

MySQLnd siempre asume el juego de caracteres predeterminado del servidor. Este juego de caracteres es enviado durante el intercambio de conexión/autenticación, el cual mysqlnd utilizará.

Libmysqlclient utiliza el juego de caracteres predeterminado establecido en el
my.cnf o mediante una llamada explícita a **mysqli_options()** antes de
llamar a [mysqli_real_connect()](#mysqli.real-connect), pero después de [mysqli_init()](#mysqli.init).

### Ver también

    - [mysqli_init()](#mysqli.init) - Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

# mysqli::ping

# mysqli_ping

(PHP 5, PHP 7, PHP 8)

mysqli::ping -- mysqli_ping — Verifica la conexión al servidor y reconecta si ya no existe

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

Estilo orientado a objetos

[#[\Deprecated]](class.deprecated.html)
public **mysqli::ping**(): [bool](#language.types.boolean)

Estilo procedimental

[#[\Deprecated]](class.deprecated.html)
**mysqli_ping**([mysqli](#class.mysqli) $mysql): [bool](#language.types.boolean)

Verifica si la conexión al servidor funciona correctamente. Si ha sido
cerrada y la opción global
[mysqli.reconnect](#ini.mysqli.reconnect) está activada,
se intenta una reconexión automática.

**Nota**:

    El parámetro php.ini mysqli.reconnect es ignorado por el controlador mysqlnd, por lo tanto
    las reconexiones automáticas nunca se intentan.

Esta función puede ser utilizada para que los clientes que permanecen
abiertos durante mucho tiempo sin actividad puedan verificar que la conexión no ha sido
cerrada por el servidor y, en caso afirmativo, realizar una reconexión
automática.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Los métodos **mysqli::ping()** y
       **mysqli_ping()** están ahora obsoletos.
       La funcionalidad reconnect ya no está
       disponible desde PHP 8.2.0, lo que hace que esta función sea obsoleta.



### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::ping()**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if ($mysqli-&gt;connect_errno) {
printf("Conexión fallida: %s\n", $mysqli-&gt;connect_error);
exit();
}

/_ Verificación si la conexión sigue activa _/
if ($mysqli-&gt;ping()) {
printf ("¡La conexión está bien!\n");
} else {
printf ("Error: %s\n", $mysqli-&gt;error);
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

/_ Verificación si la conexión sigue activa _/
if (mysqli_ping($link)) {
    printf ("¡La conexión está bien!\n");
} else {
    printf ("Error: %s\n", mysqli_error($link));
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

¡La conexión es válida!

# mysqli::poll

# mysqli_poll

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli::poll -- mysqli_poll — Verifica el estado de la conexión

### Descripción

Estilo orientado a objetos

public static **mysqli::poll**(
    [?](#language.types.null)[array](#language.types.array) &amp;$read,
    [?](#language.types.null)[array](#language.types.array) &amp;$error,
    [array](#language.types.array) &amp;$reject,
    [int](#language.types.integer) $seconds,
    [int](#language.types.integer) $microseconds = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_poll**(
    [?](#language.types.null)[array](#language.types.array) &amp;$read,
    [?](#language.types.null)[array](#language.types.array) &amp;$error,
    [array](#language.types.array) &amp;$reject,
    [int](#language.types.integer) $seconds,
    [int](#language.types.integer) $microseconds = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Verifica el estado de la conexión.
El método puede ser utilizado como
[estático](#language.oop5.static).

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

### Parámetros

     read


       Lista de conexiones para verificar resultados excepcionales
       que pueden ser leídos.






     error


       Lista de conexiones en las que se ha producido un error,
       por ejemplo, fallos en consultas o pérdidas de conexión.






     reject


       Lista de conexiones rechazadas porque se ejecutaron consultas no asíncronas
       y para las cuales la función podría devolver resultados.






     seconds


       Número de segundos de espera máxima, debe ser positivo.






     microseconds


       Número de microsegundos de espera máxima, debe ser positivo.





### Valores devueltos

Devuelve el número de conexiones disponibles en caso de éxito,
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) cuando ni
el argumento read ni el argumento error son transmitidos.

### Historial de cambios

       Versión
       Descripción






       8.3.0

        Ahora lanza una excepción [ValueError](#class.valueerror) cuando ni
        el argumento read ni el argumento error son transmitidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con mysqli_poll()**

&lt;?php
$link1 = mysqli_connect();
$link1-&gt;query("SELECT 'test'", MYSQLI_ASYNC);
$all_links = array($link1);
$processed = 0;
do {
    $links = $errors = $reject = array();
    foreach ($all_links as $link) {
        $links[] = $errors[] = $reject[] = $link;
    }
    if (!mysqli_poll($links, $errors, $reject, 1)) {
        continue;
    }
    foreach ($links as $link) {
        if ($result = $link-&gt;reap_async_query()) {
            print_r($result-&gt;fetch_row());
if (is_object($result))
                mysqli_free_result($result);
} else die(sprintf("Error MySQLi: %s", mysqli_error($link)));
        $processed++;
    }
} while ($processed &lt; count($all_links));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; test
)

### Ver también

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_reap_async_query()](#mysqli.reap-async-query) - Lee un resultado para una consulta asíncrona

# mysqli::prepare

# mysqli_prepare

(PHP 5, PHP 7, PHP 8)

mysqli::prepare -- mysqli_prepare — Prepara una consulta SQL para su ejecución

### Descripción

Estilo orientado a objetos

public **mysqli::prepare**([string](#language.types.string) $query): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_prepare**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $query): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)

Prepara la consulta SQL y devuelve un gestor de consulta para ser utilizado en futuras operaciones con la consulta. La consulta debe constar de una única consulta SQL.

Los parámetros de marcadores deben ser vinculados a variables utilizadas en las funciones [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) y/o [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result) antes de ejecutar la consulta o recuperar las filas.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     query


       La consulta, en forma de [string](#language.types.string).




       Este parámetro puede incluir uno o más parámetros de marcadores en la consulta SQL con el carácter "signo de interrogación" (?) en la posición apropiada.



      **Nota**:



        Los marcadores están permitidos únicamente en ciertos lugares de las consultas SQL. Por ejemplo, están permitidos en la lista VALUES() de una consulta INSERT (para especificar los valores de las columnas para una fila), o en una comparación de una cláusula WHERE para especificar un valor de comparación. Sin embargo, no están permitidos para los identificadores (de tablas o columnas).






### Valores devueltos

**mysqli_prepare()** devuelve un objeto de sentencia o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::prepare()**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$city = "Amersfoort";

/_ Crea una consulta preparada _/
if ($stmt = $mysqli-&gt;prepare("SELECT District FROM City WHERE Name=?")) {

    /* Vinculación de los marcadores */
    $stmt-&gt;bind_param("s", $city);

    /* Ejecución de la consulta */
    $stmt-&gt;execute();

    /* Vinculación de las variables resultantes */
    $stmt-&gt;bind_result($district);

    /* Obtención de los valores */
    $stmt-&gt;fetch();

    printf("%s está en el distrito de %s\n", $city, $district);

    /* Cierre de la sentencia */
    $stmt-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$city = "Amersfoort";

/_ Crea una consulta preparada _/
if ($stmt = mysqli_prepare($link, "SELECT District FROM City WHERE Name=?")) {

    /* Vinculación de los marcadores */
    mysqli_stmt_bind_param($stmt, "s", $city);

    /* Ejecución de la consulta */
    mysqli_stmt_execute($stmt);

    /* Vinculación de las variables resultantes */
    mysqli_stmt_bind_result($stmt, $district);

    /* Obtención de los valores */
    mysqli_stmt_fetch($stmt);

    printf("%s está en el distrito de %s\n", $city, $district);

    /* Cierre de la sentencia */
    mysqli_stmt_close($stmt);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Amersfoort está en el distrito de Utrecht

### Ver también

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

    - [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result) - Vincula variables a un conjunto de resultados

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

    - [mysqli_stmt_close()](#mysqli-stmt.close) - Termina una consulta preparada

# mysqli::query

# mysqli_query

(PHP 5, PHP 7, PHP 8)

mysqli::query -- mysqli_query — Ejecuta una consulta en la base de datos

### Descripción

Estilo orientado a objetos

public **mysqli::query**([string](#language.types.string) $query, [int](#language.types.integer) $result_mode = **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Estilo procedimental

**mysqli_query**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $query, [int](#language.types.integer) $result_mode = **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Ejecuta una consulta en la base de datos.

**Advertencia**

# Advertencia de seguridad: Inyección SQL

Si la consulta contiene alguna entrada de variable,
entonces se deben usar [sentencias preparadas
parametrizadas](#mysqli.quickstart.prepared-statements) en su lugar. Alternativamente, los datos deben estar correctamente formateados y todas las cadenas deben ser escapadas usando
la función [mysqli_real_escape_string()](#mysqli.real-escape-string).

Para consultas no-DML (que no son un INSERT, un UPDATE o un DELETE),
esta función es similar a llamar a
[mysqli_real_query()](#mysqli.real-query) seguida de
[mysqli_use_result()](#mysqli.use-result) o
[mysqli_store_result()](#mysqli.store-result).

**Nota**:

    Si se pasa una consulta a
    **mysqli_query()** que es más larga que
    max_allowed_packet, los códigos de error devueltos serán
    diferentes según si se utiliza MySQL Native Driver
    (mysqlnd) o la MySQL Client Library
    (libmysqlclient). El comportamiento se define como sigue:




    -

      mysqlnd en Linux devuelve un código de error 1153.
      El mensaje de error será got a packet bigger than
      max_allowed_packet bytes.





    -

      mysqlnd en Windows devuelve un código de error 2006.
      El mensaje será del tipo server has gone away.





    -

      libmysqlclient en cualquier plataforma devuelve el código de error
      2006. El mensaje será del tipo server has gone away.


### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     query


       La consulta, en forma de [string](#language.types.string).






     result_mode


       El modo de resultado puede ser una de las 3 constantes que indican cómo
       el resultado será devuelto por el servidor MySQL.




       **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)** (por omisión) - devuelve un objeto [mysqli_result](#class.mysqli-result)
       con un conjunto de resultados almacenados en búfer.




       **[MYSQLI_USE_RESULT](#constant.mysqli-use-result)** - devuelve un objeto [mysqli_result](#class.mysqli-result)
       con un conjunto de resultados no almacenados en búfer.
       Mientras haya registros pendientes de ser recuperados, la línea de conexión estará ocupada
       y todas las llamadas siguientes devolverán el error Commands out of sync.
       Para evitar el error, todos los registros deben ser recuperados del servidor o el conjunto
       de resultados debe ser descartado llamando a la [mysqli_free_result()](#mysqli-result.free).




       **[MYSQLI_ASYNC](#constant.mysqli-async)** (disponible con mysqlnd) - la consulta se ejecuta
       de manera asíncrona y ningún conjunto de resultados es devuelto inmediatamente.
       [mysqli_poll()](#mysqli.poll) se utiliza entonces para obtener los resultados de tales consultas.
       Utilizada en combinación con la constante
       **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)** o **[MYSQLI_USE_RESULT](#constant.mysqli-use-result)**.





### Valores devueltos

Devuelve **[false](#constant.false)** en caso de fallo. Para consultas exitosas que producen
un conjunto de resultados como SELECT, SHOW, DESCRIBE o
EXPLAIN, **mysqli_query()** devolverá un
objeto [mysqli_result](#class.mysqli-result). Para otros tipos de
consultas exitosas, **mysqli_query()** devolverá **[true](#constant.true)**.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::query()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ "Create table" no devolverá ningún conjunto de resultados _/
$mysqli-&gt;query("CREATE TEMPORARY TABLE myCity LIKE City");
printf("Tabla myCity creada con éxito.\n");

/_ Consulta "Select" devuelve un conjunto de resultados _/
$result = $mysqli-&gt;query("SELECT Name FROM City LIMIT 10");
printf("Select ha devuelto %d líneas.\n", $result-&gt;num_rows);

/_ Si tenemos que recuperar muchos datos, utilizamos MYSQLI_USE_RESULT _/
$result = $mysqli-&gt;query("SELECT \* FROM City", MYSQLI_USE_RESULT);

/_ Tenga en cuenta que no podemos ejecutar ninguna función que actúe en el servidor mientras
el conjunto de resultados no esté cerrado. Todas las llamadas devolverán un 'out of sync' _/
$mysqli-&gt;query("SET @a:='this will not work'");

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ "Create table" no devolverá ningún conjunto de resultados _/
mysqli_query($link, "CREATE TEMPORARY TABLE myCity LIKE City");
printf("Tabla myCity creada con éxito.\n");

/_ Consulta "Select" devuelve un conjunto de resultados _/
$result = mysqli_query($link, "SELECT Name FROM City LIMIT 10");
printf("Select ha devuelto %d líneas.\n", mysqli_num_rows($result));

/_ Si tenemos que recuperar muchos datos, utilizamos MYSQLI_USE_RESULT _/
$result = mysqli_query($link, "SELECT \* FROM City", MYSQLI_USE_RESULT);

/_ Tenga en cuenta que no podemos ejecutar ninguna función que actúe en el servidor mientras
el conjunto de resultados no esté cerrado. Todas las llamadas devolverán un 'out of sync' _/
mysqli_query($link, "SET @a:='this will not work'");

Los ejemplos anteriores mostrarán:

Tabla myCity creada con éxito.
Select ha devuelto 10 líneas.
Fatal error: Uncaught mysqli_sql_exception: Commands out of sync; you can't run this command now in...

### Ver también

    - [mysqli_execute_query()](#mysqli.execute-query) - Prepara, vincula los parámetros y ejecuta una sentencia SQL

    - [mysqli_real_query()](#mysqli.real-query) - Ejecuta una consulta SQL

    - [mysqli_multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_free_result()](#mysqli-result.free) - Libera la memoria asociada a un resultado

# mysqli::real_connect

# mysqli_real_connect

(PHP 5, PHP 7, PHP 8)

mysqli::real_connect -- mysqli_real_connect — Establece una conexión con un servidor MySQL

### Descripción

Estilo orientado a objetos

public **mysqli::real_connect**(
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_real_connect**(
    [mysqli](#class.mysqli) $mysql,
    [?](#language.types.null)[string](#language.types.string) $hostname = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $database = **[null](#constant.null)**,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $socket = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

**mysqli_real_connect()** establece una conexión con un servidor MySQL.

Esta función difiere de [mysqli_connect()](#function.mysqli-connect):

- **mysqli_real_connect()** requiere un objeto válido que
  debe ser creado por la función [mysqli_init()](#mysqli.init).

- Con la función [mysqli_options()](#mysqli.options), se pueden
  configurar diferentes opciones de conexión.

- Existe un parámetro adicional flags.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     hostname


       Puede ser un nombre de host o una dirección IP. Al pasar **[null](#constant.null)**, el valor se recupera desde
       [mysqli.default_host](#ini.mysqli.default-host).
       Si es posible, se utilizarán pipes en lugar del protocolo TCP/IP.
       El protocolo TCP/IP se utiliza si se proporciona un nombre de host y un número de puerto juntos, por ejemplo localhost:3308.






     username


       El nombre de usuario MySQL o **[null](#constant.null)** para asumir el nombre de usuario según la opción ini
       [mysqli.default_user](#ini.mysqli.default-user).






     password


       La contraseña MySQL o **[null](#constant.null)** para asumir la contraseña según la opción ini
       [mysqli.default_pw](#ini.mysqli.default-pw).






     database


       La base de datos por defecto a utilizar al ejecutar consultas o **[null](#constant.null)**.






     port


       El número de puerto al que intentar conectarse al servidor MySQL o **[null](#constant.null)** para asumir el puerto según la opción ini
       [mysqli.default_port](#ini.mysqli.default-port).






     socket


       El socket o el pipe nombrado que debería utilizarse, o **[null](#constant.null)** para asumir el socket según la opción ini
       [mysqli.default_socket](#ini.mysqli.default-socket).



      **Nota**:



        Especificar explícitamente el parámetro socket
        no determina el tipo de método utilizado al conectarse
        a MySQL. El método se determina por el parámetro
        hostname.







     flags


       Con el parámetro flags, se pueden configurar
       diferentes directivas de conexión:




       <caption>**Opciones soportadas**</caption>



         Nombre
         Descripción






         **[MYSQLI_CLIENT_COMPRESS](#constant.mysqli-client-compress)**
         Utiliza el protocolo comprimido



         **[MYSQLI_CLIENT_FOUND_ROWS](#constant.mysqli-client-found-rows)**
         Devuelve el número de filas encontradas, no el número de filas afectadas.



         **[MYSQLI_CLIENT_IGNORE_SPACE](#constant.mysqli-client-ignore-space)**
         Permite espacios entre los nombres de funciones y los argumentos. Esto fuerza a que los nombres de funciones sean palabras reservadas.



         **[MYSQLI_CLIENT_INTERACTIVE](#constant.mysqli-client-interactive)**

          Permite interactive_timeout segundos (en lugar de
          wait_timeout segundos) de inactividad antes de cerrar
          la conexión.




         **[MYSQLI_CLIENT_SSL](#constant.mysqli-client-ssl)**
         Utiliza el cifrado SSL



         **[MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT](#constant.mysqli-client-ssl-dont-verify-server-cert)**

          Igual que **[MYSQLI_CLIENT_SSL](#constant.mysqli-client-ssl)**, pero desactiva la validación
          de los certificados SSL proporcionados. Esta constante está prevista solo para instalaciones
          que utilizan el driver MySQL nativo y MySQL 5.6 o superior.







      **Nota**:



        Por razones de seguridad, la opción **[MULTI_STATEMENT](#constant.multi-statement)** no es
        soportada en PHP. Si se desea ejecutar múltiples comandos, utilice
        la función [mysqli_multi_query()](#mysqli.multi-query).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

       Versión
       Descripción






       7.4.0

        Todos los parámetros son ahora nullable.





### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::real_connect()**

Estilo orientado a objetos

&lt;?php

$mysqli = mysqli_init();
if (!$mysqli) {
die('mysqli_init falló');
}

if (!$mysqli-&gt;options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
die('Configuración de MYSQLI_INIT_COMMAND falló');
}

if (!$mysqli-&gt;options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
die('Configuración de MYSQLI_OPT_CONNECT_TIMEOUT falló');
}

if (!$mysqli-&gt;real_connect('localhost', 'my_user', 'my_password', 'my_db')) {
die('Error de conexión (' . mysqli_connect_errno() . ') '
. mysqli_connect_error());
}

echo 'Éxito... ' . $mysqli-&gt;host_info . "\n";

$mysqli-&gt;close();
?&gt;

Estilo orientado a objetos, con extensión de la clase mysqli

&lt;?php

class foo_mysqli extends mysqli {
public function **construct($host, $user, $pass, $db) {
parent::**construct();

        if (!parent::options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            die('Configuración de MYSQLI_INIT_COMMAND falló');
        }

        if (!parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            die('Configuración de MYSQLI_OPT_CONNECT_TIMEOUT falló');
        }

        if (!parent::real_connect($host, $user, $pass, $db)) {
            die('Error de conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }

}

$db = new foo_mysqli('localhost', 'my_user', 'my_password', 'my_db');

echo 'Éxito... ' . $db-&gt;host_info . "\n";

$db-&gt;close();
?&gt;

Estilo procedimental

&lt;?php

$link = mysqli_init();
if (!$link) {
die('mysqli_init falló');
}

if (!mysqli_options($link, MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
die('Configuración de MYSQLI_INIT_COMMAND falló');
}

if (!mysqli_options($link, MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
die('Configuración de MYSQLI_OPT_CONNECT_TIMEOUT falló');
}

if (!mysqli_real_connect($link, 'localhost', 'my_user', 'my_password', 'my_db')) {
die('Error de conexión (' . mysqli_connect_errno() . ') '
. mysqli_connect_error());
}

echo 'Éxito... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Éxito... MySQL host info: localhost via TCP/IP

### Notas

**Nota**:

MySQLnd siempre asume el juego de caracteres predeterminado del servidor. Este juego de caracteres es enviado durante el intercambio de conexión/autenticación, el cual mysqlnd utilizará.

Libmysqlclient utiliza el juego de caracteres predeterminado establecido en el
my.cnf o mediante una llamada explícita a [mysqli_options()](#mysqli.options) antes de
llamar a **mysqli_real_connect()**, pero después de [mysqli_init()](#mysqli.init).

### Ver también

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

    - [mysqli_init()](#mysqli.init) - Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()

    - [mysqli_options()](#mysqli.options) - Define las opciones

    - [mysqli_ssl_set()](#mysqli.ssl-set) - Utilizada para establecer una conexión segura con SSL

    - [mysqli_close()](#mysqli.close) - Cierra una conexión

# mysqli::real_escape_string

# mysqli_real_escape_string

(PHP 5, PHP 7, PHP 8)

mysqli::real_escape_string -- mysqli_real_escape_string — Protege los caracteres especiales de un string para su uso en una consulta SQL, teniendo en cuenta el juego de caracteres actual de la conexión

### Descripción

Estilo orientado a objetos

public **mysqli::real_escape_string**([string](#language.types.string) $string): [string](#language.types.string)

Estilo procedimental

**mysqli_real_escape_string**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $string): [string](#language.types.string)

Esta función se utiliza para crear un string SQL válido que podrá ser utilizado en una consulta SQL. El string string se codifica para producir un string SQL escapado, teniendo en cuenta el juego de caracteres actual de la conexión.

**Precaución**

# Seguridad: El juego de caracteres por defecto

    El juego de caracteres debe ser definido ya sea a nivel de servidor, o con la función API [mysqli_set_charset()](#mysqli.set-charset) para que afecte a la función **mysqli_real_escape_string()**. Ver la sección sobre los conceptos de [juegos de caracteres](#mysqlinfo.concepts.charset) para más información.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     string


       El string a escapar.




       Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y CTRL+Z.





### Valores devueltos

Devuelve un string escapado.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::real_escape_string()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$city = "'s-Hertogenbosch";

/_ esta consulta con $city escapado funcionará _/
$query = sprintf("SELECT CountryCode FROM City WHERE name='%s'",
    $mysqli-&gt;real_escape_string($city));
$result = $mysqli-&gt;query($query);
printf("La selección devolvió %d filas.\n", $result-&gt;num_rows);

/_ esta consulta fallará, porque no escapamos $city _/
$query = sprintf("SELECT CountryCode FROM City WHERE name='%s'", $city);
$result = $mysqli-&gt;query($query);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$city = "'s-Hertogenbosch";

/_ esta consulta con $city escapado funcionará _/
$query = sprintf("SELECT CountryCode FROM City WHERE name='%s'",
    mysqli_real_escape_string($mysqli, $city));
$result = mysqli_query($mysqli, $query);
printf("La selección devolvió %d filas.\n", mysqli_num_rows($result));

/_ esta consulta fallará, porque no escapamos $city _/
$query = sprintf("SELECT CountryCode FROM City WHERE name='%s'", $city);
$result = mysqli_query($mysqli, $query);

Los ejemplos anteriores mostrarán algo similar a:

Select returned 1 rows.

Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's-Hertogenbosch'' at line 1 in...

### Ver también

    - [mysqli_set_charset()](#mysqli.set-charset) - Define el juego de caracteres del cliente

# mysqli::real_query

# mysqli_real_query

(PHP 5, PHP 7, PHP 8)

mysqli::real_query -- mysqli_real_query — Ejecuta una consulta SQL

### Descripción

Estilo orientado a objetos

public **mysqli::real_query**([string](#language.types.string) $query): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_real_query**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $query): [bool](#language.types.boolean)

Ejecuta una sola consulta en la conexión a la base de datos representada
por el parámetro link cuyo resultado puede ser
recuperado o almacenado utilizando las funciones [mysqli_store_result()](#mysqli.store-result)
o [mysqli_use_result()](#mysqli.use-result).

**Advertencia**

# Advertencia de seguridad: Inyección SQL

Si la consulta contiene alguna entrada de variable,
entonces se deben usar [sentencias preparadas
parametrizadas](#mysqli.quickstart.prepared-statements) en su lugar. Alternativamente, los datos deben estar correctamente formateados y todas las cadenas deben ser escapadas usando
la función [mysqli_real_escape_string()](#mysqli.real-escape-string).

Para determinar si una consulta dada debería haber devuelto un conjunto de resultados
o no, consulte la función [mysqli_field_count()](#mysqli.field-count).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     query


       La consulta [string](#language.types.string).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ver también

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli::reap_async_query

# mysqli_reap_async_query

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli::reap_async_query -- mysqli_reap_async_query — Lee un resultado para una consulta asíncrona

### Descripción

Estilo orientado a objetos

public **mysqli::reap_async_query**(): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Estilo procedimental

**mysqli_reap_async_query**([mysqli](#class.mysqli) $mysql): [mysqli_result](#class.mysqli-result)|[bool](#language.types.boolean)

Lee el resultado para una consulta asíncrona.

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve **[false](#constant.false)** en caso de error. Para consultas exitosas que producen
un conjunto de resultados como SELECT, SHOW, DESCRIBE o
EXPLAIN, **mysqli_reap_async_query()**
devolverá un objeto [mysqli_result](#class.mysqli-result). Para otros tipos de
consultas exitosas, **mysqli_reap_async_query()** devolverá **[true](#constant.true)**.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ver también

    - [mysqli_poll()](#mysqli.poll) - Verifica el estado de la conexión

# mysqli::refresh

# mysqli_refresh

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli::refresh -- mysqli_refresh — Actualiza

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

Estilo orientado a objetos

    [#[\Deprecated]](class.deprecated.html)

public **mysqli::refresh**([int](#language.types.integer) $flags): [bool](#language.types.boolean)

Estilo procedimental

[#[\Deprecated]](class.deprecated.html)
**mysqli_refresh**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $flags): [bool](#language.types.boolean)

Actualiza las tablas o las cachés, o reinicia la información del servidor de réplica.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     flags


       Las opciones de actualización, utilizando las constantes MYSQLI_REFRESH_* como se documenta en la documentación sobre las [constantes MySQLi](#mysqli.constants).




       Consulte también la documentación oficial sobre [» la actualización en MySQL](https://dev.mysql.com/doc/c-api/8.4/en/mysql-refresh.html).





### Valores devueltos

**[true](#constant.true)** si la actualización se realizó con éxito, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Los métodos **mysqli::refresh()** y **mysqli_refresh()** están ahora obsoletos. Utilice los comandos SQL FLUSH en su lugar.



### Ver también

    - [mysqli_poll()](#mysqli.poll) - Verifica el estado de la conexión

# mysqli::release_savepoint

# mysqli_release_savepoint

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

mysqli::release_savepoint -- mysqli_release_savepoint — Elimina el punto de guardado nombrado del conjunto de puntos de guardado de la transacción actual

### Descripción

Estilo orientado a objetos

public **mysqli::release_savepoint**([string](#language.types.string) $name): [bool](#language.types.boolean)

Estilo procedimental:

**mysqli_release_savepoint**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $name): [bool](#language.types.boolean)

Esta función equivale a ejecutar
$mysqli-&gt;query("RELEASE SAVEPOINT `$name`");.
Esta función no provocará un commit ni un rollback.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     name


       El identificador del punto de guardado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mysqli_savepoint()](#mysqli.savepoint) - Establece un punto de guardado nombrado de la transacción

# mysqli::rollback

# mysqli_rollback

(PHP 5, PHP 7, PHP 8)

mysqli::rollback -- mysqli_rollback — Revierte la transacción actual

### Descripción

Estilo orientado a objetos

public **mysqli::rollback**([int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_rollback**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $flags = 0, [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Revierte la transacción actual para la base de datos.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     flags


       Una máscara de constantes **[MYSQLI_TRANS_COR_*](#constant.mysqli-trans-cor-and-chain)**.






     name


       Si se proporciona, entonces ROLLBACK/*name*/ es ejecutado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        name ahora puede ser nullable.





### Ejemplos

Ver el ejemplo que se encuentra en la documentación del método
[<a href="#mysqli.begin-transaction" class="methodname">mysqli::begin_transaction()](#mysqli.begin-transaction.example.basic)</a>.

### Notas

**Nota**:

    Esta función no funciona con los tipos de tabla no transaccionales
    (como MyISAM o ISAM).

### Ver también

    - [mysqli_begin_transaction()](#mysqli.begin-transaction) - Inicia una transacción

    - [mysqli_commit()](#mysqli.commit) - Valida la transacción actual

    - [mysqli_autocommit()](#mysqli.autocommit) - Activa o desactiva el modo auto-commit

    - [mysqli_release_savepoint()](#mysqli.release-savepoint) - Elimina el punto de guardado nombrado del conjunto de puntos de guardado de la transacción actual

# mysqli::savepoint

# mysqli_savepoint

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

mysqli::savepoint -- mysqli_savepoint — Establece un punto de guardado nombrado de la transacción

### Descripción

Estilo orientado a objetos

public **mysqli::savepoint**([string](#language.types.string) $name): [bool](#language.types.boolean)

Estilo procedimental:

**mysqli_savepoint**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $name): [bool](#language.types.boolean)

Esta función equivale a ejecutar
$mysqli-&gt;query("SAVEPOINT `$name`");

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     name


       El identificador del punto de guardado





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mysqli_release_savepoint()](#mysqli.release-savepoint) - Elimina el punto de guardado nombrado del conjunto de puntos de guardado de la transacción actual

# mysqli::select_db

# mysqli_select_db

(PHP 5, PHP 7, PHP 8)

mysqli::select_db -- mysqli_select_db — Selecciona una base de datos por defecto para las consultas

### Descripción

Estilo orientado a objetos

public **mysqli::select_db**([string](#language.types.string) $database): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_select_db**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $database): [bool](#language.types.boolean)

Selecciona la base de datos por defecto (especificada por el argumento
database) para ser utilizada al ejecutar
consultas en la conexión representada por el argumento
mysql.

**Nota**:

    Esta función solo debe utilizarse para cambiar la base de datos por defecto para
    la conexión actual. La base de datos por defecto puede seleccionarse con
    el cuarto argumento de la función [mysqli_connect()](#function.mysqli-connect).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     database


       El nombre de la base de datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::select_db()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

/_ obtener el nombre de la base de datos por defecto actual _/
$result = $mysqli-&gt;query("SELECT DATABASE()");
$row = $result-&gt;fetch_row();
printf("La base de datos por defecto es %s.\n", $row[0]);

/_ cambiar la base de datos por defecto a "world" _/
$mysqli-&gt;select_db("world");

/_ obtener el nombre de la base de datos por defecto actual _/
$result = $mysqli-&gt;query("SELECT DATABASE()");
$row = $result-&gt;fetch_row();
printf("La base de datos por defecto es %s.\n", $row[0]);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "test");

/_ obtener el nombre de la base de datos por defecto actual _/
$result = mysqli_query($link, "SELECT DATABASE()");
$row = mysqli_fetch_row($result);
printf("La base de datos por defecto es %s.\n", $row[0]);

/_ cambiar la base de datos por defecto a "world" _/
mysqli_select_db($link, "world");

/_ obtener el nombre de la base de datos por defecto actual _/
$result = mysqli_query($link, "SELECT DATABASE()");
$row = mysqli_fetch_row($result);
printf("La base de datos por defecto es %s.\n", $row[0]);

Los ejemplos anteriores mostrarán:

La base de datos por defecto es test.
La base de datos por defecto es world.

### Ver también

    - [mysqli_connect()](#function.mysqli-connect) - Alias de mysqli::__construct

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

# mysqli::set_charset

# mysqli_set_charset

(PHP 5 &gt;= 5.0.5, PHP 7, PHP 8)

mysqli::set_charset -- mysqli_set_charset — Define el juego de caracteres del cliente

### Descripción

Estilo orientado a objetos

public **mysqli::set_charset**([string](#language.types.string) $charset): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_set_charset**([mysqli](#class.mysqli) $mysql, [string](#language.types.string) $charset): [bool](#language.types.boolean)

Define el juego de caracteres a utilizar al enviar datos desde y hacia el servidor de base de datos.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     charset


       El juego de caracteres a definir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::set_charset()**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

printf("Juego de caracteres inicial: %s\n", $mysqli-&gt;character_set_name());

/_ Cambio del juego de resultados a utf8mb4 _/
$mysqli-&gt;set_charset("utf8mb4");

printf("Juego de caracteres actual: %s\n", $mysqli-&gt;character_set_name());
?&gt;

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect('localhost', 'my_user', 'my_password', 'test');

printf("Juego de caracteres inicial: %s\n", mysqli_character_set_name($link));

/_ Cambio del juego de resultados a utf8mb4 _/
mysqli_set_charset($link, "utf8mb4");

printf("Juego de caracteres actual: %s\n", mysqli_character_set_name($link));
?&gt;

Los ejemplos anteriores mostrarán algo similar a:

Juego de caracteres inicial: latin1
Juego de caracteres actual: utf8mb4

### Notas

**Nota**:

    Esta es la mejor forma de modificar el juego de caracteres.
    No se recomienda utilizar la función
    [mysqli_query()](#mysqli.query) para definirlo
    (como con la consulta SET NAMES utf8).
    Ver la sección [Conceptos de
    juegos de caracteres de MySQL](#mysqlinfo.concepts.charset) para más información.

### Ver también

    - [mysqli_character_set_name()](#mysqli.character-set-name) - Devuelve el juego de caracteres actual para la conexión

    - [mysqli_real_escape_string()](#mysqli.real-escape-string) - Protege los caracteres especiales de un string para su uso en una consulta SQL, teniendo en cuenta el juego de caracteres actual de la conexión

    - [Conceptos de juegos de caracteres de MySQL](#mysqlinfo.concepts.charset)

    - [» Lista de juegos de caracteres
      soportados por MySQL](http://dev.mysql.com/doc/mysql/en/charset-charsets.html)

# mysqli::$sqlstate

# mysqli_sqlstate

(PHP 5, PHP 7, PHP 8)

mysqli::$sqlstate -- mysqli_sqlstate — Devuelve el error SQLSTATE de la última operación MySQL

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli-&gt;sqlstate](#mysqli.sqlstate);

Estilo procedimental

**mysqli_sqlstate**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)

Devuelve un string que contiene el código de error SQLSTATE del último error.
El código de error '00000' significa: "sin errores". Los valores
están especificados por los estándares ANSI SQL y ODBC. Para una lista de los valores
posibles, consulte: [» http://dev.mysql.com/doc/mysql/en/error-handling.html](http://dev.mysql.com/doc/mysql/en/error-handling.html).

**Nota**:

    Tenga en cuenta que no todos los errores de MySQL tienen aún una correspondencia
    con los errores SQLSTATE. El valor HY000
    (error general) se utiliza para los errores sin correspondencia.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve un string que contiene el código de error
SQLSTATE del último error. El código está compuesto por
5 caracteres: '00000' representa la ausencia
de errores.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;sqlstate**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ La tabla Ciudad ya existe, deberíamos tener un error _/
try {
$mysqli-&gt;query("CREATE TABLE City (ID INT, Name VARCHAR(30))");
} catch (mysqli_sql_exception) {
printf("Error - SQLSTATE %s.\n", $mysqli-&gt;sqlstate);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ La tabla Ciudad ya existe, deberíamos tener un error _/
try {
mysqli_query($link, "CREATE TABLE City (ID INT, Name VARCHAR(30))");
} catch (mysqli_sql_exception) {
    printf("Error - SQLSTATE %s.\n", mysqli_sqlstate($link));
}

Los ejemplos anteriores mostrarán:

Error - SQLSTATE 42S01.

### Ver también

    - [mysqli_errno()](#mysqli.errno) - Devuelve el último código de error producido

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

# mysqli::ssl_set

# mysqli_ssl_set

(PHP 5, PHP 7, PHP 8)

mysqli::ssl_set -- mysqli_ssl_set — Utilizada para establecer una conexión segura con SSL

### Descripción

Estilo orientado a objetos

public **mysqli::ssl_set**(
    [?](#language.types.null)[string](#language.types.string) $key,
    [?](#language.types.null)[string](#language.types.string) $certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_path,
    [?](#language.types.null)[string](#language.types.string) $cipher_algos
): [true](#language.types.singleton)

Estilo procedimental

**mysqli_ssl_set**(
    [mysqli](#class.mysqli) $mysql,
    [?](#language.types.null)[string](#language.types.string) $key,
    [?](#language.types.null)[string](#language.types.string) $certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_certificate,
    [?](#language.types.null)[string](#language.types.string) $ca_path,
    [?](#language.types.null)[string](#language.types.string) $cipher_algos
): [true](#language.types.singleton)

Utilizada para establecer una conexión segura con SSL. Debe ser llamada
antes de [mysqli_real_connect()](#mysqli.real-connect). Esta función no hace
nada si el soporte OpenSSL no está activado.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     key


       La ruta hacia el fichero que contiene la clave.






     certificate


       La ruta hacia el fichero que contiene el certificado.






     ca_certificate


       La ruta hacia el fichero que contiene la autoridad del certificado.






     ca_path


       La ruta hacia el directorio que contiene los certificados SSL CA en formato PEM.






     cipher_algos


       La lista de cifrados autorizados para ser utilizados en el cifrado SSL.





### Valores devueltos

Retorna siempre **[true](#constant.true)**. Si SSL no está correctamente instalado,
[mysqli_real_connect()](#mysqli.real-connect) retornará un error cuando se intente
una conexión.

### Ver también

    - [mysqli_options()](#mysqli.options) - Define las opciones

    - [mysqli_real_connect()](#mysqli.real-connect) - Establece una conexión con un servidor MySQL

# mysqli::stat

# mysqli_stat

(PHP 5, PHP 7, PHP 8)

mysqli::stat -- mysqli_stat — Obtiene el estado actual del sistema

### Descripción

Estilo orientado a objetos

public **mysqli::stat**(): [string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_stat**([mysqli](#class.mysqli) $mysql): [string](#language.types.string)|[false](#language.types.singleton)

**mysqli_stat()** devuelve un string
que contiene información similar al comando
'mysqladmin status'.
Esto incluye el tiempo de actividad, expresado en segundos y
el número de hilos actuales, el número de comandos, las tablas
recargadas y abiertas.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Un [string](#language.types.string) que describe el estado del servidor. **[false](#constant.false)** es
devuelto si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::stat()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

printf ("Estado del sistema: %s\n", $mysqli-&gt;stat());

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

printf("Estado del sistema: %s\n", mysqli_stat($link));

Los ejemplos anteriores mostrarán:

Estado del sistema: Uptime: 272 Threads: 1 Questions: 5340 Slow queries: 0
Opens: 13 Flush tables: 1 Open tables: 0 Queries per second avg: 19.632
Memory in use: 8496K Max memory used: 8560K

### Ver también

    - [mysqli_get_server_info()](#mysqli.get-server-info) - Devuelve la versión del servidor MySQL

# mysqli::stmt_init

# mysqli_stmt_init

(PHP 5, PHP 7, PHP 8)

mysqli::stmt_init -- mysqli_stmt_init — Inicializa una sentencia MySQL

### Descripción

Estilo orientado a objetos

public **mysqli::stmt_init**(): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_stmt_init**([mysqli](#class.mysqli) $mysql): [mysqli_stmt](#class.mysqli-stmt)|[false](#language.types.singleton)

Asigna e inicializa un objeto de sentencia, para ser utilizado con
[mysqli_stmt_prepare()](#mysqli-stmt.prepare).

**Nota**:

    Todas las llamadas posteriores a las funciones mysqli_stmt_* fallarán,
    si [mysqli_stmt_prepare()](#mysqli-stmt.prepare) es llamada.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve un objeto.

### Ver también

    - [mysqli_stmt_prepare()](#mysqli-stmt.prepare) - Prepara una consulta SQL para su ejecución

# mysqli::store_result

# mysqli_store_result

(PHP 5, PHP 7, PHP 8)

mysqli::store_result -- mysqli_store_result — Transfiere un conjunto de resultados desde la última consulta

### Descripción

Estilo orientado a objetos

public **mysqli::store_result**([int](#language.types.integer) $mode = 0): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_store_result**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $mode = 0): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Transfiere el conjunto de resultados desde la última consulta en la conexión
a la base de datos especificada por el argumento mysql
para su uso con [mysqli_data_seek()](#mysqli-result.data-seek).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

     mode


       La opción que se desea definir. A partir de PHP 8.1, este argumento no tiene ningún efecto.
       Puede tomar uno de los siguientes valores:



        <caption>**Opciones válidas**</caption>



           Nombre
           Descripción






           **[MYSQLI_STORE_RESULT_COPY_DATA](#constant.mysqli-store-result-copy-data)**

            Copia los resultados recuperados de un buffer interno mysqlnd a variables PHP.
            Por omisión, mysqlnd utilizará una referencia lógica para evitar la copia y la
            duplicación de los resultados contenidos en memoria. Para ciertos conjuntos de resultados,
            por ejemplo, los conjuntos de resultados con muchas filas pequeñas, el enfoque
            de copia puede reducir el uso de memoria por las variables PHP que contienen
            los resultados pueden ser liberadas rápidamente (disponible únicamente con mysqlnd)










### Valores devueltos

Retorna un resultado almacenado en forma de objeto o **[false](#constant.false)** si ocurre un error.

**Nota**:

    **mysqli_store_result()** retorna **[false](#constant.false)** en caso de que
    la consulta no retorne un conjunto de resultados (si la consulta es de
    tipo INSERT por ejemplo). Esta función retornará siempre **[false](#constant.false)** si
    el conjunto de resultados no puede ser leído. Se puede saber si hay un
    error utilizando la función [mysqli_error()](#mysqli.error) y mirando si
    retorna un string vacío, o si [mysqli_errno()](#mysqli.errno) retorna
    cero, o bien si [mysqli_field_count()](#mysqli.field-count) retorna un valor
    diferente de cero. Otra razón para que esta función retorne **[false](#constant.false)** es
    que el conjunto de resultados retornado después de una consulta exitosa llamada por
    [mysqli_query()](#mysqli.query) es demasiado largo (la memoria para
    este no puede ser asignada). Si [mysqli_field_count()](#mysqli.field-count)
    retorna un valor diferente de cero, el procesamiento debería producir un conjunto
    de resultados no vacío.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El paso del argumento mode está ahora obsoleto.
       Este argumento no ha tenido ningún efecto desde PHP 8.1.0.



### Ejemplos

Ver la función [mysqli_multi_query()](#mysqli.multi-query).

### Notas

**Nota**:

    Siempre se recomienda liberar la memoria asignada para el resultado utilizando
    la función [mysqli_free_result()](#mysqli-result.free), al transferir grandes
    resultados utilizando la función **mysqli_store_result()**
    esto se vuelve particularmente importante.

### Ver también

    - [mysqli_real_query()](#mysqli.real-query) - Ejecuta una consulta SQL

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli::$thread_id

# mysqli_thread_id

(PHP 5, PHP 7, PHP 8)

mysqli::$thread_id -- mysqli_thread_id — Devuelve el identificador del hilo para la conexión actual

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;thread_id](#mysqli.thread-id);

Estilo procedimental

**mysqli_thread_id**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

La función **mysqli_thread_id()** devuelve el identificador
del hilo de la conexión actual que puede ser terminado posteriormente
utilizando la función [mysqli_kill()](#mysqli.kill). Si la conexión
se pierde y se reconecta con la función
[mysqli_ping()](#mysqli.ping), el identificador del hilo será diferente.
Por lo tanto, se debe recuperar el identificador del hilo únicamente cuando
sea necesario.

**Nota**:

    El identificador del hilo se asigna por conexión. Esto significa que si la conexión
    se interrumpe y luego se restablece, se le asignará un nuevo identificador de hilo.




    Para terminar una consulta en ejecución, se puede utilizar
    el comando SQL KILL QUERY processid.

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

Devuelve el identificador del hilo para la conexión actual.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;thread_id**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

/_ Determina el identificador del hilo _/
$thread_id = $mysqli-&gt;thread_id;

/_ Termina la conexión _/
$mysqli-&gt;kill($thread_id);

/_ Esto debe producir un error _/
if (!$mysqli-&gt;query("CREATE TABLE myCity LIKE City")) {
printf("Error: %s\n", $mysqli-&gt;error);
exit;
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

/_ Determina el identificador del hilo _/
$thread_id = mysqli_thread_id($link);

/_ Termina la conexión _/
mysqli_kill($link, $thread_id);

/_ Esto debe producir un error _/
if (!mysqli_query($link, "CREATE TABLE myCity LIKE City")) {
    printf("Error: %s\n", mysqli_error($link));
exit;
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error: MySQL server has gone away

### Ver también

    - [mysqli_kill()](#mysqli.kill) - Solicita al servidor que finalice un hilo MySQL

# mysqli::thread_safe

# mysqli_thread_safe

(PHP 5, PHP 7, PHP 8)

mysqli::thread_safe -- mysqli_thread_safe — Indica si el soporte de hilos está activado o no

### Descripción

Estilo orientado a objetos

public **mysqli::thread_safe**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_thread_safe**(): [bool](#language.types.boolean)

Indica si la biblioteca cliente está compilada con seguridad para hilos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la biblioteca cliente es thread-safe, **[false](#constant.false)** en caso contrario.

# mysqli::use_result

# mysqli_use_result

(PHP 5, PHP 7, PHP 8)

mysqli::use_result -- mysqli_use_result — Inicializa la recuperación de un conjunto de resultados

### Descripción

Estilo orientado a objetos

public **mysqli::use_result**(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_use_result**([mysqli](#class.mysqli) $mysql): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Se utiliza para inicializar la recuperación de un conjunto de resultados a partir
de la última consulta ejecutada utilizando la función
[mysqli_real_query()](#mysqli.real-query) en la conexión
especificada por el parámetro link.

Esta función o la función [mysqli_store_result()](#mysqli.store-result)
deben ser llamadas antes de que el resultado de una consulta pueda ser
recuperado, y para evitar el fallo de la próxima consulta en la conexión
a la base de datos.

**Nota**:

    La función **mysqli_use_result()** no transfiere
    el conjunto de resultados completo desde la base de datos
    y por lo tanto no se pueden utilizar funciones como
    [mysqli_data_seek()](#mysqli-result.data-seek) para moverse entre los
    registros. Para utilizar esta funcionalidad, se debe
    recuperar el conjunto de resultados utilizando
    [mysqli_store_result()](#mysqli.store-result).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto de resultados no almacenados o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::use_result()**

Estilo orientado a objetos

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query  = "SELECT CURRENT_USER();";
$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";

/_ Ejecución de múltiples consultas _/
if ($mysqli-&gt;multi_query($query)) {
do {
/_ Almacenamiento del primer conjunto de resultados _/
if ($result = $mysqli-&gt;use_result()) {
            while ($row = $result-&gt;fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result-&gt;close();
        }
        /* Visualización de una demarcación */
        if ($mysqli-&gt;more_results()) {
printf("-----------------\n");
}
} while ($mysqli-&gt;next_result());
}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

Estilo procedimental

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query  = "SELECT CURRENT_USER();";
$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";

/_ Ejecución de múltiples consultas _/
if (mysqli_multi_query($link, $query)) {
    do {
        /* Almacenamiento del primer conjunto de resultados */
        if ($result = mysqli_use_result($link)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s\n", $row[0]);
            }
            mysqli_free_result($result);
}
/_ Visualización de una demarcación _/
if (mysqli_more_results($link)) {
            printf("-----------------\n");
        }
    } while (mysqli_next_result($link));
}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

## my_user@localhost

Amersfoort
Maastricht
Dordrecht
Leiden
Haarlemmermeer

### Ver también

    - [mysqli_real_query()](#mysqli.real-query) - Ejecuta una consulta SQL

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

# mysqli::$warning_count

# mysqli_warning_count

(PHP 5, PHP 7, PHP 8)

mysqli::$warning_count -- mysqli_warning_count — Devuelve el número de advertencias generadas por la última consulta ejecutada

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli-&gt;warning_count](#mysqli.warning-count);

Estilo procedimental

**mysqli_warning_count**([mysqli](#class.mysqli) $mysql): [int](#language.types.integer)

Devuelve el número de advertencias generadas por la última consulta ejecutada.

**Nota**:

    Para recuperar los mensajes de advertencia, se puede utilizar el siguiente comando SQL:
    SHOW WARNINGS [LIMIT row_count].

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

### Valores devueltos

El número de advertencias o 0 si no hay ninguna.

### Ejemplos

**Ejemplo #1 Ejemplo con $mysqli-&gt;warning_count**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$mysqli-&gt;query("SELECT 42/0");

if ($mysqli-&gt;warning_count &gt; 0) {
$result = $mysqli-&gt;query("SHOW WARNINGS");
$row = $result-&gt;fetch_row();
printf("%s (%d): %s\n", $row[0], $row[1], $row[2]);
}

?&gt;

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

mysqli_query($link, "SELECT 42/0");

if (mysqli_warning_count($link) &gt; 0) {
    $result = mysqli_query($link, "SHOW WARNINGS");
$row = mysqli_fetch_row($result);
printf("%s (%d): %s\n", $row[0], $row[1], $row[2]);
}
?&gt;

Los ejemplos anteriores mostrarán:

Warning (1365): Division by 0

### Ver también

    - [mysqli_errno()](#mysqli.errno) - Devuelve el último código de error producido

    - [mysqli_error()](#mysqli.error) - Devuelve un string que describe el último error

    - [mysqli_sqlstate()](#mysqli.sqlstate) - Devuelve el error SQLSTATE de la última operación MySQL

## Tabla de contenidos

- [mysqli::$affected_rows](#mysqli.affected-rows) — Devuelve el número de filas afectadas por la última operación MySQL
- [mysqli::autocommit](#mysqli.autocommit) — Activa o desactiva el modo auto-commit
- [mysqli::begin_transaction](#mysqli.begin-transaction) — Inicia una transacción
- [mysqli::change_user](#mysqli.change-user) — Cambia el usuario de la conexión
- [mysqli::character_set_name](#mysqli.character-set-name) — Devuelve el juego de caracteres actual para la conexión
- [mysqli::close](#mysqli.close) — Cierra una conexión
- [mysqli::commit](#mysqli.commit) — Valida la transacción actual
- [mysqli::$connect_errno](#mysqli.connect-errno) — Devuelve el código de error de la última llamada de conexión
- [mysqli::$connect_error](#mysqli.connect-error) — Devuelve una descripción del último error de conexión
- [mysqli::\_\_construct](#mysqli.construct) — Abre una conexión a un servidor MySQL
- [mysqli::debug](#mysqli.debug) — Realiza acciones de depuración
- [mysqli::dump_debug_info](#mysqli.dump-debug-info) — Escribe la información de depuración en los registros
- [mysqli::$errno](#mysqli.errno) — Devuelve el último código de error producido
- [mysqli::$error](#mysqli.error) — Devuelve un string que describe el último error
- [mysqli::$error_list](#mysqli.error-list) — Devuelve una lista de errores desde el último comando ejecutado
- [mysqli::execute_query](#mysqli.execute-query) — Prepara, vincula los parámetros y ejecuta una sentencia SQL
- [mysqli::$field_count](#mysqli.field-count) — Devuelve el número de columnas para la última consulta
- [mysqli::get_charset](#mysqli.get-charset) — Devuelve un objeto que representa el juego de caracteres
- [mysqli::$client_info](#mysqli.get-client-info) — Obtiene información sobre el cliente MySQL
- [mysqli::$client_version](#mysqli.get-client-version) — Devuelve la versión del cliente MySQL como un entero
- [mysqli::get_connection_stats](#mysqli.get-connection-stats) — Devuelve estadísticas sobre la conexión
- [mysqli::$host_info](#mysqli.get-host-info) — Devuelve un string que contiene el tipo de conexión utilizada
- [mysqli::$protocol_version](#mysqli.get-proto-info) — Devuelve la versión del protocolo MySQL utilizado
- [mysqli::$server_info](#mysqli.get-server-info) — Devuelve la versión del servidor MySQL
- [mysqli::$server_version](#mysqli.get-server-version) — Devuelve un integer que representa la versión del servidor MySQL
- [mysqli::get_warnings](#mysqli.get-warnings) — Lee el resultado de SHOW WARNINGS
- [mysqli::$info](#mysqli.info) — Devuelve información acerca de la última consulta ejecutada
- [mysqli::init](#mysqli.init) — Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()
- [mysqli::$insert_id](#mysqli.insert-id) — Devuelve el valor generado para una columna AUTO_INCREMENT por la última consulta
- [mysqli::kill](#mysqli.kill) — Solicita al servidor que finalice un hilo MySQL
- [mysqli::more_results](#mysqli.more-results) — Comprueba si hay más conjuntos de resultados MySQL disponibles
- [mysqli::multi_query](#mysqli.multi-query) — Ejecuta una o varias consultas en la base de datos
- [mysqli::next_result](#mysqli.next-result) — Prepara el siguiente resultado de una consulta múltiple
- [mysqli::options](#mysqli.options) — Define las opciones
- [mysqli::ping](#mysqli.ping) — Verifica la conexión al servidor y reconecta si ya no existe
- [mysqli::poll](#mysqli.poll) — Verifica el estado de la conexión
- [mysqli::prepare](#mysqli.prepare) — Prepara una consulta SQL para su ejecución
- [mysqli::query](#mysqli.query) — Ejecuta una consulta en la base de datos
- [mysqli::real_connect](#mysqli.real-connect) — Establece una conexión con un servidor MySQL
- [mysqli::real_escape_string](#mysqli.real-escape-string) — Protege los caracteres especiales de un string para su uso en una consulta SQL, teniendo en cuenta el juego de caracteres actual de la conexión
- [mysqli::real_query](#mysqli.real-query) — Ejecuta una consulta SQL
- [mysqli::reap_async_query](#mysqli.reap-async-query) — Lee un resultado para una consulta asíncrona
- [mysqli::refresh](#mysqli.refresh) — Actualiza
- [mysqli::release_savepoint](#mysqli.release-savepoint) — Elimina el punto de guardado nombrado del conjunto de puntos de guardado de la transacción actual
- [mysqli::rollback](#mysqli.rollback) — Revierte la transacción actual
- [mysqli::savepoint](#mysqli.savepoint) — Establece un punto de guardado nombrado de la transacción
- [mysqli::select_db](#mysqli.select-db) — Selecciona una base de datos por defecto para las consultas
- [mysqli::set_charset](#mysqli.set-charset) — Define el juego de caracteres del cliente
- [mysqli::$sqlstate](#mysqli.sqlstate) — Devuelve el error SQLSTATE de la última operación MySQL
- [mysqli::ssl_set](#mysqli.ssl-set) — Utilizada para establecer una conexión segura con SSL
- [mysqli::stat](#mysqli.stat) — Obtiene el estado actual del sistema
- [mysqli::stmt_init](#mysqli.stmt-init) — Inicializa una sentencia MySQL
- [mysqli::store_result](#mysqli.store-result) — Transfiere un conjunto de resultados desde la última consulta
- [mysqli::$thread_id](#mysqli.thread-id) — Devuelve el identificador del hilo para la conexión actual
- [mysqli::thread_safe](#mysqli.thread-safe) — Indica si el soporte de hilos está activado o no
- [mysqli::use_result](#mysqli.use-result) — Inicializa la recuperación de un conjunto de resultados
- [mysqli::$warning_count](#mysqli.warning-count) — Devuelve el número de advertencias generadas por la última consulta ejecutada

# La clase mysqli_stmt

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa una consulta preparada.

## Sinopsis de la Clase

     class **mysqli_stmt**
     {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$affected_rows](#mysqli-stmt.affected-rows);

    public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$insert_id](#mysqli-stmt.insert-id);

    public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$num_rows](#mysqli-stmt.num-rows);

    public
     readonly
     [int](#language.types.integer)
      [$param_count](#mysqli-stmt.param-count);

    public
     readonly
     [int](#language.types.integer)
      [$field_count](#mysqli-stmt.field-count);

    public
     readonly
     [int](#language.types.integer)
      [$errno](#mysqli-stmt.errno);

    public
     readonly
     [string](#language.types.string)
      [$error](#mysqli-stmt.error);

    public
     readonly
     [array](#language.types.array)
      [$error_list](#mysqli-stmt.error-list);

    public
     readonly
     [string](#language.types.string)
      [$sqlstate](#mysqli-stmt.sqlstate);

    public
     [int](#language.types.integer)
      [$id](#mysqli-stmt.props.id);


    /* Métodos */

public [\_\_construct](#mysqli-stmt.construct)([mysqli](#class.mysqli) $mysql, [?](#language.types.null)[string](#language.types.string) $query = **[null](#constant.null)**)

    public [attr_get](#mysqli-stmt.attr-get)([int](#language.types.integer) $attribute): [int](#language.types.integer)

public [attr_set](#mysqli-stmt.attr-set)([int](#language.types.integer) $attribute, [int](#language.types.integer) $value): [bool](#language.types.boolean)
public [bind_param](#mysqli-stmt.bind-param)([string](#language.types.string) $types, [mixed](#language.types.mixed) &amp;$var, [mixed](#language.types.mixed) &amp;...$vars): [bool](#language.types.boolean)
public [bind_result](#mysqli-stmt.bind-result)([mixed](#language.types.mixed) &amp;$var, [mixed](#language.types.mixed) &amp;...$vars): [bool](#language.types.boolean)
public [close](#mysqli-stmt.close)(): [true](#language.types.singleton)
public [data_seek](#mysqli-stmt.data-seek)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [execute](#mysqli-stmt.execute)([?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [bool](#language.types.boolean)
public [fetch](#mysqli-stmt.fetch)(): [?](#language.types.null)[bool](#language.types.boolean)
public [free_result](#mysqli-stmt.free-result)(): [void](language.types.void.html)
public [get_result](#mysqli-stmt.get-result)(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)
public [get_warnings](#mysqli-stmt.get-warnings)(): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)
public [more_results](#mysqli-stmt.more-results)(): [bool](#language.types.boolean)
public [next_result](#mysqli-stmt.next-result)(): [bool](#language.types.boolean)
public [num_rows](#mysqli-stmt.num-rows)(): [int](#language.types.integer)|[string](#language.types.string)
public [prepare](#mysqli-stmt.prepare)([string](#language.types.string) $query): [mixed](#language.types.mixed)
public [reset](#mysqli-stmt.reset)(): [bool](#language.types.boolean)
public [result_metadata](#mysqli-stmt.result-metadata)(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)
public [send_long_data](#mysqli-stmt.send-long-data)([int](#language.types.integer) $param_num, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [store_result](#mysqli-stmt.store-result)(): [bool](#language.types.boolean)

}

## Propiedades

      id



       Almacena el ID de la sentencia.





# mysqli_stmt::$affected_rows

# mysqli_stmt_affected_rows

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$affected_rows -- mysqli_stmt_affected_rows — Devuelve el número total de filas modificadas, eliminadas, insertadas o coincidentes por la última consulta

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli_stmt-&gt;affected_rows](#mysqli-stmt.affected-rows);

Estilo procedimental

**mysqli_stmt_affected_rows**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el número de filas afectadas por una consulta
INSERT, UPDATE
o DELETE.

Funciona como [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows) para
las consultas SELECT.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Un entero mayor que cero indica el número de filas afectadas o recuperadas.
Cero indica que ningún registro fue modificado por una consulta de tipo
UPDATE, ninguna fila coincide con la cláusula
WHERE en la consulta o que ninguna consulta
fue ejecutada. -1 indica que la consulta devolvió
un error o que, para una consulta SELECT,
**mysqli_stmt_affected_rows()** fue llamado antes de llamar
[mysqli_stmt_store_result()](#mysqli-stmt.store-result).

**Nota**:

    Si el número de filas afectadas es mayor que el valor máximo
    (**[PHP_INT_MAX](#constant.php-int-max)**) que puede tomar un entero, el número
    de filas afectadas será devuelto como una cadena de caracteres.

### Ejemplos

**Ejemplo #1 Ejemplo de mysqli_stmt_affected_rows()**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Creación de una tabla temporal _/
$mysqli-&gt;query("CREATE TEMPORARY TABLE myCountry LIKE Country");

$query = "INSERT INTO myCountry SELECT \* FROM Country WHERE Code LIKE ?";

/_ Preparación de la consulta _/
$stmt = $mysqli-&gt;prepare($query);

/_ Vincula una variable a un parámetro ficticio _/
$code = 'A%';
$stmt-&gt;bind_param("s", $code);

/_ Ejecución de la consulta _/
$stmt-&gt;execute();

printf("Filas insertadas: %d\n", $stmt-&gt;affected_rows);
?&gt;

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Creación de una tabla temporal _/
mysqli_query($link, "CREATE TEMPORARY TABLE myCountry LIKE Country");

$query = "INSERT INTO myCountry SELECT \* FROM Country WHERE Code LIKE ?";

/_ Preparación de la consulta _/
$stmt = mysqli_prepare($link, $query);

/_ Vincula una variable a un parámetro ficticio _/
$code = 'A%';
mysqli_stmt_bind_param($stmt, "s", $code);

/_ Ejecución de la consulta _/
mysqli_stmt_execute($stmt);

printf("Filas insertadas: %d\n", mysqli_stmt_affected_rows($stmt));
?&gt;

El ejemplo anterior mostrará:

Filas insertadas: 17

### Ver también

    - [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows) - Devuelve el número de filas recuperadas del servidor

    - [mysqli_stmt_store_result()](#mysqli-stmt.store-result) - Almacena un conjunto de resultados en un búfer interno

# mysqli_stmt::attr_get

# mysqli_stmt_attr_get

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::attr_get -- mysqli_stmt_attr_get — Obtiene el valor actual de un atributo de consulta

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::attr_get**([int](#language.types.integer) $attribute): [int](#language.types.integer)

Estilo procedimental

**mysqli_stmt_attr_get**([mysqli_stmt](#class.mysqli-stmt) $statement, [int](#language.types.integer) $attribute): [int](#language.types.integer)

Obtiene el valor actual de un atributo de consulta.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     attribute


       El atributo que se desea recuperar.





### Valores devueltos

Devuelve el valor del atributo.

# mysqli_stmt::attr_set

# mysqli_stmt_attr_set

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::attr_set -- mysqli_stmt_attr_set — Modifica el comportamiento de una consulta preparada

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::attr_set**([int](#language.types.integer) $attribute, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_attr_set**([mysqli_stmt](#class.mysqli-stmt) $statement, [int](#language.types.integer) $attribute, [int](#language.types.integer) $value): [bool](#language.types.boolean)

Modifica el comportamiento de una consulta preparada. Esta función puede ser
llamada varias veces para definir múltiples atributos.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     attribute


       El atributo que se desea definir. Puede tener uno de los siguientes valores:



        <caption>**Valores de los atributos**</caption>



           Caracteres
           Descripción






           MYSQLI_STMT_ATTR_UPDATE_MAX_LENGTH

            Si se define como **[true](#constant.true)**, la función [mysqli_stmt_store_result()](#mysqli-stmt.store-result)
            actualizará el valor de los metadatos
            MYSQL_FIELD-&gt;max_length.




           MYSQLI_STMT_ATTR_CURSOR_TYPE

            Tipo de cursor que permite abrir la consulta cuando se llama a la
            función [mysqli_stmt_execute()](#mysqli-stmt.execute). value puede ser
            **[MYSQLI_CURSOR_TYPE_NO_CURSOR](#constant.mysqli-cursor-type-no-cursor)** (por omisión) o
            **[MYSQLI_CURSOR_TYPE_READ_ONLY](#constant.mysqli-cursor-type-read-only)**.




           MYSQLI_STMT_ATTR_PREFETCH_ROWS

            Número de filas a recuperar desde el servidor de una sola vez al
            utilizar un cursor. value puede
            estar comprendido entre 1 y el valor máximo de un tipo long sin signo.
            Por omisión, vale 1.
            Eliminado a partir de PHP 8.4.0.









       Si se utiliza la opción **[MYSQLI_STMT_ATTR_CURSOR_TYPE](#constant.mysqli-stmt-attr-cursor-type)**
       con **[MYSQLI_CURSOR_TYPE_READ_ONLY](#constant.mysqli-cursor-type-read-only)**, se abrirá un cursor para la consulta
       al llamar a la función [mysqli_stmt_execute()](#mysqli-stmt.execute). Si ya existe un cursor abierto
       desde una llamada previa a la función [mysqli_stmt_execute()](#mysqli-stmt.execute), se cerrará
       antes de abrir uno nuevo. La función [mysqli_stmt_reset()](#mysqli-stmt.reset) cierra
       asimismo todos los cursores antes de preparar la consulta para una nueva ejecución.
       La función [mysqli_stmt_free_result()](#mysqli-stmt.free-result) cierra cualquier cursor abierto.




       Si se abre un cursor para una consulta preparada, la función
       [mysqli_stmt_store_result()](#mysqli-stmt.store-result) no es necesaria.






     value

      El valor a asignar al atributo.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ver también

    - [» Conector / MySQL mysql_stmt_attr_set()](http://dev.mysql.com/doc/en/mysql-stmt-attr-set.html)

# mysqli_stmt::bind_param

# mysqli_stmt_bind_param

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::bind_param -- mysqli_stmt_bind_param — Vincula variables a una consulta MySQL

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::bind_param**([string](#language.types.string) $types, [mixed](#language.types.mixed) &amp;$var, [mixed](#language.types.mixed) &amp;...$vars): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_bind_param**(
    [mysqli_stmt](#class.mysqli-stmt) $statement,
    [string](#language.types.string) $types,
    [mixed](#language.types.mixed) &amp;$var,
    [mixed](#language.types.mixed) &amp;...$vars
): [bool](#language.types.boolean)

Vincula variables para los marcadores de parámetro en la consulta preparada
por [mysqli_prepare()](#mysqli.prepare) o [mysqli_stmt_prepare()](#mysqli-stmt.prepare).

**Nota**:

    Si el tamaño de los datos supera el tamaño máximo de un paquete,
    (max_allowed_packet), se debe especificar
    el carácter b en el parámetro
    types y utilizar la función
    [mysqli_stmt_send_long_data()](#mysqli-stmt.send-long-data) para enviar el
    mensaje por paquetes.

**Nota**:

    Se debe tener precaución al utilizar
    **mysqli_stmt_bind_param()** con la función
    [call_user_func_array()](#function.call-user-func-array). Tenga en cuenta que
    **mysqli_stmt_bind_param()** requiere que sus parámetros
    sean pasados por referencia, mientras que la función
    [call_user_func_array()](#function.call-user-func-array) puede aceptar como parámetro
    una lista de variables que pueden representar referencias o valores.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     types


       Una [string](#language.types.string) que contiene uno o más caracteres
       que especifican el tipo de la variable a vincular:



        <caption>**Carácter de especificación de tipos**</caption>



           Carácter
           Descripción






           i
           corresponde a una variable de tipo [int](#language.types.integer)



           d
           corresponde a una variable de tipo [float](#language.types.float)



           s
           corresponde a una variable de tipo [string](#language.types.string)



           b
           corresponde a una variable de tipo BLOB, que será enviada por paquetes










     var
     vars


       El número de variables y la longitud de la [string](#language.types.string)
       types deben corresponder
       a los parámetros de la consulta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli_stmt::bind_param()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'world');

$stmt = $mysqli-&gt;prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
$stmt-&gt;bind_param('sssd', $code, $language, $official, $percent);

$code = 'DEU';
$language = 'Bavarian';
$official = "F";
$percent = 11.2;

$stmt-&gt;execute();

printf("%d fila insertada.\n", $stmt-&gt;affected_rows);

/_ Limpiar tabla CountryLanguage _/
$mysqli-&gt;query("DELETE FROM CountryLanguage WHERE Language='Bavarian'");
printf("%d fila eliminada.\n", $mysqli-&gt;affected_rows);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect('localhost', 'my_user', 'my_password', 'world');

$stmt = mysqli_prepare($link, "INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);

$code = 'DEU';
$language = 'Bavarian';
$official = "F";
$percent = 11.2;

mysqli_stmt_execute($stmt);

printf("%d fila insertada.\n", mysqli_stmt_affected_rows($stmt));

/_ Limpiar tabla CountryLanguage _/
mysqli_query($link, "DELETE FROM CountryLanguage WHERE Language='Bavarian'");
printf("%d fila eliminada.\n", mysqli_affected_rows($link));

Los ejemplos anteriores mostrarán:

1 fila insertada.
1 fila eliminada.

**Ejemplo #2 Uso de ... para proporcionar argumentos**

    El operador ... puede ser utilizado para proporcionar una lista de argumentos de longitud variable,
    por ejemplo, en una cláusula WHERE IN.

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'world');

$stmt = $mysqli-&gt;prepare("SELECT Language FROM CountryLanguage WHERE CountryCode IN (?, ?)");
/* Usando ... para proporcionar argumentos */
$stmt-&gt;bind_param('ss', ...['DEU', 'POL']);
$stmt-&gt;execute();
$stmt-&gt;store_result();

printf("%d filas encontradas.\n", $stmt-&gt;num_rows());

Los ejemplos anteriores mostrarán:

10 filas encontradas.

### Ver también

    - [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result) - Vincula variables a un conjunto de resultados

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_send_long_data()](#mysqli-stmt.send-long-data) - Envía datos MySQL por paquetes

    - [mysqli_stmt_errno()](#mysqli-stmt.errno) - Devuelve un código de error para la última consulta

    - [mysqli_stmt_error()](#mysqli-stmt.error) - Devuelve una descripción del último error de procesamiento

# mysqli_stmt::bind_result

# mysqli_stmt_bind_result

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::bind_result -- mysqli_stmt_bind_result — Vincula variables a un conjunto de resultados

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::bind_result**([mixed](#language.types.mixed) &amp;$var, [mixed](#language.types.mixed) &amp;...$vars): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_bind_result**([mysqli_stmt](#class.mysqli-stmt) $statement, [mixed](#language.types.mixed) &amp;$var, [mixed](#language.types.mixed) &amp;...$vars): [bool](#language.types.boolean)

Asocia columnas de un resultado a variables.

Cuando se llama a [mysqli_stmt_fetch()](#mysqli-stmt.fetch) para leer valores, el protocolo MySQL coloca los datos en las variables especificadas var/vars.

Una columna puede ser vinculada en cualquier momento, incluso después de que un conjunto de resultados haya sido parcialmente recuperado. La nueva vinculación entra en vigor la próxima vez que se llame a [mysqli_stmt_fetch()](#mysqli-stmt.fetch).

**Nota**:

    Todas las columnas deben ser vinculadas después de la ejecución de la función [mysqli_stmt_execute()](#mysqli-stmt.execute) y antes de la llamada a la función [mysqli_stmt_fetch()](#mysqli-stmt.fetch). Dependiendo del tipo de valor de la columna, el tipo de variable PHP puede ser modificado automáticamente.

**Nota**:

    Una columna puede ser asociada o reasociada en cualquier momento, incluso después de una lectura parcial del resultado. La nueva asociación entra en vigor en la próxima llamada a [mysqli_stmt_fetch()](#mysqli-stmt.fetch).

**Sugerencia**

    Esta función es útil para resultados básicos. Para recuperar un conjunto de resultados iterable, o recuperar cada fila como array u objeto, utilice [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     var


       La primera variable a vincular.






     vars


       Variables adicionales a vincular.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Preparación de la consulta _/
$stmt = $mysqli-&gt;prepare("SELECT Code, Name FROM Country ORDER BY Name LIMIT 5");
$stmt-&gt;execute();

/_ Vincular variables a una declaración preparada _/
$stmt-&gt;bind_result($col1, $col2);

/_ Recuperación de los valores _/
while ($stmt-&gt;fetch()) {
printf("%s %s\n", $col1, $col2);
}
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Preparación de la consulta _/
$stmt = mysqli_prepare($link, "SELECT Code, Name FROM Country ORDER BY Name LIMIT 5");
mysqli_stmt_execute($stmt);

/_ Vincular variables a una declaración preparada _/
mysqli_stmt_bind_result($stmt, $col1, $col2);

/_ Recuperación de los valores _/
while (mysqli_stmt_fetch($stmt)) {
printf("%s %s\n", $col1, $col2);
}
?&gt;

El ejemplo anterior mostrará:

AFG Afghanistan
ALB Albania
DZA Algeria
ASM American Samoa
AND Andorra

### Ver también

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_prepare()](#mysqli-stmt.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::close

# mysqli_stmt_close

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::close -- mysqli_stmt_close — Termina una consulta preparada

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::close**(): [true](#language.types.singleton)

Estilo procedimental

**mysqli_stmt_close**([mysqli_stmt](#class.mysqli-stmt) $statement): [true](#language.types.singleton)

Cierra una consulta preparada. **mysqli_stmt_close()**
libera el puntero utilizado por stmt. Si la consulta está
pendiente o los resultados no han sido leídos aún, esta función
los cancelará y, por lo tanto, la siguiente consulta podrá ser ejecutada.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ahora siempre devuelve **[true](#constant.true)**. Anteriormente, devolvía **[false](#constant.false)** en caso de fallo.





### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::\_\_construct

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::\_\_construct — Construye un nuevo objeto [mysqli_stmt](#class.mysqli-stmt)

### Descripción

public **mysqli_stmt::\_\_construct**([mysqli](#class.mysqli) $mysql, [?](#language.types.null)[string](#language.types.string) $query = **[null](#constant.null)**)

Este método construye un nuevo objeto
[mysqli_stmt](#class.mysqli-stmt).

### Parámetros

     link


       Un objeto [mysqli](#class.mysqli) válido.






     query


       La consulta, en forma de string. Si este argumento es **[null](#constant.null)**,
       entonces el constructor se comportará como la función
       [mysqli_stmt_init()](#mysqli.stmt-init); de lo contrario, se comportará como la función [mysqli_prepare()](#mysqli.prepare).





### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       query ahora es nullable.



### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_init()](#mysqli.stmt-init) - Inicializa una sentencia MySQL

# mysqli_stmt::data_seek

# mysqli_stmt_data_seek

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::data_seek -- mysqli_stmt_data_seek — Ajusta el puntero de resultado a una fila arbitraria en el resultado almacenado en el búfer.

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::data_seek**([int](#language.types.integer) $offset): [void](language.types.void.html)

Estilo procedimental

**mysqli_stmt_data_seek**([mysqli_stmt](#class.mysqli-stmt) $statement, [int](#language.types.integer) $offset): [void](language.types.void.html)

Esta función mueve el puntero del conjunto de resultados almacenado en el búfer
a una fila arbitraria especificada por el parámetro offset.

Esta función solo funciona en el conjunto de resultados interno almacenado en el búfer.
[mysqli_stmt_store_result()](#mysqli-stmt.store-result) debe ser llamada
antes de la función **mysqli_stmt_data_seek()**.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     offset


       Debe tomar un valor entre cero y el número total de filas menos 1
       (0..[mysqli_stmt_num_rows()](#mysqli-stmt.num-rows) - 1).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name";
$stmt = $mysqli-&gt;prepare($query);
$stmt-&gt;execute();

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
/_ Abre la conexión _/
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, CountryCode FROM City ORDER BY Name";
if ($stmt = mysqli_prepare($link, $query)) {

    /* Ejecuta la consulta */
    mysqli_stmt_execute($stmt);

    /* Vincula las variables de resultado */
    mysqli_stmt_bind_result($stmt, $name, $code);

    /* Almacena el resultado */
    mysqli_stmt_store_result($stmt);

    $stmt-&gt;bind_result($name, $code);

    $stmt-&gt;store_result();

    /* Lee la fila n°400 */
    $stmt-&gt;data_seek(399);

    /* Cierra la sentencia */
    mysqli_stmt_close($stmt);

}

printf("Ciudad: %s Código de País: %s\n", $name, $code);
?&gt;

El ejemplo anterior mostrará:

Ciudad: Benin City Código de País: NGA

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::$errno

# mysqli_stmt_errno

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$errno -- mysqli_stmt_errno — Devuelve un código de error para la última consulta

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_stmt-&gt;errno](#mysqli-stmt.errno);

Estilo procedimental

**mysqli_stmt_errno**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)

Devuelve el código de error para la última consulta
llamada en el procesamiento que tuvo éxito o falló.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Un valor que representa un código de error. 0 significa que no ocurrió ningún error.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
/_ Abre la conexión _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$mysqli-&gt;query("CREATE TABLE myCountry LIKE Country");
$mysqli-&gt;query("INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = $mysqli-&gt;prepare($query)) {

    /* Borrado de la tabla */
    $mysqli-&gt;query("DROP TABLE myCountry");

    /* Ejecuta la consulta */
    $stmt-&gt;execute();

    printf("Error: %d.\n", $stmt-&gt;errno);

    /* Cierra la sentencia */
    $stmt-&gt;close();

}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
/_ Abre la conexión _/
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

mysqli_query($link, "CREATE TABLE myCountry LIKE Country");
mysqli_query($link, "INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = mysqli_prepare($link, $query)) {

    /* Borrado de la tabla */
    mysqli_query($link, "DROP TABLE myCountry");

    /* Ejecuta la consulta */
    mysqli_stmt_execute($stmt);

    printf("Error: %d.\n", mysqli_stmt_errno($stmt));

    /* Cierra la sentencia */
    mysqli_stmt_close($stmt);

}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error: 1146.

### Ver también

    - [mysqli_stmt_error()](#mysqli-stmt.error) - Devuelve una descripción del último error de procesamiento

    - [mysqli_stmt_sqlstate()](#mysqli-stmt.sqlstate) - Devuelve el código SQLSTATE de la última operación MySQL

# mysqli_stmt::$error

# mysqli_stmt_error

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$error -- mysqli_stmt_error — Devuelve una descripción del último error de procesamiento

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli_stmt-&gt;error](#mysqli-stmt.error);

Estilo procedimental

**mysqli_stmt_error**([mysqli_stmt](#class.mysqli-stmt) $statement): [string](#language.types.string)

Devuelve un string que representa el mensaje de error más reciente
llamado por una función de procesamiento, haya tenido éxito o no.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Un [string](#language.types.string) que describe el error. Una cadena vacía si no ha ocurrido ningún error.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
/_ Abre la conexión _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$mysqli-&gt;query("CREATE TABLE myCountry LIKE Country");
$mysqli-&gt;query("INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = $mysqli-&gt;prepare($query)) {

    /* Borrado de la tabla */
    $mysqli-&gt;query("DROP TABLE myCountry");

    /* Ejecuta la consulta */
    $stmt-&gt;execute();

    printf("Error: %s.\n", $stmt-&gt;error);

    /* Cierra la sentencia */
    $stmt-&gt;close();

}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
/_ Abre la conexión _/
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

mysqli_query($link, "CREATE TABLE myCountry LIKE Country");
mysqli_query($link, "INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = mysqli_prepare($link, $query)) {

    /* Borrado de la tabla */
    mysqli_query($link, "DROP TABLE myCountry");

    /* Ejecuta la consulta */
    mysqli_stmt_execute($stmt);

    printf("Error: %s.\n", mysqli_stmt_error($stmt));

    /* Cierra la sentencia */
    mysqli_stmt_close($stmt);

}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error: Table 'world.myCountry' doesn't exist.

### Ver también

    - [mysqli_stmt_errno()](#mysqli-stmt.errno) - Devuelve un código de error para la última consulta

    - [mysqli_stmt_sqlstate()](#mysqli-stmt.sqlstate) - Devuelve el código SQLSTATE de la última operación MySQL

# mysqli_stmt::$error_list

# mysqli_stmt_error_list

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

mysqli_stmt::$error_list -- mysqli_stmt_error_list — Devuelve una lista de errores para la última consulta ejecutada

### Descripción

Estilo orientado a objetos

[array](#language.types.array) [$mysqli_stmt-&gt;error_list](#mysqli-stmt.error-list);

Estilo procedimental

**mysqli_stmt_error_list**([mysqli_stmt](#class.mysqli-stmt) $statement): [array](#language.types.array)

Devuelve un array de errores desde la última consulta ejecutada,
haya tenido éxito o no.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Una lista de errores, cada uno en forma de array asociativo
que contiene el número de error (errno), el mensaje de error (error) y el
estado SQL (sqlstate).

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
/_ Abre una conexión _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo al conectar: %s\n", mysqli_connect_error());
exit();
}

$mysqli-&gt;query("CREATE TABLE myCountry LIKE Country");
$mysqli-&gt;query("INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = $mysqli-&gt;prepare($query)) {

    /* Elimina la tabla */
    $mysqli-&gt;query("DROP TABLE myCountry");

    /* Ejecuta la consulta */
    $stmt-&gt;execute();

    echo "Error:\n";
    print_r($stmt-&gt;error_list);

    /* Cierra la consulta */
    $stmt-&gt;close();

}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
/_ Abre una conexión _/
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo al conectar: %s\n", mysqli_connect_error());
exit();
}

mysqli_query($link, "CREATE TABLE myCountry LIKE Country");
mysqli_query($link, "INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = mysqli_prepare($link, $query)) {

    /* Elimina la tabla */
    mysqli_query($link, "DROP TABLE myCountry");

    /* Ejecuta la consulta */
    mysqli_stmt_execute($stmt);

    echo "Error:\n";
    print_r(mysqli_stmt_error_list($stmt));

    /* Cierra la consulta */
    mysqli_stmt_close($stmt);

}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error:
Array
(
[0] =&gt; Array
(
[errno] =&gt; 1146
[sqlstate] =&gt; 42S02
[error] =&gt; Table 'world.myCountry' doesn't exist
)

)

### Ver también

    - [mysqli_stmt_error()](#mysqli-stmt.error) - Devuelve una descripción del último error de procesamiento

    - [mysqli_stmt_errno()](#mysqli-stmt.errno) - Devuelve un código de error para la última consulta

    - [mysqli_stmt_sqlstate()](#mysqli-stmt.sqlstate) - Devuelve el código SQLSTATE de la última operación MySQL

# mysqli_stmt::execute

# mysqli_stmt_execute

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::execute -- mysqli_stmt_execute — Ejecuta una consulta preparada

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::execute**([?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_execute**([mysqli_stmt](#class.mysqli-stmt) $statement, [?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [bool](#language.types.boolean)

Ejecuta una consulta que ha sido previamente preparada utilizando la
función [mysqli_prepare()](#mysqli.prepare), gracias al recurso
stmt. Durante la ejecución, todas las
variables de la consulta serán reemplazadas por los datos apropiados.

Si la consulta es UPDATE, DELETE,
o INSERT, el número total de filas afectadas está
disponible a través de la función [mysqli_stmt_affected_rows()](#mysqli-stmt.affected-rows).
Si la consulta produce un conjunto de resultados, puede ser recuperado utilizando
la función [mysqli_stmt_get_result()](#mysqli-stmt.get-result) o recuperándolo línea
por línea directamente desde la instrucción utilizando
la función [mysqli_stmt_fetch()](#mysqli-stmt.fetch).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     params


       Una lista opcional, como [array](#language.types.array), con tantos elementos como parámetros enlazados
       haya en la instrucción SQL en curso de ejecución. Cada valor es tratado como una [string](#language.types.string).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El parámetro opcional params ha sido añadido.



### Ejemplos

**Ejemplo #1 Ejecutar una instrucción preparada con variables enlazadas**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$mysqli-&gt;query("CREATE TEMPORARY TABLE myCity LIKE City");

/_ Preparación de la consulta _/
$stmt = $mysqli-&gt;prepare("INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)");

/_ Enlazar las variables a los parámetros _/
$stmt-&gt;bind_param("sss", $val1, $val2, $val3);
$val1 = 'Stuttgart';
$val2 = 'DEU';
$val3 = 'Baden-Wuerttemberg';

/_ Ejecutar la instrucción _/
$stmt-&gt;execute();
$val1 = 'Bordeaux';
$val2 = 'FRA';
$val3 = 'Aquitaine';

/_ Ejecutar la instrucción _/
$stmt-&gt;execute();

/_ Recuperación de todas las líneas de myCity _/
$query = "SELECT Name, CountryCode, District FROM myCity";
$result = $mysqli-&gt;query($query);
while ($row = $result-&gt;fetch_row()) {
printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

mysqli_query($link, "CREATE TEMPORARY TABLE myCity LIKE City");

/_ Preparación de la consulta _/
$stmt = mysqli_prepare($link, "INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)");

/_ Enlazar las variables a los parámetros _/
mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);
$val1 = 'Stuttgart';
$val2 = 'DEU';
$val3 = 'Baden-Wuerttemberg';

/_ Ejecutar la instrucción _/
mysqli_stmt_execute($stmt);
$val1 = 'Bordeaux';
$val2 = 'FRA';
$val3 = 'Aquitaine';

/_ Ejecutar la instrucción _/
mysqli_stmt_execute($stmt);

/_ Recuperación de todas las líneas de myCity _/
$query = "SELECT Name, CountryCode, District FROM myCity";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_row($result)) {
printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
}

Los ejemplos anteriores mostrarán:

Stuttgart (DEU,Baden-Wuerttemberg)
Bordeaux (FRA,Aquitaine)

**Ejemplo #2 Ejecutar una instrucción preparada con un array de valores**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'world');

$mysqli-&gt;query('CREATE TEMPORARY TABLE myCity LIKE City');

/_ Preparación de la consulta _/
$stmt = $mysqli-&gt;prepare('INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)');

/_ Ejecutar la instrucción _/
$stmt-&gt;execute(['Stuttgart', 'DEU', 'Baden-Wuerttemberg']);

/_ Recuperación de todas las líneas de myCity _/
$query = 'SELECT Name, CountryCode, District FROM myCity';
$result = $mysqli-&gt;query($query);
while ($row = $result-&gt;fetch_row()) {
printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect('localhost', 'my_user', 'my_password', 'world');

mysqli_query($link, 'CREATE TEMPORARY TABLE myCity LIKE City');

/_ Preparación de la consulta _/
$stmt = mysqli_prepare($link, 'INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)');

/_ Ejecutar la instrucción _/
mysqli_stmt_execute($stmt, ['Stuttgart', 'DEU', 'Baden-Wuerttemberg']);

/_ Recuperación de todas las líneas de myCity _/
$query = 'SELECT Name, CountryCode, District FROM myCity';
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_row($result)) {
printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
}

Los ejemplos anteriores mostrarán:

Stuttgart (DEU,Baden-Wuerttemberg)

### Ver también

    - [mysqli_execute_query()](#mysqli.execute-query) - Prepara, vincula los parámetros y ejecuta una sentencia SQL

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

# mysqli_stmt::fetch

# mysqli_stmt_fetch

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::fetch -- mysqli_stmt_fetch — Lee los resultados de una consulta MySQL preparada en variables vinculadas

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::fetch**(): [?](#language.types.null)[bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_fetch**([mysqli_stmt](#class.mysqli-stmt) $statement): [?](#language.types.null)[bool](#language.types.boolean)

Devuelve el resultado de una consulta preparada en una variable, vinculada por
[mysqli_stmt_bind_result()](#mysqli-stmt.bind-result).

**Nota**:

    Tenga en cuenta que todas las columnas deben ser vinculadas por la aplicación
    antes de llamar a **mysqli_stmt_fetch()**.

**Nota**:

    Los datos se transfieren sin ser almacenados en búfer, sin llamar a la
    función [mysqli_stmt_store_result()](#mysqli-stmt.store-result), lo que
    puede tener un impacto en el rendimiento (pero también, reducir
    el uso de memoria).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

   <caption>**Valores devueltos**</caption>
   
    
     
      Valor
      Descripción


      **[true](#constant.true)**
      Éxito. Los datos han sido leídos.



      **[false](#constant.false)**
      Se ha producido un error.



      **[null](#constant.null)**
      No hay más líneas para leer o los datos han sido truncados.


### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 150,5";

if ($stmt = $mysqli-&gt;prepare($query)) {

    /* Ejecución de la consulta */
    $stmt-&gt;execute();

    /* Vinculación de las variables de resultado */
    $stmt-&gt;bind_result($name, $code);

    /* Lectura de los valores */
    while ($stmt-&gt;fetch()) {
        printf ("%s (%s)\n", $name, $code);
    }

    /* Cierre de la sentencia */
    $stmt-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 150,5";

if ($stmt = mysqli_prepare($link, $query)) {

    /* Ejecución de la consulta */
    mysqli_stmt_execute($stmt);

    /* Vinculación de las variables de resultado */
    mysqli_stmt_bind_result($stmt, $name, $code);

    /* Lectura de los valores */
    while (mysqli_stmt_fetch($stmt)) {
        printf ("%s (%s)\n", $name, $code);
    }

    /* Cierre de la sentencia */
    mysqli_stmt_close($stmt);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Rockford (USA)
Tallahassee (USA)
Salinas (USA)
Santa Clarita (USA)
Springfield (USA)

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_errno()](#mysqli-stmt.errno) - Devuelve un código de error para la última consulta

    - [mysqli_stmt_error()](#mysqli-stmt.error) - Devuelve una descripción del último error de procesamiento

    - [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result) - Vincula variables a un conjunto de resultados

# mysqli_stmt::$field_count

# mysqli_stmt_field_count

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$field_count -- mysqli_stmt_field_count — Devuelve el número de columnas en la consulta dada

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_stmt-&gt;field_count](#mysqli-stmt.field-count);

Estilo procedimental

**mysqli_stmt_field_count**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)

Devuelve el número de columnas en la declaración preparada.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Devuelve un integer que representa el número de columnas.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$code = 'FR';

$stmt = $mysqli-&gt;prepare("SELECT Name FROM Country WHERE Code=?");
$stmt-&gt;bind_param('s', $code);
$stmt-&gt;execute();
$row = $stmt-&gt;get_result()-&gt;fetch_row();
for ($i = 0; $i &lt; $stmt-&gt;field_count; $i++) {
    printf("Value of column number %d is %s", $i, $row[$i]);
}

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$code = 'FR';

$stmt = mysqli_prepare($mysqli, "SELECT Name FROM Country WHERE Code=?");
mysqli_stmt_bind_param($stmt, 's', $code);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_row($result);
for ($i = 0; $i &lt; mysqli_stmt_field_count($stmt); $i++) {
    printf("Value of column number %d is %s", $i, $row[$i]);
}

Los ejemplos anteriores mostrarán algo similar a:

Value of column number 0 is France

### Ver también

    - [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows) - Devuelve el número de filas recuperadas del servidor

# mysqli_stmt::free_result

# mysqli_stmt_free_result

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::free_result -- mysqli_stmt_free_result — Libera el resultado MySQL de la memoria

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::free_result**(): [void](language.types.void.html)

Estilo procedimental

**mysqli_stmt_free_result**([mysqli_stmt](#class.mysqli-stmt) $statement): [void](language.types.void.html)

Libera el resultado stmt de la memoria.
stmt ha sido obtenido de la función
[mysqli_stmt_store_result()](#mysqli-stmt.store-result).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [mysqli_stmt_store_result()](#mysqli-stmt.store-result) - Almacena un conjunto de resultados en un búfer interno

# mysqli_stmt::get_result

# mysqli_stmt_get_result

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli_stmt::get_result -- mysqli_stmt_get_result — Obtiene un conjunto de resultados desde una consulta preparada como un objeto [mysqli_result](#class.mysqli-result)

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::get_result**(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_stmt_get_result**([mysqli_stmt](#class.mysqli-stmt) $statement): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Obtiene un conjunto de resultados de una declaración preparada en forma
de un objeto [mysqli_result](#class.mysqli-result).
Los datos serán recuperados desde el servidor MySQL hacia PHP.
Este método solo debe ser llamado para las consultas que producen un conjunto de resultados.

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

**Nota**:

    Esta función no puede ser utilizada conjuntamente con
    la [mysqli_stmt_store_result()](#mysqli-stmt.store-result).
    Estas dos funciones recuperan el conjunto de resultados completo del servidor MySQL.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Retorna un conjunto de resultados para consultas SELECT exitosas, o **[false](#constant.false)** para
otras consultas DML o en caso de fallo. La función [mysqli_errno()](#mysqli.errno)
puede ser utilizada para distinguir entre estos dos tipos de errores.
Retorna **[false](#constant.false)** en caso de fallo. Para consultas exitosas que producen
un conjunto de resultados como SELECT, SHOW, DESCRIBE o
EXPLAIN, **mysqli_stmt_get_result()**
retornará un objeto [mysqli_result](#class.mysqli-result). Para otros tipos de
consultas exitosas, **mysqli_stmt_get_result()** retornará **[false](#constant.false)**.
La función [mysqli_stmt_errno()](#mysqli-stmt.errno) puede ser utilizada para
distinguir entre las dos razones para **[false](#constant.false)** ; debido a un error,
anterior a PHP 7.4.13, [mysqli_errno()](#mysqli.errno) debía ser
utilizada para determinar esto.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, Population, Continent FROM Country WHERE Continent=? ORDER BY Name LIMIT 1";

$stmt = $mysqli-&gt;prepare($query);
$stmt-&gt;bind_param("s", $continent);

$continentList = array('Europe', 'Africa', 'Asia', 'North America');

foreach ($continentList as $continent) {
    $stmt-&gt;execute();
    $result = $stmt-&gt;get_result();
    while ($row = $result-&gt;fetch_array(MYSQLI_NUM)) {
        foreach ($row as $r) {
            print "$r ";
}
print "\n";
}
}
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, Population, Continent FROM Country WHERE Continent=? ORDER BY Name LIMIT 1";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $continent);

$continentList= array('Europe', 'Africa', 'Asia', 'North America');

foreach ($continentList as $continent) {
    mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
foreach ($row as $r) {
            print "$r ";
}
print "\n";
}
}
?&gt;

Los ejemplos anteriores mostrarán algo similar a:

Albania 3401200 Europe
Algeria 31471000 Africa
Afghanistan 22720000 Asia
Anguilla 8000 North America

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_result_metadata()](#mysqli-stmt.result-metadata) - Devuelve las metadatos de preparación de consulta MySQL

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_stmt_store_result()](#mysqli-stmt.store-result) - Almacena un conjunto de resultados en un búfer interno

# mysqli_stmt::get_warnings

# mysqli_stmt_get_warnings

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

mysqli_stmt::get_warnings -- mysqli_stmt_get_warnings — Obtiene el resultado de SHOW WARNINGS

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::get_warnings**(): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_stmt_get_warnings**([mysqli_stmt](#class.mysqli-stmt) $statement): [mysqli_warning](#class.mysqli-warning)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# mysqli_stmt::$insert_id

# mysqli_stmt_insert_id

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$insert_id -- mysqli_stmt_insert_id — Obtiene el ID generado por la última consulta INSERT

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli_stmt-&gt;insert_id](#mysqli-stmt.insert-id);

Estilo procedimental

**mysqli_stmt_insert_id**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)|[string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# mysqli_stmt::more_results

# mysqli_stmt_more_results

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli_stmt::more_results -- mysqli_stmt_more_results — Comprueba si hay más resultados desde una consulta múltiple

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::more_results**(): [bool](#language.types.boolean)

Estilo procedimental:

**mysqli_stmt_more_results**(mysql_stmt $statement): [bool](#language.types.boolean)

Comprueba si hay más resultados desde una consulta múltiple.

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Devuelve **[true](#constant.true)** si hay más resultados, **[false](#constant.false)** en caso contrario.

### Ver también

    - [mysqli_stmt::next_result()](#mysqli-stmt.next-result) - Lee el resultado siguiente desde una consulta múltiple

    - [mysqli::multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

# mysqli_stmt::next_result

# mysqli_stmt_next_result

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli_stmt::next_result -- mysqli_stmt_next_result — Lee el resultado siguiente desde una consulta múltiple

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::next_result**(): [bool](#language.types.boolean)

Estilo procedimental:

**mysqli_stmt_next_result**(mysql_stmt $statement): [bool](#language.types.boolean)

Lee el resultado siguiente desde una consulta múltiple.

**Nota**:

    Anterior a PHP 8.1.0, disponible únicamente con
    [mysqlnd](#book.mysqlnd).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora también disponible al enlazar con libmysqlclient.



### Ver también

    - [mysqli_stmt::more_results()](#mysqli-stmt.more-results) - Comprueba si hay más resultados desde una consulta múltiple

    - [mysqli::multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

# mysqli_stmt::$num_rows

# mysqli_stmt::num_rows

# mysqli_stmt_num_rows

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$num_rows -- mysqli_stmt::num_rows -- mysqli_stmt_num_rows — Devuelve el número de filas recuperadas del servidor

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli_stmt-&gt;num_rows](#mysqli-stmt.num-rows);

public **mysqli_stmt::num_rows**(): [int](#language.types.integer)|[string](#language.types.string)

Estilo procedimental

**mysqli_stmt_num_rows**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el número de filas almacenadas en el búfer en la instrucción.
Esta función solo funcionará después de llamar a [mysqli_stmt_store_result()](#mysqli-stmt.store-result)
para almacenar en el búfer el conjunto completo de resultados en el gestor de la instrucción.

Esta función devuelve 0 a menos que todas
las filas hayan sido recuperadas del servidor.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Un [int](#language.types.integer) que representa el número de filas almacenadas en el búfer.
Devuelve 0 en modo no almacenado en búfer, excepto si todas las filas han sido recuperadas del servidor.

**Nota**:

Si el número de filas es mayor que **[PHP_INT_MAX](#constant.php-int-max)**,
el número será devuelto como un [string](#language.types.string).

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name LIMIT 20";

$stmt = $mysqli-&gt;prepare($query);
$stmt-&gt;execute();

/_ Almacenar el resultado en un búfer interno _/
$stmt-&gt;store_result();

printf("Número de filas: %d.\n", $stmt-&gt;num_rows);
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name LIMIT 20";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_execute($stmt);

/_ Almacenar el resultado en un búfer interno _/
mysqli_stmt_store_result($stmt);

printf("Número de filas: %d.\n", mysqli_stmt_num_rows($stmt));
?&gt;

Los ejemplos anteriores mostrarán:

Número de filas: 20.

### Ver también

    - [mysqli_stmt_store_result()](#mysqli-stmt.store-result) - Almacena un conjunto de resultados en un búfer interno

    - [mysqli_stmt_affected_rows()](#mysqli-stmt.affected-rows) - Devuelve el número total de filas modificadas, eliminadas, insertadas o coincidentes por la última consulta

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::$param_count

# mysqli_stmt_param_count

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$param_count -- mysqli_stmt_param_count — Devuelve el número de parámetros de un comando SQL

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_stmt-&gt;param_count](#mysqli-stmt.param-count);

Estilo procedimental

**mysqli_stmt_param_count**([mysqli_stmt](#class.mysqli-stmt) $statement): [int](#language.types.integer)

Devuelve el número de variables esperadas por el comando preparado stmt.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el número de parámetros.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

if ($stmt = $mysqli-&gt;prepare("SELECT Name FROM Country WHERE Name=? OR Code=?")) {

    $marker = $stmt-&gt;param_count;
    printf("La consulta tiene %d variables.\n", $marker);

    /* Cierre del comando */
    $stmt-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

if ($stmt = mysqli_prepare($link, "SELECT Name FROM Country WHERE Name=? OR Code=?")) {

    $marker = mysqli_stmt_param_count($stmt);
    printf("La consulta tiene %d variables.\n", $marker);

    /* Cierre del comando */
    mysqli_stmt_close($stmt);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

La consulta tiene 2 variables.

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::prepare

# mysqli_stmt_prepare

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::prepare -- mysqli_stmt_prepare — Prepara una consulta SQL para su ejecución

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::prepare**([string](#language.types.string) $query): [mixed](#language.types.mixed)

Estilo procedimental

**mysqli_stmt_prepare**([mysqli_stmt](#class.mysqli-stmt) $statement, [string](#language.types.string) $query): [bool](#language.types.boolean)

Prepara la consulta SQL query, para la sesión de trabajo
stmt.

Las variables SQL deben asociarse a una variable PHP mediante la función
[mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) y/o
[mysqli_stmt_bind_result()](#mysqli-stmt.bind-result), antes de ejecutar la consulta.

**Nota**:

    Si se pasa una consulta a **mysqli_stmt_prepare()** que es más larga que
    max_allowed_packet, los códigos de error devueltos serán
    diferentes según si se utiliza MySQL Native Driver (mysqlnd) o
    MySQL Client Library (libmysqlclient). El comportamiento se define como sigue:




    -

      mysqlnd en Linux devuelve un código de error 1153.
      El mensaje de error será got a packet bigger than
      max_allowed_packet bytes.





    -

      mysqlnd en Windows devuelve un código de error 2006.
      El mensaje será del tipo server has gone away.





    -

      libmysqlclient en cualquier plataforma devuelve el código de error
      2006. El mensaje será del tipo server has gone away.


### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     query


       La consulta, en forma de string. Debe consistir en un comando SQL válido y único.




       Este argumento puede incluir una o más variables SQL, utilizando signos de interrogación
       (?) en los lugares adecuados.



      **Nota**:



        Los marcadores están permitidos únicamente en ciertos lugares de las consultas SQL.
        Por ejemplo, lo están en la lista VALUES() de una consulta
        INSERT (para especificar los valores de las columnas para una fila),
        o en una comparación de una cláusula WHERE para especificar un
        valor de comparación. Sin embargo, no están permitidos para los identificadores
        (de tablas o columnas).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Ejemplo para mysqli_stmt::prepare()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$city = "Amersfoort";

/_ create a prepared statement _/
$stmt = $mysqli-&gt;stmt_init();
$stmt-&gt;prepare("SELECT District FROM City WHERE Name=?");

/_ bind parameters for markers _/
$stmt-&gt;bind_param("s", $city);

/_ execute query _/
$stmt-&gt;execute();

/_ bind result variables _/
$stmt-&gt;bind_result($district);

/_ fetch value _/
$stmt-&gt;fetch();

printf("%s is in district %s\n", $city, $district);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$city = "Amersfoort";

/_ create a prepared statement _/
$stmt = mysqli_stmt_init($link);
mysqli_stmt_prepare($stmt, "SELECT District FROM City WHERE Name=?");

/_ bind parameters for markers _/
mysqli_stmt_bind_param($stmt, "s", $city);

/_ execute query _/
mysqli_stmt_execute($stmt);

/_ bind result variables _/
mysqli_stmt_bind_result($stmt, $district);

/_ fetch value _/
mysqli_stmt_fetch($stmt);

printf("%s is in district %s\n", $city, $district);

Los ejemplos anteriores mostrarán:

Amersfoort is in district Utrecht

### Ver también

    - [mysqli_stmt_init()](#mysqli.stmt-init) - Inicializa una sentencia MySQL

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

    - [mysqli_stmt_bind_result()](#mysqli-stmt.bind-result) - Vincula variables a un conjunto de resultados

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

    - [mysqli_stmt_close()](#mysqli-stmt.close) - Termina una consulta preparada

# mysqli_stmt::reset

# mysqli_stmt_reset

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::reset -- mysqli_stmt_reset — Anula una consulta preparada

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::reset**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_reset**([mysqli_stmt](#class.mysqli-stmt) $statement): [bool](#language.types.boolean)

Anula una consulta preparada en el cliente y en el servidor después de haber sido preparada.

Esta función anula la consulta en el servidor, anula los datos enviados utilizando la función
[mysqli_stmt_send_long_data()](#mysqli-stmt.send-long-data), anula los conjuntos de resultados no almacenados en buffer,
así como los errores actuales. Sin embargo, los conjuntos de resultados almacenados o vinculados no se anulan.
Los conjuntos de resultados almacenados se borran al ejecutar la consulta preparada (o al cerrarlos).

Para preparar nuevamente una consulta, se debe utilizar la función
[mysqli_stmt_prepare()](#mysqli-stmt.prepare).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

# mysqli_stmt::result_metadata

# mysqli_stmt_result_metadata

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::result_metadata -- mysqli_stmt_result_metadata — Devuelve las metadatos de preparación de consulta MySQL

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::result_metadata**(): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_stmt_result_metadata**([mysqli_stmt](#class.mysqli-stmt) $statement): [mysqli_result](#class.mysqli-result)|[false](#language.types.singleton)

Si una orden ha sido preparada por [mysqli_prepare()](#mysqli.prepare),
y producirá un resultado, **mysqli_stmt_result_metadata()**
devuelve el objeto de resultado que será utilizado para leer las metadatos,
como el número de campos y las informaciones de columnas.

Esta función devuelve un objeto [mysqli_result](#class.mysqli-result) vacío
que permite acceder a la información de metadatos de la sentencia preparada
sin necesidad de recuperar las filas de datos. No es necesario usar esta
función si se utiliza [mysqli_stmt_get_result()](#mysqli-stmt.get-result) para
recuperar el conjunto de resultados completo de una sentencia preparada como un objeto de resultado.

**Nota**:

    Este conjunto de resultados solo se puede pasar como argumento a las funciones
    basadas en campos para procesar metadatos del conjunto de resultados, tales como:



     - [mysqli_num_fields()](#mysqli-result.field-count)



     - [mysqli_fetch_field()](#mysqli-result.fetch-field)



     - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct)



     - [mysqli_fetch_fields()](#mysqli-result.fetch-fields)



     - [mysqli_field_count()](#mysqli.field-count)



     - [mysqli_field_seek()](#mysqli-result.field-seek)



     - [mysqli_field_tell()](#mysqli-result.current-field)



     - [mysqli_free_result()](#mysqli-result.free)

**Nota**:

    El conjunto de resultados devuelto por **mysqli_stmt_result_metadata()**
    contiene únicamente metadatos. No contiene ninguna fila de resultado.
    Las filas se obtienen llamando a [mysqli_stmt_get_result()](#mysqli-stmt.get-result)
    en el manejador de la sentencia o con [mysqli_stmt_fetch()](#mysqli-stmt.fetch).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Devuelve un objeto de resultados, o **[false](#constant.false)** si ocurre un error.
Si la sentencia no produce un conjunto de resultados, también se devuelve **[false](#constant.false)**.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "test");

$mysqli-&gt;query("DROP TABLE IF EXISTS friends");
$mysqli-&gt;query("CREATE TABLE friends (id int, name varchar(20))");

$mysqli-&gt;query("INSERT INTO friends VALUES (1,'Hartmut'), (2, 'Ulf')");

$stmt = $mysqli-&gt;prepare("SELECT id, name FROM friends");
$stmt-&gt;execute();

/_ Lee las metadatos de resultado _/
$result = $stmt-&gt;result_metadata();

/_ Lee las informaciones de un campo, desde las metadatos _/
$field = $result-&gt;fetch_field();

printf("Nombre del campo : %s\n", $field-&gt;name);
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "test");

mysqli_query($link, "DROP TABLE IF EXISTS friends");
mysqli_query($link, "CREATE TABLE friends (id int, name varchar(20))");

mysqli_query($link, "INSERT INTO friends VALUES (1,'Hartmut'), (2, 'Ulf')");

$stmt = mysqli_prepare($link, "SELECT id, name FROM friends");
mysqli_stmt_execute($stmt);

/_ Lee las metadatos de resultado _/
$result = mysqli_stmt_result_metadata($stmt);

/_ Lee las informaciones de un campo, desde las metadatos _/
$field = mysqli_fetch_field($result);

printf("Nombre del campo : %s\n", $field-&gt;name);
?&gt;

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_free_result()](#mysqli-result.free) - Libera la memoria asociada a un resultado

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

# mysqli_stmt::send_long_data

# mysqli_stmt_send_long_data

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::send_long_data -- mysqli_stmt_send_long_data — Envía datos MySQL por paquetes

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::send_long_data**([int](#language.types.integer) $param_num, [string](#language.types.string) $data): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_send_long_data**([mysqli_stmt](#class.mysqli-stmt) $statement, [int](#language.types.integer) $param_num, [string](#language.types.string) $data): [bool](#language.types.boolean)

Envía los datos al servidor por paquetes, si el tamaño de los datos excede
el límite de max_allowed_packet. Esta función puede
ser llamada varias veces para enviar los datos de texto o binarios
de campos como BLOB o TEXT.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

     param_num


       Indica qué parámetro debe asociarse con qué datos.
       Los parámetros están numerados a partir de 0.






     data


       Un [string](#language.types.string) que contiene los datos a enviar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$stmt = $mysqli-&gt;prepare("INSERT INTO messages (message) VALUES (?)");
$null = NULL;
$stmt-&gt;bind_param("b", $null);
$fp = fopen("messages.txt", "r");
while (!feof($fp)) {
    $stmt-&gt;send_long_data(0, fread($fp, 8192));
}
fclose($fp);
$stmt-&gt;execute();
?&gt;

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_bind_param()](#mysqli-stmt.bind-param) - Vincula variables a una consulta MySQL

# mysqli_stmt::$sqlstate

# mysqli_stmt_sqlstate

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::$sqlstate -- mysqli_stmt_sqlstate — Devuelve el código SQLSTATE de la última operación MySQL

### Descripción

Estilo orientado a objetos

[string](#language.types.string) [$mysqli_stmt-&gt;sqlstate](#mysqli-stmt.sqlstate);

Estilo procedimental

**mysqli_stmt_sqlstate**([mysqli_stmt](#class.mysqli-stmt) $statement): [string](#language.types.string)

Devuelve un string que contiene el código de error SQLSTATE de la última
sentencia preparada. El código de error consta de 5 caracteres
'00000'. Los valores de los códigos de error están especificados por
las normas ANSI SQL y ODBC. Para la lista completa de valores, consulte el archivo
[» http://dev.mysql.com/doc/mysql/en/error-handling.html](http://dev.mysql.com/doc/mysql/en/error-handling.html).

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Devuelve el string que contiene el código de error SQLSTATE. El código
de error consta de 5 caracteres. '00000'
representa la ausencia de error.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
/_ Abre la conexión _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$mysqli-&gt;query("CREATE TABLE myCountry LIKE Country");
$mysqli-&gt;query("INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = $mysqli-&gt;prepare($query)) {

    /* Borrado de la tabla */
    $mysqli-&gt;query("DROP TABLE myCountry");

    /* Ejecución de la consulta */
    $stmt-&gt;execute();

    printf("Error: %s.\n", $stmt-&gt;sqlstate);

    /* Cierre de la consulta */
    $stmt-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
/_ Abre la conexión _/
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verifica la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

mysqli_query($link, "CREATE TABLE myCountry LIKE Country");
mysqli_query($link, "INSERT INTO myCountry SELECT \* FROM Country");

$query = "SELECT Name, Code FROM myCountry ORDER BY Name";
if ($stmt = mysqli_prepare($link, $query)) {

    /* Borrado de la tabla */
    mysqli_query($link, "DROP TABLE myCountry");

    /* Ejecución de la consulta */
    mysqli_stmt_execute($stmt);

    printf("Error: %s.\n", mysqli_stmt_sqlstate($stmt));

    /* Cierre de la consulta */
    mysqli_stmt_close($stmt);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Error: 42S02.

### Notas

**Nota**:

    Tenga en cuenta que no todos los errores MySQL tienen una correspondencia
    en SQLSTATE. El valor HY000 (error general) se
    utiliza para los errores sin correspondencia.

### Ver también

    - [mysqli_stmt_errno()](#mysqli-stmt.errno) - Devuelve un código de error para la última consulta

    - [mysqli_stmt_error()](#mysqli-stmt.error) - Devuelve una descripción del último error de procesamiento

# mysqli_stmt::store_result

# mysqli_stmt_store_result

(PHP 5, PHP 7, PHP 8)

mysqli_stmt::store_result -- mysqli_stmt_store_result — Almacena un conjunto de resultados en un búfer interno

### Descripción

Estilo orientado a objetos

public **mysqli_stmt::store_result**(): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_stmt_store_result**([mysqli_stmt](#class.mysqli-stmt) $statement): [bool](#language.types.boolean)

Esta función debería ser llamada para consultas que produzcan un conjunto de resultados (por ejemplo, SELECT, SHOW, DESCRIBE, EXPLAIN)
solo si el conjunto de resultados completo debe ser almacenado en búfer por PHP.
Cada llamada sucesiva a [mysqli_stmt_fetch()](#mysqli-stmt.fetch) devolverá
los datos almacenados en búfer.

**Nota**:

    No es necesario llamar a **mysqli_stmt_store_result()**
    para otros tipos de consultas, pero si se hace, no hay problema y no causará
    ninguna pérdida notable de rendimiento en ningún caso. Puede detectarse en
    todos los casos si la consulta va a producir un conjunto de resultados observando si la función
    [mysqli_stmt_result_metadata()](#mysqli-stmt.result-metadata) devuelve **[false](#constant.false)**.

### Parámetros

statementSolo estilo procedimental: Un objeto [mysqli_stmt](#class.mysqli-stmt)
devuelto por [mysqli_stmt_init()](#mysqli.stmt-init).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name LIMIT 20";
$stmt = $mysqli-&gt;prepare($query);
$stmt-&gt;execute();

/_ Almacenar el resultado en un búfer interno _/
$stmt-&gt;store_result();

printf("Número de filas: %d.\n", $stmt-&gt;num_rows);

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name LIMIT 20";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_execute($stmt);

/_ Almacenar el resultado en un búfer interno _/
mysqli_stmt_store_result($stmt);

printf("Número de filas: %d.\n", mysqli_stmt_num_rows($stmt));

Los ejemplos anteriores mostrarán:

Número de filas: 20.

### Ver también

    - [mysqli_prepare()](#mysqli.prepare) - Prepara una consulta SQL para su ejecución

    - [mysqli_stmt_result_metadata()](#mysqli-stmt.result-metadata) - Devuelve las metadatos de preparación de consulta MySQL

    - [mysqli_stmt_fetch()](#mysqli-stmt.fetch) - Lee los resultados de una consulta MySQL preparada en variables vinculadas

## Tabla de contenidos

- [mysqli_stmt::$affected_rows](#mysqli-stmt.affected-rows) — Devuelve el número total de filas modificadas, eliminadas, insertadas o coincidentes por la última consulta
- [mysqli_stmt::attr_get](#mysqli-stmt.attr-get) — Obtiene el valor actual de un atributo de consulta
- [mysqli_stmt::attr_set](#mysqli-stmt.attr-set) — Modifica el comportamiento de una consulta preparada
- [mysqli_stmt::bind_param](#mysqli-stmt.bind-param) — Vincula variables a una consulta MySQL
- [mysqli_stmt::bind_result](#mysqli-stmt.bind-result) — Vincula variables a un conjunto de resultados
- [mysqli_stmt::close](#mysqli-stmt.close) — Termina una consulta preparada
- [mysqli_stmt::\_\_construct](#mysqli-stmt.construct) — Construye un nuevo objeto mysqli_stmt
- [mysqli_stmt::data_seek](#mysqli-stmt.data-seek) — Ajusta el puntero de resultado a una fila arbitraria en el resultado almacenado en el búfer.
- [mysqli_stmt::$errno](#mysqli-stmt.errno) — Devuelve un código de error para la última consulta
- [mysqli_stmt::$error](#mysqli-stmt.error) — Devuelve una descripción del último error de procesamiento
- [mysqli_stmt::$error_list](#mysqli-stmt.error-list) — Devuelve una lista de errores para la última consulta ejecutada
- [mysqli_stmt::execute](#mysqli-stmt.execute) — Ejecuta una consulta preparada
- [mysqli_stmt::fetch](#mysqli-stmt.fetch) — Lee los resultados de una consulta MySQL preparada en variables vinculadas
- [mysqli_stmt::$field_count](#mysqli-stmt.field-count) — Devuelve el número de columnas en la consulta dada
- [mysqli_stmt::free_result](#mysqli-stmt.free-result) — Libera el resultado MySQL de la memoria
- [mysqli_stmt::get_result](#mysqli-stmt.get-result) — Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result
- [mysqli_stmt::get_warnings](#mysqli-stmt.get-warnings) — Obtiene el resultado de SHOW WARNINGS
- [mysqli_stmt::$insert_id](#mysqli-stmt.insert-id) — Obtiene el ID generado por la última consulta INSERT
- [mysqli_stmt::more_results](#mysqli-stmt.more-results) — Comprueba si hay más resultados desde una consulta múltiple
- [mysqli_stmt::next_result](#mysqli-stmt.next-result) — Lee el resultado siguiente desde una consulta múltiple
- [mysqli_stmt::$num_rows](#mysqli-stmt.num-rows) — Devuelve el número de filas recuperadas del servidor
- [mysqli_stmt::$param_count](#mysqli-stmt.param-count) — Devuelve el número de parámetros de un comando SQL
- [mysqli_stmt::prepare](#mysqli-stmt.prepare) — Prepara una consulta SQL para su ejecución
- [mysqli_stmt::reset](#mysqli-stmt.reset) — Anula una consulta preparada
- [mysqli_stmt::result_metadata](#mysqli-stmt.result-metadata) — Devuelve las metadatos de preparación de consulta MySQL
- [mysqli_stmt::send_long_data](#mysqli-stmt.send-long-data) — Envía datos MySQL por paquetes
- [mysqli_stmt::$sqlstate](#mysqli-stmt.sqlstate) — Devuelve el código SQLSTATE de la última operación MySQL
- [mysqli_stmt::store_result](#mysqli-stmt.store-result) — Almacena un conjunto de resultados en un búfer interno

# La clase mysqli_result

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa el conjunto de resultados obtenido desde una consulta.

## Sinopsis de la Clase

     class **mysqli_result**



     implements
      [IteratorAggregate](#class.iteratoraggregate) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$current_field](#mysqli-result.current-field);

    public
     readonly
     [int](#language.types.integer)
      [$field_count](#mysqli-result.field-count);

    public
     readonly
     ?[array](#language.types.array)
      [$lengths](#mysqli-result.lengths);

    public
     readonly
     [int](#language.types.integer)|[string](#language.types.string)
      [$num_rows](#mysqli-result.num-rows);

    public
     [int](#language.types.integer)
      [$type](#mysqli-result.props.type);


    /* Métodos */

public [\_\_construct](#mysqli-result.construct)([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $result_mode = **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**)

    public [data_seek](#mysqli-result.data-seek)([int](#language.types.integer) $offset): [bool](#language.types.boolean)

public [fetch_all](#mysqli-result.fetch-all)([int](#language.types.integer) $mode = **[MYSQLI_NUM](#constant.mysqli-num)**): [array](#language.types.array)
public [fetch_array](#mysqli-result.fetch-array)([int](#language.types.integer) $mode = **[MYSQLI_BOTH](#constant.mysqli-both)**): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)
public [fetch_assoc](#mysqli-result.fetch-assoc)(): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)
public [fetch_column](#mysqli-result.fetch-column)([int](#language.types.integer) $column = 0): [null](#language.types.null)|[int](#language.types.integer)|[float](#language.types.float)|[string](#language.types.string)|[false](#language.types.singleton)
public [fetch_field](#mysqli-result.fetch-field)(): [object](#language.types.object)|[false](#language.types.singleton)
public [fetch_field_direct](#mysqli-result.fetch-field-direct)([int](#language.types.integer) $index): [object](#language.types.object)|[false](#language.types.singleton)
public [fetch_fields](#mysqli-result.fetch-fields)(): [array](#language.types.array)
public [fetch_object](#mysqli-result.fetch-object)([string](#language.types.string) $class = "stdClass", [array](#language.types.array) $constructor_args = []): [object](#language.types.object)|[null](#language.types.null)|[false](#language.types.singleton)
public [fetch_row](#mysqli-result.fetch-row)(): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)
public [field_seek](#mysqli-result.field-seek)([int](#language.types.integer) $index): [true](#language.types.singleton)
public [free](#mysqli-result.free)(): [void](language.types.void.html)
public [close](#mysqli-result.free)(): [void](language.types.void.html)
public [free_result](#mysqli-result.free)(): [void](language.types.void.html)
public [getIterator](#mysqli-result.getiterator)(): [Iterator](#class.iterator)

}

## Propiedades

      type



       Registra si el resultado se almacena en el búfer o no en forma de [int](#language.types.integer)
       (**[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)** o
       **[MYSQLI_USE_RESULT](#constant.mysqli-use-result)**, respectivamente).





## Historial de cambios

       Versión
       Descripción






       8.0.0

        La clase **mysqli_result** implementa ahora [IteratorAggregate](#class.iteratoraggregate).
        Anteriormente, solo se implementaba [Traversable](#class.traversable).





# mysqli_result::\_\_construct

(PHP 5, PHP 7, PHP 8)

mysqli_result::\_\_construct — Construye un objeto [mysqli_result](#class.mysqli-result)

### Descripción

public **mysqli_result::\_\_construct**([mysqli](#class.mysqli) $mysql, [int](#language.types.integer) $result_mode = **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)**)

Este método construye un nuevo objeto [mysqli_result](#class.mysqli-result).

Esto puede ser utilizado para crear el objeto [mysqli_result](#class.mysqli-result)
después de haber llamado a las funciones [mysqli_real_query()](#mysqli.real-query) o
[mysqli_multi_query()](#mysqli.multi-query). Construir el objeto manualmente
es equivalente a llamar a las funciones [mysqli_store_result()](#mysqli.store-result)
o [mysqli_use_result()](#mysqli.use-result).

### Parámetros

mysqlSolo estilo procedimental: Un objeto [mysqli](#class.mysqli)
devuelto por [mysqli_connect()](#function.mysqli-connect) o [mysqli_init()](#mysqli.init)

    result_mode


      El modo de resultado puede ser una de las 2 constantes que indican cómo
      el resultado será devuelto por el servidor MySQL.




      **[MYSQLI_STORE_RESULT](#constant.mysqli-store-result)** (por omisión) - crea un objeto
      [mysqli_result](#class.mysqli-result) con un juego de resultados almacenado en búfer.




      **[MYSQLI_USE_RESULT](#constant.mysqli-use-result)** - crea un objeto
      [mysqli_result](#class.mysqli-result) con un juego de resultados no almacenado en búfer.
      Mientras queden registros pendientes de ser recuperados, la línea
      de conexión estará ocupada y todas las llamadas siguientes devolverán
      el error Commands out of sync. Para evitar el error,
      todos los registros deben ser recuperados del servidor o el juego de
      resultados debe ser descartado llamando a [mysqli_free_result()](#mysqli-result.free).
      La conexión debe permanecer abierta para que las líneas sean recuperadas.


### Errores/Excepciones

Si el informe de errores de mysqli está habilitado (**[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**) y la operación solicitada falla,
se genera una advertencia. Si, además, el modo está configurado como **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**,
se lanza una [mysqli_sql_exception](#class.mysqli-sql-exception) en su lugar.

### Ejemplos

**Ejemplo #1 Creación de un objeto [mysqli_result](#class.mysqli-result)**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Consulta SELECT que devuelve un juego de resultados _/
$mysqli-&gt;real_query("SELECT Name FROM City LIMIT 10");

$result = new mysqli_result($mysqli);
printf("Select devolvió %d filas.\n", $result-&gt;num_rows);

Los ejemplos anteriores mostrarán algo similar a:

Select devolvió 10 filas.

### Ver también

    - [mysqli_multi_query()](#mysqli.multi-query) - Ejecuta una o varias consultas en la base de datos

    - [mysqli_real_query()](#mysqli.real-query) - Ejecuta una consulta SQL

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli_result::$current_field

# mysqli_field_tell

(PHP 5, PHP 7, PHP 8)

mysqli_result::$current_field -- mysqli_field_tell — Obtiene la posición actual de un campo en un puntero de resultado

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_result-&gt;current_field](#mysqli-result.current-field);

Estilo procedimental

**mysqli_field_tell**([mysqli_result](#class.mysqli-result) $result): [int](#language.types.integer)

Devuelve la posición del cursor de campo utilizado por la
última llamada a la función [mysqli_fetch_field()](#mysqli-result.fetch-field).
Este valor puede ser utilizado como argumento de la función
[mysqli_field_seek()](#mysqli-result.field-seek).

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Devuelve la posición actual del cursor de campo.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = $mysqli-&gt;query($query)) {

    /* Obtención de información sobre el campo para todas las columnas */
    while ($finfo = $result-&gt;fetch_field()) {

        /* Obtención de la posición del puntero de campo */
        $currentfield = $result-&gt;current_field;

        printf("Columna %d:\n", $currentfield);
        printf("Nombre: %s\n", $finfo-&gt;name);
        printf("Tabla: %s\n", $finfo-&gt;table);
        printf("Longitud máx.: %d\n", $finfo-&gt;max_length);
        printf("Flags: %d\n", $finfo-&gt;flags);
        printf("Tipo: %d\n\n", $finfo-&gt;type);
    }
    $result-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = mysqli_query($link, $query)) {

    /* Obtención de información sobre el campo para todas las columnas */
    while ($finfo = mysqli_fetch_field($result)) {

        /* Obtención de la posición del puntero de campo */
        $currentfield = mysqli_field_tell($result);

        printf("Columna %d:\n", $currentfield);
        printf("Nombre: %s\n", $finfo-&gt;name);
        printf("Tabla: %s\n", $finfo-&gt;table);
        printf("Longitud máx.: %d\n", $finfo-&gt;max_length);
        printf("Flags: %d\n", $finfo-&gt;flags);
        printf("Tipo: %d\n\n", $finfo-&gt;type);
    }
    mysqli_free_result($result);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Columna 1:
Nombre: Name
Tabla: Country
Longitud máx.: 11
Flags: 1
Tipo: 254

Columna 2:
Nombre: SurfaceArea
Tabla: Country
Longitud máx.: 10
Flags: 32769
Tipo: 4

### Ver también

    - [mysqli_fetch_field()](#mysqli-result.fetch-field) - Devuelve el siguiente campo en el conjunto de resultados

    - [mysqli_field_seek()](#mysqli-result.field-seek) - Desplaza el puntero de resultado al campo especificado

# mysqli_result::data_seek

# mysqli_data_seek

(PHP 5, PHP 7, PHP 8)

mysqli_result::data_seek -- mysqli_data_seek — Mueve el puntero interno de resultado

### Descripción

Estilo orientado a objetos

public **mysqli_result::data_seek**([int](#language.types.integer) $offset): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_data_seek**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $offset): [bool](#language.types.boolean)

La función **mysqli_data_seek()** mueve el
puntero interno de resultado asociado al conjunto de resultados representado
por result, haciéndolo apuntar a
la fila especificada por offset.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     offset


       El desplazamiento de la fila. El parámetro offset debe estar
       comprendido entre cero y [mysqli_num_rows()](#mysqli-result.num-rows) -
       1 (0..[mysqli_num_rows()](#mysqli-result.num-rows) - 1).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con mysqli::data_seek()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name";
$result = $mysqli-&gt;query($query);

/_ Busca la fila 401 _/
$result-&gt;data_seek(400);

/_ Obtención de esta fila _/
$row = $result-&gt;fetch_row();
printf("Ciudad: %s Código País: %s\n", $row[0], $row[1]);
?&gt;

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name";
$result = mysqli_query($link, $query);

/_ Busca la fila 401 _/
mysqli_data_seek($result, 400);

/_ Obtención de esta fila _/
$row = mysqli_fetch_row($result);
printf("Ciudad: %s Código País: %s\n", $row[0], $row[1]);

Los ejemplos anteriores mostrarán:

Ciudad: Benin City Código País: NGA

**Ejemplo #2 Ajuste del puntero de resultado durante la iteración**

    Esta función puede ser útil durante la iteración sobre el conjunto de resultados para imponer
    un orden personalizado o para rebobinar el conjunto de resultados durante iteraciones múltiples.

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY Name LIMIT 15,4";
$result = $mysqli-&gt;query($query);

/_ Consultar el conjunto de resultados en orden inverso _/
for ($row_no = $result-&gt;num_rows - 1; $row_no &gt;= 0; $row_no--) {
    $result-&gt;data_seek($row_no);

    /* Obtención de esta fila */
    $row = $result-&gt;fetch_row();
    printf("Ciudad: %s  Código País: %s\n", $row[0], $row[1]);

}

/_ Restablecer el puntero al inicio del conjunto de resultados _/
$result-&gt;data_seek(0);
print "\n";

/_ Consultar nuevamente el mismo conjunto de resultados _/
while ($row = $result-&gt;fetch_row()) {
printf("Ciudad: %s Código País: %s\n", $row[0], $row[1]);
}

Los ejemplos anteriores mostrarán:

Ciudad: Acmbaro Código País: MEX
Ciudad: Abuja Código País: NGA
Ciudad: Abu Dhabi Código País: ARE
Ciudad: Abottabad Código País: PAK
Ciudad: Abottabad Código País: PAK
Ciudad: Abu Dhabi Código País: ARE
Ciudad: Abuja Código País: NGA
Ciudad: Acmbaro Código País: MEX

### Notas

**Nota**:

    Esta función solo puede ser utilizada con resultados obtenidos
    con la función [mysqli_store_result()](#mysqli.store-result),
    [mysqli_query()](#mysqli.query) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Ver también

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_fetch_row()](#mysqli-result.fetch-row) - Obtiene una fila de resultado como un array indexado

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc) - Recupera la siguiente fila de un conjunto de resultados como un array asociativo

    - [mysqli_fetch_object()](#mysqli-result.fetch-object) - Devuelve la siguiente fila de un conjunto de resultados como objeto

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_num_rows()](#mysqli-result.num-rows) - Devuelve el número de filas en el conjunto de resultados

# mysqli_result::fetch_all

# mysqli_fetch_all

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli_result::fetch_all -- mysqli_fetch_all — Recupera todas las filas de resultados en un array asociativo, numérico o ambos

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_all**([int](#language.types.integer) $mode = **[MYSQLI_NUM](#constant.mysqli-num)**): [array](#language.types.array)

Estilo procedimental

**mysqli_fetch_all**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $mode = **[MYSQLI_NUM](#constant.mysqli-num)**): [array](#language.types.array)

Devuelve un array bidimensional de todos los resultados
en forma de un array asociativo, numérico o ambos.

**Nota**:

    Anterior a PHP 8.1.0, disponible únicamente con
    [mysqlnd](#book.mysqlnd).

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     mode


       Este argumento opcional es una constante que indica el tipo de
       array que debe ser producido a partir del resultado. Los valores
       posibles son las constantes **[MYSQLI_ASSOC](#constant.mysqli-assoc)**,
       **[MYSQLI_NUM](#constant.mysqli-num)**, o **[MYSQLI_BOTH](#constant.mysqli-both)**.





### Valores devueltos

Devuelve un array asociativo o numérico que contiene
las filas de resultado.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora también disponible al vincular con libmysqlclient.



### Ejemplos

**Ejemplo #1 Ejemplo de mysqli_result::fetch_all()**

Estilo orientado a objetos

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
$result = $mysqli-&gt;query("SELECT Name, CountryCode FROM City ORDER BY ID LIMIT 3");
$rows = $result-&gt;fetch_all(MYSQLI_ASSOC);
foreach ($rows as $row) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

Estilo procedimental

&lt;?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");
$result = mysqli_query($mysqli, "SELECT Name, CountryCode FROM City ORDER BY ID LIMIT 3");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

Los ejemplos anteriores mostrarán:

Kabul (AFG)
Qandahar (AFG)
Herat (AFG)

### Ver también

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_column()](#mysqli-result.fetch-column) - Recupera una sola columna de la siguiente fila de un conjunto de resultados

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

# mysqli_result::fetch_array

# mysqli_fetch_array

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_array -- mysqli_fetch_array — Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_array**([int](#language.types.integer) $mode = **[MYSQLI_BOTH](#constant.mysqli-both)**): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_array**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $mode = **[MYSQLI_BOTH](#constant.mysqli-both)**): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Devuelve una fila de datos del conjunto de resultados y la retorna como un array.
Cada llamada posterior a esta función retornará la siguiente fila en el conjunto de resultados,
o **[null](#constant.null)** si no hay más filas.

Además de almacenar los datos como un array con índices numéricos,
también puede almacenarlos en un array asociativo,
utilizando los nombres de los campos como claves.

Si dos o más columnas del resultado tienen el mismo nombre,
la última columna tendrá prioridad y sobrescribirá todos los datos anteriores.
Para acceder a las otras columnas con el mismo nombre, se debe
utilizar el índice numérico o crear un alias para cada columna.

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     mode


       El segundo argumento opcional es una constante que indica qué
       tipo de array debe ser retornado a partir de la fila de datos
       actual. Los valores posibles para este parámetro son las constantes
       **[MYSQLI_ASSOC](#constant.mysqli-assoc)**, **[MYSQLI_NUM](#constant.mysqli-num)**,
       y **[MYSQLI_BOTH](#constant.mysqli-both)**.




       Al utilizar la constante **[MYSQLI_ASSOC](#constant.mysqli-assoc)**, esta función
       se comportará como la función [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc),
       mientras que **[MYSQLI_NUM](#constant.mysqli-num)** hará que actúe como la función
       [mysqli_fetch_row()](#mysqli-result.fetch-row). La constante
       **[MYSQLI_BOTH](#constant.mysqli-both)** creará un array que será tanto
       asociativo como indexado numéricamente.





### Valores devueltos

Retorna un array que representa la fila recuperada,
**[null](#constant.null)** si no hay más filas en el conjunto de resultados, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de mysqli_result::fetch_array()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID LIMIT 3";
$result = $mysqli-&gt;query($query);

/_ Array numérico _/
$row = $result-&gt;fetch_array(MYSQLI_NUM);
printf("%s (%s)\n", $row[0], $row[1]);

/_ Array asociativo _/
$row = $result-&gt;fetch_array(MYSQLI_ASSOC);
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

/_ Array asociativo y numérico _/
$row = $result-&gt;fetch_array(MYSQLI_BOTH);
printf("%s (%s)\n", $row[0], $row["CountryCode"]);

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER by ID LIMIT 3";
$result = mysqli_query($mysqli, $query);

/_ Array numérico _/
$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf("%s (%s)\n", $row[0], $row[1]);

/_ Array asociativo _/
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

/_ Array asociativo y numérico _/
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
printf("%s (%s)\n", $row[0], $row["CountryCode"]);

Los ejemplos anteriores mostrarán algo similar a:

Kabul (AFG)
Qandahar (AFG)
Herat (AFG)

### Ver también

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc) - Recupera la siguiente fila de un conjunto de resultados como un array asociativo

    - [mysqli_fetch_column()](#mysqli-result.fetch-column) - Recupera una sola columna de la siguiente fila de un conjunto de resultados

    - [mysqli_fetch_row()](#mysqli-result.fetch-row) - Obtiene una fila de resultado como un array indexado

    - [mysqli_fetch_object()](#mysqli-result.fetch-object) - Devuelve la siguiente fila de un conjunto de resultados como objeto

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_data_seek()](#mysqli-result.data-seek) - Mueve el puntero interno de resultado

# mysqli_result::fetch_assoc

# mysqli_fetch_assoc

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_assoc -- mysqli_fetch_assoc — Recupera la siguiente fila de un conjunto de resultados como un array asociativo

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_assoc**(): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_assoc**([mysqli_result](#class.mysqli-result) $result): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Devuelve una fila de datos del conjunto de resultados y la retorna como un array asociativo.
Cada llamada posterior a esta función retornará la siguiente fila en el conjunto de resultados,
o **[null](#constant.null)** si no hay más filas.

Si dos o más columnas del resultado tienen el mismo nombre,
la última columna tendrá prioridad y sobrescribirá todos los datos anteriores.
Para acceder a múltiples columnas con el mismo nombre, puede utilizarse [mysqli_fetch_row()](#mysqli-result.fetch-row)
para recuperar el array indexado numéricamente
o pueden utilizarse alias en la lista de selección de la consulta SQL para dar
nombres diferentes a las columnas.

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Devuelve un array asociativo que representa la fila recuperada,
donde cada clave del array representa el nombre de una de las columnas del conjunto de resultados,
**[null](#constant.null)** si no hay más filas en el conjunto de resultados, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo mysqli_result::fetch_assoc()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = $mysqli-&gt;query($query);

/_ fetch associative array _/
while ($row = $result-&gt;fetch_assoc()) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = mysqli_query($mysqli, $query);

/_ fetch associative array _/
while ($row = mysqli_fetch_assoc($result)) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

Los ejemplos anteriores mostrarán algo similar a:

Pueblo (USA)
Arvada (USA)
Cape Coral (USA)
Green Bay (USA)
Santa Clara (USA)

**Ejemplo #2 Comparación del uso de [mysqli_result](#class.mysqli-result) [iterator](#class.iterator) y mysqli_result::fetch_assoc()**

    [mysqli_result](#class.mysqli-result) puede ser iterado utilizando un [foreach](#control-structures.foreach).
    El conjunto de resultados siempre será iterado desde la primera fila,
    independientemente de la posición actual.

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = 'SELECT Name, CountryCode FROM City ORDER BY ID DESC';

// Utiliza un iterador
$result = $mysqli-&gt;query($query);
foreach ($result as $row) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

echo "\n==================\n";

// No utiliza iterador
$result = $mysqli-&gt;query($query);
while ($row = $result-&gt;fetch_assoc()) {
printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}

Resultado del ejemplo anterior es similar a:

Pueblo (USA)
Arvada (USA)
Cape Coral (USA)
Green Bay (USA)
Santa Clara (USA)

==================
Pueblo (USA)
Arvada (USA)
Cape Coral (USA)
Green Bay (USA)
Santa Clara (USA)

### Ver también

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_column()](#mysqli-result.fetch-column) - Recupera una sola columna de la siguiente fila de un conjunto de resultados

    - [mysqli_fetch_row()](#mysqli-result.fetch-row) - Obtiene una fila de resultado como un array indexado

    - [mysqli_fetch_object()](#mysqli-result.fetch-object) - Devuelve la siguiente fila de un conjunto de resultados como objeto

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_data_seek()](#mysqli-result.data-seek) - Mueve el puntero interno de resultado

# mysqli_result::fetch_column

# mysqli_fetch_column

(PHP 8 &gt;= 8.1.0)

mysqli_result::fetch_column -- mysqli_fetch_column — Recupera una sola columna de la siguiente fila de un conjunto de resultados

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_column**([int](#language.types.integer) $column = 0): [null](#language.types.null)|[int](#language.types.integer)|[float](#language.types.float)|[string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_column**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $column = 0): [null](#language.types.null)|[int](#language.types.integer)|[float](#language.types.float)|[string](#language.types.string)|[false](#language.types.singleton)

Recupera una fila de datos del conjunto de resultados y devuelve la columna indexada a 0.
Cada llamada posterior a esta función devolverá el valor de la siguiente fila
del conjunto de resultados, o **[false](#constant.false)** si no hay más filas.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     column


       El número indexado a 0 de la columna que se desea recuperar de la fila.
       Si no se proporciona ningún valor, se devolverá la primera columna.





### Valores devueltos

Devuelve una sola columna
de la siguiente fila de un conjunto de resultados o **[false](#constant.false)** si no hay más filas.

**Advertencia**

    No hay forma de devolver otra columna de la misma fila si se
    utiliza esta función para recuperar datos.

### Ejemplos

**Ejemplo #1 Ejemplo de mysqli_result::fetch_column()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT CountryCode, Name FROM City ORDER BY ID DESC LIMIT 5";

$result = $mysqli-&gt;query($query);

/_ Recupera un solo valor de la segunda columna _/
while ($Name = $result-&gt;fetch_column(1)) {
printf("%s\n", $Name);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT CountryCode, Name FROM City ORDER BY ID DESC LIMIT 5";

$result = mysqli_query($mysqli, $query);

/_ Recupera un solo valor de la segunda columna _/
while ($Name = mysqli_fetch_column($result, 1)) {
printf("%s\n", $Name);
}

Los ejemplos anteriores mostrarán algo similar a:

Rafah
Nablus
Jabaliya
Hebron
Khan Yunis

### Ver también

    - [mysqli_fetch_all()](#mysqli-result.fetch-all) - Recupera todas las filas de resultados en un array asociativo, numérico o ambos

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc) - Recupera la siguiente fila de un conjunto de resultados como un array asociativo

    - [mysqli_fetch_object()](#mysqli-result.fetch-object) - Devuelve la siguiente fila de un conjunto de resultados como objeto

    - [mysqli_fetch_row()](#mysqli-result.fetch-row) - Obtiene una fila de resultado como un array indexado

    - [mysqli_data_seek()](#mysqli-result.data-seek) - Mueve el puntero interno de resultado

# mysqli_result::fetch_field

# mysqli_fetch_field

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_field -- mysqli_fetch_field — Devuelve el siguiente campo en el conjunto de resultados

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_field**(): [object](#language.types.object)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_field**([mysqli_result](#class.mysqli-result) $result): [object](#language.types.object)|[false](#language.types.singleton)

Devuelve los atributos de la siguiente columna en el conjunto de
resultados representado por el parámetro result
como un objeto. Llame a esta función de forma repetitiva para
recuperar la información de todas las columnas.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Devuelve un objeto que contiene la información de un campo o **[false](#constant.false)**
si no hay información disponible para este campo.

   <caption>**Propiedades del objeto**</caption>
   
    
     
      Propiedad
      Descripción


      name
      El nombre de la columna



      orgname
      El nombre original de la columna si se ha especificado un alias



      table
      El nombre de la tabla a la que pertenece este campo (si no ha sido calculado)



      orgtable
      El nombre original de la tabla si se ha especificado un alias



      def
      No utilizado. Siempre una string vacía



      db
      El nombre de la base de datos



      catalog
      No utilizado. Siempre "def"



      max_length
      La longitud máxima del campo para el conjunto de resultados. A partir de PHP 8.1, este valor es siempre 0.



      length

       El ancho del campo en bytes. Para las columnas de tipo string,
       el valor de longitud varía en función del juego de caracteres de la conexión.
       Por ejemplo, si el juego de caracteres es latin1, un juego de caracteres de un byte,
       el valor de longitud para una consulta SELECT 'abc' es 3.
       Si el juego de caracteres es utf8mb4, un juego de caracteres multibyte
       en el que los caracteres ocupan hasta 4 bytes, el valor de longitud es 12.




      charsetnr
      El número del juego de caracteres para este campo



      flags
      Un integer que representa los bit-flags para este campo



      type
      El tipo de datos utilizados para este campo



      decimals
      El número de decimales para los campos numéricos y la precisión de los segundos fraccionarios para los campos temporales.


### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = $mysqli-&gt;query($query)) {

    /* Recupera la información de un campo para todas las columnas */
    while ($finfo = $result-&gt;fetch_field()) {

        printf("Name:     %s\n", $finfo-&gt;name);
        printf("Table:    %s\n", $finfo-&gt;table);
        printf("max. Len: %d\n", $finfo-&gt;max_length);
        printf("Flags:    %d\n", $finfo-&gt;flags);
        printf("Type:     %d\n\n", $finfo-&gt;type);
    }
    $result-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = mysqli_query($link, $query)) {

    /* Recupera la información de un campo para todas las columnas */
    while ($finfo = mysqli_fetch_field($result)) {

        printf("Name:     %s\n", $finfo-&gt;name);
        printf("Table:    %s\n", $finfo-&gt;table);
        printf("max. Len: %d\n", $finfo-&gt;max_length);
        printf("Flags:    %d\n", $finfo-&gt;flags);
        printf("Type:     %d\n\n", $finfo-&gt;type);
    }
    mysqli_free_result($result);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Name: Name
Table: Country
max. Len: 11
Flags: 1
Type: 254

Name: SurfaceArea
Table: Country
max. Len: 10
Flags: 32769
Type: 4

### Ver también

    - [mysqli_num_fields()](#mysqli-result.field-count) - Obtiene el número de campos en el conjunto de resultados

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) - Obtiene los metadatos de un campo único

    - [mysqli_fetch_fields()](#mysqli-result.fetch-fields) - Devuelve un array de objetos que representan los campos en el resultado

    - [mysqli_field_seek()](#mysqli-result.field-seek) - Desplaza el puntero de resultado al campo especificado

# mysqli_result::fetch_field_direct

# mysqli_fetch_field_direct

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_field_direct -- mysqli_fetch_field_direct — Obtiene los metadatos de un campo único

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_field_direct**([int](#language.types.integer) $index): [object](#language.types.object)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_field_direct**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $index): [object](#language.types.object)|[false](#language.types.singleton)

Devuelve un objeto que contiene los metadatos
de un campo en el conjunto de resultados especificado.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     index


       El número del campo. Este valor debe estar en el intervalo
       0 a número de campos - 1.





### Valores devueltos

Devuelve un objeto que contiene los metadatos de un campo
o **[false](#constant.false)** si no se especifican metadatos para el campo
index.

   <caption>**Propiedades del objeto**</caption>
   
    
     
      Propiedad
      Descripción


      name
      El nombre de la columna



      orgname
      El nombre original de la columna si se ha especificado un alias



      table
      El nombre de la tabla a la que pertenece este campo (si no ha sido calculado)



      orgtable
      El nombre original de la tabla si se ha especificado un alias



      def
      No utilizado. Siempre una string vacía



      db
      El nombre de la base de datos



      catalog
      No utilizado. Siempre "def"



      max_length
      La longitud máxima del campo para el conjunto de resultados. A partir de PHP 8.1, este valor es siempre 0.



      length

       El ancho del campo en bytes. Para las columnas de tipo string,
       el valor de longitud varía en función del juego de caracteres de la conexión.
       Por ejemplo, si el juego de caracteres es latin1, un juego de caracteres de un byte,
       el valor de longitud para una consulta SELECT 'abc' es 3.
       Si el juego de caracteres es utf8mb4, un juego de caracteres multibyte
       en el que los caracteres ocupan hasta 4 bytes, el valor de longitud es 12.




      charsetnr
      El número del juego de caracteres para este campo



      flags
      Un integer que representa los bit-flags para este campo



      type
      El tipo de datos utilizados para este campo



      decimals
      El número de decimales para los campos numéricos y la precisión de los segundos fraccionarios para los campos temporales.


### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Name LIMIT 5";

if ($result = $mysqli-&gt;query($query)) {

    /* Obtener información del campo para la columna 'SurfaceArea' */
    $finfo = $result-&gt;fetch_field_direct(1);

    printf("Nombre      : %s\n", $finfo-&gt;name);
    printf("Tabla       : %s\n", $finfo-&gt;table);
    printf("Tamaño máx : %d\n", $finfo-&gt;max_length);
    printf("Flags       : %d\n", $finfo-&gt;flags);
    printf("Tipo        : %d\n", $finfo-&gt;type);

    $result-&gt;close();

}

/_ Cierre de la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Name LIMIT 5";

if ($result = mysqli_query($link, $query)) {

    /* Obtener información del campo para la columna 'SurfaceArea' */
    $finfo = mysqli_fetch_field_direct($result, 1);

    printf("Nombre      : %s\n", $finfo-&gt;name);
    printf("Tabla       : %s\n", $finfo-&gt;table);
    printf("Tamaño máx : %d\n", $finfo-&gt;max_length);
    printf("Flags       : %d\n", $finfo-&gt;flags);
    printf("Tipo        : %d\n", $finfo-&gt;type);

    mysqli_free_result($result);

}

/_ Cierre de la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Nombre : SurfaceArea
Tabla : Country
Tamaño máx : 10
Flags : 32769
Tipo : 4

### Ver también

    - [mysqli_num_fields()](#mysqli-result.field-count) - Obtiene el número de campos en el conjunto de resultados

    - [mysqli_fetch_field()](#mysqli-result.fetch-field) - Devuelve el siguiente campo en el conjunto de resultados

    - [mysqli_fetch_fields()](#mysqli-result.fetch-fields) - Devuelve un array de objetos que representan los campos en el resultado

# mysqli_result::fetch_fields

# mysqli_fetch_fields

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_fields -- mysqli_fetch_fields — Devuelve un array de objetos que representan los campos en el resultado

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_fields**(): [array](#language.types.array)

Estilo procedimental

**mysqli_fetch_fields**([mysqli_result](#class.mysqli-result) $result): [array](#language.types.array)

Esta función opera como [mysqli_fetch_field()](#mysqli-result.fetch-field)
con la diferencia de que, en lugar de devolver un objeto a la vez
para cada campo, las columnas son devueltas como un array de objetos.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Devuelve un array de objetos que contiene información sobre la definición de los campos.

   <caption>**Propiedades del objeto**</caption>
   
    
     
      Propiedad
      Descripción


      name
      El nombre de la columna



      orgname
      El nombre original de la columna si se ha especificado un alias



      table
      El nombre de la tabla a la que pertenece este campo (si no ha sido calculado)



      orgtable
      El nombre original de la tabla si se ha especificado un alias



      def
      No utilizado. Siempre una string vacía



      db
      El nombre de la base de datos



      catalog
      No utilizado. Siempre "def"



      max_length
      La longitud máxima del campo para el conjunto de resultados. A partir de PHP 8.1, este valor es siempre 0.



      length

       El ancho del campo en bytes. Para las columnas de tipo string,
       el valor de longitud varía en función del juego de caracteres de la conexión.
       Por ejemplo, si el juego de caracteres es latin1, un juego de caracteres de un byte,
       el valor de longitud para una consulta SELECT 'abc' es 3.
       Si el juego de caracteres es utf8mb4, un juego de caracteres multibyte
       en el que los caracteres ocupan hasta 4 bytes, el valor de longitud es 12.




      charsetnr
      El número del juego de caracteres para este campo



      flags
      Un integer que representa los bit-flags para este campo



      type
      El tipo de datos utilizados para este campo



      decimals
      El número de decimales para los campos numéricos y la precisión de los segundos fraccionarios para los campos temporales.


### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("127.0.0.1", "root", "foofoo", "sakila");

/_ verificación de la conexión _/
if ($mysqli-&gt;connect_errno) {
printf("Fallo en la conexión: %s\n", $mysqli-&gt;connect_error);
exit();
}

foreach (array('latin1', 'utf8') as $charset) {

    // Establecer el juego de caracteres, para mostrar su impacto en ciertos valores (por ejemplo, longitudes en bytes)
    $mysqli-&gt;set_charset($charset);

    $query = "SELECT actor_id, last_name from actor ORDER BY actor_id";

    echo "============================\n";
    echo "Juego de caracteres: $charset\n";
    echo "============================\n";

    if ($result = $mysqli-&gt;query($query)) {

        /* Obtiene la información de los campos para todas las columnas */
        $finfo = $result-&gt;fetch_fields();

        foreach ($finfo as $val) {
            printf("Name:      %s\n",   $val-&gt;name);
            printf("Table:     %s\n",   $val-&gt;table);
            printf("Max. Len:  %d\n",   $val-&gt;max_length);
            printf("Length:    %d\n",   $val-&gt;length);
            printf("charsetnr: %d\n",   $val-&gt;charsetnr);
            printf("Flags:     %d\n",   $val-&gt;flags);
            printf("Type:      %d\n\n", $val-&gt;type);
        }
        $result-&gt;free();
    }

}
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("127.0.0.1", "my_user", "my_password", "sakila");

/_ verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

foreach (array('latin1', 'utf8') as $charset) {

    // Establecer el juego de caracteres, para mostrar su impacto en ciertos valores (por ejemplo, longitudes en bytes)
    mysqli_set_charset($link, $charset);

    $query = "SELECT actor_id, last_name from actor ORDER BY actor_id";

    echo "============================\n";
    echo "Juego de caracteres: $charset\n";
    echo "============================\n";

    if ($result = mysqli_query($link, $query)) {

        /* Obtiene la información de los campos para todas las columnas */
        $finfo = mysqli_fetch_fields($result);

        foreach ($finfo as $val) {
            printf("Name:      %s\n",   $val-&gt;name);
            printf("Table:     %s\n",   $val-&gt;table);
            printf("Max. Len:  %d\n",   $val-&gt;max_length);
            printf("Length:    %d\n",   $val-&gt;length);
            printf("charsetnr: %d\n",   $val-&gt;charsetnr);
            printf("Flags:     %d\n",   $val-&gt;flags);
            printf("Type:      %d\n\n", $val-&gt;type);
        }
        mysqli_free_result($result);
    }

}

mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

============================
Juego de caracteres: latin1
============================
Name: actor_id
Table: actor
Max. Len: 3
Length: 5
charsetnr: 63
Flags: 49699
Type: 2

Name: last_name
Table: actor
Max. Len: 12
Length: 45
charsetnr: 8
Flags: 20489
Type: 253

============================
Juego de caracteres: utf8
============================
Name: actor_id
Table: actor
Max. Len: 3
Length: 5
charsetnr: 63
Flags: 49699
Type: 2

Name: last_name
Table: actor
Max. Len: 12
Length: 135
charsetnr: 33
Flags: 20489

### Ver también

    - [mysqli_num_fields()](#mysqli-result.field-count) - Obtiene el número de campos en el conjunto de resultados

    - [mysqli_fetch_field_direct()](#mysqli-result.fetch-field-direct) - Obtiene los metadatos de un campo único

    - [mysqli_fetch_field()](#mysqli-result.fetch-field) - Devuelve el siguiente campo en el conjunto de resultados

# mysqli_result::fetch_object

# mysqli_fetch_object

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_object -- mysqli_fetch_object — Devuelve la siguiente fila de un conjunto de resultados como objeto

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_object**([string](#language.types.string) $class = "stdClass", [array](#language.types.array) $constructor_args = []): [object](#language.types.object)|[null](#language.types.null)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_object**([mysqli_result](#class.mysqli-result) $result, [string](#language.types.string) $class = "stdClass", [array](#language.types.array) $constructor_args = []): [object](#language.types.object)|[null](#language.types.null)|[false](#language.types.singleton)

Devuelve una fila de datos en el conjunto de resultados y la retorna como objeto,
donde cada propiedad representa el nombre de la columna del conjunto de resultados.
Cada llamada posterior a esta función retornará la siguiente fila en el conjunto de resultados,
o **[null](#constant.null)** si no hay más filas.

Si dos o más columnas del resultado tienen el mismo nombre,
la última columna tendrá prioridad y sobrescribirá todos los datos anteriores.
Para acceder a múltiples columnas con el mismo nombre, la [mysqli_fetch_row()](#mysqli-result.fetch-row)
puede ser utilizada para recuperar el array indexado numéricamente
o se pueden usar alias en la lista de selección de la consulta SQL para dar
nombres diferentes a las columnas.

**Nota**:

    Esta función afecta las propiedades del objeto
    antes de llamar a su constructor.

**Nota**: Los nombres de los campos devueltos por
esta función son _sensibles a la case_.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     class


       El nombre de la clase a instanciar.
       Si no se proporciona, se retornará un objeto [stdClass](#class.stdclass).






     constructor_args


       Un array de argumentos (opcional) a pasar al constructor de
       la clase class.





### Valores devueltos

Retorna un objeto que representa la fila recuperada,
donde cada propiedad representa el nombre de la columna del conjunto de resultados,
**[null](#constant.null)** si no hay más filas en el conjunto de resultados, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) cuando
constructor_args no está vacío y la clase no tiene constructor.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora se lanza una excepción [ValueError](#class.valueerror) cuando
       constructor_args no está vacío y la clase no tiene constructor;
       anteriormente, se lanzaba una excepción [Exception](#class.exception).




      8.0.0

       constructor_args ahora acepta
       [] para constructores con 0 parámetros;
       antes se lanzaba una excepción.



### Ejemplos

**Ejemplo #1 Ejemplo mysqli_result::fetch_object()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = $mysqli-&gt;query($query);

while ($obj = $result-&gt;fetch_object()) {
printf("%s (%s)\n", $obj-&gt;Name, $obj-&gt;CountryCode);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = mysqli_query($link, $query);

while ($obj = mysqli_fetch_object($result)) {
printf("%s (%s)\n", $obj-&gt;Name, $obj-&gt;CountryCode);
}

Los ejemplos anteriores mostrarán algo similar a:

Pueblo (USA)
Arvada (USA)
Cape Coral (USA)
Green Bay (USA)
Santa Clara (USA)

### Ver también

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc) - Recupera la siguiente fila de un conjunto de resultados como un array asociativo

    - [mysqli_fetch_column()](#mysqli-result.fetch-column) - Recupera una sola columna de la siguiente fila de un conjunto de resultados

    - [mysqli_fetch_row()](#mysqli-result.fetch-row) - Obtiene una fila de resultado como un array indexado

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_data_seek()](#mysqli-result.data-seek) - Mueve el puntero interno de resultado

# mysqli_result::fetch_row

# mysqli_fetch_row

(PHP 5, PHP 7, PHP 8)

mysqli_result::fetch_row -- mysqli_fetch_row — Obtiene una fila de resultado como un array indexado

### Descripción

Estilo orientado a objetos

public **mysqli_result::fetch_row**(): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Estilo procedimental

**mysqli_fetch_row**([mysqli_result](#class.mysqli-result) $result): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Obtiene una fila de datos del conjunto de resultados representado por
result y la devuelve como un array indexado, donde
cada columna es un elemento del array, comenzando en 0 (cero).
Cada nueva llamada a **mysqli_fetch_row()** devolverá la
siguiente fila en el conjunto de resultados, o **[null](#constant.null)** si no hay más
filas.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Devuelve un array enumerado que representa la fila obtenida,
**[null](#constant.null)** si no hay más filas en el conjunto de resultados, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo mysqli_result::fetch_row()**

Estilo orientado a objetos

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = $mysqli-&gt;query($query);

/_ Obtiene un array de objetos _/
while ($row = $result-&gt;fetch_row()) {
printf("%s (%s)\n", $row[0], $row[1]);
}

Estilo procedimental

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "my_user", "my_password", "world");

$query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";

$result = mysqli_query($mysqli, $query);

/_ Obtiene un array asociativo _/
while ($row = mysqli_fetch_row($result)) {
printf("%s (%s)\n", $row[0], $row[1]);
}

Los ejemplos anteriores mostrarán algo similar a:

Pueblo (USA)
Arvada (USA)
Cape Coral (USA)
Green Bay (USA)
Santa Clara (USA)

### Ver también

    - [mysqli_fetch_array()](#mysqli-result.fetch-array) - Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos

    - [mysqli_fetch_assoc()](#mysqli-result.fetch-assoc) - Recupera la siguiente fila de un conjunto de resultados como un array asociativo

    - [mysqli_fetch_column()](#mysqli-result.fetch-column) - Recupera una sola columna de la siguiente fila de un conjunto de resultados

    - [mysqli_fetch_object()](#mysqli-result.fetch-object) - Devuelve la siguiente fila de un conjunto de resultados como objeto

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_data_seek()](#mysqli-result.data-seek) - Mueve el puntero interno de resultado

# mysqli_result::$field_count

# mysqli_num_fields

(PHP 5, PHP 7, PHP 8)

mysqli_result::$field_count -- mysqli_num_fields — Obtiene el número de campos en el conjunto de resultados

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_result-&gt;field_count](#mysqli-result.field-count);

Estilo procedimental

**mysqli_num_fields**([mysqli_result](#class.mysqli-result) $result): [int](#language.types.integer)

Devuelve el número de campos en el conjunto de resultados.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Un [int](#language.types.integer) que representa el número de campos.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$result = $mysqli-&gt;query("SELECT Name, CountryCode, District, Population FROM City ORDER BY ID LIMIT 1");

/_ Determina el número de campos en el conjunto de resultados _/
$field_cnt = $result-&gt;field_count;

printf("El resultado tiene %d campos.\n", $field_cnt);
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$result = mysqli_query($link, "SELECT Name, CountryCode, District, Population FROM City ORDER BY ID LIMIT 1");

/_ Determina el número de campos en el conjunto de resultados _/
$field_cnt = mysqli_num_fields($result);

printf("El resultado tiene %d campos.\n", $field_cnt);
?&gt;

Los ejemplos anteriores mostrarán:

El resultado tiene 4 campos.

### Ver también

    - [mysqli_fetch_field()](#mysqli-result.fetch-field) - Devuelve el siguiente campo en el conjunto de resultados

# mysqli_result::field_seek

# mysqli_field_seek

(PHP 5, PHP 7, PHP 8)

mysqli_result::field_seek -- mysqli_field_seek — Desplaza el puntero de resultado al campo especificado

### Descripción

Estilo orientado a objetos

public **mysqli_result::field_seek**([int](#language.types.integer) $index): [true](#language.types.singleton)

Estilo procedimental

**mysqli_field_seek**([mysqli_result](#class.mysqli-result) $result, [int](#language.types.integer) $index): [true](#language.types.singleton)

Coloca el cursor en el campo especificado por el número
index. La próxima llamada a la función
[mysqli_fetch_field()](#mysqli-result.fetch-field) devolverá la definición del
campo de la columna asociada a esta posición.

**Nota**:

    Para moverse al inicio de una fila, pase una posición con valor cero.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

     index


       El número del campo. Este valor debe estar en el intervalo
       0 a número de campos - 1.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función devuelve ahora siempre **[true](#constant.true)**. Anteriormente, devolvía **[false](#constant.false)** en caso de fallo.





### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = $mysqli-&gt;query($query)) {

    /* Obtención de información del campo para la 2ª columna */
    $result-&gt;field_seek(1);
    $finfo = $result-&gt;fetch_field();

    printf("Name:     %s\n", $finfo-&gt;name);
    printf("Table:    %s\n", $finfo-&gt;table);
    printf("max. Len: %d\n", $finfo-&gt;max_length);
    printf("Flags:    %d\n", $finfo-&gt;flags);
    printf("Type:     %d\n\n", $finfo-&gt;type);

    $result-&gt;close();

}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT Name, SurfaceArea from Country ORDER BY Code LIMIT 5";

if ($result = mysqli_query($link, $query)) {

    /* Obtención de información del campo para la 2ª columna */
    mysqli_field_seek($result, 1);
    $finfo = mysqli_fetch_field($result);

    printf("Name:     %s\n", $finfo-&gt;name);
    printf("Table:    %s\n", $finfo-&gt;table);
    printf("max. Len: %d\n", $finfo-&gt;max_length);
    printf("Flags:    %d\n", $finfo-&gt;flags);
    printf("Type:     %d\n\n", $finfo-&gt;type);

    mysqli_free_result($result);

}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

Name: SurfaceArea
Table: Country
max. Len: 10
Flags: 32769
Type: 4

### Ver también

    - [mysqli_fetch_field()](#mysqli-result.fetch-field) - Devuelve el siguiente campo en el conjunto de resultados

# mysqli_result::free

# mysqli_result::close

# mysqli_result::free_result

# mysqli_free_result

(PHP 5, PHP 7, PHP 8)

mysqli_result::free -- mysqli_result::close -- mysqli_result::free_result -- mysqli_free_result — Libera la memoria asociada a un resultado

### Descripción

Estilo orientado a objetos

public **mysqli_result::free**(): [void](language.types.void.html)

public **mysqli_result::close**(): [void](language.types.void.html)

public **mysqli_result::free_result**(): [void](language.types.void.html)

Estilo procedimental

**mysqli_free_result**([mysqli_result](#class.mysqli-result) $result): [void](language.types.void.html)

Libera la memoria asociada a un resultado.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_stmt_get_result()](#mysqli-stmt.get-result) - Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

# mysqli_result::getIterator

(PHP 8)

mysqli_result::getIterator — Devuelve un iterador externo

### Descripción

public **mysqli_result::getIterator**(): [Iterator](#class.iterator)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# mysqli_result::$lengths

# mysqli_fetch_lengths

(PHP 5, PHP 7, PHP 8)

mysqli_result::$lengths -- mysqli_fetch_lengths — Devuelve la longitud de las columnas de la fila actual del conjunto de resultados

### Descripción

Estilo orientado a objetos

?[array](#language.types.array) [$mysqli_result-&gt;lengths](#mysqli-result.lengths);

Estilo procedimental

**mysqli_fetch_lengths**([mysqli_result](#class.mysqli-result) $result): [array](#language.types.array)|[false](#language.types.singleton)

La función **mysqli_fetch_lengths()** devuelve un array
que contiene la longitud de cada columna de la fila actual del conjunto de
resultados representado por el argumento result.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Un array de integers que representan el tamaño de cada columna (sin incluir
ningún carácter null de final). Devuelve **[false](#constant.false)** si ocurre un error.

**mysqli_fetch_lengths()** solo es válido para la fila actual del
conjunto de resultados. Devuelve **[false](#constant.false)** si se llama antes de las funciones
[mysqli_fetch_row()](#mysqli-result.fetch-row), [mysqli_fetch_array()](#mysqli-result.fetch-array),
[mysqli_fetch_object()](#mysqli-result.fetch-object)
o después de haber recuperado todas las filas del resultado.

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$mysqli = new mysqli("localhost", "mon_user", "mon_mot_de_passe", "la_base");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT \* from Country ORDER BY Code LIMIT 1";

if ($result = $mysqli-&gt;query($query)) {

    $row = $result-&gt;fetch_row();

    /* Visualización de la longitud de las columnas */
    foreach ($result-&gt;lengths as $i =&gt; $val) {
        printf("El campo n°%2d tiene una longitud de %2d\n", $i+1, $val);
    }
    $result-&gt;close();

}

/_ Cierra la conexión _/
$mysqli-&gt;close();
?&gt;

**Ejemplo #2 Estilo procedimental**

&lt;?php
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/_ Verificación de la conexión _/
if (mysqli_connect_errno()) {
printf("Fallo en la conexión: %s\n", mysqli_connect_error());
exit();
}

$query = "SELECT \* from Country ORDER BY Code LIMIT 1";

if ($result = mysqli_query($link, $query)) {

    $row = mysqli_fetch_row($result);

    /* Visualización de la longitud de las columnas */
    foreach (mysqli_fetch_lengths($result) as $i =&gt; $val) {
        printf("El campo n°%2d tiene una longitud de %2d\n", $i+1, $val);
    }
    mysqli_free_result($result);

}

/_ Cierra la conexión _/
mysqli_close($link);
?&gt;

Los ejemplos anteriores mostrarán:

El campo n° 1 tiene una longitud de 3
El campo n° 2 tiene una longitud de 5
El campo n° 3 tiene una longitud de 13
El campo n° 4 tiene una longitud de 9
El campo n° 5 tiene una longitud de 6
El campo n° 6 tiene una longitud de 1
El campo n° 7 tiene una longitud de 6
El campo n° 8 tiene una longitud de 4
El campo n° 9 tiene una longitud de 6
El campo n°10 tiene una longitud de 6
El campo n°11 tiene una longitud de 5
El campo n°12 tiene una longitud de 44
El campo n°13 tiene una longitud de 7
El campo n°14 tiene una longitud de 3
El campo n°15 tiene una longitud de 2

# mysqli_result::$num_rows

# mysqli_num_rows

(PHP 5, PHP 7, PHP 8)

mysqli_result::$num_rows -- mysqli_num_rows — Devuelve el número de filas en el conjunto de resultados

### Descripción

Estilo orientado a objetos

[int](#language.types.integer)|[string](#language.types.string) [$mysqli_result-&gt;num_rows](#mysqli-result.num-rows);

Estilo procedimental

**mysqli_num_rows**([mysqli_result](#class.mysqli-result) $result): [int](#language.types.integer)|[string](#language.types.string)

Devuelve el número de filas en un conjunto de resultados.

El comportamiento de **mysqli_num_rows()** depende del uso de
conjuntos de resultados almacenados en búfer o no.
Esta función devuelve 0 para conjuntos de resultados no almacenados en búfer,
a menos que todas las filas hayan sido recuperadas del servidor.

### Parámetros

resultSolo estilo procedimental: Un objeto [mysqli_result](#class.mysqli-result)
devuelto por [mysqli_query()](#mysqli.query), [mysqli_store_result()](#mysqli.store-result),
[mysqli_use_result()](#mysqli.use-result) o [mysqli_stmt_get_result()](#mysqli-stmt.get-result).

### Valores devueltos

Un [int](#language.types.integer) que representa el número de filas recuperadas.
Devuelve 0 en modo no almacenado en búfer,
a menos que todas las filas hayan sido recuperadas desde el servidor.

**Nota**:

Si el número de filas es mayor que **[PHP_INT_MAX](#constant.php-int-max)**,
el número será devuelto como un [string](#language.types.string).

### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$result = $mysqli-&gt;query("SELECT Code, Name FROM Country ORDER BY Name");

/_ Determina el número de filas del conjunto de resultados _/
$row_cnt = $result-&gt;num_rows;

printf("El conjunto de resultados tiene %d filas.\n", $row_cnt);

**Ejemplo #2 Estilo procedimental**

&lt;?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$result = mysqli_query($link, "SELECT Code, Name FROM Country ORDER BY Name");

/_ Determina el número de filas del conjunto de resultados _/
$row_cnt = mysqli_num_rows($result);

printf("El conjunto de resultados tiene %d filas.\n", $row_cnt);
?&gt;

Los ejemplos anteriores mostrarán:

El conjunto de resultados tiene 239 filas.

### Notas

**Nota**:

    A diferencia de la función [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows),
    esta función no tiene una variante de método orientado a objetos.
    En el estilo orientado a objetos, se debe utilizar el getter de la propiedad.

### Ver también

    - [mysqli_affected_rows()](#mysqli.affected-rows) - Devuelve el número de filas afectadas por la última operación MySQL

    - [mysqli_store_result()](#mysqli.store-result) - Transfiere un conjunto de resultados desde la última consulta

    - [mysqli_use_result()](#mysqli.use-result) - Inicializa la recuperación de un conjunto de resultados

    - [mysqli_query()](#mysqli.query) - Ejecuta una consulta en la base de datos

    - [mysqli_stmt_num_rows()](#mysqli-stmt.num-rows) - Devuelve el número de filas recuperadas del servidor

## Tabla de contenidos

- [mysqli_result::\_\_construct](#mysqli-result.construct) — Construye un objeto mysqli_result
- [mysqli_result::$current_field](#mysqli-result.current-field) — Obtiene la posición actual de un campo en un puntero de resultado
- [mysqli_result::data_seek](#mysqli-result.data-seek) — Mueve el puntero interno de resultado
- [mysqli_result::fetch_all](#mysqli-result.fetch-all) — Recupera todas las filas de resultados en un array asociativo, numérico o ambos
- [mysqli_result::fetch_array](#mysqli-result.fetch-array) — Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos
- [mysqli_result::fetch_assoc](#mysqli-result.fetch-assoc) — Recupera la siguiente fila de un conjunto de resultados como un array asociativo
- [mysqli_result::fetch_column](#mysqli-result.fetch-column) — Recupera una sola columna de la siguiente fila de un conjunto de resultados
- [mysqli_result::fetch_field](#mysqli-result.fetch-field) — Devuelve el siguiente campo en el conjunto de resultados
- [mysqli_result::fetch_field_direct](#mysqli-result.fetch-field-direct) — Obtiene los metadatos de un campo único
- [mysqli_result::fetch_fields](#mysqli-result.fetch-fields) — Devuelve un array de objetos que representan los campos en el resultado
- [mysqli_result::fetch_object](#mysqli-result.fetch-object) — Devuelve la siguiente fila de un conjunto de resultados como objeto
- [mysqli_result::fetch_row](#mysqli-result.fetch-row) — Obtiene una fila de resultado como un array indexado
- [mysqli_result::$field_count](#mysqli-result.field-count) — Obtiene el número de campos en el conjunto de resultados
- [mysqli_result::field_seek](#mysqli-result.field-seek) — Desplaza el puntero de resultado al campo especificado
- [mysqli_result::free](#mysqli-result.free) — Libera la memoria asociada a un resultado
- [mysqli_result::getIterator](#mysqli-result.getiterator) — Devuelve un iterador externo
- [mysqli_result::$lengths](#mysqli-result.lengths) — Devuelve la longitud de las columnas de la fila actual del conjunto de resultados
- [mysqli_result::$num_rows](#mysqli-result.num-rows) — Devuelve el número de filas en el conjunto de resultados

# La clase mysqli_driver

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **mysqli_driver** es una instancia del patrón
    monostate, es decir, solo hay un driver que puede ser accedido a través de un
    número arbitrario de instancias **mysqli_driver**.

## Sinopsis de la Clase

     final
     class **mysqli_driver**
     {

    /* Propiedades */

     public
     readonly
     [string](#language.types.string)
      [$client_info](#mysqli-driver.props.client-info);

    public
     readonly
     [int](#language.types.integer)
      [$client_version](#mysqli-driver.props.client-version);

    public
     readonly
     [int](#language.types.integer)
      [$driver_version](#mysqli-driver.props.driver-version);

    public
     [int](#language.types.integer)
      [$report_mode](#mysqli-driver.props.report-mode);

}

## Propiedades

     client_info

      La versión del encabezado de la API del cliente





     client_version

      La versión del cliente





     driver_version

      La versión del driver MySQLi


      **Advertencia**

        Esta propiedad está *obsoleta* a partir de PHP 8.1.0.
        Se desaconseja encarecidamente depender de esta propiedad.







     embedded

      Si el soporte "MySQLi Embedded" está activado


      **Advertencia**

        Esta propiedad ha sido *eliminada* a partir de PHP 8.0.0.







     reconnect

      Permite o no la reconexión (ver la directiva INI mysqli.reconnect)





     report_mode


       Se establece en **[MYSQLI_REPORT_OFF](#constant.mysqli-report-off)**,
       **[MYSQLI_REPORT_ALL](#constant.mysqli-report-all)** o cualquier combinación de
       **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)** (lanza excepciones en caso de errores),
       **[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)** (reporta errores) y
       **[MYSQLI_REPORT_INDEX](#constant.mysqli-report-index)** (errores en los índices).
       Ver también [mysqli_report()](#function.mysqli-report).





# mysqli_driver::embedded_server_end

# mysqli_embedded_server_end

(PHP 5 &gt;= 5.1.0, PHP 7 &lt; 7.4.0)

mysqli_driver::embedded_server_end -- mysqli_embedded_server_end — Detiene el servidor embebido

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

Estilo orientado a objetos

public **mysqli_driver::embedded_server_end**(): [void](language.types.void.html)

Estilo procedimental

**mysqli_embedded_server_end**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# mysqli_driver::embedded_server_start

# mysqli_embedded_server_start

(PHP 5 &gt;= 5.1.0, PHP 7 &lt; 7.4.0)

mysqli_driver::embedded_server_start -- mysqli_embedded_server_start — Inicializa e inicia el servidor embebido

**Advertencia**
Esta función ha sido _ELIMINADA_ a partir de PHP 7.4.0.

### Descripción

Estilo orientado a objetos

public **mysqli_driver::embedded_server_start**([int](#language.types.integer) $start, [array](#language.types.array) $arguments, [array](#language.types.array) $groups): [bool](#language.types.boolean)

Estilo procedimental

**mysqli_embedded_server_start**([int](#language.types.integer) $start, [array](#language.types.array) $arguments, [array](#language.types.array) $groups): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# mysqli_driver::$report_mode

# mysqli_report

(PHP 5, PHP 7, PHP 8)

mysqli_driver::$report_mode -- mysqli_report — Define el modo de informe de errores de mysqli

### Descripción

Estilo orientado a objetos

[int](#language.types.integer) [$mysqli_driver-&gt;report_mode](#mysqli-driver.report-mode);

Estilo procedimental

[mysqli_report](#function.mysqli-report)([int](#language.types.integer) $flags): [true](#language.types.singleton)

Según los flags, esto define el modo de informe de errores de mysqli
a excepción, advertencia o ninguno.
Cuando se define como **[MYSQLI_REPORT_ALL](#constant.mysqli-report-all)** o **[MYSQLI_REPORT_INDEX](#constant.mysqli-report-index)**
esto también informará sobre consultas que no utilizan un índice
(o un índice incorrecto).

A partir de PHP 8.1.0, el valor por omisión es MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT.
Anteriormente, era **[MYSQLI_REPORT_OFF](#constant.mysqli-report-off)**.

### Parámetros

     flags





        <caption>**Flags admitidos**</caption>



           Nombre
           Descripción






           **[MYSQLI_REPORT_OFF](#constant.mysqli-report-off)**
           Desactiva los informes (valor por omisión)



           **[MYSQLI_REPORT_ERROR](#constant.mysqli-report-error)**
           Informa sobre errores desde llamadas a funciones mysqli



           **[MYSQLI_REPORT_STRICT](#constant.mysqli-report-strict)**

            Lanza una excepción [mysqli_sql_exception](#class.mysqli-sql-exception)
            para errores, en lugar de emitir alertas




           **[MYSQLI_REPORT_INDEX](#constant.mysqli-report-index)**
           Informa si no se utiliza ningún índice o un índice incorrecto
            en una consulta



           **[MYSQLI_REPORT_ALL](#constant.mysqli-report-all)**
           Define todas las opciones (informa sobre todo)









### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El valor por omisión es ahora MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT.
       Anteriormente, era **[MYSQLI_REPORT_OFF](#constant.mysqli-report-off)**.



### Ejemplos

**Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ Activación del informe de errores _/
$driver = new mysqli_driver();
$driver-&gt;report_mode = MYSQLI_REPORT_ALL;

try {
/_ si la conexión falla, se lanzará una mysqli_sql_exception _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");

    /* esta consulta debería informar sobre un error */
    $result = $mysqli-&gt;query("SELECT Name FROM Nonexistingtable WHERE population &gt; 50000");

    /* esta consulta debería informar sobre un índice incorrecto, si la columna population no tiene un índice */
    $result = $mysqli-&gt;query("SELECT Name FROM City WHERE population &gt; 50000");

} catch (mysqli_sql_exception $e) {
    error_log($e-&gt;\_\_toString());
}

**Ejemplo #2 Estilo procedimental**

&lt;?php

/_ Activación del informe de errores _/
mysqli_report(MYSQLI_REPORT_ALL);

try {
/_ si la conexión falla, se lanzará una excepción mysqli_sql_exception _/
$link = mysqli_connect("localhost", "my_user", "my_password", "my_db");

    /* esta consulta debería informar sobre un error */
    $result = mysqli_query($link, "SELECT Name FROM Nonexistingtable WHERE population &gt; 50000");

    /* esta consulta debería informar sobre un índice incorrecto, si la columna population no tiene un índice */
    $result = mysqli_query($link, "SELECT Name FROM City WHERE population &gt; 50000");

} catch (mysqli_sql_exception $e) {
    error_log($e-&gt;\_\_toString());
}

**Ejemplo #3 Informe de errores a excepción de errores de índice incorrecto**

&lt;?php

/_ Activación del informe de errores _/
$driver = new mysqli_driver();
$driver-&gt;report_mode = MYSQLI_REPORT_ALL;

try {
/_ si la conexión falla, se lanzará una mysqli_sql_exception _/
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");

    /* esta consulta debería informar sobre un error */
    $result = $mysqli-&gt;query("SELECT Name FROM Nonexistingtable WHERE population &gt; 50000");

    /* esto NO emitirá un error incluso si no hay ningún índice disponible */
    $result = $mysqli-&gt;query("SELECT Name FROM City WHERE population &gt; 50000");

} catch (mysqli_sql_exception $e) {
    error_log($e-&gt;\_\_toString());
}

### Ver también

    - [mysqli_sql_exception](#class.mysqli-sql-exception)

    - [set_exception_handler()](#function.set-exception-handler) - Define una función de usuario para gestionar excepciones

    - [error_reporting()](#function.error-reporting) - Establece el nivel de reporte de errores de PHP

## Tabla de contenidos

- [mysqli_driver::embedded_server_end](#mysqli-driver.embedded-server-end) — Detiene el servidor embebido
- [mysqli_driver::embedded_server_start](#mysqli-driver.embedded-server-start) — Inicializa e inicia el servidor embebido
- [mysqli_driver::$report_mode](#mysqli-driver.report-mode) — Define el modo de informe de errores de mysqli

# La clase mysqli_warning

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa una advertencia de MySQL.

## Sinopsis de la Clase

     final
     class **mysqli_warning**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$message](#mysqli-warning.props.message);

    public
     [string](#language.types.string)
      [$sqlstate](#mysqli-warning.props.sqlstate);

    public
     [int](#language.types.integer)
      [$errno](#mysqli-warning.props.errno);


    /* Métodos */

private [\_\_construct](#mysqli-warning.construct)()

    public [next](#mysqli-warning.next)(): [bool](#language.types.boolean)

}

## Propiedades

     message

      El mensaje





     sqlstate

      El estado SQL





     errno

      El número del error




# mysqli_warning::\_\_construct

(PHP 5, PHP 7, PHP 8)

mysqli_warning::\_\_construct — Constructor privado para evitar la instanciación directa

### Descripción

private **mysqli_warning::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# mysqli_warning::next

(PHP 5, PHP 7, PHP 8)

mysqli_warning::next — Obtiene el siguiente aviso

### Descripción

public **mysqli_warning::next**(): [bool](#language.types.boolean)

Modifica la información del aviso al siguiente aviso si es posible.

Una vez que el aviso se ha establecido en el siguiente aviso,
nuevos valores para las propiedades message,
sqlstate y errno de
[mysqli_warning](#class.mysqli-warning) están disponibles.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si el siguiente aviso se ha recuperado con éxito.
Si no hay más avisos, retornará **[false](#constant.false)**.

## Tabla de contenidos

- [mysqli_warning::\_\_construct](#mysqli-warning.construct) — Constructor privado para evitar la instanciación directa
- [mysqli_warning::next](#mysqli-warning.next) — Obtiene el siguiente aviso

# La clase mysqli_sql_exception

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase de gestión de excepciones mysqli.

## Sinopsis de la Clase

     final
     class **mysqli_sql_exception**



     extends
      [RuntimeException](#class.runtimeexception)
     {

    /* Propiedades */

     protected
     [string](#language.types.string)
      [$sqlstate](#mysqli-sql-exception.props.sqlstate) = "00000";


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

    /* Métodos */

public [getSqlState](#mysqli-sql-exception.getsqlstate)(): [string](#language.types.string)

    /* Métodos heredados */
    public [Exception::__construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

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

## Propiedades

     sqlstate


       El estado SQL con el error.





# mysqli_sql_exception::getSqlState

(PHP 8 &gt;= 8.1.2)

mysqli_sql_exception::getSqlState — Devuelve el código de error SQLSTATE

### Descripción

public **mysqli_sql_exception::getSqlState**(): [string](#language.types.string)

Devuelve un string que contiene el código de error SQLSTATE para el último error.
El código de error está compuesto por cinco caracteres.
Los valores están especificados por ANSI SQL y ODBC. Para una lista de los valores posibles, ver
[» http://dev.mysql.com/doc/mysql/en/error-handling.html](http://dev.mysql.com/doc/mysql/en/error-handling.html).

**Nota**:

    Cabe señalar que no todos los errores de MySQL están mapeados a SQLSTATE.
    El valor HY000 (error general) se utiliza para los errores no mapeados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene el código de error SQLSTATE para el último error. El código de error está compuesto por cinco caracteres.

## Tabla de contenidos

- [mysqli_sql_exception::getSqlState](#mysqli-sql-exception.getsqlstate) — Devuelve el código de error SQLSTATE

# Funciones mysqli obsoletas y alias

# mysqli_connect

(PHP 5, PHP 7, PHP 8)

mysqli_connect — Alias de [mysqli::\_\_construct()](#mysqli.construct)

### Descripción

Esta función es un alias de: [mysqli::\_\_construct()](#mysqli.construct)

**Nota**:

    Si el modo de excepción mysqli no está activado y una conexión falla,
    entonces **mysqli_connect()** retorna **[false](#constant.false)** en lugar de un objeto.
    La función [mysqli_connect_error()](#mysqli.connect-error) puede ser utilizada para
    recuperar el error de conexión.

# mysqli::escape_string

# mysqli_escape_string

(PHP 5, PHP 7, PHP 8)

mysqli::escape_string -- mysqli_escape_string — Alias de [mysqli_real_escape_string()](#mysqli.real-escape-string)

### Descripción

Esta función es un alias de: [mysqli_real_escape_string()](#mysqli.real-escape-string).

# mysqli_execute

(PHP 5, PHP 7, PHP 8)

mysqli_execute — Alias de [mysqli_stmt_execute()](#mysqli-stmt.execute)

### Descripción

Esta función es un alias de: [mysqli_stmt_execute()](#mysqli-stmt.execute).

### Notas

**Nota**:

    **mysqli_execute()** está fuertemente desaconsejada y debería
    ser eliminada próximamente.

### Ver también

    - [mysqli_stmt_execute()](#mysqli-stmt.execute) - Ejecuta una consulta preparada

# mysqli_get_client_stats

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

mysqli_get_client_stats — Devuelve las estadísticas del cliente por proceso

### Descripción

**mysqli_get_client_stats**(): [array](#language.types.array)

Devuelve las estadísticas del cliente por proceso.

**Nota**:

    Disponible solo con [mysqlnd](#book.mysqlnd).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con las estadísticas del cliente.

### Ejemplos

    **Ejemplo #1 Un ejemplo con mysqli_get_client_stats()**

&lt;?php
$link = mysqli_connect();
print_r(mysqli_get_client_stats());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[bytes_sent] =&gt; 43
[bytes_received] =&gt; 80
[packets_sent] =&gt; 1
[packets_received] =&gt; 2
[protocol_overhead_in] =&gt; 8
[protocol_overhead_out] =&gt; 4
[bytes_received_ok_packet] =&gt; 11
[bytes_received_eof_packet] =&gt; 0
[bytes_received_rset_header_packet] =&gt; 0
[bytes_received_rset_field_meta_packet] =&gt; 0
[bytes_received_rset_row_packet] =&gt; 0
[bytes_received_prepare_response_packet] =&gt; 0
[bytes_received_change_user_packet] =&gt; 0
[packets_sent_command] =&gt; 0
[packets_received_ok] =&gt; 1
[packets_received_eof] =&gt; 0
[packets_received_rset_header] =&gt; 0
[packets_received_rset_field_meta] =&gt; 0
[packets_received_rset_row] =&gt; 0
[packets_received_prepare_response] =&gt; 0
[packets_received_change_user] =&gt; 0
[result_set_queries] =&gt; 0
[non_result_set_queries] =&gt; 0
[no_index_used] =&gt; 0
[bad_index_used] =&gt; 0
[slow_queries] =&gt; 0
[buffered_sets] =&gt; 0
[unbuffered_sets] =&gt; 0
[ps_buffered_sets] =&gt; 0
[ps_unbuffered_sets] =&gt; 0
[flushed_normal_sets] =&gt; 0
[flushed_ps_sets] =&gt; 0
[ps_prepared_never_executed] =&gt; 0
[ps_prepared_once_executed] =&gt; 0
[rows_fetched_from_server_normal] =&gt; 0
[rows_fetched_from_server_ps] =&gt; 0
[rows_buffered_from_client_normal] =&gt; 0
[rows_buffered_from_client_ps] =&gt; 0
[rows_fetched_from_client_normal_buffered] =&gt; 0
[rows_fetched_from_client_normal_unbuffered] =&gt; 0
[rows_fetched_from_client_ps_buffered] =&gt; 0
[rows_fetched_from_client_ps_unbuffered] =&gt; 0
[rows_fetched_from_client_ps_cursor] =&gt; 0
[rows_skipped_normal] =&gt; 0
[rows_skipped_ps] =&gt; 0
[copy_on_write_saved] =&gt; 0
[copy_on_write_performed] =&gt; 0
[command_buffer_too_small] =&gt; 0
[connect_success] =&gt; 1
[connect_failure] =&gt; 0
[connection_reused] =&gt; 0
[reconnect] =&gt; 0
[pconnect_success] =&gt; 0
[active_connections] =&gt; 1
[active_persistent_connections] =&gt; 0
[explicit_close] =&gt; 0
[implicit_close] =&gt; 0
[disconnect_close] =&gt; 0
[in_middle_of_command_close] =&gt; 0
[explicit_free_result] =&gt; 0
[implicit_free_result] =&gt; 0
[explicit_stmt_close] =&gt; 0
[implicit_stmt_close] =&gt; 0
[mem_emalloc_count] =&gt; 0
[mem_emalloc_ammount] =&gt; 0
[mem_ecalloc_count] =&gt; 0
[mem_ecalloc_ammount] =&gt; 0
[mem_erealloc_count] =&gt; 0
[mem_erealloc_ammount] =&gt; 0
[mem_efree_count] =&gt; 0
[mem_malloc_count] =&gt; 0
[mem_malloc_ammount] =&gt; 0
[mem_calloc_count] =&gt; 0
[mem_calloc_ammount] =&gt; 0
[mem_realloc_count] =&gt; 0
[mem_realloc_ammount] =&gt; 0
[mem_free_count] =&gt; 0
[proto_text_fetched_null] =&gt; 0
[proto_text_fetched_bit] =&gt; 0
[proto_text_fetched_tinyint] =&gt; 0
[proto_text_fetched_short] =&gt; 0
[proto_text_fetched_int24] =&gt; 0
[proto_text_fetched_int] =&gt; 0
[proto_text_fetched_bigint] =&gt; 0
[proto_text_fetched_decimal] =&gt; 0
[proto_text_fetched_float] =&gt; 0
[proto_text_fetched_double] =&gt; 0
[proto_text_fetched_date] =&gt; 0
[proto_text_fetched_year] =&gt; 0
[proto_text_fetched_time] =&gt; 0
[proto_text_fetched_datetime] =&gt; 0
[proto_text_fetched_timestamp] =&gt; 0
[proto_text_fetched_string] =&gt; 0
[proto_text_fetched_blob] =&gt; 0
[proto_text_fetched_enum] =&gt; 0
[proto_text_fetched_set] =&gt; 0
[proto_text_fetched_geometry] =&gt; 0
[proto_text_fetched_other] =&gt; 0
[proto_binary_fetched_null] =&gt; 0
[proto_binary_fetched_bit] =&gt; 0
[proto_binary_fetched_tinyint] =&gt; 0
[proto_binary_fetched_short] =&gt; 0
[proto_binary_fetched_int24] =&gt; 0
[proto_binary_fetched_int] =&gt; 0
[proto_binary_fetched_bigint] =&gt; 0
[proto_binary_fetched_decimal] =&gt; 0
[proto_binary_fetched_float] =&gt; 0
[proto_binary_fetched_double] =&gt; 0
[proto_binary_fetched_date] =&gt; 0
[proto_binary_fetched_year] =&gt; 0
[proto_binary_fetched_time] =&gt; 0
[proto_binary_fetched_datetime] =&gt; 0
[proto_binary_fetched_timestamp] =&gt; 0
[proto_binary_fetched_string] =&gt; 0
[proto_binary_fetched_blob] =&gt; 0
[proto_binary_fetched_enum] =&gt; 0
[proto_binary_fetched_set] =&gt; 0
[proto_binary_fetched_geometry] =&gt; 0
[proto_binary_fetched_other] =&gt; 0
)

### Ver también

    - [Descripción de las estadísticas](#mysqlnd.stats)

# mysqli_get_links_stats

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

mysqli_get_links_stats — Devuelve información sobre los enlaces abiertos y almacenados en caché

### Descripción

**mysqli_get_links_stats**(): [array](#language.types.array)

La función **mysqli_get_links_stats()** devuelve información sobre los enlaces MySQL abiertos y almacenados en caché.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La función **mysqli_get_links_stats()** devuelve un array asociativo que contiene tres elementos, cuyas claves son las siguientes:

     total


       Un [int](#language.types.integer) que indica el número total de enlaces abiertos, independientemente de su estado.






     active_plinks


       Un [int](#language.types.integer) que representa el número de conexiones persistentes activas.






     cached_plinks


       Un [int](#language.types.integer) que representa el número de conexiones persistentes inactivas.





# mysqli_report

(PHP 5, PHP 7, PHP 8)

mysqli_report — Alias de [mysqli_driver-&gt;report_mode](#mysqli-driver.report-mode)

### Descripción

    Esta función es un alias de:  [mysqli_driver-&gt;report_mode](#mysqli-driver.report-mode)

# mysqli::set_opt

# mysqli_set_opt

(PHP 5, PHP 7, PHP 8)

mysqli::set_opt -- mysqli_set_opt — Alias de [mysqli_options()](#mysqli.options)

### Descripción

Esta función es un alias de: [mysqli_options()](#mysqli.options).

## Tabla de contenidos

- [mysqli_connect](#function.mysqli-connect) — Alias de mysqli::\_\_construct
- [mysqli::escape_string](#function.mysqli-escape-string) — Alias de mysqli_real_escape_string
- [mysqli_execute](#function.mysqli-execute) — Alias de mysqli_stmt_execute
- [mysqli_get_client_stats](#function.mysqli-get-client-stats) — Devuelve las estadísticas del cliente por proceso
- [mysqli_get_links_stats](#function.mysqli-get-links-stats) — Devuelve información sobre los enlaces abiertos y almacenados en caché
- [mysqli_report](#function.mysqli-report) — Alias de mysqli_driver-&gt;report_mode
- [mysqli::set_opt](#function.mysqli-set-opt) — Alias de mysqli_options

# Registro de cambios

A las clases/funciones/métodos de esta extensión se han realizado los siguientes cambios.

VersionFunctionDescription8.4.0[mysqli::kill](#mysqli.kill)Los métodos mysqli::kill y
mysqli_kill están ahora obsoletos. Se recomienda
utilizar el comando SQL KILL. [mysqli::ping](#mysqli.ping)Los métodos mysqli::ping y
mysqli_ping están ahora obsoletos.
La funcionalidad reconnect ya no está
disponible desde PHP 8.2.0, lo que hace que esta función sea obsoleta. [mysqli::refresh](#mysqli.refresh)Los métodos mysqli::refresh y mysqli_refresh están ahora obsoletos. Utilice los comandos SQL FLUSH en su lugar. [mysqli::store_result](#mysqli.store-result)El paso del argumento mode está ahora obsoleto.
Este argumento no ha tenido ningún efecto desde PHP 8.1.0.8.3.0[mysqli_result::fetch_object](#mysqli-result.fetch-object)Ahora se lanza una excepción ValueError cuando
constructor_args no está vacío y la clase no tiene constructor;
anteriormente, se lanzaba una excepción Exception. [mysqli::poll](#mysqli.poll)Ahora lanza una excepción ValueError cuando ni
el argumento read ni el argumento error son transmitidos.8.1.0[mysqli_driver::$report_mode](#mysqli-driver.report-mode)El valor por omisión es ahora MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT.
Anteriormente, era MYSQLI_REPORT_OFF. [mysqli_result::fetch_all](#mysqli-result.fetch-all)Ahora también disponible al vincular con libmysqlclient. [mysqli_stmt::execute](#mysqli-stmt.execute)El parámetro opcional params ha sido añadido. [mysqli_stmt::next_result](#mysqli-stmt.next-result)Ahora también disponible al enlazar con libmysqlclient. [mysqli::\_\_construct](#mysqli.construct)mysqli::connect ahora devuelve true en lugar de null en caso de éxito. [mysqli::$client_info](#mysqli.get-client-info)La llamada a la mysqli_get_client_info con el argumento mysql ha sido deprecada.
Esta función nunca ha requerido un parámetro, pero lo ha permitido de manera incorrecta como parámetro opcional. [mysqli::$client_info](#mysqli.get-client-info)El estilo orientado a objetos mysqli::get_client_info ha sido deprecado. [mysqli::init](#mysqli.init)El método mysqli::init de estilo orientado a objetos ha sido deprecado.
Reemplace las llamadas a parent::init por parent::**construct.8.0.0[mysqli_result::fetch_object](#mysqli-result.fetch-object)constructor_args ahora acepta
[] para constructores con 0 parámetros;
antes se lanzaba una excepción. [mysqli_result::field_seek](#mysqli-result.field-seek)Esta función devuelve ahora siempre true. Anteriormente, devolvía false en caso de fallo. [mysqli_stmt::close](#mysqli-stmt.close)Esta función ahora siempre devuelve true. Anteriormente, devolvía false en caso de fallo. [mysqli_stmt::**construct](#mysqli-stmt.construct)query ahora es nullable. [mysqli::begin_transaction](#mysqli.begin-transaction)name ahora es nullable. [mysqli::close](#mysqli.close)Esta función ahora siempre devuelve true. Anteriormente, devolvía false en caso de fallo. [mysqli::commit](#mysqli.commit)name es ahora nullable. [mysqli::debug](#mysqli.debug)Esta función devuelve ahora siempre true. Anteriormente, devolvía false en caso de error. [mysqli::rollback](#mysqli.rollback)name ahora puede ser nullable.7.4.0[mysqli::\_\_construct](#mysqli.construct)Todos los parámetros ahora son nullable. [mysqli::real_connect](#mysqli.real-connect)Todos los parámetros son ahora nullable.

- [Introducción](#intro.mysqli)
- [Introducción](#mysqli.overview)
- [Guía de inicio rápido](#mysqli.quickstart)<li>[Interfaces procedimentales y orientadas a objetos](#mysqli.quickstart.dual-interface)
- [Conexiones](#mysqli.quickstart.connections)
- [Ejecución de consultas](#mysqli.quickstart.statements)
- [Las consultas preparadas](#mysqli.quickstart.prepared-statements)
- [Los procedimientos almacenados](#mysqli.quickstart.stored-procedures)
- [Consultas múltiples](#mysqli.quickstart.multiple-statement)
- [Soporte API para las transacciones](#mysqli.quickstart.transactions)
- [Las metadatos](#mysqli.quickstart.metadata)
  </li>- [Instalación/Configuración](#mysqli.setup)<li>[Requerimientos](#mysqli.requirements)
- [Instalación](#mysqli.installation)
- [Configuración en tiempo de ejecución](#mysqli.configuration)
  </li>- [La extensión mysqli y las conexiones persistentes](#mysqli.persistconns)
- [Constantes predefinidas](#mysqli.constants)
- [Notas](#mysqli.notes)
- [Resumen de las funciones de la extensión MySQLi](#mysqli.summary)
- [mysqli](#class.mysqli) — La clase mysqli<li>[mysqli::$affected_rows](#mysqli.affected-rows) — Devuelve el número de filas afectadas por la última operación MySQL
- [mysqli::autocommit](#mysqli.autocommit) — Activa o desactiva el modo auto-commit
- [mysqli::begin_transaction](#mysqli.begin-transaction) — Inicia una transacción
- [mysqli::change_user](#mysqli.change-user) — Cambia el usuario de la conexión
- [mysqli::character_set_name](#mysqli.character-set-name) — Devuelve el juego de caracteres actual para la conexión
- [mysqli::close](#mysqli.close) — Cierra una conexión
- [mysqli::commit](#mysqli.commit) — Valida la transacción actual
- [mysqli::$connect_errno](#mysqli.connect-errno) — Devuelve el código de error de la última llamada de conexión
- [mysqli::$connect_error](#mysqli.connect-error) — Devuelve una descripción del último error de conexión
- [mysqli::\_\_construct](#mysqli.construct) — Abre una conexión a un servidor MySQL
- [mysqli::debug](#mysqli.debug) — Realiza acciones de depuración
- [mysqli::dump_debug_info](#mysqli.dump-debug-info) — Escribe la información de depuración en los registros
- [mysqli::$errno](#mysqli.errno) — Devuelve el último código de error producido
- [mysqli::$error](#mysqli.error) — Devuelve un string que describe el último error
- [mysqli::$error_list](#mysqli.error-list) — Devuelve una lista de errores desde el último comando ejecutado
- [mysqli::execute_query](#mysqli.execute-query) — Prepara, vincula los parámetros y ejecuta una sentencia SQL
- [mysqli::$field_count](#mysqli.field-count) — Devuelve el número de columnas para la última consulta
- [mysqli::get_charset](#mysqli.get-charset) — Devuelve un objeto que representa el juego de caracteres
- [mysqli::$client_info](#mysqli.get-client-info) — Obtiene información sobre el cliente MySQL
- [mysqli::$client_version](#mysqli.get-client-version) — Devuelve la versión del cliente MySQL como un entero
- [mysqli::get_connection_stats](#mysqli.get-connection-stats) — Devuelve estadísticas sobre la conexión
- [mysqli::$host_info](#mysqli.get-host-info) — Devuelve un string que contiene el tipo de conexión utilizada
- [mysqli::$protocol_version](#mysqli.get-proto-info) — Devuelve la versión del protocolo MySQL utilizado
- [mysqli::$server_info](#mysqli.get-server-info) — Devuelve la versión del servidor MySQL
- [mysqli::$server_version](#mysqli.get-server-version) — Devuelve un integer que representa la versión del servidor MySQL
- [mysqli::get_warnings](#mysqli.get-warnings) — Lee el resultado de SHOW WARNINGS
- [mysqli::$info](#mysqli.info) — Devuelve información acerca de la última consulta ejecutada
- [mysqli::init](#mysqli.init) — Inicializa MySQLi y devuelve un objeto para usar con mysqli_real_connect()
- [mysqli::$insert_id](#mysqli.insert-id) — Devuelve el valor generado para una columna AUTO_INCREMENT por la última consulta
- [mysqli::kill](#mysqli.kill) — Solicita al servidor que finalice un hilo MySQL
- [mysqli::more_results](#mysqli.more-results) — Comprueba si hay más conjuntos de resultados MySQL disponibles
- [mysqli::multi_query](#mysqli.multi-query) — Ejecuta una o varias consultas en la base de datos
- [mysqli::next_result](#mysqli.next-result) — Prepara el siguiente resultado de una consulta múltiple
- [mysqli::options](#mysqli.options) — Define las opciones
- [mysqli::ping](#mysqli.ping) — Verifica la conexión al servidor y reconecta si ya no existe
- [mysqli::poll](#mysqli.poll) — Verifica el estado de la conexión
- [mysqli::prepare](#mysqli.prepare) — Prepara una consulta SQL para su ejecución
- [mysqli::query](#mysqli.query) — Ejecuta una consulta en la base de datos
- [mysqli::real_connect](#mysqli.real-connect) — Establece una conexión con un servidor MySQL
- [mysqli::real_escape_string](#mysqli.real-escape-string) — Protege los caracteres especiales de un string para su uso en una consulta SQL, teniendo en cuenta el juego de caracteres actual de la conexión
- [mysqli::real_query](#mysqli.real-query) — Ejecuta una consulta SQL
- [mysqli::reap_async_query](#mysqli.reap-async-query) — Lee un resultado para una consulta asíncrona
- [mysqli::refresh](#mysqli.refresh) — Actualiza
- [mysqli::release_savepoint](#mysqli.release-savepoint) — Elimina el punto de guardado nombrado del conjunto de puntos de guardado de la transacción actual
- [mysqli::rollback](#mysqli.rollback) — Revierte la transacción actual
- [mysqli::savepoint](#mysqli.savepoint) — Establece un punto de guardado nombrado de la transacción
- [mysqli::select_db](#mysqli.select-db) — Selecciona una base de datos por defecto para las consultas
- [mysqli::set_charset](#mysqli.set-charset) — Define el juego de caracteres del cliente
- [mysqli::$sqlstate](#mysqli.sqlstate) — Devuelve el error SQLSTATE de la última operación MySQL
- [mysqli::ssl_set](#mysqli.ssl-set) — Utilizada para establecer una conexión segura con SSL
- [mysqli::stat](#mysqli.stat) — Obtiene el estado actual del sistema
- [mysqli::stmt_init](#mysqli.stmt-init) — Inicializa una sentencia MySQL
- [mysqli::store_result](#mysqli.store-result) — Transfiere un conjunto de resultados desde la última consulta
- [mysqli::$thread_id](#mysqli.thread-id) — Devuelve el identificador del hilo para la conexión actual
- [mysqli::thread_safe](#mysqli.thread-safe) — Indica si el soporte de hilos está activado o no
- [mysqli::use_result](#mysqli.use-result) — Inicializa la recuperación de un conjunto de resultados
- [mysqli::$warning_count](#mysqli.warning-count) — Devuelve el número de advertencias generadas por la última consulta ejecutada
  </li>- [mysqli_stmt](#class.mysqli-stmt) — La clase mysqli_stmt<li>[mysqli_stmt::$affected_rows](#mysqli-stmt.affected-rows) — Devuelve el número total de filas modificadas, eliminadas, insertadas o coincidentes por la última consulta
- [mysqli_stmt::attr_get](#mysqli-stmt.attr-get) — Obtiene el valor actual de un atributo de consulta
- [mysqli_stmt::attr_set](#mysqli-stmt.attr-set) — Modifica el comportamiento de una consulta preparada
- [mysqli_stmt::bind_param](#mysqli-stmt.bind-param) — Vincula variables a una consulta MySQL
- [mysqli_stmt::bind_result](#mysqli-stmt.bind-result) — Vincula variables a un conjunto de resultados
- [mysqli_stmt::close](#mysqli-stmt.close) — Termina una consulta preparada
- [mysqli_stmt::\_\_construct](#mysqli-stmt.construct) — Construye un nuevo objeto mysqli_stmt
- [mysqli_stmt::data_seek](#mysqli-stmt.data-seek) — Ajusta el puntero de resultado a una fila arbitraria en el resultado almacenado en el búfer.
- [mysqli_stmt::$errno](#mysqli-stmt.errno) — Devuelve un código de error para la última consulta
- [mysqli_stmt::$error](#mysqli-stmt.error) — Devuelve una descripción del último error de procesamiento
- [mysqli_stmt::$error_list](#mysqli-stmt.error-list) — Devuelve una lista de errores para la última consulta ejecutada
- [mysqli_stmt::execute](#mysqli-stmt.execute) — Ejecuta una consulta preparada
- [mysqli_stmt::fetch](#mysqli-stmt.fetch) — Lee los resultados de una consulta MySQL preparada en variables vinculadas
- [mysqli_stmt::$field_count](#mysqli-stmt.field-count) — Devuelve el número de columnas en la consulta dada
- [mysqli_stmt::free_result](#mysqli-stmt.free-result) — Libera el resultado MySQL de la memoria
- [mysqli_stmt::get_result](#mysqli-stmt.get-result) — Obtiene un conjunto de resultados desde una consulta preparada como un objeto mysqli_result
- [mysqli_stmt::get_warnings](#mysqli-stmt.get-warnings) — Obtiene el resultado de SHOW WARNINGS
- [mysqli_stmt::$insert_id](#mysqli-stmt.insert-id) — Obtiene el ID generado por la última consulta INSERT
- [mysqli_stmt::more_results](#mysqli-stmt.more-results) — Comprueba si hay más resultados desde una consulta múltiple
- [mysqli_stmt::next_result](#mysqli-stmt.next-result) — Lee el resultado siguiente desde una consulta múltiple
- [mysqli_stmt::$num_rows](#mysqli-stmt.num-rows) — Devuelve el número de filas recuperadas del servidor
- [mysqli_stmt::$param_count](#mysqli-stmt.param-count) — Devuelve el número de parámetros de un comando SQL
- [mysqli_stmt::prepare](#mysqli-stmt.prepare) — Prepara una consulta SQL para su ejecución
- [mysqli_stmt::reset](#mysqli-stmt.reset) — Anula una consulta preparada
- [mysqli_stmt::result_metadata](#mysqli-stmt.result-metadata) — Devuelve las metadatos de preparación de consulta MySQL
- [mysqli_stmt::send_long_data](#mysqli-stmt.send-long-data) — Envía datos MySQL por paquetes
- [mysqli_stmt::$sqlstate](#mysqli-stmt.sqlstate) — Devuelve el código SQLSTATE de la última operación MySQL
- [mysqli_stmt::store_result](#mysqli-stmt.store-result) — Almacena un conjunto de resultados en un búfer interno
  </li>- [mysqli_result](#class.mysqli-result) — La clase mysqli_result<li>[mysqli_result::__construct](#mysqli-result.construct) — Construye un objeto mysqli_result
- [mysqli_result::$current_field](#mysqli-result.current-field) — Obtiene la posición actual de un campo en un puntero de resultado
- [mysqli_result::data_seek](#mysqli-result.data-seek) — Mueve el puntero interno de resultado
- [mysqli_result::fetch_all](#mysqli-result.fetch-all) — Recupera todas las filas de resultados en un array asociativo, numérico o ambos
- [mysqli_result::fetch_array](#mysqli-result.fetch-array) — Obtiene la siguiente fila de un conjunto de resultados como un array asociativo, numérico o ambos
- [mysqli_result::fetch_assoc](#mysqli-result.fetch-assoc) — Recupera la siguiente fila de un conjunto de resultados como un array asociativo
- [mysqli_result::fetch_column](#mysqli-result.fetch-column) — Recupera una sola columna de la siguiente fila de un conjunto de resultados
- [mysqli_result::fetch_field](#mysqli-result.fetch-field) — Devuelve el siguiente campo en el conjunto de resultados
- [mysqli_result::fetch_field_direct](#mysqli-result.fetch-field-direct) — Obtiene los metadatos de un campo único
- [mysqli_result::fetch_fields](#mysqli-result.fetch-fields) — Devuelve un array de objetos que representan los campos en el resultado
- [mysqli_result::fetch_object](#mysqli-result.fetch-object) — Devuelve la siguiente fila de un conjunto de resultados como objeto
- [mysqli_result::fetch_row](#mysqli-result.fetch-row) — Obtiene una fila de resultado como un array indexado
- [mysqli_result::$field_count](#mysqli-result.field-count) — Obtiene el número de campos en el conjunto de resultados
- [mysqli_result::field_seek](#mysqli-result.field-seek) — Desplaza el puntero de resultado al campo especificado
- [mysqli_result::free](#mysqli-result.free) — Libera la memoria asociada a un resultado
- [mysqli_result::getIterator](#mysqli-result.getiterator) — Devuelve un iterador externo
- [mysqli_result::$lengths](#mysqli-result.lengths) — Devuelve la longitud de las columnas de la fila actual del conjunto de resultados
- [mysqli_result::$num_rows](#mysqli-result.num-rows) — Devuelve el número de filas en el conjunto de resultados
  </li>- [mysqli_driver](#class.mysqli-driver) — La clase mysqli_driver<li>[mysqli_driver::embedded_server_end](#mysqli-driver.embedded-server-end) — Detiene el servidor embebido
- [mysqli_driver::embedded_server_start](#mysqli-driver.embedded-server-start) — Inicializa e inicia el servidor embebido
- [mysqli_driver::$report_mode](#mysqli-driver.report-mode) — Define el modo de informe de errores de mysqli
  </li>- [mysqli_warning](#class.mysqli-warning) — La clase mysqli_warning<li>[mysqli_warning::__construct](#mysqli-warning.construct) — Constructor privado para evitar la instanciación directa
- [mysqli_warning::next](#mysqli-warning.next) — Obtiene el siguiente aviso
  </li>- [mysqli_sql_exception](#class.mysqli-sql-exception) — La clase mysqli_sql_exception<li>[mysqli_sql_exception::getSqlState](#mysqli-sql-exception.getsqlstate) — Devuelve el código de error SQLSTATE
  </li>- [Funciones mysqli obsoletas y alias](#ref.mysqli)<li>[mysqli_connect](#function.mysqli-connect) — Alias de mysqli::__construct
- [mysqli::escape_string](#function.mysqli-escape-string) — Alias de mysqli_real_escape_string
- [mysqli_execute](#function.mysqli-execute) — Alias de mysqli_stmt_execute
- [mysqli_get_client_stats](#function.mysqli-get-client-stats) — Devuelve las estadísticas del cliente por proceso
- [mysqli_get_links_stats](#function.mysqli-get-links-stats) — Devuelve información sobre los enlaces abiertos y almacenados en caché
- [mysqli_report](#function.mysqli-report) — Alias de mysqli_driver-&gt;report_mode
- [mysqli::set_opt](#function.mysqli-set-opt) — Alias de mysqli_options
  </li>- [Registro de cambios](#changelog.mysqli)
