# Funciones IBM DB2, Cloudscape y Apache Derby

# Introducción

Estas funciones permiten el acceso a IBM DB2 Universal Database,
IBM Cloudscape y Apache Derby que utilizan
DB2 Call Level Interface (CLI).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ibm-db2.requirements)
- [Instalación](#ibm-db2.installation)
- [Configuración en tiempo de ejecución](#ibm-db2.configuration)
- [Tipos de recursos](#ibm-db2.resources)

    ## Requerimientos

    Para conectar a IBM DB2 Universal Database para Linux, Unix y Windows, o a
    IBM Cloudscape, o a Apache Derby, se debe instalar el cliente de IBM DB2
    Universal Database en el mismo equipo en que se ejecuta PHP. Esta extensión
    se ha desarrollado y probado con DB2 Version 8.2.

    Para conectar a IBM DB2 Universal Database en z/OS o iSeries, es necesario
    también IBM DB2 Connect o un software enrutador DRDA equivalente.

    ## Requisitos en Linux y Unix

    The user invoking the PHP executable or SAPI must specify the DB2 instance
    before accessing these functions. You can set the name of the DB2 instance
    in php.ini using the ibm_db2.instance_name
    configuration option, or you can source the DB2 instance profile before
    invoking the PHP executable.

    If you created a DB2 instance named db2inst1 in
    /home/db2inst1/, for example, you can add the
    following line to php.ini:

ibm_db2.instance_name=db2inst1

    If you do not set this option in php.ini, you must issue the
    following command to modify your environment variables to enable access to
    DB2:

bash$ source /home/db2inst1/sqllib/db2profile

    To enable your PHP-enabled Web server to access these functions, you must
    either set the ibm_db2.instance_name configuration
    option in php.ini, or source the DB2 instance environment in your Web
    server start script (typically /etc/init.d/httpd or
    /etc/init.d/apache).

## Instalación

Para compilar la extensión ibm_db2, los archivos de encabezado y de biblioteca
de la aplicación de desarrollo de DB2 deben estar presentes en el
sistema. DB2 no los instala por omisión, por lo que podría ser necesario volver
a la instalación de DB2 y añadir esta opción. El cliente de desarrollo de aplicación DB2
incluye los archivos de encabezado y está disponible libremente
para su descarga desde el [» sitio de soporte](https://www.ibm.com/developerworks/downloads/im/db2express/index.html)
de la base de datos universal.

Si los archivos de encabezado y de biblioteca de la aplicación de
desarrollo de DB2 se añaden en un sistema Linux o Unix donde DB2 ya está instalado,
el comando **db2iupdt -e** deberá ejecutarse para actualizar los enlaces simbólicos
hacia los archivos de encabezado y de biblioteca de las instancias DB2.

ibm_db2 es una extensión [» PECL](https://pecl.php.net/), por lo que se deben seguir
las instrucciones presentes en [Instalación de extensiones PECL](#install.pecl) para
instalar la extensión ibm_db2 para PHP. Ejecute el comando
**configure** para indicar la ubicación de los archivos
de encabezado y de biblioteca de DB2 de la siguiente manera:

bash$ ./configure --with-IBM_DB2=/ruta/versus/DB2

El comando **configure** toma el valor por omisión de
/opt/IBM/db2/V8.1.

**Nota**:
**Nota para los usuarios de IIS**

    Si el controlador ibm_db2 se utiliza con IIS (Microsoft Internet Information Server),
    podría ser necesario tomar las siguientes medidas:







     -
      Instalar DB2 con el sistema de seguridad extendido.


     -
      Añadir la ruta hacia el binario PHP a la variable de entorno
      PATH del sistema (Por omisión: C:\php\).


     -
      Crear otra variable de entorno que contenga la ruta hacia el archivo PHP.INI
      (p. ej.: PHPRC = C:\php\).


     -
      Añadir el usuario IUSR_COMPUTERNAME al grupo DB2USERS.


## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración DB2**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [ibm_db2.binmode](#ini.ibm-db2.binmode)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [ibm_db2.i5_all_pconnect](#ini.ibm-db2.i5-all-pconnect)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.6.5.



      [ibm_db2.i5_allow_commit](#ini.ibm-db2.i5-allow-commit)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.4.9.



      [ibm_db2.i5_blank_userid](#ini.ibm-db2.i5-blank-userid)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_char_trim](#ini.ibm-db2.i5-char-trim)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 2.1.0.



      [ibm_db2.i5_dbcs_alloc](#ini.ibm-db2.i5-dbcs-alloc)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.5.0.



      [ibm_db2.i5_guard_profile](#ini.ibm-db2.i5-guard-profile)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_ignore_userid](#ini.ibm-db2.i5-ignore-userid)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.8.0.



      [ibm_db2.i5_job_sort](#ini.ibm-db2.i5-job-sort)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.8.4.



      [ibm_db2.i5_log_verbose](#ini.ibm-db2.i5-log-verbose)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_max_pconnect](#ini.ibm-db2.i5-max-pconnect)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_override_ccsid](#ini.ibm-db2.i5-override-ccsid)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_servermode_subsystem](#ini.ibm-db2.i5-servermode-subsystem)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.i5_sys_naming](#ini.ibm-db2.i5-sys-naming)
      "0"
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.9.7.



      [ibm_db2.instance_name](#ini.ibm-db2.instance-name)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de ibm_db2 1.0.2.


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     ibm_db2.binmode
     ([int](#language.types.integer))



      Esta opción controla el modo utilizado para convertir desde o hacia
      los datos binarios en la aplicación PHP.



       -

         1 (DB2_BINARY)





       -

         2 (DB2_CONVERT)





       -

         3 (DB2_PASSTHRU)











     ibm_db2.i5_all_pconnect
     ([int](#language.types.integer))



      Esta opción fuerza todas las conexiones a ser persistentes en IBM i.
      Fundamentalmente, todas las llamadas a [db2_connect()](#function.db2-connect) se convierten
      automáticamente en llamadas a [db2_pconnect()](#function.db2-pconnect).
      Por omisión, esta opción es 0.
      Esta opción se proporciona por conveniencia en los casos donde las conexiones persistentes son más rápidas.
      No debería utilizarse en nuevas aplicaciones.



       -

         0 - Se pueden establecer conexiones persistentes y no persistentes.





       -

         1 - Todas las conexiones son persistentes.











     ibm_db2.i5_allow_commit
     [int](#language.types.integer)



      Esta opción controla el modo de aislamiento de la transacción utilizado.
      Por omisión, esta opción es 0, por lo que no se utiliza el control de compromiso.
      Esta opción puede ser reemplazada durante la conexión si la clave del array
      i5_commit está definida en el array de opciones de conexión
      pasado a [db2_connect()](#function.db2-connect) o
      [db2_pconnect()](#function.db2-pconnect).



       -

         0 - No se utiliza el control de compromiso.





       -

         1 - Lectura no comprometida, lectura sucia posible.





       -

         2 - Lectura comprometida, lectura sucia imposible.





       -

         3 - Lectura repetible, lectura sucia y lectura no repetible son imposibles.





       -

         4 - Serializable, lectura sucia, lectura no repetible y fantasma son imposibles.











     ibm_db2.i5_blank_userid
     [int](#language.types.integer)



      Esto controla si se debe permitir un identificador de usuario vacío en IBM i.
      Por omisión, esta opción es 0.
      A diferencia de ibm_db2.i5_ignore_userid, esta opción
      no fuerza a que todos los identificadores de usuario sean vacíos o a modificar el comportamiento del trabajo, sino
      que simplemente permite pasar un identificador de usuario vacío, para conectarse a Db2 como
      usuario actual.



       -

         0 - No permite pasar un identificador de usuario vacío.





       -

         1 - Permite pasar un identificador de usuario vacío.











     ibm_db2.i5_char_trim
     [int](#language.types.integer)



      Esta opción controla si se recorta el final de las cadenas en IBM i.
      Dado que muchas tablas utilizan tamaños de columnas fijos rellenos de espacios, esto se
      proporciona por conveniencia.
      Por omisión, esta opción es 0.



       -

         0 - Las columnas no se recortan.





       -

         1 - Los espacios al final de las columnas de caracteres devueltas se eliminan.











     ibm_db2.i5_dbcs_alloc
     ([int](#language.types.integer))



      Esta opción afecta a la estrategia de asignación de memoria de búfer interno en IBM i.
      Por omisión, esta opción es 0.
      Cuando esta opción está definida, los búferes se asignan con un tamaño mucho mayor,
      en caso de que la base de datos subestime el tamaño de una cadena durante la conversión
      entre codificaciones.
      Esta opción utiliza seis veces más memoria para los búferes (para tener en cuenta
      las secuencias UTF-8 más grandes posibles), pero puede ser necesaria si se devuelven datos truncados.



       -

         0 - Se asignan búferes de tamaño mínimo.





       -

         1 - Se asignan búferes de tamaño mayor.











     ibm_db2.i5_guard_profile
     [int](#language.types.integer)



      Esta opción verifica si el perfil de usuario de la base de datos ha sido cambiado durante
      la conexión a una conexión de base de datos persistente en IBM i, y si es así,
      se desconecta de la base de datos.
      Por omisión, esta opción está definida en 0.



       -

         0 - No verificar cambios de perfil.





       -

         1 - Verificar cambios de perfil y desconectarse en caso necesario.











     ibm_db2.i5_log_verbose
     [int](#language.types.integer)



      Esta opción define si los mensajes de diagnóstico SQL como advertencias y errores son
      siempre enviados al registro de errores PHP en IBM i.
      Normalmente, solo se envía un breve mensaje en caso de fallo (como "la ejecución
      de la sentencia falló") en el registro de errores PHP, ya que esta opción está definida en
      0 por omisión.
      Tenga en cuenta que siempre y cuando debe llamar, por ejemplo,
      [db2_stmt_errormsg()](#function.db2-stmt-errormsg) manualmente para verificar si
      las funciones fallan.



       -

         0 - Solo se registran mensajes breves.





       -

         1 - Se registra el mensaje de diagnóstico SQL además del mensaje breve.











     ibm_db2.i5_ignore_userid
     ([int](#language.types.integer))



      Esta opción ignora el ID de usuario al conectarse a la base de datos al
      ejecutarse en IBM i, y ejecuta la funcionalidad SQL/CLI dentro del trabajo PHP,
      en lugar de un trabajo separado.
      Por omisión, esta opción es 0.
      Cuando está activada, ya no utiliza un trabajo de servidor de base de datos separado, y
      siempre utiliza el perfil de usuario actual para la base de datos, ignorando el
      nombre de usuario y la contraseña pasados a [db2_connect()](#function.db2-connect) y
      [db2_pconnect()](#function.db2-pconnect).



       -

         0 : db2_(p)connect con un identificador de usuario y contraseña específicos
         0 - Utiliza las credenciales especificadas y utiliza un trabajo de servidor SQL/CLI.





       -

         1 : db2_(p)connect con un identificador de usuario y contraseña vacíos
         1 - Siempre utiliza credenciales vacías y ejecuta SQL/CLI en el trabajo PHP.











     ibm_db2.i5_job_sort
     [int](#language.types.integer)



      Controla la opción de ordenación de trabajos en IBM i.
      Por omisión, esta opción es 0.
      Esto corresponde al atributo SQL_ATTR_CONN_SORT_SEQUENCE
      de IBM i SQL/CLI.



       -

         0 - Utiliza la opción de ordenación **[*HEX](#constant.*hex)**, ordenando por bytes.





       -

         1 - Utiliza la secuencia de ordenación de trabajo definida para el trabajo PHP.





       -

         2 - Utiliza la secuencia de ordenación de trabajo definida para el trabajo de base de datos.











     ibm_db2.i5_max_pconnect
     [int](#language.types.integer)



      Esto afectará cuántas veces se puede reutilizar una conexión persistente
      al ejecutarse en IBM i.
      Por omisión, esto está configurado en 0, lo que significa que una conexión persistente siempre puede ser reutilizada.
      Esta opción puede ayudar a evitar problemas en un trabajo de base de datos
      de larga duración (es decir, si un procedimiento pierde memoria),
      pero obviamente no es una solución a largo plazo.







     ibm_db2.i5_override_ccsid
     [int](#language.types.integer)



      El CCSID PASE a utilizar para las conversiones de caracteres EBCDIC en IBM i.
      Por omisión, es 0, lo que seleccionará el CCSID de trabajo PASE por defecto,
      procedente de los parámetros de localización PASE.
      Por ejemplo, al configurarlo en 1208, se utilizará el UTF-8.
      Solo debe modificarse si el CCSID del trabajo PASE no es el CCSID esperado,
      y la localización no puede ser modificada.




      Para obtener más información sobre los CCSID en IBM i, consulte la
      [» documentación de IBM](https://www.ibm.com/docs/en/i/7.5?topic=information-ccsid-reference).
      Para saber cómo las localizaciones en IBM i PASE se mapean a los CCSID, consulte la
      [» documentación de IBM](https://www.ibm.com/docs/en/i/7.5?topic=ssw_ibm_i_75/apis/pase_locales.html).







     ibm_db2.i5_sys_naming
     [int](#language.types.integer)



      Esta opción controla el modo de nombrado al conectarse a un sistema IBM i.
      Por omisión, esta opción es 0.
      El modo de nombrado afecta a la resolución de nombres y la sintaxis permitida para
      los nombres.
      Cuando está configurado en 0, utiliza puntos para calificar los nombres y
      utiliza la biblioteca o el identificador de usuario por defecto para resolver los nombres.
      Cuando está configurado en 1, utiliza barras diagonales para calificar los nombres y
      utiliza la lista de bibliotecas de trabajo para resolver los nombres.



       -

         0 - Utiliza el modo de nombrado SQL ("SCHEMA.TABLE").





       -

         1 - Utiliza el modo de nombrado del sistema ("LIBRARY/FILE").








      Para obtener más información sobre los modos de nombrado en IBM i, consulte la
      [» documentación de IBM](https://www.ibm.com/docs/en/i/7.5?topic=application-naming-distributed-relational-database-objects).







     ibm_db2.i5_servermode-subsystem
     [string](#language.types.string)



      Esta opción modifica el subsistema bajo el cual se ejecutan los trabajos del servidor de base de datos en
      IBM i.
      Por omisión, esta opción es **[null](#constant.null)**, por lo que los trabajos se ejecutarán bajo el subsistema por defecto para los trabajos QSQSRVR.







     ibm_db2.instance_name
     [string](#language.types.string)



      En los sistemas operativos Linux y UNIX, esta opción define el nombre de la instancia a utilizar
      para las conexiones de base de datos catalogadas.
      Por omisión, esta opción es **[null](#constant.null)**.
      Si esta opción está definida, su valor reemplaza la configuración de la variable de entorno
      DB2INSTANCE.




      Esta opción se ignora en los sistemas operativos Windows.


## Tipos de recursos

La extensión ibm_db2 devuelve recursos de conexión, recursos de sentencias,
y recursos de juegos de resultados.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[DB2_BINARY](#constant.db2-binary)**
     ([int](#language.types.integer))



     Especifica que los datos binarios serán devueltos tal cual.
     Este es el modo por defecto.





    **[DB2_CONVERT](#constant.db2-convert)**
     ([int](#language.types.integer))



     Especifica que los datos binarios serán convertidos a hexadecimal y
     devueltos como una cadena ASCII.





    **[DB2_PASSTHRU](#constant.db2-passthru)**
     ([int](#language.types.integer))



     Especifica que los datos binarios serán convertidos a valor **[null](#constant.null)**.





    **[DB2_SCROLLABLE](#constant.db2-scrollable)**
     ([int](#language.types.integer))



     Especifica el cursor flotante para una declaración de recurso. Este
     modo permite un acceso aleatorio a las filas del juego de resultados, pero
     actualmente, solo es soportado por IBM DB2 Universal Database.





    **[DB2_FORWARD_ONLY](#constant.db2-forward-only)**
     ([int](#language.types.integer))



     Especifica un cursor de avance único para una declaración de recurso.
     Este es el valor por defecto de este tipo de cursor, y es
     soportado por todos los servidores de base de datos.





    **[DB2_PARAM_IN](#constant.db2-param-in)**
     ([int](#language.types.integer))



     Especifica que la variable PHP debe ser vinculada como un parámetro
     ENTRADA para un procedimiento de registro.





    **[DB2_PARAM_OUT](#constant.db2-param-out)**
     ([int](#language.types.integer))



     Especifica que la variable PHP debe ser vinculada como un parámetro
     SALIDA para un procedimiento de registro.





    **[DB2_PARAM_INOUT](#constant.db2-param-inout)**
     ([int](#language.types.integer))



     Especifica que la variable PHP debe ser vinculada como un parámetro
     ENTRADA/SALIDA para un procedimiento de registro.





    **[DB2_PARAM_FILE](#constant.db2-param-file)**
     ([int](#language.types.integer))



     Especifica que la columna debe ser vinculada directamente a un fichero para
     entrada.





    **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)**
     ([int](#language.types.integer))



     Especifica que autocommit debe ser activado.





    **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)**
     ([int](#language.types.integer))



     Especifica que autocommit debe ser desactivado.





    **[DB2_DOUBLE](#constant.db2-double)**
     ([int](#language.types.integer))



     Especifica que la variable debe ser vinculada a un tipo DOUBLE, FLOAT o REAL.





    **[DB2_LONG](#constant.db2-long)**
     ([int](#language.types.integer))



     Especifica que la variable debe ser vinculada a un tipo SMALLINT, INTEGER o
     BIGINT.





    **[DB2_CHAR](#constant.db2-char)**
     ([int](#language.types.integer))



     Especifica que la variable debe ser vinculada a un tipo CHAR o VARCHAR





    **[DB2_CASE_NATURAL](#constant.db2-case-natural)**
    ([int](#language.types.integer))



     Especifica que los nombres de columnas deben ser devueltos en sus casos naturales.





    **[DB2_CASE_LOWER](#constant.db2-case-lower)**
    ([int](#language.types.integer))



     Especifica que los nombres de columnas deben ser devueltos en minúsculas.





    **[DB2_CASE_UPPER](#constant.db2-case-upper)**
    ([int](#language.types.integer))



     Especifica que los nombres de columnas deben ser devueltos en mayúsculas.





    **[DB2_DEFERRED_PREPARE_ON](#constant.db2-deferred-prepare-on)**
     ([int](#language.types.integer))



     Especifica que la preparación diferida debe ser activada para el recurso de consulta especificado.





    **[DB2_DEFERRED_PREPARE_OFF](#constant.db2-deferred-prepare-off)**
     ([int](#language.types.integer))



     Especifica que la preparación diferida debe ser desactivada para el recurso de consulta especificado.

# Funciones de IBM DB2

# db2_autocommit

(PECL ibm_db2 &gt;= 1.0.0)

db2_autocommit —
Devuelve o modifica el estado AUTOCOMMIT de la conexión a la base de datos

### Descripción

**db2_autocommit**([resource](#language.types.resource) $connection, [int](#language.types.integer) $value = ?): [int](#language.types.integer)|[bool](#language.types.boolean)

Modifica o lee el comportamiento de AUTOCOMMIT de la conexión especificada.

### Parámetros

     connection


       Una variable de conexión a una base de datos válida devuelta por
       [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).






     value


       Una de las constantes siguientes :




         **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)**


           Desactiva AUTOCOMMIT.






         **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)**


           Activa AUTOCOMMIT.









### Valores devueltos

Cuando **db2_autocommit()** recibe solo
connection como argumento, la función devuelve
un entero representando el estado actual de AUTOCOMMIT de la conexión proporcionada.
Un valor de **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)** indica que AUTOCOMMIT
está desactivado, mientras que un valor de **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)**
indica que AUTOCOMMIT está activado.

Cuando **db2_autocommit()** recibe ambos argumentos
connection y autocommit,
la función intenta modificar el estado AUTOCOMMIT al estado
autocommit de la conexión proporcionada.
Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Obtención del valor de AUTOCOMMIT para una conexión**



     En el siguiente ejemplo, se prueba una conexión que fue inicializada con el estado AUTOCOMMIT
     desactivado utilizando la función **db2_autocommit()**.

&lt;?php
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF);
$conn = db2_connect($database, $user, $password, $options);
$ac = db2_autocommit($conn);
if ($ac == DB2_AUTOCOMMIT_OFF) {
print "$ac -- AUTOCOMMIT está desactivado.";
} else {
    print "$ac -- AUTOCOMMIT está activado.";
}
?&gt;

    El ejemplo anterior mostrará:

0 -- AUTOCOMMIT está desactivado.

    **Ejemplo #2 Modificación del valor de AUTOCOMMIT para una conexión**



     En el siguiente ejemplo, se cambia el comportamiento de una conexión que fue previamente inicializada con
     el estado AUTOCOMMIT desactivado al activar el estado AUTOCOMMIT.

&lt;?php
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF);
$conn = db2_connect($database, $user, $password, $options);

// Activa AUTOCOMMIT
$rc = db2_autocommit($conn, DB2_AUTOCOMMIT_ON);
if ($rc) {
print "Activación AUTOCOMMIT exitosa.\n";
}

// Verificación del estado AUTOCOMMIT
$ac = db2_autocommit($conn);
if ($ac == DB2_AUTOCOMMIT_OFF) {
    print "$ac -- AUTOCOMMIT está desactivado.";
} else {
print "$ac -- AUTOCOMMIT está activado.";
}
?&gt;

    El ejemplo anterior mostrará:

Activación AUTOCOMMIT exitosa.
1 -- AUTOCOMMIT está activado.

### Ver también

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

# db2_bind_param

(PECL ibm_db2 &gt;= 1.0.0)

db2_bind_param —
Asocia una variable PHP a un parámetro de una consulta SQL

### Descripción

**db2_bind_param**(
    [resource](#language.types.resource) $stmt,
    [int](#language.types.integer) $parameter_number,
    [string](#language.types.string) $variable_name,
    [int](#language.types.integer) $parameter_type = **[DB2_PARAM_IN](#constant.db2-param-in)**,
    [int](#language.types.integer) $data_type = 0,
    [int](#language.types.integer) $precision = -1,
    [int](#language.types.integer) $scale = 0
): [bool](#language.types.boolean)

Asocia una variable PHP a un parámetro en la consulta SQL
devuelta por [db2_prepare()](#function.db2-prepare). Esta función permite
mayor control sobre los tipos de los parámetros, los tipos de datos, la
precisión y la escala para el parámetro que al pasarle simplemente una
variable dentro del array de entrada opcional de la función
[db2_execute()](#function.db2-execute).

### Parámetros

     stmt


       Una consulta preparada devuelta por [db2_prepare()](#function.db2-prepare).






     parameter_number


       Especifica la posición del parámetro comenzando en el índice 1 en la
       consulta preparada.






     variable_name


       Una cadena que especifica el nombre de la variable PHP a asociar al
       parámetro especificado por parameter_number.






     parameter_type


       Una constante que especifica si la variable PHP debe ser asociada al
       parámetro SQL como parámetro de entrada
       (**[DB2_PARAM_IN](#constant.db2-param-in)**), como parámetro de salida
       (**[DB2_PARAM_OUT](#constant.db2-param-out)**) o como parámetro que acepta
       entradas y salidas (**[DB2_PARAM_INOUT](#constant.db2-param-inout)**).
       Para evitar un exceso de consumo de memoria, también puede especificarse
       **[DB2_PARAM_FILE](#constant.db2-param-file)** para asociar la variable PHP al
       nombre del archivo que contiene los datos del objeto grande (BLOB, CLOB o
       DBCLOB).






     data_type


       Una constante que especifica el tipo de datos SQL que la variable PHP
       debe ser asociada. El parámetro debe tomar uno de los siguientes valores:
       **[DB2_BINARY](#constant.db2-binary)**, **[DB2_CHAR](#constant.db2-char)**,
       **[DB2_DOUBLE](#constant.db2-double)** o **[DB2_LONG](#constant.db2-long)**.






     precision


       Especifica la precisión con la que la variable debe ser asociada a
       la base de datos. Este parámetro también puede ser utilizado para
       recuperar valores de salida XML para procedimientos almacenados.
       Un valor no negativo especifica el tamaño máximo de los datos XML
       que serán recuperados desde la base de datos. Si este parámetro no es
       utilizado, se definirá un tamaño por defecto de 1 MB para recuperar
       los valores de tipo XML desde el procedimiento almacenado.






     scale


       Especifica la escala con la que la variable debe ser asociada a la
       base de datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Asociación de variables PHP a una consulta preparada**



     La consulta SQL en el siguiente ejemplo utiliza dos parámetros de entrada
     en la sección WHERE. Se llama a **db2_bind_param()**
     para asociar dos variables que no han sido declaradas o asignadas
     antes de la llamada a **db2_bind_param()**; en este ejemplo,
     $lower_limit es asignada antes de ser llamada a
     **db2_bind_param()**, pero $upper_limit
     es asignada después de la llamada a **db2_bind_param()**. Las
     variables deben ser asociadas y, para los parámetros que aceptan entradas,
     se les debe asignar un valor antes de llamar a [db2_execute()](#function.db2-execute).

&lt;?php

$sql = 'SELECT nom, race, poids FROM animaux
    WHERE poids &gt; ? AND poids &lt; ?';
$conn = db2_connect($database, $user, $password);
$stmt = db2_prepare($conn, $sql);

// Se puede declarar la variable antes de llamar a db2_bind_param()
$lower_limit = 1;

db2_bind_param($stmt, 1, "lower_limit", DB2_PARAM_IN);
db2_bind_param($stmt, 2, "upper_limit", DB2_PARAM_IN);

// También se puede declarar la variable después de llamar a db2_bind_param()
$upper_limit = 15.0;

if (db2_execute($stmt)) {
    while ($row = db2_fetch_array($stmt)) {
        print "{$row[0]}, {$row[1]}, {$row[2]}\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

Pook, chat, 3.2
Rickety Ride, chèvre, 9.7
Peaches, chien, 12.3

    **Ejemplo #2 Llamada a procedimientos de registro con parámetros IN y OUT**



     El procedimiento de registro concorde_animal en el siguiente ejemplo
     acepta tres diferentes parámetros:



      -

        un parámetro de entrada (IN) que acepta el nombre del primer animal en
        entrada





      -

        un parámetro de entrada-salida (INOUT) que acepta el nombre del segundo
        animal en entrada y devuelve un [string](#language.types.string) TRUE si un
        animal en la base de datos coincide con este nombre





      -

        un parámetro de salida (OUT) que devuelve la suma de los pesos de los dos
        animales identificados






     Además, el procedimiento de registro devuelve un conjunto de resultados
     que contiene los animales listados en orden alfabético comenzando con
     el animal correspondiente al valor de entrada del primer parámetro y
     terminando con el animal correspondiente al valor de entrada del segundo
     parámetro.

&lt;?php

$sql = 'CALL concorde_animal(?, ?, ?)';
$conn = db2_connect($database, $user, $password);
$stmt = db2_prepare($conn, $sql);

$nom = "Peaches";
$second_nom = "Rickety Ride";
$poids = 0;

db2_bind_param($stmt, 1, "nom", DB2_PARAM_IN);
db2_bind_param($stmt, 2, "second_nom", DB2_PARAM_INOUT);
db2_bind_param($stmt, 3, "poids", DB2_PARAM_OUT);

print "Valores de los parámetros _antes_ de CALL :\n";
print " 1: {$nom} 2: {$second_nom} 3: {$poids}\n\n";

if (db2*execute($stmt)) {
print "Valores de los parámetros \_después* de CALL :\n";
print " 1: {$nom} 2: {$second_nom} 3: {$poids}\n\n";

    print "Resultados :\n";
    while ($row = db2_fetch_array($stmt)) {
        print "  {$row[0]}, {$row[1]}, {$row[2]}\n";
    }

}
?&gt;

    El ejemplo anterior mostrará:

Valores de los parámetros _antes_ de CALL :
1: Peaches 2: Rickety Ride 3: 0

Valores de los parámetros _después_ de CALL :
1: Peaches 2: TRUE 3: 22

Resultados :
Peaches, chien, 12.3
Pook, chat, 3.2
Rickety Ride, chèvre, 9.7

    **Ejemplo #3 Inserción de un objeto grande binario (BLOB) directamente desde un archivo**



     Los datos para los objetos grandes normalmente se almacenan en archivos,
     como documentos XML o archivos de audio. En lugar de leer el archivo
     completo en una variable de PHP y luego asociar la variable PHP en la
     consulta SQL, se puede evitar cierto sobrecoste de memoria asociando el
     archivo directamente al parámetro de entrada de su consulta SQL. El
     siguiente ejemplo demuestra cómo asociar un archivo directamente en una
     columna BLOB.

&lt;?php
$stmt = db2_prepare($conn, "INSERT INTO animal_pictures(photo) VALUES (?)");

$picture = "/opt/albums/spook/grooming.jpg";
$rc = db2_bind_param($stmt, 1, "picture", DB2_PARAM_FILE);
$rc = db2_execute($stmt);
?&gt;

### Ver también

    - [db2_execute()](#function.db2-execute) - Ejecuta una consulta SQL preparada

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

# db2_client_info

(PECL ibm_db2 &gt;= 1.1.1)

db2_client_info — Devuelve un objeto con propiedades que describen el cliente de base de datos DB2

### Descripción

**db2_client_info**([resource](#language.types.resource) $connection): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Esta función devuelve un objeto con propiedades en solo lectura que
proporcionan información sobre el cliente de base de datos DB2. La tabla
siguiente lista las propiedades del cliente DB2:

    <caption>**Propiedades del cliente DB2**</caption>



       Nombre Propiedad
       Tipo de retorno
       Descripción






       APPL_CODEPAGE
       [int](#language.types.integer)
       La aplicación es un código de página.



       CONN_CODEPAGE
       [int](#language.types.integer)
       El código de página para la conexión actual.



       DATA_SOURCE_NAME
       [string](#language.types.string)
       El nombre de la fuente de datos (DSN) utilizado para crear la conexión
        actual a la base de datos.



       DRIVER_NAME
       [string](#language.types.string)
       El nombre de la biblioteca que implementa la especificación
        DB2 Call Level Interface (CLI).



       DRIVER_ODBC_VER
       [string](#language.types.string)
       La versión de ODBC que el cliente DB2 soporta. Esto devuelve una
        [string](#language.types.string) "MM.mm" donde MM es la versión mayor y
        mm es la versión menor. El cliente DB2 siempre devuelve
        "03.51".




       DRIVER_VER
       [string](#language.types.string)
       La versión del cliente, en la forma de una [string](#language.types.string) "MM.mm.uuuu"
        donde MM es la versión mayor, mm
        es la versión menor y uuuu es la actualización.
        Por ejemplo, "08.02.0001" representa la versión mayor 8, la versión
        menor 2, y la actualización 1.




       ODBC_SQL_CONFORMANCE
       [string](#language.types.string)

        El nivel de sintaxis soportado por el cliente:




           MINIMUM


             Soporta el mínimo de sintaxis SQL de ODBC.






           CORE


             Soporta el núcleo de sintaxis SQL de ODBC.






           EXTENDED


             Soporta la sintaxis extendida SQL de ODBC.











       ODBC_VER
       [string](#language.types.string)
       La versión de ODBC que el administrador de controladores ODBC soporta.
        Esto devuelve una [string](#language.types.string) "MM.mm.rrrr" donde MM es la
        versión mayor, mm es la versión menor y
        rrrr es la actualización. El cliente DB2 siempre devuelve
        "03.01.0000".





### Parámetros

     connection


       Especifica la conexión cliente DB2 activa.





### Valores devueltos

Devuelve un objeto si la llamada es exitosa, o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_client_info()**



     Para obtener información sobre el cliente, se debe pasar un recurso de conexión
     de base de datos válido a la función **db2_client_info()**.

&lt;?php
$conn = db2_connect( 'SAMPLE', 'db2inst1', 'ibmdb2' );
$client = db2_client_info( $conn );

if ($client) {
    echo "DRIVER_NAME: ";   var_dump( $client-&gt;DRIVER_NAME );
    echo "DRIVER_VER: ";   var_dump( $client-&gt;DRIVER_VER );
    echo "DATA_SOURCE_NAME: ";   var_dump( $client-&gt;DATA_SOURCE_NAME );
    echo "DRIVER_ODBC_VER: ";   var_dump( $client-&gt;DRIVER_ODBC_VER );
    echo "ODBC_VER: ";    var_dump( $client-&gt;ODBC_VER );
    echo "ODBC_SQL_CONFORMANCE: ";  var_dump( $client-&gt;ODBC_SQL_CONFORMANCE );
    echo "APPL_CODEPAGE: ";   var_dump( $client-&gt;APPL_CODEPAGE );
    echo "CONN_CODEPAGE: ";   var_dump( $client-&gt;CONN_CODEPAGE );
}
else {
    echo "Error al obtener la información del cliente.
     Quizás su conexión a la base de datos era inválida.";
}
db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

DRIVER_NAME: string(8) "libdb2.a"
DRIVER_VER: string(10) "08.02.0001"
DATA_SOURCE_NAME: string(6) "SAMPLE"
DRIVER_ODBC_VER: string(5) "03.51"
ODBC_VER: string(10) "03.01.0000"
ODBC_SQL_CONFORMANCE: string(8) "EXTENDED"
APPL_CODEPAGE: int(819)
CONN_CODEPAGE: int(819)

### Ver también

    - [db2_server_info()](#function.db2-server-info) - Devuelve un objeto con propiedades que describen el servidor de base de datos DB2

# db2_close

(PECL ibm_db2 &gt;= 1.0.0)

db2_close —
Cierra una conexión a base de datos

### Descripción

**db2_close**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Esta función cierra una conexión cliente DB2 creada con
[db2_connect()](#function.db2-connect) y devuelve el recurso correspondiente
al servidor de base de datos.

Si se tratara de cerrar una conexión de cliente DB2 persistente creada con
[db2_pconnect()](#function.db2-pconnect), la petición de cierre se ignoraría y la conexión
de cliente DB2 permanecería disponibel para la siguiente llmada.

### Parámetros

     connection


        Especifica la conexión a cliente DB2 activa.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cierre de una conexión**



     El siguiente ejemplo demuestra un intento de cierre exitoso de una conexión
     a una base de datos IBM DB2, Cloudscape, o Apache Derby.

&lt;?php
$conn = db2_connect('SAMPLE', 'db2inst1', 'ibmdb2');
$rc = db2_close($conn);
if ($rc) {
echo "Conexión cerrada con éxito.";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión cerrada con éxito.

### Ver también

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_pclose()](#function.db2-pclose) - Cierra una conexión persistente a la base de datos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

# db2_column_privileges

(PECL ibm_db2 &gt;= 1.0.0)

db2_column_privileges —
Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

### Descripción

**db2_column_privileges**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table_name = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $column_name = **[null](#constant.null)**
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una
tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos,
       pase **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. Para coincidir con todos los
       esquemas, pase **[null](#constant.null)** o una cadena vacía.






     table_name


       El nombre de la tabla. Para obtener todas las tablas en la base de
       datos, pase **[null](#constant.null)** o una cadena vacía.






     column_name


       El nombre de la columna. Para obtener todas las columnas de la tabla,
       pase **[null](#constant.null)** o una cadena vacía.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen los privilegios de las columnas que coinciden con los parámetros
especificados. Las filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo. El valor es **[null](#constant.null)** si la tabla no posee
       catálogo.



       TABLE_SCHEM
       Nombre del esquema.



       TABLE_NAME
       Nombre de la tabla.



       COLUMN_NAME
       Nombre de la columna.



       GRANTOR
       ID de autorización del usuario que concedió el privilegio.



       GRANTEE
       ID de autorización del usuario al que se le concedió el privilegio.



       PRIVILEGE
       El privilegio para la columna.



       IS_GRANTABLE
       Si GRANTEE está permitido para conceder este privilegio a otros
       usuarios.




### Ver también

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_columns

(PECL ibm_db2 &gt;= 1.0.0)

db2_columns —
Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

### Descripción

**db2_columns**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table_name = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $column_name = **[null](#constant.null)**
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una
tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos, se debe pasar
       **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. Para coincidir con todos los
       esquemas, se debe pasar '%'.






     table_name


       El nombre de la tabla. Para obtener todas las tablas en la base de
       datos, se debe pasar **[null](#constant.null)** o una cadena vacía.






     column_name


       El nombre de la columna. Para obtener todas las columnas de la tabla,
       se debe pasar **[null](#constant.null)** o una cadena vacía.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen los privilegios de las columnas que coinciden con los parámetros
especificados. Las filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo. El valor es **[null](#constant.null)** si la tabla no posee
       catálogo.



       TABLE_SCHEM
       Nombre del esquema.



       TABLE_NAME
       Nombre de la tabla.



       COLUMN_NAME
       Nombre de la columna.



       DATA_TYPE
       El tipo de datos SQL para la columna, representado como un
       integer.



       TYPE_NAME
       Una cadena que representa el tipo de datos para la columna.



       COLUMN_SIZE
       Un integer que representa el tamaño de la columna.



       BUFFER_LENGTH
       Número máximo de bytes necesarios para almacenar datos de esta
       columna.



       DECIMAL_DIGITS
       La escala de la columna o **[null](#constant.null)** donde la escala no es
       aplicable.



       NUM_PREC_RADIX
       Un integer que puede ser 10 (que representa un
       tipo de datos numérico exacto), 2 (que representa un
       tipo de datos numéricos aproximado) o **[null](#constant.null)** (que representa un tipo
       de datos para el cual la base no es aplicable).



       NULLABLE
       Un integer que representa si la columna puede ser nula o no.



       REMARKS
       Descripción de la columna.



       COLUMN_DEF
       Valor por defecto de la columna.



       SQL_DATA_TYPE
       Un integer que representa el tamaño de la columna.



       SQL_DATETIME_SUB
       Devuelve un integer que representa un código de subtipo
       datetime o
       **[null](#constant.null)** si los tipos de datos SQL no aplican.



       CHAR_OCTET_LENGTH
       Tamaño máximo en bytes para los tipos de datos de carácter de la
       columna, que coincide con COLUMN_SIZE para un solo byte de datos o
       **[null](#constant.null)** para un tipo de datos que no son caracteres.



       ORDINAL_POSITION
       La posición de la columna comenzando desde 1 en la tabla.



       IS_NULLABLE
       Una cadena cuyo valor es 'YES' significa que la columna es nula y
       'NO' significa que la columna no puede ser nula.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_commit

(PECL ibm_db2 &gt;= 1.0.0)

db2_commit —
Confirmar una transacción

### Descripción

**db2_commit**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Confirma una transacción en progreso en la conexión especificada e
inicia una nueva transacción. Las aplicaciones en PHP normalmente confirman las transacciones automáticamente
debido a que el modo AUTOCOMMIT por defecto está activado, por lo que el uso de
**db2_commit()** no es necesario a menos que el modo AUTOCOMMIT
haya sido desactivado en la conexión especificada.

### Parámetros

     connection


       Es la conexión válida devuelta por
       [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** en caso de error.

### Ver también

    - [db2_autocommit()](#function.db2-autocommit) - Devuelve o modifica el estado AUTOCOMMIT de la conexión a la base de datos

    - [db2_rollback()](#function.db2-rollback) - Cancelar una transacción

# db2_conn_error

(PECL ibm_db2 &gt;= 1.0.0)

db2_conn_error —
Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento
de conexión

### Descripción

**db2_conn_error**([?](#language.types.null)[resource](#language.types.resource) $connection = **[null](#constant.null)**): [string](#language.types.string)

**db2_conn_error()** devuelve el valor de SQLSTATE
que representa la razón por la cual el último intento de conexión a
la base de datos ha fallado. Cuando [db2_connect()](#function.db2-connect)
devuelve **[false](#constant.false)** en caso de un intento de conexión fallido, no se debe
pasar ningún argumento a **db2_conn_error()** para obtener el
valor de SQLSTATE.

Si por el contrario la conexión fue exitosa pero se ha vuelto inválida con el
tiempo, se puede pasar el argumento de conexión
connection para obtener el valor de SQLSTATE para la
conexión específica.

Para entender los valores de SQLSTATE, se puede ingresar el siguiente comando
en el procesador de línea de comandos de DB2:
**db2 '? sqlstate-value'**. También
se puede llamar a la función [db2_conn_errormsg()](#function.db2-conn-errormsg)
para obtener un mensaje de error explícito junto con el valor de SQLCODE asociado.

### Parámetros

     connection


       Un recurso de conexión asociado a la conexión que
       previamente fue exitosa, pero que se ha vuelto inválida con el tiempo.





### Valores devueltos

Devuelve el valor de SQLSTATE resultante de un intento de
conexión fallido. Devuelve un string vacío si no hay error asociado con
el último intento de conexión.

### Ejemplos

    **Ejemplo #1 Obtención del valor de SQLSTATE para un intento de conexión fallido**



     El siguiente ejemplo muestra cómo devolver un valor de SQLSTATE después de
     pasar un argumento inválido a la función
     [db2_connect()](#function.db2-connect).

&lt;?php
$conn = db2_connect('mauvaisnom', 'mauvaisutilisateur', 'mauvaismotdepasse');
if (!$conn) {
print "Valor de SQLSTATE: " . db2_conn_error();
}
?&gt;

    El ejemplo anterior mostrará:

Valor de SQLSTATE: 08001

### Ver también

    - [db2_conn_errormsg()](#function.db2-conn-errormsg) - Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_stmt_error()](#function.db2-stmt-error) - Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL

    - [db2_stmt_errormsg()](#function.db2-stmt-errormsg) - Devuelve el último mensaje de error de una consulta SQL

# db2_conn_errormsg

(PECL ibm_db2 &gt;= 1.0.0)

db2_conn_errormsg —
Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE

### Descripción

**db2_conn_errormsg**([?](#language.types.null)[resource](#language.types.resource) $connection = **[null](#constant.null)**): [string](#language.types.string)

**db2_conn_errormsg()** devuelve un mensaje de error y el
valor de SQLCODE que representa la razón por la cual el último intento
de conexión a la base de datos ha fallado. Cuando
[db2_connect()](#function.db2-connect) devuelve **[false](#constant.false)** en caso de un intento de
conexión fallido, no se debe pasar ningún argumento a
**db2_conn_errormsg()** para obtener el mensaje de error y
el valor de SQLCODE.

Si, por el contrario, la conexión fue exitosa pero se ha vuelto inválida con
el tiempo, puede pasarse el argumento de conexión
connection para obtener el mensaje de error y el valor
de SQLCODE para la conexión específica.

### Parámetros

     connection


        Un recurso de conexión asociado a la conexión que previamente fue
        exitosa, pero que se ha vuelto inválida con el tiempo.






### Valores devueltos

Devuelve una cadena que contiene el mensaje de error y el valor de SQLCODE
resultante de un intento de conexión fallido. Devuelve una cadena vacía
si no hay error asociado con el último intento de conexión.

### Ejemplos

    **Ejemplo #1 Obtención del mensaje de error devuelto por un intento de conexión fallido**



     El siguiente ejemplo muestra cómo devolver un mensaje de error junto con
     el valor de SQLCODE después de pasar un argumento inválido a la función
     [db2_connect()](#function.db2-connect).

&lt;?php
$conn = db2_connect('mauvaisnom', 'mauvaisutilisateur', 'mauvaismotdepasse');
if (!$conn) {
print db2_conn_errormsg();
}
?&gt;

    El ejemplo anterior mostrará:

[IBM][CLI Driver] SQL1013N The database alias name
or database name "MAUVAISNOM" could not be found. SQLSTATE=42705
SQLCODE=-1013

### Ver también

    - [db2_conn_error()](#function.db2-conn-error) - Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento

de conexión

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_stmt_error()](#function.db2-stmt-error) - Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL

    - [db2_stmt_errormsg()](#function.db2-stmt-errormsg) - Devuelve el último mensaje de error de una consulta SQL

# db2_connect

(PECL ibm_db2 &gt;= 1.0.0)

db2_connect —
Devuelve una conexión a una base de datos

### Descripción

**db2_connect**(
    [string](#language.types.string) $database,
    [?](#language.types.null)[string](#language.types.string) $username,
    [?](#language.types.null)[string](#language.types.string) $password,
    [array](#language.types.array) $options = []
): [resource](#language.types.resource)|[false](#language.types.singleton)

Crea una nueva conexión a una base de datos IBM DB2 Universal
Database, IBM Cloudscape o Apache Derby.

### Parámetros

     database


       Para una conexión catalogada de la base de datos, database
       representa el alias de la base de datos en el catálogo cliente DB2




       Para una conexión no catalogada de la base de datos, database
       representa una cadena completa de conexión que está en el formato
       siguiente :


DATABASE=database;HOSTNAME=hostname;PORT=port;PROTOCOL=TCPIP;UID=username;PWD=password;
**Nota**:

         Al conectarse a Db2 en IBM i, las llamadas al sistema subyacentes
         [» SQLDriverConnect](https://www.ibm.com/docs/en/i/7.5?topic=functions-sqldriverconnect-connect-data-source),
         solo aceptan DSN, UID y PWD para la
         [» cadena de conexión](https://www.ibm.com/docs/en/i/7.5?topic=functions-sqldriverconnect-connect-data-source#rzadpfndvcon__title__5).
         Como sigue :


DSN=database;UID=username;PWD=password;

       donde los parámetros representan los siguientes valores :


         database


           El nombre de la base de datos.






         hostname


           La dirección Internet o IP del servidor de base de datos.






         port


           El puerto TCP/IP en el que la base de datos escucha las
           conexiones.






         username


           El nombre de usuario con el que se conecta a la base de
           datos.






         password


           La contraseña con la que se conecta a la base de
           datos.










     username


       El nombre de usuario con el que se conecta a la base de
       datos.




       Para las conexiones no catalogadas, debe pasar un valor
       **[null](#constant.null)** o una cadena vacía.






     password


       La contraseña con la que se conecta a la base de
       datos.




       Para las conexiones no catalogadas, debe pasar un valor
       **[null](#constant.null)** o una cadena vacía.






     options


       Un array asociativo de opciones de conexión que afectarán el
       comportamiento de la conexión, donde los valores de las claves incluyen :




         autocommit


           El valor **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)** activa el autocommit
           en esta conexión.




           El valor **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)** desactiva el
           autocommit para esta conexión.






         DB2_ATTR_CASE


           Pasar el valor **[DB2_CASE_NATURAL](#constant.db2-case-natural)** especifica que los
           nombres de columnas serán devueltos en sus casos naturales.




           Pasar el valor **[DB2_CASE_LOWER](#constant.db2-case-lower)** especifica que los
           nombres de columnas serán devueltos en minúsculas.




           Pasar el valor **[DB2_CASE_UPPER](#constant.db2-case-upper)** especifica que los
           nombres de columnas serán devueltos en mayúsculas.






         CURSOR


           Pasar el valor **[DB2_FORWARD_ONLY](#constant.db2-forward-only)** especifica un cursor
           solo hacia adelante para un recurso de consulta. Este es el tipo de cursor
           por defecto y es soportado en todos los servidores de base de datos.




           Pasar el valor **[DB2_SCROLLABLE](#constant.db2-scrollable)** especifica un
           cursor desplazable para un recurso de consulta. Este modo permite
           un acceso aleatorio a las filas en un conjunto de resultados, pero actualmente,
           solo es soportado por la base de datos IBM DB2 Universal.








       La siguiente nueva opción está disponible para las versiones ibm_db2 1.7.0 y
       posteriores.




         trustedcontext


           Pasar el valor DB2_TRUSTED_CONTEXT_ENABLE activa el contexto para este gestor de conexión. Este parámetro no puede ser definido con la función [db2_set_option()](#function.db2-set-option).




           Esta clave solo funciona si la base de datos está catalogada
           (incluso si la base de datos es local), o si se especifica el DSN completo
           al crear la conexión.




           Para catalogar la base de datos, utilice los siguientes comandos :






db2 catalog tcpip node loopback remote &lt;SERVERNAME&gt; server &lt;SERVICENAME&gt;
db2 catalog database &lt;LOCALDBNAME&gt; as &lt;REMOTEDBNAME&gt; at node loopback
db2 "update dbm cfg using svcename &lt;SERVICENAME&gt;"
db2set DB2COMM=TCPIP

       Las siguientes nuevas opciones i5/OS están disponibles en las versiones
       ibm_db2 1.5.1 y posteriores.




         i5_lib


           Un carácter que indica la biblioteca por defecto que será
           utilizada para resolver las referencias a los ficheros no calificados.
           Esto no es válido si la conexión utiliza un modo de sistema de
           nombres.






         i5_naming


           El valor DB2_I5_NAMING_ON activa el modo sistema de nombres DB2 UDB CLI
           iSeries. Los ficheros son calificados utilizando el delimitador barra (/). Los ficheros no calificados son
           resueltos utilizando la lista de bibliotecas para el trabajo.




           El valor DB2_I5_NAMING_OFF desactiva el modo de nombres por defecto de DB2 UDB
           CLI, que es la escritura SQL. Los ficheros son calificados utilizando el delimitador punto (.). Los ficheros
           no calificados son resueltos utilizando la biblioteca por defecto o el ID del usuario actual.






         i5_commit


           El atributo i5_commit debe ser fijado antes
           de la llamada a **db2_connect()**. Si el valor es
           cambiado después de que la conexión haya sido establecida y la conexión
           es a una fuente de datos remota, el cambio solo tendrá efecto en la próxima
           llamada a **db2_connect()**.



          **Nota**:



            La configuración php.ini ibm_db2.i5_allow_commit==0
            o DB2_I5_TXN_NO_COMMIT es por defecto, pero
            puede ser derivada con la opción i5_commit.





           DB2_I5_TXN_NO_COMMIT : no se utiliza el control de envío.




           DB2_I5_TXN_READ_UNCOMMITTED : lectura antigua,
           lectura no repetitiva y ficticia es posible.




           DB2_I5_TXN_READ_COMMITTED : lectura antigua no
           posible. La lectura repetitiva y ficticia es posible.




           DB2_I5_TXN_REPEATABLE_READ : lectura antigua y
           no repetitiva no es posible. Lectura ficticia es posible.




           DB2_I5_TXN_SERIALIZABLE : las transacciones son
           serializadas. Lectura antigua, no repetitiva y ficticia no es
           posible.






         i5_query_optimize


            DB2_FIRST_IO Todas las consultas son
            optimizadas con el objetivo de devolver la primera página tan rápido
            como sea posible. Este objetivo funciona bien cuando la visualización es
            controlada por un usuario que puede cancelar una consulta después
            de ver la primera página de los datos. Las consultas son codificadas
            con una cláusula "OPTIMIZE nnn ROWS" para
            cumplir el objetivo especificado por la cláusula.




           DB2_ALL_IO Todas las consultas son optimizadas
           con el objetivo de devolver la consulta completa en el menor
           intervalo de tiempo. Esta es una buena opción cuando la visualización
           de una consulta está siendo escrita hacia un fichero o un informe o
           cuando la interfaz pone en cola los datos. Las consultas son codificadas
           con una cláusula "OPTIMIZE FOR nnn ROWS" para
           cumplir el objetivo especificado por la cláusula. Esta es la operación por
           defecto.






         i5_dbcs_alloc


           El valor DB2_I5_DBCS_ALLOC_ON activa el esquema
           de asignación DB2 6X para el incremento de los tamaños de columnas.




           El valor DB2_I5_DBCS_ALLOC_OFF desactiva el
           esquema de asignación DB2 6X para el incremento de los tamaños de columnas.




           Nota : la configuración php.ini
           ibm_db2.i5_dbcs_alloc==0 o
           DB2_I5_DBCS_ALLOC_OFF es por defecto pero puede
           ser derivada con la opción i5_dbcs_alloc.






         i5_date_fmt


           DB2_I5_FMT_ISO : se utiliza el formato de fecha de la organización internacional de
           normalización (ISO) "yyyy-mm-dd". Este es el valor por
           defecto.




           DB2_I5_FMT_USA : se utiliza el formato de fecha de
           los Estados Unidos "mm/dd/yyyy".




           DB2_I5_FMT_EUR : se utiliza el formato de fecha Europeo
           "dd.mm.yyyy".




           DB2_I5_FMT_JIS : se utiliza el formato de fecha de
           la industria japonesa de estándares "yyyy-mm-dd".




           DB2_I5_FMT_MDY : se utiliza el formato de fecha "mm/dd/yyyy".




           DB2_I5_FMT_DMY : se utiliza el formato de fecha "dd/mm/yyyy".




           DB2_I5_FMT_YMD : se utiliza el formato de fecha "yy/mm/dd".




           DB2_I5_FMT_JUL : se utiliza el formato de fecha Juliano "yy/ddd".




           DB2_I5_FMT_JOB : se utiliza el valor por defecto.






         i5_date_sep


           DB2_I5_SEP_SLASH : se utiliza una barra ( / ) como
           separador de fecha.
           Este es el valor por defecto.




           DB2_I5_SEP_DASH : se utiliza un guión ( - ) como
           separador de fecha.




           DB2_I5_SEP_PERIOD : se utiliza un punto ( . ) como
           separador de fecha.




           DB2_I5_SEP_COMMA : se utiliza una coma ( , ) como
           separador de fecha.




           DB2_I5_SEP_BLANK : se utiliza un espacio en blanco como
           separador de fecha.




           DB2_I5_SEP_JOB : se utiliza el valor por defecto.






         i5_time_fmt


           DB2_I5_FMT_ISO : se utiliza el formato de hora de
           la organización internacional de normalización "hh.mm.ss". Este es el valor por
           defecto.




           DB2_I5_FMT_USA : se utiliza el formato de hora de
           los Estados Unidos "hh:mmxx", donde "xx"
           vale "AM" o "PM".




           DB2_I5_FMT_EUR : se utiliza el formato de hora Europeo
           "hh.mm.ss".




           DB2_I5_FMT_JIS : se utiliza el formato de hora de
           la industria japonesa de estándares "hh:mm:ss".




           DB2_I5_FMT_HMS : se utiliza el formato "hh:mm:ss".






         i5_time_sep


           DB2_I5_SEP_COLON : se utiliza un dos puntos ( : ) como
           separador de tiempo. Este es el valor por defecto.




           DB2_I5_SEP_PERIOD : se utiliza un punto ( . ) como
           separador de tiempo.




           DB2_I5_SEP_COMMA : se utiliza una coma ( , ) como
           separador de tiempo.




           DB2_I5_SEP_BLANK : se utiliza un espacio en blanco como
           separador de tiempo.




           DB2_I5_SEP_JOB : se utiliza el valor por defecto.






         i5_decimal_sep


           DB2_I5_SEP_PERIOD : se utiliza un punto ( . ) como
           separador decimal. Este es el valor por defecto.




           DB2_I5_SEP_COMMA : se utiliza una coma ( , ) como
           separador decimal.




           DB2_I5_SEP_JOB : se utiliza el valor por defecto.








       La siguiente nueva opción i5/OS está disponible desde la versión ibm_db2
       1.8.0 y posteriores.




         i5_libl


           Una cadena que indica la lista a utilizar para resolver las referencias
           de ficheros no calificados. Especifique la lista separando los
           valores con un espacio, como sigue : 'i5_libl'=&gt;"MYLIB YOURLIB ANYLIB".



          **Nota**:



            i5_libl llama a qsys2/qcmdexc('cmd',cmdlen),
            que solo está disponible desde i5/OS V5R4.










### Valores devueltos

Devuelve el recurso de conexión si la tentativa de conexión tiene éxito. Si
la tentativa de conexión falla, **db2_connect()** devuelve
**[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Creación de una conexión catalogada**



     Las conexiones catalogadas requieren que haya catalogado previamente la base de datos
     especificada utilizando el procesador de línea de comandos DB2 ("Command Line Processor" : cLP) o con el asistente de configuración de DB2.

&lt;?php
$database = 'EJEMPLO';
$user = 'db2inst1';
$password = 'ibmdb2';

$conn = db2_connect($database, $user, $password);

if ($conn) {
    echo "Conexión exitosa.";
    db2_close($conn);
}
else {
echo "Conexión fallida.";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión exitosa.

    **Ejemplo #2 Creación de una conexión no catalogada**



     Una conexión no catalogada permite conectarse dinámicamente
     a una base de datos.

&lt;?php
$database = 'EJEMPLO';
$user = 'db2inst1';
$password = 'ibmdb2';
$hostname = 'localhost';
$port = 50000;

$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;" .
"HOSTNAME=$hostname;PORT=$port;PROTOCOL=TCPIP;UID=$user;PWD=$password;";
$conn = db2_connect($conn_string, '', '');

if ($conn) {
    echo "Conexión exitosa.";
    db2_close($conn);
}
else {
echo "Conexión fallida.";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión exitosa.

    **Ejemplo #3 Creación de una conexión con autocommit desactivado por defecto**



     Pasar un array de opciones a **db2_connect()**
     permite modificar el comportamiento por defecto de la conexión.

&lt;?php
$database = 'EJEMPLO';
$user = 'db2inst1';
$password = 'ibmdb2';
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF);

$conn = db2_connect($database, $user, $password, $options);

if ($conn) {
    echo "Conexión exitosa.\n";
    if (db2_autocommit($conn)) {
echo "Autocommit está activado.\n";
}
else {
echo "Autocommit está desactivado.\n";
}
db2_close($conn);
}
else {
echo "Conexión fallida.";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión exitosa.
Autocommit está desactivado.

    **Ejemplo #4 Mejor rendimiento i5/OS**



     Para lograr utilizar el mejor rendimiento de su i5/OS ibm_db2
     1.5.1, la aplicación PHP utiliza el host por defecto, el userid y la contraseña para su **db2_connect()**.

&lt;?php
$library = "ADC";
  $i5 = db2_connect("", "", "", array("i5_lib"=&gt;"qsys2"));
  $result = db2_exec($i5,
"select \* from systables where table_schema = '$library'");
  while ($row = db2_fetch_both($result)) {
     echo $row['TABLE_NAME']."&lt;/br&gt;";
  }
  db2_close($i5);
?&gt;

    El ejemplo anterior mostrará:

ANIMALS
NAMES
PICTURES

    **Ejemplo #5 Utilización del contexto**



     El siguiente ejemplo muestra cómo activar el contexto, cambiar de usuario
     y recuperar el ID del usuario actual.

&lt;?php

$database = "SAMPLE";
$hostname = "localhost";
$port = 50000;
$authID = "db2inst1";
$auth_pass = "ibmdb2";

$tc_user = "tcuser";
$tc_pass = "tcpassword";

$dsn = "DATABASE=$database;HOSTNAME=$hostname;PORT=$port;
PROTOCOL=TCPIP;UID=$authID;PWD=$auth_pass;";
$options = array ("trustedcontext" =&gt; DB2_TRUSTED_CONTEXT_ENABLE);

$tc_conn = db2_connect($dsn, "", "", $options);
if($tc_conn) {
echo "Conexión de confianza explícita exitosa.\n";

    if(db2_get_option($tc_conn, "trustedcontext")) {
        $userBefore = db2_get_option($tc_conn, "trusted_user");

        //Código como usuario 1.

        //Cambio al usuario de confianza.
        $parameters = array("trusted_user" =&gt; $tc_user,
          "trusted_password" =&gt; $tcuser_pass);
        $res = db2_set_option ($tc_conn, $parameters, 1);

        $userAfter = db2_get_option($tc_conn, "trusted_user");
        //Código como usuario de confianza.

        if($userBefore != $userAfter) {
            echo "El usuario ha cambiado." . "\n";
        }
    }

    db2_close($tc_conn);

}
else {
echo "El cambio de contexto de conexión ha fallado.\n";
}
?&gt;

    El ejemplo anterior mostrará:

El cambio de contexto de conexión ha fallado.
El usuario ha cambiado.

### Ver también

    - [db2_close()](#function.db2-close) - Cierra una conexión a base de datos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

# db2_cursor_type

(PECL ibm_db2 &gt;= 1.0.0)

db2_cursor_type —
Devuelve el tipo de cursor utilizado por un recurso

### Descripción

**db2_cursor_type**([resource](#language.types.resource) $stmt): [int](#language.types.integer)

Devuelve el tipo de cursor utilizado por un recurso. Utilice esta
función para determinar si se trabaja con un cursor de avance solo o un cursor flotante.

### Parámetros

     stmt


       Un recurso válido.





### Valores devueltos

Devuelve **[DB2_FORWARD_ONLY](#constant.db2-forward-only)** si el recurso utiliza un
cursor de avance solo o **[DB2_SCROLLABLE](#constant.db2-scrollable)** si el recurso
utiliza un cursor flotante.

### Ver también

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

# db2_escape_string

(PECL ibm_db2 &gt;= 1.6.0)

db2_escape_string —
Escapar ciertos caracteres especiales

### Descripción

**db2_escape_string**([string](#language.types.string) $string_literal): [string](#language.types.string)

Agrega un caracter de escape (barra invertida) antes de cada caracter especial de la cadena enviada como parámetro.

### Parámetros

     string_literal


       La cadena que contiene los caracteres especiales y que necesita ser escapada.
       Los carecteres especiales a los que se les agrega el caracter de escape son \x00,
       \n, \r, \,
       ', " y \x1a.





### Valores devueltos

Devuelve string_literal con todos los caracteres especiales ya escapados.

### Ejemplos

    **Ejemplo #1 Ejemplo de db2_escape_string()**



     Resultado del uso de la función **db2_escape_string()**

&lt;?php

$conn = db2_connect($database, $user, $password);

if ($conn) {
$str[0] = "Todos los caracteres: \x00 , \n , \r , \ , ' , \" , \x1a .";
$str[1] = "Barra invertida (\). Comilla simple ('). Comilla doble (\")";
$str[2] = "El caracter NULL \0 debe ser citado también";
$str[3] = "Caracteres interesantes: \x1a , \x00 .";
$str[4] = "Nada que citar";
$str[5] = 200676;
$str[6] = "";

    foreach( $str as $string ) {
        echo "db2_escape_string: " . db2_escape_string($string). "\n";
    }

}
?&gt;

    El ejemplo anterior mostrará:

db2_escape_string: Todos los caracteres: \0 , \n , \r , \\ , \' , \" , \Z .
db2_escape_string: Barra invertida (\\). Comilla simple (\'). Comilla doble (\")
db2_escape_string: El caracter NULL \0 debe ser citado también
db2_escape_string: Caracteres interesantes: \Z , \0 .
db2_escape_string: Nada que citar
db2_escape_string: 200676
db2_escape_string:

### Ver también

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

# db2_exec

(PECL ibm_db2 &gt;= 1.0.0)

db2_exec —
Ejecuta una consulta SQL directamente

### Descripción

**db2_exec**([resource](#language.types.resource) $connection, [string](#language.types.string) $statement, [array](#language.types.array) $options = []): [resource](#language.types.resource)|[false](#language.types.singleton)

Ejecuta una consulta SQL directamente.

Si se prevé insertar variables PHP en la consulta SQL, debe entenderse que
esto es una de las fallas de seguridad más comunes. Se recomienda llamar a la
función [db2_prepare()](#function.db2-prepare) para preparar una consulta SQL que
contenga marcadores para variables de entrada. Posteriormente, puede llamarse
a la función [db2_execute()](#function.db2-execute) para pasar los valores de
entrada y así evitar ataques por inyección SQL.

Si se prevé llamar repetidamente a la misma consulta SQL con diferentes
parámetros, se recomienda utilizar las funciones [db2_prepare()](#function.db2-prepare)
y [db2_execute()](#function.db2-execute) para permitir que el servidor de base de
datos reutilice su plan de acceso y así mejorar la eficiencia del acceso a la
base de datos.

### Parámetros

     connection


       Una variable de tipo resource de conexión válida devuelta por
       [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).






     statement


       Una consulta SQL. La consulta no puede contener marcadores.






     options


       Un array asociativo que contiene las opciones de la consulta. Este
       parámetro puede utilizarse para solicitar un cursor flotante en los
       servidores de base de datos que soportan esta funcionalidad.




       Para obtener una descripción de las opciones válidas, consulte la
       función [db2_set_option()](#function.db2-set-option).





### Valores devueltos

Devuelve una variable de tipo resource si la consulta SQL fue enviada
correctamente o **[false](#constant.false)** si la base de datos no pudo ejecutar la consulta SQL.

### Ejemplos

    **Ejemplo #1 Creación de una tabla con db2_exec()**



     El siguiente ejemplo utiliza la función **db2_exec()** para
     enviar un conjunto de consultas DDL con el fin de crear una tabla.

&lt;?php
$conn = db2_connect($database, $user, $password);

// Crear la tabla de prueba
$create = 'CREATE TABLE animales (id INTEGER, raza VARCHAR(32),
    nombre CHAR(16), peso DECIMAL(7,2))';
$result = db2_exec($conn, $create);
if ($result) {
print "La tabla se ha creado correctamente.\n";
}

// Rellenar la tabla de prueba
$animales = array(
array(0, 'gato', 'Pook', 3.2),
array(1, 'perro', 'Peaches', 12.3),
array(2, 'caballo', 'Smarty', 350.0),
array(3, 'pez dorado', 'Bubbles', 0.1),
array(4, 'periquito', 'Gizmo', 0.2),
array(5, 'cabra', 'Rickety Ride', 9.7),
array(6, 'llama', 'Sweater', 150)
);

foreach ($animales as $animal) {
    $rc = db2_exec($conn, "INSERT INTO animales (id, raza, nombre, peso)
VALUES ({$animal[0]}, '{$animal[1]}', '{$animal[2]}', {$animal[3]})");
if ($rc) {
print "Inserción... ";
}
}
?&gt;

    El ejemplo anterior mostrará:

La tabla se ha creado correctamente.
Inserción... Inserción... Inserción... Inserción... Inserción... Inserción... Inserción...

    **Ejemplo #2 Ejecución de una consulta SELECT con un cursor flotante**



     El siguiente ejemplo muestra cómo solicitar un cursor flotante para una
     consulta SQL enviada con la función **db2_exec()**.

&lt;?php
$conn = db2_connect($database, $user, $password);
$sql = "SELECT nombre FROM animales
WHERE peso &lt; 10.0
ORDER BY nombre";
if ($conn) {
    require_once 'prepare.inc';
    $stmt = db2_exec($conn, $sql, array('cursor' =&gt; DB2_SCROLLABLE));
    while ($row = db2_fetch_array($stmt)) {
        print "$row[0]\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

Bubbles
Gizmo
Pook
Rickety Ride

    **Ejemplo #3 Devuelve datos XML como ResultSet SQL**



     El siguiente ejemplo demuestra cómo utilizar documentos almacenados
     en una columna XML utilizando la base de datos SAMPLE. Mediante un simple
     SQL/XML, este ejemplo devuelve algunos nodos en un documento XML en un
     formato ResultSet SQL con el que la mayoría de los usuarios están
     familiarizados.

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = 'SELECT * FROM XMLTABLE(
    XMLNAMESPACES (DEFAULT \'http://posample.org\'),
    \'db2-fn:xmlcolumn("CUSTOMER.INFO")/customerinfo\'
    COLUMNS
    "CID" VARCHAR (50) PATH \'@Cid\',
    "NAME" VARCHAR (50) PATH \'name\',
    "PHONE" VARCHAR (50) PATH \'phone [ @type = "work"]\'
    ) AS T
    WHERE NAME = \'Kathy Smith\'
    ';
$stmt = db2_exec($conn, $query);

while($row = db2_fetch_object($stmt)){
printf("$row-&gt;CID     $row-&gt;NAME     $row-&gt;PHONE\n");
}
db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

1000 Kathy Smith 416-555-1358
1001 Kathy Smith 905-555-7258

    **Ejemplo #4 Ejecutar un "JOIN" con datos XML**



     El siguiente ejemplo trabaja con documentos almacenados en dos columnas
     diferentes en la base de datos SAMPLE. Esto crea dos tablas temporales
     provenientes de los documentos XML de dos columnas XML diferentes y
     devuelve un ResultSet SQL con la información que contiene el estado de
     envío para un cliente.

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = '
SELECT A.CID, A.NAME, A.PHONE, C.PONUM, C.STATUS
FROM
XMLTABLE(
XMLNAMESPACES (DEFAULT \'http://posample.org\'),
\'db2-fn:xmlcolumn("CUSTOMER.INFO")/customerinfo\'
COLUMNS
"CID" BIGINT PATH \'@Cid\',
"NAME" VARCHAR (50) PATH \'name\',
"PHONE" VARCHAR (50) PATH \'phone [ @type = "work"]\'
) as A,
PURCHASEORDER AS B,
XMLTABLE (
XMLNAMESPACES (DEFAULT \'http://posample.org\'),
\'db2-fn:xmlcolumn("PURCHASEORDER.PORDER")/PurchaseOrder\'
COLUMNS
"PONUM" BIGINT PATH \'@PoNum\',
"STATUS" VARCHAR (50) PATH \'@Status\'
) as C
WHERE A.CID = B.CUSTID AND
B.POID = C.PONUM AND
A.NAME = \'Kathy Smith\'
';

$stmt = db2_exec($conn, $query);

while($row = db2_fetch_object($stmt)){
printf("$row-&gt;CID $row-&gt;NAME $row-&gt;PHONE $row-&gt;PONUM $row-&gt;STATUS\n");
}

db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

1001 Kathy Smith 905-555-7258 5002 Shipped

    **Ejemplo #5 Devuelve datos SQL que forman parte de un documento XML grande**



     El siguiente ejemplo utiliza una porción de los documentos de
     PRODUCT.DESCRIPTION en la base de datos SAMPLE. Esto crea un documento
     XML que contiene la descripción del producto (datos XML) y la información
     sobre el precio (datos SQL).

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = '
SELECT
XMLSERIALIZE(
XMLQUERY(\'
    declare boundary-space strip;
    declare default element namespace "http://posample.org";
    &lt;promoList&gt; {
        for $prod in $doc/product
        where $prod/description/price &lt; 10.00
        order by $prod/description/price ascending
        return(
            &lt;promoitem&gt; {
                $prod,
                &lt;startdate&gt; {$start} &lt;/startdate&gt;,
&lt;enddate&gt; {$end} &lt;/enddate&gt;,
                &lt;promoprice&gt; {$promo} &lt;/promoprice&gt;
} &lt;/promoitem&gt;
)
} &lt;/promoList&gt;
\' passing by ref DESCRIPTION AS "doc",
PROMOSTART as "start",
PROMOEND as "end",
PROMOPRICE as "promo"
RETURNING SEQUENCE)
AS CLOB (32000))
AS NEW_PRODUCT_INFO
FROM PRODUCT
WHERE PID = \'100-100-01\'
';

$stmt = db2_exec($conn, $query);

while($row = db2_fetch_array($stmt)){
printf("$row[0]\n");
}
db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

&lt;promoList xmlns="http://posample.org"&gt;
&lt;promoitem&gt;
&lt;product pid="100-100-01"&gt;
&lt;description&gt;
&lt;name&gt;Snow Shovel, Basic 22 inch&lt;/name&gt;
&lt;details&gt;Basic Snow Shovel, 22 inches wide, straight handle with D-Grip&lt;/details&gt;
&lt;price&gt;9.99&lt;/price&gt;
&lt;weight&gt;1 kg&lt;/weight&gt;
&lt;/description&gt;
&lt;/product&gt;
&lt;startdate&gt;2004-11-19&lt;/startdate&gt;
&lt;enddate&gt;2004-12-19&lt;/enddate&gt;
&lt;promoprice&gt;7.25&lt;/promoprice&gt;
&lt;/promoitem&gt;
&lt;/promoList&gt;

### Ver también

    - [db2_execute()](#function.db2-execute) - Ejecuta una consulta SQL preparada

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

# db2_execute

(PECL ibm_db2 &gt;= 1.0.0)

db2_execute —
Ejecuta una consulta SQL preparada

### Descripción

**db2_execute**([resource](#language.types.resource) $stmt, [array](#language.types.array) $parameters = []): [bool](#language.types.boolean)

**db2_execute()** ejecuta una consulta SQL que ha sido
preparada por [db2_prepare()](#function.db2-prepare).

Si la consulta SQL devuelve un conjunto de resultados, por ejemplo, una consulta
SELECT o CALL a un procedimiento de registro devuelve uno o
varios conjuntos de resultados, puede recuperar una fila como un array a partir de la
recurso stmt utilizando
[db2_fetch_assoc()](#function.db2-fetch-assoc),
[db2_fetch_both()](#function.db2-fetch-both) o
[db2_fetch_array()](#function.db2-fetch-array). Alternativamente, puede utilizar
[db2_fetch_row()](#function.db2-fetch-row) para mover el puntero a
la fila siguiente y recuperar una columna a la vez de esta fila con la
función [db2_result()](#function.db2-result).

Consúltese [db2_prepare()](#function.db2-prepare) para una breve discusión
sobre las ventajas de utilizar [db2_prepare()](#function.db2-prepare) y
**db2_execute()** en lugar de [db2_exec()](#function.db2-exec).

### Parámetros

     stmt


       Una consulta preparada devuelta por [db2_prepare()](#function.db2-prepare).






     parameters


       Un array de parámetros de entrada que contiene los marcadores de
       variables contenidos en la consulta preparada.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Preparación y ejecución de una consulta SQL con marcadores**



     El siguiente ejemplo prepara una consulta INSERT que acepta cuatro
     marcadores, luego itera sobre el array que contiene los valores de entrada
     que será pasado a la función **db2_execute()**.

&lt;?php
$pet = array(0, 'chat', 'Pook', 3.2);

$insert = 'INSERT INTO animales (id, raza, nombre, peso)
VALUES (?, ?, ?, ?)';

$stmt = db2_prepare($conn, $insert);
if ($stmt) {
$result = db2_execute($stmt, $pet);
    if ($result) {
print "Añadido un nuevo animal con éxito.";
}
}
?&gt;

    El ejemplo anterior mostrará:

Añadido un nuevo animal con éxito.

    **Ejemplo #2 Llamada a un procedimiento de registro con un parámetro de SALIDA**



     El siguiente ejemplo prepara una consulta CALL que acepta un marcador que
     representa un parámetro de SALIDA, vincula la variable PHP $my_pets
     al parámetro utilizando la función
     [db2_bind_param()](#function.db2-bind-param) y llama a la función
     **db2_execute()** para ejecutar la consulta
     CALL. Una vez que la consulta CALL ha sido ejecutada, el valor de
     $num_pets cambia para reflejar el valor devuelto
     por el procedimiento de registro para este parámetro de SALIDA.

&lt;?php
$num_pets = 0;
$res = db2_prepare($conn, "CALL count_my_pets(?)");
$rc = db2_bind_param($res, 1, "num_pets", DB2_PARAM_OUT);
$rc = db2_execute($res);
print "Tengo $num_pets animales !";
?&gt;

    El ejemplo anterior mostrará:

Tengo 7 animales !

    **Ejemplo #3 Devuelve datos XML como ResultSet SQL**



     El siguiente ejemplo demuestra cómo utilizar documentos almacenados
     en una columna XML utilizando la base de datos SAMPLE. Utilizando un simple SQL/XML,
     este ejemplo devuelve algunos nodos en un documento XML en un formato ResultSet SQL
     con el que la mayoría de los usuarios están familiarizados.

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = 'SELECT \* FROM XMLTABLE(
XMLNAMESPACES (DEFAULT \'http://posample.org\'),
\'db2-fn:xmlcolumn("CUSTOMER.INFO")/customerinfo\'
COLUMNS
"CID" VARCHAR (50) PATH \'@Cid\',
"NAME" VARCHAR (50) PATH \'name\',
"PHONE" VARCHAR (50) PATH \'phone [ @type = "work"]\'
) AS T
WHERE NAME = ?
';

$stmt = db2_prepare($conn, $query);

$name = 'Kathy Smith';

if ($stmt) {
    db2_bind_param($stmt, 1, "name", DB2_PARAM_IN);
db2_execute($stmt);

    while($row = db2_fetch_object($stmt)){
        printf("$row-&gt;CID     $row-&gt;NAME     $row-&gt;PHONE\n");
    }

}
db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

1000 Kathy Smith 416-555-1358
1001 Kathy Smith 905-555-7258

    **Ejemplo #4 Ejecutar un "JOIN" con datos XML**



     El siguiente ejemplo trabaja con documentos almacenados en dos
     columnas diferentes en la base de datos SAMPLE. Esto crea dos
     tablas temporales a partir de los documentos XML de dos diferentes
     columnas XML y devuelve un ResultSet SQL con la información que contiene
     el estado de envío para un cliente.

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = '
SELECT A.CID, A.NAME, A.PHONE, C.PONUM, C.STATUS
FROM
XMLTABLE(
XMLNAMESPACES (DEFAULT \'http://posample.org\'),
\'db2-fn:xmlcolumn("CUSTOMER.INFO")/customerinfo\'
COLUMNS
"CID" BIGINT PATH \'@Cid\',
"NAME" VARCHAR (50) PATH \'name\',
"PHONE" VARCHAR (50) PATH \'phone [ @type = "work"]\'
) as A,
PURCHASEORDER AS B,
XMLTABLE (
XMLNAMESPACES (DEFAULT \'http://posample.org\'),
\'db2-fn:xmlcolumn("PURCHASEORDER.PORDER")/PurchaseOrder\'
COLUMNS
"PONUM" BIGINT PATH \'@PoNum\',
"STATUS" VARCHAR (50) PATH \'@Status\'
) as C
WHERE A.CID = B.CUSTID AND
B.POID = C.PONUM AND
A.NAME = ?
';

$stmt = db2_prepare($conn, $query);

$name = 'Kathy Smith';

if ($stmt) {
    db2_bind_param($stmt, 1, "name", DB2_PARAM_IN);
db2_execute($stmt);

    while($row = db2_fetch_object($stmt)){
        printf("$row-&gt;CID     $row-&gt;NAME     $row-&gt;PHONE     $row-&gt;PONUM     $row-&gt;STATUS\n");
    }

}

db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

1001 Kathy Smith 905-555-7258 5002 Shipped

    **Ejemplo #5 Devuelve datos SQL que forman parte de un documento XML grande**



     El siguiente ejemplo utiliza una porción de los documentos de
     PRODUCT.DESCRIPTION en la base de datos SAMPLE. Esto crea un documento
     XML que contiene la descripción del producto (datos XML) y las informaciones
     concernientes al precio (datos SQL).

&lt;?php

$conn = db2_connect("SAMPLE", "db2inst1", "ibmdb2");

$query = '
SELECT
XMLSERIALIZE(
XMLQUERY(\'
    declare boundary-space strip;
    declare default element namespace "http://posample.org";
    &lt;promoList&gt; {
        for $prod in $doc/product
        where $prod/description/price &lt; 10.00
        order by $prod/description/price ascending
        return(
            &lt;promoitem&gt; {
                $prod,
                &lt;startdate&gt; {$start} &lt;/startdate&gt;,
&lt;enddate&gt; {$end} &lt;/enddate&gt;,
                &lt;promoprice&gt; {$promo} &lt;/promoprice&gt;
} &lt;/promoitem&gt;
)
} &lt;/promoList&gt;
\' passing by ref DESCRIPTION AS "doc",
PROMOSTART as "start",
PROMOEND as "end",
PROMOPRICE as "promo"
RETURNING SEQUENCE)
AS CLOB (32000))
AS NEW_PRODUCT_INFO
FROM PRODUCT
WHERE PID = ?
';

$stmt = db2_prepare($conn, $query);

$pid = "100-100-01";

if ($stmt) {
    db2_bind_param($stmt, 1, "pid", DB2_PARAM_IN);
db2_execute($stmt);

    while($row = db2_fetch_array($stmt)){
        printf("$row[0]\n");
    }

}

db2_close($conn);

?&gt;

    El ejemplo anterior mostrará:

&lt;promoList xmlns="http://posample.org"&gt;
&lt;promoitem&gt;
&lt;product pid="100-100-01"&gt;
&lt;description&gt;
&lt;name&gt;Snow Shovel, Basic 22 inch&lt;/name&gt;
&lt;details&gt;Basic Snow Shovel, 22 inches wide, straight handle with D-Grip&lt;/details&gt;
&lt;price&gt;9.99&lt;/price&gt;
&lt;weight&gt;1 kg&lt;/weight&gt;
&lt;/description&gt;
&lt;/product&gt;
&lt;startdate&gt;2004-11-19&lt;/startdate&gt;
&lt;enddate&gt;2004-12-19&lt;/enddate&gt;
&lt;promoprice&gt;7.25&lt;/promoprice&gt;
&lt;/promoitem&gt;
&lt;/promoList&gt;

### Ver también

    - [db2_exec()](#function.db2-exec) - Ejecuta una consulta SQL directamente

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_fetch_array

(PECL ibm_db2 &gt;= 1.0.1)

db2_fetch_array —
Devuelve un array, indexado por la posición de las columnas, que representa
una línea del conjunto de resultados

### Descripción

**db2_fetch_array**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row_number = -1): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array, indexado por la posición de las columnas, que representa
una línea del conjunto de resultados. Los índices del array son numéricos y
comienzan por cero.

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto de
       resultados.






     row_number


       Solicita una línea específica indexada numéricamente que comienza con el
       valor 1 en el conjunto de resultados. Al proporcionar este argumento, se
       generará una advertencia PHP si el conjunto de resultados
       utiliza un cursor de avance solo.





### Valores devueltos

Devuelve un array con índices numéricos comenzando en 0 indexado con la posición de las
columnas. Este índice apunta a los datos de la siguiente
línea o la línea solicitada en el conjunto de resultados. Devuelve **[false](#constant.false)**
si no hay una línea disponible en el conjunto de resultados o si
la línea solicitada por row_number no existe
en el conjunto de resultados.

### Ejemplos

    **Ejemplo #1 Iteración con un cursor de avance solo**



     Si se llama a **db2_fetch_array()** sin el número de una
     línea específica, la siguiente línea se recuperará automáticamente en el
     conjunto de resultados.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);

while ($row = db2_fetch_array($stmt)) {
printf ("%-5d %-16s %-32s %10s\n",
$row[0], $row[1], $row[2], $row[3]);
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

    **Ejemplo #2 Recuperación de líneas específicas con db2_fetch_array()**
     a partir de un cursor flotante



     Si su conjunto de resultados utiliza un cursor flotante, puede
     llamar a la función **db2_fetch_array()** con un número
     de línea específico. El siguiente ejemplo recupera cada línea par en
     el conjunto de resultados, comenzando con la segunda línea.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$result = db2_exec($stmt, $sql, array('cursor' =&gt; DB2_SCROLLABLE));

$i=2;
while ($row = db2_fetch_array($result, $i)) {
printf ("%-5d %-16s %-32s %10s\n",
$row[0], $row[1], $row[2], $row[3]);
$i = $i + 2;
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

### Ver también

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_object()](#function.db2-fetch-object) - Devuelve un objeto con las propiedades que representan columnas en la

fila extraída

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_fetch_assoc

(PECL ibm_db2 &gt;= 1.0.0)

db2_fetch_assoc —
Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

### Descripción

**db2_fetch_assoc**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row_number = -1): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados.

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto de resultados.






     row_number


       Solicita una fila específica indexada numéricamente que comienza con el valor 1 en el conjunto de resultados. Al proporcionar este argumento, se generará una advertencia PHP si el conjunto de resultados utiliza un cursor de avance solo.





### Valores devueltos

Devuelve un array asociativo con los valores de las columnas indexados por el nombre de las columnas que representan la siguiente fila o la fila solicitada en el conjunto de resultados. Devuelve **[false](#constant.false)** si no hay una fila disponible en el conjunto de resultados o si la fila solicitada por row_number no existe en el conjunto de resultados.

### Ejemplos

    **Ejemplo #1 Iteración con un cursor de avance solo**



     Si se llama a **db2_fetch_assoc()** sin el número de una fila específica, se recuperará automáticamente la siguiente fila en el conjunto de resultados.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);

while ($row = db2_fetch_assoc($stmt)) {
printf ("%-5d %-16s %-32s %10s\n",
$row['ID'], $row['NOM'], $row['RACE'], $row['POIDS']);
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

    **Ejemplo #2 Recuperación de filas específicas con db2_fetch_assoc()** desde un cursor flotante



     Si su conjunto de resultados utiliza un cursor flotante, puede llamar a la función **db2_fetch_assoc()** con un número de fila específico. El siguiente ejemplo recupera cada fila par en el conjunto de resultados, comenzando con la segunda fila.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$result = db2_exec($stmt, $sql, array('cursor' =&gt; DB2_SCROLLABLE));

$i=2;
while ($row = db2_fetch_assoc($result, $i)) {
printf ("%-5d %-16s %-32s %10s\n",
$row['ID'], $row['NOM'], $row['RACE'], $row['POIDS']);
$i = $i + 2;
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

### Ver también

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_object()](#function.db2-fetch-object) - Devuelve un objeto con las propiedades que representan columnas en la

fila extraída

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_fetch_both

(PECL ibm_db2 &gt;= 1.0.0)

db2_fetch_both —
Devuelve un array, indexado por nombre de columna y posición, que representa
una fila del conjunto de resultados

### Descripción

**db2_fetch_both**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row_number = -1): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve un array, indexado por nombre de columna y posición, que representa
una fila del conjunto de resultados. Tenga en cuenta que la fila devuelta por
**db2_fetch_both()** requiere más memoria que los arrays
simplemente indexados devueltos por
[db2_fetch_assoc()](#function.db2-fetch-assoc) o
[db2_fetch_array()](#function.db2-fetch-array).

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto de
       resultados.






     row_number


       Solicita una fila específica indexada numéricamente que comienza con el
       valor 1 en el conjunto de resultados. Al proporcionar este argumento, se
       generará una alerta PHP si el conjunto de resultados
       utiliza un cursor de avance solo.





### Valores devueltos

Devuelve un array asociativo con los valores de las columnas indexados por
el nombre de las columnas y el número de las columnas comenzando por 0. El array
representa la siguiente fila o la fila solicitada del conjunto de resultados.
Devuelve **[false](#constant.false)** si no hay una fila disponible en el conjunto de
resultados o si la fila solicitada por row_number
no existe en el conjunto de resultados.

### Ejemplos

    **Ejemplo #1 Iteración con un cursor de avance solo**



     Si se llama a **db2_fetch_both()** sin el número de una
     fila específica, se recuperará automáticamente la siguiente fila del
     conjunto de resultados. El siguiente ejemplo accede a las columnas
     devueltas en el array mediante el método de nombres de columna y por índice
     numérico.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);

while ($row = db2_fetch_both($stmt)) {
printf ("%-5d %-16s %-32s %10s\n",
$row['ID'], $row[0], $row['RACE'], $row[3]);
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

    **Ejemplo #2 Recuperación de filas específicas con db2_fetch_both()**
     a partir de un cursor flotante



     Si su conjunto de resultados utiliza un cursor flotante, puede
     llamar a la función [db2_fetch_assoc()](#function.db2-fetch-assoc) con un número
     de fila específico. El siguiente ejemplo recupera cada fila par en
     el conjunto de resultados, comenzando con la segunda fila.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animaux ORDER BY race";
$result = db2_exec($stmt, $sql, array('cursor' =&gt; DB2_SCROLLABLE));

$i=2;
while ($row = db2_fetch_both($result, $i)) {
printf ("%-5d %-16s %-32s %10s\n",
$row[0], $row['NOM'], $row[2], $row['POIDS']);
$i = $i + 2;
}
?&gt;

    El ejemplo anterior mostrará:

0 Pook chat 3.20
5 Rickety Ride chèvre 9.70
2 Smarty cheval 350.00

### Ver también

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_object()](#function.db2-fetch-object) - Devuelve un objeto con las propiedades que representan columnas en la

fila extraída

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_fetch_object

(PECL ibm_db2 &gt;= 1.0.0)

db2_fetch_object —
Devuelve un objeto con las propiedades que representan columnas en la
fila extraída

### Descripción

**db2_fetch_object**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row_number = -1): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Devuelve un objeto en el que cada propiedad representa una columna
devuelta en la fila extraída del conjunto de resultados.

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto de resultados.






     row_number


       Solicita una fila específica comenzando en el índice 1 del conjunto de
       resultados. Si se pasa este argumento, se generará una
       advertencia de PHP si el resultado utiliza un cursor de desplazamiento
       solo.





### Valores devueltos

Devuelve un objeto que representa una sola fila en el conjunto de resultados.
Las propiedades del objeto corresponden al nombre de las columnas en el conjunto
de resultados.

Los servidores IBM DB2, Cloudscape y Apache Derby normalmente rellenan los
nombres de las columnas con mayúsculas, por lo tanto, las propiedades
del objeto reflejarán este caso.

Si su consulta SELECT llama a una función escalar para modificar el
valor de una columna, los servidores de base de datos devuelven el número
de columna como nombre de columna en el conjunto de resultados. Si se prefiere
una descripción más detallada del nombre de las columnas y las
propiedades del objeto, se puede utilizar la cláusula AS para asignar un
nombre a la columna en el conjunto de resultados.

Devuelve **[false](#constant.false)** si no se ha recuperado ninguna fila.

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_fetch_object()**



     El ejemplo siguiente envía una consulta SELECT con una función escalar,
     RTRIM, que elimina los espacios al final de la columna. En lugar de crear
     un objeto con las propiedades "RACE" y "2", se utiliza la cláusula AS en la
     consulta SELECT para asignar el nombre "nom" a la columna modificada. El servidor
     de base de datos rellena el nombre de las columnas con mayúsculas, por lo que
     el objeto tendrá las propiedades "RACE" y "NOM".

&lt;?php
$conn = db2_connect($database, $user, $password);

$sql = "SELECT race, RTRIM(nom) AS nom
FROM animaux
WHERE id = ?";

if ($conn) {
    $stmt = db2_prepare($conn, $sql);
    db2_execute($stmt, array(0));

    while ($pet = db2_fetch_object($stmt)) {
        echo "Viens ici, {$pet-&gt;NOM}, mon petit {$pet-&gt;RACE} !";
    }
    db2_close($conn);

}
?&gt;

    El ejemplo anterior mostrará:

Viens ici, Pook, mon petit chat !

### Ver también

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_fetch_row

(PECL ibm_db2 &gt;= 1.0.0)

db2_fetch_row —
Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea
solicitada

### Descripción

**db2_fetch_row**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $row_number = -1): [bool](#language.types.boolean)

Utilice **db2_fetch_row()** para iterar a través de un conjunto
de resultados o para apuntar a una línea específica de un conjunto de resultados
si se ha solicitado un cursor flotante.

Para obtener campos individuales del conjunto de resultados, llame a la función
[db2_result()](#function.db2-result).

En lugar de llamar a las funciones **db2_fetch_row()** y
[db2_result()](#function.db2-result), la mayoría de las aplicaciones van a llamar
a la función [db2_fetch_assoc()](#function.db2-fetch-assoc),
[db2_fetch_both()](#function.db2-fetch-both) o [db2_fetch_array()](#function.db2-fetch-array)
para avanzar el puntero en el conjunto de resultados y devolver una línea
completa como array.

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto
       de resultados.






     row_number


       Con cursores flotantes, puede solicitar un número de línea
       específico del conjunto de resultados. Los números de líneas comienzan con
       el índice 1





### Valores devueltos

Devuelve **[true](#constant.true)** si la línea solicitada existe en el conjunto de resultados.
Devuelve **[false](#constant.false)** si la línea solicitada no existe en el conjunto de
resultados.

### Ejemplos

    **Ejemplo #1 Iterar a través de un conjunto de resultados**



     El siguiente ejemplo demuestra cómo iterar a través de un conjunto de resultados
     con la función **db2_fetch_row()** y recuperar las
     columnas del conjunto de resultados con [db2_result()](#function.db2-result).

&lt;?php
$sql = 'SELECT nom, race FROM animales WHERE peso &lt; ?';
$stmt = db2_prepare($conn, $sql);
db2_execute($stmt, array(10));
while (db2_fetch_row($stmt)) {
    $nom = db2_result($stmt, 0);
$race = db2_result($stmt, 1);
print "$nom $race";
}
?&gt;

    El ejemplo anterior mostrará:

gato Pook
carpa dorada Bubbles
periquito Gizmo
cabra Rickety Ride

    **Ejemplo #2 Alternativas recomendadas i5/OS para db2_fetch_row/db2_result**



     En i5/OS, se recomienda que utilice
     [db2_fetch_both()](#function.db2-fetch-both), [db2_fetch_array()](#function.db2-fetch-array)
     o [db2_fetch_object()](#function.db2-fetch-object) en lugar de
     **db2_fetch_row()**/[db2_result()](#function.db2-result).
     En general
     **db2_fetch_row()**/[db2_result()](#function.db2-result) tiene más
     problemas con tipos de columna variados en la traducción de
     EBCIDIC a ASCII, incluyendo posible
     truncamiento en aplicaciones DBCS.
     También podría encontrar una mejor performance utilizando
     [db2_fetch_both()](#function.db2-fetch-both), [db2_fetch_array()](#function.db2-fetch-array)
     y [db2_fetch_object()](#function.db2-fetch-object) en lugar de
     **db2_fetch_row()**/[db2_result()](#function.db2-result).

&lt;?php
$conn = db2_connect("","","");
  $sql = 'SELECT SPECIFIC_SCHEMA, SPECIFIC_NAME, ROUTINE_SCHEMA, ROUTINE_NAME, ROUTINE_TYPE, ROUTINE_CREATED, ROUTINE_BODY, IN_PARMS, OUT_PARMS, INOUT_PARMS, PARAMETER_STYLE, EXTERNAL_NAME, EXTERNAL_LANGUAGE FROM QSYS2.SYSROUTINES FETCH FIRST 2 ROWS ONLY';
  $stmt = db2_exec($conn, $sql, array('cursor' =&gt; DB2_SCROLLABLE));
  while ($row = db2_fetch_both($stmt)){
    echo "&lt;br&gt;db2_fetch_both {$row['SPECIFIC_NAME']} {$row['ROUTINE_CREATED']} {$row[5]}";
}
$stmt = db2_exec($conn, $sql, array('cursor' =&gt; DB2_SCROLLABLE));
  while ($row = db2_fetch_array($stmt)){
    echo "&lt;br&gt;db2_fetch_array {$row[1]} {$row[5]}";
  }
  $stmt = db2_exec($conn, $sql, array('cursor' =&gt; DB2_SCROLLABLE));
  while ($row = db2_fetch_object($stmt)){
    echo "&lt;br&gt;db2_fetch_object {$row-&gt;SPECIFIC_NAME} {$row-&gt;ROUTINE_CREATED}";
  }
  db2_close($conn);
?&gt;

    El ejemplo anterior mostrará:

db2_fetch_both MATCH_ANIMAL 2006-08-25-17.10.23.775000 2006-08-25-17.10.23.775000
db2_fetch_both MULTIRESULTS 2006-10-17-10.11.05.308000 2006-10-17-10.11.05.308000
db2_fetch_array MATCH_ANIMAL 2006-08-25-17.10.23.775000
db2_fetch_array MULTIRESULTS 2006-10-17-10.11.05.308000
db2_fetch_object MATCH_ANIMAL 2006-08-25-17.10.23.775000
db2_fetch_object MULTIRESULTS 2006-10-17-10.11.05.308000

### Ver también

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_object()](#function.db2-fetch-object) - Devuelve un objeto con las propiedades que representan columnas en la

fila extraída

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_field_display_size

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_display_size —
Devuelve el máximo de octetos requeridos para mostrar una columna

### Descripción

**db2_field_display_size**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el máximo de octetos requeridos para mostrar una columna en un
conjunto de resultados.

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Puede ser un entero
       comenzando en la posición 0 que representa el número de la columna
       o un string que contiene el nombre de la columna.





### Valores devueltos

Devuelve un valor entero con el máximo de octetos requeridos para mostrar
la columna especificada. Si la columna no existe en el conjunto de resultados,
**db2_field_display_size()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_name

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_name —
Devuelve el nombre de la columna del conjunto de resultados

### Descripción

**db2_field_name**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el nombre de la columna del conjunto de resultados

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Puede ser un entero
       comenzando en la posición 0 que representa el número de la columna
       o un string que contiene el nombre de la columna.





### Valores devueltos

Devuelve un string que contiene el nombre de la columna especificada. Si la columna
especificada no existe en el conjunto de resultados,
**db2_field_name()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_num

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_num —
Devuelve la posición del nombre de la columna del conjunto de resultados

### Descripción

**db2_field_num**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la posición del nombre de la columna del conjunto de resultados

### Parámetros

    stmt


       Especifica un recurso que contiene un conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Esto puede ser un entero
       comenzando en la posición 0 que representa el número de la columna
       o un string que contiene el nombre de la columna.





### Valores devueltos

Devuelve un entero que contiene la posición comenzando en 0 del nombre de la
columna en el conjunto de resultados. Si la columna especificada no existe en
el conjunto de resultados, **db2_field_num()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_precision

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_precision —
Devuelve la precisión de la columna indicada del conjunto de resultados

### Descripción

**db2_field_precision**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la precisión de la columna indicada del conjunto de resultados.

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Esto puede ser un entero
       que comienza en la posición 0 representando el número de la columna
       o un string que contiene el nombre de la columna.





### Valores devueltos

Devuelve un integer que contiene la precisión de la columna especificada. Si la
columna especificada no existe en el conjunto de resultados,
**db2_field_precision()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_scale

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_scale —
Devuelve la escala de la columna indicada del conjunto de resultados

### Descripción

**db2_field_scale**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve la escala de la columna indicada del conjunto de resultados.

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Esto puede ser un entero
       comenzando en la posición 0 que representa el número de la columna
       o una cadena que contiene el nombre de la columna.





### Valores devueltos

Devuelve un entero que contiene la escala de la columna especificada. Si la
columna especificada no existe en el conjunto de resultados,
**db2_field_scale()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_type

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_type —
Devuelve el tipo de dato de la columna indicada del conjunto de resultados

### Descripción

**db2_field_type**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve el tipo de dato de la columna indicada del conjunto de resultados.

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Esto puede ser un entero
       comenzando en la posición 0 que representa el número de la columna
       o una cadena que contiene el nombre de la columna.





### Valores devueltos

Devuelve una cadena que contiene el tipo de dato definido de la columna
especificada. Si la columna especificada no existe en el conjunto de resultados,
**db2_field_type()** devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_field_width

(PECL ibm_db2 &gt;= 1.0.0)

db2_field_width —
Devuelve el ancho de la columna indicada en el conjunto de resultados

### Descripción

**db2_field_width**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el ancho de la columna indicada en el conjunto de resultados. Esto
es el ancho máximo de la columna para un tipo de datos de longitud fija o el
ancho actual de la columna para un tipo de datos de longitud variable.

### Parámetros

     stmt


       Especifica el recurso que contiene el conjunto de resultados.






     column


       Especifica la columna en el conjunto de resultados. Esto puede ser un
       entero comenzando en la posición 0 que representa el número de la columna
       o un string que contiene el nombre de la columna.





### Valores devueltos

Devuelve un integer que contiene el ancho del carácter especificado o de la
columna de tipo binario en el conjunto de resultados. Si la columna
especificada no existe en el conjunto de resultados, **db2_field_width()**
devuelve **[false](#constant.false)**.

### Ver también

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

# db2_foreign_keys

(PECL ibm_db2 &gt;= 1.0.0)

db2_foreign_keys —
Devuelve un conjunto de resultados que lista las claves externas de una tabla

### Descripción

**db2_foreign_keys**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [?](#language.types.null)[string](#language.types.string) $schema,
    [string](#language.types.string) $table_name
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las claves externas de una tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos, pase
       **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. Si schema es
       **[null](#constant.null)**, **db2_foreign_keys()** hace coincidir el esquema
       para la conexión actual.






     table_name


       El nombre de la tabla.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene filas
que describen las claves externas de la tabla especificada. El conjunto de resultados
está compuesto por las siguientes columnas:

       Nombre de la columna
       Descripción






       PKTABLE_CAT
       Nombre del catálogo de la tabla que contiene la clave primaria. El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       PKTABLE_SCHEM
       Nombre del esquema de la tabla que contiene la clave primaria.



       PKTABLE_NAME
       Nombre de la tabla que contiene la clave primaria.



       PKCOLUMN_NAME
       Nombre de la columna que contiene la clave primaria.



       FKTABLE_CAT
       Nombre del catálogo de la tabla que contiene la clave externa. El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       FKTABLE_SCHEM
       Nombre del esquema de la tabla que contiene la clave externa.



       FKTABLE_NAME
       Nombre de la tabla que contiene la clave externa.



       FKCOLUMN_NAME
       Nombre de la columna que contiene la clave externa.



       KEY_SEQ
       Posición, comenzando en 1, de la columna en la clave.



       UPDATE_RULE
       Entero que representa la acción aplicada a la clave externa cuando una operación es de tipo UPDATE.



       DELETE_RULE
       Entero que representa la acción aplicada a la clave externa cuando una operación es de tipo DELETE.



       FK_NAME
       Nombre de la clave externa.



       PK_NAME
       Nombre de la clave primaria.



       DEFERRABILITY
       Un entero que representa si el modo diferido de la clave externa es SQL_INITIALLY_DEFERRED, SQL_INITIALLY_IMMEDIATE o SQL_NOT_DEFERRABLE.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_free_result

(PECL ibm_db2 &gt;= 1.0.0)

db2_free_result —
Liberar los recursos asociados con un resultado

### Descripción

**db2_free_result**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Libera los recursos del Sistema y de la Base de Datos que están asociados con un resultado.
Los recursos se liberan automáticamente cuando un script finaliza, pero se puede
llamar a **db2_free_result()** para liberarlos en ese momento
y no hasta que el script finalice.

### Parámetros

     stmt


       Un recurso válido.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [db2_free_stmt()](#function.db2-free-stmt) - Liberar un recurso indicado

# db2_free_stmt

(PECL ibm_db2 &gt;= 1.0.0)

db2_free_stmt —
Liberar un recurso indicado

### Descripción

**db2_free_stmt**([resource](#language.types.resource) $stmt): [bool](#language.types.boolean)

Libera los recursos del Sistema y de la Base de Datos que están asociados con un
determinado recurso (de sentencias). Los recursos son liberados automáticamente cuando
un script finaliza, pero se puede llamar a **db2_free_stmt()** para liberarlos
en ese momento y no hasta que el script finalice.

### Parámetros

     stmt


       Un recurso (de sentencias) válido.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [db2_free_result()](#function.db2-free-result) - Liberar los recursos asociados con un resultado

# db2_get_option

(PECL ibm_db2 &gt;= 1.6.0)

db2_get_option — Recupera el valor de una opción para una consulta o conexión

### Descripción

**db2_get_option**([resource](#language.types.resource) $resource, [string](#language.types.string) $option): [string](#language.types.string)|[false](#language.types.singleton)

Recupera el valor de una opción especificada para un recurso de consulta o un recurso
de conexión.

### Parámetros

     resource


      Un recurso de consulta válido devuelto por
      [db2_prepare()](#function.db2-prepare) o un recurso de conexión válido devuelto por
      [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).






    option


      Opciones de consulta o conexión válidas. Las siguientes opciones nuevas están
      disponibles desde la versión 1.6.0 de ibm_db2. Proporcionan información de seguimiento útil
      que puede ser establecida durante la ejecución con
      **db2_get_option()**.


**Nota**:

        Las versiones anteriores de ibm_db no soportan estas nuevas opciones.




        Cuando un valor en cada opción es establecido, algunos servidores pueden no
        soportar el valor total proporcionado y pueden truncar este valor.




        Para asegurar que los datos especificados en cada opción sean convertidos correctamente
        durante la transmisión hacia una base de datos, utilice solo los caracteres de A a Z, 0 a 9
        y los caracteres de subrayado (_) o punto (.).






        userid


           SQL_ATTR_INFO_USERID : un puntero hacia un [string](#language.types.string) utilizado para identificar
           el identificador de usuario (ID) enviado hacia el servidor de base de datos durante la conexión a DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soportan hasta 16 caracteres.
             El user-id no debe ser confundido con la identificación user-id; se trata
             solamente de un propósito de identificación y no debe ser autorizado para permisos.








         acctstr


           SQL_ATTR_INFO_ACCTSTR : un puntero hacia un [string](#language.types.string) utilizado para identificar
           la cuenta del cliente enviada hacia el servidor de base de datos durante la conexión a DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soportan hasta 200 caracteres.








         applname


           SQL_ATTR_INFO_APPLNAME : un puntero hacia un [string](#language.types.string) utilizado para identificar
           el nombre de la aplicación del cliente enviada hacia el servidor de base de datos durante la conexión a DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soportan hasta 32 caracteres.








         wrkstnname


           SQL_ATTR_INFO_WRKSTNNAME : un puntero hacia un [string](#language.types.string) utilizado para identificar
           el nombre de la máquina del cliente enviada hacia el servidor de base de datos durante la conexión a DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soportan hasta 18 caracteres.











La siguiente tabla especifica qué opciones son compatibles con el tipo
de recurso disponible:

    <caption>**Matriz recurso parámetro**</caption>

     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">


       Clave
       Valor
       Tipo de recurso






         Conexión
       Consulta
       Conjunto de resultados



       userid
       SQL_ATTR_INFO_USERID
       X
       X
       -



       acctstr
       SQL_ATTR_INFO_ACCTSTR
       X
       X
       -



       applname
       SQL_ATTR_INFO_APPLNAME
       X
       X
       -



       wrkstnname
       SQL_ATTR_INFO_WRKSTNNAME
       X
       X
       -




### Valores devueltos

Devuelve la configuración actual de la conexión proporcionada en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Establece y recupera los parámetros de un recurso de conexión**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$user = 'db2inst1';
$password = 'ibmdb2';

/_ Recuperación del Recurso de Conexión _/
$conn = db2_connect($database, $user, $password);

echo "Atributos de conexión pasados con la cadena de caracteres de conexión :\n";

/_ Crea un array asociativo de opciones con los pares clave/valor válidos _/
/_ Asigna los atributos a partir de la cadena de caracteres de conexión _/
/_ Accede a las opciones especificadas _/
$options1 = array('userid' =&gt; 'db2inst1');
$conn1 = db2_connect($database, $user, $password, $options1);
$val = db2_get_option($conn1, 'userid');
echo $val . "\n";

$options2 = array('acctstr' =&gt; 'account');
$conn2 = db2_connect($database, $user, $password, $options2);
$val = db2_get_option($conn2, 'acctstr');
echo $val . "\n";

$options3 = array('applname' =&gt; 'myapp');
$conn3 = db2_connect($database, $user, $password, $options3);
$val = db2_get_option($conn3, 'applname');
echo $val . "\n";

$options4 = array('wrkstnname' =&gt; 'workstation');
$conn4 = db2_connect($database, $user, $password, $options4);
$val = db2_get_option($conn4, 'wrkstnname');
echo $val . "\n";

echo "Atributos después de la conexión :\n";

/_ Crea un array asociativo de opciones con los pares clave/valor válidos _/
/_ Asigna los atributos después de que la conexión sea realizada _/
/_ Accede a las opciones especificadas _/
$options5 = array('userid' =&gt; 'db2inst1');
$conn5 = db2_connect($database, $user, $password);
$rc = db2_set_option($conn5, $options5, 1);
$val = db2_get_option($conn5, 'userid');
echo $val . "\n";

$options6 = array('acctstr' =&gt; 'account');
$conn6 = db2_connect($database, $user, $password);
$rc = db2_set_option($conn6, $options6, 1);
$val = db2_get_option($conn6, 'acctstr');
echo $val . "\n";

$options7 = array('applname' =&gt; 'myapp');
$conn7 = db2_connect($database, $user, $password);
$rc = db2_set_option($conn7, $options7, 1);
$val = db2_get_option($conn7, 'applname');
echo $val . "\n";

$options8 = array('wrkstnname' =&gt; 'workstation');
$conn8 = db2_connect($database, $user, $password);
$rc = db2_set_option($conn8, $options8, 1);
$val = db2_get_option($conn8, 'wrkstnname');
echo $val . "\n";
?&gt;

    El ejemplo anterior mostrará:

Atributos de conexión pasados con la cadena de caracteres de conexión :
db2inst1
account
myapp
workstation
Atributos después de la conexión :
db2inst1
account
myapp
workstation

### Ver también

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_cursor_type()](#function.db2-cursor-type) - Devuelve el tipo de cursor utilizado por un recurso

    - [db2_exec()](#function.db2-exec) - Ejecuta una consulta SQL directamente

    - [db2_set_option()](#function.db2-set-option) - Establece opciones para una conexión o recursos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

# db2_last_insert_id

(PECL ibm_db2 &gt;= 1.7.1)

db2_last_insert_id — Retorna el último ID generado por la última consulta de inserción

### Descripción

**db2_last_insert_id**([resource](#language.types.resource) $resource): [?](#language.types.null)[string](#language.types.string)

Retorna el último identificador autogenerado por la última consulta de inserción
para la conexión actual.

El resultado de esta función no se ve afectado por los siguientes eventos:

    -

      Un comando INSERT único con una cláusula VALUES para una tabla
      que no dispone de columna de identidad.





    -

      Un comando INSERT múltiple con cláusula VALUES.





    -

      Un comando INSERT con un SELECT.





    -

      Un comando ROLLBACK TO SAVEPOINT.


### Parámetros

     resource


       Un recurso de conexión válido, creado por [db2_connect()](#function.db2-connect)
       o [db2_pconnect()](#function.db2-pconnect). El valor de este argumento no puede
       ser un recurso de comando o de resultado.





### Valores devueltos

Retorna el identificador autogenerado que pudo ser ejecutado correctamente
en esta conexión.

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_last_insert_id()**



      El siguiente ejemplo muestra cómo retornar un identificador automático

&lt;?php

$database = "SAMPLE";
$user = "db2inst1";
$password = "ibmdb2";

$conn = db2_connect($database, $user, $password);
if($conn) {
$createTable = "CREATE TABLE lastInsertID
(id integer GENERATED BY DEFAULT AS IDENTITY, name varchar(20))";
$insertTable = "INSERT INTO lastInsertID (name) VALUES ('Temp Name')";

    $stmt = @db2_exec($conn, $createTable);

    /* Verificación de la inserción de una fila única */
    $stmt = db2_exec($conn, $insertTable);
    $ret =  db2_last_insert_id($conn);
    if($ret) {
        echo "Último ID insertado: " . $ret . "\n";
    } else {
        echo "No se ha insertado ningún ID recientemente.\n";
    }

    db2_close($conn);

}
else {
echo "La conexión ha fallado.";
}
?&gt;

    El ejemplo anterior mostrará:

Último ID generado: 1

# db2_lob_read

(PECL ibm_db2 &gt;= 1.6.0)

db2_lob_read —
Recupera grandes objetos binarios de tamaños predefinidos en cada invocación

### Descripción

**db2_lob_read**([resource](#language.types.resource) $stmt, [int](#language.types.integer) $colnum, [int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)

Utilice **db2_lob_read()** para recorrer una columna
específica de un conjunto de resultados y recuperar los grandes objetos binarios de
tamaño predefinido.

### Parámetros

     stmt


       Un recurso stmt válido que contiene grandes objetos binarios.






     colnum


       Un número de columna válido en el conjunto de resultados del recurso
       stmt.






     length


       El tamaño de los grandes objetos binarios a recuperar del recurso
       stmt.





### Valores devueltos

Devuelve el número de datos especificados. Devuelve **[false](#constant.false)** si los datos
no pueden ser recuperados.

### Ejemplos

    **Ejemplo #1 Iterar a través de diferentes tipos de datos**

&lt;?php

/_ Parámetros de Conexión _/
$db = 'SAMPLE';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Recuperación del Recurso de Conexión _/
$conn = db2_connect($db,$username,$password);

if ($conn) {
$drop = 'DROP TABLE clob_stream';
$result = @db2_exec( $conn, $drop );

    $create = 'CREATE TABLE clob_stream (id INTEGER, my_clob CLOB)';
    $result = db2_exec( $conn, $create );

    $variable = "";
    $stmt = db2_prepare($conn, "INSERT INTO clob_stream (id,my_clob) VALUES (1, ?)");
    $variable = "THIS IS A CLOB TEST. THIS IS A CLOB TEST.";
    db2_bind_param($stmt, 1, "variable", DB2_PARAM_IN);
    db2_execute($stmt);

    $sql = "SELECT id,my_clob FROM clob_stream";
    $result = db2_prepare($conn, $sql);
    db2_execute($result);
    db2_fetch_row($result);
    $i = 0;
    /* Lectura de grandes objetos */
    while ($data = db2_lob_read($result, 2, 6)) {
        echo "Bucle $i : $data\n";
        $i = $i + 1;
    }

    $drop = 'DROP TABLE blob_stream';
    $result = @db2_exec( $conn, $drop );

    $create = 'CREATE TABLE blob_stream (id INTEGER, my_blob CLOB)';
    $result = db2_exec( $conn, $create );

    $variable = "";
    $stmt = db2_prepare($conn, "INSERT INTO blob_stream (id,my_blob) VALUES (1, ?)");
    $variable = "THIS IS A BLOB TEST. THIS IS A BLOB TEST.";
    db2_bind_param($stmt, 1, "variable", DB2_PARAM_IN);
    db2_execute($stmt);

    $sql = "SELECT id,my_blob FROM blob_stream";
    $result = db2_prepare($conn, $sql);
    db2_execute($result);
    db2_fetch_row($result);
    $i = 0;
    /* Lectura de grandes objetos */
    while ($data = db2_lob_read($result, 2, 6)) {
        echo "Bucle $i : $data\n";
        $i = $i + 1;
    }

} else {
echo 'ninguna conexión : ' . db2_conn_errormsg();
}

?&gt;

    El ejemplo anterior mostrará:

Bucle 0 : THIS I
Bucle 1 : S A CL
Bucle 2 : OB TES
Bucle 3 : T. THI
Bucle 4 : S IS A
Bucle 5 : CLOB
Bucle 6 : TEST.
Bucle 0 : THIS I
Bucle 1 : S A BL
Bucle 2 : OB TES
Bucle 3 : T. THI
Bucle 4 : S IS A
Bucle 5 : BLOB
Bucle 6 : TEST.

### Ver también

    - [db2_bind_param()](#function.db2-bind-param) - Asocia una variable PHP a un parámetro de una consulta SQL

    - [db2_exec()](#function.db2-exec) - Ejecuta una consulta SQL directamente

    - [db2_execute()](#function.db2-execute) - Ejecuta una consulta SQL preparada

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

    - [db2_result()](#function.db2-result) - Devuelve un valor de una columna de una fila de un conjunto de resultados

# db2_next_result

(PECL ibm_db2 &gt;= 1.0.0)

db2_next_result —
Solicita el siguiente conjunto de resultados de la recurso indicado

### Descripción

**db2_next_result**([resource](#language.types.resource) $stmt): [resource](#language.types.resource)|[false](#language.types.singleton)

Un procedimiento de registro puede devolver ningún o múltiples conjuntos de
resultados. El primer conjunto de resultados debe manejarse de la misma manera
que los resultados devueltos por una simple consulta SELECT. Para obtener
el segundo o los siguientes resultados, debe llamarse a la función
**db2_next_result()** y almacenar el resultado en una variable PHP.

### Parámetros

    stmt


       Una consulta preparada devuelta por [db2_exec()](#function.db2-exec) o
       [db2_execute()](#function.db2-execute).





### Valores devueltos

Devuelve un nuevo recurso que contiene el siguiente conjunto de resultados si
el procedimiento contenía otro conjunto de resultados. Devuelve **[false](#constant.false)** si el
procedimiento no tenía más conjuntos de resultados para devolver.

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_next_result()**



     En el siguiente ejemplo, se llama a un procedimiento que devuelve tres
     conjuntos de resultados. El primer conjunto de resultados se recupera directamente
     de la misma recurso sobre la cual se invocó una consulta CALL, mientras que
     el segundo y tercer conjuntos de resultados se recuperan de las recursos
     devueltas por la llamada a la función
     **db2_next_result()**.

&lt;?php
$conn = db2_connect($database, $user, $password);

if ($conn) {
  $stmt = db2_exec($conn, 'CALL multiResults()');

print "Recuperación del primer conjunto de resultados\n";
while ($row = db2_fetch_array($stmt)) {
var_dump($row);
}

print "\nRecuperación del segundo conjunto de resultados\n";
$res = db2_next_result($stmt);
if ($res) {
    while ($row = db2_fetch_array($res)) {
      var_dump($row);
}
}

print "\nRecuperación del tercer conjunto de resultados\n";
$res2 = db2_next_result($stmt);
if ($res2) {
    while ($row = db2_fetch_array($res2)) {
      var_dump($row);
}
}

db2_close($conn);
}
?&gt;

    El ejemplo anterior mostrará:

Recuperación del primer conjunto de resultados
array(2) {
[0]=&gt;
string(16) "Bubbles "
[1]=&gt;
int(3)
}
array(2) {
[0]=&gt;
string(16) "Gizmo "
[1]=&gt;
int(4)
}

Recuperación del segundo conjunto de resultados
array(4) {
[0]=&gt;
string(16) "Sweater "
[1]=&gt;
int(6)
[2]=&gt;
string(5) "lama"
[3]=&gt;
string(6) "150.00"
}
array(4) {
[0]=&gt;
string(16) "Smarty "
[1]=&gt;
int(2)
[2]=&gt;
string(5) "cheval"
[3]=&gt;
string(6) "350.00"
}

Recuperación del tercer conjunto de resultados
array(1) {
[0]=&gt;
string(16) "Bubbles "
}
array(1) {
[0]=&gt;
string(16) "Gizmo "
}

# db2_num_fields

(PECL ibm_db2 &gt;= 1.0.0)

db2_num_fields —
Devuelve el número de campos contenido en el conjunto de resultados

### Descripción

**db2_num_fields**([resource](#language.types.resource) $stmt): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de campos contenidos en el conjunto de resultados. Esta
función es muy útil cuando se gestionan conjuntos de resultados devueltos
por consultas generadas dinámicamente o para conjuntos de resultados
devueltos por procedimientos de registro, donde la aplicación no puede
hacer otra cosa para obtener y utilizar estos resultados.

### Parámetros

     stmt


       Un recurso válido que contiene un conjunto de resultados.





### Valores devueltos

Devuelve un entero que representa el número de campos en el conjunto de
resultados asociado con el recurso especificado. Devuelve **[false](#constant.false)** si el
recurso no es válido.

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_num_fields()**



     El siguiente ejemplo demuestra cómo obtener el número de campos devueltos
     en el conjunto de resultados.

&lt;?php

$sql = "SELECT id, nom, race, poids FROM animales ORDER BY race";
$stmt = db2_prepare($conn, $sql);
db2_execute($stmt, $sql);
$columns = db2_num_fields($stmt);

echo "Hay {$columns} columnas en el conjunto de resultados.";
?&gt;

    El ejemplo anterior mostrará:

Hay 4 columnas en el conjunto de resultados.

### Ver también

    - [db2_execute()](#function.db2-execute) - Ejecuta una consulta SQL preparada

    - [db2_field_display_size()](#function.db2-field-display-size) - Devuelve el máximo de octetos requeridos para mostrar una columna

    - [db2_field_name()](#function.db2-field-name) - Devuelve el nombre de la columna del conjunto de resultados

    - [db2_field_num()](#function.db2-field-num) - Devuelve la posición del nombre de la columna del conjunto de resultados

    - [db2_field_precision()](#function.db2-field-precision) - Devuelve la precisión de la columna indicada del conjunto de resultados

    - [db2_field_scale()](#function.db2-field-scale) - Devuelve la escala de la columna indicada del conjunto de resultados

    - [db2_field_type()](#function.db2-field-type) - Devuelve el tipo de dato de la columna indicada del conjunto de resultados

    - [db2_field_width()](#function.db2-field-width) - Devuelve el ancho de la columna indicada en el conjunto de resultados

# db2_num_rows

(PECL ibm_db2 &gt;= 1.0.0)

db2_num_rows —
Devuelve el número de filas afectadas por una consulta SQL

### Descripción

**db2_num_rows**([resource](#language.types.resource) $stmt): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el número de filas eliminadas, añadidas o actualizadas por una
consulta SQL.

Para determinar el número de filas que devolverá una consulta SELECT,
utilice la consulta SELECT COUNT(\*) con los mismos atributos cuando se
haya ejecutado la consulta SELECT y la recuperación de los valores.

Si la lógica de la aplicación verifica el número de filas devueltas por
una consulta SELECT y salta si el número de filas es 0,
modifique la aplicación para intentar devolver la primera fila con
[db2_fetch_assoc()](#function.db2-fetch-assoc), [db2_fetch_both()](#function.db2-fetch-both),
[db2_fetch_array()](#function.db2-fetch-array) o [db2_fetch_row()](#function.db2-fetch-row),
y salte si la función devuelve **[false](#constant.false)**.

**Nota**:

    Si se envía una consulta SELECT con un cursor flotante,
    **db2_num_rows()** devolverá el número de filas devueltas
    por la consulta SELECT. Sin embargo, el tiempo de sistema asociado con los
    cursores flotantes degrada considerablemente el rendimiento de la
    aplicación, por lo que si esta es la única razón para utilizar cursores
    flotantes, se deberían utilizar cursores de avance solo y además llamar a
    SELECT COUNT(*) o confiar en los valores de retorno de las funciones de
    tipo [bool](#language.types.boolean) para obtener la misma funcionalidad con un
    rendimiento mucho mejor.

### Parámetros

     stmt


       Un recurso stmt válido que contiene el conjunto de
       resultados.





### Valores devueltos

Devuelve el número de filas afectadas por la última consulta SQL enviada
por una función que ejecuta consultas SQL, o **[false](#constant.false)** si ocurre un error

# db2_pclose

(PECL ibm_db2 &gt;= 1.8.0)

db2_pclose — Cierra una conexión persistente a la base de datos

### Descripción

**db2_pclose**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Esta función cierra una conexión DB2, creada con
[db2_pconnect()](#function.db2-pconnect) y libera los recursos correspondientes
del servidor.

**Nota**:

     Esta función no está disponible en i5/OS en respuesta a solicitudes
     de administración i5/OS.

Si se tiene una conexión persistente DB2 creada con la función
[db2_pconnect()](#function.db2-pconnect), puede utilizarse esta función para
cerrar la conexión. Para evitar costos significativos de conexión, esta
función solo debe utilizarse en casos raros, donde la conexión se haya vuelto
inactiva, o cuando la conexión persistente no será utilizada por un largo tiempo.

### Parámetros

     connection


       Un recurso de conexión DB2 activo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cerrar una conexión DB2 persistente**



      El ejemplo a continuación muestra cómo cerrar una conexión
      en un servidor IBM DB2 i5/OS.

&lt;?php
$conn = db2_pconnect('', '', '');
$rc = db2_pclose($conn);
if ($rc) {
echo "La conexión fue cerrada correctamente.";
}
?&gt;

    El ejemplo anterior mostrará:

La conexión fue cerrada correctamente.

### Ver también

    - [db2_close()](#function.db2-close) - Cierra una conexión a base de datos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

# db2_pconnect

(PECL ibm_db2 &gt;= 1.0.0)

db2_pconnect —
Devuelve una conexión persistente a una base de datos

### Descripción

**db2_pconnect**(
    [string](#language.types.string) $database,
    [?](#language.types.null)[string](#language.types.string) $username,
    [?](#language.types.null)[string](#language.types.string) $password,
    [array](#language.types.array) $options = []
): [resource](#language.types.resource)|[false](#language.types.singleton)

Devuelve una conexión persistente a una base de datos IBM DB2
Universal Database, IBM Cloudscape o Apache Derby.

Para más información sobre las conexiones persistentes, véase
[Conexiones persistentes a bases de datos](#features.persistent-connections).

Al llamar a [db2_close()](#function.db2-close) sobre una conexión persistente,
siempre se recibirá **[true](#constant.true)**, pero las conexiones de los clientes DB2
permanecerán abiertas y esperarán para servir la próxima petición de la
función **db2_pconnect()**.

Los usuarios de versiones 1.9.0 o superiores de ibm_db2 deben saber que la extensión
ejecutará un rollback sobre una transacción en una conexión persistente al final
de la consulta, terminando así la transacción. Esto evita un bloqueo transaccional
hacia la consulta siguiente sobre la misma conexión si la ejecución del script termina
antes de la transacción.

### Parámetros

     database


       Para una conexión catalogada a una base de datos, database
       representa el alias de la base de datos en el catálogo del cliente DB2.




       Para una conexión no catalogada a una base de datos,
       database representa una cadena de conexión completa
       en el siguiente formato :


DATABASE=database;HOSTNAME=hostname;PORT=port;PROTOCOL=TCPIP;UID=username;PWD=password;
**Nota**:

         Al conectarse a Db2 sobre IBM i, las llamadas al sistema subyacentes
         [» SQLDriverConnect](https://www.ibm.com/docs/en/i/7.5?topic=functions-sqldriverconnect-connect-data-source),
         solo aceptan DSN, UID y PWD para la
         [» cadena de conexión](https://www.ibm.com/docs/en/i/7.5?topic=functions-sqldriverconnect-connect-data-source#rzadpfndvcon__title__5).
         Como sigue :


DSN=database;UID=username;PWD=password;

       donde los parámetros representan los siguientes valores :


         database


           El nombre de la base de datos.






         hostname


           El nombre de host o la dirección IP del servidor de la base de datos.






         port


           El puerto TCP/IP en el que la base de datos escucha
           las consultas.






         username


           El nombre de usuario con el que se conecta a la
           base de datos.






         password


           La contraseña con la que se conecta a la base de datos.










     username


       El nombre de usuario con el que se conecta a la base de
       datos.






     password


       La contraseña con la que se conecta a la base de datos.






     options


       Un array asociativo de opciones de conexión que afectarán el
       comportamiento de la conexión, donde los valores de las claves incluyen :




         autocommit


           El valor **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)** activa el autocommit
           en esta conexión.




           El valor **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)** desactiva el
           autocommit para esta conexión.






         DB2_ATTR_CASE


           Pasar el valor **[DB2_CASE_NATURAL](#constant.db2-case-natural)** especifica que los
           nombres de columnas serán devueltos en sus casos naturales.




           Pasar el valor **[DB2_CASE_LOWER](#constant.db2-case-lower)** especifica que los
           nombres de columnas serán devueltos en minúsculas.




           Pasar el valor **[DB2_CASE_UPPER](#constant.db2-case-upper)** especifica que los
           nombres de columnas serán devueltos en mayúsculas.






         CURSOR


           Pasar el valor **[DB2_FORWARD_ONLY](#constant.db2-forward-only)** especifica un cursor
           solo hacia adelante para un recurso de consulta. Este es el tipo de cursor
           por defecto y es soportado en todos los servidores de base de datos.




           Pasar el valor **[DB2_SCROLLABLE](#constant.db2-scrollable)** especifica un
           cursor desplazable para un recurso de consulta. Este modo permite
           un acceso aleatorio a las filas en un conjunto de resultados, pero actualmente,
           solo es soportado por la base de datos IBM DB2 Universal.








       Las siguientes opciones están disponibles desde ibm_db2 versión 1.7.0.




         trustedcontext


           Al pasar el valor DB2_TRUSTED_CONTEXT_ENABLE, el contexto de confianza
           es activado para esta conexión. Este parámetro no puede ser activado
           con [db2_set_option()](#function.db2-set-option).




           Esta opción solo funciona si la base está catalogada, incluso si la base
           es local, o si se especifica un DSN completo al crear la conexión.




           Para catalogar la base, utilice el siguiente comando :






db2 catalog tcpip node loopback remote &lt;SERVERNAME&gt; server &lt;SERVICENAME&gt;
db2 catalog database &lt;LOCALDBNAME&gt; as &lt;REMOTEDBNAME&gt; at node loopback
db2 "update dbm cfg using svcename &lt;SERVICENAME&gt;"
db2set DB2COMM=TCPIP

       Las siguientes opciones i5/OS están disponibles desde ibm_db2 versión 1.5.1.


**Sugerencia**

         Atributos de conexión contradictorios, en conjunción con una
         conexión persistente pueden producir resultados indeterminados en i5/OS.
         La política del sitio debe ser establecida para todas las aplicaciones que
         utilizan una conexión persistente. El valor por defecto de
         DB2_AUTOCOMMIT_ON es recomendado con las conexiones persistentes.






         i5_lib


           Un carácter que indica la biblioteca por defecto que será
           utilizada para resolver las referencias de ficheros no calificadas.
           Esta opción no es válida si la conexión utiliza el modo
           de nombramiento del sistema.






         i5_naming


           DB2_I5_NAMING_ON activa el modo de nombramiento del sistema
           de DB2 UDB CLI iSeries. Los ficheros son entonces calificados con el delimitador
           slash (/). Los ficheros no calificados son resueltos utilizando la lista
           de bibliotecas de la tarea.




           DB2_I5_NAMING_OFF activa el modo de nombramiento por defecto,
           que es el nombramiento SQL. Los ficheros son entonces calificados con el punto (.) .
           Los ficheros no calificados son resueltos con la biblioteca por defecto,
           o bien el identificador del usuario actual.






         i5_commit


           El atributo i5_commit debe ser configurado antes
           de la llamada a **db2_pconnect()**. Si el valor es cambiado
           después de la conexión, y la conexión se efectúa sobre datos remotos,
           entonces este cambio no tendrá efectos, hasta la próxima llamada exitosa
           a **db2_pconnect()**.


**Nota**:

             La directiva del php.ini ibm_db2.i5_allow_commit==0
             o DB2_I5_TXN_NO_COMMIT es el valor por defecto, pero puede
             ser reemplazado por la opción i5_commit.






           DB2_I5_TXN_NO_COMMIT : el control de validación no es utilizado.




           DB2_I5_TXN_READ_UNCOMMITTED : las lecturas inconsistentes,
           o no repetibles y los fantasmas son posibles.




           DB2_I5_TXN_READ_COMMITTED : las lecturas son consistentes.
           Las lecturas no repetibles y los fantasmas son posibles.




           DB2_I5_TXN_REPEATABLE_READ : las lecturas consistentes y
           repetibles, pero los fantasmas son posibles.




           DB2_I5_TXN_SERIALIZABLE : las transacciones son activadas.
           Las lecturas inconsistentes, o no repetibles y los fantasmas son imposibles.






         i5_query_optimize


           DB2_FIRST_IO : todas las consultas son optimizadas
           con el objetivo de devolver la primera página lo más rápidamente posible.
           Este objetivo funciona bien cuando el resultado es controlado por un
           usuario que tiene buenas probabilidades de cancelar la consulta después de ver
           las primeras respuestas. Las consultas codificadas con una cláusula
           OPTIMIZE FOR nnn ROWS respetan también este objetivo.




           DB2_ALL_IO : todas las consultas son optimizadas
           con el objetivo de procesar la consulta completa lo más rápidamente posible.
           Esta es una buena opción cuando el resultado de la consulta debe ser
           escrito en un fichero o un informe, o que la interfaz acumula todos
           los datos antes de exportarlos. Las consultas codificadas con la cláusula
           OPTIMIZE FOR nnn ROWS respetan también este objetivo.
           Este es el comportamiento por defecto.






         i5_dbcs_alloc


           DB2_I5_DBCS_ALLOC_ON activa el esquema de asignación
           DB2 6X para el crecimiento de las tallas de columnas de traducción DBCS.




           DB2_I5_DBCS_ALLOC_OFF desactiva el esquema de asignación
           DB2 6X para el crecimiento de las tallas de columnas de traducción DBCS.


**Nota**:

             La directiva del php.ini ibm_db2.i5_dbcs_alloc==0
             o DB2_I5_DBCS_ALLOC_OFF es el valor por defecto, pero puede
             ser reemplazado por la opción i5_dbcs_alloc.








         i5_date_fmt


           DB2_I5_FMT_ISO : el formato de fecha ISO
           (International Organization for Standardization) es
           utilizado : yyyy-mm-dd. Este es el formato por defecto.




           DB2_I5_FMT_USA : el formato de los Estados Unidos de América
           es utilizado : mm/dd/yyyy.




           DB2_I5_FMT_EUR : el formato de fecha europeo
           dd.mm.yyyy es utilizado.




           DB2_I5_FMT_JIS : el formato estándar industrial japonés
           yyyy-mm-dd es utilizado.




           DB2_I5_FMT_MDY : el formato de fecha
           mm/dd/yyyy es utilizado.




           DB2_I5_FMT_DMY : el formato de fecha
           dd/mm/yyyy es utilizado.




           DB2_I5_FMT_YMD : el formato de fecha
           yy/mm/dd es utilizado.




           DB2_I5_FMT_JUL : El formato de fecha juliano
           yy/ddd es utilizado.




           DB2_I5_FMT_JOB : el formato de fecha por defecto es utilizado.






         i5_date_sep


           DB2_I5_SEP_SLASH : un slash ( / ) es utilizado como separador de fecha.
           Este es el formato por defecto.




           DB2_I5_SEP_DASH : un guión ( - ) es utilizado como separador de fecha.




           DB2_I5_SEP_PERIOD : un punto ( . ) es utilizado como separador de fecha.




           DB2_I5_SEP_COMMA : una coma ( , ) es utilizada como separador de fecha.




           DB2_I5_SEP_BLANK : un espacio es utilizado como separador de fecha.




           DB2_I5_SEP_JOB : la configuración por defecto es utilizada






         i5_time_fmt


           DB2_I5_FMT_ISO : el formato de hora ISO
           (International Organization for Standardization) es
           utilizado : hh.mm.ss. Este es el formato por defecto.




           DB2_I5_FMT_USA : el formato de los Estados Unidos de América
           es utilizado : hh:mmxx es utilizado, donde xx
           vale AM o PM.




           DB2_I5_FMT_EUR : el formato de hora europeo
           hh.mm.ss es utilizado.




           DB2_I5_FMT_JIS : el formato estándar industrial japonés
           es utilizado hh:mm:ss.




           DB2_I5_FMT_HMS : el formato hh:mm:ss
           es utilizado.






         i5_time_sep


           DB2_I5_SEP_COLON : un dos-puntos ( : ) es utilizado como
           separador de hora. Este es el defecto.




           DB2_I5_SEP_PERIOD : un punto ( . ) es utilizado como
           separador de hora.




           DB2_I5_SEP_COMMA : una coma ( , ) es utilizada como
           separador de hora.




           DB2_I5_SEP_BLANK : un espacio es utilizado como
           separador de hora.




           DB2_I5_SEP_JOB : el separador por defecto es utilizado.






         i5_decimal_sep


           DB2_I5_SEP_PERIOD : un punto ( . ) es utilizado como
           separador decimal. Este es el separador por defecto.




           DB2_I5_SEP_COMMA : una coma ( , ) es utilizada como
           separador decimal.




           DB2_I5_SEP_JOB : el separador por defecto es utilizado.








       Las siguientes opciones i5/OS están disponibles desde ibm_db2 versión 1.8.0.




         i5_libl


           Un carácter que indica la biblioteca que será utilizada para resolver
           las referencias de ficheros no calificadas. Especifique la lista de bibliotecas
           en la forma de elementos separados por espacios :
           'i5_libl'=&gt;"MYLIB YOURLIB ANYLIB".


**Nota**:

             i5_libl llama a qsys2/qcmdexc('cmd',cmdlen), que
             está disponible desde i5/OS V5R4.












### Valores devueltos

Devuelve el recurso de conexión si la tentativa de conexión tiene éxito.
**db2_pconnect()** intenta reutilizar un recurso de
conexión existente que coincide perfectamente con los parámetros tales como la base de datos
database, el usuario username
y la contraseña password. Si la tentativa de
conexión falla, **db2_pconnect()** devuelve **[false](#constant.false)**

### Historial de cambios

       Versión
       Descripción






       PECL ibm_db2 1.9.0

        Las transacciones activas sobre conexiones persistentes serán anuladas al
        final de cada consulta.




       PECL ibm_db2 1.8.0

        La opción i5_libl está disponible para los usuarios
        de i5/OS.




       PECL ibm_db2 1.7.0

        La opción trustedcontext está disponible.




       PECL ibm_db2 1.5.1

        Las opciones i5_lib, i5_naming,
        i5_commit,
        i5_query_optimize,
        i5_dbcs_alloc,
        i5_date_fmt,
        i5_date_sep,
        i5_time_fmt, i5_time_sep
        y i5_decimal_sep están disponibles para los usuarios
        de i5/OS.





### Ejemplos

    **Ejemplo #1 Ejemplo de uso de db2_pconnect()**



     En el siguiente ejemplo, la primera llamada a
     **db2_pconnect()** devuelve un nuevo recurso de
     conexión persistente. La segunda llamada a la función
     **db2_pconnect()** devuelve un recurso de conexión
     persistente que reutiliza el primer recurso de conexión.

&lt;?php
$database = 'EJEMPLO';
$user = 'db2inst1';
$password = 'ibmdb2';

$pconn = db2_pconnect($database, $user, $password);

if ($pconn) {
echo "Conexión persistente exitosa.";
}
else {
echo "Conexión persistente fallida.";
}

$pconn2 = db2_pconnect($database, $user, $password);
if ($pconn) {
echo "Segunda conexión persistente exitosa.";
}
else {
echo "Segunda conexión persistente fallida.";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión persistente exitosa.
Segunda conexión persistente exitosa.

    **Ejemplo #2 Uso de contextos de confianza DB2**



     El siguiente ejemplo muestra cómo activar un usuario de confianza,
     cambiar a él, y obtener un identificador de usuario.

&lt;?php

$database = "SAMPLE";
$hostname = "localhost";
$port = 50000;
$authID = "db2inst1";
$auth_pass = "ibmdb2";

$tc_user = "tcuser";
$tc_pass = "tcpassword";

$dsn = "DATABASE=$database;HOSTNAME=$hostname;PORT=$port;
PROTOCOL=TCPIP;UID=$authID;PWD=$auth_pass;";
$options = array ("trustedcontext" =&gt; DB2_TRUSTED_CONTEXT_ENABLE);

$tc_conn = db2_pconnect($dsn, "", "", $options);
if($tc_conn) {
echo "Conexión de confianza exitosa.\n";

    if(db2_get_option($tc_conn, "trustedcontext")) {
        $userBefore = db2_get_option($tc_conn, "trusted_user");

        //Trabajo por el usuario 1.

        //Cambio al usuario de confianza.
        $parameters = array("trusted_user" =&gt; $tc_user,
          "trusted_password" =&gt; $tcuser_pass);
        $res = db2_set_option ($tc_conn, $parameters, 1);

        $userAfter = db2_get_option($tc_conn, "trusted_user");
        //Hacer más trabajo como usuario de confianza.

        if($userBefore != $userAfter) {
            echo "Usuario cambiado." . "\n";
        }
    }

    db2_close($tc_conn);

}
else {
echo "Conexión de confianza fallida.\n";
}
?&gt;

    El ejemplo anterior mostrará:

Conexión de confianza exitosa.
Usuario cambiado

### Ver también

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

# db2_prepare

(PECL ibm_db2 &gt;= 1.0.0)

db2_prepare —
Prepara una consulta SQL para ser ejecutada

### Descripción

**db2_prepare**([resource](#language.types.resource) $connection, [string](#language.types.string) $statement, [array](#language.types.array) $options = []): [resource](#language.types.resource)|[false](#language.types.singleton)

**db2_prepare()** crea una consulta SQL preparada que puede
incluir ningún o varios marcadores (caracteres ?)
representando los argumentos de entrada, salida o entrada/salida. Se
pueden pasar argumentos a la consulta preparada utilizando la
función [db2_bind_param()](#function.db2-bind-param), si solo hay entradas,
se puede utilizar [db2_execute()](#function.db2-execute).

Existen tres ventajas principales de utilizar consultas preparadas en
la aplicación :

    -

      *Rendimiento* : al preparar una consulta, el
      servidor de base de datos crea un plan de acceso optimizado para la
      recuperación de datos con la consulta. Posteriormente, el envío de la
      consulta preparada con [db2_execute()](#function.db2-execute) permite a la
      consulta reutilizar el plan de acceso y así evitar sobrecargas del
      procesador en cada envío de consulta que crearía dinámicamente un
      nuevo plan de acceso.





    -

      *Seguridad* : al preparar una consulta, se pueden
      incluir marcadores para los valores de entrada. Al ejecutar una
      consulta preparada con estos valores de entrada, el servidor de
      base de datos verifica cada valor de entrada para asegurarse de que
      los tipos coincidan con la definición de la columna o del parámetro
      de definición.





    -

      *Funcionalidad avanzada* : Los marcadores permiten
      no solo pasar valores de entrada en las consultas SQL preparadas,
      sino también recuperar parámetros de SALIDA y de ENTRADA/SALIDA de
      los procedimientos de registro utilizando la función
      [db2_bind_param()](#function.db2-bind-param).


### Parámetros

     connection


       Una variable recurso de conexión válida devuelta por
       [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).






     statement


       Una consulta SQL que puede contener uno o varios marcadores.






     options


       Un array asociativo que contiene las opciones de la consulta. Se
       puede utilizar este parámetro para solicitar un cursor flotante en
       los servidores de base de datos que soportan esta funcionalidad.




       Para una descripción de las opciones válidas, consulte la función
       [db2_set_option()](#function.db2-set-option).





### Valores devueltos

Devuelve una variable recurso si la consulta SQL fue enviada
correctamente o **[false](#constant.false)** si el servidor de base de datos ha
devuelto un error. Se puede determinar qué error fue devuelto
llamando a la función
[db2_stmt_error()](#function.db2-stmt-error) o [db2_stmt_errormsg()](#function.db2-stmt-errormsg).

### Ejemplos

    **Ejemplo #1 Preparación y ejecución de una consulta SQL con marcadores**



     El siguiente ejemplo prepara una consulta INSERT que acepta cuatro
     marcadores, luego itera sobre el array que contiene los valores de
     entrada que serán pasados a la función [db2_execute()](#function.db2-execute).

&lt;?php
$animales = array(
array(0, 'gato', 'Pook', 3.2),
array(1, 'perro', 'Peaches', 12.3),
array(2, 'caballo', 'Smarty', 350.0),
);

$insert = 'INSERT INTO animales (id, raza, nombre, peso)
    VALUES (?, ?, ?, ?)';
$stmt = db2_prepare($conn, $insert);
if ($stmt) {
foreach ($animales as $animal) {
        $result = db2_execute($stmt, $animal);
}
}
?&gt;

### Ver también

    - [db2_bind_param()](#function.db2-bind-param) - Asocia una variable PHP a un parámetro de una consulta SQL

    - [db2_execute()](#function.db2-execute) - Ejecuta una consulta SQL preparada

    - [db2_stmt_error()](#function.db2-stmt-error) - Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL

    - [db2_stmt_errormsg()](#function.db2-stmt-errormsg) - Devuelve el último mensaje de error de una consulta SQL

# db2_primary_keys

(PECL ibm_db2 &gt;= 1.0.0)

db2_primary_keys —
Devuelve un conjunto de resultados que lista las claves de una tabla

### Descripción

**db2_primary_keys**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [?](#language.types.null)[string](#language.types.string) $schema,
    [string](#language.types.string) $table_name
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las claves de una tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos, pase
       **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. Si schema es
       **[null](#constant.null)**, **db2_primary_keys()** hace coincidir el esquema
       para la conexión actual.






     table_name


       El nombre de la tabla.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene filas
que describen las claves primarias de la tabla especificada. El conjunto de resultados
está compuesto por las siguientes columnas:

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo de la tabla que contiene la clave primaria. El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       TABLE_SCHEM
       Nombre del esquema de la tabla que contiene la clave primaria.



       TABLE_NAME
       Nombre de la tabla que contiene la clave primaria.



       COLUMN_NAME
       Nombre de la columna que contiene la clave primaria.



       KEY_SEQ
       Posición, comenzando en 1, de la columna en la clave.



       PK_NAME
       Nombre de la clave primaria.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_procedure_columns

(PECL ibm_db2 &gt;= 1.0.0)

db2_procedure_columns —
Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

### Descripción

**db2_procedure_columns**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $procedure,
    [?](#language.types.null)[string](#language.types.string) $parameter
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista los argumentos para uno o varios
procedimientos de registro.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos,
       pase **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. El argumento acepta formas
       que contienen _ y % como comodín.






     procedure


       El nombre del procedimiento. El argumento acepta formas
       que contienen _ y % como comodín.






     parameter


       El nombre del argumento. Este argumento acepta un argumento de búsqueda que
       contiene _ y % como comodín. Si este
       argumento es **[null](#constant.null)**, se devuelven todos los argumentos para el procedimiento
       de registro especificado.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen los argumentos para los procedimientos de registro que coinciden
con los argumentos especificados. Las filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






       PROCEDURE_CAT
       Nombre del catálogo que contiene la tabla.
       El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       PROCEDURE_SCHEM
       Nombre del esquema que contiene el procedimiento de registro.



       PROCEDURE_NAME
       Nombre del procedimiento.



       COLUMN_NAME
       Nombre del argumento.



       COLUMN_TYPE


         Un integer que representa el tipo del argumento:






             Valor de retorno
             Tipo de argumento






             1 (SQL_PARAM_INPUT)
             Argumento de entrada (IN).



             2 (SQL_PARAM_INPUT_OUTPUT)
             Argumento de entrada/salida (INOUT).



             3 (SQL_PARAM_OUTPUT)
             Argumento de salida (OUT).











       DATA_TYPE
       El tipo de datos SQL para el argumento representado como integer.



       TYPE_NAME
       Una string que representa el tipo de datos para el argumento.



       COLUMN_SIZE
       Un integer que representa el tamaño del argumento.



       BUFFER_LENGTH
       Número máximo de bytes necesarios para almacenar datos de este argumento.



       DECIMAL_DIGITS
       La escala del argumento o **[null](#constant.null)** donde la escala no es aplicable.



       NUM_PREC_RADIX
       Un integer que puede ser 10 (que representa un tipo de datos numérico exacto), 2 (que representa una aproximación de tipo de datos numéricos) o **[null](#constant.null)** (que representa un tipo de datos para el cual la base no es aplicable).



       NULLABLE
       Un integer que representa si el argumento puede ser nulo o no.



       REMARKS
       Descripción del argumento.



       COLUMN_DEF
       Valor por defecto del argumento.



       SQL_DATA_TYPE
       Un integer que representa el tamaño del argumento.



       SQL_DATETIME_SUB
       Devuelve un integer que representa un código de subtipo
       datetime o
       **[null](#constant.null)** si los tipos de datos SQL no aplican.



       CHAR_OCTET_LENGTH
       Tamaño máximo en bytes para los tipos de datos de carácter del argumento, que coincide con COLUMN_SIZE para un solo byte de datos o **[null](#constant.null)** para un tipo de datos que no es de caracteres.



       ORDINAL_POSITION
       La posición del argumento comenzando en 1 en la consulta
       CALL.



       IS_NULLABLE
       Una string cuyo valor es YES significa que el argumento
       acepta o devuelve valores **[null](#constant.null)** y NO significa que el
       argumento no acepta ni devuelve valores **[null](#constant.null)**.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_procedures

(PECL ibm_db2 &gt;= 1.0.0)

db2_procedures —
Devuelve un conjunto de resultados que lista las proceduras de registro
almacenadas en la base de datos

### Descripción

**db2_procedures**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $procedure
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las proceduras de registro
almacenadas en la base de datos.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       los servidores OS/390 o z/OS. Para otras bases de datos,
       pase **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. El parámetro acepta las formas
       que contienen _ y % como palabras clave.






     procedure


       El nombre de la procedura. El parámetro acepta las formas
       que contienen _ y % como palabras clave.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen las proceduras de registro que coinciden con los parámetros
especificados. Las filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






        PROCEDURE_CAT
        Nombre del catálogo que contiene la tabla.
        El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



        PROCEDURE_SCHEM
        Nombre del esquema que contiene la procedura de registro.



        PROCEDURE_NAME
        Nombre de la procedura.



        NUM_INPUT_PARAMS
        Número de parámetros de entrada (IN) para la procedura de registro.



        NUM_OUTPUT_PARAMS
        Número de parámetros de salida (OUT) para la procedura de registro.



        NUM_RESULT_SETS
        Número de conjuntos de resultados devueltos por la procedura de registro.



        REMARKS
        Comentarios sobre la procedura de registro.



        PROCEDURE_TYPE
        Siempre devuelve 1, indicando que la
        procedura de registro no devuelve ningún valor de retorno.





### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_result

(PECL ibm_db2 &gt;= 1.0.0)

db2_result —
Devuelve un valor de una columna de una fila de un conjunto de resultados

### Descripción

**db2_result**([resource](#language.types.resource) $stmt, [int](#language.types.integer)|[string](#language.types.string) $column): [?](#language.types.null)[mixed](#language.types.mixed)

Utilice **db2_result()** para devolver un valor de una
columna específica en la fila actual de un conjunto de resultados. Debe
llamarse a [db2_fetch_row()](#function.db2-fetch-row) antes de llamar a
**db2_result()** para almacenar los valores apuntados del
conjunto de resultados.

### Parámetros

     stmt


        Un recurso stmt válido.






     column


        Un array de enteros que comienza con el índice 0 que apunta a los
        campos del conjunto de resultados o una cadena que representa el nombre
        de la columna.






### Valores devueltos

Devuelve el valor del campo solicitado si el campo existe en el conjunto de
resultados. Devuelve **[null](#constant.null)** si el campo no existe y genera una alerta PHP.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso de db2_result()**



     El siguiente ejemplo demuestra cómo iterar a través de un conjunto de
     resultados con la función [db2_fetch_row()](#function.db2-fetch-row) y recuperar
     las columnas del conjunto de resultados con **db2_result()**.

&lt;?php
$sql = 'SELECT nom, race FROM animales WHERE poids &lt; ?';
$stmt = db2_prepare($conn, $sql);
db2_execute($stmt, array(10));
while (db2_fetch_row($stmt)) {
    $nom = db2_result($stmt, 0);
$race = db2_result($stmt, 'RACE');
print "$nom $race";
}
?&gt;

    El ejemplo anterior mostrará:

chat Pook
cyprin doré Bubbles
perruche Gizmo
chèvre Rickety Ride

### Ver también

    - [db2_fetch_array()](#function.db2-fetch-array) - Devuelve un array, indexado por la posición de las columnas, que representa

una línea del conjunto de resultados

    - [db2_fetch_assoc()](#function.db2-fetch-assoc) - Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados

    - [db2_fetch_both()](#function.db2-fetch-both) - Devuelve un array, indexado por nombre de columna y posición, que representa

una fila del conjunto de resultados

    - [db2_fetch_object()](#function.db2-fetch-object) - Devuelve un objeto con las propiedades que representan columnas en la

fila extraída

    - [db2_fetch_row()](#function.db2-fetch-row) - Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea

solicitada

# db2_rollback

(PECL ibm_db2 &gt;= 1.0.0)

db2_rollback —
Cancelar una transacción

### Descripción

**db2_rollback**([resource](#language.types.resource) $connection): [bool](#language.types.boolean)

Cancela una transacción en progreso en el recurso de conexión especificado
y comienza una nueva transacción. Comunmente las aplicaciones de PHP confirman las
transacciones de manera automática por lo que la función **db2_rollback()**
no tendría efecto a menos que este modo haya sido desactivado para este recurso.

### Parámetros

     connection


       Un recurso de conexión válido devuelto por
       [db2_connect()](#function.db2-connect) o [db2_pconnect()](#function.db2-pconnect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Cancelando una sentencia DELETE**



     En el siguiente ejemplo se cuenta el número de filas en una tabla, se cancelan
     las confirmaciones automáticas en la conexión, se eliminan todas las filas de la tabla
     y devuelve el total de 0 para confirmar que las filas se han borrado.
     Cuando se llama a **db2_rollback()**
     y se devuelve el total actualizado de filas en la tabla para demostrar que el número es
     igual al original (antes de ejecutar la sentancia DELETE). Esto demuestra
     que la cancelación de la transacción fue correcto.

&lt;?php
$conn = db2_connect($database, $user, $password);

if ($conn) {
    $stmt = db2_exec($conn, "SELECT count(\*) FROM animals");
$res = db2_fetch_array( $stmt );
echo $res[0] . "\n";

    // Turn AUTOCOMMIT off
    db2_autocommit($conn, DB2_AUTOCOMMIT_OFF);

    // Delete all rows from ANIMALS
    db2_exec($conn, "DELETE FROM animals");

    $stmt = db2_exec($conn, "SELECT count(*) FROM animals");
    $res = db2_fetch_array( $stmt );
    echo $res[0] . "\n";

    // Roll back the DELETE statement
    db2_rollback( $conn );

    $stmt = db2_exec( $conn, "SELECT count(*) FROM animals" );
    $res = db2_fetch_array( $stmt );
    echo $res[0] . "\n";
    db2_close($conn);

}
?&gt;

    El ejemplo anterior mostrará:

7
0
7

### Ver también

    - [db2_autocommit()](#function.db2-autocommit) - Devuelve o modifica el estado AUTOCOMMIT de la conexión a la base de datos

    - [db2_commit()](#function.db2-commit) - Confirmar una transacción

# db2_server_info

(PECL ibm_db2 &gt;= 1.1.1)

db2_server_info — Devuelve un objeto con propiedades que describen el servidor de base de datos DB2

### Descripción

**db2_server_info**([resource](#language.types.resource) $connection): [stdClass](#class.stdclass)|[false](#language.types.singleton)

Esta función devuelve un objeto con propiedades de solo lectura que
proporcionan información sobre el servidor de base de datos IBM DB2,
Cloudscape o Apache Derby. La tabla siguiente lista las propiedades del
servidor de base de datos:

    <caption>**Propiedades del servidor de base de datos**</caption>



       Nombre de la propiedad
       Tipo de retorno
       Descripción






       DBMS_NAME
       [string](#language.types.string)
       El nombre del servidor de base de datos al que se está
        conectado. Para servidores DB2, es una combinación de
        DB2 seguido del sistema operativo en el que
        funciona el servidor de base de datos.



       DBMS_VER
       [string](#language.types.string)
       La versión del servidor de base de datos, en formato de
        [string](#language.types.string) "MM.mm.uuuu" donde MM es la versión mayor,
        mm es la versión menor y uuuu
        es la actualización. Por ejemplo, "08.02.0001" representa la versión
        mayor 8, la versión menor 2, la actualización 1.




       DB_CODEPAGE
       [int](#language.types.integer)
       La página de código de la base de datos a la que se está
        conectado.



       DB_NAME
       [string](#language.types.string)
       El nombre de la base de datos a la que se está conectado.



       DFT_ISOLATION
       [string](#language.types.string)

        El nivel predeterminado de aislamiento de transacción soportado por el
        servidor:




          UR


            Lectura no confirmada (Uncommitted read): los cambios son
            inmediatamente visibles para todas las transacciones concurrentes.






          CS


            Estabilidad del cursor (Cursor stability): una fila leída por una
            transacción puede ser modificada y confirmada por una segunda
            transacción concurrente.






          RS


            Estabilidad de lectura (Read stability): una transacción puede
            agregar o eliminar filas que coincidan con una condición
            de búsqueda o una transacción pendiente.






          RR


            Lectura repetible (Repeatable read): los datos afectados por las
            transacciones pendientes no están disponibles para otras
            transacciones.






          NC


            Sin confirmación (No commit): todo cambio es visible al final
            de una operación exitosa. Las confirmaciones explícitas y los retrocesos no están
            permitidos.











       IDENTIFIER_QUOTE_CHAR
       [string](#language.types.string)
       El carácter utilizado para delimitar un identificador.



       INST_NAME
       [string](#language.types.string)
       La instancia en el servidor de base de datos que contiene la
        base de datos.



       ISOLATION_OPTION
       [array](#language.types.array)
       Un array de opciones de aislamiento soportadas por el servidor de
       base de datos. Las opciones de aislamiento se describen en la
       propiedad DFT_ISOLATION.



       KEYWORDS
       [array](#language.types.array)
       Un array de palabras clave reservadas por el servidor de base de
        datos.



       LIKE_ESCAPE_CLAUSE
       [bool](#language.types.boolean)
       **[true](#constant.true)** si el servidor de base de datos soporta el uso de
       los caracteres comodín % y
       _. **[false](#constant.false)** si el servidor de base de datos no
       soporta estos caracteres comodín.



       MAX_COL_NAME_LEN
       [int](#language.types.integer)
       Tamaño máximo de un nombre de columna soportado por el servidor de
       base de datos, expresado en bytes.



       MAX_IDENTIFIER_LEN
       [int](#language.types.integer)
       Tamaño máximo de un identificador SQL soportado por los servidores
       de base de datos, expresado en caracteres.



       MAX_INDEX_SIZE
       [int](#language.types.integer)
       Tamaño máximo de las columnas combinadas en un índice soportado
       por el servidor de base de datos, expresado en bytes.



       MAX_PROC_NAME_LEN
       [int](#language.types.integer)
       Tamaño máximo de un nombre de procedimiento soportado por el servidor de
       base de datos, expresado en bytes.



       MAX_ROW_SIZE
       [int](#language.types.integer)
       Tamaño máximo de una fila en la tabla de base soportada por
       el servidor de base de datos, expresado en bytes.



       MAX_SCHEMA_NAME_LEN
       [int](#language.types.integer)
       Tamaño máximo de un nombre de esquema soportado por el servidor de
       base de datos, expresado en bytes.



       MAX_STATEMENT_LEN
       [int](#language.types.integer)
       Tamaño máximo de una consulta SQL soportada por el servidor de
       base de datos, expresado en bytes.



       MAX_TABLE_NAME_LEN
       [int](#language.types.integer)
       Tamaño máximo de un nombre de tabla soportado por el servidor de
       base de datos, expresado en bytes.



       NON_NULLABLE_COLUMNS
       [bool](#language.types.boolean)
       **[true](#constant.true)** si el servidor de base de datos soporta las columnas
        que pueden ser definidas como NOT NULL, **[false](#constant.false)** si el servidor de base
        de datos no soporta las columnas definidas como NOT
        NULL.



       PROCEDURES
       [bool](#language.types.boolean)
       **[true](#constant.true)** si el servidor de base de datos soporta el uso de
        la consulta CALL para llamar a los procedimientos almacenados, **[false](#constant.false)** si
        el servidor de base de datos no soporta la consulta CALL.



       SPECIAL_CHARS
       [string](#language.types.string)
       Un [string](#language.types.string) que contiene todos los caracteres distintos de las letras
       (mayúsculas y minúsculas), los dígitos y el carácter de subrayado
        que pueden ser utilizados como nombre de identificador.



       SQL_CONFORMANCE
       [string](#language.types.string)

        El nivel de conformidad con la especificación ANSI/ISO SQL-92
        ofrecido por el servidor de base de datos:




          ENTRY


            Nivel de conformidad SQL-92.






          FIPS127


            Conformidad tradicional FIPS-127-2.






          FULL


            Nivel completo de conformidad SQL-92.






          INTERMEDIATE


            Nivel intermedio de conformidad SQL-92.












### Parámetros

     connection


       Especifica la conexión cliente DB2 activa.





### Valores devueltos

Devuelve un objeto si la llamada es exitosa, o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con db2_server_info()**



     Para recuperar información sobre el servidor, se debe pasar
     un recurso de conexión de base de datos válido a la función
     **db2_server_info()**.



    &lt;?php

$conn = db2_connect('sample', 'db2inst1', 'ibmdb2');

$server = db2_server_info( $conn );

if ($server) {
    echo "DBMS_NAME: ";                 var_dump( $server-&gt;DBMS_NAME );
    echo "DBMS_VER: ";                  var_dump( $server-&gt;DBMS_VER );
    echo "DB_CODEPAGE: ";               var_dump( $server-&gt;DB_CODEPAGE );
    echo "DB_NAME: ";                   var_dump( $server-&gt;DB_NAME );
    echo "INST_NAME: ";                 var_dump( $server-&gt;INST_NAME );
    echo "SPECIAL_CHARS: ";             var_dump( $server-&gt;SPECIAL_CHARS );
    echo "KEYWORDS: ";                  var_dump( sizeof($server-&gt;KEYWORDS) );
echo "DFT_ISOLATION: "; var_dump( $server-&gt;DFT_ISOLATION );
echo "ISOLATION_OPTION: ";
$il = '';
foreach( $server-&gt;ISOLATION_OPTION as $opt )
{
$il .= $opt." ";
}
var_dump( $il );
echo "SQL_CONFORMANCE: "; var_dump( $server-&gt;SQL_CONFORMANCE );
echo "PROCEDURES: "; var_dump( $server-&gt;PROCEDURES );
echo "IDENTIFIER_QUOTE_CHAR: "; var_dump( $server-&gt;IDENTIFIER_QUOTE_CHAR );
echo "LIKE_ESCAPE_CLAUSE: "; var_dump( $server-&gt;LIKE_ESCAPE_CLAUSE );
echo "MAX_COL_NAME_LEN: "; var_dump( $server-&gt;MAX_COL_NAME_LEN );
echo "MAX_ROW_SIZE: "; var_dump( $server-&gt;MAX_ROW_SIZE );
echo "MAX_IDENTIFIER_LEN: "; var_dump( $server-&gt;MAX_IDENTIFIER_LEN );
echo "MAX_INDEX_SIZE: "; var_dump( $server-&gt;MAX_INDEX_SIZE );
echo "MAX_PROC_NAME_LEN: "; var_dump( $server-&gt;MAX_PROC_NAME_LEN );
echo "MAX_SCHEMA_NAME_LEN: "; var_dump( $server-&gt;MAX_SCHEMA_NAME_LEN );
echo "MAX_STATEMENT_LEN: "; var_dump( $server-&gt;MAX_STATEMENT_LEN );
echo "MAX_TABLE_NAME_LEN: "; var_dump( $server-&gt;MAX_TABLE_NAME_LEN );
echo "NON_NULLABLE_COLUMNS: "; var_dump( $server-&gt;NON_NULLABLE_COLUMNS );

    db2_close($conn);

}
?&gt;

    El ejemplo anterior mostrará:


    DBMS_NAME: string(9) "DB2/LINUX"

DBMS_VER: string(10) "08.02.0000"
DB_CODEPAGE: int(1208)
DB_NAME: string(6) "SAMPLE"
INST_NAME: string(8) "db2inst1"
SPECIAL_CHARS: string(2) "@#"
KEYWORDS: int(179)
DFT_ISOLATION: string(2) "CS"
ISOLATION_OPTION: string(12) "UR CS RS RR "
SQL_CONFORMANCE: string(7) "FIPS127"
PROCEDURES: bool(true)
IDENTIFIER_QUOTE_CHAR: string(1) """
LIKE_ESCAPE_CLAUSE: bool(true)
MAX_COL_NAME_LEN: int(30)
MAX_ROW_SIZE: int(32677)
MAX_IDENTIFIER_LEN: int(18)
MAX_INDEX_SIZE: int(1024)
MAX_PROC_NAME_LEN: int(128)
MAX_SCHEMA_NAME_LEN: int(30)
MAX_STATEMENT_LEN: int(2097152)
MAX_TABLE_NAME_LEN: int(128)
NON_NULLABLE_COLUMNS: bool(true)

### Ver también

    - [db2_client_info()](#function.db2-client-info) - Devuelve un objeto con propiedades que describen el cliente de base de datos DB2

# db2_set_option

(PECL ibm_db2 &gt;= 1.0.0)

db2_set_option — Establece opciones para una conexión o recursos

### Descripción

**db2_set_option**([resource](#language.types.resource) $resource, [array](#language.types.array) $options, [int](#language.types.integer) $type): [bool](#language.types.boolean)

Establece opciones para un recurso o una conexión. No se pueden
establecer opciones para un conjunto de resultados.

### Parámetros

     resource


       Un recurso válido como el devuelto por
       [db2_prepare()](#function.db2-prepare) o una conexión válida como
       la devuelta por [db2_connect()](#function.db2-connect) o
       [db2_pconnect()](#function.db2-pconnect).






     options


       Un array asociativo que contiene opciones de recursos o de
       conexión válidas. Este parámetro puede ser utilizado para cambiar
       los valores de autocommit, tipos de cursor (flotante o de avance
       único) y especificar la capitalización de los nombres de columna (minúscula,
       mayúscula o natural) que aparecerá en el conjunto de resultados.




         autocommit


           Pasar **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)** activa
           el autocommit para la conexión especificada.




           Pasar **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)** desactiva
           el autocommit para la conexión especificada.






         cursor


           Pasar **[DB2_FORWARD_ONLY](#constant.db2-forward-only)** especifica un
           cursor de avance único para un recurso. Este es el
           tipo por defecto para un cursor y es soportado por todos
           los servidores de base de datos.




           Pasar **[DB2_SCROLLABLE](#constant.db2-scrollable)** especifica un
           cursor flotante para un recurso. Los cursores
           flotantes permiten que las filas de resultados sean
           accesibles en un orden no secuencial. Este tipo de
           cursor es soportado solo por las bases de datos
           IBM DB2 Universal Database.






         binmode


           Pasar **[DB2_BINARY](#constant.db2-binary)** especifica que los
           datos binarios serán devueltos como tales. Este es el
           modo por defecto. Esto es equivalente a la
           configuración ibm_db2.binmode=1 en
           php.ini.




           Pasar **[DB2_CONVERT](#constant.db2-convert)** especifica que los
           datos binarios serán convertidos a codificación hexadecimal
           y serán devueltos así. Esto es equivalente a la
           configuración ibm_db2.binmode=2 en
           php.ini.




           Pasar **[DB2_PASSTHRU](#constant.db2-passthru)** especifica que los
           datos binarios serán convertidos a **[null](#constant.null)**.
           Esto es equivalente a la
           configuración ibm_db2.binmode=3 en
           php.ini.






         db2_attr_case


           Pasar **[DB2_CASE_LOWER](#constant.db2-case-lower)** especifica que los
           nombres de las columnas en el conjunto de resultados serán
           devueltos en minúsculas.




           Pasar **[DB2_CASE_UPPER](#constant.db2-case-upper)** especifica que los
           nombres de las columnas en el conjunto de resultados serán
           devueltos en mayúsculas.




           Pasar **[DB2_CASE_NATURAL](#constant.db2-case-natural)** especifica que
           los nombres de columnas en el conjunto de resultados serán
           devueltos en su capitalización natural.






         deferred_prepare


           Pasar **[DB2_DEFERRED_PREPARE_ON](#constant.db2-deferred-prepare-on)** activa
           la preparación diferida en el recurso de consulta especificado.




           Pasar **[DB2_DEFERRED_PREPARE_OFF](#constant.db2-deferred-prepare-off)** desactiva
           la preparación diferida en el recurso de consulta especificado.








       Las siguientes nuevas opciones i5/OS están disponibles desde la
       versión 1.5.1 de ibm_db2. Estas opciones se aplican únicamente cuando
       PHP e ibm_db2 funcionan de forma nativa en un sistema i5.




         i5_fetch_only


           DB2_I5_FETCH_ON: los cursores son de
           solo lectura y no pueden ser utilizados para posicionar
           actualizaciones y eliminaciones. Este es el valor
           por defecto a menos que la variable de entorno
           SQL_ATTR_FOR_FETCH_ONLY haya sido establecida a
           SQL_FALSE.




           DB2_I5_FETCH_OFF: los cursores
           pueden ser posicionados para actualizaciones y
           eliminaciones.








       Las siguientes nuevas opciones están disponibles desde
       ibm_db2 versión 1.8.0 y posteriores.




         rowcount


           DB2_ROWCOUNT_PREFETCH_ON - El cliente puede solicitar
           un conteo completo de las filas antes de recuperarlas, lo que
           significa que la función [db2_num_rows()](#function.db2-num-rows) devuelve
           el número de filas seleccionadas incluso si se utiliza un cursor
           ROLLFORWARD_ONLY.




           DB2_ROWCOUNT_PREFETCH_OFF - El cliente
           no puede solicitar un conteo completo de las filas antes de recuperarlas.








       Las siguientes opciones son nuevas y están disponibles desde
       ibm_db2 versión 1.7.0.




         trusted_user


           Para cambiar al usuario a un usuario de confianza,
           indique el identificador de usuario como string del usuario
           de confianza que desea utilizar. Esta opción puede ser
           configurada solo a nivel de conexión. Para utilizar esta
           opción, un contexto de confianza debe estar activado en el recurso
           de conexión.






         trusted_password


           La contraseña, como string, que corresponde al usuario
           de confianza.








       Las siguientes opciones son nuevas y están disponibles desde
       ibm_db2 versión 1.6.0. Estas opciones son útiles para obtener información de
       seguimiento, accesible a través de [db2_get_option()](#function.db2-get-option).


**Nota**:

         Cuando el valor de cada opción está a punto de ser definido, algunos
         servidores pueden no manejar toda la longitud proporcionada y pueden
         truncar el valor.




         Para asegurarse de que los datos especificados en cada opción se convertirán
         correctamente cuando se transmitan al sistema, utilice solo
         los caracteres de A a Z, 0 a 9, los guiones bajos (_) y
         los puntos (.).






         userid


           SQL_ATTR_INFO_USERID: un puntero a un [string](#language.types.string)
           terminado por **[null](#constant.null)** utilizado para identificar el ID de usuario del cliente enviado
           al servidor de base de datos, durante la conexión DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soporta una longitud mayor a
             16 caracteres. El ID de usuario no debe confundirse con el ID de usuario
             de identificación, se utiliza para los procesos de identificación únicamente
             y no para los de autorización.








         acctstr


           SQL_ATTR_INFO_ACCTSTR: un puntero a un [string](#language.types.string)
           terminado por **[null](#constant.null)** utilizado para identificar la cuenta del cliente a enviar
           al servidor de base de datos durante la conexión DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soporta una longitud mayor a
             200 caracteres.








         applname


           SQL_ATTR_INFO_APPLNAME: un puntero a un [string](#language.types.string)
           terminado por **[null](#constant.null)** utilizado para identificar el nombre de la aplicación cliente
           a enviar al servidor de base de datos durante la conexión DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soporta una longitud mayor a
             32 caracteres.








         wrkstnname


           SQL_ATTR_INFO_WRKSTNNAME: un puntero a un [string](#language.types.string)
           terminado por **[null](#constant.null)** utilizado para identificar el nombre de la estación a
           enviar al servidor de base de datos durante la conexión DB2.


**Nota**:

             DB2 para servidores z/OS y OS/390 soporta una longitud mayor a
             18 caracteres.












     type


       Un [int](#language.types.integer) que especifica el tipo de recurso que ha sido pasado a
       la función. El tipo de recurso y valor deben coincidir.




       Pasar 1 como valor especifica
       que un recurso de conexión ha sido pasado a la función.




       Pasar cualquier [int](#language.types.integer) diferente de
       1 como valor especifica que un
       recurso ha sido pasado a la función.





La siguiente tabla especifica qué opciones son compatibles con qué
tipos de recursos:

    <caption>**Matriz de parámetros de recurso**</caption>

     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">
     <col style="text-align: center;">



       Clave
       Valor
       Tipo de recurso







         Conexión
       Consulta
       Conjunto de resultados



       autocommit
       **[DB2_AUTOCOMMIT_ON](#constant.db2-autocommit-on)**
       X
       -
       -



       autocommit
       **[DB2_AUTOCOMMIT_OFF](#constant.db2-autocommit-off)**
       X
       -
       -



       cursor
       **[DB2_SCROLLABLE](#constant.db2-scrollable)**
       -
       X
       -



       cursor
       **[DB2_FORWARD_ONLY](#constant.db2-forward-only)**
       -
       X
       -



       binmode
       **[DB2_BINARY](#constant.db2-binary)**
       X
       X
       -



       binmode
       **[DB2_CONVERT](#constant.db2-convert)**
       X
       X
       -



       binmode
       **[DB2_PASSTHRU](#constant.db2-passthru)**
       X
       X
       -



       db2_attr_case
       **[DB2_CASE_LOWER](#constant.db2-case-lower)**
       X
       X
       -



       db2_attr_case
       **[DB2_CASE_UPPER](#constant.db2-case-upper)**
       X
       X
       -



       db2_attr_case
       **[DB2_CASE_NATURAL](#constant.db2-case-natural)**
       X
       X
       -



       deferred_prepare
       **[DB2_DEFERRED_PREPARE_ON](#constant.db2-deferred-prepare-on)**
       -
       X
       -



       deferred_prepare
       **[DB2_DEFERRED_PREPARE_OFF](#constant.db2-deferred-prepare-off)**
       -
       X
       -



       i5_fetch_only
       DB2_I5_FETCH_ON
       -
       X
       -



       rowcount
       DB2_ROWCOUNT_PREFETCH_ON
       -
       X
       -



       rowcount
       DB2_ROWCOUNT_PREFETCH_OFF
       -
       X
       -



       trusted_user
       &lt;USER NAME&gt; (String)
       X
       -
       -



       trusted_password
       &lt;PASSWORD&gt; (String)
       X
       -
       -



       i5_fetch_only
       DB2_I5_FETCH_OFF
       -
       X
       -



       userid
       SQL_ATTR_INFO_USERID
       X
       X
       -



       acctstr
       SQL_ATTR_INFO_ACCTSTR
       X
       X
       -



       applname
       SQL_ATTR_INFO_APPLNAME
       X
       X
       -



       wrkstnname
       SQL_ATTR_INFO_WRKSTNNAME
       X
       X
       -




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Establecer un parámetro en un recurso de conexión**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_ON);

/\* Llamada a la función utilizando el tipo correcto de recurso, el array

- de opciones y el valor type \*/
  $result = db2_set_option($conn, $options, 1);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

Opciones establecidas correctamente

    **Ejemplo #2 Establece múltiples parámetros con un recurso de conexión**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF,
'binmode' =&gt; DB2_PASSTHRU,
'db2_attr_case' =&gt; DB2_CASE_UPPER,
'cursor' =&gt; DB2_SCROLLABLE);

/\* Llamada a la función utilizando el tipo correcto de recurso, el array

- de opciones y el valor type \*/
  $result = db2_set_option($conn, $options, 1);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

Opciones establecidas correctamente

    **Ejemplo #3 Establece múltiples parámetros con una clave inválida**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF,
'MI_CLAVE_INVÁLIDA' =&gt; DB2_PASSTHRU,
'db2_attr_case' =&gt; DB2_CASE_UPPER,
'cursor' =&gt; DB2_SCROLLABLE);

/\* Llamada a la función utilizando el tipo correcto de recurso, el array

- de opciones y el valor type \*/
  $result = db2_set_option($conn, $options, 1);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

No se pueden establecer las opciones

    **Ejemplo #4 Establece múltiples parámetros con un valor inválido**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF,
'binmode' =&gt; 'VALOR_INVÁLIDO',
'db2_attr_case' =&gt; DB2_CASE_UPPER,
'cursor' =&gt; DB2_SCROLLABLE);

/\* Llamada a la función utilizando el tipo correcto de recurso, el array

- de opciones y el valor type \*/
  $result = db2_set_option($conn, $options, 1);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

No se pueden establecer las opciones

    **Ejemplo #5 Establece múltiples parámetros con un recurso de conexión y un tipo incorrecto**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF,
'binmode' =&gt; DB2_PASSTHRU,
'db2_attr_case' =&gt; DB2_CASE_UPPER,
'cursor' =&gt; DB2_SCROLLABLE);

/\* Llamada a la función utilizando el tipo incorrecto de recurso, el array

- de opciones y el valor type inválido \*/
  $result = db2_set_option($conn, $options, 2);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

No se pueden establecer las opciones

    **Ejemplo #6 Establece múltiples parámetros con un recurso incorrecto**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('autocommit' =&gt; DB2_AUTOCOMMIT_OFF,
'binmode' =&gt; DB2_PASSTHRU,
'db2_attr_case' =&gt; DB2_CASE_UPPER,
'cursor' =&gt; DB2_SCROLLABLE);

$stmt = db2_prepare($conn, 'SELECT \* FROM EMPLOYEE');

/\* Llamada a la función utilizando el tipo incorrecto de recurso, pero el array

- de opciones y el valor type válido \*/
  $result = db2_set_option($stmt, $options, 1);

/_ Verifica si todas las opciones pueden ser establecidas correctamente _/
if($result)
{
echo 'Opciones establecidas correctamente';
}
else
{
echo 'No se pueden establecer las opciones';
}
?&gt;

    El ejemplo anterior mostrará:

No se pueden establecer las opciones

    **Ejemplo #7 Todo junto**

&lt;?php
/_ Parámetros de Conexión _/
$database = 'SAMPLE';
$hostname = 'localhost';
$port = 50000;
$protocol = 'TCPIP';
$username = 'db2inst1';
$password = 'ibmdb2';

/_ Cadenas de Conexión _/
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;";
$conn_string .= "HOSTNAME=$hostname;PORT=$port;PROTOCOL=$protocol;";
$conn_string .= "UID=$username;PWD=$password;";

/_ Obtención del Recurso de Conexión _/
$conn = db2_connect($conn_string, '', '');

/_ Crea el array asociativo de opciones con pares clave-valor válidos _/
$options = array('db2_attr_case' =&gt; DB2_CASE_LOWER,
'cursor' =&gt; DB2_SCROLLABLE);

$stmt = db2_prepare($conn, 'SELECT \* FROM EMPLOYEE WHERE EMPNO = ? OR EMPNO = ?');

/\* Llamada a la función utilizando el tipo correcto de recurso, el array

- de opciones y el valor type \*/
  $option_result = db2_set_option($stmt, $options, 2);
$result = db2_execute($stmt, array('000130', '000140'));

/_ Obtiene la fila 2 antes que la fila 1 ya que tenemos un cursor flotante _/
print_r(db2_fetch_assoc($stmt, 2));
print '&lt;br /&gt;&lt;br /&gt;';
print_r(db2_fetch_assoc($stmt, 1));

?&gt;

    El ejemplo anterior mostrará:

Array
(
[empno] =&gt; 000140
[firstnme] =&gt; HEATHER
[midinit] =&gt; A
[lastname] =&gt; NICHOLLS
[workdept] =&gt; C01
[phoneno] =&gt; 1793
[hiredate] =&gt; 1976-12-15
[job] =&gt; ANALYST
[edlevel] =&gt; 18
[sex] =&gt; F
[birthdate] =&gt; 1946-01-19
[salary] =&gt; 28420.00
[bonus] =&gt; 600.00
[comm] =&gt; 2274.00
)

Array
(
[empno] =&gt; 000130
[firstnme] =&gt; DELORES
[midinit] =&gt; M
[lastname] =&gt; QUINTANA
[workdept] =&gt; C01
[phoneno] =&gt; 4578
[hiredate] =&gt; 1971-07-28
[job] =&gt; ANALYST
[edlevel] =&gt; 16
[sex] =&gt; F
[birthdate] =&gt; 1925-09-15
[salary] =&gt; 23800.00
[bonus] =&gt; 500.00
[comm] =&gt; 1904.00
)

    **Ejemplo #8 Los cursores i5/OS son de solo lectura**

&lt;?php
$conn = db2_connect("", "", "", array("i5_lib"=&gt;"nobody"));
$stmt = db2_prepare($conn, 'select * from names where first = ?');
$name = "first2";
db2_bind_param($stmt, 1, "name", DB2_PARAM_IN);
$options = array("i5_fetch_only"=&gt;DB2_I5_FETCH_ON);
db2_set_option($stmt,$options,0);
if (db2_execute($stmt)) {
   while ($row = db2_fetch_array($stmt)) {
      echo "{$row[0]} {$row[1]}";
}
}
?&gt;

    El ejemplo anterior mostrará:

first2 last2

### Ver también

    - [db2_connect()](#function.db2-connect) - Devuelve una conexión a una base de datos

    - [db2_pconnect()](#function.db2-pconnect) - Devuelve una conexión persistente a una base de datos

    - [db2_exec()](#function.db2-exec) - Ejecuta una consulta SQL directamente

    - [db2_prepare()](#function.db2-prepare) - Prepara una consulta SQL para ser ejecutada

    - [db2_cursor_type()](#function.db2-cursor-type) - Devuelve el tipo de cursor utilizado por un recurso

# db2_special_columns

(PECL ibm_db2 &gt;= 1.0.0)

db2_special_columns —
Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

### Descripción

**db2_special_columns**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [string](#language.types.string) $schema,
    [string](#language.types.string) $table_name,
    [int](#language.types.integer) $scope
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista los identificadores únicos de las filas
de una tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       servidores OS/390 o z/OS. Para otras bases de datos,
       se debe pasar **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas.






     table_name


       El nombre de la tabla.






     scope


       Un entero que representa el tiempo mínimo para el cual el identificador
       único de la fila es válido. Puede ser uno de los siguientes valores:






           Valor entero
           Constante SQL
           Descripción






           0
           SQL_SCOPE_CURROW
           El identificador de la fila es válido solo cuando
           el cursor está posicionado en la fila.



           1
           SQL_SCOPE_TRANSACTION
           El identificador de la fila es válido durante la duración de la
           transacción.



           2
           SQL_SCOPE_SESSION
           El identificador de la fila es válido durante la duración de la
           conexión.









### Valores devueltos

Devuelve un recurso con un conjunto de resultados que contiene filas con
información única para una tabla. Las filas están compuestas por las
siguientes columnas:

       Nombre de la columna
       Descripción






       SCOPE








             Valor entero
             Constante SQL
             Descripción






             0
             SQL_SCOPE_CURROW
             El identificador de la fila es válido solo cuando
             el cursor está posicionado en la fila.



             1
             SQL_SCOPE_TRANSACTION
             El identificador de la fila es válido durante la duración de la
             transacción.



             2
             SQL_SCOPE_SESSION
             El identificador de la fila es válido durante la duración de la
             conexión.











       COLUMN_NAME
       Nombre de la columna única.



       DATA_TYPE
       El tipo de datos SQL para la columna.



       TYPE_NAME
       Una cadena que representa el tipo de datos para la
       columna.



       COLUMN_SIZE
       Un entero que representa el tamaño de la columna.



       BUFFER_LENGTH
       Número máximo de bytes necesarios para almacenar datos de esta columna.



       DECIMAL_DIGITS
       La escala de la columna o **[null](#constant.null)** donde la escala no es
       aplicable.



       NUM_PREC_RADIX
       Un entero que puede ser 10 (representando un
       tipo de datos numérico exacto), 2 (representando un
       tipo de datos numéricos aproximados) o **[null](#constant.null)** (representando un tipo
       de datos para el cual la base no es aplicable).



       PSEUDO_COLUMN
       Siempre devuelve 1.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_statistics

(PECL ibm_db2 &gt;= 1.0.0)

db2_statistics —
Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

### Descripción

**db2_statistics**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier,
    [?](#language.types.null)[string](#language.types.string) $schema,
    [string](#language.types.string) $table_name,
    [bool](#language.types.boolean) $unique
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en servidores OS/390 o z/OS. Para otras bases de datos, se debe pasar **[null](#constant.null)** o una string vacía.






     schema


       El esquema que contiene las tablas objetivo. Si el argumento es **[null](#constant.null)**, se devuelven las estadísticas y los índices para el esquema del usuario actual.






     table_name


       El nombre de la tabla.






     unique


       Cuando unique es **[true](#constant.true)**, se devuelve la información relativa a todos los índices de la tabla. De lo contrario, solo se devuelve la información relativa a los índices únicos de la tabla.





### Valores devueltos

Lo que devuelve la función, primero en caso de éxito, luego en caso de fallo. Véase también la entidad Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo que contiene la tabla. El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       TABLE_SCHEM
       Nombre del esquema que contiene la tabla.



       TABLE_NAME
       Nombre de la tabla.



       NON_UNIQUE


         Un integer que representa si el índice prohíbe valores únicos o si la fila contiene estadísticas sobre la tabla misma:






             Valor de retorno
             Tipo de argumento






             0 (SQL_FALSE)
             El índice permite valores duplicados.



             1 (SQL_TRUE)
             Los valores del índice deben ser únicos.



             **[null](#constant.null)**
             La fila contiene información estadística sobre la tabla.











       INDEX_QUALIFIER
       Una string que representa un calificador que debería haber sido previamente fijado a INDEX_NAME para calificar completamente el índice.



       INDEX_NAME
       Una string que representa el nombre del índice.



       TYPE


         Un integer que representa el tipo de información contenida en esta fila del conjunto de resultados:






             Valor de retorno
             Tipo de argumento






             0 (SQL_TABLE_STAT)
             La fila contiene información estadística sobre la tabla.



             1 (SQL_INDEX_CLUSTERED)
             La fila contiene información sobre un índice agrupado.



             2 (SQL_INDEX_HASH)
             La fila contiene información sobre un índice hash.



             3 (SQL_INDEX_OTHER)
             La fila contiene información sobre un tipo de índice que no es agrupado ni hash.











       ORDINAL_POSITION
       Un array que comienza en el índice 1 indicando la columna en el índice. **[null](#constant.null)** si la fila contiene información estadística sobre la tabla.



       COLUMN_NAME
       El nombre de la columna en el índice. **[null](#constant.null)** si la fila contiene información estadística sobre la tabla.



       ASC_OR_DESC

        A si la columna está ordenada en orden alfabético, D si la columna está ordenada en orden alfabético inverso, **[null](#constant.null)** si la fila contiene información estadística sobre la tabla.




       CARDINALITY


         Si la fila contiene información sobre un índice, esta columna contendrá un integer que representa el número de valores únicos en el índice.




         Si la fila contiene información sobre la tabla, esta columna contendrá un integer que representa el número de filas en la tabla.







       PAGES


         Si la fila contiene información sobre un índice, esta columna contendrá un integer que representa el número de páginas utilizadas para registrar el índice.




         Si la fila contiene información sobre la tabla, esta columna contendrá un integer que representa el número de páginas utilizadas para registrar la tabla.







       FILTER_CONDITION
       Siempre devuelve **[null](#constant.null)**.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_stmt_error

(PECL ibm_db2 &gt;= 1.0.0)

db2_stmt_error —
Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL

### Descripción

**db2_stmt_error**([?](#language.types.null)[resource](#language.types.resource) $stmt = **[null](#constant.null)**): [string](#language.types.string)

Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta
SQL.

Si no se pasa un recurso como argumento a la función
**db2_stmt_error()**, esta retornará el mensaje
de error asociado con el último intento de retorno de una consulta SQL, por
ejemplo, proveniente de [db2_prepare()](#function.db2-prepare) o
[db2_exec()](#function.db2-exec).

Para comprender los valores de SQLSTATE, se puede ingresar el siguiente comando
en el procesador de línea de comandos de DB2:
**db2 '? sqlstate-value'**. Asimismo,
se puede llamar a la función [db2_conn_errormsg()](#function.db2-conn-errormsg)
para obtener un mensaje de error explícito junto con el valor de SQLCODE
asociado.

### Parámetros

    stmt


       Un recurso válido.





### Valores devueltos

Devuelve un string que contiene el valor de SQLSTATE.

### Ver también

    - [db2_conn_error()](#function.db2-conn-error) - Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento

de conexión

    - [db2_conn_errormsg()](#function.db2-conn-errormsg) - Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE

    - [db2_stmt_errormsg()](#function.db2-stmt-errormsg) - Devuelve el último mensaje de error de una consulta SQL

# db2_stmt_errormsg

(PECL ibm_db2 &gt;= 1.0.0)

db2_stmt_errormsg —
Devuelve el último mensaje de error de una consulta SQL

### Descripción

**db2_stmt_errormsg**([?](#language.types.null)[resource](#language.types.resource) $stmt = **[null](#constant.null)**): [string](#language.types.string)

Devuelve el último mensaje de error de una consulta SQL.

Si no se pasa un recurso como argumento a la función
**db2_stmt_errormsg()**, devolverá el mensaje
de error asociado con el último intento de retorno de una consulta SQL, por
ejemplo, proveniente de [db2_prepare()](#function.db2-prepare) o
[db2_exec()](#function.db2-exec).

### Parámetros

     stmt


       Un recurso válido.





### Valores devueltos

Devuelve un string que contiene el error del mensaje y el SQLCODE para el
último error que se produjo tras la ejecución de una consulta SQL.

### Ver también

    - [db2_conn_error()](#function.db2-conn-error) - Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento

de conexión

    - [db2_conn_errormsg()](#function.db2-conn-errormsg) - Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE

    - [db2_stmt_error()](#function.db2-stmt-error) - Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL

# db2_table_privileges

(PECL ibm_db2 &gt;= 1.0.0)

db2_table_privileges —
Devuelve un conjunto de resultados que lista las tablas y sus privilegios
asociados en una base de datos

### Descripción

**db2_table_privileges**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table_name = **[null](#constant.null)**
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las tablas y sus privilegios
asociados en una base de datos.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       servidores OS/390 o z/OS. Para otras bases de datos,
       se debe pasar **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. El argumento acepta formas
       que contienen _ y % como
       comodines.






     table-name


       El nombre de la tabla. El argumento acepta formas
       que contienen _ y % como
       comodines.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen los privilegios para las tablas que coinciden con los argumentos especificados. Las
filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo que contiene la tabla.
       El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       TABLE_SCHEM
       Nombre del esquema que contiene la tabla.



       TABLE_NAME
       Nombre de la tabla.



       GRANTOR
       ID de autorización del usuario que otorgó el privilegio.



       GRANTEE
       ID de autorización del usuario al que se otorgó el
       privilegio.



       PRIVILEGE
       El privilegio que se otorgó. Puede ser uno de los siguientes: ALTER, CONTROL, DELETE, INDEX, INSERT, REFERENCES, SELECT o
       UPDATE.



       IS_GRANTABLE
       Una cadena que contiene "YES" o "NO" que indica si el usuario al
       que se otorgó el privilegio puede otorgar el privilegio a otros
       usuarios.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_tables()](#function.db2-tables) - Devuelve la lista de tablas y sus metadatos

# db2_tables

(PECL ibm_db2 &gt;= 1.0.0)

db2_tables —
Devuelve la lista de tablas y sus metadatos

### Descripción

**db2_tables**(
    [resource](#language.types.resource) $connection,
    [?](#language.types.null)[string](#language.types.string) $qualifier = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $schema = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table_name = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $table_type = **[null](#constant.null)**
): [resource](#language.types.resource)

Devuelve un conjunto de resultados que lista las tablas y sus metadatos
asociados de una base de datos.

### Parámetros

     connection


       Una conexión válida a una base de datos IBM DB2, Cloudscape o
       Apache Derby.






     qualifier


       Un calificador para las bases de datos DB2 que funcionan en
       servidores OS/390 o z/OS. Para otras bases de datos,
       se debe pasar **[null](#constant.null)** o una cadena vacía.






     schema


       El esquema que contiene las tablas. El argumento acepta formas
       que contienen _ y % como
       comodines.






     table_name


       El nombre de la tabla. El argumento acepta formas
       que contienen _ y % como
       comodines.






     table_type


       Una lista de identificadores de tipos de tabla delimitada por comas.
       Para coincidir con todos los esquemas, se debe pasar **[null](#constant.null)** o una cadena
       vacía. Los identificadores válidos son:
       ALIAS, HIERARCHY TABLE, INOPERATIVE VIEW, NICKNAME,
       MATERIALIZED QUERY TABLE, SYSTEM TABLE, TABLE, TYPED TABLE, TYPED VIEW
       y VIEW.





### Valores devueltos

Devuelve un recurso con el conjunto de resultados que contiene las filas que
describen las tablas que coinciden con los argumentos especificados. Las
filas están compuestas por las siguientes columnas:

       Nombre de la columna
       Descripción






       TABLE_CAT
       Nombre del catálogo que contiene la tabla.
       El valor es **[null](#constant.null)** si la tabla no tiene catálogo.



       TABLE_SCHEM
       Nombre del esquema que contiene la tabla.



       TABLE_NAME
       Nombre de la tabla.



       TABLE_TYPE
       Identificador de la tabla.



       REMARKS
       Descripción de la tabla.




### Ver también

    - [db2_column_privileges()](#function.db2-column-privileges) - Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla

    - [db2_columns()](#function.db2-columns) - Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla

    - [db2_foreign_keys()](#function.db2-foreign-keys) - Devuelve un conjunto de resultados que lista las claves externas de una tabla

    - [db2_primary_keys()](#function.db2-primary-keys) - Devuelve un conjunto de resultados que lista las claves de una tabla

    - [db2_procedure_columns()](#function.db2-procedure-columns) - Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro

    - [db2_procedures()](#function.db2-procedures) - Devuelve un conjunto de resultados que lista las proceduras de registro

almacenadas en la base de datos

    - [db2_special_columns()](#function.db2-special-columns) - Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla

    - [db2_statistics()](#function.db2-statistics) - Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla

    - [db2_table_privileges()](#function.db2-table-privileges) - Devuelve un conjunto de resultados que lista las tablas y sus privilegios

asociados en una base de datos

## Tabla de contenidos

- [db2_autocommit](#function.db2-autocommit) — Devuelve o modifica el estado AUTOCOMMIT de la conexión a la base de datos
- [db2_bind_param](#function.db2-bind-param) — Asocia una variable PHP a un parámetro de una consulta SQL
- [db2_client_info](#function.db2-client-info) — Devuelve un objeto con propiedades que describen el cliente de base de datos DB2
- [db2_close](#function.db2-close) — Cierra una conexión a base de datos
- [db2_column_privileges](#function.db2-column-privileges) — Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla
- [db2_columns](#function.db2-columns) — Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla
- [db2_commit](#function.db2-commit) — Confirmar una transacción
- [db2_conn_error](#function.db2-conn-error) — Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento
  de conexión
- [db2_conn_errormsg](#function.db2-conn-errormsg) — Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE
- [db2_connect](#function.db2-connect) — Devuelve una conexión a una base de datos
- [db2_cursor_type](#function.db2-cursor-type) — Devuelve el tipo de cursor utilizado por un recurso
- [db2_escape_string](#function.db2-escape-string) — Escapar ciertos caracteres especiales
- [db2_exec](#function.db2-exec) — Ejecuta una consulta SQL directamente
- [db2_execute](#function.db2-execute) — Ejecuta una consulta SQL preparada
- [db2_fetch_array](#function.db2-fetch-array) — Devuelve un array, indexado por la posición de las columnas, que representa
  una línea del conjunto de resultados
- [db2_fetch_assoc](#function.db2-fetch-assoc) — Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados
- [db2_fetch_both](#function.db2-fetch-both) — Devuelve un array, indexado por nombre de columna y posición, que representa
  una fila del conjunto de resultados
- [db2_fetch_object](#function.db2-fetch-object) — Devuelve un objeto con las propiedades que representan columnas en la
  fila extraída
- [db2_fetch_row](#function.db2-fetch-row) — Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea
  solicitada
- [db2_field_display_size](#function.db2-field-display-size) — Devuelve el máximo de octetos requeridos para mostrar una columna
- [db2_field_name](#function.db2-field-name) — Devuelve el nombre de la columna del conjunto de resultados
- [db2_field_num](#function.db2-field-num) — Devuelve la posición del nombre de la columna del conjunto de resultados
- [db2_field_precision](#function.db2-field-precision) — Devuelve la precisión de la columna indicada del conjunto de resultados
- [db2_field_scale](#function.db2-field-scale) — Devuelve la escala de la columna indicada del conjunto de resultados
- [db2_field_type](#function.db2-field-type) — Devuelve el tipo de dato de la columna indicada del conjunto de resultados
- [db2_field_width](#function.db2-field-width) — Devuelve el ancho de la columna indicada en el conjunto de resultados
- [db2_foreign_keys](#function.db2-foreign-keys) — Devuelve un conjunto de resultados que lista las claves externas de una tabla
- [db2_free_result](#function.db2-free-result) — Liberar los recursos asociados con un resultado
- [db2_free_stmt](#function.db2-free-stmt) — Liberar un recurso indicado
- [db2_get_option](#function.db2-get-option) — Recupera el valor de una opción para una consulta o conexión
- [db2_last_insert_id](#function.db2-last-insert-id) — Retorna el último ID generado por la última consulta de inserción
- [db2_lob_read](#function.db2-lob-read) — Recupera grandes objetos binarios de tamaños predefinidos en cada invocación
- [db2_next_result](#function.db2-next-result) — Solicita el siguiente conjunto de resultados de la recurso indicado
- [db2_num_fields](#function.db2-num-fields) — Devuelve el número de campos contenido en el conjunto de resultados
- [db2_num_rows](#function.db2-num-rows) — Devuelve el número de filas afectadas por una consulta SQL
- [db2_pclose](#function.db2-pclose) — Cierra una conexión persistente a la base de datos
- [db2_pconnect](#function.db2-pconnect) — Devuelve una conexión persistente a una base de datos
- [db2_prepare](#function.db2-prepare) — Prepara una consulta SQL para ser ejecutada
- [db2_primary_keys](#function.db2-primary-keys) — Devuelve un conjunto de resultados que lista las claves de una tabla
- [db2_procedure_columns](#function.db2-procedure-columns) — Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro
- [db2_procedures](#function.db2-procedures) — Devuelve un conjunto de resultados que lista las proceduras de registro
  almacenadas en la base de datos
- [db2_result](#function.db2-result) — Devuelve un valor de una columna de una fila de un conjunto de resultados
- [db2_rollback](#function.db2-rollback) — Cancelar una transacción
- [db2_server_info](#function.db2-server-info) — Devuelve un objeto con propiedades que describen el servidor de base de datos DB2
- [db2_set_option](#function.db2-set-option) — Establece opciones para una conexión o recursos
- [db2_special_columns](#function.db2-special-columns) — Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla
- [db2_statistics](#function.db2-statistics) — Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla
- [db2_stmt_error](#function.db2-stmt-error) — Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL
- [db2_stmt_errormsg](#function.db2-stmt-errormsg) — Devuelve el último mensaje de error de una consulta SQL
- [db2_table_privileges](#function.db2-table-privileges) — Devuelve un conjunto de resultados que lista las tablas y sus privilegios
  asociados en una base de datos
- [db2_tables](#function.db2-tables) — Devuelve la lista de tablas y sus metadatos

- [Introducción](#intro.ibm-db2)
- [Instalación/Configuración](#ibm-db2.setup)<li>[Requerimientos](#ibm-db2.requirements)
- [Instalación](#ibm-db2.installation)
- [Configuración en tiempo de ejecución](#ibm-db2.configuration)
- [Tipos de recursos](#ibm-db2.resources)
  </li>- [Constantes predefinidas](#ibm-db2.constants)
- [Funciones de IBM DB2](#ref.ibm-db2)<li>[db2_autocommit](#function.db2-autocommit) — Devuelve o modifica el estado AUTOCOMMIT de la conexión a la base de datos
- [db2_bind_param](#function.db2-bind-param) — Asocia una variable PHP a un parámetro de una consulta SQL
- [db2_client_info](#function.db2-client-info) — Devuelve un objeto con propiedades que describen el cliente de base de datos DB2
- [db2_close](#function.db2-close) — Cierra una conexión a base de datos
- [db2_column_privileges](#function.db2-column-privileges) — Devuelve un conjunto de resultados que lista las columnas y sus privilegios de una tabla
- [db2_columns](#function.db2-columns) — Devuelve un conjunto de resultados que lista las columnas y sus metadatos de una tabla
- [db2_commit](#function.db2-commit) — Confirmar una transacción
- [db2_conn_error](#function.db2-conn-error) — Devuelve un string que contiene el valor de SQLSTATE devuelto por el último intento
  de conexión
- [db2_conn_errormsg](#function.db2-conn-errormsg) — Devuelve el último mensaje de error de conexión junto con el valor de SQLCODE
- [db2_connect](#function.db2-connect) — Devuelve una conexión a una base de datos
- [db2_cursor_type](#function.db2-cursor-type) — Devuelve el tipo de cursor utilizado por un recurso
- [db2_escape_string](#function.db2-escape-string) — Escapar ciertos caracteres especiales
- [db2_exec](#function.db2-exec) — Ejecuta una consulta SQL directamente
- [db2_execute](#function.db2-execute) — Ejecuta una consulta SQL preparada
- [db2_fetch_array](#function.db2-fetch-array) — Devuelve un array, indexado por la posición de las columnas, que representa
  una línea del conjunto de resultados
- [db2_fetch_assoc](#function.db2-fetch-assoc) — Devuelve un array, indexado por nombre de columna, que representa una fila del conjunto de resultados
- [db2_fetch_both](#function.db2-fetch-both) — Devuelve un array, indexado por nombre de columna y posición, que representa
  una fila del conjunto de resultados
- [db2_fetch_object](#function.db2-fetch-object) — Devuelve un objeto con las propiedades que representan columnas en la
  fila extraída
- [db2_fetch_row](#function.db2-fetch-row) — Modifica el puntero del conjunto de resultados a la siguiente línea o a la línea
  solicitada
- [db2_field_display_size](#function.db2-field-display-size) — Devuelve el máximo de octetos requeridos para mostrar una columna
- [db2_field_name](#function.db2-field-name) — Devuelve el nombre de la columna del conjunto de resultados
- [db2_field_num](#function.db2-field-num) — Devuelve la posición del nombre de la columna del conjunto de resultados
- [db2_field_precision](#function.db2-field-precision) — Devuelve la precisión de la columna indicada del conjunto de resultados
- [db2_field_scale](#function.db2-field-scale) — Devuelve la escala de la columna indicada del conjunto de resultados
- [db2_field_type](#function.db2-field-type) — Devuelve el tipo de dato de la columna indicada del conjunto de resultados
- [db2_field_width](#function.db2-field-width) — Devuelve el ancho de la columna indicada en el conjunto de resultados
- [db2_foreign_keys](#function.db2-foreign-keys) — Devuelve un conjunto de resultados que lista las claves externas de una tabla
- [db2_free_result](#function.db2-free-result) — Liberar los recursos asociados con un resultado
- [db2_free_stmt](#function.db2-free-stmt) — Liberar un recurso indicado
- [db2_get_option](#function.db2-get-option) — Recupera el valor de una opción para una consulta o conexión
- [db2_last_insert_id](#function.db2-last-insert-id) — Retorna el último ID generado por la última consulta de inserción
- [db2_lob_read](#function.db2-lob-read) — Recupera grandes objetos binarios de tamaños predefinidos en cada invocación
- [db2_next_result](#function.db2-next-result) — Solicita el siguiente conjunto de resultados de la recurso indicado
- [db2_num_fields](#function.db2-num-fields) — Devuelve el número de campos contenido en el conjunto de resultados
- [db2_num_rows](#function.db2-num-rows) — Devuelve el número de filas afectadas por una consulta SQL
- [db2_pclose](#function.db2-pclose) — Cierra una conexión persistente a la base de datos
- [db2_pconnect](#function.db2-pconnect) — Devuelve una conexión persistente a una base de datos
- [db2_prepare](#function.db2-prepare) — Prepara una consulta SQL para ser ejecutada
- [db2_primary_keys](#function.db2-primary-keys) — Devuelve un conjunto de resultados que lista las claves de una tabla
- [db2_procedure_columns](#function.db2-procedure-columns) — Devuelve un conjunto de resultados que lista los argumentos de procedimiento de registro
- [db2_procedures](#function.db2-procedures) — Devuelve un conjunto de resultados que lista las proceduras de registro
  almacenadas en la base de datos
- [db2_result](#function.db2-result) — Devuelve un valor de una columna de una fila de un conjunto de resultados
- [db2_rollback](#function.db2-rollback) — Cancelar una transacción
- [db2_server_info](#function.db2-server-info) — Devuelve un objeto con propiedades que describen el servidor de base de datos DB2
- [db2_set_option](#function.db2-set-option) — Establece opciones para una conexión o recursos
- [db2_special_columns](#function.db2-special-columns) — Devuelve un conjunto de resultados que lista los identificadores únicos de las filas de una tabla
- [db2_statistics](#function.db2-statistics) — Devuelve un conjunto de resultados que enumera los índices y estadísticas de una tabla
- [db2_stmt_error](#function.db2-stmt-error) — Devuelve un string que contiene el valor de SQLSTATE retornado por una consulta SQL
- [db2_stmt_errormsg](#function.db2-stmt-errormsg) — Devuelve el último mensaje de error de una consulta SQL
- [db2_table_privileges](#function.db2-table-privileges) — Devuelve un conjunto de resultados que lista las tablas y sus privilegios
  asociados en una base de datos
- [db2_tables](#function.db2-tables) — Devuelve la lista de tablas y sus metadatos
  </li>
