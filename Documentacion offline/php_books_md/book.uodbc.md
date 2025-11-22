# ODBC (Unificada)

# Introducción

Además del soporte habitual para ODBC, las funciones de ODBC Unificada de
PHP permiten acceder a varias bases de datos que toman prestada la
semántica de la API ODBC para implementar su propia API. En lugar de
mantener múltiples controladores de bases de datos que son casi
idénticos, éstos han sido unificados en un único conjunto de
funciones ODBC.

Las siguientes bases de datos están soportadas por la funciones de ODBC
Unificada: [» Adabas D](http://www.adabas.com/),
[» IBM DB2](http://www-306.ibm.com/software/data/db2/),
[» iODBC](http://www.iodbc.org/),
[» Solid](http://www.solidtech.com/), y
[» Sybase SQL Anywhere](http://www.sybase.com/).

**Nota**:

    Con la excepción de iODBC, no está involucrada ninguna ODBC al
    conectarse a las bases de datos mencionadas. Ocurre que las funciones
    que se usan para comunicarse de forma nativa con las bases de datos comparten
    los mismos nombres y la misma sintaxis que las funciones de ODBC. Sin embargo,
    al construir PHP con soporte para iODBC, se permite el uso de cualquier controlador
    que cumpla con ODBC en las aplicaciones de PHP. Hay más unformaicón disponible
    sobre iODBC en [» www.iodbc.org](http://www.iodbc.org/)
    con la alternativa unixODBC disponible en
    [» www.unixodbc.org](http://www.unixodbc.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#uodbc.requirements)
- [Instalación](#odbc.installation)
- [Configuración en tiempo de ejecución](#odbc.configuration)
- [Tipos de recursos](#uodbc.resources)

    ## Requerimientos

    Para acceder a cualquiera de las bases de datos soportadas se necesitan tener
    instaladas las bibliotecas requeridas.

## Instalación

     **--with-adabas[=DIR]**



      Incluye el soporte para Adabas D. DIR es el directorio de instalación de Adabas D.
      Por omisión, es /usr/local.







     **--with-sapdb[=DIR]**



      Incluye el soporte para SAP DB. DIR es el directorio de instalación de SAP DB.
      Por omisión, es /usr/local.







     **--with-solid[=DIR]**



      Incluye el soporte para Solid. DIR es el directorio de instalación de Solid.
      Por omisión, es /usr/local/solid.







     **--with-ibm-db2[=DIR]**



      Incluye el soporte para IBM DB2. DIR es el directorio de instalación de DB2.
      Por omisión, es /home/db2inst1/sqllib.







     **--with-empress[=DIR]**



      Incluye el soporte para Empress. DIR es el directorio de instalación de Empress.
      Por omisión, es $EMPRESSPATH.
      Esta opción solo soporta Empress versión 8.60 y posteriores.







     **--with-empress-bcs[=DIR]**



      Incluye el soporte para "Empress Local Access".
      DIR es el directorio de instalación de Empress.
      Por omisión, es $EMPRESSPATH.
      Esta opción solo soporta Empress versión 8.60 y posteriores.







     **--with-birdstep[=DIR]**



      Incluye el soporte para Birdstep. DIR es el directorio de instalación de Birdstep.
      Por omisión, es /usr/local/birdstep.







     **--with-custom-odbc[=DIR]**



      Incluye el soporte para un ODBC definido por el usuario. DIR es el directorio de instalación de ODBC.
      Por omisión, es /usr/local.
      Asegúrese de que la variable CUSTOM_ODBC_LIBS esté
      definida y de que el fichero odbc.h esté en
      la ruta de inclusión, es decir, que
      se deban definir las siguientes líneas para
      Sybase SQL Anywhere 5.5.00 bajo QNX,
      antes de utilizar el script de configuración:

CPPFLAGS="-DODBC_QNX -DSQLANY_BUG"
LDFLAGS=-lunix
CUSTOM_ODBC_LIBS="-ldblib -lodbc".

     **--with-iodbc[=DIR]**



      Incluye el soporte para iODBC. DIR es el directorio de instalación de iODBC.
      Por omisión, es /usr/local.







     **--with-esoob[=DIR]**



      Incluye el soporte para Easysoft OOB. DIR es el directorio de instalación de OOB.
      Por omisión, es /usr/local/easysoft/oob/client.







     **--with-unixodbc[=DIR]**



      Incluye el soporte para UnixODBC. DIR es el directorio de instalación de UnixODBC.
      Por omisión, es /usr/local.







     **--with-openlink[=DIR]**



      Incluye el soporte para OpenLink ODBC. DIR es el directorio de instalación de OpenLink.
      Por omisión, es /usr/local. Es el mismo que para iODBC.







     **--with-dbmaker[=DIR]**



      Incluye el soporte para DBMaker. DIR es el directorio de instalación de DBMaker.
      Por omisión, es la ruta de la última instalación de DBMaker
      (por ejemplo /home/dbmaker/3.6).


Los usuarios de Windows deben habilitar
php_odbc.dll para utilizar esta extensión.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración UODBC**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [odbc.allow_persistent](#ini.uodbc.allow-persistent)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [odbc.check_persistent](#ini.uodbc.check-persistent)
      "1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [odbc.max_persistent](#ini.uodbc.max-persistent)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [odbc.max_links](#ini.uodbc.max-links)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       



      [odbc.defaultlrl](#ini.uodbc.defaultlrl)
      "4096"
      **[INI_ALL](#constant.ini-all)**
       



      [odbc.defaultbinmode](#ini.uodbc.defaultbinmode)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [odbc.default_cursortype](#ini.uodbc.defaultcursortype)
      "3"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    odbc.default_db
    [string](#language.types.string)



     La fuente de datos ODBC si no se especifica ninguna en las
     funciones [odbc_connect()](#function.odbc-connect) o
     [odbc_pconnect()](#function.odbc-pconnect).








    odbc.default_user
    [string](#language.types.string)



     Nombre de usuario a utilizar si no se especifica ninguno en las
     funciones [odbc_connect()](#function.odbc-connect) o
     [odbc_pconnect()](#function.odbc-pconnect).








    odbc.default_pw
    [string](#language.types.string)



     Contraseña a utilizar si no se especifica ninguna en las
     funciones [odbc_connect()](#function.odbc-connect) o
     [odbc_pconnect()](#function.odbc-pconnect).








    odbc.allow_persistent
    [bool](#language.types.boolean)



     ¿Se permiten las conexiones ODBC persistentes o no?








    odbc.check_persistent
    [bool](#language.types.boolean)



     Verifica que la conexión sea válida antes de utilizarla.








    odbc.max_persistent
    [int](#language.types.integer)



     Número máximo de conexiones persistentes por proceso.








    odbc.max_links
    [int](#language.types.integer)



     El número máximo de conexiones ODBC por proceso, incluyendo
     las conexiones persistentes.







    odbc.defaultlrl
    [int](#language.types.integer)



     Gestión de campos de tipo LONG. Especifica el número de bytes devueltos
     en las variables.
     Consulte [odbc_longreadlen()](#function.odbc-longreadlen) para más información.




    Cuando un [int](#language.types.integer) es utilizado,

su valor es medido en bytes. También puede utilizar la notación abreviada
como se describe en esta
[entrada de la FAQ.](#faq.using.shorthandbytes).

    odbc.defaultbinmode
    [int](#language.types.integer)



     Gestión de datos binarios.
     Consulte [odbc_binmode()](#function.odbc-binmode) para más información.








    odbc.default_cursortype
    [int](#language.types.integer)



     Controla el modelo de cursor ODBC.
     Valores posibles: **[SQL_CURSOR_FORWARD_ONLY](#constant.sql-cursor-forward-only)**,
     **[SQL_CURSOR_KEYSET_DRIVEN](#constant.sql-cursor-keyset-driven)**,
     **[SQL_CURSOR_DYNAMIC](#constant.sql-cursor-dynamic)** y
     **[SQL_CURSOR_STATIC](#constant.sql-cursor-static)** (por defecto).


## Tipos de recursos

Antes de PHP 8.4.0, esta extensión definía dos tipos de recursos: un identificador de conexión ODBC
y un identificador de resultado ODBC.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[ODBC_TYPE](#constant.odbc-type)**
    ([string](#language.types.string))









    **[ODBC_BINMODE_PASSTHRU](#constant.odbc-binmode-passthru)**
    ([int](#language.types.integer))









    **[ODBC_BINMODE_RETURN](#constant.odbc-binmode-return)**
    ([int](#language.types.integer))









    **[ODBC_BINMODE_CONVERT](#constant.odbc-binmode-convert)**
    ([int](#language.types.integer))









    **[SQL_ODBC_CURSORS](#constant.sql-odbc-cursors)**
    ([int](#language.types.integer))









    **[SQL_CUR_USE_DRIVER](#constant.sql-cur-use-driver)**
    ([int](#language.types.integer))









    **[SQL_CUR_USE_IF_NEEDED](#constant.sql-cur-use-if-needed)**
    ([int](#language.types.integer))









    **[SQL_CUR_USE_ODBC](#constant.sql-cur-use-odbc)**
    ([int](#language.types.integer))









    **[SQL_CONCURRENCY](#constant.sql-concurrency)**
    ([int](#language.types.integer))









    **[SQL_CONCUR_READ_ONLY](#constant.sql-concur-read-only)**
    ([int](#language.types.integer))









    **[SQL_CONCUR_LOCK](#constant.sql-concur-lock)**
    ([int](#language.types.integer))









    **[SQL_CONCUR_ROWVER](#constant.sql-concur-rowver)**
    ([int](#language.types.integer))









    **[SQL_CONCUR_VALUES](#constant.sql-concur-values)**
    ([int](#language.types.integer))









    **[SQL_CURSOR_TYPE](#constant.sql-cursor-type)**
    ([int](#language.types.integer))









    **[SQL_CURSOR_FORWARD_ONLY](#constant.sql-cursor-forward-only)**
    ([int](#language.types.integer))









    **[SQL_CURSOR_KEYSET_DRIVEN](#constant.sql-cursor-keyset-driven)**
    ([int](#language.types.integer))









    **[SQL_CURSOR_DYNAMIC](#constant.sql-cursor-dynamic)**
    ([int](#language.types.integer))









    **[SQL_CURSOR_STATIC](#constant.sql-cursor-static)**
    ([int](#language.types.integer))









    **[SQL_KEYSET_SIZE](#constant.sql-keyset-size)**
    ([int](#language.types.integer))









    **[SQL_CHAR](#constant.sql-char)**
    ([int](#language.types.integer))









    **[SQL_VARCHAR](#constant.sql-varchar)**
    ([int](#language.types.integer))









    **[SQL_LONGVARCHAR](#constant.sql-longvarchar)**
    ([int](#language.types.integer))









    **[SQL_WCHAR](#constant.sql-wchar)**
    ([int](#language.types.integer))



     String Unicode de longitud fija.





    **[SQL_WVARCHAR](#constant.sql-wvarchar)**
    ([int](#language.types.integer))



     String Unicode de longitud variable.





    **[SQL_WLONGVARCHAR](#constant.sql-wlongvarchar)**
    ([int](#language.types.integer))



     Datos de caracteres Unicode de longitud variable.
     La longitud máxima depende de la fuente de datos.





    **[SQL_DECIMAL](#constant.sql-decimal)**
    ([int](#language.types.integer))









    **[SQL_NUMERIC](#constant.sql-numeric)**
    ([int](#language.types.integer))









    **[SQL_BIT](#constant.sql-bit)**
    ([int](#language.types.integer))









    **[SQL_TINYINT](#constant.sql-tinyint)**
    ([int](#language.types.integer))









    **[SQL_SMALLINT](#constant.sql-smallint)**
    ([int](#language.types.integer))









    **[SQL_INTEGER](#constant.sql-integer)**
    ([int](#language.types.integer))









    **[SQL_BIGINT](#constant.sql-bigint)**
    ([int](#language.types.integer))









    **[SQL_REAL](#constant.sql-real)**
    ([int](#language.types.integer))









    **[SQL_FLOAT](#constant.sql-float)**
    ([int](#language.types.integer))









    **[SQL_DOUBLE](#constant.sql-double)**
    ([int](#language.types.integer))









    **[SQL_BINARY](#constant.sql-binary)**
    ([int](#language.types.integer))









    **[SQL_VARBINARY](#constant.sql-varbinary)**
    ([int](#language.types.integer))









    **[SQL_LONGVARBINARY](#constant.sql-longvarbinary)**
    ([int](#language.types.integer))









    **[SQL_DATE](#constant.sql-date)**
    ([int](#language.types.integer))









    **[SQL_TIME](#constant.sql-time)**
    ([int](#language.types.integer))









    **[SQL_TIMESTAMP](#constant.sql-timestamp)**
    ([int](#language.types.integer))









    **[SQL_TYPE_DATE](#constant.sql-type-date)**
    ([int](#language.types.integer))









    **[SQL_TYPE_TIME](#constant.sql-type-time)**
    ([int](#language.types.integer))









    **[SQL_TYPE_TIMESTAMP](#constant.sql-type-timestamp)**
    ([int](#language.types.integer))









    **[SQL_BEST_ROWID](#constant.sql-best-rowid)**
    ([int](#language.types.integer))









    **[SQL_ROWVER](#constant.sql-rowver)**
    ([int](#language.types.integer))









    **[SQL_SCOPE_CURROW](#constant.sql-scope-currow)**
    ([int](#language.types.integer))









    **[SQL_SCOPE_TRANSACTION](#constant.sql-scope-transaction)**
    ([int](#language.types.integer))









    **[SQL_SCOPE_SESSION](#constant.sql-scope-session)**
    ([int](#language.types.integer))









    **[SQL_NO_NULLS](#constant.sql-no-nulls)**
    ([int](#language.types.integer))









    **[SQL_NULLABLE](#constant.sql-nullable)**
    ([int](#language.types.integer))









    **[SQL_INDEX_UNIQUE](#constant.sql-index-unique)**
    ([int](#language.types.integer))









    **[SQL_INDEX_ALL](#constant.sql-index-all)**
    ([int](#language.types.integer))









    **[SQL_ENSURE](#constant.sql-ensure)**
    ([int](#language.types.integer))









    **[SQL_QUICK](#constant.sql-quick)**
    ([int](#language.types.integer))









    **[SQL_FETCH_FIRST](#constant.sql-fetch-first)**
    ([int](#language.types.integer))



     Devuelve el primer conjunto de filas.





    **[SQL_FETCH_NEXT](#constant.sql-fetch-next)**
    ([int](#language.types.integer))



     Devuelve el siguiente conjunto de filas.

# Funciones ODBC

# odbc_autocommit

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_autocommit — Activa el modo de autovalidación

### Descripción

**odbc_autocommit**(Odbc\Connection $odbc, [?](#language.types.null)[bool](#language.types.boolean) $enable = **[null](#constant.null)**): [int](#language.types.integer)|[bool](#language.types.boolean)

Sin el argumento enable,
**odbc_autocommit()** devuelve el estado de autovalidación

Por omisión, la autovalidación está activada. Desactivar
la autovalidación es equivalente a iniciar una
transacción.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     enable


       Si enable es **[true](#constant.true)**, la autovalidación
       está activada. Si es **[false](#constant.false)**, la autovalidación
       está desactivada.
       Si se pasa **[null](#constant.null)**, esta función devuelve el estado de autovalidación para
       odbc.





### Valores devueltos

Con un argumento enable igual a **[null](#constant.null)**,
**odbc_autocommit()** devuelve el estado de autovalidación
de la conexión odbc. Un valor diferente de 0
si el modo está activado, 0 si no lo está,
o **[false](#constant.false)** si ocurre un error.

Si enable no es null, esta función devuelve **[true](#constant.true)**
en caso de éxito, y **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.3.0

       enable es ahora nullable.



### Ver también

    - [odbc_commit()](#function.odbc-commit) - Valida una transacción ODBC

    - [odbc_rollback()](#function.odbc-rollback) - Anula una transacción

# odbc_binmode

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_binmode — Modifica la gestión de columnas de datos binarios

### Descripción

**odbc_binmode**(Odbc\Result $statement, [int](#language.types.integer) $mode): [true](#language.types.singleton)

**odbc_binmode()** controla la gestión de las
columnas de datos binarios. Los tipos ODBC SQL afectados son
BINARY, VARBINARY y
LONGVARBINARY.
El modo predeterminado puede definirse utilizando la directiva php.ini
[uodbc.defaultbinmode](#ini.uodbc.defaultbinmode)

Cuando un dato SQL se convierte en carácter C,
(**[ODBC_BINMODE_CONVERT](#constant.odbc-binmode-convert)**)
los 8 bits del carácter fuente se representan
por dos caracteres ASCII. Estos caracteres son representaciones
ASCII de los números en formato hexadecimal.
Por ejemplo, el binario 00000001 se
convierte en "01"
y el binario 11111111 se convierte
en "FF".

Mientras que la gestión de las columnas BINARY y
VARBINARY depende únicamente del binmode,
la gestión de las columnas LONGVARBINARY
depende también de longreadlen, como se muestra a continuación:

    <caption>**Conversión de LONGVARBINARY**</caption>



       Modo
       Longitud
       Resultado






       **[ODBC_BINMODE_PASSTHRU](#constant.odbc-binmode-passthru)**
       0
       passthru



       **[ODBC_BINMODE_RETURN](#constant.odbc-binmode-return)**
       0
       passthru



       **[ODBC_BINMODE_CONVERT](#constant.odbc-binmode-convert)**
       0
       passthru



       **[ODBC_BINMODE_PASSTHRU](#constant.odbc-binmode-passthru)**
       &gt;0
       passthru



       **[ODBC_BINMODE_RETURN](#constant.odbc-binmode-return)**
       &gt;0
       Tal cual



       **[ODBC_BINMODE_CONVERT](#constant.odbc-binmode-convert)**
       &gt;0
       Carácter




Si se utiliza [odbc_fetch_into()](#function.odbc-fetch-into), passthru
significa que se devolverá una cadena vacía para estas columnas.
Si se utiliza la función [odbc_result()](#function.odbc-result), passthru
significa que los datos se envían directamente al cliente (es decir, se imprimen).

### Parámetros

     statement


       El objeto de resultado ODBC.






     mode


       Valores posibles para el parámetro mode:



        -

          **[ODBC_BINMODE_PASSTHRU](#constant.odbc-binmode-passthru)**: devolver los datos en binario



        -

          **[ODBC_BINMODE_RETURN](#constant.odbc-binmode-return)**: devolver sin conversión



        -

          **[ODBC_BINMODE_CONVERT](#constant.odbc-binmode-convert)**: convertir en carácter




       **Nota**:

         La gestión de columnas de tipo binary long también se ve afectada
         por la función [odbc_longreadlen()](#function.odbc-longreadlen).







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_close

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_close — Cierra una conexión ODBC

### Descripción

**odbc_close**(Odbc\Connection $odbc): [void](language.types.void.html)

Cierra la conexión con la fuente de datos representada por
el identificador de conexión connection_id.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

### Notas

**Nota**:

    **odbc_close()** fallará si hay transacciones en curso en esta conexión. En este caso, la conexión
    permanecerá abierta.

# odbc_close_all

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_close_all — Cierra todas las conexiones ODBC

### Descripción

**odbc_close_all**(): [void](language.types.void.html)

**odbc_close_all()** cierra todas las conexiones
ODBC a fuentes de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Notas

**Nota**:

     **odbc_close_all()** fallará si hay transacciones
     en curso en esta conexión. En este caso, la conexión permanecerá abierta.

# odbc_columnprivileges

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_columnprivileges — Lista las columnas y sus derechos asociados

### Descripción

**odbc_columnprivileges**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table,
    [string](#language.types.string) $column
): Odbc\Result|[false](#language.types.singleton)

Lista las columnas y sus derechos asociados.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     table


       El nombre de la tabla.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     column


       El nombre de la columna.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.
Este objeto resultado puede ser utilizado para recuperar una lista de columnas y
los derechos asociados.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - COLUMN_NAME

    - GRANTOR

    - GRANTEE

    - PRIVILEGE

    - IS_GRANTABLE

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por TABLE_CAT, TABLE_SCHEM,
TABLE_NAME, COLUMN_NAME y PRIVILEGE.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Listar los Privilegios para una Columna**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$privileges = odbc_columnprivileges($conn, 'TutorialDB', 'dbo', 'test', 'id');
while (($row = odbc_fetch_array($privileges))) {
    print_r($row);
break; // further rows omitted for brevity
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; TutorialDB
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; test
[COLUMN_NAME] =&gt; id
[GRANTOR] =&gt; dbo
[GRANTEE] =&gt; dbo
[PRIVILEGE] =&gt; INSERT
[IS_GRANTABLE] =&gt; YES
)

# odbc_columns

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_columns — Lista las columnas de una tabla

### Descripción

**odbc_columns**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $column = **[null](#constant.null)**
): Odbc\Result|[false](#language.types.singleton)

Lista las columnas de una tabla.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     table


       El nombre de la tabla.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     column


       El nombre de la columna.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - COLUMN_NAME

    - DATA_TYPE

    - TYPE_NAME

    - COLUMN_SIZE

    - BUFFER_LENGTH

    - DECIMAL_DIGITS

    - NUM_PREC_RADIX

    - NULLABLE

    - REMARKS

    - COLUMN_DEF

    - SQL_DATA_TYPE

    - SQL_DATETIME_SUB

    - CHAR_OCTET_LENGTH

    - ORDINAL_POSITION

    - IS_NULLABLE

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por TABLE_CAT, TABLE_SCHEM,
TABLE_NAME y ORDINAL_POSITION.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       schema, table y column
       ahora son anulables.



### Ejemplos

**Ejemplo #1 Listar las Columnas de una Tabla**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$columns = odbc_columns($conn, 'TutorialDB', 'dbo', 'test', '%');
while (($row = odbc_fetch_array($columns))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; TutorialDB
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; TEST
[COLUMN_NAME] =&gt; id
[DATA_TYPE] =&gt; 4
[TYPE_NAME] =&gt; int
[COLUMN_SIZE] =&gt; 10
[BUFFER_LENGTH] =&gt; 4
[DECIMAL_DIGITS] =&gt; 0
[NUM_PREC_RADIX] =&gt; 10
[NULLABLE] =&gt; 0
[REMARKS] =&gt;
[COLUMN_DEF] =&gt;
[SQL_DATA_TYPE] =&gt; 4
[SQL_DATETIME_SUB] =&gt;
[CHAR_OCTET_LENGTH] =&gt;
[ORDINAL_POSITION] =&gt; 1
[IS_NULLABLE] =&gt; NO
)

### Ver también

    - [odbc_columnprivileges()](#function.odbc-columnprivileges) - Lista las columnas y sus derechos asociados

    - [odbc_procedurecolumns()](#function.odbc-procedurecolumns) - Lista los parámetros de los procedimientos

# odbc_commit

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_commit — Valida una transacción ODBC

### Descripción

**odbc_commit**(Odbc\Connection $odbc): [bool](#language.types.boolean)

Valida todas las transacciones en curso en la conexión
connection_id.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_connect

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_connect — Conexión a una fuente

### Descripción

**odbc_connect**(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $user = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [int](#language.types.integer) $cursor_option = **[SQL_CUR_USE_DRIVER](#constant.sql-cur-use-driver)**
): Odbc\Connection|[false](#language.types.singleton)

El identificador de conexión devuelto por esta función es
necesario para todas las demás funciones ODBC. Puede
tener múltiples conexiones al mismo tiempo.

Con algunos controladores ODBC, la ejecución de procedimientos
almacenados complejos puede producir el siguiente error:
"Cannot open a cursor on a stored procedure that has anything
other than a single select statement in it", lo que significa:
"No se puede abrir un cursor en un procedimiento almacenado que tenga
algo distinto de una única sentencia SELECT". Utilizar la opción SQL_CUR_USE_ODBC permite
evitar este error. Además, algunos controladores no soportan el parámetro
opcional de número de línea en [odbc_fetch_row()](#function.odbc-fetch-row).
SQL_CUR_USE_ODBC puede también permitir resolver estos problemas.

### Parámetros

     dsn


       El nombre de la fuente de datos (DSN), para la conexión.






     user


       El nombre de usuario.
       Este parámetro se ignora si dsn contiene uid.
       Para una conexión sin especificar un user,
       utilizar **[null](#constant.null)**.






     password


       La contraseña.
       Este parámetro se ignora si dsn contiene pwd.
       Para una conexión sin especificar un password,
       utilizar **[null](#constant.null)**.






     cursor_option


       Establece el tipo de cursor de resultado
       utilizado para esta conexión. Este parámetro no es
       generalmente necesario, pero puede ser
       útil para evitar ciertos problemas ODBC.




       Las constantes siguientes están definidas como tipos de cursor:





        -

          SQL_CUR_USE_IF_NEEDED



        -

          SQL_CUR_USE_ODBC



        -

          SQL_CUR_USE_DRIVER







### Valores devueltos

Devuelve una conexión ODBC, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Connection**; anteriormente, se devolvía un [resource](#language.types.resource).

8.4.0

user y password ahora pueden ser nulos,
también son opcionales y valen por omisión **[null](#constant.null)**.

8.4.0

Anteriormente, el uso de una cadena vacía para password
no incluía pwd en la cadena de conexión generada
para dsn.
Ahora, pwd se incluye en la cadena de conexión, con
un valor de cadena vacía.
Para restaurar el comportamiento anterior, password puede
ser definido como **[null](#constant.null)**.

8.4.0

Anteriormente, si dsn contenía uid o pwd,
entonces los parámetros user y password eran ignorados.
Ahora, user solo es ignorado si dsn contiene
uid, y password solo es ignorado si
dsn contiene pwd.

### Ejemplos

    **Ejemplo #1 Conexión sin DSN**

&lt;?php
// Microsoft SQL Server utiliza el controlador SQL Native Client 10.0 ODBC Driver:
// permite las conexiones a SQL 7, 2000, 2005 y 2008
$connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);

// Microsoft Access
$connection = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$mdbFilename", $user, $password);

// Microsoft Excel
$excelFile = realpath('C:/ExcelData.xls');
$excelDir = dirname($excelFile);
$connection = odbc_connect("Driver={Microsoft Excel Driver (\*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', '');
?&gt;

### Ver también

    - Para conexiones persistentes: [odbc_pconnect()](#function.odbc-pconnect) - Abre una conexión persistente a un origen de datos

# odbc_connection_string_is_quoted

(PHP 8 &gt;= 8.2.0)

odbc_connection_string_is_quoted — Determina si un valor de string de conexión ODBC está entre comillas

### Descripción

**odbc_connection_string_is_quoted**([string](#language.types.string) $str): [bool](#language.types.boolean)

    Determina si un string está correctamente entre comillas para un string de conexión ODBC. La colocación entre comillas de strings de conexión ODBC se realiza utilizando llaves, y las llaves de cierre en un string deben ser escapadas repitiéndolas dos veces, similar a la colocación entre comillas SQL.

### Parámetros

    str


      El string a verificar para la colocación entre comillas.


### Valores devueltos

**[true](#constant.true)** si el string está correctamente entre comillas, **[false](#constant.false)** en caso contrario.

### Ver también

    - [odbc_connection_string_quote()](#function.odbc-connection-string-quote) - Pone entre comillas un valor de string de conexión ODBC

    - [odbc_connection_string_should_quote()](#function.odbc-connection-string-should-quote) - Determina si un valor de string de conexión ODBC debe ser puesto entre comillas

# odbc_connection_string_quote

(PHP 8 &gt;= 8.2.0)

odbc_connection_string_quote — Pone entre comillas un valor de string de conexión ODBC

### Descripción

**odbc_connection_string_quote**([string](#language.types.string) $str): [string](#language.types.string)

Pone entre comillas un valor de string de conexión, según las reglas ODBC.
Es decir, se rodeará de comillas, y cualquier llave de cierre
será escapada. Esto debería hacerse para todos los valores de string de conexión
que provienen de la entrada del usuario. No hacerlo puede provocar
problemas durante el análisis de la string de conexión, o valores inyectados
en la string de conexión.

Tenga en cuenta que esta función no verifica si la string ya está
entre comillas, ni si la string necesita ser puesta entre comillas. Para ello, llamar
a [odbc_connection_string_is_quoted()](#function.odbc-connection-string-is-quoted) y
a [odbc_connection_string_should_quote()](#function.odbc-connection-string-should-quote).

### Parámetros

    str


      La string sin comillas.


### Valores devueltos

Una string, rodeada de comillas, y correctamente escapada.

### Ejemplos

**Ejemplo #1 Ejemplo de odbc_connection_string_quote()**

    Este ejemplo pone entre comillas una string, luego la coloca en una string de conexión.
    Tenga en cuenta que la string está entre comillas, y el carácter de comilla
    de cierre en medio de la string ha sido escapado.

&lt;?php
$value = odbc_connection_string_quote("foo}bar");
$connection_string = "DSN=PHP;UserValue=$value";
echo $connection_string;
?&gt;

Resultado del ejemplo anterior es similar a:

DSN=PHP;UserValue={foo}}bar}

### Ver también

    - [odbc_connection_string_is_quoted()](#function.odbc-connection-string-is-quoted) - Determina si un valor de string de conexión ODBC está entre comillas

    - [odbc_connection_string_should_quote()](#function.odbc-connection-string-should-quote) - Determina si un valor de string de conexión ODBC debe ser puesto entre comillas

# odbc_connection_string_should_quote

(PHP 8 &gt;= 8.2.0)

odbc_connection_string_should_quote — Determina si un valor de string de conexión ODBC debe ser puesto entre comillas

### Descripción

**odbc_connection_string_should_quote**([string](#language.types.string) $str): [bool](#language.types.boolean)

    Determina si un string debe ser puesto entre comillas para una conexión ODBC.
    Es decir, si contiene caracteres especiales.

Tenga en cuenta que esta función no verifica si el string ya
está entre comillas; un string ya entre comillas
contendrá caracteres que harán que esta función devuelva verdadero. Se debería llamar
a [odbc_connection_string_is_quoted()](#function.odbc-connection-string-is-quoted) para verificar.

### Parámetros

    str


      El string a verificar.


### Valores devueltos

**[true](#constant.true)** si el string debe estar entre comillas, de lo contrario **[false](#constant.false)**.

### Ver también

    - [odbc_connection_string_quote()](#function.odbc-connection-string-quote) - Pone entre comillas un valor de string de conexión ODBC

    - [odbc_connection_string_is_quoted()](#function.odbc-connection-string-is-quoted) - Determina si un valor de string de conexión ODBC está entre comillas

# odbc_cursor

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_cursor — Lee el nombre del puntero de resultado actual

### Descripción

**odbc_cursor**(Odbc\Result $statement): [string](#language.types.string)|[false](#language.types.singleton)

**odbc_cursor()** lee el nombre del puntero de resultado
actual para el resultado result_id.

### Parámetros

     statement


       El objeto de resultado ODBC.





### Valores devueltos

Devuelve el nombre del cursor, en forma de [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_data_source

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

odbc_data_source — Devuelve información sobre los DSNs disponibles

### Descripción

**odbc_data_source**(Odbc\Connection $odbc, [int](#language.types.integer) $fetch_type): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

Devuelve una lista de DSN disponibles (tras haberla llamado varias veces).

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     fetch_type


       El parámetro connection_id es una conexión
       ODBC válida. El parámetro fetch_type puede ser una de las
       dos constantes siguientes: **[SQL_FETCH_FIRST](#constant.sql-fetch-first)** o
       **[SQL_FETCH_NEXT](#constant.sql-fetch-next)**. Utilice **[SQL_FETCH_FIRST](#constant.sql-fetch-first)**
       la primera vez que se llama a la función, luego **[SQL_FETCH_NEXT](#constant.sql-fetch-next)**.





### Valores devueltos

Devuelve **[false](#constant.false)** si ocurre un error, un [array](#language.types.array) en caso de éxito, y
**[null](#constant.null)** tras haber recuperado el último DSN disponible.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Listar los DSNs disponibles**

&lt;?php
$conn = odbc_connect('dsn', 'user', 'pass');
$dsn_info = odbc_data_source($conn, SQL_FETCH_FIRST);
while ($dsn_info) {
print_r($dsn_info);
    $dsn_info = odbc_data_source($conn, SQL_FETCH_NEXT);
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[server] =&gt; dsn
[description] =&gt; ODBC Driver 17 for SQL Server
)
Array
(
[server] =&gt; other_dsn
[description] =&gt; Microsoft Access Driver (_.mdb, _.accdb)
)

# odbc_do

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_do — Alias de [odbc_exec()](#function.odbc-exec)

### Descripción

Esta función es un alias de:
[odbc_exec()](#function.odbc-exec).

# odbc_error

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

odbc_error — Lee el último código de error

### Descripción

**odbc_error**([?](#language.types.null)Odbc\Connection $odbc = **[null](#constant.null)**): [string](#language.types.string)

Devuelve un estado ODBC de 6 dígitos, o una cadena vacía si no había más errores.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

### Valores devueltos

Si odbc está especificado, se devuelve el último
estado ODBC de esta conexión. Si
connection_id se omite, se devuelve el último
estado de cualquier conexión.

Esta función devuelve un valor significativo únicamente si
la última consulta ODBC ha fallado
(es decir, la función [odbc_exec()](#function.odbc-exec) ha devuelto **[false](#constant.false)**).

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       odbc es ahora nullable.



### Ver también

    - [odbc_errormsg()](#function.odbc-errormsg) - Lee el último mensaje de error

    - [odbc_exec()](#function.odbc-exec) - Ejecuta directamente una consulta SQL

# odbc_errormsg

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

odbc_errormsg — Lee el último mensaje de error

### Descripción

**odbc_errormsg**([?](#language.types.null)Odbc\Connection $odbc = **[null](#constant.null)**): [string](#language.types.string)

Devuelve un string que contiene el último mensaje de error ODBC, o
un string vacío si no hubo error.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

### Valores devueltos

Si odbc está especificado, el
último estado ODBC de esta conexión es devuelto.

Esta función devuelve un valor significativo únicamente si
la última consulta ODBC falló
(i.e. la función [odbc_exec()](#function.odbc-exec) devolvió **[false](#constant.false)**).

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       odbc es ahora nullable.



### Ver también

    - [odbc_error()](#function.odbc-error) - Lee el último código de error

    - [odbc_exec()](#function.odbc-exec) - Ejecuta directamente una consulta SQL

# odbc_exec

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_exec — Ejecuta directamente una consulta SQL

### Descripción

**odbc_exec**(Odbc\Connection $odbc, [string](#language.types.string) $query): Odbc\Result|[false](#language.types.singleton)

**odbc_exec()** envía un comando SQL
a la fuente de datos ODBC, representada por
connection_id.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     query


       La consulta SQL.





### Valores devueltos

Devuelve un objeto de resultado ODBC si el comando SQL se ejecutó con éxito
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

      8.0.0

       flags fue eliminado.



### Ver también

    - [odbc_prepare()](#function.odbc-prepare) - Prepara una orden para su ejecución

    - [odbc_execute()](#function.odbc-execute) - Ejecuta una consulta SQL preparada

# odbc_execute

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_execute — Ejecuta una consulta SQL preparada

### Descripción

**odbc_execute**(Odbc\Result $statement, [array](#language.types.array) $params = []): [bool](#language.types.boolean)

Ejecuta una consulta SQL preparada por [odbc_prepare()](#function.odbc-prepare).

### Parámetros

     statement


       El objeto de resultado ODBC desde [odbc_prepare()](#function.odbc-prepare).






     params


       Los valores del parámetro params serán
       sustituidos en las variables de consulta de la consulta preparada.
       Los elementos de este array serán convertidos a string al
       llamar a esta función.




       Todo parámetro de params que
       comience y termine con comillas simples será considerado
       como un nombre de fichero a leer y enviado a la base de datos,
       con la variable de consulta apropiada.




       Si se desea almacenar un string que comience y termine
       realmente con comillas, se debe añadir un espacio al inicio
       o al final del string, para evitar que este parámetro sea confundido con
       un nombre de fichero. Si esto no es posible en el contexto de la aplicación,
       se deberá utilizar la función [odbc_exec()](#function.odbc-exec).



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

      8.0.0

       El parámetro flags, sin uso, ha sido eliminado.



### Ejemplos

    **Ejemplo #1
     Ejemplo con odbc_execute()** y
     [odbc_prepare()](#function.odbc-prepare)




     En el script siguiente, $success solo será
     posible si los tres parámetros de maproc
     son parámetros de tipo IN:

&lt;?php
$a = 1;
$b = 2;
$c = 3;
$stmt = odbc_prepare($conn, 'CALL maproc(?,?,?)');
$success = odbc_execute($stmt, array($a, $b, $c));
?&gt;

Si se necesita llamar a un procedimiento almacenado utilizando parámetros
INOUT o OUT, la solución es utilizar una extensión nativa de la base de datos
(por ejemplo [oci8](#ref.oci8) para Oracle).

### Ver también

    - [odbc_prepare()](#function.odbc-prepare) - Prepara una orden para su ejecución

# odbc_fetch_array

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

odbc_fetch_array — Lee una línea de resultado en un array asociativo

### Descripción

**odbc_fetch_array**(Odbc\Result $statement, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**odbc_fetch_array()** lee una línea de resultado
en un array asociativo desde una consulta ODBC.

### Parámetros

     statement


       El objeto de resultado ODBC desde [odbc_exec()](#function.odbc-exec).






     row


       El número de la línea que debe ser leída, opcional.





### Valores devueltos

Devuelve un array correspondiente a la línea recuperada, o **[false](#constant.false)**
si no hay más líneas disponibles.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.4.0

       row es ahora nullable.



### Notas

**Nota**:

    Esta función está disponible cuando PHP es compilado con
    el soporte IBM DB2 o UnixODBC.

### Ver también

    - [odbc_fetch_row()](#function.odbc-fetch-row) - Lee una línea de resultado

    - [odbc_fetch_object()](#function.odbc-fetch-object) - Lee una línea de resultado en un objeto

    - [odbc_num_rows()](#function.odbc-num-rows) - Número de filas en un resultado

# odbc_fetch_into

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_fetch_into — Lee una línea de resultado y la coloca en un array

### Descripción

**odbc_fetch_into**(Odbc\Result $statement, [array](#language.types.array) &amp;$array, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

Lee una línea de resultado y la coloca en un array.

### Parámetros

     statement


        El objeto de resultado ODBC.






     array


       Puede ser de cualquier tipo, ya que será convertido
       en array. El array contendrá los valores de las columnas, estas
       últimas están numeradas a partir de 0.






     row


       El número de la línea.





### Valores devueltos

Devuelve el número de columnas del resultado, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.4.0

       row es ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con odbc_fetch_into()**

&lt;?php
$rc = odbc_fetch_into($res_id, $my_array);
?&gt;

     o

&lt;?php
$rc = odbc_fetch_into($res_id, $my_array, 2);
?&gt;

# odbc_fetch_object

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

odbc_fetch_object — Lee una línea de resultado en un objeto

### Descripción

**odbc_fetch_object**(Odbc\Result $statement, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**): [stdClass](#class.stdclass)|[false](#language.types.singleton)

**odbc_fetch_object()** lee una línea de resultado
en un objeto desde una consulta ODBC.

### Parámetros

     statement


       El objeto de resultado ODBC desde [odbc_exec()](#function.odbc-exec).






     row


       El número de línea a recuperar, opcional.





### Valores devueltos

Devuelve un objeto que corresponde a la línea recuperada, o **[false](#constant.false)**
si no hay más líneas disponibles.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.4.0

       row es ahora nullable.



### Notas

**Nota**:

    Esta función está disponible cuando PHP es compilado
    con soporte IBM DB2 o UnixODBC.

### Ver también

    - [odbc_fetch_row()](#function.odbc-fetch-row) - Lee una línea de resultado

    - [odbc_fetch_array()](#function.odbc-fetch-array) - Lee una línea de resultado en un array asociativo

    - [odbc_num_rows()](#function.odbc-num-rows) - Número de filas en un resultado

# odbc_fetch_row

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_fetch_row — Lee una línea de resultado

### Descripción

**odbc_fetch_row**(Odbc\Result $statement, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**): [bool](#language.types.boolean)

Lee una línea en el resultado identificado por
result_id y devuelto por
[odbc_do()](#function.odbc-do) o
[odbc_exec()](#function.odbc-exec). Tras
**odbc_fetch_row()**, los campos serán accesibles
con la función [odbc_result()](#function.odbc-result).

### Parámetros

     statement


       El objeto de resultado ODBC.






     row


       Si row es omitido,
       row intentará leer la siguiente
       línea en el resultado. Llamadas repetidas
       a **odbc_fetch_row()** con y sin parámetro
       row pueden ser combinadas libremente.




       Para revisar todas las líneas de un resultado varias veces,
       se puede llamar a **odbc_fetch_row()** con row_number = 1,
       luego continuar llamando a **odbc_fetch_row()** sin el
       parámetro row para revisar
       todo el resultado. Si un controlador no soporta la lectura de
       líneas por número, el parámetro será ignorado.





### Valores devueltos

Devuelve **[true](#constant.true)** si la línea existe, **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

Se emite un **[E_WARNING](#constant.e-warning)** cuando row
es igual o inferior a cero.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

      8.4.0

       Ahora se emite un **[E_WARNING](#constant.e-warning)** cuando row
       es igual o inferior a cero.




      8.0.0

       row ahora es nullable.



# odbc_field_len

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_len — Lee la longitud de un campo

### Descripción

**odbc_field_len**(Odbc\Result $statement, [int](#language.types.integer) $field): [int](#language.types.integer)|[false](#language.types.singleton)

Lee la longitud del campo identificado por su número.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El número del campo. La numeración comienza en 1.





### Valores devueltos

Devuelve la longitud del campo o
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

### Ver también

    - [odbc_field_scale()](#function.odbc-field-scale) - Lee la escala de un campopara conocer
    la escala de un número de coma flotante

# odbc_field_name

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_name — Lee el nombre de la columna

### Descripción

**odbc_field_name**(Odbc\Result $statement, [int](#language.types.integer) $field): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el nombre del campo que ocupa el número de columna dado en el objeto resultado especificado.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El número de la columna. La numeración comienza en 1.





### Valores devueltos

Devuelve el nombre de la columna, como un [string](#language.types.string),
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_field_num

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_num — Número de columna

### Descripción

**odbc_field_num**(Odbc\Result $statement, [string](#language.types.string) $field): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene el número de la columna correspondiente al campo nombrado en el objeto resultado especificado.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El nombre del campo.





### Valores devueltos

Devuelve el número del campo, en forma de [int](#language.types.integer), o
**[false](#constant.false)** si ocurre un error. La numeración comienza en 1.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_field_precision

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_precision — Alias de [odbc_field_len()](#function.odbc-field-len)

### Descripción

Esta función es un alias de:
[odbc_field_len()](#function.odbc-field-len).

### Ver también

    - [odbc_field_scale()](#function.odbc-field-scale) - Lee la escala de un campo para conocer
    la escala de un número de coma flotante.

# odbc_field_scale

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_scale — Lee la escala de un campo

### Descripción

**odbc_field_scale**(Odbc\Result $statement, [int](#language.types.integer) $field): [int](#language.types.integer)|[false](#language.types.singleton)

Lee la escala del campo referenciado por su número de campo
field_number en el resultado ODBC
result_id.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El número del campo. La numeración comienza en 1.





### Valores devueltos

Devuelve la escala del campo, en forma de [int](#language.types.integer), o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_field_type

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_field_type — Tipo de datos de un campo

### Descripción

**odbc_field_type**(Odbc\Result $statement, [int](#language.types.integer) $field): [string](#language.types.string)|[false](#language.types.singleton)

Lee el tipo de datos SQL de un campo, identificado por su número.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El número del campo. La numeración comienza en 1.





### Valores devueltos

Devuelve el tipo del campo, en forma de [string](#language.types.string),
o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_foreignkeys

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_foreignkeys — Lista las claves foráneas

### Descripción

**odbc_foreignkeys**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $pk_catalog,
    [string](#language.types.string) $pk_schema,
    [string](#language.types.string) $pk_table,
    [string](#language.types.string) $fk_catalog,
    [string](#language.types.string) $fk_schema,
    [string](#language.types.string) $fk_table
): Odbc\Result|[false](#language.types.singleton)

Lista las claves foráneas utilizadas en la tabla
pk_table.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     fk_catalog


       El catálogo ('qualifier' en terminología ODBC 2) de la clave
       primaria de la tabla.






     pk_schema


       El esquema ('qualifier' en terminología ODBC 2) de la clave
       primaria de la tabla.






     pk_table


       La tabla de clave primaria.






     pk_catalog


       El catálogo ('qualifier' en terminología ODBC 2) de la clave
       foránea de la tabla.






     fk_schema


       El esquema ('qualifier' en terminología ODBC 2) de la clave
       foránea de la tabla.






     fk_table


       La tabla de clave foránea.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - PKTABLE_CAT

    - PKTABLE_SCHEM

    - PKTABLE_NAME

    - PKCOLUMN_NAME

    - FKTABLE_CAT

    - FKTABLE_SCHEM

    - FKTABLE_NAME

    - FKCOLUMN_NAME

    - KEY_SEQ

    - UPDATE_RULE

    - DELETE_RULE

    - FK_NAME

    - PK_NAME

    - DEFERRABILITY

Los controladores pueden indicar columnas adicionales.

Si las claves foráneas asociadas con una clave primaria son solicitadas, el conjunto
de resultados está ordenado por FKTABLE_CAT, FKTABLE_SCHEM,
FKTABLE_NAME y KEY_SEQ.
Si las claves primarias asociadas con una clave foránea son solicitadas, el conjunto
de resultados está ordenado por PKTABLE_CAT, PKTABLE_SCHEM,
PKTABLE_NAME y KEY_SEQ.

Si pk_table contiene un nombre de tabla,
**odbc_foreignkeys()** retorna la clave primaria
de la tabla pk_table, y todas las
claves foráneas que hacen referencia a ella.

Si fk_table contiene un nombre de tabla,
**odbc_foreignkeys()** retorna la lista de
claves foráneas de la tabla fk_table,
y las claves primarias (de otras tablas) que hacen referencia a ella.

Si pk_table y
fk_table contienen nombres de tablas,
**odbc_foreignkeys()** retorna la lista de claves
foráneas de la tabla fk_table que utilizan
la clave primaria de la tabla pk_table.
Esta lista debería contener como máximo una clave.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ver también

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

    - [odbc_primarykeys()](#function.odbc-primarykeys) - Lista las columnas utilizadas en una clave primaria

# odbc_free_result

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_free_result — Libera los objetos asociados a un resultado

### Descripción

**odbc_free_result**(Odbc\Result $statement): [true](#language.types.singleton)

Libera los objetos asociados a un resultado.

**odbc_free_result()** solo es necesario
si se teme utilizar demasiada memoria durante la ejecución
del script. Todos los resultados en memoria se liberarán
al final del script.

### Parámetros

     statement


       El objeto de resultado ODBC.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

### Notas

**Nota**:

    Si la autovalidación está desactivada (ver
    [odbc_autocommit()](#function.odbc-autocommit)) y se llama
    a **odbc_free_result()** antes de validar las consultas,
    todas las transacciones preparadas se cancelarán.

# odbc_gettypeinfo

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_gettypeinfo — Lista los tipos de datos soportados por un origen

### Descripción

    **odbc_gettypeinfo**(Odbc\Connection $odbc, [int](#language.types.integer) $data_type = 0): Odbc\Result|[false](#language.types.singleton)

Lista los tipos de datos soportados por un origen.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     data_type


       Puede ser utilizado para restringir la información a
       un solo tipo de datos.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El resultado posee las columnas siguientes:

    - TYPE_NAME

    - DATA_TYPE

    - PRECISION

    - LITERAL_PREFIX

    - LITERAL_SUFFIX

    - CREATE_PARAMS

    - NULLABLE

    - CASE_SENSITIVE

    - SEARCHABLE

    - UNSIGNED_ATTRIBUTE

    - MONEY

    - AUTO_INCREMENT

    - LOCAL_TYPE_NAME

    - MINIMUM_SCALE

    - MAXIMUM_SCALE

El resultado está ordenado por DATA_TYPE y TYPE_NAME.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

# odbc_longreadlen

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_longreadlen — Gestión de columnas de tipo LONG

### Descripción

**odbc_longreadlen**(Odbc\Result $statement, [int](#language.types.integer) $length): [true](#language.types.singleton)

Activa la gestión de columnas de tipo LONG,
LONGVARCHAR y LONGVARBINARY.
La longitud por defecto puede ser definida utilizando la directiva php.ini
[uodbc.defaultlrl](#ini.uodbc.defaultlrl).

### Parámetros

     statement


       El objeto de resultado ODBC.






     length


       El número de bytes retornado a PHP.
       Si se define como 0, los datos de las columnas
       de tipo LONG son pasados al cliente (es decir, impresos) cuando son
       recuperados con la función [odbc_result()](#function.odbc-result).





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

### Notas

**Nota**:

    La gestión de tipos LONGVARBINARY también es afectada por
    [odbc_binmode()](#function.odbc-binmode).

# odbc_next_result

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

odbc_next_result — Verifica si hay múltiples resultados disponibles

### Descripción

**odbc_next_result**(Odbc\Result $statement): [bool](#language.types.boolean)

Verifica si hay más conjuntos de resultados disponibles accesibles
mediante las funciones [odbc_fetch_array()](#function.odbc-fetch-array),
[odbc_fetch_row()](#function.odbc-fetch-row), [odbc_result()](#function.odbc-result), etc.

### Parámetros

     statement


       El objeto de resultado ODBC.





### Valores devueltos

Devuelve **[true](#constant.true)** si no hay más conjuntos de resultados, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con odbc_next_result()**

&lt;?php
$r_Connection = odbc_connect($dsn, $username, $password);

$s_SQL = &lt;&lt;&lt;END_SQL
SELECT 'A'
SELECT 'B'
SELECT 'C'
END_SQL;

$r_Results = odbc_exec($r_Connection, $s_SQL);

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Muestra el primer conjunto de resultados: ";
var_dump($a_Row1, $a_Row2);

echo "Recuperación del segundo conjunto de resultados: ";
var_dump(odbc_next_result($r_Results));

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Muestra el segundo conjunto de resultados: ";
var_dump($a_Row1, $a_Row2);

echo "Recuperación del tercer conjunto de resultados: ";
var_dump(odbc_next_result($r_Results));

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Muestra el tercer conjunto de resultados: ";
var_dump($a_Row1, $a_Row2);

echo "Intento de recuperar un cuarto conjunto de resultados: ";
var_dump(odbc_next_result($r_Results));
?&gt;

    El ejemplo anterior mostrará:

Muestra el primer conjunto de resultados: array(1) {
["A"]=&gt;
string(1) "A"
}
bool(false)
Recuperación del segundo conjunto de resultados:bool(true)
Muestra el segundo conjunto de resultados: array(1) {
["B"]=&gt;
string(1) "B"
}
bool(false)
Recuperación del tercer conjunto de resultados: bool(true)
Muestra el tercer conjunto de resultados: array(1) {
["C"]=&gt;
string(1) "C"
}
bool(false)
Intento de recuperar un cuarto conjunto de resultados: bool(false)

# odbc_num_fields

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_num_fields — Número de columnas en un resultado

### Descripción

**odbc_num_fields**(Odbc\Result $statement): [int](#language.types.integer)

Obtiene el número de columnas en un resultado ODBC.

### Parámetros

     statement


       El objeto de resultado ODBC devuelto por la función
       [odbc_exec()](#function.odbc-exec).





### Valores devueltos

Devuelve el número de columnas, o -1 en caso de error.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_num_rows

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_num_rows — Número de filas en un resultado

### Descripción

**odbc_num_rows**(Odbc\Result $statement): [int](#language.types.integer)

Lee el número de filas en un resultado. Para los comandos INSERT,
UPDATE y DELETE, **odbc_num_rows()** devuelve el
número de filas afectadas. Para los comandos SELECT, esto
_PUEDE_ ser el número de filas disponibles, pero
no es seguro.

### Parámetros

     statement


       El objeto de resultado ODBC devuelto por la función
       [odbc_exec()](#function.odbc-exec).





### Valores devueltos

Devuelve el número de filas en el resultado ODBC.
Esta función devolverá -1 si ocurre un error.

### Notas

**Nota**:

    El uso de la función **odbc_num_rows()** para
    determinar el número de filas disponibles después de un SELECT devolverá
    -1 con la mayoría de los controladores.

### Historial de cambios

      Versión
      Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_pconnect

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_pconnect — Abre una conexión persistente a un origen de datos

### Descripción

**odbc_pconnect**(
    [string](#language.types.string) $dsn,
    [?](#language.types.null)[string](#language.types.string) $user = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [int](#language.types.integer) $cursor_option = **[SQL_CUR_USE_DRIVER](#constant.sql-cur-use-driver)**
): Odbc\Connection|[false](#language.types.singleton)

Abre una conexión persistente a un origen de datos.

**odbc_pconnect()** se comporta de manera similar
a [odbc_connect()](#function.odbc-connect), pero la conexión abierta
no se cierra realmente cuando el script finaliza. Las siguientes
solicitudes que se realicen a una conexión cuyos
dsn, user,
password sean los mismos que esta (con
[odbc_connect()](#function.odbc-connect) y **odbc_pconnect()**)
reutilizarán la conexión abierta.

### Parámetros

Consulte la función [odbc_connect()](#function.odbc-connect) para más detalles.

### Valores devueltos

Devuelve una conexión ODBC, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Connection**; anteriormente, se devolvía un [resource](#language.types.resource).

8.4.0

user y password ahora pueden ser nulos,
también son opcionales y valen por omisión **[null](#constant.null)**.

8.4.0

Anteriormente, el uso de una cadena vacía para password
no incluía pwd en la cadena de conexión generada
para dsn.
Ahora, pwd se incluye en la cadena de conexión, con
un valor de cadena vacía.
Para restaurar el comportamiento anterior, password puede
ser definido como **[null](#constant.null)**.

8.4.0

Anteriormente, si dsn contenía uid o pwd,
entonces los parámetros user y password eran ignorados.
Ahora, user solo es ignorado si dsn contiene
uid, y password solo es ignorado si
dsn contiene pwd.

### Notas

**Nota**:

    Las conexiones persistentes no tienen ningún efecto si PHP se utiliza como
    CGI.

### Ver también

    - [odbc_connect()](#function.odbc-connect) - Conexión a una fuente

    - [Las conexiones
     persistentes a bases de datos](#features.persistent-connections)

# odbc_prepare

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_prepare — Prepara una orden para su ejecución

### Descripción

**odbc_prepare**(Odbc\Connection $odbc, [string](#language.types.string) $query): Odbc\Result|[false](#language.types.singleton)

Prepara una orden para su ejecución. El objeto de resultado ODBC puede ser utilizado más
tarde para ejecutar la orden con [odbc_execute()](#function.odbc-execute).

Algunas bases de datos (como IBM DB2, MS SQL Server y Oracle)
soportan los procedimientos almacenados que aceptan los tipos de parámetros
IN, INOUT y OUT como se definen en las especificaciones ODBC. Sin embargo,
el driver unificado ODBC soporta actualmente únicamente el tipo de parámetros
IN para los procedimientos almacenados.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     query


       La consulta a preparar.





### Valores devueltos

Devuelve un objeto de resultado ODBC si la orden SQL ha sido
preparada con éxito. Retorna **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con odbc_prepare()** y [odbc_execute()](#function.odbc-execute)



     En el código siguiente, $res solo será
     válido si los tres parámetros para myproc
     son parámetros IN:

&lt;?php
$a = 1;
$b = 2;
$c = 3;
$stmt = odbc_prepare($conn, 'CALL myproc(?,?,?)');
$res = odbc_execute($stmt, array($a, $b, $c));
?&gt;

Si necesita llamar a un procedimiento almacenado que utilice parámetros
INOUT o OUT, se recomienda utilizar la extensión nativa de su
base de datos
(por ejemplo [oci8](#ref.oci8) para Oracle).

### Ver también

    - [odbc_execute()](#function.odbc-execute) - Ejecuta una consulta SQL preparada

# odbc_primarykeys

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_primarykeys — Lista las columnas utilizadas en una clave primaria

### Descripción

**odbc_primarykeys**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table
): Odbc\Result|[false](#language.types.singleton)

Devuelve un objeto resultado que puede ser utilizado para recuperar los nombres de las columnas
que componen la clave primaria de una tabla.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).






     table







### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - COLUMN_NAME

    - KEY_SEQ

    - PK_NAME

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por TABLE_CAT, TABLE_SCHEM,
TABLE_NAME y KEY_SEQ.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Listar las Claves primarias de una Columna**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$primarykeys = odbc_primarykeys($conn, 'TutorialDB', 'dbo', 'TEST');
while (($row = odbc_fetch_array($primarykeys))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; TutorialDB
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; TEST
[COLUMN_NAME] =&gt; id
[KEY_SEQ] =&gt; 1
[PK_NAME] =&gt; PK**TEST**3213E83FE141F843
)

### Ver también

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

    - [odbc_foreignkeys()](#function.odbc-foreignkeys) - Lista las claves foráneas

# odbc_procedurecolumns

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_procedurecolumns — Lista los parámetros de los procedimientos

### Descripción

**odbc_procedurecolumns**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $procedure = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $column = **[null](#constant.null)**
): Odbc\Result|[false](#language.types.singleton)

Lista los parámetros de los procedimientos.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     procedure


       El procedimiento.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     column


       La columna.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.





### Valores devueltos

Devuelve los parámetros de entrada y salida, así como las columnas
utilizadas en los procedimientos designados por los argumentos.
Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - PROCEDURE_CAT

    - PROCEDURE_SCHEM

    - PROCEDURE_NAME

    - COLUMN_NAME

    - COLUMN_TYPE

    - DATA_TYPE

    - TYPE_NAME

    - COLUMN_SIZE

    - BUFFER_LENGTH

    - DECIMAL_DIGITS

    - NUM_PREC_RADIX

    - NULLABLE

    - REMARKS

    - COLUMN_DEF

    - SQL_DATA_TYPE

    - SQL_DATETIME_SUB

    - CHAR_OCTET_LENGTH

    - ORDINAL_POSITION

    - IS_NULLABLE

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por PROCEDURE_CAT, PROCEDURE_SCHEM,
PROCEDURE_NAME y COLUMN_TYPE.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

      8.0.0

       Antes de esta versión, la función solo podía ser llamada con uno o cinco argumentos.



### Ejemplos

**Ejemplo #1 Lista las columnas de un procedimiento almacenado**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$columns = odbc_procedurecolumns($conn, 'TutorialDB', 'dbo', 'GetEmployeeSalesYTD;1', '%');
while (($row = odbc_fetch_array($columns))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[PROCEDURE_CAT] =&gt; TutorialDB
[PROCEDURE_SCHEM] =&gt; dbo
[PROCEDURE_NAME] =&gt; GetEmployeeSalesYTD;1
[COLUMN_NAME] =&gt; @SalesPerson
[COLUMN_TYPE] =&gt; 1
[DATA_TYPE] =&gt; -9
[TYPE_NAME] =&gt; nvarchar
[COLUMN_SIZE] =&gt; 50
[BUFFER_LENGTH] =&gt; 100
[DECIMAL_DIGITS] =&gt;
[NUM_PREC_RADIX] =&gt;
[NULLABLE] =&gt; 1
[REMARKS] =&gt;
[COLUMN_DEF] =&gt;
[SQL_DATA_TYPE] =&gt; -9
[SQL_DATETIME_SUB] =&gt;
[CHAR_OCTET_LENGTH] =&gt; 100
[ORDINAL_POSITION] =&gt; 1
[IS_NULLABLE] =&gt; YES
)

### Ver también

    - [odbc_columns()](#function.odbc-columns) - Lista las columnas de una tabla

# odbc_procedures

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_procedures — Lista los procedimientos almacenados

### Descripción

**odbc_procedures**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $procedure = **[null](#constant.null)**
): Odbc\Result|[false](#language.types.singleton)

Lista los procedimientos almacenados.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     procedure


       El nombre.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.





### Valores devueltos

Devuelve un objeto de resultado ODBC que contiene las informaciones o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las columnas siguientes:

    - PROCEDURE_CAT

    - PROCEDURE_SCHEM

    - PROCEDURE_NAME

    - NUM_INPUT_PARAMS

    - NUM_OUTPUT_PARAMS

    - NUM_RESULT_SETS

    - REMARKS

    - PROCEDURE_TYPE

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por PROCEDURE_CAT,
PROCEDURE_SCHEMA y PROCEDURE_NAME.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

      8.0.0

       Antes de esta versión, la función solo podía ser llamada con uno o cuatro argumentos.



### Ejemplos

**Ejemplo #1 Lista los procedimientos almacenados de una base de datos**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$procedures = odbc_procedures($conn, $catalog, $schema, '%');
while (($row = odbc_fetch_array($procedures))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[PROCEDURE_CAT] =&gt; TutorialDB
[PROCEDURE_SCHEM] =&gt; dbo
[PROCEDURE_NAME] =&gt; GetEmployeeSalesYTD;1
[NUM_INPUT_PARAMS] =&gt; -1
[NUM_OUTPUT_PARAMS] =&gt; -1
[NUM_RESULT_SETS] =&gt; -1
[REMARKS] =&gt;
[PROCEDURE_TYPE] =&gt; 2
)

### Ver también

    - [odbc_procedurecolumns()](#function.odbc-procedurecolumns) - Lista los parámetros de los procedimientos

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

# odbc_result

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_result — Lee un campo de resultado UODBC

### Descripción

**odbc_result**(Odbc\Result $statement, [string](#language.types.string)|[int](#language.types.integer) $field): [string](#language.types.string)|[bool](#language.types.boolean)|[null](#language.types.null)

Lee un campo de resultado UODBC.

### Parámetros

     statement


       El objeto de resultado ODBC.






     field


       El nombre del campo a recuperar. Puede ser tanto un entero,
       que contiene el número de columna del campo, en el
       resultado, como una cadena de caracteres, que
       representa el nombre del campo.





### Valores devueltos

Devuelve el contenido del campo, **[false](#constant.false)** si ocurre un error, **[null](#constant.null)**
para datos NULL, o **[true](#constant.true)** para datos binarios.

### Historial de cambios

       Versión
       Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

La primera llamada a **odbc_result()** devuelve
el valor del tercer campo de la fila actual del
resultado result_id. La segunda
llamada a **odbc_result()** devuelve el valor del
tercer campo cuyo nombre es "val" de la fila actual del
resultado result_id. Se produce un error si
el parámetro de columna es inferior a 1, o
supera el número de columnas del resultado. De la misma
manera, se produce un error si el nombre del campo pasado no
corresponde a ningún campo en el resultado.

    **Ejemplo #1 Ejemplo con odbc_result()**

&lt;?php
$item_3   = odbc_result($Query_ID, 3);
$item_val = odbc_result($Query_ID, "val");
?&gt;

### Notas

Los índices de campos comienzan en 1. Para más información
sobre cómo leer columnas de tipo binario o largo,
consulte [odbc_binmode()](#function.odbc-binmode) y
[odbc_longreadlen()](#function.odbc-longreadlen).

# odbc_result_all

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_result_all — Muestra el resultado en forma de tabla HTML

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.1.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**odbc_result_all**(Odbc\Result $statement, [string](#language.types.string) $format = ""): [int](#language.types.integer)|[false](#language.types.singleton)

Muestra todas las filas de un resultado. La visualización se realiza en formato HTML.
Los datos _no están_ escapados.

Esta función no está destinada a ser utilizada en un entorno de
producción; está prevista para el desarrollo para mostrar
rápidamente un conjunto de resultados.

### Parámetros

     statement


       El objeto de resultado ODBC.






     format


       Permite modificar el aspecto global de la tabla.





### Valores devueltos

Devuelve el número de filas del resultado, o **[false](#constant.false)** si se
produce un error.

### Historial de cambios

       Versión
       Descripción







8.4.0

statement ahora espera una instancia de
**Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).

       8.1.0

        Esta función ha sido declarada obsoleta.





# odbc_rollback

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_rollback — Anula una transacción

### Descripción

**odbc_rollback**(Odbc\Connection $odbc): [bool](#language.types.boolean)

Anula todas las transacciones en la conexión connection_id.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

# odbc_setoption

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_setoption — Modifica los parámetros ODBC

### Descripción

**odbc_setoption**(
    Odbc\Connection|Odbc\Result $odbc,
    [int](#language.types.integer) $which,
    [int](#language.types.integer) $option,
    [int](#language.types.integer) $value
): [bool](#language.types.boolean)

**odbc_setoption()** permite acceder a las opciones
ODBC para una conexión particular o un resultado de
consulta. Fue escrita para ayudar a
la resolución de problemas relacionados con los controladores ODBC
problemáticos. Será necesario utilizar
**odbc_setoption()** si se es un programador
ODBC y se comprenden los diversos efectos de las opciones disponibles.
Asimismo, se necesitará un buen manual de referencia para
comprender las opciones y su uso. Diferentes versiones de
controladores admiten diferentes versiones de opciones.

Dado que los efectos pueden variar de un controlador a
otro, el uso de **odbc_setoption()** en
scripts destinados a ser entregados al público
está muy fuertemente desaconsejado. Además, ciertas
opciones ODBC no están disponibles porque deben ser
fijadas antes del establecimiento de la conexión. Sin embargo,
si en un caso bien específico, **odbc_setoption()**
permite utilizar PHP sin que el jefe obligue a
usar un producto comercial, entonces no importa.

### Parámetros

     odbc


       Un identificador de conexión, o un identificador
       de resultado, para el cual se desea modificar opciones.
       Para SQLSetConnectOption(), es un identificador de conexión.
       Para SQLSetStmtOption(), es un identificador de resultado.






     which


       Función ODBC a utilizar.
       El valor debe ser 1 para usar SQLSetConnectOption() y 2
       para SQLSetStmtOption().






     option


       La opción a definir.






     value


       El valor para la opción dada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       odbc espera ahora una instancia de **Odbc\Connection**
       o de **Odbc\Result**; anteriormente, se esperaba un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con odbc_setoption()**

&lt;?php
// 1. La opción 102 de SQLSetConnectOption() es SQL_AUTOCOMMIT.
// 1 de SQL_AUTOCOMMIT es SQL_AUTOCOMMIT_ON.
// Este ejemplo tiene el mismo efecto que
// odbc_autocommit($conn, true);

odbc_setoption($conn, 1, 102, 1);

// 2. Opción 0 de SQLSetStmtOption() es SQL_QUERY_TIMEOUT.
// Este ejemplo fija el tiempo límite a 30 segundos.

$result = odbc_prepare($conn, $sql);
odbc_setoption($result, 2, 0, 30);
odbc_execute($result);
?&gt;

# odbc_specialcolumns

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_specialcolumns — Devuelve el conjunto óptimo de columnas

### Descripción

**odbc_specialcolumns**(
    Odbc\Connection $odbc,
    [int](#language.types.integer) $type,
    [?](#language.types.null)[string](#language.types.string) $catalog,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table,
    [int](#language.types.integer) $scope,
    [int](#language.types.integer) $nullable
): Odbc\Result|[false](#language.types.singleton)

Devuelve el conjunto óptimo de columnas que identifica de manera única
una fila de una tabla, o las columnas que se actualizan automáticamente
cuando alguno de los valores de la fila es modificado por una transacción.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     type


       Cuando el tipo es **[SQL_BEST_ROWID](#constant.sql-best-rowid)**,
       **odbc_specialcolumns()**
       devuelve la o las columnas que permiten identificar de manera única
       cada fila de una tabla.


       Cuando el tipo es **[SQL_ROWVER](#constant.sql-rowver)**,
       **odbc_specialcolumns()** devuelve la columna o las columnas
       de la tabla especificada, si las hay, que se actualizan automáticamente
       por los datos de origen cuando cada valor de la fila es modificado
       por cualquier transacción.




     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).






     table


       La tabla.






     scope


       El scope, que ordena el conjunto de resultados.
       Uno de **[SQL_SCOPE_CURROW](#constant.sql-scope-currow)**, **[SQL_SCOPE_TRANSACTION](#constant.sql-scope-transaction)**
       o **[SQL_SCOPE_SESSION](#constant.sql-scope-session)**.






     nullable


       Determina si las columnas especiales que pueden tener un valor NULL
       deben ser devueltas o no.
       Uno de **[SQL_NO_NULLS](#constant.sql-no-nulls)** o **[SQL_NULLABLE](#constant.sql-nullable)**.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - SCOPE

    - COLUMN_NAME

    - DATA_TYPE

    - TYPE_NAME

    - COLUMN_SIZE

    - BUFFER_LENGTH

    - DECIMAL_DIGITS

    - PSEUDO_COLUMN

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por SCOPE.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ver también

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

# odbc_statistics

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_statistics — Cálculo de estadísticas sobre una tabla

### Descripción

**odbc_statistics**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table,
    [int](#language.types.integer) $unique,
    [int](#language.types.integer) $accuracy
): Odbc\Result|[false](#language.types.singleton)

Cálculo de estadísticas sobre una tabla.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).






     table


       El nombre de la tabla.






     unique


       El tipo del índice.
       Uno de **[SQL_INDEX_UNIQUE](#constant.sql-index-unique)** o **[SQL_INDEX_ALL](#constant.sql-index-all)**.






     accuracy


       Uno de **[SQL_ENSURE](#constant.sql-ensure)** o **[SQL_QUICK](#constant.sql-quick)**.
       Este último solicita al controlador que recupere CARDINALITY
       y PAGES solo si están inmediatamente disponibles
       desde el servidor.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - NON_UNIQUE

    - INDEX_QUALIFIER

    - INDEX_NAME

    - TYPE

    - ORDINAL_POSITION

    - COLUMN_NAME

    - ASC_OR_DESC

    - CARDINALITY

    - PAGES

    - FILTER_CONDITION

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por NON_UNIQUE, TYPE, INDEX_QUALIFIER,
INDEX_NAME y ORDINAL_POSITION.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Lista las estadísticas de una tabla**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$statistics = odbc_statistics($conn, 'TutorialDB', 'dbo', 'TEST', SQL_INDEX_UNIQUE, SQL_QUICK);
while (($row = odbc_fetch_array($statistics))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; TutorialDB
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; TEST
[NON_UNIQUE] =&gt;
[INDEX_QUALIFIER] =&gt;
[INDEX_NAME] =&gt;
[TYPE] =&gt; 0
[ORDINAL_POSITION] =&gt;
[COLUMN_NAME] =&gt;
[ASC_OR_DESC] =&gt;
[CARDINALITY] =&gt; 15
[PAGES] =&gt; 3
[FILTER_CONDITION] =&gt;
)

### Ver también

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

# odbc_tableprivileges

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_tableprivileges — Lista las tablas y sus privilegios

### Descripción

**odbc_tableprivileges**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table
): Odbc\Result|[false](#language.types.singleton)

Lista las tablas y sus privilegios.

### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     table


       El nombre.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.





### Valores devueltos

Devuelve un objeto de resultado ODBC o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - GRANTOR

    - GRANTEE

    - PRIVILEGE

    - IS_GRANTABLE

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por TABLE_CAT, TABLE_SCHEM,
TABLE_NAME, PRIVILEGE y GRANTEE.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

### Ejemplos

**Ejemplo #1 Lista los Privilegios de una Tabla**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$privileges = odbc_tableprivileges($conn, 'SalesOrders', 'dbo', 'Orders');
while (($row = odbc_fetch_array($privileges))) {
    print_r($row);
break; // se omiten filas adicionales por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; SalesOrders
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; Orders
[GRANTOR] =&gt; dbo
[GRANTEE] =&gt; dbo
[PRIVILEGE] =&gt; DELETE
[IS_GRANTABLE] =&gt; YES
)

### Ver también

    - [odbc_tables()](#function.odbc-tables) - Lista las tablas de una fuente

# odbc_tables

(PHP 4, PHP 5, PHP 7, PHP 8)

odbc_tables — Lista las tablas de una fuente

### Descripción

**odbc_tables**(
    Odbc\Connection $odbc,
    [?](#language.types.null)[string](#language.types.string) $catalog = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $types = **[null](#constant.null)**
): Odbc\Result|[false](#language.types.singleton)

Lista las tablas de una fuente.

Para soportar las enumeraciones de calificadores
propietarios y tipos de tabla, la siguiente
semántica para los parámetros
catalog, schema,
table y
table_type está disponible:

    -

      Si catalog es un signo de porcentaje (%), y
      schema y table son
      strings vacíos, entonces el resultado contiene la lista de
      calificadores válidos para la fuente (todas las columnas excepto
      TABLE_QUALIFIER contienen NULL).



    -

      Si schema es un signo de porcentaje (%), y
      catalog y table
      son strings vacíos, entonces el resultado contiene la lista de
      propietarios de la fuente (todas las columnas excepto
      TABLE_OWNER contienen NULL).



    -

      Si table_type es un signo de porcentaje (%), y
      catalog, schema y
      table son strings vacíos, entonces el resultado
      contiene la lista de tipos de tablas de la fuente (todas las columnas excepto
      TABLE_TYPE contienen NULL).


### Parámetros

     odbc

      El objeto de conexión ODBC,

ver la documentación de la función [odbc_connect()](#function.odbc-connect) para más
detalles.

     catalog


       El catálogo ('calificativo' en el argot ODBC 2).






     schema


       El esquema ('propietario' en el argot ODBC 2).
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     table


       El nombre.
       Este parámetro acepta los siguientes patrones de búsqueda:
        % para buscar cero o más caracteres, y _ para buscar un solo carácter.






     types


       Si table_type no es un string vacío,
       debe contener una lista de valores, separados por comas,
       que representan los tipos buscados. Cada valor puede estar
       entre comillas simples ('), o sin comillas. Por
       ejemplo, 'TABLE','VIEW' o TABLE, VIEW. Si la fuente de datos
       no soporta un tipo de tabla dado, **odbc_tables()**
       no devolverá ningún resultado para ese tipo.





### Valores devueltos

Devuelve un objeto de resultado ODBC que contiene las informaciones
o **[false](#constant.false)** si ocurre un error.

El conjunto de resultados contiene las siguientes columnas:

    - TABLE_CAT

    - TABLE_SCHEM

    - TABLE_NAME

    - TABLE_TYPE

    - REMARKS

Los controladores pueden indicar columnas adicionales.

El conjunto de resultados está ordenado por TABLE_TYPE, TABLE_CAT,
TABLE_SCHEM y TABLE_NAME.

### Historial de cambios

      Versión
      Descripción







8.4.0

odbc ahora espera una instancia de
**Odbc\Connection**; anteriormente, se esperaba un [resource](#language.types.resource).

8.4.0

Esta función ahora devuelve una instancia de
**Odbc\Result**; anteriormente, se devolvía un [resource](#language.types.resource).

      8.0.0

       schema, table y types
       ahora son anulables.



### Ejemplos

**Ejemplo #1 Lista las Tablas en un Catálogo**

&lt;?php
$conn = odbc_connect($dsn, $user, $pass);
$tables = odbc_tables($conn, 'SalesOrders', 'dbo', '%', 'TABLE');
while (($row = odbc_fetch_array($tables))) {
    print_r($row);
break; // filas adicionales omitidas por brevedad
}
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[TABLE_CAT] =&gt; SalesOrders
[TABLE_SCHEM] =&gt; dbo
[TABLE_NAME] =&gt; Orders
[TABLE_TYPE] =&gt; TABLE
[REMARKS] =&gt;
)

### Ver también

    - [odbc_tableprivileges()](#function.odbc-tableprivileges) - Lista las tablas y sus privilegios

    - [odbc_columns()](#function.odbc-columns) - Lista las columnas de una tabla

    - [odbc_specialcolumns()](#function.odbc-specialcolumns) - Devuelve el conjunto óptimo de columnas

    - [odbc_statistics()](#function.odbc-statistics) - Cálculo de estadísticas sobre una tabla

    - [odbc_procedures()](#function.odbc-procedures) - Lista los procedimientos almacenados

## Tabla de contenidos

- [odbc_autocommit](#function.odbc-autocommit) — Activa el modo de autovalidación
- [odbc_binmode](#function.odbc-binmode) — Modifica la gestión de columnas de datos binarios
- [odbc_close](#function.odbc-close) — Cierra una conexión ODBC
- [odbc_close_all](#function.odbc-close-all) — Cierra todas las conexiones ODBC
- [odbc_columnprivileges](#function.odbc-columnprivileges) — Lista las columnas y sus derechos asociados
- [odbc_columns](#function.odbc-columns) — Lista las columnas de una tabla
- [odbc_commit](#function.odbc-commit) — Valida una transacción ODBC
- [odbc_connect](#function.odbc-connect) — Conexión a una fuente
- [odbc_connection_string_is_quoted](#function.odbc-connection-string-is-quoted) — Determina si un valor de string de conexión ODBC está entre comillas
- [odbc_connection_string_quote](#function.odbc-connection-string-quote) — Pone entre comillas un valor de string de conexión ODBC
- [odbc_connection_string_should_quote](#function.odbc-connection-string-should-quote) — Determina si un valor de string de conexión ODBC debe ser puesto entre comillas
- [odbc_cursor](#function.odbc-cursor) — Lee el nombre del puntero de resultado actual
- [odbc_data_source](#function.odbc-data-source) — Devuelve información sobre los DSNs disponibles
- [odbc_do](#function.odbc-do) — Alias de odbc_exec
- [odbc_error](#function.odbc-error) — Lee el último código de error
- [odbc_errormsg](#function.odbc-errormsg) — Lee el último mensaje de error
- [odbc_exec](#function.odbc-exec) — Ejecuta directamente una consulta SQL
- [odbc_execute](#function.odbc-execute) — Ejecuta una consulta SQL preparada
- [odbc_fetch_array](#function.odbc-fetch-array) — Lee una línea de resultado en un array asociativo
- [odbc_fetch_into](#function.odbc-fetch-into) — Lee una línea de resultado y la coloca en un array
- [odbc_fetch_object](#function.odbc-fetch-object) — Lee una línea de resultado en un objeto
- [odbc_fetch_row](#function.odbc-fetch-row) — Lee una línea de resultado
- [odbc_field_len](#function.odbc-field-len) — Lee la longitud de un campo
- [odbc_field_name](#function.odbc-field-name) — Lee el nombre de la columna
- [odbc_field_num](#function.odbc-field-num) — Número de columna
- [odbc_field_precision](#function.odbc-field-precision) — Alias de odbc_field_len
- [odbc_field_scale](#function.odbc-field-scale) — Lee la escala de un campo
- [odbc_field_type](#function.odbc-field-type) — Tipo de datos de un campo
- [odbc_foreignkeys](#function.odbc-foreignkeys) — Lista las claves foráneas
- [odbc_free_result](#function.odbc-free-result) — Libera los objetos asociados a un resultado
- [odbc_gettypeinfo](#function.odbc-gettypeinfo) — Lista los tipos de datos soportados por un origen
- [odbc_longreadlen](#function.odbc-longreadlen) — Gestión de columnas de tipo LONG
- [odbc_next_result](#function.odbc-next-result) — Verifica si hay múltiples resultados disponibles
- [odbc_num_fields](#function.odbc-num-fields) — Número de columnas en un resultado
- [odbc_num_rows](#function.odbc-num-rows) — Número de filas en un resultado
- [odbc_pconnect](#function.odbc-pconnect) — Abre una conexión persistente a un origen de datos
- [odbc_prepare](#function.odbc-prepare) — Prepara una orden para su ejecución
- [odbc_primarykeys](#function.odbc-primarykeys) — Lista las columnas utilizadas en una clave primaria
- [odbc_procedurecolumns](#function.odbc-procedurecolumns) — Lista los parámetros de los procedimientos
- [odbc_procedures](#function.odbc-procedures) — Lista los procedimientos almacenados
- [odbc_result](#function.odbc-result) — Lee un campo de resultado UODBC
- [odbc_result_all](#function.odbc-result-all) — Muestra el resultado en forma de tabla HTML
- [odbc_rollback](#function.odbc-rollback) — Anula una transacción
- [odbc_setoption](#function.odbc-setoption) — Modifica los parámetros ODBC
- [odbc_specialcolumns](#function.odbc-specialcolumns) — Devuelve el conjunto óptimo de columnas
- [odbc_statistics](#function.odbc-statistics) — Cálculo de estadísticas sobre una tabla
- [odbc_tableprivileges](#function.odbc-tableprivileges) — Lista las tablas y sus privilegios
- [odbc_tables](#function.odbc-tables) — Lista las tablas de una fuente

- [Introducción](#intro.uodbc)
- [Instalación/Configuración](#uodbc.setup)<li>[Requerimientos](#uodbc.requirements)
- [Instalación](#odbc.installation)
- [Configuración en tiempo de ejecución](#odbc.configuration)
- [Tipos de recursos](#uodbc.resources)
  </li>- [Constantes predefinidas](#uodbc.constants)
- [Funciones ODBC](#ref.uodbc)<li>[odbc_autocommit](#function.odbc-autocommit) — Activa el modo de autovalidación
- [odbc_binmode](#function.odbc-binmode) — Modifica la gestión de columnas de datos binarios
- [odbc_close](#function.odbc-close) — Cierra una conexión ODBC
- [odbc_close_all](#function.odbc-close-all) — Cierra todas las conexiones ODBC
- [odbc_columnprivileges](#function.odbc-columnprivileges) — Lista las columnas y sus derechos asociados
- [odbc_columns](#function.odbc-columns) — Lista las columnas de una tabla
- [odbc_commit](#function.odbc-commit) — Valida una transacción ODBC
- [odbc_connect](#function.odbc-connect) — Conexión a una fuente
- [odbc_connection_string_is_quoted](#function.odbc-connection-string-is-quoted) — Determina si un valor de string de conexión ODBC está entre comillas
- [odbc_connection_string_quote](#function.odbc-connection-string-quote) — Pone entre comillas un valor de string de conexión ODBC
- [odbc_connection_string_should_quote](#function.odbc-connection-string-should-quote) — Determina si un valor de string de conexión ODBC debe ser puesto entre comillas
- [odbc_cursor](#function.odbc-cursor) — Lee el nombre del puntero de resultado actual
- [odbc_data_source](#function.odbc-data-source) — Devuelve información sobre los DSNs disponibles
- [odbc_do](#function.odbc-do) — Alias de odbc_exec
- [odbc_error](#function.odbc-error) — Lee el último código de error
- [odbc_errormsg](#function.odbc-errormsg) — Lee el último mensaje de error
- [odbc_exec](#function.odbc-exec) — Ejecuta directamente una consulta SQL
- [odbc_execute](#function.odbc-execute) — Ejecuta una consulta SQL preparada
- [odbc_fetch_array](#function.odbc-fetch-array) — Lee una línea de resultado en un array asociativo
- [odbc_fetch_into](#function.odbc-fetch-into) — Lee una línea de resultado y la coloca en un array
- [odbc_fetch_object](#function.odbc-fetch-object) — Lee una línea de resultado en un objeto
- [odbc_fetch_row](#function.odbc-fetch-row) — Lee una línea de resultado
- [odbc_field_len](#function.odbc-field-len) — Lee la longitud de un campo
- [odbc_field_name](#function.odbc-field-name) — Lee el nombre de la columna
- [odbc_field_num](#function.odbc-field-num) — Número de columna
- [odbc_field_precision](#function.odbc-field-precision) — Alias de odbc_field_len
- [odbc_field_scale](#function.odbc-field-scale) — Lee la escala de un campo
- [odbc_field_type](#function.odbc-field-type) — Tipo de datos de un campo
- [odbc_foreignkeys](#function.odbc-foreignkeys) — Lista las claves foráneas
- [odbc_free_result](#function.odbc-free-result) — Libera los objetos asociados a un resultado
- [odbc_gettypeinfo](#function.odbc-gettypeinfo) — Lista los tipos de datos soportados por un origen
- [odbc_longreadlen](#function.odbc-longreadlen) — Gestión de columnas de tipo LONG
- [odbc_next_result](#function.odbc-next-result) — Verifica si hay múltiples resultados disponibles
- [odbc_num_fields](#function.odbc-num-fields) — Número de columnas en un resultado
- [odbc_num_rows](#function.odbc-num-rows) — Número de filas en un resultado
- [odbc_pconnect](#function.odbc-pconnect) — Abre una conexión persistente a un origen de datos
- [odbc_prepare](#function.odbc-prepare) — Prepara una orden para su ejecución
- [odbc_primarykeys](#function.odbc-primarykeys) — Lista las columnas utilizadas en una clave primaria
- [odbc_procedurecolumns](#function.odbc-procedurecolumns) — Lista los parámetros de los procedimientos
- [odbc_procedures](#function.odbc-procedures) — Lista los procedimientos almacenados
- [odbc_result](#function.odbc-result) — Lee un campo de resultado UODBC
- [odbc_result_all](#function.odbc-result-all) — Muestra el resultado en forma de tabla HTML
- [odbc_rollback](#function.odbc-rollback) — Anula una transacción
- [odbc_setoption](#function.odbc-setoption) — Modifica los parámetros ODBC
- [odbc_specialcolumns](#function.odbc-specialcolumns) — Devuelve el conjunto óptimo de columnas
- [odbc_statistics](#function.odbc-statistics) — Cálculo de estadísticas sobre una tabla
- [odbc_tableprivileges](#function.odbc-tableprivileges) — Lista las tablas y sus privilegios
- [odbc_tables](#function.odbc-tables) — Lista las tablas de una fuente
  </li>
