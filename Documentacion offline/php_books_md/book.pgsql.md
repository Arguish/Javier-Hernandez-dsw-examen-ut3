# PostgreSQL

# Introducción

La base de datos PostgreSQL es un producto Open Source, disponible
sin costo alguno. PostgreSQL, desarrollado en el departamento de
Ciencias de la Computación en UC Berkeley, implementa la mayoría
de los conceptos de las bases de datos relacionales actualmente disponibles en el
mercado. PostgreSQL acepta el lenguaje SQL92/SQL3, garantiza
la integridad transaccional y la extensión de tipos.
PostgreSQL es una evolución del código original de Berkeley.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#pgsql.requirements)
- [Instalación](#pgsql.installation)
- [Configuración en tiempo de ejecución](#pgsql.configuration)
- [Tipos de recursos](#pgsql.resources)

    ## Requerimientos

    Para acceder al soporte PostgreSQL, se requiere PostgreSQL 6.5 o una versión más reciente; PostgreSQL 7.0 o una versión más reciente para activar todas las funcionalidades del módulo PostgreSQL. PostgreSQL soporta numerosos juegos de caracteres, incluyendo los juegos multioctetos asiáticos. La versión actual y más detalles sobre PostgreSQL están disponibles en el sitio [» http://www.postgresql.org/](http://www.postgresql.org/) y la [» Documentación PostgreSQL](http://www.postgresql.org/docs/current/interactive/).

## Instalación

Con el fin de habilitar el soporte de PostgreSQL,
**--with-pgsql[=DIR]** es requerido cuando se compila
PHP. DIR es el directorio base donde está instalado PostgreSQL, por defecto generalmente es
/usr/local/pgsql en sistemas linux. Si el módulo de objetos compartidos está
disponible, el módulo PostgreSQL puede ser cargado usando la directiva
[extension](#ini.extension) en php.ini o la función
[dl()](#function.dl).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

  <caption>**Opciones de configuración PostgreSQL**</caption>
  
   
    
     Nombre
     Por defecto
     Cambiable
     Historial de cambios


     [pgsql.allow_persistent](#ini.pgsql.allow-persistent)
     "1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [pgsql.max_persistent](#ini.pgsql.max-persistent)
     "-1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [pgsql.max_links](#ini.pgsql.max-links)
     "-1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [pgsql.auto_reset_persistent](#ini.pgsql.auto-reset-persistent)
     "0"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [pgsql.ignore_notice](#ini.pgsql.ignore-notice)
     "0"
     **[INI_ALL](#constant.ini-all)**
      



     [pgsql.log_notice](#ini.pgsql.log-notice)
     "0"
     **[INI_ALL](#constant.ini-all)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     pgsql.allow_persistent
     [bool](#language.types.boolean)



      Si se permiten conexiones Postgres persistentes.








     pgsql.max_persistent
     [int](#language.types.integer)



      El número máximo de conexiones Postgres persistentes por
      proceso.








     pgsql.max_links
     [int](#language.types.integer)



      El número máximo de conexiones Postgres por proceso,
      incluyendo conexiones persistentes.








     pgsql.auto_reset_persistent
     [int](#language.types.integer)



      Detectar conexiones persitentes rotas con [pg_pconnect()](#function.pg-pconnect).
      Necesita un breve tiempo adicional.








     pgsql.ignore_notice
     [int](#language.types.integer)



      Hacer caso o no a los mensajes de avisos del backend PostgreSQL.








     pgsql.log_notice
     [int](#language.types.integer)



      Registrar o no los mensajes de aviso del backend PostgreSQL. La directiva
      PHP [
      pgsql.ignore_notice](#ini.pgsql.ignore-notice) debe estar apagada para registrar los mensajes de aviso


## Tipos de recursos

Antes de PHP 8.1.0, existían dos tipos de recursos utilizados en el módulo PostgreSQL. El primero es el identificador para la conexión a la base de datos y el segundo es un recurso que contiene el resultado de una consulta.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[PGSQL_LIBPQ_VERSION](#constant.pgsql-libpq-version)**
    ([string](#language.types.string))



     Versión corta de libpq que solo contiene números y puntos.





    **[PGSQL_LIBPQ_VERSION_STR](#constant.pgsql-libpq-version-str)**
    ([string](#language.types.string))



     Anterior a PHP 8.0.0, la versión larga de libpq que incluye las informaciones del compilador.
     A partir de PHP 8.0.0, el valor es idéntico a **[PGSQL_LIBPQ_VERSION](#constant.pgsql-libpq-version)**,
     y el uso de **[PGSQL_LIBPQ_VERSION_STR](#constant.pgsql-libpq-version-str)** es obsoleto.





    **[PGSQL_ASSOC](#constant.pgsql-assoc)**
    ([int](#language.types.integer))



     Pasada a [pg_fetch_array()](#function.pg-fetch-array). Devuelve un array
     asociativo de los nombres y valores de los campos.





    **[PGSQL_NUM](#constant.pgsql-num)**
    ([int](#language.types.integer))



     Pasada a [pg_fetch_array()](#function.pg-fetch-array). Devuelve un array con índice
     numérico de los números y valores de los campos.





    **[PGSQL_BOTH](#constant.pgsql-both)**
    ([int](#language.types.integer))



     Pasada a [pg_fetch_array()](#function.pg-fetch-array). Devuelve un array de
     los valores de los campos que está indexado numéricamente (por el número de
     los campos) y indexado literalmente (por el nombre de los campos).





    **[PGSQL_CONNECT_FORCE_NEW](#constant.pgsql-connect-force-new)**
    ([int](#language.types.integer))



     Pasada a [pg_connect()](#function.pg-connect) para forzar la creación de una
     nueva conexión, en lugar de reutilizar una conexión existente idéntica.





    **[PGSQL_CONNECT_ASYNC](#constant.pgsql-connect-async)**
    ([int](#language.types.integer))



     Pasada a la función [pg_connect()](#function.pg-connect) para crear una
     conexión asíncrona.





    **[PGSQL_CONNECTION_AUTH_OK](#constant.pgsql-connection-auth-ok)**
    ([int](#language.types.integer))









    **[PGSQL_CONNECTION_AWAITING_RESPONSE](#constant.pgsql-connection-awaiting-response)**
    ([int](#language.types.integer))









    **[PGSQL_CONNECTION_BAD](#constant.pgsql-connection-bad)**
    ([int](#language.types.integer))



     Retornada por [pg_connection_status()](#function.pg-connection-status) indicando que la
     conexión a la base de datos es inválida.





    **[PGSQL_CONNECTION_MADE](#constant.pgsql-connection-made)**
    ([int](#language.types.integer))









    **[PGSQL_CONNECTION_OK](#constant.pgsql-connection-ok)**
    ([int](#language.types.integer))



     Retornada por [pg_connection_status()](#function.pg-connection-status) indicando que la
     conexión a la base de datos es válida.





    **[PGSQL_CONNECTION_SETENV](#constant.pgsql-connection-setenv)**
    ([int](#language.types.integer))









    **[PGSQL_CONNECTION_SSL_STARTUP](#constant.pgsql-connection-ssl-startup)**
    ([int](#language.types.integer))









    **[PGSQL_CONNECTION_STARTED](#constant.pgsql-connection-started)**
    ([int](#language.types.integer))









    **[PGSQL_SEEK_SET](#constant.pgsql-seek-set)**
    ([int](#language.types.integer))



     Pasada a [pg_lo_seek()](#function.pg-lo-seek). El posicionamiento comenzará al
     inicio del objeto.





    **[PGSQL_SEEK_CUR](#constant.pgsql-seek-cur)**
    ([int](#language.types.integer))



     Pasada a [pg_lo_seek()](#function.pg-lo-seek). El posicionamiento comenzará a
     la posición actual.





    **[PGSQL_SEEK_END](#constant.pgsql-seek-end)**
    ([int](#language.types.integer))



     Pasada a [pg_lo_seek()](#function.pg-lo-seek). El posicionamiento comenzará al
     final del objeto.





    **[PGSQL_EMPTY_QUERY](#constant.pgsql-empty-query)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). La cadena de
     caracteres enviada al servidor estaba vacía.





    **[PGSQL_COMMAND_OK](#constant.pgsql-command-ok)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Comando correctamente
     completado sin devolver datos.





    **[PGSQL_TUPLES_OK](#constant.pgsql-tuples-ok)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Comando
     correctamente completado devolviendo datos (como
     SELECT o SHOW).





    **[PGSQL_TUPLES_CHUNK](#constant.pgsql-tuples-chunk)**
    ([int](#language.types.integer))



     Retornado por [pg_result_status()](#function.pg-result-status).
     Indica el éxito en la ejecución de un comando que devuelve datos en modo por bloques.
     Retornado para los comandos SELECT cuando
     [pg_set_chunked_rows_size()](#function.pg-set-chunked-rows-size) está definido.
     El conjunto de resultados se divide en varios bloques, cada uno conteniendo un número predeterminado de filas.
     Disponible a partir de PHP 8.4.0 y libpq 17.





    **[PGSQL_COPY_OUT](#constant.pgsql-copy-out)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Copia (desde el
     servidor) de transferencia de datos iniciada.





    **[PGSQL_COPY_IN](#constant.pgsql-copy-in)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Copia (hacia el
     servidor) de transferencia de datos iniciada.





    **[PGSQL_BAD_RESPONSE](#constant.pgsql-bad-response)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). La respuesta del
     servidor no ha sido comprendida.





    **[PGSQL_NONFATAL_ERROR](#constant.pgsql-nonfatal-error)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Un error no
     fatal (de nivel notice o warning) ha ocurrido.





    **[PGSQL_FATAL_ERROR](#constant.pgsql-fatal-error)**
    ([int](#language.types.integer))



     Retornada por [pg_result_status()](#function.pg-result-status). Un error fatal
     ha ocurrido.





    **[PGSQL_TRANSACTION_IDLE](#constant.pgsql-transaction-idle)**
    ([int](#language.types.integer))



     Retornada por [pg_transaction_Status()](#function.pg-transaction-status). La conexión
     está actualmente libre, sin transacción en curso.





    **[PGSQL_TRANSACTION_ACTIVE](#constant.pgsql-transaction-active)**
    ([int](#language.types.integer))



     Retornada por [pg_transaction_status()](#function.pg-transaction-status). Un comando
     está en curso en la conexión. Una consulta ha sido enviada a la conexión
     y aún no ha sido completada.





    **[PGSQL_TRANSACTION_INTRANS](#constant.pgsql-transaction-intrans)**
    ([int](#language.types.integer))



     Retornada por [pg_transaction_status()](#function.pg-transaction-status). La conexión
     está libre, dentro de un bloque de transacción.





    **[PGSQL_TRANSACTION_INERROR](#constant.pgsql-transaction-inerror)**
    ([int](#language.types.integer))



     Retornada por [pg_transaction_status()](#function.pg-transaction-status). La conexión
     está libre, dentro de un bloque de transacción fallido.





    **[PGSQL_TRANSACTION_UNKNOWN](#constant.pgsql-transaction-unknown)**
    ([int](#language.types.integer))



     Retornada por [pg_transaction_status()](#function.pg-transaction-status). La conexión
     es mala.





    **[PGSQL_DIAG_SEVERITY](#constant.pgsql-diag-severity)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     La severidad; el contenido del campo es ERROR,
     FATAL o PANIC (en un mensaje
     de error) o WARNING, NOTICE, DEBUG,
     INFO o LOG (en un mensaje
     de advertencia) o una traducción localizada de estos. Siempre
     presente.





    **[PGSQL_DIAG_SQLSTATE](#constant.pgsql-diag-sqlstate)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El código SQLSTATE para este error. El código SQLSTATE identifica el tipo
     de error que ha ocurrido; esto puede ser utilizado por aplicaciones
     de entrada para realizar operaciones específicas (como manejo de errores)
     en respuesta a un error particular de base de datos.
     Este campo no puede ser localizado y siempre está presente.





    **[PGSQL_DIAG_MESSAGE_PRIMARY](#constant.pgsql-diag-message-primary)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El campo de error principal interpretable para el usuario (normalmente
     una línea). Siempre presente.





    **[PGSQL_DIAG_MESSAGE_DETAIL](#constant.pgsql-diag-message-detail)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     Detalle: un segundo mensaje de error opcional que aporta más detalles sobre
     el problema. Puede estar en varias líneas.





    **[PGSQL_DIAG_MESSAGE_HINT](#constant.pgsql-diag-message-hint)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     Consejo: una sugerencia opcional que indica qué hacer sobre el
     problema. Esto está previsto para ser diferente del error ya que ofrece
     un consejo (potencialmente inadecuado) en lugar de hechos verídicos.
     Puede estar en varias líneas.





    **[PGSQL_DIAG_STATEMENT_POSITION](#constant.pgsql-diag-statement-position)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     Una cadena de caracteres que contiene un valor entero decimal indicando
     una posición de error del cursor como índice en la consulta
     original. El primer carácter tiene el índice 1 y las posiciones son
     medidas en caracteres, no en bytes.





    **[PGSQL_DIAG_INTERNAL_POSITION](#constant.pgsql-diag-internal-position)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     Esto está definido siendo lo mismo que el campo
     **[PG_DIAG_STATEMENT_POSITION](#constant.pg-diag-statement-position)**, pero esto se utiliza
     cuando la posición del cursor se refiere a una consulta generada internamente
     en lugar de una enviada por el cliente. El campo
     **[PG_DIAG_INTERNAL_QUERY](#constant.pg-diag-internal-query)** aparecerá siempre cuando este campo aparezca.





    **[PGSQL_DIAG_INTERNAL_QUERY](#constant.pgsql-diag-internal-query)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El texto de una consulta generada internamente fallida. Esto puede ser, por
     ejemplo, una consulta SQL enviada por una función PL/pgSQL.





    **[PGSQL_DIAG_CONTEXT](#constant.pgsql-diag-context)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     Una indicación del contexto en el que el error ocurrió.
     Actualmente, esto incluye una pila de llamadas de traceback de las funciones
     procedimentales activas así como consultas generadas internamente. El
     rastreo es una entrada por línea, las más recientes primero.





    **[PGSQL_DIAG_SOURCE_FILE](#constant.pgsql-diag-source-file)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El nombre del archivo de la ubicación del código fuente de PostgreSQL donde
     el error fue reportado.





    **[PGSQL_DIAG_SOURCE_LINE](#constant.pgsql-diag-source-line)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El número de línea de la ubicación del código fuente de PostgreSQL donde
     el error fue reportado.





    **[PGSQL_DIAG_SOURCE_FUNCTION](#constant.pgsql-diag-source-function)**
    ([int](#language.types.integer))



     Pasada a [pg_result_error_field()](#function.pg-result-error-field).
     El nombre de la función del código fuente de PostgreSQL que reportó el error.





    **[PGSQL_DIAG_SCHEMA_NAME](#constant.pgsql-diag-schema-name)**
    ([int](#language.types.integer))



     Disponible desde PHP 7.3.0.





    **[PGSQL_DIAG_TABLE_NAME](#constant.pgsql-diag-table-name)**
    ([int](#language.types.integer))



     Disponible desde PHP 7.3.0.





    **[PGSQL_DIAG_COLUMN_NAME](#constant.pgsql-diag-column-name)**
    ([int](#language.types.integer))



     Disponible desde PHP 7.3.0.





    **[PGSQL_DIAG_DATATYPE_NAME](#constant.pgsql-diag-datatype-name)**
    ([int](#language.types.integer))



     Disponible desde PHP 7.3.0.





    **[PGSQL_DIAG_CONSTRAINT_NAME](#constant.pgsql-diag-constraint-name)**
    ([int](#language.types.integer))



     Disponible desde PHP 7.3.0.





    **[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**
    ([int](#language.types.integer))



     Pasada a [pg_set_error_verbosity()](#function.pg-set-error-verbosity).
     Especifica que los mensajes retornados incluyen la severidad, el texto
     principal así como la posición solamente; esto debería entrar en una
     sola línea.





    **[PGSQL_ERRORS_DEFAULT](#constant.pgsql-errors-default)**
    ([int](#language.types.integer))



     Pasada a [pg_set_error_verbosity()](#function.pg-set-error-verbosity).
     El modo por omisión produce mensajes que incluyen lo anterior y detalles
     adicionales, consejos o campos de contexto (esto puede estar en varias líneas).





    **[PGSQL_ERRORS_VERBOSE](#constant.pgsql-errors-verbose)**
    ([int](#language.types.integer))



     Pasada a [pg_set_error_verbosity()](#function.pg-set-error-verbosity).
     El modo verboso incluye todos los campos disponibles.





    **[PGSQL_ERRORS_SQLSTATE](#constant.pgsql-errors-sqlstate)**
    ([int](#language.types.integer))



     Pasado a [pg_set_error_verbosity()](#function.pg-set-error-verbosity).
     Incluye únicamente la severidad del error y el código de error SQLSTATE.
     Si no hay código de error disponible, la salida es similar al modo
     **[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**.
     Antes de PostgreSQL 11.1, la salida es siempre la misma que en el modo **[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**.






    **[PGSQL_NOTICE_LAST](#constant.pgsql-notice-last)**
    ([int](#language.types.integer))



     Utilizado por [pg_last_notice()](#function.pg-last-notice).
     Disponible a partir de PHP 7.1.0.





    **[PGSQL_NOTICE_ALL](#constant.pgsql-notice-all)**
    ([int](#language.types.integer))



     Utilizado por [pg_last_notice()](#function.pg-last-notice).
     Disponible a partir de PHP 7.1.0.





    **[PGSQL_NOTICE_CLEAR](#constant.pgsql-notice-clear)**
    ([int](#language.types.integer))



     Utilizado por [pg_last_notice()](#function.pg-last-notice).
     Disponible a partir de PHP 7.1.0.






    **[PGSQL_STATUS_LONG](#constant.pgsql-status-long)**
    ([int](#language.types.integer))



     Pasada a [pg_result_status()](#function.pg-result-status). Indica que el código
     de resultado es deseado numérico.





    **[PGSQL_STATUS_STRING](#constant.pgsql-status-string)**
    ([int](#language.types.integer))



     Pasada a [pg_result_status()](#function.pg-result-status). Indica que la etiqueta
     de resultado de comando es deseada textual.





    **[PGSQL_CONV_IGNORE_DEFAULT](#constant.pgsql-conv-ignore-default)**
    ([int](#language.types.integer))



     Pasada a [pg_convert()](#function.pg-convert).
     Ignora los valores por omisión en la tabla durante la conversión.





    **[PGSQL_CONV_FORCE_NULL](#constant.pgsql-conv-force-null)**
    ([int](#language.types.integer))



     Pasada a [pg_convert()](#function.pg-convert).
     Utiliza **[null](#constant.null)** en lugar de una cadena de caracteres vacía.





    **[PGSQL_CONV_IGNORE_NOT_NULL](#constant.pgsql-conv-ignore-not-null)**
    ([int](#language.types.integer))



     Pasada a [pg_convert()](#function.pg-convert).
     Ignora la conversión de **[null](#constant.null)** dentro de columnas NOT
     NULL.






    **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**
    ([int](#language.types.integer))



     Pasada a las funciones [pg_insert()](#function.pg-insert), [pg_select()](#function.pg-select),
     [pg_update()](#function.pg-update) y [pg_delete()](#function.pg-delete).
     Todos los argumentos pasados tal cual. Un escape manual es necesario
     si los argumentos contienen datos proporcionados por el usuario.
     Utilice la función [pg_escape_string()](#function.pg-escape-string) para esto.





    **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**
    ([int](#language.types.integer))



     Pasada a las funciones [pg_insert()](#function.pg-insert), [pg_select()](#function.pg-select),
     [pg_update()](#function.pg-update) y [pg_delete()](#function.pg-delete).
     Ejecución de la consulta por estas funciones.





    **[PGSQL_DML_ASYNC](#constant.pgsql-dml-async)**
    ([int](#language.types.integer))



     Pasada a las funciones [pg_insert()](#function.pg-insert), [pg_select()](#function.pg-select),
     [pg_update()](#function.pg-update) y [pg_delete()](#function.pg-delete).
     Ejecución asíncrona de la consulta por estas funciones.





    **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**
    ([int](#language.types.integer))



     Pasada a las funciones [pg_insert()](#function.pg-insert), [pg_select()](#function.pg-select),
     [pg_update()](#function.pg-update) y [pg_delete()](#function.pg-delete).
     Devuelve la cadena de consulta ejecutada.





    **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**
    ([int](#language.types.integer))



     Pasada a las funciones [pg_insert()](#function.pg-insert), [pg_select()](#function.pg-select),
     [pg_update()](#function.pg-update) y [pg_delete()](#function.pg-delete).
     Aplica un escape interno a todos los argumentos en lugar de llamar a la función
     [pg_convert()](#function.pg-convert). Esta opción no maneja metadatos.
     La consulta debe ser tan rápida como con las funciones
     [pg_query()](#function.pg-query) y [pg_send_query()](#function.pg-send-query).





    **[PGSQL_POLLING_FAILED](#constant.pgsql-polling-failed)**
    ([int](#language.types.integer))



     Retornada por la función [pg_connect_poll()](#function.pg-connect-poll) para
     indicar que el intento de conexión ha fallado.





    **[PGSQL_POLLING_READING](#constant.pgsql-polling-reading)**
    ([int](#language.types.integer))



     Retornada por la función [pg_connect_poll()](#function.pg-connect-poll) para
     indicar que la conexión está esperando a que el socket de PostgreSQL esté
     accesible en lectura.





    **[PGSQL_POLLING_WRITING](#constant.pgsql-polling-writing)**
    ([int](#language.types.integer))



     Retornada por la función [pg_connect_poll()](#function.pg-connect-poll) para
     indicar que la conexión está esperando a que el socket de PostgreSQL esté
     accesible en escritura.





    **[PGSQL_POLLING_OK](#constant.pgsql-polling-ok)**
    ([int](#language.types.integer))



     Retornada por la función [pg_connect_poll()](#function.pg-connect-poll)
     para indicar que la conexión está lista para ser utilizada.





    **[PGSQL_POLLING_ACTIVE](#constant.pgsql-polling-active)**
    ([int](#language.types.integer))



     Retornada por la función [pg_connect_poll()](#function.pg-connect-poll)
     para indicar que la conexión está actualmente activa.





    **[PGSQL_DIAG_SEVERITY_NONLOCALIZED](#constant.pgsql-diag-severity-nonlocalized)**
    ([int](#language.types.integer))



     La severidad; los contenidos del campo son ERROR, FATAL, o PANIC (en un mensaje de error), o WARNING, NOTICE, DEBUG, INFO, o LOG (en un mensaje de aviso).
     Esto es idéntico al campo PG_DIAG_SEVERITY con la excepción de que los contenidos nunca son localizados. Esto está presente solo en las versiones 9.6 y posteriores / PHP 7.3.0 o superior.





    **[PGSQL_SHOW_CONTEXT_NEVER](#constant.pgsql-show-context-never)**
    ([int](#language.types.integer))



     Para usar con [pg_set_error_context_visibility()](#function.pg-set-error-context-visibility),
     el contexto nunca es mostrado.
     Disponible a partir de PHP 8.3.0.





    **[PGSQL_SHOW_CONTEXT_ERRORS](#constant.pgsql-show-context-errors)**
    ([int](#language.types.integer))



     Para usar con [pg_set_error_context_visibility()](#function.pg-set-error-context-visibility),
     los campos del contexto son incluidos únicamente en los mensajes de error.
     Este es el comportamiento por omisión.
     Disponible a partir de PHP 8.3.0.





    **[PGSQL_SHOW_CONTEXT_ALWAYS](#constant.pgsql-show-context-always)**
    ([int](#language.types.integer))



     Para usar con [pg_set_error_context_visibility()](#function.pg-set-error-context-visibility),
     los campos del contexto son incluidos en los mensajes de error, avisos y
     advertencias.
     Disponible a partir de PHP 8.3.0.





    **[PGSQL_TRACE_SUPPRESS_TIMESTAMPS](#constant.pgsql-trace-suppress-timestamps)**
    ([int](#language.types.integer))



     Para usar con [pg_trace()](#function.pg-trace),
     la marca de tiempo no es incluida en los mensajes de traza.
     Disponible a partir de PHP 8.3.0.





    **[PGSQL_TRACE_REGRESS_MODE](#constant.pgsql-trace-regress-mode)**
    ([int](#language.types.integer))



     Para usar con [pg_trace()](#function.pg-trace),
     campos como los OIDs son incluidos en los mensajes de traza.
     Disponible a partir de PHP 8.3.0.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#pgsql.examples-basic)
- [Uso básico](#pgsql.examples-queries)

    ## Uso básico

    Este simple ejemplo muestra cómo conectarse, ejecutar una consulta y
    mostrar las líneas resultantes y desconectarse de una base de datos
    PostgreSQL.

    **Ejemplo #1 Ejemplo general de la extensión PostgreSQL**

&lt;?php

// Conexión, selección de la base de datos
$dbconn = pg_connect("host=localhost dbname=publishing user=www password=foo")
or die('Conexión imposible : ' . pg_last_error());

// Ejecución de la consulta SQL
$query = 'SELECT * FROM authors';
$result = pg_query($dbconn, $query) or die('Fallo en la consulta : ' . pg_last_error());

// Mostrar los resultados en HTML
echo "&lt;table&gt;\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
echo "\t&lt;tr&gt;\n";
foreach ($line as $col_value) {
        echo "\t\t&lt;td&gt;$col_value&lt;/td&gt;\n";
}
echo "\t&lt;/tr&gt;\n";
}
echo "&lt;/table&gt;\n";

// Liberar el resultado
pg_free_result($result);

// Cerrar la conexión
pg_close($dbconn);

?&gt;

## Uso básico

Estos ejemplos contienen funciones definidas por el usuario similares
a las funciones anteriores de MySQL.

    **Ejemplo #1 Ejemplo de funciones PostgreSQL definidas por el usuario**

&lt;?php
// Esta función debería ser necesaria, ya que una conexión PostgreSQL se
// vincula a una base de datos.
function pg_list_dbs($db)
{
    assert(is_resource($db));
$query = '
SELECT
 d.datname as "Name",
 u.usename as "Owner",
 pg_encoding_to_char(d.encoding) as "Encoding"
FROM
 pg_database d LEFT JOIN pg_user u ON d.datdba = u.usesysid
ORDER BY 1;
';
    return pg_query($db, $query);
}

// Listar las tablas.
function pg*list_tables($db)
{
    assert(is_resource($db));
$query = "
SELECT
c.relname as \"Name\",
CASE c.relkind WHEN 'r' THEN 'table' WHEN 'v' THEN 'view' WHEN 'i' THEN 'index' WHEN 'S' THEN 'sequence' WHEN 's' THEN 'special' END as \"Type\",
u.usename as \"Owner\"
FROM
pg_class c LEFT JOIN pg_user u ON c.relowner = u.usesysid
WHERE
c.relkind IN ('r','v','S','')
AND c.relname !~ '^pg*'
ORDER BY 1;
";
return pg_query($db, $query);
}

// Ver también pg_meta_data(). Esto devuelve la definición de los campos como array.
function pg_list_fields($db, $table)
{
    assert(is_resource($db));
$query = "
SELECT
 a.attname,
 format_type(a.atttypid, a.atttypmod),
 a.attnotnull,
 a.atthasdef,
 a.attnum
FROM
 pg_class c,
 pg_attribute a
WHERE
 c.relname = '".$table."'
AND a.attnum &gt; 0 AND a.attrelid = c.oid
ORDER BY a.attnum;
";
return pg_query($db, $query);
}
?&gt;

# Funciones de PostgreSQL

## Notas

**Nota**:

     No todas las funciones son compatibles con todas las versiones. Eso depende de la
     versión de libpq (librería cliente C de PostgreSQL) y cómo ha sido compilado libpq.
     Si las extensiones de PHP PostgreSQL faltan, entonces es porque
     su versión de libpq no los admite.

**Nota**:

     La mayoría de las funciones PostgreSQL aceptan connection como
     primer parámetro opcional. Si no está siempre se usa la última
     conexión abierta. Si esta no existe las funciones retornarán **[false](#constant.false)**.

**Nota**:

     PostgreSQL cambia automáticamente todos los identificadores (ejm. tablas/nombres de columnas)
     a minúsculas en el momento de la creación y al hacer las consultas.
     Para forzar el uso de mayúsculas se debe escapar el
     identificador usando comillas dobles ("").

**Nota**:

     PostgresSQL no tiene comandos especiales para mostrar la información del esquema de la base de datos
     (ejm. todas las tablas de la actual base de datos). En cambio, hay
     un esquema estándar llamado information_schema en
     PostgreSQL 7.4 o superior que contiene las vistas del sistema con toda la información necesaria,
     es facilmente consultable.  Vea la [» Documentación de PostgreSQL](http://www.postgresql.org/docs/current/interactive/)
     para más detalles.

# pg_affected_rows

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_affected_rows —
Devuelve el número de filas afectadas

### Descripción

**pg_affected_rows**([PgSql\Result](#class.pgsql-result) $result): [int](#language.types.integer)

**pg_affected_rows()** devuelve el número de filas
afectadas por las consultas de tipo INSERT,
UPDATE y DELETE.

Desde PostgreSQL 9.0 y versiones posteriores, el servidor devuelve el número
de filas seleccionadas. Para las versiones anteriores, PostgreSQL
devuelve 0 para las SELECT.

**Nota**:

    Anteriormente, esta función se llamaba **pg_cmdtuples()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

El número de filas afectadas por la consulta. Si no hay tuplas
afectadas, la función devolverá 0.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_affected_rows()**

&lt;?php
$result = pg_query($conn, "INSERT INTO editeur VALUES ('Auteur')");

$cmdtuples = pg_affected_rows($result);

echo $cmdtuples . " filas han sido afectadas.\n";
?&gt;

    El ejemplo anterior mostrará:

1 filas han sido afectadas.

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_query_params()](#function.pg-query-params) - Envía un comando al servidor y espera el resultado, con la capacidad de

pasar parámetros por separado del texto SQL de la consulta

    - [pg_execute()](#function.pg-execute) - Ejecuta una consulta preparada de PostgreSQL

    - [pg_num_rows()](#function.pg-num-rows) - Devuelve el número de filas de PostgreSQL

# pg_cancel_query

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_cancel_query —
Cancela una consulta asíncrona

### Descripción

**pg_cancel_query**([PgSql\Connection](#class.pgsql-connection) $connection): [bool](#language.types.boolean)

**pg_cancel_query()** cancela la consulta asíncrona, iniciada con
[pg_send_query()](#function.pg-send-query),
[pg_send_query_params()](#function.pg-send-query-params) o
[pg_send_execute()](#function.pg-send-execute).
No es posible cancelar una consulta iniciada con [pg_query()](#function.pg-query).

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_cancel_query()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select _ from autores; select count(_) from autores;");
}

$res1 = pg_get_result($dbconn);
echo "Primera llamada a pg_get_result() : $res1\n";
  $rows1 = pg_num_rows($res1);
echo "$res1 tiene $rows1 registros\n\n";

// Cancela la consulta en curso de ejecución. Será la segunda consulta
// que aún funciona.
pg_cancel_query($dbconn);
?&gt;

    El ejemplo anterior mostrará:

Primera llamada a pg_get_result() : Resource id #3
Resource id #3 tiene 3 registros

### Ver también

    - [pg_send_query()](#function.pg-send-query) - Ejecuta una consulta PostgreSQL asíncrona

    - [pg_connection_busy()](#function.pg-connection-busy) - Verifica si la conexión PostgreSQL está ocupada

# pg_client_encoding

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

pg_client_encoding —
Lee el encodage del cliente

### Descripción

    **pg_client_encoding**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

PostgreSQL soporta la conversión automática entre el servidor y el cliente
para ciertos juegos de caracteres. **pg_client_encoding()**
devuelve el encodage del cliente. El string de retorno será uno de los encodages
estándar de PostgreSQL.

**Nota**:

    Esta función requiere PostgreSQL versión
    7.0 o más reciente. Si la biblioteca libpq es compilada sin
    el soporte de encodage multiocteto,
    **pg_client_encoding()** devolverá siempre
    SQL_ASCII. El soporte de encodage depende de la versión
    de PostgreSQL. Consúltese la documentación de PostgreSQL sobre los
    encodages soportados.




    Anteriormente, esta función se llamaba **pg_clientencoding()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

El encodage del cliente.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_client_encoding()**

&lt;?php
// Assume $conn siendo una conexión a una base de datos ISO-8859-1
$encoding = pg_client_encoding($conn);

echo "El encodage del cliente es: ", $encoding, "\n";
?&gt;

    El ejemplo anterior mostrará:

El encodage del cliente es: ISO-8859-1

### Ver también

    - [pg_set_client_encoding()](#function.pg-set-client-encoding) - Establece la codificación del cliente PostgreSQL

# pg_close

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_close —
Finaliza una conexión PostgreSQL

### Descripción

**pg_close**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [true](#language.types.singleton)

**pg_close()** cierra la conexión al servidor PostgreSQL
asociada a connection.

**Nota**:

    No es generalmente necesario cerrar una
    conexión no persistente, ya que estas son cerradas automáticamente
    al final de un script.

Si existen instancias de [PgSql\Lob](#class.pgsql-lob) que han sido abiertas
con esta conexión, no se debe cerrar la conexión antes de haber cerrado todas
las instancias de [PgSql\Lob](#class.pgsql-lob).

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_close()**

&lt;?php
$dbconn = pg_connect("host=localhost port=5432 dbname=marie")
      or die("Conexión imposible");
echo 'Conexión exitosa';
pg_close($dbconn);
?&gt;

    El ejemplo anterior mostrará:

Conexión exitosa

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

# pg_connect

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_connect —
Establece una conexión PostgreSQL

### Descripción

**pg_connect**([string](#language.types.string) $connection_string, [int](#language.types.integer) $flags = 0): [PgSql\Connection](#class.pgsql-connection)|[false](#language.types.singleton)

**pg_connect()** abre una conexión a una base de datos
PostgreSQL mediante la cadena de conexión
connection_string.

Si se realiza una segunda llamada a **pg_connect()** con
los mismos argumentos, no se establecerá una nueva conexión a menos que se
pase **[PGSQL_CONNECT_FORCE_NEW](#constant.pgsql-connect-force-new)** a flags,
pero se devolverá la conexión anterior.

La antigua sintaxis
**$conn = pg_connect("host", "port", "options", "tty", "dbname")**
está obsoleta.

### Parámetros

     connection_string


       La cadena connection_string puede estar vacía para
       utilizar todos los parámetros por omisión o puede contener uno o
       varios parámetros de configuración separados por espacios.
       Cada parámetro de configuración tiene la forma code =
       valor. Los espacios alrededor del signo igual son opcionales.
       Para escribir un valor vacío o un valor que contenga espacios,
       rodee este valor con comillas simples, por ejemplo: code =
       'un valor'. Las comillas simples y las barras invertidas dentro
       del valor deben escapar con una barra invertida, es decir
       \' y \\.




       Las palabras clave actualmente reconocidas son :
       host, hostaddr,
       port,
       dbname (valor por omisión: user),
       user,
       password,
       connect_timeout,
       options, tty (ignorado),
       sslmode,
       requiressl (obsoleto, utilice
       sslmode) y
       service. La lista de estos argumentos depende de
       la versión del servidor PostgreSQL.




       El parámetro options puede utilizarse para pasar parámetros
       para la línea de comandos que invoca al servidor.






     flags


       Si **[PGSQL_CONNECT_FORCE_NEW](#constant.pgsql-connect-force-new)** se pasa como argumento,
       entonces se creará una nueva conexión, incluso si la cadena
       connection_string es idéntica a la de la conexión existente.




       Si **[PGSQL_CONNECT_ASYNC](#constant.pgsql-connect-async)** se proporciona, la conexión
       se establecerá de forma asíncrona. El estado de la conexión puede verificarse
       mediante la función [pg_connect_poll()](#function.pg-connect-poll) o mediante la
       función [pg_connection_status()](#function.pg-connection-status).





### Valores devueltos

Devuelve una instancia de [PgSql\Connection](#class.pgsql-connection) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PgSql\Connection](#class.pgsql-connection) ;
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_connect()**

&lt;?php
$dbconn = pg_connect("dbname=marie");
// conexión a una base de datos llamada "marie"

$dbconn2 = pg_connect("host=localhost port=5432 dbname=marie");
// conexión a una base de datos llamada "marie" en el host "localhost" en el puerto "5432"

$dbconn3 = pg_connect("host=mouton port=5432 dbname=marie user=agneau password=foo");
// conexión a una base de datos llamada "marie" en el host "mouton" con un
// nombre de usuario y una contraseña

$conn_string = "host=mouton port=5432 dbname=test user=agneau password=bar";
$dbconn4 = pg_connect($conn_string);
// conexión a una base de datos llamada "test" en el host "mouton" con un
// nombre de usuario y una contraseña

$dbconn5 = pg_connect("host=localhost options='--client_encoding=UTF8'");
//conexión a la base en "localhost" y paso de un parámetro de la línea de
// comandos relacionado con la codificación UTF-8
?&gt;

### Ver también

    - [pg_pconnect()](#function.pg-pconnect) - Establece una conexión PostgreSQL persistente

    - [pg_close()](#function.pg-close) - Finaliza una conexión PostgreSQL

    - [pg_host()](#function.pg-host) - Devuelve el nombre de host

    - [pg_port()](#function.pg-port) - Devuelve el número de puerto

    - [pg_tty()](#function.pg-tty) - Devuelve el nombre de TTY asociado a la conexión

    - [pg_options()](#function.pg-options) - Devuelve las opciones de PostgreSQL

    - [pg_dbname()](#function.pg-dbname) - Devuelve el nombre de la base de datos PostgreSQL

# pg_connect_poll

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

pg_connect_poll —
Prueba el estado de un intento de conexión asíncrona a PostgreSQL en curso

### Descripción

**pg_connect_poll**([PgSql\Connection](#class.pgsql-connection) $connection): [int](#language.types.integer)

La función **pg_connect_poll()** prueba el estado de una conexión
PostgreSQL creada al llamar a la función [pg_connect()](#function.pg-connect) con
la opción **[PGSQL_CONNECT_ASYNC](#constant.pgsql-connect-async)**.

### Parámetros

    connection

     Una instancia [PgSql\Connection](#class.pgsql-connection).

### Valores devueltos

Devuelve la constante **[PGSQL_POLLING_FAILED](#constant.pgsql-polling-failed)**,
**[PGSQL_POLLING_READING](#constant.pgsql-polling-reading)**,
**[PGSQL_POLLING_WRITING](#constant.pgsql-polling-writing)**,
**[PGSQL_POLLING_OK](#constant.pgsql-polling-ok)**, o la constante
**[PGSQL_POLLING_ACTIVE](#constant.pgsql-polling-active)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pg_connection_busy

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_connection_busy —
Verifica si la conexión PostgreSQL está ocupada

### Descripción

**pg_connection_busy**([PgSql\Connection](#class.pgsql-connection) $connection): [bool](#language.types.boolean)

**pg_connection_busy()** determina si la conexión está
ocupada. Si está ocupada, una consulta ya ha sido
lanzada y está en curso. Si [pg_get_result()](#function.pg-get-result) es
utilizada, será entonces bloqueada.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

    Devuelve **[true](#constant.true)** si la conexión está ocupada, de lo contrario **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_connection_busy()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");
 $bs = pg_connection_busy($dbconn);
if ($bs) {
echo 'La conexión está ocupada';
} else {
echo 'La conexión está libre';
}
?&gt;

### Ver también

    - [pg_connection_status()](#function.pg-connection-status) - Se lee el estado de la conexión PostgreSQL

    - [pg_get_result()](#function.pg-get-result) - Lee un resultado asíncrono de PostgreSQL

# pg_connection_reset

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_connection_reset —
Reinicia la conexión al servidor PostgreSQL

### Descripción

**pg_connection_reset**([PgSql\Connection](#class.pgsql-connection) $connection): [bool](#language.types.boolean)

**pg_connection_reset()** realiza una reconexión al
servidor, con los mismos parámetros que en la conexión previa
con connection. Esta función es útil
para el manejo de errores.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_connection_reset()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die ("Conexión imposible");
 $dbconn2 = pg_connection_reset($dbconn);
if ($dbconn2) {
echo 'Reinicio exitoso';
} else {
echo 'Reinicio fallido';
}
?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

    - [pg_pconnect()](#function.pg-pconnect) - Establece una conexión PostgreSQL persistente

    - [pg_connection_status()](#function.pg-connection-status) - Se lee el estado de la conexión PostgreSQL

# pg_connection_status

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_connection_status —
Se lee el estado de la conexión PostgreSQL

### Descripción

    **pg_connection_status**([PgSql\Connection](#class.pgsql-connection) $connection): [int](#language.types.integer)

**pg_connection_status()** devuelve el estado de la
conexión connection.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

    **[PGSQL_CONNECTION_OK](#constant.pgsql-connection-ok)** o
    **[PGSQL_CONNECTION_BAD](#constant.pgsql-connection-bad)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_connection_status()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");
  $stat = pg_connection_status($dbconn);
if ($stat === PGSQL_CONNECTION_OK) {
echo 'Conexión ok';
} else {
echo 'Conexión errónea';
}
?&gt;

### Ver también

    - [pg_connection_busy()](#function.pg-connection-busy) - Verifica si la conexión PostgreSQL está ocupada

# pg_consume_input

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

pg_consume_input — Lee la entrada de la conexión

### Descripción

**pg_consume_input**([PgSql\Connection](#class.pgsql-connection) $connection): [bool](#language.types.boolean)

La función **pg_consume_input()** lee todas
las entradas pendientes de ser leídas desde el servidor
de base de datos.

### Parámetros

    connection

     Una instancia [PgSql\Connection](#class.pgsql-connection).

### Valores devueltos

**[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error. Tenga en cuenta
que **[true](#constant.true)** no indica necesariamente que la entrada esté pendiente
de ser leída.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pg_convert

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_convert —
Convierte valores de un array asociativo a una forma adecuada para consultas SQL

### Descripción

**pg_convert**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $values,
    [int](#language.types.integer) $flags = 0
): [array](#language.types.array)|[false](#language.types.singleton)

**pg_convert()** verifica y convierte el array
asociativo values en una consulta SQL válida.
Para que **pg_convert()** funcione, debe existir la tabla
table_name, y debe contener al menos tantas columnas
como elementos tenga el array values. Los nombres de
los campos de table_name deben corresponder a los índices
del array en values.
Devuelve un array con los valores convertidos en caso de éxito, y de lo contrario,
**[false](#constant.false)**.

**Nota**:

    Los valores booleanos son admitidos y convertidos a booleanos PostgreSQL.
    Las representaciones de valores booleanos en forma de strings también son soportadas. **[null](#constant.null)** es convertido a NULL PostgreSQL.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       Nombre de la tabla para la cual se convertirán los tipos.






     values


       Datos a ser convertidos.






     flags


       Un número de **[PGSQL_CONV_IGNORE_DEFAULT](#constant.pgsql-conv-ignore-default)**,
       **[PGSQL_CONV_FORCE_NULL](#constant.pgsql-conv-force-null)** o
       **[PGSQL_CONV_IGNORE_NOT_NULL](#constant.pgsql-conv-ignore-not-null)**, combinados.





### Valores devueltos

Un [array](#language.types.array) de valores convertidos, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) o [TypeError](#class.typeerror)
cuando el valor o el tipo del campo no coincide correctamente con un tipo PostgreSQL.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza un error [ValueError](#class.valueerror) o [TypeError](#class.typeerror)
       cuando el valor o el tipo del campo no coincide correctamente con un tipo PostgreSQL;
       previamente, se emitía un **[E_WARNING](#constant.e-warning)**.





8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_convert()**

&lt;?php
$dbconn = pg_connect('dbname=foo');

$tmp = array(
'auteur' =&gt; 'Joe Thackery',
'annee' =&gt; 2005,
'titre' =&gt; 'Ma Vie, par Joe Thackery'
);

$vals = pg_convert($dbconn, 'auteurs', $tmp);
?&gt;

### Ver también

    - [pg_meta_data()](#function.pg-meta-data) - Lee los metadatos de la tabla PostgreSQL

    - [pg_insert()](#function.pg-insert) - Inserta un array en una tabla

    - [pg_select()](#function.pg-select) - Realiza una selección PostgreSQL

    - [pg_update()](#function.pg-update) - Modifica las líneas de una tabla

    - [pg_delete()](#function.pg-delete) - Elimina filas de PostgreSQL

# pg_copy_from

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_copy_from —
Inserta filas en una tabla a partir de un array

### Descripción

**pg_copy_from**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $rows,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $null_as = "\\\\N"
): [bool](#language.types.boolean)

**pg_copy_from()** inserta los elementos del array
rows en una tabla.
Esta función utiliza la orden SQL interna COPY FROM.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       Nombre de la tabla en la que rows será copiado.






     rows


       Un array de datos a ser copiado dentro de
       table_name. Cada valor en
       rows se convierte en una fila en
       table_name. Cada valor en
       rows debería ser una cadena delimitada por valores
       a insertar dentro de cada campo. Los valores deben terminar con un salto de línea.






     separator


       El marcador que separa los valores para cada campo en cada
       elemento de rows. Por omisión
       \t.






     null_as


       Cómo se representan los valores NULL de SQL en
       rows. Por omisión \\N ("\\\\N").





### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_copy_from()**

&lt;?php
$db = pg_connect("dbname=publisher") or die("Conexión imposible");

$rows = pg_copy_to($db, $table_name);

pg_query($db, "DELETE FROM $table_name");

pg_copy_from($db, $table_name, $rows);
?&gt;

### Ver también

    - [pg_copy_to()](#function.pg-copy-to) - Copia una tabla en un array

# pg_copy_to

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_copy_to —
Copia una tabla en un array

### Descripción

**pg_copy_to**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [string](#language.types.string) $separator = "\t",
    [string](#language.types.string) $null_as = "\\\\N"
): [array](#language.types.array)|[false](#language.types.singleton)

**pg_copy_to()** copia la tabla
table_name en un array.
Esta función utiliza el comando interno
SQL COPY TO para insertar los arrays.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       Nombre de la tabla a partir de la cual los datos en
       rows serán copiados.






     delimiter


       El marcador que separa los valores para cada campo en cada
       elemento de rows. Por omisión
       \t.






     null_as


       Cómo las valores NULL de SQL son representados
       en rows. Por omisión \\N ("\\\\N").





### Valores devueltos

    Un [array](#language.types.array) con un elemento para cada línea de datos
    COPY,  o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_copy_to()**

&lt;?php
$db = pg_connect("dbname=publisher") or die("Conexión imposible");

$rows = pg_copy_to($db, $table_name);

pg_query($db, "DELETE FROM $table_name");

pg_copy_from($db, $table_name, $rows);
?&gt;

### Ver también

    - [pg_copy_from()](#function.pg-copy-from) - Inserta filas en una tabla a partir de un array

# pg_dbname

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_dbname —
Devuelve el nombre de la base de datos PostgreSQL

### Descripción

**pg_dbname**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_dbname()** devuelve el nombre de la base de datos
PostgreSQL asociada a la conexión connection.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Una cadena de tipo [string](#language.types.string) que contiene el nombre de la base de
datos asociada a la conexión connection.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_dbname()**

&lt;?php
error_reporting(E_ALL);

pg_connect ("host=localhost port=5432 dbname=marie");
echo pg_dbname(); // muestra marie
?&gt;

# pg_delete

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_delete —
Elimina filas de PostgreSQL

### Descripción

**pg_delete**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $conditions,
    [int](#language.types.integer) $flags = **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**
): [string](#language.types.string)|[bool](#language.types.boolean)

**pg_delete()** elimina las filas de una tabla especificadas por
las claves y valores del array asociativo conditions.

Si flags es proporcionado,
[pg_convert()](#function.pg-convert) es aplicado a
conditions con los flags proporcionados.

Por omisión **pg_delete()** pasa valores sin tratar.
Los valores deben ser escapados o el flag **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**
debe ser especificado en flags.
**[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** añade comillas y escapa los parámetros/identificadores.
Por lo tanto, los nombres de tablas/columnas se vuelven sensibles a mayúsculas/minúsculas.

Tenga en cuenta que ni el escape ni las consultas preparadas pueden proteger
consultas LIKE, JSON, arrays, Regex, etc. Estos parámetros deben ser
tratados según su contexto. Es decir, escapar/validar los valores.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       Nombre de la tabla desde la cual las filas serán eliminadas.






     conditions


       Un [array](#language.types.array) donde las claves son los nombres de los campos de la tabla
       table_name y donde los valores son los valores
       de estos campos que deben ser eliminados.






     flags


       Cualquier combinación de los siguientes valores:
       **[PGSQL_CONV_FORCE_NULL](#constant.pgsql-conv-force-null)**,
       **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**,
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**,
       **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**,
       **[PGSQL_DML_ASYNC](#constant.pgsql-dml-async)** o
       **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**.
       Si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** forma parte del parámetro
       flags entonces, la consulta será devuelta.
       Cuando la constante **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)** o la constante
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** están definidas, ninguna llamada a la función
       [pg_convert()](#function.pg-convert) será realizada internamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Devuelve un [string](#language.types.string) si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**
es pasado en el parámetro flags.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_delete()**

&lt;?php
$db = pg_connect ('dbname=foo');
// Esto es seguro en cierta medida, ya que todos los valores son escapados
// Sin embargo PostgreSSQL soporta JSON/arrays. Estos no son
// seguros ni por escape ni por consultas preparadas.
 $res = pg_delete($db, 'post_log', $_POST, PG_DML_ESCAPE);
 if ($res) {
echo "Los datos POST han sido eliminados: $res\n";
} else {
echo "Los datos de entrada son incorrectos.\n";
}
?&gt;

### Ver también

    - [pg_convert()](#function.pg-convert) - Convierte valores de un array asociativo a una forma adecuada para consultas SQL

# pg_end_copy

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

pg_end_copy —
Sincroniza con el servidor PostgreSQL

### Descripción

**pg_end_copy**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [bool](#language.types.boolean)

**pg_end_copy()** sincroniza el cliente PostgreSQL
(normalmente un proceso del servidor web)
con el servidor PostgreSQL, después de una operación de copia realizada por
[pg_put_line()](#function.pg-put-line). **pg_end_copy()** debe
ser utilizado, de lo contrario el servidor PostgreSQL no estará sincronizado con
el cliente y emitirá un error.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection es ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_end_copy()**

&lt;?php
$conn = pg_pconnect("dbname=foo");
  pg_query($conn, "create table bar (a int4, b char(16), d float8)");
pg_query($conn, "copy bar from stdin");
  pg_put_line($conn, "3\tHola mundo\t4.5\n");
pg_put_line($conn, "4\tAdiós mundo\t7.11\n");
  pg_put_line($conn, "\\.\n");
pg_end_copy($conn);
?&gt;

### Ver también

    - [pg_put_line()](#function.pg-put-line) - Envía una string al servidor PostgreSQL

# pg_escape_bytea

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_escape_bytea —
Protege una cadena para insertarla en un campo bytea

### Descripción

**pg_escape_bytea**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $data): [string](#language.types.string)

**pg_escape_bytea()** protege los caracteres de la
cadena data con el modo bytea. La cadena
protegida es devuelta.

**Nota**:

    Cuando se utiliza una orden SELECT con datos de tipo bytea,
    PostgreSQL devuelve valores octales, prefijados con antislashs
    '\' (por ejemplo \032). Los usuarios deben realizar la conversión al
    formato binario manualmente.




    **pg_escape_bytea()** requiere PostgreSQL 7.2 o más reciente. Con
    PostgreSQL 7.2.0 y 7.2.1, los datos bytea deben ser transtipados
    cuando se activa el soporte de strings multioctetos.
    Es decir, INSERT INTO test_table (image) VALUES ('$image_escaped'::bytea);.
    PostgreSQL 7.2.2 o más reciente no requiere esta manipulación.
    Sin embargo, si el cliente y el servidor no utilizan el mismo juego de caracteres,
    pueden ocurrir errores. Entonces, se debe forzar el transtipado
    manualmente.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     data


       Una [string](#language.types.string) que contiene texto o datos binarios que serán
       insertados en la columna bytea.





### Valores devueltos

Una [string](#language.types.string) que contiene los datos escapados.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_escape_bytea()**

&lt;?php
// Conexión a la base de datos
$dbconn = pg_connect('dbname=foo');

// Lectura de un fichero binario
$data = file_get_contents('image1.jpg');

// Escapado de los datos binarios
$escaped = pg_escape_bytea($data);

// Inserción en la base de datos
pg_query("INSERT INTO gallery (name, data) VALUES ('Pine trees', '{$escaped}')");
?&gt;

### Ver también

    - [pg_unescape_bytea()](#function.pg-unescape-bytea) - Elimina la protección de una cadena de tipo bytea

    - [pg_escape_string()](#function.pg-escape-string) - Protege un string para una consulta SQL

# pg_escape_identifier

(PHP 5 &gt;= 5.4.4, PHP 7, PHP 8)

pg_escape_identifier —
Protege un identificador para su inserción en un campo de texto.

### Descripción

**pg_escape_identifier**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $data): [string](#language.types.string)

**pg_escape_identifier()** protege un identificador
(ejemplo: tabla, nombre de campo) para una consulta en la base de datos.
El resultado es una cadena de caracteres protegida para PostgreSQL.
**pg_escape_identifier()** añade comillas
antes y después de los datos. Los usuarios no deben, por lo tanto, añadir
comillas. Se recomienda el uso de esta función para los
identificadores de las consultas. Para los datos SQL sin tratar (es decir,
los parámetros, excepto de tipo bytea), [pg_escape_literal()](#function.pg-escape-literal)
o [pg_escape_string()](#function.pg-escape-string) debe ser utilizado. Para los campos
de tipo bytea es necesario utilizar [pg_escape_bytea()](#function.pg-escape-bytea).

**Nota**:

    Esta función tiene una protección de código interna y puede ser utilizada
    para PostgreSQL 8.4 o versiones anteriores.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     data


       Una [string](#language.types.string) que contiene texto a proteger.





### Valores devueltos

Una [string](#language.types.string) que contiene los datos protegidos.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_escape_identifier()**

&lt;?php
// Conexión a la base de datos
$dbconn = pg_connect('dbname=foo');

// Protección del nombre de la tabla
$escaped = pg_escape_identifier($table_name);

// Selección de las filas de la tabla $table_name
  pg_query("SELECT * FROM {$escaped};");
?&gt;

### Ver también

    - [pg_escape_literal()](#function.pg-escape-literal) - Protege una consulta SQL literal para insertar en un campo de texto

    - [pg_escape_bytea()](#function.pg-escape-bytea) - Protege una cadena para insertarla en un campo bytea

    - [pg_escape_string()](#function.pg-escape-string) - Protege un string para una consulta SQL

# pg_escape_literal

(PHP 5 &gt;= 5.4.4, PHP 7, PHP 8)

pg_escape_literal —
Protege una consulta SQL literal para insertar en un campo de texto

### Descripción

**pg_escape_literal**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $data): [string](#language.types.string)

**pg_escape_literal()** protege una consulta SQL literal para
su ejecución en la base de datos PostgreSQL. El resultado devuelto es un string protegido en formato
PostgreSQL. **pg_escape_literal()** añade comillas simples antes y después de los datos. Los usuarios no deben, por tanto, añadir comillas simples.
Se recomienda el uso de esta función en lugar de
[pg_escape_string()](#function.pg-escape-string). Si la
columna es de tipo bytea, se debe utilizar en su lugar la función [pg_escape_bytea()](#function.pg-escape-bytea).
Para proteger los identificadores (por ejemplo, nombres de tabla, nombres de campos), se debe utilizar la función
[pg_escape_identifier()](#function.pg-escape-identifier).

**Nota**:

    Esta función tiene una protección de código interna y puede ser utilizada para PostgreSQL 8.4 o versiones anteriores.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     data


       Un [string](#language.types.string) que contiene texto a proteger.





### Valores devueltos

Un [string](#language.types.string) que contiene los datos protegidos.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_escape_literal()**

&lt;?php
// Conexión a la base de datos
$dbconn = pg_connect('dbname=foo');

// Lectura de un fichero (que contiene apóstrofes y barras invertidas)
$data = file_get_contents('letter.txt');

// Protección de los datos
$escaped = pg_escape_literal($data);

// Inserción en la base de datos. Observe que no hay comillas simples alrededor de {$escaped}
  pg_query("INSERT INTO correspondence (name, data) VALUES ('My letter', {$escaped})");
?&gt;

### Ver también

    - [pg_escape_identifier()](#function.pg-escape-identifier) - Protege un identificador para su inserción en un campo de texto.

    - [pg_escape_bytea()](#function.pg-escape-bytea) - Protege una cadena para insertarla en un campo bytea

    - [pg_escape_string()](#function.pg-escape-string) - Protege un string para una consulta SQL

# pg_escape_string

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_escape_string —
Protege un string para una consulta SQL

### Descripción

**pg_escape_string**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $data): [string](#language.types.string)

**pg_escape_string()** protege un string
para insertarlo en la base de datos. Devuelve el string protegido
en formato PostgreSQL. Se recomienda el uso de esta función en lugar
de [addslashes()](#function.addslashes). Si el tipo de la columna es bytea,
[pg_escape_bytea()](#function.pg-escape-bytea) debe ser utilizada en su lugar.
La función [pg_escape_identifier()](#function.pg-escape-identifier) debe ser
utilizada para escapar identificadores (es decir, nombres de tablas, nombres
de campos).

**Nota**:

    Esta función requiere PostgreSQL 7.2 o posterior.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     data


       Un [string](#language.types.string) que contiene el texto a escapar.





### Valores devueltos

Un [string](#language.types.string) que contiene los datos escapados.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_escape_string()**

&lt;?php
// Conexión a la base de datos
$dbconn = pg_connect('dbname=foo');

// Lectura de un fichero de texto (que contiene apóstrofes y barras invertidas)
$data = file_get_contents('letter.txt');

// Protección de los datos
$escaped = pg_escape_string($data);

// Inserción en la base de datos
pg_query("INSERT INTO correspondence (name, data) VALUES ('Mi carta', '{$escaped}')");
?&gt;

### Ver también

    - [pg_escape_bytea()](#function.pg-escape-bytea) - Protege una cadena para insertarla en un campo bytea

# pg_execute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_execute —
Ejecuta una consulta preparada de PostgreSQL

### Descripción

**pg_execute**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $stmtname, [array](#language.types.array) $params): [PgSql\Result](#class.pgsql-result)|[false](#language.types.singleton)

Envía una consulta para ejecutar una consulta preparada con los
argumentos dados y espera el resultado.

**pg_execute()** es similar a [pg_query_params()](#function.pg-query-params),
pero la consulta que será ejecutada se especifica nombrando una consulta
previamente preparada, en lugar de proporcionar una cadena como consulta.
Esta característica permite que las consultas que serán utilizadas
repetidamente sean analizadas y planificadas una sola vez,
en lugar de ser ejecutadas cada vez. La consulta debe haber sido
previamente preparada en la sesión actual.
**pg_execute()** es soportada solo con las versiones
PostgreSQL 7.4 o más recientes; la consulta fallará si se utiliza
con versiones anteriores.

Los argumentos son idénticos a la función [pg_query_params()](#function.pg-query-params)
excepto por el nombre de la consulta preparada que se proporciona en lugar de la
consulta en forma de cadena.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     stmtname


       El nombre de la consulta preparada a ejecutar. Si se especifica una cadena vacía (""),
       entonces se ejecuta la consulta sin nombre. El nombre debe haber sido previamente preparado
       utilizando [pg_prepare()](#function.pg-prepare), [pg_send_prepare()](#function.pg-send-prepare)
       o una orden SQL PREPARE.






     params


       Un array de valores de argumentos para sustituir las variables $1, $2, etc.
       en la consulta preparada original. El número de elementos presentes en
       el array debe coincidir con el número de variables a reemplazar.



      **Advertencia**

        Los elementos son convertidos en strings al llamar a esta función.






### Valores devueltos

Una instancia de [PgSql\Result](#class.pgsql-result) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_execute()**

&lt;?php
// Conexión a una base de datos llamada "marie"
$dbconn = pg_connect("dbname=marie");

// Prepara una consulta para su ejecución
$result = pg_prepare($dbconn, "my_query", 'SELECT \* FROM magasins WHERE nom = $1');

// Ejecuta la consulta preparada. Observe que no es necesario escapar
// la cadena "Joe's Widgets"
$result = pg_execute($dbconn, "my_query", array("Joe's Widgets"));

// Ejecuta la misma consulta preparada, esta vez con un argumento diferente
$result = pg_execute($dbconn, "my_query", array("Vêtements Vêtements Vêtements"));

?&gt;

### Ver también

    - [pg_prepare()](#function.pg-prepare) - Envía una solicitud al servidor para crear una sentencia preparada con los parámetros

dados y espera la ejecución

    - [pg_send_prepare()](#function.pg-send-prepare) - Envía una solicitud para crear una consulta preparada con los argumentos

dados, sin esperar el final de su ejecución

    - [pg_query_params()](#function.pg-query-params) - Envía un comando al servidor y espera el resultado, con la capacidad de

pasar parámetros por separado del texto SQL de la consulta

# pg_fetch_all

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_fetch_all —
Lee todas las líneas de un resultado

### Descripción

**pg_fetch_all**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $mode = **[PGSQL_ASSOC](#constant.pgsql-assoc)**): [array](#language.types.array)

**pg_fetch_all()** devuelve un array que contiene
todas las líneas de result.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     mode



Un parámetro opcional que controla cómo el [array](#language.types.array) devuelto es indexado.
mode es una constante que puede tomar los siguientes valores:
**[PGSQL_ASSOC](#constant.pgsql-assoc)**, **[PGSQL_NUM](#constant.pgsql-num)** y **[PGSQL_BOTH](#constant.pgsql-both)**.
Usando **[PGSQL_NUM](#constant.pgsql-num)**, la función devolverá un array con índices numéricos,
usando **[PGSQL_ASSOC](#constant.pgsql-assoc)**, devolverá solo índices asociativos
mientras que **[PGSQL_BOTH](#constant.pgsql-both)** devolverá ambos índices numéricos y asociativos.

### Valores devueltos

Un array [array](#language.types.array) de todas las líneas en el conjunto
de resultados. Cada línea es un array de valores de los campos indexado por el
nombre de los campos.

### Historial de cambios

       Versión
       Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

       8.0.0

        **pg_fetch_all()** devolverá ahora un [array](#language.types.array) vacío
        en lugar de **[false](#constant.false)** para los conjuntos de resultados con cero líneas.




       7.1.0

        Se ha añadido el argumento mode.





### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_all()**

&lt;?php
$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

$result = pg_query($conn, "SELECT \* FROM autores");
if (!$result) {
echo "Se ha producido un error.\n";
exit;
}

$arr = pg_fetch_all($result);

print_r($arr);

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[id] =&gt; 1
[name] =&gt; Fred
)

    [1] =&gt; Array
        (
            [id] =&gt; 2
            [name] =&gt; Bob
        )

)

### Ver también

    - [pg_fetch_row()](#function.pg-fetch-row) - Lee una fila en un array

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_fetch_all_columns

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_fetch_all_columns —
Recupera todas las filas de una columna particular de resultados como un array

### Descripción

**pg_fetch_all_columns**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field = 0): [array](#language.types.array)

**pg_fetch_all_columns()** devuelve un array que contiene todas las filas
(registros) de una columna particular de un recurso de resultados.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


       Número de la columna. Por omisión, la primera columna si no se especifica.





### Valores devueltos

Un [array](#language.types.array) que contiene todos los valores de una columna del resultado.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_all_columns()**

&lt;?php
$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

$result = pg_query($conn, "SELECT title, name, address FROM authors");
if (!$result) {
echo "Se ha producido un error.\n";
exit;
}

// Recupera un array que contiene todos los nombres de autores
$arr = pg_fetch_all_columns($result, 1);

var_dump($arr);

?&gt;

### Ver también

    - [pg_fetch_all()](#function.pg-fetch-all) - Lee todas las líneas de un resultado

# pg_fetch_array

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_fetch_array —
Lee una línea de resultado PostgreSQL en un array

### Descripción

**pg_fetch_array**([PgSql\Result](#class.pgsql-result) $result, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[PGSQL_BOTH](#constant.pgsql-both)**): [array](#language.types.array)|[false](#language.types.singleton)

**pg_fetch_array()** devuelve un array que contiene
la línea solicitada.

**pg_fetch_array()** es una versión mejorada de
[pg_fetch_row()](#function.pg-fetch-row). Además de proporcionar un array con
índice numérico, también puede almacenar los datos en un array asociativo,
utilizando los nombres de los campos como claves. Estas dos funciones utilizan
el array asociativo por omisión.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

**pg_fetch_array()** no es significativamente más lenta
que [pg_fetch_row()](#function.pg-fetch-row) y aporta una comodidad de uso apreciable.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la línea a recuperar. Las líneas están numeradas
       comenzando por 0. Si el argumento es omitido o si vale **[null](#constant.null)**,
       se recupera la línea siguiente.






     mode



Un parámetro opcional que controla cómo el [array](#language.types.array) devuelto es indexado.
mode es una constante que puede tomar los siguientes valores:
**[PGSQL_ASSOC](#constant.pgsql-assoc)**, **[PGSQL_NUM](#constant.pgsql-num)** y **[PGSQL_BOTH](#constant.pgsql-both)**.
Usando **[PGSQL_NUM](#constant.pgsql-num)**, la función devolverá un array con índices numéricos,
usando **[PGSQL_ASSOC](#constant.pgsql-assoc)**, devolverá solo índices asociativos
mientras que **[PGSQL_BOTH](#constant.pgsql-both)** devolverá ambos índices numéricos y asociativos.

### Valores devueltos

Un array con índice numérico (comenzando por 0), asociativo (indexado con
el nombre de los campos) o ambos.
Cada valor en el array está representado como un string
([string](#language.types.string)). Los valores **[null](#constant.null)** de la base de datos son
devueltos como **[null](#constant.null)**.

**[false](#constant.false)** es devuelto si row excede el número de
líneas en el conjunto de resultados, no hay más líneas disponibles o cualquier
otro error.
Intentar recuperar el resultado de una consulta que no sea SELECT también devolverá **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_array()**

&lt;?php

$conn = pg_pconnect ("dbname=publisher");
if (!$conn) {
echo "Error de conexión.\n";
exit;
}

$result = pg_query ($conn, "SELECT autor, email FROM autores");
if (!$result) {
echo "Error durante la consulta.\n";
exit;
}

$arr = pg_fetch_array ($result, 0, PGSQL_NUM);
echo $arr[0] . " &lt;- Línea 1 Autor\n";
echo $arr[1] . " &lt;- Línea 1 Correo electrónico\n";

// El parámetro row es opcional; NULL puede ser pasado en su lugar,
// para pasar un modo. Las llamadas sucesivas a pg_fetch_array
// devolverán la línea siguiente.
$arr = pg_fetch_array($result, NULL, PGSQL_ASSOC);
echo $arr["autor"] . " &lt;- Línea 2 Autor\n";
echo $arr["email"] . " &lt;- Línea 2 Correo electrónico\n";

$arr = pg_fetch_array($result);
echo $arr["autor"] . " &lt;- Línea 3 Autor\n";
echo $arr[1] . " &lt;- Línea 3 Correo electrónico\n";

?&gt;

### Ver también

    - [pg_fetch_row()](#function.pg-fetch-row) - Lee una fila en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_fetch_assoc

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_fetch_assoc —
Lee una fila de resultado PostgreSQL como un array asociativo

### Descripción

**pg_fetch_assoc**([PgSql\Result](#class.pgsql-result) $result, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**pg_fetch_assoc()** devuelve un array asociativo que
contiene la fila actual en el resultado result.

**pg_fetch_assoc()** es equivalente a llamar
[pg_fetch_row()](#function.pg-fetch-row) con **[PGSQL_ASSOC](#constant.pgsql-assoc)**
como tercer argumento (que es opcional). Esto devolverá solo un
array asociativo. Si se necesitan índices numéricos, se debe utilizar
[pg_fetch_row()](#function.pg-fetch-row).

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

**pg_fetch_assoc()** no es significativamente más
lenta que [pg_fetch_row()](#function.pg-fetch-row) y aporta una
comodidad de uso apreciable.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la fila a recuperar. Las filas están numeradas
       comenzando desde 0. Si el argumento es omitido o si es **[null](#constant.null)**,
       la siguiente fila es recuperada.





### Valores devueltos

Un array con índice asociativo (por nombre de campo). Cada valor en el
array es representado como un [string](#language.types.string). Los valores
**[null](#constant.null)** de la base de datos son devueltos **[null](#constant.null)**.

**[false](#constant.false)** es devuelto si row excede el número de
filas en el conjunto de resultados, no hay más filas disponibles o cualquier
otro error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_assoc()**

&lt;?php
$conn = pg_pconnect ("dbname=publisher");
if (!$conn) {
echo "Ha ocurrido un error.\n";
exit;
}

$result = pg_query ($conn, "SELECT id, autor, email FROM autores");
if (!$result) {
echo "Ha ocurrido un error.\n";
exit;
}

while ($row = pg_fetch_assoc($result)) {
echo $row['id'];
echo $row['autor'];
echo $row['email'];
}
?&gt;

### Ver también

    - [pg_fetch_row()](#function.pg-fetch-row) - Lee una fila en un array

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_fetch_object

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_fetch_object —
Lee una fila de resultado PostgreSQL en un objeto

### Descripción

**pg_fetch_object**(
    [PgSql\Result](#class.pgsql-result) $result,
    [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**,
    [string](#language.types.string) $class = "stdClass",
    [array](#language.types.array) $constructor_args = []
): [object](#language.types.object)|[false](#language.types.singleton)

**pg_fetch_object()** devuelve un objeto con sus propiedades que corresponden a los nombres de los campos de la fila. La función puede instanciar opcionalmente un objeto de una clase específica y pasar los argumentos al constructor de dicha clase.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

En cuanto a velocidad, la función es idéntica a [pg_fetch_array()](#function.pg-fetch-array) y es casi tan rápida como [pg_fetch_row()](#function.pg-fetch-row) (la diferencia es insignificante).

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la fila a recuperar. Las filas se numeran comenzando por 0. Si el argumento se omite o es **[null](#constant.null)**, se recupera la siguiente fila.






     class


        El nombre de la clase a instanciar, fija las propiedades de esta y sus valores de retorno. Si no se especifica nada, se devuelve un objeto de tipo [stdClass](#class.stdclass).






     constructor_args


        Parámetro opcional de tipo [array](#language.types.array) para pasar argumentos al constructor de la clase class.





### Valores devueltos

Un objeto de tipo [object](#language.types.object) con los atributos para cada campo en el conjunto de resultados. Los valores **[null](#constant.null)** de la base de datos se devuelven como **[null](#constant.null)**.

**[false](#constant.false)** se devuelve si row excede el número de filas en el conjunto de resultados, no hay más filas disponibles o cualquier otro error.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) cuando el argumento constructor_args no está vacío y la clase no tiene constructor.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza una excepción [ValueError](#class.valueerror) cuando el argumento constructor_args no está vacío y la clase no tiene constructor; anteriormente, se lanzaba una excepción [Exception](#class.exception).





8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_object()**

&lt;?php

$database = 'store';

$db_conn = pg_connect("host=localhost port=5432 dbname=$database");
if (!$db_conn) {
echo "La conexión a la base $database ha fallado\n";
exit;
}

$qu = pg_query($db_conn, "SELECT \* FROM libros ORDER BY autor");

while ($data = pg_fetch_object($qu)) {
echo $data-&gt;autor . " (";
echo $data-&gt;anio . "): ";
echo $data-&gt;titulo . "&lt;br /&gt;";
}

pg_free_result($qu);
pg_close($db_conn);

?&gt;

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_assoc()](#function.pg-fetch-assoc) - Lee una fila de resultado PostgreSQL como un array asociativo

    - [pg_fetch_row()](#function.pg-fetch-row) - Lee una fila en un array

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_fetch_result

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_fetch_result — Devuelve los valores de un resultado

### Descripción

**pg_fetch_result**([PgSql\Result](#class.pgsql-result) $result, [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null) $row
, [mixed](#language.types.mixed) $field): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

**pg_fetch_result**([PgSql\Result](#class.pgsql-result) $result, [mixed](#language.types.mixed) $field): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

**pg_fetch_result()** devuelve el valor de una fila y
un campo (columna) en particular a partir de una instancia [PgSql\Result](#class.pgsql-result).

**Nota**:

    Esta función puede llamarse **pg_result()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la fila a recuperar. Las filas están numeradas a partir de 0.
       Si el argumento es omitido, se recupera la siguiente fila.






     field


       Una cadena de tipo [string](#language.types.string) que representa el nombre del campo
       (columna) a recuperar, o un entero de tipo [int](#language.types.integer)
       que representa el número del campo a recuperar. Los campos están numerados
       a partir de 0.





### Valores devueltos

Los valores booleanos son devueltos como "t" o "f".
Todos los otros tipos, incluyendo los arrays, son devueltos como cadenas formateadas,
de la misma manera que PostgreSQL los mostraría en el cliente **psql**.
Los valores NULL de la base de datos son devueltos como NULL.

**[false](#constant.false)** es devuelto si row excede el número de filas en el conjunto
de resultados, no hay más filas disponibles o cualquier otro error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       row ahora puede ser nullable.





8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_result()**

&lt;?php
$db = pg_connect("dbname=users user=me");

$res = pg_query($db, "SELECT 1 UNION ALL SELECT 2");

$val = pg_fetch_result($res, 1, 0);

echo "El primer campo en la segunda fila es: ", $val, "\n";
?&gt;

    El ejemplo anterior mostrará:

El primer campo en la segunda fila es: 2

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

# pg_fetch_row

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_fetch_row — Lee una fila en un array

### Descripción

**pg_fetch_row**([PgSql\Result](#class.pgsql-result) $result, [?](#language.types.null)[int](#language.types.integer) $row = **[null](#constant.null)**, [int](#language.types.integer) $mode = **[PGSQL_NUM](#constant.pgsql-num)**): [array](#language.types.array)|[false](#language.types.singleton)

**pg_fetch_row()** lee una fila en el resultado
asociado a la instancia result.

**Nota**: Esta función define los campos NULL al valor PHP **[null](#constant.null)**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la fila a recuperar. Las filas están numeradas
       comenzando en 0. Si el argumento es omitido o si vale **[null](#constant.null)**,
       la siguiente fila es recuperada.






     mode



Un parámetro opcional que controla cómo el [array](#language.types.array) devuelto es indexado.
mode es una constante que puede tomar los siguientes valores:
**[PGSQL_ASSOC](#constant.pgsql-assoc)**, **[PGSQL_NUM](#constant.pgsql-num)** y **[PGSQL_BOTH](#constant.pgsql-both)**.
Usando **[PGSQL_NUM](#constant.pgsql-num)**, la función devolverá un array con índices numéricos,
usando **[PGSQL_ASSOC](#constant.pgsql-assoc)**, devolverá solo índices asociativos
mientras que **[PGSQL_BOTH](#constant.pgsql-both)** devolverá ambos índices numéricos y asociativos.

### Valores devueltos

Un array de tipo [array](#language.types.array), indexado desde 0, con cada
valor representado como un string ([string](#language.types.string)).
Los valores **[null](#constant.null)** de la base de datos son retornados como **[null](#constant.null)**.

**[false](#constant.false)** es retornado si row excede el número de
filas en el conjunto de resultados, no tiene más filas disponibles o cualquier
otro error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_fetch_row()**

&lt;?php

$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Ha ocurrido un error.\n";
exit;
}

$result = pg_query($conn, "SELECT autor, email FROM autores");
if (!$result) {
echo "Ha ocurrido un error.\n";
exit;
}

while ($row = pg_fetch_row($result)) {
echo "Autor: $row[0] E-mail: $row[1]";
echo "&lt;br /&gt;\n";
}

?&gt;

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_field_is_null

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_is_null —
Comprueba si un campo PostgreSQL es **[null](#constant.null)**

### Descripción

**pg_field_is_null**([PgSql\Result](#class.pgsql-result) $result, [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null) $row
, [mixed](#language.types.mixed) $field): [int](#language.types.integer)

**pg_field_is_null**([PgSql\Result](#class.pgsql-result) $result, [mixed](#language.types.mixed) $field): [int](#language.types.integer)

**pg_field_is_null()** comprueba si un campo en una instancia
[PgSql\Result](#class.pgsql-result) es un NULL SQL o no.

**Nota**:

    Anteriormente, esta función se llamaba **pg_fieldisnull()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la fila a recuperar. Las filas están numeradas a partir de 0.
       Si el argumento es omitido, se recupera la fila siguiente.






     field


        Número del campo (comenzando en 0) de tipo [int](#language.types.integer) o el nombre del campo
        de tipo [string](#language.types.string).





### Valores devueltos

Retorna 1 si el campo de la fila dada es **[null](#constant.null)**,
0 si no es **[null](#constant.null)**. **[false](#constant.false)** es retornado si la
fila no está en el array o cualquier otro error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       row es ahora nullable.





8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_field_is_null()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die ("Conexión imposible");
    $res = pg_query($dbconn, "select \* from autores where autor = 'Orwell'");
if ($res) {
        if (pg_field_is_null($res, 0, "año") == 1) {
echo "El valor del campo \"año\" es null.\n";
}
if (pg_field_is_null($res, 0, "año") == 0) {
echo "El valor del campo \"año\" no es null.\n";
}
}
?&gt;

# pg_field_name

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_name —
Devuelve el nombre de un campo PostgreSQL

### Descripción

**pg_field_name**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field): [string](#language.types.string)

**pg_field_name()** devuelve el nombre del campo que ocupa la
columna número field en el
resultado result. La numeración
de los campos comienza en 0.

**Nota**:

    Anteriormente, esta función se llamaba **pg_fieldname()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        Número del campo, comenzando en 0.





### Valores devueltos

El nombre del campo.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Obtención de información de los campos**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

$res = pg_query($dbconn, "select \* from autores where autor = 'Orwell'");
$i = pg_num_fields($res);
for ($j = 0; $j &lt; $i; $j++) {
     echo "columna $j\n";
     $fieldname = pg_field_name($res, $j);
     echo "Campo: $fieldname\n";
     echo "Tamaño mostrado: ".pg_field_prtlen($res, $fieldname)." caracteres\n";
     echo "Tamaño de almacenamiento: ".pg_field_size($res, $j)." bytes\n";
     echo "Tipo de campo: ".pg_field_type($res, $j)." \n\n";
}
?&gt;

    El ejemplo anterior mostrará:

columna 0
Campo: autor
Tamaño mostrado: 6 caracteres
Tamaño de almacenamiento: -1 bytes
Tipo de campo: varchar

columna 1
Campo: año
Tamaño mostrado: 4 caracteres
Tamaño de almacenamiento: 2 bytes
Tipo de campo: int2

columna 2
Campo: título
Tamaño mostrado: 24 caracteres
Tamaño de almacenamiento: -1 bytes
Tipo de campo: varchar

### Ver también

    - [pg_field_num()](#function.pg-field-num) - Devuelve el número de una columna

# pg_field_num

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_num —
Devuelve el número de una columna

### Descripción

**pg_field_num**([PgSql\Result](#class.pgsql-result) $result, [string](#language.types.string) $field): [int](#language.types.integer)

**pg_field_num()** devuelve el número de la columna,
cuyo nombre es field, en el resultado
result.

**Nota**:

    Anteriormente, esta función se llamaba **pg_fieldnum()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        El nombre del campo.
        El nombre dado es tratado como un identificador en un comando SQL, es decir, que se convierte a minúsculas a menos que esté citado dos veces.





### Valores devueltos

El número del campo (comenzando en 0) o -1 en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Obtención de información de los campos**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

$res = pg_query($dbconn, "select autor, año, título from autores where autor = 'Orwell'");

echo "El número de la columna 'título' es: ", pg_field_num($res, 'título');
?&gt;

    El ejemplo anterior mostrará:

El número de la columna 'título' es: 2

### Ver también

    - [pg_field_name()](#function.pg-field-name) - Devuelve el nombre de un campo PostgreSQL

# pg_field_prtlen

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_prtlen —
Devuelve el tamaño de impresión

### Descripción

**pg_field_prtlen**([PgSql\Result](#class.pgsql-result) $result, [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null) $row
, [mixed](#language.types.mixed) $field_name_or_number): [int](#language.types.integer)

**pg_field_prtlen**([PgSql\Result](#class.pgsql-result) $result, [mixed](#language.types.mixed) $field_name_or_number): [int](#language.types.integer)

**pg_field_prtlen()** devuelve el tamaño de impresión
(número de caracteres) de un valor dado en un
resultado PostgreSQL. La numeración de las líneas comienza
en 0. **pg_field_prtlen()** devuelve **[false](#constant.false)** en caso de error.

     El parámetro field_name_or_number puede ser pasado
     ya sea como [int](#language.types.integer) o como [string](#language.types.string).
     Si es pasado como [int](#language.types.integer), PHP lo identifica como el número de un campo,
     de lo contrario, como el nombre de un campo.




     Ver el ejemplo dado en la página de la documentación de la función
     [pg_field_name()](#function.pg-field-name).



    **Nota**:



      Anteriormente, esta función se llamaba **pg_fieldprtlen()**.


### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Número de la línea en el resultado. Las líneas están numeradas a
       partir de 0 en adelante. Si este parámetro no es proporcionado, la línea en
       curso es recuperada.





### Valores devueltos

El número de caracteres impresos.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       row es ahora nullable.





8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de información acerca de los campos**

&lt;?php
$dbconn = pg_connect("dbname=editeur") or die("Conexión imposible");

$res = pg_query($dbconn, "select \* from autores where autor = 'Orwell'");
$i = pg_num_fields($res);
for ($j = 0; $j &lt; $i; $j++) {
      echo "columna $j\n";
      $fieldname = pg_field_name($res, $j);
      echo "nombre campo: $fieldname\n";
      echo "tamaño visualización: " . pg_field_prtlen($res, $fieldname) . " caracteres\n";
      echo "tamaño registro: " . pg_field_size($res, $j) . " bytes\n";
      echo "tipo campo: " . pg_field_type($res, $j) . " \n\n";
}
?&gt;

    El ejemplo anterior mostrará:

columna 0
nombre campo: autor
tamaño visualización: 6 caracteres
tamaño registro: -1 bytes
tipo campo: varchar

columna 1
nombre campo: año
tamaño visualización: 4 caracteres
tamaño registro: 2 bytes
tipo campo: int2

columna 2
nombre campo: título
tamaño visualización: 24 caracteres
tamaño registro: -1 bytes
tipo campo: varchar

### Ver también

    - [pg_field_size()](#function.pg-field-size) - Devuelve el tamaño interno de almacenamiento de un campo dado

# pg_field_size

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_size —
Devuelve el tamaño interno de almacenamiento de un campo dado

### Descripción

**pg_field_size**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field): [int](#language.types.integer)

**pg_field_size()** devuelve el tamaño interno de almacenamiento
de un campo dado, en bytes.

**Nota**:

    Anteriormente, esta función se llamaba **pg_fieldsize()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        Número del campo, comenzando en 0.





### Valores devueltos

El tamaño del almacenamiento interno de un campo (en bytes). -1 significa un campo
de tamaño variable.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de información de los campos**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

$res = pg_query($dbconn, "select \* from autores where autor = 'Orwell'");
$i = pg_num_fields($res);
for ($j = 0; $j &lt; $i; $j++) {
      echo "columna $j\n";
      $fieldname = pg_field_name($res, $j);
      echo "Nombre del campo: $fieldname\n";
      echo "Tamaño para la visualización: " . pg_field_prtlen($res, $fieldname) . " caracteres\n";
      echo "Tamaño para el almacenamiento: " . pg_field_size($res, $j) . " bytes\n";
      echo "Tipo del campo: " . pg_field_type($res, $j) . " \n\n";
}
?&gt;

    El ejemplo anterior mostrará:

columna 0
Nombre del campo: autor
Tamaño para la visualización: 6 caracteres
Tamaño para el almacenamiento: -1 bytes
Tipo del campo: varchar

columna 1
Nombre del campo: año
Tamaño para la visualización: 4 caracteres
Tamaño para el almacenamiento: 2 bytes
Tipo del campo: int2

columna 2
Nombre del campo: título
Tamaño para la visualización: 24 caracteres
Tamaño para el almacenamiento: -1 bytes
Tipo del campo: varchar

### Ver también

    - [pg_field_prtlen()](#function.pg-field-prtlen) - Devuelve el tamaño de impresión

    - [pg_field_type()](#function.pg-field-type) - Devuelve el tipo de un campo PostgreSQL dado por índice

# pg_field_table

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

pg_field_table — Devuelve el nombre o el oid de una tabla

### Descripción

**pg_field_table**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field, [bool](#language.types.boolean) $oid_only = **[false](#constant.false)**): [string](#language.types.string)|[int](#language.types.integer)|[false](#language.types.singleton)

**pg_field_table()** devuelve el nombre de la tabla a la que
pertenece el campo o el oid de la tabla si el parámetro
oid_only vale **[true](#constant.true)**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        Número del campo, comenzando en 0.






     oid_only


        Por omisión, se devuelve el nombre de la tabla a la que pertenece el campo, pero
        si el parámetro oid_only se define como **[true](#constant.true)**, entonces,
        se devolverá el oid.





### Valores devueltos

En caso de éxito, el nombre de la tabla o el oid, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de información de una tabla a partir de un campo**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

$res = pg_query($dbconn, "SELECT bar FROM foo");

echo pg_field_table($res, 0);
echo pg_field_table($res, 0, true);

$res = pg_query($dbconn, "SELECT version()");
var_dump(pg_field_table($res, 0));
?&gt;

    Resultado del ejemplo anterior es similar a:

foo
14379580

bool(false)

### Notas

**Nota**:

    Devolver el oid es más rápido que devolver el nombre de la tabla, ya que
    la recuperación del nombre de la tabla requiere una consulta a la tabla del sistema
    de la base de datos.

### Ver también

    - [pg_field_name()](#function.pg-field-name) - Devuelve el nombre de un campo PostgreSQL

    - [pg_field_type()](#function.pg-field-type) - Devuelve el tipo de un campo PostgreSQL dado por índice

# pg_field_type

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_field_type —
Devuelve el tipo de un campo PostgreSQL dado por índice

### Descripción

**pg_field_type**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field): [string](#language.types.string)

**pg_field_type()** devuelve una cadena que contiene
el tipo base del campo dado por su índice field.

**Nota**:

    Si el campo utiliza un dominio PostgreSQL (en lugar de un tipo básico),
    es el nombre del dominio subyacente el que se devuelve, en lugar del nombre
    del dominio en sí.

**Nota**:

    Anteriormente, esta función se llamaba **pg_fieldtype()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        Número del campo, comenzando en 0.





### Valores devueltos

Una [string](#language.types.string) que contiene el nombre base del tipo de campo.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de información de los campos**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Se asume que 'titre' es un tipo varchar
$res = pg_query($dbconn, "select titre from autores where autor = 'Orwell'");

echo "Tipo del campo titre : ", pg_field_type($res, 0);
?&gt;

    El ejemplo anterior mostrará:

Tipo del campo titre : varchar

### Ver también

    - [pg_field_prtlen()](#function.pg-field-prtlen) - Devuelve el tamaño de impresión

    - [pg_field_name()](#function.pg-field-name) - Devuelve el nombre de un campo PostgreSQL

    - [pg_field_type_oid()](#function.pg-field-type-oid) - Devuelve el ID de tipo (OID) para el número de campo correspondiente

# pg_field_type_oid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_field_type_oid —
Devuelve el ID de tipo (OID) para el número de campo correspondiente

### Descripción

**pg_field_type_oid**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field): [string](#language.types.string)|[int](#language.types.integer)

**pg_field_type_oid()** devuelve un entero que contiene el OID
del tipo base del campo field dado en
la instancia result.

Puede obtenerse más información acerca del tipo de campo consultando la tabla del sistema de PostgreSQL **pg_type()** con
el OID obtenido por esta función.

**Nota**:

    Si el campo utiliza un dominio PostgreSQL (en lugar de un tipo básico),
    es el OID del dominio subyacente el que se devuelve, en lugar del OID del
    dominio como tal.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field


        Número del campo, comenzando en 0.





### Valores devueltos

El OID del tipo base del campo.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de información de los campos**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Se asume que 'título' es un tipo varchar
$res = pg_query($dbconn, "select título from autores where autor = 'Orwell'");

echo "Tipo del campo título OID: ", pg_field_type_oid($res, 0);
?&gt;

    El ejemplo anterior mostrará:

Tipo del campo título OID: 1043

### Ver también

    - [pg_field_type()](#function.pg-field-type) - Devuelve el tipo de un campo PostgreSQL dado por índice

    - [pg_field_prtlen()](#function.pg-field-prtlen) - Devuelve el tamaño de impresión

    - [pg_field_name()](#function.pg-field-name) - Devuelve el nombre de un campo PostgreSQL

# pg_flush

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

pg_flush — Envía los datos de la solicitud saliente a través de la conexión

### Descripción

**pg_flush**([PgSql\Connection](#class.pgsql-connection) $connection): [int](#language.types.integer)|[bool](#language.types.boolean)

La función **pg_flush()** envía todos los datos salientes
de la solicitud pendientes de envío a través de la conexión.

### Parámetros

    connection

     Una instancia [PgSql\Connection](#class.pgsql-connection).

### Valores devueltos

Devuelve **[true](#constant.true)** si el envío ha tenido éxito, o si no hay datos pendientes
de envío, 0 si una parte de los datos pendientes
han sido enviados pero aún quedan datos por enviar o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pg_free_result

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_free_result —
Libera la memoria

### Descripción

**pg_free_result**([PgSql\Result](#class.pgsql-result) $result): [bool](#language.types.boolean)

**pg_free_result()** libera la memoria y los datos asociados
con la instancia [PgSql\Result](#class.pgsql-result).

**pg_free_result()** solo es realmente útil si existe el riesgo
de utilizar demasiada memoria durante el script. La memoria
ocupada por los resultados se libera automáticamente
al final del script.

**Nota**:

    Anteriormente, esta función se llamaba **pg_freeresult()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_free_result()**

&lt;?php
$db = pg_connect("dbname=users user=me");

$res = pg_query($db, "SELECT 1 UNION ALL SELECT 2");

$val = pg_fetch_result($res, 1, 0);

echo "El primer campo de la segunda línea es: ", $val, "\n";

pg_free_result($res);
?&gt;

    El ejemplo anterior mostrará:

El primer campo de la segunda línea es: 2

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_query_params()](#function.pg-query-params) - Envía un comando al servidor y espera el resultado, con la capacidad de

pasar parámetros por separado del texto SQL de la consulta

    - [pg_execute()](#function.pg-execute) - Ejecuta una consulta preparada de PostgreSQL

    - [pg_result_memory_size()](#function.pg-result-memory-size) - Devuelve la cantidad de memoria asignada para un resultado de consulta

# pg_get_notify

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_get_notify —
Lee el mensaje SQL NOTIFY

### Descripción

**pg_get_notify**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $mode = **[PGSQL_ASSOC](#constant.pgsql-assoc)**): [array](#language.types.array)|[false](#language.types.singleton)

**pg_get_notify()** recibe el mensaje de NOTIFY enviado
por un comando SQL NOTIFY. Para leer el mensaje
asociado, se debe utilizar el comando LISTEN.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     mode



Un parámetro opcional que controla cómo el [array](#language.types.array) devuelto es indexado.
mode es una constante que puede tomar los siguientes valores:
**[PGSQL_ASSOC](#constant.pgsql-assoc)**, **[PGSQL_NUM](#constant.pgsql-num)** y **[PGSQL_BOTH](#constant.pgsql-both)**.
Usando **[PGSQL_NUM](#constant.pgsql-num)**, la función devolverá un array con índices numéricos,
usando **[PGSQL_ASSOC](#constant.pgsql-assoc)**, devolverá solo índices asociativos
mientras que **[PGSQL_BOTH](#constant.pgsql-both)** devolverá ambos índices numéricos y asociativos.

### Valores devueltos

Un [array](#language.types.array) que contiene el nombre del mensaje NOTIFY.
Si el servidor lo soporta, el array contiene también la versión del servidor y la carga útil (payload).
De lo contrario, si no hay ningún NOTIFY pendiente, se devolverá **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_get_notify()**

&lt;?php
$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

// escucha el mensaje 'author_updated' de otros procesos
pg_query($conn, 'LISTEN author_updated;');
$notify = pg_get_notify($conn);
if (!$notify) {
echo "Ningún mensaje\n";
} else {
print_r($notify);
}
?&gt;

### Ver también

    - [pg_get_pid()](#function.pg-get-pid) - Lee el identificador de proceso del servidor PostgreSQL

# pg_get_pid

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_get_pid —
Lee el identificador de proceso del servidor PostgreSQL

### Descripción

**pg_get_pid**([PgSql\Connection](#class.pgsql-connection) $connection): [int](#language.types.integer)

**pg_get_pid()** lee el identificador de proceso del
servidor PostgreSQL. El identificador de proceso es útil para
verificar si un mensaje de NOTIFY ha sido enviado
mediante [pg_get_notify()](#function.pg-get-notify) por otro proceso o no.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

El identificador del proceso del servidor.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_get_pid()**

&lt;?php
$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

// PID del servidor. Utilice entonces el PID con pg_get_notify()
$pid = pg_get_pid($conn);
?&gt;

### Ver también

    - [pg_get_notify()](#function.pg-get-notify) - Lee el mensaje SQL NOTIFY

# pg_get_result

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_get_result —
Lee un resultado asíncrono de PostgreSQL

### Descripción

**pg_get_result**([PgSql\Connection](#class.pgsql-connection) $connection): [PgSql\Result](#class.pgsql-result)|[false](#language.types.singleton)

**pg_get_result()** recupera la instancia
[PgSql\Result](#class.pgsql-result) de una consulta asíncrona ejecutada por
[pg_send_query()](#function.pg-send-query),
[pg_send_query_params()](#function.pg-send-query-params), o
[pg_send_execute()](#function.pg-send-execute).

[pg_send_query()](#function.pg-send-query) y otras funciones de consulta asíncrona pueden enviar múltiples consultas a un servidor PostgreSQL y
**pg_get_result()** se utiliza para obtener cada resultado de consulta, uno por uno.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

Una instancia de [PgSql\Result](#class.pgsql-result), o **[false](#constant.false)** si no hay más resultados disponibles.

### Historial de cambios

      Versión
      Descripción







8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_get_result()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select _ from autores; select count(_) from autores;");
}

$res1 = pg_get_result($dbconn);
echo "Primera llamada a pg_get_result(): $res1\n";
  $rows1 = pg_num_rows($res1);
echo "$res1 tiene $rows1 registros\n\n";

$res2 = pg_get_result($dbconn);
echo "Segunda llamada a pg_get_result(): $res2\n";
  $rows2 = pg_num_rows($res2);
echo "$res2 tiene $rows2 registros\n";
?&gt;

    El ejemplo anterior mostrará:

Primera llamada a pg_get_result(): Resource id #3
Resource id #3 tiene 3 registros

Segunda llamada a pg_get_result(): Resource id #4
Resource id #4 tiene 1 registros

### Ver también

    - [pg_send_query()](#function.pg-send-query) - Ejecuta una consulta PostgreSQL asíncrona

# pg_host

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_host —
Devuelve el nombre de host

### Descripción

**pg_host**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_host()** devuelve el nombre de host asociado a
la instancia de conexión PostgreSQL.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Una cadena que contiene el nombre del host de
connection o una cadena vacía en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_host()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

if ($pgsql_conn) {
   print "Correctamente conectado a : " . pg_host($pgsql_conn) . "&lt;br/&gt;\n";
} else {
print pg_last_error($pgsql_conn);
exit;
}
?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

    - [pg_pconnect()](#function.pg-pconnect) - Establece una conexión PostgreSQL persistente

# pg_insert

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_insert —
Inserta un array en una tabla

### Descripción

**pg_insert**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $values,
    [int](#language.types.integer) $flags = **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**
): [PgSql\Result](#class.pgsql-result)|[string](#language.types.string)|[bool](#language.types.boolean)

**pg_insert()** inserta los values
en la tabla table_name.

Si flags está especificado,
[pg_convert()](#function.pg-convert) se aplica a
values con los flags proporcionados.

Por omisión, **pg_insert()** pasa valores sin tratar.
Los valores deben ser escapados o el flag **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**
debe ser especificado en flags.
**[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** coloca comillas y escapa los parámetros/identificadores.
Por consiguiente, los nombres de tabla/columnas se vuelven sensibles a mayúsculas y minúsculas.

Tenga en cuenta que ni el escape ni las consultas preparadas pueden proteger
consultas LIKE, JSON, arrays, Regex, etc. Estos parámetros deben ser
tratados de acuerdo con su contexto. Es decir, escapar/validar los valores.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       Nombre de la tabla en la que se insertarán las filas. La tabla
       table_name debe tener al menos tantas columnas
       como elementos tenga values.






     values


       Un [array](#language.types.array) cuyas claves son los nombres de los campos en la tabla table_name,
       y cuyos valores son los valores de esos campos que serán insertados.






     flags


       Cualquier combinación de constantes entre
       **[PGSQL_CONV_OPTS](#constant.pgsql-conv-opts)**,
       **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**,
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**,
       **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**,
       **[PGSQL_DML_ASYNC](#constant.pgsql-dml-async)** o
       **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**. Si
       **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** forma parte del parámetro
       flags, entonces la consulta será retornada.
       Cuando la constante **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)** o la constante
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** está definida, no se realizará ninguna llamada a la función
       [pg_convert()](#function.pg-convert) internamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.. O retorna un [string](#language.types.string) si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**
es proporcionado a través de flags.

### Errores/Excepciones

Se lanza una [ValueError](#class.valueerror) cuando la tabla especificada es inválida.

Se lanza una [ValueError](#class.valueerror) o [TypeError](#class.typeerror) cuando
el valor o el tipo del campo no coincide correctamente con un tipo PostgreSQL.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Ahora lanza un error [ValueError](#class.valueerror) cuando la tabla especificada es inválida;
       anteriormente, se emitía un **[E_WARNING](#constant.e-warning)**.




      8.3.0

       Ahora lanza un error [ValueError](#class.valueerror) o [TypeError](#class.typeerror)
       cuando el valor o el tipo del campo no coincide correctamente con un tipo PostgreSQL;
       anteriormente, se emitía un **[E_WARNING](#constant.e-warning)**.





8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_insert()**

&lt;?php
$db = pg_connect ('dbname=foo');
  // Esto es seguro en cierta medida, ya que todos los valores son escapados
  // Sin embargo, PostgreSQL soporta JSON/arrays. Estos no son
  // seguros ni por escape ni por consultas preparadas.
  $res = pg_insert($dbconn, 'post_log', $_POST, PGSQL_DML_ESCAPE);
  if ($res) {
echo "Los datos POSTeados han podido ser registrados con éxito.\n";
} else {
echo "Hay un problema con los datos.\n";
}
?&gt;

### Ver también

    - [pg_convert()](#function.pg-convert) - Convierte valores de un array asociativo a una forma adecuada para consultas SQL

# pg_last_error

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_last_error —
Lee el último mensaje de error en la conexión

### Descripción

**pg_last_error**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_last_error()** devuelve el último mensaje de error
para una conexión connection.

Los mensajes de error pueden ser sobrescritos por llamadas internas a la extensión
PostgreSQL (libpq): es posible que el mensaje devuelto no sea
apropiado, especialmente si han ocurrido múltiples errores en el módulo.

Utilícese [pg_result_error()](#function.pg-result-error),
[pg_result_error_field()](#function.pg-result-error-field),
[pg_result_status()](#function.pg-result-status) y
[pg_connection_status()](#function.pg-connection-status) para mejorar la gestión
de errores.

**Nota**:

    Anteriormente, esta función se llamaba **pg_errormessage()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Un [string](#language.types.string) que contiene el último mensaje de error en la conexión
connection.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_last_error()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Consulta que falla
$res = pg_query($dbconn, "select \* from doesnotexist");

echo pg_last_error($dbconn);
?&gt;

### Ver también

    - [pg_result_error()](#function.pg-result-error) - Lee el mensaje de error asociado a un resultado

    - [pg_result_error_field()](#function.pg-result-error-field) - Devuelve un campo individual de un informe de error

# pg_last_notice

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

pg_last_notice —
Devuelve la última nota del servidor PostgreSQL

### Descripción

**pg_last_notice**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $mode = **[PGSQL_NOTICE_LAST](#constant.pgsql-notice-last)**): [array](#language.types.array)|[string](#language.types.string)|[bool](#language.types.boolean)

**pg_last_notice()** devuelve la última nota del
servidor PostgreSQL en la conexión connection
especificada. El servidor PostgreSQL envía notas en varios casos,
por ejemplo al crear una columna SERIAL en
una tabla.

Con **pg_last_notice()**, se pueden evitar consultas
innecesarias verificando si las notas están o no relacionadas con
la transacción.

El seguimiento de las notas puede ser opcional estableciendo a 1
la directiva de configuración pgsql.ignore_notice del
archivo php.ini.

El registro de las notas puede ser opcional estableciendo la directiva
de configuración pgsql.log_notice del php.ini a 0.
A menos que pgsql.ignore_notice esté a 0, las notas
no serán registradas.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     mode


       Uno de **[PGSQL_NOTICE_LAST](#constant.pgsql-notice-last)** (para devolver la última nota),
       **[PGSQL_NOTICE_ALL](#constant.pgsql-notice-all)** (para devolver todas las notas),
       o **[PGSQL_NOTICE_CLEAR](#constant.pgsql-notice-clear)** (para borrar las notas).





### Valores devueltos

Un [string](#language.types.string) que contiene la última nota en la conexión
connection con
**[PGSQL_NOTICE_LAST](#constant.pgsql-notice-last)**,
un [array](#language.types.array) con **[PGSQL_NOTICE_ALL](#constant.pgsql-notice-all)**,
un [bool](#language.types.boolean) con **[PGSQL_NOTICE_CLEAR](#constant.pgsql-notice-clear)**.

### Historial de cambios

       Versión
       Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

       7.1.0

        Se añadió el parámetro mode.





### Ejemplos

    **Ejemplo #1 Ejemplo con pg_last_notice()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

$res = pg_query("CREATE TABLE test (id SERIAL)");

$notice = pg_last_notice($pgsql_conn);

echo $notice;
?&gt;

    El ejemplo anterior mostrará:

CREATE TABLE will create implicit sequence "test_id_seq" for "serial" column "test.id"

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_last_error()](#function.pg-last-error) - Lee el último mensaje de error en la conexión

# pg_last_oid

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_last_oid —
Devuelve el identificador de la última línea

### Descripción

**pg_last_oid**([PgSql\Result](#class.pgsql-result) $result): [string](#language.types.string)|[int](#language.types.integer)|[false](#language.types.singleton)

**pg_last_oid()** sirve para recuperar el OID
asignado a una línea insertada.

El campo OID se ha vuelto opcional desde PostgreSQL 7.2 y ya no estará
presente por defecto en PostgreSQL 8.1. Cuando
el campo OID no está presente en la tabla, el programador debe utilizar
[pg_result_status()](#function.pg-result-status) para verificar si la línea
ha sido correctamente insertada.

Para obtener el valor de un campo SERIAL en una línea
insertada, es necesario utilizar la función
CURRVAL de PostgreSQL nombrando la secuencia de la que se
requiere la última valor. Si el nombre de la secuencia es desconocido, la
función PostgreSQL 8.0 pg_get_serial_sequence es
necesaria.

PostgreSQL 8.1 tiene una función LASTVAL que devuelve el valor
de la secuencia más recientemente utilizada en la sesión. Esto permite evitar
nombrar la secuencia, la tabla o la columna.

**Nota**:

    Anteriormente, esta función se llamaba **pg_getlastoid()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

Un [int](#language.types.integer) o [string](#language.types.string) que contiene el OID asignado a la línea más reciente insertada en
la conexión connection especificada o **[false](#constant.false)** en caso
de error o de OID no disponible.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_last_oid()**

&lt;?php
// Conectar a la base de datos
pg_connect("dbname=mark host=localhost");

// Crear una tabla de ejemplo
pg_query("CREATE TABLE test (a INTEGER) WITH OIDS");

// Insertar algunos datos
$res = pg_query("INSERT INTO test VALUES (1)");

$oid = pg_last_oid($res);
?&gt;

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_result_status()](#function.pg-result-status) - Lee el estado del resultado

# pg_lo_close

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_close —
Cierra un objeto grande de PostgreSQL

### Descripción

**pg_lo_close**([PgSql\Lob](#class.pgsql-lob) $lob): [bool](#language.types.boolean)

**pg_lo_close()** cierra un objeto grande.

Para utilizar un objeto grande (lo), es necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_loclose()**.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_close()**

&lt;?php
$database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$oid = pg_lo_create($database);
echo "$oid\n";
   $handle = pg_lo_open($database, $oid, "w");
   echo "$handle\n";
pg_lo_write($handle, "datos de objeto grande");
   pg_lo_close($handle);
pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

    - [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

    - [pg_lo_import()](#function.pg-lo-import) - Importa un objeto grande desde un fichero

# pg_lo_create

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_create —
Crea un objeto de gran tamaño de PostgreSQL

### Descripción

**pg_lo_create**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [mixed](#language.types.mixed) $object_id = ?): [int](#language.types.integer)

**pg_lo_create**([mixed](#language.types.mixed) $object_id): [int](#language.types.integer)

**pg_lo_create()** crea un objeto de gran tamaño
y devuelve su OID. Los modos de acceso de PostgreSQL **[INV_READ](#constant.inv-read)**,
**[INV_WRITE](#constant.inv-write)** y **[INV_ARCHIVE](#constant.inv-archive)** no son
soportados: el objeto siempre puede ser creado con
permisos de lectura y escritura. El modo
**[INV_ARCHIVE](#constant.inv-archive)**
ha sido eliminado de las bases de datos PostgreSQL (versión 6.3 y posteriores).

Para utilizar un objeto de gran tamaño, es
necesario hacerlo dentro de una transacción.

En lugar de utilizar la interfaz de objetos de gran tamaño (que no tiene ningún control
de acceso y es engorroso de usar), se recomienda utilizar la columna de tipo
bytea de PostgreSQL y
[pg_escape_bytea()](#function.pg-escape-bytea).

**Nota**:

    Anteriormente, esta función se llamaba **pg_locreate()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     object_id


       Si se proporciona el argumento object_id, la función
       intentará crear un objeto grande con este identificador; de lo contrario, se asignará un identificador
       de objeto disponible por el servidor. Este argumento depende de una
       funcionalidad que apareció con PostgreSQL 8.1.





### Valores devueltos

Un objeto grande OID, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_create()**

&lt;?php
$database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$oid = pg_lo_create($database);
echo "$oid\n";
   $handle = pg_lo_open($database, $oid, "w");
   echo "$handle\n";
pg_lo_write($handle, "datos de objeto de gran tamaño");
   pg_lo_close($handle);
pg_query($database, "commit");
?&gt;

# pg_lo_export

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_export —
Exporta un objeto grande a un fichero

### Descripción

**pg_lo_export**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [int](#language.types.integer) $oid, [string](#language.types.string) $pathname): [bool](#language.types.boolean)

**pg_lo_export()** toma un objeto grande de la
base de datos PostgreSQL y guarda su contenido en un fichero local
en el sistema.

Para utilizar un objeto grande (lo), es
necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_loexport()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     oid


       El OID del objeto grande en la base de
       datos.






     pathname


       La ruta de acceso completa y el fichero en el que se escribirá
       el objeto grande en el sistema del cliente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_export()**

&lt;?php
$database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$oid = pg_lo_create($database);
$handle = pg_lo_open($database, $oid, "w");
   pg_lo_write($handle, "datos objeto grande");
pg_lo_close($handle);
   pg_lo_export($database, $oid, '/tmp/lob.dat');
   pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_import()](#function.pg-lo-import) - Importa un objeto grande desde un fichero

# pg_lo_import

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_import — Importa un objeto grande desde un fichero

### Descripción

**pg_lo_import**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $pathname, [mixed](#language.types.mixed) $object_id = ?): int|string|false

**pg_lo_import()** crea un nuevo objeto grande
en la base de datos usando un fichero en el sistema de ficheros como
fuente de datos.

Para usar la interfaz de objetos grandes, es necesario
encerrarla dentro de un bloque de transacción.

**Nota**:

    Esta función antes se llamaba **pg_loimport()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     pathname


       La ruta completa y nombre del fichero en el sistema de ficheros del cliente
       desde el cual leer los datos del objeto grande.






     object_id


       Si se proporciona un object_id, la función
       intentará crear un objeto grande con este ID, de lo contrario, el servidor
       asignará un ID de objeto libre. Este parámetro depende de funcionalidad que
       apareció por primera vez en PostgreSQL 8.1.





### Valores devueltos

El OID del objeto grande recién creado, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo de pg_lo_import()**

&lt;?php
$database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$oid = pg_lo_import($database, '/tmp/lob.dat');
pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_export()](#function.pg-lo-export) - Exporta un objeto grande a un fichero

    - [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

# pg_lo_open

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_open —
Abre un objeto de gran tamaño de PostgreSQL

### Descripción

**pg_lo_open**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $oid, [string](#language.types.string) $mode): [PgSql\Lob](#class.pgsql-lob)|[false](#language.types.singleton)

**pg_lo_open()** abre un objeto grande en la base de datos
y devuelve una instancia de [PgSql\Lob](#class.pgsql-lob) para que
pueda ser manipulado.

**Advertencia**

    No cerrar la conexión a la base de datos antes de cerrar la instancia [PgSql\Lob](#class.pgsql-lob).

Para utilizar un objeto de gran tamaño (lo), es
necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_loopen()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     oid


       El OID del objeto de gran tamaño en la base de
       datos.






     mode


       Puede ser "r" para solo lectura, "w" para solo escritura o "rw" para
       lectura y escritura.





### Valores devueltos

Una instancia [PgSql\Lob](#class.pgsql-lob), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PgSql\Lob](#class.pgsql-lob);
       anteriormente, se devolvía un [resource](#language.types.resource).





8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_open()**

&lt;?php
$database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$oid = pg_lo_create($database);
echo "$oid\n";
   $handle = pg_lo_open($database, $oid, "w");
   echo "$handle\n";
pg_lo_write($handle, "datos de objeto de gran tamaño");
   pg_lo_close($handle);
pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_close()](#function.pg-lo-close) - Cierra un objeto grande de PostgreSQL

    - [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

# pg_lo_read

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_read —
Lee un objeto de gran tamaño

### Descripción

**pg_lo_read**([PgSql\Lob](#class.pgsql-lob) $lob, [int](#language.types.integer) $length = 8192): [string](#language.types.string)|[false](#language.types.singleton)

**pg_lo_read()** lee como máximo length
bytes de un objeto de gran tamaño y devuelve los datos como un string.

Para utilizar un objeto de gran tamaño (lo), es necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_loread()**.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).





     length


       Un número máximo de bytes a devolver. Este argumento es opcional.





### Valores devueltos

Un string que contiene length bytes del objeto de gran tamaño o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_read()**

&lt;?php
$doc_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $doc_oid, "r");
   $data = pg_lo_read($handle, 50000);
pg_query($database, "commit");
echo $data;
?&gt;

### Ver también

    - [pg_lo_read_all()](#function.pg-lo-read-all) - Lee un objeto de gran tamaño en su totalidad

# pg_lo_read_all

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_read_all —
Lee un objeto de gran tamaño en su totalidad

### Descripción

**pg_lo_read_all**([PgSql\Lob](#class.pgsql-lob) $lob): [int](#language.types.integer)

**pg_lo_read_all()** lee un objeto de gran tamaño en
su totalidad y lo envía directamente al cliente, después de los
encabezados adecuados. Esta función está prevista
para transmitir sonidos o imágenes.

Para utilizar un objeto de gran tamaño (lo), es
necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_loreadall()**.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).




### Valores devueltos

Número de bytes leídos.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_read_all()**

&lt;?php
header('Content-type: image/jpeg');
$image_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $image_oid, "r");
   pg_lo_read_all($handle);
pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_read()](#function.pg-lo-read) - Lee un objeto de gran tamaño

# pg_lo_seek

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_seek —
Modifica la posición en un objeto de gran tamaño

### Descripción

**pg_lo_seek**([PgSql\Lob](#class.pgsql-lob) $lob, [int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_CUR](#constant.seek-cur)**): [bool](#language.types.boolean)

**pg_lo_seek()** modifica la posición del puntero en
la instancia [PgSql\Lob](#class.pgsql-lob).

Para utilizar un objeto de gran tamaño (lo), es
necesario hacerlo dentro de una transacción.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).





     offset


       El número de bytes de desplazamiento.






     whence


       Una de estas constantes **[PGSQL_SEEK_SET](#constant.pgsql-seek-set)** (posiciona a
       partir del inicio del objeto),
       **[PGSQL_SEEK_CUR](#constant.pgsql-seek-cur)** (posiciona a partir de la posición
       actual)
       o **[PGSQL_SEEK_END](#constant.pgsql-seek-end)** (posiciona a partir del final
       del objeto).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_seek()**

&lt;?php
$doc_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $doc_oid, "r");
   // Salta los primeros 50000 bytes
   pg_lo_seek($handle, 50000, PGSQL_SEEK_SET);
// Lee los siguientes 10000 bytes
$data = pg_lo_read($handle, 10000);
pg_query($database, "commit");
echo $data;
?&gt;

### Ver también

    - [pg_lo_tell()](#function.pg-lo-tell) - Devuelve la posición actual en un objeto grande de PostgreSQL

# pg_lo_tell

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_tell —
Devuelve la posición actual en un objeto grande de PostgreSQL

### Descripción

**pg_lo_tell**([PgSql\Lob](#class.pgsql-lob) $lob): [int](#language.types.integer)

**pg_lo_tell()** devuelve la posición actual (desde el
inicio) del puntero de lectura en el objeto grande large_object.

Para utilizar una interfaz con un objeto grande, es necesario incluirlo en un bloque de transacción.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).




### Valores devueltos

La posición actual del puntero (en número de bytes) desde el inicio del
objeto grande. Si hay un error, el valor devuelto será negativo.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_tell()**

&lt;?php
$doc_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $doc_oid, "r");
   // Salta los primeros 50000 bytes
   pg_lo_seek($handle, 50000, PGSQL_SEEK_SET);
// Se verifica cuántos bytes se han saltado
$offset = pg_lo_tell($handle);
echo "La posición del puntero es: $offset";
   pg_query($database, "commit");
?&gt;

    El ejemplo anterior mostrará:

La posición del puntero es: 50000

### Ver también

    - [pg_lo_seek()](#function.pg-lo-seek) - Modifica la posición en un objeto de gran tamaño

# pg_lo_truncate

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

pg_lo_truncate — Trunca un objeto grande

### Descripción

**pg_lo_truncate**([PgSql\Lob](#class.pgsql-lob) $lob, [int](#language.types.integer) $size): [bool](#language.types.boolean)

**pg_lo_truncate()** trunca una instancia [PgSql\Lob](#class.pgsql-lob).

Para utilizar la interfaz de objetos grandes, es necesario
encerrarla en un bloqueo de transacción.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).





     size


       El número de bytes a truncar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_truncate()**

&lt;?php
$doc_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $doc_oid, "r");
   // Trunca a 0
   pg_lo_truncate($handle, 0);
pg_query($database, "commit");
echo $data;
?&gt;

### Ver también

    - [pg_lo_tell()](#function.pg-lo-tell) - Devuelve la posición actual en un objeto grande de PostgreSQL

# pg_lo_unlink

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_unlink —
Elimina un objeto grande de PostgreSQL

### Descripción

**pg_lo_unlink**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $oid): [bool](#language.types.boolean)

**pg_lo_unlink()** elimina el objeto grande cuyo identificador es oid, para la conexión connection.
Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Para utilizar un objeto grande (lo), es necesario hacerlo dentro de una transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_lounlink()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     oid


       El OID del objeto grande en la base de datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_unlink()**

&lt;?php
// OID del objeto grande a eliminar
$doc_oid = 189762345;
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
pg_lo_unlink($database, $doc_oid);
   pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

    - [pg_lo_import()](#function.pg-lo-import) - Importa un objeto grande desde un fichero

# pg_lo_write

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_lo_write — Escribe un objeto de gran tamaño de PostgreSQL

### Descripción

**pg_lo_write**([PgSql\Lob](#class.pgsql-lob) $lob, [string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**pg_lo_write()** escribe datos dentro de un objeto de gran tamaño en la posición actual.

Para manipular un objeto de gran tamaño (lo), es necesario colocar las operaciones dentro de un bloque de transacción.

**Nota**:

    Anteriormente, esta función se llamaba **pg_lowrite()**.

### Parámetros

     lob

      Una instancia [PgSql\Lob](#class.pgsql-lob), devuelta por [pg_lo_open()](#function.pg-lo-open).





     data


       Los datos a ser escritos en el objeto de gran tamaño. Si length es un [int](#language.types.integer) y es inferior al tamaño de data, solo los primeros length bytes serán escritos.






     length


       Un número máximo de bytes a escribir. Debe ser superior a cero y menor al tamaño de data. Este argumento es opcional; si se omite, tomará por defecto el tamaño de data.





### Valores devueltos

El número de bytes escritos en el objeto de gran tamaño o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro lob ahora espera una instancia de
[PgSql\Lob](#class.pgsql-lob) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection es ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_lo_write()**

&lt;?php
$doc_oid = 189762345;
   $data = "Esto sobrescribirá el inicio del objeto de gran tamaño.";
   $database = pg_connect("dbname=jacarta");
   pg_query($database, "begin");
$handle = pg_lo_open($database, $doc_oid, "w");
   $data = pg_lo_write($handle, $data);
   pg_query($database, "commit");
?&gt;

### Ver también

    - [pg_lo_create()](#function.pg-lo-create) - Crea un objeto de gran tamaño de PostgreSQL

    - [pg_lo_open()](#function.pg-lo-open) - Abre un objeto de gran tamaño de PostgreSQL

# pg_meta_data

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_meta_data —
Lee los metadatos de la tabla PostgreSQL

### Descripción

**pg_meta_data**([PgSql\Connection](#class.pgsql-connection) $connection, [string](#language.types.string) $table_name, [bool](#language.types.boolean) $extended = **[false](#constant.false)**): [array](#language.types.array)|[false](#language.types.singleton)

**pg_meta_data()** devuelve la definición de la tabla
table_name en forma de array.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       El nombre de la tabla.






     extended


       Flag para devolver los metadatos extendidos. Por omisión,
       vale **[false](#constant.false)**.





### Valores devueltos

Un [array](#language.types.array) de la definición de la tabla, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Recuperación de los metadatos de una tabla**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

$meta = pg_meta_data($dbconn,'auteurs');
if (is_array ($meta)) {
       echo '&lt;pre&gt;';
       var_dump ($meta);
echo '&lt;/pre&gt;';
}
?&gt;

    El ejemplo anterior mostrará:

array(3) {
["auteur"]=&gt;
array(5) {
["num"]=&gt;
int(1)
["type"]=&gt;
string(7) "varchar"
["len"]=&gt;
int(-1)
["not null"]=&gt;
bool(false)
["has default"]=&gt;
bool(false)
}
["annee"]=&gt;
array(5) {
["num"]=&gt;
int(2)
["type"]=&gt;
string(4) "int2"
["len"]=&gt;
int(2)
["not null"]=&gt;
bool(false)
["has default"]=&gt;
bool(false)
}
["titre"]=&gt;
array(5) {
["num"]=&gt;
int(3)
["type"]=&gt;
string(7) "varchar"
["len"]=&gt;
int(-1)
["not null"]=&gt;
bool(false)
["has default"]=&gt;
bool(false)
}
}

### Ver también

    - [pg_convert()](#function.pg-convert) - Convierte valores de un array asociativo a una forma adecuada para consultas SQL

# pg_num_fields

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_num_fields —
Devuelve el número de campos

### Descripción

**pg_num_fields**([PgSql\Result](#class.pgsql-result) $result): [int](#language.types.integer)

**pg_num_fields()** devuelve el número de campos
(o columnas) de una instancia [PgSql\Result](#class.pgsql-result).

**Nota**:

    Anteriormente, esta función se llamaba **pg_numfields()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

El número de campos (o columnas) en el conjunto de resultados. En caso de error,
se devuelve -1.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_num_fields()**

&lt;?php
$result = pg_query($conn, "SELECT 1, 2");

$num = pg_num_fields($result);

echo $num . " campo(s) devuelto(s).\n";
?&gt;

    El ejemplo anterior mostrará:

2 campo(s) devuelto(s).

### Ver también

    - [pg_num_rows()](#function.pg-num-rows) - Devuelve el número de filas de PostgreSQL

    - [pg_affected_rows()](#function.pg-affected-rows) - Devuelve el número de filas afectadas

# pg_num_rows

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_num_rows —
Devuelve el número de filas de PostgreSQL

### Descripción

**pg_num_rows**([PgSql\Result](#class.pgsql-result) $result): [int](#language.types.integer)

**pg_num_rows()** devuelve el número de filas
de una instancia [PgSql\Result](#class.pgsql-result).

**Nota**:

    Anteriormente, esta función se llamaba **pg_numrows()**.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

El número de filas en el conjunto de resultados. En caso de error,
se devuelve -1.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_num_rows()**

&lt;?php
$result = pg_query($conn, "SELECT 1");

$rows = pg_num_rows($result);

echo $rows . " línea(s) devuelta(s).\n";
?&gt;

    El ejemplo anterior mostrará:

1 línea(s) devuelta(s).

### Ver también

    - [pg_num_fields()](#function.pg-num-fields) - Devuelve el número de campos

    - [pg_affected_rows()](#function.pg-affected-rows) - Devuelve el número de filas afectadas

# pg_options

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_options —
Devuelve las opciones de PostgreSQL

### Descripción

**pg_options**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_options()** devuelve un string que contiene
las opciones de la conexión PostgreSQL connection.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Un string que contiene las opciones de connection.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_options()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");
   echo pg_options($pgsql_conn);
?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

# pg_parameter_status

(PHP 5, PHP 7, PHP 8)

pg_parameter_status —
Consulta un parámetro de configuración actual del servidor

### Descripción

**pg_parameter_status**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $param_name): [string](#language.types.string)

Consulta un parámetro de configuración actual del servidor.

Ciertos valores de parámetros son devueltos por el servidor automáticamente al inicio de la conexión o cuando un valor cambia. **pg_parameter_status()** puede ser utilizada para consultar estas configuraciones. La función devuelve el valor actual del parámetro si es conocido o **[false](#constant.false)** si el parámetro es desconocido.

Los parámetros devueltos por PostgreSQL 8.0 son server_version, server_encoding, client_encoding, is_superuser, session_authorization, DateStyle, TimeZone y integer_datetimes. (server_encoding, TimeZone y integer_datetimes no eran devueltos en versiones anteriores a 8.0.) Tenga en cuenta que server_version, server_encoding y integer_datetimes no pueden cambiar después del inicio de PostgreSQL.

Los servidores PostgreSQL 7.3 o versiones inferiores no devuelven parámetros de configuración, **pg_parameter_status()** incluye una lógica para obtener valores para server_version y client_encoding de todos modos. Las aplicaciones deberían utilizar **pg_parameter_status()** en lugar de código ad hoc para determinar estos valores.

**Precaución**

    En versiones de servidores PostgreSQL 7.4 y anteriores, el cambio de client_encoding con SET después del inicio de la conexión no será reflejado por **pg_parameter_status()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     param_name


       Los valores posibles de param_name son server_version, server_encoding, client_encoding, is_superuser, session_authorization, DateStyle, TimeZone y integer_datetimes. Cabe señalar que este valor es sensible a mayúsculas y minúsculas.





### Valores devueltos

Una cadena que contiene el valor del parámetro, **[false](#constant.false)** en caso de fallo o si el parámetro param_name es inválido.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_parameter_status()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

echo "Codificación del servidor: ", pg_parameter_status($dbconn, "server_encoding");
?&gt;

    El ejemplo anterior mostrará:

Codificación del servidor: SQL_ASCII

# pg_pconnect

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_pconnect —
Establece una conexión PostgreSQL persistente

### Descripción

**pg_pconnect**([string](#language.types.string) $connection_string, [int](#language.types.integer) $flags = 0): [PgSql\Connection](#class.pgsql-connection)|[false](#language.types.singleton)

**pg_pconnect()** devuelve una instancia [PgSql\Connection](#class.pgsql-connection)
de conexión persistente.

Si se realiza una segunda llamada a **pg_pconnect()** con el mismo
connection_string como una conexión
existente, se devolverá la conexión existente a menos que se pase
**[PGSQL_CONNECT_FORCE_NEW](#constant.pgsql-connect-force-new)** a
flags.

Para activar las conexiones persistentes, la directiva de configuración
[**pgsql.allow_persistent**](#ini.pgsql.allow-persistent)
del php.ini debe establecerse en On (que es su valor por omisión).
El número máximo de conexiones puede limitarse mediante
la directiva de configuración
[**pgsql.max_persistent**](#ini.pgsql.max-persistent)
en el archivo php.ini (por omisión, su valor es -1, es decir, sin límite).
El número total de conexiones puede configurarse con la directiva
[**pgsql.max_links**](#ini.pgsql.max-links) del archivo
php.ini.

[pg_close()](#function.pg-close) no cerrará las conexiones persistentes
generadas por **pg_pconnect()**.

### Parámetros

     connection_string


       La cadena connection_string puede estar vacía para
       utilizar todos los parámetros por omisión o puede contener uno o
       varios parámetros de configuración separados por espacios.
       Cada parámetro de configuración tiene la forma code =
       valor. Los espacios alrededor del signo igual son opcionales.
       Para escribir un valor vacío o un valor que contenga espacios,
       rodee este valor con comillas simples, por ejemplo: code =
       'un valor'. Las comillas simples y las barras invertidas dentro
       del valor deben escaparse con una barra invertida, es decir
       \' y \\.




       Las palabras clave actualmente reconocidas son :
       host, hostaddr,
       port,
       dbname, user,
       password,
       connect_timeout,
       options, tty (ignorado),
       sslmode,
       requiressl (obsoleto, utilice
       sslmode) y
       service.
       La lista de estos argumentos depende de la versión del servidor PostgreSQL.






     flags


       Si **[PGSQL_CONNECT_FORCE_NEW](#constant.pgsql-connect-force-new)** se pasa como argumento,
       entonces se creará una nueva conexión, incluso si la cadena
       connection_string es idéntica a la de la conexión existente.





### Valores devueltos

Devuelve una instancia de [PgSql\Connection](#class.pgsql-connection) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora devuelve una instancia de [PgSql\Connection](#class.pgsql-connection) ;
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_pconnect()**

&lt;?php
// conexión a una base de datos llamada "marie"
$dbconn = pg_pconnect("dbname=marie");

// conexión a una base de datos llamada "marie" en el host "localhost" en el puerto "5432"
$dbconn2 = pg_pconnect("host=localhost port=5432 dbname=marie");

// conexión a una base de datos llamada "marie" en el host "mouton" con un
// nombre de usuario y una contraseña
$dk

// conexión a una base de datos llamada "test" en el host "mouton" con un
// nombre de usuario y una contraseña
$conn_string = "host=mouton port=5432 dbname=test user=agneau password=bar";
$dbconn4 = pg_pconnect($conn_string);
?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

    -
     [
     Conexiones Persistentes](#features.persistent-connections)

# pg_ping

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_ping —
Ping la conexión a la base de datos

### Descripción

**pg_ping**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [bool](#language.types.boolean)

**pg_ping()** realiza un ping a la conexión a la base de datos
y intenta reconectarse si la conexión se ha perdido.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_ping()**

&lt;?php
$conn = pg_pconnect ("dbname=publisher");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

if (!pg_ping($conn))
die("La conexión se ha perdido\n");
?&gt;

### Ver también

    - [pg_connection_status()](#function.pg-connection-status) - Se lee el estado de la conexión PostgreSQL

    - [pg_connection_reset()](#function.pg-connection-reset) - Reinicia la conexión al servidor PostgreSQL

# pg_port

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_port —
Devuelve el número de puerto

### Descripción

**pg_port**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_port()** devuelve el número de puerto de
la conexión dada por connection.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Un [string](#language.types.string) que contiene el número de puerto del servidor de base de datos
identificado por connection o una cadena vacía en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_port()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

if ($pgsql_conn) {
   print "Conectado correctamente al puerto : " . pg_port($pgsql_conn) . "&lt;br/&gt;\n";
} else {
print pg_last_error($pgsql_conn);
exit;
}
?&gt;

# pg_prepare

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_prepare —
Envía una solicitud al servidor para crear una sentencia preparada con los parámetros
dados y espera la ejecución

### Descripción

**pg_prepare**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $stmtname, [string](#language.types.string) $query): [PgSql\Result](#class.pgsql-result)|[false](#language.types.singleton)

**pg_prepare()** crea una consulta preparada para una
ejecución posterior con [pg_execute()](#function.pg-execute) o
[pg_send_execute()](#function.pg-send-execute).
Esta característica permite que las órdenes que serán utilizadas
repetidamente sean analizadas y planificadas una sola vez,
en lugar de ser ejecutadas cada vez.
**pg_prepare()** es soportada solo con las versiones
PostgreSQL 7.4 o más recientes; la orden fallará si se utiliza
con versiones anteriores.

La función crea una consulta preparada llamada
stmtname a partir de la cadena
query, la cual debe contener una sola orden
SQL. stmtname puede ser "" para crear una
consulta sin nombre. En este caso, las consultas que existían y
que no tenían nombres son automáticamente sobrescritas; de lo contrario, habrá un error si el nombre de la consulta ya está definido en la sesión actual. Si se utilizan parámetros, estos son referenciados como $1,
$2, etc.
en query.

Las consultas preparadas para ser utilizadas con **pg_prepare()**
también pueden ser creadas ejecutando la orden SQL
PREPARE. (Sin embargo, **pg_prepare()**
es más flexible ya que no requiere que los tipos de los parámetros
sean preespecificados.) Además, aunque no existe una función PHP para
eliminar una consulta preparada, la orden SQL
DEALLOCATE puede ser utilizada para este propósito.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     stmtname


       El nombre a dar a la consulta preparada. Debe ser único para cada
       sesión. Si se especifica una cadena vacía "" entonces se crea una consulta sin
       nombre, sobrescribiendo las consultas sin nombres previamente definidas.






     query


       La consulta SQL con sus parámetros. Debe contener solo una sola
       consulta. Varios comandos separados por punto y coma no son
       permitidos. Si se utilizan parámetros, estos son referenciados como
       $1, $2, etc.





### Valores devueltos

Una instancia [PgSql\Result](#class.pgsql-result) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_prepare()**

&lt;?php
// Conexión a una base de datos llamada "marie"
$dbconn = pg_connect("dbname=marie");

// Prepara una consulta para la ejecución
$result = pg_prepare($dbconn, "my_query", 'SELECT \* FROM magasins WHERE nom = $1');

// Ejecuta la consulta preparada. Note que no es necesario escapar
// la cadena "Joe's Widgets"
$result = pg_execute($dbconn, "my_query", array("Joe's Widgets"));

// Ejecuta la misma consulta preparada, esta vez con un parámetro diferente
$result = pg_execute($dbconn, "my_query", array("Vêtements Vêtements Vêtements"));

?&gt;

### Ver también

    - [pg_execute()](#function.pg-execute) - Ejecuta una consulta preparada de PostgreSQL

    - [pg_send_execute()](#function.pg-send-execute) - Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s)

# pg_put_line

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

pg_put_line —
Envía una string al servidor PostgreSQL

### Descripción

**pg_put_line**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $data): [bool](#language.types.boolean)

**pg_put_line()** envía una string (terminada
por **[null](#constant.null)**) al servidor PostgreSQL. Esto es necesario en conjunción con
un comando COPY FROM de PostgreSQL.

COPY es una carga muy rápida de datos
soportada por PostgreSQL. Los datos se pasan sin ser analizados y
en una simple transacción.

Una alternativa en lugar de usar el comando bruto
**pg_put_line()** es usar
[pg_copy_from()](#function.pg-copy-from). Es una interfaz mucho más simple.

**Nota**:

    Tenga en cuenta que la aplicación debe agregar explícitamente los dos caracteres
    "\." al final de la string para indicar al servidor que ha terminado
    de enviar datos, antes de llamar a [pg_end_copy()](#function.pg-end-copy).

**Advertencia**

    El uso de **pg_put_line()** hace que fallen la mayoría de los
    objetos de gran tamaño, incluyendo [pg_lo_read()](#function.pg-lo-read)
    y [pg_lo_tell()](#function.pg-lo-tell). Puede usar
    [pg_copy_from()](#function.pg-copy-from) y [pg_copy_to()](#function.pg-copy-to) en su lugar.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     data


       Una línea de texto para enviar directamente al servidor PostgreSQL. Un
       carácter de finalización **[null](#constant.null)** se agrega automáticamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_put_line()**

&lt;?php
$conn = pg_pconnect("dbname=foo");
  pg_query($conn, "create table bar (a int4, b char(16), d float8)");
pg_query($conn, "copy bar from stdin");
  pg_put_line($conn, "3\tBonjour le monde\t4.5\n");
pg_put_line($conn, "4\tAurevoir le monde\t7.11\n");
  pg_put_line($conn, "\\.\n");
pg_end_copy($conn);
?&gt;

### Ver también

    - [pg_end_copy()](#function.pg-end-copy) - Sincroniza con el servidor PostgreSQL

# pg_query

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_query —
Ejecuta una consulta PostgreSQL

### Descripción

**pg_query**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $query): [PgSql\Result](#class.pgsql-result)|[false](#language.types.singleton)

**pg_query()** ejecuta la consulta
query en la base de datos especificada
connection.
[pg_query_params()](#function.pg-query-params) debe preferirse en la
mayoría de los casos.

Si ocurre un error y se devuelve **[false](#constant.false)**, los detalles del error
pueden recuperarse utilizando la función
[pg_last_error()](#function.pg-last-error) si la conexión es válida.

**Nota**:

     Aunque connection puede omitirse, no se
     recomienda hacerlo, ya que puede resultar difícil
     encontrar errores en los scripts.

**Nota**:

    Anteriormente, esta función se llamaba **pg_exec()**.
    **pg_exec()** sigue disponible por razones de
    compatibilidad, pero se recomienda a los usuarios utilizar el nuevo nombre.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     query


       La consulta o consultas SQL a ejecutarse. Cuando se pasan varias
       consultas a la función, se ejecutan automáticamente como una transacción,
       a menos que se incluyan los comandos BEGIN/COMMIT en la consulta. Sin embargo,
       no se recomienda el uso de múltiples transacciones en una sola llamada de función.



      **Advertencia**

        La interpolación de strings proporcionados por el usuario
        es extremadamente peligrosa y debe tenerse en cuenta el conjunto
        de vulnerabilidades relacionadas con las
        [inyecciones SQL](#security.database.sql-injection).
        En la mayoría de los casos, debe preferirse la función [pg_query_params()](#function.pg-query-params);
        es preferible pasar los valores proporcionados por el usuario como argumentos,
        en lugar de sustituirlos en la consulta.




        Todos los datos de usuario sustituidos directamente en el string
        de la consulta deben ser
        [propiamente escapados](#function.pg-escape-string).






### Valores devueltos

Una instancia [PgSql\Result](#class.pgsql-result) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_query()**

&lt;?php

$conn = pg_pconnect("dbname=publisher");
if (!$conn) {
echo "Ocurrió un error.\n";
exit;
}

$result = pg_query($conn, "SELECT autor, email FROM autores");
if (!$result) {
echo "Ocurrió un error.\n";
exit;
}

while ($row = pg_fetch_row($result)) {
echo "Autor: $row[0] E-mail: $row[1]";
echo "&lt;br /&gt;\n";
}

?&gt;

    **Ejemplo #2 Uso de pg_query()** con múltiples consultas

&lt;?php

$conn = pg_pconnect("dbname=publisher");

// estas consultas se ejecutarán como una sola transacción

$query = "UPDATE authors SET author=UPPER(author) WHERE id=1;";
$query .= "UPDATE authors SET author=LOWER(author) WHERE id=2;";
$query .= "UPDATE authors SET author=NULL WHERE id=3;";

pg_query($conn, $query);

?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

    - [pg_pconnect()](#function.pg-pconnect) - Establece una conexión PostgreSQL persistente

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_num_rows()](#function.pg-num-rows) - Devuelve el número de filas de PostgreSQL

    - [pg_affected_rows()](#function.pg-affected-rows) - Devuelve el número de filas afectadas

# pg_query_params

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_query_params —
Envía un comando al servidor y espera el resultado, con la capacidad de
pasar parámetros por separado del texto SQL de la consulta

### Descripción

**pg_query_params**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $query, [array](#language.types.array) $params): [PgSql\Result](#class.pgsql-result)|[false](#language.types.singleton)

Envía un comando al servidor y espera el resultado, con la capacidad de
pasar parámetros por separado del texto SQL de la consulta.

**pg_query_params()** es como [pg_query()](#function.pg-query),
pero ofrece funcionalidades adicionales: los valores de los parámetros
pueden especificarse por separado de la línea de comando propia.
**pg_query_params()** es soportada solo con versiones
PostgreSQL 7.4 o posteriores; el comando fallará si se utiliza
con versiones anteriores.

Si se utilizan parámetros, se refieren a $1, $2, etc. en
query. El mismo parámetro puede aparecer más de una vez
en la consulta query; se utilizará el mismo valor
en ese caso. params especifica los
valores actuales de los parámetros. Un valor **[null](#constant.null)** en este array
significa que el parámetro correspondiente es SQL **[null](#constant.null)**.

La principal ventaja de **pg_query_params()** sobre
[pg_query()](#function.pg-query) es que los valores de los parámetros pueden
separarse de la consulta query, por lo tanto,
se evitan los escapes de caracteres tediosos y propensos a errores.
A diferencia de [pg_query()](#function.pg-query),
**pg_query_params()** permite solo un comando
SQL en la cadena dada. (Puede haber puntos y coma en
el interior pero no más de un comando.)

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     query


       La consulta SQL con sus parámetros. Debe contener solo una
       consulta. Múltiples consultas separadas por puntos y coma no están
       permitidas. Si se utilizan parámetros, se refieren a
       $1, $2, etc.




       Los valores proporcionados por el usuario siempre deben
       pasarse como parámetros, y no interpolados en la cadena de
       consulta, donde pueden potencialmente formar
       [inyecciones SQL](#security.database.sql-injection)
       e introducir errores cuando estos datos contienen comillas.
       Si por alguna razón no se pueden utilizar parámetros,
       asegúrese de que los valores interpolados estén
       [correctamente escapados](#function.pg-escape-string).






     params


       Un array de valores de parámetros para sustituir las variables $1, $2, etc.
       en la consulta preparada original. El número de elementos presentes en
       el array debe coincidir con el número de variables a reemplazar.




       Los valores esperados para los campos bytea no son
       soportados como parámetros. Utilice en su lugar la función
       [pg_escape_bytea()](#function.pg-escape-bytea) o utilice las funciones sobre los
       objetos grandes.





### Valores devueltos

Una instancia [PgSql\Result](#class.pgsql-result) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

Ahora devuelve una instancia de [PgSql\Result](#class.pgsql-result) ;
anteriormente, se devolvía un [resource](#language.types.resource).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_query_params()**

&lt;?php
// Conexión a una base de datos llamada "marie"
$dbconn = pg_connect("dbname=marie");

// Busca todas las tiendas llamadas Joe's Widgets. Note que no es
// necesario escapar la cadena "Joe's Widgets"
$result = pg_query_params($dbconn, 'SELECT \* FROM tiendas WHERE nombre = $1', array("Joe's Widgets"));

// Comparación usando pg_query
$str = pg_escape_string("Joe's Widgets");
$result = pg_query($dbconn, "SELECT * FROM tiendas WHERE nombre = '{$str}'");

?&gt;

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

# pg_result_error

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_result_error —
Lee el mensaje de error asociado a un resultado

### Descripción

**pg_result_error**([PgSql\Result](#class.pgsql-result) $result): [string](#language.types.string)|[false](#language.types.singleton)

**pg_result_error()** devuelve el mensaje
de error asociado al resultado result. Por
consiguiente, es probable que se obtenga un mensaje
de error más apropiado que mediante [pg_last_error()](#function.pg-last-error).

La función [pg_result_error_field()](#function.pg-result-error-field) puede proporcionar
muchos más detalles sobre los errores que **pg_result_error()**.

Dado que [pg_query()](#function.pg-query) devuelve **[false](#constant.false)** si la consulta falla,
se debe utilizar [pg_send_query()](#function.pg-send-query) y
[pg_get_result()](#function.pg-get-result) para recuperar el recurso de resultado.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

Devuelve un [string](#language.types.string). Devuelve una cadena vacía si no hay ningún error.
Si hay un error asociado con el parámetro
result, se devolverá **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_result_error()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select \* from nexistepas;");
}

$res1 = pg_get_result($dbconn);
echo pg_result_error($res1);
?&gt;

### Ver también

    - [pg_result_error_field()](#function.pg-result-error-field) - Devuelve un campo individual de un informe de error

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_send_query()](#function.pg-send-query) - Ejecuta una consulta PostgreSQL asíncrona

    - [pg_get_result()](#function.pg-get-result) - Lee un resultado asíncrono de PostgreSQL

    - [pg_last_error()](#function.pg-last-error) - Lee el último mensaje de error en la conexión

    - [pg_last_notice()](#function.pg-last-notice) - Devuelve la última nota del servidor PostgreSQL

# pg_result_error_field

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_result_error_field —
Devuelve un campo individual de un informe de error

### Descripción

**pg_result_error_field**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $field_code): [string](#language.types.string)|[false](#language.types.singleton)|[null](#language.types.null)

**pg_result_error_field()** devuelve uno de los campos detallados
del mensaje de error asociados al recurso
result. Esta función está disponible solo en
servidores PostgreSQL 7.4 o superiores. El campo de error se especifica
mediante field_code.

Dado que [pg_query()](#function.pg-query) y
[pg_query_params()](#function.pg-query-params) devuelven **[false](#constant.false)** si la consulta falla,
se debe utilizar [pg_send_query()](#function.pg-send-query) y
[pg_get_result()](#function.pg-get-result) para obtener el conjunto de resultados.

Si se necesita obtener más información sobre el error al fallar las consultas con [pg_query()](#function.pg-query), se debe
utilizar [pg_set_error_verbosity()](#function.pg-set-error-verbosity) y
[pg_last_error()](#function.pg-last-error) y analizar posteriormente el resultado.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     field_code


         Los valores posibles de field_code son:
         **[PGSQL_DIAG_SEVERITY](#constant.pgsql-diag-severity)**,
         **[PGSQL_DIAG_SQLSTATE](#constant.pgsql-diag-sqlstate)**, **[PGSQL_DIAG_MESSAGE_PRIMARY](#constant.pgsql-diag-message-primary)**,
         **[PGSQL_DIAG_MESSAGE_DETAIL](#constant.pgsql-diag-message-detail)**,
         **[PGSQL_DIAG_MESSAGE_HINT](#constant.pgsql-diag-message-hint)**, **[PGSQL_DIAG_STATEMENT_POSITION](#constant.pgsql-diag-statement-position)**,
         **[PGSQL_DIAG_INTERNAL_POSITION](#constant.pgsql-diag-internal-position)** (solo PostgreSQL 8.0+),
         **[PGSQL_DIAG_INTERNAL_QUERY](#constant.pgsql-diag-internal-query)** (solo PostgreSQL 8.0+),
         **[PGSQL_DIAG_CONTEXT](#constant.pgsql-diag-context)**, **[PGSQL_DIAG_SOURCE_FILE](#constant.pgsql-diag-source-file)**,
         **[PGSQL_DIAG_SOURCE_LINE](#constant.pgsql-diag-source-line)** o
         **[PGSQL_DIAG_SOURCE_FUNCTION](#constant.pgsql-diag-source-function)**.





### Valores devueltos

Devuelve una cadena que contiene el contenido del campo de error, **[null](#constant.null)** si
el campo no existe o **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_result_error_field()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select \* from nexistepas;");
}

$res1 = pg_get_result($dbconn);
echo pg_result_error_field($res1, PGSQL_DIAG_SQLSTATE);
?&gt;

### Ver también

    - [pg_result_error()](#function.pg-result-error) - Lee el mensaje de error asociado a un resultado

# pg_result_memory_size

(PHP 8 &gt;= 8.4.0)

pg_result_memory_size — Devuelve la cantidad de memoria asignada para un resultado de consulta

### Descripción

**pg_result_memory_size**([PgSql\Result](#class.pgsql-result) $result): [int](#language.types.integer)

Devuelve la cantidad de memoria, en bytes, asignada para la instancia de
[PgSql\Result](#class.pgsql-result) especificada.
Este valor es el mismo que el que sería liberado por [pg_free_result()](#function.pg-free-result).

### Parámetros

    result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

### Valores devueltos

Devuelve la cantidad de memoria en bytes.

### Ejemplos

**Ejemplo #1 Ejemplo de pg_result_memory_size()**

&lt;?php
$db = pg_connect("dbname=users user=me");

$res = pg_query($db, 'SELECT 1');

$size = pg_result_memory_size($res);

var_dump($size);
?&gt;

Resultado del ejemplo anterior es similar a:

int(3288)

### Ver también

- [pg_free_result()](#function.pg-free-result) - Libera la memoria

# pg_result_seek

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_result_seek — Establece la posición de la línea en un resultado

### Descripción

**pg_result_seek**([resource](#language.types.resource) $result, [int](#language.types.integer) $row): [bool](#language.types.boolean)

**pg_result_seek()** selecciona la línea
offset como línea actual en el
resultado result.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     row


       Línea a la que se moverá la posición interna en el conjunto de resultados
       result. Las líneas están numeradas a partir de
       cero.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_result_seek()**

&lt;?php

// Conexión a la base de datos
$conn = pg_pconnect("dbname=publisher");

// Ejecución de la consulta
$result = pg_query($conn, "SELECT autor, email FROM autores");

// Desplazamiento a la tercera línea (se asume que hay 3 líneas)
pg_result_seek($result, 2);

// Obtención de la tercera línea
$row = pg_fetch_row($result);

?&gt;

### Ver también

    - [pg_fetch_row()](#function.pg-fetch-row) - Lee una fila en un array

    - [pg_fetch_assoc()](#function.pg-fetch-assoc) - Lee una fila de resultado PostgreSQL como un array asociativo

    - [pg_fetch_array()](#function.pg-fetch-array) - Lee una línea de resultado PostgreSQL en un array

    - [pg_fetch_object()](#function.pg-fetch-object) - Lee una fila de resultado PostgreSQL en un objeto

    - [pg_fetch_result()](#function.pg-fetch-result) - Devuelve los valores de un resultado

# pg_result_status

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_result_status — Lee el estado del resultado

### Descripción

**pg_result_status**([PgSql\Result](#class.pgsql-result) $result, [int](#language.types.integer) $mode = **[PGSQL_STATUS_LONG](#constant.pgsql-status-long)**): [string](#language.types.string)|[int](#language.types.integer)

**pg_result_status()** devuelve el estado del resultado
result o el comando de ejecución de PostgreSQL
asociado al resultado.

### Parámetros

     result



Una instancia [PgSql\Result](#class.pgsql-result), devuelta por [pg_query()](#function.pg-query),
[pg_query_params()](#function.pg-query-params), o [pg_execute()](#function.pg-execute) (entre otros).

     mode


       Puede ser **[PGSQL_STATUS_LONG](#constant.pgsql-status-long)** para devolver un estado
       numérico de result o
       **[PGSQL_STATUS_STRING](#constant.pgsql-status-string)** para devolver la etiqueta del
       comando de result. Si el argumento no se
       especifica, **[PGSQL_STATUS_LONG](#constant.pgsql-status-long)** es el valor por omisión.





### Valores devueltos

Los valores de retorno posibles son **[PGSQL_EMPTY_QUERY](#constant.pgsql-empty-query)**,
**[PGSQL_COMMAND_OK](#constant.pgsql-command-ok)**, **[PGSQL_TUPLES_OK](#constant.pgsql-tuples-ok)**,
**[PGSQL_TUPLES_CHUNK](#constant.pgsql-tuples-chunk)**, **[PGSQL_COPY_OUT](#constant.pgsql-copy-out)**,
**[PGSQL_COPY_IN](#constant.pgsql-copy-in)**, **[PGSQL_BAD_RESPONSE](#constant.pgsql-bad-response)**,
**[PGSQL_NONFATAL_ERROR](#constant.pgsql-nonfatal-error)** y **[PGSQL_FATAL_ERROR](#constant.pgsql-fatal-error)**
si **[PGSQL_STATUS_LONG](#constant.pgsql-status-long)** se
especifica. De lo contrario, se devuelve un string que contiene la etiqueta del comando PostgreSQL.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro result ahora espera una instancia de
[PgSql\Result](#class.pgsql-result) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_result_status()**

&lt;?php

// Conexión a la base de datos
$conn = pg_pconnect("dbname=publisher");

// Ejecución de COPY
$result = pg_query($conn, "COPY autores FROM STDIN;");

// Obtención del estado
$status = pg_result_status($result);

// Determinación del estado
if ($status == PGSQL_COPY_IN)
echo "La copia se ha realizado.";
else
echo "La copia ha fallado.";

?&gt;

    El ejemplo anterior mostrará:

La copia se ha realizado.

### Ver también

    - [pg_connection_status()](#function.pg-connection-status) - Se lee el estado de la conexión PostgreSQL

# pg_select

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_select —
Realiza una selección PostgreSQL

### Descripción

**pg_select**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $conditions = [],
    [int](#language.types.integer) $flags = **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**,
    [int](#language.types.integer) $mode = **[PGSQL_ASSOC](#constant.pgsql-assoc)**
): [array](#language.types.array)|[string](#language.types.string)|[false](#language.types.singleton)

**pg_select()** selecciona los registros por
conditions que está en formato
campo=&gt;valor. Cuando la consulta tiene éxito,
devuelve un array que contiene todos los registros y campos que
cumplen la condición especificada por conditions.

Si flags está especificado,
[pg_convert()](#function.pg-convert) se aplica a
values con los flags proporcionados.

Si el parámetro mode está definido,
el valor de retorno será en forma de un array indexado
con **[PGSQL_NUM](#constant.pgsql-num)**,
un array asociativo con **[PGSQL_ASSOC](#constant.pgsql-assoc)** (por defecto),
o ambos con **[PGSQL_BOTH](#constant.pgsql-both)**.

Por defecto [pg_delete()](#function.pg-delete) pasa valores sin tratar. Los valores
deben ser escapados o la opción PGSQL_DML_ESCAPE debe ser proporcionada.
PGSQL_DML_ESCAPE pone comillas y escapa los parámetros/identificadores.
Por lo tanto, los nombres de tabla/columnas deben ser sensibles a mayúsculas y minúsculas.

Tenga en cuenta que ni el escape ni las consultas preparadas pueden proteger de
consultas LIKE, JSON, Arrays, Regex, etc. Estos parámetros deberían ser
tratados según su contexto. Es decir, escapar/validar los valores.

### Parámetros

      connection

       Una instancia [PgSql\Connection](#class.pgsql-connection).





      table_name


        Nombre de la tabla desde la cual seleccionar las filas.






      conditions


        Un [array](#language.types.array) cuyas claves son los nombres de los campos en la tabla table_name,
        y cuyos valores son las condiciones que una fila debe cumplir para ser recuperada.
        A partir de PHP 8.4.0, cuando se proporciona un array vacío, no se aplicará ninguna condición.
        Anteriormente, la función fallaba con un argumento conditions vacío.






      flags


        Cualquier número de **[PGSQL_CONV_FORCE_NULL](#constant.pgsql-conv-force-null)**,
        **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**,
        **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**,
        **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**,
        **[PGSQL_DML_ASYNC](#constant.pgsql-dml-async)** o
        **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** combinados. Si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** forma parte de los
        flags, entonces se devuelve la cadena de consulta. Cuando **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**
        o **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** está activado, [pg_convert()](#function.pg-convert) no es llamado internamente.






      mode


        Cualquier número de **[PGSQL_ASSOC](#constant.pgsql-assoc)**,
        **[PGSQL_NUM](#constant.pgsql-num)** o
        **[PGSQL_BOTH](#constant.pgsql-both)**.
        Si **[PGSQL_ASSOC](#constant.pgsql-assoc)** está definido, el valor de retorno será un [array](#language.types.array) asociativo,
        con **[PGSQL_NUM](#constant.pgsql-num)**, el valor de retorno será un [array](#language.types.array) indexado numéricamente, y
        con **[PGSQL_BOTH](#constant.pgsql-both)**, el valor de retorno será tanto un [array](#language.types.array) asociativo como
        numéricamente indexado.





### Valores devueltos

Devuelve un [string](#language.types.string) si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**
es proporcionado a través de flags, de lo contrario esto devuelve un
[array](#language.types.array) en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        conditions ahora es opcional.





8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

       7.1.0

        El parámetro mode ha sido añadido.





### Ejemplos

    **Ejemplo #1 Ejemplo con pg_select()**

&lt;?php
$db = pg_connect ('dbname=foo');
  // Esto es seguro en cierta medida, ya que todos los valores están escapados
  // Sin embargo PostgreSQL soporta JSON/Arrays. Estos no son
  // seguros ni por escape ni por consultas preparadas.
  $rec = pg_select($db, 'post_log', $_POST, PG_DML_ESCAPE);
  if ($rec) {
echo "Filas leídas\n";
var_dump($rec);
} else {
echo "Problema en los datos de usuario\n";
}
?&gt;

### Ver también

    - [pg_convert()](#function.pg-convert) - Convierte valores de un array asociativo a una forma adecuada para consultas SQL

# pg_send_execute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_send_execute —
Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s)

### Descripción

**pg_send_execute**([PgSql\Connection](#class.pgsql-connection) $connection, [string](#language.types.string) $statement_name, [array](#language.types.array) $params): [int](#language.types.integer)|[bool](#language.types.boolean)

Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s).

Esta función es similar a [pg_send_query_params()](#function.pg-send-query-params), pero el comando que se ejecutará se especifica nombrando una consulta previamente preparada, en lugar de proporcionar un string como consulta. Los parámetros de la función se gestionan de la misma manera que [pg_execute()](#function.pg-execute). Al igual que [pg_execute()](#function.pg-execute), la función no funcionará en versiones anteriores a PostgreSQL 7.4.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     statement_name


       El nombre de la consulta preparada a ejecutar. Si se especifica un string vacío (""), entonces se ejecuta la consulta sin nombre. El nombre debe haber sido previamente preparado utilizando [pg_prepare()](#function.pg-prepare), [pg_send_prepare()](#function.pg-send-prepare) o un comando SQL PREPARE.






     params


       Un array de valores de parámetros para sustituir las variables $1, $2, etc. en la consulta preparada original. El número de elementos presentes en el array debe coincidir con el número de variables a reemplazar.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** o 0 en caso de fallo. Utilice [pg_get_result()](#function.pg-get-result) para determinar el resultado de la consulta.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_send_execute()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Prepara una consulta para la ejecución
if (!pg_connection_busy($dbconn)) {
    pg_send_prepare($dbconn, "my_query", 'SELECT \* FROM tiendas WHERE nombre = $1');
    $res1 = pg_get_result($dbconn);
}

// Ejecuta la consulta preparada. Observe que no es necesario escapar el string "Joe's Widgets"
if (!pg_connection_busy($dbconn)) {
    pg_send_execute($dbconn, "my_query", array("Joe's Widgets"));
$res2 = pg_get_result($dbconn);
}

// Ejecuta la misma consulta preparada, esta vez con un parámetro diferente
if (!pg_connection_busy($dbconn)) {
    pg_execute($dbconn, "my_query", array("Ropa Ropa Ropa"));
$res3 = pg_get_result($dbconn);
}

?&gt;

### Ver también

    - [pg_prepare()](#function.pg-prepare) - Envía una solicitud al servidor para crear una sentencia preparada con los parámetros

dados y espera la ejecución

    - [pg_send_prepare()](#function.pg-send-prepare) - Envía una solicitud para crear una consulta preparada con los argumentos

dados, sin esperar el final de su ejecución

    - [pg_execute()](#function.pg-execute) - Ejecuta una consulta preparada de PostgreSQL

# pg_send_prepare

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_send_prepare —
Envía una solicitud para crear una consulta preparada con los argumentos
dados, sin esperar el final de su ejecución

### Descripción

**pg_send_prepare**([PgSql\Connection](#class.pgsql-connection) $connection, [string](#language.types.string) $statement_name, [string](#language.types.string) $query): [int](#language.types.integer)|[bool](#language.types.boolean)

Envía una solicitud para crear una consulta preparada con los argumentos
dados, sin esperar el final de su ejecución.

Esta función es la versión asíncrona de [pg_prepare()](#function.pg-prepare)
: devuelve **[true](#constant.true)** si ha sido capaz de distribuir la consulta y
**[false](#constant.false)** si no ha sido capaz. Tras una llamada exitosa, llame
a [pg_get_result()](#function.pg-get-result) para determinar si el servidor ha creado
correctamente la consulta preparada.
Los argumentos de la función son gestionados de la misma manera que
[pg_execute()](#function.pg-execute). Al igual que [pg_execute()](#function.pg-execute), la
función no funcionará en versiones anteriores a PostgreSQL 7.4.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     statement_name


       El nombre a dar a la consulta preparada. Debe ser único en cada sesión. Si se especifica una cadena vacía ("") entonces se crea una consulta sin nombre, sobrescribiendo las consultas sin nombre previamente definidas.






     query


       La consulta SQL con sus argumentos. Debe contener solo una consulta. No se permiten múltiples consultas separadas por punto y coma. Si se utilizan argumentos, se refieren a $1, $2, etc.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** o 0 en caso de error.
Utilice [pg_get_result()](#function.pg-get-result) para determinar el resultado
de la consulta.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo pg_send_prepare()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Prepara una consulta para la ejecución
if (!pg_connection_busy($dbconn)) {
    pg_send_prepare($dbconn, "my_query", 'SELECT \* FROM magasins WHERE nom = $1');
    $res1 = pg_get_result($dbconn);
}

// Ejecuta la consulta preparada. Note que no es necesario escapar
// la cadena "Joe's Widgets"
if (!pg_connection_busy($dbconn)) {
    pg_send_execute($dbconn, "my_query", array("Joe's Widgets"));
$res2 = pg_get_result($dbconn);
}

// Ejecuta la misma consulta preparada, esta vez con un argumento diferente
if (!pg_connection_busy($dbconn)) {
    pg_send_execute($dbconn, "my_query", array("Vêtements Vêtements Vêtements"));
$res3 = pg_get_result($dbconn);
}

?&gt;

### Ver también

    - [pg_connect()](#function.pg-connect) - Establece una conexión PostgreSQL

    - [pg_pconnect()](#function.pg-pconnect) - Establece una conexión PostgreSQL persistente

    - [pg_execute()](#function.pg-execute) - Ejecuta una consulta preparada de PostgreSQL

    - [pg_send_execute()](#function.pg-send-execute) - Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s)

    - [pg_send_query_params()](#function.pg-send-query-params) - Envía un comando y separa los parámetros al servidor sin esperar el/los resultado(s)

# pg_send_query

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

pg_send_query —
Ejecuta una consulta PostgreSQL asíncrona

### Descripción

**pg_send_query**([PgSql\Connection](#class.pgsql-connection) $connection, [string](#language.types.string) $query): [int](#language.types.integer)|[bool](#language.types.boolean)

**pg_send_query()** envía una consulta o varias consultas
de manera asíncrona a la conexión connection.
A diferencia de [pg_query()](#function.pg-query), puede enviar varias consultas
al mismo tiempo al servidor PostgreSQL y obtener los resultados uno por uno
utilizando [pg_get_result()](#function.pg-get-result).

La ejecución del script no se bloquea durante la ejecución de las consultas. Se puede
utilizar [pg_connection_busy()](#function.pg-connection-busy) para verificar si la conexión está
ocupada (es decir, si la consulta se está ejecutando). Las consultas
pueden ser canceladas con [pg_cancel_query()](#function.pg-cancel-query).

Aunque se puedan enviar varias consultas al mismo tiempo,
no es posible enviar varias consultas en una conexión ocupada. Si se envía una consulta
cuando la conexión está ocupada, esperará a que la consulta anterior termine y perderá
todos sus resultados.

### Parámetros

     connection


       El recurso de conexión de la base de datos PostgreSQL.






     query


       La consulta o las consultas SQL a ser ejecutadas.




       Los datos contenidos en la consulta deben ser
       [escaped correctamente](#function.pg-escape-string).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** o 0 en caso de fallo.
Utilice [pg_get_result()](#function.pg-get-result) para determinar el resultado
de la consulta.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_send_query()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn,"select _ from autores; select count(_) from autores;");
}

$res1 = pg_get_result($dbconn);
echo "Primera llamada a pg_get_result() : $res1\n";
  $rows1 = pg_num_rows($res1);
echo "$res1 tiene $rows1 registros\n\n";

$res2 = pg_get_result($dbconn);
echo "Segunda llamada a pg_get_result() : $res2\n";
  $rows2 = pg_num_rows($res2);
echo "$res2 tiene $rows2 registros\n";
?&gt;

    El ejemplo anterior mostrará:

Primera llamada a pg_get_result() : Resource id #3
Resource id #3 tiene 3 registros

Segunda llamada a pg_get_result() : Resource id #4
Resource id #4 tiene 1 registros

### Ver también

    - [pg_query()](#function.pg-query) - Ejecuta una consulta PostgreSQL

    - [pg_cancel_query()](#function.pg-cancel-query) - Cancela una consulta asíncrona

    - [pg_get_result()](#function.pg-get-result) - Lee un resultado asíncrono de PostgreSQL

    - [pg_connection_busy()](#function.pg-connection-busy) - Verifica si la conexión PostgreSQL está ocupada

# pg_send_query_params

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_send_query_params —
Envía un comando y separa los parámetros al servidor sin esperar el/los resultado(s)

### Descripción

**pg_send_query_params**([PgSql\Connection](#class.pgsql-connection) $connection, [string](#language.types.string) $query, [array](#language.types.array) $params): [int](#language.types.integer)|[bool](#language.types.boolean)

Envía un comando y separa los parámetros al servidor sin esperar el/los resultado(s).

Esta función es equivalente a [pg_send_query()](#function.pg-send-query) con la excepción de que los parámetros de la consulta pueden especificarse por separado de la cadena de consulta query. Los parámetros de la función se gestionan de la misma manera que [pg_execute()](#function.pg-execute). Como [pg_execute()](#function.pg-execute), la función no funcionará en versiones anteriores a PostgreSQL 7.4 y solo permite un comando por consulta.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     query


       La consulta SQL con sus parámetros. Debe contener solo una consulta. No se permiten múltiples consultas separadas por punto y coma. Si se utilizan parámetros, se hace referencia a ellos como $1, $2, etc.






     params


       Un array de valores de parámetros para sustituir las variables $1, $2, etc. en la consulta preparada original. El número de elementos en el array debe coincidir con el número de variables a reemplazar.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** o 0 en caso de fallo. Utilice [pg_get_result()](#function.pg-get-result) para determinar el resultado de la consulta.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_send_query_params()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

// Con parámetros. Tenga en cuenta que no es necesario escapar la cadena del parámetro.
pg_send_query_params($dbconn, 'select count(\*) from autores where ciudad = $1', array('Perth'));

// Comparar con el uso básico de pg_send_query
$str = pg_escape_string('Perth');
  pg_send_query($dbconn, "select count(\*) from autores where ciudad = '{$str}'");
?&gt;

### Ver también

    - [pg_send_query()](#function.pg-send-query) - Ejecuta una consulta PostgreSQL asíncrona

# pg_set_chunked_rows_size

(PHP 8 &gt;= 8.4.0)

pg_set_chunked_rows_size — Establece los resultados de la consulta a recuperar en modo chunk

### Descripción

**pg_set_chunked_rows_size**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $size): [bool](#language.types.boolean)

Establece los resultados de la consulta a recuperar en modo chunk.
La consulta devuelta posteriormente se dividirá en varios fragmentos,
cada uno conteniendo hasta size filas.
Esta función debe ser llamada antes de recuperar los resultados con [pg_get_result()](#function.pg-get-result).
Esta función solo está disponible cuando libpq está en versión 17 o superior.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     size


       El número de filas a recuperar en cada fragmento.



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si size es inferior a 1,
se lanzará un [ValueError](#class.valueerror).

### Ejemplos

**Ejemplo #1 Ejemplo de [pg_result_memory_size()](#function.pg-result-memory-size)**

&lt;?php

$conn = pg_connect($conn_str);

for ($i = 0; $i &lt; 10; $i ++) {
  pg_query($conn, "INSERT INTO users DEFAULT VALUES");
}

pg_send_query($conn, "SELECT * FROM users");
pg_set_chunked_rows_size($conn, 1);

$result = pg_get_result($conn);
var_dump(pg_num_rows($result));

:: Sin efecto después de que el resultado sea recuperado
var_dump(pg_set_chunked_rows_size($conn, 10));

El ejemplo anterior mostrará:

int(1)
bool(false)

### Ver también

- [pg_get_result()](#function.pg-get-result) - Lee un resultado asíncrono de PostgreSQL

- [pg_result_status()](#function.pg-result-status) - Lee el estado del resultado

# pg_set_client_encoding

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

pg_set_client_encoding —
Establece la codificación del cliente PostgreSQL

### Descripción

**pg_set_client_encoding**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [string](#language.types.string) $encoding): [int](#language.types.integer)

**pg_set_client_encoding()** establece la codificación del cliente.
Devuelve 0 en caso de éxito y -1 en caso de error.

PostgreSQL convertirá automáticamente los datos de la codificación de la
base de datos a la codificación del cliente.

**Nota**:

    Anteriormente, esta función se llamaba **pg_setclientencoding()**.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     encoding


       La codificación del cliente solicitada. Una de estas constantes: SQL_ASCII, EUC_JP,
       EUC_CN, EUC_KR, EUC_TW,
       UNICODE, MULE_INTERNAL, LATINX (X=1...9),
       KOI8, WIN, ALT, SJIS,
       BIG5 o WIN1250.




       La lista exacta de codificaciones disponibles depende de la versión de
       PostgreSQL, por lo que se debe consultar el manual de PostgreSQL para obtener una lista más
       específica.





### Valores devueltos

Devuelve 0 en caso de éxito o -1 en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_set_client_encoding()**

&lt;?php

$conn = pg_pconnect("dbname=editeur");
if (!$conn) {
echo "Se ha producido un error.\n";
exit;
}

// Establece la codificación del cliente a UNICODE. Los datos se convertirán automáticamente
// de la codificación del servidor a la codificación del cliente.
pg_set_client_encoding($conn, "UNICODE");

$result = pg_query($conn, "SELECT autor, email FROM autores");
if (!$result) {
echo "Se ha producido un error.\n";
exit;
}

// Escritura de datos UTF-8
while ($row = pg_fetch_row($result)) {
echo "Autor: $row[0] E-mail: $row[1]";
echo "&lt;br /&gt;\n";
}

?&gt;

### Ver también

    - [pg_client_encoding()](#function.pg-client-encoding) - Lee el encodage del cliente
















      # pg_set_error_context_visibility

      (PHP 8 &gt;= 8.3.0)

pg_set_error_context_visibility —
Determina la visibilidad de los mensajes de error de contexto devueltos por [pg_last_error()](#function.pg-last-error)
y [pg_result_error()](#function.pg-result-error)

    ### Descripción


     **pg_set_error_context_visibility**([PgSql\Connection](#class.pgsql-connection) $connection, [int](#language.types.integer) $visibility): [int](#language.types.integer)


     Determina la visibilidad de los mensajes de error de contexto devueltos por [pg_last_error()](#function.pg-last-error)
     y [pg_result_error()](#function.pg-result-error)







    ### Parámetros






       connection

        Una instancia [PgSql\Connection](#class.pgsql-connection).





       visibility


         La visibilidad requerida: **[PGSQL_SHOW_CONTEXT_NEVER](#constant.pgsql-show-context-never)**,
         **[PGSQL_SHOW_CONTEXT_ERRORS](#constant.pgsql-show-context-errors)**
         o **[PGSQL_SHOW_CONTEXT_ALWAYS](#constant.pgsql-show-context-always)**.











    ### Valores devueltos


     El nivel de visibilidad anterior: **[PGSQL_SHOW_CONTEXT_NEVER](#constant.pgsql-show-context-never)**,
     **[PGSQL_SHOW_CONTEXT_ERRORS](#constant.pgsql-show-context-errors)**
     o **[PGSQL_SHOW_CONTEXT_ALWAYS](#constant.pgsql-show-context-always)**.







    ### Ejemplos


     **Ejemplo #1 Ejemplo de pg_set_error_context_visibility()**



      &lt;?php
      $dbconn = pg_connect("dbname=publisher") or die("No se puede conectar");
      if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select * from doesnotexist;");
      }
      pg_set_error_context_visibility($dbconn, PGSQL_SHOW_CONTEXT_ALWAYS);
      $res1 = pg_get_result($dbconn);
      echo pg_result_error($res1);
      ?&gt;







    ### Ver también





      - [pg_last_error()](#function.pg-last-error) - Lee el último mensaje de error en la conexión

      - [pg_result_error()](#function.pg-result-error) - Lee el mensaje de error asociado a un resultado



# pg_set_error_verbosity

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_set_error_verbosity —
Determina el nivel de detalle de los mensajes devueltos por
[pg_last_error()](#function.pg-last-error) y [pg_result_error()](#function.pg-result-error)

### Descripción

**pg_set_error_verbosity**([PgSql\Connection](#class.pgsql-connection) $connection = ?, [int](#language.types.integer) $verbosity): [int](#language.types.integer)

Determina el nivel de detalle de los mensajes devueltos por
[pg_last_error()](#function.pg-last-error) y [pg_result_error()](#function.pg-result-error).

**pg_set_error_verbosity()** establece el nivel de detalle de los errores
y devuelve el parámetro anterior de la conexión. Con el modo
**[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**, los mensajes devueltos incluyen la
severidad, el texto principal y la posición solamente; normalmente, esto cabrá
en una sola línea. El modo por defecto
(**[PGSQL_ERRORS_DEFAULT](#constant.pgsql-errors-default)**) produce mensajes que incluyen
los mensajes anteriores y detalles, sugerencias o campos contextuales (estos mensajes pueden extenderse en varias líneas). El modo
**[PGSQL_ERRORS_VERBOSE](#constant.pgsql-errors-verbose)** incluye todos los campos disponibles. El
cambio del nivel de detalle de los mensajes no afecta a los mensajes disponibles que
provienen de resultados ya existentes, sino solo a los mensajes de los
resultados creados posteriormente.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection no es especificado, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     verbosity


       El nivel de detalle del mensaje de error:
       **[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**,
       **[PGSQL_ERRORS_DEFAULT](#constant.pgsql-errors-default)**
       o **[PGSQL_ERRORS_VERBOSE](#constant.pgsql-errors-verbose)**.





### Valores devueltos

El nivel de detalle del mensaje de error anterior:
**[PGSQL_ERRORS_TERSE](#constant.pgsql-errors-terse)**,
**[PGSQL_ERRORS_DEFAULT](#constant.pgsql-errors-default)**
o **[PGSQL_ERRORS_VERBOSE](#constant.pgsql-errors-verbose)**.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_set_error_verbosity()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");

if (!pg_connection_busy($dbconn)) {
      pg_send_query($dbconn, "select \* from nexistepas;");
}

pg_set_error_verbosity($dbconn, PGSQL_ERRORS_VERBOSE);
  $res1 = pg_get_result($dbconn);
echo pg_result_error($res1);
?&gt;

### Ver también

    - [pg_last_error()](#function.pg-last-error) - Lee el último mensaje de error en la conexión

    - [pg_result_error()](#function.pg-result-error) - Lee el mensaje de error asociado a un resultado

# pg_socket

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

pg_socket —
Obtiene un manejador de solo lectura sobre el socket subyacente de una conexión PostgreSQL

### Descripción

**pg_socket**([PgSql\Connection](#class.pgsql-connection) $connection): [resource](#language.types.resource)|[false](#language.types.singleton)

La función **pg_socket()** devuelve una recurso
de solo lectura correspondiente al socket subyacente de la conexión
PostgreSQL proporcionada.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    connection

     Una instancia [PgSql\Connection](#class.pgsql-connection).

### Valores devueltos

Un recurso de socket en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

# pg_trace

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

pg_trace —
Activa el seguimiento de una conexión PostgreSQL

### Descripción

**pg_trace**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $mode = "w",
    [?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**,
    [int](#language.types.integer) $trace_mode = 0
): [bool](#language.types.boolean)

**pg_trace()** activa el seguimiento de las comunicaciones entre PHP y
el servidor PostgreSQL. Este historial se registrará en un fichero.
Para comprender estas líneas, es necesario estar familiarizado con el protocolo
de comunicación interno de PostgreSQL.

Para quienes no lo estén, pueden ser útiles para seguir las
consultas y los errores: con el comando
**grep '^To backend' trace.log**, se podrán ver las
consultas realmente enviadas al servidor PostgreSQL. Para más
información, consulte la
[» Documentación PostgreSQL](http://www.postgresql.org/docs/current/interactive/).

### Parámetros

     filename


       La ruta completa y el nombre del fichero en el que se registrará el seguimiento. Como [fopen()](#function.fopen).






     mode


       El modo de acceso opcional, como [fopen()](#function.fopen).






     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

     trace_mode


       Un modo de seguimiento opcional con las constantes siguientes:
       **[PGSQL_TRACE_SUPPRESS_TIMESTAMPS](#constant.pgsql-trace-suppress-timestamps)** y
       **[PGSQL_TRACE_REGRESS_MODE](#constant.pgsql-trace-regress-mode)**





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       trace_mode ha sido añadido.





8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_trace()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

if ($pgsql_conn) {
   pg_trace('/tmp/trace.log', 'w', $pgsql_conn);
   pg_query("SELECT 1");
   pg_untrace($pgsql_conn);
// Ahora /tmp/trace.log contendrá el seguimiento de las comunicaciones
} else {
print pg_last_error($pgsql_conn);
exit;
}
?&gt;

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [pg_untrace()](#function.pg-untrace) - Finaliza el seguimiento de una conexión PostgreSQL

# pg_transaction_status

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

pg_transaction_status —
Retorna el estado de la transacción en curso del servidor

### Descripción

**pg_transaction_status**([PgSql\Connection](#class.pgsql-connection) $connection): [int](#language.types.integer)

Retorna el estado de la transacción en curso del servidor.

**Precaución**

      **pg_transaction_status()** proporcionará resultados incorrectos
      cuando se utilice con un servidor PostgreSQL 7.3 que tenga
      el parámetro autocommit desactivado. La funcionalidad de
      autocommit está obsoleta y ya no existe en las versiones más recientes del servidor.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).




### Valores devueltos

El estado puede ser **[PGSQL_TRANSACTION_IDLE](#constant.pgsql-transaction-idle)** (actualmente inactivo),
**[PGSQL_TRANSACTION_ACTIVE](#constant.pgsql-transaction-active)** (una orden está en curso),
**[PGSQL_TRANSACTION_INTRANS](#constant.pgsql-transaction-intrans)** (inactivo, dentro de un bloque de transacción válido),
o **[PGSQL_TRANSACTION_INERROR](#constant.pgsql-transaction-inerror)** (inactivo, dentro de un bloque de transacción fallido).
**[PGSQL_TRANSACTION_UNKNOWN](#constant.pgsql-transaction-unknown)** se retorna si la conexión es incorrecta.
**[PGSQL_TRANSACTION_ACTIVE](#constant.pgsql-transaction-active)** se retorna solo si la
consulta ha sido enviada al servidor y esta aún no ha sido completada.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_transaction_status()**

&lt;?php
$dbconn = pg_connect("dbname=publisher") or die("Conexión imposible");
  $stat = pg_transaction_status($dbconn);
if ($stat === PGSQL_TRANSACTION_UNKNOWN) {
      echo 'Conexión incorrecta';
  } else if ($stat === PGSQL_TRANSACTION_IDLE) {
echo 'Conexión actualmente inactiva';
} else {
echo 'Conexión está en curso de transacción';
}
?&gt;

# pg_tty

(PHP 4, PHP 5, PHP 7, PHP 8)

pg_tty —
Devuelve el nombre de TTY asociado a la conexión

### Descripción

**pg_tty**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [string](#language.types.string)

**pg_tty()** devuelve el nombre de TTY de la conexión
asociada a connection.

**Nota**:

    **pg_tty()** está obsoleto, ya que el servidor no presta
    atención a la configuración TTY, pero se mantiene por razones de
    compatibilidad.

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Una cadena que contiene el depurador TTY de la conexión
connection.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_tty()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

if ($pgsql_conn) {
   print "Depurador TTY del servidor es: " . pg_tty($pgsql_conn) . "&lt;br/&gt;\n";
} else {
print pg_last_error($pgsql_conn);
exit;
}
?&gt;

# pg_unescape_bytea

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_unescape_bytea —
Elimina la protección de una cadena de tipo bytea

### Descripción

**pg_unescape_bytea**([string](#language.types.string) $string): [string](#language.types.string)

**pg_unescape_bytea()** elimina la protección de los
caracteres de tipo bytea. Devuelve el [string](#language.types.string) protegido, que puede
contener datos binarios.

**Nota**:

    Al utilizar una sentencia SELECT
    con datos de tipo bytea, PostgreSQL devuelve valores
    octales, precedidos por barras invertidas \ (p. ej. \032). Los usuarios
    deben realizar la conversión al formato binario por sí mismos.




    [pg_escape_bytea()](#function.pg-escape-bytea) requiere PostgreSQL 7.2 o posterior. Con
    PostgreSQL 7.2.0 y 7.2.1, los datos de tipo bytea deben ser convertidos
    cuando se activa el soporte para cadenas de caracteres multioctetos.
    i.e. INSERT INTO test_table (image) VALUES ('$image_escaped'::bytea);.
    PostgreSQL 7.2.2 o posterior no requiere esta manipulación.
    Sin embargo, si el cliente y el servidor no utilizan el mismo juego de caracteres,
    pueden producirse errores. En ese caso, es necesario forzar la conversión
    manualmente para evitar este error.

### Parámetros

     string


       Un [string](#language.types.string) que contiene los datos bytea de PostgreSQL a ser convertidos
       en [string](#language.types.string) binario de PHP.





### Valores devueltos

Un [string](#language.types.string) que contiene los datos protegidos.

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_unescape_bytea()**

&lt;?php
// Conexión a la base de datos
$dbconn = pg_connect('dbname=foo');

// Recuperación de los datos bytea
$res = pg_query("SELECT data FROM galeria WHERE nombre='Arboles Pino'");
  $raw = pg_fetch_result($res, 'data');

// Convierte a binario y envía al navegador
header('Content-type: image/jpeg');
echo pg_unescape_bytea($raw);
?&gt;

### Ver también

    - [pg_escape_bytea()](#function.pg-escape-bytea) - Protege una cadena para insertarla en un campo bytea

    - [pg_escape_string()](#function.pg-escape-string) - Protege un string para una consulta SQL

# pg_untrace

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

pg_untrace —
Finaliza el seguimiento de una conexión PostgreSQL

### Descripción

**pg_untrace**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [true](#language.types.singleton)

**pg_untrace()** finaliza el seguimiento de una conexión
PostgreSQL, iniciado con [pg_trace()](#function.pg-trace).

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_untrace()**

&lt;?php
$pgsql_conn = pg_connect("dbname=mark host=localhost");

if ($pgsql_conn) {
   pg_trace('/tmp/trace.log', 'w', $pgsql_conn);
   pg_query("SELECT 1");
   pg_untrace($pgsql_conn);
// Ahora el seguimiento de las comunicaciones está desactivado
} else {
print pg_last_error($pgsql_conn);
exit;
}
?&gt;

### Ver también

    - [pg_trace()](#function.pg-trace) - Activa el seguimiento de una conexión PostgreSQL

# pg_update

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

pg_update —
Modifica las líneas de una tabla

### Descripción

**pg_update**(
    [PgSql\Connection](#class.pgsql-connection) $connection,
    [string](#language.types.string) $table_name,
    [array](#language.types.array) $values,
    [array](#language.types.array) $conditions,
    [int](#language.types.integer) $flags = **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**
): [string](#language.types.string)|[bool](#language.types.boolean)

**pg_update()** modifica las líneas de la tabla
table_name, que cumplen la condición
conditions con values.

Si flags está especificado,
[pg_convert()](#function.pg-convert) se aplica a
values con los flags proporcionados.

Por omisión **pg_update()** pasa valores sin tratar.
Los valores deben ser escapados o el flag **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**
debe ser especificado en flags.
**[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** añade comillas y escapa los argumentos/identificadores.
Por lo tanto, los nombres de tabla/columnas se vuelven sensibles a mayúsculas/minúsculas.

Tenga en cuenta que ni el escape ni las consultas preparadas pueden proteger de
consultas LIKE, JSON, arrays, Regex, etc. Estos argumentos deben ser
tratados según su contexto. Es decir, escapar/validar los valores.

### Parámetros

     connection

      Una instancia [PgSql\Connection](#class.pgsql-connection).





     table_name


       El nombre de la tabla en la que las líneas serán actualizadas.






     values


       Un [array](#language.types.array) cuyos claves son los nombres de los campos en la tabla
       table_name, y donde los valores
       son las líneas correspondientes que serán actualizadas.






     conditions


       Un [array](#language.types.array) cuyos claves son los nombres de los campos en la tabla
       table_name, y donde los valores son
       las condiciones que deben cumplir las líneas para ser actualizadas.






     flags


       Cualquier combinación de constantes entre
       **[PGSQL_CONV_FORCE_NULL](#constant.pgsql-conv-force-null)**,
       **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)**,
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)**,
       **[PGSQL_DML_EXEC](#constant.pgsql-dml-exec)**,
       **[PGSQL_DML_ASYNC](#constant.pgsql-dml-async)** o
       **[PGSQL_DML_STRING](#constant.pgsql-dml-string)**.
       Si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** forma parte del argumento
       flags, entonces la consulta será devuelta.
       Cuando la constante **[PGSQL_DML_NO_CONV](#constant.pgsql-dml-no-conv)** o la constante
       **[PGSQL_DML_ESCAPE](#constant.pgsql-dml-escape)** está definida, no se realizará ninguna llamada a la función
       [pg_convert()](#function.pg-convert) internamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Devuelve una [string](#language.types.string) si **[PGSQL_DML_STRING](#constant.pgsql-dml-string)** es pasado
a través del argumento flags.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con pg_update()**

&lt;?php
$db = pg_connect ('dbname=foo');
$data = array('field1'=&gt;'AA', 'field2'=&gt;'BB');

// Esto es seguro en cierta medida, ya que todos los valores son escapados
// Sin embargo PostgreSSQL soporta JSON/arrays. Estos no
// son seguros ni por escape ni por consultas preparadas.
$res = pg_update($db, 'post_log', $_POST, $data);
  if ($res) {
echo "Los datos han sido modificados: $res\n";
} else {
echo "Problema en los datos del usuario\n";
}
?&gt;

### Ver también

    - [pg_convert()](#function.pg-convert) - Convierte valores de un array asociativo a una forma adecuada para consultas SQL

# pg_version

(PHP 5, PHP 7, PHP 8)

pg_version —
Devuelve un array con las versiones del cliente, del protocolo y del servidor (si está disponible)

### Descripción

**pg_version**([?](#language.types.null)[PgSql\Connection](#class.pgsql-connection) $connection = **[null](#constant.null)**): [array](#language.types.array)

**pg_version()** devuelve un array con las versiones
del cliente, del protocolo y del servidor. Las versiones del protocolo y del servidor
solo están disponibles si PHP ha sido compilado con PostgreSQL 7.4 o superior.

Para obtener más información sobre el servidor, utilice
[pg_parameter_status()](#function.pg-parameter-status).

### Parámetros

     connection



Una instancia [PgSql\Connection](#class.pgsql-connection).
Cuando connection es **[null](#constant.null)**, se usa la conexión por defecto.
La conexión por defecto es la última conexión hecha por
[pg_connect()](#function.pg-connect) o [pg_pconnect()](#function.pg-pconnect)

**Advertencia**Desde PHP 8.1.0, usar la conexión por defecto está obsoleto.

### Valores devueltos

Devuelve un array con las claves client,
protocol y server y valores
(si están disponibles).

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro connection ahora espera una instancia de
[PgSql\Connection](#class.pgsql-connection) ; anteriormente, se esperaba un [resource](#language.types.resource).

      8.0.0

       connection ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con pg_version()**

&lt;?php
$dbconn = pg_connect("host=localhost port=5432 dbname=marie")
or die("Conexión imposible");

$v = pg_version($dbconn);

echo $v['client'];
?&gt;

    El ejemplo anterior mostrará:

7.4

### Ver también

    - [pg_parameter_status()](#function.pg-parameter-status) - Consulta un parámetro de configuración actual del servidor

## Tabla de contenidos

- [pg_affected_rows](#function.pg-affected-rows) — Devuelve el número de filas afectadas
- [pg_cancel_query](#function.pg-cancel-query) — Cancela una consulta asíncrona
- [pg_client_encoding](#function.pg-client-encoding) — Lee el encodage del cliente
- [pg_close](#function.pg-close) — Finaliza una conexión PostgreSQL
- [pg_connect](#function.pg-connect) — Establece una conexión PostgreSQL
- [pg_connect_poll](#function.pg-connect-poll) — Prueba el estado de un intento de conexión asíncrona a PostgreSQL en curso
- [pg_connection_busy](#function.pg-connection-busy) — Verifica si la conexión PostgreSQL está ocupada
- [pg_connection_reset](#function.pg-connection-reset) — Reinicia la conexión al servidor PostgreSQL
- [pg_connection_status](#function.pg-connection-status) — Se lee el estado de la conexión PostgreSQL
- [pg_consume_input](#function.pg-consume-input) — Lee la entrada de la conexión
- [pg_convert](#function.pg-convert) — Convierte valores de un array asociativo a una forma adecuada para consultas SQL
- [pg_copy_from](#function.pg-copy-from) — Inserta filas en una tabla a partir de un array
- [pg_copy_to](#function.pg-copy-to) — Copia una tabla en un array
- [pg_dbname](#function.pg-dbname) — Devuelve el nombre de la base de datos PostgreSQL
- [pg_delete](#function.pg-delete) — Elimina filas de PostgreSQL
- [pg_end_copy](#function.pg-end-copy) — Sincroniza con el servidor PostgreSQL
- [pg_escape_bytea](#function.pg-escape-bytea) — Protege una cadena para insertarla en un campo bytea
- [pg_escape_identifier](#function.pg-escape-identifier) — Protege un identificador para su inserción en un campo de texto.
- [pg_escape_literal](#function.pg-escape-literal) — Protege una consulta SQL literal para insertar en un campo de texto
- [pg_escape_string](#function.pg-escape-string) — Protege un string para una consulta SQL
- [pg_execute](#function.pg-execute) — Ejecuta una consulta preparada de PostgreSQL
- [pg_fetch_all](#function.pg-fetch-all) — Lee todas las líneas de un resultado
- [pg_fetch_all_columns](#function.pg-fetch-all-columns) — Recupera todas las filas de una columna particular de resultados como un array
- [pg_fetch_array](#function.pg-fetch-array) — Lee una línea de resultado PostgreSQL en un array
- [pg_fetch_assoc](#function.pg-fetch-assoc) — Lee una fila de resultado PostgreSQL como un array asociativo
- [pg_fetch_object](#function.pg-fetch-object) — Lee una fila de resultado PostgreSQL en un objeto
- [pg_fetch_result](#function.pg-fetch-result) — Devuelve los valores de un resultado
- [pg_fetch_row](#function.pg-fetch-row) — Lee una fila en un array
- [pg_field_is_null](#function.pg-field-is-null) — Comprueba si un campo PostgreSQL es null
- [pg_field_name](#function.pg-field-name) — Devuelve el nombre de un campo PostgreSQL
- [pg_field_num](#function.pg-field-num) — Devuelve el número de una columna
- [pg_field_prtlen](#function.pg-field-prtlen) — Devuelve el tamaño de impresión
- [pg_field_size](#function.pg-field-size) — Devuelve el tamaño interno de almacenamiento de un campo dado
- [pg_field_table](#function.pg-field-table) — Devuelve el nombre o el oid de una tabla
- [pg_field_type](#function.pg-field-type) — Devuelve el tipo de un campo PostgreSQL dado por índice
- [pg_field_type_oid](#function.pg-field-type-oid) — Devuelve el ID de tipo (OID) para el número de campo correspondiente
- [pg_flush](#function.pg-flush) — Envía los datos de la solicitud saliente a través de la conexión
- [pg_free_result](#function.pg-free-result) — Libera la memoria
- [pg_get_notify](#function.pg-get-notify) — Lee el mensaje SQL NOTIFY
- [pg_get_pid](#function.pg-get-pid) — Lee el identificador de proceso del servidor PostgreSQL
- [pg_get_result](#function.pg-get-result) — Lee un resultado asíncrono de PostgreSQL
- [pg_host](#function.pg-host) — Devuelve el nombre de host
- [pg_insert](#function.pg-insert) — Inserta un array en una tabla
- [pg_last_error](#function.pg-last-error) — Lee el último mensaje de error en la conexión
- [pg_last_notice](#function.pg-last-notice) — Devuelve la última nota del servidor PostgreSQL
- [pg_last_oid](#function.pg-last-oid) — Devuelve el identificador de la última línea
- [pg_lo_close](#function.pg-lo-close) — Cierra un objeto grande de PostgreSQL
- [pg_lo_create](#function.pg-lo-create) — Crea un objeto de gran tamaño de PostgreSQL
- [pg_lo_export](#function.pg-lo-export) — Exporta un objeto grande a un fichero
- [pg_lo_import](#function.pg-lo-import) — Importa un objeto grande desde un fichero
- [pg_lo_open](#function.pg-lo-open) — Abre un objeto de gran tamaño de PostgreSQL
- [pg_lo_read](#function.pg-lo-read) — Lee un objeto de gran tamaño
- [pg_lo_read_all](#function.pg-lo-read-all) — Lee un objeto de gran tamaño en su totalidad
- [pg_lo_seek](#function.pg-lo-seek) — Modifica la posición en un objeto de gran tamaño
- [pg_lo_tell](#function.pg-lo-tell) — Devuelve la posición actual en un objeto grande de PostgreSQL
- [pg_lo_truncate](#function.pg-lo-truncate) — Trunca un objeto grande
- [pg_lo_unlink](#function.pg-lo-unlink) — Elimina un objeto grande de PostgreSQL
- [pg_lo_write](#function.pg-lo-write) — Escribe un objeto de gran tamaño de PostgreSQL
- [pg_meta_data](#function.pg-meta-data) — Lee los metadatos de la tabla PostgreSQL
- [pg_num_fields](#function.pg-num-fields) — Devuelve el número de campos
- [pg_num_rows](#function.pg-num-rows) — Devuelve el número de filas de PostgreSQL
- [pg_options](#function.pg-options) — Devuelve las opciones de PostgreSQL
- [pg_parameter_status](#function.pg-parameter-status) — Consulta un parámetro de configuración actual del servidor
- [pg_pconnect](#function.pg-pconnect) — Establece una conexión PostgreSQL persistente
- [pg_ping](#function.pg-ping) — Ping la conexión a la base de datos
- [pg_port](#function.pg-port) — Devuelve el número de puerto
- [pg_prepare](#function.pg-prepare) — Envía una solicitud al servidor para crear una sentencia preparada con los parámetros
  dados y espera la ejecución
- [pg_put_line](#function.pg-put-line) — Envía una string al servidor PostgreSQL
- [pg_query](#function.pg-query) — Ejecuta una consulta PostgreSQL
- [pg_query_params](#function.pg-query-params) — Envía un comando al servidor y espera el resultado, con la capacidad de
  pasar parámetros por separado del texto SQL de la consulta
- [pg_result_error](#function.pg-result-error) — Lee el mensaje de error asociado a un resultado
- [pg_result_error_field](#function.pg-result-error-field) — Devuelve un campo individual de un informe de error
- [pg_result_memory_size](#function.pg-result-memory-size) — Devuelve la cantidad de memoria asignada para un resultado de consulta
- [pg_result_seek](#function.pg-result-seek) — Establece la posición de la línea en un resultado
- [pg_result_status](#function.pg-result-status) — Lee el estado del resultado
- [pg_select](#function.pg-select) — Realiza una selección PostgreSQL
- [pg_send_execute](#function.pg-send-execute) — Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s)
- [pg_send_prepare](#function.pg-send-prepare) — Envía una solicitud para crear una consulta preparada con los argumentos
  dados, sin esperar el final de su ejecución
- [pg_send_query](#function.pg-send-query) — Ejecuta una consulta PostgreSQL asíncrona
- [pg_send_query_params](#function.pg-send-query-params) — Envía un comando y separa los parámetros al servidor sin esperar el/los resultado(s)
- [pg_set_chunked_rows_size](#function.pg-set-chunked-rows-size) — Establece los resultados de la consulta a recuperar en modo chunk
- [pg_set_client_encoding](#function.pg-set-client-encoding) — Establece la codificación del cliente PostgreSQL
- [pg_set_error_context_visibility](#function.pg-set-error-context-visibility) — Determina la visibilidad de los mensajes de error de contexto devueltos por pg_last_error
  y pg_result_error
- [pg_set_error_verbosity](#function.pg-set-error-verbosity) — Determina el nivel de detalle de los mensajes devueltos por
  pg_last_error y pg_result_error
- [pg_socket](#function.pg-socket) — Obtiene un manejador de solo lectura sobre el socket subyacente de una conexión PostgreSQL
- [pg_trace](#function.pg-trace) — Activa el seguimiento de una conexión PostgreSQL
- [pg_transaction_status](#function.pg-transaction-status) — Retorna el estado de la transacción en curso del servidor
- [pg_tty](#function.pg-tty) — Devuelve el nombre de TTY asociado a la conexión
- [pg_unescape_bytea](#function.pg-unescape-bytea) — Elimina la protección de una cadena de tipo bytea
- [pg_untrace](#function.pg-untrace) — Finaliza el seguimiento de una conexión PostgreSQL
- [pg_update](#function.pg-update) — Modifica las líneas de una tabla
- [pg_version](#function.pg-version) — Devuelve un array con las versiones del cliente, del protocolo y del servidor (si está disponible)

# La clase PgSql\Connection

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    pgsql link a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **PgSql\Connection**
     {

}

# La clase PgSql\Result

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    pgsql result a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **PgSql\Result**
     {

}

# La clase PgSql\Lob

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    pgsql large object a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **PgSql\Lob**
     {

}

- [Introducción](#intro.pgsql)
- [Instalación/Configuración](#pgsql.setup)<li>[Requerimientos](#pgsql.requirements)
- [Instalación](#pgsql.installation)
- [Configuración en tiempo de ejecución](#pgsql.configuration)
- [Tipos de recursos](#pgsql.resources)
  </li>- [Constantes predefinidas](#pgsql.constants)
- [Ejemplos](#pgsql.examples)<li>[Uso básico](#pgsql.examples-basic)
- [Uso básico](#pgsql.examples-queries)
  </li>- [Funciones de PostgreSQL](#ref.pgsql)<li>[pg_affected_rows](#function.pg-affected-rows) — Devuelve el número de filas afectadas
- [pg_cancel_query](#function.pg-cancel-query) — Cancela una consulta asíncrona
- [pg_client_encoding](#function.pg-client-encoding) — Lee el encodage del cliente
- [pg_close](#function.pg-close) — Finaliza una conexión PostgreSQL
- [pg_connect](#function.pg-connect) — Establece una conexión PostgreSQL
- [pg_connect_poll](#function.pg-connect-poll) — Prueba el estado de un intento de conexión asíncrona a PostgreSQL en curso
- [pg_connection_busy](#function.pg-connection-busy) — Verifica si la conexión PostgreSQL está ocupada
- [pg_connection_reset](#function.pg-connection-reset) — Reinicia la conexión al servidor PostgreSQL
- [pg_connection_status](#function.pg-connection-status) — Se lee el estado de la conexión PostgreSQL
- [pg_consume_input](#function.pg-consume-input) — Lee la entrada de la conexión
- [pg_convert](#function.pg-convert) — Convierte valores de un array asociativo a una forma adecuada para consultas SQL
- [pg_copy_from](#function.pg-copy-from) — Inserta filas en una tabla a partir de un array
- [pg_copy_to](#function.pg-copy-to) — Copia una tabla en un array
- [pg_dbname](#function.pg-dbname) — Devuelve el nombre de la base de datos PostgreSQL
- [pg_delete](#function.pg-delete) — Elimina filas de PostgreSQL
- [pg_end_copy](#function.pg-end-copy) — Sincroniza con el servidor PostgreSQL
- [pg_escape_bytea](#function.pg-escape-bytea) — Protege una cadena para insertarla en un campo bytea
- [pg_escape_identifier](#function.pg-escape-identifier) — Protege un identificador para su inserción en un campo de texto.
- [pg_escape_literal](#function.pg-escape-literal) — Protege una consulta SQL literal para insertar en un campo de texto
- [pg_escape_string](#function.pg-escape-string) — Protege un string para una consulta SQL
- [pg_execute](#function.pg-execute) — Ejecuta una consulta preparada de PostgreSQL
- [pg_fetch_all](#function.pg-fetch-all) — Lee todas las líneas de un resultado
- [pg_fetch_all_columns](#function.pg-fetch-all-columns) — Recupera todas las filas de una columna particular de resultados como un array
- [pg_fetch_array](#function.pg-fetch-array) — Lee una línea de resultado PostgreSQL en un array
- [pg_fetch_assoc](#function.pg-fetch-assoc) — Lee una fila de resultado PostgreSQL como un array asociativo
- [pg_fetch_object](#function.pg-fetch-object) — Lee una fila de resultado PostgreSQL en un objeto
- [pg_fetch_result](#function.pg-fetch-result) — Devuelve los valores de un resultado
- [pg_fetch_row](#function.pg-fetch-row) — Lee una fila en un array
- [pg_field_is_null](#function.pg-field-is-null) — Comprueba si un campo PostgreSQL es null
- [pg_field_name](#function.pg-field-name) — Devuelve el nombre de un campo PostgreSQL
- [pg_field_num](#function.pg-field-num) — Devuelve el número de una columna
- [pg_field_prtlen](#function.pg-field-prtlen) — Devuelve el tamaño de impresión
- [pg_field_size](#function.pg-field-size) — Devuelve el tamaño interno de almacenamiento de un campo dado
- [pg_field_table](#function.pg-field-table) — Devuelve el nombre o el oid de una tabla
- [pg_field_type](#function.pg-field-type) — Devuelve el tipo de un campo PostgreSQL dado por índice
- [pg_field_type_oid](#function.pg-field-type-oid) — Devuelve el ID de tipo (OID) para el número de campo correspondiente
- [pg_flush](#function.pg-flush) — Envía los datos de la solicitud saliente a través de la conexión
- [pg_free_result](#function.pg-free-result) — Libera la memoria
- [pg_get_notify](#function.pg-get-notify) — Lee el mensaje SQL NOTIFY
- [pg_get_pid](#function.pg-get-pid) — Lee el identificador de proceso del servidor PostgreSQL
- [pg_get_result](#function.pg-get-result) — Lee un resultado asíncrono de PostgreSQL
- [pg_host](#function.pg-host) — Devuelve el nombre de host
- [pg_insert](#function.pg-insert) — Inserta un array en una tabla
- [pg_last_error](#function.pg-last-error) — Lee el último mensaje de error en la conexión
- [pg_last_notice](#function.pg-last-notice) — Devuelve la última nota del servidor PostgreSQL
- [pg_last_oid](#function.pg-last-oid) — Devuelve el identificador de la última línea
- [pg_lo_close](#function.pg-lo-close) — Cierra un objeto grande de PostgreSQL
- [pg_lo_create](#function.pg-lo-create) — Crea un objeto de gran tamaño de PostgreSQL
- [pg_lo_export](#function.pg-lo-export) — Exporta un objeto grande a un fichero
- [pg_lo_import](#function.pg-lo-import) — Importa un objeto grande desde un fichero
- [pg_lo_open](#function.pg-lo-open) — Abre un objeto de gran tamaño de PostgreSQL
- [pg_lo_read](#function.pg-lo-read) — Lee un objeto de gran tamaño
- [pg_lo_read_all](#function.pg-lo-read-all) — Lee un objeto de gran tamaño en su totalidad
- [pg_lo_seek](#function.pg-lo-seek) — Modifica la posición en un objeto de gran tamaño
- [pg_lo_tell](#function.pg-lo-tell) — Devuelve la posición actual en un objeto grande de PostgreSQL
- [pg_lo_truncate](#function.pg-lo-truncate) — Trunca un objeto grande
- [pg_lo_unlink](#function.pg-lo-unlink) — Elimina un objeto grande de PostgreSQL
- [pg_lo_write](#function.pg-lo-write) — Escribe un objeto de gran tamaño de PostgreSQL
- [pg_meta_data](#function.pg-meta-data) — Lee los metadatos de la tabla PostgreSQL
- [pg_num_fields](#function.pg-num-fields) — Devuelve el número de campos
- [pg_num_rows](#function.pg-num-rows) — Devuelve el número de filas de PostgreSQL
- [pg_options](#function.pg-options) — Devuelve las opciones de PostgreSQL
- [pg_parameter_status](#function.pg-parameter-status) — Consulta un parámetro de configuración actual del servidor
- [pg_pconnect](#function.pg-pconnect) — Establece una conexión PostgreSQL persistente
- [pg_ping](#function.pg-ping) — Ping la conexión a la base de datos
- [pg_port](#function.pg-port) — Devuelve el número de puerto
- [pg_prepare](#function.pg-prepare) — Envía una solicitud al servidor para crear una sentencia preparada con los parámetros
  dados y espera la ejecución
- [pg_put_line](#function.pg-put-line) — Envía una string al servidor PostgreSQL
- [pg_query](#function.pg-query) — Ejecuta una consulta PostgreSQL
- [pg_query_params](#function.pg-query-params) — Envía un comando al servidor y espera el resultado, con la capacidad de
  pasar parámetros por separado del texto SQL de la consulta
- [pg_result_error](#function.pg-result-error) — Lee el mensaje de error asociado a un resultado
- [pg_result_error_field](#function.pg-result-error-field) — Devuelve un campo individual de un informe de error
- [pg_result_memory_size](#function.pg-result-memory-size) — Devuelve la cantidad de memoria asignada para un resultado de consulta
- [pg_result_seek](#function.pg-result-seek) — Establece la posición de la línea en un resultado
- [pg_result_status](#function.pg-result-status) — Lee el estado del resultado
- [pg_select](#function.pg-select) — Realiza una selección PostgreSQL
- [pg_send_execute](#function.pg-send-execute) — Envía una consulta para ejecutar una consulta preparada con parámetros dados, sin esperar el(los) resultado(s)
- [pg_send_prepare](#function.pg-send-prepare) — Envía una solicitud para crear una consulta preparada con los argumentos
  dados, sin esperar el final de su ejecución
- [pg_send_query](#function.pg-send-query) — Ejecuta una consulta PostgreSQL asíncrona
- [pg_send_query_params](#function.pg-send-query-params) — Envía un comando y separa los parámetros al servidor sin esperar el/los resultado(s)
- [pg_set_chunked_rows_size](#function.pg-set-chunked-rows-size) — Establece los resultados de la consulta a recuperar en modo chunk
- [pg_set_client_encoding](#function.pg-set-client-encoding) — Establece la codificación del cliente PostgreSQL
- [pg_set_error_context_visibility](#function.pg-set-error-context-visibility) — Determina la visibilidad de los mensajes de error de contexto devueltos por pg_last_error
  y pg_result_error
- [pg_set_error_verbosity](#function.pg-set-error-verbosity) — Determina el nivel de detalle de los mensajes devueltos por
  pg_last_error y pg_result_error
- [pg_socket](#function.pg-socket) — Obtiene un manejador de solo lectura sobre el socket subyacente de una conexión PostgreSQL
- [pg_trace](#function.pg-trace) — Activa el seguimiento de una conexión PostgreSQL
- [pg_transaction_status](#function.pg-transaction-status) — Retorna el estado de la transacción en curso del servidor
- [pg_tty](#function.pg-tty) — Devuelve el nombre de TTY asociado a la conexión
- [pg_unescape_bytea](#function.pg-unescape-bytea) — Elimina la protección de una cadena de tipo bytea
- [pg_untrace](#function.pg-untrace) — Finaliza el seguimiento de una conexión PostgreSQL
- [pg_update](#function.pg-update) — Modifica las líneas de una tabla
- [pg_version](#function.pg-version) — Devuelve un array con las versiones del cliente, del protocolo y del servidor (si está disponible)
  </li>- [PgSql\Connection](#class.pgsql-connection) — La clase PgSql\Connection
- [PgSql\Result](#class.pgsql-result) — La clase PgSql\Result
- [PgSql\Lob](#class.pgsql-lob) — La clase PgSql\Lob
