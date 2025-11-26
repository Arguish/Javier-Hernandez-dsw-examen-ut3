# CUBRID

# Introducción

Estas funciones permiten acceder a servidores de bases de datos CUBRID. Se puede encontrar más información sobre CUBRID en [» CUBRID](http://www.cubrid.org/).

La documentación de CUBRID se puede encontrar en [» Documentación de CUBRID](http://www.cubrid.org/documentation/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#cubrid.requirements)
- [Instalación](#cubrid.installation)
- [Configuración en tiempo de ejecución](#cubrid.configuration)
- [Tipos de recursos](#cubrid.resources)

    ## Requerimientos

    Para que estas funciones estén disponibles, se debe instalar CUBRID, y compilar la Biblioteca de PHP de CUBRID con soporte para CUBRID.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/cubrid](https://pecl.php.net/package/cubrid).

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).

Para obtener información sobre la instalación manual en Linux y en Windows, por favor,
lea el fichero build-guide.html incluido en el paquete.

## Configuración en tiempo de ejecución

No existe configuración en tiempo de ejecución.

## Tipos de recursos

En CUBRID se usan cuatro tipos de recursos. El primero es un identificador
de enlace para una conexión de base de datos, el segundo es un recurso que
guarda el resultado de una consulta, y los dos últimos son recursos que guardan
los resultados de una consulta de tipos de datos BLOB/CLOB.

## connection identifier

    Un identificador de conexión devuelto por [cubrid_connect()](#function.cubrid-connect),
    [cubrid_connect_with_url()](#function.cubrid-connect-with-url),
    [cubrid_pconnect()](#function.cubrid-pconnect) y
    [cubrid_pconnect_with_url()](#function.cubrid-pconnect-with-url).

## request identifier

    Un identificador de solicitud devuelto por [cubrid_prepare()](#function.cubrid-prepare) y [cubrid_execute()](#function.cubrid-execute).

## LOB identifier

    Un identificador LOB devuelto por [cubrid_lob_get()](#function.cubrid-lob-get).

## LOB2 identifier

    Un identificador LOB devuelto por [cubrid_lob2_new()](#function.cubrid-lob2-new) u obtenido
    de un conjunto de resultados.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las constantes siguientes pueden ser utilizadas durante la ejecución
de consultas SQL. Pueden ser pasadas a las funciones [cubrid_prepare()](#function.cubrid-prepare)
y [cubrid_execute()](#function.cubrid-execute).

   <caption>**Flags de ejecución SQL CUBRID**</caption>
   
    
     
      Constante
      Descripción


      **[CUBRID_INCLUDE_OID](#constant.cubrid-include-oid)**
      Determina si se debe recuperar el OID durante la
       ejecución de la consulta.



      **[CUBRID_ASYNC](#constant.cubrid-async)**
      Ejecuta la consulta en modo asíncrono.



      **[CUBRID_EXEC_QUERY_ALL](#constant.cubrid-exec-query-all)**

       Ejecuta la consulta en modo síncrono. Este flag debe ser
       definido durante la ejecución de consultas SQL múltiples.


Las constantes siguientes pueden ser utilizadas durante la recuperación
de los resultados para especificar su comportamiento. Pueden ser pasadas a
las funciones [cubrid_fetch()](#function.cubrid-fetch)
y [cubrid_fetch_array()](#function.cubrid-fetch-array).

   <caption>**Flags de recuperación CUBRID**</caption>
   
    
     
      Constante
      Descripción


      **[CUBRID_NUM](#constant.cubrid-num)**
      Recupera el resultado de la consulta en forma de array
       numérico (con índices comenzando en 0).



      **[CUBRID_ASSOC](#constant.cubrid-assoc)**
      Recupera el resultado de la consulta en forma de array
       asociativo.



      **[CUBRID_BOTH](#constant.cubrid-both)**
      Recupera el resultado de la consulta tanto en forma de array
       numérico como de array asociativo (valor por defecto).



      **[CUBRID_OBJECT](#constant.cubrid-object)**
      Recupera el resultado de la consulta en forma de objeto.



       **[CUBRID_LOB](#constant.cubrid-lob)**

        La constante CUBRID_LOB puede ser utilizada cuando se desea
        utilizar un objeto LOB. Puede ser pasada a las funciones
        [cubrid_fetch()](#function.cubrid-fetch),
        [cubrid_fetch_row()](#function.cubrid-fetch-row),
        [cubrid_fetch_array()](#function.cubrid-fetch-array),
        [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) y
        [cubrid_fetch_object()](#function.cubrid-fetch-object).


Las constantes siguientes pueden ser utilizadas durante el posicionamiento del
cursor en los resultados de la consulta. Pueden ser pasadas a
o retornadas por la función [cubrid_move_cursor()](#function.cubrid-move-cursor).

   <caption>**Flags de posicionamiento del cursor CUBRID**</caption>
   
    
     
      Constante
      Descripción


      **[CUBRID_CURSOR_FIRST](#constant.cubrid-cursor-first)**
      Mueve el cursor actual a la primera posición del resultado.



      **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)**
      Mueve el cursor actual a un valor por defecto si el origen
       no está especificado.



      **[CUBRID_CURSOR_LAST](#constant.cubrid-cursor-last)**
      Mueve el cursor actual a la última posición del resultado.



      **[CUBRID_CURSOR_SUCCESS](#constant.cubrid-cursor-success)**
      El valor retornado por la función [cubrid_move_cursor()](#function.cubrid-move-cursor)
       en caso de éxito. Este flag fue eliminado desde la versión 8.4.1.



      **[CUBRID_NO_MORE_DATA](#constant.cubrid-no-more-data)**
      El valor retornado por la función [cubrid_move_cursor()](#function.cubrid-move-cursor)
       si ocurre un error. Este flag fue eliminado desde la versión 8.4.1.



      **[CUBRID_CURSOR_ERROR](#constant.cubrid-cursor-error)**
      El valor retornado por la función [cubrid_move_cursor()](#function.cubrid-move-cursor)
       si ocurre un error. Este flag fue eliminado desde la versión 8.4.1.


Las constantes siguientes pueden ser utilizadas durante la definición
del modo auto-commit para la conexión a la base de datos.
Pueden ser pasadas a la función [cubrid_set_autocommit()](#function.cubrid-set-autocommit)
o retornadas por la función [cubrid_get_autocommit()](#function.cubrid-get-autocommit).

   <caption>**Flags CUBRID para el modo auto-commit**</caption>
    
     
      
       Constante
       Descripción


       **[CUBRID_AUTOCOMMIT_TRUE](#constant.cubrid-autocommit-true)**
       Activa el modo auto-commit.



       **[CUBRID_AUTOCOMMIT_FALSE](#constant.cubrid-autocommit-false)**
       Desactiva el modo auto-commit.




Las constantes siguientes pueden ser utilizadas durante la definición
de parámetros a la base de datos. Pueden ser pasadas a
la función [cubrid_set_db_parameter()](#function.cubrid-set-db-parameter).

   <caption>**Flags de parámetros CUBRID**</caption>
    
     
      
       Constante
       Descripción


       **[CUBRID_PARAM_ISOLATION_LEVEL](#constant.cubrid-param-isolation-level)**
       Nivel de aislamiento de la transacción para la conexión
        a la base de datos.



       **[CUBRID_PARAM_LOCK_TIMEOUT](#constant.cubrid-param-lock-timeout)**
       Tiempo de expiración de la transacción en segundos.




Las constantes siguientes pueden ser utilizadas para definir el nivel
de aislamiento de la transacción. Pueden ser pasadas a la función
[cubrid_set_db_parameter()](#function.cubrid-set-db-parameter) o retornadas por la función
[cubrid_get_db_parameter()](#function.cubrid-get-db-parameter).

   <caption>**Flags CUBRID para el nivel de aislamiento**</caption>
    
     
      
       Constante
       Descripción


       **[TRAN_COMMIT_CLASS_UNCOMMIT_INSTANCE](#constant.tran-commit-class-uncommit-instance)**
       El nivel de aislamiento más bajo (1).
        Una lectura de datos modificados, no repetibles, o
        fantasmas puede ocurrir en el tuple y, además, una lectura
        no repetible puede ocurrir en la tabla.



       **[TRAN_COMMIT_CLASS_COMMIT_INSTANCE](#constant.tran-commit-class-commit-instance)**
       Un nivel de aislamiento relativamente bajo (2). Una
        lectura de datos modificados no puede ocurrir,
        pero una lectura de datos no repetibles o fantasmas
        puede ocurrir.



       **[TRAN_REP_CLASS_UNCOMMIT_INSTANCE](#constant.tran-rep-class-uncommit-instance)**
       El nivel de aislamiento por defecto para CUBRID (3).
        Una lectura de datos modificados, no repetibles o fantasmas
        puede ocurrir en el tuple, pero la lectura de datos repetibles
        está asegurada para la tabla.



       **[TRAN_REP_CLASS_COMMIT_INSTANCE](#constant.tran-rep-class-commit-instance)**
       Un nivel de aislamiento relativamente bajo (4). Una lectura
        de datos modificados no puede ocurrir, pero una lectura
        de datos no repetibles o fantasmas puede ocurrir.



       **[TRAN_REP_CLASS_REP_INSTANCE](#constant.tran-rep-class-rep-instance)**
       Un nivel de aislamiento relativamente alto (5). Una lectura
        de datos modificados o no repetibles no puede ocurrir, pero
        una lectura de datos fantasmas puede ocurrir.



       **[TRAN_SERIALIZABLE](#constant.tran-serializable)**
       El nivel de aislamiento más alto (6). Los problemas relacionados
        con la concurrencia (i.e. lectura de datos modificados, no repetibles, fantasmas,
        etc...) no puede ocurrir.




Las constantes siguientes pueden ser utilizadas para recuperar las informaciones
de esquema. Pueden ser pasadas a la función
[cubrid_schema()](#function.cubrid-schema).

   <caption>**Flags para los esquemas CUBRID**</caption>
   
    
     
      Constante
      Descripción


      **[CUBRID_SCH_CLASS](#constant.cubrid-sch-class)**
      Recupera el nombre y el tipo de la tabla en CUBRID.



      **[CUBRID_SCH_VCLASS](#constant.cubrid-sch-vclass)**
      Recupera el nombre y el tipo de la vista en CUBRID.



      **[CUBRID_SCH_QUERY_SPEC](#constant.cubrid-sch-query-spec)**
      Recupera la definición de la consulta para una vista.



      **[CUBRID_SCH_ATTRIBUTE](#constant.cubrid-sch-attribute)**
      Recupera los atributos de una columna de una tabla.



      **[CUBRID_SCH_CLASS_ATTRIBUTE](#constant.cubrid-sch-class-attribute)**
      Recupera los atributos de una tabla.



      **[CUBRID_SCH_METHOD](#constant.cubrid-sch-method)**
      Recupera el método de la instancia. El método de la instancia
       es el método llamado por una instancia de clase. Es más
       frecuentemente utilizado que un método de clase ya que la mayoría de
       las operaciones son ejecutadas en la instancia.



      **[CUBRID_SCH_CLASS_METHOD](#constant.cubrid-sch-class-method)**
      Recupera el método de clase. El método de clase es
       el método llamado por un objeto de la clase. Es habitualmente
       utilizado para crear una nueva instancia de la clase o para
       inicializarla. También es utilizado para acceder o actualizar
       los atributos de la clase.



      **[CUBRID_SCH_METHOD_FILE](#constant.cubrid-sch-method-file)**
      Recupera las informaciones del archivo que define el método
       de la tabla.



      **[CUBRID_SCH_SUPERCLASS](#constant.cubrid-sch-superclass)**
      Recupera el nombre y el tipo de la tabla de la cual
       la tabla hereda sus atributos.



      **[CUBRID_SCH_SUBCLASS](#constant.cubrid-sch-subclass)**
      Recupera el nombre y el tipo de la tabla que hereda los atributos.



      **[CUBRID_SCH_CONSTRAINT](#constant.cubrid-sch-constraint)**
      Recupera las restricciones de la tabla.



      **[CUBRID_SCH_TRIGGER](#constant.cubrid-sch-trigger)**
      Recupera los triggers de la tabla.



      **[CUBRID_SCH_CLASS_PRIVILEGE](#constant.cubrid-sch-class-privilege)**
      Recupera las informaciones sobre los privilegios de la tabla.



      **[CUBRID_SCH_ATTR_PRIVILEGE](#constant.cubrid-sch-attr-privilege)**
      Recupera las informaciones de privilegios de una columna.



      **[CUBRID_SCH_DIRECT_SUPER_CLASS](#constant.cubrid-sch-direct-super-class)**
      Recupera la tabla super directa de la tabla.



      **[CUBRID_SCH_PRIMARY_KEY](#constant.cubrid-sch-primary-key)**
      Recupera la clave primaria de la tabla.



      **[CUBRID_SCH_IMPORTED_KEYS](#constant.cubrid-sch-imported-keys)**
      Recupera las claves importadas de la tabla.



      **[CUBRID_SCH_EXPORTED_KEYS](#constant.cubrid-sch-exported-keys)**
      Recupera las claves exportadas de la tabla.



      **[CUBRID_SCH_CROSS_REFERENCE](#constant.cubrid-sch-cross-reference)**
      Recupera las referencias de los enlaces de 2 tablas.


Las constantes siguientes pueden ser utilizadas durante el reporte de
errores. Pueden ser retornadas por la función
[cubrid_error_code_facility()](#function.cubrid-error-code-facility).

   <caption>**Código de facilidad de errores CUBRID**</caption>
   
    
     
      Constante
      Descripción


      **[CUBRID_FACILITY_DBMS](#constant.cubrid-facility-dbms)**
      El error ocurrió en la base de datos CUBRID.



      **[CUBRID_FACILITY_CAS](#constant.cubrid-facility-cas)**
      El error ocurrió en el broker CUBRID.



      **[CUBRID_FACILITY_CCI](#constant.cubrid-facility-cci)**
      El error ocurrió en el cci CUBRID.



      **[CUBRID_FACILITY_CLIENT](#constant.cubrid-facility-client)**
      El error ocurrió en el cliente PHP CUBRID.


# Ejemplos

El siguiente es un ejemplo sencillo que establece una conexión entre PHP y CUBRID. Esta conexión cubrirá la características más básicas y significativas. El siguiente código requiere conectarse a una base de datos CUBRID, lo que significa que CUBRID Server (servidor) y CUBRID Broker (agente) tienen que estar ejecutándose.

El ejemplo de abajo usa la base de datos demodb de ejemplo. Por defecto se crea durante la instalación. Asegúrese de que ha sido creada.

**Ejemplo #1 Ejemplo de Recuperación de Datos**

&lt;html&gt;
&lt;head&gt;
&lt;meta http-equiv="content-type" content="text/html; charset=euc-kr"&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;center&gt;
&lt;table border=2&gt;
&lt;?php
/**
_ Establecer la información para conexión de CUBRID. ip_host es la direccion
_ IP donde el Agente de CUBRID está instalado (localhost en este
_ ejemplo), y puerto_host es el número de puerto del Agecte de CUBRID.
_ El número de puerto es el predeterminado dado durante la instalación.
_ Para más detalles, véase "Guía del Administrador."
_/
$ip_host = "localhost";
$puerto_host = 33000;
$nombre_bd = "demodb";
/**
_ Conectar al Servidor CUBRID. No realiza la conexión,
_ sólo conserva la información de ésta. La razón de no realizar
_ la conexión actual es manejar la transacción de forma más eficaz
_ en la arquitectura de 3 capas.
\*/
$cubrid_con = @cubrid_connect($ip_host, $puerto_host, $nombre_bd);

        if (!$cubrid_con) {
            echo "Error de Conexión con la Base de Datos";
            exit;
        }
    ?&gt;
    &lt;?php
        $sql = "select sports, count(players) as players from event group by sports";
        /**
         * Solicitar al Servidor CUBRID los resultados de la declaración SQL.
         * Ahora se hace la conexión actual al Servidor CUBRID.
         */
        $resultado = cubrid_execute($cubrid_con, $sql);

        if ($resultado) {
            /**
             * Obtener el nombre de las columnas del conjunto de resultados creado por la consulta SQL.
             */
            $columnas = cubrid_column_names($resultado);
            /**
             * Obtener el número de columnas del conjunto de resultados creado por la consulta SQL.
             */
            $número_campos = cubrid_num_cols($resultado);
            /**
             * Listar los nombres de las columnas del conunto de resultados por la pantalla.
             */
            echo "&lt;tr&gt;";

            while (list($clave, $nomcol) = each($columnas)) {
                echo "&lt;td align=center&gt;$nomcol&lt;/td&gt;";
            }

            echo "&lt;/tr&gt;";

            /**
             * Obtener los resultados del conjunto de resultados.
             */
            while ($fila = cubrid_fetch($resultado)) {
                echo "&lt;tr&gt;";

                for ($i = 0; $i &lt; $número_campos; $i++) {
                    echo "&lt;td align=center&gt;";
                    echo $fila[$i];
                    echo "&lt;/td&gt;";
                }

                echo "&lt;/tr&gt;";
            }
        }
        /**
         * El módulo de PHP en CUBRID se ejecuta en una arquitectura de 3 capas. Incluso cuando
         * se llama a SELECT para el procesamiento de la transacción, es pasado como parte
         * de la transacción. Por lo tanto, la transacción necesita ser reiniciada
         * llamando a commit o incluso cuando se llamó a SELECT para un rendimiento
         * pulido.
         */
        cubrid_commit($cubrid_con);
        cubrid_disconnect($cubrid_con);
    ?&gt;
    &lt;/body&gt;
    &lt;/html&gt;

**Ejemplo #2 Ejemplo de Inserción de Datos**

&lt;html&gt;
&lt;head&gt;
&lt;meta http-equiv="content-type" content="text/html; charset=euc- kr"&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;center&gt;
&lt;table border=2&gt;
&lt;?php
/\*\*
_ ip_host es la dirección IP d donde está instalado el Agente de CUBRID
_ puerto_host es el número de puerto del Agente de CUBRID
_ nombre_bd es el nombre de la Base de Datos de CUBRID
_/
$ip_host = "localhost";
        $puerto_host = 33000;
        $nombre_bd = "demodb";
        $cubrid_con = @cubrid_connect($ip_host, $puerto_host, $nombre_bd);

        if (!$cubrid_con) {
            echo "Error en la Conexión a la Base de Datos";
            exit;
        }
    ?&gt;
    &lt;?php
        $sql = "insert into olympic (host_year,host_nation,host_city,"
            . "opening_date,closing_date) values (2008, 'China', 'Beijing',"
            . "to_date('08-08-2008','mm-dd- yyyy'),to_date('08-24-2008','mm-dd-yyyy')) ;";
        $resultado = cubrid_execute($cubrid_con, $sql);
        if ($resultado) {
            /**
             * Manejado con éxito, por lo que se envía.
             */
            cubrid_commit($cubrid_con);
            echo "Insertado con éxito";
        } else {
            /**
             * Ocurrió un error, por lo que el mensaje de error se imprime y se llama a rollback.
             */
            echo cubrid_error_msg();
            cubrid_rollback($cubrid_con);
        }
        cubrid_disconnect($cubrid_con);
    ?&gt;
    &lt;/body&gt;
    &lt;/html&gt;

# Funciones de CUBRID

# cubrid_bind

(PECL CUBRID &gt;= 8.3.0)

cubrid_bind — Vincular variables para una sentencia preparada como parámetros

### Descripción

**cubrid_bind**(
    [resource](#language.types.resource) $req_identifier,
    [int](#language.types.integer) $bind_index,
    [mixed](#language.types.mixed) $bind_value,
    [string](#language.types.string) $bind_value_type = ?
): [bool](#language.types.boolean)

La función **cubrid_bind()** se usa para vincular valores a un
marcador de posición nominado o signo de interrogación correspondiente en la sentencia SQL que
fue pasada a [cubrid_prepare()](#function.cubrid-prepare). Si
no se da bind_value_type, string será lo
predeterminado.

**Nota**:

    Si el tipo de datos a ser vinculados es BLOB/CLOB, CUBRID intentará mapear la
    información como un flujo de PHP. Si el tipo real de valor vinculado no es un flujo,
    CUBRID intentará convertirlo a cadena, y usarlo como la ruta completa y el nombre
    de fichero de un fichero del sistema de ficheros cliente.




    Si el tipo de datos a ser vinculados explícitamente es ENUM, el argumento
    bind_value debería ser el elemento enum que esté en formato string.




    En un entorno fragmentado de CUBRID, se debe incluir de bind_value_type en
    la función **cubrid_bind()**

La siguiente tabla muestra los tipos de los valores sustitutos.

    <caption>**Tipos de Datos de Vinculación de CUBRID**</caption>



       Soporte
       Tipo de Vinculación
       Tipo SQL Correspondiente






       Soportado
       STRING
       CHAR, VARCHAR



        
       NCHAR
       NCHAR, NVARCHAR



        
       BIT
       BIT, VARBIT



        
       NUMERIC or NUMBER
       SHORT, INT, NUMERIC



        
       FLOAT
       FLOAT



        
       DOUBLE
       DOUBLE



        
       TIME
       TIME



        
       DATE
       DATE



        
       TIMESTAMP
       TIMESTAMP



        
       OBJECT
       OBJECT



        
       ENUM
       ENUM



        
       BLOB
       BLOB



        
       CLOB
       CLOB



        
       NULL
       NULL



       No soportado
       SET
       SET



        
       MULTISET
       MULTISET



        
       SEQUENCE
       SEQUENCE




### Parámetros

     req_identifier
     Identificador de solicitud como resultado de
      [cubrid_prepare()](#function.cubrid-prepare)




     bind_index
     Índice de ubicación de los parámetros de vinculación. Comienza con 1.




     bind_value
     Valor actual para el vínculo.




     bind_index
     Un tipo de valor a vincular. (Es omitido por defecto.
      Así, el sistema internamente usa una cadena por omisión. Sin embargo, se necesita
      especificar el tipo exacto del valor como argumento cuando son de tipo NCHAR,
      BIT, o BLOB/CLOB).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.3.1

        Añadido el soporte para tipos de datos BLOB/CLOB.





### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_bind()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$result = cubrid_execute($conn, "SELECT code FROM event WHERE sports='Basketball' and gender='M'");
$row = cubrid_fetch_array($result, CUBRID_ASSOC);
$event_code = $row["code"];

cubrid_close_request($result);

$game_req = cubrid_prepare($conn, "SELECT athlete_code FROM game WHERE host_year=1992 and event_code=? and nation_code='USA'");
cubrid_bind($game_req, 1, $event_code, "number");
cubrid_execute($game_req);

printf("--- Dream Team (1992 United States men's Olympic basketball team) ---\n");
while ($athlete_code = cubrid_fetch_array($game_req, CUBRID_NUM)) {
$athlete_req  = cubrid_prepare($conn, "SELECT name FROM athlete WHERE code=? AND nation_code='USA' AND event='Basketball' AND gender='M'");
cubrid_bind($athlete_req, 1, $athlete_code[0], "number");
    cubrid_execute($athlete_req);
$row = cubrid_fetch_assoc($athlete_req);
printf("%s\n", $row["name"]);
}

cubrid_close_request($game_req);
cubrid_close_request($athlete_req);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

--- Dream Team (1992 United States men's Olympic basketball team) ---
Stockton John
Robinson David
Pippen Scottie
Mullin C.
Malone Karl
Laettner C.
Jordan Michael
Johnson Earvin
Ewing Patrick
Drexler Clyde
Bird Larry
Barkley Charles

**Ejemplo #2 Ejemplo de BLOB/CLOB de cubrid_bind()**

&lt;?php
$con = cubrid_connect("localhost", 33000, "demodb", "dba", "");
if ($con) {
cubrid_execute($con,"DROP TABLE if exists php_cubrid_lob_test");
    cubrid_execute($con,"CREATE TABLE php_cubrid_lob_test (doc_content CLOB)");
$sql = "INSERT INTO php_cubrid_lob_test(doc_content) VALUES(?)";
    $req = cubrid_prepare($con, $sql);

    $fp = fopen("book.txt", "rb");

    cubrid_bind($req, 1, $fp, "clob");
    cubrid_execute($req);

}
?&gt;

**Ejemplo #3 Ejemplo de BLOB/CLOB de cubrid_bind()**

&lt;?php
$con = cubrid_connect("localhost", 33000, "foo");
if ($con) {
cubrid_execute($con,"DROP TABLE if exists php_cubrid_lob_test");
    cubrid_execute($con,"CREATE TABLE php_cubrid_lob_test (image BLOB)");
$sql = "INSERT INTO php_cubrid_lob_test(image) VALUES(?)";
    $req = cubrid_prepare($con, $sql);

    cubrid_bind($req, 1, "cubrid_logo.png", "blob");
    cubrid_execute($req);

}
?&gt;

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_prepare()](#function.cubrid-prepare) - Prepara una consulta SQL para su ejecución

# cubrid_close_prepare

(PECL CUBRID &gt;= 8.3.0)

cubrid_close_prepare — Cerrar el gestor de solicitud

### Descripción

**cubrid_close_prepare**([resource](#language.types.resource) $req_identifier): [bool](#language.types.boolean)

La función **cubrid_close_prepare()** cierra el gestor de
solicitud dado por el argumento req_identifier, y
libera la región de memoria relacionada con el gestor. Es un alias de
[cubrid_close_request()](#function.cubrid-close-request).

### Parámetros

     req_identifier
     Identificador de solicitud.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_close_prepare()**

&lt;?php
$con = cubrid_connect ("localhost", 33000, "demodb", "dba", "");
if ($con) {
echo "conectado con éxito";
$req = cubrid_execute ( $con, "select * from members",
                           CUBRID_INCLUDE_OID | CUBRID_ASYNC);
   if ($req) {
while ( list ($id, $nombre) = cubrid_fetch ($req) ){
echo $id;
         echo $nombre;
      }
      cubrid_close_prepare($req); // o se puede usar cubrid_close_request($req)
   }
   cubrid_disconnect($con);
}
?&gt;

### Ver también

    - [cubrid_close_request()](#function.cubrid-close-request) - Cerrar el gestor de solicitud

# cubrid_close_request

(PECL CUBRID &gt;= 8.3.0)

cubrid_close_request — Cerrar el gestor de solicitud

### Descripción

**cubrid_close_request**([resource](#language.types.resource) $req_identifier): [bool](#language.types.boolean)

La función **cubrid_close_request()** cierra el gestor de
solicitud dado por el argumento req_identifier, y
libera la región de memoria relacionada con el gestor. Es un alias de
[cubrid_close_prepare()](#function.cubrid-close-prepare).

### Parámetros

     req_identifier
     Identificador de solicitud.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_close_request()**

&lt;?php
$con = cubrid_connect ("localhost", 33000, "demodb", "dba", "");
if ($con) {
echo "connected successfully";
$req = cubrid_execute ( $con, "select * from members",
                           CUBRID_INCLUDE_OID | CUBRID_ASYNC);
   if ($req) {
while ( list ($id, $name) = cubrid_fetch ($req) ){
echo $id;
         echo $name;
      }
      cubrid_close_request($req); // o se puede usar cubrid_close_prepare($req)
   }
   cubrid_disconnect($con);
}
?&gt;

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_col_get

(PECL CUBRID &gt;= 8.3.0)

cubrid_col_get — Recupera el contenido de los elementos de un tipo de colección utilizando el OID

### Descripción

**cubrid_col_get**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid, [string](#language.types.string) $attr_name): [array](#language.types.array)

La función **cubrid_col_get()** se utiliza para recuperar el contenido
de los atributos de los elementos de un tipo de colección (set, multiset, sequence),
en forma de un [array](#language.types.array).

### Parámetros

      conn_identifier



       Identificador de conexión.







      oid



       OID de la instancia a utilizar para la lectura.







      attr_name



       Nombre del atributo que se desea leer desde la instancia.





### Valores devueltos

Un [array](#language.types.array) (numérico, comenzando en 0) que contiene los elementos
deseados cuando la operación se ha realizado con éxito.

**[false](#constant.false)** (para distinguir los errores y el hecho de que los atributos tienen una
colección vacía o nula; en caso de error, se mostrará un mensaje de alerta;
en este caso, se puede recuperar el error utilizando la función
[cubrid_error_code()](#function.cubrid-error-code)), cuando la operación ha fallado.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_col_get()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

$size = cubrid_col_size($conn, $oid, "b");
var_dump($size);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
int(3)

# cubrid_col_size

(PECL CUBRID &gt;= 8.3.0)

cubrid_col_size — Obtener el número de elementos de la columna del tipo de colección usando OID

### Descripción

**cubrid_col_size**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid, [string](#language.types.string) $attr_name): [int](#language.types.integer)

La función **cubrid_col_size()** se usa para obtener el
número de elementos de un atributo de tipo de colección (conjunto, multiconjunto,
secuencia).

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     El OID de la instancia con la que se quiere trabajar.




     attr_name
     Nombre del atributo con el que se quiere trabajar.

### Valores devueltos

Número de elementos, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.3.1

        Cambio del valor devuelto: cuando el proceso no tiene éxito devuelve false, no -1.





### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_col_size()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

$size = cubrid_col_size($conn, $oid, "b");
var_dump($size);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
int(3)

# cubrid_column_names

(PECL CUBRID &gt;= 8.3.0)

cubrid_column_names — Obtener los nombres de las columnas del resultado

### Descripción

**cubrid_column_names**([resource](#language.types.resource) $req_identifier): [array](#language.types.array)

La función **cubrid_column_names()** se usa para obtener los
nombres de las columnas del resutado de la consulta usando req_identifier.

### Parámetros

     req_identifier
     Identificador de solicitud.

### Valores devueltos

Un array de valores de tipo string que contiene los nombres de las columnas, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_column_names()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$column_names = cubrid_column_names($result);
$column_types = cubrid_column_types($result);

printf("%-30s %-30s %-15s\n", "Column Names", "Column Types", "Column Maxlen");
for($i = 0, $size = count($column_names); $i &lt; $size; $i++) {
    $column_len = cubrid_field_len($result, $i);
    printf("%-30s %-30s %-15s\n", $column_names[$i], $column_types[$i], $column_len);
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Column Names Column Types Column Maxlen
host_year integer 11
event_code integer 11
athlete_code integer 11
stadium_code integer 11
nation_code char 3
medal char 1
game_date date 10

### Ver también

    - [cubrid_prepare()](#function.cubrid-prepare) - Prepara una consulta SQL para su ejecución

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_column_types()](#function.cubrid-column-types) - Obtener los tipos de columnas del resultado

# cubrid_column_types

(PECL CUBRID &gt;= 8.3.0)

cubrid_column_types — Obtener los tipos de columnas del resultado

### Descripción

**cubrid_column_types**([resource](#language.types.resource) $req_identifier): [array](#language.types.array)

La función **cubrid_column_types()** obtiene los tipos de columnas de
los resultados de la consulta usando req_identifier.

### Parámetros

     req_identifier
     Identificador de solicitud.

### Valores devueltos

Un array de valores de tipo string que contiene los tipos de las columnas, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_column_types()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$column_names = cubrid_column_names($result);
$column_types = cubrid_column_types($result);

printf("%-30s %-30s %-15s\n", "Column Names", "Column Types", "Column Maxlen");
for($i = 0, $size = count($column_names); $i &lt; $size; $i++) {
    $column_len = cubrid_field_len($result, $i);
    printf("%-30s %-30s %-15s\n", $column_names[$i], $column_types[$i], $column_len);
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Column Names Column Types Column Maxlen
host_year integer 11
event_code integer 11
athlete_code integer 11
stadium_code integer 11
nation_code char 3
medal char 1
game_date date 10

### Ver también

    - [cubrid_column_names()](#function.cubrid-column-names) - Obtener los nombres de las columnas del resultado

    - [cubrid_prepare()](#function.cubrid-prepare) - Prepara una consulta SQL para su ejecución

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_commit

(PECL CUBRID &gt;= 8.3.0)

cubrid_commit — Consigna una transacción

### Descripción

**cubrid_commit**([resource](#language.types.resource) $conn_identifier): [bool](#language.types.boolean)

La función **cubrid_commit()** se usa para ejecutar el envío
de la transacción a la que apunta conn_handle,
actualmente en progreso. La conexión al servidor se cierra después de
llamar a la función **cubrid_commit()**; sin embargo,
el gestor de conexión todavía es válido.

En CUBRID PHP, se deshabilita un modo de auto consigna por opmisión para la administración de transacciones.
Se puede establecer usando [cubrid_set_autocommit()](#function.cubrid-set-autocommit).
Se puede obtener su estado usando [cubrid_get_autocommit()](#function.cubrid-get-autocommit). Antes de comenzar una transacción,
acuérdese de deshabilitar el modo de auto consigna.

### Parámetros

     conn_identifier
     Identificador de conexión.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_commit()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE publishers");

$sql = &lt;&lt;&lt;EOD
CREATE TABLE publishers(
pub_id CHAR(3),
pub_name VARCHAR(20),
city VARCHAR(15),
state CHAR(2),
country VARCHAR(15)
)
EOD;
cubrid_set_autocommit($conn,false);
if (!cubrid_execute($conn, $sql)) {
printf("Error facility: %d\nError code: %d\nError msg: %s\n", cubrid_error_code_facility(), cubrid_error_code(), cubrid_error_msg());

    cubrid_disconnect($conn);
    exit;

}

$req = cubrid_prepare($conn, "INSERT INTO publishers VALUES(?, ?, ?, ?, ?)");

$id_list = array("P01", "P02", "P03", "P04");
$name_list = array("Abatis Publishers", "Core Dump Books", "Schadenfreude Press", "Tenterhooks Press");
$city_list = array("New York", "San Francisco", "Hamburg", "Berkeley");
$state_list = array("NY", "CA", NULL, "CA");
$country_list = array("USA", "USA", "Germany", "USA");

for ($i = 0, $size = count($id_list); $i &lt; $size; $i++) {
    cubrid_bind($req, 1, $id_list[$i]);
cubrid_bind($req, 2, $name_list[$i]);
cubrid_bind($req, 3, $city_list[$i]);
cubrid_bind($req, 4, $state_list[$i]);
cubrid_bind($req, 5, $country_list[$i]);

    if (!($ret = cubrid_execute($req))) {
        break;
    }

}

if (!$ret) {
    cubrid_rollback($conn);
} else {
cubrid_commit($conn);

    $req = cubrid_execute($conn, "SELECT * FROM publishers");
    while ($result = cubrid_fetch_assoc($req)) {
        printf("%-3s %-20s %-15s %-3s %-15s\n",
            $result["pub_id"], $result["pub_name"], $result["city"], $result["state"], $result["country"]);
    }

}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

P01 Abatis Publishers New York NY USA
P02 Core Dump Books San Francisco CA USA
P03 Schadenfreude Press Hamburg Germany
P04 Tenterhooks Press Berkeley CA USA

### Ver también

    - [cubrid_rollback()](#function.cubrid-rollback) - Anula una transacción

    - [cubrid_get_autocommit()](#function.cubrid-get-autocommit) - Recupera el modo auto-commit de la conexión

    - [cubrid_set_autocommit()](#function.cubrid-set-autocommit) - Define el modo auto-commit para la conexión

# cubrid_connect

(PECL CUBRID &gt;= 8.3.1)

cubrid_connect — Abrir una conexión al servidor CUBRID

### Descripción

**cubrid_connect**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $dbname,
    [string](#language.types.string) $userid = ?,
    [string](#language.types.string) $passwd = ?,
    [bool](#language.types.boolean) $new_link = **[false](#constant.false)**
): [resource](#language.types.resource)

La función **cubrid_connect()** se usa para establecer el
entorno para la conexión al servidor usando la dirección del servidor,
número de puerto, nombre de la base de datos, nombre de usuario, y contraseña. Si no
se dan el nombre de usuario y la contraseña, se realizará la conexión "PUBLIC" por
defecto.

### Parámetros

     host
     Nombre del host o dirección IP del servidor CAS de CUBRID.




     port
     Número de puerto del servidor CAS de CUBRID (BROKER_PORT configurado en $CUBRID/conf/cubrid_broker.conf).




     dbname
     Nombre de la base de datos.




     userid
     Nombre de usuario para la base de datos. Si no se da, el valor
      por omisión es "public".




     passwd
     Contraseña del usuario. Si no se da, el valor por omisión es "".




     new_link
     Si se hace una segunda llamada a
      **cubrid_connect()** con los mismos argumentos, no se
      establecerá una nueva conexión, en su lugar, se devolverá el identificador
      de conexión de la conexión ya abierta. El
      parámetro new_link modifica este comportamiento y
      hace que **cubrid_connect()** abra siempre una nueva conexión,
      incluso si **cubrid_connect()** fue llamada antes con los
      mismos parámetros.

### Valores devueltos

El identificador de conexión, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_connect()**

&lt;?php
printf("%-30s %s\n", "CUBRID PHP Version:", cubrid_version());

printf("\n");

$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

if (!$conn) {
die('Connect Error ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Información del Servidor:", $server_info);
printf("%-30s %s\n", "Información del Cliente:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "Conjunto de carac.:", $charset);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

CUBRID PHP Version: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 0

Información del Servidor: 9.1.0.0212
Información del Cliente: 9.1.0

Conjunto de carac. de CUBRID: iso8859-1

### Ver también

    - [cubrid_pconnect()](#function.cubrid-pconnect) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_connect_with_url()](#function.cubrid-connect-with-url) - Establecer el entorno para la conexión al servidor de CUBRID

    - [cubrid_pconnect_with_url()](#function.cubrid-pconnect-with-url) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

    - [cubrid_close()](#function.cubrid-close) - Cerrar la conexión de CUBRID

# cubrid_connect_with_url

(PECL CUBRID &gt;= 8.3.1)

cubrid_connect_with_url — Establecer el entorno para la conexión al servidor de CUBRID

### Descripción

**cubrid_connect_with_url**(
    [string](#language.types.string) $conn_url,
    [string](#language.types.string) $userid = ?,
    [string](#language.types.string) $passwd = ?,
    [bool](#language.types.boolean) $new_link = **[false](#constant.false)**
): [resource](#language.types.resource)

La función **cubrid_connect_with_url()** se usa para
establecer el entorno de conexión a su servidor usando la información
de conexión pasada con un argumento de cadena de url. Si la característica HA está
habilitada en CUBRID, se debe especificar la información de conexión del
servidor de emergencia, el cual se usa para la recuperación de fallos cuando sucede uno, en
el argumento de cadena de url de esta función. Si el nombre de usuario y la contraseña no se
dan se realizará la conexión "PUBLIC" por omisión.

&lt;url&gt; ::= CUBRID:&lt;host&gt;:&lt;db_name&gt;:&lt;db_user&gt;:&lt;db_password&gt;:[?&lt;properties&gt;]

&lt;properties&gt; ::= &lt;property&gt; [&amp;&lt;property&gt;]

&lt;properties&gt; ::= alhosts=&lt;alternative_hosts&gt;[ &amp;rctime=&lt;time&gt;]

&lt;properties&gt; ::= login_timeout=&lt;milli_sec&gt;

&lt;properties&gt; ::= query_timeout=&lt;milli_sec&gt;

&lt;properties&gt; ::= disconnect_on_query_timeout=true|false

&lt;alternative_hosts&gt; ::= &lt;standby_broker1_host&gt;:&lt;port&gt; [,&lt;standby_broker2_host&gt;:&lt;port&gt;]

&lt;host&gt; := HOSTNAME | IP_ADDR

&lt;time&gt; := SECOND

&lt;milli_sec&gt; := MILLI SECOND

    - host : Un nombre de host o dirección IP de la base de datos maestra

    - db_name : Un nombre de la base de datos

    - db_user : Un nombre del usuario de la base de datos

    - db_password : Una contraseña de usuario de la base de datos

    -
     alhosts: Especifica la información del agente del servidor de emergencia, el cual se
     usa para la recuperación de fallos cuando es imposible conectar al servidor activo.
     Se pueden especificar múltiples agentes para la recuperación de fallos, y la conexión a los agentes
     se intenta en el orden listado en alhosts


    - rctime : Un intervalo entre los intentos de conexión al agente activo en
     el que ocurrió el fallo. Después de que ocurra un fallo, el sistema se conecta al
     agente especificado por althosts (recuperación de fallos), finaliza la transacción, y después
     intenta conectarse al agente activo de la base de datos maestra cada rctime.
     El valor predeterminado es 600 segundos.


    -
     login_timeout : Valor de tiempo de espera (unidad: mseg.) para la identificación en la base de datos. El valor
     predeterminado es 0, lo que significa un aplazamiento infinito.


    -
     query_timeout : Valor de tiempo de espera (unidad: mseg.) para la solicitud de consulta. Cuando finaliza
     el tiempo de espera, se envía al servidor un mensaje para cancelar la transferencia de la consulta. El valor
     devuelto puede depender de de la configuración de disconnect_on_query_timeout; incluso si el
     mensaje para cancelar una petición es enviado al servidor, tal peticioón puede realizarse.


    -
     disconnect_on_query_timeout : Configura un valor para establecer si devolver inmediantamente
     un error de función que está siendo ejecutada al finalizar el tiempo de espera. El valor predeterminado es false.

**Nota**:

    ? y :, que son usados como identificadores
    en el URL de conexión de PHP, no pueden ser incluidos en la contraseña. El siguiente es
    un ejemplo de una contraseña que no es válida para usarla como URL de conexión ya que contiene
    "?:".




    $url = "CUBRID:localhost:33000:tdb:dba:12?:?login_timeout=100";




    Las contraseñas que contengan ? o :
    se pueden pasar como un parámetro aparte.




    $url = "CUBRID:localhost:33000:tbd:::?login_timeout=100";




    $conn = cubrid_connect_with_url($url, "dba", "12?");




    Si el usuario o la contraseña están vacíos no se podrá borrar ":". He aquí un
    ejemplo:




    $url = "CUBRID:localhost:33000:demodb:::";

### Parámetros

     conn_url
     Una cadena de caracteres que contiene la información de conexión al servidor.




     userid
     El nombre de usuario de la base de datos.




     passwd
     La contraseña del usuario.




     new_link
     Si se hace una segunda llamada a
      **cubrid_connect_with_url()** con los mismos argumentos,
      no se establecerá una nueva conexión, en su lugar, se devolverá el identificador
      de conexión de la conexión ya abierta. El
      parámetro new_link modifica este comportamiento y
      hace que **cubrid_connect_with_url()** abra siempre una nueva
      conexión, incluso si **cubrid_connect_with_url()** fue
      llamada antes con los mismos parámetros.

### Valores devueltos

El identificador de conexión, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_connect_with_url()**, url sin propiedades

&lt;?php
$conn_url = "CUBRID:localhost:33000:demodb:dba::";
$con = cubrid_connect_with_url($conn_url);

if ($con) {
   echo "Se conectó con éxito";
   cubrid_execute($con, "create table person(id int,name char(16))");
$req =cubrid_execute($con, "insert into person values(1,'James')");

if ($req) {
      cubrid_close_request($req);
cubrid_commit($con);
   } else {
      cubrid_rollback($con);
}
cubrid_disconnect($con);
}
?&gt;

**Ejemplo #2 Ejemplo de cubrid_connect_with_url()**, url con propiedades

&lt;?php
$conn_url = "CUBRID:127.0.0.1:33000:demodb:dba::?login_timeout=100";
$con = cubrid_connect_with_url ($conn_url);

if ($con) {
   echo "Se conectó con éxito";
   cubrid_execute($con, "create table person(id int,name char(16))");
$req =cubrid_execute($con, "insert into person values(1,'James')");

if ($req) {
      cubrid_close_request($req);
cubrid_commit($con);
   } else {
      cubrid_rollback($con);
}
cubrid_disconnect($con);
}
?&gt;

### Ver también

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_pconnect()](#function.cubrid-pconnect) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_pconnect_with_url()](#function.cubrid-pconnect-with-url) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

    - [cubrid_close()](#function.cubrid-close) - Cerrar la conexión de CUBRID

# cubrid_current_oid

(PECL CUBRID &gt;= 8.3.0)

cubrid_current_oid — Obtener el OID de la posición del cursor actual

### Descripción

**cubrid_current_oid**([resource](#language.types.resource) $req_identifier): [string](#language.types.string)

La función **cubrid_current_oid()** se usa para obtener el
oid de la posición del cursor actual desde el resultado de la consulta. Para usar
**cubrid_current_oid()**, la consulta ejecutada debe ser una
consulta actualizable, y se debe incluir la opción **[CUBRID_INCLUDE_OID](#constant.cubrid-include-oid)** durante
la ejecución de la consulta.

### Parámetros

     req_identifier
     Identificador de solicitud.

### Valores devueltos

Oid de la posición del cursor actual, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_current_oid()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$req = cubrid_execute($conn, "SELECT \* FROM code", CUBRID_INCLUDE_OID);
$oid = cubrid_current_oid($req);
$res = cubrid_get($conn, $oid);

print_r($res);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Array
(
[s_name] =&gt; X
[f_name] =&gt; Mixed
)

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_disconnect

(PECL CUBRID &gt;= 8.3.0)

cubrid_disconnect — Cerrar una conexión a una base de datos

### Descripción

**cubrid_disconnect**([resource](#language.types.resource) $conn_identifier = ?): [bool](#language.types.boolean)

La función **cubrid_disconnect()** cierra el gestor de
conexión y se desconecta del servidor. Si algún gestor de solicitud no se ha sido cerrado en este punto,
será cerrado. Es similar a la función de CUBRID compatible con MySQL [cubrid_close()](#function.cubrid-close).

### Parámetros

     conn_identifier
     Identificador de conexión.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_disconnect()**

&lt;?php
$con = cubrid_connect ("localhost", 33000, "demodb");
if ($con) {
echo "conectado con éxito";

$req = cubrid_execute( $con, "create table person(id int,name char(10))");
   if ($req) {
cubrid_close_request($req);
      cubrid_commit($con);
} else {
cubrid_rollback($con);
}

$req = cubrid_execute( $con, "insert into person values(1,'James')");
   if ($req) {
cubrid_close_request($req);
      cubrid_commit($con);
} else {
cubrid_rollback($con);
   }
   cubrid_disconnect($con);
}
?&gt;

### Ver también

    - [cubrid_close()](#function.cubrid-close) - Cerrar la conexión de CUBRID

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_connect_with_url()](#function.cubrid-connect-with-url) - Establecer el entorno para la conexión al servidor de CUBRID

# cubrid_drop

(PECL CUBRID &gt;= 8.3.0)

cubrid_drop — Borrar una instancia usando OID

### Descripción

**cubrid_drop**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [bool](#language.types.boolean)

La función **cubrid_drop()** se usa para borrar una
instancia de la base de datos usando el oid de la instancia.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     Oid de la instancia que se quiere borrar.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_drop()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(2, {4,5,7}, {44,55,66,666}, 'b')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

printf("--- Antes de Drop: ---\n");
$attr = cubrid_get($conn, $oid);
var_dump($attr);

if (cubrid_drop($conn, $oid)) {
    cubrid_commit($conn);
} else {
cubrid_rollback($conn);
}

cubrid_close_request($req);

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

printf("\n--- Después de Drop: ---\n");
$attr = cubrid_get($conn, $oid);
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

--- Antes de Drop: ---
array(4) {
["a"]=&gt;
string(1) "1"
["b"]=&gt;
array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
["c"]=&gt;
array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
["d"]=&gt;
string(10) "a "
}

--- Después de Drop: ---
array(4) {
["a"]=&gt;
string(1) "2"
["b"]=&gt;
array(3) {
[0]=&gt;
string(1) "4"
[1]=&gt;
string(1) "5"
[2]=&gt;
string(1) "7"
}
["c"]=&gt;
array(4) {
[0]=&gt;
string(2) "44"
[1]=&gt;
string(2) "55"
[2]=&gt;
string(2) "66"
[3]=&gt;
string(3) "666"
}
["d"]=&gt;
string(10) "b "
}

### Ver también

    - [cubrid_is_instance()](#function.cubrid-is-instance) - Comprobar si existe la instancia apuntada por OID

# cubrid_error_code

(PECL CUBRID &gt;= 8.3.0)

cubrid_error_code — Obtener el código de error de la llamada a una función más reciente

### Descripción

**cubrid_error_code**(): [int](#language.types.integer)

La función **cubrid_error_code()** se usa para obtener el
código de error del error que ocurrión durante la ejecución de la API. Normalmente
obtiene el código de error cuando la API devuelve false como valor de retorno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Código de error del error que ocurrió, o 0 (cero) si no
ocurre ningún error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_error_code()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_prepare($conn , "SELECT \* FROM code WHERE s_name=?");

$req = @cubrid_execute($req);
if (!$req) {
printf("Dispositivo del error: %d\nCódigo de error: %d\nMensaje de error: %s\n",
cubrid_error_code_facility(), cubrid_error_code(), cubrid_error_msg());

    cubrid_disconnect($conn);
    exit;

}
?&gt;

El ejemplo anterior mostrará:

Dispositivo del error: 4
Código de error: -30015
Mensaje de error: Some parameter not binded

### Ver también

    - [cubrid_error_code_facility()](#function.cubrid-error-code-facility) - Obtener el código de error del dispositivo

    - [cubrid_error_msg()](#function.cubrid-error-msg) - Obtener el último mensaje de error de la llamada a la función más reciente

# cubrid_error_code_facility

(PECL CUBRID &gt;= 8.3.0)

cubrid_error_code_facility — Obtener el código de error del dispositivo

### Descripción

**cubrid_error_code_facility**(): [int](#language.types.integer)

La función **cubrid_error_code_facility()** se usa para
obtener el código de dispositivo (nivel en el que ocurrió el error) desde el código
de error del error que ocurrió durante la ejecución de la API. Normalmente, se puede
obtener el código de error cuando la API devuelve false como valor de retorno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Código de dispositivo del código de error que ocuriió:
**[CUBRID_FACILITY_DBMS](#constant.cubrid-facility-dbms)**, **[CUBRID_FACILITY_CAS](#constant.cubrid-facility-cas)**,
**[CUBRID_FACILITY_CCI](#constant.cubrid-facility-cci)**, **[CUBRID_FACILITY_CLIENT](#constant.cubrid-facility-client)**.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_error_code_facility()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = @cubrid_execute($conn, "SELECT * FROM unknown");
if (!$req) {
printf("Dispositivo del error: %d\nCódigo de error: %d\nMensaje de error: %s\n",
cubrid_error_code_facility(), cubrid_error_code(), cubrid_error_msg());

    cubrid_disconnect($conn);
    exit;

}
?&gt;

El ejemplo anterior mostrará:

Dispositivo del error: 1
Código de error: -493
Mensaje de error: Syntax: In line 1, column 15 before END OF STATEMENT
Syntax error: unexpected 'unknown'

### Ver también

    - [cubrid_error_code()](#function.cubrid-error-code) - Obtener el código de error de la llamada a una función más reciente

    - [cubrid_error_msg()](#function.cubrid-error-msg) - Obtener el último mensaje de error de la llamada a la función más reciente

# cubrid_error_msg

(PECL CUBRID &gt;= 8.3.0)

cubrid_error_msg — Obtener el último mensaje de error de la llamada a la función más reciente

### Descripción

**cubrid_error_msg**(): [string](#language.types.string)

La función **cubrid_error_msg()** se usa para obtener el
mensaje de error que ocurrió durante la utilización de la API CUBRID. Normalmente obtiene
el mensaje de error cuando la API devuelve false como valor de retorno.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El mensaje de error que ocurrió.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_error_msg()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

if (!@cubrid_schema($conn, 100000)) {
printf("Dispositivo del error: %d\nCódigo de error: %d\nMensaje de error: %s\n",
cubrid_error_code_facility(), cubrid_error_code(), cubrid_error_msg());

    cubrid_disconnect($conn);
    exit;

}
?&gt;

El ejemplo anterior mostrará:

Dispositivo del error: 2
Código de error: -10015
Mensaje de error: Invalid T_CCI_SCH_TYPE value

### Ver también

    - [cubrid_error_code()](#function.cubrid-error-code) - Obtener el código de error de la llamada a una función más reciente

    - [cubrid_error_code_facility()](#function.cubrid-error-code-facility) - Obtener el código de error del dispositivo

# cubrid_execute

(PECL CUBRID &gt;= 8.3.0)

cubrid_execute — Ejecutar una sentencia SQL preparada

### Descripción

**cubrid_execute**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $sql, [int](#language.types.integer) $option = 0): [resource](#language.types.resource)

**cubrid_execute**([resource](#language.types.resource) $request_identifier, [int](#language.types.integer) $option = 0): [bool](#language.types.boolean)

La función **cubrid_execute()** se usa para ejecutar la
sentencia SQL dada. Ejecuta la consulta usando
conn_identifier y SQL, y luego devuelve el
gestor de solicitud creado. Se usa para la simple ejecución de la consulta,
donde el parámetro de enlace no es necesario. Además, la
función **cubrid_execute()** se usa para ejecutar la
sentencia preparada por medio de [cubrid_prepare()](#function.cubrid-prepare) y
[cubrid_bind()](#function.cubrid-bind). En este momento se necesitan especificar
los argumentos request_identifier y
option.

El argumento option se usa para determinar si recibir el OID
después de la ejecución de la consulta y si ejecutar la consulta en modo síncrono
o asíncrono. Se pueden especificar **[CUBRID_INCLUDE_OID](#constant.cubrid-include-oid)** y **[CUBRID_ASYNC](#constant.cubrid-async)** (o
**[CUBRID_EXEC_QUERY_ALL](#constant.cubrid-exec-query-all)** si se desea ejecutar múltiples sentencias SQL) usando
un operador OR a nivel de bit. Si no se especifica, ninguna de
ellas será seleccionada. Si la bandera **[CUBRID_EXEC_QUERY_ALL](#constant.cubrid-exec-query-all)** está activa, el modo
síncrono (sync_mode) se usa para devolver los resultados de la consulta, y en esos casos las
siguientes reglas serán aplicadas:

    - El valor devuelto es el resultado de la primera petición.

    -
     Si sucede un error en la consulta, la ejecución se procesa como un
     fallo.


    -
     En una consulta compuesta por c1, c2, c3, si sucede
     un error en c2 después del éxito de la ejecución de c1, el resultado de c1 permanece
     válido. Esto es, los éxitos previos en las ejecucuiones de consultas no se repiten
     cuando sucede un error.


    -
     Si una consulta se ejecuta de forma satisfactoria, el resultado de la segunda consulta puede
     obtenerse usando la función [cubrid_next_result()](#function.cubrid-next-result).

Si el primer argumento es request_identifier para
ejecutar la función [cubrid_prepare()](#function.cubrid-prepare), se puede especificar
una opción, solamente **[CUBRID_ASYNC](#constant.cubrid-async)**.

### Parámetros

     conn_identifier
     Identificador de conexión.




     sql
     SQL a ser ejecutado.




     option
     La opción de ejecución de la consulta CUBRID_INCLUDE_OID, CUBRID_ASYNC, CUBRID_EXEC_QUERY_ALL.




     request_identifier
     Identificador de [cubrid_prepare()](#function.cubrid-prepare).

### Valores devueltos

Gestor de solicitud, cuando el proceso tiene éxito y el primer parámetro es
conn_identifier; **[true](#constant.true)**, cuando el proceso tiene éxito y el primer argumento es
request_identifier, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Añade **[CUBRID_EXEC_QUERY_ALL](#constant.cubrid-exec-query-all)** como opción nueva.





### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_execute()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$result = cubrid_execute($conn, "SELECT code FROM event WHERE name='100m Butterfly' and gender='M'", CUBRID_ASYNC);
$row = cubrid_fetch_array($result, CUBRID_ASSOC);
$event_code = $row["code"];

cubrid_close_request($result);

$history_req = cubrid_prepare($conn, "SELECT \* FROM history WHERE event_code=?");
cubrid_bind($history_req, 1, $event_code, "number");
cubrid_execute($history_req);

printf("%-20s %-9s %-10s %-5s\n", "athlete", "host_year", "score", "unit");
while ($row = cubrid_fetch_array($history_req, CUBRID_ASSOC)) {
printf("%-20s %-9s %-10s %-5s\n",
$row["athlete"], $row["host_year"], $row["score"], $row["unit"]);
}

cubrid_close_request($history_req);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

athlete host_year score unit
Phelps Michael 2004 51.25 time

### Ver también

    - [cubrid_prepare()](#function.cubrid-prepare) - Prepara una consulta SQL para su ejecución

    - [cubrid_bind()](#function.cubrid-bind) - Vincular variables para una sentencia preparada como parámetros

    - [cubrid_next_result()](#function.cubrid-next-result) - Recupera el resultado de la siguiente consulta durante la ejecución

de múltiples consultas SQL

    - [cubrid_close_request()](#function.cubrid-close-request) - Cerrar el gestor de solicitud

    - [cubrid_commit()](#function.cubrid-commit) - Consigna una transacción

    - [cubrid_rollback()](#function.cubrid-rollback) - Anula una transacción

# cubrid_fetch

(PECL CUBRID &gt;= 8.3.0)

cubrid_fetch — Obtener la siguiente fila de un conjunto de resultados

### Descripción

**cubrid_fetch**([resource](#language.types.resource) $result, [int](#language.types.integer) $type = CUBRID_BOTH): [mixed](#language.types.mixed)

La función **cubrid_fetch()** se usa para obtener una única fila del resultado de la consulta. El cursor se mueve automáticamente a la siguiente columna después de obtener el resultado.

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute).




     type
     Tipo de array del resultado obtenido: CUBRID_NUM, CUBRID_ASSOC,
      CUBRID_BOTH, CUBRID_OBJECT. Si se operan con objetos lob, se puede
      usar CUBRID_LOB.

### Valores devueltos

Un array de resultados u objeto, cuando el proceso tiene éxito.

**[false](#constant.false)**, cuando no existen más filas; NULL, cuando el proceso no tiene éxito.

El resultado se puede recibir como array o como objeto, por lo que se puede decidir qué tipo de datos usar estableciendo el argumento type. La variable type se puede establecer a uno de los siguientes valores:

- CUBRID_NUM : Array numérico (basado en 0)

- CUBRID_ASSOC : Array asociativo

- CUBRID_BOTH : Array numérico y asociativo (predeterminado)

- CUBRID_OBJECT : Objeto que tiene el nombre del atributo como el nombre de la columna del resultado de la consulta

Cuando se omite el argumento type, el resultado será recibido usando la opción predeterminada CUBRID_BOTH. Cuando se quiere recibir el resultado de la consulta como objeto, el nombre de la columna del resultado debe obedecer las reglas de nombres de los identificadores de PHP. Por ejemplo, un nombre de columna como "count(\*)" no puede ser recibido como objeto.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_fetch()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$solicitud = cubrid_execute($conexión, "SELECT \* FROM stadium WHERE nation_code='GRE' AND seats &gt; 10000");

printf("%-40s %-10s %-6s %-20s\n", "name", "area", "seats", "address");
while ($fila = cubrid_fetch($solicitud)) {
printf("%-40s %-10s %-6s %-20s\n",
$fila["name"], $fila["area"], $fila["seats"], $fila["address"]);
}

// si se operan con objetos lob, se puede usar cubrid_fetch($solicitud, CUBRID_LOB)

cubrid_close_request($solicitud);

cubrid_disconnect($conexión);
?&gt;

El ejemplo anterior mostrará:

name area seats address
Panathinaiko Stadium 86300.00 50000 Athens, Greece
Olympic Stadium 54700.00 13000 Athens, Greece
Olympic Indoor Hall 34100.00 18800 Athens, Greece
Olympic Hall 52400.00 21000 Athens, Greece
Olympic Aquatic Centre 42500.00 11500 Athens, Greece
Markopoulo Olympic Equestrian Centre 64000.00 15000 Markopoulo, Athens, Greece
Faliro Coastal Zone Olympic Complex 34650.00 12171 Faliro, Athens, Greece
Athens Olympic Stadium 120400.00 71030 Maroussi, Athens, Greece
Ano Liossia 34000.00 12000 Ano Liosia, Athens, Greece

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_fetch_array()](#function.cubrid-fetch-array) - Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos

    - [cubrid_fetch_row()](#function.cubrid-fetch-row) - Devuelve un array numérico con los valores de la fila actual

    - [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) - Devuelve un array asociativo correspondiente a la fila recuperada

    - [cubrid_fetch_object()](#function.cubrid-fetch-object) - Recupera la siguiente línea y la devuelve como un objeto

# cubrid_free_result

(PECL CUBRID &gt;= 8.3.0)

cubrid_free_result — Liberar la memoria ocupada por los datos del resultado

### Descripción

**cubrid_free_result**([resource](#language.types.resource) $req_identifier): [bool](#language.types.boolean)

Esta función libera la memoria ocupada por los datos del resultado. Devuelve
**[true](#constant.true)** on success or **[false](#constant.false)** en caso de error. Observe que sólo se puede liberar el
buffer de obtención del cliente, y si se quiere liberar toda la memoria, use la función
[cubrid_close_request()](#function.cubrid-close-request).

### Parámetros

     req_identifier
     Éste es el identificador de solicitud.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_free_result()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$req = cubrid_execute($conn, "SELECT \* FROM history WHERE host_year=2004 ORDER BY event_code");
$row = cubrid_fetch_assoc($req);
var_dump($row);

cubrid_free_result($req);
cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(5) {
["event_code"]=&gt;
string(5) "20005"
["athlete"]=&gt;
string(12) "Hayes Joanna"
["host_year"]=&gt;
string(4) "2004"
["score"]=&gt;
string(5) "12.37"
["unit"]=&gt;
string(4) "time"
}

# cubrid_get

(PECL CUBRID &gt;= 8.3.0)

cubrid_get — Obtener una columna usando OID

### Descripción

**cubrid_get**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid, [mixed](#language.types.mixed) $attr = ?): [mixed](#language.types.mixed)

La función **cubrid_get()** se usa para obtener el atributo
de la instancia del oid dado. Se puede obtener
un solo atributo usando el tipo de datos de cadena para el
argumento attr, o muchos atributos usando el tipo de datos
array para el argumento attr.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia que se quiere leer.




     attr
     Nombre del atributo que se quiere leer.

### Valores devueltos

Contenido del atributo solicitado, cuando el proceso tiene éxito; Cuando
attr se establece al tipo de datos de cadena, el resultado es
devuelto como una cadena; cuando attr se establece como tipo
de datos array (númerico basado en 0), el resultado es devuelto como un
array asociativo. Cuanso se omite attr, entonces todos
los atributos se reciben como array.

**[false](#constant.false)** cuando el proceso no tiene éxito o el resultado es NULL (Si ocurre un error para
diferenciar una cadena vacía de NULL, se imprime un mensaje de advertencia.
Se puede comprobar el error usando [cubrid_error_code()](#function.cubrid-error-code))

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(2, {4,5,7}, {44,55,66,666}, 'b')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_get($conn, $oid, "b");
var_dump($attr);

$attr = cubrid_get($conn, $oid);
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

string(9) "{1, 2, 3}"
array(4) {
["a"]=&gt;
string(1) "1"
["b"]=&gt;
array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
["c"]=&gt;
array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
["d"]=&gt;
string(10) "a "
}

### Ver también

    - [cubrid_put()](#function.cubrid-put) - Actualiza una columna según su OID

# cubrid_get_autocommit

(PECL CUBRID &gt;= 8.4.0)

cubrid_get_autocommit — Recupera el modo auto-commit de la conexión

### Descripción

**cubrid_get_autocommit**([resource](#language.types.resource) $conn_identifier): [bool](#language.types.boolean)

La función **cubrid_get_autocommit()** se utiliza
para recuperar el estado del modo auto-commit de la conexión
a la base de datos CUBRID.

En CUBRID 8.4.0, el modo auto-commit está desactivado por omisión para la
gestión de las transacciones.

En CUBRID 8.4.1, el modo auto-commit está activado por omisión para la
gestión de las transacciones.

### Parámetros

     conn_identifier
     Identificador de conexión.

### Valores devueltos

**[true](#constant.true)**, cuando el modo auto-commit está activo.

**[false](#constant.false)**, cuando el modo auto-commit está inactivo.

**[null](#constant.null)** Si ocurre un error.

### Ver también

    - [cubrid_set_autocommit()](#function.cubrid-set-autocommit) - Define el modo auto-commit para la conexión

    - [cubrid_commit()](#function.cubrid-commit) - Consigna una transacción

# cubrid_get_charset

(PECL CUBRID &gt;= 8.3.0)

cubrid_get_charset — Devolver el conjunto de caracteres de la conexión CUBRID actual

### Descripción

**cubrid_get_charset**([resource](#language.types.resource) $conn_identifier): [string](#language.types.string)

Esta función devuelve el conjunto de caracteres de la conexión CUBRID actual y es similar
a la función de CUBRID compatible con MySQL
[cubrid_client_encoding()](#function.cubrid-client-encoding).

### Parámetros

     conn_identifier
     La conexión CUBRID.

### Valores devueltos

Una cadena que representa el conjunto de caracteres de la conexión CUBRID; en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_charset()**

&lt;?php

$con = cubrid_connect("localhost", 33000, "demodb");
if (!$con)
{
die('No se pudo realizar la conexión.');
}

printf("Conjunto de caracteres actual de CUBRID: %s\n", cubrid_get_charset($con));

?&gt;

El ejemplo anterior mostrará:

CUBRID current charset: iso8859-1

### Ver también

    - [cubrid_client_encoding()](#function.cubrid-client-encoding) - Devuelve el actual conjunto de caracteres de la conexión a CUBRID

# cubrid_get_class_name

(PECL CUBRID &gt;= 8.3.0)

cubrid_get_class_name — Obtener el nombre de la clase usando OID

### Descripción

**cubrid_get_class_name**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [string](#language.types.string)

La función **cubrid_get_class_name()** se usa para obtener el
nombre de la clase del oid. No funciona al seleccionar
datos desde las tablas del sistema, por ejemplo db_class.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     Oid de la instancia de la que se quiere comprobar su existencia.

### Valores devueltos

El nombre de la clase cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

**[false](#constant.false)**, cuando el proceso no tiene éxito.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_class_name()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$req = cubrid_execute($conn, "SELECT \* FROM code", CUBRID_INCLUDE_OID);
$oid = cubrid_current_oid($req);
$class_name = cubrid_get_class_name($conn, $oid);

print_r($class_name);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

code

### Ver también

    - [cubrid_is_instance()](#function.cubrid-is-instance) - Comprobar si existe la instancia apuntada por OID

    - [cubrid_drop()](#function.cubrid-drop) - Borrar una instancia usando OID

# cubrid_get_client_info

(PECL CUBRID &gt;= 8.3.0)

cubrid_get_client_info — Devolver la versión de la biblioteca cliente

### Descripción

**cubrid_get_client_info**(): [string](#language.types.string)

Esta función devuelve una cadena que representa la versión de la biblioteca cliente.

### Parámetros

### Valores devueltos

Una cadena que representa la versión de la biblioteca cliente; en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_client_info()**

&lt;?php
printf("%-30s %s\n", "CUBRID PHP Version:", cubrid_version());

printf("\n");

$conn = cubrid_connect("localhost", 33088, "demodb");

if (!$conn) {
die('Connect Error ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Server Info:", $server_info);
printf("%-30s %s\n", "Client Info:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "CUBRID Charset:", $charset);

cubrid_disconnect($conn);

?&gt;

El ejemplo anterior mostrará:

CUBRID PHP Version: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 0

Server Info: 9.1.0.0212
Client Info: 9.1.0

CUBRID Charset: iso8859-1

# cubrid_get_db_parameter

(PECL CUBRID &gt;= 8.3.0)

cubrid_get_db_parameter — Devuelve los parámetros de la base de datos CUBRID

### Descripción

**cubrid_get_db_parameter**([resource](#language.types.resource) $conn_identifier): [array](#language.types.array)

Esta función devuelve los parámetros de la base de datos CUBRID , o **[false](#constant.false)** si ocurre un error.
Devuelve un array asociativo con los valores de los siguientes
parámetros:

    - **[PARAM_ISOLATION_LEVEL](#constant.param-isolation-level)**

    - **[PARAM_LOCK_TIMEOUT](#constant.param-lock-timeout)**

    - **[PARAM_MAX_STRING_LENGTH](#constant.param-max-string-length)**

    - **[PARAM_AUTO_COMMIT](#constant.param-auto-commit)**







    <caption>**Parámetros de la base de datos**</caption>



       Parámetro
       Descripción






       PARAM_ISOLATION_LEVEL
       El nivel de aislamiento de la transacción.



       LOCK_TIMEOUT
       CUBRID proporciona la característica de bloqueo de tiempo de espera, que establece el tiempo
        de espera (en segundos) para el bloqueo hasta que el ajuste de bloqueo de transacción se
        permite. El valor predeterminado del parámetro lock_timeout_in_secs es -1, lo que
        significa que la aplicación cliente esperará indefinidamente hasta que se
        permita el bloqueo de transacción.




       PARAM_AUTO_COMMIT
       En CUBRID PHP, el modo de auto consigna es desabilitado por omisión por
        el gestor de transacciones. Puede establecerse usando
        la función [cubrid_set_autocommit()](#function.cubrid-set-autocommit).





La siguiente tabla muestra los niveles de aislamiento desde 1 hasta 6. Consiste en
esquema de tabla (fila) y nivel de aislamiento:

    <caption>**Niveles de Aislamiento Soportados por CUBRID**</caption>



       Nombre
       Descripción






       SERIALIZABLE (6)
       En este nivel de aislamiento, los problemas concernientes a la concurrencia (p.ej.
        lectura basura, lectura no repetible, lectura fantasma, etc.) no
        ocurren.



       CLASE DE LECTURA REPETIBLE con INSTANCIAS DE LECTURA REPETIBLE (5)
       Otra transacción T2 no puede actualizar el esquema de una tabla A mientras
        la transacción T1 está viendo la tabla A.
        La transacción T1 puede experimentar lectura fantasma para el registro R que fue
        insertado por otra transacción T2 cuando está obtenido repetidamente un
        registro especificado.



       CLASE DE LECTURA REPETIBLE con INSTANCIAS CONSIGNADAS DE LECTURA (o ESTABILIDAD DE CURSOR) (4)
       Otra transacción T2 no puede actualizar el esquema de una tabla A mientras
        la transacción T1 está viendo la tabla A.
        La transacción T1 puede experimentar lectura R (lectura no repetible) que fue
        actualizada y consignada por otra transacción T2 cuando está obteniendo
        repetidamente el registro R.



       CLASE DE LECTURA REPETIBLE con INSTANCIAS NO CONSIGNADAS DE LECTURA (3)
       Nivel de aislamiento predeterminado. Otra transacción T2 no puede actualizar
        el esquema de la tabla A mientras la transacción T1 está viendo la tabla A.
        La transacción T1 puede experimentar lectura R' (lectura basura) para el registro que
        fue actualizado pero no consignado por otra transacción T2.



       CLASE CONSIGNADA DE LECTURA con INSTANCIAS CONSIGNADAS DE LECTURA (2)
       La transacción T1 puede experimentar lectura A' (lectura no repetible) para
        la tabla que fue actualizada y consignada por otra transacción T2
        mientras que está viendo la tabla A repetidamente. La transacción T1 puede experimentar
        lectura R' (lectura no repetible) para el registro que fue actualizado y
        consignado por otra transacción T2 mientras se está obteniendo el registro
        R repetidamente.



       CLASE CONSIGNADA DE LECTURA con INSTANCIAS NO CONSIGNADAS DE LECTURA (1)
       La transacción T1 puede experimentar lectura A' (lectura no repetible) para
        la tabla que fue actualizada y consignada por otra transacción T2
        mientras que se ve repetidamente la tabla A. La transacción T1 puede experimentar
        lectura R' (lectura basura) para el registro qeu fue actualizado pero no consignado
        por otra transacción T2.




### Parámetros

     conn_identifier

      La conexión CUBRID. Si el identificador de conexión no se especifica,
      se asume el último enlace abierto por [cubrid_connect()](#function.cubrid-connect).


### Valores devueltos

Una matriz asociativa con los parámetros de la base de datos CUBRID; en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Cambia LOCK_TIMEOUT a PARAM_LOCK_TIMEOUT, y MAX_STRING_LENGTH a
       PARAM_MAX_STRING_LENGTH en el resultado.



### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_db_parameter()**

&lt;?php
printf("%-30s %s\n", "CUBRID PHP Version:", cubrid_version());

printf("\n");

$conn = cubrid_connect("localhost", 33088, "demodb");

if (!$conn) {
die('Connect Error ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Server Info:", $server_info);
printf("%-30s %s\n", "Client Info:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "CUBRID Charset:", $charset);

cubrid_disconnect($conn);

?&gt;

El ejemplo anterior mostrará:

CUBRID PHP Version: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 1

Server Info: 9.1.0.0212
Client Info: 9.1.0

CUBRID Charset: iso8859-1

### Ver también

    - [cubrid_set_db_parameter()](#function.cubrid-set-db-parameter) - Define los parámetros de la base de datos CUBRID

    - [cubrid_get_autocommit()](#function.cubrid-get-autocommit) - Recupera el modo auto-commit de la conexión

# cubrid_get_query_timeout

(PECL CUBRID &gt;= 8.4.1)

cubrid_get_query_timeout — Obtener el valor del tiempo de espera de consulta de la petición

### Descripción

**cubrid_get_query_timeout**([resource](#language.types.resource) $req_identifier): [int](#language.types.integer)

La función **cubrid_get_query_timeout()** se usa para obtener
el tiempo de espera de consulta de la petición.

### Parámetros

     req_identifier
     Identificador de petición.

### Valores devueltos

Devuelve el valor de tiempo de espera de la consulta en milisegundos de la petición actual en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_query_timeout()**

&lt;?php

$host = "localhost";
$port = 33000;
$db = "demodb";

$conn =
cubrid_connect_with_url("CUBRID:$host:$port:$db:::?login_timeout=50000&amp;query_timeout=5000&amp;disconnect_on_query_timeout=yes");

$req = cubrid_prepare($conn, "SELECT \* FROM code");

$timeout = cubrid_get_query_timeout($req);
var_dump($timeout);

cubrid_set_query_timeout($req, 1000);
$timeout = cubrid_get_query_timeout($req);
var_dump($timeout);

cubrid_close($conn);
?&gt;

El ejemplo anterior mostrará:

int(5000)
int(1000)

### Ver también

    - [cubrid_set_query_timeout()](#function.cubrid-set-query-timeout) - Define el tiempo máximo de ejecución de una consulta

# cubrid_get_server_info

(PECL CUBRID &gt;= 8.3.0)

cubrid_get_server_info — Devolver la versión del servidor CUBRID

### Descripción

**cubrid_get_server_info**([resource](#language.types.resource) $conn_identifier): [string](#language.types.string)

Esta función devuelve una cadena que representa la versión del servidor CUBRID.

### Parámetros

     conn_identifier
     La conexión CUBRID.

### Valores devueltos

Una cadena que representa la versión del servidor CUBRID; en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_get_server_info()**

&lt;?php
printf("%-30s %s\n", "CUBRID PHP Version:", cubrid_version());

printf("\n");

$conn = cubrid_connect("localhost", 33088, "demodb");

if (!$conn) {
die('Connect Error ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Server Info:", $server_info);
printf("%-30s %s\n", "Client Info:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "CUBRID Charset:", $charset);

cubrid_disconnect($conn);

?&gt;

El ejemplo anterior mostrará:

CUBRID PHP Version: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 1

Server Info: 9.1.0.0212
Client Info: 9.1.0

CUBRID Charset: iso8859-1

# cubrid_insert_id

(PECL CUBRID &gt;= 8.3.0)

cubrid_insert_id — Devuelve el ID generado por la última columna actualizada **[AUTO_INCREMENT](#constant.auto-increment)**

### Descripción

**cubrid_insert_id**([resource](#language.types.resource) $conn_identifier = ?): [string](#language.types.string)

La función **cubrid_insert_id()** recupera el ID
generado para la columna AUTO_INCREMENT que fue actualizada por la consulta
INSERT previa. Devuelve 0 si la consulta previa no generó nuevas
filas, o FALSE en caso de error.

**Nota**:

    CUBRID soporta AUTO_INCREMENT para más de una columna en una tabla. En
    la mayoría de los casos, habrá una única columna AUTO_INCREMENT en una tabla. Si
    hay varias columnas AUTO_INCREMENT, esta función no debería ser
    usada aunque devuelva un valor.

### Parámetros

     conn_identifier
     El Identificador de conexión previamente obtenido por una llamada a
      [cubrid_connect()](#function.cubrid-connect).


### Valores devueltos

Un string representa el ID generado para una columna AUTO:INCREMENT por la
consulta previa, en caso de éxito.

0, si la consulta previa no generó nuevas filas.

**[false](#constant.false)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Cambia el valor devuelto de un array a un string; elimina el primer
        parámetro class_name.





### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_insert_id()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

@cubrid_execute($conn, "DROP TABLE cubrid_test");
cubrid_execute($conn, "CREATE TABLE cubrid_test (d int AUTO_INCREMENT(1, 2), t varchar)");

for ($i = 0; $i &lt; 10; $i++) {
    cubrid_execute($conn, "INSERT INTO cubrid_test(t) VALUES('cubrid_test')");
}

$id = cubrid_insert_id();
var_dump($id);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

string(2) "19"

# cubrid_is_instance

(PECL CUBRID &gt;= 8.3.0)

cubrid_is_instance — Comprobar si existe la instancia apuntada por OID

### Descripción

**cubrid_is_instance**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [int](#language.types.integer)

La función **cubrid_is_instance()** se usa para comprobar
si existe la instancia apuntada por el oid dado
o no.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia que se quiere comprobar su existencia.

### Valores devueltos

1, si tal instancia existe;

0, si tal instancia no existe;

-1, en caso de error

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_is_instance()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$sql = &lt;&lt;&lt;EOD
SELECT host_year, medal, game_date
FROM game
WHERE athlete_code IN
(SELECT code FROM athlete WHERE name='Thorpe Ian');
EOD;

$req = cubrid_execute($conn, $sql, CUBRID_INCLUDE_OID);
$oid = cubrid_current_oid($req);

$res = cubrid_is_instance ($conn, $oid);
if ($res == 1) {
echo "La instancia a puntada por $oid existe.\n";
} else if ($res == 0){
echo "La instancia a puntada por $oid no existe.\n";
} else {
echo "error\n";
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

La instancia apuntada por @0|0|0 no existe.

### Ver también

    - [cubrid_drop()](#function.cubrid-drop) - Borrar una instancia usando OID

    - [cubrid_get_class_name()](#function.cubrid-get-class-name) - Obtener el nombre de la clase usando OID

# cubrid_lob_close

(PECL CUBRID &gt;= 8.3.1)

cubrid_lob_close — Cerrar información BLOB/CLOB

### Descripción

**cubrid_lob_close**([array](#language.types.array) $lob_identifier_array): [bool](#language.types.boolean)

**cubrid_lob_close()** se usa para cerrar todos los BLOB/CLOB
devueltos desde [cubrid_lob_get()](#function.cubrid-lob-get).

### Parámetros

     lob_identifier_array
     Array de identificadores LOB devuelto desde [cubrid_lob_get()](#function.cubrid-lob-get).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_lob_close()**

&lt;?php
$conn = cubrid_connect ("localhost", 33000, "demodb", "dba");

cubrid_execute($conn,"DROP TABLE if exists doc");
cubrid_execute($conn,"CREATE TABLE doc (id INT, doc_content CLOB)");
cubrid_execute($conn,"INSERT INTO doc VALUES (5,'hello,cubrid')");

$lobs = cubrid_lob_get($conn, "SELECT doc_content FROM doc WHERE id=5");
echo "Doc size: ".cubrid_lob_size($lobs[0])." bytes";
cubrid_lob_export($conn, $lobs[0], "doc_5.txt");
cubrid_lob_close($lobs);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob_get()](#function.cubrid-lob-get) - Recupera los datos BLOB/CLOB

    - [cubrid_lob_size()](#function.cubrid-lob-size) - Recupera el tamaño de los datos BLOB/CLOB

    - [cubrid_lob_export()](#function.cubrid-lob-export) - Exporta datos BLOB/CLOB a un fichero

    - [cubrid_lob_send()](#function.cubrid-lob-send) - Lee los datos BLOB/CLOB y los envía al navegador

# cubrid_lob_export

(PECL CUBRID &gt;= 8.3.1)

cubrid_lob_export — Exporta datos BLOB/CLOB a un fichero

### Descripción

**cubrid_lob_export**([resource](#language.types.resource) $conn_identifier, [resource](#language.types.resource) $lob_identifier, [string](#language.types.string) $path_name): [bool](#language.types.boolean)

La función **cubrid_lob_export()** se utiliza para recuperar
los datos BLOB/CLOB desde la base de datos CUBRID, y guardar sus contenidos
en un fichero. Para utilizar esta función, es necesario utilizar primero la
función [cubrid_lob_get()](#function.cubrid-lob-get) para recuperar las informaciones de
los BLOB/CLOB desde CUBRID.

### Parámetros

     conn_identifier
     Identificador de conexión.




     lob_identifier
     Identificador LOB.




     path_name
     Ruta hacia el fichero.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob_export()**

&lt;?php
$conn = cubrid_connect ("localhost", 33000, "demodb", "dba");

cubrid_execute($conn,"DROP TABLE if exists doc");
cubrid_execute($conn,"CREATE TABLE doc (id INT, doc_content CLOB)");
cubrid_execute($conn,"INSERT INTO doc VALUES (5,'hello,cubrid')");

$lobs = cubrid_lob_get($conn, "SELECT doc_content FROM doc WHERE id=5");
echo "Doc size: ".cubrid_lob_size($lobs[0])." bytes";
cubrid_lob_export($conn, $lobs[0], "doc_5.txt");
cubrid_lob_close($lobs);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob_get()](#function.cubrid-lob-get) - Recupera los datos BLOB/CLOB

    - [cubrid_lob_close()](#function.cubrid-lob-close) - Cerrar información BLOB/CLOB

    - [cubrid_lob_size()](#function.cubrid-lob-size) - Recupera el tamaño de los datos BLOB/CLOB

    - [cubrid_lob_send()](#function.cubrid-lob-send) - Lee los datos BLOB/CLOB y los envía al navegador

# cubrid_lob_get

(PECL CUBRID &gt;= 8.3.1)

cubrid_lob_get — Recupera los datos BLOB/CLOB

### Descripción

**cubrid_lob_get**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $sql): [array](#language.types.array)

La función **cubrid_lob_get()** se utiliza para recuperar
los datos de información meta BLOB/CLOB desde la base de datos CUBRID
(CUBRID recupera los BLOB/CLOB ejecutando una consulta SQL), y devuelve
todos los LOBs en forma de un array de recursos. Asegúrese
de que el SQL recupere únicamente una columna y que el tipo de datos
sea BLOB o CLOB.

Tenga en cuenta que el uso de la función
[cubrid_lob_close()](#function.cubrid-lob-close) libera los LOBs si ya no son necesarios.

### Parámetros

     conn_identifier
     Identificador de conexión.




     sql
     Consulta SQL a ejecutar.

### Valores devueltos

Devuelve un array de recursos LOB en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob_get()**

&lt;?php
$conn = cubrid_connect ("localhost", 33000, "demodb", "dba");

cubrid_execute($conn,"DROP TABLE if exists doc");
cubrid_execute($conn,"CREATE TABLE doc (id INT, doc_content CLOB)");
cubrid_execute($conn,"INSERT INTO doc VALUES (5,'hello,cubrid')");

$lobs = cubrid_lob_get($conn, "SELECT doc_content FROM doc WHERE id=5");
echo "Doc size: ".cubrid_lob_size($lobs[0])." bytes";
cubrid_lob_export($conn, $lobs[0], "doc_5.txt");
cubrid_lob_close($lobs);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob_close()](#function.cubrid-lob-close) - Cerrar información BLOB/CLOB

    - [cubrid_lob_size()](#function.cubrid-lob-size) - Recupera el tamaño de los datos BLOB/CLOB

    - [cubrid_lob_export()](#function.cubrid-lob-export) - Exporta datos BLOB/CLOB a un fichero

    - [cubrid_lob_send()](#function.cubrid-lob-send) - Lee los datos BLOB/CLOB y los envía al navegador

# cubrid_lob_send

(PECL CUBRID &gt;= 8.3.1)

cubrid_lob_send — Lee los datos BLOB/CLOB y los envía al navegador

### Descripción

**cubrid_lob_send**([resource](#language.types.resource) $conn_identifier, [resource](#language.types.resource) $lob_identifier): [bool](#language.types.boolean)

La función **cubrid_lob_send()** lee datos BLOB/CLOB
y los pasa al navegador. Para utilizar esta función, es necesario utilizar
primero la función [cubrid_lob_get()](#function.cubrid-lob-get) para recuperar las
informaciones de los BLOB/CLOB desde CUBRID.

### Parámetros

     conn_identifier
     Identificador de conexión.




     lob_identifier
     Identificador LOB.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob_send()**

&lt;?php
$conn = cubrid_connect ("localhost", 33000, "demodb", "dba");

cubrid_execute($conn,"DROP TABLE if exists doc");
cubrid_execute($conn,"CREATE TABLE doc (id INT, doc_content CLOB)");
cubrid_execute($conn,"INSERT INTO doc VALUES (5,'hello,cubrid')");

$lobs = cubrid_lob_get($conn, "SELECT doc_content FROM doc WHERE id=5");

cubrid_lob_send($conn, $lobs[0]);
cubrid_lob_close($lobs);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob_get()](#function.cubrid-lob-get) - Recupera los datos BLOB/CLOB

    - [cubrid_lob_close()](#function.cubrid-lob-close) - Cerrar información BLOB/CLOB

    - [cubrid_lob_size()](#function.cubrid-lob-size) - Recupera el tamaño de los datos BLOB/CLOB

    - [cubrid_lob_export()](#function.cubrid-lob-export) - Exporta datos BLOB/CLOB a un fichero

# cubrid_lob_size

(PECL CUBRID &gt;= 8.3.1)

cubrid_lob_size — Recupera el tamaño de los datos BLOB/CLOB

### Descripción

**cubrid_lob_size**([resource](#language.types.resource) $lob_identifier): [string](#language.types.string)

La función **cubrid_lob_size()** se utiliza para recuperar
el tamaño de los datos BLOB/CLOB.

### Parámetros

     lob_identifier
     Identificador LOB.

### Valores devueltos

Una cadena representando el tamaño de los datos LOB, cuando
la operación ha tenido éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        El tipo del valor devuelto ha cambiado.
        Antes era un entero, ahora es una
        cadena de caracteres.





### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob_size()**

&lt;?php
$lobs = cubrid_lob_get($con, "SELECT doc_content FROM doc WHERE doc_id=5");
echo "Tamaño de la documentación :".cubrid_lob_size($lobs[0]);
cubrid_lob_export($conn, $lobs[0], "doc_5.txt");
cubrid_lob_close($lobs);
?&gt;

### Ver también

    - [cubrid_lob_get()](#function.cubrid-lob-get) - Recupera los datos BLOB/CLOB

    - [cubrid_lob_close()](#function.cubrid-lob-close) - Cerrar información BLOB/CLOB

    - [cubrid_lob_export()](#function.cubrid-lob-export) - Exporta datos BLOB/CLOB a un fichero

    - [cubrid_lob_send()](#function.cubrid-lob-send) - Lee los datos BLOB/CLOB y los envía al navegador

# cubrid_lob2_bind

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_bind — Asocia un objeto LOB o una cadena de caracteres a un objeto LOB
como argumento de una consulta preparada

### Descripción

**cubrid_lob2_bind**(
    [resource](#language.types.resource) $req_identifier,
    [int](#language.types.integer) $bind_index,
    [mixed](#language.types.mixed) $bind_value,
    [string](#language.types.string) $bind_value_type = ?
): [bool](#language.types.boolean)

La función **cubrid_lob2_bind()** se utiliza para asociar
datos BLOB/CLOB a un marcador correspondiente en una consulta SQL
pasada a la función [cubrid_prepare()](#function.cubrid-prepare). Si el argumento
bind_value_type no se proporciona, la cadena será
por omisión "BLOB". Pero si se utiliza primero la función
[cubrid_lob2_new()](#function.cubrid-lob2-new), el argumento bind_value_type
será consistente con el argumento type en
la función [cubrid_lob2_new()](#function.cubrid-lob2-new).

### Parámetros

     req_identifier


       Identificador de la petición, resultado de la función [cubrid_prepare()](#function.cubrid-prepare).






     bind_index


       Posición de los argumentos asociados. Comienza en 1.






     bind_value


       Valor actual para la asociación.






     bind_value_type


       Debe ser "BLOB" o "CLOB" y no es sensible a mayúsculas/minúsculas.
       Si no se proporciona, el valor por omisión será "BLOB".





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob2_bind()**

&lt;?php
// Tabla : test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");

$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES (?, ?)");

cubrid_bind($req,1, 3);

$lob = cubrid_lob2_new($conn, 'CLOB');
cubrid_lob2_bind($req, 2, $lob);

cubrid_execute($req);

cubrid_bind($req, 1, 4);

cubrid_lob2_bind($req, 2, 'CUBRID LOB2 TEST', 'CLOB');

cubrid_execute($req);

cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_new()](#function.cubrid-lob2-new) - Crea un nuevo objeto LOB

    - [cubrid_lob2_close()](#function.cubrid-lob2-close) - Cierra un objeto LOB

# cubrid_lob2_close

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_close — Cierra un objeto LOB

### Descripción

**cubrid_lob2_close**([resource](#language.types.resource) $lob_identifier): [bool](#language.types.boolean)

La función **cubrid_lob2_close()** se utiliza para cerrar
un objeto LOB, devuelto por la función [cubrid_lob2_new()](#function.cubrid-lob2-new)
o recuperado desde el conjunto de resultados.

### Parámetros

     lob_identifier


       Un identificador LOB, resultado de la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperado
       desde el conjunto de resultados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_new()](#function.cubrid-lob2-new) - Crea un nuevo objeto LOB

# cubrid_lob2_export

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_export — Exporta un objeto LOB a un fichero

### Descripción

**cubrid_lob2_export**([resource](#language.types.resource) $lob_identifier, [string](#language.types.string) $file_name): [bool](#language.types.boolean)

La función **cubrid_lob2_export()** se utiliza
para guardar los datos BLOB/CLOB en un fichero. Para utilizar
esta función, primero debe utilizarse la función
[cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperarse un objeto LOB desde la
base de datos CUBRID. Si el fichero no existe, la operación fallará.
Esta función no modificará la posición del cursor del objeto LOB.
Opera sobre el objeto LOB en su totalidad.

### Parámetros

     lob_identifier


       Un identificador LOB resultante de la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperado desde el juego de resultados.






     filename


       Nombre del fichero en el cual se desean guardar los datos BLOB/CLOB.
       La ruta hacia el fichero también puede ser especificada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 cubrid_lob2_export()** ejemplo

&lt;?php
// Tabla : test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists doc");
cubrid_execute($conn,"CREATE TABLE doc (id INT, doc_content CLOB)");
cubrid_execute($conn,"INSERT INTO doc VALUES (5,'hello,cubrid')");

$req = cubrid_prepare($conn, "select \* from doc");

cubrid_execute($req);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);

$row = cubrid_fetch($req, CUBRID_NUM | CUBRID_LOB);

cubrid_lob2_export($row[1], "doc_3.txt");

cubrid_lob2_close($row[1]);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_new()](#function.cubrid-lob2-new) - Crea un nuevo objeto LOB

    - [cubrid_lob2_close()](#function.cubrid-lob2-close) - Cierra un objeto LOB

    - [cubrid_lob2_import()](#function.cubrid-lob2-import) - Importa datos BLOB/CLOB desde un fichero

    - [cubrid_lob2_bind()](#function.cubrid-lob2-bind) - Asocia un objeto LOB o una cadena de caracteres a un objeto LOB

como argumento de una consulta preparada

# cubrid_lob2_import

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_import — Importa datos BLOB/CLOB desde un fichero

### Descripción

**cubrid_lob2_import**([resource](#language.types.resource) $lob_identifier, [string](#language.types.string) $file_name): [bool](#language.types.boolean)

La función **cubrid_lob2_import()** se utiliza para importar
datos BLOB/CLOB desde un fichero. Para utilizar esta función, primero
debe utilizarse la función [cubrid_lob2_new()](#function.cubrid-lob2-new) o
recuperarse un objeto LOB desde la base de datos CUBRID. Si el fichero no existe,
la operación fallará. Esta función no afecta a la posición del cursor
en el objeto LOB; opera sobre el objeto LOB en su totalidad.

### Parámetros

     lob_identifier


       Un identificador LOB, resultado de la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperado desde el juego de
       resultados.






     filename


       El nombre del fichero desde el cual los datos BLOB/CLOB deben
       ser importados. La ruta hacia el fichero también es soportada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con [cubrid_lob2_export()](#function.cubrid-lob2-export)**

&lt;?php

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");

$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES (?, ?)");
cubrid_bind($req, 1, 1);

$lob = cubrid_lob2_new($conn, "clob");
cubrid_lob2_import($lob, "doc_1.txt");
cubrid_lob2_bind($req, 2, $lob, 'CLOB'); // o cubrid_lob2_bind($req, 2, $lob);

cubrid_execute($req);

cubrid_lob2_close($lob);
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_new()](#function.cubrid-lob2-new) - Crea un nuevo objeto LOB

    - [cubrid_lob2_close()](#function.cubrid-lob2-close) - Cierra un objeto LOB

    - [cubrid_lob2_export()](#function.cubrid-lob2-export) - Exporta un objeto LOB a un fichero

    - [cubrid_lob2_bind()](#function.cubrid-lob2-bind) - Asocia un objeto LOB o una cadena de caracteres a un objeto LOB

como argumento de una consulta preparada

# cubrid_lob2_new

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_new — Crea un nuevo objeto LOB

### Descripción

**cubrid_lob2_new**([resource](#language.types.resource) $conn_identifier = ?, [string](#language.types.string) $type = "BLOB"): [resource](#language.types.resource)

La función **cubrid_lob2_new()** se utiliza para crear
un nuevo objeto LOB (tanto BLOB como CLOB).
Esta función debe ser utilizada antes de vincular un objeto LOB.

### Parámetros

     conn_identifier


       Un identificador de conexión. Si no se especifica, se utilizará la última
       conexión abierta con la función [cubrid_connect()](#function.cubrid-connect) o
       la función [cubrid_connect_with_url()](#function.cubrid-connect-with-url).






     type


       Puede ser "BLOB" o "CLOB", y no es sensible a mayúsculas/minúsculas.
       El valor por omisión es "BLOB".




### Valores devueltos

Un identificador LOB en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_close()](#function.cubrid-lob2-close) - Cierra un objeto LOB

# cubrid_lob2_read

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_read — Lee datos BLOB/CLOB

### Descripción

**cubrid_lob2_read**([resource](#language.types.resource) $lob_identifier, [int](#language.types.integer) $len): [string](#language.types.string)

La función **cubrid_lob2_read()**
lee len bytes desde los datos LOB,
y devuelve los bytes leídos.

### Parámetros

     lob_identifier


       Un identificador LOB, resultado de la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperado desde el conjunto
       de resultados.






     len


       Cantidad de datos a leer desde los datos LOB.





### Valores devueltos

Devuelve el contenido como [string](#language.types.string),
**[false](#constant.false)** cuando no hay más datos,
o **[null](#constant.null)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo 1 con cubrid_lob2_read()**

&lt;?php
// test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "public", "");

$req = cubrid_execute($conn, "select \* from test_lob");

$row = cubrid_fetch_row($req, CUBRID_LOB);

print "position now is " . cubrid_lob2_tell($row[1]) . "\n";

cubrid_lob2_seek($row[1], 10, CUBRID_CURSOR_FIRST);

print "\nPosición después del desplazamiento: " . cubrid_lob2_tell($row[1]) . "\n";

$data = cubrid_lob2_read($row[1], 12);

print "\nPosición después de la lectura: " . cubrid_lob2_tell($row[1]) . "\n";

print $data . "\n";

cubrid_lob2_seek($row[1], 5, CUBRID_CURSOR_CURRENT);

print "\nPosición después de un nuevo desplazamiento: " . cubrid_lob2_tell($row[1]) . "\n";

$data = cubrid_lob2_read($row[1], 20);
print $data . "\n";

cubrid_disconnect($conn);
?&gt;

**Ejemplo #2 Ejemplo 2 con cubrid_lob2_read()**

&lt;?php
// test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

$req = cubrid_execute($conn, "select \* from test_lob");

$row = cubrid_fetch_row($req, CUBRID_LOB);

while (true) {
if ($data = cubrid_lob2_read($row[1], 1024)) {
print $data . "\n";
    }
    elseif ($data === false) {
print "No hay más datos\n";
break;
}
else {
print "Ha ocurrido un error\n";
break;
}
}

cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_seek

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_seek — Desplaza el cursor de un objeto LOB

### Descripción

**cubrid_lob2_seek**([resource](#language.types.resource) $lob_identifier, [int](#language.types.integer) $offset, [int](#language.types.integer) $origin = CUBRID_CURSOR_CURRENT): [bool](#language.types.boolean)

La función **cubrid_lob2_seek()** se utiliza
para desplazar la posición del cursor de un objeto LOB según el
argumento offset especificado, y en la dirección
indicada por el argumento origin.

Para definir el argumento origin, puede utilizarse la
constante **[CUBRID_CURSOR_FIRST](#constant.cubrid-cursor-first)** para desplazar la posición del cursor
offset unidades hacia adelante desde el inicio.
En este caso, offset debe ser un valor positivo.

Si se utiliza la constante **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)** para el parámetro
origin, puede desplazarse hacia adelante o hacia atrás.
El argumento offset puede ser negativo o positivo.

Si se utiliza la constante **[CUBRID_CURSOR_LAST](#constant.cubrid-cursor-last)** para el parámetro
origin, puede desplazarse hacia atrás
offset unidades desde el final del objeto LOB;
el argumento offset solo puede ser positivo en este caso.

### Parámetros

     lob_identifier


       Un identificador LOB, resultado de la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o recuperado desde el conjunto de resultados.






     offset


       Número de unidades a utilizar para desplazar el cursor.






     origin

      Este parámetro puede tomar los siguientes valores:


      CUBRID_CURSOR_FIRST: Se desplaza hacia adelante desde el inicio.


      CUBRID_CURSOR_CURRENT: Se desplaza hacia adelante o hacia atrás, desde la posición actual.


      CUBRID_CURSOR_LAST: Se desplaza hacia atrás desde el final del objeto LOB.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob2_seek()**

&lt;?php
// test_lob (id INT, contents CLOB)
$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");
$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES(2, ?)");

$lob = cubrid_lob2_new($conn, 'CLOB');
$len = cubrid_lob2_write($lob, "Hello world");

cubrid_lob2_seek($lob, 0, CUBRID_CURSOR_LAST);
cubrid_lob2_write($lob, "beautiful");

cubrid_lob2_seek($lob, 15, CUBRID_CURSOR_FIRST);
$data = cubrid_lob2_read($lob, 5);

echo $data."\n";

cubrid_lob2_bind($req, 1, $lob);
cubrid_execute($req);

cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_seek64

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_seek64 — Desplaza el cursor de un objeto LOB

### Descripción

**cubrid_lob2_seek64**([resource](#language.types.resource) $lob_identifier, [string](#language.types.string) $offset, [int](#language.types.integer) $origin = CUBRID_CURSOR_CURRENT): [bool](#language.types.boolean)

La función **cubrid_lob2_seek64()** se utiliza
para desplazar la posición del cursor en un objeto LOB de un valor
proporcionado por el argumento offset, en la dirección
proporcionada por el argumento origin.
Si la posición offset es mayor que la capacidad
de almacenamiento de un entero, puede utilizarse esta función.

Para definir el argumento origin, puede
utilizarse la constante **[CUBRID_CURSOR_FIRST](#constant.cubrid-cursor-first)** para definir la posición
del cursor a la que se añaden offset unidades
desde el principio. En este caso, offset debe ser un valor
positivo.

Si se utiliza **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)** para el argumento origin,
puede desplazarse hacia atrás, así como hacia adelante. Y el argumento
offset podrá ser positivo o negativo.

Si se utiliza la constante **[CUBRID_CURSOR_LAST](#constant.cubrid-cursor-last)** para el argumento
origin, puede desplazarse hacia atrás de
offset unidades desde el final del objeto LOB y
el argumento offset solo podrá ser positivo.

**Nota**:

    Si se utiliza esta función para desplazar la posición del cursor de un
    objeto LOB, debe pasarse el argumento offset
    en forma de string.

### Parámetros

     lob_identifier


       Un identificador LOB, recuperado desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el conjunto de resultados.






     offset


       Número de unidades de desplazamiento del cursor.





     origin

      Este argumento puede tomar los siguientes valores:


      CUBRID_CURSOR_FIRST: desplaza el cursor hacia adelante partiendo del principio.


      CUBRID_CURSOR_CURRENT: desplaza el cursor hacia atrás y hacia adelante desde la posición actual.


      CUBRID_CURSOR_LAST: desplaza el cursor hacia atrás desde el final del objeto LOB.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lob2_seek64()**

&lt;?php
// test_lob (id INT, contents CLOB)
// La longitud de los datos de doc_1.txt debe ser superior a 20101029056306120215.

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");

$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES (?, ?)");
cubrid_bind($req, 1, 1);

$lob = cubrid_lob2_new($conn, "clob");
cubrid_lob2_import($lob, "doc_1.txt");
cubrid_lob2_bind($req, 2, $lob, 'CLOB'); // o cubrid_lob2_bind($req, 2, $lob);

cubrid_execute($req);

cubrid_lob2_close($lob);

$req = cubrid_execute($conn, "select \* from test_lob");
$row = cubrid_fetch_row($req, CUBRID_LOB);
$lob = $row[1];

cubrid_lob2_seek64($lob, "20101029056306120215", CUBRID_CURSOR_FIRST);
$data = cubrid_lob2_read($lob, 20);
echo $data."\n";
cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_size

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_size — Obtiene el tamaño de un objeto LOB

### Descripción

**cubrid_lob2_size**([resource](#language.types.resource) $lob_identifier): [int](#language.types.integer)

La función **cubrid_lob2_size()** se utiliza para obtener
el tamaño de un objeto LOB.

### Parámetros

     lob_identifier


       Un identificador LOB, obtenido desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el conjunto de resultados.





### Valores devueltos

Devuelve el tamaño del objeto LOB en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_size64

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_size64 — Recupera el tamaño de un objeto LOB

### Descripción

**cubrid_lob2_size64**([resource](#language.types.resource) $lob_identifier): [string](#language.types.string)

La función **cubrid_lob2_size64()** se utiliza para recuperar
el tamaño de un objeto LOB. Si el tamaño del objeto LOB es mayor
que la capacidad de almacenamiento de un entero, puede utilizarse esta función,
y devolverá el tamaño en forma de string.

### Parámetros

     lob_identifier


       Un identificador LOB, recuperado desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el conjunto de resultados.





### Valores devueltos

Devuelve el tamaño de un objeto LOB en forma de string en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

# cubrid_lob2_tell

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_tell — Recupera la posición del cursor en un objeto LOB

### Descripción

**cubrid_lob2_tell**([resource](#language.types.resource) $lob_identifier): [int](#language.types.integer)

La función **cubrid_lob2_tell()** se utiliza
para recuperar la posición del cursor en el objeto LOB.

### Parámetros

     lob_identifier


       Un identificador LOB, recuperado desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el juego de resultados.





### Valores devueltos

Devuelve la posición del cursor en el objeto LOB en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_tell64

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_tell64 — Recupera la posición del cursor en el objeto LOB

### Descripción

**cubrid_lob2_tell64**([resource](#language.types.resource) $lob_identifier): [string](#language.types.string)

La función **cubrid_lob2_tell64()** se utiliza
para recuperar la posición del cursor en el objeto LOB. Si la
longitud del objeto LOB es mayor que la capacidad de almacenamiento
de un entero, puede utilizarse esta función y devolverá la información
en forma de string.

### Parámetros

     lob_identifier


       Un identificador LOB, recuperado desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el conjunto de resultados.





### Valores devueltos

Devuelve la posición del cursor en el objeto LOB, en forma de
string en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_write()](#function.cubrid-lob2-write) - Escribe en un objeto LOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lob2_write

(PECL CUBRID &gt;= 8.4.1)

cubrid_lob2_write — Escribe en un objeto LOB

### Descripción

**cubrid_lob2_write**([resource](#language.types.resource) $lob_identifier, [string](#language.types.string) $buf): [bool](#language.types.boolean)

La función **cubrid_lob2_write()** lee los datos
desde el argumento buf y los almacena en el objeto LOB.
Tenga en cuenta que esta función solo puede añadir caracteres actualmente.

### Parámetros

     lob_identifier


       Un identificador LOB, obtenido desde la función
       [cubrid_lob2_new()](#function.cubrid-lob2-new) o desde el conjunto de resultados.






     buf


       Los datos que deben ser escritos en el objeto LOB.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo 1 con cubrid_lob2_write()**

&lt;?php
// test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");

$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES(2, ?)");

$lob = cubrid_lob2_new($conn, 'CLOB');
$len = cubrid_lob2_write($lob, "Hello world");

cubrid_lob2_bind($req, 1, $lob);
cubrid_execute($req);

cubrid_disconnect($conn);
?&gt;

**Ejemplo #2 Ejemplo 2 con cubrid_lob2_write()**

&lt;?php
// test_lob (id INT, contents CLOB)

$conn = cubrid_connect("localhost", 33000, "demodb", "dba", "");

cubrid_execute($conn,"DROP TABLE if exists test_lob");
cubrid_execute($conn,"CREATE TABLE test_lob (id INT, contents CLOB)");

$req = cubrid_prepare($conn, "INSERT INTO test_lob VALUES(1, ?)");
$lob1 = cubrid_lob2_new($conn, 'CLOB');
$len = cubrid_lob2_write($lob1, "cubrid php driver");
cubrid_lob2_bind($req, 1, $lob1);
cubrid_execute($req);

$req = cubrid_execute($conn, "select \* from test_lob");

$row = cubrid_fetch_row($req, CUBRID_LOB);
$lob2 = $row[1];
cubrid_lob2_seek($lob2, 0, CUBRID_CURSOR_LAST);

$pos = cubrid_lob2_tell($lob2);
print "pos before write: $pos\n";

cubrid_lob2_write($lob2, "Hello world");

$pos = cubrid_lob2_tell($lob2);
print "Posición después de escribir: $pos\n";

cubrid_disconnect($conn);
?&gt;

### Ver también

    - [cubrid_lob2_read()](#function.cubrid-lob2-read) - Lee datos BLOB/CLOB

    - [cubrid_lob2_seek()](#function.cubrid-lob2-seek) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_seek64()](#function.cubrid-lob2-seek64) - Desplaza el cursor de un objeto LOB

    - [cubrid_lob2_tell()](#function.cubrid-lob2-tell) - Recupera la posición del cursor en un objeto LOB

    - [cubrid_lob2_tell64()](#function.cubrid-lob2-tell64) - Recupera la posición del cursor en el objeto LOB

    - [cubrid_lob2_size()](#function.cubrid-lob2-size) - Obtiene el tamaño de un objeto LOB

    - [cubrid_lob2_size64()](#function.cubrid-lob2-size64) - Recupera el tamaño de un objeto LOB

# cubrid_lock_read

(PECL CUBRID &gt;= 8.3.0)

cubrid_lock_read — Coloca un bloqueo de lectura sobre el OID proporcionado

### Descripción

**cubrid_lock_read**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [bool](#language.types.boolean)

La función **cubrid_lock_read()** se utiliza para colocar
un bloqueo de lectura sobre la instancia apuntada por el oid proporcionado.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia cuya lectura se desea bloquear.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lock_read()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(2, {4,5,7}, {44,55,66,666}, 'b')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

cubrid_lock_read($conn, $oid);

$attr = cubrid_get($conn, $oid, "b");
var_dump($attr);

$attr = cubrid_get($conn, $oid);
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

string(9) "{1, 2, 3}"
array(4) {
["a"]=&gt;
string(1) "1"
["b"]=&gt;
array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
["c"]=&gt;
array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
["d"]=&gt;
string(10) "a "
}

### Ver también

    - [cubrid_lock_write()](#function.cubrid-lock-write) - Coloca un bloqueo de escritura en el OID proporcionado

# cubrid_lock_write

(PECL CUBRID &gt;= 8.3.0)

cubrid_lock_write — Coloca un bloqueo de escritura en el OID proporcionado

### Descripción

**cubrid_lock_write**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [bool](#language.types.boolean)

La función **cubrid_lock_write()** se utiliza para colocar un
bloqueo de escritura en la instancia apuntada por el oid proporcionado.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia sobre la que se desea colocar un bloqueo de escritura.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_lock_write()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(2, {4,5,7}, {44,55,66,666}, 'b')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

cubrid_lock_write($conn, $oid);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_put($conn, $oid, "b", array(2, 4, 8));

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
array(3) {
[0]=&gt;
string(1) "2"
[1]=&gt;
string(1) "4"
[2]=&gt;
string(1) "8"
}

### Ver también

    - [cubrid_lock_read()](#function.cubrid-lock-read) - Coloca un bloqueo de lectura sobre el OID proporcionado

# cubrid_move_cursor

(PECL CUBRID &gt;= 8.3.0)

cubrid_move_cursor — Desplaza el cursor en el resultado

### Descripción

**cubrid_move_cursor**([resource](#language.types.resource) $req_identifier, [int](#language.types.integer) $offset, [int](#language.types.integer) $origin = CUBRID_CURSOR_CURRENT): [bool](#language.types.boolean)

La función **cubrid_move_cursor()** se utiliza para desplazar el
cursor actual según el parámetro req_identifier
con el valor del parámetro offset y en la dirección
definida por el parámetro origin argumento. Para definir
el argumento origin, se puede utilizar **[CUBRID_CURSOR_FIRST](#constant.cubrid-cursor-first)** para
la primera parte del resultado, **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)** para la posición actual del resultado,
o **[CUBRID_CURSOR_LAST](#constant.cubrid-cursor-last)** para la última parte del resultado. Si el argumento origin
no es explícitamente designado, entonces la función utilizará **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)** como valor por omisión.

Si el valor actual del desplazamiento del cursor está más allá de los límites válidos, entonces
el cursor se desplaza a la siguiente posición después del intervalo válido del cursor. Por ejemplo,
si se desplaza 20 unidades en el resultado cuyo tamaño es de 10, entonces el cursor
se colocará en la 11ª posición y devolverá **[CUBRID_NO_MORE_DATA](#constant.cubrid-no-more-data)**.

### Parámetros

     req_identifier
     Identificador de la consulta.




     offset
     Número de unidades que se desean utilizar para el desplazamiento.




     origin
     Objetivo donde se desea desplazar el cursor, ya sea **[CUBRID_CURSOR_FIRST](#constant.cubrid-cursor-first)**, **[CUBRID_CURSOR_CURRENT](#constant.cubrid-cursor-current)**, **[CUBRID_CURSOR_LAST](#constant.cubrid-cursor-last)**.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_move_cursor()**

&lt;?php
$conn = cubrid_connect("127.0.0.1", 33000, "demodb", "dba");

$req = cubrid_execute($conn, "SELECT \* FROM code");
cubrid_move_cursor($req, 1, CUBRID_CURSOR_LAST);

$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_CURRENT);
$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
string(1) "G"
[1]=&gt;
string(4) "Gold"
}
array(2) {
[0]=&gt;
string(1) "X"
[1]=&gt;
string(5) "Mixed"
}
array(2) {
[0]=&gt;
string(1) "M"
[1]=&gt;
string(3) "Man"
}

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_next_result

(PECL CUBRID &gt;= 8.4.0)

cubrid_next_result — Recupera el resultado de la siguiente consulta durante la ejecución
de múltiples consultas SQL

### Descripción

**cubrid_next_result**([resource](#language.types.resource) $result): [bool](#language.types.boolean)

La función **cubrid_next_result()** se utiliza para
recuperar los resultados de la siguiente consulta si se ejecutan múltiples consultas SQL
y el flag **[CUBRID_EXEC_QUERY_ALL](#constant.cubrid-exec-query-all)** está definido al
utilizar la función [cubrid_execute()](#function.cubrid-execute).

### Parámetros

     result


       El argumento result proviene de la llamada a la
       función [cubrid_execute()](#function.cubrid-execute)





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_next_result()**

&lt;?php
$conn = cubrid_connect("127.0.0.1", 33000, "demodb", "dba");

$sql_stmt = "SELECT * FROM code; SELECT * FROM history WHERE host_year=2004 AND event_code=20281";
$res = cubrid_execute($conn, $sql_stmt, CUBRID_EXEC_QUERY_ALL);

get_result_info($res);
cubrid_next_result($res);
get_result_info($res);

function get_result_info($req)
{
printf("\n------------ get_result_info --------------------\n");

    $row_num = cubrid_num_rows($req);
    $col_num = cubrid_num_cols($req);

    $column_name_list = cubrid_column_names($req);
    $column_type_list = cubrid_column_types($req);

    $column_last_name = cubrid_field_name($req, $col_num - 1);
    $column_last_table = cubrid_field_table($req, $col_num - 1);

    $column_last_type = cubrid_field_type($req, $col_num - 1);
    $column_last_len = cubrid_field_len($req, $col_num - 1);

    $column_1_flags = cubrid_field_flags($req, 1);

    printf("%-30s %d\n", "Row count:", $row_num);
    printf("%-30s %d\n", "Column count:", $col_num);
    printf("\n");

    printf("%-30s %-30s %-15s\n", "Column Names", "Column Types", "Column Len");
    printf("------------------------------------------------------------------------------\n");

    $size = count($column_name_list);
    for($i = 0; $i &lt; $size; $i++) {
        $column_len = cubrid_field_len($req, $i);
        printf("%-30s %-30s %-15s\n", $column_name_list[$i], $column_type_list[$i], $column_len);
    }
    printf("\n\n");

    printf("%-30s %s\n", "Last Column Name:", $column_last_name);
    printf("%-30s %s\n", "Last Column Table:", $column_last_table);
    printf("%-30s %s\n", "Last Column Type:", $column_last_type);
    printf("%-30s %d\n", "Last Column Len:", $column_last_len);
    printf("%-30s %s\n", "Second Column Flags:", $column_1_flags);

    printf("\n\n");

}
?&gt;

El ejemplo anterior mostrará:

------------ get_result_info --------------------
Row count: 6
Column count: 2

## Column Names Column Types Column Len

s_name char 1
f_name varchar 6

Last Column Name: f_name
Last Column Table: code
Last Column Type: varchar
Last Column Len: 6
Second Column Flags:

------------ get_result_info --------------------
Row count: 4
Column count: 5

## Column Names Column Types Column Len

event_code integer 11
athlete varchar 40
host_year integer 11
score varchar 10
unit varchar 5

Last Column Name: unit
Last Column Table: history
Last Column Type: varchar
Last Column Len: 5
Second Column Flags: not_null primary_key unique_key

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_num_cols

(PECL CUBRID &gt;= 8.3.0)

cubrid_num_cols — Obtiene el número de columnas del conjunto de resultados

### Descripción

**cubrid_num_cols**([resource](#language.types.resource) $result): [int](#language.types.integer)

La función **cubrid_num_cols()** se utiliza para obtener
el número de columnas desde el resultado de la consulta. Solo puede ser utilizada
cuando la consulta es de tipo SELECT.

### Parámetros

     result
     El resultado.

### Valores devueltos

Número de columnas en caso de éxito.

**[false](#constant.false)**, si la consulta SQL no es de tipo SELECT.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_num_cols()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$req = cubrid_execute($conn, "SELECT \* FROM code");

$row_num = cubrid_num_rows($req);
$col_num = cubrid_num_cols($req);

printf("Row Num: %d\nColumn Num: %d\n", $row_num, $col_num);

cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

Row Num: 6
Column Num: 2

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_num_rows()](#function.cubrid-num-rows) - Obtiene el número de filas de un conjunto de resultados

# cubrid_num_rows

(PECL CUBRID &gt;= 8.3.0)

cubrid_num_rows — Obtiene el número de filas de un conjunto de resultados

### Descripción

**cubrid_num_rows**([resource](#language.types.resource) $result): [int](#language.types.integer)

La función **cubrid_num_rows()** se utiliza para obtener
el número de filas desde el conjunto de resultados. Solo puede ser utilizada
cuando la consulta es de tipo SELECT. Cuando se desea obtener
este tipo de valor para una consulta de tipo INSERT, UPDATE o DELETE, debe utilizarse
la función [cubrid_affected_rows()](#function.cubrid-affected-rows).

Nota: La función **cubrid_num_rows()** solo puede ser utilizada
en consultas síncronas; devuelve 0 en consultas asíncronas.

### Parámetros

     result


       El argumento result proviene
       de una llamada a la función [cubrid_execute()](#function.cubrid-execute),
       la función [cubrid_query()](#function.cubrid-query) o la función
       [cubrid_prepare()](#function.cubrid-prepare).





### Valores devueltos

Número de filas en caso de éxito.

0 cuando la consulta se ha realizado en modo asíncrono.

-1, si la consulta SQL no es de tipo SELECT.

**[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_num_rows()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$req = cubrid_execute($conn, "SELECT \* FROM code");

$row_num = cubrid_num_rows($req);
$col_num = cubrid_num_cols($req);

printf("Row Num: %d\nColumn Num: %d\n", $row_num, $col_num);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Row Num: 6
Column Num: 2

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_num_cols()](#function.cubrid-num-cols) - Obtiene el número de columnas del conjunto de resultados

    - [cubrid_affected_rows()](#function.cubrid-affected-rows) - Devolver el número de filas afectadas por la última sentencia SQL

# cubrid_pconnect

(PECL CUBRID &gt;= 8.3.1)

cubrid_pconnect — Establece una conexión persistente con un servidor CUBRID

### Descripción

**cubrid_pconnect**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $dbname,
    [string](#language.types.string) $userid = ?,
    [string](#language.types.string) $passwd = ?
): [resource](#language.types.resource)

Establece una conexión persistente con un servidor CUBRID.

**cubrid_pconnect()** funciona de manera similar a
[cubrid_connect()](#function.cubrid-connect) con dos diferencias principales.

En primer lugar, al establecer la conexión, la función intentará primero
encontrar un enlace (persistente) ya abierto con el mismo nombre de host,
en el mismo puerto, utilizando la misma base de datos dbname y el mismo
userid. Si se encuentra un enlace de este tipo, su identificador será
devuelto en lugar de abrir una nueva conexión.

En segundo lugar, la conexión con el servidor CUBRID no se cerrará cuando
finalice el script. En su lugar, el enlace permanecerá abierto para su
uso futuro ([cubrid_close()](#function.cubrid-close) o
[cubrid_disconnect()](#function.cubrid-disconnect) no cerrarán los enlaces establecidos
con **cubrid_pconnect()**).

Este tipo de enlace se denominaba anteriormente 'persistente'.

### Parámetros

     host


       Nombre del host o dirección IP del servidor CUBRID CAS.






     port


       Número de puerto del servidor CUBRID CAS (BROKER_PORT configurado en $CUBRID/conf/cubrid_broker.conf).






     dbname


       Nombre de la base de datos.






     userid


       Nombre de usuario para la base de datos.






     passwd


       Contraseña asociada al nombre de usuario.





### Valores devueltos

Identificador de conexión en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con [cubrid_connect()](#function.cubrid-connect)**

&lt;?php
printf("%-30s %s\n", "Versión de CUBRID PHP:", cubrid_version());

printf("\n");

$conn = cubrid_pconnect("localhost", 33000, "demodb", "dba");

if (!$conn) {
die('Error de conexión ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Información del servidor:", $server_info);
printf("%-30s %s\n", "Información del cliente:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "Juego de caracteres CUBRID:", $charset);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Versión de CUBRID PHP: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 1

Información del servidor: 9.1.0.0212
Información del cliente: 9.1.0

Juego de caracteres CUBRID: iso8859-1

### Ver también

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_connect_with_url()](#function.cubrid-connect-with-url) - Establecer el entorno para la conexión al servidor de CUBRID

    - [cubrid_pconnect_with_url()](#function.cubrid-pconnect-with-url) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

    - [cubrid_close()](#function.cubrid-close) - Cerrar la conexión de CUBRID

# cubrid_pconnect_with_url

(PECL CUBRID &gt;= 8.3.1)

cubrid_pconnect_with_url — Establece una conexión persistente con un servidor CUBRID

### Descripción

**cubrid_pconnect_with_url**([string](#language.types.string) $conn_url, [string](#language.types.string) $userid = ?, [string](#language.types.string) $passwd = ?): [resource](#language.types.resource)

Establece una conexión persistente con un servidor CUBRID.

**cubrid_pconnect_with_url()** funciona de manera similar a la
función [cubrid_connect_with_url()](#function.cubrid-connect-with-url), con dos diferencias principales.

En primer lugar, al establecer la conexión, la función intentará encontrar
un enlace (persistente) ya abierto con el mismo host, en el mismo puerto, en la
misma base de datos dbname y utilizando el mismo userid. Si se encuentra una conexión
de este tipo, su identificador será devuelto en lugar de abrir una nueva conexión.

A continuación, la conexión al servidor CUBRID no se cerrará cuando finalice
el script. En su lugar, la conexión permanecerá abierta para su uso futuro (la función
[cubrid_close()](#function.cubrid-close) o la función [cubrid_disconnect()](#function.cubrid-disconnect) no cerrarán la conexión
establecida por la función **cubrid_pconnect_with_url()**).

Este tipo de enlace se denominaba anteriormente 'persistente'.

&lt;url&gt; ::= CUBRID:&lt;host&gt;:&lt;db_name&gt;:&lt;db_user&gt;:&lt;db_password&gt;:[?&lt;properties&gt;]

&lt;properties&gt; ::= &lt;property&gt; [&amp;&lt;property&gt;]

&lt;properties&gt; ::= alhosts=&lt;alternative_hosts&gt;[ &amp;rctime=&lt;time&gt;]

&lt;properties&gt; ::= login_timeout=&lt;milli_sec&gt;

&lt;properties&gt; ::= query_timeout=&lt;milli_sec&gt;

&lt;properties&gt; ::= disconnect_on_query_timeout=true|false

&lt;alternative_hosts&gt; ::= &lt;standby_broker1_host&gt;:&lt;port&gt; [,&lt;standby_broker2_host&gt;:&lt;port&gt;]

&lt;host&gt; := HOSTNAME | IP_ADDR

&lt;time&gt; := SECOND

&lt;milli_sec&gt; := MILLI SECOND

    - host : Un nombre de host o una dirección IP del servidor maestro de la base de datos

    - db_name : Un nombre de base de datos

    - db_user : Un nombre de usuario de la base de datos

    - db_password : Una contraseña para el usuario de la base de datos

    - autocommit : El modo auto-commit de la conexión a la base de datos

    -
     alhosts : Especifica la información del broker del servidor, que será utilizado como punto de salida
     cuando no sea posible conectarse al servidor activo. Se pueden especificar varios brokers en este caso,
     y la conexión a los brokers se intentará en el orden de la configuración alhosts


    -
     rctime : Un intervalo de tiempo para esperar antes de intentar una conexión con un broker cuando ocurre un error.
     Después de que ocurra un error, el sistema intentará conectarse a un broker especificado por
     althosts, terminará la transacción, y luego intentará conectarse al broker activo del servidor maestro
     de la base de datos. El valor por omisión es de 600 segundos.


    -
     login_timeout : Valor del tiempo máximo de espera (unidad: milisegundo) para la identificación
     a la base de datos. Por omisión, este valor es 0, lo que significa que se espera indefinidamente.


    -
     query_timeout : Valor del tiempo máximo de espera (unidad: milisegundo) para la ejecución
     de la consulta. Una vez alcanzado este valor, se envía un mensaje para cancelar la consulta
     enviada al servidor. El valor devuelto puede depender de la configuración de disconnect_on_query_timeout;
     incluso si el mensaje para cancelar la consulta ha sido enviado al servidor, la consulta puede tener éxito.


    -
     disconnect_on_query_timeout : Configura un valor que determina si se debe devolver
     inmediatamente un error para las funciones ejecutadas después del tiempo máximo de espera.
     El valor por omisión es **[false](#constant.false)**.

**Nota**:

    Los caracteres ? y :
    utilizados como identificadores en las URLs de conexión PHP no pueden
    ser incluidos en la contraseña. A continuación se muestra un ejemplo de contraseña
    inválida, ya que utiliza los caracteres "?:" en la URL de conexión.




    $url = "CUBRID:localhost:33000:tdb:dba:12?:?login_timeout=100";




    Las contraseñas que contienen el carácter ? o el
    carácter : pueden ser pasadas como argumento separado.




    $url = "CUBRID:localhost:33000:tbd:::?login_timeout=100";




    $conn = cubrid_pconnect_with_url ($url, "dba", "12?");




    Si el nombre de usuario o la contraseña están vacíos, no se deben
    eliminar los ":"; a continuación se muestra un ejemplo:




    $url = "CUBRID:localhost:33000:demodb:::";

### Parámetros

     conn_url


       Un [string](#language.types.string) que contiene la información de conexión para el servidor.






     userid


       Nombre de usuario para la base de datos.






     passwd


       Contraseña para el usuario.





### Valores devueltos

Identificador de conexión, cuando el proceso tiene éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_pconnect_with_url()** sin propiedades

&lt;?php
$conn_url = "CUBRID:127.0.0.1:33000:demodb:dba::?althost=10.34.63.132:33088&amp;rctime=100";
$con = cubrid_pconnect_with_url ($conn_url);

if ($con) {
   echo "Conexión exitosa";
   cubrid_execute($con, "create table person(id int,name char(16))");
$req =cubrid_execute($con, "insert into person values(1,'James')");

if ($req) {
      cubrid_close_request ($req);
cubrid_commit ($con);
   } else {
      cubrid_rollback ($con);
}
cubrid_disconnect ($con);
}
?&gt;

**Ejemplo #2 cubrid_pconnect_with_url()** url with properties example

&lt;?php
$conn_url = "CUBRID:127.0.0.1:33000:demodb:dba::?autocommit=off&amp;althost=10.34.63.132:33088&amp;rctime=100";
$con = cubrid_pconnect_with_url ($conn_url);

if ($con) {
   echo "Conexión exitosa";
   $req =cubrid_execute($con, "insert into person values(1,'James')");

if ($req) {
      cubrid_close_request ($req);
cubrid_commit ($con);
   } else {
      cubrid_rollback ($con);
}
cubrid_disconnect ($con);
}
?&gt;

### Ver también

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_connect_with_url()](#function.cubrid-connect-with-url) - Establecer el entorno para la conexión al servidor de CUBRID

    - [cubrid_pconnect()](#function.cubrid-pconnect) - Establece una conexión persistente con un servidor CUBRID

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

    - [cubrid_close()](#function.cubrid-close) - Cerrar la conexión de CUBRID

# cubrid_prepare

(PECL CUBRID &gt;= 8.3.0)

cubrid_prepare — Prepara una consulta SQL para su ejecución

### Descripción

**cubrid_prepare**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $prepare_stmt, [int](#language.types.integer) $option = 0): [resource](#language.types.resource)

La función **cubrid_prepare()** prepara una consulta SQL para un
gestor de conexión proporcionado. Esta consulta SQL precompilada será incluida en
la función **cubrid_prepare()**.

Asimismo, esta consulta puede ser utilizada varias veces o para procesar grandes
volúmenes de datos. Una única consulta puede ser utilizada y se pueden insertar
variables. La adición de una variable se realiza cuando se desea vincular un valor
en la cláusula VALUES o WHERE de una consulta. Tenga en cuenta que solo es
permitido vincular un valor a una variable (?) utilizando la función
[cubrid_bind()](#function.cubrid-bind).

### Parámetros

     conn_identifier
     Identificador de conexión.




     prepare_stmt
     Consulta preparada.




     option
     OID devuelto por la opción **[CUBRID_INCLUDE_OID](#constant.cubrid-include-oid)**.

### Valores devueltos

Identificador de consulta en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_prepare()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$sql = &lt;&lt;&lt;EOD
SELECT g.event_code, e.name
FROM game g
JOIN event e ON g.event_code=e.code
WHERE host_year = ? AND event_code NOT IN (SELECT event_code FROM game WHERE host_year=?) GROUP BY event_code;
EOD;

$req = cubrid_prepare($conn, $sql);

cubrid_bind($req, 1, 2004);
cubrid_bind($req, 2, 2000);
cubrid_execute($req);

$row_num = cubrid_num_rows($req);
printf("There are %d event that exits in 2004 olympic but not in 2000. For example:\n\n", $row_num);

printf("%-15s %s\n", "Event_code", "Event_name");
printf("----------------------------\n");

$row = cubrid_fetch_assoc($req);
printf("%-15d %s\n", $row["event_code"], $row["name"]);
$row = cubrid_fetch_assoc($req);
printf("%-15d %s\n", $row["event_code"], $row["name"]);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

There are 27 event that exits in 2004 olympic but not in 2000. For example:

## Event_code Event_name

20063 +91kg
20070 64kg

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

    - [cubrid_bind()](#function.cubrid-bind) - Vincular variables para una sentencia preparada como parámetros

# cubrid_put

(PECL CUBRID &gt;= 8.3.0)

cubrid_put — Actualiza una columna según su OID

### Descripción

**cubrid_put**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr = ?,
    [mixed](#language.types.mixed) $value
): [bool](#language.types.boolean)

La función **cubrid_put()** se utiliza para actualizar
un atributo de la instancia señalada por el oid proporcionado.

Puede actualizarse un solo atributo utilizando un [string](#language.types.string) en el parámetro
attr. En este caso, puede utilizarse un [int](#language.types.integer), un número de punto flotante, o un [string](#language.types.string) como value. Para actualizar varios atributos, debe omitirse el parámetro attr y definirse el argumento value utilizando un array asociativo.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia que se desea actualizar.




     attr
     Nombre del atributo que se desea actualizar.




     value
     Nuevo valor que se desea asignar al atributo.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_put()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(2, {4,5,7}, {44,55,66,666}, 'b')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_put($conn, $oid, "b", array(2, 4, 8));

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
array(3) {
[0]=&gt;
string(1) "2"
[1]=&gt;
string(1) "4"
[2]=&gt;
string(1) "8"
}

### Ver también

    - [cubrid_get()](#function.cubrid-get) - Obtener una columna usando OID

    - [cubrid_set_add()](#function.cubrid-set-add) - Inserta un único elemento para definir el tipo de una columna

    - [cubrid_set_drop()](#function.cubrid-set-drop) - Elimina un elemento

    - [cubrid_seq_insert()](#function.cubrid-seq-insert) - Inserta un elemento en una secuencia

    - [cubrid_seq_drop()](#function.cubrid-seq-drop) - Elimina un elemento de una secuencia

    - [cubrid_seq_put()](#function.cubrid-seq-put) - Actualiza el valor de un elemento de una secuencia

# cubrid_rollback

(PECL CUBRID &gt;= 8.3.0)

cubrid_rollback — Anula una transacción

### Descripción

**cubrid_rollback**([resource](#language.types.resource) $conn_identifier): [bool](#language.types.boolean)

La función **cubrid_rollback()** anula la transacción en curso
señalada por el argumento conn_identifier.

La conexión al servidor se cierra después de la llamada a la función
**cubrid_rollback()**. Sin embargo, el gestor de conexión
permanece activo.

### Parámetros

     conn_identifier
     Identificador de conexión.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_rollback()**

&lt;?php
$conn = cubrid_connect("127.0.0.1", 33000, "demodb", "dba");
cubrid_set_autocommit($conn,false);

@cubrid_execute($conn, "DROP TABLE publishers");

$sql = &lt;&lt;&lt;EOD
CREATE TABLE publishers(
pub_id CHAR(3),
pub_name VARCHAR(20),
city VARCHAR(15),
state CHAR(2),
country VARCHAR(15)
)
EOD;

if (!cubrid_execute($conn, $sql)) {
printf("Error facility: %d\nError code: %d\nError msg: %s\n", cubrid_error_code_facility(), cubrid_error_code(), cubrid_error_msg());

    cubrid_disconnect($conn);
    exit;

}

$req = cubrid_prepare($conn, "INSERT INTO publishers VALUES(?, ?, ?, ?, ?)");

$id_list = array("P01", "P02", "P03", "P04");
$name_list = array("Abatis Publishers", "Core Dump Books", "Schadenfreude Press", "Tenterhooks Press");
$city_list = array("New York", "San Francisco", "Hamburg", "Berkeley");
$state_list = array("NY", "CA", NULL, "CA");
$country_list = array("USA", "USA", "Germany", "USA");

for ($i = 0, $size = count($id_list); $i &lt; $size; $i++) {
    cubrid_bind($req, 1, $id_list[$i]);
cubrid_bind($req, 2, $name_list[$i]);
cubrid_bind($req, 3, $city_list[$i]);
cubrid_bind($req, 4, $state_list[$i]);
cubrid_bind($req, 5, $country_list[$i]);

    if (!($ret = cubrid_execute($req))) {
        break;
    }

}

if (!$ret) {
    cubrid_rollback($conn);
} else {
cubrid_commit($conn);

    $req = cubrid_execute($conn, "SELECT * FROM publishers");
    while ($result = cubrid_fetch_assoc($req)) {
        printf("%-3s %-20s %-15s %-3s %-15s\n",
            $result["pub_id"], $result["pub_name"], $result["city"], $result["state"], $result["country"]);
    }

}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

P01 Abatis Publishers New York NY USA
P02 Core Dump Books San Francisco CA USA
P03 Schadenfreude Press Hamburg Germany
P04 Tenterhooks Press Berkeley CA USA

### Ver también

    - [cubrid_commit()](#function.cubrid-commit) - Consigna una transacción

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

# cubrid_schema

(PECL CUBRID &gt;= 8.3.0)

cubrid_schema — Recupera información sobre un esquema

### Descripción

**cubrid_schema**(
    [resource](#language.types.resource) $conn_identifier,
    [int](#language.types.integer) $schema_type,
    [string](#language.types.string) $class_name = ?,
    [string](#language.types.string) $attr_name = ?
): [array](#language.types.array)

La función **cubrid_schema()** se utiliza para
recuperar información de un esquema desde la base de datos.
Para recuperar la información de una clase particular,
debe definirse class_name,
para recuperar la información sobre un atributo particular (solo
utilizable con **[CUBRID_SCH_ATTR_PRIVILEGE](#constant.cubrid-sch-attr-privilege)**),
debe definirse attr_name.

El resultado de la función **cubrid_schema()** se devuelve en forma de un array
de 2 dimensiones (columna (array asociativo) \* filas (array numérico)).
Las tablas siguientes muestran los tipos de un esquema así como la estructura
de una columna del array resultante, según el tipo de esquema solicitado.

    <caption>**Composición del resultado para cada tipo**</caption>



       Esquema
       Número de columna
       Nombre de la columna
       Valor






       CUBRID_SCH_CLASS
       1
       NAME
        



        
       2
       TYPE
       0:system class 1:vclass 2:class




       CUBRID_SCH_VCLASS
       1
       NAME
        



        
       2
       TYPE
       1:vclass




       CUBRID_SCH_QUERY_SPEC
       1
       QUERY_SPEC
        




       CUBRID_SCH_ATTRIBUTE / CUBRID_SCH_CLASS_ATTRIBUTE
       1
       ATTR_NAME
        



        
       2
       DOMAIN
        



        
       3
       SCALE
        



        
       4
       PRECISION
        



        
       5
       INDEXED
       1:indexed



        
       6
       NOT NULL
       1:not null



        
       7
       SHARED
       1:shared



        
       8
       UNIQUE
       1:unique



        
       9
       DEFAULT
        



        
       10
       ATTR_ORDER
       base:1



        
       11
       CLASS_NAME
        



        
       12
       SOURCE_CLASS
        



        
       13
       IS_KEY
       1:key




       CUBRID_SCH_METHOD / CUBRID_SCH_CLASS_METHOD
       1
       NAME
        



        
       2
       RET_DOMAIN
        



        
       3
       ARG_DOMAIN
        




       CUBRID_SCH_METHOD_FILE
       1
       METHOD_FILE
        




       CUBRID_SCH_SUPERCLASS / CUBRID_SCH_DIRECT_SUPER_CLASS / CUBRID_SCH_SUBCLASS
       1
       CLASS_NAME
        



        
       2
       TYPE
       0:system class 1:vclass 2:class




       CUBRID_SCH_CONSTRAINT
       1
       TYPE
       0:unique 1:index 2:reverse unique 3:reverse index



        
       2
       NAME
        



        
       3
       ATTR_NAME
        



        
       4
       NUM_PAGES
        



        
       5
       NUM_KEYS
        



        
       6
       PRIMARY_KEY
       1:primary key



        
       7
       KEY_ORDER
       base:1




       CUBRID_SCH_TRIGGER
       1
       NAME
        



        
       2
       STATUS
        



        
       3
       EVENT
        



        
       4
       TARGET_CLASS
        



        
       5
       TARGET_ATTR
        



        
       6
       ACTION_TIME
        



        
       7
       ACTION
        



        
       8
       PRIORITY
        



        
       9
       CONDITION_TIME
        



        
       10
       CONDITION
        




       CUBRID_SCH_CLASS_PRIVILEGE / CUBRID_SCH_ATTR_PRIVILEGE
       1
       CLASS_NAME / ATTR_NAME
        



        
       2
       PRIVILEGE
        



        
       3
       GRANTABLE
        




       CUBRID_SCH_PRIMARY_KEY
       1
       CLASS_NAME
        



        
       2
       ATTR_NAME
        



        
       3
       KEY_SEQ
       base:1



        
       4
       KEY_NAME
        




       CUBRID_SCH_IMPORTED_KEYS / CUBRID_SCH_EXPORTED_KEYS / CUBRID_SCH_CROSS_REFERENCE
       1
       PKTABLE_NAME
        



        
       2
       PKCOLUMN_NAME
        



        
       3
       FKTABLE_NAME
       base:1



        
       4
       FKCOLUMN_NAME
        



        
       5
       KEY_SEQ
       base:1



        
       6
       UPDATE_ACTION
       0:cascade 1:restrict 2:no action 3:set null



        
       7
       DELETE_ACTION
       0:cascade 1:restrict 2:no action 3:set null



        
       8
       FK_NAME
        



        
       9
       PK_NAME
        




### Parámetros

     conn_identifier
     Identificador de conexión.




     schema_type
     Datos del esquema a recuperar.




     class_name
     Clase para la cual se desea conocer el esquema.




     attr_name
     Atributo para el cual se desea conocer el esquema.

### Valores devueltos

Un array que contiene la información sobre el esquema en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.3.1

        Modificación del valor devuelto: cuando la función falla,
        el valor devuelto es ahora **[false](#constant.false)** en lugar de -1.





### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_schema()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

printf("\n--- Primary Key ---\n");
$pk = cubrid_schema($conn, CUBRID_SCH_PRIMARY_KEY, "game");
var_dump($pk);

printf("\n--- Foreign Keys ---\n");
$fk = cubrid_schema($conn, CUBRID_SCH_IMPORTED_KEYS, "game");
var_dump($fk);

printf("\n--- Column Attribute ---\n");
$attr = cubrid_schema($conn, CUBRID_SCH_ATTRIBUTE, "stadium", "area");
var_dump($attr);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

--- Primary Key ---
array(3) {
[0]=&gt;
array(4) {
["CLASS_NAME"]=&gt;
string(4) "game"
["ATTR_NAME"]=&gt;
string(12) "athlete_code"
["KEY_SEQ"]=&gt;
string(1) "3"
["KEY_NAME"]=&gt;
string(41) "pk_game_host_year_event_code_athlete_code"
}
[1]=&gt;
array(4) {
["CLASS_NAME"]=&gt;
string(4) "game"
["ATTR_NAME"]=&gt;
string(10) "event_code"
["KEY_SEQ"]=&gt;
string(1) "2"
["KEY_NAME"]=&gt;
string(41) "pk_game_host_year_event_code_athlete_code"
}
[2]=&gt;
array(4) {
["CLASS_NAME"]=&gt;
string(4) "game"
["ATTR_NAME"]=&gt;
string(9) "host_year"
["KEY_SEQ"]=&gt;
string(1) "1"
["KEY_NAME"]=&gt;
string(41) "pk_game_host_year_event_code_athlete_code"
}
}

--- Foreign Keys ---
array(2) {
[0]=&gt;
array(9) {
["PKTABLE_NAME"]=&gt;
string(7) "athlete"
["PKCOLUMN_NAME"]=&gt;
string(4) "code"
["FKTABLE_NAME"]=&gt;
string(4) "game"
["FKCOLUMN_NAME"]=&gt;
string(12) "athlete_code"
["KEY_SEQ"]=&gt;
string(1) "1"
["UPDATE_RULE"]=&gt;
string(1) "1"
["DELETE_RULE"]=&gt;
string(1) "1"
["FK_NAME"]=&gt;
string(20) "fk_game_athlete_code"
["PK_NAME"]=&gt;
string(15) "pk_athlete_code"
}
[1]=&gt;
array(9) {
["PKTABLE_NAME"]=&gt;
string(5) "event"
["PKCOLUMN_NAME"]=&gt;
string(4) "code"
["FKTABLE_NAME"]=&gt;
string(4) "game"
["FKCOLUMN_NAME"]=&gt;
string(10) "event_code"
["KEY_SEQ"]=&gt;
string(1) "1"
["UPDATE_RULE"]=&gt;
string(1) "1"
["DELETE_RULE"]=&gt;
string(1) "1"
["FK_NAME"]=&gt;
string(18) "fk_game_event_code"
["PK_NAME"]=&gt;
string(13) "pk_event_code"
}
}

--- Column Attribute ---
array(1) {
[0]=&gt;
array(13) {
["ATTR_NAME"]=&gt;
string(4) "area"
["DOMAIN"]=&gt;
string(1) "7"
["SCALE"]=&gt;
string(1) "2"
["PRECISION"]=&gt;
string(2) "10"
["INDEXED"]=&gt;
string(1) "0"
["NON_NULL"]=&gt;
string(1) "0"
["SHARED"]=&gt;
string(1) "0"
["UNIQUE"]=&gt;
string(1) "0"
["DEFAULT"]=&gt;
NULL
["ATTR_ORDER"]=&gt;
string(1) "4"
["CLASS_NAME"]=&gt;
string(7) "stadium"
["SOURCE_CLASS"]=&gt;
string(7) "stadium"
["IS_KEY"]=&gt;
string(1) "0"
}
}

# cubrid_seq_drop

(PECL CUBRID &gt;= 8.3.0)

cubrid_seq_drop — Elimina un elemento de una secuencia

### Descripción

**cubrid_seq_drop**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr_name,
    [int](#language.types.integer) $index
): [bool](#language.types.boolean)

La función **cubrid_seq_drop()** se utiliza para eliminar
un elemento de la base de datos basándose en la secuencia de tipos
de atributos proporcionada.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia a utilizar.




     attr_name
     Nombre del atributo desde el cual debe eliminarse el elemento.




     index
     Índice del elemento a eliminar (comenzando en 1).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_seq_drop()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c sequence(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_seq_drop($conn, $oid, "c", 4);

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
array(3) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
}

### Ver también

    - [cubrid_seq_insert()](#function.cubrid-seq-insert) - Inserta un elemento en una secuencia

    - [cubrid_seq_put()](#function.cubrid-seq-put) - Actualiza el valor de un elemento de una secuencia

# cubrid_seq_insert

(PECL CUBRID &gt;= 8.3.0)

cubrid_seq_insert — Inserta un elemento en una secuencia

### Descripción

**cubrid_seq_insert**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr_name,
    [int](#language.types.integer) $index,
    [string](#language.types.string) $seq_element
): [bool](#language.types.boolean)

La función **cubrid_col_insert()** se utiliza para
insertar un elemento en una secuencia de tipos de atributos.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia a utilizar.




     attr_name
     Nombre del atributo a insertar.




     index
     Posición del elemento para su inserción (comenzando en 1).




     seq_element
     Contenido del elemento a insertar.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_seq_insert()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c sequence(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_seq_insert($conn, $oid, "c", 5, "44");

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
array(5) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
[4]=&gt;
string(2) "44"
}

### Ver también

    - [cubrid_seq_drop()](#function.cubrid-seq-drop) - Elimina un elemento de una secuencia

    - [cubrid_seq_put()](#function.cubrid-seq-put) - Actualiza el valor de un elemento de una secuencia

# cubrid_seq_put

(PECL CUBRID &gt;= 8.3.0)

cubrid_seq_put — Actualiza el valor de un elemento de una secuencia

### Descripción

**cubrid_seq_put**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr_name,
    [int](#language.types.integer) $index,
    [string](#language.types.string) $seq_element
): [bool](#language.types.boolean)

La función **cubrid_seq_put()** se utiliza para
actualizar el contenido de un elemento en una secuencia de tipos
de atributos.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia a utilizar.




     attr_name
     Nombre del atributo a utilizar.




     index
     Índice (comenzando en 1) del elemento a actualizar.




     seq_element
     Nuevo contenido a colocar en el elemento.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_seq_put()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c sequence(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_seq_put($conn, $oid, "c", 1, "111");

$attr = cubrid_col_get($conn, $oid, "c");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(2) "11"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}
array(4) {
[0]=&gt;
string(3) "111"
[1]=&gt;
string(2) "22"
[2]=&gt;
string(2) "33"
[3]=&gt;
string(3) "333"
}

### Ver también

    - [cubrid_seq_drop()](#function.cubrid-seq-drop) - Elimina un elemento de una secuencia

    - [cubrid_seq_insert()](#function.cubrid-seq-insert) - Inserta un elemento en una secuencia

# cubrid_set_add

(PECL CUBRID &gt;= 8.3.0)

cubrid_set_add — Inserta un único elemento para definir el tipo de una columna

### Descripción

**cubrid_set_add**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr_name,
    [string](#language.types.string) $set_element
): [bool](#language.types.boolean)

La función **cubrid_set_add()** se utiliza para insertar
un único elemento en un conjunto de tipos de atributos.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia a utilizar.




     attr_name
     Nombre del atributo en el cual el nuevo elemento será insertado.




     set_element
     Contenido del elemento a insertar.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_set_add()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_set_add($conn, $oid, "b", "4");

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
array(4) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
[3]=&gt;
string(1) "4"
}

### Ver también

    - [cubrid_seq_drop()](#function.cubrid-seq-drop) - Elimina un elemento de una secuencia

# cubrid_set_autocommit

(PECL CUBRID &gt;= 8.4.0)

cubrid_set_autocommit — Define el modo auto-commit para la conexión

### Descripción

**cubrid_set_autocommit**([resource](#language.types.resource) $conn_identifier, [bool](#language.types.boolean) $mode): [bool](#language.types.boolean)

La función **cubrid_set_autocommit()** se utiliza para
definir el modo auto-commit para la conexión a la base de datos CUBRID.

En CUBRID PHP, el modo auto-commit está desactivado por omisión para la gestión
de transacciones. Cuando el modo auto-commit pasa de Off a On, todos los
trabajos pendientes son automáticamente validados.

### Parámetros

     conn_identifier
     Identificador de conexión.




     mode

      El modo auto-commit. Las constantes siguientes pueden ser utilizadas:






        - **[CUBRID_AUTOCOMMIT_FALSE](#constant.cubrid-autocommit-false)**

        - **[CUBRID_AUTOCOMMIT_TRUE](#constant.cubrid-autocommit-true)**





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [cubrid_get_autocommit()](#function.cubrid-get-autocommit) - Recupera el modo auto-commit de la conexión

    - [cubrid_commit()](#function.cubrid-commit) - Consigna una transacción

# cubrid_set_db_parameter

(PECL CUBRID &gt;= 8.4.0)

cubrid_set_db_parameter — Define los parámetros de la base de datos CUBRID

### Descripción

**cubrid_set_db_parameter**([resource](#language.types.resource) $conn_identifier, [int](#language.types.integer) $param_type, [int](#language.types.integer) $param_value): [bool](#language.types.boolean)

La función **cubrid_set_db_parameter()** se utiliza
para definir los parámetros de la base de datos CUBRID. Puede
definir los siguientes parámetros de la base de datos CUBRID:

    - **[PARAM_ISOLATION_LEVEL](#constant.param-isolation-level)**

    - **[PARAM_LOCK_TIMEOUT](#constant.param-lock-timeout)**

**Nota**:

    El modo auto-commit puede ser definido utilizando la función
    [cubrid_set_autocommit()](#function.cubrid-set-autocommit).

### Parámetros

    conn_identifier

      La conexión CUBRID. Si el identificador de conexión no es especificado,
      se utilizará el último enlace abierto por la función
      [cubrid_connect()](#function.cubrid-connect).





    param_type
    Tipo de parámetro de la base de datos.




    param_value
    Nivel de aislamiento (1-6) o el valor del tiempo de espera (en segundos).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con [cubrid_get_db_parameter()](#function.cubrid-get-db-parameter)**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

$params = cubrid_get_db_parameter($conn);
var_dump($params);

cubrid_set_autocommit($conn, CUBRID_AUTOCOMMIT_TRUE);
cubrid_set_db_parameter($conn, CUBRID_PARAM_ISOLATION_LEVEL, 2);

$params_new = cubrid_get_db_parameter($conn);
var_dump($params_new);

cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

array(4) {
["PARAM_ISOLATION_LEVEL"]=&gt;
int(3)
["PARAM_LOCK_TIMEOUT"]=&gt;
int(-1)
["PARAM_MAX_STRING_LENGTH"]=&gt;
int(1073741823)
["PARAM_AUTO_COMMIT"]=&gt;
int(0)
}
array(4) {
["PARAM_ISOLATION_LEVEL"]=&gt;
int(2)
["PARAM_LOCK_TIMEOUT"]=&gt;
int(-1)
["PARAM_MAX_STRING_LENGTH"]=&gt;
int(1073741823)
["PARAM_AUTO_COMMIT"]=&gt;
int(1)
}

### Ver también

    - [cubrid_get_db_parameter()](#function.cubrid-get-db-parameter) - Devuelve los parámetros de la base de datos CUBRID

    - [cubrid_set_autocommit()](#function.cubrid-set-autocommit) - Define el modo auto-commit para la conexión

# cubrid_set_drop

(PECL CUBRID &gt;= 8.3.0)

cubrid_set_drop — Elimina un elemento

### Descripción

**cubrid_set_drop**(
    [resource](#language.types.resource) $conn_identifier,
    [string](#language.types.string) $oid,
    [string](#language.types.string) $attr_name,
    [string](#language.types.string) $set_element
): [bool](#language.types.boolean)

La función **cubrid_set_drop()** se utiliza para
eliminar un elemento de un atributo dado de la base de datos.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     OID de la instancia a utilizar.




     attr_name
     Nombre del atributo desde el cual se eliminará el elemento.




     set_element
     Contenido del elemento a eliminar.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_set_drop()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb", "dba");

@cubrid_execute($conn, "DROP TABLE foo");
cubrid_execute($conn, "CREATE TABLE foo(a int AUTO_INCREMENT, b set(int), c list(int), d char(10))");
cubrid_execute($conn, "INSERT INTO foo(a, b, c, d) VALUES(1, {1,2,3}, {11,22,33,333}, 'a')");

$req = cubrid_execute($conn, "SELECT \* FROM foo", CUBRID_INCLUDE_OID);

cubrid_move_cursor($req, 1, CUBRID_CURSOR_FIRST);
$oid = cubrid_current_oid($req);

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_set_drop($conn, $oid, "b", "1");

$attr = cubrid_col_get($conn, $oid, "b");
var_dump($attr);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(1) "1"
[1]=&gt;
string(1) "2"
[2]=&gt;
string(1) "3"
}
array(2) {
[0]=&gt;
string(1) "2"
[1]=&gt;
string(1) "3"
}

### Ver también

    - [cubrid_set_add()](#function.cubrid-set-add) - Inserta un único elemento para definir el tipo de una columna

# cubrid_set_query_timeout

(PECL CUBRID &gt;= 8.4.1)

cubrid_set_query_timeout — Define el tiempo máximo de ejecución de una consulta

### Descripción

**cubrid_set_query_timeout**([resource](#language.types.resource) $req_identifier, [int](#language.types.integer) $timeout): [bool](#language.types.boolean)

La función **cubrid_set_query_timeout()** se utiliza para definir
el tiempo máximo de ejecución de una consulta.

### Parámetros

    req_identifier


      Identificador de consulta.






    timeout


      Tiempo máximo, en milisegundos.


### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [cubrid_get_query_timeout()](#function.cubrid-get-query-timeout) - Obtener el valor del tiempo de espera de consulta de la petición

# cubrid_version

(PECL CUBRID &gt;= 8.3.0)

cubrid_version — Obtener la versión del módulo de PHP de CUBRID

### Descripción

**cubrid_version**(): [string](#language.types.string)

La función **cubrid_version()** se usa para obtener la versión
del módulo de PHP de CUBRID.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Información de la versión (p.ej. "8.3.1.0001").

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_version()**

&lt;?php
printf("%-30s %s\n", "CUBRID PHP Version:", cubrid_version());

printf("\n");

$conn = cubrid_connect("localhost", 33088, "demodb", "dba");

if (!$conn) {
die('Connect Error ('. cubrid_error_code() .')' . cubrid_error_msg());
}

$db_params = cubrid_get_db_parameter($conn);

while (list($param_name, $param_value) = each($db_params)) {
printf("%-30s %s\n", $param_name, $param_value);
}

printf("\n");

$server_info = cubrid_get_server_info($conn);
$client_info = cubrid_get_client_info();

printf("%-30s %s\n", "Server Info:", $server_info);
printf("%-30s %s\n", "Client Info:", $client_info);

printf("\n");

$charset = cubrid_get_charset($conn);

printf("%-30s %s\n", "CUBRID Charset:", $charset);

cubrid_disconnect($conn);

?&gt;

El ejemplo anterior mostrará:

CUBRID PHP Version: 9.1.0.0001

PARAM_ISOLATION_LEVEL 3
LOCK_TIMEOUT -1
MAX_STRING_LENGTH 1073741823
PARAM_AUTO_COMMIT 1

Server Info: 9.1.0.0212
Client Info: 9.1.0

CUBRID Charset: iso8859-1

### Ver también

    - [cubrid_error_code()](#function.cubrid-error-code) - Obtener el código de error de la llamada a una función más reciente

    - [cubrid_error_code_facility()](#function.cubrid-error-code-facility) - Obtener el código de error del dispositivo

## Tabla de contenidos

- [cubrid_bind](#function.cubrid-bind) — Vincular variables para una sentencia preparada como parámetros
- [cubrid_close_prepare](#function.cubrid-close-prepare) — Cerrar el gestor de solicitud
- [cubrid_close_request](#function.cubrid-close-request) — Cerrar el gestor de solicitud
- [cubrid_col_get](#function.cubrid-col-get) — Recupera el contenido de los elementos de un tipo de colección utilizando el OID
- [cubrid_col_size](#function.cubrid-col-size) — Obtener el número de elementos de la columna del tipo de colección usando OID
- [cubrid_column_names](#function.cubrid-column-names) — Obtener los nombres de las columnas del resultado
- [cubrid_column_types](#function.cubrid-column-types) — Obtener los tipos de columnas del resultado
- [cubrid_commit](#function.cubrid-commit) — Consigna una transacción
- [cubrid_connect](#function.cubrid-connect) — Abrir una conexión al servidor CUBRID
- [cubrid_connect_with_url](#function.cubrid-connect-with-url) — Establecer el entorno para la conexión al servidor de CUBRID
- [cubrid_current_oid](#function.cubrid-current-oid) — Obtener el OID de la posición del cursor actual
- [cubrid_disconnect](#function.cubrid-disconnect) — Cerrar una conexión a una base de datos
- [cubrid_drop](#function.cubrid-drop) — Borrar una instancia usando OID
- [cubrid_error_code](#function.cubrid-error-code) — Obtener el código de error de la llamada a una función más reciente
- [cubrid_error_code_facility](#function.cubrid-error-code-facility) — Obtener el código de error del dispositivo
- [cubrid_error_msg](#function.cubrid-error-msg) — Obtener el último mensaje de error de la llamada a la función más reciente
- [cubrid_execute](#function.cubrid-execute) — Ejecutar una sentencia SQL preparada
- [cubrid_fetch](#function.cubrid-fetch) — Obtener la siguiente fila de un conjunto de resultados
- [cubrid_free_result](#function.cubrid-free-result) — Liberar la memoria ocupada por los datos del resultado
- [cubrid_get](#function.cubrid-get) — Obtener una columna usando OID
- [cubrid_get_autocommit](#function.cubrid-get-autocommit) — Recupera el modo auto-commit de la conexión
- [cubrid_get_charset](#function.cubrid-get-charset) — Devolver el conjunto de caracteres de la conexión CUBRID actual
- [cubrid_get_class_name](#function.cubrid-get-class-name) — Obtener el nombre de la clase usando OID
- [cubrid_get_client_info](#function.cubrid-get-client-info) — Devolver la versión de la biblioteca cliente
- [cubrid_get_db_parameter](#function.cubrid-get-db-parameter) — Devuelve los parámetros de la base de datos CUBRID
- [cubrid_get_query_timeout](#function.cubrid-get-query-timeout) — Obtener el valor del tiempo de espera de consulta de la petición
- [cubrid_get_server_info](#function.cubrid-get-server-info) — Devolver la versión del servidor CUBRID
- [cubrid_insert_id](#function.cubrid-insert-id) — Devuelve el ID generado por la última columna actualizada AUTO_INCREMENT
- [cubrid_is_instance](#function.cubrid-is-instance) — Comprobar si existe la instancia apuntada por OID
- [cubrid_lob_close](#function.cubrid-lob-close) — Cerrar información BLOB/CLOB
- [cubrid_lob_export](#function.cubrid-lob-export) — Exporta datos BLOB/CLOB a un fichero
- [cubrid_lob_get](#function.cubrid-lob-get) — Recupera los datos BLOB/CLOB
- [cubrid_lob_send](#function.cubrid-lob-send) — Lee los datos BLOB/CLOB y los envía al navegador
- [cubrid_lob_size](#function.cubrid-lob-size) — Recupera el tamaño de los datos BLOB/CLOB
- [cubrid_lob2_bind](#function.cubrid-lob2-bind) — Asocia un objeto LOB o una cadena de caracteres a un objeto LOB
  como argumento de una consulta preparada
- [cubrid_lob2_close](#function.cubrid-lob2-close) — Cierra un objeto LOB
- [cubrid_lob2_export](#function.cubrid-lob2-export) — Exporta un objeto LOB a un fichero
- [cubrid_lob2_import](#function.cubrid-lob2-import) — Importa datos BLOB/CLOB desde un fichero
- [cubrid_lob2_new](#function.cubrid-lob2-new) — Crea un nuevo objeto LOB
- [cubrid_lob2_read](#function.cubrid-lob2-read) — Lee datos BLOB/CLOB
- [cubrid_lob2_seek](#function.cubrid-lob2-seek) — Desplaza el cursor de un objeto LOB
- [cubrid_lob2_seek64](#function.cubrid-lob2-seek64) — Desplaza el cursor de un objeto LOB
- [cubrid_lob2_size](#function.cubrid-lob2-size) — Obtiene el tamaño de un objeto LOB
- [cubrid_lob2_size64](#function.cubrid-lob2-size64) — Recupera el tamaño de un objeto LOB
- [cubrid_lob2_tell](#function.cubrid-lob2-tell) — Recupera la posición del cursor en un objeto LOB
- [cubrid_lob2_tell64](#function.cubrid-lob2-tell64) — Recupera la posición del cursor en el objeto LOB
- [cubrid_lob2_write](#function.cubrid-lob2-write) — Escribe en un objeto LOB
- [cubrid_lock_read](#function.cubrid-lock-read) — Coloca un bloqueo de lectura sobre el OID proporcionado
- [cubrid_lock_write](#function.cubrid-lock-write) — Coloca un bloqueo de escritura en el OID proporcionado
- [cubrid_move_cursor](#function.cubrid-move-cursor) — Desplaza el cursor en el resultado
- [cubrid_next_result](#function.cubrid-next-result) — Recupera el resultado de la siguiente consulta durante la ejecución
  de múltiples consultas SQL
- [cubrid_num_cols](#function.cubrid-num-cols) — Obtiene el número de columnas del conjunto de resultados
- [cubrid_num_rows](#function.cubrid-num-rows) — Obtiene el número de filas de un conjunto de resultados
- [cubrid_pconnect](#function.cubrid-pconnect) — Establece una conexión persistente con un servidor CUBRID
- [cubrid_pconnect_with_url](#function.cubrid-pconnect-with-url) — Establece una conexión persistente con un servidor CUBRID
- [cubrid_prepare](#function.cubrid-prepare) — Prepara una consulta SQL para su ejecución
- [cubrid_put](#function.cubrid-put) — Actualiza una columna según su OID
- [cubrid_rollback](#function.cubrid-rollback) — Anula una transacción
- [cubrid_schema](#function.cubrid-schema) — Recupera información sobre un esquema
- [cubrid_seq_drop](#function.cubrid-seq-drop) — Elimina un elemento de una secuencia
- [cubrid_seq_insert](#function.cubrid-seq-insert) — Inserta un elemento en una secuencia
- [cubrid_seq_put](#function.cubrid-seq-put) — Actualiza el valor de un elemento de una secuencia
- [cubrid_set_add](#function.cubrid-set-add) — Inserta un único elemento para definir el tipo de una columna
- [cubrid_set_autocommit](#function.cubrid-set-autocommit) — Define el modo auto-commit para la conexión
- [cubrid_set_db_parameter](#function.cubrid-set-db-parameter) — Define los parámetros de la base de datos CUBRID
- [cubrid_set_drop](#function.cubrid-set-drop) — Elimina un elemento
- [cubrid_set_query_timeout](#function.cubrid-set-query-timeout) — Define el tiempo máximo de ejecución de una consulta
- [cubrid_version](#function.cubrid-version) — Obtener la versión del módulo de PHP de CUBRID

# Funciones de compatibilidad CUBRID MySQL

# cubrid_affected_rows

(PECL CUBRID &gt;= 8.3.0)

cubrid_affected_rows — Devolver el número de filas afectadas por la última sentencia SQL

### Descripción

**cubrid_affected_rows**([resource](#language.types.resource) $conn_identifier = ?): [int](#language.types.integer)

**cubrid_affected_rows**([resource](#language.types.resource) $req_identifier = ?): [int](#language.types.integer)

La función **cubrid_affected_rows()** se usa para obtener el
número de filas afectadas por la última sentencia SQL (INSERT, DELETE, UPDATE).

### Parámetros

     conn_identifier
     La conexión CUBRID. Si no se especifica el identificador de
      conexión, se asume el último enlace abierto por
      [cubrid_connect()](#function.cubrid-connect).




     req_identifier


       Identificador de petición. Podría ser devuelto desde [cubrid_prepare()](#function.cubrid-prepare) o [cubrid_execute()](#function.cubrid-execute).
       Si el identificador de petición no se especifica, se asume el último identificador solicitado por
       [cubrid_prepare()](#function.cubrid-prepare) o [cubrid_execute()](#function.cubrid-execute).





### Valores devueltos

El número de filas afectadas por la sentencia SQL, cuando el proceso tiene éxito.

-1, cuando la sentencia SQL no es INSERT, DELETE o UPDATE.

**[false](#constant.false)**, cuando el identificador de solicitud no está especificado, y no existe una última
petición.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_affected_rows()**

&lt;?php
$conn = cubrid_connect('localhost', 33000, 'demodb', 'dba', '');
cubrid_execute($conn, "DROP TABLE IF EXISTS cubrid_test");
cubrid_execute($conn, "CREATE TABLE cubrid_test (d varchar)");
$sql_stmt = "INSERT INTO cubrid_test(d) VALUES('php-test')";
$req = cubrid_prepare($conn, $sql_stmt);

for ($i = 0; $i &lt; 10; $i++) {
    cubrid_execute($req);
}
cubrid_commit($conn);

$req = cubrid_execute($conn, "DELETE FROM cubrid_test WHERE d='php-test'", CUBRID_ASYNC);
var_dump(cubrid_affected_rows());
var_dump(cubrid_affected_rows($conn));
var_dump(cubrid_affected_rows($req));

cubrid_disconnect($conn);

print "¡Hecho!";
?&gt;

El ejemplo anterior mostrará:

int(10)
int(10)
int(10)
done!

### Ver también

    - [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

# cubrid_client_encoding

(PECL CUBRID &gt;= 8.3.1)

cubrid_client_encoding — Devuelve el actual conjunto de caracteres de la conexión a CUBRID

### Descripción

**cubrid_client_encoding**([resource](#language.types.resource) $conn_identifier = ?): [string](#language.types.string)

Esta función devuelve el actual conjunto de caracteres de conexión a CUBRID y es similar
a la función CUBRID [cubrid_get_charset()](#function.cubrid-get-charset).

### Parámetros

conn_identifier
Conexión CUBRID. Si no se especifica el identificador de conexión, se asumirá el último enlace abierto por [cubrid_connect()](#function.cubrid-connect).

### Valores devueltos

Cadena que representa el conjunto de caracteres de la conexión a CUBRID; en caso de éxito.

    **[false](#constant.false)** en caso de falla.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_client_encoding()**

&lt;?php

$con = cubrid_connect("localhost", 33000, "demodb");
if (!$con)
{
die('No se pudo conectar.');
}

printf("Conjunto actual de caracteres de CUBRID: %s\n", cubrid_client_encoding($con));

?&gt;

    El ejemplo anterior mostrará:

CUBRID current charset: iso8859-1

### Ver también

    - [cubrid_get_charset()](#function.cubrid-get-charset) - Devolver el conjunto de caracteres de la conexión CUBRID actual

# cubrid_close

(PECL CUBRID &gt;= 8.3.1)

cubrid_close — Cerrar la conexión de CUBRID

### Descripción

**cubrid_close**([resource](#language.types.resource) $conn_identifier = ?): [bool](#language.types.boolean)

La función **cubrid_close()** termina la transacción
en proceso actual, cierra el gestor de conexión y se desconecta del
servidor. Si existe cualquier gestor de petición que no se haya cerrado todavía em este punto,
éste se cerrará. Es similar a la función de CUBRID
[cubrid_disconnect()](#function.cubrid-disconnect).

### Parámetros

     conn_identifier
     El identificador de conexión de CUBRID. Si no se especifica el identificador de conexión, se asume la última conexión abierta por [cubrid_connect()](#function.cubrid-connect).

### Valores devueltos

**[true](#constant.true)**, cuando el proceso es satisfactorio.

**[false](#constant.false)**, cuando el proceso es insatisfactorio.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_close()**

&lt;?php
$con = cubrid_connect ("localhost", 33000, "demodb");
if ($con) {
echo "conectado satisfactoriamente";
$req = cubrid_execute ( $con, "insert into person values(1,'James')");
   if ($req) {
cubrid_close_request ($req);
      cubrid_commit ($con);
} else {
cubrid_rollback ($con);
   }
   cubrid_close ($con);
}
?&gt;

### Ver también

    - [cubrid_disconnect()](#function.cubrid-disconnect) - Cerrar una conexión a una base de datos

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_connect_with_url()](#function.cubrid-connect-with-url) - Establecer el entorno para la conexión al servidor de CUBRID

# cubrid_data_seek

(PECL CUBRID &gt;= 8.3.0)

cubrid_data_seek — Mueve el puntero interno de la fila del resultado CUBRID

### Descripción

**cubrid_data_seek**([resource](#language.types.resource) $result, [int](#language.types.integer) $row_number): [bool](#language.types.boolean)

Esta función desplaza el puntero interno de las filas del
resultado CUBRID (asociado con el identificador especificado) para apuntar
al número de fila especificada. Hay funciones, como
[cubrid_fetch_assoc()](#function.cubrid-fetch-assoc), que utiliza el valor actualmente almacenado
del número de fila.

### Parámetros

     result
     El resultado.




     row_number
     Éste es el número de fila deseado del puntero del nuevo resultado.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_data_seek()**

&lt;?php
$conn = cubrid_connect("127.0.0.1", 33000, "demodb");

$req = cubrid_execute($conn, "SELECT \* FROM code");
cubrid_data_seek($req, 0);

$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_data_seek($req, 2);
$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_data_seek($req, 4);
$result = cubrid_fetch_row($req);
var_dump($result);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(2) {
[0]=&gt;
string(1) "X"
[1]=&gt;
string(5) "Mixed"
}
array(2) {
[0]=&gt;
string(1) "M"
[1]=&gt;
string(3) "Man"
}
array(2) {
[0]=&gt;
string(1) "S"
[1]=&gt;
string(6) "Silver"
}

# cubrid_db_name

(PECL CUBRID &gt;= 8.3.1)

cubrid_db_name — Obtener el nombre de la base de datos desde los resultados de cubrid_list_dbs

### Descripción

**cubrid_db_name**([array](#language.types.array) $result, [int](#language.types.integer) $index): [string](#language.types.string)

Recupera el nombre de la base de datos desde una llamada a [cubrid_list_dbs()](#function.cubrid-list-dbs).

### Parámetros

     result


       El puntero resultado desde un llamada a [cubrid_list_dbs()](#function.cubrid-list-dbs).






     index


       El índice dentro del conjunto resultado.





### Valores devueltos

Devuelve el nombre de la base de datos en caso de éxito, y **[false](#constant.false)** en caso de fallo. Si se devuelve
**[false](#constant.false)**, use [cubrid_error()](#function.cubrid-error) para determinar la naturaleza
del error.

### Ejemplos

    **Ejemplo #1 Ejemplo de cubrid_db_name()**

&lt;?php
error_reporting(E_ALL);

$conn = cubrid_connect('localhost', 33000, 'demodb', 'dba', '');
$db_list = cubrid_list_dbs($conn);

$i = 0;
$cnt = count($db_list);
while ($i &lt; $cnt) {
    echo cubrid_db_name($db_list, $i) . "\n";
$i++;
}
?&gt;

    El ejemplo anterior mostrará:

demodb

### Ver también

    - [cubrid_list_dbs()](#function.cubrid-list-dbs) - Devuelve una matriz con la lista de todas las bases de datos Cubrid existentes

# cubrid_errno

(PECL CUBRID &gt;= 8.3.1)

cubrid_errno — Devuelve el valor numérico del mensaje de error de la operación de CUBRID previa

### Descripción

**cubrid_errno**([resource](#language.types.resource) $conn_identifier = ?): [int](#language.types.integer)

Devuelve el número de error de la última función CUBRID.

La función **cubrid_errno()** se usa para obtener el
código de error que ocurrió durante la ejecución de la API. Normalmente,
obtiene el error cuando la API devuelve false como su valor de retorno.

### Parámetros

     conn_identifier


       El identificador de conexión de CUBRID. Si el identificador de conexión no se
       especifica, se asume la última conexión abierta por
       [cubrid_connect()](#function.cubrid-connect).





### Valores devueltos

Devuelve el número de error de la última función CUBRID, o 0 (cero) si no ocurrio ningún error.

### Ejemplos

    **Ejemplo #1 Ejemplo de cubrid_errno()**

&lt;?php
$con = cubrid_connect('localhost', 33000, 'demodb', 'dba', '');
$req = cubrid_execute($con, "select id, name from person");
if ($req) {
while (list ($id, $name) = cubrid_fetch($req))
echo $id, $name;
} else {
    echo "Código de error: ", cubrid_errno($con);
echo "Mensaje de error: ", cubrid_error($con);
}
?&gt;

    El ejemplo anterior mostrará:

Código de error: -493 Mensaje de error:: Syntax: Unknown class "person". select id, [name] from person

### Ver también

    - [cubrid_error()](#function.cubrid-error) - Se usa para obtener el mensaje de error

    - [cubrid_error_code()](#function.cubrid-error-code) - Obtener el código de error de la llamada a una función más reciente

    - [cubrid_error_msg()](#function.cubrid-error-msg) - Obtener el último mensaje de error de la llamada a la función más reciente

# cubrid_error

(PECL CUBRID &gt;= 8.3.1)

cubrid_error — Se usa para obtener el mensaje de error

### Descripción

**cubrid_error**([resource](#language.types.resource) $connection = ?): [string](#language.types.string)

La función **cubrid_error()** se usa para obtener el mensaje de
error que ocurrió durante el uso de la API CUBRID. Normalmente, obtiene el mensaje de
error cuando la API devuelve false como su valor de retorno.

### Parámetros

     connection
     La conexión CUBRID

### Valores devueltos

Mensaje de error que ocurrió.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_error()**

&lt;?php
$con = cubrid_connect('localhost', 33000, 'demodb', 'dba', '');
$req = cubrid_execute($con, "select id, name from person");
if ($req) {
while (list ($id, $name) = cubrid_fetch($req))
echo $id, $name;
} else {
    echo "Código de error: ", cubrid_errno($con);
echo "Mensaje de error: ", cubrid_error($con);
}
?&gt;

El ejemplo anterior mostrará:

Código de error: -493 Mensaje de error: Syntax: Unknown class "person". select id, [name] from person

### Ver también

    - [cubrid_errno()](#function.cubrid-errno) - Devuelve el valor numérico del mensaje de error de la operación de CUBRID previa

    - [cubrid_error_code()](#function.cubrid-error-code) - Obtener el código de error de la llamada a una función más reciente

    - [cubrid_error_msg()](#function.cubrid-error-msg) - Obtener el último mensaje de error de la llamada a la función más reciente

# cubrid_fetch_array

(PECL CUBRID &gt;=8.3.0)

cubrid_fetch_array — Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos

### Descripción

**cubrid_fetch_array**([resource](#language.types.resource) $result, [int](#language.types.integer) $type = CUBRID_BOTH): [array](#language.types.array)

La función **cubrid_fetch_array()** se utiliza para recuperar
una sola línea desde el resultado de la consulta y devuelve
un array. El cursor se mueve automáticamente a la siguiente línea
una vez que el resultado ha sido recuperado.

### Parámetros

     result
     El parámetro Result proviene de una
      llamada a la función [cubrid_execute()](#function.cubrid-execute)




     type
     Tipo del array recuperado: CUBRID_NUM, CUBRID_ASSOC, CUBRID_BOTH.
      Si se necesita utilizar un objeto LOB, se puede utilizar CUBRID_LOB.


### Valores devueltos

Devuelve un array de strings correspondiente a la línea
recuperada, cuando la operación tiene éxito.

**[false](#constant.false)** cuando no hay más líneas,
NULL cuando ocurre un error.

El tipo del array devuelto depende del tipo que se haya definido.
Utilizando CUBRID_BOTH (valor por defecto), se recuperará un array
que contiene tanto índices asociativos como numéricos; se puede elegir explícitamente este tipo a través del argumento type.
La variable type puede ser definida a uno de
los siguientes valores:

- CUBRID_NUM: Array numérico (comenzando en el índice 0)

- CUBRID_ASSOC: Array asociativo

- CUBRID_BOTH: Array asociativo y numérico (valor por defecto)

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_fetch_array()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_execute($conn, "SELECT name,area,seats,address FROM stadium WHERE nation_code='GRE' AND seats &gt; 10000");

printf("%-40s %-10s %-6s %-20s\n", "name", "area", "seats", "address");
while ($row = cubrid_fetch_array($req, CUBRID_NUM)) {
printf("%-40s %-10s %-6s %-20s\n", $row[0], $row[1], $row[2], $row[3]);
}

// Si se desea utilizar un objeto LOB, se puede utilizar
// cubrid_fetch_array($req, CUBRID_NUM | CUBRID_LOB)

cubrid_close_request($req);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

name area seats address
Panathinaiko Stadium 86300.00 50000 Athens, Greece
Olympic Stadium 54700.00 13000 Athens, Greece
Olympic Indoor Hall 34100.00 18800 Athens, Greece
Olympic Hall 52400.00 21000 Athens, Greece
Olympic Aquatic Centre 42500.00 11500 Athens, Greece
Markopoulo Olympic Equestrian Centre 64000.00 15000 Markopoulo, Athens, Greece
Faliro Coastal Zone Olympic Complex 34650.00 12171 Faliro, Athens, Greece
Athens Olympic Stadium 120400.00 71030 Maroussi, Athens, Greece
Ano Liossia 34000.00 12000 Ano Liosia, Athens, Greece

### Ver también

- [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

- [cubrid_fetch()](#function.cubrid-fetch) - Obtener la siguiente fila de un conjunto de resultados

- [cubrid_fetch_row()](#function.cubrid-fetch-row) - Devuelve un array numérico con los valores de la fila actual

- [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) - Devuelve un array asociativo correspondiente a la fila recuperada

- [cubrid_fetch_object()](#function.cubrid-fetch-object) - Recupera la siguiente línea y la devuelve como un objeto

# cubrid_fetch_assoc

(PECL CUBRID &gt;= 8.3.0)

cubrid_fetch_assoc — Devuelve un array asociativo correspondiente a la fila recuperada

### Descripción

**cubrid_fetch_assoc**([resource](#language.types.resource) $result, [int](#language.types.integer) $type = ?): [array](#language.types.array)

Esta función devuelve un array asociativo correspondiente a la fila
recuperada, luego, mueve el puntero de datos interno a la siguiente fila.
La función devuelve **[false](#constant.false)** si no hay más resultados disponibles.

### Parámetros

    result
    El parámetro result
     proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




    type
    El tipo solo puede ser CUBRID_LOB; este parámetro
     será utilizado únicamente cuando se necesite utilizar un objeto LOB.

### Valores devueltos

Un array asociativo, en caso de éxito.

    **[false](#constant.false)** cuando no hay más filas, NULL
    si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_fetch_assoc()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_execute($conn, "SELECT name,area,seats,address FROM stadium WHERE nation_code='GRE' AND seats &gt; 10000");

printf("%-40s %-10s %-6s %-20s\n", "name", "area", "seats", "address");
while ($row = cubrid_fetch_assoc($req)) {
printf("%-40s %-10s %-6s %-20s\n",
$row["name"], $row["area"], $row["seats"], $row["address"]);
}

// Si se desea utilizar un objeto LOB, se puede utilizar
// cubrid_fetch_assoc($req, CUBRID_LOB)

cubrid_close_request($req);

cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

name area seats address
Panathinaiko Stadium 86300.00 50000 Athens, Greece
Olympic Stadium 54700.00 13000 Athens, Greece
Olympic Indoor Hall 34100.00 18800 Athens, Greece
Olympic Hall 52400.00 21000 Athens, Greece
Olympic Aquatic Centre 42500.00 11500 Athens, Greece
Markopoulo Olympic Equestrian Centre 64000.00 15000 Markopoulo, Athens, Greece
Faliro Coastal Zone Olympic Complex 34650.00 12171 Faliro, Athens, Greece
Athens Olympic Stadium 120400.00 71030 Maroussi, Athens, Greece
Ano Liossia 34000.00 12000 Ano Liosia, Athens, Greece

### Ver también

- [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

- [cubrid_fetch()](#function.cubrid-fetch) - Obtener la siguiente fila de un conjunto de resultados

- [cubrid_fetch_row()](#function.cubrid-fetch-row) - Devuelve un array numérico con los valores de la fila actual

- [cubrid_fetch_array()](#function.cubrid-fetch-array) - Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos

- [cubrid_fetch_object()](#function.cubrid-fetch-object) - Recupera la siguiente línea y la devuelve como un objeto

# cubrid_fetch_field

(PECL CUBRID &gt;= 8.3.1)

cubrid_fetch_field — Devuelve un objeto con ciertas propiedades

### Descripción

**cubrid_fetch_field**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset = 0): [object](#language.types.object)

Esta función devuelve un objeto con ciertas propiedades de la columna
especificada. Las propiedades del objeto son:

     name
     nombre de la columna




     table
     nombre de la tabla a la que pertenece la columna




     def
     valor predeterminado de la columna




     max_length
     longitud máxima de la columna




     not_null
     1 si la columna no puede ser NULL




     primary_key
     1 si la columna es una clave primaria




     unique_key
     1 si la columna es clave única




     multiple_key
     1 si la columna no es clave única




     numeri
     1 si la columna es numérica




     blob
     1 si la columna es un BLOB




     type
     el tipo de la columna




     unsigned
     1 si la columna no tiene signo




     zerofill
     1 si la columna se rellena con ceros

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




     field_offset
     El índice del campo numérico. Si el índice del campo no se especifica, se
      recupera el siguiente campo (el que aún no ha sido recuperado por esta función).
      field_offset comienza en 0.

### Valores devueltos

Un objeto con ciertas propiedades de la columna especificada, cuando el proceso tuvo éxito.

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_fetch_field()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_execute($conn, "SELECT event_code,athlete_code,nation_code,game_date FROM game WHERE host_year=1988 and event_code=20001;");

var_dump(cubrid_fetch_row($req));

cubrid_field_seek($req, 1);
$field = cubrid_fetch_field($req);

printf("\n--- Field Properties ---\n");
printf("%-30s %s\n", "name:", $field-&gt;name);
printf("%-30s %s\n", "table:", $field-&gt;table);
printf("%-30s \"%s\"\n", "default value:", $field-&gt;def);
printf("%-30s %d\n", "max length:", $field-&gt;max_length);
printf("%-30s %d\n", "not null:", $field-&gt;not_null);
printf("%-30s %d\n", "primary key:", $field-&gt;primary_key);
printf("%-30s %d\n", "unique key:", $field-&gt;unique_key);
printf("%-30s %d\n", "multiple key:", $field-&gt;multiple_key);
printf("%-30s %d\n", "numeric:", $field-&gt;numeric);
printf("%-30s %d\n", "blob:", $field-&gt;blob);
printf("%-30s %s\n", "type:", $field-&gt;type);
printf("%-30s %d\n", "unsigned:", $field-&gt;unsigned);
printf("%-30s %d\n", "zerofill:", $field-&gt;zerofill);

cubrid_close_request($req);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(5) "20001"
[1]=&gt;
string(5) "16681"
[2]=&gt;
string(3) "KOR"
[3]=&gt;
string(9) "1988-9-30"
}

--- Field Properties ---
name: athlete_code
table: game
default value: ""
max length: 0
not null: 1
primary key: 1
unique key: 1
multiple key: 0
numeric: 1
blob: 0
type: integer
unsigned: 0
zerofill: 0

# cubrid_fetch_lengths

(PECL CUBRID &gt;= 8.3.0)

cubrid_fetch_lengths — Devuelve una matriz con las longitudes de los valores de cada campo de la fila actual

### Descripción

**cubrid_fetch_lengths**([resource](#language.types.resource) $result): [array](#language.types.array)

Esta función devuelve una matriz numérica con las longitudes de los valores de
cada campo de la fila actual del conjunto de resultados o FALSE en
caso de fallo.

**Nota**:

    Si el tipo de información del campo es BLOB/CLOB, se debería tomar su longitud usando [cubrid_lob_size()](#function.cubrid-lob-size).

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)

### Valores devueltos

Una matriz numérica, cuando el proceso tuvo éxito.

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_fetch_lengths()**

$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$row = cubrid_fetch_row($result);
print_r($row);

$lens = cubrid_fetch_lengths($result);
print_r($lens);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Array
(
[0] =&gt; 2004
[1] =&gt; 20085
[2] =&gt; 15118
[3] =&gt; 30134
[4] =&gt; AUS
[5] =&gt; G
[6] =&gt; 2004-8-20
)
Array
(
[0] =&gt; 4
[1] =&gt; 5
[2] =&gt; 5
[3] =&gt; 5
[4] =&gt; 3
[5] =&gt; 1
[6] =&gt; 10
)

# cubrid_fetch_object

(PECL CUBRID &gt;= 8.3.0)

cubrid_fetch_object — Recupera la siguiente línea y la devuelve como un objeto

### Descripción

**cubrid_fetch_object**(
    [resource](#language.types.resource) $result,
    [string](#language.types.string) $class_name = ?,
    [array](#language.types.array) $params = ?,
    [int](#language.types.integer) $type = ?
): [object](#language.types.object)

Esta función devuelve un objeto con los nombres de la columna
del conjunto de resultados como propiedades. Los valores de estas propiedades
se extraen de la línea actual del conjunto de resultados.

### Parámetros

result
El parámetro result proviene de una
llamada a la función [cubrid_execute()](#function.cubrid-execute)

    class_name


        El nombre de la clase a instanciar, definir las propiedades y devolver.
        Si no se especifica, se devuelve un objeto [stdClass](#class.stdclass).






     params


        Un array de parámetros opcionales a pasar al constructor
        de la clase class_name.






     type


        El tipo solo puede ser CUBRID_LOB; este parámetro
        solo se utilizará cuando se necesite usar
        un objeto lob.





### Valores devueltos

Un objeto en caso de éxito.

    **[false](#constant.false)** cuando no hay más líneas, NULL si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_fetch_object()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$res = cubrid_execute($conn, "SELECT \* FROM code");

var_dump(cubrid_fetch_object($res));

class demodb_code {
public $s_name = null;
public $f_name = null;

    public function toString() {
        var_dump($this);
    }

}

var_dump(cubrid_fetch_object($res, "demodb_code"));

// Si se desea utilizar un objeto LOB, se puede usar
// cubrid_fetch_object($res, 'demodb_code_construct', array('s_name', 'f_name'), CUBRID_LOB)

class demodb_code_construct extends demodb_code {
public function \_\_construct($s, $f) {
$this-&gt;s_name = $s;
$this-&gt;f_name = $f;
}
}

var_dump(cubrid_fetch_object($res, 'demodb_code_construct', array('s_name', 'f_name')));

// Si se desea utilizar un objeto LOB, se puede usar
// cubrid_fetch_object($res, 'demodb_code_construct', array('s_name', 'f_name'), CUBRID_LOB)

var_dump(cubrid_fetch_object($res));

cubrid_close_request($res);
cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

object(stdClass)#1 (2) {
["s_name"]=&gt;
string(1) "X"
["f_name"]=&gt;
string(5) "Mixed"
}
object(demodb_code)#1 (2) {
["s_name"]=&gt;
string(1) "W"
["f_name"]=&gt;
string(5) "Woman"
}
object(demodb_code_construct)#1 (2) {
["s_name"]=&gt;
string(6) "s_name"
["f_name"]=&gt;
string(6) "f_name"
}
object(stdClass)#1 (2) {
["s_name"]=&gt;
string(1) "B"
["f_name"]=&gt;
string(6) "Bronze"
}

### Ver también

- [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

- [cubrid_fetch()](#function.cubrid-fetch) - Obtener la siguiente fila de un conjunto de resultados

- [cubrid_fetch_array()](#function.cubrid-fetch-array) - Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos

- [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) - Devuelve un array asociativo correspondiente a la fila recuperada

- [cubrid_fetch_row()](#function.cubrid-fetch-row) - Devuelve un array numérico con los valores de la fila actual

# cubrid_fetch_row

(PECL CUBRID &gt;= 8.3.0)

cubrid_fetch_row — Devuelve un array numérico con los valores de la fila actual

### Descripción

**cubrid_fetch_row**([resource](#language.types.resource) $result, [int](#language.types.integer) $type = ?): [array](#language.types.array)

Esta función devuelve un array numérico con los valores de la fila
actual del conjunto de resultados, comenzando en 0 y desplaza
el puntero interno de datos.

### Parámetros

    result
    El argumento result
     proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




    type
    El tipo solo puede ser CUBRID_LOB; este argumento
     será utilizado únicamente cuando se necesite utilizar un
     objeto lob.

### Valores devueltos

Un array numérico en caso de éxito.

    **[false](#constant.false)** cuando no hay más filas, NULL si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_fetch_row()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_execute($conn, "SELECT name,area,seats,address FROM stadium WHERE nation_code='GRE' AND seats &gt; 10000");

printf("%-40s %-10s %-6s %-20s\n", "name", "area", "seats", "address");
while ($row = cubrid_fetch_row($req)) {
printf("%-40s %-10s %-6s %-20s\n", $row[0], $row[1], $row[2], $row[3]);
}

// Si se desea utilizar un objeto lob, se puede utilizar
// cubrid_fetch_row($req, CUBRID_LOB)

cubrid_close_request($req);

cubrid_disconnect($conn);
?&gt;

    El ejemplo anterior mostrará:

name area seats address
Panathinaiko Stadium 86300.00 50000 Athens, Greece
Olympic Stadium 54700.00 13000 Athens, Greece
Olympic Indoor Hall 34100.00 18800 Athens, Greece
Olympic Hall 52400.00 21000 Athens, Greece
Olympic Aquatic Centre 42500.00 11500 Athens, Greece
Markopoulo Olympic Equestrian Centre 64000.00 15000 Markopoulo, Athens, Greece
Faliro Coastal Zone Olympic Complex 34650.00 12171 Faliro, Athens, Greece
Athens Olympic Stadium 120400.00 71030 Maroussi, Athens, Greece
Ano Liossia 34000.00 12000 Ano Liosia, Athens, Greece

### Ver también

- [cubrid_execute()](#function.cubrid-execute) - Ejecutar una sentencia SQL preparada

- [cubrid_fetch()](#function.cubrid-fetch) - Obtener la siguiente fila de un conjunto de resultados

- [cubrid_fetch_array()](#function.cubrid-fetch-array) - Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos

- [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) - Devuelve un array asociativo correspondiente a la fila recuperada

- [cubrid_fetch_object()](#function.cubrid-fetch-object) - Recupera la siguiente línea y la devuelve como un objeto

# cubrid_field_flags

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_flags — Devuelve una string con los flags de la posición del campo proporcionado

### Descripción

**cubrid_field_flags**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

Esta función devuelve una [string](#language.types.string) con los flags de la posición
del campo proporcionado, separados por un espacio. Se puede utilizar la función
explode() para obtener cada flag. Los flags disponibles son:
**[not_null](#constant.not-null)**, **[primary_key](#constant.primary-key)**,
**[unique_key](#constant.unique-key)**, **[foreign_key](#constant.foreign-key)**,
**[auto_increment](#constant.auto-increment)**, **[shared](#constant.shared)**,
**[reverse_index](#constant.reverse-index)**, **[reverse_unique](#constant.reverse-unique)** y
**[timestamp](#constant.timestamp)**.

### Parámetros

     result
     El parámetro result proviene de
      la llamada a la función [cubrid_execute()](#function.cubrid-execute)




     field_offset
     La posición numérica del campo.
      field_offset comienza en cero (0). Si
      field_offset no existe, se emitirá un error de nivel
      **[E_WARNING](#constant.e-warning)**.

### Valores devueltos

Una [string](#language.types.string) con los flags, en caso de éxito.

**[false](#constant.false)** si el valor de field_offset es inválido.

-1 si la consulta SQL no es de tipo SELECT.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_field_flags()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$col_num = cubrid_num_cols($result);

printf("%-30s %s\n", "Field Name", "Field Flags");
for($i = 0; $i &lt; $col_num; $i++) {
    printf("%-30s %s\n", cubrid_field_name($result, $i), cubrid_field_flags($result, $i));
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Field Name Field Flags
host_year not_null primary_key unique_key
event_code not_null primary_key unique_key foreign_key
athlete_code not_null primary_key unique_key foreign_key
stadium_code not_null
nation_code
medal
game_date

# cubrid_field_len

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_len — Devuelve la longitud máxima del campo especificado

### Descripción

**cubrid_field_len**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [int](#language.types.integer)

Esta función devuelve la longitud máxima del campo especificado en caso de éxito, o FALSE en caso de fallo.

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




     field_offset
     El índice de campo numérico. field_offset comienza en 0. Si field_offset no existe, se emitirá un error de nivel **[E_WARNING](#constant.e-warning)**.

### Valores devueltos

La longitud máxima, cuando el proceso ha tenido éxito.

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_field_len()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$column_names = cubrid_column_names($result);
$column_types = cubrid_column_types($result);

printf("%-30s %-30s %-15s\n", "Column Names", "Column Types", "Column Maxlen");
for($i = 0, $size = count($column_names); $i &lt; $size; $i++) {
    $column_len = cubrid_field_len($result, $i);
    printf("%-30s %-30s %-15s\n", $column_names[$i], $column_types[$i], $column_len);
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Column Names Column Types Column Maxlen
host_year integer 11
event_code integer 11
athlete_code integer 11
stadium_code integer 11
nation_code char 3
medal char 1
game_date date 10

# cubrid_field_name

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_name — Devuelve el nombre del índice del campo especificado

### Descripción

**cubrid_field_name**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

Esta función devuelve el nombre del índice del campo especificado en caso de éxito o
FALSE en caso de fallo.

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




     field_offset

      El índice de campo numérico. field_offset
      comienza en 0. Si field_offset no existe, se
      emitirá un error de nivel **[E_WARNING](#constant.e-warning)**.


### Valores devueltos

El nombre del índice del campo especificado, en caso de éxito.

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_field_name()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM game WHERE host_year=2004 AND nation_code='AUS' AND medal='G'");

$col_num = cubrid_num_cols($result);

printf("%-30s %s\n", "Field Name", "Field Flags");
for($i = 0; $i &lt; $col_num; $i++) {
    printf("%-30s %s\n", cubrid_field_name($result, $i), cubrid_field_flags($result, $i));
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Field Name Field Flags
host_year not_null primary_key unique_key
event_code not_null primary_key unique_key foreign_key
athlete_code not_null primary_key unique_key foreign_key
stadium_code not_null
nation_code
medal
game_date

# cubrid_field_seek

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_seek — Mueve el cursor del conjunto de resultados al índece del campo especificado

### Descripción

**cubrid_field_seek**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset = 0): [bool](#language.types.boolean)

Esta función mueve el cursor del conjunto de resultados al índece del campo especificado.
Este índice es usado por [cubrid_fetch_field()](#function.cubrid-fetch-field) si
no se incluye un índice de campo. Devuelve TRUE en caso de éxito o FALSE en
caso de fallo.

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




     field_offset

      El índice de campo numérico. field_offset
      comienza en 0. Si field_offset no existe, se emitirá
      un error de nivel **[E_WARNING](#constant.e-warning)**.


### Valores devueltos

**[true](#constant.true)** en caso de éxito.

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_field_seek()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$req = cubrid_execute($conn, "SELECT event_code,athlete_code,nation_code,game_date FROM game WHERE host_year=1988 and event_code=20001;");

var_dump(cubrid_fetch_row($req));

cubrid_field_seek($req, 1);
$field = cubrid_fetch_field($req);

printf("\n--- Field Properties ---\n");
printf("%-30s %s\n", "name:", $field-&gt;name);
printf("%-30s %s\n", "table:", $field-&gt;table);
printf("%-30s \"%s\"\n", "default value:", $field-&gt;def);
printf("%-30s %d\n", "max length:", $field-&gt;max_length);
printf("%-30s %d\n", "not null:", $field-&gt;not_null);
printf("%-30s %d\n", "unique key:", $field-&gt;unique_key);
printf("%-30s %d\n", "multiple key:", $field-&gt;multiple_key);
printf("%-30s %d\n", "numeric:", $field-&gt;numeric);
printf("%-30s %s\n", "type:", $field-&gt;type);

cubrid_close_request($req);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(4) {
[0]=&gt;
string(5) "20001"
[1]=&gt;
string(5) "16132"
[2]=&gt;
string(3) "KOR"
[3]=&gt;
string(9) "1988-09-30"
}

--- Field Properties ---
name: athlete_code
table: game
default value: ""
max length: 0
not null: 1
unique key: 1
multiple key: 0
numeric: 1
type: integer

# cubrid_field_table

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_table — Devuelve el nombre de la tabla del campo especificado

### Descripción

**cubrid_field_table**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

Esta función devuelve el nombre de la tabla del campo especificado. Esto es útil cuando se usan consultas SELECT largas con JOINS.

### Parámetros

     result

      result proviene de una llamada a
       [cubrid_execute()](#function.cubrid-execute)





     field_offset

      El desplazamiento del campo numérico. El field_offset
      comienza en 0. Si field_offset no existe, también se emite
      un error de nivel **[E_WARNING](#constant.e-warning)**.


### Valores devueltos

El nombre de la tabla del campo especificado, en caso de éxito.

**[false](#constant.false)** cuando field_offset tiene un valor no válido.

-1 si la sentencia SQL no es SELECT.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_field_table()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM code");

$col_num = cubrid_num_cols($result);

printf("%-15s %-15s %s\n", "Field Table", "Field Name", "Field Type");
for($i = 0; $i &lt; $col_num; $i++) {
    printf("%-15s %-15s %s\n",
        cubrid_field_table($result, $i), cubrid_field_name($result, $i), cubrid_field_type($result, $i));
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Field Table Field Name Field Type
code s_name char
code f_name varchar

# cubrid_field_type

(PECL CUBRID &gt;= 8.3.0)

cubrid_field_type — Devuelve el tipo de columna que se corresponde con el índice del campo dado

### Descripción

**cubrid_field_type**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_offset): [string](#language.types.string)

Esta función devuelve el tipo de columna que se corresponde con el índice del
campo dado. El tipo de campo devuelto debería ser uno de los siguientes:
"int", "real", "string", etc.

### Parámetros

     result

      result proviene de una llamada a
      [cubrid_execute()](#function.cubrid-execute)





     field_offset

      El índice de campo numérico. field_offset
      comienza en 0. Si field_offset no existe, se
      emitirá un error de nivel **[E_WARNING](#constant.e-warning)**.


### Valores devueltos

El tipo de la columna, en caso de éxito.

**[false](#constant.false)** cuando field_offset no tiene un valor válido.

-1 si la sentencia SQL no es SELECT.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_field_type()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");
$result = cubrid_execute($conn, "SELECT \* FROM code");

$col_num = cubrid_num_cols($result);

printf("%-15s %-15s %s\n", "Field Table", "Field Name", "Field Type");
for($i = 0; $i &lt; $col_num; $i++) {
    printf("%-15s %-15s %s\n",
        cubrid_field_table($result, $i), cubrid_field_name($result, $i), cubrid_field_type($result, $i));
}

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Field Table Field Name Field Type
code s_name char
code f_name varchar

# cubrid_list_dbs

(PECL CUBRID &gt;= 8.3.0)

cubrid_list_dbs — Devuelve una matriz con la lista de todas las bases de datos Cubrid existentes

### Descripción

**cubrid_list_dbs**([resource](#language.types.resource) $conn_identifier = ?): [array](#language.types.array)

Esta función devuelve una matriz con la lista de todas las bases de datos Cubrid
existentes.

### Parámetros

     conn_identifier
     La conexión CUBRID.

### Valores devueltos

Una matriz numérica con todas las bases de datos Cubrid existentes; en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_list_dbs()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$db_list = cubrid_list_dbs($conn);
var_dump($db_list);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(1) {
[0]=&gt;
string(6) "demodb"
}

# cubrid_num_fields

(PECL CUBRID &gt;= 8.3.0)

cubrid_num_fields — Devuelve el número de columnas en el conjunto de resultados

### Descripción

**cubrid_num_fields**([resource](#language.types.resource) $result): [int](#language.types.integer)

Esta función devuelve el número de columnas en el conjunto de resultados
en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Parámetros

     result
     El parámetro result proviene
      de una llamada a la función [cubrid_execute()](#function.cubrid-execute),
      [cubrid_query()](#function.cubrid-query) o
      [cubrid_prepare()](#function.cubrid-prepare)

### Valores devueltos

Número de columnas en caso de éxito.

-1 si la consulta SQL no es de tipo SELECT.

**[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_num_fields()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$req = cubrid_execute($conn, "SELECT \* FROM code");

$row_num = cubrid_num_rows($req);
$col_num = cubrid_num_fields($req);

printf("Row Num: %d\nColumn Num: %d\n", $row_num, $col_num);

cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

Row Num: 6
Column Num: 2

# cubrid_ping

(PECL CUBRID &gt;= 8.3.1)

cubrid_ping — Hacer ping en una conexión al servidor o reconectar si no hay conexión

### Descripción

**cubrid_ping**([resource](#language.types.resource) $conn_identifier = ?): [bool](#language.types.boolean)

Verifica si la conexión al servidor está funcionando..

### Parámetros

     conn_identifier


       El identificador de conexión de CUBRID. Si el identificador de conexión no se
       especifica, se asume la última conexión abierta por
       [cubrid_connect()](#function.cubrid-connect).





### Valores devueltos

Devuelve **[true](#constant.true)** si la conexión al servidor CUBRID está funcionando, si no **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de cubrid_ping()**

&lt;?php
set_time_limit(0);

$con = cubrid_connect('localhost', 33000, 'demodb');

/_ Se asume que esta consulta tomará mucho tiempo _/
$sql = "select * from athlete";
$result = cubrid_query($sql);
if (!$result) {
echo 'La consulta #1 falló, saliendo.';
exit;
}

/_ Asegurarse de que la conexión todavía perdura, si no, intentar reconectar _/
if (!cubrid_ping($con)) {
    echo 'Conexión perdida, saliendo después de la consulta #1';
    exit;
}
cubrid_free_result($result);

/_ Ya que la conexión aún perdura, vamos a ejecutar otra consulta _/
$sql2 = "select * from code";
$result2 = cubrid_query($sql2);
?&gt;

# cubrid_query

(PECL CUBRID &gt;= 8.3.1)

cubrid_query — Enviar una consulta CUBRID

### Descripción

**cubrid_query**([string](#language.types.string) $query, [resource](#language.types.resource) $conn_identifier = ?): [resource](#language.types.resource)

**cubrid_query()** envía una consulta única (no están soportadas consultas múltiples) a la
base de datos activa actual en el servidor que está asociado con el conn_identifier especificado.

### Parámetros

     query


       Una consulta SQL




       La información dentro de la consulta debería estar [adecuadamente escapada](#function.cubrid-real-escape-string).






     conn_identifier


       La conexión CUBRID. Si el identificador de conexión no se especifica,
       se asume la última conexión abierta por
       [cubrid_connect()](#function.cubrid-connect).





### Valores devueltos

Para SELECT, SHOW, DESCRIBE, EXPLAIN y otras sentencias que devuelven conjuntos de resultadosa,
**cubrid_query()** devuelve un [resource](#language.types.resource) en caso de éxito, o **[false](#constant.false)** en caso de error.

Para otros tipos de sentencias SQL, INSERT, UPDATE, DELETE, DROP, etc,
**cubrid_query()** devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** en caso de error.

El recurso resultado devuelto debería ser pasado a [cubrid_fetch_array()](#function.cubrid-fetch-array), y a otras
funciones para tratar con las tablas de resultados, para acceder a la información devuelta.

Use [cubrid_num_rows()](#function.cubrid-num-rows) para vaeriguar cuántas filas fueron devueltas por una sentencia SELECT o
[cubrid_affected_rows()](#function.cubrid-affected-rows) para averiguar cuántas filas fueron afectadas por una sentencia DELETE, INSERT, REPLACE, o UPDATE.

**cubrid_query()** también podrá fallar y devolver **[false](#constant.false)**
si el usuario no tiene permiso para acceder a la/s tabla/s referenciada/s por la consulta.

### Ejemplos

    **Ejemplo #1 Consulta No Válida**



     La siguiente consulta no es válida sintácticamente, por lo que **cubrid_query()** fallará y devolverá **[false](#constant.false)**.

&lt;?php
$conn = cubrid_connect('localhost', 33000, 'demodb');

$result = cubrid_query('SELECT * WHERE 1=1');
if (!$result) {
die('Invalid query: ' . cubrid_error());
}

?&gt;

    **Ejemplo #2 Consulta Válida**



     La siguiente consulta es válida, por lo que **cubrid_query()** devolverá un [resource](#language.types.resource).

&lt;?php
// Esto podría ser proporcionado por el usuario, por ejemplo
$nombre = 'fred';
$apellido = 'fox';

cubrid_execute($conn,"DROP TABLE if exists friends");
cubrid_execute($conn,"create table friends(firstname varchar,lastname varchar,address char(24),age int)");
cubrid_execute($conn,"insert into friends values('fred','fox','home-1','20')");
cubrid_execute($conn,"insert into friends values('blue','cat','home-2','21')");
// Formular la Consulta
// Esta es la mejor manera de realizar una consulta SQL
// Para más ejemplos, véase cubrid_real_escape_string()
$consulta = sprintf("SELECT firstname, lastname, address, age FROM friends WHERE firstname='%s' AND lastname='%s'",
cubrid_real_escape_string($nombre),
cubrid_real_escape_string($apellido));

// Realizar la Constulta
$result = cubrid_query($consulta);

// Verificar el resultado
// Esto muestra la consulta real enviada a CUBRID, y el error. Útil para depuración.
if (!$result) {
    $mensaje  = 'Consulta no válida: ' . cubrid_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $consulta;
    die($mensaje);
}

// Usar el resultado
// Intentar imprimir $result no permitirá el acceso a la información en el recurso
// Se debe usar una de las funciones de resultados de cubrid
// Véase también cubrid_result(), cubrid_fetch_array(), cubrid_fetch_row(), etc.
while ($fila = cubrid_fetch_assoc($result)) {
echo $fila['firstname'];
echo $fila['lastname'];
echo $fila['address'];
echo $fila['age'];
}

// Liberar los recursos asociados con el conjunto de resultados
// Esto se hace automáticamente al final del script
cubrid_free_result($result);
?&gt;

### Ver también

    - [cubrid_connect()](#function.cubrid-connect) - Abrir una conexión al servidor CUBRID

    - [cubrid_error()](#function.cubrid-error) - Se usa para obtener el mensaje de error

    - [cubrid_real_escape_string()](#function.cubrid-real-escape-string) - Escapar caracteres especiales en una cadena para usarla en una sentencia SQL

    - [cubrid_result()](#function.cubrid-result) - Devuelve el valor de un campo específico de una fila específica

    - [cubrid_fetch_assoc()](#function.cubrid-fetch-assoc) - Devuelve un array asociativo correspondiente a la fila recuperada

    - [cubrid_unbuffered_query()](#function.cubrid-unbuffered-query) - Realiza una consulta sin traer los resultados a memoria

# cubrid_real_escape_string

(PECL CUBRID &gt;= 8.3.0)

cubrid_real_escape_string — Escapar caracteres especiales en una cadena para usarla en una sentencia SQL

### Descripción

**cubrid_real_escape_string**([string](#language.types.string) $unescaped_string, [resource](#language.types.resource) $conn_identifier = ?): [string](#language.types.string)

Esta función devuelve la versión escapada de la cadena dada.
Escapará los siguientes caracteres: '.

En general, las comillas simples se usan para encerrar strings. Las
comillas dobles se pueden usar también dependiendo del valor de ansi_quotes,
que es un parámetro relacionado con sentencias SQL. Si el valor de ansi_quotes value está
establecido a no, los strings encerrados entre comillas dobles se tratan como
strings, no como identificadores. El valor predeterminado es yes.

Si quiere incluir una comilla simple como parte de una cadena de caracteres, introduzca
dos comillas simples en una fila.

### Parámetros

     unescaped_string
     La cadena que va a ser escapada.




     conn_identifier

      La conexión CUBRID. Si el identificador de conexión no se especifica, se
      asume el último enlace abierto por [cubrid_connect()](#function.cubrid-connect).


### Valores devueltos

La versión escapada de la cadena dada, en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_real_escape_string()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$unescaped_str = ' !"#$%&amp;\'()\*+,-./0123456789:;&lt;=&gt;?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^\_`abcdefghijklmnopqrstuvwxyz{|}~';
$escaped_str = cubrid_real_escape_string($unescaped_str);

$len = strlen($unescaped_str);

@cubrid_execute($conn, "DROP TABLE cubrid_test");
cubrid_execute($conn, "CREATE TABLE cubrid_test (t char($len))");
cubrid_execute($conn, "INSERT INTO cubrid_test (t) VALUES('$escaped_str')");

$req = cubrid_execute($conn, "SELECT \* FROM cubrid_test");
$row = cubrid_fetch_assoc($req);

var_dump($row);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

array(1) {
["t"]=&gt;
string(95) " !"#$%&amp;'()\*+,-./0123456789:;&lt;=&gt;?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^\_`abcdefghijklmnopqrstuvwxyz{|}~"
}

# cubrid_result

(PECL CUBRID &gt;= 8.3.0)

cubrid_result — Devuelve el valor de un campo específico de una fila específica

### Descripción

**cubrid_result**([resource](#language.types.resource) $result, [int](#language.types.integer) $row, [mixed](#language.types.mixed) $field = 0): [string](#language.types.string)

Esta función devuelve el valor de un campo específico de una fila específica de
un conjunto de resultados.

### Parámetros

     result
     result proviene de una llamada a la función [cubrid_execute()](#function.cubrid-execute)




     row
     El número de fila del resultado que está siendo traído. Los números de fila comienzan en 0.




     field

      El nombre o índice del campo dado por field que está siendo obtenido.
      Puede ser el índice del campo, el nombre del campo, o la tabla del campo punto nombre
      del campo (nombretabla.nombrecampo). Si el nombre de la columna ha sido apodado
      ('select foo as bar from...'), use el alias en vez del nombre de la columna.
      Si no está definido se trae el primer campo.


### Valores devueltos

El valor de un campo específico, en caso de éxito (NULL si el valor es nulo).

**[false](#constant.false)** en caso de error.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_result()**

&lt;?php
$conn = cubrid_connect("localhost", 33000, "demodb");

$req = cubrid_execute($conn, "SELECT \* FROM code");

$result = cubrid_result($req, 0);
var_dump($result);

$result = cubrid_result($req, 0, 1);
var_dump($result);

$result = cubrid_result($req, 5, "f_name");
var_dump($result);

cubrid_close_request($req);
cubrid_disconnect($conn);
?&gt;

El ejemplo anterior mostrará:

string(1) "X"
string(5) "Mixed"
string(4) "Gold"

# cubrid_unbuffered_query

(PECL CUBRID &gt;= 8.3.0)

cubrid_unbuffered_query — Realiza una consulta sin traer los resultados a memoria

### Descripción

**cubrid_unbuffered_query**([string](#language.types.string) $query, [resource](#language.types.resource) $conn_identifier = ?): [resource](#language.types.resource)

Esta función realiza una consulta sin esperar a que todos los resultados de consulta hayan sido completados. Devolverá
cuando los resultados están siendo generados.

### Parámetros

     query
     Una consulta SQL.




     conn_identifier
     La conexión CUBRID. Si el identificador de conexión no se especifica, se asume el último enlace abierto por [cubrid_connect()](#function.cubrid-connect).

### Valores devueltos

Para sentencias SELECT, SHOW, DESCRIBE o EXPLAIN devuelve un recurso identificador de petición en caso de éxito.

Para otro tipo de sentencias SQL, UPDATE, DELETE, DROP, etc,, devuelve **[true](#constant.true)** en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de cubrid_unbuffered_query()**

&lt;?php
$enlace = cubrid_connect("localhost", 30000, "demodb", "dba", "");
    if (!$enlace)
{
die('No se pudo conectar.');
}
$consulta = "select * from code";
    $resultado = cubrid_unbuffered_query($consulta, $enlace);

    while ($fila = cubrid_fetch($resultado))
    {
        var_dump($fila);
    }

    cubrid_close_request($resultado);
    cubrid_disconnect($enlace);

?&gt;

### Notas

**Nota**:

     Los beneficios de **cubrid_unbuffered_query()** tienen
     un coste: no se puede usar [cubrid_num_rows()](#function.cubrid-num-rows) y
     [cubrid_data_seek()](#function.cubrid-data-seek) en un conjunto de resultados devueltos desde
     **cubrid_unbuffered_query()**.

## Tabla de contenidos

- [cubrid_affected_rows](#function.cubrid-affected-rows) — Devolver el número de filas afectadas por la última sentencia SQL
- [cubrid_client_encoding](#function.cubrid-client-encoding) — Devuelve el actual conjunto de caracteres de la conexión a CUBRID
- [cubrid_close](#function.cubrid-close) — Cerrar la conexión de CUBRID
- [cubrid_data_seek](#function.cubrid-data-seek) — Mueve el puntero interno de la fila del resultado CUBRID
- [cubrid_db_name](#function.cubrid-db-name) — Obtener el nombre de la base de datos desde los resultados de cubrid_list_dbs
- [cubrid_errno](#function.cubrid-errno) — Devuelve el valor numérico del mensaje de error de la operación de CUBRID previa
- [cubrid_error](#function.cubrid-error) — Se usa para obtener el mensaje de error
- [cubrid_fetch_array](#function.cubrid-fetch-array) — Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos
- [cubrid_fetch_assoc](#function.cubrid-fetch-assoc) — Devuelve un array asociativo correspondiente a la fila recuperada
- [cubrid_fetch_field](#function.cubrid-fetch-field) — Devuelve un objeto con ciertas propiedades
- [cubrid_fetch_lengths](#function.cubrid-fetch-lengths) — Devuelve una matriz con las longitudes de los valores de cada campo de la fila actual
- [cubrid_fetch_object](#function.cubrid-fetch-object) — Recupera la siguiente línea y la devuelve como un objeto
- [cubrid_fetch_row](#function.cubrid-fetch-row) — Devuelve un array numérico con los valores de la fila actual
- [cubrid_field_flags](#function.cubrid-field-flags) — Devuelve una string con los flags de la posición del campo proporcionado
- [cubrid_field_len](#function.cubrid-field-len) — Devuelve la longitud máxima del campo especificado
- [cubrid_field_name](#function.cubrid-field-name) — Devuelve el nombre del índice del campo especificado
- [cubrid_field_seek](#function.cubrid-field-seek) — Mueve el cursor del conjunto de resultados al índece del campo especificado
- [cubrid_field_table](#function.cubrid-field-table) — Devuelve el nombre de la tabla del campo especificado
- [cubrid_field_type](#function.cubrid-field-type) — Devuelve el tipo de columna que se corresponde con el índice del campo dado
- [cubrid_list_dbs](#function.cubrid-list-dbs) — Devuelve una matriz con la lista de todas las bases de datos Cubrid existentes
- [cubrid_num_fields](#function.cubrid-num-fields) — Devuelve el número de columnas en el conjunto de resultados
- [cubrid_ping](#function.cubrid-ping) — Hacer ping en una conexión al servidor o reconectar si no hay conexión
- [cubrid_query](#function.cubrid-query) — Enviar una consulta CUBRID
- [cubrid_real_escape_string](#function.cubrid-real-escape-string) — Escapar caracteres especiales en una cadena para usarla en una sentencia SQL
- [cubrid_result](#function.cubrid-result) — Devuelve el valor de un campo específico de una fila específica
- [cubrid_unbuffered_query](#function.cubrid-unbuffered-query) — Realiza una consulta sin traer los resultados a memoria

# Alias y Funciones Obsoletas de CUBRID

# cubrid_load_from_glo

(PECL CUBRID &gt;= 8.3.0)

cubrid_load_from_glo — Liga una donnée

### Descripción

**cubrid_load_from_glo**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid, [string](#language.types.string) $file_name): [int](#language.types.integer)

La función **cubrid_load_from_glo()** se utiliza para
leer una donnée desde una instancia glo, y la guarda en un fichero
dado.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     Oid de la instancia glo desde la cual se desea leer la donnée.




     file_name
     Nombre del fichero donde se debe realizar la guarda de la donnée.

### Valores devueltos

**[true](#constant.true)** cuando el proceso es un éxito.

**[false](#constant.false)** cuando el proceso ha fallado.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_load_from_glo()**

&lt;?php
$req = cubrid_execute ($con, "select image from person where id=1");
if ($req) {
   list ($oid) = cubrid_fetch($req);
   cubrid_close_request($req);
$res = cubrid_load_from_glo ($con, $oid, "output.jpg");
   if ($res) {
echo "imagen cambiada con éxito";
}
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**cubrid_load_from_glo()**

**Nota**:

    Esta función ha sido eliminada desde CUBRID 3.1.

### Ver también

    - [cubrid_new_glo()](#function.cubrid-new-glo) - Crea una instancia glo

    - [cubrid_save_to_glo()](#function.cubrid-save-to-glo) - Guarda un fichero en una instancia glo

    - [cubrid_send_glo()](#function.cubrid-send-glo) - Lee los datos desde una instancia glo

# cubrid_new_glo

(PECL CUBRID &gt;= 8.3.0)

cubrid_new_glo — Crea una instancia glo

### Descripción

**cubrid_new_glo**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $class_name, [string](#language.types.string) $file_name): [string](#language.types.string)

La función **cubrid_new_glo()** se utiliza para crear una
instancia glo en la clase solicitada (clase glo).
El glo creado es de tipo LO y se almacena en el fichero
file_name.

### Parámetros

     conn_identifier
     Identificador de conexión.




     class_name
     Nombre de la clase en la que se desea crear el glo.




     file_name
     El nombre del fichero en el que se desea guardar el nuevo glo creado.

### Valores devueltos

OID de la instancia creada en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_new_glo()**

&lt;?php
$oid = cubrid_new_glo ($con, "glo", "input.jpg");
if ($oid){
   // El tipo de la columna "image" es "object"
   $req = cubrid_execute ($con, "insert into person(image) values($oid)");
   if ($req) {
echo "imagen insertada con éxito";
cubrid_close_request ($req);
      cubrid_commit($con);
}
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**cubrid_new_glo()**

**Nota**:

    Esta función ha sido eliminada desde CUBRID 3.1.

### Ver también

    - [cubrid_save_to_glo()](#function.cubrid-save-to-glo) - Guarda un fichero en una instancia glo

    - [cubrid_load_from_glo()](#function.cubrid-load-from-glo) - Liga una donnée

    - [cubrid_send_glo()](#function.cubrid-send-glo) - Lee los datos desde una instancia glo

# cubrid_save_to_glo

(PECL CUBRID &gt;= 8.3.0)

cubrid_save_to_glo — Guarda un fichero en una instancia glo

### Descripción

**cubrid_save_to_glo**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid, [string](#language.types.string) $file_name): [int](#language.types.integer)

La función **cubrid_save_to_glo()** se utiliza para guardar
un fichero en una instancia glo.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     Oid de la instancia glo en la que se guardará el fichero.




     file_name
     El nombre del fichero a guardar.

### Valores devueltos

**[true](#constant.true)** en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_save_to_glo()**

&lt;?php
$req = cubrid_execute ($con, "select image from person where id=1");
if ($req) {
   list ($oid) = cubrid_fetch($req);
   cubrid_close_request($req);
$res = cubrid_save_to_glo ($con, $oid, "input.jpg");
   if ($res) {
echo "imagen cambiada con éxito";
}
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**cubrid_save_to_glo()**

**Nota**:

    Esta función ha sido eliminada desde CUBRID 3.1.

### Ver también

    - [cubrid_new_glo()](#function.cubrid-new-glo) - Crea una instancia glo

    - [cubrid_load_from_glo()](#function.cubrid-load-from-glo) - Liga una donnée

    - [cubrid_send_glo()](#function.cubrid-send-glo) - Lee los datos desde una instancia glo

# cubrid_send_glo

(PECL CUBRID &gt;= 8.3.0)

cubrid_send_glo — Lee los datos desde una instancia glo

### Descripción

**cubrid_send_glo**([resource](#language.types.resource) $conn_identifier, [string](#language.types.string) $oid): [int](#language.types.integer)

La función **cubrid_send_glo()** se utiliza para
leer los datos desde una instancia glo y los envía a la salida
estándar de PHP.

### Parámetros

     conn_identifier
     Identificador de conexión.




     oid
     Oid de la instancia glo desde la cual se leen los datos.

### Valores devueltos

**[true](#constant.true)** en caso de éxito.

**[false](#constant.false)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo con cubrid_send_glo()**

&lt;?php
$req = cubrid_execute ($con, "select image from person where id =1");
if ($req) {
  list ($oid) = cubrid_fetch($req);
  cubrid_close_request($req);
Header ("Content-type: image/jpeg");
cubrid_send_glo ($con, $oid);
}
?&gt;

### Notas

**Nota**:

    Por razones de compatibilidad ascendente,

el siguiente alias obsoleto puede ser utilizado:
**cubrid_send_glo()**

**Nota**:

    Esta función ha sido eliminada desde CUBRID 3.1.

### Ver también

    - [cubrid_new_glo()](#function.cubrid-new-glo) - Crea una instancia glo

    - [cubrid_save_to_glo()](#function.cubrid-save-to-glo) - Guarda un fichero en una instancia glo

    - [cubrid_load_from_glo()](#function.cubrid-load-from-glo) - Liga una donnée

## Tabla de contenidos

- [cubrid_load_from_glo](#function.cubrid-load-from-glo) — Liga una donnée
- [cubrid_new_glo](#function.cubrid-new-glo) — Crea una instancia glo
- [cubrid_save_to_glo](#function.cubrid-save-to-glo) — Guarda un fichero en una instancia glo
- [cubrid_send_glo](#function.cubrid-send-glo) — Lee los datos desde una instancia glo

- [Introducción](#intro.cubrid)
- [Instalación/Configuración](#cubrid.setup)<li>[Requerimientos](#cubrid.requirements)
- [Instalación](#cubrid.installation)
- [Configuración en tiempo de ejecución](#cubrid.configuration)
- [Tipos de recursos](#cubrid.resources)
  </li>- [Constantes predefinidas](#cubrid.constants)
- [Ejemplos](#cubrid.examples)
- [Funciones de CUBRID](#ref.cubrid)<li>[cubrid_bind](#function.cubrid-bind) — Vincular variables para una sentencia preparada como parámetros
- [cubrid_close_prepare](#function.cubrid-close-prepare) — Cerrar el gestor de solicitud
- [cubrid_close_request](#function.cubrid-close-request) — Cerrar el gestor de solicitud
- [cubrid_col_get](#function.cubrid-col-get) — Recupera el contenido de los elementos de un tipo de colección utilizando el OID
- [cubrid_col_size](#function.cubrid-col-size) — Obtener el número de elementos de la columna del tipo de colección usando OID
- [cubrid_column_names](#function.cubrid-column-names) — Obtener los nombres de las columnas del resultado
- [cubrid_column_types](#function.cubrid-column-types) — Obtener los tipos de columnas del resultado
- [cubrid_commit](#function.cubrid-commit) — Consigna una transacción
- [cubrid_connect](#function.cubrid-connect) — Abrir una conexión al servidor CUBRID
- [cubrid_connect_with_url](#function.cubrid-connect-with-url) — Establecer el entorno para la conexión al servidor de CUBRID
- [cubrid_current_oid](#function.cubrid-current-oid) — Obtener el OID de la posición del cursor actual
- [cubrid_disconnect](#function.cubrid-disconnect) — Cerrar una conexión a una base de datos
- [cubrid_drop](#function.cubrid-drop) — Borrar una instancia usando OID
- [cubrid_error_code](#function.cubrid-error-code) — Obtener el código de error de la llamada a una función más reciente
- [cubrid_error_code_facility](#function.cubrid-error-code-facility) — Obtener el código de error del dispositivo
- [cubrid_error_msg](#function.cubrid-error-msg) — Obtener el último mensaje de error de la llamada a la función más reciente
- [cubrid_execute](#function.cubrid-execute) — Ejecutar una sentencia SQL preparada
- [cubrid_fetch](#function.cubrid-fetch) — Obtener la siguiente fila de un conjunto de resultados
- [cubrid_free_result](#function.cubrid-free-result) — Liberar la memoria ocupada por los datos del resultado
- [cubrid_get](#function.cubrid-get) — Obtener una columna usando OID
- [cubrid_get_autocommit](#function.cubrid-get-autocommit) — Recupera el modo auto-commit de la conexión
- [cubrid_get_charset](#function.cubrid-get-charset) — Devolver el conjunto de caracteres de la conexión CUBRID actual
- [cubrid_get_class_name](#function.cubrid-get-class-name) — Obtener el nombre de la clase usando OID
- [cubrid_get_client_info](#function.cubrid-get-client-info) — Devolver la versión de la biblioteca cliente
- [cubrid_get_db_parameter](#function.cubrid-get-db-parameter) — Devuelve los parámetros de la base de datos CUBRID
- [cubrid_get_query_timeout](#function.cubrid-get-query-timeout) — Obtener el valor del tiempo de espera de consulta de la petición
- [cubrid_get_server_info](#function.cubrid-get-server-info) — Devolver la versión del servidor CUBRID
- [cubrid_insert_id](#function.cubrid-insert-id) — Devuelve el ID generado por la última columna actualizada AUTO_INCREMENT
- [cubrid_is_instance](#function.cubrid-is-instance) — Comprobar si existe la instancia apuntada por OID
- [cubrid_lob_close](#function.cubrid-lob-close) — Cerrar información BLOB/CLOB
- [cubrid_lob_export](#function.cubrid-lob-export) — Exporta datos BLOB/CLOB a un fichero
- [cubrid_lob_get](#function.cubrid-lob-get) — Recupera los datos BLOB/CLOB
- [cubrid_lob_send](#function.cubrid-lob-send) — Lee los datos BLOB/CLOB y los envía al navegador
- [cubrid_lob_size](#function.cubrid-lob-size) — Recupera el tamaño de los datos BLOB/CLOB
- [cubrid_lob2_bind](#function.cubrid-lob2-bind) — Asocia un objeto LOB o una cadena de caracteres a un objeto LOB
  como argumento de una consulta preparada
- [cubrid_lob2_close](#function.cubrid-lob2-close) — Cierra un objeto LOB
- [cubrid_lob2_export](#function.cubrid-lob2-export) — Exporta un objeto LOB a un fichero
- [cubrid_lob2_import](#function.cubrid-lob2-import) — Importa datos BLOB/CLOB desde un fichero
- [cubrid_lob2_new](#function.cubrid-lob2-new) — Crea un nuevo objeto LOB
- [cubrid_lob2_read](#function.cubrid-lob2-read) — Lee datos BLOB/CLOB
- [cubrid_lob2_seek](#function.cubrid-lob2-seek) — Desplaza el cursor de un objeto LOB
- [cubrid_lob2_seek64](#function.cubrid-lob2-seek64) — Desplaza el cursor de un objeto LOB
- [cubrid_lob2_size](#function.cubrid-lob2-size) — Obtiene el tamaño de un objeto LOB
- [cubrid_lob2_size64](#function.cubrid-lob2-size64) — Recupera el tamaño de un objeto LOB
- [cubrid_lob2_tell](#function.cubrid-lob2-tell) — Recupera la posición del cursor en un objeto LOB
- [cubrid_lob2_tell64](#function.cubrid-lob2-tell64) — Recupera la posición del cursor en el objeto LOB
- [cubrid_lob2_write](#function.cubrid-lob2-write) — Escribe en un objeto LOB
- [cubrid_lock_read](#function.cubrid-lock-read) — Coloca un bloqueo de lectura sobre el OID proporcionado
- [cubrid_lock_write](#function.cubrid-lock-write) — Coloca un bloqueo de escritura en el OID proporcionado
- [cubrid_move_cursor](#function.cubrid-move-cursor) — Desplaza el cursor en el resultado
- [cubrid_next_result](#function.cubrid-next-result) — Recupera el resultado de la siguiente consulta durante la ejecución
  de múltiples consultas SQL
- [cubrid_num_cols](#function.cubrid-num-cols) — Obtiene el número de columnas del conjunto de resultados
- [cubrid_num_rows](#function.cubrid-num-rows) — Obtiene el número de filas de un conjunto de resultados
- [cubrid_pconnect](#function.cubrid-pconnect) — Establece una conexión persistente con un servidor CUBRID
- [cubrid_pconnect_with_url](#function.cubrid-pconnect-with-url) — Establece una conexión persistente con un servidor CUBRID
- [cubrid_prepare](#function.cubrid-prepare) — Prepara una consulta SQL para su ejecución
- [cubrid_put](#function.cubrid-put) — Actualiza una columna según su OID
- [cubrid_rollback](#function.cubrid-rollback) — Anula una transacción
- [cubrid_schema](#function.cubrid-schema) — Recupera información sobre un esquema
- [cubrid_seq_drop](#function.cubrid-seq-drop) — Elimina un elemento de una secuencia
- [cubrid_seq_insert](#function.cubrid-seq-insert) — Inserta un elemento en una secuencia
- [cubrid_seq_put](#function.cubrid-seq-put) — Actualiza el valor de un elemento de una secuencia
- [cubrid_set_add](#function.cubrid-set-add) — Inserta un único elemento para definir el tipo de una columna
- [cubrid_set_autocommit](#function.cubrid-set-autocommit) — Define el modo auto-commit para la conexión
- [cubrid_set_db_parameter](#function.cubrid-set-db-parameter) — Define los parámetros de la base de datos CUBRID
- [cubrid_set_drop](#function.cubrid-set-drop) — Elimina un elemento
- [cubrid_set_query_timeout](#function.cubrid-set-query-timeout) — Define el tiempo máximo de ejecución de una consulta
- [cubrid_version](#function.cubrid-version) — Obtener la versión del módulo de PHP de CUBRID
  </li>- [Funciones de compatibilidad CUBRID MySQL](#cubridmysql.cubrid)<li>[cubrid_affected_rows](#function.cubrid-affected-rows) — Devolver el número de filas afectadas por la última sentencia SQL
- [cubrid_client_encoding](#function.cubrid-client-encoding) — Devuelve el actual conjunto de caracteres de la conexión a CUBRID
- [cubrid_close](#function.cubrid-close) — Cerrar la conexión de CUBRID
- [cubrid_data_seek](#function.cubrid-data-seek) — Mueve el puntero interno de la fila del resultado CUBRID
- [cubrid_db_name](#function.cubrid-db-name) — Obtener el nombre de la base de datos desde los resultados de cubrid_list_dbs
- [cubrid_errno](#function.cubrid-errno) — Devuelve el valor numérico del mensaje de error de la operación de CUBRID previa
- [cubrid_error](#function.cubrid-error) — Se usa para obtener el mensaje de error
- [cubrid_fetch_array](#function.cubrid-fetch-array) — Recupera una línea de resultado en forma de array asociativo, array numérico, o ambos
- [cubrid_fetch_assoc](#function.cubrid-fetch-assoc) — Devuelve un array asociativo correspondiente a la fila recuperada
- [cubrid_fetch_field](#function.cubrid-fetch-field) — Devuelve un objeto con ciertas propiedades
- [cubrid_fetch_lengths](#function.cubrid-fetch-lengths) — Devuelve una matriz con las longitudes de los valores de cada campo de la fila actual
- [cubrid_fetch_object](#function.cubrid-fetch-object) — Recupera la siguiente línea y la devuelve como un objeto
- [cubrid_fetch_row](#function.cubrid-fetch-row) — Devuelve un array numérico con los valores de la fila actual
- [cubrid_field_flags](#function.cubrid-field-flags) — Devuelve una string con los flags de la posición del campo proporcionado
- [cubrid_field_len](#function.cubrid-field-len) — Devuelve la longitud máxima del campo especificado
- [cubrid_field_name](#function.cubrid-field-name) — Devuelve el nombre del índice del campo especificado
- [cubrid_field_seek](#function.cubrid-field-seek) — Mueve el cursor del conjunto de resultados al índece del campo especificado
- [cubrid_field_table](#function.cubrid-field-table) — Devuelve el nombre de la tabla del campo especificado
- [cubrid_field_type](#function.cubrid-field-type) — Devuelve el tipo de columna que se corresponde con el índice del campo dado
- [cubrid_list_dbs](#function.cubrid-list-dbs) — Devuelve una matriz con la lista de todas las bases de datos Cubrid existentes
- [cubrid_num_fields](#function.cubrid-num-fields) — Devuelve el número de columnas en el conjunto de resultados
- [cubrid_ping](#function.cubrid-ping) — Hacer ping en una conexión al servidor o reconectar si no hay conexión
- [cubrid_query](#function.cubrid-query) — Enviar una consulta CUBRID
- [cubrid_real_escape_string](#function.cubrid-real-escape-string) — Escapar caracteres especiales en una cadena para usarla en una sentencia SQL
- [cubrid_result](#function.cubrid-result) — Devuelve el valor de un campo específico de una fila específica
- [cubrid_unbuffered_query](#function.cubrid-unbuffered-query) — Realiza una consulta sin traer los resultados a memoria
  </li>- [Alias y Funciones Obsoletas de CUBRID](#oldaliases.cubrid)<li>[cubrid_load_from_glo](#function.cubrid-load-from-glo) — Liga una donnée
- [cubrid_new_glo](#function.cubrid-new-glo) — Crea una instancia glo
- [cubrid_save_to_glo](#function.cubrid-save-to-glo) — Guarda un fichero en una instancia glo
- [cubrid_send_glo](#function.cubrid-send-glo) — Lee los datos desde una instancia glo
  </li>
