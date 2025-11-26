# Firebird/InterBase

# Introducción

**Advertencia**

    Esta extensión es considerada muerta y no mantenida. Sin embargo, el código
        fuente de esta extensión sigue disponible en el GIT
        de PECL:
    [» https://github.com/php/pecl-database-interbase](https://github.com/php/pecl-database-interbase).

Firebird es una base de datos relacional que ofrece la mayoría de las funcionalidades
descritas en la norma ISO SQL-2003, que funciona en entornos Linux, Windows,
y la mayoría de los sistemas Unix. Firebird ofrece una excelente simultaneidad,
alto rendimiento y un lenguaje eficiente para la escritura de procedimientos almacenados y
disparadores. Se utiliza en sistemas de producción desde 1981.

Interbase es el nombre de la variante comercial de esta base de datos
creada por Embarcadero/Inprise. Para más información sobre Interbase, vaya a
[» http://www.embarcadero.com/products/interbase](http://www.embarcadero.com/products/interbase).

Firebird es un proyecto comercialmente independiente (fundación) de programadores C++,
asesores técnicos, que apoyan el desarrollo y aseguran la
compatibilidad multiplataforma de la base de datos relacional basada en el
código fuente ofrecido por Inprise Corp. (ahora conocido como Embarcadero)
bajo la licencia "InterBase Public License v.1.0 el 25 de julio de 2000".
Para más información sobre Firebird, vaya a [» http://www.firebirdsql.org/](http://www.firebirdsql.org/).

**Nota**:

    Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.4.0




    Esta extensión soporta Interbase versión 6 y posteriores, así como
    Firebird versión 2 y posteriores.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#ibase.installation)
- [Configuración en tiempo de ejecución](#ibase.configuration)

## Instalación

Esta extensión ha sido movida al módulo [» PECL](https://pecl.php.net/) y no será integrada en PHP a partir de PHP 7.4.0

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://github.com/FirebirdSQL/php-firebird](https://github.com/FirebirdSQL/php-firebird).

Para activar el soporte de Firebird/InterBase, es necesario compilar PHP
con la opción
**--with-interbase[=DIR]**, donde DIR
es el directorio de instalación de Firebird/InterBase (que por omisión es
/usr).

**Nota**:
**Nota para usuarios Win32/Win64**

Para hacer funcionar esta extensión, algunas bibliotecas
DLL deben estar disponibles a través del
PATH del sistema Windows. Lea la
F.A.Q titulada
"[Cómo agregar mi carpeta
PHP a mi PATH de Windows](#faq.installation.addtopath)" para más información. Copiar las bibliotecas DLL desde la
carpeta PHP a la carpeta del sistema de Windows también funciona (ya que la carpeta del sistema está por defecto en el
PATH del sistema), pero este método no es recomendado.
_Esta extensión requiere que los siguientes archivos estén en el
PATH:_
fbclient.dll,gds32.dll

Si se instala un servidor Firebird/InterBase en la misma máquina que la que ejecuta PHP, ya se tendrá esta
biblioteca y fbclient.dll,gds32.dll
(gds32.dll se genera desde el instalador)
debería estar ya en su PATH.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración iBase**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


     [ibase.allow_persistent](#ini.ibase.allow-persistent)
     "1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [ibase.max_persistent](#ini.ibase.max-persistent)
     "-1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [ibase.max_links](#ini.ibase.max-links)
     "-1"
     **[INI_SYSTEM](#constant.ini-system)**
      



     [ibase.default_db](#ini.ibase.default-db)
     NULL
     **[INI_SYSTEM](#constant.ini-system)**
      



     [ibase.default_user](#ini.ibase.default-user)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [ibase.default_password](#ini.ibase.default-password)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [ibase.default_charset](#ini.ibase.default-charset)
     NULL
     **[INI_ALL](#constant.ini-all)**
      



     [ibase.timestampformat](#ini.ibase.timestampformat)
     "%Y-%m-%d %H:%M:%S"
     **[INI_ALL](#constant.ini-all)**
      



     [ibase.dateformat](#ini.ibase.dateformat)
     "%Y-%m-%d"
     **[INI_ALL](#constant.ini-all)**
      



     [ibase.timeformat](#ini.ibase.timeformat)
     "%H:%M:%S"
     **[INI_ALL](#constant.ini-all)**
      

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    ibase.allow_persistent
    [bool](#language.types.boolean)



     Acepta o no las
     [conexiones persistentes](#features.persistent-connections)
     a Firebird/Interbase.








    ibase.max_persistent
    [int](#language.types.integer)



     El número máximo de conexiones persistentes Firebird/Interbase por proceso.
     Las nuevas conexiones con [ibase_pconnect()](#function.ibase-pconnect)
     no serán persistentes si se alcanza este número máximo.








    ibase.max_links
    [int](#language.types.integer)



     El número máximo de conexiones Firebird/Interbase por proceso, incluyendo las
     conexiones persistentes.







    ibase.default_db
    [string](#language.types.string)



     El nombre de la base de datos por defecto cuando ibase_[p]connect() es llamado
     sin una base de datos específica. Si este valor está definido y el modo seguro
     SQL está activado, no se permitirá la conexión a otras bases de datos que no sean esta.







    ibase.default_user
    [string](#language.types.string)



     El nombre de usuario utilizado al conectar a la base de datos cuando no se especifica ninguno.








    ibase.default_password
    [string](#language.types.string)



     La contraseña utilizada al conectar a la base de datos cuando no se especifica ninguna.







    ibase.default_charset
    [string](#language.types.string)



     El conjunto de caracteres utilizado al conectar a la base de datos cuando no se especifica ninguno.










    ibase.timestampformat
    [string](#language.types.string)










    ibase.dateformat
    [string](#language.types.string)










    ibase.timeformat
    [string](#language.types.string)



     Estas directivas se utilizan para definir los formatos de fechas y horas que serán
     utilizados cuando las fechas/horas sean devueltas de un conjunto de resultados, o cuando
     se procesen argumentos en parámetros de fechas/horas.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las constantes siguientes pueden ser pasadas a [ibase_trans()](#function.ibase-trans)
para especificar el comportamiento de las transacciones.

   <caption>**Constantes Firebird/InterBase**</caption>
   
    
     
      Constante
      Descripción


      IBASE_DEFAULT

       Define el comportamiento por omisión. Este comportamiento es determinado por la biblioteca cliente,
       que es definida como IBASE_WRITE|IBASE_CONCURRENCY|IBASE_WAIT en
       la mayoría de los casos.




      IBASE_READ
      Inicia una transacción en modo de solo lectura



      IBASE_WRITE
      Inicia una transacción en modo de lectura / escritura



      IBASE_CONSISTENCY

       Inicia una transacción con el nivel de aislamiento definido a
       'consistency', lo que significa que la transacción actual
       no puede leer desde tablas que han sido modificadas por otras transacciones.




      IBASE_CONCURRENCY

       Inicia una transacción con el nivel de aislamiento definido a
       'concurrency' (o 'snapshot'), lo que significa
       que la transacción puede acceder a todas las tablas, pero no puede ver las
       modificaciones realizadas por otras transacciones una vez que la transacción
       ha comenzado.




      IBASE_COMMITTED

       Inicia una transacción con el nivel de aislamiento definido a
       'read committed'. Este flag debe ser asociado con
       la constante **[IBASE_REC_VERSION](#constant.ibase-rec-version)** o
       la constante **[IBASE_REC_NO_VERSION](#constant.ibase-rec-no-version)**.
       Este nivel de aislamiento permite acceder a las modificaciones realizadas
       después del inicio de la transacción. Si la constante
       **[IBASE_REC_NO_VERSION](#constant.ibase-rec-no-version)** es especificada,
       solo la última versión de las filas podrá ser leída.
       Si la constante **[IBASE_REC_VERSION](#constant.ibase-rec-version)** es especificada,
       una fila puede ser leída siempre que una modificación esté pendiente en
       una transacción concurrente.




      IBASE_WAIT

       Indica que la transacción puede esperar y luego reintentar cuando aparece un conflicto.




      IBASE_NOWAIT

       Indica que la transacción fallará inmediatamente cuando aparece un conflicto.



Las constantes siguientes pueden ser pasadas a las funciones
[ibase_fetch_row()](#function.ibase-fetch-row),
[ibase_fetch_assoc()](#function.ibase-fetch-assoc) o [ibase_fetch_object()](#function.ibase-fetch-object)
para especificar sus comportamientos.

   <caption>**Constantes Firebird/InterBase**</caption>
   
    
     
      Constante
      Descripción


      IBASE_FETCH_BLOBS

       También disponible bajo el nombre **[IBASE_TEXT](#constant.ibase-text)** por razones de
       compatibilidad ascendente.
       Permite leer el contenido de un BLOB "inline" en lugar
       de recorrerlo utilizando un identificador de BLOB.




      IBASE_FETCH_ARRAYS

       Permite leer un array "inline".
       De lo contrario, los identificadores de arrays son devueltos.
       Los identificadores de arrays solo pueden ser pasados como argumentos
       a las consultas INSERT, ya que ninguna función para manejar los identificadores de arrays
       está actualmente disponible.




      IBASE_UNIXTIME

       Permite devolver los campos de fecha y hora no como strings
       sino como timestamps UNIX (el número de segundos desde la época UNIX, que
       es el 1-Jan-1970 0:00 UTC). Esto puede ser problemático si se utilizan fechas
       anteriores a 1970 en algunos sistemas.



Las constantes siguientes son utilizadas para pasar consultas y opciones a
la API ([ibase_server_info()](#function.ibase-server-info), [ibase_db_info()](#function.ibase-db-info),
[ibase_backup()](#function.ibase-backup), [ibase_restore()](#function.ibase-restore) y
[ibase_maintain_db()](#function.ibase-maintain-db)).
Consulte el manual de Firebird/InterBase para más información
sobre el significado de estas opciones.

     **[IBASE_BKP_IGNORE_CHECKSUMS](#constant.ibase-bkp-ignore-checksums)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_IGNORE_LIMBO](#constant.ibase-bkp-ignore-limbo)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_METADATA_ONLY](#constant.ibase-bkp-metadata-only)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_NO_GARBAGE_COLLECT](#constant.ibase-bkp-no-garbage-collect)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_OLD_DESCRIPTIONS](#constant.ibase-bkp-old-descriptions)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_NON_TRANSPORTABLE](#constant.ibase-bkp-non-transportable)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_BKP_CONVERT](#constant.ibase-bkp-convert)**



      Opciones para [ibase_backup()](#function.ibase-backup)





     **[IBASE_RES_DEACTIVATE_IDX](#constant.ibase-res-deactivate-idx)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_RES_NO_SHADOW](#constant.ibase-res-no-shadow)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_RES_NO_VALIDITY](#constant.ibase-res-no-validity)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_RES_ONE_AT_A_TIME](#constant.ibase-res-one-at-a-time)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_RES_REPLACE](#constant.ibase-res-replace)**








     **[IBASE_RES_CREATE](#constant.ibase-res-create)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_RES_USE_ALL_SPACE](#constant.ibase-res-use-all-space)**



      Opciones para [ibase_restore()](#function.ibase-restore)





     **[IBASE_PRP_PAGE_BUFFERS](#constant.ibase-prp-page-buffers)**








     **[IBASE_PRP_SWEEP_INTERVAL](#constant.ibase-prp-sweep-interval)**








     **[IBASE_PRP_SHUTDOWN_DB](#constant.ibase-prp-shutdown-db)**








     **[IBASE_PRP_DENY_NEW_TRANSACTIONS](#constant.ibase-prp-deny-new-transactions)**








     **[IBASE_PRP_DENY_NEW_ATTACHMENTS](#constant.ibase-prp-deny-new-attachments)**








     **[IBASE_PRP_RESERVE_SPACE](#constant.ibase-prp-reserve-space)**








     **[IBASE_PRP_RES_USE_FULL](#constant.ibase-prp-res-use-full)**








     **[IBASE_PRP_RES](#constant.ibase-prp-res)**








     **[IBASE_PRP_WRITE_MODE](#constant.ibase-prp-write-mode)**








     **[IBASE_PRP_WM_ASYNC](#constant.ibase-prp-wm-async)**








     **[IBASE_PRP_WM_SYNC](#constant.ibase-prp-wm-sync)**








     **[IBASE_PRP_ACCESS_MODE](#constant.ibase-prp-access-mode)**








     **[IBASE_PRP_AM_READONLY](#constant.ibase-prp-am-readonly)**








     **[IBASE_PRP_AM_READWRITE](#constant.ibase-prp-am-readwrite)**








     **[IBASE_PRP_SET_SQL_DIALECT](#constant.ibase-prp-set-sql-dialect)**








     **[IBASE_PRP_ACTIVATE](#constant.ibase-prp-activate)**








     **[IBASE_PRP_DB_ONLINE](#constant.ibase-prp-db-online)**








     **[IBASE_RPR_CHECK_DB](#constant.ibase-rpr-check-db)**








     **[IBASE_RPR_IGNORE_CHECKSUM](#constant.ibase-rpr-ignore-checksum)**








     **[IBASE_RPR_KILL_SHADOWS](#constant.ibase-rpr-kill-shadows)**








     **[IBASE_RPR_MEND_DB](#constant.ibase-rpr-mend-db)**








     **[IBASE_RPR_VALIDATE_DB](#constant.ibase-rpr-validate-db)**








     **[IBASE_RPR_FULL](#constant.ibase-rpr-full)**








     **[IBASE_RPR_SWEEP_DB](#constant.ibase-rpr-sweep-db)**



      Opciones de [ibase_maintain_db()](#function.ibase-maintain-db)





     **[IBASE_STS_DATA_PAGES](#constant.ibase-sts-data-pages)**








     **[IBASE_STS_DB_LOG](#constant.ibase-sts-db-log)**








     **[IBASE_STS_HDR_PAGES](#constant.ibase-sts-hdr-pages)**








     **[IBASE_STS_IDX_PAGES](#constant.ibase-sts-idx-pages)**








     **[IBASE_STS_SYS_RELATIONS](#constant.ibase-sts-sys-relations)**



      Opciones de [ibase_db_info()](#function.ibase-db-info)





     **[IBASE_SVC_SERVER_VERSION](#constant.ibase-svc-server-version)**



      Opciones para [ibase_server_info()](#function.ibase-server-info)





     **[IBASE_SVC_IMPLEMENTATION](#constant.ibase-svc-implementation)**



      Opciones para [ibase_server_info()](#function.ibase-server-info)





     **[IBASE_SVC_GET_ENV](#constant.ibase-svc-get-env)**



      Opciones para [ibase_server_info()](#function.ibase-server-info)





     **[IBASE_SVC_GET_ENV_LOCK](#constant.ibase-svc-get-env-lock)**








     **[IBASE_SVC_GET_ENV_MSG](#constant.ibase-svc-get-env-msg)**








     **[IBASE_SVC_USER_DBPATH](#constant.ibase-svc-user-dbpath)**








     **[IBASE_SVC_SVR_DB_INFO](#constant.ibase-svc-svr-db-info)**








     **[IBASE_SVC_GET_USERS](#constant.ibase-svc-get-users)**



      Opciones para [ibase_server_info()](#function.ibase-server-info)


# Funciones Firebird/InterBase

# fbird_add_user

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_add_user — Alias de [ibase_add_user()](#function.ibase-add-user)

### Descripción

Esta función es un alias de:
[ibase_add_user()](#function.ibase-add-user).

### Ver también

    - [fbird_modify_user()](#function.fbird-modify-user) - Alias de ibase_modify_user

    - [fbird_delete_user()](#function.fbird-delete-user) - Alias de ibase_delete_user

# fbird_affected_rows

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_affected_rows — Alias de [ibase_affected_rows()](#function.ibase-affected-rows)

### Descripción

Esta función es un alias de:
[ibase_affected_rows()](#function.ibase-affected-rows).

### Ver también

    - [fbird_query()](#function.fbird-query) - Alias de ibase_query

    - [fbird_execute()](#function.fbird-execute) - Alias de ibase_execute

# fbird_backup

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_backup — Alias de [ibase_backup()](#function.ibase-backup)

### Descripción

Esta función es un alias de:
[ibase_backup()](#function.ibase-backup).

# fbird_blob_add

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_add — Alias de [ibase_blob_add()](#function.ibase-blob-add)

### Descripción

Esta función es un alias de:
[ibase_blob_add()](#function.ibase-blob-add).

### Ver también

    - [fbird_blob_cancel()](#function.fbird-blob-cancel) - Cancela la creación de un blob

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_create()](#function.fbird-blob-create) - Alias de ibase_blob_create

    - [fbird_blob_import()](#function.fbird-blob-import) - Alias de ibase_blob_import

# fbird_blob_cancel

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_cancel — Cancela la creación de un blob

### Descripción

**fbird_blob_cancel**([resource](#language.types.resource) $blob_handle): [bool](#language.types.boolean)

Esta función descartará un BLOB si no ha sido cerrado aún por
[fbird_blob_close()](#function.fbird-blob-close).

### Parámetros

     blob_handle


       Un gestor de BLOB abierto con [fbird_blob_create()](#function.fbird-blob-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_create()](#function.fbird-blob-create) - Alias de ibase_blob_create

    - [fbird_blob_import()](#function.fbird-blob-import) - Alias de ibase_blob_import

# fbird_blob_close

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_close — Alias de [ibase_blob_close()](#function.ibase-blob-close)

### Descripción

Esta función es un alias de:
[ibase_blob_close()](#function.ibase-blob-close).

### Ver también

    - [fbird_blob_create()](#function.fbird-blob-create) - Alias de ibase_blob_create

    - [fbird_blob_cancel()](#function.fbird-blob-cancel) - Cancela la creación de un blob

    - [fbird_blob_open()](#function.fbird-blob-open) - Alias de ibase_blob_open

    - [fbird_blob_import()](#function.fbird-blob-import) - Alias de ibase_blob_import

# fbird_blob_create

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_create — Alias de [ibase_blob_create()](#function.ibase-blob-create)

### Descripción

Esta función es un alias de:
[ibase_blob_create()](#function.ibase-blob-create).

### Ver también

    - [fbird_blob_add()](#function.fbird-blob-add) - Alias de ibase_blob_add

    - [fbird_blob_cancel()](#function.fbird-blob-cancel) - Cancela la creación de un blob

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_import()](#function.fbird-blob-import) - Alias de ibase_blob_import

# fbird_blob_echo

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_echo — Alias de [ibase_blob_echo()](#function.ibase-blob-echo)

### Descripción

Esta función es un alias de:
[ibase_blob_echo()](#function.ibase-blob-echo).

### Ver también

    - [fbird_blob_open()](#function.fbird-blob-open) - Alias de ibase_blob_open

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_get()](#function.fbird-blob-get) - Alias de ibase_blob_get

# fbird_blob_get

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_get — Alias de [ibase_blob_get()](#function.ibase-blob-get)

### Descripción

Esta función es un alias de:
[ibase_blob_get()](#function.ibase-blob-get).

### Ver también

    - [fbird_blob_open()](#function.fbird-blob-open) - Alias de ibase_blob_open

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_echo()](#function.fbird-blob-echo) - Alias de ibase_blob_echo

# fbird_blob_import

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_import — Alias de [ibase_blob_import()](#function.ibase-blob-import)

### Descripción

Esta función es un alias de:
[ibase_blob_import()](#function.ibase-blob-import).

### Ver también

    - [fbird_blob_add()](#function.fbird-blob-add) - Alias de ibase_blob_add

    - [fbird_blob_cancel()](#function.fbird-blob-cancel) - Cancela la creación de un blob

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_create()](#function.fbird-blob-create) - Alias de ibase_blob_create

# fbird_blob_info

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_info — Alias de [ibase_blob_info()](#function.ibase-blob-info)

### Descripción

Esta función es un alias de:
[ibase_blob_info()](#function.ibase-blob-info).

# fbird_blob_open

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_blob_open — Alias de [ibase_blob_open()](#function.ibase-blob-open)

### Descripción

Esta función es un alias de:
[ibase_blob_open()](#function.ibase-blob-open).

### Ver también

    - [fbird_blob_close()](#function.fbird-blob-close) - Alias de ibase_blob_close

    - [fbird_blob_echo()](#function.fbird-blob-echo) - Alias de ibase_blob_echo

    - [fbird_blob_get()](#function.fbird-blob-get) - Alias de ibase_blob_get

# fbird_close

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_close — Alias de [ibase_close()](#function.ibase-close)

### Descripción

Esta función es un alias de:
[ibase_close()](#function.ibase-close).

### Ver también

    - [fbird_connect()](#function.fbird-connect) - Alias de ibase_connect

    - [fbird_pconnect()](#function.fbird-pconnect) - Alias de ibase_pconnect

# fbird_commit

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_commit — Alias de [ibase_commit()](#function.ibase-commit)

### Descripción

Esta función es un alias de:
[ibase_commit()](#function.ibase-commit).

# fbird_commit_ret

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_commit_ret — Alias de [ibase_commit_ret()](#function.ibase-commit-ret)

### Descripción

Esta función es un alias de:
[ibase_commit_ret()](#function.ibase-commit-ret).

# fbird_connect

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_connect — Alias de [ibase_connect()](#function.ibase-connect)

### Descripción

Esta función es un alias de:
[ibase_connect()](#function.ibase-connect).

### Ver también

    - [fbird_pconnect()](#function.fbird-pconnect) - Alias de ibase_pconnect

    - [fbird_close()](#function.fbird-close) - Alias de ibase_close

# fbird_db_info

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_db_info — Alias de [ibase_db_info()](#function.ibase-db-info)

### Descripción

Esta función es un alias de:
[ibase_db_info()](#function.ibase-db-info).

# fbird_delete_user

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_delete_user — Alias de [ibase_delete_user()](#function.ibase-delete-user)

### Descripción

Esta función es un alias de:
[ibase_delete_user()](#function.ibase-delete-user).

### Ver también

    - [fbird_add_user()](#function.fbird-add-user) - Alias de ibase_add_user

    - [fbird_modify_user()](#function.fbird-modify-user) - Alias de ibase_modify_user

# fbird_drop_db

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_drop_db — Alias de [ibase_drop_db()](#function.ibase-drop-db)

### Descripción

Esta función es un alias de:
[ibase_drop_db()](#function.ibase-drop-db).

### Ver también

    - [fbird_connect()](#function.fbird-connect) - Alias de ibase_connect

    - [fbird_pconnect()](#function.fbird-pconnect) - Alias de ibase_pconnect

# fbird_errcode

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_errcode — Alias de [ibase_errcode()](#function.ibase-errcode)

### Descripción

Esta función es un alias de:
[ibase_errcode()](#function.ibase-errcode).

### Ver también

    - [fbird_errmsg()](#function.fbird-errmsg) - Alias de ibase_errmsg

# fbird_errmsg

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_errmsg — Alias de [ibase_errmsg()](#function.ibase-errmsg)

### Descripción

Esta función es un alias de:
[ibase_errmsg()](#function.ibase-errmsg).

### Ver también

    - [fbird_errcode()](#function.fbird-errcode) - Alias de ibase_errcode

# fbird_execute

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_execute — Alias de [ibase_execute()](#function.ibase-execute)

### Descripción

Esta función es un alias de:
[ibase_execute()](#function.ibase-execute).

### Ver también

    - [fbird_query()](#function.fbird-query) - Alias de ibase_query

# fbird_fetch_assoc

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_fetch_assoc — Alias de [ibase_fetch_assoc()](#function.ibase-fetch-assoc)

### Descripción

Esta función es un alias de:
[ibase_fetch_assoc()](#function.ibase-fetch-assoc).

### Ver también

    - [fbird_fetch_row()](#function.fbird-fetch-row) - Alias de ibase_fetch_row

    - [fbird_fetch_object()](#function.fbird-fetch-object) - Alias de ibase_fetch_object

# fbird_fetch_object

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_fetch_object — Alias de [ibase_fetch_object()](#function.ibase-fetch-object)

### Descripción

Esta función es un alias de:
[ibase_fetch_object()](#function.ibase-fetch-object).

### Ver también

    - [fbird_fetch_row()](#function.fbird-fetch-row) - Alias de ibase_fetch_row

    - [fbird_fetch_assoc()](#function.fbird-fetch-assoc) - Alias de ibase_fetch_assoc

# fbird_fetch_row

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_fetch_row — Alias de [ibase_fetch_row()](#function.ibase-fetch-row)

### Descripción

Esta función es un alias de:
[ibase_fetch_row()](#function.ibase-fetch-row).

### Ver también

    - [fbird_fetch_assoc()](#function.fbird-fetch-assoc) - Alias de ibase_fetch_assoc

    - [fbird_fetch_object()](#function.fbird-fetch-object) - Alias de ibase_fetch_object

# fbird_field_info

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_field_info — Alias de [ibase_field_info()](#function.ibase-field-info)

### Descripción

Esta función es un alias de:
[ibase_field_info()](#function.ibase-field-info).

### Ver también

    - [fbird_num_fields()](#function.fbird-num-fields) - Alias de ibase_num_fields

# fbird_free_event_handler

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_free_event_handler — Alias de [ibase_free_event_handler()](#function.ibase-free-event-handler)

### Descripción

Esta función es un alias de:
[ibase_free_event_handler()](#function.ibase-free-event-handler).

### Ver también

    - [fbird_set_event_handler()](#function.fbird-set-event-handler) - Alias de ibase_set_event_handler

# fbird_free_query

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_free_query — Alias de [ibase_free_query()](#function.ibase-free-query)

### Descripción

Esta función es un alias de:
[ibase_free_query()](#function.ibase-free-query).

# fbird_free_result

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_free_result — Alias de [ibase_free_result()](#function.ibase-free-result)

### Descripción

Esta función es un alias de:
[ibase_free_result()](#function.ibase-free-result).

# fbird_gen_id

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_gen_id — Alias de [ibase_gen_id()](#function.ibase-gen-id)

### Descripción

Esta función es un alias de:
[ibase_gen_id()](#function.ibase-gen-id).

# fbird_maintain_db

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_maintain_db — Alias de [ibase_maintain_db()](#function.ibase-maintain-db)

### Descripción

Esta función es un alias de:
[ibase_maintain_db()](#function.ibase-maintain-db).

# fbird_modify_user

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_modify_user — Alias de [ibase_modify_user()](#function.ibase-modify-user)

### Descripción

Esta función es un alias de:
[ibase_modify_user()](#function.ibase-modify-user).

### Ver también

    - [fbird_add_user()](#function.fbird-add-user) - Alias de ibase_add_user

    - [fbird_delete_user()](#function.fbird-delete-user) - Alias de ibase_delete_user

# fbird_name_result

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_name_result — Alias de [ibase_name_result()](#function.ibase-name-result)

### Descripción

Esta función es un alias de:
[ibase_name_result()](#function.ibase-name-result).

### Ver también

    - [fbird_prepare()](#function.fbird-prepare) - Alias de ibase_prepare

    - [fbird_execute()](#function.fbird-execute) - Alias de ibase_execute

# fbird_num_fields

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_num_fields — Alias de [ibase_num_fields()](#function.ibase-num-fields)

### Descripción

Esta función es un alias de:
[ibase_num_fields()](#function.ibase-num-fields).

### Ver también

    - [fbird_field_info()](#function.fbird-field-info) - Alias de ibase_field_info

# fbird_num_params

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_num_params — Alias de [ibase_num_params()](#function.ibase-num-params)

### Descripción

Esta función es un alias de:
[ibase_num_params()](#function.ibase-num-params).

### Ver también

    - [fbird_prepare()](#function.fbird-prepare) - Alias de ibase_prepare

    - [fbird_param_info()](#function.fbird-param-info) - Alias de ibase_param_info

# fbird_param_info

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_param_info — Alias de [ibase_param_info()](#function.ibase-param-info)

### Descripción

Esta función es un alias de:
[ibase_param_info()](#function.ibase-param-info).

### Ver también

    - [fbird_field_info()](#function.fbird-field-info) - Alias de ibase_field_info

    - [fbird_num_params()](#function.fbird-num-params) - Alias de ibase_num_params

# fbird_pconnect

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_pconnect — Alias de [ibase_pconnect()](#function.ibase-pconnect)

### Descripción

Esta función es un alias de:
[ibase_pconnect()](#function.ibase-pconnect).

### Ver también

    - [fbird_close()](#function.fbird-close) - Alias de ibase_close

    - [fbird_connect()](#function.fbird-connect) - Alias de ibase_connect

# fbird_prepare

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_prepare — Alias de [ibase_prepare()](#function.ibase-prepare)

### Descripción

Esta función es un alias de:
[ibase_prepare()](#function.ibase-prepare).

# fbird_query

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_query — Alias de [ibase_query()](#function.ibase-query)

### Descripción

Esta función es un alias de:
[ibase_query()](#function.ibase-query).

### Ver también

    - [fbird_errmsg()](#function.fbird-errmsg) - Alias de ibase_errmsg

    - [fbird_fetch_row()](#function.fbird-fetch-row) - Alias de ibase_fetch_row

    - [fbird_fetch_object()](#function.fbird-fetch-object) - Alias de ibase_fetch_object

    - [fbird_free_result()](#function.fbird-free-result) - Alias de ibase_free_result

# fbird_restore

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_restore — Alias de [ibase_restore()](#function.ibase-restore)

### Descripción

Esta función es un alias de:
[ibase_restore()](#function.ibase-restore).

# fbird_rollback

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_rollback — Alias de [ibase_rollback()](#function.ibase-rollback)

### Descripción

Esta función es un alias de:
[ibase_rollback()](#function.ibase-rollback).

# fbird_rollback_ret

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_rollback_ret — Alias de [ibase_rollback_ret()](#function.ibase-rollback-ret)

### Descripción

Esta función es un alias de:
[ibase_rollback_ret()](#function.ibase-rollback-ret).

# fbird_server_info

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_server_info — Alias de [ibase_server_info()](#function.ibase-server-info)

### Descripción

Esta función es un alias de:
[ibase_server_info()](#function.ibase-server-info).

# fbird_service_attach

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_service_attach — Alias de [ibase_service_attach()](#function.ibase-service-attach)

### Descripción

Esta función es un alias de:
[ibase_service_attach()](#function.ibase-service-attach).

# fbird_service_detach

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_service_detach — Alias de [ibase_service_detach()](#function.ibase-service-detach)

### Descripción

Esta función es un alias de:
[ibase_service_detach()](#function.ibase-service-detach).

# fbird_set_event_handler

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_set_event_handler — Alias de [ibase_set_event_handler()](#function.ibase-set-event-handler)

### Descripción

Esta función es un alias de:
[ibase_set_event_handler()](#function.ibase-set-event-handler).

### Ver también

    - [fbird_free_event_handler()](#function.fbird-free-event-handler) - Alias de ibase_free_event_handler

    - [fbird_wait_event()](#function.fbird-wait-event) - Alias de ibase_wait_event

# fbird_trans

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_trans — Alias de [ibase_trans()](#function.ibase-trans)

### Descripción

Esta función es un alias de:
[ibase_trans()](#function.ibase-trans).

# fbird_wait_event

(PHP 5, PHP 7 &lt; 7.4.0)

fbird_wait_event — Alias de [ibase_wait_event()](#function.ibase-wait-event)

### Descripción

Esta función es un alias de:
[ibase_wait_event()](#function.ibase-wait-event).

### Ver también

    - [fbird_set_event_handler()](#function.fbird-set-event-handler) - Alias de ibase_set_event_handler

    - [fbird_free_event_handler()](#function.fbird-free-event-handler) - Alias de ibase_free_event_handler

# ibase_add_user

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_add_user — Añade un usuario a una base de datos de seguridad

### Descripción

**ibase_add_user**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $user_name,
    [string](#language.types.string) $password,
    [string](#language.types.string) $first_name = ?,
    [string](#language.types.string) $middle_name = ?,
    [string](#language.types.string) $last_name = ?
): [bool](#language.types.boolean)

### Parámetros

     service_handle


       El gestor sobre el servicio del servidor de la base de datos.






     user_name


       El identificador para el nuevo usuario de la base de datos.






     password


       La contraseña para el nuevo usuario.






     first_name


       El nombre para el nuevo usuario de la base de datos.






     middle_name


       El segundo nombre para el nuevo usuario de la base de datos.






     last_name


       El apellido para el nuevo usuario de la base de datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_modify_user()](#function.ibase-modify-user) - Modifica un usuario en una base de datos de seguridad

    - [ibase_delete_user()](#function.ibase-delete-user) - Elimina un usuario de una base de datos de seguridad

# ibase_affected_rows

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_affected_rows — Devuelve el número de filas afectadas por la última consulta iBase

### Descripción

**ibase_affected_rows**([resource](#language.types.resource) $link_identifier = ?): [int](#language.types.integer)

Devuelve el número de filas que fueron afectadas por la
última consulta (INSERT, UPDATE o DELETE) que fue ejecutada
en el contexto de transacción especificado por
link_identifier.

### Parámetros

     link_identifier


       Un contexto de transacción. Si link_identifier
       es un recurso de conexión, se utiliza la transacción por omisión.





### Valores devueltos

Devuelve el número de filas, en forma de un [int](#language.types.integer).

### Ver también

    - [ibase_query()](#function.ibase-query) - Ejecuta una consulta en una base iBase

    - [ibase_execute()](#function.ibase-execute) - Ejecuta una consulta iBase preparada

# ibase_backup

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_backup — Inicia una tarea de respaldo en el gestor de servicios y devuelve inmediatamente

### Descripción

**ibase_backup**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $source_db,
    [string](#language.types.string) $dest_file,
    [int](#language.types.integer) $options = 0,
    [bool](#language.types.boolean) $verbose = **[false](#constant.false)**
): [mixed](#language.types.mixed)

Esta función transmite los argumentos al servidor de base de datos (remoto).
Allí, comienza un nuevo proceso de respaldo.
Por consiguiente, no se obtendrá ninguna respuesta.

### Parámetros

     service_handle


       Una conexión al servidor de base de datos creada previamente.






     source_db


       La ruta absoluta hacia la base de datos en el servidor de base de datos.
       También se puede utilizar un alias de base de datos.






     dest_file


       La ruta absoluta hacia el fichero de respaldo en el servidor de base de datos.






     options


       Opciones adicionales a transmitir al servidor de base de datos
       para el respaldo.
       El parámetro options puede ser una combinación
       de las siguientes constantes:
       **[IBASE_BKP_IGNORE_CHECKSUMS](#constant.ibase-bkp-ignore-checksums)**,
       **[IBASE_BKP_IGNORE_LIMBO](#constant.ibase-bkp-ignore-limbo)**,
       **[IBASE_BKP_METADATA_ONLY](#constant.ibase-bkp-metadata-only)**,
       **[IBASE_BKP_NO_GARBAGE_COLLECT](#constant.ibase-bkp-no-garbage-collect)**,
       **[IBASE_BKP_OLD_DESCRIPTIONS](#constant.ibase-bkp-old-descriptions)**,
       **[IBASE_BKP_NON_TRANSPORTABLE](#constant.ibase-bkp-non-transportable)** o
       **[IBASE_BKP_CONVERT](#constant.ibase-bkp-convert)**.
       Leer la sección sobre [Constantes predefinidas](#ibase.constants) para
       más información.






     verbose


       Dado que el proceso de respaldo se realiza en el servidor
       de base de datos, no se tiene ninguna posibilidad de obtener su salida.
       Este argumento es inútil.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Dado que el proceso de respaldo se realiza en el servidor (remoto),
esta función solo transmite los argumentos.
Mientras los argumentos sean legales, no se obtendrá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_backup()**

&lt;?php

// Adjuntar al servidor por dirección IP y puerto.
$service = ibase_service_attach ('10.1.11.200/3050', 'sysdba', 'masterkey');

// Iniciar el proceso de respaldo en el servidor de base de datos
// Respaldar la base de datos employee utilizando la ruta completa hacia /srv/backup/employees.fbk
// No utiliza argumentos especiales
ibase_backup($service, '/srv/firebird/employees.fdb', '/srv/backup/employees.fbk');

// Liberar la conexión adjunta
ibase_service_detach ($service);
?&gt;

    **Ejemplo #2 Ejemplo de ibase_backup()** con argumentos

&lt;?php

// Adjuntar al servidor por nombre y puerto por defecto
$service = ibase_service_attach ('fb-server.contoso.local', 'sysdba', 'masterkey');

// Iniciar el proceso de respaldo en el servidor de base de datos
// Respaldar la base de datos employee utilizando un alias hacia /srv/backup/employees.fbk.
// Respaldar solo los metadatos. No crear un respaldo transportable.
ibase_backup($service, 'employees.fdb', '/srv/backup/employees.fbk', IBASE_BKP_METADATA_ONLY | IBASE_BKP_NON_TRANSPORTABLE);

// Liberar la conexión adjunta
ibase_service_detach ($service);
?&gt;

### Ver también

    - [ibase_restore()](#function.ibase-restore) - Inicia una tarea de restauración en el gestor de servicios y devuelve inmediatamente

# ibase_blob_add

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_add — Añade datos a un BLOB iBase recién creado

### Descripción

**ibase_blob_add**([resource](#language.types.resource) $blob_handle, [string](#language.types.string) $data): [void](language.types.void.html)

**ibase_blob_add()** añade los datos
data al BLOB
blob_handle, creado
con [ibase_blob_create()](#function.ibase-blob-create).

### Parámetros

     blob_handle


       Un recurso blob, abierto con la función
       [ibase_blob_create()](#function.ibase-blob-create).






     data


       Los datos a añadir.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [ibase_blob_cancel()](#function.ibase-blob-cancel) - Cancela la creación de un BLOB iBase

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_create()](#function.ibase-blob-create) - Crea un BLOB iBase para añadir datos

    - [ibase_blob_import()](#function.ibase-blob-import) - Crea un BLOB iBase, copia un fichero y lo cierra

# ibase_blob_cancel

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_cancel — Cancela la creación de un BLOB iBase

### Descripción

**ibase_blob_cancel**([resource](#language.types.resource) $blob_handle): [bool](#language.types.boolean)

**ibase_blob_cancel()** cancela la creación del BLOB
blob_handle, creado por
[ibase_blob_create()](#function.ibase-blob-create) si no ha sido cerrado aún
con [ibase_blob_close()](#function.ibase-blob-close).

### Parámetros

     blob_handle


       Un recurso blob, abierto con la función
       [ibase_blob_create()](#function.ibase-blob-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_create()](#function.ibase-blob-create) - Crea un BLOB iBase para añadir datos

    - [ibase_blob_import()](#function.ibase-blob-import) - Crea un BLOB iBase, copia un fichero y lo cierra

# ibase_blob_close

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_close — Cierra un BLOB iBase

### Descripción

**ibase_blob_close**([resource](#language.types.resource) $blob_handle): [mixed](#language.types.mixed)

**ibase_blob_close()** cierra el BLOB
blob_handle, abierto en lectura
con **ibase_open_blob()** o en escritura con
[ibase_blob_create()](#function.ibase-blob-create).

### Parámetros

     blob_handle


       Un recurso blob, abierto con la función
       [ibase_blob_create()](#function.ibase-blob-create) o la función
       [ibase_blob_open()](#function.ibase-blob-open).





### Valores devueltos

Si el BLOB fue leído, **ibase_blob_close()** devuelve **[true](#constant.true)**
en caso de éxito, si estaba siendo modificado,
**ibase_blob_close()** devuelve un string
que contiene el identificador del BLOB que le fue asignado por la base de datos.
En caso de fallo, esta función devolverá **[false](#constant.false)**.

### Ver también

    - [ibase_blob_cancel()](#function.ibase-blob-cancel) - Cancela la creación de un BLOB iBase

    - [ibase_blob_open()](#function.ibase-blob-open) - Abre un BLOB iBase para recuperar partes de datos

# ibase_blob_create

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_create — Crea un BLOB iBase para añadir datos

### Descripción

**ibase_blob_create**([resource](#language.types.resource) $link_identifier = **[null](#constant.null)**): [resource](#language.types.resource)|[false](#language.types.singleton)

**ibase_blob_create()** crea un nuevo BLOB
para llenar con datos, en la conexión InterBase
link_identifier.

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última
       conexión abierta.





### Valores devueltos

Devuelve un identificador de BLOB para usar con
[ibase_blob_add()](#function.ibase-blob-add) o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_blob_add()](#function.ibase-blob-add) - Añade datos a un BLOB iBase recién creado

    - [ibase_blob_cancel()](#function.ibase-blob-cancel) - Cancela la creación de un BLOB iBase

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_import()](#function.ibase-blob-import) - Crea un BLOB iBase, copia un fichero y lo cierra

# ibase_blob_echo

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_echo — Muestra el contenido de un BLOB iBase en el navegador

### Descripción

**ibase_blob_echo**([string](#language.types.string) $blob_id): [bool](#language.types.boolean)

**ibase_blob_echo**([resource](#language.types.resource) $link_identifier, [string](#language.types.string) $blob_id): [bool](#language.types.boolean)

**ibase_blob_echo()** abre el BLOB
blob_id en lectura y envía su contenido directamente
a la salida estándar (el navegador en la mayoría de los casos).

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última conexión abierta.






     blob_id







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_blob_open()](#function.ibase-blob-open) - Abre un BLOB iBase para recuperar partes de datos

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_get()](#function.ibase-blob-get) - Lee len bytes de datos en un BLOB iBase abierto

# ibase_blob_get

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_get — Lee len bytes de datos en un BLOB iBase abierto

### Descripción

**ibase_blob_get**([resource](#language.types.resource) $blob_handle, [int](#language.types.integer) $len): [string](#language.types.string)

**ibase_blob_get()** devuelve como máximo len
bytes del BLOB blob_handle
que ha sido abierto en lectura por [ibase_blob_open()](#function.ibase-blob-open).

**Nota**:

    No es posible leer en un BLOB abierto en escritura por
    [ibase_blob_create()](#function.ibase-blob-create).

### Parámetros

     blob_handle


       Un recurso blob, abierto con la función
       [ibase_blob_open()](#function.ibase-blob-open).






     len


       El tamaño de los datos devueltos.





### Valores devueltos

Devuelve como máximo, len bytes del BLOB, o
**[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_blob_get()**

&lt;?php
$result    = ibase_query("SELECT blob_value FROM table");
$data = ibase_fetch_object($result);
$blob_data = ibase_blob_info($data-&gt;BLOB_VALUE);
$blob_hndl = ibase_blob_open($data-&gt;BLOB_VALUE);
echo         ibase_blob_get($blob_hndl, $blob_data[0]);
?&gt;

Este ejemplo no hace más que un
ibase_blob_echo( $data-&gt;BLOB_VALUE ), pero muestra cómo recuperar la información en una $variable para manipularla como se desee.

### Ver también

    - [ibase_blob_open()](#function.ibase-blob-open) - Abre un BLOB iBase para recuperar partes de datos

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_echo()](#function.ibase-blob-echo) - Muestra el contenido de un BLOB iBase en el navegador

# ibase_blob_import

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_import — Crea un BLOB iBase, copia un fichero y lo cierra

### Descripción

**ibase_blob_import**([resource](#language.types.resource) $link_identifier, [resource](#language.types.resource) $file_handle): [string](#language.types.string)

**ibase_blob_import**([resource](#language.types.resource) $file_handle): [string](#language.types.string)

**ibase_blob_import()** crea un nuevo BLOB
en la conexión iBase link_identifier,
copia el fichero file_handle en su totalidad, lo cierra y
devuelve el identificador asignado

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última
       conexión abierta.






     file_handle


       El recurso de fichero, devuelto por la función
       [fopen()](#function.fopen).





### Valores devueltos

Devuelve el identificador del BLOB en caso de éxito, o **[false](#constant.false)**
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_blob_import()**

&lt;?php
$dbh = ibase_connect($host, $username, $password);
$filename = '/tmp/bar';

$fd = fopen($filename, 'r');
if ($fd) {

    $blob = ibase_blob_import($dbh, $fd);
    fclose($fd);

    if (!is_string($blob)) {
        // fallo en la importación
    } else {
        $query = "INSERT INTO foo (name, data) VALUES ('$filename', ?)";
        $prepared = ibase_prepare($dbh, $query);
        if (!ibase_execute($prepared, $blob)) {
            // fallo en la inserción del registro
        }
    }

} else {
// imposible abrir el fichero
}
?&gt;

### Ver también

    - [ibase_blob_add()](#function.ibase-blob-add) - Añade datos a un BLOB iBase recién creado

    - [ibase_blob_cancel()](#function.ibase-blob-cancel) - Cancela la creación de un BLOB iBase

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_create()](#function.ibase-blob-create) - Crea un BLOB iBase para añadir datos

# ibase_blob_info

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_info — Devuelve el tamaño de un BLOB iBase y otra información útil

### Descripción

**ibase_blob_info**([resource](#language.types.resource) $link_identifier, [string](#language.types.string) $blob_id): [array](#language.types.array)

**ibase_blob_info**([string](#language.types.string) $blob_id): [array](#language.types.array)

Devuelve el tamaño de un BLOB iBase y otra información útil.

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última conexión abierta.






     blob_id


       El identificador del BLOB.





### Valores devueltos

Devuelve un array que contiene información sobre el BLOB blob_id. La información incluye el tamaño del BLOB, el número de segmentos que contiene, el tamaño del segmento más grande y si se trata de un BLOB stream o segmentado.

# ibase_blob_open

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_blob_open — Abre un BLOB iBase para recuperar partes de datos

### Descripción

**ibase_blob_open**([resource](#language.types.resource) $link_identifier, [string](#language.types.string) $blob_id): [resource](#language.types.resource)|[false](#language.types.singleton)

**ibase_blob_open**([string](#language.types.string) $blob_id): [resource](#language.types.resource)|[false](#language.types.singleton)

Abre un BLOB iBase para recuperar partes de datos.

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última conexión abierta.






     blob_id


       El identificador del BLOB.





### Valores devueltos

Devuelve un recurso BLOB para su uso con la función
[ibase_blob_get()](#function.ibase-blob-get) o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_blob_close()](#function.ibase-blob-close) - Cierra un BLOB iBase

    - [ibase_blob_echo()](#function.ibase-blob-echo) - Muestra el contenido de un BLOB iBase en el navegador

    - [ibase_blob_get()](#function.ibase-blob-get) - Lee len bytes de datos en un BLOB iBase abierto

# ibase_close

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_close — Cierra una conexión a una base de datos Interbase

### Descripción

**ibase_close**([resource](#language.types.resource) $connection_id = **[null](#constant.null)**): [bool](#language.types.boolean)

Cierra una conexión a una base de datos Interbase. Esta función toma
como argumento el identificador de conexión connection_id
devuelto por [ibase_connect()](#function.ibase-connect). Las transacciones por omisión
son validadas y las otras son anuladas.

### Parámetros

     connection_id


       Un identificador de conexión a InterBase, devuelto por la función
       [ibase_connect()](#function.ibase-connect). Si es omitido, la última
       conexión abierta será utilizada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_connect()](#function.ibase-connect) - Abre una conexión a una base de datos

    - [ibase_pconnect()](#function.ibase-pconnect) - Abre una conexión persistente a una base de datos InterBase

# ibase_commit

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_commit — Valida una transacción iBase

### Descripción

**ibase_commit**([resource](#language.types.resource) $link_or_trans_identifier = **[null](#constant.null)**): [bool](#language.types.boolean)

Valida una transacción iBase.

### Parámetros

     link_or_trans_identifier


       Llamada sin argumento,
       valida la transacción por omisión de la conexión
       por omisión. Si el argumento link_or_trans_identifier
       es un identificador de conexión, su transacción por omisión
       es validada. Si el argumento link_or_trans_identifier es un
       identificador de transacción, esta será validada.
       El contexto de la transacción será retenido y, por lo tanto, las consultas ejecutadas
       en esta transacción no serán invalidadas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_commit_ret

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_commit_ret — Valida una transacción iBase sin cerrarla

### Descripción

**ibase_commit_ret**([resource](#language.types.resource) $link_or_trans_identifier = **[null](#constant.null)**): [bool](#language.types.boolean)

Valida una transacción iBase sin cerrarla.

### Parámetros

     link_or_trans_identifier


       Llamada sin argumento,
       valida la transacción por omisión de la conexión
       por omisión. Si el argumento link_or_trans_identifier
       es un identificador de conexión, su transacción por omisión
       es validada. Si el argumento link_or_trans_identifier es un
       identificador de transacción, esta será validada.
       El contexto de la transacción será retenido y, por lo tanto, las consultas ejecutadas
       en esta transacción no serán invalidadas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_connect

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_connect — Abre una conexión a una base de datos

### Descripción

**ibase_connect**(
    [string](#language.types.string) $database = ?,
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [string](#language.types.string) $charset = ?,
    [int](#language.types.integer) $buffers = ?,
    [int](#language.types.integer) $dialect = ?,
    [string](#language.types.string) $role = ?,
    [int](#language.types.integer) $sync = ?
): [resource](#language.types.resource)

Abre una conexión a una base de datos Firebird/InterBase.

Si se realiza una segunda llamada con **ibase_connect()**,
pasando los mismos argumentos, no se abrirá una nueva conexión,
sino que se devolverá la conexión ya abierta. La conexión
se cerrará cuando el script termine, a menos que se cierre
explícitamente con [ibase_close()](#function.ibase-close),
durante el script.

### Parámetros

     database


       database debe ser una ruta
       válida hasta un fichero de base de datos en el servidor en
       el cual reside. Si el servidor es remoto, debe ser prefijado
       con un nombre de host 'hostname:' (TCP/IP), 'hostname/port:'
       (TCP/IP con un servidor interbase en un puerto TCP personalizado), '//hostname/'
       (NetBEUI) según el protocolo de comunicación utilizado.






     username


       El nombre de usuario. Puede ser definido con la directiva
       ibase.default_user del fichero php.ini.






     password


       La contraseña correspondiente al usuario username.
       Puede ser definida con la directiva
       ibase.default_password del fichero php.ini.






     charset


       charset es el juego de caracteres por defecto
       para la base de datos.






     buffers


       buffers es el número de buffers de base a
       asignar para la caché del servidor. Si se pasa a 0 o
       se omite, el servidor lo elegirá por sí mismo.






     dialect


       dialect
       selecciona el dialecto SQL para las consultas ejecutadas
       con esta conexión y, por defecto, utiliza el mejor dialecto
       disponible.






     role


       Funciona solo con InterBase 5 y superiores.






     sync







### Valores devueltos

Devuelve un identificador de conexión Firebird/InterBase en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se encuentran errores como "arithmetic exception, numeric overflow,
or string truncation. Cannot transliterate character between character
sets" (esto ocurre cuando se intenta utilizar algunos caracteres acentuados) al
utilizar **ibase_connect()**
y después [ibase_query()](#function.ibase-query), se debe especificar un juego de caracteres
correcto (i.e. ISO8859_1 o su juego de caracteres actual).

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_connect()**

&lt;?php
$host = 'localhost:/path/to/your.gdb';

$dbh = ibase_connect($host, $username, $password);
$stmt = 'SELECT \* FROM tblname';
$sth = ibase_query($dbh, $stmt);
while ($row = ibase_fetch_object($sth)) {
    echo $row-&gt;email, "\n";
}
ibase_free_result($sth);
ibase_close($dbh);
?&gt;

### Ver también

    - [ibase_pconnect()](#function.ibase-pconnect) - Abre una conexión persistente a una base de datos InterBase

    - [ibase_close()](#function.ibase-close) - Cierra una conexión a una base de datos Interbase

# ibase_db_info

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_db_info — Solicita estadísticas sobre una base de datos Interbase

### Descripción

**ibase_db_info**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $db,
    [int](#language.types.integer) $action,
    [int](#language.types.integer) $argumento = 0
): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ibase_delete_user

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_delete_user — Elimina un usuario de una base de datos de seguridad

### Descripción

**ibase_delete_user**([resource](#language.types.resource) $service_handle, [string](#language.types.string) $user_name): [bool](#language.types.boolean)

### Parámetros

     service_handle


       El gestor sobre el servicio del servidor de la base de datos.






     user_name


       El identificador del usuario que debe ser eliminado de la base de datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_add_user()](#function.ibase-add-user) - Añade un usuario a una base de datos de seguridad

    - [ibase_modify_user()](#function.ibase-modify-user) - Modifica un usuario en una base de datos de seguridad

# ibase_drop_db

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_drop_db — Elimina una base de datos iBase

### Descripción

**ibase_drop_db**([resource](#language.types.resource) $connection = **[null](#constant.null)**): [bool](#language.types.boolean)

**ibase_drop_db()** elimina una base de datos
que ha sido abierta por [ibase_connect()](#function.ibase-connect)
o [ibase_pconnect()](#function.ibase-pconnect). La base de datos es
cerrada y eliminada del servidor.

### Parámetros

     connection


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última
       conexión abierta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_connect()](#function.ibase-connect) - Abre una conexión a una base de datos

    - [ibase_pconnect()](#function.ibase-pconnect) - Abre una conexión persistente a una base de datos InterBase

# ibase_errcode

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_errcode — Devuelve el código de error iBase

### Descripción

**ibase_errcode**(): [int](#language.types.integer)

Devuelve el código de error resultante de la llamada más reciente a una
función InterBase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de error, en forma de un [int](#language.types.integer), o **[false](#constant.false)**
si no ha ocurrido ningún error.

### Ver también

    - [ibase_errmsg()](#function.ibase-errmsg) - Devuelve un mensaje de error

# ibase_errmsg

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_errmsg — Devuelve un mensaje de error

### Descripción

**ibase_errmsg**(): [string](#language.types.string)

Devuelve una string que contiene los mensajes de error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error, en forma de string, o false si no ha ocurrido ningún error.

### Ver también

    - [ibase_errcode()](#function.ibase-errcode) - Devuelve el código de error iBase

# ibase_execute

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_execute — Ejecuta una consulta iBase preparada

### Descripción

**ibase_execute**([resource](#language.types.resource) $query, [mixed](#language.types.mixed) ...$values): [resource](#language.types.resource)

Ejecuta una consulta iBase preparada.

**ibase_execute()** es mucho más eficiente que
[ibase_query()](#function.ibase-query), si se realiza la misma consulta varias veces
cambiando solo algunos argumentos.

### Parámetros

     query


       Una consulta InterBase, preparada con la función
       [ibase_prepare()](#function.ibase-prepare).






     values







### Valores devueltos

Si la consulta emite un error, la función devolverá **[false](#constant.false)**. Si la consulta
tiene éxito, y hay un conjunto de resultados (que puede estar vacío), la función
devuelve un identificador de resultados. Si la consulta tiene éxito y no hay
resultados, la función devuelve **[true](#constant.true)**.

**Nota**:

    **ibase_execute()** devuelve el número
    de registros afectados por la consulta (si es mayor que 0).
    Para una consulta que tiene éxito pero que no devuelve ningún registro
    (por ejemplo, un UPDATE en un registro inexistente),
    **ibase_execute()** devolverá **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_execute()**

&lt;?php

$dbh = ibase_connect($host, $username, $password);

$updates = array(
1 =&gt; 'Eric',
5 =&gt; 'Filip',
7 =&gt; 'Larry'
);

$query = ibase_prepare($dbh, "UPDATE FOO SET BAR = ? WHERE BAZ = ?");

foreach ($updates as $baz =&gt; $bar) {
    ibase_execute($query, $bar, $baz);
}

?&gt;

### Ver también

    - [ibase_query()](#function.ibase-query) - Ejecuta una consulta en una base iBase

# ibase_fetch_assoc

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_fetch_assoc — Recupera una fila del resultado de una consulta en un array asociativo

### Descripción

**ibase_fetch_assoc**([resource](#language.types.resource) $result, [int](#language.types.integer) $fetch_flag = 0): [array](#language.types.array)

Recupera una fila del resultado de una consulta en un array asociativo.

**ibase_fetch_assoc()** recupera una fila
de datos a partir de result. Si
dos o más columnas tienen el mismo nombre de campo, la última
columna tendrá precedencia. Para acceder a las otras
columnas con el mismo nombre, se debe hacer con sus índices numéricos utilizando [ibase_fetch_row()](#function.ibase-fetch-row)
o utilizando alias en la consulta.

### Parámetros

     result


       El conjunto de resultados.






     fetch_flag


    fetch_flag es una combinación de las constantes
    **[IBASE_TEXT](#constant.ibase-text)** y **[IBASE_UNIXTIME](#constant.ibase-unixtime)**.
    Pasar **[IBASE_TEXT](#constant.ibase-text)** hace que se devuelva el contenido del BLOB
    en lugar del ID del BLOB. Pasar **[IBASE_UNIXTIME](#constant.ibase-unixtime)** hace que se devuelvan las fechas/horas
    en forma de timestamps UNIX en lugar de strings formateados.





### Valores devueltos

Devuelve un array asociativo que corresponde a la fila recuperada. Las
llamadas siguientes devuelven la fila siguiente en el conjunto de resultados,
o **[false](#constant.false)** si no hay más filas.

### Ver también

    - [ibase_fetch_row()](#function.ibase-fetch-row) - Lee una línea de una base Interbase

    - [ibase_fetch_object()](#function.ibase-fetch-object) - Lee una línea en una base Interbase en un objeto

# ibase_fetch_object

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_fetch_object — Lee una línea en una base Interbase en un objeto

### Descripción

**ibase_fetch_object**([resource](#language.types.resource) $result_id, [int](#language.types.integer) $fetch_flag = 0): [object](#language.types.object)

Lee una línea en una base Interbase y la coloca en un pseudo objeto.

Las siguientes llamadas a la función **ibase_fetch_object()**
devolverán la siguiente línea del conjunto de resultados.

### Parámetros

     result_id


       Un identificador de resultado InterBase, obtenido ya sea por la función
       [ibase_query()](#function.ibase-query), ya sea por la función
       [ibase_execute()](#function.ibase-execute).






     fetch_flag


       fetch_flag es una combinación de las constantes
       **[IBASE_TEXT](#constant.ibase-text)** y **[IBASE_UNIXTIME](#constant.ibase-unixtime)**.
       Pasar **[IBASE_TEXT](#constant.ibase-text)** hace que se devuelva el contenido del BLOB
       en lugar del ID del BLOB. Pasar **[IBASE_UNIXTIME](#constant.ibase-unixtime)**
       hace que se devuelvan los valores de fecha/hora en forma de timestamps UNIX en lugar de strings formateados.





### Valores devueltos

Devuelve un objeto que contiene la información de la línea, o **[false](#constant.false)**
si no hay más líneas.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_fetch_object()**

&lt;?php
$dbh = ibase_connect($host, $username, $password);
$stmt = 'SELECT \* FROM tblname';
$sth = ibase_query($dbh, $stmt);
while ($row = ibase_fetch_object($sth)) {
    echo $row-&gt;email . "\n";
}
ibase_close($dbh);
?&gt;

### Ver también

    - [ibase_fetch_row()](#function.ibase-fetch-row) - Lee una línea de una base Interbase

    - [ibase_fetch_assoc()](#function.ibase-fetch-assoc) - Recupera una fila del resultado de una consulta en un array asociativo

# ibase_fetch_row

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_fetch_row — Lee una línea de una base Interbase

### Descripción

**ibase_fetch_row**([resource](#language.types.resource) $result_identifier, [int](#language.types.integer) $fetch_flag = 0): [array](#language.types.array)

**ibase_fetch_row()** recupera una línea de datos
desde el conjunto de resultados dado.

Las llamadas siguientes a **ibase_fetch_row()** devolverán
la próxima línea en el resultado, o bien **[false](#constant.false)** si no hay más
líneas.

### Parámetros

     result_identifier


       Un identificador de resultado InterBase.






     fetch_flag


       fetch_flag es una combinación de las constantes
       **[IBASE_TEXT](#constant.ibase-text)** y **[IBASE_UNIXTIME](#constant.ibase-unixtime)**.
       Pasar **[IBASE_TEXT](#constant.ibase-text)** hace que se devuelva el contenido del BLOB
       en lugar del ID del BLOB. Pasar **[IBASE_UNIXTIME](#constant.ibase-unixtime)** hace
       que se devuelvan los valores de fecha/hora en forma de timestamps UNIX en lugar de
       strings formateadas.





### Valores devueltos

Devuelve un array correspondiente a la línea recuperada, o **[false](#constant.false)**
si no hay más líneas. Cada columna del resultado se almacena
en una posición del array, comenzando en 0.

### Ver también

    - [ibase_fetch_assoc()](#function.ibase-fetch-assoc) - Recupera una fila del resultado de una consulta en un array asociativo

    - [ibase_fetch_object()](#function.ibase-fetch-object) - Lee una línea en una base Interbase en un objeto

# ibase_field_info

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_field_info — Lee la información sobre un campo iBase

### Descripción

**ibase_field_info**([resource](#language.types.resource) $result, [int](#language.types.integer) $field_number): [array](#language.types.array)

Devuelve un array que contiene la información de un campo, después de
que una consulta de tipo selección haya sido ejecutada.

### Parámetros

     result


       Un identificador de resultado InterBase.






     field_number


       Posición del campo.





### Valores devueltos

Devuelve un array que contiene las siguientes claves: name,
alias, relation,
length y type.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_field_info()**

&lt;?php
$rs = ibase_query("SELECT * FROM tablename");
$coln = ibase_num_fields($rs);
for ($i = 0; $i &lt; $coln; $i++) {
    $col_info = ibase_field_info($rs, $i);
echo "nombre : ". $col_info['name']. "\n";
echo "alias : ". $col_info['alias']. "\n";
echo "relación : ". $col_info['relation']. "\n";
echo "tamaño : ". $col_info['length']. "\n";
echo "tipo : ". $col_info['type']. "\n";
}
?&gt;

### Ver también

    - [ibase_num_fields()](#function.ibase-num-fields) - Devuelve el número de columnas en un resultado iBase

# ibase_free_event_handler

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_free_event_handler — Libera un gestor de eventos iBase

### Descripción

**ibase_free_event_handler**([resource](#language.types.resource) $event): [bool](#language.types.boolean)

**ibase_free_event_handler()** anula el gestor de eventos registrado, especificado
por event. La función de retrollamada no será más ejecutada para los eventos que debía
gestionar.

### Parámetros

     event


       Un recurso de evento, creado por la función
       [ibase_set_event_handler()](#function.ibase-set-event-handler).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_set_event_handler()](#function.ibase-set-event-handler) - Registra una función de retrollamada para un evento interBase

# ibase_free_query

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_free_query — Libera la memoria reservada por una consulta preparada

### Descripción

**ibase_free_query**([resource](#language.types.resource) $query): [bool](#language.types.boolean)

Libera la memoria reservada por una consulta preparada.

### Parámetros

     query


       Una consulta preparada con la función
       [ibase_prepare()](#function.ibase-prepare).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_free_result

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_free_result — Libera un resultado iBase

### Descripción

**ibase_free_result**([resource](#language.types.resource) $result_identifier): [bool](#language.types.boolean)

Libera un resultado iBase.

### Parámetros

     result_identifier


       Un conjunto de caracteres, creado por la función
       [ibase_query()](#function.ibase-query) o por la función
       [ibase_execute()](#function.ibase-execute).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_gen_id

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_gen_id — Incrementa el generador dado y devuelve su nuevo valor

### Descripción

**ibase_gen_id**([string](#language.types.string) $generator, [int](#language.types.integer) $increment = 1, [resource](#language.types.resource) $link_identifier = **[null](#constant.null)**): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Devuelve un nuevo valor generado en forma de [int](#language.types.integer) o de [string](#language.types.string) si el valor es demasiado grande.

# ibase_maintain_db

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_maintain_db — Ejecuta un comando de mantenimiento en una base de datos Interbase

### Descripción

**ibase_maintain_db**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $db,
    [int](#language.types.integer) $action,
    [int](#language.types.integer) $argumento = 0
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_modify_user

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_modify_user — Modifica un usuario en una base de datos de seguridad

### Descripción

**ibase_modify_user**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $user_name,
    [string](#language.types.string) $password,
    [string](#language.types.string) $first_name = ?,
    [string](#language.types.string) $middle_name = ?,
    [string](#language.types.string) $last_name = ?
): [bool](#language.types.boolean)

### Parámetros

     service_handle


       El gestor sobre el servicio del servidor de base de datos.






     user_name


       El identificador del usuario de base de datos a modificar.






     password


       La nueva contraseña del usuario.






     first_name


       El nuevo nombre del usuario.






     middle_name


       El nuevo segundo nombre del usuario.






     last_name


       El nuevo apellido del usuario.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_add_user()](#function.ibase-add-user) - Añade un usuario a una base de datos de seguridad

    - [ibase_delete_user()](#function.ibase-delete-user) - Elimina un usuario de una base de datos de seguridad

# ibase_name_result

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_name_result — Asigna un nombre a un conjunto de resultados iBase

### Descripción

**ibase_name_result**([resource](#language.types.resource) $result, [string](#language.types.string) $name): [bool](#language.types.boolean)

Asigna un nombre a un conjunto de resultados. Este nombre puede ser
utilizado más tarde en las consultas de tipo
UPDATE|DELETE ... WHERE CURRENT OF name.

### Parámetros

     result


       Un conjunto de resultados InterBase.






     name


       El nombre a asignar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_name_result()**

&lt;?php
$result = ibase_query("SELECT field1,field2 FROM table FOR UPDATE");
ibase_name_result($result, "my_cursor");

$updateqry = ibase_prepare("UPDATE table SET field2 = ? WHERE CURRENT OF my_cursor");

for ($i = 0; ibase_fetch_row($result); ++$i) {
    ibase_execute($updateqry, $i);
}
?&gt;

### Ver también

    - [ibase_prepare()](#function.ibase-prepare) - Prepara una consulta iBase para ligar los argumentos y ejecutarla posteriormente

    - [ibase_execute()](#function.ibase-execute) - Ejecuta una consulta iBase preparada

# ibase_num_fields

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_num_fields — Devuelve el número de columnas en un resultado iBase

### Descripción

**ibase_num_fields**([resource](#language.types.resource) $result_id): [int](#language.types.integer)

Devuelve el número de columnas en un resultado iBase.

### Parámetros

     result_id


       Un identificador de resultado InterBase.





### Valores devueltos

Devuelve el número de campos, en forma de un [int](#language.types.integer).

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_num_fields()**

&lt;?php
$rs = ibase_query("SELECT * FROM tablename");
$coln = ibase_num_fields($rs);
for ($i = 0; $i &lt; $coln; $i++) {
    $col_info = ibase_field_info($rs, $i);
echo "nombre : " . $col_info['name'] . "\n";
echo "alias : " . $col_info['alias'] . "\n";
echo "relación : " . $col_info['relation'] . "\n";
echo "tamaño : " . $col_info['length'] . "\n";
echo "tipo : " . $col_info['type'] . "\n";
}
?&gt;

### Ver también

    - [ibase_field_info()](#function.ibase-field-info) - Lee la información sobre un campo iBase

# ibase_num_params

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_num_params — Devuelve el número de parámetros en una consulta preparada iBase

### Descripción

**ibase_num_params**([resource](#language.types.resource) $query): [int](#language.types.integer)

**ibase_num_params()** devuelve el número de parámetros
en la consulta especificada
por query. Es el número de argumentos de
sustitución que deben estar presentes al llamar a
[ibase_execute()](#function.ibase-execute).

### Parámetros

     query


       La consulta preparada.





### Valores devueltos

Devuelve el número de parámetros, en forma de un [int](#language.types.integer).

### Ver también

    - [ibase_prepare()](#function.ibase-prepare) - Prepara una consulta iBase para ligar los argumentos y ejecutarla posteriormente

    - [ibase_param_info()](#function.ibase-param-info) - Devuelve información sobre un argumento en una consulta preparada iBase

# ibase_param_info

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_param_info — Devuelve información sobre un argumento en una consulta preparada iBase

### Descripción

**ibase_param_info**([resource](#language.types.resource) $query, [int](#language.types.integer) $param_number): [array](#language.types.array)

Devuelve un array con información sobre un argumento después de que una consulta haya sido preparada.

### Parámetros

     query


       Un gestor de consulta preparada InterBase.






     param_number


       La posición del argumento.





### Valores devueltos

Devuelve un array que contiene las siguientes claves: name,
alias, relation,
length y type.

### Ver también

    - [ibase_field_info()](#function.ibase-field-info) - Lee la información sobre un campo iBase

    - [ibase_num_params()](#function.ibase-num-params) - Devuelve el número de parámetros en una consulta preparada iBase

# ibase_pconnect

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_pconnect — Abre una conexión persistente a una base de datos InterBase

### Descripción

**ibase_pconnect**(
    [string](#language.types.string) $database = ?,
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [string](#language.types.string) $charset = ?,
    [int](#language.types.integer) $buffers = ?,
    [int](#language.types.integer) $dialect = ?,
    [string](#language.types.string) $role = ?,
    [int](#language.types.integer) $sync = ?
): [resource](#language.types.resource)

Abre una conexión persistente a una base de datos InterBase.

**ibase_pconnect()** se comporta de manera similar a
[ibase_connect()](#function.ibase-connect), con dos diferencias
principales.

La primera es que, al conectar, la función
intentará encontrar una conexión (persistente) ya abierta.
Si la encuentra, esta última será devuelta, en lugar
de una nueva conexión. De lo contrario, se abrirá una nueva conexión.

La segunda es que la conexión no se cerrará al final
del script, sino que permanecerá abierta para su uso posterior.
([ibase_close()](#function.ibase-close) no cerrará una conexión abierta
con **ibase_pconnect()**). Este tipo de enlace se denomina
'persistente'.

### Parámetros

     database


       El argumento database debe ser una ruta de acceso válida
       al fichero de la base de datos en el servidor donde reside. Si
       el servidor no es local, debe estar precedido por 'hostname:'
       (TCP/IP), '//hostname/' (NetBEUI) o 'hostname@' (IPX/SPX), según el
       protocolo utilizado.






     username


       El nombre de usuario. Puede ser definido con la directiva
       ibase.default_user del php.ini.






     password


       La contraseña para el usuario username.
       Puede ser definida con la directiva
       ibase.default_password del php.ini.






     charset


       charset es el conjunto de caracteres por omisión para
       la base de datos.






     buffers


       buffers es el número de buffers de la base de datos
       que se asignarán para la caché del lado del servidor. Si este parámetro vale 0 o si se omite, el servidor elegirá este número por sí mismo.






     dialect


       dialect selecciona el dialecto SQL por omisión para
       todas las consultas ejecutadas en la conexión, y valdrá por omisión,
       el más alto soportado por la biblioteca cliente. Solo funciona con
       InterBase 6 y superiores.






     role


       Solo funciona con InterBase 5 y superiores.






     sync







### Valores devueltos

Devuelve un identificador de conexión InterBase en caso de éxito,
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ibase_close()](#function.ibase-close) - Cierra una conexión a una base de datos Interbase

    - [ibase_connect()](#function.ibase-connect) - Abre una conexión a una base de datos

# ibase_prepare

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_prepare — Prepara una consulta iBase para ligar los argumentos y ejecutarla posteriormente

### Descripción

**ibase_prepare**([string](#language.types.string) $query): [resource](#language.types.resource)

**ibase_prepare**([resource](#language.types.resource) $link_identifier, [string](#language.types.string) $query): [resource](#language.types.resource)

**ibase_prepare**([resource](#language.types.resource) $link_identifier, [string](#language.types.string) $trans, [string](#language.types.string) $query): [resource](#language.types.resource)

Prepara una consulta para ligar posteriormente los argumentos y ejecutarla (a través de la función [ibase_execute()](#function.ibase-execute)).

### Parámetros

     query


       Una consulta InterBase.






     link_identifier


       Un enlace identificador InterBase devuelto por
       [ibase_connect()](#function.ibase-connect). Si se omite, se adopta el último enlace abierto.






     trans


       Un gestor de transacción InterBase con el cual la consulta debe ser asociada.
       Si se omite, se adopta la transacción por omisión de la conexión.





### Valores devueltos

Devuelve un gestor de consulta preparada, o **[false](#constant.false)** si ocurre un error.

# ibase_query

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_query — Ejecuta una consulta en una base iBase

### Descripción

**ibase_query**([resource](#language.types.resource) $link_identifier = ?, [string](#language.types.string) $query, [int](#language.types.integer) $bind_args = ?): [resource](#language.types.resource)

Ejecuta una consulta en una base iBase.

### Parámetros

     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última
       conexión abierta.






     query


       Una consulta InterBase.






     bind_args







### Valores devueltos

Si la consulta emite un error, la función devolverá **[false](#constant.false)**. Si la
consulta se ejecuta con éxito, y hay un conjunto de resultados (incluso
vacío), la función devolverá un identificador de resultado. Si la consulta
se ejecuta con éxito, y no hay resultado, la función devolverá **[true](#constant.true)**.

**Nota**:

    En las versiones 5.0.0 de PHP y siguientes, **ibase_query()**
    devuelve el número de registros afectados por las consultas INSERT,
    UPDATE y DELETE.
    Por razones de compatibilidad ascendente, **ibase_query()**
    devolverá **[true](#constant.true)** si la consulta tiene éxito pero no devuelve ningún registro.

### Errores/Excepciones

Si se recibe un error del tipo "arithmetic exception, numeric overflow,
or string truncation. Cannot transliterate character between character
sets" (esto ocurre cuando se intenta utilizar caracteres acentuados) con la función **ibase_query()**,
es necesario elegir un juego de caracteres
(i.e. ISO8859_1 o su juego actual).

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_query()**

&lt;?php

$host = 'localhost:/path/to/your.gdb';

$dbh = ibase_connect($host, $username, $password);
$stmt = 'SELECT \* FROM tblname';

$sth = ibase_query($dbh, $stmt) or die(ibase_errmsg());

?&gt;

### Ver también

    - [ibase_errmsg()](#function.ibase-errmsg) - Devuelve un mensaje de error

    - [ibase_fetch_row()](#function.ibase-fetch-row) - Lee una línea de una base Interbase

    - [ibase_fetch_object()](#function.ibase-fetch-object) - Lee una línea en una base Interbase en un objeto

    - [ibase_free_result()](#function.ibase-free-result) - Libera un resultado iBase

# ibase_restore

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_restore — Inicia una tarea de restauración en el gestor de servicios y devuelve inmediatamente

### Descripción

**ibase_restore**(
    [resource](#language.types.resource) $service_handle,
    [string](#language.types.string) $source_file,
    [string](#language.types.string) $dest_db,
    [int](#language.types.integer) $options = 0,
    [bool](#language.types.boolean) $verbose = **[false](#constant.false)**
): [mixed](#language.types.mixed)

    Esta función transmite los argumentos al servidor de base de datos (remoto).
    Allí, comienza un nuevo proceso de restauración.
    Por lo tanto, no se obtendrá ninguna respuesta.

### Parámetros

     service_handle


       Una conexión al servidor de base de datos creada previamente.






     source_file


       La ruta absoluta en el servidor donde se encuentra el fichero de respaldo.






     dest_db


       La ruta para crear la nueva base de datos en el servidor.
       También se puede utilizar un alias de base de datos.






     options


       Opciones adicionales a transmitir al servidor de base de datos
       para la restauración.
       El parámetro options puede ser una combinación
       de las siguientes constantes:
       **[IBASE_RES_DEACTIVATE_IDX](#constant.ibase-res-deactivate-idx)**,
       **[IBASE_RES_NO_SHADOW](#constant.ibase-res-no-shadow)**,
       **[IBASE_RES_NO_VALIDITY](#constant.ibase-res-no-validity)**,
       **[IBASE_RES_ONE_AT_A_TIME](#constant.ibase-res-one-at-a-time)**,
       **[IBASE_RES_REPLACE](#constant.ibase-res-replace)**,
       **[IBASE_RES_CREATE](#constant.ibase-res-create)**,
       **[IBASE_RES_USE_ALL_SPACE](#constant.ibase-res-use-all-space)**,
       **[IBASE_PRP_PAGE_BUFFERS](#constant.ibase-prp-page-buffers)**,
       **[IBASE_PRP_SWEEP_INTERVAL](#constant.ibase-prp-sweep-interval)**,
       **[IBASE_RES_CREATE](#constant.ibase-res-create)**.
       Leer la sección sobre [Constantes predefinidas](#ibase.constants) para
       más información.






     verbose


       Dado que el proceso de restauración se realiza en el servidor
       de base de datos, no hay posibilidad de obtener su salida.
       Este argumento es inútil.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

Dado que el proceso de restauración se realiza en el servidor (remoto),
esta función solo transmite los argumentos.
Mientras los argumentos sean legales, no se obtendrá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_restore()**

&lt;?php
// Adjuntar al servidor por dirección IP y puerto.
$service = ibase_service_attach ('10.1.11.200/3050', 'sysdba', 'masterkey');

// Iniciar el proceso de restauración en el servidor de base de datos
// Restaurar el respaldo de employee a la nueva base de datos emps.fdb
// No utiliza argumentos especiales
ibase_restore($service, '/srv/backup/employees.fbk', '/srv/firebird/emps.fdb');

// Libera la conexión adjunta
ibase_service_detach ($service);
?&gt;

    **Ejemplo #2 Ejemplo de ibase_restore()** con argumentos

&lt;?php

// Adjuntar al servidor por nombre y puerto por defecto
$service = ibase_service_attach ('fb-server.contoso.local', 'sysdba', 'masterkey');

// Iniciar el proceso de restauración en el servidor de base de datos
// Restaurar la base de datos employee utilizando un alias.
// Restaurar sin índice, Reemplazar la base de datos existente.
ibase_restore($service, '/srv/backup/employees.fbk', 'employees.fdb', IBASE_RES_DEACTIVATE_IDX | IBASE_RES_REPLACE);

// Libera la conexión adjunta
ibase_service_detach ($service);
?&gt;

### Ver también

    - [ibase_backup()](#function.ibase-backup) - Inicia una tarea de respaldo en el gestor de servicios y devuelve inmediatamente

# ibase_rollback

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_rollback — Anula una transacción interBase

### Descripción

**ibase_rollback**([resource](#language.types.resource) $link_or_trans_identifier = **[null](#constant.null)**): [bool](#language.types.boolean)

Anula una transacción interBase.

### Parámetros

     link_or_trans_identifier


       Cuando **ibase_rollback()** es llamada sin argumento,
       anula la transacción por omisión del enlace por omisión. Si el argumento
       link_or_trans_identifier es un identificador de conexión,
       la transacción por omisión de dicha conexión será anulada.
       Si el argumento link_or_trans_identifier
       es un identificador de transacción, esta será anulada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_rollback_ret

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_rollback_ret — Anula una transacción sin cerrarla

### Descripción

**ibase_rollback_ret**([resource](#language.types.resource) $link_or_trans_identifier = **[null](#constant.null)**): [bool](#language.types.boolean)

Anula una transacción sin cerrarla.

### Parámetros

     link_or_trans_identifier


       Si **ibase_rollback_ret()** es llamada sin argumento,
       anula la transacción por omisión del enlace por omisión. Si el argumento
       link_or_trans_identifier es un identificador de conexión,
       la transacción por omisión de esta conexión será anulada.
       Si el argumento link_or_trans_identifier
       es un identificador de transacción, esta será anulada.
       El contexto de la transacción será retenido y, por lo tanto, las consultas ejecutadas
       en esta transacción no serán invalidadas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ibase_server_info

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_server_info — Solicita información sobre un servidor de base de datos

### Descripción

**ibase_server_info**([resource](#language.types.resource) $service_handle, [int](#language.types.integer) $action): [string](#language.types.string)

### Parámetros

     service_handle


       Una conexión al servidor de base de datos creada previamente.






     action


       Una constante válida.





### Valores devueltos

Devuelve diferentes tipos dependiendo del contexto.

### Ejemplos

    **Ejemplo #1 Ejemplo con [ibase_service_attach()](#function.ibase-service-attach)**

&lt;?php
// Adjuntar al servidor Firebird remoto
if (($service = ibase_service_attach('10.1.1.254/3050', 'sysdba', 'masterkey')) != FALSE) {

        // Adjuntado con éxito.

        // Mostrar la información
        echo "Versión del servidor: " . ibase_server_info($service, IBASE_SVC_SERVER_VERSION) . "\n";
        echo "Implementación del servidor: " . ibase_server_info($service, IBASE_SVC_IMPLEMENTATION) . "\n";
        echo "Usuarios del servidor: " . print_r(ibase_server_info($service, IBASE_SVC_GET_USERS), true) . "\n";
        echo "Directorio del servidor: " . ibase_server_info($service, IBASE_SVC_GET_ENV) . "\n";
        echo "Ruta de bloqueo del servidor: " . ibase_server_info($service, IBASE_SVC_GET_ENV_LOCK) . "\n";
        echo "Ruta de la biblioteca del servidor: " . ibase_server_info($service, IBASE_SVC_GET_ENV_MSG) . "\n";
        echo "Ruta de la base de datos del usuario: " . ibase_server_info($service, IBASE_SVC_USER_DBPATH) . "\n";
        echo "Conexiones establecidas: " . print_r(ibase_server_info($service, IBASE_SVC_SVR_DB_INFO),true) . "\n";

        // Desadjuntar del servidor (desconexión)
        ibase_service_detach($service);

    }
    else {
        // Mostrar un mensaje en caso de error
        $conn_error = ibase_errmsg();
        die($conn_error);
    }

?&gt;

    El ejemplo anterior mostrará:

Versión del servidor: LI-V3.0.4.33054 Firebird 3.0
Implementación del servidor: Firebird/Linux/AMD/Intel/x64
Usuarios del servidor: Array
(
[0] =&gt; Array
(
[user_name] =&gt; SYSDBA
[first_name] =&gt; Sql
[middle_name] =&gt; Server
[last_name] =&gt; Administrator
[user_id] =&gt; 0
[group_id] =&gt; 0
)

)

Directorio del servidor: /etc/firebird/
Ruta de bloqueo del servidor: /tmp/firebird/
Ruta de la biblioteca del servidor: /usr/lib64/firebird/lib/
Ruta de la base de datos del usuario: /var/lib/firebird/secdb/security3.fdb
Conexiones establecidas: Array
(
[attachments] =&gt; 3
[databases] =&gt; 2
[0] =&gt; /srv/firebird/poss.fdb
[1] =&gt; /srv/firebird/employees.fdb
)

# ibase_service_attach

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_service_attach — Conexión al gestor de servicio

### Descripción

**ibase_service_attach**([string](#language.types.string) $host, [string](#language.types.string) $dba_username, [string](#language.types.string) $dba_password): [resource](#language.types.resource)|[false](#language.types.singleton)

### Parámetros

     host


       El nombre o la dirección IP del host de la base de datos.
       El puerto puede ser definido añadiendo '/' y el número del puerto.
       Si no se especifica ningún puerto, se utilizará el puerto 3050.






     dba_username


       El nombre de cualquier usuario válido.






     dba_password


       La contraseña del usuario.





### Valores devueltos

Devuelve un identificador de enlace Interbase / Firebird en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_service_attach()**

&lt;?php
// Conectarse al servidor Firebird remoto por una dirección IP
if (($service = ibase_service_attach('10.1.1.199', 'sysdba', 'masterkey')) != FALSE) {

        // Conectado con éxito.
        // Obtener la versión del servidor (algo como 'LI-V3.0.4.33054 Firebird 3.0')
        $server_version  = ibase_server_info($service, IBASE_SVC_SERVER_VERSION);

        // Obtener la implementación del servidor (algo como 'Firebird/Linux/AMD/Intel/x64')
        $server_implementation = ibase_server_info($service, IBASE_SVC_IMPLEMENTATION);

        // Desconectarse del servidor
        ibase_service_detach($service);

        // Mostrar la información
        echo "Server version: " . $server_version . "&lt;br/&gt;";
        echo "Server implementation: " . $server_implementation;
    }
    else {
        // Mostrar un mensaje en caso de error
        $conn_error = ibase_errmsg();
        die($conn_error);
    }

?&gt;

    **Ejemplo #2 Ejemplo deibase_service_attach()** utilizando la sintaxis hostname/port

&lt;?php
// Conectarse al servidor Firebird remoto por nombre. Utiliza el puerto 3050.
if (($service = ibase_service_attach('FB-SRV-01.contoso.local/3050', 'sysdba', 'masterkey')) != FALSE) {

        // Conectado con éxito.
        // Obtener la versión del servidor (algo como 'LI-V3.0.4.33054 Firebird 3.0')
        $server_version  = ibase_server_info($service, IBASE_SVC_SERVER_VERSION);

        // Obtener la implementación del servidor (algo como 'Firebird/Linux/AMD/Intel/x64')
        $server_implementation = ibase_server_info($service, IBASE_SVC_IMPLEMENTATION);

        // Desconectarse del servidor
        ibase_service_detach($service);

        // Mostrar la información
        echo "Server version: " . $server_version . "&lt;br/&gt;";
        echo "Server implementation: " . $server_implementation;
    }
    else {
        // Mostrar un mensaje en caso de error
        $conn_error = ibase_errmsg();
        die($conn_error);
    }

?&gt;

### Ver también

    - [ibase_service_detach()](#function.ibase-service-detach) - Desconexión del gestor de servicio

# ibase_service_detach

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_service_detach — Desconexión del gestor de servicio

### Descripción

**ibase_service_detach**([resource](#language.types.resource) $service_handle): [bool](#language.types.boolean)

### Parámetros

     service_handle


       Una conexión al servidor de base de datos creada previamente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_service_detach()**

&lt;?php
// Adjuntar al servidor Firebird remoto por una dirección IP
if (($service = ibase_service_attach('10.1.1.199', 'sysdba', 'masterkey')) != FALSE) {

        // Adjuntado con éxito.
        // Recuperar la versión del servidor (algo como 'LI-V3.0.4.33054 Firebird 3.0')
        $server_version  = ibase_server_info($service, IBASE_SVC_SERVER_VERSION);

        // Recuperar la implementación del servidor (algo como 'Firebird/Linux/AMD/Intel/x64')
        $server_implementation = ibase_server_info($service, IBASE_SVC_IMPLEMENTATION);

        // Desconectar del servidor (desconexión)
        if(ibase_service_detach($service) == FALSE) {
            echo "Error en la desconexión del servicio.";
        }
        else {
            echo "Desconexión del servicio realizada con éxito.";
        }

    }
    else {
        // Mostrar un mensaje en caso de error
        $conn_error = ibase_errmsg();
        die($conn_error);
    }

?&gt;

# ibase_set_event_handler

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_set_event_handler — Registra una función de retrollamada para un evento interBase

### Descripción

**ibase_set_event_handler**([callable](#language.types.callable) $event_handler, [string](#language.types.string) $event_name, [string](#language.types.string) ...$event_names): [resource](#language.types.resource)

**ibase_set_event_handler**(
    [resource](#language.types.resource) $connection,
    [callable](#language.types.callable) $event_handler,
    [string](#language.types.string) $event_name,
    [string](#language.types.string) ...$event_names
): [resource](#language.types.resource)

**ibase_set_event_handler()** registra la función
PHP event_handler como
gestor de eventos para los eventos
especificados.

### Parámetros

     event_handler


       Función de retrollamada llamada con el nombre del evento y la conexión de recurso como argumentos cuando un evento
       especificado es publicado en la base de datos.




       La función de retrollamada event_handler debe
       devolver **[false](#constant.false)** si el gestor debe ser cancelado. Cualquier otro
       valor de retorno es ignorado.
       Esta función acepta hasta 15 argumentos de evento.






     event_name


       El nombre del evento.






     event_names


       15 eventos como máximo están permitidos.





### Valores devueltos

El valor devuelto es un recurso de evento. Puede ser
utilizado para liberar el gestor de eventos utilizando
[ibase_free_event_handler()](#function.ibase-free-event-handler).

### Ejemplos

    **Ejemplo #1 Ejemplo con ibase_set_event_handler()**

&lt;?php

function event_handler($event_name, $link)
{
    if ($event_name == "NEW ORDER") {
// Procesamiento del nuevo pedido
ibase_query($link, "UPDATE orders SET status='handled'");
    } else if ($event_name == "DB_SHUTDOWN") {
// Liberación del gestor
return false;
}
}

ibase_set_event_handler($link, "event_handler", "NEW_ORDER", "DB_SHUTDOWN");
?&gt;

### Ver también

    - [ibase_free_event_handler()](#function.ibase-free-event-handler) - Libera un gestor de eventos iBase

    - [ibase_wait_event()](#function.ibase-wait-event) - Espera un evento interBase

# ibase_trans

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_trans — Prepara una transacción interBase

### Descripción

**ibase_trans**([int](#language.types.integer) $trans_args = ?, [resource](#language.types.resource) $link_identifier = ?): [resource](#language.types.resource)

**ibase_trans**([resource](#language.types.resource) $link_identifier = ?, [int](#language.types.integer) $trans_args = ?): [resource](#language.types.resource)

Prepara una transacción interBase.

**Nota**:

    La primera llamada a **ibase_trans()** devolverá
    la transacción por omisión para la conexión actual. Todas las
    transacciones iniciadas por **ibase_trans()**
    serán anuladas al final de la ejecución del script si no han sido
    validadas o anuladas por las funciones [ibase_commit()](#function.ibase-commit)
    o [ibase_rollback()](#function.ibase-rollback) respectivamente.

**Nota**:

    **ibase_trans()** acepta varios argumentos
    trans_args y link_identifier.
    Esto permite realizar transacciones en varias conexiones a diferentes
    bases de datos, que serán validadas utilizando el algoritmo
    2-phase. Esto significa que se pueden actualizar
    varias bases de datos. Esto NO significa que se puedan utilizar
    varias bases de datos en una misma consulta.




    Si se utilizan las transacciones en varias bases de datos, se debe especificar
    link_id y transaction_id
    en las funciones [ibase_query()](#function.ibase-query) y [ibase_prepare()](#function.ibase-prepare).

### Parámetros

     trans_args


       trans_args puede ser una combinación de las siguientes constantes:
       **[IBASE_READ](#constant.ibase-read)**,
       **[IBASE_WRITE](#constant.ibase-write)**,
       **[IBASE_COMMITTED](#constant.ibase-committed)**,
       **[IBASE_CONSISTENCY](#constant.ibase-consistency)**,
       **[IBASE_CONCURRENCY](#constant.ibase-concurrency)**,
       **[IBASE_REC_VERSION](#constant.ibase-rec-version)**,
       **[IBASE_REC_NO_VERSION](#constant.ibase-rec-no-version)**,
       **[IBASE_WAIT](#constant.ibase-wait)** y
       **[IBASE_NOWAIT](#constant.ibase-nowait)**.






     link_identifier


       Un identificador de conexión a InterBase. Si se omite, se utilizará la última
       conexión abierta.





### Valores devueltos

Devuelve un recurso de transacción, o **[false](#constant.false)** si ocurre un error.

# ibase_wait_event

(PHP 5, PHP 7 &lt; 7.4.0)

ibase_wait_event — Espera un evento interBase

### Descripción

**ibase_wait_event**([string](#language.types.string) $event_name, [string](#language.types.string) ...$event_names): [string](#language.types.string)

**ibase_wait_event**([resource](#language.types.resource) $connection, [string](#language.types.string) $event_name, [string](#language.types.string) ...$event_names): [string](#language.types.string)

**ibase_wait_event()** suspende la ejecución del script
hasta que uno de los eventos especificados sea publicado por la base
de datos. El nombre del evento que ha sido publicado es entonces devuelto.
Esta función acepta hasta 15 argumentos de eventos.

### Parámetros

     event_name


       El nombre del evento.






     event_names







### Valores devueltos

Devuelve el nombre del evento que ha sido publicado.

### Ver también

    - [ibase_set_event_handler()](#function.ibase-set-event-handler) - Registra una función de retrollamada para un evento interBase

    - [ibase_free_event_handler()](#function.ibase-free-event-handler) - Libera un gestor de eventos iBase

## Tabla de contenidos

- [fbird_add_user](#function.fbird-add-user) — Alias de ibase_add_user
- [fbird_affected_rows](#function.fbird-affected-rows) — Alias de ibase_affected_rows
- [fbird_backup](#function.fbird-backup) — Alias de ibase_backup
- [fbird_blob_add](#function.fbird-blob-add) — Alias de ibase_blob_add
- [fbird_blob_cancel](#function.fbird-blob-cancel) — Cancela la creación de un blob
- [fbird_blob_close](#function.fbird-blob-close) — Alias de ibase_blob_close
- [fbird_blob_create](#function.fbird-blob-create) — Alias de ibase_blob_create
- [fbird_blob_echo](#function.fbird-blob-echo) — Alias de ibase_blob_echo
- [fbird_blob_get](#function.fbird-blob-get) — Alias de ibase_blob_get
- [fbird_blob_import](#function.fbird-blob-import) — Alias de ibase_blob_import
- [fbird_blob_info](#function.fbird-blob-info) — Alias de ibase_blob_info
- [fbird_blob_open](#function.fbird-blob-open) — Alias de ibase_blob_open
- [fbird_close](#function.fbird-close) — Alias de ibase_close
- [fbird_commit](#function.fbird-commit) — Alias de ibase_commit
- [fbird_commit_ret](#function.fbird-commit-ret) — Alias de ibase_commit_ret
- [fbird_connect](#function.fbird-connect) — Alias de ibase_connect
- [fbird_db_info](#function.fbird-db-info) — Alias de ibase_db_info
- [fbird_delete_user](#function.fbird-delete-user) — Alias de ibase_delete_user
- [fbird_drop_db](#function.fbird-drop-db) — Alias de ibase_drop_db
- [fbird_errcode](#function.fbird-errcode) — Alias de ibase_errcode
- [fbird_errmsg](#function.fbird-errmsg) — Alias de ibase_errmsg
- [fbird_execute](#function.fbird-execute) — Alias de ibase_execute
- [fbird_fetch_assoc](#function.fbird-fetch-assoc) — Alias de ibase_fetch_assoc
- [fbird_fetch_object](#function.fbird-fetch-object) — Alias de ibase_fetch_object
- [fbird_fetch_row](#function.fbird-fetch-row) — Alias de ibase_fetch_row
- [fbird_field_info](#function.fbird-field-info) — Alias de ibase_field_info
- [fbird_free_event_handler](#function.fbird-free-event-handler) — Alias de ibase_free_event_handler
- [fbird_free_query](#function.fbird-free-query) — Alias de ibase_free_query
- [fbird_free_result](#function.fbird-free-result) — Alias de ibase_free_result
- [fbird_gen_id](#function.fbird-gen-id) — Alias de ibase_gen_id
- [fbird_maintain_db](#function.fbird-maintain-db) — Alias de ibase_maintain_db
- [fbird_modify_user](#function.fbird-modify-user) — Alias de ibase_modify_user
- [fbird_name_result](#function.fbird-name-result) — Alias de ibase_name_result
- [fbird_num_fields](#function.fbird-num-fields) — Alias de ibase_num_fields
- [fbird_num_params](#function.fbird-num-params) — Alias de ibase_num_params
- [fbird_param_info](#function.fbird-param-info) — Alias de ibase_param_info
- [fbird_pconnect](#function.fbird-pconnect) — Alias de ibase_pconnect
- [fbird_prepare](#function.fbird-prepare) — Alias de ibase_prepare
- [fbird_query](#function.fbird-query) — Alias de ibase_query
- [fbird_restore](#function.fbird-restore) — Alias de ibase_restore
- [fbird_rollback](#function.fbird-rollback) — Alias de ibase_rollback
- [fbird_rollback_ret](#function.fbird-rollback-ret) — Alias de ibase_rollback_ret
- [fbird_server_info](#function.fbird-server-info) — Alias de ibase_server_info
- [fbird_service_attach](#function.fbird-service-attach) — Alias de ibase_service_attach
- [fbird_service_detach](#function.fbird-service-detach) — Alias de ibase_service_detach
- [fbird_set_event_handler](#function.fbird-set-event-handler) — Alias de ibase_set_event_handler
- [fbird_trans](#function.fbird-trans) — Alias de ibase_trans
- [fbird_wait_event](#function.fbird-wait-event) — Alias de ibase_wait_event
- [ibase_add_user](#function.ibase-add-user) — Añade un usuario a una base de datos de seguridad
- [ibase_affected_rows](#function.ibase-affected-rows) — Devuelve el número de filas afectadas por la última consulta iBase
- [ibase_backup](#function.ibase-backup) — Inicia una tarea de respaldo en el gestor de servicios y devuelve inmediatamente
- [ibase_blob_add](#function.ibase-blob-add) — Añade datos a un BLOB iBase recién creado
- [ibase_blob_cancel](#function.ibase-blob-cancel) — Cancela la creación de un BLOB iBase
- [ibase_blob_close](#function.ibase-blob-close) — Cierra un BLOB iBase
- [ibase_blob_create](#function.ibase-blob-create) — Crea un BLOB iBase para añadir datos
- [ibase_blob_echo](#function.ibase-blob-echo) — Muestra el contenido de un BLOB iBase en el navegador
- [ibase_blob_get](#function.ibase-blob-get) — Lee len bytes de datos en un BLOB iBase abierto
- [ibase_blob_import](#function.ibase-blob-import) — Crea un BLOB iBase, copia un fichero y lo cierra
- [ibase_blob_info](#function.ibase-blob-info) — Devuelve el tamaño de un BLOB iBase y otra información útil
- [ibase_blob_open](#function.ibase-blob-open) — Abre un BLOB iBase para recuperar partes de datos
- [ibase_close](#function.ibase-close) — Cierra una conexión a una base de datos Interbase
- [ibase_commit](#function.ibase-commit) — Valida una transacción iBase
- [ibase_commit_ret](#function.ibase-commit-ret) — Valida una transacción iBase sin cerrarla
- [ibase_connect](#function.ibase-connect) — Abre una conexión a una base de datos
- [ibase_db_info](#function.ibase-db-info) — Solicita estadísticas sobre una base de datos Interbase
- [ibase_delete_user](#function.ibase-delete-user) — Elimina un usuario de una base de datos de seguridad
- [ibase_drop_db](#function.ibase-drop-db) — Elimina una base de datos iBase
- [ibase_errcode](#function.ibase-errcode) — Devuelve el código de error iBase
- [ibase_errmsg](#function.ibase-errmsg) — Devuelve un mensaje de error
- [ibase_execute](#function.ibase-execute) — Ejecuta una consulta iBase preparada
- [ibase_fetch_assoc](#function.ibase-fetch-assoc) — Recupera una fila del resultado de una consulta en un array asociativo
- [ibase_fetch_object](#function.ibase-fetch-object) — Lee una línea en una base Interbase en un objeto
- [ibase_fetch_row](#function.ibase-fetch-row) — Lee una línea de una base Interbase
- [ibase_field_info](#function.ibase-field-info) — Lee la información sobre un campo iBase
- [ibase_free_event_handler](#function.ibase-free-event-handler) — Libera un gestor de eventos iBase
- [ibase_free_query](#function.ibase-free-query) — Libera la memoria reservada por una consulta preparada
- [ibase_free_result](#function.ibase-free-result) — Libera un resultado iBase
- [ibase_gen_id](#function.ibase-gen-id) — Incrementa el generador dado y devuelve su nuevo valor
- [ibase_maintain_db](#function.ibase-maintain-db) — Ejecuta un comando de mantenimiento en una base de datos Interbase
- [ibase_modify_user](#function.ibase-modify-user) — Modifica un usuario en una base de datos de seguridad
- [ibase_name_result](#function.ibase-name-result) — Asigna un nombre a un conjunto de resultados iBase
- [ibase_num_fields](#function.ibase-num-fields) — Devuelve el número de columnas en un resultado iBase
- [ibase_num_params](#function.ibase-num-params) — Devuelve el número de parámetros en una consulta preparada iBase
- [ibase_param_info](#function.ibase-param-info) — Devuelve información sobre un argumento en una consulta preparada iBase
- [ibase_pconnect](#function.ibase-pconnect) — Abre una conexión persistente a una base de datos InterBase
- [ibase_prepare](#function.ibase-prepare) — Prepara una consulta iBase para ligar los argumentos y ejecutarla posteriormente
- [ibase_query](#function.ibase-query) — Ejecuta una consulta en una base iBase
- [ibase_restore](#function.ibase-restore) — Inicia una tarea de restauración en el gestor de servicios y devuelve inmediatamente
- [ibase_rollback](#function.ibase-rollback) — Anula una transacción interBase
- [ibase_rollback_ret](#function.ibase-rollback-ret) — Anula una transacción sin cerrarla
- [ibase_server_info](#function.ibase-server-info) — Solicita información sobre un servidor de base de datos
- [ibase_service_attach](#function.ibase-service-attach) — Conexión al gestor de servicio
- [ibase_service_detach](#function.ibase-service-detach) — Desconexión del gestor de servicio
- [ibase_set_event_handler](#function.ibase-set-event-handler) — Registra una función de retrollamada para un evento interBase
- [ibase_trans](#function.ibase-trans) — Prepara una transacción interBase
- [ibase_wait_event](#function.ibase-wait-event) — Espera un evento interBase

- [Introducción](#intro.ibase)
- [Instalación/Configuración](#ibase.setup)<li>[Instalación](#ibase.installation)
- [Configuración en tiempo de ejecución](#ibase.configuration)
  </li>- [Constantes predefinidas](#ibase.constants)
- [Funciones Firebird/InterBase](#ref.ibase)<li>[fbird_add_user](#function.fbird-add-user) — Alias de ibase_add_user
- [fbird_affected_rows](#function.fbird-affected-rows) — Alias de ibase_affected_rows
- [fbird_backup](#function.fbird-backup) — Alias de ibase_backup
- [fbird_blob_add](#function.fbird-blob-add) — Alias de ibase_blob_add
- [fbird_blob_cancel](#function.fbird-blob-cancel) — Cancela la creación de un blob
- [fbird_blob_close](#function.fbird-blob-close) — Alias de ibase_blob_close
- [fbird_blob_create](#function.fbird-blob-create) — Alias de ibase_blob_create
- [fbird_blob_echo](#function.fbird-blob-echo) — Alias de ibase_blob_echo
- [fbird_blob_get](#function.fbird-blob-get) — Alias de ibase_blob_get
- [fbird_blob_import](#function.fbird-blob-import) — Alias de ibase_blob_import
- [fbird_blob_info](#function.fbird-blob-info) — Alias de ibase_blob_info
- [fbird_blob_open](#function.fbird-blob-open) — Alias de ibase_blob_open
- [fbird_close](#function.fbird-close) — Alias de ibase_close
- [fbird_commit](#function.fbird-commit) — Alias de ibase_commit
- [fbird_commit_ret](#function.fbird-commit-ret) — Alias de ibase_commit_ret
- [fbird_connect](#function.fbird-connect) — Alias de ibase_connect
- [fbird_db_info](#function.fbird-db-info) — Alias de ibase_db_info
- [fbird_delete_user](#function.fbird-delete-user) — Alias de ibase_delete_user
- [fbird_drop_db](#function.fbird-drop-db) — Alias de ibase_drop_db
- [fbird_errcode](#function.fbird-errcode) — Alias de ibase_errcode
- [fbird_errmsg](#function.fbird-errmsg) — Alias de ibase_errmsg
- [fbird_execute](#function.fbird-execute) — Alias de ibase_execute
- [fbird_fetch_assoc](#function.fbird-fetch-assoc) — Alias de ibase_fetch_assoc
- [fbird_fetch_object](#function.fbird-fetch-object) — Alias de ibase_fetch_object
- [fbird_fetch_row](#function.fbird-fetch-row) — Alias de ibase_fetch_row
- [fbird_field_info](#function.fbird-field-info) — Alias de ibase_field_info
- [fbird_free_event_handler](#function.fbird-free-event-handler) — Alias de ibase_free_event_handler
- [fbird_free_query](#function.fbird-free-query) — Alias de ibase_free_query
- [fbird_free_result](#function.fbird-free-result) — Alias de ibase_free_result
- [fbird_gen_id](#function.fbird-gen-id) — Alias de ibase_gen_id
- [fbird_maintain_db](#function.fbird-maintain-db) — Alias de ibase_maintain_db
- [fbird_modify_user](#function.fbird-modify-user) — Alias de ibase_modify_user
- [fbird_name_result](#function.fbird-name-result) — Alias de ibase_name_result
- [fbird_num_fields](#function.fbird-num-fields) — Alias de ibase_num_fields
- [fbird_num_params](#function.fbird-num-params) — Alias de ibase_num_params
- [fbird_param_info](#function.fbird-param-info) — Alias de ibase_param_info
- [fbird_pconnect](#function.fbird-pconnect) — Alias de ibase_pconnect
- [fbird_prepare](#function.fbird-prepare) — Alias de ibase_prepare
- [fbird_query](#function.fbird-query) — Alias de ibase_query
- [fbird_restore](#function.fbird-restore) — Alias de ibase_restore
- [fbird_rollback](#function.fbird-rollback) — Alias de ibase_rollback
- [fbird_rollback_ret](#function.fbird-rollback-ret) — Alias de ibase_rollback_ret
- [fbird_server_info](#function.fbird-server-info) — Alias de ibase_server_info
- [fbird_service_attach](#function.fbird-service-attach) — Alias de ibase_service_attach
- [fbird_service_detach](#function.fbird-service-detach) — Alias de ibase_service_detach
- [fbird_set_event_handler](#function.fbird-set-event-handler) — Alias de ibase_set_event_handler
- [fbird_trans](#function.fbird-trans) — Alias de ibase_trans
- [fbird_wait_event](#function.fbird-wait-event) — Alias de ibase_wait_event
- [ibase_add_user](#function.ibase-add-user) — Añade un usuario a una base de datos de seguridad
- [ibase_affected_rows](#function.ibase-affected-rows) — Devuelve el número de filas afectadas por la última consulta iBase
- [ibase_backup](#function.ibase-backup) — Inicia una tarea de respaldo en el gestor de servicios y devuelve inmediatamente
- [ibase_blob_add](#function.ibase-blob-add) — Añade datos a un BLOB iBase recién creado
- [ibase_blob_cancel](#function.ibase-blob-cancel) — Cancela la creación de un BLOB iBase
- [ibase_blob_close](#function.ibase-blob-close) — Cierra un BLOB iBase
- [ibase_blob_create](#function.ibase-blob-create) — Crea un BLOB iBase para añadir datos
- [ibase_blob_echo](#function.ibase-blob-echo) — Muestra el contenido de un BLOB iBase en el navegador
- [ibase_blob_get](#function.ibase-blob-get) — Lee len bytes de datos en un BLOB iBase abierto
- [ibase_blob_import](#function.ibase-blob-import) — Crea un BLOB iBase, copia un fichero y lo cierra
- [ibase_blob_info](#function.ibase-blob-info) — Devuelve el tamaño de un BLOB iBase y otra información útil
- [ibase_blob_open](#function.ibase-blob-open) — Abre un BLOB iBase para recuperar partes de datos
- [ibase_close](#function.ibase-close) — Cierra una conexión a una base de datos Interbase
- [ibase_commit](#function.ibase-commit) — Valida una transacción iBase
- [ibase_commit_ret](#function.ibase-commit-ret) — Valida una transacción iBase sin cerrarla
- [ibase_connect](#function.ibase-connect) — Abre una conexión a una base de datos
- [ibase_db_info](#function.ibase-db-info) — Solicita estadísticas sobre una base de datos Interbase
- [ibase_delete_user](#function.ibase-delete-user) — Elimina un usuario de una base de datos de seguridad
- [ibase_drop_db](#function.ibase-drop-db) — Elimina una base de datos iBase
- [ibase_errcode](#function.ibase-errcode) — Devuelve el código de error iBase
- [ibase_errmsg](#function.ibase-errmsg) — Devuelve un mensaje de error
- [ibase_execute](#function.ibase-execute) — Ejecuta una consulta iBase preparada
- [ibase_fetch_assoc](#function.ibase-fetch-assoc) — Recupera una fila del resultado de una consulta en un array asociativo
- [ibase_fetch_object](#function.ibase-fetch-object) — Lee una línea en una base Interbase en un objeto
- [ibase_fetch_row](#function.ibase-fetch-row) — Lee una línea de una base Interbase
- [ibase_field_info](#function.ibase-field-info) — Lee la información sobre un campo iBase
- [ibase_free_event_handler](#function.ibase-free-event-handler) — Libera un gestor de eventos iBase
- [ibase_free_query](#function.ibase-free-query) — Libera la memoria reservada por una consulta preparada
- [ibase_free_result](#function.ibase-free-result) — Libera un resultado iBase
- [ibase_gen_id](#function.ibase-gen-id) — Incrementa el generador dado y devuelve su nuevo valor
- [ibase_maintain_db](#function.ibase-maintain-db) — Ejecuta un comando de mantenimiento en una base de datos Interbase
- [ibase_modify_user](#function.ibase-modify-user) — Modifica un usuario en una base de datos de seguridad
- [ibase_name_result](#function.ibase-name-result) — Asigna un nombre a un conjunto de resultados iBase
- [ibase_num_fields](#function.ibase-num-fields) — Devuelve el número de columnas en un resultado iBase
- [ibase_num_params](#function.ibase-num-params) — Devuelve el número de parámetros en una consulta preparada iBase
- [ibase_param_info](#function.ibase-param-info) — Devuelve información sobre un argumento en una consulta preparada iBase
- [ibase_pconnect](#function.ibase-pconnect) — Abre una conexión persistente a una base de datos InterBase
- [ibase_prepare](#function.ibase-prepare) — Prepara una consulta iBase para ligar los argumentos y ejecutarla posteriormente
- [ibase_query](#function.ibase-query) — Ejecuta una consulta en una base iBase
- [ibase_restore](#function.ibase-restore) — Inicia una tarea de restauración en el gestor de servicios y devuelve inmediatamente
- [ibase_rollback](#function.ibase-rollback) — Anula una transacción interBase
- [ibase_rollback_ret](#function.ibase-rollback-ret) — Anula una transacción sin cerrarla
- [ibase_server_info](#function.ibase-server-info) — Solicita información sobre un servidor de base de datos
- [ibase_service_attach](#function.ibase-service-attach) — Conexión al gestor de servicio
- [ibase_service_detach](#function.ibase-service-detach) — Desconexión del gestor de servicio
- [ibase_set_event_handler](#function.ibase-set-event-handler) — Registra una función de retrollamada para un evento interBase
- [ibase_trans](#function.ibase-trans) — Prepara una transacción interBase
- [ibase_wait_event](#function.ibase-wait-event) — Espera un evento interBase
  </li>
