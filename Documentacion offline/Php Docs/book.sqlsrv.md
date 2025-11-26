# Controlador Microsoft SQL Server para PHP

# Introducción

La extensión SQLSRV permite acceder a un servidor de base de datos
Microsoft SQL y SQL Azure. La versión 3.0 del controlador soporta SQL Server,
comenzando por SQL Server 2005, e incluyendo SQL Server 2012 y SQL
Server 2012 LocalDB (para más información acerca de LocalDB, ver
[» el controlador PHP para el soporte de SQL Server para LocalDB](http://msdn.microsoft.com/en-us/library/hh487161.aspx)
y [» SQL Server 2012 Express LocalDB](<http://msdn.microsoft.com/en-us/library/hh510202(SQL.110).aspx>).)

La extensión SQLSRV es soportada por Microsoft y está disponible para
descargar aquí : [» http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx](http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx).
SQL Server 2012 LocalDB puede ser descargado aquí :
[» http://go.microsoft.com/fwlink/?LinkID=237665](http://go.microsoft.com/fwlink/?LinkID=237665).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#sqlsrv.requirements)
- [Instalación](#sqlsrv.installation)
- [Configuración en tiempo de ejecución](#sqlsrv.configuration)
- [Tipos de recursos](#sqlsrv.resources)

    ## Requerimientos

    La extensión SQLSRV puede ser utilizada en los siguientes sistemas operativos:
    - Windows Vista Service Pack 2 o superior

    - Windows Server 2008 Service Pack 2 o superior

    - Windows Server 2008 R2

    - Windows 7

    La extensión SQLSRV requiere que el cliente nativo Microsoft SQL Server 2012
    esté instalado en la misma máquina que la que ejecuta PHP. Si el cliente nativo
    Microsoft SQL Server 2012 no está instalado, haga clic en el enlace apropiado
    a continuación para descargarlo:
    - [» Descarga del paquete x86](http://go.microsoft.com/fwlink/?LinkID=239647)

    - [» Descarga del paquete x64](http://go.microsoft.com/fwlink/?LinkID=239648)

    La descarga SQLSRV viene con 8 controladores, de los cuales 4 están dedicados al soporte de PDO.

    La versión más reciente del controlador está disponible para descargar aquí:
    [» descarga de SQLSRV](http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx).

    Para más información sobre los requisitos previos de SQLSRV, consulte el
    capítulo sobre los
    [» requisitos del sistema SQLSRV](http://msdn.microsoft.com/en-us/library/cc296170.aspx).

## Instalación

La extensión SQLSRV se activa añadiendo la biblioteca DLL correspondiente
en el directorio de extensiones de PHP y añadiendo la entrada correspondiente
en el archivo php.ini. La descarga de SQLSRV incluye
8 controladores, de los cuales 4 están dedicados al soporte de PDO.

La versión más reciente del controlador está disponible para su descarga aquí :
[» descarga de SQLSRV](http://msdn.microsoft.com/en-us/sqlserver/ff657782.aspx).

Para obtener más información sobre los requisitos previos de SQLSRV, consúltese el
capítulo sobre los
[» requisitos del sistema SQLSRV](http://msdn.microsoft.com/en-us/library/cc296170.aspx).

A partir de la versión 4.0, la extensión SQLSRV solo es compatible cuando PHP 7.0 funciona en Linux o Windows.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

La tabla siguiente lista las opciones de configuración disponibles
para la extensión. Para más información sobre estas opciones,
consúltese el capítulo sobre la
[» gestión de errores
y alertas SQLSRV](http://msdn.microsoft.com/en-us/library/cc626302.aspx).

   <caption>**Opciones de configuración SQLSRV**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      sqlsrv.WarningsReturnAsErrors
      1 (**[true](#constant.true)**)
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de SQLSRV 1.0



      sqlsrv.LogSubsystems
      0
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de SQLSRV 1.0



      sqlsrv.LogSeverity
      1
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de SQLSRV 1.0


## Tipos de recursos

## Recurso de conexión

    Un recurso de conexión devuelto por la función
    [sqlsrv_connect()](#function.sqlsrv-connect).

## Recurso de consulta

    Un recurso de consulta devuelto por la función
    [sqlsrv_query()](#function.sqlsrv-query) o la función
    [sqlsrv_prepare()](#function.sqlsrv-prepare).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SQLSRV_FETCH_ASSOC](#constant.sqlsrv-fetch-assoc)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) a devolver un array
      asociativo cuando se le pasa como argumento.





     **[SQLSRV_FETCH_NUMERIC](#constant.sqlsrv-fetch-numeric)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) a devolver un array
      indexado numéricamente cuando se le pasa como argumento.





     **[SQLSRV_FETCH_BOTH](#constant.sqlsrv-fetch-both)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) a devolver un array
      asociativo y un array indexado numéricamente cuando se le pasa como
      argumento (comportamiento por defecto).





     **[SQLSRV_ERR_ALL](#constant.sqlsrv-err-all)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_errors()](#function.sqlsrv-errors) a devolver los errores
      y advertencias cuando se le pasa como argumento (comportamiento por
      defecto).





     **[SQLSRV_ERR_ERRORS](#constant.sqlsrv-err-errors)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_errors()](#function.sqlsrv-errors) a devolver solo
      los errores (no las advertencias) cuando se le pasa como argumento.





     **[SQLSRV_ERR_WARNINGS](#constant.sqlsrv-err-warnings)**
     ([int](#language.types.integer))



      Obliga a [sqlsrv_errors()](#function.sqlsrv-errors) a devolver solo
      las advertencias (no los errores) cuando se le pasa como argumento.





     **[SQLSRV_LOG_SYSTEM_ALL](#constant.sqlsrv-log-system-all)**
     ([int](#language.types.integer))



      Activa los logs de todos los subsistemas cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SYSTEM_CONN](#constant.sqlsrv-log-system-conn)**
     ([int](#language.types.integer))



      Activa los logs de toda la actividad de las conexiones cuando se le pasa
      a la función [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SYSTEM_INIT](#constant.sqlsrv-log-system-init)**
     ([int](#language.types.integer))



      Activa los logs de toda la actividad de las inicializaciones cuando se le
      pasa a la función [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SYSTEM_OFF](#constant.sqlsrv-log-system-off)**
     ([int](#language.types.integer))



      Desactiva los logs de todos los subsistemas cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SYSTEM_STMT](#constant.sqlsrv-log-system-stmt)**
     ([int](#language.types.integer))



      Activa los logs de las consultas cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SYSTEM_UTIL](#constant.sqlsrv-log-system-util)**
     ([int](#language.types.integer))



      Activa los logs de los errores de función cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SEVERITY_ALL](#constant.sqlsrv-log-severity-all)**
     ([int](#language.types.integer))



      Activa los logs de los errores, advertencias y notas cuando se le
      pasa a la función [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SEVERITY_ERROR](#constant.sqlsrv-log-severity-error)**
     ([int](#language.types.integer))



      Especifica que los errores serán registrados cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SEVERITY_NOTICE](#constant.sqlsrv-log-severity-notice)**
     ([int](#language.types.integer))



      Especifica que las notas serán registradas cuando se le pasa a la función
      [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_LOG_SEVERITY_WARNING](#constant.sqlsrv-log-severity-warning)**
     ([int](#language.types.integer))



      Especifica que las advertencias serán registradas cuando se le pasa a
      la función [sqlsrv_configure()](#function.sqlsrv-configure) como argumento.





     **[SQLSRV_NULLABLE_YES](#constant.sqlsrv-nullable-yes)**
     ([int](#language.types.integer))



      Indica que una columna puede ser nula.





     **[SQLSRV_NULLABLE_NO](#constant.sqlsrv-nullable-no)**
     ([int](#language.types.integer))



      Indica que una columna no puede ser nula.





     **[SQLSRV_NULLABLE_UNKNOWN](#constant.sqlsrv-nullable-unknown)**
     ([int](#language.types.integer))



      Indica si se conoce que una columna es nula.





     **[SQLSRV_PARAM_IN](#constant.sqlsrv-param-in)**
     ([int](#language.types.integer))



      Indica un parámetro de entrada cuando se le pasa a la función
      [sqlsrv_query()](#function.sqlsrv-query) o a la función
      [sqlsrv_prepare()](#function.sqlsrv-prepare).





     **[SQLSRV_PARAM_INOUT](#constant.sqlsrv-param-inout)**
     ([int](#language.types.integer))



      Indica un parámetro de entrada o salida cuando se le pasa a la
      función [sqlsrv_query()](#function.sqlsrv-query) o a la función
      [sqlsrv_prepare()](#function.sqlsrv-prepare).





     **[SQLSRV_PARAM_OUT](#constant.sqlsrv-param-out)**
     ([int](#language.types.integer))



      Indica un parámetro de salida cuando se le pasa a la función
      [sqlsrv_query()](#function.sqlsrv-query) o a la función
      [sqlsrv_prepare()](#function.sqlsrv-prepare).





     **[SQLSRV_PHPTYPE_INT](#constant.sqlsrv-phptype-int)**
     ([int](#language.types.integer))



      Especifica un dato de tipo entero PHP. Para más información, ver
      [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_PHPTYPE_DATETIME](#constant.sqlsrv-phptype-datetime)**
     ([int](#language.types.integer))



      Especifica un dato de tipo datetime (fecha y hora) PHP. Para más información, ver
      [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_PHPTYPE_FLOAT](#constant.sqlsrv-phptype-float)**
     ([int](#language.types.integer))



      Especifica un dato de tipo número de punto flotante PHP. Para más información, ver
      [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_PHPTYPE_STREAM](#constant.sqlsrv-phptype-stream)**
     ([int](#language.types.integer))



      Especifica un dato de tipo flujo de PHP. Esta constante funciona como una función
      y acepta una constante codificada. Ver las constantes SQLSRV_ENC_*. Para más información,
      reportez-vous a [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_PHPTYPE_STRING](#constant.sqlsrv-phptype-string)**
     ([int](#language.types.integer))



      Especifica un dato de tipo string PHP. Esta constante funciona como una función
      y acepta una constante codificada. Ver las constantes SQLSRV_ENC_*. Para más información,
      reportez-vous a [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_ENC_BINARY](#constant.sqlsrv-enc-binary)**
     ([int](#language.types.integer))



      Especifica que el dato es devuelto en forma de flujo bruto de bytes
      desde el servidor sin realizar un codificación o transformación. Para más
      información, reportez-vous a [» Cómo especificar
      los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_ENC_CHAR](#constant.sqlsrv-enc-char)**
     ([int](#language.types.integer))



      El dato es devuelto en forma de caracteres de 8 bits, tal como
      se especifica en la página de códigos Windows local, definida en el sistema. Cualquier
      carácter multibyte o caracteres que no correspondan a esta página de código serán sustituidos
      con un signo de interrogación de un byte (?). Es la codificación por defecto. Para más
      información, reportez-vous a [» Cómo especificar los tipos PHP](http://msdn.microsoft.com/en-us/library/cc296208.aspx).





     **[SQLSRV_SQLTYPE_BIGINT](#constant.sqlsrv-sqltype-bigint)**
     ([int](#language.types.integer))



      Describe el tipo de datos bigint de SQL Server. Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_BINARY](#constant.sqlsrv-sqltype-binary)**
     ([int](#language.types.integer))



      Describe el tipo de datos binario de SQL Server. Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_BIT](#constant.sqlsrv-sqltype-bit)**
     ([int](#language.types.integer))



      Describe el tipo de datos bit de SQL Server. Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_CHAR](#constant.sqlsrv-sqltype-char)**
     ([int](#language.types.integer))



      Describe el tipo de datos carácter de SQL Server. Esta constante funciona como
      una función y acepta un argumento indicando el número de caracteres. Para más
      información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_DATE](#constant.sqlsrv-sqltype-date)**
     ([int](#language.types.integer))



      Describe el tipo de datos date de SQL Server. Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_DATETIME](#constant.sqlsrv-sqltype-datetime)**
     ([int](#language.types.integer))



      Describe el tipo de datos datetime de SQL Server. Para más información,
      reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_DATETIME2](#constant.sqlsrv-sqltype-datetime2)**
     ([int](#language.types.integer))



      Describe el tipo de datos datetime2 de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_DATETIMEOFFSET](#constant.sqlsrv-sqltype-datetimeoffset)**
     ([int](#language.types.integer))



      Describe el tipo de datos datetimeoffset de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_DECIMAL](#constant.sqlsrv-sqltype-decimal)**
     ([int](#language.types.integer))



      Describe el tipo de datos decimal. Esta constante funciona como una función
      y acepta 2 argumentos indicando (en orden) la precisión y la escala.
      Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_FLOAT](#constant.sqlsrv-sqltype-float)**
     ([int](#language.types.integer))



      Describe el tipo de datos número de punto flotante de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_IMAGE](#constant.sqlsrv-sqltype-image)**
     ([int](#language.types.integer))



      Describe el tipo de datos image de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_INT](#constant.sqlsrv-sqltype-int)**
     ([int](#language.types.integer))



      Describe el tipo de datos entero de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_MONEY](#constant.sqlsrv-sqltype-money)**
     ([int](#language.types.integer))



      Describe el tipo de datos moneda de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_NCHAR](#constant.sqlsrv-sqltype-nchar)**
     ([int](#language.types.integer))



      Describe el tipo de datos nchar de SQL Server. Esta constante funciona como una
      función y acepta un solo argumento indicando el número de caracteres.
      Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_NUMERIC](#constant.sqlsrv-sqltype-numeric)**
     ([int](#language.types.integer))



      Describe el tipo de datos numérico de SQL Server. Esta constante funciona como
      una función y acepta 2 argumentos (en orden), la precisión y la escala.
      Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_NVARCHAR](#constant.sqlsrv-sqltype-nvarchar)**
     ([int](#language.types.integer))



      Describe el tipo de datos nvarchar de SQL Server. Esta constante funciona como una
      función y acepta un solo argumento indicando el número de caracteres.
      Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_NVARCHAR('max')](#constant.sqlsrv-sqltype-nvarchar('max'))**
     ([int](#language.types.integer))



      Describe el tipo de datos nvarchar(MAX) de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_NTEXT](#constant.sqlsrv-sqltype-ntext)**
     ([int](#language.types.integer))



      Describe el tipo de datos ntext de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_REAL](#constant.sqlsrv-sqltype-real)**
     ([int](#language.types.integer))



      Describe el tipo de datos real de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_SMALLDATETIME](#constant.sqlsrv-sqltype-smalldatetime)**
     ([int](#language.types.integer))



      Describe el tipo de datos smalldatetime de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_SMALLINT](#constant.sqlsrv-sqltype-smallint)**
     ([int](#language.types.integer))



      Describe el tipo de datos smallint de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_SMALLMONEY](#constant.sqlsrv-sqltype-smallmoney)**
     ([int](#language.types.integer))



      Describe el tipo de datos smallmoney de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_TEXT](#constant.sqlsrv-sqltype-text)**
     ([int](#language.types.integer))



      Describe el tipo de datos texto de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_TIME](#constant.sqlsrv-sqltype-time)**
     ([int](#language.types.integer))



      Describe el tipo de datos time de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_TIMESTAMP](#constant.sqlsrv-sqltype-timestamp)**
     ([int](#language.types.integer))



      Describe el tipo de datos timestamp de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_TINYINT](#constant.sqlsrv-sqltype-tinyint)**
     ([int](#language.types.integer))



      Describe el tipo de datos tinyint de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_UNIQUEIDENTIFIER](#constant.sqlsrv-sqltype-uniqueidentifier)**
     ([int](#language.types.integer))



      Describe el tipo de datos uniqueidentifier de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_UDT](#constant.sqlsrv-sqltype-udt)**
     ([int](#language.types.integer))



      Describe el tipo de datos UDT de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_VARBINARY](#constant.sqlsrv-sqltype-varbinary)**
     ([int](#language.types.integer))



      Describe el tipo de datos varbinary de SQL Server. Esta constante funciona
      como una función y acepta un solo argumento indicando el número de bytes.
      Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_VARBINARY('max')](#constant.sqlsrv-sqltype-varbinary('max'))**
     ([int](#language.types.integer))



      Describe el tipo de datos varbinary(MAX) de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_VARCHAR](#constant.sqlsrv-sqltype-varchar)**
     ([int](#language.types.integer))



      Describe el tipo de datos varchar de SQL Server. Esta constante funciona como
      una función y acepta un solo argumento indicando el número de caracteres.
      Para más información, reportez-vous a
      [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_VARCHAR('max')](#constant.sqlsrv-sqltype-varchar('max'))**
     ([int](#language.types.integer))



      Describe el tipo de datos varchar(MAX) de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_SQLTYPE_XML](#constant.sqlsrv-sqltype-xml)**
     ([int](#language.types.integer))



      Describe el tipo de datos XML de SQL Server. Para más información, reportez-vous
      a [» Cómo especificar los tipos SQL](http://msdn.microsoft.com/en-us/library/cc626305.aspx).





     **[SQLSRV_TXN_READ_UNCOMMITTED](#constant.sqlsrv-txn-read-uncommitted)**
     ([int](#language.types.integer))



      Indica un nivel de aislamiento de la transacción a READ UNCOMMITTED.
      Este valor se utiliza para definir el nivel de aislamiento de la
      transacción en el array $connectionOptions pasado a la función
      [sqlsrv_connect()](#function.sqlsrv-connect).





     **[SQLSRV_TXN_READ_COMMITTED](#constant.sqlsrv-txn-read-committed)**
     ([int](#language.types.integer))



      Indica un nivel de aislamiento de la transacción a READ COMMITTED.
      Este valor se utiliza para definir el nivel de aislamiento de la
      transacción en el array $connectionOptions pasado a la función
      [sqlsrv_connect()](#function.sqlsrv-connect).





     **[SQLSRV_TXN_REPEATABLE_READ](#constant.sqlsrv-txn-repeatable-read)**
     ([int](#language.types.integer))



      Indica un nivel de aislamiento de la transacción a REPEATABLE READ.
      Este valor se utiliza para definir el nivel de aislamiento de la
      transacción en el array $connectionOptions pasado a la función
      [sqlsrv_connect()](#function.sqlsrv-connect).





     **[SQLSRV_TXN_SNAPSHOT](#constant.sqlsrv-txn-snapshot)**
     ([int](#language.types.integer))



      Indica un nivel de aislamiento de la transacción a SNAPSHOT.
      Este valor se utiliza para definir el nivel de aislamiento de la
      transacción en el array $connectionOptions pasado a la función
      [sqlsrv_connect()](#function.sqlsrv-connect).





     **[SQLSRV_TXN_READ_SERIALIZABLE](#constant.sqlsrv-txn-read-serializable)**
     ([int](#language.types.integer))



      Indica un nivel de aislamiento de la transacción a SERIALIZABLE.
      Este valor se utiliza para definir el nivel de aislamiento de la
      transacción en el array $connectionOptions pasado a la función
      [sqlsrv_connect()](#function.sqlsrv-connect).





     **[SQLSRV_CURSOR_FORWARD](#constant.sqlsrv-cursor-forward)**
     ([int](#language.types.integer))



      Indica un cursor de tipo "solo hacia adelante". Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_CURSOR_STATIC](#constant.sqlsrv-cursor-static)**
     ([int](#language.types.integer))



      Indica un cursor de tipo "estático". Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_CURSOR_DYNAMIC](#constant.sqlsrv-cursor-dynamic)**
     ([int](#language.types.integer))



      Indica un cursor de tipo "dinámico". Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_CURSOR_KEYSET](#constant.sqlsrv-cursor-keyset)**
     ([int](#language.types.integer))



      Indica un cursor de tipo "keyset". Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_CURSOR_BUFFERED](#constant.sqlsrv-cursor-buffered)**
     ([int](#language.types.integer))



      Crea una consulta de cursor del lado del cliente. Esto permite acceder a
      las filas en cualquier orden. Para más información sobre su uso,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_NEXT](#constant.sqlsrv-scroll-next)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_PRIOR](#constant.sqlsrv-scroll-prior)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre
      [» la especificación de un tipo
       de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_FIRST](#constant.sqlsrv-scroll-first)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre [» la
      especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_LAST](#constant.sqlsrv-scroll-last)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre [» la
      especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_ABSOLUTE](#constant.sqlsrv-scroll-absolute)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre [» la
      especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).





     **[SQLSRV_SCROLL_RELATIVE](#constant.sqlsrv-scroll-relative)**
     ([int](#language.types.integer))



      Especifica la fila a seleccionar en un conjunto de resultados. Para más información,
      reportez-vous a la sección sobre [» la
      especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx).


# SQLSRV Funciones

# sqlsrv_begin_transaction

(No version information available, might only be in Git)

sqlsrv_begin_transaction — Inicia una transacción de base de datos

### Descripción

**sqlsrv_begin_transaction**([resource](#language.types.resource) $conn): [bool](#language.types.boolean)

La transacción iniciada por **sqlsrv_begin_transaction()** incluye
todas las sentencias que fueron ejecutadas después de la llamada a
**sqlsrv_begin_transaction()** y antes de llamar a
[sqlsrv_rollback()](#function.sqlsrv-rollback) o [sqlsrv_commit()](#function.sqlsrv-commit).
Las transacciones explícitas deben empezar y ser consolidadas (commit) o revertidas utilizando
estas funciones en vez de ejecutar sentencias SQL que empiecen y consoliden/reviertan
transacciones. Para más información, ver
[» SQLSRV Transactions](http://msdn.microsoft.com/en-us/library/cc296206.aspx).

### Parámetros

     conn


       El recurso de la conexión devuelta por una llamada a [sqlsrv_connect()](#function.sqlsrv-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de sqlsrv_begin_transaction()**



    El siguiente ejemplo demuestra cómo utilizar
    **sqlsrv_begin_transaction()** junto con
    [sqlsrv_commit()](#function.sqlsrv-commit) y [sqlsrv_rollback()](#function.sqlsrv-rollback).

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Iniciar la transacción. _/
if ( sqlsrv_begin_transaction( $conn ) === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Inicializar los parámetros. _/
$orderId = 1; $qty = 10; $productId = 100;

/_ Preprar y ejecutar la primera sentencia . _/
$sql1 = "INSERT INTO OrdersTable (ID, Quantity, ProductID)
          VALUES (?, ?, ?)";
$params1 = array( $orderId, $qty, $productId );
$stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

/_ Preparar y ejecutar la segunda sentencia. _/
$sql2 = "UPDATE InventoryTable
          SET Quantity = (Quantity - ?)
          WHERE ProductID = ?";
$params2 = array($qty, $productId);
$stmt2 = sqlsrv_query( $conn, $sql2, $params2 );

/_ Si ambas sentencias finalizaran con éxito, consolidar la transacción. _/
/_ En caso contrario, revertirla. _/
if( $stmt1 &amp;&amp; $stmt2 ) {
sqlsrv_commit( $conn );
echo "Transaccion consolidada.&lt;br /&gt;";
} else {
sqlsrv_rollback( $conn );
echo "Transaccion revertida.&lt;br /&gt;";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

### Ver también

    - [sqlsrv_commit()](#function.sqlsrv-commit) - Consolida una transacción que se inició con sqlsrv_begin_transaction

    - [sqlsrv_rollback()](#function.sqlsrv-rollback) - Anula una transacción que ha sido iniciada gracias a la función

sqlsrv_begin_transaction

# sqlsrv_cancel

(No version information available, might only be in Git)

sqlsrv_cancel — Cancela una sentencia de base de datos

### Descripción

**sqlsrv_cancel**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Cancela una sentencia de base de datos. Cualquier resultado asociado con la sentencia que no haya sido
utilizado será eliminado. Después de llamar a **sqlsrv_cancel()**
, la sentencia especificada puede ser reejecutada si fue creada con
[sqlsrv_prepare()](#function.sqlsrv-prepare). No es necesario llamar a
**sqlsrv_cancel()** si todos los resultados asociados se han
utilizado.

### Parámetros

     stmt


       El recurso de la sentencia que se va a cancelar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de sqlsrv_cancel()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT Sales FROM Table_1";

$stmt = sqlsrv_prepare( $conn, $sql);

if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

if( sqlsrv_execute( $stmt ) === false) {
die( print_r( sqlsrv_errors(), true));
}

$salesTotal = 0;
$count = 0;

while( ($row = sqlsrv_fetch_array( $stmt)) &amp;&amp; $salesTotal &lt;=100000)
{
$qty = $row[0];
$price = $row[1];
$salesTotal += ( $price \* $qty);
$count++;
}

echo "$count sales accounted for the first $$salesTotal in revenue.&lt;br /&gt;";

// Cancela los resultados pendientes. La sentencia se puede reutilizar.
sqlsrv_cancel( $stmt);
?&gt;

### Notas

La principal diferencia entre **sqlsrv_cancel()** y
[sqlsrv_free_stmt()](#function.sqlsrv-free-stmt) es que una sentencia cancelada con
**sqlsrv_cancel()** puede ser reejecutada si fue creada con
[sqlsrv_prepare()](#function.sqlsrv-prepare). Una sentencia cancelada con
**sqlsrv_free_statement()** no puede ser reejecutada.

### Ver también

    - [sqlsrv_free_stmt()](#function.sqlsrv-free-stmt) - Libera todos los recursos de la consulta especificada

    - [sqlsrv_prepare()](#function.sqlsrv-prepare) - Prepara una consulta para su ejecución

# sqlsrv_client_info

(No version information available, might only be in Git)

sqlsrv_client_info — Devuelve información sobre el cliente y la conexión especificada

### Descripción

**sqlsrv_client_info**([resource](#language.types.resource) $conn): [array](#language.types.array)

Devuelve información sobre el cliente y la conexión especificada

### Parámetros

     conn


       La conexión sobre la que se va a retornar información.





### Valores devueltos

Devuelve un array asociativo con las claves que se describen en la tabla siguiente.
Devuelve **[false](#constant.false)** en caso constrario.

   <caption>**Array devuelto por sqlsrv_client_info**</caption>
   
    
     
      Clave
      Descripción


      DriverDllName
      SQLNCLI10.DLL



      DriverODBCVer
      Versión ODBC (xx.yy)



      DriverVer
      Versión de la DLL del cliente nativo SQL Server (10.5.xxx)



      ExtensionVer
      Versión de la biblioteca php_sqlsrv.dll (2.0.xxx.x)


### Ejemplos

    **Ejemplo #1 Ejemplo de sqlsrv_client_info()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connOptions = array("UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connOptions );

if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

if( $client_info = sqlsrv_client_info( $conn)) {
    foreach( $client_info as $key =&gt; $value) {
        echo $key.": ".$value."&lt;br /&gt;";
}
} else {
echo "Error al recuperar la información del cliente.&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_server_info()](#function.sqlsrv-server-info) - Devuelve información sobre el servidor

# sqlsrv_close

(No version information available, might only be in Git)

sqlsrv_close — Cierra una conexión abierta y libera los recursos asociados a la conexión

### Descripción

**sqlsrv_close**([resource](#language.types.resource) $conn): [bool](#language.types.boolean)

Cierra una conexión abierta y libera los recursos asociados a la conexión.

### Parámetros

     conn


       La conexión que se va a cerrar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de sqlsrv_close()**

&lt;?php
$serverName = "serverName\sqlexpres";
$connOptions = array("UID"=&gt;"username", "PWD"=&gt;"password", "Database"=&gt;"dbname");
$conn = sqlsrv_connect( $serverName, $connOptions );
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

//-------------------------------------
// Realizar aquí las operaciones contra la base de datos.
//-------------------------------------

// Cerrar la conexión.
sqlsrv_close( $conn );
?&gt;

### Ver también

    - [sqlsrv_connect()](#function.sqlsrv-connect) - Establece una conexión con una base de datos Microsoft SQL Server

# sqlsrv_commit

(No version information available, might only be in Git)

sqlsrv_commit — Consolida una transacción que se inició con [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction)

### Descripción

**sqlsrv_commit**([resource](#language.types.resource) $conn): [bool](#language.types.boolean)

Consolida una transacción que se inició con [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction).
La conexión retorna al modo auto-commit después de que se llame a **sqlsrv_commit()**.
La transacción que se consolida incluye todas las sentencias que fueron
ejecutadas después de la llamada a [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction).
Las transacciones explícitas deben iniciarse y consolidarse o revertirse utilizando estas
funciones en vez de ejecutar las sentencias SQL que empiezan y consolidan/revierten
transacciones. Para más información, ver
[» SQLSRV Transactions](http://msdn.microsoft.com/en-us/library/cc296206.aspx).

### Parámetros

     conn


       La conexión en la que se va a consolidar la transacción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de sqlsrv_commit()**



    El siguiente ejemplo demuestra cómo utilizar **sqlsrv_commit()**
    junto con [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction) y
    [sqlsrv_rollback()](#function.sqlsrv-rollback).

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Empezar la transacción. _/
if ( sqlsrv_begin_transaction( $conn ) === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Inicializar los parámetros. _/
$orderId = 1; $qty = 10; $productId = 100;

/_ Preparar y ejecutar la primera sentencia. _/
$sql1 = "INSERT INTO OrdersTable (ID, Quantity, ProductID)
         VALUES (?, ?, ?)";
$params1 = array( $orderId, $qty, $productId );
$stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

/_ Preparar y ejecutar la segunda sentencia. _/
$sql2 = "UPDATE InventoryTable
         SET Quantity = (Quantity - ?)
         WHERE ProductID = ?";
$params2 = array($qty, $productId);
$stmt2 = sqlsrv_query( $conn, $sql2, $params2 );

/_ Si ambas sentencias finalizan con éxito, consolidar la transacción. _/
/_ En caso contrario, revertir la transacción. _/
if( $stmt1 &amp;&amp; $stmt2 ) {
sqlsrv_commit( $conn );
echo "Transacción consolidada.&lt;br /&gt;";
} else {
sqlsrv_rollback( $conn );
echo "Transacción revertida.&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction) - Inicia una transacción de base de datos

    - [sqlsrv_rollback()](#function.sqlsrv-rollback) - Anula una transacción que ha sido iniciada gracias a la función

sqlsrv_begin_transaction

# sqlsrv_configure

(No version information available, might only be in Git)

sqlsrv_configure — Cambia la configuración de los drivers del gestionador de errores y de log

### Descripción

**sqlsrv_configure**([string](#language.types.string) $setting, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Cambia la configuración de los drivers del gestionador de errores y de log.

### Parámetros

     setting


       El nombre de la propiedad a configurar. Los valores posibles son
       "WarningsReturnAsErrors", "LogSubsystems", and "LogSeverity".






     value


       El valor de la propiedad especificada. La tabla siguiente muestra los valores posibles:


   <caption>**Opciones de configuración de la gestión de errores y log**</caption>
   
    
     
      Propiedades
      Opciones


      WarningsReturnAsErrors
      1 (**[true](#constant.true)**) or 0 (**[false](#constant.false)**)



      LogSubsystems
      SQLSRV_LOG_SYSTEM_ALL (-1)
      SQLSRV_LOG_SYSTEM_CONN (2)
      SQLSRV_LOG_SYSTEM_INIT (1)
      SQLSRV_LOG_SYSTEM_OFF (0)
      SQLSRV_LOG_SYSTEM_STMT (4)
      SQLSRV_LOG_SYSTEM_UTIL (8)



      LogSeverity
      SQLSRV_LOG_SEVERITY_ALL (-1)
      SQLSRV_LOG_SEVERITY_ERROR (1)
      SQLSRV_LOG_SEVERITY_NOTICE (4)
      SQLSRV_LOG_SEVERITY_WARNING (2)









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [» Gestionador de errores SQLSRV](http://msdn.microsoft.com/en-us/library/cc626302.aspx).

    - [» Actividad de log de SQLSRV](http://msdn.microsoft.com/en-us/library/cc296188.aspx).

# sqlsrv_connect

(No version information available, might only be in Git)

sqlsrv_connect — Establece una conexión con una base de datos Microsoft SQL Server

### Descripción

**sqlsrv_connect**([string](#language.types.string) $serverName, [array](#language.types.array) $connectionInfo = ?): [resource](#language.types.resource)

Establece una conexión con una base de datos Microsoft SQL Server. Por omisión,
la conexión intenta utilizar la autenticación Windows. Para conectarse
utilizando la autenticación SQL Server, se deben añadir los argumentos "UID" y "PWD" en el array de opciones de conexión.

### Parámetros

     serverName


       El nombre del servidor con el que se desea establecer la conexión.
       Para conectarse a una instancia particular, se debe especificar el nombre
       del servidor, seguido de un antislash, y luego el nombre de la instancia
       (i.e. serverName\sqlexpress).






     connectionInfo


       Un array asociativo que especifica las opciones para la conexión al servidor.
       Si los valores de las claves UID y PWD no están especificados, la conexión
       intentará utilizar la autenticación Windows. Para una lista completa
       de las claves soportadas, consulte las
       [» opciones de conexión SQLSRV](http://msdn.microsoft.com/en-us/library/ff628167.aspx).





### Valores devueltos

Un recurso de conexión. Si la conexión no pudo ser abierta, se retornará **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Conexión utilizando la autenticación Windows.**

&lt;?php
$serverName = "serverName\\sqlexpress"; //serverName\instanceName

// Dado que UID y PWD no están especificados en el array $connectionInfo,
// la conexión intentará utilizar la autenticación Windows.
$connectionInfo = array( "Database"=&gt;"dbName");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
echo "Conexión establecida.&lt;br /&gt;";
}else{
echo "La conexión no pudo ser establecida.&lt;br /&gt;";
die( print_r( sqlsrv_errors(), true));
}
?&gt;

    **Ejemplo #2 Conexión especificando un nombre de usuario y una contraseña.**

&lt;?php
$serverName = "serverName\\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
echo "Conexión establecida.&lt;br /&gt;";
}else{
echo "La conexión no pudo ser establecida.&lt;br /&gt;";
die( print_r( sqlsrv_errors(), true));
}
?&gt;

    **Ejemplo #3 Conexión a un puerto específico.**

&lt;?php
$serverName = "serverName\\sqlexpress, 1542"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
echo "Conexión establecida.&lt;br /&gt;";
}else{
echo "La conexión no pudo ser establecida.&lt;br /&gt;";
die( print_r( sqlsrv_errors(), true));
}
?&gt;

### Notas

Por omisión, la función **sqlsrv_connect()** utiliza la cola de conexiones
para aumentar el rendimiento. Para desactivar esta cola de conexiones
(i.e. y así, forzar una nueva conexión en cada llamada a la función), se debe definir
la opción "ConnectionPooling" en el array $connectionOptions a 0 (o **[false](#constant.false)**).
Para más información, consulte el capítulo sobre la
[» cola de conexiones SQLSRV](http://msdn.microsoft.com/en-us/library/cc644930.aspx).

La extensión SQLSRV no tiene una función dedicada para modificar la base de datos
a la que está conectada. La base de datos objetivo se especifica
en el array $connectionOptions pasado a la función sqlsrv_connect.
   Para cambiar la base de datos en una conexión abierta, se debe ejecutar la siguiente consulta:
   "USE dbName" (i.e. sqlsrv_query($conn, "USE dbName")).

### Ver también

    - [sqlsrv_close()](#function.sqlsrv-close) - Cierra una conexión abierta y libera los recursos asociados a la conexión

    - [sqlsrv_errors()](#function.sqlsrv-errors) - Devuelve información de errores y alertas (warnings) de la última operación SQLSRV realizada

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

# sqlsrv_errors

(No version information available, might only be in Git)

sqlsrv_errors — Devuelve información de errores y alertas (warnings) de la última operación SQLSRV realizada

### Descripción

**sqlsrv_errors**([int](#language.types.integer) $errorsOrWarnings = ?): [mixed](#language.types.mixed)

Devuelve información de errores y alertas de la última operación SQLSRV realizada.

### Parámetros

     errorsOrWarnings


       Determina si se ha de retornar información de error, alertas, o
       ambas. Si este parámetro no se informa, se devolverá tanto información de error como
       de alerta. Este parámetro puede tomar los
       siguientes valores: SQLSRV_ERR_ALL, SQLSRV_ERR_ERRORS, SQLSRV_ERR_WARNINGS.





### Valores devueltos

Si se produjeron errores y/o warnings en la última operación sqlsrv, se devolverá un array de
arrays conteniendo información de error. Si no se produjeron errores y/o alertas
en la última operación sqlsrv, se devolverá **[null](#constant.null)**. La siguiente tabla
describe la estructura de los arrays devueltos:

   <caption>**Array devuelto por sqlsrv_errors**</caption>
   
    
     
      Clave
      Descripción


      SQLSTATE
      Para errores que se originan en el driver ODBC driver, el SQLSTATE devuelto
      por ODBC. Para errores que se originan en los drivers de Microsoft para PHP para
      SQL Server, un SQLSTATE de IMSSP. Para alertas que se originan en los drivers de
      Microsoft para PHP para SQL Server, un SQLSTATE de 01SSP.




      code
      Para errores que se originan en SQL Server, el código de error SQL Server
      nativo. Para errores que se originan en el driver ODBC, el código
      de error devuelto por ODBC. Para errores que se originan en los Drivers de Microsoft
      para PHP para SQL Server, los códigos de error de SQL Server para los Drivers de Microsoft para PHP.




      message
      Una descripción del error.


### Ejemplos

    **Ejemplo #1 ejemplo de functionname()**

&lt;?php
$serverName = "serverName/sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

/_ Query que selecciona un nombre de columna inválida. _/
$sql = "SELECT BadColumnName FROM Table_1";

/_ Ejecución de la query que fallará debido al nombre de columna incorrecto. _/
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."&lt;br /&gt;";
echo "code: ".$error[ 'code']."&lt;br /&gt;";
            echo "message: ".$error[ 'message']."&lt;br /&gt;";
}
}
}
?&gt;

### Notas

Por defecto, las alertas generadas en una llamada a cualquier función SQLSRV se tratarán
como errores. Esto significa que si una alerta ocurre en una llamada a una función SQLSRV,
la función devolverá **[false](#constant.false)**. Sin embargo, las alertas correspondientes a los valores de
SQLSTATE 01000, 01001, 01003, y 01S02 nunca se tratarán como errores. Para
obtener información sobre cómo cambiar este comportamiento, ver [sqlsrv_configure()](#function.sqlsrv-configure)
y la configuración de WarningsReturnAsErrors.

### Ver también

    - [sqlsrv_configure()](#function.sqlsrv-configure) - Cambia la configuración de los drivers del gestionador de errores y de log

# sqlsrv_execute

(No version information available, might only be in Git)

sqlsrv_execute — Ejecuta una sentencia preparada con [sqlsrv_prepare()](#function.sqlsrv-prepare)

### Descripción

**sqlsrv_execute**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Ejecuta una sentencia preparada con [sqlsrv_prepare()](#function.sqlsrv-prepare). Esta
función es ideal para ser ejecutar múltiples veces una sentencia preparada
con diferentes valores de parámetros.

### Parámetros

     stmt


       Un recurso de sentencia devuelto por [sqlsrv_prepare()](#function.sqlsrv-prepare).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 ejemplo de sqlsrv_execute()**



    Este ejemplo muestra como preparar una sentencia con
    [sqlsrv_prepare()](#function.sqlsrv-prepare) y reejecutarla múltiples veces (con
    diferentes valores de parámetros) utilizando **sqlsrv_execute()**.

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Table_1
SET OrderQty = ?
WHERE SalesOrderID = ?";

// Inicializar los parámetros y preparar la sentencia.
// Las variables $qty y $id se pasan como parámetro a la sentencia $stmt.
$qty = 0; $id = 0;
$stmt = sqlsrv_prepare( $conn, $sql, array( &amp;$qty, &amp;$id));
if( !$stmt ) {
die( print_r( sqlsrv_errors(), true));
}

// Configurar la información de SalesOrderDetailID y OrderQty.
// Este array liga el orden ID al orden de cantidad en las parejas key=&gt;value.
$orders = array( 1=&gt;10, 2=&gt;20, 3=&gt;30);

// Ejecuta la sentencia para cada orden.
foreach( $orders as $id =&gt; $qty) {
// Como $id y $qty se pasan como parámetro a $stmt1, sus valores
// actualizados se utilizan en cada ejecución de la sentencia.
if( sqlsrv_execute( $stmt ) === false ) {
die( print_r( sqlsrv_errors(), true));
}
}
?&gt;

### Notas

Cuando se prepara una sentencia que utiliza variables como parámetros, las variables
se pasan como parámetros a la sentencia. Esto significa que si se actualizan los valores de las
variables, la próxima vez que se ejecute la sentencia lo hará con los nuevos valores
de los parámetros. Para las sentencias que se quieran ejecutar únicamente una vez, utilizar
[sqlsrv_query()](#function.sqlsrv-query).

### Ver también

    - [sqlsrv_prepare()](#function.sqlsrv-prepare) - Prepara una consulta para su ejecución

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

# sqlsrv_fetch

(No version information available, might only be in Git)

sqlsrv_fetch — Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado

### Descripción

**sqlsrv_fetch**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row = ?, [int](#language.types.integer) $offset = ?): [mixed](#language.types.mixed)

Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado. Utilizar
[sqlsrv_get_field()](#function.sqlsrv-get-field) para leer los campos de la fila.

### Parámetros

     stmt


       Un recurso de consulta creado por la ejecución de [sqlsrv_query()](#function.sqlsrv-query)
       o [sqlsrv_execute()](#function.sqlsrv-execute).






     row


       La fila que será accedida. Este parámetro puede utilizarse si la consulta
       especificada se preparó con un cursor con scroll. En ese caso, el parámetro
       puede tomar uno de los siguientes valores:



        - SQLSRV_SCROLL_NEXT

        - SQLSRV_SCROLL_PRIOR

        - SQLSRV_SCROLL_FIRST

        - SQLSRV_SCROLL_LAST

        - SQLSRV_SCROLL_ABSOLUTE

        - SQLSRV_SCROLL_RELATIVE






     offset


       Especifica la fila que será accedida si el parámetro de fila se configura como
       **[SQLSRV_SCROLL_ABSOLUTE](#constant.sqlsrv-scroll-absolute)** o
       **[SQLSRV_SCROLL_RELATIVE](#constant.sqlsrv-scroll-relative)**. Notar que la primera fila en el
       conjunto resultado tiene el índice 0.





### Valores devueltos

Devuelve **[true](#constant.true)** si la fila siguiente del conjunto de resultado se obtuvo satisfactoriamente,
**[false](#constant.false)** si se produce un error, y **[null](#constant.null)** si no hay más filas en el conjunto de resultado.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_fetch()**



    El ejemplo siguiente demuestra como obtener una fila con
    **sqlsrv_fetch()** y los campos de la fila con
    [sqlsrv_get_field()](#function.sqlsrv-get-field).

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT Name, Comment
        FROM Table_1
        WHERE ReviewID=1";
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

// Hacer que sea disponible para su lectura la primera (y en este caso única) fila del conjunto resultado.
if( sqlsrv_fetch( $stmt ) === false) {
die( print_r( sqlsrv_errors(), true));
}

// Obtener los campos de la fila. Los índices de campo empiezan desde 0 y se deben obtener en orden.
// Recuperar los nombres de campo por su nombre no está soportado por sqlsrv_get_field.
$name = sqlsrv_get_field( $stmt, 0);
echo "$name: ";

$comment = sqlsrv_get_field( $stmt, 1);
echo $comment;
?&gt;

### Ver también

    - [sqlsrv_get_field()](#function.sqlsrv-get-field) - Recupera los datos del campo desde la línea actualmente seleccionada

    - [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) - Devuelve una fila como un array

    - [sqlsrv_fetch_object()](#function.sqlsrv-fetch-object) - Devuelve la siguiente fila de datos de un conjunto resultado como un objeto

# sqlsrv_fetch_array

(No version information available, might only be in Git)

sqlsrv_fetch_array — Devuelve una fila como un array

### Descripción

**sqlsrv_fetch_array**(
    [resource](#language.types.resource) $stmt,
    [int](#language.types.integer) $fetchType = ?,
    [int](#language.types.integer) $row = ?,
    [int](#language.types.integer) $offset = ?
): [array](#language.types.array)

Devuelve la siguiente fila de datos disponible como un array asociativo, un array
numérico, o ambos (por defecto).

### Parámetros

     stmt


       Un recurso de sentencia devuelta por sqlsrv_query o sqlsrv_prepare.






     fetchType


       Una constante predefinida con el tipo de array a devolver. Los valores
       posibles son **[SQLSRV_FETCH_ASSOC](#constant.sqlsrv-fetch-assoc)**,
       **[SQLSRV_FETCH_NUMERIC](#constant.sqlsrv-fetch-numeric)**, y
       **[SQLSRV_FETCH_BOTH](#constant.sqlsrv-fetch-both)** (por defecto).




      El tipo de objeto devuelto SQLSRV_FETCH_ASSOC no debe utilizarse cuando se trate un
      conjunto de resultados con múltiples columnas con el mismo nombre.






     row


       Especifica la fila para acceder a un conjunto de resultados que utiliza un cursor con scroll.
       Los valores posibles son **[SQLSRV_SCROLL_NEXT](#constant.sqlsrv-scroll-next)**,
       **[SQLSRV_SCROLL_PRIOR](#constant.sqlsrv-scroll-prior)**, **[SQLSRV_SCROLL_FIRST](#constant.sqlsrv-scroll-first)**,
       **[SQLSRV_SCROLL_LAST](#constant.sqlsrv-scroll-last)**, **[SQLSRV_SCROLL_ABSOLUTE](#constant.sqlsrv-scroll-absolute)** y,
       **[SQLSRV_SCROLL_RELATIVE](#constant.sqlsrv-scroll-relative)** (por defecto). Cuando se especifica
       este parámetro, el parámetro fetchType debe ser definido explícitamente.






     offset


       Especifica la fila a la que se desea acceder si el parámetro de fila se define como
       **[SQLSRV_SCROLL_ABSOLUTE](#constant.sqlsrv-scroll-absolute)** o
       **[SQLSRV_SCROLL_RELATIVE](#constant.sqlsrv-scroll-relative)**. Notar que la primera fila
       en un conjunto de resultado tiene el índice 0.





### Valores devueltos

Devuelve un array en caso de éxito, **[null](#constant.null)** si no hay más filas a devolver, y
**[false](#constant.false)** si se produce un error.

### Ejemplos

    **Ejemplo #1 Devolver un array asociativo.**

&lt;?php
$serverName = "serverName\instanceName";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT FirstName, LastName FROM SomeTable";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['LastName'].", ".$row['FirstName']."&lt;br /&gt;";
}

sqlsrv_free_stmt( $stmt);
?&gt;

    **Ejemplo #2 Devolver un array numérico.**

&lt;?php
$serverName = "serverName\instanceName";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT FirstName, LastName FROM SomeTable";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      echo $row[0].", ".$row[1]."&lt;br /&gt;";
}

sqlsrv_free_stmt( $stmt);
?&gt;

### Notas

Cuando no se especifica el parámetro fetchType o se utiliza explícitamente la constante
**[SQLSRV_FETCH_TYPE](#constant.sqlsrv-fetch-type)** en los ejemplos anteriores, se
devolverá un array que tiene tanto claves asociativas como claves nuéricas.

Si se devuelve más de una columna con el mismo nombre, la última columna
tendrá prioridad para tomar el nombre. Para evitar colisiones de nombre de campo, utilizar alias.

Si se devuelve una columna sin nombre, la clave asociativa para ese elemento del array
será un string vacío ("").

### Ver también

    - [sqlsrv_connect()](#function.sqlsrv-connect) - Establece una conexión con una base de datos Microsoft SQL Server

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

    - [sqlsrv_errors()](#function.sqlsrv-errors) - Devuelve información de errores y alertas (warnings) de la última operación SQLSRV realizada

    - [sqlsrv_fetch()](#function.sqlsrv-fetch) - Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado

# sqlsrv_fetch_object

(No version information available, might only be in Git)

sqlsrv_fetch_object — Devuelve la siguiente fila de datos de un conjunto resultado como un objeto

### Descripción

**sqlsrv_fetch_object**(
    [resource](#language.types.resource) $stmt,
    [string](#language.types.string) $className = ?,
    [array](#language.types.array) $ctorParams = ?,
    [int](#language.types.integer) $row = ?,
    [int](#language.types.integer) $offset = ?
): [mixed](#language.types.mixed)

Devuelve la siguiente fila de datos de un conjunto resultado como una instancia de la clase
especificada, donde las propiedades correspondientes a los nombres de los campos de la fila recuperada y los valores, se corresponden con
los valores de la fila recuperada.

### Parámetros

     stmt


       Un recurso de consulta creado por [sqlsrv_query()](#function.sqlsrv-query) o
       [sqlsrv_execute()](#function.sqlsrv-execute).






     className


       El nombre de la clase a instanciar. Si no se especifica el nombre de la clase,
       se instanciará la clase stdClass.






     ctorParams


       Los valores pasados al constructor de la clase especificada. Si el constructor
       de la clase especificada tiene parámetros, se proporcionará el array
       ctorParams.






     row


       La fila a la que se accederá. Este parámetro únicamente puede utilizarse si la consulta
       especificada se preparó con un cursor con scroll. En ese caso, este parámetro
       puede tomar uno de los siguientes valores:



        - SQLSRV_SCROLL_NEXT

        - SQLSRV_SCROLL_PRIOR

        - SQLSRV_SCROLL_FIRST

        - SQLSRV_SCROLL_LAST

        - SQLSRV_SCROLL_ABSOLUTE

        - SQLSRV_SCROLL_RELATIVE






     offset


       Especifica la fila a la que se accederá si el parámetro de fila se ha especificado como
       **[SQLSRV_SCROLL_ABSOLUTE](#constant.sqlsrv-scroll-absolute)** o
       **[SQLSRV_SCROLL_RELATIVE](#constant.sqlsrv-scroll-relative)**. Notar que la primera fila en un
       conjunto de resultado tiene el índice 0.





### Valores devueltos

Devuelve un objeto en caso de éxito, **[null](#constant.null)** si no hay más filas a devolver,
y **[false](#constant.false)** si se produce un error o si la clase especificada no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_fetch_object()**



    El siguiente ejemplo demuestra cómo devolver una columna como un objeto stdClass.

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT fName, lName FROM Table_1";
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

// Devolver cada fila como un objeto.
// Puesto que no se especifica ninguna clase, cada fila devolverá un objeto stdClass.
// Los nombres de propiedades corresponden a nombres de campo.
while( $obj = sqlsrv_fetch_object( $stmt)) {
      echo $obj-&gt;fName.", ".$obj-&gt;lName."&lt;br /&gt;";
}
?&gt;

### Notas

Si se especifica un nombre de clase con el parámetro opcional $className y la
clase tiene propiedades cuyos nombres coinciden con los nombres de campos del conjunto de resultado, los valores correspondientes
del conjunto de resultado se aplicarán a las propiedades. Si un nombre de campo del conjunto resultado
no coincide con ninguna propiedad de clase, una propiedad con el nombre de campo se añadirá al
objeto del conjunto resultado y el valor del resultado se aplicará a la propiedad. Se aplican las
reglas siguientes cuando se utiliza el parámetro $className:

      - El nombre de propiedad de campo coincidente es sensible al uso de mayúsculas y minúsculas (es case sensitive).

      - La coincidencia con la propiedad de campo se da aunque se utilicen modificadores de acceso.

      - Los tipos de datos de la propiedad de clase se ignoran cuando se aplica un valor de campo a la propiedad.

      - Si la clase no existe, la función devuelve **[false](#constant.false)** y añade un error a la colección de errores.

A pesar de que se defina el parámetro $className, si se devuelve un campo sin
nombre, el valor de campo será ignorado y se añadirá una alerta
a la colección de errores.

Cuando se trate un conjunto de resultado que tenga varias columnas con el mismo nombre, podría
ser mejor utilizar [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) o la combinación de
[sqlsrv_fetch()](#function.sqlsrv-fetch) y [sqlsrv_get_field()](#function.sqlsrv-get-field).

### Ver también

    - [sqlsrv_fetch()](#function.sqlsrv-fetch) - Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado

    - [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) - Devuelve una fila como un array

# sqlsrv_field_metadata

(No version information available, might only be in Git)

sqlsrv_field_metadata — Recupera los datos meta para los campos de una consulta preparada por la función
[sqlsrv_prepare()](#function.sqlsrv-prepare) o la función [sqlsrv_query()](#function.sqlsrv-query)

### Descripción

**sqlsrv_field_metadata**([resource](#language.types.resource) $stmt): [mixed](#language.types.mixed)

Recupera los datos meta para los campos de una consulta preparada por la función
[sqlsrv_prepare()](#function.sqlsrv-prepare) o la función [sqlsrv_query()](#function.sqlsrv-query).
La función **sqlsrv_field_metadata()** puede ser llamada sobre una
consulta antes o después de su ejecución.

### Parámetros

     stmt


       Un recurso de consulta desde el cual los datos meta serán
       recuperados.





### Valores devueltos

Devuelve un array de arrays en caso de éxito. De lo contrario, **[false](#constant.false)** es devuelto.
Cada array devuelto es descrito en la tabla siguiente:

    <caption>**Array devuelto por la función sqlsrv_field_metadata**</caption>



       Clave
       Descripción






       Name
       El nombre del campo.



       Type
       El valor numérico para el tipo SQL.



       Size
       El número de caracteres para los campos de tipo caracteres,
        el número de bytes para los campos de tipo binario, o **[null](#constant.null)** para
        los otros tipos.



       Precision
       La precisión para las variables de tipo precisión, **[null](#constant.null)** para los
        otros tipos.



       Scale

        La escala para las variables de tipo scale, **[null](#constant.null)** para los otros tipos.



       Nullable
        Una enumeración indicando si la columna puede ser nula, no puede serlo,
        o si esta información no es conocida.




Para más información, consulte la documentación sobre la función
[» sqlsrv_field_metadata](http://msdn.microsoft.com/en-us/library/cc296197.aspx) de la
documentación Microsoft SQLSRV.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_field_metadata()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"AdventureWorks", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Table_1";
$stmt = sqlsrv_prepare( $conn, $sql );

foreach( sqlsrv_field_metadata( $stmt ) as $fieldMetadata ) {
    foreach( $fieldMetadata as $name =&gt; $value) {
       echo "$name: $value&lt;br /&gt;";
}
echo "&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_client_info()](#function.sqlsrv-client-info) - Devuelve información sobre el cliente y la conexión especificada

# sqlsrv_free_stmt

(No version information available, might only be in Git)

sqlsrv_free_stmt — Libera todos los recursos de la consulta especificada

### Descripción

**sqlsrv_free_stmt**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Libera todos los recursos para la consulta especificada. La consulta no podrá
ser utilizada después de pasar a la función **sqlsrv_free_stmt()**.
Si la función **sqlsrv_free_stmt()** es llamada mientras la
consulta está en ejecución, la ejecución de la consulta es interrumpida
y la consulta es cancelada.

### Parámetros

     stmt


       La consulta cuyos recursos serán liberados.
       Tenga en cuenta que **[null](#constant.null)** es un valor de argumento válido. Este valor
       permite que la función sea llamada varias veces en un script.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_free_stmt()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$stmt = sqlsrv_query( $conn, "SELECT \* FROM Table_1");
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

/_-------------------------------
Uso de la consulta aquí.
-------------------------------_/

/_ Liberación de los recursos asociados a la consulta. _/
sqlsrv_free_stmt( $stmt);

?&gt;

### Notas

La principal diferencia entre la función **sqlsrv_free_stmt()** y
la función [sqlsrv_cancel()](#function.sqlsrv-cancel) es que un recurso de consulta
cancelado con la función [sqlsrv_cancel()](#function.sqlsrv-cancel) puede ser re-ejecutado
si ha sido creado con la función [sqlsrv_prepare()](#function.sqlsrv-prepare).
Un recurso de consulta cancelado con la función
**sqlsrv_free_statement()** no puede ser re-ejecutado.

### Ver también

    - [sqlsrv_cancel()](#function.sqlsrv-cancel) - Cancela una sentencia de base de datos

# sqlsrv_get_config

(No version information available, might only be in Git)

sqlsrv_get_config — Devuelve el valor de la configuración especificada

### Descripción

**sqlsrv_get_config**([string](#language.types.string) $setting): [mixed](#language.types.mixed)

Devuelve el valor de la configuración especificada.

### Parámetros

     setting


       El nombre de la configuración para la cual se devolverá el valor. Para una lista de las configuraciones, ver la función [sqlsrv_configure()](#function.sqlsrv-configure).





### Valores devueltos

Devuelve el valor de la configuración solicitada. Si se proporciona una configuración no válida, se devolverá **[false](#constant.false)**.

### Ver también

    - [sqlsrv_configure()](#function.sqlsrv-configure) - Cambia la configuración de los drivers del gestionador de errores y de log

# sqlsrv_get_field

(No version information available, might only be in Git)

sqlsrv_get_field — Recupera los datos del campo desde la línea actualmente seleccionada

### Descripción

**sqlsrv_get_field**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $fieldIndex, [int](#language.types.integer) $getAsType = ?): [mixed](#language.types.mixed)

Recupera los datos del campo desde la línea actualmente seleccionada.
Los campos deben ser leídos en orden. Sus índices comienzan en 0.

### Parámetros

     stmt


       Un recurso de consulta devuelto por la función
       [sqlsrv_query()](#function.sqlsrv-query) o la función
       [sqlsrv_execute()](#function.sqlsrv-execute).






     fieldIndex


       El índice del campo a recuperar. Los índices de los campos comienzan en 0.
       Los campos deben ser leídos en orden, es decir, si se accede al campo
       con índice 1, el campo con índice 0 ya no estará disponible.






     getAsType


       El tipo de datos PHP para los datos del campo devuelto. Si este argumento
       no está definido, los datos del campo serán devueltos en forma de un tipo de datos PHP por omisión. Para más información sobre los
       tipos de datos PHP por omisión, consulte la sección sobre
       [» los tipos de datos PHP por omisión](http://msdn.microsoft.com/en-us/library/cc296193.aspx)
       de la documentación Microsoft SQLSRV.





### Valores devueltos

Devuelve los datos desde el campo especificado en caso de éxito.
Devuelve **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 sqlsrv_get_field()** example



     El siguiente ejemplo muestra cómo recuperar una línea con la
     función [sqlsrv_fetch()](#function.sqlsrv-fetch) y recupera
     los campos de la línea con la función **sqlsrv_get_field()**.

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT Name, Comment
        FROM Table_1
        WHERE ReviewID=1";
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

// Hace disponible la primera (y en este caso, la única) línea del conjunto de resultados para lectura.
if( sqlsrv_fetch( $stmt ) === false) {
die( print_r( sqlsrv_errors(), true));
}

// Recupera los campos de la línea. Los índices comienzan en 0 y deben ser recuperados en orden.
// La recuperación de los campos de la línea por sus nombres no es soportada por la función sqlsrv_get_field.
$name = sqlsrv_get_field( $stmt, 0);
echo "$name: ";

$comment = sqlsrv_get_field( $stmt, 1);
echo $comment;
?&gt;

### Ver también

    - [sqlsrv_fetch()](#function.sqlsrv-fetch) - Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado

    - [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) - Devuelve una fila como un array

    - [sqlsrv_fetch_object()](#function.sqlsrv-fetch-object) - Devuelve la siguiente fila de datos de un conjunto resultado como un objeto

# sqlsrv_has_rows

(No version information available, might only be in Git)

sqlsrv_has_rows — Indica si la consulta especificada contiene filas

### Descripción

**sqlsrv_has_rows**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Indica si la consulta especificada contiene filas.

### Parámetros

     stmt


       Un recurso de consulta devuelto por la función
       [sqlsrv_query()](#function.sqlsrv-query) o la función
       [sqlsrv_execute()](#function.sqlsrv-execute).





### Valores devueltos

Devuelve **[true](#constant.true)** si la consulta especificada contiene filas,
**[false](#constant.false)** si no contiene ninguna o si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_has_rows()**

&lt;?php
$server = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password" );
$conn = sqlsrv_connect( $server, $connectionInfo );

$stmt = sqlsrv_query( $conn, "SELECT \* FROM Table_1");

if ($stmt) {
   $rows = sqlsrv_has_rows( $stmt );
   if ($rows === true)
echo "Hay filas. &lt;br /&gt;";
else
echo "No hay filas. &lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_num_rows()](#function.sqlsrv-num-rows) - Recupera el número de filas de un conjunto de resultados

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

# sqlsrv_next_result

(No version information available, might only be in Git)

sqlsrv_next_result — Activa el siguiente resultado de la consulta especificada

### Descripción

**sqlsrv_next_result**([resource](#language.types.resource) $stmt): [mixed](#language.types.mixed)

Activa el siguiente resultado de la consulta especificada. Los resultados
incluyen los conjuntos de resultados, el número de filas y los parámetros
de salida.

### Parámetros

     stmt


       La consulta sobre la cual se llamará el siguiente resultado.





### Valores devueltos

Devuelve **[true](#constant.true)** si el siguiente resultado ha sido recuperado con éxito,
**[false](#constant.false)** si ocurre un error, y **[null](#constant.null)** si no hay más
resultados para recuperar.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_next_result()**



     El siguiente ejemplo ejecuta una consulta batch que realiza inserciones
     en una tabla y luego realiza una selección de la tabla. Esto produce
     2 resultados en la consulta: uno para las filas afectadas por el INSERT,
     y otro para las filas devueltas por el SELECT. Para recuperar las filas
     devueltas por el SELECT, la función **sqlsrv_next_result()**
     debe ser llamada para pasar el primer resultado.

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array("Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$query = "INSERT INTO Table_1 (id, data) VALUES (?,?); SELECT * FROM TABLE_1;";
$params = array(1, "some data");
$stmt = sqlsrv_query($conn, $query, $params);

// Consume el primer resultado (filas afectadas por el INSERT) sin llamar a la función sqlsrv_next_result.
echo "Filas afectadas : ".sqlsrv_rows_affected($stmt)."&lt;br /&gt;";

// Se mueve al siguiente resultado y muestra los resultados.
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
      echo $row['id']." : ".$row['data']."&lt;br /&gt;";
}
} elseif( is_null($next_result)) {
echo "No hay más resultados.&lt;br /&gt;";
} else {
die(print_r(sqlsrv_errors(), true));
}
?&gt;

### Ver también

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

    - [sqlsrv_fetch_array()](#function.sqlsrv-fetch-array) - Devuelve una fila como un array

    - [sqlsrv_rows_affected()](#function.sqlsrv-rows-affected) - Devuelve el número de filas modificadas por la última consulta de tipo

INSERT, UPDATE, o DELETE

# sqlsrv_num_fields

(No version information available, might only be in Git)

sqlsrv_num_fields — Recupera el número de campos (columnas) en una consulta

### Descripción

**sqlsrv_num_fields**([resource](#language.types.resource) $stmt): [mixed](#language.types.mixed)

Recupera el número de campos (columnas) en una consulta.

### Parámetros

     stmt


       La consulta desde la cual se devuelve el número de campos.
       La función **sqlsrv_num_fields()** puede ser
       llamada sobre una consulta antes o después de la ejecución de
       la consulta.





### Valores devueltos

Devuelve el número de campos en caso de éxito.
Devuelve **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_num_fields()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Table_1";
$stmt = sqlsrv_query($conn, $sql);
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true));
}

$numFields = sqlsrv_num_fields( $stmt );

while( sqlsrv_fetch( $stmt )) {
   // Iteración sobre los campos de cada fila.
   for($i = 0; $i &lt; $numFields; $i++) {
      echo sqlsrv_get_field($stmt, $i)." ";
}
echo "&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_field_metadata()](#function.sqlsrv-field-metadata) - Recupera los datos meta para los campos de una consulta preparada por la función

sqlsrv_prepare o la función sqlsrv_query

    - [sqlsrv_fetch()](#function.sqlsrv-fetch) - Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado

    - [sqlsrv_get_field()](#function.sqlsrv-get-field) - Recupera los datos del campo desde la línea actualmente seleccionada

# sqlsrv_num_rows

(No version information available, might only be in Git)

sqlsrv_num_rows — Recupera el número de filas de un conjunto de resultados

### Descripción

**sqlsrv_num_rows**([resource](#language.types.resource) $stmt): [mixed](#language.types.mixed)

Recupera el número de filas de un conjunto de resultados. Esta función
requiere que el recurso de consulta haya sido creado con un cursor
estático o keyset. Para más información, consulte las funciones
[sqlsrv_query()](#function.sqlsrv-query), [sqlsrv_prepare()](#function.sqlsrv-prepare),
o el capítulo
[» Especificar un tipo de cursor y seleccionar filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx)
en la documentación de Microsoft SQLSRV.

### Parámetros

     stmt


       La consulta desde la cual se devuelve el número total de filas.
       El recurso de consulta debe haber sido creado con un cursor estático
       o keyset. Para más información, consulte las funciones
       [sqlsrv_query()](#function.sqlsrv-query), [sqlsrv_prepare()](#function.sqlsrv-prepare),
       o el capítulo
       [» Especificar un tipo de cursor y seleccionar filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx)
       en la documentación de Microsoft SQLSRV.





### Valores devueltos

Devuelve el número total de filas recuperadas en caso de éxito, y
**[false](#constant.false)** si ocurre un error. Si se utiliza un cursor anterior (por omisión),
o un cursor dinámico, se devolverá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_num_rows()**

&lt;?php
$server = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password" );
$conn = sqlsrv_connect( $server, $connectionInfo );

$sql = "SELECT * FROM Table_1";
$params = array();
$options =  array( "Scrollable" =&gt; SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sql , $params, $options );

$row_count = sqlsrv_num_rows( $stmt );

if ($row_count === false)
echo "Error al recuperar el número de filas.";
else
echo $row_count;
?&gt;

### Ver también

    - [sqlsrv_has_rows()](#function.sqlsrv-has-rows) - Indica si la consulta especificada contiene filas

    - [sqlsrv_rows_affected()](#function.sqlsrv-rows-affected) - Devuelve el número de filas modificadas por la última consulta de tipo

INSERT, UPDATE, o DELETE

# sqlsrv_prepare

(No version information available, might only be in Git)

sqlsrv_prepare — Prepara una consulta para su ejecución

### Descripción

**sqlsrv_prepare**(
    [resource](#language.types.resource) $conn,
    [string](#language.types.string) $sql,
    [array](#language.types.array) $params = ?,
    [array](#language.types.array) $options = ?
): [mixed](#language.types.mixed)

Prepara una consulta para su ejecución. Esta función es ideal para
preparar una consulta que será ejecutada varias veces con diferentes
valores de argumentos.

### Parámetros

     conn


       Un recurso de conexión devuelto por la función
       [sqlsrv_connect()](#function.sqlsrv-connect).






     sql


       La cadena que define la consulta a preparar y ejecutar.






     params


       Un array especificando la información de los argumentos al ejecutar
       una consulta que contiene argumentos. Los elementos del array pueden
       ser cualquiera de los siguientes:



        - Un valor literal

        - Una variable PHP

        - Un array con la siguiente estructura:
        array($value [, $direction [, $phpType [, $sqlType]]])


       La tabla siguiente describe los elementos de la estructura del array anterior:


       <caption>**Estructura del array**</caption>



          Elemento
          Descripción






          $value
          Un valor literal, una variable PHP o una variable PHP pasada por referencia.



          $direction (opcional)
          Una de las constantes SQLSRV siguientes, utilizadas para indicar la
           dirección del argumento: SQLSRV_PARAM_IN, SQLSRV_PARAM_OUT, SQLSRV_PARAM_INOUT.
           El valor por defecto es SQLSRV_PARAM_IN.




          $phpType (opcional)
          Una constante SQLSRV_PHPTYPE_* que especifica el tipo de datos PHP
           del valor devuelto.



          $sqlType (opcional)
          Una constante SQLSRV_SQLTYPE_* que especifica el tipo de datos
           del servidor SQL del valor de entrada.









     options


       Un array especificando las opciones de propiedades de la consulta.
       Las claves soportadas se describen en la tabla siguiente:




       <caption>**Opciones de la consulta**</caption>



          Clave
          Valores
          Descripción






          QueryTimeout
          Un valor entero positivo.
          Define el tiempo máximo de ejecución de la consulta, en segundos.
           Por defecto, el controlador esperará indefinidamente los resultados.



          SendStreamParamsAtExec
          **[true](#constant.true)** o **[false](#constant.false)** (por defecto, **[true](#constant.true)**)
          Configura el controlador para enviar los datos del flujo a la ejecución (**[true](#constant.true)**),
           o enviar los datos del flujo por partes (**[false](#constant.false)**). Por defecto, el valor
           está definido a **[true](#constant.true)**. Para más información, consulte la función
           [sqlsrv_send_stream_data()](#function.sqlsrv-send-stream-data).



          Scrollable
          SQLSRV_CURSOR_FORWARD, SQLSRV_CURSOR_STATIC, SQLSRV_CURSOR_DYNAMIC,
          o SQLSRV_CURSOR_KEYSET
          Ver la sección sobre [» la
           especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx) de la documentación
           Microsoft SQLSRV.








### Valores devueltos

Devuelve un recurso de consulta en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_prepare()**



     Este ejemplo muestra cómo preparar una consulta con la función
     **sqlsrv_prepare()** y su re-ejecución varias veces
     (con diferentes valores de argumentos) utilizando la función
     [sqlsrv_execute()](#function.sqlsrv-execute).

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Table_1
SET OrderQty = ?
WHERE SalesOrderID = ?";

// Inicializa los argumentos y prepara la consulta.
// Las variables $qty y $id están ligadas a la consulta $stmt.
$qty = 0; $id = 0;
$stmt = sqlsrv_prepare( $conn, $sql, array( &amp;$qty, &amp;$id));
if( !$stmt ) {
die( print_r( sqlsrv_errors(), true));
}

// Define la información SalesOrderDetailID y OrderQty.
// Este array liga el orden de los IDs con el orden de las cantidades con pares clave=&gt;valor.
$orders = array( 1=&gt;10, 2=&gt;20, 3=&gt;30);

// Ejecuta la consulta para cada orden.
foreach( $orders as $id =&gt; $qty) {
// Debido a que $id y $qty están ligados a $stmt1,
// sus valores actualizados se utilizan en cada ejecución
// de la consulta.
if( sqlsrv_execute( $stmt ) === false ) {
die( print_r( sqlsrv_errors(), true));
}
}
?&gt;

### Notas

Cuando se prepara una consulta que utiliza variables como argumentos,
las variables están ligadas a la consulta. Esto significa que si se actualizan
los valores de estas variables, la próxima ejecución de la consulta tomará
en cuenta estos nuevos valores. Para las consultas que se prevé ejecutar
solo una vez, utilice la función
[sqlsrv_query()](#function.sqlsrv-query).

### Ver también

    - [sqlsrv_execute()](#function.sqlsrv-execute) - Ejecuta una sentencia preparada con sqlsrv_prepare

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

# sqlsrv_query

(No version information available, might only be in Git)

sqlsrv_query — Prepara y ejecuta una consulta

### Descripción

**sqlsrv_query**(
    [resource](#language.types.resource) $conn,
    [string](#language.types.string) $sql,
    [array](#language.types.array) $params = ?,
    [array](#language.types.array) $options = ?
): [mixed](#language.types.mixed)

Prepara y ejecuta una consulta.

### Parámetros

     conn


       Un recurso de conexión devuelto por la función
       [sqlsrv_connect()](#function.sqlsrv-connect).






     sql


       El string que define la consulta a preparar y ejecutar.






     params


       Un array especificando los parámetros al ejecutar
       una consulta que los permita.
       Los elementos del array pueden ser cualquiera de los siguientes:



        - Un valor literal

        - Una variable PHP

        - Un array con esta estructura:
        array($value [, $direction [, $phpType [, $sqlType]]])


       La tabla siguiente describe los elementos en la estructura del array anterior:


       <caption>**Estructura del array**</caption>



          Elemento
          Descripción






          $value
          Un valor literal, una variable PHP o una variable PHP por referencia.



          $direction (opcional)
          Una de las constantes SQLSRV siguientes utilizadas para indicar la
           dirección del parámetro: SQLSRV_PARAM_IN, SQLSRV_PARAM_OUT, SQLSRV_PARAM_INOUT.
           El valor por defecto es SQLSRV_PARAM_IN.



          $phpType (opcional)
          Una constante SQLSRV_PHPTYPE_* que especifica el tipo de datos PHP
           del valor devuelto.



          $sqlType (opcional)
          Una constante SQLSRV_SQLTYPE_* que especifica el tipo de datos
           del servidor SQL para el valor de entrada.









     options


       Un array especificando las opciones de la consulta. Las claves soportadas son
       descritas en la tabla siguiente:




       <caption>**Opciones de consulta**</caption>



          Clave
          Valor
          Descripción






          QueryTimeout
          Un valor entero positivo.
          Define el tiempo máximo de ejecución de la consulta en segundos.
           Por defecto, el controlador esperará indefinidamente los resultados.



          SendStreamParamsAtExec
          **[true](#constant.true)** o **[false](#constant.false)** (por defecto, vale **[true](#constant.true)**)
          Configura el controlador para enviar todos los flujos de datos
           a la ejecución (**[true](#constant.true)**) o enviar los flujos de datos en fragmentos
           (**[false](#constant.false)**). Para más información, ver la función
           [sqlsrv_send_stream_data()](#function.sqlsrv-send-stream-data).



          Scrollable
          SQLSRV_CURSOR_FORWARD, SQLSRV_CURSOR_STATIC, SQLSRV_CURSOR_DYNAMIC,
          o SQLSRV_CURSOR_KEYSET
          Ver el capítulo sobre [» la
           especificación de un tipo de cursor y la selección de filas](http://msdn.microsoft.com/en-us/library/ee376927.aspx)
           en la documentación Microsoft SQLSRV.








### Valores devueltos

Devuelve un recurso de consulta en caso de éxito, y **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 sqlsrv_query()** ejemplo

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "INSERT INTO Table_1 (id, data) VALUES (?, ?)";
$params = array(1, "some data");

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}
?&gt;

### Notas

Para las consultas que no se prevé ejecutar más de una vez,
utilice la función **sqlsrv_query()**.
Si se desea re-ejecutar una consulta con diferentes valores para sus
parámetros, utilice la combinación de la función
[sqlsrv_prepare()](#function.sqlsrv-prepare) y la función [sqlsrv_execute()](#function.sqlsrv-execute).

### Ver también

    - [sqlsrv_prepare()](#function.sqlsrv-prepare) - Prepara una consulta para su ejecución

    - [sqlsrv_execute()](#function.sqlsrv-execute) - Ejecuta una sentencia preparada con sqlsrv_prepare

# sqlsrv_rollback

(No version information available, might only be in Git)

sqlsrv_rollback — Anula una transacción que ha sido iniciada gracias a la función
[sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction)

### Descripción

**sqlsrv_rollback**([resource](#language.types.resource) $conn): [bool](#language.types.boolean)

Anula una transacción que ha sido iniciada gracias a la función
[sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction) y devuelve
la conexión en modo auto-validación.

### Parámetros

     conn


       El recurso de conexión devuelto por una llamada
       a la función [sqlsrv_connect()](#function.sqlsrv-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_rollback()**



     El siguiente ejemplo muestra la forma de utilizar la función
     [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction) con las funciones
     [sqlsrv_commit()](#function.sqlsrv-commit) y **sqlsrv_rollback()**.

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"userName", "PWD"=&gt;"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Inicia la transacción. _/
if ( sqlsrv_begin_transaction( $conn ) === false ) {
die( print_r( sqlsrv_errors(), true ));
}

/_ Inicializa los valores de los argumentos. _/
$orderId = 1; $qty = 10; $productId = 100;

/_ Ejecución de la primera consulta. _/
$sql1 = "INSERT INTO OrdersTable (ID, Quantity, ProductID)
         VALUES (?, ?, ?)";
$params1 = array( $orderId, $qty, $productId );
$stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

/_ Ejecuta la segunda consulta. _/
$sql2 = "UPDATE InventoryTable
         SET Quantity = (Quantity - ?)
         WHERE ProductID = ?";
$params2 = array($qty, $productId);
$stmt2 = sqlsrv_query( $conn, $sql2, $params2 );

/_ Si las dos consultas han sido ejecutadas con éxito,
se valida la transacción _/
/_ De lo contrario, se anula la transacción. _/
if( $stmt1 &amp;&amp; $stmt2 ) {
sqlsrv_commit( $conn );
echo "Transacción validada.&lt;br /&gt;";
} else {
sqlsrv_rollback( $conn );
echo "Transacción anulada.&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_begin_transaction()](#function.sqlsrv-begin-transaction) - Inicia una transacción de base de datos

    - [sqlsrv_commit()](#function.sqlsrv-commit) - Consolida una transacción que se inició con sqlsrv_begin_transaction

# sqlsrv_rows_affected

(No version information available, might only be in Git)

sqlsrv_rows_affected — Devuelve el número de filas modificadas por la última consulta de tipo
INSERT, UPDATE, o DELETE

### Descripción

**sqlsrv_rows_affected**([resource](#language.types.resource) $stmt): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de filas modificadas por la última consulta de tipo
INSERT, UPDATE, o DELETE. Para más información sobre el número
de filas devueltas por una consulta SELECT, consulte la función
[sqlsrv_num_rows()](#function.sqlsrv-num-rows).

### Parámetros

     stmt


       El recurso de la consulta ejecutada.





### Valores devueltos

Devuelve el número de filas afectadas por la última consulta
INSERT, UPDATE, o DELETE. Si ninguna fila es afectada, se devolverá 0.
Si el número de filas afectadas no puede ser determinado, se devolverá -1.
Si ocurre un error, se devolverá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_rows_affected()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Table_1 SET data = ? WHERE id = ?";

$params = array("updated data", 1);

$stmt = sqlsrv_query( $conn, $sql, $params);

$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
echo "No hay información disponible.&lt;br /&gt;";
} else {
echo $rows_affected." filas han sido actualizadas.&lt;br /&gt;";
}
?&gt;

### Ver también

    - [sqlsrv_num_rows()](#function.sqlsrv-num-rows) - Recupera el número de filas de un conjunto de resultados

# sqlsrv_send_stream_data

(No version information available, might only be in Git)

sqlsrv_send_stream_data — Envía datos desde el flujo al servidor

### Descripción

**sqlsrv_send_stream_data**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Envía datos desde el flujo al servidor. Hasta 8 Ko
de datos son enviados en cada llamada.

### Parámetros

     stmt


       Un recurso de petición devuelto por la
       función [sqlsrv_query()](#function.sqlsrv-query) o
       por la función [sqlsrv_execute()](#function.sqlsrv-execute).





### Valores devueltos

Devuelve **[true](#constant.true)** si aún hay datos por
enviar, y **[false](#constant.false)** si no hay más.

### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_send_stream_data()**

&lt;?php
$serverName = "serverName\sqlexpress";
$connectionInfo = array( "Database"=&gt;"dbName", "UID"=&gt;"username", "PWD"=&gt;"password" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Table_1 SET data = ( ?) WHERE id = 100";

// Abre los datos como flujo y los coloca en el array $params.
$data = fopen( "data://text/plain,[ Lengthy content here. ]", "r");
$params = array( &amp;$data);

// Prepara la petición. Uso del array $options para desactivar
// el comportamiento por omisión, que es enviar todos los datos del flujo
// al momento de la ejecución de la petición.
$options = array("SendStreamParamsAtExec"=&gt;0);
$stmt = sqlsrv_prepare( $conn, $sql, $params, $options);

sqlsrv_execute( $stmt);

// Envía hasta 8 Ko de datos al servidor
// en cada llamada a la función sqlsrv_send_stream_data.
$i = 1;
while( sqlsrv_send_stream_data( $stmt)) {
      $i++;
}
echo "$i llamadas fueron realizadas.";
?&gt;

### Ver también

    - [sqlsrv_prepare()](#function.sqlsrv-prepare) - Prepara una consulta para su ejecución

    - [sqlsrv_query()](#function.sqlsrv-query) - Prepara y ejecuta una consulta

# sqlsrv_server_info

(No version information available, might only be in Git)

sqlsrv_server_info — Devuelve información sobre el servidor

### Descripción

**sqlsrv_server_info**([resource](#language.types.resource) $conn): [array](#language.types.array)

Devuelve información sobre el servidor.

### Parámetros

     conn


       El recurso de conexión que conecta el cliente y el servidor.





### Valores devueltos

Devuelve un array como se describe en la tabla siguiente:

  <caption>**Array devuelto**</caption>
   
    
     
      CurrentDatabase
      La base de datos conectada


      SQLServerVersion
      La versión del servidor SQL



      SQLServerName
      El nombre del servidor


### Ejemplos

    **Ejemplo #1 Ejemplo con sqlsrv_server_info()**

&lt;?php
$serverName = "serverName\sqlexpress";
$conn = sqlsrv_connect( $serverName);
if( $conn === false ) {
die( print_r( sqlsrv_errors(), true));
}

$server_info = sqlsrv_server_info( $conn);
if( $server_info )
{
    foreach( $server_info as $key =&gt; $value) {
       echo $key.": ".$value."&lt;br /&gt;";
}
} else {
die( print_r( sqlsrv_errors(), true));
}
?&gt;

### Ver también

    - [sqlsrv_client_info()](#function.sqlsrv-client-info) - Devuelve información sobre el cliente y la conexión especificada

## Tabla de contenidos

- [sqlsrv_begin_transaction](#function.sqlsrv-begin-transaction) — Inicia una transacción de base de datos
- [sqlsrv_cancel](#function.sqlsrv-cancel) — Cancela una sentencia de base de datos
- [sqlsrv_client_info](#function.sqlsrv-client-info) — Devuelve información sobre el cliente y la conexión especificada
- [sqlsrv_close](#function.sqlsrv-close) — Cierra una conexión abierta y libera los recursos asociados a la conexión
- [sqlsrv_commit](#function.sqlsrv-commit) — Consolida una transacción que se inició con sqlsrv_begin_transaction
- [sqlsrv_configure](#function.sqlsrv-configure) — Cambia la configuración de los drivers del gestionador de errores y de log
- [sqlsrv_connect](#function.sqlsrv-connect) — Establece una conexión con una base de datos Microsoft SQL Server
- [sqlsrv_errors](#function.sqlsrv-errors) — Devuelve información de errores y alertas (warnings) de la última operación SQLSRV realizada
- [sqlsrv_execute](#function.sqlsrv-execute) — Ejecuta una sentencia preparada con sqlsrv_prepare
- [sqlsrv_fetch](#function.sqlsrv-fetch) — Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado
- [sqlsrv_fetch_array](#function.sqlsrv-fetch-array) — Devuelve una fila como un array
- [sqlsrv_fetch_object](#function.sqlsrv-fetch-object) — Devuelve la siguiente fila de datos de un conjunto resultado como un objeto
- [sqlsrv_field_metadata](#function.sqlsrv-field-metadata) — Recupera los datos meta para los campos de una consulta preparada por la función
  sqlsrv_prepare o la función sqlsrv_query
- [sqlsrv_free_stmt](#function.sqlsrv-free-stmt) — Libera todos los recursos de la consulta especificada
- [sqlsrv_get_config](#function.sqlsrv-get-config) — Devuelve el valor de la configuración especificada
- [sqlsrv_get_field](#function.sqlsrv-get-field) — Recupera los datos del campo desde la línea actualmente seleccionada
- [sqlsrv_has_rows](#function.sqlsrv-has-rows) — Indica si la consulta especificada contiene filas
- [sqlsrv_next_result](#function.sqlsrv-next-result) — Activa el siguiente resultado de la consulta especificada
- [sqlsrv_num_fields](#function.sqlsrv-num-fields) — Recupera el número de campos (columnas) en una consulta
- [sqlsrv_num_rows](#function.sqlsrv-num-rows) — Recupera el número de filas de un conjunto de resultados
- [sqlsrv_prepare](#function.sqlsrv-prepare) — Prepara una consulta para su ejecución
- [sqlsrv_query](#function.sqlsrv-query) — Prepara y ejecuta una consulta
- [sqlsrv_rollback](#function.sqlsrv-rollback) — Anula una transacción que ha sido iniciada gracias a la función
  sqlsrv_begin_transaction
- [sqlsrv_rows_affected](#function.sqlsrv-rows-affected) — Devuelve el número de filas modificadas por la última consulta de tipo
  INSERT, UPDATE, o DELETE
- [sqlsrv_send_stream_data](#function.sqlsrv-send-stream-data) — Envía datos desde el flujo al servidor
- [sqlsrv_server_info](#function.sqlsrv-server-info) — Devuelve información sobre el servidor

- [Introducción](#intro.sqlsrv)
- [Instalación/Configuración](#sqlsrv.setup)<li>[Requerimientos](#sqlsrv.requirements)
- [Instalación](#sqlsrv.installation)
- [Configuración en tiempo de ejecución](#sqlsrv.configuration)
- [Tipos de recursos](#sqlsrv.resources)
  </li>- [Constantes predefinidas](#sqlsrv.constants)
- [SQLSRV Funciones](#ref.sqlsrv)<li>[sqlsrv_begin_transaction](#function.sqlsrv-begin-transaction) — Inicia una transacción de base de datos
- [sqlsrv_cancel](#function.sqlsrv-cancel) — Cancela una sentencia de base de datos
- [sqlsrv_client_info](#function.sqlsrv-client-info) — Devuelve información sobre el cliente y la conexión especificada
- [sqlsrv_close](#function.sqlsrv-close) — Cierra una conexión abierta y libera los recursos asociados a la conexión
- [sqlsrv_commit](#function.sqlsrv-commit) — Consolida una transacción que se inició con sqlsrv_begin_transaction
- [sqlsrv_configure](#function.sqlsrv-configure) — Cambia la configuración de los drivers del gestionador de errores y de log
- [sqlsrv_connect](#function.sqlsrv-connect) — Establece una conexión con una base de datos Microsoft SQL Server
- [sqlsrv_errors](#function.sqlsrv-errors) — Devuelve información de errores y alertas (warnings) de la última operación SQLSRV realizada
- [sqlsrv_execute](#function.sqlsrv-execute) — Ejecuta una sentencia preparada con sqlsrv_prepare
- [sqlsrv_fetch](#function.sqlsrv-fetch) — Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado
- [sqlsrv_fetch_array](#function.sqlsrv-fetch-array) — Devuelve una fila como un array
- [sqlsrv_fetch_object](#function.sqlsrv-fetch-object) — Devuelve la siguiente fila de datos de un conjunto resultado como un objeto
- [sqlsrv_field_metadata](#function.sqlsrv-field-metadata) — Recupera los datos meta para los campos de una consulta preparada por la función
  sqlsrv_prepare o la función sqlsrv_query
- [sqlsrv_free_stmt](#function.sqlsrv-free-stmt) — Libera todos los recursos de la consulta especificada
- [sqlsrv_get_config](#function.sqlsrv-get-config) — Devuelve el valor de la configuración especificada
- [sqlsrv_get_field](#function.sqlsrv-get-field) — Recupera los datos del campo desde la línea actualmente seleccionada
- [sqlsrv_has_rows](#function.sqlsrv-has-rows) — Indica si la consulta especificada contiene filas
- [sqlsrv_next_result](#function.sqlsrv-next-result) — Activa el siguiente resultado de la consulta especificada
- [sqlsrv_num_fields](#function.sqlsrv-num-fields) — Recupera el número de campos (columnas) en una consulta
- [sqlsrv_num_rows](#function.sqlsrv-num-rows) — Recupera el número de filas de un conjunto de resultados
- [sqlsrv_prepare](#function.sqlsrv-prepare) — Prepara una consulta para su ejecución
- [sqlsrv_query](#function.sqlsrv-query) — Prepara y ejecuta una consulta
- [sqlsrv_rollback](#function.sqlsrv-rollback) — Anula una transacción que ha sido iniciada gracias a la función
  sqlsrv_begin_transaction
- [sqlsrv_rows_affected](#function.sqlsrv-rows-affected) — Devuelve el número de filas modificadas por la última consulta de tipo
  INSERT, UPDATE, o DELETE
- [sqlsrv_send_stream_data](#function.sqlsrv-send-stream-data) — Envía datos desde el flujo al servidor
- [sqlsrv_server_info](#function.sqlsrv-server-info) — Devuelve información sobre el servidor
  </li>
