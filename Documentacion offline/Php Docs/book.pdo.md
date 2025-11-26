# PHP Data Objects

# Introducción

La extensión PHP Data Objects (PDO) define
una excelente interfaz para acceder a una base de datos desde PHP.
Cada controlador de base de datos implementado en la interfaz PDO puede utilizar
funcionalidades específicas de cada una de las bases de datos
mediante extensiones de funciones. Tenga en cuenta que no se puede
ejecutar ninguna función de base de datos utilizando la extensión PDO
por sí misma; debe utilizarse un [controlador
PDO específico de la base de datos](#pdo.drivers) para acceder al servidor de base de datos.

PDO proporciona una interfaz de abstracción al _acceso a datos_,
lo que significa que se utilizan las mismas funciones para ejecutar consultas
o recuperar los datos independientemente de la base de datos utilizada. PDO no proporciona
_ninguna_ abstracción de _base de datos_
: no reescribe el SQL, ni emula funcionalidades ausentes. Debería utilizarse una interfaz de abstracción completa si se necesita esto.

PDO se proporciona con PHP.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#pdo.installation)
- [Configuración en tiempo de ejecución](#pdo.configuration)

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-pdo**

**Instalar PDO en sistemas Unix**

- PDO y el controlador [PDO_SQLITE](#ref.pdo-sqlite)
  están activados por defecto. Se debe activar
  el controlador PDO de la base de datos de su elección; consulte
  la documentación para los
  [controladores específicos de su base
  de datos](#pdo.drivers) para obtener más información.

    **Nota**:

    Tenga en cuenta que al compilar PDO como extensión compartida
    (_no recomendado_), entonces todos los controladores PDO
    _deben_ ser cargados _después_
    de cargar PDO.

- Al instalar PDO como módulo compartido, el archivo php.ini
  debe ser actualizado para cargar la extensión PDO automáticamente
  cuando PHP se inicie. Asimismo, se deben activar los controladores específicos de su base de datos; asegúrese de que estos controladores estén listados después de la línea extension=pdo, ya que PDO debe ser inicializado antes de cargar las extensiones específicas de las bases de datos. Si compila PDO y las extensiones relativas a las bases de datos de forma estática, puede omitir este paso.

extension=pdo

**Usuarios de Windows**

- PDO está activado por defecto.
  Seleccione los otros archivos DLL específicos de su base de datos
  y utilice la función [dl()](#function.dl) para cargarlos en tiempo de ejecución o actívelos en el archivo php.ini.
  Por ejemplo, esto carga el controlador
  [PDO_SQLITE](#ref.pdo-sqlite) pero
  deja el controlador [PDO_ODBC](#ref.pdo-odbc) comentado:

;extension=pdo_odbc
extension=pdo_sqlite

    Estas librerías DLL deben existir en el directorio del sistema
    [extension_dir](#ini.extension-dir).

**Nota**:

Tenga en cuenta que después de modificar su php.ini, debe reiniciar PHP para que las nuevas directivas de configuración tengan efecto.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración PDO**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [pdo.dsn.*](#ini.pdo.dsn)
       
      php.ini sólo
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    pdo.dsn.*
    [string](#language.types.string)



     Define un alias DSN. Véase [PDO::__construct()](#pdo.construct) para
     una explicación completa.

# Constantes predefinidas

## Tabla de contenidos

- [Modos de recuperación](#pdo.constants.fetch-modes)

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

## Modos de recuperación

Véase [constantes de cursor](#pdo.constants.cursors) para las
constantes de cursor PDO::FETCH*ORI*\*.

## Modos básicos de recuperación

      Modo de recuperación
      Resumen







       **[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default)**


       Valor especial para usar el modo de recuperación por omisión actual.





       **[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)**


       Array indexado solo por el nombre de la columna.





       **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)** (Default)


       Array indexado tanto por el número de columna como por el nombre.





       **[PDO::FETCH_NAMED](#pdo.constants.fetch-named)**


       Variante de **[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)** que conserva las
       columnas duplicadas.





       **[PDO::FETCH_NUM](#pdo.constants.fetch-num)**


       Array indexado solo por el número de columna.





       **[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)**


       Una sola columna.





       **[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair)**


       Pares clave-valor, indexados por la primera columna.





       **[PDO::FETCH_FUNC](#pdo.constants.fetch-func)**


       Una una función para crear el valor de retorno.
       (solamente con [PDOStatement::fetchAll()](#pdostatement.fetchall))





       **[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)**


       Objeto anónimo ([stdClass](#class.stdclass)).





       **[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**


       Un objeto de la clase especificada.



## Opciones de PDO::FETCH_CLASS

Estos modos se utilizan para implementar opciones al usar
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**.

      Modo de recuperación
      Resumen







       **[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype)**


       Usa la primera columna como nombre de la clase.





       **[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late)**


       Llama al constructor antes de establecer las propiedades.





       **[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize)**


       Usa datos serializados de PHP. Obsoleto a partir de PHP 8.1.0.



## Modos de resultado único

Los siguientes modos no pueden ser utilizados con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

      Modo de recuperación
      Resumen







       **[PDO::FETCH_BOUND](#pdo.constants.fetch-bound)**


       Asigna valores a las variables especificadas.





       **[PDO::FETCH_INTO](#pdo.constants.fetch-into)**


       Actualiza un objeto existente.





       **[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy)**


       Recuperación diferida mediante [PDORow](#class.pdorow) para acceso
       similar a arrays y objetos.



##

Flags de comportamiento especiales para [PDOStatement::fetchAll()](#pdostatement.fetchall)

Los siguientes modos especiales para resultados múltiples solo funcionan con
[PDOStatement::fetchAll()](#pdostatement.fetchall) y no funcionan con algunos otros
modos de recuperación. Consulta la documentación completa para más detalles.

      Modo de recuperación
      Resumen







       **[PDO::FETCH_GROUP](#pdo.constants.fetch-group)**


       Los resultados se agrupan por la primera columna.





       **[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique)**


       Los resultados se indexan (únicamente) por la primera columna.



## Manejo de nombres duplicados de columnas

Es posible que los resultados contengan varias columnas con el mismo nombre.
Por ejemplo, al combinar dos tablas que contienen una columna con el mismo
nombre.

Debido a que las estructuras de PHP, como los arrays y los objetos, no admiten varias claves
o propiedades con el mismo nombre, el array o el objeto devuelto contendrá
solo uno de los valores con el mismo nombre.

El valor que se devuelve para un nombre duplicado determinado debe considerarse
indefinido.

Para evitar este problema, asigne nombres explícitos a las columnas mediante un alias. Por ejemplo:

SELECT table1.created_at AS t1_created_at,
table2.created_at AS t2_created_at
FROM table1
JOIN table2 ON table1.table2id = table2.id

Véase también **[PDO::FETCH_NAMED](#pdo.constants.fetch-named)**,
**[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names)** y
**[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names)**.

## Estableciendo el modo de recuperación predeterminado

Es posible establecer el modo de recuperación predeterminado para todas las consultas usando
**[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode)** con
[PDO::\_\_construct()](#pdo.construct) o
[PDO::setAttribute()](#pdo.setattribute).

El modo de recuperación predeterminado para una sentencia específica se puede establecer usando
[PDOStatement::setFetchMode()](#pdostatement.setfetchmode).
Esto afecta a la reutilización como sentencia preparada y a la iteración (usando
[foreach](#control-structures.foreach)).

**Precaución**

    [PDOStatement::setAttribute()](#pdostatement.setattribute) no se puede usar para establecer el
    modo de recuperación predeterminado. Solo acepta atributos específicos del controlador y, de forma silenciosa,
    ignora los atributos que no reconoce.

## PDO::FETCH_DEFAULT ([int](#language.types.integer))

Disponible a partir de PHP 8.0.7.

Este es un valor especial que utiliza el modo de recuperación predeterminado actual para un
[PDOStatement](#class.pdostatement). Es especialmente útil como valor predeterminado
para los parámetros de método al extender
[PDOStatement](#class.pdostatement) para su uso con
**[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class)**.

Este valor no se puede usar con
**[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode)**.

## PDO::FETCH_ASSOC ([int](#language.types.integer))

**[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)** devuelve un array indexada únicamente por
nombre de columna.

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users");
$row = $stmt-&gt;fetch(\PDO::FETCH_ASSOC);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[userid] =&gt; 104
[name] =&gt; Chris
[country] =&gt; Ukraine
)

## PDO::FETCH_BOTH ([int](#language.types.integer))

Este es el modo de recuperación predeterminado.

**[PDO::FETCH_BOTH](#pdo.constants.fetch-both)** devuelve un array indexada tanto por número
de columna como por nombre. Esto significa que cada valor devuelto se duplica para cada
fila de resultados.

El número de columna comienza en 0 y se determina por el orden de las columnas de
la consulta, no (por ejemplo) por el orden en que se definen las columnas en la tabla.

**Nota**:

    No se recomienda utilizar el índice de columna numérico, ya que esto puede cambiar cuando
    se cambie la consulta, o cuando se cambie el esquema de la tabla al usar
    SELECT *.

**Nota**:

    Es posible que el número de entradas indexadas por nombre no coincida con el número de entradas indexadas
    por número en los casos en que varias columnas devueltas utilicen el mismo
    nombre.

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users");
$row = $stmt-&gt;fetch(\PDO::FETCH_BOTH);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[id] =&gt; 104,
[0] =&gt; 104,
[name] =&gt; Chris,
[1] =&gt; Chris,
[country] =&gt; Ukraine,
[2] =&gt; Ukraine
)

## PDO::FETCH_NAMED ([int](#language.types.integer))

**[PDO::FETCH_NAMED](#pdo.constants.fetch-named)** devuelve resultados en el mismo formato que
**[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)** excepto que, cuando varias columnas usan
el mismo nombre, todos los valores se devuelven como una lista.

Para obtener más información sobre el manejo de nombres de columnas duplicados y alternativas,
consulte la sección [manejo de
nombres duplicados](#pdo.fetch-modes.duplicate-names) anterior.

El orden en el que se devuelven los valores duplicados debe considerarse
indefinido. No hay forma de saber de dónde proviene cada valor.

&lt;?php
$stmt = $pdo-&gt;query(
    "SELECT users.*, referrer.name
     FROM users
     LEFT JOIN users AS referrer ON users.referred_by = referrer.userid
     WHERE userid = 109"
);
$row = $stmt-&gt;fetch(\PDO::FETCH_NUM);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[userid] =&gt; 109
[name] =&gt; Array
(
[0] =&gt; Toni
[1] =&gt; Chris
)
[country] =&gt; Germany
[referred_by] = 104
)

## PDO::FETCH_NUM ([int](#language.types.integer))

**[PDO::FETCH_NUM](#pdo.constants.fetch-num)** devuelve un array indexada únicamente por número
de columna. El número de columna comienza en 0 y se determina por el orden de las columnas de resultados en
la consulta, no (por ejemplo) por el orden en que se definen las columnas en la tabla.

**Nota**:

    No se recomienda utilizar el índice de columna numérico, ya que esto puede cambiar cuando
    se cambie la consulta, o cuando se cambie el esquema de la tabla al usar
    SELECT *.

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users");
$row = $stmt-&gt;fetch(\PDO::FETCH_NUM);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[0] =&gt; 104
[1] =&gt; Chris
[2] =&gt; Ukraine
)

## PDO::FETCH_COLUMN ([int](#language.types.integer))

**[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)** devuelve los valores de una sola columna.
Utilice el segundo argumento de [PDOStatement::setFetchMode()](#pdostatement.setfetchmode)
o [PDOStatement::fetchAll()](#pdostatement.fetchall) para especificar la columna que
se devuelve.

Si la columna especificada no existe, se lanzará un
[ValueError](#class.valueerror).

&lt;?php
$stmt = $pdo-&gt;query("SELECT name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_COLUMN);
print_r($row);

$stmt = $pdo-&gt;query("SELECT name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_COLUMN, 1);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[0] =&gt; Chris
[1] =&gt; Jamie
[2] =&gt; Robin
)

Array
(
[0] =&gt; Ukraine
[1] =&gt; England
[2] =&gt; Germany
)

## PDO::FETCH_KEY_PAIR ([int](#language.types.integer))

**[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair)** devuelve pares de valores, indexados por
la primera columna. Los resultados deben contener solo dos columnas. Este modo de recuperación
solo tiene sentido con [PDOStatement::fetchAll()](#pdostatement.fetchall).

**Nota**:

    Si la primera columna no es única, se perderán valores. Qué valor(es) se
    perderán debe considerarse indefinido.

&lt;?php
$stmt = $pdo-&gt;query("SELECT name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_KEY_PAIR);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[Chris] =&gt; Ukraine
[Jamie] =&gt; England
[Robin] =&gt; Germany
)

## PDO::FETCH_FUNC ([int](#language.types.integer))

Especifique una función para crear el valor devuelto. Este modo solo se puede usar
con [PDOStatement::fetchAll()](#pdostatement.fetchall).

La función recibe los valores como parámetros.
No es posible recuperar el nombre de la columna a la que estaba asociado un valor dado.
Es crucial asegurarse de que el orden de las columnas en la consulta coincida con el
orden de los parámetros de la función.

**Nota**:

    Los efectos de **[PDO::FETCH_GROUP](#pdo.constants.fetch-group)** y
    **[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique)** se aplican a los resultados antes de
    que se llame a la función.

&lt;?php
function valueCreator($col1, $col2, $col3)
{
    return [
        'col1' =&gt; $col1,
        'col2' =&gt; strtoupper($col2),
'col3' =&gt; $col3,
'customKey' =&gt; 'customValue',
];
}

$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_FUNC, valueCreator(...));
print_r($row);

El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[col1] =&gt; 104
[col2] =&gt; SAM
[col3] =&gt; Ukraine
[customKey] =&gt; customValue
)

    [1] =&gt; Array
        (
            [col1] =&gt; 105
            [col2] =&gt; JAMIE
            [col3] =&gt; England
            [customKey] =&gt; customValue
        )

    [2] =&gt; Array
        (
            [col1] =&gt; 107
            [col2] =&gt; ROBIN
            [col3] =&gt; Germany
            [customKey] =&gt; customValue
        )

)

## PDO::FETCH_OBJ ([int](#language.types.integer))

**[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)** devuelve un objeto
[stdClass](#class.stdclass).

Véase también [PDOStatement::fetchObject()](#pdostatement.fetchobject) y
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**.

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users");
$row = $stmt-&gt;fetch(\PDO::FETCH_OBJ);
print_r($row);

El ejemplo anterior mostrará:

stdClass Object
(
[userid] =&gt; 104
[name] =&gt; Chris
[country] =&gt; Ukraine
)

## PDO::FETCH_CLASS ([int](#language.types.integer))

Devuelve un objeto de una clase específica. Para conocer comportamientos adicionales, consulte las
[opciones flags](#pdo.fetch-modes.class-flags).

Si una propiedad no existe con el nombre de una columna devuelta, se
declarará dinámicamente. Este comportamiento está obsoleto y provocará un error
a partir de PHP 9.0.

Véase también [PDOStatement::fetchObject()](#pdostatement.fetchobject).

&lt;?php
class TestEntity
{
public $userid;

    public $name;

    public $country;

    public $referred_by_userid;

    public function __construct()
    {
        print "Constructor called with ". count(func_get_args()) ." args\n";
        print "Properties set when constructor called? "
            . (isset($this-&gt;name) ? 'Yes' : 'No') . "\n";
    }

}

$stmt = $db-&gt;query(
    "SELECT userid, name, country, referred_by_userid FROM users"
);
$stmt-&gt;setFetchMode(PDO::FETCH_CLASS, TestEntity::class);
$result = $stmt-&gt;fetch();
var_dump($result);

Resultado del ejemplo anterior es similar a:

Constructor called with 0 args
Properties set when constructor called? Yes
object(TestEntity)#3 (4) {
["userid"]=&gt;
int(104)
["name"]=&gt;
string(5) "Chris"
["country"]=&gt;
string(7) "Ukraine"
["referred_by_userid"]=&gt;
NULL
}

## PDO::FETCH_CLASSTYPE ([int](#language.types.integer))

Este modo de recuperación solo se puede usar combinado con
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)** (y
[sus otras opciones](#pdo.fetch-modes.class-flags)).

Cuando se utiliza este modo de recuperación, PDO utilizará la primera columna devuelta como
nombre de la clase que se devolverá.

Si no se encuentra la clase especificada, se devolverá un objeto
[stdClass](#class.stdclass), sin advertencia ni error.

&lt;?php
class TestEntity
{
public $userid;

    public $name;

    public $country;

    public $referred_by_userid;

    public function __construct()
    {
        print "Constructor called with ". count(func_get_args()) ." args\n";
        print "Properties set when constructor called? "
            . (isset($this-&gt;name) ? 'Yes' : 'No') . "\n";
    }

}

$stmt = $db-&gt;query(
    "SELECT 'TestEntity', userid, name, country, referred_by_userid FROM users"
);
$stmt-&gt;setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE);
$result = $stmt-&gt;fetch();
var_dump($result);

Resultado del ejemplo anterior es similar a:

Constructor called with 0 args
Properties set when constructor called? Yes
object(TestEntity)#3 (4) {
["userid"]=&gt;
int(104)
["name"]=&gt;
string(5) "Chris"
["country"]=&gt;
string(7) "Ukraine"
["referred_by_userid"]=&gt;
NULL
}

## PDO::FETCH_PROPS_LATE ([int](#language.types.integer))

Este modo de recuperación solo se puede usar combinado con
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)** (y
[sus otras opciones](#pdo.fetch-modes.class-flags)).

Cuando se utiliza este modo de recuperación, se llamará al constructor antes de
que se establezcan las propiedades.

&lt;?php
class TestEntity
{
public $userid;

    public $name;

    public $country;

    public $referred_by_userid;

    public function __construct()
    {
        print "Constructor called with ". count(func_get_args()) ." args\n";
        print "Properties set when constructor called? "
            . (isset($this-&gt;name) ? 'Yes' : 'No') . "\n";
    }

}

$stmt = $db-&gt;query(
    "SELECT userid, name, country, referred_by_userid FROM users"
);
$stmt-&gt;setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, TestEntity::class);
$result = $stmt-&gt;fetch();
var_dump($result);

Resultado del ejemplo anterior es similar a:

Constructor called with 0 args
Properties set when constructor called? No
object(TestEntity)#3 (4) {
["userid"]=&gt;
int(104)
["name"]=&gt;
string(5) "Chris"
["country"]=&gt;
string(7) "Ukraine"
["referred_by_userid"]=&gt;
NULL
}

## PDO::FETCH_SERIALIZE ([int](#language.types.integer))

**Advertencia**Esta característica está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta característica
está altamente desaconsejado.

Este modo de recuperación solo se puede usar combinado con
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)** (y
[sus otras opciones](#pdo.fetch-modes.class-flags)).

Cuando se utiliza este modo de recuperación, la clase especificada debe ser
[Serializable](#class.serializable).

**Precaución**

    Esta función no admite un string que contenga un objeto serializado completo
    (con [serialize()](#function.serialize)).

**Precaución**

    Este modo de recuperación no llama al constructor.

&lt;?php
class TestEntity implements Serializable
{
public $userid;

    public $name;

    public $country;

    public $referred_by_userid;

    public function __construct()
    {
        print "Constructor llamado con " . count(func_get_args()) . " argumentos\n";
        print "¿Propiedades establecidas cuando se llama al constructor? "
            . (isset($this-&gt;name) ? 'Sí' : 'No') . "\n";
    }

    public function serialize()
    {
        return join(
            "|",
            [$this-&gt;userid, $this-&gt;name, $this-&gt;country, $this-&gt;referred_by_userid]
        );
    }

    public function unserialize(string $data)
    {
        $parts = explode("|", $data);
        $this-&gt;userid = (int) $parts[0];
        $this-&gt;name = $parts[1];
        $this-&gt;country = $parts[2];

        $refId = $parts[3];
        $this-&gt;referred_by_userid = ($refId === "" ? null : (int) $refId);
    }

}

print "Establecer registro (constructor llamado manualmente):\n";
$db-&gt;exec(
"CREATE TABLE serialize (
sdata TEXT
)"
);

$origObj = new TestEntity();
$origObj-&gt;userid = 200;
$origObj-&gt;name = 'Seri';
$origObj-&gt;country = 'Syria';
$origObj-&gt;referred_by_userid = null;

$insert = $db-&gt;prepare("INSERT INTO serialize (sdata) VALUES (:sdata)");
$insert-&gt;execute(['sdata' =&gt; $origObj-&gt;serialize()]);

print "\nObtener resultados:\n";
$query = "SELECT sdata FROM serialize";
$stmt = $db-&gt;query($query);
// NOTA: El constructor nunca se llama!
$stmt-&gt;setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_SERIALIZE, TestEntity::class);
$result = $stmt-&gt;fetch();
var_dump($result);

Resultado del ejemplo anterior es similar a:

Deprecated: TestEntity implements the Serializable interface, which is deprecated. Implement **serialize() and **unserialize() instead (or in addition, if support for old PHP versions is necessary) in Standard input code on line 2
Establecer registro (constructor llamado manualmente):
Constructor llamado con 0 argumentos
¿Propiedades establecidas cuando se llama al constructor? No

Obtener resultados:
Deprecated: PDOStatement::setFetchMode(): The PDO::FETCH_SERIALIZE mode is deprecated in Standard input code on line 58

Deprecated: PDOStatement::fetch(): The PDO::FETCH_SERIALIZE mode is deprecated in Standard input code on line 59
object(TestEntity)#5 (4) {
["userid"]=&gt;
int(200)
["name"]=&gt;
string(4) "Seri"
["country"]=&gt;
string(5) "Syria"
["referred_by_userid"]=&gt;
NULL
}

## PDO::FETCH_BOUND ([int](#language.types.integer))

Este modo de recuperación no se puede utilizar con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

Este modo de recuperación no devuelve directamente un resultado, sino que asigna valores a
las variables especificadas con [PDOStatement::bindColumn()](#pdostatement.bindcolumn). El
método de recuperación llamado devuelve **[true](#constant.true)**.

**Nota**:

    Cuando se utilizan sentencias preparadas, para que funcionen correctamente, las variables deben enlazarse
    después de que se ejecute la consulta.

&lt;?php
$query = "SELECT users.userid, users.name, users.country, referrer.name
    FROM users
    LEFT JOIN users AS referrer ON users.referred_by_userid = referrer.userid";
$stmt = $db-&gt;prepare($query);
$stmt-&gt;execute();

$stmt-&gt;bindColumn('userid', $userId);
$stmt-&gt;bindColumn('name', $name);
$stmt-&gt;bindColumn('country', $country);
// Se utiliza la posición de la columna para resolver nombres de columna duplicados.
// Para evitar que esto falle si se modifica la consulta, se recomienda usar un alias SQL.
// Por ejemplo: referrer.name AS referrer_name
$stmt-&gt;bindColumn(4, $referrerName);

while ($stmt-&gt;fetch(\PDO::FETCH_BOUND)) {
    print join("\t", [$userId, $name, $country, ($referrerName ?? 'NULL')]) . "\n";
}

El ejemplo anterior mostrará:

104 Chris Ukraine NULL
105 Jamie England NULL
107 Robin Germany Chris
108 Sean Ukraine NULL
109 Toni Germany NULL
110 Toni Germany NULL

## PDO::FETCH_INTO ([int](#language.types.integer))

Este modo de recuperación no se puede utilizar con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

Este modo de recuperación actualiza las propiedades del objeto especificado. El objeto se
devuelve si la operación se realiza correctamente.

Si una propiedad no existe con el nombre de una columna devuelta, se
declarará dinámicamente. Este comportamiento está obsoleto y provocará un error
a partir de PHP 9.0.

Las propiedades deben ser public y no pueden ser
readonly.

**Precaución**

    No hay forma de cambiar el objeto que se va a actualizar sin usar
    [PDOStatement::setFetchMode()](#pdostatement.setfetchmode) entre la recuperación de cada
    registro.

&lt;?php
class TestEntity
{
public $userid;

    public $name;

    public $country;

    public $referred_by_userid;

}

$obj = new TestEntity();
$stmt-&gt;setFetchMode(\PDO::FETCH_INTO, $obj);

$stmt = $db-&gt;query("SELECT userid, name, country, referred_by_userid FROM users");
$result = $stmt-&gt;fetch();
var_dump($result);

Resultado del ejemplo anterior es similar a:

object(TestEntity)#3 (4) {
["userid"]=&gt;
int(104)
["name"]=&gt;
string(5) "Chris"
["country"]=&gt;
string(7) "Ukraine"
["referred_by_userid"]=&gt;
NULL
}

## PDO::FETCH_LAZY ([int](#language.types.integer))

Este modo de recuperación no se puede utilizar con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

Este modo de obtención recuperación un objeto [PDORow](#class.pdorow) que proporciona acceso
a los valores tanto como arrays como objetos (es decir, combina el comportamiento de
**[PDO::FETCH_BOTH](#pdo.constants.fetch-both)** y
**[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)**), recuperados de forma diferida.

Esto permite un acceso eficiente en memoria (en el lado de PHP) a los resultados sin almacenar
en búfer en el servidor de la base de datos. El uso o no de almacenamiento en búfer del lado del cliente por parte
de PDO depende del controlador específico de la base de datos que se utilice (y de su configuración).

**Precaución**

    [PDORow](#class.pdorow) devolverá NULL sin
    mostrar ningún error ni advertencia al acceder a propiedades o claves no definidas.
    Esto puede dificultar la detección y depuración de errores como erratas o consultas que
    no devuelven los datos esperados.

**Precaución**

    El objeto [PDORow](#class.pdorow) devuelto se actualiza cada vez que
    se recupera un resultado.

&lt;?php
$stmt = $db-&gt;query("SELECT userid, name, country, referred_by_userid FROM users");
$result = $stmt-&gt;fetch(\PDO::FETCH_LAZY);

print "ID: ". $result[0] ."\n";
print "Nombre: {$result-&gt;name}\n";
print "País: " . $result['country'] ."\n";
// Devuelve NULL. No se genera ninguna advertencia ni error.
print "No existe: " . var_export($result-&gt;does_not_exist, true) . "\n";

$differentResult = $stmt-&gt;fetch(\PDO::FETCH_LAZY);
// El PDOrow recuperado previamente ahora apunta al resultado recién recuperado.
print "ID: ". $result[0] ."\n";

El ejemplo anterior mostrará:

ID: 104
Nombre: Chris
País: Ukraine
No existe: NULL
ID: 105

## PDO::FETCH_GROUP ([int](#language.types.integer))

**[PDO::FETCH_GROUP](#pdo.constants.fetch-group)** devuelve listas de arrays asociativos,
indexados por una columna (no única). Este modo de obtención solo funciona con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

Cuando se combina con **[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique)**, ambos modos
utilizarán la misma columna, lo que hace que la combinación de estos modos sea inútil.

Esta recuperación debe combinarse con una de
**[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)**, **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)**,
**[PDO::FETCH_NAMED](#pdo.constants.fetch-named)**, **[PDO::FETCH_NUM](#pdo.constants.fetch-num)**,
**[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)** o
**[PDO::FETCH_FUNC](#pdo.constants.fetch-func)**.

Si no se proporciona ningún modo de recuperación de la lista anterior, se utilizará
el modo de recuperación predeterminado actual para [PDOStatement](#class.pdostatement).

&lt;?php
$stmt = $pdo-&gt;query("SELECT country, userid, name FROM users");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[Ukraine] =&gt; Array
(
[0] =&gt; Array
(
[userid] =&gt; 104
[name] =&gt; Chris
)

            [1] =&gt; Array
                (
                    [userid] =&gt; 108
                    [name] =&gt; Sean
                )

        )
    [England] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [userid] =&gt; 105
                    [name] =&gt; Jamie
                )

        )

    [Germany] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [userid] =&gt; 107
                    [name] =&gt; Robin
                )

            [1] =&gt; Array
                (
                    [userid] =&gt; 109
                    [name] =&gt; Toni
                )
        )

)

En el ejemplo anterior, cabe señalar que la primera columna se omite del
array en cada fila y solo está disponible como clave. Se puede incluir
repitiendo la columna, como en el siguiente ejemplo:

&lt;?php
$stmt = $pdo-&gt;query("SELECT country, userid, name, country FROM users");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[Ukraine] =&gt; Array
(
[0] =&gt; Array
(
[userid] =&gt; 104
[name] =&gt; Chris
[country] =&gt; Ukraine
)

            [1] =&gt; Array
                (
                    [userid] =&gt; 108
                    [name] =&gt; Sean
                    [country] =&gt; Ukraine
                )

        )
    [England] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [userid] =&gt; 105
                    [name] =&gt; Jamie
                    [country] =&gt; England
                )

        )

    [Germany] =&gt; Array
        (
            [0] =&gt; Array
                (
                    [userid] =&gt; 107
                    [name] =&gt; Robin
                    [country] =&gt; Germany
                )

            [1] =&gt; Array
                (
                    [userid] =&gt; 109
                    [name] =&gt; Toni
                    [country] =&gt; Germany
                )
        )

)

## PDO::FETCH_UNIQUE ([int](#language.types.integer))

**[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique)** utiliza la primera columna para indexar los registros,
devolviendo un registro por cada valor de índice. Este modo de recuperación solo funciona con
[PDOStatement::fetchAll()](#pdostatement.fetchall).

Cuando se combina con **[PDO::FETCH_GROUP](#pdo.constants.fetch-group)**, ambos modos utilizarán
la misma columna, lo que hace que la combinación de estos modos sea inútil.

Esta recuperación debe combinarse con uno de
**[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)**, **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)**,
**[PDO::FETCH_NAMED](#pdo.constants.fetch-named)**, **[PDO::FETCH_NUM](#pdo.constants.fetch-num)**,
**[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)** o
**[PDO::FETCH_FUNC](#pdo.constants.fetch-func)**.

Si no se proporciona ningún modo de recuperación de la lista anterior, se utilizará
el modo de recuperación predeterminado actual para [PDOStatement](#class.pdostatement).

Cuando se utiliza con una columna que se sabe que es única (como el ID del registro), este
modo proporciona la capacidad de devolver rápidamente resultados indexados por ese valor.

**Nota**:

    Si la primera columna no es única, se perderán valores. Qué valor(es) se
    perderán se considera indefinido.

**Precaución**

    Siempre que sea posible, se recomienda filtrar los registros mediante SQL. La base de datos
    utilizará índices para optimizar este proceso y devolver únicamente los registros necesarios.
    Seleccionar más registros de los necesarios puede aumentar significativamente
    el uso de memoria y el tiempo de consulta para conjuntos de resultados grandes.

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_UNIQUE | \PDO::FETCH_ASSOC);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[104] =&gt; Array
(
[name] =&gt; Chris
[country] =&gt; Ukraine
)

    [105] =&gt; Array
        (
            [name] =&gt; Jamie
            [country] =&gt; England
        )

    [107] =&gt; Array
        (
            [name] =&gt; Robin
            [country] =&gt; Germany
        )

)

En el ejemplo anterior, cabe señalar que la primera columna se omite del
array en cada fila y solo está disponible como clave. Se puede incluir
repitiendo la columna, como en el siguiente ejemplo:

&lt;?php
$stmt = $pdo-&gt;query("SELECT userid, userid, name, country FROM users LIMIT 3");
$row = $stmt-&gt;fetchAll(\PDO::FETCH_UNIQUE | \PDO::FETCH_ASSOC);
print_r($row);

El ejemplo anterior mostrará:

Array
(
[104] =&gt; Array
(
[userid] =&gt; 104
[name] =&gt; Chris
[country] =&gt; Ukraine
)

    [105] =&gt; Array
        (
            [userid] =&gt; 105
            [name] =&gt; Jamie
            [country] =&gt; England
        )

    [107] =&gt; Array
        (
            [userid] =&gt; 107
            [name] =&gt; Robin
            [country] =&gt; Germany
        )

)

## Cursores

Véase también **[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name)**.

     **[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next)**
     ([int](#language.types.integer))



      Recupera la próxima línea de un conjunto de resultados. Válido solo para los cursores desplazables.





     **[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior)**
     ([int](#language.types.integer))



      Recupera la línea anterior de un conjunto de resultados. Válido solo para los
      cursores desplazables.





     **[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first)**
     ([int](#language.types.integer))



      Recupera la primera línea de un conjunto de resultados. Válido solo para los
      cursores desplazables.





     **[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last)**
     ([int](#language.types.integer))



      Recupera la última línea de un conjunto de resultados. Válido solo para los
      cursores desplazables.





     **[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs)**
     ([int](#language.types.integer))



      Recupera la línea solicitada por un número de línea de un conjunto de resultados.
      Válido solo para los cursores desplazables.





     **[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel)**
     ([int](#language.types.integer))



      Recupera la línea solicitada por una posición relativa a la posición actual
      del cursor de un conjunto de resultados. Válido solo para los cursores desplazables.





     **[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly)**
     ([int](#language.types.integer))



      Crea un objeto [PDOStatement](#class.pdostatement) con un cursor solo de avance. Es la
      opción por defecto para el cursor, ya que es el patrón de acceso a datos más rápido y
      común en PHP.





     **[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll)**
     ([int](#language.types.integer))



      Crea un objeto [PDOStatement](#class.pdostatement) con un cursor desplazable.
      Pasar las constantes **[PDO::FETCH_ORI_*](#pdo.constants.fetch-ori-next)**
      para controlar las líneas recuperadas del conjunto de resultados.


## Otras Constantes

     **[PDO::PARAM_BOOL](#pdo.constants.param-bool)**
     ([int](#language.types.integer))



      Representa el tipo de datos booleano.





     **[PDO::PARAM_NULL](#pdo.constants.param-null)**
     ([int](#language.types.integer))



      Representa el tipo de datos NULL SQL.





     **[PDO::PARAM_INT](#pdo.constants.param-int)**
     ([int](#language.types.integer))



      Representa el tipo de datos INTEGER SQL.





     **[PDO::PARAM_STR](#pdo.constants.param-str)**
     ([int](#language.types.integer))



      Representa los tipos de datos CHAR, VARCHAR o los otros tipos de datos
      en forma de string SQL.





     **[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl)**
     ([int](#language.types.integer))



      Indicador para designar un string que utiliza el juego de caracteres nacional.


      Disponible a partir de PHP 7.2.0





     **[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char)**
     ([int](#language.types.integer))



      Indicador para designar un string que utiliza el juego de caracteres normal.


      Disponible a partir de PHP 7.2.0





     **[PDO::PARAM_LOB](#pdo.constants.param-lob)**
     ([int](#language.types.integer))



      Representa el tipo de datos "objeto grande" SQL.





     **[PDO::PARAM_STMT](#pdo.constants.param-stmt)**
     ([int](#language.types.integer))



      Representa un tipo de conjunto de resultados. Actualmente no es soportado
      por ningún controlador.





     **[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output)**
     ([int](#language.types.integer))



      Especifica que el argumento es un argumento INOUT para un
      procedimiento almacenado. Esta constante debe combinarse con el operador OR a nivel de bits con
      una de las constantes **[PDO::PARAM_*](#pdo.constants.param-bool)**.





     **[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit)**
     ([int](#language.types.integer))



      Si el valor es **[false](#constant.false)**, PDO intenta desactivar la validación automática
      cuando la conexión comienza una transacción.





     **[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch)**
     ([int](#language.types.integer))



      Definir el tamaño de precarga permite equilibrar la velocidad con el uso de memoria
      de una aplicación. No todas las combinaciones bases de datos / controladores soportan
      la configuración del tamaño de precarga. Un mayor tamaño de precarga resulta en un
      mayor rendimiento a costa de un mayor uso de memoria.





     **[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout)**
     ([int](#language.types.integer))



      Define el valor de espera en segundos para las comunicaciones
      con la base de datos.





     **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)**
     ([int](#language.types.integer))



      Ver la sección sobre los [errores
      y la gestión de errores](#pdo.error-handling) para más información sobre este atributo.





     **[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version)**
     ([int](#language.types.integer))



      Atributo de solo lectura; devuelve información sobre la versión de
      la base de datos a la que PDO está conectado.





     **[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version)**
     ([int](#language.types.integer))



      Atributo de solo lectura; devuelve información sobre la versión
      de la biblioteca cliente utilizada por PDO.





     **[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info)**
     ([int](#language.types.integer))



      Atributo de solo lectura; devuelve algunas meta-informaciones
      sobre el servidor de base de datos al que PDO está conectado.





     **[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status)**
     ([int](#language.types.integer))









     **[PDO::ATTR_CASE](#pdo.constants.attr-case)**
     ([int](#language.types.integer))



      Fuerza los nombres de columna a un formato específico especificado por las
      constantes
      **[PDO::CASE_*](#pdo.constants.case-natural)**.





     **[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name)**
     ([int](#language.types.integer))



      Recupera o define el nombre a utilizar para un cursor. Muy útil al
      utilizar cursores desplazables y actualizaciones posicionadas.





     **[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor)**
     ([int](#language.types.integer))



      Selecciona el tipo de cursor. PDO actualmente soporta
      **[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly)** o
      **[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll)**.
      A menos que se necesiten cursores desplazables, se debe usar el
      modo de cursor **[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly)**.






     **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)**
     ([int](#language.types.integer))



      Devuelve el nombre del controlador.

     **Ejemplo #1 Uso de [PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)**




&lt;?php
if ($db-&gt;getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
echo "Uso de mysql; hacer algo específico de mysql aquí\n";
}
?&gt;

     **[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls)**
     ([int](#language.types.integer))



      Convierte las cadenas vacías en valores NULL SQL en los datos recuperados.





     **[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent)**
     ([int](#language.types.integer))



      Solicita una conexión persistente, en lugar de crear una nueva conexión.
      Ver las [conexiones y el gestor de conexión](#pdo.connections)
      para más información sobre este atributo.





     **[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class)**
     ([int](#language.types.integer))



      Define el nombre de la clase bajo la cual los datos son devueltos.





     **[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names)**
     ([int](#language.types.integer))



      Añade el contenido del catálogo de nombres en cada nombre de columna devuelto en el
      conjunto de resultados. El catálogo de nombres y los nombres de columnas están separados por
      un punto (.). El soporte de este atributo es a nivel de controlador; puede no
      estar disponible por el controlador en uso.





     **[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names)**
     ([int](#language.types.integer))



      Añade el contenido de la tabla de nombres en cada nombre de columna devuelto en el
      conjunto de resultados. La tabla de nombres y los nombres de columnas están separados por
      un punto (.). El soporte de este atributo es a nivel de controlador; puede no
      estar disponible por el controlador en uso.





     **[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches)**
     ([int](#language.types.integer))



      Fuerza todas las valores recuperados (excepto **[null](#constant.null)**) a ser tratados como strings.
      Los valores **[null](#constant.null)** permanecen sin cambios, a menos que **[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls)**
      esté definido en **[PDO::NULL_TO_STRING](#pdo.constants.null-to-string)**.





     **[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len)**
     ([int](#language.types.integer))



      Define la longitud máxima del nombre de columna.





     **[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode)**
     ([int](#language.types.integer))









     **[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares)**
     ([int](#language.types.integer))









     **[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param)**
     ([int](#language.types.integer))



      Define el tipo de argumento de string por defecto, esto puede ser **[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl)**
      o **[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char)**.


      Disponible a partir de PHP 7.2.0





     **[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent)**
     ([int](#language.types.integer))



      No envía error ni excepción si ocurre un error.
      El desarrollador debe verificar explícitamente los errores.
      Antes de PHP 8.0.0, este era el modo predeterminado.
      Ver los [errores y la gestión de errores](#pdo.error-handling)
      para más información sobre este atributo.





     **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**
     ([int](#language.types.integer))



      Envía un error de nivel **[E_WARNING](#constant.e-warning)** si ocurre un error.
      Ver los [errores y la gestión de errores](#pdo.error-handling)
      para más información sobre este atributo.





     **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**
     ([int](#language.types.integer))



      Lanza una excepción [PDOException](#class.pdoexception) si ocurre un error.
      Ver los [errores y la gestión de errores](#pdo.error-handling)
      para más información sobre este atributo.





     **[PDO::CASE_NATURAL](#pdo.constants.case-natural)**
     ([int](#language.types.integer))



      Deja los nombres de columnas como se devuelven por el controlador de base de datos.





     **[PDO::CASE_LOWER](#pdo.constants.case-lower)**
     ([int](#language.types.integer))



      Fuerza los nombres de columnas en minúsculas.





     **[PDO::CASE_UPPER](#pdo.constants.case-upper)**
     ([int](#language.types.integer))



      Fuerza los nombres de columnas en mayúsculas.





     **[PDO::NULL_NATURAL](#pdo.constants.null-natural)**
     ([int](#language.types.integer))









     **[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string)**
     ([int](#language.types.integer))









     **[PDO::NULL_TO_STRING](#pdo.constants.null-to-string)**
     ([int](#language.types.integer))









     **[PDO::ERR_NONE](#pdo.constants.err-none)**
     ([string](#language.types.string))



      Corresponde a SQLSTATE '00000', lo que significa que la consulta SQL
      ha tenido éxito sin error ni advertencia.
      Esta constante es útil para ayudar al verificar
      [PDO::errorCode()](#pdo.errorcode) o
      [PDOStatement::errorCode()](#pdostatement.errorcode) para determinar si ha
      ocurrido un error.
      Esto suele conocerse examinando el código de retorno del método
      que generó la condición de error de todos modos.





     **[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc)**
     ([int](#language.types.integer))



      Asigna un evento





     **[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free)**
     ([int](#language.types.integer))



      Elimina un evento





     **[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre)**
     ([int](#language.types.integer))



      Evento desencadenado antes de la ejecución de una sentencia preparada.





     **[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post)**
     ([int](#language.types.integer))



      Evento desencadenado tras la ejecución de una sentencia preparada.





     **[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre)**
     ([int](#language.types.integer))



      Evento desencadenado antes de recuperar un resultado de un conjunto de resultados.





     **[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post)**
     ([int](#language.types.integer))



      Evento desencadenado tras recuperar un resultado de un conjunto de resultados.





     **[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize)**
     ([int](#language.types.integer))



      Evento activado durante el registro de parámetros vinculados
      permitiendo al controlador normalizar el nombre del parámetro.





     **[PDO::SQLITE_DETERMINISTIC](#pdo.constants.sqlite-deterministic)**
     ([int](#language.types.integer))



      Especifica que una función creada con **PDO::PDO::sqliteCreateFunction()**
      es determinista, es decir, siempre devuelve el mismo resultado
      por las mismas entradas en una sola instrucción SQL. (Disponible a partir de PHP 7.1.4.)


# Conexiones y gestor de conexión

Las conexiones se establecen creando instancias de la clase base de PDO.
No importa qué controlador se desee utilizar; siempre se utiliza el nombre
de la clase PDO. El constructor acepta argumentos para especificar
la fuente de la base de datos (conocida como DSN) y opcionalmente,
el nombre de usuario y la contraseña (si los hay).

**Ejemplo #1 Conexión a MySQL**

&lt;?php
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
?&gt;

Si existen errores de conexión, se lanza un objeto PDOException.
Este error puede ser capturado si se desea gestionar la excepción, o bien
puede ser tratado por el gestor global de excepciones definido
mediante la función [set_exception_handler()](#function.set-exception-handler).

**Ejemplo #2 Gestión de errores de conexión**

&lt;?php
try {
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
// intentar reintentar la conexión después de un cierto tiempo, por ejemplo
}

**Advertencia**

Al igual que todas las demás [excepciones](#language.exceptions),
[PDOException](#class.pdoexception) puede ser capturada ya sea explícitamente, mediante
una instrucción [catch](#language.exceptions.catch), o implícitamente a través de [set_exception_handler()](#function.set-exception-handler).
De lo contrario, se producirá el comportamiento por defecto de convertir una excepción no capturada en una
**[E_FATAL_ERROR](#constant.e-fatal-error)**.
El error fatal contendrá un backtrace que podría revelar detalles sobre la conexión.
Por lo tanto, la opción php.ini [display_errors](#ini.display-errors)
debe estar configurada a 0 en un servidor de producción.

Cuando la conexión a la base de datos tiene éxito, se devuelve una instancia de la clase
PDO al script. La conexión permanece activa mientras el objeto PDO lo esté. Para cerrar la conexión,
se debe destruir el objeto asegurándose de que todas sus referencias sean eliminadas. Esto puede hacerse
asignando **[null](#constant.null)** a la variable que gestiona el objeto. Si no se hace explícitamente, PHP cerrará
automáticamente la conexión cuando el script llegue al final.

**Nota**:

Si aún existen otras referencias a esta instancia PDO (por ejemplo,
desde una instancia PDOStatement u otras variables que referencian
la misma instancia PDO), estas también deben ser eliminadas (por
ejemplo, asignando **[null](#constant.null)** a la variable que referencia el PDOStatement).

**Ejemplo #3 Cierre de una conexión**

&lt;?php
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
// usar la conexión aquí
$sth = $dbh-&gt;query('SELECT \* FROM foo');

// y ahora, cerrarla !
$sth = null;
$dbh = null;
?&gt;

Muchas aplicaciones web utilizan conexiones persistentes a los servidores
de base de datos. Las conexiones persistentes no se cierran al final del
script, sino que se almacenan en caché y se reutilizan cuando otro script solicita una conexión
utilizando los mismos parámetros. La caché de conexiones persistentes
permite evitar establecer una nueva conexión cada vez que un
script necesita acceder a una base de datos, lo que hace que la aplicación web sea más rápida.

**Ejemplo #4 Conexiones persistentes**

&lt;?php
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass, array(
PDO::ATTR_PERSISTENT =&gt; true
));
?&gt;

El valor de la opción **[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent)** se convierte
en [bool](#language.types.boolean) (activar/desactivar conexiones persistentes), a menos que sea
una [string](#language.types.string) no numérica, en cuyo caso esto permite el uso de
varios grupos de conexiones persistentes.
Esto es útil si las conexiones diferentes utilizan parámetros
incompatibles, por ejemplo, valores diferentes de
**[PDO::MYSQL_ATTR_USE_BUFFERED_QUERY](#pdo.constants.mysql-attr-use-buffered-query)**.

**Nota**:

Si se desea utilizar conexiones persistentes, se debe
utilizar el valor **[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent)** en el
array de opciones del controlador pasado al constructor PDO. Si se
establece este atributo con el método [PDO::setAttribute()](#pdo.setattribute)
después de la instanciación del objeto, el controlador no utilizará las
conexiones persistentes.

**Advertencia**

PDO no realiza ninguna limpieza de las conexiones persistentes. Las tablas temporales, los bloqueos, las transacciones y otros cambios
con estado pueden permanecer de usos anteriores de la conexión, causando problemas inesperados. Consulte la sección
[Conexiones persistentes a bases de datos](#features.persistent-connections) para más información.

**Nota**:

Si se utiliza el controlador PDO ODBC y si su librería ODBC soporta
el pool de conexiones ODBC (tanto unixODBC como Windows lo soportan;
puede ser más), entonces se recomienda no utilizar las conexiones persistentes
PDO, sino dejar que el pool de conexiones ODBC almacene en caché las conexiones.
El pool de conexiones ODBC es compartido con otros módulos en el proceso;
si PDO almacena en caché la conexión, entonces esta conexión nunca será devuelta
por el pool de conexiones ODBC, lo que hace que se creen múltiples conexiones para
otros módulos.

# Transacciones y validación automática (autocommit)

Ahora que se ha establecido la conexión mediante PDO, es necesario comprender
cómo PDO gestiona las transacciones antes de ejecutar consultas. Si nunca se han utilizado
transacciones, estas ofrecen 4 características principales:
Atomicidad, Consistencia, Aislamiento y Durabilidad (ACID). En otras palabras,
cualquier trabajo realizado en una transacción, incluso si se efectúa por etapas, está
garantizado de aplicarse a la base de datos sin riesgo y sin interferencia para otras
conexiones, cuando se valida. El trabajo de las transacciones también puede ser
automáticamente anulado a solicitud, siempre que no se haya validado nada aún, lo que
facilita considerablemente la gestión de errores en los scripts.

Las transacciones se implementan típicamente para aplicar
todas las modificaciones de una sola vez; esto tiene el efecto de mejorar
radicalmente la eficiencia de las actualizaciones. En otras palabras,
las transacciones hacen que los scripts sean más rápidos y potencialmente más
robustos (deben usarse correctamente para disfrutar de estos beneficios).

Desafortunadamente, no todas las bases de datos soportan transacciones,
por lo que PDO debe ejecutarse en modo "autocommit" al abrir la conexión por primera vez.
El modo "autocommit" significa que todas las consultas que se ejecutan tienen sus transacciones
implícitas, si la base de datos las soporta, o ninguna transacción si la base de datos no las soporta.
Si se necesita una transacción, debe usarse el método [PDO::beginTransaction()](#pdo.begintransaction)
para inicializarla. Si el controlador utilizado no soporta transacciones, se lanzará una
excepción PDO (de acuerdo con el gestor de errores: esto siempre es un error grave).
Una vez dentro de una transacción, debe usarse la función [PDO::commit()](#pdo.commit)
o la función [PDO::rollBack()](#pdo.rollback) para terminarla, según el éxito del código
durante la transacción.

**Advertencia**

PDO solo verifica la posibilidad de usar transacciones al nivel del controlador.
Si ciertas condiciones durante la ejecución impiden que las transacciones funcionen,
[PDO::beginTransaction()](#pdo.begintransaction) devolverá **[true](#constant.true)** sin error si el servidor
acepta iniciar una transacción.

Un ejemplo sería usar transacciones en tablas con formato MyISAM
del servidor de base de datos MySQL.

**Advertencia**

    *Commit implícito con declaraciones DDL:*
    Algunas bases de datos emiten automáticamente un
    COMMIT implícito cuando se ejecuta una declaración de lenguaje de definición de base de datos (DDL),
    como DROP TABLE o CREATE TABLE,
    dentro de una transacción. Esto significa que todas las modificaciones anteriores realizadas en la
    misma transacción serán *automáticamente validadas* y no pueden
    ser anuladas.




    MySQL y Oracle son ejemplos de bases de datos que
    presentan este comportamiento.








    **Ejemplo #1 Ejemplo de Commit implícito**

&lt;?php
$pdo-&gt;beginTransaction();
$pdo-&gt;exec("INSERT INTO users (name) VALUES ('Rasmus')");
$pdo-&gt;exec("CREATE TABLE test (id INT PRIMARY KEY)"); // Un COMMIT implícito ocurre aquí
$pdo-&gt;rollBack(); // Esto NO anulará el INSERT/CREATE para MySQL o Oracle
?&gt;

_Mejor práctica:_ Evite ejecutar declaraciones DDL dentro de transacciones
si se usan bases de datos que imponen este comportamiento. Si es necesario, separe las operaciones DDL
de la lógica transaccional.

Cuando el script finaliza o cuando la conexión está a punto de cerrarse,
si hay una transacción en curso, PDO la anulará automáticamente.
Esta es una medida de seguridad para garantizar la integridad de los datos
en caso de que el script finalice de manera inesperada. Si no se valida
explícitamente la transacción, entonces se presume que algo salió mal
y la anulación de la transacción ocurre para garantizar la seguridad de los datos.

**Advertencia**

La anulación automática ocurre si se inició la transacción mediante
[PDO::beginTransaction()](#pdo.begintransaction). Si se ejecutó manualmente una consulta que
comienza una transacción, PDO no tiene forma de saberlo y por lo tanto,
no anulará automáticamente esa transacción si algo salió mal.

**Ejemplo #2 Ejecución de un grupo en una transacción**

    En el siguiente ejemplo, supongamos que vamos a crear un conjunto de entradas
    para un nuevo empleado, cuyo número de ID será 23.
    Además de los datos básicos sobre esta persona, también se debe registrar su
    salario. Es muy simple realizar dos actualizaciones separadas, pero al encerrarlas
    en las llamadas a las funciones
    [PDO::beginTransaction()](#pdo.begintransaction) y
    [PDO::commit()](#pdo.commit), se garantiza que nadie pueda ver estas
    modificaciones hasta que estén completas. Si algo sale mal, el bloque de captura
    anulará todas las modificaciones realizadas desde el inicio de la transacción y
    mostrará un mensaje de error.

&lt;?php
try {
$dbh = new PDO('odbc:SAMPLE', 'db2inst1', 'ibmdb2',
array(PDO::ATTR_PERSISTENT =&gt; true));
echo "Conectado\n";
} catch (Exception $e) {
die("No se pudo conectar: " . $e-&gt;getMessage());
}

try {
$dbh-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh-&gt;beginTransaction();
$dbh-&gt;exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
$dbh-&gt;exec("insert into salarychange (id, amount, changedate)
values (23, 50000, NOW())");
$dbh-&gt;commit();

} catch (Exception $e) {
$dbh-&gt;rollBack();
echo "Falló: " . $e-&gt;getMessage();
}
?&gt;

No hay límite en el número de actualizaciones en una transacción;
también pueden realizarse consultas complejas y, por supuesto, usar
estas informaciones para construir otras actualizaciones y consultas; durante la actividad
de la transacción, se está seguro de que nadie más puede realizar
modificaciones mientras se está en medio de las propias modificaciones.
Para más información sobre transacciones, consulte la documentación
proporcionada por su base de datos.

# Consultas preparadas y procedimientos almacenados

La mayoría de las bases de datos soportan el concepto de consultas preparadas.
¿Qué son? Pueden verse como una especie de plantilla compilada
para el SQL que se desea ejecutar, que puede ser personalizada utilizando
variables como parámetros. Las consultas preparadas ofrecen
dos funcionalidades esenciales:

- La consulta solo debe ser analizada (o preparada) una vez, pero puede
  ser ejecutada múltiples veces con parámetros idénticos o diferentes.
  Cuando la consulta es preparada, la base de datos analizará, compilará
  y optimizará su plan para ejecutar la consulta. Para consultas complejas,
  este proceso puede tomar bastante tiempo, lo que puede ralentizar las aplicaciones
  si se debe repetir la misma consulta múltiples veces con diferentes parámetros.
  Al utilizar consultas preparadas, se evita repetir el ciclo análisis/compilación/optimización. En resumen, las consultas preparadas
  utilizan menos recursos y se ejecutan más rápidamente.

- Los parámetros para preparar las consultas no necesitan estar entre
  comillas; el controlador gestiona esto. Si la aplicación utiliza exclusivamente
  consultas preparadas, se puede estar seguro de que no es posible ninguna
  inyección SQL (Sin embargo, si se construyen otras partes de la consulta
  basándose en entradas de usuario, se sigue asumiendo un riesgo).

Las consultas preparadas son tan prácticas que es la única funcionalidad
que PDO emula para los controladores que no las soportan. Esto asegura poder
utilizar la misma técnica para acceder a los datos, sin preocuparse por las capacidades
de la base de datos.

**Ejemplo #1 Inserciones repetitivas utilizando consultas preparadas**

    Este ejemplo realiza una consulta INSERT sustituyendo un
    nombre y un valor para los marcadores nombrados.

&lt;?php
$stmt = $dbh-&gt;prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
$stmt-&gt;bindParam(':name', $name);
$stmt-&gt;bindParam(':value', $value);

// inserción de una fila
$name = 'one';
$value = 1;
$stmt-&gt;execute();

// inserción de otra fila con valores diferentes
$name = 'two';
$value = 2;
$stmt-&gt;execute();
?&gt;

**Ejemplo #2 Inserciones repetidas utilizando consultas preparadas**

    Este ejemplo realiza una consulta INSERT sustituyendo un nombre
    y un valor para los marcadores ?.

&lt;?php
$stmt = $dbh-&gt;prepare("INSERT INTO REGISTRY (name, value) VALUES (?, ?)");
$stmt-&gt;bindParam(1, $name);
$stmt-&gt;bindParam(2, $value);

// inserción de una fila
$name = 'one';
$value = 1;
$stmt-&gt;execute();

// inserción de otra fila con diferentes valores
$name = 'two';
$value = 2;
$stmt-&gt;execute();
?&gt;

**Ejemplo #3 Recuperación de datos utilizando consultas preparadas**

    Este ejemplo recupera datos basados en el valor de una clave proporcionada
    por un formulario. La entrada del usuario es automáticamente escapada, por lo que
    no hay riesgo de ataque por inyección SQL.

&lt;?php
$stmt = $dbh-&gt;prepare("SELECT * FROM REGISTRY where name = ?");
$stmt-&gt;execute([$_GET['name']]);
foreach ($stmt as $row) {
  print_r($row);
}
?&gt;

**Ejemplo #4 Llamada a un procedimiento almacenado con un parámetro de salida**

    Si el controlador de la base de datos lo soporta, también se pueden vincular
    parámetros tanto para entrada como para salida. Los parámetros de salida
    se utilizan típicamente para recuperar valores de un procedimiento almacenado.
    Los parámetros de salida son un poco más complejos de usar que los parámetros de entrada
    ya que se debe conocer la longitud que un parámetro dado podrá alcanzar cuando se vincule. Si el valor devuelto es más largo que el tamaño sugerido,
    se emitirá un error.

&lt;?php
$stmt = $dbh-&gt;prepare("CALL sp_returns_string(?)");
$stmt-&gt;bindParam(1, $return_value, PDO::PARAM_STR, 4000);

// Llamada al procedimiento almacenado
$stmt-&gt;execute();

print "El procedimiento ha devuelto: $return_value\n";
?&gt;

**Ejemplo #5 Llamada a un procedimiento almacenado con un parámetro de entrada/salida**

    También se deben especificar los parámetros que gestionan valores
    tanto para entrada como para salida; la sintaxis es similar a los
    parámetros de salida. En el siguiente ejemplo, la cadena 'Hola' es pasada
    al procedimiento almacenado y cuando devuelve el valor, 'Hola' es reemplazada
    por el valor devuelto por el procedimiento.

&lt;?php
$stmt = $dbh-&gt;prepare("CALL sp_takes_string_returns_string(?)");
$value = 'hello';
$stmt-&gt;bindParam(1, $value, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);

// llamada al procedimiento almacenado
$stmt-&gt;execute();

print "El procedimiento ha devuelto: $value\n";
?&gt;

**Ejemplo #6 Uso inválido de marcador**

&lt;?php
$stmt = $dbh-&gt;prepare("SELECT * FROM REGISTRY where name LIKE '%?%'");
$stmt-&gt;execute([$\_GET['name']]);

// un marcador debe ser utilizado en lugar de un valor completo
$stmt = $dbh-&gt;prepare("SELECT * FROM REGISTRY where name LIKE ?");
$stmt-&gt;execute(["%$\_GET[name]%"]);
?&gt;

# Los errores y su gestión

PDO ofrece 3 formas diferentes de gestionar los errores para adaptarse mejor
a la aplicación.

- **[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent)**

    Anterior a PHP 8.0.0, este es el modo por omisión.
    PDO define simplemente el código de error para ser inspeccionado
    mediante los métodos [PDO::errorCode()](#pdo.errorcode) y
    [PDO::errorInfo()](#pdo.errorinfo) en los objetos que representan
    las consultas, así como en los que representan las bases de datos; si el error
    resulta de una llamada al objeto que representa la consulta, se puede llamar
    al método [PDOStatement::errorCode()](#pdostatement.errorcode) o al método
    [PDOStatement::errorInfo()](#pdostatement.errorinfo) en el objeto.
    Si el error resulta de una llamada al objeto que representa una base de datos,
    también se pueden llamar estos dos mismos métodos en el objeto.

- **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**

    Además de definir el código de error, PDO emitirá un mensaje E_WARNING
    tradicional. Esta configuración es útil durante las pruebas y el depurado,
    si se desea ver el problema sin interrumpir la aplicación.

- **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**

    A partir de PHP 8.0.0, este es el modo por omisión.
    Además de definir el código de error, PDO lanzará una excepción
    [PDOException](#class.pdoexception) y definirá las propiedades
    para representar el código de error y la información complementaria.
    Esta configuración es igualmente útil durante el depurado, ya que
    permitirá "saltar" el punto crítico del código, mostrando rápidamente
    el problema encontrado (recuerde: las transacciones son automáticamente
    revertidas si la excepción hace que el script termine).

    El modo "excepción" es también muy útil ya que permite
    estructurar el gestor de errores de forma más clara que
    con las alertas tradicionales de PHP y, además, con menos código que
    cuando se ejecuta el código en modo silencio, y se verifica sistemáticamente
    los valores devueltos después de cada llamada a la base de datos.

    Ver el capítulo sobre las [excepciones](#language.exceptions)
    para más información sobre las excepciones en PHP.

PDO utiliza los códigos de error SQL-92 SQLSTATE; cada controlador PDO es
responsable de vincular sus códigos nativos a los códigos SQLSTATE apropiados.
El método [PDO::errorCode()](#pdo.errorcode) devuelve un código
SQLSTATE único. Si se necesitan información específica sobre el error, PDO
también ofrece el método [PDO::errorInfo()](#pdo.errorinfo)
que devuelve un array conteniendo el código SQLSTATE, el código de error específico
del controlador y la cadena describiendo el error proveniente del controlador.

**Ejemplo #1 Creación de una instancia PDO y
definición del modo de error**

&lt;?php
$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';

$dbh = new PDO($dsn, $user, $password);
$dbh-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Esto provocará una PDOException (cuando la tabla no existe).
$dbh-&gt;query("SELECT wrongcolumn FROM wrongtable");
?&gt;

El ejemplo anterior mostrará:

Fatal error: Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'testdb.wrongtable' doesn't exist in /tmp/pdo_test.php:10
Stack trace:
#0 /tmp/pdo_test.php(10): PDO-&gt;query('SELECT wrongcol...')
#1 {main}
thrown in /tmp/pdo_test.php on line 10

**Nota**:

[PDO::\_\_construct()](#pdo.construct) siempre lanza una excepción
[PDOException](#class.pdoexception) si la conexión falla, independientemente de la configuración
de **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)**.

**Ejemplo #2 Crea una instancia PDO y define el modo de error desde el constructor**

&lt;?php
$dsn = 'mysql:dbname=test;host=127.0.0.1';
$user = 'googleguy';
$password = 'googleguy';

$dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));

// Esto hará que PDO lance un error de nivel E_WARNING en lugar de una excepción (cuando la tabla no existe)
$dbh-&gt;query("SELECT wrongcolumn FROM wrongtable");
?&gt;

    El ejemplo anterior mostrará:

Warning: PDO::query(): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'test.wrongtable' doesn't exist in
/tmp/pdo_test.php on line 9

# Los objetos grandes (LOB)

En algún momento de su aplicación, podría ser necesario almacenar
grandes cantidades de datos en la base de datos. « Grande » significa
típicamente datos de aproximadamente 4 ko o más, aunque algunas bases de datos
pueden manejar más de 32 ko antes de que los datos se consideren « grandes ». Los objetos
grandes pueden ser de naturaleza textual o binaria. PDO permite trabajar
con este tipo de grandes datos utilizando el código tipo
**[PDO::PARAM_LOB](#pdo.constants.param-lob)** en las llamadas a las funciones
[PDOStatement::bindParam()](#pdostatement.bindparam) o
[PDOStatement::bindColumn()](#pdostatement.bindcolumn).
**[PDO::PARAM_LOB](#pdo.constants.param-lob)** solicita a PDO que transforme los datos
en un flujo que pueda ser manipulado utilizando
la [API PHP de flujos](#ref.stream).

**Ejemplo #1 Mostrar una imagen desde una base de datos**

    Este ejemplo vincula un LOB en una variable llamada $lob y lo envía
    al navegador utilizando la función [fpassthru()](#function.fpassthru).
    Dado que un LOB se representa como un flujo, las funciones como
    [fgets()](#function.fgets), [fread()](#function.fread) y
    [stream_get_contents()](#function.stream-get-contents) pueden ser utilizadas en este flujo.

&lt;?php
$db = new PDO('odbc:SAMPLE', 'db2inst1', 'ibmdb2');
$stmt = $db-&gt;prepare("select contenttype, imagedata from images where id=?");
$stmt-&gt;execute(array($_GET['id']));
$stmt-&gt;bindColumn(1, $type, PDO::PARAM_STR, 256);
$stmt-&gt;bindColumn(2, $lob, PDO::PARAM_LOB);
$stmt-&gt;fetch(PDO::FETCH_BOUND);

header("Content-Type: $type");
fpassthru($lob);
?&gt;

**Ejemplo #2 Insertar una imagen en una base de datos**

    Este ejemplo abre un fichero y pasa el puntero de fichero a PDO
    para insertarlo como LOB. PDO hará lo posible por recuperar
    el contenido del fichero e insertarlo en la base de datos de la
    manera más eficiente posible.

&lt;?php
$db = new PDO('odbc:SAMPLE', 'db2inst1', 'ibmdb2');
$stmt = $db-&gt;prepare("insert into images (id, contenttype, imagedata) values (?, ?, ?)");
$id = get_new_id(); // función para asignar un nuevo ID

// asumamos que obtenemos un fichero desde un formulario
// puede encontrar más detalles en la documentación de PHP

$fp = fopen($\_FILES['file']['tmp_name'], 'rb');

$stmt-&gt;bindParam(1, $id);
$stmt-&gt;bindParam(2, $_FILES['file']['type']);
$stmt-&gt;bindParam(3, $fp, PDO::PARAM_LOB);

$db-&gt;beginTransaction();
$stmt-&gt;execute();
$db-&gt;commit();
?&gt;

**Ejemplo #3 Insertar una imagen en una base de datos Oracle**

    Oracle requiere una sintaxis ligeramente diferente para insertar un LOB
    desde un fichero. Asimismo, es esencial realizar la inserción
    dentro de una transacción, de lo contrario, el nuevo LOB será insertado
    con una longitud de cero:

&lt;?php
$db = new PDO('oci:', 'scott', 'tiger');
$stmt = $db-&gt;prepare("insert into images (id, contenttype, imagedata) " .
"VALUES (?, ?, EMPTY_BLOB()) RETURNING imagedata INTO ?");
$id = get_new_id(); // función para asignar un nuevo ID

// asumamos que obtenemos un fichero desde un formulario
// puede encontrar más detalles en la documentación de PHP

$fp = fopen($\_FILES['file']['tmp_name'], 'rb');

$stmt-&gt;bindParam(1, $id);
$stmt-&gt;bindParam(2, $_FILES['file']['type']);
$stmt-&gt;bindParam(3, $fp, PDO::PARAM_LOB);

$db-&gt;beginTransaction();
$stmt-&gt;execute();
$db-&gt;commit();
?&gt;

# La clase PDO

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

## Introducción

    Representa una conexión entre PHP y un servidor de
    base de datos.

## Sinopsis de la Clase

     class **PDO**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [PARAM_NULL](#pdo.constants.param-null);

    public
     const
     [int](#language.types.integer)
      [PARAM_BOOL](#pdo.constants.param-bool) = 5;

    public
     const
     [int](#language.types.integer)
      [PARAM_INT](#pdo.constants.param-int) = 1;

    public
     const
     [int](#language.types.integer)
      [PARAM_STR](#pdo.constants.param-str) = 2;

    public
     const
     [int](#language.types.integer)
      [PARAM_LOB](#pdo.constants.param-lob) = 3;

    public
     const
     [int](#language.types.integer)
      [PARAM_STMT](#pdo.constants.param-stmt) = 4;

    public
     const
     [int](#language.types.integer)
      [PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);

    public
     const
     [int](#language.types.integer)
      [PARAM_STR_NATL](#pdo.constants.param-str-natl);

    public
     const
     [int](#language.types.integer)
      [PARAM_STR_CHAR](#pdo.constants.param-str-char);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_FREE](#pdo.constants.param-evt-free);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);

    public
     const
     [int](#language.types.integer)
      [PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);

    public
     const
     [int](#language.types.integer)
      [FETCH_DEFAULT](#pdo.constants.fetch-default);

    public
     const
     [int](#language.types.integer)
      [FETCH_LAZY](#pdo.constants.fetch-lazy);

    public
     const
     [int](#language.types.integer)
      [FETCH_ASSOC](#pdo.constants.fetch-assoc);

    public
     const
     [int](#language.types.integer)
      [FETCH_NUM](#pdo.constants.fetch-num);

    public
     const
     [int](#language.types.integer)
      [FETCH_BOTH](#pdo.constants.fetch-both);

    public
     const
     [int](#language.types.integer)
      [FETCH_OBJ](#pdo.constants.fetch-obj);

    public
     const
     [int](#language.types.integer)
      [FETCH_BOUND](#pdo.constants.fetch-bound);

    public
     const
     [int](#language.types.integer)
      [FETCH_COLUMN](#pdo.constants.fetch-column);

    public
     const
     [int](#language.types.integer)
      [FETCH_CLASS](#pdo.constants.fetch-class);

    public
     const
     [int](#language.types.integer)
      [FETCH_INTO](#pdo.constants.fetch-into);

    public
     const
     [int](#language.types.integer)
      [FETCH_FUNC](#pdo.constants.fetch-func);

    public
     const
     [int](#language.types.integer)
      [FETCH_GROUP](#pdo.constants.fetch-group);

    public
     const
     [int](#language.types.integer)
      [FETCH_UNIQUE](#pdo.constants.fetch-unique);

    public
     const
     [int](#language.types.integer)
      [FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);

    public
     const
     [int](#language.types.integer)
      [FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);

    public
     const
     [int](#language.types.integer)
      [FETCH_SERIALIZE](#pdo.constants.fetch-serialize);

    public
     const
     [int](#language.types.integer)
      [FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);

    public
     const
     [int](#language.types.integer)
      [FETCH_NAMED](#pdo.constants.fetch-named);

    public
     const
     [int](#language.types.integer)
      [ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);

    public
     const
     [int](#language.types.integer)
      [ATTR_PREFETCH](#pdo.constants.attr-prefetch);

    public
     const
     [int](#language.types.integer)
      [ATTR_TIMEOUT](#pdo.constants.attr-timeout);

    public
     const
     [int](#language.types.integer)
      [ATTR_ERRMODE](#pdo.constants.attr-errmode);

    public
     const
     [int](#language.types.integer)
      [ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);

    public
     const
     [int](#language.types.integer)
      [ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);

    public
     const
     [int](#language.types.integer)
      [ATTR_SERVER_INFO](#pdo.constants.attr-server-info);

    public
     const
     [int](#language.types.integer)
      [ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);

    public
     const
     [int](#language.types.integer)
      [ATTR_CASE](#pdo.constants.attr-case);

    public
     const
     [int](#language.types.integer)
      [ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);

    public
     const
     [int](#language.types.integer)
      [ATTR_CURSOR](#pdo.constants.attr-cursor);

    public
     const
     [int](#language.types.integer)
      [ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);

    public
     const
     [int](#language.types.integer)
      [ATTR_PERSISTENT](#pdo.constants.attr-persistent);

    public
     const
     [int](#language.types.integer)
      [ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);

    public
     const
     [int](#language.types.integer)
      [ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);

    public
     const
     [int](#language.types.integer)
      [ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);

    public
     const
     [int](#language.types.integer)
      [ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);

    public
     const
     [int](#language.types.integer)
      [ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);

    public
     const
     [int](#language.types.integer)
      [ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);

    public
     const
     [int](#language.types.integer)
      [ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);

    public
     const
     [int](#language.types.integer)
      [ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);

    public
     const
     [int](#language.types.integer)
      [ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);

    public
     const
     [int](#language.types.integer)
      [ERRMODE_SILENT](#pdo.constants.errmode-silent);

    public
     const
     [int](#language.types.integer)
      [ERRMODE_WARNING](#pdo.constants.errmode-warning);

    public
     const
     [int](#language.types.integer)
      [ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);

    public
     const
     [int](#language.types.integer)
      [CASE_NATURAL](#pdo.constants.case-natural);

    public
     const
     [int](#language.types.integer)
      [CASE_LOWER](#pdo.constants.case-lower);

    public
     const
     [int](#language.types.integer)
      [CASE_UPPER](#pdo.constants.case-upper);

    public
     const
     [int](#language.types.integer)
      [NULL_NATURAL](#pdo.constants.null-natural);

    public
     const
     [int](#language.types.integer)
      [NULL_EMPTY_STRING](#pdo.constants.null-empty-string);

    public
     const
     [int](#language.types.integer)
      [NULL_TO_STRING](#pdo.constants.null-to-string);

    public
     const
     [string](#language.types.string)
      [ERR_NONE](#pdo.constants.err-none);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);

    public
     const
     [int](#language.types.integer)
      [FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);

    public
     const
     [int](#language.types.integer)
      [CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);

    public
     const
     [int](#language.types.integer)
      [CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Métodos */

public [\_\_construct](#pdo.construct)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.





# PDO::beginTransaction

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::beginTransaction —
Inicia una transacción

### Descripción

public **PDO::beginTransaction**(): [bool](#language.types.boolean)

**PDO::beginTransaction()** desactiva el modo
autocommit. Cuando el autocommit está desactivado,
las modificaciones realizadas en la base de datos mediante las instancias
de los objetos PDO no se aplican hasta que se finaliza la transacción
llamando a la función [PDO::commit()](#pdo.commit).
La llamada a [PDO::rollBack()](#pdo.rollback) anulará todas las modificaciones
realizadas en la base de datos y restablecerá la conexión en modo autocommit.

Algunas bases de datos, incluyendo MySQL, ejecutarán automáticamente un COMMIT
cuando se ejecute una consulta de definición de lenguaje de base de datos (DDL) como
DROP TABLE o CREATE TABLE dentro de una transacción. Este COMMIT implícito
impedirá anular otras modificaciones realizadas en esta transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza la excepción [PDOException](#class.pdoexception) si ya se ha iniciado una transacción o si el controlador no soporta transacciones.

**Nota**:
Una excepción será emitida incluso si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** no vale
**[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Anular una transacción**



     El siguiente ejemplo inicia una transacción y ejecuta dos consultas
     que modifican la base de datos antes de anular las modificaciones. En MySQL,
     sin embargo, la consulta DROP TABLE validará automáticamente la transacción,
     por lo que ninguna de las modificaciones de la transacción será anulada.

&lt;?php
/_ Inicia una transacción, desactivando el auto-commit _/
$dbh-&gt;beginTransaction();

/_ Modificación del esquema de la base de datos y de los datos _/
$sth = $dbh-&gt;exec("DROP TABLE fruit");
$sth = $dbh-&gt;exec("UPDATE dessert
SET name = 'hamburger'");

/_ Se detecta un error y se anulan las modificaciones _/
$dbh-&gt;rollBack();

/_ La conexión a la base de datos está ahora de vuelta en modo auto-commit _/
?&gt;

### Ver también

    - [PDO::commit()](#pdo.commit) - Valida una transacción

    - [PDO::rollBack()](#pdo.rollback) - Anula una transacción

    - [Transacciones y auto-commit](#pdo.transactions)

# PDO::commit

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::commit —
Valida una transacción

### Descripción

public **PDO::commit**(): [bool](#language.types.boolean)

**PDO::commit()** valida una transacción, restablece la conexión
en modo autocommit hasta que se llame a la función
[PDO::beginTransaction()](#pdo.begintransaction) para iniciar una nueva transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanzará una excepción [PDOException](#class.pdoexception) si no hay
ninguna transacción activa.

**Nota**:
Una excepción será emitida incluso si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** no vale
**[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Valida una transacción básica**

&lt;?php
/_ Inicia una transacción, desactivando el autocommit _/
$dbh-&gt;beginTransaction();

/_ Insertar múltiples registros en una base de todo-o-nada _/
$sql = 'INSERT INTO fruit
(name, colour, calories)
VALUES (?, ?, ?)';

$sth = $dbh-&gt;prepare($sql);

foreach ($fruits as $fruit) {
$sth-&gt;execute(array(
$fruit-&gt;name,
$fruit-&gt;colour,
$fruit-&gt;calories,
));
}

/_ Validar los cambios _/
$dbh-&gt;commit();

/_ La conexión a la base de datos está ahora de vuelta en modo autocommit _/
?&gt;

    **Ejemplo #2 Committing a DDL transaction**

&lt;?php
/_ Inicia una transacción, desactivando el autocommit _/
$dbh-&gt;beginTransaction();

/_ Modificación del esquema de la base de datos _/
$sth = $dbh-&gt;exec("DROP TABLE fruit");

/_ Validar los cambios _/
$dbh-&gt;commit();

/_ La conexión a la base de datos está ahora de vuelta en modo autocommit _/
?&gt;

**Nota**:

     No todas las bases de datos permiten que las transacciones funcionen sobre declaraciones DDL:
     algunas generarán errores, mientras que otras (incluyendo MySQL) validarán
     automáticamente la transacción después de que la primera declaración DDL haya sido encontrada.

### Ver también

    - [PDO::beginTransaction()](#pdo.begintransaction) - Inicia una transacción

    - [PDO::rollBack()](#pdo.rollback) - Anula una transacción

    - [Transacciones y autocommit](#pdo.transactions)

# PDO::connect

(PHP 8 &gt;= 8.4.0)

PDO::connect — Conecta a una base de datos y devuelve una subclase PDO para los controladores que lo soportan

### Descripción

public static **PDO::connect**(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static

Crea una instancia de una subclase de [PDO](#class.pdo) para la
base de datos conectada si existe,
de lo contrario devuelve una instancia genérica de [PDO](#class.pdo).

### Parámetros

     dsn


       El Data Source Name, o DSN, que contiene las
       informaciones requeridas para conectarse a la base de datos.




       Generalmente, un DSN está compuesto por el nombre del controlador PDO, seguido
       de una sintaxis específica del controlador. Más detalles están disponibles
       en la documentación [PDO](#pdo.drivers) de cada controlador.




       El parámetro dsn soporta tres métodos diferentes
       para especificar los argumentos necesarios para la creación de la base de datos:







        Invocación de controlador


           dsn contiene el DSN completo.





        Invocación URI


           dsn está compuesto por **uri:**
           seguido por una URI que define la localización del fichero que contiene
           la cadena DSN. La URI puede especificar un fichero local o remoto.



          **uri:file:///path/to/dsnfile**




        Aliasing


           dsn está compuesto por un nombre
           name que corresponde a
           pdo.dsn.name en el fichero php.ini,
           y que define la cadena DSN.



          **Nota**:



            El alias debe ser definido en el fichero php.ini, y no en un
            fichero .htaccess o httpd.conf











     username


       El nombre de usuario para la cadena DSN. Este parámetro es opcional
       para algunos controladores PDO.






     password


       La contraseña de la cadena DSN. Este parámetro es opcional
       para algunos controladores PDO.






     options


       Un array clave=&gt;valor con las opciones específicas de conexión.





### Valores devueltos

Devuelve una instancia de una subclase de [PDO](#class.pdo) para el
controlador PDO correspondiente si existe,
o una instancia genérica de [PDO](#class.pdo).

### Errores/Excepciones

Se lanza una excepción [PDOException](#class.pdoexception) si el intento
de conexión a la base de datos solicitada falla,
independientemente del **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** actualmente definido.

### Ver también

- [Pdo\Dblib](#class.pdo-dblib)

- [Pdo\Firebird](#class.pdo-firebird)

- [Pdo\Mysql](#class.pdo-mysql)

- [Pdo\Odbc](#class.pdo-odbc)

- [Pdo\Pgsql](#class.pdo-pgsql)

- [Pdo\Sqlite](#class.pdo-sqlite)

- [PDO::\_\_construct()](#pdo.construct) - Crea una instancia PDO que representa una conexión a la base de datos

# PDO::\_\_construct

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::\_\_construct —
Crea una instancia PDO que representa una conexión a la base de datos

### Descripción

public **PDO::\_\_construct**(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

Crea un objeto PDO que representa una conexión a la base de datos.

### Parámetros

     dsn


       El Data Source Name, o DSN, que contiene las
       informaciones requeridas para conectarse a la base de datos.




       Generalmente, un DSN está compuesto por el nombre del controlador PDO, seguido
       de una sintaxis específica del controlador. Más detalles están disponibles
       en la documentación [PDO](#pdo.drivers) de cada controlador.




       El parámetro dsn soporta tres métodos diferentes
       para especificar los argumentos necesarios para la creación de la base de datos:







        Invocación de controlador


           dsn contiene el DSN completo.





        Invocación URI


           dsn está compuesto por **uri:**
           seguido por una URI que define la localización del fichero que contiene
           la cadena DSN. La URI puede especificar un fichero local o remoto.



          **uri:file:///path/to/dsnfile**




        Aliasing


           dsn está compuesto por un nombre
           name que corresponde a
           pdo.dsn.name en el fichero php.ini,
           y que define la cadena DSN.



          **Nota**:



            El alias debe ser definido en el fichero php.ini, y no en un
            fichero .htaccess o httpd.conf











     username


       El nombre de usuario para la cadena DSN. Este parámetro es opcional
       para algunos controladores PDO.






     password


       La contraseña de la cadena DSN. Este parámetro es opcional
       para algunos controladores PDO.






     options


       Un array clave=&gt;valor con las opciones específicas de conexión.





### Errores/Excepciones

Se lanza una excepción [PDOException](#class.pdoexception) si el intento
de conexión a la base de datos solicitada falla,
independientemente del **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** actualmente definido.

### Ejemplos

**Ejemplo #1 Crea una instancia PDO mediante una invocación de controlador**

&lt;?php

$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';

$dbh = new PDO($dsn, $user, $password);

?&gt;

**Ejemplo #2 Crea una instancia PDO mediante una invocación URI**

     El ejemplo siguiente supone que el fichero
     /usr/local/dbconnect existe con permisos de acceso
     que permiten a PHP acceder a él. El fichero contiene entonces el DSN de PDO,
     para conectarse a una base de datos DB2, con el controlador PDO_ODBC:

odbc:DSN=SAMPLE;UID=john;PWD=mypass

     El script PHP puede entonces crear una conexión a la base de datos, pasando
     en la URL el parámetro uri: y apuntando a la URI del fichero:

&lt;?php

$dsn = 'uri:file:///usr/local/dbconnect';
$user = '';
$password = '';

$dbh = new PDO($dsn, $user, $password);

?&gt;

**Ejemplo #3 Crea una instancia PDO con un alias**

     El ejemplo siguiente supone que el fichero php.ini contiene la directiva
     siguiente para activar una conexión a un servidor MySQL, con el alias
     mydb:



    [PDO]

pdo.dsn.mydb="mysql:dbname=testdb;host=localhost"

&lt;?php

$dsn = 'mydb';
$user = '';
$password = '';

$dbh = new PDO($dsn, $user, $password);

?&gt;

# PDO::errorCode

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::errorCode —
Devuelve el SQLSTATE asociado con la última operación sobre la base de datos

### Descripción

public **PDO::errorCode**(): [?](#language.types.null)[string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**PDO::errorCode()** devuelve un SQLSTATE,
un identificador alfanumérico de cinco caracteres definido en el estándar ANSI SQL.
Brevemente, un SQLSTATE consiste en un valor de clase de dos caracteres seguido
por un valor de subclase de tres caracteres. Un valor de clase de 01 indica
una alerta y es acompañado por un código de retorno SQL_SUCCESS_WITH_INFO.
Los valores de clases distintos a '01', a excepción de la clase 'IM', indican un error.
La clase 'IM' es específica para alertas y errores que provienen de la implementación
misma de PDO (o quizás ODBC, si se utiliza el driver ODBC).
El valor de subclase '000' en cualquier clase, indica que no hay subclase para este SQLSTATE.

**PDO::errorCode()** devuelve únicamente los códigos de error
para operaciones ejecutadas directamente sobre el manejador de la base de datos.
Si se crea un objeto [PDOStatement](#class.pdostatement) con la función
[PDO::prepare()](#pdo.prepare) o la función
[PDO::query()](#pdo.query) y se invoca un error
sobre el manejador de consulta, **PDO::errorCode()** no
devolverá este error. Se debe llamar
[PDOStatement::errorCode()](#pdostatement.errorcode) para devolver el código de error
para una operación ejecutada sobre un manejador de consulta particular.

Devuelve **[null](#constant.null)** si ninguna operación ha sido ejecutada sobre la base de datos.

### Ejemplos

    **Ejemplo #1 Obtención de un código SQLSTATE**

&lt;?php
/_ Provoca un error -- la tabla BONES no existe _/
$dbh-&gt;exec("INSERT INTO bones(skull) VALUES ('lucy')");

echo "\nPDO::errorCode(): ", $dbh-&gt;errorCode();
?&gt;

    El ejemplo anterior mostrará:

PDO::errorCode(): 42S02

### Ver también

    - [PDO::errorInfo()](#pdo.errorinfo) - Devuelve las informaciones asociadas al error durante

la última operación sobre la base de datos

    - [PDOStatement::errorCode()](#pdostatement.errorcode) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

    - [PDOStatement::errorInfo()](#pdostatement.errorinfo) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

# PDO::errorInfo

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::errorInfo —
Devuelve las informaciones asociadas al error durante
la última operación sobre la base de datos

### Descripción

public **PDO::errorInfo**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**PDO::errorInfo()** devuelve un array que contiene
informaciones sobre el error ocurrido durante la última operación ejecutada por este
manejador de base de datos. El array contiene los siguientes campos:

       Elemento
       Información






       0
       Código de error SQLSTATE (un identificador alfanumérico de cinco caracteres
       definido en el estándar ANSI SQL).



       1
       Código de error específico del driver.



       2
       Mensaje de error específico del driver.




**Nota**:

    Si el código de error SQLSTATE no está definido o si no hay un error
    específico del driver, el elemento siguiente al elemento 0 será definido a **[null](#constant.null)**.

**PDO::errorInfo()** devuelve únicamente las informaciones de
los errores para las operaciones ejecutadas directamente sobre un manejador de base de
datos. Si se crea un objeto [PDOStatement](#class.pdostatement) con la función
[PDO::prepare()](#pdo.prepare) o la función
[PDO::query()](#pdo.query) y se invoca un error sobre
el manejador de consulta, **PDO::errorInfo()** no devolverá
el error desde el manejador de consulta. Se debe llamar a la función
[PDOStatement::errorInfo()](#pdostatement.errorinfo) para devolver las informaciones
sobre el error para una operación ejecutada sobre un manejador de consulta particular.

### Ejemplos

    **Ejemplo #1 Muestra los campos de errores para una conexión PDO_ODBC sobre una base de

datos DB2\*\*

&lt;?php
/_ Provoca un error -- sintaxis SQL incorrecta _/
$stmt = $dbh-&gt;prepare('mauvaise syntaxe sql');
if (!$stmt) {
echo "\nPDO::errorInfo():\n";
print_r($dbh-&gt;errorInfo());
}
?&gt;

    El ejemplo anterior mostrará:

PDO::errorInfo():
Array
(
[0] =&gt; 42S02
[1] =&gt; -204
[2] =&gt; [IBM][CLI Driver][DB2/LINUX] SQL0204N "DANIELS.BONES" is an undefined name. SQLSTATE=42704
)

### Ver también

    - [PDO::errorCode()](#pdo.errorcode) - Devuelve el SQLSTATE asociado con la última operación sobre la base de datos

    - [PDOStatement::errorCode()](#pdostatement.errorcode) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

    - [PDOStatement::errorInfo()](#pdostatement.errorinfo) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

# PDO::exec

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::exec —
Ejecuta una consulta SQL y devuelve el número de filas afectadas

### Descripción

public **PDO::exec**([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)

**PDO::exec()** ejecuta una consulta SQL
en una sola llamada de función, devuelve el número de filas afectadas
por la consulta.

**PDO::exec()** no devuelve resultados para una consulta
SELECT. Para una consulta SELECT que se necesite una sola vez en
el programa, utilice en su lugar la función [PDO::query()](#pdo.query).
Para una consulta que se necesite varias veces, prepare un objeto
[PDOStatement](#class.pdostatement) con la función [PDO::prepare()](#pdo.prepare) y ejecute
la consulta con la función [PDOStatement::execute()](#pdostatement.execute).

### Parámetros

     statement


        La consulta a preparar y ejecutar.




        Los datos contenidos en la consulta deben ser
        [properamente escapados](#pdo.quote).






### Valores devueltos

**PDO::exec()** devuelve el número de filas que han sido modificadas
o eliminadas por la consulta SQL ejecutada. Si ninguna fila es afectada,
la función **PDO::exec()** devolverá 0.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

El siguiente ejemplo se basa incorrectamente en el valor devuelto por
**PDO::exec()**, donde una consulta que no afecta
ninguna fila equivale a llamar a [die()](#function.die):

&lt;?php
$db-&gt;exec() or die(print_r($db-&gt;errorInfo(), true)); // incorrecto
?&gt;

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Ejecutar una consulta DELETE**



     Cuenta el número de filas eliminadas para una consulta DELETE con
     ninguna cláusula WHERE.

&lt;?php
$dbh = new PDO('odbc:sample', 'db2inst1', 'ibmdb2');

/_ Eliminación de todas las filas de la tabla FRUIT _/
$count = $dbh-&gt;exec("DELETE FROM fruit");

/_ Devuelve el número de filas eliminadas _/
print "Eliminación de $count filas.\n";
?&gt;

    El ejemplo anterior mostrará:

Eliminación de 1 filas.

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

# PDO::getAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDO::getAttribute —
Recupera un atributo de una conexión a una base de datos

### Descripción

public **PDO::getAttribute**([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)

Esta función devuelve el valor de un atributo de una conexión a una base
de datos. Para recuperar los atributos [PDOStatement](#class.pdostatement), consúltese
la función [PDOStatement::getAttribute()](#pdostatement.getattribute).

Tenga en cuenta que algunas bases de datos/drivers combinados no soportan todos los atributos
de conexión.

### Parámetros

     attribute


       Una de las constantes PDO::ATTR_*. Los atributos genéricos
       que se aplican a las conexiones son los siguientes:



        - PDO::ATTR_AUTOCOMMIT

        - PDO::ATTR_CASE

        - PDO::ATTR_CLIENT_VERSION

        - PDO::ATTR_CONNECTION_STATUS

        - PDO::ATTR_DRIVER_NAME

        - PDO::ATTR_ERRMODE

        - PDO::ATTR_ORACLE_NULLS

        - PDO::ATTR_PERSISTENT

        - PDO::ATTR_PREFETCH

        - PDO::ATTR_SERVER_INFO

        - PDO::ATTR_SERVER_VERSION

        - PDO::ATTR_TIMEOUT




       Algunos controladores pueden hacer uso de atributos adicionales específicos del controlador.
       Tenga en cuenta que los atributos específicos del controlador *no deben*
       ser utilizados con otros controladores.



### Valores devueltos

Una llamada exitosa devuelve el valor del atributo PDO solicitado.
Una llamada que ha fallado devuelve el valor **[null](#constant.null)**.

### Errores/Excepciones

El método **PDO::getAttribute()** puede generar una excepción [PDOException](#class.pdoexception)
cuando el controlador subyacente no soporta el attribute solicitado.

### Ejemplos

    **Ejemplo #1 Recuperación de los atributos de conexión a una base de datos**

&lt;?php
$conn = new PDO('odbc:sample', 'db2inst1', 'ibmdb2');
$attributes = array(
"AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
"ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
"TIMEOUT"
);

foreach ($attributes as $val) {
   echo "PDO::ATTR_$val: ";
echo $conn-&gt;getAttribute(constant("PDO::ATTR_$val")) . "\n";
}
?&gt;

### Ver también

    - [PDO::setAttribute()](#pdo.setattribute) - Configura un atributo PDO

    - [PDOStatement::getAttribute()](#pdostatement.getattribute) - Recupera un atributo de consulta

    - [PDOStatement::setAttribute()](#pdostatement.setattribute) - Establece un atributo de consulta

# PDO::getAvailableDrivers

# pdo_drivers

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 1.0.3)

PDO::getAvailableDrivers -- pdo_drivers —
Devuelve la lista de controladores PDO disponibles

### Descripción

public static **PDO::getAvailableDrivers**(): [array](#language.types.array)

**pdo_drivers**(): [array](#language.types.array)

Esta función devuelve la lista de todos los controladores PDO disponibles
que pueden ser utilizados con el argumento DSN de la función
[PDO::\_\_construct()](#pdo.construct).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**PDO::getAvailableDrivers()** devuelve un array de nombres de controladores.
Si no hay controladores disponibles, devuelve un array vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo con PDO::getAvailableDrivers()**

&lt;?php
print_r(PDO::getAvailableDrivers());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql
[1] =&gt; sqlite
)

# PDO::inTransaction

(PHP 5 &gt;= 5.3.3, Bundled pdo_pgsql, PHP 7, PHP 8)

PDO::inTransaction —
Verifica si se encuentra en una transacción

### Descripción

public **PDO::inTransaction**(): [bool](#language.types.boolean)

Verifica si una transacción está actualmente activa en el driver.
Este método solo funciona para los drivers de bases de datos
que soportan transacciones.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si una transacción está actualmente activa, **[false](#constant.false)** en caso contrario.

# PDO::lastInsertId

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::lastInsertId —
Devuelve el identificador de la última fila insertada o el valor de una secuencia

### Descripción

public **PDO::lastInsertId**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el identificador de la última fila insertada, o el último valor
de una secuencia de objetos, dependiendo del driver utilizado. Por ejemplo,
[PDO_PGSQL](#ref.pdo-pgsql) permite especificar el nombre de cualquier
objeto secuencia para el argumento name.

**Nota**:

    Este método puede no devolver un resultado significativo según los drivers PDO
    utilizados, ya que la base de datos empleada puede no soportar la noción
    de campos auto-incrementados o de secuencias.

### Parámetros

     name


       Nombre de la secuencia de objetos desde la cual debe devolverse el identificador.





### Valores devueltos

Si no se especifica un nombre de secuencia para el argumento
name, **PDO::lastInsertId()**
devuelve una cadena que representa el identificador de la última fila insertada
en la base de datos.

Si se especifica un nombre de secuencia para el argumento
name, **PDO::lastInsertId()**
devuelve una cadena que representa el último valor de la secuencia de objetos especificada.

Si el driver PDO no soporta esta funcionalidad,
**PDO::lastInsertId()** lanzará un SQLSTATE
IM001.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

# PDO::prepare

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PHP 8,PECL pdo &gt;= 0.1.0)

PDO::prepare —
Prepara una consulta para su ejecución y devuelve un objeto

### Descripción

public **PDO::prepare**([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)

Prepara una consulta SQL para ser ejecutada por el método
[PDOStatement::execute()](#pdostatement.execute). El modelo de declaración puede contener
cero o más parámetros nombrados (:nombre) o marcadores
(?) para los cuales los valores reales serán sustituidos
cuando la consulta sea ejecutada.
El uso tanto de parámetros nombrados como de marcadores es
imposible en un modelo de declaración; solo uno u otro estilo de parámetro.
Utilícese estos parámetros para ligar las entradas del usuario, no se incluyan
directamente en la consulta.

Debe incluirse un marcador con un nombre único para cada valor que
se desee pasar en la consulta al llamar a
[PDOStatement::execute()](#pdostatement.execute). No puede utilizarse
un marcador con dos nombres idénticos en una consulta preparada, a menos que
el modo de emulación esté activo.

**Nota**:

    Los marcadores de parámetros pueden representar únicamente un literal de
    datos completo.
    Ni una parte de literal, ni una palabra clave, ni un identificador, ni cualquier otra
    consulta arbitraria pueden ser ligados utilizando los parámetros.
    Por ejemplo, no puede asociarse múltiples valores a un solo marcador de nombre entrante, en la cláusula IN() de una consulta SQL.

Llamar a **PDO::prepare()** y
[PDOStatement::execute()](#pdostatement.execute) para las consultas
que deben ser ejecutadas varias veces con diferentes valores de
parámetros optimiza el rendimiento de la aplicación permitiendo al controlador negociar
del lado del cliente y/o servidor con la caché de consultas
y las meta-informaciones. Además, llamar a **PDO::prepare()** y
[PDOStatement::execute()](#pdostatement.execute) ayuda a prevenir ataques por
inyección SQL eliminando la necesidad de proteger los parámetros manualmente.

PDO emula las consultas preparadas / los parámetros ligados para los controladores
que no los soportan nativamente, y puede también reescribir los
parámetros nombrados o los marcadores en algo más
apropiado, si el controlador soporta un estilo y no el otro.

**Nota**:

    El analizador utilizado para las declaraciones preparadas
    emuladas y para reescribir los parámetros nombrados o del estilo de punto
    de interrogación soporta el escape antislash no estándar para las comillas simples y dobles. Esto significa que las comillas finales que
    son precedidas por un antislash no serán reconocidas como tales, lo que puede
    resultar en una mala detección de los parámetros causando que la declaración
    preparada falle al ser ejecutada. Un contorno es no utilizar las consultas emuladas para tales consultas SQL, y evitar reescribir los parámetros utilizando un estilo de parámetro que es
    soportado nativamente por el controlador.

A partir de PHP 7.4.0, los puntos de interrogación pueden ser escapados duplicándolos.
Esto significa que la cadena ?? será traducida en ?
al enviar la consulta a la base de datos.

### Parámetros

     query


       Debe ser un modelo de consulta SQL válido para el servidor de base de datos objetivo.






     options


       Este array contiene una o más parejas clave=&gt;valor para definir
       los valores de los atributos para el objeto [PDOStatement](#class.pdostatement)
       que esta método devuelve. Puede utilizarse esto para definir el valor
       PDO::ATTR_CURSOR a
       PDO::CURSOR_SCROLL para solicitar un cursor desplazable.
       Algunos controladores tienen opciones específicas que pueden ser definidas
       en el momento de la preparación.





### Valores devueltos

Si el servidor de base de datos prepara con éxito esta consulta,
**PDO::prepare()** devuelve un objeto [PDOStatement](#class.pdostatement).
Si el servidor de base de datos no logra preparar la consulta,
**PDO::prepare()** devuelve **[false](#constant.false)** o emite una excepción
[PDOException](#class.pdoexception) (siguiendo el
[gestor de errores](#pdo.error-handling)).

**Nota**:

    La emulación de consultas preparadas no comunica con el servidor de base
    de datos. También, la función **PDO::prepare()** no verifica
    la consulta.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Modelo de declaración SQL con parámetros nombrados**

&lt;?php
/_ Ejecuta una consulta preparada pasando un array de valores _/
$sql = 'SELECT nombre, color, calorias
    FROM fruta
WHERE calorias &lt; :calorias AND color = :color';
$sth = $dbh-&gt;prepare($sql, [PDO::ATTR_CURSOR =&gt; PDO::CURSOR_FWDONLY]);
$sth-&gt;execute(['calorias' =&gt; 150, 'color' =&gt; 'red']);
$red = $sth-&gt;fetchAll();
/* Las claves del array pueden ser prefijadas con dos puntos ":" también (opcional) */
$sth-&gt;execute([':calorias' =&gt; 175, ':color' =&gt; 'yellow']);
$yellow = $sth-&gt;fetchAll();
?&gt;

    **Ejemplo #2 Modelo de declaración SQL con marcadores**

&lt;?php
/_ Ejecuta una consulta preparada pasando un array de valores _/
$sth = $dbh-&gt;prepare('SELECT nombre, color, calorias
    FROM fruta
    WHERE calorias &lt; ? AND color = ?');
$sth-&gt;execute([150, 'rojo']);
$red = $sth-&gt;fetchAll();
$sth-&gt;execute([175, 'amarillo']);
$yellow = $sth-&gt;fetchAll();
?&gt;

    **Ejemplo #3 Modelo de declaración SQL con un punto de interrogación escapado**

&lt;?php
/_ nota: esto solo es válido para bases de datos PostgreSQL _/
$sth = $dbh-&gt;prepare('SELECT * FROM issues WHERE tag::jsonb ?? ?');
$sth-&gt;execute(['feature']);
$featureIssues = $sth-&gt;fetchAll();
$sth-&gt;execute(['performance']);
$performanceIssues = $sth-&gt;fetchAll();
?&gt;

### Ver también

    - [PDO::exec()](#pdo.exec) - Ejecuta una consulta SQL y devuelve el número de filas afectadas

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

# PDO::query

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDO::query —
Prepara y ejecuta una consulta SQL sin marcadores de sustitución

### Descripción

public **PDO::query**([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)

public **PDO::query**([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)

public **PDO::query**(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)

public **PDO::query**([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)

**PDO::query()** prepara y ejecuta una consulta SQL
en una sola llamada de función, retornando la consulta como
objeto [PDOStatement](#class.pdostatement).

Para una consulta que debe ejecutarse varias veces, se obtendrán
mejores resultados si se prepara el objeto [PDOStatement](#class.pdostatement) utilizando
la función [PDO::prepare()](#pdo.prepare) y se ejecuta la consulta
mediante múltiples llamadas a la función [PDOStatement::execute()](#pdostatement.execute).

Si no se recuperan todos los datos del conjunto de resultados antes de ejecutar
la siguiente llamada a **PDO::query()**, la llamada puede fallar.
Llamar a [PDOStatement::closeCursor()](#pdostatement.closecursor) para liberar los
recursos de la base de datos asociados al objeto [PDOStatement](#class.pdostatement) antes de ejecutar
la siguiente llamada a la función **PDO::query()**.

**Nota**:

    Si query contiene marcadores de sustitución,
    la consulta debe prepararse y ejecutarse por separado utilizando las
    funciones [PDO::prepare()](#pdo.prepare) y [PDOStatement::execute()](#pdostatement.execute).

### Parámetros

     query


        La consulta SQL a preparar y ejecutar.




        Si el SQL contiene marcadores de sustitución, [PDO::prepare()](#pdo.prepare) y
        [PDOStatement::execute()](#pdostatement.execute) deben ser utilizados en su lugar.
        Alternativamente, el SQL puede ser preparado manualmente antes de llamar
        a **PDO::query()**, con los datos correctamente formateados
        utilizando [PDO::quote()](#pdo.quote) si el controlador lo soporta.






     fetchMode


       El modo de recuperación por omisión para el
       [PDOStatement](#class.pdostatement) retornado.
       Esto debe ser una de las constantes
       [PDO::FETCH_*](#pdo.constants).




       Si este argumento es pasado a la función, el resto de los argumentos serán
       tratados como si [PDOStatement::setFetchMode()](#pdostatement.setfetchmode)
       hubiera sido llamado sobre el objeto de la consulta resultante.
       Los argumentos siguientes dependen del modo de recuperación
       seleccionado.





### Valores devueltos

Retorna un objeto [PDOStatement](#class.pdostatement) o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 SQL sin marcadores de sustitución puede ser ejecutado utilizando PDO::query()**

&lt;?php
$sql =  'SELECT name, color, calories FROM fruit ORDER BY name';
foreach  ($conn-&gt;query($sql) as $row) {
print $row['name'] . "\t";
print $row['color'] . "\t";
print $row['calories'] . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

apple red 150
banana yellow 250
kiwi brown 75
lemon yellow 25
orange orange 300
pear green 150
watermelon pink 90

### Ver también

    - [PDO::exec()](#pdo.exec) - Ejecuta una consulta SQL y devuelve el número de filas afectadas

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

# PDO::quote

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.1)

PDO::quote —
Protege una cadena para usarla en una consulta SQL PDO

### Descripción

public **PDO::quote**([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)

**PDO::quote()** coloca comillas simples alrededor
de una cadena de entrada, si es necesario y protege los caracteres especiales presentes en la
cadena de entrada, utilizando el estilo de protección apropiado al controlador actual.

Si se utiliza esta función para construir consultas SQL, se
_recomienda encarecidamente_ usar
[PDO::prepare()](#pdo.prepare) para preparar las consultas SQL con
parámetros vinculados en lugar de usar **PDO::quote()** para
interpretar las entradas del usuario en la consulta SQL. Las consultas preparadas
con parámetros vinculados no solo son más portables, flexibles y seguras, sino también
más rápidas de ejecutar que interpretar las consultas, ya que los lados cliente y servidor pueden
almacenar en caché una versión compilada de la consulta.

No todos los controladores PDO implementan este método (como PDO_ODBC). Utilice
consultas preparadas en su lugar.

**Precaución**

# Seguridad: el juego de caracteres por defecto

    El juego de caracteres debe ser definido ya sea a nivel
    del servidor, o durante la conexión a la base de
    datos (dependiendo del driver utilizado) para que afecte
    al método **PDO::quote()**.
    Ver la [documentación
    específica del driver](#pdo.drivers) para más información.

### Parámetros

     string


        La cadena a proteger.






     type


        El tipo de datos para los drivers que tienen estilos particulares
        de protección.
        Proporciona una pista al tipo de dato para los controladores que tienen un estilo
        de escape diferente. Por ejemplo **[PDO_PARAM_LOB](#constant.pdo-param-lob)**
        indica al controlador que escape datos binarios.






### Valores devueltos

Devuelve una cadena protegida, que es teóricamente segura para usar
en una consulta SQL. Devuelve **[false](#constant.false)** si el controlador no soporta
este tipo de protecciones.

### Ejemplos

    **Ejemplo #1 Protección de una cadena normal**

&lt;?php
$conn = new PDO('sqlite:/home/lynn/music.sql3');

/_ Cadena simple _/
$string = 'Nice';
print "Cadena no escapada : $string\n";
print "Cadena escapada : " . $conn-&gt;quote($string) . "\n";
?&gt;

    El ejemplo anterior mostrará:

Cadena no escapada : Nice
Cadena escapada: 'Nice'

    **Ejemplo #2 Protección de una cadena peligrosa**

&lt;?php
$conn = new PDO('sqlite:/home/lynn/music.sql3');

/_ Cadena peligrosa _/
$string = 'Cadena \' particular';
print "Cadena no escapada : $string\n";
print "Cadena escapada :" . $conn-&gt;quote($string) . "\n";
?&gt;

    El ejemplo anterior mostrará:

Cadena no escapada : Cadena ' particular
Cadena escapada : 'Cadena '' particular'

    **Ejemplo #3 Protección de una cadena compleja**

&lt;?php
$conn = new PDO('sqlite:/home/lynn/music.sql3');

/_ Cadena compleja _/
$string = "Co'mpl''exe \"ch'\"aîne";
print "Cadena no escapada : $string\n";
print "Cadena escapada : " . $conn-&gt;quote($string) . "\n";
?&gt;

    El ejemplo anterior mostrará:

Cadena no escapada: Co'mpl''exe "ch'"aîne
Cadena escapada: 'Co''mpl''''exe "ch''"aîne'

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

# PDO::rollBack

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::rollBack —
Anula una transacción

### Descripción

public **PDO::rollBack**(): [bool](#language.types.boolean)

Anula la transacción actual, iniciada por la función
[PDO::beginTransaction()](#pdo.begintransaction).

Si la base de datos está en modo autocommit, esta función
restaurará el modo autocommit después de la anulación de la transacción.

Algunas bases de datos, incluyendo MySQL, ejecutarán automáticamente un COMMIT
cuando se ejecute una consulta de definición de lenguaje de base de datos (DDL) como
DROP TABLE o CREATE TABLE en una transacción. Este COMMIT implícito impedirá anular
cualquier otra modificación realizada en esta transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanzará una excepción [PDOException](#class.pdoexception) si no hay
ninguna transacción activa.

**Nota**:
Una excepción será emitida incluso si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** no vale
**[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Anulación de una transacción**



     El siguiente ejemplo comienza una transacción y ejecuta dos consultas
     que modifican la base de datos antes de anular las modificaciones. En MySQL,
     sin embargo, la consulta DROP TABLE validará automáticamente la transacción,
     por lo que ninguna de las modificaciones de la transacción será anulada.

&lt;?php
/_ Inicio de una transacción, desactivación del modo autocommit _/
$dbh-&gt;beginTransaction();

/_ Modifica el esquema de la base de datos así como los datos _/
$sth = $dbh-&gt;exec("DROP TABLE fruit");
$sth = $dbh-&gt;exec("UPDATE dessert
SET name = 'hamburger'");

/_ Se detecta un error y se anulan las modificaciones _/
$dbh-&gt;rollBack();

/_ La conexión a la base de datos vuelve al modo autocommit _/
?&gt;

### Ver también

    - [PDO::beginTransaction()](#pdo.begintransaction) - Inicia una transacción

    - [PDO::commit()](#pdo.commit) - Valida una transacción

    - [Transacciones y auto-commit](#pdo.transactions)

# PDO::setAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDO::setAttribute —
Configura un atributo PDO

### Descripción

public **PDO::setAttribute**([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Configura un atributo del gestor de base de datos. Algunos de los
atributos genéricos se listan a continuación; algunos controladores disponen de
configuraciones adicionales.
Cabe señalar que los atributos específicos de un controlador
_no deben_ ser utilizados con otros controladores.

     **[PDO::ATTR_CASE](#pdo.constants.attr-case)**


       Fuerza los nombres de columnas a una casilla particular.
       Puede tomar una de las siguientes valores:





        **[PDO::CASE_LOWER](#pdo.constants.case-lower)**


          Fuerza los nombres de columnas en minúsculas.




        **[PDO::CASE_NATURAL](#pdo.constants.case-natural)**


          Deja los nombres de columnas tal como son devueltos por el controlador de base de datos.




        **[PDO::CASE_UPPER](#pdo.constants.case-upper)**


          Fuerza los nombres de columnas en mayúsculas.







     **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)**


       El modo para reportar los errores de PDO.
       Puede tomar una de las siguientes valores:





        **[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent)**


          Define solo los códigos de error.




        **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**


          Emite diagnósticos **[E_WARNING](#constant.e-warning)**.




        **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**


          Lanza excepciones [PDOException](#class.pdoexception).







     **[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls)**

      **Nota**:

        Este atributo está disponible con todos los controladores, no solo Oracle.





       Determina si y cómo **[null](#constant.null)** y las cadenas vacías deben ser convertidas.
       Puede tomar una de las siguientes valores:





        **[PDO::NULL_NATURAL](#pdo.constants.null-natural)**


          No se realiza ninguna conversión.




        **[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string)**


          Las cadenas vacías son convertidas en **[null](#constant.null)**.




        **[PDO::NULL_TO_STRING](#pdo.constants.null-to-string)**


          **[null](#constant.null)** es convertido en cadena vacía.







     **[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches)**


       Controla si los valores recuperados (excepto **[null](#constant.null)**) son convertidos en strings.
       Acepta un valor de tipo [bool](#language.types.boolean): **[true](#constant.true)** para activar y **[false](#constant.false)**
       para desactivar (valor por omisión).
       Los valores **[null](#constant.null)** permanecen inalterados, excepto si **[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls)**
       está definido en **[PDO::NULL_TO_STRING](#pdo.constants.null-to-string)**.






     **[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class)**


       Configura la clase de resultado derivada de [PDOStatement](#class.pdostatement)
       y definida por el usuario.

       Requiere array(string classname, array(mixed constructor_args)).



      **Precaución**

        No puede ser utilizado con las instancias persistentes de PDO.







     **[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout)**


       Especifica la duración del tiempo límite en segundos.
       Toma un valor de tipo [int](#language.types.integer).



      **Nota**:



        No todos los controladores soportan esta opción, y su significado puede
        diferir en función de los controladores. Por ejemplo, SQLite esperará durante
        este período para obtener un bloqueo de escritura, pero otros controladores
        pueden interpretar esto como un tiempo límite de conexión o de lectura.







     **[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit)**

      **Nota**:

        Disponible únicamente para los controladores OCI, Firebird y MySQL.





       Determina si cada consulta es autocommit.
       Toma un valor de tipo [bool](#language.types.boolean): **[true](#constant.true)** para activar y
       **[false](#constant.false)** para desactivar. Por omisión, **[true](#constant.true)**.






     **[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares)**

      **Nota**:

        Disponible únicamente para los controladores OCI, Firebird y MySQL.





       Configura la activación o desactivación de las consultas preparadas emuladas.
       Algunos controladores no soportan las consultas preparadas nativamente o
       tienen un soporte limitado.
       Si se define en **[true](#constant.true)** PDO siempre emulará las consultas preparadas,
       de lo contrario PDO intentará utilizar las consultas preparadas nativas.
       En el caso de que el controlador no pueda preparar la consulta actual,
       PDO siempre recaerá en la emulación de consultas preparadas.






     **[PDO::MYSQL_ATTR_USE_BUFFERED_QUERY](#pdo.constants.mysql-attr-use-buffered-query)**

      **Nota**:

        Disponible únicamente para el controlador MySQL.





       Configura el uso de consultas con búfer.
       Toma un valor de tipo [bool](#language.types.boolean): **[true](#constant.true)** para activar y
       **[false](#constant.false)** para desactivar. Por omisión, **[true](#constant.true)**.






     **[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode)**


       Define el modo de recuperación.
       Una descripción de los modos y cómo utilizarlos está disponible en
       la documentación de [PDOStatement::fetch()](#pdostatement.fetch).





### Parámetros

     attribute


       El atributo a modificar.






     value


       El valor al que definir el attribute,
       esto puede requerir un tipo específico dependiendo del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [PDO::getAttribute()](#pdo.getattribute) - Recupera un atributo de una conexión a una base de datos

    - [PDOStatement::getAttribute()](#pdostatement.getattribute) - Recupera un atributo de consulta

    - [PDOStatement::setAttribute()](#pdostatement.setattribute) - Establece un atributo de consulta

## Tabla de contenidos

- [PDO::beginTransaction](#pdo.begintransaction) — Inicia una transacción
- [PDO::commit](#pdo.commit) — Valida una transacción
- [PDO::connect](#pdo.connect) — Conecta a una base de datos y devuelve una subclase PDO para los controladores que lo soportan
- [PDO::\_\_construct](#pdo.construct) — Crea una instancia PDO que representa una conexión a la base de datos
- [PDO::errorCode](#pdo.errorcode) — Devuelve el SQLSTATE asociado con la última operación sobre la base de datos
- [PDO::errorInfo](#pdo.errorinfo) — Devuelve las informaciones asociadas al error durante
  la última operación sobre la base de datos
- [PDO::exec](#pdo.exec) — Ejecuta una consulta SQL y devuelve el número de filas afectadas
- [PDO::getAttribute](#pdo.getattribute) — Recupera un atributo de una conexión a una base de datos
- [PDO::getAvailableDrivers](#pdo.getavailabledrivers) — Devuelve la lista de controladores PDO disponibles
- [PDO::inTransaction](#pdo.intransaction) — Verifica si se encuentra en una transacción
- [PDO::lastInsertId](#pdo.lastinsertid) — Devuelve el identificador de la última fila insertada o el valor de una secuencia
- [PDO::prepare](#pdo.prepare) — Prepara una consulta para su ejecución y devuelve un objeto
- [PDO::query](#pdo.query) — Prepara y ejecuta una consulta SQL sin marcadores de sustitución
- [PDO::quote](#pdo.quote) — Protege una cadena para usarla en una consulta SQL PDO
- [PDO::rollBack](#pdo.rollback) — Anula una transacción
- [PDO::setAttribute](#pdo.setattribute) — Configura un atributo PDO

# La clase PDOStatement

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 1.0.0)

## Introducción

    Representa una consulta preparada y, una vez ejecutada, el conjunto de resultados
    asociado.

## Sinopsis de la Clase

     class **PDOStatement**



     implements
      [IteratorAggregate](#class.iteratoraggregate) {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$queryString](#pdostatement.props.querystring);


    /* Métodos */

    public [bindColumn](#pdostatement.bindcolumn)(

    [string](#language.types.string)|[int](#language.types.integer) $column,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $type = PDO::PARAM_STR,
    [int](#language.types.integer) $maxLength = 0,
    [mixed](#language.types.mixed) $driverOptions = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [bindParam](#pdostatement.bindparam)(
    [string](#language.types.string)|[int](#language.types.integer) $param,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $type = PDO::PARAM_STR,
    [int](#language.types.integer) $maxLength = 0,
    [mixed](#language.types.mixed) $driverOptions = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [bindValue](#pdostatement.bindvalue)([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $type = PDO::PARAM_STR): [bool](#language.types.boolean)
public [closeCursor](#pdostatement.closecursor)(): [bool](#language.types.boolean)
public [columnCount](#pdostatement.columncount)(): [int](#language.types.integer)
public [debugDumpParams](#pdostatement.debugdumpparams)(): [?](#language.types.null)[bool](#language.types.boolean)
public [errorCode](#pdostatement.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [errorInfo](#pdostatement.errorinfo)(): [array](#language.types.array)
public [execute](#pdostatement.execute)([?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [bool](#language.types.boolean)
public [fetch](#pdostatement.fetch)([int](#language.types.integer) $mode = PDO::FETCH_DEFAULT, [int](#language.types.integer) $cursorOrientation = PDO::FETCH_ORI_NEXT, [int](#language.types.integer) $cursorOffset = 0): [mixed](#language.types.mixed)
public [fetchAll](#pdostatement.fetchall)([int](#language.types.integer) $mode = PDO::FETCH_DEFAULT): [array](#language.types.array)
public [fetchAll](#pdostatement.fetchall)([int](#language.types.integer) $mode = PDO::FETCH_COLUMN, [int](#language.types.integer) $column): [array](#language.types.array)
public [fetchAll](#pdostatement.fetchall)([int](#language.types.integer) $mode = PDO::FETCH_CLASS, [string](#language.types.string) $class, [?](#language.types.null)[array](#language.types.array) $constructorArgs): [array](#language.types.array)
public [fetchAll](#pdostatement.fetchall)([int](#language.types.integer) $mode = PDO::FETCH_FUNC, [callable](#language.types.callable) $callback): [array](#language.types.array)
public [fetchColumn](#pdostatement.fetchcolumn)([int](#language.types.integer) $column = 0): [mixed](#language.types.mixed)
public [fetchObject](#pdostatement.fetchobject)([?](#language.types.null)[string](#language.types.string) $class = "stdClass", [array](#language.types.array) $constructorArgs = []): [object](#language.types.object)|[false](#language.types.singleton)
public [getAttribute](#pdostatement.getattribute)([int](#language.types.integer) $name): [mixed](#language.types.mixed)
public [getColumnMeta](#pdostatement.getcolumnmeta)([int](#language.types.integer) $column): [array](#language.types.array)|[false](#language.types.singleton)
public [getIterator](#pdostatement.getiterator)(): [Iterator](#class.iterator)
public [nextRowset](#pdostatement.nextrowset)(): [bool](#language.types.boolean)
public [rowCount](#pdostatement.rowcount)(): [int](#language.types.integer)
public [setAttribute](#pdostatement.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)
public [setFetchMode](#pdostatement.setfetchmode)([int](#language.types.integer) $mode): [bool](#language.types.boolean)
public [setFetchMode](#pdostatement.setfetchmode)([int](#language.types.integer) $mode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [bool](#language.types.boolean)
public [setFetchMode](#pdostatement.setfetchmode)([int](#language.types.integer) $mode = PDO::FETCH_CLASS, [string](#language.types.string) $class, [?](#language.types.null)[array](#language.types.array) $constructorArgs = **[null](#constant.null)**): [bool](#language.types.boolean)
public [setFetchMode](#pdostatement.setfetchmode)([int](#language.types.integer) $mode = PDO::FETCH_INTO, [object](#language.types.object) $object): [bool](#language.types.boolean)

}

## Propiedades

     queryString


       [string](#language.types.string) utilizada para la consulta.





## Historial de cambios

       Versión
       Descripción






       8.0.0

        La clase **PDOStatement** implementa ahora
        [IteratorAggregate](#class.iteratoraggregate) en lugar de [Traversable](#class.traversable).





# PDOStatement::bindColumn

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::bindColumn —
Vincula una columna a una variable PHP

### Descripción

    public **PDOStatement::bindColumn**(

    [string](#language.types.string)|[int](#language.types.integer) $column,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $type = PDO::PARAM_STR,
    [int](#language.types.integer) $maxLength = 0,
    [mixed](#language.types.mixed) $driverOptions = **[null](#constant.null)**
): [bool](#language.types.boolean)

    **PDOStatement::bindColumn()** permite que una
    variable PHP se vincule a una columna específica en el conjunto de resultados
    de una consulta. Cada llamada a la función
    [PDOStatement::fetch()](#pdostatement.fetch) o
    [PDOStatement::fetchAll()](#pdostatement.fetchall) actualiza todas las variables
    vinculadas a las columnas.

**Nota**:

    Dado que la información sobre las columnas no siempre está disponible
    para PDO hasta que la consulta se ejecuta, las aplicaciones portables
    deben llamar a esta función *después*
    de la función [PDOStatement::execute()](#pdostatement.execute).




    Sin embargo, para vincular una columna de tipo LOB con un flujo
    al utilizar el *controlador PostGreSQL*,
    las aplicaciones deben llamar a este método
    *antes* de llamar
    [PDOStatement::execute()](#pdostatement.execute), de lo contrario se recibirá
    el objeto OID en forma de [int](#language.types.integer).

### Parámetros

     column


       Número de la columna (comenzando en 1) o nombre de la columna en
       el conjunto de resultados. Si se utilizan los nombres de columnas,
       asegúrese de que el nombre coincida con la casilla de la columna, como
       se devuelve por el controlador.






     var


       Nombre de la variable PHP a la que se debe vincular la columna.






    type


       Tipo del argumento, especificado por las constantes
       [PDO::PARAM_*](#pdo.constants).






     maxLength


       Una sugerencia para la preasignación.






     driverOptions


       Argumentos opcionales para la biblioteca.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Vincula la visualización del conjunto de resultados a variables PHP**



     Vincular las columnas del conjunto de resultados a variables PHP es una forma
     conveniente de hacer que los datos contenidos en cada fila
     estén inmediatamente disponibles para la aplicación. El siguiente
     ejemplo muestra cómo PDO permite vincular y recuperar las columnas
     con una variedad de opciones.

&lt;?php
$stmt = $dbh-&gt;prepare('SELECT name, colour, calories FROM fruit');
$stmt-&gt;execute();

/_ Vincula por los números de columnas _/
$stmt-&gt;bindColumn(1, $name);
$stmt-&gt;bindColumn(2, $colour);

/_ Vincula por los nombres de columnas _/
$stmt-&gt;bindColumn('calories', $cals);
while ($stmt-&gt;fetch(PDO::FETCH_BOUND)) {
print $name . "\t" . $colour . "\t" . $cals . "\n";
}
readData($dbh);
?&gt;

    Resultado del ejemplo anterior es similar a:

pomme rouge 150
banane jaune 175
kiwi vert 75
orange orange 150
mangue rouge 200
fraise rouge 25

### Ver también

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

    - [PDOStatement::fetchAll()](#pdostatement.fetchall) - Recupera las líneas restantes de un conjunto de resultados

    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn) - Devuelve una columna de la siguiente fila de un conjunto de resultados

# PDOStatement::bindParam

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::bindParam —
Vincula un parámetro a una variable específica

### Descripción

public **PDOStatement::bindParam**(
    [string](#language.types.string)|[int](#language.types.integer) $param,
    [mixed](#language.types.mixed) &amp;$var,
    [int](#language.types.integer) $type = PDO::PARAM_STR,
    [int](#language.types.integer) $maxLength = 0,
    [mixed](#language.types.mixed) $driverOptions = **[null](#constant.null)**
): [bool](#language.types.boolean)

Vincula una variable PHP a un marcador nombrado o interrogativo correspondiente en una
consulta SQL utilizada para preparar la consulta. A diferencia de
[PDOStatement::bindValue()](#pdostatement.bindvalue), la variable es vinculada como
referencia y solo será evaluada en el momento de la llamada a la función
[PDOStatement::execute()](#pdostatement.execute).

La mayoría de los parámetros son parámetros de entrada, y son utilizados
en modo solo lectura para construir la consulta (aunque pueden ser convertidos
según el data_type). Algunos drivers soportan la invocación de
procedimientos almacenados que retornan datos como parámetros de salida, y algunos otros
como parámetros de entrada/salida que son enviados juntos y actualizados para recibirlos.

### Parámetros

     param


       Identificador. Para una consulta preparada utilizando
       marcadores nombrados, será el nombre del parámetro
       en la forma :name. Para
       una consulta preparada utilizando marcadores interrogativos,
       será la posición indexada +1 del parámetro.






     var


       Nombre de la variable PHP a vincular al parámetro de la consulta SQL.






     type


       Tipo explícito de datos para el parámetro utilizando las constantes
       [PDO::PARAM_*](#pdo.constants).
       Para retornar un parámetro INOUT desde un procedimiento
       almacenado, se utiliza el operador OR para definir el byte **[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output)**
       para el parámetro type.






     maxLength


       Longitud del tipo de datos. Para indicar que un
       parámetro es un parámetro OUT desde un procedimiento almacenado,
       se debe definir explícitamente la longitud.
       Significativo únicamente cuando el parámetro type
       es **[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output)**.






     driverOptions








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

**Ejemplo #1
Ejecución de una consulta preparada con emplazamientos nombrados
**

&lt;?php
/_ Ejecución de una consulta preparada vinculando variables PHP _/
$calories = 150;
$couleur = 'rouge';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; :calories AND couleur = :couleur');
$sth-&gt;bindParam('calories', $calories, PDO::PARAM_INT);
/* Los nombres también pueden ser prefijados con dos puntos ":" (opcional) */
$sth-&gt;bindParam(':couleur', $couleur, PDO::PARAM_STR);
$sth-&gt;execute();
?&gt;

**Ejemplo #2
Ejecución de una consulta preparada con marcadores de
posicionamiento
**

&lt;?php
/_ Ejecución de una consulta preparada vinculando variables PHP _/
$calories = 150;
$couleur = 'rouge';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; ? AND couleur = ?');
$sth-&gt;bindParam(1, $calories, PDO::PARAM_INT);
$sth-&gt;bindParam(2, $couleur, PDO::PARAM_STR);
$sth-&gt;execute();
?&gt;

**Ejemplo #3 Llamada a un procedimiento almacenado con un parámetro INOUT**

&lt;?php
/_ Llamada a un procedimiento almacenado con un parámetro INOUT _/
$couleur = 'rouge';
$sth = $dbh-&gt;prepare('CALL puree_fruit(?)');
$sth-&gt;bindParam(1, $couleur, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);
$sth-&gt;execute();
print "Después de haber prensado la fruta, el color es: $couleur";
?&gt;

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::bindValue()](#pdostatement.bindvalue) - Asocia un valor a un parámetro

# PDOStatement::bindValue

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 1.0.0)

PDOStatement::bindValue —
Asocia un valor a un parámetro

### Descripción

public **PDOStatement::bindValue**([string](#language.types.string)|[int](#language.types.integer) $param, [mixed](#language.types.mixed) $value, [int](#language.types.integer) $type = PDO::PARAM_STR): [bool](#language.types.boolean)

Asocia un valor a un nombre correspondiente o a un punto de interrogación
(como parámetro ficticio) en la consulta SQL que se ha utilizado para
preparar la consulta.

### Parámetros

     param


        Identificador del parámetro. Para una consulta preparada utilizando los
        marcadores, esto será un nombre de parámetro de la forma
        :nombre. Para una consulta preparada utilizando los
        puntos de interrogación (como parámetro ficticio), esto será un
        array indexado numéricamente que comienza en la posición 1 del parámetro.






     value


        El valor a asociar al parámetro.






     type


        Tipo de datos explícito para el parámetro utilizando las constantes
        [PDO::PARAM_*](#pdo.constants).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

**Ejemplo #1 Ejecutar una consulta preparada con marcadores nombrados**

&lt;?php
/_ Ejecutar una consulta preparada asociando variables PHP _/
$calorias = 150;
$color = 'rojo';
$sth = $dbh-&gt;prepare('SELECT nombre, color, calorias
FROM fruta
WHERE calorias &lt; :calorias AND color = :color');

/_ Definir el valor de un parámetro utilizando su nombre _/
$sth-&gt;bindValue('calorias', $calorias, PDO::PARAM_INT);
/* Opcionalmente, los nombres de los parámetros pueden ser prefijados con dos puntos ": " */
$sth-&gt;bindValue(':color', $color, PDO::PARAM_STR);
$sth-&gt;execute();
?&gt;

**Ejemplo #2 Ejecutar una consulta preparada con puntos de interrogación como parámetro ficticio**

&lt;?php
/_ Ejecutar una consulta preparada asociando variables PHP _/
$calorias = 150;
$color = 'rojo';
$sth = $dbh-&gt;prepare('SELECT nombre, color, calorias
    FROM fruta
    WHERE calorias &lt; ? AND color = ?');
$sth-&gt;bindValue(1, $calorias, PDO::PARAM_INT);
$sth-&gt;bindValue(2, $color, PDO::PARAM_STR);
$sth-&gt;execute();
?&gt;

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::bindParam()](#pdostatement.bindparam) - Vincula un parámetro a una variable específica

# PDOStatement::closeCursor

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.9.0)

PDOStatement::closeCursor —
Cierra el cursor, permitiendo que la consulta pueda ser ejecutada de nuevo

### Descripción

public **PDOStatement::closeCursor**(): [bool](#language.types.boolean)

**PDOStatement::closeCursor()** libera la conexión
al servidor, permitiendo así que otras consultas SQL puedan ser ejecutadas, pero
deja la consulta en un estado que permite su ejecución posterior.

Este método es útil para los drivers de bases de datos que no soportan
la ejecución de objetos PDOStatement cuando un objeto PDOStatement ejecutado
previamente aún tiene filas no recuperadas. Si su driver de base de datos sufre
de esta limitación, el problema se manifestará por sí mismo en un error fuera de secuencia.

**PDOStatement::closeCursor()** se implementa bien
como un método específico del driver con máxima eficiencia, o como una solución genérica
si no se ha instalado ninguna función específica del driver.
Semánticamente, la función genérica PDO equivale
a escribir el siguiente código en su script PHP:

&lt;?php
do {
while ($stmt-&gt;fetch())
        ;
    if (!$stmt-&gt;nextRowset())
break;
} while (true);
?&gt;

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con PDOStatement::closeCursor()**



     En el siguiente ejemplo, el objeto PDOStatement $stmt
     devuelve múltiples filas, pero la aplicación recupera únicamente
     la primera fila, dejando el objeto PDOStatement en un estado donde aún quedan
     filas no recuperadas. Para asegurar que la aplicación funcione
     con todos los drivers de bases de datos, el autor inserta una llamada a la función
     **PDOStatement::closeCursor()** en
     $stmt antes de la ejecución del objeto PDOStatement
     $otherStmt.

&lt;?php
/_ Creación de un objeto PDOStatement _/
$stmt = $dbh-&gt;prepare('SELECT foo FROM bar');

/_ Creación de un segundo objeto PDOStatement _/
$otherStmt = $dbh-&gt;prepare('SELECT foobaz FROM foobar');

/_ Ejecución de la primera consulta _/
$stmt-&gt;execute();

/_ Recuperación de la primera fila únicamente desde el resultado _/
$stmt-&gt;fetch();

/_ La siguiente llamada a closeCursor() puede ser requerida por algunos drivers _/
$stmt-&gt;closeCursor();

/_ Ahora, podemos ejecutar la segunda consulta _/
$otherStmt-&gt;execute();
?&gt;

### Ver también

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

# PDOStatement::columnCount

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::columnCount —
Devuelve el número de columnas en el conjunto de resultados

### Descripción

public **PDOStatement::columnCount**(): [int](#language.types.integer)

Utilice la función **PDOStatement::columnCount()**
para devolver el número de columnas en el conjunto de resultados representado
por el objeto PDOStatement.

Si el objeto PDOStatement ha sido devuelto por la función
[PDO::query()](#pdo.query), el número de columnas es
inmediatamente disponible.

Si el objeto PDOStatement ha sido devuelto por la función
[PDO::prepare()](#pdo.prepare), un conteo preciso de las columnas
no estará disponible hasta que se invoque la función
[PDOStatement::execute()](#pdostatement.execute).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de columnas en el conjunto de resultados representado por
el objeto PDOStatement, incluso si el conjunto de resultados está vacío. Si no hay
conjunto de resultados, **PDOStatement::columnCount()**
devolverá 0.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Conteo de columnas**



     Este ejemplo demuestra cómo
     **PDOStatement::columnCount()** funciona
     con o sin conjunto de resultados.

&lt;?php
$dbh = new PDO('odbc:sample', 'db2inst1', 'ibmdb2');

$sth = $dbh-&gt;prepare("SELECT nom, couleur FROM fruit");

/_ Cuenta el número de columnas en el conjunto de resultados (no existente) _/
$colcount = $sth-&gt;columnCount();
print "Antes de execute(), el conjunto de resultados tenía $colcount columnas (debería ser 0)\n";

$sth-&gt;execute();

/_ Cuenta el número de columnas en el conjunto de resultados _/
$colcount = $sth-&gt;columnCount();
print "Después de execute(), el conjunto de resultados tiene $colcount columnas (debería ser 2)\n";

?&gt;

    El ejemplo anterior mostrará:

Antes de execute(), el conjunto de resultados tenía 0 columnas (debería ser 0)
Después de execute(), el conjunto de resultados tiene 2 columnas (debería ser 2)

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::rowCount()](#pdostatement.rowcount) - Devuelve el número de filas afectadas por la última

llamada a la función PDOStatement::execute()

# PDOStatement::debugDumpParams

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.9.0)

PDOStatement::debugDumpParams —
Detalla una instrucción SQL preparada

### Descripción

public **PDOStatement::debugDumpParams**(): [?](#language.types.null)[bool](#language.types.boolean)

Detalla la información contenida en una instrucción preparada,
directamente en la salida estándar. La información incluye
la consulta SQL utilizada, el número de parámetros
usados (Params), la lista de parámetros, con
el nombre de clave o su posición, su nombre, su posición en la consulta
(si esta última información no es soportada por el controlador PDO,
es siempre -1), un tipo (param_type) en forma de entero,
y un valor booleano is_param.

Esta es una función de depuración, que muestra directamente información
en la salida estándar.

**Sugerencia**
Al igual que con todas las funciones que muestran directamente resultados al navegador, las
[funciones de gestión de salida](#book.outcontrol) pueden ser utilizadas para capturar la salida
de esta función y almacenarla en un string (por ejemplo).

Los parámetros mostrados son aquellos que han sido añadidos en la consulta
hasta el momento de la llamada. Los parámetros adicionales son ignorados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[null](#constant.null)**, o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        **PDOStatement::debugDumpParams()** ahora devuelve
        el SQL enviado a la base de datos, incluyendo la consulta
        completa, RAW (incluyendo los marcadores de posición reemplazados con sus
        valores delimitados). Tenga en cuenta que esto solo estará disponible si
        las instrucciones preparadas emuladas están activadas.





### Ejemplos

**Ejemplo #1 Ejemplo con PDOStatement::debugDumpParams()** y parámetros nombrados

&lt;?php
/_ ejecución de una instrucción preparada con enlace a variables PHP _/
$calories = 150;
$colour = 'red';
$sth = $dbh-&gt;prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories &lt; :calories AND colour = :colour');
$sth-&gt;bindParam(':calories', $calories, PDO::PARAM_INT);
$sth-&gt;bindValue(':colour', $colour, PDO::PARAM_STR, 12);
$sth-&gt;execute();

$sth-&gt;debugDumpParams();

?&gt;

El ejemplo anterior mostrará:

SQL: [96] SELECT name, colour, calories
FROM fruit
WHERE calories &lt; :calories AND colour = :colour
Params: 2
Key: Name: [9] :calories
paramno=-1
name=[9] ":calories"
is_param=1
param_type=1
Key: Name: [7] :colour
paramno=-1
name=[7] ":colour"
is_param=1
param_type=2

**Ejemplo #2 Ejemplo con PDOStatement::debugDumpParams()** y parámetros anónimos

&lt;?php

/_ ejecución de una instrucción preparada con enlace a variables PHP _/
$calories = 150;
$colour = 'red';
$name = 'apple';

$sth = $dbh-&gt;prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories &lt; ? AND colour = ?');
$sth-&gt;bindParam(1, $calories, PDO::PARAM_INT);
$sth-&gt;bindValue(2, $colour, PDO::PARAM_STR);
$sth-&gt;execute();

$sth-&gt;debugDumpParams();

?&gt;

El ejemplo anterior mostrará:

SQL: [82] SELECT name, colour, calories
FROM fruit
WHERE calories &lt; ? AND colour = ?
Params: 2
Key: Position #0:
paramno=0
name=[0] ""
is_param=1
param_type=1
Key: Position #1:
paramno=1
name=[0] ""
is_param=1
param_type=2

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::bindParam()](#pdostatement.bindparam) - Vincula un parámetro a una variable específica

    - [PDOStatement::bindValue()](#pdostatement.bindvalue) - Asocia un valor a un parámetro

# PDOStatement::errorCode

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::errorCode —
Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

### Descripción

public **PDOStatement::errorCode**(): [?](#language.types.null)[string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Idéntico a [PDO::errorCode()](#pdo.errorcode), excepto que
**PDOStatement::errorCode()** recupera únicamente
los códigos de error para las operaciones sobre los objetos PDOStatement.

### Ejemplos

    **Ejemplo #1 Determina la categoría del error que ocurre**

&lt;?php
/_ Provoca un error -- la tabla BONES no existe _/
$err = $dbh-&gt;prepare('SELECT skull FROM bones');
$err-&gt;execute();

echo "\nPDOStatement::errorCode(): ";
print $err-&gt;errorCode();
?&gt;

    El ejemplo anterior mostrará:

PDOStatement::errorCode(): 42S02

### Ver también

    - [PDO::errorCode()](#pdo.errorcode) - Devuelve el SQLSTATE asociado con la última operación sobre la base de datos

    - [PDO::errorInfo()](#pdo.errorinfo) - Devuelve las informaciones asociadas al error durante

la última operación sobre la base de datos

    - [PDOStatement::errorInfo()](#pdostatement.errorinfo) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

# PDOStatement::errorInfo

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::errorInfo —
Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

### Descripción

public **PDOStatement::errorInfo**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**PDOStatement::errorInfo()** devuelve un array que contiene
informaciones sobre el error ocurrido durante la última operación ejecutada
por este gestor de consultas. El array contiene los siguientes campos:

       Elemento
       Información






       0
       Código de error SQLSTATE (un identificador de cinco caracteres
       alfanuméricos definido en el estándar ANSI SQL)



       1
       Código de error específico del driver.



       2
       Mensaje de error específico del driver.




### Ejemplos

    **Ejemplo #1 Muestra los campos de errorInfo()** para una conexión
    PDO_ODBC sobre una base de datos DB2

&lt;?php
/_ Provoca un error -- la tabla BONES no existe _/
$sth = $dbh-&gt;prepare('SELECT skull FROM bones');
$sth-&gt;execute();

echo "\nPDOStatement::errorInfo():\n";
$arr = $sth-&gt;errorInfo();
print_r($arr);
?&gt;

    El ejemplo anterior mostrará:

PDOStatement::errorInfo():
Array
(
[0] =&gt; 42S02
[1] =&gt; -204
[2] =&gt; [IBM][CLI Driver][DB2/LINUX] SQL0204N "DANIELS.BONES" is an undefined name. SQLSTATE=42704
)

### Ver también

    - [PDO::errorCode()](#pdo.errorcode) - Devuelve el SQLSTATE asociado con la última operación sobre la base de datos

    - [PDO::errorInfo()](#pdo.errorinfo) - Devuelve las informaciones asociadas al error durante

la última operación sobre la base de datos

    - [PDOStatement::errorCode()](#pdostatement.errorcode) - Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta

# PDOStatement::execute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::execute —
Ejecuta una consulta preparada

### Descripción

public **PDOStatement::execute**([?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [bool](#language.types.boolean)

Ejecuta una [consulta preparada](#pdo.prepared-statements).
Si la consulta preparada incluye marcadores de posición, se puede:

    - [PDOStatement::bindParam()](#pdostatement.bindparam) y/o
     [PDOStatement::bindValue()](#pdostatement.bindvalue) debe ser llamado para vincular
     variables o valores (respectivamente) a los marcadores de parámetros.
     Las variables vinculadas pasan sus valores en entrada y reciben los
     valores de salida, si los hay, de sus respectivos marcadores de posición



    -
     o pasar un array de valores de parámetros, solo en entrada

### Parámetros

     params


       Un array de valores con tantos elementos como parámetros a asociar en la consulta SQL que será ejecutada.
       Todos los valores son tratados como constantes
       **[PDO::PARAM_STR](#pdo.constants.param-str)**.




       Los valores múltiples no pueden ser vinculados a un solo parámetro; por
       ejemplo, no está permitido vincular dos valores a un solo parámetro
       nombrado en una cláusula IN().




       Vincular más valores de los especificados no es posible; si hay
       más claves en params que en el
       código SQL utilizado para [PDO::prepare()](#pdo.prepare), entonces la
       consulta preparada fallará y se generará un error.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

**Ejemplo #1 Ejecuta una consulta preparada con variables y valores vinculados**

&lt;?php
/_ Ejecuta una consulta preparada vinculando variables y valores _/
$calories = 150;
$couleur = 'ver';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; :calories AND couleur LIKE :couleur');
$sth-&gt;bindParam('calories', $calories, PDO::PARAM_INT);
/* Los nombres también pueden ser prefijados con dos puntos ":" (opcional) */
$sth-&gt;bindValue(':colour', "%$colour%");
$sth-&gt;execute();
?&gt;

**Ejemplo #2 Ejecuta una consulta preparada con un array de valores nombrados**

&lt;?php
/_ Ejecuta una consulta preparada pasando un array de valores _/
$calories = 150;
$couleur = 'rouge';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; :calories AND couleur = :couleur');
$sth-&gt;execute(array('calories' =&gt; $calories, 'colour' =&gt; $couleur));
/* Las claves del array también pueden ser prefijadas con dos puntos ":" (opcional) */
$sth-&gt;execute(array(':calories' =&gt; $calories, ':couleur' =&gt; $couleur));
?&gt;

**Ejemplo #3 Ejecuta una consulta preparada con un array de valores posicionales**

&lt;?php
/_ Ejecuta una consulta preparada pasando un array de valores _/
$calories = 150;
$colour = 'rouge';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; ? AND couleur = ?');
$sth-&gt;execute(array($calories, $colour));
?&gt;

**Ejemplo #4 Ejecuta una consulta preparada con variables vinculadas a un marcador de posición**

&lt;?php
/_ Ejecuta una consulta preparada vinculando variables PHP _/
$calories = 150;
$couleur = 'rouge';
$sth = $dbh-&gt;prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories &lt; ? AND couleur = ?');
$sth-&gt;bindParam(1, $calories, PDO::PARAM_INT);
$sth-&gt;bindParam(2, $couleur, PDO::PARAM_STR, 12);
$sth-&gt;execute();
?&gt;

**Ejemplo #5 Ejecuta una consulta preparada utilizando un array para las cláusulas IN**

&lt;?php
/_ Ejecuta una consulta preparada utilizando un array de valores para las cláusulas IN _/
$params = array(1, 21, 63, 171);
/* Crea una cadena para los marcadores */
$place_holders = '?' . str_repeat(', ?', count($params) - 1);

/_
Este fragmento de código prepara la consulta con suficientes marcadores para cada valor
del array $params. Los valores del array $params son luego vinculados a los marcadores
de la consulta preparada cuando la consulta es ejecutada. Esto no es lo mismo
que utilizar el método PDOStatement::bindParam() ya que este impone una referencia
hacia los valores. El método PDOStatement::execute() solo vincula por valor.
_/
$sth = $dbh-&gt;prepare("SELECT id, name FROM contacts WHERE id IN ($place_holders)");
$sth-&gt;execute($params);
?&gt;

### Notas

**Nota**:

    Algunos drivers requieren [cerrar
    el cursor](#pdostatement.closecursor) antes de ejecutar la siguiente consulta.

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::bindParam()](#pdostatement.bindparam) - Vincula un parámetro a una variable específica

    - [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

    - [PDOStatement::fetchAll()](#pdostatement.fetchall) - Recupera las líneas restantes de un conjunto de resultados

    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn) - Devuelve una columna de la siguiente fila de un conjunto de resultados

# PDOStatement::fetch

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::fetch —
Recupera la siguiente línea de un conjunto de resultados PDO

### Descripción

public **PDOStatement::fetch**([int](#language.types.integer) $mode = PDO::FETCH_DEFAULT, [int](#language.types.integer) $cursorOrientation = PDO::FETCH_ORI_NEXT, [int](#language.types.integer) $cursorOffset = 0): [mixed](#language.types.mixed)

Recupera una línea desde un conjunto de resultados asociado al objeto
PDOStatement. El argumento
mode determina la forma en que PDO devuelve
la línea.

### Parámetros

     mode


       Controla cómo se devolverá la siguiente línea al llamante. Este valor
       debe ser una de las constantes PDO::FETCH_*,
       y por omisión, vale la constante PDO::ATTR_DEFAULT_FETCH_MODE
       (que por omisión vale la constante PDO::FETCH_BOTH).



        -
         PDO::FETCH_ASSOC: devuelve un array indexado por el nombre
         de la columna como se devuelve en el conjunto de resultados




        -
         PDO::FETCH_BOTH (por omisión): devuelve un array indexado
         por los nombres de columnas y también por los números de columnas,
         comenzando en el índice 0, como se devuelve en el conjunto de resultados




        -
         PDO::FETCH_BOUND: devuelve **[true](#constant.true)** y asigna los valores
         de las columnas de su conjunto de resultados en las variables PHP a las que
         están vinculadas con el método
         [PDOStatement::bindColumn()](#pdostatement.bindcolumn)




        -
         PDO::FETCH_CLASS: devuelve una nueva instancia
         de la clase solicitada. El objeto se inicializa mapeando las columnas del conjunto de resultados a
         las propiedades de la clase. Este proceso ocurre antes de que se llame al
         constructor, permitiendo la población de las propiedades, independientemente de su
         visibilidad o de su marca como readonly. Si
         una propiedad no existe en la clase, se invocará el método mágico
         [__set()](#object.set)
         si existe; de lo contrario, se creará una propiedad pública dinámica.
         Sin embargo, cuando **[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late)**
         también está especificado, el constructor se llama *antes* de
         que las propiedades sean pobladas.




        -
         PDO::FETCH_INTO : actualiza una instancia existente
         de la clase solicitada, vinculando las columnas del conjunto de resultados a los nombres de las propiedades
         de la clase




        -
         PDO::FETCH_LAZY : combina
         PDO::FETCH_BOTH y PDO::FETCH_OBJ,
         y devuelve un objeto [PDORow](#class.pdorow)
         que crea los nombres de propiedad del objeto a medida que se acceden.




        -
         PDO::FETCH_NAMED : devuelve un array de la misma
         forma que PDO::FETCH_ASSOC, excepto que si hay
         múltiples columnas con los mismos nombres, el valor apuntado por esta clave
         será un array de todas las valores de la línea que tiene ese nombre como columna




        -
         PDO::FETCH_NUM : devuelve un array indexado por el
         número de la columna como se devuelve en su conjunto de resultados,
         comenzando en 0




        -
         PDO::FETCH_OBJ : devuelve un objeto anónimo con los
         nombres de propiedades que corresponden a los nombres de las columnas devueltas en el
         conjunto de resultados




        -
         PDO::FETCH_PROPS_LATE : cuando se usa con
         PDO::FETCH_CLASS, el constructor de la clase es
         llamado antes de que las propiedades sean asignadas a partir de los
         valores de columna respectivos.









     cursorOrientation


       Para un objeto PDOStatement que representa un cursor desplazable,
       este valor determina qué línea se devolverá al llamante.
       Este valor debe ser una de las constantes
       PDO::FETCH_ORI_*, y por omisión, vale
       PDO::FETCH_ORI_NEXT. Para solicitar un cursor
       desplazable para su objeto PDOStatement, debe definir
       el atributo PDO::ATTR_CURSOR a PDO::CURSOR_SCROLL
       cuando prepare la consulta SQL con la función
       [PDO::prepare()](#pdo.prepare).






     cursorOffset


       Para un objeto PDOStatement que representa un cursor desplazable para
       el cual el argumento cursorOrientation está definido
       a PDO::FETCH_ORI_ABS, este valor especifica
       el número absoluto de la línea en el conjunto de resultados que debe ser
       recuperada.




       Para un objeto PDOStatement que representa un cursor desplazable para
       el cual el argumento cursorOrientation está definido
       a PDO::FETCH_ORI_REL, este valor especifica la línea
       a recuperar relativamente a la posición del cursor antes de la llamada a la función
       **PDOStatement::fetch()**.





### Valores devueltos

El valor devuelto por esta función en caso de éxito depende del tipo recuperado.
En todos los casos, **[false](#constant.false)** se devuelve si ocurre un error o si no hay más líneas.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Recuperación de líneas utilizando diferentes métodos**

&lt;?php
$sth = $dbh-&gt;prepare("SELECT nom, couleur FROM fruit");
$sth-&gt;execute();

/_ estilos PDOStatement::fetch _/
print "PDO::FETCH_ASSOC: ";
print "Devuelve la siguiente línea como un array indexado por el nombre de las columnas\n";
$result = $sth-&gt;fetch(PDO::FETCH_ASSOC);
print_r($result);
print "\n";

print "PDO::FETCH_BOTH: ";
print "Devuelve la siguiente línea como un array indexado por el nombre y el número de la columna\n";
$result = $sth-&gt;fetch(PDO::FETCH_BOTH);
print_r($result);
print "\n";

print "PDO::FETCH_LAZY: ";
print "Devuelve la siguiente línea como objeto PDORow con los nombres de columnas como propiedades\n";
$result = $sth-&gt;fetch(PDO::FETCH_LAZY);
print_r($result);
print "\n";

print "PDO::FETCH_OBJ: ";
print "Devuelve la siguiente línea como objeto anónimo con los nombres de columnas como propiedades\n";
$result = $sth-&gt;fetch(PDO::FETCH_OBJ);
print $result-&gt;name;
print "\n";
?&gt;

    El ejemplo anterior mostrará:

PDO::FETCH_ASSOC: Devuelve la siguiente línea como un array indexado por el nombre de las columnas
Array
(
[nom] =&gt; apple
[couleur] =&gt; red
)

PDO::FETCH_BOTH: Devuelve la siguiente línea como un array indexado por el nombre y el número de la columna
Array
(
[nom] =&gt; banana
[0] =&gt; banana
[couleur] =&gt; yellow
[1] =&gt; yellow
)

PDO::FETCH_LAZY: Devuelve la siguiente línea como objeto PDORow con los nombres de columnas como propiedades PDORow Object
(
[nom] =&gt; orange
[couleur] =&gt; orange
)

PDO::FETCH_OBJ: Devuelve la siguiente línea como objeto anónimo con los nombres de columnas como propiedades kiwi

    **Ejemplo #2 Recuperación de líneas con un cursor desplazable**

&lt;?php
function readDataForwards($dbh) {
    $sql = 'SELECT hand, won, bet FROM mynumbers ORDER BY BET';
    $stmt = $dbh-&gt;prepare($sql, array(PDO::ATTR_CURSOR =&gt; PDO::CURSOR_SCROLL));
$stmt-&gt;execute();
    while ($row = $stmt-&gt;fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
        print $data;
    }
}
function readDataBackwards($dbh) {
$sql = 'SELECT hand, won, bet FROM mynumbers ORDER BY bet';
    $stmt = $dbh-&gt;prepare($sql, array(PDO::ATTR_CURSOR =&gt; PDO::CURSOR_SCROLL));
$stmt-&gt;execute();
    $row = $stmt-&gt;fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
    do {
        $data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
        print $data;
    } while ($row = $stmt-&gt;fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
}

print "Lectura hacia adelante :\n";
readDataForwards($conn);

print "Lectura hacia atrás :\n";
readDataBackwards($conn);
?&gt;

    El ejemplo anterior mostrará:

Lectura hacia adelante :
21 10 5
16 0 5
19 20 10

Lectura hacia atrás :
19 20 10
16 0 5
21 10 5

**Ejemplo #3 Orden de construcción**

     Cuando los objetos son recuperados mediante **[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**,
     las propiedades del objeto se asignan primero, luego se llama al constructor
     de la clase. Sin embargo, cuando **[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late)** también está especificado,
     este orden se invierte, es decir, el constructor se llama primero, luego
     las propiedades son asignadas.

&lt;?php
class Person
{
private $name;

    public function __construct()
    {
        $this-&gt;tell();
    }

    public function tell()
    {
        if (isset($this-&gt;name)) {
            echo "Soy {$this-&gt;name}.\n";
        } else {
            echo "Aún no tengo nombre.\n";
        }
    }

}

$sth = $dbh-&gt;query("SELECT * FROM people");
$sth-&gt;setFetchMode(PDO::FETCH_CLASS, 'Person');
$person = $sth-&gt;fetch();
$person-&gt;tell();
$sth-&gt;setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Person');
$person = $sth-&gt;fetch();
$person-&gt;tell();
?&gt;

    Resultado del ejemplo anterior es similar a:

Soy Alice.
Soy Alice.
Aún no tengo nombre.
Soy Bob.

### Ver también

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::fetchAll()](#pdostatement.fetchall) - Recupera las líneas restantes de un conjunto de resultados

    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn) - Devuelve una columna de la siguiente fila de un conjunto de resultados

    - [PDOStatement::fetchObject()](#pdostatement.fetchobject) - Recupera la siguiente línea y la devuelve como objeto

    - [PDOStatement::setFetchMode()](#pdostatement.setfetchmode) - Establece el modo de recuperación por defecto para esta consulta

# PDOStatement::fetchAll

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::fetchAll —
Recupera las líneas restantes de un conjunto de resultados

### Descripción

public **PDOStatement::fetchAll**([int](#language.types.integer) $mode = PDO::FETCH_DEFAULT): [array](#language.types.array)

public **PDOStatement::fetchAll**([int](#language.types.integer) $mode = PDO::FETCH_COLUMN, [int](#language.types.integer) $column): [array](#language.types.array)

public **PDOStatement::fetchAll**([int](#language.types.integer) $mode = PDO::FETCH_CLASS, [string](#language.types.string) $class, [?](#language.types.null)[array](#language.types.array) $constructorArgs): [array](#language.types.array)

public **PDOStatement::fetchAll**([int](#language.types.integer) $mode = PDO::FETCH_FUNC, [callable](#language.types.callable) $callback): [array](#language.types.array)

### Parámetros

     mode


       Controla el contenido del array retornado como se documenta en la función
       [PDOStatement::fetch()](#pdostatement.fetch).
       Valor por omisión: **[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode)**
       (que toma su valor por omisión de **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)**).




       Para retornar un array que contenga todos los valores de una sola columna
       desde el conjunto de resultados, se especifica **[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)**.
       Puede especificarse qué columna se desea con el argumento
       column.




       Para indexar el array resultante por el valor de una cierta columna (en lugar de por números
       consecutivos), se coloca el nombre de esta columna en primer lugar en la lista de columnas en SQL, y
       se utiliza **[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique)**. Esta columna debe contener únicamente valores únicos, de lo contrario se perderán algunos datos.




       Para agrupar los resultados en forma de un array de tres dimensiones indexado por los valores
       de una columna especificada, se coloca el nombre de esta columna en primer lugar en la lista de columnas
       en SQL y se utiliza **[PDO::FETCH_GROUP](#pdo.constants.fetch-group)**.




       Para agrupar los resultados en forma de un array de dos dimensiones,
       se utiliza un OU a nivel de bits con **[PDO::FETCH_GROUP](#pdo.constants.fetch-group)** y
       **[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)**.
       Los resultados serán agrupados por la primera columna, el valor del elemento del array
       siendo una lista de entradas correspondientes de la segunda columna.






    Los argumentos siguientes son dinámicos y dependen del modo de recuperación.
    No pueden ser utilizados con argumentos nombrados.


     column


       Utilizado con **[PDO::FETCH_COLUMN](#pdo.constants.fetch-column)**.
       Retorna la columna indicada indexada a 0.






     class


       Utilizado con **[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**. Retorna instancias de la clase
       especificada, haciendo corresponder las columnas de cada línea a propiedades nombradas en la clase.






     constructorArgs


       Argumentos del constructor personalizado de la clase cuando el argumento mode
       es **[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**.






     callback


       Utilizado con **[PDO::FETCH_FUNC](#pdo.constants.fetch-func)**. Retorna los resultados de la llamada de la
       función especificada, utilizando las columnas de cada línea como argumentos en la llamada.





### Valores devueltos

**PDOStatement::fetchAll()** retorna un array que contiene
todas las líneas del conjunto de registros. El array representa cada línea
como un array de valores de las columnas, o un objeto con propiedades
correspondientes a cada nombre de columna.
Un array vacío es retornado si no hay resultados.

El uso de este método para recuperar grandes conjuntos de resultados
puede aumentar el uso de recursos del sistema, pero también estos recursos.
En lugar de recuperar todas las datos y manipularlas con PHP,
se utiliza el servidor de base de datos para manipular los conjuntos de resultados.
Por ejemplo, se utilizan las cláusulas WHERE y
ORDER BY en las consultas SQL para restringir los resultados
antes de recuperarlos y procesarlos con PHP.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Este método retorna ahora siempre un [array](#language.types.array),
       anteriormente **[false](#constant.false)** podía ser retornado en caso de fallo.



### Ejemplos

    **Ejemplo #1 Recuperación de todas las líneas de un conjunto de resultados**

&lt;?php
$sth = $dbh-&gt;prepare("SELECT nom, couleur FROM fruit");
$sth-&gt;execute();

/_ Recuperación de todas las líneas de un conjunto de resultados _/
print "Recuperación de todas las líneas de un conjunto de resultados :\n";
$result = $sth-&gt;fetchAll();
print_r($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

Recuperación de todas las líneas de un conjunto de resultados :
Array
(
[0] =&gt; Array
(
[nom] =&gt; apple
[0] =&gt; apple
[couleur] =&gt; red
[1] =&gt; red
)

    [1] =&gt; Array
        (
            [nom] =&gt; pear
            [0] =&gt; pear
            [couleur] =&gt; green
            [1] =&gt; green
        )

    [2] =&gt; Array
        (
            [nom] =&gt; watermelon
            [0] =&gt; watermelon
            [couleur] =&gt; pink
            [1] =&gt; pink
        )

)

    **Ejemplo #2 Recuperación de todos los valores de una sola columna desde un conjunto de resultados**



     El siguiente ejemplo muestra cómo retornar todos los valores
     de una sola columna desde un conjunto de resultados, incluso si la consulta SQL
     retorna varias columnas por líneas.

&lt;?php
$sth = $dbh-&gt;prepare("SELECT name, colour FROM fruit");
$sth-&gt;execute();

/_ Recuperación de todos los valores de la primera columna _/
$result = $sth-&gt;fetchAll(PDO::FETCH_COLUMN, 0);
var_dump($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array(3)
(
[0] =&gt;
string(5) =&gt; apple
[1] =&gt;
string(4) =&gt; pear
[2] =&gt;
string(10) =&gt; watermelon
)

    **Ejemplo #3 Agrupar todos los valores de una sola columna**



     El siguiente ejemplo muestra cómo retornar un array asociativo
     agrupado por los valores de la columna especificada de un conjunto de resultados.
     El array contiene tres claves: los valores apple
     y pear son retornados en forma de arrays
     que contienen dos colores diferentes, mientras que
     watermelon es retornado en forma de un array
     que contiene únicamente un solo color.

&lt;?php
$insert = $dbh-&gt;prepare("INSERT INTO fruit(name, colour) VALUES (?, ?)");
$insert-&gt;execute(array('apple', 'green'));
$insert-&gt;execute(array('pear', 'yellow'));

$sth = $dbh-&gt;prepare("SELECT name, colour FROM fruit");
$sth-&gt;execute();

/_ Agrupar los valores de la primera columna _/
var_dump($sth-&gt;fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP));
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
["apple"]=&gt;
array(2) {
[0]=&gt;
string(5) "green"
[1]=&gt;
string(3) "red"
}
["pear"]=&gt;
array(2) {
[0]=&gt;
string(5) "green"
[1]=&gt;
string(6) "yellow"
}
["watermelon"]=&gt;
array(1) {
[0]=&gt;
string(5) "pink"
}
}

**Ejemplo #4 Instanciar una clase para cada resultado**

     El siguiente ejemplo muestra el comportamiento de
     **[PDO::FETCH_CLASS](#pdo.constants.fetch-class)**.

&lt;?php
class fruit {
public $name;
public $colour;
}

$sth = $dbh-&gt;prepare("SELECT name, colour FROM fruit");
$sth-&gt;execute();

$result = $sth-&gt;fetchAll(PDO::FETCH_CLASS, "fruit");
var_dump($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
object(fruit)#1 (2) {
["name"]=&gt;
string(5) "apple"
["colour"]=&gt;
string(5) "green"
}
[1]=&gt;
object(fruit)#2 (2) {
["name"]=&gt;
string(4) "pear"
["colour"]=&gt;
string(6) "yellow"
}
[2]=&gt;
object(fruit)#3 (2) {
["name"]=&gt;
string(10) "watermelon"
["colour"]=&gt;
string(4) "pink"
}
[3]=&gt;
object(fruit)#4 (2) {
["name"]=&gt;
string(5) "apple"
["colour"]=&gt;
string(3) "red"
}
[4]=&gt;
object(fruit)#5 (2) {
["name"]=&gt;
string(4) "pear"
["colour"]=&gt;
string(5) "green"
}
}

**Ejemplo #5 Llamada de una función para cada resultado**

     El siguiente ejemplo muestra el comportamiento de
     **[PDO::FETCH_FUNC](#pdo.constants.fetch-func)**.

&lt;?php
function fruit($name, $colour) {
    return "{$name}: {$colour}";
}

$sth = $dbh-&gt;prepare("SELECT name, colour FROM fruit");
$sth-&gt;execute();

$result = $sth-&gt;fetchAll(PDO::FETCH_FUNC, "fruit");
var_dump($result);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
string(12) "apple: green"
[1]=&gt;
string(12) "pear: yellow"
[2]=&gt;
string(16) "watermelon: pink"
[3]=&gt;
string(10) "apple: red"
[4]=&gt;
string(11) "pear: green"
}

### Ver también

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

    - [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn) - Devuelve una columna de la siguiente fila de un conjunto de resultados

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::setFetchMode()](#pdostatement.setfetchmode) - Establece el modo de recuperación por defecto para esta consulta

# PDOStatement::fetchColumn

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.9.0)

PDOStatement::fetchColumn —
Devuelve una columna de la siguiente fila de un conjunto de resultados

### Descripción

public **PDOStatement::fetchColumn**([int](#language.types.integer) $column = 0): [mixed](#language.types.mixed)

    Devuelve una columna de la siguiente fila de un conjunto de resultados o **[false](#constant.false)**
    si no hay más filas.

**Nota**:

    **PDOStatement::fetchColumn()** no debe usarse para
    recuperar columnas que contengan valores booleanos, ya que no es posible
    distinguir un valor **[false](#constant.false)** de un retorno sin filas para recuperar.
    Utilice [PDOStatement::fetch()](#pdostatement.fetch) en su lugar.

### Parámetros

     column


       Número de la columna que se desea recuperar de la fila (comenzando en 0).
       Si no se proporciona ningún valor,
       **PDOStatement::fetchColumn()** recuperará
       la primera columna.





### Valores devueltos

**PDOStatement::fetchColumn()** devuelve una columna
de la siguiente fila de un conjunto de resultados o **[false](#constant.false)** si no hay más filas.

**Advertencia**

    No existe solución para recuperar otra columna de la misma fila
    si se utiliza la función **PDOStatement::fetchColumn()**
    para obtener los datos.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Devuelve la primera columna de la siguiente fila**

&lt;?php
$sth = $dbh-&gt;prepare("SELECT nom, couleur FROM fruit");
$sth-&gt;execute();

/_ Recupera la primera columna de la primera fila de un conjunto de resultados _/
print "Recupera la primera columna de la primera fila de un conjunto de resultados :\n";
$result = $sth-&gt;fetchColumn();
print "nom=$result\n");

print "Recupera la segunda columna de la segunda fila de un conjunto de resultados :\n";
$result = $sth-&gt;fetchColumn(1);
print "couleur=$result\n";
?&gt;

    El ejemplo anterior mostrará:

Recupera la primera columna de la primera fila de un conjunto de resultados :
nom=lemon
Recupera la segunda columna de la segunda fila de un conjunto de resultados :
couleur=orange

### Ver también

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

    - [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

    - [PDOStatement::fetchAll()](#pdostatement.fetchall) - Recupera las líneas restantes de un conjunto de resultados

    - [PDO::prepare()](#pdo.prepare) - Prepara una consulta para su ejecución y devuelve un objeto

    - [PDOStatement::setFetchMode()](#pdostatement.setfetchmode) - Establece el modo de recuperación por defecto para esta consulta

# PDOStatement::fetchObject

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.4)

PDOStatement::fetchObject — Recupera la siguiente línea y la devuelve como objeto

### Descripción

public **PDOStatement::fetchObject**([?](#language.types.null)[string](#language.types.string) $class = "stdClass", [array](#language.types.array) $constructorArgs = []): [object](#language.types.object)|[false](#language.types.singleton)

Recupera la siguiente línea y la devuelve como objeto. Esta función
es una alternativa a [PDOStatement::fetch()](#pdostatement.fetch) con
**[PDO::FETCH_CLASS](#pdo.constants.fetch-class)** o el estilo
**[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)**.

Cuando se recupera un objeto, sus propiedades son asignadas a partir de los
valores de columna respectivos, y luego se llama a su constructor.

### Parámetros

     class


       Nombre de la clase creada.






     constructorArgs


       Los elementos de este array son pasados al constructor.





### Valores devueltos

Devuelve una instancia de la clase solicitada con propiedades de nombres que
corresponden a los nombres de las columnas o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ver también

    - [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

# PDOStatement::getAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::getAttribute —
Recupera un atributo de consulta

### Descripción

public **PDOStatement::getAttribute**([int](#language.types.integer) $name): [mixed](#language.types.mixed)

Recupera un atributo de la consulta. Actualmente, no existen atributos genéricos, sino
especificaciones del driver:

    - PDO::ATTR_CURSOR_NAME
      (especificación de Firebird y ODBC):
      Recupera el nombre del cursor para UPDATE ... WHERE CURRENT OF.


Tenga en cuenta que los atributos específicos del controlador _no deben_
utilizarse con otros controladores.

### Parámetros

     name


       El atributo a consultar.





### Valores devueltos

Devuelve el valor del atributo.

### Ver también

    - [PDO::getAttribute()](#pdo.getattribute) - Recupera un atributo de una conexión a una base de datos

    - [PDO::setAttribute()](#pdo.setattribute) - Configura un atributo PDO

    - [PDOStatement::setAttribute()](#pdostatement.setattribute) - Establece un atributo de consulta

# PDOStatement::getColumnMeta

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::getColumnMeta —
Devuelve las metadatos para una columna de un conjunto de resultados

### Descripción

public **PDOStatement::getColumnMeta**([int](#language.types.integer) $column): [array](#language.types.array)|[false](#language.types.singleton)

Recupera las metadatos para una columna de un conjunto de resultados
en un array asociativo.

**Advertencia**

    Algunos controladores pueden no implementar la función
    **PDOStatement::getColumnMeta()**, ya que es opcional.
    Sin embargo, todos los [controladores PDO](#pdo.drivers)
    documentados en el manual implementan esta función.

### Parámetros

     column


        El nombre de la columna en el conjunto de resultados.






### Valores devueltos

Devuelve un array asociativo que contiene los siguientes valores representando las metadatos
para una columna:

   <caption>**Metadatos de una columna**</caption>
   
    <col>
    <col>
    
     
      Nombre
      Valor


      native_type
      El tipo nativo de PHP utilizado para representar el valor de la columna.



      driver:decl_type
      El tipo SQL utilizado para representar el valor de la columna en la base de datos.
       Si la columna del conjunto de resultados es el resultado de una función, este valor
       no es devuelto por la función **PDOStatement::getColumnMeta()**.




      flags
      Cualquier flag definido para esta columna.



      name
      El nombre de esta columna, como es devuelto por la base de datos.



      table
      El nombre de la tabla de esta columna, tal como es devuelto por la base de datos.



      len
      La longitud de esta columna. Normalmente, -1
       para tipos distintos a los números decimales de punto flotante.



      precision
      La precisión numérica para esta columna. Normalmente,
       0 para tipos distintos a los números decimales de punto flotante.



      pdo_type
      El tipo de esta columna como es representado por la constante
       [PDO::PARAM_*](#pdo.constants).


Devuelve **[false](#constant.false)** si la columna solicitada no existe en el conjunto de resultados,
o si no existe ningún conjunto de resultados.

### Ejemplos

    **Ejemplo #1 Recuperación de las metadatos para una columna**



     El siguiente ejemplo muestra el resultado de la recuperación de las metadatos
     para una columna generada por una función (COUNT) en un controlador
     PDO_SQLITE.

&lt;?php
$select = $DB-&gt;query('SELECT COUNT(*) FROM fruit');
$meta = $select-&gt;getColumnMeta(0);
var_dump($meta);
?&gt;

    El ejemplo anterior mostrará:

array(6) {
["native_type"]=&gt;
string(7) "integer"
["flags"]=&gt;
array(0) {
}
["name"]=&gt;
string(8) "COUNT(\*)"
["len"]=&gt;
int(-1)
["precision"]=&gt;
int(0)
["pdo_type"]=&gt;
int(2)
}

### Ver también

    - [PDOStatement::columnCount()](#pdostatement.columncount) - Devuelve el número de columnas en el conjunto de resultados

    - [PDOStatement::rowCount()](#pdostatement.rowcount) - Devuelve el número de filas afectadas por la última

llamada a la función PDOStatement::execute()

# PDOStatement::getIterator

(PHP 8)

PDOStatement::getIterator — Devuelve un iterador sobre el conjunto de resultados

### Descripción

public **PDOStatement::getIterator**(): [Iterator](#class.iterator)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# PDOStatement::nextRowset

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::nextRowset —
Avance al siguiente conjunto de resultados de un manejador de conjuntos de resultados múltiples

### Descripción

public **PDOStatement::nextRowset**(): [bool](#language.types.boolean)

Algunas bases de datos soportan procedimientos almacenados que retornan
más de un conjunto de resultados (también conocido como juegos de resultados).
**PDOStatement::nextRowset()** permite
acceder al segundo y siguientes conjuntos de resultados asociados con el objeto
PDOStatement. Cada conjunto de resultados tiene diferentes juegos de columnas
desde el conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Recuperación de múltiples conjuntos de resultados retornados por un procedimiento almacenado**



     El siguiente ejemplo muestra cómo llamar a un procedimiento almacenado,
     MULTIPLE_ROWSETS, que retorna tres conjuntos de resultados.
     Un ciclo [do-while](#control-structures.do.while)
     es utilizado para recorrer el método
     **PDOStatement::nextRowset()**, que retorna **[false](#constant.false)** y
     termina el ciclo cuando no hay más conjuntos de resultados disponibles.

&lt;?php
$sql = 'CALL multiple_rowsets()';
$stmt = $conn-&gt;query($sql);
$i = 1;
do {
    $rowset = $stmt-&gt;fetchAll(PDO::FETCH_NUM);
    if ($rowset) {
printResultSet($rowset, $i);
    }
    $i++;
} while ($stmt-&gt;nextRowset());

function printResultSet(&amp;$rowset, $i) {
    print "Conjunto de resultados $i:\n";
    foreach ($rowset as $row) {
        foreach ($row as $col) {
print $col . "\t";
}
print "\n";
}
print "\n";
}
?&gt;

    El ejemplo anterior mostrará:

Conjunto de resultados 1:
apple red
banana yellow

Conjunto de resultados 2:
orange orange 150
banana yellow 175

Conjunto de resultados 3:
lime green
apple red
banana yellow

### Ver también

    - [PDOStatement::columnCount()](#pdostatement.columncount) - Devuelve el número de columnas en el conjunto de resultados

    - [PDOStatement::execute()](#pdostatement.execute) - Ejecuta una consulta preparada

    - [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) - Devuelve las metadatos para una columna de un conjunto de resultados

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

# PDOStatement::rowCount

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.1.0)

PDOStatement::rowCount —
Devuelve el número de filas afectadas por la última
llamada a la función PDOStatement::execute()

### Descripción

public **PDOStatement::rowCount**(): [int](#language.types.integer)

**PDOStatement::rowCount()** devuelve el número de filas
afectadas por la última consulta DELETE, INSERT o UPDATE ejecutada por
el objeto PDOStatement correspondiente.

Si la última consulta SQL ejecutada por el objeto PDOStatement
asociado es una consulta de tipo SELECT, algunas bases de datos
devolverán el número de filas devueltas por dicha consulta. No obstante,
este comportamiento no está garantizado para todas las bases de datos
y no debería ser utilizado para aplicaciones portables.

**Nota**:

    Este método siempre devuelve "0" (cero) con el controlador PostgreSQL,
    cuando el atributo de declaración
    **[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor)** está definido como
    **[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de filas.

### Errores/Excepciones

Emite un error de nivel **[E_WARNING](#constant.e-warning)** si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning)**.

Lanza una excepción [PDOException](#class.pdoexception) si el atributo **[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode)** está definido
a **[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception)**.

### Ejemplos

    **Ejemplo #1 Devuelve el número de filas eliminadas**



     **PDOStatement::rowCount()** devuelve
     el número de filas afectadas por una consulta DELETE, INSERT,
     o UPDATE.

&lt;?php
/_ Eliminación de todas las filas de la tabla FRUIT _/
$del = $dbh-&gt;prepare('DELETE FROM fruit');
$del-&gt;execute();

/_ Devuelve el número de filas eliminadas _/
print "Devuelve el número de filas eliminadas :\n";
$count = $del-&gt;rowCount();
print "Eliminación de $count filas.\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

Devuelve el número de filas eliminadas :
Eliminación de 9 filas.

     **Ejemplo #2 Conteo de filas devueltas por una consulta SELECT**



      Para la mayoría de las bases de datos, **PDOStatement::rowCount()**
      no devuelve el número de filas afectadas por una consulta SELECT.
      En su lugar, utilice [PDO::query()](#pdo.query) para hacer una consulta
      SELECT COUNT(*), luego utilice [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn)
      para recuperar el número de filas correspondientes.





&lt;?php
$sql = "SELECT COUNT(*) FROM fruit WHERE calories &gt; 100";
$res = $conn-&gt;query($sql);
$count = $res-&gt;fetchColumn();

print "Hay " . $count . " fila(s) correspondiente(s).";
?&gt;

    Resultado del ejemplo anterior es similar a:




Hay 2 fila(s) correspondiente(s).

### Ver también

    - [PDOStatement::columnCount()](#pdostatement.columncount) - Devuelve el número de columnas en el conjunto de resultados

    - [PDOStatement::fetchColumn()](#pdostatement.fetchcolumn) - Devuelve una columna de la siguiente fila de un conjunto de resultados

    - [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

# PDOStatement::setAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::setAttribute —
Establece un atributo de consulta

### Descripción

public **PDOStatement::setAttribute**([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Establece un atributo de la consulta. Actualmente, no se definen atributos genéricos, sino
especificaciones del driver:

    - PDO::ATTR_CURSOR_NAME
      (especificidad de Firebird y ODBC):
      Establece el nombre del cursor para UPDATE ... WHERE CURRENT OF.


Tenga en cuenta que los atributos específicos del controlador _no deben_
utilizarse con otros controladores.

### Parámetros

     attribute


       El atributo a modificar.






     value


       El valor para establecer el attribute,
       puede requerir un tipo específico según el atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [PDO::getAttribute()](#pdo.getattribute) - Recupera un atributo de una conexión a una base de datos

    - [PDO::setAttribute()](#pdo.setattribute) - Configura un atributo PDO

    - [PDOStatement::getAttribute()](#pdostatement.getattribute) - Recupera un atributo de consulta

# PDOStatement::setFetchMode

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 0.2.0)

PDOStatement::setFetchMode —
Establece el modo de recuperación por defecto para esta consulta

### Descripción

public **PDOStatement::setFetchMode**([int](#language.types.integer) $mode): [bool](#language.types.boolean)

public **PDOStatement::setFetchMode**([int](#language.types.integer) $mode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [bool](#language.types.boolean)

public **PDOStatement::setFetchMode**([int](#language.types.integer) $mode = PDO::FETCH_CLASS, [string](#language.types.string) $class, [?](#language.types.null)[array](#language.types.array) $constructorArgs = **[null](#constant.null)**): [bool](#language.types.boolean)

public **PDOStatement::setFetchMode**([int](#language.types.integer) $mode = PDO::FETCH_INTO, [object](#language.types.object) $object): [bool](#language.types.boolean)

### Parámetros

     mode


       El modo de recuperación debe ser una de las constantes
       [**<a href="#pdo.constants.fetch-default">PDO::FETCH_*](#pdo.constants)**</a>.






     colno


       Número de la columna.






    class


       Nombre de la clase.






     constructorArgs


       Argumentos del constructor.






     object


       Objeto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Definición del modo de recuperación**



     El siguiente ejemplo muestra cómo
     **PDOStatement::setFetchMode()** modifica
     el modo de recuperación por defecto para un objeto PDOStatement.

&lt;?php
$stmt = $dbh-&gt;query('SELECT name, colour, calories FROM fruit');
$stmt-&gt;setFetchMode(PDO::FETCH_NUM);
foreach ($stmt as $row) {
print $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

apple red 150
banana yellow 250
orange orange 300
kiwi brown 75
lemon yellow 25
pear green 150

## Tabla de contenidos

- [PDOStatement::bindColumn](#pdostatement.bindcolumn) — Vincula una columna a una variable PHP
- [PDOStatement::bindParam](#pdostatement.bindparam) — Vincula un parámetro a una variable específica
- [PDOStatement::bindValue](#pdostatement.bindvalue) — Asocia un valor a un parámetro
- [PDOStatement::closeCursor](#pdostatement.closecursor) — Cierra el cursor, permitiendo que la consulta pueda ser ejecutada de nuevo
- [PDOStatement::columnCount](#pdostatement.columncount) — Devuelve el número de columnas en el conjunto de resultados
- [PDOStatement::debugDumpParams](#pdostatement.debugdumpparams) — Detalla una instrucción SQL preparada
- [PDOStatement::errorCode](#pdostatement.errorcode) — Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta
- [PDOStatement::errorInfo](#pdostatement.errorinfo) — Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta
- [PDOStatement::execute](#pdostatement.execute) — Ejecuta una consulta preparada
- [PDOStatement::fetch](#pdostatement.fetch) — Recupera la siguiente línea de un conjunto de resultados PDO
- [PDOStatement::fetchAll](#pdostatement.fetchall) — Recupera las líneas restantes de un conjunto de resultados
- [PDOStatement::fetchColumn](#pdostatement.fetchcolumn) — Devuelve una columna de la siguiente fila de un conjunto de resultados
- [PDOStatement::fetchObject](#pdostatement.fetchobject) — Recupera la siguiente línea y la devuelve como objeto
- [PDOStatement::getAttribute](#pdostatement.getattribute) — Recupera un atributo de consulta
- [PDOStatement::getColumnMeta](#pdostatement.getcolumnmeta) — Devuelve las metadatos para una columna de un conjunto de resultados
- [PDOStatement::getIterator](#pdostatement.getiterator) — Devuelve un iterador sobre el conjunto de resultados
- [PDOStatement::nextRowset](#pdostatement.nextrowset) — Avance al siguiente conjunto de resultados de un manejador de conjuntos de resultados múltiples
- [PDOStatement::rowCount](#pdostatement.rowcount) — Devuelve el número de filas afectadas por la última
  llamada a la función PDOStatement::execute()
- [PDOStatement::setAttribute](#pdostatement.setattribute) — Establece un atributo de consulta
- [PDOStatement::setFetchMode](#pdostatement.setfetchmode) — Establece el modo de recuperación por defecto para esta consulta

# La clase PDORow

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo &gt;= 1.0.0)

## Introducción

    Representa una línea de un conjunto de resultados devuelto
    por [PDOStatement::fetch()](#pdostatement.fetch)
    llamado con el modo de recuperación **[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy)**.




    Los objetos de esta clase no pueden ser instanciados y no son serializables.




    La clase **PDORow** permite acceder a los
    datos devueltos como si los modos **[PDO::FETCH_OBJ](#pdo.constants.fetch-obj)**
    y **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)** fueran utilizados.
    Esto significa que los datos devueltos pueden ser accedidos como propiedades de objeto,
    y como un array indexado por el nombre de la columna y un número de posición de columna.

**Precaución**

     Acceder a una propiedad no definida devuelve **[null](#constant.null)**
     sin emitir un mensaje de advertencia.

## Sinopsis de la Clase

     final
     class **PDORow**
     {
    /* Propiedades */

     public
     [string](#language.types.string)
      [$queryString](#pdorow.props.querystring);

}

## Propiedades

     queryString


       La consulta utilizada por [PDOStatement](#class.pdostatement)
       que ha devuelto el objeto **PDORow**.





## Errores/Excepciones

    Genera un error de tipo [Error](#class.error) cuando se intenta
    escribir o [unset()](#function.unset) una propiedad.

# La clase [PDOException](#class.pdoexception)

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Representa un error emitido por PDO. No debe lanzarse
    una excepción **PDOException** desde
    el propio código. Ver el capítulo sobre las
    [excepciones](#language.exceptions)
    para obtener más información sobre las excepciones en PHP.

## Sinopsis de la Clase

     class **PDOException**



     extends
      [RuntimeException](#class.runtimeexception)
     {

    /* Propiedades */

     protected
     [int](#language.types.integer)|[string](#language.types.string)
      [$code](#pdoexception.props.code);

    public
     ?[array](#language.types.array)
      [$errorInfo](#pdoexception.props.errorinfo) = null;


    /* Propiedades heredadas */
    protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
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

## Propiedades

     errorInfo


       Corresponde a [PDO::errorInfo()](#pdo.errorinfo) o
       [PDOStatement::errorInfo()](#pdostatement.errorinfo)






     code


       Código de error SQLSTATE. Utilice el método
       [Exception::getCode()](#exception.getcode) para acceder a él.





# Controladores PDO

## Tabla de contenidos

- [Controlador PDO CUBRID](#ref.pdo-cubrid)
- [Controlador PDO MS SQL Server](#ref.pdo-dblib)
- [Pdo\Dblib](#class.pdo-dblib)
- [Controlador PDO Firebird](#ref.pdo-firebird)
- [Pdo\Firebird](#class.pdo-firebird)
- [Controlador PDO IBM](#ref.pdo-ibm)
- [Controlador PDO Informix](#ref.pdo-informix)
- [Controlador PDO MySQL](#ref.pdo-mysql)
- [Pdo\Mysql](#class.pdo-mysql)
- [Controlador PDO MS SQL Server](#ref.pdo-sqlsrv)
- [Controlador PDO Oracle](#ref.pdo-oci)
- [Controladores PDO ODBC y DB2](#ref.pdo-odbc)
- [Pdo\Odbc](#class.pdo-odbc)
- [Controlador PDO PostgreSQL](#ref.pdo-pgsql)
- [Pdo\Pgsql](#class.pdo-pgsql)
- [Controlador PDO SQLite](#ref.pdo-sqlite)
- [Pdo\Sqlite](#class.pdo-sqlite)

    Los siguientes driver están actualmente implementados
    en la interfaz PDO:

         Nombre del controlador
         Bases de datos soportadas






         [PDO_CUBRID](#ref.pdo-cubrid)
         Cubrid



         [PDO_DBLIB](#ref.pdo-dblib)
         FreeTDS / Microsoft SQL Server / Sybase



         [PDO_FIREBIRD](#ref.pdo-firebird)
         Firebird



         [PDO_IBM](#ref.pdo-ibm)
         IBM DB2



         [PDO_INFORMIX](#ref.pdo-informix)
         IBM Informix Dynamic Server



         [PDO_MYSQL](#ref.pdo-mysql)
         MySQL 3.x/4.x/5.x/8.x



         [PDO_OCI](#ref.pdo-oci)
         Oracle Call Interface



         [PDO_ODBC](#ref.pdo-odbc)
         ODBC v3 (IBM DB2, unixODBC y win32 ODBC)



         [PDO_PGSQL](#ref.pdo-pgsql)
         PostgreSQL



         [PDO_SQLITE](#ref.pdo-sqlite)
         SQLite 3 y SQLite 2



         [PDO_SQLSRV](#ref.pdo-sqlsrv)
         Microsoft SQL Server / SQL Azure

# Funciones del controlador PDO CUBRID (PDO_CUBRID)

## Introducción

PDO_CUBRID es un controlador que implementa la
[interfaz PHP Data Objects (PDO)](#intro.pdo)
para permitir el acceso desde PHP a las bases de datos CUBRID.

**Nota**:

    La versión actual de PDO_CUBRID no soporta la conexión persistente en este momento.

## Instalación

Para construir la extensión PDO_CUBRID, el sistema de gestión de bases de datos CUBRID debe estar instalado
en el mismo sistema que PHP.

PDO_CUBRID es una extensión [» PECL](https://pecl.php.net/),
por lo tanto, debe seguirse las instrucciones de [Instalación de extensiones PECL](#install.pecl) para
instalar la extensión PDO_CUBRID. Ejecute el comando **configure**
para localizar el directorio base de CUBRID de la siguiente manera:

$ ./configure --with-pdo-cubrid=/path/to/CUBRID[,shared]

El comando **configure** tomará por omisión el valor de la
variable de entorno CUBRID.

No hay biblioteca DLL para esta
extensión PECL actualmente disponible. Consulte la sección
[Compilación en Windows](#install.windows.building).
Información sobre la instalación manual en Linux y Windows puede encontrarse en el archivo build-guide.html del paquete CUBRID de PECL.

## Características de PDO_CUBRID

## Cursores desplazables

    PDO_CUBRID soporta los cursores desplazables. El tipo de cursor por omisión es
    forward only, y se puede utilizar el argumento driver_options en
    [PDO::prepare()](#pdo.prepare) para cambiar el tipo de cursor.

## Tiempo límite

    PDO_CUBRID soporta la configuración del tiempo límite de ejecución de la instrucción SQL;
    se puede utilizar [PDO::setAttribute()](#pdo.setattribute) para definir el valor del tiempo límite.

## Modo autocommit y transacción

    PDO_CUBRID soporta tanto el modo autocommit como la transacción, y
    el modo autocommit está activado por omisión. Se puede utilizar
    [PDO::setAttribute()](#pdo.setattribute) para cambiar su estado.





    Si se utiliza [PDO::beginTransaction()](#pdo.begintransaction) para comenzar una
    transacción, esto desactivará automáticamente el modo autocommit y
    lo restaurará después de [PDO::commit()](#pdo.commit) o
    [PDO::rollBack()](#pdo.rollback).

**Nota**:

     Antes de desactivar el modo autocommit,
     todo trabajo pendiente es validado automáticamente.

## Instrucciones SQL múltiples

    PDO_CUBRID soporta las instrucciones SQL múltiples.
    Las instrucciones SQL múltiples están separadas por puntos y coma (;).

## Información sobre el esquema

    PDO_CUBRID implementa [PDO::cubrid_schema()](#pdo.cubrid-schema)
    para obtener información sobre el esquema.

## LOBs

    PDO_CUBRID soporta los tipos de datos BLOB/CLOB. El LOB en PDO es
    representado como un flujo, por lo que se pueden insertar LOBs vinculando un flujo,
    y obtener LOBs leyendo un flujo devuelto por CUBRID PDO.
    Por ejemplo:





    **Ejemplo #1 Insertar LOBs en CUBRID PDO**

&lt;?php
$fp = fopen('lob_test.png', 'rb');

$sql_stmt = "INSERT INTO lob_test(name, content) VALUES('lob_test.png', ?)";

$stmt = $dbh-&gt;prepare($sql_stmt);
$ret = $stmt-&gt;bindParam(1, $fp, PDO::PARAM_LOB);
$ret = $stmt-&gt;execute();
?&gt;

    **Ejemplo #2 Recuperar LOBs en CUBRID PDO**

&lt;?php
$sql_stmt = "SELECT content FROM lob_test WHERE name='lob_test.png'";

$stmt = $dbh-&gt;prepare($sql_stmt);
$stmt-&gt;execute();
$result = $stmt-&gt;fetch(PDO::FETCH_NUM);

header("Content-Type: image/png");
fpassthru($result[0]);
?&gt;

## Meta-columna

    El método [PDOStatement::getColumnMeta()](#pdostatement.getcolumnmeta) en CUBRID PDO
    devolverá un array asociativo que contiene los siguientes valores:



     - type

     - name

     - table

     - def

     - precision

     - scale

     - not_null

     - auto_increment

     - unique_key

     - multiple_key

     - primary_key

     - foreign_key

     - reverse_index

     - reverse_unique

## Tipo de datos Collection

    PDO_CUBRID soporta los tipos de datos SET/MULTISET/SEQUENCE.
    Si no se especifica el tipo de datos, el tipo de datos por omisión es char.
    Por ejemplo:





    **Ejemplo #3 Insertar un conjunto en CUBRID PDO con el tipo de datos por omisión.**

&lt;?php
$conn_str ="cubrid:dbname=demodb;host=localhost;port=33000";
$cubrid_pdo = new PDO($conn_str, 'dba', '');

$cubrid_pdo-&gt;exec("DROP TABLE if exists test_tbl");
$cubrid_pdo-&gt;exec("CREATE TABLE test_tbl (col_1 SET(VARCHAR))");

$sql_stmt_insert = "INSERT INTO test_tbl VALUES (?);";
$stmt = $cubrid_pdo-&gt;prepare($sql_stmt_insert);
$data = array("abc","def","ghi");
$ret = $stmt-&gt;bindParam(1, $data, PDO::PARAM_NULL);
$ret = $stmt-&gt;execute();
var_Dump($ret);
?&gt;

     **Ejemplo #4 Especificar el tipo de datos al insertar un conjunto en CUBRID PDO**




&lt;?php
$conn_str ="cubrid:dbname=demodb;host=localhost;port=33000";
$cubrid_pdo = new PDO($conn_str, 'dba', '');

$cubrid_pdo-&gt;exec("DROP TABLE if exists test_tbl");
$cubrid_pdo-&gt;exec("CREATE TABLE test_tbl (col_1 SET(int))");

$sql_stmt_insert = "INSERT INTO test_tbl VALUES (?);";
$stmt = $cubrid_pdo-&gt;prepare($sql_stmt_insert);
$data = array(1,2,3,4);
$ret = $stmt-&gt;bindParam(1, $data, 0,0,"int");
$ret = $stmt-&gt;execute();
var_Dump($ret);
?&gt;

     Tipos de datos CUBRID Bind para el quinto argumento de
     [PDOStatement::bindParam()](#pdostatement.bindparam):



      - CHAR

      - STRING

      - NCHAR

      - VARNCHAR

      - BIT

      - VARBIT

      - NUMERIC

      - NUMBER

      - INT

      - SHORT

      - BIGINT

      - MONETARY

      - FLOAT

      - DOUBLE

      - DATE

      - TIME

      - DATETIME

      - TIMESTAMP



## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

Las constantes siguientes pueden ser utilizadas para configurar los atributos
de la base de datos. Pueden ser pasadas al método
[PDO::getAttribute()](#pdo.getattribute) o al método
[PDO::setAttribute()](#pdo.setattribute).

   <caption>**Banderas para los atributos PDO::CUBRID**</caption>
    
     
      
       Constante
       Descripción


       **[PDO::CUBRID_ATTR_ISOLATION_LEVEL](#pdo.constants.cubrid-attr-isolation-level)**
       El nivel de aislamiento de la transacción para la conexión a la base de datos.



       **[PDO::CUBRID_ATTR_LOCK_TIMEOUT](#pdo.constants.cubrid-attr-lock-timeout)**
       Tiempo de expiración de la transacción en segundos.



       **[PDO::CUBRID_ATTR_MAX_STRING_LENGTH](#pdo.constants.cubrid-attr-max-string-length)**
       Solo lectura. La longitud máxima del string para los
        tipos de datos bit, varbit, char, varchar, nchar, nvarchar
        al utilizar la API CUBRID PDO.




Las constantes siguientes pueden ser utilizadas al configurar
el nivel de aislamiento de la transacción. Pueden ser pasadas al
método [PDO::getAttribute()](#pdo.getattribute) o al método
[PDO::setAttribute()](#pdo.setattribute).

   <caption>**Banderas para el nivel de aislamiento PDO::CUBRID**</caption>
    
     
      
       Constante
       Descripción


       **[PDO::TRAN_COMMIT_CLASS_UNCOMMIT_INSTANCE](#pdo.constants.tran-commit-class-uncommit-instance)**
       El nivel de aislamiento más bajo (1). Una lectura
        no fiable, no reproducible o fantasma puede ocurrir sobre
        el tuple, pero también una lectura no reproducible puede
        ocurrir para la tabla.



       **[PDO::TRAN_COMMIT_CLASS_COMMIT_INSTANCE](#pdo.constants.tran-commit-class-commit-instance)**
       Un nivel de aislamiento relativamente bajo (2). Una lectura
        no fiable no puede ocurrir, pero una lectura
        no reproducible o fantasma puede ocurrir.



       **[PDO::TRAN_REP_CLASS_UNCOMMIT_INSTANCE](#pdo.constants.tran-rep-class-uncommit-instance)**
       El nivel de aislamiento por defecto para CUBRID (3).
        Una lectura no fiable o fantasma puede ocurrir sobre el tuple,
        pero la reproducibilidad de la lectura está asegurada sobre la tabla.



       **[PDO::TRAN_REP_CLASS_COMMIT_INSTANCE](#pdo.constants.tran-rep-class-commit-instance)**
       Un nivel de aislamiento relativamente bajo (4). Una lectura
        no fiable no puede ocurrir, pero las lecturas no reproducibles
        o fantasma pueden ocurrir.



       **[PDO::TRAN_REP_CLASS_REP_INSTANCE](#pdo.constants.tran-rep-class-rep-instance)**
       Un nivel de aislamiento relativamente alto (5). Las
        lecturas no fiables o no reproducibles no pueden
        ocurrir, pero una lectura fantasma es posible.



       **[PDO::TRAN_SERIALIZABLE](#pdo.constants.tran-serializable)**
       El nivel de aislamiento más alto (6). Los problemas
        relacionados con la concurrencia (i.e. lectura no fiable, lectura
        no reproducible, lectura fantasma, etc...) no pueden ocurrir.




Las constantes siguientes pueden ser utilizadas para recuperar
la información sobre el esquema. Pueden ser pasadas
a la función [PDO::cubrid_schema()](#pdo.cubrid-schema).

   <caption>**Banderas para el esquema CUBRID**</caption>
    
     
      
       Constante
       Descripción


       **[PDO::CUBRID_SCH_TABLE](#pdo.constants.cubrid-sch-table)**
       Recupera el nombre y el tipo de tabla CUBRID.



       **[PDO::CUBRID_SCH_VIEW](#pdo.constants.cubrid-sch-view)**
       Recupera el nombre y el tipo de vista en CUBRID.



       **[PDO::CUBRID_SCH_QUERY_SPEC](#pdo.constants.cubrid-sch-query-spec)**
       Recupera la definición de la consulta de la vista.



       **[PDO::CUBRID_SCH_ATTRIBUTE](#pdo.constants.cubrid-sch-attribute)**
       Recupera los atributos de la columna de la tabla.



       **[PDO::CUBRID_SCH_TABLE_ATTRIBUTE](#pdo.constants.cubrid-sch-table-attribute)**
       Recupera los atributos de la tabla.



       **[PDO::CUBRID_SCH_METHOD](#pdo.constants.cubrid-sch-method)**
       Recupera el método de la instancia. Es un método llamado
        por la instancia de la clase. Se utiliza más a menudo que el
        método de la clase ya que la mayoría de las operaciones se ejecutan
        en la instancia.



       **[PDO::CUBRID_SCH_TABLE_METHOD](#pdo.constants.cubrid-sch-table-method)**
       Recupera el método de la clase. Es un método llamado
        por un objeto de la clase. Se utiliza habitualmente
        para crear una nueva instancia de la clase o para inicializarla.
        También se utiliza para acceder o actualizar los atributos
        de la clase.



       **[PDO::CUBRID_SCH_METHOD_FILE](#pdo.constants.cubrid-sch-method-file)**
       Recupera la información sobre el archivo donde el método de la tabla
        está definido.



       **[PDO::CUBRID_SCH_SUPER_TABLE](#pdo.constants.cubrid-sch-super-table)**
       Recupera el nombre y el tipo de la tabla de la que los atributos heredan.



       **[PDO::CUBRID_SCH_SUB_TABLE](#pdo.constants.cubrid-sch-sub-table)**
       Recupera el nombre y el tipo de la tabla de la que los atributos heredan.



       **[PDO::CUBRID_SCH_CONSTRAINT](#pdo.constants.cubrid-sch-constraint)**
       Recupera las restricciones de la tabla.



       **[PDO::CUBRID_SCH_TRIGGER](#pdo.constants.cubrid-sch-trigger)**
       Recupera los triggers de la tabla.



       **[PDO::CUBRID_SCH_TABLE_PRIVILEGE](#pdo.constants.cubrid-sch-table-privilege)**
       Recupera la información sobre los privilegios de la tabla.



       **[PDO::CUBRID_SCH_COL_PRIVILEGE](#pdo.constants.cubrid-sch-col-privilege)**
       Recupera la información sobre los privilegios de una columna.



       **[PDO::CUBRID_SCH_DIRECT_SUPER_TABLE](#pdo.constants.cubrid-sch-direct-super-table)**
       Recupera la tabla directamente superior a la tabla.



       **[PDO::CUBRID_SCH_PRIMARY_KEY](#pdo.constants.cubrid-sch-primary-key)**
       Recupera la clave primaria de la tabla.



       **[PDO::CUBRID_SCH_IMPORTED_KEYS](#pdo.constants.cubrid-sch-imported-keys)**
       Recupera las claves importadas de una tabla.



       **[PDO::CUBRID_SCH_EXPORTED_KEYS](#pdo.constants.cubrid-sch-exported-keys)**
       Recupera las claves exportadas de una tabla.



       **[PDO::CUBRID_SCH_CROSS_REFERENCE](#pdo.constants.cubrid-sch-cross-reference)**
       Recupera las relaciones de referencia entre 2 tablas.




# DSN PDO_CUBRID

(No version information available, might only be in Git)

DSN PDO_CUBRID — Conexión a las bases de datos CUBRID

### Descripción

    El DSN PDO_CUBRID está compuesto por los siguientes elementos, delimitados por un punto y coma:




      prefijo DSN


        El prefijo DSN es **cubrid:**.






      host


        El nombre de host donde se encuentra el servidor de base de datos.






      port


        El puerto en el que funciona el servidor de base de datos.






      dbname


        El nombre de la base de datos.






### Notas

**Nota**:

     Al establecer la conexión a CUBRID, se debe proporcionar el nombre de
     usuario y la contraseña, pero no el DSN.

### Ejemplos

     **Ejemplo #1 Ejemplos de DSN PDO_CUBRID**



      El siguiente ejemplo muestra un DSN PDO_CUBRID para una conexión a una base de datos CUBRID:


cubrid:host=localhost;port=33000;dbname=demodb

# PDO::cubrid_schema

(PECL PDO_CUBRID &gt;= 8.3.0.0001)

PDO::cubrid_schema — Recupera el esquema de información solicitado

### Descripción

public **PDO::cubrid_schema**([int](#language.types.integer) $schema_type, [string](#language.types.string) $table_name = ?, [string](#language.types.string) $col_name = ?): [array](#language.types.array)

Esta función se utiliza para recuperar el esquema de información solicitado desde
la base de datos.
Debe designarse el argumento table_name,
si se desea recuperar las informaciones de una cierta tabla, el
argumento col_name, si se desea recuperar las informaciones
de una cierta columna (solo puede ser utilizado con
PDO::CUBRID_SCH_COL_PRIVILEGE).

El resultado de esta función es devuelto en forma de un array
de 2 dimensiones (columna(array asociativo) \* fila (array numérico)).
Las tablas siguientes muestran los tipos de esquema y la estructura de la columna
del array resultante.

   <caption>**Composición del resultado para cada tipo**</caption>
    
     
      
       Esquema
       Número de la columna
       Nombre de la columna
       Valor


       PDO::CUBRID_SCH_TABLE
       1
       NAME
        



        
       2
       TYPE
       0:tabla del sistema 1:vista 2:tabla




       PDO::CUBRID_SCH_VIEW
       1
       NAME
        



        
       2
       TYPE
       1:vista




       PDO::CUBRID_SCH_QUERY_SPEC
       1
       QUERY_SPEC
        




       PDO::CUBRID_SCH_ATTRIBUTE / PDO::CUBRID_SCH_TABLE_ATTRIBUTE
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
       1:indexado



        
       6
       NOT NULL
       1:no nulo



        
       7
       SHARED
       1:compartido



        
       8
       UNIQUE
       1:único



        
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
       1:clave




       PDO::CUBRID_SCH_METHOD / PDO::CUBRID_SCH_TABLE_METHOD
       1
       NAME
        



        
       2
       RET_DOMAIN
        



        
       3
       ARG_DOMAIN
        




       PDO::CUBRID_SCH_METHOD_FILE
       1
       METHOD_FILE
        




       PDO::CUBRID_SCH_SUPER_TABLE / PDO::CUBRID_SCH_DIRECT_SUPER_TABLE / PDO::CUBRID_SCH_SUB_TABLE
       1
       CLASS_NAME
        



        
       2
       TYPE
       0:tabla del sistema 1:vista 2:tabla




       PDO::CUBRID_SCH_CONSTRAINT
       1
       TYPE
       0:único 1:índice 2:único inverso 3:índice inverso



        
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
       1:clave primaria



        
       7
       KEY_ORDER
       base:1




       PDO::CUBRID_SCH_TRIGGER
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
        




       PDO::CUBRID_SCH_TABLE_PRIVILEGE / PDO::CUBRID_SCH_COL_PRIVILEGE
       1
       CLASS_NAME / ATTR_NAME
        



        
       2
       PRIVILEGE
        



        
       3
       GRANTABLE
        




       PDO::CUBRID_SCH_PRIMARY_KEY
       1
       CLASS_NAME
        



        
       2
       ATTR_NAME
        



        
       3
       KEY_SEQ
       base:1



        
       4
       KEY_NAME
        




       PDO::CUBRID_SCH_IMPORTED_KEYS / PDO::CUBRID_SCH_EXPORTED_KEYS / PDO::CUBRID_SCH_CROSS_REFERENCE
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
       0:cascada 1:restringir 2:sin acción 3:establecer nulo



        
       7
       DELETE_ACTION
       0:cascada 1:restringir 2:sin acción 3:establecer nulo



        
       8
       FK_NAME
        



        
       9
       PK_NAME
        




### Parámetros

     schema_type


       El tipo de esquema que se desea recuperar.






     table_name


       La tabla de la cual se desea recuperar el esquema.






     col_name


       La columna de la cual se desea recuperar el esquema.


### Valores devueltos

Un array que contiene las informaciones relativas al esquema, cuando el
proceso se ha ejecutado con éxito.

**[false](#constant.false)** será devuelto si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con PDO::cubrid_schema()**



     Este ejemplo muestra cómo recuperar las claves primarias y extranjeras
     de la tabla "game".

&lt;?php
$pk_list = $dbh-&gt;cubrid_schema(PDO::CUBRID_SCH_PRIMARY_KEY, "game");
print_r($pk_list);

$fk_list = $dbh-&gt;cubrid_schema(PDO::CUBRID_SCH_IMPORTED_KEYS, "game");
print_r($fk_list);
?&gt;

    El ejemplo anterior mostrará:

Resultado:
Array
(
[0] =&gt; Array
(
[CLASS_NAME] =&gt; game
[ATTR_NAME] =&gt; athlete_code
[KEY_SEQ] =&gt; 3
[KEY_NAME] =&gt; pk_game_host_year_event_code_athlete_code
)

    [1] =&gt; Array
        (
            [CLASS_NAME] =&gt; game
            [ATTR_NAME] =&gt; event_code
            [KEY_SEQ] =&gt; 2
            [KEY_NAME] =&gt; pk_game_host_year_event_code_athlete_code
        )

    [2] =&gt; Array
        (
            [CLASS_NAME] =&gt; game
            [ATTR_NAME] =&gt; host_year
            [KEY_SEQ] =&gt; 1
            [KEY_NAME] =&gt; pk_game_host_year_event_code_athlete_code
        )

)
Array
(
[0] =&gt; Array
(
[PKTABLE_NAME] =&gt; athlete
[PKCOLUMN_NAME] =&gt; code
[FKTABLE_NAME] =&gt; game
[FKCOLUMN_NAME] =&gt; athlete_code
[KEY_SEQ] =&gt; 1
[UPDATE_RULE] =&gt; 1
[DELETE_RULE] =&gt; 1
[FK_NAME] =&gt; fk_game_athlete_code
[PK_NAME] =&gt; pk_athlete_code
)

    [1] =&gt; Array
        (
            [PKTABLE_NAME] =&gt; event
            [PKCOLUMN_NAME] =&gt; code
            [FKTABLE_NAME] =&gt; game
            [FKCOLUMN_NAME] =&gt; event_code
            [KEY_SEQ] =&gt; 1
            [UPDATE_RULE] =&gt; 1
            [DELETE_RULE] =&gt; 1
            [FK_NAME] =&gt; fk_game_event_code
            [PK_NAME] =&gt; pk_event_code
        )

)

## Tabla de contenidos

- [DSN PDO_CUBRID](#ref.pdo-cubrid.connection) — Conexión a las bases de datos CUBRID
- [PDO::cubrid_schema](#pdo.cubrid-schema) — Recupera el esquema de información solicitado

# Microsoft SQL Server y Funciones del Controlador PDO Sybase (PDO_DBLIB)

## Introducción

    PDO_DBLIB es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo) para
    permitir el acceso de PHP a Microsoft SQL Server y bases de datos Sybase
    mediante la biblioteca FreeTDS.




    Esta extensión ya no está disponible en Windows.




    En Windows, se debe utilizar SqlSrv, un controlador alternativo para MS SQL
    disponible en Microsoft : [» http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx
    ](http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx).




    Si no es posible utilizar SqlSrv, puede emplearse el controlador
    [PDO_ODBC](#ref.pdo-odbc) para conectarse a un servidor
    de bases de datos Microsoft SQL y Sybase, teniendo en cuenta que el controlador
    nativo de Windows DB-LIB es antiguo, no seguro a nivel de hilos y ya no es
    soportado por Microsoft.

# PDO_DBLIB DSN

(PECL PDO_DBLIB &gt;= 0.9.0)

PDO_DBLIB DSN — Conexión al Servidor Microsoft SQL y bases de datos Sybase

### Descripción

    El Data Source Name (DSN) de PDO_DBLIB se compone de los siguientes elementos:




      Prefijo DSN


        El prefijo DSN es **sybase:** si PDO_DBLIB fue vinculado
        con las bibliotecas Sybase ct-lib, **mssql:** si
        PDO_DBLIB fue vinculado con las bibliotecas de Microsoft SQL Server,
        o **dblib:** si PDO_DBLIB fue vinculado con las
        bibliotecas FreeTDS.






      host


        El host donde se encuentra el servidor de base de datos.






      dbname


        El nombre de la base de datos.






      charset


        El juego de caracteres del cliente.






      appname


        El nombre de la aplicación (utilizado en sysprocesses).
        Por omisión, "PHP Generic DB-lib" o
        "PHP freetds".






      secure


        Actualmente no utilizado.






### Ejemplos

     **Ejemplo #1 Ejemplos con PDO_DBLIB DSN**



      Los ejemplos siguientes muestran PDO_DBLIB DSN para conectarse a
      Microsoft SQL Server y bases de datos Sybase:


mssql:host=localhost;dbname=testdb
sybase:host=localhost;dbname=testdb
dblib:host=localhost;dbname=testdb

## Tabla de contenidos

- [PDO_DBLIB DSN](#ref.pdo-dblib.connection) — Conexión al Servidor Microsoft SQL y bases de datos Sybase

# La clase Pdo\Dblib

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO DBLib.

## Sinopsis de la Clase

     class **Pdo\Dblib**


     extends
      [PDO](#class.pdo)
     {
    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [ATTR_CONNECTION_TIMEOUT](#pdo-dblib.constants.attr-connection-timeout);

    public
     const
     [int](#language.types.integer)
      [ATTR_QUERY_TIMEOUT](#pdo-dblib.constants.attr-query-timeout);

    public
     const
     [int](#language.types.integer)
      [ATTR_STRINGIFY_UNIQUEIDENTIFIER](#pdo-dblib.constants.attr-stringify-uniqueidentifier);

    public
     const
     [int](#language.types.integer)
      [ATTR_VERSION](#pdo-dblib.constants.attr-version);

    public
     const
     [int](#language.types.integer)
      [ATTR_TDS_VERSION](#pdo-dblib.constants.attr-tds-version);

    public
     const
     [int](#language.types.integer)
      [ATTR_SKIP_EMPTY_ROWSETS](#pdo-dblib.constants.attr-skip-empty-rowsets);

    public
     const
     [int](#language.types.integer)
      [ATTR_DATETIME_CONVERT](#pdo-dblib.constants.attr-datetime-convert);

    /* Métodos heredados */

public [PDO::\_\_construct](#pdo.construct)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Dblib::ATTR_CONNECTION_TIMEOUT](#pdo-dblib.constants.attr-connection-timeout)**






     **[Pdo\Dblib::ATTR_QUERY_TIMEOUT](#pdo-dblib.constants.attr-query-timeout)**






     **[Pdo\Dblib::ATTR_STRINGIFY_UNIQUEIDENTIFIER](#pdo-dblib.constants.attr-stringify-uniqueidentifier)**






     **[Pdo\Dblib::ATTR_VERSION](#pdo-dblib.constants.attr-version)**






     **[Pdo\Dblib::ATTR_TDS_VERSION](#pdo-dblib.constants.attr-tds-version)**






     **[Pdo\Dblib::ATTR_SKIP_EMPTY_ROWSETS](#pdo-dblib.constants.attr-skip-empty-rowsets)**






     **[Pdo\Dblib::ATTR_DATETIME_CONVERT](#pdo-dblib.constants.attr-datetime-convert)**





# Funciones del controlador PDO Firebird (PDO_FIREBIRD)

## Introducción

     PDO_FIREBIRD es un controlador que implementa la interfaz de
     PHP Data Objects (PDO) para
     permitir el acceso de PHP a las bases de datos Firebird.

## Instalación

Use **--with-pdo-firebird[=DIR]** para instalar
la extensión PDO Firebird, donde [=DIR]
es el directorio base de intalación de Firebird.

$ ./configure --with-pdo-firebird

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO::FB_ATTR_DATE_FORMAT](#pdo.constants.fb-attr-date-format)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Firebird::ATTR_DATE_FORMAT](#pdo-firebird.constants.attr-date-format)**.







    **[PDO::FB_ATTR_TIME_FORMAT](#pdo.constants.fb-attr-time-format)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Firebird::ATTR_TIME_FORMAT](#pdo-firebird.constants.attr-time-format)**.







    **[PDO::FB_ATTR_TIMESTAMP_FORMAT](#pdo.constants.fb-attr-timestamp-format)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Firebird::ATTR_TIMESTAMP_FORMAT](#pdo-firebird.constants.attr-timestamp-format)**.













    # PDO_FIREBIRD DSN

    (PECL PDO_FIREBIRD &gt;= 0.1.0)

PDO_FIREBIRD DSN — Conexión a las bases de datos Firebird

    ### Descripción


     El Data Source Name (DSN) de PDO_FIREBIRD se compone de los siguientes elementos:




       Prefijo DSN


         El prefijo DNS es **firebird:**.






       dbname


         El nombre de la base de datos.






       charset


         El juego de caracteres.






       role


         El nombre del rol SQL.






       dialect


         El dialecto de la base de datos; sea 1 o
         3.
         Si no se especifica, el dialecto por omisión es 3.
         Disponible a partir de PHP 7.4.0.










    ### Ejemplos





      **Ejemplo #1 Ejemplos con PDO_FIREBIRD DSN**



       El siguiente ejemplo muestra PDO_FIREBIRD DSN para conectarse a
       las bases de datos Firebird:


firebird:dbname=/ruta/vers/DATABASE.FDB

      **Ejemplo #2 Ejemplo con un DSN PDO_FIREBIRD con un puerto y una ruta**



       El siguiente ejemplo muestra un DSN PDO_FIREBIRD para la conexión
       a una base de datos Firebird, utilizando un nombre de host,
       un puerto y una ruta:


firebird:dbname=hostname/port:/path/to/DATABASE.FDB

      **Ejemplo #3 Ejemplo con un DSN PDO_FIREBIRD en local y una ruta hacia
       el fichero employee.fdb en un sistema Debian**



       El siguiente ejemplo muestra un DSN PDO_FIREBIRD para conectarse a
       una base de datos Firebird employee.fdb en local:


firebird:dbname=localhost:/var/lib/firebird/2.5/data/employee.fdb

      **Ejemplo #4
       Un DSN PDO_FIREBIRD para conectarse a una base de datos en dialecto 1
      **



       El siguiente ejemplo muestra un DSN PDO_FIREBIRD para conectarse a una
       base de datos Firebird test.fdb que ha sido creada utilizando el dialecto 1.
       Esto es únicamente soportado a partir de PHP 7.4.0.





firebird:dbname=localhost:/var/lib/firebird/2.5/data/test.fdb;charset=utf-8;dialect=1

## Tabla de contenidos

- [PDO_FIREBIRD DSN](#ref.pdo-firebird.connection) — Conexión a las bases de datos Firebird

# La clase Pdo\Firebird

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO de Firebird.

## Sinopsis de la Clase

     class **Pdo\Firebird**



     extends
      [PDO](#class.pdo)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [ATTR_DATE_FORMAT](#pdo-firebird.constants.attr-date-format);

    public
     const
     [int](#language.types.integer)
      [ATTR_TIME_FORMAT](#pdo-firebird.constants.attr-time-format);

    public
     const
     [int](#language.types.integer)
      [ATTR_TIMESTAMP_FORMAT](#pdo-firebird.constants.attr-timestamp-format);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_ISOLATION_LEVEL](#pdo-firebird.constants.transaction-isolation-level);

    public
     const
     [int](#language.types.integer)
      [READ_COMMITTED](#pdo-firebird.constants.read-committed);

    public
     const
     [int](#language.types.integer)
      [REPEATABLE_READ](#pdo-firebird.constants.repeatable-read);

    public
     const
     [int](#language.types.integer)
      [SERIALIZABLE](#pdo-firebird.constants.serializable);

    public
     const
     [int](#language.types.integer)
      [WRITABLE_TRANSACTION](#pdo-firebird.constants.writable-transaction);


    /* Métodos */

public static [getApiVersion](#pdo-firebird.getapiversion)(): [int](#language.types.integer)

    /* Métodos heredados */
    public [PDO::__construct](#pdo.construct)(

    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Firebird::ATTR_DATE_FORMAT](#pdo-firebird.constants.attr-date-format)**


       Define el formato de fecha.




     **[Pdo\Firebird::ATTR_TIME_FORMAT](#pdo-firebird.constants.attr-time-format)**


       Define el formato de hora.




     **[Pdo\Firebird::ATTR_TIMESTAMP_FORMAT](#pdo-firebird.constants.attr-timestamp-format)**


       Define el formato de la marca de tiempo.




     **[Pdo\Firebird::TRANSACTION_ISOLATION_LEVEL](#pdo-firebird.constants.transaction-isolation-level)**


       Los atributos de transacción definen el nivel de aislamiento de la transacción.
       Puede ser uno de los siguientes: **[Pdo\Firebird::READ_COMMITTED](#pdo-firebird.constants.read-committed)**,
       **[Pdo\Firebird::REPEATABLE_READ](#pdo-firebird.constants.repeatable-read)**,
       o **[Pdo\Firebird::SERIALIZABLE](#pdo-firebird.constants.serializable)**.




     **[Pdo\Firebird::READ_COMMITTED](#pdo-firebird.constants.read-committed)**


       Flag que indica que el nivel de aislamiento de la transacción ANSI
       es read committed.
       Este es el comportamiento por omisión.




     **[Pdo\Firebird::REPEATABLE_READ](#pdo-firebird.constants.repeatable-read)**


       Flag que indica que el nivel de aislamiento de la transacción ANSI
       es repeatable read.
       Esto corresponde al nivel de aislamiento "snapshot" de Firebird.




     **[Pdo\Firebird::SERIALIZABLE](#pdo-firebird.constants.serializable)**


       Flag que indica que el nivel de aislamiento de la transacción ANSI
       es serializable.
       Esto corresponde al nivel de aislamiento "snapshot table stability" de Firebird.




     **[Pdo\Firebird::WRITABLE_TRANSACTION](#pdo-firebird.constants.writable-transaction)**


       El atributo booleano utilizado para cambiar el modo de acceso a la transacción entre
       READ ONLY y READ WRITE.
       Por omisión, es **[true](#constant.true)** indicando READ WRITE.



# Pdo\Firebird::getApiVersion

(PHP 8 &gt;= 8.4.0)

Pdo\Firebird::getApiVersion — Devuelve la versión de la API

### Descripción

public static **Pdo\Firebird::getApiVersion**(): [int](#language.types.integer)

Devuelve la versión de la API Firebird tal como está definida por la constante C
**[FB_API_VER](#constant.fb-api-ver)** en ibase.h.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la API Firebird como [int](#language.types.integer).

## Tabla de contenidos

- [Pdo\Firebird::getApiVersion](#pdo-firebird.getapiversion) — Devuelve la versión de la API

# Funciones del controlador PDO IBM (PDO_IBM)

## Introducción

    PDO_IBM es un driver que implementa la interfaz [
    PHP Data Objects (PDO)](#intro.pdo) para habilitar el acceso
    desde PHP a las bases de datos IBM.

## Instalación

Para compilar la extensión PDO_IBM, el cliente DB2 v9.1 o superior debe ser
instalado en el mismo sistema que PHP. El cliente DB2 puede ser descargado
desde el sitio de IBM de [» desarrollo
de aplicaciones](http://www.ibm.com/software/data/db2/ad).

**Nota**:
**Nota**

    El cliente DB2 v9.1 o superior soporta los accesos directos a DB2
    para los sistemas Linux, UNIX y los servidores Windows v8 y v9.1.




    El cliente DB2 v9.1 soporta asimismo los accesos a DB2 UDB para i5
    y DB2 UDB para los servidores z/OS utilizando el
    [» producto de conexión DB2](http://www.ibm.com/software/data/db2/db2connect) de pago.

PDO_IBM es una extensión [» PECL](https://pecl.php.net/);
por lo tanto, las instrucciones de [Instalación de extensiones PECL](#install.pecl)
deben ser seguidas para instalar la extensión PDO_IBM. Ejecute el comando
**configure** para que apunte hacia el directorio
que contiene los ficheros de encabezado y las bibliotecas del
cliente DB2 de la siguiente manera:

bash$ ./configure --with-pdo-ibm=/path/to/sqllib[,shared]

El comando **configure** utiliza por omisión
el valor de la variable de entorno DB2DIR.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración PDO_IBM**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [pdo_ibm.i5_dbcs_alloc](#ini.pdo-ibm.i5-dbcs-alloc)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Añadido en PDO_IBM 1.5.0



      [pdo_ibm.i5_override_ccsid](#ini.pdo-ibm.i5-override-ccsid)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Añadido en PDO_IBM 1.5.0


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     pdo_ibm.i5_dbcs_alloc
     [int](#language.types.integer)



      Esta opción afecta a la estrategia de asignación de memoria interna en IBM i.
      Por omisión, esta opción es 0. Cuando esta opción está definida, se asignan
      búferes con un tamaño mucho mayor, por si la base de datos engañara sobre el
      tamaño de los caracteres durante la conversión entre codificaciones. Esta opción
      utiliza seis veces más memoria para los búferes (para tener en cuenta las secuencias
      UTF-8 más largas), pero puede ser necesaria si se devuelven datos truncados.



       -

         0 - Se asigna el tamaño mínimo de los búferes.





       -

         1 - Se asigna un tamaño mayor de los búferes.











     pdo_ibm.i5_override_ccsid
     [int](#language.types.integer)



      El CCSID ASCII a utilizar para la conversión de EBCDIC en IBM i. Al definirlo
      como 1208, se utilizará UTF-8. Por omisión es 0, lo que seleccionará el CCSID
      ASCII de trabajo predeterminado.




      Para obtener más información sobre los CCSID en IBM i, consulte la
      [» documentación de IBM](https://www.ibm.com/docs/en/i/7.5?topic=information-ccsid-reference).


# PDO_IBM DSN

(PECL PDO_IBM &gt;= 0.9.0)

PDO_IBM DSN — Conexión a las bases de datos IBM

### Descripción

    El nombre de la fuente de datos PDO_IBM (DSN) se basa en el IBM CLI DSN.
    Los componentes principales de PDO_IBM DSN son :




      Prefijo DSN


        El prefijo DSN es **ibm:**.






      DSN


        El DSN puede ser uno de los siguientes :



         -

           a) Configuración de la fuente de datos utilizando el archivo
           db2cli.ini
           o odbc.ini





         -

           b) Nombre de base de datos catalogado, es decir, alias de base de datos contenidos en
           el catálogo del cliente DB2





         -

           c) Cadena de conexión completa en el siguiente formato :
           DRIVER={IBM DB2 ODBC DRIVER};DATABASE=database;HOSTNAME=hostname;PORT=port;PROTOCOL=TCPIP;UID=username;PWD=password;
           donde los parámetros representan los siguientes valores :




             database


               El nombre de la base de datos.






             hostname


               El nombre del host o la dirección IP del servidor de base de datos.






             port


               El puerto TCP/IP en el que la base de datos escucha las consultas.






             username


               El nombre de usuario utilizado para la conexión a la base de datos.






             password


               La contraseña utilizada para la conexión a la base de datos.














### Ejemplos

     **Ejemplo #1 Ejemplo con PDO_IBM DSN utilizando db2cli.ini**



      El siguiente ejemplo muestra el uso de PDO_IBM DSN para la conexión a una
      base de datos DB2 catalogada como DB2_9 en el archivo
      db2cli.ini :


$db = new PDO("ibm:DSN=DB2_9", "", "");

[DB2_9]
Database=testdb
Protocol=tcpip
Hostname=11.22.33.444
Servicename=56789

     **Ejemplo #2 Ejemplo con PDO_IBM DSN utilizando una cadena completa de conexión**



      El siguiente ejemplo muestra el uso de PDO_IBM DSN para la conexión a una
      base de datos DB2 llamada **testdb** utilizando
      la cadena completa de conexión DB2 CLI :


$db = new PDO("ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE=testdb;" .
"HOSTNAME=11.22.33.444;PORT=56789;PROTOCOL=TCPIP;", "testuser", "tespass");

## Tabla de contenidos

- [PDO_IBM DSN](#ref.pdo-ibm.connection) — Conexión a las bases de datos IBM

    # Funciones del controlador PDO Informix (PDO_INFORMIX)

    ## Introducción

    PDO_INFORMIX es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo)
    para permitir el acceso de PHP a las bases de datos Informix.

## Instalación

Para compilar la extensión PDO_INFORMIX, debe estar instalado el SDK Client Informix 2.81 UC1 o superior en el mismo sistema que PHP. El SDK Client Informix está disponible en el [» Sitio de Soporte IBM Informix](https://www.ibm.com/support/pages/download-informix-products).

PDO_INFORMIX es una extensión [» PECL](https://pecl.php.net/), por lo que se deben seguir las instrucciones en [Instalación de extensiones PECL](#install.pecl) para instalar la extensión PDO_INFORMIX. Se debe escribir el comando **configure** para indicar la ruta de los ficheros de encabezado del SDK Client Informix así como las bibliotecas de la siguiente manera:

bash$ ./configure --with-pdo-informix=/path/to/SDK[,shared]

El comando **configure** utiliza por omisión la variable de entorno INFORMIXDIR.

    ## Cursores flotantes


     PDO_INFORMIX soporta los cursores flotantes; sin embargo, no están
     activados por omisión. Para activar el soporte de los cursores flotantes, debe
     establecer **ENABLESCROLLABLECURSORS=1** en
     las configuraciones de la conexión ODBC correspondiente en
     odbc.ini o pasar la cláusula
     **EnableScrollableCursors=1** en la cadena de
     conexión DSN.









    # PDO_INFORMIX DSN

    (PECL PDO_INFORMIX &gt;= 0.1.0)

PDO_INFORMIX DSN — Conexión a las bases de datos Informix

    ### Descripción


     El Data Source Name (DSN) de PDO_INFORMIX se basa en la cadena de
     caracteres DSN de Informix ODBC. Los detalles sobre la configuración de un DSN
     Informix ODBC están disponibles en
     [» Informix Dynamic Server Information Center](https://www.ibm.com/docs/en/informix-servers/14.10?topic=guide-configure-data-sources).
     Los componentes principales del DSN de PDO_INFORMIX son:




       Prefijo DSN


         El prefijo DSN es **informix:**.






       DSN


         El DSN puede ser una fuente de datos de configuración
         utilizando odbc.ini o una [» cadena de
         conexión](https://www.ibm.com/docs/en/informix-servers/14.10?topic=sources-connection-string-keywords-that-make-connection) completa.










    ### Ejemplos





      **Ejemplo #1 Ejemplo de DSN de PDO_INFORMIX con odbc.ini**



       El siguiente ejemplo muestra el DSN de PDO_INFORMIX para conectarse a una base
       de datos Informix catalogada como Infdrv33 en
       odbc.ini:


$db = new PDO("informix:DSN=Infdrv33", "", "");

[ODBC Data Sources]
Infdrv33=INFORMIX 3.3 32-BIT

[Infdrv33]
Driver=/opt/informix/csdk_2.81.UC1G2/lib/cli/iclis09b.so
Description=INFORMIX 3.3 32-BIT
Database=common_db
LogonID=testuser
pwd=testpass
Servername=ids_server
DB_LOCALE=en_US.819
OPTIMIZEAUTOCOMMIT=1
ENABLESCROLLABLECURSORS=1

      **Ejemplo #2 Ejemplo de DSN de PDO_INFORMIX con una cadena de conexión**



       El siguiente ejemplo muestra el DSN de PDO_INFORMIX para conectarse a una base
       de datos Informix llamada **common_db** utilizando
       la sintaxis de cadena de conexión de Informix.


$db = new PDO("informix:host=host.domain.com; service=9800;
database=common_db; server=ids_server; protocol=onsoctcp;
EnableScrollableCursors=1", "testuser", "tespass");

## Tabla de contenidos

- [PDO_INFORMIX DSN](#ref.pdo-informix.connection) — Conexión a las bases de datos Informix

    # Funciones del controlador PDO MySQL (PDO_MYSQL)

    ## Introducción

    PDO_MYSQL es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo) para
    permitir el acceso de PHP a las bases de datos MySQL.

    PDO_MYSQL utiliza consultas preparadas emuladas por omisión.

    **MySQL 8**

    Si PHP se utiliza en una versión 7.1 anterior a la versión 7.1.16, o PHP 7.2 anterior a 7.2.4,
    el complemento de contraseña debe establecerse en
    _mysql_native_password_ para MySQL 8 Server, ya que de lo contrario pueden aparecer
    errores similares a _The server requested authentication method
    unknown to the client [caching_sha2_password]_,
    incluso si _caching_sha2_password_ no se utiliza.

    Esto se debe a que MySQL 8 utiliza por omisión caching_sha2_password,
    un complemento que no es reconocido por las versiones antiguas de PHP (mysqlnd).
    En su lugar, debe modificarse el parámetro
    default_authentication_plugin=mysql_native_password en
    my.cnf. El complemento _caching_sha2_password_
    es completamente soportado a partir de PHP 7.4.4. Para versiones anteriores,
    la extensión [mysql_xdevapi](#book.mysql-xdevapi) lo soporta.

    **Advertencia**

        Tenga en cuenta: ciertos tipos de tablas MySQL (motor de registro)
        no soportan transacciones. Cuando se escribe código de base de datos
        transaccional utilizando un tipo de tabla que no soporta transacciones,
        MySQL afirmará que una transacción fue iniciada correctamente. Además,
        cualquier consulta DLL publicada enviará implícitamente todas las transacciones pendientes.

    **Nota**:

        El controlador MySQL no soporta adecuadamente **[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output)**
        a través de [PDOStatement::bindParam()](#pdostatement.bindparam); aunque tales
        parámetros pueden ser utilizados, no serán actualizados
        (es decir, la salida actual es ignorada).

## Instalación

Las distribuciones Linux incluyen versiones binarias de PHP que pueden
ser instaladas. Incluso si estos binarios son construidos con las extensiones
MySQL, las bibliotecas clientes deben ser a menudo instaladas mediante un paquete adicional. Verifique si es el caso para su distribución.

Por ejemplo, en Ubuntu el paquete php5-mysql instala las
extensiones PHP ext/mysql, ext/mysqli, y pdo_mysql. En CentOS, el paquete
php-mysql también instala estas tres extensiones PHP.

Alternativamente, puede compilar esta extensión usted mismo. Construir
PHP desde las fuentes permite especificar las extensiones MySQL a incluir,
así como las bibliotecas clientes de cada extensión.

Durante la compilación utilice **--with-pdo-mysql[=DIR]**
para instalar la extensión PDO MySQL, donde [=DIR] es la ruta
de la biblioteca base de MySQL.
[Mysqlnd](#book.mysqlnd) y la biblioteca por defecto.
Para más detalles sobre la elección de la biblioteca, ver
[Elegir una biblioteca MySQL](#mysqlinfo.library.choosing).

Opcionalmente, la opción **--with-mysql-sock[=DIR]**
define la ruta hacia el socket Unix MySQL para todas las extensiones
MySQL, incluyendo PDO_MYSQL. Si no se especifica, se utilizarán las rutas por defecto.

Opcionalmente, la opción **--with-zlib-dir[=DIR]**
será utilizada para definir el prefijo de instalación zlib.

$ ./configure --with-pdo-mysql --with-mysql-sock=/var/mysql/mysql.sock

El soporte SSL es activado utilizando las constantes
**[Pdo\Mysql::ATTR*SSL*\*](#pdo-mysql.constants.attr-ssl-key)**,
lo cual equivale a llamar a la función API C
[» mysql_ssl_set()](https://dev.mysql.com/doc/c-api/8.4/en/mysql-ssl-set.html).
Además, SSL no puede ser activado con [PDO::setAttribute()](#pdo.setattribute)
ya que la conexión ya existe.
Ver también la documentación MySQL sobre
[» la conexión a MySQL con SSL](https://dev.mysql.com/doc/en/using-encrypted-connections.html).

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO::MYSQL_ATTR_USE_BUFFERED_QUERY](#pdo.constants.mysql-attr-use-buffered-query)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_USE_BUFFERED_QUERY](#pdo-mysql.constants.attr-use-buffered-query)**





    **[PDO::MYSQL_ATTR_LOCAL_INFILE](#pdo.constants.mysql-attr-local-infile)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_LOCAL_INFILE](#pdo-mysql.constants.attr-local-infile)**





    **[PDO::MYSQL_ATTR_LOCAL_INFILE_DIRECTORY](#pdo.constants.mysql-attr-local-infile-directory)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_LOCAL_INFILE_DIRECTORY](#pdo-mysql.constants.attr-local-infile-directory)**.
     Disponible a partir de PHP 8.1.0.





    **[PDO::MYSQL_ATTR_INIT_COMMAND](#pdo.constants.mysql-attr-init-command)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_INIT_COMMAND](#pdo-mysql.constants.attr-init-command)**





    **[PDO::MYSQL_ATTR_READ_DEFAULT_FILE](#pdo.constants.mysql-attr-read-default-file)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_READ_DEFAULT_FILE](#pdo-mysql.constants.attr-read-default-file)**





    **[PDO::MYSQL_ATTR_READ_DEFAULT_GROUP](#pdo.constants.mysql-attr-read-default-group)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_READ_DEFAULT_GROUP](#pdo-mysql.constants.attr-read-default-group)**





    **[PDO::MYSQL_ATTR_MAX_BUFFER_SIZE](#pdo.constants.mysql-attr-max-buffer-size)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_MAX_BUFFER_SIZE](#pdo-mysql.constants.attr-max-buffer-size)**





    **[PDO::MYSQL_ATTR_DIRECT_QUERY](#pdo.constants.mysql-attr-direct-query)**
    ([int](#language.types.integer))



     Alias de **[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares)**





    **[PDO::MYSQL_ATTR_FOUND_ROWS](#pdo.constants.mysql-attr-found-rows)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_FOUND_ROWS](#pdo-mysql.constants.attr-found-rows)**





    **[PDO::MYSQL_ATTR_IGNORE_SPACE](#pdo.constants.mysql-attr-ignore-space)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_IGNORE_SPACE](#pdo-mysql.constants.attr-ignore-space)**





    **[PDO::MYSQL_ATTR_COMPRESS](#pdo.constants.mysql-attr-compress)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_COMPRESS](#pdo-mysql.constants.attr-compress)**






    **[PDO::MYSQL_ATTR_SERVER_PUBLIC_KEY](#pdo.constants.mysql-attr-server-public-key)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SERVER_PUBLIC_KEY](#pdo-mysql.constants.attr-server-public-key)**






    **[PDO::MYSQL_ATTR_SSL_CA](#pdo.constants.mysql-attr-ssl-ca)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_CA](#pdo-mysql.constants.attr-ssl-ca)**






    **[PDO::MYSQL_ATTR_SSL_CAPATH](#pdo.constants.mysql-attr-ssl-capath)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_CAPATH](#pdo-mysql.constants.attr-ssl-capath)**






    **[PDO::MYSQL_ATTR_SSL_CERT](#pdo.constants.mysql-attr-ssl-cert)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_CERT](#pdo-mysql.constants.attr-ssl-cert)**






    **[PDO::MYSQL_ATTR_SSL_CIPHER](#pdo.constants.mysql-attr-ssl-cipher)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_CIPHER](#pdo-mysql.constants.attr-ssl-cipher)**






    **[PDO::MYSQL_ATTR_SSL_KEY](#pdo.constants.mysql-attr-ssl-key)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_KEY](#pdo-mysql.constants.attr-ssl-key)**






    **[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT](#pdo.constants.mysql-attr-ssl-verify-server-cert)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_SSL_VERIFY_SERVER_CERT](#pdo-mysql.constants.attr-ssl-verify-server-cert)**
     Disponible a partir de PHP 7.0.18 y PHP 7.1.4.






    **[PDO::MYSQL_ATTR_MULTI_STATEMENTS](#pdo.constants.mysql-attr-multi-statements)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Mysql::ATTR_MULTI_STATEMENTS](#pdo-mysql.constants.attr-multi-statements)**

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración del driver PDO_MYSQL**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable


      [pdo_mysql.default_socket](#ini.pdo-mysql.default-socket)
      "/tmp/mysql.sock"
      **[INI_SYSTEM](#constant.ini-system)**



      [pdo_mysql.debug](#ini.pdo-mysql.debug)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     pdo_mysql.default_socket
     [string](#language.types.string)



      Se define un socket de dominio Unix. El valor puede ser también definido
      en el momento de la compilación si se encuentra un socket de dominio Unix
      durante la configuración. Esta configuración INI solo está disponible
      bajo Unix.







     pdo_mysql.debug
     [bool](#language.types.boolean)



      Se activa el depurado para el driver PDO_MYSQL. Esta configuración solo
      está disponible cuando el driver PDO_MYSQL es compilado con mysqlnd
      y en modo de depurado PDO.















    # PDO_MYSQL DSN

    (PECL PDO_MYSQL &gt;= 0.1.0)

PDO_MYSQL DSN — Conexión a las bases de datos MySQL

    ### Descripción


     El Data Source Name (DSN) de PDO_MYSQL se compone de los siguientes elementos:




       Prefijo DSN


         El prefijo DSN es **mysql:**.






       host


         El host donde se encuentra el servidor de base de datos.






       port


         El número de puerto donde el servidor de base de datos está escuchando.






       dbname


         El nombre de la base de datos.






       unix_socket


         El socket Unix de MySQL (no debe utilizarse con
         host o port).






       charset


         El juego de caracteres. Consulte la documentación sobre los conceptos
         [de los juegos de caracteres](#mysqlinfo.concepts.charset)
         para obtener más información.











    ### Ejemplos





      **Ejemplo #1 Ejemplos con el DSN de PDO_MYSQL**



       El siguiente ejemplo muestra el DSN PDO_MYSQL para conectarse a las bases
       de datos MySQL:


mysql:host=localhost;dbname=testdb

       Ejemplos más completos:


mysql:host=localhost;port=3307;dbname=testdb
mysql:unix_socket=/tmp/mysql.sock;dbname=testdb

    ### Notas

    **Nota**:
     **Solo Unix:**



      Cuando el nombre de host es "localhost", la conexión se realiza a través de un socket
      Unix. Si PDO_MYSQL está compilado con libmysqlclient, entonces el archivo de socket es el especificado durante
      la compilación de libmysqlclient. Si PDO_MYSQL está compilado con mysqlnd, un socket por omisión puede ser
      indicado a través del parámetro [pdo_mysql.default_socket](#ini.pdo-mysql.default-socket).


## Tabla de contenidos

- [PDO_MYSQL DSN](#ref.pdo-mysql.connection) — Conexión a las bases de datos MySQL

# La clase Pdo\Mysql

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO MySQL.




    Este controlador admite un analizador de consultas SQL dedicado para el dialecto MySQL.
    Puede gestionar los siguientes elementos:



     -

       Literales entre comillas simples y dobles con duplicación y barra invertida como mecanismos de escape



     -

       Literales con acento grave con duplicación como mecanismo de escape



     -

       Dos guiones, comentarios de estilo C y comentarios de tipo hash



## Sinopsis de la Clase

     class **Pdo\Mysql**



     extends
      [PDO](#class.pdo)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [ATTR_USE_BUFFERED_QUERY](#pdo-mysql.constants.attr-use-buffered-query);

    public
     const
     [int](#language.types.integer)
      [ATTR_LOCAL_INFILE](#pdo-mysql.constants.attr-local-infile);

    public
     const
     [int](#language.types.integer)
      [ATTR_LOCAL_INFILE_DIRECTORY](#pdo-mysql.constants.attr-local-infile-directory);

    public
     const
     [int](#language.types.integer)
      [ATTR_INIT_COMMAND](#pdo-mysql.constants.attr-init-command);

    public
     const
     [int](#language.types.integer)
      [ATTR_MAX_BUFFER_SIZE](#pdo-mysql.constants.attr-max-buffer-size);

    public
     const
     [int](#language.types.integer)
      [ATTR_READ_DEFAULT_FILE](#pdo-mysql.constants.attr-read-default-file);

    public
     const
     [int](#language.types.integer)
      [ATTR_READ_DEFAULT_GROUP](#pdo-mysql.constants.attr-read-default-group);

    public
     const
     [int](#language.types.integer)
      [ATTR_COMPRESS](#pdo-mysql.constants.attr-compress);

    public
     const
     [int](#language.types.integer)
      [ATTR_DIRECT_QUERY](#pdo-mysql.constants.attr-direct-query);

    public
     const
     [int](#language.types.integer)
      [ATTR_FOUND_ROWS](#pdo-mysql.constants.attr-found-rows);

    public
     const
     [int](#language.types.integer)
      [ATTR_IGNORE_SPACE](#pdo-mysql.constants.attr-ignore-space);

    public
     const
     [int](#language.types.integer)
      [ATTR_MULTI_STATEMENTS](#pdo-mysql.constants.attr-multi-statements);

    public
     const
     [int](#language.types.integer)
      [ATTR_SERVER_PUBLIC_KEY](#pdo-mysql.constants.attr-server-public-key);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_KEY](#pdo-mysql.constants.attr-ssl-key);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_CERT](#pdo-mysql.constants.attr-ssl-cert);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_CA](#pdo-mysql.constants.attr-ssl-ca);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_CAPATH](#pdo-mysql.constants.attr-ssl-capath);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_CIPHER](#pdo-mysql.constants.attr-ssl-cipher);

    public
     const
     [int](#language.types.integer)
      [ATTR_SSL_VERIFY_SERVER_CERT](#pdo-mysql.constants.attr-ssl-verify-server-cert);


    /* Métodos */

public [getWarningCount](#pdo-mysql.getwarningcount)(): [int](#language.types.integer)

    /* Métodos heredados */
    public [PDO::__construct](#pdo.construct)(

    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Mysql::ATTR_USE_BUFFERED_QUERY](#pdo-mysql.constants.attr-use-buffered-query)**


       Por omisión, todas las consultas se ejecutan en
       [modo almacenado en búfer](#mysqlinfo.concepts.buffering).
       Si este atributo se define como **[false](#constant.false)** en un objeto
       **Pdo\Mysql**,
       el controlador MySQL utilizará el modo sin búfer.

      **Ejemplo #1 Activación del modo sin búfer MySQL**




&lt;?php
$pdo = new Pdo\Mysql("mysql:host=localhost;dbname=world", 'my_user', 'my_password');
$pdo-&gt;setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$unbufferedResult = $pdo-&gt;query("SELECT Name FROM City");
foreach ($unbufferedResult as $row) {
echo $row['Name'] . PHP_EOL;
}
?&gt;

     **[Pdo\Mysql::ATTR_LOCAL_INFILE](#pdo-mysql.constants.attr-local-infile)**


       Activa LOAD LOCAL INFILE.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_LOCAL_INFILE_DIRECTORY](#pdo-mysql.constants.attr-local-infile-directory)**


       Permite restringir la carga de datos locales a los ficheros situados
       en este directorio designado.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_INIT_COMMAND](#pdo-mysql.constants.attr-init-command)**


       El comando a ejecutar al conectarse al servidor MySQL.
       Se reejecutará automáticamente al reconectar.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_READ_DEFAULT_FILE](#pdo-mysql.constants.attr-read-default-file)**


       Leer las opciones del fichero de opciones nombrado en lugar de
       my.cnf.

      **Nota**:

        Esta opción no está disponible si se utiliza mysqlnd,
        ya que mysqlnd no lee los ficheros de configuración mysql.







     **[Pdo\Mysql::ATTR_READ_DEFAULT_GROUP](#pdo-mysql.constants.attr-read-default-group)**


       Lee las opciones del grupo nombrado del fichero my.cnf o
       el fichero especificado con
       **[Pdo\Mysql::ATTR_READ_DEFAULT_FILE](#pdo-mysql.constants.attr-read-default-file)**.

      **Nota**:

        Esta opción no está disponible si se utiliza mysqlnd,
        ya que mysqlnd no lee los ficheros de configuración mysql.







     **[Pdo\Mysql::ATTR_COMPRESS](#pdo-mysql.constants.attr-compress)**


       Activa la compresión de la comunicación de red.




     **[Pdo\Mysql::ATTR_DIRECT_QUERY](#pdo-mysql.constants.attr-direct-query)**


       Alias de **[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares)**.




     **[Pdo\Mysql::ATTR_FOUND_ROWS](#pdo-mysql.constants.attr-found-rows)**


       Devuelve el número de filas encontradas (coincidentes),
       no el número de filas modificadas.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_IGNORE_SPACE](#pdo-mysql.constants.attr-ignore-space)**


       Permite espacios después de los nombres de funciones SQL.
       Convierte todos los nombres de funciones SQL en palabras reservadas.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_MAX_BUFFER_SIZE](#pdo-mysql.constants.attr-max-buffer-size)**


       El tamaño máximo del búfer. Por omisión, 1 MB.

      **Nota**:

        Esta constante no está soportada cuando se compila sin mysqlnd.







     **[Pdo\Mysql::ATTR_MULTI_STATEMENTS](#pdo-mysql.constants.attr-multi-statements)**


       Desactiva la ejecución de consultas múltiples en
       [PDO::prepare()](#pdo.prepare) y
       [PDO::query()](#pdo.query) cuando se define como **[false](#constant.false)**.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SERVER_PUBLIC_KEY](#pdo-mysql.constants.attr-server-public-key)**


       RSA la ruta del fichero de clave pública utilizada con la autenticación basada en SHA-256.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_KEY](#pdo-mysql.constants.attr-ssl-key)**


       La ruta del fichero de clave SSL.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_CERT](#pdo-mysql.constants.attr-ssl-cert)**


       La ruta del certificado SSL.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_CA](#pdo-mysql.constants.attr-ssl-ca)**


       La ruta del certificado de autoridad SSL.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_CAPATH](#pdo-mysql.constants.attr-ssl-capath)**


       La ruta del directorio que contiene los certificados de autoridad
       SSL CA,
       almacenados en formato PEM.

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_CIPHER](#pdo-mysql.constants.attr-ssl-cipher)**


       Una lista de uno o más cifrados autorizados para utilizar con
       SSL, en un formato comprendido por OpenSSL.
       Por ejemplo: DHE-RSA-AES256-SHA:AES128-SHA

      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.







     **[Pdo\Mysql::ATTR_SSL_VERIFY_SERVER_CERT](#pdo-mysql.constants.attr-ssl-verify-server-cert)**


       Proporciona un medio para desactivar la verificación del certificado del servidor SSL.

      **Nota**:

        Esta opción está disponible únicamente con mysqlnd.




      **Nota**:

        Puede utilizarse únicamente en el array driver_options
        al construir una nueva conexión a la base de datos.






# Pdo\Mysql::getWarningCount

(PHP 8 &gt;= 8.4.0)

Pdo\Mysql::getWarningCount — Devuelve el número de advertencias de la última consulta ejecutada

### Descripción

public **Pdo\Mysql::getWarningCount**(): [int](#language.types.integer)

Devuelve el número de advertencias de la última consulta ejecutada.

**Nota**:

    Para recuperar los mensajes de advertencia, puede utilizarse el siguiente comando SQL:
    SHOW WARNINGS [limit row_count].

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el número de advertencias generadas por la última consulta.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Mysql::getWarningCount()**

&lt;?php

$conn = PDO::connect("mysql:host=localhost;dbname=test;charset=utf8mb4", 'user', 'password');

$conn-&gt;query('SELECT 42/0');
if ($conn-&gt;getWarningCount() &gt; 0) {
$result = $conn-&gt;query("SHOW WARNINGS");
$row = $result-&gt;fetch();
printf("%s (%d): %s\n", $row[0], $row[1], $row[2]);
}

?&gt;

El ejemplo anterior mostrará:

Warning (1365): Division by 0

## Tabla de contenidos

- [Pdo\Mysql::getWarningCount](#pdo-mysql.getwarningcount) — Devuelve el número de advertencias de la última consulta ejecutada

# Funciones Microsoft del controlador PDO SQL Server (PDO_SQLSRV)

## Introducción

    PDO_SQLSRV es un controlador que implementa la [interfaz
    PDO (PHP Data Objects)](#intro.pdo) para permitir el acceso desde PHP a las bases de
    datos MS SQL Server (versión SQL Server 2005 y superiores) y SQL Azure.

## Instalación

La versión más reciente del controlador está disponible para su descarga aquí :
[» descarga SQLSRV](http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx).
Las fuentes del controlador se alojan en un [» repositorio público](https://github.com/microsoft/msphpsql).

Para obtener más información acerca de los requisitos del sistema, consúltese el
capítulo sobre los
[» requisitos del sistema SQLSRV](http://msdn.microsoft.com/en-us/library/cc296170.aspx).

En Windows, la extensión PDO_SQLSRV se activa descargando y añadiendo
los archivos DLL correspondientes en el directorio de extensiones de PHP
y la entrada correspondiente en el archivo php.ini.

En Linux y macOS, la extensión PDO_SQLSRV puede ser instalada utilizando [» PECL](https://pecl.php.net/).
Consúltese el [» tutorial de instalación](https://docs.microsoft.com/en-us/sql/connect/php/installation-tutorial-linux-mac) para más detalles.
[» controlador ODBC del servidor SQL de Microsoft para Linux](http://www.microsoft.com/download/en/details.aspx?id=28160).

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO::SQLSRV_TXN_READ_UNCOMMITTED](#pdo.constants.sqlsrv-txn-read-uncommitted)**
    ([int](#language.types.integer))



     Esta constante es un valor posible para la clave "TransactionIsolation" del DSN para SQLSRV.
     Esta constante establece el nivel de aislamiento de la transacción a "Read Uncommitted".





    **[PDO::SQLSRV_TXN_READ_COMMITTED](#pdo.constants.sqlsrv-txn-read-committed)**
    ([int](#language.types.integer))



     Esta constante es un valor posible para la clave "TransactionIsolation" del DSN para SQLSRV.
     Esta constante establece el nivel de aislamiento de la transacción a "Read Committed".





    **[PDO::SQLSRV_TXN_REPEATABLE_READ](#pdo.constants.sqlsrv-txn-repeatable-read)**
    ([int](#language.types.integer))



     Esta constante es un valor posible para la clave "TransactionIsolation" del DSN para SQLSRV.
     Esta constante establece el nivel de aislamiento de la transacción a "Repeatable Read".





    **[PDO::SQLSRV_TXN_SNAPSHOT](#pdo.constants.sqlsrv-txn-snapshot)**
    ([int](#language.types.integer))



     Esta constante es un valor posible para la clave "TransactionIsolation" del DSN para SQLSRV.
     Esta constante establece el nivel de aislamiento de la transacción a "Snapshot".





    **[PDO::SQLSRV_TXN_SERIALIZABLE](#pdo.constants.sqlsrv-txn-serializable)**
    ([int](#language.types.integer))



     Esta constante es un valor posible para la clave "TransactionIsolation" del DSN para SQLSRV.
     Esta constante establece el nivel de aislamiento de la transacción a "Serializable".





    **[PDO::SQLSRV_ENCODING_BINARY](#pdo.constants.sqlsrv-encoding-binary)**
    ([int](#language.types.integer))



     Especifica que estos datos son enviados al (o recibidos del) servidor como un flujo de bytes,
     sin realizar codificación o traducción. Esta constante puede ser utilizada en las llamadas a
     PDOStatement::setAttribute, PDO::prepare, PDOStatement::bindColumn, y
     PDOStatement::bindParam.





    **[PDO::SQLSRV_ENCODING_SYSTEM](#pdo.constants.sqlsrv-encoding-system)**
    ([int](#language.types.integer))



     Especifica que estos datos son enviados al (o recibidos del) servidor como un flujo de caracteres 8 bits,
     como se especifica en la página de código de la configuración local de Windows activa en el sistema.
     Todo carácter multibyte, o carácter que no existe en esta página de código,
     es sustituido por un simple signo de interrogación (?). Esta constante puede ser utilizada
     en las llamadas a PDOStatement::setAttribute, PDO::setAttribute, PDO::prepare,
     PDOStatement::bindColumn, y PDOStatement::bindParam.





    **[PDO::SQLSRV_ENCODING_UTF8](#pdo.constants.sqlsrv-encoding-utf8)**
    ([int](#language.types.integer))



     Especifica que estos datos son enviados al (o recibidos del) servidor como un flujo de caracteres UTF-8.
     Se trata de la codificación por defecto. Esta constante puede ser utilizada
     en las llamadas a PDOStatement::setAttribute, PDO::setAttribute, PDO::prepare,
     PDOStatement::bindColumn, y PDOStatement::bindParam.





    **[PDO::SQLSRV_ENCODING_DEFAULT](#pdo.constants.sqlsrv-encoding-default)**
    ([int](#language.types.integer))



     Especifica que estos datos son enviados al (o recibidos del) servidor utilizando la codificación
     PDO::SQLSRV_ENCODING_SYSTEM si es especificada durante la conexión. Si es especificada
     en una instrucción "prepare", se utiliza la codificación de la conexión.
     Esta constante puede ser utilizada en las llamadas a PDOStatement::setAttribute,
     PDO::setAttribute, PDO::prepare, PDOStatement::bindColumn, y PDOStatement::bindParam.





    **[PDO::SQLSRV_ATTR_QUERY_TIMEOUT](#pdo.constants.sqlsrv-attr-query-timeout)**
    ([int](#language.types.integer))



     Un entero positivo o nulo que representa la duración del tiempo límite, en segundos. Cero (0)
     es el valor por omisión y significa que no hay tiempo límite.
     Esta constante puede ser utilizada en las llamadas a
     PDOStatement::setAttribute, PDO::setAttribute, y PDO::prepare.





    **[PDO::SQLSRV_ATTR_DIRECT_QUERY](#pdo.constants.sqlsrv-attr-direct-query)**
    ([int](#language.types.integer))



     Indica una consulta que debe ser ejecutada directamente, sin ser preparada.
     Esta constante puede ser utilizada en las llamadas a PDO::setAttribute, y PDO::prepare.
     Para más información, ver (en inglés)
     [» Direct and Prepared Statement Execution](http://msdn.microsoft.com/en-us/library/ff754356.aspx).

# PDO_SQLSRV DSN

(PECL pdo_sqlsrv &gt;= 2.0.1)

PDO_SQLSRV DSN — Conexión a bases de datos MS SQL Server y SQL Azure

### Descripción

    El archivo DSN (Data Source Name) PDO_SQLSRV se compone de los siguientes elementos:




      prefijo DSN


        El prefijo DSN es **sqlsrv:**.






      APP


        El nombre de la aplicación, utilizado para las trazas.






      ConnectionPooling


        Especifica si la conexión está asignada a un pool de conexiones
        (1 o **[true](#constant.true)**) o no (0 o **[false](#constant.false)**).






      Database


        El nombre de la base de datos.






      Encrypt


        Especifica si la comunicación con el servidor SQL Server está cifrada
        (1 o **[true](#constant.true)**) o no cifrada (0 o **[false](#constant.false)**).






      Failover_Partner


        Especifica el servidor y la instancia de la base de datos espejo (si está
        activada y configurada) a utilizar cuando el servidor principal es
        inaccesible.






      LoginTimeout


        Especifica el número de segundos de espera antes de detener y poner en
        error el intento de conexión.






      MultipleActiveResultSets


        Desactiva, o activa explícitamente, el soporte para juegos de resultados
        múltiples (Multiple Active Result Sets, MARS).






      QuotedId


        Especifica si se deben utilizar las reglas SQL-92 para los identificadores
        entre comillas (1 o **[true](#constant.true)**) o si se deben utilizar las reglas Transact-SQL estándar (0 o **[false](#constant.false)**).






      Server


        El nombre del servidor de base de datos.






      TraceFile


        La ruta del archivo utilizado para las trazas.






      TraceOn


        Especifica si las trazas ODBC están activadas (1 o **[true](#constant.true)**) o desactivadas
        (0 o **[false](#constant.false)**) al activar la conexión.






      TransactionIsolation


        Especifica el nivel de aislamiento de la transacción. Los valores posibles
        para esta opción son
        PDO::SQLSRV_TXN_READ_UNCOMMITTED, PDO::SQLSRV_TXN_READ_COMMITTED,
        PDO::SQLSRV_TXN_REPEATABLE_READ, PDO::SQLSRV_TXN_SNAPSHOT, y
        PDO::SQLSRV_TXN_SERIALIZABLE.






      TrustServerCertificate


        Especifica si el cliente debe confiar (1 o **[true](#constant.true)**) o rechazar
        (0 o **[false](#constant.false)**) un certificado servidor autosignado.






      WSID


        Especifica el nombre de la computadora para las trazas.






### Ejemplos

     **Ejemplo #1 Ejemplos de DSN PDO_SQLSRV**



      El siguiente ejemplo muestra cómo conectarse a la base de datos MS SQL Server especificada:


$c = new PDO("sqlsrv:Server=localhost;Database=bddtest", "Utilisateur", "MotDePasse");

      El siguiente ejemplo muestra cómo conectarse a la base de datos MS SQL Server especificada
      en un puerto específico:


$c = new PDO("sqlsrv:Server=localhost,1521;Database=bddtest", "Utilisateur", "MotDePasse");

      El siguiente ejemplo muestra cómo conectarse a una base de datos SQL Azure con
      el ID servidor 12345abcde. Tenga en cuenta que, al conectarse a Azure con PDO,
      su nombre de usuario será Utilisateur@12345abcde (Utilisateur@IdServidor).


$c = new PDO("sqlsrv:Server=12345abcde.database.windows.net;Database=bddtest", "Utilisateur@12345abcde", "MotDePasse");

## Tabla de contenidos

- [PDO_SQLSRV DSN](#ref.pdo-sqlsrv.connection) — Conexión a bases de datos MS SQL Server y SQL Azure

    # Funciones del controlador PDO Oracle (PDO_OCI)

## Instalación

Si la base de datos Oracle se encuentra en la misma máquina que PHP, el software de la base de datos contiene ya las bibliotecas necesarias. Cuando PHP se encuentra en una máquina diferente, utilícense las bibliotecas gratuitas
[» Oracle Instant Client](https://www.oracle.com/database/technologies/instant-client.html).
Para más detalles consúltese la sección sobre
[Requisitos OCI8](#oci8.requirements).

## PHP 8.4

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 8.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/PDO_OCI](https://pecl.php.net/package/PDO_OCI).

## PHP &lt; 8.4

Utilícese **--with-pdo-oci[=DIR]** para instalar
la extensión PDO Oracle OCI, donde la opción [=DIR] es el directorio Oracle Home. [=DIR] corresponde por omisión
a la variable de entorno $ORACLE_HOME.

Utilícese **--with-pdo-oci=instantclient,prefix,version**
para un SDK Oracle Instant Client, donde prefix y
version están configurados.

// Utilización de $ORACLE_HOME
$ ./configure --with-pdo-oci

// Utilización de OIC para Linux con 10.2.0.3 RPMs con el prefijo /usr
$ ./configure --with-pdo-oci=instantclient,/usr,10.2.0.3

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO::OCI_ATTR_ACTION](#pdo.constants.oci-attr-action)**
     ([int](#language.types.integer))



     Proporciona un medio para especificar la acción sobre la sesión de la base de datos.




     Existe a partir de PHP  7.2.16 y 7.3.3








    **[PDO::OCI_ATTR_CLIENT_INFO](#pdo.constants.oci-attr-client-info)**
     ([int](#language.types.integer))



     Proporciona un medio para especificar la información del cliente sobre la sesión de la base de datos.




     Existe a partir de PHP  7.2.16 y 7.3.3








    **[PDO::OCI_ATTR_CLIENT_IDENTIFIER](#pdo.constants.oci-attr-client-identifier)**
     ([int](#language.types.integer))



     Proporciona un medio para especificar el identificador del cliente sobre la sesión de la base de datos.




     Existe a partir de PHP  7.2.16 y 7.3.3








    **[PDO::OCI_ATTR_MODULE](#pdo.constants.oci-attr-module)**
     ([int](#language.types.integer))



     Proporciona un medio para especificar el módulo sobre la sesión de la base de datos.




     Existe a partir de PHP  7.2.16 y 7.3.3
















    # PDO_OCI DSN

    (PECL PDO_OCI &gt;= 0.1.0)

PDO_OCI DSN — Conexión a bases de datos Oracle

    ### Descripción


     El Data Source Name (DSN) de PDO_OCI se compone de los siguientes elementos:




       Prefijo DSN


         El prefijo DSN es **oci:**.






       dbname (Oracle Instant Client)


         El URI de conexión de Oracle Instant Client tiene la forma de
         dbname=//hostname:port-number/database.
         Si se conecta a una base de datos definida en
         tnsnames.ora, utilice solo el nombre de la
         base de datos:
         dbname=database.






       charset


         El juego de caracteres del lado cliente para el entorno actual.










    ### Ejemplos





      **Ejemplo #1 Ejemplos con PDO_OCI DSN**



       Los siguientes ejemplos muestran PDO_OCI DSN para conectarse a bases
       de datos Oracle:


// Conexión a una base de datos definida en tnsnames.ora
oci:dbname=mydb

// Conexión utilizando el cliente Oracle Instant
oci:dbname=//localhost:1521/mydb

## Tabla de contenidos

- [PDO_OCI DSN](#ref.pdo-oci.connection) — Conexión a bases de datos Oracle

    # Funciones del controlador PDO ODBC y DB2 (PDO_ODBC)

    ## Introducción

    PDO_ODBC es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo) para
    permitir el acceso de PHP a las bases de datos mediante los controladores de ODBC
    o mediante la biblioteca de interfaz IBM DB2 Call Level (DB2 CLI). PDO_ODBC
    actualmente soporta tres "sabores" diferentes de los controladores de bases de
    datos:

         ibm-db2


           Permite el acceso a IBM DB2 Universal Database,
           Cloudscape y Apache Derby Server utilizando el cliente gratuito DB2 express-C.






         unixODBC


           Permite el acceso a los servidores de bases de datos mediante el controlador
           de gestión unixODBC y las bases de datos poseídas por los controladores
           ODBC.






         generic


           Ofrece una opción de compilación para los controladores de gestión ODBC que
           no son explícitamente soportados por PDO_ODBC.





    En Windows, php_pdo_odbc.dll debe ser activado como extensión en php.ini. Está vinculado con el Windows ODBC Driver Manager, por lo que PHP puede
    conectarse a cualquier base de datos catalogada como un System DSN.

## Instalación

**PDO_ODBC en sistemas UNIX**

- PDO_ODBC está incluido en las fuentes de PHP. Puede compilarse la extensión PDO_ODBC ya sea de forma estática o como módulo compartido utilizando los siguientes comandos **configure**.

    ibm_db2

./configure --with-pdo-odbc=ibm-db2,/opt/IBM/db2/V8.1/

        Para construir PDO_ODBC con el sabor ibm-db2, deben haberse instalado previamente los encabezados de desarrollo de la aplicación DB2 en la misma máquina donde se compila PDO_ODBC. Los encabezados de desarrollo de la aplicación DB2 son una opción de instalación en los servidores DB2 y también están disponibles como DB2 Application Development Client gratuitamente disponibles para descarga desde el
        [» sitio](https://www.ibm.com/developerworks/downloads/im/db2express/index.html).
        IBM developerWorks.


        Si no se especifica una ubicación para las bibliotecas y los encabezados de DB2 en el comando **configure**, PDO_ODBC tomará por omisión
        /home/db2inst1/sqllib.






      unixODBC




./configure --with-pdo-odbc=unixODBC,/usr/local

        Si no se especifica una ubicación para las bibliotecas y los encabezados de unixODBC en el comando **configure**, PDO_ODBC tomará por omisión
        /usr/local.




      generic



./configure --with-pdo-odbc=generic,/usr/local,libname,ldflags,cflags

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO_ODBC_TYPE](#constant.pdo-odbc-type)**
    ([string](#language.types.string))











    **[PDO::ODBC_ATTR_USE_CURSOR_LIBRARY](#pdo.constants.odbc-attr-use-cursor-library)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Odbc::ATTR_USE_CURSOR_LIBRARY](#pdo-odbc.constants.attr-use-cursor-library)**.





    **[PDO::ODBC_SQL_USE_IF_NEEDED](#pdo.constants.odbc-sql-use-if-needed)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Odbc::SQL_USE_IF_NEEDED](#pdo-odbc.constants.sql-use-if-needed)**.





    **[PDO::ODBC_SQL_USE_DRIVER](#pdo.constants.odbc-sql-use-driver)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Odbc::SQL_USE_DRIVER](#pdo-odbc.constants.sql-use-driver)**.





    **[PDO::ODBC_SQL_USE_ODBC](#pdo.constants.odbc-sql-use-odbc)**
    ([int](#language.types.integer))



     Alias de **[Pdo\Odbc::SQL_USE_ODBC](#pdo-odbc.constants.sql-use-odbc)**.





    **[PDO::ODBC_ATTR_ASSUME_UTF8](#pdo.constants.odbc-attr-assume-utf8)**
     ([bool](#language.types.boolean))



     Alias de **[Pdo\Odbc::ATTR_ASSUME_UTF8](#pdo-odbc.constants.attr-assume-utf8)**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de PDO_ODBC**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [pdo_odbc.connection_pooling](#ini.pdo-odbc.connection-pooling)
      "strict"
      **[INI_ALL](#constant.ini-all)**
       



      [pdo_odbc.db2_instance_name](#ini.pdo-odbc.db2-instance-name)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Esta funcionalidad obsoleta *será*

ciertamente _eliminada_ en el futuro.

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     pdo_odbc.connection_pooling
     [string](#language.types.string)



      Si agrupar conexiones de ODBC. Se puede usar "strict",
      "relaxed" o "off" (que es igual a
      ""). El parámetro describe cómo de estricta debería ser el
      administrador de conexiones cuando coincidan los parámetros de conexión con conexiones
      existentes en la agrupación.  **strict** es el valor predetermiando recomendado, y
      dará como resultado en el uso de conexiones almacenadas en caché solamente cuando todos los
      parámetros de conexión coincidan exactamente.  **relaxed** dará como
      resultado el uso de conexiones almacenadas en caché cuando se utilicen parámetros de conexión
      similares. Esto puede resultar en el aumento del uso de la caché, con el riesgo de
      perder información de conexión entre (por ejemplo) hosts virtuales.




      Este ajuste solamente se puede cambiar desde el fichero php.ini,
      y afecta al proceso completo; cualquier otro módulo dentro del proceso
      que utilice las mismas bibliotecas de ODBC también se verá afectado,
      incluyendo la [Extensión ODBC Unificada](#ref.uodbc).



     **Advertencia**

       **relaxed** no debería usarse en servidores
       compartidos, por razones de seguridad.




     **Sugerencia**

       Deje este ajuste a la configuración **strict** predeterminada
       a menos que tenga una buena razón para cambiarlo.








    pdo_odbc.db2_instance_name
    [string](#language.types.string)



     Si se compila PDO_ODBC usando el sabor db2,
     este ajuste establece el valor de la variable de entorno DB2INSTANCE en
     sistemas operativos Linux y UNIX al nombre especificado de la instancia
     de DB2. También habilita PDO_ODBC para resolver la ubicación de las bibliotecas
     de DB2 y realizar conexiones catalogadas a bases de datos DB2.




     Este ajuste solamente se puede cambiar desde el fichero php.ini,
     y afecta al proceso completo; cualquier otro módulo dentro del proceso
     que utilice las mismas bibliotescas de ODBC también se verá afectado,
     incluyendo la [Extensión ODBC Unificada](#ref.uodbc).




     Este ajuste no tiene efecto en Windows.
















    # PDO_ODBC DSN

    (PECL PDO_ODBC &gt;= 0.1.0)

PDO_ODBC DSN — Conexión a bases de datos ODBC o DB2

    ### Descripción


     El Data Source Name (DSN) de PDO_ODBC se compone de los siguientes elementos:




       Prefijo DSN


         El prefijo DSN es **odbc:**. Si se conecta a una base de datos catalogada en el controlador de ODBC
         Manager o en el catálogo de DB2, se puede añadir el nombre del catálogo de la base de datos al DSN.






       DSN


         El nombre de la base de datos catalogada en el controlador ODBC
         Manager o el catálogo DB2. Alternativamente, se puede proporcionar una
         cadena de conexión completa para ODBC para conectarse a una base de
         datos como se describe en
         [» http://www.connectionstrings.com/](http://www.connectionstrings.com/).






       UID


         El nombre de usuario para la conexión. Si se especifica el usuario en el DSN, PDO ignorará el valor del usuario en el argumento en el constructor PDO.






       PWD


         La contraseña del usuario para la conexión. Si se especifica la contraseña en el DSN, PDO ignorará el valor de la contraseña en el argumento en el constructor PDO.










    ### Historial de cambios





        Versión
        Descripción






        8.4.0

         Al pasar una [string](#language.types.string) vacía al argumento de contraseña en el constructor PDO, pwd
         no se incluía en la cadena de conexión creada hasta ahora, pero el comportamiento ha sido modificado para incluirla
         como una cadena vacía. Pasar **[null](#constant.null)** para el argumento de contraseña en el constructor PDO produce el mismo
         comportamiento que antes.




        8.4.0

         Cambio de comportamiento para ignorar por separado el argumento de nombre de usuario y el argumento de contraseña en el constructor PDO
         cuando el DSN contiene uid o pwd.
         Anteriormente, si cualquiera de uid o pwd estaba incluido en el DSN,
         los argumentos de nombre de usuario y contraseña en el constructor PDO eran ignorados.










    ### Ejemplos





      **Ejemplo #1 Ejemplo con PDO_ODBC DSN (controlador ODBC Manager)**



       El siguiente ejemplo muestra PDO_ODBC DSN para conectarse a una base
       de datos ODBC catalogada como testdb en el controlador ODBC
       Manager:





odbc:testdb

      **Ejemplo #2 Ejemplo con PDO_ODBC DSN (conexión no catalogada IBM DB2)**



       El siguiente ejemplo muestra PDO_ODBC DSN para conectarse a una base
       de datos IBM DB2 llamada **SAMPLE** utilizando la
       sintaxis completa de ODBC DSN:





odbc:DRIVER={IBM DB2 ODBC DRIVER};HOSTNAME=localhost;PORT=50000;DATABASE=SAMPLE;PROTOCOL=TCPIP;UID=db2inst1;PWD=ibmdb2;

      **Ejemplo #3 Ejemplo con PDO_ODBC DSN (conexión no catalogada Microsoft Access)**



       El siguiente ejemplo muestra PDO_ODBC DSN para conectarse a una base
       de datos Microsoft Access registrada en
       **C:\db.mdb** utilizando la sintaxis completa
       de ODBC DSN:





odbc:Driver={Microsoft Access Driver (\*.mdb)};Dbq=C:\\db.mdb;Uid=Admin

## Tabla de contenidos

- [PDO_ODBC DSN](#ref.pdo-odbc.connection) — Conexión a bases de datos ODBC o DB2

# La clase Pdo\Odbc

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO ODBC.

## Sinopsis de la Clase

     class **Pdo\Odbc**



     extends
      [PDO](#class.pdo)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [ATTR_USE_CURSOR_LIBRARY](#pdo-odbc.constants.attr-use-cursor-library);

    public
     const
     [int](#language.types.integer)
      [ATTR_ASSUME_UTF8](#pdo-odbc.constants.attr-assume-utf8);

    public
     const
     [int](#language.types.integer)
      [SQL_USE_IF_NEEDED](#pdo-odbc.constants.sql-use-if-needed);

    public
     const
     [int](#language.types.integer)
      [SQL_USE_DRIVER](#pdo-odbc.constants.sql-use-driver);

    public
     const
     [int](#language.types.integer)
      [SQL_USE_ODBC](#pdo-odbc.constants.sql-use-odbc);


    /* Métodos heredados */

public [PDO::\_\_construct](#pdo.construct)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Odbc::ATTR_USE_CURSOR_LIBRARY](#pdo-odbc.constants.attr-use-cursor-library)**


       Esta opción controla el uso de la biblioteca de cursoes ODBC.
       La biblioteca de cursoes ODBC admite ciertas funcionalidades avanzadas de ODBC
       (por ejemplo, cursoes desplazables por bloques),
       que pueden no estar implementadas por el controlador.
       Se admiten los siguientes valores:




         **[Pdo\Odbc::SQL_USE_IF_NEEDED](#pdo-odbc.constants.sql-use-if-needed)**


           Utiliza la biblioteca de cursoes ODBC si es necesario.
           Este es el valor por omisión.




         **[Pdo\Odbc::SQL_USE_DRIVER](#pdo-odbc.constants.sql-use-driver)**


           No utilizar nunca la biblioteca de cursoes ODBC.




         **[Pdo\Odbc::SQL_USE_ODBC](#pdo-odbc.constants.sql-use-odbc)**


           Utilizar siempre la biblioteca de cursoes ODBC.








     **[Pdo\Odbc::ATTR_ASSUME_UTF8](#pdo-odbc.constants.attr-assume-utf8)**


       Solo para Windows.
       Si **[true](#constant.true)**, los datos de caracteres codificados en UTF-16
       (CHAR, VARCHAR y LONGVARCHAR)
       se convierten a UTF-8 al leer o escribir datos en la base de datos.
       Si **[false](#constant.false)** (el valor por omisión), la conversión de la codificación de caracteres puede ser realizada por el controlador.



# Funciones del controlador PDO PostgreSQL (PDO_PGSQL)

## Introducción

     PDO_PGSQL es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo) para
     permitir el acceso de PHP a las bases de datos PostgreSQL.






    ## Tipos de recursos


     Esta extensión define un recurso de flujo, devuelto
     por la función [PDO::pgsqlLOBOpen()](#pdo.pgsqllobopen).

## Instalación

Utilice **--with-pdo-pgsql[=DIR]** para instalar
la extensión PDO PostgreSQL, donde el opcional [=DIR]
es el directorio base de la instalación de PostgreSQL o la ruta a _pg_config_.

$ ./configure --with-pdo-pgsql

## Constantes predefinidas

Las constantes a continuación son
definidas por este controlador y solo estarán disponibles cuando la extensión
haya sido compilada en PHP o cargada dinámicamente del motor de ejecución.
Además, estas constantes específicas del controlador deberían ser usadas solo
si se usa este controlador. Usar atributos específicos de un controlador
con otro controlador podría causar un comportamiento inesperado.
[PDO::getAttribute()](#pdo.getattribute) podría ser usado para obtener
el atributo **[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name)** para verificar el
controlador, si su código puede funcionar en múltiples controladores.

    **[PDO::PGSQL_ATTR_DISABLE_PREPARES](#pdo.constants.pgsql-attr-disable-prepares)**
     ([int](#language.types.integer))



     Alias de **[Pdo\Pgsql::ATTR_DISABLE_PREPARES](#pdo-pgsql.constants.attr-disable-prepares)**.









    ## Notas generales

    **Nota**:



      Los campos bytea se devuelven en forma de flujo.










    # PDO_PGSQL DSN

    (PHP 5 &gt;= 5.1.0, PHP 7, PECL PDO_PGSQL &gt;= 0.1.0)

PDO_PGSQL DSN — Conexión a las bases de datos PostgreSQL

    ### Descripción


     El Data Source Name (DSN) de PDO_PGSQL se compone de los siguientes elementos,
     delimitados por espacios o puntos y comas :




       Prefijo DSN


         El prefijo DSN es **pgsql:**.






       host


         El host donde se encuentra el servidor de base de datos.






       port


         El puerto donde se encuentra el servidor de base de datos.






       dbname


         El nombre de la base de datos.






       user


         El nombre de usuario para la conexión. Si se especifica
         el usuario en el DSN, PDO ignorará el valor del usuario en
         el argumento del constructor PDO.






       password


         La contraseña del usuario para la conexión. Si se
         especifica la contraseña en el DSN, PDO ignorará el valor de la contraseña en
         el argumento del constructor PDO.






       sslmode


         El modo SSL. Los valores admitidos y su significado se listan en
         la sección [» Documentación PostgreSQL](http://www.postgresql.org/docs/current/interactive/).








     **Nota**:

       Todos los puntos y comas en la cadena DSN son reemplazados por espacios,
       porque PostgreSQL espera este formato.
       Esto implica que los puntos y comas en uno de los componentes
       (por ejemplo password o dbname)
       no son soportados.









    ### Ejemplos





      **Ejemplo #1 Ejemplos con PDO_PGSQL DSN**



       El siguiente ejemplo muestra un PDO_PGSQL DSN para conectarse a una
       base de datos PostgreSQL :


pgsql:host=localhost;port=5432;dbname=testdb;user=bruce;password=mypass

# PDO::pgsqlCopyFromArray

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

PDO::pgsqlCopyFromArray —
Alias de [Pdo\Pgsql::copyFromArray()](#pdo-pgsql.copyfromarray)

### Descripción

public **PDO::pgsqlCopyFromArray**(
    [string](#language.types.string) $tableName,
    [array](#language.types.array) $rows,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Pgsql::copyFromArray()](#pdo-pgsql.copyfromarray).

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# PDO::pgsqlCopyFromFile

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

PDO::pgsqlCopyFromFile —
Alias de [Pdo\Pgsql::copyFromFile()](#pdo-pgsql.copyfromfile)

### Descripción

public **PDO::pgsqlCopyFromFile**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Pgsql::copyFromFile()](#pdo-pgsql.copyfromfile).

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# PDO::pgsqlCopyToArray

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

PDO::pgsqlCopyToArray —
Alias de [Pdo\Pgsql::copyToArray()](#pdo-pgsql.copytoarray)

### Descripción

public **PDO::pgsqlCopyToArray**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [array](#language.types.array)|[false](#language.types.singleton)

Este método es un alias de: [Pdo\Pgsql::copyToArray()](#pdo-pgsql.copytoarray).

### Valores devueltos

Devuelve un [array](#language.types.array) de líneas, o **[false](#constant.false)** si ocurre un error.

# PDO::pgsqlCopyToFile

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

PDO::pgsqlCopyToFile —
Alias de [Pdo\Pgsql::copyToFile()](#pdo-pgsql.copytofile)

### Descripción

public **PDO::pgsqlCopyToFile**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Pgsql::copyToFile()](#pdo-pgsql.copytofile).

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

# PDO::pgsqlGetNotify

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

PDO::pgsqlGetNotify —
Alias de [Pdo\Pgsql::getNotify()](#pdo-pgsql.getnotify)

### Descripción

public **PDO::pgsqlGetNotify**([int](#language.types.integer) $fetchMode = PDO::FETCH_DEFAULT, [int](#language.types.integer) $timeoutMilliseconds = 0): [array](#language.types.array)|[false](#language.types.singleton)

Este método es un alias de: [Pdo\Pgsql::getNotify()](#pdo-pgsql.getnotify).

### Valores devueltos

Si una o varias notificaciones están en espera, se devuelve una sola fila
con los campos message y pid, de lo contrario,
se devuelve **[false](#constant.false)**.

# PDO::pgsqlGetPid

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

PDO::pgsqlGetPid —
Alias de [Pdo\Pgsql::getPid()](#pdo-pgsql.getpid)

### Descripción

public **PDO::pgsqlGetPid**(): [int](#language.types.integer)

Este método es un alias de: [Pdo\Pgsql::getPid()](#pdo-pgsql.getpid).

# PDO::pgsqlLOBCreate

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL pdo_pgsql &gt;= 1.0.2)

PDO::pgsqlLOBCreate —
Alias de [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate)

### Descripción

public **PDO::pgsqlLOBCreate**(): [string](#language.types.string)

Este método es un alias de: [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate).

# PDO::pgsqlLOBOpen

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL pdo_pgsql &gt;= 1.0.2)

PDO::pgsqlLOBOpen —
Alias de [Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen)

### Descripción

public **PDO::pgsqlLOBOpen**([string](#language.types.string) $oid, [string](#language.types.string) $mode = "rb"): [resource](#language.types.resource)|[false](#language.types.singleton)

Este método es un alias de: [Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen).

# PDO::pgsqlLOBUnlink

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8, PECL pdo_pgsql &gt;= 1.0.2)

PDO::pgsqlLOBUnlink —
Alias de [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink)

### Descripción

public **PDO::pgsqlLOBUnlink**([string](#language.types.string) $oid): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink).

## Tabla de contenidos

- [PDO_PGSQL DSN](#ref.pdo-pgsql.connection) — Conexión a las bases de datos PostgreSQL
- [PDO::pgsqlCopyFromArray](#pdo.pgsqlcopyfromarray) — Alias de Pdo\Pgsql::copyFromArray
- [PDO::pgsqlCopyFromFile](#pdo.pgsqlcopyfromfile) — Alias de Pdo\Pgsql::copyFromFile
- [PDO::pgsqlCopyToArray](#pdo.pgsqlcopytoarray) — Alias de Pdo\Pgsql::copyToArray
- [PDO::pgsqlCopyToFile](#pdo.pgsqlcopytofile) — Alias de Pdo\Pgsql::copyToFile
- [PDO::pgsqlGetNotify](#pdo.pgsqlgetnotify) — Alias de Pdo\Pgsql::getNotify
- [PDO::pgsqlGetPid](#pdo.pgsqlgetpid) — Alias de Pdo\Pgsql::getPid
- [PDO::pgsqlLOBCreate](#pdo.pgsqllobcreate) — Alias de Pdo\Pgsql::lobCreate
- [PDO::pgsqlLOBOpen](#pdo.pgsqllobopen) — Alias de Pdo\Pgsql::lobOpen
- [PDO::pgsqlLOBUnlink](#pdo.pgsqllobunlink) — Alias de Pdo\Pgsql::lobUnlink

# La clase Pdo\Pgsql

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO PostgreSQL.




    Este controlador admite un analizador de consultas SQL dedicado para el dialecto PostgreSQL.
    Puede gestionar los siguientes elementos:



     -

       Los literales de string simples y dobles, con el duplicado como mecanismo de escape



     -

       Los literales de string "escapados" de estilo C



     -

       Los literales de string en dólares



     -

       Dos guiones y los comentarios de estilo C (no anidados)



     -

       El soporte de ?? como secuencia de escape para
       el operador ?.



## Sinopsis de la Clase

     class **Pdo\Pgsql**



     extends
      [PDO](#class.pdo)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [ATTR_DISABLE_PREPARES](#pdo-pgsql.constants.attr-disable-prepares);

    public
     const
     [int](#language.types.integer)
      [ATTR_RESULT_MEMORY_SIZE](#pdo-pgsql.constants.attr-result-memory-size);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_IDLE](#pdo-pgsql.constants.transaction-idle);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_ACTIVE](#pdo-pgsql.constants.transaction-active);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_INTRANS](#pdo-pgsql.constants.transaction-intrans);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_INERROR](#pdo-pgsql.constants.transaction-inerror);

    public
     const
     [int](#language.types.integer)
      [TRANSACTION_UNKNOWN](#pdo-pgsql.constants.transaction-unknown);


    /* Métodos */

public [copyFromArray](#pdo-pgsql.copyfromarray)(
    [string](#language.types.string) $tableName,
    [array](#language.types.array) $rows,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [copyFromFile](#pdo-pgsql.copyfromfile)(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [copyToArray](#pdo-pgsql.copytoarray)(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [array](#language.types.array)|[false](#language.types.singleton)
public [copyToFile](#pdo-pgsql.copytofile)(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)
public [escapeIdentifier](#pdo-pgsql.escapeidentifier)([string](#language.types.string) $input): [string](#language.types.string)
public [getNotify](#pdo-pgsql.getnotify)([int](#language.types.integer) $fetchMode = PDO::FETCH_DEFAULT, [int](#language.types.integer) $timeoutMilliseconds = 0): [array](#language.types.array)|[false](#language.types.singleton)
public [getPid](#pdo-pgsql.getpid)(): [int](#language.types.integer)
public [lobCreate](#pdo-pgsql.lobcreate)(): [string](#language.types.string)|[false](#language.types.singleton)
public [lobOpen](#pdo-pgsql.lobopen)([string](#language.types.string) $oid, [string](#language.types.string) $mode = "rb"): [resource](#language.types.resource)|[false](#language.types.singleton)
public [lobUnlink](#pdo-pgsql.lobunlink)([string](#language.types.string) $oid): [bool](#language.types.boolean)
public [setNoticeCallback](#pdo-pgsql.setnoticecallback)([?](#language.types.null)[callable](#language.types.callable) $callback): [void](language.types.void.html)

    /* Métodos heredados */
    public [PDO::__construct](#pdo.construct)(

    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Pgsql::ATTR_DISABLE_PREPARES](#pdo-pgsql.constants.attr-disable-prepares)**


       Envía la consulta y los argumentos al servidor en una sola vez,
       evitando la necesidad de crear una sentencia preparada nombrada por separado.
       Si la consulta va a ser ejecutada una sola vez, esto puede reducir la latencia
       evitando un viaje de ida y vuelta innecesario al servidor.




     **[Pdo\Pgsql::ATTR_RESULT_MEMORY_SIZE](#pdo-pgsql.constants.attr-result-memory-size)**


       Devuelve la cantidad de memoria, en bytes, asignada a la instancia
       de [PDOStatement](#class.pdostatement) del resultado de la consulta especificada,
       o **[null](#constant.null)** si no existe ningún resultado antes de la ejecución de la consulta.




     **[Pdo\Pgsql::TRANSACTION_IDLE](#pdo-pgsql.constants.transaction-idle)**






     **[Pdo\Pgsql::TRANSACTION_ACTIVE](#pdo-pgsql.constants.transaction-active)**






     **[Pdo\Pgsql::TRANSACTION_INTRANS](#pdo-pgsql.constants.transaction-intrans)**






     **[Pdo\Pgsql::TRANSACTION_INERROR](#pdo-pgsql.constants.transaction-inerror)**






     **[Pdo\Pgsql::TRANSACTION_UNKNOWN](#pdo-pgsql.constants.transaction-unknown)**





# Pdo\Pgsql::copyFromArray

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::copyFromArray — Copia datos de un array PHP a una tabla

### Descripción

public **Pdo\Pgsql::copyFromArray**(
    [string](#language.types.string) $tableName,
    [array](#language.types.array) $rows,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Copia datos del array rows a la tabla
tableName utilizando separator
como delimitador de campos y la lista fields.

### Parámetros

    tableName


      Una cadena de caracteres que contiene el nombre de la tabla.




    rows


      Un [array](#language.types.array) indexado de [string](#language.types.string)s con los campos
      separados por separator.




    separator


      Un delimitador utilizado para separar los campos en una entrada del
      array rows.




    nullAs


      Cómo interpretar los valores NULL.




    fields


      La lista de campos a insertar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Pdo\Pgsql::copyToArray()](#pdo-pgsql.copytoarray) - Copia datos de una tabla a un array PHP

- [Pdo\Pgsql::copyFromFile()](#pdo-pgsql.copyfromfile) - Copia datos de un fichero a una tabla

- [Pdo\Pgsql::copyToFile()](#pdo-pgsql.copytofile) - Copia datos de una tabla a un fichero

# Pdo\Pgsql::copyFromFile

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::copyFromFile — Copia datos de un fichero a una tabla

### Descripción

public **Pdo\Pgsql::copyFromFile**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Copia datos de un fichero especificado por filename
a la tabla tableName utilizando
separator como delimitador de campos y la lista fields

### Parámetros

    tableName


      Una cadena de caracteres que contiene el nombre de la tabla.




    filename


      El nombre del fichero desde el cual importar los datos.




    separator


      Un delimitador utilizado para separar los campos en una entrada del
      array rows.




    nullAs


      Cómo interpretar los valores NULL.




    fields


      La lista de campos a insertar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Pdo\Pgsql::copyToFile()](#pdo-pgsql.copytofile) - Copia datos de una tabla a un fichero

- [Pdo\Pgsql::copyFromArray()](#pdo-pgsql.copyfromarray) - Copia datos de un array PHP a una tabla

- [Pdo\Pgsql::copyToArray()](#pdo-pgsql.copytoarray) - Copia datos de una tabla a un array PHP

# Pdo\Pgsql::copyToArray

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::copyToArray — Copia datos de una tabla a un array PHP

### Descripción

public **Pdo\Pgsql::copyToArray**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [array](#language.types.array)|[false](#language.types.singleton)

Copia datos de tableName a un array utilizando separator como delimitador de campos y la lista fields.

### Parámetros

    tableName


      Una cadena de caracteres que contiene el nombre de la tabla.




    separator


      Un delimitador utilizado para separar los campos en una entrada del
      array rows.




    nullAs


      Cómo interpretar los valores NULL.




    fields


      La lista de campos a exportar.


### Valores devueltos

Devuelve un array de filas, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Pdo\Pgsql::copyFromArray()](#pdo-pgsql.copyfromarray) - Copia datos de un array PHP a una tabla

- [Pdo\Pgsql::copyFromFile()](#pdo-pgsql.copyfromfile) - Copia datos de un fichero a una tabla

- [Pdo\Pgsql::copyToFile()](#pdo-pgsql.copytofile) - Copia datos de una tabla a un fichero

# Pdo\Pgsql::copyToFile

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::copyToFile — Copia datos de una tabla a un fichero

### Descripción

public **Pdo\Pgsql::copyToFile**(
    [string](#language.types.string) $tableName,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $nullAs = "\\\\N",
    [?](#language.types.null)[string](#language.types.string) $fields = **[null](#constant.null)**
): [bool](#language.types.boolean)

Copia datos de la tabla al fichero especificado por filename
utilizando separator como delimitador de campos y
la lista fields.

### Parámetros

    tableName


      Una cadena de caracteres que contiene el nombre de la tabla.




    filename


      El nombre del fichero donde exportar los datos.




    separator


      Un delimitador utilizado para separar los campos en una entrada del
      array rows.




    nullAs


      Cómo interpretar los valores NULL.




    fields


      La lista de campos a exportar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Pdo\Pgsql::copyFromFile()](#pdo-pgsql.copyfromfile) - Copia datos de un fichero a una tabla

- [Pdo\Pgsql::copyFromArray()](#pdo-pgsql.copyfromarray) - Copia datos de un array PHP a una tabla

- [Pdo\Pgsql::copyToArray()](#pdo-pgsql.copytoarray) - Copia datos de una tabla a un array PHP

# Pdo\Pgsql::escapeIdentifier

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::escapeIdentifier — Escapa una string para su uso como identificador SQL

### Descripción

public **Pdo\Pgsql::escapeIdentifier**([string](#language.types.string) $input): [string](#language.types.string)

Escapa una string para su uso como identificador SQL, como una tabla, una columna o un nombre de función.
Esto es útil cuando el identificador proporcionado por el usuario podría contener caracteres especiales
que no serían interpretados como parte del identificador por el analizador SQL,
o cuando el identificador podría contener caracteres en mayúsculas cuya capitalización debería preservarse.

### Parámetros

    input


      Una [string](#language.types.string) que contiene el texto a escapar.


### Valores devueltos

Una [string](#language.types.string) que contiene los datos escapados.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Pgsql::escapeIdentifier()**

&lt;?php
$pdo = new Pdo\Pgsql('pgsql:dbname=test host=localhost', $user, $pass);

$unescapedTableName = 'UnescapedTableName';
$pdo-&gt;exec("CREATE TABLE $unescapedTableName ()");

$escapedTableName = $pdo-&gt;escapeIdentifier('EscapedTableName');
$pdo-&gt;exec("CREATE TABLE $escapedTableName ()");

$statement = $pdo-&gt;query(
"SELECT relname FROM pg_stat_user_tables WHERE relname ilike '%tablename'"
);

var_export($statement-&gt;fetchAll(PDO::FETCH_COLUMN, 0));

$tableNameWithSymbols = 'Table-Name-With-Symbols';
$pdo-&gt;exec("CREATE TABLE $tableNameWithSymbols ()");
?&gt;

Resultado del ejemplo anterior es similar a:

array (
0 =&gt; 'unescapedtablename',
1 =&gt; 'EscapedTableName',
)
Fatal error: Uncaught PDOException: SQLSTATE[42601]: Syntax error: 7 ERROR: syntax error at or near "Table"
LINE 1: CREATE TABLE Table-Name-With-Symbols ()

### Ver también

- [PDO::quote()](#pdo.quote) - Protege una cadena para usarla en una consulta SQL PDO

# Pdo\Pgsql::getNotify

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::getNotify — Devuelve una notificación asíncrona

### Descripción

public **Pdo\Pgsql::getNotify**([int](#language.types.integer) $fetchMode = PDO::FETCH_DEFAULT, [int](#language.types.integer) $timeoutMilliseconds = 0): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un conjunto de resultados que representa una notificación asíncrona pendiente.

### Parámetros

    fetchMode


      El formato en el que debe estar el conjunto de resultados,
      una de las constantes siguientes:



       - **[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default)**

       - **[PDO::FETCH_BOTH](#pdo.constants.fetch-both)**

       - **[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc)**

       - **[PDO::FETCH_NUM](#pdo.constants.fetch-num)**






    timeoutMilliseconds


      El tiempo de espera para una respuesta, en milisegundos.


### Valores devueltos

Si una o varias notificaciones están pendientes, devuelve una sola fila,
con los campos message y pid,
en caso contrario devuelve **[false](#constant.false)**.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) si
fetchMode no es una de las constantes
**[PDO::FETCH\_\*](#pdo.constants.fetch-default)**
válidas.

Se lanza una [ValueError](#class.valueerror) si
timeoutMilliseconds es inferior a 0.

Se lanza una **Warning** si
timeoutMilliseconds es superior al valor
que puede contener un entero firmado de 32 bits, en cuyo caso será
el valor máximo de un entero firmado de 32 bits.

### Ver también

- [PDO::query()](#pdo.query) - Prepara y ejecuta una consulta SQL sin marcadores de sustitución

- [PDOStatement::fetch()](#pdostatement.fetch) - Recupera la siguiente línea de un conjunto de resultados PDO

- [PDOStatement::fetchAll()](#pdostatement.fetchall) - Recupera las líneas restantes de un conjunto de resultados

# Pdo\Pgsql::getPid

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::getPid — Devuelve el PID del proceso backend que gestiona esta conexión

### Descripción

public **Pdo\Pgsql::getPid**(): [int](#language.types.integer)

Devuelve el PID del proceso backend que gestiona esta conexión.
Cabe señalar que el PID pertenece a un proceso que se ejecuta en el host del servidor,
y no en el host local.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el PID en forma de un [int](#language.types.integer).

# Pdo\Pgsql::lobCreate

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::lobCreate — Crear un nuevo objeto grande

### Descripción

public **Pdo\Pgsql::lobCreate**(): [string](#language.types.string)|[false](#language.types.singleton)

**Pdo\Pgsql::lobCreate()** crea un objeto grande
y devuelve el OID que lo referencia.
Puede abrirse para leer o escribir datos con
[Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen).

El OID puede almacenarse en columnas de tipo OID y utilizarse para referenciar
el objeto grande, sin que la fila crezca de manera arbitraria.
El objeto grande continuará existiendo en la base de datos hasta que
sea eliminado mediante la llamada a [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink).

Los objetos grandes son objetos voluminosos para utilizar.
De hecho, es necesario llamar a [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink)
antes de eliminar la última fila que referencia el OID en toda la base de datos;
de lo contrario, los objetos grandes no referenciados permanecerán en el servidor indefinidamente.
Además, los objetos grandes no tienen controles de acceso.
Una alternativa es el tipo de columna bytea, que puede ser de hasta 1 Go de tamaño,
y este tipo de columna gestiona de manera transparente el almacenamiento para un tamaño de fila óptimo.

**Nota**:

    Esta función, y todas las manipulaciones del objeto grande,
    deben ser llamadas y realizadas dentro de una transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el OID del nuevo objeto grande creado en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Pgsql::lobCreate()**

    Este ejemplo crea un nuevo objeto grande y copia el contenido
    de un fichero dentro.
    El OID es almacenado posteriormente en una tabla.

&lt;?php
$db = new Pdo\Pgsql('pgsql:dbname=test host=localhost', $user, $pass);
$db-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db-&gt;beginTransaction();
$oid = $db-&gt;lobCreate();
$stream = $db-&gt;lobOpen($oid, 'w');
$local = fopen($filename, 'rb');
stream_copy_to_stream($local, $stream);
$local = null;
$stream = null;
$stmt = $db-&gt;prepare("INSERT INTO BLOBS (ident, oid) VALUES (?, ?)");
$stmt-&gt;execute([$some_id, $oid]);
$db-&gt;commit();
?&gt;

### Ver también

- [Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen) - Abre un flujo sobre un objeto grande existente

- [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink) - Elimina un objeto grande

- [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

- [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

# Pdo\Pgsql::lobOpen

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::lobOpen — Abre un flujo sobre un objeto grande existente

### Descripción

public **Pdo\Pgsql::lobOpen**([string](#language.types.string) $oid, [string](#language.types.string) $mode = "rb"): [resource](#language.types.resource)|[false](#language.types.singleton)

**Pdo\Pgsql::lobOpen()** abre un flujo para acceder
a los datos referenciados por oid.
Todas las funciones habituales del sistema de ficheros, tales como [fread()](#function.fread),
[fwrite()](#function.fwrite) o [fgets()](#function.fgets) pueden ser utilizadas
para manipular el contenido del flujo.

**Nota**:

    Esta función, y todas las manipulaciones del objeto grande,
    deben ser llamadas y realizadas dentro de una transacción.

### Parámetros

    oid


      Un identificador de objeto grande.




    mode


      Si el modo es r, abre el flujo en lectura.
      Si el modo es w, abre el flujo en escritura.


### Valores devueltos

Devuelve un recurso de flujo en caso de éxito, o **[false](#constant.false)** si ocurre un error

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Pgsql::lobOpen()**

    Según el ejemplo de [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate),
    este código extrae el objeto grande
    de la base de datos y lo devuelve al navegador.

&lt;?php
$db = new Pdo\Pgsql('pgsql:dbname=test host=localhost', $user, $pass);
$db-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db-&gt;beginTransaction();
$stmt = $db-&gt;prepare("SELECT oid FROM BLOBS WHERE ident = ?");
$stmt-&gt;execute(array($some_id));
$stmt-&gt;bindColumn('oid', $oid, PDO::PARAM_STR);
$stmt-&gt;fetch(PDO::FETCH_BOUND);
$stream = $db-&gt;pgsqlLOBOpen($oid, 'r');
header("Content-type: application/octet-stream");
fpassthru($stream);
?&gt;

### Ver también

- [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate) - Crear un nuevo objeto grande

- [Pdo\Pgsql::lobUnlink()](#pdo-pgsql.lobunlink) - Elimina un objeto grande

- [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

- [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

# Pdo\Pgsql::lobUnlink

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::lobUnlink — Elimina un objeto grande

### Descripción

public **Pdo\Pgsql::lobUnlink**([string](#language.types.string) $oid): [bool](#language.types.boolean)

Elimina un objeto grande de la base de datos identificado por OID.

**Nota**:

    Esta función, y todas las manipulaciones del objeto grande,
    deben ser llamadas y realizadas dentro de una transacción.

### Parámetros

    oid


      Un identificador de objeto grande.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Pgsql::lobUnlink()**

    Este ejemplo elimina un objeto grande de la base de datos antes de eliminar
    la fila que lo referencia en la tabla blobs. Se utiliza en los ejemplos de
    [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate) y
    [Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen).

&lt;?php
$db = new PDO('pgsql:dbname=test host=localhost', $user, $pass);
$db-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db-&gt;beginTransaction();
$db-&gt;pgsqlLOBUnlink($oid);
$stmt = $db-&gt;prepare("DELETE FROM BLOBS where ident = ?");
$stmt-&gt;execute(array($some_id));
$db-&gt;commit();
?&gt;

### Ver también

- [Pdo\Pgsql::lobCreate()](#pdo-pgsql.lobcreate) - Crear un nuevo objeto grande

- [Pdo\Pgsql::lobOpen()](#pdo-pgsql.lobopen) - Abre un flujo sobre un objeto grande existente

- [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

- [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

# Pdo\Pgsql::setNoticeCallback

(PHP 8 &gt;= 8.4.0)

Pdo\Pgsql::setNoticeCallback — Establece una función de retrollamada para gestionar los mensajes de aviso y advertencia generados por el servidor

### Descripción

public **Pdo\Pgsql::setNoticeCallback**([?](#language.types.null)[callable](#language.types.callable) $callback): [void](language.types.void.html)

Establece una función de retrollamada para gestionar los mensajes de aviso y advertencia generados por el servidor.
Esto incluye los mensajes emitidos por PostgreSQL,
así como aquellos generados por las funciones SQL definidas por el usuario utilizando RAISE.
Tenga en cuenta que la recepción efectiva de estos mensajes
depende del parámetro del servidor client_min_messages.

### Parámetros

    callback


      Si se pasa **[null](#constant.null)**, la función de retrollamada se reinicializa a su estado por omisión.


      De lo contrario, la función de retrollamada es una retrollamada con la siguiente firma:



       handler([string](#language.types.string) $message): [void](language.types.void.html)



        message


          Un mensaje generado por el servidor.






### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Pgsql::setNoticeCallback()**

&lt;?php
$pdo = new Pdo\Pgsql('pgsql:dbname=test host=localhost', $user, $pass);

$pdo-&gt;exec('CREATE TABLE parent(id int primary key)');
$pdo-&gt;exec('CREATE TABLE child(id int references parent)');

$pdo-&gt;setNoticeCallback(function ($message) {
echo $message;
});

$pdo-&gt;exec('TRUNCATE parent CASCADE');
?&gt;

Resultado del ejemplo anterior es similar a:

NOTICE: truncate cascades to table "child"

## Tabla de contenidos

- [Pdo\Pgsql::copyFromArray](#pdo-pgsql.copyfromarray) — Copia datos de un array PHP a una tabla
- [Pdo\Pgsql::copyFromFile](#pdo-pgsql.copyfromfile) — Copia datos de un fichero a una tabla
- [Pdo\Pgsql::copyToArray](#pdo-pgsql.copytoarray) — Copia datos de una tabla a un array PHP
- [Pdo\Pgsql::copyToFile](#pdo-pgsql.copytofile) — Copia datos de una tabla a un fichero
- [Pdo\Pgsql::escapeIdentifier](#pdo-pgsql.escapeidentifier) — Escapa una string para su uso como identificador SQL
- [Pdo\Pgsql::getNotify](#pdo-pgsql.getnotify) — Devuelve una notificación asíncrona
- [Pdo\Pgsql::getPid](#pdo-pgsql.getpid) — Devuelve el PID del proceso backend que gestiona esta conexión
- [Pdo\Pgsql::lobCreate](#pdo-pgsql.lobcreate) — Crear un nuevo objeto grande
- [Pdo\Pgsql::lobOpen](#pdo-pgsql.lobopen) — Abre un flujo sobre un objeto grande existente
- [Pdo\Pgsql::lobUnlink](#pdo-pgsql.lobunlink) — Elimina un objeto grande
- [Pdo\Pgsql::setNoticeCallback](#pdo-pgsql.setnoticecallback) — Establece una función de retrollamada para gestionar los mensajes de aviso y advertencia generados por el servidor

    # Funciones del controlador PDO SQLite (PDO_SQLITE)

    ## Introducción

    PDO_SQLITE es un controlador que implementa la [interfaz de PHP Data Objects (PDO)](#intro.pdo) para
    permitir el acceso de PHP a las bases de datos SQLite 3.

    **Nota**:

        PDO_SQLITE permite el uso de strings fuera de los flujos
        con **[PDO::PARAM_LOB](#pdo.constants.param-lob)**.

## Instalación

El controlador PDO_SQLITE PDO está habilitado por omisión. Para deshabilitarlo,
se puede usar **--without-pdo-sqlite[=DIR]**,
donde el parámetro opcional [=DIR] es el directorio base de instalación de sqlite.
A partir de PHP 7.4.0 se requiere [» libsqlite](http://sqlite.org/) ≥ 3.5.0.
Anteriormente, si libsqlite incluido podría haberse usado en su lugar, por omisión,
si [=DIR] era omitido.

    # PDO_SQLITE DSN

    (PHP 5 &gt;= 5.1.0, PHP 7, PECL PDO_SQLITE &gt;= 0.2.0)

PDO_SQLITE DSN — Conexión a bases de datos SQLite

    ### Descripción


     El Data Source Name (DSN) de PDO_SQLITE se compone de los siguientes elementos:




       Prefijo DSN (SQLite 3)


         El prefijo DSN es **sqlite:**.



          -

            Para acceder a una base de datos en el disco, debe añadirse
            la ruta absoluta al prefijo DSN.





          -

            Para crear una base de datos en memoria, debe añadirse
            :memory: al prefijo DSN.





          -

            Si el DSN contiene solo el prefijo DSN, se creará una base de datos
            temporal, la cual será eliminada cuando se cierre la conexión.















    ### Ejemplos





      **Ejemplo #1 Ejemplos con PDO_SQLITE DSN**



       Los ejemplos siguientes muestran PDO_SQLITE DSN para conectarse a
       las bases de datos SQLite:


sqlite:/opt/databases/mydb.sq3
sqlite::memory:
sqlite:

# PDO::sqliteCreateAggregate

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo_sqlite &gt;= 1.0.0)

PDO::sqliteCreateAggregate —
Alias de [Pdo\Sqlite::createAggregate()](#pdo-sqlite.createaggregate)

### Descripción

public **PDO::sqliteCreateAggregate**(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $step,
    [callable](#language.types.callable) $finalize,
    [int](#language.types.integer) $numArgs = -1
): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Sqlite::createAggregate()](#pdo-sqlite.createaggregate).

# PDO::sqliteCreateCollation

(PHP 5 &gt;= 5.3.11, PHP 7, PHP 8)

PDO::sqliteCreateCollation —
Alias de [Pdo\Sqlite::createCollation()](#pdo-sqlite.createcollation)

### Descripción

public **PDO::sqliteCreateCollation**([string](#language.types.string) $name, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Sqlite::createCollation()](#pdo-sqlite.createcollation).

# PDO::sqliteCreateFunction

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8, PECL pdo_sqlite &gt;= 1.0.0)

PDO::sqliteCreateFunction —
Alias de [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction)

### Descripción

public **PDO::sqliteCreateFunction**(
    [string](#language.types.string) $function_name,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $num_args = -1,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Este método es un alias de: [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction).

### Historial de cambios

      Versión
      Descripción






      7.1.4

       El argumento flags ha sido añadido.



## Tabla de contenidos

- [PDO_SQLITE DSN](#ref.pdo-sqlite.connection) — Conexión a bases de datos SQLite
- [PDO::sqliteCreateAggregate](#pdo.sqlitecreateaggregate) — Alias de Pdo\Sqlite::createAggregate
- [PDO::sqliteCreateCollation](#pdo.sqlitecreatecollation) — Alias de Pdo\Sqlite::createCollation
- [PDO::sqliteCreateFunction](#pdo.sqlitecreatefunction) — Alias de Pdo\Sqlite::createFunction

# La clase Pdo\Sqlite

(PHP 8 &gt;= 8.4.0)

## Introducción

    Una subclase de [PDO](#class.pdo) que representa una conexión
    utilizando el controlador PDO SQLite.




    Este controlador admite un analizador de consultas SQL dedicado para el dialecto SQLite.
    Puede gestionar los siguientes elementos:



     -

       Los literales de string simples, dobles y en dólares, con el doblado como mecanismo de escape.



     -

       Las comillas entre corchetes para los identificadores.



     -

       Dos guiones y los comentarios de estilo C (no anidados).



## Sinopsis de la Clase

     class **Pdo\Sqlite**



     extends
      [PDO](#class.pdo)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [PDO::PARAM_NULL](#pdo.constants.param-null);

public
const
[int](#language.types.integer)
[PDO::PARAM_BOOL](#pdo.constants.param-bool) = 5;
public
const
[int](#language.types.integer)
[PDO::PARAM_INT](#pdo.constants.param-int) = 1;
public
const
[int](#language.types.integer)
[PDO::PARAM_STR](#pdo.constants.param-str) = 2;
public
const
[int](#language.types.integer)
[PDO::PARAM_LOB](#pdo.constants.param-lob) = 3;
public
const
[int](#language.types.integer)
[PDO::PARAM_STMT](#pdo.constants.param-stmt) = 4;
public
const
[int](#language.types.integer)
[PDO::PARAM_INPUT_OUTPUT](#pdo.constants.param-input-output);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_NATL](#pdo.constants.param-str-natl);
public
const
[int](#language.types.integer)
[PDO::PARAM_STR_CHAR](#pdo.constants.param-str-char);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_ALLOC](#pdo.constants.param-evt-alloc);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FREE](#pdo.constants.param-evt-free);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_PRE](#pdo.constants.param-evt-exec-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_EXEC_POST](#pdo.constants.param-evt-exec-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_PRE](#pdo.constants.param-evt-fetch-pre);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_FETCH_POST](#pdo.constants.param-evt-fetch-post);
public
const
[int](#language.types.integer)
[PDO::PARAM_EVT_NORMALIZE](#pdo.constants.param-evt-normalize);
public
const
[int](#language.types.integer)
[PDO::FETCH_DEFAULT](#pdo.constants.fetch-default);
public
const
[int](#language.types.integer)
[PDO::FETCH_LAZY](#pdo.constants.fetch-lazy);
public
const
[int](#language.types.integer)
[PDO::FETCH_ASSOC](#pdo.constants.fetch-assoc);
public
const
[int](#language.types.integer)
[PDO::FETCH_NUM](#pdo.constants.fetch-num);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOTH](#pdo.constants.fetch-both);
public
const
[int](#language.types.integer)
[PDO::FETCH_OBJ](#pdo.constants.fetch-obj);
public
const
[int](#language.types.integer)
[PDO::FETCH_BOUND](#pdo.constants.fetch-bound);
public
const
[int](#language.types.integer)
[PDO::FETCH_COLUMN](#pdo.constants.fetch-column);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASS](#pdo.constants.fetch-class);
public
const
[int](#language.types.integer)
[PDO::FETCH_INTO](#pdo.constants.fetch-into);
public
const
[int](#language.types.integer)
[PDO::FETCH_FUNC](#pdo.constants.fetch-func);
public
const
[int](#language.types.integer)
[PDO::FETCH_GROUP](#pdo.constants.fetch-group);
public
const
[int](#language.types.integer)
[PDO::FETCH_UNIQUE](#pdo.constants.fetch-unique);
public
const
[int](#language.types.integer)
[PDO::FETCH_KEY_PAIR](#pdo.constants.fetch-key-pair);
public
const
[int](#language.types.integer)
[PDO::FETCH_CLASSTYPE](#pdo.constants.fetch-classtype);
public
const
[int](#language.types.integer)
[PDO::FETCH_SERIALIZE](#pdo.constants.fetch-serialize);
public
const
[int](#language.types.integer)
[PDO::FETCH_PROPS_LATE](#pdo.constants.fetch-props-late);
public
const
[int](#language.types.integer)
[PDO::FETCH_NAMED](#pdo.constants.fetch-named);
public
const
[int](#language.types.integer)
[PDO::ATTR_AUTOCOMMIT](#pdo.constants.attr-autocommit);
public
const
[int](#language.types.integer)
[PDO::ATTR_PREFETCH](#pdo.constants.attr-prefetch);
public
const
[int](#language.types.integer)
[PDO::ATTR_TIMEOUT](#pdo.constants.attr-timeout);
public
const
[int](#language.types.integer)
[PDO::ATTR_ERRMODE](#pdo.constants.attr-errmode);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_VERSION](#pdo.constants.attr-server-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_CLIENT_VERSION](#pdo.constants.attr-client-version);
public
const
[int](#language.types.integer)
[PDO::ATTR_SERVER_INFO](#pdo.constants.attr-server-info);
public
const
[int](#language.types.integer)
[PDO::ATTR_CONNECTION_STATUS](#pdo.constants.attr-connection-status);
public
const
[int](#language.types.integer)
[PDO::ATTR_CASE](#pdo.constants.attr-case);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR_NAME](#pdo.constants.attr-cursor-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_CURSOR](#pdo.constants.attr-cursor);
public
const
[int](#language.types.integer)
[PDO::ATTR_ORACLE_NULLS](#pdo.constants.attr-oracle-nulls);
public
const
[int](#language.types.integer)
[PDO::ATTR_PERSISTENT](#pdo.constants.attr-persistent);
public
const
[int](#language.types.integer)
[PDO::ATTR_STATEMENT_CLASS](#pdo.constants.attr-statement-class);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_TABLE_NAMES](#pdo.constants.attr-fetch-table-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_FETCH_CATALOG_NAMES](#pdo.constants.attr-fetch-catalog-names);
public
const
[int](#language.types.integer)
[PDO::ATTR_DRIVER_NAME](#pdo.constants.attr-driver-name);
public
const
[int](#language.types.integer)
[PDO::ATTR_STRINGIFY_FETCHES](#pdo.constants.attr-stringify-fetches);
public
const
[int](#language.types.integer)
[PDO::ATTR_MAX_COLUMN_LEN](#pdo.constants.attr-max-column-len);
public
const
[int](#language.types.integer)
[PDO::ATTR_EMULATE_PREPARES](#pdo.constants.attr-emulate-prepares);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_FETCH_MODE](#pdo.constants.attr-default-fetch-mode);
public
const
[int](#language.types.integer)
[PDO::ATTR_DEFAULT_STR_PARAM](#pdo.constants.attr-default-str-param);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_SILENT](#pdo.constants.errmode-silent);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_WARNING](#pdo.constants.errmode-warning);
public
const
[int](#language.types.integer)
[PDO::ERRMODE_EXCEPTION](#pdo.constants.errmode-exception);
public
const
[int](#language.types.integer)
[PDO::CASE_NATURAL](#pdo.constants.case-natural);
public
const
[int](#language.types.integer)
[PDO::CASE_LOWER](#pdo.constants.case-lower);
public
const
[int](#language.types.integer)
[PDO::CASE_UPPER](#pdo.constants.case-upper);
public
const
[int](#language.types.integer)
[PDO::NULL_NATURAL](#pdo.constants.null-natural);
public
const
[int](#language.types.integer)
[PDO::NULL_EMPTY_STRING](#pdo.constants.null-empty-string);
public
const
[int](#language.types.integer)
[PDO::NULL_TO_STRING](#pdo.constants.null-to-string);
public
const
[string](#language.types.string)
[PDO::ERR_NONE](#pdo.constants.err-none);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_NEXT](#pdo.constants.fetch-ori-next);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_PRIOR](#pdo.constants.fetch-ori-prior);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_FIRST](#pdo.constants.fetch-ori-first);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_LAST](#pdo.constants.fetch-ori-last);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_ABS](#pdo.constants.fetch-ori-abs);
public
const
[int](#language.types.integer)
[PDO::FETCH_ORI_REL](#pdo.constants.fetch-ori-rel);
public
const
[int](#language.types.integer)
[PDO::CURSOR_FWDONLY](#pdo.constants.cursor-fwdonly);
public
const
[int](#language.types.integer)
[PDO::CURSOR_SCROLL](#pdo.constants.cursor-scroll);

    /* Constantes */
    public
     const
     [int](#language.types.integer)
      [DETERMINISTIC](#pdo-sqlite.constants.deterministic);

    public
     const
     [int](#language.types.integer)
      [OPEN_READONLY](#pdo-sqlite.constants.open-readonly);

    public
     const
     [int](#language.types.integer)
      [OPEN_READWRITE](#pdo-sqlite.constants.open-readwrite);

    public
     const
     [int](#language.types.integer)
      [OPEN_CREATE](#pdo-sqlite.constants.open-create);

    public
     const
     [int](#language.types.integer)
      [ATTR_OPEN_FLAGS](#pdo-sqlite.constants.attr-open-flags);

    public
     const
     [int](#language.types.integer)
      [ATTR_READONLY_STATEMENT](#pdo-sqlite.constants.attr-readonly-statement);

    public
     const
     [int](#language.types.integer)
      [ATTR_EXTENDED_RESULT_CODES](#pdo-sqlite.constants.attr-extended-result-codes);


    /* Métodos */

public [createAggregate](#pdo-sqlite.createaggregate)(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $step,
    [callable](#language.types.callable) $finalize,
    [int](#language.types.integer) $numArgs = -1
): [bool](#language.types.boolean)
public [createCollation](#pdo-sqlite.createcollation)([string](#language.types.string) $name, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public [createFunction](#pdo-sqlite.createfunction)(
    [string](#language.types.string) $function_name,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $num_args = -1,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)
public [loadExtension](#pdo-sqlite.loadextension)([string](#language.types.string) $name): [void](language.types.void.html)
public [openBlob](#pdo-sqlite.openblob)(
    [string](#language.types.string) $table,
    [string](#language.types.string) $column,
    [int](#language.types.integer) $rowid,
    [?](#language.types.null)[string](#language.types.string) $dbname = "main",
    [int](#language.types.integer) $flags = **[Pdo\Sqlite::OPEN_READONLY](#pdo-sqlite.constants.open-readonly)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

    /* Métodos heredados */
    public [PDO::__construct](#pdo.construct)(

    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
)

    public [PDO::beginTransaction](#pdo.begintransaction)(): [bool](#language.types.boolean)

public [PDO::commit](#pdo.commit)(): [bool](#language.types.boolean)
public static [PDO::connect](#pdo.connect)(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $username = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): static
public [PDO::errorCode](#pdo.errorcode)(): [?](#language.types.null)[string](#language.types.string)
public [PDO::errorInfo](#pdo.errorinfo)(): [array](#language.types.array)
public [PDO::exec](#pdo.exec)([string](#language.types.string) $statement): [int](#language.types.integer)|[false](#language.types.singleton)
public [PDO::getAttribute](#pdo.getattribute)([int](#language.types.integer) $attribute): [mixed](#language.types.mixed)
public static [PDO::getAvailableDrivers](#pdo.getavailabledrivers)(): [array](#language.types.array)
public [PDO::inTransaction](#pdo.intransaction)(): [bool](#language.types.boolean)
public [PDO::lastInsertId](#pdo.lastinsertid)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::prepare](#pdo.prepare)([string](#language.types.string) $query, [array](#language.types.array) $options = []): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = **[null](#constant.null)**): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_COLUMN, [int](#language.types.integer) $colno): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)(
    [string](#language.types.string) $query,
    [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_CLASS,
    [string](#language.types.string) $classname,
    [array](#language.types.array) $constructorArgs
): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::query](#pdo.query)([string](#language.types.string) $query, [?](#language.types.null)[int](#language.types.integer) $fetchMode = PDO::FETCH_INTO, [object](#language.types.object) $object): [PDOStatement](#class.pdostatement)|[false](#language.types.singleton)
public [PDO::quote](#pdo.quote)([string](#language.types.string) $string, [int](#language.types.integer) $type = PDO::PARAM_STR): [string](#language.types.string)|[false](#language.types.singleton)
public [PDO::rollBack](#pdo.rollback)(): [bool](#language.types.boolean)
public [PDO::setAttribute](#pdo.setattribute)([int](#language.types.integer) $attribute, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Pdo\Sqlite::DETERMINISTIC](#pdo-sqlite.constants.deterministic)**






     **[Pdo\Sqlite::OPEN_READONLY](#pdo-sqlite.constants.open-readonly)**






     **[Pdo\Sqlite::OPEN_READWRITE](#pdo-sqlite.constants.open-readwrite)**






     **[Pdo\Sqlite::OPEN_CREATE](#pdo-sqlite.constants.open-create)**






     **[Pdo\Sqlite::ATTR_OPEN_FLAGS](#pdo-sqlite.constants.attr-open-flags)**






     **[Pdo\Sqlite::ATTR_READONLY_STATEMENT](#pdo-sqlite.constants.attr-readonly-statement)**






     **[Pdo\Sqlite::ATTR_EXTENDED_RESULT_CODES](#pdo-sqlite.constants.attr-extended-result-codes)**





# Pdo\Sqlite::createAggregate

(PHP 8 &gt;= 8.4.0)

Pdo\Sqlite::createAggregate —
Registra una función de agregación definida por el usuario para su uso en instrucciones SQL

### Descripción

public **Pdo\Sqlite::createAggregate**(
    [string](#language.types.string) $name,
    [callable](#language.types.callable) $step,
    [callable](#language.types.callable) $finalize,
    [int](#language.types.integer) $numArgs = -1
): [bool](#language.types.boolean)

Este método es similar a [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction)
excepto que registra funciones que pueden ser utilizadas para calcular un
resultado agregado sobre el conjunto de filas de una consulta.

La principal diferencia entre este método y
[Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction)
es que se necesitan dos funciones para manejar la agregación.

**Sugerencia**

    Utilizando este método, es posible reemplazar las funciones SQL nativas.

### Parámetros

    name


      El nombre de la función utilizado en las instrucciones SQL.




    step


      La función de retrollamada llamada para cada fila del conjunto de resultados.
      La función de retrollamada debe acumular el resultado y almacenarlo en el contexto de agregación.


      Esta función debe ser definida como sigue:



       step(

    [mixed](#language.types.mixed) $context,
    [int](#language.types.integer) $rownumber,
    [mixed](#language.types.mixed) $value,
    [mixed](#language.types.mixed) ...$values
): [mixed](#language.types.mixed)

        context


          **[null](#constant.null)** para la primera fila; en las filas siguientes, tendrá el valor
          que fue previamente retornado por la función de retrollamada; debe utilizarse
          esto para mantener el estado de la agregación.




        rownumber


          El número de la fila actual.




        value


          El primer argumento pasado a la agregación.




        values


          Los argumentos adicionales pasados a la agregación.




      El valor de retorno de esta función será utilizado como argumento
      context en la siguiente llamada a la función de retrollamada o
      de finalización.




    finalize


      La función de retrollamada para agregar los datos "step" de cada fila.
      Una vez que todas las filas han sido procesadas, esta función será llamada,
      y debería entonces tomar los datos del contexto de agregación y retornar el resultado.
      Esta función de retrollamada debe retornar un tipo comprendido por SQLite
      (es decir, un [tipo escalar](#language.types.intro)).


      Esta función debe ser definida como sigue:



       fini([mixed](#language.types.mixed) $context, [int](#language.types.integer) $rowcount): [mixed](#language.types.mixed)



        context


          Contiene el valor de retorno de la última llamada a la función de retrollamada.






        rowcount


          Contiene el número de filas sobre las cuales se realizó la agregación.






      El valor de retorno de esta función será utilizado como valor de retorno para
      la agregación.




    numArgs


      Indicación al analizador SQLite si la función de retrollamada acepta un
      número predeterminado de argumentos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Sqlite::createAggregate()**

    En este ejemplo, se creará una función de agregación personalizada llamada
    max_length que puede ser utilizada en las consultas SQL.




    En este ejemplo, se creará una función de agregación llamada
    max_length que calculará la longitud del string más largo
    en una de las columnas de la tabla.
    Para cada fila, la función max_len_step es llamada y
    pasa un parámetro $context.
    El parámetro de contexto es como cualquier otra variable PHP y puede ser
    definido para contener un [array](#language.types.array) o incluso un [object](#language.types.object).
    En este ejemplo, se utiliza para contener la longitud máxima que se ha visto hasta el momento;
    si el $string tiene una longitud mayor que la longitud máxima actual,
    se actualiza el contexto para contener esta nueva longitud máxima.




    Después de que todas las filas han sido procesadas,
    SQLite llama a la función max_len_finalize para determinar
    el resultado agregado.
    Es posible realizar algún tipo de cálculo basado en los datos en $context.
    En este ejemplo básico, el resultado fue calculado a medida que la consulta progresaba,
    por lo que el valor de contexto puede ser retornado directamente.

&lt;?php
$data = [
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
];
$db = new Pdo\Sqlite('sqlite::memory:');
$db-&gt;exec("CREATE TABLE strings(a)");
$insert = $db-&gt;prepare('INSERT INTO strings VALUES (?)');
foreach ($data as $str) {
    $insert-&gt;execute(array($str));
}
$insert = null;

function max_len_step($context, $row_number, $string)
{
    if (strlen($string) &gt; $context) {
        $context = strlen($string);
}
return $context;
}

function max_len_finalize($context, $row_count)
{
return $context === null ? 0 : $context;
}

$db-&gt;createAggregate('max_len', 'max_len_step', 'max_len_finalize');

var_dump($db-&gt;query('SELECT max_len(a) from strings')-&gt;fetchAll());

?&gt;

**Sugerencia**

     NO se recomienda almacenar una copia de los valores en el contexto
     y procesarlos al final, ya que se obligaría a SQLite a utilizar mucha
     memoria para procesar la consulta - imagine cuánta memoria se necesitaría
     si un millón de filas fueran almacenadas en memoria, cada una conteniendo un string de 32 bytes
     de longitud.

### Ver también

- [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction) - Registra una función de usuario para su uso en las sentencias SQL

- [Pdo\Sqlite::createCollation()](#pdo-sqlite.createcollation) - Registra una función de usuario de ordenación para su uso en las sentencias SQL

- **sqlite_create_function()**

- **sqlite_create_aggregate()**

# Pdo\Sqlite::createCollation

(PHP 8 &gt;= 8.4.0)

Pdo\Sqlite::createCollation —
Registra una función de usuario de ordenación para su uso en las sentencias SQL

### Descripción

public **Pdo\Sqlite::createCollation**([string](#language.types.string) $name, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Este método es similar a [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction)
salvo que registra funciones que se utilizan para ordenar strings.

### Parámetros

    name


      El nombre de la función de ordenación SQL a crear o redefinir.




    callback


      La retrollamada que define el comportamiento de una ordenación.
      Debe aceptar dos [string](#language.types.string)s y devolver
      -1, 0, o 1
      si el primer string se ordena antes, es idéntico o después
      del segundo string respectivamente.
      Una función interna que se comporta de esta manera es [strcmp()](#function.strcmp).


      Esta función debe ser definida como sigue:



       collation([string](#language.types.string) $string1, [string](#language.types.string) $string2): [int](#language.types.integer)



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Sqlite::createCollation()**

&lt;?php
$db = new Pdo\Sqlite('sqlite::memory:');
$db-&gt;exec("CREATE TABLE test (col1 string)");
$db-&gt;exec("INSERT INTO test VALUES ('a1')");
$db-&gt;exec("INSERT INTO test VALUES ('a10')");
$db-&gt;exec("INSERT INTO test VALUES ('a2')");

$db-&gt;sqliteCreateCollation('NATURAL_CMP', 'strnatcmp');
foreach ($db-&gt;query("SELECT col1 FROM test ORDER BY col1") as $row) {
  echo $row['col1'] . "\n";
}
echo "\n";
foreach ($db-&gt;query("SELECT col1 FROM test ORDER BY col1 COLLATE NATURAL_CMP") as $row) {
echo $row['col1'] . "\n";
}
?&gt;

El ejemplo anterior mostrará:

a1
a10
a2

a1
a2
a10

### Ver también

- [Pdo\Sqlite::createFunction()](#pdo-sqlite.createfunction) - Registra una función de usuario para su uso en las sentencias SQL

- [Pdo\Sqlite::createAggregate()](#pdo-sqlite.createaggregate) - Registra una función de agregación definida por el usuario para su uso en instrucciones SQL

- **sqlite_create_function()**

- **sqlite_create_aggregate()**

# Pdo\Sqlite::createFunction

(PHP 8 &gt;= 8.4.0)

Pdo\Sqlite::createFunction —
Registra una función de usuario para su uso en las sentencias SQL

### Descripción

public **Pdo\Sqlite::createFunction**(
    [string](#language.types.string) $function_name,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $num_args = -1,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

Este método permite que las funciones PHP sean registradas con SQLite como
funciones definidas por el usuario, de modo que puedan ser llamadas en las consultas SQL.
La función definida puede ser utilizada en cualquier consulta SQL que permita llamadas a funciones,
por ejemplo SELECT, UPDATE, o disparadores.

**Sugerencia**

    Utilizando este método, es posible reemplazar las funciones SQL nativas.

### Parámetros

    function_name


      El nombre de la función utilizado en las sentencias SQL.




    callback


      La retrollamada para gestionar la función SQL definida.

     **Nota**:

       La retrollamada debe retornar un tipo comprendido por SQLite (es decir,
       [tipo escalar](#language.types.intro)).





      Esta función debe ser definida como:



       callback([mixed](#language.types.mixed) $value, [mixed](#language.types.mixed) ...$values): [mixed](#language.types.mixed)



        value


          El primer argumento pasado a la función SQL.






        values


          Los argumentos adicionales pasados a la función SQL.










    num_args


      El número de argumentos que la función SQL toma.
      Si este parámetro es -1,
      entonces la función SQL puede tomar cualquier número de argumentos.




    flags


      Una máscara de bits de flags.
      Actualmente, solo **[Pdo\Sqlite::DETERMINISTIC](#pdo-sqlite.constants.deterministic)** es soportado,
      lo que especifica que la función retorna siempre el mismo resultado
      dados los mismos valores de entrada en una sola sentencia SQL.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Sqlite::createFunction()**

    En este ejemplo, tenemos una función que calcula la suma SHA256 de una
    string, luego la invierte. Cuando la sentencia SQL es ejecutada, retorna
    el valor del nombre de fichero transformado por nuestra función.
    Los datos retornados en $rows contienen el resultado procesado.




    La ventaja de esta técnica es que no es necesario procesar el
    resultado utilizando un bucle [foreach](#control-structures.foreach) después de la ejecución de la consulta.

&lt;?php
function sha256_and_reverse($string)
{
return strrev(hash('sha256', $string));
}

$db = new Pdo\Sqlite('sqlite::sqlitedb');
$db-&gt;sqliteCreateFunction('sha256rev', 'sha256_and_reverse', 1);
$rows = $db-&gt;query('SELECT sha256rev(filename) FROM files')-&gt;fetchAll();
?&gt;

### Ver también

- [Pdo\Sqlite::createAggregate()](#pdo-sqlite.createaggregate) - Registra una función de agregación definida por el usuario para su uso en instrucciones SQL

- [Pdo\Sqlite::createCollation()](#pdo-sqlite.createcollation) - Registra una función de usuario de ordenación para su uso en las sentencias SQL

- **sqlite_create_function()**

- **sqlite_create_aggregate()**

# Pdo\Sqlite::loadExtension

(PHP 8 &gt;= 8.4.0)

Pdo\Sqlite::loadExtension — Descripción

### Descripción

public **Pdo\Sqlite::loadExtension**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Descripción.

### Parámetros

    name


      Descripción.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

En qué casos esta función emite errores de nivel **[E\_\*](#constant.e-*)**,
y/o lanza [Exception](#class.exception)s.

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Sqlite::loadExtension()**

    Descripción.

&lt;?php
echo "Ejemplo de código";
?&gt;

El ejemplo anterior mostrará:

Ejemplo de código

### Notas

**Nota**:

    Todas las notas que no encuentran su lugar en otra sección deben ser colocadas aquí.

### Ver también

- **ClassName::otherMethodName()**

- **some_function()**

# Pdo\Sqlite::openBlob

(PHP 8 &gt;= 8.4.0)

Pdo\Sqlite::openBlob — Descripción

### Descripción

public **Pdo\Sqlite::openBlob**(
    [string](#language.types.string) $table,
    [string](#language.types.string) $column,
    [int](#language.types.integer) $rowid,
    [?](#language.types.null)[string](#language.types.string) $dbname = "main",
    [int](#language.types.integer) $flags = **[Pdo\Sqlite::OPEN_READONLY](#pdo-sqlite.constants.open-readonly)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Descripción.

### Parámetros

    table


      Descripción.




    column


      Descripción.




    rowid


      Descripción.




    dbname


      Descripción.




    flags


      Uno de los **[Pdo\Sqlite::OPEN_*](#pdo-sqlite.constants.open-readonly)**


### Valores devueltos

Descripción.

### Errores/Excepciones

Cuando esta función emite errores de nivel **[E\_\*](#constant.e-*)**,
y/o lanza [Exception](#class.exception).

### Ejemplos

**Ejemplo #1 Ejemplo de Pdo\Sqlite::openBlob()**

    Descripción.

&lt;?php
echo "Ejemplo de código";
?&gt;

El ejemplo anterior mostrará:

Ejemplo de código

### Notas

**Nota**:

    Todas las notas que no encuentran su lugar en otro lugar deben ser colocadas aquí.

### Ver también

- **ClassName::otherMethodName()**

- **some_function()**

## Tabla de contenidos

- [Pdo\Sqlite::createAggregate](#pdo-sqlite.createaggregate) — Registra una función de agregación definida por el usuario para su uso en instrucciones SQL
- [Pdo\Sqlite::createCollation](#pdo-sqlite.createcollation) — Registra una función de usuario de ordenación para su uso en las sentencias SQL
- [Pdo\Sqlite::createFunction](#pdo-sqlite.createfunction) — Registra una función de usuario para su uso en las sentencias SQL
- [Pdo\Sqlite::loadExtension](#pdo-sqlite.loadextension) — Descripción
- [Pdo\Sqlite::openBlob](#pdo-sqlite.openblob) — Descripción

- [Introducción](#intro.pdo)
- [Instalación/Configuración](#pdo.setup)<li>[Instalación](#pdo.installation)
- [Configuración en tiempo de ejecución](#pdo.configuration)
  </li>- [Constantes predefinidas](#pdo.constants)<li>[Modos de recuperación](#pdo.constants.fetch-modes)
  </li>- [Conexiones y gestor de conexión](#pdo.connections)
- [Transacciones y validación automática (autocommit)](#pdo.transactions)
- [Consultas preparadas y procedimientos almacenados](#pdo.prepared-statements)
- [Los errores y su gestión](#pdo.error-handling)
- [Los objetos grandes (LOB)](#pdo.lobs)
- [PDO](#class.pdo) — La clase PDO<li>[PDO::beginTransaction](#pdo.begintransaction) — Inicia una transacción
- [PDO::commit](#pdo.commit) — Valida una transacción
- [PDO::connect](#pdo.connect) — Conecta a una base de datos y devuelve una subclase PDO para los controladores que lo soportan
- [PDO::\_\_construct](#pdo.construct) — Crea una instancia PDO que representa una conexión a la base de datos
- [PDO::errorCode](#pdo.errorcode) — Devuelve el SQLSTATE asociado con la última operación sobre la base de datos
- [PDO::errorInfo](#pdo.errorinfo) — Devuelve las informaciones asociadas al error durante
  la última operación sobre la base de datos
- [PDO::exec](#pdo.exec) — Ejecuta una consulta SQL y devuelve el número de filas afectadas
- [PDO::getAttribute](#pdo.getattribute) — Recupera un atributo de una conexión a una base de datos
- [PDO::getAvailableDrivers](#pdo.getavailabledrivers) — Devuelve la lista de controladores PDO disponibles
- [PDO::inTransaction](#pdo.intransaction) — Verifica si se encuentra en una transacción
- [PDO::lastInsertId](#pdo.lastinsertid) — Devuelve el identificador de la última fila insertada o el valor de una secuencia
- [PDO::prepare](#pdo.prepare) — Prepara una consulta para su ejecución y devuelve un objeto
- [PDO::query](#pdo.query) — Prepara y ejecuta una consulta SQL sin marcadores de sustitución
- [PDO::quote](#pdo.quote) — Protege una cadena para usarla en una consulta SQL PDO
- [PDO::rollBack](#pdo.rollback) — Anula una transacción
- [PDO::setAttribute](#pdo.setattribute) — Configura un atributo PDO
  </li>- [PDOStatement](#class.pdostatement) — La clase PDOStatement<li>[PDOStatement::bindColumn](#pdostatement.bindcolumn) — Vincula una columna a una variable PHP
- [PDOStatement::bindParam](#pdostatement.bindparam) — Vincula un parámetro a una variable específica
- [PDOStatement::bindValue](#pdostatement.bindvalue) — Asocia un valor a un parámetro
- [PDOStatement::closeCursor](#pdostatement.closecursor) — Cierra el cursor, permitiendo que la consulta pueda ser ejecutada de nuevo
- [PDOStatement::columnCount](#pdostatement.columncount) — Devuelve el número de columnas en el conjunto de resultados
- [PDOStatement::debugDumpParams](#pdostatement.debugdumpparams) — Detalla una instrucción SQL preparada
- [PDOStatement::errorCode](#pdostatement.errorcode) — Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta
- [PDOStatement::errorInfo](#pdostatement.errorinfo) — Recupera las informaciones sobre el error asociado durante la última operación sobre la consulta
- [PDOStatement::execute](#pdostatement.execute) — Ejecuta una consulta preparada
- [PDOStatement::fetch](#pdostatement.fetch) — Recupera la siguiente línea de un conjunto de resultados PDO
- [PDOStatement::fetchAll](#pdostatement.fetchall) — Recupera las líneas restantes de un conjunto de resultados
- [PDOStatement::fetchColumn](#pdostatement.fetchcolumn) — Devuelve una columna de la siguiente fila de un conjunto de resultados
- [PDOStatement::fetchObject](#pdostatement.fetchobject) — Recupera la siguiente línea y la devuelve como objeto
- [PDOStatement::getAttribute](#pdostatement.getattribute) — Recupera un atributo de consulta
- [PDOStatement::getColumnMeta](#pdostatement.getcolumnmeta) — Devuelve las metadatos para una columna de un conjunto de resultados
- [PDOStatement::getIterator](#pdostatement.getiterator) — Devuelve un iterador sobre el conjunto de resultados
- [PDOStatement::nextRowset](#pdostatement.nextrowset) — Avance al siguiente conjunto de resultados de un manejador de conjuntos de resultados múltiples
- [PDOStatement::rowCount](#pdostatement.rowcount) — Devuelve el número de filas afectadas por la última
  llamada a la función PDOStatement::execute()
- [PDOStatement::setAttribute](#pdostatement.setattribute) — Establece un atributo de consulta
- [PDOStatement::setFetchMode](#pdostatement.setfetchmode) — Establece el modo de recuperación por defecto para esta consulta
  </li>- [PDORow](#class.pdorow) — La clase PDORow
- [PDOException](#class.pdoexception) — La clase PDOException
- [Controladores PDO](#pdo.drivers)<li>[Controlador PDO CUBRID](#ref.pdo-cubrid) — Funciones del controlador PDO CUBRID (PDO_CUBRID)
- [Controlador PDO MS SQL Server](#ref.pdo-dblib) — Microsoft SQL Server y Funciones del Controlador PDO Sybase (PDO_DBLIB)
- [Pdo\Dblib](#class.pdo-dblib) — La clase Pdo\Dblib
- [Controlador PDO Firebird](#ref.pdo-firebird) — Funciones del controlador PDO Firebird (PDO_FIREBIRD)
- [Pdo\Firebird](#class.pdo-firebird) — La clase Pdo\Firebird
- [Controlador PDO IBM](#ref.pdo-ibm) — Funciones del controlador PDO IBM (PDO_IBM)
- [Controlador PDO Informix](#ref.pdo-informix) — Funciones del controlador PDO Informix (PDO_INFORMIX)
- [Controlador PDO MySQL](#ref.pdo-mysql) — Funciones del controlador PDO MySQL (PDO_MYSQL)
- [Pdo\Mysql](#class.pdo-mysql) — La clase Pdo\Mysql
- [Controlador PDO MS SQL Server](#ref.pdo-sqlsrv) — Funciones Microsoft del controlador PDO SQL Server (PDO_SQLSRV)
- [Controlador PDO Oracle](#ref.pdo-oci) — Funciones del controlador PDO Oracle (PDO_OCI)
- [Controladores PDO ODBC y DB2](#ref.pdo-odbc) — Funciones del controlador PDO ODBC y DB2 (PDO_ODBC)
- [Pdo\Odbc](#class.pdo-odbc) — La clase Pdo\Odbc
- [Controlador PDO PostgreSQL](#ref.pdo-pgsql) — Funciones del controlador PDO PostgreSQL (PDO_PGSQL)
- [Pdo\Pgsql](#class.pdo-pgsql) — La clase Pdo\Pgsql
- [Controlador PDO SQLite](#ref.pdo-sqlite) — Funciones del controlador PDO SQLite (PDO_SQLITE)
- [Pdo\Sqlite](#class.pdo-sqlite) — La clase Pdo\Sqlite
  </li>
