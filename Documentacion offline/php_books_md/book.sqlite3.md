# SQLite3

# Introducción

Soporte para bases de datos SQLite versión 3.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#sqlite3.requirements)
- [Instalación](#sqlite3.installation)
- [Configuración en tiempo de ejecución](#sqlite3.configuration)

    ## Requerimientos

    Desde PHP 7.4.0, [» libsqlite](http://sqlite.org/) ≥ 3.7.4 es requerida.
    Anteriormente, la biblioteca libsqlite integrada podría haber sido utilizada en su lugar.

## Instalación

El soporte de SQLite3 se activa por omisión.
Es posible desactivarlo mediante la opción
--without-sqlite3 durante la compilación.

Los usuarios de Windows deben activar la biblioteca
php_sqlite3.dll para utilizar esta
extensión. Esta DLL se incluye con las distribuciones de PHP para Windows.

**Nota**:
**Instalación adicional en Windows a partir de PHP 7.4.0**

Para hacer funcionar esta extensión, algunas bibliotecas
DLL deben estar disponibles a través del
PATH del sistema Windows. Lea la
F.A.Q titulada
"[Cómo agregar mi carpeta
PHP a mi PATH de Windows](#faq.installation.addtopath)" para más información. Copiar las bibliotecas DLL desde la
carpeta PHP a la carpeta del sistema de Windows también funciona (ya que la carpeta del sistema está por defecto en el
PATH del sistema), pero este método no es recomendado.
_Esta extensión requiere que los siguientes archivos estén en el
PATH:_ libsqlite3.dll.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración Sqlite3**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [sqlite3.extension_dir](#ini.sqlite3.extension-dir)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [sqlite3.defensive](#ini.sqlite3.defensive)
      1
      **[INI_USER](#constant.ini-user)**

       Disponible a partir de PHP 7.2.17 y 7.3.4 para libsqlite ≥ 3.26.0.
       Anterior a PHP 8.2.0 este parámetro solo podía ser modificado
       como **[INI_SYSTEM](#constant.ini-system)**.



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     sqlite3.extension_dir
     [string](#language.types.string)



      Ruta hacia el directorio donde se encuentran las extensiones cargables para SQLite.







     sqlite3.defensive
     [bool](#language.types.boolean)



      Cuando el flag defensivo está activado, las funcionalidades del lenguaje que
      permiten a SQL ordinario corromper deliberadamente los archivos de la
      base de datos son desactivadas. Esto impide escribir directamente en el esquema,
      las tablas sombra (como las tablas de datos FTS) o la tabla virtual sqlite_dbpage.
      Este parámetro php.ini solo es efectivo para libsqlite ≥ 3.26.0.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SQLITE3_ASSOC](#constant.sqlite3-assoc)**
     ([int](#language.types.integer))



      Especifica que el método [Sqlite3Result::fetchArray()](#sqlite3result.fetcharray) debe devolver un
      array indexado por el nombre de la columna en el conjunto de resultados
      correspondiente.





     **[SQLITE3_NUM](#constant.sqlite3-num)**
     ([int](#language.types.integer))



      Especifica que el método [Sqlite3Result::fetchArray()](#sqlite3result.fetcharray) debe devolver un
      array indexado por el número de la columna en el conjunto de resultados
      correspondiente, comenzando por la columna 0.





     **[SQLITE3_BOTH](#constant.sqlite3-both)**
     ([int](#language.types.integer))



      Especifica que el método [Sqlite3Result::fetchArray()](#sqlite3result.fetcharray) debe devolver un
      array indexado por el nombre y el número de la columna en el conjunto de
      resultados correspondiente, comenzando por la columna 0.





     **[SQLITE3_INTEGER](#constant.sqlite3-integer)**
     ([int](#language.types.integer))



      Representa la clase de almacenamiento INTEGER de SQLite3.





     **[SQLITE3_FLOAT](#constant.sqlite3-float)**
     ([int](#language.types.integer))



      Representa la clase de almacenamiento REAL (FLOAT) de SQLite3.





     **[SQLITE3_TEXT](#constant.sqlite3-text)**
     ([int](#language.types.integer))



      Representa la clase de almacenamiento TEXT de SQLite3.





     **[SQLITE3_BLOB](#constant.sqlite3-blob)**
     ([int](#language.types.integer))



      Representa la clase de almacenamiento BLOB de SQLite3.





     **[SQLITE3_NULL](#constant.sqlite3-null)**
     ([int](#language.types.integer))



      Representa la clase de almacenamiento NULL de SQLite3.





     **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)**
     ([int](#language.types.integer))



      Especifica que la base de datos SQLite3 debe ser abierta en modo de solo lectura.





     **[SQLITE3_OPEN_READWRITE](#constant.sqlite3-open-readwrite)**
     ([int](#language.types.integer))



      Especifica que la base de datos SQLite3 debe ser abierta en modo de lectura y
      escritura.





     **[SQLITE3_OPEN_CREATE](#constant.sqlite3-open-create)**
     ([int](#language.types.integer))



      Especifica que la base de datos SQLite3 debe ser creada si no existe
      previamente.





     **[SQLITE3_DETERMINISTIC](#constant.sqlite3-deterministic)**
     ([int](#language.types.integer))



      Especifica que una función creada con
      [SQLite3::createFunction()](#sqlite3.createfunction) es determinista,
      es decir, que siempre devuelve el mismo resultado dado los mismos argumentos en una sola instrucción SQL. (disponible a partir de PHP 7.1.4)


# La clase [SQLite3](#class.sqlite3)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Una clase de interfaz con las bases de datos SQLite3.

## Sinopsis de la Clase

     class **SQLite3**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [OK](#sqlite3.constants.ok);

    public
     const
     [int](#language.types.integer)
      [DENY](#sqlite3.constants.deny);

    public
     const
     [int](#language.types.integer)
      [IGNORE](#sqlite3.constants.ignore);

    public
     const
     [int](#language.types.integer)
      [CREATE_INDEX](#sqlite3.constants.create-index);

    public
     const
     [int](#language.types.integer)
      [CREATE_TABLE](#sqlite3.constants.create-table);

    public
     const
     [int](#language.types.integer)
      [CREATE_TEMP_INDEX](#sqlite3.constants.create-temp-index);

    public
     const
     [int](#language.types.integer)
      [CREATE_TEMP_TABLE](#sqlite3.constants.create-temp-table);

    public
     const
     [int](#language.types.integer)
      [CREATE_TEMP_TRIGGER](#sqlite3.constants.create-temp-trigger);

    public
     const
     [int](#language.types.integer)
      [CREATE_TEMP_VIEW](#sqlite3.constants.create-temp-view);

    public
     const
     [int](#language.types.integer)
      [CREATE_TRIGGER](#sqlite3.constants.create-trigger);

    public
     const
     [int](#language.types.integer)
      [CREATE_VIEW](#sqlite3.constants.create-view);

    public
     const
     [int](#language.types.integer)
      [DELETE](#sqlite3.constants.delete);

    public
     const
     [int](#language.types.integer)
      [DROP_INDEX](#sqlite3.constants.drop-index);

    public
     const
     [int](#language.types.integer)
      [DROP_TABLE](#sqlite3.constants.drop-table);

    public
     const
     [int](#language.types.integer)
      [DROP_TEMP_INDEX](#sqlite3.constants.drop-temp-index);

    public
     const
     [int](#language.types.integer)
      [DROP_TEMP_TABLE](#sqlite3.constants.drop-temp-table);

    public
     const
     [int](#language.types.integer)
      [DROP_TEMP_TRIGGER](#sqlite3.constants.drop-temp-trigger);

    public
     const
     [int](#language.types.integer)
      [DROP_TEMP_VIEW](#sqlite3.constants.drop-temp-view);

    public
     const
     [int](#language.types.integer)
      [DROP_TRIGGER](#sqlite3.constants.drop-trigger);

    public
     const
     [int](#language.types.integer)
      [DROP_VIEW](#sqlite3.constants.drop-view);

    public
     const
     [int](#language.types.integer)
      [INSERT](#sqlite3.constants.insert);

    public
     const
     [int](#language.types.integer)
      [PRAGMA](#sqlite3.constants.pragma);

    public
     const
     [int](#language.types.integer)
      [READ](#sqlite3.constants.read);

    public
     const
     [int](#language.types.integer)
      [SELECT](#sqlite3.constants.select);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION](#sqlite3.constants.transaction);

    public
     const
     [int](#language.types.integer)
      [UPDATE](#sqlite3.constants.update);

    public
     const
     [int](#language.types.integer)
      [ATTACH](#sqlite3.constants.attach);

    public
     const
     [int](#language.types.integer)
      [DETACH](#sqlite3.constants.detach);

    public
     const
     [int](#language.types.integer)
      [ALTER_TABLE](#sqlite3.constants.alter-table);

    public
     const
     [int](#language.types.integer)
      [REINDEX](#sqlite3.constants.reindex);

    public
     const
     [int](#language.types.integer)
      [ANALYZE](#sqlite3.constants.analyze);

    public
     const
     [int](#language.types.integer)
      [CREATE_VTABLE](#sqlite3.constants.create-vtable);

    public
     const
     [int](#language.types.integer)
      [DROP_VTABLE](#sqlite3.constants.drop-vtable);

    public
     const
     [int](#language.types.integer)
      [FUNCTION](#sqlite3.constants.function);

    public
     const
     [int](#language.types.integer)
      [SAVEPOINT](#sqlite3.constants.savepoint);

    public
     const
     [int](#language.types.integer)
      [COPY](#sqlite3.constants.copy);

    public
     const
     [int](#language.types.integer)
      [RECURSIVE](#sqlite3.constants.recursive);


    /* Métodos */

public [\_\_construct](#sqlite3.construct)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, [string](#language.types.string) $encryptionKey = "")

    public [backup](#sqlite3.backup)([SQLite3](#class.sqlite3) $destination, [string](#language.types.string) $sourceDatabase = "main", [string](#language.types.string) $destinationDatabase = "main"): [bool](#language.types.boolean)

public [busyTimeout](#sqlite3.busytimeout)([int](#language.types.integer) $milliseconds): [bool](#language.types.boolean)
public [changes](#sqlite3.changes)(): [int](#language.types.integer)
public [close](#sqlite3.close)(): [bool](#language.types.boolean)
public [createAggregate](#sqlite3.createaggregate)(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $stepCallback,
    [callable](#language.types.callable) $finalCallback,
    [int](#language.types.integer) $argCount = -1
): [bool](#language.types.boolean)
public [createCollation](#sqlite3.createcollation)([string](#language.types.string) $name, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [createFunction](#sqlite3.createfunction)(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $argCount = -1,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [enableExceptions](#sqlite3.enableexceptions)([bool](#language.types.boolean) $enable = **[false](#constant.false)**): [bool](#language.types.boolean)
public static [escapeString](#sqlite3.escapestring)([string](#language.types.string) $string): [string](#language.types.string)
public [exec](#sqlite3.exec)([string](#language.types.string) $query): [bool](#language.types.boolean)
public [lastErrorCode](#sqlite3.lasterrorcode)(): [int](#language.types.integer)
public [lastErrorMsg](#sqlite3.lasterrormsg)(): [string](#language.types.string)
public [lastInsertRowID](#sqlite3.lastinsertrowid)(): [int](#language.types.integer)
public [loadExtension](#sqlite3.loadextension)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [open](#sqlite3.open)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, [string](#language.types.string) $encryptionKey = ""): [void](language.types.void.html)
public [openBlob](#sqlite3.openblob)(
    [string](#language.types.string) $table,
    [string](#language.types.string) $column,
    [int](#language.types.integer) $rowid,
    [string](#language.types.string) $database = "main",
    [int](#language.types.integer) $flags = **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)**
): [resource](#language.types.resource)|[false](#language.types.singleton)
public [prepare](#sqlite3.prepare)([string](#language.types.string) $query): [SQLite3Stmt](#class.sqlite3stmt)|[false](#language.types.singleton)
public [query](#sqlite3.query)([string](#language.types.string) $query): [SQLite3Result](#class.sqlite3result)|[false](#language.types.singleton)
public [querySingle](#sqlite3.querysingle)([string](#language.types.string) $query, [bool](#language.types.boolean) $entireRow = **[false](#constant.false)**): [mixed](#language.types.mixed)
public [setAuthorizer](#sqlite3.setauthorizer)([?](#language.types.null)[callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public static [version](#sqlite3.version)(): [array](#language.types.array)

}

## Constantes predefinidas

     **[SQLite3::OK](#sqlite3.constants.ok)**








     **[SQLite3::DENY](#sqlite3.constants.deny)**








     **[SQLite3::IGNORE](#sqlite3.constants.ignore)**








     **[SQLite3::CREATE_INDEX](#sqlite3.constants.create-index)**








     **[SQLite3::CREATE_TABLE](#sqlite3.constants.create-table)**








     **[SQLite3::CREATE_TEMP_INDEX](#sqlite3.constants.create-temp-index)**








     **[SQLite3::CREATE_TEMP_TABLE](#sqlite3.constants.create-temp-table)**








     **[SQLite3::CREATE_TEMP_TRIGGER](#sqlite3.constants.create-temp-trigger)**








     **[SQLite3::CREATE_TEMP_VIEW](#sqlite3.constants.create-temp-view)**








     **[SQLite3::CREATE_TRIGGER](#sqlite3.constants.create-trigger)**








     **[SQLite3::CREATE_VIEW](#sqlite3.constants.create-view)**








     **[SQLite3::DELETE](#sqlite3.constants.delete)**








     **[SQLite3::DROP_INDEX](#sqlite3.constants.drop-index)**








     **[SQLite3::DROP_TABLE](#sqlite3.constants.drop-table)**








     **[SQLite3::DROP_TEMP_INDEX](#sqlite3.constants.drop-temp-index)**








     **[SQLite3::DROP_TEMP_TABLE](#sqlite3.constants.drop-temp-table)**








     **[SQLite3::DROP_TEMP_TRIGGER](#sqlite3.constants.drop-temp-trigger)**








     **[SQLite3::DROP_TEMP_VIEW](#sqlite3.constants.drop-temp-view)**








     **[SQLite3::DROP_TRIGGER](#sqlite3.constants.drop-trigger)**








     **[SQLite3::DROP_VIEW](#sqlite3.constants.drop-view)**








     **[SQLite3::INSERT](#sqlite3.constants.insert)**








     **[SQLite3::PRAGMA](#sqlite3.constants.pragma)**








     **[SQLite3::READ](#sqlite3.constants.read)**








     **[SQLite3::SELECT](#sqlite3.constants.select)**








     **[SQLite3::TRANSACTION](#sqlite3.constants.transaction)**








     **[SQLite3::UPDATE](#sqlite3.constants.update)**








     **[SQLite3::ATTACH](#sqlite3.constants.attach)**








     **[SQLite3::DETACH](#sqlite3.constants.detach)**








     **[SQLite3::ALTER_TABLE](#sqlite3.constants.alter-table)**








     **[SQLite3::REINDEX](#sqlite3.constants.reindex)**








     **[SQLite3::ANALYZE](#sqlite3.constants.analyze)**








     **[SQLite3::CREATE_VTABLE](#sqlite3.constants.create-vtable)**








     **[SQLite3::DROP_VTABLE](#sqlite3.constants.drop-vtable)**








     **[SQLite3::FUNCTION](#sqlite3.constants.function)**








     **[SQLite3::SAVEPOINT](#sqlite3.constants.savepoint)**








     **[SQLite3::COPY](#sqlite3.constants.copy)**








     **[SQLite3::RECURSIVE](#sqlite3.constants.recursive)**






# SQLite3::backup

(PHP 7 &gt;= 7.4.0, PHP 8)

SQLite3::backup — Realiza una copia de seguridad de una base de datos en otra base de datos

### Descripción

public **SQLite3::backup**([SQLite3](#class.sqlite3) $destination, [string](#language.types.string) $sourceDatabase = "main", [string](#language.types.string) $destinationDatabase = "main"): [bool](#language.types.boolean)

**SQLite3::backup()** copia el contenido de una base de datos
en otra, sobrescribiendo el contenido de la base de datos de destino.
Esto es útil para crear copias de seguridad de bases de datos
o para copiar bases de datos en memoria hacia o desde ficheros persistentes.

**Sugerencia**

    Desde SQLite 3.27.0 (2019-02-07), también es posible utilizar la instrucción
    VACUUM INTO 'file.db'; para guardar la base de datos en un nuevo fichero.

### Parámetros

    destination


      Una conexión a una base de datos SQLite3 abierta con [SQLite3::open()](#sqlite3.open).






    sourceDatabase


      El nombre de la base de datos es "main" para la base de datos principal,
      "temp" para la base de datos temporal,
      o el nombre especificado después del mot-clé AS
      en una instrucción ATTACH para una base de datos adjunta.






    destinationDatabase


      Análogo a sourceDatabase
      pero para la destination.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Realizar una copia de seguridad de una base de datos existente**

&lt;?php
// $conn es una conexión a una base de datos sqlite3 ya abierta

$backup = new SQLite3('backup.sqlite');
$conn-&gt;backup($backup);
?&gt;

# SQLite3::busyTimeout

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

SQLite3::busyTimeout — Define el gestor de espera de la conexión

### Descripción

public **SQLite3::busyTimeout**([int](#language.types.integer) $milliseconds): [bool](#language.types.boolean)

Define el gestor de espera que aguardará hasta que la base de datos
no esté bloqueada o hasta que se alcance el tiempo límite.

### Parámetros

     milliseconds


       Los milisegundos a esperar. Establecer este valor a cero o a un valor
       inferior desactivará un gestor de espera previamente definido.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# SQLite3::changes

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::changes —
Devuelve el número de líneas modificadas (o insertadas, borradas) por la
última consulta SQL

### Descripción

public **SQLite3::changes**(): [int](#language.types.integer)

Devuelve el número de líneas modificadas (o insertadas, borradas) por la
última consulta SQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) correspondiente al número de líneas modificadas (o insertadas,
borradas) por la última consulta SQL.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::changes()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');

$query = $db-&gt;exec('UPDATE counter SET views=0 WHERE page="test"');
if ($query) {
echo 'Número de líneas modificadas : ', $db-&gt;changes();
}
?&gt;

# SQLite3::close

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::close — Cierra la conexión con la base de datos

### Descripción

public **SQLite3::close**(): [bool](#language.types.boolean)

Cierra la conexión con la base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::close()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');
$db-&gt;close();
?&gt;

# SQLite3::\_\_construct

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::\_\_construct —
Instancia un objeto SQLite3 y abre la base de datos SQLite 3

### Descripción

public **SQLite3::\_\_construct**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, [string](#language.types.string) $encryptionKey = "")

Inicializa un objeto SQLite3 y abre una conexión a la base de datos
SQLite 3. Si el cifrado ha sido incluido durante la compilación, entonces esta
función intentará utilizar la clave correspondiente.

### Parámetros

     filename


       Ruta hacia la base de datos SQLite, o :memory: para utilizar
       la base de datos que se encuentra en la memoria RAM.
       Si filename es una cadena vacía, se creará una base de
       datos temporal privada en el disco. Esta base de datos
       privada será automáticamente eliminada tan pronto como la conexión de la base de
       datos sea cerrada.






     flags


       Bandera opcional utilizada para determinar la manera de apertura de la
       base de datos SQLite. Por omisión, la apertura se efectúa utilizando
       SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE.



        -

          **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)** : Abre la base de datos
          en modo solo lectura.





        -

          **[SQLITE3_OPEN_READWRITE](#constant.sqlite3-open-readwrite)** : Abre la base de datos
          en modo lectura y escritura.





        -

          **[SQLITE3_OPEN_CREATE](#constant.sqlite3-open-create)** : Crea la base de datos si
          no existe.










     encryptionKey


       Una clave de cifrado opcional, a utilizar durante el cifrado/descifrado
       de la base de datos SQLite. Si el módulo SQLite no está instalado,
       este parámetro no tendrá ningún efecto.





### Errores/Excepciones

Lanza una [Exception](#class.exception) en caso de error.

### Historial de cambios

      Versión
      Descripción






      7.0.10

       El filename puede ahora estar vacío para utilizar una base de datos privada, temporal en disco.



### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::__construct()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');

$db-&gt;exec('CREATE TABLE foo (bar TEXT)');
$db-&gt;exec("INSERT INTO foo (bar) VALUES ('This is a test')");

$result = $db-&gt;query('SELECT bar FROM foo');
var_dump($result-&gt;fetchArray());
?&gt;

# SQLite3::createAggregate

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::createAggregate — Registra una función PHP para ser utilizada como función de agregación SQLite

### Descripción

public **SQLite3::createAggregate**(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $stepCallback,
    [callable](#language.types.callable) $finalCallback,
    [int](#language.types.integer) $argCount = -1
): [bool](#language.types.boolean)

Registra una función PHP o una función definida por el usuario para ser
utilizada como función de agregación SQL, que será utilizada en las consultas
SQL.

### Parámetros

     name


       Nombre de la función de agregación SQL a crear o redefinir.






     stepCallback


       Función de retrollamada llamada para cada fila en el conjunto de resultados. Su
       función PHP debería acumular el resultado y almacenar su contexto de agregación.




       Esta función debe ser definida como:



        step(

    [mixed](#language.types.mixed) $context,
    [int](#language.types.integer) $rownumber,
    [mixed](#language.types.mixed) $value,
    [mixed](#language.types.mixed) ...$values
): [mixed](#language.types.mixed)

         context


           **[null](#constant.null)** para la primera fila; en las filas siguientes esto tendrá el valor
           que previamente fue retornado por la función step; debería utilizarse
           esto para mantener el estado de agregación.






         rownumber


           El número de fila actual.






         value


           El primer argumento a pasar al agregador.






         values


           Argumentos adicionales a pasar al agregador.






       El valor retornado por esta función será utilizado como argumento
       context durante la próxima llamada a una función
       de paso o final.




     finalCallback


       Función de retrollamada para agregar los "pasos" de datos de cada fila.
       Una vez que todas las filas han sido procesadas, la función será llamada,
       tomará los datos del contexto de agregación y retornará el resultado.
       La función de retrollamada debe retornar un tipo comprendido por SQLite
       (i.e. un [tipo escalar](#language.types.intro)).




       Esta función debe ser definida como:



        fini([mixed](#language.types.mixed) $context, [int](#language.types.integer) $rownumber): [mixed](#language.types.mixed)



         context


           Contiene el valor de retorno de la última llamada a la función step.






         rownumber


           Siempre 0.






       El valor de retorno de esta función será utilizado como valor de retorno para
       la agregación.




     argCount


       El número de argumentos tomados por la función de agregación SQL.
       Si este número es negativo, entonces la función de agregación SQL
       podrá tomar un número no definido de argumentos.





### Valores devueltos

Retorna **[true](#constant.true)** si la creación del agregado ha tenido éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de una función de agregación con max_length**

&lt;?php
$data = array(
   'one',
   'two',
   'three',
   'four',
   'five',
   'six',
   'seven',
   'eight',
   'nine',
   'ten',
   );
$db = new SQLite3(':memory:');
$db-&gt;exec("CREATE TABLE strings(a)");
$insert = $db-&gt;prepare('INSERT INTO strings VALUES (?)');
foreach ($data as $str) {
    $insert-&gt;bindValue(1, $str);
    $insert-&gt;execute();
}
$insert = null;

function max_len_step($context, $rownumber, $string)
{
    if (strlen($string) &gt; $context) {
        $context = strlen($string);
}
return $context;
}

function max_len_finalize($context, $rownumber)
{
return $context === null ? 0 : $context;
}

$db-&gt;createAggregate('max_len', 'max_len_step', 'max_len_finalize');

var_dump($db-&gt;querySingle('SELECT max_len(a) from strings'));
?&gt;

    El ejemplo anterior mostrará:

int(5)

En este ejemplo, se crea una función agregativa que calculará la
longitud de la cadena de caracteres más larga en una de las columnas de la
tabla. Para cada fila, la función max_len_step es
llamada y el parámetro $context es pasado. El
parámetro de contexto es como cualquier otra variable PHP y debe ser fijado para
contener un array o incluso, un objeto. En este ejemplo,
se utiliza para contener la longitud máxima que se ha visto hasta el momento; si el
parámetro $string tiene una longitud mayor que la actual, se
actualiza el contexto para contener esta nueva longitud máxima.

Una vez que todas las filas han sido procesadas, SQLite llama a la función
max_len_finalize para determinar el resultado agregativo.
Aquí, se podrían realizar cálculos basados en los datos encontrados
en $context. En nuestro ejemplo simple, hemos
calculado el resultado como si la consulta estuviera progresando, aunque simplemente
necesitamos retornar el valor de contexto.

**Sugerencia**

    No se RECOMIENDA registrar una copia de los valores en el contexto
    para finalmente procesarlos. En este caso, SQLite utilizaría mucha memoria
    para procesar la consulta - imagine la cantidad de memoria necesaria
    si un millón de filas fueran registradas en memoria, sabiendo que cada fila
    contiene una cadena de caracteres (32 bytes por cadena).

**Sugerencia**

    Puede utilizarse **SQLite3::createAggregate()** para sobrescribir las
    funciones nativas de SQLite.

# SQLite3::createCollation

(PHP 5 &gt;= 5.3.11, PHP 7, PHP 8)

SQLite3::createCollation — Registra una función PHP para utilizarla como función de clasificación SQL

### Descripción

public **SQLite3::createCollation**([string](#language.types.string) $name, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Registra una función PHP o una función definida por el usuario para
utilizarla como función de clasificación en una consulta SQL.

### Parámetros

    name


      Nombre de la función de clasificación SQL a crear o redefinir.






    callback


      El nombre de una función PHP o de una función definida por el usuario
      a aplicar como función de retorno, definiendo el comportamiento
      de la clasificación. Debe aceptar dos argumentos y retornará
      lo mismo que la función [strcmp()](#function.strcmp), es decir
      debe retornar -1, 1, o 0 si la primera cadena se clasifica antes,
      después, o es equivalente a la segunda.




      Esta función debe ser definida como:



       collation([mixed](#language.types.mixed) $value1, [mixed](#language.types.mixed) $value2): [int](#language.types.integer)



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::createCollation()**



     Registra la función PHP [strnatcmp()](#function.strnatcmp) como
     secuencia de clasificación en la base de datos SQLite3.

&lt;?php

$db = new SQLite3(":memory:");
$db-&gt;exec("CREATE TABLE test (col1 string)");
$db-&gt;exec("INSERT INTO test VALUES ('a1')");
$db-&gt;exec("INSERT INTO test VALUES ('a10')");
$db-&gt;exec("INSERT INTO test VALUES ('a2')");

$db-&gt;createCollation('NATURAL_CMP', 'strnatcmp');

$defaultSort = $db-&gt;query("SELECT col1 FROM test ORDER BY col1");
$naturalSort = $db-&gt;query("SELECT col1 FROM test ORDER BY col1 COLLATE NATURAL_CMP");

echo "Por omisión :\n";
while ($row = $defaultSort-&gt;fetchArray()){
echo $row['col1'], "\n";
}

echo "\nNatural :\n";
while ($row = $naturalSort-&gt;fetchArray()){
echo $row['col1'], "\n";
}

$db-&gt;close();

?&gt;

    El ejemplo anterior mostrará:

Por omisión :
a1
a10
a2

Natural :
a1
a2
a10

### Ver también

- La documentación sobre la clasificación SQLite : [» http://sqlite.org/datatype3.html#collation](http://sqlite.org/datatype3.html#collation)

# SQLite3::createFunction

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::createFunction — Registra una función PHP para su uso como función escalar SQL

### Descripción

public **SQLite3::createFunction**(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $argCount = -1,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Registra una función PHP o una función de usuario para su uso como
función escalar SQL, para su utilización en las consultas SQL.

### Parámetros

     name


       Nombre de la función SQL a crear o redefinir.






     callback


       El nombre de la función PHP o la función de usuario a aplicar
       como callback, definiendo el comportamiento de la función SQL.




       Esta función debe ser definida como:



        callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [mixed](#language.types.mixed)



         value


           El primer argumento a pasar a la función SQL.






         values


           Argumentos adicionales a pasar a la función SQL.










     argCount


       Número de argumentos que la función SQL acepta. Si este parámetro es
       -1, la función SQL puede aceptar cualquier número
       de argumentos.






     flags


       Una conjunción de operaciones a nivel de bits de indicadores. Actualmente, solo
       **[SQLITE3_DETERMINISTIC](#constant.sqlite3-deterministic)** es soportado, lo cual
       especifica que la función devuelve siempre el mismo resultado dado
       los mismos argumentos en una sola instrucción SQL.





### Valores devueltos

Devuelve **[true](#constant.true)** si la función fue creada con éxito, **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.1.4

       El parámetro flags fue añadido.



### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::createFunction()**

&lt;?php
function my_udf_md5($string) {
return hash('md5', $string);
}

$db = new SQLite3('mysqlitedb.db');
$db-&gt;createFunction('my_udf_md5', 'my_udf_md5');

var_dump($db-&gt;querySingle('SELECT my_udf_md5("test")'));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(32) "098f6bcd4621d373cade4e832627b4f6"

# SQLite3::enableExceptions

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::enableExceptions —
Activa el lanzamiento de excepciones

### Descripción

public **SQLite3::enableExceptions**([bool](#language.types.boolean) $enable = **[false](#constant.false)**): [bool](#language.types.boolean)

Controla si la instancia [SQLite3](#class.sqlite3) lanzará
excepciones o advertencias en caso de error.

### Parámetros

    enable


      Si **[true](#constant.true)**, la instancia [SQLite3](#class.sqlite3), y las instancias derivadas
      de [SQLite3Stmt](#class.sqlite3stmt) y [SQLite3Result](#class.sqlite3result),
      lanzarán excepciones en caso de errores.




      Si **[false](#constant.false)**, la instancia [SQLite3](#class.sqlite3), y las instancias derivadas
      de [SQLite3Stmt](#class.sqlite3stmt) y [SQLite3Result](#class.sqlite3result),
      lanzarán advertencias en caso de errores.




      Para cada uno de los modos, el código y mensaje de error, si los hay, estarán disponibles
      gracias a [SQLite3::lastErrorCode()](#sqlite3.lasterrorcode) y
      [SQLite3::lastErrorMsg()](#sqlite3.lasterrormsg) respectivamente.


### Valores devueltos

Devuelve el valor anterior; **[true](#constant.true)** si las excepciones estaban activadas, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a **SQLite3::enableExceptions()** con enable
       a **[false](#constant.false)** desencadenará una advertencia **[E_DEPRECATED](#constant.e-deprecated)**.



### Ejemplos

**Ejemplo #1 Ejemplo con SQLite3::enableExceptions()**

&lt;?php
$sqlite = new SQLite3(':memory:');
try {
$sqlite-&gt;exec('create table foo');
$sqlite-&gt;enableExceptions(true);
$sqlite-&gt;exec('create table bar');
} catch (Exception $e) {
echo 'Caught exception: ' . $e-&gt;getMessage();
}
?&gt;

Resultado del ejemplo anterior es similar a:

Warning: SQLite3::exec(): near "foo": syntax error in example.php on line 4
Caught exception: near "bar": syntax error

# SQLite3::escapeString

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::escapeString — Devuelve una cadena limpiada

### Descripción

public static **SQLite3::escapeString**([string](#language.types.string) $string): [string](#language.types.string)

Devuelve una cadena que ha sido limpiada para poder ser incluida de forma segura
en las consultas SQL.

**Advertencia**
Esta función no es capaz de manejar strings binarios !

Para manejar correctamente los campos BLOB que contienen caracteres NUL,
es preferible utilizar la función [SQLite3Stmt::bindParam()](#sqlite3stmt.bindparam).

### Parámetros

     string


       La cadena a limpiar.





### Valores devueltos

Devuelve una cadena limpiada, que podrá ser utilizada de forma segura en
una consulta SQL.

### Notas

**Advertencia**

    La función [addslashes()](#function.addslashes) no debe *PAS*
    ser utilizada para proteger la cadena en las consultas SQL; podrían observarse
    resultados extraños al recuperar los datos.

# SQLite3::exec

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::exec — Ejecuta una consulta en una base de datos

### Descripción

public **SQLite3::exec**([string](#language.types.string) $query): [bool](#language.types.boolean)

Ejecuta una consulta en una base de datos.

**Nota**:

    SQLite3 puede necesitar crear
    [» archivos temporales](https://sqlite.org/tempfiles.html)
    durante la ejecución de consultas, por lo que los directorios respectivos deben ser escribibles.

### Parámetros

     query


       La consulta SQL a ejecutar (típicamente, una consulta de tipo INSERT,
       UPDATE o DELETE).





### Valores devueltos

Devuelve **[true](#constant.true)** si la consulta se ejecutó con éxito, **[false](#constant.false)** si ocurre
un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::exec()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');

$db-&gt;exec('CREATE TABLE bar (bar TEXT)');
?&gt;

# SQLite3::lastErrorCode

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::lastErrorCode —
Devuelve el código de error de la última consulta SQL que ha fallado

### Descripción

public **SQLite3::lastErrorCode**(): [int](#language.types.integer)

Devuelve el código de error de la última consulta SQL que ha fallado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que representa el código de error de la última consulta que ha fallado.

# SQLite3::lastErrorMsg

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::lastErrorMsg —
Devuelve el mensaje de error, en inglés, de la última consulta que ha fallado

### Descripción

public **SQLite3::lastErrorMsg**(): [string](#language.types.string)

Devuelve el mensaje de error, en inglés, de la última consulta que ha fallado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error, en inglés, de la última consulta que ha fallado.

# SQLite3::lastInsertRowID

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::lastInsertRowID — Devuelve el identificador de la fila correspondiente a la última consulta de tipo INSERT

### Descripción

public **SQLite3::lastInsertRowID**(): [int](#language.types.integer)

Devuelve el identificador de la fila correspondiente a la última consulta de tipo INSERT ejecutada en la base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la fila correspondiente a la última consulta de tipo INSERT ejecutada en la base de datos.
Si ninguna consulta de tipo INSERT en las tablas rowid ha tenido éxito en esta conexión de base de datos,
entonces **SQLite3::lastInsertRowID()** devuelve 0.

# SQLite3::loadExtension

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::loadExtension — Intenta cargar una extensión de la biblioteca SQLite

### Descripción

public **SQLite3::loadExtension**([string](#language.types.string) $name): [bool](#language.types.boolean)

Intenta cargar una extensión de la biblioteca SQLite.

### Parámetros

     name


       El nombre de la extensión a cargar. La extensión debe encontrarse en
       el directorio especificado por la opción de configuración
       sqlite3.extension_dir.





### Valores devueltos

Devuelve **[true](#constant.true)** si la extensión se cargó con éxito, **[false](#constant.false)** si ocurre un
error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::loadExtension()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');
$db-&gt;loadExtension('libagg.so');
?&gt;

# SQLite3::open

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::open — Abre una base de datos SQLite

### Descripción

public **SQLite3::open**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, [string](#language.types.string) $encryptionKey = ""): [void](language.types.void.html)

Abre una base de datos SQLite 3. Si el cifrado fue incluido durante la
construcción de la base de datos, la clave correspondiente será utilizada.

### Parámetros

     filename


       Ruta hacia la base de datos SQLite, o :memory: para utilizar
       la base de datos que se encuentra en la memoria RAM.






     flags


       Banderas opcionales para determinar la manera de abrir
       la base de datos SQLite. Por omisión, será
       SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE.



        -

          **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)** : Abre la base de datos
          en modo solo lectura.





        -

          **[SQLITE3_OPEN_READWRITE](#constant.sqlite3-open-readwrite)** : Abre la base de datos
          en modo lectura y escritura.





        -

          **[SQLITE3_OPEN_CREATE](#constant.sqlite3-open-create)** : Crea la base de datos
          si no existe.










     encryptionKey


       La clave opcional de cifrado utilizada durante el cifrado/descifrado
       de la base de datos SQLite. Si el módulo de cifrado de SQLite no está
       instalado, este parámetro no tendrá ningún efecto.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::open()**

&lt;?php
/\*\*

- Ejemplo simple que extiende la clase SQLite3 y cambia los parámetros
- \_\_construct, luego, utiliza el método de conexión para inicializar la
- base de datos.
  \*/
  class MyDB extends SQLite3
  {
  function \_\_construct()
  {
  $this-&gt;open('mysqlitedb.db');
  }
  }

$db = new MyDB();

$db-&gt;exec('CREATE TABLE foo (bar STRING)');
$db-&gt;exec("INSERT INTO foo (bar) VALUES ('Esto es una prueba')");

$result = $db-&gt;query('SELECT bar FROM foo');
var_dump($result-&gt;fetchArray());
?&gt;

# SQLite3::openBlob

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::openBlob — Abre un flujo de recurso para leer un BLOB

### Descripción

public **SQLite3::openBlob**(
    [string](#language.types.string) $table,
    [string](#language.types.string) $column,
    [int](#language.types.integer) $rowid,
    [string](#language.types.string) $database = "main",
    [int](#language.types.integer) $flags = **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Abre un flujo de recurso para leer o escribir un BLOB, que sería seleccionado por:

SELECT column FROM database.table WHERE rowid = rowid

**Nota**:

    No es posible cambiar el tamaño de un BLOB escribiendo en el flujo.
    En su lugar, una declaración UPDATE debe ser ejecutada, utilizando, eventualmente,
    la función zeroblob() de SQLite para definir el tamaño del BLOB deseado.

### Parámetros

     table


       El nombre de la tabla.






     column


       El nombre de la columna.






     rowid


       La ID de la fila.






     database


       El nombre simbólico de la base de datos.






     flags


       O bien **[SQLITE3_OPEN_READONLY](#constant.sqlite3-open-readonly)** o
       **[SQLITE3_OPEN_READWRITE](#constant.sqlite3-open-readwrite)** para abrir el flujo
       en modo de solo lectura o de lectura y escritura, respectivamente.





### Valores devueltos

Devuelve un recurso de flujo, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.2.0

       El argumento flags fue añadido, permitiendo
       escribir BLOBs; anteriormente solo la lectura era soportada.



### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::openBlob()**

&lt;?php
$conn = new SQLite3(':memory:');
$conn-&gt;exec('CREATE TABLE test (text text)');
$conn-&gt;exec("INSERT INTO test VALUES ('Lorem ipsum')");
$stream = $conn-&gt;openBlob('test', 'text', 1);
echo stream_get_contents($stream);
fclose($stream); // obligatorio, de lo contrario la siguiente línea fallaría
$conn-&gt;close();
?&gt;

    El ejemplo anterior mostrará:

Lorem ipsum

    **Ejemplo #2 Escribir progresivamente un BLOB**

&lt;?php
$conn = new SQLite3(':memory:');
$conn-&gt;exec('CREATE TABLE test (text text)');
$conn-&gt;exec("INSERT INTO test VALUES (zeroblob(36))");
$stream = $conn-&gt;openBlob('test', 'text', 1, 'main', SQLITE3_OPEN_READWRITE);
for ($i = 0; $i &lt; 3; $i++) {
    fwrite($stream, "Lorem ipsum\n");
}
fclose($stream);
echo $conn-&gt;querySingle("SELECT text FROM test");
$conn-&gt;close();
?&gt;

    El ejemplo anterior mostrará:

Lorem ipsum
Lorem ipsum
Lorem ipsum

# SQLite3::prepare

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::prepare — Prepara una consulta SQL para su ejecución

### Descripción

public **SQLite3::prepare**([string](#language.types.string) $query): [SQLite3Stmt](#class.sqlite3stmt)|[false](#language.types.singleton)

Prepara una consulta SQL para su ejecución y devuelve un objeto [SQLite3Stmt](#class.sqlite3stmt).

### Parámetros

     query


       La consulta SQL a preparar.





### Valores devueltos

Devuelve un objeto [SQLite3Stmt](#class.sqlite3stmt) en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::prepare()**

&lt;?php
unlink('mysqlitedb.db');
$db = new SQLite3('mysqlitedb.db');

$db-&gt;exec('CREATE TABLE foo (id INTEGER, bar STRING)');
$db-&gt;exec("INSERT INTO foo (id, bar) VALUES (1, 'Ceci est un test')");

$stmt = $db-&gt;prepare('SELECT bar FROM foo WHERE id=:id');
$stmt-&gt;bindValue(':id', 1, SQLITE3_INTEGER);

$result = $stmt-&gt;execute();
var_dump($result-&gt;fetchArray());
?&gt;

### Ver también

- [SQLite3Stmt::paramCount()](#sqlite3stmt.paramcount) - Devuelve el número de argumentos de una consulta preparada

- [SQLite3Stmt::bindValue()](#sqlite3stmt.bindvalue) - Asocia el valor de un parámetro a una variable de declaración

- [SQLite3Stmt::bindParam()](#sqlite3stmt.bindparam) - Asocia un parámetro a una variable de declaración

# SQLite3::query

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::query — Ejecuta una consulta SQL

### Descripción

public **SQLite3::query**([string](#language.types.string) $query): [SQLite3Result](#class.sqlite3result)|[false](#language.types.singleton)

Ejecuta una consulta SQL y devuelve un objeto [SQLite3Result](#class.sqlite3result).
Si la consulta no genera resultados (como las instrucciones DML), el objeto
[SQLite3Result](#class.sqlite3result) devuelto no es realmente utilizable.
Utilice [sqlite3::exec()](#sqlite3.exec) para estas consultas en su lugar.

### Parámetros

     query


       La consulta SQL a ejecutar.





### Valores devueltos

Devuelve un objeto [SQLite3Result](#class.sqlite3result), o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::query()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');

$results = $db-&gt;query('SELECT bar FROM foo');
while ($row = $results-&gt;fetchArray()) {
    var_dump($row);
}
?&gt;

# SQLite3::querySingle

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::querySingle — Ejecuta una consulta y devuelve un único resultado

### Descripción

public **SQLite3::querySingle**([string](#language.types.string) $query, [bool](#language.types.boolean) $entireRow = **[false](#constant.false)**): [mixed](#language.types.mixed)

Ejecuta una consulta y devuelve un único resultado.

### Parámetros

     query


       La consulta SQL a ejecutar.






     entireRow


       Por omisión, esta función devuelve el valor de la primera columna
       devuelta por la consulta. Si entireRow es **[true](#constant.true)**, entonces la función
       devolverá un array que contiene toda la primera fila.





### Valores devueltos

Devuelve el valor de la primera columna del resultado, o un array
que contiene toda la primera fila (si el argumento entireRow
es **[true](#constant.true)**).

Si la consulta es válida pero no devuelve ningún resultado, **[null](#constant.null)** será devuelto si
entireRow es **[false](#constant.false)**, de lo contrario se devuelve un array vacío.

Las consultas inválidas devolverán **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::querySingle()**

&lt;?php
$db = new SQLite3('mysqlitedb.db');

var_dump($db-&gt;querySingle('SELECT username FROM user WHERE userid=1'));
print_r($db-&gt;querySingle('SELECT username, email FROM user WHERE userid=1', true));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(5) "Scott"
Array
(
[username] =&gt; Scott
[email] =&gt; scott@example.com
)

# SQLite3::setAuthorizer

(PHP 8)

SQLite3::setAuthorizer — Configura una función de retrollamada para utilizar como autorizador para limitar lo que una sentencia puede hacer

### Descripción

public **SQLite3::setAuthorizer**([?](#language.types.null)[callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada que será llamada por SQLite cada vez que se realiza una acción
(lectura, eliminación, actualización, etc.). Esto se utiliza durante la preparación de una sentencia SQL a partir
de una fuente no confiable para asegurarse de que las sentencias SQL no intenten acceder a datos
a los que no están autorizadas a acceder, o que no intenten ejecutar sentencias
maliciosas que dañen la base de datos. Por ejemplo, una aplicación puede autorizar a un usuario
a introducir consultas SQL arbitrarias para evaluación por una base de datos. Pero la aplicación no quiere
que el usuario pueda realizar modificaciones arbitrarias en la base de datos. Un autorizador podría
entonces establecerse mientras el SQL introducido por el usuario es preparado para prohibir todo excepto las
declaraciones SELECT.

La función de retrollamada del autorizador puede ser llamada varias veces para cada sentencia preparada por
SQLite. Una consulta SELECT o UPDATE llamará al autorizador para cada
columna que sería leída o actualizada.

La función de retrollamada del autorizador es llamada con hasta cinco parámetros. El primer parámetro siempre es
proporcionado, y es un [int](#language.types.integer) (código de acción) correspondiente a una constante de
SQLite3. Los otros parámetros solo se pasan para ciertas acciones. La
tabla siguiente describe los parámetros segundo y tercero según la acción:

    <caption>**Lista de códigos de acción y parámetros**</caption>



       Acción
       Segundo parámetro
       Tercer parámetro





      **[SQLite3::CREATE_INDEX](#sqlite3.constants.create-index)**Nombre del índiceNombre de la tabla

      **[SQLite3::CREATE_TABLE](#sqlite3.constants.create-table)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::CREATE_TEMP_INDEX](#sqlite3.constants.create-temp-index)**Nombre del índiceNombre de la tabla

      **[SQLite3::CREATE_TEMP_TABLE](#sqlite3.constants.create-temp-table)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::CREATE_TEMP_TRIGGER](#sqlite3.constants.create-temp-trigger)**Nombre del disparadorNombre de la tabla

      **[SQLite3::CREATE_TEMP_VIEW](#sqlite3.constants.create-temp-view)**Nombre de la vista**[null](#constant.null)**

      **[SQLite3::CREATE_TRIGGER](#sqlite3.constants.create-trigger)**Nombre del disparadorNombre de la tabla

      **[SQLite3::CREATE_VIEW](#sqlite3.constants.create-view)**Nombre de la vista**[null](#constant.null)**

      **[SQLite3::DELETE](#sqlite3.constants.delete)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::DROP_INDEX](#sqlite3.constants.drop-index)**Nombre del índiceNombre de la tabla

      **[SQLite3::DROP_TABLE](#sqlite3.constants.drop-table)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::DROP_TEMP_INDEX](#sqlite3.constants.drop-temp-index)**Nombre del índiceNombre de la tabla

      **[SQLite3::DROP_TEMP_TABLE](#sqlite3.constants.drop-temp-table)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::DROP_TEMP_TRIGGER](#sqlite3.constants.drop-temp-trigger)**Nombre del disparadorNombre de la tabla

      **[SQLite3::DROP_TEMP_VIEW](#sqlite3.constants.drop-temp-view)**Nombre de la vista**[null](#constant.null)**

      **[SQLite3::DROP_TRIGGER](#sqlite3.constants.drop-trigger)**Nombre del disparadorNombre de la tabla

      **[SQLite3::DROP_VIEW](#sqlite3.constants.drop-view)**Nombre de la vista**[null](#constant.null)**

      **[SQLite3::INSERT](#sqlite3.constants.insert)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::PRAGMA](#sqlite3.constants.pragma)**Nombre PragmaEl primer argumento pasado al pragma, o **[null](#constant.null)**

      **[SQLite3::READ](#sqlite3.constants.read)**Nombre de la tablaNombre de la columna

      **[SQLite3::SELECT](#sqlite3.constants.select)****[null](#constant.null)****[null](#constant.null)**

      **[SQLite3::TRANSACTION](#sqlite3.constants.transaction)**Operación**[null](#constant.null)**

      **[SQLite3::UPDATE](#sqlite3.constants.update)**Nombre de la tablaNombre de la columna

      **[SQLite3::ATTACH](#sqlite3.constants.attach)**Filename**[null](#constant.null)**

      **[SQLite3::DETACH](#sqlite3.constants.detach)**Nombre de la base de datos**[null](#constant.null)**

      **[SQLite3::ALTER_TABLE](#sqlite3.constants.alter-table)**Nombre DatabaseNombre de la tabla

      **[SQLite3::REINDEX](#sqlite3.constants.reindex)**Nombre del índice**[null](#constant.null)**

      **[SQLite3::ANALYZE](#sqlite3.constants.analyze)**Nombre de la tabla**[null](#constant.null)**

      **[SQLite3::CREATE_VTABLE](#sqlite3.constants.create-vtable)**Nombre de la tablaNombre del módulo

      **[SQLite3::DROP_VTABLE](#sqlite3.constants.drop-vtable)**Nombre de la tablaNombre del módulo

      **[SQLite3::FUNCTION](#sqlite3.constants.function)****[null](#constant.null)**Nombre de la función

      **[SQLite3::SAVEPOINT](#sqlite3.constants.savepoint)**OperaciónNombre del punto de guardado

      **[SQLite3::RECURSIVE](#sqlite3.constants.recursive)****[null](#constant.null)****[null](#constant.null)**



El cuarto parámetro será el nombre de la base de datos ("main",
"temp", etc.) si es aplicable.

El quinto parámetro de la función de retrollamada del autorizador es el nombre del disparador o de la vista más
interno que es responsable del intento de acceso o **[null](#constant.null)** si este intento de acceso proviene directamente del
código SQL de nivel superior.

Cuando la función de retrollamada devuelve **[SQLite3::OK](#sqlite3.constants.ok)**, significa que la operación
solicitada es aceptada. Cuando la función de retrollamada devuelve **[SQLite3::DENY](#sqlite3.constants.deny)**, la llamada que
provocó el autorizador fallará con un mensaje de error explicando que
el acceso es denegado.

Si el código de acción es **[SQLite3::READ](#sqlite3.constants.read)** y la función de retrollamada devuelve
**[SQLite3::IGNORE](#sqlite3.constants.ignore)**, entonces la sentencia preparada se construye para sustituir un valor
**[null](#constant.null)** en lugar de la columna de la tabla que se habría leído si **[SQLite3::OK](#sqlite3.constants.ok)** se hubiera devuelto.
Devolver **[SQLite3::IGNORE](#sqlite3.constants.ignore)** puede ser utilizado para denegar a un usuario no confiable el acceso
a columnas individuales de una tabla.

Cuando una tabla es referenciada por un SELECT pero no se extrae ningún valor de columna de
esa tabla (por ejemplo en una consulta como "SELECT count(\*) FROM table"), entonces la función
de retrollamada del autorizador se invoca una vez para esa tabla con un nombre de columna que es una cadena vacía.

Si el código de acción es **[SQLite3::DELETE](#sqlite3.constants.delete)** y la función de retrollamada devuelve
**[SQLite3::IGNORE](#sqlite3.constants.ignore)**, entonces la operación DELETE continúa pero la optimización de truncamiento es
desactivada y todas las filas se eliminan individualmente.

Solo un autorizador puede estar activo en una conexión de base de datos a la vez. Cada llamada a
**SQLite3::setAuthorizer()** reemplaza la llamada anterior. Desactive el autorizador instalando
una retrollamada **[null](#constant.null)**. El autorizador está desactivado por omisión.

La función de retrollamada del autorizador no debe hacer nada que modifique la conexión de base de
datos que ha invocado la función de retrollamada del autorizador.

Es importante señalar que el autorizador solo se llama cuando una sentencia es preparada, no cuando es
ejecutada.

Más detalles pueden encontrarse en la
[» documentación de SQLite3](http://sqlite.org/c3ref/set_authorizer.html).

### Parámetros

    callback


      El [callable](#language.types.callable) a llamar.




      Si se pasa **[null](#constant.null)**, esto desactivará la retrollamada del autorizador actual.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Este método no lanza ningún error, pero si un autorizador está activado y devuelve un
valor inválido, la preparación de la sentencia lanzará un error (o una excepción, según
el uso del método [SQLite3::enableExceptions()](#sqlite3.enableexceptions)).

### Ejemplos

**Ejemplo #1 Ejemplo de SQLite3::setAuthorizer()**

     Esto solo autoriza el acceso de lectura, y solo ciertas columnas de la tabla
     users serán devueltas. Las otras columnas serán reemplazadas por
     **[null](#constant.null)**.

&lt;?php
$db = new SQLite3('data.sqlite');
$db-&gt;exec('CREATE TABLE users (id, name, password);');
$db-&gt;exec('INSERT INTO users VALUES (1, \'Pauline\', \'Snails4eva\');');

$allowed_columns = ['id', 'name'];

$db-&gt;setAuthorizer(function (int $action, ...$args) use ($allowed_columns) {
    if ($action === SQLite3::READ) {
list($table, $column) = $args;

        if ($table === 'users' &amp;&amp; in_array($column, $allowed_columns)) {
            return SQLite3::OK;
        }

        return SQLite3::IGNORE;
    }

    return SQLite3::DENY;

});

print_r($db-&gt;querySingle('SELECT \* FROM users WHERE id = 1;'));

El ejemplo anterior mostrará:

Array
(
[id] =&gt; 1
[name] =&gt; Pauline
[password] =&gt;
)

# SQLite3::version

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3::version —
Devuelve la versión de la biblioteca SQLite3

### Descripción

public static **SQLite3::version**(): [array](#language.types.array)

Devuelve la versión de la biblioteca SQLite3.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo que contiene las claves
"versionString" y "versionNumber".

### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3::version()**

&lt;?php
print_r(SQLite3::version());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[versionString] =&gt; 3.5.9
[versionNumber] =&gt; 3005009
)

## Tabla de contenidos

- [SQLite3::backup](#sqlite3.backup) — Realiza una copia de seguridad de una base de datos en otra base de datos
- [SQLite3::busyTimeout](#sqlite3.busytimeout) — Define el gestor de espera de la conexión
- [SQLite3::changes](#sqlite3.changes) — Devuelve el número de líneas modificadas (o insertadas, borradas) por la
  última consulta SQL
- [SQLite3::close](#sqlite3.close) — Cierra la conexión con la base de datos
- [SQLite3::\_\_construct](#sqlite3.construct) — Instancia un objeto SQLite3 y abre la base de datos SQLite 3
- [SQLite3::createAggregate](#sqlite3.createaggregate) — Registra una función PHP para ser utilizada como función de agregación SQLite
- [SQLite3::createCollation](#sqlite3.createcollation) — Registra una función PHP para utilizarla como función de clasificación SQL
- [SQLite3::createFunction](#sqlite3.createfunction) — Registra una función PHP para su uso como función escalar SQL
- [SQLite3::enableExceptions](#sqlite3.enableexceptions) — Activa el lanzamiento de excepciones
- [SQLite3::escapeString](#sqlite3.escapestring) — Devuelve una cadena limpiada
- [SQLite3::exec](#sqlite3.exec) — Ejecuta una consulta en una base de datos
- [SQLite3::lastErrorCode](#sqlite3.lasterrorcode) — Devuelve el código de error de la última consulta SQL que ha fallado
- [SQLite3::lastErrorMsg](#sqlite3.lasterrormsg) — Devuelve el mensaje de error, en inglés, de la última consulta que ha fallado
- [SQLite3::lastInsertRowID](#sqlite3.lastinsertrowid) — Devuelve el identificador de la fila correspondiente a la última consulta de tipo INSERT
- [SQLite3::loadExtension](#sqlite3.loadextension) — Intenta cargar una extensión de la biblioteca SQLite
- [SQLite3::open](#sqlite3.open) — Abre una base de datos SQLite
- [SQLite3::openBlob](#sqlite3.openblob) — Abre un flujo de recurso para leer un BLOB
- [SQLite3::prepare](#sqlite3.prepare) — Prepara una consulta SQL para su ejecución
- [SQLite3::query](#sqlite3.query) — Ejecuta una consulta SQL
- [SQLite3::querySingle](#sqlite3.querysingle) — Ejecuta una consulta y devuelve un único resultado
- [SQLite3::setAuthorizer](#sqlite3.setauthorizer) — Configura una función de retrollamada para utilizar como autorizador para limitar lo que una sentencia puede hacer
- [SQLite3::version](#sqlite3.version) — Devuelve la versión de la biblioteca SQLite3

# La clase SQLite3Exception

(PHP 8 &gt;= 8.3.0)

## Introducción

    Representa una excepción específica de SQLite3.

## Sinopsis de la Clase

     class **SQLite3Exception**



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

# La clase [SQLite3Stmt](#class.sqlite3stmt)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    La clase que representa los comandos preparados
    para una base de datos SQLite3.

## Sinopsis de la Clase

     class **SQLite3Stmt**
     {

    /* Métodos */

private [\_\_construct](#sqlite3stmt.construct)([SQLite3](#class.sqlite3) $sqlite3, [string](#language.types.string) $query)

    public [bindParam](#sqlite3stmt.bindparam)([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) &amp;$var, [int](#language.types.integer) $type = **[SQLITE3_TEXT](#constant.sqlite3-text)**): [bool](#language.types.boolean)

public [bindValue](#sqlite3stmt.bindvalue)([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $type = **[SQLITE3_TEXT](#constant.sqlite3-text)**): [bool](#language.types.boolean)
public [clear](#sqlite3stmt.clear)(): [bool](#language.types.boolean)
public [close](#sqlite3stmt.close)(): [true](#language.types.singleton)
public [execute](#sqlite3stmt.execute)(): [SQLite3Result](#class.sqlite3result)|[false](#language.types.singleton)
public [getSQL](#sqlite3stmt.getsql)([bool](#language.types.boolean) $expand = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)
public [paramCount](#sqlite3stmt.paramcount)(): [int](#language.types.integer)
public [readOnly](#sqlite3stmt.readonly)(): [bool](#language.types.boolean)
public [reset](#sqlite3stmt.reset)(): [bool](#language.types.boolean)

}

# SQLite3Stmt::bindParam

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::bindParam — Asocia un parámetro a una variable de declaración

### Descripción

public **SQLite3Stmt::bindParam**([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) &amp;$var, [int](#language.types.integer) $type = **[SQLITE3_TEXT](#constant.sqlite3-text)**): [bool](#language.types.boolean)

Asocia un parámetro a una variable de declaración.

**Precaución**

    Antes de PHP 7.2.14 y 7.3.0, respectivamente,
    [SQLite3Stmt::reset()](#sqlite3stmt.reset) debe ser llamado después del primer
    llamado a [SQLite3Stmt::execute()](#sqlite3stmt.execute) si el valor asociado
    debe ser actualizado correctamente en los llamados siguientes a
    [SQLite3Stmt::execute()](#sqlite3stmt.execute).
    Si [SQLite3Stmt::reset()](#sqlite3stmt.reset) no es llamado, los valores
    asociados no serán modificados, incluso si el valor asignado a la variable pasada a
    **SQLite3Stmt::bindParam()** ha sido modificado, o
    **SQLite3Stmt::bindParam()** ha sido llamado nuevamente.

### Parámetros

     param


       Puede ser un [string](#language.types.string) (para parámetros nombrados) o un [int](#language.types.integer)
       (para parámetros posicionales) que identifica la variable de declaración a
       la cual el valor debe ser asociado.
       Si un parámetro nombrado no comienza con un carácter "dos puntos"
       (:) o un arroba (@), "dos puntos"
       (:) serán automáticamente prefijados.
       Los parámetros posicionales comienzan con 1.






     var


       El parámetro a asociar a la variable de declaración.






     type


       El tipo de datos del parámetro a asociar.



        -

          **[SQLITE3_INTEGER](#constant.sqlite3-integer)** : El valor es un entero firmado,
          almacenado en 1, 2, 3, 4, 6, o 8 bytes, dependiendo del tamaño del valor.





        -

          **[SQLITE3_FLOAT](#constant.sqlite3-float)** : El valor es un número de punto flotante,
          almacenado en 8 bytes.





        -

          **[SQLITE3_TEXT](#constant.sqlite3-text)** : El valor es texto, almacenado
          utilizando la codificación de la base de datos
          (UTF-8, UTF-16BE o UTF-16-LE).





        -

          **[SQLITE3_BLOB](#constant.sqlite3-blob)** : El valor es un BLOB, almacenado
          exactamente de la forma en que fue proporcionado.





        -

          **[SQLITE3_NULL](#constant.sqlite3-null)** : El valor es la valor NULL.








       A partir de PHP 7.0.7, si type es omitido, es
       automáticamente detectado desde el tipo de var :
       [bool](#language.types.boolean) y [int](#language.types.integer) son tratados como **[SQLITE3_INTEGER](#constant.sqlite3-integer)**,
       [float](#language.types.float) como **[SQLITE3_FLOAT](#constant.sqlite3-float)**,
       **[null](#constant.null)** como **[SQLITE3_NULL](#constant.sqlite3-null)**
       y todos los demás como **[SQLITE3_TEXT](#constant.sqlite3-text)**.
       Anteriormente, si type era omitido, era por omisión
       **[SQLITE3_TEXT](#constant.sqlite3-text)**.



      **Nota**:



        Si var es **[null](#constant.null)**, siempre fue tratado como
        **[SQLITE3_NULL](#constant.sqlite3-null)**, independientemente del
        type proporcionado.






### Valores devueltos

Retorna **[true](#constant.true)** si el parámetro es asociado a la variable de declaración, **[false](#constant.false)** si
ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       param ahora soporta la notación
       @param.



### Ejemplos

    **Ejemplo #1 Uso de SQLite3Stmt::bindParam()**



     Este ejemplo muestra cómo una declaración preparada única con un solo
     parámetro asociado puede ser utilizada para insertar múltiples filas con
     valores diferentes.

&lt;?php
$db = new SQLite3(':memory:');
$db-&gt;exec("CREATE TABLE foo (bar TEXT)");

$stmt = $db-&gt;prepare("INSERT INTO foo VALUES (:bar)");
$stmt-&gt;bindParam(':bar', $bar, SQLITE3_TEXT);

$bar = 'baz';
$stmt-&gt;execute();

$bar = 42;
$stmt-&gt;execute();

$res = $db-&gt;query("SELECT * FROM foo");
while (($row = $res-&gt;fetchArray(SQLITE3_ASSOC))) {
    var_dump($row);
}
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["bar"]=&gt;
string(3) "baz"
}
array(1) {
["bar"]=&gt;
string(2) "42"
}

### Ver también

- [SQLite3Stmt::bindValue()](#sqlite3stmt.bindvalue) - Asocia el valor de un parámetro a una variable de declaración

- [SQLite3::prepare()](#sqlite3.prepare) - Prepara una consulta SQL para su ejecución

# SQLite3Stmt::bindValue

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::bindValue — Asocia el valor de un parámetro a una variable de declaración

### Descripción

public **SQLite3Stmt::bindValue**([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $type = **[SQLITE3_TEXT](#constant.sqlite3-text)**): [bool](#language.types.boolean)

Asocia el valor de un parámetro a una variable de declaración.

**Precaución**

    Antes de PHP 7.2.14 y 7.3.0, respectivamente,
    una vez que la declaración ha sido ejecutada
    [SQLite3Stmt::reset()](#sqlite3stmt.reset)
    debe ser llamado para poder cambiar el valor de los parámetros asociados.

### Parámetros

     param


       Puede ser un [string](#language.types.string) (para parámetros nombrados) o un [int](#language.types.integer)
       (para parámetros posicionales) que identifica la variable de declaración
       a la cual el valor debe ser asociado.
       Si un parámetro nombrado no comienza con un carácter "dos puntos"
       (:) o un arroba (@), "dos puntos"
       (:) serán automáticamente prefijados.
       Los parámetros posicionales comienzan con 1.






     value


       El valor a asociar a la variable de declaración.






     type


       El tipo de datos del valor a asociar.



        -

          **[SQLITE3_INTEGER](#constant.sqlite3-integer)** : El valor es un entero firmado,
          almacenado en 1, 2, 3, 4, 6, o 8 bytes, según la magnitud del valor.





        -

          **[SQLITE3_FLOAT](#constant.sqlite3-float)** : El valor es un número de punto
          flotante, almacenado en 8 bytes.





        -

          **[SQLITE3_TEXT](#constant.sqlite3-text)** : El valor es texto, almacenado
          utilizando la codificación de la base de datos
          (UTF-8, UTF-16BE o UTF-16-LE).





        -

          **[SQLITE3_BLOB](#constant.sqlite3-blob)** : El valor es un BLOB, almacenado
          exactamente de la forma en que fue proporcionado.





        -

          **[SQLITE3_NULL](#constant.sqlite3-null)** : El valor es la valor NULL.








       A partir de PHP 7.0.7, si type es omitido, es
       automáticamente detectado desde el tipo de value :
       [bool](#language.types.boolean) y [int](#language.types.integer) son tratados como **[SQLITE3_INTEGER](#constant.sqlite3-integer)**,
       [float](#language.types.float) como **[SQLITE3_FLOAT](#constant.sqlite3-float)**,
       **[null](#constant.null)** como **[SQLITE3_NULL](#constant.sqlite3-null)**
       y todos los demás como **[SQLITE3_TEXT](#constant.sqlite3-text)**.
       Anteriormente, si type era omitido, era por omisión
       **[SQLITE3_TEXT](#constant.sqlite3-text)**.



      **Nota**:



        Si value es **[null](#constant.null)**, siempre fue tratado como
        **[SQLITE3_NULL](#constant.sqlite3-null)**, independientemente del
        type proporcionado.






### Valores devueltos

Retorna **[true](#constant.true)** si el valor fue asociado a la variable de declaración, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       param ahora soporta la notación
       @param.



### Ejemplos

    **Ejemplo #1 Ejemplo con SQLite3Stmt::bindValue()**

&lt;?php
$db = new SQLite3(':memory:');

$db-&gt;exec('CREATE TABLE foo (id INTEGER, bar STRING)');
$db-&gt;exec("INSERT INTO foo (id, bar) VALUES (1, 'Ceci est un test')");

$stmt = $db-&gt;prepare('SELECT bar FROM foo WHERE id=:id');
$stmt-&gt;bindValue(':id', 1, SQLITE3_INTEGER);

$result = $stmt-&gt;execute();
var_dump($result-&gt;fetchArray(SQLITE3_ASSOC));
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["bar"]=&gt;
string(16) "Ceci est un test"
}

### Ver también

- [SQLite3Stmt::bindParam()](#sqlite3stmt.bindparam) - Asocia un parámetro a una variable de declaración

- [SQLite3::prepare()](#sqlite3.prepare) - Prepara una consulta SQL para su ejecución

# SQLite3Stmt::clear

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::clear — Elimina todos los parámetros actualmente vinculados

### Descripción

public **SQLite3Stmt::clear**(): [bool](#language.types.boolean)

Elimina todos los parámetros actualmente vinculados (los define como **[null](#constant.null)**).

**Precaución**

    Este método debe ser utilizado con [SQLite3Stmt::reset()](#sqlite3stmt.reset).
    Si se utiliza solo, cualquier llamada a
    [SQLite3Stmt::bindValue()](#sqlite3stmt.bindvalue) o
    [SQLite3Stmt::bindParam()](#sqlite3stmt.bindparam) no tendrá efecto
    y todos los parámetros vinculados tendrán como valor **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si todos los parámetros actualmente vinculados han sido eliminados,
**[false](#constant.false)** si ocurre un error.

# SQLite3Stmt::close

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::close — Cierra una consulta preparada

### Descripción

public **SQLite3Stmt::close**(): [true](#language.types.singleton)

Cierra una consulta preparada.

**Nota**:

    Tenga en cuenta que todos los [SQLite3Result](#class.sqlite3result) que han sido
    recuperados al ejecutar esta instrucción serán invalidados cuando
    la instrucción sea cerrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se levanta una [Error](#class.error) si el método es llamado sobre un objeto no inicializado.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método levanta ahora una excepción [Error](#class.error) si el objeto no está correctamente inicializado. Anteriormente, retornaba **[false](#constant.false)**.



# SQLite3Stmt::\_\_construct

(No version information available, might only be in Git)

SQLite3Stmt::\_\_construct — Construye un objeto SQLite3Stmt

### Descripción

private **SQLite3Stmt::\_\_construct**([SQLite3](#class.sqlite3) $sqlite3, [string](#language.types.string) $query)

Las instancias de [SQLite3Stmt](#class.sqlite3stmt) son creadas por
[SQLite3::prepare()](#sqlite3.prepare).

### Parámetros

    sqlite3


      El objeto SQLite3 al que pertenece la consulta.






    query


      La consulta SQL a preparar.


# SQLite3Stmt::execute

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::execute — Ejecuta una consulta preparada

### Descripción

public **SQLite3Stmt::execute**(): [SQLite3Result](#class.sqlite3result)|[false](#language.types.singleton)

Ejecuta una consulta preparada y devuelve un objeto que representa el conjunto
de resultados.

**Precaución**

    Los objetos de conjunto de resultados recuperados mediante la llamada a este método sobre el
    mismo objeto de instrucción no son independientes, sino que comparten más bien la
    misma estructura subyacente. Por lo tanto, se recomienda llamar
    [SQLite3Result::finalize()](#sqlite3result.finalize), antes de llamar de nuevo
    **SQLite3Stmt::execute()** sobre el mismo objeto de instrucción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [SQLite3Result](#class.sqlite3result) si la consulta preparada se ha ejecutado con éxito,
o **[false](#constant.false)** si ocurre un error.

### Ver también

- [SQLite3::prepare()](#sqlite3.prepare) - Prepara una consulta SQL para su ejecución

- [SQLite3Stmt::bindValue()](#sqlite3stmt.bindvalue) - Asocia el valor de un parámetro a una variable de declaración

- [SQLite3Stmt::bindParam()](#sqlite3stmt.bindparam) - Asocia un parámetro a una variable de declaración

# SQLite3Stmt::getSQL

(PHP 7 &gt;= 7.4.0, PHP 8)

SQLite3Stmt::getSQL — Recupera el SQL de una declaración

### Descripción

public **SQLite3Stmt::getSQL**([bool](#language.types.boolean) $expand = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Recupera el SQL de una declaración preparada. Si expand
es **[false](#constant.false)**, se recupera el SQL sin modificar. Si expand
es **[true](#constant.true)**, todos los parámetros de la consulta son reemplazados con sus valores vinculados,
o con un NULL SQL, si no están aún vinculados.

### Parámetros

    expand


      Si se debe recuperar el código SQL extendido. Pasar **[true](#constant.true)** solo es soportado a partir de libsqlite 3.14.


### Valores devueltos

Devuelve el SQL de la declaración preparada, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si expand es **[true](#constant.true)**, pero la versión de libsqlite es menor que
3.14, se emite un error de nivel **[E_WARNING](#constant.e-warning)** o una [Exception](#class.exception),
de acuerdo con [SQLite3::enableExceptions()](#sqlite3.enableexceptions).

### Ejemplos

**Ejemplo #1 Inspeccionar el SQL extendido**

&lt;?php
$db = new SQLite3(':memory:');
$stmt = $db-&gt;prepare("SELECT :a, ?, :c");
$stmt-&gt;bindValue(':a', 'foo');
$answer = 42;
$stmt-&gt;bindParam(2, $answer);
var_dump($stmt-&gt;getSQL(true));
?&gt;

Resultado del ejemplo anterior es similar a:

string(24) "SELECT 'foo', '42', NULL"

# SQLite3Stmt::paramCount

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::paramCount — Devuelve el número de argumentos de una consulta preparada

### Descripción

public **SQLite3Stmt::paramCount**(): [int](#language.types.integer)

Devuelve el número de argumentos de una consulta preparada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de argumentos de una consulta preparada.

### Ver también

- [SQLite3::prepare()](#sqlite3.prepare) - Prepara una consulta SQL para su ejecución

# SQLite3Stmt::readOnly

(PHP 5 &gt;= 5.3.6, PHP 7, PHP 8)

SQLite3Stmt::readOnly — Determina si una declaración es de solo lectura

### Descripción

public **SQLite3Stmt::readOnly**(): [bool](#language.types.boolean)

Determina si una declaración es de solo lectura. Una declaración es
considerada de solo lectura si no realiza ningún cambio _directo_
al contenido del archivo de la base de datos. Notar que las funciones SQL definidas por
el usuario pueden _indirectamente_ cambiar la base de datos
como efecto secundario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la declaración es de solo lectura, **[false](#constant.false)** en caso contrario.

# SQLite3Stmt::reset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Stmt::reset — Reinicia una consulta preparada

### Descripción

public **SQLite3Stmt::reset**(): [bool](#language.types.boolean)

Reinicia una consulta preparada, de tal manera que se recupera su estado inicial,
antes de la ejecución. Todos los marcadores permanecerán intactos después de esta operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la consulta preparada ha sido correctamente reiniciada,
o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [SQLite3Stmt::bindParam](#sqlite3stmt.bindparam) — Asocia un parámetro a una variable de declaración
- [SQLite3Stmt::bindValue](#sqlite3stmt.bindvalue) — Asocia el valor de un parámetro a una variable de declaración
- [SQLite3Stmt::clear](#sqlite3stmt.clear) — Elimina todos los parámetros actualmente vinculados
- [SQLite3Stmt::close](#sqlite3stmt.close) — Cierra una consulta preparada
- [SQLite3Stmt::\_\_construct](#sqlite3stmt.construct) — Construye un objeto SQLite3Stmt
- [SQLite3Stmt::execute](#sqlite3stmt.execute) — Ejecuta una consulta preparada
- [SQLite3Stmt::getSQL](#sqlite3stmt.getsql) — Recupera el SQL de una declaración
- [SQLite3Stmt::paramCount](#sqlite3stmt.paramcount) — Devuelve el número de argumentos de una consulta preparada
- [SQLite3Stmt::readOnly](#sqlite3stmt.readonly) — Determina si una declaración es de solo lectura
- [SQLite3Stmt::reset](#sqlite3stmt.reset) — Reinicia una consulta preparada

# La clase [SQLite3Result](#class.sqlite3result)

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

## Introducción

    Una clase que representa los resultados de una base de
    datos SQLite 3.

## Sinopsis de la Clase

     class **SQLite3Result**
     {

    /* Métodos */

private [\_\_construct](#sqlite3result.construct)()

    public [columnName](#sqlite3result.columnname)([int](#language.types.integer) $column): [string](#language.types.string)|[false](#language.types.singleton)

public [columnType](#sqlite3result.columntype)([int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)
public [fetchArray](#sqlite3result.fetcharray)([int](#language.types.integer) $mode = **[SQLITE3_BOTH](#constant.sqlite3-both)**): [array](#language.types.array)|[false](#language.types.singleton)
public [finalize](#sqlite3result.finalize)(): [true](#language.types.singleton)
public [numColumns](#sqlite3result.numcolumns)(): [int](#language.types.integer)
public [reset](#sqlite3result.reset)(): [bool](#language.types.boolean)

}

# SQLite3Result::columnName

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::columnName — Devuelve el nombre de una columna

### Descripción

public **SQLite3Result::columnName**([int](#language.types.integer) $column): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre de la columna identificada por el argumento
column.
Cabe señalar que el nombre de la columna de resultado y el valor de la cláusula
AS para esta columna, si existe una cláusula
AS. Si no hay cláusula, el nombre de la columna
es no especificado y puede cambiar de una versión de libsqlite3 a otra.

### Parámetros

     column


       El número de la columna, comenzando desde 0.





### Valores devueltos

Devuelve el nombre de la columna identificada por el argumento
column, o **[false](#constant.false)** si la columna no existe.

# SQLite3Result::columnType

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::columnType — Devuelve el tipo de una columna

### Descripción

public **SQLite3Result::columnType**([int](#language.types.integer) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el tipo de la columna identificada por el argumento
column.

### Parámetros

     column


       El número de la columna, comenzando por 0.





### Valores devueltos

Devuelve el tipo de datos de la columna identificada por
column (uno de
**[SQLITE3_INTEGER](#constant.sqlite3-integer)**, **[SQLITE3_FLOAT](#constant.sqlite3-float)**,
**[SQLITE3_TEXT](#constant.sqlite3-text)**, **[SQLITE3_BLOB](#constant.sqlite3-blob)**, o
**[SQLITE3_NULL](#constant.sqlite3-null)**), o **[false](#constant.false)** si la columna no existe.

# SQLite3Result::\_\_construct

(No version information available, might only be in Git)

SQLite3Result::\_\_construct — Construye un SQLite3Result

### Descripción

private **SQLite3Result::\_\_construct**()

Las instancias de [SQLite3Result](#class.sqlite3result) son creadas por
[SQLite3::query()](#sqlite3.query) y [SQLite3Stmt::execute()](#sqlite3stmt.execute).

### Parámetros

Esta función no contiene ningún parámetro.

# SQLite3Result::fetchArray

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::fetchArray —
Recupera un conjunto de resultados en forma de array

### Descripción

public **SQLite3Result::fetchArray**([int](#language.types.integer) $mode = **[SQLITE3_BOTH](#constant.sqlite3-both)**): [array](#language.types.array)|[false](#language.types.singleton)

Recupera un conjunto de resultados en forma de array asociativo o
indexado numéricamente, o ambos. Por omisión, se obtienen ambos.

### Parámetros

     mode


       Controla la forma en que la siguiente línea debe ser devuelta a
       la función llamante. Este valor puede ser **[SQLITE3_ASSOC](#constant.sqlite3-assoc)**,
       **[SQLITE3_NUM](#constant.sqlite3-num)**, o **[SQLITE3_BOTH](#constant.sqlite3-both)**.



        -

          **[SQLITE3_ASSOC](#constant.sqlite3-assoc)** : Devuelve un array indexado por el
          nombre de la columna, tal como se devuelve en el conjunto de resultados correspondiente.





        -

          **[SQLITE3_NUM](#constant.sqlite3-num)** : Devuelve un array indexado por el
          número de la columna, tal como se devuelve en el conjunto de resultados, comenzando por la columna 0.





        -

          **[SQLITE3_BOTH](#constant.sqlite3-both)** : Devuelve un array indexado por
          el nombre y el número de la columna, tal como se devuelve por el conjunto de
          resultados, comenzando por la columna 0.









### Valores devueltos

Devuelve una línea del conjunto de resultados, en forma de array asociativo,
o en forma de array indexado, o ambos.
Devuelve **[false](#constant.false)** si no hay más líneas.

Los tipos de los valores del array devuelto son mapeados desde tipos
SQLite3 de la siguiente manera: los enteros son mapeados a [int](#language.types.integer) si
se ajustan al rango **[PHP_INT_MIN](#constant.php-int-min)**..
**[PHP_INT_MAX](#constant.php-int-max)**, y a [string](#language.types.string) en caso contrario. Los números
de punto flotante son mapeados a [float](#language.types.float), los valores null
son mapeados a [null](#language.types.null), y las cadenas y los objetos BLOB son
mapeados a [string](#language.types.string).

# SQLite3Result::finalize

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::finalize — Cierra un conjunto de resultados

### Descripción

public **SQLite3Result::finalize**(): [true](#language.types.singleton)

Cierra un conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Errores/Excepciones

Se produce una excepción [Error](#class.error) si el método se invoca sobre un objeto no inicializado.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Este método genera ahora una excepción [Error](#class.error) si el objeto no está correctamente inicializado. Anteriormente, devolvía **[false](#constant.false)**.



# SQLite3Result::numColumns

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::numColumns — Devuelve el número de columnas del conjunto de resultados

### Descripción

public **SQLite3Result::numColumns**(): [int](#language.types.integer)

Devuelve el número de columnas del conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de columnas del conjunto de resultados.

# SQLite3Result::reset

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SQLite3Result::reset — Reposiciona el puntero en la primera línea del conjunto de resultados

### Descripción

public **SQLite3Result::reset**(): [bool](#language.types.boolean)

Reposiciona el puntero en la primera línea del conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el conjunto de resultados ha sido reestablecido con éxito,
**[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [SQLite3Result::columnName](#sqlite3result.columnname) — Devuelve el nombre de una columna
- [SQLite3Result::columnType](#sqlite3result.columntype) — Devuelve el tipo de una columna
- [SQLite3Result::\_\_construct](#sqlite3result.construct) — Construye un SQLite3Result
- [SQLite3Result::fetchArray](#sqlite3result.fetcharray) — Recupera un conjunto de resultados en forma de array
- [SQLite3Result::finalize](#sqlite3result.finalize) — Cierra un conjunto de resultados
- [SQLite3Result::numColumns](#sqlite3result.numcolumns) — Devuelve el número de columnas del conjunto de resultados
- [SQLite3Result::reset](#sqlite3result.reset) — Reposiciona el puntero en la primera línea del conjunto de resultados

- [Introducción](#intro.sqlite3)
- [Instalación/Configuración](#sqlite3.setup)<li>[Requerimientos](#sqlite3.requirements)
- [Instalación](#sqlite3.installation)
- [Configuración en tiempo de ejecución](#sqlite3.configuration)
  </li>- [Constantes predefinidas](#sqlite3.constants)
- [SQLite3](#class.sqlite3) — La clase SQLite3<li>[SQLite3::backup](#sqlite3.backup) — Realiza una copia de seguridad de una base de datos en otra base de datos
- [SQLite3::busyTimeout](#sqlite3.busytimeout) — Define el gestor de espera de la conexión
- [SQLite3::changes](#sqlite3.changes) — Devuelve el número de líneas modificadas (o insertadas, borradas) por la
  última consulta SQL
- [SQLite3::close](#sqlite3.close) — Cierra la conexión con la base de datos
- [SQLite3::\_\_construct](#sqlite3.construct) — Instancia un objeto SQLite3 y abre la base de datos SQLite 3
- [SQLite3::createAggregate](#sqlite3.createaggregate) — Registra una función PHP para ser utilizada como función de agregación SQLite
- [SQLite3::createCollation](#sqlite3.createcollation) — Registra una función PHP para utilizarla como función de clasificación SQL
- [SQLite3::createFunction](#sqlite3.createfunction) — Registra una función PHP para su uso como función escalar SQL
- [SQLite3::enableExceptions](#sqlite3.enableexceptions) — Activa el lanzamiento de excepciones
- [SQLite3::escapeString](#sqlite3.escapestring) — Devuelve una cadena limpiada
- [SQLite3::exec](#sqlite3.exec) — Ejecuta una consulta en una base de datos
- [SQLite3::lastErrorCode](#sqlite3.lasterrorcode) — Devuelve el código de error de la última consulta SQL que ha fallado
- [SQLite3::lastErrorMsg](#sqlite3.lasterrormsg) — Devuelve el mensaje de error, en inglés, de la última consulta que ha fallado
- [SQLite3::lastInsertRowID](#sqlite3.lastinsertrowid) — Devuelve el identificador de la fila correspondiente a la última consulta de tipo INSERT
- [SQLite3::loadExtension](#sqlite3.loadextension) — Intenta cargar una extensión de la biblioteca SQLite
- [SQLite3::open](#sqlite3.open) — Abre una base de datos SQLite
- [SQLite3::openBlob](#sqlite3.openblob) — Abre un flujo de recurso para leer un BLOB
- [SQLite3::prepare](#sqlite3.prepare) — Prepara una consulta SQL para su ejecución
- [SQLite3::query](#sqlite3.query) — Ejecuta una consulta SQL
- [SQLite3::querySingle](#sqlite3.querysingle) — Ejecuta una consulta y devuelve un único resultado
- [SQLite3::setAuthorizer](#sqlite3.setauthorizer) — Configura una función de retrollamada para utilizar como autorizador para limitar lo que una sentencia puede hacer
- [SQLite3::version](#sqlite3.version) — Devuelve la versión de la biblioteca SQLite3
  </li>- [SQLite3Exception](#class.sqlite3exception) — La clase SQLite3Exception
- [SQLite3Stmt](#class.sqlite3stmt) — La clase SQLite3Stmt<li>[SQLite3Stmt::bindParam](#sqlite3stmt.bindparam) — Asocia un parámetro a una variable de declaración
- [SQLite3Stmt::bindValue](#sqlite3stmt.bindvalue) — Asocia el valor de un parámetro a una variable de declaración
- [SQLite3Stmt::clear](#sqlite3stmt.clear) — Elimina todos los parámetros actualmente vinculados
- [SQLite3Stmt::close](#sqlite3stmt.close) — Cierra una consulta preparada
- [SQLite3Stmt::\_\_construct](#sqlite3stmt.construct) — Construye un objeto SQLite3Stmt
- [SQLite3Stmt::execute](#sqlite3stmt.execute) — Ejecuta una consulta preparada
- [SQLite3Stmt::getSQL](#sqlite3stmt.getsql) — Recupera el SQL de una declaración
- [SQLite3Stmt::paramCount](#sqlite3stmt.paramcount) — Devuelve el número de argumentos de una consulta preparada
- [SQLite3Stmt::readOnly](#sqlite3stmt.readonly) — Determina si una declaración es de solo lectura
- [SQLite3Stmt::reset](#sqlite3stmt.reset) — Reinicia una consulta preparada
  </li>- [SQLite3Result](#class.sqlite3result) — La clase SQLite3Result<li>[SQLite3Result::columnName](#sqlite3result.columnname) — Devuelve el nombre de una columna
- [SQLite3Result::columnType](#sqlite3result.columntype) — Devuelve el tipo de una columna
- [SQLite3Result::\_\_construct](#sqlite3result.construct) — Construye un SQLite3Result
- [SQLite3Result::fetchArray](#sqlite3result.fetcharray) — Recupera un conjunto de resultados en forma de array
- [SQLite3Result::finalize](#sqlite3result.finalize) — Cierra un conjunto de resultados
- [SQLite3Result::numColumns](#sqlite3result.numcolumns) — Devuelve el número de columnas del conjunto de resultados
- [SQLite3Result::reset](#sqlite3result.reset) — Reposiciona el puntero en la primera línea del conjunto de resultados
  </li>
