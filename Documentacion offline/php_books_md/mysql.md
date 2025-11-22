# Visión general de los drivers PHP MySQL

# Introducción

     Existen varias APIs PHP para acceder a una base de datos MySQL.
     Los usuarios pueden elegir entre las extensiones
     [mysqli](#book.mysqli) o
     [PDO_MySQL](#ref.pdo-mysql).




     Esta guía explica la [terminología](#mysqlinfo.terminology)
     utilizada para describir cada una de ellas, proporciona información
     sobre [la elección de la API](#mysqlinfo.api.choosing)
     a utilizar, así como información que ayuda a elegir la [biblioteca
     MySQL a utilizar](#mysqlinfo.library.choosing) con la API.

# Visión general de la terminología

    Esta sección proporciona una introducción a las opciones disponibles
    al desarrollar una aplicación PHP que debe interactuar con
    una base de datos MySQL.





    **¿Qué es una API?**





    Una interfaz de programación de aplicaciones, o API, define las clases,
    los métodos, las funciones y las variables que su aplicación
    necesita para realizar las tareas deseadas. En el caso de las aplicaciones
    PHP que necesitan comunicarse con bases de datos, las APIs
    necesarias suelen exponerse a través de extensiones PHP.





    Las APIs pueden ser procedimentales u orientadas a objetos. Con una API
    procedimental, se llaman funciones para realizar las tareas,
    con una API orientada a objetos, se instancian las clases, luego se
    llaman los métodos en los objetos resultantes. La segunda interfaz
    es generalmente preferida ya que es más moderna y permite
    organizar mejor el código fuente.





    Al escribir aplicaciones PHP que necesitan conectarse
    a un servidor MySQL, hay varias opciones de API disponibles.
    Este documento abordará lo que está disponible, y cómo elegir
    la mejor solución para su aplicación.





    **¿Qué es un conector?**





    En la documentación de MySQL, el término *conector*
    se refiere a la parte del programa que permite a su aplicación
    conectarse al servidor de base de datos MySQL. MySQL proporciona
    conectores para muchos lenguajes, incluyendo PHP.





    Si su aplicación PHP necesita comunicarse con un servidor
    de base de datos, debe escribir su código PHP para realizar
    tareas como conectarse al servidor de base de datos,
    consultar la base de datos y otras tareas relacionadas
    con la base de datos. El programa es requerido para proporcionar la API
    a utilizar por su aplicación PHP, pero también para gestionar
    la comunicación entre su aplicación y el servidor de base
    de datos, utilizando bibliotecas intermedias si es necesario. Este programa
    suele denominarse conector,
    ya que permite a su aplicación *conectarse*
    al servidor de base de datos.





    **¿Qué es un driver?**





    Un driver es una parte de programa cuyo objetivo es comunicarse
    con un tipo específico de servidor de base de datos. El driver
    también puede llamar a una biblioteca, como la biblioteca cliente MySQL o el driver nativo MySQL. Estas bibliotecas implementan
    el protocolo de bajo nivel utilizado para comunicarse con el servidor
    de base de datos MySQL.





    Por ejemplo, la capa de abstracción de base de datos
    [PHP Data Objects (PDO)](#mysqli.overview.pdo) puede
    utilizar uno de los drivers específicos de base de datos. Uno de estos drivers
    disponibles es el driver PDO MYSQL, que proporciona una interfaz
    con el servidor MySQL.





    A veces, las personas utilizan los términos conector y driver
    de manera intercambiable, lo que puede causar confusión. En la documentación
    de MySQL, el término driver se reserva al programa que
    proporciona la parte específica de la base de datos de un conector.





    **¿Qué es una extensión?**





    En la documentación de PHP, se encuentra otro término -
    *extensión*. El código PHP está compuesto
    por un núcleo, con extensiones opcionales que permiten
    extender las funcionalidades del núcleo. Las extensiones PHP relacionadas
    con bases de datos, como la extensión mysqli
    se implementan utilizando el framework de extensiones PHP.





    Típicamente, una extensión expone una API al programador PHP, permitiéndole
    algunas facilidades durante la programación. Sin embargo,
    algunas extensiones que utilizan el framework de extensión PHP
    no exponen ninguna API al programador PHP.





    La extensión driver PDO MySQL, por ejemplo, no expone ninguna API
    al programador PHP, pero proporciona una interfaz a la capa PDO.





    Los términos API y extensión no deben considerarse como significando
    lo mismo, ya que una extensión no expone necesariamente una API al
    programador.

# Elegir una API

    PHP ofrece diferentes APIs para conectarse a MySQL. A continuación, se
    encuentran las APIs proporcionadas por las extensiones mysqli y PDO.
    Cada ejemplo de código crea una conexión a un servidor MySQL que se ejecuta en
    el dominio "example.com", utilizando el nombre de usuario "user", la contraseña "password". Y se ejecuta una consulta para saludar al usuario.







     **Ejemplo #1 Comparación de las APIs MySQL**




&lt;?php
// mysqli
$mysqli = new mysqli("example.com", "user", "password", "database");
$result = $mysqli-&gt;query("SELECT '¡Hola, querido usuario de MySQL!' AS _message FROM DUAL");
$row = $result-&gt;fetch_assoc();
echo htmlentities($row['_message']);

// PDO
$pdo = new PDO('mysql:host=example.com;dbname=database', 'user', 'password');
$statement = $pdo-&gt;query("SELECT '¡Hola, querido usuario de MySQL!' AS _message FROM DUAL");
$row = $statement-&gt;fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['_message']);

    **Comparación de funcionalidades**




    El rendimiento global de las dos extensiones puede considerarse idéntico.
    Sin embargo, el rendimiento de la extensión constituye solo una fracción
    del tiempo total de ejecución de una solicitud web PHP.
    A menudo, el impacto es inferior al 0.1%.







        
       ext/mysqli
       PDO_MySQL






       Introducida en la versión de PHP
       5.0
       5.1



       Incluida con PHP 7.x y 8.x
       Sí
       Sí



       Estado de desarrollo
       Activo
       Activo



       Ciclo de vida
       Activo
       Activo



       Recomendado para nuevos proyectos
       Sí
       Sí



       Interfaz orientada a objetos
       Sí
       Sí



       Interfaz procedimental
       Sí
       No



       La API soporta consultas no bloqueantes, asíncronas con mysqlnd
       Sí
       No



       Conexiones persistentes disponibles
       Sí
       Sí



       La API soporta juegos de caracteres
       Sí
       Sí



       La API soporta consultas preparadas del lado del servidor
       Sí
       Sí



       La API soporta consultas preparadas del lado del cliente
       No
       Sí



       La API soporta procedimientos almacenados
       Sí
       Sí



       La API soporta consultas múltiples
       Sí
       La mayoría



       La API soporta transacciones
       Sí
       Sí



       Las transacciones pueden controlarse con SQL
       Sí
       Sí



       Soporta todas las funcionalidades de MySQL 5.1+
       Sí
       La mayoría




# Elegir una biblioteca

    Las extensiones PHP mysqli y PDO_MySQL son envolventes ligeras de una
    biblioteca cliente C. Las extensiones pueden utilizar la biblioteca
    [mysqlnd](#book.mysqlnd), o la biblioteca libmysqlclient.
    La elección de la biblioteca se realiza en el momento de la compilación.




    La biblioteca mysqlnd forma parte de la distribución de PHP.
    Ofrece funcionalidades como conexiones perezosas,
    caché de consultas, que no están disponibles con libmysqlclient,
    por lo que se recomienda utilizar la biblioteca interna mysqlnd.
    Ver la [documentación de mysqlnd](#book.mysqlnd)
    para obtener más información, así como una lista de las funcionalidades que ofrece.







     **Ejemplo #1 Comando de configuración para el uso de mysqlnd o libmysqlclient**




// Recomendado, compilación con mysqlnd
$ ./configure --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd

// Alternativamente recomendado, compilación con mysqlnd
$ ./configure --with-mysqli --with-pdo-mysql

// No recomendado, compilación con libmysqlclient
$ ./configure --with-mysqli=/path/to/mysql_config --with-pdo-mysql=/path/to/mysql_config

     **Ejemplo #2 Comparación de las instrucciones preparadas**




&lt;?php
// mysqli
$mysqli = new mysqli("example.com", "usuario", "contraseña", "base de datos");
$statement = $mysqli-&gt;prepare("SELECT District FROM City WHERE Name=?");
$statement-&gt;execute(["Amersfoort"]);
$result = $statement-&gt;get_result();
$row = $result-&gt;fetch_assoc();
echo htmlentities($row['District']);

// PDO
$pdo = new PDO('mysql:host=example.com;dbname=base de datos', 'usuario', 'contraseña');
$statement = $pdo-&gt;prepare("SELECT District FROM City WHERE Name=?");
$statement-&gt;execute(["Amersfoort"]);
$row = $statement-&gt;fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['District']);

    **Comparación de funcionalidades de las bibliotecas**




    Se recomienda utilizar la biblioteca [mysqlnd](#book.mysqlnd)
    en lugar de la biblioteca cliente servidor MySQL (libmysqlclient). Ambas bibliotecas
    son soportadas y mejoradas continuamente.







        
       Driver nativo MySQL ([mysqlnd](#book.mysqlnd))
       Biblioteca cliente servidor MySQL (libmysqlclient)






       Forma parte de la distribución de PHP
       Sí
       No



       Introducido en versión de PHP
       5.3.0
       N/A



       Licencia
       Licencia PHP 3.01
       Doble licencia



       Estado de desarrollo
       Activo
       Activo



       Ciclo de vida
       Sin fin anunciado
       Sin fin anunciado



       Compilado por defecto (para todas las extensiones MySQL)
       Sí
       No



       Soporte del protocolo de compresión
       Sí
       Sí



       Soporte de SSL
       Sí
       Sí



       Soporte de pipes nombrados
       Sí
       Sí



       Consultas no bloqueantes, asíncronas
       Sí
       No



       Estadísticas de rendimiento
       Sí
       No



       LOAD LOCAL INFILE respeta la [directiva open_basedir](#ini.open-basedir)
       Sí
       No



       Uso del sistema de gestión de memoria nativo de PHP
        (es decir, sigue los límites de memoria de PHP)
       Sí
       No



       Devuelve las columnas numéricas en forma de double (COM_QUERY)
       Sí
       No



       Devuelve las columnas numéricas en forma de string (COM_QUERY)
       Sí
       Sí



       API del plugin
       Sí
       Limitada



       Reconexión automática
       No
       Opcional




# Conceptos

## Tabla de contenidos

- [Consultas con o sin almacenamiento en memoria](#mysqlinfo.concepts.buffering)
- [Juegos de caracteres](#mysqlinfo.concepts.charset)

    Estos conceptos son específicos para los drivers MySQL para PHP.

    ## Consultas con o sin almacenamiento en memoria

    Las consultas utilizan por omisión el modo de almacenamiento en memoria.
    Esto significa que el resultado de las consultas se transfiere inmediatamente
    del servidor MySQL a PHP y se conserva en la memoria
    del proceso PHP. Esto permite operaciones complementarias
    como contar el número de resultados, y desplazar el
    puntero de resultado actual. También permite ejecutar consultas adicionales
    sobre la misma conexión mientras se trabaja con el conjunto de resultados. La desventaja del almacenamiento en memoria es que los conjuntos de resultados grandes pueden requerir
    mucha más memoria. La memoria permanecerá ocupada hasta que
    todas las referencias a los conjuntos de resultados sean desactivadas o que los conjuntos de resultados sean liberados explícitamente,
    lo cual ocurre de manera automática al final del
    proceso. La terminología "store result" también se utiliza con el modo de almacenamiento en memoria, ya que la totalidad de los resultados
    se almacenan a la vez.

    **Nota**:

    Cuando se utiliza libmysqlclient como biblioteca, el límite de memoria de PHP no contará la memoria utilizada para los
    conjuntos de resultados a menos que los datos sean leídos en las variables PHP. Con mysqlnd, la memoria utilizada incluirá
    el conjunto de resultados completo.

    Las consultas sin almacenamiento en memoria, las consultas MySQL ejecutan su consulta y luego esperan
    que los datos del servidor MySQL sean recuperados. Esto utiliza menos memoria
    en el lado de PHP, pero puede aumentar la carga
    en el servidor. A menos que el conjunto de resultados completo haya sido
    recuperado desde el servidor, ninguna otra consulta puede ser
    enviada sobre la misma conexión. Las consultas sin almacenamiento en memoria también pueden hacer referencia a un
    "use result". Una vez que todas las líneas del conjunto de resultados
    han sido recuperadas, el conjunto de resultados desaparece y ya no es posible recorrerlo nuevamente.

    Siguiendo estas características, las consultas sin almacenamiento en memoria deben ser utilizadas únicamente
    cuando se espera obtener un gran conjunto de resultados que será procesado secuencialmente.
    Las consultas sin almacenamiento en memoria presentan varias trampas que las hacen más
    difíciles de utilizar, por ejemplo el número de líneas en el conjunto de resultados no es conocido
    antes de que la última línea sea recuperada.

    Debido a que las consultas son almacenadas en memoria
    por omisión, los ejemplos a continuación muestran cómo
    ejecutar consultas, con cada API, sin almacenamiento en memoria.

    **Ejemplo #1 Ejemplo de consultas sin almacenamiento en memoria: mysqli**

&lt;?php
$mysqli  = new mysqli("localhost", "my_user", "my_password", "world");
$unbufferedResult = $mysqli-&gt;query("SELECT Name FROM City", MYSQLI_USE_RESULT);

foreach ($unbufferedResult as $row) {
echo $row['Name'] . PHP_EOL;
}
?&gt;

**Ejemplo #2 Ejemplo de consultas sin almacenamiento en memoria: pdo_mysql**

&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=world", 'my_user', 'my_password');
$pdo-&gt;setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$unbufferedResult = $pdo-&gt;query("SELECT Name FROM City");
foreach ($unbufferedResult as $row) {
echo $row['Name'] . PHP_EOL;
}
?&gt;

## Juegos de caracteres

Idealmente, un juego de caracteres adecuado debe ser definido
a nivel del servidor, operación descrita en la sección
[» Configuración del juego de
caracteres](http://dev.mysql.com/doc/mysql/en/charset-configuration.html) del manual del servidor MySQL. Alternativamente, cada API
MySQL ofrece un método para definir el juego de caracteres durante
la ejecución.

**Precaución**

# El juego de caracteres y el escape de caracteres

    El juego de caracteres debe ser comprendido y definido, sabiendo que tiene
    un efecto en cada acción, y tiene implicaciones a nivel de seguridad. Por ejemplo, el mecanismo de escape (i.e.
    [mysqli_real_escape_string()](#mysqli.real-escape-string) para mysqli, y
    [PDO::quote()](#pdo.quote) para PDO_MySQL) utilizará
    esta configuración. Es importante tener en cuenta que estas funciones
    no utilizarán el juego de caracteres definido con una consulta, por lo tanto,
    el ejemplo siguiente no tendrá ningún efecto sobre el juego de caracteres:

**Ejemplo #1 Problemas al definir el juego de caracteres con SQL**

&lt;?php

$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

// NO afectará $mysqli-&gt;real_escape_string();
$mysqli-&gt;query("SET NAMES utf8mb4");

// NO afectará $mysqli-&gt;real_escape_string();
$mysqli-&gt;query("SET CHARACTER SET utf8mb4");

// Pero esto afectará $mysqli-&gt;real_escape_string();
$mysqli-&gt;set_charset('utf8mb4');

// Pero esto NO lo afectará (UTF-8 en comparación con utf8mb4) -- no utilice guiones aquí
$mysqli-&gt;set_charset('UTF-8');
?&gt;

A continuación, los ejemplos que demuestran cómo modificar correctamente
el juego de caracteres durante la ejecución utilizando cada una de las APIs.

**Nota**:
**Confusión posible con UTF-8**

    Debido a que los nombres de los juegos de caracteres en MySQL no contienen guiones,
    la cadena "utf8" es correcta en MySQL y definirá el juego de caracteres en UTF-8.
    La cadena "UTF-8" no es correcta, y utilizar "utf-8" fallará al modificar el
    juego de caracteres.

**Ejemplo #2 Ejemplo de definición del juego de caracteres: mysqli**

&lt;?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

echo 'Juego de caracteres inicial: ' . $mysqli-&gt;character_set_name() . "\n";

if (!$mysqli-&gt;set_charset('utf8mb4')) {
printf("Error al cargar el juego de caracteres utf8mb4: %s\n", $mysqli-&gt;error);
exit;
}

echo 'Su juego de caracteres actual es: ' . $mysqli-&gt;character_set_name() . "\n";
?&gt;

**Ejemplo #3 Ejemplo de definición del juego de caracteres: [pdo_mysql](#ref.pdo-mysql.connection)**

&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=world;charset=utf8mb4", 'my_user', 'my_pass');
?&gt;

- [Introducción](#mysqlinfo.intro)
- [Visión general de la terminología](#mysqlinfo.terminology)
- [Elegir una API](#mysqlinfo.api.choosing)
- [Elegir una biblioteca](#mysqlinfo.library.choosing)
- [Conceptos](#mysqlinfo.concepts)<li>[Consultas con o sin almacenamiento en memoria](#mysqlinfo.concepts.buffering)
- [Juegos de caracteres](#mysqlinfo.concepts.charset)
  </li>
