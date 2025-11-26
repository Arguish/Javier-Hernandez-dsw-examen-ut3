# dBase

# Introducción

**Nota**:

    Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 5.3.0.

Estas funciones permiten acceder a los registros de las bases
de datos en formato dBase (dbf).

**Advertencia**

    Se recomienda no utilizar los ficheros dBase como base de datos de producción. Utilice
    [» SQLite](http://sqlite.org/) o mejor opte por un verdadero
    servidor SQL;
    [» MySQL](http://www.mysql.com/) o
    [» PostgreSQL](http://www.postgresql.org/)
    son opciones comunes en PHP. El soporte dBase está presente en PHP
    únicamente para permitir la importación y exportación de datos
    desde y hacia su base de datos, ya que este formato de fichero
    es habitualmente comprendido por los programas de hoja de cálculo de Windows.

**Precaución**

    A partir de dbase 7.0.0 las bases de datos son automáticamente bloqueadas
    via [flock()](#function.flock). No había soporte para el bloqueo
    previamente, por lo que dos procesos de servidor web concurrentes modificando el mismo
    fichero dBase probablemente habrían arruinado su base de datos. Esto puede ocurrir incluso con dbase 7.0.0+ en sistemas que implementan el bloqueo
    a nivel de proceso con las SAPIs multithreaded.

Los ficheros dBase son simples ficheros secuenciales, con un
número de registros fijo. Los registros son añadidos
al final del fichero y los registros borrados son
conservados hasta que se llame a la función
[dbase_pack()](#function.dbase-pack).

Solo se soportan los ficheros dbf niveles 3 (dBASE III+) - 5 (dBASE V).
Los tipos de campos dBase disponibles son:

    <caption>**Tipo de campos disponible**</caption>



       Campo
       Tipo dBase
       Formato
       Información complementaria






       M
       Memo
       n/a
       Este tipo no es soportado por PHP, y será ignorado



       D
       Date
       YYYYMMDD
       El tamaño del campo está limitado a 8



       T
       DateTime
       YYYYMMDDhhmmss.uuu
       (FoxPro) No se realizan verificaciones de validez. Disponible a partir de dbase 7.0.0.



       N
       Number
       Un número

        Se debe declarar un tamaño y una precisión (el número de dígitos
        después del punto decimal).




       F
       Float
       Un número flotante
       Idéntico a N.



       C
       [string](#language.types.string)
       Una cadena de caracteres

        Se debe declarar un tamaño. Al recuperar los
        datos, la cadena será completada con espacios para alcanzar el
        tamaño declarado. Las cadenas demasiado largas serán truncadas silenciosamente
        al guardar.




       L
       [bool](#language.types.boolean)

        T o Y para **[true](#constant.true)**,
        F o N para **[false](#constant.false)**,
        ? para no inicializada.


        A partir de dbase 7.0.0, devuelto como [bool](#language.types.boolean) (**[true](#constant.true)** o **[false](#constant.false)**),
        o **[null](#constant.null)** para los campos no inicializados
        Anteriormente, devuelto como [int](#language.types.integer) (1 o 0).





**Nota**:

    A partir de dbase 7.0.0 los campos nullable son soportados para las bases de
    datos **[DBASE_TYPE_FOXPRO](#constant.dbase-type-foxpro)**. Si un campo es nullable,
    pasar **[null](#constant.null)** definirá el flag respectivo, y al recuperarlo
    el valor del campo será **[null](#constant.null)**.

**Nota**:

    No hay soporte para índices o campos memo.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#dbase.installation)
- [Tipos de recursos](#dbase.resources)

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/dbase](https://pecl.php.net/package/dbase).

## Tipos de recursos

A partir de dbase 7.0.0, el tipo de recurso dbase está definido,
el cual es devuelto por [dbase_open()](#function.dbase-open) y
[dbase_create()](#function.dbase-create).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[DBASE_VERSION](#constant.dbase-version)**
    ([string](#language.types.string))



     La versión de la extensión
     (Disponible a partir de dbase 7.0.0)





    **[DBASE_RDONLY](#constant.dbase-rdonly)**
    ([int](#language.types.integer))



     Abre una base de datos en modo de solo lectura. Utilizado con [dbase_open()](#function.dbase-open).
     (Disponible a partir de dbase 7.0.0)





    **[DBASE_RDWR](#constant.dbase-rdwr)**
    ([int](#language.types.integer))



     Abre una base de datos en modo de lectura y escritura.
     Utilizado con [dbase_open()](#function.dbase-open).
     (Disponible a partir de dbase 7.0.0)





    **[DBASE_TYPE_DBASE](#constant.dbase-type-dbase)**
    ([int](#language.types.integer))



     Crea una base de datos de estilo dBASE. Utilizado con [dbase_create()](#function.dbase-create).
     (Disponible a partir de dbase 7.0.0)





    **[DBASE_TYPE_FOXPRO](#constant.dbase-type-foxpro)**
    ([int](#language.types.integer))



     Crea una base de datos de estilo FoxPro. Utilizado con [dbase_create()](#function.dbase-create).
     (Disponible a partir de dbase 7.0.0)

# Funciones dBase

## Ejemplos

    La mayoría de los ejemplos de esta documentación requieren una base de datos dBase. Se utilizará /tmp/test.dbf
    que es creada en el ejemplo de la función [dbase_create()](#function.dbase-create).

# dbase_add_record

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_add_record — Añade un registro en una base de datos dBase

### Descripción

**dbase_add_record**([resource](#language.types.resource) $database, [array](#language.types.array) $data): [bool](#language.types.boolean)

**dbase_add_record()** añade los datos proporcionados en la
base de datos dBase especificada.

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).






     data


       Un array de datos indexado. El número de elementos debe ser igual
       al número de campos en la base de datos, de lo contrario la función
       **dbase_add_record()** fallará.



      **Nota**:



        Si se utiliza [dbase_get_record()](#function.dbase-get-record) para devolver
        un valor para este argumento, no se olvide de reinicializar la clave nombrada
        deleted.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Inserción de un registro en una base de datos dBase**

&lt;?php

// Apertura en modo lectura-escritura
$db = dbase_open('/tmp/test.dbf', 2);

if ($db) {
  dbase_add_record($db, array(
date('Ymd'),
'Maxim Topolov',
'23',
'max@example.com',
'T'));
dbase_close($db);
}

?&gt;

### Ver también

    - [dbase_delete_record()](#function.dbase-delete-record) - Borra un registro en una base dBase

    - [dbase_replace_record()](#function.dbase-replace-record) - Reemplaza un registro en una base dBase

# dbase_close

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_close — Cierra una base dBase

### Descripción

**dbase_close**([resource](#language.types.resource) $database): [bool](#language.types.boolean)

**dbase_close()** cierra la base de datos correspondiente al
recurso database.

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Cierra un fichero de base de datos dBase**

&lt;?php

// Apertura en modo lectura-escritura
$db = dbase_open('/tmp/test.dbf', 0);

if ($db) {
// Lectura de datos ..

dbase_close($db);
}

?&gt;

### Ver también

    - [dbase_open()](#function.dbase-open) - Abre una base dBase

    - [dbase_create()](#function.dbase-create) - Crea una base de datos dBase

# dbase_create

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_create — Crea una base de datos dBase

### Descripción

**dbase_create**([string](#language.types.string) $path, [array](#language.types.array) $fields, [int](#language.types.integer) $type = DBASE_TYPE_DBASE): [resource](#language.types.resource)

**dbase_create()** crea una base de
datos dBase con la definición proporcionada.
Si el fichero ya existe, no se trunca.
[dbase_pack()](#function.dbase-pack) puede ser llamado para forzar una troncación.

**Nota**:

Esta función es afectada por
la directiva de configuración [open_basedir](#ini.open-basedir).

### Parámetros

     path


       La ruta de acceso a la base de datos. Puede ser una ruta relativa o absoluta
       al fichero donde dBase almacenará sus datos.






     fields


       Un array de arrays, cada array describe el formato de un campo de la
       base de datos. Cada campo está compuesto por un nombre, un carácter
       que indica el tipo de campo y opcionalmente, una longitud, una precisión
       y un flag nullable.
       Los campos soportados se enumeran en la
       [sección de introducción](#intro.dbase).



      **Nota**:



        Los nombres de los campos están limitados en longitud y no deben
        exceder los 10 caracteres.







     type


       El tipo de base de datos a crear. Puede ser
       **[DBASE_TYPE_DBASE](#constant.dbase-type-dbase)** o
       **[DBASE_TYPE_FOXPRO](#constant.dbase-type-foxpro)**.





### Valores devueltos

Devuelve un recurso de base de datos si la base de datos
ha sido creada con éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       El parámetro type ha sido añadido.




      PECL dbase 7.0.0

       dbase_identifier es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Creación de un fichero de base de datos dBase**

&lt;?php

// Definición de la base de datos
$def = array(
array("date", "D"),
array("name", "C", 50),
array("age", "N", 3, 0),
array("email", "C", 128),
array("ismember", "L")
);

// Creación
if (!dbase_create('/tmp/test.dbf', $def)) {
echo "Error, imposible crear la base de datos\n";
}

?&gt;

### Ver también

    - [dbase_open()](#function.dbase-open) - Abre una base dBase

    - [dbase_close()](#function.dbase-close) - Cierra una base dBase

# dbase_delete_record

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_delete_record — Borra un registro en una base dBase

### Descripción

**dbase_delete_record**([resource](#language.types.resource) $database, [int](#language.types.integer) $number): [bool](#language.types.boolean)

**dbase_delete_record()** marca el registro
record para el borrado, en la base
dbase_identifier.

**Nota**:

    Para borrar realmente el registro de la base de datos, se debe
    llamar a la función [dbase_pack()](#function.dbase-pack).

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).






     number


       Un entero comprendido entre 1 y el número máximo de registros en
       la base de datos (tal como devuelto por la función
       [dbase_numrecords()](#function.dbase-numrecords)).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ver también

    - [dbase_add_record()](#function.dbase-add-record) - Añade un registro en una base de datos dBase

    - [dbase_replace_record()](#function.dbase-replace-record) - Reemplaza un registro en una base dBase

# dbase_get_header_info

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_get_header_info — Recupera información de encabezado de una base de datos dBase

### Descripción

**dbase_get_header_info**([resource](#language.types.resource) $database): [array](#language.types.array)

**dbase_get_header_info()** devuelve información sobre
la estructura de las columnas de la base de datos referenciada por el recurso
database.

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).





### Valores devueltos

Un array indexado con una entrada para cada columna de la base de datos.
El índice del array comienza en 0.

Cada elemento del array contiene un array asociativo que contiene la información
sobre las columnas, como se describe aquí:

     name


       El nombre de la columna




     type


       El nombre legible del tipo de la columna (i.e. date,
       boolean, etc.)
       Los tipos de campos soportados están enumerados en la
       [sección de introducción](#intro.dbase).




     length


       El número de bytes que puede contener esta columna




     precision


       El número de decimales para la columna




     format


       Un formato [printf()](#function.printf) sugerido para la columna




     offset


       La posición de la columna desde el inicio de la línea



Si la información de encabezado de la base de datos no puede ser leída, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Muestra la información de encabezado para un fichero de base de datos dBase**

&lt;?php
// Ruta hacia el fichero dBase
$db_path = "/tmp/test.dbf";

// Abre el fichero dBase
$dbh = dbase_open($db_path, 0)
or die("¡Error! Imposible abrir el fichero dBase '$db_path'.");

// Recuperación de la información de las columnas
$column_info = dbase_get_header_info($dbh);

// Muestra la información
print_r($column_info);
?&gt;

# dbase_get_record

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_get_record — Lee un registro en una base dBase

### Descripción

**dbase_get_record**([resource](#language.types.resource) $database, [int](#language.types.integer) $number): [array](#language.types.array)

**dbase_get_record()** devuelve los datos del registro record en un array.

### Parámetros

     database


       El recurso de la base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).






     number


       El índice del registro entre 1 y
       dbase_numrecords($dbase_identifier).





### Valores devueltos

Un array indexado con el registro. Este array incluye asimismo
una clave asociada llamada deleted que se define a 1
si el registro ha sido marcado para eliminación (ver
[dbase_delete_record()](#function.dbase-delete-record)).

Each field is converted to the appropriate PHP type, except:

    -

      Dates are left as strings.



    -

      DateTime values are converted to strings.



    -

      Integers outside the range
      **[PHP_INT_MIN](#constant.php-int-min)**..**[PHP_INT_MAX](#constant.php-int-max)** are
      returned as strings.



    -

      Before dbase 7.0.0, booleans (L) were converted to 1 or
      0.


En caso de error, **dbase_get_record()** devuelve **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ver también

    - [dbase_get_record_with_names()](#function.dbase-get-record-with-names) - Lee un registro en una base dBase, en forma de array asociativo

# dbase_get_record_with_names

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_get_record_with_names —
Lee un registro en una base dBase, en forma de array asociativo

### Descripción

**dbase_get_record_with_names**([resource](#language.types.resource) $database, [int](#language.types.integer) $number): [array](#language.types.array)

Recupera un registro de una base de datos dBase como un array asociativo.

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).






     number


       El índice del registro entre 1 y
       dbase_numrecords($dbase_identifier).





### Valores devueltos

El registro, en forma de array asociativo. Esto incluye
también una clave llamada deleted que se define
a 1 si el registro ha sido marcado para eliminación
(ver la función [dbase_delete_record()](#function.dbase-delete-record)).
Por consiguiente, no es posible recuperar el valor de un campo llamado
deleted con esta función.

Each field is converted to the appropriate PHP type, except:

    -

      Dates are left as strings.



    -

      DateTime values are converted to strings.



    -

      Integers outside the range
      **[PHP_INT_MIN](#constant.php-int-min)**..**[PHP_INT_MAX](#constant.php-int-max)** are
      returned as strings.



    -

      Before dbase 7.0.0, booleans (L) were converted to 1 or
      0.


En caso de error, **dbase_get_record_with_names()**
devuelve **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      PECl dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Lista todos los miembros registrados en la base de datos**

&lt;?php
// Apertura en modo solo lectura
$db = dbase_open('/tmp/test.dbf', 0);

if ($db) {
  $record_numbers = dbase_numrecords($db);
for ($i = 1; $i &lt;= $record_numbers; $i++) {
    $row = dbase_get_record_with_names($db, $i);
    if ($row['ismember'] == 1) {
echo "Miembro #$i: " . trim($row['name']) . "\n";
}
}
}
?&gt;

### Ver también

    - [dbase_get_record()](#function.dbase-get-record) - Lee un registro en una base dBase

# dbase_numfields

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_numfields — Cuenta el número de campos de una base dBase

### Descripción

**dbase_numfields**([resource](#language.types.resource) $database): [int](#language.types.integer)

**dbase_numfields()** devuelve el número de campos (columnas)
de la base de datos dbase_identifier.

**Nota**:

    Los campos están numerados de 0 a dbase_numfields($db)-1,
    mientras que los registros están numerados de 1 a
    dbase_numrecords($db).

### Parámetros

     database


       El recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).





### Valores devueltos

El número de campos de la base de datos, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Ejemplo con dbase_numfields()**

&lt;?php

$rec = dbase_get_record($db, $recno);
$nf = dbase_numfields($db);
for ($i = 0; $i &lt; $nf; $i++) {
  echo $rec[$i], "\n";
}

?&gt;

### Ver también

    - [dbase_numrecords()](#function.dbase-numrecords) - Cuenta el número de registros en una base dBase

# dbase_numrecords

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_numrecords — Cuenta el número de registros en una base dBase

### Descripción

**dbase_numrecords**([resource](#language.types.resource) $database): [int](#language.types.integer)

Recupera el número de registros (filas) en la base especificada.

**Nota**:

    Los registros marcados como eliminados también se cuentan.

**Nota**:

    Los números de campo están numerados de 0 a
    dbase_numfields($db)-1, mientras que los números
    de registros están numerados de 1 a
    dbase_numrecords($db).

### Parámetros

     database


       Un recurso de base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).





### Valores devueltos

El número de registros en la base de datos o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       El parámetro database es ahora un
       [resource](#language.types.resource) en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Lectura de todos los registros de la base de datos**

&lt;?php

// Apertura en modo de solo lectura
$db = dbase_open('/tmp/test.dbf', 0);

if ($db) {
    $record_numbers = dbase_numrecords($db);
for ($i = 1; $i &lt;= $record_numbers; $i++) {
        $record = dbase_get_record($db, $i);
        if (!$record['deleted']) {
// hacer algo con el registro $record
} else {
// hacer algo con el registro eliminado $record o ignorarlo
}
}
}

?&gt;

### Ver también

    - [dbase_numfields()](#function.dbase-numfields) - Cuenta el número de campos de una base dBase

# dbase_open

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_open — Abre una base dBase

### Descripción

**dbase_open**([string](#language.types.string) $path, [int](#language.types.integer) $mode): [resource](#language.types.resource)|[false](#language.types.singleton)

**dbase_open()** abre una base de datos dBase
con un modo de acceso dado.

**Nota**:

Esta función es afectada por
la directiva de configuración [open_basedir](#ini.open-basedir).

### Parámetros

     path


       La ruta hacia la base de datos. Puede ser una ruta relativa o absoluta
       hacia el fichero donde dBase almacenará sus datos.






     mode


       Un entero correspondiente al utilizado para la llamada al sistema
       **open()** (Típicamente, 0 significa solo lectura, 1
       significa solo escritura, y 2 significa lectura y escritura).



      **Nota**:



        No se puede abrir un fichero dBase en modo solo escritura, ya que la función
        fallará al leer la información de encabezado y, por lo tanto, no se puede utilizar 1 como mode.





       A partir de dbase 7.0.0 **[DBASE_RDONLY](#constant.dbase-rdonly)** y
       **[DBASE_RDWR](#constant.dbase-rdwr)** pueden ser utilizados, respectivamente,
       para definir el mode.





### Valores devueltos

Devuelve un recurso de base de datos en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       El valor devuelto es ahora un [resource](#language.types.resource)
       en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Apertura de un fichero de base de datos dBase**

&lt;?php

// Apertura en modo solo lectura
$db = dbase_open('/tmp/test.dbf', 0);

if ($db) {
// lectura de datos ..

dbase_close($db);
}

?&gt;

### Ver también

    - [dbase_create()](#function.dbase-create) - Crea una base de datos dBase

    - [dbase_close()](#function.dbase-close) - Cierra una base dBase

# dbase_pack

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_pack — Compacta una base dBase

### Descripción

**dbase_pack**([resource](#language.types.resource) $database): [bool](#language.types.boolean)

**dbase_pack()** compacta la base de datos
dbase_identifier (borrado definitivo
de todos los registros marcados para el borrado
utilizando la función [dbase_delete_record()](#function.dbase-delete-record)).
Téngase en cuenta que el fichero será truncado después de una compactación exitosa
(a diferencia del comando PACK de dBASE III).

### Parámetros

     database


       El recurso database, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       database es ahora
       un [resource](#language.types.resource) en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Vacía una base de datos dBase**

&lt;?php

// Apertura en modo lectura-escritura
$db = dbase_open('/tmp/test.dbf', 2);

if ($db) {
  $record_numbers = dbase_numrecords($db);
for ($i = 1; $i &lt;= $record_numbers; $i++) {
    dbase_delete_record($db, $i);
  }
// Compacta la base de datos
dbase_pack($db);
}

?&gt;

### Ver también

    - [dbase_delete_record()](#function.dbase-delete-record) - Borra un registro en una base dBase

# dbase_replace_record

(PHP 5 &lt; 5.3.0, dbase 5, dbase 7)

dbase_replace_record — Reemplaza un registro en una base dBase

### Descripción

**dbase_replace_record**([resource](#language.types.resource) $database, [array](#language.types.array) $data, [int](#language.types.integer) $number): [bool](#language.types.boolean)

Reemplaza el registro pasado en la base de datos con los datos proporcionados.

### Parámetros

     database


       El recurso de la base de datos, devuelto por
       [dbase_open()](#function.dbase-open) o [dbase_create()](#function.dbase-create).






     data


       Un array indexado de datos. El número de elementos debe ser igual
       al número de campos en la base de datos, de lo contrario la función
       **dbase_replace_record()** fallará.



      **Nota**:



        Si se utiliza [dbase_get_record()](#function.dbase-get-record) para devolver el valor
        de este argumento, no se olvide de reinicializar la clave nombrada
        deleted.







     number


       Un entero entre 1 y el número total de registros en la
       base de datos (como devuelto por la función
       [dbase_numrecords()](#function.dbase-numrecords)).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL dbase 7.0.0

       El argumento database es ahora
       una [resource](#language.types.resource) en lugar de un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Actualización de un registro en una base de datos**

&lt;?php

// Apertura en modo lectura-escritura
$db = dbase_open('/tmp/test.dbf', 2);

if ($db) {
  // Recuperación de la antigua fila
  $row = dbase_get_record_with_names($db, 1);

// Elimina la entrada borrada
unset($row['deleted']);

// Actualización de la fecha del campo con el timestamp actual
$row['date'] = date('Ymd');

// Reemplazar el registro
dbase_replace_record($db, $row, 1);
  dbase_close($db);
}

?&gt;

### Notas

**Nota**:

    Los resultados de los campos [bool](#language.types.boolean) son elementos de valor de tipo [int](#language.types.integer)
    (0 o 1) cuando se recuperan mediante
    [dbase_get_record()](#function.dbase-get-record) o
    [dbase_get_record_with_names()](#function.dbase-get-record-with-names). Si se reescriben,
    esto hará que el valor se convierta en 0, por lo que se deben
    tomar precauciones para ajustar correctamente los valores.

### Ver también

    - [dbase_add_record()](#function.dbase-add-record) - Añade un registro en una base de datos dBase

    - [dbase_delete_record()](#function.dbase-delete-record) - Borra un registro en una base dBase

## Tabla de contenidos

- [dbase_add_record](#function.dbase-add-record) — Añade un registro en una base de datos dBase
- [dbase_close](#function.dbase-close) — Cierra una base dBase
- [dbase_create](#function.dbase-create) — Crea una base de datos dBase
- [dbase_delete_record](#function.dbase-delete-record) — Borra un registro en una base dBase
- [dbase_get_header_info](#function.dbase-get-header-info) — Recupera información de encabezado de una base de datos dBase
- [dbase_get_record](#function.dbase-get-record) — Lee un registro en una base dBase
- [dbase_get_record_with_names](#function.dbase-get-record-with-names) — Lee un registro en una base dBase, en forma de array asociativo
- [dbase_numfields](#function.dbase-numfields) — Cuenta el número de campos de una base dBase
- [dbase_numrecords](#function.dbase-numrecords) — Cuenta el número de registros en una base dBase
- [dbase_open](#function.dbase-open) — Abre una base dBase
- [dbase_pack](#function.dbase-pack) — Compacta una base dBase
- [dbase_replace_record](#function.dbase-replace-record) — Reemplaza un registro en una base dBase

- [Introducción](#intro.dbase)
- [Instalación/Configuración](#dbase.setup)<li>[Instalación](#dbase.installation)
- [Tipos de recursos](#dbase.resources)
  </li>- [Constantes predefinidas](#dbase.constants)
- [Funciones dBase](#ref.dbase)<li>[dbase_add_record](#function.dbase-add-record) — Añade un registro en una base de datos dBase
- [dbase_close](#function.dbase-close) — Cierra una base dBase
- [dbase_create](#function.dbase-create) — Crea una base de datos dBase
- [dbase_delete_record](#function.dbase-delete-record) — Borra un registro en una base dBase
- [dbase_get_header_info](#function.dbase-get-header-info) — Recupera información de encabezado de una base de datos dBase
- [dbase_get_record](#function.dbase-get-record) — Lee un registro en una base dBase
- [dbase_get_record_with_names](#function.dbase-get-record-with-names) — Lee un registro en una base dBase, en forma de array asociativo
- [dbase_numfields](#function.dbase-numfields) — Cuenta el número de campos de una base dBase
- [dbase_numrecords](#function.dbase-numrecords) — Cuenta el número de registros en una base dBase
- [dbase_open](#function.dbase-open) — Abre una base dBase
- [dbase_pack](#function.dbase-pack) — Compacta una base dBase
- [dbase_replace_record](#function.dbase-replace-record) — Reemplaza un registro en una base dBase
  </li>
